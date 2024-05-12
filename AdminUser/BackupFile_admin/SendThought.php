<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}
//**********************************************************************************************************************//
if($_REQUEST['action']=='SendThought')
{ 
$sqlThCh=mysql_query("select * from hrm_com_send_thought where SendThougtDate='".date("Y-m-d")."' AND YesNo='Y' AND CompanyId=".$CompanyId, $con); $rowThCh=mysql_num_rows($sqlThCh); 
if($rowThCh==0)
{
if(date("d")=='01'){$day=1;}elseif(date("d")=='02'){$day=2;}elseif(date("d")=='03'){$day=3;}elseif(date("d")=='04'){$day=4;}elseif(date("d")=='05'){$day=5;}
elseif(date("d")=='06'){$day=6;}elseif(date("d")=='07'){$day=7;}elseif(date("d")=='08'){$day=8;}elseif(date("d")=='09'){$day=9;}else{$day=date("d");}
$fileatt = "ThoughtImg/".$day.".jpeg"; // Path to the file                  
$fileatt_type = "image/jpeg"; // File Type 
//$fileatt_type = "application/octet-stream"; // File Type
$fileatt_name = "ThoughtImages"; // Filename that will be used for the file as the attachment 
$email_from = "vspl.hr@vnrseeds.com"; // Who the email is from 
$email_Tsubject = "Thought For The Day"; // The Subject of the email 
$email_txt = "Hello"; // Message that the email has in it 
$headers = "From: " . $email_from . "\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
$file = fopen($fileatt,'rb'); 
$data = fread($file,filesize($fileatt)); 
$semi_rand = md5(time()); 
$email_Tmessage .= "Todays Thought For The Day <br>From : VSPL HR.\n\n\n";
$email_Tmessage .="<html><head></head><body>";
$email_Tmessage .="<table border='2'><tr><td>";
$email_Tmessage .="<img src='https://www.vnrseeds.co.in/hrims/AdminUser/ThoughtImg/".$day.".jpeg' alt=''/>\n\n";
$email_Tmessage .="</td></tr></table>";
$email_Tmessage .="</body></html>";	
        
$email_to = 'vspl.employees@vnrseeds.com';
$ok = mail($email_to, $email_Tsubject, $email_Tmessage, $headers);
 
/*
$sql=mysql_query("select EmailId_Vnr from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId,$con);
$Sn=1; while($res=mysql_fetch_assoc($sql)){ 
$e.''.$Sn=$res['EmailId_Vnr'];
$ok = mail($e.''.$Sn, $email_Tsubject, $email_Tmessage, $headers);
$Sn++;}		  
*/

if($ok) { $InsTh=mysql_query("insert into hrm_com_send_thought(SendThougtDate,YesNo,CompanyId) values('".date("Y-m-d")."','Y',".$CompanyId.")", $con); 
          $MsgThought='The Thought Image successfully sent'; 
		}
else { $msgThought='Sorry..';}
}
} 

