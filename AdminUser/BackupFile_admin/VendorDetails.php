<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}
if($_SESSION['login'] = true){require_once('PhpFile/VendorDetailsP.php'); } else {$msg= "Session Expiry..............."; }
?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet"/>
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<link rel="stylesheet" type="text/css" href="src/css/jscal2.css"/>
<link rel="stylesheet" type="text/css" href="src/css/border-radius.css"/>
<link rel="stylesheet" type="text/css" href="src/css/steel/steel.css"/>
<script type="text/javascript" src="src/js/jscal2.js"></script>
<script type="text/javascript" src="src/js/lang/en.js"></script>
<style> .font { color:#ffffff; font-family:Georgia; font-size:11px; width:250px;} .font4 { color:#1FAD34; font-family:Georgia; font-size:13px; height:10px;}
.span {display:none; font-family:Courier New; font-size:14px; }.span1 {display:block; font-family:Courier New; font-size:14px; }
.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;}
</style>
<script type="text/javascript" src="js/stuHover.js"></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<script type="text/javascript" src="js/MasterAjaxCall.js"></script>
<Script type="text/javascript">window.history.forward(1);</script>
<script type="text/javascript" src="js/VendorDetails.js" ></script>
<script>
function deleteVtype() { var agree=confirm("Are you sure you want to delete this record?");
if (agree) {  var TypeId = document.getElementById("VTypeNameId").value; var x = "VendorDetails.php?action=deleteType&didType="+TypeId;  window.location=x;}}
function deleteVname() { var agree=confirm("Are you sure you want to delete this record?");
if (agree) {  var NameId = document.getElementById("VNameSId").value; var x = "VendorDetails.php?action=deleteName&didName="+NameId;  window.location=x;}}
</script>
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
	  <td align="right" width="360" class="heading">Vendors Details</td>
	  <td align="left">
	    <b><span id="Vtype" class="span">: -&nbsp;Type</span><span id="Vname" class="span">: -&nbsp;Name</span><span id="Vdetails" class="span1">: -&nbsp;Details</span></b>
	  </td>
	  <td class="font4" style="left">&nbsp;&nbsp;&nbsp;<b><span id="msg"><?php echo $msg; ?></span></b></td>
	</tr>
   </table>
  </td>
 </tr>
