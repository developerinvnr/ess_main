<?php require_once("../AdminUser/config/config.php");
if($_POST['SubAccRes'])
{ $search =  '!"#$%/\'-:_' ; $search = str_split($search);
  $ReaAcc1=str_replace($search, "", $_POST['ReaAcc1']); $ReaAcc2=str_replace($search, "", $_POST['ReaAcc2']);
  $ReasonAcc=$ReaAcc1.' '.$ReaAcc2;
  $sqlH=mysql_query("update hrm_employee_separation set Acc_NOC='N', HR_AccNOC='R', HR_AccReason='".$ReasonAcc."' where EmpSepId=".$_POST['si'], $con); 
  if($sqlH)
  {
    $sqlNoc=mysql_query("select EmployeeID from hrm_employee_separation_nocdept_emp where DepartmentId=8 AND Status='A'", $con); $rowNoc=mysql_num_rows($sqlNoc);
    if($rowNoc>0)
    { $resNoc=mysql_fetch_assoc($sqlNoc); 
      $sqlE=mysql_query("select EmailId_Vnr from hrm_employee_general where EmployeeID=".$resNoc['EmployeeID'], $con); $resE=mysql_fetch_assoc($sqlE); 
	  if($resE['EmailId_Vnr']!='')
      {
       $email_to2 = $resE['EmailId_Vnr'];
       $email_from = 'admin@vnrseeds.co.in';
       $email_subject2 = "Resent account NOC clearance form";
       $email_txt = "Resent account NOC clearance form";
       $headers = "From: ".$email_from."\r\n"; 
       $semi_rand = md5(time()); 
       $headers .= "MIME-Version: 1.0\r\n";
       $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
       $email_message2 .="HR has resent the accounts statement of ".$_POST['Ename']." due to <b>".$ReasonHR."</b>. Log on to ESS for further details and corrections <a href='https://www.vnrseeds.co.in'>www.vnrseeds.co.in</a>. \n\n";
	   $email_message2 .="Thanks & Regards\n";
       $email_message2 .="HR\n\n";
       $ok = @mail($email_to2, $email_subject2, $email_message2, $headers);
      }     
    }
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
<?php if($_REQUEST['act']=='AccResend'){ ?>
<tr><td align="center"><b>Type reason for resent NOC form to Acc</b></td></tr>
<form name="formname" method="post" onSubmit="return validate(this)"><input type="hidden" name="si" value="<?php echo $_REQUEST['si']; ?>" />
<tr><td style="width:380px;" align="center"><input type="text" id="ReaAcc1" name="ReaAcc1" style="width:370px;" maxlength="100"/></td></tr>
<tr><td style="width:380px;" align="center"><input type="text" id="ReaAcc2" name="ReaAcc2" style="width:370px;" maxlength="100"/>
<input type="hidden" name="Ename" id="Ename" value="<?php echo $NameE; ?>" /></td></tr>
<tr><td style="width:380px;" align="right"><input type="submit" id="SubAccRes" name="SubAccRes" style="width:60px;" value="save"/></td></tr>
</form>
<?php } ?>
</table>
</center>
</body>
</html>