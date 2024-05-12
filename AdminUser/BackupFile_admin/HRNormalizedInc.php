<?php require_once('../AdminUser/config/config.php'); 

/********************************* $_POST['ProGSPM'] ***********************************/
if(isset($_POST['ProGSPM']) && $_POST['ProGSPM']!="")
{ 
 
$sarr=mysql_query("select Arrear_NOM from hrm_pms_setting where CompanyId=1 AND Process='PMS'",$con);
$rarr=mysql_fetch_assoc($sarr); $Extra3Month=($rarr['Arrear_NOM']*$_POST['IncSalaryPM']); 

$sqlG = mysql_query("select EmpVertical from hrm_employee_general where EmployeeID=".$_POST['EmpId'], $con); 
 $resG=mysql_fetch_assoc($sqlG);
 
$sqlRat=mysql_query("select RatingName from hrm_pms_rating where Rating=".$_POST['Rating'], $con); 
$resRat=mysql_fetch_assoc($sqlRat); 
$sqlUp=mysql_query("update hrm_employee_pms set HR_Remark='".$_POST['Remark']."', HR_PmsStatus=2, HR_SubmitedDate='".date("Y-m-d")."', HR_Submited_UserId=".$_POST['UId'].", HR_Score=".$_POST['Score'].", HR_Rating=".$_POST['Rating'].", HR_RatingName='".$resRat['RatingName']."', HR_DesigId=".$_POST['HRDesigId'].", EmpVertical='".$resG['EmpVertical']."', HR_DesigDate='".date("Y-m-d")."', HR_GradeId=".$_POST['HRGradeId'].", HR_ProIncSalary=".$_POST['ProGSPM'].", HR_Percent_ProIncSalary=".$_POST['Per_ProGSPM'].", HR_ProCorrSalary='".$_POST['ProSC']."', HR_Percent_ProCorrSalary=".$_POST['Per_ProSC'].", HR_IncNetMonthalySalary=".$_POST['IncSalaryPM'].", HR_Percent_IncNetMonthalySalary=".$_POST['Per_TProGSPM'].", HR_Proposed_ActualPercent=".$_POST['ActualPer'].", HR_GrossMonthlySalary=".$_POST['TProGSPM'].", HR_GrossAnnualSalary=".$_POST['TAS'].", Extra3Month=".$Extra3Month.", HR_ProIncCTC=".$_POST['CtcProGSPM'].", HR_Percent_ProIncCTC=".$_POST['CtcPer_ProGSPM'].", HR_ProCorrCTC=".$_POST['CtcProSC'].", HR_Percent_ProCorrCTC=".$_POST['CtcPer_ProSC'].", HR_Proposed_ActualCTC=".$_POST['CtcTProGSPM'].", HR_IncNetCTC=".$_POST['CtcIncSalaryPM'].", HR_Percent_IncNetCTC=".$_POST['CtcPer_TProGSPM'].", HR_CTC=".$_POST['CtcTAS'].", HR_ActualInc_Per='".$_POST['ActualInc']."', HR_ProRataInc_Per='".$_POST['ProRataInc']."', HR_ActualInc_Amt='".$_POST['ActualIncAmt']."', HR_ProRataInc_Amt='".$_POST['ProRataIncAmt']."' where EmpPmsId=".$_POST['PmsId']." AND EmployeeID=".$_POST['EmpId'], $con); //$_POST['Extra3Month']

//Hod_ProIncSalary=".$_POST['ProGSPM'].", Hod_Percent_ProIncSalary=".$_POST['Per_ProGSPM'].", Hod_ProCorrSalary='".$_POST['ProSC']."', Hod_Percent_ProCorrSalary=".$_POST['Per_ProSC'].", Hod_IncNetMonthalySalary=".$_POST['IncSalaryPM'].", Hod_Percent_IncNetMonthalySalary=".$_POST['Per_TProGSPM'].", Hod_Proposed_ActualPercent=".$_POST['ActualPer'].", Hod_GrossMonthlySalary=".$_POST['TProGSPM'].", Hod_GrossAnnualSalary=".$_POST['TAS'].",


//*************************** AUTO MATIC CHANGE GRADE/ DESIG/ DEPARTMENT OPEN//
/*
 $sqlG = mysql_query("select * from hrm_employee_general where EmployeeID=".$_POST['EmpId'], $con); 
 $resG=mysql_fetch_assoc($sqlG);
 $sqlI=mysql_query("Insert into hrm_employee_general_event(GeneralId, EmployeeID, FileNo, DateJoining, DateConfirmationYN, DateConfirmation, DOB, DOB_dm, GradeId, CostCenter, HqId, DepartmentId, DesigId, DesigId2, MobileNo_Vnr, EmailId_Vnr, BankName, AccountNo, BranchName, BranchAdd, BankName2, AccountNo2, BranchName2, BranchAdd2, InsuCardNo, PfAccountNo, EsicAllow, ReportingName, ReportingDesigId, ReportingEmailId, ReportingContactNo, CreatedBy, CreatedDate, YearId)values(".$resG['GeneralId'].", ".$resG['EmployeeID'].", ".$resG['FileNo'].", '".$resG['DateJoining']."', '".$resG['DateConfirmationYN']."', '".$resG['DateConfirmation']."', '".$resG['DOB']."', '".$resG['DOB_dm']."', ".$resG['GradeId'].", '".$resG['CostCenter']."', ".$resG['HqId'].", ".$resG['DepartmentId'].", ".$resG['DesigId'].", ".$resG['DesigId2'].", ".$resG['MobileNo_Vnr'].", '".$resG['EmailId_Vnr']."', '".$resG['BankName']."', ".$resG['AccountNo'].", '".$resG['BranchName']."', '".$resG['BranchAdd']."', '".$resG['BankName2']."', ".$resG['AccountNo2'].", '".$resG['BranchName2']."', '".$resG['BranchAdd2']."', '".$resG['InsuCardNo']."', '".$resG['PfAccountNo']."', '".$resG['EsicAllow']."', '".$resG['ReportingName']."', ".$resG['ReportingDesigId'].", '".$resG['ReportingEmailId']."', ".$resG['ReportingContactNo'].", ".$resG['CreatedBy'].", '".$resG['CreatedDate']."', ".$resG['YearId'].")", $con);
*/ 
 /*
 if($sqlI)
 {  if($_POST['GradeId']>0){ $SqlUpGen1 = mysql_query("UPDATE hrm_employee_general SET GradeId=".$_POST['GradeId'].", CreatedDate='".date("Y-01-01")."', YearId=".$_POST['Y']." WHERE EmployeeID=".$_POST['EmpId'], $con); }
    if($_POST['DesigId']>0){ $SqlUpGen1 = mysql_query("UPDATE hrm_employee_general SET DesigId=".$_POST['DesigId'].", CreatedDate='".date("Y-01-01")."', YearId=".$_POST['Y']." WHERE EmployeeID=".$_POST['EmpId'], $con); }
 }
 */

//*************************** AUTO MATIC CHANGE GRADE/ DESIG/ DEPARTMENT CLOSE//


if($sqlUp){ echo 'Data save successfully.....!';}
}



