<?php session_start();
if($_SESSION['login'] = true){require_once('../AdminUser/config/config.php');}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('../AdminUser/logcheck.php');
if($_SESSION['logCheckEmp']!=$logemp){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('EmpMenuSession.php');}
//**********************************
$EmMPID=$_REQUEST['ID']; $SqEC=mysql_query("select EmpCode from hrm_employee where EmployeeID=".$EmMPID, $con); $ReEC=mysql_fetch_assoc($SqEC);
//**********************************if(isset($_POST['Update']))
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
  <table border="0" style="margin-top:0px; width:100%; height:300px;">
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
 <td colspan="5" style="height:20px;color:#FFFFFF;" bgcolor="#7a6189">&nbsp;<b>Asset Name:&nbsp;<?php $sqlAn=mysql_query("select AssetName from hrm_asset_name where AssetNId=".$res['AssetNId']); $resAn=mysql_fetch_array($sqlAn); echo $resAn['AssetName']; ?></b></td>
</tr>
<tr>
 <td style="width:120px;"&nbsp;>&nbsp;Model No</td>
 <td><input name="AModelNo" id="AModelNo" class="All_120" value="<?php echo $res['AModelNo']; ?>" /></td>
 <td style="width:120px;">&nbsp;&nbsp;&nbsp;EMI No</td>
 <td><input name="AEmiNo" id="AEmiNo" class="All_150" value="<?php echo $res['AEmiNo']; ?>" /></td>
</tr>
<tr>
 <td style="width:120px;"&nbsp;>&nbsp;Processor</td>
 <td><input name="AProcessor" id="AProcessor" class="All_120" value="<?php echo $res['AProcessor']; ?>" /></td>
 <td style="width:120px;">&nbsp;&nbsp;&nbsp;HDD</td>
 <td><input name="AHDD" id="AHDD" class="All_150" value="<?php echo $res['AHDD']; ?>" /></td>
</tr>
<tr>
 <td style="width:120px;"&nbsp;>&nbsp;RAM</td>
 <td><input name="ARAM" id="ARAM" class="All_120" value="<?php echo $res['ARAM']; ?>" /></td>
 <td style="width:120px;">&nbsp;&nbsp;&nbsp;OS</td>
 <td><input name="AOS" id="AOS" class="All_150" value="<?php echo $res['AOS']; ?>" /></td>
</tr>
<tr>
 <td>&nbsp;Bill No</td>
 <td><input name="ABillNo" id="ABillNo" class="All_120" value="<?php echo $res['ABillNo']; ?>" /></td>
 <td>&nbsp;&nbsp;&nbsp;Dealer Name</td>
 <td><input name="ADealeName" id="ADealeName" class="All_150" value="<?php echo $res['ADealeName']; ?>" /></td>
</tr>
</tr>
<tr>
 <td>&nbsp;Price</td>
 <td><input name="APrice" id="APrice" class="All_120" value="<?php echo $res['APrice']; ?>" /></td>
 <td>&nbsp;&nbsp;&nbsp;Dealer ContactNo</td>
 <td><input name="ADealerContNo" id="ADealerContNo" class="All_150" value="<?php echo $res['ADealerContNo']; ?>" /></td>
</tr>
<tr>
 <td>&nbsp;Quantity</td>
 <td><input name="AQuantity" id="AQuantity" class="All_120" value="<?php echo $res['AQuantity']; ?>" /></td>
 <td>&nbsp;&nbsp;&nbsp;Dealer Email-Id</td>
 <td><input name="ADealerEmail" id="ADealerEmail" class="All_150" value="<?php echo $res['ADealerEmail']; ?>" /></td>
</tr>
<tr>
 <td>&nbsp;Battery Company</td>
 <td><input name="ABatteryCom" id="ABatteryCom" class="All_120" value="<?php echo $res['ABatteryCom']; ?>" /></td>
 <td>&nbsp;&nbsp;&nbsp;Dealer Address</td>
 <td><input name="ADealerAdd" id="ADealerAdd" class="All_150" value="<?php echo $res['ADealerAdd']; ?>" /></td>
</tr>
<tr>
 <td>&nbsp;Battery Model</td>
 <td><input name="ABatteryModel" id="ABatteryModel" class="All_120" value="<?php echo $res['ABatteryModel']; ?>" /></td>
 <td>&nbsp;&nbsp;&nbsp;Asset Identity</td>
 <td><input name="AIdentityRemark" id="AIdentityRemark" class="All_150" value="<?php echo $res['AIdentityRemark']; ?>" /></td>
</tr>
<tr>
 <td valign="top">&nbsp;Battery Expiry</td>
 <td valign="top"><input name="ABatteryExpiry" id="ABatteryExpiry" class="All_80" value="<?php if($res['ABatteryExpiry']!='0000-00-00' AND $res['ABatteryExpiry']!='1970-01-01'){ echo date("d-m-Y",strtotime($res['ABatteryExpiry'])); } ?>" readonly/></td>
 <td>&nbsp;&nbsp;&nbsp;Issu Laptop Bag</td>
 <td><input name="ALaptopBag" id="ALaptopBag" class="All_150" value="<?php echo $res['ALaptopBag']; ?>" /></td>
</tr>
<tr>
 <td valign="top">&nbsp;Any Remark</td>
 <td colspan="3"><textarea name="AnyOtherRemark" id="AnyOtherRemark" cols="40" rows="2"><?php echo $res['AnyOtherRemark']; ?></textarea></td>
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



