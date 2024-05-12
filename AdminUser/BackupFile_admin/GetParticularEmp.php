<?php
require_once('config/config.php');
if(isset($_POST['EI']) && $_POST['EI']!=""){
if($_POST['Action']=='Add') 
{
//$sqlc=mysql_query("select TrainingId from hrm_company_training_participant where TrainingId=".$_POST['ID']." AND EmployeeID=".$_POST['EI'], $con);
//$row=mysql_num_rows($sqlc); if($row==0){
$sql = mysql_query("insert into hrm_company_training_participant(TrainingId,EmployeeID) values(".$_POST['ID'].", ".$_POST['EI'].")", $con) or die(mysql_error()); //} 
}

if($_POST['Action']=='Delete') 
{ 
//$sqlc=mysql_query("select TrainingId from hrm_company_training_participant where TrainingId=".$_POST['ID']." AND EmployeeID=".$_POST['EI'], $con);
//$row=mysql_num_rows($sqlc); if($row>0){
$sql = mysql_query("delete from hrm_company_training_participant where EmployeeID=".$_POST['EI']." AND TrainingId=".$_POST['ID'], $con) or die(mysql_error()); //} 
}

?>
	 <table border="1">
	 <tr bgcolor="#7a6189">
	  <td class="head" align="center" style="width:50px;color:#FFFFFF;">SN</td>
	  <td class="head" align="center" style="width:60px;color:#FFFFFF;">EmpCode</td>
	  <td class="head" align="center" style="width:400px;color:#FFFFFF;">Name</td>
	  <td class="head" align="center" style="width:190px;color:#FFFFFF;">Department</td>
	 </tr>
<?php $sqlP=mysql_query("select EmpCode,Fname,Sname,Lname,DepartmentCode,DR,Married,Gender from hrm_company_training_participant p INNER JOIN hrm_employee_general g ON p.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_personal pp ON p.EmployeeID=pp.EmployeeID INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID INNER JOIN hrm_department d ON g.DepartmentId=d.DepartmentId where p.TrainingId=".$_POST['ID'], $con); 
$rowP=mysql_num_rows($sqlP); echo '<input type="hidden" id="TotEmpParti" value="'.$rowP.'" />'; $sn=1; while($resP=mysql_fetch_array($sqlP)){  if($resP['DR']=='Y'){$MS='Dr.';} elseif($resP['Gender']=='M'){$MS='Mr.';} elseif($resP['Gender']=='F' AND $resP['Married']=='Y'){$MS='Mrs.';} elseif($resP['Gender']=='F' AND $resP['Married']=='N'){$MS='Miss.';}  $Name=$MS.' '.$resP['Fname'].' '.$resP['Sname'].' '.$resP['Lname'];

?>	 
	 <tr bgcolor="#FFFFFF">
	  <td class="head2" align="center" style="width:50px;"><?php echo $sn; ?></td>
	  <td class="head2" align="center" style="width:60px;"><?php echo $resP['EmpCode']; ?></td>
	  <td class="head2" align="" style="width:400px;"><?php echo $Name; ?></td>
	  <td class="head2" align="" style="width:190px;"><?php echo $resP['DepartmentCode']; ?></td>
	 </tr> 
<?php $sn++;} ?>	 
	</table>	   
<?php } ?>



