<?php 
require_once('config/config.php');
date_default_timezone_set('Asia/Calcutta');


$xls_filename = 'Employee_Travel_Running_KM.xls';
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=$xls_filename");
header("Pragma: no-cache");
header("Expires: 0");
$sep = "\t"; 
echo "Sn\tEmpCode\tName\tDepartment\tGrade\tPolicy Entry Date\tPolicy Type\tRunning KM";
print("\n");

  if($_REQUEST['c']==1){ $DbName='expense'; }
  elseif($_REQUEST['c']==3){ $DbName='expense_nr'; }
  elseif($_REQUEST['c']==4){ $DbName='expense_tl'; }
  define('HOST2','localhost');
  define('USER2','expense_user'); 
  define('PASS2','expense@192'); 
  define('dbexpro',$DbName);
  $con2=mysql_connect(HOST2,USER2,PASS2,true) or die(mysql_error());
  $exprodb=mysql_select_db(dbexpro,$con2) or die(mysql_error());

 if($_REQUEST['v']=='All') {$sql=mysql_query("select g.EmployeeID, EmpCode, Fname, Sname, Lname, g.DepartmentId, DepartmentCode, GradeValue, VehiclePolicy_EntryDate, VehiclePolicy_Type, Running_TotalKM from hrm_employee_general g INNER JOIN hrm_employee e ON g.EmployeeID=e.EmployeeID INNER JOIN hrm_department d ON g.DepartmentId=d.DepartmentId INNER JOIN hrm_grade gr ON g.GradeId=gr.GradeId where e.CompanyId=".$_REQUEST['c']." AND e.EmpStatus='A' order by e.EmpCode ASC", $con); }
else {$sql=mysql_query("select g.EmployeeID, EmpCode, Fname, Sname, Lname, g.DepartmentId, DepartmentCode, GradeValue, VehiclePolicy_EntryDate, VehiclePolicy_Type, Running_TotalKM from hrm_employee_general g INNER JOIN hrm_employee e ON g.EmployeeID=e.EmployeeID INNER JOIN hrm_department d ON g.DepartmentId=d.DepartmentId INNER JOIN hrm_grade gr ON g.GradeId=gr.GradeId where g.DepartmentId=".$_REQUEST['v']." AND e.CompanyId=".$_REQUEST['c']." AND e.EmpStatus='A' order by e.EmpCode ASC", $con); }
  
 $Sno=1; while($res=mysql_fetch_array($sql))
 { 
 
  $schema_insert = "";
  $schema_insert .= $Sno.$sep;
  $schema_insert .= $res['EmpCode'].$sep;
  $schema_insert .= $res['Fname'].' '.$res['Sname'].' '.$res['Lname'].$sep;		
  $schema_insert .= $res['DepartmentCode'].$sep;
  
  
  $schema_insert .= $res['GradeValue'].$sep;
  $schema_insert .= $res['VehiclePolicy_EntryDate'].$sep;
  $schema_insert .= $res['VehiclePolicy_Type'].$sep;
  if($res['Running_TotalKM']>0){ $RunKM=floatval($res['Running_TotalKM']); }else{$RunKM='';}
  $schema_insert .= $RunKM.$sep;
  
  $sDl2=mysql_query("SELECT SUM(y1.`Totalkm`) as TotKM FROM `y4_24_wheeler_entry` y1 inner join y4_expenseclaims y2 on y1.ExpId=y2.ExpId where y2.CrBY=".$res['EmployeeID']." AND y2.ClaimStatus!='Deactivate' AND y2.ClaimAtStep>=5",$con2); 
  $rDl2=mysql_fetch_assoc($sDl2);
  if($rDl2['TotKM']>0){ $TotKM=$rDl2['TotKM']; }else{ $TotKM=''; } 
  $schema_insert .= $TotKM.$sep;
  
  
  
  $schema_insert = str_replace($sep."$", "", $schema_insert);
  $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
  $schema_insert .= "\t";
  print(trim($schema_insert));
  print "\n";
  $Sno++;
 }

?>