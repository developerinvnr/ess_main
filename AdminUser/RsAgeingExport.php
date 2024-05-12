<?php 
require_once('config/config.php');
if($_REQUEST['y']!=0){ $sY=mysql_query("select * from hrm_year where YearId=".$_REQUEST['y']."", $con); $rY=mysql_fetch_assoc($sY);  
$FD=date("Y",strtotime($rY['FromDate'])); $TD=date("Y",strtotime($rY['ToDate'])); $PRD=$FD.'-'.$TD; } else {$PRD='ALL'; }
/*************************************************************************************************************/

if($_REQUEST['action']='RsAgeingExport') 
{ 
 
$csv_output .= '"DEPARTMENT",';
$csv_output .= '"<3 Month",'; 
$csv_output .= '">3M < 1Y",';
$csv_output .= '"1-2 Year",';
$csv_output .= '"2-3 Year",';
$csv_output .= '"3-4 Year",';
$csv_output .= '"4-5 Year",';
$csv_output .= '"5-6 Year",';
$csv_output .= '"6-7 Year",';
$csv_output .= '">7 Year",';
$csv_output .= '"TOTAL",';
$csv_output .= '"%",';
$csv_output .= "\n";		

$sql=mysql_query("select DepartmentId,DepartmentName from hrm_department where DeptStatus='A' AND CompanyId=".$_REQUEST['c']." order by DepartmentName ASC",$con); 
$SNo=1; while($res=mysql_fetch_array($sql)){ $Today=date("Y-m-d");
	  
$csv_output .= '"'.str_replace('"', '""', $res['DepartmentName']).'",';
$BeFore3M=date("Y-m-d",strtotime('-3 month')); $sql1=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$_REQUEST['c']." AND hrm_employee_general.DepartmentId=".$res['DepartmentId']." AND hrm_employee_general.DateJoining>='".$BeFore3M."' ",$con); $row1=mysql_num_rows($sql1);
$csv_output .= '"'.str_replace('"', '""', $row1).'",';
$BeFore1Y=date("Y-m-d",strtotime('-1 year')); $sql2=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$_REQUEST['c']." AND hrm_employee_general.DepartmentId=".$res['DepartmentId']." AND hrm_employee_general.DateJoining>='".$BeFore1Y."' AND hrm_employee_general.DateJoining<'".$BeFore3M."' ",$con); $row2=mysql_num_rows($sql2);
$csv_output .= '"'.str_replace('"', '""', $row2).'",';
$BeFore2Y=date("Y-m-d",strtotime('-2 year')); $sql3=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$_REQUEST['c']." AND hrm_employee_general.DepartmentId=".$res['DepartmentId']." AND hrm_employee_general.DateJoining>='".$BeFore2Y."' AND hrm_employee_general.DateJoining<'".$BeFore1Y."' ",$con); $row3=mysql_num_rows($sql3);
$csv_output .= '"'.str_replace('"', '""', $row3).'",';
$BeFore3Y=date("Y-m-d",strtotime('-3 year'));; $sql4=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$_REQUEST['c']." AND hrm_employee_general.DepartmentId=".$res['DepartmentId']." AND hrm_employee_general.DateJoining>='".$BeFore3Y."' AND hrm_employee_general.DateJoining<'".$BeFore2Y."' ",$con); $row4=mysql_num_rows($sql4);
$csv_output .= '"'.str_replace('"', '""', $row4).'",';
$BeFore4Y=date("Y-m-d",strtotime('-4 year')); $sql5=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$_REQUEST['c']." AND hrm_employee_general.DepartmentId=".$res['DepartmentId']." AND hrm_employee_general.DateJoining>='".$BeFore4Y."' AND hrm_employee_general.DateJoining<'".$BeFore3Y."' ",$con); $row5=mysql_num_rows($sql5);
$csv_output .= '"'.str_replace('"', '""', $row5).'",';
$BeFore5Y=date("Y-m-d",strtotime('-5 year'));  $sql6=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$_REQUEST['c']." AND hrm_employee_general.DepartmentId=".$res['DepartmentId']." AND hrm_employee_general.DateJoining>='".$BeFore5Y."' AND hrm_employee_general.DateJoining<'".$BeFore4Y."' ",$con); $row6=mysql_num_rows($sql6);
$csv_output .= '"'.str_replace('"', '""', $row6).'",';
$BeFore6Y=date("Y-m-d",strtotime('-6 year')); $sql7=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$_REQUEST['c']." AND hrm_employee_general.DepartmentId=".$res['DepartmentId']." AND hrm_employee_general.DateJoining>='".$BeFore6Y."' AND hrm_employee_general.DateJoining<'".$BeFore5Y."' ",$con); $row7=mysql_num_rows($sql7);
$csv_output .= '"'.str_replace('"', '""', $row7).'",';
$BeFore7Y=date("Y-m-d",strtotime('-7 year')); $sql8=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$_REQUEST['c']." AND hrm_employee_general.DepartmentId=".$res['DepartmentId']." AND hrm_employee_general.DateJoining>='".$BeFore7Y."' AND hrm_employee_general.DateJoining<'".$BeFore6Y."' ",$con); $row8=mysql_num_rows($sql8);
$csv_output .= '"'.str_replace('"', '""', $row8).'",';
$sql9=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$_REQUEST['c']." AND hrm_employee_general.DepartmentId=".$res['DepartmentId']." AND hrm_employee_general.DateJoining<'".$BeFore7Y."'",$con); $row9=mysql_num_rows($sql9);
$csv_output .= '"'.str_replace('"', '""', $row9).'",';
$sql10=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$_REQUEST['c']." AND hrm_employee_general.DepartmentId=".$res['DepartmentId'],$con); $row10=mysql_num_rows($sql10);
$csv_output .= '"'.str_replace('"', '""', $row10).'",';
$sqlt=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$_REQUEST['c']."",$con); $rowt=mysql_num_rows($sqlt);
$TotPer=round(($row10*100)/$rowt,2);
$csv_output .= '"'.str_replace('"', '""', $TotPer).'",';
$csv_output .= "\n";
$SNo++; }

