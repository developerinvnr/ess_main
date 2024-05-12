<?php require_once('config/config.php'); 
$sql = mysql_query("SELECT HR_PmsStatus from hrm_employee_pms WHERE EmpPmsId=".$_POST['P']." AND EmployeeID=".$_POST['E'],$con);$res = mysql_fetch_array($sql);
echo '<input type="hidden" id="PmsSts" value='.$res['HR_PmsStatus'].' />';
echo '<input type="hidden" id="PmsNo" value='.$_POST['N'].' />';
?>

