<?php

$conn = mysqli_connect('184.168.127.72','vnressus_hrrecruit_user','hrrecruit@192');

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";

?>