<?php 
require_once('config/config.php');
date_default_timezone_set('Asia/Calcutta');
$sY=mysql_query("select * from hrm_year where YearId=".$_REQUEST['YI']."", $con); $rY=mysql_fetch_assoc($sY); 
$FD=date("Y",strtotime($rY['FromDate'])); $TD=date("Y",strtotime($rY['ToDate'])); $MY=$FD-1;  $PRD=$FD.'-'.$TD;
/*************************************************************************************************************/
if($_REQUEST['YI']==1){$Y=2012; $yy=12;}elseif($_REQUEST['YI']==2){$Y=2013; $yy=13;}elseif($_REQUEST['YI']==3){$Y=2014; $yy=14;}elseif($_REQUEST['YI']==4){$Y=2015; $yy=15;}elseif($_REQUEST['YI']==5){$Y=2016; $yy=16;}elseif($_REQUEST['YI']==6){$Y=2017; $yy=17;}elseif($_REQUEST['YI']==7){$Y=2018; $yy=18;}elseif($_REQUEST['YI']==8){$Y=2019; $yy=19;}elseif($_REQUEST['YI']==9){$Y=2020; $yy=20;}elseif($_REQUEST['YI']==10){$Y=2021; $yy=21;}elseif($_REQUEST['YI']==11){$Y=2022; $yy=22;}elseif($_REQUEST['YI']==12){$Y=2023; $yy=23;}elseif($_REQUEST['YI']==13){$Y=2024; $yy=24;}elseif($_REQUEST['YI']==14){$Y=2025; $yy=25;}
if($_REQUEST['YI']==1){$Y=2012; $Y2=2013;}elseif($_REQUEST['YI']==2){$Y=2013; $Y2=2014;}elseif($_REQUEST['YI']==3){$Y=2014; $Y2=2015;}elseif($_REQUEST['YI']==4){$Y=2015; $Y2=2016;}elseif($_REQUEST['YI']==5){$Y=2016; $Y2=2017;}elseif($_REQUEST['YI']==6){$Y=2017; $Y2=2018;}elseif($_REQUEST['YI']==7){$Y=2018; $Y2=2019;}elseif($_REQUEST['YI']==8){$Y=2019; $Y2=2020;}elseif($_REQUEST['YI']==9){$Y=2020; $Y2=2021;}elseif($_REQUEST['YI']==10){$Y=2021; $Y2=2022;}elseif($_REQUEST['YI']==11){$Y=2022; $Y2=2023;}elseif($_REQUEST['YI']==12){$Y=2023; $Y2=2024;}elseif($_REQUEST['YI']==13){$Y=2024; $Y2=2025;}


if($_REQUEST['action']='IncHisExport') 
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
elseif($_REQUEST['ee']=='Rev2')
{ $name='HOD Wise';
  $sqlA=mysql_query("select Fname,Sname,Lname from hrm_employee where EmployeeId=".$_REQUEST['value'], $con); $resA=mysql_fetch_assoc($sqlA); 
  $name2=$resA['Fname'].' '.$resA['Sname'].' '.$resA['Lname'];
}
elseif($_REQUEST['ee']=='Hod')
{ $name='HOD_Wise';
  $sqlA=mysql_query("select Fname,Sname,Lname from hrm_employee where EmployeeId=".$_REQUEST['value'], $con); $resA=mysql_fetch_assoc($sqlA); 
  $name2=$resA['Fname'].'_'.$resA['Sname'].'_'.$resA['Lname'];
}


$xls_filename = 'Increment_History'.$PRD.'-'.$name2.'.xls';
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=$xls_filename");
header("Pragma: no-cache");
header("Expires: 0");
$sep = "\t"; 
echo "Sn\tEmpCode\tName\tCurr Grade\tPro Grade\tDepartment\tCurr Designation\tPro Designation\tChange Date\tBasic\tStipend\tHRA\tCA\tVA\tBonusMonth\tSA\tPI\tIBM\tPre GrossPM\tCurr GrossPM\tPIS\t% PIS\tPSC\tTGSPM\t% TGSPM\tIncentive\tBonus\tOld CTC\tPI_CTC\tPI_CTC(%)\tCorr_CTC\tCorr_CTC(%)\tNew CTC\tCTC(%)\tScore\tRating";
print("\n");
  
