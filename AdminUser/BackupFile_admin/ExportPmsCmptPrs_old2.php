<?php 
require_once('config/config.php');
date_default_timezone_set('Asia/Calcutta');
$sY=mysql_query("select * from hrm_year where YearId=".$_REQUEST['YI']."", $con); $rY=mysql_fetch_assoc($sY); 
$FD=date("Y",strtotime($rY['FromDate'])); $TD=date("Y",strtotime($rY['ToDate'])); $MY=$FD-1;  $PRD=$FD.'-'.$TD;
/*************************************************************************************************************/
if($_REQUEST['YI']==1){$Y=2012;}elseif($_REQUEST['YI']==2){$Y=2013;}elseif($_REQUEST['YI']==3){$Y=2014;}elseif($_REQUEST['YI']==4){$Y=2015;}elseif($_REQUEST['YI']==5){$Y=2016;}elseif($_REQUEST['YI']==6){$Y=2017;}elseif($_REQUEST['YI']==7){$Y=2018;}elseif($_REQUEST['YI']==8){$Y=2019;}elseif($_REQUEST['YI']==9){$Y=2020;}elseif($_REQUEST['YI']==10){$Y=2021;}elseif($_REQUEST['YI']==11){$Y=2022;}


if($_REQUEST['action']='CmptPrsIncExport') 
{ 
 if($_REQUEST['ee']=='Dept')
{ $name='Department_Wise'; 
  if($_REQUEST['value']!=0)
  { $sqlA=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$_REQUEST['value'], $con); $resA=mysql_fetch_assoc($sqlA); $name2=$resA['DepartmentCode']; }
  else{$name2='All_Department';}
}
elseif($_REQUEST['ee']=='App')
{ $name='Apraiser_Wise';
  $sqlA=mysql_query("select Fname,Sname,Lname from hrm_employee where EmployeeId=".$_REQUEST['value'], $con); $resA=mysql_fetch_assoc($sqlA); 
  $name2=$resA['Fname'].'_'.$resA['Sname'].'_'.$resA['Lname'];
}
elseif($_REQUEST['ee']=='Rev')
{ $name='Reviewer_Wise';
  $sqlA=mysql_query("select Fname,Sname,Lname from hrm_employee where EmployeeId=".$_REQUEST['value'], $con); $resA=mysql_fetch_assoc($sqlA); 
  $name2=$resA['Fname'].'_'.$resA['Sname'].'_'.$resA['Lname'];
}
elseif($_REQUEST['ee']=='Hod')
{ $name='HOD_Wise';
  $sqlA=mysql_query("select Fname,Sname,Lname from hrm_employee where EmployeeId=".$_REQUEST['value'], $con); $resA=mysql_fetch_assoc($sqlA); 
  $name2=$resA['Fname'].'_'.$resA['Sname'].'_'.$resA['Lname'];
}
  
$xls_filename = 'Complete_PMS_Process'.$PRD.'-'.$name2.'.xls';
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=$xls_filename");
header("Pragma: no-cache");
header("Expires: 0");
$sep = "\t"; 
echo "Sn\tEmpCode\tName\tDepartment\tGrade\tDesignation\tAppraiser\tReviewer\tHOD\tScore\tRating";

if($_REQUEST['YI']<=7){ echo "\tPrevious Gross"; }else{ echo "\tPrevious CTC"; }
echo "\tApp Score\tApp Rating\tApp Grade\tApp Designation\tApp Soft_Skill\tApp Tech_Skill\tApp Justification\tApp Remark\tRev Score\tRev Rating\tRev Grade\tRev Designation\tRev Soft_Skill\tRev Tech_Skill\tRev Justification\tRev Remark\tHOD Score\tHOD Rating\tHOD Grade\tHOD Designation";

if($_REQUEST['YI']<=7){ echo "\tHOD PIS\tHOD %PIS\tHOD PSC\tHOD % PSC\tHOD TISPM\tHOD % TISPM\tHOD TPGSPM"; }
else{ echo "\tHOD Proposed CTC\t% HOD  PRO. CTC\tHOD CTC Corr.\t% HOD  Corr.\tHOD Total Increment\t% HOD  Total\tHOD Total Proposed CTC"; }

echo "\tHOD Remark\tHR Score\tHR Rating\tHR Grade\tHR Designation\tHR Department\tVertical";

if($_REQUEST['YI']<=7){ echo "\tHR PIS\tHR % PIS\tHR PSC\tHR % PSC\tHR TISPM\tHR % TISPM\tHR TPGSPM"; }
else{ echo "\tHR Proposed CTC\t%% HR PRO. CTC\tHR CTC Corr.\t% HR Corr.\tHR Total Increment\tHR % Total\tHR Total Proposed CTC"; }

