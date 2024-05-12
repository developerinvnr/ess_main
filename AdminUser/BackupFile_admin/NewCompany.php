<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
include('codeEncDec.php');
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}
if($_SESSION['login'] = true){require_once('PhpFile/NewCompanyP.php'); }
?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style> .font { color:#FF6666; font-family:Georgia; font-size:11px;} .font1 { color:#4A2500; font-family:Georgia; font-size:11px; width:130px;} 
.font2 { color:#000000; font-family:Georgia; font-size:12px; width:200px;}.font5 { color:#000000; font-family:Georgia; font-size:12px; width:100px;}
.font3 { color:#009393; font-family:Georgia; font-size:13px; width:550px;}.font4 { color:#1FAD34; font-family:Georgia; font-size:13px; height:10px;}
.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;}.input { background-color:#A3C8E7;}
</style>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<script type="text/javascript" src="js/AjaxCall.js"></script>
<Script type="text/javascript">window.history.forward(1);</script>
<script type="text/javascript" src="js/NeWCompany.js" ></script> 
<script language="javascript">function deleteCompany(value) { var agree=confirm("Are you sure you want to delete this Company?");
if (agree) { var x = "NewCompany.php?action=delete&did="+value;  window.location=x;}}
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
  <td align="left" height="20" valign="top">
   <table border="0">
    <tr>
<?php if($_SESSION['User_Permission']=='Edit'){?>
	  <td align="left" width="450"><?php if($_SESSION['UserType']=='S'){ ?><a href="#" onClick="NewComUser()"><font class="heading">Create New Company User</font></a><?php } ?></td>
	  <td class="font4" style="left">&nbsp;&nbsp;&nbsp;<b><?php echo $msg; ?></b></td>
<?php } ?>
	</tr>
   </table>
  </td>
 </tr>
	
 <tr>
  <td align="center" colspan="3" valign="top" width="100%">
  <?php if(($_SESSION['UserType']=='S' OR $_SESSION['UserType']=='A') AND $_SESSION['login'] = true) { ?>
		             
	 <table border="0" align="center" cellspacing="5" width="100%">
<?php if($_SESSION['User_Permission']=='Edit'){?>
	   <tr><td align="center" id="Addnew" style="display:block;" class="heading">Add New Company<br></td>
	       <td align="center" id="AddnewComUser" style="display:none;" class="heading">Select Company<br></td></tr>
<?php } ?>
	   <tr>
	   
<?php //***********************************************************Company Details New*************************************************?> 
    <form enctype="multipart/form-data" name="Newform" method="post" onSubmit="return validate(this)">
	   <td align="center" width="100%" id="Com_detailsNew" style="display:block;">
		<table border="0" class="form"><tr><td>
		  <table border="0" bgcolor="#DFDCED">
		     <tr style="display:block;"><td align="left" class="font1">Name &nbsp;:</td><td class="font">-&nbsp;</td>
			     <td align="left" class="font2"><input class="tdTextbox" name="ComName" value="" /></td>
			     <td align="left" class="font1">No of Employee &nbsp;:</td><td class="font">-&nbsp;</td>
			     <td align="left" class="font2"><input class="tdTextbox" name="ComNoOfEmp" maxlength="5" value="" /></td>
			</tr>
			<tr style="display:block;"><td align="left" class="font1">Phone No.-1 &nbsp;:</td><td class="font">-&nbsp;</td>
			    <td align="left" class="font2"><input class="tdTextbox" name="ComPhone1" maxlength="10" value="" /></td>
			    <td align="left" class="font1">Phone No.-2 &nbsp;:</td><td class="font">-&nbsp;</td>
			    <td align="left" class="font2"><input class="tdTextbox" name="ComPhone2" maxlength="10" value="" /></td>
			</tr>
			<tr style="display:block;"><td align="left" class="font1">Fax No. &nbsp;:</td><td class="font">-&nbsp;</td>
			   <td align="left" class="font2"><input class="tdTextbox" name="ComFaxNo" maxlength="10" value=""/></td>
			   <td align="left" class="font1">WebSite &nbsp;:</td><td class="font">-&nbsp;</td>
			   <td align="left" class="font2"><input class="tdTextbox" name="ComWebsite" value="" /></td>
			</tr>
			<tr style="display:block;"><td align="left" class="font1">Email_Id-1 &nbsp;:</td><td class="font">-&nbsp;</td>
			   <td align="left" class="font2"><input class="tdTextbox" name="ComEmail1" value="" /></td>
			   <td align="left" class="font1">Email_Id-2 &nbsp;:</td><td class="font">-&nbsp;</td>
			   <td align="left" class="font2"><input class="tdTextbox" name="ComEmail2" value=""/></td>
			</tr>
			<tr style="display:block;"><td align="left" class="font1">Country &nbsp;:</td><td class="font">-&nbsp;</td>
			   <td align="left" class="font2">
			   <select class="tdTextbox" name="ComCountry" onChange="SelectCountry(this.value)">
			   <option value="">Select</option>
			   <?php $sqlCountry=mysql_query("select * from hrm_country", $con); while($resCountry=mysql_fetch_array($sqlCountry)) {?>
			   <option value="<?php echo $resCountry['CountryId']; ?>"><?php echo $resCountry['CountryName']; ?></option><?php } ?>
			   </select>
			   </td>
			   <td align="left" class="font1">State &nbsp;:</td><td class="font">-&nbsp;</td>
			   <td align="left" class="font2">
			   <span id="state">
			   <select class="tdTextbox" name="ComState" onChange="SelectState(this.value)">
			   <option value="">Select</option>
	           </select>
			   </span></td>
			</tr>
			<tr style="display:block;"><td align="left" class="font1">City &nbsp;:</td><td class="font">-&nbsp;</td>
			   <td align="left" class="font2">
			   <span id="city">
			   <select class="tdTextbox" name="ComCity">
			   <option value="">Select</option>
	           </select>
			   </span></td>
			   <td align="left" class="font1">Pin No. &nbsp;:</td><td class="font">-&nbsp;</td>
			   <td align="left" class="font2"><input class="tdTextbox" name="ComPinNo" value="" maxlength="6"/></td>
			</tr>
			<tr style="display:block;"><td align="left" class="font1">Admin Office &nbsp;:</td><td class="font">-&nbsp;</td>
			   <td align="left" class="font2"><input class="tdTextbox" name="Addoffice" value="" /></td>
			   <td align="left" class="font1">Admin Off. Add. &nbsp;:</td><td class="font">-&nbsp;</td>
			   <td align="left" class="font2"><input class="tdTextbox" name="Addoffice_Add" value="" /></td>
			</tr>
			<tr style="display:block;"><td align="left" class="font1">Registered Office &nbsp;:</td><td class="font">-&nbsp;</td>
			   <td align="left" class="font2"><input class="tdTextbox" name="Regoffice" value="" /></td>
			   <td align="left" class="font1">Registered Off. Add. &nbsp;:</td><td class="font">-&nbsp;</td>
			   <td align="left" class="font2"><input class="tdTextbox" name="Regoffice_Add" value="" /></td>
			</tr>
			<tr style="display:block;"><td align="left" class="font1">Comment &nbsp;:</td><td class="font">-&nbsp;</td>
			<td align="left" class="font3" colspan="5"><input type="hidden" name="ComId" value="<?php echo $CompanyId; ?>" />
			<input type="hidden" name="ComBasicId" value="<?php echo $resCom['BasicId']; ?>" /><textarea class="tdTextArea" name="ComComment" ></textarea></td>
			</tr>
			<tr>
	           <td class="fontButton" align="right" colspan="6">
<?php if($_SESSION['User_Permission']=='Edit'){?>
<input style="background-color:#E9DEC7;" type="submit" id="SaveNew" name="SaveNew" value="Save"/>
<?php } ?>
	      <input type="button" style="background-color:#E9DEC7;" name="Refresh" value="Refresh" onClick="javascript:window.location='NewCompany.php'"/>
		  <input type="button" style="background-color:#E9DEC7;" name="Back" value="Back" onclick="javascript:window.location='Index.php?log=<?php echo $_SESSION['logCheckUser']; ?>'"/>
		       </td>
	       </tr>
		</table>
		</td></tr></table>
	   </td>
	  </form> 
<?php //***********************************************************Company Details New Close*************************************************?> 
<?php //***********************************************************New Company User *************************************************?> 
    <form enctype="multipart/form-data" name="NewComUserForm" method="post" onSubmit="return validate(this)">
	   <td align="center" width="100%" id="ComNewUser" style="display:none;">
		<table border="0" class="form"><tr><td>
		  <table border="0" bgcolor="#DFDCED">
		    <tr bgcolor="#B49ED1">
			   <td class="font2" align="center"><b>Company</b></td>
			   <td class="font5" align="center"><b>Select Company</b></td><td class="font5" align="center"><b>Delete Company</b></td></tr>
		  <?php $sqlCom=mysql_query("select CompanyId,CompanyName from hrm_company_basic where Status!='De'", $con); while($resCom=mysql_fetch_array($sqlCom)){?>
		    <tr bgcolor="#FFFFFF">
<?php if($_SESSION['User_Permission']=='Edit'){?>
			    <td align="left" class="font1"><b>&nbsp;<?php echo $resCom['CompanyName'];?></b></td>
				<td class="font1" align="center">
				<a href="#"><img src="images/select.png" border="0" onClick="clickCompany(<?php echo $resCom['CompanyId']; ?>)" /></a></td>
				<td class="font1" align="center">
				<a href="#"><img src="images/delete.png" border="0" onClick="deleteCompany(<?php echo $resCom['CompanyId']; ?>)" /></a></td>
<?php } ?>
	        </tr>
			<?php } ?>
			
		</table>
		</td></tr></table>
	   </td>
	  </form> 
<?php //***********************************************************New Company User Close*************************************************?> 
       </tr>  
	   <tr><td align="center"><table align="center"><span id="CreateUser"></span></table></td></tr>
	  
     </table> 
	   
   <?php } ?>	   
   </td>
  </tr>
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

