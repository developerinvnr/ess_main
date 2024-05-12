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
{ var url = 'SlctSalesCouStaCit.php';	var pars = 'CouId='+value;	var myAjax = new Ajax.Request(
  url, { method: 'post', parameters: pars, onComplete: show_State });
}
function show_State(originalRequest)
{ document.getElementById('StateSpan').innerHTML = originalRequest.responseText; }

function ClickState(value)
{ var CId=document.getElementById('ComId').value; var url = 'SlctSalesCouStaCit.php';	var pars = 'StaId='+value+'&CId='+CId;	var myAjax = new Ajax.Request(
  url, { method: 'post', parameters: pars, onComplete: show_Hq });
}
function show_Hq(originalRequest)
{ document.getElementById('HqSpan').innerHTML = originalRequest.responseText;}

function ClickHq(value)
{ var url = 'SlctSalesCouStaCit.php';	var pars = 'HqId='+value;	var myAjax = new Ajax.Request(
  url, { method: 'post', parameters: pars, onComplete: show_Dealer });
}
function show_Dealer(originalRequest)
{ document.getElementById('TabResult').innerHTML = originalRequest.responseText; document.getElementById('Dealer').disabled=false;
  document.getElementById('DealerCity').disabled=false; document.getElementById('DealerCont').disabled=false; document.getElementById('DealerPerson').disabled=false; 
  document.getElementById('DealerEmail').disabled=false; document.getElementById('AddNew').style.display='block'; document.getElementById('Change').style.display='none';
}

function ClickNew()
{
 if(document.getElementById('Dealer').value==''){alert("Please Type Dealer Name"); return false;}
 else if(document.getElementById('Dealer').value!='')
 {
  var DealName=document.getElementById('Dealer').value; var DealCity=document.getElementById('DealerCity').value; var DealCont=document.getElementById('DealerCont').value; 
  var HqId=document.getElementById('Hq').value; var DealPerson=document.getElementById('DealerPerson').value; var DealEmail=document.getElementById('DealerEmail').value;
  var CId=document.getElementById('ComId').value; var UId=document.getElementById('UserId').value;
  var url = 'SlctSalesCouStaCit.php';	var pars = 'DealName='+DealName+'&hq='+HqId+'&ui='+UId+'&ci='+CId+'&DealCity='+DealCity+'&DealCont='+DealCont+'&DealPerson='+DealPerson+'&DealEmail='+DealEmail; var myAjax = new Ajax.Request(
  url, { method: 'post', parameters: pars, onComplete: show_AddDealer });
 }
}
function show_AddDealer(originalRequest)
{ document.getElementById('TabResult').innerHTML = originalRequest.responseText; document.getElementById('Dealer').value=''; document.getElementById('DealerCity').value=''; 
  document.getElementById('DealerPerson').value=''; document.getElementById('DealerEmail').value=''; document.getElementById('DealerCont').value='';
}

function ClickDealer(v,dn,da,dc,dp,de)
{ 
  if(document.getElementById('Check_'+v).checked==true)
  { 
    document.getElementById('Dealer').value=dn; document.getElementById('DealerCity').value=da; document.getElementById('DealerCont').value=dc; 
	document.getElementById('DealerPerson').value=dp; document.getElementById('DealerEmail').value=de;
	document.getElementById('DealerID').value=v; document.getElementById('AddNew').style.display='none'; 
	document.getElementById('Change').style.display='block'; document.getElementById('TR'+v).style.background='#FFFFBF';
  }
  else if(document.getElementById('Check_'+v).checked==false)
  { document.getElementById('Dealer').value=''; document.getElementById('DealerCity').value=''; document.getElementById('DealerCont').value='';
    document.getElementById('DealerPerson').value=''; document.getElementById('DealerEmail').value='';
    document.getElementById('DealerID').value=''; document.getElementById('AddNew').style.display='block'; 
    document.getElementById('Change').style.display='none'; document.getElementById('TR'+v).style.background='#FFFFFF';
  }
}

