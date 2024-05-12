<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}
?>
<?php                                          //Country
if(isset($_POST['AddNewCountry']))
{ 
   $SqlInseart = mysql_query("INSERT INTO hrm_country(CountryName,CompanyId,CountryStatus,CreatedBy,CreatedDate,YearId) VALUES('".$_POST['CountryName']."', '".$CompanyId."', 'A', '".$UserId."','".date('Y-m-d')."','".$YearId."')", $con); 
   if($SqlInseart){ $msg = "Data has been Inserted successfully..."; }
}
if(isset($_POST['ChangeCountry']))
{
 	 $SqlUpdate = mysql_query("UPDATE hrm_country SET CountryName='".$_POST['CountryName']."' WHERE CountryId=".$_POST['CountryId'], $con) or die(mysql_error()); 
     if($SqlUpdate){ $msg = "Data has been Updeted successfully...";}
}
if(isset($_REQUEST['action']) && $_REQUEST['action']=="deleteCountry")
{ 
  $SqlDelete=mysql_query("UPDATE hrm_country SET CountryStatus='De' WHERE CountryId=".$_REQUEST['did'], $con) or die(mysql_error());
  if($SqlDelete) { $msg = "Data has been deleted successfully..."; }
}

                                                 //State
if(isset($_POST['AddNewState']))
{ 
   $SqlInseart = mysql_query("INSERT INTO hrm_state(StateName,CountryId,CompanyId,StateStatus,CreatedBy,CreatedDate,YearId) VALUES('".$_POST['StateName']."', ".$_POST['CouStateSelect'].", '".$CompanyId."', 'A', '".$UserId."','".date('Y-m-d')."','".$YearId."')", $con); 
   if($SqlInseart){ $msg = "Data has been Inserted successfully..."; }
}
if(isset($_POST['ChangeState']))
{
 	 $SqlUpdate = mysql_query("UPDATE hrm_state SET StateName='".$_POST['StateName']."' WHERE StateId=".$_POST['StateId'], $con) or die(mysql_error()); 
     if($SqlUpdate){ $msg = "Data has been Updeted successfully...";}
}
if(isset($_REQUEST['action']) && $_REQUEST['action']=="deleteState")
{ 
  $SqlDelete=mysql_query("UPDATE hrm_state SET StateStatus='De' WHERE StateId=".$_REQUEST['did'], $con) or die(mysql_error());
  if($SqlDelete) { $msg = "Data has been deleted successfully..."; }
}

                                                 //City

if(isset($_POST['AddNewCity']))
{ 
   $SqlInseart = mysql_query("INSERT INTO hrm_city(CityName,StateId,CompanyId,CityStatus,CreatedBy,CreatedDate,YearId) VALUES('".$_POST['CityName']."', ".$_POST['CityStateId'].", '".$CompanyId."', 'A', '".$UserId."','".date('Y-m-d')."','".$YearId."')", $con); 
   if($SqlInseart){ $msg = "Data has been Inserted successfully..."; }
}
if(isset($_POST['ChangeCity']))
{
 	 $SqlUpdate = mysql_query("UPDATE hrm_city SET CityName='".$_POST['CityName']."' WHERE CityId=".$_POST['CityId'], $con) or die(mysql_error()); 
     if($SqlUpdate){ $msg = "Data has been Updeted successfully...";}
}
if(isset($_REQUEST['action']) && $_REQUEST['action']=="deleteCity")
{ 
  $SqlDelete=mysql_query("UPDATE hrm_city SET CityStatus='De' WHERE CityId=".$_REQUEST['did'], $con) or die(mysql_error());
  if($SqlDelete) { $msg = "Data has been deleted successfully..."; }
}
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
</style>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<script type="text/javascript" src="js/MicellaneousAjaxCall.js"></script>
<Script type="text/javascript">window.history.forward(1);</script>
<script type="text/javascript" src="js/CountryStateCity.js"></script>
<Script type="text/javascript">window.history.forward(1);</Script>
<Script language="javascript">
function validate(formCountry) 
{ var CountryName = formCountry.CountryName.value;  var filter=/^[a-zA-Z. /]+$/; var test_bool = filter.test(CountryName);
 if (CountryName.length === 0) { alert("You must enter a Country Name.");  return false; }
 if(test_bool==false) { alert('Please Enter Only Alphabets in the Country Name Field');  return false; } }
  
