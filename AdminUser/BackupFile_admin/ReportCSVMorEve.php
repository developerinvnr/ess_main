<?php 
require_once('config/config.php');

if($_REQUEST['action']='MorEveExport') 
{

 if($_REQUEST['m']==1){$SelM='January';}elseif($_REQUEST['m']==2){$SelM='February';}elseif($_REQUEST['m']==3){$SelM='March';}elseif($_REQUEST['m']==4){$SelM='April';}elseif($_REQUEST['m']==5){$SelM='May';}elseif($_REQUEST['m']==6){$SelM='June';}elseif($_REQUEST['m']==7){$SelM='July';}elseif($_REQUEST['m']==8){$SelM='August';}elseif($_REQUEST['m']==9){$SelM='September';}elseif($_REQUEST['m']==10){$SelM='October';}elseif($_REQUEST['m']==11){$SelM='November';}elseif($_REQUEST['m']==12){$SelM='December';}
  
 if($_REQUEST['D']=='All') {$DeptV='All_Employee';}
 else{ $sqlDeptV=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$_REQUEST['D'], $con); $resDeptV=mysql_fetch_assoc($sqlDeptV); 
       $DeptV=$resDeptV['DepartmentCode'];}
	   

$xls_filename = "MorEve_Reports_".$DeptV."-".$SelM."-".$_REQUEST['Y'].".xls";
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=$xls_filename");
header("Pragma: no-cache"); header("Expires: 0"); $sep = "\t"; 
echo "Sn\tEmpCode\tName\tDepartment\tDesignation\tLocation\tReporting\tDate\tAttendance\tMorning DateTime\tMorning Reports\tEvening DateTime\tEvening Reports";
print("\n");

# Get Users Details form the DB #$result = mysql_query("SELECT * from formResults WHERE formID = '$formID'" );
if($_REQUEST['D']!='All'){ $sql=mysql_query("select EmpCode,Fname,Sname,Lname,DepartmentId,DesigId,HqId,RepEmployeeID,Att,MorEveDate,MorDateTime,MorReports,EveDateTime,EveReports,r.* from hrm_employee_moreve_report_".$_REQUEST['Y']." r INNER JOIN hrm_employee e ON r.EmployeeID=e.EmployeeID INNER JOIN hrm_employee_general g ON r.EmployeeID=g.EmployeeID where e.EmpStatus!='De' AND g.DepartmentId=".$_REQUEST['D']." AND e.CompanyId=".$_REQUEST['C']." AND r.MorEveDate>='".$_REQUEST['Y']."-".$_REQUEST['m']."-01' AND r.MorEveDate<='".$_REQUEST['Y']."-".$_REQUEST['m']."-31' order by MorEveDate ASC, EmployeeID ASC", $con);}
if($_REQUEST['D']=='All'){ 

$sql=mysql_query("select EmpCode,Fname,Sname,Lname,DepartmentId,DesigId,HqId,RepEmployeeID,Att,MorEveDate,MorDateTime,MorReports,EveDateTime,EveReports,r.* from hrm_employee_moreve_report_".$_REQUEST['Y']." r INNER JOIN hrm_employee e ON r.EmployeeID=e.EmployeeID INNER JOIN hrm_employee_general g ON r.EmployeeID=g.EmployeeID where e.EmpStatus!='De' AND e.CompanyId=".$_REQUEST['C']." AND r.MorEveDate>='".$_REQUEST['Y']."-".$_REQUEST['m']."-01' AND r.MorEveDate<='".$_REQUEST['Y']."-".$_REQUEST['m']."-31' order by MorEveDate ASC, EmployeeID ASC", $con);} $Sno=1; $rows=mysql_num_rows($sql); 

