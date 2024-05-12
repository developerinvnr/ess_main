<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}
//**********************************
$_SESSION['EmpID']=$_REQUEST['ID'];
$EMPID=$_SESSION['EmpID'];
//**********************************
if(isset($_POST['EditCtcE']))
{ 
$sql=mysql_query("select * from hrm_employee_ctc where EmployeeID=".$EMPID." AND CtcCreatedBy=0 AND Status='A' AND (Tot_CTC=0 OR Tot_CTC=0.00)", $con); $row=mysql_num_rows($sql); 
if($row>0)
{
  if($_POST['EmpInctv']==''){$_POST['EmpInctv']='N';}
  if($_POST['BasicStipend']=='B')
  { $sqlUp= mysql_query("UPDATE hrm_employee_ctc SET INCENTIVE='".$_POST['EmpInctv']."', CHILD_EDU_ALL_Value='".$_POST['EmpChildEduAllow']."', MED_REM_Value='".$_POST['EmpMediReim']."', LTA_Value='".$_POST['EmpLeaveTraAllow']."', CONV_Value='".$_POST['EmpConAllow']."', TA_Value='".$_POST['TA']."', BAS='Y', BAS_Value=".$_POST['EmpBasic'].", STIPEND='N', STIPEND_Value=0.00, HRA_Value='".$_POST['EmpHRA']."', CAR_ALL_Value='".$_POST['CAR_ALL_Value']."', Bonus_Month='".$_POST['Bonus_Month']."', SPECIAL_ALL_Value='".$_POST['EmpSpeAllow']."',  NetMonthSalary_Value='".$_POST['EmpNetMonSalary']."', GrossSalary_PostAnualComponent_Value='".$_POST['GMS_PAC']."', EmpActPf='".$_POST['ActPFCheck']."', EmpComActPf='".$_POST['ActComPFCheck']."', EmpBSActPf='".$_POST['BSActPfCheck']."', BONUS_Value='0', GRATUITY_Value='".$_POST['EmpEstiGratuity']."', Tot_GrossMonth='".$_POST['EmpGrossMonSalary']."', Tot_Gross_Annual='".$_POST['EmpAnnGrossSalary']."', PF_Employee_Contri_Value='".$_POST['EmpProviFund']."', PF_Employee_Contri_Annul='".$_POST['EmpEmployerPFContri']."', PF_Employer_Contri_Value='".$_POST['EmpProviFund']."', PF_Employer_Contri_Annul='".$_POST['EmpEmployerPFContri']."', Mediclaim_Policy='".$_POST['EmpMediPoliPremium']."', Tot_CTC='".$_POST['EmpTotalCtc']."', EmpAddBenifit_MediInsu_value='".$_POST['EmpAddBenifit_MediInsu']."',Car_Entitlement='".$_POST['Car_Entitlement']."', ESCI='".$_POST['EmpESCI']."', AnnualESCI='".$_POST['AnnualESCI']."', NPS_Value='".$_POST['NPS_Value']."', CtcCreatedBy=".$UserId.", Remark='".$_POST['Rmkk']."', CtcCreatedDate='".date("Y-m-d",strtotime($_POST['DateCTC']))."', CtcYearId=".$YearId.", SalChangeDate='".date("Y-m-d",strtotime($_POST['DateCTC']))."', SystDate='".date("Y-m-d")."' WHERE Status='A' AND EmployeeID=".$EMPID, $con); }

  if($_POST['BasicStipend']=='S')
  { $sqlUp= mysql_query("UPDATE hrm_employee_ctc SET INCENTIVE='".$_POST['EmpInctv']."', CHILD_EDU_ALL_Value='".$_POST['EmpChildEduAllow']."', MED_REM_Value='".$_POST['EmpMediReim']."', LTA_Value='".$_POST['EmpLeaveTraAllow']."', CONV_Value='".$_POST['EmpConAllow']."', TA_Value='".$_POST['TA']."', BAS='N', BAS_Value=0.00, STIPEND='Y', STIPEND_Value=".$_POST['EmpBasic'].", HRA_Value='".$_POST['EmpHRA']."', CAR_ALL_Value='".$_POST['CAR_ALL_Value']."', Bonus_Month='".$_POST['Bonus_Month']."', SPECIAL_ALL_Value='".$_POST['EmpSpeAllow']."',  NetMonthSalary_Value='".$_POST['EmpNetMonSalary']."', GrossSalary_PostAnualComponent_Value='".$_POST['GMS_PAC']."', EmpActPf='".$_POST['ActPFCheck']."', EmpComActPf='".$_POST['ActComPFCheck']."', EmpBSActPf='".$_POST['BSActPfCheck']."', BONUS_Value='0', GRATUITY_Value='".$_POST['EmpEstiGratuity']."', Tot_GrossMonth='".$_POST['EmpGrossMonSalary']."', Tot_Gross_Annual='".$_POST['EmpAnnGrossSalary']."', PF_Employee_Contri_Value='".$_POST['EmpProviFund']."', PF_Employee_Contri_Annul='".$_POST['EmpEmployerPFContri']."', PF_Employer_Contri_Value='".$_POST['EmpProviFund']."', PF_Employer_Contri_Annul='".$_POST['EmpEmployerPFContri']."', Mediclaim_Policy='".$_POST['EmpMediPoliPremium']."', Tot_CTC='".$_POST['EmpTotalCtc']."', EmpAddBenifit_MediInsu_value='".$_POST['EmpAddBenifit_MediInsu']."',Car_Entitlement='".$_POST['Car_Entitlement']."', ESCI='".$_POST['EmpESCI']."', BWageId='".$_POST['BWageId']."', NPS_Value='".$_POST['NPS_Value']."', AnnualESCI='".$_POST['AnnualESCI']."', CtcCreatedBy=".$UserId.", Remark='".$_POST['Rmkk']."', CtcCreatedDate='".date("Y-m-d",strtotime($_POST['DateCTC']))."', CtcYearId=".$YearId.", SalChangeDate='".date("Y-m-d",strtotime($_POST['DateCTC']))."', SystDate='".date("Y-m-d")."' WHERE Status='A' AND EmployeeID=".$EMPID, $con); } 
}
if($row==0)
{ 
  $sql2=mysql_query("select * from hrm_employee_ctc where EmployeeID=".$EMPID." AND Status='A' AND CtcCreatedDate='".date("Y-m-d")."'", $con); $row2=mysql_num_rows($sql2); 
  if($row2>0)
  { 
    if($_POST['EmpInctv']==''){$_POST['EmpInctv']='N';}
    if($_POST['BasicStipend']=='B')
  { $sqlUp= mysql_query("UPDATE hrm_employee_ctc SET INCENTIVE='".$_POST['EmpInctv']."', CHILD_EDU_ALL_Value='".$_POST['EmpChildEduAllow']."', MED_REM_Value='".$_POST['EmpMediReim']."', LTA_Value='".$_POST['EmpLeaveTraAllow']."', CONV_Value='".$_POST['EmpConAllow']."', TA_Value='".$_POST['TA']."', BAS='Y', BAS_Value=".$_POST['EmpBasic'].", STIPEND='N', STIPEND_Value=0.00, HRA_Value='".$_POST['EmpHRA']."', CAR_ALL_Value='".$_POST['CAR_ALL_Value']."', Bonus_Month='".$_POST['Bonus_Month']."', SPECIAL_ALL_Value='".$_POST['EmpSpeAllow']."',  NetMonthSalary_Value='".$_POST['EmpNetMonSalary']."', GrossSalary_PostAnualComponent_Value='".$_POST['GMS_PAC']."', EmpActPf='".$_POST['ActPFCheck']."', EmpComActPf='".$_POST['ActComPFCheck']."', EmpBSActPf='".$_POST['BSActPfCheck']."', BONUS_Value='0', GRATUITY_Value='".$_POST['EmpEstiGratuity']."', Tot_GrossMonth='".$_POST['EmpGrossMonSalary']."', Tot_Gross_Annual='".$_POST['EmpAnnGrossSalary']."', PF_Employee_Contri_Value='".$_POST['EmpProviFund']."', PF_Employee_Contri_Annul='".$_POST['EmpEmployerPFContri']."', PF_Employer_Contri_Value='".$_POST['EmpProviFund']."', PF_Employer_Contri_Annul='".$_POST['EmpEmployerPFContri']."', Mediclaim_Policy='".$_POST['EmpMediPoliPremium']."', Tot_CTC='".$_POST['EmpTotalCtc']."', EmpAddBenifit_MediInsu_value='".$_POST['EmpAddBenifit_MediInsu']."',Car_Entitlement='".$_POST['Car_Entitlement']."', ESCI='".$_POST['EmpESCI']."', BWageId='".$_POST['BWageId']."', NPS_Value='".$_POST['NPS_Value']."', AnnualESCI='".$_POST['AnnualESCI']."', Remark='".$_POST['Rmkk']."', CtcCreatedBy=".$UserId.", CtcCreatedDate='".date("Y-m-d",strtotime($_POST['DateCTC']))."', CtcYearId=".$YearId.", SalChangeDate='".date("Y-m-d",strtotime($_POST['DateCTC']))."', SystDate='".date("Y-m-d")."' WHERE Status='A' AND EmployeeID=".$EMPID, $con); }

  if($_POST['BasicStipend']=='S')
  { $sqlUp= mysql_query("UPDATE hrm_employee_ctc SET INCENTIVE='".$_POST['EmpInctv']."', CHILD_EDU_ALL_Value='".$_POST['EmpChildEduAllow']."', MED_REM_Value='".$_POST['EmpMediReim']."', LTA_Value='".$_POST['EmpLeaveTraAllow']."', CONV_Value='".$_POST['EmpConAllow']."', TA_Value='".$_POST['TA']."', BAS='N', BAS_Value=0.00, STIPEND='Y', STIPEND_Value=".$_POST['EmpBasic'].", HRA_Value='".$_POST['EmpHRA']."', CAR_ALL_Value='".$_POST['CAR_ALL_Value']."', Bonus_Month='".$_POST['Bonus_Month']."', SPECIAL_ALL_Value='".$_POST['EmpSpeAllow']."',  NetMonthSalary_Value='".$_POST['EmpNetMonSalary']."', GrossSalary_PostAnualComponent_Value='".$_POST['GMS_PAC']."', EmpActPf='".$_POST['ActPFCheck']."', EmpComActPf='".$_POST['ActComPFCheck']."', EmpBSActPf='".$_POST['BSActPfCheck']."', BONUS_Value='0', GRATUITY_Value='".$_POST['EmpEstiGratuity']."', Tot_GrossMonth='".$_POST['EmpGrossMonSalary']."', Tot_Gross_Annual='".$_POST['EmpAnnGrossSalary']."', PF_Employee_Contri_Value='".$_POST['EmpProviFund']."', PF_Employee_Contri_Annul='".$_POST['EmpEmployerPFContri']."', PF_Employer_Contri_Value='".$_POST['EmpProviFund']."', PF_Employer_Contri_Annul='".$_POST['EmpEmployerPFContri']."', Mediclaim_Policy='".$_POST['EmpMediPoliPremium']."', Tot_CTC='".$_POST['EmpTotalCtc']."', EmpAddBenifit_MediInsu_value='".$_POST['EmpAddBenifit_MediInsu']."',Car_Entitlement='".$_POST['Car_Entitlement']."', ESCI='".$_POST['EmpESCI']."', BWageId='".$_POST['BWageId']."', NPS_Value='".$_POST['NPS_Value']."', AnnualESCI='".$_POST['AnnualESCI']."', Remark='".$_POST['Rmkk']."', CtcCreatedBy=".$UserId.", CtcCreatedDate='".date("Y-m-d",strtotime($_POST['DateCTC']))."', CtcYearId=".$YearId.", SalChangeDate='".date("Y-m-d",strtotime($_POST['DateCTC']))."', SystDate='".date("Y-m-d")."' WHERE Status='A' AND EmployeeID=".$EMPID, $con); } 
  }
  if($row2==0)
  {
   $sqlU= mysql_query("UPDATE hrm_employee_ctc SET Status='D' where EmployeeID=".$EMPID, $con);
   if($_POST['EmpInctv']==''){$_POST['EmpInctv']='N';}
   if($_POST['BasicStipend']=='B')
   { $sqlUp= mysql_query("insert into hrm_employee_ctc(EmployeeID, EC, INCENTIVE, CHILD_EDU_ALL_Value, MED_REM_Value, LTA_Value, CONV_Value, TA_Value, BAS, BAS_Value, STIPEND, STIPEND_Value, HRA_Value, CAR_ALL_Value, Bonus_Month, SPECIAL_ALL_Value, NetMonthSalary_Value, GrossSalary_PostAnualComponent_Value, EmpActPf, EmpComActPf, EmpBSActPf, BONUS_Value, GRATUITY_Value, Tot_GrossMonth, Tot_Gross_Annual, PF_Employee_Contri_Value, PF_Employee_Contri_Annul, PF_Employer_Contri_Value, PF_Employer_Contri_Annul, Mediclaim_Policy, Tot_CTC, EmpAddBenifit_MediInsu_value, Car_Entitlement, ESCI, BWageId, NPS_Value, AnnualESCI, Status, Remark, CtcCreatedBy, CtcCreatedDate, CtcYearId, SalChangeDate, SystDate) values(".$EMPID.", ".$_POST['EmpCode'].", '".$_POST['EmpInctv']."', '".$_POST['EmpChildEduAllow']."', '".$_POST['EmpMediReim']."', '".$_POST['EmpLeaveTraAllow']."', '".$_POST['EmpConAllow']."', '".$_POST['TA']."', 'Y', ".$_POST['EmpBasic'].", 'N', 0.00, '".$_POST['EmpHRA']."', '".$_POST['CAR_ALL_Value']."', '".$_POST['Bonus_Month']."', '".$_POST['EmpSpeAllow']."',  '".$_POST['EmpNetMonSalary']."', '".$_POST['GMS_PAC']."', '".$_POST['ActPFCheck']."', '".$_POST['ActComPFCheck']."', '".$_POST['BSActPfCheck']."', '0', '".$_POST['EmpEstiGratuity']."', '".$_POST['EmpGrossMonSalary']."', '".$_POST['EmpAnnGrossSalary']."', '".$_POST['EmpProviFund']."', '".$_POST['EmpEmployerPFContri']."', '".$_POST['EmpProviFund']."', '".$_POST['EmpEmployerPFContri']."', '".$_POST['EmpMediPoliPremium']."', '".$_POST['EmpTotalCtc']."', '".$_POST['EmpAddBenifit_MediInsu']."','".$_POST['Car_Entitlement']."', '".$_POST['EmpESCI']."', '".$_POST['BWageId']."', '".$_POST['NPS_Value']."', '".$_POST['AnnualESCI']."', 'A', '".$_POST['Rmkk']."', ".$UserId.", '".date("Y-m-d",strtotime($_POST['DateCTC']))."', ".$YearId.", '".date("Y-m-d",strtotime($_POST['DateCTC']))."', '".date("Y-m-d")."')", $con); }

  if($_POST['BasicStipend']=='S')
  { $sqlUp= mysql_query("insert into hrm_employee_ctc(EmployeeID, EC, INCENTIVE, CHILD_EDU_ALL_Value, MED_REM_Value, LTA_Value, CONV_Value, TA_Value, BAS, BAS_Value, STIPEND, STIPEND_Value, HRA_Value, CAR_ALL_Value, Bonus_Month, SPECIAL_ALL_Value, NetMonthSalary_Value, GrossSalary_PostAnualComponent_Value, EmpActPf, EmpComActPf, EmpBSActPf, BONUS_Value, GRATUITY_Value, Tot_GrossMonth, Tot_Gross_Annual, PF_Employee_Contri_Value, PF_Employee_Contri_Annul, PF_Employer_Contri_Value, PF_Employer_Contri_Annul, Mediclaim_Policy, Tot_CTC, EmpAddBenifit_MediInsu_value, Car_Entitlement, ESCI, BWageId, NPS_Value, AnnualESCI, Status, Remark, CtcCreatedBy, CtcCreatedDate, CtcYearId, SalChangeDate, SystDate) values(".$EMPID.", ".$_POST['EmpCode'].", '".$_POST['EmpInctv']."', '".$_POST['EmpChildEduAllow']."', '".$_POST['EmpMediReim']."', '".$_POST['EmpLeaveTraAllow']."', '".$_POST['EmpConAllow']."', '".$_POST['TA']."', 'N', 0.00, 'Y', ".$_POST['EmpBasic'].", '".$_POST['EmpHRA']."', '".$_POST['CAR_ALL_Value']."', '".$_POST['Bonus_Month']."', '".$_POST['EmpSpeAllow']."',  '".$_POST['EmpNetMonSalary']."', '".$_POST['GMS_PAC']."', '".$_POST['ActPFCheck']."', '".$_POST['ActComPFCheck']."', '".$_POST['BSActPfCheck']."', '0', '".$_POST['EmpEstiGratuity']."', '".$_POST['EmpGrossMonSalary']."', '".$_POST['EmpAnnGrossSalary']."', '".$_POST['EmpProviFund']."', '".$_POST['EmpEmployerPFContri']."', '".$_POST['EmpProviFund']."', '".$_POST['EmpEmployerPFContri']."', '".$_POST['EmpMediPoliPremium']."', '".$_POST['EmpTotalCtc']."', '".$_POST['EmpAddBenifit_MediInsu']."','".$_POST['Car_Entitlement']."', '".$_POST['EmpESCI']."', '".$_POST['BWageId']."', '".$_POST['NPS_Value']."', '".$_POST['AnnualESCI']."', 'A', ".$UserId.", '".$_POST['Rmkk']."', '".date("Y-m-d",strtotime($_POST['DateCTC']))."', ".$YearId.", '".date("Y-m-d",strtotime($_POST['DateCTC']))."', '".date("Y-m-d")."')", $con); }
  }
}

/********************************************************** History Open*******************************************************/ 
if($sqlUp)
{ 
  $SqlE = mysql_query("select Fname,Sname,Lname,DepartmentId,DesigId,GradeId from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee.EmployeeID=".$EMPID, $con); $ResE=mysql_fetch_assoc($SqlE);
  $EnameE = $ResE['Fname'].' '.$ResE['Sname'].' '.$ResE['Lname']; 
  $sqlEDept = mysql_query("select DepartmentName from hrm_department where DepartmentId=".$ResE['DepartmentId'], $con); $resEDept=mysql_fetch_assoc($sqlEDept);
  $sqlEDe=mysql_query("select DesigName from hrm_designation where DesigId=".$ResE['DesigId'], $con); $resEDe=mysql_fetch_assoc($sqlEDe);
  $sqlEGr=mysql_query("select GradeValue from hrm_grade where GradeId=".$ResE['GradeId']." AND CompanyId=".$CompanyId, $con); $resEGr=mysql_fetch_assoc($sqlEGr);

  $sqlHC = mysql_query("SELECT MAX(SalaryChange_Date) as SalaryChD FROM hrm_pms_appraisal_history where EmpCode=".$_POST['EmpCode']." AND SalaryChange_Date!='".date("Y-m-d",strtotime($_POST['DateCTC']))."' AND CompanyId=".$CompanyId, $con); $resHC = mysql_fetch_assoc($sqlHC); 
  $sqlMax = mysql_query("SELECT Current_GrossSalaryPM,Proposed_GrossSalaryPM,TotalProp_GSPM FROM hrm_pms_appraisal_history where SalaryChange_Date='".$resHC['SalaryChD']."' AND EmpCode=".$_POST['EmpCode']." AND CompanyId=".$CompanyId, $con); $resMax = mysql_fetch_assoc($sqlMax);
  
  if($resMax['Proposed_GrossSalaryPM']>0){ $OldGross=$resMax['Proposed_GrossSalaryPM']; }else{ $OldGross==$resMax['Current_GrossSalaryPM'];}
  
  $sqlHis=mysql_query("select * from hrm_pms_appraisal_history where EmpCode=".$_POST['EmpCode']." AND SalaryChange_Date='".date("Y-m-d",strtotime($_POST['DateCTC']))."' AND CompanyId=".$CompanyId, $con); 
  $rowHis=mysql_num_rows($sqlHis); 
  if($rowHis>0)
  { 
      
     
    $sqlUhis=mysql_query("update hrm_pms_appraisal_history set EmpPmsId=0, EmpCode=".$_POST['EmpCode'].", EmpName='".$EnameE."', Current_Grade='".$resEGr['GradeValue']."', Proposed_Grade='".$resEGr['GradeValue']."', Department='".$resEDept['DepartmentName']."', Current_Designation='".$resEDe['DesigName']."', Proposed_Designation='".$resEDe['DesigName']."', Salary_Basic='".$_POST['EmpBasic']."', Salary_HRA='".$_POST['EmpHRA']."', Salary_CA='".$_POST['EmpConAllow']."', Salary_TA='".$_POST['TA']."', Car_Allowance='".$_POST['CAR_ALL_Value']."', Salary_SA='".$_POST['EmpSpeAllow']."', Previous_GrossSalaryPM='".$OldGross."', Current_GrossSalaryPM='".$OldGross."', Proposed_GrossSalaryPM=0, BonusAnnual_September='".$_POST['EmpBonusExg']."', Prop_PeInc_GSPM=0, PropSalary_Correction=0, TotalProp_GSPM='".$_POST['EmpGrossMonSalary']."', TotalProp_PerInc_GSPM=0, Score=0, Rating=0, SystemDate='".date("Y-m-d")."' where EmpCode=".$_POST['EmpCode']." AND SalaryChange_Date='".date("Y-m-d",strtotime($_POST['DateCTC']))."' AND CompanyId=".$CompanyId, $con); 
  }
  if($rowHis==0)
  { 
    $sqlUhis=mysql_query("insert into hrm_pms_appraisal_history(EmpPmsId, EmpCode, EmpName, Current_Grade, Proposed_Grade, Department, Current_Designation, Proposed_Designation, SalaryChange_Date, Salary_Basic, Salary_HRA, Salary_CA, Salary_TA, Car_Allowance, Salary_SA, Previous_GrossSalaryPM, Current_GrossSalaryPM, Proposed_GrossSalaryPM, BonusAnnual_September, Prop_PeInc_GSPM, PropSalary_Correction, TotalProp_GSPM, TotalProp_PerInc_GSPM, Score, Rating, CompanyId, YearId, SystemDate) values(0, ".$_POST['EmpCode'].", '".$EnameE."', '".$resEGr['GradeValue']."', '".$resEGr['GradeValue']."', '".$resEDept['DepartmentName']."', '".$resEDe['DesigName']."', '".$resEDe['DesigName']."', '".date("Y-m-d",strtotime($_POST['DateCTC']))."', '".$_POST['EmpBasic']."', '".$_POST['EmpHRA']."', '".$_POST['EmpConAllow']."', '".$_POST['TA']."', '".$_POST['CAR_ALL_Value']."', '".$_POST['EmpSpeAllow']."', '".$OldGross."', '".$OldGross."', 0, '".$_POST['EmpBonusExg']."', 0, 0, '".$_POST['EmpGrossMonSalary']."', 0, 0, 0, ".$CompanyId.", ".$YearId.", '".date("Y-m-d")."')", $con);
  }
}
/********************************************************** History Close *******************************************************/
if($sqlUp) {$msg = "data has been Updated successfully..."; }
}
?> 
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php include_once('../Title.php'); ?></title>

