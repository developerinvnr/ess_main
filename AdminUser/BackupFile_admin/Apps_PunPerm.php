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
<style>.font4 { color:#1FAD34; font-family:Georgia; font-size:15px;} .All{font-size:11px; height:18px;} .All_80{font-size:11px; height:18px; width:80px;} .All_50{font-size:11px; height:18px; width:50px;} .All_100{font-size:11px; height:18px; width:100px;} .All_120{font-size:11px; height:18px; width:120px;} .All_150{font-size:11px; height:18px; width:150px;}.All_200{font-size:11px; height:18px; width:200px;} .All_350{font-size:11px; height:18px; width:350px;} .th{font-family:Times New Roman;font-size:12px;font-weight:bold;text-align:center;color:#FFFFFF; background-color:#376A9D;height:26px;} 
.tdl{font-family:Times New Roman;font-size:14px;color:#000000;}
.tdr{font-family:Times New Roman;font-size:12px;text-align:right;color:#000000;}
.tdc{font-family:Times New Roman;font-size:12px;text-align:center;color:#000000;}
.selecti{font-family:Times New Roman;font-size:12px;background-color:#DDFFBB;}
.inner_table{height:550px;overflow-y:auto;width:auto;}
</style>
<script type="text/javascript" src="js/stuHover.js"></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<script src="js/jquery-1.9.1.js"></script>
<script type="text/javascript" src="js/jquery.freezeheader.js"></script>
<Script type="text/javascript">
$(document).ready(function () { $("#table1").freezeHeader({ 'height': '480px' }); })
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
	  <td valign="top" align="center"  width="100%" id="MainWindow">
<?php //*******************************************************************************************?>
<?php //****************START*****START*****START******START******START*************************************?>
<?php //*******************************************************************************************?>
	  
<table border="0" style="margin-top:0px; width:100%; height:450px;">
	<tr>
	    <td align="right" width="1%">&nbsp;</td>
		<?php if(($_SESSION['UserType']=='S' OR $_SESSION['UserType']=='A' OR $_SESSION['UserType']=='U') AND $_SESSION['login'] = true) { ?>
		
		<td width="100%" valign="top">
		   <table border="0" width="50%">
			 <tr><td>
				    <table border="0">
		            <tr>
					   <td style="width:400px;" class="heading">Ess-Mobile Punching Permission & Punch In-Time</td>
		           </tr>
                   </table>
				</td>
			 </tr>
			 <tr>
			   <td valign="top" style="width:40%;"> 
<table border="1" id="table1" cellspacing="1" style="width:100%;">
 <div class="thead">
 <thead>
 <tr bgcolor="#7a6189">
  <td class="th" style="width:3%;">Sn</td>
  <td class="th" style="width:20%;">Department</td>
  <td class="th" style="width:5%;font-size:11px;">Use Punch</sup></td>
  <td class="th" style="width:5%;font-size:11px;">Punch In-Time<br>(24 Hour Format)</sup></td>
  <td class="th" style="width:5%; font-size:11px;">GPS<br>Tracking</sup></td>
 </tr>
 </thead>
 </div>
<?php  $sqlD=mysql_query("select * from hrm_department where DeptStatus='A' AND CompanyId=".$CompanyId." order by DepartmentName ASC",$con); $Sno=1; while($resD=mysql_fetch_assoc($sqlD)){ 
       $sqlCh=mysql_query("select * from hrm_api_punch_department where DepartmentId=".$resD['DepartmentId'],$con); 
	   $rowCh=mysql_num_rows($sqlCh); $resCh=mysql_fetch_assoc($sqlCh); ?>
 <div class="tbody">
 <tbody>
 <tr style="background-color:#FFFFFF;"> 
  <td class="tdc"><?php echo $Sno; ?></td>
  <td class="tdl">&nbsp;<?php echo ucwords(strtolower($resD['DepartmentName'])); ?></td>
  <td align="center" id="On3TDL_<?=$resD['DepartmentId']?>" style="background-color:<?php if($rowCh>0 && $resCh['Sts']=='Y'){echo '#69D200';  }?>;"><input type="checkbox"  id="UsePunch_<?=$resD['DepartmentId']?>" onClick="FunUsePunch(<?=$resD['DepartmentId']?>)" <?php if($rowCh>0 && $resCh['Sts']=='Y'){echo 'checked';} ?> /></td>
  <td align="center" id="On4TDL_<?=$resD['DepartmentId']?>"><select type="text" id="InTime_<?=$resD['DepartmentId']?>" style="width:100%; border:hidden;text-align:center;" onChange="FunInTime(this.value,<?=$resD['DepartmentId']?>)" onKeyPress="return isNumberKey(event)">
  <option value="00:00:00" <?php if($resCh['InTime']=='00:00:00' || $resCh['InTime']==''){echo 'selected';}?>></option>
  <option value="08:00:00" <?php if($resCh['InTime']=='08:00:00'){echo 'selected';}?>>08:00 AM</option>
  <option value="08:30:00" <?php if($resCh['InTime']=='08:30:00'){echo 'selected';}?>>08:30 AM</option>
  <option value="09:00:00" <?php if($resCh['InTime']=='09:00:00'){echo 'selected';}?>>09:00 AM</option>
  <option value="09:30:00" <?php if($resCh['InTime']=='09:30:00'){echo 'selected';}?>>09:30 AM</option>
  <option value="10:00:00" <?php if($resCh['InTime']=='10:00:00'){echo 'selected';}?>>10:00 AM</option>
  <option value="10:30:00" <?php if($resCh['InTime']=='10:30:00'){echo 'selected';}?>>10:30 AM</option>
  <option value="11:00:00" <?php if($resCh['InTime']=='11:00:00'){echo 'selected';}?>>11:00 AM</option>
  <option value="11:30:00" <?php if($resCh['InTime']=='11:30:00'){echo 'selected';}?>>11:30 AM</option>
  <option value="12:00:00" <?php if($resCh['InTime']=='12:00:00'){echo 'selected';}?>>12:00 PM</option>
  <option value="17:00:00" <?php if($resCh['InTime']=='17:00:00'){echo 'selected';}?>>05:00 PM</option>
  </select></td>
  <td align="center" id="On5TDL_<?=$resD['DepartmentId']?>" style="background-color:<?php if($rowCh>0 && $resCh['Gps_Tracking']==1){echo '#69D200';  }?>;"><input type="checkbox"  id="Gps_Tracking_<?=$resD['DepartmentId']?>" onClick="FunGps_Tracking(<?=$resD['DepartmentId']?>)" <?php if($rowCh>0 && $resCh['Gps_Tracking']==1){echo 'checked';} ?> /></td>
 </tr>
 </tbody>
 </div>
<?php $Sno++; } ?>

<script type="text/javascript" language="javascript">
function FunUsePunch(did)
{
 if(document.getElementById('UsePunch_'+did).checked==true){var vv='Y';}else{var vv='N';}
 var url = 'Apps_Ajax.php';	var pars = 'For=ChkUsePunch&Did='+did+'&vv='+vv;	var myAjax = new Ajax.Request(
 url, 
	{
		method: 'post', 
		parameters: pars, 
		onComplete: show_UseApps
	});
}
function show_UseApps(originalRequest)
{ document.getElementById('SpnaChkDL').innerHTML = originalRequest.responseText; 
   var d=document.getElementById('ChkVDept').value; 
   if(document.getElementById('ChkV').value==1)
   { 
     if(document.getElementById('ChkVvv').value=='Y'){ document.getElementById("On3TDL_"+d).style.background='#69D200'; } 
     else{ document.getElementById("On3TDL_"+d).style.background='#FFFFFF'; }
   }
   else{ alert("Error!"); }
}



function FunGps_Tracking(did)
{
 if(document.getElementById('Gps_Tracking_'+did).checked==true){var vv=1;}else{var vv=0;}
 var url = 'Apps_Ajax.php';	var pars = 'For=ChkGps_Tracking&Did='+did+'&vv='+vv;	var myAjax = new Ajax.Request(
 url, 
	{
		method: 'post', 
		parameters: pars, 
		onComplete: show_UseGps_Tracking
	});
}
function show_UseGps_Tracking(originalRequest)
{ document.getElementById('SpnaChkDL').innerHTML = originalRequest.responseText; 
   var d=document.getElementById('ChkVDept').value; 
   if(document.getElementById('ChkV').value==1)
   { 
     if(document.getElementById('ChkVvv').value==1){ document.getElementById("On5TDL_"+d).style.background='#69D200'; } 
     else{ document.getElementById("On5TDL_"+d).style.background='#FFFFFF'; }
   }
   else{ alert("Error!"); }
}


function isNumberKey(evt)
{ var charCode = (evt.which) ? evt.which : event.keyCode
 if(charCode> 31 && (charCode<48 || charCode>58)){  return false; }else{ return true; }  
}


function FunInTime(vv,did)
{
 var url = 'Apps_Ajax.php';	var pars = 'For=ChkInTime&Did='+did+'&vv='+vv;	var myAjax = new Ajax.Request(
 url, 
	{
		method: 'post', 
		parameters: pars, 
		onComplete: show_TimeApps
	});
}
function show_TimeApps(originalRequest)
{ document.getElementById('SpnaChkDL').innerHTML = originalRequest.responseText; 
   var d=document.getElementById('ChkVDept').value; 
   if(document.getElementById('ChkV').value==1)
   { 
     alert("Success");
   }
   else{ alert("Error!"); }
}

</script>
<span id="SpnaChkDL"></span>

</table>
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