<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}
//**********************************************************************************************************************
if(isset($_POST['SaveNew']))
{  $SqlInseart = mysql_query("INSERT INTO hrm_pms_workenvironment(Environment,WorkEnStatus,CompanyId,CreatedBy,CreatedDate,YearId) VALUES('".$_POST['Environment']."', '".$_POST['EnvStatus']."', ".$CompanyId.", ".$UserId.", '".date('Y-m-d')."', ".$YearId.")", $con); 
   if($SqlInseart){ $msg = "Data has been Inserted successfully..."; }
}
if(isset($_POST['SaveEdit']))
{
    $SqlUpdate = mysql_query("UPDATE hrm_pms_workenvironment SET Environment='".$_POST['Environment']."', WorkEnStatus='".$_POST['WorkEnStatus']."' WHERE WorkEnvId=".$_POST['WorkEnvId'], $con) or die(mysql_error());
     if($SqlUpdate){ $msg = "Data has been Updeted successfully...";}
}
if(isset($_REQUEST['action']) && $_REQUEST['action']=="delete")
{
  $SqlDelete=mysql_query("UPDATE hrm_pms_workenvironment SET WorkEnStatus='De' WHERE WorkEnvId=".$_REQUEST['did'], $con) or die(mysql_error());
  if($SqlDelete) { $msg = "Data has been deleted successfully..."; }
}

?>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php include_once('../Title.php'); ?></title>

