<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');}
include("../function.php");
include('codeEncDec.php');
if(check_user()==false){header('Location:../../../index.php');}
if($_SESSION['login'] = true){require_once('UserMenuSession.php');}
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
<Script language="javascript">
function ClickCoutry(value)
{ var url = 'SalesGetProductionArea.php';	var pars = 'CouId='+value;	var myAjax = new Ajax.Request(
  url, { method: 'post', parameters: pars, onComplete: show_State });
}
function show_State(originalRequest)
{ document.getElementById('StateSpan').innerHTML = originalRequest.responseText; }

function ClickState(value)
{ var url = 'SalesGetProductionArea.php';	var pars = 'StaId='+value;	var myAjax = new Ajax.Request(
  url, { method: 'post', parameters: pars, onComplete: show_Dist });
}
function show_Dist(originalRequest)
{ document.getElementById('TabResult').innerHTML = originalRequest.responseText; document.getElementById('Dist').disabled=false;
  document.getElementById('AddNew').style.display='block'; document.getElementById('Change').style.display='none';
}


function ClickNew()
{
 if(document.getElementById('Dist').value==''){alert("Please Type Distric Name"); return false;}
 else if(document.getElementById('Dist').value!='')
 {
  var DistName=document.getElementById('Dist').value; var StaId=document.getElementById('State').value; 
  var url = 'SalesGetProductionArea.php';	var pars = 'DistName='+DistName+'&St='+StaId; var myAjax = new Ajax.Request(
  url, { method: 'post', parameters: pars, onComplete: show_AddDist });
 }
}
function show_AddDist(originalRequest)
{ document.getElementById('TabResult').innerHTML = originalRequest.responseText; document.getElementById('Dist').value=''; }


function ClickDist(v,dn)
{ 
  if(document.getElementById('Check_'+v).checked==true)
  { 
    document.getElementById('Dist').value=dn; document.getElementById('DistID').value=v; document.getElementById('AddNew').style.display='none'; 
	document.getElementById('Change').style.display='block'; document.getElementById('TR'+v).style.background='#FFFFBF';
  }
  else if(document.getElementById('Check_'+v).checked==false)
  { document.getElementById('Dist').value=''; document.getElementById('DistID').value=''; document.getElementById('AddNew').style.display='block'; 
    document.getElementById('Change').style.display='none'; document.getElementById('TR'+v).style.background='#FFFFFF';
  }
}

function ClickChange()
{
 if(document.getElementById('Dist').value==''){alert("Please Type Distric Name"); return false;}
 else if(document.getElementById('Dist').value!='')
 {
  var DistName=document.getElementById('Dist').value;  var DistID=document.getElementById('DistID').value; var StaId=document.getElementById('State').value; 
  var url = 'SalesGetProductionArea.php';	var pars = 'ChangeDistName='+DistName+'&DistId='+DistID+'&St='+StaId;	
  var myAjax = new Ajax.Request( url, { method: 'post', parameters: pars, onComplete: show_ChangeDist });
 }
}
function show_ChangeDist(originalRequest)
{ document.getElementById('TabResult').innerHTML = originalRequest.responseText; document.getElementById('Dist').value=''; 
  document.getElementById('Change').style.display='none'; document.getElementById('AddNew').style.display='block';
}

function ClickDelDist(v,dn)
{
 document.getElementById('Dist').value=''; document.getElementById('Change').style.display='none'; document.getElementById('AddNew').style.display='block';
 document.getElementById('Check_'+v).checked=false;
 var agree=confirm("Are you sure you want to delete '"+dn+"' distric name");
 if(agree)
 {
  var StaId=document.getElementById('State').value; var url = 'SalesGetProductionArea.php';	var pars = 'DeleteDistId='+v+'&St='+StaId;	var myAjax = new Ajax.Request(
  url, { method: 'post', parameters: pars, onComplete: show_DeleteDist });
 }
}
function show_DeleteDist(originalRequest)
{ document.getElementById('TabResult').innerHTML = originalRequest.responseText; }
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
	  <td valign="top" align="center"  width="100%" id="MainWindow">
