<?php
require_once('config/config.php');
date_default_timezone_set('Asia/Calcutta');

if($_REQUEST['action']=='DeptContact') { $CompanyId=$_REQUEST['c']; $YearId=$_REQUEST['y']; }
if($_REQUEST['value']!='All') { $sqlA=mysql_query("select DepartmentName from hrm_department where DepartmentId=".$_REQUEST['value'], $con); $resA=mysql_fetch_assoc($sqlA); $dept=$resA['DepartmentName']; }else {$dept='All';}

$xls_filename = 'Employee_Contact_Details_'.$dept.'.xls';
 

header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=$xls_filename");
header("Pragma: no-cache");
header("Expires: 0");
$sep = "\t"; 
echo "Sn\tEC\tName\tDepartment\tDesignation\tCurr_Address\tCurr_State\tCurr_City\tCurr_Pinno\tParm_Address\tParm_State\tParm_City\tParm_Pinno \tEmrg_Name\tEmrg_Conact\tEmrg_Relation\tEmrg_Email\tRef Personal_Name\tRef Personal_Contact\tRef Personal_Relation\tRef Personal_Email\tRef Prof_Name\tRef Prof_Conact\tRef Prof_EmailId\tRef Prof_Company\tRef Prof_Designation";
print("\n");

if($_REQUEST['value']=='All') {$sql=mysql_query("select hrm_employee.*, hrm_employee_contact.*,DepartmentId,DesigId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_contact ON hrm_employee_general.EmployeeID=hrm_employee_contact.EmployeeID where hrm_employee.CompanyId=".$CompanyId." AND hrm_employee.EmpStatus='A' order by EmpCode ASC", $con); }
else {$sql=mysql_query("select hrm_employee.*, hrm_employee_contact.*,DepartmentId,DesigId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_contact ON hrm_employee_general.EmployeeID=hrm_employee_contact.EmployeeID where hrm_employee_general.DepartmentId=".$_REQUEST['value']." AND hrm_employee.CompanyId=".$CompanyId." AND hrm_employee.EmpStatus='A' order by EmpCode ASC", $con); }  
$Sno=1; 
while($res=mysql_fetch_array($sql))
{ 

  $Ename=$res['Fname'].' '.$res['Sname'].' '.$res['Lname']; 
  $sqlDept=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$res['DepartmentId'], $con); 
  $resDept=mysql_fetch_assoc($sqlDept);
  $sqlDesig=mysql_query("select DesigName from hrm_designation where DesigId=".$res['DesigId'], $con); 
  $resDesig=mysql_fetch_assoc($sqlDesig);
 
  $schema_insert = "";
  $schema_insert .= $Sno.$sep;
  $schema_insert .= $res['EmpCode'].$sep;
  $schema_insert .= $Ename.$sep;
  $schema_insert .= $resDept['DepartmentCode'].$sep;  
  $schema_insert .= $resDesig['DesigName'].$sep;
  $schema_insert .= $res['CurrAdd'].$sep;
  $sqlS1=mysql_query("select StateName from hrm_state where StateId=".$res['CurrAdd_State'], $con); 
  $resS1=mysql_fetch_assoc($sqlS1);
  $schema_insert .= $resS1['StateName'].$sep;
  $sqlC1=mysql_query("select CityName from hrm_city where CityId=".$res['CurrAdd_City'], $con); 
  $resC1=mysql_fetch_assoc($sqlC1);
  $schema_insert .= $resC1['CityName'].$sep;
  $schema_insert .= $res['CurrAdd_PinNo'].$sep;
  $schema_insert .= $res['ParAdd'].$sep;
  $sqlS2=mysql_query("select StateName from hrm_state where StateId=".$res['ParAdd_State'], $con); 
  $resS2=mysql_fetch_assoc($sqlS2);
  $schema_insert .= $resS2['StateName'].$sep;
  $sqlC2=mysql_query("select CityName from hrm_city where CityId=".$res['ParAdd_City'], $con); 
  $resC2=mysql_fetch_assoc($sqlC2);
  $schema_insert .= $resC2['CityName'].$sep;
  $schema_insert .= $res['ParAdd_PinNo'].$sep;
  $schema_insert .= $res['EmgName'].$sep;
  $schema_insert .= $res['EmgContactNo'].$sep;
  $schema_insert .= $res['EmgRelation'].$sep;
  $schema_insert .= $res['EmgEmailId'].$sep;
  $schema_insert .= $res['Personal_RefName'].$sep;
  $schema_insert .= $res['Personal_RefContactNo'].$sep;
  $schema_insert .= $res['Personal_RefRelation'].$sep;
  $schema_insert .= $res['Personal_RefEmailId'].$sep;
  $schema_insert .= $res['Prof_RefName'].$sep;
  $schema_insert .= $res['Prof_RefContactNo'].$sep;
  $schema_insert .= $res['Prof_RefEmailId'].$sep;
  $schema_insert .= $res['Prof_RefCompany'].$sep;
  $schema_insert .= $res['Prof_RefDesig'].$sep;
  $schema_insert = str_replace($sep."$", "", $schema_insert);
  $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
  $schema_insert .= "\t";
  print(trim($schema_insert));
  print "\n";
  $Sno++;
}

?>

