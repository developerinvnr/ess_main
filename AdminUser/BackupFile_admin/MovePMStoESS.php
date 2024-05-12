<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}

/*********************************** CTC *********************************/
/*********************************** CTC *********************************/
if($_REQUEST['action']=='PRSCTCMove' AND $_REQUEST['value']=='true')
{
 $sqlSY=mysql_query("select * from hrm_pms_setting where CompanyId=".$CompanyId." AND Process='PMS'",$con);  
 $resSY=mysql_fetch_array($sqlSY);
 $sql=mysql_query("select * from hrm_employee_ctc_pms p inner join hrm_employee e on p.EmployeeID=e.EmployeeID where p.PmsYearId=".$resSY['CurrY']." AND CtcCreatedDate='".$resSY['EffectedDate2']."' AND p.Status='A' AND e.CompanyId=".$CompanyId, $con);
 while($res=mysql_fetch_assoc($sql))
 { 
  if($res['EmployeeID']>0)
  {
   $rowChR='';
   
   $sqlChR=mysql_query("select * from hrm_employee_ctc where EmployeeID=".$res['EmployeeID']." AND Status='A' AND CtcCreatedDate='".date("Y-m-d",strtotime($res['CtcCreatedDate']))."' AND CtcYearId=".$resSY['CurrY'], $con); 
   $rowChR=mysql_num_rows($sqlChR);
   if($rowChR==0)
   {
    $sqlU= mysql_query("UPDATE hrm_employee_ctc SET Status='D' where EmployeeID=".$res['EmployeeID']." AND Status='A'",$con);
	if($sqlU)
	{
	 $sqlUp= mysql_query("insert into hrm_employee_ctc(EmployeeID, EC, CHILD_EDU_ALL_Value, MED_REM_Value, LTA_Value, CONV_Value, TA_Value, BAS, BAS_Value, STIPEND, STIPEND_Value, HRA_Value, CAR_ALL_Value, Bonus_Month, SPECIAL_ALL_Value, NetMonthSalary_Value, GrossSalary_PostAnualComponent_Value, EmpActPf, EmpComActPf, BONUS_Value, GRATUITY_Value, Tot_GrossMonth, Tot_Gross_Annual, PF_Employee_Contri_Value, PF_Employee_Contri_Annul, PF_Employer_Contri_Value, PF_Employer_Contri_Annul, Mediclaim_Policy, Tot_CTC, EmpAddBenifit_MediInsu_value, Car_Entitlement, ESCI, NPS_Value, AnnualESCI, Status, Remark, CtcCreatedBy, CtcCreatedDate, CtcYearId, SalChangeDate, SystDate) values(".$res['EmployeeID'].", ".$res['EC'].", '".$res['CHILD_EDU_ALL_Value']."', '".$res['MED_REM_Value']."', '".$res['LTA_Value']."', '".$res['CONV_Value']."', '".$res['TA_Value']."', '".$res['BAS']."', '".$res['BAS_Value']."', '".$res['STIPEND']."', '".$res['STIPEND_Value']."', '".$res['HRA_Value']."', '".$res['CAR_ALL_Value']."', '".$res['Bonus_Month']."', '".$res['SPECIAL_ALL_Value']."', '".$res['NetMonthSalary_Value']."', '".$res['GrossSalary_PostAnualComponent_Value']."', '".$res['EmpActPf']."', '".$res['EmpComActPf']."', '".$res['BONUS_Value']."', '".$res['GRATUITY_Value']."', '".$res['Tot_GrossMonth']."', '".$res['Tot_Gross_Annual']."', '".$res['PF_Employee_Contri_Value']."', '".$res['PF_Employee_Contri_Annul']."', '".$res['PF_Employer_Contri_Value']."', '".$res['PF_Employer_Contri_Annul']."', '".$res['Mediclaim_Policy']."', '".$res['Tot_CTC']."', '".$res['EmpAddBenifit_MediInsu_value']."', '".$res['Car_Entitlement']."', '".$res['ESCI']."', '".$res['NPS_Value']."', '".$res['AnnualESCI']."', '".$res['Status']."', '".$res['Remark']."', '".$res['CtcCreatedBy']."', '".$res['CtcCreatedDate']."', '".$res['CtcYearId']."', '".$res['SalChangeDate']."', '".$res['SystDate']."')", $con); 
    }
   }
   elseif($rowChR>0)
   {
    $sqlUp= mysql_query("update hrm_employee_ctc set CHILD_EDU_ALL_Value='".$res['CHILD_EDU_ALL_Value']."', MED_REM_Value='".$res['MED_REM_Value']."', LTA_Value='".$res['LTA_Value']."', CONV_Value='".$res['CONV_Value']."', TA_Value='".$res['TA_Value']."', BAS='".$res['BAS']."', BAS_Value='".$res['BAS_Value']."', STIPEND='".$res['STIPEND']."', STIPEND_Value='".$res['STIPEND_Value']."', HRA_Value='".$res['HRA_Value']."', CAR_ALL_Value='".$res['CAR_ALL_Value']."', Bonus_Month='".$res['Bonus_Month']."', SPECIAL_ALL_Value='".$res['SPECIAL_ALL_Value']."', NetMonthSalary_Value='".$res['NetMonthSalary_Value']."', GrossSalary_PostAnualComponent_Value='".$res['GrossSalary_PostAnualComponent_Value']."', EmpActPf='".$res['EmpActPf']."', EmpComActPf='".$res['EmpComActPf']."', BONUS_Value='".$res['BONUS_Value']."', GRATUITY_Value='".$res['GRATUITY_Value']."', Tot_GrossMonth='".$res['Tot_GrossMonth']."', Tot_Gross_Annual='".$res['Tot_Gross_Annual']."', PF_Employee_Contri_Value='".$res['PF_Employee_Contri_Value']."', PF_Employee_Contri_Annul='".$res['PF_Employee_Contri_Annul']."', PF_Employer_Contri_Value='".$res['PF_Employer_Contri_Value']."', PF_Employer_Contri_Annul='".$res['PF_Employer_Contri_Annul']."', Mediclaim_Policy='".$res['Mediclaim_Policy']."', Tot_CTC='".$res['Tot_CTC']."', EmpAddBenifit_MediInsu_value='".$res['EmpAddBenifit_MediInsu_value']."', Car_Entitlement='".$res['Car_Entitlement']."', ESCI='".$res['ESCI']."', NPS_Value='".$res['NPS_Value']."', AnnualESCI='".$res['AnnualESCI']."', Status='".$res['Status']."', Remark='".$res['Remark']."', CtcCreatedBy='".$res['CtcCreatedBy']."', SalChangeDate='".$res['SalChangeDate']."', SystDate='".$res['SystDate']."' where EmployeeID=".$res['EmployeeID']." AND EC=".$res['EC']." AND Status='A' AND CtcCreatedDate='".date("Y-m-d",strtotime($res['CtcCreatedDate']))."' AND CtcYearId=".$resSY['CurrY']."",$con); 
   }
   
   /********************** Update history ************************/
   /********************** Update history ************************/
   if($sqlUp)
   { 
    $sEn=mysql_query("select Fname,Sname,Lname from hrm_employee where EmployeeID=".$res['EmployeeID'],$con);
	$rEn=mysql_fetch_assoc($sEn); $Ename=$rEn['Fname'].' '.$rEn['Sname'].' '.$rEn['Lname'];
	
	$GradeOld=''; $GradeNew=''; $DeptName=''; $DesigOld=''; $DesigNew=''; 
	$sPms=mysql_query("select AssessmentYear, EmpCurrGrossPM, HR_CurrGradeId, HR_CurrDesigId, HR_Curr_DepartmentId, HR_GradeId, HR_DesigId, HR_DepartmentId, HR_ProIncSalary, HR_Percent_ProIncSalary, HR_ProCorrSalary, HR_Percent_ProCorrSalary, HR_IncNetMonthalySalary, HR_Percent_IncNetMonthalySalary, HR_ProIncCTC, HR_Percent_ProIncCTC, HR_ProCorrCTC, HR_Percent_ProCorrCTC, HR_Proposed_ActualCTC, HR_IncNetCTC, HR_Percent_IncNetCTC, HR_Score, HR_Rating from hrm_employee_pms where EmpPmsId=".$res['PmsId'],$con);
	$rPms=mysql_fetch_assoc($sPms);
	
	if($rPms['HR_CurrGradeId']>0){ $Og=mysql_query("select GradeValue from hrm_grade where GradeId=".$rPms['HR_CurrGradeId'],$con); $rOg=mysql_fetch_assoc($Og); $G1=$rOg['GradeValue']; }else{ $G1=''; }
	if($rPms['HR_GradeId']>0){ $Ng=mysql_query("select GradeValue from hrm_grade where GradeId=".$rPms['HR_GradeId'],$con); $rNg=mysql_fetch_assoc($Ng); $G2=$rNg['GradeValue']; }else{ $G2=''; }
	if($rPms['HR_CurrDesigId']>0){ $Ode=mysql_query("select DesigName from hrm_designation where DesigId=".$rPms['HR_CurrDesigId'],$con); $rOde=mysql_fetch_assoc($Ode); $De1=$rOde['DesigName']; }else{ $De1=''; }
	if($rPms['HR_DesigId']>0){ $Nde=mysql_query("select DesigName from hrm_designation where DesigId=".$rPms['HR_DesigId'],$con); $rNde=mysql_fetch_assoc($Nde); $De2=$rNde['DesigName']; }else{ $De2=''; }
	if($rPms['HR_Curr_DepartmentId']>0){ $Od=mysql_query("select DepartmentName from hrm_department where DepartmentId=".$rPms['HR_Curr_DepartmentId'],$con); $rOd=mysql_fetch_assoc($Od); $D1=$rOd['DepartmentName']; }else{ $D1=''; }
	if($rPms['HR_DepartmentId']>0){ $Nd=mysql_query("select DepartmentName from hrm_department where DepartmentId=".$rPms['HR_DepartmentId'],$con); $rNd=mysql_fetch_assoc($Nd); $D2=$rNd['DepartmentName']; }else{ $D2=''; }
	
	if($G2==''){ $GradeNew=$G1; }else{ $GradeNew=$G2; } $GradeOld=$G1; 
	if($De2==''){ $DesigNew=$De1; }else{ $DesigNew=$De2; } $DesigOld=$De1;
	if($D2==''){ $DeptName=$D1; }else{ $DeptName=$D2; }
	
	
    $sqlw=mysql_query("select * from hrm_pms_appraisal_history where EmpCode=".$res['EC']." AND SalaryChange_Date='".date("Y-m-d",strtotime($res['CtcCreatedDate']))."' AND CompanyId=".$CompanyId, $con); 
	$roww=mysql_num_rows($sqlw); 
    if($roww==0)
	{ 
	 $sqlIns=mysql_query("insert into hrm_pms_appraisal_history(EmpPmsId, EmpCode, EmpName, Current_Grade, Proposed_Grade, Department, Current_Designation, Proposed_Designation, SalaryChange_Date, Salary_Basic, Salary_HRA, Salary_CA, Car_Allowance, Salary_SA, Previous_GrossSalaryPM, Current_GrossSalaryPM, Proposed_GrossSalaryPM, BonusAnnual_September, Prop_PeInc_GSPM, PropSalary_Correction, TotalProp_GSPM, TotalProp_PerInc_GSPM, ProIncCTC, Percent_ProIncCTC, ProCorrCTC, Percent_ProCorrCTC, Proposed_ActualCTC, IncNetCTC, Percent_IncNetCTC, Score, Rating, CompanyId, YearId, SystemDate) values(".$res['PmsId'].", ".$res['EC'].", '".$Ename."', '".$GradeOld."', '".$GradeNew."', '".$DeptName."', '".$DesigOld."', '".$DesigNew."', '".date("Y-m-d",strtotime($res['CtcCreatedDate']))."', ".$res['BAS_Value'].", ".$res['HRA_Value'].", ".$res['CONV_Value'].", '".$res['CAR_ALL_Value']."', ".$res['SPECIAL_ALL_Value'].", ".$rPms['EmpCurrGrossPM'].", ".$rPms['EmpCurrGrossPM'].", ".$rPms['HR_ProIncSalary'].", 0, ".$rPms['HR_Percent_ProIncSalary'].", ".$rPms['HR_ProCorrSalary'].", ".$rPms['HR_IncNetMonthalySalary'].", ".$rPms['HR_Percent_IncNetMonthalySalary'].", ".$rPms['HR_ProIncCTC'].", ".$rPms['HR_Percent_ProIncCTC'].", ".$rPms['HR_ProCorrCTC'].", ".$rPms['HR_Percent_ProCorrCTC'].", ".$rPms['HR_Proposed_ActualCTC'].", ".$rPms['HR_IncNetCTC'].", ".$rPms['HR_Percent_IncNetCTC'].", ".$rPms['HR_Score'].", ".$rPms['HR_Rating'].", ".$CompanyId.", ".$rPms['AssessmentYear'].", '".date("Y-m-d")."')", $con);
	 }
     else  
	 { 
      $sqlIns=mysql_query("update hrm_pms_appraisal_history set EmpPmsId=".$res['PmsId'].", EmpName='".$Ename."', Current_Grade='".$GradeOld."', Proposed_Grade='".$GradeNew."', Department='".$DeptName."', Current_Designation='".$DesigOld."', Proposed_Designation='".$DesigNew."', Salary_Basic=".$res['BAS_Value'].", Salary_HRA=".$res['HRA_Value'].", Salary_CA=".$res['CONV_Value'].", Car_Allowance='".$res['CAR_ALL_Value']."', Salary_SA=".$res['SPECIAL_ALL_Value'].", Previous_GrossSalaryPM=".$rPms['EmpCurrGrossPM'].", Current_GrossSalaryPM=".$rPms['EmpCurrGrossPM'].", Proposed_GrossSalaryPM=".$rPms['HR_ProIncSalary'].", BonusAnnual_September=0, Prop_PeInc_GSPM=".$rPms['HR_Percent_ProIncSalary'].", PropSalary_Correction=".$rPms['HR_ProCorrSalary'].", TotalProp_GSPM=".$rPms['HR_IncNetMonthalySalary'].", TotalProp_PerInc_GSPM=".$rPms['HR_Percent_IncNetMonthalySalary'].", ProIncCTC=".$rPms['HR_ProIncCTC'].", Percent_ProIncCTC=".$rPms['HR_Percent_ProIncCTC'].", ProCorrCTC=".$rPms['HR_ProCorrCTC'].", Percent_ProCorrCTC=".$rPms['HR_Percent_ProCorrCTC'].", Proposed_ActualCTC=".$rPms['HR_Proposed_ActualCTC'].", IncNetCTC=".$rPms['HR_IncNetCTC'].", Percent_IncNetCTC=".$rPms['HR_Percent_IncNetCTC'].", Score=".$rPms['HR_Score'].", Rating=".$rPms['HR_Rating'].", CompanyId=".$CompanyId.", SystemDate='".date("Y-m-d")."' where EmpCode=".$res['EC']." AND SalaryChange_Date='".date("Y-m-d",strtotime($res['CtcCreatedDate']))."' AND CompanyId=".$CompanyId, $con); 
	 }
  }
   
   /********************** Update history ************************/
   /********************** Update history ************************/
  
  } //if($res['EmployeeID']>0)
  
  if($sqlUp)
  { 
   echo "<script>alert('Process Done Successfully');document.getElementById('loaderDiv').style.display='none';></script>"; 
  }
   
 } //while   
 
 
          
}

