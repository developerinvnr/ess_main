<?php 
require_once('config/config.php');
if(isset($_POST['DPid']) && $_POST['DPid']!=""){
	$DPid = $_POST['DPid']; $CompanyId = $_POST['ComId']; ?>
	 <table border="1">
<?php $sqlDP = mysql_query("SELECT hrm_employee.EmployeeID,EmpCode,Fname,Sname,Lname,HqId,DepartmentId,DesigId,Gender,Married FROM hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID WHERE EmpStatus!='De' AND CompanyId=".$CompanyId." AND DepartmentId=".$DPid, $con) or die(mysql_error()); 
      $Sno=1;  while($resDP = mysql_fetch_assoc($sqlDP)) { 
if($resDP['Gender']=='M'){$M='Mr.';} elseif($resDP['Gender']=='F' AND $resDP['Married']=='Y'){$M='Mrs.';} elseif($resDP['Gender']=='F' AND $resDP['Married']=='N'){$M='Miss.';} 
	  $Name=$M.' '.$resDP['Fname'].' '.$resDP['Sname'].' '.$resDP['Lname']; 
?>
		<tr bgcolor="#FFFFFF"> 
		<td align="center" style="" class="All_50"><?php echo $Sno; ?></td>
		<td align="left" style="" class="All_80">&nbsp;<?php echo $resDP['EmpCode']; ?></td>
		<td style="" class="All_250">&nbsp;<?php echo $Name; ?></td>
		<td style="" class="All_150">&nbsp;
		<?php $sqlHQ = mysql_query("SELECT HqName FROM hrm_headquater WHERE HqId=".$resDP['HqId'], $con) or die(mysql_error()); 
		      $resHQ = mysql_fetch_assoc($sqlHQ); echo $resHQ['HqName'];?>
		</td>
		<td style="" class="All_150">&nbsp;
		<?php $sqlDept = mysql_query("SELECT DepartmentName FROM hrm_department WHERE DepartmentId=".$resDP['DepartmentId'], $con) or die(mysql_error()); 
		      $resDept = mysql_fetch_assoc($sqlDept); echo $resDept['DepartmentName'];?>
		</td>
		<td style="" class="All_300">&nbsp;
		<?php $sqlDesig = mysql_query("SELECT DesigName FROM hrm_designation WHERE DesigId=".$resDP['DesigId'], $con) or die(mysql_error()); 
		      $resDesig = mysql_fetch_assoc($sqlDesig); echo $resDesig['DesigName'];?>
		</td>
		<td align="center" valign="middle" class="All_150">
		  <a href="#"><img src="images/edit.png" border="0" alt="Edit" onClick="edit(<?php echo $resDP['EmployeeID']; ?>)"></a>
		  &nbsp;&nbsp;<a href="#"><img src="images/delete.png" alt="Delete" border="0" onClick="del(<?php echo $resDP['EmployeeID']; ?>)"></a>
		  &nbsp;&nbsp;<a href="#"><img src="images/key.png" alt="ChangeKey" border="0" onClick="ChangeKey(<?php echo $resDP['EmployeeID']; ?>)"></a>
		</td>
		</tr>
		<?php $Sno++; } ?>
	</table>
<?php } ?>	
