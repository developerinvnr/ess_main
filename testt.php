<?php     

$json = file_get_contents('http://45.124.144.98:6868/essl/attendance/date/'.date("d-m-Y"));
$obj = json_decode($json);

foreach($obj->data as $key =>$value)
{
   
  if($value->CompanySName=='VSPL' || $value->CompanySName=='VNPL')
  {
     echo $value->UserId .' ';  
     echo $ec=$value->UserId .' ';
     echo $date=date("Y-m-d",strtotime($value->attendanceDate)) .' ';
     echo $inTime=date("H:i:00",strtotime($value->inTime)) .' ';
     echo $outTime=date("H:i:00",strtotime($value->outTime)) .' ';
     echo $diff=$value->MinuteDiff .' ';
     echo $com=$value->CompanySName; echo '<br><br>'; //VSPL VVNR VNPL
  }
 
}

?>

