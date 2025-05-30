<?php 
require_once('config/config.php');
if($_REQUEST['y']!=0){ $sY=mysql_query("select * from hrm_year where YearId=".$_REQUEST['y']."", $con); $rY=mysql_fetch_assoc($sY);  
$FD=date("Y",strtotime($rY['FromDate'])); $TD=date("Y",strtotime($rY['ToDate'])); $PRD=$FD.'-'.$TD; } else {$PRD='ALL'; }
/*************************************************************************************************************/

if($_REQUEST['action']='RsOnBoardingExport') 
{ 
 
$csv_output .= '"Month",';
$csv_output .= '"SN",'; 
$csv_output .= '"EC",'; 
$csv_output .= '"Name",'; 
$csv_output .= '"Department",'; 
$csv_output .= '"Designation",'; 
$csv_output .= '"DOJ",'; 
$csv_output .= '"State",'; 
$csv_output .= '"HQ",'; 
$csv_output .= "\n";		

if($_REQUEST['y']!=0){ $sql=mysql_query("select e.EmpCode,Fname,Sname,Lname,g.HqId, g.TerrId, department_name, department_code, designation_name, grade_name, city_village_name, territory_name, state_name, DateJoining from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID left join core_departments dept on g.DepartmentId=dept.id
  left join core_designation desig on g.DesigId=desig.id
  left join core_grades gr on g.GradeId=gr.id
  left join core_city_village_by_state vlg on g.HqId=vlg.id
  left join core_territory Tr on g.TerrId=Tr.id left join core_states st on g.CostCenter=st.id where DateJoining>='".$FD."-04-01' AND DateJoining<='".$TD."-03-31' AND e.CompanyId=".$_REQUEST['c']." AND e.EmpStatus='A' order by DateJoining DESC", $con);
} else { $sql=mysql_query("select e.EmpCode,Fname,Sname,Lname,g.HqId, g.TerrId, department_name, department_code, designation_name, grade_name, city_village_name, territory_name, state_name, DateJoining from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID left join core_departments dept on g.DepartmentId=dept.id
  left join core_designation desig on g.DesigId=desig.id
  left join core_grades gr on g.GradeId=gr.id
  left join core_city_village_by_state vlg on g.HqId=vlg.id
  left join core_territory Tr on g.TerrId=Tr.id left join core_states st on g.CostCenter=st.id where e.CompanyId=".$_REQUEST['c']." AND e.EmpStatus='A' order by DateJoining DESC", $con); } 
$SNo=1; while($res=mysql_fetch_array($sql)){ 
$m=date('m',strtotime($res['DateJoining'])); if($m==4){$mn='APR';}elseif($m==5){$mn='MAY';}elseif($m==6){$mn='JUN';}elseif($m==7){$mn='JUL';}elseif($m==8){$mn='AUG';}elseif($m==9){$mn='SEP';}elseif($m==10){$mn='OCT';}elseif($m==11){$mn='NOV';}elseif($m==12){$mn='DEC';}elseif($m==1){$mn='JAN';}elseif($m==2){$mn='FEB';}elseif($m==3){$mn='MAR';}
	  
$csv_output .= '"'.str_replace('"', '""', $mn).'",';
$csv_output .= '"'.str_replace('"', '""', $SNo).'",';
$csv_output .= '"'.str_replace('"', '""', $res['EmpCode']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['Fname'].' '.$res['Sname'].' '.$res['Lname']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['department_code']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['designation_name']).'",';
$csv_output .= '"'.str_replace('"', '""', date("d-m-Y", strtotime($res['DateJoining']))).'",';
if($res['TerrId']>0){$Hq=$res['territory_name'];}else{$Hq=$res['city_village_name']; } 
$csv_output .= '"'.str_replace('"', '""', $Hq).'",';
$csv_output .= '"'.str_replace('"', '""', $res['state_name']).'",';
$csv_output .= "\n";
$SNo++; }

# Close the MySql connection
mysql_close($con);
# Set the headers so the file downloads
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Content-Length: " . strlen($csv_output));
header("Content-type: text/x-csv");
header("Content-Disposition: attachment; filename=On-Boarding_".$PRD.".csv");
echo $csv_output;
exit; 
}
?>