<link type="text/css" href="css/body.css" rel="stylesheet"/>
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<link rel="stylesheet" type="text/css" href="src/css/jscal2.css"/>
<link rel="stylesheet" type="text/css" href="src/css/border-radius.css"/>
<link rel="stylesheet" type="text/css" href="src/css/steel/steel.css"/>
<script type="text/javascript" src="src/js/jscal2.js"></script>
<script type="text/javascript" src="src/js/lang/en.js"></script>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<script type="text/javascript" src="js/EmpMasterAddNewAjaxCall.js"></script>
<Script type="text/javascript">window.history.forward(1);</script>
<script language="javascript">
function EditCtc()
{
document.getElementById("EditCtcE").style.display = 'block'; document.getElementById("ChangeCtc").style.display = 'none'; 

document.getElementById("DateCTC").value=document.getElementById("DateHide").value;

document.getElementById("BasicStipend").disabled = false; document.getElementById("EmpBasic").readOnly = false; document.getElementById("CheckHRA").disabled = false; document.getElementById("EmpBasic").readOnly = false; document.getElementById("EmpGrossMonSalary").readOnly = true; document.getElementById("CheckMPP").disabled = false; document.getElementById("CheckMIC").disabled = false; document.getElementById("CheckLTA").disabled = false; document.getElementById("CheckCEA").disabled = false; document.getElementById("CheckMIC").disabled = false; document.getElementById("EmpGrossMonSalary").readOnly = false; document.getElementById("EmpInctv").disabled = false; document.getElementById("CheckCarEnt").disabled = false; document.getElementById("f_btn1").disabled = false; document.getElementById("CheckESCI").disabled = false; document.getElementById("CheckBonus").disabled = false; 
 document.getElementById("NPS_Value").readOnly=false;
 document.getElementById("Bonus_Month").readOnly = false; document.getElementById("CheckHRA").disabled = false;
 document.getElementById("CheckTA").disabled = false;
 document.getElementById("EmpESCI").readOnly=false; document.getElementById("CheckCarAllow").disabled=false; document.getElementById("CheckSA").disabled=false; document.getElementById("EmpActPf").disabled = false; document.getElementById("EmpComActPf").disabled = false; document.getElementById("EmpBSActPf").disabled = false;  document.getElementById("TA").disabled = false; document.getElementById("CBns").disabled = false; 
  
//document.getElementById("CheckCA").disabled = false; document.getElementById("CheckMR").disabled = false;
} 

function FunCheckSA()
{ if(document.getElementById("CheckSA").checked==true){ document.getElementById("EmpSpeAllow").readOnly=false; } else if(document.getElementById("CheckSA").checked==false){ document.getElementById("EmpSpeAllow").readOnly=true;} }

function FunTA() 
{if(document.getElementById("CheckTA").checked==true){document.getElementById("TA").readOnly=false;}
else if(document.getElementById("CheckTA").checked==false){document.getElementById("TA").readOnly=true;} }

function FunCarAllow()
{
if(document.getElementById("CheckCarAllow").checked==true){document.getElementById("CAR_ALL_Value").readOnly=false;}
else if(document.getElementById("CheckCarAllow").checked==false){document.getElementById("CAR_ALL_Value").readOnly=true;}
}

function ChangeCarAllow()
{
  var Car_Allow=parseFloat(document.getElementById("CAR_ALL_Value").value);
  var VEmpSpeAllow = parseFloat(document.getElementById("EmpSpeAllow").value); 
  document.getElementById("EmpSpeAllow").value=Math.round((VEmpSpeAllow-Car_Allow)*100)/100;
 
 //var Car_Allow=parseFloat(document.getElementById("CAR_ALL_Value").value);
 //var GrossS=parseFloat(document.getElementById("EmpGrossMonSalary").value);
 //document.getElementById("EmpGrossMonSalary").value=Math.round((GrossS+Car_Allow)*100)/100;
 //GrossSalary(); FunCheckESCI(); //FunMR(); FunLTA(); FunCEA(); ClickCBns();
}


function CheckEmpActPf()
{ 
  if(document.getElementById("EmpActPf").checked==true)
  {
  
   document.getElementById("EmpComActPf").checked=false; document.getElementById("ActComPFCheck").value='N';
   document.getElementById("ActPFCheck").value='Y';
   var bs = parseFloat(document.getElementById("EmpBasic").value);
   var pf = parseFloat(document.getElementById("EmpProviFund").value);
   var sp = parseFloat(document.getElementById("EmpSpeAllow").value);
   var gross = parseFloat(document.getElementById("EmpGrossMonSalary").value);
   var pacgross = parseFloat(document.getElementById("GMS_PAC").value);
   var netsal = parseFloat(document.getElementById("EmpNetMonSalary").value);
   var gross_annual = parseFloat(document.getElementById("EmpAnnGrossSalary").value);
   var ComPfContbAnnual = parseFloat(document.getElementById("EmpEmployerPFContri").value);
   var ctc = parseFloat(document.getElementById("EmpTotalCtc").value);
  
   document.getElementById("EppBasic").value=bs;
   document.getElementById("EppProviFund").value=pf;
   document.getElementById("EppSpeAllow").value=sp;
   document.getElementById("EppGrossMonSalary").value=gross;
   document.getElementById("EppGMS_PAC").value=pacgross;
   document.getElementById("EppNetMonSalary").value=netsal;
   document.getElementById("EppAnnGrossSalary").value=gross_annual;
   document.getElementById("EppEmployerPFContri").value=ComPfContbAnnual;
   document.getElementById("EppTotalCtc").value=ctc;
   
   //var Ac_Pf=Math.round(((bs*12)/100)*100)/100; alert(Ac_Pf);
   var Ac_Pf=Math.round((bs*12)/100); //alert(Ac_Pf);
   if(Ac_Pf>pf)
   {
    document.getElementById("EmpProviFund").value=Ac_Pf;
    var diffpf=Math.round((Ac_Pf-pf)*100)/100;
    var Ac_Sp=document.getElementById("EmpSpeAllow").value=Math.round((sp-diffpf)*100)/100;
    var Ac_Gross=document.getElementById("EmpGrossMonSalary").value=Math.round((gross-diffpf)*100)/100;
    var Ac_pac_Gross=document.getElementById("GMS_PAC").value=Math.round((pacgross-diffpf)*100)/100;
   
    //var Ac_NetSal=document.getElementById("EmpNetMonSalary").value=Math.round((netsal-diffpf)*100)/100; 
    var Ac_NetSal=document.getElementById("EmpNetMonSalary").value=Math.round((netsal-(diffpf*2))*100)/100;
   
    var Ac_Gross_Annual=document.getElementById("EmpAnnGrossSalary").value=Math.round((Ac_Gross*12)*100)/100;
    var Ac_Employer_PfContb=document.getElementById("EmpEmployerPFContri").value=Math.round((ComPfContbAnnual+(diffpf*12))*100)/100;
    //var Ac_ctc=document.getElementById("EmpTotalCtc").value=Math.round((ctc+(diffpf*12))*100)/100;
    //document.getElementById("Employer_ExtraPF_Annual").value=Math.round((diffpf*12)*100)/100;
   } 
    
  }
  else if(document.getElementById("EmpActPf").checked==false)
  { 
   document.getElementById("ActPFCheck").value='N';
   /*var bs = parseFloat(document.getElementById("EppBasic").value); 
   var pf = parseFloat(document.getElementById("EppProviFund").value);
   var sp = parseFloat(document.getElementById("EppSpeAllow").value);
   var gross = parseFloat(document.getElementById("EppGrossMonSalary").value);
   var pacgross = parseFloat(document.getElementById("EppGMS_PAC").value);
   var netsal = parseFloat(document.getElementById("EppNetMonSalary").value);
   var gross_annual = parseFloat(document.getElementById("EppAnnGrossSalary").value);
   var ComPfContbAnnual = parseFloat(document.getElementById("EppEmployerPFContri").value);
   var ctc = parseFloat(document.getElementById("EppTotalCtc").value);
   
   document.getElementById("EmpBasic").value=bs;
   document.getElementById("EmpProviFund").value=pf;
   document.getElementById("EmpSpeAllow").value=sp;
   document.getElementById("EmpGrossMonSalary").value=gross;
   document.getElementById("GMS_PAC").value=pacgross;
   document.getElementById("EmpNetMonSalary").value=netsal;
   document.getElementById("EmpAnnGrossSalary").value=gross_annual;
   document.getElementById("EmpEmployerPFContri").value=ComPfContbAnnual;
   document.getElementById("EmpTotalCtc").value=ctc; 

   document.getElementById("Employer_ExtraPF_Annual").value=0;*/
  }
     
}  


function CheckEmpComActPf()
{ 
  if(document.getElementById("EmpComActPf").checked==true || document.getElementById("EmpActPf").checked==true)
  {
  
   document.getElementById("EmpActPf").checked=false; document.getElementById("ActPFCheck").value='N';
   document.getElementById("ActComPFCheck").value='Y';
   var bs = parseFloat(document.getElementById("EmpBasic").value);
   var pf = parseFloat(document.getElementById("EmpProviFund").value);
   var sp = parseFloat(document.getElementById("EmpSpeAllow").value);
   var gross = parseFloat(document.getElementById("EmpGrossMonSalary").value);
   var pacgross = parseFloat(document.getElementById("GMS_PAC").value);
   var netsal = parseFloat(document.getElementById("EmpNetMonSalary").value);
   var gross_annual = parseFloat(document.getElementById("EmpAnnGrossSalary").value);
   var ComPfContbAnnual = parseFloat(document.getElementById("EmpEmployerPFContri").value);
   var ctc = parseFloat(document.getElementById("EmpTotalCtc").value);
  
   document.getElementById("EppBasic").value=bs;
   document.getElementById("EppProviFund").value=pf;
   document.getElementById("EppSpeAllow").value=sp;
   document.getElementById("EppGrossMonSalary").value=gross;
   document.getElementById("EppGMS_PAC").value=pacgross;
   document.getElementById("EppNetMonSalary").value=netsal;
   document.getElementById("EppAnnGrossSalary").value=gross_annual;
   document.getElementById("EppEmployerPFContri").value=ComPfContbAnnual;
   document.getElementById("EppTotalCtc").value=ctc;
   
   
   var Ac_Pf=Math.round((bs*12)/100); 
   if(Ac_Pf>pf)
   {
    document.getElementById("EmpProviFund").value=Ac_Pf;
    var diffpf=Math.round((Ac_Pf-pf)*100)/100;
    //var Ac_Sp=document.getElementById("EmpSpeAllow").value=Math.round((sp-diffpf)*100)/100;
    var Ac_NetSal=document.getElementById("EmpNetMonSalary").value=Math.round((netsal-diffpf)*100)/100; 
    var Ac_Employer_PfContb=document.getElementById("EmpEmployerPFContri").value=Math.round((ComPfContbAnnual+(diffpf*12))*100)/100;
    var Ac_ctc=document.getElementById("EmpTotalCtc").value=Math.round((ctc+(diffpf*12))*100)/100;
   } 
    
  }
  else if(document.getElementById("EmpComActPf").checked==false)
  { 
   document.getElementById("ActComPFCheck").value='N';
  }
     
}  


function CheckEmpBSActPf()
{ 
  if(document.getElementById("EmpBSActPf").checked==true)
  {
    document.getElementById("BSActPfCheck").value='Y';
   
    var bs = parseFloat(document.getElementById("EmpBasic").value);
	var sp = parseFloat(document.getElementById("EmpSpeAllow").value);
    var pf = parseFloat(document.getElementById("EmpProviFund").value);
    var netsal = parseFloat(document.getElementById("EmpNetMonSalary").value);
    var ComPfContbAnnual = parseFloat(document.getElementById("EmpEmployerPFContri").value);
    var ctc = parseFloat(document.getElementById("EmpTotalCtc").value);
  
    document.getElementById("EppBasic").value=bs;
    document.getElementById("EppProviFund").value=pf;
    document.getElementById("EppNetMonSalary").value=netsal;
    document.getElementById("EppEmployerPFContri").value=ComPfContbAnnual;
    document.getElementById("EppTotalCtc").value=ctc; 
   
    var TotSalBS=Math.round((bs+sp)*100)/100;
	if(TotSalBS<=15000){ var Ac_Pf=Math.round(((bs+sp)*12)/100); }
	else { var Ac_Pf=1800; }
	
    document.getElementById("EmpProviFund").value=Ac_Pf;
    var diffpf=Math.round((Ac_Pf-pf)*100)/100;
    var Ac_NetSal=document.getElementById("EmpNetMonSalary").value=Math.round((netsal-diffpf)*100)/100;
    var Ac_Employer_PfContb=document.getElementById("EmpEmployerPFContri").value=Math.round((ComPfContbAnnual+(diffpf*12))*100)/100;
    var Act_ctc = document.getElementById("EmpTotalCtc").value=Math.round((ctc+(diffpf*12))*100)/100;
    
  }
  else if(document.getElementById("EmpBSActPf").checked==false)
  { 
    document.getElementById("BSActPfCheck").value='N';
    document.getElementById("EmpProviFund").value=document.getElementById("EppProviFund").value;
    document.getElementById("EmpNetMonSalary").value=document.getElementById("EppNetMonSalary").value;
    document.getElementById("EmpEmployerPFContri").value=document.getElementById("EppEmployerPFContri").value;
    document.getElementById("EmpTotalCtc").value=document.getElementById("EppTotalCtc").value;
  }
     
}  





