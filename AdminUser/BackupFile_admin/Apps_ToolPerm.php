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
$(document).ready(function () { $("#table1").freezeHeader({ 'height': '450px' }); })
					
function SelectDeptEmp(v)
{ var Sts=document.getElementById("StsE").value; 
  var x="Apps_AppPerm.php?act=search&DpId="+v+"&s="+Sts; window.location=x; }				
function SelectStsEmp(v)
{ var Dep=document.getElementById("DepartmentE").value; 
  var x="Apps_AppPerm.php?act=search&DpId="+Dep+"&s="+v; window.location=x; }				

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
<?php if(($_SESSION['UserType']=='S' OR $_SESSION['UserType']=='A' OR $_SESSION['UserType']=='U') AND $_SESSION['login'] = true){ ?>
  
<table border="0" style="margin-top:0px; width:50%; height:400px;">
	
	<tr>
	 <td width="100%" valign="top">
	  <table border="0" width="90%">
	   <tr>
		<td style="width:250px;" class="heading">Ess-Mobile Tool Permission</td>
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
  <td class="th" style="width:5%;">Sn</td>
  <td class="th" style="width:30%;">Tool</td>
  <td class="th" style="width:5%;">Permission</td>
 </tr>
 </thead>
 </div>
<?php $sql=mysql_query("select * from hrm_api_toolperm where ComId=".$CompanyId." order by ToolId",$con);
      $sn=1; while($res=mysql_fetch_assoc($sql)){?>
 <div class="tbody">
 <tbody>
 <tr style="background-color:#FFFFFF;">
  <td class="tdc"><?=$sn?></td>
  <td class="tdl">&nbsp;<?=$res['TName_Detail']?></td>
  <td align="center" id="TD_<?=$res['ToolId']?>" style="background-color:<?php if($res['Permission']=='Y'){echo '#69D200'; }?>;"><input type="checkbox" id="<?=$res['TName']?>" onClick="FunUseTool(<?=$res['ToolId']?>,'<?=$res['TName']?>')" <?php if($res['Permission']=='Y'){echo 'checked';} ?> /></td>
 </tr>
 <?php $sn++; } ?>
 </tbody>
 </div>


<script type="text/javascript" language="javascript">
function FunUseTool(id,name)
{ 
  if(document.getElementById(name).checked==true){var vv='Y';}else{var vv='N';}
  var url = 'Apps_Ajax.php';  var pars = 'For=ChkUseTools&id='+id+'&vv='+vv+'&n='+name;	
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
   var id=document.getElementById('ChkVID').value; 
   if(document.getElementById('ChkV').value==1)
   { 
     if(document.getElementById('ChkVvv').value=='Y'){ document.getElementById("TD_"+id).style.background='#69D200'; } 
     else{ document.getElementById("TD_"+id).style.background='#FFFFFF'; }
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
		
		
		<td align="left" width="20%">&nbsp;</td>
	</tr>
</table>
<?php } ?>
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