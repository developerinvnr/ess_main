<?php
require_once('config/config.php');
if(isset($_POST['Deptid']) && $_POST['Deptid']!=""){
	$Deptid = $_POST['Deptid'];
	$sqlDept = mysql_query("SELECT * FROM hrm_department WHERE DepartmentId=".$Deptid, $con) or die(mysql_error()); $resDept = mysql_fetch_assoc($sqlDept); ?>
	 <table>
		<tr><td style="font-size:11px; height:18px;">Department :</td><td><input name="DeptName" id="DeptName" style="font-size:11px; width:220px; height:18px;" value="<?php echo $resDept['DepartmentName']; ?>"/></td></tr>
	    <tr><td style="font-size:11px; height:18px;">Code :&nbsp;</td><td><input name="DeptCode" id="DeptCode" ReadOnly style="font-size:11px; width:150px; height:18px;" value="<?php echo $resDept['DepartmentCode']; ?>"/><input type="hidden" name="DeptId" id="DeptId" value="<?php echo $Deptid; ?>"/></td></tr>
	 </table>
	   
<?php } ?>
