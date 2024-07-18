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

 $xls_filename = $dN.'_performancepay_working_sheet.xls';
 header("Content-Type: application/xls");
 header("Content-Disposition: attachment; filename=$xls_filename");
 header("Pragma: no-cache"); header("Expires: 0"); $sep = "\t"; 
 echo "Sn\tEmpCode\tName\tDOJ\tDeaprtment\tDesignation\tGrade\tvariable Pay(in CTC)\tFinal Rating\tGross Paid\tPP(%)\tTotal PP";
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
   $sqlRcd=mysql_query("select * from hrm_pp_workingsheet where hodid=".$ei." AND ".$qsub." AND yearid=".$yi." AND typeid='main'",$con); $row=mysql_num_rows($sqlRcd); $rRcd=mysql_fetch_assoc($sqlRcd); 
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
 
 $sTPrCtc=mysql_query("select sum(VP_GrossPaid) as VP_GrossPaid from hrm_employee_pms p inner join hrm_employee e on p.EmployeeID=e.EmployeeID inner join hrm_employee_general g on p.EmployeeID=g.EmployeeID where e.EmpStatus='A' AND g.DateJoining<='".$_SESSION['AllowDoj']."' AND p.AssessmentYear=".$yi." AND p.Hod_TotalFinalRating>2.7 AND p.HOD_EmployeeID=".$ei." AND ".$qry."", $con); $rTPrCtc=mysql_fetch_assoc($sTPrCtc);

 $Mprodata=0; $Mactual=0; $Mctc=0; $Mcorr=0; $Mcorr_per=0; $Minc=0; $Mtotctc=0; $Mtotctc_per=0;
