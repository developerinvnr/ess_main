<?php 
require_once('config/config.php');
if(isset($_POST['EmpId']) && $_POST['EmpId']!=""){  $EmpId=$_POST['EmpId']; $PmsId=$_POST['PmsId']; $Rating=$_POST['Rating']; $Score=$_POST['Score']; $PIS=$_POST['PIS']; $PPIS=$_POST['PPIS']; $PCS=$_POST['PCS']; $PPCS=$_POST['PPCS']; $INMS=$_POST['INMS']; $PINMS=$_POST['PINMS']; $GMS=$_POST['GMS']; $GAS=$_POST['GAS']; $DesigId=$_POST['DesigId']; $GradeId=$_POST['GradeId']; $HRRemark=$_POST['HRRemark']; $YId=$_POST['YId']; $UId=$_POST['UId']; $d = $_POST['d']; $m = $_POST['m']; $y = $_POST['y'];

$sqlRat=mysql_query("select RatingName from hrm_pms_rating where Rating=".$Rating, $con); $resRat=mysql_fetch_assoc($sqlRat);

$sqlUpPms=mysql_query("update hrm_employee_pms set HR_Remark='".$HRRemark."', HR_PmsStatus=2, HR_SubmitedDate='".$y."-".$m."-".$d."', HR_Submited_UserId=".$UId.", HR_Score=".$Score.", HR_Rating=".$Rating.", HR_RatingName='".$resRat['RatingName']."', HR_DesigId=".$DesigId.", HR_DesigDate='".date("Y-m-d")."', HR_GradeId=".$GradeId.", HR_ProIncSalary=".$PIS.", HR_Percent_ProIncSalary=".$PPIS.", HR_ProCorrSalary=".$PCS.", HR_Percent_ProCorrSalary=".$PPCS.", HR_IncNetMonthalySalary=".$INMS.", HR_Percent_IncNetMonthalySalary=".$PINMS.", HR_GrossMonthlySalary=".$GMS.", HR_GrossAnnualSalary=".$GAS." where EmpPmsId=".$PmsId." AND EmployeeID=".$EmpId, $con);

$sqlEmp=mysql_query("select hrm_employee.*,DepartmentId,DesigId,GradeId from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee.EmployeeId=".$EmpId, $con); $resEmp=mysql_fetch_assoc($sqlEmp);
$Ename = $resEmp['Fname'].' '.$resEmp['Sname'].' '.$resEmp['Lname'];
$sqlDep=mysql_query("select DepartmentName from hrm_department where DepartmentId=".$resEmp['DepartmentId'], $con); $resDep=mysql_fetch_assoc($sqlDep);
$sqlDes=mysql_query("select DesigName from hrm_designation where DesigId=".$resEmp['DesigId'], $con); $resDes=mysql_fetch_assoc($sqlDes);
$sqlG=mysql_query("select GradeValue from hrm_grade where GradeId=".$resEmp['GradeId'], $con); $resG=mysql_fetch_assoc($sqlG);
$sqlDes2=mysql_query("select DesigName from hrm_designation where DesigId=".$DesigId, $con); $resDes2=mysql_fetch_assoc($sqlDes2);
$sqlG2=mysql_query("select GradeValue from hrm_grade where GradeId=".$GradeId, $con); $resG2=mysql_fetch_assoc($sqlG2);

$sqlMax=mysql_query("SELECT MAX(SalaryChange_Date) as SalaryChDate FROM hrm_pms_appraisal_history where EmpCode=".$resEmp['EmpCode'], $con); 
$resMax = mysql_fetch_assoc($sqlMax); 
$sqlS = mysql_query("SELECT TotalProp_GSPM FROM hrm_pms_appraisal_history where SalaryChange_Date='".$resMax['SalaryChDate']."' AND EmpCode=".$resEmp['EmpCode'], $con);
$resS = mysql_fetch_assoc($sqlS);	 
	  
$sqlH=mysql_query("select * from hrm_pms_appraisal_history where EmpPmsId=".$PmsId." AND EmpCode=".$resEmp['EmpCode'], $con); $row=mysql_num_rows($sqlH);
if($row>0)
 { $sqlUp=mysql_query("update hrm_pms_appraisal_history set Current_Grade='".$resG['GradeValue']."', Proposed_Grade=".$resG2['GradeValue'].", Department='".$resDep['DepartmentName']."', Current_Designation='".$resDes['DesigName']."', Proposed_Designation='".$resDes2['DesigName']."', SalaryChange_Date='".$y."-".$m."-".$d."', Previous_GrossSalaryPM=".$resS['TotalProp_GSPM'].", Current_GrossSalaryPM=".$resS['TotalProp_GSPM'].", Proposed_GrossSalaryPM=".$PIS.", Prop_PeInc_GSPM=".$PPIS.", PropSalary_Correction=".$PCS.", TotalProp_GSPM=".$GMS.", TotalProp_PerInc_GSPM=".$PINMS.", Score=".$Score.", Rating=".$Rating." where EmpPmsId=".$PmsId." AND EmpCode=".$resEmp['EmpCode'], $con);

 }
if($row==0)
 { $sqlUp=mysql_query("insert into hrm_pms_appraisal_history(EmpPmsId, EmpCode, EmpName, Current_Grade, Proposed_Grade, Department, Current_Designation, Proposed_Designation, SalaryChange_Date, Previous_GrossSalaryPM, Current_GrossSalaryPM, Proposed_GrossSalaryPM, Prop_PeInc_GSPM, PropSalary_Correction, TotalProp_GSPM, TotalProp_PerInc_GSPM, Score, Rating) values(".$PmsId.", ".$resEmp['EmpCode'].", '".$Ename."', ".$resG['GradeValue'].", ".$resG2['GradeValue'].", '".$resDep['DepartmentName']."', '".$resDes['DesigName']."', '".$resDes2['DesigName']."', '".$y."-".$m."-".$d."', ".$resS['TotalProp_GSPM'].", ".$resS['TotalProp_GSPM'].", ".$PIS.", ".$PPIS.", ".$PCS.", ".$GMS.", ".$PINMS.", ".$Score.", ".$Rating.")", $con);
 
 

 } 
 
if($sqlUp){echo 'Data saved successfully!';}
}	
?>