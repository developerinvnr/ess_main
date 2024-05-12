<?php
require_once('config/config.php');
$sY=mysql_query("select * from hrm_year where YearId=".$_REQUEST['Y']."", $con); $rY=mysql_fetch_assoc($sY); 
$FD=date("Y",strtotime($rY['FromDate'])); $TD=date("Y",strtotime($rY['ToDate'])); $MY=$FD-1;  $PRD=$MY.'-'.$FD;
/*************************************************************************************************************/
if($_REQUEST['Y']==1){$Y=2012;}elseif($_REQUEST['Y']==2){$Y=2013;}elseif($_REQUEST['Y']==3){$Y=2014;}elseif($_REQUEST['Y']==4){$Y=2015;}elseif($_REQUEST['Y']==5){$Y=2016;}elseif($_REQUEST['Y']==6){$Y=2017;}elseif($_REQUEST['Y']==7){$Y=2018;}elseif($_REQUEST['Y']==8){$Y=2019;}elseif($_REQUEST['Y']==9){$Y=2020;}

if($_REQUEST['action']='ExportAppRev') 
{
if($_REQUEST['value']=='All') {$DeptV='All_Employee';}
  else{ $sqlDeptV=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$_REQUEST['value'], $con); $resDeptV=mysql_fetch_assoc($sqlDeptV); 
        $DeptV=$resDeptV['DepartmentCode'];}
  
#  Create the Column Headings
$csv_output .= '"EmpCode",'; 
$csv_output .= '"Name",';
$csv_output .= '"Department",';
$csv_output .= '"Designation",';
$csv_output .= '"Apraiser Name",';
$csv_output .= '"Reviewer Name",';	
$csv_output .= '"HOD Name",';
$csv_output .= "\n";		

# Get Users Details form the DB #$result = mysql_query("SELECT * from formResults WHERE formID = '$formID'" );

if($_REQUEST['value']=='All') {$result = mysql_query("select hrm_employee.*, hrm_employee_general.DepartmentId, hrm_employee_general.DesigId, hrm_employee_general.HqId, hrm_employee_general.GradeId, hrm_employee_general.DesigId, EmpPmsId, Appraiser_EmployeeID, Reviewer_EmployeeID, HOD_EmployeeID from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_pms ON hrm_employee.EmployeeID=hrm_employee_pms.EmployeeID where hrm_employee.CompanyId=".$_REQUEST['C']." AND hrm_employee_general.DateJoining<='".$Y."-06-30' AND hrm_employee.EmpStatus='A' AND (hrm_employee_pms.Appraiser_EmployeeID!='' OR hrm_employee_pms.Appraiser_EmployeeID!=0) AND hrm_employee_pms.AssessmentYear=".$_REQUEST['Y'], $con); }
else {$result = mysql_query("select hrm_employee.*, hrm_employee_general.DepartmentId, hrm_employee_general.DesigId, hrm_employee_general.HqId, hrm_employee_general.GradeId, hrm_employee_general.DesigId, EmpPmsId, Appraiser_EmployeeID, Reviewer_EmployeeID, HOD_EmployeeID from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_pms ON hrm_employee.EmployeeID=hrm_employee_pms.EmployeeID where hrm_employee_pms.HR_Curr_DepartmentId=".$_REQUEST['value']." AND hrm_employee.CompanyId=".$_REQUEST['C']." AND hrm_employee_general.DateJoining<='".$Y."-06-30' AND hrm_employee.EmpStatus='A' AND (hrm_employee_pms.Appraiser_EmployeeID!='' OR hrm_employee_pms.Appraiser_EmployeeID!=0) AND hrm_employee_pms.AssessmentYear=".$_REQUEST['Y'], $con); }
while($res = mysql_fetch_array($result))
{
$sqlDept=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$res['DepartmentId'], $con); $resDept=mysql_fetch_assoc($sqlDept);
$sqlDesig=mysql_query("select DesigName from hrm_designation where DesigId=".$res['DesigId'], $con); $resDesig=mysql_fetch_assoc($sqlDesig);
$sqlE1=mysql_query("select Fname, Sname, Lname from hrm_employee where EmployeeID=".$res['Appraiser_EmployeeID'], $con); $resE1=mysql_fetch_assoc($sqlE1);
$sqlE2=mysql_query("select Fname, Sname, Lname from hrm_employee where EmployeeID=".$res['Reviewer_EmployeeID'], $con); $resE2=mysql_fetch_assoc($sqlE2);
$sqlE3=mysql_query("select Fname, Sname, Lname from hrm_employee where EmployeeID=".$res['HOD_EmployeeID'], $con); $resE3=mysql_fetch_assoc($sqlE3); 
$csv_output .= '"'.str_replace('"', '""', $res['EmpCode']).'",';

if($res['Sname']==''){ $Ename=trim($res['Fname']).' '.trim($res['Lname']); }
else{ $Ename=trim($res['Fname']).' '.trim($res['Sname']).' '.trim($res['Lname']); }
$csv_output .= '"'.str_replace('"', '""', $Ename).'",';
//$csv_output .= '"'.str_replace('"', '""', $res['Fname'].' '.$res['Sname'].' '.$res['Lname']).'",';
$csv_output .= '"'.str_replace('"', '""', $resDept['DepartmentCode']).'",';
$csv_output .= '"'.str_replace('"', '""', $resDesig['DesigName']).'",';
$csv_output .= '"'.str_replace('"', '""', $resE1['Fname'].' '.$resE1['Sname'].' '.$resE1['Lname']).'",';	
$csv_output .= '"'.str_replace('"', '""', $resE2['Fname'].' '.$resE2['Sname'].' '.$resE2['Lname']).'",';
$csv_output .= '"'.str_replace('"', '""', $resE3['Fname'].' '.$resE3['Sname'].' '.$resE3['Lname']).'",';
$csv_output .= "\n";
}
# Close the MySql connection
mysql_close($con);
# Set the headers so the file downloads
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Content-Length: " . strlen($csv_output));
header("Content-type: text/x-csv");
header("Content-Disposition: attachment; filename=Emp_PMS_App-Rev-HOD_".$PRD."-".$DeptV.".csv");
echo $csv_output;
exit;
}
?>