<?php 
require_once('config/config.php');
if($_REQUEST['y']!=0){ $sY=mysql_query("select * from hrm_year where YearId=".$_REQUEST['y']."", $con); $rY=mysql_fetch_assoc($sY);  
$FD=date("Y",strtotime($rY['FromDate'])); $TD=date("Y",strtotime($rY['ToDate'])); $PRD=$FD.'-'.$TD; } else {$PRD='ALL'; }
/*************************************************************************************************************/

if($_REQUEST['action']='RsManPowerExport') 
{ 
 
$csv_output .= '"DEPARTMENT",';
$csv_output .= '"18-20 Yrs",'; 
$csv_output .= '"20-25 Yrs",'; 
$csv_output .= '"25-30 Yrs",'; 
$csv_output .= '"30-35 Yrs",'; 
$csv_output .= '"35-40 Yrs",'; 
$csv_output .= '"40-45 Yrs",'; 
$csv_output .= '"45-50 Yrs",'; 
$csv_output .= '"50-55 Yrs",'; 
$csv_output .= '"55-60 Yrs",'; 
$csv_output .= '">60 Yrs",'; 
$csv_output .= '"TOTAL",';
$csv_output .= '"%",';
$csv_output .= "\n";		

$today=date("Y-m-d"); $timestamp = strtotime($today); 
$date=date_create($today); $date1=date_create($today); $date2=date_create($today); $date3=date_create($today); $date4=date_create($today);
$date5=date_create($today); $date6=date_create($today); $date7=date_create($today); $date8=date_create($today); $date9=date_create($today);
$d18=date_add($date, date_interval_create_from_date_string('-18 years')); $y18=date_format($d18, 'Y-m-d'); 
$d20=date_add($date1, date_interval_create_from_date_string('-20 years')); $y20=date_format($d20, 'Y-m-d'); 
$d25=date_add($date2, date_interval_create_from_date_string('-25 years')); $y25=date_format($d25, 'Y-m-d'); 
$d30=date_add($date3, date_interval_create_from_date_string('-30 years')); $y30=date_format($d30, 'Y-m-d'); 
$d35=date_add($date4, date_interval_create_from_date_string('-35 years')); $y35=date_format($d35, 'Y-m-d'); 
$d40=date_add($date5, date_interval_create_from_date_string('-40 years')); $y40=date_format($d40, 'Y-m-d'); 
$d45=date_add($date6, date_interval_create_from_date_string('-45 years')); $y45=date_format($d45, 'Y-m-d'); 
$d50=date_add($date7, date_interval_create_from_date_string('-50 years')); $y50=date_format($d50, 'Y-m-d'); 
$d55=date_add($date8, date_interval_create_from_date_string('-55 years')); $y55=date_format($d55, 'Y-m-d'); 
$d60=date_add($date9, date_interval_create_from_date_string('-60 years')); $y60=date_format($d60, 'Y-m-d'); 
$sql=mysql_query("select DepartmentId,DepartmentName from hrm_department where DeptStatus='A' AND CompanyId=".$_REQUEST['c']." order by DepartmentName ASC",$con); 
$SNo=1; while($res=mysql_fetch_array($sql)){ $Today=date("Y-m-d");
	  
$csv_output .= '"'.str_replace('"', '""', $res['DepartmentName']).'",';
$sql1=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$_REQUEST['c']." AND hrm_employee_general.DepartmentId=".$res['DepartmentId']." AND hrm_employee_general.DOB>='".$y20."' AND hrm_employee_general.DOB<'".$y18."' ",$con); $row1=mysql_num_rows($sql1); 
$csv_output .= '"'.str_replace('"', '""', $row1).'",';
$sql2=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$_REQUEST['c']." AND hrm_employee_general.DepartmentId=".$res['DepartmentId']." AND hrm_employee_general.DOB>='".$y25."' AND hrm_employee_general.DOB<'".$y20."' ",$con); $row2=mysql_num_rows($sql2); 
$csv_output .= '"'.str_replace('"', '""', $row2).'",';
$sql3=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$_REQUEST['c']." AND hrm_employee_general.DepartmentId=".$res['DepartmentId']." AND hrm_employee_general.DOB>='".$y30."' AND hrm_employee_general.DOB<'".$y25."' ",$con); $row3=mysql_num_rows($sql3); 
$csv_output .= '"'.str_replace('"', '""', $row3).'",';
$sql4=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$_REQUEST['c']." AND hrm_employee_general.DepartmentId=".$res['DepartmentId']." AND hrm_employee_general.DOB>='".$y35."' AND hrm_employee_general.DOB<'".$y30."' ",$con); $row4=mysql_num_rows($sql4);
$csv_output .= '"'.str_replace('"', '""', $row4).'",'; 
$sql5=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$_REQUEST['c']." AND hrm_employee_general.DepartmentId=".$res['DepartmentId']." AND hrm_employee_general.DOB>='".$y40."' AND hrm_employee_general.DOB<'".$y35."' ",$con); $row5=mysql_num_rows($sql5); 
$csv_output .= '"'.str_replace('"', '""', $row5).'",';
$sql6=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$_REQUEST['c']." AND hrm_employee_general.DepartmentId=".$res['DepartmentId']." AND hrm_employee_general.DOB>='".$y45."' AND hrm_employee_general.DOB<'".$y40."' ",$con); $row6=mysql_num_rows($sql6); 
$csv_output .= '"'.str_replace('"', '""', $row6).'",';
$sql7=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$_REQUEST['c']." AND hrm_employee_general.DepartmentId=".$res['DepartmentId']." AND hrm_employee_general.DOB>='".$y50."' AND hrm_employee_general.DOB<'".$y45."' ",$con); $row7=mysql_num_rows($sql7); 
$csv_output .= '"'.str_replace('"', '""', $row7).'",';
$sql8=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$_REQUEST['c']." AND hrm_employee_general.DepartmentId=".$res['DepartmentId']." AND hrm_employee_general.DOB>='".$y55."' AND hrm_employee_general.DOB<'".$y50."' ",$con); $row8=mysql_num_rows($sql8); 
$csv_output .= '"'.str_replace('"', '""', $row8).'",';
$sql9=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$_REQUEST['c']." AND hrm_employee_general.DepartmentId=".$res['DepartmentId']." AND hrm_employee_general.DOB>='".$y60."' AND hrm_employee_general.DOB<'".$y55."'",$con); $row9=mysql_num_rows($sql9); 
$csv_output .= '"'.str_replace('"', '""', $row9).'",';
$sql10=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$_REQUEST['c']." AND hrm_employee_general.DepartmentId=".$res['DepartmentId']." AND hrm_employee_general.DOB<'".$y60."'",$con); 
$row10=mysql_num_rows($sql10); 
$csv_output .= '"'.str_replace('"', '""', $row10).'",';
$sql11=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$_REQUEST['c']." AND hrm_employee_general.DepartmentId=".$res['DepartmentId'],$con); $row11=mysql_num_rows($sql11); 
$csv_output .= '"'.str_replace('"', '""', $row11).'",';
$sqlt=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$_REQUEST['c']."",$con); $rowt=mysql_num_rows($sqlt);
$TotPer=round(($row11*100)/$rowt,2);
$csv_output .= '"'.str_replace('"', '""', $TotPer).'",';
$csv_output .= "\n";
$SNo++; }
 
 
$csv_output .= '"'.str_replace('"', '""', 'TOTAL').'",';
$sql1t=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$_REQUEST['c']." AND hrm_employee_general.DOB>='".$y20."' AND hrm_employee_general.DOB<'".$y18."' ",$con); $row1t=mysql_num_rows($sql1t); 
$csv_output .= '"'.str_replace('"', '""', $row1t).'",';
$sql2t=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$_REQUEST['c']." AND hrm_employee_general.DOB>='".$y25."' AND hrm_employee_general.DOB<'".$y20."' ",$con); $row2t=mysql_num_rows($sql2t); 
$csv_output .= '"'.str_replace('"', '""', $row2t).'",';
$sql3t=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$_REQUEST['c']." AND hrm_employee_general.DOB>='".$y30."' AND hrm_employee_general.DOB<'".$y25."' ",$con); $row3t=mysql_num_rows($sql3t); 
$csv_output .= '"'.str_replace('"', '""', $row3t).'",';
$sql4t=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$_REQUEST['c']." AND hrm_employee_general.DOB>='".$y35."' AND hrm_employee_general.DOB<'".$y30."' ",$con); $row4t=mysql_num_rows($sql4t);
$csv_output .= '"'.str_replace('"', '""', $row4t).'",'; 
$sql5t=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$_REQUEST['c']." AND hrm_employee_general.DOB>='".$y40."' AND hrm_employee_general.DOB<'".$y35."' ",$con); $row5t=mysql_num_rows($sql5t); 
$csv_output .= '"'.str_replace('"', '""', $row5t).'",';
$sql6t=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$_REQUEST['c']." AND hrm_employee_general.DOB>='".$y45."' AND hrm_employee_general.DOB<'".$y40."' ",$con); $row6t=mysql_num_rows($sql6t); 
$csv_output .= '"'.str_replace('"', '""', $row6t).'",';
$sql7t=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$_REQUEST['c']." AND hrm_employee_general.DOB>='".$y50."' AND hrm_employee_general.DOB<'".$y45."' ",$con); $row7t=mysql_num_rows($sql7t); 
$csv_output .= '"'.str_replace('"', '""', $row7t).'",';
$sql8t=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$_REQUEST['c']." AND hrm_employee_general.DOB>='".$y55."' AND hrm_employee_general.DOB<'".$y50."' ",$con); $row8t=mysql_num_rows($sql8t); 
$csv_output .= '"'.str_replace('"', '""', $row8t).'",';
$sql9t=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$_REQUEST['c']." AND hrm_employee_general.DOB>='".$y60."' AND hrm_employee_general.DOB<'".$y55."'",$con); $row9t=mysql_num_rows($sql9t); 
$csv_output .= '"'.str_replace('"', '""', $row9t).'",';
$sql10t=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$_REQUEST['c']." AND hrm_employee_general.DOB<'".$y60."'",$con); 
$row10t=mysql_num_rows($sql10); 
$csv_output .= '"'.str_replace('"', '""', $row10t).'",';
$sql11t=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$_REQUEST['c'],$con); $row11t=mysql_num_rows($sql11t); 
$csv_output .= '"'.str_replace('"', '""', $row11t).'",';
$csv_output .= "\n";


