<?php   
require_once('config/config.php');

$msgb .= "<html><head><body><br>\n";
$msgb .= "<font style='font-size:16px;'><i>Dear Sir/Mam,</i></font><br><br>";
$msgb .= "<font style='font-size:16px;'><i>Your driving license number will expire soon. Please renew.</i></font><br><br><br>";
$msgb .= "from,<br>ADMIN ESS<br><br>";
$msgb .= "</body></head></html>";


$msga .= "<html><head><body><br>\n";
$msga .= "<font style='font-size:16px;'><i>Dear Sir/Mam,</i></font><br><br>";
$msga .= "<font style='font-size:16px;'><i>Your driving license number is expired. Please renew.</i></font><br><br><br>";
$msga .= "from,<br>ADMIN ESS<br><br>";
$msga .= "</body></head></html>";


$Subb="Driving lic. no expiry"; $Suba="Driving lic. no expired";


$Aft6M=date("Y-m-d",strtotime(date("Y-m-d").'+180 day'));

$sqlE=mysql_query("select g.EmployeeID, Fname, Sname, Lname, Driv_ExpiryDateTo, EmailId_Vnr from hrm_employee_general g INNER JOIN hrm_employee_personal p ON g.EmployeeID=p.EmployeeID INNER JOIN hrm_employee e ON g.EmployeeID=e.EmployeeID where e.EmpStatus='A' and Driv_ExpiryDateTo<='".$Aft6M."' AND DrivingLicNo!='' and e.CompanyId=1 group by g.EmailId_Vnr order by e.EmpCode ASC", $con); 
while($resE=mysql_fetch_assoc($sqlE))
{
  $M6=0; $M5=0; $M4=0; $M3=0; $M2=0; $M1=0; $D15=0; $oQ=0; $Sml='N'; $DLDate=''; $ename; $EmailId_Vnr='';
  
  //$DLDate=date("d-m-Y",strtotime($resE['Driv_ExpiryDateTo'])); 
  $EmailId_Vnr=$resE['EmailId_Vnr'];
  $DLExpToD=$resE['Driv_ExpiryDateTo'];
  
  $Bef6M=date("Y-m-d",strtotime($DLExpToD.'-180 day'));
  $Bef5M=date("Y-m-d",strtotime($DLExpToD.'-150 day'));
  $Bef4M=date("Y-m-d",strtotime($DLExpToD.'-120 day'));
  $Bef3M=date("Y-m-d",strtotime($DLExpToD.'-90 day'));
  $Bef2M=date("Y-m-d",strtotime($DLExpToD.'-60 day'));
  $BefM=date("Y-m-d",strtotime($DLExpToD.'-30 day'));
  $Bef15D=date("Y-m-d",strtotime($DLExpToD.'-15 day'));
  
  $sQ=mysql_query("select * from hrm_dl_mail where EmpId=".$resE['EmployeeID'],$con); $oQ=mysql_num_rows($sQ);
  $resQ=mysql_fetch_assoc($sQ); $M6 = $resQ['M6']; $M5 = $resQ['M5']; $M4 = $resQ['M4']; $M3 = $resQ['M3'];
  $M2 = $resQ['M2']; $M1 = $resQ['M1']; $D15 = $resQ['D15']; 
  
if(date("Y-m-d")>$Bef6M && date("Y-m-d")<=$Bef5M && ($oQ==0 || $M6==0)){ 
    $upV='M6'; $Sml='Y'; $Sb=$Subb; $msg=$msgb; }
elseif(date("Y-m-d")>$Bef5M && date("Y-m-d")<=$Bef4M && ($oQ==0 || $M5==0)){ 
    $upV='M5'; $Sml='Y'; $Sb=$Subb; $msg=$msgb; }
elseif(date("Y-m-d")>$Bef4M && date("Y-m-d")<=$Bef3M && ($oQ==0 || $M4==0)){ 
    $upV='M4'; $Sml='Y'; $Sb=$Subb; $msg=$msgb; }
elseif(date("Y-m-d")>$Bef3M && date("Y-m-d")<=$Bef2M && ($oQ==0 || $M3==0)){ 
    $upV='M3'; $Sml='Y'; $Sb=$Subb; $msg=$msgb; }
elseif(date("Y-m-d")>$Bef2M && date("Y-m-d")<=$BefM && ($oQ==0 || $M2==0)){ 
    $upV='M2'; $Sml='Y'; $Sb=$Subb; $msg=$msgb; }
elseif(date("Y-m-d")>$BefM && date("Y-m-d")<=$Bef15D && ($oQ==0 || $M1==0)){ 
    $upV='M1'; $Sml='Y'; $Sb=$Subb; $msg=$msgb; }
elseif(date("Y-m-d")>$Bef15D && date("Y-m-d")<=$DLExpToD && ($oQ==0 || $D15==0 || $D15==1)){ $upV='D15'; $Sml='Y'; $Sb=$Subb; $msg=$msgb; }
elseif(date("Y-m-d")>$DLExpToD){ $upV='D15'; $Sml='Y'; $Sb=$Suba; $msg=$msga; }
  
  
  
  if($Sml=='Y' && $EmailId_Vnr!='')
  {
   /*
   $email_to = $EmailId_Vnr; 
   //$email_to = 'ajaykumar.dewangan@vnrseeds.in'; 
   $email_from='vspl.hr@vnrseeds.com';
   $email_subject = $Sb;
   $headers = "From: $email_from ". "\r\n";
   $semi_rand = md5(time()); 
   $headers .= "MIME-Version: 1.0\r\n";
   $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
   $ok = @mail($email_to, $email_subject, $msg, $headers); 
   */
   
   $subject=$Sb;
   $body=$msg;
   $email_to=$EmailId_Vnr;
   require 'vendor/mail.php';
   
   
   //echo $DLExpToD.' - '.$email_to.' - '.$msg.'<br>';
      
   if($ok && $oQ==0){$up=mysql_query("insert into hrm_dl_mail(EmpId,".$upV.",D_date) values(".$resE['EmployeeID'].",1,'".date("Y-m-d")."')");}
   elseif($ok && $oQ>0){$up=mysql_query("update hrm_dl_mail set ".$upV."=1, D_date='".date("Y-m-d")."' where EmpId=".$resE['EmployeeID']);}
  }

  $M6=0; $M5=0; $M4=0; $M3=0; $M2=0; $M1=0; $D15=0; $rowQ=0; $SendMail='N'; $DLDate=''; $ename=''; $EmailId_Vnr='';
} 

?>