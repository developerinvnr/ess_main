<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}
if($_SESSION['login'] = true){require_once('PhpFile/UserRightP.php'); } else {$msg= "Session Expiry..............."; }
$Uid=$_REQUEST['uuxiid'];
$SqlSelect=mysql_query("select User_FirstName, User_SecondName, User_LastName from hrm_user where AXAUESRUser_Id='".$Uid."'", $con);
$ResSelect=mysql_fetch_assoc($SqlSelect); $ename=$ResSelect['User_FirstName'].' '.$ResSelect['User_SecondName'].' '.$ResSelect['User_LastName'];
?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style> .font { color:#B76222; font-family:Georgia; font-size:12px; vertical-align:middle;} .font4 { color:#1FAD34; font-family:Georgia; font-size:15px;} 
.font1 { color:#400000; font-family:Georgia; font-size:13px;} .font2 { color:#000082; font-family:Georgia; font-size:11px;} 
.font3 { color:#6F0000; font-family:Georgia; font-size:11px;} .font5 { color:#000082; font-family:Georgia; font-size:11px; background-image:url(images/menuBack.png);}
.SaveButton {background-image:url(images/save.gif); width:20px; height:20px; background-repeat:no-repeat; background-color:#FFFFFF; border-color:#FFFFFF; border-bottom:inherit;}
</style>
<script type="text/javascript" src="js/stuHover.js"></script>
<script type="text/javascript" src="js/UserRights.js"></script>
<script language="javascript">window.history.forward(1);</script>
</head>
<body class="body">
<table class="table">
<tr><td><table class="menutable"><tr><td><?php if($_SESSION['login'] = true){ require_once("AMenu.php"); } ?></td></tr></table></td></tr>
<tr>
 <td>
  <table width="100%" style="margin-top:0px;" border="0">
   <tr><td valign="top"><?php if($_SESSION['login'] = true){ require_once("AWelcome.php"); } ?></td></tr>
   <tr><td valign="top" align="center"  width="100%" id="MainWindow">
<?php //************************************************************************************************************************************************************?>
<?php //**********************************************START*****START*****START******START******START***************************************************************?>
<?php //************************************************************************************************************************************************************?>
<?php if(($_SESSION['UserType']=='S' OR $_SESSION['UserType']=='A') AND $_SESSION['login'] = true AND $_REQUEST['action'] = 'Rights') { ?>	  
<table border="0" style="margin-top:0px; width:100%;">
  <tr><td align="left" style="height:20px;" valign="top">
	   <table border="0">
	    <tr><td><img src="images/userRight.png" border="0" /></td>
		    <td align="left" valign="middle" class="font1"><b><?php echo '&nbsp;&nbsp;'.$ename.''; ?></b>&nbsp;&nbsp;&nbsp;&nbsp;</td>  
            <td><input type="button" name="Back" value="Back" onClick="javascript:window.location='<?php if($_SESSION['UserType']=='S') { echo 'MasterAdmin.php';} elseif($_SESSION['UserType']=='A') { echo 'MasterAdmin.php';}?>?log=<?php echo $_SESSION['logCheckUser']; ?>'"/></td>&nbsp;&nbsp;&nbsp;&nbsp;
			<td class="font4" colspan="2" align="left"><b><?php echo $msg; ?></b></td> 
		</tr>	
		</table>
		</td>
    </tr>
	<tr><td align="left" style="height:20px;" valign="top">
	    <table border="0" width="100%">
		  <tr>
			<td>
			<table bgcolor="#C4BCDA" border="0">
			  <tr>
<?php if($_SESSION['UserType']=='S') {  //--------------------------Menu Open ---------------------- ?>
<?php $SqlMenu=mysql_query("Select * from hrm_user_menu where AXAUESRUser_Id=".$Uid, $con); $ResultMenu=mysql_fetch_array($SqlMenu); ?>			   
<form name="MenuFormCheck" method="post">  
<td align="left" valign="baseline" style="width:130px;"><img src="images/menu.png" border="0"/>
<input type="checkbox" value="1" name="MenuShow" id="MenuShow" onClick="DisplayMenu()"/>&nbsp;</td>
<td align="center" valign="baseline" style="width:100px;" class="font5"><b>Master&nbsp;&nbsp;</b>
<input type="checkbox" <?php if($ResultMenu['master']==1) {echo 'checked';} ?> value="1" disabled name="MasterCheck" onClick="DisplayBut()"/>&nbsp;</td>
<td align="center" valign="baseline" style="width:120px;" class="font5"><b>Processing&nbsp;&nbsp;</b>
<input type="checkbox" <?php if($ResultMenu['processing']==1) {echo 'checked';} ?> value="1" disabled name="ProCheck" onClick="DisplayBut()"/>&nbsp;</td>
<td align="center" valign="baseline" style="width:100px;" class="font5"><b>Utility&nbsp;&nbsp;</b>
<input type="checkbox" <?php if($ResultMenu['utility']==1) {echo 'checked';} ?> value="1" disabled name="UtilCheck" onClick="DisplayBut()"/>&nbsp;</td>
<td align="center" valign="baseline" style="width:100px;" class="font5"><b>Query&nbsp;&nbsp;</b>
<input type="checkbox" <?php if($ResultMenu['query']==1) {echo 'checked';} ?> value="1" disabled name="QueryCheck" onClick="DisplayBut()"/>&nbsp;</td>
<td align="center" valign="baseline" style="width:90px;" class="font5"><b>PMS&nbsp;&nbsp;</b>
<input type="checkbox" <?php if($ResultMenu['pms']==1) {echo 'checked';} ?> value="1" disabled name="PMSCheck" onClick="DisplayBut()"/>&nbsp;</td>
<td align="center" valign="baseline" style="width:140px;" class="font5"><b>Recruitment&nbsp;&nbsp;</b>
<input type="checkbox" <?php if($ResultMenu['recruitment']==1) {echo 'checked';} ?> value="1" name="RecruitCheck" disabled onClick="DisplayBut()"/>&nbsp;</td>
<td align="center" valign="baseline" style="width:120px;" class="font5"><b>Separation&nbsp;&nbsp;</b>
<input type="checkbox" <?php if($ResultMenu['separation']==1) {echo 'checked';} ?> value="1" name="SeparCheck" disabled onClick="DisplayBut()"/>&nbsp;</td>
<td align="center" valign="baseline" style="width:100px;" class="font5"><b>Report&nbsp;&nbsp;</b>
<input type="checkbox" <?php if($ResultMenu['report']==1) {echo 'checked';} ?> value="1" name="ReportCheck" disabled onClick="DisplayBut()"/>&nbsp;</td>
<td align="center" valign="baseline" style="width:100px;" class="font5"><b>TDS&nbsp;&nbsp;</b>
<input type="checkbox" <?php if($ResultMenu['tds']==1) {echo 'checked';} ?> value="1" name="TDSCheck" disabled onClick="DisplayBut()"/>&nbsp;</td>
<td align="center" class="font5">&nbsp;&nbsp;<b>
<input type="hidden" name="Uid" value="<?php echo $Uid; ?>" />
<input type="submit" name="MenuCheck" id="MenuCheck" value="Save" disabled/></b></td>
</form>
<?php } //-----------------------------------------------------------Menu Close ---------------------- ?>
			</tr>
		   </table>
		  </td>
		 </tr>
		 </table>
	    </td>
	</tr>
	<tr><td height="10px;">&nbsp;</td></tr>
        <tr>
<?php //*********************************************** Open emp master menu ******************************************************?> 
<td align="left" id="type" valign="top" style="display:block; width:100%">             
   <table border="0" width="1100">
	<tr>
	  <td align="left" width="1100">
	     <table border="1" width="1100" border="1" bgcolor="#FFFFFF">
		 <tr bgcolor="#7a6189">
		   <td rowspan="2" bgcolor="#C4BCDA" style="color:#005959;font-family:Georgia;font-size:11px;width:100px;" valign="middle" align="center"><b>Employee Master</b></td>
		   <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:60px;" valign="top" align="center"><b>Gen</b></td>
		   <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:60px;" valign="top" align="center"><b>Photo</b></td>
		   <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:60px;" valign="top" align="center"><b>Per</b></td>
		   <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:60px;" valign="top" align="center"><b>Cont</b></td>
		   <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:60px;" valign="top" align="center"><b>Lang Profi</b></td>
		   <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:60px;" valign="top" align="center"><b>Quali</b></td>
		   <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:60px;" valign="top" align="center"><b>Exp</b></td>
		   <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:60px;" valign="top" align="center"><b>Family</b></td>
		   <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:60px;" valign="top" align="center"><b>Leave</b></td>
		   <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:60px;" valign="top" align="center"><b>Elig</b></td>
		   <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:60px;" valign="top" align="center"><b>Ctc</b></td>
		   <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:60px;" valign="top" align="center"><b>Check List</b></td>
		   <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:60px;" valign="top" align="center"><b>Assest</b></td>
		   <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:60px;" valign="top" align="center"><b>Trai</b></td>
		   <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:60px;" valign="top" align="center"><b>Conf</b></td>
		   <td valign="top" align="center" style="font:Georgia; font-size:11px; width:50px; color:#FFFFFF;"><b>Action</b></td>
		 </tr>
<?php $sqlEm=mysql_query("select * from hrm_user_menu_master where AXAUESRUser_Id=".$Uid, $con); $resEm=mysql_fetch_array($sqlEm); ?>
	      <form name="formEditEm" method="post" onSubmit="return validateEdit(this)">		  
          <tr>
<td style="width:60px;" align="center"><select name="gene" id="gene" style="font-family:Times New Roman, Times, serif;font-size:11px;width:58px;height:20px;"><option value="<?php echo $resEm['mas_gene']; ?>"><?php if($resEm['mas_gene']==1) { echo 'Y';} else { echo 'N';} ?></option><option value="<?php if($resEm['mas_gene']==1){echo '0';} else { echo '1';} ?>"><?php if($resEm['mas_gene']==1) { echo 'N';} else { echo 'Y';} ?></option></select></td>
		   
<td style="width:60px;"><select name="phot" id="phot" style="font-family:Times New Roman, Times, serif;font-size:11px;width:58px;height:20px;"><option value="<?php echo $resEm['mas_phot']; ?>"><?php if($resEm['mas_phot']==1) { echo 'Y';} else { echo 'N';} ?></option><option value="<?php if($resEm['mas_phot']==1){echo '0';} else { echo '1';} ?>"><?php if($resEm['mas_phot']==1) { echo 'N';} else { echo 'Y';} ?></option></select></td>	
		      
<td style="width:60px;"><select name="pers" id="pers" style="font-family:Times New Roman, Times, serif;font-size:11px;width:58px;height:20px;"><option value="<?php echo $resEm['mas_pers']; ?>"><?php if($resEm['mas_pers']==1) { echo 'Y';} else { echo 'N';} ?></option><option value="<?php if($resEm['mas_pers']==1){echo '0';} else { echo '1';} ?>"><?php if($resEm['mas_pers']==1) { echo 'N';} else { echo 'Y';} ?></option></select></td>

<td style="width:60px;"><select name="cont" id="cont" style="font-family:Times New Roman, Times, serif;font-size:11px;width:58px;height:20px;"><option value="<?php echo $resEm['mas_cont']; ?>"><?php if($resEm['mas_cont']==1) { echo 'Y';} else { echo 'N';} ?></option><option value="<?php if($resEm['mas_cont']==1){echo '0';} else { echo '1';} ?>"><?php if($resEm['mas_cont']==1) { echo 'N';} else { echo 'Y';} ?></option></select></td>

<td style="width:60px;"><select name="lang" id="lang" style="font-family:Times New Roman, Times, serif;font-size:11px;width:58px;height:20px;"><option value="<?php echo $resEm['mas_lang']; ?>"><?php if($resEm['mas_lang']==1) { echo 'Y';} else { echo 'N';} ?></option><option value="<?php if($resEm['mas_lang']==1){echo '0';} else { echo '1';} ?>"><?php if($resEm['mas_lang']==1) { echo 'N';} else { echo 'Y';} ?></option></select></td>

<td style="width:60px;"><select name="qual" id="qual" style="font-family:Times New Roman, Times, serif;font-size:11px;width:58px;height:20px;"><option value="<?php echo $resEm['mas_qual']; ?>"><?php if($resEm['mas_qual']==1) { echo 'Y';} else { echo 'N';} ?></option><option value="<?php if($resEm['mas_qual']==1){echo '0';} else { echo '1';} ?>"><?php if($resEm['mas_qual']==1) { echo 'N';} else { echo 'Y';} ?></option></select></td>

<td style="width:60px;"><select name="expe" id="expe" style="font-family:Times New Roman, Times, serif;font-size:11px;width:58px;height:20px;"><option value="<?php echo $resEm['mas_expe']; ?>"><?php if($resEm['mas_expe']==1) { echo 'Y';} else { echo 'N';} ?></option><option value="<?php if($resEm['mas_expe']==1){echo '0';} else { echo '1';} ?>"><?php if($resEm['mas_expe']==1) { echo 'N';} else { echo 'Y';} ?></option></select></td>

<td style="width:60px;"><select name="fami" id="fami" style="font-family:Times New Roman, Times, serif;font-size:11px;width:58px;height:20px;"><option value="<?php echo $resEm['mas_fami']; ?>"><?php if($resEm['mas_fami']==1) { echo 'Y';} else { echo 'N';} ?></option><option value="<?php if($resEm['mas_fami']==1){echo '0';} else { echo '1';} ?>"><?php if($resEm['mas_fami']==1) { echo 'N';} else { echo 'Y';} ?></option></select></td>

<td style="width:60px;"><select name="leav" id="leav" style="font-family:Times New Roman, Times, serif;font-size:11px;width:58px;height:20px;"><option value="<?php echo $resEm['mas_leav']; ?>"><?php if($resEm['mas_leav']==1) { echo 'Y';} else { echo 'N';} ?></option><option value="<?php if($resEm['mas_leav']==1){echo '0';} else { echo '1';} ?>"><?php if($resEm['mas_leav']==1) { echo 'N';} else { echo 'Y';} ?></option></select></td>

<td style="width:60px;"><select name="elig" id="elig" style="font-family:Times New Roman, Times, serif;font-size:11px;width:58px;height:20px;"><option value="<?php echo $resEm['mas_elig']; ?>"><?php if($resEm['mas_elig']==1) { echo 'Y';} else { echo 'N';} ?></option><option value="<?php if($resEm['mas_elig']==1){echo '0';} else { echo '1';} ?>"><?php if($resEm['mas_elig']==1) { echo 'N';} else { echo 'Y';} ?></option></select></td>

<td style="width:60px;"><select name="ctc" id="ctc" style="font-family:Times New Roman, Times, serif;font-size:11px;width:58px;height:20px;"><option value="<?php echo $resEm['mas_ctc']; ?>"><?php if($resEm['mas_ctc']==1) { echo 'Y';} else { echo 'N';} ?></option><option value="<?php if($resEm['mas_ctc']==1){echo '0';} else { echo '1';} ?>"><?php if($resEm['mas_ctc']==1) { echo 'N';} else { echo 'Y';} ?></option></select></td>

<td style="width:60px;"><select name="chec" id="chec" style="font-family:Times New Roman, Times, serif;font-size:11px;width:58px;height:20px;"><option value="<?php echo $resEm['mas_chec']; ?>"><?php if($resEm['mas_chec']==1) { echo 'Y';} else { echo 'N';} ?></option><option value="<?php if($resEm['mas_chec']==1){echo '0';} else { echo '1';} ?>"><?php if($resEm['mas_chec']==1) { echo 'N';} else { echo 'Y';} ?></option></select></td>

<td style="width:60px;"><select name="asse" id="asse" style="font-family:Times New Roman, Times, serif;font-size:11px;width:58px;height:20px;"><option value="<?php echo $resEm['mas_asse']; ?>"><?php if($resEm['mas_asse']==1) { echo 'Y';} else { echo 'N';} ?></option><option value="<?php if($resEm['mas_asse']==1){echo '0';} else { echo '1';} ?>"><?php if($resEm['mas_asse']==1) { echo 'N';} else { echo 'Y';} ?></option></select></td>

<td style="width:60px;"><select name="trai" id="trai" style="font-family:Times New Roman, Times, serif;font-size:11px;width:58px;height:20px;"><option value="<?php echo $resEm['mas_trai']; ?>"><?php if($resEm['mas_trai']==1) { echo 'Y';} else { echo 'N';} ?></option><option value="<?php if($resEm['mas_trai']==1){echo '0';} else { echo '1';} ?>"><?php if($resEm['mas_trai']==1) { echo 'N';} else { echo 'Y';} ?></option></select></td>

<td style="width:60px;"><select name="conf" id="conf" style="font-family:Times New Roman, Times, serif;font-size:11px;width:58px;height:20px;"><option value="<?php echo $resEm['mas_conf']; ?>"><?php if($resEm['mas_phot']==1) { echo 'Y';} else { echo 'N';} ?></option><option value="<?php if($resEm['mas_conf']==1){echo '0';} else { echo '1';} ?>"><?php if($resEm['mas_conf']==1) { echo 'N';} else { echo 'Y';} ?></option></select></td>

		   <td align="center" valign="middle" style="font:Georgia; font-size:11px; width:50px;"><input type="hidden" name="Uid" value="<?php echo $Uid; ?>" />
			 &nbsp;<input type="submit" name="SaveEmpMaster"  value="" class="SaveButton">&nbsp;
		   </td>
		 </tr>
		 </form>
         <tr><td bgcolor="#B6E9E2" colspan="20"></td></tr>
		 </table>
	  </td>
   </tr>
  </table>    
</td>
<?php //*********************************************** Close emp master menu ******************************************************?>  	
	</tr>
	<tr><td>&nbsp;</td></tr>


	<tr><td align="left" valign="top">
	    <table border="0">
<?php if($_SESSION['UserType']=='S' OR $_SESSION['UserType']=='A') {  //--------------------------SubMenu Open ---------------------- ?> 
		  <tr>
		  <td valign="middle">
		  <table border="0" bgcolor="#C4BCDA" height="30">
			<tr>
<?php $SqlMenu=mysql_query("Select * from hrm_user_menu where AXAUESRUser_Id=".$Uid, $con); $ResultMenu=mysql_fetch_array($SqlMenu); ?>			   
			 <td align="left" style="width:150px;"><img src="images/submenu.png" border="0"/></td>
			 <td width="20"></td>
			 <td align="left" style="width:100px;"><a href="#"><img src="images/master.png" border="0" onClick="SubMenuMasForm()"/></a></td>
			 <td align="left" style="width:100px;"><a href="#"><img src="images/processing.png" border="0" onClick="SubMenuProForm()"/></a></td>
			 <td align="left" style="width:100px;"><a href="#"><img src="images/utility.png" border="0" onClick="SubMenuUtilForm()"/></a></td>
			 <td align="left" style="width:100px;"><a href="#"><img src="images/query.png" border="0" onClick="SubMenuQueryForm()"/></a></td>
			 <td align="left" style="width:100px;"><a href="#"><img src="images/pms.png" border="0" onClick="SubMenuPmsForm()"/></a></td>
			 <td align="left" style="width:100px;"><a href="#"><img src="images/recruitment.png" border="0" onClick="SubMenuRecForm()"/></a></td>
			 <td align="left" style="width:100px;"><a href="#"><img src="images/separation.png" border="0" onClick="SubMenuSepForm()"/></a></td>
			 <td align="left" style="width:100px;"><a href="#"><img src="images/report.png" border="0" onClick="SubMenuRepForm()"/></a></td>  
			 <td align="left" style="width:100px;"><a href="#"><img src="images/tds.png" border="0" onClick="SubMenuTdsForm()"/></a></td>
		    </tr>
		   </table>
		   </td>
	       </tr>
	       <tr>
<?php $SqlSubMenu=mysql_query("Select * from hrm_user_submenu where AXAUESRUser_Id=".$Uid, $con); $ResultSubMenu=mysql_fetch_array($SqlSubMenu); ?>	   
<?php //****************************************************"URightSubMaster"************************************************?>
<td valign="middle" id="master" style="display:none;" width="100%">
<form name="SubMenuMasterForm" method="post"> 
<table border="0">
 <tr><td align="center"><table border="0" bgcolor=""><tr><td class="font4"><b><img src="images/master.png" border="0" /></b></td></tr></table></td></tr>
 <tr><td>
     <table border="1"><tr>
     <td><table border="0" bgcolor="#FFFFFF"><tr>
		 <td align="left" class="font3">&nbsp;<b>Company Master &nbsp;: -&nbsp;</b></td>
		 <td align="left" class="font2">&nbsp;Basic Details &nbsp;:&nbsp;</td>
		 <td><select name="Basic"><option value="<?php echo $ResultSubMenu['Mas_ComMaster_Basic']; ?>"><?php if($ResultSubMenu['Mas_ComMaster_Basic']==1) { echo 'Y';} else { echo 'N';} ?></option><option value="<?php if($ResultSubMenu['Mas_ComMaster_Basic']==1){echo '0';} else { echo '1';} ?>"><?php if($ResultSubMenu['Mas_ComMaster_Basic']==1) { echo 'N';} else { echo 'Y';} ?></option></select></td>
		<td>&nbsp;</td>
		<td align="left" class="font2">&nbsp;Statutory Details &nbsp;:&nbsp;</td>
		<td><select name="Statutory"><option value="<?php echo $ResultSubMenu['Mas_ComMaster_Statutory']; ?>"><?php if($ResultSubMenu['Mas_ComMaster_Statutory']==1) { echo 'Y';} else { echo 'N';} ?></option><option value="<?php if($ResultSubMenu['Mas_ComMaster_Statutory']==1){echo '0';} else { echo '1';} ?>"><?php if($ResultSubMenu['Mas_ComMaster_Statutory']==1) { echo 'N';} else { echo 'Y';} ?></option></select>
		</td><td>&nbsp;</td>
		<td align="left" class="font2">&nbsp;Vendors Details &nbsp;:&nbsp;</td>
		<td><select name="Vendors"><option value="<?php echo $ResultSubMenu['Mas_ComMaster_Vendors']; ?>"><?php if($ResultSubMenu['Mas_ComMaster_Vendors']==1) { echo 'Y';} else { echo 'N';} ?></option><option value="<?php if($ResultSubMenu['Mas_ComMaster_Vendors']==1){echo '0';} else { echo '1';} ?>"><?php if($ResultSubMenu['Mas_ComMaster_Vendors']==1) { echo 'N';} else { echo 'Y';} ?></option></select>
		</td><td>&nbsp;</td>
		</tr>
		<tr>
		   <td align="left" class="font3">&nbsp;<b>Mandatory &nbsp;: -&nbsp;</b></td>
		   <td align="left" class="font2">&nbsp;Department &nbsp;:&nbsp;</td>
		   <td><select name="Dept"><option value="<?php echo $ResultSubMenu['Mas_DetailMand_Dept']; ?>"><?php if($ResultSubMenu['Mas_DetailMand_Dept']==1) { echo 'Y';} else { echo 'N';} ?></option><option value="<?php if($ResultSubMenu['Mas_DetailMand_Dept']==1){echo '0';} else { echo '1';} ?>"><?php if($ResultSubMenu['Mas_DetailMand_Dept']==1) { echo 'N';} else { echo 'Y';} ?></option></select></td>
		   <td>&nbsp;</td>
		   <td align="left" class="font2">&nbsp;HeadQuater &nbsp;:&nbsp;</td>
		   <td><select name="HQ"><option value="<?php echo $ResultSubMenu['Mas_DetailMand_HQ']; ?>"><?php if($ResultSubMenu['Mas_DetailMand_HQ']==1) { echo 'Y';} else { echo 'N';} ?></option><option value="<?php if($ResultSubMenu['Mas_DetailMand_HQ']==1){echo '0';} else { echo '1';} ?>"><?php if($ResultSubMenu['Mas_DetailMand_HQ']==1) { echo 'N';} else { echo 'Y';} ?></option></select></td>
		   <td>&nbsp;</td>
		   <td align="left" class="font2">&nbsp;Grade &nbsp;:&nbsp;</td>
		   <td><select name="Grade"><option value="<?php echo $ResultSubMenu['Mas_DetailMand_Grade']; ?>"><?php if($ResultSubMenu['Mas_DetailMand_Grade']==1) { echo 'Y';} else { echo 'N';} ?></option><option value="<?php if($ResultSubMenu['Mas_DetailMand_Grade']==1){echo '0';} else { echo '1';} ?>"><?php if($ResultSubMenu['Mas_DetailMand_Grade']==1) { echo 'N';} else { echo 'Y';} ?></option></select></td>
		   <td>&nbsp;</td>
		   <td align="left" class="font2">&nbsp;Designation &nbsp;:&nbsp;</td>
		   <td><select name="Desig"><option value="<?php echo $ResultSubMenu['Mas_DetailMand_Desig']; ?>"><?php if($ResultSubMenu['Mas_DetailMand_Desig']==1) { echo 'Y';} else { echo 'N';} ?></option><option value="<?php if($ResultSubMenu['Mas_DetailMand_Desig']==1){echo '0';} else { echo '1';} ?>"><?php if($ResultSubMenu['Mas_DetailMand_Desig']==1) { echo 'N';} else { echo 'Y';} ?></option></select></td>
		   <td>&nbsp;</td>
		   <td align="left" class="font2">&nbsp;Department->Designation &nbsp;:&nbsp;</td>
		   <td><select name="DeptGradeDesig"><option value="<?php echo $ResultSubMenu['Mas_DetailMand_DeptGradeDesig']; ?>"><?php if($ResultSubMenu['Mas_DetailMand_DeptGradeDesig']==1) { echo 'Y';} else { echo 'N';} ?></option><option value="<?php if($ResultSubMenu['Mas_DetailMand_DeptGradeDesig']==1){echo '0';} else { echo '1';} ?>"><?php if($ResultSubMenu['Mas_DetailMand_DeptGradeDesig']==1) { echo 'N';} else { echo 'Y';} ?></option></select></td>
		   <td>&nbsp;</td>
		</tr>
		<tr>
		   <td align="left" class="font3">&nbsp;<b> &nbsp;&nbsp;</b></td>
		   <td align="left" class="font2">&nbsp;CityClassification &nbsp;:&nbsp;</td>
		   <td><select name="CityClass"><option value="<?php echo $ResultSubMenu['Mas_DetailMand_CityClass']; ?>"><?php if($ResultSubMenu['Mas_DetailMand_CityClass']==1) { echo 'Y';} else { echo 'N';} ?></option><option value="<?php if($ResultSubMenu['Mas_DetailMand_CityClass']==1){echo '0';} else { echo '1';} ?>"><?php if($ResultSubMenu['Mas_DetailMand_CityClass']==1) { echo 'N';} else { echo 'Y';} ?></option></select></td>
		   <td>&nbsp;</td>
		   <td align="left" class="font2">&nbsp;CostCenter &nbsp;:&nbsp;</td>
		   <td><select name="CostCenter"><option value="<?php echo $ResultSubMenu['Mas_DetailMand_CostCenter']; ?>"><?php if($ResultSubMenu['Mas_DetailMand_CostCenter']==1) { echo 'Y';} else { echo 'N';} ?></option><option value="<?php if($ResultSubMenu['Mas_DetailMand_CostCenter']==1){echo '0';} else { echo '1';} ?>"><?php if($ResultSubMenu['Mas_DetailMand_CostCenter']==1) { echo 'N';} else { echo 'Y';} ?></option></select>
		  </td><td>&nbsp;</td>

		  <td align="left" class="font2">&nbsp;Designation->Grade &nbsp;:&nbsp;</td>

		   <td><select name="DesigGrade">

			   <option value="<?php echo $ResultSubMenu['Mas_DetailMand_DesigGrade']; ?>"><?php if($ResultSubMenu['Mas_DetailMand_DesigGrade']==1) { echo 'Y';} else { echo 'N';} ?></option>

			   <option value="<?php if($ResultSubMenu['Mas_DetailMand_DesigGrade']==1){echo '0';} else { echo '1';} ?>"><?php if($ResultSubMenu['Mas_DetailMand_DesigGrade']==1) { echo 'N';} else { echo 'Y';} ?></option>

			   </select>

		  </td><td>&nbsp;</td>

		</tr>

		<tr>

		   <td align="left" class="font3">&nbsp;<b>Micellaneous  &nbsp;: -&nbsp;</b></td>

		   <td align="left" class="font2">&nbsp;Category &nbsp;:&nbsp;</td>

		   <td><select name="Category">

			   <option value="<?php echo $ResultSubMenu['Mas_DetailMice_Category']; ?>"><?php if($ResultSubMenu['Mas_DetailMice_Category']==1) { echo 'Y';} else { echo 'N';} ?></option>

			   <option value="<?php if($ResultSubMenu['Mas_DetailMice_Category']==1){echo '0';} else { echo '1';} ?>"><?php if($ResultSubMenu['Mas_DetailMice_Category']==1) { echo 'N';} else { echo 'Y';} ?></option>

			   </select>

		  </td><td>&nbsp;</td>

		  <td align="left" class="font2">&nbsp;Section &nbsp;:&nbsp;</td>

		   <td><select name="Section">

			   <option value="<?php echo $ResultSubMenu['Mas_DetailMice_Section']; ?>"><?php if($ResultSubMenu['Mas_DetailMice_Section']==1) { echo 'Y';} else { echo 'N';} ?></option>

			   <option value="<?php if($ResultSubMenu['Mas_DetailMice_Section']==1){echo '0';} else { echo '1';} ?>"><?php if($ResultSubMenu['Mas_DetailMice_Section']==1) { echo 'N';} else { echo 'Y';} ?></option>

			   </select>

		  </td><td>&nbsp;</td>

		   <td align="left" class="font2">&nbsp;Country/State/City&nbsp;:&nbsp;</td>

		   <td><select name="CounStatCity">

			   <option value="<?php echo $ResultSubMenu['Mas_DetailMice_CounStatCity']; ?>"><?php if($ResultSubMenu['Mas_DetailMice_CounStatCity']==1) { echo 'Y';} else { echo 'N';} ?></option>

			   <option value="<?php if($ResultSubMenu['Mas_DetailMice_CounStatCity']==1){echo '0';} else { echo '1';} ?>"><?php if($ResultSubMenu['Mas_DetailMice_CounStatCity']==1) { echo 'N';} else { echo 'Y';} ?></option>

			   </select>

		  </td><td>&nbsp;</td>

		</tr>

		<tr>

		   <td align="left" class="font3">&nbsp;<b>Eligibility  &nbsp;: -&nbsp;</b></td>

		   <td align="left" class="font2">&nbsp;LodEntitlement &nbsp;:&nbsp;</td>

		   <td><select name="LodEntitle">

			   <option value="<?php echo $ResultSubMenu['Mas_DetailElig_LodEntitle']; ?>"><?php if($ResultSubMenu['Mas_DetailElig_LodEntitle']==1) { echo 'Y';} else { echo 'N';} ?></option>

			   <option value="<?php if($ResultSubMenu['Mas_DetailElig_LodEntitle']==1){echo '0';} else { echo '1';} ?>"><?php if($ResultSubMenu['Mas_DetailElig_LodEntitle']==1) { echo 'N';} else { echo 'Y';} ?></option>

			   </select>

		  </td><td>&nbsp;</td>

		   <td align="left" class="font2">&nbsp;TravelEntitlement &nbsp;:&nbsp;</td>

		   <td><select name="TravelEntitle">

			   <option value="<?php echo $ResultSubMenu['Mas_DetailElig_TravelEntitle']; ?>"><?php if($ResultSubMenu['Mas_DetailElig_TravelEntitle']==1) { echo 'Y';} else { echo 'N';} ?></option>

			   <option value="<?php if($ResultSubMenu['Mas_DetailElig_TravelEntitle']==1){echo '0';} else { echo '1';} ?>"><?php if($ResultSubMenu['Mas_DetailElig_TravelEntitle']==1) { echo 'N';} else { echo 'Y';} ?></option>

			   </select>

		  </td><td>&nbsp;</td>

		   <td align="left" class="font2">&nbsp;TravelEligibility &nbsp;:&nbsp;</td>

		   <td><select name="TravelElig">

			   <option value="<?php echo $ResultSubMenu['Mas_DetailElig_TravelElig']; ?>"><?php if($ResultSubMenu['Mas_DetailElig_TravelElig']==1) { echo 'Y';} else { echo 'N';} ?></option>

			   <option value="<?php if($ResultSubMenu['Mas_DetailElig_TravelElig']==1){echo '0';} else { echo '1';} ?>"><?php if($ResultSubMenu['Mas_DetailElig_TravelElig']==1) { echo 'N';} else { echo 'Y';} ?></option>

			   </select>

		  </td><td>&nbsp;</td>

		   <td align="left" class="font2">&nbsp;DailyAllowance &nbsp;:&nbsp;</td>

		   <td><select name="DailyAllow">

			   <option value="<?php echo $ResultSubMenu['Mas_DetailElig_DailyAllow']; ?>"><?php if($ResultSubMenu['Mas_DetailElig_DailyAllow']==1) { echo 'Y';} else { echo 'N';} ?></option>

			   <option value="<?php if($ResultSubMenu['Mas_DetailElig_DailyAllow']==1){echo '0';} else { echo '1';} ?>"><?php if($ResultSubMenu['Mas_DetailElig_DailyAllow']==1) { echo 'N';} else { echo 'Y';} ?></option>

			   </select>

		  </td><td>&nbsp;</td>  

		</tr>

		<tr>

		   <td align="left" class="font3">&nbsp;<b> &nbsp;&nbsp;</b></td>

		   <td align="left" class="font2">&nbsp;PayComponent &nbsp;:&nbsp;</td>

		   <td><select name="PayCompo">

			   <option value="<?php echo $ResultSubMenu['Mas_PayCompo']; ?>"><?php if($ResultSubMenu['Mas_PayCompo']==1) { echo 'Y';} else { echo 'N';} ?></option>

			   <option value="<?php if($ResultSubMenu['Mas_PayCompo']==1){echo '0';} else { echo '1';} ?>"><?php if($ResultSubMenu['Mas_PayCompo']==1) { echo 'N';} else { echo 'Y';} ?></option>

			   </select>

		  </td><td>&nbsp;</td>

		  <td align="left" class="font2">&nbsp;Leave &nbsp;:&nbsp;></td>

		   <td><select name="Leave">

			   <option value="<?php echo $ResultSubMenu['Mas_Leave']; ?>"><?php if($ResultSubMenu['Mas_Leave']==1) { echo 'Y';} else { echo 'N';} ?></option>

			   <option value="<?php if($ResultSubMenu['Mas_Leave']==1){echo '0';} else { echo '1';} ?>"><?php if($ResultSubMenu['Mas_Leave']==1) { echo 'N';} else { echo 'Y';} ?></option>

			   </select>

		  </td><td>&nbsp;</td>

		  <td align="left" class="font2">&nbsp;Holiday &nbsp;:&nbsp;</td>

		   <td><select name="Holiday">

			   <option value="<?php echo $ResultSubMenu['Mas_Holiday']; ?>"><?php if($ResultSubMenu['Mas_Holiday']==1) { echo 'Y';} else { echo 'N';} ?></option>

			   <option value="<?php if($ResultSubMenu['Mas_Holiday']==1){echo '0';} else { echo '1';} ?>"><?php if($ResultSubMenu['Mas_Holiday']==1) { echo 'N';} else { echo 'Y';} ?></option>

			   </select>

		  </td><td>&nbsp;</td>

		  <td align="left" class="font2">&nbsp;Employee Masters &nbsp;:&nbsp;</td>

		   <td><select name="EmpMasters">

			   <option value="<?php echo $ResultSubMenu['Mas_EmpMasters']; ?>"><?php if($ResultSubMenu['Mas_EmpMasters']==1) { echo 'Y';} else { echo 'N';} ?></option>

			   <option value="<?php if($ResultSubMenu['Mas_EmpMasters']==1){echo '0';} else { echo '1';} ?>"><?php if($ResultSubMenu['Mas_EmpMasters']==1) { echo 'N';} else { echo 'Y';} ?></option>

			   </select>

		  </td><td>&nbsp;</td>

		  <td align="left" class="font2">&nbsp;Payslip Components&nbsp;:&nbsp;</td>

		   <td><select name="SalaryMasters">

			   <option value="<?php echo $ResultSubMenu['Mas_SalaryMasters']; ?>"><?php if($ResultSubMenu['Mas_SalaryMasters']==1) { echo 'Y';} else { echo 'N';} ?></option>

			   <option value="<?php if($ResultSubMenu['Mas_SalaryMasters']==1){echo '0';} else { echo '1';} ?>"><?php if($ResultSubMenu['Mas_SalaryMasters']==1) { echo 'N';} else { echo 'Y';} ?></option>

			   </select>

		  </td><td>&nbsp;</td>

		</tr>

		<tr>

		   <td align="left" class="font3">&nbsp;<b> &nbsp;&nbsp;</b></td>

		    <td align="left" class="font2">&nbsp;Thought Of Day &nbsp;:&nbsp;</td>

		   <td><select name="Thought">

			   <option value="<?php echo $ResultSubMenu['Mas_Thought']; ?>"><?php if($ResultSubMenu['Mas_Thought']==1) { echo 'Y';} else { echo 'N';} ?></option>

			   <option value="<?php if($ResultSubMenu['Mas_Thought']==1){echo '0';} else { echo '1';} ?>"><?php if($ResultSubMenu['Mas_Thought']==1) { echo 'N';} else { echo 'Y';} ?></option>

			   </select>

		  </td><td>&nbsp;<input type="hidden" name="Uid" value="<?php echo $Uid; ?>" /></td>

		  <?php if($_SESSION['UserType']=='S') { ?>

		  <td align="left" class="font2">&nbsp;Create New Company &nbsp;:&nbsp;</td>

		  <td><select name="NewCompany">

			   <option value="<?php echo $ResultSubMenu['Mas_NewCompany']; ?>"><?php if($ResultSubMenu['Mas_NewCompany']==1) { echo 'Y';} else { echo 'N';} ?></option>

			   <option value="<?php if($ResultSubMenu['Mas_NewCompany']==1){echo '0';} else { echo '1';} ?>"><?php if($ResultSubMenu['Mas_NewCompany']==1) { echo 'N';} else { echo 'Y';} ?></option>

			   </select>

		  </td><td>&nbsp;</td><?php } ?>
                  <?php if($_SESSION['UserType']=='M' OR $_SESSION['UserType']=='S' OR $_SESSION['UserType']=='A') { ?>
		  <td align="left" class="font2">&nbsp;Re-Structuring &nbsp;:&nbsp;</td>
		  <td><select name="Restructuring">
			   <option value="<?php echo $ResultSubMenu['Mas_Restructuring']; ?>"><?php if($ResultSubMenu['Mas_Restructuring']==1) { echo 'Y';} else { echo 'N';} ?></option>
			   <option value="<?php if($ResultSubMenu['Mas_Restructuring']==1){echo '0';} else { echo '1';} ?>"><?php if($ResultSubMenu['Mas_Restructuring']==1) { echo 'N';} else { echo 'Y';} ?></option>
			   </select>

		  </td><td>&nbsp;</td><?php } ?>

		</tr>

	  </table>

	

					</td>

					</tr></table></td>

				   </tr>

		           <tr bgcolor="#C8C2E2"><td align="center">

				        <table border="0"><tr><td align="center"><input type="button" onClick="javascript:window.location='AdminRights.php?uuxiid=<?php echo $_REQUEST['uuxiid']; ?>'" value="Cancel" />&nbsp;&nbsp;<input type="submit" name="SubMenuMaster" id="SubMenuMaster" value="Save" /></td></tr></table>

				       </td>

				   </tr>

		        </table>

		    </form>		

   </td>

<?php //****************************************************"URightSubProcessing"************************************************?>

<td valign="middle" id="processing" style="display:none;" width="100%">

		    <form name="SubMenuProcessingForm" method="post"> 

			   			     <table border="0">

			       <tr><td align="center"><table border="0" bgcolor=""><tr><td class="font4"><b><img src="images/processing.png" border="0" /></b></td></tr></table></td></tr>

				   <tr>

				    <td><table border="1"><tr>

				    <td>

	  <table border="0" bgcolor="#FFFFFF">

		<tr>

		   <td align="left" class="font3">&nbsp;<b> &nbsp;&nbsp;</b></td>

		   <td align="left" class="font2">&nbsp;Add Attend./Leave &nbsp;:&nbsp;</td>

		   <td><select name="AddAttLeave">

			   <option value="<?php echo $ResultSubMenu['Pro_AddAttLeave']; ?>"><?php if($ResultSubMenu['Pro_AddAttLeave']==1) { echo 'Y';} else { echo 'N';} ?></option>

			   <option value="<?php if($ResultSubMenu['Pro_AddAttLeave']==1){echo '0';} else { echo '1';} ?>"><?php if($ResultSubMenu['Pro_AddAttLeave']==1) { echo 'N';} else { echo 'Y';} ?></option>

			   </select>

		  </td><td>&nbsp;</td>

		   <td align="left" class="font2">&nbsp;Approved Leave &nbsp;:&nbsp;</td>

		   <td><select name="ApprovedLeave">

			   <option value="<?php echo $ResultSubMenu['Pro_ApprovedLeave']; ?>"><?php if($ResultSubMenu['Pro_ApprovedLeave']==1) { echo 'Y';} else { echo 'N';} ?></option>

			   <option value="<?php if($ResultSubMenu['Pro_ApprovedLeave']==1){echo '0';} else { echo '1';} ?>"><?php if($ResultSubMenu['Pro_ApprovedLeave']==1) { echo 'N';} else { echo 'Y';} ?></option>

			   </select>

		  </td><td>&nbsp;</td>

		   <td align="left" class="font2">&nbsp;Pending Leave &nbsp;:&nbsp;</td>

		   <td><select name="PendingLeave">

			   <option value="<?php echo $ResultSubMenu['Pro_PendingLeavee']; ?>"><?php if($ResultSubMenu['Pro_PendingLeave']==1) { echo 'Y';} else { echo 'N';} ?></option>

			   <option value="<?php if($ResultSubMenu['Pro_PendingLeave']==1){echo '0';} else { echo '1';} ?>"><?php if($ResultSubMenu['Pro_PendingLeave']==1) { echo 'N';} else { echo 'Y';} ?></option>

			   </select>

		  </td><td>&nbsp;</td>

		   <td align="left" class="font2">&nbsp;Attendance+Register Report &nbsp;:&nbsp;</td>

		   <td><select name="AttReport">

			   <option value="<?php echo $ResultSubMenu['Pro_AttReport']; ?>"><?php if($ResultSubMenu['Pro_AttReport']==1) { echo 'Y';} else { echo 'N';} ?></option>

			   <option value="<?php if($ResultSubMenu['Pro_AttReport']==1){echo '0';} else { echo '1';} ?>"><?php if($ResultSubMenu['Pro_AttReport']==1) { echo 'N';} else { echo 'Y';} ?></option>

			   </select>

		  </td><td>&nbsp;</td>
		  <tr>
		   </td><td>&nbsp;</td>

		   <td align="left" class="font2">&nbsp;PaySlip Report + Employee TDS &nbsp;:&nbsp;</td>

		   <td><select name="PaySlipReport">

			   <option value="<?php echo $ResultSubMenu['Pro_PaySlipReport']; ?>"><?php if($ResultSubMenu['Pro_PaySlipReport']==1) { echo 'Y';} else { echo 'N';} ?></option>

			   <option value="<?php if($ResultSubMenu['Pro_PaySlipReport']==1){echo '0';} else { echo '1';} ?>"><?php if($ResultSubMenu['Pro_PaySlipReport']==1) { echo 'N';} else { echo 'Y';} ?></option>

			   </select>

		  </td><td>&nbsp;</td>
                   <td align="left" class="font2">&nbsp;Training &nbsp;:&nbsp;</td>
		   <td><select name="Training">
			   <option value="<?php echo $ResultSubMenu['Pro_Training']; ?>"><?php if($ResultSubMenu['Pro_Training']==1) { echo 'Y';} else { echo 'N';} ?></option>
			   <option value="<?php if($ResultSubMenu['Pro_Training']==1){echo '0';} else { echo '1';} ?>"><?php if($ResultSubMenu['Pro_Training']==1) { echo 'N';} else { echo 'Y';} ?></option>
			   </select>
		  </td><td>&nbsp;</td>
		  <td align="left" class="font2">&nbsp;Conference &nbsp;:&nbsp;</td>
		   <td><select name="Conference">
			   <option value="<?php echo $ResultSubMenu['Pro_Conference']; ?>"><?php if($ResultSubMenu['Pro_Conference']==1) { echo 'Y';} else { echo 'N';} ?></option>
			   <option value="<?php if($ResultSubMenu['Pro_Conference']==1){echo '0';} else { echo '1';} ?>"><?php if($ResultSubMenu['Pro_Conference']==1) { echo 'N';} else { echo 'Y';} ?></option>
			   </select>
		  </td><td>&nbsp;</td>
		  </tr>

		</tr>

		<tr>

		   <td align="left" class="font3">&nbsp;<b>Monthly Transaction &nbsp;: -&nbsp;</b></td>

		   <td align="left" class="font2">&nbsp;Day&nbsp;:&nbsp;</td>

		   <td><select name="tranDay">

			   <option value="<?php echo $ResultSubMenu['Pro_Monthly_tranDay']; ?>"><?php if($ResultSubMenu['Pro_Monthly_tranDay']==1) { echo 'Y';} else { echo 'N';} ?></option>

			   <option value="<?php if($ResultSubMenu['Pro_Monthly_tranDay']==1){echo '0';} else { echo '1';} ?>"><?php if($ResultSubMenu['Pro_Monthly_tranDay']==1) { echo 'N';} else { echo 'Y';} ?></option>

			   </select>

		  </td><td>&nbsp;</td>

		   <td align="left" class="font2">&nbsp;Lumpsum Component &nbsp;:&nbsp;</td>

		   <td><select name="tranLumpsum">

			   <option value="<?php echo $ResultSubMenu['Pro_Monthly_tranLumpsum']; ?>"><?php if($ResultSubMenu['Pro_Monthly_tranLumpsum']==1) { echo 'Y';} else { echo 'N';} ?></option>

			   <option value="<?php if($ResultSubMenu['Pro_Monthly_tranLumpsum']==1){echo '0';} else { echo '1';} ?>"><?php if($ResultSubMenu['Pro_Monthly_tranLumpsum']==1) { echo 'N';} else { echo 'Y';} ?></option>

			   </select>

		  </td><td>&nbsp;</td>

		</tr>

		<tr>

		   <td align="left" class="font3">&nbsp;&nbsp;&nbsp;</td>

		   <td align="left" class="font2">&nbsp;Processing&nbsp;:&nbsp;</td>

		   <td><select name="Processing">

			   <option value="<?php echo $ResultSubMenu['Pro_Monthly_Processing']; ?>"><?php if($ResultSubMenu['Pro_Monthly_Processing']==1) { echo 'Y';} else { echo 'N';} ?></option>

			   <option value="<?php if($ResultSubMenu['Pro_Monthly_Processing']==1){echo '0';} else { echo '1';} ?>"><?php if($ResultSubMenu['Pro_Monthly_Processing']==1) { echo 'N';} else { echo 'Y';} ?></option>

			   </select>

		  </td><td>&nbsp;</td>

		   <td align="left" class="font2">&nbsp;Bonus &nbsp;:&nbsp;</td>

		   <td><select name="ArrearsCalcu">

			   <option value="<?php echo $ResultSubMenu['Pro_Monthly_ArrearsCalcu']; ?>"><?php if($ResultSubMenu['Pro_Monthly_ArrearsCalcu']==1) { echo 'Y';} else { echo 'N';} ?></option>

			   <option value="<?php if($ResultSubMenu['Pro_Monthly_ArrearsCalcu']==1){echo '0';} else { echo '1';} ?>"><?php if($ResultSubMenu['Pro_Monthly_ArrearsCalcu']==1) { echo 'N';} else { echo 'Y';} ?></option>

			   </select>

		  </td><td>&nbsp;</td>

		   <td align="left" class="font2">&nbsp;Monthly Process &nbsp;:&nbsp;</td>

		   <td><select name="CloseMonth">

			   <option value="<?php echo $ResultSubMenu['Pro_Monthly_CloseMonth']; ?>"><?php if($ResultSubMenu['Pro_Monthly_CloseMonth']==1) { echo 'Y';} else { echo 'N';} ?></option>

			   <option value="<?php if($ResultSubMenu['Pro_Monthly_CloseMonth']==1){echo '0';} else { echo '1';} ?>"><?php if($ResultSubMenu['Pro_Monthly_CloseMonth']==1) { echo 'N';} else { echo 'Y';} ?></option>

			   </select>

		  </td><td>&nbsp;<input type="hidden" name="Uid" value="<?php echo $Uid; ?>" /></td>

		</tr>

    </table>

					</td>

					</tr></table></td>

				   </tr>

		           <tr bgcolor="#C8C2E2"><td align="center">

				        <table border="0"><tr><td align="center"><input type="button" onClick="javascript:window.location='AdminRights.php?uuxiid=<?php echo $_REQUEST['uuxiid']; ?>'" value="Cancel" />&nbsp;&nbsp;<input type="submit" name="SubMenuProcessing" id="SubMenuProcessing" value="Save" /></td></tr></table>

				       </td>

				   </tr>

		        </table>

		    </form>		

  </td>	

<?php //****************************************************"URightSubUtility.php"************************************************?>

<td valign="middle" id="utility" style="display:none;" width="100%">

		    <form name="SubMenuUtilityForm" method="post"> 

			      <table border="0">

			       <tr><td align="center"><table border="0" bgcolor=""><tr><td class="font4"><b><img src="images/utility.png" border="0" /></b></td></tr></table></td></tr>

				   <tr>

				    <td><table border="1"><tr>

				    <td>

	  <table border="0" bgcolor="#FFFFFF">

		<tr>

		   <td align="left" class="font3">&nbsp;<b>&nbsp;&nbsp;</b></td>

		   <?php if($_SESSION['UserType']=='S') { ?>

		   <td align="left" class="font2">&nbsp;Master Admin&nbsp;:&nbsp;</td>

		   <td><select name="MasterAdmin">

			   <option value="<?php echo $ResultSubMenu['Util_MasterAdmin']; ?>"><?php if($ResultSubMenu['Util_MasterAdmin']==1) { echo 'Y';} else { echo 'N';} ?></option>

			   <option value="<?php if($ResultSubMenu['Util_MasterAdmin']==1){echo '0';} else { echo '1';} ?>"><?php if($ResultSubMenu['Util_MasterAdmin']==1) { echo 'N';} else { echo 'Y';} ?></option>

			   </select>

		  </td><td>&nbsp;</td><?php } ?>

		   <td align="left" class="font2">&nbsp;User Right&nbsp;:&nbsp;</td>

		   <td><select name="UserRight">

			   <option value="<?php echo $ResultSubMenu['Util_UserRight']; ?>"><?php if($ResultSubMenu['Util_UserRight']==1) { echo 'Y';} else { echo 'N';} ?></option>

			   <option value="<?php if($ResultSubMenu['Util_UserRight']==1){echo '0';} else { echo '1';} ?>"><?php if($ResultSubMenu['Util_UserRight']==1) { echo 'N';} else { echo 'Y';} ?></option>

			   </select>

		  </td><td>&nbsp;</td>

		  <td align="left" class="font2">&nbsp;Change Password&nbsp;:&nbsp;</td>

		   <td><select name="ChangePwd">

			   <option value="<?php echo $ResultSubMenu['Util_ChangePwd']; ?>"><?php if($ResultSubMenu['Util_ChangePwd']==1) { echo 'Y';} else { echo 'N';} ?></option>

			   <option value="<?php if($ResultSubMenu['Util_ChangePwd']==1){echo '0';} else { echo '1';} ?>"><?php if($ResultSubMenu['Util_ChangePwd']==1) { echo 'N';} else { echo 'Y';} ?></option>

			   </select>

		  </td><td>&nbsp;</td>

		  <td align="left" class="font2">&nbsp;Update Notification&nbsp;:&nbsp;</td>

		   <td><select name="UpdateNotification">

			   <option value="<?php echo $ResultSubMenu['Util_UpdateNotification']; ?>"><?php if($ResultSubMenu['Util_UpdateNotification']==1) { echo 'Y';} else { echo 'N';} ?></option>

			   <option value="<?php if($ResultSubMenu['Util_UpdateNotification']==1){echo '0';} else { echo '1';} ?>"><?php if($ResultSubMenu['Util_UpdateNotification']==1) { echo 'N';} else { echo 'Y';} ?></option>

			   </select>

		  </td><td>&nbsp;</td>

		   <td align="left" class="font2">&nbsp;Import Excel&nbsp;:&nbsp;</td>

		   <td><select name="ImportEmpIncrement">

			   <option value="<?php echo $ResultSubMenu['Util_ImportEmpIncrement']; ?>"><?php if($ResultSubMenu['Util_ImportEmpIncrement']==1) { echo 'Y';} else { echo 'N';} ?></option>

			   <option value="<?php if($ResultSubMenu['Util_ImportEmpIncrement']==1){echo '0';} else { echo '1';} ?>"><?php if($ResultSubMenu['Util_ImportEmpIncrement']==1) { echo 'N';} else { echo 'Y';} ?></option>

			   </select>

		  </td>

		</tr>

		<tr>

		   <td align="left" class="font3">&nbsp;<b>Send Mail&nbsp;: -&nbsp;</b></td>

		   <td align="left" class="font2">&nbsp;PaySlip&nbsp;:&nbsp;</td>

		   <td><select name="PaySlip">

			   <option value="<?php echo $ResultSubMenu['Util_SendMail_PaySlip']; ?>"><?php if($ResultSubMenu['Util_SendMail_PaySlip']==1) { echo 'Y';} else { echo 'N';} ?></option>

			   <option value="<?php if($ResultSubMenu['Util_SendMail_PaySlip']==1){echo '0';} else { echo '1';} ?>"><?php if($ResultSubMenu['Util_SendMail_PaySlip']==1) { echo 'N';} else { echo 'Y';} ?></option>

			   </select>

		  </td><td>&nbsp;</td>

		   <td align="left" class="font2">&nbsp;Reimbursement Payslip&nbsp;:&nbsp;</td>

		   <td><select name="ReimbPayslip">

			   <option value="<?php echo $ResultSubMenu['Util_SendMail_ReimbPayslip']; ?>"><?php if($ResultSubMenu['Util_SendMail_ReimbPayslip']==1) { echo 'Y';} else { echo 'N';} ?></option>

			   <option value="<?php if($ResultSubMenu['Util_SendMail_ReimbPayslip']==1){echo '0';} else { echo '1';} ?>"><?php if($ResultSubMenu['Util_SendMail_ReimbPayslip']==1) { echo 'N';} else { echo 'Y';} ?></option>

			   </select>

		  </td><td>&nbsp;</td>
           <td align="left" class="font2">&nbsp;Customize Payslip&nbsp;:&nbsp;</td>
		   <td><select name="CustomizePayslip">
			   <option value="<?php echo $ResultSubMenu['Util_CustomizePayslip']; ?>"><?php if($ResultSubMenu['Util_CustomizePayslip']==1) { echo 'Y';} else { echo 'N';} ?></option>
			   <option value="<?php if($ResultSubMenu['Util_CustomizePayslip']==1){echo '0';} else { echo '1';} ?>"><?php if($ResultSubMenu['Util_CustomizePayslip']==1) { echo 'N';} else { echo 'Y';} ?></option>
			   </select>
		  </td>
		  <td>&nbsp;</td>
           <td align="left" class="font2">&nbsp;Assign Employee PaySlip/ Menu&nbsp;:&nbsp;</td>
		   <td><select name="AssignEmpPaySlip">
			   <option value="<?php echo $ResultSubMenu['Util_AssignEmpPaySlip']; ?>"><?php if($ResultSubMenu['Util_AssignEmpPaySlip']==1) { echo 'Y';} else { echo 'N';} ?></option>
			   <option value="<?php if($ResultSubMenu['Util_AssignEmpPaySlip']==1){echo '0';} else { echo '1';} ?>"><?php if($ResultSubMenu['Util_AssignEmpPaySlip']==1) { echo 'N';} else { echo 'Y';} ?></option>
			   </select>
		  </td>
		  <td>&nbsp;</td>
           <td align="left" class="font2">&nbsp;BackUp-File&nbsp;:&nbsp;</td>
		   <td><select name="Backup">
			   <option value="<?php echo $ResultSubMenu['Util_Backup']; ?>"><?php if($ResultSubMenu['Util_Backup']==1) { echo 'Y';} else { echo 'N';} ?></option>
			   <option value="<?php if($ResultSubMenu['Util_Backup']==1){echo '0';} else { echo '1';} ?>"><?php if($ResultSubMenu['Util_Backup']==1) { echo 'N';} else { echo 'Y';} ?></option>
			   </select>
		  </td>
		</tr>

		<tr>
		   <td align="left" class="font3">&nbsp;<b>&nbsp;&nbsp;</b></td>
		   <td align="left" class="font2">&nbsp;Assign Employee State&nbsp;:&nbsp;</td>
		   <td><select name="AssignEmpState"><option value="<?php echo $ResultSubMenu['Util_AssignEmpState']; ?>"><?php if($ResultSubMenu['Util_AssignEmpState']==1) { echo 'Y';} else { echo 'N';} ?></option><option value="<?php if($ResultSubMenu['Util_AssignEmpState']==1){echo '0';} else { echo '1';} ?>"><?php if($ResultSubMenu['Util_AssignEmpState']==1) { echo 'N';} else { echo 'Y';} ?></option></select></td>
		   <td>&nbsp;</td>
		   <td align="left" class="font2">&nbsp;Leave/ Query Reporting&nbsp;:&nbsp;</td>
		   <td><select name="ReportingLeaveQuery"><option value="<?php echo $ResultSubMenu['Util_ReportingLeaveQuery']; ?>"><?php if($ResultSubMenu['Util_ReportingLeaveQuery']==1) { echo 'Y';} else { echo 'N';} ?></option> <option value="<?php if($ResultSubMenu['Util_ReportingLeaveQuery']==1){echo '0';} else { echo '1';} ?>"><?php if($ResultSubMenu['Util_ReportingLeaveQuery']==1) { echo 'N';} else { echo 'Y';} ?></option></select>
		  </td></td><td>&nbsp;</td>
		   <td align="left" class="font2">&nbsp;PMS/ KRA Reporting&nbsp;:&nbsp;</td>
		   <td><select name="ReportingPmsKra"><option value="<?php echo $ResultSubMenu['Util_ReportingPmsKra']; ?>"><?php if($ResultSubMenu['Util_ReportingPmsKra']==1) { echo 'Y';} else { echo 'N';} ?></option><option value="<?php if($ResultSubMenu['Util_ReportingPmsKra']==1){echo '0';} else { echo '1';} ?>"><?php if($ResultSubMenu['Util_ReportingPmsKra']==1) { echo 'N';} else { echo 'Y';} ?></option></select>
		  </td><td>&nbsp;</td>
		   <td align="left" class="font2">&nbsp;Profile Status + Investment Declaration&nbsp;:&nbsp;</td>
		   <td><select name="EmpProfileStatus">
			   <option value="<?php echo $ResultSubMenu['Util_EmpProfileStatus']; ?>"><?php if($ResultSubMenu['Util_EmpProfileStatus']==1) { echo 'Y';} else { echo 'N';} ?></option>
			   <option value="<?php if($ResultSubMenu['Util_EmpProfileStatus']==1){echo '0';} else { echo '1';} ?>"><?php if($ResultSubMenu['Util_EmpProfileStatus']==1) { echo 'N';} else { echo 'Y';} ?></option>
			   </select>
		  </td><td>&nbsp;</td>
		   <td align="left" class="font2">&nbsp;Confirmation Letter&nbsp;:&nbsp;</td>
		   <td><select name="ConfLetter">

			   <option value="<?php echo $ResultSubMenu['Util_ConfLetter']; ?>"><?php if($ResultSubMenu['Util_ConfLetter']==1) { echo 'Y';} else { echo 'N';} ?></option>

			   <option value="<?php if($ResultSubMenu['Util_ConfLetter']==1){echo '0';} else { echo '1';} ?>"><?php if($ResultSubMenu['Util_ConfLetter']==1) { echo 'N';} else { echo 'Y';} ?></option>

			   </select>

		  </td><td>&nbsp;<input type="hidden" name="Uid" value="<?php echo $Uid; ?>" /></td>

		</tr>

    </table>

					</td>

					</tr></table></td>

				   </tr>

		           <tr bgcolor="#C8C2E2"><td align="center">

				        <table border="0"><tr><td align="center"><input type="button" onClick="javascript:window.location='AdminRights.php?uuxiid=<?php echo $_REQUEST['uuxiid']; ?>'" value="Cancel" />&nbsp;&nbsp;<input type="submit" name="SubMenuUtility" id="SubMenuUtility" value="Save" /></td></tr></table>

				       </td>

				   </tr>

		        </table>

		    </form>		

    </td>
	
	
	
	
	
	
	
<?php //****************************************************"URightSubQuery.php"************************************************?>
<td valign="middle" id="query" style="display:none;" width="100%">
<form name="SubMenuSeparationForm" method="post"> 
<table border="0">
<tr><td align="center"><table border="0" bgcolor=""><tr><td class="font4"><b><img src="images/query.png" border="0" /></b></td></tr></table></td></tr>
<tr><td><table border="1"><tr>
        <td><table border="0" bgcolor="#FFFFFF"><tr>
		<td align="left" class="font2">&nbsp;Assign Query Subject &nbsp;:&nbsp;</td>
        <td><select name="QSub"><option value="<?php echo $ResultSubMenu['Query_Sub']; ?>"><?php if($ResultSubMenu['Query_Sub']==1) { echo 'Y';} else { echo 'N';} ?></option><option value="<?php if($ResultSubMenu['Query_Sub']==1){echo '0';} else { echo '1';} ?>"><?php if($ResultSubMenu['Query_Sub']==1) { echo 'N';} else { echo 'Y';} ?></option></select></td>
		<td>&nbsp;</td>
	    <td align="left" class="font2">&nbsp;Assign Query Owner &nbsp;:&nbsp;</td>
		<td><select name="QOwner"><option value="<?php echo $ResultSubMenu['Query_Owner']; ?>"><?php if($ResultSubMenu['Query_Owner']==1) { echo 'Y';} else { echo 'N';} ?></option><option value="<?php if($ResultSubMenu['Query_Owner']==1){echo '0';} else { echo '1';} ?>"><?php if($ResultSubMenu['Query_Owner']==1) { echo 'N';} else { echo 'Y';} ?></option></select></td>
		<td>&nbsp;</td>
		<td align="left" class="font2">&nbsp;Assign Query &nbsp;:&nbsp;</td>
		<td><select name="QAssign"><option value="<?php echo $ResultSubMenu['Query_Assign']; ?>"><?php if($ResultSubMenu['Query_Assign']==1) { echo 'Y';} else { echo 'N';} ?></option><option value="<?php if($ResultSubMenu['Query_Assign']==1){echo '0';} else { echo '1';} ?>"><?php if($ResultSubMenu['Query_Assign']==1) { echo 'N';} else { echo 'Y';} ?></option></select></td>
		<td>&nbsp;</td>
		<td align="left" class="font2">&nbsp;Pending Query &nbsp;:&nbsp;</td>
		<td><select name="QPending"><option value="<?php echo $ResultSubMenu['Query_Pending']; ?>"><?php if($ResultSubMenu['Query_Pending']==1) { echo 'Y';} else { echo 'N';} ?></option><option value="<?php if($ResultSubMenu['Query_Pending']==1){echo '0';} else { echo '1';} ?>"><?php if($ResultSubMenu['Query_Pending']==1) { echo 'N';} else { echo 'Y';} ?></option></select></td>
		<td>&nbsp;</td>
		<td align="left" class="font2">&nbsp;Query Mail To&nbsp;:&nbsp;</td>
		<td><select name="QMailTo"><option value="<?php echo $ResultSubMenu['Query_MailTo']; ?>"><?php if($ResultSubMenu['Query_MailTo']==1) { echo 'Y';} else { echo 'N';} ?></option><option value="<?php if($ResultSubMenu['Query_MailTo']==1){echo '0';} else { echo '1';} ?>"><?php if($ResultSubMenu['Query_MailTo']==1) { echo 'N';} else { echo 'Y';} ?></option></select></td>
		<td>&nbsp;</td>
		</tr>
		<tr>
		<td align="left" class="font2">&nbsp;Reply/ Answered Query &nbsp;:&nbsp;</td>
		<td><select name="QAnswer"><option value="<?php echo $ResultSubMenu['Query_Answer']; ?>"><?php if($ResultSubMenu['Query_Answer']==1) { echo 'Y';} else { echo 'N';} ?></option><option value="<?php if($ResultSubMenu['Query_Answer']==1){echo '0';} else { echo '1';} ?>"><?php if($ResultSubMenu['Query_Answer']==1) { echo 'N';} else { echo 'Y';} ?></option></select></td>
		<td>&nbsp;</td>
		<td align="left" class="font2">&nbsp;Closed Query&nbsp;:&nbsp;</td>
		<td><select name="QClosed"><option value="<?php echo $ResultSubMenu['Query_Closed']; ?>"><?php if($ResultSubMenu['Query_Closed']==1) { echo 'Y';} else { echo 'N';} ?></option><option value="<?php if($ResultSubMenu['Query_Closed']==1){echo '0';} else { echo '1';} ?>"><?php if($ResultSubMenu['Query_Closed']==1) { echo 'N';} else { echo 'Y';} ?></option></select></td>
		<td>&nbsp;</td>
		<td align="left" class="font2">&nbsp;Query Reports&nbsp;:&nbsp;</td>
		<td><select name="QReport"><option value="<?php echo $ResultSubMenu['Query_Report']; ?>"><?php if($ResultSubMenu['Query_Report']==1) { echo 'Y';} else { echo 'N';} ?></option><option value="<?php if($ResultSubMenu['Query_Report']==1){echo '0';} else { echo '1';} ?>"><?php if($ResultSubMenu['Query_Report']==1) { echo 'N';} else { echo 'Y';} ?></option></select></td>
		<td>&nbsp;</td>
		<td align="left" class="font2">&nbsp;Query Log Reports&nbsp;:&nbsp;</td>
		<td><select name="QLog"><option value="<?php echo $ResultSubMenu['Query_Log']; ?>"><?php if($ResultSubMenu['Query_Log']==1) { echo 'Y';} else { echo 'N';} ?></option><option value="<?php if($ResultSubMenu['Query_Log']==1){echo '0';} else { echo '1';} ?>"><?php if($ResultSubMenu['Query_Log']==1) { echo 'N';} else { echo 'Y';} ?></option></select></td>
		<td>&nbsp;<input type="hidden" name="Uid" value="<?php echo $Uid; ?>" /></td>
		</tr>
        </table>
	  </td></tr></table></td>
	 </tr>
     <tr bgcolor="#C8C2E2"><td align="center">
     <table border="0"><tr><td align="center"><input type="button" onClick="javascript:window.location='AdminRights.php?uuxiid=<?php echo $_REQUEST['uuxiid']; ?>'" value="Cancel" />&nbsp;&nbsp;<input type="submit" name="SubMenuQuery" id="SubMenuQuery" value="Save" /></td></tr>
	 </table>
    </td>
   </tr>
</table>
</form>		
</td>		
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	

<?php //****************************************************"URightSubPMS.php"************************************************?>

<td valign="middle" id="pms" style="display:none;" width="100%">

		    <form name="SubMenuPMSForm" method="post"> 

			      <table border="0">

			      <tr><td align="center"><table border="0" bgcolor=""><tr><td class="font4"><b><img src="images/PMS.png" border="0" /></b></td></tr></table></td></tr>

				   <tr>

				    <td><table border="1"><tr>

				    <td>

	  <table border="0" bgcolor="#FFFFFF">

		<tr>

		   <td align="left" class="font3">&nbsp;<b>&nbsp;&nbsp;</b></td>

		   <td align="left" class="font2">&nbsp;KRA(FormA)&nbsp;:&nbsp;</td>

		   <td><select name="KRA">

			   <option value="<?php echo $ResultSubMenu['PMS_KRA']; ?>"><?php if($ResultSubMenu['PMS_KRA']==1) { echo 'Y';} else { echo 'N';} ?></option>

			   <option value="<?php if($ResultSubMenu['PMS_KRA']==1){echo '0';} else { echo '1';} ?>"><?php if($ResultSubMenu['PMS_KRA']==1) { echo 'N';} else { echo 'Y';} ?></option>

			   </select>

		  </td><td>&nbsp;</td>

		   <td align="left" class="font2">&nbsp;Distributed Stand. KRA&nbsp;:&nbsp;</td>

		   <td><select name="DeptKRA">

			   <option value="<?php echo $ResultSubMenu['PMS_DeptKRA']; ?>"><?php if($ResultSubMenu['PMS_DeptKRA']==1) { echo 'Y';} else { echo 'N';} ?></option>

			   <option value="<?php if($ResultSubMenu['PMS_DeptKRA']==1){echo '0';} else { echo '1';} ?>"><?php if($ResultSubMenu['PMS_DeptKRA']==1) { echo 'N';} else { echo 'Y';} ?></option>

			   </select>

		  </td><td>&nbsp;</td>

		   <td align="left" class="font2">&nbsp;Weightage For KRA&nbsp;:&nbsp;</td>

		   <td><select name="WeightageForKRA">

			   <option value="<?php echo $ResultSubMenu['PMS_WeightageForKRA']; ?>"><?php if($ResultSubMenu['PMS_WeightageForKRA']==1) { echo 'Y';} else { echo 'N';} ?></option>

			   <option value="<?php if($ResultSubMenu['PMS_WeightageForKRA']==1){echo '0';} else { echo '1';} ?>"><?php if($ResultSubMenu['PMS_WeightageForKRA']==1) { echo 'N';} else { echo 'Y';} ?></option>

			   </select>

		  </td><td>&nbsp;</td>

		   <td align="left" class="font2">&nbsp;Form B&nbsp;:&nbsp;</td>

		   <td><select name="FormB">

			   <option value="<?php echo $ResultSubMenu['PMS_FormB']; ?>"><?php if($ResultSubMenu['PMS_FormB']==1) { echo 'Y';} else { echo 'N';} ?></option>

			   <option value="<?php if($ResultSubMenu['PMS_FormB']==1){echo '0';} else { echo '1';} ?>"><?php if($ResultSubMenu['PMS_FormB']==1) { echo 'N';} else { echo 'Y';} ?></option>

			   </select>

		   </td><td>&nbsp;</td>

		   <td align="left" class="font2">&nbsp;Grade Wise Form B&nbsp;:&nbsp;</td>

		   <td><select name="GradeFormB">

			   <option value="<?php echo $ResultSubMenu['PMS_GradeFormB']; ?>"><?php if($ResultSubMenu['PMS_GradeFormB']==1) { echo 'Y';} else { echo 'N';} ?></option>

			   <option value="<?php if($ResultSubMenu['PMS_GradeFormB']==1){echo '0';} else { echo '1';} ?>"><?php if($ResultSubMenu['PMS_GradeFormB']==1) { echo 'N';} else { echo 'Y';} ?></option>

			   </select>

		  </td><td>&nbsp;</td>

		   <td align="left" class="font2">&nbsp;Feedback&nbsp;:&nbsp;</td>

		   <td><select name="FeedBack">

			   <option value="<?php echo $ResultSubMenu['PMS_FeedBack']; ?>"><?php if($ResultSubMenu['PMS_FeedBack']==1) { echo 'Y';} else { echo 'N';} ?></option>

			   <option value="<?php if($ResultSubMenu['PMS_FeedBack']==1){echo '0';} else { echo '1';} ?>"><?php if($ResultSubMenu['PMS_FeedBack']==1) { echo 'N';} else { echo 'Y';} ?></option>

			   </select>

		  </td>

		  <td>&nbsp;<input type="hidden" name="Uid" value="<?php echo $Uid; ?>" /></td>

		</tr>

		

		<tr>

		   <td align="left" class="font3">&nbsp;<b>&nbsp;&nbsp;</b></td>

		   <td align="left" class="font2">&nbsp;Select App./ Reviewer&nbsp;:&nbsp;</td>

		   <td><select name="SelectAppRev">

			   <option value="<?php echo $ResultSubMenu['PMS_SelectAppRev']; ?>"><?php if($ResultSubMenu['PMS_SelectAppRev']==1) { echo 'Y';} else { echo 'N';} ?></option>

			   <option value="<?php if($ResultSubMenu['PMS_SelectAppRev']==1){echo '0';} else { echo '1';} ?>"><?php if($ResultSubMenu['PMS_SelectAppRev']==1) { echo 'N';} else { echo 'Y';} ?></option>

			   </select>

		  </td><td>&nbsp;</td>

		   <td align="left" class="font2">&nbsp;Assign App./ Reviewer&nbsp;:&nbsp;</td>

		   <td><select name="AssAppReviewer">

			   <option value="<?php echo $ResultSubMenu['PMS_AssAppReviewer']; ?>"><?php if($ResultSubMenu['PMS_AssAppReviewer']==1) { echo 'Y';} else { echo 'N';} ?></option>

			   <option value="<?php if($ResultSubMenu['PMS_AssAppReviewer']==1){echo '0';} else { echo '1';} ?>"><?php if($ResultSubMenu['PMS_AssAppReviewer']==1) { echo 'N';} else { echo 'Y';} ?></option>

			   </select>

		  </td><td>&nbsp;</td> 

		   <td align="left" class="font2">&nbsp;PMS Status&nbsp;:&nbsp;</td>

		   <td><select name="StatusReportDept">

			   <option value="<?php echo $ResultSubMenu['PMS_StatusReportDept']; ?>"><?php if($ResultSubMenu['PMS_StatusReportDept']==1) { echo 'Y';} else { echo 'N';} ?></option>

			   <option value="<?php if($ResultSubMenu['PMS_StatusReportDept']==1){echo '0';} else { echo '1';} ?>"><?php if($ResultSubMenu['PMS_StatusReportDept']==1) { echo 'N';} else { echo 'Y';} ?></option>

			   </select>

		  </td><td>&nbsp;</td>

		  <td align="left" class="font2">&nbsp;Rating Graph&nbsp;:&nbsp;</td>

		   <td><select name="RatingGraph">

			   <option value="<?php echo $ResultSubMenu['PMS_RatingGraph']; ?>"><?php if($ResultSubMenu['PMS_RatingGraph']==1) { echo 'Y';} else { echo 'N';} ?></option>

			   <option value="<?php if($ResultSubMenu['PMS_RatingGraph']==1){echo '0';} else { echo '1';} ?>"><?php if($ResultSubMenu['PMS_RatingGraph']==1) { echo 'N';} else { echo 'Y';} ?></option>

			   </select>

		  </td><td>&nbsp;</td>

		   <td align="left" class="font2">&nbsp;Rating&nbsp;:&nbsp;</td>

		   <td><select name="Rating">

			   <option value="<?php echo $ResultSubMenu['PMS_Rating']; ?>"><?php if($ResultSubMenu['PMS_Rating']==1) { echo 'Y';} else { echo 'N';} ?></option>

			   <option value="<?php if($ResultSubMenu['PMS_Rating']==1){echo '0';} else { echo '1';} ?>"><?php if($ResultSubMenu['PMS_Rating']==1) { echo 'N';} else { echo 'Y';} ?></option>

			   </select>

		  </td><td>&nbsp;</td>

		   <td align="left" class="font2">&nbsp;Normal Rat. Distribution&nbsp;:&nbsp;</td>

		   <td><select name="NormalRatDistri">

			   <option value="<?php echo $ResultSubMenu['PMS_NormalRatDistri']; ?>"><?php if($ResultSubMenu['PMS_NormalRatDistri']==1) { echo 'Y';} else { echo 'N';} ?></option>

			   <option value="<?php if($ResultSubMenu['PMS_NormalRatDistri']==1){echo '0';} else { echo '1';} ?>"><?php if($ResultSubMenu['PMS_NormalRatDistri']==1) { echo 'N';} else { echo 'Y';} ?></option>

			   </select>

		  </td>

		</tr>

		<tr>

		   <td align="left" class="font3">&nbsp;<b>&nbsp;&nbsp;</b></td>

		   <td align="left" class="font2">&nbsp;Increment Distribution&nbsp;:&nbsp;</td>

		   <td><select name="IncDistri">

			   <option value="<?php echo $ResultSubMenu['PMS_IncDistri']; ?>"><?php if($ResultSubMenu['PMS_IncDistri']==1) { echo 'Y';} else { echo 'N';} ?></option>

			   <option value="<?php if($ResultSubMenu['PMS_IncDistri']==1){echo '0';} else { echo '1';} ?>"><?php if($ResultSubMenu['PMS_IncDistri']==1) { echo 'N';} else { echo 'Y';} ?></option>

			   </select>

		  </td><td>&nbsp;</td>

		   <td align="left" class="font2">&nbsp;Weightage Distribution&nbsp;:&nbsp;</td>

		   <td><select name="Percentage">

			   <option value="<?php echo $ResultSubMenu['PMS_Percentage']; ?>"><?php if($ResultSubMenu['PMS_Percentage']==1) { echo 'Y';} else { echo 'N';} ?></option>

			   <option value="<?php if($ResultSubMenu['PMS_Percentage']==1){echo '0';} else { echo '1';} ?>"><?php if($ResultSubMenu['PMS_Percentage']==1) { echo 'N';} else { echo 'Y';} ?></option>

			   </select>

		  </td><td>&nbsp;</td>

		   <td align="left" class="font2">&nbsp;Schedule&nbsp;:&nbsp;</td>

		   <td><select name="Schedule">

			   <option value="<?php echo $ResultSubMenu['PMS_Schedule']; ?>"><?php if($ResultSubMenu['PMS_Schedule']==1) { echo 'Y';} else { echo 'N';} ?></option>

			   <option value="<?php if($ResultSubMenu['PMS_Schedule']==1){echo '0';} else { echo '1';} ?>"><?php if($ResultSubMenu['PMS_Schedule']==1) { echo 'N';} else { echo 'Y';} ?></option>

			   </select>

		  </td><td>&nbsp;</td>
		  <td align="left" class="font2">&nbsp;Open/ Close Menu&nbsp;:&nbsp;</td>
		   <td><select name="OpenCloseMenu">
			   <option value="<?php echo $ResultSubMenu['PMS_OpenCloseMenu']; ?>"><?php if($ResultSubMenu['PMS_OpenCloseMenu']==1) { echo 'Y';} else { echo 'N';} ?></option>
			   <option value="<?php if($ResultSubMenu['PMS_OpenCloseMenu']==1){echo '0';} else { echo '1';} ?>"><?php if($ResultSubMenu['PMS_OpenCloseMenu']==1) { echo 'N';} else { echo 'Y';} ?></option>
			   </select>
		  </td><td>&nbsp;</td>


		   <td align="left" class="font2">&nbsp;Reports&nbsp;:&nbsp;</td>

		   <td><select name="Report">

			   <option value="<?php echo $ResultSubMenu['PMS_Report']; ?>"><?php if($ResultSubMenu['PMS_Report']==1) { echo 'Y';} else { echo 'N';} ?></option>

			   <option value="<?php if($ResultSubMenu['PMS_Report']==1){echo '0';} else { echo '1';} ?>"><?php if($ResultSubMenu['PMS_Report']==1) { echo 'N';} else { echo 'Y';} ?></option>

			   </select>

		  </td><td>&nbsp;</td>

		   <td align="left" class="font2">&nbsp;Edit appraisal form&nbsp;:&nbsp;</td>

		   <td><select name="EditHR">

			   <option value="<?php echo $ResultSubMenu['PMS_EditHR']; ?>"><?php if($ResultSubMenu['PMS_EditHR']==1) { echo 'Y';} else { echo 'N';} ?></option>

			   <option value="<?php if($ResultSubMenu['PMS_EditHR']==1){echo '0';} else { echo '1';} ?>"><?php if($ResultSubMenu['PMS_EditHR']==1) { echo 'N';} else { echo 'Y';} ?></option>

			   </select>

		  </td>


		 </tr>
		 <tr>

		   <td align="left" class="font3">&nbsp;<b>&nbsp;&nbsp;</b></td>

		   <td align="left" class="font2">&nbsp;KRA Status&nbsp;:&nbsp;</td>

		   <td><select name="KRAStatus">

			   <option value="<?php echo $ResultSubMenu['PMS_KRAStatus']; ?>"><?php if($ResultSubMenu['PMS_KRAStatus']==1) { echo 'Y';} else { echo 'N';} ?></option>

			   <option value="<?php if($ResultSubMenu['PMS_KRAStatus']==1){echo '0';} else { echo '1';} ?>"><?php if($ResultSubMenu['PMS_KRAStatus']==1) { echo 'N';} else { echo 'Y';} ?></option>

			   </select>

		  </td><td>&nbsp;</td>
		  <td align="left" class="font2">&nbsp;Edit KRA&nbsp;:&nbsp;</td>

		   <td><select name="EditKRA">

			   <option value="<?php echo $ResultSubMenu['PMS_EditKRA']; ?>"><?php if($ResultSubMenu['PMS_EditKRA']==1) { echo 'Y';} else { echo 'N';} ?></option>

			   <option value="<?php if($ResultSubMenu['PMS_EditKRA']==1){echo '0';} else { echo '1';} ?>"><?php if($ResultSubMenu['PMS_EditKRA']==1) { echo 'N';} else { echo 'Y';} ?></option>

			   </select>

		  </td><td>&nbsp;</td>
		 </tr> 

    </table>

					</td>

					</tr></table></td>

				   </tr>

		           <tr bgcolor="#C8C2E2"><td align="center">

				        <table border="0"><tr><td align="center"><input type="button" onClick="javascript:window.location='AdminRights.php?uuxiid=<?php echo $_REQUEST['uuxiid']; ?>'" value="Cancel" />&nbsp;&nbsp;<input type="submit" name="SubMenuPMS" id="SubMenuPMS" value="Save" /></td></tr></table>

				       </td>

				   </tr>

		        </table>

		    </form>		

  </td>	

<?php //****************************************************"URightSubRecruitment.php"************************************************?>

 <td valign="middle" id="recruitment" style="display:none;" width="100%">

		    <form name="SubMenuRecruitmentForm" method="post"> 

			     <table border="0">

			      <tr><td align="center"><table border="0" bgcolor=""><tr><td class="font4"><b><img src="images/recruitment.png" border="0" /></b></td></tr></table></td></tr>

				   <tr>

				    <td><table border="1"><tr>

				    <td>

	  <table border="0" bgcolor="#FFFFFF">

		<tr>

		   <td align="left" class="font3">&nbsp;<b>&nbsp;&nbsp;</b></td>

		   <td align="left" class="font2">&nbsp;aa&nbsp;:&nbsp;</td>

		   <td><select name="aa">

			   <option value="<?php echo $ResultSubMenu['Recruit_aa']; ?>"><?php if($ResultSubMenu['Recruit_aa']==1) { echo 'Y';} else { echo 'N';} ?></option>

			   <option value="<?php if($ResultSubMenu['Recruit_aa']==1){echo '0';} else { echo '1';} ?>"><?php if($ResultSubMenu['Recruit_aa']==1) { echo 'N';} else { echo 'Y';} ?></option>

			   </select>

		  </td><td>&nbsp;</td>

		   <td align="left" class="font2">&nbsp;bb&nbsp;:&nbsp;</td>

		   <td><select name="bb">

			   <option value="<?php echo $ResultSubMenu['Recruit_bb']; ?>"><?php if($ResultSubMenu['Recruit_bb']==1) { echo 'Y';} else { echo 'N';} ?></option>

			   <option value="<?php if($ResultSubMenu['Recruit_bb']==1){echo '0';} else { echo '1';} ?>"><?php if($ResultSubMenu['Recruit_bb']==1) { echo 'N';} else { echo 'Y';} ?></option>

			   </select>

		  </td><td>&nbsp;</td>

		   <td align="left" class="font2">&nbsp;cc&nbsp;:&nbsp;</td>

		   <td><select name="cc">

			   <option value="<?php echo $ResultSubMenu['Recruit_cc']; ?>"><?php if($ResultSubMenu['Recruit_cc']==1) { echo 'Y';} else { echo 'N';} ?></option>

			   <option value="<?php if($ResultSubMenu['Recruit_cc']==1){echo '0';} else { echo '1';} ?>"><?php if($ResultSubMenu['Recruit_cc']==1) { echo 'N';} else { echo 'Y';} ?></option>

			   </select>

		  </td><td>&nbsp;</td>

		   <td align="left" class="font2">&nbsp;dd&nbsp;:&nbsp;</td>

		   <td><select name="dd">

			   <option value="<?php echo $ResultSubMenu['Recruit_dd']; ?>"><?php if($ResultSubMenu['Recruit_dd']==1) { echo 'Y';} else { echo 'N';} ?></option>

			   <option value="<?php if($ResultSubMenu['Recruit_dd']==1){echo '0';} else { echo '1';} ?>"><?php if($ResultSubMenu['Recruit_dd']==1) { echo 'N';} else { echo 'Y';} ?></option>

			   </select>

		  </td><td>&nbsp;</td>

		   <td align="left" class="font2">&nbsp;ee&nbsp;:&nbsp;</td>

		   <td><select name="ee">

			   <option value="<?php echo $ResultSubMenu['Recruit_ee']; ?>"><?php if($ResultSubMenu['Recruit_ee']==1) { echo 'Y';} else { echo 'N';} ?></option>

			   <option value="<?php if($ResultSubMenu['Recruit_ee']==1){echo '0';} else { echo '1';} ?>"><?php if($ResultSubMenu['Recruit_ee']==1) { echo 'N';} else { echo 'Y';} ?></option>

			   </select>

		  </td><td>&nbsp;<input type="hidden" name="Uid" value="<?php echo $Uid; ?>" /></td>

		</tr>

    </table>

					</td>

					</tr></table></td>

				   </tr>

		           <tr bgcolor="#C8C2E2"><td align="center">

				        <table border="0"><tr><td align="center"><input type="button" onClick="javascript:window.location='AdminRights.php?uuxiid=<?php echo $_REQUEST['uuxiid']; ?>'" value="Cancel" />&nbsp;&nbsp;<input type="submit" name="SubMenuRecruit" id="SubMenuRecruit" value="Save" /></td></tr></table>

				       </td>

				   </tr>

		        </table>

		    </form>		

   </td>	

<?php //****************************************************"URightSubSeparation.php"************************************************?>

 <td valign="middle" id="separation" style="display:none;" width="100%">

		    <form name="SubMenuSeparationForm" method="post"> 

			      <table border="0">

			       <tr><td align="center"><table border="0" bgcolor=""><tr><td class="font4"><b><img src="images/separation.png" border="0" /></b></td></tr></table></td></tr>

				   <tr>

				    <td><table border="1"><tr>

				    <td>

	  <table border="0" bgcolor="#FFFFFF">

		<tr>

		   <td align="left" class="font3">&nbsp;<b>Resignation Awaiting Action &nbsp;: -&nbsp;</b></td>

		   <td align="left" class="font2">&nbsp;Pending Resignation &nbsp;:&nbsp;</td>

		   <td><select name="PendingResig">

			   <option value="<?php echo $ResultSubMenu['Separ_Resig_AwaitAct_PendingResig']; ?>"><?php if($ResultSubMenu['Separ_Resig_AwaitAct_PendingResig']==1) { echo 'Y';} else { echo 'N';} ?></option>

			   <option value="<?php if($ResultSubMenu['Separ_Resig_AwaitAct_PendingResig']==1){echo '0';} else { echo '1';} ?>"><?php if($ResultSubMenu['Separ_Resig_AwaitAct_PendingResig']==1) { echo 'N';} else { echo 'Y';} ?></option>

			   </select>

		  </td><td>&nbsp;</td>

		   <td align="left" class="font2">&nbsp;Pending Clearance &nbsp;:&nbsp;</td>

		   <td><select name="PendingClear">

			   <option value="<?php echo $ResultSubMenu['Separ_Resig_AwaitAct_PendingClear']; ?>"><?php if($ResultSubMenu['Separ_Resig_AwaitAct_PendingClear']==1) { echo 'Y';} else { echo 'N';} ?></option>

			   <option value="<?php if($ResultSubMenu['Separ_Resig_AwaitAct_PendingClear']==1){echo '0';} else { echo '1';} ?>"><?php if($ResultSubMenu['Separ_Resig_AwaitAct_PendingClear']==1) { echo 'N';} else { echo 'Y';} ?></option>

			   </select>

		  </td><td>&nbsp;</td>

		    <td align="left" class="font2">&nbsp;Full & Final Settlement &nbsp;:&nbsp;</td>

		   <td><select name="FF_Settle">

			   <option value="<?php echo $ResultSubMenu['Separ_Resig_AwaitAct_FF_Settle']; ?>"><?php if($ResultSubMenu['Separ_Resig_AwaitAct_FF_Settle']==1) { echo 'Y';} else { echo 'N';} ?></option>

			   <option value="<?php if($ResultSubMenu['Separ_Resig_AwaitAct_FF_Settle']==1){echo '0';} else { echo '1';} ?>"><?php if($ResultSubMenu['Separ_Resig_AwaitAct_FF_Settle']==1) { echo 'N';} else { echo 'Y';} ?></option>

			   </select>

		  </td><td>&nbsp;</td>

		</tr>

		<tr>

		   <td align="left" class="font3">&nbsp;<b>&nbsp;&nbsp;</b></td>

		   <td align="left" class="font2">&nbsp;Termination &nbsp;:&nbsp;</td>

		   <td><select name="Termination">

			   <option value="<?php echo $ResultSubMenu['Separ_Termination']; ?>"><?php if($ResultSubMenu['Separ_Termination']==1) { echo 'Y';} else { echo 'N';} ?></option>

			   <option value="<?php if($ResultSubMenu['Separ_Termination']==1){echo '0';} else { echo '1';} ?>"><?php if($ResultSubMenu['Separ_Termination']==1) { echo 'N';} else { echo 'Y';} ?></option>

			   </select>

		  </td><td>&nbsp;</td>

		   <td align="left" class="font2">&nbsp;Absconding&nbsp;:&nbsp;</td>

		   <td><select name="Absconding">

			   <option value="<?php echo $ResultSubMenu['Separ_Absconding']; ?>"><?php if($ResultSubMenu['Separ_Absconding']==1) { echo 'Y';} else { echo 'N';} ?></option>

			   <option value="<?php if($ResultSubMenu['Separ_Absconding']==1){echo '0';} else { echo '1';} ?>"><?php if($ResultSubMenu['Separ_Absconding']==1) { echo 'N';} else { echo 'Y';} ?></option>

			   </select>

		  </td><td>&nbsp;<input type="hidden" name="Uid" value="<?php echo $Uid; ?>" /></td>

		</tr>

    </table>

					</td>

					</tr></table></td>

				   </tr>

		           <tr bgcolor="#C8C2E2"><td align="center">

				        <table border="0"><tr><td align="center"><input type="button" onClick="javascript:window.location='AdminRights.php?uuxiid=<?php echo $_REQUEST['uuxiid']; ?>'" value="Cancel" />&nbsp;&nbsp;<input type="submit" name="SubMenuSepar" id="SubMenuSepar" value="Save" /></td></tr></table>

				       </td>

				   </tr>

		        </table>

		    </form>		

  </td>		

<?php //****************************************************"URightSubReport.php"************************************************?>  

<td valign="middle" id="report" style="display:none;" width="100%">

		    <form name="SubMenuReportForm" method="post"> 

			      <table border="0">

			       <tr><td align="center"><table border="0" bgcolor=""><tr><td class="font4"><b><img src="images/Report.png" border="0" /></b></td></tr></table></td></tr>

				   <tr>

				    <td><table border="1"><tr>

				    <td>

	  <table border="0" bgcolor="#FFFFFF">

		<tr>

		   <td align="left" class="font3">&nbsp;<b>&nbsp;&nbsp;</b></td>

		   <td align="left" class="font2">&nbsp;CTC &nbsp;:&nbsp;</td>

		   <td><select name="CTC">

			   <option value="<?php echo $ResultSubMenu['Report_CTC']; ?>"><?php if($ResultSubMenu['Report_CTC']==1) { echo 'Y';} else { echo 'N';} ?></option>

			   <option value="<?php if($ResultSubMenu['Report_CTC']==1){echo '0';} else { echo '1';} ?>"><?php if($ResultSubMenu['Report_CTC']==1) { echo 'N';} else { echo 'Y';} ?></option>

			   </select>

		  </td><td>&nbsp;</td>

		   <td align="left" class="font2">&nbsp;Annual_Sal. Report &nbsp;:&nbsp;</td>

		   <td><select name="AnnualSalary_Report">

			   <option value="<?php echo $ResultSubMenu['Report_AnnualSalary_Report']; ?>"><?php if($ResultSubMenu['Report_AnnualSalary_Report']==1) { echo 'Y';} else { echo 'N';} ?></option>

			   <option value="<?php if($ResultSubMenu['Report_AnnualSalary_Report']==1){echo '0';} else { echo '1';} ?>"><?php if($ResultSubMenu['Report_AnnualSalary_Report']==1) { echo 'N';} else { echo 'Y';} ?></option>

			   </select>

		  </td><td>&nbsp;</td>

		</tr>

		<tr>

		   <td align="left" class="font3">&nbsp;<b>Employee Detail&nbsp;: -&nbsp;</b></td>

		   <td align="left" class="font2">&nbsp;General &nbsp;:&nbsp;</td>

		   <td><select name="General">

			   <option value="<?php echo $ResultSubMenu['Report_EmpDetail_General']; ?>"><?php if($ResultSubMenu['Report_EmpDetail_General']==1) { echo 'Y';} else { echo 'N';} ?></option>

			   <option value="<?php if($ResultSubMenu['Report_EmpDetail_General']==1){echo '0';} else { echo '1';} ?>"><?php if($ResultSubMenu['Report_EmpDetail_General']==1) { echo 'N';} else { echo 'Y';} ?></option>

			   </select>

		  </td><td>&nbsp;</td>

		   <td align="left" class="font2">&nbsp;Personal &nbsp;:&nbsp;</td>

		   <td><select name="Personal">

			   <option value="<?php echo $ResultSubMenu['Report_EmpDetail_Personal']; ?>"><?php if($ResultSubMenu['Report_EmpDetail_Personal']==1) { echo 'Y';} else { echo 'N';} ?></option>

			   <option value="<?php if($ResultSubMenu['Report_EmpDetail_Personal']==1){echo '0';} else { echo '1';} ?>"><?php if($ResultSubMenu['Report_EmpDetail_Personal']==1) { echo 'N';} else { echo 'Y';} ?></option>

			   </select>

		  </td><td>&nbsp;</td>

		    <td align="left" class="font2">&nbsp;Language Prof &nbsp;:&nbsp;</td>

		   <td><select name="LangProf">

			   <option value="<?php echo $ResultSubMenu['Report_EmpDetail_LangProf']; ?>"><?php if($ResultSubMenu['Report_EmpDetail_LangProf']==1) { echo 'Y';} else { echo 'N';} ?></option>

			   <option value="<?php if($ResultSubMenu['Report_EmpDetail_LangProf']==1){echo '0';} else { echo '1';} ?>"><?php if($ResultSubMenu['Report_EmpDetail_LangProf']==1) { echo 'N';} else { echo 'Y';} ?></option>

			   </select>

		  </td><td>&nbsp;</td>

		    <td align="left" class="font2">&nbsp;Qualification &nbsp;:&nbsp;</td>

		   <td><select name="Quali">

			   <option value="<?php echo $ResultSubMenu['Report_EmpDetail_Quali']; ?>"><?php if($ResultSubMenu['Report_EmpDetail_Quali']==1) { echo 'Y';} else { echo 'N';} ?></option>

			   <option value="<?php if($ResultSubMenu['Report_EmpDetail_Quali']==1){echo '0';} else { echo '1';} ?>"><?php if($ResultSubMenu['Report_EmpDetail_Quali']==1) { echo 'N';} else { echo 'Y';} ?></option>

			   </select>

		  </td><td>&nbsp;</td>

		    <td align="left" class="font2">&nbsp;Contact &nbsp;:&nbsp;</td>

		   <td><select name="Contact">

			   <option value="<?php echo $ResultSubMenu['Report_EmpDetail_Contact']; ?>"><?php if($ResultSubMenu['Report_EmpDetail_Contact']==1) { echo 'Y';} else { echo 'N';} ?></option>

			   <option value="<?php if($ResultSubMenu['Report_EmpDetail_Contact']==1){echo '0';} else { echo '1';} ?>"><?php if($ResultSubMenu['Report_EmpDetail_Contact']==1) { echo 'N';} else { echo 'Y';} ?></option>

			   </select>

		  </td><td>&nbsp;</td>

		  </tr>

		  <tr>

		   <td align="left" class="font3">&nbsp;<b>&nbsp;&nbsp;</b></td>

		    <td align="left" class="font2">&nbsp;History &nbsp;:&nbsp;</td>

		   <td><select name="History">

			   <option value="<?php echo $ResultSubMenu['Report_EmpDetail_History']; ?>"><?php if($ResultSubMenu['Report_EmpDetail_History']==1) { echo 'Y';} else { echo 'N';} ?></option>

			   <option value="<?php if($ResultSubMenu['Report_EmpDetail_History']==1){echo '0';} else { echo '1';} ?>"><?php if($ResultSubMenu['Report_EmpDetail_History']==1) { echo 'N';} else { echo 'Y';} ?></option>

			   </select>

		  </td><td>&nbsp;</td>

		    <td align="left" class="font2">&nbsp;Experiance &nbsp;:&nbsp;</td>

		   <td><select name="Exp">

			   <option value="<?php echo $ResultSubMenu['Report_EmpDetail_Exp']; ?>"><?php if($ResultSubMenu['Report_EmpDetail_Exp']==1) { echo 'Y';} else { echo 'N';} ?></option>

			   <option value="<?php if($ResultSubMenu['Report_EmpDetail_Exp']==1){echo '0';} else { echo '1';} ?>"><?php if($ResultSubMenu['Report_EmpDetail_Exp']==1) { echo 'N';} else { echo 'Y';} ?></option>

			   </select>

		  </td><td>&nbsp;</td>

		   <td align="left" class="font2">&nbsp;Family &nbsp;:&nbsp;</td>

		   <td><select name="Family">

			   <option value="<?php echo $ResultSubMenu['Report_EmpDetail_Family']; ?>"><?php if($ResultSubMenu['Report_EmpDetail_Family']==1) { echo 'Y';} else { echo 'N';} ?></option>

			   <option value="<?php if($ResultSubMenu['Report_EmpDetail_Family']==1){echo '0';} else { echo '1';} ?>"><?php if($ResultSubMenu['Report_EmpDetail_Family']==1) { echo 'N';} else { echo 'Y';} ?></option>

			   </select>

		  </td><td>&nbsp;</td>

		   <td align="left" class="font2">&nbsp;Eligibility &nbsp;:&nbsp;</td>

		   <td><select name="Elig">

			   <option value="<?php echo $ResultSubMenu['Report_EmpDetail_Elig']; ?>"><?php if($ResultSubMenu['Report_EmpDetail_Elig']==1) { echo 'Y';} else { echo 'N';} ?></option>

			   <option value="<?php if($ResultSubMenu['Report_EmpDetail_Elig']==1){echo '0';} else { echo '1';} ?>"><?php if($ResultSubMenu['Report_EmpDetail_Elig']==1) { echo 'N';} else { echo 'Y';} ?></option>

			   </select>

		  </td><td>&nbsp;</td>

		   <td align="left" class="font2">&nbsp;All &nbsp;:&nbsp;</td>

		   <td><select name="All">

			   <option value="<?php echo $ResultSubMenu['Report_EmpDetail_All']; ?>"><?php if($ResultSubMenu['Report_EmpDetail_All']==1) { echo 'Y';} else { echo 'N';} ?></option>

			   <option value="<?php if($ResultSubMenu['Report_EmpDetail_All']==1){echo '0';} else { echo '1';} ?>"><?php if($ResultSubMenu['Report_EmpDetail_All']==1) { echo 'N';} else { echo 'Y';} ?></option>

			   </select>

		  </td><td>&nbsp;</td>

		</tr>

		 <tr>

		   <td align="left" class="font3">&nbsp;<b>Attendance Leave&nbsp;: -&nbsp;</b></td>

		    <td align="left" class="font2">&nbsp;Monthly Attendance &nbsp;:&nbsp;</td>

		   <td><select name="MonthlyAtt">

			   <option value="<?php echo $ResultSubMenu['Report_AttLeave_MonthlyAtt']; ?>"><?php if($ResultSubMenu['Report_AttLeave_MonthlyAtt']==1) { echo 'Y';} else { echo 'N';} ?></option>

			   <option value="<?php if($ResultSubMenu['Report_AttLeave_MonthlyAtt']==1){echo '0';} else { echo '1';} ?>"><?php if($ResultSubMenu['Report_AttLeave_MonthlyAtt']==1) { echo 'N';} else { echo 'Y';} ?></option>

			   </select>

		  </td><td>&nbsp;</td>

		   <td align="left" class="font2">&nbsp;Yearly Attendance &nbsp;:&nbsp;</td>

		   <td><select name="YearlyAtt">

			   <option value="<?php echo $ResultSubMenu['Report_AttLeave_YearlyAtt']; ?>"><?php if($ResultSubMenu['Report_AttLeave_YearlyAtt']==1) { echo 'Y';} else { echo 'N';} ?></option>

			   <option value="<?php if($ResultSubMenu['Report_AttLeave_YearlyAtt']==1){echo '0';} else { echo '1';} ?>"><?php if($ResultSubMenu['Report_AttLeave_YearlyAtt']==1) { echo 'N';} else { echo 'Y';} ?></option>

			   </select>

		  </td><td>&nbsp;</td>

		   <td align="left" class="font2">&nbsp;Leave &nbsp;:&nbsp;</td>

		   <td><select name="Leave">

			   <option value="<?php echo $ResultSubMenu['Report_AttLeave_Leave']; ?>"><?php if($ResultSubMenu['Report_AttLeave_Leave']==1) { echo 'Y';} else { echo 'N';} ?></option>

			   <option value="<?php if($ResultSubMenu['Report_AttLeave_Leave']==1){echo '0';} else { echo '1';} ?>"><?php if($ResultSubMenu['Report_AttLeave_Leave']==1) { echo 'N';} else { echo 'Y';} ?></option>

			   </select>

		  </td><td>&nbsp;</td>

		</tr>

		 <tr>

		   <td align="left" class="font3">&nbsp;<b>PF&nbsp;: -&nbsp;</b></td>

		    <td align="left" class="font2">&nbsp;Form3A &nbsp;:&nbsp;</td>

		   <td><select name="Form3A">

			   <option value="<?php echo $ResultSubMenu['Report_PF_Form3A']; ?>"><?php if($ResultSubMenu['Report_PF_Form3A']==1) { echo 'Y';} else { echo 'N';} ?></option>

			   <option value="<?php if($ResultSubMenu['Report_PF_Form3A']==1){echo '0';} else { echo '1';} ?>"><?php if($ResultSubMenu['Report_PF_Form3A']==1) { echo 'N';} else { echo 'Y';} ?></option>

			   </select>

		  </td><td>&nbsp;</td>

		   <td align="left" class="font2">&nbsp;Form6A &nbsp;:&nbsp;</td>

		   <td><select name="Form6A">

			   <option value="<?php echo $ResultSubMenu['Report_PF_Form6A']; ?>"><?php if($ResultSubMenu['Report_PF_Form6A']==1) { echo 'Y';} else { echo 'N';} ?></option>

			   <option value="<?php if($ResultSubMenu['Report_PF_Form6A']==1){echo '0';} else { echo '1';} ?>"><?php if($ResultSubMenu['Report_PF_Form6A']==1) { echo 'N';} else { echo 'Y';} ?></option>

			   </select>

		  </td><td>&nbsp;</td>

		   <td align="left" class="font2">&nbsp;Form12A &nbsp;:&nbsp;</td>

		   <td><select name="Form12A">

			   <option value="<?php echo $ResultSubMenu['Report_PF_Form12A']; ?>"><?php if($ResultSubMenu['Report_PF_Form12A']==1) { echo 'Y';} else { echo 'N';} ?></option>

			   <option value="<?php if($ResultSubMenu['Report_PF_Form12A']==1){echo '0';} else { echo '1';} ?>"><?php if($ResultSubMenu['Report_PF_Form12A']==1) { echo 'N';} else { echo 'Y';} ?></option>

			   </select>

		  </td><td>&nbsp;</td>

		</tr>

		 <tr>

		   <td align="left" class="font3">&nbsp;<b>Mandatory&nbsp;: -&nbsp;</b></td>

		    <td align="left" class="font2">&nbsp;Department &nbsp;:&nbsp;</td>

		   <td><select name="Dept">

			   <option value="<?php echo $ResultSubMenu['Report_Mand_Dept']; ?>"><?php if($ResultSubMenu['Report_Mand_Dept']==1) { echo 'Y';} else { echo 'N';} ?></option>

			   <option value="<?php if($ResultSubMenu['Report_Mand_Dept']==1){echo '0';} else { echo '1';} ?>"><?php if($ResultSubMenu['Report_Mand_Dept']==1) { echo 'N';} else { echo 'Y';} ?></option>

			   </select>

		  </td><td>&nbsp;</td>

		   <td align="left" class="font2">&nbsp;Head Quater &nbsp;:&nbsp;</td>

		   <td><select name="HQ">

			   <option value="<?php echo $ResultSubMenu['Report_Mand_HQ']; ?>"><?php if($ResultSubMenu['Report_Mand_HQ']==1) { echo 'Y';} else { echo 'N';} ?></option>

			   <option value="<?php if($ResultSubMenu['Report_Mand_HQ']==1){echo '0';} else { echo '1';} ?>"><?php if($ResultSubMenu['Report_Mand_HQ']==1) { echo 'N';} else { echo 'Y';} ?></option>

			   </select>

		  </td><td>&nbsp;</td>

		   <td align="left" class="font2">&nbsp;Grade &nbsp;:&nbsp;</td>

		   <td><select name="Grade">

			   <option value="<?php echo $ResultSubMenu['Report_Mand_Grade']; ?>"><?php if($ResultSubMenu['Report_Mand_Grade']==1) { echo 'Y';} else { echo 'N';} ?></option>

			   <option value="<?php if($ResultSubMenu['Report_Mand_Grade']==1){echo '0';} else { echo '1';} ?>"><?php if($ResultSubMenu['Report_Mand_Grade']==1) { echo 'N';} else { echo 'Y';} ?></option>

			   </select>

		  </td><td>&nbsp;</td>

		   <td align="left" class="font2">&nbsp;Designation &nbsp;:&nbsp;</td>

		   <td><select name="Desig">

			   <option value="<?php echo $ResultSubMenu['Report_Mand_Desig']; ?>"><?php if($ResultSubMenu['Report_Mand_Desig']==1) { echo 'Y';} else { echo 'N';} ?></option>

			   <option value="<?php if($ResultSubMenu['Report_Mand_Desig']==1){echo '0';} else { echo '1';} ?>"><?php if($ResultSubMenu['Report_Mand_Desig']==1) { echo 'N';} else { echo 'Y';} ?></option>

			   </select>

		  </td><td>&nbsp;</td>

		   <td align="left" class="font2">&nbsp;City Classification &nbsp;:&nbsp;</td>

		   <td><select name="CityClass">

			   <option value="<?php echo $ResultSubMenu['Report_Mand_CityClass']; ?>"><?php if($ResultSubMenu['Report_Mand_CityClass']==1) { echo 'Y';} else { echo 'N';} ?></option>

			   <option value="<?php if($ResultSubMenu['Report_Mand_CityClass']==1){echo '0';} else { echo '1';} ?>"><?php if($ResultSubMenu['Report_Mand_CityClass']==1) { echo 'N';} else { echo 'Y';} ?></option>

			   </select>

		  </td><td>&nbsp;</td>

		   <td align="left" class="font2">&nbsp;Cost Center &nbsp;:&nbsp;</td>

		   <td><select name="CostCenter">

			   <option value="<?php echo $ResultSubMenu['Report_Mand_CostCenter']; ?>"><?php if($ResultSubMenu['Report_Mand_CostCenter']==1) { echo 'Y';} else { echo 'N';} ?></option>

			   <option value="<?php if($ResultSubMenu['Report_Mand_CostCenter']==1){echo '0';} else { echo '1';} ?>"><?php if($ResultSubMenu['Report_Mand_CostCenter']==1) { echo 'N';} else { echo 'Y';} ?></option>

			   </select>

		  </td><td>&nbsp;</td>

		</tr>

		 <tr>

		   <td align="left" class="font3">&nbsp;<b>Micellaneous&nbsp;: -&nbsp;</b></td>

		    <td align="left" class="font2">&nbsp;Category &nbsp;:&nbsp;</td>

		   <td><select name="Category">

			   <option value="<?php echo $ResultSubMenu['Report_Mice_Category']; ?>"><?php if($ResultSubMenu['Report_Mice_Category']==1) { echo 'Y';} else { echo 'N';} ?></option>

			   <option value="<?php if($ResultSubMenu['Report_Mice_Category']==1){echo '0';} else { echo '1';} ?>"><?php if($ResultSubMenu['Report_Mice_Category']==1) { echo 'N';} else { echo 'Y';} ?></option>

			   </select>

		  </td><td>&nbsp;</td>

		   <td align="left" class="font2">&nbsp;Section &nbsp;:&nbsp;</td>

		   <td><select name="Section">

			   <option value="<?php echo $ResultSubMenu['Report_Mice_Section']; ?>"><?php if($ResultSubMenu['Report_Mice_Section']==1) { echo 'Y';} else { echo 'N';} ?></option>

			   <option value="<?php if($ResultSubMenu['Report_Mice_Section']==1){echo '0';} else { echo '1';} ?>"><?php if($ResultSubMenu['Report_Mice_Section']==1) { echo 'N';} else { echo 'Y';} ?></option>

			   </select>

		  </td><td>&nbsp;</td>

		 </tr>

		  <tr>

		   <td align="left" class="font3">&nbsp;<b>&nbsp;&nbsp;</b></td>

		    <td align="left" class="font2">&nbsp;Bonus &nbsp;:&nbsp;</td>

		   <td><select name="Bonus">

			   <option value="<?php echo $ResultSubMenu['Report_Bonus']; ?>"><?php if($ResultSubMenu['Report_Bonus']==1) { echo 'Y';} else { echo 'N';} ?></option>

			   <option value="<?php if($ResultSubMenu['Report_Bonus']==1){echo '0';} else { echo '1';} ?>"><?php if($ResultSubMenu['Report_Bonus']==1) { echo 'N';} else { echo 'Y';} ?></option>

			   </select>

		  </td><td>&nbsp;</td>

		  <td align="left" class="font2">&nbsp;Arrears &nbsp;:&nbsp;</td>

		   <td><select name="Arrears">

			   <option value="<?php echo $ResultSubMenu['Report_Arrears']; ?>"><?php if($ResultSubMenu['Report_Arrears']==1) { echo 'Y';} else { echo 'N';} ?></option>

			   <option value="<?php if($ResultSubMenu['Report_Arrears']==1){echo '0';} else { echo '1';} ?>"><?php if($ResultSubMenu['Report_Arrears']==1) { echo 'N';} else { echo 'Y';} ?></option>

			   </select>

		  </td><td>&nbsp;</td>

		  <td align="left" class="font2">&nbsp;Statutory Payment &nbsp;:&nbsp;</td>

		   <td><select name="StatutoryPayment">

			   <option value="<?php echo $ResultSubMenu['Report_StatutoryPayment']; ?>"><?php if($ResultSubMenu['Report_StatutoryPayment']==1) { echo 'Y';} else { echo 'N';} ?></option>

			   <option value="<?php if($ResultSubMenu['Report_StatutoryPayment']==1){echo '0';} else { echo '1';} ?>"><?php if($ResultSubMenu['Report_StatutoryPayment']==1) { echo 'N';} else { echo 'Y';} ?></option>

			   </select>

		  </td><td>&nbsp;</td>

		  <td align="left" class="font2">&nbsp;Full & Final &nbsp;:&nbsp;</td>

		   <td><select name="FullFinal">

			   <option value="<?php echo $ResultSubMenu['Report_FullFinal']; ?>"><?php if($ResultSubMenu['Report_FullFinal']==1) { echo 'Y';} else { echo 'N';} ?></option>

			   <option value="<?php if($ResultSubMenu['Report_FullFinal']==1){echo '0';} else { echo '1';} ?>"><?php if($ResultSubMenu['Report_FullFinal']==1) { echo 'N';} else { echo 'Y';} ?></option>

			   </select>

		  </td><td>&nbsp;<input type="hidden" name="Uid" value="<?php echo $Uid; ?>" /></td>

		 </tr>

    </table>

					</td>

					</tr></table></td>

				   </tr>

		           <tr bgcolor="#C8C2E2"><td align="center">

				        <table border="0"><tr><td align="center"><input type="button" onClick="javascript:window.location='AdminRights.php?uuxiid=<?php echo $_REQUEST['uuxiid']; ?>'" value="Cancel" />&nbsp;&nbsp;<input type="submit" name="SubMenuReport" id="SubMenuReport" value="Save" /></td></tr></table>

				       </td>

				   </tr>

		        </table>

		    </form>		  

  </td>		 

<?php //****************************************************"URightSubTDS.php"************************************************?>  

 <td valign="middle" id="tds" style="display:none;" width="100%">

		    <form name="SubMenuTDSForm" method="post"> 

			     <table border="0">

			       <tr><td align="center"><table border="0" bgcolor=""><tr><td class="font4"><b><img src="images/tds.png" border="0" /></b></td></tr></table></td></tr>

				   <tr>

				    <td><table border="1"><tr>

				    <td>

	  <table border="0" bgcolor="#FFFFFF">

				<tr>

		   <td align="left" class="font3">&nbsp;<b>&nbsp;&nbsp;</b></td>

		   <td align="left" class="font2">&nbsp;aa&nbsp;:&nbsp;</td>

		   <td><select name="aa">

			   <option value="<?php echo $ResultSubMenu['TDS_aa']; ?>"><?php if($ResultSubMenu['TDS_aa']==1) { echo 'Y';} else { echo 'N';} ?></option>

			   <option value="<?php if($ResultSubMenu['TDS_aa']==1){echo '0';} else { echo '1';} ?>"><?php if($ResultSubMenu['TDS_aa']==1) { echo 'N';} else { echo 'Y';} ?></option>

			   </select>

		  </td><td>&nbsp;</td>

		   <td align="left" class="font2">&nbsp;bb&nbsp;:&nbsp;</td>

		   <td><select name="bb">

			   <option value="<?php echo $ResultSubMenu['TDS_bb']; ?>"><?php if($ResultSubMenu['TDS_bb']==1) { echo 'Y';} else { echo 'N';} ?></option>

			   <option value="<?php if($ResultSubMenu['TDS_bb']==1){echo '0';} else { echo '1';} ?>"><?php if($ResultSubMenu['TDS_bb']==1) { echo 'N';} else { echo 'Y';} ?></option>

			   </select>

		  </td><td>&nbsp;</td>

		   <td align="left" class="font2">&nbsp;cc&nbsp;:&nbsp;</td>

		   <td><select name="cc">

			   <option value="<?php echo $ResultSubMenu['TDS_cc']; ?>"><?php if($ResultSubMenu['TDS_cc']==1) { echo 'Y';} else { echo 'N';} ?></option>

			   <option value="<?php if($ResultSubMenu['TDS_cc']==1){echo '0';} else { echo '1';} ?>"><?php if($ResultSubMenu['TDS_cc']==1) { echo 'N';} else { echo 'Y';} ?></option>

			   </select>

		  </td><td>&nbsp;</td>

		   <td align="left" class="font2">&nbsp;dd&nbsp;:&nbsp;</td>

		   <td><select name="dd">

			   <option value="<?php echo $ResultSubMenu['TDS_dd']; ?>"><?php if($ResultSubMenu['TDS_dd']==1) { echo 'Y';} else { echo 'N';} ?></option>

			   <option value="<?php if($ResultSubMenu['TDS_dd']==1){echo '0';} else { echo '1';} ?>"><?php if($ResultSubMenu['TDS_dd']==1) { echo 'N';} else { echo 'Y';} ?></option>

			   </select>

		  </td><td>&nbsp;</td>

		   <td align="left" class="font2">&nbsp;ee&nbsp;:&nbsp;</td>

		   <td><select name="ee">

			   <option value="<?php echo $ResultSubMenu['TDS_ee']; ?>"><?php if($ResultSubMenu['TDS_ee']==1) { echo 'Y';} else { echo 'N';} ?></option>

			   <option value="<?php if($ResultSubMenu['TDS_ee']==1){echo '0';} else { echo '1';} ?>"><?php if($ResultSubMenu['TDS_ee']==1) { echo 'N';} else { echo 'Y';} ?></option>

			   </select>

		  </td><td>&nbsp;<input type="hidden" name="Uid" value="<?php echo $Uid; ?>" /></td>

		</tr>

    </table>

					</td>

					</tr></table></td>

				   </tr>

		           <tr bgcolor="#C8C2E2"><td align="center">

				        <table border="0"><tr><td align="center"><input type="button" onClick="javascript:window.location='AdminRights.php?uuxiid=<?php echo $_REQUEST['uuxiid']; ?>'" value="Cancel" />&nbsp;&nbsp;<input type="submit" name="SubMenuTDS" id="SubMenuTDS" value="Save" /></td></tr></table>

				       </td>

				   </tr>

		        </table>

		    </form>		  

  </td>		 

 

  	      </tr>

	    <?php } //----------------------------------------------------------------------------------------SubMenu Close---------------------- ?>

		 </table>

	   </td>

	</tr>  

</table>

 <?php } ?>	 		

<?php //************************************************************************************************************************************************************?>

<?php //**********************************************END*****END*****END******END******END***************************************************************?>

<?php //************************************************************************************************************************************************************?>

		

	  </td>

	</tr>

	

	<tr>

	  <td valign="bottom" align="center">

	    <table border="0" style="margin-top:100px;"><tr><td align="center" ><img src="images/home1.png"></td></tr></table>

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

