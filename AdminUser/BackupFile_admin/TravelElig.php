<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}

if(isset($_POST['SaveEdit']))
{
 $Sql2=mysql_query("Select * from hrm_traveleligibility WHERE TravelEligibilityId='".$_POST['EditId']."' AND CompanyId=".$CompanyId, $con); $Result2 = mysql_fetch_assoc($Sql2); 
 $SqlInsert2 = mysql_query("INSERT INTO hrm_traveleligibility_event(TravelEligibilityId, GradeValue, TwoWheeler, TwoWheeler_Restric, TwoWheeler_Restric_PD, TwoWheeler_Restric_Sales, TwoWheeler_Restric_Sales_PD, TwoWheeler_Restric_OutSite, TwoWheeler_Restric_OutSite_PD, TwoWheeler_Restric_OutSite_Sales, TwoWheeler_Restric_OutSite_Sales_PD, FourWheeler, FourWheeler_Restric, FourWheeler_Restric_PD, FourWheeler_Restric_Sales, FourWheeler_Restric_Sales_PD, FourWheeler_Restric_OutSite, FourWheeler_Restric_OutSite_PD, FourWheeler_Restric_OutSite_Sales, FourWheeler_Restric_OutSite_Sales_PD, TwoWheeler_Restric_Resrch, TwoWheeler_Restric_Resrch_PD, TwoWheeler_Restric_OutSite_Resrch, TwoWheeler_Restric_OutSite_Resrch_PD, FourWheeler_Restric_Resrch, FourWheeler_Restric_Resrch_PD, FourWheeler_Restric_OutSite_Resrch, FourWheeler_Restric_OutSite_Resrch_PD, CompanyId, CreatedBy, CreatedDate, YearId)VALUES('".$Result2['TravelEligibilityId']."', '".$Result2['GradeValue']."', '".$Result2['TwoWheeler']."', '".$Result2['TwoWheeler_Restric']."', '".$Result2['TwoWheeler_Restric_PD']."', '".$Result2['TwoWheeler_Restric_Sales']."', '".$Result2['TwoWheeler_Restric_Sales_PD']."', '".$Result2['TwoWheeler_Restric_OutSite']."', '".$Result2['TwoWheeler_Restric_OutSite_PD']."', '".$Result2['TwoWheeler_Restric_OutSite_Sales']."', '".$Result2['TwoWheeler_Restric_OutSite_Sales_PD']."', '".$Result2['FourWheeler']."', '".$Result2['FourWheeler_Restric']."', '".$Result2['FourWheeler_Restric_PD']."', '".$Result2['FourWheeler_Restric_Sales']."', '".$Result2['FourWheeler_Restric_Sales_PD']."', '".$Result2['FourWheeler_Restric_OutSite']."', '".$Result2['FourWheeler_Restric_OutSite_PD']."', '".$Result2['FourWheeler_Restric_OutSite_Sales']."', '".$Result2['FourWheeler_Restric_OutSite_Sales_PD']."', '".$Result2['TwoWheeler_Restric_Resrch']."', '".$Result2['TwoWheeler_Restric_Resrch_PD']."', '".$Result2['TwoWheeler_Restric_OutSite_Resrch']."', '".$Result2['TwoWheeler_Restric_OutSite_Resrch_PD']."', '".$Result2['FourWheeler_Restric_Resrch']."', '".$Result2['FourWheeler_Restric_Resrch_PD']."', '".$Result2['FourWheeler_Restric_OutSite_Resrch']."','".$Result2['FourWheeler_Restric_OutSite_Resrch_PD']."', '".$Result2['CompanyId']."', ".$Result2['CreatedBy'].", '".$Result2['CreatedDate']."', ".$Result2['YearId'].")", $con); 
 
  if($SqlInsert2)
    { 
        
	 $SqlUpdate = mysql_query("UPDATE hrm_traveleligibility SET TwoWheeler='".$_POST['TwoWheeler']."', TwoWheeler_S='".$_POST['TwoWheeler_S']."', TwoWheeler_R='".$_POST['TwoWheeler_R']."', TwoWheeler_Restric='".$_POST['TWR']."', TwoWheeler_Restric_PD='".$_POST['TWR_PD']."', TwoWheeler_Restric_Sales='".$_POST['TWR_Sales']."', TwoWheeler_Restric_Sales_PD='".$_POST['TWR_Sales_PD']."', TwoWheeler_Restric_OutSite='".$_POST['TWR_OutSite']."', TwoWheeler_Restric_OutSite_PD='".$_POST['TWR_OutSite_PD']."', TwoWheeler_Restric_OutSite_Sales='".$_POST['TWR_OutSite_Sales']."', TwoWheeler_Restric_OutSite_Sales_PD='".$_POST['TWR_OutSite_Sales_PD']."', FourWheeler='".$_POST['FourWheeler']."', FourWheeler_S='".$_POST['FourWheeler_S']."', FourWheeler_R='".$_POST['FourWheeler_R']."', FourWheeler_Restric='".$_POST['FWR']."', FourWheeler_Restric_PD='".$_POST['FWR_PD']."', FourWheeler_Restric_Sales='".$_POST['FWR_Sales']."', FourWheeler_Restric_Sales_PD='".$_POST['FWR_Sales_PD']."', FourWheeler_Restric_OutSite='".$_POST['FWR_OutSite']."', FourWheeler_Restric_OutSite_PD='".$_POST['FWR_OutSite_PD']."', FourWheeler_Restric_OutSite_Sales='".$_POST['FWR_OutSite_Sales']."', FourWheeler_Restric_OutSite_Sales_PD='".$_POST['FWR_OutSite_Sales_PD']."', TwoWheeler_Restric_Resrch='".$_POST['TWR_Resrch']."', TwoWheeler_Restric_Resrch_PD='".$_POST['TWR_Resrch_PD']."',TwoWheeler_Restric_OutSite_Resrch='".$_POST['TWR_OutSite_Resrch']."', TwoWheeler_Restric_OutSite_Resrch_PD='".$_POST['TWR_OutSite_Resrch_PD']."', FourWheeler_Restric_Resrch='".$_POST['FWR_Resrch']."', FourWheeler_Restric_Resrch_PD='".$_POST['FWR_Resrch_PD']."', FourWheeler_Restric_OutSite_Resrch='".$_POST['FWR_OutSite_Resrch']."', FourWheeler_Restric_OutSite_Resrch_PD='".$_POST['FWR_OutSite_Resrch_PD']."', CreatedBy=".$UserId.", CreatedDate='".date("Y-m-d")."', YearId=".$YearId." WHERE TravelEligibilityId=".$_POST['EditId'], $con) or die(mysql_error());
     if($SqlUpdate){ $msg = "Data has been Updeted successfully...";}
	}   
}



