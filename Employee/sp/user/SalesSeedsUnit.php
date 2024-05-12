<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');}
include("../function.php");
include('codeEncDec.php');
if(check_user()==false){header('Location:../../../index.php');}
if($_SESSION['login'] = true){require_once('UserMenuSession.php');}
//**********************************************************************************************************************
if(isset($_POST['SaveNew'])){ $SqlInseart = mysql_query("INSERT INTO hrm_sales_unit(UnitName) VALUES('".$_POST['UnitName']."')", $con); }
if(isset($_POST['SaveEdit'])){ $SqlUpdate = mysql_query("UPDATE hrm_sales_unit SET UnitName='".$_POST['UnitName']."' WHERE UnitId=".$_POST['UnitId'], $con); }
if(isset($_REQUEST['action']) && $_REQUEST['action']=="delete")
{ $SqlDelete=mysql_query("delete from hrm_sales_unit WHERE UnitId=".$_REQUEST['did'], $con) or die(mysql_error()); }

if(isset($_POST['TSaveNew'])){ $SqlInseart = mysql_query("INSERT INTO hrm_sales_seedtype(TypeName) VALUES('".$_POST['TypeName']."')", $con); }
if(isset($_POST['TSaveEdit'])){ $SqlUpdate = mysql_query("UPDATE hrm_sales_seedtype SET TypeName='".$_POST['TypeName']."' WHERE TypeId=".$_POST['TypeId'], $con); }
if(isset($_REQUEST['action']) && $_REQUEST['action']=="Tdelete")
{ $SqlDelete=mysql_query("delete from hrm_sales_seedtype WHERE TypeId=".$_REQUEST['Tdid'], $con) or die(mysql_error()); }
?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<Script type="text/javascript">window.history.forward(1);</Script>
<style> .font { color:#ffffff; font-family:Times New Roman; font-size:15px; width:200px;} .font1 { font-family:Times New Roman; font-size:12px; height:14px; width:200px; } 
.font2 { font-size:12px;width:260px;height:18px;} .font4 { color:#1FAD34; font-family:Georgia; font-size:15px;}
.span {display:none; font-family:Courier New; font-size:14px; }.span1 {display:block; font-family:Courier New; font-size:14px; }
.SaveButton {background-image:url(images/save.gif); width:20px; height:20px; background-repeat:no-repeat; background-color:#FFFFFF; border-color:#FFFFFF; border-bottom:inherit;}
.EditSelect { font-family:Georgia; font-size:12px; height:18px;}
.EditInput { font-family:Georgia; font-size:12px; height:22px;}
.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}
</style>
<Script>
function edit(value) { var agree=confirm("Are you sure you want to edit this record?");
if (agree) { var x = "SalesSeedsUnit.php?action=edit&eid="+value;  window.location=x;}}
function del(value) { var agree=confirm("Are you sure you want to delete this record?");
if (agree) { var x = "SalesSeedsUnit.php?action=delete&did="+value;  window.location=x;}}
function newsave() { var x = "SalesSeedsUnit.php?action=newsave";  window.location=x;}

function Tedit(value) { var agree=confirm("Are you sure you want to edit this record?");
if (agree) { var x = "SalesSeedsUnit.php?action=Tedit&Teid="+value;  window.location=x;}}
function Tdel(value) { var agree=confirm("Are you sure you want to delete this record?");
if (agree) { var x = "SalesSeedsUnit.php?action=Tdelete&Tdid="+value;  window.location=x;}}
function Tnewsave() { var x = "SalesSeedsUnit.php?action=Tnewsave";  window.location=x;}
</Script> 
</head>
<body class="body">
<table class="table">
<tr><td><table class="menutable"><tr><td><?php if($_SESSION['login'] = true){ require_once("EMenu.php"); } ?></td></tr></table></td></tr>
<tr>
 <td valign="top">
  <table width="100%" style="margin-top:0px;" border="0">
   <tr><td valign="top"><?php if($_SESSION['login'] = true){ require_once("EWelcome.php"); } ?></td></tr>
   <tr>
	<td valign="top" align="center"  width="100%" id="MainWindow"><br>	  
    <table border="0" style="margin-top:0px; width:100%; height:200px;">
    <tr>
    <td width="10">&nbsp;</td>  
    <td align="left" id="type" valign="top" style="display:block; width:50%">             
     <table border="0" width="250">
	 <tr><td class="heading">&nbsp;Seeds Unit</td></tr>
	 <tr>
	 <td align="left" width="250">
	 <table border="1" width="250" border="1" bgcolor="#FFFFFF">
<tr bgcolor="#808000">
 <td align="center" style="font:Georgia; color:#FFFFFF; font-size:11px; width:50px;"><b>SNo</b></td>
 <td class="font" align="center" style="width:100;"><b>Unit Name</b></td>
 <td align="center" style="font:Georgia; font-size:11px; width:100px; color:#FFFFFF"><b>Action</b></td>
</tr>
<?php $sql=mysql_query("select * from hrm_sales_unit order by UnitId ASC", $con); $SNo=1; while($res=mysql_fetch_array($sql)) {
if(isset($_REQUEST['action']) && $_REQUEST['action']=="edit" && $_REQUEST['eid']==$res['UnitId']){ ?>
<form name="OformEdit" method="post" onSubmit="return OvalidateEdit(this)">	
<tr>
 <td align="center" style="font:Georgia;font-size:12px;" valign="top"><?php echo $SNo; ?></td>
 <td class="font" valign="top"><input name="UnitName" class="EditInput" value="<?php echo $res['UnitName']; ?>" style="width:100px;"/></td>
 <td align="center" valign="middle" style="font:Georgia; font-size:11px;width:100px;" valign="top">
 <input type="submit" name="SaveEdit"  value="" class="SaveButton"><input type="hidden" name="UnitId" id="UnitId" value="<?php echo $_REQUEST['eid']; ?>"/></td>
</tr>
</form> 
<?php } else { ?>	 
<tr>
 <td align="center" style="font:Times New Roman; font-size:12px;"><?php echo $SNo; ?></td>	   
 <td class="font2">&nbsp;<?php echo $res['UnitName']; ?></td>
 <td align="center" valign="middle" style="font:Georgia; font-size:12px;"><a href="#"><img src="images/edit.png" border="0" alt="Edit" onClick="edit(<?php echo $res['UnitId']; ?>)"></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#"><img src="images/delete.png" alt="Delete" border="0" onClick="del(<?php echo $res['UnitId']; ?>)"></a></td>
</tr>
<?php } $SNo++;} ?>
<tr><td bgcolor="#B6E9E2" colspan="10"></td></tr>
<?php if(isset($_REQUEST['action']) && $_REQUEST['action']=="newsave"){ ?>
<form name="formEdit" method="post" onSubmit="return validateEdit(this)">
<tr>
 <td align="center" style="font:Times New Roman; font-size:11px;"><?php echo $SNo; ?></td>
 <td class="font1"><input name="UnitName" class="EditInput" value="" style="width:100px;" /></td>
 <td align="center" valign="middle" style="font:Georgia; font-size:11px;"><input type="submit" name="SaveNew"  value="" class="SaveButton"></td>
</tr>
</form>
<?php } ?>
<tr>
 <td colspan="3" align="right" class="fontButton">
<input type="button" name="NewSave" id="NewSave" value="new" onClick="newsave()" <?php if($_REQUEST['action']=="newsave" OR $_REQUEST['action']=="edit"){ echo "style=display:none;"; }?>/>
<input type="button" name="back" id="back" style="width:90px;" value="back" onClick="javascript:window.location='Index.php?log=<?php echo $_SESSION['logCheckUser']; ?>'"/>
<input type="button" name="Refrash" value="refresh" onClick="javascript:window.location='SalesSeedsUnit.php?ac=4441&ee=4421&der=true3&c=false&d=dreefoultValue&u=UsuuerInfo&trht=FTF%%FTF1221&tt=valuased&desgn=Trern&main=FTrue%False'"/>&nbsp;
     </td>
</tr>
	  </table>
	 </td>
    </tr>
   <tr><td>&nbsp;</td></tr>
   <tr><td class="heading">Seeds Type</td></tr>
   	 <tr>
	 <td align="left" width="250">
	 <table border="1" width="250" border="1" bgcolor="#FFFFFF">
<tr bgcolor="#808000">
 <td align="center" style="font:Georgia; color:#FFFFFF; font-size:11px; width:50px;"><b>SNo</b></td>
 <td class="font" align="center" style="width:100;"><b>Type Name</b></td>
 <td align="center" style="font:Georgia; font-size:11px; width:100px; color:#FFFFFF"><b>Action</b></td>
</tr>
<?php $sql=mysql_query("select * from hrm_sales_seedtype order by TypeId ASC", $con); $TSNo=1; while($res=mysql_fetch_array($sql)) {
if(isset($_REQUEST['action']) && $_REQUEST['action']=="Tedit" && $_REQUEST['Teid']==$res['TypeId']){ ?>
<form name="OformEdit" method="post" onSubmit="return OvalidateEdit(this)">	
<tr>
 <td align="center" style="font:Georgia;font-size:12px;" valign="top"><?php echo $TSNo; ?></td>
 <td class="font" valign="top"><input name="TypeName" class="EditInput" value="<?php echo $res['TypeName']; ?>" style="width:100px;"/></td>
 <td align="center" valign="middle" style="font:Georgia; font-size:11px;width:100px;" valign="top">
 <input type="submit" name="TSaveEdit"  value="" class="SaveButton"><input type="hidden" name="TypeId" id="TypeId" value="<?php echo $_REQUEST['Teid']; ?>"/></td>
</tr>
</form> 
<?php } else { ?>	 
<tr>
 <td align="center" style="font:Times New Roman; font-size:12px;"><?php echo $TSNo; ?></td>	   
 <td class="font2">&nbsp;<?php echo $res['TypeName']; ?></td>
 <td align="center" valign="middle" style="font:Georgia; font-size:12px;"><a href="#"><img src="images/edit.png" border="0" alt="Edit" onClick="Tedit(<?php echo $res['TypeId']; ?>)"></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#"><img src="images/delete.png" alt="Delete" border="0" onClick="Tdel(<?php echo $res['TypeId']; ?>)"></a></td>
</tr>
<?php } $TSNo++;} ?>
<tr><td bgcolor="#B6E9E2" colspan="10"></td></tr>
<?php if(isset($_REQUEST['action']) && $_REQUEST['action']=="Tnewsave"){ ?>
<form name="formEdit" method="post" onSubmit="return validateEdit(this)">
<tr>
 <td align="center" style="font:Times New Roman; font-size:11px;"><?php echo $TSNo; ?></td>
 <td class="font1"><input name="TypeName" class="EditInput" value="" style="width:100px;" /></td>
 <td align="center" valign="middle" style="font:Georgia; font-size:11px;"><input type="submit" name="TSaveNew"  value="" class="SaveButton"></td>
</tr>
</form>
<?php } ?>
<tr>
 <td colspan="3" align="right" class="fontButton">
<input type="button" name="TNewSave" id="TNewSave" value="new" onClick="Tnewsave()" <?php if($_REQUEST['action']=="Tnewsave" OR $_REQUEST['action']=="Tedit"){ echo "style=display:none;"; }?>/>
<input type="button" name="Tback" id="Tback" style="width:90px;" value="back" onClick="javascript:window.location='Index.php?log=<?php echo $_SESSION['logCheckUser']; ?>'"/>
<input type="button" name="TRefrash" value="refresh" onClick="javascript:window.location='SalesSeedsUnit.php?ac=4441&ee=4421&der=true3&c=false&d=dreefoultValue&u=UsuuerInfo&trht=FTF%%FTF1221&tt=valuased&desgn=Trern&main=FTrue%False'"/>&nbsp;
     </td>
</tr>
	  </table>
	 </td>
    </tr>
  </table>  
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
