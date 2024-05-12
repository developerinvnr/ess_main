<?php 
session_start();  
require_once('config/config.php');

mysql_query("SET SESSION sql_mode = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION'");
date_default_timezone_set("Asia/Calcutta");


if(date("m")>=2 && date("m")<=12){ $PrevMnt=date("m")-1; $PrevYer=date("Y"); }
      else{ $PrevMnt=12; $PrevYer=date("Y")-1;} 
      $mkdate = mktime(0,0,0, $PrevMnt, 1, $PrevYer); 
      $days = date('t',$mkdate);
      
$WrmChk=mysql_query("select * from hrm_employee e inner join hrm_employee_general g ON e.EmployeeID=g.EmployeeID where g.DateJoining between '".date($PrevYer."-".$PrevMnt."-01")."' and '".date($PrevYer."-".$PrevMnt."-".$days)."' and e.EmpStatus='A' and e.CompanyId=1", $con); $RowWrmChk=mysql_num_rows($WrmChk); 

if($RowWrmChk)
{

$m=date("m"); 
if($m==1){ $month='December'; $year=date("Y")-1; }
else{ $mm=date("m")-1; $month=date("F",strtotime(date("Y-".$mm."-01"))); $year=date("Y"); }

$email_message .= "<html><head><body>";
$email_message .= "Dear VNRite,<p><br>\n\n";
$email_message .= "We are pleased to welcome the new members of the VNR family.<br><br>\n";
$email_message .= "Warm welcome details for the month of <b>".$month."-".$year."</b> is being displayed in ESS.<br><br>\n";
$email_message .= "Login at ESS-->Click on Warm Welcome button on Main Page.<br><br>\n";
$email_message .= "Please join us to welcome all new members to VNR Family.<p><p><p><br>\n\n\n";
$email_message .= "Warm Regards<br>\n";
$email_message .= "<b>Human Resources</b><br>\n\n";
$email_message .= "</body></head></html>";


      $subject="Warm Welcome (".$month."-".$year.")";
      $body=$email_message;
      $email_to='vspl.employees@vnrseeds.com';
      require 'vendor/mail.php';

/*
$sql=mysql_query("select g.EmployeeID,EmailId_Vnr from hrm_employee_general g inner join hrm_employee e on g.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=1 AND g.EmailId_Vnr!='' order by e.EmployeeID ASC",$con);

// limit 0,90
//AND (g.DepartmentId=1 OR g.DepartmentId=9)

while($res=mysql_fetch_assoc($sql))
{ 

 if($res['EmailId_Vnr']!='')
 {
     
      //$email_to = $res['EmailId_Vnr'];   
      //$email_from='admin@vnrseeds.co.in';
      //$email_subject = "Warm Welcome (".$month."-".$year.")";
      //$headers = "From: ".$email_from."\r\n"; 
      //$semi_rand = md5(time()); 
      //$headers .= "MIME-Version: 1.0\r\n";
      //$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
	  //$ok = @mail($email_to, $email_subject, $email_message, $headers);
	 
	  //$subject="Warm Welcome (".$month."-".$year.")";
      //$body=$email_message;
      //$email_to=$res['EmailId_Vnr'];
     // require 'vendor/mail_admin.php';
    
  
 }
  
}

*/

} //if($RowWrmChk)

?>
