<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}
if($_SESSION['login'] = true){require_once('PhpFile/DesignationP.php'); } else {$msg= "Session Expiry..............."; }
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
<script type="text/javascript" src="js/MandatoryAjaxCall.js"></script>
<Script type="text/javascript">window.history.forward(1);</script>
<Script type="text/javascript">window.history.forward(1);
function deleteDesig() { var agree=confirm("Are you sure you want to delete this record?");
if (agree) { var a = document.getElementById("DesigId").value; var x = "Designation.php?action=delete&did="+a;  window.location=x;}}

function validate(formDesig) 
{
  var DesigName = formDesig.DesigName.value; var test_bool = filter.test(DesigName); var filter=/^[a-zA-Z.&()-]+$/;
  if (DesigName.length === 0) { alert("You must enter a Designation Name.");  return false; }
  if(test_bool==false) { alert('Please Enter Only Alphabets in the Designation Field');  return false; }	
  
  var DesigCode = formDesig.DesigCode.value; var test_bool = filter.test(DesigCode); var filter=/^[A-Z.&()-]+$/;
  if (DesigCode.length === 0) { alert("You must enter a Designation Code.");  return false; }
  if(test_bool==false) { alert('Please Enter Only Capital Alphabets in the Designation Code Field');  return false; }
}

function FFunSts(v)
{ 
 window.location="Designation.php?action=selectValue&tt=false&subtitle=designation&cintributios=false&param=0022&Sts="+v+"&ff=22&rr=33&yy=11&finalv=2233";
}


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
	  <td align="right" width="360" class="heading">Designation</td>
	  <td align="left">
	    <b><span id="Vtype" class="span">: -&nbsp;Designation</span></b>
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
	<tr><td align="center">&nbsp;</td></tr>
   </table>
 </td>
 <td width="100">&nbsp;</td>
<?php //*********************************************** Open Department******************************************************?> 
<td align="left" id="type" valign="top" style="display:block;">             
  <form  name="formDesig" method="post" onSubmit="return validate(this)">
   <table border="0">
   
	<tr>
	  <td align="left"><table border="0" width="750">
	    <tr>
		   <td class="td1" style="font-size:11px; width:480px;" valign="top">
		   <span id="Desig">
		      <table>
			     <tr><td style="font-size:11px; height:18px;">Designation :</td><td><input name="DesigName" id="DesigName" style="font-size:11px; width:220px; height:20px;"/></td></tr>
			     <tr><td style="font-size:11px; height:18px;">Code :&nbsp;</td><td><input name="DesigCode" id="DesigCode" style="font-size:11px; width:150px; height:20px;"/></td></tr>
			     <tr><td style="font-size:11px; height:18px;">P. Code :&nbsp;</td><td><input name="Desig_ShortCode" id="Desig_ShortCode" style="font-size:11px; width:150px; height:20px;"/></td></tr>
			     
			     <tr><td style="font-size:11px; height:18px;">Status :&nbsp;</td><td><select name="Desig_Sts" id="Desig_Sts" style="font-size:11px; width:150px; height:20px;"><option value="A">Active</option><option value="D">Deactive</option></select></td></tr>
			  
			  <tr><td>&nbsp;</td></tr>	 
			  <tr style="font-size:11px;">
		       <td colspan="2" ><font style="background-color:#00B0B0;">&nbsp;&nbsp;&nbsp;&nbsp;</font> 
			   &nbsp;: - Deactivated</td>
		      </tr>	 
			     
			  </table>
		   </span>
		   </td>
		   <td align="right" style="font-size:11px; width:180px;">
		   
		   <select name="Sts" onChange="FFunSts(this.value)">
	<option value="All" <?php if($_REQUEST['Sts']=='All' || $_REQUEST['Sts']==''){echo 'selected';}?>>All</option>
	<option value="A" <?php if($_REQUEST['Sts']=='A'){echo 'selected';}?>>Active</option>
	<option value="D" <?php if($_REQUEST['Sts']=='D'){echo 'selected';}?>>Deactive</option>
   </select>
   <?php if($_REQUEST['Sts']=='A'){$Qsub="DesigStatus='A'";} 
         elseif($_REQUEST['Sts']=='D'){$Qsub="DesigStatus='D'";}
		 else{$Qsub="1=1";}
   ?>
		   <br>
		   
		                    <select style="width:400px; background-color:#F1EDF8;" name="DesigSelect" id="DesigSelect" size="20" onChange="selectDesig(this.value)">
		   <?php $SqlDesig=mysql_query("select * from hrm_designation where ".$Qsub." AND CompanyId=".$CompanyId." AND DesigName!='' AND DesigId!=69 order by DesigCode ASC", $con); while($ResDesig=mysql_fetch_array($SqlDesig)) { ?>
							<option value="<?php echo $ResDesig['DesigId']; ?>" style="background-color:<?php if($ResDesig['DesigStatus']=='D'){echo '#00B0B0';} ?>;"><?php echo $ResDesig['DesigCode']; ?>&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;<?php echo $ResDesig['DesigName']; if($ResDesig['Desig_ShortCode']!=''){echo ' - '.$ResDesig['Desig_ShortCode']; } ?></option><?php } ?>
							</select></td>
		</tr></table>
	  </td>
    </tr>
<?php if($_SESSION['User_Permission']=='Edit'){?>	  
   <tr>
      <td align="Right" class="fontButton"><table border="0" width="550">
		<tr>
		 
	 <td align="right"><input type="submit" name="ChangeDesig" id="ChangeDesig" style="width:90px; display:none;" value="change"></td>
	 <td align="right" style="width:70px;"><input type="button" name="DeleteDesig" id="DeleteDesig" value="delete" style="width:90px; display:none;" disabled onClick="deleteDesig()">
		                                       <input type="submit" name="AddNewDesig" id="AddNewDesig" style="width:90px; display:block;" value="add new"></td>
		 <td align="right" style="width:80px;"><input type="button" name="back" id="back" style="width:90px;" value="back" onClick="javascript:window.location='Index.php?log=<?php echo $_SESSION['logCheckUser']; ?>'"/></td>
		 <td align="right" style="width:70px;"><input type="button" name="RefreshDesig" id="RefreshDesig" style="width:90px;" value="refresh" onClick="javascript:window.location='Designation.php'"/></td>
		</tr></table>
      </td>
   </tr>
<?php } ?>
  </table>
 </form>     
</td>
<?php //*********************************************** Close Department******************************************************?>    

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
