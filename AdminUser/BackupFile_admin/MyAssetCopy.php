<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
date_default_timezone_set('Asia/Kolkata');
?> 
<html>
<head>
<title>Asset Details Copy</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet"/>
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<link rel="stylesheet" type="text/css" href="src/css/jscal2.css"/>
<link rel="stylesheet" type="text/css" href="src/css/border-radius.css"/>
<link rel="stylesheet" type="text/css" href="src/css/steel/steel.css"/>
<style>
.SaveButton {background-image:url(images/save.gif); width:20px; height:20px; background-repeat:no-repeat; background-color:#FFFFFF; border-color:#FFFFFF; border-bottom:inherit;}
.EditSelect { font-family:Georgia; font-size:12px; height:18px;}
.EditInput { font-family:Georgia; font-size:12px; height:18px;}
.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}
</style>
<script type="text/javascript" src="src/js/jscal2.js"></script>
<script type="text/javascript" src="src/js/lang/en.js"></script>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<script type="text/javascript" language="javascript">
function PrintPage(){ document.getElementById("pSpan").style.color='#E0DBE3'; window.print();}
</script>
<?php /************ Check It**********/ ?>
</head>
<body class="body">
<table class="table" border="0">
<tr><td valign="top">
      <table width="100%" style="margin-top:0px;" border="0">
	    <tr>
	        <td valign="top" align="center"  width="100%" id="MainWindow">
<?php //**********************************************START*****START*****START******START******START***************************************************************?>
  <table border="0" style="margin-top:0px; width:100%; height:300px;">
 <tr>
<?php //*********************************************************************************************************************************************************?>
<td align="center" id="Eexp" valign="top" style="width:500px;height:100%;"> 
<table border="0" style="width:100%;height:100%;">
<tr>
 <td align="right">
 <a href="#" onClick="PrintPage()" style="text-decoration:none;"><span id="pSpan" style="font-family:Times New Roman;font-size:12px;color:#004080;">Print</span></a>
 </td>
</tr>
<tr><td></td></tr>
<tr>
 <td style="width:100%;height:100%;">
 <?php $extension = end(explode(".", $_REQUEST['value'])); ?>     
  <table style="width:100%;height:100%;">
    <tr>
     <td style="font-weight:bold;height:22px;font-family:Times New Roman;font-size:14px;"width:100%;height:100%;" valign="middle" align="center">
         
     <?php if($extension=='pdf'){?>
      <iframe src="../Employee/AssetReqUploadFile/<?php echo $_REQUEST['value'] ?>" width="500" height="500"></iframe>
     <?php }else{ ?>
      <img src="../Employee/AssetReqUploadFile/<?php echo $_REQUEST['value'] ?>" border="0" />
     <?php } ?>     
    
    <?php /*     
	 <img src="../Employee/AssetReqUploadFile/<?php echo $_REQUEST['value'] ?>" border="0" /> */ ?>
	 </td>
    </tr>
  </table>
 </td>
</tr>
  </table>  
</td>
</tr>
</form> 	

</table>
</td>
</tr>
</table>
</form>  
</td>
</tr> 
</table>
	  </td>
	</tr>
  </table>
 </td>
</tr>
</table>
</body>
</html>



