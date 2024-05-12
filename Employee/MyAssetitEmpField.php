<?php session_start(); require_once('../AdminUser/config/config.php'); 

if(isset($_POST['Update']))
{ 
$SqlUpdate = mysql_query("UPDATE hrm_asset_employee SET AModelNo='".$_POST['AModelNo']."', AEmiNo='".$_POST['AEmiNo']."', ABillNo='".$_POST['ABillNo']."', ADealeName='".$_POST['ADealeName']."', APrice='".$_POST['APrice']."', ADealerContNo='".$_POST['ADealerContNo']."', AQuantity='".$_POST['AQuantity']."', ADealerEmail='".$_POST['ADealerEmail']."',  	ABatteryCom='".$_POST['ABatteryCom']."', ADealerAdd='".$_POST['ADealerAdd']."', ABatteryModel='".$_POST['ABatteryModel']."', AIdentityRemark='".$_POST['AIdentityRemark']."', ABatteryExpiry='".date("Y-m-d",strtotime($_POST['ABatteryExpiry']))."', AProcessor='".$_POST['AProcessor']."', AHDD='".$_POST['AHDD']."', ARAM='".$_POST['ARAM']."', ALaptopBag='".$_POST['ALaptopBag']."', AOS='".$_POST['AOS']."', AnyOtherRemark='".$_POST['AnyOtherRemark']."' WHERE AssetEmpId=".$_POST['AssetEmpId'], $con); 
if($SqlUpdate){$msg='Record updated successfully...';}
}
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Asset Details</title>
</head>
<link type="text/css" href="css/body.css" rel="stylesheet"/>
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<link rel="stylesheet" type="text/css" href="src/css/jscal2.css"/>
<link rel="stylesheet" type="text/css" href="src/css/border-radius.css"/>
<link rel="stylesheet" type="text/css" href="src/css/steel/steel.css"/>
<script type="text/javascript" src="src/js/jscal2.js"></script>
<script type="text/javascript" src="src/js/lang/en.js"></script>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<style>
.SaveButton {background-image:url(images/save.gif); width:20px; height:20px; background-repeat:no-repeat; background-color:#FFFFFF; border-color:#FFFFFF; border-bottom:inherit;}
.EditSelect { font-family:Georgia; font-size:12px; height:18px;}
.EditInput { font-family:Georgia; font-size:12px; height:18px;}
.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}.tt{font-weight:bold;height:22px;font-family:Times New Roman;font-size:14px;color:#FFFFFF;}.dd{font-weight:bold;height:22px;font-family:Times New Roman;font-size:14px;width:50px;color:#FFFFAA;}
inp{height:20px;font-family:Times New Roman;font-size:12px;width:100%;}
</style>

<body class="body">
<?php 
$EmMPID=$_REQUEST['ID']; 
$SqlEmp = mysql_query("SELECT * FROM hrm_employee WHERE EmployeeID=".$EmMPID, $con);  $ResEmp=mysql_fetch_assoc($SqlEmp);
$Ename = $ResEmp['Fname'].'&nbsp;'.$ResEmp['Sname'].'&nbsp;'.$ResEmp['Lname']; $LEC=strlen($ResEmp['EmpCode']); 
 if($LEC==1){$EC='000'.$ResEmp['EmpCode'];} if($LEC==2){$EC='00'.$ResEmp['EmpCode'];} if($LEC==3){$EC='0'.$ResEmp['EmpCode'];} if($LEC>=4){$EC=$ResEmp['EmpCode'];}
?>

<table style="width:100%;">
<tr bgcolor="#7a6189">
 <td style="width:100%; vertical-align:middle;">
  <table style="width:100%;">
   <tr style="height:20px;">
    <td class="tt" style="width:80px;">EmpCode :</td>
	<td class="dd" style="width:80px;"><?php echo $EC; ?></td>
    <td class="tt" style="width:50px;">Name :</td>
	<td class="dd"><?php echo $Ename; ?></td>
    <td class="font4" style="left"><b><span id="msgspan"><?php //echo $msg; ?></span></b></td>
   </tr>
  </table>
 </td>
</tr>

<?php $sql=mysql_query("select * from hrm_asset_employee where AssetEmpId=".$_REQUEST['Aei'], $con); 
      $res=mysql_fetch_array($sql); ?>
<form name="OformEdit" enctype="multipart/form-data" method="post">
<input type="hidden" id="ID" value="<?php echo $_REQUEST['ID']; ?>" />
<input type="hidden" name="AssetEmpId" id="AssetEmpId" value="<?php echo $_REQUEST['Aei']; ?>" />
<tr>
 <td style="width:100%;">
  <table style="width:100%;">
   
<tr>
 <td colspan="5" style="height:20px;">&nbsp;<b>Asset Name:&nbsp;<font color="#FF8204"><?php $sqlAn=mysql_query("select AssetName from hrm_asset_name where AssetNId=".$res['AssetNId']); $resAn=mysql_fetch_array($sqlAn); echo $resAn['AssetName']; ?></font></b></td>
</tr>
<tr>
 <td style="width:120px;">&nbsp;Model No</td>
 <td><input name="AModelNo" id="AModelNo" class="inp" value="<?php echo $res['AModelNo']; ?>" /></td>
 <td style="width:120px;">EMI No</td>
 <td><input name="AEmiNo" id="AEmiNo" class="inp" value="<?php echo $res['AEmiNo']; ?>" /></td>
</tr>
<tr>
 <td>&nbsp;Processor</td>
 <td><input name="AProcessor" id="AProcessor" class="inp" value="<?php echo $res['AProcessor']; ?>" /></td>
 <td>HDD</td>
 <td><input name="AHDD" id="AHDD" class="inp" value="<?php echo $res['AHDD']; ?>" /></td>
</tr>
<tr>
 <td>&nbsp;RAM</td>
 <td><input name="ARAM" id="ARAM" class="inp" value="<?php echo $res['ARAM']; ?>" /></td>
 <td>OS</td>
 <td><input name="AOS" id="AOS" class="inp" value="<?php echo $res['AOS']; ?>" /></td>
</tr>
<tr>
 <td>&nbsp;Bill No</td>
 <td><input name="ABillNo" id="ABillNo" class="inp" value="<?php echo $res['ABillNo']; ?>" /></td>
 <td>Dealer Name</td>
 <td><input name="ADealeName" id="ADealeName" class="inp" value="<?php echo $res['ADealeName']; ?>" /></td>
</tr>
</tr>
<tr>
 <td>&nbsp;Price</td>
 <td><input name="APrice" id="APrice" class="inp" value="<?php echo $res['APrice']; ?>" /></td>
 <td>Dealer_ContactNo</td>
 <td><input name="ADealerContNo" id="ADealerContNo" class="inp" value="<?php echo $res['ADealerContNo']; ?>" /></td>
</tr>
<tr>
 <td>&nbsp;Quantity</td>
 <td><input name="AQuantity" id="AQuantity" class="inp" value="<?php echo $res['AQuantity']; ?>" /></td>
 <td>Dealer Email-Id</td>
 <td><input name="ADealerEmail" id="ADealerEmail" class="inp" value="<?php echo $res['ADealerEmail']; ?>" /></td>
</tr>
<tr>
 <td>&nbsp;Battery Company</td>
 <td><input name="ABatteryCom" id="ABatteryCom" class="inp" value="<?php echo $res['ABatteryCom']; ?>" /></td>
 <td>Dealer Address</td>
 <td><input name="ADealerAdd" id="ADealerAdd" class="inp" value="<?php echo $res['ADealerAdd']; ?>" /></td>
</tr>
<tr>
 <td>&nbsp;Battery Model</td>
 <td><input name="ABatteryModel" id="ABatteryModel" class="inp" value="<?php echo $res['ABatteryModel']; ?>" /></td>
 <td>Asset Identity</td>
 <td><input name="AIdentityRemark" id="AIdentityRemark" class="inp" value="<?php echo $res['AIdentityRemark']; ?>" /></td>
</tr>
<tr>
 <td valign="top">&nbsp;Battery Expiry</td>
 <td valign="top"><input name="ABatteryExpiry" id="ABatteryExpiry" class="All_80" value="<?php if($res['ABatteryExpiry']!='' && $res['ABatteryExpiry']!='0000-00-00' && $res['ABatteryExpiry']!='1970-01-01'){ echo date("d-m-Y",strtotime($res['ABatteryExpiry'])); }else{ echo '000-00-00'; } ?>" readonly/><button id="ABatteryExpiryBtn" class="CalenderButton"></button><script type="text/javascript">  var cal = Calendar.setup({ onSelect:  function(cal) { cal.hide()}, showTime: true }); cal.manageFields("ABatteryExpiryBtn", "ABatteryExpiry", "%d-%m-%Y"); </script></td>
 <td>Issu Laptop Bag</td>
 <td><input name="ALaptopBag" id="ALaptopBag" class="All_150" value="<?php echo $res['ALaptopBag']; ?>" /></td>
</tr>
<tr>
 <td valign="top">&nbsp;Any Remark</td>
 <td colspan="3"><textarea name="AnyOtherRemark" id="AnyOtherRemark" cols="40" rows="2"><?php echo $res['AnyOtherRemark']; ?></textarea></td>
</tr>
   
  </table>
 </td>
</tr>

<tr>
 <td style="width:100%;">
  <table border="0" style="width:100%;">
   <tr>
    <td align="Right">
	 <font style="font-family:Times New Roman;color:#008000;font-size:14px;"><b><?php echo $msg; ?></b></font></td>
	<td style="width:100px;">&nbsp;</td>
	<td align="right">
      <input type="submit" name="Update" value="Update"/>
      <input type="button" value="refresh" onClick="javascript:window.location='MyAssetitEmpField.php?act=true&mm=sas&ask=false&ww=rightProtect&we=12345&mm=er4e&r=t5t%t5s&yy=eloi&gosto=false&rigt=checkessue&mailto=promt&&ID=<?php echo $_REQUEST['ID']; ?>&Aei=<?php echo $_REQUEST['Aei']; ?>'"/>&nbsp;
    </td>
   </tr>
  </table>
 </td>
</tr>

</form>

</table>

</body>
</html>