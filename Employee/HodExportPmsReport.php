<?php 
require_once('../AdminUser/config/config.php');
date_default_timezone_set('Asia/Calcutta');
$sY=mysql_query("select * from hrm_year where YearId=".$_REQUEST['y']."", $con); $rY=mysql_fetch_assoc($sY); 
$FD=date("Y",strtotime($rY['FromDate'])); $TD=date("Y",strtotime($rY['ToDate'])); $MY=$FD-1;  $PRD=$FD.'-'.$TD;
/*************************************************************************************************************/
 $name='HOD_Wise';
 $sqlA=mysql_query("select Fname,Sname,Lname from hrm_employee where EmployeeId=".$_REQUEST['e'], $con); 
 $resA=mysql_fetch_assoc($sqlA); $name2=$resA['Fname'].'_'.$resA['Sname'].'_'.$resA['Lname'];

$xls_filename = 'PMS_Reports_'.$PRD.'-'.$name2.'.xls';
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=$xls_filename");
header("Pragma: no-cache");
header("Expires: 0");
$sep = "\t"; 
echo "Sn\tEmpCode\tName\tDepartment\tDesignation\tGrade\tState\tScore\tRating\tProposed Designation\tProposed Grade\tProposed CTC\t% Proposed CTC\tCTC Correction\t% CTC Correction\tTotal Increment\t% Total Increment\tTotal Proposed CTC"; //\tOld-Gross\tOld-Ctc
print("\n");

