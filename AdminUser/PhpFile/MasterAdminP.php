<?php 
if(isset($_POST['SaveUser']))
{ 
   $SqlUpdate = mysql_query("UPDATE hrm_user SET User_FirstName='".$_POST['Fname']."', User_SecondName='".$_POST['Sname']."', User_LastName='".$_POST['Lname']."', User_Position='".$_POST['Position']."', User_name='".$_POST['Uname']."', User_MrMrsMiss='".$_POST['MrMrsMiss']."', User_type='".$_POST['Utype']."', User_status='".$_POST['Ustatus']."', Comment='".$_POST['nComment']."', CreatedBy='".$UserId."', CreatedDate='".date("Y-m-d")."', YearId='".$YearId."' WHERE AXAUESRUser_Id=".$_POST['sid'], $con) or die(mysql_error());
	    
	if($SqlUpdate){ $msg = "Data has been updated successfully..."; } 
}
if(isset($_POST['NewSaveUser']))
{
 $SqlNewInseartUser = mysql_query("INSERT INTO hrm_user(CompanyId,User_name,User_pass,User_MrMrsMiss,User_FirstName,User_SecondName,User_LastName,User_Position,User_type,User_status,Comment,CreatedBy,CreatedDate,YearId) VALUES(".$CompanyId.",'".$_POST['nUname']."','".$_POST['nUname']."','".$_POST['nMrMrsMiss']."','".$_POST['nFname']."','".$_POST['nSname']."','".$_POST['nLname']."','".$_POST['nPosition']."','".$_POST['nUtype']."','".$_POST['nUstatus']."','".$_POST['nComment']."', '".$UserId."','".date("Y-m-d")."','".$YearId."')", $con) or die(mysql_error()); 
 
 if($SqlNewInseartUser)
   { 
     $SqlSelectMaxUserID = mysql_query("SELECT Max(AXAUESRUser_Id) AS MaxID FROM hrm_user", $con); $ResSelectMaxUserID=mysql_fetch_assoc($SqlSelectMaxUserID);
      if($SqlSelectMaxUserID)
	   {
	    $SqlNewInseartMenu = mysql_query("INSERT INTO hrm_user_menu(AXAUESRUser_Id) VALUES(".$ResSelectMaxUserID['MaxID'].")", $con) or die(mysql_error());
            $SqlNewInseartMenu2 = mysql_query("INSERT INTO hrm_user_menu_master(AXAUESRUser_Id) VALUES(".$ResSelectMaxUserID['MaxID'].")", $con) or die(mysql_error());
	    if($SqlNewInseartMenu)
	      {
		   $SqlNewInseartSubMenu = mysql_query("INSERT INTO hrm_user_submenu(AXAUESRUser_Id) VALUES('".$ResSelectMaxUserID['MaxID']."')", $con) or die(mysql_error());
		   if($SqlNewInseartSubMenu) {$msg = "Data has been Insearted successfully...";}
		  }
	   }
   }
}

if(isset($_REQUEST['action']) && $_REQUEST['action']=="delete")
{
$SqlDelete=mysql_query("UPDATE hrm_user SET User_status='De' WHERE AXAUESRUser_Id=".$_REQUEST['did'], $con) or die(mysql_error());
  if($SqlDelete) { $msg = "Data has been deleted successfully..."; }
}

if(isset($_POST['Change']))
{ if($_POST['pass1']!==$_POST['pass2']) 
  { $msg = "<font color='#9D0000' style='font-family:Georgia; font-size:14px;'>The new password and confirm new password fields must be the same, Try Again</font>"; } 
  elseif($_POST['pass1']==$_POST['pass2']) 
     {$CHpass=encrypt($_POST['pass1']);
	  $SqlUpdate=mysql_query("UPDATE hrm_user SET User_pass='".$CHpass."' where AXAUESRUser_Id=".$_POST['logid'], $con); 
      if($SqlUpdate) 
      { $msg = "Congratulations! You have successfully changed password."; 
      }	else $msg = "<font color='#9D0000' style='font-family:Georgia; font-size:14px;'>try Again</font>";
     } 
}
?>
