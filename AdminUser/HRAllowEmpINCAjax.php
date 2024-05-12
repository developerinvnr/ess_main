<?php
require_once('config/config.php');
if(isset($_POST['Check']) && $_POST['Check']!="")
{
 if($_POST['Check']=='Check')
 {  
  $sql = mysql_query("update hrm_employee_pms set HodSubmit_IncStatus=1 where EmpPmsId=".$_POST['P']." AND EmployeeID=".$_POST['E']." AND AssessmentYear=".$_POST['Y']." AND CompanyId=".$_POST['C'],$con); 
 }
 
 if($sql){ ?> 
 <input type="hidden" id="Check" value="<?php echo $_POST['Check']; ?>" /><input type="hidden" id="Emp" value="<?php echo $_POST['E']; ?>" />
 <input type="hidden" id="SNo" value="<?php echo $_POST['N']; ?>" />

<?php } } ?>