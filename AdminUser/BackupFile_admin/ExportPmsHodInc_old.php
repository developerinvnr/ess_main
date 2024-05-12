<?php 
require_once('config/config.php');
date_default_timezone_set('Asia/Calcutta');
$sY=mysql_query("select * from hrm_year where YearId=".$_REQUEST['YI']."", $con); $rY=mysql_fetch_assoc($sY); 
$FD=date("Y",strtotime($rY['FromDate'])); $TD=date("Y",strtotime($rY['ToDate'])); $MY=$FD-1;  $PRD=$FD.'-'.$TD;
/*************************************************************************************************************/
if($_REQUEST['YI']==1){$Y=2012;}elseif($_REQUEST['YI']==2){$Y=2013;}elseif($_REQUEST['YI']==3){$Y=2014;}elseif($_REQUEST['YI']==4){$Y=2015;}elseif($_REQUEST['YI']==5){$Y=2016;}elseif($_REQUEST['YI']==6){$Y=2017;}elseif($_REQUEST['YI']==7){$Y=2018;}elseif($_REQUEST['YI']==8){$Y=2019;}elseif($_REQUEST['YI']==9){$Y=2020;}elseif($_REQUEST['YI']==10){$Y=2021;}elseif($_REQUEST['YI']==11){$Y=2022;}