function ClickChange()
{
 if(document.getElementById('Dealer').value==''){alert("Please Type Dealer Name"); return false;}
 else if(document.getElementById('Dealer').value!='')
 {
  var DealName=document.getElementById('Dealer').value; var DealCity=document.getElementById('DealerCity').value; var DealCont=document.getElementById('DealerCont').value;
  var DealPerson=document.getElementById('DealerPerson').value; var DealEmail=document.getElementById('DealerEmail').value;
  var DealerID=document.getElementById('DealerID').value; var HqId=document.getElementById('Hq').value; 
  var CId=document.getElementById('ComId').value; var UId=document.getElementById('UserId').value;
  var url = 'SlctSalesCouStaCit.php';	var pars = 'ChangeDealName='+DealName+'&DeId='+DealerID+'&ui='+UId+'&ci='+CId+'&hq='+HqId+'&DealCity='+DealCity+'&DealCont='+DealCont+'&DealPerson='+DealPerson+'&DealEmail='+DealEmail;	
  var myAjax = new Ajax.Request( url, { method: 'post', parameters: pars, onComplete: show_ChangeDealer });
 }
}
function show_ChangeDealer(originalRequest)
{ document.getElementById('TabResult').innerHTML = originalRequest.responseText; document.getElementById('Dealer').value=''; document.getElementById('DealerCity').value=''; 
  document.getElementById('DealerPerson').value=''; document.getElementById('DealerEmail').value='';
  document.getElementById('DealerCont').value='';  document.getElementById('Change').style.display='none'; document.getElementById('AddNew').style.display='block';
}

function ClickDelDealer(v,dn)
{
 document.getElementById('Dealer').value=''; document.getElementById('DealerCity').value=''; document.getElementById('DealerCont').value=''; 
 document.getElementById('DealerPerson').value=''; document.getElementById('DealerEmail').value='';
 document.getElementById('Change').style.display='none'; document.getElementById('AddNew').style.display='block';
 document.getElementById('Check_'+v).checked=false;
 var agree=confirm("Are you sure you want to delete '"+dn+"' deler name");
 if(agree)
 {
  var HqId=document.getElementById('Hq').value; var url = 'SlctSalesCouStaCit.php';	var pars = 'DeleteDealId='+v+'&hq='+HqId;	var myAjax = new Ajax.Request(
  url, { method: 'post', parameters: pars, onComplete: show_DeleteDealer });
 }
}
function show_DeleteDealer(originalRequest)
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
	  <td valign="top" align="center"  width="100%" id="MainWindow"><br>
<?php //************************************************************************************************************************************************************?>
<?php //**********************************************START*****START*****START******START******START***************************************************************?>
<?php //************************************************************************************************************************************************************?>
<input type="hidden" id="ComId" value="<?php echo $CompanyId; ?>" />
<input type="hidden" id="UserId" value="<?php echo $UserId; ?>" />		  
<table border="0" style="margin-top:0px; width:100%; height:300px;">
 <tr>
  <td align="left" height="20" valign="top" colspan="3">
   <table border="0">
    <tr><td  style="margin-top:0px;width:100%;" class="heading">&nbsp;Distributor Details&nbsp;&nbsp;&nbsp;<b><?php echo $msg; ?></b></td></tr>
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
<option value="<?php echo $ResCountry['CountryId']; ?>"><?php echo $ResCountry['CountryName']; ?></option><?php } ?></select>
       </td>
	  </tr>
	   <tr>
	    <td style="font-size:11px;height:18px;width:120px;color:#FFFFFF;font-weight:bold;">State Name :</td>
	    <td>
		 <span id="StateSpan">
		 <select style="font-size:12px;width:180px;height:20px;background-color:#DDFFBB;" name="State" id="State" onChange="ClickState(this.value)">
         <option value="" selected>SELECT</option>	
        <?php $sql = mysql_query("SELECT * FROM hrm_state order by StateName ASC", $con); while($res = mysql_fetch_array($sql)){ ?>
        <option value="<?php echo $res['StateId']; ?>"><?php echo $res['StateName']; ?></option><?php } ?></select>
		 </span>
		</td>
		</tr>
		<tr>
	     <td style="font-size:11px; height:18px;color:#FFFFFF;font-weight:bold;">Head Quarter :</td>
	     <td>
		 <span id="HqSpan">
		 <select style="font-size:12px;width:180px;height:20px;background-color:#DDFFBB;" name="Hq" id="Hq" onChange="ClickHq(this.value)">
         <option value="" selected>SELECT</option>