function GrossSalary()
{  var ComId = document.getElementById("ComId").value; 
var VGrossSalary = parseFloat(document.getElementById("EmpGrossMonSalary").value); var VEmpBasic = parseFloat(document.getElementById("EmpBasic").value); var VEmpHRA = parseFloat(document.getElementById("EmpHRA").value); var VEmpConAllow = parseFloat(document.getElementById("EmpConAllow").value); var VEmpSpeAllow = parseFloat(document.getElementById("EmpSpeAllow").value); var VEmpProviFund = parseFloat(document.getElementById("EmpProviFund").value); var VEmpNetMonSalary = parseFloat(document.getElementById("EmpNetMonSalary").value); var VEmpMediReim = parseFloat(document.getElementById("EmpMediReim").value); var VEmpLeaveTraAllow = parseFloat(document.getElementById("EmpLeaveTraAllow").value); var VEmpChildEduAllow = parseFloat(document.getElementById("EmpChildEduAllow").value); var VEmpAnnGrossSalary = parseFloat(document.getElementById("EmpAnnGrossSalary").value); var VEmpBonusExg = parseFloat(document.getElementById("EmpBonusExg").value); var VEmpEstiGratuity = parseFloat(document.getElementById("EmpEstiGratuity").value); var VEmpEmployerPFContri = parseFloat(document.getElementById("EmpEmployerPFContri").value); var VEmpMediPoliPremium = parseFloat(document.getElementById("EmpMediPoliPremium").value); var VEmptotalCtc = parseFloat(document.getElementById("EmpTotalCtc").value); var VEmpAddBenifit_MediInsu = parseFloat(document.getElementById("EmpAddBenifit_MediInsu").value); var VPf_MaxSalPf = parseFloat(document.getElementById("Pf_MaxSalPf").value); var VGrossMonSalary_PAC = parseFloat(document.getElementById("GrossMonSalary_PAC").value); var VGMS_PAC = parseFloat(document.getElementById("GMS_PAC").value); var VB_MaxBonus = parseFloat(document.getElementById("MaxBonus").value); var VTotBasHraCon = parseFloat(document.getElementById("TotBasHraCon").value); var VTotAnnualBasic = parseFloat(document.getElementById("TotAnnualBasic").value); var VOneDayBasic = parseFloat(document.getElementById("OneDayBasic").value);  var VMaxGrtuityDay = parseFloat(document.getElementById("MaxGrtuityDay").value); var VStrBonusContri = parseFloat(document.getElementById("StrBonusContri").value); var VConvance = parseFloat(document.getElementById("Convance").value); var VEmp_MPP = parseFloat(document.getElementById("Emp_MPP").value); var MCS = parseFloat(document.getElementById("MCS").value); var MCSSP = parseFloat(document.getElementById("MCSSP").value); var EmpAddBenifit_MediInsu = parseFloat(document.getElementById("EmpAddBenifit_MediInsu").value); var D2=document.getElementById("D2").value; var P2=document.getElementById("P2").value; var DeId=document.getElementById("DeId").value; var VTA = parseFloat(document.getElementById("TA").value); 

var BonusAmt=parseFloat(document.getElementById("BonusAmt").value);

if(VGrossSalary<=42000) //if(VGrossSalary<=52500)
{ 
    
    if(ComId==1 || ComId==2){ var BonusM = Math.round(((BonusAmt*20)/100)*100)/100; }
    else if(ComId==3){ var BonusM = Math.round(((BonusAmt*8.33)/100)*100)/100; }
    var BonusY = Math.round((BonusM*12)*100)/100; 
    
    //var BonusM = Math.round(((BonusAmt*20)/100)*100)/100; var BonusY = Math.round((BonusM*12)*100)/100; 
    
}
else { var BonusM=0; var BonusY=0; }
var BonusM = document.getElementById("Bonus_Month").value=BonusM; <!--Bonus-->
var CAR_ALL = parseFloat(document.getElementById("CAR_ALL_Value").value); <!--Car Allow-->

//var VGrossForBasic=Math.round((VGrossSalary-(BonusM+CAR_ALL))*100)/100; 
var VGrossForBasic=Math.round((VGrossSalary)*100)/100;

var GS_PAC = document.getElementById("GrossMonSalary_PAC").value=Math.round((VGrossSalary)*100)/100;  
var GMS_PAC = document.getElementById("GMS_PAC").value=Math.round((VGrossSalary)*100)/100; 



/*
var Cal_EmpBasic = document.getElementById("EmpBasic").value=Math.round((((VGrossForBasic*50)/100)*100)/100,0); 
var Cal_LimitPFbasic = document.getElementById("LimitPFbasic").value=Math.round((((VPf_MaxSalPf*50)/100)*100)/100,0);
var Cal_EmpHRA = document.getElementById("EmpHRA").value=Math.round((((Cal_EmpBasic*40)/100)*100)/100,0);
var Cal_EmpConAllow = document.getElementById("EmpConAllow").value=0; //Math.round((VConvance)*100)/100
var Cal_TotBasHraCon = document.getElementById("TotBasHraCon").value=Math.round((Cal_EmpBasic+Cal_EmpHRA+Cal_EmpConAllow+VTA+BonusM+CAR_ALL)*100)/100;
var Cal_EmpSpeAllow = document.getElementById("EmpSpeAllow").value=Math.round((VGrossSalary-Cal_TotBasHraCon)*100)/100;

if ((ComId==1 || ComId==3) && Cal_EmpBasic<=VPf_MaxSalPf) { var Cal_EmpProviFund = document.getElementById("EmpProviFund").value=Math.round((((Cal_EmpBasic*12)/100)*100)/100,0); }
else if ((ComId==1 || ComId==3) && Cal_EmpBasic>VPf_MaxSalPf) { var Cal_EmpProviFund = document.getElementById("EmpProviFund").value=Math.round((((VPf_MaxSalPf*12)/100)*100)/100,0); }
else if (ComId==2 && Cal_EmpBasic<=VPf_MaxSalPf) { var Cal_EmpProviFund = document.getElementById("EmpProviFund").value=0; }
else if (ComId==2 && Cal_EmpBasic>VPf_MaxSalPf) { var Cal_EmpProviFund = document.getElementById("EmpProviFund").value=0; }
//else if (ComId==3 && Cal_EmpBasic<=VPf_MaxSalPf) { var Cal_EmpProviFund = document.getElementById("EmpProviFund").value=0; }
//else if (ComId==3 && Cal_EmpBasic>VPf_MaxSalPf) { var Cal_EmpProviFund = document.getElementById("EmpProviFund").value=0; }


*/

/*****************************/
 var Cal_LimitPFbasic = document.getElementById("LimitPFbasic").value=Math.round((((VPf_MaxSalPf*50)/100)*100)/100,0);
 
 if(VGrossForBasic>15050 && VGrossForBasic<=30000) ////PFGross<=37500 for 40%
 {
 
  var AvlGross=Math.round(((VGrossForBasic-BonusM)*100)/100,0);
  if(AvlGross<15050)
  {
   var Cal_EmpBasic = document.getElementById("EmpBasic").value=Math.round(((VGrossForBasic-BonusM)*100)/100,0);
   var ChkHRA=0;
  }
  else
  { 
   var Cal_EmpBasic = document.getElementById("EmpBasic").value=15050; 
   var ChkHRA=Math.round((((Cal_EmpBasic*40)/100)*100)/100,0);
  }
  
  var TotBH=Math.round(((Cal_EmpBasic+ChkHRA)*100)/100,0);
  <!-- HRA Con Special -->
  
  if(TotBH<=AvlGross){ var Cal_EmpHRA = document.getElementById("EmpHRA").value=ChkHRA; }
  else{ var Cal_EmpHRA = document.getElementById("EmpHRA").value=Math.round(((AvlGross-Cal_EmpBasic)*100)/100,0); }
  
  var Cal_EmpConAllow = document.getElementById("EmpConAllow").value=0;
  var Cal_TotBasHraCon = document.getElementById("TotBasHraCon").value=Math.round((Cal_EmpBasic+Cal_EmpHRA+Cal_EmpConAllow+CAR_ALL+BonusM)*100)/100;
  
  if(Cal_TotBasHraCon<=VGrossForBasic)
  { var Cal_EmpSpeAllow = document.getElementById("EmpSpeAllow").value=Math.round((VGrossForBasic-Cal_TotBasHraCon)*100)/100; }
  else{ var Cal_EmpSpeAllow = document.getElementById("EmpSpeAllow").value=0; }
  
 } //if(PFGross>15050 && PFGross<=30000)
 else if(VGrossForBasic<=15050)
 {
  var Cal_EmpBasic = document.getElementById("EmpBasic").value=Math.round(((VGrossForBasic-BonusM)*100)/100,0);
  //var Cal_EmpBasic = document.getElementById("EmpBasic").value=PFGross;
  <!-- HRA Con Special -->
  var Cal_EmpHRA = document.getElementById("EmpHRA").value=0; //HRA
  var Cal_EmpConAllow = document.getElementById("EmpConAllow").value=0;
  var Cal_TotBasHraCon = document.getElementById("TotBasHraCon").value=0;
  var Cal_EmpSpeAllow = document.getElementById("EmpSpeAllow").value=0;
 }
 else
 {
  var Cal_EmpBasic = document.getElementById("EmpBasic").value=Math.round((((VGrossForBasic*50)/100)*100)/100,0); //Basic
  <!-- HRA Con Special -->
  var Cal_EmpHRA = document.getElementById("EmpHRA").value=Math.round((((Cal_EmpBasic*40)/100)*100)/100,0); //HRA
  var Cal_EmpConAllow = document.getElementById("EmpConAllow").value=0;
  var Cal_TotBasHraCon = document.getElementById("TotBasHraCon").value=Math.round((Cal_EmpBasic+Cal_EmpHRA+Cal_EmpConAllow+CAR_ALL+BonusM)*100)/100;
  var Cal_EmpSpeAllow = document.getElementById("EmpSpeAllow").value=Math.round((VGrossSalary-Cal_TotBasHraCon)*100)/100;
 }
/*****************************/

if (Cal_EmpBasic<=VPf_MaxSalPf){ var Cal_EmpProviFund = document.getElementById("EmpProviFund").value=Math.round((((Cal_EmpBasic*12)/100)*100)/100,0); }
else if (Cal_EmpBasic>VPf_MaxSalPf){ var Cal_EmpProviFund = document.getElementById("EmpProviFund").value=Math.round((((VPf_MaxSalPf*12)/100)*100)/100,0); }

var VGrossMonSalary_PAC = parseFloat(document.getElementById("GrossMonSalary_PAC").value);
var Cal_EmpNetMonSalary = document.getElementById("EmpNetMonSalary").value=Math.round(((VGrossMonSalary_PAC-Cal_EmpProviFund)*100)/100,0);

var Cal_EmpAnnGrossSalary = document.getElementById("EmpAnnGrossSalary").value=Math.round((VGrossSalary*12)*100)/100;
var Cal_EmpEmployerPFContri = document.getElementById("EmpEmployerPFContri").value=Math.round((Cal_EmpProviFund*12)*100)/100;
var Cal_TotAnnualBasic = document.getElementById("TotAnnualBasic").value=Math.round((Cal_EmpBasic*12)*100)/100;
//var Cal_EmpBonusExg = document.getElementById("EmpBonusExg").value=Math.round((((Cal_TotAnnualBasic*VStrBonusContri)/100)*100)/100,0);
//if (Cal_EmpBasic<=VB_MaxBonus) { var Cal_EmpBonusExg = document.getElementById("EmpBonusExg").value=Math.round((((Cal_TotAnnualBasic*VStrBonusContri)/100)*100)/100,0); }
//else if (Cal_EmpBasic>VB_MaxBonus) { var Cal_EmpBonusExg = document.getElementById("EmpBonusExg").value=Math.round(((((VB_MaxBonus*12)*VStrBonusContri)/100)*100)/100,0); }

//if (ComId==1 && Cal_EmpBasic<=VB_MaxBonus) { var Cal_EmpBonusExg = document.getElementById("EmpBonusExg").value=Math.round((Cal_EmpBasic)*100)/100; }
//else if (ComId==1 && Cal_EmpBasic>VB_MaxBonus) { var Cal_EmpBonusExg = document.getElementById("EmpBonusExg").value=Math.round((VB_MaxBonus)*100)/100; }

var ESCI = parseFloat(document.getElementById("ESCI").value);
var EmpESCI = document.getElementById("ESCI").value=Math.round((((VGrossSalary*0.75)/100)*100)/100,0); //1.75

/*
function round(n){ n = Math.pow(10,n); return function(num) { return Math.round(num*n)/n; } }
  var round_decimal = round(1);
  var CESCI = round_decimal((((VGrossSalary*3.25)/100)*100)/100);
*/

var CESCI = (((VGrossSalary*3.25)/100)*100)/100;
//var CESCI = (((VGrossSalary*3.25)/100)*100)/100; //4.75
//var CESCI = Math.round((((VGrossSalary*4.75)/100)*100)/100); 

var ComESCI = document.getElementById("ComESCI").value=Math.round(((CESCI*12)*100)/100,0);
var EmpNetMonSalary = parseFloat(document.getElementById("EmpNetMonSalary").value);
var NetMonSalary = document.getElementById("NetMonSalary").value=EmpNetMonSalary;

if(ComId==1){var Cal_EmpBonusExg = document.getElementById("EmpBonusExg").value=0;}

else if (ComId==2 && Cal_EmpBasic<=VB_MaxBonus) { var Cal_EmpBonusExg = document.getElementById("EmpBonusExg").value=0; }
else if (ComId==2 && Cal_EmpBasic>VB_MaxBonus) { var Cal_EmpBonusExg = document.getElementById("EmpBonusExg").value=0; }
else if (ComId==3 && Cal_EmpBasic<=VB_MaxBonus) { var Cal_EmpBonusExg = document.getElementById("EmpBonusExg").value=0; }
else if (ComId==3 && Cal_EmpBasic>VB_MaxBonus) { var Cal_EmpBonusExg = document.getElementById("EmpBonusExg").value=0; }

var Cal_OneDayBasic = document.getElementById("OneDayBasic").value=Math.round((Cal_EmpBasic/26)*100)/100;
if(ComId==1 || ComId==3){var Cal_EmpEstiGratuity = document.getElementById("EmpEstiGratuity").value=Math.round(((Cal_OneDayBasic*VMaxGrtuityDay)*100)/100,0);}
else if(ComId==2){var Cal_EmpEstiGratuity = document.getElementById("EmpEstiGratuity").value=0;}
//else if(ComId==3){var Cal_EmpEstiGratuity = document.getElementById("EmpEstiGratuity").value=0;}

if(ComId==1)
{ var Cal_Emp_MPP = document.getElementById("EmpMediPoliPremium").value=Math.round((VEmp_MPP)*100)/100; 
  var Cal_Emp_MPP2 = document.getElementById("EMediPP").value=Math.round((VEmp_MPP)*100)/100;
}
else if(ComId==2){ var Cal_Emp_MPP = document.getElementById("EmpMediPoliPremium").value=0; }
else if(ComId==3){ var Cal_Emp_MPP = document.getElementById("EmpMediPoliPremium").value=0; }

var Cal_EmptotalCtc = document.getElementById("EmpTotalCtc").value=Math.round((Cal_EmpAnnGrossSalary+Cal_EmpBonusExg+Cal_EmpEstiGratuity+Cal_EmpEmployerPFContri+Cal_Emp_MPP)*100)/100;
var Cal_EmptotalCtc2 = document.getElementById("ETotCtc").value=Math.round((Cal_EmpAnnGrossSalary+Cal_EmpBonusExg+Cal_EmpEstiGratuity+Cal_EmpEmployerPFContri+Cal_Emp_MPP)*100)/100;

if(D2==DeId || P2==DeId){document.getElementById("EmpAddBenifit_MediInsu").value=Math.round((MCSSP)*100)/100;}
else if(D2!=DeId && P2!=DeId){document.getElementById("EmpAddBenifit_MediInsu").value=Math.round((MCS)*100)/100;}
//var Cal_EmpAddBenifit_MediInsu = document.getElementById("EmpAddBenifit_MediInsu").value=Math.round((MCSSP)*100)/100;

FunNPS_Value(); FunCheckESCI();
if(document.getElementById("ActPFCheck").value=='Y'){ CheckEmpActPf() /*CheckEmpComActPf();*/ }
if(document.getElementById("ActComPFCheck").value=='Y'){ CheckEmpComActPf(); }

}



function SelectHRCalcu(value)
{ var VGrossSalary = parseFloat(document.getElementById("EmpGrossMonSalary").value); var VEmpBasic = parseFloat(document.getElementById("EmpBasic").value); var VEmpHRA = parseFloat(document.getElementById("EmpHRA").value); var VEmpConAllow = parseFloat(document.getElementById("EmpConAllow").value); var VEmpSpeAllow = parseFloat(document.getElementById("EmpSpeAllow").value); var VConvance = parseFloat(document.getElementById("Convance").value); var V_ESA2 = parseFloat(document.getElementById("ESA2").value); var VTA = parseFloat(document.getElementById("TA").value); 
  var Cal_EmpHRA2 = document.getElementById("EmpHRA").value=Math.round((((VEmpBasic*value)/100)*100)/100,0);
  var Cal_EmpConAllow = document.getElementById("EmpConAllow").value=0; //Math.round((VConvance)*100)/100
  var Cal_TotBasHraCon = document.getElementById("TotBasHraCon").value=Math.round((VEmpBasic+Cal_EmpHRA2+Cal_EmpConAllow+VTA)*100)/100;
  var Cal_EmpSpeAllow = document.getElementById("EmpSpeAllow").value=Math.round((VGrossSalary-Cal_TotBasHraCon)*100)/100;
  var Cal_ESA2 = document.getElementById("ESA2").value=Math.round((VGrossSalary-Cal_TotBasHraCon)*100)/100;
}


function HRCalcu(value)
{ var VGrossSalary = parseFloat(document.getElementById("EmpGrossMonSalary").value); var VEmpBasic = parseFloat(document.getElementById("EmpBasic").value); var VEmpHRA = parseFloat(document.getElementById("EmpHRA").value); var VEmpConAllow = parseFloat(document.getElementById("EmpConAllow").value); var VEmpSpeAllow = parseFloat(document.getElementById("EmpSpeAllow").value); var VConvance = parseFloat(document.getElementById("Convance").value); var VTA = parseFloat(document.getElementById("TA").value);
  var V_ESA2 = parseFloat(document.getElementById("ESA2").value);
  var Cal_EmpConAllow = document.getElementById("EmpConAllow").value=0; //Math.round((VConvance)*100)/100
  var Cal_EmpHRA = document.getElementById("EmpHRA").value=Math.round((VEmpHRA)*100)/100;
  var Cal_TotBasHraCon = document.getElementById("TotBasHraCon").value=Math.round((VEmpBasic+Cal_EmpHRA+Cal_EmpConAllow+VTA)*100)/100;
  var Cal_EmpSpeAllow = document.getElementById("EmpSpeAllow").value=Math.round((VGrossSalary-Cal_TotBasHraCon)*100)/100;
  var Cal_ESA2 = document.getElementById("ESA2").value=Math.round((VGrossSalary-Cal_TotBasHraCon)*100)/100;
}



