<?php require_once('../AdminUser/config/config.php'); ?>
<?php 
if(isset($_POST['AskQuery']))
{ $NOfQ=$_POST['NOfT']+1;  
  
  if($_POST['EmpCloseBy']==3)
  {
   $Eone=date("Y-m-d"); $Etwo=date("Y-m-d",strtotime('+3 day')); $Eno=0;  
   for($i=$Eone;$i<=$Etwo;$i++){ $Eday=date("N",strtotime($i)); if($Eday==7) { $Eno++; } } 
   $sqlE = mysql_query("SELECT * FROM hrm_employee_attendance WHERE EmployeeID=".$_POST['QEId']." AND AttValue='HO' AND AttDate>='".date("Y-m-d")."' AND AttDate<='".date("Y-m-d",strtotime('+3 day'))."'", $con); $rowE = mysql_num_rows($sqlE); $TotE=$Eno+$rowE; $TotDEmp=$TotE+3; $EmpDay = date("Y-m-d h:i:s",strtotime('+'.$TotDEmp.' day'));

   $Aone=date("Y-m-d"); $Atwo=date("Y-m-d",strtotime('+6 day')); $Ano=0; 
   for($i=$Aone;$i<=$Atwo;$i++){ $Aday=date("N",strtotime($i)); if($Aday==7) { $Ano++; } } 
   $sqlA = mysql_query("SELECT * FROM hrm_employee_attendance WHERE EmployeeID=".$_POST['QRId']." AND AttValue='HO' AND AttDate>='".date("Y-m-d")."' AND AttDate<='".date("Y-m-d",strtotime('+6 day'))."'", $con); $rowA = mysql_num_rows($sqlA); $TotA=$Ano+$rowA; $TotDApp=$TotA+6; $AppDay = date("Y-m-d h:i:s",strtotime('+'.$TotDApp.' day'));
  
   $Hone=date("Y-m-d"); $Htwo=date("Y-m-d",strtotime('+9 day')); $Hno=0; 
   for($i=$Hone;$i<=$Htwo;$i++){ $Hday=date("N",strtotime($i)); if($Hday==7) { $Hno++; } } 
   $sqlH = mysql_query("SELECT * FROM hrm_employee_attendance WHERE EmployeeID=".$_POST['QHId']." AND AttValue='HO' AND AttDate>='".date("Y-m-d")."' AND AttDate<='".date("Y-m-d",strtotime('+9 day'))."'", $con); $rowH = mysql_num_rows($sqlH); $TotH=$Hno+$rowH; $TotDHod=$TotH+9; $HodDay = date("Y-m-d h:i:s",strtotime('+'.$TotDHod.' day'));
   $L1QDT=date("Y-m-d h:i:s"); $L2QDT=$EmpDay; $L3QDT=$AppDay; $L4QDT=$HodDay;
  }
  
  elseif($_POST['RepCloseBy']==3)
  {
   $Aone=date("Y-m-d"); $Atwo=date("Y-m-d",strtotime('+3 day')); $Ano=0; 
   for($i=$Aone;$i<=$Atwo;$i++){ $Aday=date("N",strtotime($i)); if($Aday==7) { $Ano++; } } 
   $sqlA = mysql_query("SELECT * FROM hrm_employee_attendance WHERE EmployeeID=".$_POST['QRId']." AND AttValue='HO' AND AttDate>='".date("Y-m-d")."' AND AttDate<='".date("Y-m-d",strtotime('+3 day'))."'", $con); $rowA = mysql_num_rows($sqlA); $TotA=$Ano+$rowA; $TotDApp=$TotA+3; $AppDay = date("Y-m-d h:i:s",strtotime('+'.$TotDApp.' day'));
  
   $Hone=date("Y-m-d"); $Htwo=date("Y-m-d",strtotime('+6 day')); $Hno=0; 
   for($i=$Hone;$i<=$Htwo;$i++){ $Hday=date("N",strtotime($i)); if($Hday==7) { $Hno++; } } 
   $sqlH = mysql_query("SELECT * FROM hrm_employee_attendance WHERE EmployeeID=".$_POST['QHId']." AND AttValue='HO' AND AttDate>='".date("Y-m-d")."' AND AttDate<='".date("Y-m-d",strtotime('+6 day'))."'", $con); $rowH = mysql_num_rows($sqlH); $TotH=$Hno+$rowH; $TotDHod=$TotH+6; $HodDay = date("Y-m-d h:i:s",strtotime('+'.$TotDHod.' day'));
   $L1QDT=$_POST['EmpQDT']; $L2QDT=date("Y-m-d h:i:s"); $L3QDT=$AppDay; $L4QDT=$HodDay;
  }
  
  elseif($_POST['HodCloseBy']==3)
  {
   $Hone=date("Y-m-d"); $Htwo=date("Y-m-d",strtotime('+3 day')); $Hno=0; 
   for($i=$Hone;$i<=$Htwo;$i++){ $Hday=date("N",strtotime($i)); if($Hday==7) { $Hno++; } } 
   $sqlH = mysql_query("SELECT * FROM hrm_employee_attendance WHERE EmployeeID=".$_POST['QHId']." AND AttValue='HO' AND AttDate>='".date("Y-m-d")."' AND AttDate<='".date("Y-m-d",strtotime('+3 day'))."'", $con); $rowH = mysql_num_rows($sqlH); $TotH=$Hno+$rowH; $TotDHod=$TotH+3; $HodDay = date("Y-m-d h:i:s",strtotime('+'.$TotDHod.' day'));
   $L1QDT=$_POST['EmpQDT']; $L2QDT=$_POST['RepQDT']; $L3QDT=date("Y-m-d h:i:s"); $L4QDT=$HodDay;
  }
  
  elseif($_POST['MngmtCloseBy']==3){ $L1QDT=$_POST['EmpQDT']; $L2QDT=$_POST['RepQDT']; $L3QDT=$_POST['HodQDT']; $L4QDT=date("Y-m-d h:i:s"); }  

  if($NOfQ==2)
   {$SqlQU=mysql_query("update hrm_employee_queryemp set QStatus=1, QCloseStatus='N', Query2Value='".$_POST['Query']."', Query2DT='".date("Y-m-d h:i:s")."', QueryNoOfTime=".$NOfQ.", MailTo_Emp=1, MailTo_QueryOwner=1, QueryStatus_Emp=0, Level_1QToDT='".$L1QDT."', Level_1QStatus=0, Level_2QToDT='".$L2QDT."', Level_2QStatus=0, Level_3QToDT='".$L3QDT."', Level_3QStatus=0, Mngmt_QToDT='".$L4QDT."', Mngmt_QStatus=0, Mngmt_QAction=0 where QueryId=".$_POST['QId'], $con);}
   if($NOfQ==3)
   {$SqlQU=mysql_query("update hrm_employee_queryemp set QStatus=1, QCloseStatus='N', Query3Value='".$_POST['Query']."', Query3DT='".date("Y-m-d h:i:s")."', QueryNoOfTime=".$NOfQ.", MailTo_Emp=1, MailTo_QueryOwner=1, QueryStatus_Emp=0, Level_1QToDT='".$L1QDT."', Level_1QStatus=0, Level_2QToDT='".$L2QDT."', Level_2QStatus=0, Level_3QToDT='".$L3QDT."', Level_3QStatus=0, Mngmt_QToDT='".$L4QDT."', Mngmt_QStatus=0, Mngmt_QAction=0 where QueryId=".$_POST['QId'], $con);}
   if($NOfQ==4)
   {$SqlQU=mysql_query("update hrm_employee_queryemp set QStatus=1, QCloseStatus='N', Query4Value='".$_POST['Query']."', Query4DT='".date("Y-m-d h:i:s")."', QueryNoOfTime=".$NOfQ.", MailTo_Emp=1, MailTo_QueryOwner=1, QueryStatus_Emp=0, Level_1QToDT='".$L1QDT."', Level_1QStatus=0, Level_2QToDT='".$L2QDT."', Level_2QStatus=0, Level_3QToDT='".$L3QDT."', Level_3QStatus=0, Mngmt_QToDT='".$L4QDT."', Mngmt_QStatus=0, Mngmt_QAction=0 where QueryId=".$_POST['QId'], $con);}
   if($NOfQ==5)
   {$SqlQU=mysql_query("update hrm_employee_queryemp set QStatus=1, QCloseStatus='N', Query5Value='".$_POST['Query']."', Query5DT='".date("Y-m-d h:i:s")."', QueryNoOfTime=".$NOfQ.", MailTo_Emp=1, MailTo_QueryOwner=1, QueryStatus_Emp=0, Level_1QToDT='".$L1QDT."', Level_1QStatus=0, Level_2QToDT='".$L2QDT."',Level_2QStatus=0, Level_3QToDT='".$L3QDT."', Level_3QStatus=0, Mngmt_QToDT='".$L4QDT."', Mngmt_QStatus=0, Mngmt_QAction=0 where QueryId=".$_POST['QId'], $con);} 
 
   
   $sqlDD=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$_POST['DeptName'], $con); $resDD=mysql_fetch_assoc($sqlDD);    
   $QS=$_POST['QSubject'];	
   if($_POST['HideQ']=='Y'){$name='Name Undisclosed';}else{$name=$_POST['Ename'];}
   
   $sqlMK2=mysql_query("select * from hrm_employee_querymail_key where QueryMailId=2 AND CompanyId=".$_POST['ComId'], $con); $resMK2=mysql_fetch_assoc($sqlMK2);
   
   //Self
   if($_POST['EmailSelf']!='' AND $resMK2['Employee']=='Y')
   {
    //$email_to = "ajaykumar.dewangan@vnrseeds.in";
	$email_to = $_POST['EmailSelf'];
    if($_POST['EmailSelf']==''){$email_from = $_POST['Ename'];} else {$email_from=$_POST['EmailSelf'];}
	$email_subject = "Query Re-opened";  $semi_rand = md5(time()); 
	$headers = "From: " . $email_from . "\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
    $email_message .= "Dear <b>".$name."</b> <br><br>\n\n\n";
    $email_message .= "We have recieved your re-opened query about Subject-<b>".$QS."</b> raised to Department-<b>".$resDD['DepartmentCode']."</b>.<br>";
	$email_message .= "We have forwarded the same to appropriate owner and a reply shall be sent soon within 3 working days.<br><br>\n\n\n";
	$email_message .= "From <br><b>ADMIN ESS</b><br>";
    $ok = @mail($email_to, $email_subject, $email_message, $headers);
	//echo 'Self='.$email_to.' '.$email_subject.' '.$email_message.'<br><br>';
   }
     
   