/*********************************** Eligibility *********************************/
/*********************************** Eligibility *********************************/
if($_REQUEST['action']=='PRSEligMove' AND $_REQUEST['value']=='true2')
{
 $sqlSY=mysql_query("select * from hrm_pms_setting where CompanyId=".$CompanyId." AND Process='PMS'",$con);  
 $resSY=mysql_fetch_array($sqlSY);
 $sql=mysql_query("select * from hrm_employee_eligibility_pms p inner join hrm_employee e on p.EmployeeID=e.EmployeeID where p.PmsYearId=".$resSY['CurrY']." AND EligCreatedDate='".$resSY['EffectedDate2']."' AND p.Status='A' AND e.CompanyId=".$CompanyId, $con);
 while($res=mysql_fetch_assoc($sql))
 { 
  if($res['EmployeeID']>0)
  {
   $rowChR='';
   $sqlChR=mysql_query("select * from hrm_employee_eligibility where EmployeeID=".$res['EmployeeID']." AND Status='A' AND EligCreatedDate='".date("Y-m-d",strtotime($res['EligCreatedDate']))."' AND EligYearId=".$resSY['CurrY'], $con); 
   $rowChR=mysql_num_rows($sqlChR);
   if($rowChR==0)
   {
    $sqlU= mysql_query("UPDATE hrm_employee_eligibility SET Status='D' where EmployeeID=".$res['EmployeeID']." AND Status='A'",$con);
	if($sqlU)
	{
	 $sqlUp= mysql_query("insert into hrm_employee_eligibility(EmployeeID, EC, Lodging_CategoryA, Lodging_CategoryB, Lodging_CategoryC, DA_Outside_Hq, DA_Inside_Hq, Travel_TwoWeeKM, Travel_FourWeeKM, Travel_TwoWeeLimitPerMonth, Travel_TwoWeeLimitPerDay, Travel_FourWeeLimitPerMonth, TwoWeeOutSide_Restric, FourWeeOutSide_Restric, Mode_Travel_Outside_Hq, TravelClass_Outside_Hq, Mobile_Exp_Rem, Mobile_Exp_Rem_Rs, Prd, Mobile_Company_Hand, Mobile_Hand_Elig, GPSSet, Mobile_Hand_Elig_Rs, Misc_Expenses, Health_Insurance, HelthCheck, FourWElig, CostOfVehicle, WithDriver, AdvanceCom, DateOfEntryPolicy, LessKm, Plan, Remark, VehiclePolicy, Status, EligCreatedBy, EligCreatedDate, SysDate, EligYearId) values(".$res['EmployeeID'].", ".$res['EC'].", '".$res['Lodging_CategoryA']."', '".$res['Lodging_CategoryB']."', '".$res['Lodging_CategoryC']."', '".$res['DA_Outside_Hq']."', '".$res['DA_Inside_Hq']."', '".$res['Travel_TwoWeeKM']."', '".$res['Travel_FourWeeKM']."', '".$res['Travel_TwoWeeLimitPerMonth']."', '".$res['Travel_TwoWeeLimitPerDay']."', '".$res['Travel_FourWeeLimitPerMonth']."', '".$res['TwoWeeOutSide_Restric']."', '".$res['FourWeeOutSide_Restric']."', '".$res['Mode_Travel_Outside_Hq']."', '".$res['TravelClass_Outside_Hq']."', '".$res['Mobile_Exp_Rem']."', '".$res['Mobile_Exp_Rem_Rs']."', '".$res['Prd']."', '".$res['Mobile_Company_Hand']."', '".$res['Mobile_Hand_Elig']."', '".$res['GPSSet']."', '".$res['Mobile_Hand_Elig_Rs']."', '".$res['Misc_Expenses']."', '".$res['Health_Insurance']."', '".$res['HelthCheck']."', '".$res['FourWElig']."', '".$res['CostOfVehicle']."', '".$res['WithDriver']."', '".$res['AdvanceCom']."', '".$res['DateOfEntryPolicy']."', '".$res['LessKm']."', '".$res['Plan']."', '".$res['Remark']."', '".$res['VehiclePolicy']."', '".$res['Status']."', '".$res['EligCreatedBy']."', '".$res['EligCreatedDate']."', '".$res['SysDate']."', '".$res['EligYearId']."')", $con); 
    }
   }
   elseif($rowChR>0)
   {
    $sqlUp= mysql_query("UPDATE hrm_employee_eligibility SET Lodging_CategoryA='".$res['Lodging_CategoryA']."', Lodging_CategoryB='".$res['Lodging_CategoryB']."', Lodging_CategoryC='".$res['Lodging_CategoryC']."', DA_Outside_Hq='".$res['DA_Outside_Hq']."', DA_Inside_Hq='".$res['DA_Inside_Hq']."', Travel_TwoWeeKM='".$res['Travel_TwoWeeKM']."', Travel_FourWeeKM='".$res['Travel_FourWeeKM']."', Travel_TwoWeeLimitPerMonth='".$res['Travel_TwoWeeLimitPerMonth']."', Travel_TwoWeeLimitPerDay='".$res['Travel_TwoWeeLimitPerDay']."', Travel_FourWeeLimitPerMonth='".$res['Travel_FourWeeLimitPerMonth']."', TwoWeeOutSide_Restric='".$res['TwoWeeOutSide_Restric']."', FourWeeOutSide_Restric='".$res['FourWeeOutSide_Restric']."', Mode_Travel_Outside_Hq='".$res['Mode_Travel_Outside_Hq']."', TravelClass_Outside_Hq='".$res['TravelClass_Outside_Hq']."', Mobile_Exp_Rem='".$res['Mobile_Exp_Rem']."', Mobile_Exp_Rem_Rs='".$res['Mobile_Exp_Rem_Rs']."', Prd='".$res['Prd']."',  Mobile_Company_Hand='".$res['Mobile_Company_Hand']."', Mobile_Hand_Elig='".$res['Mobile_Hand_Elig']."', GPSSet='".$res['GPSSet']."', Mobile_Hand_Elig_Rs='".$res['Mobile_Hand_Elig_Rs']."', Misc_Expenses='".$res['Misc_Expenses']."', Health_Insurance='".$res['Health_Insurance']."', HelthCheck='".$res['HelthCheck']."', FourWElig='".$res['FourWElig']."', CostOfVehicle='".$res['CostOfVehicle']."', WithDriver='".$res['WithDriver']."', AdvanceCom='".$res['AdvanceCom']."', DateOfEntryPolicy='".date("Y-m-d",strtotime($res['DateOfEntryPolicy']))."', EligCreatedBy=".$res['EligCreatedBy'].", LessKm='".$res['LessKm']."', Plan='".$res['Plan']."', Remark='".$res['Remark']."', VehiclePolicy='".$res['VehiclePolicy']."', SysDate='".$res['SysDate']."' where EmployeeID=".$res['EmployeeID']." AND EC=".$res['EC']." AND Status='A' AND EligCreatedDate='".date("Y-m-d",strtotime($res['EligCreatedDate']))."' AND EligYearId=".$resSY['CurrY']."",$con); 
   }
   
  } //if($res['EmployeeID']>0)
   
 }  
 
 if($sqlUp)
 { 
  echo "<script>alert('Process Done Successfully');document.getElementById('loaderDiv').style.display='none';></script>"; 
 } 
           
}



