<?php

function android($data,$to)
{

$serverKey = "AAAAM2Omfpk:APA91bF7xuwVbmJKmyObP4VbBL0QKyAB1XtoOZBdUzj4Yc8BwH5tyEmVvtlzOs8PWi6lYstd5BViG8NhHAXtH4uTtNOD2KCO6katfNXbuDd2B2eFtPxGWtSwcLuzHahiZA-H7LpSCFi4";        
        
$title = $data['subject'];
$body = $data['msg_body'];
$url = "https://fcm.googleapis.com/fcm/send";

$notification = array('title' =>$title , 'body' => $body, 'sound' => 'default'); //, 'badge' => '1'


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
   /*****************/
   curl_setopt($ch, CURLOPT_POST, true);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
   curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
   curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
   /*****************/
   
   $response = curl_exec($ch);
   if($response === FALSE){ die('FCM Send Error: ' . curl_error($ch)); }
   curl_close($ch);
   return true;
  }     
        
 }





/*
    function android($data,$to){

        //API URL of FCM
        $url = 'https://fcm.googleapis.com/fcm/send';
    
        /*api_key available in:
        Firebase Console -> Project Settings -> CLOUD MESSAGING -> Server key*/    //$api_key = 'AAAAM2Omfpk:APA91bF7xuwVbmJKmyObP4VbBL0QKyAB1XtoOZBdUzj4Yc8BwH5tyEmVvtlzOs8PWi6lYstd5BViG8NhHAXtH4uTtNOD2KCO6katfNXbuDd2B2eFtPxGWtSwcLuzHahiZA-H7LpSCFi4';
        /*
        $api_key = 'AAAAM2Omfpk:APA91bF7xuwVbmJKmyObP4VbBL0QKyAB1XtoOZBdUzj4Yc8BwH5tyEmVvtlzOs8PWi6lYstd5BViG8NhHAXtH4uTtNOD2KCO6katfNXbuDd2B2eFtPxGWtSwcLuzHahiZA-H7LpSCFi4';
        

        $msg = array("title"=> $data['subject'],
        "body"=>$data['msg_body'],
        "sound" => "default"
         );   
        
        $fields = array('registration_ids'=> $to,'notification'=> $msg);   
    
        //header includes Content type and api key
        $headers = array(
            'Content-Type:application/json',
            'Authorization:key='.$api_key
        );       
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
        $result = curl_exec($ch);
     
        if ($result === FALSE) {
            die('FCM Send Error: ' . curl_error($ch));
        }
        curl_close($ch);
        return true;
    }
*/    
?>