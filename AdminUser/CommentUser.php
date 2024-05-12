<?php session_start();
require_once('config/config.php');
$SqlSelect=mysql_query("select User_FirstName, User_SecondName, User_LastName, Comment from hrm_user where AXAUESRUser_Id='".$_REQUEST['u']."'", $con);
$ResSelect=mysql_fetch_assoc($SqlSelect);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html><head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title><?php include_once('../Title.php'); ?></title>
<script>setTimeout('window.close()', 20000);</script>
</head>
<body bgcolor="#F3EFEB">
<table border="0" style="margin-top:opx; width:390px; height:190px;">
 <tr><td align="left" style="height:12px;">&nbsp;<b>Name :</b>&nbsp;<font color="#2F248C" style='font-family:Georgia; font-size:12px;'>&nbsp;<?php echo $ResSelect['User_FirstName'].' '.$ResSelect['User_SecondName'].' '.$ResSelect['User_LastName']; ?></font></td></tr>
 <tr><td  valign="top" align="center" style="height:2px; overflow:hidden;">**********************************************</td></tr>
 <tr><td valign="top">
   <table border="0"><tr>
          <td width="1">&nbsp;</td>
		  <td style="margin:'margin-top' 'margin-right' 'margin-bottom' 'margin-left':0px; "><font color="#006432" style='font-family:Georgia; font-size:12px;'><?php echo $ResSelect['Comment']; ?></font></td>
		  <td width="1">&nbsp;</td>
		  </tr>
   </table>
    </td>
 </tr>
</table>
</body>
</html>