<?php $sql = mysql_query("SELECT * FROM hrm_headquater where CompanyId=".$CompanyId." AND HQStatus='A' order by HqName ASC", $con); while($res = mysql_fetch_array($sql)){ ?>
         <option value="<?php echo $res['HqId']; ?>"><?php echo $res['HqName']; ?></option><?php } ?></select>
		 </span>
		 </td>
		</tr>
		<tr>
		 <td style="font-size:11px; height:18px;color:#FFFFFF;font-weight:bold;">Distributor :</td>
		 <td>
		  <span id="DealerSpan">
		   <input name="Dealer" id="Dealer" style="font-size:12px;width:350px;height:20px;" disabled/>
		   <input type="hidden" id="DealerID" value=""/>
		  </span>
		 </td>
		</tr>
		<tr>
		 <td style="font-size:11px; height:18px;color:#FFFFFF;font-weight:bold;">City :</td>
		 <td><input name="DealerCity" id="DealerCity" style="font-size:12px;width:200px;height:20px;" disabled/></td>
		</tr>
		<tr>
		 <td style="font-size:11px; height:18px;color:#FFFFFF;font-weight:bold;">Contact Person. :</td>
		 <td><input name="DealerPerson" id="DealerPerson" style="font-size:12px;width:300px;height:20px;" disabled maxlength="50"/></td>
		</tr>
		<tr>
		 <td style="font-size:11px; height:18px;color:#FFFFFF;font-weight:bold;">EmailId:</td>
		 <td><input name="DealerEmail" id="DealerEmail" style="font-size:12px;width:300px;height:20px;" disabled maxlength="50"/></td>
		</tr>
		<tr>
		 <td style="font-size:11px; height:18px;color:#FFFFFF;font-weight:bold;">Contact No. :</td>
		 <td><input name="DealerCont" id="DealerCont" style="font-size:12px;width:100px;height:20px;" disabled maxlength="10"/></td>
		</tr>
		<tr>
       <td align="Right" class="fontButton" colspan="2">
	    <table border="0" width="300">
		<tr>
		 <td style="width:28px;">&nbsp;</td>
	     <td><input type="button" name="Delete" id="Delete" value="delete" style="width:90px;display:none;" onClick="Clickdelete()"></td>
	     <td style="width:70px;"><input type="submit" name="Change" id="Change" style="width:90px; display:none;" value="change" onClick="return ClickChange()">
		                         <input type="button" name="AddNew" id="AddNew" style="width:90px;display:none;" value="new" onClick="return ClickNew()"></td>
		 <td style="width:70px;"><input type="button" name="Refrash" value="refresh" style="width:90px;" onClick="javascript:window.location='SalesDealerName.php?ac=4441&ee=4421&der=true3&c=false&d=dreefoultValue&u=UsuuerInfo&trht=FTF%%FTF1221&tt=valuased&desgn=Trern&main=FTrue%False'"/></td>
		</tr>
	    </table>
      </td>
   </tr>
     </table>
	 </span>
    </td>
	<td style="width:50px;">&nbsp;</td>
	<td id="Result" style="width:600px;" valign="top">
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
