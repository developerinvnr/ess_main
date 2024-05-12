<?php require_once('../AdminUser/config/config.php'); 
if(isset($_POST['ReplyQuery']))
{
 if($_POST['RepQ_Value']=='R')
 { if($_POST['NOfT']==1)
   { $sqlUpRep=mysql_query("update hrm_employee_queryemp set QueryReply='".$_POST['ReplyQText']."', QReplyDT='".date("Y-m-d h:i:s")."', QStatus=2, Level_3QStatus=2, Level_3ReplyAns='".$_POST['ReplyQText']."', Level_3DTReplyAns='".date("Y-m-d h:i:s")."' where QueryId=".$_POST['RepQ_ID'], $con); }
   if($_POST['NOfT']==2)
   { $sqlUpRep=mysql_query("update hrm_employee_queryemp set Query2Reply='".$_POST['ReplyQText']."', QReply2DT='".date("Y-m-d h:i:s")."', QStatus=2, Level_3QStatus=2, Level_3ReplyAns='".$_POST['ReplyQText']."', Level_3DTReplyAns='".date("Y-m-d h:i:s")."' where QueryId=".$_POST['RepQ_ID'], $con); }
   if($_POST['NOfT']==3)
   { $sqlUpRep=mysql_query("update hrm_employee_queryemp set Query3Reply='".$_POST['ReplyQText']."', QReply3DT='".date("Y-m-d h:i:s")."', QStatus=2, Level_3QStatus=2, Level_3ReplyAns='".$_POST['ReplyQText']."', Level_3DTReplyAns='".date("Y-m-d h:i:s")."' where QueryId=".$_POST['RepQ_ID'], $con); }
   if($_POST['NOfT']==4)
   { $sqlUpRep=mysql_query("update hrm_employee_queryemp set Query4Reply='".$_POST['ReplyQText']."', QReply4DT='".date("Y-m-d h:i:s")."', QStatus=2, Level_3QStatus=2, Level_3ReplyAns='".$_POST['ReplyQText']."', Level_3DTReplyAns='".date("Y-m-d h:i:s")."' where QueryId=".$_POST['RepQ_ID'], $con); }
   if($_POST['NOfT']==5)
   { $sqlUpRep=mysql_query("update hrm_employee_queryemp set Query5Reply='".$_POST['ReplyQText']."', QReply5DT='".date("Y-m-d h:i:s")."', QStatus=2, Level_3QStatus=2, Level_3ReplyAns='".$_POST['ReplyQText']."', Level_3DTReplyAns='".date("Y-m-d h:i:s")."' where QueryId=".$_POST['RepQ_ID'], $con); }
   if($sqlUpRep){echo '<script>alert("Message sent successfully, please close the query."); window.close(); </script>';}
 }
 
 if($_POST['RepQ_Value']=='U')
 { if($_POST['NOfT']==1)
   { $sqlUpRep=mysql_query("update hrm_employee_queryemp set QueryReply='".$_POST['ReplyQText']."', QReplyDT='".date("Y-m-d h:i:s")."', QStatus=2, Level_3QStatus=2, Level_3ReplyAns='".$_POST['ReplyQText']."', Level_3DTReplyAns='".date("Y-m-d h:i:s")."' where QueryId=".$_POST['RepQ_ID'], $con); }
   if($_POST['NOfT']==2)
   { $sqlUpRep=mysql_query("update hrm_employee_queryemp set Query2Reply='".$_POST['ReplyQText']."', QReply2DT='".date("Y-m-d h:i:s")."', QStatus=2, Level_3QStatus=2, Level_3ReplyAns='".$_POST['ReplyQText']."', Level_3DTReplyAns='".date("Y-m-d h:i:s")."' where QueryId=".$_POST['RepQ_ID'], $con); }
   if($_POST['NOfT']==3)
   { $sqlUpRep=mysql_query("update hrm_employee_queryemp set Query3Reply='".$_POST['ReplyQText']."', QReply3DT='".date("Y-m-d h:i:s")."', QStatus=2, Level_3QStatus=2, Level_3ReplyAns='".$_POST['ReplyQText']."', Level_3DTReplyAns='".date("Y-m-d h:i:s")."' where QueryId=".$_POST['RepQ_ID'], $con); }
   if($_POST['NOfT']==4)
   { $sqlUpRep=mysql_query("update hrm_employee_queryemp set Query4Reply='".$_POST['ReplyQText']."', QReply4DT='".date("Y-m-d h:i:s")."', QStatus=2, Level_3QStatus=2, Level_3ReplyAns='".$_POST['ReplyQText']."', Level_3DTReplyAns='".date("Y-m-d h:i:s")."' where QueryId=".$_POST['RepQ_ID'], $con); }
   if($_POST['NOfT']==5)
   { $sqlUpRep=mysql_query("update hrm_employee_queryemp set Query5Reply='".$_POST['ReplyQText']."', QReply5DT='".date("Y-m-d h:i:s")."', QStatus=2, Level_3QStatus=2, Level_3ReplyAns='".$_POST['ReplyQText']."', Level_3DTReplyAns='".date("Y-m-d h:i:s")."' where QueryId=".$_POST['RepQ_ID'], $con); }
   if($sqlUpRep){echo '<script>alert("Message updated successfully, please close the query."); window.close(); </script>';}
 }
 
 
 
 if($_POST['RepQ_Value']=='P')
 { if($_POST['NOfT']==1)
   {$sqlUpRep=mysql_query("update hrm_employee_queryemp set QueryReply='".$_POST['ReplyQText']."', QReplyDT='".date("Y-m-d h:i:s")."', QStatus=1, Level_3QStatus=1, Level_3ReplyAns='".$_POST['ReplyQText']."', Level_3DTReplyAns='".date("Y-m-d h:i:s")."' where QueryId=".$_POST['RepQ_ID'], $con); }
   if($_POST['NOfT']==2)
   {$sqlUpRep=mysql_query("update hrm_employee_queryemp set Query2Reply='".$_POST['ReplyQText']."', QReply2DT='".date("Y-m-d h:i:s")."', QStatus=1, Level_3QStatus=1, Level_3ReplyAns='".$_POST['ReplyQText']."', Level_3DTReplyAns='".date("Y-m-d h:i:s")."' where QueryId=".$_POST['RepQ_ID'], $con); }
   if($_POST['NOfT']==3)
   {$sqlUpRep=mysql_query("update hrm_employee_queryemp set Query3Reply='".$_POST['ReplyQText']."', QReply3DT='".date("Y-m-d h:i:s")."', QStatus=1, Level_3QStatus=1, Level_3ReplyAns='".$_POST['ReplyQText']."', Level_3DTReplyAns='".date("Y-m-d h:i:s")."' where QueryId=".$_POST['RepQ_ID'], $con); }
   if($_POST['NOfT']==4)
   {$sqlUpRep=mysql_query("update hrm_employee_queryemp set Query4Reply='".$_POST['ReplyQText']."', QReply4DT='".date("Y-m-d h:i:s")."', QStatus=1, Level_3QStatus=1, Level_3ReplyAns='".$_POST['ReplyQText']."', Level_3DTReplyAns='".date("Y-m-d h:i:s")."' where QueryId=".$_POST['RepQ_ID'], $con); }
   if($_POST['NOfT']==5)
   {$sqlUpRep=mysql_query("update hrm_employee_queryemp set Query5Reply='".$_POST['ReplyQText']."', QReply5DT='".date("Y-m-d h:i:s")."', QStatus=1, Level_3QStatus=1, Level_3ReplyAns='".$_POST['ReplyQText']."', Level_3DTReplyAns='".date("Y-m-d h:i:s")."' where QueryId=".$_POST['RepQ_ID'], $con); }
   if($sqlUpRep){echo '<script>alert("Message sent successfully..!"); window.close(); </script>';}
 }
}

