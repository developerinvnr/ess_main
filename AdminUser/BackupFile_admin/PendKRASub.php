<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}
$sqlSY=mysql_query("select * from hrm_pms_setting where CompanyId=".$CompanyId." AND Process='KRA'", $con); $SNo=1; $resSY=mysql_fetch_array($sqlSY);

if($_REQUEST['action']=='ScalateMailKra' AND $_REQUEST['EI']!='' AND $_REQUEST['YI']!='')
{ 
 
 ///////////////////////////////////////////////////////////
$sqlK = mysql_query("select KraId,UseKRA from hrm_pms_kra where YearId=".$_REQUEST['YI']." AND EmployeeID=".$_REQUEST['EI'], $con); $rowK=mysql_num_rows($sqlK); 
if($rowK==0)
{ // 1-Open
  $sqlKE=mysql_query("select Fname,Sname,Lname,Gender,DR,Married,EmailId_Vnr,RepEmployeeID,DateJoining from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee.EmployeeID=".$_REQUEST['EI'], $con); $resKE=mysql_fetch_assoc($sqlKE); 
  if($resKE['DR']=='Y'){$E='Dr.';} elseif($resKE['Gender']=='M'){$E='Mr.';} elseif($resKE['Gender']=='F' AND $resKE['Married']=='Y'){$E='Mrs.';} elseif($resKE['Gender']=='F' AND $resKE['Married']=='N'){$E='Miss.';}  $EName=$E.' '.$resKE['Fname'].' '.$resKE['Sname'].' '.$resKE['Lname'];  //$EName-E
  $sqlKR=mysql_query("select Fname,Sname,Lname,Gender,DR,Married,EmailId_Vnr from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee_general.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee_general.EmployeeID=".$resKE['RepEmployeeID'], $con); $resKR=mysql_fetch_assoc($sqlKR); 
  if($resKR['DR']=='Y'){$R='Dr.';} elseif($resKR['Gender']=='M'){$R='Mr.';} elseif($resKR['Gender']=='F' AND $resKR['Married']=='Y'){$R='Mrs.';} elseif($resKR['Gender']=='F' AND $resKR['Married']=='N'){$E='Miss.';}  $RName=$R.' '.$resKR['Fname'].' '.$resKR['Sname'].' '.$resKR['Lname'];  //$RName-R
  
  //$sqlSch=mysql_query("select EmpFromDate,EmpToDate from hrm_pms_appdate where AssessmentYear=".$resSY['CurrY']." AND CompanyId=".$CompanyId, $con); 
  //$resSch=mysql_fetch_assoc($sqlSch);
  $Before31DayDoJ=date("Y-m-d",strtotime($resKE['DateJoining'].'-31 day')); $After31DayDoJ=date("Y-m-d",strtotime($resKE['DateJoining'].'+31 day')); 
  $After61DayDoJ=date("Y-m-d",strtotime($resKE['DateJoining'].'+61 day'));  $CuDate=date("Y-m-d");
  
  if($CuDate>=$resKE['DateJoining'] AND $CuDate<=$After31DayDoJ)
  { // Cond-1 Open 
   
   $sqlKCh=mysql_query("select ScalateKraId from hrm_com_mail_scalate_kra where EmployeeID=".$_REQUEST['EI']." AND CompanyId=".$CompanyId." AND YearId=".$_REQUEST['YI'], $con);   $rowKCh=mysql_num_rows($sqlKCh); 
	  
	if($rowKCh>0)
	{ 
	  $sqlKCh2=mysql_query("select MAX(ScalateKraId) as MxID from hrm_com_mail_scalate_kra where EmployeeID=".$_REQUEST['EI']." AND ScalateKraYN='Y' AND CompanyId=".$CompanyId." AND YearId=".$_REQUEST['YI'], $con); $resKCh2=mysql_fetch_assoc($sqlKCh2);
	  $sqlK2Ch=mysql_query("select ScalateKraDate from hrm_com_mail_scalate_kra where EmployeeID=".$_REQUEST['EI']." AND ScalateKraId=".$resKCh2['MxID'], $con); 
	  $resK2Ch=mysql_fetch_assoc($sqlK2Ch); $After7Day=date("Y-m-d",strtotime($resK2Ch['ScalateKraDate'].'+7 day'));  
	  if(date("Y-m-d")>$After7Day AND $resKE['EmailId_Vnr']!='') //Employee
	  {
       $email_toEK = $resKE['EmailId_Vnr']; 
       //$email_toEK = 'ajaykumar.dewangan@vnrseeds.in';	
       $email_fromEK = 'admin@vnrseeds.co.in';
	   $email_subjectEK = "Reminder for submission of KRA";  $semi_rand = md5(time()); 
	   $headersEK = "From: " . $email_fromEK . "\r\n"; $headersEK .= "MIME-Version: 1.0\r\n"; $headersEK .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
       $email_messageEK .= "Dear <b>".$EName."</b> <br><br>\n\n\n"; 
	   $email_messageEK .= "Please finalise your KRA with your reporting manager and submit the same by.<br><br>\n\n\n";
	   $email_messageEK .= "From <br><b>ADMIN ESS</b><br>";
       $okEK = @mail($email_toEK, $email_subjectEK, $email_messageEK, $headersEK);
	   //echo '1='.$email_toEK.'<br>'; echo '2='.$email_subjectEK.'<br>'; echo '3='.$email_messageEK.'<br>'; echo '4='.$headersEK.'<br>';
	   $Ins=mysql_query("insert into hrm_com_mail_scalate_kra(EmployeeID,ScalateKraDate,ScalateKraYN,CompanyId,YearId) values(".$_REQUEST['EI'].",'".date("Y-m-d")."','Y',".$CompanyId.",".$_REQUEST['YI'].")", $con);
	  }
	  if(date("Y-m-d")>$After7Day AND $resKR['EmailId_Vnr']!='') //Reporting
	  {
       $email_toRK = $resKR['EmailId_Vnr']; 
       //$email_toRK = 'ajaykumar.dewangan@vnrseeds.in';
       $email_fromRK = 'admin@vnrseeds.co.in';
	   $email_subjectRK = "Reminder for submission of KRA";  $semi_rand = md5(time()); 
	   $headersRK = "From: " . $email_fromRK . "\r\n"; $headersRK .= "MIME-Version: 1.0\r\n"; $headersRK .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
       $email_messageRK .= "Dear <b>".$RName."</b> <br><br>\n\n\n"; 
	   $email_messageRK .= "Your team member <b>".$EName."</b> has not submitted the KRA, kindly finalise and ensure submission of the same.<br><br>\n\n\n";
	   $email_messageRK .= "From <br><b>ADMIN ESS</b><br>";
       $okRK = @mail($email_toRK, $email_subjectRK, $email_messageRK, $headersRK);
	   //echo '1='.$email_toRK.'<br>'; echo '2='.$email_subjectRK.'<br>'; echo '3='.$email_messageRK.'<br>'; echo '4='.$headersRK.'<br>';
	   $Ins=mysql_query("insert into hrm_com_mail_scalate_kra(EmployeeID,ScalateKraDate,ScalateKraYN,CompanyId,YearId) values(".$_REQUEST['EI'].",'".date("Y-m-d")."','Y',".$CompanyId.",".$_REQUEST['YI'].")", $con);
	  }
	}
	elseif($rowKCh==0)
	{ 
	  if($resKE['EmailId_Vnr']!='') //Employee
	  {
         $email_toEK = $resKE['EmailId_Vnr']; 
	//$email_toEK = 'ajaykumar.dewangan@vnrseeds.in';
       $email_fromEK = 'admin@vnrseeds.co.in';
	   $email_subjectEK = "Reminder for submission of KRA";  $semi_rand = md5(time()); 
	   $headersEK = "From: " . $email_fromEK . "\r\n"; $headersEK .= "MIME-Version: 1.0\r\n"; $headersEK .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
       $email_messageEK .= "Dear <b>".$EName."</b> <br><br>\n\n\n"; 
	   $email_messageEK .= "Please finalise your KRA with your reporting manager and submit the same by.<br><br>\n\n\n";
	   $email_messageEK .= "From <br><b>ADMIN ESS</b><br>";
       $okEK = @mail($email_toEK, $email_subjectEK, $email_messageEK, $headersEK);
	   //echo '1='.$email_toEK.'<br>'; echo '2='.$email_subjectEK.'<br>'; echo '3='.$email_messageEK.'<br>'; echo '4='.$headersEK.'<br>';
	  }
	  if($resKR['EmailId_Vnr']!='') //Reporting
	  {
       $email_toRK = $resKR['EmailId_Vnr']; 
       //$email_toRK = 'ajaykumar.dewangan@vnrseeds.in';
	   $email_fromRK = 'admin@vnrseeds.co.in';
	   $email_subjectRK = "Reminder for submission of KRA";  $semi_rand = md5(time()); 
	   $headersRK = "From: " . $email_fromRK . "\r\n"; $headersRK .= "MIME-Version: 1.0\r\n"; $headersRK .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
       $email_messageRK .= "Dear <b>".$RName."</b> <br><br>\n\n\n"; 
	   $email_messageRK .= "Your team member <b>".$EName."</b> has not submitted the KRA, kindly finalise and ensure submission of the same.<br><br>\n\n\n";
	   $email_messageRK .= "From <br><b>ADMIN ESS</b><br>";
       $okRK = @mail($email_toRK, $email_subjectRK, $email_messageRK, $headersRK);
	   //echo '1='.$email_toRK.'<br>'; echo '2='.$email_subjectRK.'<br>'; echo '3='.$email_messageRK.'<br>'; echo '4='.$headersRK.'<br>';
	  }
	  $Ins=mysql_query("insert into hrm_com_mail_scalate_kra(EmployeeID,ScalateKraDate,ScalateKraYN,CompanyId,YearId) values(".$_REQUEST['EI'].",'".date("Y-m-d")."','Y',".$CompanyId.",".$_REQUEST['YI'].")", $con);
	}
	
   } // Cond-1 Close
   
  
   elseif(date("Y-m-d")>$After31DayDoJ AND ($CuDate<date("Y-11-01") OR $CuDate>date("Y-12-31")))
   { //Cond-2 Open     //AND date("Y-m-d")<$After61DayDoJ 
     
    $sqlKCh=mysql_query("select ScalateKraId from hrm_com_mail_scalate_kra where EmployeeID=".$_REQUEST['EI']." AND ScalateKraYN='Y' AND CompanyId=".$CompanyId." AND YearId=".$_REQUEST['YI'], $con); $rowKCh=mysql_num_rows($sqlKCh); 
	if($rowKCh>0)
	{ 
	  $sqlKCh2=mysql_query("select MAX(ScalateKraId) as MxID from hrm_com_mail_scalate_kra where EmployeeID=".$_REQUEST['EI']." AND ScalateKraYN='Y' AND CompanyId=".$CompanyId." AND YearId=".$_REQUEST['YI'], $con); $resKCh2=mysql_fetch_assoc($sqlKCh2);
	  $sqlK2Ch=mysql_query("select ScalateKraDate from hrm_com_mail_scalate_kra where EmployeeID=".$_REQUEST['EI']." AND ScalateKraId=".$resKCh2['MxID'], $con); 
	  
	  $resK2Ch=mysql_fetch_assoc($sqlK2Ch); $After7Day=date("Y-m-d",strtotime($resK2Ch['ScalateKraDate'].'+7 day'));  
	  if(date("Y-m-d")>$After7Day AND $resKE['EmailId_Vnr']!='') //Employee
	  { 
       $email_toEK = $resKE['EmailId_Vnr']; 
       //$email_toEK = 'ajaykumar.dewangan@vnrseeds.in';
	   $email_fromEK = 'admin@vnrseeds.co.in';
	   $email_subjectEK = "Reminder for submission of KRA";  $semi_rand = md5(time()); 
	   $headersEK = "From: " . $email_fromEK . "\r\n"; $headersEK .= "MIME-Version: 1.0\r\n"; $headersEK .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
       $email_messageEK .= "Dear <b>".$EName."</b> <br><br>\n\n\n"; 
	   $email_messageEK .= "Please finalise your KRA with your reporting manager and submit the same by.<br><br>\n\n\n";
	   $email_messageEK .= "From <br><b>ADMIN ESS</b><br>";
       $okEK = @mail($email_toEK, $email_subjectEK, $email_messageEK, $headersEK);
	   //echo '1='.$email_toEK.'<br>'; echo '2='.$email_subjectEK.'<br>'; echo '3='.$email_messageEK.'<br>'; echo '4='.$headersEK.'<br>';
	   $Ins=mysql_query("insert into hrm_com_mail_scalate_kra(EmployeeID,ScalateKraDate,ScalateKraYN,CompanyId,YearId) values(".$_REQUEST['EI'].",'".date("Y-m-d")."','Y',".$CompanyId.",".$_REQUEST['YI'].")", $con);
	  }
	  if(date("Y-m-d")>$After7Day AND $resKR['EmailId_Vnr']!='') //Reporting
	  { 
       $email_toRK = $resKR['EmailId_Vnr']; 
       //$email_toRK = 'ajaykumar.dewangan@vnrseeds.in';
	   $email_fromRK = 'admin@vnrseeds.co.in'; 
	   $email_subjectRK = "Reminder for submission of KRA";  $semi_rand = md5(time()); 
	   $headersRK = "From: " . $email_fromRK . "\r\n"; $headersRK .= "MIME-Version: 1.0\r\n"; $headersRK .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
       $email_messageRK .= "Dear <b>".$RName."</b> <br><br>\n\n\n"; 
	   $email_messageRK .= "The KRA of your team member <b>".$EName."</b> has not been submitted for the current appraisal cycle, kindly intervene and ensure submission of the same.<br><br>\n\n\n";
	   $email_messageRK .= "From <br><b>ADMIN ESS</b><br>";
       $okRK = @mail($email_toRK, $email_subjectRK, $email_messageRK, $headersRK);
	   //echo '1='.$email_toRK.'<br>'; echo '2='.$email_subjectRK.'<br>'; echo '3='.$email_messageRK.'<br>'; echo '4='.$headersRK.'<br>';
	  }
	   
	   
	}
	if($rowKCh==0)
	{ 
	  if($resKE['EmailId_Vnr']!='') //Employee
	  { 
       $email_toEK = $resKE['EmailId_Vnr']; 
       //$email_toEK = 'ajaykumar.dewangan@vnrseeds.in';
	   $email_fromEK = 'admin@vnrseeds.co.in';
	   $email_subjectEK = "Reminder for submission of KRA";  $semi_rand = md5(time()); 
	   $headersEK = "From: " . $email_fromEK . "\r\n"; $headersEK .= "MIME-Version: 1.0\r\n"; $headersEK .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
       $email_messageEK .= "Dear <b>".$EName."</b> <br><br>\n\n\n"; 
	   $email_messageEK .= "Please finalise your KRA with your reporting manager and submit the same by.<br><br>\n\n\n";
	   $email_messageEK .= "From <br><b>ADMIN ESS</b><br>";
       $okEK = @mail($email_toEK, $email_subjectEK, $email_messageEK, $headersEK);
	   //echo '1='.$email_toEK.'<br>'; echo '2='.$email_subjectEK.'<br>'; echo '3='.$email_messageEK.'<br>'; echo '4='.$headersEK.'<br>';
	  }
	  if($resKR['EmailId_Vnr']!='') //Reporting
	  { 
       $email_toRK = $resKR['EmailId_Vnr']; 
       //$email_toRK = 'ajaykumar.dewangan@vnrseeds.in';
	   $email_fromRK = 'admin@vnrseeds.co.in';
	   $email_subjectRK = "Reminder for submission of KRA";  $semi_rand = md5(time()); 
	   $headersRK = "From: " . $email_fromRK . "\r\n"; $headersRK .= "MIME-Version: 1.0\r\n"; $headersRK .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
       $email_messageRK .= "Dear <b>".$RName."</b> <br><br>\n\n\n"; 
	   $email_messageRK .= "The KRA of your team member <b>".$EName."</b> has not been submitted for the current appraisal cycle, kindly intervene and ensure submission of the same.<br><br>\n\n\n";
	   $email_messageRK .= "From <br><b>ADMIN ESS</b><br>";
       $okRK = @mail($email_toRK, $email_subjectRK, $email_messageRK, $headersRK);
	   //echo '1='.$email_toRK.'<br>'; echo '2='.$email_subjectRK.'<br>'; echo '3='.$email_messageRK.'<br>'; echo '4='.$headersRK.'<br>';
	  }
	   $Ins=mysql_query("insert into hrm_com_mail_scalate_kra(EmployeeID,ScalateKraDate,ScalateKraYN,CompanyId,YearId) values(".$_REQUEST['EI'].",'".date("Y-m-d")."','Y',".$CompanyId.",".$_REQUEST['YI'].")", $con);
	}
	
   } //Cond-2 Close
  
  
} // 1-Close
 //////////////////////////////////////////////////////////
  
}

