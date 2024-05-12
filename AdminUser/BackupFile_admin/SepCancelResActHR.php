<?php require_once('../AdminUser/config/config.php'); 
if($_POST['SentCanRes'])
{
  $sqlU=mysql_query("update hrm_employee_separation set HR_CancelResig='".$_POST['SepValue']."', HR_CanRemark='".$_POST['HRCanRemark']."', HR_SaveCanDate='".date("Y-m-d")."' where EmpSepId=".$_POST['SepId'], $con);
  
  if($sqlU)
  {
   $sqlEmp=mysql_query("select Fname,Sname,Lname,EmailId_Vnr from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee_general.EmployeeID=".$_POST['EmpId'], $con); $resEmp=mysql_fetch_assoc($sqlEmp); $Ename=$resEmp['Fname'].' '.$resEmp['Sname'].' '.$resEmp['Lname'];
   $sqlRep=mysql_query("select Fname,Sname,Lname,EmailId_Vnr from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee_general.EmployeeID=".$_POST['RepId'], $con); $resRep=mysql_fetch_assoc($sqlRep); $Aname=$resRep['Fname'].' '.$resRep['Sname'].' '.$resRep['Lname'];
   $sqlHod=mysql_query("select Fname,Sname,Lname,EmailId_Vnr from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee_general.EmployeeID=".$_POST['HodId'], $con); $resHod=mysql_fetch_assoc($sqlHod); $Hname=$resHod['Fname'].' '.$resHod['Sname'].' '.$resHod['Lname'];
   
   if($_POST['SepValue']=='Y'){$action='accepted';}elseif($_POST['SepValue']=='C'){$action='rejected';}
   
/************************************************ Employee ***********************************************/   
if($resEmp['EmailId_Vnr']!='')
{
$email_to7 = $resEmp['EmailId_Vnr'];
$email_from = 'admin@vnrseeds.co.in';
$email_subject = "Cancel Resignation Application ".$action;
$email_txt = "Cancel Resignation Application ".$action;
$headers = "From: ".$email_from."\r\n"; 
$semi_rand = md5(time()); 
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n"; 
$email_message7 .="Your cancel resignation application is ".$action." by HR, for details kindly log on to ESS <a href='https://www.vnrseeds.co.in'>www.vnrseeds.co.in</a>. \n\n";
$email_message7 .="Thanks & Regards\n";
$email_message7 .="HR\n\n";
$ok = @mail($email_to7, $email_subject, $email_message7, $headers);
}   
   

/************************************************ App ***********************************************/ 
if($resRep['EmailId_Vnr']!='')
{
$email_to2 = $resRep['EmailId_Vnr'];
$email_from = 'admin@vnrseeds.co.in';
$email_subject2 = "Cancel Resignation Application ".$action;
$email_txt = "Cancel Resignation Application ".$action;
$headers = "From: ".$email_from."\r\n"; 
$semi_rand = md5(time()); 
$headers2.= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
$email_message2 .="The cancel resignation of ".$Ename." has been ".$action." by HR. For details kindly log on to ESS <a href='https://www.vnrseeds.co.in'>www.vnrseeds.co.in</a>. \n\n";
$email_message2 .="Thanks & Regards\n";
$email_message2 .="HR\n\n";
$ok = @mail($email_to2, $email_subject2, $email_message2, $headers);
}    

/************************************************ HR ***********************************************/ 
$email_to3 = 'vspl.hr@vnrseeds.com';
$email_from = 'admin@vnrseeds.co.in';
$email_subject3 = "Cancel Resignation Application ".$action;
$email_txt = "Cancel Resignation Application ".$action;
$headers = "From: ".$email_from."\r\n"; 
$semi_rand = md5(time()); 
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n"; 
$email_message3 .="The cancel resignation of ".$Ename." has been ".$action.". For details kindly log on to ESS <a href='https://www.vnrseeds.co.in'>www.vnrseeds.co.in</a>. \n\n";
$email_message3 .="Thanks & Regards\n";
$email_message3 .="HR\n\n";
$ok = @mail($email_to3, $email_subject3, $email_message3, $headers);

  if($_POST['SepValue']=='Y'){echo '<script>alert("Cancel resignation request accepted successfully"); window.close();</script>'; }
  elseif($_POST['SepValue']=='C'){echo '<script>alert("Cancel resignation request rejected successfully"); window.close();</script>';} 
  }
  
}

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Action for Resignation</title>
<link rel="stylesheet" type="text/css" href="src/css/jscal2.css"/>
<link rel="stylesheet" type="text/css" href="src/css/border-radius.css"/>
<link rel="stylesheet" type="text/css" href="src/css/steel/steel.css"/>
<script type="text/javascript" src="src/js/jscal2.js"></script>
<script type="text/javascript" src="src/js/lang/en.js"></script>
<style> .InputText {font-family:Geneva, Arial, Helvetica, sans-serif;font-size:13px;width:80px;background-color:#FFFFD9;}
.InputText2 {font-family:Geneva, Arial, Helvetica, sans-serif;font-size:13px;width:80px;background-color:#E1FFE1;border-style:groove;}
.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}
.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;}</style>
<script language="javascript" type="text/javascript">
function validate(formname)
{ 
  var HRRemark = formname.HRCanRemark.value; var SepValue = formname.SepValue.value;  
  if(HRRemark.length === 0){ alert("Please type remark.");  return false; }
  if(SepValue=='Y'){$sep='Accept';}else if(SepValue=='C'){$sep='Reject';}
  var agree=confirm("Are you sure you want to "+$sep+" cancel resignation?");
  if(agree){ return true; } else{ return false; } 
  
}
</script>
</head>
<body bgcolor="#E0DBE3">
<center>
<table border="0" style="width:590px;">
<tr>
   <td style="width:590px;" valign="top" align="center">
