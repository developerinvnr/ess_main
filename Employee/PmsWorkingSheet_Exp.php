<?php
session_start();
require_once('../AdminUser/config/config.php');

$yi=$_REQUEST['yi'];
$ci=$_REQUEST['ci'];
$ei=$_REQUEST['ei'];
$di=$_REQUEST['di'];
$ti=$_REQUEST['ti'];
$tr=$_REQUEST['tr'];
$gi=$_REQUEST['gi'];

if($_REQUEST['di']>0)
{ 
 $sqlD=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$di,$con);
 $resD=mysql_fetch_assoc($sqlD); $dN=$resD['DepartmentCode'];
}
elseif($_REQUEST['ti']>0)
{ 
 $sqlE=mysql_query("select concat(Fname, ' ', Sname, ' ', Lname) as Fn from hrm_employee where EmployeeID=".$ti,$con);
 $resE=mysql_fetch_assoc($sqlE); $dN=$resE['Fn'];
}
else{ $dN='All'; }


if($_REQUEST['valuee']=='dataexport')
{

 $xls_filename = $dN.'_Appraisal_working_sheet.xls';
 header("Content-Type: application/xls");
 header("Content-Disposition: attachment; filename=$xls_filename");
 header("Pragma: no-cache"); header("Expires: 0"); $sep = "\t"; 
 echo "Sn\tEmpCode\tName\tDOJ\tDeaprtment\tDesignation\tGrade\tGrade Change Year\tLast Corr.(%)\tLast Corr.(Year)\tPrevious CTC\tFinal Score\tFinal Rating\tProposed Designation\tProposed Grade\tProrata(%)\tActual(%)\tProposed CTC\tCorrection\tCorrection(%)\tTotal Increment\tProposed Total CTC\tProposed Total CTC (%)";
 print("\n");

 $Dpp=0; $Dp=0; $Tee=0; $Te=0; $Trr=0; $Tr=0; $Grr=0; $Gr=0;  $RckArr=array();
 if(isset($di)){ $Dpp=1; $Dp=$di; } 
 if(isset($ti)){ $Tee=1; $Te=$ti; }
 if(isset($tr)){ $Trr=1; $Tr=$tr; }
 if(isset($gi)){ $Grr=1; $Gr=$gi; }
 $row=0; 
 if($Dp>0 OR $Te>0) // OR $Tr>0
 { 
   if($Dp>0){ $qsub='deptid='.$Dp; }elseif($Te>0){ $qsub='Rep1='.$Te; } //elseif($Tr>0){ $qsub='Rep2='.$Tr; } 
   $sqlRcd=mysql_query("select * from hrm_pms_workingsheet where hodid=".$ei." AND ".$qsub." AND yearid=".$yi." AND typeid='main'",$con); $row=mysql_num_rows($sqlRcd); $rRcd=mysql_fetch_assoc($sqlRcd); 
 }  
 
 if($Dp>0)
 {
  if($Dp>0 && $Gr>0){ $qry='g.DepartmentId='.$Dp.' AND p.HR_CurrGradeId='.$Gr; }
  elseif($Dp>0 && $Gr=='All'){ $qry='g.DepartmentId='.$Dp; }
 }
 elseif($Te>0)
 {
  if($Te>0 && $Gr>0){ $qry='p.Rev2_EmployeeID='.$Te.' AND p.HR_CurrGradeId='.$Gr; }
  elseif($Te>0 && $Gr=='All'){ $qry='p.Rev2_EmployeeID='.$Te; }
 }
 elseif($Tr>0)
 {
  if($Tr>0 && $Gr>0){ $qry='p.Reviewer_EmployeeID='.$Tr.' AND p.HR_CurrGradeId='.$Gr; }
  elseif($Tr>0 && $Gr=='All'){ $qry='p.Reviewer_EmployeeID='.$Tr; }
 }
 else{ $qry='1=1'; }
 
 $sTPrCtc=mysql_query("select sum(EmpCurrCtc) as TotPreCtc from hrm_employee_pms p inner join hrm_employee e on p.EmployeeID=e.EmployeeID inner join hrm_employee_general g on p.EmployeeID=g.EmployeeID where e.EmpStatus='A' AND g.DateJoining<='".$_SESSION['AllowDoj']."' AND p.AssessmentYear=".$yi." AND p.HOD_EmployeeID=".$ei." AND ".$qry."", $con); $rTPrCtc=mysql_fetch_assoc($sTPrCtc);

 $Mprodata=0; $Mactual=0; $Mctc=0; $Mcorr=0; $Mcorr_per=0; $Minc=0; $Mtotctc=0; $Mtotctc_per=0;
 if($row>0)
 {
  if($rRcd['typeid']=='main')
  {
   $Mprodata=$rRcd['per_prorata']; $Mactual=$rRcd['per_actual']; $Mctc=$rRcd['ctc']; $Mcorr=$rRcd['corr'];
   $Mcorr_per=$rRcd['per_corr'];  $Minc=$rRcd['inc'];  $Mtotctc=$rRcd['tot_ctc']; $Mtotctc_per=$rRcd['per_totctc'];
  }  
 }


  $Gap='.';
  //Total
  $schema_insert = "";
  $schema_insert .= $Gap.$sep;
  $schema_insert .= $Gap.$sep;
  $schema_insert .= $Gap.$sep;
  $schema_insert .= $Gap.$sep;
  $schema_insert .= $Gap.$sep;
  $schema_insert .= $Gap.$sep;
  $schema_insert .= $Gap.$sep;
  $schema_insert .= $Gap.$sep;
  $schema_insert .= $Gap.$sep;
  $schema_insert .= 'Total:'.$sep;	
  $schema_insert .= floatval($rTPrCtc['TotPreCtc']).$sep;
  $schema_insert .= $Gap.$sep;
  $schema_insert .= $Gap.$sep;
  $schema_insert .= $Gap.$sep;
  $schema_insert .= $Gap.$sep;
  $schema_insert .= $Mprodata.$sep;
  $schema_insert .= $Mactual.$sep;
  $schema_insert .= $Mctc.$sep;
  $schema_insert .= $Mcorr.$sep;
  $schema_insert .= $Mcorr_per.$sep;
  $schema_insert .= $Minc.$sep;
  $schema_insert .= $Mtotctc.$sep;
  $schema_insert .= $Mtotctc_per.$sep;
			  
  $schema_insert = str_replace($sep."$", "", $schema_insert);
  $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
  $schema_insert .= "\t";
  print(trim($schema_insert)); print "\n"; 
  
 $sql=mysql_query("select e.EmployeeID, EmpCode, concat(Fname, ' ', Sname, ' ', Lname) as FullName, DateJoining, DepartmentCode, DesigName, DesigCode, GradeValue, EmpCurrGrossPM, EmpCurrCtc, EmpCurrAnnualBasic, Hod_TotalFinalScore, Hod_TotalFinalRating, Hod_EmpDesignation, Hod_EmpGrade from hrm_employee_pms p inner join hrm_employee e on p.EmployeeID=e.EmployeeID inner join hrm_employee_general g on p.EmployeeID=g.EmployeeID left join hrm_department d on g.DepartmentId=d.DepartmentId left join hrm_designation de on p.HR_CurrDesigId=de.DesigId inner join hrm_grade gr on p.HR_CurrGradeId=gr.GradeId inner join hrm_headquater hq on g.HqId=hq.HqId where e.EmpStatus='A' AND e.CompanyId=".$ci." AND g.DateJoining<='".$_SESSION['AllowDoj']."' AND p.AssessmentYear=".$yi." AND p.HOD_EmployeeID=".$ei." AND ".$qry." order by e.ECode ASC", $con);
 $no=1; 
 while($res=mysql_fetch_array($sql))
 {

  $sDeH=mysql_query("select DesigName,DesigCode from hrm_designation where DesigId=".$res['Hod_EmpDesignation'], $con); 
  $sGrH=mysql_query("select GradeValue from hrm_grade where GradeId=".$res['Hod_EmpGrade'], $con);
  $rDe=mysql_fetch_assoc($sDeH); $rGr=mysql_fetch_assoc($sGrH);
  
  $Eprodata=0; $Eactual=0; $Ectc=0; $Ecorr=0; $Ecorr_per=0; $Einc=0; $Etotctc=0; $Etotctc_per=0;
  if($_REQUEST['di']>0){ $qsub='deptid='.$_REQUEST['di']; }
  elseif($_REQUEST['ti']>0){ $qsub='Rep1='.$_REQUEST['ti']; }
  else{ $qsub='1=1'; }
  $sE=mysql_query("select * from hrm_pms_workingsheet where hodid=".$ei." AND yearid=".$yi." AND empid=".$res['EmployeeID']." AND ".$qsub." AND typeid='emp'",$con); $rEd=mysql_num_rows($sE); 
  if($rEd>0)
  { 
   $rEd=mysql_fetch_assoc($sE); 
   $Eprodata=$rEd['per_prorata']; $Eactual=$rEd['per_actual']; $Ectc=$rEd['ctc']; $Ecorr=$rEd['corr']; 
   $Ecorr_per=$rEd['per_corr'];  $Einc=$rEd['inc'];  $Etotctc=$rEd['tot_ctc']; $Etotctc_per=$rEd['per_totctc'];
  }

   $schema_insert = "";
   $schema_insert .= $no.$sep;
   $schema_insert .= $res['EmpCode'].$sep;
   $schema_insert .= $res['FullName'].$sep;
   $schema_insert .= $res['DateJoining'].$sep;
   $schema_insert .= $res['DepartmentCode'].$sep;
   $schema_insert .= $res['DesigCode'].$sep;
   $schema_insert .= $res['GradeValue'].$sep;
   
   $MxGrDate='.'; 
   $MxGrde=mysql_query("SELECT `SalaryChange_Date` FROM `hrm_pms_appraisal_history` WHERE `AppHistoryId`=(select MAX(`AppHistoryId`) as MaxId from hrm_pms_appraisal_history where `Current_Grade`!='".$res['GradeValue']."' and EmpCode='".$res['EmpCode']."' AND CompanyId=".$ci.")"); $MxRowG=mysql_num_rows($MxGrde);
   if($MxRowG>0){ $rMxGr=mysql_fetch_assoc($MxGrde); $MxGrDate=date("M-y",strtotime($rMxGr['SalaryChange_Date'])); }
   $schema_insert .= $MxGrDate.$sep;
   
   $MxCrDate='.'; $MxCrPer='.';
   $MxCorr=mysql_query("SELECT SalaryChange_Date, ProCorrCTC, `Percent_ProCorrCTC` FROM `hrm_pms_appraisal_history` WHERE `AppHistoryId`=(select MAX(`AppHistoryId`) as MaxId from hrm_pms_appraisal_history where `Percent_ProCorrCTC`>0 and EmpCode='".$res['EmpCode']."' AND CompanyId=".$ci.")"); $MxRowCorr=mysql_num_rows($MxCorr); 
   if($MxRowCorr>0)
   { $rMxCor=mysql_fetch_assoc($MxCorr); 
     $MxCrDate=date("M-y",strtotime($rMxCor['SalaryChange_Date'])); 
     $MxCrPer=$rMxCor['Percent_ProCorrCTC'];
   }
   else
   {
    $MxCorr=mysql_query("SELECT SalaryChange_Date, PropSalary_Correction, Previous_GrossSalaryPM FROM `hrm_pms_appraisal_history` WHERE `AppHistoryId`=(select MAX(`AppHistoryId`) as MaxId from hrm_pms_appraisal_history where `PropSalary_Correction`>0 and EmpCode='".$res['EmpCode']."' AND CompanyId=".$ci.")"); 
    $MxRowCorr=mysql_num_rows($MxCorr); 
    if($MxRowCorr>0)
    { $rMxCor=mysql_fetch_assoc($MxCorr);  
      $MxCrDate=date("M-y",strtotime($rMxCor['SalaryChange_Date'])); 
	  $MxCrPer=round(($rMxCor['PropSalary_Correction']/(($rMxCor['Previous_GrossSalaryPM']*1)/100)),2);
    }
   }//else
   $schema_insert .= $MxCrPer.$sep;
   $schema_insert .= $MxCrDate.$sep;
   
   $schema_insert .= intval($res['EmpCurrCtc']).$sep;
   $schema_insert .= $res['Hod_TotalFinalScore'].$sep;
   $schema_insert .= floatval($res['Hod_TotalFinalRating']).$sep;
   $schema_insert .= $rDe['DesigCode'].$sep;
   $schema_insert .= $rGr['GradeValue'].$sep;
   $schema_insert .= $Eprodata.$sep;
   $schema_insert .= $Eactual.$sep;
   $schema_insert .= $Ectc.$sep;
   $schema_insert .= $Ecorr.$sep;
   $schema_insert .= $Ecorr_per.$sep;
   $schema_insert .= $Einc.$sep;
   $schema_insert .= $Etotctc.$sep;
   $schema_insert .= $Etotctc_per.$sep;	
			  
   $schema_insert = str_replace($sep."$", "", $schema_insert);
   $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
   $schema_insert .= "\t";
   print(trim($schema_insert)); print "\n"; 
   $no++;
 }

} //if($_REQUEST['valuee']=='dataexport')



