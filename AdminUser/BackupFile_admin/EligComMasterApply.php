<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}
/*************************************************************************************************************************/
?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style> 
.th{ font-family:Times New Roman;font-size:13px; font-weight:bold; text-align:center; height:24px; color:#FFFFFF; background-color:#7a6189; }
.tdc{ font-family:Times New Roman;font-size:13px; text-align:center;height:22px; }
.tdl{ font-family:Times New Roman;font-size:13px; text-align:left;height:22px; }
.tdr{ font-family:Times New Roman;font-size:13px; text-align:right;height:22px; }
.input{ font-family:Times New Roman; font-size:12px; width:99%; height:20px; border:hidden; background-color:#CBD6B4;}
.inputc{ font-family:Times New Roman; font-size:12px; width:99%; height:20px; border:hidden; text-align:center; background-color:#CBD6B4;}
.sel{ font-family:Times New Roman; font-size:12px; width:99%; height:21px; }
.selb{ font-family:Times New Roman; font-size:12px; width:99%; height:21px; border:hidden; background-color:#CBD6B4; }
.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;}
.SaveButton {background-image:url(images/save.gif); width:20px; height:20px; background-repeat:no-repeat; background-color:#FFFFFF; border-color:#FFFFFF; border-bottom:inherit;}
</style>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<script type="text/javascript" language="javascript">
function FunAppLy(sn,di,d,t,c,u)
{ //alert(t);
  if(document.getElementById("Check"+sn).checked==true)
  {
   var agree=confirm("Are you sure?");
   if(agree)
   {
    document.getElementById('loaderDiv').style.display='block';
    var url = 'EligComMasterAjax.php'; var pars = 'Actt=MoveRecordesToOthers&di='+di+'&d='+d+'&t='+t+'&c='+c+'&u='+u;	
    var myAjax = new Ajax.Request( url, { method: 'post', parameters: pars, onComplete: showT_Return }); 
   }
  }
}
function showT_Return(originalRequest)
{ 
 document.getElementById('SpanForElig').innerHTML = originalRequest.responseText;
 if(document.getElementById("PrsSts").value=='Done')
 {
  document.getElementById('loaderDiv').style.display='none';
  alert("Records paste successfully!");
 }
 else
  { 
   document.getElementById('loaderDiv').style.display='none'; alert("Error occour"); 
  }
}
</script>
<body>
<body class="body">

<div id="loaderDiv" style="background-color: rgba(0,0,0,0.8);width: 100%;height: 100%;position: fixed;top:0px;left: 0px;font-size: 12px; display:none;">	
	<center>
	<span style="color:white;top: 50%;left:25%;position: absolute;">Please Wait, working on Progress...<img src="images/loader.gif"></span>
	</center>
</div>

<span id="SpanForElig"></span>

<center>
<table style="width:90%;" border="1" cellspacing="1">
<tr>
 <td colspan="3" class="th">Mapping Eligibility To Other Department</td>
</tr>
<tr>
 <td class="th">Sn</td>
 <td class="th">Department</td>
 <td class="th">Act</td>
</tr>
<?php $sD=mysql_query("select DepartmentId,DepartmentName from hrm_department where CompanyId=".$CompanyId." AND DeptStatus='A'",$con); $Sn=1; while($rD=mysql_fetch_assoc($sD)){ ?>
<tr>
 <td class="tdc"><?=$Sn?></td>
 <td class="tdl">&nbsp;<?=strtoupper($rD['DepartmentName'])?></td>
 <td class="tdc"><input type="checkbox" id="Check<?=$Sn?>" onClick="FunAppLy(<?=$Sn.','.$rD['DepartmentId'].','.$_REQUEST['d'].','.$_REQUEST['t'].','.$_REQUEST['c'].','.$_REQUEST['u']?>)" /></td>
</tr>
<?php $Sn++; } ?>
</table>
</center>
</body>
</head>
</html>