function ChangeBasic()
{ var ComId = document.getElementById("ComId").value; var VGrossSalary = parseFloat(document.getElementById("EmpGrossMonSalary").value); var VEmpBasic = parseFloat(document.getElementById("EmpBasic").value); var VEmpHRA = parseFloat(document.getElementById("EmpHRA").value); var VEmpConAllow = parseFloat(document.getElementById("EmpConAllow").value); var VEmpSpeAllow = parseFloat(document.getElementById("EmpSpeAllow").value); var VEmpProviFund = parseFloat(document.getElementById("EmpProviFund").value); var VEmpNetMonSalary = parseFloat(document.getElementById("EmpNetMonSalary").value); var VEmpMediReim = parseFloat(document.getElementById("EmpMediReim").value); var VEmpLeaveTraAllow = parseFloat(document.getElementById("EmpLeaveTraAllow").value); var VEmpChildEduAllow = parseFloat(document.getElementById("EmpChildEduAllow").value); var VEmpAnnGrossSalary = parseFloat(document.getElementById("EmpAnnGrossSalary").value); var VEmpBonusExg = parseFloat(document.getElementById("EmpBonusExg").value); var VEmpEstiGratuity = parseFloat(document.getElementById("EmpEstiGratuity").value); var VEmpEmployerPFContri = parseFloat(document.getElementById("EmpEmployerPFContri").value); var VEmpMediPoliPremium = parseFloat(document.getElementById("EmpMediPoliPremium").value); var VEmptotalCtc = parseFloat(document.getElementById("EmpTotalCtc").value); var VEmpAddBenifit_MediInsu = parseFloat(document.getElementById("EmpAddBenifit_MediInsu").value); var VEmp_MPP = parseFloat(document.getElementById("Emp_MPP").value); var VTotBasHraCon = parseFloat(document.getElementById("TotBasHraCon").value); var VTotAnnualBasic = parseFloat(document.getElementById("TotAnnualBasic").value); var VOneDayBasic = parseFloat(document.getElementById("OneDayBasic").value); var VMaxGrtuityDay = parseFloat(document.getElementById("MaxGrtuityDay").value); var VStrBonusContri = parseFloat(document.getElementById("StrBonusContri").value); var VConvance = parseFloat(document.getElementById("Convance").value); var VPf_MaxSalPf = parseFloat(document.getElementById("Pf_MaxSalPf").value); var V_ESA2 = parseFloat(document.getElementById("ESA2").value); var VB_MaxBonus = parseFloat(document.getElementById("MaxBonus").value);  var VGrossMonSalary_PAC = parseFloat(document.getElementById("GrossMonSalary_PAC").value); 
var VTA = parseFloat(document.getElementById("TA").value);

var Cal_TotAnnualBasic = document.getElementById("TotAnnualBasic").value=Math.round(((VEmpBasic*12)*100)/100,0);
//if (VEmpBasic<=VB_MaxBonus) { var Cal_EmpBonusExg = document.getElementById("EmpBonusExg").value=Math.round((((Cal_TotAnnualBasic*VStrBonusContri)/100)*100)/100,0); }
//else if (VEmpBasic>VB_MaxBonus) { var Cal_EmpBonusExg = document.getElementById("EmpBonusExg").value=Math.round(((((VB_MaxBonus*12)*VStrBonusContri)/100)*100)/100,0); }
var Cal_VEmpBasic = parseFloat(document.getElementById("EmpBasic").value);

//if (ComId==1 && Cal_VEmpBasic<=VB_MaxBonus) { var Cal_EmpBonusExg = document.getElementById("EmpBonusExg").value=Math.round((Cal_VEmpBasic)*100)/100; }
//else if (ComId==1 && Cal_VEmpBasic>VB_MaxBonus) { var Cal_EmpBonusExg = document.getElementById("EmpBonusExg").value=Math.round((VB_MaxBonus)*100)/100; }

if(ComId==1){var Cal_EmpBonusExg = document.getElementById("EmpBonusExg").value=0;}
else if (ComId==2 && Cal_VEmpBasic<=VB_MaxBonus) { var Cal_EmpBonusExg = document.getElementById("EmpBonusExg").value=0; }
else if (ComId==2 && Cal_VEmpBasic>VB_MaxBonus) { var Cal_EmpBonusExg = document.getElementById("EmpBonusExg").value=0; }
else if (ComId==3 && Cal_VEmpBasic<=VB_MaxBonus) { var Cal_EmpBonusExg = document.getElementById("EmpBonusExg").value=0; }
else if (ComId==4 && Cal_VEmpBasic>VB_MaxBonus) { var Cal_EmpBonusExg = document.getElementById("EmpBonusExg").value=0; }

if ((ComId==1 || ComId==3) && Cal_VEmpBasic<=VPf_MaxSalPf) { var Cal_EmpProviFund = document.getElementById("EmpProviFund").value=Math.round((((Cal_VEmpBasic*12)/100)*100)/100,0); }
else if ((ComId==1 || ComId==3) && Cal_VEmpBasic>VPf_MaxSalPf) { var Cal_EmpProviFund = document.getElementById("EmpProviFund").value=Math.round((((VPf_MaxSalPf*12)/100)*100)/100,0); }
else if (ComId==2 && Cal_VEmpBasic<=VPf_MaxSalPf) { var Cal_EmpProviFund = document.getElementById("EmpProviFund").value=0; }
else if (ComId==2 && Cal_VEmpBasic>VPf_MaxSalPf) { var Cal_EmpProviFund = document.getElementById("EmpProviFund").value=0; }
//else if (ComId==3 && Cal_VEmpBasic<=VPf_MaxSalPf) { var Cal_EmpProviFund = document.getElementById("EmpProviFund").value=0; }
//else if (ComId==3 && Cal_VEmpBasic>VPf_MaxSalPf) { var Cal_EmpProviFund = document.getElementById("EmpProviFund").value=0; }

var Cal_EmpHRA = document.getElementById("EmpHRA").value=Math.round((((Cal_VEmpBasic*40)/100)*100)/100,0);
var Cal_EmpConAllow = document.getElementById("EmpConAllow").value=0; //Math.round((VConvance)*100)/100
var Cal_TotBasHraCon = document.getElementById("TotBasHraCon").value=Math.round((Cal_VEmpBasic+Cal_EmpHRA+Cal_EmpConAllow+VTA)*100)/100;
var Cal_EmpSpeAllow = document.getElementById("EmpSpeAllow").value=Math.round((VGrossSalary-Cal_TotBasHraCon)*100)/100;
var Cal_ESA2 = document.getElementById("ESA2").value=Math.round((VGrossSalary-Cal_TotBasHraCon)*100)/100;
var Cal_EmpNetMonSalary = document.getElementById("EmpNetMonSalary").value=Math.round((VGrossMonSalary_PAC-Cal_EmpProviFund)*100)/100;
var Cal_EmpAnnGrossSalary = document.getElementById("EmpAnnGrossSalary").value=Math.round((VGrossSalary*12)*100)/100; 
var Cal_EmpEmployerPFContri = document.getElementById("EmpEmployerPFContri").value=Math.round((Cal_EmpProviFund*12)*100)/100;  
//var Cal_EmpBonusExg = document.getElementById("EmpBonusExg").value=Math.round((((Cal_TotAnnualBasic*VStrBonusContri)/100)*100)/100,0);

var Cal_OneDayBasic = document.getElementById("OneDayBasic").value=Math.round((Cal_VEmpBasic/26)*100)/100;

if(ComId==1 || ComId==3){var Cal_EmpEstiGratuity = document.getElementById("EmpEstiGratuity").value=Math.round(((Cal_OneDayBasic*VMaxGrtuityDay)*100)/100,0); }
else if(ComId==2){var Cal_EmpEstiGratuity = document.getElementById("EmpEstiGratuity").value=0; }
//else if(ComId==3){var Cal_EmpEstiGratuity = document.getElementById("EmpEstiGratuity").value=0; }

if(ComId==1)
{ var Cal_Emp_MPP = document.getElementById("EmpMediPoliPremium").value=Math.round((VEmp_MPP)*100)/100; 
  var Cal_Emp_MPP2 = document.getElementById("EMediPP").value=Math.round((VEmp_MPP)*100)/100;
}
else if(ComId==2){var Cal_Emp_MPP = document.getElementById("EmpMediPoliPremium").value=0; }
else if(ComId==3){var Cal_Emp_MPP = document.getElementById("EmpMediPoliPremium").value=0; }

var Cal_EmptotalCtc = document.getElementById("EmpTotalCtc").value=Math.round((Cal_EmpAnnGrossSalary+Cal_EmpBonusExg+Cal_EmpEstiGratuity+Cal_EmpEmployerPFContri+Cal_Emp_MPP)*100)/100;
var Cal_EmptotalCtc2 = document.getElementById("ETotCtc").value=Math.round((Cal_EmpAnnGrossSalary+Cal_EmpBonusExg+Cal_EmpEstiGratuity+Cal_EmpEmployerPFContri+Cal_Emp_MPP)*100)/100;

if(document.getElementById("ActPFCheck").value=='Y'){ CheckEmpComActPf(); }
if(document.getElementById("ActComPFCheck").value=='Y'){ CheckEmpComActPf(); }
    
}


function ChangeCA()
{ 
var VGrossSalary = parseFloat(document.getElementById("EmpGrossMonSalary").value); var VEmpBasic = parseFloat(document.getElementById("EmpBasic").value);
var VEmpHRA = parseFloat(document.getElementById("EmpHRA").value); var VEmpConAllow = parseFloat(document.getElementById("EmpConAllow").value);
var VEmpSpeAllow = parseFloat(document.getElementById("EmpSpeAllow").value); 
var V_ESA2 = parseFloat(document.getElementById("ESA2").value); //var VConvance = parseFloat(document.getElementById("Convance").value);
//var Cal_EmpConAllow = document.getElementById("EmpConAllow").value=Math.round((VConvance)*100)/100;
var Cal_TotBasHraCon = document.getElementById("TotBasHraCon").value=Math.round((VEmpBasic+VEmpHRA+VEmpConAllow)*100)/100;
var Cal_EmpSpeAllow = document.getElementById("EmpSpeAllow").value=Math.round((VGrossSalary-Cal_TotBasHraCon)*100)/100;
var Cal_ESA2 = document.getElementById("ESA2").value=Math.round((VGrossSalary-Cal_TotBasHraCon)*100)/100;

if(document.getElementById("CheckMR").checked==true)
  {
    var C_MRYear = document.getElementById("EmpMediReim").value
	var VSpeAllow = parseFloat(document.getElementById("EmpSpeAllow").value);
	var V_ESA2 = parseFloat(document.getElementById("ESA2").value);
	var C_MRMonth = Math.round(((C_MRYear/12)*100)/100,0);
	document.getElementById("EmpSpeAllow").value=Math.round((VSpeAllow-C_MRMonth)*100)/100;
	document.getElementById("ESA2").value=Math.round((V_ESA2-C_MRMonth)*100)/100;
  }
  if(document.getElementById("CheckLTA").checked==true)
  {
    var C_LTAYear = document.getElementById("EmpLeaveTraAllow").value;
	var VSpeAllow = parseFloat(document.getElementById("EmpSpeAllow").value);
	var V_ESA2 = parseFloat(document.getElementById("ESA2").value);
	var C_LTAMonth = Math.round(((C_LTAYear/12)*100)/100,0); 
	document.getElementById("EmpSpeAllow").value=Math.round((VSpeAllow-C_LTAMonth)*100)/100;
	document.getElementById("ESA2").value=Math.round((V_ESA2-C_LTAMonth)*100)/100;
  }
  if(document.getElementById("CheckCEA").checked==true)
  {
    var C_CEAYear = document.getElementById("EmpChildEduAllow").value
	var VSpeAllow = parseFloat(document.getElementById("EmpSpeAllow").value);
	var V_ESA2 = parseFloat(document.getElementById("ESA2").value);
	var C_CEAMonth = Math.round(((C_CEAYear/12)*100)/100,0);
	document.getElementById("EmpSpeAllow").value=Math.round((VSpeAllow-C_CEAMonth)*100)/100;
	document.getElementById("ESA2").value=Math.round((V_ESA2-C_CEAMonth)*100)/100; 
  } 
}


function ChangeTA()
{ 
var VGrossSalary = parseFloat(document.getElementById("EmpGrossMonSalary").value); var VEmpBasic = parseFloat(document.getElementById("EmpBasic").value); var VEmpHRA = parseFloat(document.getElementById("EmpHRA").value); var VEmpConAllow = parseFloat(document.getElementById("EmpConAllow").value); var VEmpSpeAllow = parseFloat(document.getElementById("EmpSpeAllow").value); var V_ESA2 = parseFloat(document.getElementById("ESA2").value); 
var VTA = parseFloat(document.getElementById("TA").value); 
//var VConvance = parseFloat(document.getElementById("Convance").value);
//var Cal_EmpConAllow = document.getElementById("EmpConAllow").value=Math.round((VConvance)*100)/100;
var Cal_TotBasHraCon = document.getElementById("TotBasHraCon").value=Math.round((VEmpBasic+VEmpHRA+VEmpConAllow+VTA)*100)/100;
var Cal_EmpSpeAllow = document.getElementById("EmpSpeAllow").value=Math.round((VGrossSalary-Cal_TotBasHraCon)*100)/100;
var Cal_ESA2 = document.getElementById("ESA2").value=Math.round((VGrossSalary-Cal_TotBasHraCon)*100)/100;

  if(document.getElementById("CheckMR").checked==true)
  {
    var C_MRYear = document.getElementById("EmpMediReim").value
	var VSpeAllow = parseFloat(document.getElementById("EmpSpeAllow").value);
	var V_ESA2 = parseFloat(document.getElementById("ESA2").value);
	var C_MRMonth = Math.round(((C_MRYear/12)*100)/100,0);
	document.getElementById("EmpSpeAllow").value=Math.round((VSpeAllow-C_MRMonth)*100)/100;
	document.getElementById("ESA2").value=Math.round((V_ESA2-C_MRMonth)*100)/100;
  }
  if(document.getElementById("CheckLTA").checked==true)
  {
    var C_LTAYear = document.getElementById("EmpLeaveTraAllow").value;
	var VSpeAllow = parseFloat(document.getElementById("EmpSpeAllow").value);
	var V_ESA2 = parseFloat(document.getElementById("ESA2").value);
	var C_LTAMonth = Math.round(((C_LTAYear/12)*100)/100,0); 
	document.getElementById("EmpSpeAllow").value=Math.round((VSpeAllow-C_LTAMonth)*100)/100;
	document.getElementById("ESA2").value=Math.round((V_ESA2-C_LTAMonth)*100)/100;
  }
  if(document.getElementById("CheckCEA").checked==true)
  {
    var C_CEAYear = document.getElementById("EmpChildEduAllow").value;
	var VSpeAllow = parseFloat(document.getElementById("EmpSpeAllow").value);
	var V_ESA2 = parseFloat(document.getElementById("ESA2").value);
	var C_CEAMonth = Math.round(((C_CEAYear/12)*100)/100,0);
	document.getElementById("EmpSpeAllow").value=Math.round((VSpeAllow-C_CEAMonth)*100)/100;
	document.getElementById("ESA2").value=Math.round((V_ESA2-C_CEAMonth)*100)/100; 
  } 
}


function ChangeMPP()
{ 
var VEmpAnnGrossSalary = parseFloat(document.getElementById("EmpAnnGrossSalary").value); var VEmpBonusExg = parseFloat(document.getElementById("EmpBonusExg").value); var VEmpEstiGratuity = parseFloat(document.getElementById("EmpEstiGratuity").value); var VEmpEmployerPFContri = parseFloat(document.getElementById("EmpEmployerPFContri").value); var VEmpMediPoliPremium = parseFloat(document.getElementById("EmpMediPoliPremium").value); var VEmptotalCtc = parseFloat(document.getElementById("EmpTotalCtc").value); var VEMediPP = document.getElementById("EMediPP").value=VEmpMediPoliPremium; var ESCI=parseFloat(document.getElementById("AnnualESCI").value); var Cal_EmptotalCtc = document.getElementById("EmpTotalCtc").value=Math.round((VEmpAnnGrossSalary+VEmpBonusExg+VEmpEstiGratuity+VEmpEmployerPFContri+VEmpMediPoliPremium+ESCI)*100)/100; var Cal_EmptotalCtc2 = document.getElementById("ETotCtc").value=Math.round((VEmpAnnGrossSalary+VEmpBonusExg+VEmpEstiGratuity+VEmpEmployerPFContri+VEmpMediPoliPremium+ESCI)*100)/100;  
}

function ChangeMR(value)
{ var VEmpSpeAllow = parseFloat(document.getElementById("EmpSpeAllow").value); var VEmpMediReim = parseFloat(document.getElementById("EmpMediReim").value); var VEmpLeaveTraAllow = parseFloat(document.getElementById("EmpLeaveTraAllow").value); var VEmpChildEduAllow = parseFloat(document.getElementById("EmpChildEduAllow").value);
  if(VEmpSpeAllow<VEmpMediReim){alert("Please check Special Allowance!"); return false;}
  else if(VEmpSpeAllow>=VEmpMediReim) 
  { var TotMrLtaCea=document.getElementById("EmpTotMrLtaCea").value=Math.round((VEmpLeaveTraAllow+VEmpChildEduAllow+VEmpMediReim)*100)/100;
    var Cal_EmpSpeAllow = document.getElementById("LessSpeAllow").value=Math.round((VEmpSpeAllow-TotMrLtaCea)*100)/100; return true;}    
}



function ChangeLTA(value)
{ var VEmpSpeAllow = parseFloat(document.getElementById("EmpSpeAllow").value);  var VEmpMediReim = parseFloat(document.getElementById("EmpMediReim").value); var VEmpLeaveTraAllow = parseFloat(document.getElementById("EmpLeaveTraAllow").value); var VEmpChildEduAllow = parseFloat(document.getElementById("EmpChildEduAllow").value);
  if(VEmpSpeAllow<VEmpLeaveTraAllow){alert("Please check Special Allowance!"); return false;}
  else if(VEmpSpeAllow>=VEmpLeaveTraAllow) 
  { var TotMrLtaCea=document.getElementById("EmpTotMrLtaCea").value=Math.round((VEmpLeaveTraAllow+VEmpChildEduAllow+VEmpLeaveTraAllow)*100)/100;
    var Cal_EmpSpeAllow = document.getElementById("LessSpeAllow").value=Math.round((VEmpSpeAllow-TotMrLtaCea)*100)/100; return true;}    
}


function ChangeCEA(value)
{ var VEmpSpeAllow = parseFloat(document.getElementById("EmpSpeAllow").value);  var VEmpMediReim = parseFloat(document.getElementById("EmpMediReim").value); var VEmpLeaveTraAllow = parseFloat(document.getElementById("EmpLeaveTraAllow").value); var VEmpChildEduAllow = parseFloat(document.getElementById("EmpChildEduAllow").value);
  if(VEmpSpeAllow<VEmpChildEduAllow){alert("Please check Special Allowance!"); return false;}
  else if(VEmpSpeAllow>=VEmpChildEduAllow) 
  { var TotMrLtaCea=document.getElementById("EmpTotMrLtaCea").value=Math.round((VEmpLeaveTraAllow+VEmpChildEduAllow+VEmpChildEduAllow)*100)/100;
    var Cal_EmpSpeAllow = document.getElementById("LessSpeAllow").value=Math.round((VEmpSpeAllow-TotMrLtaCea)*100)/100; return true; }    
}


function FunHRA() 
{ if(document.getElementById("CheckHRA").checked==true){document.getElementById("EmpHRA").readOnly=false; document.getElementById("HRACalcu").disabled=false;} else if(document.getElementById("CheckHRA").checked==false){document.getElementById("EmpHRA").readOnly=true; document.getElementById("HRACalcu").disabled=true;} }


function FunCA() 
{ if(document.getElementById("CheckCA").checked==true){document.getElementById("EmpConAllow").readOnly=false;}
else if(document.getElementById("CheckCA").checked==false){document.getElementById("EmpConAllow").readOnly=true;} }


/*
function FunMR() 
{if(document.getElementById("CheckMR").checked==true){document.getElementById("EmpMediReim").readOnly=false;}
else if(document.getElementById("CheckMR").checked==false){document.getElementById("EmpMediReim").readOnly=true;} }


function FunLTA() 
{if(document.getElementById("CheckLTA").checked==true){document.getElementById("EmpLeaveTraAllow").readOnly=false;}
else if(document.getElementById("CheckLTA").checked==false){document.getElementById("EmpLeaveTraAllow").readOnly=true;}}


function FunCEA() 
{if(document.getElementById("CheckCEA").checked==true){document.getElementById("EmpChildEduAllow").readOnly=false;}
else if(document.getElementById("CheckCEA").checked==false){document.getElementById("EmpChildEduAllow").readOnly=true;} } */


function FunMPP()
{ if(document.getElementById("CheckMPP").checked==true){document.getElementById("EmpMediPoliPremium").readOnly=false;} else if(document.getElementById("CheckMPP").checked==false){document.getElementById("EmpMediPoliPremium").readOnly=true;} }

function FunMIC() 
{ if(document.getElementById("CheckMIC").checked==true){document.getElementById("EmpAddBenifit_MediInsu").readOnly=false;} if(document.getElementById("CheckMIC").checked==false){document.getElementById("EmpAddBenifit_MediInsu").readOnly=true;} }

function FunCarEnt() 
{ if(document.getElementById("CheckCarEnt").checked==true){document.getElementById("Car_Entitlement").readOnly=false;} if(document.getElementById("CheckCarEnt").checked==false){document.getElementById("Car_Entitlement").readOnly=true;} }


function ClickCheckBonus() 
{ if(document.getElementById("CheckBonus").checked==true){document.getElementById("EmpBonusExg").readOnly=false;} if(document.getElementById("CheckBonus").checked==false){document.getElementById("EmpBonusExg").readOnly=true;} }

/*
function ClickCBns() 
{ var VEmpBasic = parseFloat(document.getElementById("EmpBasic").value); var Bonus = parseFloat(document.getElementById("EmpBonusExg").value);
  var TotCtc = parseFloat(document.getElementById("EmpTotalCtc").value); var MinWAge=3500;
  if(document.getElementById("CBns").checked==true)
  { document.getElementById("HideBonus").value=Bonus; document.getElementById("HideCtc").value=TotCtc;
    if(VEmpBasic>=6500 && VEmpBasic<=10000 && Bonus==0)
    { var Cal_Bonus = document.getElementById("EmpBonusExg").value=Math.round((((MinWAge*12)*20)/100)*100)/100;
      var Cal_TotCtc = document.getElementById("EmpTotalCtc").value=Math.round((Cal_Bonus+TotCtc)*100)/100;
	  var Cal_TotCtc2 = document.getElementById("ETotCtc").value=Math.round((Cal_Bonus+TotCtc)*100)/100;
    }
  }
  else if(document.getElementById("CBns").checked==false)
  { 
    document.getElementById("EmpBonusExg").value=document.getElementById("HideBonus").value; 
	document.getElementById("EmpTotalCtc").value=document.getElementById("HideCtc").value; 
	document.getElementById("ETotCtc").value=document.getElementById("HideCtc").value;
  } 
}
*/

