<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}
//**********************************
$_SESSION['EmpID']=$_REQUEST['ID'];
$EMPID=$_SESSION['EmpID'];
//**********************************
$SqlEmp = mysql_query("SELECT *,hrm_employee_general.*,hrm_employee_personal.* FROM hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID WHERE hrm_employee.EmployeeID=".$EMPID, $con) or die(mysql_error());  $ResEmp=mysql_fetch_assoc($SqlEmp);
$Ename = $ResEmp['Fname'].'&nbsp;'.$ResEmp['Sname'].'&nbsp;'.$ResEmp['Lname']; $LEC=strlen($ResEmp['EmpCode']); 
      if($LEC==1){$EC='000'.$ResEmp['EmpCode'];} if($LEC==2){$EC='00'.$ResEmp['EmpCode'];} if($LEC==3){$EC='0'.$ResEmp['EmpCode'];} if($LEC>=4){$EC=$ResEmp['EmpCode'];}
//**********************************


if(isset($_POST['EditPhotoE']))
{  
 $uploaded=0; $ext="";
 if((!empty($_FILES["EmpPhoto"])) && ($_FILES['EmpPhoto']['error'] == 0))
  {
   $filename=strtolower(basename($_FILES['EmpPhoto']['name']));
   $fileSize=$_FILES['EmpPhoto']['size'];
   $type = $_FILES['EmpPhoto']['type'];
   $EmpPhoto  = addslashes (fread (fopen($_FILES["EmpPhoto"]["tmp_name"], "r"), filesize ($_FILES["EmpPhoto"]["tmp_name"])));
   if($fileSize>1000000)
    {
	 $msg = "Your file is too large."; $ok=0;} 
     $ext = substr($filename, strrpos($filename, '.') + 1);
	 if($ext == "jpg" || $ext == "jpeg"){$extt='jpg';}
     if (($ext == "jpg" || $ext == "jpeg") && ($_FILES["EmpPhoto"]["size"] < 1000000))
      { 
	   
	    $newfilename=$ResEmp['EmpCode'].'.'.$extt;
	    $ext=".".$ext;  $newname = dirname(__FILE__).'/EmpImg'.$CompanyId.'Emp/'.$newfilename; //Determine the path to which we want to save this file
        if((move_uploaded_file($_FILES['EmpPhoto']['tmp_name'],$newname)))
         { 
		  $SqlInsPhoto = mysql_query("UPDATE hrm_employee_photo SET PhotoType='".$type."',EmpPhoto='".$EmpPhoto."',CreatedBy=".$UserId.",CreatedDate='".date('Y-m-d')."',YearId=".$YearId." WHERE EmployeeID=".$EMPID, $con);
		 
		 $msg="File uploaded successfully!"; $uploaded=1; 
		 
		 }
        else{$msg = "Error:!";}
       } 
      else { $msg = "Error: Only jpg files is allowed less than 1000KB"; }
     } 
else {$msg = "Error! File is not uploaded!"; }
}


/*
if(isset($_POST['EditPhotoE']))
{  
  $maxImageSize = 51200;  //51,200-50kb, 65,597-64kb, 1,31,072-128kb, 2,62,144-256kb, 5,24,288-512kb, 10,48,576-1mb
  $size = $_FILES['EmpPhoto']["size"];
  $path = $_FILES['EmpPhoto']['tmp_name'];
  $type = $_FILES['EmpPhoto']['type'];
  $EmpPhoto  = addslashes (fread (fopen($_FILES["EmpPhoto"]["tmp_name"], "r"), filesize ($_FILES["EmpPhoto"]["tmp_name"])));
  $_SESSION['EmpPhoto']=$EmpPhoto; 
  
  if($size>$maxImageSize){$msg = "File size can't be more than 50 kb";}
  else {
         $SqlInsPhoto = mysql_query("UPDATE hrm_employee_photo SET PhotoType='".$type."',EmpPhoto='".$EmpPhoto."',CreatedBy=".$UserId.",CreatedDate='".date('Y-m-d')."',YearId=".$YearId." WHERE EmployeeID=".$EMPID, $con);
         if($SqlInsPhoto) { $row = mysql_num_rows($sql);  if($row==1) { $msg = "Photo has been Updated successfully..."; } }
       }
}
*/

?> 
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet"/>
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<link rel="stylesheet" type="text/css" href="src/css/jscal2.css"/>
<link rel="stylesheet" type="text/css" href="src/css/border-radius.css"/>
<link rel="stylesheet" type="text/css" href="src/css/steel/steel.css"/>
<script type="text/javascript" src="src/js/jscal2.js"></script>
<script type="text/javascript" src="src/js/lang/en.js"></script>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<script type="text/javascript" src="js/EmpMasterAddNewAjaxCall.js"></script>
<Script type="text/javascript">window.history.forward(1);</script>
<script language="javascript">
function RefPhoto()
{document.getElementById("EmpPhoto").value = ''; }	


function validate(formPhoto) 
{ 
  var EmpPhoto = formPhoto.EmpPhoto.value; 
  if (EmpPhoto.length === 0) { alert("Please Select Employee Photos.");  return false; }
   <!----------------Check PHOTO Validation--------------------------------->
  var ext = EmpPhoto.substring(EmpPhoto.lastIndexOf('.') + 1);
  if(ext == "jpg" || ext == "jpeg" || ext == "JPEG" || ext == "JPG")
  {return true;} else { alert("Upload jpg images only"); return false; }
  
 
   <!----------------Check PHOTO Validation Close--------------------------------->
}  

