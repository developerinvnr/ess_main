<?php require_once('../AdminUser/config/config.php'); 
if($_POST['SentRes'])
{
  $sqlU=mysql_query("update hrm_employee_separation set NoticeDay=".$_POST['NoticeDay'].", HR_UserId=".$_POST['UId'].", HR_Approved='".$_POST['SepValue']."', HR_RelievingDate='".date("Y-m-d",strtotime($_POST['HRDate']))."', HR_Remark='".$_POST['HRRemark']."', HR_SaveDate='".date("Y-m-d")."', ResignationStatus=4, HR_Resignation_Status=2 where EmpSepId=".$_POST['SepId'], $con);
  
  if($_POST['SepValue']=='Y') 
  {
   $sql2U=mysql_query("update hrm_employee set DateOfResignation='".date("Y-m-d",strtotime($_POST['EResigDate']))."', DateOfSepration='".date("Y-m-d",strtotime($_POST['HRDate']))."' where EmployeeID=".$_POST['EmpId'], $con);
  }
 
  $sqlUp=mysql_query("update hrm_employee_reporting set AppraiserId=".$_POST['RepId']." where AppraiserId=".$_POST['EmpId'], $con);
  $sqlUp2=mysql_query("update hrm_employee_reporting set ReviewerId=".$_POST['RepId']." where ReviewerId=".$_POST['EmpId'], $con);
  
  if($_POST['DeptId']==6)
  {
    $sqlUp3=mysql_query("update hrm_sales_dealer set Terr_vc=0 where Terr_vc=".$_POST['EmpId'], $con);
	$sqlUp4=mysql_query("update hrm_sales_dealer set Terr_fc=0 where Terr_fc=".$_POST['EmpId'], $con);
  }
  
  if($sqlU)
  {
   $sqlEmp=mysql_query("select Fname,Sname,Lname,EmailId_Vnr from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee_general.EmployeeID=".$_POST['EmpId'], $con); $resEmp=mysql_fetch_assoc($sqlEmp); $Ename=$resEmp['Fname'].' '.$resEmp['Sname'].' '.$resEmp['Lname'];
   $sqlRep=mysql_query("select Fname,Sname,Lname,EmailId_Vnr from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee_general.EmployeeID=".$_POST['RepId'], $con); $resRep=mysql_fetch_assoc($sqlRep); $Aname=$resRep['Fname'].' '.$resRep['Sname'].' '.$resRep['Lname'];
   $sqlHod=mysql_query("select Fname,Sname,Lname,EmailId_Vnr from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee_general.EmployeeID=".$_POST['HodId'], $con); $resHod=mysql_fetch_assoc($sqlHod); $Hname=$resHod['Fname'].' '.$resHod['Sname'].' '.$resHod['Lname'];
   
   if($_POST['SepValue']=='Y'){$action='accepted';}elseif($_POST['SepValue']=='C'){$action='rejected';}
                                      //being processed
/************************************************ Employee App ***********************************************/   
/*
if($resEmp['EmailId_Vnr']!='')
{
$email_to7 = $resEmp['EmailId_Vnr'];
$email_from = 'admin@vnrseeds.co.in';
$email_subject = "Resignation ".$action;
$email_txt = "Resignation ".$action;
$headers = "From: ".$email_from."\r\n"; 
$semi_rand = md5(time()); 
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n"; 
$email_message7 .="Your resignation application is ".$action." by HR. \n\n";
$email_message7 .="Thanks & Regards\n";
$email_message7 .="HR\n\n";
$ok = @mail($email_to7, $email_subject, $email_message7, $headers);
}   
*/

if($resRep['EmailId_Vnr']!='')
{
$email_to2 = $resRep['EmailId_Vnr'];
$email_from = 'admin@vnrseeds.co.in';
$email_subject2 = "Resignation ".$action." by HR";
$email_txt = "Resignation ".$action." by HR";
$headers = "From: ".$email_from."\r\n"; 
$semi_rand = md5(time()); 
$headers2.= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
$email_message2 .="The resignation of ".$Ename." has been ".$action.". For details kindly log on to ESS <a href='https://www.vnrseeds.co.in'>www.vnrseeds.co.in</a>. \n\n";
$email_message2 .="Thanks & Regards\n";
$email_message2 .="HR\n\n";
$ok = @mail($email_to2, $email_subject2, $email_message2, $headers);
}  
   
if($_POST['SepValue']=='Y' AND $action='being processed')  //if($_POST['SepValue']=='Y' AND $action='accepted')
{
/************************************************ Employee ***********************************************/   
/**/
if($resEmp['EmailId_Vnr']!='')
{
 $email_to = $resEmp['EmailId_Vnr'];
 $email_from = 'admin@vnrseeds.co.in';
 $email_subject = "Whichever is applicable for Full & final formalities";
 $email_txt = "Whichever is applicable for Full & final formalities";
 $headers = "From: ".$email_from."\r\n"; 
 $semi_rand = md5(time()); 
 $headers .= "MIME-Version: 1.0\r\n";
 $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n"; 
 $email_message .="<html><head></head><body>";
 $email_message .="Dear <b>".$Ename."</b> <br><br>\n\n\n";
 $email_message .="<b>Subsequent to your resignation, requested you to complete the following Full & final formalities.</b><br><br><br>";
 $email_message .="(Whichever is applicable).<br><br>";
 if($_POST['TypeOfExit']=='V'){ $email_message .=": Exit interview form (Through ESS).<br>"; }
 $email_message .=": Submission of ID cards (To Reporting Manager / HR Department).<br>";
 $email_message .=": Health Cards (If ESIC card carry with yourself, Future Generali Health Card to be submitted to your Reporting manager / HR Department).<br>";
 $email_message .=": IT Assets (Company owned Laptop/ Mobile /camera/Data Card etc).<br>";
 $email_message .=": Business Documents (to reporting Manager/Business Head ).<br>";
 $email_message .=": No Dues certificates for sales/production staff (External vendors/organisers duly verified &amp; approved by reporting Managers to HR Department) if not submitted, the F& F shall be kept on hold.<br>";
 $email_message .=": Settle Advance (Vehicle Advance, Imprest , Tour Advances ,etc to Accounts Department.<br>";
 $email_message .=": Investment Proof Submission for tax settlement (Accounts Department).<br>";
 $email_message .=": Pending Expenses claim, if any.<br><br>\n";
 
 $email_message .="<b>Note:</b> Your access to Email ID/Xeasy App/ ESS and any other company software/tool shall be blocked on the last day of working. Hence kindly submit your claims through Xeasy till last working day or else it will be blocked. You can also mail your approved expense softcopies for claims to Accounts. If any further delay, your claims will not be considered. The resignation acceptance shall be provided only after your completion of all F&F formalities.<br><br>\n\n";
 
 //$email_message .="<b>Note</b> that your Email ID is blocked immediately after relieving, Expro ID shall be blocked after 7 days of relieving. Hence kindly enter your claims through EXPRO within 7 days or else it will be blocked and Approved Hard copies should reach corporate office within 15 days. Any further delay, your claims may not be considered.<br><br>\n\n";
 $email_message .= "From <br><b>ADMIN ESS(HR)</b><br>";
 $email_message .="</body></html>";
 $ok = @mail($email_to, $email_subject, $email_message, $headers);
}  
/**/

/************************************************ App ***********************************************/ 
if($resRep['EmailId_Vnr']!='')
{
$email_to2 = $resRep['EmailId_Vnr'];
$email_from = 'admin@vnrseeds.co.in';
$email_subject2 = "Resignation ".$action." by HR";
$email_txt = "Resignation ".$action." by HR";
$headers = "From: ".$email_from."\r\n"; 
$semi_rand = md5(time()); 
$headers2.= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
$email_message2 .="The resignation of ".$Ename." has been ".$action.". Kindly fill supervisor comment in exit interview form & provide department clearance form(NOC) in ESS for further processing. For details kindly log on to ESS <a href='https://www.vnrseeds.co.in'>www.vnrseeds.co.in</a>. \n\n";
$email_message2 .="Thanks & Regards\n";
$email_message2 .="HR\n\n";
$ok = @mail($email_to2, $email_subject2, $email_message2, $headers);
}    

/******** 9-IT ************/
$sqlNoc2=mysql_query("select EmployeeID,EmployeeID2 from hrm_employee_separation_nocdept_emp where DepartmentId=9 AND Status='A'", $con); $rowNoc2=mysql_num_rows($sqlNoc2); 
if($rowNoc2>0)
{ $resNoc2=mysql_fetch_assoc($sqlNoc2);
  $sqlE2=mysql_query("select EmailId_Vnr from hrm_employee_general where EmployeeID=".$resNoc2['EmployeeID'], $con); $resE2=mysql_fetch_assoc($sqlE2); 
  if($resE2['EmailId_Vnr']!='')
  {
  $email_to4 = $resE2['EmailId_Vnr'];
  $email_from = 'admin@vnrseeds.co.in';
  $email_subject4 = "Resignation ".$action." by HR";
  $email_txt = "Resignation ".$action." by HR";
 $headers = "From: ".$email_from."\r\n"; 
  $semi_rand = md5(time()); 
  $headers .= "MIME-Version: 1.0\r\n";
  $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
  $email_message4 .="The resignation of ".$Ename." has been ".$action.". Kindly provide IT clearance (NOC) in ESS for further processing. For details kindly log on to ESS <a href='https://www.vnrseeds.co.in'>www.vnrseeds.co.in</a>. \n\n";
  $email_message4 .="Thanks & Regards\n";
  $email_message4 .="HR\n\n";
$ok = @mail($email_to4, $email_subject4, $email_message4, $headers);
  }    
  
  
  if($resNoc2['EmployeeID2']>0)
  {  
    $sqlE3=mysql_query("select EmailId_Vnr from hrm_employee_general where EmployeeID=".$resNoc2['EmployeeID2'], $con);
	$resE3=mysql_fetch_assoc($sqlE2); 
    if($resE3['EmailId_Vnr']!='')
    {
     $email_to8 = $resE3['EmailId_Vnr'];
     $email_from8 = 'admin@vnrseeds.co.in';
     $email_subject8 = "Resignation ".$action." by HR";
     $email_txt8 = "Resignation ".$action." by HR";
     $headers8 = "From: ".$email_from8."\r\n"; 
     $semi_rand = md5(time()); 
     $headers8 .= "MIME-Version: 1.0\r\n";
     $headers8 .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
     $email_message8 .="The resignation of ".$Ename." has been ".$action.". Kindly provide IT clearance (NOC) in ESS for further processing. For details kindly log on to ESS <a href='https://www.vnrseeds.co.in'>www.vnrseeds.co.in</a>. \n\n";
    $email_message8 .="Thanks & Regards\n";
    $email_message8 .="HR\n\n";
    $ok = @mail($email_to8, $email_subject8, $email_message8, $headers8);
    }
  }
  
  
}	

/************************************************ HR ***********************************************/ 
$email_to3 = 'vspl.hr@vnrseeds.com';
$email_from = 'admin@vnrseeds.co.in';
$email_subject3 = "Resignation ".$action." by HR";
$email_txt = "Resignation ".$action." by HR";
$headers = "From: ".$email_from."\r\n"; 
$semi_rand = md5(time()); 
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n"; 
$email_message3 .="The resignation of ".$Ename." has been ".$action.". Kindly provide HR clearance (NOC) in ESS for further processing. For details kindly log on to ESS <a href='https://www.vnrseeds.co.in'>www.vnrseeds.co.in</a>. \n\n";
$email_message3 .="Thanks & Regards\n";
$email_message3 .="HR\n\n";
$ok = @mail($email_to3, $email_subject3, $email_message3, $headers);


/*************************************************Account 2 ********************************************/
$sqlNoc5=mysql_query("select EmployeeID2 from hrm_employee_separation_nocdept_emp where DepartmentId=8 AND Status='A'", $con); $rowNoc5=mysql_num_rows($sqlNoc5); 
if($rowNoc5>0)
{ $resNoc5=mysql_fetch_assoc($sqlNoc5);
  $sqlE5=mysql_query("select EmailId_Vnr from hrm_employee_general where EmployeeID=".$resNoc5['EmployeeID2'], $con); $resE5=mysql_fetch_assoc($sqlE5); 
  if($resE5['EmailId_Vnr']!='')
  {
  $email_to5 = $resE5['EmailId_Vnr'];
  $email_from = 'admin@vnrseeds.co.in';
  $email_subject5 = "Resignation ".$action." by HR";
  $email_txt = "Resignation ".$action." by HR";
  $headers = "From: ".$email_from."\r\n"; 
  $semi_rand = md5(time()); 
  $headers .= "MIME-Version: 1.0\r\n";
  $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
  $email_message5 .="The resignation of ".$Ename." has been ".$action.". \n\n";
  $email_message5 .="Thanks & Regards\n";
  $email_message5 .="HR\n\n";
$ok = @mail($email_to5, $email_subject5, $email_message5, $headers);
  }     
}	

} //if($_POST['SepValue']=='Y' AND $action='accepted')

/************************************************ HOD ***********************************************/ 
/*
if($resHod['EmailId_Vnr']!='')
{
$email_to6 = $resHod['EmailId_Vnr'];
$email_from = 'admin@vnrseeds.co.in';
$email_subject6 = "Resignation ".$action." by HR";
$email_txt = "Resignation ".$action." by HR";
$headers = "From: ".$email_from."\r\n"; 
$semi_rand = md5(time()); 
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
$email_message6 .="HR has ".$action." ".$Ename." resignation application. For details, kindly log on to ESS <a href='https://www.vnrseeds.co.in'>www.vnrseeds.co.in</a>. \n\n";
$email_message6 .="Thanks & Regards\n";
$email_message6 .="HR\n\n";
//$ok = @mail($email_to6, $email_subject6, $email_message6, $headers);
}    
*/

  if($_POST['SepValue']=='Y'){echo '<script>alert("Resignation request accepted successfully"); window.close();</script>'; }
  elseif($_POST['SepValue']=='C'){echo '<script>alert("Resignation request rejected successfully"); window.close();</script>';} 
  }
  
}

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Action for Resignation</title>
<link rel="stylesheet" type="text/css" href="src/css/jscal2.css"/>
<link rel="stylesheet" type="text/css" href="src/css/border-radius.css"/>
<link rel="stylesheet" type="text/css" href="src/css/steel/steel.css"/>
<script type="text/javascript" src="src/js/jscal2.js"></script>
<script type="text/javascript" src="src/js/lang/en.js"></script>
<style> .InputText {font-family:Geneva, Arial, Helvetica, sans-serif;font-size:13px;width:80px;background-color:#FFFFD9;}
.InputText2 {font-family:Geneva, Arial, Helvetica, sans-serif;font-size:13px;width:80px;background-color:#E1FFE1;border-style:groove;}
.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}
.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;}</style>
<script language="javascript" type="text/javascript">
function validate(formname)
{ 
  
  var d1 = formname.ResDate.value; var d2 = formname.HRDate.value;
  var DMY=d1.split('-');     //splits the date string by '-' and stores in a array.
  var DMY2=d2.split('-');
  var day=DMY[0];  var month=DMY[1];  var year=DMY[2];
  var day1=DMY2[0];  var month1=DMY2[1];  var year1=DMY2[2];
  var dateTemp1=month+'/'+day+'/'+year;  
  var dateTemp2=month1+'/'+day1+'/'+year1;
  var date1 = new Date(dateTemp1);//mm/dd/yy 
  var date2 = new Date(dateTemp2); //mm/dd/yy
  var Timed1=date1.getTime(); var Timed2=date2.getTime();
  
  var timeDiff = Math.abs(date2.getTime() - date1.getTime());
  var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24));
  var TotDay = diffDays; // var TotDay = diffDays+1;
  document.getElementById("NoticeDay").value=TotDay;
  //if(TotDay<30){ var RecoveryDate=30-TotDay; alert("Please note, you are not serving the required notice period of 30 days. Shortfall shall be recovered in full and final settlement");  }
  if(TotDay>90){ alert("Kindly note! the notice period to be served cannot exceed more than 90 days.");  return false;  }
  
  var HRRemark = formname.HRRemark.value; var SepValue = formname.SepValue.value;  
  if(HRRemark.length === 0){ alert("Please type remark.");  return false; }
  if(SepValue=='Y'){$sep='Approve';}else if(SepValue=='C'){$sep='Reject';}
  var agree=confirm("Are you sure you want to "+$sep+" resignation?");
  if(agree){ return true; } else{ return false; } 
  
}
</script>
</head>
<body bgcolor="#E0DBE3">
<center>
<table border="0" style="width:590px;">
<tr>
   <td style="width:590px;" valign="top" align="center">
