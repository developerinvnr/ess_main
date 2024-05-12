<?php require_once('config/config.php');


$serverKey = "AAAAM2Omfpk:APA91bF7xuwVbmJKmyObP4VbBL0QKyAB1XtoOZBdUzj4Yc8BwH5tyEmVvtlzOs8PWi6lYstd5BViG8NhHAXtH4uTtNOD2KCO6katfNXbuDd2B2eFtPxGWtSwcLuzHahiZA-H7LpSCFi4";

$title = 'ESS Apps Running';
$body = 'Dear Team';
$url = "https://fcm.googleapis.com/fcm/send";
$notification = array('title' =>$title , 'body' => $body, 'sound' => 'default', 'badge' => '1');

 $sEmp=mysql_query("select tokenid from hrm_employee e inner join hrm_employee_general g on e.EmployeeID=g.EmployeeID where g.DepartmentId=9 AND e.EmpStatus='A' AND e.EmployeeID=169",$con);  
 while($rEmp=mysql_fetch_assoc($sEmp))
 { 
  $to = $rEmp['tokenid'];
  if($to!='')
  {
   $arrayToSend = array('to' => $to, 'notification' => $notification, 'priority'=>'high');
   $json = json_encode($arrayToSend);
   $headers = array();
   $headers[] = 'Content-Type: application/json';
   $headers[] = 'Authorization: key='.$serverKey;
   $ch = curl_init();
   curl_setopt($ch, CURLOPT_URL, $url);
   curl_setopt($ch, CURLOPT_CUSTOMREQUEST,"POST");
   curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
   curl_setopt($ch, CURLOPT_HTTPHEADER,$headers);
   $response = curl_exec($ch);
   if($response === FALSE){ die('FCM Send Error: ' . curl_error($ch)); }
   curl_close($ch);
  }
 } //while
 
 //echo '<script>alert("Notification Sent Successfully"); window.close(); </script>';
 


?>