<?php if($_REQUEST['act']!='' AND $_REQUEST['act']=='acthr')  { ?>	
<?php $sqlSE=mysql_query("select * from hrm_employee_separation where EmpSepId=".$_REQUEST['i'], $con); $resSE=mysql_fetch_assoc($sqlSE);
$sqlE=mysql_query("select EmpCode,Fname,Sname,Lname,DesigId,DepartmentId,DR,Gender,Married from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee.EmployeeID=".$resSE['EmployeeID'], $con); $resE=mysql_fetch_assoc($sqlE); 
$sqlDept=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$resE['DepartmentId'], $con); $resDept=mysql_fetch_assoc($sqlDept);
if($resE['DR']=='Y'){$M='Dr.';} elseif($resE['Gender']=='M'){$M='Mr.';} elseif($resE['Gender']=='F' AND $resE['Married']=='Y'){$M='Mrs.';} elseif($resE['Gender']=='F' AND $resE['Married']=='N'){$M='Miss.';}  $NameE=$M.' '.$resE['Fname'].' '.$resE['Sname'].' '.$resE['Lname']; 
?>	
<form enctype="multipart/form-data" name="formname" method="post"  onSubmit="return validate(this)">
<input type="hidden" name="SepId" id="SepId" value="<?php echo $_REQUEST['i']; ?>" />  
<input type="hidden" name="SepValue" id="SepValue" value="<?php if($_REQUEST['v']=='A'){echo 'Y';}elseif($_REQUEST['v']=='C'){echo 'C';} ?>" />
<input type="hidden" name="SepAct" id="SepAct" value="<?php echo $_REQUEST['act']; ?>" />  
<input type="hidden" name="EmpId" id="EmpId" value="<?php echo $resSE['EmployeeID']; ?>" />  
<input type="hidden" name="RepId" id="RepId" value="<?php echo $resSE['Rep_EmployeeID']; ?>" /> 
<input type="hidden" name="HodId" id="HodId" value="<?php echo $resSE['Hod_EmployeeID']; ?>" />  
<input type="hidden" name="UId" id="UId" value="<?php echo $_REQUEST['UI']; ?>" />  
<table border="0">
<tr>
  <td colspan="5" style="font-family:Geneva, Arial, Helvetica, sans-serif;color:#400000;font-size:16px;width:590px;" align="center">
  <b><?php if($_REQUEST['v']=='A'){echo 'CANCEL RESIGNATION ACCEPT';}elseif($_REQUEST['v']=='C'){echo 'CANCEL RESIGNATION REJECT';} ?></b>
  </td> 
</tr>
<tr>
 <td>
  <table style="width:580px;" border="1">
   <tr bgcolor="#FFFFFF">
    <td style="font-family:Geneva, Arial, Helvetica, sans-serif;font-size:12px;width:80px;">&nbsp;<b>EmpCode</b></td>
	<td align="" style="font-family:Geneva, Arial, Helvetica, sans-serif;font-size:13px;width:100px;">&nbsp;<?php echo $resE['EmpCode']; ?></td>
	<td style="font-family:Geneva, Arial, Helvetica, sans-serif;font-size:12px;width:150px;">&nbsp;<b>Name</b></td>
	<td style="font-family:Geneva, Arial, Helvetica, sans-serif;font-size:13px;width:250px;">&nbsp;<?php echo $NameE; ?></td>
   </tr>
   <tr bgcolor="#FFFFFF">
    <td style="font-family:Geneva, Arial, Helvetica, sans-serif;font-size:12px;width:80px;">&nbsp;<b>Department</b></td>
	<td align="" style="font-family:Geneva, Arial, Helvetica, sans-serif;font-size:13px;width:100px;">&nbsp;<?php echo $resDept['DepartmentCode']; ?></td>
	<td colspan="2" style="font-family:Geneva, Arial, Helvetica, sans-serif;font-size:12px;width:150px;">&nbsp;<b></b></td>
   </tr>
   <tr>
    <td colspan="4">
    <table>
	  <tr bgcolor="#FFFFFF">
      <td valign="top" style="font-family:Geneva, Arial, Helvetica, sans-serif;font-size:12px;width:200px;">&nbsp;<b>HR Remark For cancellation <?php if($_REQUEST['v']=='A'){echo 'Accept';}elseif($_REQUEST['v']=='C'){echo 'Reject';} ?></b></b></td>
	  <td valign="top" colspan="3" style="font-family:Geneva, Arial, Helvetica, sans-serif;font-size:13px;"><textarea name="HRCanRemark" id="HRCanRemark" cols="43" rows="4" style="background-color:#E1FFE1;border-style:groove;"><?php echo $resSE['HR_CanRemark']; ?></textarea></td>
     </tr>
	</table>
	</td>
   </tr>
	</table>
	</td>
   </tr>
   <tr bgcolor="#FFFFFF">
        <td colspan="4" align="Right" class="fontButton">
         <table><tr>
	      <td><input type="submit" id="SentCanRes" name="SentCanRes" value="submit" style="display:block;"/></td>
		  <td><input type="button" name="Refrash" value="refresh" onClick="javascript:window.location='SepCancelResActHR.php?act=<?php echo $_REQUEST['act']; ?>&v=<?php echo $_REQUEST['v']; ?>&ss=vty&cc=it@~t~1212&p=value&a=app&true=false&i=<?php echo $_REQUEST['i']; ?>&cc=it@~t~1111!@1~ere&UI=<?php echo $_REQUEST['UI']; ?>'"/></td>
		  
	     
	     </tr></table>
        </td>
      </tr> 
  </table>
 </td>
</tr>

</table>
</form>
<?php } ?>	  
     </td>
</tr>
</table>
</center>
</body>
</html>