$csv_output .= '"'.str_replace('"', '""', 'TOTAL').'",';
$BeFore3M=date("Y-m-d",strtotime('-3 month')); $sql1t=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$_REQUEST['c']." AND hrm_employee_general.DateJoining>='".$BeFore3M."' ",$con); $row1t=mysql_num_rows($sql1t);
$csv_output .= '"'.str_replace('"', '""', $row1t).'",';
$BeFore1Y=date("Y-m-d",strtotime('-1 year')); $sql2t=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$_REQUEST['c']." AND hrm_employee_general.DateJoining>='".$BeFore1Y."' AND hrm_employee_general.DateJoining<'".$BeFore3M."' ",$con); $row2t=mysql_num_rows($sql2t);
$csv_output .= '"'.str_replace('"', '""', $row2t).'",';
$BeFore2Y=date("Y-m-d",strtotime('-2 year')); $sql3t=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$_REQUEST['c']." AND hrm_employee_general.DateJoining>='".$BeFore2Y."' AND hrm_employee_general.DateJoining<'".$BeFore1Y."' ",$con); $row3t=mysql_num_rows($sql3t);
$csv_output .= '"'.str_replace('"', '""', $row3t).'",';
$BeFore3Y=date("Y-m-d",strtotime('-3 year'));; $sql4t=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$_REQUEST['c']." AND hrm_employee_general.DateJoining>='".$BeFore3Y."' AND hrm_employee_general.DateJoining<'".$BeFore2Y."' ",$con); $row4t=mysql_num_rows($sql4t);
$csv_output .= '"'.str_replace('"', '""', $row4).'",';
$BeFore4Y=date("Y-m-d",strtotime('-4 year')); $sql5t=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$_REQUEST['c']." AND hrm_employee_general.DateJoining>='".$BeFore4Y."' AND hrm_employee_general.DateJoining<'".$BeFore3Y."' ",$con); $row5t=mysql_num_rows($sql5t);
$csv_output .= '"'.str_replace('"', '""', $row5t).'",';
$BeFore5Y=date("Y-m-d",strtotime('-5 year'));  $sql6t=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$_REQUEST['c']." AND hrm_employee_general.DateJoining>='".$BeFore5Y."' AND hrm_employee_general.DateJoining<'".$BeFore4Y."' ",$con); $row6t=mysql_num_rows($sql6t);
$csv_output .= '"'.str_replace('"', '""', $row6).'",';
$BeFore6Y=date("Y-m-d",strtotime('-6 year')); $sql7t=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$_REQUEST['c']." AND hrm_employee_general.DateJoining>='".$BeFore6Y."' AND hrm_employee_general.DateJoining<'".$BeFore5Y."' ",$con); $row7t=mysql_num_rows($sql7t);
$csv_output .= '"'.str_replace('"', '""', $row7t).'",';
$BeFore7Y=date("Y-m-d",strtotime('-7 year')); $sql8t=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$_REQUEST['c']." AND hrm_employee_general.DateJoining>='".$BeFore7Y."' AND hrm_employee_general.DateJoining<'".$BeFore6Y."' ",$con); $row8t=mysql_num_rows($sql8t);
$csv_output .= '"'.str_replace('"', '""', $row8t).'",';
$sql9t=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$_REQUEST['c']." AND hrm_employee_general.DateJoining<'".$BeFore7Y."'",$con); $row9t=mysql_num_rows($sql9t);
$csv_output .= '"'.str_replace('"', '""', $row9t).'",';
$sql10t=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$_REQUEST['c'],$con); $row10t=mysql_num_rows($sql10t);
$csv_output .= '"'.str_replace('"', '""', $row10t).'",';
$csv_output .= "\n";


