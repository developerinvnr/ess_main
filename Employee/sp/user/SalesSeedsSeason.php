<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');}
include("../function.php");
include('codeEncDec.php');
if(check_user()==false){header('Location:../../../index.php');}
if($_SESSION['login'] = true){require_once('UserMenuSession.php');}
//**********************************************************************************************************************
if(isset($_POST['SaveNew'])){ $SqlInseart = mysql_query("INSERT INTO hrm_sales_season(GroupId,SeasonName,Start_Month) VALUES(1,'".$_POST['SeasonName']."','".$_POST['StMonth']."')", $con); }
if(isset($_POST['SaveEdit'])){ $SqlUpdate = mysql_query("UPDATE hrm_sales_season SET SeasonName='".$_POST['SeasonName']."', Start_Month='".$_POST['StMonth']."' WHERE SeasonId=".$_POST['SeasonId'], $con); }
if(isset($_REQUEST['action']) && $_REQUEST['action']=="delete")
{ $SqlDelete=mysql_query("delete from hrm_sales_season WHERE SeasonId=".$_REQUEST['did'], $con) or die(mysql_error()); }

if(isset($_POST['SaveNew2'])){$SqlInseart = mysql_query("INSERT INTO hrm_sales_season(GroupId,SeasonName,Start_Month) VALUES(2,'".$_POST['SeasonName']."','".$_POST['StMonth']."')", $con); }
if(isset($_POST['SaveEdit2'])){$SqlUpdate = mysql_query("UPDATE hrm_sales_season SET SeasonName='".$_POST['SeasonName']."', Start_Month='".$_POST['StMonth']."' WHERE SeasonId=".$_POST['SeasonId'], $con); }
if(isset($_REQUEST['action']) && $_REQUEST['action']=="delete2")
{ $SqlDelete=mysql_query("delete from hrm_sales_season WHERE SeasonId=".$_REQUEST['did'], $con) or die(mysql_error()); }
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
if (agree) { var x = "SalesSeedsSeason.php?action=edit&eid="+value;  window.location=x;}}
function del(value) { var agree=confirm("Are you sure you want to delete this record?");
if (agree) { var x = "SalesSeedsSeason.php?action=delete&did="+value;  window.location=x;}}
function newsave() { var x = "SalesSeedsSeason.php?action=newsave";  window.location=x;}

function edit2(value) { var agree=confirm("Are you sure you want to edit this record?");
if (agree) { var x = "SalesSeedsSeason.php?action=edit2&eid="+value;  window.location=x;}}
function del2(value) { var agree=confirm("Are you sure you want to delete this record?");
if (agree) { var x = "SalesSeedsSeason.php?action=delete2&did="+value;  window.location=x;}}
function newsave2() { var x = "SalesSeedsSeason.php?action=newsave2";  window.location=x;}
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
 <td align="center" style="font:Georgia; color:#FFFFFF; font-size:11px; width:50px;"><b>SNo</b></td>
  <td align="center" style="font:Georgia; color:#FFFFFF; font-size:11px; width:200px;"><b>Season</b></td>
 <td class="font" align="center" style="width:150px;"><b>Start Month</b></td>
 <td align="center" style="font:Georgia; font-size:11px; width:100px; color:#FFFFFF"><b>Action</b></td>
