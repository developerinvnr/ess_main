<?php require_once('config/config.php');
date_default_timezone_set('Asia/Calcutta');

if($_REQUEST['action']=='ComparisonExport')
{


if($_REQUEST['v']==1) //CTC
{

 $xls_filename = 'Comparison_ctc.xls';
 header("Content-Type: application/xls");
 header("Content-Disposition: attachment; filename=$xls_filename");
 header("Pragma: no-cache"); header("Expires: 0"); $sep = "\t"; 
 echo "Sn\tEC\tBasic_pms\tBasic_ctc\tHRA_pms\tHRA_ctc\tBonus_pms\tBonus_ctc\tSpecial_pms\tSpecial_ctc\tGross_pms\tGross_ctc\tGrossPAC_pms\tGrossPAC_ctc\tPF_pms\tPF_ctc\tESIC_pms\tESIC_ctc\tNPS_pms\tNPS_ctc\tNet_pms\tNet_ctc\tCEA_pms\tCEA_ctc\tLTA_pms\tLTA_ctc\tGross_Annual_pms\tGross_Annual_ctc\tGRATUITY_pms\tGRATUITY_ctc\tPF_Employer_pms\tPF_Employer_ctc\tMediclaim_pms\tMediclaim_ctc\tAnnualESCI_pms\tAnnualESCI_ctc\tCTC_pms\tCTC_ctc\tStatus_pms\tStatus_ctc\tCrBy_pms\tCrBy_ctc\tCrDate_pms\tCrDate_ctc\tYearId_pms\tYearId_ctc\tSalChangeDate_pms\tSalChangeDate_ctc";
 print("\n");
 
 $sql=mysql_query("select p.*,EmpCode from hrm_employee_ctc_pms p inner join hrm_employee e on p.EmployeeID=e.EmployeeID where p.PmsYearId=".$_REQUEST['yi']." AND CtcCreatedDate='".$_REQUEST['dt']."' AND p.Status='A' AND e.CompanyId=".$_REQUEST['ci'], $con);
 $no=1;
 while($res=mysql_fetch_array($sql))
 {
  
  $sql2=mysql_query("select * from hrm_employee_ctc where CtcCreatedDate='".$_REQUEST['dt']."' AND EmployeeID=".$res['EmployeeID'], $con); $res2=mysql_fetch_array($sql2);
 
  $schema_insert = "";
  $schema_insert .= $no.$sep;
  $schema_insert .= $res['EmpCode'].$sep;
  $schema_insert .= $res['BAS_Value'].$sep;
  $schema_insert .= $res2['BAS_Value'].$sep;
  $schema_insert .= $res['HRA_Value'].$sep;
  $schema_insert .= $res2['HRA_Value'].$sep;
  $schema_insert .= $res['Bonus_Month'].$sep;
  $schema_insert .= $res2['Bonus_Month'].$sep;
  $schema_insert .= $res['SPECIAL_ALL_Value'].$sep;
  $schema_insert .= $res2['SPECIAL_ALL_Value'].$sep;
  $schema_insert .= $res['Tot_GrossMonth'].$sep;
  $schema_insert .= $res2['Tot_GrossMonth'].$sep;
  $schema_insert .= $res['GrossSalary_PostAnualComponent_Value'].$sep;
  $schema_insert .= $res2['GrossSalary_PostAnualComponent_Value'].$sep;
  $schema_insert .= $res['PF_Employee_Contri_Value'].$sep;
  $schema_insert .= $res2['PF_Employee_Contri_Value'].$sep;
  $schema_insert .= $res['ESCI'].$sep;
  $schema_insert .= $res2['ESCI'].$sep;
  $schema_insert .= $res['NPS_Value'].$sep;
  $schema_insert .= $res2['NPS_Value'].$sep;
  $schema_insert .= $res['NetMonthSalary_Value'].$sep;
  $schema_insert .= $res2['NetMonthSalary_Value'].$sep;
  $schema_insert .= $res['CHILD_EDU_ALL_Value'].$sep;
  $schema_insert .= $res2['CHILD_EDU_ALL_Value'].$sep;
  $schema_insert .= $res['LTA_Value'].$sep;
  $schema_insert .= $res2['LTA_Value'].$sep;
  $schema_insert .= $res['Tot_Gross_Annual'].$sep;
  $schema_insert .= $res2['Tot_Gross_Annual'].$sep;
  $schema_insert .= $res['GRATUITY_Value'].$sep;
  $schema_insert .= $res2['GRATUITY_Value'].$sep;
  $schema_insert .= $res['PF_Employer_Contri_Annul'].$sep;
  $schema_insert .= $res2['PF_Employer_Contri_Annul'].$sep;
  $schema_insert .= $res['Mediclaim_Policy'].$sep;
  $schema_insert .= $res2['Mediclaim_Policy'].$sep;
  $schema_insert .= $res['AnnualESCI'].$sep;
  $schema_insert .= $res2['AnnualESCI'].$sep;
  $schema_insert .= $res['Tot_CTC'].$sep;
  $schema_insert .= $res2['Tot_CTC'].$sep;
  $schema_insert .= $res['Status'].$sep;
  $schema_insert .= $res2['Status'].$sep;
  $schema_insert .= $res['CtcCreatedBy'].$sep;
  $schema_insert .= $res2['CtcCreatedBy'].$sep;
  $schema_insert .= $res['CtcCreatedDate'].$sep;
  $schema_insert .= $res2['CtcCreatedDate'].$sep;
  $schema_insert .= $res['CtcYearId'].$sep;
  $schema_insert .= $res2['CtcYearId'].$sep;
  $schema_insert .= $res['SalChangeDate'].$sep;
  $schema_insert .= $res2['SalChangeDate'].$sep; 
  
  $schema_insert = str_replace($sep."$", "", $schema_insert);
  $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
  $schema_insert .= "\t";
  print(trim($schema_insert)); print "\n"; 
  $no++;
 } //while


} //if($_REQUEST['v']==1)
elseif($_REQUEST['v']==2) //Elig
{
 $xls_filename = 'Comparison_eligibility.xls';
 header("Content-Type: application/xls");
 header("Content-Disposition: attachment; filename=$xls_filename");
 header("Pragma: no-cache"); header("Expires: 0"); $sep = "\t";
 echo "Sn\tEC\tLodging_CategoryA_pms\tLodging_CategoryA_Elig\tLodging_CategoryB_pms\tLodging_CategoryB_Elig\tLodging_CategoryC_pms\tLodging_CategoryC_Elig\tDA_Outside_Hq_pms\tDA_Outside_Hq_Elig\tDA_Inside_Hq_pms\tDA_Inside_Hq_Elig\tTravel_TwoWeeKM_pms\tTravel_TwoWeeKM_Elig\tTravel_FourWeeKM_pms\tTravel_FourWeeKM_Elig\tTravel_TwoWeeLimitPerMonth_pms\tTravel_TwoWeeLimitPerMonth_Elig\tTravel_FourWeeLimitPerMonth_pms\tTravel_FourWeeLimitPerMonth_Elig\tMode_Travel_Outside_Hq_pms\tMode_Travel_Outside_Hq_Elig\tTravelClass_Outside_Hq_pms\tTravelClass_Outside_Hq_Elig\tMobile_Exp_Rem_Rs_pms\tMobile_Exp_Rem_Rs_Elig\tPrd_pms\tPrd_Elig\tMobile_Hand_Elig_Rs_pms\tMobile_Hand_Elig_Rs_Elig\tHealth_Insurance_pms\tHealth_Insurance_Elig\tVehiclePolicy_pms\tVehiclePolicy_Elig\tStatus_pms\tStatus_Elig\tEligCreatedBy_pms\tEligCreatedBy_Elig\tEligCreatedDate_pms\tEligCreatedDate_Elig\tEligYearId_pms\tEligYearId_Elig\tSysDate_pms\tSysDate_Elig";
 print("\n");
 $sql=mysql_query("select p.*,EmpCode from hrm_employee_eligibility_pms p inner join hrm_employee e on p.EmployeeID=e.EmployeeID where p.PmsYearId=".$_REQUEST['yi']." AND EligCreatedDate='".$_REQUEST['dt']."' AND p.Status='A' AND e.CompanyId=".$_REQUEST['ci'], $con);
 $no=1;
 while($res=mysql_fetch_array($sql))
 {
  
  $sql2=mysql_query("select * from hrm_employee_eligibility where EligCreatedDate='".$_REQUEST['dt']."' AND EmployeeID=".$res['EmployeeID'], $con); $res2=mysql_fetch_array($sql2);
 
  $schema_insert = "";
  $schema_insert .= $no.$sep;
  $schema_insert .= $res['EmpCode'].$sep;
  $schema_insert .= $res['Lodging_CategoryA'].$sep;
  $schema_insert .= $res2['Lodging_CategoryA'].$sep;
  $schema_insert .= $res['Lodging_CategoryB'].$sep;
  $schema_insert .= $res2['Lodging_CategoryB'].$sep; 
  $schema_insert .= $res['Lodging_CategoryC'].$sep;
  $schema_insert .= $res2['Lodging_CategoryC'].$sep;
  $schema_insert .= $res['DA_Outside_Hq'].$sep;
  $schema_insert .= $res2['DA_Outside_Hq'].$sep; 
  $schema_insert .= $res['DA_Inside_Hq'].$sep;
  $schema_insert .= $res2['DA_Inside_Hq'].$sep;
  $schema_insert .= $res['Travel_TwoWeeKM'].$sep;
  $schema_insert .= $res2['Travel_TwoWeeKM'].$sep; 
  $schema_insert .= $res['Travel_FourWeeKM'].$sep;
  $schema_insert .= $res2['Travel_FourWeeKM'].$sep;
  $schema_insert .= $res['Travel_TwoWeeLimitPerMonth'].$sep;
  $schema_insert .= $res2['Travel_TwoWeeLimitPerMonth'].$sep; 
  $schema_insert .= $res['Travel_FourWeeLimitPerMonth'].$sep;
  $schema_insert .= $res2['Travel_FourWeeLimitPerMonth'].$sep;
  $schema_insert .= $res['Mode_Travel_Outside_Hq'].$sep;
  $schema_insert .= $res2['Mode_Travel_Outside_Hq'].$sep;
  $schema_insert .= $res['TravelClass_Outside_Hq'].$sep;
  $schema_insert .= $res2['TravelClass_Outside_Hq'].$sep; 
  $schema_insert .= $res['Mobile_Exp_Rem_Rs'].$sep;
  $schema_insert .= $res2['Mobile_Exp_Rem_Rs'].$sep; 
  $schema_insert .= $res['Prd'].$sep;
  $schema_insert .= $res2['Prd'].$sep; 
  $schema_insert .= $res['Mobile_Hand_Elig_Rs'].$sep;
  $schema_insert .= $res2['Mobile_Hand_Elig_Rs'].$sep; 
  $schema_insert .= $res['Health_Insurance'].$sep;
  $schema_insert .= $res2['Health_Insurance'].$sep; 
  $schema_insert .= $res['VehiclePolicy'].$sep;
  $schema_insert .= $res2['VehiclePolicy'].$sep; 
  $schema_insert .= $res['Status'].$sep;
  $schema_insert .= $res2['Status'].$sep; 
  $schema_insert .= $res['EligCreatedBy'].$sep;
  $schema_insert .= $res2['EligCreatedBy'].$sep; 
  $schema_insert .= $res['EligCreatedDate'].$sep;
  $schema_insert .= $res2['EligCreatedDate'].$sep; 
  $schema_insert .= $res['EligYearId'].$sep;
  $schema_insert .= $res2['EligYearId'].$sep;
  $schema_insert .= $res['SysDate'].$sep;
  $schema_insert .= $res2['SysDate'].$sep; 
  $schema_insert = str_replace($sep."$", "", $schema_insert);
  $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
  $schema_insert .= "\t";
  print(trim($schema_insert)); print "\n"; 
  $no++;
 }
 
 
} //elseif($_REQUEST['v']==2)
elseif($_REQUEST['v']==3) //Grade-Desig
{


 $xls_filename = 'Comparison_grade_desig.xls';
 header("Content-Type: application/xls");
 header("Content-Disposition: attachment; filename=$xls_filename");
 header("Pragma: no-cache"); header("Expires: 0"); $sep = "\t";
 echo "Sn\tEC\tDepartment_pms\tDepartment_ess\tDesig_pms\tDesig_ess\tGrade_pms\tGrade_ess";
 print("\n");
 $sql=mysql_query("select e.EmployeeID,e.EmpCode,HR_Curr_DepartmentId,HR_GradeId,HR_DesigId from hrm_employee_pms p inner join hrm_employee e on p.EmployeeID=e.EmployeeID where p.AssessmentYear=".$_REQUEST['yi']." AND e.EmpStatus='A' AND Hod_TotalFinalRating>0 AND Hod_TotalFinalScore>0 AND e.CompanyId=".$_REQUEST['ci'], $con);
 $no=1;
 while($res=mysql_fetch_array($sql))
 {
  
  $sql2=mysql_query("select DepartmentId,DesigId,GradeId from hrm_employee_general where EmployeeID=".$res['EmployeeID'], $con); $res2=mysql_fetch_array($sql2);
 
  $schema_insert = "";
  $schema_insert .= $no.$sep;
  $schema_insert .= $res['EmpCode'].$sep;
  $schema_insert .= $res['HR_Curr_DepartmentId'].$sep;
  $schema_insert .= $res2['DepartmentId'].$sep;
  $schema_insert .= $res['HR_DesigId'].$sep;
  $schema_insert .= $res2['DesigId'].$sep; 
  $schema_insert .= $res['HR_GradeId'].$sep;
  $schema_insert .= $res2['GradeId'].$sep; 
  $schema_insert = str_replace($sep."$", "", $schema_insert);
  $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
  $schema_insert .= "\t";
  print(trim($schema_insert)); print "\n"; 
  $no++;
 }
 
} //elseif($_REQUEST['v']==3)

} //if($_REQUEST['action']=='ComparisonExport')



?>