<?php 
require_once('config/config.php');
date_default_timezone_set('Asia/Calcutta');
$sY=mysql_query("select * from hrm_year where YearId=".$_REQUEST['YI']."", $con); $rY=mysql_fetch_assoc($sY); 
$FD=date("Y",strtotime($rY['FromDate'])); $TD=date("Y",strtotime($rY['ToDate'])); $MY=$FD-1;  $PRD=$FD.'-'.$TD;
/*************************************************************************************************************/
if($_REQUEST['YI']==1){$Y=2012;}elseif($_REQUEST['YI']==2){$Y=2013;}elseif($_REQUEST['YI']==3){$Y=2014;}elseif($_REQUEST['YI']==4){$Y=2015;}elseif($_REQUEST['YI']==5){$Y=2016;}elseif($_REQUEST['YI']==6){$Y=2017;}elseif($_REQUEST['YI']==7){$Y=2018;}elseif($_REQUEST['YI']==8){$Y=2019;}elseif($_REQUEST['YI']==9){$Y=2020;}elseif($_REQUEST['YI']==10){$Y=2021;}elseif($_REQUEST['YI']==11){$Y=2022;}elseif($_REQUEST['YI']==12){$Y=2023;}elseif($_REQUEST['YI']==13){$Y=2024;}elseif($_REQUEST['YI']==14){$Y=2025;}


