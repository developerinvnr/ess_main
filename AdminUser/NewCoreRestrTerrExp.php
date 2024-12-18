<?php 
require_once('config/config.php');
date_default_timezone_set('Asia/Calcutta');

$xls_filename = 'CoreMapping_Territory_'.$_REQUEST['t'].'.xls';
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=$xls_filename");
header("Pragma: no-cache");
header("Expires: 0");
$sep = "\t"; 
echo "Sn\tCurr_Zone\tCurr_Region\tCurr_Territory\tUpdate_Unit\tUpdate_Zone\tUpdate_Region\tUpdate_Territory"; 
print("\n"); 
 
if($_REQUEST['t']=='FC')
{ 
  $sql = mysql_query("select Hq_fc, HqName, StateName from hrm_sales_dealer d left join hrm_headquater hq on d.Hq_fc=hq.HqId left join hrm_state s on hq.StateId=s.StateId where d.Hq_fc!=0 group by Hq_fc order by Hq_fc", $con); 
  $no=1; 
  while($res = mysql_fetch_assoc($sql))
  { 

    $Region=''; $Zone=''; 
    $sRg=mysql_query("select vh.RegionId,RegionName,ZoneName from hrm_sales_verhq vh left join hrm_sales_region sr on vh.RegionId=sr.RegionId left join hrm_sales_zone z on sr.ZoneId=z.ZoneId where vh.HqId=".$res['Hq_fc']." AND vh.Vertical=15 AND DeptId=6", $con); $rRg=mysql_fetch_assoc($sRg); 
    if($rRg['ZoneName']!=''){ $Zone=$rRg['ZoneName'];}
    if($rRg['RegionName']!=''){ $Region=$rRg['RegionName'];}

    $EC = str_pad($res['EmpCode'], 4, '0', STR_PAD_LEFT);
    $C=$CompanyId; $YI=$YearId; $U=$UserId;	  

  $schema_insert = "";
  $schema_insert .= $no.$sep;
  $schema_insert .= $Zone.$sep;
  $schema_insert .= $Region.$sep;
  $schema_insert .= ucwords(strtolower($res['HqName'])).$sep;
  
  $sqll = mysql_query("SELECT business_unit_name, zone_name, region_name, territory_name FROM core_terr_mapping map 
  left join core_business_unit Bu on map.FC_BUId=Bu.id
  left join core_zones Zn on map.FC_ZoneId=Zn.id
  left join core_regions Rg on map.FC_RegionId=Rg.id
  left join core_territory Tr on map.New_HQFC=Tr.id 
  WHERE HqFC=".$res['Hq_fc'], $con); 
  $ress = mysql_fetch_assoc($sqll);
 
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

}
else if($_REQUEST['t']=='VC')
{ 
    
    $sql = mysql_query("select Hq_vc, HqName, StateName from hrm_sales_dealer d left join hrm_headquater hq on d.Hq_vc=hq.HqId left join hrm_state s on hq.StateId=s.StateId where d.Hq_vc!=0 group by Hq_vc order by Hq_vc", $con); 
  $no=1; 
  while($res = mysql_fetch_assoc($sql))
  { 

    $Region=''; $Zone=''; 
    $sRg=mysql_query("select vh.RegionId,RegionName,ZoneName from hrm_sales_verhq vh left join hrm_sales_region sr on vh.RegionId=sr.RegionId left join hrm_sales_zone z on sr.ZoneId=z.ZoneId where vh.HqId=".$res['Hq_vc']." AND vh.Vertical=14 AND DeptId=6", $con); $rRg=mysql_fetch_assoc($sRg); 
    if($rRg['ZoneName']!=''){ $Zone=$rRg['ZoneName'];}
    if($rRg['RegionName']!=''){ $Region=$rRg['RegionName'];}

    $EC = str_pad($res['EmpCode'], 4, '0', STR_PAD_LEFT);
    $C=$CompanyId; $YI=$YearId; $U=$UserId;	  

  $schema_insert = "";
  $schema_insert .= $no.$sep;
  $schema_insert .= $Zone.$sep;
  $schema_insert .= $Region.$sep;
  $schema_insert .= ucwords(strtolower($res['HqName'])).$sep;
  
  $sqll = mysql_query("SELECT business_unit_name, zone_name, region_name, territory_name FROM core_terr_mapping map 
  left join core_business_unit Bu on map.VC_BUId=Bu.id
  left join core_zones Zn on map.VC_ZoneId=Zn.id
  left join core_regions Rg on map.VC_RegionId=Rg.id
  left join core_territory Tr on map.New_HQVC=Tr.id  
  WHERE HqVC=".$res['Hq_vc'], $con);
  $ress = mysql_fetch_assoc($sqll);
 
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

}   
 
?>