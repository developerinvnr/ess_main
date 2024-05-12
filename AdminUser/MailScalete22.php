<?php
$sqlThCh=mysql_query("select * from hrm_com_mail_scalate where ScalateDate='".date("Y-m-d")."' AND ScalateYN='Y' AND CompanyId=".$CompanyId, $con); 
$rowThCh=mysql_num_rows($sqlThCh);
if($rowThCh==0)
{   // Check Open //

/*Scalete Separation
$sqlMail = mysql_query("select EmpSepId,EmployeeID,Rep_EmployeeID,Hod_EmployeeID,HOD_Date from hrm_employee_separation where ScaletMailHod='N' AND '".date("Y-m-d")."'>=HOD_Date AND ResignationStatus=1", $con);$rowMail=mysql_num_rows($sqlMail); if($rowMail>0){ while($resMail=mysql_fetch_array($sqlMail)){ 

$sqlE=mysql_query("select Fname,Sname,Lname from hrm_employee where EmployeeID=".$resMail['EmployeeID'], $con); $resE=mysql_fetch_assoc($sqlE); 
$EName=$resE['Fname'].' '.$resE['Sname'].' '.$resE['Lname'];
$sqlR=mysql_query("select Fname,Sname,Lname,Gender,DR,Married,EmailId_Vnr from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee_general.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee_general.EmployeeID=".$resMail['Rep_EmployeeID'], $con); 
$resR=mysql_fetch_assoc($sqlR);  if($resR['DR']=='Y'){$R='Dr.';} elseif($resR['Gender']=='M'){$R='Mr.';} elseif($resR['Gender']=='F' AND $resR['Married']=='Y'){$R='Mrs.';} elseif($resR['Gender']=='F' AND $resR['Married']=='N'){$R='Miss.';}  $RName=$R.' '.$resR['Fname'].' '.$resR['Sname'].' '.$resR['Lname'];
$sqlH=mysql_query("select Fname,Sname,Lname,Gender,DR,Married,EmailId_Vnr from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee_general.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee_general.EmployeeID=".$resMail['Hod_EmployeeID'], $con); 
$resH=mysql_fetch_assoc($sqlH);  if($resH['DR']=='Y'){$H='Dr.';} elseif($resH['Gender']=='M'){$H='Mr.';} elseif($resH['Gender']=='F' AND $resH['Married']=='Y'){$H='Mrs.';} elseif($resH['Gender']=='F' AND $resH['Married']=='N'){$H='Miss.';}  $HName=$H.' '.$resH['Fname'].' '.$resH['Sname'].' '.$resH['Lname'];

/************************************************ HOD ***********************************************   
if($resH['EmailId_Vnr']!='')
{
$email_to = $resH['EmailId_Vnr'];
$email_from = 'admin@vnrseeds.co.in';
$email_subject = "Escalated resignation ";
$email_txt = "Escalated resignation";
$headers = "From: ".$email_from."\r\n"; 
$semi_rand = md5(time()); 
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n"; 
$email_message .= "The resignation application of ".$EName." has been escalated to you for action as no action was taken by the reporting manager ".$RName.". Kindly approve and log on to ESS for more details kindly log on to ESS <a href='https://www.vnrseeds.co.in'>www.vnrseeds.co.in</a>. \n\n";
$ok = @mail($email_to, $email_subject, $email_message, $headers);
} 

/************************************************ Reporting ***********************************************   
if($resR['EmailId_Vnr']!='')
{
$email_to2 = $resR['EmailId_Vnr'];
$email_from = 'admin@vnrseeds.co.in';
$email_subject = "Escalated resignation ";
$email_txt = "Escalated resignation";
$headers = "From: ".$email_from."\r\n"; 
$semi_rand = md5(time()); 
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n"; 
$email_message2 .= "The resignation application of ".$EName." has been escalated to your HOD as no action was taken within 5 days timeframe. \n\n";
$ok = @mail($email_to2, $email_subject, $email_message2, $headers);
} 
$sqlUp=mysql_query("update hrm_employee_separation set ScaletMailHod='Y' where EmpSepId=".$resMail['EmpSepId'], $con);

}}


/*Scalete Separation If Cancellation Apply
$sqlMail2 = mysql_query("select EmpSepId,EmployeeID,Rep_EmployeeID,Hod_EmployeeID,Emp_CanDate,Emp_CancelResig,HOD_CanDate,HR_CanDate from hrm_employee_separation where HR_Approved='Y' AND Emp_CancelResig=2 AND ScaletCancelMailHod='N' AND '".date("Y-m-d")."'>=HOD_CanDate AND ResignationStatus=4", $con); $rowMail2=mysql_num_rows($sqlMail2); if($rowMail2>0){ while($resMail2=mysql_fetch_array($sqlMail2)){ 

$sqlE=mysql_query("select Fname,Sname,Lname from hrm_employee where EmployeeID=".$resMail2['EmployeeID'], $con); $resE=mysql_fetch_assoc($sqlE); 
$EName=$resE['Fname'].' '.$resE['Sname'].' '.$resE['Lname'];
$sqlR=mysql_query("select Fname,Sname,Lname,Gender,DR,Married,EmailId_Vnr from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee_general.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee_general.EmployeeID=".$resMail2['Rep_EmployeeID'], $con); 
$resR=mysql_fetch_assoc($sqlR);  if($resR['DR']=='Y'){$R='Dr.';} elseif($resR['Gender']=='M'){$R='Mr.';} elseif($resR['Gender']=='F' AND $resR['Married']=='Y'){$R='Mrs.';} elseif($resR['Gender']=='F' AND $resR['Married']=='N'){$R='Miss.';}  $RName=$R.' '.$resR['Fname'].' '.$resR['Sname'].' '.$resR['Lname'];
$sqlH=mysql_query("select Fname,Sname,Lname,Gender,DR,Married,EmailId_Vnr from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee_general.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee_general.EmployeeID=".$resMail2['Hod_EmployeeID'], $con); 
$resH=mysql_fetch_assoc($sqlH);  if($resH['DR']=='Y'){$H='Dr.';} elseif($resH['Gender']=='M'){$H='Mr.';} elseif($resH['Gender']=='F' AND $resH['Married']=='Y'){$H='Mrs.';} elseif($resH['Gender']=='F' AND $resH['Married']=='N'){$H='Miss.';}  $HName=$H.' '.$resH['Fname'].' '.$resH['Sname'].' '.$resH['Lname'];

/************************************************ HOD ***********************************************   
if($resH['EmailId_Vnr']!='')
{
$email_to = $resH['EmailId_Vnr'];
$email_from = 'admin@vnrseeds.co.in';
$email_subject = "Escalated cancellation resignation ";
$email_txt = "Escalated cancellation resignation";
$headers = "From: ".$email_from."\r\n"; 
$semi_rand = md5(time()); 
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n"; 
$email_message .= "The cancellation resignation application of ".$EName." has been escalated to you for action as no action was taken by the reporting manager ".$RName.". Kindly approve and log on to ESS for more details kindly log on to ESS <a href='https://www.vnrseeds.co.in'>www.vnrseeds.co.in</a>. \n\n";
$ok = @mail($email_to, $email_subject, $email_message, $headers);
} 

/************************************************ Reporting ***********************************************   
if($resR['EmailId_Vnr']!='')
{
$email_to2 = $resR['EmailId_Vnr'];
$email_from = 'admin@vnrseeds.co.in';
$email_subject = "Escalated cancel resignation ";
$email_txt = "Escalated cancel resignation";
$headers = "From: ".$email_from."\r\n"; 
$semi_rand = md5(time()); 
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n"; 
$email_message2 .= "The cancellation resignation application of ".$EName." has been escalated to your HOD as no action was taken within 5 days timeframe. \n\n";
$ok = @mail($email_to2, $email_subject, $email_message2, $headers);
} 
$sqlUp=mysql_query("update hrm_employee_separation set ScaletCancelMailHod='Y' where EmpSepId=".$resMail2['EmpSepId'], $con);

}}






/*Scalete Mailing Query */
$CurrDate=date('Y-m-d h:i:s');  
/*Rporting*/ $sqlQA = mysql_query("select * from hrm_employee_queryemp where (QStatus=0 OR QStatus=1) AND QCloseStatus='N' AND MailTo_Emp=1 AND MailTo_QueryOwner=1 AND QueryStatus_Emp!=3 AND QueryStatus_Emp!=4 AND '".$CurrDate."'>=Level_2QToDT AND '".$CurrDate."'<=Level_3QToDT order by QueryId DESC", $con); $rowQA=mysql_num_rows($sqlQA);
if($rowQA>0){ while($resQA=mysql_fetch_array($sqlQA)){
$sqlEA=mysql_query("select Fname,Sname,Lname,Gender,DR,Married,EmailId_Vnr from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee_general.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee_general.EmployeeID=".$resQA['EmployeeID'], $con); 
$resEA=mysql_fetch_assoc($sqlEA);  if($resEA['DR']=='Y'){$M2='Dr.';} elseif($resEA['Gender']=='M'){$M2='Mr.';} elseif($resEA['Gender']=='F' AND $resEA['Married']=='Y'){$M2='Mrs.';} elseif($resEA['Gender']=='F' AND $resEA['Married']=='N'){$M2='Miss.';}  $EName=$M2.' '.$resEA['Fname'].' '.$resEA['Sname'].' '.$resEA['Lname'];
$sqlRA=mysql_query("select Fname,Sname,Lname,Gender,DR,Married,EmailId_Vnr from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee_general.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee_general.EmployeeID=".$resQA['Level_1ID'], $con); 
$resRA=mysql_fetch_assoc($sqlRA);  if($resRA['DR']=='Y'){$M3='Dr.';} elseif($resRA['Gender']=='M'){$M3='Mr.';} elseif($resRA['Gender']=='F' AND $resRA['Married']=='Y'){$M3='Mrs.';} elseif($resRA['Gender']=='F' AND $resRA['Married']=='N'){$M3='Miss.';}  $RName=$M3.' '.$resRA['Fname'].' '.$resRA['Sname'].' '.$resRA['Lname'];
$sqlRA2=mysql_query("select Fname,Sname,Lname,Gender,DR,Married,EmailId_Vnr from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee_general.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee_general.EmployeeID=".$resQA['Level_2ID'], $con); 
$resRA2=mysql_fetch_assoc($sqlRA2);  if($resRA2['DR']=='Y'){$M4='Dr.';} elseif($resRA2['Gender']=='M'){$M4='Mr.';} elseif($resRA2['Gender']=='F' AND $resRA2['Married']=='Y'){$M4='Mrs.';} elseif($resRA2['Gender']=='F' AND $resRA2['Married']=='N'){$M4='Miss.';}  $R2Name=$M4.' '.$resRA2['Fname'].' '.$resRA2['Sname'].' '.$resRA2['Lname'];
if($resQA['QuerySubject']=='N'){$QS=$resQA['OtherSubject'];}else{$QS=$resQA['QuerySubject'];} if($resQA['HideYesNo']=='Y'){$name='Name Undisclosed';}else{$name=$EName;}

$sqlMK4=mysql_query("select * from hrm_employee_querymail_key where QueryMailId=4 AND CompanyId=".$CompanyId, $con); $resMK4=mysql_fetch_assoc($sqlMK4);

   if($resEA['EmailId_Vnr']!='' AND $resMK4['Employee']=='Y')   //Self AJAY
   {
    $email_to = "ajaykumar.dewangan@vnrseeds.in"; 
	//$email_to = $resEA['EmailId_Vnr'];
        $email_from = 'admin@vnrseeds.co.in';
	$email_subject = "Query scalated to next level";  $semi_rand = md5(time()); 
	$headers = "From: " . $email_from . "\r\n"; $headers .= "MIME-Version: 1.0\r\n"; $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
    $email_message .= "Dear <b>".$name."</b> <br><br>\n\n\n"; 
	$email_message .= "The query raised by you on subject-<b>".$QS."</b> could not be resolved at  level-1 and the same has been escalated to the next level (Level-2) for resolution.<br>";
	$email_message .= "The Level-2 query owner will revert on your query within 3 working days.<br><br>\n\n\n";
	$email_message .= "From <br><b>ADMIN ESS</b><br>";
    $ok = @mail($email_to, $email_subject, $email_message, $headers);
   }         

   if($resEA['EmailId_Vnr']!='' AND $resMK4['Employee']=='Y')   //Self
   { 
	$email_to22 = $resEA['EmailId_Vnr'];
        $email_from22 = 'admin@vnrseeds.co.in';
	$email_subject = "Query scalated to next level";  $semi_rand = md5(time()); 
	$headers = "From: " . $email_from22 . "\r\n"; 
        $headers .= "MIME-Version: 1.0\r\n"; $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
    $email_message .= "Dear <b>".$name."</b> <br><br>\n\n\n"; 
	$email_message22 .= "The query raised by you on subject-<b>".$QS."</b> could not be resolved at  level-1 and the same has been escalated to the next level (Level-2) for resolution.<br>";
	$email_message22 .= "The Level-2 query owner will revert on your query within 3 working days.<br><br>\n\n\n";
	$email_message22 .= "From <br><b>ADMIN ESS</b><br>";
        $ok = @mail($email_to22, $email_subject, $email_message22, $headers);
   }         
   
   
   if($resRA2['EmailId_Vnr']!='' AND $resMK4['Leve_2']=='Y')  // //Query owner(Reporting)
   {
    //$email_to2 = "ajaykumar.dewangan@vnrseeds.in";
	$email_to2 = $resRA2['EmailId_Vnr'];
    $email_from2 = 'admin@vnrseeds.co.in';
	$email_subject2 = "Escalation of query by ".$RName;  $semi_rand = md5(time()); 
	$headers2 = "From: " . $email_from2 . "\r\n";  $headers2 .= "MIME-Version: 1.0\r\n";  $headers2 .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
    $email_message2 .= "Dear <b>".$R2Name."</b> <br><br>\n\n\n";
    $email_message2 .= "The query raised by <b>".$EName."</b> on subject-<b>".$QS."</b> could not be resolved at level-1 and the same has been escalated to you for resolution, go to <b>ESS-QUERY</b> for more details <a href='https://www.vnrseeds.co.in'>www.vnrseeds.co.in</a>.<br>"; 
	$email_message2 .= "You need to answer the query in 3 working days after which it will get escalated to HOD.<br><br>\n\n\n";
	$email_message2 .= "From <br><b>ADMIN ESS</b><br>";
    $ok = @mail($email_to2, $email_subject2, $email_message2, $headers2);
   }

$sqlRH=mysql_query("select RepMgrId,Level_1ID from hrm_employee_queryemp where QueryId=".$resQA['QueryId'], $con); $resRH=mysql_fetch_assoc($sqlRH); 
$sqlR=mysql_query("select Fname,Sname,Lname,Gender,DR,Married,EmailId_Vnr from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee_general.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee_general.EmployeeID=".$resRH['RepMgrId'], $con); 
$resR=mysql_fetch_assoc($sqlR);  if($resR['DR']=='Y'){$MR='Dr.';} elseif($resR['Gender']=='M'){$MR='Mr.';} elseif($resR['Gender']=='F' AND $resR['Married']=='Y'){$MR='Mrs.';} elseif($resR['Gender']=='F' AND $resR['Married']=='N'){$MR='Miss.';}  $NameR=$MR.' '.$resR['Fname'].' '.$resR['Sname'].' '.$resR['Lname'];

$sql_1=mysql_query("select Fname,Sname,Lname,Gender,DR,Married,EmailId_Vnr from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee_general.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee_general.EmployeeID=".$resRH['Level_1ID'], $con); 
$res_1=mysql_fetch_assoc($sql_1);  if($res_1['DR']=='Y'){$M_1='Dr.';} elseif($res_1['Gender']=='M'){$M_1='Mr.';} elseif($res_1['Gender']=='F' AND $res_1['Married']=='Y'){$M_1='Mrs.';} elseif($res_1['Gender']=='F' AND $res_1['Married']=='N'){$M_1='Miss.';}  $Name_1=$M_1.' '.$res_1['Fname'].' '.$res_1['Sname'].' '.$res_1['Lname'];
   
   //Reporting Mgr
   if($resR['EmailId_Vnr']!='' AND $resMK4['ReportingMgr']=='Y')
   {
    //$email_toR = "ajaykumar.dewangan@vnrseeds.in";
	$email_toR = $resR['EmailId_Vnr'];
   $email_fromR = 'admin@vnrseeds.co.in';
	$email_subjectR = "Escalation of query in level-2.";  $semi_rand = md5(time()); 
	$headersR = "From: " . $email_fromR . "\r\n";
    $headersR .= "MIME-Version: 1.0\r\n";
    $headersR .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
    $email_messageR = "Dear <b>".$NameR."</b> <br><br>\n\n\n";
    $email_messageR .= "The query raised by your team member ".$name." on subject-<b>".$QS."</b> could not be resolved at level-1 and the same has been escalated to the next level (Level-2) for resolution.<br><br>\n\n\n";
	$email_messageR .= "From <br><b>ADMIN ESS</b><br>";
    $ok = @mail($email_toR, $email_subjectR, $email_messageR, $headersR);
   }
      
   
   //Level_1 Query owner
   if($res_1['EmailId_Vnr']!='' AND $resMK4['Leve_1']=='Y')
   {
    //$email_to_1 = "ajaykumar.dewangan@vnrseeds.in";
	$email_to_1 = $res_1['EmailId_Vnr'];
   $email_from_1 = 'admin@vnrseeds.co.in';
	$email_subject_1 = "Escalation of query in level-2.";  $semi_rand = md5(time()); 
	$headers_1 = "From: " . $email_from_1 . "\r\n";
    $headers_1 .= "MIME-Version: 1.0\r\n";
    $headers_1 .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
    $email_message_1 = "Dear <b>".$Name_1."</b> <br><br>\n\n\n";
    $email_message_1 .= "The query raised by ".$name." on subject-<b>".$QS."</b> could not be resolved at your level and the same has been escalated to your reporting manager for resolution.<br><br>\n\n\n";
	$email_message_1 .= "From <br><b>ADMIN ESS</b><br>";
    $ok = @mail($email_to_1, $email_subject_1, $email_message_1, $headers_1);
   }      
  
   $sqlUp=mysql_query("update hrm_employee_queryemp set MailTo_Emp=2, MailTo_QueryOwner=2 where QueryId=".$resQA['QueryId'], $con);
} }

/*HOD*/ $sqlQH = mysql_query("select * from hrm_employee_queryemp where (QStatus=0 OR QStatus=1) AND QCloseStatus='N' AND MailTo_Emp=2 AND MailTo_QueryOwner=2 AND QueryStatus_Emp!=3 AND QueryStatus_Emp!=4 AND '".$CurrDate."'>=Level_3QToDT AND '".$CurrDate."'<=Mngmt_QToDT order by QueryId DESC", $con); $rowQH=mysql_num_rows($sqlQH);
if($rowQH>0){ while($resQH=mysql_fetch_array($sqlQH)){
$sqlEH=mysql_query("select Fname,Sname,Lname,Gender,DR,Married,EmailId_Vnr from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee_general.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee_general.EmployeeID=".$resQH['EmployeeID'], $con); 
$resEH=mysql_fetch_assoc($sqlEH);  if($resEH['DR']=='Y'){$MH2='Dr.';} elseif($resEH['Gender']=='M'){$MH2='Mr.';} elseif($resEH['Gender']=='F' AND $resEH['Married']=='Y'){$MH2='Mrs.';} elseif($resEH['Gender']=='F' AND $resEH['Married']=='N'){$MH2='Miss.';}  $EHName=$MH2.' '.$resEH['Fname'].' '.$resEH['Sname'].' '.$resEH['Lname'];
$sqlRH=mysql_query("select Fname,Sname,Lname,Gender,DR,Married,EmailId_Vnr from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee_general.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee_general.EmployeeID=".$resQH['Level_2ID'], $con); 
$resRH=mysql_fetch_assoc($sqlRH);  if($resRH['DR']=='Y'){$MH3='Dr.';} elseif($resRH['Gender']=='M'){$MH3='Mr.';} elseif($resRH['Gender']=='F' AND $resRH['Married']=='Y'){$MH3='Mrs.';} elseif($resRH['Gender']=='F' AND $resRH['Married']=='N'){$MH3='Miss.';}  $RHName=$MH3.' '.$resRH['Fname'].' '.$resRH['Sname'].' '.$resRH['Lname'];
$sqlRH2=mysql_query("select Fname,Sname,Lname,Gender,DR,Married,EmailId_Vnr from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee_general.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee_general.EmployeeID=".$resQH['Level_3ID'], $con); 
$resRH2=mysql_fetch_assoc($sqlRH2);  if($resRH2['DR']=='Y'){$MH4='Dr.';} elseif($resRH2['Gender']=='M'){$MH4='Mr.';} elseif($resRH2['Gender']=='F' AND $resRH2['Married']=='Y'){$MH4='Mrs.';} elseif($resRH2['Gender']=='F' AND $resRH2['Married']=='N'){$MH4='Miss.';}  $RH2Name=$MH4.' '.$resRH2['Fname'].' '.$resRH2['Sname'].' '.$resRH2['Lname'];
if($resQH['QuerySubject']=='N'){$QSH=$resQH['OtherSubject'];}else{$QSH=$resQH['QuerySubject'];} if($resQH['HideYesNo']=='Y'){$nameH='Name Undisclosed';}else{$nameH=$EHName;}

$sqlMK5=mysql_query("select * from hrm_employee_querymail_key where QueryMailId=5 AND CompanyId=".$CompanyId, $con); $resMK5=mysql_fetch_assoc($sqlMK5);

   if($resEH['EmailId_Vnr']!='' AND $resMK5['Employee']=='Y')   //Self
   {
    //$email_toH = "ajaykumar.dewangan@vnrseeds.in"; 
	$email_toH = $resEH['EmailId_Vnr'];
    $email_fromH = 'admin@vnrseeds.co.in';
	$email_subjectH = "Query scalated to next level";  $semi_rand = md5(time()); 
	$headersH = "From: " . $email_fromH . "\r\n"; $headersH .= "MIME-Version: 1.0\r\n"; $headersH .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
    $email_messageH .= "Dear <b>".$nameH."</b> <br><br>\n\n\n"; 
	$email_messageH .= "The query raised by you on subject-<b>".$QSH."</b> could not be resolved at level-2 and the same has been escalated to the next level (Level-3) for resolution.</b>.<br>";
	$email_messageH .= "The Level-3 query owner will revert on your query within 3 working days.<br><br>\n\n\n";
	$email_messageH .= "From <br><b>ADMIN ESS</b><br>";
    $ok = @mail($email_toH, $email_subjectH, $email_messageH, $headersH);
   }

   
   if($resRH2['EmailId_Vnr']!='' AND $resMK5['Leve_3']=='Y')  // //Query owner(HOD)
   {
    //$email_toH2 = "ajaykumar.dewangan@vnrseeds.in";
	$email_toH2 = $resRH2['EmailId_Vnr'];
    $email_fromH2 = 'admin@vnrseeds.co.in';
	$email_subjectH2 = "Escalation of query by ".$RHName;  $semi_rand = md5(time()); 
	$headersH2 = "From: " . $email_fromH2 . "\r\n";  $headersH2 .= "MIME-Version: 1.0\r\n";  $headersH2 .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
    $email_messageH2 .= "Dear <b>".$RH2Name."</b> <br><br>\n\n\n";
    $email_messageH2 .= "The query raised by <b>".$EHName."</b> on subject-<b>".$QSH."</b> could not be resolved at level-1 & Level-2 and the same has been escalated to you for resolution, go to <b>ESS-QUERY</b> for more details <a href='https://www.vnrseeds.co.in'>www.vnrseeds.co.in</a>.<br>"; 
	$email_messageH2 .= "You need to answer the query in 3 working days after which it will get escalated to Management.<br><br>\n\n\n";
	$email_messageH2 .= "From <br><b>ADMIN ESS</b><br>";
    $ok = @mail($email_toH2, $email_subjectH2, $email_messageH2, $headersH2);
   }
   
$sqlRH2=mysql_query("select RepMgrId,Level_2ID from hrm_employee_queryemp where QueryId=".$resQH['QueryId'], $con); $resRH2=mysql_fetch_assoc($sqlRH2); 
$sqlR2=mysql_query("select Fname,Sname,Lname,Gender,DR,Married,EmailId_Vnr from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee_general.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee_general.EmployeeID=".$resRH2['RepMgrId'], $con); 
$resR2=mysql_fetch_assoc($sqlR2);  if($resR2['DR']=='Y'){$MR2='Dr.';} elseif($resR2['Gender']=='M'){$MR2='Mr.';} elseif($resR2['Gender']=='F' AND $resR2['Married']=='Y'){$MR2='Mrs.';} elseif($resR2['Gender']=='F' AND $resR2['Married']=='N'){$MR2='Miss.';}  $NameR2=$MR2.' '.$resR2['Fname'].' '.$resR2['Sname'].' '.$resR2['Lname'];

$sql_2=mysql_query("select Fname,Sname,Lname,Gender,DR,Married,EmailId_Vnr from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee_general.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee_general.EmployeeID=".$resRH2['Level_2ID'], $con); 
$res_2=mysql_fetch_assoc($sql_2);  if($res_2['DR']=='Y'){$M_2='Dr.';} elseif($res_2['Gender']=='M'){$M_2='Mr.';} elseif($res_2['Gender']=='F' AND $res_2['Married']=='Y'){$M_2='Mrs.';} elseif($res_2['Gender']=='F' AND $res_2['Married']=='N'){$M_2='Miss.';}  $Name_2=$M_2.' '.$res_2['Fname'].' '.$res_2['Sname'].' '.$res_2['Lname'];
   
   //Reporting Mgr
   if($resR2['EmailId_Vnr']!='' AND $resMK5['ReportingMgr']=='Y')
   {
    //$email_toR2 = "ajaykumar.dewangan@vnrseeds.in";
	$email_toR2 = $resR2['EmailId_Vnr'];
    $email_fromR2 = 'admin@vnrseeds.co.in';
	$email_subjectR2 = "Escalation of query in level-3.";  $semi_rand = md5(time()); 
	$headersR2 = "From: " . $email_fromR2 . "\r\n";
    $headersR2 .= "MIME-Version: 1.0\r\n";
    $headersR2 .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
    $email_messageR2 = "Dear <b>".$NameR2."</b> <br><br>\n\n\n";
    $email_messageR2 .= "The query raised by your team member ".$name." on subject-<b>".$QSH."</b> could not be resolved at level-2 and the same has been further escalated to the next level (Level-3) for resolution.<br><br>\n\n\n";
	$email_messageR2 .= "From <br><b>ADMIN ESS</b><br>";
    $ok = @mail($email_toR2, $email_subjectR2, $email_messageR2, $headersR2);
   }
      
   
   //Level_2 Query owner
   if($res_1['EmailId_Vnr']!='' AND $resMK5['Leve_2']=='Y')
   {
    //$email_to_2 = "ajaykumar.dewangan@vnrseeds.in";
	$email_to_2 = $res_2['EmailId_Vnr'];
    $email_from_2 = 'admin@vnrseeds.co.in';
	$email_subject_2 = "Escalation of query in level-3.";  $semi_rand = md5(time()); 
	$headers_2 = "From: " . $email_from_2 . "\r\n";
    $headers_2 .= "MIME-Version: 1.0\r\n";
    $headers_2 .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
    $email_message_2 = "Dear <b>".$Name_2."</b> <br><br>\n\n\n";
    $email_message_2 .= "The query raised by ".$name." on subject-<b>".$QSH."</b> could not be resolved at your level and the same has been escalated to your HOD for resolution.<br><br>\n\n\n";
	$email_message_2 .= "From <br><b>ADMIN ESS</b><br>";
    $ok = @mail($email_to_2, $email_subject_2, $email_message_2, $headers_2);
   }  
   
   $sqlUp=mysql_query("update hrm_employee_queryemp set MailTo_Emp=3, MailTo_QueryOwner=3 where QueryId=".$resQH['QueryId'], $con);
} }

/*management*/ $sqlQM = mysql_query("select * from hrm_employee_queryemp where (QStatus=0 OR QStatus=1) AND QCloseStatus='N' AND MailTo_Emp=3 AND MailTo_QueryOwner=3 AND QueryStatus_Emp!=3 AND QueryStatus_Emp!=4 AND '".$CurrDate."'>Mngmt_QToDT order by QueryId DESC", $con); $rowQM=mysql_num_rows($sqlQM);
if($rowQM>0){ while($resQM=mysql_fetch_array($sqlQM)){
$sqlEM=mysql_query("select Fname,Sname,Lname,Gender,DR,Married,EmailId_Vnr from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee_general.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee_general.EmployeeID=".$resQM['EmployeeID'], $con); 
$resEM=mysql_fetch_assoc($sqlEM);  if($resEM['DR']=='Y'){$MM2='Dr.';} elseif($resEM['Gender']=='M'){$MM2='Mr.';} elseif($resEM['Gender']=='F' AND $resEM['Married']=='Y'){$MM2='Mrs.';} elseif($resEM['Gender']=='F' AND $resEM['Married']=='N'){$MM2='Miss.';}  $EMName=$MM2.' '.$resEM['Fname'].' '.$resEM['Sname'].' '.$resEM['Lname'];
$sqlRM=mysql_query("select Fname,Sname,Lname,Gender,DR,Married,EmailId_Vnr from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee_general.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee_general.EmployeeID=".$resQM['Level_3ID'], $con); 
$resRM=mysql_fetch_assoc($sqlRM);  if($resRM['DR']=='Y'){$MM3='Dr.';} elseif($resRM['Gender']=='M'){$MM3='Mr.';} elseif($resRM['Gender']=='F' AND $resRM['Married']=='Y'){$MM3='Mrs.';} elseif($resRM['Gender']=='F' AND $resRM['Married']=='N'){$MM3='Miss.';}  $RMName=$MM3.' '.$resRM['Fname'].' '.$resRM['Sname'].' '.$resRM['Lname'];
$sqlRM2=mysql_query("select Fname,Sname,Lname,Gender,DR,Married,EmailId_Vnr from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee_general.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee_general.EmployeeID=".$resQM['Mngmt_ID'], $con); 
$resRM2=mysql_fetch_assoc($sqlRM2);  if($resRM2['DR']=='Y'){$MM4='Dr.';} elseif($resRM2['Gender']=='M'){$MM4='Mr.';} elseif($resRM2['Gender']=='F' AND $resRM2['Married']=='Y'){$MM4='Mrs.';} elseif($resRM2['Gender']=='F' AND $resRM2['Married']=='N'){$MM4='Miss.';}  $RM2Name=$MM4.' '.$resRM2['Fname'].' '.$resRM2['Sname'].' '.$resRM2['Lname'];
if($resQM['QuerySubject']=='N'){$QSM=$resQM['OtherSubject'];}else{$QSM=$resQM['QuerySubject'];} if($resQM['HideYesNo']=='Y'){$nameM='Name Undisclosed';}else{$nameM=$EMName;}

$sqlMK6=mysql_query("select * from hrm_employee_querymail_key where QueryMailId=6 AND CompanyId=".$CompanyId, $con); $resMK6=mysql_fetch_assoc($sqlMK6);


   if($resEM['EmailId_Vnr']!='' AND $resMK6['Employee']=='Y')   //Self
   {
    //$email_toM = "ajaykumar.dewangan@vnrseeds.in"; 
	$email_toM = $resEM['EmailId_Vnr'];
    $email_fromM = 'admin@vnrseeds.co.in';
	$email_subjectM = "Query scalated to next level";  $semi_rand = md5(time()); 
	$headersM = "From: " . $email_fromM . "\r\n"; $headersM .= "MIME-Version: 1.0\r\n"; $headersM .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
    $email_messageM .= "Dear <b>".$nameM."</b> <br><br>\n\n\n"; 
	$email_messageM .= "The query raised by you on subject-<b>".$QSM."</b> could not be resolved at level-3 and the same has been escalated to the Management for resolution.</b>.<br>";
	$email_messageM .= "The Management will revert on your query within 3 working days.<br><br>\n\n\n";
	$email_messageM .= "From <br><b>ADMIN ESS</b><br>";
    $ok = @mail($email_toM, $email_subjectM, $email_messageM, $headersM);
   }

   
   if($resRM2['EmailId_Vnr']!='' AND $resMK6['Leve_4']=='Y')  //Query owner(MANAGEMENT)
   {
    //$email_toM2 = "ajaykumar.dewangan@vnrseeds.in";
	$email_toM2 = $resRM2['EmailId_Vnr'];
    $email_fromM2 = 'admin@vnrseeds.co.in';
	$email_subjectM2 = "Escalation of query by ".$RMName;  $semi_rand = md5(time()); 
	$headersM2 = "From: " . $email_fromM2 . "\r\n";  $headersM2 .= "MIME-Version: 1.0\r\n";  $headersM2 .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
    $email_messageM2 .= "Dear <b>".$RM2Name."</b> <br><br>\n\n\n";
    $email_messageM2 .= "The query raised by <b>".$EMName."</b> on subject-<b>".$QSM."</b> could not be resolved at level-1, level2 & Level-3 and the same has been escalated to you for resolution, go to <b>ESS-QUERY</b> for more details <a href='https://www.vnrseeds.co.in'>www.vnrseeds.co.in</a>.<br>"; 
	$email_messageM2 .= "You need to answer the query in 3 working days and close it.<br><br>\n\n\n";
	$email_messageM2 .= "From <br><b>ADMIN ESS</b><br>";
    $ok = @mail($email_toM2, $email_subjectM2, $email_messageM2, $headersM2);
   } 

   
$sqlRM=mysql_query("select RepMgrId,Level_3ID from hrm_employee_queryemp where QueryId=".$resQM['QueryId'], $con); $resRM=mysql_fetch_assoc($sqlRM); 
$sqlR3=mysql_query("select Fname,Sname,Lname,Gender,DR,Married,EmailId_Vnr from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee_general.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee_general.EmployeeID=".$resRM['RepMgrId'], $con); 
$resR3=mysql_fetch_assoc($sqlR3);  if($resR3['DR']=='Y'){$MR3='Dr.';} elseif($resR3['Gender']=='M'){$MR3='Mr.';} elseif($resR3['Gender']=='F' AND $resR3['Married']=='Y'){$MR3='Mrs.';} elseif($resR3['Gender']=='F' AND $resR3['Married']=='N'){$MR3='Miss.';}  $NameR3=$MR3.' '.$resR3['Fname'].' '.$resR3['Sname'].' '.$resR3['Lname'];

$sql_3=mysql_query("select Fname,Sname,Lname,Gender,DR,Married,EmailId_Vnr from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee_general.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee_general.EmployeeID=".$resRM['Level_3ID'], $con); 
$res_3=mysql_fetch_assoc($sql_3);  if($res_3['DR']=='Y'){$M_3='Dr.';} elseif($res_3['Gender']=='M'){$M_3='Mr.';} elseif($res_3['Gender']=='F' AND $res_3['Married']=='Y'){$M_3='Mrs.';} elseif($res_3['Gender']=='F' AND $res_3['Married']=='N'){$M_3='Miss.';}  $Name_3=$M_3.' '.$res_3['Fname'].' '.$res_3['Sname'].' '.$res_3['Lname'];
   
   //Reporting Mgr
   if($resR3['EmailId_Vnr']!='' AND $resMK6['ReportingMgr']=='Y')
   {
    //$email_toR3 = "ajaykumar.dewangan@vnrseeds.in";
	$email_toR3 = $resR3['EmailId_Vnr'];
    $email_fromR3 = 'admin@vnrseeds.co.in';
	$email_subjectR3 = "Escalation of query in level-4.";  $semi_rand = md5(time()); 
	$headersR3 = "From: " . $email_fromR3 . "\r\n";
    $headersR3 .= "MIME-Version: 1.0\r\n";
    $headersR3 .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
    $email_messageR3 = "Dear <b>".$NameR3."</b> <br><br>\n\n\n";
    $email_messageR3 .= "The query raised by your team member ".$name." on subject-<b>".$QSM."</b> could not be resolved at level-3 and the same has been further escalated to management (Level-4) for resolution.<br><br>\n\n\n";
	$email_messageR3 .= "From <br><b>ADMIN ESS</b><br>";
    $ok = @mail($email_toR3, $email_subjectR3, $email_messageR3, $headersR3);
   }       
      
   
   //Level_3 Query owner
   if($res_1['EmailId_Vnr']!='' AND $resMK4['Leve_3']=='Y')
   {
    //$email_to_3 = "ajaykumar.dewangan@vnrseeds.in";
	$email_to_3 = $res_3['EmailId_Vnr'];
    $email_from_3 = 'admin@vnrseeds.co.in';
	$email_subject_3 = "Escalation of query in level-3.";  $semi_rand = md5(time()); 
	$headers_3 = "From: " . $email_from_3 . "\r\n";
    $headers_3 .= "MIME-Version: 1.0\r\n";
    $headers_3 .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
    $email_message_3 = "Dear <b>".$Name_3."</b> <br><br>\n\n\n";
    $email_message_3 .= "The query raised by ".$name." on subject-<b>".$QSM."</b> could not be resolved at your level and the same has been escalated to your management for resolution.<br><br>\n\n\n";
	$email_message_3 .= "From <br><b>ADMIN ESS</b><br>";
    $ok = @mail($email_to_3, $email_subject_3, $email_message_3, $headers_3);
   }     
   
   $sqlUp=mysql_query("update hrm_employee_queryemp set MailTo_Emp=4, MailTo_QueryOwner=4 where QueryId=".$resQM['QueryId'], $con);
} }



/*Scalete Mailing KRA */
$sqlSY=mysql_query("select OldY,CurrY,NewY from hrm_pms_setting where CompanyId=".$CompanyId." AND Process='KRA'", $con); $resSY=mysql_fetch_array($sqlSY); 
$sqlK = mysql_query("select EmployeeID from hrm_employee where EmpStatus='A' AND CompanyId=".$CompanyId, $con); 
while($resK=mysql_fetch_array($sqlK))
{ 
 $sqlK2 = mysql_query("select KraId,UseKRA from hrm_pms_kra where YearId=".$resSY['CurrY']." AND EmployeeID=".$resK['EmployeeID'], $con); $rowK2=mysql_num_rows($sqlK2); 
 if($rowK2==0)
 {
   $sqlKE=mysql_query("select Fname,Sname,Lname,Gender,DR,Married,EmailId_Vnr,RepEmployeeID,DateJoining from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee.EmployeeID=".$resK['EmployeeID'], $con); $resKE=mysql_fetch_assoc($sqlKE); 
   if($resKE['DR']=='Y'){$E='Dr.';} elseif($resKE['Gender']=='M'){$E='Mr.';} elseif($resKE['Gender']=='F' AND $resKE['Married']=='Y'){$E='Mrs.';} elseif($resKE['Gender']=='F' AND $resKE['Married']=='N'){$E='Miss.';}  $EName=$E.' '.$resKE['Fname'].' '.$resKE['Sname'].' '.$resKE['Lname'];
   
   $sqlKR=mysql_query("select Fname,Sname,Lname,Gender,DR,Married,EmailId_Vnr from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee_general.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee_general.EmployeeID=".$resKE['RepEmployeeID'], $con); $resKR=mysql_fetch_assoc($sqlKR); 
   if($resKR['DR']=='Y'){$R='Dr.';} elseif($resKR['Gender']=='M'){$R='Mr.';} elseif($resKR['Gender']=='F' AND $resKR['Married']=='Y'){$R='Mrs.';} elseif($resKR['Gender']=='F' AND $resKR['Married']=='N'){$E='Miss.';}  $RName=$R.' '.$resKR['Fname'].' '.$resKR['Sname'].' '.$resKR['Lname'];
   
   $sqlSch=mysql_query("select EmpFromDate,EmpToDate from hrm_pms_appdate where AssessmentYear=".$resSY['CurrY']." AND CompanyId=".$CompanyId, $con); 
   $resSch=mysql_fetch_assoc($sqlSch);
   $Before31Day=date("Y-m-d",strtotime('-30 day'));  $After31DayDoJ=date("Y-m-d",strtotime($resKE['DateJoining'].'+31 day')); $CuDate=date("Y-m-d");
     
   if(date("Y-m-d")>=$resKE['DateJoining'] AND date("Y-m-d")<=$After31DayDoJ)
   { 
    $sqlKCh=mysql_query("select ScalateKraId from hrm_com_mail_scalate_kra where EmployeeID=".$resK['EmployeeID']." AND ScalateKraYN='Y' AND CompanyId=".$CompanyId." AND YearId=".$resSY['CurrY'], $con); $rowKCh=mysql_num_rows($sqlKCh); 
	if($rowKCh>0)
	{ 
	  $sqlKCh2=mysql_query("select MAX(ScalateKraId) as MxID from hrm_com_mail_scalate_kra where EmployeeID=".$resK['EmployeeID']." AND ScalateKraYN='Y' AND CompanyId=".$CompanyId." AND YearId=".$resSY['CurrY'], $con); $resKCh2=mysql_fetch_assoc($sqlKCh2);
	  $sqlK2Ch=mysql_query("select ScalateKraDate from hrm_com_mail_scalate_kra where EmployeeID=".$resK['EmployeeID']." AND ScalateKraId=".$resKCh2['MxID'], $con); 
	  $resK2Ch=mysql_fetch_assoc($sqlK2Ch); $After7Day=date("Y-m-d",strtotime($resK2Ch['ScalateKraDate'].'+7 day'));  
	  if(date("Y-m-d")>=$After7Day AND $resKE['EmailId_Vnr']!='') //Employee
	  {
       $email_toEK = $resKE['EmailId_Vnr']; 
       $email_fromEK = 'admin@vnrseeds.co.in';
	   $email_subjectEK = "Reminder for submission of KRA";  $semi_rand = md5(time()); 
	   $headersEK = "From: " . $email_fromEK . "\r\n"; $headersEK .= "MIME-Version: 1.0\r\n"; $headersEK .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
       $email_messageEK .= "Dear <b>".$EName."</b> <br><br>\n\n\n"; 
	   $email_messageEK .= "Please finalise your KRA with your reporting manager and submit the same by.<br><br>\n\n\n";
	   $email_messageEK .= "From <br><b>ADMIN ESS</b><br>";
       //$okEK = @mail($email_toEK, $email_subjectEK, $email_messageEK, $headersEK);
	  }
	  if(date("Y-m-d")>=$After7Day AND $resKR['EmailId_Vnr']!='') //Reporting
	  {
       $email_toRK = $resKR['EmailId_Vnr']; 
       $email_fromRK = 'admin@vnrseeds.co.in';
	   $email_subjectRK = "Reminder for submission of KRA";  $semi_rand = md5(time()); 
	   $headersRK = "From: " . $email_fromRK . "\r\n"; $headersRK .= "MIME-Version: 1.0\r\n"; $headersRK .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
       $email_messageRK .= "Dear <b>".$RName."</b> <br><br>\n\n\n"; 
	   $email_messageRK .= "Your team member <b>".$EName."</b> has not submitted the KRA, kindly finalise and ensure submission of the same.<br><br>\n\n\n";
	   $email_messageRK .= "From <br><b>ADMIN ESS</b><br>";
       $okRK = @mail($email_toRK, $email_subjectRK, $email_messageRK, $headersRK);
	  }
	}
	if($rowKCh==0)
	{ 
	  if($resKE['EmailId_Vnr']!='') //Employee
	  {
       $email_toEK = $resKE['EmailId_Vnr']; 
       $email_fromEK = 'admin@vnrseeds.co.in';
	   $email_subjectEK = "Reminder for submission of KRA";  $semi_rand = md5(time()); 
	   $headersEK = "From: " . $email_fromEK . "\r\n"; $headersEK .= "MIME-Version: 1.0\r\n"; $headersEK .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
       $email_messageEK .= "Dear <b>".$EName."</b> <br><br>\n\n\n"; 
	   $email_messageEK .= "Please finalise your KRA with your reporting manager and submit the same by.<br><br>\n\n\n";
	   $email_messageEK .= "From <br><b>ADMIN ESS</b><br>";
       $okEK = @mail($email_toEK, $email_subjectEK, $email_messageEK, $headersEK);
	  }
	  if($resKR['EmailId_Vnr']!='') //Reporting
	  {
       $email_toRK = $resKR['EmailId_Vnr']; 
       $email_fromRK = 'admin@vnrseeds.co.in';
	   $email_subjectRK = "Reminder for submission of KRA";  $semi_rand = md5(time()); 
	   $headersRK = "From: " . $email_fromRK . "\r\n"; $headersRK .= "MIME-Version: 1.0\r\n"; $headersRK .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
       $email_messageRK .= "Dear <b>".$RName."</b> <br><br>\n\n\n"; 
	   $email_messageRK .= "Your team member <b>".$EName."</b> has not submitted the KRA, kindly finalise and ensure submission of the same.<br><br>\n\n\n";
	   $email_messageRK .= "From <br><b>ADMIN ESS</b><br>";
       $okRK = @mail($email_toRK, $email_subjectRK, $email_messageRK, $headersRK);
	  }
	}
   }  
   if(date("Y-m-d")>$After31DayDoJ AND ($CuDate<$resSch['EmpFromDate'] OR $CuDate>$resSch['EmpToDate']))
   { 
    $sqlKCh=mysql_query("select ScalateKraId from hrm_com_mail_scalate_kra where EmployeeID=".$resK['EmployeeID']." AND ScalateKraYN='Y' AND CompanyId=".$CompanyId." AND YearId=".$resSY['CurrY'], $con); $rowKCh=mysql_num_rows($sqlKCh); 
	if($rowKCh>0)
	{ 
	  $sqlKCh2=mysql_query("select MAX(ScalateKraId) as MxID from hrm_com_mail_scalate_kra where EmployeeID=".$resK['EmployeeID']." AND ScalateKraYN='Y' AND CompanyId=".$CompanyId." AND YearId=".$resSY['CurrY'], $con); $resKCh2=mysql_fetch_assoc($sqlKCh2);
	  $sqlK2Ch=mysql_query("select ScalateKraDate from hrm_com_mail_scalate_kra where EmployeeID=".$resK['EmployeeID']." AND ScalateKraId=".$resKCh2['MxID'], $con); 
	  $resK2Ch=mysql_fetch_assoc($sqlK2Ch); $After7Day=date("Y-m-d",strtotime($resK2Ch['ScalateKraDate'].'+7 day'));  
	  if(date("Y-m-d")>=$After7Day AND $resKE['EmailId_Vnr']!='') //Employee
	  {
       $email_toEK = $resKE['EmailId_Vnr']; 
       $email_fromEK = 'admin@vnrseeds.co.in';
	   $email_subjectEK = "Reminder for submission of KRA";  $semi_rand = md5(time()); 
	   $headersEK = "From: " . $email_fromEK . "\r\n"; $headersEK .= "MIME-Version: 1.0\r\n"; $headersEK .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
       $email_messageEK .= "Dear <b>".$EName."</b> <br><br>\n\n\n"; 
	   $email_messageEK .= "Please finalise your KRA with your reporting manager and submit the same by.<br><br>\n\n\n";
	   $email_messageEK .= "From <br><b>ADMIN ESS</b><br>";
       $okEK = @mail($email_toEK, $email_subjectEK, $email_messageEK, $headersEK);
	  }
	  if(date("Y-m-d")>=$After7Day AND $resKR['EmailId_Vnr']!='') //Reporting
	  {
       $email_toRK = $resKR['EmailId_Vnr']; 
       $email_fromRK = 'admin@vnrseeds.co.in';
	   $email_subjectRK = "Reminder for submission of KRA";  $semi_rand = md5(time()); 
	   $headersRK = "From: " . $email_fromRK . "\r\n"; $headersRK .= "MIME-Version: 1.0\r\n"; $headersRK .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
       $email_messageRK .= "Dear <b>".$RName."</b> <br><br>\n\n\n"; 
	   $email_messageRK .= "The KRA of your team member <b>".$EName."</b> has not submitted on completion of one month, kindly intervene and ensure submission of the same.<br><br>\n\n\n";
	   $email_messageRK .= "From <br><b>ADMIN ESS</b><br>";
       $okRK = @mail($email_toRK, $email_subjectRK, $email_messageRK, $headersRK);
	  }
	}
	if($rowKCh==0)
	{ 
	  if($resKE['EmailId_Vnr']!='') //Employee
	  {
       $email_toEK = $resKE['EmailId_Vnr']; 
       $email_fromEK = 'admin@vnrseeds.co.in';
	   $email_subjectEK = "Reminder for submission of KRA";  $semi_rand = md5(time()); 
	   $headersEK = "From: " . $email_fromEK . "\r\n"; $headersEK .= "MIME-Version: 1.0\r\n"; $headersEK .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
       $email_messageEK .= "Dear <b>".$EName."</b> <br><br>\n\n\n"; 
	   $email_messageEK .= "Please finalise your KRA with your reporting manager and submit the same by.<br><br>\n\n\n";
	   $email_messageEK .= "From <br><b>ADMIN ESS</b><br>";
       $okEK = @mail($email_toEK, $email_subjectEK, $email_messageEK, $headersEK);
	  }
	  if($resKR['EmailId_Vnr']!='') //Reporting
	  {
       $email_toRK = $resKR['EmailId_Vnr']; 
       $email_fromRK = 'admin@vnrseeds.co.in';
	   $email_subjectRK = "Reminder for submission of KRA";  $semi_rand = md5(time()); 
	   $headersRK = "From: " . $email_fromRK . "\r\n"; $headersRK .= "MIME-Version: 1.0\r\n"; $headersRK .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
       $email_messageRK .= "Dear <b>".$RName."</b> <br><br>\n\n\n"; 
	   $email_messageRK .= "The KRA of your team member <b>".$EName."</b> has not submitted on completion of one month, kindly intervene and ensure submission of the same.<br><br>\n\n\n";
	   $email_messageRK .= "From <br><b>ADMIN ESS</b><br>";
       $okRK = @mail($email_toRK, $email_subjectRK, $email_messageRK, $headersRK);
	  }
	}
   } 
   
    
 }
 if($rowK2>0)
 { $sqlK3 = mysql_query("select * from hrm_pms_kra where YearId=".$resSY['CurrY']." AND EmployeeID=".$resK['EmployeeID'], $con); $resK3=mysql_fetch_assoc($sqlK3); 
   $sqlKE=mysql_query("select Fname,Sname,Lname,Gender,DR,Married,EmailId_Vnr,RepEmployeeID,DateJoining from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee.EmployeeID=".$resK['EmployeeID'], $con); $resKE=mysql_fetch_assoc($sqlKE); 
   if($resK3['EmpStatus']=='P')
   {
     if($resKE['DR']=='Y'){$E='Dr.';} elseif($resKE['Gender']=='M'){$E='Mr.';} elseif($resKE['Gender']=='F' AND $resKE['Married']=='Y'){$E='Mrs.';} elseif($resKE['Gender']=='F' AND $resKE['Married']=='N'){$E='Miss.';}  $EName=$E.' '.$resKE['Fname'].' '.$resKE['Sname'].' '.$resKE['Lname'];
	 
	 $sqlKCh=mysql_query("select ScalateKraId from hrm_com_mail_scalate_kra where EmployeeID=".$resK['EmployeeID']." AND ScalateKraYN='Y' AND CompanyId=".$CompanyId." AND YearId=".$resSY['CurrY'], $con); $rowKCh=mysql_num_rows($sqlKCh); 
	if($rowKCh>0)
	{  
	  $sqlKCh2=mysql_query("select MAX(ScalateKraId) as MxID from hrm_com_mail_scalate_kra where EmployeeID=".$resK['EmployeeID']." AND ScalateKraYN='Y' AND CompanyId=".$CompanyId." AND YearId=".$resSY['CurrY'], $con); $resKCh2=mysql_fetch_assoc($sqlKCh2);
	  $sqlK2Ch=mysql_query("select ScalateKraDate from hrm_com_mail_scalate_kra where EmployeeID=".$resK['EmployeeId']." AND ScalateKraId=".$resKCh2['MxID'], $con); 
	  $resK2Ch=mysql_fetch_assoc($sqlK2Ch); $After7Day=date("Y-m-d",strtotime($resK2Ch['ScalateKraDate'].'+7 day'));  
	  if(date("Y-m-d")>=$After7Day AND $resKE['EmailId_Vnr']!='') //Employee
	  {
       $email_toEK = $resKE['EmailId_Vnr']; 
       $email_fromEK = 'admin@vnrseeds.co.in';
	   $email_subjectEK = "Reminder for submission of KRA";  $semi_rand = md5(time()); 
	   $headersEK = "From: " . $email_fromEK . "\r\n"; $headersEK .= "MIME-Version: 1.0\r\n"; $headersEK .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
       $email_messageEK .= "Dear <b>".$EName."</b> <br><br>\n\n\n"; 
	   $email_messageEK .= "Please finalise your KRA from final submit button.<br><br>\n\n\n";
	   $email_messageEK .= "From <br><b>ADMIN ESS</b><br>";
       $okEK = @mail($email_toEK, $email_subjectEK, $email_messageEK, $headersEK);
	  }
	}
	if($rowKCh==0)
	{ 
	  if($resKE['EmailId_Vnr']!='') //Employee
	  {
       $email_toEK = $resKE['EmailId_Vnr']; 
       $email_fromEK = 'admin@vnrseeds.co.in';
	   $email_subjectEK = "Reminder for submission of KRA";  $semi_rand = md5(time()); 
	   $headersEK = "From: " . $email_fromEK . "\r\n"; $headersEK .= "MIME-Version: 1.0\r\n"; $headersEK .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
       $email_messageEK .= "Dear <b>".$EName."</b> <br><br>\n\n\n"; 
	   $email_messageEK .= "Please finalise your KRA from final submit button.<br><br>\n\n\n";
	   $email_messageEK .= "From <br><b>ADMIN ESS</b><br>";
       $okEK = @mail($email_toEK, $email_subjectEK, $email_messageEK, $headersEK);
	  }
	}
	
   }
   if($resK3['AppStatus']=='P')
   {
     $sqlKR=mysql_query("select Fname,Sname,Lname,Gender,DR,Married,EmailId_Vnr from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee_general.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee_general.EmployeeID=".$resKE['RepEmployeeID'], $con); $resKR=mysql_fetch_assoc($sqlKR); 
     if($resKR['DR']=='Y'){$R='Dr.';} elseif($resKR['Gender']=='M'){$R='Mr.';} elseif($resKR['Gender']=='F' AND $resKR['Married']=='Y'){$R='Mrs.';} elseif($resKR['Gender']=='F' AND $resKR['Married']=='N'){$E='Miss.';}  $RName=$R.' '.$resKR['Fname'].' '.$resKR['Sname'].' '.$resKR['Lname'];
	 $sqlKCh=mysql_query("select MAX(ScalateKraId) as MxID from hrm_com_mail_scalate_kra where EmployeeID=".$resK['EmployeeId']." AND ScalateKraYN='Y' AND CompanyId=".$CompanyId." AND YearId=".$resSY['CurrY'], $con); $rowKCh=mysql_num_rows($sqlKCh); 
	if($rowKCh>0)
	{ $resKCh=mysql_fetch_assoc($sqlKCh); 
	  $sqlK2Ch=mysql_query("select ScalateKraDate from hrm_com_mail_scalate_kra where EmployeeID=".$resK['EmployeeId']." AND ScalateKraId=".$resKCh['MxID'], $con); 
	  $resK2Ch=mysql_fetch_assoc($sqlK2Ch); $After7Day=date("Y-m-d",strtotime($resK2Ch['ScalateKraDate'].'+7 day'));  
	  if(date("Y-m-d")>=$After7Day AND $resKR['EmailId_Vnr']!='') //Reporting
	  {
       $email_toRK = $resKR['EmailId_Vnr']; 
       $email_fromRK = 'admin@vnrseeds.co.in';
	   $email_subjectRK = "Reminder for submission of KRA";  $semi_rand = md5(time()); 
	   $headersRK = "From: " . $email_fromRK . "\r\n"; $headersRK .= "MIME-Version: 1.0\r\n"; $headersRK .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
       $email_messageRK .= "Dear <b>".$RName."</b> <br><br>\n\n\n"; 
	   $email_messageRK .= "Your team member <b>".$EName."</b> has submitted the KRA, kindly approve the same in ESS.<br><br>\n\n\n";
	   $email_messageRK .= "From <br><b>ADMIN ESS</b><br>";
       $okRK = @mail($email_toRK, $email_subjectRK, $email_messageRK, $headersRK);
	  }
	}
	if($rowKCh==0)
	{ 
	  if($resKR['EmailId_Vnr']!='') //Reporting
	  {
       $email_toRK = $resKR['EmailId_Vnr']; 
       $email_fromRK = 'admin@vnrseeds.co.in';
	   $email_subjectRK = "Reminder for submission of KRA";  $semi_rand = md5(time()); 
	   $headersRK = "From: " . $email_fromRK . "\r\n"; $headersRK .= "MIME-Version: 1.0\r\n"; $headersRK .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
       $email_messageRK .= "Dear <b>".$RName."</b> <br><br>\n\n\n"; 
	   $email_messageRK .= "Your team member <b>".$EName."</b> has submitted the KRA, kindly approve the same in ESS.<br><br>\n\n\n";
	   $email_messageRK .= "From <br><b>ADMIN ESS</b><br>";
       $okRK = @mail($email_toRK, $email_subjectRK, $email_messageRK, $headersRK);
	  }
	}
	
   }
 }
}

$InsTh=mysql_query("insert into hrm_com_mail_scalate(ScalateDate,ScalateYN,CompanyId) values('".date("Y-m-d")."','Y',".$CompanyId.")", $con);

} // Check Close //

 ?>
