<?php
$con=mysqli_connect('localhost','vnrseed2_hr','vnrhrims321');
if(!$con) die("Failed to connect to database!");
mysqli_select_db($con, "vnrseed2_hrims");

$serverKey = "AAAAM2Omfpk:APA91bF7xuwVbmJKmyObP4VbBL0QKyAB1XtoOZBdUzj4Yc8BwH5tyEmVvtlzOs8PWi6lYstd5BViG8NhHAXtH4uTtNOD2KCO6katfNXbuDd2B2eFtPxGWtSwcLuzHahiZA-H7LpSCFi4";

$title = 'Test - 2 Notification';
$body = 'Welcome test - 2 Notification';
$url = "https://fcm.googleapis.com/fcm/send";
$notification = array('title' =>$title , 'body' => $body, 'sound' => 'default', 'badge' => '1');


$sEmp=mysqli_query($con,"select tokenid from hrm_employee where EmployeeID=169 AND EmpStatus='A'");  
$rEmp=mysqli_fetch_assoc($sEmp); 
$to = $rEmp['tokenid'];

$arrayToSend = array('to' => $to, 'notification' => $notification,'priority'=>'high');
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

?>
