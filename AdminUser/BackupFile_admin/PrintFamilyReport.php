<?php
require_once('config/config.php');
date_default_timezone_set('Asia/Calcutta');


if($_REQUEST['action']=='DeptFamily') 
{

if($_REQUEST['action']=='DeptFamily') { $CompanyId=$_REQUEST['c']; $YearId=$_REQUEST['y']; }
if($_REQUEST['value']!='All') { $sqlA=mysql_query("select DepartmentName from hrm_department where DepartmentId=".$_REQUEST['value'], $con); $resA=mysql_fetch_assoc($sqlA); $dept=$resA['DepartmentName']; }else {$dept='All';}

$xls_filename = 'Employee_Family_Details_'.$dept.'.xls';
 

header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=$xls_filename");
header("Pragma: no-cache");
header("Expires: 0");
$sep = "\t"; 
echo "Relation\tName\tQualification\tDOB\tOccupation\tCovid Dose-1\tCovid Dose-2\tDose-1 Certificate\tDose-2 Certificate";
print("\n");

if($_REQUEST['value']=='All') {$sql=mysql_query("select hrm_employee.*,DepartmentId,Married,Gender,Covid_Vaccin,Covid_Vaccin2,Covid_Vaccin_file,Covid_Vaccin2_file from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee_general.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee.CompanyId=".$CompanyId." AND hrm_employee.EmpStatus='A' order by EmpCode ASC", $con); }
else {$sql=mysql_query("select hrm_employee.*,DepartmentId,Married,Gender,Covid_Vaccin,Covid_Vaccin2,Covid_Vaccin_file,Covid_Vaccin2_file from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee_general.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee_general.DepartmentId=".$_REQUEST['value']." AND hrm_employee.CompanyId=".$CompanyId." AND hrm_employee.EmpStatus='A' order by EmpCode ASC", $con); } 
$Sno=1; 
while($res=mysql_fetch_array($sql))
{ 

  $Ename=$res['Fname'].' '.$res['Sname'].' '.$res['Lname']; 
  $sqlDept=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$res['DepartmentId'], $con); 
  $resDept=mysql_fetch_assoc($sqlDept);
 
  $schema_insert = "";
  $schema_insert .= 'Emp - '.$res['EmpCode'].$sep;
  $schema_insert .= $Ename.' - '.$resDept['DepartmentCode'].$sep;
  $schema_insert .= ''.$sep;
  $schema_insert .= ''.$sep;
  $schema_insert .= ''.$sep;
  $schema_insert .= $res['Covid_Vaccin'].$sep;
  $schema_insert .= $res['Covid_Vaccin2'].$sep;	
  if($res['Covid_Vaccin_file']!=''){$dos1='uploaded';}else{$dos1='';}
  if($res['Covid_Vaccin2_file']!=''){$dos2='uploaded';}else{$dos2='';}
  $schema_insert .= $dos1.$sep;
  $schema_insert .= $dos2.$sep;	
  
  $schema_insert = str_replace($sep."$", "", $schema_insert);
  $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
  $schema_insert .= "\t";
  print(trim($schema_insert));
  print "\n";
  
  $sqlEF=mysql_query("select * from hrm_employee_family where EmployeeID=".$res['EmployeeID'], $con); 
  $rowEF=mysql_num_rows($sqlEF); $resEF=mysql_fetch_assoc($sqlEF);
  $schema_insert = "";
  $schema_insert .= 'Father'.$sep;
  $schema_insert .= $resEF['Fa_SN'].'. '.$resEF['FatherName'].$sep;
  $schema_insert .= $resEF['FatherQuali'].$sep;
  if($resEF['FatherDOB']=='1970-01-01' OR $resEF['FatherDOB']=='0000-00-00'){$dob='';}else{$dob=$resEF['FatherDOB'];}
  $schema_insert .= $dob.$sep;		
  $schema_insert .= $resEF['FatherOccupation'].$sep;
  $schema_insert .= $resEF['Covid_VaccinF'].$sep;
  $schema_insert .= $resEF['Covid_VaccinF2'].$sep;
  if($resEF['Covid_VaccinF_file']!=''){$dosF1='uploaded';}else{$dosF1='';}
  if($resEF['Covid_VaccinF2_file']!=''){$dosF2='uploaded';}else{$dosF2='';}
  $schema_insert .= $dosF1.$sep;
  $schema_insert .= $dosF2.$sep;
  
  $schema_insert = str_replace($sep."$", "", $schema_insert);
  $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
  $schema_insert .= "\t";
  print(trim($schema_insert));
  print "\n";
  
  $schema_insert = "";
  $schema_insert .= 'Mother'.$sep;
  $schema_insert .= $resEF['Mo_SN'].'. '.$resEF['MotherName'].$sep;
  $schema_insert .= $resEF['MotherQuali'].$sep;
  if($resEF['MotherDOB']=='1970-01-01' OR $resEF['MotherDOB']=='0000-00-00'){$doMb='';}else{$doMb=$resEF['MotherDOB'];}
  $schema_insert .= $doMb.$sep;		
  $schema_insert .= $resEF['MotherOccupation'].$sep;
  $schema_insert .= $resEF['Covid_VaccinM'].$sep;
  $schema_insert .= $resEF['Covid_VaccinM2'].$sep;
  if($resEF['Covid_VaccinM_file']!=''){$dosM1='uploaded';}else{$dosM1='';}
  if($resEF['Covid_VaccinM2_file']!=''){$dosM2='uploaded';}else{$dosM2='';}
  $schema_insert .= $dosM1.$sep;
  $schema_insert .= $dosM2.$sep;
  
  $schema_insert = str_replace($sep."$", "", $schema_insert);
  $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
  $schema_insert .= "\t";
  print(trim($schema_insert));
  print "\n";
  
  if($res['Married']=='Y') 
  { 
   $schema_insert = "";
   if($res['Gender']=='M'){$schema_insert .= 'Wife'.$sep;} else{$schema_insert .= 'Husband'.$sep;}
   $schema_insert .= $resEF['HW_SN'].'. '.$resEF['HusWifeName'].$sep;
   $schema_insert .= $resEF['HusWifeQuali'].$sep;
   if($resEF['HusWifeDOB']=='1970-01-01' OR $resEF['HusWifeDOB']=='0000-00-00'){$doWb='';}else{$doWb=$resEF['HusWifeDOB'];}
   $schema_insert .= $doWb.$sep;		
   $schema_insert .= $resEF['HusWifeOccupation'].$sep;
   $schema_insert .= $resEF['Covid_VaccinW'].$sep;
   $schema_insert .= $resEF['Covid_VaccinW2'].$sep;
   if($resEF['Covid_VaccinW_file']!=''){$dosW1='uploaded';}else{$dosW1='';}
   if($resEF['Covid_VaccinW2_file']!=''){$dosW2='uploaded';}else{$dosW2='';}
   $schema_insert .= $dosW1.$sep;
   $schema_insert .= $dosW2.$sep;
   
   $schema_insert = str_replace($sep."$", "", $schema_insert);
   $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
   $schema_insert .= "\t";
   print(trim($schema_insert));
   print "\n";
  }
  
  $sqlEF2=mysql_query("select * from hrm_employee_family2 where EmployeeID=".$res['EmployeeID'], $con); 
  $rowEF2=mysql_num_rows($sqlEF2); 
  if($rowEF2>0)
  { 
   while($resEF2=mysql_fetch_array($sqlEF2)) 
   {
    $schema_insert = "";
    $schema_insert .= $resEF2['FamilyRelation'].$sep;
    $schema_insert .= $resEF2['Fa2_SN'].'. '.$resEF2['FamilyName'].$sep;
    $schema_insert .= $resEF2['FamilyQualification'].$sep;
    if($resEF2['FamilyDOB']=='1970-01-01' OR $resEF2['FamilyDOB']=='0000-00-00'){$doWbF='';}else{$doWbF=$resEF2['FamilyDOB'];}
    $schema_insert .= $doWbF.$sep;		
    $schema_insert .= $resEF2['FamilyOccupation'].$sep;
    $schema_insert .= $resEF2['Covid_Vaccin'].$sep;
    $schema_insert .= $resEF2['Covid_Vaccin2'].$sep;
    if($resEF2['Covid_Vaccin_file']!=''){$dosO1='uploaded';}else{$dosO1='';}
    if($resEF2['Covid_Vaccin2_file']!=''){$dosO2='uploaded';}else{$dosO2='';}
    $schema_insert .= $dosO1.$sep;
    $schema_insert .= $dosO2.$sep;
    
    $schema_insert = str_replace($sep."$", "", $schema_insert);
    $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
    $schema_insert .= "\t";
    print(trim($schema_insert));
    print "\n";
   }
  } 
  
  print "\n";
  $no++;
}




} //if($_REQUEST['action']=='DeptFamily') 