echo "\tBasic\tHRA\tCA\tCar Allow\tBonus\tSA\tGross\tGross(PAC)\tESIC\tPF\tNET\tLTA\tMR\tCEA\tAnnual Gross\tESIC Contribution\tPF Contribution";

if($_REQUEST['YI']<=7){ echo "\tBonus"; }

echo "\tGratuity\tMediclaim\tCTC\tTwo Weel\tFour Weel\tDA IN_HQ\tDA OUT_HQ\tA Grade\tB Grade\tC Grade\tTravel Mode\tTravel Class\tMobile PM\tHandset Elig\tMediclaim INSU\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
print("\n");
  
if($_REQUEST['ee']=='Dept')
{  
  if($_REQUEST['value']==0)
  { $sql=mysql_query("select EmpCode,Fname,Sname,Lname,hrm_employee_pms.* from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_pms ON hrm_employee.EmployeeID=hrm_employee_pms.EmployeeID where hrm_employee.CompanyId=".$_REQUEST['c']." AND hrm_employee.EmpStatus='A' AND hrm_employee_general.DateJoining<='".$Y."-06-30' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.Appraiser_EmployeeID!=0 order by EmpCode ASC", $con); }
  else{ $sql=mysql_query("select EmpCode,Fname,Sname,Lname,hrm_employee_pms.* from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_pms ON hrm_employee.EmployeeID=hrm_employee_pms.EmployeeID where hrm_employee.CompanyId=".$_REQUEST['c']." AND hrm_employee.EmpStatus='A' AND hrm_employee_general.DateJoining<='".$Y."-06-30' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_general.DepartmentId=".$_REQUEST['value']." AND hrm_employee_pms.Appraiser_EmployeeID!=0 order by EmpCode ASC", $con); }
}
elseif($_REQUEST['ee']=='App')
{ $sql=mysql_query("select EmpCode,Fname,Sname,Lname,hrm_employee_pms.* from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_pms ON hrm_employee.EmployeeID=hrm_employee_pms.EmployeeID where hrm_employee.CompanyId=".$_REQUEST['c']." AND hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.Appraiser_EmployeeID=".$_REQUEST['value']." AND hrm_employee_pms.Appraiser_EmployeeID!=0 order by EmpCode ASC", $con);
}
elseif($_REQUEST['ee']=='Rev')
{ $sql=mysql_query("select EmpCode,Fname,Sname,Lname,hrm_employee_pms.* from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_pms ON hrm_employee.EmployeeID=hrm_employee_pms.EmployeeID where hrm_employee.CompanyId=".$_REQUEST['c']." AND hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.Reviewer_EmployeeID=".$_REQUEST['value']." AND hrm_employee_pms.Appraiser_EmployeeID!=0 order by EmpCode ASC", $con);
}
elseif($_REQUEST['ee']=='Hod')
{ $sql=mysql_query("select EmpCode,Fname,Sname,Lname,hrm_employee_pms.* from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_pms ON hrm_employee.EmployeeID=hrm_employee_pms.EmployeeID where hrm_employee.CompanyId=".$_REQUEST['c']." AND hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.HOD_EmployeeID=".$_REQUEST['value']." AND hrm_employee_pms.Appraiser_EmployeeID!=0 order by EmpCode ASC", $con);
}
 $Sno=1; while($res=mysql_fetch_array($sql)){ 
 $sqlDept=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$res['HR_Curr_DepartmentId'], $con); $resDept=mysql_fetch_assoc($sqlDept); 
 $sqlDesig=mysql_query("select DesigName,DesigCode from hrm_designation where DesigId=".$res['HR_CurrDesigId'], $con); $resDesig=mysql_fetch_assoc($sqlDesig);
 $sqlG=mysql_query("select GradeValue from hrm_grade where GradeId=".$res['HR_CurrGradeId'], $con);  $resG=mysql_fetch_assoc($sqlG);
 $sqlHRDept=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$res['HR_DepartmentId'], $con); $resHRDept=mysql_fetch_assoc($sqlHRDept);
 $sqlE1=mysql_query("select Fname, Sname, Lname from hrm_employee where EmployeeID=".$res['Appraiser_EmployeeID'], $con); $resE1=mysql_fetch_assoc($sqlE1);
 $sqlE2=mysql_query("select Fname, Sname, Lname from hrm_employee where EmployeeID=".$res['Reviewer_EmployeeID'], $con); $resE2=mysql_fetch_assoc($sqlE2); 
 $sqlE3=mysql_query("select Fname, Sname, Lname from hrm_employee where EmployeeID=".$res['HOD_EmployeeID'], $con); $resE3=mysql_fetch_assoc($sqlE3); 
 
 if($_REQUEST['YI']<=5)
 { 
  $sqlC = mysql_query("SELECT * from hrm_employee_ctc WHERE EmployeeID=".$res['EmployeeID']." AND CtcYearId=".$_REQUEST['YI']." AND CtcCreatedDate>='".date($FD."-10-01")."' AND CtcCreatedDate<='".date($FD."-12-31")."'", $con); 
  $sqlEl = mysql_query("SELECT * from hrm_employee_eligibility WHERE EmployeeID=".$res['EmployeeID']." AND EligYearId=".$_REQUEST['YI']." AND EligCreatedDate>='".date($FD."-10-01")."' AND EligCreatedDate<='".date($FD."-12-31")."'", $con); 
 }
 else
 {  
  $sqlC = mysql_query("SELECT * from hrm_employee_ctc WHERE EmployeeID=".$res['EmployeeID']." AND CtcYearId=".$_REQUEST['YI']." AND CtcCreatedDate='".date($TD."-01-01")."'", $con);
  $sqlEl = mysql_query("SELECT * from hrm_employee_eligibility WHERE EmployeeID=".$res['EmployeeID']." AND EligYearId=".$_REQUEST['YI']." AND EligCreatedDate='".date($TD."-01-01")."'", $con); 
 }
