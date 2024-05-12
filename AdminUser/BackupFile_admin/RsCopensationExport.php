<?php 
require_once('config/config.php');
if($_REQUEST['y']!=0){ $sY=mysql_query("select * from hrm_year where YearId=".$_REQUEST['y']."", $con); $rY=mysql_fetch_assoc($sY);  
$FD=date("Y",strtotime($rY['FromDate'])); $TD=date("Y",strtotime($rY['ToDate'])); $PRD=$FD.'-'.$TD; } else {$PRD='ALL'; }
/*************************************************************************************************************/

if($_REQUEST['action']='RsCopensationExport') 
{ 
$csv_output .= '"SN",';
$csv_output .= '"DEPARTMENT",'; 
$sqlSt=mysql_query("select hrm_state.StateId,StateName,StateCode from hrm_state INNER JOIN hrm_headquater ON hrm_state.StateId=hrm_headquater.StateId INNER JOIN hrm_employee_general ON hrm_headquater.HqId=hrm_employee_general.HqId group by StateName ASC ",$con); while($resSt=mysql_fetch_assoc($sqlSt)){
$csv_output .= $resSt['StateCode'].'_Emp,';
$csv_output .= $resSt['StateCode'].'_Gross,';
}
$csv_output .= '"Total Emp",';
$csv_output .= '"Total Gross",';
$csv_output .= "\n";		

$today=date("Y-m-d"); $timestamp = strtotime($today); 
$sql=mysql_query("select DepartmentId,DepartmentCode from hrm_department where DepartmentName!='MANAGEMENT' AND DeptStatus='A' AND CompanyId=".$_REQUEST['c']." order by DepartmentName ASC",$con); $SNo=1; while($res=mysql_fetch_array($sql)){ 

$csv_output .= '"'.str_replace('"', '""', $SNo).'",'; 
$csv_output .= '"'.str_replace('"', '""', $res['DepartmentCode']).'",';

$sqlSt=mysql_query("select hrm_state.StateId,StateName from hrm_state INNER JOIN hrm_headquater ON hrm_state.StateId=hrm_headquater.StateId INNER JOIN hrm_employee_general ON hrm_headquater.HqId=hrm_employee_general.HqId group by StateName ASC ",$con); while($resSt=mysql_fetch_assoc($sqlSt)){ 
 $sqlTotE=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_headquater ON hrm_employee_general.HqId=hrm_headquater.HqId INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_headquater.StateId=".$resSt['StateId']." AND hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$_REQUEST['c']." AND hrm_employee_general.DepartmentId=".$res['DepartmentId']." AND hrm_employee_general.DateJoining<='".$TD."-03-31'",$con); $rowTotE=mysql_num_rows($sqlTotE);
 $sqlTotG=mysql_query("select SUM(Tot_GrossMonth) as Gross from hrm_employee_ctc INNER JOIN hrm_employee_general ON hrm_employee_ctc.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_headquater ON hrm_employee_general.HqId=hrm_headquater.HqId INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee_ctc.Status='A' AND hrm_headquater.StateId=".$resSt['StateId']." AND hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$_REQUEST['c']." AND hrm_employee_general.DepartmentId=".$res['DepartmentId']." AND hrm_employee_general.DateJoining<='".$TD."-03-31'",$con); $resTotG=mysql_fetch_assoc($sqlTotG);
$csv_output .= '"'.str_replace('"', '""', $rowTotE).'",';
$csv_output .= '"'.str_replace('"', '""', intval($resTotG['Gross'])).'",';
}
$sqlTotEE=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_headquater ON hrm_employee_general.HqId=hrm_headquater.HqId INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$_REQUEST['c']." AND hrm_employee_general.DepartmentId=".$res['DepartmentId']." AND hrm_employee_general.DateJoining<='".$TD."-03-31'",$con); $rowTotEE=mysql_num_rows($sqlTotEE);
 $sqlTotGG=mysql_query("select SUM(Tot_GrossMonth) as Gross from hrm_employee_ctc INNER JOIN hrm_employee_general ON hrm_employee_ctc.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_headquater ON hrm_employee_general.HqId=hrm_headquater.HqId INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee_ctc.Status='A' AND hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$_REQUEST['c']." AND hrm_employee_general.DepartmentId=".$res['DepartmentId']." AND hrm_employee_general.DateJoining<='".$TD."-03-31'",$con); 
 $resTotGG=mysql_fetch_assoc($sqlTotGG);

$csv_output .= '"'.str_replace('"', '""', $rowTotEE).'",';
$csv_output .= '"'.str_replace('"', '""', intval($resTotGG['Gross'])).'",';
$csv_output .= "\n";
$SNo++; }

$csv_output .= '"'.str_replace('"', '""', '').'",'; 
$csv_output .= '"'.str_replace('"', '""', 'TOTAL').'",';
$sqlSt=mysql_query("select hrm_state.StateId,StateName from hrm_state INNER JOIN hrm_headquater ON hrm_state.StateId=hrm_headquater.StateId INNER JOIN hrm_employee_general ON hrm_headquater.HqId=hrm_employee_general.HqId group by StateName ASC ",$con); while($resSt=mysql_fetch_assoc($sqlSt)){ 
 $sqlTotEt=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_headquater ON hrm_employee_general.HqId=hrm_headquater.HqId INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_headquater.StateId=".$resSt['StateId']." AND hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$_REQUEST['c']." AND hrm_employee_general.DateJoining<='".$TD."-03-31'",$con); $rowTotEt=mysql_num_rows($sqlTotEt);
 $sqlTotGt=mysql_query("select SUM(Tot_GrossMonth) as Gross from hrm_employee_ctc INNER JOIN hrm_employee_general ON hrm_employee_ctc.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_headquater ON hrm_employee_general.HqId=hrm_headquater.HqId INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee_ctc.Status='A' AND hrm_headquater.StateId=".$resSt['StateId']." AND hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$_REQUEST['c']." AND hrm_employee_general.DateJoining<='".$TD."-03-31'",$con); 
 $resTotGt=mysql_fetch_assoc($sqlTotGt);
$csv_output .= '"'.str_replace('"', '""', $rowTotEt).'",'; 
$csv_output .= '"'.str_replace('"', '""', intval($resTotGt['Gross'])).'",'; 
}
$sqlTotEEt=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_headquater ON hrm_employee_general.HqId=hrm_headquater.HqId INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$_REQUEST['c']." AND hrm_employee_general.DateJoining<='".$TD."-03-31'",$con); $rowTotEEt=mysql_num_rows($sqlTotEEt);
 $sqlTotGGt=mysql_query("select SUM(Tot_GrossMonth) as Gross from hrm_employee_ctc INNER JOIN hrm_employee_general ON hrm_employee_ctc.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_headquater ON hrm_employee_general.HqId=hrm_headquater.HqId INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee_ctc.Status='A' AND hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$_REQUEST['c']." AND hrm_employee_general.DateJoining<='".$TD."-03-31'",$con); $resTotGGt=mysql_fetch_assoc($sqlTotGGt);
$csv_output .= '"'.str_replace('"', '""', $rowTotEEt).'",'; 
$csv_output .= '"'.str_replace('"', '""', intval($resTotGGt['Gross'])).'",';
$csv_output .= "\n";

# Close the MySql connection
mysql_close($con);
# Set the headers so the file downloads
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Content-Length: " . strlen($csv_output));
header("Content-type: text/x-csv");
header("Content-Disposition: attachment; filename=Compensation_Details_.csv");
echo $csv_output;
exit; 
}
?>