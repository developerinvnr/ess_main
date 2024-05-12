<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');}
include("../function.php");
include('codeEncDec.php');
if(check_user()==false){header('Location:../../../index.php');}
if($_SESSION['login'] = true){require_once('UserMenuSession.php');}
//**********************************************************************************************************************
if(isset($_POST['SaveEdit']))
{ 
   $sql=mysql_query("select * from hrm_sales_season_month where SeasonId=".$_POST['SeasonId'], $con); $row=mysql_num_rows($sql);
   if($row==0){$sqlIns = mysql_query("insert into hrm_sales_season_month(SeasonId, MJan, MFeb, MMar, MApr, MMay, MJun, MJul, MAug, MSep, MOct, MNov, MDec, CreatedBy, CreatedDate) values(".$_POST['SeasonId'].", ".$_POST['MnV_1'].", ".$_POST['MnV_2'].", ".$_POST['MnV_3'].", ".$_POST['MnV_4'].", ".$_POST['MnV_5'].", ".$_POST['MnV_6'].", ".$_POST['MnV_7'].", ".$_POST['MnV_8'].", ".$_POST['MnV_9'].", ".$_POST['MnV_10'].", ".$_POST['MnV_11'].", ".$_POST['MnV_12'].", ".$UserId.", '".date("Y-m-d")."')", $con); }
   elseif($row>0){$sqlUp=mysql_query("update hrm_sales_season_month set MJan=".$_POST['MnV_1'].", MFeb=".$_POST['MnV_2'].", MMar=".$_POST['MnV_3'].", MApr=".$_POST['MnV_4'].", MMay=".$_POST['MnV_5'].", MJun=".$_POST['MnV_6'].", MJul=".$_POST['MnV_7'].", MAug=".$_POST['MnV_8'].", MSep=".$_POST['MnV_9'].", MOct=".$_POST['MnV_10'].", MNov=".$_POST['MnV_11'].", MDec=".$_POST['MnV_12'].", CreatedBy=".$UserId.", CreatedDate='".date("Y-m-d")."' where SeasonId=".$_POST['SeasonId'], $con);}
}

if(isset($_POST['SaveEdit2']))
{ 
   $sql=mysql_query("select * from hrm_sales_season_month where SeasonId=".$_POST['SeasonId'], $con); $row=mysql_num_rows($sql);
   if($row==0){$sqlIns = mysql_query("insert into hrm_sales_season_month(SeasonId, MJan, MFeb, MMar, MApr, MMay, MJun, MJul, MAug, MSep, MOct, MNov, MDec, CreatedBy, CreatedDate) values(".$_POST['SeasonId'].", ".$_POST['Mn2V_1'].", ".$_POST['Mn2V_2'].", ".$_POST['Mn2V_3'].", ".$_POST['Mn2V_4'].", ".$_POST['Mn2V_5'].", ".$_POST['Mn2V_6'].", ".$_POST['Mn2V_7'].", ".$_POST['Mn2V_8'].", ".$_POST['Mn2V_9'].", ".$_POST['Mn2V_10'].", ".$_POST['Mn2V_11'].", ".$_POST['Mn2V_12'].", ".$UserId.", '".date("Y-m-d")."')", $con); }
   elseif($row>0){ $sqlUp=mysql_query("update hrm_sales_season_month set MJan=".$_POST['Mn2V_1'].", MFeb=".$_POST['Mn2V_2'].", MMar=".$_POST['Mn2V_3'].", MApr=".$_POST['Mn2V_4'].", MMay=".$_POST['Mn2V_5'].", MJun=".$_POST['Mn2V_6'].", MJul=".$_POST['Mn2V_7'].", MAug=".$_POST['Mn2V_8'].", MSep=".$_POST['Mn2V_9'].", MOct=".$_POST['Mn2V_10'].", MNov=".$_POST['Mn2V_11'].", MDec=".$_POST['Mn2V_12'].", CreatedBy=".$UserId.", CreatedDate='".date("Y-m-d")."' where SeasonId=".$_POST['SeasonId'], $con);}
}
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
if (agree) { var x = "SalesSeedsMonth.php?action=edit&eid="+value;  window.location=x;}}