<?php if($_REQUEST['act']!='' AND $_REQUEST['act']=='acthr')  { ?>	
<?php $sqlSE=mysql_query("select * from hrm_employee_separation where EmpSepId=".$_REQUEST['i'], $con); $resSE=mysql_fetch_assoc($sqlSE);
$sqlE=mysql_query("select EmpCode,Fname,Sname,Lname,DesigId,DepartmentId,DR,Gender,Married from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee.EmployeeID=".$resSE['EmployeeID'], $con); $resE=mysql_fetch_assoc($sqlE); 
$sqlDept=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$resE['DepartmentId'], $con); $resDept=mysql_fetch_assoc($sqlDept);
if($resE['DR']=='Y'){$M='Dr.';} elseif($resE['Gender']=='M'){$M='Mr.';} elseif($resE['Gender']=='F' AND $resE['Married']=='Y'){$M='Mrs.';} elseif($resE['Gender']=='F' AND $resE['Married']=='N'){$M='Miss.';}  $NameE=$M.' '.$resE['Fname'].' '.$resE['Sname'].' '.$resE['Lname']; 
?>	
<form enctype="multipart/form-data" name="formname" method="post"  onSubmit="return validate(this)">
<input type="hidden" name="SepId" id="SepId" value="<?php echo $_REQUEST['i']; ?>" />  
<input type="hidden" name="SepValue" id="SepValue" value="<?php if($_REQUEST['v']=='A'){echo 'Y';}elseif($_REQUEST['v']=='C'){echo 'C';} ?>" />
<input type="hidden" name="SepAct" id="SepAct" value="<?php echo $_REQUEST['act']; ?>" />  
<input type="hidden" name="EmpId" id="EmpId" value="<?php echo $resSE['EmployeeID']; ?>" />  
<input type="hidden" name="RepId" id="RepId" value="<?php echo $resSE['Rep_EmployeeID']; ?>" /> 
<input type="hidden" name="HodId" id="HodId" value="<?php echo $resSE['Hod_EmployeeID']; ?>" />  
<input type="hidden" name="DeptId" id="DeptId" value="<?php echo $resE['DepartmentId']; ?>" />
<input type="hidden" name="UId" id="UId" value="<?php echo $_REQUEST['UI']; ?>" /> 
<input type="hidden" name="EResigDate" id="EResigDate" value="<?php echo $resSE['Emp_ResignationDate']; ?>" />
<input type="hidden" name="TypeOfExit" id="TypeOfExit" value="<?php echo $resSE['TypeOfExit']; ?>" />
<table border="0">
<tr>
  <td colspan="5" style="font-family:Geneva, Arial, Helvetica, sans-serif;color:#400000;font-size:16px;width:590px;" align="center">
  <b><?php if($_REQUEST['v']=='A'){echo 'RESIGNATION APPROVAL';}elseif($_REQUEST['v']=='C'){echo 'RESIGNATION REJECT';} ?></b>
  </td> 