elseif($_REQUEST['valuee']=='DataAllExport')
{

 $xls_filename = $dN.'_Appraisal_working_sheet.xls';
 header("Content-Type: application/xls");
 header("Content-Disposition: attachment; filename=$xls_filename");
 header("Pragma: no-cache"); header("Expires: 0"); $sep = "\t"; 
 echo "Sn\tEmpCode\tName\tDOJ\tDeaprtment\tDesignation\tGrade\tGrade Change Year\tLast Corr.(%)\tLast Corr.(Year)\tPrevious CTC\tFinal Score\tFinal Rating\tProposed Designation\tProposed Grade\tProrata(%)\tActual(%)\tProposed CTC\tCorrection\tCorrection(%)\tTotal Increment\tProposed Total CTC\tProposed Total CTC (%)";
 print("\n");
 
  $Gap='.';
  //Total
  $schema_insert = "";
  $schema_insert .= $Gap.$sep;
  $schema_insert .= $Gap.$sep;
  $schema_insert .= $Gap.$sep;
  $schema_insert .= $Gap.$sep;
  $schema_insert .= $Gap.$sep;
  $schema_insert .= $Gap.$sep;
  $schema_insert .= $Gap.$sep;
  $schema_insert .= $Gap.$sep;
  $schema_insert .= $Gap.$sep;
  $schema_insert .= 'Total:'.$sep;	
  $schema_insert .= floatval($_REQUEST['PreCtc']).$sep; 
  $schema_insert .= $Gap.$sep;
  $schema_insert .= $Gap.$sep;
  $schema_insert .= $Gap.$sep;
  $schema_insert .= $Gap.$sep;
  $schema_insert .= $_REQUEST['Per_Prorata'].$sep;
  $schema_insert .= $_REQUEST['Per_Actual'].$sep;
  $schema_insert .= $_REQUEST['Ctc'].$sep;
  $schema_insert .= $_REQUEST['Corr'].$sep;
  $schema_insert .= $_REQUEST['Per_Corr'].$sep;
  $schema_insert .= $_REQUEST['Inc'].$sep;
  $schema_insert .= $_REQUEST['TotCtc'].$sep;
  $schema_insert .= $_REQUEST['Per_TotCtc'].$sep;
			  
  $schema_insert = str_replace($sep."$", "", $schema_insert);
  $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
  $schema_insert .= "\t";
  print(trim($schema_insert)); print "\n"; 
  

 $sql=mysql_query("select e.EmployeeID, EmpCode, concat(Fname, ' ', Sname, ' ', Lname) as FullName, DateJoining, DepartmentCode, DesigName, DesigCode, GradeValue, EmpCurrGrossPM, EmpCurrCtc, EmpCurrAnnualBasic, Hod_TotalFinalScore, Hod_TotalFinalRating, Hod_EmpDesignation, Hod_EmpGrade from hrm_employee_pms p inner join hrm_employee e on p.EmployeeID=e.EmployeeID inner join hrm_employee_general g on p.EmployeeID=g.EmployeeID left join hrm_department d on g.DepartmentId=d.DepartmentId left join hrm_designation de on p.HR_CurrDesigId=de.DesigId inner join hrm_grade gr on p.HR_CurrGradeId=gr.GradeId inner join hrm_headquater hq on g.HqId=hq.HqId where e.EmpStatus='A' AND e.CompanyId=".$ci." AND g.DateJoining<='".$_SESSION['AllowDoj']."' AND p.AssessmentYear=".$yi." AND p.HOD_EmployeeID=".$ei." order by e.ECode ASC", $con);
 $no=1; 
 while($res=mysql_fetch_array($sql))
 {

  $sDeH=mysql_query("select DesigName,DesigCode from hrm_designation where DesigId=".$res['Hod_EmpDesignation'], $con); 
  $sGrH=mysql_query("select GradeValue from hrm_grade where GradeId=".$res['Hod_EmpGrade'], $con);
  $rDe=mysql_fetch_assoc($sDeH); $rGr=mysql_fetch_assoc($sGrH);
  
  $Eprodata=0; $Eactual=0; $Ectc=0; $Ecorr=0; $Ecorr_per=0; $Einc=0; $Etotctc=0; $Etotctc_per=0;
  $sE=mysql_query("select * from hrm_pms_workingsheet where hodid=".$ei." AND yearid=".$yi." AND empid=".$res['EmployeeID']." AND typeid='emp'",$con); $rEd=mysql_num_rows($sE); 
  if($rEd==1)
  { 
   $rEd=mysql_fetch_assoc($sE); 
   $Eprodata=$rEd['per_prorata']; $Eactual=$rEd['per_actual']; $Ectc=$rEd['ctc']; $Ecorr=$rEd['corr']; 
   $Ecorr_per=$rEd['per_corr'];  $Einc=$rEd['inc'];  $Etotctc=$rEd['tot_ctc']; $Etotctc_per=$rEd['per_totctc'];
  }
  else if($rEd>=2)
  { 
   $s2E=mysql_query("select * from hrm_pms_workingsheet where hodid=".$ei." AND yearid=".$yi." AND Rep1>0 AND empid=".$res['EmployeeID']." AND typeid='emp'",$con); $r2Ed=mysql_num_rows($s2E);
   if($r2Ed>0)
   {
     $r2Ed=mysql_fetch_assoc($s2E); 
     $Eprodata=$r2Ed['per_prorata']; $Eactual=$r2Ed['per_actual']; $Ectc=$r2Ed['ctc']; $Ecorr=$r2Ed['corr']; 
     $Ecorr_per=$r2Ed['per_corr'];  $Einc=$r2Ed['inc'];  $Etotctc=$r2Ed['tot_ctc']; $Etotctc_per=$r2Ed['per_totctc'];
   }
   else
   {
     $s3E=mysql_query("select * from hrm_pms_workingsheet where hodid=".$ei." AND yearid=".$yi." AND deptid>0 AND empid=".$res['EmployeeID']." AND typeid='emp'",$con); $r3Ed=mysql_num_rows($s3E);
	 $r3Ed=mysql_fetch_assoc($s3E); 
     $Eprodata=$r3Ed['per_prorata']; $Eactual=$r3Ed['per_actual']; $Ectc=$r3Ed['ctc']; $Ecorr=$r3Ed['corr']; 
     $Ecorr_per=$r3Ed['per_corr'];  $Einc=$r3Ed['inc'];  $Etotctc=$r3Ed['tot_ctc']; $Etotctc_per=$r3Ed['per_totctc'];
   } 
   
  } //else if($rEd>=2)

   $schema_insert = "";
   $schema_insert .= $no.$sep;
   $schema_insert .= $res['EmpCode'].$sep;
   $schema_insert .= $res['FullName'].$sep;
   $schema_insert .= $res['DateJoining'].$sep;
   $schema_insert .= $res['DepartmentCode'].$sep;
   $schema_insert .= $res['DesigCode'].$sep;
   $schema_insert .= $res['GradeValue'].$sep;
   
   $MxGrDate='.'; 
   $MxGrde=mysql_query("SELECT `SalaryChange_Date` FROM `hrm_pms_appraisal_history` WHERE `AppHistoryId`=(select MAX(`AppHistoryId`) as MaxId from hrm_pms_appraisal_history where `Current_Grade`!='".$res['GradeValue']."' and EmpCode='".$res['EmpCode']."' AND CompanyId=".$ci.")"); $MxRowG=mysql_num_rows($MxGrde);
   if($MxRowG>0){ $rMxGr=mysql_fetch_assoc($MxGrde); $MxGrDate=date("M-y",strtotime($rMxGr['SalaryChange_Date'])); }
   $schema_insert .= $MxGrDate.$sep;
   
   $MxCrDate='.'; $MxCrPer='.';
   $MxCorr=mysql_query("SELECT SalaryChange_Date, ProCorrCTC, `Percent_ProCorrCTC` FROM `hrm_pms_appraisal_history` WHERE `AppHistoryId`=(select MAX(`AppHistoryId`) as MaxId from hrm_pms_appraisal_history where `Percent_ProCorrCTC`>0 and EmpCode='".$res['EmpCode']."' AND CompanyId=".$ci.")"); $MxRowCorr=mysql_num_rows($MxCorr); 
   if($MxRowCorr>0)
   { $rMxCor=mysql_fetch_assoc($MxCorr); 
     $MxCrDate=date("M-y",strtotime($rMxCor['SalaryChange_Date'])); 
     $MxCrPer=$rMxCor['Percent_ProCorrCTC'];
   }
   else
   {
    $MxCorr=mysql_query("SELECT SalaryChange_Date, PropSalary_Correction, Previous_GrossSalaryPM FROM `hrm_pms_appraisal_history` WHERE `AppHistoryId`=(select MAX(`AppHistoryId`) as MaxId from hrm_pms_appraisal_history where `PropSalary_Correction`>0 and EmpCode='".$res['EmpCode']."' AND CompanyId=".$ci.")"); 
    $MxRowCorr=mysql_num_rows($MxCorr); 
    if($MxRowCorr>0)
    { $rMxCor=mysql_fetch_assoc($MxCorr);  
      $MxCrDate=date("M-y",strtotime($rMxCor['SalaryChange_Date'])); 
	  $MxCrPer=round(($rMxCor['PropSalary_Correction']/(($rMxCor['Previous_GrossSalaryPM']*1)/100)),2);
    }
   }//else
   $schema_insert .= $MxCrPer.$sep;
   $schema_insert .= $MxCrDate.$sep;
   
   $schema_insert .= intval($res['EmpCurrCtc']).$sep;
   $schema_insert .= $res['Hod_TotalFinalScore'].$sep;
   $schema_insert .= floatval($res['Hod_TotalFinalRating']).$sep;
   $schema_insert .= $rDe['DesigCode'].$sep;
   $schema_insert .= $rGr['GradeValue'].$sep;
   
   if($rEd==0)
   {
    $schema_insert .= $Eprodata.$sep;
    $schema_insert .= $Eactual.$sep;
    $schema_insert .= intval($res['EmpCurrCtc']).$sep;
    $schema_insert .= $Ecorr.$sep;
    $schema_insert .= $Ecorr_per.$sep;
    $schema_insert .= $Einc.$sep;
    $schema_insert .= intval($res['EmpCurrCtc']).$sep;
    $schema_insert .= $Etotctc_per.$sep;
   }
   else
   {
    $schema_insert .= $Eprodata.$sep;
    $schema_insert .= $Eactual.$sep;
    $schema_insert .= $Ectc.$sep;
    $schema_insert .= $Ecorr.$sep;
    $schema_insert .= $Ecorr_per.$sep;
    $schema_insert .= $Einc.$sep;
    $schema_insert .= $Etotctc.$sep;
    $schema_insert .= $Etotctc_per.$sep;	
   }		  
    $schema_insert = str_replace($sep."$", "", $schema_insert);
    $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
    $schema_insert .= "\t";
   print(trim($schema_insert)); print "\n"; 
   $no++;
 }

} //if($_REQUEST['valuee']=='DataAllExport')




