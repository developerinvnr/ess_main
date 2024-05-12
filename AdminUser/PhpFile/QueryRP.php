<?php  
 if(isset($_POST['SaveReply']) AND $_POST['ReplyText']!='')
{ $sqlUpQ=mysql_query("update hrm_employee_hrquery set ReplyAns_SAdminTo_Mngmt='".$_POST['ReplyText']."', DateTimeReplyAns_SAdminTo_Mngmt='".date("Y-m-d h:i:s")."', QAction_Mngmt=1, ReplyAction_SAdminTo_Mngmt=".$_POST['Value1']." where QueryId=".$_POST['QId'], $con);
    if($sqlUpQ){$msq='Successfull'; } 
}

if(isset($_POST['SaveClosed']))
{ $sqlUpQ=mysql_query("update hrm_employee_hrquery set ReplyAction_SAdminTo_Mngmt=".$_POST['Value1'].", QAction_Mngmt=2 where QueryId=".$_POST['QId'], $con);
  if($sqlUpQ){$msq='Successfull'; } 
}    
?>