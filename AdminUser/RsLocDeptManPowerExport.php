<?php 
require_once('config/config.php');
if($_REQUEST['y']!=0){ $sY=mysql_query("select * from hrm_year where YearId=".$_REQUEST['y']."", $con); $rY=mysql_fetch_assoc($sY);  
$FD=date("Y",strtotime($rY['FromDate'])); $TD=date("Y",strtotime($rY['ToDate'])); $PRD=$FD.'-'.$TD; } else {$PRD='ALL'; }
/*************************************************************************************************************/

if($_REQUEST['action']='RsCopensationExport') 
{ 
$csv_output .= '"SN",';
$csv_output .= '"STATE",'; 
$csv_output .= '"HQ",';
$sqlDept=mysql_query("select * from core_departments where is_active=1 order by department_name",$con); while($resDept=mysql_fetch_assoc($sqlDept)){ 
$csv_output .= $resDept['department_code'].',';
}
$csv_output .= '"Total",';
$csv_output .= "\n";		

 $sql=mysql_query("select HqId,HqqName,CostCenter as StateId, state_name as StateName,state_name as StateCode from hrm_employee_general g left JOIN core_states st ON g.CostCenter=st.id group by state_name order by state_name ASC, HqqName ASC",$con); 
 $SNo=1; while($res=mysql_fetch_assoc($sql)){ 

$csv_output .= '"'.str_replace('"', '""', $SNo).'",'; 
$csv_output .= '"'.str_replace('"', '""', $res['StateCode']).'",';
$csv_output .= '"'.str_replace('"', '""', strtoupper($res['HqName'])).'",';
$sqlDept=mysql_query("select * from core_departments where is_active=1 order by department_name",$con); while($resDept=mysql_fetch_assoc($sqlDept)){ 
$sqlEmp=mysql_query("select GeneralId from hrm_employee_general g INNER JOIN hrm_employee e ON g.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$_REQUEST['c']." AND HqId=".$res['HqId']." AND DepartmentId=".$resDept['id'],$con); $rowEmp=mysql_num_rows($sqlEmp);
$csv_output .= '"'.str_replace('"', '""', $rowEmp).'",';
}
$sqlEmpHq=mysql_query("select GeneralId from hrm_employee_general g INNER JOIN hrm_employee e ON g.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$_REQUEST['c']." AND HqId=".$res['HqId'],$con); $rowEmpHq=mysql_num_rows($sqlEmpHq);
$csv_output .= '"'.str_replace('"', '""', $rowEmpHq).'",';
$csv_output .= "\n";
$SNo++; }

$csv_output .= '"'.str_replace('"', '""', '').'",';
$csv_output .= '"'.str_replace('"', '""', '').'",'; 
$csv_output .= '"'.str_replace('"', '""', 'TOTAL').'",';
$sqlDept=mysql_query("select * from core_departments where is_active=1 order by department_name",$con); while($resDept=mysql_fetch_assoc($sqlDept)){ 
$sqlEmpt=mysql_query("select GeneralId from hrm_employee_general g INNER JOIN hrm_employee e ON g.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$_REQUEST['c']." AND DepartmentId=".$resDept['id'],$con); $rowEmpt=mysql_num_rows($sqlEmpt);
$csv_output .= '"'.str_replace('"', '""', $rowEmpt).'",'; 
}
$sqlEmpHqt=mysql_query("select GeneralId from hrm_employee_general g INNER JOIN hrm_employee e ON g.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$_REQUEST['c'],$con); $rowEmpHqt=mysql_num_rows($sqlEmpHqt);
$csv_output .= '"'.str_replace('"', '""', $rowEmpHqt).'",'; 
$csv_output .= "\n";

# Close the MySql connection
mysql_close($con);
# Set the headers so the file downloads
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Content-Length: " . strlen($csv_output));
header("Content-type: text/x-csv");
header("Content-Disposition: attachment; filename=Manpower_Loc_&_Dept_.csv");
echo $csv_output;
exit; 
}
?>