<?php 
$con=mysqli_connect('localhost','geolocation_user','geolocation@192');
if(!$con) die("Failed to connect to database!");
$db=mysqli_select_db( $con, 'geolocation');
if(!$db) die("Failed to select database!");
date_default_timezone_set('Asia/Calcutta');
/******************/
date_default_timezone_set('Asia/Calcutta');



if($_REQUEST['value'] == ''){ echo json_encode(array("msg" => "Parameter Missing!") ); }
 
//Company
elseif($_REQUEST['value'] == 'geo_location')
{
 
 if($_REQUEST['empid']!='' && $_REQUEST['location_list']!='')
 {
   
   $empid=$_REQUEST['empid'];
   //$loc=$_REQUEST['location_list'];
   $loc = json_decode($_REQUEST['location_list'], true);
   
   foreach($loc as $key => $value)
   {
       
       $lat=$value['lat'];
       $logg=$value['log'];
       $dt=$value['dt'];
       
       $Ins=mysqli_query($con, "insert into data_geolocation(EmpId, DLat, DLong, DTime, DSinkTime) values(".$_REQUEST['empid'].", '".$lat."', '".$logg."', '".$dt."', '".date("Y-m-d H:i:s")."')");
   }
   
   if($Ins>0)
   {
    echo json_encode(array("Code" => "300", "msg" => 'Data Inserted Successfully') ); 
   }
   else{ echo json_encode(array("Code" => "100", "msg" => "Error!") ); } 
 }   
 else{ echo json_encode(array("Code" => "100", "msg" => "Data Missing !") ); } 

}


//Last
else
{
 echo json_encode(array("Code" => "100", "msg" => "Invalid value!") );
}




/*
if($_REQUEST['value'] == ''){ echo json_encode(array("msg" => "Parameter Missing!") ); }
 
//Company
elseif($_REQUEST['value'] == 'geo_location')
{
 
 if($_REQUEST['empid']!='' && $_REQUEST['lat']!='' && $_REQUEST['long']!='' && $_REQUEST['dt']!='')
 {
   
   /*********************************************
   $Ins=mysqli_query($con, "insert into data_geolocation(EmpId, DLat, DLong, DTime, DSinkTime) values(".$_REQUEST['empid'].", '".$_REQUEST['lat']."', '".$_REQUEST['long']."', '".$_REQUEST['dt']."', '".date("Y-m-d H:i:s")."')");
   /*********************************************
   if($Ins>0)
   {
    echo json_encode(array("Code" => "300", "msg" => 'Data Inserted Successfully') ); 
   }
   else{ echo json_encode(array("Code" => "100", "msg" => "Error!") ); } 
 }   
 else{ echo json_encode(array("Code" => "100", "msg" => "Data Missing !") ); } 

}


//Last
else
{
 echo json_encode(array("Code" => "100", "msg" => "Invalid value!") );
}

*/
 
