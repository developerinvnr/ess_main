<?php require_once("../AdminUser/config/config.php");
//************** HR ******************/
if(isset($_POST['act']) && $_POST['act']=='HrOk')
{ $sqlH=mysql_query("update hrm_employee_separation set Acc_HrNOC='Y' where EmpSepId=".$_POST['si'], $con); echo 'Clearance ok'; }

if($_POST['SubHRRes'])
{ $search =  '!"#$%/\'-:_' ; $search = str_split($search);
  $ReaHR1=str_replace($search, "", $_POST['ReaHR1']); $ReaHR2=str_replace($search, "", $_POST['ReaHR2']);
  $ReasonHR=$ReaHR1.' '.$ReaHR2;
  $sqlH=mysql_query("update hrm_employee_separation set HR_NOC='N', Acc_HrNOC='R', Acc_HrReason='".$ReasonHR."' where EmpSepId=".$_POST['si'], $con); 
  if($sqlH)
  {
    //$email_to = 'vspl.hr@vnrseeds.com';
    //$email_from = 'admin@vnrseeds.co.in';
    $email_subject = "Resent HR NOC clearance form";
	//$email_txt = "Resent HR NOC clearance form";
	//$headers = "From: ".$email_from."\r\n";
	//$semi_rand = md5(time()); 
	//$headers .= "MIME-Version: 1.0\r\n";
	//$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
	$email_message .="Finance has resent the HR clearance form of ".$_POST['Ename']." due to : <b>".$ReasonHR."</b>. Log on to ESS for further details and corrections <a href='https://www.vnrseeds.co.in'>www.vnrseeds.co.in</a>. \n\n";
	//$ok = @mail($email_to, $email_subject, $email_message, $headers);

$subject=$email_subject;
$body=$email_message;
$email_to='vspl.hr@vnrseeds.com';
require 'vendor/mail_admin.php';	
	
   echo '<script>alert("Clearance form resent successfully"); window.close();</script>'; 
  }
}



//************** IT ******************/
if(isset($_POST['act']) && $_POST['act']=='ItOk')
{ $sqlI=mysql_query("update hrm_employee_separation_nocit set ItSS_Amt=".$_POST['ss'].", ItCHS_Amt=".$_POST['chs'].", ItLDH_Amt=".$_POST['ldh'].", ItCS_Amt=".$_POST['cs'].", ItDC_Amt=".$_POST['dc'].", ItEAB_Amt=".$_POST['eab'].", ItMND_Amt=".$_POST['mnd'].", ItAO_Amt8=".$_POST['a8'].", ItAO_Amt9=".$_POST['a9'].", ItAO_Amt10=".$_POST['a10'].", ItAO_Amt11=".$_POST['a11'].", ItAO_Amt12=".$_POST['a12'].", ItAO_Amt13=".$_POST['a13'].", ItAO_Amt14=".$_POST['a14'].", ItAO_Amt15=".$_POST['a15'].", TotItAmt=".$_POST['totamt']." where EmpSepId=".$_POST['si'], $con); 
 $sqlI2=mysql_query("update hrm_employee_separation set Acc_ItNOC='Y', IT_Deduct=".$_POST['totamt']." where EmpSepId=".$_POST['si'], $con); 
 if($sqlI2){echo 'Clearance ok';}
}

