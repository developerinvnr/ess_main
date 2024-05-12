<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');}
include("../function.php");
include('codeEncDec.php');
if(check_user()==false){header('Location:../../../index.php');}
if($_SESSION['login'] = true){require_once('UserMenuSession.php');}
//**********************************************************************************************************************
if(isset($_POST['SaveNew'])){ $SqlInseart = mysql_query("INSERT INTO hrm_sales_product_activity SET ActivityName='".$_REQUEST['ActivityName']."',ActivityStatus=".$_REQUEST['ActivityStatus'], $con); }
if(isset($_POST['SaveEdit'])){ $SqlUpdate = mysql_query("UPDATE hrm_sales_product_activity SET ActivityName='".$_REQUEST['ActivityName']."',ActivityStatus=".$_REQUEST['ActivityStatus']." WHERE ActivityId=".$_REQUEST['ActivityId'], $con); }
if(isset($_REQUEST['action']) && $_REQUEST['action']=="delete")
{ $SqlDelete=mysql_query("delete from hrm_sales_product_activity WHERE ActivityId=".$_REQUEST['did'], $con); }
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
if (agree) { var x = "ProductActivity.php?action=edit&eid="+value;  window.location=x;}}
function del(value) { var agree=confirm("Are you sure you want to delete this record?");
if (agree) { var x = "ProductActivity.php?action=delete&did="+value;  window.location=x;}}
function newsave() { var x = "ProductActivity.php?action=newsave";  window.location=x;}
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
    <table border="0" style="margin-top:0px; width:100%; height:300px;">
    <tr>
    <td width="10">&nbsp;</td>  
    <td align="left" id="type" valign="top" style="display:block; width:50%">             
     <table border="0" width="650">
	 <tr><td class="heading">&nbsp;Vegetable Season</td></tr>
	 <tr>
	 <td align="left" width="500">
	 <table border="1" width="500" border="1" bgcolor="#FFFFFF">
<tr bgcolor="#808000">
 <td align="center" style="font:Georgia; color:#FFFFFF; font-size:11px; width:50px;"><b>Sr. No.</b></td>
  <td align="center" style="font:Georgia; color:#FFFFFF; font-size:11px; width:200px;"><b>Activity Name</b></td>
 <td class="font" align="center" style="width:60;"><b>Status</b></td>
 <td align="center" style="font:Georgia; font-size:11px; width:100px; color:#FFFFFF"><b>Action</b></td>
</tr>
<?php $sql=mysql_query("select * from hrm_sales_product_activity"); $SNo=1; while($res=mysql_fetch_array($sql)) {
if(isset($_REQUEST['action']) && $_REQUEST['action']=="edit" && $res['ActivityId']==$_REQUEST['eid']){ ?>
<form name="OformEdit" method="post" onSubmit="return OvalidateEdit(this)">	
<tr>
 <td align="center" style="font:Georgia;font-size:12px;" valign="top"><?php echo $SNo; ?></td>
 <td class="font" valign="top"><input name="ActivityName" class="EditInput" value="<?php echo $res['ActivityName']; ?>" style="width:225px;"/></td>
 <td align="center"><select name="ActivityStatus" class="EditInput"  style="font-family:Georgia;font-size:12px;height:22px;width:50px;">
     <option value="<?php echo $res['ActivityStatus']; ?>" selected="selected"><?php if($res['ActivityStatus']==1){echo '&nbsp;A';}else{echo '&nbsp;D';} ?></option>
	 <option value="<?php if($res['ActivityStatus']==1){echo 0;}else{echo 1;}?>"><?php if($res['ActivityStatus']==1){echo '&nbsp;D';}else{echo '&nbsp;A';} ?></option></select>
 </td>
 <td align="center" valign="middle" style="font:Georgia;font-size:11px;width:100px;" valign="top">
     <input type="hidden" name="ActivityId" value="<?php echo $res['ActivityId']; ?>" />
 <input type="submit" name="SaveEdit"  value="" class="SaveButton"></td>
</tr>
</form> 
<?php } else { ?>	 
<tr>
 <td align="center" style="font:Times New Roman; font-size:12px;"><?php echo $SNo; ?></td>	   
 <td class="font2">&nbsp;<?php echo $res['ActivityName']; ?></td>
 <td class="font2" align="center" style="font-family:Georgia;font-size:12px;width:50px;"><?php if($res['ActivityStatus']==1){echo 'Active';}else{echo 'Deactive';} ?></td>
 <td align="center" valign="middle" style="font:Georgia; font-size:12px;"><a href="#"><img src="images/edit.png" border="0" alt="Edit" onClick="edit(<?php echo $res['ActivityId']; ?>)"></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#"><img src="images/delete.png" alt="Delete" border="0" onClick="del(<?php echo $res['ActivityId']; ?>)"></a></td>
</tr>
<?php } $SNo++;} ?>
<tr><td bgcolor="#B6E9E2" colspan="10"></td></tr>
<?php if(isset($_REQUEST['action']) && $_REQUEST['action']=="newsave"){ ?>
<form name="formEdit" method="post" onSubmit="return validateEdit(this)">
<tr>
 <td align="center" style="font:Times New Roman; font-size:11px;"><?php echo $SNo; ?></td>
 <td class="font1"><input name="ActivityName" class="EditInput" value="" style="width:225px;" /></td>
 <td class="font1" align="center" style="font-family:Georgia;font-size:12px;height:22px;width:60px;"><select name="ActivityStatus" class="EditInput" style="font-family:Georgia;font-size:12px;height:22px;width:50px;"><option value="1">&nbsp;A</option><option value="0">&nbsp;D</option></select></td>
 <td align="center" valign="middle" style="font:Georgia; font-size:11px;">
    <input type="hidden" name="activity_Id" value="<?php echo $res['ActivityId']; ?>" />
    <input type="submit" name="SaveNew"  value="" class="SaveButton"></td>
</tr>
</form>
<?php } ?>
<tr>
<td colspan="4" align="right" class="fontButton">
<input type="button" name="NewSave" id="NewSave" value="new" onClick="newsave()" <?php if($_REQUEST['action']=="newsave" OR $_REQUEST['action']=="edit"){ echo "style=display:none;"; }?>/>
<input type="button" name="Refrash" value="refresh" onClick="javascript:window.location='ProductActivity.php?ac=4441&ee=4421&der=true3&c=false&d=dreefoultValue&u=UsuuerInfo&trht=FTF%%FTF1221&tt=valuased&desgn=Trern&main=FTrue%False'"/>&nbsp;
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