//Query owner
  if($_POST['EmpCloseBy']==3 AND $resMK2['Leve_l']=='Y')
  { //$email_to = "ajaykumar.dewangan@vnrseeds.in";
    $email_to2 = $_POST['QEMail'];
    if($_POST['EmailSelf']==''){$email_from2 = $_POST['Ename'];} else {$email_from2=$_POST['EmailSelf'];}
	$email_subject2 = "Query Re-opened from ".$name;  $semi_rand = md5(time()); 
	$headers2 = "From: " . $email_from2 . "\r\n"; $headers2 .= "MIME-Version: 1.0\r\n";
    $headers2 .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
    $email_message2 .= "Dear <b>".$_POST['QEname']."</b> <br><br>\n\n\n";
    $email_message2 .= $name." has re-opened the query on Subject-<b>".$QS."</b>, go to <b>ESS-QUERY</b> for more details <a href='https://www.vnrseeds.co.in'>www.vnrseeds.co.in</a>.<br>"; 
	$email_message2 .= "You need to answer query in 3 working days after which it will get escalated to next level.<br><br>\n\n\n";
	$email_message2 .= "From <br><b>ADMIN ESS</b><br>";
    $ok = @mail($email_to2, $email_subject2, $email_message2, $headers2);
  }
  
  elseif($_POST['RepCloseBy']==3 AND $resMK2['Leve_2']=='Y')
  { //$email_to = "ajaykumar.dewangan@vnrseeds.in";
    $email_to2 = $_POST['QRMail'];
    if($_POST['EmailSelf']==''){$email_from2 = $_POST['Ename'];} else {$email_from2=$_POST['EmailSelf'];}
	$email_subject2 = "Query Re-opened from ".$name;  $semi_rand = md5(time()); 
	$headers2 = "From: " . $email_from2 . "\r\n"; $headers2 .= "MIME-Version: 1.0\r\n";
    $headers2 .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
    $email_message2 .= "Dear <b>".$_POST['QRname']."</b> <br><br>\n\n\n";
    $email_message2 .= $name." has re-opened the query on Subject-<b>".$QS."</b>, go to <b>ESS-QUERY</b> for more details <a href='https://www.vnrseeds.co.in'>www.vnrseeds.co.in</a>.<br>"; 
	$email_message2 .= "You need to answer query in 3 working days after which it will get escalated to next level.<br><br>\n\n\n";
	$email_message2 .= "From <br><b>ADMIN ESS</b><br>";
    $ok = @mail($email_to2, $email_subject2, $email_message2, $headers2);
  }  
  
  elseif($_POST['HodCloseBy']==3 AND $resMK2['Leve_3']=='Y')
  { //$email_to = "ajaykumar.dewangan@vnrseeds.in";
    $email_to2 = $_POST['QHMail'];
    if($_POST['EmailSelf']==''){$email_from2 = $_POST['Ename'];} else {$email_from2=$_POST['EmailSelf'];}
	$email_subject2 = "Query Re-opened from ".$name;  $semi_rand = md5(time()); 
	$headers2 = "From: " . $email_from2 . "\r\n"; $headers2 .= "MIME-Version: 1.0\r\n";
    $headers2 .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
    $email_message2 .= "Dear <b>".$_POST['QHname']."</b> <br><br>\n\n\n";
    $email_message2 .= $name." has re-opened the query on Subject-<b>".$QS."</b>, go to <b>ESS-QUERY</b> for more details <a href='https://www.vnrseeds.co.in'>www.vnrseeds.co.in</a>.<br>"; 
	$email_message2 .= "You need to answer query in 3 working days after which it will get escalated to next level.<br><br>\n\n\n";
	$email_message2 .= "From <br><b>ADMIN ESS</b><br>";
    $ok = @mail($email_to2, $email_subject2, $email_message2, $headers2);
  }  
  
  elseif($_POST['MngmtCloseBy']==3 AND $resMK2['Leve_4']=='Y')
  { //$email_to = "ajaykumar.dewangan@vnrseeds.in";
    $email_to2 = $_POST['QMMail'];
    if($_POST['EmailSelf']==''){$email_from2 = $_POST['Ename'];} else {$email_from2=$_POST['EmailSelf'];}
	$email_subject2 = "Query Re-opened from ".$name;  $semi_rand = md5(time()); 
	$headers2 = "From: " . $email_from2 . "\r\n"; $headers2 .= "MIME-Version: 1.0\r\n";
    $headers2 .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
    $email_message2 .= "Dear <b>".$_POST['QMname']."</b> <br><br>\n\n\n";
    $email_message2 .= $name." has re-opened the query on Subject-<b>".$QS."</b>, go to <b>ESS-QUERY</b> for more details <a href='https://www.vnrseeds.co.in'>www.vnrseeds.co.in</a>.<br>"; 
	$email_message2 .= "You need to answer query in 3 working days after which it will get escalated to next level.<br><br>\n\n\n";
	$email_message2 .= "From <br><b>ADMIN ESS</b><br>";
    $ok = @mail($email_to2, $email_subject2, $email_message2, $headers2);
   }       
  
  if($SqlQU) { echo '<script>alert("Your query has been submitted!");window.close();</script>';}
}
?>	 
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title><?php include_once('../Title.php'); ?>&nbsp;My Query</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<script type="text/javascript" language="javascript">
function validate(AskQform) 
{ 
  var Query = AskQform.Query.value;  
  if(Query.length == 0){ alert("Please type Query!"); return false;}
  if(Query=='Please type your query.'){ alert("Please type Query!"); return false;}  if(Query=='Please type your query'){ alert("Please type Query!"); return false;}
  var agree=confirm("Are you sure? your query will be submitted"); if (agree) { return true; } else { return false;}
} 

