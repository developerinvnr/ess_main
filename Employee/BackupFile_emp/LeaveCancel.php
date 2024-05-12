<?php require_once('../AdminUser/config/config.php');  ?>
<?php 
if(isset($_POST['SaveCancel']))  
{
   $sqlUpRep=mysql_query("update hrm_employee_applyleave set LeaveEmpCancelStatus='Y', LeaveEmpCancelDate='".date("Y-m-d")."', LeaveEmpCancelReason='".$_POST['CancelReason']."' where ApplyLeaveId=".$_POST['LId'], $con); 
 if($sqlUpRep)
 {   

    if($_POST['EmailR']!='')
   {
    $email_to = $_POST['EmailR'];
    $email_from='admin@vnrseeds.co.in';
    $email_subject = "Cancel Leave Application";
    $email_txt = "Cancel Leave Application";
    $headers = "From: ".$email_from."\r\n"; 
    $semi_rand = md5(time()); 
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
    $email_message .= $_POST['Ename']." has submitted cancel leave application for ".$_POST['LeaveType']." from ".$_POST['FromDate']." to ".$_POST['ToDate'].", for your approval kindly log on to ESS <a href='https://www.vnrseeds.co.in'>www.vnrseeds.co.in</a> to approve \n\n"; 
    $ok = @mail($email_to, $email_subject, $email_message, $header);
   }

    $email_to2 = 'vspl.hr@vnrseeds.com';
    $email_from='admin@vnrseeds.co.in';
    $email_subject2 = "Cancel Leave Application";
    $email_txt = "Cancel Leave Application";
    $headers = "From: ".$email_from."\r\n";
    $semi_rand = md5(time()); 
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n"; 
    $email_message2 .= $_POST['Ename']." has submitted cancel leave application for ".$_POST['LeaveType']." from ".$_POST['FromDate']." to ".$_POST['ToDate'].", for your details kindly log on to ESS <a href='https://www.vnrseeds.co.in'>www.vnrseeds.co.in</a> to approve \n\n";
    $ok = @mail($email_to2, $email_subject2, $email_message2, $headers);
   
   if($_POST['DeptId']==2)
   {
    $email_to3 = 'dsmanta11@gmail.com';   //seshi.reddy@vnrseeds.com
    $email_from='admin@vnrseeds.co.in';
    $email_subject3 = "Cancel Leave Application";
    $email_txt = "Cancel Leave Application";
    $headers = "From: ".$email_from."\r\n"; 
    $semi_rand = md5(time()); 
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
    $email_message3 .= $_POST['Ename']." has submitted cancel leave application for ".$_POST['LeaveType']." from ".$_POST['FromDate']." to ".$_POST['ToDate']." \n\n";
    $ok = @mail($email_to3, $email_subject3, $email_message3, $headers);
   }

 }
   
  if($sqlUpRep){echo '<script>alert("Cancellation request sent.....!"); window.close();</script>'; } 
}
?>	  
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Leave cancelation</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="../AdminUser/css/body.css" rel="stylesheet"/>
<link type="text/css" href="../AdminUser/css/pro_dropdown_3.css" rel="stylesheet"/>
<script type="text/javascript" language="javascript">
function FormRefresh(){ document.getElementById("CancelReason").value='';}
function validate(LeaveCancelForm) 
{ 
 var CancelReason = LeaveCancelForm.CancelReason.value; 
 if(CancelReason.length === 0){alert("Please type Reason !"); return false;} 
//if(QueryAnswer.length<50){alert("Please type minimum 50 charector!"); return false;} 
 var agree=confirm("Are you sure.."); if(agree){return true;}else{return false;}
}
</script>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" bgcolor="#E0DBE3">	
<table style="vertical-align:top;" width="300" align="center" border="0">
 <?php $sql = mysql_query("SELECT EmployeeID,Apply_Date,Apply_FromDate,Apply_ToDate,Leave_Type,Apply_SentToApp,Apply_SentToHOD,LeaveEmpCancelReason FROM hrm_employee_applyleave WHERE ApplyLeaveId=".$_REQUEST['id'], $con) or die(mysql_error()); $res = mysql_fetch_array($sql); 
 
 $sqlE=mysql_query("select Fname,Sname,Lname,EmailId_Vnr from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee_general.EmployeeID=".$res['EmployeeID'], $con); $resE=mysql_fetch_assoc($sqlE);
 $sqlR=mysql_query("select EmailId_Vnr from hrm_employee_general where EmployeeID=".$res['Apply_SentToApp'], $con); $resR=mysql_fetch_assoc($sqlR);
 $sqlH=mysql_query("select EmailId_Vnr from hrm_employee_general where EmployeeID=".$res['Apply_SentToHOD'], $con); $resH=mysql_fetch_assoc($sqlH);
 $sqlD=mysql_query("select DepartmentId from hrm_employee_general where EmployeeID=".$res['EmployeeID'], $con); $resD=mysql_fetch_assoc($sqlD);
 
 ?>
 <tr>
 <td>
  <table border="0">
  <tr>
  <td colspan="2" style="width:80px;font-family:Times New Roman;color:#0D3039;font-size:14px;" align="" valign="top">
  <b>Apply Date</b> :&nbsp;<?php echo date("d M Y", strtotime($res['Apply_Date'])); ?>, &nbsp;&nbsp;&nbsp;<b>Cancel Date</b> :&nbsp;<?php echo date("d M Y"); ?>,<br><b>Leave Type</b> :&nbsp;<?php echo $res['Leave_Type']; ?></td>
 </tr>
 <tr><td>&nbsp;</td></tr>
  <tr>
  <td colspan="2" style="width:80px; margin-left:5px; margin-right:5px;font-family:Times New Roman;color:#0D3039;font-size:14px;" align="center" valign="top">
  <u><b>Reason for cancelation apply leave</b></u> :</td>
 </tr>