$RowC=mysql_num_rows($sqlC); $ResC=mysql_fetch_assoc($sqlC);
$RowEl=mysql_num_rows($sqlEl); $ResEl=mysql_fetch_assoc($sqlEl);

  $schema_insert = "";
  $schema_insert .= $Sno.$sep;
  $schema_insert .= $res['EmpCode'].$sep;
  $schema_insert .= $res['Fname'].' '.$res['Sname'].' '.$res['Lname'].$sep;
  $schema_insert .= $resDept['DepartmentCode'].$sep; 
  $schema_insert .= $resG['GradeValue'].$sep; 
  $schema_insert .= $resDesig['DesigCode'].$sep; 
  $schema_insert .= $resE1['Fname'].' '.$resE1['Sname'].' '.$resE1['Lname'].$sep;
  $schema_insert .= $resE2['Fname'].' '.$resE2['Sname'].' '.$resE2['Lname'].$sep; 
  $schema_insert .= $resE3['Fname'].' '.$resE3['Sname'].' '.$resE3['Lname'].$sep; 
  $schema_insert .= $res['Emp_TotalFinalScore'].$sep; 
  $schema_insert .= $res['Emp_TotalFinalRating'].$sep;
  
  if($_REQUEST['YI']<=7){ $schema_insert .= $res['EmpCurrGrossPM'].$sep; }
  else { $schema_insert .= $res['EmpCurrCtc'].$sep; }  		
   
  $schema_insert .= $res['Appraiser_TotalFinalScore'].$sep; 
  $schema_insert .= $res['Appraiser_TotalFinalRating'].$sep;
  if($res['Appraiser_EmpDesignation']!=$res['HR_CurrDesigId']){ $sqlDesigA=mysql_query("select DesigName,DesigCode from hrm_designation where DesigId=".$res['Appraiser_EmpDesignation']." AND CompanyId=".$_REQUEST['c'], $con); $resDesigA=mysql_fetch_assoc($sqlDesigA); $DesigA=$resDesigA['DesigCode']; }else{$DesigA='';}
if($res['Appraiser_EmpGrade']!=$res['HR_CurrGradeId']){ $sqlGA=mysql_query("select GradeValue from hrm_grade where GradeId=".$res['Appraiser_EmpGrade']." AND CompanyId=".$_REQUEST['c'], $con); $resGA=mysql_fetch_assoc($sqlGA); $GradeA=$resGA['GradeValue']; }else{$GradeA='';} 
  $schema_insert .= $GradeA.$sep;
  $schema_insert .= $DesigA.$sep; 
  $schema_insert .= $res['Appraiser_SoftSkill_1'].', '.$res['Appraiser_SoftSkill_2'].$sep; 
  $schema_insert .= $res['Appraiser_TechSkill_1'].', '.$res['Appraiser_TechSkill_2'].$sep; 
  $schema_insert .= $res['Appraiser_Justification'].$sep;
  $schema_insert .= $res['Appraiser_Remark'].$sep; 
  
  $schema_insert .= $res['Reviewer_TotalFinalScore'].$sep; 
  $schema_insert .= $res['Reviewer_TotalFinalRating'].$sep; 
