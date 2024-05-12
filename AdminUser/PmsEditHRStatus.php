<?php require_once('config/config.php'); 
$sql = mysql_query("SELECT HR_PmsStatus from hrm_employee_pms WHERE EmpPmsId=".$_POST['P']." AND EmployeeID=".$_POST['E'],$con);$res = mysql_fetch_array($sql);
echo '<input type="hidden" id="PmsSts" value='.$res['HR_PmsStatus'].' />';
echo '<input type="hidden" id="PmsNo" value='.$_POST['N'].' />';


$sCtc=mysql_query("select * from hrm_employee_ctc_pms where EmployeeID=".$_POST['E']." AND PmsId=".$_POST['P'], $con); 
$rwCtc=mysql_num_rows($sCtc); echo '<input type="hidden" id="CtcSts" value='.$rwCtc.' />';

$sElg=mysql_query("select * from hrm_employee_eligibility_pms where EmployeeID=".$_POST['E']." AND PmsId=".$_POST['P'], $con); $rwElg=mysql_num_rows($sElg); echo '<input type="hidden" id="EligSts" value='.$rwElg.' />';


?>

