<?php 
require_once('config/config.php');
if($_REQUEST['y']!=0){ $sY=mysql_query("select * from hrm_year where YearId=".$_REQUEST['y']."", $con); $rY=mysql_fetch_assoc($sY);  
$FD=date("Y",strtotime($rY['FromDate'])); $TD=date("Y",strtotime($rY['ToDate'])); $PRD=$FD.'-'.$TD; } else {$PRD='ALL'; }
/*************************************************************************************************************/

if($_REQUEST['action']='RsCopensationExport') 
{ 
$csv_output .= '"SN",';
$csv_output .= '"DEPARTMENT",'; 
$sqlSt=mysql_query("select st.id as StateId,st.state_name as StateName, st.state_code as StateCode from core_states st left JOIN hrm_employee_general g ON st.id=g.CostCenter group by state_name ASC",$con); while($resSt=mysql_fetch_assoc($sqlSt)){
$csv_output .= $resSt['StateCode'].'_Emp,';
$csv_output .= $resSt['StateCode'].'_Gross,';
}
$csv_output .= '"Total Emp",';
$csv_output .= '"Total Gross",';
$csv_output .= "\n";		

$today=date("Y-m-d"); $timestamp = strtotime($today); 
$sql=mysql_query("select id as DepartmentId,department_code as DepartmentCode from core_departments where is_active=1 order by department_name ASC",$con); $SNo=1; while($res=mysql_fetch_array($sql)){ 

$csv_output .= '"'.str_replace('"', '""', $SNo).'",'; 
$csv_output .= '"'.str_replace('"', '""', $res['DepartmentCode']).'",';

$sqlSt=mysql_query("select st.id as StateId,st.state_name as StateName from core_states st left JOIN hrm_employee_general g ON st.id=g.CostCenter group by state_name ASC",$con); while($resSt=mysql_fetch_assoc($sqlSt)){ 
 $sqlTotE=mysql_query("select GeneralId from hrm_employee_general g left JOIN core_states st on st.id=g.CostCenter INNER JOIN hrm_employee e ON g.EmployeeID=e.EmployeeID where st.StateId=".$resSt['StateId']." AND e.EmpStatus='A' AND e.CompanyId=".$_REQUEST['c']." AND g.DepartmentId=".$res['DepartmentId']." AND g.DateJoining<='".$TD."-03-31'",$con); $rowTotE=mysql_num_rows($sqlTotE);
 $sqlTotG=mysql_query("select SUM(Tot_GrossMonth) as Gross from hrm_employee_ctc ctc INNER JOIN hrm_employee_general g ON ctc.EmployeeID=g.EmployeeID left JOIN core_states st on st.id=g.CostCenter INNER JOIN hrm_employee e ON g.EmployeeID=e.EmployeeID where ctc.Status='A' AND st.id=".$resSt['StateId']." AND e.EmpStatus='A' AND e.CompanyId=".$_REQUEST['c']." AND g.DepartmentId=".$res['DepartmentId']." AND g.DateJoining<='".$TD."-03-31'",$con); $resTotG=mysql_fetch_assoc($sqlTotG);
$csv_output .= '"'.str_replace('"', '""', $rowTotE).'",';
$csv_output .= '"'.str_replace('"', '""', intval($resTotG['Gross'])).'",';
}
$sqlTotEE=mysql_query("select GeneralId from hrm_employee_general g left JOIN core_states st on st.id=g.CostCenter INNER JOIN hrm_employee e ON g.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND g.DepartmentId=".$res['DepartmentId']." AND g.DateJoining<='".$TD."-03-31'",$con); $rowTotEE=mysql_num_rows($sqlTotEE);
 $sqlTotGG=mysql_query("select SUM(Tot_GrossMonth) as Gross from hrm_employee_ctc ctc INNER JOIN hrm_employee_general g ON ctc.EmployeeID=g.EmployeeID left JOIN core_states st on st.id=g.CostCenter INNER JOIN hrm_employee e ON g.EmployeeID=e.EmployeeID where ctc.Status='A' AND e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND g.DepartmentId=".$res['DepartmentId']." AND g.DateJoining<='".$TD."-03-31'",$con); 
 $resTotGG=mysql_fetch_assoc($sqlTotGG);

$csv_output .= '"'.str_replace('"', '""', $rowTotEE).'",';
$csv_output .= '"'.str_replace('"', '""', intval($resTotGG['Gross'])).'",';
$csv_output .= "\n";
$SNo++; }

$csv_output .= '"'.str_replace('"', '""', '').'",'; 
$csv_output .= '"'.str_replace('"', '""', 'TOTAL').'",';
$sqlSt=mysql_query("select st.id as StateId,st.state_name as StateName from core_states st left JOIN hrm_employee_general g ON st.id=g.CostCenter group by state_name ASC",$con); while($resSt=mysql_fetch_assoc($sqlSt)){ 
 $sqlTotEt=mysql_query("select GeneralId from hrm_employee_general g left JOIN core_states st on st.id=g.CostCenter INNER JOIN hrm_employee e ON g.EmployeeID=e.EmployeeID where st.id=".$resSt['StateId']." AND e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND g.DateJoining<='".$TD."-03-31'",$con); $rowTotEt=mysql_num_rows($sqlTotEt);
 $sqlTotGt=mysql_query("select SUM(Tot_GrossMonth) as Gross from hrm_employee_ctc ctc INNER JOIN hrm_employee_general g ON ctc.EmployeeID=g.EmployeeID left JOIN core_states st on st.id=g.CostCenter INNER JOIN hrm_employee e ON g.EmployeeID=e.EmployeeID where ctc.Status='A' AND st.id=".$resSt['StateId']." AND e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND g.DateJoining<='".$TD."-03-31'",$con); 
 $resTotGt=mysql_fetch_assoc($sqlTotGt);
$csv_output .= '"'.str_replace('"', '""', $rowTotEt).'",'; 
$csv_output .= '"'.str_replace('"', '""', intval($resTotGt['Gross'])).'",'; 
}
$sqlTotEEt=mysql_query("select GeneralId from hrm_employee_general g left JOIN core_states st on st.id=g.CostCenter INNER JOIN hrm_employee e ON g.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND g.DateJoining<='".$TD."-03-31'",$con); $rowTotEEt=mysql_num_rows($sqlTotEEt);
 $sqlTotGGt=mysql_query("select SUM(Tot_GrossMonth) as Gross from hrm_employee_ctc ctc INNER JOIN hrm_employee_general g ON ctc.EmployeeID=g.EmployeeID left JOIN core_states st on st.id=g.CostCenter INNER JOIN hrm_employee e ON g.EmployeeID=e.EmployeeID where ctc.Status='A' AND e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND g.DateJoining<='".$TD."-03-31'",$con); $resTotGGt=mysql_fetch_assoc($sqlTotGGt);
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