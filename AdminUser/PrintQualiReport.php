<?php
require_once('config/config.php');
date_default_timezone_set('Asia/Calcutta');

if($_REQUEST['action']=='DeptQuali') { $CompanyId=$_REQUEST['c']; $YearId=$_REQUEST['y']; }
if($_REQUEST['value']!='All') { $sqlA=mysql_query("select DepartmentName from hrm_department where DepartmentId=".$_REQUEST['value'], $con); $resA=mysql_fetch_assoc($sqlA); $dept=$resA['DepartmentName']; }else {$dept='All';}

$xls_filename = 'Employee_Qualification_Details_'.$dept.'.xls';
 

header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=$xls_filename");
header("Pragma: no-cache");
header("Expires: 0");
$sep = "\t"; 
echo "Qualification\tSpecialization\tInstitute\tSubject\tPassOut\tGrade";
print("\n");

if($_REQUEST['value']=='All') {$sql=mysql_query("select hrm_employee.*,DepartmentId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.CompanyId=".$CompanyId." AND hrm_employee.EmpStatus='A' order by EmpCode ASC", $con); }
else {$sql=mysql_query("select hrm_employee.*,DepartmentId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee_general.DepartmentId=".$_REQUEST['value']." AND hrm_employee.CompanyId=".$CompanyId." AND hrm_employee.EmpStatus='A' order by EmpCode ASC", $con); } 
$Sno=1; 
while($res=mysql_fetch_array($sql))
{ 

  $Ename=$res['Fname'].' '.$res['Sname'].' '.$res['Lname']; 
  $sqlDept=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$res['DepartmentId'], $con); 
  $resDept=mysql_fetch_assoc($sqlDept);
 
  $schema_insert = "";
  $schema_insert .= '('.$Sno.') EC:'.$res['EmpCode'].' - '.$Ename.' - '.$resDept['DepartmentCode'].$sep;
  $schema_insert .= ''.$sep;
  $schema_insert .= ''.$sep;
  $schema_insert .= ''.$sep;
  $schema_insert .= ''.$sep;
  $schema_insert .= ''.$sep;  
  $schema_insert = str_replace($sep."$", "", $schema_insert);
  $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
  $schema_insert .= "\t";
  print(trim($schema_insert));
  print "\n";
  
  
  $sqlQ=mysql_query("select * from hrm_employee_qualification where EmployeeID=".$res['EmployeeID']." order by QualificationId ASC", $con); while($resQ=mysql_fetch_assoc($sqlQ))
  {  
    $schema_insert = "";
    $schema_insert .= $resQ['Qualification'].$sep;
    $schema_insert .= $resQ['Specialization'].$sep;
    $schema_insert .= $resQ['Institute'].$sep;
    $schema_insert .= $resQ['Subject'].$sep;		
    $schema_insert .= $resQ['PassOut'].$sep;
	
    $schema_insert .= $resQ['Grade_Per'].$sep;		  
    $schema_insert = str_replace($sep."$", "", $schema_insert);
    $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
    $schema_insert .= "\t";
    print(trim($schema_insert));
    print "\n";
  } 
  
  print "\n";
  $Sno++;
}

?>