elseif($_REQUEST['valuee']=='DataBlankWith')
{

 $xls_filename = $dN.'_Appraisal_blank_working_sheet.xls';
 header("Content-Type: application/xls");
 header("Content-Disposition: attachment; filename=$xls_filename");
 header("Pragma: no-cache"); header("Expires: 0"); $sep = "\t"; 
 echo "Sn\tEmpCode\tName\tDOJ\tDeaprtment\tDesignation\tState\tGrade\tGrade Change Year\tLast Corr.(%)\tLast Corr.(Year)\tPrevious CTC";
 echo "\tEmployee Score\tEmployee Rating\tAppraiser Score\tAppraiser Rating\tReviewer Score\tReviewer Rating";
 echo "\tHOD Final Score\tHOD Final Rating\tProposed Designation\tProposed Grade\tProrata(%)\tActual(%)\tProposed CTC\tCorrection\tCorrection(%)\tTotal Increment\tProposed Total CTC\tProposed Total CTC (%)";
 print("\n");
 
  /*
  $Gap='.';
  //Total
  $schema_insert = "";
  $schema_insert .= $Gap.$sep;
  $schema_insert .= $Gap.$sep;
  $schema_insert .= $Gap.$sep;
  $schema_insert .= $Gap.$sep;
  $schema_insert .= $Gap.$sep;
  $schema_insert .= $Gap.$sep;
  $schema_insert .= $Gap.$sep;
  $schema_insert .= $Gap.$sep;
  $schema_insert .= $Gap.$sep;
  $schema_insert .= 'Total:'.$sep;	
  $schema_insert .= floatval($_REQUEST['PreCtc']).$sep; 
  $schema_insert .= $Gap.$sep;
  $schema_insert .= $Gap.$sep;
  $schema_insert .= $Gap.$sep;
  $schema_insert .= $Gap.$sep;
  $schema_insert .= $_REQUEST['Per_Prorata'].$sep;
  $schema_insert .= $_REQUEST['Per_Actual'].$sep;
  $schema_insert .= $_REQUEST['Ctc'].$sep;
  $schema_insert .= $_REQUEST['Corr'].$sep;
  $schema_insert .= $_REQUEST['Per_Corr'].$sep;
  $schema_insert .= $_REQUEST['Inc'].$sep;
  $schema_insert .= $_REQUEST['TotCtc'].$sep;
  $schema_insert .= $_REQUEST['Per_TotCtc'].$sep;
			  
  $schema_insert = str_replace($sep."$", "", $schema_insert);
  $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
  $schema_insert .= "\t";
  print(trim($schema_insert)); print "\n"; 
  */
  
if($di>0)
{
 if($ti>0)
 {
  if($ti>0 && $gi>0){ $qry='p.Rev2_EmployeeID='.$ti.' AND p.HR_CurrGradeId='.$gi; }
  elseif($ti>0 && $gr=='All'){ $qry='p.Rev2_EmployeeID='.$ti; }
 }
 elseif($tr>0)
 {
  if($tr>0 && $gi>0){ $qry='p.Reviewer_EmployeeID='.$tr.' AND p.HR_CurrGradeId='.$gi; }
  elseif($tr>0 && $gi=='All'){ $qry='p.Reviewer_EmployeeID='.$tr; }
 }
 elseif($di>0 && $gi>0){ $qry='g.DepartmentId='.$di.' AND p.HR_CurrGradeId='.$gi; }
 elseif($di>0 && $gi=='All'){ $qry='g.DepartmentId='.$di; }
}
elseif($di=='All')
{
 if($ti>0)
 {
  if($ti>0 && $gi>0){ $qry='p.Rev2_EmployeeID='.$ti.' AND p.HR_CurrGradeId='.$gi; }
  elseif($ti>0 && $gi=='All'){ $qry='p.Rev2_EmployeeID='.$ti; }
 }
 elseif($tr>0)
 {
  if($tr>0 && $gi>0){ $qry='p.Reviewer_EmployeeID='.$tr.' AND p.HR_CurrGradeId='.$gi; }
  elseif($tr>0 && $gi=='All'){ $qry='p.Reviewer_EmployeeID='.$tr; }
 }
 elseif($di=='All' && $gi>0){ $qry='p.HR_CurrGradeId='.$gi; }
 elseif($di=='All' && $gi=='All'){ $qry='1=1'; } 
}
else{ $qry='1=1'; }
  
  
 $sql=mysql_query("select e.EmployeeID, EmpCode, concat(Fname, ' ', Sname, ' ', Lname) as FullName, DateJoining, DepartmentCode, DesigName, DesigCode, CostCenter, GradeValue, EmpCurrGrossPM, EmpCurrCtc, EmpCurrAnnualBasic, Emp_TotalFinalScore, Emp_TotalFinalRating, Appraiser_TotalFinalScore, Appraiser_TotalFinalRating, Reviewer_TotalFinalScore, Reviewer_TotalFinalRating, Hod_TotalFinalScore, Hod_TotalFinalRating, Hod_EmpDesignation, Hod_EmpGrade from hrm_employee_pms p inner join hrm_employee e on p.EmployeeID=e.EmployeeID inner join hrm_employee_general g on p.EmployeeID=g.EmployeeID left join hrm_department d on g.DepartmentId=d.DepartmentId left join hrm_designation de on p.HR_CurrDesigId=de.DesigId inner join hrm_grade gr on p.HR_CurrGradeId=gr.GradeId inner join hrm_headquater hq on g.HqId=hq.HqId where e.EmpStatus='A' AND e.CompanyId=".$ci." AND g.DateJoining<='".$_SESSION['AllowDoj']."' AND p.AssessmentYear=".$yi." AND p.HOD_EmployeeID=".$ei." AND ".$qry." order by e.ECode ASC", $con);
 $no=1; 
 while($res=mysql_fetch_array($sql))
 {

  $sDeH=mysql_query("select DesigName,DesigCode from hrm_designation where DesigId=".$res['Hod_EmpDesignation'], $con); 
  $sGrH=mysql_query("select GradeValue from hrm_grade where GradeId=".$res['Hod_EmpGrade'], $con);
  $rDe=mysql_fetch_assoc($sDeH); $rGr=mysql_fetch_assoc($sGrH);
  
  $StateName='.';
  $sSt=mysql_query("select StateName from hrm_state where StateId=".$res['CostCenter'], $con);
  $rSt=mysql_fetch_assoc($sSt); $StateName = $rSt['StateName'];


   $schema_insert = "";
   $schema_insert .= $no.$sep;
   $schema_insert .= $res['EmpCode'].$sep;
   $schema_insert .= $res['FullName'].$sep;
   $schema_insert .= $res['DateJoining'].$sep;
   $schema_insert .= $res['DepartmentCode'].$sep;
   $schema_insert .= $res['DesigCode'].$sep;
   $schema_insert .= $StateName.$sep;
   $schema_insert .= $res['GradeValue'].$sep;
   
   $MxGrDate='.'; 
   $MxGrde=mysql_query("SELECT `SalaryChange_Date` FROM `hrm_pms_appraisal_history` WHERE `AppHistoryId`=(select MAX(`AppHistoryId`) as MaxId from hrm_pms_appraisal_history where `Current_Grade`!='".$res['GradeValue']."' and EmpCode='".$res['EmpCode']."' AND CompanyId=".$ci.")"); $MxRowG=mysql_num_rows($MxGrde);
   if($MxRowG>0){ $rMxGr=mysql_fetch_assoc($MxGrde); $MxGrDate=date("M-y",strtotime($rMxGr['SalaryChange_Date'])); }
   $schema_insert .= $MxGrDate.$sep;
   
   $MxCrDate='.'; $MxCrPer='.';
   $MxCorr=mysql_query("SELECT SalaryChange_Date, ProCorrCTC, `Percent_ProCorrCTC` FROM `hrm_pms_appraisal_history` WHERE `AppHistoryId`=(select MAX(`AppHistoryId`) as MaxId from hrm_pms_appraisal_history where `Percent_ProCorrCTC`>0 and EmpCode='".$res['EmpCode']."' AND CompanyId=".$ci.")"); $MxRowCorr=mysql_num_rows($MxCorr); 
   if($MxRowCorr>0)
   { $rMxCor=mysql_fetch_assoc($MxCorr); 
     $MxCrDate=date("M-y",strtotime($rMxCor['SalaryChange_Date'])); 
     $MxCrPer=$rMxCor['Percent_ProCorrCTC'];
   }
   else
   {
    $MxCorr=mysql_query("SELECT SalaryChange_Date, PropSalary_Correction, Previous_GrossSalaryPM FROM `hrm_pms_appraisal_history` WHERE `AppHistoryId`=(select MAX(`AppHistoryId`) as MaxId from hrm_pms_appraisal_history where `PropSalary_Correction`>0 and EmpCode='".$res['EmpCode']."' AND CompanyId=".$ci.")"); 
    $MxRowCorr=mysql_num_rows($MxCorr); 
    if($MxRowCorr>0)
    { $rMxCor=mysql_fetch_assoc($MxCorr);  
      $MxCrDate=date("M-y",strtotime($rMxCor['SalaryChange_Date'])); 
	  $MxCrPer=round(($rMxCor['PropSalary_Correction']/(($rMxCor['Previous_GrossSalaryPM']*1)/100)),2);
    }
   }//else
    $schema_insert .= $MxCrPer.$sep;
    $schema_insert .= $MxCrDate.$sep;
   
    $schema_insert .= intval($res['EmpCurrCtc']).$sep;
    
    $schema_insert .= $res['Emp_TotalFinalScore'].$sep;
    $schema_insert .= $res['Emp_TotalFinalRating'].$sep;
    $schema_insert .= $res['Appraiser_TotalFinalScore'].$sep;
    $schema_insert .= $res['Appraiser_TotalFinalRating'].$sep;
    $schema_insert .= $res['Reviewer_TotalFinalScore'].$sep;
    $schema_insert .= $res['Reviewer_TotalFinalRating'].$sep;
    
    $schema_insert .= $res['Hod_TotalFinalScore'].$sep;
    $schema_insert .= floatval($res['Hod_TotalFinalRating']).$sep;
    $schema_insert .= $rDe['DesigCode'].$sep;
    $schema_insert .= $rGr['GradeValue'].$sep;
   
    $schema_insert .= '0'.$sep;
    $schema_insert .= '0'.$sep;
    $schema_insert .= intval($res['EmpCurrCtc']).$sep;
    $schema_insert .= '0'.$sep;
    $schema_insert .= '0'.$sep;
    $schema_insert .= '0'.$sep;
    $schema_insert .= intval($res['EmpCurrCtc']).$sep;
    $schema_insert .= '0'.$sep;
   	  
    $schema_insert = str_replace($sep."$", "", $schema_insert);
    $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
    $schema_insert .= "\t";
   print(trim($schema_insert)); print "\n"; 
   $no++;
 }

} //if($_REQUEST['valuee']=='DataBlankWith')


?>