function ClickCBns() 
{ var VEmpBasic = parseFloat(document.getElementById("EmpBasic").value); var Bonus = parseFloat(document.getElementById("EmpBonusExg").value);
  var TotCtc = parseFloat(document.getElementById("EmpTotalCtc").value); var MinWAge=7000;
  if(document.getElementById("CBns").checked==true)
  { document.getElementById("HideBonus").value=Bonus; document.getElementById("HideCtc").value=TotCtc;
  
    if(VEmpBasic<MinWAge && Bonus==0)
    { var Cal_Bonus = document.getElementById("EmpBonusExg").value=Math.round((((VEmpBasic*12)*20)/100)*100)/100;
      var Cal_TotCtc = document.getElementById("EmpTotalCtc").value=Math.round((Cal_Bonus+TotCtc)*100)/100;
	  var Cal_TotCtc2 = document.getElementById("ETotCtc").value=Math.round((Cal_Bonus+TotCtc)*100)/100;
    }
    else if(VEmpBasic>=MinWAge && VEmpBasic<=21000 && Bonus==0)
    { var Cal_Bonus = document.getElementById("EmpBonusExg").value=Math.round((((MinWAge*12)*20)/100)*100)/100;
      var Cal_TotCtc = document.getElementById("EmpTotalCtc").value=Math.round((Cal_Bonus+TotCtc)*100)/100;
	  var Cal_TotCtc2 = document.getElementById("ETotCtc").value=Math.round((Cal_Bonus+TotCtc)*100)/100;
    }
    else if(VEmpBasic>21000 && Bonus==0)
    { var Cal_Bonus = document.getElementById("EmpBonusExg").value=0;
      var Cal_TotCtc = document.getElementById("EmpTotalCtc").value=Math.round((Cal_Bonus+TotCtc)*100)/100;
	  var Cal_TotCtc2 = document.getElementById("ETotCtc").value=Math.round((Cal_Bonus+TotCtc)*100)/100;
    }
  }
  else if(document.getElementById("CBns").checked==false)
  { 
    document.getElementById("EmpBonusExg").value=document.getElementById("HideBonus").value; 
	//alert(Bonus); alert(TotCtc);
	//document.getElementById("EmpTotalCtc").value=document.getElementById("HideCtc").value; 
	//document.getElementById("ETotCtc").value=document.getElementById("HideCtc").value;
	document.getElementById("EmpTotalCtc").value=Math.round((TotCtc-Bonus)*100)/100;
	document.getElementById("ETotCtc").value=Math.round((TotCtc-Bonus)*100)/100; 
  } 
 
}


function validate(formEctc)
{
 var Numfilter=/^[0-9. ]+$/;
 var EmpBasic = formEctc.EmpBasic.value;  var test_num = Numfilter.test(EmpBasic);
 if(EmpBasic.length === 0) { alert("Please check basic!.");  return false; }
 if(test_num==false) { alert('Please check basic!'); return false; }	

 var EmpHRA = formEctc.EmpHRA.value; var test_num1 = Numfilter.test(EmpHRA);
 if(EmpHRA.length === 0) { alert("Please check HRA!.");  return false; }
 if(test_num1==false) { alert('Please check HRA!'); return false; }	

 var EmpConAllow = formEctc.EmpConAllow.value; var test_num2 = Numfilter.test(EmpConAllow);
 if(EmpConAllow.length === 0) { alert("Please check convance!.");  return false; }
 if(test_num2==false) { alert('Please check convance!'); return false; }
 
 var TA = formEctc.TA.value; var test_numm2 = Numfilter.test(TA);
 if(TA.length === 0) { alert("Please check Transport Allowance!.");  return false; }
 if(test_numm2==false) { alert('Please check Transport Allowance!'); return false; }	

 var EmpGrossMonSalary = formEctc.EmpGrossMonSalary.value; var test_num3 = Numfilter.test(EmpGrossMonSalary);
 if(EmpGrossMonSalary.length === 0) { alert("Please check convance!.");  return false; }
 if(test_num3==false) { alert('Please check convance!'); return false; }	

 var V_EmpBasic = parseFloat(document.getElementById("EmpBasic").value);
 var V_EmpHRA = parseFloat(document.getElementById("EmpHRA").value);
 var V_EmpConAllow = parseFloat(document.getElementById("EmpConAllow").value); 

 var V_EmpSpeAllow = parseFloat(document.getElementById("EmpSpeAllow").value);
 if(V_EmpSpeAllow<0){alert("Please check Value of basic,hra,convance, etc"); return false;}
 var EmpChildEduAllow = document.getElementById("EmpChildEduAllow").value;  var EmpLeaveTraAllow = document.getElementById("EmpLeaveTraAllow").value;

 var EmpMediReim = document.getElementById("EmpMediReim").value; var Extra_MrLtaCea = parseFloat(document.getElementById("Extra_MrLtaCea").value);
 if(EmpChildEduAllow>0 || EmpLeaveTraAllow>0 || EmpMediReim>0) 
 { var MinCEA = Math.round((EmpChildEduAllow/12)*100)/100; var MinLTA = Math.round((EmpLeaveTraAllow/12)*100)/100; var MinMR = Math.round((EmpMediReim/12)*100)/100;}
 else {var MinCEA = 0; var MinLTA = 0; var MinMR = 0;}
 var MrLtaCeaExtra = document.getElementById("Extra_MrLtaCea").value = Math.round((MinCEA+MinLTA+MinMR)*100)/100; 
 var SumBHCS = Math.round((V_EmpBasic+V_EmpHRA+V_EmpConAllow+V_EmpSpeAllow+MrLtaCeaExtra)*100)/100;
 var V_EmpGrossMonSalary = parseFloat(document.getElementById("EmpGrossMonSalary").value);
 //if(SumBHCS!=V_EmpGrossMonSalary){alert("Please check Value of basic,hra,convance,special Allow, etc"); return false;}

 var EmpMediPoliPremium=formEctc.EmpMediPoliPremium.value; var test_num4=Numfilter.test(EmpMediPoliPremium);
 if(EmpMediPoliPremium.length === 0) { alert("Please check Medical Policy Premium!.");  return false; }
 if(test_num4==false) { alert('Please check Medical Policy Premium!'); return false; }	

 var EmpTotalCtc = formEctc.EmpTotalCtc.value; var test_num5 = Numfilter.test(EmpTotalCtc);
 if(EmpTotalCtc.length === 0) { alert("Please check enter value!.");  return false; }
 if(test_num5==false) { alert('Please check enter Value!'); return false; }

 var EmpAddBenifit_MediInsu = formEctc.EmpAddBenifit_MediInsu.value; var test_num6 = Numfilter.test(EmpAddBenifit_MediInsu);
 if(EmpAddBenifit_MediInsu.length===0){ alert("Please check Mediclaim insurance coverage!."); return false; }
 if(test_num6==false){ alert('Please check Mediclaim insurance coverage!'); return false; }	


var DateCTC=document.getElementById("DateCTC").value;

var agree=confirm("Are you sure you want to update employee ctc from date "+DateCTC+"?"); 
 if(agree) 
 { 
   var agree2=confirm("ctc update date "+DateCTC); 
   if(agree2) 
   { 
    var agree3=confirm("Are you sure? ctc update date "+DateCTC); 
	if(agree3){ return true; }else{ return false; }
   }
   else {return false;} 
 } 
 else {return false;}

 //var agree=confirm("Are you sure you want to update employee ctc..?"); 
 //if(agree){ return true; }else{ return false; }
 
 
}

function CheckIncentive()
{ if(document.getElementById("EmpInctv").checked==true){document.getElementById("EmpInctv").value='Y';}
  if(document.getElementById("EmpInctv").checked==false){document.getElementById("EmpInctv").value='N';}}
  
function OpenIncHis (v,c,u)
{window.open("EmpIncHis.php??action=Inc&V="+v+"&C="+c+"&U="+u,"IncHisForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=1100,height=500");}  

function FunNPS_Value()
{
 var Pf = parseFloat(document.getElementById("EmpProviFund").value);
 var ESCI = parseFloat(document.getElementById("EmpESCI").value);
 var vNPS = parseFloat(document.getElementById("NPS_Value").value);
 var GMS_PAC = parseFloat(document.getElementById("GMS_PAC").value);
 document.getElementById("EmpNetMonSalary").value=Math.round((GMS_PAC-(Pf+ESCI+vNPS))*100)/100;
}
    
function FunCheckESCI()
{ 
  var VGrossSalary = parseFloat(document.getElementById("EmpGrossMonSalary").value);
  var ESCI = parseFloat(document.getElementById("ESCI").value);
  var EmpESCI = document.getElementById("ESCI").value=Math.round((((VGrossSalary*0.75)/100)*100)/100,0); //1.75
  function round(n){ n = Math.pow(10,n); return function(num) { return Math.round(num*n)/n; } }
  var round_decimal = round(1);
  var CESCI = round_decimal((((VGrossSalary*3.25)/100)*100)/100);
  
  //var CESCI = (((VGrossSalary*3.25)/100)*100)/100; //4.75
  //var CESCI = Math.round((((VGrossSalary*4.75)/100)*100)/100);
  var ComESCI = document.getElementById("ComESCI").value=Math.round(((CESCI*12)*100)/100,0); //Math.ceil
  var ESCI = parseFloat(document.getElementById("ESCI").value); 
  var EmpNetMonSalary=document.getElementById("NetMonSalary").value;
  var NetMSalary=document.getElementById("NetMonSalary").value=EmpNetMonSalary;
  var NetMonSalary=parseFloat(document.getElementById("NetMonSalary").value);
  var ETotCtc=parseFloat(document.getElementById("ETotCtc").value);
  var EMediPP=parseFloat(document.getElementById("EMediPP").value);
  var EAddBenifit_MI=parseFloat(document.getElementById("EAddBenifit_MI").value);
   //EmpTotalCtc AnnualESCI EmpMediPoliPremium EMediPP 

  var GMS_PAC=parseFloat(document.getElementById("GMS_PAC").value); 
  var EmpProviFund=parseFloat(document.getElementById("EmpProviFund").value);
  var vNPS = parseFloat(document.getElementById("NPS_Value").value);
  
  if(document.getElementById("CheckESCI").checked==true) 
  { 
    document.getElementById("EmpESCI").value=ESCI; document.getElementById("AnnualESCI").value=ComESCI;
    var EmpESCI=parseFloat(document.getElementById("EmpESCI").value); var AComESCI=parseFloat(document.getElementById("ComESCI").value);

    var TotDedNet=Math.round((EmpProviFund+EmpESCI+vNPS)*100)/100; 
    document.getElementById("EmpNetMonSalary").value=Math.round((GMS_PAC-TotDedNet)*100)/100;
    //document.getElementById("EmpNetMonSalary").value=Math.round((EmpNetMonSalary-EmpESCI)*100)/100;

	document.getElementById("EmpMediPoliPremium").value=0;
	document.getElementById("EmpAddBenifit_MediInsu").value=0;
	var Ectc=Math.round((ETotCtc-EMediPP)*100)/100; 
	document.getElementById("EmpTotalCtc").value=Math.round((Ectc+AComESCI)*100)/100;
  }
  if(document.getElementById("CheckESCI").checked==false)
  { 
    document.getElementById("EmpESCI").value=0; document.getElementById("AnnualESCI").value=0; 
    var EmpESCI=parseFloat(document.getElementById("EmpESCI").value); var AComESCI=parseFloat(document.getElementById("ComESCI").value);
    
    var TotDedNet=Math.round((EmpProviFund+EmpESCI+vNPS)*100)/100;
    document.getElementById("EmpNetMonSalary").value=Math.round((GMS_PAC-TotDedNet)*100)/100;
    //document.getElementById("EmpNetMonSalary").value=NetMonSalary;

	document.getElementById("EmpMediPoliPremium").value=EMediPP;
	document.getElementById("EmpAddBenifit_MediInsu").value=EAddBenifit_MI;
	var Ectc=Math.round((ETotCtc-EMediPP)*100)/100;
	document.getElementById("EmpTotalCtc").value=Math.round((Ectc+EMediPP)*100)/100;
  }
  
  var A=parseFloat(document.getElementById("EmpMediPoliPremium").value);
  var B=parseFloat(document.getElementById("AnnualESCI").value); 
  var C=parseFloat(document.getElementById("EmpEmployerPFContri").value); 
  var D=parseFloat(document.getElementById("EmpEstiGratuity").value); 
  var E=parseFloat(document.getElementById("EmpBonusExg").value); 
  var F=parseFloat(document.getElementById("EmpAnnGrossSalary").value);
  document.getElementById("EmpTotalCtc").value=Math.round((A+B+C+D+E+F)*100)/100;
  
}	


function Fun2CheckESCI() 
{       
  if(document.getElementById("CheckESCI").checked==true) 
  { 
    var VGrossSalary = parseFloat(document.getElementById("EmpGrossMonSalary").value);
	var GMS_PAC=parseFloat(document.getElementById("GMS_PAC").value); 
    var EmpProviFund=parseFloat(document.getElementById("EmpProviFund").value);
    var EmpESCI=parseFloat(document.getElementById("EmpESCI").value); 
    var vNPS = parseFloat(document.getElementById("NPS_Value").value);	
	var TotDedNet=Math.round((EmpProviFund+EmpESCI+vNPS)*100)/100; 
	document.getElementById("EmpNetMonSalary").value=Math.round((GMS_PAC-TotDedNet)*100)/100;
  }
}	

</script>
</head>

<body class="body">
<input type="hidden" id="EppBasic" value="0"/>  
<input type="hidden" id="EppProviFund" value="0"/>  
<input type="hidden" id="EppSpeAllow" value="0"/>  
<input type="hidden" id="EppGrossMonSalary" value="0"/>  
<input type="hidden" id="EppGMS_PAC" value="0"/>  
<input type="hidden" id="EppNetMonSalary" value="0"/>  
<input type="hidden" id="EppEmployerPFContri" value="0"/>  
<input type="hidden" id="EppTotalCtc" value="0"/>
<input type="hidden" id="EppAnnGrossSalary" value="0"/>   
    
<?php 
$SqlEmp = mysql_query("SELECT *,hrm_employee_general.*,hrm_employee_personal.* FROM hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID WHERE hrm_employee.EmployeeID=".$EMPID, $con) or die(mysql_error());  $ResEmp=mysql_fetch_assoc($SqlEmp);
$Ename = $ResEmp['Fname'].'&nbsp;'.$ResEmp['Sname'].'&nbsp;'.$ResEmp['Lname']; $LEC=strlen($ResEmp['EmpCode']); 
      if($LEC==1){$EC='000'.$ResEmp['EmpCode'];} if($LEC==2){$EC='00'.$ResEmp['EmpCode'];} if($LEC==3){$EC='0'.$ResEmp['EmpCode'];} if($LEC>=4){$EC=$ResEmp['EmpCode'];}
?>
<table class="table">
<tr><td><table class="menutable"><tr><td><?php if($_SESSION['login'] = true){require_once("AMenu.php"); } ?></td></tr></table></td></tr>
<tr><td valign="top">
      <table width="100%" style="margin-top:0px;" border="0">
	    <tr><td valign="top"><?php if($_SESSION['login'] = true){require_once("AWelcome.php"); } ?></td></tr>
	    <tr>
	        <td valign="top" align="center"  width="100%" id="MainWindow"><br>
<?php //**********************************************START*****START*****START******START******START***************************************************************?>
  <table border="0" style="margin-top:0px; width:100%; height:300px;">
 <tr>
  <td align="left" height="20" valign="top" colspan="4">
   <table border="0">
    <tr>
	  <td align="right" width="320" class="heading">Cost To Company</td>
	  <td>&nbsp;&nbsp;&nbsp;</td>
	  <td style="font-family:Times New Roman; font-size:16px; color:#287126; font-weight:bold;"><font color="#FF0000" size="4">*</font>  - Require Field</td>
	   <td><table><tr><td class="font4" style="left">&nbsp;&nbsp;&nbsp;<b><span id="msgspan">
	   <?php echo $msg; ?></span></b></td></tr></table></td>
	</tr>
   </table>
  </td>
 </tr>
