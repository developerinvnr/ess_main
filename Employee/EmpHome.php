<?php session_start();
if($_SESSION['login'] = true){require_once('../AdminUser/config/config.php');}
include("../function.php");
include('../AdminUser/codeEncDec.php');
if(check_user()==false){header('Location:../index.php');}
require_once('../AdminUser/logcheck.php');
if($_REQUEST['log']!=$LogLogin){header('Location:../index.php');} 
else {$_SESSION['logCheckEmp']=$_REQUEST['log'];} 
if($_SESSION['login'] = true){ require_once('StartEmpMenuSession.php'); }
if($_SESSION['login'] = true){$EmployeeId=$_SESSION['EmployeeID']; $YearId=$_SESSION['YearId']; $CompanyId=$_SESSION['CompanyId'];
$fromdate=date("Y",strtotime($_SESSION['fromdate'])); $todate=date("Y",strtotime($_SESSION['todate'])); }

/******************************************************************************/
$sql=mysql_query("select ChangePwd,EmpPass from hrm_employee where EmployeeID=".$EmployeeId, $con); $res=mysql_fetch_assoc($sql);
if($res['ChangePwd']=='Y'){ header('Location:Index.php?log='.$logemp); }                               
/******************************************************************************/
if(isset($_POST['ChangePwd']))
{ 
$SqlQuery = mysql_query("SELECT EmpPass FROM hrm_employee WHERE EmployeeID=".$EmployeeId, $con); $row=mysql_num_rows($SqlQuery);
if($row==0) 
{ $msg = "Your ID does not exist. <a href=EmpHome.php?log=".$_POST['LogId']." style='text-decoration:none;'>Try Again</a>"; } 
//else if($_POST['currpass']!= mysql_result($SqlQuery, 0)) 
//{ $msg = "Your entered an incorrect password. <a href=EmpHome.php?log=".$_POST['LogId']." style='text-decoration:none;'>Try Again</a>";} 
else if($_POST['pass1']!==$_POST['pass2']) 
{ $msg = "The new password and Re new password fields must be the same. <a href=EmpHome.php?log=".$_POST['LogId']." style='text-decoration:none;'>Try Again</a>";  }  
else if($_POST['pass1']==$_POST['pass2']) 
{ $pass=encrypt($_POST['pass1']);
 $SqlUpdate=mysql_query("UPDATE hrm_employee SET ChangePwd='Y', EmpPass='".$pass."' where EmployeeID=".$EmployeeId, $con); 
 if($SqlUpdate) 
 { echo  '<script>alert("Congratulations! You have successfully changed your password.");</script>';
   echo  '<script>window.location="Index.php?log='.$logemp.'";</script>';
 }
 else $msg = "try Again";
}
}
?>