<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<link rel="stylesheet" type="text/css" href="src/css/jscal2.css"/>
<link rel="stylesheet" type="text/css" href="src/css/border-radius.css"/>
<link rel="stylesheet" type="text/css" href="src/css/steel/steel.css"/>
<script type="text/javascript" src="src/js/jscal2.js"></script>
<script type="text/javascript" src="src/js/lang/en.js"></script>
<style> .font { color:#ffffff; font-family:Georgia; font-size:13px; width:100px;} .font1 { font-family:Times New Roman; font-size:13px; height:14px; width:100px; } 
.font2 { font-size:11px;width:260px;height:18px;} .font4 { color:#1FAD34; font-family:Georgia; font-size:15px;}
.span {display:none; font-family:Courier New; font-size:14px; }.span1 {display:block; font-family:Courier New; font-size:14px; }
.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;}
.SaveButton {background-image:url(images/save.gif); width:20px; height:20px; background-repeat:no-repeat; background-color:#FFFFFF; border-color:#FFFFFF; border-bottom:inherit;}
.EditSelect { font-family:Times New Roman; font-size:11px; width:120px; height:18px;}
.EditInput { font-family:Times New Roman; font-size:11px; width:100px; height:18px;}
.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}
</style>
<script type="text/javascript" src="js/stuHover.js" ></script>
<Script type="text/javascript">window.history.forward(1);</Script>
<Script>
function edit(value) { var agree=confirm("Are you sure you want to edit this record?");
if (agree) { var x = "FeedBack.php?action=edit&eid="+value;  window.location=x;}}
function del(value) { var agree=confirm("Are you sure you want to delete this record?");
if (agree) { var x = "FeedBack.php?action=delete&did="+value;  window.location=x;}}
function newsave() { var x = "FeedBack.php?action=newsave";  window.location=x;}


function validateEdit(formEdit){
  var Environment = formEdit.Environment.value; 
  if (Environment.length === 0) { alert("please enter Environment  field.");  return false; }
     
}
                                
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
<?php //************************************************************************************************************************************************************?>
<?php //**********************************************START*****START*****START******START******START***************************************************************?>
<?php //************************************************************************************************************************************************************?>
	  
<table border="0" style="margin-top:0px; width:100%; height:300px;">
 <tr>
  <td align="left" height="20" valign="top" colspan="3">
   <table border="0">
    <tr>
	  <td width="312" height="22" align="right" class="heading">PMS - Question for Feedback</td>
	  <td class="font4" style="left">&nbsp;&nbsp;&nbsp;<b><?php echo $msg; ?></b></td>
	</tr>
   </table>
  </td>
 </tr>
<?php if(($_SESSION['UserType']=='M' OR $_SESSION['UserType']=='S' OR $_SESSION['UserType']=='A' OR $_SESSION['UserType']=='U') AND $_SESSION['login'] = true) { ?>	
 <tr>
 <td style="width:50px;" valign="top" align="center">&nbsp;</td>
 <td width="10">&nbsp;</td>
<?php //*********************************************** Open Department******************************************************?> 
<td align="left" id="type" valign="top" style="display:block; width:100%">             
   <table border="0" width="800">
   
	<tr>
	  <td align="left" width="800">
	     <table border="1" width="800" bgcolor="#FFFFFF">
		 <tr bgcolor="#7a6189">
		   <td align="center" style="font:Georgia; color:#FFFFFF; font-size:11px; width:50px;"><b>SNo</b></td>
		   <td style="color:#FFFFFF;font-family:Georgia; font-size:11px; width:550px;" valign="top" align="center"><b>Work Environment</b></td>
		   <td style="color:#FFFFFF;font-family:Georgia; font-size:11px; width:100px;" valign="top" align="center"><b>Status</b></td>
		   <td valign="top" align="center" style="font:Georgia; font-size:11px; width:90px; color:#FFFFFF"><b>Action</b></td>
		 </tr>
      <?php $sqlPer=mysql_query("select * from hrm_pms_workenvironment where WorkEnStatus!='De' AND CompanyId=".$CompanyId, $con); $SNo=1; while($resPer=mysql_fetch_array($sqlPer)) {
      if(isset($_REQUEST['action']) && $_REQUEST['action']=="edit" && $_REQUEST['eid']==$resPer['WorkEnvId']){ ?>
	      <form name="formEdit" method="post" onSubmit="return validateEdit(this)">	
          <tr>
		   <td align="center" style="font:Georgia; font-size:11px; width:50px;"><?php echo $SNo; ?></td>
		   <td style="width:550px;" align="left"><input name="Environment" id="Environment" style="font-family:Times New Roman; font-size:11px; width:550px;" value="<?php echo $resPer['Environment']; ?>" /></td>
		    <td style="font-size:11px; width:90px; height:13px;" align="left"><select name="WorkEnStatus" id="WorkEnStatus" style="font-size:11px; width:80px; height:18px;">
		   <option value="<?php echo $resPer['WorkEnStatus']; ?>"><?php if($resPer['WorkEnStatus']=='A'){ echo 'Active'; } else { echo 'Deactive';} ?></option>
		   <option value="<?php if($resPer['WorkEnStatus']=='A'){ echo 'D'; } else { echo 'A';} ?>"><?php if($resPer['WorkEnStatus']=='A'){ echo 'Deactive'; } else { echo 'Active';} ?></option></select></td>	
		   <td align="center" valign="middle" style="font:Georgia; font-size:11px; width:90px;">
<?php if($_SESSION['User_Permission']=='Edit'){ ?>
		 &nbsp;<input type="submit" name="SaveEdit"  value="" class="SaveButton">&nbsp;
<?php } ?>
		 <input type="hidden" name="WorkEnvId" id="WorkEnvId" value="<?php echo $_REQUEST['eid']; ?>"/></td>
		 </tr>
		 </form>
		 
<?php } else { ?>	 
		  <tr>
		   <td align="center" style="font:Georgia; font-size:11px; width:50px;"><?php echo $SNo; ?></td>
		   <td class="font1" align="left" style="width:550px;">&nbsp;<?php echo $resPer['Environment']; ?></td>
		   <td style="font-size:11px; width:90px; height:13px;" align="left">&nbsp;<?php if($resPer['WorkEnStatus']=='A'){ echo 'Active'; } else { echo 'Deactive';} ?></td>
 		   <td align="center" valign="middle" style="font:Georgia; font-size:11px; width:100px;">
			 <a href="#"><img src="images/edit.png" border="0" alt="Edit" onClick="edit(<?php echo $resPer['WorkEnvId']; ?>)"></a>
			 &nbsp;&nbsp;<a href="#"><img src="images/delete.png" alt="Delete" border="0" onClick="del(<?php echo $resPer['WorkEnvId']; ?>)"></a>
		   </td>
		 </tr>
<?php } $SNo++;} ?>
         <tr><td bgcolor="#B6E9E2" colspan="10"></td></tr>
		 <?php if(isset($_REQUEST['action']) && $_REQUEST['action']=="newsave"){ ?>
		 <form name="formEdit" method="post" onSubmit="return validateEdit(this)">
	     <tr>
		   <td align="center" style="font:Georgia; font-size:11px; width:50px;"><?php echo $SNo; ?></td>
		   <td style="width:550px;" align="left"><input name="Environment" id="Environment" style="font-family:Times New Roman; font-size:11px; width:550px;" value="" /></td>
		     <td style="font-size:11px; width:90px; height:13px;" align="left"><select  name="EnvStatus" id="EnvStatus" style="font-size:11px; width:90px; height:18px;">
		                                                                     <option value="A">Active</option><option value="D">Deactive</option></select></td>
		   <td align="center" valign="middle" style="font:Georgia; font-size:11px; width:90px;">
<?php if($_SESSION['User_Permission']=='Edit'){ ?>
			 &nbsp;<input type="submit" name="SaveNew"  value="" class="SaveButton">&nbsp;
<?php } ?>
		   </td>
		 </tr>
		 </form>
		 <?php } ?>
		     
			
		 </table>
	  </td>
    </tr>
<?php if($_SESSION['User_Permission']=='Edit'){ ?>	  
   <tr>
      <td align="Right" class="fontButton"><table border="0" width="550">
		<tr><td align="right">
		<input type="button" name="NewSave" id="NewSave" value="New" onClick="newsave()" <?php if($_REQUEST['action']=="newsave" OR $_REQUEST['action']=="edit"){ echo "style=display:none;"; }?>/>
		<input type="button" name="back" id="back" style="width:90px;" value="Back" onClick="javascript:window.location='Index.php?log=<?php echo $_SESSION['logCheckUser']; ?>'"/>
		<input type="button" name="Refrash" value="Refresh" onclick="javascript:window.location='FeedBack.php'"/>&nbsp;
			     </td>
		</tr></table>
      </td>
   </tr>
<?php } ?>
  </table>  
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
