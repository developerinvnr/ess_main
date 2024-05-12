<?php session_start();
if($_SESSION['login'] = true){require_once('../AdminUser/config/config.php');}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('../AdminUser/logcheck.php');
if($_SESSION['logCheckEmp']!=$logemp){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('EmpMenuSession.php');} 

$_SESSION['mEEID']=$_REQUEST['ID']; $EmMPID=$_SESSION['mEEID'];
$SqEC=mysql_query("select EmpCode from hrm_employee where EmployeeID=".$EmMPID, $con); $ReEC=mysql_fetch_assoc($SqEC);
//**********************************

?> 
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
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
<?php /************ Check It**********/ ?>
</head>
<body class="body">
<?php 
$SqlEmp = mysql_query("SELECT * FROM hrm_employee WHERE EmployeeID=".$EmMPID, $con);  $ResEmp=mysql_fetch_assoc($SqlEmp);
$Ename = $ResEmp['Fname'].'&nbsp;'.$ResEmp['Sname'].'&nbsp;'.$ResEmp['Lname']; $LEC=strlen($ResEmp['EmpCode']); 
 if($LEC==1){$EC='000'.$ResEmp['EmpCode'];} if($LEC==2){$EC='00'.$ResEmp['EmpCode'];} if($LEC==3){$EC='0'.$ResEmp['EmpCode'];} if($LEC>=4){$EC=$ResEmp['EmpCode'];}
?>
<table class="table" border="0">
<tr><td valign="top">
      <table width="100%" style="margin-top:0px;" border="0">
	    <tr>
	        <td valign="top" align="center"  width="100%" id="MainWindow">
<?php //**********************************************START*****START*****START******START******START***************************************************************?>
  <table border="0" style="margin-top:0px; width:100%;">
 <tr>
<?php //*********************************************************************************************************************************************************?>
<td align="left" id="Eexp" valign="top" style="width:500px;"> 
<input type="hidden" id="ID" value="<?php echo $_REQUEST['ID']; ?>" />            
 <form enctype="multipart/form-data" name="formEAsst" method="post" onSubmit="return validate(this)">
<table border="0">
<tr>
 <td>
  <table>
    <tr style="height:20px;">
    <td style="font-weight:bold;height:22px;font-family:Times New Roman;font-size:14px;" valign="bottom">EmpCode :</td>
	<td style="font-weight:bold;height:22px;font-family:Times New Roman;font-size:14px;width:50px;color:#693434;" valign="bottom"><?php echo $EC; ?></td>
    <td style="font-weight:bold;height:22px;font-family:Times New Roman;font-size:14px;" valign="bottom">Name :</td>
	<td style="font-weight:bold;height:22px;font-family:Times New Roman;font-size:14px;color:#693434;" valign="bottom"><?php echo $Ename; ?></td>
    <td class="font4" style="left" valign="bottom">&nbsp;&nbsp;&nbsp;<b><span id="msgspan"><?php //echo $msg; ?></span></b></td>
    </tr>
  </table>
 </td>
</tr>
<tr> 
<td align="left" valign="top">
<table border="0" id="TEmp" style="font-weight:bold;height:22px;font-family:Times New Roman;font-size:12px;" cellpadding="1" cellspacing="0">
<?php $sql=mysql_query("select * from hrm_asset_employee where AssetEmpId=".$_REQUEST['Aei'], $con); $res=mysql_fetch_array($sql); ?>
<form name="OformEdit" method="post" onSubmit="return OvalidateEdit(this)">
<input type="hidden" name="AssetEmpId" id="AssetEmpId" value="<?php echo $_REQUEST['Aei']; ?>" />

<tr>
 <td style="width:120px;"&nbsp;>&nbsp;Asset Name</td>
 <?php $sqlAn=mysql_query("select AssetName from hrm_asset_name where AssetNId=".$res['AssetNId']); $resAn=mysql_fetch_array($sqlAn);  ?>
 <td><input style="width:120px;font-size:12px;" value="<?php echo $resAn['AssetName']; ?>" readonly/></td>
 <td style="width:120px;">&nbsp;&nbsp;&nbsp;EMI No</td>
 <td><input style="width:120px;font-size:12px;" value="<?php echo $res['AEmiNo']; ?>" readonly/></td>
</tr>
<tr>
 <td style="width:120px;"&nbsp;>&nbsp;Model No</td>
 <td><input style="width:120px;font-size:12px;" value="<?php echo $res['AModelNo']; ?>" readonly/></td>
 <td>&nbsp;&nbsp;&nbsp;Bill No</td>
 <td><input style="width:120px;font-size:12px;" value="<?php echo $res['ABillNo']; ?>" readonly/></td>
</tr>
<tr>
 <td>&nbsp;Price</td>
 <td><input style="width:120px;font-size:12px;" value="<?php echo $res['APrice']; ?>" readonly/></td>
 <td>&nbsp;&nbsp;&nbsp;Quantity</td>
 <td><input style="width:120px;font-size:12px;" value="<?php echo $res['AQuantity']; ?>" readonly/></td>
</tr>
<tr>
 <td>&nbsp;Battery Company</td>
 <td><input style="width:120px;font-size:12px;" value="<?php echo $res['ABatteryCom']; ?>" readonly/></td>
 <td>&nbsp;&nbsp;&nbsp;Battery Model</td>
 <td><input style="width:120px;font-size:12px;" value="<?php echo $res['ABatteryModel']; ?>" readonly/></td>
</tr>
<tr>
 <td valign="top">&nbsp;Identity Remark</td>
 <td colspan="3"><textarea style="width:365px;font-size:12px;"><?php echo $res['AIdentityRemark']; ?></textarea></td>
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