<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<link rel="stylesheet" type="text/css" href="src/css/jscal2.css"/>
<link rel="stylesheet" type="text/css" href="src/css/border-radius.css"/>
<link rel="stylesheet" type="text/css" href="src/css/steel/steel.css"/>
<script type="text/javascript" src="src/js/jscal2.js"></script>
<script type="text/javascript" src="src/js/lang/en.js"></script>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<style> .font { color:#ffffff; font-family:Georgia; font-size:11px; width:250px;} .font5 { color:#000066; font-family:Georgia; font-size:16px;}
.font2 { color:#thrthr; font-family:Georgia; font-size:13px; width:150px;}.font4 { color:#1FAD34; font-family:Georgia; font-size:15px;}
.input { background-color:#A3C8E7;}.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;} .TableHead { font-family:Times New Roman; color:#FFFFFF; font-size:15px; }.TableHead1 { font-family:Times New Roman; color:#000000; background-color:#FFFFFF; font-size:13px; overflow:hidden; } .InputText {font-family:Times New Roman; font-size:12px; width:100px; height:19px; }.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}
</style>
<Script type="text/javascript">window.history.forward(1);</Script>
<script type="text/javascript" language="javascript">
function validate(form)
{ var currpass = form.currpass.value;  var filter=/^[0-9a-zA-Z%@$#]+$/; var test_bool = filter.test(currpass);
  var pass1 = form.pass1.value;  var filter1=/^[0-9a-zA-Z%@$#]+$/; var test_bool1 = filter1.test(pass1);  
  var pass2 = form.pass2.value;  var filter2=/^[0-9a-zA-Z%@$#]+$/; var test_bool2 = filter1.test(pass2);
    if (currpass.length === 0) { alert("You must enter a Current Password.");  return false; }
	if (pass1.length === 0){ alert("Please Enter a new password  ");  return false; }
	if (pass1.length<5){ alert("Password lenght must be minimum 5 digit.");  return false; }	
	if(test_bool1==false)  { alert('Please Enter Only numeric and small Alphabets in the new password Field'); return false; }	
 }
</script>
</head>
<body class="body">   
<table class="table">
<tr>
 <td>
 <?php  /*  <table class="menutable"><tr><td><?php //if($_SESSION['login'] = true){ require_once("EMenu.php"); } ?></td></tr></table> */ ?>
 </td>
</tr>
<tr>
 <td>
  <table width="100%" style="margin-top:0px; ">
    <tr>
	  <td valign="top"><?php if($_SESSION['login'] = true){ require_once("EWelcome.php"); } ?></td>
	</tr>
	 <tr>
	  <td valign="top">
	     <table border="0" style="width:100%; height:380px; float:none;" cellpadding="0">
		  <tr>
		   <td valign="top"> 
<?php //*************************************************************************************************************************************************** ?>	   
		     <table border="0" id="Activity">
			  <tr>
			     <td id="Anni" valign="top" style="width:5px;"></td>
				 <td colspan="2" width="1200" valign="top" align="center">
<?php //*************************************************************** Start ******************************************************************************** ?>					
    <table border="0" id="Activity" align="center">
     <tr>
      <td height="50" colspan="2" align="center"><font color="#014E05" style='font-family:Times New Roman;' size="3"><b><?php echo $msg; ?></b></font></td>
     </tr>
     <tr>
	   <td width="550" height="300" valign="middle" align="center" id="FormTd">
				  <form enctype="multipart/form-data" name="form" method="post" onSubmit="return validate(this)">
 <table border="0" cellspacing="5">
<tr><td height="50" colspan="2" align="center" class="heading">
Please change your password....
    </td></tr>
<tr><td align="left" class="font2" ><img src="../AdminUser/images/Cpwd.png" border="0" /></td>
    <td><input class="input" type="password" name="currpass" id="currpass" size="25" maxlength="25" value="<?php echo decrypt($res['EmpPass']); ?>" readonly></td></tr>
<tr><td align="left" class="font2" ><img src="../AdminUser/images/Npwd.png" border="0" /></td><td><input class="input" type="password" name="pass1" id="pass1" height="15" maxlength="15" size="25"></td></tr>
<tr><td align="left" class="font2"><img src="../AdminUser/images/Rpwd.png" border="0" /></td><td><input class="input" type="password" name="pass2" id="pass2" height="15" maxlength="15" size="25" ></td></tr>
<tr><td colspan="2"  align="Right">
<input type="hidden" name="LogId" value="<?php echo $_REQUEST['log']; ?>" />
<input type="submit" id="Change" name="ChangePwd" value="Change"/>
    </td></tr>
</table>
	       </form>  
       </td>
	</tr>
 </table>       
<?php //*************************************************************** Close ******************************************************************************** ?>					
				 </td>
			  </tr>
			  <tr>
			     <td style="width:5px;">&nbsp;</td>
			     <td align="" class="fontButton" width="400">
				 </td>         
		      </tr>
			</table>
           </td>
			  </tr>
	        </table>
<?php //*************************************************************************************************************************************************** ?>
		   </td>
		  </tr>
		</table>
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
	  <td valign="top" style="">
	    <?php require_once("../footer.php"); ?>
	  </td>
	</tr>
  </table>
 </td>
</tr>
</table>
</body>
</html>