function FormRefresh(){ document.getElementById("Query").value='';}
</script>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" bgcolor="#E0DBE3">
<?php $sql = mysql_query("SELECT * FROM hrm_employee_queryemp WHERE QueryId=".$_REQUEST['Q'], $con) or die(mysql_error()); $res = mysql_fetch_assoc($sql); 
      $sqlE=mysql_query("select EmpCode,Fname,Sname,Lname,Married,Gender,DR,EmailId_Vnr from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee.EmployeeID=".$res['EmployeeID'], $con); $resE=mysql_fetch_assoc($sqlE); 
if($resE['DR']=='Y'){$M='Dr.';} elseif($resE['Gender']=='M'){$M='Mr.';} elseif($resE['Gender']=='F' AND $resE['Married']=='Y'){$M='Mrs.';} elseif($resE['Gender']=='F' AND $resE['Married']=='N'){$M='Miss.';}  $NameE=$M.' '.$resE['Fname'].' '.$resE['Sname'].' '.$resE['Lname'];  

$sqlQE=mysql_query("select Fname,Sname,Lname,Gender,DR,Married,EmailId_Vnr from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee.EmployeeID=".$res['Level_1ID'], $con); 
$resQE=mysql_fetch_assoc($sqlQE); if($resQE['DR']=='Y'){$ME='Dr.';} elseif($resQE['Gender']=='M'){$ME='Mr.';} elseif($resQE['Gender']=='F' AND $resQE['Married']=='Y'){$ME='Mrs.';} elseif($resQE['Gender']=='F' AND $resQE['Married']=='N'){$ME='Miss.';}  $QEName=$ME.' '.$resQE['Fname'].' '.$resQE['Sname'].' '.$resQE['Lname']; 

