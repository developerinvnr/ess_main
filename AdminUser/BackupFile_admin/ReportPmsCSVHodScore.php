<?php 
require_once('config/config.php');
$sY=mysql_query("select * from hrm_year where YearId=".$_REQUEST['Y']."", $con); $rY=mysql_fetch_assoc($sY); 
$FD=date("Y",strtotime($rY['FromDate'])); $TD=date("Y",strtotime($rY['ToDate'])); $MY=$FD-1;  $PRD=$MY.'-'.$FD;
/*************************************************************************************************************/
if($_REQUEST['Y']==1){$Y=2012;}elseif($_REQUEST['Y']==2){$Y=2013;}elseif($_REQUEST['Y']==3){$Y=2014;}elseif($_REQUEST['Y']==4){$Y=2015;}elseif($_REQUEST['Y']==5){$Y=2016;}elseif($_REQUEST['Y']==6){$Y=2017;}elseif($_REQUEST['Y']==7){$Y=2018;}elseif($_REQUEST['Y']==8){$Y=2019;}elseif($_REQUEST['Y']==9){$Y=2020;}


if($_REQUEST['action']='ExportHodScore') 
{ $sqlA=mysql_query("select Fname, Sname, Lname from hrm_employee where EmployeeId=".$_REQUEST['value'], $con); $resA=mysql_fetch_assoc($sqlA); 
  $Hname=$resA['Fname'].' '.$resA['Sname'].' '.$resA['Lname'];
#  Create the Column Headings
$csv_output .= '"EmpCode",'; 
$csv_output .= '"Name",';
$csv_output .= '"Department",';
$csv_output .= '"Designation",';
$csv_output .= '"Grade",';
$csv_output .= '"State",';	
$csv_output .= '"Employee Score",';	
$csv_output .= '"Rating",';
$csv_output .= '"Appraiser Score",';
$csv_output .= '"Rating",';
$csv_output .= '"Reviwer Score",';
$csv_output .= '"Rating",';
$csv_output .= '"HOD Score",';
$csv_output .= '"Rating",';
$csv_output .= '"Final Score",';
$csv_output .= '"Final Rating",'; 
$csv_output .= "\n";		

# Get Users Details form the DB #$result = mysql_query("SELECT * from formResults WHERE formID = '$formID'" );

$sqlH = mysql_query("select hrm_employee.*, hrm_employee_general.DepartmentId, hrm_employee_general.DesigId, hrm_employee_general.HqId, hrm_employee_general.GradeId, hrm_employee_general.DesigId, EmpPmsId, Emp_TotalFinalScore, Emp_TotalFinalRating, Appraiser_TotalFinalScore, Appraiser_TotalFinalRating, Reviewer_TotalFinalScore, Reviewer_TotalFinalRating, Hod_TotalFinalScore, Hod_TotalFinalRating, HR_Score, HR_Rating from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_pms ON hrm_employee.EmployeeID=hrm_employee_pms.EmployeeID where hrm_employee.CompanyId=".$_REQUEST['C']." AND hrm_employee_general.DateJoining<='".$Y."-06-30' AND hrm_employee.EmpStatus='A' AND hrm_employee_pms.HOD_EmployeeID=".$_REQUEST['value']." AND hrm_employee_pms.AssessmentYear=".$_REQUEST['Y'], $con);
while($resH=mysql_fetch_array($sqlH))
{
$sqlDept=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$resH['DepartmentId'], $con); $resDept=mysql_fetch_assoc($sqlDept);
$sqlDesig=mysql_query("select DesigName from hrm_designation where DesigId=".$resH['DesigId'], $con); $resDesig=mysql_fetch_assoc($sqlDesig);
$sqlG=mysql_query("select GradeValue from hrm_grade where GradeId=".$resH['GradeId'], $con); $resG=mysql_fetch_assoc($sqlG);
$sqlS=mysql_query("select StateName from hrm_state INNER JOIN hrm_headquater ON hrm_state.StateId=hrm_headquater.StateId where HqId=".$resH['HqId'], $con); $resS=mysql_fetch_assoc($sqlS);

$csv_output .= '"'.str_replace('"', '""', $res['EmpCode']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['Fname'].' '.$res['Sname'].' '.$res['Lname']).'",';
$csv_output .= '"'.str_replace('"', '""', $resDept['DepartmentCode']).'",';
$csv_output .= '"'.str_replace('"', '""', $resDesig['DesigName']).'",';
$csv_output .= '"'.str_replace('"', '""', $resG['GradeValue']).'",';	
$csv_output .= '"'.str_replace('"', '""', $resS['StateName']).'",';
$csv_output .= '"'.str_replace('"', '""', $resH['Emp_TotalFinalScore']).'",';
$csv_output .= '"'.str_replace('"', '""', $resH['Emp_TotalFinalRating']).'",';
$csv_output .= '"'.str_replace('"', '""', $resH['Appraiser_TotalFinalScore']).'",';
$csv_output .= '"'.str_replace('"', '""', $resH['Appraiser_TotalFinalRating']).'",';
$csv_output .= '"'.str_replace('"', '""', $resH['Reviewer_TotalFinalScore']).'",';
$csv_output .= '"'.str_replace('"', '""', $resH['Reviewer_TotalFinalRating']).'",';
$csv_output .= '"'.str_replace('"', '""', $resH['Hod_TotalFinalScore']).'",';
$csv_output .= '"'.str_replace('"', '""', $resH['Hod_TotalFinalRating']).'",';
$csv_output .= '"'.str_replace('"', '""', $resH['HR_Score']).'",';
$csv_output .= '"'.str_replace('"', '""', $resH['HR_Rating']).'",';
$csv_output .= "\n";
}

# Close the MySql connection
mysql_close($con);
# Set the headers so the file downloads
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Content-Length: " . strlen($csv_output));
header("Content-type: text/x-csv");
header("Content-Disposition: attachment; filename=Emp_PMS_Score/Rating_".$PRD."-".$Hname.".csv");
echo $csv_output;
exit;
}
?>