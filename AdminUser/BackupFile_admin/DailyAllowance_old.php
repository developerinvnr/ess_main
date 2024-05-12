<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}

if(isset($_POST['SaveEdit']))
{
 $Sql2=mysql_query("Select * from hrm_dailyallow WHERE DailyAllowId='".$_POST['EditId']."' AND CompanyId=".$CompanyId, $con); $Result2 = mysql_fetch_assoc($Sql2); 

 $SqlInsert2 = mysql_query("INSERT INTO hrm_dailyallow_event(DailyAllowId,GradeValue,OutSiteHQ,OutSiteHQ_Sales,MH,MH_GPRS,MRSP,MRNS,MCS,MCSSP,Laptop,HelthChekUp,CompanyId,CreatedBy,CreatedDate,YearId)VALUES('".$Result2['DailyAllowId']."', '".$Result2['GradeValue']."', '".$Result2['OutSiteHQ']."', '".$Result2['OutSiteHQ_Sales']."', '".$Result2['MH']."', '".$Result2['MH_GPRS']."', '".$Result2['MRSP']."', '".$Result2['MRNS']."', '".$Result2['MCS']."', '".$Result2['MCSSP']."', '".$Result2['Laptop']."', '".$Result2['HelthChekUp']."', '".$Result2['CompanyId']."', ".$Result2['CreatedBy'].", '".$Result2['CreatedDate']."', ".$Result2['YearId'].")", $con); 
  if($SqlInsert2)
    { $SqlUpdate = mysql_query("UPDATE hrm_dailyallow SET OutSiteHQ='".$_POST['OutSiteHQ']."', OutSiteHQ_Sales='".$_POST['OutSiteHQ_Sales']."', MH='".$_POST['MH']."', MH_GPRS='".$_POST['MH_GPRS']."', MRSP='".$_POST['MRSP']."', prd_1='".$_POST['prd_1']."', MRNS='".$_POST['MRNS']."', prd_2='".$_POST['prd_2']."', MRNS_RD='".$_POST['MRNS_RD']."', prd_3='".$_POST['prd_3']."', MCS='".$_POST['MCS']."', MCSSP='".$_POST['MCSSP']."', Laptop='".$_POST['Laptop']."', HelthChekUp='".$_POST['HelthChekUp']."', CreatedBy=".$UserId.", CreatedDate='".date("Y-m-d")."', YearId=".$YearId." WHERE DailyAllowId=".$_POST['EditId'], $con) or die(mysql_error());
     if($SqlUpdate){ $msg = "Data has been Updeted successfully...";}
	}   
}

?>