if($row>0)
{
  if($rRcd['typeid']=='main')
  {
   //$TPP_MPer=$rRcd['pp_per']; $TPP_MAmt=$rRcd['pp_amt'];
   $sqlTamt=mysql_query("select sum(pp_amt) as TppAmt from hrm_pp_workingsheet where hodid=".$ei." AND yearid=".$yi." AND typeid='emp' AND ".$qsub."",$con); $resTamt=mysql_fetch_assoc($sqlTamt); 
   $TPP_MAmt=$resTamt['TppAmt'];
   $TPP_MPer=round($resTamt['TppAmt']/(($rTPrCtc['VP_GrossPaid']*1)/100),2); 
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
  $schema_insert .= 'Total:'.$sep;	
  $schema_insert .= floatval($rTPrCtc['VP_GrossPaid']).$sep;
  $schema_insert .= $TPP_MPer.$sep;
  $schema_insert .= $TPP_MAmt.$sep;
			  
  $schema_insert = str_replace($sep."$", "", $schema_insert);
  $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
  $schema_insert .= "\t";
  print(trim($schema_insert)); print "\n"; 
  
  $sql=mysql_query("select e.EmployeeID, EmpCode, concat(Fname, ' ', Sname, ' ', Lname) as FullName, DateJoining, g.EmpVertical, g.EmpSection, DepartmentCode, DesigName, DesigCode, GradeValue, EmpPmsId, VP_GrossPaid, VP_CurrYearVariablePay, VP_Indv_Per, VP_Final_Per, VP_PayAmt, Hod_TotalFinalScore, Hod_TotalFinalRating, Hod_EmpDesignation, Hod_EmpGrade, HR_CurrGradeId, HR_Curr_DepartmentId from hrm_employee_pms p inner join hrm_employee e on p.EmployeeID=e.EmployeeID inner join hrm_employee_general g on p.EmployeeID=g.EmployeeID left join hrm_department d on g.DepartmentId=d.DepartmentId left join hrm_designation de on g.DesigId=de.DesigId inner join hrm_grade gr on g.GradeId=gr.GradeId inner join hrm_headquater hq on g.HqId=hq.HqId where e.EmpStatus='A' AND e.CompanyId=".$ci." AND g.DateJoining<='".$_SESSION['AllowDoj']."' AND p.AssessmentYear=".$yi." AND p.Hod_TotalFinalRating>2.7 AND p.HOD_EmployeeID=".$ei." AND ".$qry." order by e.ECode ASC", $con); 
  
 $no=1; 
 while($res=mysql_fetch_array($sql))
 {


   $schema_insert = "";
   $schema_insert .= $no.$sep;
   $schema_insert .= $res['EmpCode'].$sep;
   $schema_insert .= $res['FullName'].$sep;
   $schema_insert .= $res['DateJoining'].$sep;
   $schema_insert .= $res['DepartmentCode'].$sep;
   $schema_insert .= $res['DesigName'].$sep;
   $schema_insert .= $res['GradeValue'].$sep;
   $schema_insert .= $res['VP_CurrYearVariablePay'].$sep;
   $schema_insert .= $res['Hod_TotalFinalRating'].$sep;
   $schema_insert .= floatval($res['VP_GrossPaid']).$sep;
   $schema_insert .= $res['VP_Final_Per'].$sep;
   $schema_insert .= $res['VP_PayAmt'].$sep;
			  
   $schema_insert = str_replace($sep."$", "", $schema_insert);
   $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
   $schema_insert .= "\t";
   print(trim($schema_insert)); print "\n"; 
   $no++;
 }

} //if($_REQUEST['valuee']=='dataexport')





elseif($_REQUEST['valuee']=='DataAllExport')
{

 $xls_filename = $dN.'_performancepay_working_sheet.xls';
 header("Content-Type: application/xls");
 header("Content-Disposition: attachment; filename=$xls_filename");
 header("Pragma: no-cache"); header("Expires: 0"); $sep = "\t"; 
 echo "Sn\tEmpCode\tName\tDOJ\tDeaprtment\tDesignation\tGrade\tvariable Pay(in CTC)\tFinal Rating\tGross Paid\tPP(%)\tTotal PP";
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
   $sqlRcd=mysql_query("select * from hrm_pp_workingsheet where hodid=".$ei." AND ".$qsub." AND yearid=".$yi." AND typeid='main'",$con); $row=mysql_num_rows($sqlRcd); $rRcd=mysql_fetch_assoc($sqlRcd); 
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
  $schema_insert .= 'Total:'.$sep;	
  $schema_insert .= floatval($_REQUEST['Tgp']).$sep; 
  $schema_insert .= floatval($_REQUEST['TPP_Per']).$sep;
  $schema_insert .= floatval($_REQUEST['TPP_Amt']).$sep;
			  
  $schema_insert = str_replace($sep."$", "", $schema_insert);
  $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
  $schema_insert .= "\t";
  print(trim($schema_insert)); print "\n"; 
  
  $sql=mysql_query("select e.EmployeeID, EmpCode, concat(Fname, ' ', Sname, ' ', Lname) as FullName, DateJoining, g.EmpVertical, g.EmpSection, DepartmentCode, DesigName, DesigCode, GradeValue, EmpPmsId, VP_GrossPaid, VP_CurrYearVariablePay, VP_Indv_Per, VP_Final_Per, VP_PayAmt, Hod_TotalFinalScore, Hod_TotalFinalRating, Hod_EmpDesignation, Hod_EmpGrade, HR_CurrGradeId, HR_Curr_DepartmentId from hrm_employee_pms p inner join hrm_employee e on p.EmployeeID=e.EmployeeID inner join hrm_employee_general g on p.EmployeeID=g.EmployeeID left join hrm_department d on g.DepartmentId=d.DepartmentId left join hrm_designation de on g.DesigId=de.DesigId inner join hrm_grade gr on g.GradeId=gr.GradeId inner join hrm_headquater hq on g.HqId=hq.HqId where e.EmpStatus='A' AND e.CompanyId=".$ci." AND g.DateJoining<='".$_SESSION['AllowDoj']."' AND p.AssessmentYear=".$yi." AND p.Hod_TotalFinalRating>2.7 AND p.HOD_EmployeeID=".$ei." AND ".$qry." order by e.ECode ASC", $con); 
 $no=1; 
 while($res=mysql_fetch_array($sql))
 {

    $schema_insert = "";
    $schema_insert .= $no.$sep;
    $schema_insert .= $res['EmpCode'].$sep;
    $schema_insert .= $res['FullName'].$sep;
    $schema_insert .= $res['DateJoining'].$sep;
    $schema_insert .= $res['DepartmentCode'].$sep; 
    $schema_insert .= $res['DesigName'].$sep;
    $schema_insert .= $res['GradeValue'].$sep;
	$schema_insert .= $res['VP_CurrYearVariablePay'].$sep;
    $schema_insert .= $res['Hod_TotalFinalRating'].$sep;
    $schema_insert .= floatval($res['VP_GrossPaid']).$sep;
    $schema_insert .= $res['VP_Final_Per'].$sep;
    $schema_insert .= $res['VP_PayAmt'].$sep;
   
    $schema_insert = str_replace($sep."$", "", $schema_insert);
    $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
    $schema_insert .= "\t";
   print(trim($schema_insert)); print "\n"; 
   $no++;
 }

} //if($_REQUEST['valuee']=='DataAllExport')



?>