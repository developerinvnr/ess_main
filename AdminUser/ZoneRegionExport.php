<?php
require_once('config/config.php');
date_default_timezone_set('Asia/Calcutta');

$xls_filename = 'Zone_Region_Hq.xls';
 

header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=$xls_filename");
header("Pragma: no-cache");
header("Expires: 0");
$sep = "\t"; 
echo "Sn\tDepartment\tHq\tVertical\tRegion\tZone";
print("\n");

$sql=mysql_query("select g.EmpVertical, g.HqId, g.DepartmentId, DepartmentCode, hq.HqName, v.VerticalName from hrm_employee_general g left join hrm_headquater hq on g.HqId=hq.HqId left join hrm_department_vertical v on g.EmpVertical=v.VerticalId left join hrm_department dpt on g.DepartmentId=dpt.DepartmentId where hq.HQStatus='A' AND hq.CompanyId=".$_REQUEST['c']." group by g.DepartmentId,g.HqId,g.EmpVertical order by DepartmentId, HqName, VerticalName ", $con); 

$no=1;
 while($res=mysql_fetch_array($sql))
 {
     
  $sqlRat=mysql_query("select VHqId,rh.RegionId,RegionName from hrm_sales_verhq rh inner join hrm_sales_region r on rh.RegionId=r.RegionId where HqId=".$res['HqId']." AND Vertical=".$res['EmpVertical']." AND DeptId=".$res['DepartmentId']." AND CompanyId=".$_REQUEST['c'], $con); 
	  $resRat=mysql_fetch_assoc($sqlRat);
	  
 $sqlReg=mysql_query("select ZoneName from hrm_sales_region r left join hrm_sales_zone z on r.ZoneId=z.ZoneId where r.RegionId=".$resRat['RegionId'], $con); $resReg=mysql_fetch_array($sqlReg);
 
  $schema_insert = "";
  $schema_insert .= $no.$sep;
  $schema_insert .= $res['DepartmentCode'].$sep;
  $schema_insert .= $res['HqName'].$sep;
  $schema_insert .= $res['VerticalName'].$sep;		
  $schema_insert .= $resRat['RegionName'].$sep;
  $schema_insert .= $resReg['ZoneName'].$sep;
	
				  
  $schema_insert = str_replace($sep."$", "", $schema_insert);
  $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
  $schema_insert .= "\t";
  print(trim($schema_insert));
  print "\n";
  $no++;
}

?>