</tr>
<?php $sql=mysql_query("select * from hrm_sales_season where GroupId=1 order by SeasonId ASC", $con); $SNo=1; while($res=mysql_fetch_array($sql)) {
if(isset($_REQUEST['action']) && $_REQUEST['action']=="edit" && $_REQUEST['eid']==$res['SeasonId']){ ?>
<form name="OformEdit" method="post" onSubmit="return OvalidateEdit(this)">	
<tr>
 <td align="center" style="font:Georgia;font-size:12px;" valign="top"><?php echo $SNo; ?></td>
 <td class="font" valign="top"><input name="SeasonName" class="EditInput" value="<?php echo $res['SeasonName']; ?>" style="width:195px;"/></td>
 <td><select name="StMonth" class="EditInput" style="width:150px;"><option value="<?php echo $res['Start_Month']; ?>"><?php if($res['Start_Month']==1){echo 'January';}elseif($res['Start_Month']==2){echo 'February';}elseif($res['Start_Month']==3){echo 'March';}elseif($res['Start_Month']==4){echo 'April';}elseif($res['Start_Month']==5){echo 'May';}elseif($res['Start_Month']==6){echo 'June';}elseif($res['Start_Month']==7){echo 'July';}elseif($res['Start_Month']==8){echo 'August';}elseif($res['Start_Month']==9){echo 'September';}elseif($res['Start_Month']==10){echo 'October';}elseif($res['Start_Month']==11){echo 'November';}elseif($res['Start_Month']==12){echo 'December';} ?></option>
 <option value="1">January</option><option value="2">February</option><option value="3">March</option><option value="4">April</option><option value="5">May</option><option value="6">June</option><option value="7">July</option><option value="8">August</option><option value="9">September</option><option value="10">October</option><option value="11">November</option><option value="12">December</option></select></td>
 <td align="center" valign="middle" style="font:Georgia; font-size:11px;width:100px;" valign="top">
 <input type="submit" name="SaveEdit"  value="" class="SaveButton"><input type="hidden" name="SeasonId" id="SeasonId" value="<?php echo $_REQUEST['eid']; ?>"/></td>
</tr>
</form> 
<?php } else { ?>	 
<tr>
 <td align="center" style="font:Times New Roman; font-size:12px;"><?php echo $SNo; ?></td>	   
 <td class="font2" style="font-family:Georgia; font-size:12px; height:22px;">&nbsp;<?php echo $res['SeasonName']; ?></td>
 <td class="font2" style="font-family:Georgia; font-size:12px; height:22px;">&nbsp;<?php if($res['Start_Month']==1){echo 'January';}elseif($res['Start_Month']==2){echo 'February';}elseif($res['Start_Month']==3){echo 'March';}elseif($res['Start_Month']==4){echo 'April';}elseif($res['Start_Month']==5){echo 'May';}elseif($res['Start_Month']==6){echo 'June';}elseif($res['Start_Month']==7){echo 'July';}elseif($res['Start_Month']==8){echo 'August';}elseif($res['Start_Month']==9){echo 'September';}elseif($res['Start_Month']==10){echo 'October';}elseif($res['Start_Month']==11){echo 'November';}elseif($res['Start_Month']==12){echo 'December';} ?></td>
 <td align="center" valign="middle" style="font:Georgia; font-size:12px;"><a href="#"><img src="images/edit.png" border="0" alt="Edit" onClick="edit(<?php echo $res['SeasonId']; ?>)"></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#"><img src="images/delete.png" alt="Delete" border="0" onClick="del(<?php echo $res['SeasonId']; ?>)"></a></td>
</tr>
<?php } $SNo++;} ?>
<tr><td bgcolor="#B6E9E2" colspan="10"></td></tr>
<?php if(isset($_REQUEST['action']) && $_REQUEST['action']=="newsave"){ ?>
<form name="formEdit" method="post" onSubmit="return validateEdit(this)">
<tr>
 <td align="center" style="font:Times New Roman; font-size:11px;"><?php echo $SNo; ?></td>
 <td class="font1"><input name="SeasonName" class="EditInput" value="" style="width:195px;" /></td>
 <td class="font1"><select name="StMonth" class="EditInput" style="width:150px;"><option value="1">January</option><option value="2">February</option><option value="3">March</option><option value="4">April</option><option value="5">May</option><option value="6">June</option><option value="7">July</option><option value="8">August</option><option value="9">September</option><option value="10">October</option><option value="11">November</option><option value="12">December</option></select></td>
 <td align="center" valign="middle" style="font:Georgia; font-size:11px;"><input type="submit" name="SaveNew"  value="" class="SaveButton"></td>
</tr>
</form>
<?php } ?>
<tr>
<td colspan="4" align="right" class="fontButton">
<input type="button" name="NewSave" id="NewSave" value="new" onClick="newsave()" <?php if($_REQUEST['action']=="newsave" OR $_REQUEST['action']=="edit"){ echo "style=display:none;"; }?>/>
<input type="button" name="back" id="back" style="width:90px;" value="back" onClick="javascript:window.location='Index.php?log=<?php echo $_SESSION['logCheckUser']; ?>'"/>
<input type="button" name="Refrash" value="refresh" onClick="javascript:window.location='SalesSeedsSeason.php?ac=4441&ee=4421&der=true3&c=false&d=dreefoultValue&u=UsuuerInfo&trht=FTF%%FTF1221&tt=valuased&desgn=Trern&main=FTrue%False'"/>&nbsp;
</td>
</tr>
	  </table>
	 </td>
    </tr>
  </table>  
</td>
</tr>
<tr><td>&nbsp;</td></tr>
 <tr>
    <td width="10">&nbsp;</td>  
    <td align="left" id="type" valign="top" style="display:block; width:50%">             
     <table border="0" width="500">
	 <tr><td class="heading">&nbsp;Cereal Season</td></tr>
	 <tr>
	 <td align="left" width="500">
	 <table border="1" width="500" border="1" bgcolor="#FFFFFF">
<tr bgcolor="#808000">
 <td align="center" style="font:Georgia; color:#FFFFFF; font-size:11px; width:50px;"><b>SNo</b></td>
  <td align="center" style="font:Georgia; color:#FFFFFF; font-size:11px; width:200px;"><b>Season</b></td>
 <td class="font" align="center" style="width:150;"><b>Start Month</b></td>
 <td align="center" style="font:Georgia; font-size:11px; width:100px; color:#FFFFFF"><b>Action</b></td>
