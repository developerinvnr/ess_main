<?php session_start(); require_once('config/config.php');
date_default_timezone_set('Asia/Calcutta');
$xls_filename = 'Opinion_report_('.$_REQUEST['v'].')_'.date('Y-m-d').'.xls'; 

header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=$xls_filename");
header("Pragma: no-cache");
header("Expires: 0");
$sep = "\t"; 
 
$sql="select o.*,EmpStatus,EmpCode,Fname,Sname,Lname,DepartmentName from hrm_opinion o inner join hrm_employee e on o.EmployeeID=e.EmployeeID inner join hrm_employee_general g on o.EmployeeID=g.EmployeeID inner join hrm_department d on g.DepartmentId=d.DepartmentId where o.OpenionName='".$_REQUEST['v']."' AND e.CompanyId=".$_REQUEST['c']." order by e.EmpCode ASC"; $result = mysql_query($sql);

echo "SNo\tCode\tName\tDepartment\tE-Status\tVoting Date\tCast\tScheme";
print("\n");

$Sno=1;
while($res = mysql_fetch_array($result))
{
  $schema_insert = "";
  $schema_insert .= $Sno.$sep;
  $schema_insert .= $res['EmpCode'].$sep;
  $schema_insert .= $res['Fname'].' '.$res['Sname'].' '.$res['Lname'].$sep;
  $schema_insert .= $res['DepartmentName'].$sep ;
  $schema_insert .= $res['EmpStatus'].$sep ;
  $schema_insert .= date("d-m-Y",strtotime($res['OpenionDate'])).$sep;
  
  if($res['Cast']!='Any Other'){$Cast=$res['Cast'];}else{$Cast=$res['CastOther'];}
  $schema_insert .= $Cast.$sep;
  $Scheme=$res['Scheme1'].', '.$res['Scheme2'].', '.$res['Scheme3'].', '.$res['Scheme4'];
  $schema_insert .= $Scheme.$sep;
  				  
  $schema_insert = str_replace($sep."$", "", $schema_insert);
  $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
  $schema_insert .= "\t";
  print(trim($schema_insert));
  print "\n";
  
  $Sno++; 
}
?>