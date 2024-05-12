<?php
require_once('../AdminUser/config/config.php');
	// verify request id.
	if (empty($_GET['id']) || !is_numeric($_GET['id'])) {
		echo 'A valid image file id is required to display the image file.';
		exit;
	}
$query = mysql_query("SELECT ImgType,ThoughtImg FROM hrm_thought where ThoughtDay=".$_GET['id'], $con);
$record = $row = mysql_fetch_array($query, MYSQL_ASSOC);
header("Content-type: ".$record ['ImgType']);
	   /*** output the image ***/
echo $record ['ThoughtImg'];
?>