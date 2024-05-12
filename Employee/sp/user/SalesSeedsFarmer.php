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
{ var url = 'SalesGetProductionFarmer.php';	var pars = 'CouId='+value;	var myAjax = new Ajax.Request(
  url, { method: 'post', parameters: pars, onComplete: show_State });
}
function show_State(originalRequest)
{ document.getElementById('StateSpan').innerHTML = originalRequest.responseText; }

function ClickState(value)
{ var url = 'SalesGetProductionFarmer.php';	var pars = 'FVStateId='+value;	var myAjax = new Ajax.Request(
  url, { method: 'post', parameters: pars, onComplete: show_Dist });
}
function show_Dist(originalRequest)
{ document.getElementById('DistSpan').innerHTML = originalRequest.responseText; }

function FarClickDist(value)
{ var url = 'SalesGetProductionFarmer.php';	var pars = 'FVDistId='+value;	var myAjax = new Ajax.Request(
  url, { method: 'post', parameters: pars, onComplete: show_area });
}
function show_area(originalRequest)
{ document.getElementById('AreaSpan').innerHTML = originalRequest.responseText; }


function ClickArea(value)
{ var url = 'SalesGetProductionFarmer.php';	var pars = 'VVAreaId='+value;	var myAjax = new Ajax.Request(
  url, { method: 'post', parameters: pars, onComplete: show_area });
}
function show_area(originalRequest)
{ document.getElementById('VillageLocSpan').innerHTML = originalRequest.responseText; }


function ClickVillageLoc(value)
{ var url = 'SalesGetProductionFarmer.php';	var pars = 'VLocId22='+value;	var myAjax = new Ajax.Request(
  url, { method: 'post', parameters: pars, onComplete: show_VillageLoc });
}
function show_VillageLoc(originalRequest)
{ document.getElementById('TabResult').innerHTML = originalRequest.responseText; document.getElementById('Farmer').disabled=false; 
  document.getElementById('Contact').disabled=false; document.getElementById('Acr').disabled=false;
  document.getElementById('AddNew').style.display='block'; document.getElementById('Change').style.display='none';
}


function ClickNew()
{
 if(document.getElementById('Farmer').value==''){alert("Please Type Farmer Name"); return false;}
 else if(document.getElementById('Farmer').value!='')
 {
  var FarmerName=document.getElementById('Farmer').value; var VLocId=document.getElementById('VillageLoc').value; 
  var Contact=document.getElementById('Contact').value; var Acr=document.getElementById('Acr').value;
  var url = 'SalesGetProductionFarmer.php';	var pars = 'FarmerName='+FarmerName+'&VLocId='+VLocId+'&Contact='+Contact+'&Acr='+Acr; var myAjax = new Ajax.Request(
  url, { method: 'post', parameters: pars, onComplete: show_AddVillage });
 }
}
function show_AddVillage(originalRequest)
{ document.getElementById('TabResult').innerHTML = originalRequest.responseText; document.getElementById('Farmer').value='';
  document.getElementById('Contact').value=''; document.getElementById('Acr').value='';
}


function ClickFarmer(v,fn,fc,fa)
{ 
  if(document.getElementById('Check_'+v).checked==true)
  { 
    document.getElementById('Farmer').value=fn; document.getElementById('Contact').value=fc; document.getElementById('Acr').value=fa; 
	document.getElementById('FarmerID').value=v; document.getElementById('AddNew').style.display='none'; 
	document.getElementById('Change').style.display='block'; document.getElementById('TR'+v).style.background='#FFFFBF';
  }
  else if(document.getElementById('Check_'+v).checked==false)
  { document.getElementById('Farmer').value=''; document.getElementById('Contact').value=''; document.getElementById('Acr').value='';
    document.getElementById('FarmerID').value=''; document.getElementById('AddNew').style.display='block'; 
    document.getElementById('Change').style.display='none'; document.getElementById('TR'+v).style.background='#FFFFFF';
  }
}


function ClickChange()
{
 if(document.getElementById('Farmer').value==''){alert("Please Type Farmer Name"); return false;}
 else if(document.getElementById('Farmer').value!='')
 {
  var FarmerName=document.getElementById('Farmer').value; var Contact=document.getElementById('Contact').value; var Acr=document.getElementById('Acr').value;
  var FarmerID=document.getElementById('FarmerID').value; var VLocId=document.getElementById('VillageLoc').value; 
  var url = 'SalesGetProductionFarmer.php';	var pars = 'ChangeFarmerName='+FarmerName+'&FarmerId='+FarmerID+'&VLocId='+VLocId+'&Contact='+Contact+'&Acr='+Acr;	
  var myAjax = new Ajax.Request( url, { method: 'post', parameters: pars, onComplete: show_ChangeFarmer });
 }
}
function show_ChangeFarmer(originalRequest)
{ document.getElementById('TabResult').innerHTML = originalRequest.responseText; document.getElementById('Farmer').value=''; document.getElementById('Contact').value=''; 
  document.getElementById('Acr').value='';  document.getElementById('Change').style.display='none'; document.getElementById('AddNew').style.display='block';
}