<?php if(isset($_POST['Act']) && $_POST['Act']!=""){ 
//$sql=mysql_query("select TrainingId from hrm_company_training_participant where TrainingId=".$_POST['ID']." AND OtherName='".$_POST['Val']."' ", $con);
//$row=mysql_num_rows($sql); if($row==0){
$sql = mysql_query("insert into hrm_company_training_participant(TrainingId,OtherName) values(".$_POST['ID'].", '".$_POST['Val']."')", $con); //} 
$sqlPP=mysql_query("select TrainingId from hrm_company_training_participant where TrainingId=".$_POST['ID'], $con);
$rowPP=mysql_num_rows($sqlPP); echo '<input type="hidden" id="TotEmpParti" value="'.$rowPP.'" />'; 
?>
<table style="width:600px;" border="1" cellpadding="0" cellspacing="0">
          <tr bgcolor="#7a6189"><td colspan="3" class="head" align="center" style="width:600px;color:#FFFFFF;">Name/ Details</td></tr>
<?php $sqlP2=mysql_query("select * from hrm_company_training_participant where EmployeeID='' AND OtherName!='' AND TrainingId=".$_POST['ID']." order by TraEmpId ASC", $con); 
$sn2=1; while($resP2=mysql_fetch_array($sqlP2)){  ?>			 
		  <tr bgcolor="#FFFFFF">
		   <td style="width:50px;font-family:Times New Roman;font-size:12px;" align="center"><?php echo $sn2; ?></td>
		   <td style="width:500px;font-family:Times New Roman;font-size:14px;">&nbsp;<?php echo $resP2['OtherName']; ?></td>
		   <td style="width:50px;" align="center"><img src="images/delete.png" border="0" onClick="OthDel(<?php echo $resP2['TraEmpId'].', '.$_POST['ID']; ?>)"/></td>
		  </tr>
<?php $sn2++;} ?>	
          <tr bgcolor="#FFFFFF">
		    <td style="width:50px;font-family:Times New Roman;font-size:12px;" align="center"><?php echo $sn2; ?></td>
		    <td style="width:500px;font-family:Times New Roman;font-size:14px;">
			<input style="width:490px;font-family:Times New Roman;font-size:14px;border-style:hidden;" id="OthName" name="OthName" value="" maxlength="199"/></td>
		    <td style="width:50px;" align="center"><input type="button" id="SavBtn" class="SaveButton" onClick="SaveClick(<?php echo $_POST['ID']; ?>)" /></td>
		  </tr>  	  
</table>
<?php } ?>

<?php if(isset($_POST['Act2']) && $_POST['Act2']='DelOthEmp'){ 
$sql=mysql_query("delete from hrm_company_training_participant where TraEmpId=".$_POST['v']." AND TrainingId=".$_POST['ID'], $con);
$sqlPP=mysql_query("select TrainingId from hrm_company_training_participant where TrainingId=".$_POST['ID'], $con);
$rowPP=mysql_num_rows($sqlPP); echo '<input type="hidden" id="TotEmpParti" value="'.$rowPP.'" />'; 
?>
<table style="width:600px;" border="1" cellpadding="0" cellspacing="0">
          <tr bgcolor="#7a6189"><td colspan="3" class="head" align="center" style="width:600px;color:#FFFFFF;">Name/ Details</td></tr>
<?php $sqlP2=mysql_query("select * from hrm_company_training_participant where EmployeeID='' AND OtherName!='' AND TrainingId=".$_POST['ID']." order by TraEmpId ASC", $con); 
$sn2=1; while($resP2=mysql_fetch_array($sqlP2)){  ?>			 
		  <tr bgcolor="#FFFFFF">
		   <td style="width:50px;font-family:Times New Roman;font-size:12px;" align="center"><?php echo $sn2; ?></td>
		   <td style="width:500px;font-family:Times New Roman;font-size:14px;">&nbsp;<?php echo $resP2['OtherName']; ?></td>
		   <td style="width:50px;" align="center"><img src="images/delete.png" border="0" onClick="OthDel(<?php echo $resP2['TraEmpId'].', '.$_POST['ID']; ?>)"/></td>
		  </tr>
<?php $sn2++;} ?>	
          <tr bgcolor="#FFFFFF">
		    <td style="width:50px;font-family:Times New Roman;font-size:12px;" align="center"><?php echo $sn2; ?></td>
		    <td style="width:500px;font-family:Times New Roman;font-size:14px;">
			<input style="width:490px;font-family:Times New Roman;font-size:14px;border-style:hidden;" id="OthName" name="OthName" value="" maxlength="199"/></td>
		    <td style="width:50px;" align="center"><input type="button" id="SavBtn" class="SaveButton" onClick="SaveClick(<?php echo $_POST['ID']; ?>)" /></td>
		  </tr>  			  
</table>
<?php } ?>