if($_POST['SubITRes'])
{ $search =  '!"#$%/\'-:_' ; $search = str_split($search);
  $ReaIT1=str_replace($search, "", $_POST['ReaIT1']); $ReaIT2=str_replace($search, "", $_POST['ReaIT2']);
  $ReasonIT=$ReaIT1.' '.$ReaIT2;
  $sqlI=mysql_query("update hrm_employee_separation set HR_ItNocConf='N', Acc_ItNOC='R', Acc_ItReason='".$ReasonIT."' where EmpSepId=".$_POST['si'], $con); 
  if($sqlI)
  { 
	//$email_to2 = 'vspl.hr@vnrseeds.com';
   // $email_from = 'admin@vnrseeds.co.in';
    $email_subject2 = "Resent IT NOC clearance form";
	//$email_txt2 = "Resent IT NOC clearance form";
	//$headers = "From: ".$email_from."\r\n"; 
	//$semi_rand = md5(time()); 
	//$headers .= "MIME-Version: 1.0\r\n";
	//$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
	$email_message2 .="Finance has resent the IT clearance form of ".$_POST['Ename']." due to <b>".$ReasonIT."</b>. Log on to ESS for further details and corrections <a href='https://www.vnrseeds.co.in'>www.vnrseeds.co.in</a>. \n\n";
	//$ok = @mail($email_to2, $email_subject2, $email_message2, $headers);
	
$subject=$email_subject2;
$body=$email_message2;
$email_to='vspl.hr@vnrseeds.com';
require 'vendor/mail_admin.php';	
	
    echo '<script>alert("Clearance form resent successfully"); window.close();</script>'; 
  }
}



//************** Admin ******************/
if(isset($_POST['act']) && $_POST['act']=='AdminOk')
{ $sqlA=mysql_query("update hrm_employee_separation_nocadmin set AdminIC_Amt=".$_POST['AdminIC'].", AdminVC_Amt=".$_POST['AdminVC'].", AdminAO_Amt3=".$_POST['a3'].", AdminAO_Amt4=".$_POST['a4'].", AdminAO_Amt5=".$_POST['a5'].", AdminAO_Amt6=".$_POST['a6'].", AdminAO_Amt7=".$_POST['a7'].", AdminAO_Amt8=".$_POST['a8'].", AdminAO_Amt9=".$_POST['a9'].", AdminAO_Amt10=".$_POST['a10'].", TotAdminAmt=".$_POST['totamt']." where EmpSepId=".$_POST['si'], $con); 
  $sqlA2=mysql_query("update hrm_employee_separation set Acc_AdminNOC='Y', Admin_Deduct=".$_POST['totamt']." where EmpSepId=".$_POST['si'], $con);
  if($sqlA2){echo 'Clearance ok';}
}

if($_POST['SubAdminRes'])
{ $search =  '!"#$%/\'-:_' ; $search = str_split($search);
  $ReaAdmin1=str_replace($search, "", $_POST['ReaAdmin1']); $ReaAdmin2=str_replace($search, "", $_POST['ReaAdmin2']);
  $ReasonAdmin=$ReaAdmin1.' '.$ReaAdmin2;
  $sqlA=mysql_query("update hrm_employee_separation set Admin_NOC='N', Acc_AdminNOC='R', Acc_AdminReason='".$ReasonAdmin."' where EmpSepId=".$_POST['si'], $con); 
  if($sqlA)
  { /*
    $sqlAdmin=mysql_query("select Fname,Sname,Lname,EmailId_Vnr from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_separation_nocadmin ON hrm_employee_general.EmployeeID=hrm_employee_separation_nocadmin.AdminId where hrm_employee_separation_nocit.EmpSepId=".$_POST['si'], $con); 
	$resAdmin=mysql_fetch_assoc($sqlAdmin); $EnameAdmin=$resAdmin['Fname'].' '.$resAdmin['Sname'].' '.$resAdmin['Lname'];
	if($resAdmin['EmailId_Vnr'])
	{
	$email_to3 = $resAdmin['EmailId_Vnr'];
    $email_from = 'admin@vnrseeds.co.in';
    $email_subject3 = "Resent admin NOC clearance form";
	$email_txt3 = "Resent admin NOC clearance form";
	$headers = "From: ".$email_from."\r\n";
	$semi_rand = md5(time()); 
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
	$email_message3 .="Department of Account has send it back to employee-".$_POST['Ename']." clearance form for reason : <b>".$ReasonAdmin."</b>, please check it. for details kindly log on to ESS <a href='https://www.vnrseeds.co.in'>www.vnrseeds.co.in</a>. \n\n";
	//$ok = @mail($email_to3, $email_subject3, $email_message3, $headers);
	}
    echo '<script>alert("Clearance form resent successfully"); window.close();</script>'; 
	
	*/
  }
}