if($_REQUEST['action']=='SendAnn')
{
$sqlAnn=mysql_query("select * from hrm_com_send_anniversary where AnnDate='".date("Y-m-d")."' AND YesNo='Y' AND CompanyId=".$CompanyId, $con); $rowAnn=mysql_num_rows($sqlAnn);
if($rowAnn==0)
{ 
if(date("d")==01 OR date("d")==02 OR date("d")==03 OR date("d")==04){$AImg='A_1';} //elseif(date("d")==05 OR date("d")==06 OR date("d")==07 OR date("d")==08){$AImg='A_2';}
elseif(date("d")==9 OR date("d")==10 OR date("d")==11 OR date("d")==12){$AImg='A_3';} elseif(date("d")==13 OR date("d")==14 OR date("d")==15 OR date("d")==16){$AImg='A_4';}
elseif(date("d")==17 OR date("d")==18 OR date("d")==19 OR date("d")==20){$AImg='A_5';} elseif(date("d")==21 OR date("d")==22 OR date("d")==23 OR date("d")==24){$AImg='A_6';}
elseif(date("d")==25 OR date("d")==26 OR date("d")==27){$AImg='A_7';} elseif(date("d")==28 OR date("d")==29 OR date("d")==30 OR date("d")==31){$AImg='A_8';} 
$sqlAnn=mysql_query("select hrm_employee.*,Gender,DR,Married,MarriageDate,MarriageDate_dm,HusWifeName,DepartmentId from hrm_employee INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_family ON hrm_employee.EmployeeID=hrm_employee_family.EmployeeID where Married='Y' AND hrm_employee_personal.MarriageDate!='1970-01-01' AND hrm_employee_personal.MarriageDate_dm='".date("0000-m-d")."' AND hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." group by EmployeeID", $con); 
$rowAnn=mysql_num_rows($sqlAnn); 
 if($rowAnn>0)
 { 
   while($resAnn=mysql_fetch_array($sqlAnn))
   { 
     $fileatt = "AnnBirth/".$AImg.".jpg"; $fileatt_type = "image/jpg"; $fileatt_name = "AnnImages"; $email_from = "vspl.hr@vnrseeds.com"; 
     $email_Asubject = "Marriage Anniversary Wishes"; $email_txt = "Hello"; $headers = "From: " . $email_from . "\r\n"; 
     $headers .= "MIME-Version: 1.0\r\n"; $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
     $file = fopen($fileatt,'rb'); $data = fread($file,filesize($fileatt)); $semi_rand = md5(time()); 
      ////$email_to = 'vspl.employees@vnrseeds.com';
     $email_to = 'ajaykumar.dewangan@vnrseeds.in';   
     $sqlDN=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$resAnn['DepartmentId'], $con); $resDN=mysql_fetch_assoc($sqlDN);
	 $EAname=$resAnn['Fname'].' '.$resAnn['Sname'].' '.$resAnn['Lname'];
     if($resAnn['DR']=='Y' AND $resAnn['Gender']=='M'){$MSA='Dear Mrs. & Dr. '.$EAname; $Head='Dr.'.$EAname. ' (<b style="color:#B30000;">'.$resDN['DepartmentCode'].'</b>)'; }
	 elseif($resAnn['DR']=='Y' AND $resAnn['Gender']=='F'){$MSA='Dear Mr. & Dr. '.$EAname; $Head='Dr.'.$EAname. ' (<b style="color:#B30000;">'.$resDN['DepartmentCode'].'</b>)'; }
	 elseif($resAnn['DR']=='N' AND $resAnn['Gender']=='M'){$MSA='Dear Mrs. & Mr. '.$EAname; $Head='Mr.'.$EAname. ' (<b style="color:#B30000;">'.$resDN['DepartmentCode'].'</b>)'; }
	 elseif($resAnn['DR']=='N' AND $resAnn['Gender']=='F'){$MSA='Dear Mr. & Mrs. '.$EAname; $Head='Mrs.'.$EAname. ' (<b style="color:#B30000;">'.$resDN['DepartmentCode'].'</b>)'; }
	 $email_Amessage .=$Head;
	 $email_Amessage .="<html><head></head><body><table border='0'><tr>";
	 $email_Amessage .="<td style='font-size:15px;background-image:url(https://www.vnrseeds.co.in/hrims/AdminUser/AnnBirth/".$AImg.".jpg); width:692px;height:582px;' valign='top'>";
     $email_Amessage .="<br>&nbsp;<font style='color:#820000; font-size:22px; font-family:Georgia;'><i><b>".$MSA."</b></i></font>";
	 $email_Amessage .="</td></tr></table></body></html>";   
	}  
     //$okA = mail($email_to, $email_Asubject, $email_Amessage, $headers); 
 }
 if($okA) { $InsAnn=mysql_query("insert into hrm_com_send_anniversary(AnnDate,YesNo,CompanyId) values('".date("Y-m-d")."','Y',".$CompanyId.")", $con);
            $MsgAnn='The Anniversary wish sent to successfully'; 
		  }
}
}

