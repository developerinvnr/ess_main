<?php 

function android($data,$to)
{

 $serverKey = "AAAAWOtVZLU:APA91bEUMYE1eoIRv1RF06h4WaZDIOWVns24GwRN9kJcLEZ1xhJMB2sPo2sa_OAy3_cZwM0RKM7v_ZM6HW6Xzu-zvxypPCLDHq4PUcMdHfb2mDb8GCWGOK0P2EmbxncmyT4PrW7R3KK6";        
        
 $title = $data['subject'];
 $body = $data['msg_body'];
 $url = "https://fcm.googleapis.com/fcm/send";

 $notification = array('title' =>$title , 'body' => $body, 'sound' => 'default', 'badge' => '1');


  if($to!='')
  {
   $arrayToSend = array('to' => $to, 'notification' => $notification, 'priority'=>'high', 'content_available' => true);
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
   //return true;
  }        
        
}







/*
function android($data,$token)
{
    
    $ch = curl_init("https://fcm.googleapis.com/fcm/send");
    $title = "Notification";
    
    $notification = array("title"=> $data['subject'], "text"=>$data['msg_body']); 
    
    $arrayToSend = array('to' => $token, 'notification' => $notification, 'priority'=>'high');
    $json = json_encode($arrayToSend);
    $headers = array();
    $headers[] = 'Content-Type: application/json';
    $headers[] = 'Authorization: key= AAAAWOtVZLU:APA91bEUMYE1eoIRv1RF06h4WaZDIOWVns24GwRN9kJcLEZ1xhJMB2sPo2sa_OAy3_cZwM0RKM7v_ZM6HW6Xzu-zvxypPCLDHq4PUcMdHfb2mDb8GCWGOK0P2EmbxncmyT4PrW7R3KK6'; // key here
    
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                         
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
    curl_setopt($ch, CURLOPT_HTTPHEADER,$headers);  
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($arrayToSend));
    $response = curl_exec($ch);
    curl_close($ch);
    return $response;

}
*/
?>



<?php /*
    function android($data,$to){

        //API URL of FCM
        $url = 'https://fcm.googleapis.com/fcm/send';
    
        /*api_key available in:
        Firebase Console -> Project Settings -> CLOUD MESSAGING -> Server key*/    //$api_key = 'AAAAM2Omfpk:APA91bF7xuwVbmJKmyObP4VbBL0QKyAB1XtoOZBdUzj4Yc8BwH5tyEmVvtlzOs8PWi6lYstd5BViG8NhHAXtH4uTtNOD2KCO6katfNXbuDd2B2eFtPxGWtSwcLuzHahiZA-H7LpSCFi4';
        
        /*
        
        $api_key = 'AAAAWOtVZLU:APA91bEUMYE1eoIRv1RF06h4WaZDIOWVns24GwRN9kJcLEZ1xhJMB2sPo2sa_OAy3_cZwM0RKM7v_ZM6HW6Xzu-zvxypPCLDHq4PUcMdHfb2mDb8GCWGOK0P2EmbxncmyT4PrW7R3KK6';
        
        
        

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