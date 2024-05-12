<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');}
include("../function.php");
include('codeEncDec.php');
if(check_user()==false){header('Location:../../../index.php');}
if($_SESSION['login'] = true){require_once('UserMenuSession.php');}

if($_REQUEST['action']=='EditGmEmp')
{ $up=mysql_query("update fa_setclaimdate set Op=".$_REQUEST['Op'].", Cl=".$_REQUEST['Cl'].", AnyOneDt=".$_REQUEST['AnyDt']." where ClmdId=1",$con);
  if($up){ $msg='Data updated successfully..';}
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
<Script language="javascript">
function FunEdit()
{ document.getElementById("edt").style.display='none'; document.getElementById("sve").style.display='block'; 
document.getElementById("Op").disabled=false; document.getElementById("Op").style.background='#FFFFFF'; 
document.getElementById("Cl").disabled=false; document.getElementById("Cl").style.background='#FFFFFF'; 
document.getElementById("AnyDt").disabled=false; document.getElementById("AnyDt").style.background='#FFFFFF'; }
function FunSave()
{ var Op=document.getElementById("Op").value; var Cl=document.getElementById("Cl").value;
  var AnyDt=document.getElementById("AnyDt").value;
  if(Op==0 && Cl==0){alert("Please enter date!"); return false;}
  else if(Op>Cl){alert("Please check date!"); return false;}
  else{ window.location='f_cmdate.php?action=EditGmEmp&Op='+Op+'&Cl='+Cl+'&AnyDt='+AnyDt; }
}

function isNumberKey(evt)
{
  var charCode = (evt.which) ? evt.which : evt.keyCode;
  if (charCode != 46 && charCode > 31 
	&& (charCode < 48 || charCode > 57))
	 return false;
  return true;
}
</Script>
</head>
<body class="body">
<table class="table">
<tr>
 <td>
  <table class="menutable"><tr><td><?php if($_SESSION['login'] = true){ require_once("EMenu.php"); } ?></td></tr></table>
 </td>
</tr>
<tr>
 <td valign="top">
  <table width="100%" style="margin-top:0px;" border="0">
    <tr>
	  <td valign="top"><?php if($_SESSION['login'] = true){ require_once("EWelcome.php"); } ?></td>
	</tr>
	 <tr>
	  <td valign="top" align="center"  width="100%" id="MainWindow"><br>
<?php //*********************************************************************?>
<?php //**************START*****START*****START******START******START**********************************/ ?>
<?php //**********************************************************************************************?>
<input type="hidden" id="ComId" value="<?php echo $CompanyId; ?>" />
<input type="hidden" id="UserId" value="<?php echo $UserId; ?>" />	
<input type="hidden" id="YId" value="<?php echo $YearId; ?>" />	
<style>
.h{color:#FFFFFF;font-size:14px;font-family:Times New Roman; text-align:center; }
.inp{width:100%;text-align:center;border:hidden;font-size:14px;font-weight:bold; }

</style>	  
<table border="0" style="margin-top:0px;width:100%;">
 <tr>
  <td align="left" height="10" valign="top" colspan="3">
   <table border="0">
    <tr><td style="margin-top:0px;" class="heading">&nbsp;Set Claim Date&nbsp;&nbsp;&nbsp;
	<font color="#C4FF88"><i><?php echo $msg; ?></i></font>
	</td></tr>
   </table>
  </td>
 </tr>	
 <tr>
  <td valign="top">
<table border="1" cellspacing="1">
 <tr bgcolor="#7a6189" style="height:30px;">
  <td class="h"><b>Opening Date</b></td>
  <td class="h" style="width:150px;"><b>Closing Date</b></td>
  <td class="h" style="width:150px;"><b>AnyOne Date</b></td>
  <td class="h" style="width:50px;"><b>Action</b></td>
 </tr>    
 <tr bgcolor="#FFFFF">
<?php $sql=mysql_query("select * from fa_setclaimdate where ClmdId=1",$con); $res=mysql_fetch_assoc($sql); ?>    
  <td><input class="inp" id="Op" value="<?php echo $res['Op']; ?>" maxlength="2" onKeyPress="return isNumberKey(event)" disabled/></td>    
  <td><input class="inp" id="Cl" value="<?php echo $res['Cl']; ?>" maxlength="2" onKeyPress="return isNumberKey(event)" disabled/></td>
  <td><input class="inp" id="AnyDt" value="<?php echo $res['AnyOneDt']; ?>" maxlength="2" onKeyPress="return isNumberKey(event)" disabled/></td>
  <td align="center" id="TD">
   <img id="edt" src="images/edit.png" style="display:block;" onClick="FunEdit()" />
   <img id="sve" src="images/Floppy-Small-icon.png" style="display:none;" onClick="FunSave()"/>
  </td>
 </tr>
</table>
  </td>
 </tr> 
</table>
<td><span id="RecordsSpan"></span></td>		
<?php //*******************************************************************************?>
<?php //********************END*****END*****END******END******END**************************/ ?>
<?php //****************************************************************************** ?>
		
	  </td>
	</tr>
  </table>
 </td>
</tr>
</table>
</body>
</html>

</html>