$sql11t=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$_REQUEST['c']."",$con); $row11t=mysql_num_rows($sql11t);
$csv_output .= '"'.str_replace('"', '""', '%').'",';
$sql1t=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$_REQUEST['c']." AND hrm_employee_general.DOB>='".$y20."' AND hrm_employee_general.DOB<'".$y18."' ",$con); $row1t=mysql_num_rows($sql1t); 
$csv_output .= '"'.str_replace('"', '""', round(($row1t*100)/$row11t,2)).'",';
$sql2t=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$_REQUEST['c']." AND hrm_employee_general.DOB>='".$y25."' AND hrm_employee_general.DOB<'".$y20."' ",$con); $row2t=mysql_num_rows($sql2t); 
$csv_output .= '"'.str_replace('"', '""', round(($row2t*100)/$row11t,2)).'",';
$sql3t=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$_REQUEST['c']." AND hrm_employee_general.DOB>='".$y30."' AND hrm_employee_general.DOB<'".$y25."' ",$con); $row3t=mysql_num_rows($sql3t); 
$csv_output .= '"'.str_replace('"', '""', round(($row3t*100)/$row11t,2)).'",';
$sql4t=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$_REQUEST['c']." AND hrm_employee_general.DOB>='".$y35."' AND hrm_employee_general.DOB<'".$y30."' ",$con); $row4t=mysql_num_rows($sql4t);
$csv_output .= '"'.str_replace('"', '""', round(($row4t*100)/$row11t,2)).'",'; 
$sql5t=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$_REQUEST['c']." AND hrm_employee_general.DOB>='".$y40."' AND hrm_employee_general.DOB<'".$y35."' ",$con); $row5t=mysql_num_rows($sql5t); 
$csv_output .= '"'.str_replace('"', '""', round(($row5t*100)/$row11t,2)).'",';
$sql6t=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$_REQUEST['c']." AND hrm_employee_general.DOB>='".$y45."' AND hrm_employee_general.DOB<'".$y40."' ",$con); $row6t=mysql_num_rows($sql6t); 
$csv_output .= '"'.str_replace('"', '""', round(($row6t*100)/$row11t,2)).'",';
$sql7t=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$_REQUEST['c']." AND hrm_employee_general.DOB>='".$y50."' AND hrm_employee_general.DOB<'".$y45."' ",$con); $row7t=mysql_num_rows($sql7t); 
$csv_output .= '"'.str_replace('"', '""', round(($row7t*100)/$row11t,2)).'",';
$sql8t=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$_REQUEST['c']." AND hrm_employee_general.DOB>='".$y55."' AND hrm_employee_general.DOB<'".$y50."' ",$con); $row8t=mysql_num_rows($sql8t); 
$csv_output .= '"'.str_replace('"', '""', round(($row8t*100)/$row11t,2)).'",';
$sql9t=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$_REQUEST['c']." AND hrm_employee_general.DOB>='".$y60."' AND hrm_employee_general.DOB<'".$y55."'",$con); $row9t=mysql_num_rows($sql9t); 
$csv_output .= '"'.str_replace('"', '""', round(($row9t*100)/$row11t,2)).'",';
$sql10t=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$_REQUEST['c']." AND hrm_employee_general.DOB<'".$y60."'",$con); 
$row10t=mysql_num_rows($sql10); 
$csv_output .= '"'.str_replace('"', '""', round(($row10t*100)/$row11t,2)).'",';
$csv_output .= "\n";




# Close the MySql connection
mysql_close($con);
# Set the headers so the file downloads
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Content-Length: " . strlen($csv_output));
header("Content-type: text/x-csv");
header("Content-Disposition: attachment; filename=Ageing_ManPower_Slab.csv");
echo $csv_output;
exit; 
}
?>