function ClickDelFarmer(v,fn)
{
 document.getElementById('Farmer').value=''; document.getElementById('Contact').value=''; document.getElementById('Acr').value=''; 
 document.getElementById('Change').style.display='none'; document.getElementById('AddNew').style.display='block';
 document.getElementById('Check_'+v).checked=false;
 var agree=confirm("Are you sure you want to delete '"+fn+"' farmer name");
 if(agree)
 {
  var VLocId=document.getElementById('VillageLoc').value;
  var url = 'SalesGetProductionFarmer.php';	var pars = 'DeleteFarmerId='+v+'&VLocId='+VLocId;	var myAjax = new Ajax.Request(
  url, { method: 'post', parameters: pars, onComplete: show_DeleteFarmer });
 }
}
function show_DeleteFarmer(originalRequest)
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
    <tr><td style="margin-top:0px;width:100%;" class="heading">&nbsp;Farmer Details&nbsp;&nbsp;&nbsp;<b><?php echo $msg; ?></b></td></tr>
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
	    <td style="font-size:11px; height:18px;color:#FFFFFF;font-weight:bold;">State Name :</td>
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
	    <td style="font-size:11px;height:18px;width:120px;color:#FFFFFF;font-weight:bold;">Distric Name :</td>
	    <td>
		 <span id="DistSpan">
		 <select style="font-size:12px;width:180px;height:20px;background-color:#DDFFBB;" name="Dist" id="Dist" onChange="FarClickDist(this.value)">
         <option value="" selected>SELECT</option>	
        <?php $sql = mysql_query("SELECT * FROM hrm_sales_distric order by DistName ASC", $con); while($res = mysql_fetch_array($sql)){ ?>
        <option value="<?php echo $res['DistId']; ?>"><?php echo strtoupper($res['DistName']); ?></option><?php } ?></select>
		 </span>
		</td>
		</tr>
		 <tr>
	    <td style="font-size:11px;height:18px;width:120px;color:#FFFFFF;font-weight:bold;">Area Name :</td>
	    <td>
		 <span id="AreaSpan">
		 <select style="font-size:12px;width:180px;height:20px;background-color:#DDFFBB;" name="Area" id="Area" onChange="ClickArea(this.value)">
         <option value="" selected>SELECT</option>	
        <?php $sql = mysql_query("SELECT * FROM hrm_sales_areavillage order by AreaName ASC", $con); while($res = mysql_fetch_array($sql)){ ?>
        <option value="<?php echo $res['AreaId']; ?>"><?php echo strtoupper($res['AreaName']); ?></option><?php } ?></select>
		 </span>
		</td>
		</tr>
		 <tr>
	    <td style="font-size:11px;height:18px;width:120px;color:#FFFFFF;font-weight:bold;">Village/ Location :</td>
	    <td>
		 <span id="VillageLocSpan">
		 <select style="font-size:12px;width:300px;height:20px;background-color:#DDFFBB;" name="VillageLoc" id="VillageLoc" onChange="ClickVillageLoc(this.value)">
         <option value="" selected>SELECT</option>	
        <?php $sql = mysql_query("SELECT * FROM hrm_sales_villageloc order by VillageLocName ASC", $con); while($res = mysql_fetch_array($sql)){ ?>
        <option value="<?php echo $res['VillageLocId']; ?>"><?php echo strtoupper($res['VillageLocName']); ?></option><?php } ?></select>
		 </span>
		</td>
		</tr>
		<tr>
		 <td style="font-size:11px; height:18px;color:#FFFFFF;font-weight:bold;">Farmer Name :</td>
		 <td>
		  <span id="FarmerSpan">
		   <input name="Farmer" id="Farmer" style="font-size:12px;width:300px;height:20px;" disabled/>
		   <input type="hidden" id="FarmerID" value=""/>
		  </span>
		 </td>
		</tr>
		<tr>
		 <td style="font-size:11px; height:18px;color:#FFFFFF;font-weight:bold;">Contact Number:</td>
		 <td><input name="Contact" id="Contact" style="font-size:12px;width:150px;height:20px;" maxlength="10" disabled/></td>
		</tr>
		<tr>
		 <td style="font-size:11px; height:18px;color:#FFFFFF;font-weight:bold;">Acreage:</td>
		 <td><input name="Acr" id="Acr" style="font-size:12px;width:150px;height:20px;" maxlength="10" disabled/></td>
		</tr>
		<tr>
       <td align="Right" class="fontButton" colspan="2">
	    <table border="0" width="300">
		<tr>
		 <td style="width:28px;">&nbsp;</td>
	     <td><input type="button" name="Delete" id="Delete" value="delete" style="width:90px;display:none;" onClick="Clickdelete()"></td>
	     <td style="width:70px;"><input type="submit" name="Change" id="Change" style="width:90px; display:none;" value="change" onClick="return ClickChange()">
		                         <input type="button" name="AddNew" id="AddNew" style="width:90px;display:none;" value="new" onClick="return ClickNew()"></td>
		 <td style="width:70px;"><input type="button" name="Refrash" value="refresh" style="width:90px;" onClick="javascript:window.location='SalesSeedsFarmer.php?ac=4441&ee=4421&der=true3&c=false&d=dreefoultValue&u=UsuuerInfo&trht=FTF%%FTF1221&tt=valuased&desgn=Trern&main=FTrue%False'"/></td>
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