/*********************************** Dept-Desig-Grade *********************************/
/*********************************** Dept-Desig-Grade *********************************/
if($_REQUEST['action']=='PRSDeptDesigGradeMove' AND $_REQUEST['value']=='true3')
{
 $sqlSY=mysql_query("select * from hrm_pms_setting where CompanyId=".$CompanyId." AND Process='PMS'",$con);  
 $resSY=mysql_fetch_array($sqlSY);
 $sql=mysql_query("select EmployeeID, HR_CurrGradeId, HR_CurrDesigId, HR_Curr_DepartmentId, HR_GradeId, HR_DesigId, HR_DepartmentId from hrm_employee_pms where AssessmentYear=".$resSY['CurrY']." AND Emp_PmsStatus=2 AND (HR_CurrGradeId!=HR_GradeId OR HR_CurrDesigId!=HR_DesigId)",$con);
 while($res=mysql_fetch_assoc($sql))
 { 
  if($res['EmployeeID']>0)
  { 
   $sqlG = mysql_query("select * from hrm_employee_general where EmployeeID=".$res['EmployeeID'],$con); 
   $resG = mysql_fetch_assoc($sqlG);
   $sqlI = mysql_query("Insert into hrm_employee_general_event(GeneralId, EmployeeID, FileNo, DateJoining, DateConfirmationYN, DateConfirmation, DOB, DOB_dm, GradeId, CostCenter, HqId, DepartmentId, DesigId, DesigId2, MobileNo_Vnr, EmailId_Vnr, BankName, AccountNo, BranchName, BranchAdd, BankName2, AccountNo2, BranchName2, BranchAdd2, InsuCardNo, PfAccountNo, EsicAllow, ReportingName, ReportingDesigId, ReportingEmailId, ReportingContactNo, CreatedBy, CreatedDate, YearId)values(".$resG['GeneralId'].", ".$resG['EmployeeID'].", ".$resG['FileNo'].", '".$resG['DateJoining']."', '".$resG['DateConfirmationYN']."', '".$resG['DateConfirmation']."', '".$resG['DOB']."', '".$resG['DOB_dm']."', ".$resG['GradeId'].", '".$resG['CostCenter']."', ".$resG['HqId'].", ".$resG['DepartmentId'].", ".$resG['DesigId'].", ".$resG['DesigId2'].", ".$resG['MobileNo_Vnr'].", '".$resG['EmailId_Vnr']."', '".$resG['BankName']."', ".$resG['AccountNo'].", '".$resG['BranchName']."', '".$resG['BranchAdd']."', '".$resG['BankName2']."', ".$resG['AccountNo2'].", '".$resG['BranchName2']."', '".$resG['BranchAdd2']."', '".$resG['InsuCardNo']."', '".$resG['PfAccountNo']."', '".$resG['EsicAllow']."', '".$resG['ReportingName']."', ".$resG['ReportingDesigId'].", '".$resG['ReportingEmailId']."', ".$resG['ReportingContactNo'].", ".$resG['CreatedBy'].", '".$resG['CreatedDate']."', ".$resG['YearId'].")", $con);
   
   if($sqlI)
   {  
    if($res['HR_GradeId']>0 && $res['HR_CurrGradeId']!=$res['HR_GradeId']){ $SqlUpGen1 = mysql_query("UPDATE hrm_employee_general SET GradeId=".$res['HR_GradeId'].", CreatedDate='".$resSY['EffectedDate2']."', YearId=".$resSY['CurrY']." WHERE EmployeeID=".$res['EmployeeID'], $con); }
    if($res['HR_DesigId']>0 && $res['HR_CurrDesigId']!=$res['HR_DesigId']){ $SqlUpGen1 = mysql_query("UPDATE hrm_employee_general SET DesigId=".$res['HR_DesigId'].", CreatedDate='".$resSY['EffectedDate2']."', YearId=".$resSY['CurrY']." WHERE EmployeeID=".$res['EmployeeID'], $con); }
   }
   
  } //if($res['EmployeeID']>0) 
   
 } 
   
 if($SqlUpGen1)
 { 
  echo "<script>alert('Process Done Successfully');document.getElementById('loaderDiv').style.display='none';></script>"; 
 }   
        
}



