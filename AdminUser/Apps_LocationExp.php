<?php
require_once('config/config.php');
date_default_timezone_set('Asia/Calcutta');

if($_REQUEST['action']=='Export')
{

function GetDistance($latitude1, $longitude1, $latitude2, $longitude2, $unit) 
{
  $theta = $longitude1 - $longitude2; 
  $distance = (sin(deg2rad($latitude1)) * sin(deg2rad($latitude2))) + (cos(deg2rad($latitude1)) * cos(deg2rad($latitude2)) * cos(deg2rad($theta))); 
  $distance = acos($distance); 
  $distance = rad2deg($distance); 
  $distance = $distance * 60 * 1.1515; 
  switch($unit) { 
    case 'miles': 
      break; 
    case 'kilometers' : 
      $distance = $distance * 1.609344; 
  } 
  return (round($distance,2)); 
}


$xls_filename = 'Employee_GeoLocation'.$_REQUEST['FD'].'-'.$_REQUEST['TD'].'.xls';
 
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=$xls_filename");
header("Pragma: no-cache");
header("Expires: 0");
$sep = "\t"; 
//echo "Sn\tEmpCode\tName\tDateTime\tLatitude\tLongitude\tTotalKMs\tLocation";
echo "Sn\tEmpCode\tName\tDateTime\tStarting  Point\tEnd Point\tDistance (in KM)";
print("\n");


 $sqlE=mysql_query("select EmpCode, Fname, Sname, Lname from hrm_employee where EmployeeID=".$_REQUEST['e'], $con);
 $resE=mysql_fetch_array($sqlE);

$con2=mysql_connect('localhost','geolocation_user','geolocation@192');
$db=mysql_select_db('geolocation', $con2);

$sql=mysql_query("select DLat as sLat,DLong as sLong, DTime as sTime,
(SELECT DLat FROM data_geolocation WHERE DTime>sTime AND DTime>='".date("Y-m-d 00:00:00",strtotime($_REQUEST['FD']))."' AND DTime<='".date("Y-m-d 23:59:59",strtotime($_REQUEST['TD']))."' AND EmpId=".$_REQUEST['e']." ORDER BY DTime ASC LIMIT 1 OFFSET 0) as eLat,
(SELECT DLong FROM data_geolocation WHERE DTime>sTime AND DTime>='".date("Y-m-d 00:00:00",strtotime($_REQUEST['FD']))."' AND DTime<='".date("Y-m-d 23:59:59",strtotime($_REQUEST['TD']))."' AND EmpId=".$_REQUEST['e']." ORDER BY DTime ASC LIMIT 1 OFFSET 0) as eLong,
(SELECT DTime FROM data_geolocation WHERE DTime>sTime AND DTime>='".date("Y-m-d 00:00:00",strtotime($_REQUEST['FD']))."' AND DTime<='".date("Y-m-d 23:59:59",strtotime($_REQUEST['TD']))."' AND EmpId=".$_REQUEST['e']." ORDER BY DTime ASC LIMIT 1 OFFSET 0) as eTime
from data_geolocation where DTime>='".date("Y-m-d 00:00:00",strtotime($_REQUEST['FD']))."' AND DTime<='".date("Y-m-d 23:59:59",strtotime($_REQUEST['TD']))."' AND EmpId=".$_REQUEST['e']." order by DTime asc", $con2); 
 
 $TotKm=0; $Tot=0; $sn=1;   
 $no=1;
 while($res=mysql_fetch_array($sql))
 {
 
  $schema_insert = "";
  $schema_insert .= $no.$sep;
  $schema_insert .= $resE['EmpCode'].$sep;
  $schema_insert .= $resE['Fname'].' '.$resE['Sname'].' '.$resE['Lname'].$sep;
  $schema_insert .= date("d-m-Y H:i:s",strtotime($res['sTime'])).$sep;
  
  $key='AIzaSyCX-IBGudyr19-E7zrx1PTGqy0PEVwX5wQ';
  $url="https://maps.googleapis.com/maps/api/geocode/json?latlng=".$res['sLat'].",".$res['sLong']."&sensor=false&key=".$key;
		    	    
  $json = @file_get_contents($url);
  $data = json_decode($json);

  $status = $data->status;
  $address1 = '';
  if($status == "OK")
  { 
    $address1 = $data->results[0]->formatted_address.' ('.$res['sLat'].'/'.$res['sLong'].')'; 
    $schema_insert .= $address1.$sep;
  }
  else
  { 
    $address1='Data Not Found';
    $schema_insert .= $address1.$sep; 
  }
  
  $key='AIzaSyCX-IBGudyr19-E7zrx1PTGqy0PEVwX5wQ';
  $url="https://maps.googleapis.com/maps/api/geocode/json?latlng=".$res['eLat'].",".$res['eLong']."&sensor=false&key=".$key;
		    	    
  $json = @file_get_contents($url);
  $data = json_decode($json);

  $status = $data->status;
  $address2 = '';
  if($status == "OK")
  { 
    $address2 = $data->results[0]->formatted_address.' ('.$res['eLat'].'/'.$res['eLong'].')'; 
    $schema_insert .= $address2.$sep;
  }
  else
  { 
    $address2='Data Not Found';
    $schema_insert .= $address2.$sep; 
  }
  
  /*$schema_insert .= $res['sLat'].$sep;
  $schema_insert .= $res['sLong'].$sep;*/
  
  if($res['eLat']!='' AND $res['eLong']!='')
  { 
    $Tot=GetDistance($res['sLat'], $res['sLong'], $res['eLat'], $res['eLong'], 'kilometers'); 
	$schema_insert .= $Tot.$sep;
  }
  else
  { $Tot=0; 
    $schema_insert .= $Tot.$sep; 
  }
  
  /*
  $key='AIzaSyCX-IBGudyr19-E7zrx1PTGqy0PEVwX5wQ';
  $url="https://maps.googleapis.com/maps/api/geocode/json?latlng=".$res['sLat'].",".$res['sLong']."&sensor=false&key=".$key;
		    	    
  $json = @file_get_contents($url);
  $data = json_decode($json);

  $status = $data->status;
  $address = '';
  if($status == "OK")
  { 
    $address = $data->results[0]->formatted_address; 
    $schema_insert .= $address.$sep;
  }
  else
  { 
    $address='Data Not Found';
    $schema_insert .= $address.$sep; 
  }
  */
			  
  $schema_insert = str_replace($sep."$", "", $schema_insert);
  $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
  $schema_insert .= "\t";
  print(trim($schema_insert));
  print "\n";
  $no++;
  
 }

}

?>
