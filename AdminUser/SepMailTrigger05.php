<?php 
session_start();  
require_once('config/config.php');
mysql_query("SET SESSION sql_mode = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION'");

$sql=mysql_query("select EmpSepId, s.EmployeeID, Rep_EmployeeID, Hod_EmployeeID, Emp_ResignationDate, HOD_Date, Reminder_Rep, Reminder_Hod from hrm_employee_separation s INNER JOIN hrm_employee e ON s.EmployeeID=e.EmployeeID where s.Rep_Approved='N' AND s.Hod_Approved='N' AND HR_Approved='N' AND e.CompanyId=1 order by s.EmployeeID asc limit 4,1", $con); 
$row=mysql_num_rows($sql);
if($row>0)
{
 
 while($res=mysql_fetch_assoc($sql))
 { 
 
   $sqlEmp=mysql_query("select Fname,Sname,Lname,Gender,Married,DR,EmailId_Vnr from hrm_employee_general g inner join hrm_employee e on g.EmployeeID=e.EmployeeID inner join hrm_employee_personal p on g.EmployeeID=p.EmployeeID where e.EmployeeID=".$res['EmployeeID']."",$con); $resEmp=mysql_fetch_assoc($sqlEmp);
	if($resEmp['DR']=='Y'){$MSe='Dr.';} elseif($resEmp['Gender']=='M'){$MSe='Mr.';} elseif($resEmp['Gender']=='F' AND $resEmp['Married']=='Y'){$MSe='Mrs.';} elseif($resEmp['Gender']=='F' AND $resEmp['Married']=='N'){$MSe='Miss.';}  
    if($resEmp['Sname']==''){ $NameEmp = $MSe.' '.ucwords(strtolower($resEmp['Fname'].' '.$resEmp['Lname'])); }
    else{ $NameEmp = $MSe.' '.ucwords(strtolower($resEmp['Fname'].' '.$resEmp['Sname'].' '.$resEmp['Lname'])); }
 
 
   $After2Day=date("Y-m-d",strtotime('+2 day', strtotime($res['Emp_ResignationDate'])));
   $After3Day=date("Y-m-d",strtotime('+3 day', strtotime($res['Emp_ResignationDate'])));
   $After7Day=date("Y-m-d",strtotime('+7 day', strtotime($res['Emp_ResignationDate'])));
   
   $EId=0;
   if(date("Y-m-d")>$After2Day && date("Y-m-d")<=$After3Day && $res['Rep_EmployeeID']>0)
   {
    $EId=$res['Rep_EmployeeID'];  $MailTo='Rep';
	if($res['Reminder_Rep']==0){$Reminder=1;}
	elseif($res['Reminder_Rep']==1){$Reminder=2;}
	elseif($res['Reminder_Rep']==2){$Reminder=3;}
	
	$sqlE=mysql_query("select Fname,Sname,Lname,Gender,Married,DR,EmailId_Vnr from hrm_employee_general g inner join hrm_employee e on g.EmployeeID=e.EmployeeID inner join hrm_employee_personal p on g.EmployeeID=p.EmployeeID where e.EmpStatus='A' AND e.EmployeeID=".$EId."",$con); $resE=mysql_fetch_assoc($sqlE);
	if($resE['DR']=='Y'){$MS='Dr.';} elseif($resE['Gender']=='M'){$MS='Mr.';} elseif($resE['Gender']=='F' AND $resE['Married']=='Y'){$MS='Mrs.';} elseif($resE['Gender']=='F' AND $resE['Married']=='N'){$MS='Miss.';}  
    if($resE['Sname']==''){ $Name = $MS.' '.ucwords(strtolower($resE['Fname'].' '.$resE['Lname'])); }
    else{ $Name = $MS.' '.ucwords(strtolower($resE['Fname'].' '.$resE['Sname'].' '.$resE['Lname'])); }
	$AfterD=date("d-m-Y",strtotime('+3 day', strtotime($res['Emp_ResignationDate'])));
   }
   elseif(date("Y-m-d")>$After7Day && $res['Hod_EmployeeID']>0)
   {
    $EId=$res['Hod_EmployeeID'];  $MailTo='Hod';
	if($res['Reminder_Hod']==0){$Reminder=1;}
	elseif($res['Reminder_Hod']==1){$Reminder=2;}
	elseif($res['Reminder_Hod']==2){$Reminder=3;}
	
	$sqlE=mysql_query("select Fname,Sname,Lname,Gender,Married,DR,EmailId_Vnr from hrm_employee_general g inner join hrm_employee e on g.EmployeeID=e.EmployeeID inner join hrm_employee_personal p on g.EmployeeID=p.EmployeeID where e.EmpStatus='A' AND e.EmployeeID=".$EId."",$con); $resE=mysql_fetch_assoc($sqlE);
	if($resE['DR']=='Y'){$MS='Dr.';} elseif($resE['Gender']=='M'){$MS='Mr.';} elseif($resE['Gender']=='F' AND $resE['Married']=='Y'){$MS='Mrs.';} elseif($resE['Gender']=='F' AND $resE['Married']=='N'){$MS='Miss.';} 
    if($resE['Sname']==''){ $Name = $MS.' '.ucwords(strtolower($resE['Fname'].' '.$resE['Lname'])); }
    else{ $Name = $MS.' '.ucwords(strtolower($resE['Fname'].' '.$resE['Sname'].' '.$resE['Lname'])); }
	$AfterD=date("d-m-Y",strtotime('+7 day', strtotime($res['Emp_ResignationDate'])));
   }
   
    if($Name!='' && $resE['EmailId_Vnr']!='' && ($Reminder==1 || $Reminder==2))
	{
	 //$email_to = $resE['EmailId_Vnr'];
	 //$email_to = 'ajaykumar.dewangan@vnrseeds.in';   
    // $email_from='vspl.hr@vnrseeds.com';
     $email_subject = 'Notification - '.$Reminder.': Relieving date required!';
     //$headers = "From: ".$email_from."\r\n";  
     //$headers .= "MIME-Version: 1.0\r\n";
     //$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
	 $email_message .= "<html><head><body><br>\n";  
     $email_message .= "<font style='font-size:16px;'><i>Dear ".$Name.",</i></font><br><br>";
     $email_message .= "<font style='font-size:16px;'><i>Please provide the date of relieving for ".$NameEmp.". Resigned on ".date("d-m-Y",strtotime($res['Emp_ResignationDate']))." in ESS.</i></font><br><br><br>";
     $email_message .= "<i>Regards,</i><br>";
     $email_message .= "<i>Admin (HR)</i></font>";
     $email_message .= "</body></head></html>";
	 //$ok = @mail($email_to, $email_subject, $email_message, $headers);
	 
	 $subject=$email_subject;
     $body=$email_message;
     $email_to=$resE['EmailId_Vnr'];
     require 'vendor/mail.php';
	 
	 if($MailTo=='Rep'){ $type='Reminder_Rep'; }elseif($MailTo=='Hod'){ $type='Reminder_Hod'; }
	 $up=mysql_query("update hrm_employee_separation set ".$type."=".$Reminder." where EmpSepId=".$res['EmpSepId'],$con);
	 
	}
   
     
 } //while($res=mysql_fetch_assoc($sql))
 
} //if($rowE>0)

?>
 