if($_REQUEST['Sts']=='A'){ $sts="e.EmpStatus='A'"; }
elseif($_REQUEST['Sts']=='D'){ $sts="e.EmpStatus='D'"; }
elseif($_REQUEST['Sts']=='All'){ $sts="1=1"; }

if($_REQUEST['wd']==1){ $wdi=""; $wdc="1=1"; }
else
{ 
  $wdi="INNER JOIN hrm_employee_pms p ON e.EmployeeID=p.EmployeeID"; 
  $wdc="p.AssessmentYear=".$_REQUEST['YI'];    
}

if($_REQUEST['ee']=='Dept')
{  
  if($_REQUEST['value']==0)
  { $sql=mysql_query("select h.*,Fname,Sname,Lname from hrm_pms_appraisal_history h INNER JOIN hrm_employee e ON h.EmpCode=e.EmpCode where h.CompanyId=".$_REQUEST['c']." AND ".$sts." AND e.CompanyId=".$_REQUEST['c']." order by e.ECode ASC, h.EmpCode ASC, h.SalaryChange_Date ASC", $con); }
    else{ $sql=mysql_query("select h.*,Fname,Sname,Lname from hrm_pms_appraisal_history h INNER JOIN hrm_employee e ON h.EmpCode=e.EmpCode ".$wdi." INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID where h.CompanyId=".$_REQUEST['c']." AND ".$sts." AND g.DepartmentId=".$_REQUEST['value']." AND ".$wdc." order by e.ECode ASC, h.EmpCode ASC, h.SalaryChange_Date ASC", $con); }
}
elseif($_REQUEST['ee']=='App')
{ $sql=mysql_query("select h.*,Fname,Sname,Lname from hrm_pms_appraisal_history h INNER JOIN hrm_employee e ON h.EmpCode=e.EmpCode ".$wdi." where h.CompanyId=".$_REQUEST['c']." AND ".$sts." AND p.Appraiser_EmployeeID=".$_REQUEST['value']." AND ".$wdc." order by e.ECode ASC, h.EmpCode ASC, h.SalaryChange_Date ASC", $con); }
elseif($_REQUEST['ee']=='Rev')
{ $sql=mysql_query("select h.*,Fname,Sname,Lname from hrm_pms_appraisal_history h INNER JOIN hrm_employee e ON h.EmpCode=e.EmpCode ".$wdi." where h.CompanyId=".$_REQUEST['c']." AND ".$sts." AND p.Reviewer_EmployeeID=".$_REQUEST['value']." AND ".$wdc." order by e.ECode ASC, h.EmpCode ASC, h.SalaryChange_Date ASC", $con); 
}
elseif($_REQUEST['ee']=='Rev2')
{ $sql=mysql_query("select h.*,Fname,Sname,Lname from hrm_pms_appraisal_history h INNER JOIN hrm_employee e ON h.EmpCode=e.EmpCode ".$wdi." where h.CompanyId=".$_REQUEST['c']." AND ".$sts." AND p.Rev2_EmployeeID=".$_REQUEST['value']." AND ".$wdc." order by e.ECode ASC, h.EmpCode ASC, h.SalaryChange_Date ASC", $con); 
}
elseif($_REQUEST['ee']=='Hod')
{ $sql=mysql_query("select h.*,Fname,Sname,Lname from hrm_pms_appraisal_history h INNER JOIN hrm_employee e ON h.EmpCode=e.EmpCode ".$wdi." where h.CompanyId=".$_REQUEST['c']." AND ".$sts." AND p.HOD_EmployeeID=".$_REQUEST['value']." AND ".$wdc." order by e.ECode ASC, h.EmpCode ASC, h.SalaryChange_Date ASC", $con); 
}  

 
 $no=1;
 $Sno=1; while($res=mysql_fetch_array($sql))
 { 
 
 $sqlCheck=mysql_query("select EmpStatus,EmployeeID from hrm_employee where EmpCode=".$res['EmpCode']." AND CompanyId=".$_REQUEST['c'], $con); $resCheck=mysql_fetch_assoc($sqlCheck);
 
 //if($resCheck['EmpStatus']=='A')
 //{
  $sqlMax=mysql_query("select MAX(AppHistoryId) as MaxId from hrm_pms_appraisal_history where EmpCode=".$res['EmpCode']." AND CompanyId=".$_REQUEST['c'], $con); $resMax=mysql_fetch_assoc($sqlMax);
  
  $sctc=mysql_query("select Tot_CTC,Bonus_Month from hrm_employee_ctc where EmployeeID=".$resCheck['EmployeeID']." AND (CtcCreatedDate='".$res['SalaryChange_Date']."' OR SalChangeDate='".$res['SalaryChange_Date']."')",$con); $rctc=mysql_fetch_assoc($sctc);
  
  
      $cpid=0; 
	  if($res['SalaryChange_Date']>='2020-01-01' && $res['EmpPmsId']>0)
	  {
	   $cpid=1; 
	   $qryct=mysql_query("select EmpCurrCtc from hrm_employee_pms where EmpPmsId=".$res['EmpPmsId'],$con);
	   $rqryct=mysql_fetch_assoc($qryct);
	  }
  
  
  if((($res['CompanyId']==1 OR $res['CompanyId']==2 OR $res['CompanyId']==4) AND $res['SalaryChange_Date']<$Y.'-10-01') OR ($res['CompanyId']==3 AND $res['SalaryChange_Date']<date("Y").'-04-01')) 
  {
   
	//if(($res['SalaryChange_Date']>'2012-01-01' AND $rctc['Tot_CTC']!='' AND $rctc['Tot_CTC']>0) OR $res['SalaryChange_Date']<='2012-01-01'){
   
   $sqlE=mysql_query("select Fname, Sname, Lname from hrm_employee where EmpCode=".$res['EmpCode']." AND CompanyId=".$_REQUEST['c'], $con); 
   $resE=mysql_fetch_assoc($sqlE);
  $schema_insert = "";
  $schema_insert .= $no.$sep;
  $schema_insert .= $res['EmpCode'].$sep;
  $schema_insert .= strtoupper($resE['Fname'].' '.$resE['Sname'].' '.$resE['Lname']).$sep;
  $schema_insert .= $res['Current_Grade'].$sep;
  $schema_insert .= $res['Proposed_Grade'].$sep; 
  $schema_insert .= strtoupper($res['Department']).$sep;
  $schema_insert .= strtoupper($res['Current_Designation']).$sep;
  $schema_insert .= strtoupper($res['Proposed_Designation']).$sep; 
  $schema_insert .= date("d-M-y",strtotime($res['SalaryChange_Date'])).$sep;
  $schema_insert .= floatval($res['Salary_Basic']).$sep;
  $schema_insert .= floatval($res['Salary_Stipend']).$sep;
  $schema_insert .= floatval($res['Salary_HRA']).$sep;
  $schema_insert .= floatval($res['Salary_CA']).$sep;
  $schema_insert .= floatval($res['Salary_VA']).$sep;
  $schema_insert .= floatval($rctc['Bonus_Month']).$sep;
  $schema_insert .= floatval($res['Salary_SA']).$sep;
  $schema_insert .= floatval($res['Salary_PI']).$sep;
  $schema_insert .= floatval($res['Industry_Bench_Markinge']).$sep;
  $schema_insert .= floatval($res['Previous_GrossSalaryPM']).$sep;
  $schema_insert .= floatval($res['Current_GrossSalaryPM']).$sep;
  $schema_insert .= floatval($res['Proposed_GrossSalaryPM']).$sep;
  
  if($cpid==0 && $res['SalaryChange_Date']<'2020-01-01'){ $schema_insert .= floatval($res['Prop_PeInc_GSPM']).$sep; }
  else{ $schema_insert .= ''.$sep; }
  
  $schema_insert .= floatval($res['PropSalary_Correction']).$sep;
  $schema_insert .= floatval($res['TotalProp_GSPM']).$sep; 	
  
  if($cpid==0 && $res['SalaryChange_Date']<'2020-01-01'){ $schema_insert .= floatval($res['TotalProp_PerInc_GSPM']).$sep; }
  else{ $schema_insert .= ''.$sep; }
  
  if($cpid==0 && $res['SalaryChange_Date']<'2020-01-01'){ $schema_insert .= floatval($res['Incentive']).$sep; }
  else{ $schema_insert .= ''.$sep; }
  
  if($cpid==0 && $res['SalaryChange_Date']<'2020-01-01'){ $schema_insert .= floatval($res['BonusAnnual_September']).$sep; }
  else{ $schema_insert .= ''.$sep; }
  
  if($cpid==1){ $schema_insert .= floatval($rqryct['EmpCurrCtc']).$sep; }
  elseif($res['SalaryChange_Date']>='2020-01-01' OR $res['SalaryChange_Date']<'2020-01-01'){ $schema_insert .= floatval($rctc['Tot_CTC']).$sep; }
  else{ $schema_insert .= ''.$sep; }
  
  
  if($cpid==1){ $schema_insert .= $res['ProIncCTC'].$sep; }
  else{ $schema_insert .= ''.$sep; }
  if($cpid==1){ $schema_insert .= $res['Percent_ProIncCTC'].$sep; }
  else{ $schema_insert .= ''.$sep; }
  if($cpid==1){ $schema_insert .= $res['ProCorrCTC'].$sep; }
  else{ $schema_insert .= ''.$sep; }
  if($cpid==1){ $schema_insert .= $res['Percent_ProCorrCTC'].$sep; }
  else{ $schema_insert .= ''.$sep; }
  
  if($cpid==1){ $schema_insert .= floatval($res['Proposed_ActualCTC']).$sep; }
  elseif($res['SalaryChange_Date']>='2020-01-01'){ $schema_insert .= floatval($rctc['Tot_CTC']).$sep; }
  else{ $schema_insert .= ''.$sep; }
  
  if($cpid==1){ $schema_insert .= $res['Percent_IncNetCTC'].$sep; }
  else{ $schema_insert .= ''.$sep; }
  
  
  
  $schema_insert .= $res['Score'].$sep;
  $schema_insert .= $res['Rating'].$sep;	
			  
  $schema_insert = str_replace($sep."$", "", $schema_insert);
  $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
  $schema_insert .= "\t";
  print(trim($schema_insert));
  //print "\n";
  
 // } //if(($res['SalaryChange_Date']>'2012-01-01' AND $rctc['Tot_CTC']!='' AND $rctc['Tot_CTC']>0) OR $res['SalaryChange_Date']<='2012-01-01')
  				
  } 

if($res['AppHistoryId']==$resMax['MaxId']){ print "\n";

//if($res['SalaryChange_Date']>=$Y.'-10-01') {

$sqlPms=mysql_query("select p.EmployeeID, Hod_EmpGrade, Hod_EmpDesignation, EmpCurrGrossPM, Hod_TotalFinalScore, Hod_TotalFinalRating, Hod_ProIncSalary, Hod_Percent_ProIncSalary, Hod_ProCorrSalary, Hod_GrossMonthlySalary, Hod_Percent_IncNetMonthalySalary, HR_CurrDesigId, HR_CurrGradeId, HR_Curr_DepartmentId, EmpCurrCtc, HR_ProIncCTC, HR_Percent_ProIncCTC, HR_ProCorrCTC, HR_Percent_ProCorrCTC, HR_Proposed_ActualCTC, HR_Percent_IncNetCTC from hrm_employee_pms p inner join hrm_employee e on p.EmployeeID=e.EmployeeID where e.CompanyId=".$_REQUEST['c']." AND p.EmployeeID=".$resCheck['EmployeeID']." AND p.AssessmentYear=".$_REQUEST['YI'], $con); $resPms=mysql_fetch_assoc($sqlPms);
$sqlGD=mysql_query("select GradeId,DesigId from hrm_employee_general where EmployeeID=".$resCheck['EmployeeID'], $con); $resGD=mysql_fetch_assoc($sqlGD);
$sqlE2=mysql_query("select Fname, Sname, Lname from hrm_employee where EmpCode=".$res['EmpCode']." AND CompanyId=".$_REQUEST['c'], $con); 
$resE2=mysql_fetch_assoc($sqlE2);
if($resPms['HR_CurrGradeId']>0){$sqlGr=mysql_query("select GradeValue from hrm_grade where GradeId=".$resPms['HR_CurrGradeId'], $con); $resGr=mysql_fetch_assoc($sqlGr);}
if($resGD['GradeId']!=$resPms['Hod_EmpGrade'] AND $resPms['Hod_EmpGrade']>0){ $HodGrade=$res['Hod_EmpGrade']; } else {$HodGrade=$resGD['GradeId']; } 
if($HodGrade>0){ $sqlGr2=mysql_query("select GradeValue from hrm_grade where GradeId=".$HodGrade, $con); $resGr2=mysql_fetch_assoc($sqlGr2); }
if($resPms['HR_Curr_DepartmentId']>0){ $sqlDept=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$resPms['HR_Curr_DepartmentId'], $con); $resDept=mysql_fetch_assoc($sqlDept); }
if($resPms['HR_CurrDesigId']>0){$sqlD1=mysql_query("select DesigName from hrm_designation where DesigId=".$resPms['HR_CurrDesigId'], $con); $resD1=mysql_fetch_assoc($sqlD1);}
if($resPms['Hod_EmpDesignation']>0){$sqlD2=mysql_query("select DesigName from hrm_designation where DesigId=".$resPms['Hod_EmpDesignation'], $con); $resD2=mysql_fetch_assoc($sqlD2);}

  $schema_insert = "";
  $schema_insert .= '.'.$sep;
  $schema_insert .= $res['EmpCode'].$sep;
  $schema_insert .= strtoupper($resE2['Fname'].' '.$resE2['Sname'].' '.$resE2['Lname']).$sep;
  $schema_insert .= $resGr['GradeValue'].$sep;
  if($resGr['GradeValue']!=$resGr2['GradeValue']){$GG=$resGr2['GradeValue']; }else{$GG='';}
  $schema_insert .= $GG.$sep;
  $schema_insert .= strtoupper($resDept['DepartmentCode']).$sep;
  $schema_insert .= strtoupper($resD1['DesigName']).$sep;
  
  if($resPms['Hod_EmpDesignation']>0 AND $resPms['HR_CurrDesigId']!=$resPms['Hod_EmpDesignation']){$sqlD2=mysql_query("select DesigName from hrm_designation where DesigId=".$resPms['Hod_EmpDesignation'], $con); $resD2=mysql_fetch_assoc($sqlD2);
$schema_insert .= strtoupper($resD2['DesigName']).$sep;}else{$schema_insert .= ''.$sep;}
	
//if($resPms['DesigId']!=$resPms['Hod_EmpDesignation']){ $DEDE=strtoupper($resD2['DesigName']); }else{$DEDE='';}		
//$schema_insert .= $DEDE.$sep;

  if($_REQUEST['c']==1 OR $_REQUEST['c']==2){$ydate='01-Jan-'.date("y");}elseif($_REQUEST['c']==3){$ydate='01-Apr-'.date("y");} 
  
  $schema_insert .= $ydate.$sep;
  $schema_insert .= ''.$sep; $schema_insert .= ''.$sep; $schema_insert .= ''.$sep; $schema_insert .= ''.$sep;
  $schema_insert .= ''.$sep; $schema_insert .= ''.$sep; $schema_insert .= ''.$sep; $schema_insert .= ''.$sep;
  $schema_insert .= ''.$sep;
  $schema_insert .= ''.$sep;
  $schema_insert .= ''.$sep;
  $schema_insert .= ''.$sep;
  $schema_insert .= ''.$sep;
  $schema_insert .= ''.$sep;
  $schema_insert .= ''.$sep;
  $schema_insert .= ''.$sep;
  $schema_insert .= ''.$sep;
  $schema_insert .= ''.$sep;
  $schema_insert .= floatval($resPms['EmpCurrCtc']).$sep;
  
  $schema_insert .= floatval($resPms['HR_ProIncCTC']).$sep;
  $schema_insert .= $resPms['HR_Percent_ProIncCTC'].$sep;
  $schema_insert .= floatval($resPms['HR_ProCorrCTC']).$sep;
  $schema_insert .= $resPms['HR_Percent_ProCorrCTC'].$sep;
  
  $schema_insert .= floatval($resPms['HR_Proposed_ActualCTC']).$sep;
  $schema_insert .= $resPms['HR_Percent_IncNetCTC'].$sep;
  $schema_insert .= $resPms['Hod_TotalFinalScore'].$sep;
  $schema_insert .= $resPms['Hod_TotalFinalRating'].$sep;	
			  
  $schema_insert = str_replace($sep."$", "", $schema_insert);
  $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
  $schema_insert .= "\t";
  print(trim($schema_insert));
  print "\n";
 }
 print "\n";
$csv_output .= "\n";
if($resMax['MaxId']==$res['AppHistoryId']){ print "\n"; }

     
 //} if($resCheck['EmpStatus']=='A')

if($resMax['MaxId']==$res['AppHistoryId']){ $no++; } $Sno++; }


}
?>