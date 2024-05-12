<?php  
 if(isset($_POST['SaveReply']) AND $_POST['ReplyText']!='')
{ if($_POST['UserType']=='A')
  { $sqlUpQ=mysql_query("update hrm_employee_hrquery set ReplyAns_Admin='".$_POST['ReplyText']."', DateTimeReplyAns_Admin='".date("Y-m-d h:i:s")."', QStatus_Admin=2, Id_Admin=".$_POST['UserId']." where QueryId=".$_POST['QId'], $con);
    if($sqlUpQ){$msq='Query Reply Message send Successfully'; }  }
	
  if($_POST['UserType']=='S')
  { $sqlUpQ=mysql_query("update hrm_employee_hrquery set ReplyAns_SAdmin='".$_POST['ReplyText']."', DateTimeReplyAns_SAdmin='".date("Y-m-d h:i:s")."', QStatus_SAdmin=2, Id_SAdmin=".$_POST['UserId']." where QueryId=".$_POST['QId'], $con);
    if($sqlUpQ){$msq='Query Reply Message send Successfully'; }  }	
}

if(isset($_POST['SaveWating']))
{ if($_POST['UserType']=='A')
  { $sqlUpQ=mysql_query("update hrm_employee_hrquery set QStatus_Admin=1, Id_Admin=".$_POST['UserId']." where QueryId=".$_POST['QId'], $con);
    if($sqlUpQ){$msq='Data Updated send Successfully'; }  }
	
  if($_POST['UserType']=='S')
  { $sqlUpQ=mysql_query("update hrm_employee_hrquery set QStatus_SAdmin=1, Id_SAdmin=".$_POST['UserId']." where QueryId=".$_POST['QId'], $con);
    if($sqlUpQ){$msq='Data Updated Successfully'; }  }	
} 

if(isset($_POST['SaveForw']))
{ if($_POST['UserType']=='A')
  { $sqlUpQ=mysql_query("update hrm_employee_hrquery set QFwdHR_RepMgr='Y', QFwdHR_DateTime='".date("Y-m-d h:i:s")."', QStatus_Admin=3, Id_Admin=".$_POST['UserId']." where QueryId=".$_POST['QId'], $con);
    if($sqlUpQ){$msq='Data Updated Successfully'; }  }
	
  if($_POST['UserType']=='S')
  { $sqlUpQ=mysql_query("update hrm_employee_hrquery set QFwdHR_RepMgr='Y', QFwdHR_DateTime='".date("Y-m-d h:i:s")."', QStatus_SAdmin=3, Id_SAdmin=".$_POST['UserId']." where QueryId=".$_POST['QId'], $con);
    if($sqlUpQ){$msq='Data Updated Successfully'; }  }	
}    
   
?>