</tr>
<tr>
 <td>
  <table style="width:580px;" border="1">
   <tr bgcolor="#FFFFFF">
    <td style="font-family:Geneva, Arial, Helvetica, sans-serif;font-size:12px;width:80px;">&nbsp;<b>EmpCode</b></td>
	<td align="" style="font-family:Geneva, Arial, Helvetica, sans-serif;font-size:13px;width:100px;">&nbsp;<?php echo $resE['EmpCode']; ?></td>
	<td style="font-family:Geneva, Arial, Helvetica, sans-serif;font-size:12px;width:150px;">&nbsp;<b>Name</b></td>
	<td style="font-family:Geneva, Arial, Helvetica, sans-serif;font-size:13px;width:250px;">&nbsp;<?php echo $NameE; ?></td>
   </tr>
   <tr bgcolor="#FFFFFF">
    <td style="font-family:Geneva, Arial, Helvetica, sans-serif;font-size:12px;width:80px;">&nbsp;<b>Department</b></td>
	<td align="" style="font-family:Geneva, Arial, Helvetica, sans-serif;font-size:13px;width:100px;">&nbsp;<?php echo $resDept['DepartmentCode']; ?></td>
	<td style="font-family:Geneva, Arial, Helvetica, sans-serif;font-size:12px;width:150px;">&nbsp;<b>Approve</b></td>
	<td style="font-family:Geneva, Arial, Helvetica, sans-serif;font-size:13px;width:250px;background-color:#51A8FF;color:#FFFFFF;">&nbsp;<b><?php if($_REQUEST['v']=='A'){echo 'Resignation Approval';}elseif($_REQUEST['v']=='C'){echo 'Resignation Reject';} ?></b></td>
   </tr>
   <tr bgcolor="#FFFFFF">
    <td style="font-family:Geneva, Arial, Helvetica, sans-serif;font-size:13px;width:80px;">&nbsp;<b>Resignation</b></td>
	<td align="" style="font-family:Geneva, Arial, Helvetica, sans-serif;font-size:13px;width:100px;">&nbsp;<?php echo date("d-m-Y",strtotime($resSE['Emp_ResignationDate'])); ?></td>
	<td style="font-family:Geneva, Arial, Helvetica, sans-serif;font-size:13px;width:150px;">&nbsp;<b>Expected Relieving</b></td>
	<td style="font-family:Geneva, Arial, Helvetica, sans-serif;font-size:13px;width:250px;">&nbsp;<b><?php echo date("d-m-Y",strtotime($resSE['Emp_RelievingDate'])); ?></b>
	<input type="hidden" name="ResDate" id="ResDate" value="<?php echo date("d-m-Y",strtotime($resSE['Emp_ResignationDate'])); ?>">
	<input type="hidden" id="NoticeDay" name="NoticeDay" value="<?php echo $resSE['NoticeDay']; ?>" /></td>
   </tr>
   <tr>
    <td colspan="4">
    <table>
	 <tr bgcolor="#FFFFFF">
      <td style="font-family:Geneva, Arial, Helvetica, sans-serif;font-size:12px;width:200px;">&nbsp;<b>Reporting Relieving Date</b></td>
	  <td style="font-family:Geneva, Arial, Helvetica, sans-serif;font-size:12px;width:88px;">&nbsp;<b><?php if($resSE['Rep_RelievingDate']!='' AND $resSE['Rep_RelievingDate']!='0000-00-00' AND $resSE['Rep_RelievingDate']!='1970-01-01'){ echo date("d-m-Y",strtotime($resSE['Rep_RelievingDate'])); } ?></b></td>
	  <td style="font-family:Geneva, Arial, Helvetica, sans-serif;font-size:12px;width:200px;">&nbsp;<b>HOD Relieving Date</b></td>
	  <td style="font-family:Geneva, Arial, Helvetica, sans-serif;font-size:12px;width:88px;">&nbsp;<b><?php if($resSE['Hod_RelievingDate']!='' AND $resSE['Hod_RelievingDate']!='0000-00-00' AND $resSE['Hod_RelievingDate']!='1970-01-01') { echo date("d-m-Y",strtotime($resSE['Hod_RelievingDate'])); } ?></b></td>
     </tr>
	 <tr bgcolor="#FFFFFF">
      <td valign="top" style="font-family:Geneva, Arial, Helvetica, sans-serif;font-size:12px;width:200px;">&nbsp;<b>Reporting Remark</b></td>
	  <td colspan="3" style="font-family:Geneva, Arial, Helvetica, sans-serif;font-size:13px;"><?php echo $resSE['Rep_Remark']; ?></td>
     </tr>
	 
	 <tr bgcolor="#FFFFFF">
      <td valign="top" style="font-family:Geneva, Arial, Helvetica, sans-serif;font-size:12px;width:200px;">&nbsp;<b>HOD Remark</b></td>
	  <td colspan="3" style="font-family:Geneva, Arial, Helvetica, sans-serif;font-size:13px;"><?php echo $resSE['Hod_Remark']; ?></td>
     </tr>
	 <?php if($_REQUEST['v']=='A'){ ?>
	  <tr bgcolor="#FFFFFF">
      <td style="font-family:Geneva, Arial, Helvetica, sans-serif;font-size:12px;width:200px;">&nbsp;<b>HR Relieving Date</b></td>
	  <td colspan="3" style="font-family:Geneva, Arial, Helvetica, sans-serif;font-size:13px;"><input name="HRDate" id="HRDate" class="InputText2" readonly value="<?php if($resSE['HR_Approved']=='Y'){echo date("d-m-Y",strtotime($resSE['HR_RelievingDate']));}else{ if($resSE['Rep_Approved']=='Y' AND $resSE['Rep_RelievingDate']!='' AND $resSE['Rep_RelievingDate']!='0000-00-00' AND $resSE['Rep_RelievingDate']!='1970-01-01'){ echo date("d-m-Y",strtotime($resSE['Rep_RelievingDate'])); } elseif($resSE['Hod_Approved']=='Y' AND $resSE['Hod_RelievingDate']!='' AND $resSE['Hod_RelievingDate']!='0000-00-00' AND $resSE['Hod_RelievingDate']!='1970-01-01') { echo date("d-m-Y",strtotime($resSE['Hod_RelievingDate'])); } } ?>">&nbsp;<button id="f_btn1" class="CalenderButton"></button>
<script type="text/javascript">  var cal = Calendar.setup({ onSelect:  function(cal) { cal.hide()}, showTime: true }); 
cal.manageFields("f_btn1", "HRDate", "%d-%m-%Y");</script></td>
     </tr>
	 <?php } ?>
	  <tr bgcolor="#FFFFFF">
      <td valign="top" style="font-family:Geneva, Arial, Helvetica, sans-serif;font-size:12px;width:200px;">&nbsp;<b>HR Remark For <?php if($_REQUEST['v']=='A'){echo 'Approval';}elseif($_REQUEST['v']=='C'){echo 'Reject';} ?></b></b></td>
	  <td valign="top" colspan="3" style="font-family:Geneva, Arial, Helvetica, sans-serif;font-size:13px;"><textarea name="HRRemark" id="HRRemark" cols="43" rows="4" style="background-color:#E1FFE1;border-style:groove;"><?php echo $resSE['HR_Remark']; ?></textarea></td>
     </tr>
	</table>
	</td>
   </tr>
	</table>
	</td>
   </tr>
   <tr bgcolor="#FFFFFF">
        <td colspan="4" align="Right" class="fontButton">
         <table><tr>
	      <td><input type="submit" id="SentRes" name="SentRes" value="submit" style="display:block;"/></td>
		  <td><input type="button" name="Refrash" value="refresh" onClick="javascript:window.location='SepResActHR.php?act=<?php echo $_REQUEST['act']; ?>&v=<?php echo $_REQUEST['v']; ?>&ss=vty&cc=it@~t~1212&p=value&a=app&true=false&i=<?php echo $_REQUEST['i']; ?>&cc=it@~t~1111!@1~ere&UI=<?php echo $_REQUEST['UI']; ?>'"/></td>
		  
	     
	     </tr></table>
        </td>
      </tr> 
  </table>
 </td>
</tr>

</table>
</form>
<?php } ?>	  
     </td>
</tr>
</table>
</center>
</body>
</html>
