<?php 
require_once('config/config.php');
if($_REQUEST['action']='MorEveExport') 
{ 
 if($_REQUEST['m']==1){$SelM='January';}elseif($_REQUEST['m']==2){$SelM='February';}elseif($_REQUEST['m']==3){$SelM='March';}elseif($_REQUEST['m']==4){$SelM='April';}elseif($_REQUEST['m']==5){$SelM='May';}elseif($_REQUEST['m']==6){$SelM='June';}elseif($_REQUEST['m']==7){$SelM='July';}elseif($_REQUEST['m']==8){$SelM='August';}elseif($_REQUEST['m']==9){$SelM='September';}elseif($_REQUEST['m']==10){$SelM='October';}elseif($_REQUEST['m']==11){$SelM='November';}elseif($_REQUEST['m']==12){$SelM='December';}
 
$BY=date("Y")-1;
if($_REQUEST['Y']>=date("Y")){ $AttTable='hrm_employee_attendance'; }
elseif($_REQUEST['Y']==$BY AND date("m")=='01' AND $_REQUEST['m']==12){ $AttTable='hrm_employee_attendance'; }
elseif($_REQUEST['Y']==$BY AND $_REQUEST['m']<12){ $AttTable='hrm_employee_attendance_'.$_REQUEST['Y']; }
else{$AttTable='hrm_employee_attendance_'.$_REQUEST['Y']; }
 
  
 if($_REQUEST['D']=='All') {$DeptV='All_Employee';}
 else{ $sqlDeptV=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$_REQUEST['D'], $con); $resDeptV=mysql_fetch_assoc($sqlDeptV); 
       $DeptV=$resDeptV['DepartmentCode'];}
  
#  Create the Column Headings
//$csv_output .= '"Sn",';
$csv_output .= '"EmpCode",'; 
$csv_output .= '"Name",';
$csv_output .= '"Department",';
$csv_output .= '"Location",'; 
$csv_output .= '"1",'; $csv_output .= '"2",'; $csv_output .= '"3",'; $csv_output .= '"4",';	$csv_output .= '"5",'; $csv_output .= '"6",'; $csv_output .= '"7",';	
$csv_output .= '"8",'; $csv_output .= '"9",'; $csv_output .= '"10",'; $csv_output .= '"11",'; $csv_output .= '"12",';	$csv_output .= '"13",'; $csv_output .= '"14",'; 
$csv_output .= '"15",'; $csv_output .= '"16",'; $csv_output .= '"17",'; $csv_output .= '"18",'; $csv_output .= '"19",';	$csv_output .= '"20",'; $csv_output .= '"21",';
$csv_output .= '"22",'; $csv_output .= '"23",'; $csv_output .= '"24",'; $csv_output .= '"25",'; $csv_output .= '"26",';	$csv_output .= '"27",'; $csv_output .= '"28",'; 
$csv_output .= '"29",'; $csv_output .= '"30",'; $csv_output .= '"31",'; 
$csv_output .= "\n";		

# Get Users Details form the DB #$result = mysql_query("SELECT * from formResults WHERE formID = '$formID'" );
if($_REQUEST['D']!='All'){ $sql=mysql_query("select hrm_employee.EmployeeID,EmpCode,Fname,Sname,Lname,g.HqId, g.TerrId, department_name, sub_department_name, section_name, designation_name, grade_name, state_name, city_village_name, territory_name,RepEmployeeID from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID left join core_departments dept on g.DepartmentId=dept.id
  left join core_sub_department_master subdept on g.SubDepartmentId=subdept.id
  left join core_section sec on g.EmpSection=sec.id
  left join core_designation desig on g.DesigId=desig.id
  left join core_grades gr on g.GradeId=gr.id
  left join core_states st on g.CostCenter=st.id
  left join core_city_village_by_state vlg on g.HqId=vlg.id
  left join core_territory Tr on g.TerrId=Tr.id where hrm_employee.EmpStatus='A' AND hrm_employee_general.DepartmentId=".$_REQUEST['D']." AND hrm_employee.CompanyId=".$_REQUEST['C']." order by ECode ASC", $con); }
if($_REQUEST['D']=='All'){ $sql=mysql_query("select hrm_employee.EmployeeID,EmpCode,Fname,Sname,Lname,g.HqId, g.TerrId, department_name, sub_department_name, section_name, designation_name, grade_name, state_name, city_village_name, territory_name,RepEmployeeID from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID left join core_departments dept on g.DepartmentId=dept.id
  left join core_sub_department_master subdept on g.SubDepartmentId=subdept.id
  left join core_section sec on g.EmpSection=sec.id
  left join core_designation desig on g.DesigId=desig.id
  left join core_grades gr on g.GradeId=gr.id
  left join core_states st on g.CostCenter=st.id
  left join core_city_village_by_state vlg on g.HqId=vlg.id
  left join core_territory Tr on g.TerrId=Tr.id where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$_REQUEST['C']." order by ECode ASC", $con); } 
$Sno=1; $rows=mysql_num_rows($sql); $sn=1; while($res=mysql_fetch_array($sql)) { 
if($res['Sname']==''){ $Ename=trim($res['Fname']).' '.trim($res['Lname']); }
else{ $Ename=trim($res['Fname']).' '.trim($res['Sname']).' '.trim($res['Lname']); }    
//$Ename=$res['Fname'].' '.$res['Sname'].' '.$res['Lname']; 
$month=$_REQUEST['m'];


//$csv_output .= '"'.str_replace('"', '""', $sn).'",';
$csv_output .= '"'.str_replace('"', '""', $res['EmpCode']).'",';
$csv_output .= '"'.str_replace('"', '""', $Ename).'",';
$csv_output .= '"'.str_replace('"', '""',$res['department_name']).'",';
if($res['TerrId']>0){$Hq=$res['territory_name'];}else{$Hq=$res['city_village_name']; }
$csv_output .= '"'.str_replace('"', '""', $Hq).'",';
 
for($i=1; $i<=31; $i++) { $sqlAtt=mysql_query("SELECT * FROM ".$AttTable." WHERE EmployeeID =".$res['EmployeeID']." AND AttDate='".date($_REQUEST['Y']."-".$_REQUEST['m']."-".$i)."'", $con); $resAtt=mysql_fetch_array($sqlAtt); 
$csv_output .= '"'.str_replace('"', '""', $resAtt['AttValue']).'",';
}
$csv_output .= "\n";
$sn++; }

# Close the MySql connection
mysql_close($con);
# Set the headers so the file downloads
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Content-Length: " . strlen($csv_output));
header("Content-type: text/x-csv");
header("Content-Disposition: attachment; filename=Attendance_Reports_".$DeptV."-".$SelM."-".$_REQUEST['Y'].".csv");
echo $csv_output;
exit;
}
?>