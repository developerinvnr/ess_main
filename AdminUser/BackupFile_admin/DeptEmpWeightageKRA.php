<?php 
require_once('config/config.php');
if(isset($_POST['DPid']) && $_POST['DPid']!=""){
	$DPid = $_POST['DPid']; $CompanyId = $_POST['ComId']; $YId = $_POST['YId'];?>
	 <table border="1">
<?php $sqlDP = mysql_query("SELECT hrm_employee.EmployeeID,EmpCode,Fname,Sname,Lname,HqId,DepartmentId,DesigId FROM hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID WHERE EmpStatus='A' AND EmpType='E' AND CompanyId=".$CompanyId." AND DepartmentId=".$DPid, $con) or die(mysql_error()); 
      $Sno=1;  while($resDP = mysql_fetch_assoc($sqlDP)) { ?>
		<tr bgcolor="#FFFFFF"> 
		<td align="center" style="" class="All_50"><?php echo $Sno; ?></td>
		<td align="left" style="" class="All_80">&nbsp;<?php echo $resDP['EmpCode']; ?></td>
		<td style="" class="All_200">&nbsp;<?php echo $resDP['Fname'].' '.$resDP['Sname'].' '.$resDP['Lname']; ?></td>
		<td style="" class="All_150">&nbsp;
		<?php $sqlHQ = mysql_query("SELECT HqName FROM hrm_headquater WHERE HqId=".$resDP['HqId'], $con) or die(mysql_error()); 
		      $resHQ = mysql_fetch_assoc($sqlHQ); echo $resHQ['HqName'];?>
		</td>
		<td style="" class="All_300">&nbsp;
		<?php $sqlDesig = mysql_query("SELECT DesigName FROM hrm_designation WHERE DesigId=".$resDP['DesigId'], $con) or die(mysql_error()); 
		      $resDesig = mysql_fetch_assoc($sqlDesig); echo $resDesig['DesigName'];?>
		</td>
		<td style="" class="All_100" align="center">&nbsp;
		<?php $sql2=mysql_query("select KRASetting, EmpPmsId from hrm_employee_pms where AssessmentYear=".$YId." AND EmployeeID=".$resDP['EmployeeID'], $con); 
              $res2=mysql_fetch_assoc($sql2); if($res2['KRASetting']=='Y') 
			  {
			  $sql3=mysql_query("select Weightage,Target from hrm_employee_pms_kraforma where EmpPmsId=".$res2['EmpPmsId']." AND (Weightage=0 OR Target=0)", $con);
			  $row3=mysql_num_rows($sql3); if($row3==0){echo '<font color="#006200">OK</font>';} elseif($row3>0){echo '<font color="#6161ED">Pending</font>';}
			  }
			  elseif($res2['KRASetting']=='N') {echo '<font color="#D20000">NO</font>'; }?>		
		</td>
		<td align="center" valign="middle" class="All_80">
<?php $sql4=mysql_query("select EmpPmsId from hrm_employee_pms where AssessmentYear=".$YId." AND EmployeeID=".$resDP['EmployeeID'], $con); 
      $row4=mysql_num_rows($sql4); if($row4>0) {?>
		 <a href="#"><img src="images/edit.png" border="0" alt="Edit" onclick="SettingWeight(<?php echo $resDP['EmployeeID'].','.$YId; ?>)"></a>
         <?php } else {echo '&nbsp;';} ?>
		</td>
		</tr>
		<?php $Sno++; } ?>
	</table>
<?php }

if(isset($_POST['DesigId2']) && $_POST['DesigId2']!=""){
	$DesigId2 = $_POST['DesigId2']; $CompanyId = $_POST['ComId2']; $YId = $_POST['YId2']; ?>
	
	
	 <table border="1">
<?php $sqlDP = mysql_query("SELECT hrm_employee.EmployeeID,EmpCode,Fname,Sname,Lname,HqId,DepartmentId,DesigId FROM hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID WHERE hrm_employee.EmpStatus='A' AND EmpType='E' AND hrm_employee.CompanyId=".$CompanyId." AND (hrm_employee_general.DesigId=".$DesigId2." OR hrm_employee_general.DesigId2=".$DesigId2.")", $con) or die(mysql_error()); 
      $Sno=1;  while($resDP = mysql_fetch_assoc($sqlDP)) { ?>
		<tr bgcolor="#FFFFFF"> 
		<td align="center" style="" class="All_50"><?php echo $Sno; ?></td>
		<td align="left" style="" class="All_80">&nbsp;<?php echo $resDP['EmpCode']; ?></td>
		<td style="" class="All_200">&nbsp;<?php echo $resDP['Fname'].' '.$resDP['Sname'].' '.$resDP['Lname']; ?></td>
		<td style="" class="All_150">&nbsp;
		<?php $sqlHQ = mysql_query("SELECT HqName FROM hrm_headquater WHERE HqId=".$resDP['HqId'], $con) or die(mysql_error()); 
		      $resHQ = mysql_fetch_assoc($sqlHQ); echo $resHQ['HqName'];?>
		</td>
		<td style="" class="All_300">&nbsp;
		<?php $sqlDesig = mysql_query("SELECT DesigName FROM hrm_designation WHERE DesigId=".$resDP['DesigId'], $con) or die(mysql_error()); 
		      $resDesig = mysql_fetch_assoc($sqlDesig); echo $resDesig['DesigName'];?>
		</td>
		<td style="" class="All_100" align="center">&nbsp;
		<?php $sql2=mysql_query("select KRASetting,EmpPmsId from hrm_employee_pms where AssessmentYear=".$YId." AND EmployeeID=".$resDP['EmployeeID'], $con); 
              $res2=mysql_fetch_assoc($sql2); if($res2['KRASetting']=='Y') 
			  {
			  $sql3=mysql_query("select Weightage,Target from hrm_employee_pms_kraforma where EmpPmsId=".$res2['EmpPmsId']." AND (Weightage=0 OR Target=0)", $con);
			  $row3=mysql_num_rows($sql3); if($row3==0){echo '<font color="#006200">OK</font>';} elseif($row3>0){echo '<font color="#6161ED">Pending</font>';}
			  }
			  elseif($res2['KRASetting']=='N') {echo '<font color="#D20000">NO</font>'; }?>		
		</td>
		<td align="center" valign="middle" class="All_80">
		
		
		<a href="#"><img src="images/edit.png" border="0" alt="Edit" onclick="SettingWeight(<?php echo $resDP['EmployeeID'].','.$YId; ?>)"></a>
		</td>
		</tr>
		<?php $Sno++; } ?>
	</table>
<?php } ?>	


