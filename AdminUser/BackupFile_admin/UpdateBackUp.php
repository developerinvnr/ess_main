<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
include('codeEncDec.php');
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}

if(isset($_POST['BackRe']))
{
    $dir = 'Back/';
    $filename = 'vnrseed2_hrims_'.date("d-m-Y").'.sql';
	unlink($dir.$filename);   
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
<script language="javascript" type="text/javascript">
function FunBackup(v)
{  
  if(v==1){var msg='ess';}else if(v==2){var msg='cashbook';}else if(v==3){var msg='master';}else if(v==4){var msg='seedpro';}
  var agree=confirm("Are you sure, you want to create '"+msg+"' backup file?"); 
  if(agree){ window.open("UpdateBackUpSql.php?Act=BackUpDBFile&v="+v,"QForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=50,height=50"); } 
  else { return false; } 
}
</script>
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
<table border="0" style="margin-top:0px; width:100%; height:100px;">
    <tr>
	  <td align=""><table><tr><td class="font4" colspan="2" align="center"><b><?php echo $msg; ?></b></td></table></td>
	</tr>
	<tr>
	  <td align="" colspan="3" valign="top">
	  <?php if(($_SESSION['UserType']=='S' OR $_SESSION['UserType']=='A' OR $_SESSION['UserType']=='U') AND $_SESSION['login'] = true) { ?>
	  <form enctype="multipart/form-data" name="form" method="post"  onSubmit="return validate(this)">
		 <table border="0" cellspacing="3" cellpadding="0">
		    <tr>
			 <td colspan="2" align="" class="heading" style="font-size:14px;">&nbsp;</td>
			 <td colspan="2"  align=""><input type="button" id="BackUp" name="BackUp" onClick="FunBackup(1)" value="ESS Backup" style="width:150px;"/></td>
			</tr>
			<tr>
			 <td colspan="2" align="" class="heading" style="font-size:14px;">&nbsp;</td>
			 <td colspan="2"  align=""><input type="button" id="BackUp" name="BackUp" onClick="FunBackup(2)" value="Cashbook Backup" style="width:150px;"/></td>
			</tr>
            <tr>
			 <td colspan="2" align="" class="heading" style="font-size:14px;">&nbsp;</td>
			 <td colspan="2"  align=""><input type="button" id="BackUp" name="BackUp" onClick="FunBackup(3)" value="Masters Backup" style="width:150px;"/></td>
			</tr>
			<tr>
			 <td colspan="2" align="" class="heading" style="font-size:14px;">&nbsp;</td>
			 <td colspan="2"  align=""><input type="button" id="BackUp" name="BackUp" onClick="FunBackup(4)" value="SeedPro Backup" style="width:150px;"/></td>
			</tr>
			<tr>
			 <td colspan="2" align="" class="heading" style="font-size:14px;">&nbsp;Click Next</td>
			 <td colspan="2"  align=""><input type="submit" id="BackRe" name="BackRe" value="Click To Next" style="width:150px;" disabled="disabled"/></td>
			</tr>
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
	<tr><td style="height:200px;">&nbsp;</td></tr>
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