<?php 

$email_to = 'ajaykumar.dewangan@vnrseeds.in';
$email_from='admin@vnrseeds.co.in';
$email_subject = "Communication : Testing";
$headers = "From: ".$email_from."\r\n";  
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
$email_message .="Hello";	      
//$ok=@mail($email_to, $email_subject, $email_message, $headers);

?>