elseif($_REQUEST['action']=='Dept2Family') 
{
 
 
 if($_REQUEST['action']=='Dept2Family') { $CompanyId=$_REQUEST['c']; $YearId=$_REQUEST['y']; }
if($_REQUEST['value']!='All') { $sqlA=mysql_query("select DepartmentName from hrm_department where DepartmentId=".$_REQUEST['value'], $con); $resA=mysql_fetch_assoc($sqlA); $dept=$resA['DepartmentName']; }else {$dept='All';}

$xls_filename = 'Employee_Family_Details_'.$dept.'.xls';
 

header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=$xls_filename");
header("Pragma: no-cache");
header("Expires: 0");
$sep = "\t"; 
echo "EmpCode\tName\tDepartment\tCovid Dose-1\tCovid Dose-2\tDose-1 Certificate\tDose-2 Certificate";
print("\n");

if($_REQUEST['value']=='All') {$sql=mysql_query("select hrm_employee.*,DepartmentId,Married,Gender,Covid_Vaccin,Covid_Vaccin2,Covid_Vaccin_file,Covid_Vaccin2_file from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee_general.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee.CompanyId=".$CompanyId." AND hrm_employee.EmpStatus='A' order by EmpCode ASC", $con); }
else {$sql=mysql_query("select hrm_employee.*,DepartmentId,Married,Gender,Covid_Vaccin,Covid_Vaccin2,Covid_Vaccin_file,Covid_Vaccin2_file from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee_general.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee_general.DepartmentId=".$_REQUEST['value']." AND hrm_employee.CompanyId=".$CompanyId." AND hrm_employee.EmpStatus='A' order by EmpCode ASC", $con); } 
$Sno=1; 
while($res=mysql_fetch_array($sql))
{ 

  $Ename=$res['Fname'].' '.$res['Sname'].' '.$res['Lname']; 
  $sqlDept=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$res['DepartmentId'], $con); 
  $resDept=mysql_fetch_assoc($sqlDept);
 
  $schema_insert = "";
  $schema_insert .= $res['EmpCode'].$sep;
  $schema_insert .= $Ename.$sep;
  $schema_insert .= $resDept['DepartmentCode'].$sep;
  $schema_insert .= $res['Covid_Vaccin'].$sep;
  $schema_insert .= $res['Covid_Vaccin2'].$sep;	
  if($res['Covid_Vaccin_file']!=''){$dos1='uploaded';}else{$dos1='';}
  if($res['Covid_Vaccin2_file']!=''){$dos2='uploaded';}else{$dos2='';}
  $schema_insert .= $dos1.$sep;
  $schema_insert .= $dos2.$sep;	
  
  $schema_insert = str_replace($sep."$", "", $schema_insert);
  $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
  $schema_insert .= "\t";
  print(trim($schema_insert));
  print "\n";
  
}   
    
}


?>

