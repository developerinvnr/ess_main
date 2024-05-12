<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
include('codeEncDec.php');
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry........";}
if($_SESSION['login'] = true){require_once('PhpFile/MasterUserP.php'); } else {$msg= "Session Expiry....."; }
?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style> .font{color:#ffffff;font-family:Georgia;font-size:11px;text-align:center;}.font1{font-family:Georgia; font-size:11px;}.font2{color:#ffffff;font-family:Georgia;font-size:12px;width:150px;}.font4{color:#1FAD34; font-family:Georgia;font-size:15px;}.font5{color:#400000;font-family:Georgia; -size:12px;}
.EditInput { font-family:Georgia;font-size:11px;width:120px;height:18px;}.EditSelect{font-family:Georgia; font-size:11px; width:89px; height:18px;}.SaveButton {background-image:url(images/save.gif); width:20px; height:20px; background-repeat:no-repeat; background-color:#FFFFFF; border-color:#FFFFFF; border-bottom:inherit; border-right:inherit;}
</style>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/MasterAUValid.js" ></script>
<Script type="text/javascript">window.history.forward(1);
function edit(value) { var agree=confirm("Are you sure you want to edit this record?");
if (agree) { var x = "MasterUser.php?action=edit&eid="+value;  window.location=x;}}
function del(value) { var agree=confirm("Are you sure you want to delete this record?");
if (agree) { var x = "MasterUser.php?action=delete&did="+value;  window.location=x;}}
function newsave() { var x = "MasterUser.php?action=newsave";  window.location=x;}
function Logkey(value) { var x = "MasterUser.php?action=Logkey&Logid="+value;  window.location=x;}
function UserRight(value) { var x = "UserRights.php?action=Rights&uuxiid="+value;  window.location=x;}
function validate(form)
{ //var currpass = form.currpass.value;  var filter=/^[0-9a-zA-Z%@$#]+$/;  var test_bool = filter.test(currpass);
  var pass1 = form.pass1.value;  var filter1=/^[0-9a-zA-Z%@$#]+$/;  var test_bool1 = filter1.test(pass1);  var pass2 = form.pass2.value;  var filter2=/^[0-9a-z]+$/;
  var test_bool2 = filter1.test(pass2);
    //if (currpass.length === 0) { alert("You must enter a Current Password.");  return false; }
	if (pass1.length === 0){ alert("Please Enter a new password  ");  return false; }	
	if(test_bool1==false)  { alert('Please Enter Only numeric and Alphabets in the new password Field'); return false; }	
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
 <td>
  <table width="100%" style="margin-top:0px;" border="0">
    <tr>
	  <td valign="top"><?php if($_SESSION['login'] = true){ require_once("AWelcome.php"); } ?></td>
	</tr>
	 <tr>
	  <td valign="top" align="center"  width="100%" id="MainWindow"><br>
<?php //****************************************************************************?>
<?php //*************START*****START*****START******START******START*********************************?>
<?php //************************************?>
<table border="0" style="margin-top:0px; width:100%; height:400px;">
    <tr>
	  <td align="center" colspan="3">
	   <?php //--------------Change password----------------------------------------- ?>
	    <?php if(isset($_REQUEST['action']) && $_REQUEST['action']=="Logkey"){ ?>
         <table border="0" align="center">
            <form enctype="multipart/form-data" name="form" method="post"  onSubmit="return validate(this)"> 
                <tr>
				  <td align="left" class="font5" valign="bottom">
				<?php $SqlSelect=mysql_query("select User_FirstName, User_SecondName, User_LastName, Comment from hrm_user where AXAUESRUser_Id='".$_REQUEST['Logid']."'", $con);
				      $ResSelect=mysql_fetch_assoc($SqlSelect); $ename=$ResSelect['User_FirstName'].' '.$ResSelect['User_SecondName'].' '.$ResSelect['User_LastName'];?>
					  <img src="images/ChangePwd.png" border="0" />
				      <font color="#2F248C" style='font-family:Georgia; font-size:12px;'>&nbsp;<?php echo $ename; ?></font>&nbsp;&nbsp;
				  </td>
				  <td align="left" class="font5"><b>&nbsp;New Password&nbsp; : &nbsp;</b><br><input type="password" name="pass1" id="pass1" height="15" maxlength="15" size="25"></td>
                  <td align="left" class="font5"><b>&nbsp;Confirm New Password&nbsp; : &nbsp;</b><br><input type="password" name="pass2" id="pass2" height="15" maxlength="15" size="25" ></td>
				  <td><input type="hidden"  name="logid" value="<?php echo $_REQUEST['Logid']; ?>"></td>
				  <td colspan="2"  align="right" valign="bottom"><input type="submit" id="Change" name="Change" value="Change"/></td>
				</tr>
			</form>  
        </table>
		 <?php } ?>
	  </td>
	</tr>
	<tr>
	  <td align="right" width="2%">&nbsp;</td>
<?php //--------------------------------------Update ------------------------------------- ?>
<?php if(($_SESSION['UserType']=='M' OR $_SESSION['UserType']=='S' OR $_SESSION['UserType']=='A') AND $_SESSION['login'] = true) { ?>
<td align="center" width="80%" valign="top">
   <table border="0" width="100%">
	 <tr><td align="left" class="heading">Master User<font class="font4"><b>&nbsp;<?php echo $msg; ?></b></font></td></tr>
	 <tr>
	   <td> 
		<table border="1" bgcolor="#FFFFFF">
		 <tr bgcolor="#7a6189"> 
			<td class="font" style="width:30px;"><b>&nbsp;SNo.&nbsp;</b></td>
			<td class="font" style="width:60px;"><b>&nbsp;Mr/Mrs&nbsp;</b></td>
			<td class="font" style="width:100px;"><b>FirstName</b></td>
			<td class="font" style="width:100px;"><b>SecondName</b></td>
			<td class="font" style="width:100px;"><b>LastName</b></td>
			<td class="font" style="width:100px;"><b>Position</b></td>
			<td class="font" style="width:100px;"><b>UserName</b></td> 
			<td class="font" style="width:70px;"><b>Type</b></td>
			<td class="font" style="width:60px;"><b>Status</b></td>
			<td class="font" style="width:60px;"><b>Per mission</b></td>
			<td class="font" style="width:100px;"><b>Comment</b></td>
			<td class="font" style="width:100px;"><b>Action</b></td>
			<td class="font" style="width:60px;"><img src="images/rights1.png" border="0" /></td>
		 </tr>
<?php $SqlUser=mysql_query("Select * from hrm_user where User_type='U' AND User_status!='De' AND CompanyId=".$CompanyId, $con); $Sno=1; while($ResultUser=mysql_fetch_array($SqlUser)) {?>
<?php if(isset($_REQUEST['action']) && $_REQUEST['action']=="edit" && $_REQUEST['eid']==$ResultUser['AXAUESRUser_Id']){ ?>  
   <tr> 
	<form name="formUserEdit" method="post" onSubmit="return validateEdit(this)">
	<td align="center" class="font1">&nbsp;<?php echo $Sno; ?></td>
	<td align="center" style="width:60px;"><select class="EditInput" name="MrMrsMiss" id="MrMrsMiss" style="width:50px; "><option value="<?php echo $ResultUser['User_MrMrsMiss'];?>"><?php echo $ResultUser['User_MrMrsMiss'];?></option><option value="Mr.">Mr.</option><option value="Mrs.">Mrs.</option><option value="Miss">Miss</option></select></td>
	<td><input class="EditInput" name="Fname" id="Fname" value="<?php echo $ResultUser['User_FirstName'];?>" style="width:98px;"></td>
	<td><input class="EditInput" name="Sname" id="Sname" value="<?php echo $ResultUser['User_SecondName'];?>" style="width:98px;"></td>
	<td><input class="EditInput" name="Lname" id="Lname" value="<?php echo $ResultUser['User_LastName'];?>" style="width:98px;"></td>
	<td><input class="EditInput" name="Position" id="Position" value="<?php echo $ResultUser['User_Position'];?>" style="width:98px;"></td>
	<td><input class="EditInput" maxlength="20" name="Uname" id="Uname" value="<?php echo $ResultUser['User_name'];?>" style="width:98px;"></td>
	<td><select name="Utype" id="Utype" class="EditSelect" style="width:68px;"><option value="U">&nbsp; User</option></select></td>
	<td><select name="Ustatus" id="Ustatus" class="EditSelect" style="width:58px;"><option value="<?php echo $ResultUser['User_status']; ?>"><?php if($ResultUser['User_status']=='A'){ echo '&nbsp;&nbsp; Active';} if($ResultUser['User_status']=='D'){ echo '&nbsp; Deactive';}?></option><option value="<?php if($ResultUser['User_status']=='A'){ echo 'D';} else {echo 'A'; }?>"><?php if($ResultUser['User_status']=='A'){ echo '&nbsp; Deactive';} else {echo '&nbsp; Active'; }?></option></select><input type="hidden" name="sid" value="<?php echo $_REQUEST['eid']; ?>" ></td>
	
	<td><select name="Uper" id="Uper" class="EditSelect" style="width:58px;"><option value="<?php echo $ResultUser['User_Permission']; ?>"><?php echo $ResultUser['User_Permission']; ?></option>
	<?php if($ResultUser['User_Permission']!='Edit'){ ?><option value="Edit">Edit</option><?php } ?>
	<?php if($ResultUser['User_Permission']!='View'){ ?><option value="View">View</option><?php } ?>
	</select></td>
	<td><input class="EditInput" name="nComment" id="nComment" maxlength="100" style="width:98px;"></td> 
	<td align="center" valign="middle" >
<?php if($_SESSION['User_Permission']=='Edit'){?>
<input type="submit" name="SaveUser"  value="" class="SaveButton" style="width:98px;">
<?php } ?>
	</td>
	</form>
	</tr>
	<?php } else { ?>
	<tr> 
	 <td align="center" class="font1"><?php echo $Sno; ?></td>
	 <td align="center" class="font1"><?php echo $ResultUser['User_MrMrsMiss']; ?></td>
	 <td class="font1">&nbsp;<?php echo $ResultUser['User_FirstName']; ?></td>
	 <td class="font1">&nbsp;<?php echo $ResultUser['User_SecondName']; ?></td>
	 <td class="font1">&nbsp;<?php echo $ResultUser['User_LastName']; ?></td>
	 <td class="font1">&nbsp;<?php echo $ResultUser['User_Position']; ?></td>
	 <td class="font1">&nbsp;<?php echo $ResultUser['User_name']; ?></td>
	 <td class="font1">&nbsp;<?php if($ResultUser['User_type']=='U'){echo 'User'; } ?></td>
<td class="font1">&nbsp;<?php if($ResultUser['User_status']=='A'){echo 'Active';}else{echo 'Deactive';}?></td>
	 <td class="font1">&nbsp;<?php echo $ResultUser['User_Permission']; ?></td>
	 <td align="center" class="font1"><a onClick="window.open('CommentUser.php?u=<?php echo $ResultUser['AXAUESRUser_Id']; ?>', 'popup', 'width=400, height=200, scrollbars=no, resizable=no, toolbar=no, directories=no, location=no, menubar=no, status=no, left=0, top=0'); return false" href="Terms.php">Comment</a></td>
	 <td align="center" valign="middle">
<?php if($_SESSION['User_Permission']=='Edit'){?>
<?php if($_SESSION['UserType']=='S' OR $_SESSION['UserType']=='A') { ?><a href="#"><img src="images/edit.png" border="0" alt="Edit" onClick="edit(<?php echo $ResultUser['AXAUESRUser_Id']; ?>)"></a>&nbsp;&nbsp;<a href="#"><img src="images/delete.png" alt="Delete" border="0" onClick="del(<?php echo $ResultUser['AXAUESRUser_Id']; ?>)"></a><?php if($_SESSION['UserType']=='S') {?>&nbsp;&nbsp;<a href="#"><img src="images/key.png" alt="Delete" border="0" onClick="Logkey(<?php echo $ResultUser['AXAUESRUser_Id']; ?>)"></a><?php } } ?>
<?php } ?>
</td>
	 <td align="center">
<?php if($_SESSION['User_Permission']=='Edit'){?>
<a href="#"><img src="images/rights.png" alt="userRights" border="0" onClick="UserRight(<?php echo $ResultUser['AXAUESRUser_Id']; ?>)"></a>
<?php } ?>
</td>
	</tr>
	<?php } $Sno++; } ?> 
	<tr><td bgcolor="#B6E9E2" colspan="12"></td></tr>
<?php //-----------------------------------------Add New User---------------------------------- ?>
    <?php if(isset($_REQUEST['action']) && $_REQUEST['action']=="newsave"){ ?>
	<form name="formUserNew" method="post" onSubmit="return validateNew(this)">
    <tr> 
     <td align="center" class="font1">&nbsp;<?php echo $Sno; ?></td>
     <td><select class="EditInput" name="nMrMrsMiss" id="nMrMrsMiss" style="width:58px;"><option value="Mr.">Mr.</option><option value="Mrs.">Mrs.</option><option value="Miss">Miss</option></select></td>
     <td><input class="EditInput" name="nFname" id="nFname" style="width:98px;"/></td>
     <td><input class="EditInput" name="nSname" id="nSname" style="width:98px;"/></td>
     <td><input class="EditInput" name="nLname" id="nLname" style="width:98px;"/></td>
     <td><input class="EditInput" name="nPosition" id="nPosition" style="width:98px;"/></td>
     <td><input class="EditInput" name="nUname" id="nUname" maxlength="20" style="width:98px;"/></td>
     <td><select name="nUtype" id="nUtype" class="EditSelect" style="width:68px;"><option value="U">&nbsp; User</option></select></td>
     <td><select name="nUstatus" id="nUstatus" class="EditSelect" style="width:58px;"><option value="D">&nbsp; Deactive</option><option value="A">&nbsp; Active</option></select></td>
	 <td><select name="Uper" id="Uper" class="EditSelect" style="width:58px;"><option value="Edit">Edit</option>
<option value="View">View</option></select></td>
	 <td><input class="EditInput" name="nComment" id="nComment" maxlength="100" style="width:98px;" ></td> 
	 <td align="center" valign="middle" style="width:98px;">
<?php if($_SESSION['User_Permission']=='Edit'){?>
<input type="submit" name="NewSaveUser"  value="" class="SaveButton">
<?php } ?>
</td>
	 </tr>
	 </form>
	 <?php } ?>
	 <tr>
	</table>
   </td>
  </tr>
   <td align="right">
<?php if($_SESSION['User_Permission']=='Edit'){?>
<input type="button" name="NewSave" id="NewSave" value="New" onClick="newsave()" <?php if($_REQUEST['action']=="newsave" OR $_REQUEST['action']=="edit"){ echo "style=display:none;"; }?>/>
<input type="button" name="Back" value="Back" onClick="javascript:window.location='Index.php?log=<?php echo $_SESSION['logCheckUser']; ?>'"/>
<input type="button" name="Refresh" value="Refresh" onClick="javascript:window.location='MasterUser.php'"/>&nbsp;
<?php } ?>
   </td>
  </tr>
 </table>  		
</td>
<?php } ?>
<?php //------------------------------------------------------------------------ ?>
		<td align="left" width="20%">&nbsp;</td>
	</tr>
</table>
<?php //**************************************************************************************?>
<?php //*************END*****END*****END******END******END*********************************?>
<?php //***************************************************************************************?>
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