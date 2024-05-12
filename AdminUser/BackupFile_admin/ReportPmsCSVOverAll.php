<?php 
require_once('config/config.php');
$sY=mysql_query("select * from hrm_year where YearId=".$_REQUEST['Y']."", $con); $rY=mysql_fetch_assoc($sY); 
$FD=date("Y",strtotime($rY['FromDate'])); $TD=date("Y",strtotime($rY['ToDate'])); $MY=$FD-1;  $PRD=$MY.'-'.$FD;
/*************************************************************************************************************/
if($_REQUEST['Y']==1){$Y=2012;}elseif($_REQUEST['Y']==2){$Y=2013;}elseif($_REQUEST['Y']==3){$Y=2014;}elseif($_REQUEST['Y']==4){$Y=2015;}elseif($_REQUEST['Y']==5){$Y=2016;}elseif($_REQUEST['Y']==6){$Y=2017;}elseif($_REQUEST['Y']==7){$Y=2018;}elseif($_REQUEST['Y']==8){$Y=2019;}elseif($_REQUEST['Y']==9){$Y=2020;}

if($_REQUEST['action']='ExportOverAll') 
{
  if($_REQUEST['value']==20) {$DeptV='All_Employee';}
  else{ $sqlDeptV=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$_REQUEST['value'], $con); $resDeptV=mysql_fetch_assoc($sqlDeptV); 
        $DeptV=$resDeptV['DepartmentCode'];}
  
#  Create the Column Headings
$csv_output .= '"EmpCode",'; 
$csv_output .= '"Name",';
$csv_output .= '"Grade",';
$csv_output .= '"Pro_Grade",';
$csv_output .= '"Department",';
$csv_output .= '"Pro_Department",';
$csv_output .= '"Designation",';
$csv_output .= '"Pro_Designation",';
$csv_output .= '"Reporting",';
$csv_output .= '"Basic",';	
$csv_output .= '"HRA",';
$csv_output .= '"CA",';	
$csv_output .= '"SA",';
$csv_output .= '"Gross Salary",';
$csv_output .= '"Gross Salary(PAC)",';
$csv_output .= '"PF Deduction",';
$csv_output .= '"Net Salary",'; 
$csv_output .= '"LTA",';
$csv_output .= '"MR",';
$csv_output .= '"CEA",';
$csv_output .= '"Annual Gross",';
$csv_output .= '"Employer PF Con",';
$csv_output .= '"Bonus",';
$csv_output .= '"Gratuity",';
$csv_output .= '"Mediclaim Premium",';
$csv_output .= '"Annual CTC",';
$csv_output .= '"Two Wheeler",';
$csv_output .= '"Four Wheeler",';
$csv_output .= '"DA InsideHQ",';
$csv_output .= '"DA OutsideHQ",';
$csv_output .= '"A Grade",';
$csv_output .= '"B Grade",';
$csv_output .= '"C Grade",';
$csv_output .= '"Mode of Travel",';
$csv_output .= '"Travel Class",';
$csv_output .= '"Telephone PM",';
$csv_output .= '"HandSet Elig",';
$csv_output .= '"Mediclaim Insu",';
$csv_output .= '"Rating",';
$csv_output .= "\n";		


# Get Users Details form the DB #$result = mysql_query("SELECT * from formResults WHERE formID = '$formID'" );
if($_REQUEST['value']!=20) {$SqlCtc = mysql_query("SELECT EmpCode,Fname,Sname,Lname,hrm_employee.EmployeeID,DepartmentId,GradeId,DesigId,Gender,DR,Married from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID WHERE hrm_employee.EmpStatus='A' AND hrm_employee_general.DateJoining<='".$Y."-06-30' AND hrm_employee.CompanyId=".$_REQUEST['C']." AND hrm_employee_general.DepartmentId=".$_REQUEST['value']." order by EmpCode ASC", $con) or die(mysql_error()); } 