$sql10t=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$_REQUEST['c']."",$con); $row10t=mysql_num_rows($sql10t);
$csv_output .= '"'.str_replace('"', '""', '%').'",';
$BeFore3M=date("Y-m-d",strtotime('-3 month')); $sql1t=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$_REQUEST['c']." AND hrm_employee_general.DateJoining>='".$BeFore3M."' ",$con); $row1t=mysql_num_rows($sql1t);
$csv_output .= '"'.str_replace('"', '""', round(($row1t*100)/$row10t,2)).'",';
$BeFore1Y=date("Y-m-d",strtotime('-1 year')); $sql2t=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$_REQUEST['c']." AND hrm_employee_general.DateJoining>='".$BeFore1Y."' AND hrm_employee_general.DateJoining<'".$BeFore3M."' ",$con); $row2t=mysql_num_rows($sql2t);
$csv_output .= '"'.str_replace('"', '""', round(($row2t*100)/$row10t,2)).'",';
$BeFore2Y=date("Y-m-d",strtotime('-2 year')); $sql3t=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$_REQUEST['c']." AND hrm_employee_general.DateJoining>='".$BeFore2Y."' AND hrm_employee_general.DateJoining<'".$BeFore1Y."' ",$con); $row3t=mysql_num_rows($sql3t);
$csv_output .= '"'.str_replace('"', '""', round(($row3t*100)/$row10t,2)).'",';
$BeFore3Y=date("Y-m-d",strtotime('-3 year'));; $sql4t=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$_REQUEST['c']." AND hrm_employee_general.DateJoining>='".$BeFore3Y."' AND hrm_employee_general.DateJoining<'".$BeFore2Y."' ",$con); $row4t=mysql_num_rows($sql4t);
$csv_output .= '"'.str_replace('"', '""', round(($row4t*100)/$row10t,2)).'",';
$BeFore4Y=date("Y-m-d",strtotime('-4 year')); $sql5t=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$_REQUEST['c']." AND hrm_employee_general.DateJoining>='".$BeFore4Y."' AND hrm_employee_general.DateJoining<'".$BeFore3Y."' ",$con); $row5t=mysql_num_rows($sql5t);
$csv_output .= '"'.str_replace('"', '""', round(($row5t*100)/$row10t,2)).'",';
$BeFore5Y=date("Y-m-d",strtotime('-5 year'));  $sql6t=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$_REQUEST['c']." AND hrm_employee_general.DateJoining>='".$BeFore5Y."' AND hrm_employee_general.DateJoining<'".$BeFore4Y."' ",$con); $row6t=mysql_num_rows($sql6t);
$csv_output .= '"'.str_replace('"', '""', round(($row6t*100)/$row10t,2)).'",';
$BeFore6Y=date("Y-m-d",strtotime('-6 year')); $sql7t=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$_REQUEST['c']." AND hrm_employee_general.DateJoining>='".$BeFore6Y."' AND hrm_employee_general.DateJoining<'".$BeFore5Y."' ",$con); $row7t=mysql_num_rows($sql7t);
$csv_output .= '"'.str_replace('"', '""', round(($row7t*100)/$row10t,2)).'",';
$BeFore7Y=date("Y-m-d",strtotime('-7 year')); $sql8t=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$_REQUEST['c']." AND hrm_employee_general.DateJoining>='".$BeFore7Y."' AND hrm_employee_general.DateJoining<'".$BeFore6Y."' ",$con); $row8t=mysql_num_rows($sql8t);
$csv_output .= '"'.str_replace('"', '""', round(($row8t*100)/$row10t,2)).'",';
$sql9t=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$_REQUEST['c']." AND hrm_employee_general.DateJoining<'".$BeFore7Y."'",$con); $row9t=mysql_num_rows($sql9t);
$csv_output .= '"'.str_replace('"', '""', round(($row9t*100)/$row10t,2)).'",';
$csv_output .= "\n";




# Close the MySql connection
mysql_close($con);
# Set the headers so the file downloads
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Content-Length: " . strlen($csv_output));
header("Content-type: text/x-csv");
header("Content-Disposition: attachment; filename=Ageing_Experience_Slab.csv");
echo $csv_output;
exit; 
}
?>