if($res['Reviewer_EmpDesignation']!=$res['HR_CurrDesigId']){ $sqlDesigR=mysql_query("select DesigName,DesigCode from hrm_designation where DesigId=".$res['Reviewer_EmpDesignation']." AND CompanyId=".$_REQUEST['c'], $con); $resDesigR=mysql_fetch_assoc($sqlDesigR); $DesigR=$resDesigR['DesigCode']; }else{$DesigR='';}
if($res['Reviewer_EmpGrade']!=$res['HR_CurrGradeId']){ $sqlGR=mysql_query("select GradeValue from hrm_grade where GradeId=".$res['Reviewer_EmpGrade']." AND CompanyId=".$_REQUEST['c'], $con); $resGR=mysql_fetch_assoc($sqlGR); $GradeR=$resGR['GradeValue']; }else{$GradeR='';}  
  $schema_insert .= $GradeR.$sep;
  $schema_insert .= $DesigR.$sep;
  $schema_insert .= $res['Reviewer_SoftSkill_1'].', '.$res['Reviewer_SoftSkill_2'].$sep;
  $schema_insert .= $res['Reviewer_TechSkill_1'].', '.$res['Reviewer_TechSkill_2'].$sep; 
  $schema_insert .= $res['Reviewer_Justification'].$sep; 
  $schema_insert .= $res['Reviewer_Remark'].$sep; 
  
  $schema_insert .= $res['Hod_TotalFinalScore'].$sep;
  $schema_insert .= $res['Hod_TotalFinalRating'].$sep; 
if($res['Hod_EmpDesignation']!=$res['HR_CurrDesigId']){ $sqlDesigH=mysql_query("select DesigName,DesigCode from hrm_designation where DesigId=".$res['Hod_EmpDesignation']." AND CompanyId=".$_REQUEST['c'], $con); $resDesigH=mysql_fetch_assoc($sqlDesigH); $DesigH=$resDesigH['DesigCode']; }else{$DesigH='';}
if($res['Hod_EmpGrade']!=$res['HR_CurrGradeId']){ $sqlGH=mysql_query("select GradeValue from hrm_grade where GradeId=".$res['Hod_EmpGrade']." AND CompanyId=".$_REQUEST['c'], $con); $resGH=mysql_fetch_assoc($sqlGH); $GradeH=$resGH['GradeValue']; }else{$GradeH='';}   
  $schema_insert .= $GradeH.$sep; 
  $schema_insert .= $DesigH.$sep; 
  
  if($_REQUEST['YI']<=7)
  {
  $schema_insert .= $res['Hod_ProIncSalary'].$sep;
  $schema_insert .= $res['Hod_Percent_ProIncSalary'].$sep;
  $schema_insert .= $res['Hod_ProCorrSalary'].$sep;
  $schema_insert .= $res['Hod_Percent_ProCorrSalary'].$sep;
  $schema_insert .= $res['Hod_IncNetMonthalySalary'].$sep;
  $schema_insert .= $res['Hod_Percent_IncNetMonthalySalary'].$sep;
  $schema_insert .= $res['Hod_GrossMonthlySalary'].$sep;
  }
  else
  {
   $schema_insert .= $res['Hod_ProIncCTC'].$sep;
   $schema_insert .= $res['Hod_Percent_ProIncCTC'].$sep;
   $schema_insert .= $res['Hod_ProCorrCTC'].$sep;
   $schema_insert .= $res['Hod_Percent_ProCorrCTC'].$sep;
   $schema_insert .= $res['Hod_IncNetCTC'].$sep;
   $schema_insert .= $res['Hod_Percent_IncNetCTC'].$sep;
   $schema_insert .= $res['Hod_Proposed_ActualCTC'].$sep;
  }
  
  $schema_insert .= $res['HodRemark'].$sep;
   
  $schema_insert .= $res['HR_Score'].$sep;
  $schema_insert .= $res['HR_Rating'].$sep; 