$sn=1; while($res=mysql_fetch_array($sql)) 
{ 
$Ename=$res['Fname'].' '.$res['Sname'].' '.$res['Lname']; $month=$_REQUEST['m'];
$sqlDept=mysql_query("select DepartmentCode,DepartmentName from hrm_department where DepartmentId=".$res['DepartmentId'], $con); $resDept=mysql_fetch_assoc($sqlDept);
$sqlDesig=mysql_query("select DesigCode,DesigName from hrm_designation where DesigId=".$res['DesigId'], $con); $resDesig=mysql_fetch_assoc($sqlDesig);
$sqlHQ=mysql_query("select HqName from hrm_headquater where HqId=".$res['HqId'], $con); $resHQ=mysql_fetch_assoc($sqlHQ);
$sqlRemp=mysql_query("select Fname,Sname,Lname from hrm_employee where EmployeeID=".$res['RepEmployeeID'], $con); $resRemp=mysql_fetch_assoc($sqlRemp);


  $schema_insert = "";
  $schema_insert .= $sn.$sep;	
  $schema_insert .= $res['EmpCode'].$sep;
  $schema_insert .= $res['Fname'].' '.$res['Sname'].' '.$res['Lname'].$sep;
  $schema_insert .= $resDept['DepartmentName'].$sep;
  $schema_insert .= $resDesig['DesigName'].$sep;
  $schema_insert .= $resHQ['HqName'].$sep;
  $schema_insert .= $resRemp['Fname'].' '.$resRemp['Sname'].' '.$resRemp['Lname'].$sep;
  $schema_insert .= $res['MorEveDate'].$sep;
  $schema_insert .= $res['Att'].$sep;
  $schema_insert .= $res['MorDateTime'].$sep;
  $schema_insert .= $res['MorReports'].$sep;
  $schema_insert .= $res['EveDateTime'].$sep;
  $schema_insert .= $res['EveReports'].$sep;
  		  
  $schema_insert = str_replace($sep."$", "", $schema_insert);
  $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
  $schema_insert .= "\t";
  print(trim($schema_insert)); print "\n"; 
  $sn++;
}

} //if($_REQUEST['action']='MorEveExport')
?>







