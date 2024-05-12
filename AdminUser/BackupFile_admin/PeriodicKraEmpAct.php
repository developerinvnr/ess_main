<?php require_once('config/config.php');

if($_POST['act']=='UpdMail')
{
 if($_POST['t']=='E')
 {
 
  $up=mysql_query("insert into hrm_kmail_chk(MEmpId,MDate) values(".$_POST['e'].",'".date("Y-m-d")."')",$con);
  if($up)
  {
    $sql=mysql_query("Select Fname,Sname,Lname,EmailId_Vnr from hrm_employee e inner join hrm_employee_general g on e.EmployeeID=g.EmployeeID where e.EmployeeID=".$_POST['e'],$con); $res=mysql_fetch_assoc($sql);
    if($res['EmailId_Vnr']!='')
    {
     $email_to = $res['EmailId_Vnr'];
     $email_from='admin@vnrseeds.co.in';
     $email_subject = "Communication: KRA: Self-Assessment";
     $headers = "From: ".$email_from44."\r\n"; 
     $semi_rand = md5(time()); 
     $headers .= "MIME-Version: 1.0\r\n";
     $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
     $email_message .= "<html><head></head><body>";
     $email_message .= "Dear <b>".$res['Fname']." ".$res['Sname']." ".$res['Lname'].", </b> <br><br>\n\n\n";
     //$email_message .= "Dear Sir/Mam<b>, </b> <br><br>\n\n\n";
     $email_message .= "Please fill your achievements for your KRAs by 7th of this month.<br><br>\n\n";
     $email_message .= "From <br><b>ADMIN ESS</b><br>";
     $email_message .="</body></html>";	      
     $ok=@mail($email_to, $email_subject, $email_message, $headers);
	 
	 if($ok){echo '<input type="hidden" id="MailSts" value="1"/><input type="hidden" id="EsId" value="'.$_POST['e'].'"/>';}
	 else{echo '<input type="hidden" id="MailSts" value="0"/><input type="hidden" id="EsId" value="'.$_POST['e'].'"/>';}
    } 
  }
  
 }
 elseif($_POST['t']=='R')
 {
 
  $up=mysql_query("insert into hrm_kmail_chk(REmpId,MDate) values(".$_POST['e'].",'".date("Y-m-d")."')",$con);
  if($up)
  {
    $sql=mysql_query("Select Fname,Sname,Lname,EmailId_Vnr from hrm_employee e inner join hrm_employee_general g on e.EmployeeID=g.EmployeeID where e.EmployeeID=".$_POST['e'],$con); $res=mysql_fetch_assoc($sql);
    if($res['EmailId_Vnr']!='')
    {
     $email_to = $res['EmailId_Vnr'];
     $email_from='admin@vnrseeds.co.in';
     $email_subject = "Communication: KRA: Team-Assessment";
     $headers = "From: ".$email_from."\r\n"; 
     $semi_rand = md5(time()); 
     $headers .= "MIME-Version: 1.0\r\n";
     $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
     $email_message .= "<html><head></head><body>";
     $email_message .= "Dear <b>".$res['Fname']." ".$res['Sname']." ".$res['Lname'].", </b> <br><br>\n\n\n";
     //$email_message .= "Dear Sir/Mam<b>, </b> <br><br>\n\n\n";
     $email_message .= "Please fill your team achievements for your team KRAs by 14th of this month.<br><br>\n\n";
     $email_message .= "From <br><b>ADMIN ESS</b><br>";
     $email_message .="</body></html>";	      
     $ok=@mail($email_to, $email_subject, $email_message, $headers);
  
	 if($ok){echo '<input type="hidden" id="MailSts" value="1"/><input type="hidden" id="EsId" value="'.$_POST['e'].'"/>';}
	 else{echo '<input type="hidden" id="MailSts" value="0"/><input type="hidden" id="EsId" value="'.$_POST['e'].'"/>';}
    } 
  }
  
 }
 
} 
