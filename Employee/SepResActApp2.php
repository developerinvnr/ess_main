<?php require_once('../AdminUser/config/config.php'); 
if($_POST['SentRes'])
{ 
  
  $sqlchk=mysql_query("select * from hrm_employee_separation where EmpSepId=".$_POST['SepId'],$con);
  $reschk=mysql_fetch_assoc($sqlchk);
  $sqlEmp=mysql_query("select Fname,Sname,Lname,EmailId_Vnr from hrm_employee_general g INNER JOIN hrm_employee e ON g.EmployeeID=e.EmployeeID where g.EmployeeID=".$_POST['EmpId'], $con); $resEmp=mysql_fetch_assoc($sqlEmp); 
  $Ename=$resEmp['Fname'].' '.$resEmp['Sname'].' '.$resEmp['Lname'];
  $sqlRep=mysql_query("select Fname,Sname,Lname,EmailId_Vnr from hrm_employee_general g INNER JOIN hrm_employee e ON g.EmployeeID=e.EmployeeID where g.EmployeeID=".$_POST['RepId'], $con); $resRep=mysql_fetch_assoc($sqlRep); 
  $Rname=$resRep['Fname'].' '.$resRep['Sname'].' '.$resRep['Lname'];
  
  if($_POST['Rep2_Date']!='')
  { $RelD='Rep_RelievingDate3'; 
	if($reschk['Rep2_SysDate']==date("Y-m-d")){ $sqlU=mysql_query("update hrm_employee_separation set Rep_RelievingDate2='".date("Y-m-d",strtotime($_POST['RepDate']))."', Rep2_Remark='".$_POST['RepRemark']."', Rep2_SysDate='".date("Y-m-d")."' where EmpSepId=".$_POST['SepId'], $con); }
	else{ $sqlU=mysql_query("update hrm_employee_separation set ".$RelD."='".date("Y-m-d",strtotime($_POST['RepDate']))."', Rep3_Remark='".$_POST['RepRemark']."', Rep3_SysDate='".date("Y-m-d")."' where EmpSepId=".$_POST['SepId'], $con); }
      
	  if($sqlU)
      {
      /************************************************ HR **********************/ 
      $email_to2 = 'vspl.hr@vnrseeds.com';
      $email_from = 'admin@vnrseeds.co.in';
	  $email_subject2 = $resEmp['Fname']." Relieving Date Changed From Level-1 Reporting Manager";
	  $email_txt = $resEmp['Fname']." Relieving Date Changed From Level-1 Reporting Manager";
	  $headers = "From: ".$email_from."\r\n"; 
	  $semi_rand = md5(time()); 
	  $headers .= "MIME-Version: 1.0\r\n";
	  $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
	  $email_message2 .=$Rname." has Changed ".$Ename." Relieving Date, for more details kindly log on to ESS <a href='https://www.vnrseeds.co.in'>www.vnrseeds.co.in</a>. \n\n";
	  $email_message2 .="Thanks & Regards\n";
	  $email_message2 .="HR\n\n";
	  $ok = @mail($email_to2, $email_subject2, $email_message2, $headers);
      echo '<script>alert("Data update successfully"); </script>'; 
	  /************************************************ HR **********************/	
	  }
	
  }
  elseif($_POST['Rep_Date']!='')
  { $RelD='Rep_RelievingDate2'; 
    if($reschk['Rep_SysDate']==date("Y-m-d")){ $sqlU=mysql_query("update hrm_employee_separation set Rep_RelievingDate='".date("Y-m-d",strtotime($_POST['RepDate']))."', Rep_Remark='".$_POST['RepRemark']."', Rep_SysDate='".date("Y-m-d")."' where EmpSepId=".$_POST['SepId'], $con); }
	else
	{ 
	  $sqlU=mysql_query("update hrm_employee_separation set ".$RelD."='".date("Y-m-d",strtotime($_POST['RepDate']))."', Rep2_Remark='".$_POST['RepRemark']."', Rep2_SysDate='".date("Y-m-d")."' where EmpSepId=".$_POST['SepId'], $con); 
	  if($sqlU)
      {
       /************************************************ HR **********************/ 
       $email_to2 = 'vspl.hr@vnrseeds.com';
       $email_from = 'admin@vnrseeds.co.in';
	   $email_subject2 = $resEmp['Fname']." Relieving Date Changed From Level-1 Reporting Manager";
	   $email_txt = $resEmp['Fname']." Relieving Date Changed From Level-1 Reporting Manager";
	   $headers = "From: ".$email_from."\r\n"; 
	   $semi_rand = md5(time()); 
	   $headers .= "MIME-Version: 1.0\r\n";
	   $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
	   $email_message2 .=$Rname." has Changed ".$Ename." Relieving Date, for more details kindly log on to ESS <a href='https://www.vnrseeds.co.in'>www.vnrseeds.co.in</a>. \n\n";
	   $email_message2 .="Thanks & Regards\n";
	   $email_message2 .="HR\n\n";
	   $ok = @mail($email_to2, $email_subject2, $email_message2, $headers);
       echo '<script>alert("Data update successfully"); </script>'; 
	   /************************************************ HR **********************/ 
      } 
	 
	}
  }
  else{ $RelD='Rep_RelievingDate'; 
        $sqlU=mysql_query("update hrm_employee_separation set Rep_RelievingDate='".date("Y-m-d",strtotime($_POST['RepDate']))."', Rep_SysDate='".date("Y-m-d")."', Rep_Remark='".$_POST['RepRemark']."' where EmpSepId=".$_POST['SepId'], $con);
  }
  
   //$sqlU=mysql_query("update hrm_employee_separation set Rep_RelievingDate='".date("Y-m-d",strtotime($_POST['RepDate']))."' where EmpSepId=".$_POST['SepId'], $con);
  
  
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
<style> .InputText {font-family:Geneva, Arial, Helvetica, sans-serif;font-size:13px;width:90px;background-color:#FFFFD9;border-style:groove;}
.InputText2 {font-family:Geneva, Arial, Helvetica, sans-serif;font-size:13px;width:90px;background-color:#E1FFE1;border-style:groove;}
.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}
.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;}</style>
<script language="javascript" type="text/javascript">
function validate(formname)
{ 
  var agree=confirm("Are you sure?");
  if(agree){ return true; } else{ return false; } 
}

function FunEdit(){ document.getElementById("EditRes").style.display='none'; document.getElementById("SentRes").style.display='block'; document.getElementById("f_btn1").disabled=false; document.getElementById("RepRemark").disabled=false; }
</script>
</head>
<body bgcolor="#E0DBE3">
<center>
<table border="0" style="width:590px;">
<tr>
   <td style="width:590px;" valign="top" align="center">
<?php if($_REQUEST['act']!='' AND $_REQUEST['act']=='actapp')  { ?>	
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
<?php 
$sqlRTR=mysql_query("select AppraiserId from hrm_employee_reporting where EmployeeID=".$resSE['Rep_EmployeeID'], $con); $resRTR=mysql_fetch_assoc($sqlRTR);
$sqlRTR2=mysql_query("select AppraiserId from hrm_employee_reporting where EmployeeID=".$resRTR['AppraiserId'], $con); $resRTR2=mysql_fetch_assoc($sqlRTR2);
?>
<input type="hidden" name="RTRId" id="RTRId" value="<?php echo $resRTR['AppraiserId']; ?>" /> 
<input type="hidden" name="RTR2Id" id="RTR2Id" value="<?php echo $resRTR2['AppraiserId']; ?>" />
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
    <td style="font-family:Geneva, Arial, Helvetica, sans-serif;font-size:13px;width:80px;">&nbsp;<b>EmpCode</b></td>
	<td align="" style="font-family:Geneva, Arial, Helvetica, sans-serif;font-size:13px;width:100px;">&nbsp;<?php echo $resE['EmpCode']; ?></td>
	<td style="font-family:Geneva, Arial, Helvetica, sans-serif;font-size:13px;width:100px;">&nbsp;<b>Name</b></td>
	<td style="font-family:Geneva, Arial, Helvetica, sans-serif;font-size:13px;width:250px;">&nbsp;<?php echo $NameE; ?></td>
   </tr>
   <tr bgcolor="#FFFFFF">
    <td style="font-family:Geneva, Arial, Helvetica, sans-serif;font-size:13px;width:80px;">&nbsp;<b>Department</b></td>
	<td align="" style="font-family:Geneva, Arial, Helvetica, sans-serif;font-size:13px;width:100px;">&nbsp;<?php echo $resDept['DepartmentCode']; ?></td>
	<td style="font-family:Geneva, Arial, Helvetica, sans-serif;font-size:13px;width:100px;">&nbsp;<b>Action</b></td>
	<td style="font-family:Geneva, Arial, Helvetica, sans-serif;font-size:13px;width:250px;background-color:#51A8FF;color:#FFFFFF;">&nbsp;<b><?php if($_REQUEST['v']=='A'){echo 'Resignation Approval';}elseif($_REQUEST['v']=='C'){echo 'Resignation Reject';} ?></b></td>
   </tr>
    <tr bgcolor="#FFFFFF">
    <td style="font-family:Geneva, Arial, Helvetica, sans-serif;font-size:13px;width:80px;">&nbsp;<b>Resignation</b></td>
	<td align="" style="font-family:Geneva, Arial, Helvetica, sans-serif;font-size:13px;width:100px;">&nbsp;<?php echo date("d-m-Y",strtotime($resSE['Emp_ResignationDate'])); ?></td>
   </tr>
    <tr bgcolor="#FFFFFF">
	<td colspan="2" style="font-family:Geneva, Arial, Helvetica, sans-serif;font-size:13px;width:150px;">&nbsp;<b>Expected Relieving Date</b></td>
	<td colspan="2" style="font-family:Geneva, Arial, Helvetica, sans-serif;font-size:13px;width:250px;">&nbsp;<b><?php echo date("d-m-Y",strtotime($resSE['Emp_RelievingDate'])); ?></b>
	<input type="hidden" name="ResDate" id="ResDate" value="<?php echo date("d-m-Y",strtotime($resSE['Emp_ResignationDate'])); ?>">
	<input type="hidden" id="NoticeDay" name="NoticeDay" value="<?php echo $resSE['NoticeDay']; ?>" />
	
	
		<input type="hidden" id="Rep_Date" name="Rep_Date" value="<?php if($resSE['Rep_RelievingDate']!='' && $resSE['Rep_RelievingDate']!='0000-00-00' && $resSE['Rep_RelievingDate']!='1970-01-01'){echo $resSE['Rep_RelievingDate']; } ?>" />
	<input type="hidden" id="Rep2_Date" name="Rep2_Date" value="<?php if($resSE['Rep_RelievingDate2']!='' && $resSE['Rep_RelievingDate2']!='0000-00-00' && $resSE['Rep_RelievingDate2']!='1970-01-01'){echo $resSE['Rep_RelievingDate2']; } ?>" />   <input type="hidden" id="Rep3_Date" name="Rep3_Date" value="<?php if($resSE['Rep_RelievingDate3']!='' && $resSE['Rep_RelievingDate3']!='0000-00-00' && $resSE['Rep_RelievingDate3']!='1970-01-01'){echo $resSE['Rep_RelievingDate3']; } ?>" />
	
<?php 
	if($resSE['Rep_RelievingDate3']!='' && $resSE['Rep_RelievingDate3']!='0000-00-00' && $resSE['Rep_RelievingDate3']!='1970-01-01'){ $RelmDate=date("d-m-Y",strtotime($resSE['Rep_RelievingDate3'])); }
	elseif($resSE['Rep_RelievingDate2']!='' && $resSE['Rep_RelievingDate2']!='0000-00-00' && $resSE['Rep_RelievingDate2']!='1970-01-01'){ $RelmDate=date("d-m-Y",strtotime($resSE['Rep_RelievingDate2'])); }
	elseif($resSE['Rep_RelievingDate']!='' && $resSE['Rep_RelievingDate']!='0000-00-00' && $resSE['Rep_RelievingDate']!='1970-01-01'){ $RelmDate=date("d-m-Y",strtotime($resSE['Rep_RelievingDate'])); }
	else { $RelmDate=''; }
?>
	
	
	</td>
   </tr>
   <?php if($_REQUEST['v']=='A'){ ?>
   <tr bgcolor="#FFFFFF">
    <td colspan="2" style="font-family:Geneva, Arial, Helvetica, sans-serif;font-size:13px;width:200px;">&nbsp;<b>Actual Relieving Date</b></td>
	<td colspan="2" style="font-family:Geneva, Arial, Helvetica, sans-serif;font-size:13px;width:300px;">&nbsp;<input name="RepDate" id="RepDate" class="InputText2" readonly value="<?php if($resSE['ResignationStatus']>=2){echo $RelmDate;}else{echo date("d-m-Y",strtotime($resSE['Emp_RelievingDate']));} ?>">&nbsp;<button id="f_btn1" class="CalenderButton" disabled="disabled"></button>
<script type="text/javascript">  var cal = Calendar.setup({ onSelect:  function(cal) { cal.hide()}, showTime: true }); 
cal.manageFields("f_btn1", "RepDate", "%d-%m-%Y");</script>
	</td>
   </tr>
   <?php } ?>
   <tr bgcolor="#FFFFFF">
    <td colspan="4">
	 <table>
	  <tr><td style="font-family:Geneva, Arial, Helvetica, sans-serif;font-size:13px;width:500px;" align="center">&nbsp;<b>Reporting Remark For <?php if($_REQUEST['v']=='A'){echo 'Approval';}elseif($_REQUEST['v']=='C'){echo 'Reject';} ?></b></td></tr>
	  <tr>
	    <td style="font-family:Geneva, Arial, Helvetica, sans-serif;font-size:13px;width:580px;" align="center">
	     <textarea name="RepRemark" id="RepRemark" cols="67" rows="5" style="background-color:#E1FFE1;border-style:groove;" disabled="disabled"><?php if($resSE['Rep3_Remark']!=''){echo $resSE['Rep3_Remark'];}elseif($resSE['Rep2_Remark']!=''){echo $resSE['Rep2_Remark'];}elseif($resSE['Rep_Remark']!=''){echo $resSE['Rep_Remark'];} ?></textarea>
	    </td>
	  </tr>
	  <tr>
        <td colspan="4" align="Right" class="fontButton">
		 <?php if($_REQUEST['Tv']=='RR'){ ?>
         <table><tr>
		 
		  <?php //if($resSE['HR_Approved']=='N'){?>
	      <td><input type="button" id="EditRes" name="EditRes" value="edit" onClick="FunEdit()" style="display:block;width:80px;"/><input type="submit" id="SentRes" name="SentRes" value="update" style="display:none;width:80px;"/></td>
		  <?php //} ?>
		  <td><input type="button" name="Refrash" value="refresh" onClick="javascript:window.location='SepResActApp2.php?act=<?php echo $_REQUEST['act']; ?>&e=44e&w=254&y=10234&a=e&e=5e2&e=4e&v=<?php echo $_REQUEST['v']; ?>&i=<?php echo $_REQUEST['i']; ?>&w=234&y=1022344&Tv=RR&retd=ee&wwrew=t%T@#+aa+sed818&d=101'"/></td>
	     </tr></table>
		 <?php } ?>
        </td>
      </tr> 
	  
	 </table>
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