<?php /*
require_once('config/config.php');
if($_REQUEST['action']='MorEveExport') 
{ 
 if($_REQUEST['m']==1){$SelM='January';}elseif($_REQUEST['m']==2){$SelM='February';}elseif($_REQUEST['m']==3){$SelM='March';}elseif($_REQUEST['m']==4){$SelM='April';}elseif($_REQUEST['m']==5){$SelM='May';}elseif($_REQUEST['m']==6){$SelM='June';}elseif($_REQUEST['m']==7){$SelM='July';}elseif($_REQUEST['m']==8){$SelM='August';}elseif($_REQUEST['m']==9){$SelM='September';}elseif($_REQUEST['m']==10){$SelM='October';}elseif($_REQUEST['m']==11){$SelM='November';}elseif($_REQUEST['m']==12){$SelM='December';}
  
 if($_REQUEST['D']=='All') {$DeptV='All_Employee';}
 else{ $sqlDeptV=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$_REQUEST['D'], $con); $resDeptV=mysql_fetch_assoc($sqlDeptV); 
       $DeptV=$resDeptV['DepartmentCode'];}
  
#  Create the Column Headings
$csv_output .= '"Sn",';
$csv_output .= '"EmpCode",'; 
$csv_output .= '"Name",';
$csv_output .= '"Department",'; 
$csv_output .= '"Designation",';
$csv_output .= '"Location",';
$csv_output .= '"Reporting",';
$csv_output .= '"Date",';
$csv_output .= '"Attendance",';	
$csv_output .= '"Morning DateTime",';	
$csv_output .= '"Morning Reports",';
$csv_output .= '"Evening DateTime",';	
$csv_output .= '"Evening Reports",';
$csv_output .= "\n";		


# Get Users Details form the DB #$result = mysql_query("SELECT * from formResults WHERE formID = '$formID'" );
if($_REQUEST['D']!='All'){ $sql=mysql_query("select EmpCode,Fname,Sname,Lname,DepartmentId,DesigId,HqId,RepEmployeeID,Att,MorEveDate,MorDateTime,MorReports,EveDateTime,EveReports,r.* from hrm_employee_moreve_report r INNER JOIN hrm_employee e ON r.EmployeeID=e.EmployeeID INNER JOIN hrm_employee_general g ON r.EmployeeID=g.EmployeeID where e.EmpStatus!='De' AND g.DepartmentId=".$_REQUEST['D']." AND e.CompanyId=".$_REQUEST['C']." AND r.MorEveDate>='".$_REQUEST['Y']."-".$_REQUEST['m']."-01' AND r.MorEveDate<='".$_REQUEST['Y']."-".$_REQUEST['m']."-31' order by MorEveDate ASC, EmployeeID ASC", $con);}
if($_REQUEST['D']=='All'){ 

$sql=mysql_query("select EmpCode,Fname,Sname,Lname,DepartmentId,DesigId,HqId,RepEmployeeID,Att,MorEveDate,MorDateTime,MorReports,EveDateTime,EveReports,r.* from hrm_employee_moreve_report r INNER JOIN hrm_employee e ON r.EmployeeID=e.EmployeeID INNER JOIN hrm_employee_general g ON r.EmployeeID=g.EmployeeID where e.EmpStatus!='De' AND e.CompanyId=".$_REQUEST['C']." AND r.MorEveDate>='".$_REQUEST['Y']."-".$_REQUEST['m']."-01' AND r.MorEveDate<='".$_REQUEST['Y']."-".$_REQUEST['m']."-31' order by MorEveDate ASC, EmployeeID ASC", $con);}
$Sno=1; $rows=mysql_num_rows($sql); $sn=1; while($res=mysql_fetch_array($sql)) { 
$Ename=$res['Fname'].' '.$res['Sname'].' '.$res['Lname']; $month=$_REQUEST['m'];
$sqlDept=mysql_query("select DepartmentCode,DepartmentName from hrm_department where DepartmentId=".$res['DepartmentId'], $con); $resDept=mysql_fetch_assoc($sqlDept);
$sqlDesig=mysql_query("select DesigCode,DesigName from hrm_designation where DesigId=".$res['DesigId'], $con); $resDesig=mysql_fetch_assoc($sqlDesig);
$sqlHQ=mysql_query("select HqName from hrm_headquater where HqId=".$res['HqId'], $con); $resHQ=mysql_fetch_assoc($sqlHQ);
$sqlRemp=mysql_query("select Fname,Sname,Lname from hrm_employee where EmployeeID=".$res['RepEmployeeID'], $con); $resRemp=mysql_fetch_assoc($sqlRemp);

$csv_output .= '"'.str_replace('"', '""', $sn).'",';
$csv_output .= '"'.str_replace('"', '""', $res['EmpCode']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['Fname'].' '.$res['Sname'].' '.$res['Lname']).'",';
$csv_output .= '"'.str_replace('"', '""', $resDept['DepartmentName']).'",'; 
$csv_output .= '"'.str_replace('"', '""', $resDesig['DesigName']).'",';
$csv_output .= '"'.str_replace('"', '""', $resHQ['HqName']).'",';
$csv_output .= '"'.str_replace('"', '""', $resRemp['Fname'].' '.$resRemp['Sname'].' '.$resRemp['Lname']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['MorEveDate']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['Att']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['MorDateTime']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['MorReports']).'",';	
$csv_output .= '"'.str_replace('"', '""', $res['EveDateTime']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['EveReports']).'",';
$csv_output .= "\n";
$sn++; }

# Close the MySql connection
mysql_close($con);
# Set the headers so the file downloads
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Content-Length: " . strlen($csv_output));
header("Content-type: text/x-csv");
header("Content-Disposition: attachment; filename=MorEve_Reports_".$DeptV."-".$SelM."-".$_REQUEST['Y'].".csv");
echo $csv_output;
exit;
}
*/
?>