if($_REQUEST['action']=='SendBirth')
{
$sqlBirth=mysql_query("select * from hrm_com_send_birthday where BirthDate='".date("Y-m-d")."' AND YesNo='Y' AND CompanyId=".$CompanyId, $con); $rowBirth=mysql_num_rows($sqlBirth);
if($rowBirth==0)
{
if(date("d")==01 OR date("d")==02 OR date("d")==03 OR date("d")==04){$BImg='B_1';} elseif(date("d")==05 OR date("d")==06 OR date("d")==07 OR date("d")==08){$BImg='B_2';}
elseif(date("d")==9 OR date("d")==10 OR date("d")==11 OR date("d")==12){$BImg='B_3';} elseif(date("d")==13 OR date("d")==14 OR date("d")==15 OR date("d")==16){$BImg='B_4';}
elseif(date("d")==17 OR date("d")==18 OR date("d")==19 OR date("d")==20){$BImg='B_5';} elseif(date("d")==21 OR date("d")==22 OR date("d")==23 OR date("d")==24){$BImg='B_6';}
elseif(date("d")==25 OR date("d")==26 OR date("d")==27){$BImg='B_7';} elseif(date("d")==28 OR date("d")==29 OR date("d")==30 OR date("d")==31){$BImg='B_8';}
$sqlBir=mysql_query("select hrm_employee.*,Gender,DR,DOB,DOB_dm,DepartmentId from hrm_employee INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee_general.DOB!='1970-01-01' AND hrm_employee_general.DOB_dm='".date("0000-m-d")."' AND hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId, $con); $rowBir=mysql_num_rows($sqlBir);  
 if($rowBir>0)
 {
   while($resBir=mysql_fetch_array($sqlBir))
   {  
    $fileatt = "AnnBirth/".$BImg.".jpg"; $fileatt_type = "image/jpg"; $fileatt_name = "AnnImages"; $email_from = "vspl.hr@vnrseeds.com"; 
    $email_txt = "Hello"; $headers = "From: " . $email_from . "\r\n";
    $headers .= "MIME-Version: 1.0\r\n"; $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
    $file = fopen($fileatt,'rb'); $data = fread($file,filesize($fileatt)); $semi_rand = md5(time()); 
    ////$email_to = 'vspl.employees@vnrseeds.com';
    $email_to = 'ajaykumar.dewangan@vnrseeds.in';
    $sqlDN2=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$resBir['DepartmentId'], $con); $resDN2=mysql_fetch_assoc($sqlDN2);
	$EBname=$resBir['Fname'].' '.$resBir['Sname'].' '.$resBir['Lname'];
    if($resBir['DR']=='Y'){$MSB='Dear Dr. '.$EBname; $HeadB='Dr.'.$EBname. ' ('.$resDN2['DepartmentCode'].')'; }
	elseif($resBir['DR']=='N' AND $resBir['Gender']=='M'){$MSB='Dear Mr. '.$EBname; $HeadB='Mr.'.$EBname. ' ('.$resDN2['DepartmentCode'].')'; }
	elseif($resBir['DR']=='N' AND $resBir['Gender']=='F'){$MSB='Dear Mrs. '.$EBname; $HeadB='Mrs.'.$EBname. ' ('.$resDN2['DepartmentCode'].')'; }
	 $email_Bsubject = "Birthday Wishes - ".$HeadB;
	 $email_Bmessage .="<html><head></head><body><table border='0'><tr>";
	 $email_Bmessage .="<td style='font-size:15px;background-image:url(https://www.vnrseeds.co.in/hrims/AdminUser/AnnBirth/".$BImg.".jpg); width:692px;height:582px;' valign='top'>";
     $email_Bmessage .="<br>&nbsp;<font style='color:#820000; font-size:22px; font-family:Georgia;'><i><b>".$MSB."</b></i></font>";
	 $email_Bmessage .="</td></tr></table></body></html>"; 
	 //$okB = mail($email_to, $email_Bsubject, $email_Bmessage, $headers);
   }    
     
 }
 if($okB) { $InsBirth=mysql_query("insert into hrm_com_send_birthday(BirthDate,YesNo,CompanyId) values('".date("Y-m-d")."','Y',".$CompanyId.")", $con);
            $MsgBirth='The Birthday wish sent to successfully'; 
		  } 
}
}

