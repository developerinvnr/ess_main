<?php 
if(isset($_POST['ChangePwd']))
{
$SqlQuery = mysql_query("SELECT User_pass FROM hrm_user WHERE AXAUESRUser_Id=".$UserId, $con); $row=mysql_num_rows($SqlQuery);

if($row==0) 
{ $msg = "Your User ID does not exist. <a href=ChangePwd.php style='text-decoration:none;'>Try Again</a>"; } 
else if($row>0)
{ $res=mysql_fetch_assoc($SqlQuery); $pass=decrypt($res['User_pass']); 
  if($_POST['currpass']!=$pass)
  {$msg = "Your entered an incorrect password. <a href=ChangePwd.php style='text-decoration:none;'>Try Again</a>";}
  elseif($_POST['pass1']!==$_POST['pass2']) 
  {$msg = "The new password and Re new password fields must be the same. <a href=ChangePwd.php style='text-decoration:none;'>Try Again</a>";  }  
  elseif($_POST['pass1']==$_POST['pass2']) 
  { $CHpass=encrypt($_POST['pass1']);
     $SqlUpdate=mysql_query("UPDATE hrm_user SET User_pass='".$CHpass."' where AXAUESRUser_Id=".$UserId, $con);  
     if($SqlUpdate) { $msg = "Congratulations! You have successfully changed your password."; } else { $msg = "try Again"; }
  }	 
}  

}
?>
