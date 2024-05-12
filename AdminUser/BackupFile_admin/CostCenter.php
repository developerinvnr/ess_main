<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}
if($_SESSION['login'] = true){require_once('PhpFile/CostCenterP.php'); } else {$msg= "Session Expiry..............."; }
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
function deleteCostCenter() { var agree=confirm("Are you sure you want to delete this record?");
if (agree) { var a = document.getElementById("CostCenterId").value; var x = "CostCenter.php?action=delete&did="+a;  window.location=x;}}
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
	  <td align="right" width="360" class="heading">Cost Center</td>
	  <td align="left">
	    <b><span id="Vtype" class="span">: -&nbsp;Cost Center</span></b>
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
<?php //*********************************************** Open CostCenter******************************************************?> 
<td align="left" id="type" valign="top" style="display:block;">             
  <form  name="formCostCenter" method="post" onSubmit="return validate(this)">
   <table border="0">
   
	<tr>
	  <td align="left"><table border="0" width="550">
	    <tr>
		   <td class="td1" style="font-size:11px; width:380px;" valign="top">
		   <span id="CostCenter">
		      <table>
			     <tr>
				   <td style="font-size:11px; height:18px;">Name :</td>
				   <td><select name="CostCenterName" id="CostCenterName" style="font-size:11px; width:220px; height:18px;">
<?php $sqlState=mysql_query("select StateId,StateName from hrm_state order by StateName ASC", $con); while($resState=mysql_fetch_array($sqlState)) { ?>			
			           <option  value="<?php echo $resState['StateId']; ?>" ><?php echo $resState['StateName']; ?></option><?php } ?>
			           </select>
				   </td>
				 </tr>
			  </table>
		   </span>
		   </td>
		   <td align="right" style="font-size:11px; width:180px;">
		                    <select style="width:180px; background-color:#F1EDF8;" name="CostCenterSelect" id="CostCenterSelect" size="8" onChange="selectCostCenter(this.value)">
		   <?php $SqlCC=mysql_query("SELECT hrm_costcenter.*,StateName FROM hrm_costcenter INNER JOIN hrm_state ON hrm_costcenter.CostCenterName=hrm_state.StateId where hrm_costcenter.CompanyId=".$CompanyId." AND CostCenterStatus='A' order by hrm_state.StateName ASC", $con); while($ResCC=mysql_fetch_array($SqlCC)) { ?>
							<option value="<?php echo $ResCC['CostCenterId']; ?>">&nbsp;<?php echo $ResCC['StateName']; ?></option><?php } ?>
							</select></td>
		</tr></table>
	  </td>
    </tr>
<?php if($_SESSION['User_Permission']=='Edit'){?>	  
   <tr>
      <td align="Right" class="fontButton"><table border="0" width="550">
		<tr>
		 
		 <td align="right"><input type="submit" name="ChangeCostCenter" id="ChangeCostCenter" style="width:90px; display:none;" value="change"></td>
		 <td align="right" style="width:70px;"><input type="button" name="DeleteCostCenter" id="DeleteCostCenter" value="delete" style="width:90px; display:none;" onClick="deleteCostCenter()">
		                                       <input type="submit" name="AddNewCostCenter" id="AddNewCostCenter" style="width:90px; display:block;" value="add new"></td>
		 <td align="right" style="width:80px;"><input type="button" name="back" id="back" style="width:90px;" value="back" onClick="javascript:window.location='Index.php?log=<?php echo $_SESSION['logCheckUser']; ?>'"/></td>
		 <td align="right" style="width:70px;"><input type="button" name="RefreshCostCenter" id="RefreshCostCenter" style="width:90px;" value="refresh" onClick="javascript:window.location='CostCenter.php'"/></td>
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
