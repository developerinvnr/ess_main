<?php require_once('../AdminUser/config/config.php'); 
if($_POST['ResSubmit'])
{
  $sqlU=mysql_query("update hrm_employee_separation set Emp_ResignationDate='".date("Y-m-d",strtotime($_POST['ResigDate']))."', Emp_RelievingDate='".date("Y-m-d",strtotime($_POST['ERelDate']))."', Emp_Reason='".addslashes($_POST['ResReason'])."', NoticeDay=".$_POST['NoticeDay'].", Rep_RelievingDate='".date("Y-m-d",strtotime($_POST['RRelDate']))."', Rep_Remark='".addslashes($_POST['RRemark'])."', Hod_RelievingDate='".date("Y-m-d",strtotime($_POST['HRelDate']))."', Hod_Remark='".addslashes($_POST['HRemark'])."', HR_UserId=".$_POST['UId'].", HR_RelievingDate='".date("Y-m-d",strtotime($_POST['HrRelDate']))."', HR_Remark='".addslashes($_POST['HrRemark'])."' where EmpSepId=".$_POST['SepId'], $con);  
  
  
  if($sqlU){echo '<script>alert("Successfull.."); window.close();</script>'; }
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
function ClickResig()
{ 
 document.getElementById("ResSubmit").style.display='block'; document.getElementById("ResEdit").style.display='none'; 
 document.getElementById("ResReason").readOnly=false; document.getElementById("ResigDate").readOnly=false;  document.getElementById("ERelDate").readOnly=false; 
 document.getElementById("RRelDate").readOnly=false;  document.getElementById("RRemark").readOnly=false; document.getElementById("HRelDate").readOnly=false; 
 document.getElementById("HRemark").readOnly=false; document.getElementById("HrRelDate").readOnly=false; document.getElementById("HrRemark").readOnly=false;
}




function validate(formname)
{ 
  var HRRelDate=formname.HrRelDate.value; var HodRelDate=formname.HRelDate.value; var RepRelDate=formname.RRelDate.value;
  var d1 = formname.ResigDate.value; 
  if(HRRelDate!=''){var d2 = formname.HrRelDate.value;}
  else if(HodRelDate!=''){var d2 = formname.HodRelDate.value;}
  else if(RepRelDate!=''){var d2 = formname.RepRelDate.value;}
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
  
  var agree=confirm("Are you sure you want to udated resignation?");
  if(agree){ return true; } else{ return false; } 
  
}
</script>
</head>
<body bgcolor="#E0DBE3">
<center>
<table border="0" style="width:590px;">
<tr>
   <td style="width:590px;" valign="top" align="center">
<?php if($_REQUEST['act']!='' AND $_REQUEST['act']=='actEdit')  { ?>	
<?php $sqlSE=mysql_query("select * from hrm_employee_separation where EmpSepId=".$_REQUEST['SepId'], $con); $resSE=mysql_fetch_assoc($sqlSE);
$sqlE=mysql_query("select EmpCode,Fname,Sname,Lname,DesigId,DepartmentId,DR,Gender,Married from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee.EmployeeID=".$resSE['EmployeeID'], $con); $resE=mysql_fetch_assoc($sqlE); 
$sqlDept=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$resE['DepartmentId'], $con); $resDept=mysql_fetch_assoc($sqlDept);
if($resE['DR']=='Y'){$M='Dr.';} elseif($resE['Gender']=='M'){$M='Mr.';} elseif($resE['Gender']=='F' AND $resE['Married']=='Y'){$M='Mrs.';} elseif($resE['Gender']=='F' AND $resE['Married']=='N'){$M='Miss.';}  $NameE=$M.' '.$resE['Fname'].' '.$resE['Sname'].' '.$resE['Lname']; 
?>	
<form enctype="multipart/form-data" name="formname" method="post"  onSubmit="return validate(this)"> 
<input type="hidden" name="SepId" id="SepId" value="<?php echo $_REQUEST['SepId']; ?>" />  
<input type="hidden" name="UId" id="UId" value="<?php echo $_REQUEST['UI']; ?>" />  
<input type="hidden" name="NoticeDay" id="NoticeDay" value="" />
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
	<td style="font-family:Geneva, Arial, Helvetica, sans-serif;font-size:12px;width:150px;">&nbsp;<b>Status</b></td>
	<td style="font-family:Geneva, Arial, Helvetica, sans-serif;font-size:13px;width:250px;background-color:#51A8FF;color:#FFFFFF;">&nbsp;<b><?php if($resSE['HR_Approved']=='Y'){echo 'Resignation Approved';}elseif($resSE['HR_Approved']=='C'){echo 'Resignation Rejected';}elseif($resSE['HR_Approved']=='N'){echo ' ';} ?></b></td>
   </tr>
   <tr><td colspan="4">&nbsp;</td></tr>
   <tr>
    <td colspan="2" style="font-family:Geneva, Arial, Helvetica, sans-serif;font-size:12px;width:80px;">&nbsp;<b>Resignation Reason</b></td>
	<td colspan="2"><input style="font-family:Geneva, Arial, Helvetica, sans-serif;font-size:13px;width:380px;" name="ResReason" id="ResReason" value="<?php echo $resSE['Emp_Reason']; ?>" readonly/></td>
   </tr>
   <tr>
    <td colspan="2" style="font-family:Geneva, Arial, Helvetica, sans-serif;font-size:12px;">&nbsp;<b>Emp Resignation Date</b></td>
	<td colspan="2" style="font-family:Geneva, Arial, Helvetica, sans-serif;font-size:12px;">
	<input style="font-family:Geneva, Arial, Helvetica, sans-serif;font-size:13px;width:100px;" name="ResigDate" id="ResigDate" value="<?php echo date("d-m-Y", strtotime($resSE['Emp_ResignationDate'])); ?>" readonly/>
	<button id="f_btn1" class="CalenderButton"></button><script type="text/javascript">  var cal = Calendar.setup({ onSelect:  function(cal) { cal.hide()}, showTime: true }); 
cal.manageFields("f_btn1", "ResigDate", "%d-%m-%Y");</script>
    &nbsp;&nbsp;&nbsp;
	<b>Emp Relieving Date</b>&nbsp;
	<input style="font-family:Geneva, Arial, Helvetica, sans-serif;font-size:13px;width:100px;" name="ERelDate" id="ERelDate" value="<?php echo date("d-m-Y", strtotime($resSE['Emp_RelievingDate'])); ?>" readonly/>
	<button id="f_btn2" class="CalenderButton"></button><script type="text/javascript">  var cal = Calendar.setup({ onSelect:  function(cal) { cal.hide()}, showTime: true }); 
cal.manageFields("f_btn2", "ERelDate", "%d-%m-%Y");</script></td>
   </tr>
  
   <tr>
    <td colspan="2" style="font-family:Geneva, Arial, Helvetica, sans-serif;font-size:12px;width:80px;">&nbsp;<b>Reporting Relieving Date</b></td>
	<td colspan="2"><input style="font-family:Geneva, Arial, Helvetica, sans-serif;font-size:13px;width:100px;" name="RRelDate" id="RRelDate" value="<?php if($resSE['Rep_RelievingDate']!='' AND $resSE['Rep_RelievingDate']!='0000-00-00' AND $resSE['Rep_RelievingDate']!='1970-01-01'){echo date("d-m-Y", strtotime($resSE['Rep_RelievingDate']));}else{echo '';} ?>" readonly/>
	<button id="f_btn3" class="CalenderButton"></button><script type="text/javascript">  var cal = Calendar.setup({ onSelect:  function(cal) { cal.hide()}, showTime: true }); 
cal.manageFields("f_btn3", "RRelDate", "%d-%m-%Y");</script></td>
   </tr>
   <tr>
    <td colspan="2" style="font-family:Geneva, Arial, Helvetica, sans-serif;font-size:12px;width:80px;">&nbsp;<b>Reporting Remark</b></td>
	<td colspan="2"><input style="font-family:Geneva, Arial, Helvetica, sans-serif;font-size:13px;width:380px;" name="RRemark" id="RRemark" value="<?php echo $resSE['Rep_Remark']; ?>" readonly/></td>
   </tr>
   <tr>
    <td colspan="2" style="font-family:Geneva, Arial, Helvetica, sans-serif;font-size:12px;width:80px;">&nbsp;<b>HOD Relieving Date</b></td>
	<td colspan="2"><input style="font-family:Geneva, Arial, Helvetica, sans-serif;font-size:13px;width:100px;" name="HRelDate" id="HRelDate" value="<?php if($resSE['Hod_RelievingDate']!='' AND $resSE['Hod_RelievingDate']!='0000-00-00' AND $resSE['Hod_RelievingDate']!='1970-01-01'){echo date("d-m-Y", strtotime($resSE['Hod_RelievingDate']));}else{echo '';} ?>" readonly/>
	<button id="f_btn4" class="CalenderButton"></button><script type="text/javascript">  var cal = Calendar.setup({ onSelect:  function(cal) { cal.hide()}, showTime: true }); 
cal.manageFields("f_btn4", "HRelDate", "%d-%m-%Y");</script></td>
   </tr>
   <tr>
    <td colspan="2" style="font-family:Geneva, Arial, Helvetica, sans-serif;font-size:12px;width:80px;">&nbsp;<b>HOD Remark</b></td>
	<td colspan="2"><input style="font-family:Geneva, Arial, Helvetica, sans-serif;font-size:13px;width:380px;" name="HRemark" id="HRemark" value="<?php echo $resSE['Hod_Remark']; ?>" readonly/></td>
   </tr>
    <tr>
    <td colspan="2" style="font-family:Geneva, Arial, Helvetica, sans-serif;font-size:12px;width:80px;">&nbsp;<b>HR Relieving Date</b></td>
	<td colspan="2"><input style="font-family:Geneva, Arial, Helvetica, sans-serif;font-size:13px;width:100px;" name="HrRelDate" id="HrRelDate" value="<?php if($resSE['HR_RelievingDate']!='' AND $resSE['HR_RelievingDate']!='0000-00-00' AND $resSE['HR_RelievingDate']!='1970-01-01'){echo date("d-m-Y", strtotime($resSE['HR_RelievingDate']));}else{echo '';} ?>" readonly/>
	<button id="f_btn5" class="CalenderButton"></button><script type="text/javascript">  var cal = Calendar.setup({ onSelect:  function(cal) { cal.hide()}, showTime: true }); 
cal.manageFields("f_btn5", "HrRelDate", "%d-%m-%Y");</script></td>
   </tr>
   <tr>
    <td colspan="2" style="font-family:Geneva, Arial, Helvetica, sans-serif;font-size:12px;width:80px;">&nbsp;<b>HR Remark</b></td>
	<td colspan="2"><input style="font-family:Geneva, Arial, Helvetica, sans-serif;font-size:13px;width:380px;" name="HrRemark" id="HrRemark" value="<?php echo $resSE['HR_Remark']; ?>" readonly/></td>
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
	      <td><input type="submit" id="ResSubmit" name="ResSubmit" value="submit" style="display:none;"/></td>
		  <td><input type="button" id="ResEdit" value="edit" onClick="ClickResig()"/></td>
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