<?php //************************************************************************************************************************************************************?>
<?php //**********************************************START*****START*****START******START******START***************************************************************?>
<?php //************************************************************************************************************************************************************?>
<input type="hidden" id="ComId" value="<?php echo $CompanyId; ?>" />
<input type="hidden" id="UserId" value="<?php echo $UserId; ?>" />		  
<table border="0" style="margin-top:0px; width:100%; height:300px;">
 <tr>
  <td align="left" height="20" valign="top" colspan="3">
   <table border="0">
    <tr><td style="margin-top:0px;width:100%;" class="heading">&nbsp;Distric&nbsp;&nbsp;&nbsp;<b><?php echo $msg; ?></b></td></tr>
	<tr>
	  <td style="margin-top:0px;width:100%;font-family:Times New Roman; font-size:16px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b style="color:#CCCCCC;">
	  DISTRIC&nbsp;&nbsp;&nbsp;&nbsp;<a href="SalesSeedsArea.php?ac=2441&ee=2421&der=true2&c=false&d=dreefoultValue&tt=valuased&desgn=Trern&main=FTrue%False" style="color:#FFBFFF;">AREA</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="SalesSeedsVillage.php?ac=2441&ee=2421&der=true2&c=false&d=dreefoultValue&tt=valuased&desgn=Trern&main=FTrue%False" style="color:#FFBFFF;">VILLAGE/ LOCATION</a>
	  </b>
	  </td></tr>
   </table>
  </td>
 </tr>	
<tr>
 <td valign="top">
  <table>
   <tr>
    <td id="Entry" style="width:480px;" valign="top">
	<span id="TabEntry">
     <table border="0">
      <tr>
	    <td style="font-size:11px; height:18px;color:#FFFFFF;font-weight:bold;">Country Name :</td>
	    <td><select style="font-size:12px;width:180px;height:20px;background-color:#DDFFBB;" name="Coutry" id="Coutry" onChange="ClickCoutry(this.value)"> 
		     <option value="">SELECT</option>
<?php $SqlCountry=mysql_query("SELECT * FROM hrm_country order by CountryName ASC", $con); while($ResCountry=mysql_fetch_array($SqlCountry)) { ?>
<option value="<?php echo $ResCountry['CountryId']; ?>"><?php echo strtoupper($ResCountry['CountryName']); ?></option><?php } ?></select>
       </td>
	  </tr>
	   <tr>
	    <td style="font-size:11px;height:18px;width:120px;color:#FFFFFF;font-weight:bold;">State Name :</td>
	    <td>
		 <span id="StateSpan">
		 <select style="font-size:12px;width:180px;height:20px;background-color:#DDFFBB;" name="State" id="State" onChange="ClickState(this.value)">
         <option value="" selected>SELECT</option>	
        <?php $sql = mysql_query("SELECT * FROM hrm_state order by StateName ASC", $con); while($res = mysql_fetch_array($sql)){ ?>
        <option value="<?php echo $res['StateId']; ?>"><?php echo strtoupper($res['StateName']); ?></option><?php } ?></select>
		 </span>
		</td>
		</tr>
		<tr>
		 <td style="font-size:11px; height:18px;color:#FFFFFF;font-weight:bold;">Distric Name :</td>
		 <td>
		  <span id="DistSpan">
		   <input name="Dist" id="Dist" style="font-size:12px;width:350px;height:20px;" disabled/>
		   <input type="hidden" id="DistID" value=""/>
		  </span>
		 </td>
		</tr>
		<tr>
       <td align="Right" class="fontButton" colspan="2">
	    <table border="0" width="300">
		<tr>
		 <td style="width:28px;">&nbsp;</td>
	     <td><input type="button" name="Delete" id="Delete" value="delete" style="width:90px;display:none;" onClick="Clickdelete()"></td>
	     <td style="width:70px;"><input type="submit" name="Change" id="Change" style="width:90px; display:none;" value="change" onClick="return ClickChange()">
		                         <input type="button" name="AddNew" id="AddNew" style="width:90px;display:none;" value="new" onClick="return ClickNew()"></td>
		 <td style="width:70px;"><input type="button" name="Refrash" value="refresh" style="width:90px;" onClick="javascript:window.location='SalesSeedsAreaLoc.php?ac=4441&ee=4421&der=true3&c=false&d=dreefoultValue&u=UsuuerInfo&trht=FTF%%FTF1221&tt=valuased&desgn=Trern&main=FTrue%False'"/></td>
		</tr>
	    </table>
      </td>
   </tr>
     </table>
	 </span>
    </td>
	<td style="width:50px;">&nbsp;</td>
	<td id="Result" style="width:500px;" valign="top">
	<span id="TabResult">
     <table border="0">
       <tr><td>&nbsp;</td></tr>
     </table>
	</span>
    </td>
   </tr>
  </table>
 </td>
</tr>
</table>
		
<?php //************************************************************************************************************************************************************?>
<?php //**********************************************END*****END*****END******END******END***************************************************************?>
<?php //************************************************************************************************************************************************************?>
		
	  </td>
	</tr>
  </table>
 </td>
</tr>
</table>
</body>
</html>

</html>