$sqlQR=mysql_query("select Fname,Sname,Lname,Gender,DR,Married,EmailId_Vnr from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee.EmployeeID=".$res['Level_2ID'], $con);
$resQR=mysql_fetch_assoc($sqlQR);  if($resQR['DR']=='Y'){$MR='Dr.';} elseif($resQR['Gender']=='M'){$MR='Mr.';} elseif($resQR['Gender']=='F' AND $resQR['Married']=='Y'){$MR='Mrs.';} elseif($resQR['Gender']=='F' AND $resQR['Married']=='N'){$MR='Miss.';}  $QRName=$MR.' '.$resQR['Fname'].' '.$resQR['Sname'].' '.$resQR['Lname'];

$sqlQH=mysql_query("select Fname,Sname,Lname,Gender,DR,Married,EmailId_Vnr from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee.EmployeeID=".$res['Level_3ID'], $con); 
$resQH=mysql_fetch_assoc($sqlQH);  if($resQH['DR']=='Y'){$MH='Dr.';} elseif($resQH['Gender']=='M'){$MH='Mr.';} elseif($resQH['Gender']=='F' AND $resQH['Married']=='Y'){$MH='Mrs.';} elseif($resQH['Gender']=='F' AND $resQH['Married']=='N'){$MH='Miss.';}  $QHName=$MH.' '.$resQH['Fname'].' '.$resQH['Sname'].' '.$resQH['Lname'];

