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
{ var url = 'SHeadQuaterAct.php';	var pars = 'CouId='+value;	var myAjax = new Ajax.Request(
  url, { method: 'post', parameters: pars, onComplete: show_State });
}
function show_State(originalRequest)
{ document.getElementById('StateSpan').innerHTML = originalRequest.responseText; }

function ClickState(value)
{ var CId=document.getElementById('ComId').value; var url = 'SHeadQuaterAct.php';	var pars = 'StaIdHq='+value+'&CId='+CId;	var myAjax = new Ajax.Request(
  url, { method: 'post', parameters: pars, onComplete: show_Hq });
}
function show_Hq(originalRequest)
{ document.getElementById('TabResult').innerHTML = originalRequest.responseText; document.getElementById('Hq').disabled=false;
  document.getElementById('AddNew').style.display='block'; document.getElementById('Change').style.display='none';
}


function ClickNew()
{
 if(document.getElementById('Hq').value==''){alert("Please Type Head Quarter Name"); return false;}
 else if(document.getElementById('Hq').value!='')
 {
  var HqName=document.getElementById('Hq').value; var si=document.getElementById('State').value; var yi=document.getElementById('YId').value; 
  var ci=document.getElementById('ComId').value; var ui=document.getElementById('UserId').value;
  var url = 'SHeadQuaterAct.php';	var pars = 'HqName='+HqName+'&ui='+ui+'&ci='+ci+'&si='+si+'&yi='+yi; 
  var myAjax = new Ajax.Request( url, { method: 'post', parameters: pars, onComplete: show_AddDealer });
 }
}
function show_AddDealer(originalRequest)
{ document.getElementById('TabResult').innerHTML = originalRequest.responseText; document.getElementById('Hq').value=''; }


function ClickHq(v,n)
{ 
  if(document.getElementById('Check_'+v).checked==true)
  { 
    document.getElementById('Hq').value=n; document.getElementById('HqID').value=v; document.getElementById('AddNew').style.display='none'; 
	document.getElementById('Change').style.display='block'; document.getElementById('TR'+v).style.background='#FFFFBF';
  }
  else if(document.getElementById('Check_'+v).checked==false)
  { document.getElementById('Hq').value=''; document.getElementById('HqID').value=''; document.getElementById('AddNew').style.display='block'; 
    document.getElementById('Change').style.display='none'; document.getElementById('TR'+v).style.background='#FFFFFF';
  }
}

function ClickChange()
{
 if(document.getElementById('Hq').value==''){alert("Please Type Head Quarter Name"); return false;}
 else if(document.getElementById('Hq').value!='')
 {
  var HqName=document.getElementById('Hq').value; var HqID=document.getElementById('HqID').value; var si=document.getElementById('State').value; 
  var ci=document.getElementById('ComId').value; var ui=document.getElementById('UserId').value; var yi=document.getElementById('YId').value;
  var url = 'SHeadQuaterAct.php';	var pars = 'ChangeHqName='+HqName+'&HqId='+HqID+'&ui='+ui+'&ci='+ci+'&si='+si+'&yi='+yi;	
  var myAjax = new Ajax.Request( url, { method: 'post', parameters: pars, onComplete: show_ChangeDealer });
 }
}
function show_ChangeDealer(originalRequest)
{ document.getElementById('TabResult').innerHTML = originalRequest.responseText; document.getElementById('Hq').value=''; 
  document.getElementById('Change').style.display='none'; document.getElementById('AddNew').style.display='block';
}

/*
function ClickDelHq(v,n)
{
 document.getElementById('Hq').value=''; document.getElementById('Change').style.display='none'; document.getElementById('AddNew').style.display='block';
 document.getElementById('Check_'+v).checked=false;
 var agree=confirm("Are you sure you want to delete '"+n+"' Head Quarter name");
 if(agree)
 { 
  var si=document.getElementById('State').value; var ci=document.getElementById('ComId').value; var url = 'SHeadQuaterAct.php';	var pars = 'DeleteHqId='+v+'&ci='+ci+'&si='+si;	
  var myAjax = new Ajax.Request( url, { method: 'post', parameters: pars, onComplete: show_DeleteDealer });
 }
}
function show_DeleteDealer(originalRequest){ document.getElementById('TabResult').innerHTML = originalRequest.responseText; }
*/

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
<input type="hidden" id="YId" value="<?php echo $YearId; ?>" />		  
<table border="0" style="margin-top:0px; width:100%; height:300px;">
 <tr>
  <td align="left" height="20" valign="top" colspan="3">
   <table border="0">
    <tr><td  style="margin-top:0px;width:100%;" class="heading">&nbsp;Head Quarter Details&nbsp;&nbsp;&nbsp;<b><?php echo $msg; ?></b></td></tr>
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
		     <option value="">Select</option>
<?php $SqlCountry=mysql_query("SELECT * FROM hrm_country order by CountryName ASC", $con); while($ResCountry=mysql_fetch_array($SqlCountry)) { ?>
<option value="<?php echo $ResCountry['CountryId']; ?>"><?php echo $ResCountry['CountryName']; ?></option><?php } ?></select>
       </td>
	  </tr>
	   <tr>
	    <td style="font-size:11px;height:18px;width:120px;color:#FFFFFF;font-weight:bold;">State Name :</td>
	    <td>
		 <span id="StateSpan">
		 <select style="font-size:12px;width:180px;height:20px;background-color:#DDFFBB;" name="State" id="State" onChange="ClickState(this.value)">
         <option value="" selected>Select</option>	
        <?php $sql = mysql_query("SELECT * FROM hrm_state order by StateName ASC", $con); while($res = mysql_fetch_array($sql)){ ?>
        <option value="<?php echo $res['StateId']; ?>"><?php echo $res['StateName']; ?></option><?php } ?></select>
		 </span>
		</td>
		</tr>
		<tr>
		 <td style="font-size:11px; height:18px;color:#FFFFFF;font-weight:bold;">Head Quarter :</td>
		 <td>
		  <span id="HqSpan">
		   <input name="Hq" id="Hq" style="font-size:12px;width:350px;height:20px;" disabled/>
		   <input type="hidden" id="HqID" value=""/>
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
		 <td style="width:70px;"><input type="button" name="Refrash" value="refresh" style="width:90px;" onClick="javascript:window.location='SHeadQuater.php?ac=4441&ee=4421&der=true3&c=false&d=dreefoultValue&u=UsuuerInfo&trht=FTF%%FTF1221&tt=valuased&desgn=Trern&main=FTrue%False'"/></td>
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
