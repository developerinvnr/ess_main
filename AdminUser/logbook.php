<?php 
$con_log=mysql_connect('localhost','hrims_user','hrims@192');
$logdb=mysql_select_db('logbook', $con_log);

$sql=mysql_query("insert into ".$tbln."(CompanyId, UserId, EmployeeID, PageName, DateTime, Activity, Action) values(".$ComId.", ".$UId.", ".$EId.", '".$PageName."', '".date("Y-m-d H:i:s")."', '".$Activity."', '".$Action."')",$con_log);

?>