$sqlQM=mysql_query("select Fname,Sname,Lname,Gender,DR,Married,EmailId_Vnr from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee.EmployeeID=".$res['Mngmt_ID'], $con); 
$resQM=mysql_fetch_assoc($sqlQM);  if($resQM['DR']=='Y'){$MM='Dr.';} elseif($resQM['Gender']=='M'){$MM='Mr.';} elseif($resQM['Gender']=='F' AND $resQM['Married']=='Y'){$MM='Mrs.';} elseif($resQM['Gender']=='F' AND $resQM['Married']=='N'){$MM='Miss.';}  $QMName=$MM.' '.$resQM['Fname'].' '.$resQM['Sname'].' '.$resQM['Lname'];
?>	
<table style="vertical-align:top;" width="460" align="center" border="0">
<tr>
 <td> <?php //,ReportingEmailId,EmailId_Vnr, RepMgrId, HodId, AssignEmpId ?>
   <table border="0">
   <tr>
     <td style="width:90px;margin-left:5px; margin-right:5px;font-family:Times New Roman;color:#0D3039;font-size:14px;" align="left" valign="top">
	 <u><b>Name</b></u>:</td>
	 <td style="width:380px;margin-left:5px; margin-right:5px;font-family:Times New Roman;color:#0D3039;font-size:14px;" align="left" valign="top">
	 <?php echo $NameE; ?></td>
  </tr>
   <tr>
     <td style="width:90px;margin-left:5px; margin-right:5px;font-family:Times New Roman;color:#0D3039;font-size:14px;" align="left" valign="top">
	 <u><b>Date</b></u>:</td>
	 <td style="width:380px;margin-left:5px; margin-right:5px;font-family:Times New Roman;color:#0D3039;font-size:14px;" align="left" valign="top">
	 <?php echo date("d F Y"); ?></td>
  </tr>
  <tr>
     <td style="width:90px;margin-left:5px; margin-right:5px;font-family:Times New Roman;color:#0D3039;font-size:14px;" align="left" valign="top">
	 <u><b>Department</b></u>:</td>
