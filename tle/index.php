<?php session_start();  
	  require_once('../Employee/sp/user/config/config.php');
      require_once("../AdminUser/logcheck.php");
	  require_once('../AdminUser/codeEncDec.php'); //include('codeEncDec.php');
	  
if(isset($_POST['LoginF']) AND $_POST['username']!='' && $_POST['userpass']!='')
{ 
$_SESSION['YearId']=$_POST['YearId']; $_SESSION['fromdate']=$_POST['FromDate']; $_SESSION['todate']=$_POST['ToDate']; 
date_default_timezone_set('Asia/Kolkata'); $DateTime=date("Y-m-d h:i:s");
  $sql = mysql_query("SELECT * FROM hrm_sales_tlemp WHERE TLUname='".$_POST['username']."' AND TLStatus='A'",$con); 
  $row2 = mysql_fetch_assoc($sql); 
  if(mysql_num_rows($sql)==1)
  { $EncPass=decrypt($row2['TLPwd']);  
	if($row2['TLUname']==$_POST['username'] AND $EncPass==$_POST['userpass'] AND $row2['TLStatus']=='A')
    { $_SESSION['login'] = true; $_SESSION['TLUname']=$row2['TLUname'];  $_SESSION['ID']=$row2['TLEId']; 
	  header('Location:tlh/index.php'); }
  }   
  elseif(($row2['TLUname']!=$_POST['username'] AND  $EncPass!=$_POST['userpass']) OR ($row2['TLUname']==$_POST['username'] AND $EncPass!=$_POST['userpass']) OR ($row2['TLUname']!=$_POST['username'] AND $EncPass==$_POST['userpass']) OR ($row2['TLUname']==$_POST['username'] AND $EncPass==$_POST['userpass'] AND $row2['TLStatus']=='D'))
   { echo "<div style='position:absolute;top:350px;left:450px;height:85px;'><hi><font color=#910000 size=5>You are not authorized to enter this site...</font></h1></div>"; }
 }	  
?>
<html>
<head>
<title><?php include_once('Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link href="css/style.css" rel="stylesheet" type="text/css">
<style>
.text_login
{
width:160px;
size:20px;
height:18px;
}
.text_login1
{
width:130px;
size:15px;
height:18px;
}
</style>
<script type="text/javascript">
function validateAdminEmp()
{  
  var username = document.getElementById("username").value; var userpass = document.getElementById("userpass").value; 	
  if(username.length === 0) { alert("Enter Your User Name."); return false; }	
  if(userpass.length === 0) { alert("Enter your Password.."); return false; }
  if(username.length!='' && userpass.length!=''){ return true; }
}
</script>
</head>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" bgcolor="#FFFFFF">
<?php 
$sql_1 = mysql_query("SELECT FromDate,ToDate FROM hrm_sales_year where Company1='A'", $con); 
$res_1=mysql_fetch_assoc($sql_1); ?>
<center>
<table border="0" style="margin-top:20px;margin-bottom:20px;margin-left:20px;margin-right:20px;width:550px;height:550px;" align="center" cellpadding="2" cellspacing="0">
  <tr>
   <td>
    <table border="0" style="width:550px;height:500px;" cellpadding="0" cellspacing="0">
	 <tr style="height:22px; background-color:#B0FB4D;background-image:url(../images/b1.jpg);">
	  <td colspan="2" style="width:550px;" valign="bottom">&nbsp;</td>

	 </tr>
	 <tr style="height:15px; background-color:#FFFFFF;">
	  <td colspan="2" style="width:550px;" align="right" valign="bottom"></td>
	 </tr>
	 <tr style="height:22px;">
	  <td style="background-color:#B0FB4D;" align="right" valign="bottom">&nbsp;</td> 
<?php /////////////// Open ?>	 
	  <td rowspan="2" style="width:520px;background-color:#B0FB4D;" valign="top">
	  <font style="color:#0066CC;font-size:25px;"><u>Teamlease Team</u></font>
<table border="0" style="height:200px;margin-top:100px;width:810px;">
<?php //Login Open ?>	
<tr>
 <td id="AdminCell" style="display:block;" align="center" valign="top">
  <table>
   <tr>
    <td>
<form name="formadmin" onSubmit="return validateAdminEmp(this)" method="post">
<table border="0" cellspacing="0" align="center">
 <tr><td align="center" colspan="2" style="height:50px;text-shadow:#DAE40E;color:#000000;font-family:Times New Roman;font-size:22px;text-shadow:2px 2px 3px #24740A;">Sign In</td></tr>
 <tr><td style="font-family:Georgia; font-size:13px;color:#000000;">User Name &nbsp;:&nbsp;</td><td><input class="text_login" name="username" id="username"  maxlength="10"></td>

</tr><tr><td style="font-family:Georgia; font-size:13px;color:#000000;">Password &nbsp;:&nbsp;</td><td><input class="text_login" type="password" name="userpass" id="userpass"  maxlength="15"></td></tr>

</tr><tr><td style="font-family:Georgia; font-size:13px;color:#000000;">Year &nbsp;:&nbsp;</td><td style="font-family:Times New Roman;font-size:16px;color:#005300; font-weight:bold;">
<span id="yearA_1" style="display:block;"><?php echo date("Y",strtotime($res_1['FromDate'])).' to '.date("Y",strtotime($res_1['ToDate'])); ?></span>
</td></tr>
 <tr><td colspan="2" align="right">
		<input type="hidden" value="<?php echo $logadmin; ?>" name="LoginAdmin"/>
		<input type="hidden" value="<?php echo $LogLogin; ?>" name="LoginEmp"/>
		<input type="submit" id="submit" name="LoginF" value="Login"/>
		<input type="button" name="Cancel" value="Refresh" onClick="javascript:window.location='index.php'"/></td></tr>
</table>
</form>	
	</td>
   </tr>
  </table>
 </td>
</tr>
<?php //Login Close ?>		
</table> 
	  </td>
<?php /////////////// Close ?>
	 </tr>
	 <tr style="height:380px;background-color:#B0FB4D;">
	  <td align="center" valign="top"><br><br><br>
		  <br><br><br>
	  </td>
	 </tr>

     <tr style="background-color:#FFFFFF;">
	  <td colspan="2">
	    <table cellpadding="0" cellspacing="0">
<tr style="height:10px;">
  <td style=" background-color:#FFFFFF;width:1050px;height:10px;" align="center">
    <table style="width:1000px;" border="0" cellspacing="0" cellpadding="0">
     <tr style="height:10px;">
	  <td style="width:400px;background-color:#FFFFFF;"></td>
	  <td style="width:200px;background-color:#FFFFFF;"></td>
	  <td style="width:400px;background-color:#FFFFFF;"></td>
	 </tr> 
    </table>		
  </td>
</tr>

<tr style="height:22px;background-image:url(../images/b1.jpg);"><td>&nbsp;</td></tr>

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