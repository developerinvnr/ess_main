<?php session_start();  
require_once('config/config.php');

mysql_query("SET SESSION sql_mode = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION'");

$ExpMDate=date('Y-m-d', strtotime("-2 months", strtotime(date("Y-m-d")))); 
$Year=date('Y', strtotime("-2 months", strtotime($ExpMDate))); 

$sql=mysql_query("select * from hrm_employee_attendance where AttDate='".$ExpMDate."' order by AttId ASC",$con);
while($res=mysql_fetch_assoc($sql))
{ 
 $sqlchk=mysql_query("select * from hrm_employee_attendance_".$Year." where EmployeeID=".$res['EmployeeID']." AND AttDate='".$ExpMDate."'",$con); $rowchk=mysql_num_rows($sqlchk);
 if($rowchk>0)
 {
  $ins=mysql_query("update hrm_employee_attendance_".$Year." set AttDate='".$res['AttDate']."', CheckSunday='".$res['CheckSunday']."', Year=".$res['Year'].", YearId=".$res['YearId'].", II='".$res['II']."', OO='".$res['OO']."', Inn='".$res['Inn']."', InnCnt='".$res['InnCnt']."', InnLate='".$res['InnLate']."', Outt='".$res['Outt']."', OuttCnt='".$res['OuttCnt']."', OuttLate='".$res['OuttLate']."', Late='".$res['Late']."', Relax='".$res['Relax']."', Allow='".$res['Allow']."', Af15='".$res['Af15']."' where EmployeeID=".$res['EmployeeID']." AND AttDate='".$ExpMDate."'",$con);
  
     //$ins=mysql_query("insert into hrm_employee_attendance_demo(AttId, EmployeeID, AttValue, AttDate, CheckSunday) values(".$res['AttId'].", ".$res['EmployeeID'].", '".$res['AttValue']."', '".$res['AttDate']."', '0')",$con);
 }
 else
 {
  $ins=mysql_query("insert into hrm_employee_attendance_".$Year."(EmployeeID, AttValue, AttDate, CheckSunday, Year, YearId, II, OO, Inn, InnCnt, InnLate, Outt, OuttCnt, OuttLate, Late, Relax, Allow, Af15) values(".$res['EmployeeID'].", '".$res['AttValue']."', '".$res['AttDate']."', '".$res['CheckSunday']."', ".$res['Year'].", ".$res['YearId'].", '".$res['II']."', '".$res['OO']."', '".$res['Inn']."', '".$res['InnCnt']."', '".$res['InnLate']."', '".$res['Outt']."', '".$res['OuttCnt']."', '".$res['OuttLate']."', '".$res['Late']."', '".$res['Relax']."', '".$res['Allow']."', '".$res['Af15']."')",$con);
  
   //$ins=mysql_query("insert into hrm_employee_attendance_demo(AttId, EmployeeID, AttValue, AttDate, CheckSunday) values(".$res['AttId'].", ".$res['EmployeeID'].", '".$res['AttValue']."', '".$res['AttDate']."', '1')",$con);
  
 }
 
 
 
}

//$ExpMDate=date('Y-m-d', strtotime("-2 months", strtotime(date("Y-m-d"))));
?>
