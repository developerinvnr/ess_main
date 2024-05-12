<?php
require_once('../user/config/config.php');
	// verify request id.
	if (empty($_GET['id']) || !is_numeric($_GET['id'])) {
		echo 'A valid image file id is required to display the image file.';
		exit;
	}

$query = mysql_query("SELECT PhotoType,EmpPhoto FROM hrm_employee_photo where EmployeeID=".$_GET['id'], $con);
$record = $row = mysql_fetch_array($query, MYSQL_ASSOC);
header("Content-type: ".$record ['PhotoType']);
	   /*** output the image ***/
echo $record ['EmpPhoto'];
?>