if(isset($_POST['ReplyQuery2']))
{
  $sqlR=mysql_query("select Level_3ID,Level_3QFwdNoOfTime from hrm_employee_queryemp where QueryId=".$_POST['RepQ_ID'], $con); $resR=mysql_fetch_assoc($sqlR);
  if($_POST['ReaForward']==1){$Res=$_POST['Reason_1'];}elseif($_POST['ReaForward']==3){$Res=$_POST['OtherReason'];}
  
  $sqlActE=mysql_query("select Fname,Sname,Lname,Gender,DR,Married,EmailId_Vnr from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee_general.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee_general.EmployeeID=".$_POST['ActionEmp'], $con); $resActE=mysql_fetch_assoc($sqlActE); 
  if($resActE['DR']=='Y'){$M2='Dr.';} elseif($resActE['Gender']=='M'){$M2='Mr.';} elseif($resActE['Gender']=='F' AND $resActE['Married']=='Y'){$M2='Mrs.';} elseif($resActE['Gender']=='F' AND $resActE['Married']=='N'){$M2='Miss.';}  $ActEName=$M2.' '.$resActE['Fname'].' '.$resActE['Sname'].' '.$resActE['Lname'];
  
  if($resR['Level_3QFwdNoOfTime']==0 AND $_POST['RepQ_Value']=='F')
  {$sqlUp=mysql_query("update hrm_employee_queryemp set QStatus=1, Level_3ID=".$_POST['ActionEmp'].", Level_3QFwd='Y', Level_3QFwdNoOfTime=1, Level_3QFwdEmpId=".$resR['Level_3ID'].", Level_3QFwdReason='".$Res."', Level_3QFwdDT='".date("Y-m-d h:i:s")."', Level_3QStatus=1 where QueryId=".$_POST['RepQ_ID'], $con); }
  elseif($resR['Level_3QFwdNoOfTime']==1 AND $_POST['RepQ_Value']=='F')
  {$sqlUp=mysql_query("update hrm_employee_queryemp set QStatus=1, Level_3ID=".$_POST['ActionEmp'].", Level_3QFwd='Y', Level_3QFwdNoOfTime=2, Level_3QFwdEmpId2=".$resR['Level_3ID'].", Level_3QFwdReason2='".$Res."', Level_3QFwdDT2='".date("Y-m-d h:i:s")."', Level_3QStatus=1 where QueryId=".$_POST['RepQ_ID'], $con); }
  elseif($resR['Level_3QFwdNoOfTime']==2 AND $_POST['RepQ_Value']=='F')
  {$sqlUp=mysql_query("update hrm_employee_queryemp set QStatus=1, Level_3ID=".$_POST['ActionEmp'].", Level_3QFwd='Y', Level_3QFwdNoOfTime=3, Level_3QFwdEmpId3=".$resR['Level_3ID'].", Level_3QFwdReason3='".$Res."', Level_3QFwdDT3='".date("Y-m-d h:i:s")."', Level_3QStatus=1 where QueryId=".$_POST['RepQ_ID'], $con); }
  if($sqlUp)
  {
   //Query Forward owner
   if($resActE['EmailId_Vnr']!='')
   {
    $email_toT = $resActE['EmailId_Vnr'];
    $email_fromT='admin@vnrseeds.co.in';
    //if($_POST['EmpMail']==''){$email_fromT = $_POST['EmpName'];} else {$email_fromT=$_POST['EmpMail'];}
	$email_subjectT = "Query Forward";   
	$headersT = "From: " . $email_fromT . "\r\n";
	$semi_rand = md5(time());
	$headersT .= "MIME-Version: 1.0\r\n";
    $headersT .= "Content-type: text/html; charset=ISO-8859-1\r\n";
    $email_messageT .= "Dear <b>".$ActEName."</b> <br><br>\n\n\n";
	$email_messageT .="<html><head></head><body>";
    $email_messageT .= $_POST['EmpName']." has forward a query on Subject-<b>".$_POST['QuerySubject']."</b>, go to <b>ESS-QUERY</b> for more details <a href='https://www.vnrseeds.co.in'>www.vnrseeds.co.in</a>.<br>"; 
	//$email_messageT .= "<b>You</b> need to answer query in 2 working days after which it will get escalated to next level.<br><br>\n\n\n";
	$email_messageT .= "From <br><b>ADMIN ESS</b><br>";
	$email_messageT .="</body></html>";	
    $ok = @mail($email_toT, $email_subjectT, $email_messageT, $headersT);
   }  
   echo '<script>alert("Query forwarded successfully..!"); window.close(); </script>';
  }
} 
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>ESS Reply Query</title>
</head>
<script language="javascript" type="text/javascript">
function validate(ReplyForm)
{ var ReplyValue=document.getElementById("RepQ_Value").value; var TaxAns=document.getElementById("ReplyQText").value;
  if(ReplyValue=='P')
  { if(TaxAns.length == 0){ alert("Please type pending query reason!"); return false;}
    if(TaxAns=='Please type reason for pending!'){alert("Please type pending query reason!"); return false;} else {return true;} }
	
  if(ReplyValue=='R')
  { if(TaxAns.length == 0){ alert("Please type query answer!"); return false;}
    if(TaxAns=='Please type your answer!'){alert("Please type query answer!"); return false;} else {return true;} }	
}

