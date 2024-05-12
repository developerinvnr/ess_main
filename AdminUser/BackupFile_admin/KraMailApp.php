<?php session_start();  
require_once('config/config.php');
mysql_query("SET SESSION sql_mode = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION'");

/*

$Qyeark=mysql_query("select * from hrm_pms_setting where CompanyId=1 AND Process='KRA'",$con);
$Yeark=mysql_fetch_assoc($Qyeark); $_SESSION['KraYId']=$Yeark['CurrY'];

//Appraiser After 7th
$sql=mysql_query("Select RepEmployeeID,ReportingName,ReportingEmailId from hrm_pms_kra k inner join hrm_employee e on k.EmployeeID=e.EmployeeID inner join hrm_employee_general g on e.EmployeeID=g.EmployeeID where k.YearId=".$Yeark['CurrY']." and k.EmpStatus='A' and e.EmpStatus='A' and k.UseKRA!='E' group by g.RepEmployeeID",$con);
while($res=mysql_fetch_assoc($sql))
{
 if($res['ReportingEmailId']!='')
 {
   $email_to = $res['ReportingEmailId'];
   $email_from='admin@vnrseeds.co.in';
   $email_subject = "Communication: KRA: Team-Assessment";
   $headers = "From: ".$email_from."\r\n"; 
   $semi_rand = md5(time()); 
   $headers .= "MIME-Version: 1.0\r\n";
   $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
   $email_message .= "<html><head></head><body>";
   //$email_message .= "Dear <b>".$res['ReportingName'].", </b> <br><br>\n\n\n";
   $email_message .= "Dear Sir/Mam<b>, </b> <br><br>\n\n\n";
   $email_message .= "Please fill your team achievements for your team KRAs by 14th of this month if you have set your team KRA in monthly,Quarterly breakup. Go to PMS module in ESS.<br><br>\n\n";
   $email_message .= "From <br><b>ADMIN ESS</b><br>";
   $email_message .="</body></html>";	      
   //$ok=@mail($email_to, $email_subject, $email_message, $headers);
   //echo $i.'-'.$email_to.' <br>';
 } //$i++;
}

*/

?>
