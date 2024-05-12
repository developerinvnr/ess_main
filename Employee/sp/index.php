<?php session_start();  
	  require_once('AdminUser/config/config.php');
	  require_once('AdminUser/codeEncDec.php'); 
	  
if(isset($_POST['LoginAdminEmp']) AND $_POST['username']!='' && $_POST['userpass']!='')
{ 
 if($_POST['username']>0)
 { 
  $sql = mysql_query("SELECT hrm_employee.EmployeeID,EmpPass,EmpStatus,EmpType FROM hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID WHERE hrm_employee.EmpCode='".$_POST['username']."' AND hrm_employee.CompanyId=1 AND hrm_employee.EmpStatus='A' AND hrm_employee.EmpType='E' AND hrm_employee_general.DepartmentId=6", $con);
  if(mysql_num_rows($sql)==1)
  { $res = mysql_fetch_assoc($sql); $EncPass=decrypt($res['EmpPass']); 
    $_SESSION['login'] = true; $_SESSION['EmployeeID']=$res['EmployeeID']; $_SESSION['EmpType']=$res['EmpType']; $_SESSION['EmpStatus']=$res['EmpStatus'];
	if($EncPass==$_POST['userpass'] AND $res['EmpType']=='E' AND $res['EmpStatus']=='A')
    { 
	 header('Location:Employee/Index.php'); 
	}
  }
  else{$msg='Please Check Login-ID/Password';}   
 }
 else
 {
  $sql = mysql_query("SELECT SalesUserId,User_pass,User_type,User_status from hrm_sales_user WHERE User_name='".$_POST['username']."' AND User_status='A' AND (User_type='S' OR User_type='A' OR User_type='U')", $con); 
  if(mysql_num_rows($sql)==1)
   { $res = mysql_fetch_assoc($sql); $EncUserPass=decrypt($res['User_pass']);  
     $_SESSION['login'] = true; $_SESSION['userid']=$res['SalesUserId']; $_SESSION['username']=$_POST['username']; $_SESSION['UserStatus']=$res['User_status'];
	 $_SESSION['User_type']=$res['User_type'];
     if($EncUserPass==$_POST['userpass'] AND $res['User_status']=='A' AND ($res['User_type']=='S' OR $res['User_type']=='A' OR $res['User_type']=='U'))
     { 
	  header('Location:AdminUser/Index.php');
	 }
   }
   else{$msg='Please Check Login-ID/Password';}
 }
}   
?>
<html>
<head>
<title><?php include_once('Title.php'); ?></title>
<meta NAME="Keywords" CONTENT="<?php include_once('ContentKey.php'); ?>"/>
<meta NAME="Description" CONTENT="<?php include_once('ContentDes.php'); ?>"/>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link href="css/style.css" rel="stylesheet" type="text/css">
<script type="text/javascript">
function validateAdmin()
{
  var username = document.getElementById("username").value; var userpass = document.getElementById("userpass").value; 	
  if(username.length === 0) { alert("Enter Your Name/ID."); return false; }	
  if(userpass.length === 0) { alert("Enter your Password.."); return false; }
  if(username.length!='' && userpass.length!=''){ return true; }
}
</script>
</head>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" bgcolor="#586738">
<center>
<table border="0" style="margin-top:50px;" align="center" cellpadding="0" cellspacing="0">
<tr>
 <td align="center">  
 <table border="0" cellspacing="0" cellpadding="0" align="center" style="width:650px; ">
 <tr>
  <td style="font-family:Times New Roman;font-size:48px;font-weight:bold;color:#183E83;background-image:url(images/footer-leaf.png);background-repeat:no-repeat;height:280px;" valign="top">
  <table border="0">
  <tr><td style="height:60px;width:260px;">&nbsp;</td></tr>
  <tr>
   <td style="height:30px;width:300px;">&nbsp;</td>
   <td style="font-family:Times New Roman;font-size:48px;font-weight:bold;color:#FFFFFF;">Sales Plan</td>
  </tr>
   <tr><td style="height:100px;">&nbsp;</td></tr>
   <tr><td style="width:270px;">&nbsp;</td>
	   <td style="width:350px;">
<form name="formadmin" onSubmit="return validateAdmin(this)" method="post">
<table border="0" cellspacing="0" align="center">
 <tr><td align="center" colspan="2" style="font-family:Georgia;font-size:20px;font-weight:bold;color:#FFFFFF;">Sign In</td></tr>
 <tr><td><b>Name/ID &nbsp;&nbsp;:&nbsp;</b></td><td><input class="text_login" name="username" id="username"  maxlength="10"></td></tr>
 <tr><td><b>Password &nbsp;:&nbsp;</b></td><td><input class="text_login" type="password" name="userpass" id="userpass"  maxlength="15"></td></tr>
 <tr><td colspan="2" align="right">
      <input type="submit" id="submit" name="LoginAdminEmp" value="Login"/ <?php if($_REQUEST['logout']==true){echo 'disabled';} ?>>
	  <input type="button" name="Cancel" value="Refresh" onClick="javascript:window.location='index.php'"/></td>
 </tr>
</table>
</form> 
	   </td> 
	</tr>
	<tr><td colspan="2" style="font-family:Times New Roman;font-size:20px;font-weight:bold;color:#FF962D;"><?php echo $msg; ?></td></tr>
	<tr>
	 <td colspan="2">
<?php 
if($_REQUEST['logout']==true)
{ $_SESSION['login'] = false;
unset($_SESSION['login']);
unset($_SESSION['userid']);
unset($_SESSION['username']);
unset($_SESSION['UserStatus']);
unset($_SESSION['User_type']);
unset($_SESSION['EmployeeID']);
unset($_SESSION['EmpType']);
unset($_SESSION['EmpStatus']);
session_destroy();
echo "<hi><font color=#ACE0A9 style='font-family:Georgia;' size=4>You have SuccessFully <img src='images/LogOut.png' border='0' />.........</font></hi>";
echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src='images/LogOut1.png' border='0' />";
echo "";
}
?> 
	 </td>
	</tr>
	</table>
   </td>
  </tr>	   	   
 </table>			   
 </td>  	  
</tr>
</table>
</center>
</body>
</html>