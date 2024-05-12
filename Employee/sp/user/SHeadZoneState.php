<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');}
include("../function.php");
include('codeEncDec.php');
if(check_user()==false){header('Location:../../../index.php');}
if($_SESSION['login'] = true){require_once('UserMenuSession.php');}
//**********************************************************************************************************************
if(isset($_POST['SaveEdit'])){ $SqlUpdate = mysql_query("UPDATE hrm_state SET StateCode='".$_POST['SC']."', ZoneId='".$_POST['ZoneId']."' WHERE StateId=".$_POST['StateId'], $con); }
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
.EditInput { font-family:Georgia; font-size:12px; height:18px;}
.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}
.inner_table { height:450px;overflow-y:auto;width:auto; }
</style>
<Script>
function edit(value) { var agree=confirm("Are you sure you want to edit this record?");
if (agree) { var x = "SHeadZoneState.php?action=edit&eid="+value;  window.location=x;}}
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
	<td valign="top"  width="100%" id="MainWindow"><br>
    <table border="0" style="margin-top:0px; width:100%; height:300px;">
    <tr>
    <td align="left" id="type" valign="top" style="display:block; width:50%">             
     <table border="0">
	 <tr><td class="heading">&nbsp;Zone-State</td></tr>
	 <tr>
	 <td align="left">
	 <table border="1" border="1" bgcolor="#FFFFFF">
<tr bgcolor="#808000">
 <td align="center" style="font:Georgia; color:#FFFFFF; font-size:11px; width:50px;"><b>SNo</b></td>
 <td class="font" align="center" style="width:200;"><b>State</b></td>
 <td class="font" align="center" style="width:100;"><b>StateCode</b></td>
 <td class="font" align="center" style="width:150;"><b>Zone</b></td>
 <td align="center" style="font:Georgia; font-size:11px; width:50px; color:#FFFFFF"><b>Action</b></td>
 <td align="center" style="width:17px;"><b>&nbsp;</b></td>
</tr>
<tr>
<td colspan="6">
<div class="inner_table">
<table border="1" border="1" bgcolor="#FFFFFF">
<tr>
<?php $sql=mysql_query("select * from hrm_state", $con); $SNo=1; while($res=mysql_fetch_array($sql)) {
if(isset($_REQUEST['action']) && $_REQUEST['action']=="edit" && $_REQUEST['eid']==$res['StateId']){ ?>
<form name="OformEdit" method="post" onSubmit="return OvalidateEdit(this)">	
<tr>
 <td align="center" style="font:Georgia;font-size:12px;width:45px;" valign="top"><?php echo $SNo; ?></td>
 <td class="font" valign="top" style="width:200px;"><input name="StateId" class="EditInput" value="<?php echo $res['StateName']; ?>" style="width:195px;"/></td>
 <td class="font" valign="top" style="width:100px;"><input name="SC" class="EditInput" value="<?php echo $res['StateCode']; ?>" style="width:95px;"/></td>
 <td><select style="font-size:12px;width:150px;" id="ZoneId" name="ZoneId">
<?php if($res['ZoneId']!=0){$Zone=mysql_query("SELECT ZoneName from hrm_sales_zone where ZoneId=".$res['ZoneId'], $con); $rZone=mysql_fetch_array($Zone); 
$ZoneN=$rZone['ZoneName']; } elseif($res['ZoneId']==0){$ZoneN='Select Zone';} ?>
 <option value="<?php echo $res['ZoneId']; ?>" selected>&nbsp;<?php echo $ZoneN; ?></option>
<?php $sZone=mysql_query("SELECT * from hrm_sales_zone order by ZoneName ASC", $con); while($rZone2=mysql_fetch_array($sZone)){ ?>
 <option value="<?php echo $rZone2['ZoneId']; ?>">&nbsp;<?php echo $rZone2['ZoneName']; ?></option><?php } ?> </select>
 </td>
 <td align="center" valign="middle" style="font:Georgia; font-size:11px;width:50px;" valign="top">
 <input type="submit" name="SaveEdit"  value="" class="SaveButton"><input type="hidden" name="StateId" id="StateId" value="<?php echo $_REQUEST['eid']; ?>"/></td>
</tr>
</form> 
<?php } else { ?>	 
<tr>
 <td align="center" style="font:Times New Roman; font-size:12px;width:45px;"><?php echo $SNo; ?></td>	   
 <td class="font2" style="width:200px;">&nbsp;<?php echo $res['StateName']; ?></td>
 <td class="font2" style="width:100px;">&nbsp;<?php echo $res['StateCode']; ?></td>
<?php if($res['ZoneId']!=0){$Zone=mysql_query("SELECT ZoneName from hrm_sales_zone where ZoneId=".$res['ZoneId'], $con); $rZone=mysql_fetch_array($Zone); 
$ZoneN=$rZone['ZoneName']; } elseif($res['ZoneId']==0){$ZoneN='Select Zone';} ?>
 <td class="font2" align="" style="width:150px;">&nbsp;<?php echo $ZoneN; ?></td>
 <td align="center" valign="middle" style="font:Georgia; font-size:12px;width:50px;"><a href="#"><img src="images/edit.png" border="0" alt="Edit" onClick="edit(<?php echo $res['StateId']; ?>)"></a></td>
</tr>
<?php } $SNo++;} ?>
</table>
</div>
</td>
</tr>
<tr>
 <td colspan="6" align="right" class="fontButton">
<input type="button" name="back" id="back" style="width:90px;" value="back" onClick="javascript:window.location='Index.php?log=<?php echo $_SESSION['logCheckUser']; ?>'"/>
<input type="button" name="Refrash" value="refresh" onClick="javascript:window.location='SHeadZoneState.php?ac=4441&ee=4421&der=true3&c=false&d=dreefoultValue&u=UsuuerInfo&trht=FTF%%FTF1221&tt=valuased&desgn=Trern&main=FTrue%False'"/>&nbsp;
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
