<?php
require_once('config/config.php');
date_default_timezone_set('Asia/Calcutta');

$BY=date("Y")-1;
if($_REQUEST['Y']>=date("Y"))
{ $AttTable='hrm_employee_attendance'; $AttReport='hrm_employee_attreport'; 
  $LeaveTable='hrm_employee_monthlyleave_balance'; }
elseif($_REQUEST['Y']==$BY AND date("m")=='01' AND $_REQUEST['m']==12)
{ $AttTable='hrm_employee_attendance'; $AttReport='hrm_employee_attreport'; 
  $LeaveTable='hrm_employee_monthlyleave_balance'; }
elseif($_REQUEST['Y']==$BY AND $_REQUEST['m']<12)
{ $AttTable='hrm_employee_attendance_'.$_REQUEST['Y']; $AttReport='hrm_employee_attreport_'.$_REQUEST['Y']; 
  $LeaveTable='hrm_employee_monthlyleave_balance_'.$_REQUEST['Y']; }
else
{$AttTable='hrm_employee_attendance_'.$_REQUEST['Y']; $AttReport='hrm_employee_attreport_'.$_REQUEST['Y']; 
  $LeaveTable='hrm_employee_monthlyleave_balance_'.$_REQUEST['Y']; }
  
$PRD=$_REQUEST['m'].'-'.$_REQUEST['Y'];

if($_REQUEST['D']!='All')
{ 
$sqlD=mysql_query("select DepartmentName from hrm_department where DepartmentId=".$_REQUEST['D'], $con); 
$resD=mysql_fetch_assoc($sqlD); $name=$resD['DepartmentName'];
}
else
{
$name='All';
}

$xls_filename = 'Attendance_'.$PRD.'-'.$name.'.xls';
 

header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=$xls_filename");
header("Pragma: no-cache");
header("Expires: 0");
$sep = "\t"; 
echo "Sn\tEmpCode\tName\tDepartment\tO-CL\tO-SL\tO-PL\tO-EL\tO-FL";
$id=$_REQUEST['m']; $Y=$_REQUEST['Y']; for($i=1; $i<=date("t",strtotime(date("Y-".$_REQUEST['m']."-d"))); $i++) 
{
 echo "\t".$i;
}
echo "\tC-CL\tC-SL\tC-PL\tC-EL\tC-FL";
print("\n");


if($_REQUEST['D']!='All'){ $SqlEmp=mysql_query("select e.EmployeeID,EmpCode,Fname,Sname,Lname,DepartmentId from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID where e.EmpStatus!='De' AND g.DepartmentId=".$_REQUEST['D']." AND e.CompanyId=".$_REQUEST['c']." AND (e.DateOfSepration='0000-00-00' OR e.DateOfSepration='1970-01-01' OR e.DateOfSepration>='".date($_REQUEST['Y']."-".$_REQUEST['m']."-01")."') AND g.DateJoining<='".date($_REQUEST['Y']."-".$_REQUEST['m']."-31")."' order by e.EmpCode ASC", $con); }
      if($_REQUEST['D']=='All'){ $SqlEmp=mysql_query("select e.EmployeeID,EmpCode,Fname,Sname,Lname,DepartmentId from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID where e.EmpStatus!='De' AND e.CompanyId=".$_REQUEST['c']." AND g.DepartmentId!=17 AND g.DepartmentId!=18 AND g.DepartmentId!=23 AND g.DepartmentId!=0 AND (e.DateOfSepration='0000-00-00' OR e.DateOfSepration='1970-01-01' OR e.DateOfSepration>='".date($_REQUEST['Y']."-".$_REQUEST['m']."-01")."') AND g.DateJoining<='".date($_REQUEST['Y']."-".$_REQUEST['m']."-31")."' order by e.EmpCode ASC", $con); }
$no=1; $SqlRows=mysql_num_rows($SqlEmp); 
while($ResEmp=mysql_fetch_array($SqlEmp)) 
 { 
  $Ename=$ResEmp['Fname'].' '.$ResEmp['Sname'].' '.$ResEmp['Lname']; $month=$_REQUEST['m']; $Y=$_REQUEST['Y'];
  $sqlDept=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$ResEmp['DepartmentId'], $con); 
 
  $schema_insert = "";
  $schema_insert .= $no.$sep;
  $schema_insert .= $ResEmp['EmpCode'].$sep;
  $schema_insert .= $Ename.$sep;
  $schema_insert .= $resDept['DepartmentCode'].$sep;
  
  $sqlTotLeave=mysql_query("select * from ".$LeaveTable." where Year=".$Y." AND EmployeeID=".$ResEmp['EmployeeID']." AND Month=".$month."", $con); $resTotLeave=mysql_fetch_assoc($sqlTotLeave);
  if($resTotLeave['OpeningCL']!=''){ $ocl=floatval($resTotLeave['OpeningCL']); } else { $ocl=''; }
  if($resTotLeave['OpeningSL']!=''){ $osl=floatval($resTotLeave['OpeningSL']); } else { $osl=''; }
  if($resTotLeave['OpeningPL']!=''){ $opl=floatval($resTotLeave['OpeningPL']); } else { $opl=''; }
  if($resTotLeave['OpeningEL']!=''){ $oel=floatval($resTotLeave['OpeningEL']); } else { $oel=''; }
  if($resTotLeave['OpeningOL']!=''){ $ofl=floatval($resTotLeave['OpeningOL']); } else { $ofl=''; }
  $schema_insert .= $ocl.$sep;
  $schema_insert .= $osl.$sep;
  $schema_insert .= $opl.$sep;
  $schema_insert .= $oel.$sep;
  $schema_insert .= $ofl.$sep; 
  
  
  //$SqlEmp2=mysql_query("SELECT * FROM ".$AttReport." WHERE EmployeeID =".$ResEmp['EmployeeID']." AND Year=".$Y." AND Month=".$month, $con); $ResEmp2=mysql_fetch_array($SqlEmp2); 
  for($i=1; $i<=date("t",strtotime(date("Y-".$_REQUEST['m']."-d"))); $i++) 
  {
   $SqlEmp2=mysql_query("SELECT AttValue FROM ".$AttTable." WHERE EmployeeID =".$ResEmp['EmployeeID']." AND AttDate='".$Y."-".$month."-".$i."'", $con); $ResEmp2=mysql_fetch_array($SqlEmp2);
   $schema_insert .= $ResEmp2['AttValue'].$sep;
  }
  
  if($resTotLeave['BalanceCL']!=''){ $ccl=floatval($resTotLeave['BalanceCL']); } else { $ccl=''; }
  if($resTotLeave['BalanceSL']!=''){ $csl=floatval($resTotLeave['BalanceSL']); } else { $csl=''; }
  if($resTotLeave['BalancePL']!=''){ $cpl=floatval($resTotLeave['BalancePL']); } else { $cpl=''; }
  if($resTotLeave['BalanceEL']!=''){ $cel=floatval($resTotLeave['BalanceEL']); } else { $cel=''; }
  if($resTotLeave['BalanceOL']!=''){ $cfl=floatval($resTotLeave['BalanceOL']); } else { $cfl=''; }
  $schema_insert .= $ccl.$sep;
  $schema_insert .= $csl.$sep;
  $schema_insert .= $cpl.$sep;
  $schema_insert .= $cel.$sep;
  $schema_insert .= $cfl.$sep; 

	
				  
  $schema_insert = str_replace($sep."$", "", $schema_insert);
  $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
  $schema_insert .= "\t";
  print(trim($schema_insert));
  print "\n";
  $no++;
}

?>
