<?php 
require_once('config/config.php');
$sY=mysql_query("select * from hrm_year where YearId=".$_REQUEST['Y']."", $con); $rY=mysql_fetch_assoc($sY); 
$FD=date("Y",strtotime($rY['FromDate'])); $TD=date("Y",strtotime($rY['ToDate'])); $MY=$FD-1;  $PRD=$MY.'-'.$FD;
/*************************************************************************************************************/
if($_REQUEST['Y']==1){$Y=2012;}elseif($_REQUEST['Y']==2){$Y=2013;}elseif($_REQUEST['Y']==3){$Y=2014;}elseif($_REQUEST['Y']==4){$Y=2015;}elseif($_REQUEST['Y']==5){$Y=2016;}elseif($_REQUEST['Y']==6){$Y=2017;}elseif($_REQUEST['Y']==7){$Y=2018;}elseif($_REQUEST['Y']==8){$Y=2019;}elseif($_REQUEST['Y']==9){$Y=2020;}

if($_REQUEST['action']='ExportHodInc') 
{
  $sqlB=mysql_query("select Fname, Sname, Lname from hrm_employee where EmployeeId=".$_REQUEST['value'], $con); $resB=mysql_fetch_assoc($sqlB);
  $Hname=$resB['Fname'].' '.$resB['Sname'].' '.$resB['Lname'];
  
#  Create the Column Headings
$csv_output .= '"EmpCode",'; 
$csv_output .= '"Name",';
$csv_output .= '"Department",';
$csv_output .= '"Score",';
$csv_output .= '"Rating",';
$csv_output .= '"Cur_Designation",';	
$csv_output .= '"Pro_Designation",';
$csv_output .= '"Cur_Grade",';	
$csv_output .= '"Pro_Grade",';
$csv_output .= '"Pre_GSPM",';
$csv_output .= '"Pro_GSPM",';
$csv_output .= '"% PGSPM",';
$csv_output .= '"Pro_SC",'; 
$csv_output .= '"% PSC_SC",';
$csv_output .= '"TISPM",';
$csv_output .= '"% TISPM",';
$csv_output .= '"Tot_PGSPM",';
$csv_output .= "\n";		

# Get Users Details form the DB #$result = mysql_query("SELECT * from formResults WHERE formID = '$formID'" );
$result = mysql_query("select hrm_employee.*, hrm_employee_general.DepartmentId, hrm_employee_general.DesigId, hrm_employee_general.HqId, hrm_employee_general.GradeId, hrm_employee_general.DesigId, HR_CurrDesigId, HR_CurrGradeId, HR_Score, HR_Rating, HR_DesigId, HR_GradeId, HR_ProIncSalary, HR_Percent_ProIncSalary, HR_ProCorrSalary, HR_Percent_ProCorrSalary, HR_IncNetMonthalySalary, HR_Percent_IncNetMonthalySalary, HR_GrossMonthlySalary, HR_GrossAnnualSalary, HR_CTC from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_pms ON hrm_employee.EmployeeID=hrm_employee_pms.EmployeeID where hrm_employee.CompanyId=".$_REQUEST['C']." AND hrm_employee_general.DateJoining<='".$Y."-06-30' AND hrm_employee.EmpStatus='A' AND hrm_employee_pms.HOD_EmployeeID=".$_REQUEST['value']." AND hrm_employee_pms.AssessmentYear=".$_REQUEST['Y'], $con); 
while($res = mysql_fetch_array($result))
{
$sqlDept=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$res['DepartmentId'], $con); $resDept=mysql_fetch_assoc($sqlDept);
$sqlDesig=mysql_query("select DesigName from hrm_designation where DesigId=".$res['HR_CurrDesigId'], $con); $resDesig=mysql_fetch_assoc($sqlDesig);
$sqlDesig2=mysql_query("select DesigName from hrm_designation where DesigId=".$res['HR_DesigId'], $con); $resDesig2=mysql_fetch_assoc($sqlDesig2);
$sqlG=mysql_query("select GradeValue from hrm_grade where GradeId=".$res['HR_CurrGradeId'], $con); $resG=mysql_fetch_assoc($sqlG);
$sqlG2=mysql_query("select GradeValue from hrm_grade where GradeId=".$res['HR_GradeId'], $con); $resG2=mysql_fetch_assoc($sqlG2);
$sqlPre=mysql_query("select Previous_GrossSalaryPM from hrm_pms_appraisal_history where EmpCode=".$res['EmpCode']." AND CompanyId=".$_REQUEST['C']." AND YearId=".$_REQUEST['Y'], $con); $resPre=mysql_fetch_assoc($sqlPre);
if($res['HR_DesigId']!=$res['HR_CurrDesigId']){$Desig2=$resDesig2['DesigName'];}else{$Desig2='';}
if($res['HR_DesigId']!=$res['HR_CurrDesigId']){$Desig2=$resDesig2['DesigName'];}else{$Desig2='';}
if($res['HR_GradeId']!=$res['HR_CurrGradeId']){$Grade2=$resG2['GradeValue'];}else{$Grade22='';} 
$csv_output .= '"'.str_replace('"', '""', $res['EmpCode']).'",';

if($res['Sname']==''){ $Ename=trim($res['Fname']).' '.trim($res['Lname']); }
else{ $Ename=trim($res['Fname']).' '.trim($res['Sname']).' '.trim($res['Lname']); }
$csv_output .= '"'.str_replace('"', '""', $Ename).'",';
//$csv_output .= '"'.str_replace('"', '""', $res['Fname'].' '.$res['Sname'].' '.$res['Lname']).'",';
$csv_output .= '"'.str_replace('"', '""', $resDept['DepartmentCode']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['HR_Score']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['HR_Rating']).'",';	
$csv_output .= '"'.str_replace('"', '""', $resDesig['DesigName']).'",';
$csv_output .= '"'.str_replace('"', '""', $Desig2).'",';
$csv_output .= '"'.str_replace('"', '""', $resG['GradeValue']).'",';
$csv_output .= '"'.str_replace('"', '""', $Grade2).'",';
$csv_output .= '"'.str_replace('"', '""', $resPre['Previous_GrossSalaryPM']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['HR_ProIncSalary']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['HR_Percent_ProIncSalary']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['HR_ProCorrSalary']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['HR_Percent_ProCorrSalary']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['HR_IncNetMonthalySalary']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['HR_Percent_IncNetMonthalySalary']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['HR_GrossMonthlySalary']).'",';
$csv_output .= "\n";
}

# Close the MySql connection
mysql_close($con);
# Set the headers so the file downloads
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Content-Length: " . strlen($csv_output));
header("Content-type: text/x-csv");
header("Content-Disposition: attachment; filename=Emp_PMS_Increment_".$PRD."-".$Hname.".csv");
echo $csv_output;
exit;
}

?>