//************** Reporting ******************/
if(isset($_POST['act']) && $_POST['act']=='RepOk')
{ $sqlR=mysql_query("update hrm_employee_separation_nocrep set DDH_Amt=".$_POST['ddh'].", TID_Amt=".$_POST['tid'].", APTC_Amt=".$_POST['aptc'].", HOAS_Amt=".$_POST['hoas'].", Prtis_1Amt=".$_POST['a1'].", Prtis_2Amt=".$_POST['a2'].", Prtis_3Amt=".$_POST['a3'].", Prtis_4Amt=".$_POST['a4'].", Prtis_5Amt=".$_POST['a5'].", Prtis_6Amt=".$_POST['a6'].", Prtis_7Amt=".$_POST['a7'].",Prtis_8Amt=".$_POST['a8'].", Prtis_9Amt=".$_POST['a9'].", Prtis_10Amt=".$_POST['a10'].", TotRepAmt=".$_POST['totamt']." where EmpSepId=".$_POST['si'], $con);
  $sqlR2=mysql_query("update hrm_employee_separation set Acc_RepNOC='Y', Rep_Deduct=".$_POST['totamt']." where EmpSepId=".$_POST['si'], $con);  
  if($sqlR2){echo 'Clearance ok';}
}

if($_POST['SubRepRes'])
{ $search =  '!"#$%/\'-:_' ; $search = str_split($search);
  $ReaRep1=str_replace($search, "", $_POST['ReaRep1']); $ReaRep2=str_replace($search, "", $_POST['ReaRep2']);
  $ReasonRep=$ReaRep1.' '.$ReaRep2;
  $sqlR=mysql_query("update hrm_employee_separation set HR_RepMgrNocConf ='N', Log_NOC='N', Acc_RepNOC='R', Acc_RepReason='".$ReasonRep."' where EmpSepId=".$_POST['si'], $con); 
  if($sqlR)
  { 
	//$email_to4 = 'vspl.hr@vnrseeds.com';
    //$email_from = 'admin@vnrseeds.co.in';
    $email_subject4 = "Resent departmental NOC clearance form";
	//$email_txt4 = "Resent departmental NOC clearance form";
	//$headers = "From: ".$email_from."\r\n";
	//$semi_rand = md5(time()); 
	//$headers .= "MIME-Version: 1.0\r\n";
	//$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
	$email_message4 .="Finance has resent the reporting manager clearance form of ".$_POST['Ename']." due to <b>".$ReasonRep."</b>. Log on to ESS for further details and corrections <a href='https://www.vnrseeds.co.in'>www.vnrseeds.co.in</a>. \n\n";
	//$ok = @mail($email_to4, $email_subject4, $email_message4, $headers);
	
$subject=$email_subject4;
$body=$email_message4;
$email_to='vspl.hr@vnrseeds.com';
require 'vendor/mail_admin.php';

    echo '<script>alert("Clearance form resent successfully"); window.close();</script>'; 
  }
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>ESS</title>
</head>
<body>
<center>
<?php $sqlSE=mysql_query("select * from hrm_employee_separation where EmpSepId=".$_REQUEST['si'], $con); $resSE=mysql_fetch_assoc($sqlSE);
$sqlE=mysql_query("select EmpCode,Fname,Sname,Lname,DesigId,DepartmentId,DR,Gender,Married from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee.EmployeeID=".$resSE['EmployeeID'], $con); $resE=mysql_fetch_assoc($sqlE); 
$sqlDept=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$resE['DepartmentId'], $con); $resDept=mysql_fetch_assoc($sqlDept);
if($resE['DR']=='Y'){$M='Dr.';} elseif($resE['Gender']=='M'){$M='Mr.';} elseif($resE['Gender']=='F' AND $resE['Married']=='Y'){$M='Mrs.';} elseif($resE['Gender']=='F' AND $resE['Married']=='N'){$M='Miss.';}  $NameE=$M.' '.$resE['Fname'].' '.$resE['Sname'].' '.$resE['Lname']; 

