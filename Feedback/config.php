<?php
$con = mysql_connect("localhost", "vnrseed2_hr", "vnrhrims321");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
$db_selected = mysql_select_db("vnrseed2_hrims", $con);
if (!$db_selected){
  die ("Can\'t use test_db : " . mysql_error());
}
?>