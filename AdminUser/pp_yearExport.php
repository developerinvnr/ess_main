<?php require_once('config/config.php');
date_default_timezone_set('Asia/Calcutta');

if($_REQUEST['action']=='HodPPIncExport')
{

 $sy=mysql_query("select YearId,FromDate,ToDate from hrm_year y where y.YearId>=12 and YearId<=".$_REQUEST['y'], $con);
 $ry=mysql_fetch_array($sy);
 
 $xls_filename = 'PerformancePayReports_'.date("Y",strtotime($ry['FromDate'])).'-'.date("Y",strtotime($ry['ToDate'])).'.xls';
 header("Content-Type: application/xls");
 header("Content-Disposition: attachment; filename=$xls_filename");
 header("Pragma: no-cache"); header("Expires: 0"); $sep = "\t"; 
 echo "EC\tName\tAmount";
 print("\n");
 
 $yCond='p.AssessmentYear='.$_REQUEST['y']; $dCond='1=1'; $hCond='1=1';
if($_REQUEST['d']>0){ $dCond='p.HR_Curr_DepartmentId='.$_REQUEST['d']; }
if($_REQUEST['h']>0){ $dCond='p.HOD_EmployeeID='.$_REQUEST['h']; }

 $sql=mysql_query("select EmpCode,concat(Fname, ' ',Sname, ' ',Lname) as Name, VP_PayAmt from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID where e.CompanyId=".$_REQUEST['c']." AND p.AssessmentYear=".$_REQUEST['y']." AND ".$dCond." AND ".$hCond." AND p.Hod_TotalFinalRating>2.7 AND VP_PayAmt>0 order by e.ECode ASC", $con);
 
 $no=1;
 while($res=mysql_fetch_array($sql))
 {
  
  $schema_insert = "";
  $schema_insert .= $res['EmpCode'].$sep;
  $schema_insert .= $res['Name'].$sep;
  $schema_insert .= round($res['VP_PayAmt']).$sep;
  
  $schema_insert = str_replace($sep."$", "", $schema_insert);
  $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
  $schema_insert .= "\t";
  print(trim($schema_insert)); print "\n"; 
  $no++;
 } //while

} //if($_REQUEST['action']=='HodPPIncExport')



?>