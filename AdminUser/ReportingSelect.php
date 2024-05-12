<?php
require_once('config/config.php');
if(isset($_POST['id']) && $_POST['id']!=""){ 
	$sql = mysql_query("SELECT DesigId,EmailId_Vnr,MobileNo_Vnr FROM hrm_employee_general WHERE EmployeeId=".$_POST['id'], $con) or die(mysql_error()); $Res = mysql_fetch_assoc($sql); 
	$sqlPer = mysql_query("SELECT MobileNo FROM hrm_employee_personal WHERE EmployeeId=".$_POST['id'], $con) or die(mysql_error()); $ResPer = mysql_fetch_assoc($sqlPer); ?>
	 <input type="hidden" name="RepDesigId" id="RepDesigId" value="<?php echo $Res['DesigId']; ?>">
<?php  $sql2 = mysql_query("SELECT * FROM hrm_designation WHERE DesigId=".$Res['DesigId'], $con) or die(mysql_error()); $Res2 = mysql_fetch_assoc($sql2); ?>
	 <input type="hidden" class="All_180" id="RepDesigName"  value="<?php echo $Res2['DesigName']; ?>" >
	 <input type="hidden" class="All_180" id="RepEmailId" value="<?php echo $Res['EmailId_Vnr']; ?>">
	 <input type="hidden" class="All_180" id="RepContactNo" value="<?php if($Res['MobileNo_Vnr']=='0' OR $Res['MobileNo_Vnr']=='') {echo $ResPer['MobileNo'];} else { echo $Res['MobileNo_Vnr']; } ?>">
 <?php } ?>
 
