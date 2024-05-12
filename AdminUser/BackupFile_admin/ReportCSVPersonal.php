<?php 
require_once('config/config.php');
$sY=mysql_query("select * from hrm_year where YearId=".$_REQUEST['Y']."", $con); $rY=mysql_fetch_assoc($sY); 
$FD=date("Y",strtotime($rY['FromDate'])); $TD=date("Y",strtotime($rY['ToDate'])); $MY=$FD-1;  $PRD=$MY.'-'.$FD;
/*************************************************************************************************************/

if($_REQUEST['action']='PersonalExport') 
{ 
 if($_REQUEST['value']=='All') {$DeptV='All_Employee';}
  else{ $sqlDeptV=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$_REQUEST['value'], $con); $resDeptV=mysql_fetch_assoc($sqlDeptV); 
        $DeptV=$resDeptV['DepartmentCode'];}
  
#  Create the Column Headings
$csv_output .= '"Sn",';
$csv_output .= '"EmpCode",'; 
$csv_output .= '"Name",';
$csv_output .= '"Department",';
$csv_output .= '"Designation",';
$csv_output .= '"Gender",';
$csv_output .= '"Blood Group",';
$csv_output .= '"Sr Citizen",';	
$csv_output .= '"Metro City",';	
$csv_output .= '"Mobile",';
$csv_output .= '"Email_ID",';
$csv_output .= '"Aadhar",';
$csv_output .= '"Cast",';
$csv_output .= '"Religion",';
$csv_output .= '"PanCard",';
$csv_output .= '"Passport",';
$csv_output .= '"ValidTo",';
$csv_output .= '"ValidFrom",';
$csv_output .= '"Driving Lic",';
$csv_output .= '"ValidTo",';
$csv_output .= '"ValidFrom",'; 
$csv_output .= '"Marital Status",';
$csv_output .= '"Date",';
$csv_output .= "\n";		

# Get Users Details form the DB #$result = mysql_query("SELECT * from formResults WHERE formID = '$formID'" );
if($_REQUEST['value']=='All') {$sql=mysql_query("select hrm_employee.*, hrm_employee_personal.*,DepartmentId,DesigId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee_general.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee.CompanyId=".$_REQUEST['C']." AND hrm_employee.EmpStatus='A' order by EmpCode ASC", $con); }
else {$sql=mysql_query("select hrm_employee.*, hrm_employee_personal.*,DepartmentId,DesigId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee_general.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee_general.DepartmentId=".$_REQUEST['value']." AND hrm_employee.CompanyId=".$_REQUEST['C']." AND hrm_employee.EmpStatus='A' order by EmpCode ASC", $con); } 
$Sno=1; while($res=mysql_fetch_array($sql)){ $Ename=$res['Fname'].' '.$res['Sname'].' '.$res['Lname']; 
$sqlDept=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$res['DepartmentId'], $con); $resDept=mysql_fetch_assoc($sqlDept);
$sqlDesig=mysql_query("select DesigName from hrm_designation where DesigId=".$res['DesigId'], $con); $resDesig=mysql_fetch_assoc($sqlDesig);

$csv_output .= '"'.str_replace('"', '""', $Sno).'",';
$csv_output .= '"'.str_replace('"', '""', $res['EmpCode']).'",';
$csv_output .= '"'.str_replace('"', '""', $Ename).'",';
$csv_output .= '"'.str_replace('"', '""', $resDept['DepartmentCode']).'",';
$csv_output .= '"'.str_replace('"', '""', $resDesig['DesigName']).'",';
if($res['Gender']=='M'){$g='Male';}else {$g='Female';}
$csv_output .= '"'.str_replace('"', '""', $g).'",';
$csv_output .= '"'.str_replace('"', '""', $res['BloodGroup']).'",';
if($res['SeniorCitizen']=='Y'){$SC='YES';}else {$SC='NO';}
$csv_output .= '"'.str_replace('"', '""', $SC).'",';
if($res['MetroCity']=='Y'){$MC='YES';}else {$MC='NO';}
$csv_output .= '"'.str_replace('"', '""', $MC).'",';
$csv_output .= '"'.str_replace('"', '""', $res['MobileNo']).'",';	
$csv_output .= '"'.str_replace('"', '""', $res['EmailId_Self']).'",';
$csv_output .= '"'.str_replace('"', '""', strtoupper($res['AadharNo'])).'",';
$csv_output .= '"'.str_replace('"', '""', strtoupper($res['Categoryy'])).'",';
$csv_output .= '"'.str_replace('"', '""', strtoupper($res['Religion'])).'",';

$csv_output .= '"'.str_replace('"', '""', $res['PanNo']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['PassportNo']).'",';
if($res['Passport_ExpiryDateFrom']!='1970-01-01' AND $res['Passport_ExpiryDateFrom']!='0000-00-00') { $PPExp=date("d-M-y", strtotime($res['Passport_ExpiryDateFrom'])); }else{$PPExp='';}
$csv_output .= '"'.str_replace('"', '""', $PPExp).'",';
if($res['Passport_ExpiryDateTo']!='1970-01-01' AND $res['Passport_ExpiryDateTo']!='0000-00-00') { $PPExpTo=date("d-M-y", strtotime($res['Passport_ExpiryDateTo'])); }else{$PPExpTo='';}
$csv_output .= '"'.str_replace('"', '""', $PPExpTo).'",';
$csv_output .= '"'.str_replace('"', '""', $res['DrivingLicNo']).'",';
if($res['Driv_ExpiryDateFrom']!='1970-01-01' AND $res['Driv_ExpiryDateFrom']!='0000-00-00') { $DLExp=date("d-M-y", strtotime($res['Driv_ExpiryDateFrom'])); }else{$DLExp='';}
$csv_output .= '"'.str_replace('"', '""', $DLExp).'",';
if($res['Driv_ExpiryDateTo']!='1970-01-01' AND $res['Driv_ExpiryDateTo']!='0000-00-00') { $DLExpTo=date("d-M-y", strtotime($res['Driv_ExpiryDateTo'])); }else{$DLExpTo='';}
$csv_output .= '"'.str_replace('"', '""', $DLExpTo).'",';
if($res['Married']=='Y'){$M='Married';}else {$M='Single';}
$csv_output .= '"'.str_replace('"', '""', $M).'",';
if($res['Married']=='Y') {$MY=date("d-M-y", strtotime($res['MarriageDate']));} else {$MY='';}
$csv_output .= '"'.str_replace('"', '""', $MY).'",';

$csv_output .= "\n";
$Sno++; }

# Close the MySql connection
mysql_close($con);
# Set the headers so the file downloads
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Content-Length: " . strlen($csv_output));
header("Content-type: text/x-csv");
header("Content-Disposition: attachment; filename=Employee_PersonalReports_".$DeptV.".csv");
echo $csv_output;
exit;
}
?>