if($_REQUEST['action']='HodIncExport') 
{ 
 if($_REQUEST['ee']=='Dept')
{ $name='Department_Wise'; 
  if($_REQUEST['value']!=0)
  { $sqlA=mysql_query("select department_code as DepartmentName from core_departments where id=".$_REQUEST['value'], $con); $resA=mysql_fetch_assoc($sqlA); $name2=$resA['DepartmentName']; }
  else{$name2='All Department';}
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
elseif($_REQUEST['ee']=='Rev2')
{ $name='HOD_Wise';
  $sqlA=mysql_query("select Fname,Sname,Lname from hrm_employee where EmployeeId=".$_REQUEST['value'], $con); $resA=mysql_fetch_assoc($sqlA); 
  $name2=$resA['Fname'].'_'.$resA['Sname'].'_'.$resA['Lname'];
}
elseif($_REQUEST['ee']=='Hod')
{ $name='Management_Wise';
  $sqlA=mysql_query("select Fname,Sname,Lname from hrm_employee where EmployeeId=".$_REQUEST['value'], $con); $resA=mysql_fetch_assoc($sqlA); 
  $name2=$resA['Fname'].'_'.$resA['Sname'].'_'.$resA['Lname'];
}

$xls_filename = 'Emp_PMS_Score/Rating_'.$PRD.'-'.$name2.'.xls';
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=$xls_filename");
header("Pragma: no-cache");
header("Expires: 0");
$sep = "\t"; 
echo "Sn\tEmpCode\tName\tDepartment\tDesignation\tGrade\tEmployee Score\tEmployee Rating";

echo "\tApp Name\tApp Score\tApp Rating\tRev Name\tRev Score\tRev Rating\tHOD Name\tHOD Score\tHOD Rating";

if($_REQUEST['YI']<=7){ echo "\tPrevious Gross"; }else{ echo "\tPrevious CTC"; }
echo  "\tManagment Score\tManagment Rating\tManagment Grade\tManagment Designation";

if($_REQUEST['YI']<=7){ echo "\tPGSPM\t%PIS\tPSC\t% PSC\tTISPM\t% TISPM\tTPGSPM"; }
else{ echo "\tProposed CTC\t%% PRO. CTC\tCTC Corr.\t% % Corr.\tTotal Increment\t% Total\tTotal Proposed CTC"; }
print("\n");
  	
# Get Users Details form the DB #$result = mysql_query("SELECT * from formResults WHERE formID = '$formID'" ); 

$qry="e.EmployeeID, EmpCode, Fname, Sname, Lname, DateJoining, EmpPmsId, Appraiser_EmployeeID, Reviewer_EmployeeID, Reviewer_TotalFinalScore, Reviewer_TotalFinalRating, Rev2_EmployeeID, Hod_TotalFinalScore, Hod_TotalFinalRating, HOD_EmployeeID, Appraiser_TotalFinalScore, Appraiser_TotalFinalRating, HodSubmit_IncStatus, Hod_EmpDesignation, Hod_EmpGrade, Hod_ProIncSalary, Hod_Percent_ProIncSalary, Hod_ProCorrSalary, Hod_Percent_ProCorrSalary, Hod_IncNetMonthalySalary, Hod_Percent_IncNetMonthalySalary, Hod_GrossMonthlySalary, Hod_GrossAnnualSalary, Hod_Incentive, HodPer_PIS_From_PreMyTGrossPM, HodPer_SC_From_PreMyTGrossPM, HodPer_TISPM_From_PreMyTGrossPM, HR_CurrDesigId, HR_CurrGradeId, HR_Curr_DepartmentId, EmpCurrCtc, Hod_ProIncCTC, Hod_Percent_ProIncCTC, Hod_ProCorrCTC, Emp_TotalFinalScore, Emp_TotalFinalRating, Hod_Percent_ProCorrCTC, Hod_Proposed_ActualCTC, Hod_IncNetCTC, Hod_Percent_IncNetCTC, Hod_CTC, HR_PmsStatus from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_pms p ON e.EmployeeID=p.EmployeeID";

if($_REQUEST['ee']=='Dept')
{  
  if($_REQUEST['value']==0)
  { $sql=mysql_query("select ".$qry." where e.CompanyId=".$_REQUEST['c']." AND e.EmpStatus='A' AND g.DateJoining<='".$Y."-06-30' AND p.AssessmentYear=".$_REQUEST['YI']." AND p.Appraiser_EmployeeID!=0 order by e.ECode ASC", $con); 
  }
  else{ $sql=mysql_query("select ".$qry." where e.CompanyId=".$_REQUEST['c']." AND e.EmpStatus='A' AND g.DateJoining<='".$Y."-06-30' AND p.AssessmentYear=".$_REQUEST['YI']." AND g.DepartmentId=".$_REQUEST['value']." AND p.Appraiser_EmployeeID!=0 order by e.ECode ASC", $con); 
  
  } 
}
elseif($_REQUEST['ee']=='App')
{ $sql=mysql_query("select ".$qry." where e.CompanyId=".$_REQUEST['c']." AND e.EmpStatus='A' AND p.AssessmentYear=".$_REQUEST['YI']." AND p.Appraiser_EmployeeID=".$_REQUEST['value']." AND p.Appraiser_EmployeeID!=0 order by e.ECode ASC", $con);
}
elseif($_REQUEST['ee']=='Rev')
{ $sql=mysql_query("select ".$qry." where e.CompanyId=".$_REQUEST['c']." AND e.EmpStatus='A' AND p.AssessmentYear=".$_REQUEST['YI']." AND p.Reviewer_EmployeeID=".$_REQUEST['value']." AND p.Appraiser_EmployeeID!=0 order by e.ECode ASC", $con);
}
elseif($_REQUEST['ee']=='Rev2')
{ $sql=mysql_query("select ".$qry." where e.CompanyId=".$_REQUEST['c']." AND e.EmpStatus='A' AND p.AssessmentYear=".$_REQUEST['YI']." AND p.Rev2_EmployeeID=".$_REQUEST['value']." AND p.Appraiser_EmployeeID!=0 order by e.ECode ASC", $con);
}
elseif($_REQUEST['ee']=='Hod')
{ $sql=mysql_query("select ".$qry." where e.CompanyId=".$_REQUEST['c']." AND e.EmpStatus='A' AND p.AssessmentYear=".$_REQUEST['YI']." AND p.HOD_EmployeeID=".$_REQUEST['value']." AND p.Appraiser_EmployeeID!=0 order by e.ECode ASC", $con);
}
 $Sno=1; while($res=mysql_fetch_array($sql)){ 
 $sqlDept=mysql_query("select department_code as DepartmentCode from core_departments where id=".$res['HR_Curr_DepartmentId'], $con); $resDept=mysql_fetch_assoc($sqlDept);
$sqlDesig=mysql_query("select designation_name as DesigName from core_designation where id=".$res['HR_CurrDesigId'], $con); $resDesig=mysql_fetch_assoc($sqlDesig);
$sqlGrade=mysql_query("select grade_name as GradeValue from core_grades where id=".$res['HR_CurrGradeId'], $con); $resGrade=mysql_fetch_assoc($sqlGrade);
 
 $sa=mysql_query("select EmpCode,Fname,Sname,Lname from hrm_employee where EmployeeID=".$res['Appraiser_EmployeeID'],$con);
 $sr=mysql_query("select EmpCode,Fname,Sname,Lname from hrm_employee where EmployeeID=".$res['Reviewer_EmployeeID'],$con);
 $sr2=mysql_query("select EmpCode,Fname,Sname,Lname from hrm_employee where EmployeeID=".$res['Rev2_EmployeeID'],$con);
 $sh=mysql_query("select EmpCode,Fname,Sname,Lname from hrm_employee where EmployeeID=".$res['HOD_EmployeeID'],$con);
 $ra=mysql_fetch_assoc($sa); $rr=mysql_fetch_assoc($sr); $rr2=mysql_fetch_assoc($sr2); $rh=mysql_fetch_assoc($sh);
 
 
    

 
  $schema_insert = "";
  $schema_insert .= $Sno.$sep;
  $schema_insert .= $res['EmpCode'].$sep;
  $schema_insert .= $res['Fname'].' '.$res['Sname'].' '.$res['Lname'].$sep;		
  $schema_insert .= $resDept['DepartmentCode'].$sep;
  $schema_insert .= $resDesig['DesigName'].$sep;
  $schema_insert .= $resGrade['GradeValue'].$sep;
  $schema_insert .= $res['Emp_TotalFinalScore'].$sep;
  $schema_insert .= $res['Emp_TotalFinalRating'].$sep;
  
  $schema_insert .= $ra['Fname'].' '.$ra['Sname'].' '.$ra['Lname'].$sep; 
  $schema_insert .= $res['Appraiser_TotalFinalScore'].$sep;
  $schema_insert .= $res['Appraiser_TotalFinalRating'].$sep;
  
  $schema_insert .= $rr['Fname'].' '.$rr['Sname'].' '.$rr['Lname'].$sep;
  $schema_insert .= $res['Reviewer_TotalFinalScore'].$sep;
  $schema_insert .= $res['Reviewer_TotalFinalRating'].$sep;
  
  $schema_insert .= $rr2['Fname'].' '.$rr2['Sname'].' '.$rr2['Lname'].$sep;
  $schema_insert .= $res['Reviewer_TotalFinalScore'].$sep;
  $schema_insert .= $res['Reviewer_TotalFinalRating'].$sep;
  
  if($res['HodSubmit_IncStatus']==2)
  {
  
   if($_REQUEST['YI']<=7){ $schema_insert .= $res['EmpCurrGrossPM'].$sep; }
   else { $schema_insert .= $res['EmpCurrCtc'].$sep; }
  
   $schema_insert .= $res['Hod_TotalFinalScore'].$sep;
   $schema_insert .= $res['Hod_TotalFinalRating'].$sep;
 if($res['Hod_EmpDesignation']!=$res['HR_CurrDesigId']){ $sqlDesigH=mysql_query("select designation_name as DesigName from core_designation where id=".$res['Hod_EmpDesignation']." AND CompanyId=".$_REQUEST['c'], $con); $resDesigH=mysql_fetch_assoc($sqlDesigH); $DesigH=$resDesigH['DesigName']; }else{$DesigH='';}
 if($res['Hod_EmpGrade']!=$res['HR_CurrGradeId']){ $sqlGH=mysql_query("select grade_name as GradeValue from core_grades where id=".$res['Hod_EmpGrade']." AND CompanyId=".$_REQUEST['c'], $con); $resGH=mysql_fetch_assoc($sqlGH); $GradeH=$resGH['GradeValue']; }else{$GradeH='';}  
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
  
  }//if($res['HodSubmit_IncStatus']==2)
  
  /*
  $sY=mysql_query("select * from hrm_year where YearId=".$_REQUEST['YI']."", $con); $rY=mysql_fetch_assoc($sY); 
$FD=date("Y",strtotime($rY['FromDate'])); $TD=date("Y",strtotime($rY['ToDate'])); $PRD=$FD.'-'.$TD;

if($_REQUEST['YI']<=5){ $sqlC = mysql_query("SELECT Tot_CTC from hrm_employee_ctc WHERE EmployeeID=".$res['EmployeeID']." AND CtcYearId=".$_REQUEST['YI']." AND CtcCreatedDate>='".date($FD."-10-01")."' AND CtcCreatedDate<='".date($FD."-12-31")."'", $con); }else{ $sqlC = mysql_query("SELECT Tot_CTC from hrm_employee_ctc WHERE EmployeeID=".$res['EmployeeID']." AND CtcYearId=".$_REQUEST['YI']." AND CtcCreatedDate>='".date($TD."-01-01")."'", $con); }
$RowC=mysql_num_rows($sqlC); $ResC=mysql_fetch_assoc($sqlC);
  
  $gross_annual=$res['Hod_GrossMonthlySalary']*12;
  
  $basicc=($res['Hod_GrossMonthlySalary']*40)/100;
  if($basicc<10500){$basic=10500;}else{$basic=$basicc;}
  
  
  $pf=($basic*12)/100; $pf_annual=$pf*12; 
  
  if($basic<21000){ $bonus=16800; }else{ $bonus=0;  }
  if($res['Hod_GrossMonthlySalary']<21000){ $esic=(($res['Hod_GrossMonthlySalary']*4.75)/100)*12; $mediclaim=0; }
  else{ $esic=0; $mediclaim=10000; }
  
  $OnedayBasic=$basic/26; $gratuity=$OnedayBasic*15;
  
  
  $PrposedCtc=$gross_annual+$pf_annual+$bonus+$esic+$gratuity+$mediclaim;
  
  if($res['HR_PmsStatus']==2){ $schema_insert .= intval($ResC['Tot_CTC']).$sep; }
  else if($res['Hod_GrossMonthlySalary']>0){ $schema_insert .= intval($PrposedCtc).$sep; }
  else{ $schema_insert .= ''.$sep; }
  */

  $schema_insert = str_replace($sep."$", "", $schema_insert);
  $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
  $schema_insert .= "\t";
  print(trim($schema_insert));
  print "\n";
  $Sno++;
 }


}
?>