function ClickMonth(v)
{ 
  if(document.getElementById("Mn_"+v).checked==true){document.getElementById("MnV_"+v).value=1;}
  else if(document.getElementById("Mn_"+v).checked==false){document.getElementById("MnV_"+v).value=0;}
}

function edit2(value) { var agree=confirm("Are you sure you want to edit this record?");
if (agree) { var x = "SalesSeedsMonth.php?action=edit2&eid="+value;  window.location=x;}}

function ClickMonth2(v)
{ 
  if(document.getElementById("Mn2_"+v).checked==true){document.getElementById("Mn2V_"+v).value=1;}
  else if(document.getElementById("Mn2_"+v).checked==false){document.getElementById("Mn2V_"+v).value=0;}
}
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
    <table border="0" style="margin-top:0px;width:100%;height:300px;">
    <tr>
    <td width="10">&nbsp;</td>  
    <td align="left" id="type" valign="top" style="display:block;width:50%">             
     <table border="0" width="1000">
	 <tr><td class="heading">&nbsp;Vegetable Season</td></tr>
	 <tr>
	 <td align="left" width="1100">
	 <table border="1" width="1100" border="1" bgcolor="#FFFFFF">
<tr bgcolor="#808000">
 <td align="center" style="font:Georgia; color:#FFFFFF; font-size:11px; width:50px;"><b>SNo</b></td>
 <td class="font" align="center" style="width:500;"><b>Season Name</b></td>
 <?php for($i=1; $i<=12; $i++){ if($i==1){$Mn='Jan';}elseif($i==2){$Mn='Feb';}elseif($i==3){$Mn='Mar';}elseif($i==4){$Mn='Apr';}elseif($i==5){$Mn='May';}elseif($i==6){$Mn='Jun';}elseif($i==7){$Mn='Jul';}elseif($i==8){$Mn='Aug';}elseif($i==9){$Mn='Sep';}elseif($i==10){$Mn='Oct';}elseif($i==11){$Mn='Nov';}elseif($i==12){$Mn='Dec';}?>
 <td class="font" align="center" style="width:40px;"><b><?php echo $Mn; ?></b></td>
 <?php } ?>
 <td align="center" style="font:Georgia;font-size:11px;width:100px;color:#FFFFFF;"><b>Action</b></td>