function ClickCheck(v)
{ if(v==1 && document.getElementById("c1").checked==true)
  {document.getElementById("c3").checked=false; document.getElementById("OthReson").style.display='none';}
  else if(v==3 && document.getElementById("c3").checked==true)
  {document.getElementById("c1").checked=false; document.getElementById("OthReson").style.display='block';}
  else
  {document.getElementById("c1").checked=false; document.getElementById("c3").checked==false; 
   document.getElementById("OthReson").style.display='none';}
}


function validate2(ReplyForm2)
{ var ReplyValue=document.getElementById("RepQ_Value").value; var c1=document.getElementById("c1").value; var c3=document.getElementById("c3").value;
  if(ReplyValue=='F')
  { var ActionEmp=document.getElementById("ActionEmp").value;
    if(document.getElementById("c1").checked==false && document.getElementById("c3").checked==false){alert("Please check any one reason!"); return false;}
	if(document.getElementById("c1").checked==true)
	{ if(ActionEmp==0){alert("Please select employee!"); return false;} }
	
    if(document.getElementById("c3").checked==true)
	{ var OtherReason=document.getElementById("OtherReason").value; 
	  if(OtherReason.length == 0){alert("Please type reason!"); return false;}
	  if(ActionEmp==0){alert("Please select employee!"); return false;} else { return true; }}
  }	
}
</script>
<body bgcolor="#D6CDE4">
<center>
<table border="0" width="400">
<?php if($_REQUEST['action']!='F') { ?>
<tr>
   <td width="400" valign="top">
<?php if($_REQUEST['action']!='' AND $_REQUEST['QR']!='')  { ?>	
<?php $sqlQE=mysql_query("select * from hrm_employee_queryemp where QueryId=".$_REQUEST['QR'], $con); $resQE=mysql_fetch_assoc($sqlQE);
$sqlE=mysql_query("select EmpCode,Fname,Sname,Lname,DesigId,DepartmentId,DR,Gender,Married from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee.EmployeeID=".$resQE['EmployeeID'], $con); $resE=mysql_fetch_assoc($sqlE); 
if($resE['DR']=='Y'){$M='Dr.';} elseif($resE['Gender']=='M'){$M='Mr.';} elseif($resE['Gender']=='F' AND $resE['Married']=='Y'){$M='Mrs.';} elseif($resE['Gender']=='F' AND $resE['Married']=='N'){$M='Miss.';}  $NameE=$M.' '.$resE['Fname'].' '.$resE['Sname'].' '.$resE['Lname']; 
?>	
          <form name="ReplyForm" onSubmit="return validate(this.value)" method="post"> 	  
		  <table border="0">
		    <tr><td colspan="2" style="font-family:Times New Roman; color:#004A00; font-size:16px;width:400px;" align="">
			<b>To :<font color="#00509F"><?php if($resQE['HideYesNo']=='N'){ echo $NameE;} else {echo 'Undisclosed';} ?></font></b></td>
			</tr>
			<tr><td colspan="2" style="font-family:Times New Roman; color:#004A00; font-size:16px;width:400px;" align="">
			<b>Subject : </b><font color="#00509F"><?php if($resQE['QuerySubject']=='N'){echo substr_replace($resQE['OtherSubject'], '', 40).' ...';} else{echo substr_replace($resQE['QuerySubject'], '', 40).' ...'; }?></font></td>
			</tr>
			<tr><td colspan="2" style="font-family:Times New Roman; color:#004A00; font-size:16px;width:400px;" align="">
			<b>Query : </b><font color="#00509F"><?php if($_REQUEST['NOfT']==1){echo $resQE['QueryValue'];} elseif($_REQUEST['NOfT']==2){echo $resQE['Query2Value'];} elseif($_REQUEST['NOfT']==3){echo $resQE['Query3Value'];} elseif($_REQUEST['NOfT']==4){echo $resQE['Query4Value'];} elseif($_REQUEST['NOfT']==5){echo $resQE['Query5Value'];}?></font></td>
			</tr>
			<tr><td colspan="2" style="font-family:Times New Roman; color:#004A00; font-size:16px;width:400px;" align="">
			<b><?php if($_REQUEST['action']=='R' OR $_REQUEST['action']=='U'){echo 'Please type your answer!';} if($_REQUEST['action']=='P'){echo 'Please type reason for pending!';} ?></b></td>
			</tr>
			<tr height="20">
				<td colspan="2" align="left" valign="top" width="80" style="font-family:Times New Roman;color:#004993; font-size:16px;">
				<textarea name="ReplyQText" id="ReplyQText" cols="47" rows="8"></textarea>
				<input type="hidden" name="RepQ_ID" value="<?php echo $_REQUEST['QR']; ?>" />
				<input type="hidden" name="RepQ_Value" id="RepQ_Value" value="<?php echo $_REQUEST['action']; ?>" />
				<input type="hidden" name="NOfT" value="<?php echo $_REQUEST['NOfT']; ?>" /></td>
			</tr>
			<tr height="20">
				<td colspan="2" align="Right" class="fontButton">
		          <table border="0" width="400">
			        <tr>
			         <td align="right"><input type="submit" name="ReplyQuery" id="ReplyQuery" style="width:90px;" value="<?php if($_REQUEST['action']=='R' OR $_REQUEST['action']=='P'){echo 'Send';}if($_REQUEST['action']=='U'){echo 'Update';}  ?>"></td>
			         <td align="right" style="width:70px;"><input type="button" name="Refresh" id="Refresh" style="width:90px;" value="Refresh" onClick="javascript:window.location='ReplyQueryHod.php?action=<?php echo $_REQUEST['action']; ?>&QR=<?php echo $_REQUEST['QR']; ?>&NOfT=<?php echo $_REQUEST['NOfT']; ?>'"/></td>
			       </tr>
		        </table>
		      </td>
	      </tr>
	   </table>
	   </form>
<?php } ?>	  
     </td>
</tr>
<?php } else { ?>
<tr>
   <td width="400" valign="top">
<?php if($_REQUEST['action']!='' AND $_REQUEST['QR']!='')  { ?>	
<?php $sqlQE=mysql_query("select hrm_employee_queryemp.*,Fname,Sname,Lname from hrm_employee_queryemp INNER JOIN hrm_employee ON hrm_employee.EmployeeID=hrm_employee_queryemp.EmployeeID where hrm_employee_queryemp.QueryId=".$_REQUEST['QR'], $con); $resQE=mysql_fetch_assoc($sqlQE);

$sqlE=mysql_query("select EmpCode,Fname,Sname,Lname,DesigId,DepartmentId,DR,Gender,Married,EmailId_Vnr from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee.EmployeeID=".$resQE['EmployeeID'], $con); $resE=mysql_fetch_assoc($sqlE); 
if($resE['DR']=='Y'){$M='Dr.';} elseif($resE['Gender']=='M'){$M='Mr.';} elseif($resE['Gender']=='F' AND $resE['Married']=='Y'){$M='Mrs.';} elseif($resE['Gender']=='F' AND $resE['Married']=='N'){$M='Miss.';}  $NameE=$M.' '.$resE['Fname'].' '.$resE['Sname'].' '.$resE['Lname'];

?>	
          <form name="ReplyForm2" onSubmit="return validate2(this.value)" method="post"> 	  
		  <table border="0">
			<tr><td colspan="2" style="font-family:Times New Roman; color:#004A00; font-size:16px;width:400px;" align="">
			<b>Query Subject : </b><font color="#00509F"><?php if($resQE['QuerySubject']=='N'){echo substr_replace($resQE['OtherSubject'], '', 40).' ...';} else{echo substr_replace($resQE['QuerySubject'], '', 40).' ...'; }?></font>
			<input type="hidden" name="EmpName" value="<?php echo $NameE; ?>" />
			<input type="hidden" name="EmpMail" value="<?php echo $resE['EmailId_Vnr']; ?>" />
			<input type="hidden" name="QuerySubject" value="<?php if($resQE['QuerySubject']=='N'){echo $resQE['OtherSubject'];} else{echo $resQE['QuerySubject']; }?>" />
			</td>
			</tr>
			<tr><td colspan="2" style="font-family:Times New Roman; color:#004A00; font-size:16px;width:400px;" align="">
			<b>Query : </b><font color="#00509F"><?php if($_REQUEST['NOfT']==1){echo $resQE['QueryValue'];} elseif($_REQUEST['NOfT']==2){echo $resQE['Query2Value'];} elseif($_REQUEST['NOfT']==3){echo $resQE['Query3Value'];} elseif($_REQUEST['NOfT']==4){echo $resQE['Query4Value'];} elseif($_REQUEST['NOfT']==5){echo $resQE['Query5Value'];}?></font></td>
			</tr>
			<tr><td colspan="2" style="font-family:Times New Roman; color:#004A00; font-size:16px;width:400px;" align="">
			<b>Reason for forward query :</b><br>
			<font color="#00509F">1)</font>&nbsp;Query to be handled by other&nbsp;<input type="checkbox" id="c1" name="ReaForward" value="1" onClick="ClickCheck(this.value)"><br>
			<font color="#00509F">2)</font>&nbsp;Any other reason<input type="checkbox" id="c3" name="ReaForward" value="3" onClick="ClickCheck(this.value)"><br>
			<span id="OthReson" style="display:none;">
			<b style="color:#000000;">Please type reason</b>&nbsp;<input id="OtherReason" name="OtherReason" style="width:242px;font-size:12px;font-family:Times New Roman;" maxlength="100"/></span>
			</td>
			</tr>
			<tr><td colspan="2" style="font-family:Times New Roman; color:#004A00; font-size:16px;width:400px;" align="">
			<b>Employee : </b><font color="#00509F"><select name="ActionEmp" id="ActionEmp" style="padding:1px;font-size:12px;height:21px;font-family:Times New Roman;width:297px;" class="All_200"><option value="0">&nbsp;Select </option>
