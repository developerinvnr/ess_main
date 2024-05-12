<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}

if($_REQUEST['act']=='save_edit')
{
 $sqlUp=mysql_query("update hrm_api_support set Name='".$_REQUEST['Tn']."', Contact='".$_REQUEST['Tc']."', Email='".$_REQUEST['Te']."', Sts='".$_REQUEST['Ts']."', Purpose='".$_REQUEST['Tp']."' where SuptId=".$_REQUEST['id'],$con);
 if($sqlUp){ echo '<script>alert("Data updated successfully!"); window.location="Apps_support.php";</script>'; }
 else{ echo '<script>alert("Error!");</script>';}
}
elseif($_REQUEST['act']=='save_new')
{
 $sqlUp=mysql_query("insert into hrm_api_support(Name, Contact, Email, Sts, Purpose, CompanyId) values('".$_REQUEST['Tn']."', '".$_REQUEST['Tc']."', '".$_REQUEST['Te']."', '".$_REQUEST['Ts']."', '".$_REQUEST['Tp']."', ".$CompanyId.")",$con);
 if($sqlUp){ echo '<script>alert("Data inserted successfully!"); window.location="Apps_support.php"; </script>'; }
 else{ echo '<script>alert("Error!");</script>';}
}

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
.inp{ font-family:Times New Roman;font-size:12px;color:#000000;width:100%; border:hidden; height:22px;}
.inpc{ font-family:Times New Roman;font-size:12px;text-align:center;color:#000000;width:100%; border:hidden;height:22px;}
</style>
<script type="text/javascript" src="js/stuHover.js"></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<script src="js/jquery-1.9.1.js"></script>
<script type="text/javascript" src="js/jquery.freezeheader.js"></script>
<Script type="text/javascript">
//$(document).ready(function () { $("#table1").freezeHeader({ 'height': '480px' }); })
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
		   <table border="0" width="80%">
			 <tr><td>
				    <table border="0">
		            <tr>
					   <td style="width:300px;" class="heading">
					   Ess-Mobile Support Details 
					   &nbsp;&nbsp;&nbsp;&nbsp;
					   <a href="#" onclick="FunClick('A',0)" style="font-size:12px;">Add New</a>
					   </td>
		           </tr>
                   </table>
				</td>
			 </tr>
			 <tr>
			   <td valign="top" style="width:60%;"> 
<table border="1" id="table1" cellspacing="1" style="width:100%;">
 <div class="thead">
 <thead>
 <tr bgcolor="#7a6189">
  <td class="th" style="width:5%;">Sn</td>
  <td class="th" style="width:15%;">Name</td>
  <td class="th" style="width:10%;">Contact</td>
  <td class="th" style="width:18%;">Email</td>
  <td class="th" style="width:30%;">Purpose</td>
  <td class="th" style="width:8%;">Status</td>
  <td class="th" style="width:5%;">Action</td>
 </tr>
 </thead>
 </div>
 <?php if($_REQUEST['act']=='new'){ ?>
 <tr style="background-color:#FFFFFF;"> 
  <td class="tdc">=></td>
  <td class="tdc"><input class="inp" id="STn" value="<?=ucwords(strtolower($resD['Name']))?>" style="background-color:#FFFFB0;" /></td>
  <td class="tdc"><input class="inpc" id="STc" value="<?=$resD['Contact']?>" maxlength="20" style="background-color:#FFFFB0;"/></td>
  <td class="tdc"><input class="inp" id="STe" value="<?=$resD['Email']?>" style="background-color:#FFFFB0;"/></td>
  <td class="tdc"><input class="inp" id="STp" value="<?=$resD['Purpose']?>" style="background-color:#FFFFB0;"/></td>
  <td class="tdc"><select class="inpc" id="STs" style="background-color:#FFFFB0;"><option value="Y" <?php if($resD['Sts']=='Y'){echo 'selected';}?>>Active</option><option value="N" <?php if($resD['Sts']=='N'){echo 'selected';}?>>Deactive</option></td>
  <td align="center"><img src="images/save.gif" onClick="FunClick('Sn',0)" /></td>
 </tr>
 <?php } ?>
<?php  $sqlD=mysql_query("select * from hrm_api_support where CompanyId=".$CompanyId." order by Name ASC",$con); $Sno=1; while($resD=mysql_fetch_assoc($sqlD)){ ?>
 <div class="tbody">
 <tbody>
 <tr style="background-color:#FFFFFF;"> 
  <td class="tdc"><?php echo $Sno; ?></td>
  <td class="tdc"><input class="inp" id="Tn<?=$resD['SuptId']?>" value="<?=ucwords(strtolower($resD['Name']))?>" <?php if($_REQUEST['id']!=$resD['SuptId']){echo 'readonly';}else{ echo "style='background-color:#FFFFB0;'";} ?>/></td>
  <td class="tdc"><input class="inpc" id="Tc<?=$resD['SuptId']?>" value="<?=$resD['Contact']?>" <?php if($_REQUEST['id']!=$resD['SuptId']){echo 'readonly';}else{ echo "style='background-color:#FFFFB0;'";}?> maxlength="20"/></td>
  <td class="tdc"><input class="inp" id="Te<?=$resD['SuptId']?>" value="<?=$resD['Email']?>" <?php if($_REQUEST['id']!=$resD['SuptId']){echo 'readonly';}else{ echo "style='background-color:#FFFFB0;'";}?>/></td>
  <td class="tdc"><input class="inp" id="Tp<?=$resD['SuptId']?>" value="<?=$resD['Purpose']?>" <?php if($_REQUEST['id']!=$resD['SuptId']){echo 'readonly';}else{ echo "style='background-color:#FFFFB0;'";}?>/></td>
  <td class="tdc"><select class="inpc" id="Ts<?=$resD['SuptId']?>" <?php if($_REQUEST['id']!=$resD['SuptId']){echo 'disabled';}else{ echo "style='background-color:#FFFFB0;'";}?>><option value="Y" <?php if($resD['Sts']=='Y'){echo 'selected';}?>>Active</option><option value="N" <?php if($resD['Sts']=='N'){echo 'selected';}?>>Deactive</option></td>
  
  <td align="center" id="On3TDL_<?=$resD['SuptId']?>" style="cursor:pointer;"><img src="images/edit.png" id="Edit_<?=$resD['SuptId']?>" onClick="FunClick('E',<?=$resD['SuptId']?>)" style="display:<?php if($_REQUEST['id']!=$resD['SuptId']){echo 'block';}else{echo 'none';}?>;"/><img src="images/save.gif"  id="Save_<?=$resD['SuptId']?>" onClick="FunClick('S',<?=$resD['SuptId']?>)" style="display:<?php if($_REQUEST['id']!=$resD['SuptId']){echo 'none';}else{echo 'block';}?>;"/></td>
 </tr>
 </tbody>
 </div>
<?php $Sno++; } ?>

<script type="text/javascript" language="javascript">
function FunClick(v,id)
{  
  if(v=='A'){ window.location="Apps_support.php?act=new&id=0"; }
  else if(v=='E'){ window.location="Apps_support.php?act=edit&id="+id; }
  else if(v=='S')
  {
   var Tn = document.getElementById("Tn"+id).value; var Tc = document.getElementById("Tc"+id).value;
   var Te = document.getElementById("Te"+id).value; var Tp = document.getElementById("Tp"+id).value;
   var Ts = document.getElementById("Ts"+id).value;
   window.location="Apps_support.php?act=save_edit&id="+id+"&Tn="+Tn+"&Tc="+Tc+"&Te="+Te+"&Tp="+Tp+"&Ts="+Ts;
  }
  else if(v=='Sn')
  {
   var Tn = document.getElementById("STn").value; var Tc = document.getElementById("STc").value;
   var Te = document.getElementById("STe").value; var Tp = document.getElementById("STp").value;
   var Ts = document.getElementById("STs").value;
   window.location="Apps_support.php?act=save_new&id="+id+"&Tn="+Tn+"&Tc="+Tc+"&Te="+Te+"&Tp="+Tp+"&Ts="+Ts;
  }
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