</tr>
<?php $sql=mysql_query("select * from hrm_sales_season where GroupId=1 order by SeasonId ASC", $con); $SNo=1; while($res=mysql_fetch_array($sql)) {
if(isset($_REQUEST['action']) && $_REQUEST['action']=="edit" && $_REQUEST['eid']==$res['SeasonId']){ ?>
<form name="OformEdit" method="post" onSubmit="return OvalidateEdit(this)">	
<tr>
 <td align="center" style="font:Georgia;font-size:12px;" valign="top"><?php echo $SNo; ?></td>
 <td class="font2" valign="middle">&nbsp;<?php echo $res['SeasonName']; ?><input type="hidden" id="SeasonId" value="<?php echo $res['SeasonId']; ?>" /></td>
 <?php $sql2=mysql_query("select * from hrm_sales_season_month where SeasonId=".$res['SeasonId'], $con); $res2=mysql_fetch_assoc($sql2); ?>
 <?php for($i=1; $i<=12; $i++){ ?>
 <td class="font" valign="top" align="center" style="background-color:<?php if($i==1 AND $res2['MJan']==1){echo '#97FF97';}elseif($i==2 AND $res2['MFeb']==1){echo '#97FF97';}elseif($i==3 AND $res2['MMar']==1){echo '#97FF97';}elseif($i==4 AND $res2['MApr']==1){echo '#97FF97';}elseif($i==5 AND $res2['MMay']==1>0){echo '#97FF97';}elseif($i==6 AND $res2['MJun']==1){echo '#97FF97';}elseif($i==7 AND $res2['MJul']==1){echo '#97FF97';}elseif($i==8 AND $res2['MAug']==1){echo '#97FF97';}elseif($i==9 AND $res2['MSep']==1){echo '#97FF97';}elseif($i==10 AND $res2['MOct']==1){echo '#97FF97';}elseif($i==11 AND $res2['MNov']==1){echo '#97FF97';}elseif($i==12 AND $res2['MDec']==1){echo '#97FF97';} ?>;"><input type="checkbox" id="Mn_<?php echo $i; ?>" onClick="ClickMonth(<?php echo $i; ?>)" <?php if($i==1 AND $res2['MJan']==1){echo 'checked';}elseif($i==2 AND $res2['MFeb']==1){echo 'checked';}elseif($i==3 AND $res2['MMar']==1){echo 'checked';}elseif($i==4 AND $res2['MApr']==1){echo 'checked';}elseif($i==5 AND $res2['MMay']==1>0){echo 'checked';}elseif($i==6 AND $res2['MJun']==1){echo 'checked';}elseif($i==7 AND $res2['MJul']==1){echo 'checked';}elseif($i==8 AND $res2['MAug']==1){echo 'checked';}elseif($i==9 AND $res2['MSep']==1){echo 'checked';}elseif($i==10 AND $res2['MOct']==1){echo 'checked';}elseif($i==11 AND $res2['MNov']==1){echo 'checked';}elseif($i==12 AND $res2['MDec']==1){echo 'checked';} ?> />
 <input type="hidden" id="MnV_<?php echo $i; ?>" name="MnV_<?php echo $i; ?>" value="<?php if($i==1 AND $res2['MJan']==1){echo 1;}elseif($i==2 AND $res2['MFeb']==1){echo 1;}elseif($i==3 AND $res2['MMar']==1){echo 1;}elseif($i==4 AND $res2['MApr']==1){echo 1;}elseif($i==5 AND $res2['MMay']==1>0){echo 1;}elseif($i==6 AND $res2['MJun']==1){echo 1;}elseif($i==7 AND $res2['MJul']==1){echo 1;}elseif($i==8 AND $res2['MAug']==1){echo 1;}elseif($i==9 AND $res2['MSep']==1){echo 1;}elseif($i==10 AND $res2['MOct']==1){echo 1;}elseif($i==11 AND $res2['MNov']==1){echo 1;}elseif($i==12 AND $res2['MDec']==1){echo 1;} else {echo 0;} ?>" />
 </td>
 <?php } ?>
 <td align="center" valign="middle" style="font:Georgia; font-size:11px;width:100px;" valign="top">
 <input type="submit" name="SaveEdit"  value="" class="SaveButton"><input type="hidden" name="SeasonId" id="SeasonId" value="<?php echo $_REQUEST['eid']; ?>"/></td>
</tr>
</form> 
<?php } else { ?>	 
<tr>
 <td align="center" style="font:Times New Roman; font-size:12px;"><?php echo $SNo; ?></td>	   
 <td class="font2" valign="middle">&nbsp;<?php echo $res['SeasonName']; ?></td>
 <?php $sql2=mysql_query("select * from hrm_sales_season_month where SeasonId=".$res['SeasonId'], $con); $res2=mysql_fetch_assoc($sql2); ?>
 <?php for($i=1; $i<=12; $i++){ ?>
 <td class="font" valign="top" align="center" style="background-color:<?php if($i==1 AND $res2['MJan']==1){echo '#97FF97';}elseif($i==2 AND $res2['MFeb']==1){echo '#97FF97';}elseif($i==3 AND $res2['MMar']==1){echo '#97FF97';}elseif($i==4 AND $res2['MApr']==1){echo '#97FF97';}elseif($i==5 AND $res2['MMay']==1>0){echo '#97FF97';}elseif($i==6 AND $res2['MJun']==1){echo '#97FF97';}elseif($i==7 AND $res2['MJul']==1){echo '#97FF97';}elseif($i==8 AND $res2['MAug']==1){echo '#97FF97';}elseif($i==9 AND $res2['MSep']==1){echo '#97FF97';}elseif($i==10 AND $res2['MOct']==1){echo '#97FF97';}elseif($i==11 AND $res2['MNov']==1){echo '#97FF97';}elseif($i==12 AND $res2['MDec']==1){echo '#97FF97';} ?>;">
 
 <?php if($i==1 AND $res2['MJan']==1){echo '<img src="images/checkbox_UnCheck.png" border="0" />';}elseif($i==2 AND $res2['MFeb']==1){echo '<img src="images/checkbox_UnCheck.png" border="0" />';}elseif($i==3 AND $res2['MMar']==1){echo '<img src="images/checkbox_UnCheck.png" border="0" />';}elseif($i==4 AND $res2['MApr']==1){echo '<img src="images/checkbox_UnCheck.png" border="0" />';}elseif($i==5 AND $res2['MMay']==1>0){echo '<img src="images/checkbox_UnCheck.png" border="0" />';}elseif($i==6 AND $res2['MJun']==1){echo '<img src="images/checkbox_UnCheck.png" border="0" />';}elseif($i==7 AND $res2['MJul']==1){echo '<img src="images/checkbox_UnCheck.png" border="0" />';}elseif($i==8 AND $res2['MAug']==1){echo '<img src="images/checkbox_UnCheck.png" border="0" />';}elseif($i==9 AND $res2['MSep']==1){echo '<img src="images/checkbox_UnCheck.png" border="0" />';}elseif($i==10 AND $res2['MOct']==1){echo '<img src="images/checkbox_UnCheck.png" border="0" />';}elseif($i==11 AND $res2['MNov']==1){echo '<img src="images/checkbox_UnCheck.png" border="0" />';}elseif($i==12 AND $res2['MDec']==1){echo '<img src="images/checkbox_UnCheck.png" border="0" />';} else {echo '<img src="images/checkbox.png" border="0" />';} ?></td>
 <?php } ?>
 <td align="center" valign="middle" style="font:Georgia; font-size:12px;"><a href="#"><img src="images/edit.png" border="0" alt="Edit" onClick="edit(<?php echo $res['SeasonId']; ?>)"></a></td>
</tr>
<?php } $SNo++;} ?>
<tr>
<td colspan="15" align="right" class="fontButton">
<input type="button" name="back" id="back" style="width:90px;" value="back" onClick="javascript:window.location='Index.php?log=<?php echo $_SESSION['logCheckUser']; ?>'"/>
<input type="button" name="Refrash" value="refresh" onClick="javascript:window.location='SalesSeedsMonth.php?ac=4441&ee=4421&der=true3&c=false&d=dreefoultValue&u=UsuuerInfo&trht=FTF%%FTF1221&tt=valuased&desgn=Trern&main=FTrue%False'"/>&nbsp;
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
     <table border="0" width="1000">
	 <tr><td class="heading">&nbsp;Cereal Season</td></tr>
	 <tr>
	 <td align="left" width="1100">
	 <table border="1" width="1100" border="1" bgcolor="#FFFFFF">
