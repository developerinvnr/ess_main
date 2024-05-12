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
$sqlDept=mysql_query("select DepartmentId,DepartmentCode from hrm_department where DepartmentName!='MANAGEMENT' AND DeptStatus='A' AND CompanyId=".$_REQUEST['c']." order by DepartmentName ASC",$con); while($resDept=mysql_fetch_assoc($sqlDept)){ 
$csv_output .= $resDept['DepartmentCode'].',';
}
$csv_output .= '"Total",';
$csv_output .= "\n";		

 $sql=mysql_query("select hrm_headquater.HqId,HqName,hrm_headquater.StateId,StateName,StateCode from hrm_headquater INNER JOIN hrm_state ON hrm_headquater.StateId=hrm_state.StateId INNER JOIN hrm_employee_general ON hrm_headquater.HqId=hrm_employee_general.HqId group by HqName order by StateName ASC, HqName ASC",$con); 
 $SNo=1; while($res=mysql_fetch_assoc($sql)){ 

$csv_output .= '"'.str_replace('"', '""', $SNo).'",'; 
$csv_output .= '"'.str_replace('"', '""', $res['StateCode']).'",';
$csv_output .= '"'.str_replace('"', '""', strtoupper($res['HqName'])).'",';
$sqlDept=mysql_query("select DepartmentId,DepartmentCode from hrm_department where DepartmentName!='MANAGEMENT' AND DeptStatus='A' AND CompanyId=".$_REQUEST['c']." order by DepartmentName ASC",$con); while($resDept=mysql_fetch_assoc($sqlDept)){ 
$sqlEmp=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$_REQUEST['c']." AND HqId=".$res['HqId']." AND DepartmentId=".$resDept['DepartmentId'],$con); $rowEmp=mysql_num_rows($sqlEmp);
$csv_output .= '"'.str_replace('"', '""', $rowEmp).'",';
}
$sqlEmpHq=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$_REQUEST['c']." AND HqId=".$res['HqId'],$con); $rowEmpHq=mysql_num_rows($sqlEmpHq);
$csv_output .= '"'.str_replace('"', '""', $rowEmpHq).'",';
$csv_output .= "\n";
$SNo++; }

$csv_output .= '"'.str_replace('"', '""', '').'",';
$csv_output .= '"'.str_replace('"', '""', '').'",'; 
$csv_output .= '"'.str_replace('"', '""', 'TOTAL').'",';
$sqlDept=mysql_query("select DepartmentId,DepartmentCode from hrm_department where DepartmentName!='MANAGEMENT' AND DeptStatus='A' AND CompanyId=".$_REQUEST['c']." order by DepartmentName ASC",$con); while($resDept=mysql_fetch_assoc($sqlDept)){ 
$sqlEmpt=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$_REQUEST['c']." AND DepartmentId=".$resDept['DepartmentId'],$con); $rowEmpt=mysql_num_rows($sqlEmpt);
$csv_output .= '"'.str_replace('"', '""', $rowEmpt).'",'; 
}
$sqlEmpHqt=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$_REQUEST['c'],$con); $rowEmpHqt=mysql_num_rows($sqlEmpHqt);
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