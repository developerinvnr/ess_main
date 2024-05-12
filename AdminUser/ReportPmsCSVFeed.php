<?php
require_once('config/config.php');
$sY=mysql_query("select * from hrm_year where YearId=".$_REQUEST['Y']."", $con); $rY=mysql_fetch_assoc($sY); 
$FD=date("Y",strtotime($rY['FromDate'])); $TD=date("Y",strtotime($rY['ToDate'])); $MY=$FD-1;  $PRD=$MY.'-'.$FD;
/*************************************************************************************************************/
if($_REQUEST['Y']==1){$Y=2012;}elseif($_REQUEST['Y']==2){$Y=2013;}elseif($_REQUEST['Y']==3){$Y=2014;}elseif($_REQUEST['Y']==4){$Y=2015;}elseif($_REQUEST['Y']==5){$Y=2016;}elseif($_REQUEST['Y']==6){$Y=2017;}elseif($_REQUEST['Y']==7){$Y=2018;}elseif($_REQUEST['Y']==8){$Y=2019;}elseif($_REQUEST['Y']==9){$Y=2020;}

if($_REQUEST['action']='ExportFeed') 
{
if($_REQUEST['value']=='All') {$DeptV='All_Employee';}
  else{ $sqlDeptV=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$_REQUEST['value'], $con); $resDeptV=mysql_fetch_assoc($sqlDeptV); 
        $DeptV=$resDeptV['DepartmentCode'];}
  
#  Create the Column Headings
$csv_output .= '"SNo",'; 
$csv_output .= '"Name",';
$csv_output .= '"Environment",';
$csv_output .= '"Feedback",';
$csv_output .= "\n";		

# Get Users Details form the DB #$result = mysql_query("SELECT * from formResults WHERE formID = '$formID'" );

if($_REQUEST['value']=='All') { $result = mysql_query("SELECT hrm_employee_pms_workenvironment.*,Fname,Sname,Lname from hrm_employee_pms_workenvironment INNER JOIN hrm_employee_pms ON hrm_employee_pms_workenvironment.EmpPmsId=hrm_employee_pms.EmpPmsId INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID WHERE hrm_employee_pms.CompanyId=".$_REQUEST['C']." AND hrm_employee_pms.AssessmentYear=".$_REQUEST['Y']." AND hrm_employee_general.DateJoining<='".$Y."-06-30' AND hrm_employee_pms_workenvironment.Answer!='' order by WorkEnvironment ASC", $con) or die(mysql_error()); } else {$result = mysql_query("SELECT hrm_employee_pms_workenvironment.*,Fname,Sname,Lname from hrm_employee_pms_workenvironment INNER JOIN hrm_employee_pms ON hrm_employee_pms_workenvironment.EmpPmsId=hrm_employee_pms.EmpPmsId INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID WHERE hrm_employee_pms.CompanyId=".$_REQUEST['C']." AND hrm_employee_pms.AssessmentYear=".$_REQUEST['Y']." AND hrm_employee_general.DateJoining<='".$Y."-06-30' AND hrm_employee_pms_workenvironment.Answer!='' AND hrm_employee_pms.HR_Curr_DepartmentId=".$_REQUEST['value']." order by WorkEnvironment ASC", $con) or die(mysql_error());} $Sno=1; while($res = mysql_fetch_array($result))
{
$csv_output .= '"'.str_replace('"', '""', $Sno).'",';

if($res['Sname']==''){ $Ename=trim($res['Fname']).' '.trim($res['Lname']); }
else{ $Ename=trim($res['Fname']).' '.trim($res['Sname']).' '.trim($res['Lname']); }
$csv_output .= '"'.str_replace('"', '""', $Ename).'",';
//$csv_output .= '"'.str_replace('"', '""', $res['Fname'].' '.$res['Sname'].' '.$res['Lname']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['WorkEnvironment']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['Answer']).'",';
$csv_output .= "\n";
$Sno++;}
# Close the MySql connection
mysql_close($con);
# Set the headers so the file downloads
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Content-Length: " . strlen($csv_output));
header("Content-type: text/x-csv");
header("Content-Disposition: attachment; filename=Emp_PMS_FeedBack_".$PRD."-".$DeptV.".csv");
echo $csv_output;
exit;
}
?>