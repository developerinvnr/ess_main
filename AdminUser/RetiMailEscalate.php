<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}
$sqlSY=mysql_query("select * from hrm_pms_setting where CompanyId=".$CompanyId." AND Process='KRA'", $con); $SNo=1; $resSY=mysql_fetch_array($sqlSY);

if($_REQUEST['action']=='ScalateMailReti')
{ 
$sqlPr=mysql_query("select EmpCode,Fname,Sname,Lname,DepartmentId,DOB,Gender,DR,Married from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee.EmployeeID=".$_REQUEST['e'], $con); $resPr=mysql_fetch_assoc($sqlPr); if($resPr['DR']=='Y'){$E='Dr.';} elseif($resPr['Gender']=='M'){$E='Mr.';} elseif($resPr['Gender']=='F' AND $resPr['Married']=='Y'){$E='Mrs.';} elseif($resPr['Gender']=='F' AND $resPr['Married']=='N'){$E='Miss.';}  $EnPr=$E.' '.$resPr['Fname'].' '.$resPr['Sname'].' '.$resPr['Lname']; //EMP
if($resPr['Gender']=='M'){$Gen='his';}elseif($resPr['Gender']=='F'){$Gen='her';}

$sqlPrD=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$resPr['DepartmentId'], $con); $resPrD=mysql_fetch_assoc($sqlPrD); 
$date = date_create($resPr['DOB']); date_add($date, date_interval_create_from_date_string('58 years')); $After58yDOB=date_format($date, 'Y-m-d'); 
$date2 = date_create($After58yDOB); date_sub($date2, date_interval_create_from_date_string('90 days')); $Before30y58=date_format($date2, 'Y-m-d'); 
$date3 = date_create($After58yDOB); date_add($date3, date_interval_create_from_date_string('10 days')); $After10y58=date_format($date3, 'Y-m-d');

$sqlPrH=mysql_query("select Fname,Sname,Lname,Gender,DR,Married,EmailId_Vnr from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee_general.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee_general.EmployeeID=".$_REQUEST['h'], $con); $resPrH=mysql_fetch_assoc($sqlPrH); 
if($resPrH['DR']=='Y'){$H='Dr.';} elseif($resPrH['Gender']=='M'){$H='Mr.';} elseif($resPrH['Gender']=='F' AND $resPrH['Married']=='Y'){$H='Mrs.';} elseif($resPrH['Gender']=='F' AND $resPrH['Married']=='N'){$H='Miss.';}  $EnPrH=$H.' '.$resPrH['Fname'].' '.$resPrH['Sname'].' '.$resPrH['Lname'];  //HOD

 if($resPrH['EmailId_Vnr']!='')
 {  
  //$email_toPrH = $resPrH['EmailId_Vnr'];
  $email_toPrH = 'ajaykumar.dewangan@vnrseeds.in'; 
  $email_fromPrH = 'admin@vnrseeds.co.in';
  $email_subjectPrH = "Retirement ".$EnPr;  $semi_rand = md5(time()); 
  $headersPrH = "From: " . $email_fromPrH."\r\n"; $headersPrH .= "MIME-Version: 1.0\r\n"; $headersPrH .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
  $email_messagePrH .= "Dear <b>".$EnPrH."</b> <br><br>\n\n\n"; 
  $email_messagePrH .= $EnPr." (".$resPrD['DepartmentCode'].") is approaching ".$Gen." retirement age of 58 yrs on ".date("d-m-Y",strtotime($After58yDOB)).". Kindly initiate the superannuation related processes.<br><br>\n\n\n";
  $email_messagePrH .= "From <br><b>ADMIN ESS</b><br>";
  //echo $email_toPrH.'<br>'; echo $email_subjectPrH.'<br>'; echo $email_messagePrH.'<br>'; echo $headersPrH.'<br>';
  $okPrH = @mail($email_toPrH, $email_subjectPrH, $email_messagePrH, $headersPrH);	   
 }	   	   
 
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
function ScalateMailRetir(E,H)
{ 
  var aa="Are You sure?";
  if(confirm(aa))
  { 
   window.location="RetiMailEscalate.php?action=ScalateMailReti&&h="+H+"&e="+E; 
  }
  else{return false;}
}		
			
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
		     <tr><td align="left" class="heading">Retirement Employee<font class="font4"><b>&nbsp;<span id="msg"></span></b></font></td></tr>
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
	<td align="center" style="color:#FFFFFF;" class="All_80"><b>Retirement Date</b></td>
	<?php if(($UserId==9 OR $UserId==10 OR $UserId==14) AND $_SESSION['UserType']=="S") { ?><td align="center" style="color:#FFFFFF;" class="All_50"><b>Mail</b></td><?php } ?>
 </tr>