<?php if(($_SESSION['UserType']=='S' OR $_SESSION['UserType']=='A') AND $_SESSION['login'] = true) { ?>	
 <tr>
 <td style="width:100px;" valign="top" align="center">&nbsp;
   <table border="0" cellpadding="0px;" align="center">
    <tr><td align="center"><a href="#"><img src="images/Vtype.png" border="0" onClick="OpenVtype()"/></a></td></tr>
	<tr><td align="center"><a href="#"><img src="images/Vname.png" border="0" onClick="OpenVname()"/></a></td></tr>
	<tr><td align="center"><a href="#"><img src="images/Vdetails.png" border="0" onClick="OpenVdetails()"/></a></td></tr>
	<tr><td align="center"><a href="#"><img src="images/back.png" border="0" onClick="javascript:window.location='Index.php?log=<?php echo $_SESSION['logCheckUser']; ?>'"/></a></td></tr>   <tr><td align="center"><a href="#"><img src="images/cancel.png" border="0" onClick="javascript:window.location='VendorDetails.php'"/></a></td></tr>
   </table>
 </td>
 <td width="100">&nbsp;</td>
<?php //*********************************************** Open VType******************************************************?> 
<td align="left" id="type" valign="top" style="display:none;">             
  <form  name="formVtype" method="post" onSubmit="return validate(this)">
   <table border="0">
   
	<tr>
	  <td align="left"><table border="0" width="550">
	    <tr>
		   <td class="td1" style="font-size:11px; width:50px;" valign="top">Name :</td>
		   <td class="td1" style="font-size:11px; width:220px;" valign="top">
		       <span id="TypeName"><input name="VTypeName" id="VTypeName" style="font-size:11px; width:220px; height:18px;"/></span></td>
		   <td align="right" style="font-size:11px; width:180px;">
		                    <select style="width:180px; background-color:#F1EDF8;" name="VTypeSelect" id="VTypeSelect" size="8" onChange="selectVtype(this.value)">
		   <?php $SqlVtype=mysql_query("select * from hrm_vendortype where CompanyId=".$CompanyId." AND VendorsTypeStatus='A' order by VendorTypeId ASC", $con); while($ResVType=mysql_fetch_array($SqlVtype)) { ?>
							<option value="<?php echo $ResVType['VendorTypeId']; ?>">&nbsp;<?php echo $ResVType['VendorsTypeName']; ?></option><?php } ?>
							</select></td>
		</tr></table>
	  </td>
    </tr>
<?php if($_SESSION['User_Permission']=='Edit'){?>	  
   <tr>
      <td align="Right" class="fontButton"><table border="0" width="550">
		<tr>
		 
		 <td align="right"><input type="submit" name="ChangeVtype" id="ChangeVtype" style="width:90px; display:none;" value="change"></td>
		 <td align="right" style="width:70px;"><input type="button" name="DeleteVtype" id="DeleteVtype" value="delete" style="width:90px; display:none;" onClick="deleteVtype()">
		                                       <input type="submit" name="AddNewVtype" id="AddNewVtype" style="width:90px; display:block;" value="add new"></td>
		 <td align="right" style="width:70px;"><input type="button" name="RefreshVtype" id="RefreshVtype" style="width:90px;" value="refresh" onClick=""/></td>
		</tr></table>
      </td>
   </tr>
<?php } ?>
  </table>
 </form>     
</td>
<?php //*********************************************** Close VType******************************************************?>    
<?php //*********************************************** Open VName******************************************************?> 
<td align="left" id="name" valign="top" style="display:none;">             
  <form  name="formVname" method="post" onSubmit="return validate(this)">
   <table border="0">
   
	<tr>
	  <td align="left"><table border="0" width="550">
	    <tr>
		   <td class="td1" style="font-size:11px; width:100px;" valign="top">Vendor Type :</td>
		   <td class="td1" style="font-size:11px; width:220px;" valign="top">
		      <select style="font-size:11px; width:180px; height:18px; background-color:#DDFFBB;"  name="VTypeSelect2" id="VTypeSelect2" onChange="selectVtype2(this.value)">
			                <option style="background-color:#DBD3E2; " value="">&nbsp;Select</option>
		   <?php $SqlVtype2=mysql_query("select * from hrm_vendortype where CompanyId=".$CompanyId." AND VendorsTypeStatus='A' order by VendorTypeId ASC", $con); while($ResVType2=mysql_fetch_array($SqlVtype2)) { ?>
							<option value="<?php echo $ResVType2['VendorTypeId']; ?>">&nbsp;<?php echo $ResVType2['VendorsTypeName']; ?></option><?php } ?>
							</select></td>
		   <td align="right" style="font-size:11px; width:180px;" rowspan="3" valign="top"><span id="VendorName">
		                    <select style="width:180px; background-color:#F1EDF8;" name="VNameSelect" id="VNameSelect" size="8" onChange="selectVName(this.value)">
							<option value="">&nbsp;</option>
							</select></span></td>
		</tr>
		<tr>
		   <td class="td1" style="font-size:11px; width:50px;" valign="top">Name :</td>
		   <td class="td1" style="font-size:11px; width:220px;" valign="top">
		       <span id="VenName"><input name="VNameS" id="VNameS" style="font-size:11px; width:180px; height:18px;"/></span></td>
		</tr>
		<tr><td style="height:80px;">&nbsp;</td></tr></table>
	  </td>
    </tr>
<?php if($_SESSION['User_Permission']=='Edit'){?>	  
   <tr>
      <td align="Right" class="fontButton"><table border="0">
		<tr>
		 
		 <td align="right"><input type="submit" name="ChangeVname" id="ChangeVname" style="width:90px; display:none;" value="change"></td>
		 <td align="right" style="width:70px;"><input type="button" name="DeleteVname" id="DeleteVname" value="delete" style="width:90px; display:none;" onClick="deleteVname()">
		                                       <input type="submit" name="AddNewVname" id="AddNewVname" style="width:90px; display:block;" value="add new"></td>
		 <td align="right" style="width:70px;"><input type="button" name="RefreshVname" id="RefreshVname" style="width:90px;" value="refresh" onClick=""/></td>
		</tr></table>
      </td>
   </tr>
<?php } ?>
  </table>
 </form>     
</td>
<?php //*********************************************** Close VName******************************************************?>    
<?php //*********************************************** Open VDetails******************************************************?> 
<td align="left" id="details" valign="top" style="display:block;">             
  <form  name="formVdetails" method="post" onSubmit="return validate(this)">
   <table border="0">
   
	<tr>
	  <td align="left"><table border="0" width="650">
	    <tr>
		   <td class="td1" style="font-size:11px; width:110px;" valign="top">Vendor Type :</td>
		   <td class="td1" style="font-size:11px; width:190px;" valign="top">
		                  <select style="font-size:11px; width:180px; height:18px; background-color:#DDFFBB;"  name="VTypeSelect3" id="VTypeSelect3" onChange="selectVtype3(this.value);CallVTypeId(this.value);">
			              <option style="background-color:#DBD3E2; " value="">&nbsp;Select</option>
		   <?php $SqlVtype3=mysql_query("select * from hrm_vendortype where CompanyId=".$CompanyId." AND VendorsTypeStatus='A' order by VendorTypeId ASC", $con); while($ResVType3=mysql_fetch_array($SqlVtype3)) { ?>
						  <option value="<?php echo $ResVType3['VendorTypeId']; ?>">&nbsp;<?php echo $ResVType3['VendorsTypeName']; ?></option><?php } ?>
						  </select><input type="hidden" id="VTypeId" value=""/></td>
		   <td class="td1" style="font-size:11px; width:50px;" valign="top">Name :</td>
		   <td class="td1" style="font-size:11px; width:240px; height:18px;" valign="top"><span id="VNameD">
		                  <select style="font-size:11px; width:180px; height:18px; background-color:#DDFFBB;" name="VNameSelectD" id="VNameSelectD" onChange="selectVNameD(this.value)">
						  <option style="background-color:#DBD3E2; " value="">&nbsp;Select</option>
						  <option value="">&nbsp;</option>
						  </select></span></td>
		</tr></table>
	  </td>
    </tr>
	<?php //-------------------------------------------LIC Open--------------------------------------------------- ?>
	<tr>
<td id="VDetailsSpan">
 <table>
   <tr id="LIC" style="display:none;">
	 
	  <td align="left">
	    <table border="0" width="650">
	      <tr>
		   <td class="td1" style="font-size:11px; width:90px;" valign="top">Company Name:</td>
		   <td class="td1" style="font-size:11px; width:120px;" valign="top">
		   <input name="VCompanyName" id="VCompanyName" style="font-size:11px; width:140px; height:18px;" disabled/></td>
		   <td class="td1" style="font-size:11px; width:70px;" valign="top">Policy Date:</td>
		   <td class="td1" style="font-size:11px; width:190px; height:18px;" valign="top">
		    <input name="VPolicyDate" id="VPolicyDate" style="font-size:11px; width:150px; height:18px;" value="<?php echo $resVNameD['VPolicyDate']; ?>" disabled/>
		   <button id="f_btn1" class="CalenderButton"></button><script type="text/javascript">  var cal = Calendar.setup({ onSelect:  function(cal) { cal.hide()}, showTime: true }); 
           cal.manageFields("f_btn1", "VPolicyDate", "%d-%m-%Y");</script></td>
		 </tr>
		 <tr>
		   <td class="td1" style="font-size:11px; width:90px;" valign="top">Policy Number:</td>
		   <td class="td1" style="font-size:11px; width:100px;" valign="top">
		   <input name="VPolicyNo" id="VPolicyNo" style="font-size:11px; width:140px; height:18px;" disabled/></td>
		   <td class="td1" style="font-size:11px; width:70px;" valign="top">Policy Name:</td>
		   <td class="td1" style="font-size:11px; width:190px; height:18px;" valign="top">
		   <input name="VPolicyName" id="VPolicyName" style="font-size:11px; width:180px; height:18px;" disabled/></td>
		 </tr>
		 <tr>
		   <td class="td1" style="font-size:11px; width:90px;" valign="top">Valid From:</td>
		   <td class="td1" style="font-size:11px; width:100px;" valign="top">
		   <input name="VValidfrom" id="VValidfrom" style="font-size:11px; width:140px; height:18px;" disabled/>
		    <button id="f_btn2" class="CalenderButton"></button></td>
		   <td class="td1" style="font-size:11px; width:70px;" valign="top">Valid To:</td>
		   <td class="td1" style="font-size:11px; width:190px; height:18px;" valign="top">
		    <input name="VValidto" id="VValidto" style="font-size:11px; width:150px; height:18px;" value="<?php echo $resVNameD['VVaildTo']; ?>" disabled/>
		   <button id="f_btn3" class="CalenderButton"></button><script type="text/javascript">  var cal = Calendar.setup({ onSelect:  function(cal) { cal.hide()}, showTime: true }); 
           cal.manageFields("f_btn2", "VValidfrom", "%d-%m-%Y");  cal.manageFields("f_btn3", "VValidto", "%d-%m-%Y");</script></td>
		 </tr>
		
		</table>
	  </td>
    </tr>
	<?php //-------------------------------------------LIC Close--------------------------------------------------- ?>
	<tr>
	  <td align="left"><table border="0" width="650">
	      <tr><td class="td1" style="font-size:11px; width:119px;" valign="top">Address:</td>
		   <td class="td1" style="font-size:11px; width:490px;" valign="top" colspan="3">
		   <input name="VAddrress" id="VAddrress" style="font-size:11px; width:522px; height:18px;" disabled/></td>
		 </tr></table>
	  </td>
    </tr>
	<tr>
	  <td align="left"><table border="0" width="700">
	      <tr>
		   <td class="td1" style="font-size:11px; width:115px;" valign="top">Country:</td>
		   <td class="td1" style="font-size:11px; width:155px;" valign="top">
		   <select style="font-size:11px; width:150px; height:18px;" id="VCountry" name="VCountry" onChange="SelectCountry1(this.value)" disabled>
		   <option value=""></option>
		   <?php $sqlCountry=mysql_query("select * from hrm_country", $con); while($resCountry=mysql_fetch_array($sqlCountry)) {?>
		   <option value="<?php echo $resCountry['CountryId']; ?>"><?php echo $resCountry['CountryName']; ?></option><?php } ?>
		   </select></td>
		   <td class="td1" style="font-size:11px; width:45px;" valign="top" align="left">State:</td>
		   <td class="td1" style="font-size:11px; width:130px; height:18px;" valign="top">
		   <span id="Venstate">
		   <select style="font-size:11px; width:125px; height:18px;" id="VState" name="VState" onChange="SelectState1(this.value)" disabled>
		   <option value="<?php echo $ResS['StateId']; ?>"><?php echo $ResS['StateName']; ?></option>
	       </select></span></td>
		   <td class="td1" style="font-size:11px; width:45px;" valign="top" align="left">City:</td>
		   <td class="td1" style="font-size:11px; width:160px;" valign="top"><span id="Vencity">
		   <select style="font-size:11px; width:165px; height:18px;" id="VCity" name="VCity" disabled>
		   <option value="<?php echo $ResCi['CityId']; ?>"><?php echo $ResCi['CityName']; ?></option>
	       </select></span></td>
		 </tr>
		 </table>
	  </td>
    </tr>
	<tr>
	  <td align="left"><table border="0" width="700">
	      <tr>
		   <td class="td1" style="font-size:11px; width:115px;" valign="top">Contact_1 Name:</td>
		   <td class="td1" style="font-size:11px; width:155px;" valign="top">
		   <input style="font-size:11px; width:150px; height:18px;" id="Contact1_Name" name="Contact1_Name" disabled/></td>
		   <td class="td1" style="font-size:11px; width:45px;" valign="top" align="left">No:</td>
		   <td class="td1" style="font-size:11px; width:130px; height:18px;" valign="top">
		   <input style="font-size:11px; width:125px; height:18px;" id="Contact1_No" name="Contact1_No" disabled/></td>
		   <td class="td1" style="font-size:11px; width:45px;" valign="top" align="left">Desig:</td>
		   <td class="td1" style="font-size:11px; width:160px;" valign="top">
		   <input style="font-size:11px; width:165px; height:18px;" id="Contact1_Desig" name="Contact1_Desig" disabled/></td>
		 </tr>
		 </table>
	  </td>
    </tr>
	<tr>
	  <td align="left"><table border="0" width="700">
	      <tr>
		   <td class="td1" style="font-size:11px; width:115px;" valign="top">Contact_2 Name:</td>
		   <td class="td1" style="font-size:11px; width:155px;" valign="top">
		   <input style="font-size:11px; width:150px; height:18px;" id="Contact2_Name" name="Contact1_Name" disabled/></td>
		   <td class="td1" style="font-size:11px; width:45px;" valign="top" align="left">No:</td>
		   <td class="td1" style="font-size:11px; width:130px; height:18px;" valign="top">
		   <input style="font-size:11px; width:125px; height:18px;" id="Contact2_No" name="Contact1_No" disabled/></td>
		   <td class="td1" style="font-size:11px; width:45px;" valign="top" align="left">Desig:</td>
		   <td class="td1" style="font-size:11px; width:160px;" valign="top">
		   <input style="font-size:11px; width:165px; height:18px;" id="Contact2_Desig" name="Contact1_Desig" disabled/></td>
		 </tr>
		 </table>
	  </td>
    </tr>
	<tr>
	  <td align="left"><table border="0" width="700">
	      <tr>
		   <td class="td1" style="font-size:11px; width:115px;" valign="top">Contact_3 Name:</td>
		   <td class="td1" style="font-size:11px; width:155px;" valign="top">
		   <input style="font-size:11px; width:150px; height:18px;" id="Contact3_Name" name="Contact1_Name" disabled/></td>
		   <td class="td1" style="font-size:11px; width:45px;" valign="top" align="left">No:</td>
		   <td class="td1" style="font-size:11px; width:130px; height:18px;" valign="top">
		   <input style="font-size:11px; width:125px; height:18px;" id="Contact3_No" name="Contact1_No" disabled/></td>
		   <td class="td1" style="font-size:11px; width:45px;" valign="top" align="left">Desig:</td>
		   <td class="td1" style="font-size:11px; width:160px;" valign="top">
		   <input style="font-size:11px; width:165px; height:18px;" id="Contact3_Desig" name="Contact1_Desig" disabled/></td>
		 </tr>
		 </table>
	  </td>
	  
	 </tr>
  </table>
</td>

   </tr>
<?php if($_SESSION['User_Permission']=='Edit'){?>
   <tr>
      <td align="Right" class="fontButton"><table border="0" width="200">
		<tr> 
		 <td align="right"></td>
		 <td align="right" style="width:70px;">
		   <input type="button" name="UpdateVdetailsbtn" id="UpdateVdetailsbtn" style="width:90px; display:block;" value="update" onClick="Updetails()" disabled>
		   <input type="submit" name="UpdateVdetails" id="UpdateVdetails" style="width:90px; display:none;" value="save"></td>
		 <td align="right" style="width:70px;"><input type="button" name="RefreshVdetails" id="RefreshVdetails" style="width:90px;" value="refresh" onClick=""/></td>
		</tr></table>
      </td>
   </tr>
<?php } ?>
  </table>
 </form>     
</td>
<?php //*********************************************** Close VDetails******************************************************?>    

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