elseif($_REQUEST['value']==20) {$SqlCtc = mysql_query("SELECT EmpCode,Fname,Sname,Lname,hrm_employee.EmployeeID,DepartmentId,GradeId,DesigId,Gender,DR,Married from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID WHERE hrm_employee.EmpStatus='A' AND hrm_employee_general.DateJoining<='".$Y."-06-30' AND hrm_employee.CompanyId=".$_REQUEST['C']." AND hrm_employee.EmployeeID!=223 AND hrm_employee.EmployeeID!=224 order by EmpCode ASC ", $con) or die(mysql_error());} while($ResCtc = mysql_fetch_assoc($SqlCtc)) { 

$sql=mysql_query("SELECT EmployeeID from hrm_employee_pms WHERE EmployeeID=".$ResCtc['EmployeeID']." AND AssessmentYear=".$_REQUEST['Y'], $con); 
$row=mysql_num_rows($sql); if($row>0) { 
$sqlC = mysql_query("SELECT hrm_employee_ctc.*,hrm_employee_eligibility.* from hrm_employee_ctc INNER JOIN hrm_employee_eligibility ON hrm_employee_ctc.EmployeeID=hrm_employee_eligibility.EmployeeID WHERE hrm_employee_ctc.EmployeeID=".$ResCtc['EmployeeID']." AND hrm_employee_ctc.CtcYearId=".$_REQUEST['Y']." AND hrm_employee_ctc.CtcCreatedDate>='".date($FD."-10-01")."' AND hrm_employee_ctc.CtcCreatedDate<='".date($FD."-12-31")."' AND hrm_employee_eligibility.EligYearId=".$_REQUEST['Y']." AND hrm_employee_eligibility.EligCreatedDate>='".date($FD."-10-01")."' AND hrm_employee_eligibility.EligCreatedDate<='".date($FD."-12-31")."'", $con); 
$RowC=mysql_num_rows($sqlC); $ResC=mysql_fetch_assoc($sqlC);

$sqlEE=mysql_query("select HR_DepartmentId,HR_DesigId,HR_GradeId from hrm_employee_pms where CompanyId=".$_REQUEST['C']." AND EmployeeID=".$ResCtc['EmployeeID']." AND AssessmentYear=".$_REQUEST['Y'], $con); 
$resEE=mysql_fetch_array($sqlEE);
$sqlDesig2=mysql_query("select DesigName from hrm_designation where DesigId=".$resEE['HR_DesigId'], $con); $resDesig2=mysql_fetch_assoc($sqlDesig2);
$sqlG2=mysql_query("select GradeValue from hrm_grade where GradeId=".$resEE['HR_GradeId'], $con); $resG2=mysql_fetch_assoc($sqlG2);
$sqlDe2=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$resEE['HR_DepartmentId'], $con); $resDe2=mysql_fetch_assoc($sqlDe2);

$sqlG=mysql_query("select GradeValue from hrm_grade where GradeId=".$ResCtc['GradeId'], $con); $resG=mysql_fetch_assoc($sqlG);
$sqlDe=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$ResCtc['DepartmentId'], $con); $resDe=mysql_fetch_assoc($sqlDe);
$sqlD=mysql_query("select DesigName from hrm_designation where DesigId=".$ResCtc['DesigId'], $con); $resD=mysql_fetch_assoc($sqlD);
$sqlEm=mysql_query("select Appraiser_EmployeeID,Hod_TotalFinalRating from hrm_employee_pms where AssessmentYear=".$_REQUEST['Y']." AND EmployeeID=".$ResCtc['EmployeeID'], $con); 
$resEm=mysql_fetch_assoc($sqlEm); $sqlEmApp=mysql_query("select Fname,Sname,Lname from hrm_employee where EmployeeID=".$resEm['Appraiser_EmployeeID'], $con); 
$resEmApp=mysql_fetch_assoc($sqlEmApp);

if($resG2['GradeValue']==''){$G2=$resG['GradeValue'];}else{$G2=$resG2['GradeValue'];}
if($resDe2['DepartmentCode']==''){$D2=$resDe['DepartmentCode'];}else{$D2=$resDe2['DepartmentCode'];}
if($resDesig2['DesigName']==''){$De2=$resD['DesigName'];}else{$De2=$resDesig2['DesigName']; }

