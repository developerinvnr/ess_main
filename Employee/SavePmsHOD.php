<?php 
require_once('../AdminUser/config/config.php');
if(isset($_POST['IGM']) && $_POST['IGM']!=""){ 
$PmsId = $_POST['PmsId']; $EmpId = $_POST['EmpId']; $OAS = $_POST['OAS']; $OAR = $_POST['OAR']; $PI = $_POST['PI']; $PSC = $_POST['PSC']; $TI = $_POST['TI']; $IGM = $_POST['IGM']; $DeptId = $_POST['DeptId']; $DesigId = $_POST['DesigId']; $GradeId = $_POST['GradeId']; $RFP = $_POST['RFP']; $IGA = $_POST['IGA']; $PerPI = $_POST['PerPI']; $PerTI = $_POST['PerTI'];
$sqlR=mysql_query("select RatingName from hrm_pms_rating where Rating=".$OAR, $con); $resR=mysql_fetch_assoc($sqlR);
$sql = mysql_query("update hrm_employee_pms set RevSubmit_IncStatus=1, HR_OverAllFinalScore=".$OAS.", HR_OverAllFinalRating=".$OAR.", HR_OverAllFinalRatingName='".$resR['RatingName']."', RecomForPromotion='".$RFP."', AfterPms_DepartmentId=".$DeptId.", AfterPms_DesigId=".$DesigId.", AfterPms_DesigDate='".date("Y-m-d")."', AfterPms_GradeId=".$GradeId.", Proposed_IncrementSalary=".$PI.", Per_ProInc=".$PerPI.", Proposed_CorrectionSalary=".$PSC.", NetMonthaly_IncrementSalary=".$TI.", Per_TotInc=".$PerTI.", AfterPms_GrossMonthlySalary=".$IGM.", AfterPms_GrossAnnualSalary=".$IGA." where EmpPmsId=".$PmsId." AND EmployeeID=".$EmpId, $con); 
if($sql) {echo "data save in draft successfully!";}
}



if(isset($_POST['IGM2']) && $_POST['IGM2']!=""){
$PmsId = $_POST['PmsId2']; $EmpId = $_POST['EmpId2']; $OAS = $_POST['OAS2']; $OAR = $_POST['OAR2']; $PI = $_POST['PI2']; $PSC = $_POST['PSC2']; $TI = $_POST['TI2']; $IGM = $_POST['IGM2']; $DeptId = $_POST['DeptId2']; $DesigId = $_POST['DesigId2']; $GradeId = $_POST['GradeId2']; $RFP = $_POST['RFP2']; $IGA = $_POST['IGA2']; $PerPI = $_POST['PerPI2']; $PerTI = $_POST['PerTI2'];
$sqlR=mysql_query("select RatingName from hrm_pms_rating where Rating=".$OAR, $con); $resR=mysql_fetch_assoc($sqlR);
$sql = mysql_query("update hrm_employee_pms set RevSubmit_IncStatus=2, RevSubmit_IncDate='".date("Y-m-d")."', HR_OverAllFinalScore=".$OAS.", HR_OverAllFinalRating=".$OAR.", HR_OverAllFinalRatingName='".$resR['RatingName']."', RecomForPromotion='".$RFP."', AfterPms_DepartmentId=".$DeptId.", AfterPms_DesigId=".$DesigId.", AfterPms_DesigDate='".date("Y-m-d")."', AfterPms_GradeId=".$GradeId.", Proposed_IncrementSalary=".$PI.", Per_ProInc=".$PerPI.", Proposed_CorrectionSalary=".$PSC.", NetMonthaly_IncrementSalary=".$TI.", Per_TotInc=".$PerTI.", AfterPms_GrossMonthlySalary=".$IGM.", AfterPms_GrossAnnualSalary=".$IGA." where EmpPmsId=".$PmsId." AND EmployeeID=".$EmpId, $con); 
if($sql) {echo "data submited successfully!";}
}


?>

