<?php 
require_once('config/config.php');
date_default_timezone_set('Asia/Calcutta');

$xls_filename = 'CoreMapping.xls';
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=$xls_filename");
header("Pragma: no-cache");
header("Expires: 0");
$sep = "\t"; 
echo "Sn\tEC\tName\tVertical\tDepartment\tDesig\tGarde\tSection\tCostCenter\tSubLocation\tHQ\tNew_funcation\tNew_Vertical\tNew_Dept\tNew_SubDept\tNew_Section\tNew_Desig\tNew_Grade\tNew_CostCenter\tNew_HQ"; 
print("\n"); 
  		
 $sql = mysql_query("SELECT e.EmployeeID, EmpCode, concat(Fname, ' ', Sname, ' ', Lname) as Name, Gender, Married, VerticalName, g.DepartmentId, DepartmentCode, g.DesigId, DesigCode, DesigName, g.GradeId, GradeValue, SubLocation, SectionName, StateName, HqName,
 CASE 
 WHEN DR = 'Y' THEN 'Dr.'
 WHEN Gender = 'M' THEN 'Mr.'
 WHEN Gender = 'F' AND Married = 'Y' THEN 'Mrs.'
 WHEN Gender = 'F' AND Married = 'N' THEN 'Miss.'
 ELSE '' 
 END as Greeting FROM hrm_employee_general g 
 left join hrm_employee e ON g.EmployeeID=e.EmployeeID 
 left join hrm_employee_personal p on g.EmployeeID=p.EmployeeID
 left join hrm_department_vertical v on (g.EmpVertical=v.VerticalId and g.DepartmentId=v.DeptId)
 left join hrm_department d on g.DepartmentId=d.DepartmentId
 left join hrm_designation de on g.DesigId=de.DesigId
 left join hrm_grade gr on g.GradeId=gr.GradeId 
 left join hrm_state st on g.CostCenter=st.StateId
 left join hrm_headquater hq on g.HqId=hq.HqId
 left join hrm_department_section sec on g.EmpSection=sec.SectionId
 WHERE e.EmpStatus='A' AND e.CompanyId=".$_REQUEST['C']." order by e.ECode ASC", $con);
 $no=1; 
 while($res = mysql_fetch_assoc($sql))
 { 
  $EC = str_pad($res['EmpCode'], 4, '0', STR_PAD_LEFT);
  $C=$CompanyId; $YI=$YearId; $U=$UserId;	  

  $schema_insert = "";
  $schema_insert .= $no.$sep;
  $schema_insert .= $EC.$sep;
  $schema_insert .= $res['Name'].$sep;
  $schema_insert .= ucwords(strtolower($res['VerticalName'])).$sep;
  $schema_insert .= $res['DepartmentCode'].$sep;
  $schema_insert .= $res['DesigCode'].$sep;
  $schema_insert .= $resG['GradeValue'].$sep;	
  $schema_insert .= $res['SectionName'].$sep;
  $schema_insert .= $res['StateName'].$sep;
  $schema_insert .= $res['SubLocation'].$sep;
  $schema_insert .= $res['HqName'].$sep;
 
  $sqll = mysql_query("SELECT function_name, vertical_name, department_name, sub_department_name, section_name, designation_name, grade_name, state_name, city_village_name FROM core_ess_mapping map 
  left join core_functions fun on map.EmpFunction=fun.id
  left join core_verticals ver on map.EmpVertical=ver.id
  left join core_departments dept on map.DepartmentId=dept.id
  left join core_sub_department_master subdept on map.SubDepartmentId=subdept.id
  left join core_section sec on map.EmpSection=sec.id
  left join core_designation desig on map.DesigId=desig.id
  left join core_grades gr on map.GradeId=gr.id
  left join core_states st on map.CostCenter=st.id
  left join core_city_village_by_state vlg on map.HqId=vlg.id 
  WHERE EmployeeID=".$res['EmployeeID'], $con);
  $rowss = mysql_num_rows($sqll); $ress = mysql_fetch_assoc($sqll);
  
  $schema_insert .= $ress['function_name'].$sep;
  $schema_insert .= $ress['vertical_name'].$sep;
  $schema_insert .= $ress['department_name'].$sep;
  $schema_insert .= $ress['sub_department_name'].$sep;
  $schema_insert .= $ress['section_name'].$sep;
  $schema_insert .= $ress['designation_name'].$sep;
  $schema_insert .= $ress['grade_name'].$sep;
  $schema_insert .= $ress['state_name'].$sep;
  $schema_insert .= $ress['city_village_name'].$sep;
			  
  $schema_insert = str_replace($sep."$", "", $schema_insert);
  $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
  $schema_insert .= "\t";
  print(trim($schema_insert));
  print "\n";
  $no++;
 }
 
?>