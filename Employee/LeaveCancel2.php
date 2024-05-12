<?php require_once('../AdminUser/config/config.php');  ?>
<?php 
if(isset($_POST['SaveCancel']))  
{
   $sqlUpRep=mysql_query("update hrm_employee_applyleave set LeaveEmpCancelStatus='Y', LeaveEmpCancelDate='".date("Y-m-d")."', LeaveEmpCancelReason='".$_POST['CancelReason']."' where ApplyLeaveId=".$_POST['LId'], $con); 
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
 <?php $sql = mysql_query("SELECT Apply_Date,Leave_Type,LeaveEmpCancelReason FROM hrm_employee_applyleave WHERE ApplyLeaveId=".$_REQUEST['id'], $con) or die(mysql_error()); $res = mysql_fetch_array($sql); ?>
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
