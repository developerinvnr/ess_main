<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}
//if($_SESSION['login'] = true){require_once('PhpFile/LeaveP.php'); } else {$msg= "Session Expiry..............."; }
//********************************************************************************************************************
if(isset($_POST['SaveEdit']))
{ $SqlUpdate = mysql_query("UPDATE hrm_leavedistributed SET PL=".$_POST['PL'].", CL=".$_POST['CL'].", SL=".$_POST['SL'].", FL=".$_POST['FL'].", CompanyId=".$CompanyId.", CreatedBy=".$UserId.", CreatedDate='".date('Y-m-d')."', YearId=".$YearId." WHERE LeaveDistributedId=".$_POST['EditId'], $con) or die(mysql_error());
  if($SqlUpdate){ $msg = "Data has been Updeted successfully...";}
}

if(isset($_POST['SaveEdit2']))
{ $SqlUpdate = mysql_query("UPDATE hrm_eldistributed SET EL=".$_POST['EL'].", CompanyId=".$CompanyId.", CreatedBy=".$UserId.", CreatedDate='".date('Y-m-d')."', YearId=".$YearId." WHERE ELDistributedId=".$_POST['EditId2'], $con) or die(mysql_error());
  if($SqlUpdate){ $msg = "Data has been Updeted successfully...";}
}
?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style> .font { color:#ffffff; font-family:Georgia; font-size:11px; width:30px;} .font1 { font-family:"Times New Roman", Times, serif; font-size:11px; width:30px; } 
.font2 { font-size:11px;width:260px;height:18px;} .font4 { color:#1FAD34; font-family:Georgia; font-size:15px;}
.span {display:none; font-family:Courier New; font-size:14px; }.span1 {display:block; font-family:Courier New; font-size:14px; }
.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;}
.SaveButton {background-image:url(images/save.gif); width:20px; height:20px; background-repeat:no-repeat; background-color:#FFFFFF; border-color:#FFFFFF; border-bottom:inherit;}
.TextInput { font-family:"Times New Roman", Times, serif; font-size:11px; width:50px; height:18px;}
</style>
<script type="text/javascript" src="js/stuHover.js"></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<script type="text/javascript" src="js/MandatoryAjaxCall.js"></script>
<script type="text/javascript" src="js/Leave.js"></script>
<Script type="text/javascript">window.history.forward(1);
function edit(value) { var agree=confirm("Are you sure you want to edit this record?");
if (agree) { var x = "Leave.php?action=edit&eid="+value;  window.location=x;}}
function del(value) { var agree=confirm("Are you sure you want to delete this record?");
if (agree) { var x = "Leave.php?action=delete&did="+value;  window.location=x;}}
function editEL(value) { var agree=confirm("Are you sure you want to edit this record?");
if (agree) { var x = "Leave.php?action=editEL&eidEL="+value;  window.location=x;}}
function delEL(value) { var agree=confirm("Are you sure you want to delete this record?");
if (agree) { var x = "Leave.php?action=deleteEL&didEL="+value;  window.location=x;}}

function validateEdit(formEdit) 
{
  var PL = formEdit.PL.value;  var Numfilter=/^[0-9]+$/;  var test_num = Numfilter.test(PL);
  if (PL.length === 0) { alert("You must enter a PL Value.");  return false; }
  if(test_num==false) { alert('Please Enter Only number in the PL Field');  return false; }	
  
  var SL = formEdit.SL.value;  var Numfilter=/^[0-9]+$/;  var test_num3 = Numfilter.test(SL);
  if (SL.length === 0) { alert("You must enter a SL Value.");  return false; }
  if(test_num3==false) { alert('Please Enter Only number in the SL Field');  return false; }
 
  var CL = formEdit.CL.value;  var Numfilter=/^[0-9]+$/;  var test_num2 = Numfilter.test(CL);
  if (CL.length === 0) { alert("You must enter a CL Value.");  return false; }
  if(test_num2==false) { alert('Please Enter Only number in the CL Field');  return false; }
  
  var FL = formEdit.FL.value;  var Numfilter=/^[0-9]+$/;  var test_num2 = Numfilter.test(FL);
  if (FL.length === 0) { alert("You must enter a FL Value.");  return false; }
  if(test_num2==false) { alert('Please Enter Only number in the FL Field');  return false; }
}
function validateEdit2(formEdit2) 
{  
  var Day_GraterThenEqual = formEdit2.Day_GraterThenEqual.value;  var Numfilter=/^[0-9]+$/;  var test_num4 = Numfilter.test(Day_GraterThenEqual);
  if (Day_GraterThenEqual.length === 0) { alert("You must enter a Day_GraterThenEqual Value.");  return false; }
  if(test_num4==false) { alert('Please Enter Only number in the Day_GraterThenEqual Field');  return false; }	
  
  var Day_LessThen = formEdit2.Day_LessThen.value;  var Numfilter=/^[0-9]+$/;  var test_num5 = Numfilter.test(Day_LessThen);
  if (Day_LessThen.length === 0) { alert("You must enter a Day_LessThen Value.");  return false; }
  if(test_num5==false) { alert('Please Enter Only number in the Day_LessThen Field');  return false; }
  
  var EL = formEdit2.EL.value;  var Numfilter=/^[0-9]+$/;  var test_num6 = Numfilter.test(EL);
  if (EL.length === 0) { alert("You must enter a EL Value.");  return false; }
  if(test_num6==false) { alert('Please Enter Only number in the EL Field');  return false; }
}
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
	  <td align="right" width="450" class="heading">Leave</td>
	  <td align="left">
	    <b><span id="leaveSpan" class="span1">: -&nbsp;Leave</span><span id="leaveEntiSpan" class="span">: -&nbsp;Leave Entitlement</span></b>
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
<tr><td align="center"><a href="#"><img src="images/LeaveLim.png" border="0" onClick="OpenLeave()"/></a></td></tr>
<tr><td align="center"><a href="#"><img src="images/LimitationEnt.png" border="0" onClick="OpenLimitation()"/></a></td></tr>
<tr><td align="center"><a href="#"><img src="images/back.png" border="0" onClick="javascript:window.location='Index.php?log=<?php echo $_SESSION['logCheckUser']; ?>'"/></a></td></tr>   <tr><td align="center"><a href="#"><img src="images/cancel.png" border="0" onClick="javascript:window.location='Leave.php'"/></a></td></tr>
   </table>
 </td>
 <td width="100">&nbsp;</td>
<?php //*********************************************** leave ******************************************************?> 
<td align="left" id="Leave" valign="top" style="display:block;">             
  <table border="1" width="450">
   
	<tr>
	  <td align="left" width="450">
	     <table border="1" width="450" border="1" bgcolor="#FFFFFF">
		 <tr bgcolor="#7a6189">
		   <td align="center" style="font:Georgia; color:#FFFFFF; font-size:11px; width:50px;"><b>SNo</b></td>
		    <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:50px;" valign="top" align="center"><b>Month</b></td>
		   <td class="font" valign="top" align="center"><b>PL</b></td>
		   <td class="font" valign="top" align="center"><b>SL</b></td>
 		   <td class="font" valign="top" align="center"><b>CL</b></td>
 		   <td class="font" valign="top" align="center"><b>FL</b></td>
		   <td valign="top" align="center" style="font:Georgia; font-size:11px; width:60px; color:#FFFFFF;"><b>Action</b></td>
		 </tr>
      <?php $sqlLeave=mysql_query("select * from hrm_leavedistributed where CompanyId=".$CompanyId." order by LeaveDistributedId ASC", $con); $SNo=1; while($resLeave=mysql_fetch_array($sqlLeave)) {
      if(isset($_REQUEST['action']) && $_REQUEST['action']=="edit" && $_REQUEST['eid']==$resLeave['LeaveDistributedId']){ ?>
	      <form name="formEdit" method="post" onSubmit="return validateEdit(this)">	
          <tr>
		   <td align="center" style="font:Georgia; font-size:11px; width:50px;"><?php echo $SNo; ?></td>
		   <td style="color:#000000; font-family:Georgia; font-size:11px; width:80px;" align="left">&nbsp;<?php if($resLeave['LeaveDisMonth']==1){echo 'January';} elseif($resLeave['LeaveDisMonth']==2){echo 'February';} elseif($resLeave['LeaveDisMonth']==3){echo 'March';} elseif($resLeave['LeaveDisMonth']==4){echo 'April';} elseif($resLeave['LeaveDisMonth']==5){echo 'May';} elseif($resLeave['LeaveDisMonth']==6){echo 'June';} elseif($resLeave['LeaveDisMonth']==7){echo 'July';} elseif($resLeave['LeaveDisMonth']==8){echo 'August';} elseif($resLeave['LeaveDisMonth']==9){echo 'September';} elseif($resLeave['LeaveDisMonth']==10){echo 'October';} elseif($resLeave['LeaveDisMonth']==11){echo 'November';} elseif($resLeave['LeaveDisMonth']==12){echo 'December';}?></td>
		   <td class="font1" align="center"><input name="PL" id="PL" class="textInput" value="<?php echo $resLeave['PL']; ?>" /></td>
		   <td class="font1" align="center"><input name="SL" id="SL" class="textInput" value="<?php echo $resLeave['SL']; ?>" /></td>
 		   <td class="font1" align="center"><input name="CL" id="CL" class="textInput" value="<?php echo $resLeave['CL']; ?>" /></td>
 		   <td class="font1" align="center"><input name="FL" id="FL" class="textInput" value="<?php echo $resLeave['FL']; ?>" /></td>
		   <input type="hidden" name="EditId" id="EditId" value="<?php echo $_REQUEST['eid']; ?>"/>
		   <td align="center" valign="middle" style="font:Georgia; font-size:11px; width:60px;">
<?php if($_SESSION['User_Permission']=='Edit'){?>
			 &nbsp;<input type="submit" name="SaveEdit"  value="" class="SaveButton">&nbsp;
<?php } ?>
		   </td>
		 </tr>
		 </form>
		 
<?php } else { ?>	 
		  <tr>
		   <td align="center" style="font:Georgia; font-size:11px; width:50px;"><?php echo $SNo; ?></td>
		   <td style="color:#000000; font-family:Georgia; font-size:11px; width:80px;" align="left">&nbsp;<?php if($resLeave['LeaveDisMonth']==1){echo 'January';} elseif($resLeave['LeaveDisMonth']==2){echo 'February';} elseif($resLeave['LeaveDisMonth']==3){echo 'March';} elseif($resLeave['LeaveDisMonth']==4){echo 'April';} elseif($resLeave['LeaveDisMonth']==5){echo 'May';} elseif($resLeave['LeaveDisMonth']==6){echo 'June';} elseif($resLeave['LeaveDisMonth']==7){echo 'July';} elseif($resLeave['LeaveDisMonth']==8){echo 'August';} elseif($resLeave['LeaveDisMonth']==9){echo 'September';} elseif($resLeave['LeaveDisMonth']==10){echo 'October';} elseif($resLeave['LeaveDisMonth']==11){echo 'November';} elseif($resLeave['LeaveDisMonth']==12){echo 'December';}?></td>
		   <td class="font1" align="left">&nbsp;<?php echo $resLeave['PL']; ?></td>
		   <td class="font1" align="left">&nbsp;<?php echo $resLeave['SL']; ?></td>
 		   <td class="font1" align="left">&nbsp;<?php echo $resLeave['CL']; ?></td>
 		   <td class="font1" align="left">&nbsp;<?php echo $resLeave['FL']; ?></td>
		   <td align="center" valign="middle" style="font:Georgia; font-size:11px; width:60px;">
<?php if($_SESSION['User_Permission']=='Edit'){?>
			 <a href="#"><img src="images/edit.png" border="0" alt="Edit" onClick="edit(<?php echo $resLeave['LeaveDistributedId']; ?>)"></a>
			 &nbsp;&nbsp;<a href="#"><img src="images/delete.png" alt="Delete" border="0" style="display:none;" onClick="del(<?php echo $resLeave['LeaveDistributedId']; ?>)"></a>
<?php } ?>
		   </td>
		 </tr>
<?php } $SNo++;} ?>
         <tr><td bgcolor="#B6E9E2" colspan="10"></td></tr>
		 </table>
	  </td>
	  <td>&nbsp;&nbsp;&nbsp;</td>
	  
	  
<?php //*********************************************** EL leave ******************************************************?> 
<td align="left" id="ELLeave" valign="top" style="display:block;">             
  <table border="1" width="400">
  <tr>
   <td>
    <table border="0" bgcolor="">
	<tr><td style="width:200px; font-size:12px; size:11px; ">Total NoOfDay in One Year:</td><td></td><td style="width:50px; font-size:12px;" align="right">365&nbsp;</td></tr>
	<tr><td style="width:250px; font-size:12px; size:11px; ">Total Sunday + Holiday (52+10):</td><td>-</td><td style="width:50px; font-size:12px;" align="right">62&nbsp;</td></tr>
	<tr><td style="width:150px; font-size:12px; size:11px; ">Maximum Working Day(MWD) :</td><td></td><td style="width:50px; font-size:12px;" align="right">303&nbsp;</td></tr>
	<tr><td style="width:150px; font-size:12px; size:11px; ">Minimum Working Day [(MWD*2)/3] :</td><td></td><td style="width:50px; font-size:12px;" align="right">202&nbsp;</td>
	<tr><td>&nbsp;</td></tr>
	<tr><td class="fontButton" style="color:#FFFFFF;" colspan="3">Maximum EL : 15 Day ,    Minimum  EL : 10 Day</td>
  </tr>
	</table>
	</td>
  </tr>
   <tr>
	  <td align="left" width="400">
	     <table border="1" width="400" border="1" bgcolor="#FFFFFF">
		 <tr bgcolor="#7a6189">
		   <td align="center" style="font:Georgia; color:#FFFFFF; font-size:11px; width:50px;"><b>SNo</b></td>
		    <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:50px;" valign="top" align="center"><b>Day >=</b></td>
		   <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:50px;" valign="top" align="center"><b>Day <</b></td>
		   <td class="font" valign="top" align="center"><b>EL</b></td>
		   <td valign="top" align="center" style="font:Georgia; font-size:11px; width:60px; color:#FFFFFF;"><b>Action</b></td>
		 </tr>
      <?php $sqlEL=mysql_query("select * from hrm_eldistributed where CompanyId=".$CompanyId." order by ELDistributedId ASC", $con); $SNo=1; while($resEL=mysql_fetch_array($sqlEL)) {
      if(isset($_REQUEST['action']) && $_REQUEST['action']=="editEL" && $_REQUEST['eidEL']==$resEL['ELDistributedId']){ ?>
	      <form name="formEdit2" method="post" onSubmit="return validateEdit2(this)">	
          <tr>
		   <td align="center" style="font:Georgia; font-size:11px; width:50px;"><?php echo $SNo; ?></td>
		 <td class="font1" align="left"> &nbsp;<?php echo $resEL['Day_GraterthenEqual']; ?></td>
		   <td class="font1" align="left"> &nbsp;<?php echo $resEL['Day_LessThen']; ?></td>
		   <td class="font1" align="left"><input name="EL" id="EL" class="textInput" value="<?php echo $resEL['EL']; ?>" /></td>
		   <input type="hidden" name="EditId2" id="EditId2" value="<?php echo $_REQUEST['eidEL']; ?>"/>
		   <td align="center" valign="middle" style="font:Georgia; font-size:11px; width:60px;">
<?php if($_SESSION['User_Permission']=='Edit'){?>
			 &nbsp;<input type="submit" name="SaveEdit2"  value="" class="SaveButton">&nbsp;
<?php } ?>
		   </td>
		 </tr>
		 </form>
		 
<?php } else { ?>	 
		  <tr>
		   <td align="center" style="font:Georgia; font-size:11px; width:50px;"><?php echo $SNo; ?></td>
		   <td class="font1" align="left">&nbsp;<?php echo $resEL['Day_GraterthenEqual']; ?></td>
		   <td class="font1" align="left">&nbsp;<?php echo $resEL['Day_LessThen']; ?></td>
		   <td class="font1" align="left">&nbsp;<?php echo $resEL['EL']; ?></td>
		   <td align="center" valign="middle" style="font:Georgia; font-size:11px; width:60px;">
<?php if($_SESSION['User_Permission']=='Edit'){?>
			 <a href="#"><img src="images/edit.png" border="0" alt="Edit" onClick="editEL(<?php echo $resEL['ELDistributedId']; ?>)"></a>
			 &nbsp;&nbsp;<a href="#"><img src="images/delete.png" alt="Delete" border="0" style="display:none;" onClick="delEL(<?php echo $resLeave['ELDistributedId']; ?>)"></a>
<?php } ?>
		   </td>
		 </tr>
<?php } $SNo++;} ?>
         <tr><td bgcolor="#B6E9E2" colspan="10"></td></tr>
		 </table>
	  </td>
    </tr>
	  
  </table>     
</td>
<?php //*********************************************** EL Leave Close******************************************************?>  




    </tr>
    <tr>
      <td align="Right" class="fontButton" colspan="3"><table border="0" width="400">
		<tr><td align="right"><input type="button" name="Refrash" value="Refresh" onclick="javascript:window.location='Leave.php'"/>&nbsp;</td>
		</tr></table>
      </td>
   </tr>
  </table>
 </form>       
</td>
<?php //*********************************************** Leave Close******************************************************?>
   
<?php //*********************************************** Limitaion ******************************************************?>  
  <td align="left" id="Limitation" valign="top" style="display:none;">             
    <form  name="formLimitaion" method="post" onSubmit="return validate(this)">
   <table border="0">
   <tr>
		 
	  <?php //***********************************************************************************************//?>
	  <td valign="top" width="400">
	     <table border="1" width="400" border="1" bgcolor="#FFFFFF">
		 <tr bgcolor="#7a6189">
		   <td align="center" style="font:Georgia; color:#FFFFFF; font-size:11px; width:50px;"><b>SNo</b></td>
		    <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:50px;" valign="top" align="center"><b>Type</b></td>
		   <td class="font" valign="top" align="center"><b>Day</b></td>
		   <td class="font" valign="top" align="center"><b>Encashbled</b></td>
 		   <td class="font" valign="top" align="center"><b>Carry forward</b></td>
		    <td class="font" valign="top" align="center"><b>Available</b></td>
			<td class="font" valign="top" align="center"><b>Limitation</b></td>
		   <td valign="top" align="center" style="font:Georgia; font-size:11px; width:60px; color:#FFFFFF;"><b>Action</b></td>
		 </tr>
      <?php //$sqlLeave=mysql_query("select * from hrm_leave where CompanyId=".$CompanyId." order by LeaveDistributedId ASC"); $SNo=1; while($resLeave=mysql_fetch_array($sqlLeave)) {
      //if(isset($_REQUEST['action']) && $_REQUEST['action']=="edit" && $_REQUEST['eid']==$resLeave['LeaveDistributedId']){ ?>
	      <form name="formEdit" method="post" onSubmit="return validateEdit(this)">	
          <tr>
		   <td align="center" style="font:Georgia; font-size:11px; width:50px;"><?php echo $SNo; ?></td>
		   <td style="color:#000000; font-family:Georgia; font-size:11px; width:80px;" align="left">&nbsp;<?php ?></td>
		   <td class="font1" align="center"><input name="CategoryA" id="CategoryA" class="textInput" value="<?php echo $resLeave['PL']; ?>" /></td>
		   <td class="font1" align="center"><input name="CategoryB" id="CategoryB" class="textInput" value="<?php echo $resLeave['SL']; ?>" /></td>
 		   <td class="font1" align="center"><input name="CategoryC" id="CategoryC" class="textInput" value="<?php echo $resLeave['CL']; ?>" /></td>
		    <td class="font" valign="top" align="center"><b>Available</b></td>
			<td class="font" valign="top" align="center"><b>Limitation</b></td>
		   <input type="hidden" name="Edit" id="Edit" value="<?php echo $_REQUEST['eid']; ?>"/>
		   <td align="center" valign="middle" style="font:Georgia; font-size:11px; width:100px;">
<?php if($_SESSION['User_Permission']=='Edit'){?>
			 &nbsp;<input type="submit" name="SaveEdit"  value="" class="SaveButton">&nbsp;
<?php } ?>
		   </td>
		 </tr>
		 </form>
		 
<?php //} else { ?>	 
		  <tr>
		   <td align="center" style="font:Georgia; font-size:11px; width:50px;"><?php echo $SNo; ?></td>
		   <td style="color:#000000; font-family:Georgia; font-size:11px; width:80px;" align="left">&nbsp;<?php ?></td>
		   <td class="font1" align="left">&nbsp;<?php echo $resLeave['PL']; ?></td>
		   <td class="font1" align="left">&nbsp;<?php echo $resLeave['SL']; ?></td>
 		   <td class="font1" align="left">&nbsp;<?php echo $resLeave['CL']; ?></td>
		   <td align="center" valign="middle" style="font:Georgia; font-size:11px; width:60px;">
<?php if($_SESSION['User_Permission']=='Edit'){?>
			 <a href="#"><img src="images/edit.png" border="0" alt="Edit" onClick="edit(<?php echo $resLeave['LeaveDistributedId']; ?>)"></a>
			 &nbsp;&nbsp;<a href="#"><img src="images/delete.png" alt="Delete" border="0" style="display:none;" onClick="del(<?php echo $resLeave['LeaveDistributedId']; ?>)"></a>
<?php } ?>
		   </td>
		 </tr>
<?php //} $SNo++;} ?>
         <tr><td bgcolor="#B6E9E2" colspan="10"></td></tr>
		 </table>
	  </td>
	   <?php //***********************************************************************************************//?>
	  
  </tr>
<?php if($_SESSION['User_Permission']=='Edit'){?>	  
  <tr>
      <td align="Right" class="fontButton"><table border="0" width="550"><tr>
		 <td align="right"><input type="submit" name="ChangeState" id="ChangeState" style="width:90px; display:none;" value="change"></td>
		 <td align="right" style="width:70px;"><input type="button" name="DeleteState" id="DeleteState" value="delete" style="width:90px; display:none;" onClick="deleteState()">
		                                       <input type="submit" name="AddNewState" id="AddNewState" style="width:90px; display:block;" value="add new"></td>
		 <td align="right" style="width:70px;"><input type="button" name="RefreshState" id="RefreshState" style="width:90px;" value="refresh" onclick="javascript:window.location='Leave.php'"/></td>
		 </tr></table>
      </td>
   </tr>
<?php } ?>
  </table>
 </form>       
   </td>
<?php //*********************************************** Limitaion Close******************************************************?>    

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
