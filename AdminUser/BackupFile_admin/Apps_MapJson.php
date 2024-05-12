<?php $con2=mysqli_connect('localhost','vnrseed2_geolocation','vnrseed2_geolocation');
      $db=mysqli_select_db($con2, 'vnrseed2_geolocation'); 
	  
	  $sql=mysqli_query($con2, "select * from data_geolocation where DTime>='".date("Y-m-d",strtotime($_REQUEST['fd']))."' AND DTime<='".date("Y-m-d",strtotime($_REQUEST['td']))."' AND EmpId=".$_REQUEST['ei']."  order by DTime asc");
	  $row=mysqli_num_rows($sql); $map=array();
      if($row>0)
      {
       while($res=mysqli_fetch_assoc($sql)){ $map[]=$res; }
       echo json_encode($map);
      }
	  
	  
	   
		
?>	
