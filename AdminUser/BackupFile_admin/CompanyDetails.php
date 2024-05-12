<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
include('codeEncDec.php');
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}
if($_SESSION['login'] = true){require_once('PhpFile/CompanyDetailsP.php'); }
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
<script type="text/javascript" src="js/MasterAjaxCall.js"></script>
<Script type="text/javascript">window.history.forward(1);</script>
<script type="text/javascript" src="js/CompanyDetails.js" ></script>  
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
	  <td align="right" width="352" class="heading">Company Details</td>
	  <td align="left">
	    <b><span id="">: -&nbsp;</span></b>
	  </td>
	  <td class="font4" style="left">&nbsp;&nbsp;&nbsp;<b><?php echo $msg; ?></b></td>
	</tr>
   </table>
  </td>
 </tr>
<?php if(($_SESSION['UserType']=='S' OR $_SESSION['UserType']=='A') AND $_SESSION['login'] = true) { ?>	
 <tr>
 <td style="width:100px;" valign="top" align="center">&nbsp;
   <table border="0" cellpadding="0px;" align="center">
	<tr><td align="center">&nbsp;</td></tr>
   </table>
 </td>
 <td width="100">&nbsp;</td>
<?php //*********************************************** Open ******************************************************?> 
<td align="left" id="type" valign="top" style="display:block;">             
   <form enctype="multipart/form-data" name="Editform" method="post" onSubmit="return validate(this)">
   <table border="0">
   <?php $SqlCompany=mysql_query("select * from hrm_company_basic where CompanyId=".$CompanyId, $con); $ResCompany = mysql_fetch_assoc($SqlCompany); $sqlC=mysql_query("select CountryId,CountryName from hrm_country where CountryId=".$ResCompany['CountryId'], $con);$ResC=mysql_fetch_array($sqlC); $sqlS=mysql_query("select StateId,StateName from hrm_state where StateId=".$ResCompany['StateId'], $con);$ResS=mysql_fetch_array($sqlS); $sqlCi=mysql_query("select CityId,CityName from hrm_city where CityId=".$ResCompany['CityId'], $con);$ResCi=mysql_fetch_array($sqlCi);?>
    <tr>
	  <td align="left"><table border="0" width="650">
	    <tr>
		   <td class="td1" align="left" style="font-size:11px; width:120px;">Name &nbsp;:</td>
		   <td class="td1" align="left" style="font-size:11px; width:180px;">
		   <input style="font-size:11px; width:170px; height:18px;" name="ComName" id="ComName" value="<?php echo $ResCompany['CompanyName']; ?>" disabled/></td>
		   <td class="td1" align="left" style="font-size:11px; width:120px;">No of Employee &nbsp;:</td>
		   <td class="td1" align="left" style="font-size:11px; width:180px;">
		   <input style="font-size:11px; width:100px;" name="ComNoOfEmp" id="ComNoOfEmp" value="<?php echo $ResCompany['NoOfEmp']; ?>" maxlength="5" disabled/></td>
		</tr></table>
	  </td>
   </tr>
   <tr>
	  <td align="left"><table border="0" width="650">
	    <tr>
		   <td class="td1" align="left" style="font-size:11px; width:120px;">Phone No.-1 &nbsp;:</td>
		   <td class="td1" align="left" style="font-size:11px; width:180px;">
		   <input style="font-size:11px; width:170px; height:18px;" name="ComPhone1" id="ComPhone1" value="<?php echo $ResCompany['PhoneNo1']; ?>" maxlength="10" disabled/></td>
		   <td class="td1" align="left" style="font-size:11px; width:120px;">Phone No.-2 &nbsp;:</td>
		   <td class="td1" align="left" style="font-size:11px; width:180px;">
		   <input style="font-size:11px; width:170px;" name="ComPhone2" id="ComPhone2" value="<?php echo $ResCompany['PhoneNo2']; ?>" maxlength="10" disabled/></td>
		</tr></table>
	  </td>
   </tr>
   <tr>
	  <td align="left"><table border="0" width="650">
	    <tr>
		   <td class="td1" align="left" style="font-size:11px; width:120px;">Fax No. &nbsp;:</td>
		   <td class="td1" align="left" style="font-size:11px; width:180px;">
		   <input style="font-size:11px; width:170px; height:18px;"  name="ComFaxNo" id="ComFaxNo" value="<?php echo $ResCompany['FaxNo']; ?>"  maxlength="10" disabled/></td>
		   <td class="td1" align="left" style="font-size:11px; width:120px;">WebSite &nbsp;:</td>
		   <td class="td1" align="left" style="font-size:11px; width:180px;">
		   <input style="font-size:11px; width:170px;" name="ComWebsite" id="ComWebsite" value="<?php echo $ResCompany['WebSite']; ?>" maxlength="50" disabled/></td>
		</tr></table>
	  </td>
   </tr>
   <tr>
	  <td align="left"><table border="0" width="650">
	    <tr>
		   <td class="td1" align="left" style="font-size:11px; width:120px;">Email_Id-1 &nbsp;:</td>
		   <td class="td1" align="left" style="font-size:11px; width:180px;">
		   <input style="font-size:11px; width:170px; height:18px;" name="ComEmail1" id="ComEmail1" value="<?php echo $ResCompany['EmailId1']; ?>" maxlength="60" disabled/></td>
		   <td class="td1" align="left" style="font-size:11px; width:120px;">Email_Id-2 &nbsp;:</td>
		   <td class="td1" align="left" style="font-size:11px; width:180px;">
		   <input style="font-size:11px; width:170px;" name="ComEmail2" id="ComEmail2" value="<?php echo $ResCompany['EmailId2']; ?>" maxlength="60" disabled/></td>
		</tr></table>
	  </td>
   </tr>
   <tr>
	  <td align="left"><table border="0" width="650">
	    <tr>
		   <td class="td1" align="left" style="font-size:11px; width:120px;">Country &nbsp;:</td>
		   <td class="td1" align="left" style="font-size:11px; width:180px;">
		   <select style="font-size:11px; width:170px; height:18px;" id="ComCountry" name="ComCountry" onChange="SelectCountry(this.value)" disabled>
		   <option value="<?php echo $ResC['CountryId']; ?>"><?php echo $ResC['CountryName']; ?></option>
		   <?php $sqlCountry=mysql_query("select * from hrm_country", $con); while($resCountry=mysql_fetch_array($sqlCountry)) {?>
		   <option value="<?php echo $resCountry['CountryId']; ?>"><?php echo $resCountry['CountryName']; ?></option><?php } ?>
		   </select></td>
		   <td class="td1" align="left" style="font-size:11px; width:120px;">State &nbsp;:</td>
		   <td class="td1" align="left" style="font-size:11px; width:180px;"><span id="state">
		   <select style="font-size:11px; width:170px; height:18px;" id="ComState" name="ComState" onChange="SelectState(this.value)" disabled>
		   <option value="<?php echo $ResS['StateId']; ?>"><?php echo $ResS['StateName']; ?></option>
	       </select></span></td>
		</tr></table>
	  </td>
   </tr>
   <tr>
	  <td align="left"><table border="0" width="650">
	    <tr>
		   <td class="td1" align="left" style="font-size:11px; width:120px;">City &nbsp;:</td>
		   <td class="td1" align="left" style="font-size:11px; width:180px;"><span id="city">
		   <select style="font-size:11px; width:170px; height:18px;" id="ComCity" name="ComCity" disabled>
		   <option value="<?php echo $ResCi['CityId']; ?>"><?php echo $ResCi['CityName']; ?></option>
	       </select></span></td>
		   <td class="td1" align="left" style="font-size:11px; width:120px;">Pin No. &nbsp;:</td>
		   <td class="td1" align="left" style="font-size:11px; width:180px;">
		   <input style="font-size:11px; width:170px;" name="ComPinNo" id="ComPinNo" value="<?php echo $ResCompany['PinNo']; ?>" maxlength="6" disabled/></td>
		</tr></table>
	  </td>
   </tr>
   <tr>
	  <td align="left"><table border="0" width="650">
	    <tr>
		   <td class="td1" align="left" style="font-size:11px; width:120px;">Admin Office &nbsp;:</td>
		   <td class="td1" align="left" style="font-size:11px; width:180px;">
		   <input style="font-size:11px; width:170px; height:18px;" name="Addoffice" id="Addoffice" value="<?php echo $ResCompany['AdminOffice']; ?>" disabled/></td>
		   <td class="td1" align="left" style="font-size:11px; width:120px;">Admin Off. Add. &nbsp;:</td>
		   <td class="td1" align="left" style="font-size:11px; width:180px;">
		   <input style="font-size:11px; width:170px;" name="Addoffice_Add" id="Addoffice_Add" value="<?php echo $ResCompany['AdminOffice_Address']; ?>" disabled/></td>
		</tr></table>
	  </td>
   </tr>
   <tr>
	  <td align="left"><table border="0" width="650">
	    <tr>
		   <td class="td1" align="left" style="font-size:11px; width:120px;">Registered Office &nbsp;:</td>
		   <td class="td1" align="left" style="font-size:11px; width:180px;">
		   <input style="font-size:11px; width:170px; height:18px;" name="Regoffice" id="Regoffice" value="<?php echo $ResCompany['RegisOffice']; ?>" disabled/></td>
		   <td class="td1" align="left" style="font-size:11px; width:120px;">Regis. Off. Add. &nbsp;:</td>
		   <td class="td1" align="left" style="font-size:11px; width:180px;">
		   <input style="font-size:11px; width:170px;" name="Regoffice_Add" id="Regoffice_Add" value="<?php echo $ResCompany['RegisOffice_Address']; ?>" disabled/></td>
		</tr></table>
	  </td>
   </tr>
   <tr>
	  <td align="left"><table border="0" width="650">
	    <tr>
		   <td class="td1" align="left" style="font-size:11px; width:120px;" valign="top">Comment &nbsp;:</td>
		   <td class="td1" align="left" style="font-size:11px; width:180px;">
		   <input type="hidden" name="ComId" value="<?php echo $CompanyId; ?>" /><input type="hidden" name="ComBasicId" value="<?php echo $resCom['BasicId']; ?>" />
		   <textarea style="font-size:11px; width:496px; height:40px;" name="ComComment" id="ComComment" disabled><?php echo $ResCompany['Comment']; ?></textarea></td>
		</tr></table>
	  </td>
   </tr>	
<?php if($_SESSION['User_Permission']=='Edit'){?>
   <tr>
      <td align="Right" class="fontButton"><table border="0" width="550">
		<tr>
		 <td align="right"><input type="button" name="Change" id="Change" style="width:90px; display:block;" value="change" onClick="ChangeCom()">
		                   <input style="width:90px; display:none;" type="submit" id="SaveChange" name="SaveChange" value="Save"/></td>
						   <td align="right" style="width:80px;"><input type="button" name="back" id="back" style="width:90px;" value="back" onClick="javascript:window.location='Index.php?log=<?php echo $_SESSION['logCheckUser']; ?>'"/></td>
		 <td align="right" style="width:70px;"><input type="button" name="RefreshVtype" id="RefreshVtype" style="width:90px;" value="refresh" onClick="javascript:window.location='CompanyDetails.php'"/></td>
		</tr></table>
      </td>
   </tr>
<?php } ?>
  </table>
 </form>     
</td>
<?php //*********************************************** Close ******************************************************?>    
  

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