function validate(formState) 
{ alert("aa");var StateName = formState.StateName.value;  var filter=/^[a-zA-Z. /]+$/; var test_bool2 = filter.test(StateName);
  if (StateName.length === 0) { alert("You must enter a State Name.");  return false; }
  if(test_bool2==false) { alert('Please Enter Only Alphabets in the State Name Field');  return false; } }  
  
function validate(formCity) 
{ var CityName = formCity.CityName.value;  var filter=/^[a-zA-Z. /]+$/; var test_bool3 = filter.test(CityName);
  if (CityName.length === 0) { alert("You must enter a City Name.");  return false; }
  if(test_bool3==false) { alert('Please Enter Only Alphabets in the City Name Field');  return false; } }    

function deleteCountry() { var agree=confirm("Are you sure you want to delete this record?");
if (agree) { var a = document.getElementById("CountryId").value; var x = "CountryStateCity.php?action=deleteCountry&did="+a;  window.location=x;}}
function deleteState() { var agree=confirm("Are you sure you want to delete this record?");
if (agree) { var a = document.getElementById("StateId").value; var x = "CountryStateCity.php?action=deleteState&did="+a;  window.location=x;}}
function deleteCity() { var agree=confirm("Are you sure you want to delete this record?");
if (agree) { var a = document.getElementById("CityId").value; var x = "CountryStateCity.php?action=deleteCity&did="+a;  window.location=x;}}
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
 <td valign="top">
  <table width="100%" style="margin-top:0px;" border="0">
    <tr>
	  <td valign="top"><?php if($_SESSION['login'] = true){ require_once("AWelcome.php"); } ?></td>
	</tr>
	 <tr>
	  <td valign="top" align="center"  width="100%" id="MainWindow"><br>
<?php //************************************************************************************************************************************************************?>
<?php //**********************************************START*****START*****START******START******START***************************************************************?>
<?php //************************************************************************************************************************************************************?>
	  
<table border="0" style="margin-top:0px; width:100%; height:300px;">
 <tr>
  <td align="left" height="20" valign="top" colspan="3">
   <table border="0">
    <tr>
	  <td align="right" width="450" class="heading">Country-State-City</td>
	  <td align="left">
	    <b><span id="scountry" class="span1">: -&nbsp;Country</span><span id="sstate" class="span">: -&nbsp;State</span><span id="scity" class="span">: -&nbsp;City</span></b>
	  </td>
	  <td class="font4" style="left">&nbsp;&nbsp;&nbsp;<b><?php echo $msg; ?></b></td>
	</tr>
   </table>
  </td>
 </tr>
