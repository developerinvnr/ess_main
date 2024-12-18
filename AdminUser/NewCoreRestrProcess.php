<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}
?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style> .font { color:#ffffff; font-family:Georgia; font-size:11px; width:250px;} .font4 { color:#1FAD34; font-family:Georgia; font-size:13px; height:10px;}
.span {display:none; font-family:Courier New; font-size:14px; }.span1 {display:block; font-family:Courier New; font-size:14px; }
.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;}
.cell {color:#FFFFFF;font-family:Times New Roman;font-size:14px;font-weight:bold;} 
.cell2 {color:#000;font-family:Times New Roman;font-size:14px;} .cell3 {color:#030303;font-family:Times New Roman;font-size:14px; font-weight:bold;} 
.cellOpe {color:#FFFFFF;font-family:Times New Roman; height:20px; font-size:14px; font-weight:bold;}
.cellOpe2 {color:#000;font-family:Times New Roman; height:20px; font-size:14px; font-weight:bold;}
.cellOpe3 {color:#000;font-family:Times New Roman; width:30px;height:20px; font-size:14px; font-weight:bold;}
.th{ font-family:Times New Roman;font-size:12px; text-align:center; font-weight:bold; color:#FFFFFF; }
.tdc{ font-family:Times New Roman;font-size:12px; text-align:center; color:#000000; }
.tdl{ font-family:Times New Roman;font-size:12px; padding-left:2px; color:#000000; }
.tdll{ font-family:Times New Roman;font-size:12px; padding-left:2px; color:#000000; width:98%; }

.htf{font-family:Times New Roman;;color:#000;font-weight:bold;text-align:center;font-size:18px;height:24px;}
.htf2{font-family:Times New Roman;;color:#000;font-weight:bold;text-align:center;font-size:12px;}
.tdf{ font-family:Times New Roman;font-size:12px;color:#000000;}
.tdft{ background-color:#FFFF9D;font-family:Times New Roman;font-size:14px;color:#000000;}
.tdf2{background-color:#FFFFC4;font-family:Times New Roman;;font-size:12px;text-align:center;}
.tdf22{background-color:#FFFFC1;font-family:Times New Roman;;font-size:12px;text-align:center;}
.span {display:none; font-family:Courier New; font-size:14px; }.span1 {display:block; font-family:Courier New; font-size:14px; }
.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;}
.SaveButton {background-image:url(images/save.gif); width:20px; height:20px; background-repeat:no-repeat; background-color:#FFFFFF; border-color:#FFFFFF; border-bottom:inherit;}
.EditSelect { font-family:Georgia; font-size:12px; height:20px;}
.EditInput { font-family:Georgia; font-size:12px; height:20px;}
.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}
.tdfsel{ background-color:#FFFFFF;font-family:Times New Roman;font-size:14px;color:#000000; border:hidden;}
.inner_table{height:450px;overflow-y:auto;width:auto;}
</style>
<script type="text/javascript" src="js/stuHover.js"></script>
<script type="text/javascript" src="js/MasterAjaxCall.js"></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<Script type="text/javascript">window.history.forward(1);</script>
<script type="text/javascript" src=""></script>
<script type="text/javascript" language="javascript">
function SelectV(value){ var x = 'NewCoreRestrProcess.php?d='+value; window.location=x; }
   
function EditBtn(no,hq,uid,t)
{
    document.getElementById(t+"_edit_"+no).style.display='none';
    document.getElementById(t+"_save_"+no).style.display='block';  
}


function FUnPrs(v,comid,uid,n)
{
  var parm ='';
  if(n==1){ var parm = "again,"; }
  var agree = confirm('Are you sure you want to process '+parm+' the core data mapping in ESS?');
  if(agree)
  { 
    var url = 'NewCoreRestrAjax.php';  var pars = 'Act=ProcessMapping&v='+v+'&comid='+comid+'&uid='+uid; 
    var myAjax = new Ajax.Request(
    url, 
    {
     method: 'post', 
     parameters: pars,
     onComplete: show_ProMapping  
    });
  }
} 
function show_ProMapping(originalRequest)
{ 
  document.getElementById('DivSpan').innerHTML = originalRequest.responseText; 
  if(document.getElementById("RstVal").value==1)
  { 
    alert("Data processed successfully!"); 
    document.getElementById(document.getElementById("PrsVal").value+"_Sts").innerHTML='Processed'; 
  }
  else{ alert("Error.."); document.getElementById(document.getElementById("PrsVal").value+"_Sts").value=''; }
}



function ExportData()
{ var ComId=document.getElementById("ComId").value; 
  var YId=document.getElementById("YearId").value;   
  window.open("NewCoreRestrExp.php?action=Export&C="+ComId+"&Y="+YId,"PrintForm","menubar=yes,scrollbars=yes,resizable=no,directories=no,width=20,height=20"); }  
  
</script>   
</head>
<body class="body">

<span id="DivSpan"></span>
<table class="table" border="0">  
<tr>
 <td>
  <table class="menutable"><tr><td><?php if($_SESSION['login'] = true){ require_once("AMenu.php"); } ?></td></tr></table>
 </td>
</tr>
<tr>
 <td valign="top">
  <table width="100%" style="margin-top:0px;" border="0">
    <tr>
	  <td valign="top" align="left"><?php if($_SESSION['login'] = true){ require_once("AWelcome.php"); } ?></td>
	</tr>
	 <tr>
	  <td valign="top" width="100%" id="MainWindow">
<?php //*********************************************************************************************/ ?>
<?php //*************************START*****START*****START******START******START***************************/ ?>
<?php //**********************************************************************************************/ ?>

<?php

?>


<form name="formname" method="post" />  
<table border="0" style="margin-top:30px; width:80%; height:350px;">
 <tr>
  <td align="left" height="20" valign="top" colspan="3">
   <table border="0">
    <tr>
	  <td style="width:500px;">&nbsp;<font color="#2D002D" style='font-family:Times New Roman;' size="4">
	  <b>Core Mapping Process: Old Master to Core Master</td> 
	  <td class="td1" style="font-size:11px; width:250px;"> 		   
	   <input type="hidden" name="ComId" id="ComId" value="<?php echo $CompanyId; ?>" /> 
	   <input type="hidden" name="YearId" id="YearId" value="<?php echo $YearId; ?>" />
	   <input type="hidden" name="Sn" id="Sn" value="" />
	  </td>	 
	</tr>
   </table>
  </td>
 </tr>
<?php if(($_SESSION['UserType']=='M' OR $_SESSION['UserType']=='S' OR $_SESSION['UserType']=='A') AND $_SESSION['login'] = true) { ?>	
 <tr>

 <!-------------------------------------------------------------->
 <!-------------------------------------------------------------->
 <td valign="top" style="width:80%;">
  <table border="1" valign="top" style="width:100%;" cellspacing="0">
   <tr bgcolor="#7a6189" style="height:24px;">
	<td class="th" style="width:30px;"><b>SN</b></td>
    <td class="th" style="width:200px;">Process Name</b></td>
    <td class="th" style="width:80px;"><b>Status</b></td>
    <td class="th" style="width:80px;"><b>Action</b></td>
   </tr>
<?php $C=$CompanyId; $YI=$YearId; $U=$UserId; ?> 	
<?php $q1=mysql_query("select * from core_process where Process_Name='Employee_Masters'"); $r1=mysql_fetch_assoc($q1); ?> 
 <tr bgcolor="#FFFFFF"> 
    <td class="tdc">1</td>
	  <td class="tdl">&nbsp;Employee Masters </td>
    <td class="tdc" style="color:#509F00;"><span id="E_Sts"><?php if($r1['Status']==1){echo 'Processed';}?></span></td>
	  <td class="tdc" style="padding:5px;"><input type="button" value="Click to Process" onclick="FUnPrs('E',<?=$CompanyId.','.$UserId.','.$r1['Status']?>)" style="width:150px;"/></td>
 </tr>
 <?php $q2=mysql_query("select * from core_process where Process_Name='General_Location'"); $r2=mysql_fetch_assoc($q2); ?>
 <tr bgcolor="#FFFFFF"> 
    <td class="tdc">2</td>
	  <td class="tdl">&nbsp;General Location </td>
    <td class="tdc" style="color:#509F00;"><span id="G_Sts"><?php if($r2['Status']==1){echo 'Processed';}?></span></td>
	  <td class="tdc" style="padding:5px;"><input type="button" value="Click to Process" onclick="FUnPrs('G',<?=$CompanyId.','.$UserId.','.$r2['Status']?>)" style="width:150px;"/></td> 
 </tr>
 <?php $q3=mysql_query("select * from core_process where Process_Name='Business_Location'"); $r3=mysql_fetch_assoc($q3); ?>
 <tr bgcolor="#FFFFFF"> 
    <td class="tdc">2</td>
	  <td class="tdl">&nbsp;Business Location </td>
    <td class="tdc" style="color:#509F00;"><span id="B_Sts"><?php if($r3['Status']==1){echo 'Processed';}?></span></td>
	  <td class="tdc" style="padding:5px;"><input type="button" value="Click to Process" onclick="FUnPrs('B',<?=$CompanyId.','.$UserId.','.$r3['Status']?>)" style="width:150px;"/></td>
 </tr>
</table>
</td>
 <!-------------------------------------------------------------->
 <!-------------------------------------------------------------->


<?php } ?>


</form>	
	
<?php //*********************************************************************************************/ ?>
<?php //*************************END*****END*****END******END******END***************************/ ?>
<?php //**********************************************************************************************/ ?>
		
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