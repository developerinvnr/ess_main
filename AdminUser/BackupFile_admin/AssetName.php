<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}
//**********************************************************************************************************************
if(isset($_POST['SaveNew']))
{  $SqlInseart = mysql_query("INSERT INTO hrm_asset_name(AssetName,AssetCode,AssetLimit,SubAssetId,AssetTypeId,ShowInEmp,Status) VALUES('".$_POST['AssetName']."', '".$_POST['AssetCode']."', '".$_POST['AssetLimit']."', '".$_POST['SubAssetId']."', '".$_POST['AssetTypeId']."', '".$_POST['ShowInEmp']."', 'A')", $con); 
}
if(isset($_POST['SaveEdit']))
{ $SqlUpdate = mysql_query("UPDATE hrm_asset_name SET AssetName='".$_POST['AssetName']."', AssetCode='".$_POST['AssetCode']."', AssetLimit='".$_POST['AssetLimit']."', SubAssetId= '".$_POST['SubAssetId']."', AssetTypeId='".$_POST['AssetTypeId']."', ShowInEmp='".$_POST['ShowInEmp']."', Status='A' WHERE AssetNId=".$_POST['AssetNId'], $con); }

if(isset($_REQUEST['action']) && $_REQUEST['action']=="delete")
{ $SqlDelete=mysql_query("delete from hrm_asset_name WHERE AssetNId=".$_REQUEST['did'], $con) or die(mysql_error()); }
?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<link rel="stylesheet" type="text/css" href="src/css/jscal2.css"/>
<link rel="stylesheet" type="text/css" href="src/css/border-radius.css"/>
<link rel="stylesheet" type="text/css" href="src/css/steel/steel.css"/>
<script type="text/javascript" src="src/js/jscal2.js"></script>
<script type="text/javascript" src="src/js/lang/en.js"></script>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<style> .font { color:#ffffff; font-family:Times New Roman; font-size:12px; width:200px;} .font1 { font-family:Times New Roman; font-size:12px; height:14px; width:200px; } 
.font2 { font-size:12px;width:260px;height:18px;} .font4 { color:#1FAD34; font-family:Georgia; font-size:15px;}
.span {display:none; font-family:Courier New; font-size:14px; }.span1 {display:block; font-family:Courier New; font-size:14px; }
.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;}
.SaveButton {background-image:url(images/save.gif); width:20px; height:20px; background-repeat:no-repeat; background-color:#FFFFFF; border-color:#FFFFFF; border-bottom:inherit;}
.EditSelect { font-family:Times New Roman; font-size:12px; height:18px;}
.EditInput { font-family:Times New Roman; font-size:12px; height:20px;}
.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}
</style>
<Script type="text/javascript">window.history.forward(1);</Script>
<Script>
function edit(value) { var agree=confirm("Are you sure you want to edit this record?");
if (agree) { var x = "AssetName.php?action=edit&eid="+value;  window.location=x;}}
function del(value) { var agree=confirm("Are you sure you want to delete this record?");
if (agree) { var x = "AssetName.php?action=delete&did="+value;  window.location=x;}}
function newsave() { var x = "AssetName.php?action=newsave";  window.location=x;}
</Script> 
</head>
<body class="body">
<table class="table">
<tr><td><table class="menutable"><tr><td><?php if($_SESSION['login'] = true){ require_once("AMenu.php"); } ?></td></tr></table></td></tr>
<tr>
 <td valign="top">
  <table style="margin-top:0px;" border="0">
   <tr><td valign="top"><?php if($_SESSION['login'] = true){ require_once("AWelcome.php"); } ?></td></tr>
   <tr>
	<td valign="top" id="MainWindow"><br>	  
    <table border="0" style="margin-top:0px;height:300px;">
    <tr>
    <td width="10">&nbsp;</td>  
    <td align="left" id="type" valign="top" style="display:block;">             
     <table border="0">
	 <tr><td class="heading">&nbsp;Assets Name</td></tr>
	 <tr>
	 <td align="left">
	 <table border="1" border="1" bgcolor="#FFFFFF">
<tr bgcolor="#7a6189">
 <td align="center" style="font:Georgia; color:#FFFFFF; font-size:11px; width:50px;"><b>SNo</b></td>
 <td class="font" align="center" style="width:200px;"><b>Asset Name</b></td>
 <td class="font" align="center" style="width:60px;"><b>Code</b></td>
 <td class="font" align="center" style="width:60px;"><b>Limit</b></td>
 <td class="font" align="center" style="width:120px;"><b>Asset Type</b></td>
 <td class="font" align="center" style="width:150px;"><b>Related Asset</b></td>
 <td class="font" align="center" style="width:60px;"><b>Block Emp</b></td>
 <td align="center" style="font:Georgia; font-size:11px;width:100px;color:#FFFFFF"><b>Action</b></td>
</tr>
<?php $sql=mysql_query("select * from hrm_asset_name order by AssetName ASC", $con); $SNo=1; while($res=mysql_fetch_array($sql)) {
if(isset($_REQUEST['action']) && $_REQUEST['action']=="edit" && $_REQUEST['eid']==$res['AssetNId']){ ?>
<form name="OformEdit" method="post" onSubmit="return OvalidateEdit(this)">
<tr>
 <td align="center" style="font:Georgia;font-size:12px;width:50px;" valign="top"><?php echo $SNo; ?></td>
 <td class="font" style="width:200;" align="center" valign="top"><input name="AssetName" class="EditInput" value="<?php echo $res['AssetName']; ?>" style="width:195px;"/></td>
 <td class="font" style="width:60;" align="center" valign="top"><input name="AssetCode" class="EditInput" value="<?php echo $res['AssetCode']; ?>" style="width:59px;" maxlength="5"/></td>
 <td class="font" style="width:60;"><input name="AssetLimit" class="EditInput" value="<?php echo intval($res['AssetLimit']); ?>" style="width:59px;text-align:right;"/></td>
 <td class="font" style="width:120;" align="center" valign="top"><select name="AssetTypeId" style="font-size:12px; width:120px; height:20px;">
<?php $sqlT=mysql_query("select TypeName from hrm_asset_type where AssetTypeId=".$res['AssetTypeId'], $con); $resT=mysql_fetch_array($sqlT); ?>
 <option value="<?php echo $res['AssetTypeId']; ?>"><?php echo $resT['TypeName']; ?></option>
<?php $sqlT2=mysql_query("select AssetTypeId,TypeName from hrm_asset_type order by TypeName ASC", $con); while($resT2=mysql_fetch_array($sqlT2)){ ?> 
 <option value="<?php echo $resT2['AssetTypeId']; ?>"><?php echo $resT2['TypeName']; ?></option><?php } ?></select></td>
 
 <td class="font" style="width:120;" align="center" valign="top"><select name="SubAssetId" style="font-size:12px; width:150px; height:20px;">
<?php if($res['SubAssetId']>0){ $sqlAs=mysql_query("select AssetName from hrm_asset_name where AssetNId=".$res['SubAssetId'], $con); $resAs=mysql_fetch_array($sqlAs); ?>
 <option value="<?php echo $res['SubAssetId']; ?>"><?php echo $resAs['AssetName']; ?></option><?php } else { ?><option value="0">Select</option><?php } ?>
<?php $sqlAs2=mysql_query("select * from hrm_asset_name order by AssetName ASC", $con); while($resAs2=mysql_fetch_array($sqlAs2)){ ?> 
 <option value="<?php echo $resAs2['AssetNId']; ?>"><?php echo $resAs2['AssetName']; ?></option><?php } ?><option value="0">NA</option></select></td>
 <td class="font" style="width:60;" align="center" valign="top"><select name="ShowInEmp" style="font-size:12px; width:50px; height:20px;">
 <option value="<?php echo $res['ShowInEmp']; ?>"><?php echo $res['ShowInEmp']; ?></option> 
 <option value="<?php if($res['ShowInEmp']=='Y'){echo 'N';}else{echo 'Y';} ?>"><?php if($res['ShowInEmp']=='Y'){echo 'N';}else{echo 'Y';} ?></option></select></td>
 <td align="center" valign="middle" style="font:Georgia;font-size:11px;width:100px;" valign="top">
<?php if($_SESSION['User_Permission']=='Edit'){?>
 <input type="submit" name="SaveEdit"  value="" class="SaveButton"><input type="hidden" name="AssetNId" id="AssetNId" value="<?php echo $_REQUEST['eid']; ?>"/>
<?php } ?>
</td>
</tr>
</form> 
<?php } else { ?>	 
<tr>
 <td align="center" style="font:Times New Roman; font-size:12px; width:50px;"><?php echo $SNo; ?></td>	   
 <td class="font2" style="width:200px;" align="">&nbsp;<?php echo $res['AssetName']; ?></td>
 <td class="font2" style="width:60px;" align="">&nbsp;<?php echo $res['AssetCode']; ?></td>
 <td class="font2" style="width:60px;" align="right"><?php echo intval($res['AssetLimit']); ?>&nbsp;</td>
<?php $sqlT=mysql_query("select TypeName from hrm_asset_type where AssetTypeId=".$res['AssetTypeId'], $con); $resT=mysql_fetch_array($sqlT); ?> 
 <td class="font2" style="width:120px;" align="">&nbsp;<?php echo $resT['TypeName']; ?></td>
<?php $sqlAs=mysql_query("select AssetName from hrm_asset_name where AssetNId=".$res['SubAssetId'], $con); $resAs=mysql_fetch_array($sqlAs); ?> 
 <td class="font2" style="width:150px;" align="">&nbsp;<?php echo $resAs['AssetName']; ?></td>
 <td class="font2" style="width:60px;" align="center">&nbsp;<?php echo $res['ShowInEmp']; ?></td>
 <td align="center" valign="middle" style="font:Georgia; font-size:12px; width:100px;">
<?php if($_SESSION['User_Permission']=='Edit'){ ?>
<a href="#"><img src="images/edit.png" border="0" alt="Edit" onClick="edit(<?php echo $res['AssetNId']; ?>)"></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#"><img src="images/delete.png" alt="Delete" border="0" onClick="del(<?php echo $res['AssetNId']; ?>)"></a>
<?php } ?>
</td>
</tr>
<?php } $SNo++;} ?>
<tr><td bgcolor="#B6E9E2" colspan="10"></td></tr>
<?php if(isset($_REQUEST['action']) && $_REQUEST['action']=="newsave"){ ?>
<form name="formEdit" method="post" onSubmit="return validateEdit(this)">
<tr>
 <td align="center" style="font:Times New Roman; font-size:11px; width:50px;"><?php echo $SNo; ?></td>
 <td class="font1" style="width:200px;" align="left"><input name="AssetName" class="EditInput" value="" style="width:195px;" /></td>
 <td class="font1" style="width:60px;" align="left"><input name="AssetCode" class="EditInput" value="" style="width:55px;" maxlength="5" /></td>
 <td class="font" style="width:60;"><input name="AssetLimit" class="EditInput" value="" style="width:59px;text-align:right;"/></td>
 <td class="font" style="width:120px;" align="center" valign="top"><select name="AssetTypeId" style="font-size:12px; width:120px; height:20px;">
<?php $sqlT2=mysql_query("select AssetTypeId,TypeName from hrm_asset_type order by TypeName ASC", $con); while($resT2=mysql_fetch_array($sqlT2)){ ?> 
 <option value="<?php echo $resT2['AssetTypeId']; ?>"><?php echo $resT2['TypeName']; ?></option><?php } ?></select></td>
 <td class="font" style="width:120;" align="center" valign="top"><select name="SubAssetId" style="font-size:12px; width:150px; height:20px;">
<?php if($res['SubAssetId']>0){ $sqlAs=mysql_query("select AssetName from hrm_asset_name where AssetNId=".$res['SubAssetId'], $con); $resAs=mysql_fetch_array($sqlAs); ?>
 <option value="<?php echo $res['SubAssetId']; ?>"><?php echo $resAs['AssetName']; ?></option><?php } else { ?><option value="0">Select</option><?php } ?>
<?php $sqlAs2=mysql_query("select * from hrm_asset_name order by AssetName ASC", $con); while($resAs2=mysql_fetch_array($sqlAs2)){ ?> 
 <option value="<?php echo $resAs2['AssetNId']; ?>"><?php echo $resAs2['AssetName']; ?></option><?php } ?><option value="0">NA</option></select></td>
 <td class="font" style="width:60;" align="center" valign="top"><select name="ShowInEmp" style="font-size:12px; width:50px; height:20px;">
 <option value="Y">Y</option><option value="N">N</option></select></td>
 <td align="center" valign="middle" style="font:Georgia; font-size:11px; width:100px;">
<?php if($_SESSION['User_Permission']=='Edit'){?>
<input type="submit" name="SaveNew"  value="" class="SaveButton">
<?php } ?>
</td>
</tr>
</form>
<?php } ?>
	  </table>
	 </td>
    </tr>
<?php if($_SESSION['User_Permission']=='Edit'){?>
   <tr>
      <td align="Right" class="fontButton"><table border="0"><tr><td align="right">
<input type="button" name="NewSave" id="NewSave" value="new" onClick="newsave()" <?php if($_REQUEST['action']=="newsave" OR $_REQUEST['action']=="edit"){ echo "style=display:none;"; }?>/>
<input type="button" name="back" id="back" style="width:90px;" value="back" onClick="javascript:window.location='Index.php?log=<?php echo $_SESSION['logCheckUser']; ?>'"/>
<input type="button" name="Refrash" value="refresh" onClick="javascript:window.location='AssetName.php'"/>&nbsp;
     </td></tr></table></td>
   </tr>
<?php } ?>
  </table>  
</td>
</tr>
</table>
	  </td>
	</tr>
	
	<tr>
	  <td valign="top" align="center">
	    <table border="0" style="margin-top:0px;">
				<tr>
	              <td align="center"><img src="images/home1.png"></td>
				</tr>
	    </table>
	  </td>
	</tr>
	<tr>
	  <td valign="top">
	    <?php require_once("../footer.php"); ?>
	  </td>
	</tr>
  </table>
 </td>
</tr>
</table>
</body>
</html>