/************************************************************* $_POST['AppProGSPM'] ***************************************************/
if(isset($_POST['AppProGSPM']) && $_POST['AppProGSPM']!="")
{ //HR_CurrDesigId=".$_POST['CurrDId'].", HR_CurrGradeId=".$_POST['CurrGId'].",

$sarr=mysql_query("select Arrear_NOM from hrm_pms_setting where CompanyId=1 AND Process='PMS'",$con);
$rarr=mysql_fetch_assoc($sarr); $Extra3Month=($rarr['Arrear_NOM']*$_POST['IncSalaryPM']);

$sqlRat=mysql_query("select RatingName from hrm_pms_rating where Rating=".$_POST['Rating'], $con); 
$resRat=mysql_fetch_assoc($sqlRat); 
$sqlUpApp=mysql_query("update hrm_employee_pms set HR_Remark='".$_POST['Remark']."', HR_PmsStatus=2, HR_SubmitedDate='".date("Y-10-01")."', HR_Submited_UserId=".$_POST['UId'].", HR_Score=".$_POST['Score'].", HR_Rating=".$_POST['Rating'].", HR_RatingName='".$resRat['RatingName']."', HR_DesigId=".$_POST['HRDesigId'].", HR_DesigDate='".date("Y-10-01")."', HR_GradeId=".$_POST['HRGradeId'].", HR_ProIncSalary=".$_POST['AppProGSPM'].", HR_Percent_ProIncSalary=".$_POST['Per_ProGSPM'].", HR_ProCorrSalary='".$_POST['ProSC']."', HR_Percent_ProCorrSalary=".$_POST['Per_ProSC'].", HR_IncNetMonthalySalary=".$_POST['IncSalaryPM'].", HR_Percent_IncNetMonthalySalary=".$_POST['Per_TProGSPM'].", HR_Proposed_ActualPercent=".$_POST['ActualPer'].", HR_GrossMonthlySalary=".$_POST['TProGSPM'].", HR_GrossAnnualSalary=".$_POST['TAS'].", Extra3Month=".$Extra3Month.", HR_ProIncCTC=".$_POST['CtcProGSPM'].", HR_Percent_ProIncCTC=".$_POST['CtcPer_ProGSPM'].", HR_ProCorrCTC=".$_POST['CtcProSC'].", HR_Percent_ProCorrCTC=".$_POST['CtcPer_ProSC'].", HR_Proposed_ActualCTC=".$_POST['CtcTProGSPM'].", HR_IncNetCTC=".$_POST['CtcIncSalaryPM'].", HR_Percent_IncNetCTC=".$_POST['CtcPer_TProGSPM'].", HR_CTC=".$_POST['CtcTAS'].", HR_ActualInc_Per='".$_POST['ActualInc']."', HR_ProRataInc_Per='".$_POST['ProRataInc']."', HR_ActualInc_Amt='".$_POST['ActualIncAmt']."', HR_ProRataInc_Amt='".$_POST['ProRataIncAmt']."' where EmpPmsId=".$_POST['PmsId']." AND EmployeeID=".$_POST['EmpId'], $con); 

if($sqlUpApp){echo 'Data Approved successfully.....!';}
}  