$sql=mysql_query("select e.EmployeeID, EmpCode, Fname, Sname, Lname, d.DepartmentId, DateJoining, DepartmentCode, DesigName, GradeValue, EmpPmsId, g.HqId, EmpCurrGrossPM, EmpCurrCtc, Reviewer_TotalFinalScore, Reviewer_TotalFinalRating, Reviewer_EmpDesignation, Reviewer_EmpGrade, Hod_TotalFinalScore, Hod_TotalFinalRating, Hod_EmpDesignation, Hod_EmpGrade, Hod_ProIncSalary, Hod_Percent_ProIncSalary, Hod_ProCorrSalary, Hod_Percent_ProCorrSalary, Hod_IncNetMonthalySalary, Hod_Percent_IncNetMonthalySalary, Hod_GrossMonthlySalary, HR_CurrDesigId, HR_CurrGradeId, HR_PmsStatus, EmpCurrCtc, Hod_ProIncCTC, Hod_Percent_ProIncCTC, Hod_ProCorrCTC, Hod_Percent_ProCorrCTC, Hod_Proposed_ActualCTC, Hod_IncNetCTC, Hod_Percent_IncNetCTC from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID INNER JOIN hrm_employee_general g ON p.EmployeeID=g.EmployeeID INNER JOIN hrm_department d ON g.DepartmentId=d.DepartmentId INNER JOIN hrm_designation de on p.HR_CurrDesigId=de.DesigId INNER JOIN hrm_grade gr ON p.HR_CurrGradeId=gr.GradeId INNER JOIN hrm_headquater hq ON g.HqId=hq.HqId where e.EmpStatus='A' AND p.AssessmentYear=".$_REQUEST['y']." AND p.HOD_EmployeeID=".$_REQUEST['e']." order by EmpCode ASC", $con); 
$no=1; $Sno=1; while($res=mysql_fetch_array($sql))
{ 
$sql5=mysql_query("select StateName from hrm_state INNER JOIN hrm_headquater ON hrm_state.StateId=hrm_headquater.StateId where hrm_headquater.HqId=".$res['HqId'], $con); $res5=mysql_fetch_assoc($sql5); 
 
  $schema_insert = "";
  $schema_insert .= $no.$sep;
  $schema_insert .= $res['EmpCode'].$sep;
  $schema_insert .= strtoupper($res['Fname'].' '.$res['Sname'].' '.$res['Lname']).$sep;
  $schema_insert .= $res['DepartmentCode'].$sep;
  $schema_insert .= $res['DesigName'].$sep; 
  $schema_insert .= $res['GradeValue'].$sep;
  $schema_insert .= $res5['StateName'].$sep;
  
  //$schema_insert .= $res['EmpCurrGrossPM'].$sep;
  //$schema_insert .= $res['EmpCurrCtc'].$sep; 
  
if($res['Hod_TotalFinalScore']>0) {$HodScore=$res['Hod_TotalFinalScore'];}else{$HodScore=$res['Reviewer_TotalFinalScore'];}
  $schema_insert .= $HodScore.$sep; 
if($res['Hod_TotalFinalRating']>0){$HodRating=$res['Hod_TotalFinalRating'];}else{$HodRating=$res['Reviewer_TotalFinalRating'];}$schema_insert .= $HodRating.$sep;  
  
if($res['Hod_EmpDesignation']!=0 AND $res['Hod_EmpDesignation']>0) {$sqlHD=mysql_query("select DesigName from hrm_designation where DesigId=".$res['Hod_EmpDesignation'], $con); $resHD=mysql_fetch_assoc($sqlHD);} 
if($res['Hod_EmpGrade']!=0 AND $res['Hod_EmpGrade']>0) {$sqlHG=mysql_query("select GradeValue from hrm_grade where GradeId=".$res['Hod_EmpGrade'], $con); $resHG=mysql_fetch_assoc($sqlHG);}

$design=''; $graden='';
if($res['Hod_EmpDesignation']>0 AND $res['Hod_EmpDesignation']!=$res['HR_CurrDesigId']) { $design=$resHD['DesigName'];}
if($res['Hod_EmpGrade']>0 AND $res['Hod_EmpGrade']!=$res['HR_CurrGradeId']) { $graden=$resHG['GradeValue'];}
   
  $schema_insert .= $design.$sep;
  $schema_insert .= $graden.$sep;
  
  $schema_insert .= $res['Hod_ProIncCTC'].$sep;
  $schema_insert .= $res['Hod_Percent_ProIncCTC'].$sep;
  $schema_insert .= $res['Hod_ProCorrCTC'].$sep; 	
  $schema_insert .= $res['Hod_Percent_ProCorrCTC'].$sep;
  $schema_insert .= $res['Hod_IncNetCTC'].$sep;
  $schema_insert .= $res['Hod_Percent_IncNetCTC'].$sep;
  $schema_insert .= $res['Hod_Proposed_ActualCTC'].$sep;	
  
 
  /*$sY=mysql_query("select * from hrm_year where YearId=".$_REQUEST['y']."", $con); $rY=mysql_fetch_assoc($sY); 
$FD=date("Y",strtotime($rY['FromDate'])); $TD=date("Y",strtotime($rY['ToDate'])); $PRD=$FD.'-'.$TD;

if($_REQUEST['y']<=5){ $sqlC = mysql_query("SELECT Tot_CTC from hrm_employee_ctc WHERE EmployeeID=".$res['EmployeeID']." AND CtcYearId=".$_REQUEST['y']." AND CtcCreatedDate>='".date($FD."-10-01")."' AND CtcCreatedDate<='".date($FD."-12-31")."'", $con); }else{ $sqlC = mysql_query("SELECT Tot_CTC from hrm_employee_ctc WHERE EmployeeID=".$res['EmployeeID']." AND CtcYearId=".$_REQUEST['y']." AND CtcCreatedDate>='".date($TD."-01-01")."'", $con); }
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
  
  else{ $schema_insert .= ''.$sep; }*/
  
  //$schema_insert .= 'Gross='.$gross_annual.', Pf='.$pf_annual.', bonus='.$bonus.', esic='.$esic.', gratuity='.$gratuity.', medicalim='.$mediclaim.$sep;
			  
  $schema_insert = str_replace($sep."$", "", $schema_insert);
  $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
  $schema_insert .= "\t";
  print(trim($schema_insert));
  print "\n";
  $no++;				
}

?>