?>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php include_once('../Title.php'); ?></title>

<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style> .font { text-align:center; font-family:Times New Roman; color:#FFFFFF; font-size:12px; } 
.bbody { color:#000000;font-family:Times New Roma; font-size:12px;background-color:#FFFFFF; } 
.input { font-family:Times New Roman;font-size:12px;border:hidden;width:100%;background-color:#FFFFFF;}
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
if (agree) { var x = "TravelElig.php?action=edit&eid="+value;  window.location=x;}}
function del(value) { var agree=confirm("Are you sure you want to delete this record?");
if (agree) { var x = "TravelElig.php?action=delete&did="+value;  window.location=x;}}

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
<?php //************************************************************************************?><table border="0" style="margin-top:0px; width:100%; height:300px;">
 <tr>
  <td align="left" height="20" valign="top" colspan="3">
   <table border="0">
    <tr>
	  <td align="" width="250" class="heading">Travel Eligibility</td>
	  <td align="left">
	    <b><span id="Vtype" class="span">: -&nbsp;Travel Eligibility</span></b>
	  </td>
	  <td class="font4" style="left"><input type="button" name="back" id="back" style="width:90px;" value="back" onClick="javascript:window.location='Index.php?log=<?php echo $_SESSION['logCheckUser']; ?>'"/>
		<input type="button" name="Refrash" value="refresh" onClick="javascript:window.location='TravelElig.php'"/>&nbsp;&nbsp;&nbsp;<b><?php echo $msg; ?></b></td>
	</tr>
   </table>
  </td>
 </tr>
<?php if(($_SESSION['UserType']=='S' OR $_SESSION['UserType']=='A' OR $_SESSION['UserType']=='U') AND $_SESSION['login'] = true) { ?>	
 <tr>
<?php //****************** Open Travels Entitlement*********************?> 
<td align="left" id="type" valign="top" style="display:block; width:102%">             
 <table border="0" width="100%" cellspacing="1">
  <tr>
   <td align="left" width="100%">
   <table border="1" width="100%" bgcolor="#FFFFFF">
    <tr bgcolor="#7a6189">
	 <td class="font" rowspan="4" style="width:80px;"><b>Action</b></td>
	 <td class="font" rowspan="4" style="width:50px;"><b>Grade</b></td>
	 <td class="font" colspan="15"><b>Two Wheeler</b></td>
     <td class="font" colspan="15"><b>Four Wheeler</b></td>
     
    </tr>
    <tr bgcolor="#7a6189">
     <td class="font" rowspan="3" style="width:60px;"><b>Per<br>KM</b></td>
	 <td class="font" rowspan="3" style="width:60px;"><b>Per<br>KM<br>(Sales)</b></td>
	 <td class="font" rowspan="3" style="width:60px;"><b>Per<br>KM<br>(R&D)</b></td>
     <td class="font" colspan="6"><b>HQ</b></td>
     <td class="font" colspan="6"><b>OutSite HQ</b></td>
     <td class="font" rowspan="3" style="width:60px;"><b>Per<br>KM</b></td>
	 <td class="font" rowspan="3" style="width:60px;"><b>Per<br>KM<br>(Sales)</b></td>
	 <td class="font" rowspan="3" style="width:60px;"><b>Per<br>KM<br>(R&D)</b></td>
     <td class="font" colspan="6"><b>HQ</b></td>
     <td class="font" colspan="6"><b>OutSite HQ</b></td>
    </tr>
    <tr bgcolor="#7a6189">
     <td class="font" colspan="2"><b>Non-Sales / R&D </b></td>
     <td class="font" colspan="2"><b>Sales</b></td>
	 <td class="font" colspan="2"><b>R&D </b></td>
     <td class="font" colspan="2"><b>Non-Sales / R&D </b></td>
     <td class="font" colspan="2"><b>Sales</b></td>
	 <td class="font" colspan="2"><b>R&D </b></td>
     <td class="font" colspan="2"><b>Non-Sales / R&D </b></td>
     <td class="font" colspan="2"><b>Sales</b></td>
	 <td class="font" colspan="2"><b>R&D </b></td>
     <td class="font" colspan="2"><b>Non-Sales / R&D </b></td>
     <td class="font" colspan="2"><b>Sales</b></td>
	 <td class="font" colspan="2"><b>R&D </b></td>
    </tr>
    <tr bgcolor="#7a6189">
     <td class="font" style="width:100px;background-color:#359AFF;"><b>Month</b></td>
     <td class="font" style="width:100px;background-color:#359AFF;"><b>Day</b></td>
     <td class="font" style="width:100px;background-color:#359AFF;"><b>Month</b></td>
	 <td class="font" style="width:100px;background-color:#359AFF;"><b>Day</b></td>
	 <td class="font" style="width:100px;background-color:#359AFF;"><b>Month</b></td>
	 <td class="font" style="width:100px;background-color:#359AFF;"><b>Day</b></td>
     <td class="font" style="width:100px;background-color:#359AFF;"><b>Month</b></td>
     <td class="font" style="width:100px;background-color:#359AFF;"><b>Day</b></td>
	 <td class="font" style="width:100px;background-color:#359AFF;"><b>Month</b></td>
	 <td class="font" style="width:100px;background-color:#359AFF;"><b>Day</b></td>
     <td class="font" style="width:100px;background-color:#359AFF;"><b>Month</b></td>
	 <td class="font" style="width:100px;background-color:#359AFF;"><b>Day</b></td>
	 
     <td class="font" style="width:100px;background-color:#359AFF;"><b>Month</b></td>
     <td class="font" style="width:100px;background-color:#359AFF;"><b>Day</b></td>
     <td class="font" style="width:100px;background-color:#359AFF;"><b>Month</b></td>
	 <td class="font" style="width:100px;background-color:#359AFF;"><b>Day</b></td>
     <td class="font" style="width:100px;background-color:#359AFF;"><b>Month</b></td>
     <td class="font" style="width:100px;background-color:#359AFF;"><b>Day</b></td>
     <td class="font" style="width:100px;background-color:#359AFF;"><b>Month</b></td>
     <td class="font" style="width:100px;background-color:#359AFF;"><b>Day</b></td>
	 <td class="font" style="width:100px;background-color:#359AFF;"><b>Month</b></td>
	 <td class="font" style="width:100px;background-color:#359AFF;"><b>Day</b></td>
	 <td class="font" style="width:100px;background-color:#359AFF;"><b>Month</b></td>
	 <td class="font" style="width:100px;background-color:#359AFF;"><b>Day</b></td>
    </tr>
<?php 
if($CompanyId==1){$sqlTravelElig=mysql_query("select * from hrm_traveleligibility where CompanyId=".$CompanyId." AND CreatedDate>='2014-01-21' order by GradeId DESC", $con); }
else{$sqlTravelElig=mysql_query("select * from hrm_traveleligibility where CompanyId=".$CompanyId." order by GradeId DESC", $con);} $SNo=1; while($rTE=mysql_fetch_array($sqlTravelElig)) { if(isset($_REQUEST['action']) && $_REQUEST['action']=="edit" && $_REQUEST['eid']==$rTE['TravelEligibilityId']){ ?>
  <form name="formEdit" method="post" onSubmit="return validateEdit(this)">	
  <tr>
   <td class="bbody" align="center"><?php if($_SESSION['User_Permission']=='Edit'){?>&nbsp;<input type="submit" name="SaveEdit"  value="" class="SaveButton">&nbsp;<?php } ?></td>
   <td class="bbody" align="center"><b><?php echo $rTE['GradeValue'];?></b></td>
   <td><input class="input" name="TwoWheeler" value="<?php echo $rTE['TwoWheeler']; ?>"/></td>
   <td><input class="input" name="TwoWheeler_S" value="<?php echo $rTE['TwoWheeler_S']; ?>"/></td>
   <td><input class="input" name="TwoWheeler_R" value="<?php echo $rTE['TwoWheeler_R']; ?>"/></td>
   
   <td><input class="input" name="TWR" value="<?php echo $rTE['TwoWheeler_Restric']; ?>" /></td>
   <td><input class="input" name="TWR_PD" value="<?php echo $rTE['TwoWheeler_Restric_PD']; ?>" /></td>
   <td><input class="input" name="TWR_Sales" value="<?php echo $rTE['TwoWheeler_Restric_Sales']; ?>" /></td>
   <td><input class="input" name="TWR_Sales_PD" value="<?php echo $rTE['TwoWheeler_Restric_Sales_PD'];?> "/></td>
   <td><input class="input" name="TWR_Resrch" value="<?php echo $rTE['TwoWheeler_Restric_Resrch']; ?>" /></td>
   <td><input class="input" name="TWR_Resrch_PD" value="<?php echo $rTE['TwoWheeler_Restric_Resrch_PD'];?> "/></td>
   
   <td><input class="input" name="TWR_OutSite" value="<?php echo $rTE['TwoWheeler_Restric_OutSite']; ?>" /></td>
   <td><input class="input" name="TWR_OutSite_PD" value="<?php echo $rTE['TwoWheeler_Restric_OutSite_PD'];?>" /></td>
   <td><input class="input" name="TWR_OutSite_Sales" value="<?php echo $rTE['TwoWheeler_Restric_OutSite_Sales']; ?>" /></td>
   <td><input class="input" name="TWR_OutSite_Sales_PD" value="<?php echo $rTE['TwoWheeler_Restric_OutSite_Sales_PD']; ?>" /></td>
   <td><input class="input" name="TWR_OutSite_Resrch" value="<?php echo $rTE['TwoWheeler_Restric_OutSite_Resrch']; ?>" /></td>
   <td><input class="input" name="TWR_OutSite_Resrch_PD" value="<?php echo $rTE['TwoWheeler_Restric_OutSite_Resrch_PD']; ?>" /></td>
	
	
   <td><input class="input" name="FourWheeler" value="<?php echo $rTE['FourWheeler']; ?>" /></td>
   <td><input class="input" name="FourWheeler_S" value="<?php echo $rTE['FourWheeler_S']; ?>" /></td>
   <td><input class="input" name="FourWheeler_R" value="<?php echo $rTE['FourWheeler_R']; ?>" /></td>
   
   <td><input class="input" name="FWR" value="<?php echo $rTE['FourWheeler_Restric']; ?>" />
       <input type="hidden" name="EditId" id="EditId" value="<?php echo $_REQUEST['eid']; ?>"/></td>
   <td><input class="input" name="FWR_PD" value="<?php echo $rTE['FourWheeler_Restric_PD']; ?>" /></td>
   <td><input class="input" name="FWR_Sales" value="<?php echo $rTE['FourWheeler_Restric_Sales']; ?>" /></td>
   <td><input class="input" name="FWR_Sales_PD" value="<?php echo $rTE['FourWheeler_Restric_Sales_PD']; ?>" /></td>
   <td><input class="input" name="FWR_Resrch" value="<?php echo $rTE['FourWheeler_Restric_Resrch']; ?>" /></td>
   <td><input class="input" name="FWR_Resrch_PD" value="<?php echo $rTE['FourWheeler_Restric_Resrch_PD']; ?>" /></td>
   
   <td><input class="input" name="FWR_OutSite" value="<?php echo $rTE['FourWheeler_Restric_OutSite']; ?>" /></td>
   <td><input class="input" name="FWR_OutSite_PD" value="<?php echo $rTE['FourWheeler_Restric_OutSite_PD']; ?>" /></td>
   <td><input class="input" name="FWR_OutSite_Sales" value="<?php echo $rTE['FourWheeler_Restric_OutSite_Sales']; ?>" /></td>
   <td><input class="input" name="FWR_OutSite_Sales_PD" value="<?php echo $rTE['FourWheeler_Restric_OutSite_Sales_PD']; ?>" /></td>
   <td><input class="input" name="FWR_OutSite_Resrch" value="<?php echo $rTE['FourWheeler_Restric_OutSite_Resrch']; ?>" /></td>
   <td><input class="input" name="FWR_OutSite_Resrch_PD" value="<?php echo $rTE['FourWheeler_Restric_OutSite_Resrch_PD']; ?>" /></td>
   
  </tr>
  </form>
<?php } else { ?>	 
  <tr>
   <td class="bbody" align="center"><?php if($_SESSION['User_Permission']=='Edit'){?><a href="#"><img src="images/edit.png" border="0" alt="Edit" onClick="edit(<?php echo $rTE['TravelEligibilityId']; ?>)"></a>
	 <a href="#"><img src="images/delete.png" alt="Delete" border="0" style="display:none" onClick="del(<?php echo $rTE['TravelEligibilityId']; ?>)"></a><?php } ?></td>
   <td class="bbody" align="center"><b><?php echo $rTE['GradeValue'];?></b></td>
   <td class="bbody" align="center"><?php echo $rTE['TwoWheeler'];?></td>
   <td class="bbody" align="center"><?php echo $rTE['TwoWheeler_S'];?></td>
   <td class="bbody" align="center"><?php echo $rTE['TwoWheeler_R'];?></td>
   
   <td class="bbody" style="background-color:#FFCEFF;">&nbsp;<?php echo $rTE['TwoWheeler_Restric'];?></td>
   <td class="bbody" style="background-color:#FFCEFF;">&nbsp;<?php echo $rTE['TwoWheeler_Restric_PD'];?></td>
   <td class="bbody" style="background-color:#FFCEFF;">&nbsp;<?php echo $rTE['TwoWheeler_Restric_Sales'];?></td>
   <td class="bbody" style="background-color:#FFCEFF;">&nbsp;<?php echo $rTE['TwoWheeler_Restric_Sales_PD'];?></td>
   <td class="bbody" style="background-color:#FFCEFF;">&nbsp;<?php echo $rTE['TwoWheeler_Restric_Resrch'];?></td>
   <td class="bbody" style="background-color:#FFCEFF;">&nbsp;<?php echo $rTE['TwoWheeler_Restric_Resrch_PD'];?></td>
   
  <td class="bbody" style="background-color:#FFCEFF;">&nbsp;<?php echo $rTE['TwoWheeler_Restric_OutSite'];?></td>
  <td class="bbody" style="background-color:#FFCEFF;">&nbsp;<?php echo $rTE['TwoWheeler_Restric_OutSite_PD'];?></td>
   <td class="bbody" style="background-color:#FFCEFF;">&nbsp;<?php echo $rTE['TwoWheeler_Restric_OutSite_Sales'];?></td>
   <td class="bbody" style="background-color:#FFCEFF;">&nbsp;<?php echo $rTE['TwoWheeler_Restric_OutSite_Sales_PD'];?></td>
   <td class="bbody" style="background-color:#FFCEFF;">&nbsp;<?php echo $rTE['TwoWheeler_Restric_OutSite_Resrch'];?></td>
   <td class="bbody" style="background-color:#FFCEFF;">&nbsp;<?php echo $rTE['TwoWheeler_Restric_OutSite_Resrch_PD'];?></td>
   
   <td class="bbody" align="center">&nbsp;<?php echo $rTE['FourWheeler']; ?></td>
   <td class="bbody" align="center">&nbsp;<?php echo $rTE['FourWheeler_S']; ?></td>
   <td class="bbody" align="center">&nbsp;<?php echo $rTE['FourWheeler_R']; ?></td>
   
   <td class="bbody" style="background-color:#FFFFB9;">&nbsp;<?php echo $rTE['FourWheeler_Restric'];?></td>
   <td class="bbody" style="background-color:#FFFFB9;">&nbsp;<?php echo $rTE['FourWheeler_Restric_PD'];?></td>
   <td class="bbody" style="background-color:#FFFFB9;">&nbsp;<?php echo $rTE['FourWheeler_Restric_Sales'];?></td>
   <td class="bbody" style="background-color:#FFFFB9;">&nbsp;<?php echo $rTE['FourWheeler_Restric_Sales_PD'];?></td>
   <td class="bbody" style="background-color:#FFFFB9;">&nbsp;<?php echo $rTE['FourWheeler_Restric_Resrch'];?></td>
   <td class="bbody" style="background-color:#FFFFB9;">&nbsp;<?php echo $rTE['FourWheeler_Restric_Resrch_PD'];?></td>
   
   <td class="bbody" style="background-color:#FFFFB9;">&nbsp;<?php echo $rTE['FourWheeler_Restric_OutSite'];?></td>
   <td class="bbody" style="background-color:#FFFFB9;">&nbsp;<?php echo $rTE['FourWheeler_Restric_OutSite_PD'];?></td>
   <td class="bbody" style="background-color:#FFFFB9;">&nbsp;<?php echo $rTE['FourWheeler_Restric_OutSite_Sales'];?></td>
   <td class="bbody" style="background-color:#FFFFB9;">&nbsp;<?php echo $rTE['FourWheeler_Restric_OutSite_Sales_PD'];?></td>
   <td class="bbody" style="background-color:#FFFFB9;">&nbsp;<?php echo $rTE['FourWheeler_Restric_OutSite_Resrch'];?></td>
   <td class="bbody" style="background-color:#FFFFB9;">&nbsp;<?php echo $rTE['FourWheeler_Restric_OutSite_Resrch_PD'];?></td>
   
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

