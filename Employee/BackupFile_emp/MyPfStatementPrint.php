<?php session_start(); 
if($_SESSION['login'] = true){require_once('../AdminUser/config/config.php');}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('../AdminUser/logcheck.php');
if($_SESSION['logCheckEmp']!=$logemp){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('EmpMenuSession.php');}
?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>

<style>.font { color:#ffffff; font-family:Georgia; font-size:11px; width:200px;} .font1 { font-family:Georgia; font-size:11px; height:14px; } 
.font2 { font-size:11px;width:260px;height:18px;}.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;} .TableHead { font-family:Times New Roman; color:#FFFFFF; font-size:15px; }
.TableHead1 { font-family:Times New Roman; color:#000000; background-color:#FFFFFF; font-size:13px; overflow:hidden; } .InputText {font-family:Times New Roman; font-size:12px; width:100px; height:19px; }
.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}</style>
<Script type="text/javascript">window.history.forward(1);</Script>
<script type="text/javascript" language="javascript">
function PrintP(){ window.print(); window.close(); 
}
</script>
</head>
<body class="body" onLoad="PrintP()">
<table class="table">
<tr>
 <td>
  <table width="100%" style="margin-top:0px;">
	 <tr>
	  <td valign="top">
	     <table border="0" style="width:100%;float:none;" cellpadding="0">
		  <tr>
		   <td valign="top"> 
 <table border="0" id="Activity">
  <tr>
	  <td align="left" width="850" valign="top">
	   <table border="0" width="1000">
	   <tr><td style="height:20px;">&nbsp;</td></tr>
		<tr>
		 <td>
		 <table border="0">	 
<?php $sql=mysql_query("select EmpCode From hrm_employee where EmployeeID=".$_REQUEST['ecc'], $con); $res=mysql_fetch_assoc($sql); 
      $LEC=strlen($res['EmpCode']); 
      if($LEC==1){$EC='000'.$res['EmpCode'];} if($LEC==2){$EC='00'.$res['EmpCode'];} if($LEC==3){$EC='0'.$res['EmpCode'];} if($LEC>=4){$EC=$res['EmpCode'];}
?>			 
<tr><td align="center" style="width:340px;"><font color="#106809" style='font-family:Times New Roman;' size="4"><b>PF Slip 2016-2017</b></font></td></tr>
<tr><td colspan="3" align="center"><img src="ImgPf<?php echo $_REQUEST['cc']; ?>201617/<?php echo $EC; ?>.JPG" border="1" style="width:900px;"/></td></tr>

		</table>
	  </td>
	</tr>
	
	<tr><td valign="top" align="center">&nbsp;</td></tr>
  </table>
 </td>
</tr>
</table>
</body>
</html>

