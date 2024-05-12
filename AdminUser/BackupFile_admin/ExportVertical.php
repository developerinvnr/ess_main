<?php 
require_once('config/config.php');
date_default_timezone_set('Asia/Calcutta');
/*************************************************************************************************************/

if($_REQUEST['action']='FormVerticalExport') 
{ 
  if($_REQUEST['d']>0)
  { $sqlA=mysql_query("select DepartmentName from hrm_department where DepartmentId=".$_REQUEST['d'], $con); 
    $resA=mysql_fetch_assoc($sqlA); }


$xls_filename = 'Department_Vertical.xls';
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=$xls_filename");
header("Pragma: no-cache");
header("Expires: 0");
$sep = "\t"; 
echo "Sn\tEmpCode\tName\tDepartment\tGarde\tVertical"; 
print("\n"); 
 
$CompanyId=$_REQUEST['c']; 		

# Get Users Details form the DB #$result = mysql_query("SELECT * from formResults WHERE formID = '$formID'" );
$sql=mysql_query("select e.EmployeeID,e.EmpCode,Fname,Sname,Lname,de.DepartmentCode,gr.GradeValue,g.EmpVertical from hrm_employee e inner join hrm_employee_general g on e.EmployeeID=g.EmployeeID inner join hrm_department de on g.DepartmentId=de.DepartmentId inner join hrm_grade gr on g.GradeId=gr.GradeId where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND g.DepartmentId=".$_REQUEST['d']." order by e.EmpCode ASC", $con);

 $no=1; while($resEmp=mysql_fetch_array($sql))
 { 
  $schema_insert = "";
  $schema_insert .= $no.$sep;
  $schema_insert .= $resEmp['EmpCode'].$sep;
  $schema_insert .= $resEmp['Fname'].' '.$resEmp['Sname'].' '.$resEmp['Lname'].$sep;
  $schema_insert .= $resEmp['DepartmentCode'].$sep;
  $schema_insert .= $resEmp['GradeValue'].$sep;
  
  $sCat=mysql_query("select VerticalName from hrm_department_vertical where VerticalId=".$resEmp['EmpVertical'],$con); 
  $rCat=mysql_fetch_assoc($sCat);
  $schema_insert .= $rCat['VerticalName'].$sep;  
  $schema_insert = str_replace($sep."$", "", $schema_insert);
  $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
  $schema_insert .= "\t";
  print(trim($schema_insert));
  print "\n";
  $no++;
 }
 

}
?>