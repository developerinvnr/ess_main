<?php 
require_once('config/config.php');
if(isset($_POST['PId']) && $_POST['PId']!=""){
$sql = mysql_query("update hrm_employee_pms set ExtraAllowPMS=0 where EmpPmsId=".$_POST['PId'],$con); 
if($sql){?> <input type="hidden" id="Sno" value="<?php echo $_POST['No']; ?>" /> <?php } } 
if(isset($_POST['PmsId']) && $_POST['PmsId']!=""){
$sql2 = mysql_query("update hrm_employee_pms set ExtraAllowPMS=1 where EmpPmsId=".$_POST['PmsId'],$con); 
if($sql2){?> <input type="hidden" id="Sno" value="<?php echo $_POST['No']; ?>" /> <?php } } ?>



<?php if(isset($_POST['YId']) && $_POST['YId']!=""){
$sql = mysql_query("update hrm_employee_pms set ExtraAllowKRA=0 where EmployeeID=".$_POST['E']." AND AssessmentYear=".$_POST['YId'],$con); 
if($sql){?> <input type="hidden" id="Sno" value="<?php echo $_POST['N']; ?>" /> <?php } } 
if(isset($_POST['YearId']) && $_POST['YearId']!=""){ 
$sql2 = mysql_query("update hrm_employee_pms set ExtraAllowKRA=1 where EmployeeID=".$_POST['E']." AND AssessmentYear=".$_POST['YearId'],$con); 
if($sql2){?> <input type="hidden" id="Sno" value="<?php echo $_POST['N']; ?>" /> <?php } } ?>



<?php if(isset($_POST['act']) && $_POST['act']=='falseUnLck'){ 
$sql = mysql_query("update hrm_employee_pms set UnLckKRA=1 where EmployeeID=".$_POST['E']." AND AssessmentYear=".$_POST['YId'],$con); 
if($sql){?> <input type="hidden" id="Sno" value="<?php echo $_POST['N']; ?>" /> <?php } }
if(isset($_POST['act']) && $_POST['act']=='trueUnLck'){
$sql2 = mysql_query("update hrm_employee_pms set UnLckKRA=0 where EmployeeID=".$_POST['E']." AND AssessmentYear=".$_POST['YId'],$con); 
if($sql2){?> <input type="hidden" id="Sno" value="<?php echo $_POST['N']; ?>" /> <?php } } ?>