<?php $sqlD=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$res['QToDepartmentId'], $con); $resD=mysql_fetch_assoc($sqlD); ?>	
	 <td style="width:380px;margin-left:5px; margin-right:5px;font-family:Times New Roman;color:#0D3039;font-size:14px;" align="left" valign="top">
	 <?php echo $resD['DepartmentCode']; ?>&nbsp;&nbsp;&nbsp;<u><b>Subject</b></u> :<?php if($res['QuerySubject']=='N'){echo $res['OtherSubject'];} else {echo $res['QuerySubject'];} ?></td>
  </tr>
   <tr>
     <td style="width:90px;margin-left:5px; margin-right:5px;font-family:Times New Roman;color:#0D3039;font-size:14px;" align="left" valign="top">
	 <u><b>CC</b></u>:</td>
	 <td style="width:380px;margin-left:5px; margin-right:5px;font-family:Times New Roman;color:#0D3039;font-size:14px;" align="left" valign="top">
	 Reporting Manager, HOD</td>
  </tr>
<form name="AskQform" method="post" onSubmit="return validate(this)">  
  <tr>
     <td style="width:90px;margin-left:5px; margin-right:5px;font-family:Times New Roman;color:#0D3039;font-size:14px;" align="left" valign="top">
	 <u><b>Query</b></u> :</td>
	 <td style="width:380px;margin-left:5px; margin-right:5px;font-family:Times New Roman;color:#0D3039;font-size:14px;" align="left" valign="top">
	 <textarea name="Query" id="Query" cols="40" rows="8"></textarea>
     <input type="hidden" name="QId" value="<?php echo $_REQUEST['Q']; ?>" /><input type="hidden" name="NOfT" value="<?php echo $_REQUEST['NOfT']; ?>" />
     <input type="hidden" name="QT" value="<?php echo $_REQUEST['QT']; ?>" /><input type="hidden" name="HideQ" value="<?php echo $res['HideYesNo']; ?>" />
	 <input type="hidden" name="DeptName" value="<?php echo $res['QToDepartmentId']; ?>" /><input type="hidden" name="Ename" value="<?php echo $NameE; ?>" />
	 <input type="hidden" name="QSubject" value="<?php if($res['QuerySubject']=='N'){echo $res['OtherSubject'];} else {echo $res['QuerySubject'];} ?>" />
	 <input type="hidden" name="EmpId" value="<?php echo $res['EmployeeID']; ?>" /><input type="hidden" name="EmailSelf" value="<?php echo $resE['EmailId_Vnr']; ?>" />	
	 <input type="hidden" name="Ename" value="<?php echo $NameE; ?>" />
	 <input type="hidden" name="QEId" value="<?php echo $res['Level_1ID']; ?>" /><input type="hidden" name="QEMail" value="<?php echo $resQE['EmailId_Vnr']; ?>" />	
	 <input type="hidden" name="QEname" value="<?php echo $QEName; ?>" /><input type="hidden" name="QRId" value="<?php echo $res['Level_2ID']; ?>" />
	 <input type="hidden" name="QRMail" value="<?php echo $resQR['EmailId_Vnr']; ?>" /><input type="hidden" name="QRname" value="<?php echo $QRName; ?>" />
     <input type="hidden" name="QHId" value="<?php echo $res['Level_3ID']; ?>" /><input type="hidden" name="QHMail" value="<?php echo $resQH['EmailId_Vnr']; ?>" />	
	 <input type="hidden" name="QHname" value="<?php echo $QHName; ?>" /><input type="hidden" name="QMId" value="<?php echo $res['Mngmt_ID']; ?>" />
	 <input type="hidden" name="QMMail" value="<?php echo $resQM['EmailId_Vnr']; ?>" /><input type="hidden" name="QMname" value="<?php echo $QMName; ?>" />
	 <input type="hidden" name="EmpCloseBy" value="<?php echo $res['Level_1QStatus']; ?>" /><input type="hidden" name="RepCloseBy" value="<?php echo $res['Level_2QStatus']; ?>" />
	 <input type="hidden" name="HodCloseBy" value="<?php echo $res['Level_3QStatus']; ?>" /><input type="hidden" name="MngmtCloseBy" value="<?php echo $res['Mngmt_QStatus']; ?>" />
	 <input type="hidden" name="EmpQDT" value="<?php echo $res['Level_1QToDT']; ?>" /><input type="hidden" name="RepQDT" value="<?php echo $res['Level_2QToDT']; ?>" />
	 <input type="hidden" name="HodQDT" value="<?php echo $res['Level_3QToDT']; ?>" /><input type="hidden" name="MngmtQDT" value="<?php echo $res['Mngmt_QToDT']; ?>" />
	 <input type="hidden" name="ComId" value="<?php echo $_REQUEST['CI']; ?>" />
	 </td>
  </tr>
  <tr>
   <td colspan="2" valign="top" align="Right" style="font-family:Times New Roman;color:#AA0000;font-size:15px; font-weight:bold;">
   <?php echo $Msg; ?>
   <input type="submit" name="AskQuery" style="width:90px;" value="Send">
   <input type="button" name="Refresh" id="Refresh" style="width:90px;" value="Refresh" onClick="FormRefresh()"/></td>
  </tr>    
  </form>
  </table>
 </td>
</tr>
</table>
</body>
</html>