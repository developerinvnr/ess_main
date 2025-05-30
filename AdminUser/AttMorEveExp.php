<?php
require_once('config/config.php');

if(isset($_REQUEST['m']) && isset($_REQUEST['d']))
{
 $sD=mysql_query("select department_name, department_code from core_departments where id=".$_REQUEST['d'],$con);
 $rD=mysql_fetch_assoc($sD);
$xls_filename = "InOutTime_Reports_".$rD['department_code']."_".date("F",strtotime(date("Y-".$_REQUEST['m']."-01"))).".xls";
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=$xls_filename");
header("Pragma: no-cache"); header("Expires: 0"); $sep = "\t"; 
echo "Sn\tEmpCode\tName\tDepartment\tLocation\tReporting\tDate\tReports\tSignIn Time\tSignIn Location\tSignOut Time\tSignOut Location";
print("\n");

$t=date("t",strtotime(date($_REQUEST['y']."-".$_REQUEST['m']."-01"))); 

$sql = mysql_query("select r.*,EmpCode,
  CASE WHEN DR ='Y' THEN 'Dr.'
       WHEN (Gender ='F' AND Married ='Y') THEN 'Mrs.'
       WHEN (Gender ='F' AND Married ='N') THEN 'Ms.'
       ELSE 'Mr.'
       END as Title, CONCAT(Fname , ' ' , Sname , ' ' , Lname) as Name, g.HqId, g.TerrId, ReportingName, city_village_name, territory_name from hrm_employee_moreve_report_".$_REQUEST['y']." r inner join hrm_employee e on r.EmployeeID=e.EMployeeID inner join hrm_employee_general g on r.EmployeeID=g.EmployeeID inner join hrm_employee_personal p on r.EmployeeID=p.EmployeeID left join core_city_village_by_state vlg on g.HqId=vlg.id
  left join core_territory Tr on g.TerrId=Tr.id where e.EmpStatus='A' AND e.CompanyId=".$_REQUEST['c']." AND g.DepartmentId=".$_REQUEST['d']." AND r.MorEveDate>='".$_REQUEST['y']."-".$_REQUEST['m']."-01' and r.MorEveDate<='".$_REQUEST['y']."-".$_REQUEST['m']."-".$t."' order by EmpCode, MorEveDate", $con);

$no=1;
while($res=mysql_fetch_array($sql))
{
  $schema_insert = "";
  $schema_insert .= $no.$sep;
  $schema_insert .= $res['EmpCode'].$sep;
  $schema_insert .= $res['Name'].$sep;
  $schema_insert .= $rD['department_name'].$sep;	
  $schema_insert .= $res['HqName'].$sep;
  $schema_insert .= $res['ReportingName'].$sep;
  $schema_insert .= $res['MorDateTime'].$sep;
  $schema_insert .= $res['MorReports'].$sep;
  $schema_insert .= date("H:i:s",strtotime($res['SignIn_Time'])).$sep;
  $schema_insert .= $res['SignIn_Loc'].$sep;
  
  if($res['SignOut_Long']!=''){ $OutTime=date("H:i:s",strtotime($res['SignOut_Time'])); $OutLoc=$res['SignOut_Loc']; }
  else{ $OutTime=''; $OutLoc=''; }
  $schema_insert .= $OutTime.$sep;
  $schema_insert .= $OutLoc.$sep;	
			  
  $schema_insert = str_replace($sep."$", "", $schema_insert);
  $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
  $schema_insert .= "\t";
  print(trim($schema_insert)); print "\n"; 
  $no++;
}

}
?>