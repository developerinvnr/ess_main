<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}
if($_SESSION['login'] = true){require_once('PhpFile/SectionP.php'); } else {$msg= "Session Expiry..............."; }
?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style> .font { color:#ffffff; font-family:Georgia; font-size:11px; width:250px;} .font4 { color:#1FAD34; font-family:Georgia; font-size:13px; height:10px;}
.span {display:none; font-family:Courier New; font-size:14px; }.span1 {display:block; font-family:Courier New; font-size:14px; }
.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;}
</style>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<script type="text/javascript" src="js/MicellaneousAjaxCall.js"></script>
<Script type="text/javascript">window.history.forward(1);</script>
<Script type="text/javascript">window.history.forward(1);
function deleteSection() { var agree=confirm("Are you sure you want to delete this record?");
if (agree) { var a = document.getElementById("SectionId").value; var x = "Section.php?action=delete&did="+a;  window.location=x;}}
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
 <td valign="top">
  <table width="100%" style="margin-top:0px;" border="0">
    <tr>
	  <td valign="top"><?php if($_SESSION['login'] = true){ require_once("AWelcome.php"); } ?></td>
	</tr>
	 <tr>
	  <td valign="top" align="center"  width="100%" id="MainWindow"><br>
<?php //************************************************************************************************************************************************************?>
<?php //**********************************************START*****START*****START******START******START***************************************************************?>
<?php //************************************************************************************************************************************************************?>
	  
<table border="0" style="margin-top:0px; width:100%; height:300px;">
 <tr>
  <td align="left" height="20" valign="top" colspan="3">
   <table border="0">
    <tr>
	  <td align="right" width="360" class="heading">Section</td>
	  <td align="left">
	    <b><span id="Vtype" class="span">: -&nbsp;Section</span></b>
	  </td>
	  <td class="font4" style="left">&nbsp;&nbsp;&nbsp;<b><?php echo $msg; ?></b></td>
	</tr>
   </table>
  </td>
 </tr>
<?php if(($_SESSION['UserType']=='S' OR $_SESSION['UserType']=='A') AND $_SESSION['login'] = true) { ?>	
 <tr>
 <td style="width:100px;" valign="top" align="center">&nbsp;
   <table border="0" cellpadding="0px;" align="center">
	<tr><td align="center">&nbsp;</td></tr>
   </table>
 </td>
 <td width="100">&nbsp;</td>
<?php //*********************************************** Open Section******************************************************?> 
<td align="left" id="type" valign="top" style="display:block;">             
  <form  name="formSection" method="post" onSubmit="return validate(this)">
   <table border="0">
   
	<tr>
	  <td align="left"><table border="0" width="550">
	    <tr>
		   <td class="td1" style="font-size:11px; width:380px;" valign="top">
		   <span id="Section">
		      <table>
			     <tr>
				   <td style="font-size:11px; height:18px;">Name :</td><td><input name="SectionName" id="SectionName" style="font-size:11px; width:150px; height:18px;"/></td>
				 </tr>
			  </table>
		   </span>
		   </td>
		   <td align="right" style="font-size:11px; width:180px;">
		                    <select style="width:180px; background-color:#F1EDF8;" name="SectionSelect" id="SectionSelect" size="8" onChange="selectSection(this.value)">
		   <?php $SqlSec=mysql_query("SELECT * FROM hrm_section where SectionStatus='A' AND CompanyId=".$CompanyId." order by SectionId ASC", $con); while($ResSec=mysql_fetch_array($SqlSec)) { ?>
							<option value="<?php echo $ResSec['SectionId']; ?>">&nbsp;<?php echo $ResSec['SectionName']; ?></option><?php } ?>
							</select></td>
		</tr></table>
	  </td>
    </tr>
	  
   <tr>
      <td align="Right" class="fontButton"><table border="0" width="550">
		<tr>
		 
		 <td align="right"><input type="submit" name="ChangeSection" id="ChangeSection" style="width:90px; display:none;" value="change"></td>
		 <td align="right" style="width:70px;"><input type="button" name="DeleteSection" id="DeleteSection" value="delete" style="width:90px; display:none;" onClick="deleteSection()">
		                                       <input type="submit" name="AddNewSection" id="AddNewSection" style="width:90px; display:block;" value="add new"></td>
											   <td align="right" style="width:80px;"><input type="button" name="back" id="back" style="width:90px;" value="back" onClick="javascript:window.location='Index.php?log=<?php echo $_SESSION['logCheckUser']; ?>'"/></td>
		 <td align="right" style="width:70px;"><input type="button" name="RefreshSection" id="RefreshSection" style="width:90px;" value="refresh" onClick="javascript:window.location='Section.php'"/></td>
		</tr></table>
      </td>
   </tr>
  </table>
 </form>     
</td>
<?php //*********************************************** Close Department******************************************************?>    

 </tr>
<?php } ?> 
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