/******************************** $_POST['BasicStipend'] ****************************************/
if(isset($_POST['BasicStipend']) && $_POST['BasicStipend']!="")
{  
$sqlChR=mysql_query("select * from hrm_employee_ctc_pms where PmsId=".$_POST['P']." AND EmployeeID=".$_POST['E']." AND Status='A' AND CtcCreatedDate='".date("Y-m-d",strtotime($_POST['CHDate']))."' AND CtcYearId=".$_POST['Y'], $con); $rowChR=mysql_num_rows($sqlChR); 
 
 $sqlUp=mysql_query("update hrm_employee_pms set HR_ProIncSalary=".$_POST['PIS'].", HR_Percent_ProIncSalary=".$_POST['PPIS'].", HR_IncNetMonthalySalary=".$_POST['INMS'].", HR_Percent_IncNetMonthalySalary=".$_POST['PINMS'].", HR_Proposed_ActualPercent=".$_POST['PINMS'].", HR_GrossMonthlySalary=".$_POST['PIS'].", HR_GrossAnnualSalary=".$_POST['GAS'].", HR_ProIncCTC=".$_POST['CtcProGSPM'].", HR_Percent_ProIncCTC=".$_POST['CtcPer_ProGSPM'].", HR_ProCorrCTC=".$_POST['CtcProSC'].", HR_Percent_ProCorrCTC=".$_POST['CtcPer_ProSC'].", HR_Proposed_ActualCTC=".$_POST['CtcTProGSPM'].", HR_IncNetCTC=".$_POST['CtcIncSalaryPM'].", HR_Percent_IncNetCTC=".$_POST['CtcPer_TProGSPM'].", HR_CTC=".$_POST['CtcTAS']." where EmpPmsId=".$_POST['P']." AND EmployeeID=".$_POST['E'], $con);
 
 
  if($rowChR>0)
  { 
    $sqlUp= mysql_query("UPDATE hrm_employee_ctc_pms SET PmsYearId=".$_POST['Y'].", EC=".$_POST['EmpCode'].", CHILD_EDU_ALL_Value='".$_POST['EmpChildEduAllow']."', MED_REM_Value='".$_POST['EmpMediReim']."', LTA_Value='".$_POST['EmpLeaveTraAllow']."', CONV_Value='".$_POST['EmpConAllow']."', TA_Value='".$_POST['TA']."', BAS='Y', BAS_Value=".$_POST['EmpBasic'].", STIPEND='N', STIPEND_Value=0.00, HRA_Value='".$_POST['EmpHRA']."', CAR_ALL_Value='".$_POST['Car_Allow']."', Bonus_Month='".$_POST['EmpBonusM']."', SPECIAL_ALL_Value='".$_POST['EmpSpeAllow']."',  NetMonthSalary_Value='".$_POST['EmpNetMonSalary']."', GrossSalary_PostAnualComponent_Value='".$_POST['GMS_PAC']."', EmpActPf='".$_POST['EmpActPf']."', EmpComActPf='".$_POST['EmpComActPf']."', BONUS_Value=0, GRATUITY_Value='".$_POST['EmpEstiGratuity']."', Tot_GrossMonth='".$_POST['EmpGrossMonSalary']."', Tot_Gross_Annual='".$_POST['EmpAnnGrossSalary']."', PF_Employee_Contri_Value='".$_POST['EmpProviFund']."', PF_Employee_Contri_Annul='".$_POST['EmpEmployerPFContri']."', PF_Employer_Contri_Value='".$_POST['EmpProviFund']."', PF_Employer_Contri_Annul='".$_POST['EmpEmployerPFContri']."', Mediclaim_Policy='".$_POST['EmpMediPoliPremium']."', Tot_CTC='".$_POST['EmpTotalCtc']."', EmpAddBenifit_MediInsu_value='".$_POST['EmpAddBenifit_MediInsu']."', Car_Entitlement='".$_POST['Car_Entitlement']."', ESCI='".$_POST['ESCI']."', NPS_Value='".$_POST['NPS_Value']."', AnnualESCI='".$_POST['AnnualESCI']."', Remark='".$_POST['Rmk']."', CtcCreatedBy=".$_POST['U'].", CtcCreatedDate='".date("Y-m-d",strtotime($_POST['CHDate']))."', CtcYearId=".$_POST['Y'].", SalChangeDate='".date("Y-m-d",strtotime($_POST['CHDate']))."', SystDate='".date("Y-m-d")."' WHERE PmsId=".$_POST['P']." AND EmployeeID=".$_POST['E']." AND Status='A'", $con);  
  
  }
  if($rowChR==0) 
  { 
   //$sqlU= mysql_query("UPDATE hrm_employee_ctc SET Status='D' where EmployeeID=".$_POST['E']." AND Status='A'", $con);
  
   $sqlUp= mysql_query("insert into hrm_employee_ctc_pms(EmployeeID, PmsId, PmsYearId, EC, CHILD_EDU_ALL_Value, MED_REM_Value, LTA_Value, CONV_Value, TA_Value, BAS, BAS_Value, STIPEND, STIPEND_Value, HRA_Value, CAR_ALL_Value, Bonus_Month, SPECIAL_ALL_Value, NetMonthSalary_Value, GrossSalary_PostAnualComponent_Value, EmpActPf, EmpComActPf, BONUS_Value, GRATUITY_Value, Tot_GrossMonth, Tot_Gross_Annual, PF_Employee_Contri_Value, PF_Employee_Contri_Annul, PF_Employer_Contri_Value, PF_Employer_Contri_Annul, Mediclaim_Policy, Tot_CTC, EmpAddBenifit_MediInsu_value, Car_Entitlement, ESCI, NPS_Value, AnnualESCI, Status, Remark, CtcCreatedBy, CtcCreatedDate, CtcYearId, SalChangeDate, SystDate) values(".$_POST['E'].", ".$_POST['P'].", ".$_POST['Y'].", ".$_POST['EmpCode'].", '".$_POST['EmpChildEduAllow']."', '".$_POST['EmpMediReim']."', '".$_POST['EmpLeaveTraAllow']."', '".$_POST['EmpConAllow']."', '".$_POST['TA']."', 'Y', ".$_POST['EmpBasic'].", 'N', 0.00, '".$_POST['EmpHRA']."', '".$_POST['Car_Allow']."', '".$_POST['EmpBonusM']."', '".$_POST['EmpSpeAllow']."',  '".$_POST['EmpNetMonSalary']."', '".$_POST['GMS_PAC']."', '".$_POST['EmpActPf']."', '".$_POST['EmpComActPf']."', 0, '".$_POST['EmpEstiGratuity']."', '".$_POST['EmpGrossMonSalary']."', '".$_POST['EmpAnnGrossSalary']."', '".$_POST['EmpProviFund']."', '".$_POST['EmpEmployerPFContri']."', '".$_POST['EmpProviFund']."', '".$_POST['EmpEmployerPFContri']."', '".$_POST['EmpMediPoliPremium']."', '".$_POST['EmpTotalCtc']."', '".$_POST['EmpAddBenifit_MediInsu']."', '".$_POST['Car_Entitlement']."', '".$_POST['ESCI']."', '".$_POST['NPS_Value']."', '".$_POST['AnnualESCI']."', 'A', '".$_POST['Rmk']."', ".$_POST['U'].", '".date("Y-m-d",strtotime($_POST['CHDate']))."', ".$_POST['Y'].", '".date("Y-m-d",strtotime($_POST['CHDate']))."', '".date("Y-m-d")."')", $con); 
  }

  /*
  if($sqlUp)
  { $sql=mysql_query("select * from hrm_pms_appraisal_history where EmpCode=".$_POST['EmpCode']." AND SalaryChange_Date='".date("Y-m-d",strtotime($_POST['CHDate']))."' AND CompanyId=".$_POST['C'], $con); $row=mysql_num_rows($sql); 
  if($row==0) { $sqlIns=mysql_query("insert into hrm_pms_appraisal_history(EmpPmsId, EmpCode, EmpName, Current_Grade, Proposed_Grade, Department, Current_Designation, Proposed_Designation, SalaryChange_Date, Salary_Basic, Salary_HRA, Salary_CA, Car_Allowance, Salary_SA, Previous_GrossSalaryPM, Current_GrossSalaryPM, Proposed_GrossSalaryPM, BonusAnnual_September, Prop_PeInc_GSPM, PropSalary_Correction, TotalProp_GSPM, TotalProp_PerInc_GSPM, ProIncCTC, Percent_ProIncCTC, ProCorrCTC, Percent_ProCorrCTC, Proposed_ActualCTC, IncNetCTC, Percent_IncNetCTC, Score, Rating, CompanyId, YearId, SystemDate) values(".$_POST['P'].", ".$_POST['EmpCode'].", '".$_POST['Ename']."', '".$_POST['CGrade']."', '".$_POST['GradeName']."', '".$_POST['DepartmentName']."', '".$_POST['CDesig']."', '".$_POST['DesigName']."', '".date("Y-m-d",strtotime($_POST['CHDate']))."', ".$_POST['EmpBasic'].", ".$_POST['EmpHRA'].", ".$_POST['EmpConAllow'].", '".$_POST['Car_Allow']."', ".$_POST['EmpSpeAllow'].", ".$_POST['GS'].", ".$_POST['GS'].", ".$_POST['PIS'].", ".$_POST['EmpBonusExg'].", ".$_POST['PPIS'].", ".$_POST['PCS'].", ".$_POST['EmpGrossMonSalary'].", ".$_POST['PINMS'].", ".$_POST['CtcProGSPM'].", ".$_POST['CtcPer_ProGSPM'].", ".$_POST['CtcProSC'].", ".$_POST['CtcPer_ProSC'].", ".$_POST['CtcTProGSPM'].", ".$_POST['CtcIncSalaryPM'].", ".$_POST['CtcPer_TProGSPM'].", ".$_POST['Score'].", ".$_POST['Rating'].", ".$_POST['C'].", ".$_POST['Y'].", '".date("Y-m-d")."')", $con);}
  else { 
  $sqlIns=mysql_query("update hrm_pms_appraisal_history set EmpPmsId=".$_POST['P'].", EmpCode=".$_POST['EmpCode'].", EmpName='".$_POST['Ename']."', Current_Grade='".$_POST['CGrade']."', Proposed_Grade='".$_POST['GradeName']."', Department='".$_POST['DepartmentName']."', Current_Designation='".$_POST['CDesig']."', Proposed_Designation='".$_POST['DesigName']."', SalaryChange_Date='".date("Y-m-d",strtotime($_POST['CHDate']))."', Salary_Basic=".$_POST['EmpBasic'].", Salary_HRA=".$_POST['EmpHRA'].", Salary_CA=".$_POST['EmpConAllow'].", Car_Allowance='".$_POST['Car_Allow']."', Salary_SA=".$_POST['EmpSpeAllow'].", Previous_GrossSalaryPM=".$_POST['GS'].", Current_GrossSalaryPM=".$_POST['GS'].", Proposed_GrossSalaryPM=".$_POST['PIS'].", BonusAnnual_September=".$_POST['EmpBonusExg'].", Prop_PeInc_GSPM=".$_POST['PPIS'].", PropSalary_Correction=".$_POST['PCS'].", TotalProp_GSPM=".$_POST['EmpGrossMonSalary'].", TotalProp_PerInc_GSPM=".$_POST['PINMS'].", ProIncCTC=".$_POST['CtcProGSPM'].", Percent_ProIncCTC=".$_POST['CtcPer_ProGSPM'].", ProCorrCTC=".$_POST['CtcProSC'].", Percent_ProCorrCTC=".$_POST['CtcPer_ProSC'].", Proposed_ActualCTC=".$_POST['CtcTProGSPM'].", IncNetCTC=".$_POST['CtcIncSalaryPM'].", Percent_IncNetCTC=".$_POST['CtcPer_TProGSPM'].", Score=".$_POST['Score'].", Rating=".$_POST['Rating'].", CompanyId=".$_POST['C'].", SystemDate='".date("Y-m-d")."' where EmpCode=".$_POST['EmpCode']." AND SalaryChange_Date='".date("Y-m-d",strtotime($_POST['CHDate']))."' AND CompanyId=".$_POST['C'], $con); }
  }
  */

  if($sqlUp){echo 'Employee CTC Updated Successfully...';}
}