function EditPhoto()
{document.getElementById("EditPhotoE").style.display = 'block'; document.getElementById("ChangePhoto").style.display = 'none';
 document.getElementById("EmpPhoto").disabled = false;
}


</script>
</head>
<body class="body">
<table class="table">
<tr><td><table class="menutable"><tr><td><?php if($_SESSION['login'] = true){require_once("AMenu.php"); } ?></td></tr></table></td></tr>
<tr><td valign="top">
      <table width="100%" style="margin-top:0px;" border="0">
	    <tr><td valign="top"><?php if($_SESSION['login'] = true){require_once("AWelcome.php"); } ?></td></tr>
	    <tr>
	        <td valign="top" align="center"  width="100%" id="MainWindow"><br>
<?php //**********************************************START*****START*****START******START******START***************************************************************?>
  <table border="0" style="margin-top:0px; width:100%; height:300px;">
 <tr>
  <td align="left" height="20" valign="top" colspan="4">
   <table border="0">
    <tr>
	  <td align="right" width="310" class="heading">Employee Photo</td>
	  <td>&nbsp;&nbsp;&nbsp;</td>
	  <td style="font-family:Times New Roman; font-size:16px; color:#287126; font-weight:bold;"><font color="#FF0000" size="4">*</font>  - Require Field</td>
	   <td><table><tr><td class="font4" style="left">&nbsp;</td></tr></table></td>
	</tr>
   </table>
  </td>
 </tr>
<?php if(($_SESSION['UserType']=='M' OR $_SESSION['UserType']=='S' OR $_SESSION['UserType']=='A' OR $_SESSION['UserType']=='U') AND $_SESSION['login'] = true) { ?>	
 <tr>
 <td style="width:100px;" align="center" valign="top"><?php if($_REQUEST['Event']=='Edit') { include("EmpMasterMenu.php"); } ?></td>
 
<td style="width:50px;" align="center" valign="top"></td>
<?php //*********************************************************************************************************************************************************?>
 <?php if($_REQUEST['Event']=='Edit') {?>
 <td align="left" id="Ephoto" valign="top">             
 <form enctype="multipart/form-data" name="formPhoto" method="post" onSubmit="return validate(this)">
<table border="0">
<tr>
 <td>
  <table><tr>
 <td class="All_100">EmpCode :</td><td class="All_60"><input name="EmpCode" id="EmpCode" class="All_50" style="background-color:#E6EBC5;" value="<?php echo $EC; ?>" Readonly></td>
 <td class="All_50">Name :</td><td class="All_220"><input name="EmpName" id="EmpName" style="width:210px; height:18px; font-size:11px;background-color:#E6EBC5;text-transform:uppercase;" value="<?php echo $Ename; ?>" Readonly></td>
  </tr></table>
 </td>
</tr>
<tr> 
<td align="left" valign="top">
<table border="0" width="750" id="TEmp" style="display:block;">
<?php /*<tr><td class="All_100" valign="top">Photo :</td><td class="All_250"><input type="file" name="EmpPhoto" id="EmpPhoto" size="25" class="All_250" disabled></td></tr>*/ ?>
<tr><td>&nbsp;</td></tr>
<tr>
   <td style="font-family:Times New Roman; font-size:14px; font-weight:bold; width:120px;">Upload Photo :&nbsp;</td>
   <td><input type="file" size="35" name="EmpPhoto" id="EmpPhoto" style="width:300px;" disabled><INPUT TYPE="hidden" name="MAX_FILE_SIZE" value="1000000"></td>
</tr>
<tr><td colspan="2"><span id="msgspan" style="font-family:Times New Roman;font-size:16px;color:#287126; font-weight:bold;"><?php echo $msg; ?></span></td></tr>
<?php /*
 <tr>  
   <td style="font-family:Times New Roman; font-size:14px; font-weight:bold; width:120px;">Name Of File :&nbsp;</td>
   <td><input type="text" name="UpFileName" id="UpFileName" style="width:310px;"></td>
   <td><input type="submit" name="AddUploadE" id="AddUplaodE" style="width:60px;text-align:center; background-color:#95CAFF;" value="Save"></span></td>
 </tr> 
*/ ?> 
<tr> 
<td class="All_100" valign="top">&nbsp;</td><td class="All_250" style="font-family:Times New Roman; color:#FF0000; font-size:14px;">&nbsp;Maximum Image Size : 50kb<br><br></td> 
</tr>
<tr>
  <td align="Right" class="fontButton" colspan="6"><table border="0" align="right" class="fontButton">
	<tr>	 
<?php if($_SESSION['User_Permission']=='Edit'){?>
	  <td align="right" style="width:90px;"><input type="button" name="ChangePhoto" id="ChangePhoto" style="width:90px;display:block;" value="Edit" onClick="EditPhoto()">
		<input type="submit" name="EditPhotoE" id="EditPhotoE" style="width:90px;display:none;" value="save"></td>
<?php } ?>
	  <td align="right" style="width:90px;"><input type="button" name="RefreshPhotoE" id="RefreshPhotoE" style="width:90px;" value="refresh" onClick="javascript:window.location='EmpPhoto.php?ID=<?php echo $EMPID; ?>&Event=Edit'"/></td>
	</tr></table>
  </td>
</tr>
</table>
</td>
<?php include("EmpImg.php"); ?>
</tr>
</table>
</form>  
</td>
 <?php } ?>
<?php //*********************************************************************************************************************************************************?>
</tr>
<?php } ?> 
</table>
				
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
<?php //**********************************************END*****END*****END******END******END***************************************************************?>	
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