<?php $sqlDept=mysql_query("select hrm_employee.EmployeeID,EmpCode,Fname,Sname,Lname,DesigName,DR,Gender,Married from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee_general.EmployeeID=hrm_employee_personal.EmployeeID INNER JOIN hrm_designation ON hrm_employee_general.DesigId=hrm_designation.DesigId where hrm_employee.EmpStatus='A' AND hrm_employee_general.DepartmentId=".$resQE['QToDepartmentId']." order by EmpCode ASC", $con); while($resDept=mysql_fetch_assoc($sqlDept)){ 
if($resDept['DR']=='Y'){$M='Dr.';} elseif($resDept['Gender']=='M'){$M='Mr.';} elseif($resDept['Gender']=='F' AND $resDept['Married']=='Y'){$M='Mrs.';} elseif($resDept['Gender']=='F' AND $resDept['Married']=='N'){$M='Miss.';}  $Ename=$M.' '.$resDept['Fname'].' '.$resDept['Sname'].' '.$resDept['Lname'].' (<b>'.$resDept['DesigName'].'</b>)'; ?>	
		  <option value="<?php echo $resDept['EmployeeID']; ?>">&nbsp;<?php echo $Ename; ?></option><?php } ?></select></font></td>
			</tr>
			<tr height="20">
				<td colspan="2" align="left" valign="top" width="80" style="font-family:Times New Roman;color:#004993; font-size:16px;">
				<input type="hidden" name="RepQ_ID" value="<?php echo $_REQUEST['QR']; ?>" />
				<input type="hidden" name="RepQ_Value" id="RepQ_Value" value="<?php echo $_REQUEST['action']; ?>" />
				<input type="hidden" name="NOfT" value="<?php echo $_REQUEST['NOfT']; ?>" />
				<input type="hidden" name="Reason_1" value="Query to be handled by other" />
				<input type="hidden" name="Reason_2" value="Delegated to others as not available" />
				</td>
			</tr>
			<tr height="20">
				<td colspan="2" align="Right" class="fontButton">
		          <table border="0" width="400">
			        <tr>
			         <td align="right"><input type="submit" name="ReplyQuery2" id="ReplyQuery2" style="width:90px;" value="Send"></td>
			         <td align="right" style="width:70px;"><input type="button" name="Refresh" id="Refresh" style="width:90px;" value="Refresh" onClick="javascript:window.location='ReplyQueryHod.php?action=<?php echo $_REQUEST['action']; ?>&QR=<?php echo $_REQUEST['QR']; ?>&NOfT=<?php echo $_REQUEST['NOfT']; ?>'"/></td>
			       </tr>
		        </table>
		      </td>
	      </tr>
	   </table>
	   </form>
<?php } ?>	  
     </td>
</tr>
<?php } ?>
</table>
</center>
</body>
</html>
