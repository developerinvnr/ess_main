<?php
require_once('../AdminUser/config/config.php');
	// verify request id.
	if (empty($_GET['id']) || !is_numeric($_GET['id'])) {
		echo 'A valid image file id is required to display the image file.';
		exit;
	}
$query = mysql_query("SELECT SignType,Sign FROM hrm_employee_investment_declaration where EmployeeID=".$_GET['id']." AND YearId=".$_GET['YId']."", $con);
$record = $row = mysql_fetch_array($query, MYSQL_ASSOC);
header("Content-type: ".$record ['SignType']);
	   /*** output the image ***/
echo $record ['Sign'];
?>