<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style> .font { text-align:center; font-family:Times New Roman; color:#FFFFFF; font-size:12px; } 
.bbody { color:#000000;font-family:Times New Roma; font-size:11px;background-color:#FFFFFF; } 
.input { font-family:Times New Roman;font-size:11px;border:hidden;width:100%;background-color:#FFFFFF;} 
.font4 {color:#1FAD34; font-family:Georgia; font-size:15px;}
.span {display:none; font-family:Courier New; font-size:14px; }.span1 {display:block; font-family:Courier New; font-size:14px; }
.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;}
.SaveButton {background-image:url(images/save.gif); width:20px; height:20px; background-repeat:no-repeat; background-color:#FFFFFF; border-color:#FFFFFF; border-bottom:inherit;}
.TextInput { font-family:"Times New Roman", Times, serif; font-size:11px; width:100px; height:18px;}
</style>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<script type="text/javascript" src="js/MandatoryAjaxCall.js"></script>
<Script type="text/javascript">window.history.forward(1);
function edit(value) { var agree=confirm("Are you sure you want to edit this record?");
if (agree) { var x = "DailyAllowance.php?action=edit&eid="+value;  window.location=x;}}
function del(value) { var agree=confirm("Are you sure you want to delete this record?");
if (agree) { var x = "DailyAllowance.php?action=delete&did="+value;  window.location=x;}}
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
<?php //************************************************************************************?>

<table border="0" style="margin-top:0px; width:100%; height:300px;">
 <tr>
  <td align="left" height="20" valign="top" colspan="3">
   <table border="0">
    <tr>
	  <td align="right" width="360" class="heading">Daily Allowance</td>
	  <td align="left">
	    <b><span id="Vtype" class="span">: -&nbsp;Daily Allowance</span></b>
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
<?php //**************** Open Travels Entitlement*******************?> 
<td align="left" id="type" valign="top" style="display:block; width:100%">             
   <table border="0" width="1200">
	<tr>
	  <td align="left" width="1200">
	     <table border="1" width="1200" border="1" bgcolor="#FFFFFF">
		 <tr bgcolor="#7a6189">
		   <td class="font" style="width:50px;"><b>SNo</b></td>
		   <td class="font" style="width:50px;"><b>Grade</b></td>
		   <td class="font" style="width:100px;"><b>OutSide Head Quater</b></td>
		   <td class="font" style="width:100px;" ><b>OutSide @ HQ (Sales)</b></td>
		   <td class="font" style="width:100px;"><b>Mobile Handset</b></td>
		   <td class="font" style="width:100px;"><b>Mobile Handset GPRS</b></td>
		   <td class="font" style="width:100px;"><b>Mobile Reim. (S & P)</b></td>
		   <td class="font" style="width:80px;"><b>Period</b></td>
		   <td class="font" style="width:100px;"><b>Mobile Reim. (Non Sales)</b></td>
		   <td class="font" style="width:80px;"><b>Period</b></td>
		   
		   <td class="font" style="width:100px;"><b>Mobile Reim. (R&D)</b></td>
		   <td class="font" style="width:80px;"><b>Period</b></td>
		   
		   <td class="font" style="width:100px;"><b>Mediclaim Coverage Slabs</b></td>
		   <td class="font" style="width:100px;"><b>Mediclaim Coverage Slabs(S & P)</b></td>
		   <td class="font" style="width:80px;"><b>Laptop</b></td>
		   <td class="font" style="width:80px;"><b>Helth Checkup</b></td>
		   <td class="font" style="width:80px;"><b>Action</b></td>
		 </tr>
      <?php 
if($CompanyId==1){$sqlDailyAllow=mysql_query("select * from hrm_dailyallow where CompanyId=".$CompanyId." AND CreatedDate>='2014-01-21' order by GradeId DESC", $con); }
else{$sqlDailyAllow=mysql_query("select * from hrm_dailyallow where CompanyId=".$CompanyId." order by GradeId DESC", $con); }$SNo=1; while($resDailyAllow=mysql_fetch_array($sqlDailyAllow)) {
if(isset($_REQUEST['action']) && $_REQUEST['action']=="edit" && $_REQUEST['eid']==$resDailyAllow['DailyAllowId']){ ?>
         <form name="formEdit" method="post" onSubmit="return validateEdit(this)">	
         <tr>
          <td class="bbody" align="center" ><?php echo $SNo; ?></td>
          <td class="bbody" align="center">&nbsp;<?php echo $resDailyAllow['GradeValue'];?></td>
          <td><input class="input" name="OutSiteHQ" value="<?php echo $resDailyAllow['OutSiteHQ']; ?>" /></td>
          <td><input class="input" name="OutSiteHQ_Sales" value="<?php echo $resDailyAllow['OutSiteHQ_Sales']; ?>"/></td>
          <td><input class="input" name="MH" value="<?php echo $resDailyAllow['MH']; ?>"/></td>
          <td><input class="input" name="MH_GPRS" value="<?php echo $resDailyAllow['MH_GPRS']; ?>"/></td>
          <td><input class="input" name="MRSP" value="<?php echo $resDailyAllow['MRSP']; ?>"/></td>
		  <td><select class="input" name="prd_1" ><option value="<?php echo $resDailyAllow['prd_1'];?>"><?php if($resDailyAllow['prd_1']!=''){echo $resDailyAllow['prd_1'];}else{echo 'Select';} ?></option><option value="Month">Mnt</option><option value="Qtr">Qtr</option><option value="Annual">Annual</option></select> </td>
          <td><input class="input" name="MRNS" value="<?php echo $resDailyAllow['MRNS']; ?>"/></td>
		  <td><select class="input" name="prd_2" ><option value="<?php echo $resDailyAllow['prd_2'];?>"><?php if($resDailyAllow['prd_2']!=''){echo $resDailyAllow['prd_2'];}else{echo 'Select';} ?></option><option value="Month">Mnt</option><option value="Qtr">Qtr</option><option value="Annual">Annual</option></select> </td>
		  
		  <td><input class="input" name="MRNS_RD" value="<?php echo $resDailyAllow['MRNS_RD']; ?>"/></td>
		  <td><select class="input" name="prd_3" ><option value="<?php echo $resDailyAllow['prd_3'];?>"><?php if($resDailyAllow['prd_3']!=''){echo $resDailyAllow['prd_3'];}else{echo 'Select';} ?></option><option value="Month">Mnt</option><option value="Qtr">Qtr</option><option value="Annual">Annual</option></select> </td>
		  
          <td><input class="input" name="MCS" value="<?php echo $resDailyAllow['MCS']; ?>"/></td>
          <td><input class="input" name="MCSSP" value="<?php echo $resDailyAllow['MCSSP']; ?>"/></td>
		  <td><input class="input" name="Laptop" value="<?php echo $resDailyAllow['Laptop']; ?>"/></td>
		  <td><input class="input" name="HelthChekUp" value="<?php echo $resDailyAllow['HelthChekUp']; ?>"/></td>
		   <input type="hidden" name="EditId" id="EditId" value="<?php echo $_REQUEST['eid']; ?>"/></td>
		  <td class="body" align="center"><?php if($_SESSION['User_Permission']=='Edit'){?>&nbsp;<input type="submit" name="SaveEdit"  value="" class="SaveButton">&nbsp;<?php } ?></td>
		 </tr>
		 </form>	 
<?php } else { ?>	 
		 <tr bgcolor="#FFFFFF">
		  <td class="bbody" align="center"><?php echo $SNo;?></td>
		  <td class="bbody" align="center">&nbsp;<?php echo $resDailyAllow['GradeValue'];?></td>
		  <td class="bbody">&nbsp;<?php echo $resDailyAllow['OutSiteHQ'];?></td>
		  <td class="bbody">&nbsp;<?php echo $resDailyAllow['OutSiteHQ_Sales'];?></td>
		  <td class="bbody">&nbsp;<?php echo $resDailyAllow['MH'];?></td>
		  <td class="bbody">&nbsp;<?php echo $resDailyAllow['MH_GPRS'];?></td>
		  <td class="bbody">&nbsp;<?php echo $resDailyAllow['MRSP'];?></td>
		  <td class="bbody">&nbsp;<?php echo $resDailyAllow['prd_1'];?></td>
		  <td class="bbody">&nbsp;<?php echo $resDailyAllow['MRNS'];?></td>
		   <td class="bbody">&nbsp;<?php echo $resDailyAllow['prd_2'];?></td>
		   
		   <td class="bbody">&nbsp;<?php echo $resDailyAllow['MRNS_RD'];?></td>
		   <td class="bbody">&nbsp;<?php echo $resDailyAllow['prd_3'];?></td>
		   
		  <td class="bbody">&nbsp;<?php echo $resDailyAllow['MCS'];?></td>
		  <td class="bbody">&nbsp;<?php echo $resDailyAllow['MCSSP'];?></td>
		  <td class="bbody">&nbsp;<?php echo $resDailyAllow['Laptop'];?></td>
		  <td class="bbody">&nbsp;<?php echo $resDailyAllow['HelthChekUp'];?></td>
		  <td class="bbody" align="center"><?php if($_SESSION['User_Permission']=='Edit'){?><a href="#"><img src="images/edit.png" border="0" alt="Edit" onClick="edit(<?php echo $resDailyAllow['DailyAllowId']; ?>)"></a>&nbsp;&nbsp;<a href="#"><img src="images/delete.png" style="display:none" alt="Delete" border="0" onClick="del(<?php echo $resDailyAllow['DailyAllowId']; ?>)"></a><?php } ?></td>
		 </tr>
<?php } $SNo++;} ?>
         <tr><td bgcolor="#B6E9E2" colspan="14"></td></tr>
		</table>
	  </td>
    </tr>
   <tr>
      <td align="Right" class="fontButton"><table border="0" width="550">
		<tr><td align="right">
		<input type="button" name="back" id="back" style="width:90px;" value="back" onClick="javascript:window.location='Index.php?log=<?php echo $_SESSION['logCheckUser']; ?>'"/><input type="button" name="Refrash" value="refresh" onClick="javascript:window.location='DailyAllowance.php'"/>&nbsp;</td>
		</tr></table>
      </td>
   </tr>
  </table>    
</td>

<?php //*********** Close Travels EntitleMent*************************************?>    
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