if($res['HR_DesigId']!=$res['HR_CurrDesigId']){ $sqlDesigH=mysql_query("select DesigName,DesigCode from hrm_designation where DesigId=".$res['HR_DesigId']." AND CompanyId=".$_REQUEST['c'], $con); $resDesigH=mysql_fetch_assoc($sqlDesigH); $DesigH=$resDesigH['DesigCode']; }else{$DesigH='';}
if($res['HR_GradeId']!=$res['HR_CurrGradeId']){ $sqlGH=mysql_query("select GradeValue from hrm_grade where GradeId=".$res['HR_GradeId']." AND CompanyId=".$_REQUEST['c'], $con); $resGH=mysql_fetch_assoc($sqlGH); $GradeH=$resGH['GradeValue']; }else{$GradeH='';}	  
  $schema_insert .= $GradeH.$sep; 
  $schema_insert .= $DesigH.$sep; 
  $schema_insert .= $resHRDept['DepartmentCode'].$sep;
  
  $sqlVer=mysql_query("select VerticalName from hrm_department_vertical where VerticalId=".$res['EmpVertical']."", $con); 
  $resVer=mysql_fetch_array($sqlVer);
  $schema_insert .= $resVer['VerticalName'].$sep;
  
  if($_REQUEST['YI']<=7)
  {
  $schema_insert .= $res['HR_ProIncSalary'].$sep; 
  $schema_insert .= $res['HR_Percent_ProIncSalary'].$sep;
  $schema_insert .= $res['HR_ProCorrSalary'].$sep; 
  $schema_insert .= $res['HR_Percent_ProCorrSalary'].$sep; 
  $schema_insert .= $res['HR_IncNetMonthalySalary'].$sep; 
  $schema_insert .= $res['HR_Percent_IncNetMonthalySalary'].$sep;	
  $schema_insert .= $res['HR_GrossMonthlySalary'].$sep;
  }
  else
  {
   $schema_insert .= $res['HR_ProIncCTC'].$sep;
   $schema_insert .= $res['HR_Percent_ProIncCTC'].$sep;
   $schema_insert .= $res['HR_ProCorrCTC'].$sep;
   $schema_insert .= $res['HR_Percent_ProCorrCTC'].$sep;
   $schema_insert .= $res['HR_IncNetCTC'].$sep;
   $schema_insert .= $res['HR_Percent_IncNetCTC'].$sep;
   $schema_insert .= $res['HR_Proposed_ActualCTC'].$sep;
  }

  $schema_insert .= $ResC['BAS_Value'].$sep;
  $schema_insert .= $ResC['HRA_Value'].$sep; 
  $schema_insert .= $ResC['CONV_Value'].$sep; 
  $schema_insert .= $ResC['CAR_ALL_Value'].$sep; 
  $schema_insert .= $ResC['Bonus_Month'].$sep; 
  $schema_insert .= $ResC['SPECIAL_ALL_Value'].$sep; 
  $schema_insert .= $ResC['Tot_GrossMonth'].$sep;
  $schema_insert .= $ResC['GrossSalary_PostAnualComponent_Value'].$sep;
  $schema_insert .= $ResC['ESCI'].$sep;
  $schema_insert .= $ResC['PF_Employee_Contri_Value'].$sep; 
  $schema_insert .= $ResC['NetMonthSalary_Value'].$sep; 
  $schema_insert .= $ResC['LTA_Value'].$sep; 
  $schema_insert .= $ResC['MED_REM_Value'].$sep;
  $schema_insert .= $ResC['CHILD_EDU_ALL_Value'].$sep;
  $schema_insert .= $ResC['Tot_Gross_Annual'].$sep; 
  $schema_insert .= $ResC['AnnualESCI'].$sep;
  $schema_insert .= $ResC['PF_Employer_Contri_Annul'].$sep; 
  if($_REQUEST['YI']<=7)
  {
   $schema_insert .= $ResC['BONUS_Value'].$sep; 
  }
  $schema_insert .= $ResC['GRATUITY_Value'].$sep;
  $schema_insert .= $ResC['Mediclaim_Policy'].$sep;
  $schema_insert .= $ResC['Tot_CTC'].$sep;

  $schema_insert .= $ResEl['Travel_TwoWeeKM'].$sep;
  $schema_insert .= $ResEl['Travel_FourWeeKM'].$sep;
  $schema_insert .= $ResEl['DA_Inside_Hq'].$sep;
  $schema_insert .= $ResEl['DA_Outside_Hq'].$sep;
  $schema_insert .= $ResEl['Lodging_CategoryA'].$sep;
  $schema_insert .= $ResEl['Lodging_CategoryB'].$sep;
  $schema_insert .= $ResEl['Lodging_CategoryC'].$sep;
  $schema_insert .= $ResEl['Mode_Travel_Outside_Hq'].$sep;
  $schema_insert .= $ResEl['TravelClass_Outside_Hq'].$sep;
  $schema_insert .= $ResEl['Mobile_Exp_Rem_Rs'].$sep;
  $schema_insert .= $ResEl['Mobile_Hand_Elig_Rs'].$sep;
  $schema_insert .= $ResEl['Health_Insurance'].$sep;               
          
  $schema_insert = str_replace($sep."$", "", $schema_insert);
  $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
  $schema_insert .= "\t";
  print(trim($schema_insert));
  print "\n";
  $Sno++;
 }

 
}
?>