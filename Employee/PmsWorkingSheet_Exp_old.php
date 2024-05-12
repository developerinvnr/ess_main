<?php
session_start();
require_once('../AdminUser/config/config.php');

$yi=$_REQUEST['yi'];
$ei=$_REQUEST['ei'];
$di=$_REQUEST['di'];
$gi=$_REQUEST['gi'];

if($_REQUEST['di']>0)
{ 
 $sqlD=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$di,$con);
 $resD=mysql_fetch_assoc($sqlD); $dN=$resD['DepartmentCode'];
}
else{ $dN='All'; }


$xls_filename = $dN.'_Appraisal_working_sheet.xls';
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=$xls_filename");
header("Pragma: no-cache"); header("Expires: 0"); $sep = "\t"; 
echo "Sn\tEmpCode\tName\tDeaprtment\tDesignation\tGrade\tDOJ\tPrevious CTC\tFinal Score\tFinal Rating\tProposed Designation\tProposed Grade\tProrata(%)\tActual(%)\tProposed CTC\tCorrection\tCorrection(%)\tTotal Increment\tProposed Total CTC\tProposed Total CTC (%)";
print("\n");


 $Dpp=0; $RckArr=array();
 $Dp=0; 
 if(isset($di)){ $De=$di; $Dpp=1; }else{ $De=0;  } 
 if(isset($gi)){ $Gr=$gi; }else{ $Gr=0; }
 if($di>0){ $Dp=$di; }elseif($di=='All'){ $Dp=0; } 
 $row==0; 
 if($Dpp==1)
 { 
   $sqlRcd=mysql_query("select * from hrm_pms_workingsheet where hodid=".$ei." AND deptid=".$Dp." AND yearid=".$yi." AND typeid='main'",$con); $row=mysql_num_rows($sqlRcd); $rRcd=mysql_fetch_assoc($sqlRcd); 
 }


if($di>0 AND $gi=='All'){ $qry='g.DepartmentId='.$di; }
elseif($di>0 AND $gi>0){ $qry='g.DepartmentId='.$di.' AND p.HR_CurrGradeId='.$gi; }
elseif($di=='All' AND $gi>0){ $qry='p.HR_CurrGradeId='.$gi; }
elseif(($di=='All' AND $gi=='All') OR ($di=='' AND $gi=='')){ $qry='1=1'; }

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
  


$sql=mysql_query("select e.EmployeeID, EmpCode, concat(Fname, ' ', Sname, ' ', Lname) as FullName, DateJoining, DepartmentCode, DesigName, DesigCode, GradeValue, EmpCurrGrossPM, EmpCurrCtc, EmpCurrAnnualBasic, Hod_TotalFinalScore, Hod_TotalFinalRating, Hod_EmpDesignation, Hod_EmpGrade from hrm_employee_pms p inner join hrm_employee e on p.EmployeeID=e.EmployeeID inner join hrm_employee_general g on p.EmployeeID=g.EmployeeID left join hrm_department d on g.DepartmentId=d.DepartmentId left join hrm_designation de on p.HR_CurrDesigId=de.DesigId inner join hrm_grade gr on p.HR_CurrGradeId=gr.GradeId inner join hrm_headquater hq on g.HqId=hq.HqId where e.EmpStatus='A' AND g.DateJoining<='".$_SESSION['AllowDoj']."' AND p.AssessmentYear=".$yi." AND p.HOD_EmployeeID=".$ei." AND ".$qry." order by e.ECode ASC", $con);
$no=1; 
while($res=mysql_fetch_array($sql))
{

 $sDeH=mysql_query("select DesigName,DesigCode from hrm_designation where DesigId=".$res['Hod_EmpDesignation'], $con); 
 $sGrH=mysql_query("select GradeValue from hrm_grade where GradeId=".$res['Hod_EmpGrade'], $con);
 $rDe=mysql_fetch_assoc($sDeH); $rGr=mysql_fetch_assoc($sGrH);

 $Eprodata=0; $Eactual=0; $Ectc=0; $Ecorr=0; $Ecorr_per=0; $Einc=0; $Etotctc=0; $Etotctc_per=0; 
 if(isset($Dp))
 {
  $sE=mysql_query("select * from hrm_pms_workingsheet where hodid=".$ei." AND deptid=".$Dp." AND yearid=".$yi." AND empid=".$res['EmployeeID']." AND typeid='emp'",$con); $rEd=mysql_num_rows($sE);
  if($rEd>0)
  {
   $rEd=mysql_fetch_assoc($sE);
   $Eprodata=$rEd['per_prorata']; $Eactual=$rEd['per_actual']; $Ectc=$rEd['ctc']; $Ecorr=$rEd['corr'];
   $Ecorr_per=$rEd['per_corr'];  $Einc=$rEd['inc'];  $Etotctc=$rEd['tot_ctc']; $Etotctc_per=$rEd['per_totctc'];
  }
 }

  $schema_insert = "";
  $schema_insert .= $no.$sep;
  $schema_insert .= $res['EmpCode'].$sep;
  $schema_insert .= $res['FullName'].$sep;
  $schema_insert .= $res['DepartmentCode'].$sep;
  $schema_insert .= $res['DesigCode'].$sep;
  $schema_insert .= $res['GradeValue'].$sep;
  $schema_insert .= $res['DateJoining'].$sep;
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

?>