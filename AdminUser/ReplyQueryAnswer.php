<?php require_once('../AdminUser/config/config.php'); ?>
<?php 
if(isset($_POST['ReplyQuery']))  
{
 if($_POST['UTp']=='A')
 {
   if($_POST['Uaction']=='R')
   { 
    if($_POST['NOfT']==1)
    {$sqlUpRep=mysql_query("update hrm_employee_query set QueryReply='".$_POST['QueryAnswer']."', QueryReplyDateTime='".date("Y-m-d h:i:s")."', QueryStatus_Emp=2, Id_Admin=".$_POST['UId'].", QStatus_Admin=2, ReplyAns_Admin='".$_POST['QueryAnswer']."',DateTimeReplyAns_Admin='".date("Y-m-d h:i:s")."' where QueryId=".$_POST['QId'], $con); }
    if($_POST['NOfT']==2)
    {$sqlUpRep=mysql_query("update hrm_employee_query set Query2Reply='".$_POST['QueryAnswer']."', QueryReplyDateTime='".date("Y-m-d h:i:s")."', QueryStatus_Emp=2, Id_Admin=".$_POST['UId'].", QStatus_Admin=2, ReplyAns_Admin='".$_POST['QueryAnswer']."',DateTimeReplyAns_Admin='".date("Y-m-d h:i:s")."' where QueryId=".$_POST['QId'], $con); }
    if($_POST['NOfT']==3)
    {$sqlUpRep=mysql_query("update hrm_employee_query set Query3Reply='".$_POST['QueryAnswer']."', QueryReplyDateTime='".date("Y-m-d h:i:s")."', QueryStatus_Emp=2, Id_Admin=".$_POST['UId'].", QStatus_Admin=2, ReplyAns_Admin='".$_POST['QueryAnswer']."',DateTimeReplyAns_Admin='".date("Y-m-d h:i:s")."' where QueryId=".$_POST['QId'], $con); }
    if($_POST['NOfT']==4)
    {$sqlUpRep=mysql_query("update hrm_employee_query set Query4Reply='".$_POST['QueryAnswer']."', QueryReplyDateTime='".date("Y-m-d h:i:s")."', QueryStatus_Emp=2, Id_Admin=".$_POST['UId'].", QStatus_Admin=2, ReplyAns_Admin='".$_POST['QueryAnswer']."',DateTimeReplyAns_Admin='".date("Y-m-d h:i:s")."' where QueryId=".$_POST['QId'], $con); }
    if($_POST['NOfT']==5)
    {$sqlUpRep=mysql_query("update hrm_employee_query set Query5Reply='".$_POST['QueryAnswer']."', QueryReplyDateTime='".date("Y-m-d h:i:s")."', QueryStatus_Emp=2, Id_Admin=".$_POST['UId'].", QStatus_Admin=2, ReplyAns_Admin='".$_POST['QueryAnswer']."',DateTimeReplyAns_Admin='".date("Y-m-d h:i:s")."' where QueryId=".$_POST['QId'], $con); }
   }
   
   if($_POST['Uaction']=='P')
   { 
    if($_POST['NOfT']==1)
    {$sqlUpRep=mysql_query("update hrm_employee_query set QueryReply='".$_POST['QueryAnswer']."', QueryReplyDateTime='".date("Y-m-d h:i:s")."', QueryStatus_Emp=1, Id_Admin=".$_POST['UId'].", QStatus_Admin=1, ReplyAns_Admin='".$_POST['QueryAnswer']."',DateTimeReplyAns_Admin='".date("Y-m-d h:i:s")."' where QueryId=".$_POST['QId'], $con); }
	if($_POST['NOfT']==2)
    {$sqlUpRep=mysql_query("update hrm_employee_query set Query2Reply='".$_POST['QueryAnswer']."', QueryReplyDateTime='".date("Y-m-d h:i:s")."', QueryStatus_Emp=1, Id_Admin=".$_POST['UId'].", QStatus_Admin=1, ReplyAns_Admin='".$_POST['QueryAnswer']."',DateTimeReplyAns_Admin='".date("Y-m-d h:i:s")."' where QueryId=".$_POST['QId'], $con); }
    if($_POST['NOfT']==3)
    {$sqlUpRep=mysql_query("update hrm_employee_query set Query3Reply='".$_POST['QueryAnswer']."', QueryReplyDateTime='".date("Y-m-d h:i:s")."', QueryStatus_Emp=1, Id_Admin=".$_POST['UId'].", QStatus_Admin=1, ReplyAns_Admin='".$_POST['QueryAnswer']."',DateTimeReplyAns_Admin='".date("Y-m-d h:i:s")."' where QueryId=".$_POST['QId'], $con); }
	if($_POST['NOfT']==4)
    {$sqlUpRep=mysql_query("update hrm_employee_query set Query4Reply='".$_POST['QueryAnswer']."', QueryReplyDateTime='".date("Y-m-d h:i:s")."', QueryStatus_Emp=1, Id_Admin=".$_POST['UId'].", QStatus_Admin=1, ReplyAns_Admin='".$_POST['QueryAnswer']."',DateTimeReplyAns_Admin='".date("Y-m-d h:i:s")."' where QueryId=".$_POST['QId'], $con); }
	if($_POST['NOfT']==5)
    {$sqlUpRep=mysql_query("update hrm_employee_query set Query5Reply='".$_POST['QueryAnswer']."', QueryReplyDateTime='".date("Y-m-d h:i:s")."', QueryStatus_Emp=1, Id_Admin=".$_POST['UId'].", QStatus_Admin=1, ReplyAns_Admin='".$_POST['QueryAnswer']."',DateTimeReplyAns_Admin='".date("Y-m-d h:i:s")."' where QueryId=".$_POST['QId'], $con); }
   }
   
   if($_POST['Uaction']=='F')
   { 
    if($_POST['NOfT']==1)
    {$sqlUpRep=mysql_query("update hrm_employee_query set QueryReply='".$_POST['QueryAnswer']."', QueryReplyDateTime='".date("Y-m-d h:i:s")."', QueryStatus_Emp=1, Id_Admin=".$_POST['UId'].", QStatus_Admin=3, ReplyAns_Admin='".$_POST['QueryAnswer']."', DateTimeQFwd_Admin='".date("Y-m-d h:i:s")."' where QueryId=".$_POST['QId'], $con); }
	if($_POST['NOfT']==2)
    {$sqlUpRep=mysql_query("update hrm_employee_query set Query2Reply='".$_POST['QueryAnswer']."', QueryReplyDateTime='".date("Y-m-d h:i:s")."', QueryStatus_Emp=1, Id_Admin=".$_POST['UId'].", QStatus_Admin=3, ReplyAns_Admin='".$_POST['QueryAnswer']."', DateTimeQFwd_Admin='".date("Y-m-d h:i:s")."' where QueryId=".$_POST['QId'], $con); }
	if($_POST['NOfT']==3)
    {$sqlUpRep=mysql_query("update hrm_employee_query set Query3Reply='".$_POST['QueryAnswer']."', QueryReplyDateTime='".date("Y-m-d h:i:s")."', QueryStatus_Emp=1, Id_Admin=".$_POST['UId'].", QStatus_Admin=3, ReplyAns_Admin='".$_POST['QueryAnswer']."', DateTimeQFwd_Admin='".date("Y-m-d h:i:s")."' where QueryId=".$_POST['QId'], $con); }
	if($_POST['NOfT']==4)
    {$sqlUpRep=mysql_query("update hrm_employee_query set Query4Reply='".$_POST['QueryAnswer']."', QueryReplyDateTime='".date("Y-m-d h:i:s")."', QueryStatus_Emp=1, Id_Admin=".$_POST['UId'].", QStatus_Admin=3, ReplyAns_Admin='".$_POST['QueryAnswer']."', DateTimeQFwd_Admin='".date("Y-m-d h:i:s")."' where QueryId=".$_POST['QId'], $con); }
	if($_POST['NOfT']==5)
    {$sqlUpRep=mysql_query("update hrm_employee_query set Query5Reply='".$_POST['QueryAnswer']."', QueryReplyDateTime='".date("Y-m-d h:i:s")."', QueryStatus_Emp=1, Id_Admin=".$_POST['UId'].", QStatus_Admin=3, ReplyAns_Admin='".$_POST['QueryAnswer']."', DateTimeQFwd_Admin='".date("Y-m-d h:i:s")."' where QueryId=".$_POST['QId'], $con); }
   } 
 }
 
 if($_POST['UTp']=='S')
 {
  if($_POST['Uaction']=='R')
  { 
   if($_POST['NOfT']==1)
   {$sqlUpRep=mysql_query("update hrm_employee_query set QueryReply='".$_POST['QueryAnswer']."', QueryReplyDateTime='".date("Y-m-d h:i:s")."', QueryStatus_Emp=2, Id_SAdmin=".$_POST['UId'].", QStatus_SAdmin=2, ReplyAns_SAdmin='".$_POST['QueryAnswer']."',DateTimeReplyAns_SAdmin='".date("Y-m-d h:i:s")."' where QueryId=".$_POST['QId'], $con); }
   if($_POST['NOfT']==2)
   {$sqlUpRep=mysql_query("update hrm_employee_query set Query2Reply='".$_POST['QueryAnswer']."', QueryReplyDateTime='".date("Y-m-d h:i:s")."', QueryStatus_Emp=2, Id_SAdmin=".$_POST['UId'].", QStatus_SAdmin=2, ReplyAns_SAdmin='".$_POST['QueryAnswer']."',DateTimeReplyAns_SAdmin='".date("Y-m-d h:i:s")."' where QueryId=".$_POST['QId'], $con); }
   if($_POST['NOfT']==3)
   {$sqlUpRep=mysql_query("update hrm_employee_query set Query3Reply='".$_POST['QueryAnswer']."', QueryReplyDateTime='".date("Y-m-d h:i:s")."', QueryStatus_Emp=2, Id_SAdmin=".$_POST['UId'].", QStatus_SAdmin=2, ReplyAns_SAdmin='".$_POST['QueryAnswer']."',DateTimeReplyAns_SAdmin='".date("Y-m-d h:i:s")."' where QueryId=".$_POST['QId'], $con); }
   if($_POST['NOfT']==4)
   {$sqlUpRep=mysql_query("update hrm_employee_query set Query4Reply='".$_POST['QueryAnswer']."', QueryReplyDateTime='".date("Y-m-d h:i:s")."', QueryStatus_Emp=2, Id_SAdmin=".$_POST['UId'].", QStatus_SAdmin=2, ReplyAns_SAdmin='".$_POST['QueryAnswer']."',DateTimeReplyAns_SAdmin='".date("Y-m-d h:i:s")."' where QueryId=".$_POST['QId'], $con); }
   if($_POST['NOfT']==5)
   {$sqlUpRep=mysql_query("update hrm_employee_query set Query5Reply='".$_POST['QueryAnswer']."', QueryReplyDateTime='".date("Y-m-d h:i:s")."', QueryStatus_Emp=2, Id_SAdmin=".$_POST['UId'].", QStatus_SAdmin=2, ReplyAns_SAdmin='".$_POST['QueryAnswer']."',DateTimeReplyAns_SAdmin='".date("Y-m-d h:i:s")."' where QueryId=".$_POST['QId'], $con); }
  }
  
  if($_POST['Uaction']=='P')
  { 
   if($_POST['NOfT']==1)
   {$sqlUpRep=mysql_query("update hrm_employee_query set QueryReply='".$_POST['QueryAnswer']."', QueryReplyDateTime='".date("Y-m-d h:i:s")."', QueryStatus_Emp=1, Id_SAdmin=".$_POST['UId'].", QStatus_SAdmin=1, ReplyAns_SAdmin='".$_POST['QueryAnswer']."',DateTimeReplyAns_SAdmin='".date("Y-m-d h:i:s")."' where QueryId=".$_POST['QId'], $con); }
   if($_POST['NOfT']==2)
   {$sqlUpRep=mysql_query("update hrm_employee_query set Query2Reply='".$_POST['QueryAnswer']."', QueryReplyDateTime='".date("Y-m-d h:i:s")."', QueryStatus_Emp=1, Id_SAdmin=".$_POST['UId'].", QStatus_SAdmin=1, ReplyAns_SAdmin='".$_POST['QueryAnswer']."',DateTimeReplyAns_SAdmin='".date("Y-m-d h:i:s")."' where QueryId=".$_POST['QId'], $con); }
   if($_POST['NOfT']==3)
   {$sqlUpRep=mysql_query("update hrm_employee_query set Query3Reply='".$_POST['QueryAnswer']."', QueryReplyDateTime='".date("Y-m-d h:i:s")."', QueryStatus_Emp=1, Id_SAdmin=".$_POST['UId'].", QStatus_SAdmin=1, ReplyAns_SAdmin='".$_POST['QueryAnswer']."',DateTimeReplyAns_SAdmin='".date("Y-m-d h:i:s")."' where QueryId=".$_POST['QId'], $con); }
   if($_POST['NOfT']==4)
   {$sqlUpRep=mysql_query("update hrm_employee_query set Query4Reply='".$_POST['QueryAnswer']."', QueryReplyDateTime='".date("Y-m-d h:i:s")."', QueryStatus_Emp=1, Id_SAdmin=".$_POST['UId'].", QStatus_SAdmin=1, ReplyAns_SAdmin='".$_POST['QueryAnswer']."',DateTimeReplyAns_SAdmin='".date("Y-m-d h:i:s")."' where QueryId=".$_POST['QId'], $con); }
   if($_POST['NOfT']==5)
   {$sqlUpRep=mysql_query("update hrm_employee_query set Query5Reply='".$_POST['QueryAnswer']."', QueryReplyDateTime='".date("Y-m-d h:i:s")."', QueryStatus_Emp=1, Id_SAdmin=".$_POST['UId'].", QStatus_SAdmin=1, ReplyAns_SAdmin='".$_POST['QueryAnswer']."',DateTimeReplyAns_SAdmin='".date("Y-m-d h:i:s")."' where QueryId=".$_POST['QId'], $con); }
  }
 }
  if($sqlUpRep){echo '<script>alert("Sent successfully.....!"); window.close();</script>';} 
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
function FormRefresh(){ document.getElementById("QueryAnswer").value='';}
function validate(ReplyQForm) 
{ 
 var QueryAnswer = ReplyQForm.QueryAnswer.value; var QueryAction = ReplyQForm.Uaction.value;
 if(QueryAnswer.length === 0)
 { if(QueryAction=='P') { alert("Please type reason for pending or in-process!"); return false;}
   if(QueryAction=='R') { alert("Please type reply!"); return false;}
   if(QueryAction=='F') { alert("Please type reason for forward to HR!!"); return false;}
 } 
 if(QueryAnswer.length<20){alert("Please type minimum 20 charector!"); return false;} 
 var agree=confirm("Are you sure you want to submit..?"); if(agree){return true;}else{return false;}
}
</script>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" bgcolor="#E0DBE3">
<?php $sql = mysql_query("SELECT * FROM hrm_employee_query WHERE QueryId=".$_REQUEST['Q'], $con) or die(mysql_error()); $res = mysql_fetch_assoc($sql); 
      $sqlE=mysql_query("select Fname,Sname,Lname from hrm_employee where EmployeeID=".$res['EmployeeID'], $con); $resE=mysql_fetch_assoc($sqlE); ?>	
<table style="vertical-align:top;" width="460" align="center" border="0">
<tr>
 <td>
   <table border="0">
   <tr>
     <td style="width:80px;margin-left:5px; margin-right:5px;font-family:Times New Roman;color:#0D3039;font-size:14px;" align="left" valign="top">
	 <u><b>Date</b></u> :</td>
	 <td style="width:380px;margin-left:5px; margin-right:5px;font-family:Times New Roman;color:#0D3039;font-size:14px;" align="left" valign="top">
	 <?php echo date("d F Y"); ?></td>
  </tr>
   <tr>
     <td style="width:80px;margin-left:5px; margin-right:5px;font-family:Times New Roman;color:#0D3039;font-size:14px;" align="left" valign="top">
	 <u><b>To</b></u> :</td>
	 <td style="width:380px;margin-left:5px; margin-right:5px;font-family:Times New Roman;color:#0D3039;font-size:14px;" align="left" valign="top">
	 <?php echo $resE['Fname'].' '.$resE['Sname'].' '.$resE['Lname']; ?></td>
  </tr>
  <tr>
     <td style="width:80px;margin-left:5px; margin-right:5px;font-family:Times New Roman;color:#0D3039;font-size:14px;" align="left" valign="top">
	 <u><b>Subject</b></u> :</td>
	 <td style="width:380px;margin-left:5px; margin-right:5px;font-family:Times New Roman;color:#0D3039;font-size:14px;" align="left" valign="top">
	 <?php echo $res['QuerySubject']; ?></td>
  </tr>
  <tr>
     <td style="width:80px; margin-left:5px; margin-right:5px;font-family:Times New Roman;color:#0D3039;font-size:14px;" align="left" valign="top">
	 <u><b>Query</b></u> :</td>
	 <td style="width:380px;margin-left:5px; margin-right:5px;font-family:Times New Roman;color:#0D3039;font-size:14px;" align="justify" valign="top">
	 <?php if($res['QueryNoOfTime']==1){echo $res['QueryValue'];} if($res['QueryNoOfTime']==2){echo $res['Query2Value'];}
	       if($res['QueryNoOfTime']==3){echo $res['Query3Value'];} if($res['QueryNoOfTime']==4){echo $res['Query4Value'];}
		   if($res['QueryNoOfTime']==5){echo $res['Query5Value'];}?>
	 </td>
  </tr>
  <tr>
     <td style="width:80px; margin-left:5px; margin-right:5px;font-family:Times New Roman;color:#0D3039;font-size:14px;" align="left" valign="top">
	 <u><b>Action</b></u> :</td>
	 <td style="width:380px;margin-left:5px; margin-right:5px;font-family:Times New Roman;color:#0D3039;font-size:14px;" align="justify" valign="top">
	 <?php if($_REQUEST['action']=='P'){echo 'Pending or In-process!';} if($_REQUEST['action']=='R'){echo 'Reply!';} if($_REQUEST['action']=='F'){echo 'Forward to HR!';}?></td>
  </tr>
  <tr><td colspan="2">&nbsp;</td></tr>
  <form name="ReplyQForm" method="post" onSubmit="return validate(this)">
  <tr>
   <td colspan="2" valign="top" align="">
   <textarea name="QueryAnswer" id="QueryAnswer" cols="53" rows="10"><?php if($_REQUEST['action']=='R'){echo 'Please type your answer!';} if($_REQUEST['action']=='P'){echo 'Please type reason for pending or in-process!';} if($_REQUEST['action']=='F'){echo 'Please type reason for forward to HR!';} ?></textarea>
   <input type="hidden" name="QId" value="<?php echo $_REQUEST['Q']; ?>" /><input type="hidden" name="UId" value="<?php echo $_REQUEST['U']; ?>" />
   <input type="hidden" name="UTp" value="<?php echo $_REQUEST['UT']; ?>" /><input type="hidden" name="Uaction" value="<?php echo $_REQUEST['action']; ?>" />
   <input type="hidden" name="NOfT" value="<?php echo $_REQUEST['NOfT']; ?>" />
   </td>
  </tr> 
  <tr>
   <td colspan="2" valign="top" align="Right" style="font-family:Times New Roman;color:#AA0000;font-size:15px; font-weight:bold;">
   <?php echo $Msg; ?>
   <input type="submit" name="ReplyQuery" style="width:90px;" value="Send">
   <input type="button" name="Refresh" id="Refresh" style="width:90px;" value="Refresh" onClick="FormRefresh()"/></td>
  </tr>    
  </form>
  </table>
 </td>
</tr>
</table>
</body>
</html>