</tr>
<?php $sql=mysql_query("select * from hrm_sales_season where GroupId=2 order by SeasonId ASC", $con); $SNo=1; while($res=mysql_fetch_array($sql)) {
if(isset($_REQUEST['action']) && $_REQUEST['action']=="edit2" && $_REQUEST['eid']==$res['SeasonId']){ ?>
<form name="OformEdit" method="post" onSubmit="return OvalidateEdit(this)">	
<tr>
 <td align="center" style="font:Georgia;font-size:12px;" valign="top"><?php echo $SNo; ?></td>
 <td class="font" valign="top"><input name="SeasonName" class="EditInput" value="<?php echo $res['SeasonName']; ?>" style="width:195px;"/></td>
 <td><select name="StMonth" class="EditInput" style="width:150px;"><option value="<?php echo $res['Start_Month']; ?>"><?php if($res['Start_Month']==1){echo 'January';}elseif($res['Start_Month']==2){echo 'February';}elseif($res['Start_Month']==3){echo 'March';}elseif($res['Start_Month']==4){echo 'April';}elseif($res['Start_Month']==5){echo 'May';}elseif($res['Start_Month']==6){echo 'June';}elseif($res['Start_Month']==7){echo 'July';}elseif($res['Start_Month']==8){echo 'August';}elseif($res['Start_Month']==9){echo 'September';}elseif($res['Start_Month']==10){echo 'October';}elseif($res['Start_Month']==11){echo 'November';}elseif($res['Start_Month']==12){echo 'December';} ?></option>
 <option value="1">January</option><option value="2">February</option><option value="3">March</option><option value="4">April</option><option value="5">May</option><option value="6">June</option><option value="7">July</option><option value="8">August</option><option value="9">September</option><option value="10">October</option><option value="11">November</option><option value="12">December</option></select></td>
 <td align="center" valign="middle" style="font:Georgia; font-size:11px;width:100px;" valign="top">
 <input type="submit" name="SaveEdit"  value="" class="SaveButton"><input type="hidden" name="SeasonId" id="SeasonId" value="<?php echo $_REQUEST['eid']; ?>"/></td>
</tr>
</form> 
<?php } else { ?>	 
<tr>
 <td align="center" style="font:Times New Roman; font-size:12px;"><?php echo $SNo; ?></td>	   
 <td class="font2" style="font-family:Georgia; font-size:12px; height:22px;">&nbsp;<?php echo $res['SeasonName']; ?></td>
 <td class="font2" style="font-family:Georgia; font-size:12px; height:22px;">&nbsp;<?php if($res['Start_Month']==1){echo 'January';}elseif($res['Start_Month']==2){echo 'February';}elseif($res['Start_Month']==3){echo 'March';}elseif($res['Start_Month']==4){echo 'April';}elseif($res['Start_Month']==5){echo 'May';}elseif($res['Start_Month']==6){echo 'June';}elseif($res['Start_Month']==7){echo 'July';}elseif($res['Start_Month']==8){echo 'August';}elseif($res['Start_Month']==9){echo 'September';}elseif($res['Start_Month']==10){echo 'October';}elseif($res['Start_Month']==11){echo 'November';}elseif($res['Start_Month']==12){echo 'December';} ?></td>
 <td align="center" valign="middle" style="font:Georgia; font-size:12px;"><a href="#"><img src="images/edit.png" border="0" alt="Edit" onClick="edit2(<?php echo $res['SeasonId']; ?>)"></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#"><img src="images/delete.png" alt="Delete" border="0" onClick="del2(<?php echo $res['SeasonId']; ?>)"></a></td>
</tr>
<?php } $SNo++;} ?>
<tr><td bgcolor="#B6E9E2" colspan="10"></td></tr>
<?php if(isset($_REQUEST['action']) && $_REQUEST['action']=="newsave2"){ ?>
<form name="formEdit" method="post" onSubmit="return validateEdit(this)">
<tr>
 <td align="center" style="font:Times New Roman; font-size:11px;"><?php echo $SNo; ?></td>
 <td class="font1"><input name="SeasonName" class="EditInput" value="" style="width:195px;" /></td>
 <td class="font1"><select name="StMonth" class="EditInput" style="width:150px;"><option value="1">January</option><option value="2">February</option><option value="3">March</option><option value="4">April</option><option value="5">May</option><option value="6">June</option><option value="7">July</option><option value="8">August</option><option value="9">September</option><option value="10">October</option><option value="11">November</option><option value="12">December</option></select></td>
 <td align="center" valign="middle" style="font:Georgia; font-size:11px;"><input type="submit" name="SaveNew2"  value="" class="SaveButton"></td>
</tr>
</form>
<?php } ?>
<tr>
<td colspan="4" align="right" class="fontButton">
<input type="button" name="NewSave" id="NewSave" value="new" onClick="newsave2()" <?php if($_REQUEST['action']=="newsave2" OR $_REQUEST['action']=="edit2"){ echo "style=display:none;"; }?>/>
<input type="button" name="back" id="back" style="width:90px;" value="back" onClick="javascript:window.location='Index.php?log=<?php echo $_SESSION['logCheckUser']; ?>'"/>
<input type="button" name="Refrash" value="refresh" onClick="javascript:window.location='SalesSeedsSeason.php?ac=4441&ee=4421&der=true3&c=false&d=dreefoultValue&u=UsuuerInfo&trht=FTF%%FTF1221&tt=valuased&desgn=Trern&main=FTrue%False'"/>&nbsp;
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
