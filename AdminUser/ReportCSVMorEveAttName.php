<?php 
require_once('config/config.php');
if($_REQUEST['action']='MorEveExport') 
{ 
 if($_REQUEST['m']==1){$SelM='January';}elseif($_REQUEST['m']==2){$SelM='February';}elseif($_REQUEST['m']==3){$SelM='March';}elseif($_REQUEST['m']==4){$SelM='April';}elseif($_REQUEST['m']==5){$SelM='May';}elseif($_REQUEST['m']==6){$SelM='June';}elseif($_REQUEST['m']==7){$SelM='July';}elseif($_REQUEST['m']==8){$SelM='August';}elseif($_REQUEST['m']==9){$SelM='September';}elseif($_REQUEST['m']==10){$SelM='October';}elseif($_REQUEST['m']==11){$SelM='November';}elseif($_REQUEST['m']==12){$SelM='December';}
  
 $sqlEn=mysql_query("select Fname,Sname,Lname from hrm_employee where EmployeeID=".$_REQUEST['En'], $con); $resEn=mysql_fetch_assoc($sqlEn);
 $Ename=$resEn['Fname'].' '.$resEn['Sname'].' '.$resEn['Lname'];
    
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
$sql=mysql_query("select r.*,EmpCode,Fname,Sname,Lname,g.HqId, g.TerrId, department_name, sub_department_name, section_name, designation_name, grade_name, state_name, city_village_name, territory_name,RepEmployeeID,Att,MorEveDate,MorDateTime,MorReports,EveDateTime,EveReports from hrm_employee_moreve_report_".$_REQUEST['Y']." r INNER JOIN hrm_employee e ON r.EmployeeID=e.EmployeeID INNER JOIN hrm_employee_general g ON r.EmployeeID=g.EmployeeID left join core_departments dept on g.DepartmentId=dept.id
  left join core_sub_department_master subdept on g.SubDepartmentId=subdept.id
  left join core_section sec on g.EmpSection=sec.id
  left join core_designation desig on g.DesigId=desig.id
  left join core_grades gr on g.GradeId=gr.id
  left join core_states st on g.CostCenter=st.id
  left join core_city_village_by_state vlg on g.HqId=vlg.id
  left join core_territory Tr on g.TerrId=Tr.id where e.EmpStatus!='De' AND e.EmployeeID=".$_REQUEST['En']." AND e.CompanyId=".$_REQUEST['C']." AND r.MorEveDate>='".$_REQUEST['Y']."-".$_REQUEST['m']."-01' AND r.MorEveDate<='".$_REQUEST['Y']."-".$_REQUEST['m']."-31' order by MorEveDate ASC, EmployeeID ASC", $con);

$Sno=1; $rows=mysql_num_rows($sql); $sn=1; while($res=mysql_fetch_array($sql)) { 
$month=$_REQUEST['m'];

$sqlRemp=mysql_query("select Fname,Sname,Lname from hrm_employee where EmployeeID=".$res['RepEmployeeID'], $con); $resRemp=mysql_fetch_assoc($sqlRemp);

$csv_output .= '"'.str_replace('"', '""', $sn).'",';
$csv_output .= '"'.str_replace('"', '""', $res['EmpCode']).'",';

if($res['Sname']==''){ $Ename=trim($res['Fname']).' '.trim($res['Lname']); }
else{ $Ename=trim($res['Fname']).' '.trim($res['Sname']).' '.trim($res['Lname']); }
$csv_output .= '"'.str_replace('"', '""', $Ename).'",';
//$csv_output .= '"'.str_replace('"', '""', $res['Fname'].' '.$res['Sname'].' '.$res['Lname']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['department_name']).'",'; 
$csv_output .= '"'.str_replace('"', '""', $res['designation_name']).'",';

if($res['TerrId']>0){$Hq=$res['territory_name'];}else{$Hq=$res['city_village_name']; }

$csv_output .= '"'.str_replace('"', '""', $Hq).'",';
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
header("Content-Disposition: attachment; filename=MorEve_Reports_".$Ename."-".$SelM."-".$_REQUEST['Y'].".csv");
echo $csv_output;
exit;
}
?>