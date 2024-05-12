<?php require_once('config/config.php'); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title><?php include_once('../Title.php'); ?>&nbsp;Employee Training Program</title>
<style>.head{font-family:Times New Roman;font-size:14px;font-weight:bold;}.textInput{font-family:Times New Roman;font-size:12px;height:16px;}
.textInputA{font-family:Times New Roman;font-size:14px;height:16px;}.head2{font-family:Times New Roman;font-size:12px;}
.CalenderButton {background-image:url(images/CalenderBtn.jpeg);width:16px;height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}
.body{font-family:Times New Roman;font-size:12px;}</style>
<script>
function PrintPage() {window.print(); window.close();
}
</script>
</head>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" bgcolor="#E0DBE3" onLoad="PrintPage()">
<?php $sqlT = mysql_query("SELECT * from hrm_company_training WHERE TrainingId=".$_REQUEST['id'], $con); $Sno=1; $resT = mysql_fetch_assoc($sqlT);?> 	
<table style="vertical-align:top;width:700px;" align="center" border="0">
 <tr>
  <td style="vertical-align:top;width:700px;">
    <table style="vertical-align:top;width:700px;" align="center" border="0">
 <tr>
 <td>
  <table border="0" style="vertical-align:top;width:700px;">
   <tr>
   <td bgcolor="#FFFFFF">
    <table border="1">
	  <tr>
    <td class="head" style="width:100px;">Title :</td><td style="width:240px;">&nbsp;<?php echo $resT['TraTitle']; ?></td>
	<td class="head" style="width:100px;">&nbsp;Venue :</td><td style="width:240px;">&nbsp;<?php echo $resT['Location']; ?></td>
   </tr>
   <tr>
    <td class="head" style="width:100px;">Trainer :</td><td style="width:240px;">&nbsp;<?php echo $resT['TrainerName']; ?></td>
	<td class="head" style="width:100px;">&nbsp;Institute :</td><td style="width:240px;">&nbsp;<?php echo $resT['Institute']; ?></td>
   </tr>
    <tr>
    <td class="head" style="width:100px;">Date From :</td>
	<td style="width:240px;" class="head">&nbsp;<?php echo date("d-m-Y",strtotime($resT['TraFrom'])); ?>
	 <input type="radio" name="FromDay" id="FromHalf" onClick="ClickFrom(this.value)" value="H" <?php if($resT['TraFrom_HF']=='H'){echo 'checked';} ?> />HalfDay&nbsp;
	 <input type="radio" name="FromDay" id="FromFull" onClick="ClickFrom(this.value)" value="F" <?php if($resT['TraFrom_HF']=='F'){echo 'checked';} ?> />FullDay</font>
	 </td>
	<td class="head" style="width:100px;">&nbsp;Date To :</td>
	<td style="width:240px;" class="head">&nbsp;<?php echo date("d-m-Y",strtotime($resT['TraTo'])); ?>
	 <input type="radio" name="ToDay" id="ToHalf" onClick="ClickTo(this.value)" value="H" <?php if($resT['TraTo_HF']=='H'){echo 'checked';} ?>/>HalfDay&nbsp;
	 <input type="radio" name="ToDay" id="ToFull" onClick="ClickTo(this.value)" value="F" <?php if($resT['TraTo_HF']=='F'){echo 'checked';} ?>/>FullDay</font>
	 </td>
   </tr>
    <tr>
    <td class="head" style="width:100px;">Duration :</td>
	<td style="width:240px;">&nbsp;<?php echo $resT['Duration'].'&nbsp;';if($resT['Duration']>0){echo 'Days';}else{echo 'Day';} ?></td>
	<td class="head" style="width:100px;">&nbsp;Mandays :</td><td style="width:240px;">&nbsp;<?php echo $resT['Man_Day']; ?></td>
   </tr>
	</table>
   </td>
   <tr><td>&nbsp;</td></tr>   
   <tr><td class="head" colspan="4">Training Expenses Cost :&nbsp;&nbsp;</td></tr>
   <tr>
   <td colspan="5" style="width:700px;">
    <table border="1">
	 <tr bgcolor="#7a6189">
	  <td class="head" align="center" style="width:50px;color:#FFFFFF;">SN</td>
	  <td class="head" align="center" style="width:250px;color:#FFFFFF;">Particular</td>
	  <td class="head" align="center" style="width:100px;color:#FFFFFF;">Amount</td>
	  <td class="head" align="center" style="width:300px;color:#FFFFFF;">Remark</td>
	  
	 </tr> 	 
