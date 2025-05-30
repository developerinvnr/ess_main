<?php session_start();
require_once('config/config.php');
date_default_timezone_set('Asia/Calcutta');
$xls_filename = 'ReportMobileNo_'.date('d-m-Y').'.xls';
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=$xls_filename");
header("Pragma: no-cache");
header("Expires: 0");
 
$sep = "\t";
 
if($_REQUEST['D']!='All'){ $result=mysql_query("select e.EmployeeID,EmpCode,Fname,Sname,Lname, g.HqId, g.TerrId, department_name, sub_department_name, section_name, designation_name, grade_name, state_name, city_village_name, territory_name ,TimeApply,InTime,OutTime,HqName,AttMobileNo1,AttMobileNo2,MobileNo_Vnr,p.MobileNo from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_personal p ON e.EmployeeID=p.EmployeeID left join core_departments dept on g.DepartmentId=dept.id
  left join core_sub_department_master subdept on g.SubDepartmentId=subdept.id
  left join core_section sec on g.EmpSection=sec.id
  left join core_designation desig on g.DesigId=desig.id
  left join core_grades gr on g.GradeId=gr.id
  left join core_states st on g.CostCenter=st.id
  left join core_city_village_by_state vlg on g.HqId=vlg.id
  left join core_territory Tr on g.TerrId=Tr.id where e.EmpStatus='A' AND g.DepartmentId=".$_REQUEST['D']." AND e.CompanyId=".$_REQUEST['C']." AND (e.DateOfSepration='0000-00-00' OR e.DateOfSepration='1970-01-01' OR e.DateOfSepration>='".date($_REQUEST['Y']."-".$_REQUEST['m']."-01")."') AND g.DateJoining<='".date($_REQUEST['Y']."-".$_REQUEST['m']."-31")."' order by EmpCode ASC", $con); }
      if($_REQUEST['D']=='All'){ $result=mysql_query("select e.EmployeeID,EmpCode,Fname,Sname,Lname, g.HqId, g.TerrId, department_name, sub_department_name, section_name, designation_name, grade_name, state_name, city_village_name, territory_name,TimeApply,InTime,OutTime,HqName,AttMobileNo1,AttMobileNo2,MobileNo_Vnr,p.MobileNo from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_personal p ON e.EmployeeID=p.EmployeeID left join core_departments dept on g.DepartmentId=dept.id
  left join core_sub_department_master subdept on g.SubDepartmentId=subdept.id
  left join core_section sec on g.EmpSection=sec.id
  left join core_designation desig on g.DesigId=desig.id
  left join core_grades gr on g.GradeId=gr.id
  left join core_states st on g.CostCenter=st.id
  left join core_city_village_by_state vlg on g.HqId=vlg.id
  left join core_territory Tr on g.TerrId=Tr.id where e.EmpStatus='A' AND e.CompanyId=".$_REQUEST['C']." AND g.DepartmentId!=18 AND g.DepartmentId!=0 AND (e.DateOfSepration='0000-00-00' OR e.DateOfSepration='1970-01-01' OR e.DateOfSepration>='".date($_REQUEST['Y']."-".$_REQUEST['m']."-01")."') AND g.DateJoining<='".date($_REQUEST['Y']."-".$_REQUEST['m']."-31")."' order by EmpCode ASC", $con); } 
	  
echo "Sn\tEmpCode\tName\tDepartment\tDesignation\tLocation\tMobileNo-1\tMobileNo-2";
print("\n");
$sn=1;
while($res = mysql_fetch_array($result))
{

$Ename=$res['Fname'].' '.$res['Sname'].' '.$res['Lname']; $month=$_REQUEST['m'];

  $schema_insert = "";
  $schema_insert .= $sn.$sep;
  $schema_insert .= $res['EmpCode'].$sep;
  $schema_insert .= $Ename.$sep;
  $schema_insert .= $res['department_name'].$sep;
  $schema_insert .= $res['designation_name'].$sep;
  if($res['TerrId']>0){$Hq=$res['territory_name'];}else{$Hq=$res['city_village_name']; }
  $schema_insert .= $Hq.$sep;
  
  if($res['AttMobileNo1']>0 AND $res['AttMobileNo1']!=''){$attMob=$res['AttMobileNo1'];}elseif($res['MobileNo_Vnr']>0 AND $res['MobileNo_Vnr']!=''){$attMob=$res['MobileNo_Vnr'];}else{$attMob=0;;} 
  if($res['AttMobileNo2']>0 AND $res['AttMobileNo2']!=''){$attMob2=$res['AttMobileNo2'];}elseif($res['MobileNo']>0 AND $res['MobileNo']!=''){$attMob2=$res['MobileNo'];}else{$attMob2=0;}
  
  $schema_insert .= $attMob.$sep;
  $schema_insert .= $attMob2.$sep;		  
  $schema_insert = str_replace($sep."$", "", $schema_insert);
  $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
  $schema_insert .= "\t";
  print(trim($schema_insert));
  print "\n";
$sn++;  
}
?>