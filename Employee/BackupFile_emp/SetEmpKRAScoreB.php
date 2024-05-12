<?php 
require_once('../AdminUser/config/config.php');
if(isset($_POST['BId']) && $_POST['BId']!=""){  $BId=$_POST['BId']; $BRat=$_POST['BRat']; $BSco=$_POST['BSco']; $PmsId=$_POST['PmsId']; $Score=$_POST['Score'];
$sqlUpB=mysql_query("update hrm_employee_pms_behavioralformb set AppraiserRating=".$BRat.", AppraiserScore=".$BSco." where BehavioralFormBId=".$BId, $con); 
$sqlUpPms=mysql_query("update hrm_employee_pms set AppraiserFormBScore=".$Score." where EmpPmsId=".$PmsId, $con); }	

if(isset($_POST['BId2']) && $_POST['BId2']!=""){ $BId=$_POST['BId2']; $BRat=$_POST['BRat2']; $BSco=$_POST['BSco2']; 
$sqlUpB=mysql_query("update hrm_employee_pms_behavioralformb set AppraiserRating=".$BRat.", AppraiserScore=".$BSco." where BehavioralFormBId=".$BId, $con); }	

?>
