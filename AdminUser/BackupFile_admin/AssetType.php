<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}
//**********************************************************************************************************************
if(isset($_POST['SaveNew']))
{  $SqlInseart = mysql_query("INSERT INTO hrm_asset_type(TypeName,Status) VALUES('".$_POST['TypeName']."', '".$_POST['Status']."')", $con); 
}
if(isset($_POST['SaveEdit']))
{ $SqlUpdate = mysql_query("UPDATE hrm_asset_type SET TypeName='".$_POST['TypeName']."', Status='".$_POST['Status']."' WHERE AssetTypeId=".$_POST['AssetTypeId'], $con); }

if(isset($_REQUEST['action']) && $_REQUEST['action']=="delete")
{ $SqlDelete=mysql_query("delete from hrm_asset_type WHERE AssetTypeId=".$_REQUEST['did'], $con) or die(mysql_error()); }


if(isset($_POST['SaveNew2']))
{  $SqlInseart = mysql_query("INSERT INTO hrm_asset_category(CategoryName,Status,CreatedBy,CreatedDate,YearId) VALUES('".$_POST['CategoryName']."', '".$_POST['Status']."', '".$UserId."','".date('Y-m-d')."','".$YearId."')", $con); 
}
if(isset($_POST['SaveEdit2']))
{ $SqlUpdate = mysql_query("UPDATE hrm_asset_category SET CategoryName='".$_POST['CategoryName']."', Status='".$_POST['Status']."', CreatedBy='".$UserId."', CreatedDate='".date('Y-m-d')."', YearId='".$YearId."' WHERE AssCategoryId=".$_POST['AssCategoryId'], $con); }