<form name="LeaveCancelForm" method="post" onSubmit="return validate(this)">
<input type="hidden" name="Ename" value="<?php echo $resE['Fname'].' '.$resE['Sname'].' '.$resE['Lname']; ?>" />
<input type="hidden" name="EmailE" value="<?php echo $resE['EmailId_Vnr']; ?>" />
<input type="hidden" name="EmailR" value="<?php echo $resR['EmailId_Vnr']; ?>" />
<input type="hidden" name="EmailH" value="<?php echo $resH['EmailId_Vnr']; ?>" />
<input type="hidden" name="LeaveType" value="<?php echo $res['Leave_Type']; ?>" />
<input type="hidden" name="DeptId" value="<?php echo $resD['DepartmentId']; ?>" />
<input type="hidden" name="FromDate" value="<?php echo date("d-m-Y",strtotime($res['Apply_FromDate'])); ?>" />
<input type="hidden" name="ToDate" value="<?php echo date("d-m-Y",strtotime($res['Apply_ToDate'])); ?>" />


 <tr>
 <td colspan="2" valign="top" align="">
<textarea name="CancelReason" id="CancelReason" cols="50" rows="7"><?php echo $res['LeaveEmpCancelReason']; ?></textarea>
<input type="hidden" name="LId" value="<?php echo $_REQUEST['id']; ?>" />
 </td>
 </tr> 
 <tr>
 <td colspan="2" valign="top" align="Right" style="font-family:Times New Roman;color:#AA0000;font-size:15px; font-weight:bold;">
<input type="submit" name="SaveCancel" style="width:90px;" value="Save">
<input type="button" name="Refresh" id="Refresh" style="width:90px;" value="Refresh" onClick="FormRefresh()"/></td>
 </tr>   
 <tr>
 <td colspan="2" valign="top" align="left" style="font-family:Times New Roman;color:#AA0000;font-size:15px; font-weight:bold;"><?php echo $Msg; ?></td>
 </tr>  
</form>
</table>
</td>
</tr>
</table>
</body>
</html>
