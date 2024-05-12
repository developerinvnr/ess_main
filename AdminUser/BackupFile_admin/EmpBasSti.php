<?php
require_once('config/config.php');
if(isset($_POST['BSid']) && $_POST['BSid']!=""){
	$BSid = $_POST['BSid'];
	if($BSid=='B'){echo 'Basic';} elseif($BSid=='S'){echo 'Stipend';}
}	
?>