if(isset($_POST['LodgingCatA']) && $_POST['LodgingCatA']!="")
{ 
 $sqlCode=mysql_query("select EmpCode from hrm_employee where EmployeeID=".$_POST['E'], $con); 
 $resCode=mysql_fetch_assoc($sqlCode);
 //if($_POST['ModeTraOutSide_HQ']=='N'){$TraMode=''; $TraClass='';} else {$TraMode=$_POST['TraMode']; $TraClass=$_POST['TraClass'];}
 $TraMode=$_POST['TraMode']; $TraClass=$_POST['TraClass'];
 if($_POST['DateOfEPolicy']==''){ $DateOfEPolicy=date("Y-m-d"); }else{ $DateOfEPolicy=$_POST['DateOfEPolicy']; }
 $sqlElig = mysql_query("select * from hrm_employee_eligibility_pms where PmsId=".$_POST['P']." AND EmployeeID=".$_POST['E']." AND EligCreatedDate='".date("Y-m-d",strtotime($_POST['CHDate']))."' AND Status='A'", $con); $rowElig=mysql_num_rows($sqlElig);
 if($rowElig>0)
 { $SqlInsElig = mysql_query("UPDATE hrm_employee_eligibility_pms SET PmsYearId=".$_POST['Y'].", EC=".$resCode['EmpCode'].", Lodging_CategoryA='".$_POST['LodgingCatA']."', Lodging_CategoryB='".$_POST['LodgingCatB']."', Lodging_CategoryC='".$_POST['LodgingCatC']."', DA_Outside_Hq='".$_POST['DaOutSide_HQRs']."', DA_Inside_Hq='".$_POST['DaInSide_HQRs']."', Travel_TwoWeeKM='".$_POST['TwoWheelerKM']."', Travel_FourWeeKM='".$_POST['FourWheelerKM']."', Travel_TwoWeeLimitPerMonth='".$_POST['TwoWRestrict']."', Travel_TwoWeeLimitPerDay='".$_POST['TwoWRestrict_PD']."', Travel_FourWeeLimitPerMonth='".$_POST['FourWRestrict']."', TwoWeeOutSide_Restric='".$_POST['TwoWRestrict_OutSite']."', FourWeeOutSide_Restric='".$_POST['FourWRestrict_OutSite']."', Mode_Travel_Outside_Hq='".$TraMode."', TravelClass_Outside_Hq='".$TraClass."', Mobile_Exp_Rem='".$_POST['MoExpeReim']."', Mobile_Exp_Rem_Rs='".$_POST['MobileExpRs']."', Prd='".$_POST['Prd']."',  Mobile_Company_Hand='".$_POST['MoComHandSet']."', Mobile_Hand_Elig='".$_POST['MoHandSet']."', GPSSet='".$_POST['GPSSet']."', Mobile_Hand_Elig_Rs='".$_POST['MobileHandRs']."', Misc_Expenses='".$_POST['MiscExp']."', Health_Insurance='".$_POST['HealthInsu']."', HelthCheck='".$_POST['HelthChekUp']."', FourWElig='".$_POST['Car2Policy']."', CostOfVehicle='".$_POST['VehicleCost']."', WithDriver='".$_POST['With2Driver']."', AdvanceCom='".$_POST['Advance2Com']."', DateOfEntryPolicy='".date("Y-m-d",strtotime($DateOfEPolicy))."', EligCreatedBy=".$_POST['U'].", EligCreatedDate='".date("Y-m-d",strtotime($_POST['CHDate']))."', EligYearId=".$_POST['Y'].", LessKm='".$_POST['LessKm']."', Plan='".$_POST['Plan']."', Remark='".$_POST['Rmk']."', VehiclePolicy='".$_POST['VehiclePolicy']."', SysDate='".date("Y-m-d")."'  WHERE PmsId=".$_POST['P']." AND EmployeeId=".$_POST['E']." AND EligCreatedDate='".date("Y-m-d",strtotime($_POST['CHDate']))."' AND Status='A'", $con);
 }
 if($rowElig==0)
 { 
   //$sqlU= mysql_query("UPDATE hrm_employee_eligibility_pms SET Status='D' where EmployeeID=".$_POST['E']." AND Status='A'", $con);
   $SqlInsElig = mysql_query("insert into hrm_employee_eligibility_pms(EmployeeId, PmsId, PmsYearId, EC, Lodging_CategoryA, Lodging_CategoryB, Lodging_CategoryC, DA_Outside_Hq, DA_Inside_Hq, Travel_TwoWeeKM, Travel_FourWeeKM, Travel_TwoWeeLimitPerMonth, Travel_TwoWeeLimitPerDay, Travel_FourWeeLimitPerMonth, TwoWeeOutSide_Restric, FourWeeOutSide_Restric, Mode_Travel_Outside_Hq, TravelClass_Outside_Hq, Mobile_Exp_Rem, Mobile_Exp_Rem_Rs, Prd, Mobile_Company_Hand, Mobile_Hand_Elig, GPSSet, Mobile_Hand_Elig_Rs, Misc_Expenses, Health_Insurance, HelthCheck, FourWElig, CostOfVehicle, WithDriver, AdvanceCom, DateOfEntryPolicy, LessKm, Plan, Remark, VehiclePolicy, Status, EligCreatedBy, EligCreatedDate, SysDate, EligYearId) values(".$_POST['E'].", ".$_POST['P'].", ".$_POST['Y'].", ".$resCode['EmpCode'].", '".$_POST['LodgingCatA']."', '".$_POST['LodgingCatB']."', '".$_POST['LodgingCatC']."', '".$_POST['DaOutSide_HQRs']."', '".$_POST['DaInSide_HQRs']."', '".$_POST['TwoWheelerKM']."', '".$_POST['FourWheelerKM']."', '".$_POST['TwoWRestrict']."', '".$_POST['TwoWRestrict_PD']."', '".$_POST['FourWRestrict']."', '".$_POST['TwoWRestrict_OutSite']."', '".$_POST['FourWRestrict_OutSite']."', '".$TraMode."', '".$TraClass."', '".$_POST['MoExpeReim']."', '".$_POST['MobileExpRs']."', '".$_POST['Prd']."', '".$_POST['MoComHandSet']."', '".$_POST['MoHandSet']."', '".$_POST['GPSSet']."', '".$_POST['MobileHandRs']."', '".$_POST['MiscExp']."', '".$_POST['HealthInsu']."', '".$_POST['HelthChekUp']."', '".$_POST['Car2Policy']."', '".$_POST['VehicleCost']."', '".$_POST['With2Driver']."', '".$_POST['Advance2Com']."', '".date("Y-m-d",strtotime($DateOfEPolicy))."', '".$_POST['LessKm']."', '".$_POST['Plan']."', '".$_POST['Rmk']."', '".$_POST['VehiclePolicy']."', 'A', ".$_POST['U'].", '".date("Y-m-d",strtotime($_POST['CHDate']))."', '".date("Y-m-d")."', ".$_POST['Y'].")", $con);
 }
  if($SqlInsElig) {echo "Employee Eligibility updated Successfully....."; }
} 