<tr bgcolor="#808000">
 <td align="center" style="font:Georgia; color:#FFFFFF; font-size:11px; width:50px;"><b>SNo</b></td>
 <td class="font" align="center" style="width:550;"><b>Season Name</b></td>
 <?php for($i=1; $i<=12; $i++){ if($i==1){$Mn='Jan';}elseif($i==2){$Mn='Feb';}elseif($i==3){$Mn='Mar';}elseif($i==4){$Mn='Apr';}elseif($i==5){$Mn='May';}elseif($i==6){$Mn='Jun';}elseif($i==7){$Mn='Jul';}elseif($i==8){$Mn='Aug';}elseif($i==9){$Mn='Sep';}elseif($i==10){$Mn='Oct';}elseif($i==11){$Mn='Nov';}elseif($i==12){$Mn='Dec';}?>
 <td class="font" align="center" style="width:40px;"><b><?php echo $Mn; ?></b></td>
 <?php } ?>
 <td align="center" style="font:Georgia; font-size:11px; width:100px; color:#FFFFFF"><b>Action</b></td>
</tr>
<?php $sql=mysql_query("select * from hrm_sales_season where GroupId=2 order by SeasonId ASC", $con); $SNo=1; while($res=mysql_fetch_array($sql)) {
if(isset($_REQUEST['action']) && $_REQUEST['action']=="edit2" && $_REQUEST['eid']==$res['SeasonId']){ ?>
<form name="OformEdit" method="post" onSubmit="return OvalidateEdit(this)">	
<tr>
 <td align="center" style="font:Georgia;font-size:12px;" valign="top"><?php echo $SNo; ?></td>
 <td class="font2" valign="middle">&nbsp;<?php echo $res['SeasonName']; ?><input type="hidden" id="SeasonId" value="<?php echo $res['SeasonId']; ?>" /></td>
 <?php $sql2=mysql_query("select * from hrm_sales_season_month where SeasonId=".$res['SeasonId'], $con); $res2=mysql_fetch_assoc($sql2); ?>
 <?php for($i=1; $i<=12; $i++){ ?>
 <td class="font" valign="top" align="center" style="background-color:<?php if($i==1 AND $res2['MJan']==1){echo '#97FF97';}elseif($i==2 AND $res2['MFeb']==1){echo '#97FF97';}elseif($i==3 AND $res2['MMar']==1){echo '#97FF97';}elseif($i==4 AND $res2['MApr']==1){echo '#97FF97';}elseif($i==5 AND $res2['MMay']==1>0){echo '#97FF97';}elseif($i==6 AND $res2['MJun']==1){echo '#97FF97';}elseif($i==7 AND $res2['MJul']==1){echo '#97FF97';}elseif($i==8 AND $res2['MAug']==1){echo '#97FF97';}elseif($i==9 AND $res2['MSep']==1){echo '#97FF97';}elseif($i==10 AND $res2['MOct']==1){echo '#97FF97';}elseif($i==11 AND $res2['MNov']==1){echo '#97FF97';}elseif($i==12 AND $res2['MDec']==1){echo '#97FF97';} ?>;"><input type="checkbox" id="Mn2_<?php echo $i; ?>" onClick="ClickMonth2(<?php echo $i; ?>)" <?php if($i==1 AND $res2['MJan']==1){echo 'checked';}elseif($i==2 AND $res2['MFeb']==1){echo 'checked';}elseif($i==3 AND $res2['MMar']==1){echo 'checked';}elseif($i==4 AND $res2['MApr']==1){echo 'checked';}elseif($i==5 AND $res2['MMay']==1>0){echo 'checked';}elseif($i==6 AND $res2['MJun']==1){echo 'checked';}elseif($i==7 AND $res2['MJul']==1){echo 'checked';}elseif($i==8 AND $res2['MAug']==1){echo 'checked';}elseif($i==9 AND $res2['MSep']==1){echo 'checked';}elseif($i==10 AND $res2['MOct']==1){echo 'checked';}elseif($i==11 AND $res2['MNov']==1){echo 'checked';}elseif($i==12 AND $res2['MDec']==1){echo 'checked';} ?> />
 <input type="hidden" id="Mn2V_<?php echo $i; ?>" name="Mn2V_<?php echo $i; ?>" value="<?php if($i==1 AND $res2['MJan']==1){echo 1;}elseif($i==2 AND $res2['MFeb']==1){echo 1;}elseif($i==3 AND $res2['MMar']==1){echo 1;}elseif($i==4 AND $res2['MApr']==1){echo 1;}elseif($i==5 AND $res2['MMay']==1>0){echo 1;}elseif($i==6 AND $res2['MJun']==1){echo 1;}elseif($i==7 AND $res2['MJul']==1){echo 1;}elseif($i==8 AND $res2['MAug']==1){echo 1;}elseif($i==9 AND $res2['MSep']==1){echo 1;}elseif($i==10 AND $res2['MOct']==1){echo 1;}elseif($i==11 AND $res2['MNov']==1){echo 1;}elseif($i==12 AND $res2['MDec']==1){echo 1;} else {echo 0;} ?>" />
 </td>
 <?php } ?>
 <td align="center" valign="middle" style="font:Georgia; font-size:11px;width:100px;" valign="top">
 <input type="submit" name="SaveEdit2"  value="" class="SaveButton"><input type="hidden" name="SeasonId" id="SeasonId" value="<?php echo $_REQUEST['eid']; ?>"/></td>
</tr>
</form> 
<?php } else { ?>	 
<tr>
 <td align="center" style="font:Times New Roman; font-size:12px;"><?php echo $SNo; ?></td>	   
 <td class="font2" valign="middle">&nbsp;<?php echo $res['SeasonName']; ?></td>
 <?php $sql2=mysql_query("select * from hrm_sales_season_month where SeasonId=".$res['SeasonId'], $con); $res2=mysql_fetch_assoc($sql2); ?>
 <?php for($i=1; $i<=12; $i++){ ?>
 <td class="font" valign="top" align="center" style="background-color:<?php if($i==1 AND $res2['MJan']==1){echo '#97FF97';}elseif($i==2 AND $res2['MFeb']==1){echo '#97FF97';}elseif($i==3 AND $res2['MMar']==1){echo '#97FF97';}elseif($i==4 AND $res2['MApr']==1){echo '#97FF97';}elseif($i==5 AND $res2['MMay']==1>0){echo '#97FF97';}elseif($i==6 AND $res2['MJun']==1){echo '#97FF97';}elseif($i==7 AND $res2['MJul']==1){echo '#97FF97';}elseif($i==8 AND $res2['MAug']==1){echo '#97FF97';}elseif($i==9 AND $res2['MSep']==1){echo '#97FF97';}elseif($i==10 AND $res2['MOct']==1){echo '#97FF97';}elseif($i==11 AND $res2['MNov']==1){echo '#97FF97';}elseif($i==12 AND $res2['MDec']==1){echo '#97FF97';} ?>;">
 
 <?php if($i==1 AND $res2['MJan']==1){echo '<img src="images/checkbox_UnCheck.png" border="0" />';}elseif($i==2 AND $res2['MFeb']==1){echo '<img src="images/checkbox_UnCheck.png" border="0" />';}elseif($i==3 AND $res2['MMar']==1){echo '<img src="images/checkbox_UnCheck.png" border="0" />';}elseif($i==4 AND $res2['MApr']==1){echo '<img src="images/checkbox_UnCheck.png" border="0" />';}elseif($i==5 AND $res2['MMay']==1>0){echo '<img src="images/checkbox_UnCheck.png" border="0" />';}elseif($i==6 AND $res2['MJun']==1){echo '<img src="images/checkbox_UnCheck.png" border="0" />';}elseif($i==7 AND $res2['MJul']==1){echo '<img src="images/checkbox_UnCheck.png" border="0" />';}elseif($i==8 AND $res2['MAug']==1){echo '<img src="images/checkbox_UnCheck.png" border="0" />';}elseif($i==9 AND $res2['MSep']==1){echo '<img src="images/checkbox_UnCheck.png" border="0" />';}elseif($i==10 AND $res2['MOct']==1){echo '<img src="images/checkbox_UnCheck.png" border="0" />';}elseif($i==11 AND $res2['MNov']==1){echo '<img src="images/checkbox_UnCheck.png" border="0" />';}elseif($i==12 AND $res2['MDec']==1){echo '<img src="images/checkbox_UnCheck.png" border="0" />';} else {echo '<img src="images/checkbox.png" border="0" />';} ?></td>
 <?php } ?>
 <td align="center" valign="middle" style="font:Georgia; font-size:12px;"><a href="#"><img src="images/edit.png" border="0" alt="Edit" onClick="edit2(<?php echo $res['SeasonId']; ?>)"></a></td>
</tr>
<?php } $SNo++;} ?>
<tr>
<td colspan="15" align="right" class="fontButton">
<input type="button" name="back" id="back" style="width:90px;" value="back" onClick="javascript:window.location='Index.php?log=<?php echo $_SESSION['logCheckUser']; ?>'"/>
<input type="button" name="Refrash" value="refresh" onClick="javascript:window.location='SalesSeedsMonth.php?ac=4441&ee=4421&der=true3&c=false&d=dreefoultValue&u=UsuuerInfo&trht=FTF%%FTF1221&tt=valuased&desgn=Trern&main=FTrue%False'"/>&nbsp;
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
