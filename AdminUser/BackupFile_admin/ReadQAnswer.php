<?php require_once('../AdminUser/config/config.php');  ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" bgcolor="#E0DBE3">	
     <table style="vertical-align:top;" width="330" align="center" border="0">
<?php $sql = mysql_query("SELECT * FROM hrm_employee_query WHERE QueryId=".$_REQUEST['Aid'], $con) or die(mysql_error()); $res = mysql_fetch_array($sql); ?>
	 <tr>
	  <td>
	  <table border="0">
	   <tr>
	     <td style="width:300px; height:250px; margin-left:5px; margin-right:5px;font-family:Times New Roman;color:#0D3039;font-size:14px;" align="left" valign="top"><u><b>
		 <?php if($_REQUEST['AC']=='P'){echo 'Reason for in-process';} if($_REQUEST['AC']=='F'){echo 'Reason for forward to HR';} if($_REQUEST['AC']=='R'){echo 'Answer';}  ?></b></u> :-&nbsp;&nbsp;&nbsp;<br/><br/>
		 <?php if($_REQUEST['UT']=='A'){ echo $res['ReplyAns_Admin']; } if($_REQUEST['UT']=='S'){ echo $res['ReplyAns_SAdmin']; }?></td>
	   </tr>
	 </table>
	  </td>
	</tr>
  </table>
</body>
</html>