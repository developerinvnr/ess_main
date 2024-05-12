<?php require_once('config/config.php');  ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">	
     <table style="vertical-align:top;" width="300" align="center" border="0">
<?php $sql = mysql_query("SELECT ReplyAns_SAdmin FROM hrm_employee_hrquery WHERE QueryId=".$_REQUEST['Qid'], $con) or die(mysql_error()); $res = mysql_fetch_array($sql); ?>
	 <tr>
	  <td>
	  <table border="0">
	    <tr><td width="50" align="left" valign="top"><b><u>Reply to HR</u> :</b></td></tr>
		 <tr><td style="width:250px; height:230px; margin-left:5px; margin-right:5px;font-family:Times New Roman;color:#0D3039;font-size:14px; vertical-align:top;"><?php echo $res['ReplyAns_SAdmin']; ?></td></tr>
	 </table>
	  </td>
	</tr>
  </table>
</body>
</html>