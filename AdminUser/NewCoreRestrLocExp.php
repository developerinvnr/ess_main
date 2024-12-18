<?php 
require_once('config/config.php');
date_default_timezone_set('Asia/Calcutta');

$xls_filename = 'CoreMapping_Zone_Region_Territory.xls';
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=$xls_filename");
header("Pragma: no-cache");
header("Expires: 0");
$sep = "\t"; 
echo "Sn\tEC\tName\tVertical\tDepartment\tDesig\tGarde\tSection\tCostCenter\tSubLocation\tUnit\tZone\tRegion\tTerritory"; 
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
 
  $sqll = mysql_query("SELECT business_unit_name, zone_name, region_name, territory_name FROM core_ess_mapping map 
  left join core_business_unit Bu on map.BUId=Bu.id
  left join core_zones Zn on map.ZoneId=Zn.id
  left join core_regions Rg on map.RegionId=Rg.id
  left join core_territory Tr on map.TerrId=Tr.id 
  WHERE EmployeeID=".$res['EmployeeID'], $con);
  $rowss = mysql_num_rows($sqll); $ress = mysql_fetch_assoc($sqll);
  
  $schema_insert .= $ress['business_unit_name'].$sep;
  $schema_insert .= $ress['zone_name'].$sep;
  $schema_insert .= $ress['region_name'].$sep;
  $schema_insert .= $ress['territory_name'].$sep;
			  
  $schema_insert = str_replace($sep."$", "", $schema_insert);
  $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
  $schema_insert .= "\t";
  print(trim($schema_insert));
  print "\n";
  $no++;
 }
 
?>