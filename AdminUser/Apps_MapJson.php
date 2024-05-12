<?php 

$con2=mysqli_connect('localhost','geolocation_user','geolocation@192');
$db=mysqli_select_db($con2, 'geolocation'); 
	  
	  $sql=mysqli_query($con2, "select * from data_geolocation where DTime>='".date("Y-m-d 00:00:00",strtotime($_REQUEST['fd']))."' AND DTime<='".date("Y-m-d 23:59:59",strtotime($_REQUEST['td']))."' AND EmpId=".$_REQUEST['ei']."  order by DTime asc");
	  $row=mysqli_num_rows($sql); $map=array();
      if($row>0)
      {
       while($res=mysqli_fetch_assoc($sql)){ $map[]=$res; }
       echo json_encode($map);
      }
	  
	  
	   
		
?>	