if(isset($_POST['LodginggCCatA22']) && $_POST['LodginggCCatA22']!="")
{ 
 $sqlCode=mysql_query("select EmpCode from hrm_employee where EmployeeID=".$_POST['E'], $con); 
 $resCode=mysql_fetch_assoc($sqlCode);
 //if($_POST['ModeTraOutSide_HQ']=='N'){$TraMode=''; $TraClass='';} else {$TraMode=$_POST['TraMode']; $TraClass=$_POST['TraClass'];}
 $TraMode=$_POST['TraMode']; $TraClass=$_POST['TraClass'];
 $sqlElig = mysql_query("select * from hrm_employee_eligibility where EmployeeID=".$_POST['E']." AND EligCreatedDate='".date("Y-m-d",strtotime($_POST['CHDate']))."' AND Status='A'", $con); $rowElig=mysql_num_rows($sqlElig);
 if($rowElig>0)
 { 
     
     $SqlInsElig = mysql_query("UPDATE hrm_employee_eligibility SET EC=".$resCode['EmpCode'].", Lodging_CategoryA='".$_POST['LodginggCCatA22']."', Lodging_CategoryB='".$_POST['LodgingCatB']."', Lodging_CategoryC='".$_POST['LodgingCatC']."', DA_Outside_Hq='".$_POST['DaOutSide_HQRs']."', DA_Inside_Hq='".$_POST['DaInSide_HQRs']."', Travel_TwoWeeKM='".$_POST['TwoWheelerKM']."', Travel_FourWeeKM='".$_POST['FourWheelerKM']."', Travel_TwoWeeLimitPerMonth='".$_POST['TwoWRestrict']."', Travel_TwoWeeLimitPerDay='".$_POST['TwoWRestrict_PD']."', Travel_FourWeeLimitPerMonth='".$_POST['FourWRestrict']."', TwoWeeOutSide_Restric='".$_POST['TwoWRestrict_OutSite']."', FourWeeOutSide_Restric='".$_POST['FourWRestrict_OutSite']."', Mode_Travel_Outside_Hq='".$TraMode."', TravelClass_Outside_Hq='".$TraClass."', Mobile_Exp_Rem='".$_POST['MoExpeReim']."', Mobile_Exp_Rem_Rs='".$_POST['MobileExpRs']."', Prd='".$_POST['Prd']."',  Mobile_Company_Hand='".$_POST['MoComHandSet']."', Mobile_Hand_Elig='".$_POST['MoHandSet']."', GPSSet='".$_POST['GPSSet']."', Mobile_Hand_Elig_Rs='".$_POST['MobileHandRs']."', Misc_Expenses='".$_POST['MiscExp']."', Health_Insurance='".$_POST['HealthInsu']."', HelthCheck='".$_POST['HelthChekUp']."', FourWElig='".$_POST['Car2Policy']."', CostOfVehicle='".$_POST['VehicleCost']."', WithDriver='".$_POST['With2Driver']."', AdvanceCom='".$_POST['Advance2Com']."', DateOfEntryPolicy='".date("Y-m-d",strtotime($_POST['DateOfEPolicy']))."', EligCreatedBy=".$_POST['U'].", EligCreatedDate='".date("Y-m-d",strtotime($_POST['CHDate']))."', EligYearId=".$_POST['Y'].", LessKm='".$_POST['LessKm']."', Plan='".$_POST['Plan']."', SysDate='".date("Y-m-d")."', Remark='".$_POST['Rmk']."', VehiclePolicy='".$_POST['VehiclePolicy']."'  WHERE EmployeeId=".$_POST['E']." AND EligCreatedDate='".date("Y-m-d",strtotime($_POST['CHDate']))."' AND Status='A'", $con);
 }
 if($rowElig==0)
 { $sqlU= mysql_query("UPDATE hrm_employee_eligibility SET Status='D' where EmployeeID=".$_POST['E']." AND Status='A'", $con);
   $SqlInsElig = mysql_query("insert into hrm_employee_eligibility(EmployeeId, EC, Lodging_CategoryA, Lodging_CategoryB, Lodging_CategoryC, DA_Outside_Hq, DA_Inside_Hq, Travel_TwoWeeKM, Travel_FourWeeKM, Travel_TwoWeeLimitPerMonth, Travel_TwoWeeLimitPerDay, Travel_FourWeeLimitPerMonth, TwoWeeOutSide_Restric, FourWeeOutSide_Restric, Mode_Travel_Outside_Hq, TravelClass_Outside_Hq, Mobile_Exp_Rem, Mobile_Exp_Rem_Rs, Prd, Mobile_Company_Hand, Mobile_Hand_Elig, GPSSet, Mobile_Hand_Elig_Rs, Misc_Expenses, Health_Insurance, HelthCheck, FourWElig, CostOfVehicle, WithDriver, AdvanceCom, DateOfEntryPolicy, LessKm, Plan, Status, EligCreatedBy, EligCreatedDate, EligYearId, SysDate, Remark, VehiclePolicy) values(".$_POST['E'].", ".$resCode['EmpCode'].", '".$_POST['LodginggCCatA22']."', '".$_POST['LodgingCatB']."', '".$_POST['LodgingCatC']."', '".$_POST['DaOutSide_HQRs']."', '".$_POST['DaInSide_HQRs']."', '".$_POST['TwoWheelerKM']."', '".$_POST['FourWheelerKM']."', '".$_POST['TwoWRestrict']."', '".$_POST['TwoWRestrict_PD']."', '".$_POST['FourWRestrict']."', '".$_POST['TwoWRestrict_OutSite']."', '".$_POST['FourWRestrict_OutSite']."', '".$TraMode."', '".$TraClass."', '".$_POST['MoExpeReim']."', '".$_POST['MobileExpRs']."', '".$_POST['Prd']."', '".$_POST['MoComHandSet']."', '".$_POST['MoHandSet']."', '".$_POST['GPSSet']."', '".$_POST['MobileHandRs']."', '".$_POST['MiscExp']."', '".$_POST['HealthInsu']."', '".$_POST['HelthChekUp']."', '".$_POST['Car2Policy']."', '".$_POST['VehicleCost']."', '".$_POST['With2Driver']."', '".$_POST['Advance2Com']."', '".date("Y-m-d",strtotime($_POST['DateOfEPolicy']))."', '".$_POST['LessKm']."', '".$_POST['Plan']."', 'A', ".$_POST['U'].", '".date("Y-m-d",strtotime($_POST['CHDate']))."', ".$_POST['Y'].", '".date("Y-m-d")."', '".$_POST['Rmk']."', '".$_POST['VehiclePolicy']."')", $con);
 }
  if($SqlInsElig) { echo "Eligibility updated Successfully....."; }
} 


?>

