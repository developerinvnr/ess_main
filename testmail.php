<?php
   require 'vendor/autoload.php';
 //sandeep kumar dewangan
   use PHPMailer\PHPMailer\PHPMailer;
   
  $mail = new PHPMailer(); // create a new object
$mail->IsSMTP(); // enable SMTP
$mail->SMTPDebug = 2; // debugging: 1 = errors and messages, 2 = messages only
$mail->SMTPAuth = true; // authentication enabled
$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
$mail->Host = "smtp.gmail.com";
$mail->Port = 465; // or 587
$mail->IsHTML(true);
$mail->Username = "webadmin@vnrseeds.com";
$mail->Password = "gfch ixci diqb qqcw";
$mail->SetFrom("webadmin@vnrseeds.com");


// $mail->Username = "recruitment@vnrseeds.com";
// $mail->Password = "Vnr;24680#Dev@H";
// $mail->SetFrom("recruitment@vnrseeds.com");


$mail->Subject = "Test";
$mail->Body = "hello";
$mail->AddAddress("sandeepdewangan2012@gmail.com");
$mail->Send();
 if(!$mail->Send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
 } else {
    echo "Message has been sent";
 }
?>

    