<?php if(($_SESSION['UserType']=='M' OR $_SESSION['UserType']=='S' OR $_SESSION['UserType']=='A' OR $_SESSION['UserType']=='U') AND $_SESSION['login'] = true) { ?>	
 <tr>
 <td style="width:100px;" align="center" valign="top"><?php if($_REQUEST['Event']=='Edit') { include("EmpMasterMenu.php"); } ?></td>

<td style="width:50px;" align="center" valign="top"></td>
<?php

/*
if($ResEmp['DateJoining']<='2019-12-31')
{
    $sqlQ=mysql_query("select MAX(SalChangeDate) as SalChangeD from hrm_employee_ctc where (SalChangeDate!='2020-01-01' AND SalChangeDate!='2020-06-01') and EmployeeID=".$EMPID,$con);  
    $resQ=mysql_fetch_assoc($sqlQ);
    
    $inQry="c.SalChangeDate='".$resQ['SalChangeD']."'";
    
}
else
{
    $inQry="c.Status='A'";  
}
*/



$SqlCtc = mysql_query("SELECT e.*,Fname,Sname,Lname,c.*,g.DepartmentId,g.GradeId,g.DesigId,g.BWageId FROM hrm_employee e INNER JOIN hrm_employee_ctc c ON e.EmployeeID=c.EmployeeID INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID WHERE e.CompanyId=".$CompanyId." AND c.Status='A' AND e.EmployeeID=".$EMPID, $con) or die(mysql_error());

//$SqlCtc = mysql_query("SELECT e.*,Fname,Sname,Lname,c.*,g.DepartmentId,g.GradeId,g.DesigId,g.BWageId FROM hrm_employee e INNER JOIN hrm_employee_ctc c ON e.EmployeeID=c.EmployeeID INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID WHERE e.CompanyId=".$CompanyId." AND ".$inQry." AND e.EmployeeID=".$EMPID, $con) or die(mysql_error());


$ResCtc=mysql_fetch_assoc($SqlCtc); 
$Ename = $ResCtc['Fname'].' '.$ResCtc['Sname'].' '.$ResCtc['Lname'];
$sqlDept = mysql_query("select DepartmentName from hrm_department where DepartmentId=".$ResCtc['DepartmentId'], $con); $resDept=mysql_fetch_assoc($sqlDept);
$sqlDe=mysql_query("select DesigName,DesigId from hrm_designation where DesigId=".$ResCtc['DesigId'], $con); $resDe=mysql_fetch_assoc($sqlDe);
$sqlGr=mysql_query("select GradeValue from hrm_grade where GradeId=".$ResCtc['GradeId']." AND CompanyId=".$CompanyId, $con); $resGr=mysql_fetch_assoc($sqlGr);

$SqlStat=mysql_query("select hrm_company_statutory_lumpsum.*,hrm_company_statutory_taxsaving.*,hrm_company_statutory_pf.* from hrm_company_statutory_lumpsum INNER JOIN hrm_company_statutory_taxsaving ON hrm_company_statutory_lumpsum.CompanyId=hrm_company_statutory_taxsaving.CompanyId INNER JOIN hrm_company_statutory_pf ON hrm_company_statutory_lumpsum.CompanyId=hrm_company_statutory_pf.CompanyId where hrm_company_statutory_lumpsum.CompanyId=".$CompanyId, $con); $ResStat=mysql_fetch_assoc($SqlStat); 

$sqlGrade=mysql_query("select GradeValue from hrm_grade INNER JOIN hrm_employee_general ON hrm_grade.GradeId=hrm_employee_general.GradeId where hrm_employee_general.EmployeeID=".$EMPID, $con); $resGrade=mysql_fetch_assoc($sqlGrade);
 if($resGrade['GradeValue']!='')
 { $sqlDaily=mysql_query("select * from hrm_dailyallow where CompanyId=".$CompanyId." AND GradeValue='".$resGrade['GradeValue']."'", $con); $resDaily=mysql_fetch_assoc($sqlDaily);  }


$sqlD2=mysql_query("select DepartmentId from hrm_department where DepartmentName='Sales' AND DepartmentCode='SALES'", $con); $resD2=mysql_fetch_assoc($sqlD2);
$sqlP2=mysql_query("select DepartmentId from hrm_department where DepartmentName='Production' AND DepartmentCode='PRODUCTION'", $con); $resP2=mysql_fetch_assoc($sqlP2);
?>

  <input type="hidden" id="D2" class="All_100" value="<?php echo $resD2['DepartmentId']; ?>"/>  
  <input type="hidden" id="P2" class="All_100" value="<?php echo $resP2['DepartmentId']; ?>"/>
  <input type="hidden" id="DeId" class="All_100" value="<?php echo $ResCtc['DepartmentId']; ?>"/>
<?php //********************************************************************************************************?>
<?php  if($_REQUEST['Event']=='Edit') {?>
 <td align="left" id="Ectc" valign="top">             
<form enctype="multipart/form-data" name="formEctc" method="post" onSubmit="return validate(this)">
<table border="0">

<tr>
 <td colspan="2">
  <table border="0">
   <tr>
    <td class="All_100">&nbsp;&nbsp;EmpCode :</td><td class="All_90"><input name="EmpCode" id="EmpCode" style="background-color:#E6EBC5;" class="All_80" value="<?php echo $EC; ?>" readonly></td>
    <td class="All_50">Name :</td><td class="All_220"><input name="EmpName" id="EmpName" style="width:210px; height:18px; font-size:11px;background-color:#E6EBC5;" value="<?php echo $Ename; ?>" readonly></td>
    <td class="All_150" valign="top">Allow Incentive&nbsp;:&nbsp;<input type="checkbox" id="EmpInctv" name="EmpInctv" value="" <?php if($ResCtc['INCENTIVE']=='Y') echo 'checked'; ?> disabled onClick="CheckIncentive()"/> 
	<br><br>
	
	</td>
    <?php //$Actpf=round((($ResCtc['BAS_Value']*12)/100)); $Ctcpf=$ResCtc['PF_Employee_Contri_Value']; ?>	
	
	<td class="All_200" valign="top">PF With Adjustment&nbsp;:&nbsp;<input type="checkbox" id="EmpActPf" name="EmpActPf" value="" <?php if($ResCtc['EmpActPf']=='Y') echo 'checked'; ?> disabled onClick="CheckEmpActPf()"/><input type="hidden" id="ActPFCheck" name="ActPFCheck" value="<?php echo $ResCtc['EmpActPf']; ?>" />
	<br>
	PF Without Adjustment&nbsp;:&nbsp;<input type="checkbox" id="EmpComActPf" name="EmpComActPf" value="" <?php if($ResCtc['EmpComActPf']=='Y') echo 'checked'; ?> disabled onClick="CheckEmpComActPf()"/>
	
	<?php if(date("Y")>=2020){ ?>
	<input type="hidden" id="ActComPFCheck" name="ActComPFCheck" value="Y" />
	<?php }else{ ?>
	<input type="hidden" id="ActComPFCheck" name="ActComPFCheck" value="<?php echo $ResCtc['EmpComActPf']; ?>" />
	<?php } ?>
	
	
	<br>
	PF With Allowances&nbsp;:&nbsp;<input type="checkbox" id="EmpBSActPf" name="EmpBSActPf" value="" <?php if($ResCtc['EmpBSActPf']=='Y') echo 'checked'; ?> disabled onClick="CheckEmpBSActPf()"/><input type="hidden" id="BSActPfCheck" name="BSActPfCheck" value="<?php echo $ResCtc['EmpBSActPf']; ?>" />
	</td>
	
  </tr>
 </table>
 </td>
</tr>





<tr> 
<td align="left" valign="top"> 
<input type="hidden" name="ComId" id="ComId" value="<?php echo $CompanyId; ?>"/>
<input type="hidden" name="StrBonus" id="StrBonusContri" value="<?php echo $ResStat['Lumpsum_BonusContribute']; ?>"/>
<input type="hidden" name="MaxBonus" id="MaxBonus" value="<?php echo $ResStat['Lumpsum_MaxBonus']; ?>"/> 
<input type="hidden" name="StrGrtuity" id="StrGrtuity" value="<?php echo $ResStat['Lumpsum_MaxGratuity']; ?>"/>
<input type="hidden" name="MaxGrtuity" id="MaxGrtuityDay" value="<?php echo $ResStat['Lumpsum_GratuityDay']; ?>"/>
<input type="hidden" name="Emp_MPP" id="Emp_MPP" value="<?php echo $ResStat['MedicalPolicyPremium']; ?>"/>
<input type="hidden" name="Convance" id="Convance" value="<?php echo $ResStat['ConvanceAllow']; ?>"/>
<input type="hidden" name="Pf_MaxSalPf" id="Pf_MaxSalPf" value="<?php echo $ResStat['Pf_MaxSalPf']; ?>"/>
<input type="hidden" name="TotBasHraCon" id="TotBasHraCon"/><input type="hidden" name="TotAnnualBasic" id="TotAnnualBasic"/>
<input type="hidden" name="OneDayBasic" id="OneDayBasic"/><input type="hidden" name="EmpTotMrLtaCea" id="EmpTotMrLtaCea"/>
<input type="hidden" name="LessSpeAllow" id="LessSpeAllow"/><input type="hidden" name="LimitPFbasic" id="LimitPFbasic"/>
<table border="1" width="700" id="TEmp" style="display:block; " cellpadding="1" cellspacing="2">
<tr>
 <td align="left" style="width:600px;font-size:11px; height:18px;" colspan="3">&nbsp;<b>[A] Monthly Components</b></td>
 <?php if($ResCtc['Tot_GrossMonth']>15000 && $ResCtc['EmpActPf']=='N'){ ?>
 <td align="center" style="width:100px;font-size:11px; height:18px;">&nbsp;<b>If:Actual PF</b></td>
 <?php } ?>
</tr>

<tr>
 <td align="left" class="All_10">&nbsp;</td><td align="left" class="All_300">&nbsp;<span id="BasSti">
<input type="hidden" value="B" name="Basic"/><?php if($ResCtc['BAS']=='Y' AND $ResCtc['BAS_Value']>0) { echo 'Basic'; } elseif($ResCtc['STIPEND']=='Y' AND $ResCtc['STIPEND_Value']>0) { echo 'Stipend'; }?></span> :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
<select name="BasicStipend" id="BasicStipend" class="All_80" onChange="SelectBasSti(this.value)" disabled>
<option value="B" <?php if($ResCtc['BAS']=='Y' AND $ResCtc['STIPEND']=='N') {echo 'selected';} ?>>Basic</option>
<option value="S" <?php if($ResCtc['BAS']=='N' AND $ResCtc['STIPEND']=='Y') {echo 'selected';} ?>>Stipend</option></select> </td>
 <td align="left" class="All_180">&nbsp;Rs. &nbsp;<input name="EmpBasic" id="EmpBasic" readonly value="<?php if($ResCtc['BAS']=='Y' AND $ResCtc['STIPEND']=='N') { echo $ResCtc['BAS_Value']; } if($ResCtc['BAS']=='N' AND $ResCtc['STIPEND']=='Y') { echo $ResCtc['STIPEND_Value']; }?>" class="All_100" onChange="ChangeBasic()" onKeyDown="ChangeBasic()"></td>
 
 <?php if($ResCtc['Tot_GrossMonth']>15000 && $ResCtc['EmpActPf']=='N'){ ?>
 <td align="right" style="width:100px;font-size:11px;background-color:#D8FB97;"><?php if($ResCtc['BAS']=='Y' AND $ResCtc['BAS_Value']>0) { echo intval($ResCtc['BAS_Value']); } elseif($ResCtc['STIPEND']=='Y' AND $ResCtc['STIPEND_Value']>0) { echo intval($ResCtc['STIPEND_Value']); }?>&nbsp;&nbsp;</td>
 <?php } ?>
</tr>

<tr><td align="left" class="All_10">&nbsp;<input type="checkbox" name="CheckHRA" id="CheckHRA" onClick="FunHRA()" disabled/></td>
    <td align="left" class="All_300" id="hraA">&nbsp;HRA :</td>
    <td align="left" class="All_180" id="hraB">&nbsp;Rs. &nbsp;<input name="EmpHRA" id="EmpHRA" value="<?php echo $ResCtc['HRA_Value']; ?>" class="All_100" onChange="HRCalcu(this.value)" onKeyDown="HRCalcu(this.value)" readonly /><select class="All_50" name="HRACalcu" id="HRACalcu" onChange="SelectHRCalcu(this.value)" disabled><option value="40" selected>40</option><option value="50">50</option></select>%</td>
	 <?php if($ResCtc['Tot_GrossMonth']>15000 && $ResCtc['EmpActPf']=='N'){ ?>
	 <td align="right" style="width:100px;font-size:11px;background-color:#D8FB97;" id="hraB"><?php echo intval($ResCtc['HRA_Value']); ?>&nbsp;&nbsp;</td>
	 <?php } ?>
	</tr>
	
<?php if($ResCtc['CONV_Value']>0){ ?>	
<tr><td align="left" class="All_10">&nbsp;<input type="checkbox" name="CheckCA" id="CheckCA" onClick="FunCA()" /></td>
    <td align="left" class="All_300" id="caA">&nbsp;Conveyance Allowance :</td>
    <td align="left" class="All_180" id="caB">&nbsp;Rs. &nbsp;<input name="EmpConAllow" value="<?php echo $ResCtc['CONV_Value']; ?>" id="EmpConAllow" onChange="ChangeCA()" onKeyDown="ChangeCA()" class="All_100"  readonly/></td>
	<?php if($ResCtc['Tot_GrossMonth']>15000 && $ResCtc['EmpActPf']=='N'){ ?>
	<td align="right" style="width:100px;font-size:11px;background-color:#D8FB97;" id="caB"><?php echo intval($ResCtc['CONV_Value']); ?>&nbsp;&nbsp;</td>
	<?php } ?>
	</tr>
<?php }else{ echo '<input type="hidden" name="EmpConAllow" value="0" id="EmpConAllow" readonly/>'; } ?>	


<?php /*************************** For Proposal **************/
if($ResCtc['Tot_GrossMonth']>15000 && $ResCtc['EmpActPf']=='N')
{

if($ResCtc['BAS']=='Y' AND $ResCtc['BAS_Value']>0){ $bs=$ResCtc['BAS_Value']; }elseif($ResCtc['STIPEND']=='Y' AND $ResCtc['STIPEND_Value']>0){ $bs=$ResCtc['STIPEND_Value']; }
 $Ac_Pf=round(($bs*12)/100); 
 if($Ac_Pf>$ResCtc['PF_Employee_Contri_Value'])
 {
  $diff_pf=$Ac_Pf-$ResCtc['PF_Employee_Contri_Value'];
  $Ac_Sp=$ResCtc['SPECIAL_ALL_Value']-$diff_pf;
  $Ac_GrossS=$ResCtc['Tot_GrossMonth']-$diff_pf;
  $Ac_Prop_GrossS=$ResCtc['GrossSalary_PostAnualComponent_Value']-$diff_pf;
  $Ac_NetSal=$ResCtc['NetMonthSalary_Value']-($diff_pf*2);
  $Ac_GrossS_Annual=$Ac_GrossS*12;
  $Ac_Com_PfContb=$ResCtc['PF_Employer_Contri_Annul']+($diff_pf*12);
 }
 else
 {
  $diff_pf=$ResCtc['PF_Employee_Contri_Value'];
  $Ac_Sp=$ResCtc['SPECIAL_ALL_Value'];
  $Ac_GrossS=$ResCtc['Tot_GrossMonth'];
  $Ac_Prop_GrossS=$ResCtc['GrossSalary_PostAnualComponent_Value'];
  //$Ac_NetSal=$ResCtc['NetMonthSalary_Value'];
  $Ac_NetSal=$ResCtc['GrossSalary_PostAnualComponent_Value']-($Ac_Pf+$ResCtc['ESCI']);
  $Ac_GrossS_Annual=$ResCtc['Tot_Gross_Annual'];
  $Ac_Com_PfContb=$ResCtc['PF_Employer_Contri_Annul'];  
 } 
 
} 
/*************************** For Proposal **************/ ?>

<?php $sqlB=mysql_query("select * from hrm_bonus_wages where BWageId=".$ResCtc['BWageId']." AND CompanyId=".$CompanyId." AND YearId=".$YearId); 
$resB=mysql_fetch_assoc($sqlB);
if(date("m")==01 OR date("m")==02 OR date("m")==03 OR date("m")==10 OR date("m")==11 OR date("m")==12)
{ $WagesBonus=$resB['PerMonthOct']; }
else
{ 
     $WagesBonus=$resB['PerMonthApr']; 
     //$WagesBonus=$resB['PerMonthOct'];
    
}
if($WagesBonus==''){$WagesBonus=0;}

//echo "aa=".$WagesBonus;

?>
<input type="hidden" name="BonusAmt" id="BonusAmt" value="<?php echo $WagesBonus; ?>"/>	
<input type="hidden" name="BWageId" id="BWageId" value="<?php echo $ResCtc['BWageId']; ?>"/>
<tr><td align="left" class="All_10">&nbsp;<input type="checkbox" name="CheckTA" id="CheckTA" onClick="FunTA()" disabled/></td>
    <td align="left" class="All_300" id="caA">&nbsp;Transport Allowance :</td>
    <td align="left" class="All_180" id="caB">&nbsp;Rs. &nbsp;<input name="TA" value="<?php echo $ResCtc['TA_Value']; ?>" id="TA" onChange="ChangeTA()" onKeyDown="ChangeTA()" class="All_100"  readonly/></td>
	<?php if($ResCtc['Tot_GrossMonth']>15000 && $ResCtc['EmpActPf']=='N'){ ?>
	<td align="right" style="width:100px;font-size:11px;background-color:#D8FB97;" id="saB"><?php echo intval($ResCtc['TA_Value']); ?>&nbsp;&nbsp;</td>
	<?php } ?>
</tr>	
	

<tr><td align="left" class="All_10">&nbsp;<input type="checkbox" name="CheckCarAllow" id="CheckCarAllow" onClick="FunCarAllow()" disabled/></td>
    <td align="left" class="All_300" id="caA">&nbsp;Car Allowance :</td>
    <td align="left" class="All_180" id="caB">&nbsp;Rs. &nbsp;<input name="CAR_ALL_Value" value="<?php echo $ResCtc['CAR_ALL_Value']; ?>" id="CAR_ALL_Value" onChange="ChangeCarAllow()" class="All_100"  readonly/></td>
	<?php if($ResCtc['Tot_GrossMonth']>15000 && $ResCtc['EmpActPf']=='N'){ ?>
	<td align="right" style="width:100px;font-size:11px;background-color:#D8FB97;" id="saB"><?php echo intval($ResCtc['CAR_ALL_Value']); ?>&nbsp;&nbsp;</td>
	<?php } ?>
</tr>	

<tr><td align="left" class="All_10">&nbsp;</td>
    <td align="left" class="All_300" id="caA">&nbsp;Bonus :</td>
    <td align="left" class="All_180" id="caB">&nbsp;Rs. &nbsp;<input name="Bonus_Month" value="<?php echo $ResCtc['Bonus_Month']; ?>" id="Bonus_Month" onChange="ChangeBonus_Month()" class="All_100"  readonly/></td>
	<?php if($ResCtc['Tot_GrossMonth']>15000 && $ResCtc['EmpActPf']=='N'){ ?>
	<td align="right" style="width:100px;font-size:11px;background-color:#D8FB97;" id="saB"><?php echo intval($ResCtc['Bonus_Month']); ?>&nbsp;&nbsp;</td>
	<?php } ?>
</tr>	 
 
<tr><td align="left" class="All_10">&nbsp;<input type="checkbox" name="CheckSA" id="CheckSA" onClick="FunCheckSA()" disabled="disabled"/></td>
    <td align="left" class="All_300" id="saA">&nbsp;Special Allowance :</td>
    <td align="left" class="All_180" id="saB">&nbsp;Rs. &nbsp;<input name="EmpSpeAllow" value="<?php echo $ResCtc['SPECIAL_ALL_Value']; ?>" id="EmpSpeAllow" class="All_100" readonly/>
    <input type="hidden" name="ESA2" value="<?php echo $ResCtc['SPECIAL_ALL_Value']; ?>" id="ESA2" class="All_100" readonly/></td>
	<?php if($ResCtc['Tot_GrossMonth']>15000 && $ResCtc['EmpActPf']=='N'){ ?>
	<td align="right" style="width:100px;font-size:11px;background-color:#D8FB97;" id="saB"><?php echo intval($Ac_Sp); ?>&nbsp;&nbsp;</td>
	<?php } ?>
</tr> 
  
<?php /*<tr><td align="left" class="All_10">&nbsp;<input type="checkbox" name="CheckSA" id="CheckSA" checked onClick="CheckSA()" disabled/></td>
    <td align="left" class="All_300" id="saA">&nbsp;Special Allowance :</td>
    <td align="left" class="All_180" id="saB">&nbsp;Rs. &nbsp;<input name="EmpSpeAllow" value="<?php echo $ResCtc['SPECIAL_ALL_Value']; ?>" id="EmpSpeAllow" class="All_100" readonly/>
    <input type="hidden" name="ESA2" value="<?php echo $ResCtc['SPECIAL_ALL_Value']; ?>" id="ESA2" class="All_100" readonly/></td></tr> */ ?>
	
<tr><td align="left" class="All_10">&nbsp;</td><td align="left" class="All_300">&nbsp;Gross Monthly Salary :</td>
    <td align="left" class="All_180">&nbsp;Rs. &nbsp;<input name="EmpGrossMonSalary" value="<?php echo $ResCtc['Tot_GrossMonth']; ?>" id="EmpGrossMonSalary" onChange="GrossSalary()" onKeyUp="GrossSalary()" class="All_100" readonly/><input type="hidden" name="GrossMonSalary_PAC" value="<?php if($ResCtc['GrossSalary_PostAnualComponent_Value']>0) { echo $ResCtc['GrossSalary_PostAnualComponent_Value']; } else { echo $ResCtc['Tot_GrossMonth']; } ?>" id="GrossMonSalary_PAC" class="All_100" readonly/></td>
	<?php if($ResCtc['Tot_GrossMonth']>15000 && $ResCtc['EmpActPf']=='N'){ ?>
	<td align="right" style="width:100px;font-size:11px;background-color:#D8FB97;"><?php echo intval($Ac_GrossS); ?>&nbsp;&nbsp;</td>
	<?php } ?>
</tr>
  <?php //onChange="GrossSalary()" onKeyDown="GrossSalary()" onClick="GrossSalary()" ?>
  
<tr><td align="left" class="All_10">&nbsp;</td><td align="left" class="All_300">&nbsp;Gross Monthly Salary (Post Annual Components):</td>
    <td align="left" class="All_180">&nbsp;Rs. &nbsp;<input name="GMS_PAC" value="<?php if($ResCtc['GrossSalary_PostAnualComponent_Value']>0) { echo $ResCtc['GrossSalary_PostAnualComponent_Value']; } else { echo $ResCtc['Tot_GrossMonth']; } ?>" id="GMS_PAC" class="All_100" readonly/></td>
	<?php if($ResCtc['Tot_GrossMonth']>15000 && $ResCtc['EmpActPf']=='N'){ ?>
	<td align="right" style="width:100px;font-size:11px;background-color:#D8FB97;"><?php echo intval($Ac_Prop_GrossS); ?>&nbsp;&nbsp;</td>
	<?php } ?>
</tr>
	
<tr><td align="left" class="All_10">&nbsp;<input type="checkbox" name="CheckPF" id="CheckPF" checked onClick="CheckPF()" disabled/></td>
    <td align="left" class="All_300" id="pfA">&nbsp;Provident Fund :</td>
    <td align="left" class="All_180" id="pfB">&nbsp;Rs. &nbsp;<input name="EmpProviFund" value="<?php echo $ResCtc['PF_Employee_Contri_Value']; ?>" id="EmpProviFund" class="All_100" readonly />&nbsp;<?php /*+ */ ?>&nbsp;<input type="hidden" name="Extra_MrLtaCea" value="0" id="Extra_MrLtaCea" class="All_60" readonly/></td>
	<?php if($ResCtc['Tot_GrossMonth']>15000 && $ResCtc['EmpActPf']=='N'){ ?>
	<td align="right" style="width:100px;font-size:11px;background-color:#D8FB97;" id="pfB"><?php echo intval($Ac_Pf); ?>&nbsp;&nbsp;</td>
	<?php } ?>
</tr>
	
<?php /* ESCI  ESCI  ESCI  ESCI  ESCI  ESCI  ESCI  ESCI  ESCI  ESCI  ESCI  ESCI  ESCI  ESCI  ESCI  ESCI OPEN */ ?>

<tr><td align="left" class="All_10">&nbsp;<input type="checkbox" name="CheckESCI" id="CheckESCI" onClick="FunCheckESCI()" <?php if($ResCtc['ESCI']>0){echo 'checked';} ?> disabled/></td>
    <td align="left" class="All_300" id="pfA">&nbsp;ESIC :</td>
    <td align="left" class="All_180" id="pfB">&nbsp;Rs. &nbsp;<input name="EmpESCI" value="<?php echo $ResCtc['ESCI']; ?>" id="EmpESCI" class="All_100" onChange="Fun2CheckESCI()" onBlur="Fun2CheckESCI()" readonly />&nbsp;<?php /*+ */ ?>&nbsp;<input type="hidden" name="ESCI" value="0" id="ESCI" class="All_60" readonly/><input type="hidden" name="ComESCI" value="0" id="ComESCI" class="All_60" readonly/></td>
	<?php if($ResCtc['Tot_GrossMonth']>15000 && $ResCtc['EmpActPf']=='N'){ ?>
	<td align="right" style="width:100px;font-size:11px;background-color:#D8FB97;" id="pfB"><?php echo intval($ResCtc['ESCI']); ?>&nbsp;&nbsp;</td>
	<?php } ?>
</tr>

<?php /* ESCI  ESCI  ESCI  ESCI  ESCI  ESCI  ESCI  ESCI  ESCI  ESCI  ESCI  ESCI  ESCI  ESCI  ESCI  ESCI CLOSE */ ?>


<?php /********* NPS NPS NPS **********/ ?>
<tr><td align="left" class="All_10">&nbsp;</td>
    <td align="left" class="All_300" id="pfA">&nbsp;NPS Contribution :</td>
    <td align="left" class="All_180" id="pfB">&nbsp;Rs. &nbsp;<input name="NPS_Value" value="<?php echo $ResCtc['NPS_Value']; ?>" id="NPS_Value" class="All_100" onKeyDown="FunNPS_Value()" onChange="FunNPS_Value()" onBlur="FunNPS_Value()" readonly />&nbsp;</td>
	<?php if($ResCtc['Tot_GrossMonth']>15000 && $ResCtc['EmpActPf']=='N'){ ?>
	<td align="right" style="width:100px;font-size:11px;background-color:#D8FB97;" id="pfB"><?php echo intval($ResCtc['NPS_Value']); ?>&nbsp;&nbsp;</td>
	<?php } ?>
</tr>
<?php /********* NPS NOPS NPS **********/?>	

	
<tr><td align="left" class="All_10">&nbsp;</td><td align="left" class="All_300">&nbsp;Net Monthaly Salary :</td>
    <td align="left" class="All_180">&nbsp;Rs. &nbsp;<input style="background-color:#DCEEF1;" value="<?php echo $ResCtc['NetMonthSalary_Value']; ?>" name="EmpNetMonSalary" id="EmpNetMonSalary" class="All_100" readonly/><input type="hidden" value="<?php echo $ResCtc['NetMonthSalary_Value']; ?>" id="NetMonSalary" readonly/></td>
	<?php if($ResCtc['Tot_GrossMonth']>15000 && $ResCtc['EmpActPf']=='N'){ ?>
	<td align="right" style="width:100px;font-size:11px;background-color:#D8FB97;"><b><?php echo intval($Ac_NetSal); ?></b>&nbsp;&nbsp;</td>
	<?php } ?>
</tr>
	
<tr><td align="left" style="width:650px;font-size:11px; height:18px;" colspan="3">&nbsp;<b>[B] Annual Components (Tax saving components which shall be reimbursed on production of documents)</b></td>
    <?php if($ResCtc['Tot_GrossMonth']>15000 && $ResCtc['EmpActPf']=='N'){ ?>
	<td></td>
	<?php } ?>
</tr>

<script>
function FunMR() 
{ if(document.getElementById("CheckMR").checked==true)
   { var MR_value = parseFloat(document.getElementById("MR_value").value);  var VSpeAllow = parseFloat(document.getElementById("EmpSpeAllow").value);
     var VGrossMonSalary_PAC = parseFloat(document.getElementById("GrossMonSalary_PAC").value); var VGMS_PAC = parseFloat(document.getElementById("GMS_PAC").value);
	 var VEmpProviFund = parseFloat(document.getElementById("EmpProviFund").value); var VEmpNetMonSalary = parseFloat(document.getElementById("EmpNetMonSalary").value);
     var Extra_MrLtaCea = parseFloat(document.getElementById("Extra_MrLtaCea").value);
	 var VSpeAllow = parseFloat(document.getElementById("EmpSpeAllow").value);
     var C_MRYear = document.getElementById("EmpMediReim").value=Math.round((MR_value*12)*100)/100;
     var C_SpeAllow = document.getElementById("EmpSpeAllow").value=Math.round((VSpeAllow-MR_value)*100)/100; 
	 var C_GrossMonSalary_PAC = document.getElementById("GrossMonSalary_PAC").value=Math.round((VGrossMonSalary_PAC-MR_value)*100)/100;
	 var C_GMS_PAC = document.getElementById("GMS_PAC").value=Math.round((VGMS_PAC-MR_value)*100)/100;
	 var Cal_EmpNetMonSalary = document.getElementById("EmpNetMonSalary").value=Math.round((C_GrossMonSalary_PAC-VEmpProviFund)*100)/100;
	 var C_Extra_MrLtaCea = document.getElementById("Extra_MrLtaCea").value=Math.round((Extra_MrLtaCea+MR_value)*100)/100;}
  else if(document.getElementById("CheckMR").checked==false)
        { var VSpeAllow = parseFloat(document.getElementById("EmpSpeAllow").value); var MR_value = parseFloat(document.getElementById("MR_value").value);
		  var Extra_MrLtaCea = parseFloat(document.getElementById("Extra_MrLtaCea").value);
		  var VGrossMonSalary_PAC = parseFloat(document.getElementById("GrossMonSalary_PAC").value); var VGMS_PAC = parseFloat(document.getElementById("GMS_PAC").value);
		  var VEmpProviFund = parseFloat(document.getElementById("EmpProviFund").value); var VEmpNetMonSalary = parseFloat(document.getElementById("EmpNetMonSalary").value);
		  var C2_SpeAllow = document.getElementById("EmpSpeAllow").value=Math.round((VSpeAllow+MR_value)*100)/100;
		  var C2_GrossMonSalary_PAC = document.getElementById("GrossMonSalary_PAC").value=Math.round((VGrossMonSalary_PAC+MR_value)*100)/100;
	      var C2_GMS_PAC = document.getElementById("GMS_PAC").value=Math.round((VGMS_PAC+MR_value)*100)/100; 
		  var C2_EmpNetMonSalary = document.getElementById("EmpNetMonSalary").value=Math.round((C2_GrossMonSalary_PAC-VEmpProviFund)*100)/100;
		  document.getElementById("EmpMediReim").value=0;
		  var C_Extra_MrLtaCea = document.getElementById("Extra_MrLtaCea").value=Math.round((Extra_MrLtaCea-MR_value)*100)/100; 
		}
}

function FunLTA() 
{ if(document.getElementById("CheckLTA").checked==true)
   { var VBasic = parseFloat(document.getElementById("EmpBasic").value);  var VSpeAllow = parseFloat(document.getElementById("EmpSpeAllow").value); 
     var VGrossMonSalary_PAC = parseFloat(document.getElementById("GrossMonSalary_PAC").value); var VGMS_PAC = parseFloat(document.getElementById("GMS_PAC").value);
	 var VEmpProviFund = parseFloat(document.getElementById("EmpProviFund").value); var VEmpNetMonSalary = parseFloat(document.getElementById("EmpNetMonSalary").value);
     var LTABasicInto_value = parseFloat(document.getElementById("LTABasicInto_value").value); var Extra_MrLtaCea = parseFloat(document.getElementById("Extra_MrLtaCea").value);
     var C_LTAYear = document.getElementById("EmpLeaveTraAllow").value=Math.round(((VBasic*LTABasicInto_value)*100)/100,0);
	 var C_LTAMonth = Math.round(((C_LTAYear/12)*100)/100,0); 
	 var C_SpeAllow = document.getElementById("EmpSpeAllow").value=Math.round((VSpeAllow-C_LTAMonth)*100)/100; 
	 var C_GrossMonSalary_PAC = document.getElementById("GrossMonSalary_PAC").value=Math.round((VGrossMonSalary_PAC-C_LTAMonth)*100)/100;
	 var C_GMS_PAC = document.getElementById("GMS_PAC").value=Math.round((VGMS_PAC-C_LTAMonth)*100)/100;
	 var C2_EmpNetMonSalary = document.getElementById("EmpNetMonSalary").value=Math.round((C_GrossMonSalary_PAC-VEmpProviFund)*100)/100;
	 var C_Extra_MrLtaCea = document.getElementById("Extra_MrLtaCea").value=Math.round((Extra_MrLtaCea+C_LTAMonth)*100)/100;}
  else if(document.getElementById("CheckLTA").checked==false)
        { var VBasic = parseFloat(document.getElementById("EmpBasic").value);  var VSpeAllow = parseFloat(document.getElementById("EmpSpeAllow").value); 
		  var LTABasicInto_value = parseFloat(document.getElementById("LTABasicInto_value").value); var Extra_MrLtaCea = parseFloat(document.getElementById("Extra_MrLtaCea").value);
		  var VGrossMonSalary_PAC = parseFloat(document.getElementById("GrossMonSalary_PAC").value); var VGMS_PAC = parseFloat(document.getElementById("GMS_PAC").value);
		  var VEmpProviFund = parseFloat(document.getElementById("EmpProviFund").value); var VEmpNetMonSalary = parseFloat(document.getElementById("EmpNetMonSalary").value);
		  var C_LTAYear = Math.round(((VBasic*LTABasicInto_value)*100)/100,0);
	      var C_LTAMonth =Math.round(((C_LTAYear/12)*100)/100,0);
		  var C2_SpeAllow = document.getElementById("EmpSpeAllow").value=Math.round((VSpeAllow+C_LTAMonth)*100)/100; 
		  var C2_GrossMonSalary_PAC = document.getElementById("GrossMonSalary_PAC").value=Math.round((VGrossMonSalary_PAC+C_LTAMonth)*100)/100;
	      var C2_GMS_PAC = document.getElementById("GMS_PAC").value=Math.round((VGMS_PAC+C_LTAMonth)*100)/100;
		  var C2_EmpNetMonSalary = document.getElementById("EmpNetMonSalary").value=Math.round((C2_GrossMonSalary_PAC-VEmpProviFund)*100)/100;
		  document.getElementById("EmpLeaveTraAllow").value=0; 
		  var C_Extra_MrLtaCea = document.getElementById("Extra_MrLtaCea").value=Math.round((Extra_MrLtaCea-C_LTAMonth)*100)/100; 
		}
}


function FunCEA() 
{ if(document.getElementById("CheckCEA").checked==true)
   { var CEA_value = parseFloat(document.getElementById("CEA_value").value); var VSpeAllow = parseFloat(document.getElementById("EmpSpeAllow").value);
     var VGrossMonSalary_PAC = parseFloat(document.getElementById("GrossMonSalary_PAC").value); var VGMS_PAC = parseFloat(document.getElementById("GMS_PAC").value);
	 var VEmpProviFund = parseFloat(document.getElementById("EmpProviFund").value); var VEmpNetMonSalary = parseFloat(document.getElementById("EmpNetMonSalary").value);
     var Extra_MrLtaCea = parseFloat(document.getElementById("Extra_MrLtaCea").value);
     var C_CEAYear = document.getElementById("EmpChildEduAllow").value=Math.round((CEA_value*12)*100)/100;
	 var C_SpeAllow = document.getElementById("EmpSpeAllow").value=Math.round((VSpeAllow-CEA_value)*100)/100;
	 var C_GrossMonSalary_PAC = document.getElementById("GrossMonSalary_PAC").value=Math.round((VGrossMonSalary_PAC-CEA_value)*100)/100;
	 var C_GMS_PAC = document.getElementById("GMS_PAC").value=Math.round((VGMS_PAC-CEA_value)*100)/100;
	 var C2_EmpNetMonSalary = document.getElementById("EmpNetMonSalary").value=Math.round((C_GrossMonSalary_PAC-VEmpProviFund)*100)/100;
     document.getElementById("CheckC1").checked=true; document.getElementById("CheckC1").disabled=true; document.getElementById("CheckC2").disabled=false; 
	 var C_Extra_MrLtaCea = document.getElementById("Extra_MrLtaCea").value=Math.round((Extra_MrLtaCea+CEA_value)*100)/100;}
  else if(document.getElementById("CheckCEA").checked==false && document.getElementById("CheckC2").checked==false)
        { var CEA_value = parseFloat(document.getElementById("CEA_value").value); var VSpeAllow = parseFloat(document.getElementById("EmpSpeAllow").value);
		  var VGrossMonSalary_PAC = parseFloat(document.getElementById("GrossMonSalary_PAC").value); var VGMS_PAC = parseFloat(document.getElementById("GMS_PAC").value);
		  var VEmpProviFund = parseFloat(document.getElementById("EmpProviFund").value); var VEmpNetMonSalary = parseFloat(document.getElementById("EmpNetMonSalary").value);
		  var Extra_MrLtaCea = parseFloat(document.getElementById("Extra_MrLtaCea").value);
	      var C2_SpeAllow = document.getElementById("EmpSpeAllow").value=Math.round((VSpeAllow+CEA_value)*100)/100; 
		  var C2_GrossMonSalary_PAC = document.getElementById("GrossMonSalary_PAC").value=Math.round((VGrossMonSalary_PAC+CEA_value)*100)/100;
	      var C2_GMS_PAC = document.getElementById("GMS_PAC").value=Math.round((VGMS_PAC+CEA_value)*100)/100;
		  var C2_EmpNetMonSalary = document.getElementById("EmpNetMonSalary").value=Math.round((C2_GrossMonSalary_PAC-VEmpProviFund)*100)/100;
		  var C_Extra_MrLtaCea = document.getElementById("Extra_MrLtaCea").value=Math.round((Extra_MrLtaCea-CEA_value)*100)/100;
	      document.getElementById("EmpChildEduAllow").value=0; document.getElementById("CheckC1").checked=false; 
		  document.getElementById("CheckC2").checked=false; document.getElementById("CheckC1").disabled=true; document.getElementById("CheckC2").disabled=true; }
       else if(document.getElementById("CheckCEA").checked==false && document.getElementById("CheckC2").checked==true)
             { var CEA_value = parseFloat(document.getElementById("CEA_value").value); var VSpeAllow = parseFloat(document.getElementById("EmpSpeAllow").value);
			   var VGrossMonSalary_PAC = parseFloat(document.getElementById("GrossMonSalary_PAC").value); var VGMS_PAC = parseFloat(document.getElementById("GMS_PAC").value);
			   var VEmpProviFund = parseFloat(document.getElementById("EmpProviFund").value); var VEmpNetMonSalary = parseFloat(document.getElementById("EmpNetMonSalary").value);
			   var Extra_MrLtaCea = parseFloat(document.getElementById("Extra_MrLtaCea").value);
			   var CEA_value2 = Math.round((CEA_value*2)*100)/100;
               var C2_SpeAllow = document.getElementById("EmpSpeAllow").value=Math.round((VSpeAllow+CEA_value2)*100)/100; 
			   var C2_GrossMonSalary_PAC = document.getElementById("GrossMonSalary_PAC").value=Math.round((VGrossMonSalary_PAC+CEA_value2)*100)/100;
	           var C2_GMS_PAC = document.getElementById("GMS_PAC").value=Math.round((VGMS_PAC+CEA_value2)*100)/100;
			   var C2_EmpNetMonSalary = document.getElementById("EmpNetMonSalary").value=Math.round((C2_GrossMonSalary_PAC-VEmpProviFund)*100)/100;
			   var C_Extra_MrLtaCea = document.getElementById("Extra_MrLtaCea").value=Math.round((Extra_MrLtaCea-CEA_value2)*100)/100;
	           document.getElementById("EmpChildEduAllow").value=0; document.getElementById("CheckC1").checked=false; 
			   document.getElementById("CheckC2").checked=false; document.getElementById("CheckC1").disabled=true; document.getElementById("CheckC2").disabled=true; 
		     }  
} 


function FunChild2()
{ if(document.getElementById("CheckC2").checked==true)
   { var CEA_value = parseFloat(document.getElementById("CEA_value").value); var VSpeAllow = parseFloat(document.getElementById("EmpSpeAllow").value);
     var EmpChildEduAllow = parseFloat(document.getElementById("EmpChildEduAllow").value); var Extra_MrLtaCea = parseFloat(document.getElementById("Extra_MrLtaCea").value);
	 var VGrossMonSalary_PAC = parseFloat(document.getElementById("GrossMonSalary_PAC").value); var VGMS_PAC = parseFloat(document.getElementById("GMS_PAC").value);
	 var VEmpProviFund = parseFloat(document.getElementById("EmpProviFund").value); var VEmpNetMonSalary = parseFloat(document.getElementById("EmpNetMonSalary").value);
     var C_CEAYear2 = Math.round((CEA_value*12)*100)/100;
	 var C_CEAYearTwoChild = document.getElementById("EmpChildEduAllow").value=Math.round((EmpChildEduAllow+C_CEAYear2)*100)/100;
	 var C_SpeAllow = document.getElementById("EmpSpeAllow").value=Math.round((VSpeAllow-CEA_value)*100)/100; 
	 var C2_GrossMonSalary_PAC = document.getElementById("GrossMonSalary_PAC").value=Math.round((VGrossMonSalary_PAC-CEA_value)*100)/100;
	 var C2_GMS_PAC = document.getElementById("GMS_PAC").value=Math.round((VGMS_PAC-CEA_value)*100)/100;
	 var C2_EmpNetMonSalary = document.getElementById("EmpNetMonSalary").value=Math.round((C2_GrossMonSalary_PAC-VEmpProviFund)*100)/100;
	 var C_Extra_MrLtaCea = document.getElementById("Extra_MrLtaCea").value=Math.round((Extra_MrLtaCea+CEA_value)*100)/100;}
  else if(document.getElementById("CheckC2").checked==false)
        { var CEA_value = parseFloat(document.getElementById("CEA_value").value); var VSpeAllow = parseFloat(document.getElementById("EmpSpeAllow").value);
          var EmpChildEduAllow = parseFloat(document.getElementById("EmpChildEduAllow").value); var Extra_MrLtaCea = parseFloat(document.getElementById("Extra_MrLtaCea").value);
		  var VGrossMonSalary_PAC = parseFloat(document.getElementById("GrossMonSalary_PAC").value); var VGMS_PAC = parseFloat(document.getElementById("GMS_PAC").value);
		  var VEmpProviFund = parseFloat(document.getElementById("EmpProviFund").value); var VEmpNetMonSalary = parseFloat(document.getElementById("EmpNetMonSalary").value);
		  var C_CEAYear2 = Math.round((CEA_value*12)*100)/100;
		  var C_CEAYearTwoChild = document.getElementById("EmpChildEduAllow").value=Math.round((EmpChildEduAllow-C_CEAYear2)*100)/100;
		  var C2_SpeAllow = document.getElementById("EmpSpeAllow").value=Math.round((VSpeAllow+CEA_value)*100)/100;
		  var C2_GrossMonSalary_PAC = document.getElementById("GrossMonSalary_PAC").value=Math.round((VGrossMonSalary_PAC+CEA_value)*100)/100;
	      var C2_GMS_PAC = document.getElementById("GMS_PAC").value=Math.round((VGMS_PAC+CEA_value)*100)/100;
		  var C2_EmpNetMonSalary = document.getElementById("EmpNetMonSalary").value=Math.round((C2_GrossMonSalary_PAC-VEmpProviFund)*100)/100;
		  var C_Extra_MrLtaCea = document.getElementById("Extra_MrLtaCea").value=Math.round((Extra_MrLtaCea-CEA_value)*100)/100;
        }
}
</script>

<input type="hidden" name="MR_value" id="MR_value" value="<?php echo $ResStat['MR_PerMonth']; ?>" />
<input type="hidden" name="LTA_value" id="LTA_value" value="<?php echo $ResStat['']; ?>" /> 
<input type="hidden" name="LTABasicInto" id="LTABasicInto_value" value="<?php echo $ResStat['LTA_BasicInto']; ?>" />
<input type="hidden" name="CEA_value" id="CEA_value" value="<?php echo $ResStat['CEA_PerChildMonth']; ?>"/>

<?php if($ResCtc['MED_REM_Value']>0){?>
<tr>
  <td align="left" class="All_10">&nbsp;<input type="checkbox" name="CheckMR" id="CheckMR" onClick="FunMR()" <?php if($ResCtc['MED_REM_Value']>0){echo 'checked';} ?> />
  <?php $OneChild=$ResStat['CEA_PerChildMonth']*12; $TwoChild=$OneChild*2;?></td>
  <td align="left" class="All_300" id="mrA">&nbsp;Medical Reimbursement :</td>
  <td align="left" class="All_180" id="mrB">&nbsp;Rs. &nbsp;<input name="EmpMediReim" value="<?php echo $ResCtc['MED_REM_Value']; ?>" id="EmpMediReim" onChange="return ChangeMR(this.value)" onKeyDown="return ChangeMR(this.value)" class="All_100" readonly/></td>
  <?php if($ResCtc['Tot_GrossMonth']>15000 && $ResCtc['EmpActPf']=='N'){ ?>
  <td align="right" style="width:100px;font-size:11px;background-color:#D8FB97;" id="mrB"><?php echo intval($ResCtc['MED_REM_Value']); ?>&nbsp;&nbsp;</td>
  <?php } ?>
  </tr>
<?php }else{ echo '<input type="hidden" name="EmpMediReim" value="0" id="EmpMediReim" readonly/>'; } ?>  
  
<tr><td align="left" class="All_10">&nbsp;<input type="checkbox" name="CheckLTA" id="CheckLTA" onClick="FunLTA()" disabled <?php if($ResCtc['LTA_Value']>0){echo 'checked';} ?> /></td>
    <td align="left" class="All_300" id="ltaA">&nbsp;Leave Travel Allowance :</td>
    <td align="left" class="All_180" id="ltaB">&nbsp;Rs. &nbsp;<input name="EmpLeaveTraAllow" value="<?php echo $ResCtc['LTA_Value']; ?>" id="EmpLeaveTraAllow" onChange="return ChangeLTA(this.value)" onKeyDown="return ChangeLTA(this.value)" class="All_100" readonly/></td>
	<?php if($ResCtc['Tot_GrossMonth']>15000 && $ResCtc['EmpActPf']=='N'){ ?>
	<td align="right" style="width:100px;font-size:11px;background-color:#D8FB97;" id="ltaB"><?php echo intval($ResCtc['LTA_Value']); ?>&nbsp;&nbsp;</td>
	<?php } ?>
</tr>
	
<tr><td align="left" class="All_10">&nbsp;<input type="checkbox" name="CheckCEA" id="CheckCEA" onClick="FunCEA()" disabled <?php if($ResCtc['CHILD_EDU_ALL_Value']>0){echo 'checked';} ?> /></td>
   <td align="left" class="All_300" id="ceaA">&nbsp;Children Education Allow. :&nbsp;&nbsp;Child1 :<input type="checkbox" name="CheckC1" id="CheckC1" onClick="FunChild1()" disabled <?php if($ResCtc['CHILD_EDU_ALL_Value']==$OneChild OR $ResCtc['CHILD_EDU_ALL_Value']==$TwoChild){echo 'checked';} ?> />&nbsp;Child2 :<input type="checkbox" name="CheckC2" id="CheckC2" onClick="FunChild2()" disabled <?php if($ResCtc['CHILD_EDU_ALL_Value']==$TwoChild){echo 'checked';} ?> /></td>
   <td align="left" class="All_180" id="ceaB">&nbsp;Rs. &nbsp;<input name="EmpChildEduAllow" value="<?php echo $ResCtc['CHILD_EDU_ALL_Value']; ?>" id="EmpChildEduAllow" onChange="return ChangeCEA(this.value)" onKeyDown="return ChangeCEA(this.value)" class="All_100" readonly/></td>
   <?php if($ResCtc['Tot_GrossMonth']>15000 && $ResCtc['EmpActPf']=='N'){ ?>
   <td align="right" style="width:100px;font-size:11px;background-color:#D8FB97;" id="ceaB"><?php echo intval($ResCtc['CHILD_EDU_ALL_Value']); ?>&nbsp;&nbsp;</td>
   <?php } ?>
</tr>
   
<tr><td align="left" class="All_10">&nbsp;</td><td align="left" class="All_300">&nbsp;Annual Gross Salary :</td>
    <td align="left" class="All_180">&nbsp;Rs. &nbsp;<input style="background-color:#DCEEF1;" value="<?php echo $ResCtc['Tot_Gross_Annual']; ?>" name="EmpAnnGrossSalary" id="EmpAnnGrossSalary" class="All_100" /></td>
	<?php if($ResCtc['Tot_GrossMonth']>15000 && $ResCtc['EmpActPf']=='N'){ ?>
	<td align="right" style="width:100px;font-size:11px;background-color:#D8FB97;"><?php echo intval($Ac_GrossS_Annual); ?>&nbsp;&nbsp;</td>
	<?php } ?>
</tr>
	
<tr><td align="left" style="width:650px;font-size:11px; height:18px;" colspan="3">&nbsp;<b>[C] Other Annual Components (Statutory components)</b></td>
    <?php if($ResCtc['Tot_GrossMonth']>15000 && $ResCtc['EmpActPf']=='N'){ ?>
	<td></td>
	<?php } ?>
</tr>

<?php /*?><tr><td align="left" class="All_10">&nbsp;<input type="checkbox" name="CheckBonus" id="CheckBonus" checked onClick="ClickCheckBonus()" disabled/></td> 
    <td align="left" class="All_300" id="bonusA">&nbsp;Bonus/Exgretia :&nbsp;&nbsp;<input type="checkbox" name="CBns" id="CBns" onClick="ClickCBns()" <?php if($ResCtc['BONUS_Value']>0){echo 'checked';} ?> disabled/></td>
	<td align="left" class="All_180" id="bonusB">&nbsp;Rs. &nbsp;<input name="EmpBonusExg" value="<?php echo $ResCtc['BONUS_Value']; ?>" id="EmpBonusExg" class="All_100" readonly/></td>
    <?php if($ResCtc['Tot_GrossMonth']>15000 && $ResCtc['EmpActPf']=='N'){ ?>
	<td align="right" style="width:100px;font-size:11px;background-color:#D8FB97;" id="bonusB"><?php echo intval($ResCtc['BONUS_Value']); ?>&nbsp;&nbsp;</td>
	<?php } ?> 
</tr><?php */?>
<input type="hidden" name="CheckBonus" id="CheckBonus" checked onClick="ClickCheckBonus()" disabled/>
<input type="hidden" name="EmpBonusExg" value="<?php echo $ResCtc['BONUS_Value']; ?>" id="EmpBonusExg" class="All_100" readonly/>
	
<tr><td align="left" class="All_10">&nbsp;<input type="checkbox" name="CheckGratuity" id="CheckGratuity" checked onClick="CheckGratuity()" disabled/></td>
  <td align="left" class="All_300" id="gratuityA">&nbsp;Estimated Gratuity :</td>
  <td align="left" class="All_180" id="gratuityB">&nbsp;Rs. &nbsp;<input name="EmpEstiGratuity" value="<?php echo $ResCtc['GRATUITY_Value']; ?>" id="EmpEstiGratuity" class="All_100" readonly/></td>
  <?php if($ResCtc['Tot_GrossMonth']>15000 && $ResCtc['EmpActPf']=='N'){ ?>
  <td align="right" style="width:100px;font-size:11px;background-color:#D8FB97;" id="gratuityB"><?php echo intval($ResCtc['GRATUITY_Value']); ?>&nbsp;&nbsp;</td>
  <?php } ?>
</tr>
  
<tr><td align="left" class="All_10">&nbsp;<input type="checkbox" name="CheckPFContri" id="CheckPFContri" checked onClick="CheckPFContri()" disabled/></td>
    <td align="left" class="All_300" id="pfcontriA">&nbsp;Employer's PF Contribustion :</td>
    <td align="left" class="All_180" id="pfcontriB">&nbsp;Rs. &nbsp;<input name="EmpEmployerPFContri" value="<?php echo $ResCtc['PF_Employer_Contri_Annul']; ?>" id="EmpEmployerPFContri" class="All_100" readonly/></td>
    <?php if($ResCtc['Tot_GrossMonth']>15000 && $ResCtc['EmpActPf']=='N'){ ?>
	<td align="right" style="width:100px;font-size:11px;background-color:#D8FB97;" id="pfcontriB"><?php echo intval($Ac_Com_PfContb); ?>&nbsp;&nbsp;</td>
	<?php } ?>
</tr>
	
<tr><td align="left" class="All_10">&nbsp;</td>
    <td align="left" class="All_300" id="mppA">&nbsp;Employer's ESCI Contribustion :</td>
    <td align="left" class="All_180" id="mppB">&nbsp;Rs. &nbsp;<input name="AnnualESCI" value="<?php echo $ResCtc['AnnualESCI']; ?>" id="AnnualESCI" class="All_100" readonly/></td>
	<?php if($ResCtc['Tot_GrossMonth']>15000 && $ResCtc['EmpActPf']=='N'){ ?>
	<td align="right" style="width:100px;font-size:11px;background-color:#D8FB97;" id="mppB"><?php echo intval($ResCtc['AnnualESCI']); ?>&nbsp;&nbsp;</td>
	<?php } ?>
</tr>	
	
<tr><td align="left" class="All_10">&nbsp;<input type="checkbox" name="CheckMPP" id="CheckMPP" onClick="FunMPP()" disabled Checked/></td>
    <td align="left" class="All_300" id="mppA">&nbsp;Mediclaim Policy Premium :</td>
    <td align="left" class="All_180" id="mppB">&nbsp;Rs. &nbsp;<input name="EmpMediPoliPremium" value="<?php echo $ResCtc['Mediclaim_Policy']; ?>" id="EmpMediPoliPremium" onChange="ChangeMPP()" onKeyDown="ChangeMPP()" class="All_100" readonly/><input type="hidden" id="EMediPP" value="<?php echo $ResCtc['Mediclaim_Policy']; ?>" readonly/></td>
    <?php if($ResCtc['Tot_GrossMonth']>15000 && $ResCtc['EmpActPf']=='N'){ ?>
	<td align="right" style="width:100px;font-size:11px;background-color:#D8FB97;" id="mppB"><?php echo intval($ResCtc['Mediclaim_Policy']); ?>&nbsp;&nbsp;</td>
	<?php } ?>
</tr>
		<?php //$ResStat['MedicalPolicyPremium'] ?>
<tr><td align="left" class="All_10">&nbsp;</td><td align="left" class="All_300">&nbsp;Total Cost to Company :</td>
    <td align="left" class="All_180">&nbsp;Rs. &nbsp;<input style="background-color:#DCEEF1;" value="<?php echo $ResCtc['Tot_CTC']; ?>" name="EmpTotalCtc" id="EmpTotalCtc" class="All_100" /><input type="hidden" id="HideBonus" value="0" /><input type="hidden" id="HideCtc" value="0" /><input type="hidden" value="<?php echo $ResCtc['Tot_CTC']; ?>" id="ETotCtc" readonly /></td>
    <?php if($ResCtc['Tot_GrossMonth']>15000 && $ResCtc['EmpActPf']=='N'){ ?>
	<td align="right" style="width:100px;font-size:11px;background-color:#D8FB97;"><b><?php echo intval($ResCtc['Tot_CTC']); ?></b>&nbsp;&nbsp;</td>
	<?php } ?>  
</tr>
	
<tr><td align="left" class="All_10">&nbsp;</td>
    <td align="left" style="width:650px;font-size:11px; height:18px;" colspan="3">&nbsp;<b>Additional Benefit</b></td>
</tr>
<script>
function FunMIC(d)
{ 
  if(d==4 || d==6 || d==3){var vale=document.getElementById("MCSSP").value; }else{var vale=document.getElementById("MCS").value;}
  if(document.getElementById("CheckMIC").checked==true)
  {document.getElementById("EmpAddBenifit_MediInsu").value=vale;}
  else{ document.getElementById("EmpAddBenifit_MediInsu").value=0; }
}
</script>		
<tr><td align="left" class="All_10">&nbsp;<input type="checkbox" name="CheckMIC" id="CheckMIC" onClick="FunMIC(<?=$ResCtc['DepartmentId'];?>)" <?php if($ResCtc['EmpAddBenifit_MediInsu_value']>0){echo 'checked';} ?> disabled/></td>
  <td align="left" class="All_300" id="micA">&nbsp;Insurance Policy Premium<?php /*Mediclaim insurance coverage for Employee, Spouse 2 children*/?> :
  <input type="hidden" id="MCS" value="<?php if($CompanyId==1){echo $resDaily['MCS'];}elseif($CompanyId==2){echo $resDaily['MCS'];}else{echo '0';} ?>"/><input type="hidden" id="MCSSP" value="<?php if($CompanyId==1){echo $resDaily['MCSSP'];}elseif($CompanyId==2){echo $resDaily['MCSSP'];}else{echo '0';} ?>"/></td>
  <td align="left" class="All_180" id="micB">&nbsp;Rs. &nbsp;<input name="EmpAddBenifit_MediInsu" id="EmpAddBenifit_MediInsu" value="<?php echo $ResCtc['EmpAddBenifit_MediInsu_value']; ?>" class="All_100" /><input type="hidden" id="EAddBenifit_MI" value="<?php echo $ResCtc['EmpAddBenifit_MediInsu_value']; ?>" readonly/></td></tr>
  
<tr><td align="left" class="All_10">&nbsp;<input type="checkbox" name="CheckCarEnt" id="CheckCarEnt" onClick="FunCarEnt()" disabled/></td>
    <td align="left" class="All_300" id="micA">&nbsp;Car entitlement as per car policy :</td>
    <td align="left" class="All_180" id="micB">&nbsp;Rs. &nbsp;<input name="Car_Entitlement" id="Car_Entitlement" value="<?php echo $ResCtc['Car_Entitlement']; ?>" class="All_100" readonly/></td></tr>
    
    <tr>
    <td align="left" class="All_10">&nbsp;</td>
    <td align="left" colspan="2" class="All_300" id="micA">&nbsp;Remark :&nbsp;&nbsp;&nbsp;&nbsp;
	 <input Name="Rmkk" id="Rmkk" style="width:400px;font-family:Times New Roman;font-size:12px;" value="<?php echo $ResCtc['Remark'];?>" required/>
	</td>
  </tr>

<script type="text/javascript" language="javascript">
function LetterCTC(E,Y,C,G,D)
{window.open("PrintEmpCTC.php?action=Ctc&E="+E+"&Y="+Y+"&C="+C+"&G="+G+"&D="+D,"AppLetter","scrollbars=yes,resizable=no,width=820,menubar=yes,height=750,location=no,directories=no");}

function EditHistory(EI)
{window.open("EmpincHistory.php?EI="+EI,"HForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=920,height=500");}
</script>

<tr><td align="Right" class="fontButton" colspan="6">
     <table border="0" align="right" class="fontButton">
         
      <input type="hidden" name="DateHide" id="DateHide" class="All_80" value="<?php echo date("d-m-Y"); ?>" readonly>
	  <?php $sqlMax = mysql_query("SELECT MAX(SalaryChange_Date) as SalaryChDate FROM hrm_pms_appraisal_history where EmpCode=".$ResEmp['EmpCode']." AND TotalProp_GSPM=".$ResCtc['Tot_GrossMonth']." AND CompanyId=".$CompanyId, $con); $resMax = mysql_fetch_assoc($sqlMax); ?>   
         
         
	  <tr>	
	    <td style="width:260px;font-family:Times New Roman;font-size:15px;color:#FFFFFF;"><b>Date:</b>&nbsp;<input name="DateCTC" id="DateCTC" class="All_80" value="<?php echo date("d-m-Y",strtotime($ResCtc['SalChangeDate'])); //$resMax['SalaryChDate'] ?>" readonly><button id="f_btn1" class="CalenderButton" disabled></button><script type="text/javascript">  var cal = Calendar.setup({ onSelect:  function(cal) { cal.hide()}, showTime: true }); 
  cal.manageFields("f_btn1", "DateCTC", "%d-%m-%Y"); </script></td>

  <td style="width:120px;font-family:Times New Roman;font-size:15px;color:#FFFFFF;">
  <?php if($ResCtc['INCENTIVE']=='Y') { ?> <a href="javascript:EditHistory(<?php echo $EMPID; ?>)"><font color="#FFFFFF"><b>Incentive</b></font></a><?php } ?></td>
	    <td align="center" style="width:80px;color:#FFFFFF;font-weight:bold;font-family:Times New Roman;font-size:15px;">
	    <a href="#" onClick="OpenIncHis(<?php echo $ResEmp['EmpCode'].','.$CompanyId.','.$UserId; ?>)"><font color="#FFFFFF"> History</font></a></td>	 
        <td align="center" style="width:80px;color:#FFFFFF;font-weight:bold;font-family:Times New Roman;font-size:15px;">
	    <a href="#" onClick="LetterCTC(<?php echo $EMPID.','.$YearId.','.$CompanyId.','.$ResCtc['GradeId'].','.$ResCtc['DesigId']; ?>)"><font color="#FFFFFF">Print</font></a></td>	

<?php if($_SESSION['User_Permission']=='Edit'){?>
	    <td align="right" style="width:90px;"><input type="button" name="ChangeCtc" id="ChangeCtc" style="width:90px; display:block;" value="edit" onClick="EditCtc()">
		<input type="submit" name="EditCtcE" id="EditCtcE" style="width:90px;display:none;" value="save" <?php //if(date("Y-m-d")>=date("Y-09-23") AND date("Y-m-d")<=date("Y-10-31")) { echo 'disabled'; } ?>></td>
<?php } ?>
	    <td align="right" style="width:90px;"><input type="button" name="RefreshCtcE" id="RefreshCtcE" style="width:90px;" value="refresh" onClick="javascript:window.location='EmpCtc.php?ID=<?php echo $EMPID; ?>&Event=Edit'"/></td>
	 </tr>
	</table>
  </td></tr>
</table>
</td>
<?php include("EmpImg.php"); ?>
</tr>
</table>
</form>  
</td>
<?php } ?>
<?php //***********************************************************************************?>
</tr>
<?php } ?> 
    </table>
   </td>
  </tr>
  <tr><td valign="top" align="center"><table border="0" style="margin-top:0px;"><tr><td align="center"><img src="images/home1.png"></td></tr></table></td></tr>
<?php //*************END*****END*****END******END******END***************************?>	
  <tr><td valign="top"><?php require_once("../footer.php"); ?></td></tr>
  </table>
 </td>
</tr>
</table>
</body>
</html>



