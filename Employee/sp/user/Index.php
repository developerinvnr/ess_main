<?php session_start();
if($_SESSION['login'] = true){require_once('../user/config/config.php');}
include("../function.php");
include('codeEncDec.php');
if(check_user()==false){header('Location:../../../index.php');}
if($_SESSION['login'] = true){require_once('UserMenuSession.php');} 
?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<Script type="text/javascript">window.history.forward(1);</Script>
<script type="text/javascript" language="javascript">
<!--
function doBlink() { var blink = document.all.tags("BLINK"); 
for (var i=0; i<blink.length; i++)	blink[i].style.visibility = blink[i].style.visibility == "" ? "hidden" : "" }
function startBlink() {	if (document.all) setInterval("doBlink()",1000); }
window.onload = startBlink;
// -->
</SCRIPT>
</head>
<body class="body"> 
<table class="table">
<tr><td><table class="menutable"><tr><td><?php if($_SESSION['login'] = true){ require_once("EMenu.php"); } ?></td></tr></table></td></tr>
<tr>
<td>
<table style="margin-top:0px;">
<tr><td valign="top"><?php if($_SESSION['login'] = true){ require_once("EWelcome.php"); } ?></td></tr>
<tr>
 <td valign="top" align="center">
 <table border="0" style="width:1200px; height:350px; float:none;" cellpadding="0">
 <tr>
  <td valign="top"> 	   
<?php //***************************************************** Main Body ********************************************************************************************** ?>	   
<table border="0" id="Activity">
<tr>
 <td valign="top">
  <table border="0">
  <tr>
	<td valign="top">			   
     <table border="0">
	 <tr>
	   <td align="left" valign="top" style="width:600px;height:280px;">
	     <table border="0">
		   <tr>
	<td colspan="2" align="left" valign="top" style="width:180px;">
<?php $SqlE = mysql_query("SELECT EmpCode FROM hrm_employee WHERE EmployeeID=".$EmployeeId." AND Companyid=".$CompanyId, $con);  $Emp=mysql_fetch_assoc($SqlE); 
	  echo '<img width="105px" height="125px" src="../../../AdminUser/EmpImg'.$CompanyId.'Emp/'.$Emp['EmpCode'].'.jpg" border="1" />'; ?> 
	<?php //echo "<img width=105px height=125px src=\"show_images.php?id=".$EmployeeId."\" border=1>\n";?></td>
	 <td style="width:10px;">&nbsp;</td>
	 <td valign="bottom" style="font-family:Times New Roman;font-size:48px;font-weight:bold;color:#183E83;background-image:url(images/footer-leaf.png);background-repeat:no-repeat;height:280px;width:600px;">
	  <table border="0">
		<tr><td style="height:60px;width:260px;">&nbsp;</td></tr>
		<tr><td style="height:30px;width:300px;">&nbsp;</td>
			<td style="font-family:Times New Roman;font-size:28px;font-weight:bold;color:#FFFFFF;">Sales Module</td>
		</tr>
		<tr><td style="height:150px;">&nbsp;</td></tr>
	  </table>
   </td>
	     </tr>
        </table>
       </td>
      </tr>
     </table>
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
</table>
</body>
</html>

