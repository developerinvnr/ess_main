<?php
require_once('config/config.php');
if($_REQUEST['action']='AttWTExport') 
{ 
  $SelM=date("F",strtotime(date("Y-".$_REQUEST['m']."-01")));
 
 if($_REQUEST['D']=='All') {$DeptV='All_Employee';}
 else{ $sqlDeptV=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$_REQUEST['D'], $con); $resDeptV=mysql_fetch_assoc($sqlDeptV); $DeptV=$resDeptV['DepartmentCode'];}
 
$xls_filename = 'Attendance_Reports_'.$DeptV.'-'.$SelM.'-'.$_REQUEST['Y'].'.xls'; // Define Excel (.xls) file name
// Header info settings
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=$xls_filename");
header("Pragma: no-cache");
header("Expires: 0");
 
/***** Start of Formatting for Excel *****/
// Define separator (defines columns in excel &amp; tabs in word)
$sep = "\t"; // tabbed character
 
// Start of printing column names as names of MySQL fields
echo "EmpCode\tName\tDepartmnet \tLocation\t1\t2\t3\t4\t5\t6\t7\t8\t9\t10\t11\t12\t13\t14\t15\t16\t17\t18\t19\t20\t21\t22\t23\t24\t25\t26\t27\t28\t29\t30\t31";
print("\n");
// End of printing column names

if($_REQUEST['D']!='All'){ $sql=mysql_query("select e.EmployeeID,EmpCode,Fname,Sname,Lname,RepEmployeeID,DepartmentName,HqName,TimeApply from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_department d ON g.DepartmentId=d.DepartmentId INNER JOIN hrm_headquater hq ON g.HqId=hq.HqId where e.EmpStatus='A' AND g.DepartmentId=".$_REQUEST['D']." AND e.CompanyId=".$_REQUEST['C']." order by e.EmpCode ASC", $con); }
if($_REQUEST['D']=='All'){ $sql=mysql_query("select e.EmployeeID,EmpCode,Fname,Sname,Lname,RepEmployeeID,DepartmentName,HqName,TimeApply from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_department d ON g.DepartmentId=d.DepartmentId INNER JOIN hrm_headquater hq ON g.HqId=hq.HqId where e.EmpStatus='A' AND e.CompanyId=".$_REQUEST['C']." order by e.EmpCode ASC", $con); } 
$sn=1; 
// Start while loop to get data
while($res = mysql_fetch_array($sql))
{
  if($res['TimeApply']=='Y')
  {
  $Ename=$res['Fname'].' '.$res['Sname'].' '.$res['Lname']; $month=$_REQUEST['m'];
  
  $schema_insert = "";
  $schema_insert .= $res['EmpCode'].$sep;
  $schema_insert .= $Ename.$sep;
  $schema_insert .= $res['DepartmentName'].$sep;
  $schema_insert .= $res['HqName'].$sep;
for($i=1; $i<=31; $i++) { $sqlAtt=mysql_query("SELECT AttValue,Inn,Outt FROM hrm_employee_attendance WHERE EmployeeID =".$res['EmployeeID']." AND AttDate='".date($_REQUEST['Y']."-".$_REQUEST['m']."-".$i)."'", $con); $resAtt=mysql_fetch_array($sqlAtt); 
  if(date("w",strtotime(date($_REQUEST['Y']."-".$_REQUEST['m']."-".$i)))!=0)
  {
   $schema_insert .= str_replace('"', '""', $resAtt['AttValue']).' - '.date("H:i",strtotime($resAtt['Inn'])).' - '.date("H:i",strtotime($resAtt['Outt'])).$sep;
  }
  else
  {
   $schema_insert .= ''.$sep;
  }
  
}  
  $schema_insert = str_replace($sep."$", "", $schema_insert);
  $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
  $schema_insert .= "\t";
  print(trim($schema_insert));
  print "\n";
  
  $sn++;
  }
}

}
?>