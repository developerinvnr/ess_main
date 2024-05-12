<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}
?>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php include_once('../Title.php'); ?></title>

<link type="text/css" href="css/body.css" rel="stylesheet"/>
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style>.th{font-family:Times New Roman;font-size:16px;font-weight:bold;text-align:center;color:#FFFFFF; background-color:#376A9D;height:26px;} 
.tdl{font-family:Times New Roman;font-size:14px;color:#000000;}
.tdr{font-family:Times New Roman;font-size:12px;text-align:right;color:#000000;}
.tdc{font-family:Times New Roman;font-size:12px;text-align:center;color:#000000;}
.inp{width:100%;text-align:center;height:21px;border:hidden;font-family:Times New Roman;font-size:16px; background-color:#EFFBAA;}
</style>
<script type="text/javascript" src="js/stuHover.js"></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<Script type="text/javascript">

</Script>     
</head>
<body class="body">
<table class="table">
<tr>
 <td>
  <table class="menutable"><tr><td><?php if($_SESSION['login'] = true){ require_once("AMenu.php"); } ?></td></tr></table>
 </td>
</tr>
<tr>
 <td>
  <table width="100%" style="margin-top:0px;" border="0">
    <tr>
	  <td valign="top"><?php if($_SESSION['login'] = true){ require_once("AWelcome.php"); } ?></td>
	</tr>
	 <tr>
	  <td valign="top" align="center"  width="100%" id="MainWindow"><br><br>
<?php //*******************************************************************************************?>
<?php //****************START*****START*****START******START******START*************************************?>
<?php //*******************************************************************************************?>
	  
<table border="0" style="margin-top:0px; width:100%; height:450px;">
	<tr>
	    <td align="right" width="1%">&nbsp;</td>
		<?php if(($_SESSION['UserType']=='S' OR $_SESSION['UserType']=='A' OR $_SESSION['UserType']=='U') AND $_SESSION['login'] = true) { ?>
		
		<td width="100%" valign="top">
		   <table border="0" width="90%">
			 <tr><td style="text-align:center;" class="heading">Ess-Mobile Setting : PunchTime, SinkTime & Apps Version</td></tr>
			 <tr>
			   <td valign="top" style="width:100%;"> 
<table border="1" id="table1" cellspacing="1" style="width:100%;">
 <div class="thead">
 <thead>
 <tr bgcolor="#7a6189">
  <td rowspan="2" class="th" style="width:10%;">Punch Start Time <br>(24 Hour Format)</td>
  <td rowspan="2" class="th" style="width:10%;">Current <br> Apps Version</td>
  <td rowspan="2" class="th" style="width:40%;">Apps<br> Update Link</td>
  <td rowspan="2" class="th" style="width:10%;">Sink Interval Time<br>In Minute</td>
  <td colspan="2" class="th" style="width:20%;">Sink <br>(24 Hour Format)</td>
 </tr>
 <tr bgcolor="#7a6189">
  <td class="th" style="width:10%;">Start Time</td>
  <td class="th" style="width:10%;">End Time</td>
 </tr>
 </thead>
 </div>
<?php $sqlT=mysql_query("select * from hrm_api_punch_time where CompanyId=".$CompanyId." AND Sts='Y'",$con); 
	  $sqlV=mysql_query("select * from hrm_api_version where CompanyId=".$CompanyId,$con); 
	  $resT=mysql_fetch_assoc($sqlT); $resV=mysql_fetch_assoc($sqlV); ?>
 <div class="tbody">
 <tbody>
  <tr style="background-color:#FFFFFF;"> 
   <td class="tdc"><input type="text" id="PT" class="inp" value="<?=$resT['InTime']?>" placeholder="hh:mm:ss" maxlength="8"/></td>
   <td class="tdc"><input type="text" id="VR" class="inp" value="<?=$resV['VersionD']?>" placeholder="0.0.0"/></td>
   <td class="tdc"><input type="text" id="Lnk" class="inp" value="<?=$resV['Apps_Link']?>" placeholder="Directory"/></td>
   <td class="tdc"><input type="text" id="ST" class="inp" value="<?=$resV['Sink_Interval']?>" placeholder="Number" maxlength="2"/></td>
   <td class="tdc"><input type="text" id="SIKS" class="inp" value="<?=$resV['SinkTime_Start']?>" placeholder="hh:mm:ss" maxlength="8"/></td>
   <td class="tdc"><input type="text" id="SIKE" class="inp" value="<?=$resV['SinkTime_end']?>" placeholder="hh:mm:ss" maxlength="8"/></td>
  </tr>
 </tbody>
 </div>
</table>
<br>
 <center>
  <input type="button" id="editbtn" onClick="FunEdit()" value="edit" style="width:90px;" />
  <input type="button" id="savebtn" onClick="FunSavPV(<?=$CompanyId?>)" value="update" style="width:90px; display:none;" />
 </center>

<script type="text/javascript" language="javascript">
function FunEdit()
{ 
  document.getElementById("editbtn").style.display='none'; document.getElementById("savebtn").style.display='block'; 
  document.getElementById("PT").style.background='#FFFFFF'; document.getElementById("VR").style.background='#FFFFFF'; document.getElementById("Lnk").style.background='#FFFFFF';  
  document.getElementById("ST").style.background='#FFFFFF'; document.getElementById("SIKS").style.background='#FFFFFF';
  document.getElementById("SIKE").style.background='#FFFFFF';
}

function FunSavPV(C)
{ 
 var url = 'Apps_Ajax.php';	var pars = 'For=UpVersionPunchTime&VR='+document.getElementById("VR").value+'&Lnk='+document.getElementById("Lnk").value+'&PT='+document.getElementById("PT").value+'&ST='+document.getElementById("ST").value+'&C='+C+'&SIKS='+document.getElementById("SIKS").value+'&SIKE='+document.getElementById("SIKE").value; 
 var myAjax = new Ajax.Request(
 url, 
	{
		method: 'post', 
		parameters: pars, 
		onComplete: show_UseApps
	});
}
function show_UseApps(originalRequest)
{ document.getElementById('SpnaChkDL').innerHTML = originalRequest.responseText; 
  if(document.getElementById('ChkV').value==1)
  { 
   alert("Data Updated Successfully"); 
   document.getElementById("savebtn").style.display='none';  document.getElementById("editbtn").style.display='block'; 
   document.getElementById("PT").style.background='#EFFBAA'; document.getElementById("VR").style.background='#EFFBAA'; document.getElementById("Lnk").style.background='#EFFBAA'; document.getElementById("Mrk_Link").style.background='#EFFBAA';
   document.getElementById("ST").style.background='#EFFBAA'; document.getElementById("SIKS").style.background='#EFFBAA';
   document.getElementById("SIKE").style.background='#EFFBAA';
  }
  else{ alert("Error!"); }
}

</script>
<span id="SpnaChkDL"></span>


                 </td>	
				 </tr>
				
		   </table>  		
		</td>
		
        <?php } ?>
		<?php //-------------------------------------------------------------------------------------------------------- ?>
		
		<td align="left" width="20%">&nbsp;</td>
	</tr>
</table>
		
<?php //****************************************************************************************?>
<?php //*************END*****END*****END******END******END**********************?>
<?php //******************************************************************************************?>
		
	  </td>
	</tr>
	
  </table>
 </td>
</tr>
</table>
</body>
</html>