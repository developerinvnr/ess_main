<?php
require_once('config/config.php');
$sY=mysql_query("select * from hrm_year where YearId=".$_REQUEST['Y']."", $con); $rY=mysql_fetch_assoc($sY); 
$FD=date("Y",strtotime($rY['FromDate'])); $TD=date("Y",strtotime($rY['ToDate'])); $MY=$FD-1;  $PRD=$MY.'-'.$FD;
/*************************************************************************************************************/
if($_REQUEST['action']='ExportKRA') 
{
if($_REQUEST['value']=='All') {$DeptV='All_Employee';}
  else{ $sqlDeptV=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$_REQUEST['value'], $con); $resDeptV=mysql_fetch_assoc($sqlDeptV); 
        $DeptV=$resDeptV['DepartmentCode'];}
  
#  Create the Column Headings
$csv_output .= '"SNo",'; 
$csv_output .= '"KRA",';
$csv_output .= '"Description",';
$csv_output .= '"Measure",';
$csv_output .= '"Unit",';
$csv_output .= "\n";		

# Get Users Details form the DB #$result = mysql_query("SELECT * from formResults WHERE formID = '$formID'" );

$result = mysql_query("SELECT * from hrm_pms_kra WHERE (KRAStatus='A' OR KRAStatus='R') AND CompanyId=".$_REQUEST['C']." AND YearId=".$_REQUEST['Y']." AND DepartmentId=".$_REQUEST['value'], $con); $Sno=1; while($res = mysql_fetch_array($result))
{
$csv_output .= '"'.str_replace('"', '""', $Sno).'",';
$csv_output .= '"'.str_replace('"', '""', $res['KRA']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['KRA_Description']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['Measure']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['Unit']).'",';	
$csv_output .= "\n";
$Sno++;}
# Close the MySql connection
mysql_close($con);
# Set the headers so the file downloads
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Content-Length: " . strlen($csv_output));
header("Content-type: text/x-csv");
header("Content-Disposition: attachment; filename=Emp_PMS_KRA_".$PRD."-".$DeptV.".csv");
echo $csv_output;
exit;
}
?>