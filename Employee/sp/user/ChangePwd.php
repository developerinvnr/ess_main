<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');}
include("../function.php");
include('codeEncDec.php');
if(check_user()==false){header('Location:../../../index.php');}
if($_SESSION['login'] = true){require_once('UserMenuSession.php');}

if(isset($_POST['ChangePwd']))
{
$SqlQuery = mysql_query("SELECT User_pass FROM hrm_sales_user WHERE SalesUserId=".$UserId, $con); $row=mysql_num_rows($SqlQuery);

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
     $SqlUpdate=mysql_query("UPDATE hrm_sales_user SET User_pass='".$CHpass."' where SalesUserId=".$UserId, $con);  
     if($SqlUpdate) { $msg = "Congratulations! You have successfully changed your password."; } else { $msg = "try Again"; }
  }	 
}  

}
?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style> .font { color:#ffffff; font-family:Georgia; font-size:11px; width:250px;} .font5 { color:#000066; font-family:Georgia; font-size:16px;}
.font2 { color:#thrthr; font-family:Georgia; font-size:13px; width:150px;}.font4 { color:#1FAD34; font-family:Georgia; font-size:15px;}
.input { background-color:#A3C8E7;}
</style>
<script type="text/javascript" src="js/stuHover.js" ></script>
<Script type="text/javascript">window.history.forward(1);
function validate(form)
{ var currpass = form.currpass.value;  var filter=/^[0-9a-zA-Z%@$#]+$/;  var test_bool = filter.test(currpass);
  var pass1 = form.pass1.value;  var filter1=/^[0-9a-zA-Z%@$#]+$/;  var test_bool1 = filter1.test(pass1);  var pass2 = form.pass2.value;  var filter2=/^[0-9a-z]+$/;
  var test_bool2 = filter1.test(pass2);
  
    if (currpass.length === 0) { alert("You must enter a Current Password.");  return false; }
	if (pass1.length === 0){ alert("Please Enter a new password  ");  return false; }	
	if(test_bool1==false)  { alert('Please Enter Only numeric and small Alphabets in the new password Field'); return false; }	
 }
</Script>
</head>
<body class="body">
<table class="table">
<tr>
 <td>
  <table class="menutable"><tr><td><?php if($_SESSION['login'] = true){ require_once("EMenu.php"); } ?></td></tr></table>
 </td>
</tr>
<tr>
 <td>
  <table width="100%" style="margin-top:0px;" border="0">
    <tr>
	  <td valign="top"><?php if($_SESSION['login'] = true){ require_once("EWelcome.php"); } ?></td>
	</tr>
	 <tr>
	  <td valign="top" align="center"  width="100%" id="MainWindow"><br><br><br>
<?php //************************************************************************************************************************************************************?>
<?php //**********************************************START*****START*****START******START******START***************************************************************?>
<?php //************************************************************************************************************************************************************?>
	  
<table border="0" style="margin-top:0px; width:100%; height:300px;">
    <tr>
	  <td align="center"><table><tr><td class="font4" colspan="2" align="center"><b><?php echo $msg; ?></b></td></table></td>
	</tr>
	<tr>
	  <td align="center" colspan="3" valign="top">
		             
	  <form enctype="multipart/form-data" name="form" method="post"  onSubmit="return validate(this)">
		 <table border="0" cellspacing="5">
		    <tr><td height="50" colspan="2" align="center" class="heading">Change Password</td></tr>
            <tr><td align="left" class="font2" ><img src="images/Cpwd.png" border="0" /></td>
			    <td><input class="input" type="password" name="currpass" id="currpass" maxlength="15" size="25" height="3" maxlength="5"></td></tr>
            <tr><td align="left" class="font2" ><img src="images/Npwd.png" border="0" /></td><td><input class="input" type="password" name="pass1" id="pass1" height="15" maxlength="15" size="25"></td></tr>
            <tr><td align="left" class="font2"><img src="images/Rpwd.png" border="0" /></td><td><input class="input" type="password" name="pass2" id="pass2" height="15" maxlength="15" size="25" ></td></tr>
			<tr><td colspan="2"  align="Right"><input type="submit" id="Change" name="ChangePwd" value="Change"/>
				<input type="button" name="Refrash" value="Refresh" onClick="javascript:window.location='ChangePwd.php'"/>
				<input type="button" name="Back" value="Back" onClick="javascript:window.location='Index.php?log=<?php echo $_SESSION['logCheckUser']; ?>'"/></td></tr>
        </table>
	  </form>  	   
	  </td>
	</tr>
</table>
		
<?php //************************************************************************************************************************************************************?>
<?php //**********************************************END*****END*****END******END******END***************************************************************?>
<?php //************************************************************************************************************************************************************?>
		
	  </td>
	</tr>
	
	
  </table>
 </td>
</tr>
</table>
</body>
</html>