/*********************************** Letter View *********************************/
/*********************************** Letter View *********************************/


?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>

<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style>
.th{ font-family:Times New Roman;font-size:12px;height:25px;text-align:center;color:#FFFFFF;font-weight:bold;background-color:#7a6189; }
.tdl{ font-family:Times New Roman;font-size:12px;text-align:left; }
.tdc{ font-family:Times New Roman;font-size:12px;text-align:center; }
.tdinput{ font-family:Times New Roman;font-size:14px;text-align:center;width:100%;border:hidden;background-color:#DDFB9F; }
.tdinputl{ font-family:Times New Roman;font-size:14px;text-align:left;width:100%;border:hidden;background-color:#DDFB9F; }
.tdsel{ font-family:Times New Roman;font-size:14px;text-align:left;}
.inner_table{height:500px;overflow-y:auto;width:auto;}
.font{font:Georgia;color:#FFFFFF;font-size:12px;text-align:center;background-color:#7a6189;height:22px;} 
.font1 { font:Georgia; color:#000; font-size:12px;height:22px;} 
.font2 { font-size:11px;width:260px;height:18px;} .font4 {color:#1FAD34;font-family:Times New Roman;font-size:15px;}
.span {display:none; font-family:Courier New; font-size:14px; }.span1 {display:block; font-family:Courier New; font-size:14px; }
.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;}
.SaveButton {background-image:url(images/save.gif); width:20px; height:20px; background-repeat:no-repeat; background-color:#FFFFFF; border-color:#FFFFFF; border-bottom:inherit;}
.TextInput { font-family:"Times New Roman", Times, serif; font-size:11px; width:100px; height:18px;}
.CalenderButton{background-image:url(images/CalenderBtn.jpeg);width:16px;height:16px;background-color:#E0DBE3;border-color:#FFFFFF;}
</style>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>

<Script type="text/javascript">
function ProcessCTCMove()
{ 

  agree=confirm("Are you sure, you want to process CTC Move?");
  if(agree)
  {
   var agree2=confirm("Are you sure?");
   if(agree2)
   {
    var agree3=confirm("Are you sure?");
    if(agree3)
    { 
	 document.getElementById('loaderDiv').style.display='block';
     window.location="MovePMStoESS.php?ee=1&aa=1&rr=1&hh=1&form=v%v&action=PRSCTCMove&value=true";   
    }
   }
  }
  else{ return false; }
  
}


function ProcessEligMove()
{ 

  agree=confirm("Are you sure, you want to process eligibility Move?");
  if(agree)
  {
   var agree2=confirm("Are you sure?");
   if(agree2)
   {
    var agree3=confirm("Are you sure?");
    if(agree3)
    { 
	 document.getElementById('loaderDiv').style.display='block';
     window.location="MovePMStoESS.php?ee=1&aa=1&rr=1&hh=1&form=v%v&action=PRSEligMove&value=true2";   
    }
   }
  }
  else{ return false; }
  
}


function ProcessDeptDesigGradeMove()
{ 
  
  agree=confirm("Are you sure, you want to process DeptDesigGrade Move?");
  if(agree)
  {
   var agree2=confirm("Are you sure?");
   if(agree2)
   {
    var agree3=confirm("Are you sure?");
    if(agree3)
    { 
	 document.getElementById('loaderDiv').style.display='block';
     window.location="MovePMStoESS.php?ee=1&aa=1&rr=1&hh=1&form=v%v&action=PRSDeptDesigGradeMove&value=true3";   
    }
   }
  }
  else{ return false; }
  
}

function NCheckk(n)
{
 if(document.getElementById("checkk"+n).checked==true)
 {
  document.getElementById("CED"+n+"-Process").disabled=false;
 }
 else
 {
  document.getElementById("CED"+n+"-Process").disabled=true;
 }
}

function ECheckk(v)
{
 if(document.getElementById("Echeckk"+v).checked==true)
 {
  document.getElementById("ViewLeteer_"+v).disabled=false;
 }
 else
 {
  document.getElementById("ViewLeteer_"+v).disabled=true;
 }
}

function FunPerm(v,p,c)
{
 //agree=confirm("Are you sure?");
 //if(agree)
 //{
  document.getElementById('loaderDiv').style.display='block'; 
  var url = 'MovePMStoESSAct.php'; var pars = 'Actt=PermissionLet&v='+v+'&p='+p+'&c='+c;
  var myAjax = new Ajax.Request( url, { method: 'post', parameters: pars, onComplete: show_rst });
 //}
}
function show_rst(originalRequest)
{ 
 document.getElementById('AjaxSpan').innerHTML = originalRequest.responseText;
 var RsttId=document.getElementById('RsttId').value;
 if(RsttId==1){alert("Success!");}else{alert("Error!");}
 document.getElementById('loaderDiv').style.display='none';
} 


function FunChk(a,n,e)
{
 //agree=confirm("Are you sure?");
 //if(agree)
 //{
  if(document.getElementById('Chk'+a+''+n).checked==true){var v=1;}else{var v=0;}
  document.getElementById('loaderDiv').style.display='block';
  var url = 'MovePMStoESSAct.php'; var pars = 'Act=AllPMSLet&a='+a+'&n='+n+'&e='+e+'&v='+v;
  var myAjax = new Ajax.Request( url, { method: 'post', parameters: pars, onComplete: show2_rst });
 //}
 //else
 //{ return false; }
}
function show2_rst(originalRequest)
{ 
 document.getElementById('AjaxSpan').innerHTML = originalRequest.responseText;
 var RstId=document.getElementById('RstId').value;
 var a=document.getElementById('aId').value;
 var n=document.getElementById('nId').value;
 var e=document.getElementById('eId').value;
 var v=document.getElementById('vId').value;
 
 if(RstId==1)
 { 
  if(v==1){ document.getElementById("TDChk"+a+""+n).style.background='#008000'; }
  else if(v==0){ document.getElementById("TDChk"+a+""+n).style.background='#FFFFFF'; } 
 }
 else{ alert("Error!"); }
 document.getElementById('loaderDiv').style.display='none';
 
} 




</SCRIPT> 

</head>
<body class="body">
<div id="loaderDiv" style="background-color: rgba(0,0,0,0.8);width: 100%;height: 100%;position: fixed;top:0px;left: 0px;font-size: 12px; display:none;">	
	<center>
	<span style="color:white;top: 50%;left:38%;position: absolute;">Please Wait, working on Progress...<img src="images/loader.gif"></span>
	</center>
</div>
<span id="AjaxSpan"></span>

<table class="table">
<tr>
 <td>
  <table class="menutable"><tr><td><?php if($_SESSION['login'] = true){ require_once("AMenu.php"); } ?></td></tr></table>
 </td>
</tr>
<tr>
 <td valign="top" width="100%">
  <table width="100%" style="margin-top:0px;" border="0">
    <tr><td valign="top"><?php if($_SESSION['login'] = true){ require_once("AWelcome.php"); } ?></td></tr>
	<tr>
	  <td valign="top" align="center"  width="100%" id="MainWindow">
<?php //**************************************************************************************************/?>
<?php //***************************START*****START*****START******START******START********************/?>
<?php //***********************************************************************************************/?>
<?php if($_SESSION['UserType']=='S' AND $_SESSION['login'] = true AND ($UserId==4 OR $UserId==9 OR $UserId==10 OR $UserId==14)){ ?>	
<table border="0" style="margin-top:0px;width:100%;height:300px;">
 <tr>
  <td align="left" height="20" valign="top" colspan="3" width="100%"><br />
   <table border="0" width="100%">
    <tr>
	  <td class="heading" style="width:350px;">Move to CTC/ELIG/History & Other</td>
	  <td class="font4" style="left">&nbsp;&nbsp;&nbsp;<b style="font-size:16px;"><i><?php echo $msg; ?></i></b></td>
	</tr>
   </table>
  </td>
 </tr>
    
   <tr>
<?php //*********************************************** Open / Hide *************************** ?> 
<td align="left" id="type" valign="top" style="display:block;width:100%;">             
 <table border="0" style="width:100%;">
   <tr>
<?php //*********************************************** Open Menu PMS ***************************?> 
<td align="left" id="type" valign="top" style="display:block;width:100%;">             
 <table border="0" style="width:100%;">

  <tr>
   <td align="left" style="width:100%;">
	<table border="1" style="width:75%;" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
	  <tr>
	   <td class="th" style="width:15%;">CTC Move</td>
	   <td class="th" style="width:15%;">Eligibility Move</td>
	   <td class="th" style="width:15%;">Dept-Desig-Grade Move</td>
	   <td class="th" style="width:15%;">Comparison <br>CTC</td>
	   <td class="th" style="width:15%;">Comparison <br>Eligibility</td>
	   <td class="th" style="width:15%;">Comparison <br>Dept-Desig-Grade Move</td>
	  </tr>
	  <tr>
	   <td class="tdc"><input type="checkbox" id="checkk1" onClick="NCheckk(1)" />
	   <input type="button" id="CED1-Process" onClick="ProcessCTCMove()" value="Process" style="width:80px;" disabled/></td>
	   
	   <td class="tdc"><input type="checkbox" id="checkk2" onClick="NCheckk(2)" />
	   <input type="button" id="CED2-Process" onClick="ProcessEligMove()" value="Process" style="width:80px;" disabled/></td>
	  
	   <td class="tdc"><input type="checkbox" id="checkk3" onClick="NCheckk(3)" />
	   <input type="button" id="CED3-Process" onClick="ProcessDeptDesigGradeMove()" value="Process" style="width:80px;" disabled/></td>
	   
	   <?php $sqlSY=mysql_query("select * from hrm_pms_setting where CompanyId=".$CompanyId." AND Process='PMS'",$con);  
 $resSY=mysql_fetch_array($sqlSY); ?>	   
	   
	   <td class="th" style="width:15%;"><span style="color:#FFFFC6;cursor:pointer;" onClick="FunExportV(1,<?=$CompanyId.','.$resSY['CurrY']?>,'<?=$resSY['EffectedDate2']?>')"><u>Export</u></span></td>
	   <td class="th" style="width:15%;"><span style="color:#FFFFC6;cursor:pointer;" onClick="FunExportV(2,<?=$CompanyId.','.$resSY['CurrY']?>,'<?=$resSY['EffectedDate2']?>')"><u>Export</u></span></td>
	   <td class="th" style="width:15%;"><span style="color:#FFFFC6;cursor:pointer;" onClick="FunExportV(3,<?=$CompanyId.','.$resSY['CurrY']?>,'<?=$resSY['EffectedDate2']?>')"><u>Export</u></span></td>
	   
	  </tr>
	  
<script type="text/javascript">
function FunExportV(v,ci,yi,dt)
{    
  window.open("MovePmstoESSExp.php?action=ComparisonExport&v="+v+"&ci="+ci+"&yi="+yi+"&dt="+dt,"Comparison Form","menubar=yes,scrollbars=yes,resizable=no,directories=no,width=20,height=20");}
</script>	  
	  
	 </table>
   </td>
  </tr>
  <tr><td>&nbsp;</td></tr>
  
  <tr>
  <td align="left" height="20" valign="top" colspan="3" width="100%">
   <table border="0" width="100%">
    <tr>
	  <td class="heading" style="width:350px;">Config: View PMS Letter</td>
	</tr>
	<?php $sqlSY=mysql_query("select * from hrm_pms_setting where CompanyId=".$CompanyId." AND Process='PMS'",$con);  
          $resSY=mysql_fetch_array($sqlSY); ?>
	<tr>
	 <td style="width:400px;">
	  <table style="width:450px;" border="1" cellspacing="0">
	   <tr>
	    <td colspan="5" class="th">Allow to PMS Letter Permission</td>
	   </tr>
	   <tr>
	    <td class="th">Emp</td>
		<td class="th">App</td>
		<td class="th">Rev</td>
		<td class="th">Hod</td>
		<td class="th">Mgm<sup>t</sup></td>
	   </tr>
	   <tr style="background-color:#FFFFFF;">
	    <td class="tdc" style="background-color:<?php if($resSY['ViewLeteer_emp']=='Y'){echo '#008000';}?>;"><input type="checkbox" id="Echeckkemp" onClick="ECheckk('emp')" />
		
		&nbsp;<select name="ViewLeteer_emp" id="ViewLeteer_emp" class="tdc" onChange="FunPerm(this.value,'emp',<?=$CompanyId?>)" disabled><option value="<?php echo $resSY['ViewLeteer_emp']; ?>" selected><?php echo $resSY['ViewLeteer_emp']; ?></option><option value="<?php if($resSY['ViewLeteer_emp']=='Y') echo 'N'; else echo 'Y'; ?>"><?php if($resSY['ViewLeteer_emp']=='Y')echo 'N'; else echo 'Y'; ?></option></select></td>
		
		<td class="tdc" style="background-color:<?php if($resSY['ViewLeteer_app']=='Y'){echo '#008000';}?>;"><input type="checkbox" id="Echeckkapp" onClick="ECheckk('app')" />
		
		&nbsp;<select name="ViewLeteer_app" id="ViewLeteer_app" class="tdc" onChange="FunPerm(this.value,'app',<?=$CompanyId?>)" disabled><option value="<?php echo $resSY['ViewLeteer_app']; ?>" selected><?php echo $resSY['ViewLeteer_app']; ?></option><option value="<?php if($resSY['ViewLeteer_app']=='Y') echo 'N'; else echo 'Y'; ?>"><?php if($resSY['ViewLeteer_app']=='Y')echo 'N'; else echo 'Y'; ?></option></select></td>
		
		<td class="tdc" style="background-color:<?php if($resSY['ViewLeteer_rev']=='Y'){echo '#008000';}?>;"><input type="checkbox" id="Echeckkrev" onClick="ECheckk('rev')" />
		
		&nbsp;<select name="ViewLeteer_rev" id="ViewLeteer_rev" class="tdc" onChange="FunPerm(this.value,'rev',<?=$CompanyId?>)" disabled><option value="<?php echo $resSY['ViewLeteer_rev']; ?>" selected><?php echo $resSY['ViewLeteer_rev']; ?></option><option value="<?php if($resSY['ViewLeteer_rev']=='Y') echo 'N'; else echo 'Y'; ?>"><?php if($resSY['ViewLeteer_rev']=='Y')echo 'N'; else echo 'Y'; ?></option></select></td>
		
		<td class="tdc" style="background-color:<?php if($resSY['ViewLeteer_rev2']=='Y'){echo '#008000';}?>;"><input type="checkbox" id="Echeckkrev2" onClick="ECheckk('rev2')" />
		
		&nbsp;<select name="ViewLeteer_rev2" id="ViewLeteer_rev2" class="tdc" onChange="FunPerm(this.value,'rev2',<?=$CompanyId?>)" disabled><option value="<?php echo $resSY['ViewLeteer_rev2']; ?>"><?php echo $resSY['ViewLeteer_rev2']; ?></option><option value="<?php if($resSY['ViewLeteer_rev2']=='Y') echo 'N'; else echo 'Y'; ?>"><?php if($resSY['ViewLeteer_rev2']=='Y')echo 'N'; else echo 'Y'; ?></option></select></td>
		
		<td class="tdc" style="background-color:<?php if($resSY['ViewLeteer_hod']=='Y'){echo '#008000';}?>;"><input type="checkbox" id="Echeckkhod" onClick="ECheckk('hod')" />
		
		&nbsp;<select name="ViewLeteer_hod" id="ViewLeteer_hod" class="tdc" onChange="FunPerm(this.value,'hod',<?=$CompanyId?>)" disabled><option value="<?php echo $resSY['ViewLeteer_hod']; ?>" selected><?php echo $resSY['ViewLeteer_hod']; ?></option><option value="<?php if($resSY['ViewLeteer_hod']=='Y') echo 'N'; else echo 'Y'; ?>"><?php if($resSY['ViewLeteer_hod']=='Y')echo 'N'; else echo 'Y'; ?></option></select></td>
	   </tr>
	  </table>
	 </td>
	</tr>
   </table>
  </td>
 </tr>
  
  <tr>
   <td align="left" style="width:100%;">
	<table border="0" style="width:100%;" cellpadding="0" cellspacing="0">
	  <tr>
	   <td style="width:35%;vertical-align:top;text-align:center;">
	    <!--<div style="max-height:500px; overflow:scroll;">-->
	    <table border="1" style="width:100%;" cellspacing="0">
		 <tr><td class="th" colspan="4">Appraiser</td></tr>
		 <tr>
	      <td class="th" style="width:10%;">Sn</td>
	      <td class="th" style="width:60%;">Name/Code</td>
		  <td class="th" style="width:20%;">Department</td>
	      <td class="th" style="width:10%;">Allow</td>
		 </tr> 
		 <?php $sqlA=mysql_query("select e.EmpCode, e.Fname, e.Sname, e.Lname, d.DepartmentCode, Appraiser_EmployeeID from hrm_employee_pms p inner join hrm_employee e on p.Appraiser_EmployeeID=e.EmployeeID inner join hrm_employee_general g on p.Appraiser_EmployeeID=g.EmployeeID inner join hrm_department d on g.DepartmentId=d.DepartmentId where AssessmentYear=".$resSY['CurrY']." and e.CompanyId=".$CompanyId." group by Appraiser_EmployeeID order by g.DepartmentId, e.EmpCode",$con); $n1=1; while($resA=mysql_fetch_assoc($sqlA)){ 
		 $schk=mysql_query("select * from hrm_pms_allow_letter where EmployeeID=".$resA['Appraiser_EmployeeID'],$con);
		 $rowchk=mysql_num_rows($schk); 
		 
		 $Rapp=0;
		 
		 if($rowchk>0){ $reschk=mysql_fetch_assoc($schk); $Rapp=$reschk['APP']; }
		 ?>
		 <tr style="background-color:#FFFFFF;">
	      <td class="tdc"><?=$n1?></td>
	      <td class="tdl">&nbsp;<?=$resA['Fname'].' '.$resA['Sname'].' '.$resA['Lname'].' ('.$resA['EmpCode'].')'?></td>
		  <td class="tdc"><?=strtoupper($resA['DepartmentCode'])?></td>
	      <td class="tdc" id="TDChkA<?=$n1?>" style="background-color:<?php if($Rapp==1){echo '#008000';}?>;">
		   <input type="checkbox" id="ChkA<?=$n1?>" onClick="FunChk('A',<?=$n1.','.$resA['Appraiser_EmployeeID']?>)" <?php if($Rapp==1){echo 'checked';}?> />
		  </td>
		 </tr>
		 <?php $n1++; } ?>
		</table>
		<!--</div>-->
	   </td>
	   <td style="width:35%;vertical-align:top;text-align:center;">
	    <!--<div style="max-height:500px; overflow:scroll;">-->
	    <table border="1" style="width:100%;" cellspacing="0">
		 <tr><td class="th" colspan="4">Reviewer</td></tr>
		 <tr>
	      <td class="th" style="width:10%;">Sn</td>
	      <td class="th" style="width:60%;">Name/Code</td>
		  <td class="th" style="width:20%;">Department</td>
	      <td class="th" style="width:10%;">Allow</td>
		 </tr> 
		 <?php $sqlR=mysql_query("select e.EmpCode, e.Fname, e.Sname, e.Lname, d.DepartmentCode, Reviewer_EmployeeID from hrm_employee_pms p inner join hrm_employee e on p.Reviewer_EmployeeID=e.EmployeeID inner join hrm_employee_general g on p.Reviewer_EmployeeID=g.EmployeeID inner join hrm_department d on g.DepartmentId=d.DepartmentId where AssessmentYear=".$resSY['CurrY']." and e.CompanyId=".$CompanyId." group by Reviewer_EmployeeID order by g.DepartmentId, e.EmpCode",$con); $n2=1; while($resR=mysql_fetch_assoc($sqlR)){ 
		 $schk=mysql_query("select * from hrm_pms_allow_letter where EmployeeID=".$resR['Reviewer_EmployeeID'],$con); $RRev=0;
		 $rowchk=mysql_num_rows($schk); if($rowchk>0){ $reschk=mysql_fetch_assoc($schk); $RRev=$reschk['REV']; }
		 ?>
		 <tr style="background-color:#FFFFFF;">
	      <td class="tdc"><?=$n2?></td>
	      <td class="tdl">&nbsp;<?=$resR['Fname'].' '.$resR['Sname'].' '.$resR['Lname'].' ('.$resR['EmpCode'].')'?></td>
		  <td class="tdc"><?=strtoupper($resR['DepartmentCode'])?></td>
	      <td class="tdc" id="TDChkR<?=$n2?>" style="background-color:<?php if($RRev==1){echo '#008000';}?>;">
		   <input type="checkbox" id="ChkR<?=$n2?>" onClick="FunChk('R',<?=$n2.','.$resR['Reviewer_EmployeeID']?>)" <?php if($RRev==1){echo 'checked';}?> />
		  </td>
		 </tr>
		 <?php $n2++; } ?>
		</table>
		<!--</div>-->
	   </td>
	   <td style="width:20%;vertical-align:top;text-align:center;">
	    <!--<div style="max-height:500px; overflow:scroll;">-->
	    <table border="1" style="width:100%;" cellspacing="0">
		 <tr><td class="th" colspan="4">HOD</td></tr>
		 <tr>
	      <td class="th" style="width:10%;">Sn</td>
	      <td class="th" style="width:80%;">Name/Code</td>
	      <td class="th" style="width:10%;">Allow</td>
		 </tr> 
		 <?php $sqlH=mysql_query("select e.EmpCode, e.Fname, e.Sname, e.Lname, Rev2_EmployeeID from hrm_employee_pms p inner join hrm_employee e on p.Rev2_EmployeeID=e.EmployeeID where AssessmentYear=".$resSY['CurrY']." and e.CompanyId=".$CompanyId." group by Rev2_EmployeeID order by e.EmpCode",$con); $n3=1; while($resH=mysql_fetch_assoc($sqlH)){ 
		 $schk=mysql_query("select * from hrm_pms_allow_letter where EmployeeID=".$resH['Rev2_EmployeeID'],$con); $RHod=0;
		 $rowchk=mysql_num_rows($schk); if($rowchk>0){ $reschk=mysql_fetch_assoc($schk); $RHod=$reschk['HOD']; }
		 ?>
		 <tr style="background-color:#FFFFFF;">
	      <td class="tdc"><?=$n3?></td>
	      <td class="tdl">&nbsp;<?=$resH['Fname'].' '.$resH['Sname'].' '.$resH['Lname'].' ('.$resH['EmpCode'].')'?></td>
	      <td class="tdc" id="TDChkH<?=$n3?>" style="background-color:<?php if($RHod==1){echo '#008000';}?>;">
		   <input type="checkbox" id="ChkH<?=$n3?>" onClick="FunChk('H',<?=$n3.','.$resH['Rev2_EmployeeID']?>)" <?php if($RHod==1){echo 'checked';}?> />
		  </td>
		 </tr>
		 <?php $n3++; } ?>
		</table>
		<!--</div>-->
	   </td>
	  </tr>
	  
	</table>
   </td>
  </tr>	  
	
  </table>    
</td>
<?php //********************** Close Menu PMS *********************?>    
 </tr>
</table>
<?php } ?>
<?php //******************************************************************/ ?>
<?php //***********************END*****END*****END******END******END****************************************/?>
<?php //*****************************************************************************************/ ?>
	  </td>
	</tr>
	<!--<tr>
	  <td valign="top" align="center">
	    <table border="0" style="margin-top:0px;">
				<tr>
	              <td align="center"><img src="images/home1.png"></td>
				</tr>
	    </table>
	  </td>
	</tr>
	<tr>
	  <td valign="top">
	    <?php //require_once("../footer.php"); ?>
	  </td>
	</tr>-->
  </table>
 </td>
</tr>
</table>
</body>
</html>



