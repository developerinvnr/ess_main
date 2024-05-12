<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}
//**********************************************************************************************************************
if(isset($_POST['SaveEdit']))
{
 $sql2=mysql_query("select * from hrm_upnotification", $con); $row=mysql_num_rows($sql2);
 if($row>0){ $Sql=mysql_query("Update hrm_upnotification SET NotificationStatus='D' WHERE NotificationStatus='A' AND CompanyId=".$CompanyId, $con); }
 $SqlIns = mysql_query("insert into hrm_upnotification(Notification, NotificationDate, NotificationStatus, CompanyId, CreatedBy, CreatedDate, YearId)values('".$_POST['Notification']."', '".date("Y-m-d",strtotime($_POST['NotificationDate']))."', 'A', ".$CompanyId.", ".$UserId.", '".date("Y-m-d")."',".$YearId.")", $con) or die(mysql_error());
     if($SqlIns){ $msg = "Data has been Updeted successfully...";}  
}


if(isset($_POST['SaveAdminNew']))
{
 $ins=mysql_query("insert into hrm_upnotification_admin(Tital, NotiDate, Description, CompanyId, NotiSts, CrBy, CrDate, ClsBy, Clsate) values('".$_POST['Titaln']."', '".date("Y-m-d")."', '".$_POST['Descriptionn']."', ".$CompanyId.", '".$_POST['NotiStsn']."', ".$UserId.", '".date("Y-m-d")."', ".$UserId.", '".date("Y-m-d",strtotime($_POST['Clsaten']))."')", $con);
 if($ins){ echo '<script>window.location="UpdateNotification.php";</script>'; }
}

if(isset($_POST['SaveAdminEdit']))
{ 
 $ins=mysql_query("update hrm_upnotification_admin set Tital='".$_POST['Tital']."', NotiDate='".date("Y-m-d")."', Description='".$_POST['Description']."', NotiSts='".$_POST['NotiSts']."', CrBy=".$UserId.", CrDate='".date("Y-m-d")."', ClsBy=".$UserId.", Clsate='".date("Y-m-d",strtotime($_POST['Clsate']))."' where NotiId=".$_POST['NotiId'], $con);
 if($ins){ echo '<script>window.location="UpdateNotification.php";</script>'; }
}


