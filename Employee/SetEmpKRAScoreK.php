<?php 
require_once('../AdminUser/config/config.php');
if(isset($_POST['KId']) && $_POST['KId']!=""){  $KId=$_POST['KId']; $KRat=$_POST['KRat']; $KSco=$_POST['KSco']; 
$sqlUpK=mysql_query("update hrm_employee_pms_kraforma set AppraiserRating=".$KRat.", AppraiserScore=".$KSco." where KRAFormAId=".$KId, $con); 
$sqlUpPms=mysql_query("update hrm_employee_pms set AppraiserFormAScore=".$Score." where EmpPmsId=".$PmsId, $con); } 

if(isset($_POST['KId2']) && $_POST['KId2']!=""){ $KId=$_POST['KId2']; $KRat=$_POST['KRat2']; $KSco=$_POST['KSco2']; 
$sqlUpK=mysql_query("update hrm_employee_pms_kraforma set AppraiserRating=".$KRat.", AppraiserScore=".$KSco." where KRAFormAId=".$KId, $con); } 
?>
