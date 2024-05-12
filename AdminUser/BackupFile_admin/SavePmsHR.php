<?php 
require_once('config/config.php');
if(isset($_POST['IGM']) && $_POST['IGM']!=""){ 
$UId = $_POST['UId']; $PmsId = $_POST['PmsId']; $EmpId = $_POST['EmpId']; $OAS = $_POST['OAS']; $OAR = $_POST['OAR']; $PI = $_POST['PI']; $PSC = $_POST['PSC']; $TI = $_POST['TI']; $IGM = $_POST['IGM']; $DeptId = $_POST['DeptId']; $DesigId = $_POST['DesigId']; $GradeId = $_POST['GradeId']; $RFP = $_POST['RFP']; $IGA = $_POST['IGA']; $PerPI = $_POST['PerPI']; $PerTI = $_POST['PerTI'];
$sqlR=mysql_query("select RatingName from hrm_pms_rating where Rating=".$OAR, $con); $resR=mysql_fetch_assoc($sqlR);
$sql = mysql_query("update hrm_employee_pms set HR_PmsStatus=1, HRSubmited_UserId=".$UId.", HR_OverAllFinalScore=".$OAS.", HR_OverAllFinalRating=".$OAR.", HR_OverAllFinalRatingName='".$resR['RatingName']."', RecomForPromotion='".$RFP."', AfterPms_DepartmentId=".$DeptId.", AfterPms_DesigId=".$DesigId.", AfterPms_DesigDate='".date("Y-m-d")."', AfterPms_GradeId=".$GradeId.", Proposed_IncrementSalary=".$PI.", Per_ProInc=".$PerPI.", Proposed_CorrectionSalary=".$PSC.", NetMonthaly_IncrementSalary=".$TI.", Per_TotInc=".$PerTI.", AfterPms_GrossMonthlySalary=".$IGM.", AfterPms_GrossAnnualSalary=".$IGA." where EmpPmsId=".$PmsId." AND EmployeeID=".$EmpId, $con); 
if($sql) {echo "data save in draft successfully!";}
}



if(isset($_POST['IGM2']) && $_POST['IGM2']!=""){ 
$UId = $_POST['UId2']; $PmsId = $_POST['PmsId2']; $EmpId = $_POST['EmpId2']; $OAS = $_POST['OAS2']; $OAR = $_POST['OAR2']; $PI = $_POST['PI2']; $PSC = $_POST['PSC2']; $TI = $_POST['TI2']; $IGM = $_POST['IGM2']; $DeptId = $_POST['DeptId2']; $DesigId = $_POST['DesigId2']; $GradeId = $_POST['GradeId2']; $RFP = $_POST['RFP2']; $IGA = $_POST['IGA2']; 
$d = $_POST['day']; $m = $_POST['month']; $y = $_POST['year']; $PerPI = $_POST['PerPI2']; $PerTI = $_POST['PerTI2'];
$sqlR=mysql_query("select RatingName from hrm_pms_rating where Rating=".$OAR, $con); $resR=mysql_fetch_assoc($sqlR);
$sql = mysql_query("update hrm_employee_pms set HR_PmsStatus=2, HRSubmitedDate='".$y."-".$m."-".$d."', HRSubmited_UserId=".$UId.", HR_OverAllFinalScore=".$OAS.", HR_OverAllFinalRating=".$OAR.", HR_OverAllFinalRatingName='".$resR['RatingName']."', RecomForPromotion='".$RFP."', AfterPms_DepartmentId=".$DeptId.", AfterPms_DesigId=".$DesigId.", AfterPms_DesigDate='".date("Y-m-d")."', AfterPms_GradeId=".$GradeId.", Proposed_IncrementSalary=".$PI.", Per_ProInc=".$PerPI.", Proposed_CorrectionSalary=".$PSC.", NetMonthaly_IncrementSalary=".$TI.", Per_TotInc=".$PerTI.", AfterPms_GrossMonthlySalary=".$IGM.", AfterPms_GrossAnnualSalary=".$IGA." where EmpPmsId=".$PmsId." AND EmployeeID=".$EmpId, $con); 

/* if($sql)
 { $sqlE=mysql_db_query("select hrm_employee.*,DesigId,DesigId2,GradeId,Tot_GrossMonth,Tot_Gross_Annual,Tot_CTC from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_ctc ON hrm_employee.EmployeeID=hrm_employee_ctc.EmployeeID where hrm_employee.EmployeeID=".$EmpId);
   $resE=mysql_fetch_assoc($sqlE); $Ename=$resE['Fname'].' '.$resE['Sname'].' '.$resE['Lname']
 
 $sqlIns=mysql_query("insert into hrm_pms_appraisal_history(EmpCode, EmpName, Current_Grade, Proposed_Grade, DepartmentID, Current_DesigId, Proposed_DesigId, SalaryChange_Date, Salary_Basic, Salary_Stipend, Salary_HRA, Salary_CA, Salary_VA, Salary_SA, Salary_PI, Previous_GrossSalaryPM, Current_GrossSalaryPM, Proposed_GrossSalaryPM, BonusAnnual_September, Proposed_PercentIncrease_GrossSalaryPM, ProposedSalary_Correction, TotalProposed_GrossSalaryPM, TotalProposed_PercentIncrease_GrossSalaryPM, Score, Rating) 
 
 
 value(".$resE['EmpCode'].", '".$Ename."', ".$resE['GradeId'].", ".$GradeId.", ".$DeptId.", ".$resE['DesigId'].", ".$DesigId.", '".$y."-".$m."-".$d."', 0, 0, 0, 0, 0, 0, 0, ".$resE['Tot_GrossMonth'].", ".$resE['Tot_GrossMonth'].", ".$PI.", 0, ".Proposed_PercentIncrease_GrossSalaryPM.", ".$PSC.", ".TotalProposed_GrossSalaryPM.", ".TotalProposed_PercentIncrease_GrossSalaryPM.", ".Score.", ".Rating.")");
 
} */


if($sql) {echo "data submited successfully!";}
}
?>