?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<link rel="stylesheet" type="text/css" href="src/css/jscal2.css"/>
<link rel="stylesheet" type="text/css" href="src/css/border-radius.css"/>
<link rel="stylesheet" type="text/css" href="src/css/steel/steel.css"/>
<script type="text/javascript" src="src/js/jscal2.js"></script>
<script type="text/javascript" src="src/js/lang/en.js"></script>
<style> .font { color:#ffffff; font-family:Georgia; font-size:11px; width:350px;} .font1 { color:#ffffff;font-family:Georgia; font-size:11px; height:14px; width:125px; } 
.font2 { font-size:11px;width:260px;height:18px;} .font4 { color:#1FAD34; font-family:Georgia; font-size:15px;}
.span {display:none; font-family:Courier New; font-size:14px; }.span1 {display:block; font-family:Courier New; font-size:14px; }
.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;}
.SaveButton {background-image:url(images/save.gif); width:20px; height:20px; background-repeat:no-repeat; background-color:#FFFFFF; border-color:#FFFFFF; border-bottom:inherit;}
.EditSelect { font-family:Georgia; font-size:11px; width:120px; height:18px;}
.EditInput { font-family:Georgia; font-size:11px; width:150px; height:18px;}
.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}
</style>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<script type="text/javascript" src="js/MandatoryAjaxCall.js"></script>
<Script type="text/javascript">window.history.forward(1);</Script>
<Script>
function edit(value) { var agree=confirm("Are you sure you want to edit this record?");
if (agree) { var x = "UpdateNotification.php?action=edit&eid="+value;  window.location=x;}}

function edit2(value) { var agree=confirm("Are you sure you want to edit this record?");
if (agree) { var x = "UpdateNotification.php?action2=edit2&eid2="+value;  window.location=x;}}

function new2(){ var x = "UpdateNotification.php?action2=new2";  window.location=x;}


 /*
 function validateEdit(formEdit){
  var HolidayName = formEdit.HolidayName.value;  var filter=/^[a-zA-Z. /]+$/; var test_bool = filter.test(HolidayName);
  if (HolidayName.length === 0) { alert("You must enter a HolidayName Name.");  return false; }
  if(test_bool==false) { alert('Please Enter Only Alphabets in the Holiday Name Field');  return false; }	
  
  var State = formEdit.State.value;  var filter=/^[a-zA-Z. /]+$/; var test_bool = filter.test(State);
  if (State.length === 0) { alert("You must enter a Minimum one State Name.");  return false; }
  if(test_bool==false) { alert('Please Enter Only Alphabets in the State Name Field');  return false; }	


 }
                                 // Date Validation End 


*/
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
<?php //********************************************************************************?>
<?php //************START*****START*****START******START******START***********************?>
<?php //**************************************************************************?>
	  
<table border="0" style="margin-top:0px; width:100%;">
 <tr>
  <td align="left" height="20" valign="top" colspan="3">
   <table border="0" cellspacing="0">
    <tr>
	<td width="460" class="heading">&nbsp;Notification (For Employee)&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" name="back" id="back" style="width:90px;" value="Back" onClick="javascript:window.location='Index.php?log=<?php echo $_SESSION['logCheckUser']; ?>'"/> &nbsp;<input type="button" name="Refrash" value="Refresh" onClick="javascript:window.location='UpdateNotification.php'"/></td>
	<td class="font4" style="left">&nbsp;&nbsp;&nbsp;<b><?php echo $msg; ?></b></td>
	</tr>
   </table>
   
  </td>
 </tr>
<?php if(($_SESSION['UserType']=='S' OR $_SESSION['UserType']=='A') AND $_SESSION['login'] = true) { ?>	
 <tr>
  <td align="left" id="type" valign="top" style="display:block; width:100%;">             
   <table border="0" width="800" cellspacing="0">
	<tr>
	  <td align="left" width="800" >
	     <table border="1" width="800" border="1" bgcolor="#FFFFFF" cellspacing="0">
		 <tr bgcolor="#7a6189" style="height:25px;">
		   <td class="font" align="center" style="width:450px;"><b>Notification</b></td>
		   <td class="font" align="center" style="width:80px;"><b>From Date</b></td>
		   <td class="font" align="center" style="width:50px;"><b>Action</b></td>
		 </tr>
      <?php $sql=mysql_query("select * from hrm_upnotification where NotificationStatus='A' AND CompanyId=".$CompanyId, $con); $SNo=1; $res=mysql_fetch_array($sql);
      if(isset($_REQUEST['action']) && $_REQUEST['action']=="edit" && $_REQUEST['eid']==$res['NotificationId']){ ?>
	      <form name="formEdit" method="post" onSubmit="return validateEdit(this)">	
          <tr>
		   <td align="left" style="width:70%;text-align:center;"><textarea name="Notification" id="Notification" style="width:98%;"><?php echo $res['Notification']; ?></textarea></td>
		   <td class="font" align="center"><input name="NotificationDate" id="NotificationDate" maxlength="11" style="font-family:Georgia; font-size:11px; width:85px; height:18px;text-align:center;" value="<?php echo date("d-m-Y",strtotime($res['NotificationDate'])); ?>"><script type="text/javascript">  var cal = Calendar.setup({ onSelect:  function(cal) { cal.hide()}, showTime: true }); cal.manageFields("NotificationDate", "NotificationDate", "%d-%m-%Y");</script></td>
 		   <td align="center" style="font:Georgia; font-size:11px; width:50px;">
<?php if($_SESSION['User_Permission']=='Edit'){?>
		 &nbsp;<input type="submit" name="SaveEdit"  value="" class="SaveButton">&nbsp;<input type="hidden" name="HolidayId" id="HolidayId" value="<?php echo $_REQUEST['eid']; ?>"/>
<?php } ?>
		   </td>
		 </tr>
		 </form>
		 
<?php } else { ?>	 
		 <tr>
		 <td align="left" style="width:70%;text-align:center;"><textarea style="width:98%;"><?php echo $res['Notification']; ?></textarea></td>
		   
		   <td style="font-family:Georgia; font-size:12px;" align="center">&nbsp;<?php echo date("d-m-Y",strtotime($res['NotificationDate'])); ?></td>
		   <td align="center" valign="middle" style="font:Georgia;font-size:12px;">
<?php if($_SESSION['User_Permission']=='Edit'){?>
			 <a href="#"><img src="images/edit.png" border="0" alt="Edit" onClick="edit(<?php echo $res['NotificationId']; ?>)"></a>
<?php } ?>
		   </td>
		 </tr>
<?php } $SNo++;} ?>   
			
		 </table>
	  </td>
    </tr>
  </table>  
</td>


 </tr> 
</table>
		
<?php //**************************************************************?>
<?php //**************END*****END*****END******END******END*********************?>
<?php //***********************************************************?>
		
	  </td>
	</tr>
	
	
		 <tr>
	  <td valign="top" align="center"  width="100%" id="MainWindow"><br>
<?php //********************************************************************************?>
<?php //************START*****START*****START******START******START***********************?>
<?php //**************************************************************************?>
	  
<table border="0" style="margin-top:0px; width:100%;">
 <tr>
  <td align="left" height="20" valign="top" colspan="3">
   <table border="0" cellspacing="0">
    <tr>
	<td width="460" class="heading">&nbsp;Notification (For Admin) &nbsp;&nbsp;<span style="cursor:pointer; text-decoration:underline; font-family:Times New Roman;font-size:12px;color:#0080FF;" onClick="new2()">Add New</span></td>
	<td class="font4" style="left">&nbsp;&nbsp;&nbsp;<b><?php echo $msg; ?></b></td>
	</tr>
   </table>
   
  </td>
 </tr>
<?php if(($_SESSION['UserType']=='S' OR $_SESSION['UserType']=='A') AND $_SESSION['login'] = true) { ?>	
 <tr>
  <td align="left" id="type" valign="top" style="display:block; width:100%;">             
   <table border="0" width="1000" cellspacing="0">
	<tr>
	  <td align="left" width="1000" >
	     <table border="1" width="1000" border="1" bgcolor="#FFFFFF" cellspacing="0">
		 <tr bgcolor="#7a6189" style="height:25px;">
		   <td class="font" align="center" style="width:150px;"><b>Title</b></td>
		   <td class="font" align="center" style="width:250px;"><b>Description</b></td>
		   <!--<td class="font" align="center" style="width:80px;"><b>Date</b></td>-->
		   <td class="font" align="center" style="width:80px;"><b>Closing Date</b></td>
		   <td class="font" align="center" style="width:50px;"><b>Status</b></td>
		   <td class="font" align="center" style="width:50px;"><b>Action</b></td>
		 </tr>
      <?php $sql2=mysql_query("select * from hrm_upnotification_admin where NotiSts='A' AND CompanyId=".$CompanyId, $con); $SNo=1; while($res2=mysql_fetch_array($sql2)){ 
      if(isset($_REQUEST['action2']) && $_REQUEST['action2']=="edit2" && $_REQUEST['eid2']==$res2['NotiId']){ ?>
	      <form name="formEdit" method="post" onSubmit="return validateEdit(this)">	
          <tr>
		   <td align="left" style="width:30%;text-align:center;"><input name="Tital" id="Tital" style="width:99%;background-color:#FFFFBB;" value="<?php echo $res2['Tital']; ?>" required/></td>
		   <td align="left" style="width:40%;text-align:center;"><input name="Description" id="Description" style="width:99%;background-color:#FFFFBB;" value="<?php echo $res2['Description']; ?>" required/></td>
		   <?php /*?><td class="font" align="center" valign="top"><input name="NotiDate" id="NotiDate" maxlength="11" style="font-family:Georgia;font-size:11px;width:85px;height:18px;text-align:center;" value="<?php echo date("d-m-Y",strtotime($res2['NotiDate'])); ?>"></td><?php */?>
		   <td class="font" align="center" style="background-color:#FFFFBB;"><input name="Clsate" id="Clsate" maxlength="11" style="font-family:Georgia;font-size:11px;width:85px;height:18px;text-align:center;background-color:#FFFFBB;" value="<?php echo date("d-m-Y",strtotime($res2['Clsate'])); ?>"><script type="text/javascript">  var cal = Calendar.setup({ onSelect:  function(cal) { cal.hide()}, showTime: true }); cal.manageFields("Clsate", "Clsate", "%d-%m-%Y");</script></td>
		   
		   <td style="text-align:center;background-color:#FFFFBB;"><select name="NotiSts" id="NotiSts" style="width:98%;background-color:#FFFFBB;"><option value="<?php echo $res2['NotiSts']; ?>"><?php echo $res2['NotiSts']; ?></option><option value="<?php if($res2['NotiSts']=='A'){echo 'D';}else{echo 'A';} ?>"><?php if($res2['NotiSts']=='A'){echo 'D';}else{echo 'A';} ?></option></select></td>
		   
 		   <td align="center" style="font:Georgia;font-size:11px;width:50px;background-color:#FFFFBB;">
<?php if($_SESSION['User_Permission']=='Edit'){ ?>
		 &nbsp;<input type="submit" name="SaveAdminEdit" value="" class="SaveButton">&nbsp;<input type="hidden" name="NotiId" id="NotiId" value="<?php echo $_REQUEST['eid2'];?>"/>
<?php } ?>
		   </td>
		 </tr>
		 </form>
		 
<?php } else { ?>	 
		 <tr>
		 <td align="left" style="width:30%;font-size:12px;font-family:Times New Roman;"><?php echo $res2['Tital']; ?></td>
		 <td align="left" style="width:40%;font-size:12px;font-family:Times New Roman;"><?php echo $res2['Description']; ?></td>
		<?php /*?><td style="font-family:Georgia; font-size:12px;" align="center">&nbsp;<?php echo date("d-m-Y",strtotime($res2['NotiDate'])); ?></td><?php */?>
		<td style="font-family:Georgia; font-size:12px;font-family:Times New Roman;" align="center">&nbsp;<?php echo date("d-m-Y",strtotime($res2['Clsate'])); ?></td>
		<td style="text-align:center;font:Georgia;font-size:12px;font-family:Times New Roman;"><?php echo $res2['NotiSts']; ?></td>
		   <td align="center" valign="middle" style="font:Georgia;font-size:12px;">
<?php if($_SESSION['User_Permission']=='Edit'){ ?>
			 <a href="#"><img src="images/edit.png" border="0" alt="Edit" onClick="edit2(<?php echo $res2['NotiId']; ?>)"></a>
<?php } ?>
		   </td>
		 </tr>
<?php } $SNo++;} } ?>   
			
<?php if($_REQUEST['action2']=='new2'){ ?>
         <form name="formEdit" method="post" onSubmit="return validateEdit(this)">	
          <tr>
		   <td align="left" style="width:30%;text-align:center;"><input name="Titaln" id="Titaln" style="width:99%; background-color:#FFFFBB;" required/></td>
		   <td align="left" style="width:40%;text-align:center;"><input name="Descriptionn" id="Descriptionn" style="width:99%;background-color:#FFFFBB;" required/></td>
		   <td class="font" align="center" style="background-color:#FFFFBB;"><input name="Clsaten" id="Clsaten" maxlength="11" style="font-family:Georgia;background-color:#FFFFBB;font-size:11px;width:85px;height:18px;text-align:center;" value="<?php echo date("d-m-Y"); ?>"><script type="text/javascript">  var cal = Calendar.setup({ onSelect:  function(cal) { cal.hide()}, showTime: true }); cal.manageFields("Clsaten", "Clsaten", "%d-%m-%Y");</script></td>
		   
		   <td style="text-align:center;"><select name="NotiStsn" id="NotiStsn" style="width:98%;background-color:#FFFFBB;"><option value="A">A</option><option value="D">D</option></select></td>
		   
 		   <td align="center" style="font:Georgia;font-size:11px;width:50px;background-color:#FFFFBB;">
<?php if($_SESSION['User_Permission']=='Edit'){ ?>
		 &nbsp;<input type="submit" name="SaveAdminNew" value="" class="SaveButton">
<?php } ?>
		   </td>
		 </tr>
		 </form>
<?php } ?>			

		
		 </table>
	  </td>
    </tr>
  </table>  
</td>


 </tr> 
</table>
		
<?php //**************************************************************?>
<?php //**************END*****END*****END******END******END*********************?>
<?php //***********************************************************?>
		
	  </td>
	</tr>
	
	
	
	<?php /*?><tr>
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
	</tr><?php */?>
  </table>
 </td>
</tr>
</table>
</body>
</html>
