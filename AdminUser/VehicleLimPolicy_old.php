<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}

if(isset($_POST['SaveEdit']))
{

$SqlUpdate = mysql_query("UPDATE hrm_vehiclepolicy SET LimitsSal='".$_POST['LimitsSal']."', LimitsPrd='".$_POST['LimitsPrd']."', LimitsOth='".$_POST['LimitsOth']."', nWDr_2ySal='".$_POST['nWDr_2ySal']."', nWDr_35ySal='".$_POST['nWDr_35ySal']."', nWtDr_2ySal='".$_POST['nWtDr_2ySal']."', nWtDr_35ySal='".$_POST['nWtDr_35ySal']."', oWDr_2ySal='".$_POST['oWDr_2ySal']."', oWDr_35ySal='".$_POST['oWDr_35ySal']."', oWtDr_2ySal='".$_POST['oWtDr_2ySal']."', oWtDr_35ySal='".$_POST['oWtDr_35ySal']."', nWDr_2yPrd='".$_POST['nWDr_2yPrd']."', nWDr_35yPrd='".$_POST['nWDr_35yPrd']."', nWtDr_2yPrd='".$_POST['nWtDr_2yPrd']."', nWtDr_35yPrd='".$_POST['nWtDr_35yPrd']."', oWDr_2yPrd='".$_POST['oWDr_2yPrd']."', oWDr_35yPrd='".$_POST['oWDr_35yPrd']."', oWtDr_2yPrd='".$_POST['oWtDr_2yPrd']."', oWtDr_35yPrd='".$_POST['oWtDr_35yPrd']."', VehiSts='".$_POST['VehiSts']."', CreatedBy=".$UserId.", CreatedDate='".date("Y-m-d")."', YearId=".$YearId."  WHERE VehiPolyId=".$_POST['EditId'], $con);
   if($SqlUpdate){ $msg = "Data has been Updeted successfully...";}
	   
}

//SqlUpdate = mysql_query("UPDATE hrm_vehiclepolicy SET Limits='".$_POST['']."', nWDr_2ySal, nWDr_35ySal, nWtDr_2ySal, nWtDr_35ySal, oWDr_2ySal, oWDr_35ySal, oWtDr_2ySal, oWtDr_35ySal, nWDr_2yPrd, nWDr_35yPrd, nWtDr_2yPrd, nWtDr_35yPrd, oWDr_2yPrd, oWDr_35yPrd, oWtDr_2yPrd, oWtDr_35yPrd, VehiSts, CreatedBy=".$UserId.", CreatedDate='".date("Y-m-d")."', YearId=".$YearId."  WHERE VehiPolyId=".$_POST['EditId'], $con) or die(mysql_error());

