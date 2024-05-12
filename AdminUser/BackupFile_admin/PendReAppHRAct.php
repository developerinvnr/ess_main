<?php require_once('../AdminUser/config/config.php'); 



if($_POST['ResSubmit'])
{
  //HR_RelievingDate2-->Old1, HR_RelievingDate3-->Old2 
  if($_POST['HR_Rel2']!='')
  { 
   $sqlU=mysql_query("update hrm_employee_separation set HR_UserId=".$_POST['UId'].", HR_RelievingDate='".date("Y-m-d",strtotime($_POST['HrRelDate']))."', HR_RelievingDate3='".date("Y-m-d",strtotime($_POST['HR_Rel2']))."', HR_Remark='".$_POST['HrRemark']."' where EmpSepId=".$_POST['SepId'], $con);
  }
  else
  { 
   $sqlU=mysql_query("update hrm_employee_separation set HR_UserId=".$_POST['UId'].", HR_RelievingDate='".date("Y-m-d",strtotime($_POST['HrRelDate']))."', HR_RelievingDate2='".date("Y-m-d",strtotime($_POST['HR_Rel']))."', HR_Remark='".$_POST['HrRemark']."' where EmpSepId=".$_POST['SepId'], $con);
  }
  
  if($sqlU){ $sql2U=mysql_query("update hrm_employee set DateOfSepration='".date("Y-m-d",strtotime($_POST['HrRelDate']))."' where EmployeeID=".$_POST['EmpId'], $con); }
    
  
  //if($sqlU){echo '<script>alert("Successfull.."); window.close();</script>'; }
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
.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;}
.th{ font-family:Times New Roman; font-size:12px; font-weight:bold; }
.td{ font-family:Times New Roman; font-size:12px; }
</style>
<script language="javascript" type="text/javascript">
function ClickResig()
{ 
 document.getElementById("ResSubmit").style.display='block'; document.getElementById("ResEdit").style.display='none'; 
 document.getElementById("f_btn5").disabled=false;
 document.getElementById("HrRelDate").readOnly=false; document.getElementById("HrRemark").readOnly=false; document.getElementById("HrRelDate").readOnly=false; document.getElementById("HrRemark").readOnly=false; 
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
<table border="0" style="width:990px;" cellspacing="0">
<tr>
   <td style="width:990px;" valign="top" align="center">
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
<input type="hidden" name="EmpId" id="EmpId" value="<?php echo $resSE['EmployeeID']; ?>" />

<input type="hidden" name="HR_Rel" value="<?php if($resSE['HR_RelievingDate']!='' AND $resSE['HR_RelievingDate']!='0000-00-00' AND $resSE['HR_RelievingDate']!='1970-01-01'){echo $resSE['HR_RelievingDate'];} ?>" />
<input type="hidden" name="HR_Rel2" value="<?php if($resSE['HR_RelievingDate2']!='' AND $resSE['HR_RelievingDate2']!='0000-00-00' AND $resSE['HR_RelievingDate2']!='1970-01-01'){echo $resSE['HR_RelievingDate2'];} ?>" />
<input type="hidden" name="HR_Rel3" value="<?php if($resSE['HR_RelievingDate3']!='' AND $resSE['HR_RelievingDate3']!='0000-00-00' AND $resSE['HR_RelievingDate3']!='1970-01-01'){echo $resSE['HR_RelievingDate3'];} ?>" />

<table border="0" cellspacing="0" style="width:100%;">
<tr>
  <td colspan="5" style="color:#400000;font-size:16px;width:990px;" align="center">
  <b><?php echo 'RESIGNATION DETAILS'; ?></b>
  </td> 
</tr>
<tr><td>&nbsp;</td></tr>
<tr>
 <td >
  <table style="width:98%;" border="1" cellspacing="0" cellpadding="2">
   <tr bgcolor="#FFFFFF">
    <td style="width:80px;" class="th">&nbsp;<b>EmpCode</b></td>
	<td style="width:150px;" class="td">&nbsp;<?php echo $resE['EmpCode']; ?></td>
	<td style="width:150px;" class="th">&nbsp;<b>Name</b></td>
	<td class="td">&nbsp;<?php echo $NameE; ?></td>
   </tr>
   <tr bgcolor="#FFFFFF">
    <td class="th">&nbsp;<b>Department</b></td>
	<td class="td">&nbsp;<?php echo $resDept['DepartmentCode']; ?></td>
	<td class="th">&nbsp;<b>Status</b></td>
	<td class="td" style="background-color:#51A8FF;color:#FFFFFF;">&nbsp;<b><?php if($resSE['HR_Approved']=='Y'){echo 'Resignation Approved';}elseif($resSE['HR_Approved']=='C'){echo 'Resignation Rejected';}elseif($resSE['HR_Approved']=='N'){echo ' ';} ?></b></td>
   </tr>
   <tr><td colspan="4">&nbsp;</td></tr>
   <tr>
    <td colspan="2" class="th">&nbsp;<b>Resignation Reason</b></td>
	<td colspan="2" style="background-color:#FFFFFF;"><?php echo $resSE['Emp_Reason']; ?></td>
   </tr>
   <tr>
    <td colspan="2" class="th">&nbsp;<b>Employee </b></td>
	<td colspan="2">&nbsp;<b>Resignation Date</b>&nbsp;<input style="width:100px;text-align:center;" name="ResigDate" id="ResigDate" value="<?php echo date("d-m-Y", strtotime($resSE['Emp_ResignationDate'])); ?>" readonly/>
	<!--<button id="f_btn1" class="CalenderButton"></button><script type="text/javascript">  var cal = Calendar.setup({ onSelect:  function(cal) { cal.hide()}, showTime: true }); 
cal.manageFields("f_btn1", "ResigDate", "%d-%m-%Y");</script>-->
    &nbsp;&nbsp;&nbsp;<b>Relieving Date</b>&nbsp;<input style="width:100px;text-align:center;" name="ERelDate" id="ERelDate" value="<?php echo date("d-m-Y", strtotime($resSE['Emp_RelievingDate'])); ?>" readonly/>
	<!--<button id="f_btn2" class="CalenderButton"></button><script type="text/javascript">  var cal = Calendar.setup({ onSelect:  function(cal) { cal.hide()}, showTime: true }); 
cal.manageFields("f_btn2", "ERelDate", "%d-%m-%Y");</script>--></td>
   </tr>
  
   <tr>
    <td colspan="2" class="th">&nbsp;<b>Reporting</b></td>
	<td colspan="2"><?php if($resSE['Rep_Approved']=='Y'){ echo '&nbsp;<b>Relieving Date</b>&nbsp;'; if($resSE['Rep_RelievingDate']!='' AND $resSE['Rep_RelievingDate']!='0000-00-00' AND $resSE['Rep_RelievingDate']!='1970-01-01'){echo '(1)&nbsp;'.date("d-m-Y",strtotime($resSE['Rep_RelievingDate']));} if($resSE['Rep_RelievingDate2']!='' AND $resSE['Rep_RelievingDate2']!='0000-00-00' AND $resSE['Rep_RelievingDate2']!='1970-01-01'){echo ', <font color="#FF0000">(2)&nbsp;'.date("d-m-Y",strtotime($resSE['Rep_RelievingDate2']));} if($resSE['Rep_RelievingDate3']!='' AND $resSE['Rep_RelievingDate3']!='0000-00-00' AND $resSE['Rep_RelievingDate3']!='1970-01-01'){echo ', <font color="#FF0000">(3)</font>&nbsp;'.date("d-m-Y",strtotime($resSE['Rep_RelievingDate3'])).'</font>';} } ?><!--<button id="f_btn3" class="CalenderButton"></button><script type="text/javascript">  var cal = Calendar.setup({ onSelect:  function(cal) { cal.hide()}, showTime: true }); 
cal.manageFields("f_btn3", "RRelDate", "%d-%m-%Y");</script>-->

&nbsp;&nbsp;&nbsp;
<?php if($resSE['TypeOfExit']=='V'){ echo '<b>Type of Exit :</b> Voluntary'; }elseif($resSE['TypeOfExit']=='D'){ echo '<b>Type of Exit :</b> Desired'; } ?>

</td>
   </tr>
   <tr>
    <td colspan="2" class="th">&nbsp;<b>Reporting Remark</b></td>
	<td colspan="2" style="background-color:#FFFFFF;"><?php if($resSE['Rep3_Remark']!=''){ echo $resSE['Rep3_Remark']; }elseif($resSE['Rep2_Remark']!=''){ echo $resSE['Rep2_Remark']; }else{ echo $resSE['Rep_Remark']; } ?></td>
   </tr>
   <tr>
    <td colspan="2" class="th">&nbsp;<b>HOD</b></td>
	<td colspan="2"><?php if($resSE['Hod_Approved']=='Y'){ echo '&nbsp;<b>Relieving Date</b>&nbsp;'; if($resSE['Hod_RelievingDate']!='' AND $resSE['Hod_RelievingDate']!='0000-00-00' AND $resSE['Hod_RelievingDate']!='1970-01-01'){echo '(1)&nbsp;'.date("d-m-Y",strtotime($resSE['Hod_RelievingDate']));} if($resSE['Hod_RelievingDate2']!='' AND $resSE['Hod_RelievingDate2']!='0000-00-00' AND $resSE['Hod_RelievingDate2']!='1970-01-01'){echo ', <font color="#FF0000">(2)&nbsp;'.date("d-m-Y",strtotime($resSE['Hod_RelievingDate2']));} if($resSE['Hod_RelievingDate3']!='' AND $resSE['Hod_RelievingDate3']!='0000-00-00' AND $resSE['Hod_RelievingDate3']!='1970-01-01'){echo ', <font color="#FF0000">(3)</font>&nbsp;'.date("d-m-Y",strtotime($resSE['Hod_RelievingDate3'])).'</font>';} } ?><!--<button id="f_btn4" class="CalenderButton"></button><script type="text/javascript">  var cal = Calendar.setup({ onSelect:  function(cal) { cal.hide()}, showTime: true }); 
cal.manageFields("f_btn4", "HRelDate", "%d-%m-%Y");</script>--></td>
   </tr>
   <tr>
    <td colspan="2" class="th">&nbsp;<b>HOD Remark</b></td>
	<td colspan="2" style="background-color:#FFFFFF;"><?php if($resSE['Hod3_Remark']!=''){ echo $resSE['Hod3_Remark']; }elseif($resSE['Hod2_Remark']!=''){ echo $resSE['Hod2_Remark']; }else{ echo $resSE['Hod_Remark']; } ?></td>
   </tr>
    <tr>
    <td colspan="2" class="th">&nbsp;<b>HR</b></td>
	<td colspan="2">&nbsp;<b>Relieving Date</b>&nbsp;<input style="width:100px;text-align:center;" name="HrRelDate" id="HrRelDate" value="<?php if($resSE['HR_RelievingDate3']!='' AND $resSE['HR_RelievingDate3']!='0000-00-00' AND $resSE['HR_RelievingDate3']!='1970-01-01'){echo date("d-m-Y", strtotime($resSE['HR_RelievingDate3']));}elseif($resSE['HR_RelievingDate2']!='' AND $resSE['HR_RelievingDate2']!='0000-00-00' AND $resSE['HR_RelievingDate2']!='1970-01-01'){echo date("d-m-Y", strtotime($resSE['HR_RelievingDate2']));}elseif($resSE['HR_RelievingDate']!='' AND $resSE['HR_RelievingDate']!='0000-00-00' AND $resSE['HR_RelievingDate']!='1970-01-01'){echo date("d-m-Y", strtotime($resSE['HR_RelievingDate']));} ?>" readonly/>
	<button id="f_btn5" class="CalenderButton" disabled="disabled"></button><script type="text/javascript">  var cal = Calendar.setup({ onSelect:  function(cal) { cal.hide()}, showTime: true }); cal.manageFields("f_btn5", "HrRelDate", "%d-%m-%Y");</script></td>
   </tr>
   <tr>
    <td colspan="2" class="th">&nbsp;<b>HR Remark</b></td>
	<td colspan="2"><input style="width:99%;" name="HrRemark" id="HrRemark" value="<?php echo $resSE['HR_Remark']; ?>" readonly/></td>
   </tr>
   
   <?php if($_REQUEST['Tv']=='HHRR'){?>
    <tr bgcolor="#FFFFFF">
      <td colspan="4" align="Right" class="fontButton">
        <table><tr>
	      <td><input type="submit" id="ResSubmit" name="ResSubmit" value="update" style="display:none;width:80px;"/></td>
		  <td><input type="button" id="ResEdit" value="edit" style="width:80px;" onClick="ClickResig()"/></td>
	     </tr></table>
       </td>
     </tr> 
    <?php } ?>  


	</table>
	</td>
   </tr>
	</table>
	</td>
   </tr>
   
   
   
   <tr>
    <td colspan="10" class="th" style="font-size:16px;font-family:Times New Roman;">
	 <br>
	  Action Date:&nbsp; 
	 <font color="#006C00">EMP Apply:</font>
	 <font style="color:#FF0000;"><?=date("d-m-Y",strtotime($resSE['Emp_SaveDate']));?></font>&nbsp;&nbsp;
	 
	 <?php if($resSE['Rep_Approved']=='Y'){ ?>
	 <font color="#006C00">REP Approved:</font>
	 <font style="color:#FF0000;"><?=date("d-m-Y",strtotime($resSE['Rep_SaveDate']));?></font>&nbsp;&nbsp;
	 
	 <?php } if($resSE['Hod_Approved']=='Y'){ ?>
	 <font color="#006C00">HOD Approved:</font>
	 <font style="color:#FF0000;"><?=date("d-m-Y",strtotime($resSE['Hod_SaveDate']));?></font>&nbsp;&nbsp;
	 
	 <?php } if($resSE['HR_Approved']=='Y'){ ?>
	 <font color="#006C00">HR Approved:</font>
	 <font style="color:#FF0000;"><?=date("d-m-Y",strtotime($resSE['HR_SaveDate']));?></font>&nbsp;&nbsp;
	 <?php } ?>

<?php    
$ne=mysql_query("select FormSubmitDate from hrm_employee_separation_exitint where EmpSepId=".$resSE['EmpSepId'],$con);
$nr=mysql_query("select NocSubmitDate from hrm_employee_separation_nocrep where EmpSepId=".$resSE['EmpSepId'],$con);   
$ni=mysql_query("select NocSubmitDate from hrm_employee_separation_nocit where EmpSepId=".$resSE['EmpSepId'],$con);  
$nh=mysql_query("select NocSubmitDate from hrm_employee_separation_nochr where EmpSepId=".$resSE['EmpSepId'],$con);
$na=mysql_query("select NocSubmAccDate from hrm_employee_separation_nocacc where EmpSepId=".$resSE['EmpSepId'],$con);
$rowe=mysql_num_rows($ne); $rowr=mysql_num_rows($nr); $rowi=mysql_num_rows($ni);
$rowh=mysql_num_rows($nh); $rowa=mysql_num_rows($na);
$rese=mysql_fetch_assoc($ne); $resr=mysql_fetch_assoc($nr); $resi=mysql_fetch_assoc($ni);
$resh=mysql_fetch_assoc($nh); $resa=mysql_fetch_assoc($na); ?>
	 
	 <br>
	  Clearance Date:&nbsp; 
	 <?php if($rowe>0){ ?> 
	 <font color="#006C00">EMP:</font>
	 <font style="color:#FF0000;"><?=date("d-m-Y",strtotime($rese['FormSubmitDate']));?></font>&nbsp;&nbsp;
	 
	 <?php } if($rowr>0){ ?>
	 <font color="#006C00">REP:</font>
	 <font style="color:#FF0000;"><?=date("d-m-Y",strtotime($resr['NocSubmitDate']));?></font>&nbsp;&nbsp;
	 
	 <?php } if($rowi>0){ ?>
	 <font color="#006C00">IT:</font>
	 <font style="color:#FF0000;"><?=date("d-m-Y",strtotime($resi['NocSubmitDate']));?></font>&nbsp;&nbsp;
	 
	 <?php } if($rowh>0){ ?>
	 <font color="#006C00">HR:</font>
	 <font style="color:#FF0000;"><?=date("d-m-Y",strtotime($resh['NocSubmitDate']));?></font>&nbsp;&nbsp;
	 
	 <?php } if($rowa>0){ ?>
	 <font color="#006C00">Account:</font>
	 <font style="color:#FF0000;"><?=date("d-m-Y",strtotime($resa['NocSubmAccDate']));?></font>&nbsp;&nbsp;
	 <?php } ?>
	  
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
