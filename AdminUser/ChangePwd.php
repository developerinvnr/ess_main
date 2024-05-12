<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
include('codeEncDec.php');
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}
if($_SESSION['login'] = true){require_once('PhpFile/ChangePwdP.php'); } else {$msg= "Session Expiry..............."; }
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
  <table class="menutable"><tr><td><?php if($_SESSION['login'] = true){ require_once("AMenu.php"); } ?></td></tr></table>
 </td>
</tr>
<tr>
 <td>
  <table width="100%" style="margin-top:0px;" border="0">
    <tr>
	  <td valign="top"><?php if($_SESSION['login'] = true){ require_once("AWelcome.php"); } ?></td>
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
	  <?php if(($_SESSION['UserType']=='S' OR $_SESSION['UserType']=='A' OR $_SESSION['UserType']=='U') AND $_SESSION['login'] = true) { ?>
		             
	  <form enctype="multipart/form-data" name="form" method="post"  onSubmit="return validate(this)">
		 <table border="0" cellspacing="5">
		    <tr><td height="50" colspan="2" align="center" class="heading">Change Password</td></tr>
            <tr><td align="left" class="font2" ><img src="images/Cpwd.png" border="0" /></td>
			    <td><input class="input" type="password" name="currpass" id="currpass" maxlength="15" size="25" height="3" maxlength="5"></td></tr>
            <tr><td align="left" class="font2" ><img src="images/Npwd.png" border="0" /></td><td><input class="input" type="password" name="pass1" id="pass1" height="15" maxlength="15" size="25"></td></tr>
            <tr><td align="left" class="font2"><img src="images/Rpwd.png" border="0" /></td><td><input class="input" type="password" name="pass2" id="pass2" height="15" maxlength="15" size="25" ></td></tr>
			<tr><td colspan="2"  align="Right"><input type="submit" id="Change" name="ChangePwd" value="Change"/>
				<input type="button" name="Refrash" value="Refresh" onClick="javascript:window.location='ChangePwd.php'"/>
				<input type="button" name="Back" value="Back" onclick="javascript:window.location='Index.php?log=<?php echo $_SESSION['logCheckUser']; ?>'"/></td></tr>
        </table>
	  </form>  
	   
      <?php } ?>	   
	  </td>
	</tr>
</table>
		
<?php //************************************************************************************************************************************************************?>
<?php //**********************************************END*****END*****END******END******END***************************************************************?>
<?php //************************************************************************************************************************************************************?>
		
	  </td>
	</tr>
	
	<tr>
	  <td valign="top" align="center">
	    <table border="0" style="margin-top:0px;">
				<tr>
	              <td align="center"><img src="images/home1.png"></td>
				</tr>
	    </table>
	  </td>
	</tr>
	<tr>
	  <td valign="top">
	    <?php require_once("../footer.php"); ?>
	  </td>
	</tr>
  </table>
 </td>
</tr>
</table>
</body>
</html>