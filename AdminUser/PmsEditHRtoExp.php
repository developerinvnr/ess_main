<?php require_once('config/config.php');
date_default_timezone_set('Asia/Calcutta');

if($_REQUEST['action']=='ComparisonExport')
{


if($_REQUEST['act']=='DW')
{ 
  if($_REQUEST['value']=='All') { $ExlName="AllEmployee"; }
  else
  { 
   $sqlD=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$_REQUEST['vle'],$con);
   $resD=mysql_fetch_assoc($sqlD);
   $ExlName=$resD['DepartmentCode']; 
  } 
}
else if($_REQUEST['act']=='APPW' OR $_REQUEST['act']=='REVW' OR $_REQUEST['act']=='HODW')
{
   $sqlE=mysql_query("select Fname,Sname,Lname from hrm_employee where EmployeeID=".$_REQUEST['vle'],$con);
   $resE=mysql_fetch_assoc($sqlE);
   if($resE['Sname']==''){ $ExlName=$resE['Fname'].' '.$resE['Lname']; }
   else{ $ExlName=$resE['Fname'].' '.$resE['Sname'].' '.$resE['Lname']; }
}


if($_REQUEST['v']==1) //CTC
{

 $xls_filename = 'Ctc'.$ExlName.'.xls';
 header("Content-Type: application/xls");
 header("Content-Disposition: attachment; filename=$xls_filename");
 header("Pragma: no-cache"); header("Expires: 0"); $sep = "\t"; 
 echo "Sn\tEC\tName\tDepartment\tDesignation\tGrade\tBasic_pms\tBasic_ctc\tHRA_pms\tHRA_ctc\tBonus_pms\tBonus_ctc\tSpecial_pms\tSpecial_ctc\tGross_pms\tGross_ctc\tGrossPAC_pms\tGrossPAC_ctc\tPF_pms\tPF_ctc\tESIC_pms\tESIC_ctc\tNPS_pms\tNPS_ctc\tNet_pms\tNet_ctc\tCEA_pms\tCEA_ctc\tLTA_pms\tLTA_ctc\tGross_Annual_pms\tGross_Annual_ctc\tGRATUITY_pms\tGRATUITY_ctc\tPF_Employer_pms\tPF_Employer_ctc\tMediclaim_pms\tMediclaim_ctc\tAnnualESCI_pms\tAnnualESCI_ctc\tCTC_pms\tCTC_ctc\tStatus_pms\tStatus_ctc\tCrBy_pms\tCrBy_ctc\tCrDate_pms\tCrDate_ctc\tYearId_pms\tYearId_ctc\tSalChangeDate_pms\tSalChangeDate_ctc";
 //echo "Sn\tEC\tName\tGrade\tBasic\tHRA\tBonus\tSpecial\tGross\tGrossPAC\tPF\tESIC\tNPS\tNet\tCEA\tLTA\tGross_Annual\tGRATUITY\tPF_Employer\tMediclaim\tAnnualESCI\tCTC\tStatus\tCrBy\tCrDate\tYearId\tSalChangeDate";

 
 print("\n");
 
 if($_REQUEST['act']=='DW')
 { 
  if($_REQUEST['vle']=='All') { $RepN="1=1"; }
  else{ $RepN='p.HR_Curr_DepartmentId='.$_REQUEST['vle']; } 
 }
 else if($_REQUEST['act']=='APPW' OR $_REQUEST['act']=='REVW' OR $_REQUEST['act']=='HODW')
 {
  if($_REQUEST['act']=='APPW'){$RepN='p.Appraiser_EmployeeID='.$_REQUEST['vle'];}
  elseif($_REQUEST['act']=='REVW'){$RepN='p.Reviewer_EmployeeID='.$_REQUEST['vle'];}
  elseif($_REQUEST['act']=='HODW'){$RepN='p.HOD_EmployeeID='.$_REQUEST['vle'];}
 }
 
 $sql=mysql_query("select cp.*,EmpCode,concat(Fname, ' ', Sname, ' ', Lname) as fullname, GradeValue, DesigName, DepartmentCode from hrm_employee_pms p left join hrm_employee_ctc_pms cp on p.EmployeeID=cp.EmployeeID left join hrm_employee e on p.EmployeeID=e.EmployeeID left join hrm_grade g on p.HR_GradeId=g.GradeId left join hrm_designation de on p.HR_DesigId=de.DesigId left join hrm_department d on p.HR_Curr_DepartmentId=d.DepartmentId where p.AssessmentYear=".$_REQUEST['yi']." AND cp.PmsYearId=".$_REQUEST['yi']." AND cp.CtcCreatedDate='".$_REQUEST['dt']."' AND ".$RepN." AND e.CompanyId=".$_REQUEST['ci'], $con);
 
 
 $no=1;
 while($res=mysql_fetch_array($sql))
 {
  
  $sql2=mysql_query("select * from hrm_employee_ctc where Status='A' AND EmployeeID=".$res['EmployeeID'], $con); $res2=mysql_fetch_array($sql2);
 
  $schema_insert = "";
  $schema_insert .= $no.$sep;
  $schema_insert .= $res['EmpCode'].$sep;
  $schema_insert .= $res['fullname'].$sep;
  $schema_insert .= $res['DepartmentCode'].$sep;
  $schema_insert .= $res['DesigName'].$sep;
  $schema_insert .= $res['GradeValue'].$sep;
  
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


elseif($_REQUEST['v']==2) //Eligibility
{

 $xls_filename = 'Elig'.$ExlName.'.xls';
 header("Content-Type: application/xls");
 header("Content-Disposition: attachment; filename=$xls_filename");
 header("Pragma: no-cache"); header("Expires: 0"); $sep = "\t"; 
 
 echo "Sn\tEC\tName\tDepartment\tDesignation\tGrade\tLodging_CategoryA_pms\tLodging_CategoryA_Elig\tLodging_CategoryB_pms\tLodging_CategoryB_Elig\tLodging_CategoryC_pms\tLodging_CategoryC_Elig\tDA_Outside_Hq_pms\tDA_Outside_Hq_Elig\tDA_Outside_Hq_Rmk_pms\tDA_Outside_Hq_Rmk_Elig\tDA_Inside_Hq_pms\tDA_Inside_Hq_Elig\tDA_Inside_Hq_Rmk_pms\tDA_Inside_Hq_Rmk_Elig\tTravel_TwoWeeKM_pms\tTravel_TwoWeeKM_Elig\tTravel_TwoWeeKM_Rmk_pms\tTravel_TwoWeeKM_Rmk_Elig\tTravel_FourWeeKM_pms\tTravel_FourWeeKM_Elig\tTravel_FourWeeKM_Rmk_pms\tTravel_FourWeeKM_Rmk_Elig\tVehiclePolicy_pms\tVehiclePolicy_Elig\tFlight_Allow_pms\tFlight_Allow_Elig\tFlight_Class_pms\Flight_Class_Elig\tFlight_Rmk_pms\tFlight_Rmk_Elig\tTrain_Allow_pms\tTrain_Allow_Elig\tTrain_Class_pms\tTrain_Class_Elig\tTrain_Rmk_pms\tTrain_Rmk_Elig\tMobile_Exp_Rem_Rs_pms\tMobile_Exp_Rem_Rs_Elig\tPrd_pms\tPrd_Elig\tMobile_Exp_Rem_Rmk_pms\tMobile_Exp_Rem_Rmk_Elig\tMobile_Exp_RemPost_Rs_pms\tMobile_Exp_RemPost_Rs_Elig\tPrdPost_pms\tPrdPost_Elig\tMobile_Exp_RemPost_Rmk_pms\tMobile_Exp_RemPost_Rmk_Elig\tMobile_Hand_Elig_Rs_pms\tMobile_Hand_Elig_Rs_Elig\tMobile_Hand_Elig_Rs_pms\tMobile_Hand_Elig_Rs_Elig\tMobile_Hand_Elig_Rmk_pms\tMobile_Hand_Elig_Rmk_Elig\tHealth_Insurance_pms\tHealth_Insurance_Elig\tTerm_Insurance_pms\tTerm_Insurance_Elig\tHelthCheck_Amt_pms\HelthCheck_Amt_Elig\tHelthCheck_Rmk_pms\tHelthCheck_Rmk_Elig\tStatus_pms\tStatus_Elig\tEligCreatedBy_pms\tEligCreatedBy_Elig\tEligCreatedDate_pms\tEligCreatedDate_Elig\tEligYearId_pms\tEligYearId_Elig\tSysDate_pms\tSysDate_Elig";
 //echo "Sn\tEC\tName\tGrade\tLodging_CategoryA\tLodging_CategoryB\tLodging_CategoryC\tDA_Outside_Hq\tDA_Outside_Hq_Rmk\tDA_Inside_Hq\tDA_Inside_Hq_Rmk\tTravel_TwoWeeKM\tTravel_TwoWeeKM_Rmk\tTravel_FourWeeKM\tTravel_FourWeeKM_Rmk\tVehiclePolicy\tFlight_Allow\tFlight_Class\tFlight_Rmk\tTrain_Allow\tTrain_Class\tTrain_Rmk\tMobile_Exp_Rem_Rs\tPrd\tMobile_Exp_Rem_Rmk\tMobile_Exp_RemPost_Rs\tPrdPost\tMobile_Exp_RemPost_Rmk\tMobile_Hand_Elig_Rs\tMobile_Hand_Elig_Rs\tMobile_Hand_Elig_Rmk\tHealth_Insurance\tTerm_Insurance\tHelthCheck_Amt\tHelthCheck_Rmk\tStatus\tEligCreatedBy\tEligCreatedDate\tEligYearId\tSysDate";
 
 print("\n");
 
 if($_REQUEST['act']=='DW')
 { 
  if($_REQUEST['vle']=='All') { $RepN="1=1"; }
  else{ $RepN='p.HR_Curr_DepartmentId='.$_REQUEST['vle']; } 
 }
 else if($_REQUEST['act']=='APPW' OR $_REQUEST['act']=='REVW' OR $_REQUEST['act']=='HODW')
 {
  if($_REQUEST['act']=='APPW'){$RepN='p.Appraiser_EmployeeID='.$_REQUEST['vle'];}
  elseif($_REQUEST['act']=='REVW'){$RepN='p.Reviewer_EmployeeID='.$_REQUEST['vle'];}
  elseif($_REQUEST['act']=='HODW'){$RepN='p.HOD_EmployeeID='.$_REQUEST['vle'];}
 }
 
 $sql=mysql_query("select ep.*,EmpCode,concat(Fname, ' ', Sname, ' ', Lname) as fullname, GradeValue, DesigName, DepartmentCode from hrm_employee_pms p left join hrm_employee e on p.EmployeeID=e.EmployeeID left join hrm_employee_eligibility_pms ep on p.EmployeeID=ep.EmployeeID left join hrm_grade g on p.HR_GradeId=g.GradeId left join hrm_designation de on p.HR_DesigId=de.DesigId left join hrm_department d on p.HR_Curr_DepartmentId=d.DepartmentId where p.AssessmentYear=".$_REQUEST['yi']." AND ep.PmsYearId=".$_REQUEST['yi']." AND ep.EligCreatedDate='".$_REQUEST['dt']."' AND ".$RepN." AND e.CompanyId=".$_REQUEST['ci'], $con);
 
 
 $no=1;
 while($res=mysql_fetch_array($sql))
 {
  
  $sql3=mysql_query("select * from hrm_employee_eligibility where Status='A' AND EmployeeID=".$res['EmployeeID'], $con); 
  $res3=mysql_fetch_array($sql3);
  
  
 
  $schema_insert = "";
  $schema_insert .= $no.$sep;
  $schema_insert .= $res['EmpCode'].$sep;
  $schema_insert .= $res['fullname'].$sep;
  $schema_insert .= $res['DepartmentCode'].$sep;
  $schema_insert .= $res['DesigName'].$sep;
  $schema_insert .= $res['GradeValue'].$sep;
  
  $schema_insert .= $res['Lodging_CategoryA'].$sep;
  $schema_insert .= $res3['Lodging_CategoryA'].$sep;
  $schema_insert .= $res['Lodging_CategoryB'].$sep;
  $schema_insert .= $res3['Lodging_CategoryB'].$sep; 
  $schema_insert .= $res['Lodging_CategoryC'].$sep;
  $schema_insert .= $res3['Lodging_CategoryC'].$sep;
  $schema_insert .= $res['DA_Outside_Hq'].$sep;
  $schema_insert .= $res3['DA_Outside_Hq'].$sep; 
  $schema_insert .= $res['DA_Outside_Hq_Rmk'].$sep;
  $schema_insert .= $res3['DA_Outside_Hq_Rmk'].$sep;
  $schema_insert .= $res['DA_Inside_Hq'].$sep;
  $schema_insert .= $res3['DA_Inside_Hq'].$sep;
  $schema_insert .= $res['DA_Inside_Hq_Rmk'].$sep;
  $schema_insert .= $res3['DA_Inside_Hq_Rmk'].$sep;
  $schema_insert .= $res['Travel_TwoWeeKM'].$sep;
  $schema_insert .= $res3['Travel_TwoWeeKM'].$sep; 
  $schema_insert .= $res['Travel_TwoWeeKM_Rmk'].$sep;
  $schema_insert .= $res3['Travel_TwoWeeKM_Rmk'].$sep; 
  $schema_insert .= $res['Travel_FourWeeKM'].$sep;
  $schema_insert .= $res3['Travel_FourWeeKM'].$sep;
  $schema_insert .= $res['Travel_FourWeeKM_Rmk'].$sep;
  $schema_insert .= $res3['Travel_FourWeeKM_Rmk'].$sep;
  $schema_insert .= $res['VehiclePolicy'].$sep;
  $schema_insert .= $res3['VehiclePolicy'].$sep; 
  $schema_insert .= $res['Flight_Allow'].$sep;
  $schema_insert .= $res3['Flight_Allow'].$sep; 
  $schema_insert .= $res['Flight_Class'].$sep;
  $schema_insert .= $res3['Flight_Class'].$sep; 
  $schema_insert .= $res['Flight_Rmk'].$sep;
  $schema_insert .= $res3['Flight_Rmk'].$sep; 
  $schema_insert .= $res['Train_Allow'].$sep;
  $schema_insert .= $res3['Train_Allow'].$sep; 
  $schema_insert .= $res['Train_Class'].$sep;
  $schema_insert .= $res3['Train_Class'].$sep; 
  $schema_insert .= $res['Train_Rmk'].$sep;
  $schema_insert .= $res3['Train_Rmk'].$sep; 
   
  $schema_insert .= $res['Mobile_Exp_Rem_Rs'].$sep;
  $schema_insert .= $res3['Mobile_Exp_Rem_Rs'].$sep;
  $schema_insert .= $res['Prd'].$sep;
  $schema_insert .= $res3['Prd'].$sep;
  $schema_insert .= $res['Mobile_Exp_Rem_Rmk'].$sep;
  $schema_insert .= $res3['Mobile_Exp_Rem_Rmk'].$sep; 
  
  $schema_insert .= $res['Mobile_Exp_RemPost_Rs'].$sep;
  $schema_insert .= $res3['Mobile_Exp_RemPost_Rs'].$sep; 
  $schema_insert .= $res['PrdPost'].$sep;
  $schema_insert .= $res3['PrdPost'].$sep; 
  $schema_insert .= $res['Mobile_Exp_RemPost_Rmk'].$sep;
  $schema_insert .= $res3['Mobile_Exp_RemPost_Rmk'].$sep;  
    
  $schema_insert .= $res['Mobile_Hand_Elig_Rs'].$sep;
  $schema_insert .= $res3['Mobile_Hand_Elig_Rs'].$sep;
  $schema_insert .= $res['Mobile_Hand_Elig_Rs'].$sep;
  $schema_insert .= $res3['Mobile_Hand_Elig_Rs'].$sep; 
  if(isset($res['Mobile_Hand_Elig_Rmk']) AND $res['Mobile_Hand_Elig_Rmk']!=''){ $schema_insert .= $res['Mobile_Hand_Elig_Rmk'].$sep; }else{ $schema_insert .= '.'.$sep; }
  if(isset($res3['Mobile_Hand_Elig_Rmk']) AND $res3['Mobile_Hand_Elig_Rmk']!=''){ $schema_insert .= $res3['Mobile_Hand_Elig_Rmk'].$sep; }else{ $schema_insert .= '.'.$sep; }
 
   
  if(isset($res['Health_Insurance']) AND $res['Health_Insurance']!=''){ $schema_insert .= $res['Health_Insurance'].$sep; }else{ $schema_insert .= '.'.$sep; }
  if(isset($res3['Health_Insurance']) AND $res3['Health_Insurance']!=''){ $schema_insert .= $res3['Health_Insurance'].$sep; }else{ $schema_insert .= '.'.$sep; }
  if(isset($res['Term_Insurance']) AND $res['Term_Insurance']!=''){ $schema_insert .= $res['Term_Insurance'].$sep; }else{ $schema_insert .= '.'.$sep; }
  if(isset($res3['Term_Insurance']) AND $res3['Term_Insurance']!=''){ $schema_insert .= $res3['Term_Insurance'].$sep; }else{ $schema_insert .= '.'.$sep; }
  if(isset($res['HelthCheck_Amt']) AND $res['HelthCheck_Amt']!=''){ $schema_insert .= $res['HelthCheck_Amt'].$sep; }else{ $schema_insert .= '.'.$sep; }
  if(isset($res3['HelthCheck_Amt']) AND $res3['HelthCheck_Amt']!=''){ $schema_insert .= $res3['HelthCheck_Amt'].$sep;  }else{ $schema_insert .= '.'.$sep;  }
  
   
  $schema_insert .= $res['HelthCheck_Rmk'].$sep;
  $schema_insert .= $res3['HelthCheck_Rmk'].$sep;
  $schema_insert .= $res['Status'].$sep;
  $schema_insert .= $res3['Status'].$sep; 
  $schema_insert .= $res['EligCreatedBy'].$sep;
  $schema_insert .= $res3['EligCreatedBy'].$sep; 
  $schema_insert .= $res['EligCreatedDate'].$sep;
  $schema_insert .= $res3['EligCreatedDate'].$sep; 
  $schema_insert .= $res['EligYearId'].$sep;
  $schema_insert .= $res3['EligYearId'].$sep;
  $schema_insert .= $res['SysDate'].$sep;
  $schema_insert .= $res3['SysDate'].$sep; 
  $schema_insert = str_replace($sep."$", "", $schema_insert);
  $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
  $schema_insert .= "\t";
  print(trim($schema_insert)); print "\n"; 
  $no++;
 } //while


} //if($_REQUEST['v']==2)

}
?>