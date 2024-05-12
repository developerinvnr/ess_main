<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}
if(isset($_POST['SaveEdit']))
{
     if($_POST['AccessName']=='emp')
	 {
	  if($_POST['AppraisalForm']=='Y'){$AppForm='Y'; $MidAppForm='N'; $KraForm='N'; }
	  elseif($_POST['MidPmsForm']=='Y'){$AppForm='N'; $MidAppForm='Y'; $KraForm='N'; }
	  elseif($_POST['KRAForm']=='Y'){$AppForm='N'; $MidAppForm='N'; $KraForm='Y'; }
	 }
	 else{ $AppForm=$_POST['AppraisalForm']; $MidAppForm=$_POST['MidPmsForm']; $KraForm=$_POST['KRAForm']; }
	 
	 $SqlUpdate = mysql_query("UPDATE hrm_pms_key SET EmpMsg='".$_POST['EmpMsg']."', PersonalDetails='".$_POST['PersonalDetails']."', Schedule='".$_POST['Schedule']."', AppraisalForm='".$AppForm."', MidPmsForm='".$MidAppForm."', Help_Faq='".$_POST['Help_Faq']."', View_Print='".$_POST['View_Print']."', KRAForm='".$KraForm."', Home='".$_POST['Home']."', MyTeam='".$_POST['MyTeam']."', TeamStatus='".$_POST['TeamStatus']."', Score='".$_POST['Score']."', Promotion='".$_POST['Promotion']."', Increment='".$_POST['Increment']."', MyPmsReport='".$_POST['MyPmsReport']."', IncrementReport='".$_POST['IncrementReport']."', RatingGraph='".$_POST['RatingGraph']."', FKraForm='".$_POST['FKraForm']."', FPmsForm='".$_POST['FPmsForm']."', FHistoryForm='".$_POST['FHistoryForm']."' WHERE CompanyId=".$CompanyId." AND PmsMId=".$_POST['EditId'], $con) or die(mysql_error());
     if($SqlUpdate){ $msg = "Data has been Updeted successfully...";}   
}
?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style> .font { color:#ffffff; font-family:Georgia; font-size:11px; width:120px;} .font1 { font-family:"Times New Roman", Times, serif; font-size:11px; width:120px; } .font2 { font-size:11px;width:260px;height:18px;} .font4 {color:#1FAD34; font-family:Georgia; font-size:15px;}.span {display:none; font-family:Courier New; font-size:14px; }.span1 {display:block; font-family:Courier New; font-size:14px; }.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;}.SaveButton {background-image:url(images/save.gif); width:20px; height:20px; background-repeat:no-repeat; background-color:#FFFFFF; border-color:#FFFFFF; border-bottom:inherit;}.TextInput { font-family:"Times New Roman", Times, serif; font-size:11px; width:100px; height:18px;}
.tr1{color:#ffffff;font-family:Georgia;font-size:11px;width:60px;text-align:center;vertical-align:top;}
.tr2{color:#000000;font-family:Times New Roman, Times, serif;font-size:11px;width:60px;text-align:center;}
.tr3{font-family:Times New Roman, Times, serif;font-size:11px;width:55px;height:20px;}
</style>
<Script type="text/javascript">window.history.forward(1);
function edit(value){ var agree=confirm("Are you sure you want to edit this record?");
if (agree) { var x = "PmsOpenClose.php?action=edit&eid="+value;  window.location=x;}}
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
    <tr><td valign="top"><?php if($_SESSION['login'] = true){ require_once("AWelcome.php"); } ?></td></tr>
	<tr>
	  <td valign="top" align="center"  width="100%" id="MainWindow"><br>
<?php //**********************************************************************?>
<?php //*************************START*****START*****START******START******START*******************************?>
<?php //**********************************************************************************************?>
<table border="0" style="margin-top:0px; width:100%; height:300px;">
 <tr>
  <td align="left" height="20" valign="top" colspan="3">
   <table border="0">
    <tr>
	  <td align="right" class="heading">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pms/ KRA/ MidTerm-Pms Allow</td>
	  <td align="left"><b><span id="Vtype" class="span">: -&nbsp;Pms Allow</span></b></td>
	  <td class="font4" style="left">&nbsp;&nbsp;&nbsp;<b><?php echo $msg; ?></b></td>
	</tr>
   </table>
  </td>
 </tr>
<?php if($_SESSION['UserType']=='S' AND $_SESSION['login'] = true) { ?>	
 <tr>
 <td style="width:1px;" valign="top" align="center">&nbsp;</td>
 <td width="1">&nbsp;</td>
<?php //*********************************************** Open Menu PMS ******************** ?> 
<td align="left" id="type" valign="top" style="display:block; width:100%">             
   <table border="0" width="1150">
	<tr>
	  <td align="left" width="1150">
	     <table border="1" width="1150" border="1" bgcolor="#FFFFFF">
		 <tr bgcolor="#7a6189">
		   <td class="tr1" style="width:30px;"><b>SNo</b></td>
		   <td class="tr1" style="width:80px;"><b>Person</b></td>
		   <td class="tr1"><b>Emp PopUp Msg</b></td>
		   <td class="tr1"><b>Details</b></td>
		   <td class="tr1"><b>Sche - dule</b></td>
		   <td class="tr1"><b>Help Faq</b></td>
		   <td class="tr1"><b>View Print Form</b></td>
		   <td class="tr1"><b>PMS Form</b></td>
		   <td class="tr1"><b>Mid Year PMS Form</b></td>
		   <td class="tr1"><b>KRA Form</b></td>
		   <td class="tr1"><b>Home</b></td>
		   <td class="tr1"><b>My Team</b></td>
		   <td class="tr1"><b>My Team Status</b></td>
		   <td class="tr1"><b>Score</b></td>
		   <td class="tr1"><b>Promo - tion</b></td>
		   <td class="tr1"><b>Incre - ment</b></td>
		   <td class="tr1"><b>My PMS Report</b></td>
		   <td class="tr1"><b>Incre - ment Report</b></td>
		   <td class="tr1"><b>Rating Graph</b></td>
		   <td rowspan="5" style="font-family:Georgia;font-size:11px;width:50px;text-align:center;vertical-align:middle; background-color:#FFFF95;"><b>View Form</b></td>
		   <td style="font-family:Georgia;font-size:11px;width:50px;text-align:center;vertical-align:top;background-color:#FFFF95;"><b>KRA Form</b></td>
		   <td style="font-family:Georgia;font-size:11px;width:50px;text-align:center;vertical-align:top;background-color:#FFFF95;"><b>PMS Form</b></td>
		   <td style="font-family:Georgia;font-size:11px;width:50px;text-align:center;vertical-align:top;background-color:#FFFF95;"><b>History</b></td>
		   <td class="tr1"><b>Action</b></td>
		 </tr>
<?php $sqlPmsKey=mysql_query("select * from hrm_pms_key where CompanyId=".$CompanyId." order by PmsMId ASC", $con); $SNo=1; while($resPmsKey=mysql_fetch_array($sqlPmsKey)){
      if(isset($_REQUEST['action']) && $_REQUEST['action']=="edit" && $_REQUEST['eid']==$resPmsKey['PmsMId']){ ?>
	      <form name="formEdit" method="post" onSubmit="return validateEdit(this)">		  
          <tr>
		   <td align="center" style="font:Georgia;font-size:11px;"><?php echo $SNo; ?></td>
		   <td style="color:#000000;font-family:Times New Roman, Times, serif;font-size:11px;background-color:<?php if($resPmsKey['Person']=='emp') echo '#FFFFC4'; elseif($resPmsKey['Person']=='app')echo '#6CB6FF'; elseif($resPmsKey['Person']=='rev')echo '#D5FFD5'; elseif($resPmsKey['Person']=='hod')echo '#FFD5D5';?>;">&nbsp;<?php if($resPmsKey['Person']=='emp')echo 'Employee'; elseif($resPmsKey['Person']=='app')echo 'Appraiser'; elseif($resPmsKey['Person']=='rev')echo 'Reviewer'; elseif($resPmsKey['Person']=='hod')echo 'HOD';?><input type="hidden" name="EditId" id="EditId" value="<?php echo $_REQUEST['eid']; ?>"/><input type="hidden" id="AccessName" name="AccessName" value="<?php echo $resPmsKey['Person']; ?>" /></td>

		   <td><?php if($resPmsKey['Person']=='emp'){ ?><select name="EmpMsg" id="EmpMsg" class="tr3" style="background-color:<?php if($resPmsKey['Person']=='emp') echo '#FFFFC4';?>;"><option value="<?php echo $resPmsKey['EmpMsg']; ?>"><?php if($resPmsKey['EmpMsg']=='Y')echo 'YES'; else echo 'NO'; ?></option><option value="<?php if($resPmsKey['EmpMsg']=='Y') echo 'N'; else echo 'Y'; ?>"><?php if($resPmsKey['EmpMsg']=='Y')echo 'NO'; else echo 'YES'; ?></option></select><?php }else{ echo '<input type="hidden" name="EmpMsg" id="EmpMsg" value="N" />';}?></td>

 		   <td><?php if($resPmsKey['Person']=='emp'){ ?><select name="PersonalDetails" id="PersonalDetails" class="tr3" style="background-color:<?php if($resPmsKey['Person']=='emp') echo '#FFFFC4';?>;"><option value="<?php echo $resPmsKey['PersonalDetails']; ?>"><?php if($resPmsKey['PersonalDetails']=='Y')echo 'YES'; else echo 'NO'; ?></option><option value="<?php if($resPmsKey['PersonalDetails']=='Y') echo 'N'; else echo 'Y'; ?>"><?php if($resPmsKey['PersonalDetails']=='Y')echo 'NO'; else echo 'YES'; ?></option></select><?php }else{ echo '<input type="hidden" name="PersonalDetails" id="PersonalDetails" value="N" />';}?></td>		

           <td><?php if($resPmsKey['Person']=='emp'){ ?><select name="Schedule" id="Schedule" class="tr3" style="background-color:<?php if($resPmsKey['Person']=='emp') echo '#FFFFC4';?>;"><option value="<?php echo $resPmsKey['Schedule']; ?>"><?php if($resPmsKey['Schedule']=='Y')echo 'YES'; else echo 'NO'; ?></option><option value="<?php if($resPmsKey['Schedule']=='Y') echo 'N'; else echo 'Y'; ?>"><?php if($resPmsKey['Schedule']=='Y')echo 'NO'; else echo 'YES'; ?></option></select><?php }else{ echo '<input type="hidden" name="Schedule" id="Schedule" value="N" />';}?></td>

          <td><?php if($resPmsKey['Person']=='emp'){ ?><select name="Help_Faq" id="Help_Faq" class="tr3" style="background-color:<?php if($resPmsKey['Person']=='emp') echo '#FFFFC4';?>;"><option value="<?php echo $resPmsKey['Help_Faq']; ?>"><?php if($resPmsKey['Help_Faq']=='Y')echo 'YES'; else echo 'NO'; ?></option><option value="<?php if($resPmsKey['Help_Faq']=='Y') echo 'N'; else echo 'Y'; ?>"><?php if($resPmsKey['Help_Faq']=='Y')echo 'NO'; else echo 'YES'; ?></option></select><?php }else{ echo '<input type="hidden" name="Help_Faq" id="Help_Faq" value="N" />';}?></td>

          <td><?php if($resPmsKey['Person']=='emp'){ ?><select name="View_Print" id="View_Print" class="tr3" style="background-color:<?php if($resPmsKey['Person']=='emp') echo '#FFFFC4';?>;"><option value="<?php echo $resPmsKey['View_Print']; ?>"><?php if($resPmsKey['View_Print']=='Y')echo 'YES'; else echo 'NO'; ?></option><option value="<?php if($resPmsKey['View_Print']=='Y') echo 'N'; else echo 'Y'; ?>"><?php if($resPmsKey['View_Print']=='Y')echo 'NO'; else echo 'YES'; ?></option></select><?php }else{ echo '<input type="hidden" name="View_Print" id="View_Print" value="N" />';}?></td>
		  
		  <td><?php if($resPmsKey['Person']=='emp'){ ?><select name="AppraisalForm" id="AppraisalForm" class="tr3" style="font-family:Times New Roman, Times, serif;background-color:<?php if($resPmsKey['Person']=='emp') echo '#FFFFC4';?>;"><option value="<?php echo $resPmsKey['AppraisalForm']; ?>"><?php if($resPmsKey['AppraisalForm']=='Y')echo 'YES'; else echo 'NO'; ?></option><option value="<?php if($resPmsKey['AppraisalForm']=='Y') echo 'N'; else echo 'Y'; ?>"><?php if($resPmsKey['AppraisalForm']=='Y')echo 'NO'; else echo 'YES'; ?></option></select><?php }else{ echo '<input type="hidden" name="AppraisalForm" id="AppraisalForm" value="N" />';}?></td>
		  
		  <td><?php if($resPmsKey['Person']=='emp'){ ?><select name="MidPmsForm" id="MidPmsForm" class="tr3" style="font-family:Times New Roman, Times, serif;background-color:<?php if($resPmsKey['Person']=='emp') echo '#FFFFC4';?>;"><option value="<?php echo $resPmsKey['MidPmsForm']; ?>"><?php if($resPmsKey['MidPmsForm']=='Y')echo 'YES'; else echo 'NO'; ?></option><option value="<?php if($resPmsKey['MidPmsForm']=='Y') echo 'N'; else echo 'Y'; ?>"><?php if($resPmsKey['MidPmsForm']=='Y')echo 'NO'; else echo 'YES'; ?></option></select><?php }else{ echo '<input type="hidden" name="MidPmsForm" id="MidPmsForm" value="N" />';}?></td>

          <td><select name="KRAForm" id="KRAForm" class="tr3" style="background-color:<?php if($resPmsKey['Person']=='emp') echo '#FFFFC4'; elseif($resPmsKey['Person']=='app')echo '#6CB6FF'; elseif($resPmsKey['Person']=='rev')echo '#D5FFD5'; elseif($resPmsKey['Person']=='hod')echo '#FFD5D5';?>;"><option value="<?php echo $resPmsKey['KRAForm']; ?>"><?php if($resPmsKey['KRAForm']=='Y')echo 'YES'; else echo 'NO'; ?></option><option value="<?php if($resPmsKey['KRAForm']=='Y') echo 'N'; else echo 'Y'; ?>"><?php if($resPmsKey['KRAForm']=='Y')echo 'NO'; else echo 'YES'; ?></option></select></td>

          <td><?php if($resPmsKey['Person']=='app' OR $resPmsKey['Person']=='rev' OR $resPmsKey['Person']=='hod'){ ?><select name="Home" id="Home" class="tr3" style="background-color:<?php if($resPmsKey['Person']=='app')echo '#6CB6FF'; elseif($resPmsKey['Person']=='rev')echo '#D5FFD5'; elseif($resPmsKey['Person']=='hod')echo '#FFD5D5';?>;"><option value="<?php echo $resPmsKey['Home']; ?>"><?php if($resPmsKey['Home']=='Y')echo 'YES'; else echo 'NO'; ?></option><option value="<?php if($resPmsKey['Home']=='Y') echo 'N'; else echo 'Y'; ?>"><?php if($resPmsKey['Home']=='Y')echo 'NO'; else echo 'YES'; ?></option></select><?php }else{ echo '<input type="hidden" name="Home" id="Home" value="N" />';}?></td>

          <td><?php if($resPmsKey['Person']=='app' OR $resPmsKey['Person']=='rev'){ ?><select name="MyTeam" id="MyTeam" class="tr3" style="background-color:<?php if($resPmsKey['Person']=='app')echo '#6CB6FF'; elseif($resPmsKey['Person']=='rev')echo '#D5FFD5';?>;"><option value="<?php echo $resPmsKey['MyTeam']; ?>"><?php if($resPmsKey['MyTeam']=='Y')echo 'YES'; else echo 'NO'; ?></option><option value="<?php if($resPmsKey['MyTeam']=='Y') echo 'N'; else echo 'Y'; ?>"><?php if($resPmsKey['MyTeam']=='Y')echo 'NO'; else echo 'YES'; ?></option></select><?php }else{ echo '<input type="hidden" name="MyTeam" id="MyTeam" value="N" />';}?></td>

          <td><?php if($resPmsKey['Person']=='app' OR $resPmsKey['Person']=='rev' OR $resPmsKey['Person']=='hod'){ ?><select name="TeamStatus" id="TeamStatus" class="tr3" style="background-color:<?php if($resPmsKey['Person']=='app')echo '#6CB6FF'; elseif($resPmsKey['Person']=='rev')echo '#D5FFD5'; elseif($resPmsKey['Person']=='hod')echo '#FFD5D5';?>;"><option value="<?php echo $resPmsKey['TeamStatus']; ?>"><?php if($resPmsKey['TeamStatus']=='Y')echo 'YES'; else echo 'NO'; ?></option><option value="<?php if($resPmsKey['TeamStatus']=='Y') echo 'N'; else echo 'Y'; ?>"><?php if($resPmsKey['TeamStatus']=='Y')echo 'NO'; else echo 'YES'; ?></option></select><?php }else{ echo '<input type="hidden" name="TeamStatus" id="TeamStatus" value="N" />';}?></td>

          <td><?php if($resPmsKey['Person']=='hod'){ ?><select name="Score" id="Score" class="tr3" style="background-color:<?php if($resPmsKey['Person']=='hod')echo '#FFD5D5';?>;"><option value="<?php echo $resPmsKey['Score']; ?>"><?php if($resPmsKey['Score']=='Y')echo 'YES'; else echo 'NO'; ?></option><option value="<?php if($resPmsKey['Score']=='Y') echo 'N'; else echo 'Y'; ?>"><?php if($resPmsKey['Score']=='Y')echo 'NO'; else echo 'YES'; ?></option></select><?php }else{ echo '<input type="hidden" name="Score" id="Score" value="N" />';}?></td>

          <td><?php if($resPmsKey['Person']=='hod'){ ?><select name="Promotion" id="Promotion" class="tr3" style="background-color:<?php if($resPmsKey['Person']=='hod')echo '#FFD5D5';?>;"><option value="<?php echo $resPmsKey['Promotion']; ?>"><?php if($resPmsKey['Promotion']=='Y')echo 'YES'; else echo 'NO'; ?></option><option value="<?php if($resPmsKey['Promotion']=='Y') echo 'N'; else echo 'Y'; ?>"><?php if($resPmsKey['Promotion']=='Y')echo 'NO'; else echo 'YES'; ?></option></select><?php }else{ echo '<input type="hidden" name="Promotion" id="Promotion" value="N" />';}?></td>

          <td><?php if($resPmsKey['Person']=='hod'){ ?><select name="Increment" id="Increment" class="tr3" style="background-color:<?php if($resPmsKey['Person']=='hod')echo '#FFD5D5';?>;"><option value="<?php echo $resPmsKey['Increment']; ?>"><?php if($resPmsKey['Increment']=='Y')echo 'YES'; else echo 'NO'; ?></option><option value="<?php if($resPmsKey['Increment']=='Y') echo 'N'; else echo 'Y'; ?>"><?php if($resPmsKey['Increment']=='Y')echo 'NO'; else echo 'YES'; ?></option></select><?php }else{ echo '<input type="hidden" name="Increment" id="Increment" value="N" />';}?></td>

          <td><?php if($resPmsKey['Person']=='hod'){ ?><select name="MyPmsReport" id="MyPmsReport" class="tr3" style="background-color:<?php if($resPmsKey['Person']=='hod')echo '#FFD5D5';?>;"><option value="<?php echo $resPmsKey['MyPmsReport']; ?>"><?php if($resPmsKey['MyPmsReport']=='Y')echo 'YES'; else echo 'NO'; ?></option><option value="<?php if($resPmsKey['MyPmsReport']=='Y') echo 'N'; else echo 'Y'; ?>"><?php if($resPmsKey['MyPmsReport']=='Y')echo 'NO'; else echo 'YES'; ?></option></select><?php }else{ echo '<input type="hidden" name="MyPmsReport" id="MyPmsReport" value="N" />';}?></td>

         <td><?php if($resPmsKey['Person']=='hod'){?><select name="IncrementReport" id="IncrementReport" class="tr3" style="background-color:<?php if($resPmsKey['Person']=='hod')echo '#FFD5D5';?>;"><option value="<?php echo $resPmsKey['IncrementReport']; ?>"><?php if($resPmsKey['IncrementReport']=='Y')echo 'YES'; else echo 'NO'; ?></option><option value="<?php if($resPmsKey['IncrementReport']=='Y') echo 'N'; else echo 'Y'; ?>"><?php if($resPmsKey['IncrementReport']=='Y')echo 'NO'; else echo 'YES'; ?></option></select><?php }else{ echo '<input type="hidden" name="IncrementReport" id="IncrementReport" value="N" />';}?></td>

         <td><?php if($resPmsKey['Person']=='app' OR $resPmsKey['Person']=='rev' OR $resPmsKey['Person']=='hod'){ ?><select name="RatingGraph" id="RatingGraph" class="tr3" style="background-color:<?php if($resPmsKey['Person']=='app')echo '#6CB6FF'; elseif($resPmsKey['Person']=='rev')echo '#D5FFD5'; elseif($resPmsKey['Person']=='hod')echo '#FFD5D5';?>;"><option value="<?php echo $resPmsKey['RatingGraph']; ?>"><?php if($resPmsKey['RatingGraph']=='Y')echo 'YES'; else echo 'NO'; ?></option><option value="<?php if($resPmsKey['RatingGraph']=='Y') echo 'N'; else echo 'Y'; ?>"><?php if($resPmsKey['RatingGraph']=='Y')echo 'NO'; else echo 'YES'; ?></option></select><?php }else{ echo '<input type="hidden" name="RatingGraph" id="RatingGraph" value="N" />';}?></td>
		 
		 <td><select name="FKraForm" id="FKraForm" class="tr3" style="background-color:<?php if($resPmsKey['Person']=='emp') echo '#FFFFC4'; elseif($resPmsKey['Person']=='app')echo '#6CB6FF'; elseif($resPmsKey['Person']=='rev')echo '#D5FFD5'; elseif($resPmsKey['Person']=='hod')echo '#FFD5D5';?>;"><option value="<?php echo $resPmsKey['FKraForm']; ?>"><?php if($resPmsKey['FKraForm']=='Y')echo 'YES'; else echo 'NO'; ?></option><option value="<?php if($resPmsKey['FKraForm']=='Y') echo 'N'; else echo 'Y'; ?>"><?php if($resPmsKey['FKraForm']=='Y')echo 'NO'; else echo 'YES'; ?></option></select></td>
		 
		 <td><select name="FPmsForm" id="FPmsForm" class="tr3" style="background-color:<?php if($resPmsKey['Person']=='emp') echo '#FFFFC4'; elseif($resPmsKey['Person']=='app')echo '#6CB6FF'; elseif($resPmsKey['Person']=='rev')echo '#D5FFD5'; elseif($resPmsKey['Person']=='hod')echo '#FFD5D5';?>;"><option value="<?php echo $resPmsKey['FPmsForm']; ?>"><?php if($resPmsKey['FPmsForm']=='Y')echo 'YES'; else echo 'NO'; ?></option><option value="<?php if($resPmsKey['FPmsForm']=='Y') echo 'N'; else echo 'Y'; ?>"><?php if($resPmsKey['FPmsForm']=='Y')echo 'NO'; else echo 'YES'; ?></option></select></td>
		 
		 <td><select name="FHistoryForm" id="FHistoryForm" class="tr3" style="background-color:<?php if($resPmsKey['Person']=='emp') echo '#FFFFC4'; elseif($resPmsKey['Person']=='app')echo '#6CB6FF'; elseif($resPmsKey['Person']=='rev')echo '#D5FFD5'; elseif($resPmsKey['Person']=='hod')echo '#FFD5D5';?>;"><option value="<?php echo $resPmsKey['FHistoryForm']; ?>"><?php if($resPmsKey['FHistoryForm']=='Y')echo 'YES'; else echo 'NO'; ?></option><option value="<?php if($resPmsKey['FHistoryForm']=='Y') echo 'N'; else echo 'Y'; ?>"><?php if($resPmsKey['FHistoryForm']=='Y')echo 'NO'; else echo 'YES'; ?></option></select></td>

		 <td align="center" valign="middle" style="font:Georgia; font-size:11px; width:50px;">
<?php if($_SESSION['User_Permission']=='Edit'){?>
			 &nbsp;<input type="submit" name="SaveEdit"  value="" class="SaveButton">&nbsp;
<?php } ?>
		 </td>
		</tr>
	</form>
<?php } else { ?>	 
		  <tr>
		   <td align="center" style="font:Georgia;font-size:11px;width:30px;"><?php echo $SNo;?></td>
		   <td style="color:#000000;background-color:<?php if($resPmsKey['Person']=='emp') echo '#FFFFC4'; elseif($resPmsKey['Person']=='app')echo '#6CB6FF'; elseif($resPmsKey['Person']=='rev')echo '#D5FFD5'; elseif($resPmsKey['Person']=='hod')echo '#FFD5D5';?>;font-family:Georgia; font-size:11px; width:80px;" align="">&nbsp;<?php if($resPmsKey['Person']=='emp') echo 'Employee'; elseif($resPmsKey['Person']=='app')echo 'Appraiser'; elseif($resPmsKey['Person']=='rev')echo 'Reviewer'; elseif($resPmsKey['Person']=='hod')echo 'HOD';?></td>		   

		   <td class="tr2" style="background-color:<?php if($resPmsKey['Person']=='emp')echo '#FFFFC4';?>;"><?php if($resPmsKey['Person']=='emp'){echo $resPmsKey['EmpMsg'];}?></td>

		   <td class="tr2" style="background-color:<?php if($resPmsKey['Person']=='emp')echo '#FFFFC4';?>;"><?php if($resPmsKey['Person']=='emp'){echo $resPmsKey['PersonalDetails'];}?></td>

		   <td class="tr2" style="background-color:<?php if($resPmsKey['Person']=='emp')echo '#FFFFC4';?>;"><?php if($resPmsKey['Person']=='emp'){echo $resPmsKey['Schedule'];}?></td>

		   <td class="tr2" style="background-color:<?php if($resPmsKey['Person']=='emp')echo '#FFFFC4';?>;"><?php if($resPmsKey['Person']=='emp'){echo $resPmsKey['Help_Faq'];}?></td>

		   <td class="tr2" style="background-color:<?php if($resPmsKey['Person']=='emp')echo '#FFFFC4';?>;"><?php if($resPmsKey['Person']=='emp'){echo $resPmsKey['View_Print'];}?></td>
		   
		   <td class="tr2" style="background-color:<?php if($resPmsKey['Person']=='emp')echo '#FFFFC4';?>;"><?php if($resPmsKey['Person']=='emp'){echo $resPmsKey['AppraisalForm'];}?></td>
		   
		   <td class="tr2" style="background-color:<?php if($resPmsKey['Person']=='emp')echo '#FFFFC4';?>;"><?php if($resPmsKey['Person']=='emp'){echo $resPmsKey['MidPmsForm'];}?></td>

		   <td class="tr2" style="background-color:<?php if($resPmsKey['Person']=='emp')echo '#FFFFC4'; elseif($resPmsKey['Person']=='app')echo '#6CB6FF'; elseif($resPmsKey['Person']=='rev')echo '#D5FFD5'; elseif($resPmsKey['Person']=='hod')echo '#FFD5D5';?>;"><?php echo $resPmsKey['KRAForm']; ?></td>

           <td class="tr2" style="background-color:<?php if($resPmsKey['Person']=='app')echo '#6CB6FF'; elseif($resPmsKey['Person']=='rev')echo '#D5FFD5'; elseif($resPmsKey['Person']=='hod')echo '#FFD5D5';?>;"><?php if($resPmsKey['Person']=='app' OR $resPmsKey['Person']=='rev' OR $resPmsKey['Person']=='hod'){echo $resPmsKey['Home'];}?></td>

		   <td class="tr2" style="background-color:<?php if($resPmsKey['Person']=='app')echo '#6CB6FF'; elseif($resPmsKey['Person']=='rev')echo '#D5FFD5';?>;">&nbsp;<?php if($resPmsKey['Person']=='app' OR $resPmsKey['Person']=='rev'){ echo $resPmsKey['MyTeam'];}?></td>

		   <td class="tr2" style="background-color:<?php if($resPmsKey['Person']=='app')echo '#6CB6FF'; elseif($resPmsKey['Person']=='rev')echo '#D5FFD5'; elseif($resPmsKey['Person']=='hod')echo '#FFD5D5';?>;"><?php if($resPmsKey['Person']=='app' OR $resPmsKey['Person']=='rev' OR $resPmsKey['Person']=='hod'){ echo $resPmsKey['TeamStatus']; }?></td>

		   <td class="tr2" style="background-color:<?php if($resPmsKey['Person']=='hod')echo '#FFD5D5';?>;"><?php if($resPmsKey['Person']=='hod'){echo $resPmsKey['Score'];}?></td>

		   <td class="tr2" style="background-color:<?php if($resPmsKey['Person']=='hod')echo '#FFD5D5';?>;"><?php if($resPmsKey['Person']=='hod'){echo $resPmsKey['Promotion'];}?></td>

		   <td class="tr2" style="background-color:<?php if($resPmsKey['Person']=='hod')echo '#FFD5D5';?>;"><?php if($resPmsKey['Person']=='hod'){echo $resPmsKey['Increment'];}?></td>

		   <td class="tr2" style="background-color:<?php if($resPmsKey['Person']=='hod')echo '#FFD5D5';?>;"><?php if($resPmsKey['Person']=='hod'){echo $resPmsKey['MyPmsReport'];}?></td>

           <td class="tr2" style="background-color:<?php if($resPmsKey['Person']=='hod')echo '#FFD5D5';?>;"><?php if($resPmsKey['Person']=='hod'){echo $resPmsKey['IncrementReport'];}?></td>

		   <td class="tr2" style="background-color:<?php if($resPmsKey['Person']=='app')echo '#6CB6FF'; elseif($resPmsKey['Person']=='rev')echo '#D5FFD5'; elseif($resPmsKey['Person']=='hod')echo '#FFD5D5';?>;"><?php if($resPmsKey['Person']=='app' OR $resPmsKey['Person']=='rev' OR $resPmsKey['Person']=='hod'){ echo $resPmsKey['RatingGraph'];}?></td>
		   
		   <td class="tr2" style="background-color:<?php if($resPmsKey['Person']=='app')echo '#6CB6FF'; elseif($resPmsKey['Person']=='rev')echo '#D5FFD5'; elseif($resPmsKey['Person']=='hod')echo '#FFD5D5';?>;"><?php if($resPmsKey['Person']=='app' OR $resPmsKey['Person']=='rev' OR $resPmsKey['Person']=='hod'){ echo $resPmsKey['FKraForm']; } ?></td>
		   
		   <td class="tr2" style="background-color:<?php if($resPmsKey['Person']=='app')echo '#6CB6FF'; elseif($resPmsKey['Person']=='rev')echo '#D5FFD5'; elseif($resPmsKey['Person']=='hod')echo '#FFD5D5';?>;"><?php if($resPmsKey['Person']=='app' OR $resPmsKey['Person']=='rev' OR $resPmsKey['Person']=='hod'){ echo $resPmsKey['FPmsForm']; } ?></td>
		   
		   <td class="tr2" style="background-color:<?php if($resPmsKey['Person']=='app')echo '#6CB6FF'; elseif($resPmsKey['Person']=='rev')echo '#D5FFD5'; elseif($resPmsKey['Person']=='hod')echo '#FFD5D5';?>;"><?php if($resPmsKey['Person']=='app' OR $resPmsKey['Person']=='rev' OR $resPmsKey['Person']=='hod'){ echo $resPmsKey['FHistoryForm']; } ?></td>

		   <td align="center" valign="middle" style="font:Georgia; font-size:11px; width:50px;">
<?php if($_SESSION['User_Permission']=='Edit'){?>
			 <a href="#"><img src="images/edit.png" border="0" alt="Edit" onClick="edit(<?php echo $resPmsKey['PmsMId']; ?>)"></a>
<?php } ?>
		   </td>
		 </tr>
<?php } $SNo++;} ?>
         <tr><td bgcolor="#B6E9E2" colspan="23"></td></tr>
		 </table>
	  </td>
   </tr>
   <tr>
      <td align="Right" class="fontButton"><table border="0" width="550">
		<tr><td align="right">
		<input type="button" name="back" id="back" style="width:90px;" value="back" onClick="javascript:window.location='Index.php?log=<?php echo $_SESSION['logCheckUser']; ?>'"/>
	<input type="button" name="Refrash" value="refresh" onClick="javascript:window.location='PmsOpenClose.php'"/>&nbsp;</td>
		</tr></table>
      </td>
   </tr>
   <tr>
    <td colspan="23" style="font-family:Times New Roman;font-size:15px;">
     <u style="color:#000099;">EMPLOYEE</u>&nbsp;: <font color="#E10071">PMS</font> - msg, details, shedule, pms form, help/faq, print,&nbsp;&nbsp;&nbsp; <font color="#E10071">Mid-PMS</font> - msg, details, shedule, pms form, help/faq, print,&nbsp;&nbsp;&nbsp; <font color="#E10071">KRA</font> - details, shedule, Kra form, help/faq, print)<br/>
	 
	 <u style="color:#000099;">APPRAISER</u>&nbsp;: <font color="#E10071">PMS</font> - home, myteam, myteam status, Reating graph,&nbsp;&nbsp;&nbsp; <font color="#E10071">Mid-PMS</font> - home, myteam, myteam status,&nbsp;&nbsp;&nbsp; <font color="#E10071">KRA</font> - Kra form, home, myteam<br/>
	 
	 <u style="color:#000099;">REVIEWER</u>&nbsp;&nbsp;: <font color="#E10071">PMS</font> - home, myteam, myteam status, Reating graph,&nbsp;&nbsp;&nbsp; <font color="#E10071">Mid-PMS</font> - home, myteam, myteam status,&nbsp;&nbsp;&nbsp; <font color="#E10071">KRA</font> - Kra form, home, myteam<br/>
	 
	 <u style="color:#000099;">HOD</u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <font color="#E10071">PMS</font> - home, myteam status, Score to Reating graph,&nbsp;&nbsp;&nbsp; <font color="#E10071">Mid-PMS</font> - home, myteam, myteam status,&nbsp;&nbsp;&nbsp; <font color="#E10071">KRA</font> - Kra form, home<br/>
	</td>
   </tr>
  </table>    
</td>
<?php //************* Close Menu PMS **************************?>    
 </tr>
<?php } ?> 
</table>
<?php //******************************************************************************?>
<?php //****************************END*****END*****END******END******END***********************?>
<?php //************************************************************************************************?>
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