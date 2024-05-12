<?php require_once('config/config.php');  ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<script language="javascript" type="text/javascript">
function PrintPage(){window.print();}
</script>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" bgcolor="#E3DEEF">	
     <table style="vertical-align:top;" width="490" align="center" border="0">
<?php $sql = mysql_query("SELECT * FROM hrm_employee WHERE EmployeeID=".$_REQUEST['id'], $con) or die(mysql_error()); $res = mysql_fetch_array($sql); ?>
	 <tr>
	  <td>
	  <table border="0">
	  <tr>
	  <td style="width:480px;margin-left:5px; margin-right:5px;font-family:Times New Roman;color:#0D3039;font-size:14px;" align="" valign="top"><u><b>Employee</b></u> :-&nbsp; <b>
	  <?php echo '('.$res['EmpCode'].') - '.$res['Fname'].' '.$res['Sname']. ' '.$res['Lname']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	  <a href="#" onClick="PrintPage()" style="font-size:12px;">Print</a>
	  <br><br></b></td>
	  </tr>
	  <tr>
	     <td style="width:480px; margin-left:5px; margin-right:5px;font-family:Times New Roman;color:#0D3039;font-size:14px;" align="center" valign="top">
		 <u><b style="color:#E10000;">Profile Reason</b></u></td>
	   </tr>
	   <tr>
	     <td style="width:480px; margin-left:5px; margin-right:5px;font-family:Times New Roman;color:#0D3039;font-size:14px;" align="left" valign="top">
		 <b style="color:#0075EA;">General :</b><br><?php echo $res['EmpGen_Reason']; ?><br><br></td>
	   </tr>
	   <tr>
	     <td style="width:480px; margin-left:5px; margin-right:5px;font-family:Times New Roman;color:#0D3039;font-size:14px;" align="left" valign="top">
		 <b style="color:#0075EA;">Personal :</b><br><?php echo $res['EmpPer_Reason']; ?><br><br></td>
	   </tr>
	   <tr>
	     <td style="width:480px; margin-left:5px; margin-right:5px;font-family:Times New Roman;color:#0D3039;font-size:14px;" align="left" valign="top">
		 <b style="color:#0075EA;">Contact :</b><br><?php echo $res['EmpCon_Reason']; ?><br><br></td>
	   </tr>
	   <tr>
	     <td style="width:480px; margin-left:5px; margin-right:5px;font-family:Times New Roman;color:#0D3039;font-size:14px;" align="left" valign="top">
		 <b style="color:#0075EA;">Education :</b><br><?php echo $res['EmpEdu_Reason']; ?><br><br></td>
	   </tr>
	   <tr>
	     <td style="width:480px; margin-left:5px; margin-right:5px;font-family:Times New Roman;color:#0D3039;font-size:14px;" align="left" valign="top">
		 <b style="color:#0075EA;">Experience :</b><br><?php echo $res['EmpExp_Reason']; ?><br><br></td>
	   </tr>
	   <tr>
	     <td style="width:480px; margin-left:5px; margin-right:5px;font-family:Times New Roman;color:#0D3039;font-size:14px;" align="left" valign="top">
		 <b style="color:#0075EA;">Family :</b><br><?php echo $res['EmpFam_Reason']; ?><br><br></td>
	   </tr>
	   <tr>
	     <td style="width:480px; margin-left:5px; margin-right:5px;font-family:Times New Roman;color:#0D3039;font-size:14px;" align="left" valign="top">
		 <b style="color:#0075EA;">Language :</b><br><?php echo $res['EmpLang_Reason']; ?><br><br></td>
	   </tr>
	 </table>
	  </td>
	</tr>
  </table>
</body>
</html>