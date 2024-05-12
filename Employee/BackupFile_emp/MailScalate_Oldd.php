<?php 
$sqlThCh=mysql_query("select * from hrm_com_mail_scalate_kra where ScalateKraDate='".date("Y-m-d")."' AND CompanyId=".$CompanyId, $con); $rowThCh=mysql_num_rows($sqlThCh);

if($rowThCh==0)
{

if(date("m")>=02 AND date("Y-m-d")==date("Y-m-01"))  //if(date("m")>=02 AND date("Y-m-d")==date("Y-m-01"))
{

 $sqlSY=mysql_query("select CurrY from hrm_pms_setting where CompanyId=".$CompanyId." AND Process='KRA'",$con);
 $resSY=mysql_fetch_array($sqlSY); $yid=$resSY['CurrY'];
 
 $sql=mysql_query("select k.EmployeeID,EmailId_Vnr from hrm_pms_kra k inner join hrm_employee_general g on k.EmployeeID=g.EmployeeID where k.YearId=".$yid." AND k.UseKRA!='E' group by k.EmployeeID ASC",$con); 
 while($res=mysql_fetch_assoc($sql))
 { 
  
/************* 111111111111111 Open ******************/  
/************* 111111111111111 Open ******************/
  $s1=mysql_query("select * from hrm_pms_kra where YearId=".$yid." AND EmployeeID=".$res['EmployeeID']." AND Period='Monthly'",$con); $r1=mysql_num_rows($s1);
  if($r1>0)
  {
   
    if($res['EmailId_Vnr']!='')
    {
     $email_to = $res['EmailId_Vnr'];
     $email_from='admin@vnrseeds.co.in';
     $email_subject = "Communication : Enter your KRA achievements for Monthly KRA";
     $headers = "From: ".$email_from."\r\n";  
     $headers .= "MIME-Version: 1.0\r\n";
     $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
     $email_message .="<html><head></head><body>";
     $email_message .="Dear <b>Appraisee, </b> <br><br>\n\n\n";
     $email_message .="Please fill your achievements for your monthly KRAs by 7th of this month. Go to PMS module in ESS.<br><br>\n\n";
     $email_message .="From <br><b>ADMIN ESS</b><br>";
     $email_message .="</body></html>";	      
     $ok=@mail($email_to, $email_subject, $email_message, $headers);
     //echo $email_to.' '.$email_subject.'<br>';
	}
  
  }
  else
  {
    $s2=mysql_query("select * from hrm_pms_kra k inner join hrm_pms_krasub ks on k.KRAId=ks.KRAId where k.YearId=".$yid." AND k.EmployeeID=".$res['EmployeeID']." AND ks.Period='Monthly'",$con); $r2=mysql_num_rows($s2);
	if($r2>0)
	{
	
	  if($res['EmailId_Vnr']!='')
      {
       $email_to = $res['EmailId_Vnr'];
       $email_from='admin@vnrseeds.co.in';
       $email_subject = " Communication : Enter your KRA achievements for Monthly KRA";
       $headers = "From: ".$email_from."\r\n";  
       $headers .= "MIME-Version: 1.0\r\n";
       $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
       $email_message .="<html><head></head><body>";
       $email_message .= "Dear <b>Appraisee, </b> <br><br>\n\n\n";
       $email_message .= "Please fill your achievements for your monthly KRAs by 7th of this month. Go to PMS module in ESS.<br><br>\n\n";
       $email_message .= "From <br><b>ADMIN ESS</b><br>";
       $email_message .="</body></html>";	      
       $ok=@mail($email_to, $email_subject, $email_message, $headers);
	   //echo 'BB=> '.$email_to.' '.$email_subject.'<br>';
      }
	 
	}
  } 
/************* 111111111111111 Close ******************/  
/************* 111111111111111 Close ******************/
  
/************* 222222222222222 Open ******************/  
/************* 222222222222222 Open ******************/
  $s12=mysql_query("select * from hrm_pms_kra where YearId=".$yid." AND EmployeeID=".$res['EmployeeID']." AND Period='Quarter'",$con); $r12=mysql_num_rows($s12);
  
  //if($r12>0 AND (date("Y-m-d")==date("Y-04-01") OR date("Y-m-d")==date("Y-07-01") OR date("Y-m-d")==date("Y-10-01")))
  
  if($r12>0 AND (date("Y-m-d")==date("Y-04-01") OR date("Y-m-d")==date("Y-07-01") OR date("Y-m-d")==date("Y-10-01")))
  {
   
    if($res['EmailId_Vnr']!='')
    {
     $email_to2 = $res['EmailId_Vnr'];
     $email_from2='admin@vnrseeds.co.in';
     $email_subject2 = "Communication : Enter your KRA achievements for Quarterly KRA";
     $headers2 = "From: ".$email_from2."\r\n";  
     $headers2 .= "MIME-Version: 1.0\r\n";
     $headers2 .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
     $email_message2 .="<html><head></head><body>";
     $email_message2 .= "Dear <b>Appraisee, </b> <br><br>\n\n\n";
     $email_message2 .= "Please fill your achievements for your Quarterly KRAs by 7th of this month. Go to PMS module in ESS.<br><br>\n\n";
     $email_message2 .= "From <br><b>ADMIN ESS</b><br>";
     $email_message2 .="</body></html>";	      
     $ok=@mail($email_to2, $email_subject2, $email_message2, $headers2);
     //echo $email_to2.' '.$email_subject2.'<br>';
	}
  
  }
  else
  {
    $s22=mysql_query("select * from hrm_pms_kra k inner join hrm_pms_krasub ks on k.KRAId=ks.KRAId where k.YearId=".$yid." AND k.EmployeeID=".$res['EmployeeID']." AND ks.Period='Quarter'",$con); $r22=mysql_num_rows($s22);
	//if($r22>0 AND (date("Y-m-d")==date("Y-04-01") OR date("Y-m-d")==date("Y-07-01") OR date("Y-m-d")==date("Y-10-01")))
	
	if($r22>0 AND (date("Y-m-d")==date("Y-04-01") OR date("Y-m-d")==date("Y-07-01") OR date("Y-m-d")==date("Y-10-01")))
	{
	
	  if($res['EmailId_Vnr']!='')
      {
       $email_to2 = $res['EmailId_Vnr'];
       $email_from2='admin@vnrseeds.co.in';
       $email_subject2 = "Communication : Enter your KRA achievements for Quarterly KRA";
       $headers2 = "From: ".$email_from2."\r\n";  
       $headers2 .= "MIME-Version: 1.0\r\n";
       $headers2 .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
       $email_message2 .="<html><head></head><body>";
       $email_message2 .= "Dear <b>Appraisee, </b> <br><br>\n\n\n";
       $email_message2 .= "Please fill your achievements for your Quarterly KRAs by 7th of this month. Go to PMS module in ESS.<br><br>\n\n";
       $email_message2 .= "From <br><b>ADMIN ESS</b><br>";
       $email_message2 .="</body></html>";	      
       $ok=@mail($email_to2, $email_subject2, $email_message2, $headers2);
	   //echo 'BB=> '.$email_to2.' '.$email_subject2.'<br>';
      }
	 
	}
  } 
/************* 222222222222222 Close ******************/  
/************* 222222222222222 Close ******************/


/************* 333333333333333 Open ******************/  
/************* 333333333333333 Open ******************/
  $s13=mysql_query("select * from hrm_pms_kra where YearId=".$yid." AND EmployeeID=".$res['EmployeeID']." AND Period='1/2 Annual'",$con); $r13=mysql_num_rows($s13);
  if($r13>0 AND date("Y-m-d")==date("Y-07-01")) //if($r13>0 AND date("Y-m-d")==date("Y-07-01"))
  {
   
    if($res['EmailId_Vnr']!='')
    {
     $email_to3 = $res['EmailId_Vnr'];
     $email_from3='admin@vnrseeds.co.in';
     $email_subject3 = "Communication : Enter your KRA achievements for Half Annual KRA";
     $headers3 = "From: ".$email_from3."\r\n";  
     $headers3 .= "MIME-Version: 1.0\r\n";
     $headers3 .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
     $email_message3 .="<html><head></head><body>";
     $email_message3 .= "Dear <b>Appraisee, </b> <br><br>\n\n\n";
     $email_message3 .= "Please fill your achievements for your Half Annual KRAs by 7th of this month. Go to PMS module in ESS.<br><br>\n\n";
     $email_message3 .= "From <br><b>ADMIN ESS</b><br>";
     $email_message3 .="</body></html>";	      
     $ok=@mail($email_to3, $email_subject3, $email_message3, $headers3);
     //echo $email_to3.' '.$email_subject3.'<br>';
	}
  
  }
  else
  {
    $s23=mysql_query("select * from hrm_pms_kra k inner join hrm_pms_krasub ks on k.KRAId=ks.KRAId where k.YearId=".$yid." AND k.EmployeeID=".$res['EmployeeID']." AND ks.Period='1/2 Annual'",$con); $r23=mysql_num_rows($s23);
	if($r23>0 AND date("Y-m-d")==date("Y-07-01")) //if($r23>0 AND date("Y-m-d")==date("Y-07-01"))
	{
	
	  if($res['EmailId_Vnr']!='')
      {
       $email_to3 = $res['EmailId_Vnr'];
       $email_from3='admin@vnrseeds.co.in';
       $email_subject3 = "Communication : Enter your KRA achievements for Half Annual KRA";
       $headers3 = "From: ".$email_from3."\r\n";  
       $headers3 .= "MIME-Version: 1.0\r\n";
       $headers3 .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
       $email_message3 .="<html><head></head><body>";
       $email_message3 .= "Dear <b>Appraisee, </b> <br><br>\n\n\n";
       $email_message3 .= "Please fill your achievements for your Half Annual KRAs by 7th of this month. Go to PMS module in ESS.<br><br>\n\n";
       $email_message3 .= "From <br><b>ADMIN ESS</b><br>";
       $email_message .= "</body></html>";	      
       $ok=@mail($email_to3, $email_subject3, $email_message3, $headers3);
	   //echo 'BB=> '.$email_to3.' '.$email_subject3.'<br>';
      }
	 
	}
  } 
/************* 333333333333333 Close ******************/  
/************* 333333333333333 Close ******************/  
  
  
 } //while
 
}





/************* Reporting Reporting Reporting Reporting Reporting Open Open ******************/ 
/************* Reporting Reporting Reporting Reporting Reporting Open Open ******************/


if(date("m")>=02 AND date("Y-m-d")==date("Y-m-07"))  //if(date("m")>=02 AND date("Y-m-d")==date("Y-m-07"))
{

 $sqlSY=mysql_query("select CurrY from hrm_pms_setting where CompanyId=".$CompanyId." AND Process='KRA'",$con);
 $resSY=mysql_fetch_array($sqlSY); $yid=$resSY['CurrY'];
 
 $sql=mysql_query("select k.EmployeeID,ReportingEmailId from hrm_pms_kra k inner join hrm_employee_general g on k.EmployeeID=g.EmployeeID where k.YearId=".$yid." AND k.UseKRA!='E' group by k.EmployeeID ASC",$con); 
 while($res=mysql_fetch_assoc($sql))
 { 
  
/************* 111111111111111 Open ******************/  
/************* 111111111111111 Open ******************/
  $s1=mysql_query("select * from hrm_pms_kra where YearId=".$yid." AND EmployeeID=".$res['EmployeeID']." AND Period='Monthly'",$con); $r1=mysql_num_rows($s1);
  if($r1>0)
  {
   
    if($res['ReportingEmailId']!='')
    {
     $email_to4 = $res['ReportingEmailId'];
     $email_from4='admin@vnrseeds.co.in';
     $email_subject4 = "Communication : Assess the Monthly KRA achievement";
     $headers4 = "From: ".$email_from4."\r\n";  
     $headers4 .= "MIME-Version: 1.0\r\n";
     $headers4 .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
     $email_message4 .="<html><head></head><body>";
     $email_message4 .="Dear <b>Appraiser, </b> <br><br>\n\n\n";
     $email_message4 .="Please assess the monthly KRA achievements by 14th of this month. Go to PMS module in ESS.<br><br>\n\n";
     $email_message4 .="From <br><b>ADMIN ESS</b><br>";
     $email_message4 .="</body></html>";	      
     $ok=@mail($email_to4, $email_subject4, $email_message4, $headers4);
     //echo $email_to4.' '.$email_subject4.'<br>';
	}
  
  }
  else
  {
    $s2=mysql_query("select * from hrm_pms_kra k inner join hrm_pms_krasub ks on k.KRAId=ks.KRAId where k.YearId=".$yid." AND k.EmployeeID=".$res['EmployeeID']." AND ks.Period='Monthly'",$con); $r2=mysql_num_rows($s2);
	if($r2>0)
	{
	
	  if($res['ReportingEmailId']!='')
      {
       $email_to4 = $res['ReportingEmailId'];
       $email_from4='admin@vnrseeds.co.in';
       $email_subject4 = "Communication : Assess the Monthly KRA achievement";
       $headers4 = "From: ".$email_from4."\r\n";  
       $headers4 .= "MIME-Version: 1.0\r\n";
       $headers4 .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
       $email_message4 .="<html><head></head><body>";
       $email_message4 .= "Dear <b>Appraiser, </b> <br><br>\n\n\n";
       $email_message4 .= "Please assess the monthly KRA achievements by 14th of this month. Go to PMS module in ESS.<br><br>\n\n";
       $email_message4 .= "From <br><b>ADMIN ESS</b><br>";
       $email_message4 .="</body></html>";	      
       $ok=@mail($email_to4, $email_subject4, $email_message4, $headers4);
	   //echo 'BB=> '.$email_to4.' '.$email_subject4.'<br>';
      }
	 
	}
  } 
/************* 111111111111111 Close ******************/  
/************* 111111111111111 Close ******************/
  
/************* 222222222222222 Open ******************/  
/************* 222222222222222 Open ******************/
  $s12=mysql_query("select * from hrm_pms_kra where YearId=".$yid." AND EmployeeID=".$res['EmployeeID']." AND Period='Quarter'",$con); $r12=mysql_num_rows($s12);
  
  if($r12>0 AND (date("Y-m-d")==date("Y-04-07") OR date("Y-m-d")==date("Y-07-07") OR date("Y-m-d")==date("Y-10-07")))
  {
   
    if($res['ReportingEmailId']!='')
    {
     $email_to5 = $res['ReportingEmailId'];
     $email_from5='admin@vnrseeds.co.in';
     $email_subject5 = "Communication : Assess the Quarterly KRA achievement";
     $headers5 = "From: ".$email_from5."\r\n";  
     $headers5 .= "MIME-Version: 1.0\r\n";
     $headers5 .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
     $email_message5 .="<html><head></head><body>";
     $email_message5 .= "Dear <b>Appraiser, </b> <br><br>\n\n\n";
     $email_message5 .= "Please assess the Quarterly KRA achievements by 14th of this month. Go to PMS module in ESS.<br><br>\n\n";
     $email_message5 .= "From <br><b>ADMIN ESS</b><br>";
     $email_message5 .="</body></html>";	      
     $ok=@mail($email_to5, $email_subject5, $email_message5, $headers5);
     //echo $email_to5.' '.$email_subject5.'<br>';
	}
  
  }
  else
  {
    $s22=mysql_query("select * from hrm_pms_kra k inner join hrm_pms_krasub ks on k.KRAId=ks.KRAId where k.YearId=".$yid." AND k.EmployeeID=".$res['EmployeeID']." AND ks.Period='Quarter'",$con); $r22=mysql_num_rows($s22);
	//if($r22>0 AND (date("Y-m-d")==date("Y-04-01") OR date("Y-m-d")==date("Y-07-01") OR date("Y-m-d")==date("Y-10-01")))
	
	if($r22>0 AND (date("Y-m-d")==date("Y-04-07") OR date("Y-m-d")==date("Y-07-07") OR date("Y-m-d")==date("Y-10-07")))
	{
	
	  if($res['ReportingEmailId']!='')
      {
       $email_to5 = $res['ReportingEmailId'];
       $email_from5='admin@vnrseeds.co.in';
       $email_subject5 = "Communication : Assess the Quarterly KRA achievement";
       $headers5 = "From: ".$email_from5."\r\n";  
       $headers5 .= "MIME-Version: 1.0\r\n";
       $headers5 .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
       $email_message5 .="<html><head></head><body>";
       $email_message5 .= "Dear <b>Appraiser, </b> <br><br>\n\n\n";
       $email_message5 .= "Please assess the Quarterly KRA achievements by 14th of this month. Go to PMS module in ESS.<br><br>\n\n";
       $email_message5 .= "From <br><b>ADMIN ESS</b><br>";
       $email_message5 .="</body></html>";	      
       $ok=@mail($email_to5, $email_subject5, $email_message5, $headers5);
	   //echo 'BB=> '.$email_to5.' '.$email_subject5.'<br>';
      }
	 
	}
  } 
/************* 222222222222222 Close ******************/  
/************* 222222222222222 Close ******************/


/************* 333333333333333 Open ******************/  
/************* 333333333333333 Open ******************/
  $s13=mysql_query("select * from hrm_pms_kra where YearId=".$yid." AND EmployeeID=".$res['EmployeeID']." AND Period='1/2 Annual'",$con); $r13=mysql_num_rows($s13);
  if($r13>0 AND date("Y-m-d")==date("Y-07-07")) //if($r13>0 AND date("Y-m-d")==date("Y-07-01"))
  {
   
    if($res['ReportingEmailId']!='')
    {
     $email_to6 = $res['ReportingEmailId'];
     $email_from6='admin@vnrseeds.co.in';
     $email_subject6 = "Communication : Assess the Half Annual KRA achievement";
     $headers6 = "From: ".$email_from6."\r\n";  
     $headers6 .= "MIME-Version: 1.0\r\n";
     $headers6 .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
     $email_message6 .="<html><head></head><body>";
     $email_message6 .= "Dear <b>Appraiser, </b> <br><br>\n\n\n";
     $email_message6 .= "Please assess the Half Annual KRA achievements by 14th of this month. Go to PMS module in ESS.<br><br>\n\n";
     $email_message6 .= "From <br><b>ADMIN ESS</b><br>";
     $email_message6 .="</body></html>";	      
     $ok=@mail($email_to6, $email_subject6, $email_message6, $headers6);
     //echo $email_to6.' '.$email_subject6.'<br>';
	}
  
  }
  else
  {
    $s23=mysql_query("select * from hrm_pms_kra k inner join hrm_pms_krasub ks on k.KRAId=ks.KRAId where k.YearId=".$yid." AND k.EmployeeID=".$res['EmployeeID']." AND ks.Period='1/2 Annual'",$con); $r23=mysql_num_rows($s23);
	if($r23>0 AND date("Y-m-d")==date("Y-07-07")) //if($r23>0 AND date("Y-m-d")==date("Y-07-01"))
	{
	
	  if($res['ReportingEmailId']!='')
      {
       $email_to6 = $res['ReportingEmailId'];
       $email_from6 = 'admin@vnrseeds.co.in';
       $email_subject6 = "Communication : Assess the Half Annual KRA achievement";
       $headers6 = "From: ".$email_from6."\r\n";  
       $headers6 .= "MIME-Version: 1.0\r\n";
       $headers6 .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
       $email_message6 .="<html><head></head><body>";
       $email_message6 .= "Dear <b>Appraiser, </b> <br><br>\n\n\n";
       $email_message6 .= "Please assess the Half Annual KRA achievements by 14th of this month. Go to PMS module in ESS.<br><br>\n\n";
       $email_message6 .= "From <br><b>ADMIN ESS</b><br>";
       $email_message6 .= "</body></html>";	      
       $ok=@mail($email_to6, $email_subject6, $email_message6, $headers6);
	   //echo 'BB=> '.$email_to6.' '.$email_subject6.'<br>';
      }
	 
	}
  } 
/************* 333333333333333 Close ******************/  
/************* 333333333333333 Close ******************/  
  
  
 } //while
 
}


if($rowThCh>0){$InsTh=mysql_query("update hrm_com_mail_scalate_kra set ScalateKraYN='Y' where ScalateKraDate='".date("Y-m-d")."' AND CompanyId=".$CompanyId, $con);}
elseif($rowThCh==0){$InsTh=mysql_query("insert into hrm_com_mail_scalate_kra(ScalateKraDate,ScalateKraYN,CompanyId) values('".date("Y-m-d")."','Y',".$CompanyId.")", $con);}
}


?>