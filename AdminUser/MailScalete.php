<?php 
$sqlThChQue=mysql_query("select * from hrm_com_mail_scalate where ScalateDate='".date("Y-m-d")."' AND QueYN='Y' AND CompanyId=".$CompanyId, $con); 
$rowThChQue=mysql_num_rows($sqlThChQue);
if($rowThChQue==0)
{ 

/*Scalete Mailing Query */
$CurrDate=date('Y-m-d h:i:s');  

/*Rporting*/ /*Rporting*/ /*Rporting*/
$sqlQA = mysql_query("select * from hrm_employee_queryemp where (QStatus=0 OR QStatus=1) AND QCloseStatus='N' AND MailTo_Emp=1 AND MailTo_QueryOwner=1 AND QueryStatus_Emp!=3 AND QueryStatus_Emp!=4 AND '".$CurrDate."'>=Level_2QToDT AND '".$CurrDate."'<=Level_3QToDT order by QueryId DESC", $con); $rowQA=mysql_num_rows($sqlQA);
if($rowQA>0)
{ 
 while($resQA=mysql_fetch_array($sqlQA))
 {
  $sqlEA=mysql_query("select 
  CASE WHEN DR ='Y' THEN 'Dr.'
       WHEN (Gender ='F' AND Married ='Y') THEN 'Mrs.'
       WHEN (Gender ='F' AND Married ='N') THEN 'Ms.'
       ELSE 'Mr.'
       END as Title, CONCAT(Fname , ' ' , Sname , ' ' , Lname) as Name, EmailId_Vnr from hrm_employee_general g INNER JOIN hrm_employee e ON g.EmployeeID=e.EmployeeID INNER JOIN hrm_employee_personal p ON g.EmployeeID=p.EmployeeID where g.EmployeeID=".$resQA['EmployeeID'],$con); $resEA=mysql_fetch_assoc($sqlEA); $EName=$resEA['Title'].' '.$resEA['Name'];

  $sqlRA=mysql_query("select 
  CASE WHEN DR ='Y' THEN 'Dr.'
       WHEN (Gender ='F' AND Married ='Y') THEN 'Mrs.'
       WHEN (Gender ='F' AND Married ='N') THEN 'Ms.'
       ELSE 'Mr.'
       END as Title, CONCAT(Fname , ' ' , Sname , ' ' , Lname) as Name, EmailId_Vnr from hrm_employee_general g INNER JOIN hrm_employee e ON g.EmployeeID=e.EmployeeID INNER JOIN hrm_employee_personal p ON g.EmployeeID=p.EmployeeID where g.EmployeeID=".$resQA['Level_1ID'],$con); $resRA=mysql_fetch_assoc($sqlRA);  $RName=$resRA['Title'].' '.$resRA['Name'];
	    
  $sqlRA2=mysql_query("select 
  CASE WHEN DR ='Y' THEN 'Dr.'
       WHEN (Gender ='F' AND Married ='Y') THEN 'Mrs.'
       WHEN (Gender ='F' AND Married ='N') THEN 'Ms.'
       ELSE 'Mr.'
       END as Title, CONCAT(Fname , ' ' , Sname , ' ' , Lname) as Name, EmailId_Vnr from hrm_employee_general g INNER JOIN hrm_employee e ON g.EmployeeID=e.EmployeeID INNER JOIN hrm_employee_personal p ON g.EmployeeID=p.EmployeeID where g.EmployeeID=".$resQA['Level_2ID'],$con); $resRA2=mysql_fetch_assoc($sqlRA2); $R2Name=$resRA2['Title'].' '.$resRA2['Name'];
	   
  if($resQA['QuerySubject']=='N'){$QS=$resQA['OtherSubject'];}
  else{$QS=$resQA['QuerySubject'];} if($resQA['HideYesNo']=='Y'){$name='Name Undisclosed';}else{$name=$EName;}

  $sqlMK4=mysql_query("select * from hrm_employee_querymail_key where QueryMailId=4 AND CompanyId=".$CompanyId,$con); 
  $resMK4=mysql_fetch_assoc($sqlMK4);

  if($resEA['EmailId_Vnr']!='' AND $resMK4['Employee']=='Y')   //Self AJAY
  {
    $email_to = "ajaykumar.dewangan@vnrseeds.in"; 
	//$email_to = $resEA['EmailId_Vnr'];
    $email_from = 'admin@vnrseeds.co.in';
	$email_subject = "Query escalated to next level";   
	$headers = "From: $email_from ". "\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=ISO-8859-1\r\n";
    $email_message .="<html><head></head><body>";
    $email_message .= "Dear <b>Sir/Mam</b> <br><br>\n\n\n"; 
	$email_message .= "The query raised by you on subject-<b>".$QS."</b> could not be resolved at level-1 and the same has been escalated to the next level (Level-2) for resolution.<br>";
	$email_message .= "The Level-2 query owner will revert on your query within 3 working days.<br><br>\n\n\n";
	$email_message .= "From <br><b>ADMIN ESS</b><br>";
	$email_message .="</body></html>";	  
    $ok = @mail($email_to, $email_subject, $email_message, $headers);
   }         

   if($resEA['EmailId_Vnr']!='' AND $resMK4['Employee']=='Y')   //Self
   { 
	$email_to22 = $resEA['EmailId_Vnr'];
    $email_from22 = 'admin@vnrseeds.co.in';
	$email_subject = "Query escalated to next level";  
	$headers = "From: $email_from ". "\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=ISO-8859-1\r\n";
    $email_message22 .="<html><head></head><body>";
    $email_message22 .= "Dear <b>Sir/Mam</b> <br><br>\n\n\n"; 
	$email_message22 .= "The query raised by you on subject-<b>".$QS."</b> could not be resolved at level-1 and the same has been escalated to the next level (Level-2) for resolution.<br>";
	$email_message22 .= "The Level-2 query owner will revert on your query within 3 working days.<br><br>\n\n\n";
	$email_message22 .= "From <br><b>ADMIN ESS</b><br>";
	$email_message22 .="</body></html>";	  
    $ok = @mail($email_to22, $email_subject, $email_message22, $headers);
   }         
   
   
   if($resRA2['EmailId_Vnr']!='' AND $resMK4['Leve_2']=='Y')  // //Query owner(Reporting)
   {
    
	$email_to2 = $resRA2['EmailId_Vnr'];
    $email_from = 'admin@vnrseeds.co.in';
	$email_subject2 = "Escalation of query by ".$RName;  
	$headers = "From: $email_from ". "\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=ISO-8859-1\r\n";
    $email_message2 .="<html><head></head><body>";
    $email_message2 .= "Dear <b>Sir/Mam</b> <br><br>\n\n\n";
    $email_message2 .= "The query raised by <b>".$EName."</b> on subject-<b>".$QS."</b> could not be resolved at level-1 and the same has been escalated to you for resolution, go to <b>ESS-QUERY</b> for more details <a href='https://www.vnrseeds.co.in'>www.vnrseeds.co.in</a>.<br>"; 
	$email_message2 .= "You need to answer the query in 3 working days after which it will get escalated to HOD.<br><br>\n\n\n";
	$email_message2 .= "From <br><b>ADMIN ESS</b><br>";
	$email_message2 .="</body></html>";	  
    $ok = @mail($email_to2, $email_subject2, $email_message2, $headers);
   }


   $sqlRH=mysql_query("select RepMgrId,Level_1ID from hrm_employee_queryemp where QueryId=".$resQA['QueryId'], $con); 
   $resRH=mysql_fetch_assoc($sqlRH); 
   
   $sqlR=mysql_query("select 
   CASE WHEN DR ='Y' THEN 'Dr.'
        WHEN (Gender ='F' AND Married ='Y') THEN 'Mrs.'
        WHEN (Gender ='F' AND Married ='N') THEN 'Ms.'
        ELSE 'Mr.'
        END as Title, CONCAT(Fname , ' ' , Sname , ' ' , Lname) as Name, EmailId_Vnr from hrm_employee_general g INNER JOIN hrm_employee e ON g.EmployeeID=e.EmployeeID INNER JOIN hrm_employee_personal p ON g.EmployeeID=p.EmployeeID where g.EmployeeID=".$resRH['RepMgrId'], $con); $resR=mysql_fetch_assoc($sqlR); $NameR=$resR['Title'].' '.$resR['Name'];

   $sql_1=mysql_query("select CASE WHEN DR ='Y' THEN 'Dr.'
        WHEN (Gender ='F' AND Married ='Y') THEN 'Mrs.'
        WHEN (Gender ='F' AND Married ='N') THEN 'Ms.'
        ELSE 'Mr.'
        END as Title, CONCAT(Fname , ' ' , Sname , ' ' , Lname) as Name, EmailId_Vnr from hrm_employee_general g INNER JOIN hrm_employee e ON g.EmployeeID=e.EmployeeID INNER JOIN hrm_employee_personal p ON g.EmployeeID=p.EmployeeID where g.EmployeeID=".$resRH['Level_1ID'], $con); $res_1=mysql_fetch_assoc($sql_1); $Name_1=$res_1['Title'].' '.$res_1['Name'];  
   
   //Reporting Mgr
   if($resR['EmailId_Vnr']!='' AND $resMK4['ReportingMgr']=='Y')
   {
	$email_toR = $resR['EmailId_Vnr'];
    $email_from = 'admin@vnrseeds.co.in';
	$email_subjectR = "Escalation of query in level-2.";  
	$headers = "From: $email_from ". "\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=ISO-8859-1\r\n";
    $email_messageR .="<html><head></head><body>";
    $email_messageR = "Dear <b>Sir/Mam</b> <br><br>\n\n\n";
    $email_messageR .= "The query raised by your team member ".$name." on subject-<b>".$QS."</b> could not be resolved at level-1 and the same has been escalated to the next level (Level-2) for resolution.<br><br>\n\n\n";
	$email_messageR .= "From <br><b>ADMIN ESS</b><br>";
	$email_messageR .="</body></html>";	  
    $ok = @mail($email_toR, $email_subjectR, $email_messageR, $headers);
   }
      
   //Level_1 Query owner
   if($res_1['EmailId_Vnr']!='' AND $resMK4['Leve_1']=='Y')
   {
	$email_to_1 = $res_1['EmailId_Vnr'];
    $email_from = 'admin@vnrseeds.co.in';
	$email_subject_1 = "Escalation of query in level-2."; 
    $headers = "From: $email_from ". "\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=ISO-8859-1\r\n";
    $email_message_1 .="<html><head></head><body>";
    $email_message_1 = "Dear <b>Sir/Mam</b> <br><br>\n\n\n";
    $email_message_1 .= "The query raised by ".$name." on subject-<b>".$QS."</b> could not be resolved at your level and the same has been escalated to your reporting manager for resolution.<br><br>\n\n\n";
	$email_message_1 .= "From <br><b>ADMIN ESS</b><br>";
	$email_message_1 .="</body></html>";	  
    $ok = @mail($email_to_1, $email_subject_1, $email_message_1, $headers);
   }      
  
   $sqlUp=mysql_query("update hrm_employee_queryemp set MailTo_Emp=2, MailTo_QueryOwner=2 where QueryId=".$resQA['QueryId'], $con);
   
 } //while($resQA=mysql_fetch_array($sqlQA)) 
} //if($rowQA>0)

/*HOD*/ /*HOD*/ /*HOD*/
$sqlQH = mysql_query("select * from hrm_employee_queryemp where (QStatus=0 OR QStatus=1) AND QCloseStatus='N' AND MailTo_Emp=2 AND MailTo_QueryOwner=2 AND QueryStatus_Emp!=3 AND QueryStatus_Emp!=4 AND '".$CurrDate."'>=Level_3QToDT AND '".$CurrDate."'<=Mngmt_QToDT order by QueryId DESC", $con); $rowQH=mysql_num_rows($sqlQH);
if($rowQH>0)
{ 
 
 while($resQH=mysql_fetch_array($sqlQH))
 {

   $sqlEH=mysql_query("select 
   CASE WHEN DR ='Y' THEN 'Dr.'
        WHEN (Gender ='F' AND Married ='Y') THEN 'Mrs.'
        WHEN (Gender ='F' AND Married ='N') THEN 'Ms.'
        ELSE 'Mr.'
        END as Title, CONCAT(Fname , ' ' , Sname , ' ' , Lname) as Name, EmailId_Vnr from hrm_employee_general g INNER JOIN hrm_employee e ON g.EmployeeID=e.EmployeeID INNER JOIN hrm_employee_personal p ON g.EmployeeID=p.EmployeeID where g.EmployeeID=".$resQH['EmployeeID'], $con); $resEH=mysql_fetch_assoc($sqlEH); $EHName=$resEH['Title'].' '.$resEH['Name'];

   $sqlRH=mysql_query("select 
   CASE WHEN DR ='Y' THEN 'Dr.'
        WHEN (Gender ='F' AND Married ='Y') THEN 'Mrs.'
        WHEN (Gender ='F' AND Married ='N') THEN 'Ms.'
        ELSE 'Mr.'
        END as Title, CONCAT(Fname , ' ' , Sname , ' ' , Lname) as Name, EmailId_Vnr from hrm_employee_general g INNER JOIN hrm_employee e ON g.EmployeeID=e.EmployeeID INNER JOIN hrm_employee_personal p ON g.EmployeeID=p.EmployeeID where g.EmployeeID=".$resQH['Level_2ID'], $con); $resRH=mysql_fetch_assoc($sqlRH); $RHName=$resRH['Title'].' '.$resRH['Name'];

   $sqlRH2=mysql_query("select 
   CASE WHEN DR ='Y' THEN 'Dr.'
        WHEN (Gender ='F' AND Married ='Y') THEN 'Mrs.'
        WHEN (Gender ='F' AND Married ='N') THEN 'Ms.'
        ELSE 'Mr.'
        END as Title, CONCAT(Fname , ' ' , Sname , ' ' , Lname) as Name, EmailId_Vnr from hrm_employee_general g INNER JOIN hrm_employee e ON g.EmployeeID=e.EmployeeID INNER JOIN hrm_employee_personal p ON g.EmployeeID=p.EmployeeID where g.EmployeeID=".$resQH['Level_3ID'], $con); $resRH2=mysql_fetch_assoc($sqlRH2); $RH2Name=$resRH2['Title'].' '.$resRH2['Name'];
		
		
    if($resQH['QuerySubject']=='N'){$QSH=$resQH['OtherSubject'];}else{$QSH=$resQH['QuerySubject'];} 
    if($resQH['HideYesNo']=='Y'){$nameH='Name Undisclosed';}else{$nameH=$EHName;}

    $sqlMK5=mysql_query("select * from hrm_employee_querymail_key where QueryMailId=5 AND CompanyId=".$CompanyId, $con); 
    $resMK5=mysql_fetch_assoc($sqlMK5);

    if($resEH['EmailId_Vnr']!='' AND $resMK5['Employee']=='Y')   //Self
    { 
	 $email_toH = $resEH['EmailId_Vnr'];
     $email_from = 'admin@vnrseeds.co.in';
	 $email_subjectH = "Query escalated to next level";  
	 $headers = "From: $email_from ". "\r\n";
	 $headers .= "MIME-Version: 1.0\r\n";
     $headers .= "Content-type: text/html; charset=ISO-8859-1\r\n";
     $email_messageH .="<html><head></head><body>";
     $email_messageH .= "Dear <b>Sir/Mam</b> <br><br>\n\n\n"; 
	 $email_messageH .= "The query raised by you on subject-<b>".$QSH."</b> could not be resolved at level-2 and the same has been escalated to the next level (Level-3) for resolution.</b>.<br>";
	 $email_messageH .= "The Level-3 query owner will revert on your query within 3 working days.<br><br>\n\n\n";
	 $email_messageH .= "From <br><b>ADMIN ESS</b><br>";
	 $email_messageH .="</body></html>";	  
     $ok = @mail($email_toH, $email_subjectH, $email_messageH, $headers);
    }

   
    if($resRH2['EmailId_Vnr']!='' AND $resMK5['Leve_3']=='Y')  // //Query owner(HOD)
    {
	 $email_toH2 = $resRH2['EmailId_Vnr'];
     $email_from = 'admin@vnrseeds.co.in';
	 $email_subjectH2 = "Escalation of query by ".$RHName; 
	 $headers = "From: $email_from ". "\r\n";
	 $headers .= "MIME-Version: 1.0\r\n";
     $headers .= "Content-type: text/html; charset=ISO-8859-1\r\n";
     $email_messageH2 .="<html><head></head><body>";
     $email_messageH2 .= "Dear <b>Sir/Mam</b> <br><br>\n\n\n";
     $email_messageH2 .= "The query raised by <b>".$EHName."</b> on subject-<b>".$QSH."</b> could not be resolved at level-1 & Level-2 and the same has been escalated to you for resolution, go to <b>ESS-QUERY</b> for more details <a href='https://www.vnrseeds.co.in'>www.vnrseeds.co.in</a>.<br>"; 
	 $email_messageH2 .= "You need to answer the query in 3 working days after which it will get escalated to Management.<br><br>\n\n\n";
	 $email_messageH2 .= "From <br><b>ADMIN ESS</b><br>";
	 $email_messageH2 .="</body></html>";	  
     $ok = @mail($email_toH2, $email_subjectH2, $email_messageH2, $headers);
    }
   
    $sqlRH2=mysql_query("select RepMgrId,Level_2ID from hrm_employee_queryemp where QueryId=".$resQH['QueryId'], $con);
	$resRH2=mysql_fetch_assoc($sqlRH2); 
    
    $sqlR2=mysql_query("select 
    CASE WHEN DR ='Y' THEN 'Dr.'
         WHEN (Gender ='F' AND Married ='Y') THEN 'Mrs.'
         WHEN (Gender ='F' AND Married ='N') THEN 'Ms.'
         ELSE 'Mr.'
         END as Title, CONCAT(Fname , ' ' , Sname , ' ' , Lname) as Name, EmailId_Vnr from hrm_employee_general g INNER JOIN hrm_employee e ON g.EmployeeID=e.EmployeeID INNER JOIN hrm_employee_personal p ON g.EmployeeID=p.EmployeeID where g.EmployeeID=".$resRH2['RepMgrId'], $con); $resR2=mysql_fetch_assoc($sqlR2); $NameR2=$resR2['Title'].' '.$resR2['Name'];  

    $sql_2=mysql_query("select 
CASE WHEN DR ='Y' THEN 'Dr.'
        WHEN (Gender ='F' AND Married ='Y') THEN 'Mrs.'
        WHEN (Gender ='F' AND Married ='N') THEN 'Ms.'
        ELSE 'Mr.'
        END as Title, CONCAT(Fname , ' ' , Sname , ' ' , Lname) as Name, EmailId_Vnr from hrm_employee_general g INNER JOIN hrm_employee e ON g.EmployeeID=e.EmployeeID INNER JOIN hrm_employee_personal p ON g.EmployeeID=p.EmployeeID where g.EmployeeID=".$resRH2['Level_2ID'], $con); $res_2=mysql_fetch_assoc($sql_2); $Name_2=$res_2['Title'].' '.$res_2['Name']; 
   
    //Reporting Mgr
    if($resR2['EmailId_Vnr']!='' AND $resMK5['ReportingMgr']=='Y')
    {
	$email_toR2 = $resR2['EmailId_Vnr'];
    $email_from = 'admin@vnrseeds.co.in';
	$email_subjectR2 = "Escalation of query in level-3.";  
    $headers = "From: $email_from ". "\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=ISO-8859-1\r\n";
    $email_messageR2 .="<html><head></head><body>";
    $email_messageR2 = "Dear <b>Sir/Mam</b> <br><br>\n\n\n";
    $email_messageR2 .= "The query raised by your team member ".$name." on subject-<b>".$QSH."</b> could not be resolved at level-2 and the same has been further escalated to the next level (Level-3) for resolution.<br><br>\n\n\n";
	$email_messageR2 .= "From <br><b>ADMIN ESS</b><br>";
	$email_messageR2 .="</body></html>";	  
    $ok = @mail($email_toR2, $email_subjectR2, $email_messageR2, $headers);
   }
      
   
   //Level_2 Query owner
   if($res_1['EmailId_Vnr']!='' AND $resMK5['Leve_2']=='Y')
   {
    //$email_to_2 = "ajaykumar.dewangan@vnrseeds.in";
	$email_to_2 = $res_2['EmailId_Vnr'];
    $email_from = 'admin@vnrseeds.co.in';
	$email_subject_2 = "Escalation of query in level-3.";  
	$headers = "From: $email_from ". "\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=ISO-8859-1\r\n";
    $email_message_2 .="<html><head></head><body>";
    $email_message_2 = "Dear <b>Sir/Mam</b> <br><br>\n\n\n";
    $email_message_2 .= "The query raised by ".$name." on subject-<b>".$QSH."</b> could not be resolved at your level and the same has been escalated to your HOD for resolution.<br><br>\n\n\n";
	$email_message_2 .= "From <br><b>ADMIN ESS</b><br>";
	$email_message_2 .="</body></html>";	  
    $ok = @mail($email_to_2, $email_subject_2, $email_message_2, $headers);
   }  
   
   $sqlUp=mysql_query("update hrm_employee_queryemp set MailTo_Emp=3, MailTo_QueryOwner=3 where QueryId=".$resQH['QueryId'], $con);

 } //while($resQH=mysql_fetch_array($sqlQH)) 
} //if($rowQH>0)


/*management*/ /*management*/ /*management*/ 
$sqlQM = mysql_query("select * from hrm_employee_queryemp where (QStatus=0 OR QStatus=1) AND QCloseStatus='N' AND MailTo_Emp=3 AND MailTo_QueryOwner=3 AND QueryStatus_Emp!=3 AND QueryStatus_Emp!=4 AND '".$CurrDate."'>Mngmt_QToDT order by QueryId DESC", $con); $rowQM=mysql_num_rows($sqlQM);

if($rowQM>0)
{ 
 
 while($resQM=mysql_fetch_array($sqlQM))
 {

   $sqlEM=mysql_query("select 
   CASE WHEN DR ='Y' THEN 'Dr.'
        WHEN (Gender ='F' AND Married ='Y') THEN 'Mrs.'
        WHEN (Gender ='F' AND Married ='N') THEN 'Ms.'
        ELSE 'Mr.'
        END as Title, CONCAT(Fname , ' ' , Sname , ' ' , Lname) as Name, EmailId_Vnr from hrm_employee_general g INNER JOIN hrm_employee e ON g.EmployeeID=e.EmployeeID INNER JOIN hrm_employee_personal p ON g.EmployeeID=p.EmployeeID where g.EmployeeID=".$resQM['EmployeeID'], $con); $resEM=mysql_fetch_assoc($sqlEM); $EMName=$resEM['Title'].' '.$resEM['Name'];   

   $sqlRM=mysql_query("select 
   CASE WHEN DR ='Y' THEN 'Dr.'
        WHEN (Gender ='F' AND Married ='Y') THEN 'Mrs.'
        WHEN (Gender ='F' AND Married ='N') THEN 'Ms.'
        ELSE 'Mr.'
        END as Title, CONCAT(Fname , ' ' , Sname , ' ' , Lname) as Name, EmailId_Vnr from hrm_employee_general g INNER JOIN hrm_employee e ON g.EmployeeID=e.EmployeeID INNER JOIN hrm_employee_personal p ON g.EmployeeID=p.EmployeeID where g.EmployeeID=".$resQM['Level_3ID'], $con); $resRM=mysql_fetch_assoc($sqlRM); $RMName=$resRM['Title'].' '.$resRM['Name'];   

   $sqlRM2=mysql_query("select 
   CASE WHEN DR ='Y' THEN 'Dr.'
        WHEN (Gender ='F' AND Married ='Y') THEN 'Mrs.'
        WHEN (Gender ='F' AND Married ='N') THEN 'Ms.'
        ELSE 'Mr.'
        END as Title, CONCAT(Fname , ' ' , Sname , ' ' , Lname) as Name, EmailId_Vnr from hrm_employee_general g INNER JOIN hrm_employee e ON g.EmployeeID=e.EmployeeID INNER JOIN hrm_employee_personal p ON g.EmployeeID=p.EmployeeID where g.EmployeeID=".$resQM['Mngmt_ID'], $con);  $resRM2=mysql_fetch_assoc($sqlRM2); $RM2Name=$resRM2['Title'].' '.$resRM2['Name'];   
		
   if($resQM['QuerySubject']=='N'){$QSM=$resQM['OtherSubject'];}
   else{$QSM=$resQM['QuerySubject'];} if($resQM['HideYesNo']=='Y'){$nameM='Name Undisclosed';}else{$nameM=$EMName;}

   $sqlMK6=mysql_query("select * from hrm_employee_querymail_key where QueryMailId=6 AND CompanyId=".$CompanyId, $con);
   $resMK6=mysql_fetch_assoc($sqlMK6);

   if($resEM['EmailId_Vnr']!='' AND $resMK6['Employee']=='Y')   //Self
   {
	 $email_toM = $resEM['EmailId_Vnr'];
     $email_from = 'admin@vnrseeds.co.in';
	 $email_subjectM = "Query escalated to next level";  
	 $headers = "From: $email_from ". "\r\n";
	 $headers .= "MIME-Version: 1.0\r\n";
     $headers .= "Content-type: text/html; charset=ISO-8859-1\r\n";
     $email_messageM .="<html><head></head><body>";
     $email_messageM .= "Dear <b>Sir/Mam</b> <br><br>\n\n\n"; 
	 $email_messageM .= "The query raised by you on subject-<b>".$QSM."</b> could not be resolved at level-3 and the same has been escalated to the Management for resolution.</b>.<br>";
	 $email_messageM .= "The Management will revert on your query within 3 working days.<br><br>\n\n\n";
	 $email_messageM .= "From <br><b>ADMIN ESS</b><br>";
	 $email_messageM .="</body></html>";	  
     $ok = @mail($email_toM, $email_subjectM, $email_messageM, $headers);
   }

   
   if($resRM2['EmailId_Vnr']!='' AND $resMK6['Leve_4']=='Y')  //Query owner(MANAGEMENT)
   { 
	 $email_toM2 = $resRM2['EmailId_Vnr'];
     $email_from = 'admin@vnrseeds.co.in';
	 $email_subjectM2 = "Escalation of query by ".$RMName;   
	 $headers = "From: $email_from ". "\r\n";
	 $headers .= "MIME-Version: 1.0\r\n";
     $headers .= "Content-type: text/html; charset=ISO-8859-1\r\n";
     $email_messageM2 .="<html><head></head><body>";
     $email_messageM2 .= "Dear <b>Sir/Mam</b> <br><br>\n\n\n";
     $email_messageM2 .= "The query raised by <b>".$EMName."</b> on subject-<b>".$QSM."</b> could not be resolved at level-1, level2 & Level-3 and the same has been escalated to you for resolution, go to <b>ESS-QUERY</b> for more details <a href='https://www.vnrseeds.co.in'>www.vnrseeds.co.in</a>.<br>"; 
	 $email_messageM2 .= "You need to answer the query in 3 working days and close it.<br><br>\n\n\n";
	 $email_messageM2 .= "From <br><b>ADMIN ESS</b><br>";
	 $email_messageM2 .="</body></html>";	  
     $ok = @mail($email_toM2, $email_subjectM2, $email_messageM2, $headers);
   } 

   
   $sqlRM=mysql_query("select RepMgrId,Level_3ID from hrm_employee_queryemp where QueryId=".$resQM['QueryId'], $con); 
   $resRM=mysql_fetch_assoc($sqlRM); 
   
   $sqlR3=mysql_query("select 
   CASE WHEN DR ='Y' THEN 'Dr.'
        WHEN (Gender ='F' AND Married ='Y') THEN 'Mrs.'
        WHEN (Gender ='F' AND Married ='N') THEN 'Ms.'
        ELSE 'Mr.'
        END as Title, CONCAT(Fname , ' ' , Sname , ' ' , Lname) as Name, EmailId_Vnr from hrm_employee_general g INNER JOIN hrm_employee e ON g.EmployeeID=e.EmployeeID INNER JOIN hrm_employee_personal p ON g.EmployeeID=p.EmployeeID where g.EmployeeID=".$resRM['RepMgrId'], $con); $resR3=mysql_fetch_assoc($sqlR3); $NameR3=$resR3['Title'].' '.$resR3['Name'];

   $sql_3=mysql_query("select 
   CASE WHEN DR ='Y' THEN 'Dr.'
        WHEN (Gender ='F' AND Married ='Y') THEN 'Mrs.'
        WHEN (Gender ='F' AND Married ='N') THEN 'Ms.'
        ELSE 'Mr.'
        END as Title, CONCAT(Fname , ' ' , Sname , ' ' , Lname) as Name, EmailId_Vnr from hrm_employee_general g INNER JOIN hrm_employee e ON g.EmployeeID=e.EmployeeID INNER JOIN hrm_employee_personal p ON g.EmployeeID=p.EmployeeID where g.EmployeeID=".$resRM['Level_3ID'], $con); $res_3=mysql_fetch_assoc($sql_3); $Name_3=$res_3['Title'].' '.$res_3['Name'];


   //Reporting Mgr
   if($resR3['EmailId_Vnr']!='' AND $resMK6['ReportingMgr']=='Y')
   {
	 $email_toR3 = $resR3['EmailId_Vnr'];
     $email_from = 'admin@vnrseeds.co.in';
	 $email_subjectR3 = "Escalation of query in level-4.";  
	 $headers = "From: $email_from ". "\r\n";
	 $headers .= "MIME-Version: 1.0\r\n";
     $headers .= "Content-type: text/html; charset=ISO-8859-1\r\n";
     $email_messageR3 .="<html><head></head><body>";
     $email_messageR3 = "Dear <b>Sir/Mam</b> <br><br>\n\n\n";
     $email_messageR3 .= "The query raised by your team member ".$name." on subject-<b>".$QSM."</b> could not be resolved at level-3 and the same has been further escalated to management (Level-4) for resolution.<br><br>\n\n\n";
	 $email_messageR3 .= "From <br><b>ADMIN ESS</b><br>";
	 $email_messageR3 .="</body></html>";	  
     $ok = @mail($email_toR3, $email_subjectR3, $email_messageR3, $headers);
   }       
      
   
   //Level_3 Query owner
   if($res_1['EmailId_Vnr']!='' AND $resMK4['Leve_3']=='Y')
   {   
	 $email_to_3 = $res_3['EmailId_Vnr'];
     $email_from = 'admin@vnrseeds.co.in';
	 $email_subject_3 = "Escalation of query in level-3.";  
	 $headers = "From: $email_from ". "\r\n";
	 $headers .= "MIME-Version: 1.0\r\n";
     $headers .= "Content-type: text/html; charset=ISO-8859-1\r\n";
     $email_message_3 .="<html><head></head><body>";
     $email_message_3 = "Dear <b>Sir/Mam</b> <br><br>\n\n\n";
     $email_message_3 .= "The query raised by ".$name." on subject-<b>".$QSM."</b> could not be resolved at your level and the same has been escalated to your management for resolution.<br><br>\n\n\n";
	 $email_message_3 .= "From <br><b>ADMIN ESS</b><br>";
	 $email_message_3 .="</body></html>";	  
     $ok = @mail($email_to_3, $email_subject_3, $email_message_3, $headers);
   }     
   
   $sqlUp=mysql_query("update hrm_employee_queryemp set MailTo_Emp=4, MailTo_QueryOwner=4 where QueryId=".$resQM['QueryId'], $con);

 } //while($resQM=mysql_fetch_array($sqlQM))
} //if($rowQM>0)



  $sqlThCh2=mysql_query("select * from hrm_com_mail_scalate where ScalateDate='".date("Y-m-d")."' AND CompanyId=".$CompanyId, $con); $rowThCh2=mysql_num_rows($sqlThCh2);

  if($rowThCh2>0){ $InsTh2=mysql_query("update hrm_com_mail_scalate set QueYN='Y' where ScalateDate='".date("Y-m-d")."' AND CompanyId=".$CompanyId, $con); }
  elseif($rowThCh2==0){ $InsTh2=mysql_query("insert into hrm_com_mail_scalate(ScalateDate,QueYN,CompanyId) values('".date("Y-m-d")."','Y',".$CompanyId.")", $con); }


} // Check Query Close //


?>