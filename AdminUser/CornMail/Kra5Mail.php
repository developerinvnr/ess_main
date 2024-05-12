<?php 
require_once('../config/config.php');

mysql_query("SET SESSION sql_mode = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION'");


if(date("m")==04 || date("m")==10){ $Prd='Monthly/Quarterly';}      
elseif(date("m")==07){ $Prd='Monthly/Quarterly/Half Yearly';}      
else{ $Prd='Monthly'; }

if(date("d")==1 || date("d")==01)
{ 
 $To='by 7th'; 
 $Sub='Communication: Fill your KRA Achievements by 7th of this month';
 $email_message .= "<html><head><body>";
 $email_message .= "Dear Team Members,<p><br>\n\n";
 $email_message .= "Enter Self achievements for your ".$Prd." KRAs by 7th of this month in PMS module of ESS.<br><br>\n";
 $email_message .= "Login to ESS->PMS->Employee Tab->KRA to fill your self assessment.<br><br>\n";
 $email_message .= "You can also fill your KRA achievements through the link given in the home page “KRA notification link”.<br><br><br>\n";
}
elseif(date("d")==8 || date("d")==08)
{ 
 $To='by 14th'; 
 $Sub='Communication: Appraiser Level KRA Assessment by 14th of this month';    
 $email_message .= "<html><head><body>";
 $email_message .= "Dear Appraisers,<p><br>\n\n";
 $email_message .= "Please assess the performance of your team members on their ".$Prd." KRAs by 14th of this month in PMS module of ESS.<br><br>\n";
 $email_message .= "Login to ESS-->PMS-->Appraiser Tab-->My team KRA.<br><br>\n";
 $email_message .= "You can also complete the KRA assessment of team members from the “KRA notification link” provided in the home page of ESS.<br><br><br>\n";
}

 $email_message .= "Best Regards,<br>\n";
 $email_message .= "<b>Human Resources</b><br>\n\n";
 $email_message .= "</body></head></html>";

if(date("m")!=1 && date("m")!=01)
{

$sql=mysql_query("select g.EmployeeID,EmailId_Vnr from hrm_employee_general g inner join hrm_employee e on g.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=1 AND g.EmailId_Vnr!='' order by e.EmployeeID ASC limit 360,90",$con); //AND (g.DepartmentId=1 OR g.DepartmentId=9)
while($res=mysql_fetch_assoc($sql))
{ 

 
 if($res['EmailId_Vnr']!='')
 {
      $email_to = $res['EmailId_Vnr'];   
      $email_from='admin@vnrseeds.co.in';
      $email_subject = $Sub;
      $headers = "From: ".$email_from."\r\n"; 
      $semi_rand = md5(time()); 
      $headers .= "MIME-Version: 1.0\r\n";
      $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
	  $ok = @mail($email_to, $email_subject, $email_message, $headers);
 }
  
}

} //if(date("m")!=1 && date("m")!=01)

?>