$csv_output .= '"'.str_replace('"', '""', $ResCtc['EmpCode']).'",';
$csv_output .= '"'.str_replace('"', '""', $ResCtc['Fname'].' '.$ResCtc['Sname'].' '.$ResCtc['Lname']).'",';
$csv_output .= '"'.str_replace('"', '""', $resG['GradeValue']).'",';
$csv_output .= '"'.str_replace('"', '""', $G2).'",';
$csv_output .= '"'.str_replace('"', '""', $resDe['DepartmentCode']).'",';
$csv_output .= '"'.str_replace('"', '""', $D2).'",';
$csv_output .= '"'.str_replace('"', '""', $resD['DesigName']).'",';  
$csv_output .= '"'.str_replace('"', '""', $De2).'",'; 
$csv_output .= '"'.str_replace('"', '""', $resEmApp['Fname'].' '.$resEmApp['Sname'].' '.$resEmApp['Lname']).'",';
$csv_output .= '"'.str_replace('"', '""', $ResC['BAS_Value']).'",';
$csv_output .= '"'.str_replace('"', '""', $ResC['HRA_Value']).'",';
$csv_output .= '"'.str_replace('"', '""', $ResC['CONV_Value']).'",';
$csv_output .= '"'.str_replace('"', '""', $ResC['SPECIAL_ALL_Value']).'",';
$csv_output .= '"'.str_replace('"', '""', $ResC['Tot_GrossMonth']).'",';
$csv_output .= '"'.str_replace('"', '""', $ResC['GrossSalary_PostAnualComponent_Value']).'",';
$csv_output .= '"'.str_replace('"', '""', $ResC['PF_Employee_Contri_Value']).'",';
$csv_output .= '"'.str_replace('"', '""', $ResC['NetMonthSalary_Value']).'",';
$csv_output .= '"'.str_replace('"', '""', $ResC['LTA_Value']).'",';
$csv_output .= '"'.str_replace('"', '""', $ResC['MED_REM_Value']).'",';
$csv_output .= '"'.str_replace('"', '""', $ResC['CHILD_EDU_ALL_Value']).'",';
$csv_output .= '"'.str_replace('"', '""', $ResC['Tot_Gross_Annual']).'",';
$csv_output .= '"'.str_replace('"', '""', $ResC['PF_Employer_Contri_Annul']).'",';
$csv_output .= '"'.str_replace('"', '""', $ResC['BONUS_Value']).'",';
$csv_output .= '"'.str_replace('"', '""', $ResC['GRATUITY_Value']).'",';
$csv_output .= '"'.str_replace('"', '""', $ResC['Mediclaim_Policy']).'",';
$csv_output .= '"'.str_replace('"', '""', $ResC['Tot_CTC']).'",';
if($ResC['Travel_TwoWeeKM']>0){$T2=$ResC['Travel_TwoWeeKM']; } else {$T2='NA';}
$csv_output .= '"'.str_replace('"', '""', $T2).'",';   
if($ResC['Travel_FourWeeKM']>0){$T4=$ResC['Travel_FourWeeKM']; } else {$T4='NA';}
$csv_output .= '"'.str_replace('"', '""', $T4).'",';
if($ResC['DA_Outside_HqSal']>0){$DAOS=$ResC['DA_Outside_HqSal']; }else {$DAOS='NA';}
$csv_output .= '"'.str_replace('"', '""', $DAOS).'",';
if($ResC['DA_Outside_Hq']>0){$DAO=$ResC['DA_Outside_Hq'];} else {$DAO='NA';}
$csv_output .= '"'.str_replace('"', '""', $DAO).'",';
$csv_output .= '"'.str_replace('"', '""', $ResC['Lodging_CategoryA']).'",';
$csv_output .= '"'.str_replace('"', '""', $ResC['Lodging_CategoryB']).'",';
$csv_output .= '"'.str_replace('"', '""', $ResC['Lodging_CategoryC']).'",';
if($ResC['Mode_Travel_Outside_Hq']!=''){$MT=$ResC['Mode_Travel_Outside_Hq'];}else{$MT='NA';}
$csv_output .= '"'.str_replace('"', '""', $MT).'",';
if($ResC['TravelClass_Outside_Hq']!=''){$TC=$ResC['TravelClass_Outside_Hq'];}else{$TC='NA';}
$csv_output .= '"'.str_replace('"', '""', $TC).'",';
if($ResC['Mobile_Exp_Rem_Rs']>0){$MEx=$ResC['Mobile_Exp_Rem_Rs'];}else{$MEx='NA';}
$csv_output .= '"'.str_replace('"', '""', $MEx).'",';
if($ResC['Mobile_Hand_Elig_Rs']>0){$MH=$ResC['Mobile_Hand_Elig_Rs'];}else{$MH='NA';}
$csv_output .= '"'.str_replace('"', '""', $MH).'",';
$csv_output .= '"'.str_replace('"', '""', $ResC['Health_Insurance']).'",';
$csv_output .= '"'.str_replace('"', '""', $resEm['Hod_TotalFinalRating']).'",';
$csv_output .= "\n";
} }

# Close the MySql connection
mysql_close($con);
# Set the headers so the file downloads
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Content-Length: " . strlen($csv_output));
header("Content-type: text/x-csv");
header("Content-Disposition: attachment; filename=Emp_PMS_OverAllReports_".$PRD."-".$DeptV.".csv");
echo $csv_output;
exit;
}

?>