if($_REQUEST['action']=='SendCoAnn')
{ 
$sqlCoAnn=mysql_query("select * from hrm_com_send_corporate_anniversary where CoAnnDate='".date("Y-m-d")."' AND YesNo='Y' AND CompanyId=".$CompanyId, $con); 
$rowCoAnn=mysql_num_rows($sqlCoAnn);
if($rowCoAnn==0)
{
$Be_7D = date("Y-m-d",strtotime('-2555 day')); $Be_5D = date("Y-m-d",strtotime('-1825 day')); 
$Be_3D = date("Y-m-d",strtotime('-1095 day')); $Be_1D = date("Y-m-d",strtotime('-365 day')); 
$fileatt = "AnnBirth/C_1.jpg"; $fileatt_type = "image/jpg"; $fileatt_name = "CoAnnImages"; $email_from = "vspl.hr@vnrseeds.com"; 
$email_txt = "Hello"; $headers = "From: " . $email_from . "\r\n";
$headers .= "MIME-Version: 1.0\r\n"; $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
$file = fopen($fileatt,'rb'); $data = fread($file,filesize($fileatt)); $semi_rand = md5(time()); 
////$email_to = 'vspl.employees@vnrseeds.com';
$email_to = 'ajaykumar.dewangan@vnrseeds.in'; 

$S7=mysql_query("select hrm_employee.EmployeeID,Fname,Sname,Lname,Gender,DepartmentId,DesigId,HqId,Married,DateJoining,DR from hrm_employee INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee_general.DateJoining='".$Be_7D."' AND hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." order by DateJoining ASC", $con); 
$S5=mysql_query("select hrm_employee.EmployeeID,Fname,Sname,Lname,Gender,DepartmentId,DesigId,HqId,Married,DateJoining,DR from hrm_employee INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee_general.DateJoining='".$Be_5D."' AND hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." order by DateJoining ASC", $con); 
$S3=mysql_query("select hrm_employee.EmployeeID,Fname,Sname,Lname,Gender,DepartmentId,DesigId,HqId,Married,DateJoining,DR from hrm_employee INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee_general.DateJoining='".$Be_3D."' AND hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." order by DateJoining ASC", $con); 
$S1=mysql_query("select hrm_employee.EmployeeID,Fname,Sname,Lname,Gender,DepartmentId,DesigId,HqId,Married,DateJoining,DR from hrm_employee INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee_general.DateJoining='".$Be_1D."' AND hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." order by DateJoining ASC", $con);   
$row7=mysql_num_rows($S7);  $row5=mysql_num_rows($S5);  $row3=mysql_num_rows($S3);  $row1=mysql_num_rows($S1);  
 if($row7>0)
 { $email_subject7 = "Corporate Anniversary wishes for completion of 7 years"; 
   while($res7=mysql_fetch_array($S7))
   {  
    $sqlDN2=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$res7['DepartmentId'], $con); $resDN2=mysql_fetch_assoc($sqlDN2);
if($res7['DR']=='Y'){$MS7='DR. '.$res7['Fname'].' '.$res7['Sname'].' '.$res7['Lname']. ' (<b style="color:#B30000;">'.$resDN2['DepartmentCode'].'</b>)';}
elseif($res7['DR']=='N' AND $res7['Gender']=='M'){$MS7='Mr. '.$res7['Fname'].' '.$res7['Sname'].' '.$res7['Lname']. ' (<b style="color:#B30000;">'.$resDN2['DepartmentCode'].'</b>)';}
elseif($res7['DR']=='N' AND $res7['Gender']=='F'){$MS7='Mrs. '.$res7['Fname'].' '.$res7['Sname'].' '.$res7['Lname']. ' (<b style="color:#B30000;">'.$resDN2['DepartmentCode'].'</b>)';}
	$email_message7 .= "<b style='font-size:15px;'>".$MS7.", &nbsp;&nbsp;</b>\n\n\n";
   }  
    $email_message7 .="<html><head></head><body><table border='0'><tr><td style='font-size:14px;'>";
	$email_message7 .="<b>Congratulations on completion of milestone 7 years in VNR.</b><br><br>";
    $email_message7 .="<img src='https://www.vnrseeds.co.in/hrims/AdminUser/AnnBirth/C_7.jpg' alt=''/>\n\n";
    $email_message7 .="<br><b>From : VSPL HR.</b></td></tr></table></body></html>"; 
    //$okC = mail($email_to, $email_subject7, $email_message7, $headers);
 }
 if($row5>0)
 { $email_subject5 = "Corporate Anniversary wishes for completion of 5 years"; 
   while($res5=mysql_fetch_array($S5))
   {  
    $sqlDN2=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$res5['DepartmentId'], $con); $resDN2=mysql_fetch_assoc($sqlDN2);
if($res5['DR']=='Y'){$MS5='DR. '.$res5['Fname'].' '.$res5['Sname'].' '.$res5['Lname']. ' (<b style="color:#B30000;">'.$resDN2['DepartmentCode'].'</b>)';}
elseif($res5['DR']=='N' AND $res5['Gender']=='M'){$MS5='Mr. '.$res5['Fname'].' '.$res5['Sname'].' '.$res5['Lname']. ' (<b style="color:#B30000;">'.$resDN2['DepartmentCode'].'</b>)';}
elseif($res5['DR']=='N' AND $res5['Gender']=='F'){$MS5='Mrs. '.$res5['Fname'].' '.$res5['Sname'].' '.$res5['Lname']. ' (<b style="color:#B30000;">'.$resDN2['DepartmentCode'].'</b>)';}
	$email_message5 .= "<b style='font-size:15px;'>".$MS5.", &nbsp;&nbsp;</b>\n\n\n";
   }  
    $email_message5 .="<html><head></head><body><table border='0'><tr><td style='font-size:14px;'>";
	$email_message5 .="<b>Congratulations on completion of milestone 5 years in VNR.</b><br><br>";
    $email_message5 .="<img src='https://www.vnrseeds.co.in/hrims/AdminUser/AnnBirth/C_5.jpg' alt=''/>\n\n";
    $email_message5 .="<br><b>From : VSPL HR.</b></td></tr></table></body></html>"; 
    //$okC = mail($email_to, $email_subject5, $email_message5, $headers);
 }
 if($row3>0)
 { $email_subject3 = "Corporate Anniversary wishes for completion of 3 years"; 
   while($res3=mysql_fetch_array($S3))
   {  
    $sqlDN2=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$res3['DepartmentId'], $con); $resDN2=mysql_fetch_assoc($sqlDN2);
if($res3['DR']=='Y'){$MS3='DR. '.$res3['Fname'].' '.$res3['Sname'].' '.$res3['Lname']. ' (<b style="color:#B30000;">'.$resDN2['DepartmentCode'].'</b>)';}
elseif($res3['DR']=='N' AND $res3['Gender']=='M'){$MS3='Mr. '.$res3['Fname'].' '.$res3['Sname'].' '.$res3['Lname']. ' (<b style="color:#B10000;">'.$resDN2['DepartmentCode'].'</b>)';}
elseif($res3['DR']=='N' AND $res3['Gender']=='F'){$MS3='Mrs. '.$res3['Fname'].' '.$res3['Sname'].' '.$res3['Lname']. ' (<b style="color:#B10000;">'.$resDN2['DepartmentCode'].'</b>)';}
	$email_message3 .= "<b style='font-size:15px;'>".$MS3.", &nbsp;&nbsp;</b>\n\n\n";
   }  
    $email_message3 .="<html><head></head><body><table border='0'><tr><td style='font-size:14px;'>";
	$email_message3 .="<b>Congratulations on completion of milestone 3 years in VNR.</b><br><br>";
    $email_message3 .="<img src='https://www.vnrseeds.co.in/hrims/AdminUser/AnnBirth/C_3.jpg' alt=''/>\n\n";
    $email_message3 .="<br><b>From : VSPL HR.</b></td></tr></table></body></html>";  
    //$okC = mail($email_to, $email_subject3, $email_message3, $headers);
 }
 if($row1>0)
 { $email_subject1 = "Corporate Anniversary wishes for completion of 1 year"; 
   while($res1=mysql_fetch_array($S1))
   {  
    $sqlDN2=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$res1['DepartmentId'], $con); $resDN2=mysql_fetch_assoc($sqlDN2);
if($res1['DR']=='Y'){$MS1='DR. '.$res1['Fname'].' '.$res1['Sname'].' '.$res1['Lname']. ' (<b style="color:#B10000;">'.$resDN2['DepartmentCode'].'</b>)';}
elseif($res1['DR']=='N' AND $res1['Gender']=='M'){$MS1='Mr. '.$res1['Fname'].' '.$res1['Sname'].' '.$res1['Lname']. ' (<b style="color:#B10000;">'.$resDN2['DepartmentCode'].'</b>)';}
elseif($res1['DR']=='N' AND $res1['Gender']=='F'){$MS1='Mrs. '.$res1['Fname'].' '.$res1['Sname'].' '.$res1['Lname']. ' (<b style="color:#B10000;">'.$resDN2['DepartmentCode'].'</b>)';}
	$email_message1 .= "<b style='font-size:15px;'>".$MS1.", &nbsp;&nbsp;</b>\n\n\n";
   }  
    $email_message1 .="<html><head></head><body><table border='0'><tr><td style='font-size:14px;'>";
	$email_message1 .="<b>Congratulations on completion of milestone 1 year in VNR.</b><br><br>";
    $email_message1 .="<img src='https://www.vnrseeds.co.in/hrims/AdminUser/AnnBirth/C_1.jpg' alt=''/>\n\n";
    $email_message1 .="<br><b>From : VSPL HR.</b></td></tr></table></body></html>";
    //$okC = mail($email_to, $email_subject1, $email_message1, $headers);
 } 
 if($okC) { $InsCoAnn=mysql_query("insert into hrm_com_send_corporate_anniversary(CoAnnDate,YesNo,CompanyId) values('".date("Y-m-d")."','Y',".$CompanyId.")", $con);
            $MsgCoAnn='The corporate anniversary wish sent to successfully'; 
		  } 
}
}
?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<link rel="stylesheet" type="text/css" href="src/css/jscal2.css"/>
<link rel="stylesheet" type="text/css" href="src/css/border-radius.css"/>
<link rel="stylesheet" type="text/css" href="src/css/steel/steel.css"/>
<script type="text/javascript" src="src/js/jscal2.js"></script>
<script type="text/javascript" src="src/js/lang/en.js"></script>
<style> .font { color:#ffffff; font-family:Georgia; font-size:11px; width:200px;} .font1 { font-family:Georgia; font-size:11px; height:14px; width:200px; } 
.font2 { font-size:11px;width:260px;height:18px;} .font4 { color:#1FAD34; font-family:Georgia; font-size:15px;}
.span {display:none; font-family:Courier New; font-size:14px; }.span1 {display:block; font-family:Courier New; font-size:14px; }
.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;}
.SaveButton {background-image:url(images/save.gif); width:20px; height:20px; background-repeat:no-repeat; background-color:#FFFFFF; border-color:#FFFFFF; border-bottom:inherit;}
.EditSelect { font-family:Georgia; font-size:11px; width:120px; height:18px;}
.EditInput { font-family:Georgia; font-size:11px; width:150px; height:18px;}
.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}
</style>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<script type="text/javascript" src="js/MandatoryAjaxCall.js"></script>
<Script type="text/javascript">window.history.forward(1);</Script>
<Script>
function SendThought()
{
 var agree=confirm("Are you sure you want to send thought for day?");
 if (agree) { var x = "SendThought.php?action=SendThought";  window.location=x;}
}

function SendAnn()
{
 var agree=confirm("Are you sure you want to send anniversary event?");
 if (agree) { var x = "SendThought.php?action=SendAnn";  window.location=x;}
}

function SendBirth()
{
 var agree=confirm("Are you sure you want to send birthday event?");
 if (agree) { var x = "SendThought.php?action=SendBirth";  window.location=x;}
}

function SendCoAnn()
{
 var agree=confirm("Are you sure you want to send corporate anniersary event?");
 if (agree) { var x = "SendThought.php?action=SendCoAnn";  window.location=x;}
}

</SCRIPT> 
</head>
<body class="body">
<table class="table">
<tr>
 <td>
  <table class="menutable"><tr><td><?php if($_SESSION['login'] = true){ require_once("AMenu.php"); } ?></td></tr></table>
 </td>
</tr>
<tr>
 <td valign="top">
  <table width="100%" style="margin-top:0px;" border="0">
    <tr>
	  <td valign="top"><?php if($_SESSION['login'] = true){ require_once("AWelcome.php"); } ?></td>
	</tr>
	 <tr>
	  <td valign="top" align="center"  width="100%" id="MainWindow"><br>
<?php //************************************************************************************************************************************************************?>
<?php //**********************************************START*****START*****START******START******START***************************************************************?>
<?php //************************************************************************************************************************************************************?>
<?php  $m=date("m"); $year=date("Y");
       if($m==1 OR $m==3 OR $m==5 OR $m==7 OR $m==8 OR $m==10 OR $m==12){ $day=31;}
       elseif($m==2){ if(date("Y")==2012 OR date("Y")==2016 OR date("Y")==2020 OR date("Y")==2024 OR date("Y")==2028 OR date("Y")==2032) { $day=29; } else { $day=28;}}
       elseif($m==4 OR $m==6 OR $m==9 OR $m==11){ $day=30;}
?>	  
<table border="0" style="margin-top:0px; width:100%; height:300px;">
 <tr>
  <td align="left" height="20" valign="top" colspan="3">
   <table border="0">
    <tr>
	  <td align="right" width="417" class="heading">Send Thought & Birthday/Anniversary Wishes</td>
	  <td class="font4" align="left">&nbsp;&nbsp;&nbsp;<b><?php echo $msg; ?></b></td>
	</tr>
   </table>
  </td>
 </tr>
<?php if(($_SESSION['UserType']=='S' OR $_SESSION['UserType']=='A') AND $_SESSION['login'] = true) { ?>	
 <tr>
 <td width="50">&nbsp;</td>
<?php //*********************************************** Open Department******************************************************?> 
<td align="left" id="type" valign="top" style="display:block; width:100%">             
   <table border="0" width="1000">
	<tr>
	  <td><table border="0"><tr>
	  <td valign="top" style="width:250px;font-family:Times New Roman;font-size:16px; font-weight:bold;">Thought</td><td>&nbsp;:&nbsp;</td>
	  <td valign="top"><?php if($_SESSION['User_Permission']=='Edit'){?><input type="button" onClick="SendThought()" value="Send Thought For Day" /><?php } ?></td>
	  <td style="color:#1FAD34; font-family:Georgia; font-size:15px;width:450px;"><b><?php echo $MsgThought; ?></b></td>
	  </tr>
	  <tr>
	  <td valign="top" style="width:250px;font-family:Times New Roman;font-size:16px; font-weight:bold;">Wedding Anniversary</td><td>&nbsp;:&nbsp;</td>
	  <td valign="top"><?php if($_SESSION['User_Permission']=='Edit'){?><input type="button" onClick="SendAnn()" value="Send Anniversary" /><?php } ?></td>
	  <td style="color:#1FAD34; font-family:Georgia; font-size:15px;width:450px;"><b><?php echo $MsgAnn; ?></b></td>
	  </tr>
	  <tr>
	  <td valign="top" style="width:250px;font-family:Times New Roman;font-size:16px; font-weight:bold;">Birthday</td><td>&nbsp;:&nbsp;</td>
	  <td valign="top"><?php if($_SESSION['User_Permission']=='Edit'){?><input type="button" onClick="SendBirth()" value="Send Birthday" /><?php } ?></td>
	  <td style="color:#1FAD34; font-family:Georgia; font-size:15px;width:450px;"><b><?php echo $MsgBirth; ?></b></td>
	  </tr>
	  <tr>
	  <td valign="top" style="width:250px;font-family:Times New Roman;font-size:16px; font-weight:bold;">Corporate Anniversary</td><td>&nbsp;:&nbsp;</td>
	  <td valign="top"><?php if($_SESSION['User_Permission']=='Edit'){?><input type="button" onClick="SendCoAnn()" value="Send Corporate Anniversary" /><?php } ?></td>
	  <td style="color:#1FAD34; font-family:Georgia; font-size:15px;width:450px;"><b><?php echo $MsgCoAnn; ?></b></td>
	  </tr>
	  </table></td>
    </tr>
  </table>  
</td>
<?php //*********************************************** Close Department******************************************************?>   

 </tr>
<?php } ?> 
</table>
		
<?php //************************************************************************************************************************************************************?>
<?php //**********************************************END*****END*****END******END******END***************************************************************?>
<?php //************************************************************************************************************************************************************?>
		
	  </td>
	</tr>
	
	<tr>
	  <td valign="top" align="center">
	    <table border="0" style="margin-top:0px;">
				<tr>
	              <td align="center"><img src="images/home1.png"></td>
				</tr>
	    </table>
	  </td>
	</tr>
	<tr>
	  <td valign="top">
	    <?php require_once("../footer.php"); ?>
	  </td>
	</tr>
  </table>
 </td>
</tr>
</table>
</body>
</html>