if($_REQUEST['action']='HodIncExport') 
{ 
 if($_REQUEST['ee']=='Dept')
{ $name='Department_Wise'; 
  if($_REQUEST['value']!=0)
  { $sqlA=mysql_query("select DepartmentName from hrm_department where DepartmentId=".$_REQUEST['value'], $con); $resA=mysql_fetch_assoc($sqlA); $name2=$resA['DepartmentName']; }
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
elseif($_REQUEST['ee']=='Hod')
{ $name='HOD_Wise';
  $sqlA=mysql_query("select Fname,Sname,Lname from hrm_employee where EmployeeId=".$_REQUEST['value'], $con); $resA=mysql_fetch_assoc($sqlA); 
  $name2=$resA['Fname'].'_'.$resA['Sname'].'_'.$resA['Lname'];
}

$xls_filename = 'Emp_PMS_Score/Rating_'.$PRD.'-'.$name2.'.xls';
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=$xls_filename");
header("Pragma: no-cache");
header("Expires: 0");
$sep = "\t"; 
echo "Sn\tEmpCode\tName\tDepartment\tDesignation\tGrade\tEmployee Score\tEmployee Rating\tPrevious Gross\tHOD Score\tHOD Rating\tHOD Grade\tHOD Designation\tPGSPM\t%PIS\tPSC\t% PSC\tTISPM\t% TISPM\tTPGSPM\tTOT_CTC";
print("\n");
  	
# Get Users Details form the DB #$result = mysql_query("SELECT * from formResults WHERE formID = '$formID'" );
if($_REQUEST['ee']=='Dept')
{  
  if($_REQUEST['value']==0)
  { $sql=mysql_query("select hrm_employee.*,EmpPmsId,Emp_TotalFinalScore,Emp_TotalFinalRating,EmpCurrGrossPM,Hod_TotalFinalScore,Hod_TotalFinalRating,Hod_EmpDesignation,Hod_EmpGrade,Hod_ProIncSalary,Hod_Percent_ProIncSalary,Hod_ProCorrSalary,Hod_Percent_ProCorrSalary,Hod_IncNetMonthalySalary,Hod_Percent_IncNetMonthalySalary,Hod_GrossMonthlySalary,HR_CurrDesigId,HR_CurrGradeId,HR_Curr_DepartmentId,HR_PmsStatus from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_pms ON hrm_employee.EmployeeID=hrm_employee_pms.EmployeeID where hrm_employee.CompanyId=".$_REQUEST['c']." AND hrm_employee.EmpStatus='A' AND hrm_employee_general.DateJoining<='".$Y."-06-30' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.Appraiser_EmployeeID!=0 order by hrm_employee.EmpCode ASC", $con); }
  else{ $sql=mysql_query("select hrm_employee.*,EmpPmsId,Emp_TotalFinalScore,Emp_TotalFinalRating,EmpCurrGrossPM,Hod_TotalFinalScore,Hod_TotalFinalRating,Hod_EmpDesignation,Hod_EmpGrade,Hod_ProIncSalary,Hod_Percent_ProIncSalary,Hod_ProCorrSalary,Hod_Percent_ProCorrSalary,Hod_IncNetMonthalySalary,Hod_Percent_IncNetMonthalySalary,Hod_GrossMonthlySalary,HR_CurrDesigId,HR_CurrGradeId,HR_Curr_DepartmentId,HR_PmsStatus from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_pms ON hrm_employee.EmployeeID=hrm_employee_pms.EmployeeID where hrm_employee.CompanyId=".$_REQUEST['c']." AND hrm_employee.EmpStatus='A' AND hrm_employee_general.DateJoining<='".$Y."-06-30' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_general.DepartmentId=".$_REQUEST['value']." AND hrm_employee_pms.Appraiser_EmployeeID!=0 order by hrm_employee.EmpCode ASC", $con); }
}
elseif($_REQUEST['ee']=='App')
{ $sql=mysql_query("select hrm_employee.*,EmpPmsId,Emp_TotalFinalScore,Emp_TotalFinalRating,EmpCurrGrossPM,Hod_TotalFinalScore,Hod_TotalFinalRating,Hod_EmpDesignation,Hod_EmpGrade,Hod_ProIncSalary,Hod_Percent_ProIncSalary,Hod_ProCorrSalary,Hod_Percent_ProCorrSalary,Hod_IncNetMonthalySalary,Hod_Percent_IncNetMonthalySalary,Hod_GrossMonthlySalary,HR_CurrDesigId,HR_CurrGradeId,HR_Curr_DepartmentId,HR_PmsStatus from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_pms ON hrm_employee.EmployeeID=hrm_employee_pms.EmployeeID where hrm_employee.CompanyId=".$_REQUEST['c']." AND hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.Appraiser_EmployeeID=".$_REQUEST['value']." AND hrm_employee_pms.Appraiser_EmployeeID!=0 order by hrm_employee.EmpCode ASC", $con);
}
elseif($_REQUEST['ee']=='Rev')
{ $sql=mysql_query("select hrm_employee.*,EmpPmsId,Emp_TotalFinalScore,Emp_TotalFinalRating,EmpCurrGrossPM,Hod_TotalFinalScore,Hod_TotalFinalRating,Hod_EmpDesignation,Hod_EmpGrade,Hod_ProIncSalary,Hod_Percent_ProIncSalary,Hod_ProCorrSalary,Hod_Percent_ProCorrSalary,Hod_IncNetMonthalySalary,Hod_Percent_IncNetMonthalySalary,Hod_GrossMonthlySalary,HR_CurrDesigId,HR_CurrGradeId,HR_Curr_DepartmentId,HR_PmsStatus from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_pms ON hrm_employee.EmployeeID=hrm_employee_pms.EmployeeID where hrm_employee.CompanyId=".$_REQUEST['c']." AND hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.Reviewer_EmployeeID=".$_REQUEST['value']." AND hrm_employee_pms.Appraiser_EmployeeID!=0 order by hrm_employee.EmpCode ASC", $con);
}
elseif($_REQUEST['ee']=='Hod')
{ $sql=mysql_query("select hrm_employee.*,EmpPmsId,Emp_TotalFinalScore,Emp_TotalFinalRating,EmpCurrGrossPM,Hod_TotalFinalScore,Hod_TotalFinalRating,Hod_EmpDesignation,Hod_EmpGrade,Hod_ProIncSalary,Hod_Percent_ProIncSalary,Hod_ProCorrSalary,Hod_Percent_ProCorrSalary,Hod_IncNetMonthalySalary,Hod_Percent_IncNetMonthalySalary,Hod_GrossMonthlySalary,HR_CurrDesigId,HR_CurrGradeId,HR_Curr_DepartmentId,HR_PmsStatus from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_pms ON hrm_employee.EmployeeID=hrm_employee_pms.EmployeeID where hrm_employee.CompanyId=".$_REQUEST['c']." AND hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.HOD_EmployeeID=".$_REQUEST['value']." AND hrm_employee_pms.Appraiser_EmployeeID!=0 order by hrm_employee.EmpCode ASC", $con);
}
 $Sno=1; while($res=mysql_fetch_array($sql)){ 
 $sqlDept=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$res['HR_Curr_DepartmentId'], $con); $resDept=mysql_fetch_assoc($sqlDept); 
 $sqlDesig=mysql_query("select DesigName,DesigCode from hrm_designation where DesigId=".$res['HR_CurrDesigId'], $con); $resDesig=mysql_fetch_assoc($sqlDesig);
 $sqlG=mysql_query("select GradeValue from hrm_grade where GradeId=".$res['HR_CurrGradeId'], $con);  $resG=mysql_fetch_assoc($sqlG);
 
  $schema_insert = "";
  $schema_insert .= $Sno.$sep;
  $schema_insert .= $res['EmpCode'].$sep;
  $schema_insert .= $res['Fname'].' '.$res['Sname'].' '.$res['Lname'].$sep;		
  $schema_insert .= $resDept['DepartmentCode'].$sep;
  $schema_insert .= $resDesig['DesigName'].$sep;
  $schema_insert .= $resG['GradeValue'].$sep;
  $schema_insert .= $res['Emp_TotalFinalScore'].$sep;
  $schema_insert .= $res['Emp_TotalFinalRating'].$sep;
  $schema_insert .= $res['EmpCurrGrossPM'].$sep;
  $schema_insert .= $res['Hod_TotalFinalScore'].$sep;
  $schema_insert .= $res['Hod_TotalFinalRating'].$sep;
if($res['Hod_EmpDesignation']!=$res['HR_CurrDesigId']){ $sqlDesigH=mysql_query("select DesigName,DesigCode from hrm_designation where DesigId=".$res['Hod_EmpDesignation']." AND CompanyId=".$_REQUEST['c'], $con); $resDesigH=mysql_fetch_assoc($sqlDesigH); $DesigH=$resDesigH['DesigName']; }else{$DesigH='';}
if($res['Hod_EmpGrade']!=$res['HR_CurrGradeId']){ $sqlGH=mysql_query("select GradeValue from hrm_grade where GradeId=".$res['Hod_EmpGrade']." AND CompanyId=".$_REQUEST['c'], $con); $resGH=mysql_fetch_assoc($sqlGH); $GradeH=$resGH['GradeValue']; }else{$GradeH='';}  
  $schema_insert .= $GradeH.$sep;
  $schema_insert .= $DesigH.$sep;
  $schema_insert .= $res['Hod_ProIncSalary'].$sep;
  $schema_insert .= $res['Hod_Percent_ProIncSalary'].$sep;
  $schema_insert .= $res['Hod_ProCorrSalary'].$sep;
  $schema_insert .= $res['Hod_Percent_ProCorrSalary'].$sep;
  $schema_insert .= $res['Hod_IncNetMonthalySalary'].$sep;
  $schema_insert .= $res['Hod_Percent_IncNetMonthalySalary'].$sep;
  $schema_insert .= $res['Hod_GrossMonthlySalary'].$sep;
  
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
  

  $schema_insert = str_replace($sep."$", "", $schema_insert);
  $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
  $schema_insert .= "\t";
  print(trim($schema_insert));
  print "\n";
  $Sno++;
 }


}
?>