?>

<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet"/>
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style>.font4 { color:#1FAD34; font-family:Georgia; font-size:15px;} .All{font-size:11px; height:18px;} .All_80{font-size:11px; height:18px; width:80px;}
 .All_50{font-size:11px; height:18px; width:50px;} .All_40{font-size:11px; height:18px; width:40px;} .All_100{font-size:11px; height:18px; width:100px;} 
.All_120{font-size:11px; height:18px; width:120px;} .All_150{font-size:11px; height:18px; width:150px;}.All_200{font-size:11px; height:18px; width:200px;} 
.All_350{font-size:11px; height:18px; width:350px;}
</style>
<script type="text/javascript" src="js/stuHover.js"></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<script type="text/javascript" src="js/EmpMasterAjaxCall.js"></script>
<Script type="text/javascript">window.history.forward(1);
function SelectDeptEmp(v){var x = "PendKRASub.php?DpId="+v;  window.location=x;}	
function EmpKRA(CId,YId,EmpId) 
{ window.open ("EmpKraForm.php?YId="+YId+"&EmpId="+EmpId+"&CId="+CId,"KRAForm","menubar=yes,scrollbars=yes,resizable=1,width=1100,height=500");}

function ScalateMailKra(EI,YI)
{ var DI=document.getElementById("DId").value;  window.location="PendKRASub.php?action=ScalateMailKra&EI="+EI+"&YI="+YI+"&DpId="+DI;}		
			
</Script>     
</head>
<body class="body">
<table class="table">
<tr>
 <td>
  <table class="menutable"><tr><td><?php if($_SESSION['login'] = true){ require_once("AMenu.php"); } ?></td></tr></table>
 </td>
</tr>
<tr>
 <td>
  <table width="100%" style="margin-top:0px;" border="0">
    <tr>
	  <td valign="top"><?php if($_SESSION['login'] = true){ require_once("AWelcome.php"); } ?></td>
	</tr>
	 <tr>
	  <td valign="top" align="center"  width="100%" id="MainWindow">
<?php //************************************************************************************************************************************************************?>
<?php //**********************************************START*****START*****START******START******START***************************************************************?>
<?php //************************************************************************************************************************************************************?>
<table border="0" style="margin-top:0px; width:100%; height:400px;">
	<tr>
	    <td align="right" width="1%">&nbsp;</td>
		<?php if(($_SESSION['UserType']=='S' OR $_SESSION['UserType']=='A' OR $_SESSION['UserType']=='U') AND $_SESSION['login'] = true) { ?>
		
		<td align="center" width="50%" valign="top">
		   <table border="0" width="100%">
		     <tr><td align="left" class="heading">Pending KRA Submission<font class="font4"><b>&nbsp;<span id="msg"></span></b></font></td></tr>
			 <tr><td>
				    <table border="0">
		            <tr>
					   <td style="width:180px;"></td>
	                   <td style="font-size:11px; width:150px;">Select Department :-</td>
                       <td class="td1" style="font-size:11px; width:150px;">
                       <select style="font-size:11px; width:150px; height:18px; background-color:#DDFFBB; display:block;" name="DepartmentE" id="DepartmentE" onChange="SelectDeptEmp(this.value)"><option value="" style="margin-left:0px; background-color:#84D9D5;" selected>Select Department</option><?php $SqlDepartment=mysql_query("select * from hrm_department where CompanyId=".$CompanyId." AND DepartmentId!=17 AND DepartmentId!=18 order by DepartmentName ASC", $con); while($ResDepartment=mysql_fetch_array($SqlDepartment)) { ?><option value="<?php echo $ResDepartment['DepartmentId']; ?>"><?php echo '&nbsp;'.$ResDepartment['DepartmentCode'];?></option><?php } ?><option value="All">&nbsp;ALL</option></select>
					   <input type="hidden" name="ComId" id="ComId" value="<?php echo $CompanyId; ?>" /> 
					   <input type="hidden" name="DId" id="DId" value="<?php echo $_REQUEST['DpId']; ?>" />
                      </td>
					  <td style="width:100px;"></td>
	                  <td class="All_200" align="right" style="font-family:Times New Roman;font-size:16px;color:#007700;"><b><?php echo $msg; ?></b></td>
		           </tr>
                   </table>
				</td>
			 </tr>
			 <tr>
			   <td valign="top" style="width:1100px;"> 
<table border="1" style="width:1100px;">
 <tr bgcolor="#7a6189">
	<td align="center" style="color:#FFFFFF;" class="All_40"><b>SNo.</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_50"><b>EC</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_250"><b>Name</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_120"><b>HeadQuater</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_100"><b>Department</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_300"><b>Designation</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_70"><b>KRA Status</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_50"><b>Mail Scalate</b></td>
	<?php if(($UserId==9 OR $UserId==10 OR $UserId==14) AND $_SESSION['UserType']=="S") { ?>
	<td align="center" style="color:#FFFFFF;" class="All_50"><b>Mail</b></td>
	<?php } ?>
 </tr>
<?php if($_REQUEST['DpId'] AND $_REQUEST['DpId']!='') { 

      if($_REQUEST['DpId']!='All'){  $sqlDP = mysql_query("SELECT hrm_employee.EmployeeID,EmpCode,Fname,Sname,Lname,HqId,DepartmentId,DesigId,Gender,Married FROM hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID WHERE hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND hrm_employee_general.DepartmentId=".$_REQUEST['DpId'], $con) or die(mysql_error());  }
	  elseif($_REQUEST['DpId']=='All'){  $sqlDP = mysql_query("SELECT hrm_employee.EmployeeID,EmpCode,Fname,Sname,Lname,HqId,DepartmentId,DesigId,Gender,Married FROM hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID WHERE hrm_employee.EmpStatus='A' AND hrm_employee_general.DepartmentId!=17 AND hrm_employee_general.DepartmentId!=18 AND hrm_employee.CompanyId=".$CompanyId, $con) or die(mysql_error());  }
     
      $Sno=1;  while($resDP = mysql_fetch_assoc($sqlDP)) { 
if($resDP['Gender']=='M'){$M='Mr.';} elseif($resDP['Gender']=='F' AND $resDP['Married']=='Y'){$M='Mrs.';} elseif($resDP['Gender']=='F' AND $resDP['Married']=='N'){$M='Miss.';} 
	  $Name=$M.' '.$resDP['Fname'].' '.$resDP['Sname'].' '.$resDP['Lname']; $LEC=strlen($resDP['EmpCode']); 
      if($LEC==1){$EC='000'.$resDP['EmpCode'];} if($LEC==2){$EC='00'.$resDP['EmpCode'];} if($LEC==3){$EC='0'.$resDP['EmpCode'];} if($LEC>=4){$EC=$resDP['EmpCode'];}	

$sql3E2=mysql_query("select EmpStatus from hrm_pms_kra where YearId=".$resSY['CurrY']." AND EmployeeID=".$resDP['EmployeeID'], $con); $res3E2=mysql_fetch_assoc($sql3E2); if(($res3E2['EmpStatus']!='A' AND $_REQUEST['DpId']=='All') OR $_REQUEST['DpId']!='All'){  
?>
 <tr bgcolor="#FFFFFF"> 
		<td align="center" style="" class="All_40"><?php echo $Sno; ?></td>
		<td align="center" style="" class="All_50">&nbsp;<?php echo $EC; ?></td>
		<td style="" class="All_250">&nbsp;<?php echo $Name; ?></td>
		<td style="" class="All_120">&nbsp;
		<?php $sqlHQ = mysql_query("SELECT HqName FROM hrm_headquater WHERE HqId=".$resDP['HqId'], $con) or die(mysql_error()); 
		      $resHQ = mysql_fetch_assoc($sqlHQ); echo $resHQ['HqName'];?>
		</td>
		<td style="" class="All_100">&nbsp;
		<?php $sqlDept = mysql_query("SELECT DepartmentCode FROM hrm_department WHERE DepartmentId=".$resDP['DepartmentId'], $con) or die(mysql_error()); 
		      $resDept = mysql_fetch_assoc($sqlDept); echo $resDept['DepartmentCode'];?>
		</td>
		<td style="" class="All_300">&nbsp;
		<?php $sqlDesig = mysql_query("SELECT DesigName FROM hrm_designation WHERE DesigId=".$resDP['DesigId'], $con) or die(mysql_error()); 
		      $resDesig = mysql_fetch_assoc($sqlDesig); echo $resDesig['DesigName']; ?>
		</td>
		   
	    <td align="center" class="All_70"><?php if($res3E2['EmpStatus']=='A') {?>
<?php if($_SESSION['User_Permission']=='Edit'){ ?>
	    <a href="#" onClick="EmpKRA(<?php echo $CompanyId.', '.$resSY['CurrY'].', '.$resDP['EmployeeID']; ?>)">Ok</a>
<?php } ?>
<?php } ?></td> 
		<td align="center" valign="middle" class="All_50">
<?php if($_SESSION['User_Permission']=='Edit'){ ?>
        <?php $sqlM=mysql_query("select count(ScalateKraId) as SKID from hrm_com_mail_scalate_kra where EmployeeID=".$resDP['EmployeeID']." AND ScalateKraYN='Y' AND CompanyId=".$CompanyId." AND YearId=".$resSY['CurrY'], $con); $resM=mysql_fetch_assoc($sqlM); if($resM['SKID']>0){echo $resM['SKID'];}else{echo '&nbsp;';} ?>		
<?php } ?> 
		</td>
		<?php if(($UserId==9 OR $UserId==10 OR $UserId==14) AND $_SESSION['UserType']=="S" AND $resDP['EmployeeID']!=6 AND $resDP['EmployeeID']!=7 AND $resDP['EmployeeID']!=51 AND $resDP['EmployeeID']!=223 AND $resDP['EmployeeID']!=224 AND $resDP['EmployeeID']!=233 AND $resDP['EmployeeID']!=234 AND $resDP['EmployeeID']!=235 AND $resDP['EmployeeID']!=259 AND $resDP['EmployeeID']!=260 AND $resDP['EmployeeID']!=21 AND $resDP['EmployeeID']!=22 AND $resDP['EmployeeID']!=40 AND $resDP['EmployeeID']!=41 AND $resDP['EmployeeID']!=42 AND $resDP['EmployeeID']!=43 AND $resDP['EmployeeID']!=44 AND $resDP['EmployeeID']!=45) { ?>
	    <td align="center" valign="middle" class="All_50">
<?php if($_SESSION['User_Permission']=='Edit'){ ?>
<img src="images/go-back-icon.png" border="0" onClick="ScalateMailKra(<?php echo $resDP['EmployeeID'].', '.$resSY['CurrY']; ?>)" />
<?php } ?>
</td>
	    <?php } ?>

</tr>
<?php $Sno++; } } }?>
</table>
                 </td>	
				 </tr>
				 <?php //---------------------------------------Display Record----------------------------------------------------------------- ?>
				 <tr><td><span id="DeptEmpName"></span></td></tr> 
				 <tr><td bgcolor="#B6E9E2" colspan="6"></td></tr>
		   </table>  		
		</td>
		
        <?php } ?>
		<?php //-------------------------------------------------------------------------------------------------------- ?>
		
		<td align="left" width="20%">&nbsp;</td>
	</tr>
</table>
		
<?php //************************************************************************************************************************************************************?>
<?php //**********************************************END*****END*****END******END******END***************************************************************?>
<?php //************************************************************************************************************************************************************?>
		
	  </td>
	</tr>
	
	<tr>
	  <td valign="top" align="center">
	    <table border="0" style="margin-top:0px;">
				<tr>
	              <td align="center"><img src="images/home1.png"></td>
				</tr>
	    </table>
	  </td>
	</tr>
	<tr>
	  <td valign="top">
	    <?php require_once("../footer.php"); ?>
	  </td>
	</tr>
  </table>
 </td>
</tr>
</table>
</body>
</html>