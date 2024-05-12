<?php require_once('../AdminUser/config/config.php'); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Resignation Reason</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet"/>
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" bgcolor="#D9D1E7">	
    <table style="vertical-align:top;" width="340" align="center" border="0">
	 <tr>
	  <td>
	  <table border="0">
<?php $sql=mysql_query("select Emp_Reason from hrm_employee_separation where EmpSepId=".$_REQUEST['id'], $con); $res=mysql_fetch_assoc($sql); ?>		   
	   <tr><td colspan="2" width="450" align="center" valign="top" style="font-family:Times New Roman;font-size:16px;"><b>Resignation Reason</b></td></tr>
	   <tr><td>&nbsp;</td></tr>
	   <tr><td colspan="2" style="width:450px; margin-left:5px; margin-right:5px;font-family:Times New Roman;color:#0D3039;font-size:14px; vertical-align:top;">
	   <?php echo $res['Emp_Reason']; ?></td></tr>
	 </table>
	  </td>
	</tr>
  </table>
</body>
</html>