?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style> .font { text-align:center; font-family:Times New Roman; color:#FFFFFF; font-size:12px; } 
.bbody { color:#000000;font-family:Times New Roma; font-size:12px;background-color:#FFFFFF;text-align:center; } 
.input { font-family:Times New Roman;font-size:12px;border:hidden;width:100%;background-color:#FFFFFF; text-align:center;}
.span {display:none; font-family:Courier New; font-size:14px; }.span1 {display:block; font-family:Courier New; font-size:14px; }
.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;}
.SaveButton {background-image:url(images/save.gif); width:20px; height:20px; background-repeat:no-repeat; background-color:#FFFFFF; border-color:#FFFFFF; border-bottom:inherit;}
.TextInput { font-family:"Times New Roman", Times, serif; font-size:11px; width:100px; height:18px;}

</style>
<script type="text/javascript" src="js/stuHover.js"></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<script type="text/javascript" src="js/MandatoryAjaxCall.js"></script>
<Script type="text/javascript">window.history.forward(1);
function edit(value) { var agree=confirm("Are you sure you want to edit this record?");
if (agree) { var x = "VehicleLimPolicy.php?action=edit&eid="+value;  window.location=x;}}
function del(value) { var agree=confirm("Are you sure you want to delete this record?");
if (agree) { var x = "VehicleLimPolicy.php?action=delete&did="+value;  window.location=x;}}

</SCRIPT> 
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
<?php //****************************************************************************?>
<?php //****************START*****START*****START******START******START************************?>
<?php //************************************************************************************?><table border="0" style="margin-top:0px; width:100%;height:300px;">
 <tr>
  <td align="left" height="20" valign="top" colspan="3">
   <table border="0">
    <tr>
	  <td align="" width="400" class="heading">Vehicle Policy Reimbursement With Limitation</td>
	  <td align="left">
	    <b><span id="Vtype" class="span">: -&nbsp;Vehicle Policy Reimbursement With Limitation</span></b>
	  </td>
	  <td class="font4" style="left"><input type="button" name="back" id="back" style="width:90px;" value="back" onClick="javascript:window.location='Index.php?log=<?php echo $_SESSION['logCheckUser']; ?>'"/>
		<input type="button" name="Refrash" value="refresh" onClick="javascript:window.location='VehicleLimPolicy.php'"/>&nbsp;&nbsp;&nbsp;<b><?php echo $msg; ?></b></td>
	</tr>
   </table>
  </td>
 </tr>
<?php if(($_SESSION['UserType']=='S' OR $_SESSION['UserType']=='A' OR $_SESSION['UserType']=='U') AND $_SESSION['login'] = true) { ?>	
 <tr>
<?php //****************** Open Travels Entitlement*********************?> 
<td align="left" id="type" valign="top" style="display:block; width:95%">             
 <table border="0" width="100%" cellspacing="1">
  <tr>
   <td align="left" width="100%">
   <table border="1" width="100%" bgcolor="#FFFFFF">
    <tr bgcolor="#7a6189">
	 <td class="font" rowspan="4" style="width:50px;"><b>Grade</b></td>
     <td class="font" colspan="9"><b>Sales</b></td>
	 <td class="font" colspan="9"><b>Production</b></td>
	 <td class="font" rowspan="4" style="width:90px;"><b>Other<br>Department<br>Vehicle<br>value<br>Limits</b></td>
	 <td class="font" rowspan="4" style="width:50px;"><b>Status</b></td>
     <td class="font" rowspan="4" style="width:80px;"><b>Action</b></td>
    </tr>
	<tr bgcolor="#7a6189">
	 <td class="font" rowspan="3" style="width:90px;"><b>Vehicle<br>value<br>Limits</b></td>
     <td class="font" colspan="4"><b>New Vehicle (Rs/Km)</b></td>
	 <td class="font" colspan="4"><b>Old Vehicle (Rs/Km)</b></td>
	 <td class="font" rowspan="3" style="width:90px;"><b>Vehicle<br>value<br>Limits</b></td>
	 <td class="font" colspan="4"><b>New Vehicle (Rs/Km)</b></td>
	 <td class="font" colspan="4"><b>Old Vehicle (Rs/Km)</b></td>
    </tr>
    <tr bgcolor="#7a6189">
	 <td class="font" colspan="2"><b>With Driver</b></td>
     <td class="font" colspan="2"><b>Without Driver</b></td>
	 <td class="font" colspan="2"><b>With Driver</b></td>
     <td class="font" colspan="2"><b>Without Driver</b></td>
	 <td class="font" colspan="2"><b>With Driver</b></td>
     <td class="font" colspan="2"><b>Without Driver</b></td>
	 <td class="font" colspan="2"><b>With Driver</b></td>
     <td class="font" colspan="2"><b>Without Driver</b></td>
    </tr>
    <tr bgcolor="#7a6189">
	 <td class="font" style="width:80px;background-color:#359AFF;"><b>2 Year</b></td>
     <td class="font" style="width:80px;background-color:#359AFF;"><b>3-5 Year</b></td>
     <td class="font" style="width:80px;background-color:#359AFF;"><b>2 Year</b></td>
     <td class="font" style="width:80px;background-color:#359AFF;"><b>3-5 Year</b></td>
	 <td class="font" style="width:80px;background-color:#359AFF;"><b>2 Year</b></td>
     <td class="font" style="width:80px;background-color:#359AFF;"><b>3-5 Year</b></td>
     <td class="font" style="width:80px;background-color:#359AFF;"><b>2 Year</b></td>
     <td class="font" style="width:80px;background-color:#359AFF;"><b>3-5 Year</b></td>
	 <td class="font" style="width:80px;background-color:#359AFF;"><b>2 Year</b></td>
     <td class="font" style="width:80px;background-color:#359AFF;"><b>3-5 Year</b></td>
     <td class="font" style="width:80px;background-color:#359AFF;"><b>2 Year</b></td>
     <td class="font" style="width:80px;background-color:#359AFF;"><b>3-5 Year</b></td>
	 <td class="font" style="width:80px;background-color:#359AFF;"><b>2 Year</b></td>
     <td class="font" style="width:80px;background-color:#359AFF;"><b>3-5 Year</b></td>
     <td class="font" style="width:80px;background-color:#359AFF;"><b>2 Year</b></td>
     <td class="font" style="width:80px;background-color:#359AFF;"><b>3-5 Year</b></td>
    </tr>
<?php 
$sql=mysql_query("select * from hrm_vehiclepolicy where CompanyId=".$CompanyId." order by GradeId DESC", $con); $SNo=1; while($rTE=mysql_fetch_array($sql)){ if(isset($_REQUEST['action']) && $_REQUEST['action']=="edit" && $_REQUEST['eid']==$rTE['VehiPolyId']){ ?>
  <form name="formEdit" method="post" onSubmit="return validateEdit(this)">	
  <tr>
   <td class="bbody" align="center"><b><?php echo $rTE['GradeValue'];?></b></td>
   <td><input class="input" name="LimitsSal" value="<?php echo $rTE['LimitsSal']; ?>"/></td>
   <td><input class="input" name="nWDr_2ySal" value="<?php echo $rTE['nWDr_2ySal']; ?>" /></td>
   <td><input class="input" name="nWDr_35ySal" value="<?php echo $rTE['nWDr_35ySal']; ?>" /></td>
   <td><input class="input" name="nWtDr_2ySal" value="<?php echo $rTE['nWtDr_2ySal']; ?>" /></td>
   <td><input class="input" name="nWtDr_35ySal" value="<?php echo $rTE['nWtDr_35ySal'];?> "/></td>
   <td><input class="input" name="oWDr_2ySal" value="<?php echo $rTE['oWDr_2ySal']; ?>" /></td>
   <td><input class="input" name="oWDr_35ySal" value="<?php echo $rTE['oWDr_35ySal']; ?>" /></td>
   <td><input class="input" name="oWtDr_2ySal" value="<?php echo $rTE['oWtDr_2ySal']; ?>" /></td>
   <td><input class="input" name="oWtDr_35ySal" value="<?php echo $rTE['oWtDr_35ySal'];?> "/></td>
   
   <td><input class="input" name="LimitsPrd" value="<?php echo $rTE['LimitsPrd']; ?>"/></td>
   <td><input class="input" name="nWDr_2yPrd" value="<?php echo $rTE['nWDr_2yPrd']; ?>" /></td>
   <td><input class="input" name="nWDr_35yPrd" value="<?php echo $rTE['nWDr_35yPrd']; ?>" /></td>
   <td><input class="input" name="nWtDr_2yPrd" value="<?php echo $rTE['nWtDr_2yPrd']; ?>" /></td>
   <td><input class="input" name="nWtDr_35yPrd" value="<?php echo $rTE['nWtDr_35yPrd'];?> "/></td>
   <td><input class="input" name="oWDr_2yPrd" value="<?php echo $rTE['oWDr_2yPrd']; ?>" /></td>
   <td><input class="input" name="oWDr_35yPrd" value="<?php echo $rTE['oWDr_35yPrd']; ?>" /></td>
   <td><input class="input" name="oWtDr_2yPrd" value="<?php echo $rTE['oWtDr_2yPrd']; ?>" /></td>
   <td><input class="input" name="oWtDr_35yPrd" value="<?php echo $rTE['oWtDr_35yPrd'];?>"/></td>
   
   <td><input class="input" name="LimitsOth" value="<?php echo $rTE['LimitsOth']; ?>"/></td>
   <td><select class="input" name="VehiSts"><option value="<?php echo $rTE['VehiSts'];?>" selected><?php echo $rTE['VehiSts'];?></option><option value="<?php if($rTE['VehiSts']=='A'){echo 'D';}else{echo 'A';} ?>"><?php if($rTE['VehiSts']=='A'){echo 'D';}else{echo 'A';} ?></option></select></td>	
    	
   <td class="bbody" align="center"><input type="hidden" name="EditId" id="EditId" value="<?php echo $_REQUEST['eid']; ?>"/><?php if($_SESSION['User_Permission']=='Edit'){?>&nbsp;<input type="submit" name="SaveEdit"  value="" class="SaveButton">&nbsp;<?php } ?></td>
  </tr>
  </form>
<?php } else { ?>	 
  <tr>
   <td class="bbody"><b><?php echo $rTE['GradeValue'];?></b></td>
   <td class="bbody"><?php echo $rTE['LimitsSal'];?></td>
   <td class="bbody"><?php echo $rTE['nWDr_2ySal'];?></td>
   <td class="bbody"><?php echo $rTE['nWDr_35ySal'];?></td>
   <td class="bbody"><?php echo $rTE['nWtDr_2ySal'];?></td>
   <td class="bbody"><?php echo $rTE['nWtDr_35ySal'];?></td>
   <td class="bbody"><?php echo $rTE['oWDr_2ySal'];?></td>
   <td class="bbody"><?php echo $rTE['oWDr_35ySal'];?></td>
   <td class="bbody"><?php echo $rTE['oWtDr_2ySal'];?></td>
   <td class="bbody"><?php echo $rTE['oWtDr_35ySal'];?></td>
   <td class="bbody"><?php echo $rTE['LimitsPrd'];?></td>
   <td class="bbody"><?php echo $rTE['nWDr_2yPrd'];?></td>
   <td class="bbody"><?php echo $rTE['nWDr_35yPrd'];?></td>
   <td class="bbody"><?php echo $rTE['nWtDr_2yPrd'];?></td>
   <td class="bbody"><?php echo $rTE['nWtDr_35yPrd'];?></td>
   <td class="bbody"><?php echo $rTE['oWDr_2yPrd'];?></td>
   <td class="bbody"><?php echo $rTE['oWDr_35yPrd'];?></td>
   <td class="bbody"><?php echo $rTE['oWtDr_2yPrd'];?></td>
   <td class="bbody"><?php echo $rTE['oWtDr_35yPrd'];?></td>
   <td class="bbody"><?php echo $rTE['LimitsOth'];?></td>
   <td class="bbody"><?php echo $rTE['VehiSts'];?></td>
   
   <td class="bbody" align="center"><?php if($_SESSION['User_Permission']=='Edit'){?><a href="#"><img src="images/edit.png" border="0" alt="Edit" onClick="edit(<?php echo $rTE['VehiPolyId']; ?>)"></a>
	 <a href="#"><img src="images/delete.png" alt="Delete" border="0" style="display:none" onClick="del(<?php echo $rTE['VehiPolyId']; ?>)"></a><?php } ?></td>
  </tr>
<?php } $SNo++;} ?>
 </table>
</td>
</tr>

  </table>  
</td>

<?php //************** Close Travels EntitleMent***********************************?>    
 </tr>
<?php } ?> 
</table>

<?php //**************************************************************************************?>
<?php //****************END*****END*****END******END******END***********************?>
<?php //********************************************************************************************?>
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