<?php $sqlPr=mysql_query("select hrm_employee.EmployeeID,EmpCode,Fname,Sname,Lname,DepartmentId,DesigId,DOB,HqId from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee.CompanyId=".$CompanyId." AND hrm_employee.EmpStatus='A' AND hrm_employee.EmpCode!=114 AND hrm_employee.EmpCode!=118 AND hrm_employee.EmpCode!=119 AND hrm_employee.EmpCode!=120 AND hrm_employee.EmpCode!=122 AND hrm_employee.EmpCode!=123 AND hrm_employee.EmpCode!=1001 AND hrm_employee.EmpCode!=1002 AND hrm_employee.EmpCode!=1003 AND hrm_employee_general.DepartmentId!=17 AND hrm_employee_general.DepartmentId!=18 AND hrm_employee_general.DepartmentId!=23 order by EmpCode ASC", $con); $sn=1; while($resPr=mysql_fetch_assoc($sqlPr)){ 
$sqlPrD=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$resPr['DepartmentId'], $con); $resPrD=mysql_fetch_assoc($sqlPrD);
$sqlPrDe=mysql_query("select DesigName,DesigCode from hrm_designation where DesigId=".$resPr['DesigId'], $con); $resPrDe=mysql_fetch_assoc($sqlPrDe);
$sqlHQ = mysql_query("SELECT HqName FROM hrm_headquater WHERE HqId=".$resPr['HqId'], $con); $resHQ = mysql_fetch_assoc($sqlHQ);
$EnPr=$resPr['Fname'].' '.$resPr['Sname'].' '.$resPr['Lname']; 

$date = date_create($resPr['DOB']); date_add($date, date_interval_create_from_date_string('58 years')); $After58yDOB=date_format($date, 'Y-m-d'); 
$date2 = date_create($After58yDOB); date_sub($date2, date_interval_create_from_date_string('90 days')); $Before30y58 = date_format($date2, 'Y-m-d'); 
$date3 = date_create($After58yDOB); date_add($date3, date_interval_create_from_date_string('10 days')); $After10y58=date_format($date3, 'Y-m-d');

if(date('Y-m-d')>=$Before30y58){ 
$sqlPrH=mysql_query("select HodId from hrm_employee_reporting where EmployeeID=".$resPr['EmployeeID'], $con); $resPrH=mysql_fetch_assoc($sqlPrH);
?>
 <tr bgcolor="#FFFFFF"> 
		<td align="center" style="" class="All_40"><?php echo $sn; ?></td>
		<td align="center" style="" class="All_50">&nbsp;<?php echo $resPr['EmpCode']; ?></td>
		<td style="" class="All_250">&nbsp;<?php echo $EnPr; ?></td>
		<td style="" class="All_120">&nbsp;<?php echo $resHQ['HqName'];?></td>
		<td style="" class="All_100">&nbsp;<?php echo $resPrD['DepartmentCode']; ?></td>
		<td style="" class="All_300">&nbsp;<?php echo $resPrDe['DesigCode']; ?></td>
		<td style="" class="All_80" align="center">&nbsp;<?php echo date("d-m-Y",strtotime($After58yDOB)); ?></td>
		<?php if(($UserId==9 OR $UserId==10 OR $UserId==14) AND $_SESSION['UserType']=="S"){ ?>
	    <td align="center" valign="middle" class="All_50"><img src="images/go-back-icon.png" border="0" onClick="ScalateMailRetir(<?php echo $resPr['EmployeeID'].', '.$resPrH['HodId']; ?>)" style="display:<?php if(date('Y-m-d')>$After58yDOB){echo 'none';} ?>;" /></td>
	    <?php } ?>
 </tr>
<?php $Sno++; } } ?>
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