<?php $sqlP=mysql_query("select * from hrm_company_training_particular where CompanyId=".$_REQUEST['c']." order by ParticularId ASC", $con); 
      $sn=1; while($resP=mysql_fetch_assoc($sqlP)) {?>
      <tr bgcolor="#FFFFFF">
	  <td class="body" align="center" style="width:50px;"><?php echo $sn; ?></td>
	  <td class="body" align="" style="width:250px;"><?php echo $resP['Particular'];?></td>
<?php $sqlC=mysql_query("select Remark,Amount from hrm_company_training_cost where ParticularId=".$resP['ParticularId']." AND TrainingId=".$_REQUEST['id'], $con); 
      $resC=mysql_fetch_assoc($sqlC); 	?>  
	  <td class="body" align="right" style="width:100px;"><?php echo $resC['Amount'] ?>&nbsp;</td>
	  <td class="body" align="" style="width:300px;"><?php echo $resC['Remark'] ?></td>
	 </tr>
<?php $sn++; } $No=$sn-1;?>
      <tr bgcolor="#7a6189">
	  <td colspan="2" class="head" align="right" style="color:#FFFFFF;">Total Amount&nbsp;&nbsp;</td>
<?php $sqlTot=mysql_query("select SUM(Amount) as TotAmt from hrm_company_training_cost where TrainingId=".$_REQUEST['id'], $con); $resTot=mysql_fetch_assoc($sqlTot); ?>	  
	  <td class="body" align="right"><b><?php if($resTot['TotAmt']>0){echo $resTot['TotAmt'];} ?></b>&nbsp;</td>
	  <td>&nbsp;</td>
	 </tr>
	</table>
   </td>
   </tr>
   <tr><td>&nbsp;</td></tr>
   <tr><td class="head" colspan="5">No. Of Participant :</td></tr>
    <tr>
   <td colspan="5" style="width:700px;">
   <span id="PartcularEmp">
    <table border="1">
	 <tr bgcolor="#7a6189">
	  <td class="head" align="center" style="width:50px;color:#FFFFFF;">SN</td>
	  <td class="head" align="center" style="width:60px;color:#FFFFFF;">EmpCode</td>
	  <td class="head" align="center" style="width:400px;color:#FFFFFF;">Name</td>
	  <td class="head" align="center" style="width:190px;color:#FFFFFF;">Department</td>
<?php $sqlP=mysql_query("select EmpCode,Fname,Sname,Lname,DepartmentCode,DR,Married,Gender from hrm_company_training_participant INNER JOIN hrm_employee_general ON hrm_company_training_participant.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_personal ON hrm_company_training_participant.EmployeeID=hrm_employee_personal.EmployeeID INNER JOIN hrm_employee ON hrm_company_training_participant.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_department ON hrm_employee_general.DepartmentId=hrm_department.DepartmentId where hrm_company_training_participant.TrainingId=".$_REQUEST['id'], $con); 
$sn=1; while($resP=mysql_fetch_array($sqlP)){  if($resP['DR']=='Y'){$MS='Dr.';} elseif($resP['Gender']=='M'){$MS='Mr.';} elseif($resP['Gender']=='F' AND $resP['Married']=='Y'){$MS='Mrs.';} elseif($resP['Gender']=='F' AND $resP['Married']=='N'){$MS='Miss.';}  $Name=$MS.' '.$resP['Fname'].' '.$resP['Sname'].' '.$resP['Lname'];
?>	  
	 <tr bgcolor="#FFFFFF">
	  <td class="head2" align="center" style="width:50px;"><?php echo $sn; ?></td>
	  <td class="head2" align="center" style="width:60px;"><?php echo $resP['EmpCode']; ?></td>
	  <td class="head2" align="" style="width:400px;">&nbsp;<?php echo $Name; ?></td>
	  <td class="head2" align="" style="width:190px;">&nbsp;<?php echo $resP['DepartmentCode']; ?></td>
	 </tr> 
<?php $sn++;} ?>	 
	  
	</table>
    </span>
   </td>
   </tr>
   <tr>
   <td colspan="5" style="width:700px;">
    <table border="0">
	 <tr >
	  <td class="head" style="width:500px;c">Other Participant</td>
	 </tr>  
	 <tr>
	  <td>
	   <table border="0" cellpadding="0" cellspacing="0">
	    <tr>
		 <td style="width:600px;">
		 <span id="OthPartEmp">
		 <table style="width:600px;" cellpadding="0" cellspacing="0" border="1">
		  <tr bgcolor="#7a6189"><td colspan="2" class="head" align="center" style="width:600px;color:#FFFFFF;">Name/ Details</td></tr>
<?php $sqlP2=mysql_query("select * from hrm_company_training_participant where EmployeeID='' AND OtherName!='' AND TrainingId=".$_REQUEST['id']." order by TraEmpId ASC", $con); 
$sn2=1; while($resP2=mysql_fetch_array($sqlP2)){ ?>			 
		  <tr bgcolor="#FFFFFF">
		    <td style="width:50px;font-family:Times New Roman;font-size:12px;" align="center"><?php echo $sn2; ?></td>
		    <td style="width:500px;font-family:Times New Roman;font-size:14px;">&nbsp;<?php echo $resP2['OtherName']; ?></td>
		  </tr>
<?php $sn2++;} ?>			  
		 </table>
		 </span>
		 </td>
		</tr>	
	   </table>
	  </td>
	 </tr>
	 
	</table>
   </td>
   </tr>
   
  </table>
 </td>
 </tr> 
</table>
  </td>  
 </tr>
</table>
</body>
</html>