?>	
<table border="0" style="width:380px;">
<?php if($_REQUEST['act']=='HrResend'){ ?>
<tr><td align="center"><b>Type reason for send it back to HR</b></td></tr>
<form name="formname" method="post" onSubmit="return validate(this)"><input type="hidden" name="si" value="<?php echo $_REQUEST['si']; ?>" />
<tr><td style="width:380px;" align="center"><input type="text" id="ReaHR1" name="ReaHR1" style="width:370px;" maxlength="100"/></td></tr>
<tr><td style="width:380px;" align="center"><input type="text" id="ReaHR2" name="ReaHR2" style="width:370px;" maxlength="100"/>
<input type="hidden" name="Ename" id="Ename" value="<?php echo $NameE; ?>" /></td></tr>
<tr><td style="width:380px;" align="right"><input type="submit" id="SubHRRes" name="SubHRRes" style="width:60px;" value="save"/></td></tr>
</form>
<?php } if($_REQUEST['act']=='ItResend'){ ?>
<tr><td align="center"><b>Type reason for send it back to IT</b></td></tr>
<form name="formname" method="post" onSubmit="return validate(this)"><input type="hidden" name="si" value="<?php echo $_REQUEST['si']; ?>" />
<tr><td style="width:380px;" align="center"><input type="text" id="ReaIT1" name="ReaIT1" style="width:370px;" maxlength="100"/></td></tr>
<tr><td style="width:380px;" align="center"><input type="text" id="ReaIT2" name="ReaIT2" style="width:370px;" maxlength="100"/>
<input type="hidden" name="Ename" id="Ename" value="<?php echo $NameE; ?>" /></td></tr>
<tr><td style="width:380px;" align="right"><input type="submit" id="SubITRes" name="SubITRes" style="width:60px;" value="save"/></td></tr>
</form>
<?php } if($_REQUEST['act']=='AdminResend'){ ?>
<tr><td align="center"><b>Type reason for send it back to Admin</b></td></tr>
<form name="formname" method="post" onSubmit="return validate(this)"><input type="hidden" name="si" value="<?php echo $_REQUEST['si']; ?>" />
<tr><td style="width:380px;" align="center"><input type="text" id="ReaAdmin1" name="ReaAdmin1" style="width:370px;" maxlength="100"/></td></tr>
<tr><td style="width:380px;" align="center"><input type="text" id="ReaAdmin2" name="ReaAdmin2" style="width:370px;" maxlength="100"/>
<input type="hidden" name="Ename" id="Ename" value="<?php echo $NameE; ?>" /></td></tr>
<tr><td style="width:380px;" align="right"><input type="submit" id="SubAdminRes" name="SubAdminRes" style="width:60px;" value="save"/></td></tr>
</form>
<?php } if($_REQUEST['act']=='RepResend'){ ?>
<tr><td align="center"><b>Type reason for send it back to Reporting</b></td></tr>
<form name="formname" method="post" onSubmit="return validate(this)"><input type="hidden" name="si" value="<?php echo $_REQUEST['si']; ?>" />
<tr><td style="width:380px;" align="center"><input type="text" id="ReaRep1" name="ReaRep1" style="width:370px;" maxlength="100"/></td></tr>
<tr><td style="width:380px;" align="center"><input type="text" id="ReaRep2" name="ReaRep2" style="width:370px;" maxlength="100"/>
<input type="hidden" name="Ename" id="Ename" value="<?php echo $NameE; ?>" /></td></tr>
<tr><td style="width:380px;" align="right"><input type="submit" id="SubRepRes" name="SubRepRes" style="width:60px;" value="save"/></td></tr>
</form>
<?php } ?>
</table>
</center>
</body>
</html>