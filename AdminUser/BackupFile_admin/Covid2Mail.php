<?php 
session_start();  
require_once('config/config.php');
mysql_query("SET SESSION sql_mode = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION'");
 
 $Sub='Reminder Mail for uploading Covid Vaccination certificate.';
 
 $email_message .= "<html><head><body>";
 $email_message .= "Dear Team Member,<p><br>\n\n";
 $email_message .= "Request you to upload your Covid vaccination certificate (whichever dose is completed) in Profile-->Family.<br><br>\n";
 $email_message .= "Best Regards,<br>\n";
 $email_message .= "<b>Human Resources</b><br>\n\n";
 $email_message .= "</body></head></html>";
 
 $qry="select g.EmployeeID,EmailId_Vnr as VEmailId from hrm_employee_general g inner join hrm_employee e on g.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND g.Covid_Vaccin_file='' AND g.Covid_Vaccin2_file='' AND e.CompanyId=1 AND g.EmailId_Vnr!='' AND g.EmployeeID!=223 AND g.EmployeeID!=461 AND g.EmployeeID!=224 AND g.EmployeeID!=233 AND g.EmployeeID!=234 AND g.EmployeeID!=235 AND g.EmployeeID!=259 AND g.EmployeeID!=260 AND g.EmployeeID!=6 AND g.EmployeeID!=7 AND g.EmployeeID!=52 AND g.EmployeeID!=51 AND g.EmployeeID!=89 group by g.EmailId_Vnr order by e.EmployeeID ASC";
 
  
 $sql=mysql_query($qry." limit 90,90",$con); //AND (g.DepartmentId=1 OR g.DepartmentId=9)
 
 while($res=mysql_fetch_assoc($sql))
 { 

  if($res['VEmailId']!='')
  {
      $email_to = $res['VEmailId'];   
      $email_from='admin@vnrseeds.co.in';
      $email_subject = $Sub;
      $headers = "From: ".$email_from."\r\n"; 
      $semi_rand = md5(time()); 
      $headers .= "MIME-Version: 1.0\r\n";
      $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
	  $ok = @mail($email_to, $email_subject, $email_message, $headers);
  }
  
 } //while

?>