<?php if(($_SESSION['UserType']=='S' OR $_SESSION['UserType']=='A' OR $_SESSION['UserType']=='U') AND $_SESSION['login'] = true) { ?>	
 <tr>
 <td style="width:100px;" valign="top" align="center">&nbsp;
   <table border="0" cellpadding="0px;" align="center">
    <tr><td align="center"><a href="#"><img src="images/country.png" border="0" onClick="OpenCountry()"/></a></td></tr>
	<tr><td align="center"><a href="#"><img src="images/state.png" border="0" onClick="OpenState()"/></a></td></tr>
	<tr><td align="center"><a href="#"><img src="images/city.png" border="0" onClick="OpenCity()"/></a></td></tr>
	<tr><td align="center"><a href="#"><img src="images/back.png" border="0" onClick="javascript:window.location='Index.php?log=<?php echo $_SESSION['logCheckUser']; ?>'"/></a></td></tr>   <tr><td align="center"><a href="#"><img src="images/cancel.png" border="0" onClick="javascript:window.location='CountryStateCity.php'"/></a></td></tr>
   </table>
 </td>
 <td width="100">&nbsp;</td>
<?php //*********************************************** Country ******************************************************?> 
<td align="left" id="country" valign="top" style="display:block;">             
  <form name="formCountry" method="post" onSubmit="return validate(this)">
   <table border="0">
   <tr>
	<td align="left">
	 <table border="0" width="550"><tr>
	    <td class="td1" style="font-size:11px; width:380px;" valign="top"><span id="CountrySpan">
		  <table><tr><td style="font-size:11px; height:18px;">Name :</td><td><input name="CountryName" id="CountryName" style="font-size:11px; width:150px; height:18px;"/>
		  </span></td></tr></table>
       </td>
       <td align="right" style="font-size:11px; width:180px;">
		<select style="width:180px; background-color:#F1EDF8;" name="CountrySelect" id="CountrySelect" size="8" onChange="selectCountry(this.value)">
		 <?php $SqlCountry=mysql_query("SELECT * FROM hrm_country where CountryStatus='A' order by CountryName ASC", $con); while($ResCountry=mysql_fetch_array($SqlCountry)) { ?>
		<option value="<?php echo $ResCountry['CountryId']; ?>">&nbsp;<?php echo $ResCountry['CountryName']; ?></option><?php } ?></select>
	  </td></tr>
     </table>
   </td>
  </tr>
<?php if($_SESSION['User_Permission']=='Edit'){?>	  
  <tr>
      <td align="Right" class="fontButton"><table border="0" width="550"><tr>
		 <td align="right"><input type="submit" name="ChangeCountry" id="ChangeCountry" style="width:90px; display:none;" value="change"></td>
		 <td align="right" style="width:70px;"><input type="button" name="DeleteCountry" id="DeleteCountry" value="delete" style="width:90px; display:none;" onClick="deleteCountry()">
		                                       <input type="submit" name="AddNewCountry" id="AddNewCountry" style="width:90px; display:block;" value="add new"></td>
		 <td align="right" style="width:70px;"><input type="button" name="RefreshCountry" id="RefreshCountry" style="width:90px;" value="refresh" onClick="a()"/></td>
		 </tr></table>
      </td>
   </tr>
<?php } ?>
  </table>
 </form>       
</td>
<?php //*********************************************** Country Close******************************************************?>    
<?php //*********************************************** State ******************************************************?>  
  <td align="left" id="state" valign="top" style="display:none;">             
    <form name="formState" method="post" onSubmit="return validate(this)">
   <table border="0">
   <tr>
	<td align="left">
	 <table border="0" width="550"><tr>
	    <td class="td1" style="font-size:11px; width:380px;" valign="top">
		  <span id="CountryState"></span>
		  <table id="CouStateTable" style="display:block;">
		    <tr><td style="font-size:11px; height:18px;">Country Name :</td>
			    <td><select style="font-size:11px; width:180px; height:18px; background-color:#DDFFBB;" name="CouStateSelect" id="CouStateSelect" onChange="selectCouState(this.value)"> 
				     <option value="">&nbsp;Select</option>
		 <?php $SqlCountry=mysql_query("SELECT * FROM hrm_country where CountryStatus='A' order by CountryName ASC", $con); while($ResCountry=mysql_fetch_array($SqlCountry)) { ?>
		            <option value="<?php echo $ResCountry['CountryId']; ?>">&nbsp;<?php echo $ResCountry['CountryName']; ?></option><?php } ?></select></td>
		   </tr>
		   <tr><td style="font-size:11px; height:18px;">State Name :</td>
			   <td><span id="StateSpan"><input name="StateName" id="StateName" style="font-size:11px; width:180px; height:18px;" disabled/></span></td>
		   </tr>
		 </table>
       </td>
       <td align="right" style="font-size:11px; width:180px;"><span id="CouStateSpan">
		<select style="width:180px; background-color:#F1EDF8;" name="StateSelect" id="StateSelect" size="8" onChange="selectState(this.value)">
		<option value="">&nbsp;</option></select></span>
	  </td></tr>
     </table>
   </td>
  </tr>
<?php if($_SESSION['User_Permission']=='Edit'){?>  
  <tr>
      <td align="Right" class="fontButton"><table border="0" width="550"><tr>
		 <td align="right"><input type="submit" name="ChangeState" id="ChangeState" style="width:90px; display:none;" value="change"></td>
		 <td align="right" style="width:70px;"><input type="button" name="DeleteState" id="DeleteState" value="delete" style="width:90px; display:none;" onClick="deleteState()">
		                                       <input type="submit" name="AddNewState" id="AddNewState" style="width:90px; display:block;" value="add new"></td>
		 <td align="right" style="width:70px;"><input type="button" name="RefreshState" id="RefreshState" style="width:90px;" value="refresh" onClick="b()"/></td>
		 </tr></table>
      </td>
   </tr>
<?php } ?>
  </table>
 </form>       
   </td>
<?php //*********************************************** State Close******************************************************?>    
   <?php //*********************************************** City ******************************************************?>  
  <td align="left" id="city" valign="top" style="display:none;">             
   <form name="formCity" method="post" onSubmit="return validate(this)">
   <table border="0">
   <tr>
	<td align="left">
	 <table border="0" width="550"><tr>
	    <td class="td1" style="font-size:11px; width:380px;" valign="top">
		  <span id="CountryState"></span>
		  <table id="CouStateTable" style="display:block;">
		    <tr><td style="font-size:11px; height:18px;">Country Name :</td>
			    <td><select style="font-size:11px; width:180px; height:18px; background-color:#DDFFBB;" name="CouStateSelect1" id="CouStateSelect1" onChange="selectCouState1(this.value)"> 
				     <option value="">&nbsp;Select</option>
		 <?php $SqlCountry=mysql_query("SELECT * FROM hrm_country order by CountryName ASC", $con); while($ResCountry=mysql_fetch_array($SqlCountry)) { ?>
		            <option value="<?php echo $ResCountry['CountryId']; ?>">&nbsp;<?php echo $ResCountry['CountryName']; ?></option><?php } ?></select></td>
		   </tr>
		   <tr><td style="font-size:11px; height:18px;">State Name :</td>
			    <td><span id="CouStateSpan1">
				<select style="font-size:11px; width:180px; height:18px; background-color:#DDFFBB;" name="CouCitySelect" id="CouCitySelect" onChange="selectCouCity(this.value)" disabled> 		        <option>&nbsp;</option>  
				</select></span></td>
		   </tr>
		   <tr><td style="font-size:11px; height:18px;">City Name :</td>
			   <td><span id="CitySpan"><input name="CityName" id="CityName" style="font-size:11px; width:180px; height:18px;" disabled/></span></td>
		   </tr>
		 </table>
       </td>
       <td align="right" style="font-size:11px; width:180px;"><span id="CouStateCitySpan">
		<select style="width:180px; background-color:#F1EDF8;" name="CitySelect" id="CitySelect" size="8" onChange="selectCity(this.value)">
		<option value="">&nbsp;</option></select></span>
	  </td></tr>
     </table>
   </td>
  </tr>
<?php if($_SESSION['User_Permission']=='Edit'){?>	  
  <tr>
      <td align="Right" class="fontButton"><table border="0" width="550"><tr>
		 <td align="right"><input type="submit" name="ChangeCity" id="ChangeCity" style="width:90px; display:none;" value="change"></td>
		 <td align="right" style="width:70px;"><input type="button" name="DeleteCity" id="DeleteCity" value="delete" style="width:90px; display:none;" onClick="deleteCity()">
		                                       <input type="submit" name="AddNewCity" id="AddNewCity" style="width:90px; display:block;" value="add new"></td>
		 <td align="right" style="width:70px;"><input type="button" name="RefreshCity" id="RefreshCity" style="width:90px;" value="refresh" onClick="c()"/></td>
		 </tr></table>
      </td>
   </tr>
<?php } ?>
  </table>
 </form>       
   </td>
<?php //*********************************************** City Close******************************************************?>    

 </tr>
<?php } ?> 
</table>
		
<?php //************************************************************************************************************************************************************?>
<?php //**********************************************END*****END*****END******END******END***************************************************************?>
<?php //************************************************************************************************************************************************************?>
		
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
