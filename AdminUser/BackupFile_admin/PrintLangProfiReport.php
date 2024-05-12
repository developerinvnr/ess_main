<?php
require_once('config/config.php');
date_default_timezone_set('Asia/Calcutta');

if($_REQUEST['action']=='DeptLangProfi') { $CompanyId=$_REQUEST['c']; $YearId=$_REQUEST['y']; }
if($_REQUEST['value']!='All') { $sqlA=mysql_query("select DepartmentName from hrm_department where DepartmentId=".$_REQUEST['value'], $con); $resA=mysql_fetch_assoc($sqlA); $dept=$resA['DepartmentName']; }else {$dept='All';}

$xls_filename = 'Employee_LangProfi_Details_'.$dept.'.xls';
 

header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=$xls_filename");
header("Pragma: no-cache");
header("Expires: 0");
$sep = "\t"; 
echo "Language\tWrite\tRead\tSpeak";
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
  $schema_insert = str_replace($sep."$", "", $schema_insert);
  $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
  $schema_insert .= "\t";
  print(trim($schema_insert));
  print "\n";
  
  
  $sqlL=mysql_query("select * from hrm_employee_langproficiency where EmployeeID=".$res['EmployeeID']." order by LangProficiencyId ASC", $con); while($resL=mysql_fetch_assoc($sqlL))
  {  
    $schema_insert = "";
    $schema_insert .= $resL['Language'].$sep;
    $schema_insert .= $resL['Write_lang'].$sep;
    $schema_insert .= $resL['Read_lang'].$sep;
    $schema_insert .= $resL['Speak_lang'].$sep;				  
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

