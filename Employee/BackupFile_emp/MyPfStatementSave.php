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
</head>
<body bgcolor="#000000">
<?php $sql=mysql_query("select EmpCode From hrm_employee where EmployeeID=".$_REQUEST['ecc'], $con); $res=mysql_fetch_assoc($sql); 
      $LEC=strlen($res['EmpCode']); 
      if($LEC==1){$EC='000'.$res['EmpCode'];} if($LEC==2){$EC='00'.$res['EmpCode'];} if($LEC==3){$EC='0'.$res['EmpCode'];} if($LEC>=4){$EC=$res['EmpCode'];}
?>	
<table border="0" width="810" align="center"> 
<tr>
 <td align="center">
 <table border="0">	 
<tr><td align="center"><font color="#FFFF0F" style='font-family:Times New Roman;' size="4"><b>PF Slip 2016-2017</b></font></td></tr>
<tr><td align="center"><img src="ImgPf<?php echo $_REQUEST['cc']; ?>201617/<?php echo $EC; ?>.JPG" border="1" style="width:800px;"/></td></tr>
<tr><td align="right"><font color="#FFFFFF" style='font-family:Times New Roman;' size="3">click mouse right & select save images as</font></td></tr>
</table>
</td>
</tr>
</table>
</body>
</html>