if(isset($_REQUEST['action']) && $_REQUEST['action']=="delete2")
{ $SqlDelete=mysql_query("delete from hrm_asset_category WHERE AssCategoryId=".$_REQUEST['did'], $con) or die(mysql_error()); }

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
<style> .font { color:#ffffff; font-family:Times New Roman; font-size:15px; width:200px;} .font1 { font-family:Times New Roman; font-size:12px; height:14px; width:200px; } 
.font2 { font-size:12px;width:260px;height:18px;} .font4 { color:#1FAD34; font-family:Georgia; font-size:15px;}
.span {display:none; font-family:Courier New; font-size:14px; }.span1 {display:block; font-family:Courier New; font-size:14px; }
.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;}
.SaveButton {background-image:url(images/save.gif); width:20px; height:20px; background-repeat:no-repeat; background-color:#FFFFFF; border-color:#FFFFFF; border-bottom:inherit;}
.EditSelect { font-family:Georgia; font-size:12px; height:18px;}
.EditInput { font-family:Georgia; font-size:12px; height:18px;}
.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}
</style>
<Script type="text/javascript">window.history.forward(1);</Script>
<Script>
function edit(value) { var agree=confirm("Are you sure you want to edit this record?");
if (agree) { var x = "AssetType.php?action=edit&eid="+value;  window.location=x;}}
function del(value) { var agree=confirm("Are you sure you want to delete this record?");
if (agree) { var x = "AssetType.php?action=delete&did="+value;  window.location=x;}}
function newsave() { var x = "AssetType.php?action=newsave";  window.location=x;}
</Script> 
</head>
<body class="body">
<table class="table">
<tr><td><table class="menutable"><tr><td><?php if($_SESSION['login'] = true){ require_once("AMenu.php"); } ?></td></tr></table></td></tr>
<tr>
 <td valign="top">
  <table width="100%" style="margin-top:0px;" border="0">
   <tr><td valign="top"><?php if($_SESSION['login'] = true){ require_once("AWelcome.php"); } ?></td></tr>
<?php //*********************************************** Open Type******************************************************?>   
   <tr>
	<td valign="top" align="center"  width="100%" id="MainWindow"><br>	  
    <table border="0" style="margin-top:0px; width:100%; height:300px;">
    <tr><td align="left" colspan="3"><table><tr><td align="" width="200" class="heading">&nbsp;&nbsp;&nbsp;&nbsp;Assets Type</td></tr></table></td></tr>
    <tr>
    <td width="10">&nbsp;</td>  
    <td align="left" id="type" valign="top" style="display:block; width:50%">             
     <table border="0" width="410">
	 <tr>
	 <td align="left" width="410">
	 <table border="1" width="410" border="1" bgcolor="#FFFFFF">
<tr bgcolor="#7a6189">
 <td align="center" style="font:Georgia; color:#FFFFFF; font-size:11px; width:50px;"><b>SNo</b></td>
 <td class="font" align="center" style="width:150;"><b>Type Name</b></td>
 <td style=" color:#FFFFFF; font-size:11px; width:100px; height:13px;" align="center"><b>Status</b></td>
 <td align="center" style="font:Georgia; font-size:11px; width:100px; color:#FFFFFF"><b>Action</b></td>
</tr>
<?php $sql=mysql_query("select * from hrm_asset_type", $con); $SNo=1; while($res=mysql_fetch_array($sql)) {
if(isset($_REQUEST['action']) && $_REQUEST['action']=="edit" && $_REQUEST['eid']==$res['AssetTypeId']){ ?>
<form name="OformEdit" method="post" onSubmit="return OvalidateEdit(this)">	
<tr>
 <td align="center" style="font:Georgia;font-size:12px;width:50px;" valign="top"><?php echo $SNo; ?></td>
 <td class="font" style="width:150;" align="center" valign="top"><input name="TypeName" class="EditInput" value="<?php echo $res['TypeName']; ?>" style="width:145px;"/></td>
 <td style="font-size:11px;width:100px;height:18px;" align="center" valign="top"><select name="Status" style="font-size:11px; width:99px; height:20px;">
 <option value="<?php echo $res['Status']; ?>"><?php if($res['Status']=='A'){ echo 'Active'; } else { echo 'Deactive';} ?></option>
 <option value="A">Active</option><option value="D">Deactive</option></select><input type="hidden" name="AssetTypeId" id="AssetTypeId" value="<?php echo $_REQUEST['eid']; ?>"/></td>		
 <td align="center" valign="middle" style="font:Georgia; font-size:11px; width:100px;" valign="top">
<?php if($_SESSION['User_Permission']=='Edit'){?>
<input type="submit" name="SaveEdit"  value="" class="SaveButton">
<?php } ?>
</td>
</tr>
</form> 
<?php } else { ?>	 
<tr>
 <td align="center" style="font:Times New Roman; font-size:12px; width:50px;"><?php echo $SNo; ?></td>	   
 <td class="font2" style="width:150;" align="">&nbsp;<?php echo $res['TypeName']; ?></td>
 <td style="font-size:12px; width:100px;font:Times New Roman;" align="center">&nbsp;<?php if($res['Status']=='A'){ echo 'Active'; } else { echo 'Deactive';} ?></td>
 <td align="center" valign="middle" style="font:Georgia; font-size:12px; width:100px;"><a href="#"><img src="images/edit.png" border="0" alt="Edit" onClick="edit(<?php echo $res['AssetTypeId']; ?>)"></a>&nbsp;&nbsp;<a href="#"><img src="images/delete.png" alt="Delete" border="0" onClick="del(<?php echo $res['AssetTypeId']; ?>)"></a></td>
</tr>
<?php } $SNo++;} ?>
<tr><td bgcolor="#B6E9E2" colspan="10"></td></tr>
<?php if(isset($_REQUEST['action']) && $_REQUEST['action']=="newsave"){ ?>
<form name="formEdit" method="post" onSubmit="return validateEdit(this)">
<tr>
 <td align="center" style="font:Times New Roman; font-size:11px; width:50px;"><?php echo $SNo; ?></td>
 <td class="font1" style="width:150;" align="left" align="left"><input name="TypeName" class="EditInput" value="" style="width:145px;" /></td>
 <td><select name="Status" style="font-size:13px; width:99px; height:20px;"><option value="A">Active</option><option value="D">Deactive</option></select></td>
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
      <td align="Right" class="fontButton"><table border="0" width="410"><tr><td align="right">
<input type="button" name="NewSave" id="NewSave" value="new" onClick="newsave()" <?php if($_REQUEST['action']=="newsave" OR $_REQUEST['action']=="edit"){ echo "style=display:none;"; }?>/>
<input type="button" name="back" id="back" style="width:90px;" value="back" onClick="javascript:window.location='Index.php?log=<?php echo $_SESSION['logCheckUser']; ?>'"/>
<input type="button" name="Refrash" value="refresh" onClick="javascript:window.location='AssetType.php'"/>&nbsp;
     </td></tr></table></td>
   </tr>
<?php } ?>
  </table>  
</td>
</tr>
<tr><td>&nbsp;</td></tr>
<?php //*********************************************** Close Type******************************************************?>  
<Script>
function edit2(value) { var agree=confirm("Are you sure you want to edit this record?");
if (agree) { var x = "AssetType.php?action=edit2&eid="+value;  window.location=x;}}
function del2(value) { var agree=confirm("Are you sure you want to delete this record?");
if (agree) { var x = "AssetType.php?action=delete2&did="+value;  window.location=x;}}
function newsave2() { var x = "AssetType.php?action=newsave2";  window.location=x;}
</script> 
 <tr>
  <td align="left" height="20" valign="top" colspan="3">
   <table border="0">
    <tr>
	  <td align="" class="heading">&nbsp;&nbsp;&nbsp;&nbsp;Assets Category</td>
	</tr>
   </table>
  </td>
 </tr>
 </tr>
 <tr>
 <td width="10">&nbsp;</td>
<?php //*********************************************** Open Category ******************************************************?> 
<td align="left" id="type" valign="top" style="display:block; width:50%">             
   <table border="0" width="410">
	<tr>
	  <td align="left" width="410">
	     <table border="1" width="410" border="1" bgcolor="#FFFFFF">
 <tr bgcolor="#7a6189">
   <td align="center" style="font:Georgia; color:#FFFFFF; font-size:11px; width:50px;"><b>SNo</b></td>
   <td class="font" align="center" style="width:150;"<b>Category Name</b></td>
   <td style=" color:#FFFFFF; font-size:11px; width:100px; height:13px;" align="center"><b>Status</b></td>
   <td align="center" style="font:Georgia;font-size:11px;width:100px;color:#FFFFFF"><b>Action</b></td>
 </tr>
<?php $sql2=mysql_query("select * from hrm_asset_category", $con);  $SNo2=1; while($res2=mysql_fetch_array($sql2)) {
if(isset($_REQUEST['action']) && $_REQUEST['action']=="edit2" && $_REQUEST['eid']==$res2['AssCategoryId']){ ?>
  <form name="formEdit2" method="post" onSubmit="return OvalidateEdit(this)">	
  <tr>
   <td align="center" style="font:Georgia;font-size:12px;width:50px;" valign="top"><?php echo $SNo2; ?></td>
   <td class="font" style="width:150;" align="center" valign="top">
   <input name="CategoryName" id="CategoryName" class="EditInput" value="<?php echo $res2['CategoryName']; ?>" style="width:145px;" /></td>
   <td style="font-size:11px;width:100px;height:18px;" align="center" valign="top"><select name="Status" id="Status" style="font-size:11px; width:99px; height:20px;">
   <option value="<?php echo $res2['Status']; ?>"><?php if($res2['Status']=='A'){ echo 'Active'; } else { echo 'Deactive';} ?></option>
   <option value="A">Active</option><option value="D">Deactive</option></select></td>		  
   <td align="center" valign="middle" style="font:Georgia; font-size:11px; width:100px;" valign="top">
<?php if($_SESSION['User_Permission']=='Edit'){?>
   <input type="submit" name="SaveEdit2"  value="" class="SaveButton">&nbsp;
<?php } ?>
<input type="hidden" name="AssCategoryId" id="AssCategoryId" value="<?php echo $_REQUEST['eid']; ?>"/></td>
 </tr>
		 </form>
		 
<?php } else { ?>	 
		  <tr>
		   <td align="center" style="font:Times New Roman; font-size:12px; width:50px;"><?php echo $SNo2; ?></td>	   
		   <td class="font2" style="width:150;" align="">&nbsp;<?php echo $res2['CategoryName']; ?></td>
 		   <td style="font-size:12px; width:100px;font:Times New Roman;" align="center">&nbsp;<?php if($res2['Status']=='A'){ echo 'Active'; } else { echo 'Deactive';} ?></td>
		   <td align="center" valign="middle" style="font:Georgia; font-size:12px; width:100px;"><a href="#"><img src="images/edit.png" border="0" alt="Edit" onClick="edit2(<?php echo $res2['AssCategoryId']; ?>)"></a>&nbsp;&nbsp;<a href="#"><img src="images/delete.png" alt="Delete" border="0" onClick="del2(<?php echo $res2['AssCategoryId']; ?>)"></a></td>
		 </tr>
<?php } $SNo2++;} ?>
         <tr><td bgcolor="#B6E9E2" colspan="10"></td></tr>
		 <?php if(isset($_REQUEST['action']) && $_REQUEST['action']=="newsave2"){ ?>
		 <form name="formEdit2" method="post" onSubmit="return validateEdit(this)">
	     <tr>
		   <td align="center" style="font:Times New Roman; font-size:11px; width:50px;"><?php echo $SNo2; ?></td>
		   <td class="font1" style="width:150;" align="left" align="left"><input name="CategoryName" id="CategoryName" class="EditInput" value="" style="width:145px;" /></td>
 		   <td><select name="Status" id="Status" style="font-size:13px; width:99px; height:20px;"><option value="A">Active</option><option value="D">Deactive</option></select></td>
		   <td align="center" valign="middle" style="font:Georgia; font-size:11px; width:100px;">
<?php if($_SESSION['User_Permission']=='Edit'){?>
<input type="submit" name="SaveNew2"  value="" class="SaveButton">
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
      <td align="Right" class="fontButton"><table border="0" width="410">
		<tr><td align="right">
		<input type="button" name="NewSave2" id="NewSave2" value="new" onClick="newsave2()" <?php if($_REQUEST['action']=="newsave2" OR $_REQUEST['action']=="edit2"){ echo "style=display:none;"; }?>/>
		<input type="button" name="back" id="back" style="width:90px;" value="back" onClick="javascript:window.location='Index.php?log=<?php echo $_SESSION['logCheckUser']; ?>'"/>
		<input type="button" name="Refrash" value="refresh" onClick="javascript:window.location='AssetType.php'"/>&nbsp;
			     </td>
		</tr></table>
      </td>
   </tr>
<?php } ?>
  </table>  
</td>
</tr>
<?php //*********************************************** Close Category******************************************************?>    
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
