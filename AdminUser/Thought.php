<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}
//**********************************************************************************************************************
$TM=date("m")+1; if($TM==13){$TM=1;}
if(isset($_POST['SaveEdit']))
{ 
  $path = $_FILES['ThoughtImg']['tmp_name'];
  $type = $_FILES['ThoughtImg']['type'];
  $size = $_FILES["ThoughtImg"]["size"];
  $filename =strtolower(basename($_FILES['ThoughtImg']['name']));
  $ext = substr($filename, strrpos($filename, '.') + 1);
  $newfilename=$_POST['SNo'].'.jpeg';
  //$newfilename=$_POST['SNo'].'.'.$ext;
  if($size > 512000){ $msg = "Error..Image size is too large."; } 
  //if($ext!='jpeg' OR $ext!='jpg'){$msg = "Error..Please uploaded Only jpg or jpeg images";}
  //elseif($ext!='jpg'){$msg = "Error..Please uploaded Only jpg or jpeg images"; }
  //elseif($ext!='jpeg'){$msg = "Error..Please uploaded Only jpg or jpeg images."; }
  //unlink('AppUploadFile/'.$_REQUEST['FN']);
  //if(file_exists("ThoughtImg/" . $_FILES["ThoughtImg"]["name"]))  { echo $_FILES["file"]["name"] . " already exists. ";  }
  else
  {
   $ThoughtImg  = addslashes (fread (fopen($_FILES["ThoughtImg"]["tmp_name"], "r"), filesize ($_FILES["ThoughtImg"]["tmp_name"])));
  $_SESSION['ThoughtImg']=$ThoughtImg; 
  $SqlInsPhoto = mysql_query("UPDATE hrm_thought SET ImgType='".$type."',ThoughtImg='".$ThoughtImg."',ThoughtText='".$_POST['ThoughtText']."',ThoughtMonth=".$TM.",CreatedBy=".$UserId.",CreatedDate='".date('Y-m-d')."',YearId=".$YearId." WHERE ThoughtId=".$_POST['ThoughtId'], $con);
  }
  if($SqlInsPhoto){ $newname = dirname(__FILE__).'/ThoughtImg/'.$newfilename;  move_uploaded_file($_FILES['ThoughtImg']['tmp_name'],$newname);
                    //$msg = "Day ".$_POST['ThoughtId']." thought images has been updated successfully....."; 
					echo '<script>alert("Day '.$_POST['ThoughtId'].' thought images has been updated successfully....."); window.location="Thought.php";</script>';}     
}

if(isset($_POST['save']))
{
  $path = $_FILES['ThoughtImg']['tmp_name'];
  $type = $_FILES['ThoughtImg']['type'];
  $size = $_FILES["ThoughtImg"]["size"];
  $filename =strtolower(basename($_FILES['ThoughtImg']['name']));
  $ext = substr($filename, strrpos($filename, '.') + 1);
  $newfilename=$_POST['SNo'].'.jpeg';
  //$newfilename=$_POST['SNo'].'.'.$ext;
  if($size > 512000){ $msg = "Error..Image size is too large."; } 
  //if($ext!='jpeg' OR $ext!='jpg'){$msg = "Error..Please uploaded Only jpg or jpeg images";}
  //elseif($ext!='jpg'){$msg = "Error..Please uploaded Only jpg or jpeg images"; }
  //elseif($ext!='jpeg'){$msg = "Error..Please uploaded Only jpg or jpeg images."; }
  //unlink('AppUploadFile/'.$_REQUEST['FN']);
  //if(file_exists("ThoughtImg/" . $_FILES["ThoughtImg"]["name"]))  { echo $_FILES["file"]["name"] . " already exists. ";  }
  else
  {
   $ThoughtImg  = addslashes (fread (fopen($_FILES["ThoughtImg"]["tmp_name"], "r"), filesize ($_FILES["ThoughtImg"]["tmp_name"])));
  $_SESSION['ThoughtImg']=$ThoughtImg; 
  $SqlInsPhoto = mysql_query("UPDATE hrm_thought SET ImgType='".$type."',ThoughtImg='".$ThoughtImg."',ThoughtText='".$_POST['ThoughtText']."',ThoughtMonth=".$TM.",CreatedBy=".$UserId.",CreatedDate='".date('Y-m-d')."',YearId=".$YearId." WHERE ThoughtId=".$_POST['ThoughtId'], $con);
  }
 if($SqlInsPhoto){ $newname = dirname(__FILE__).'/ThoughtImg/'.$newfilename;  move_uploaded_file($_FILES['ThoughtImg']['tmp_name'],$newname);
                    //$msg = "Day ".$_POST['ThoughtId']." thought images has been updated successfully....."; 
					echo '<script>alert("Day '.$_POST['ThoughtId'].' thought images has been updated successfully....."); window.location="Thought.php"; </script>';}  
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
<style> .font { color:#ffffff; font-family:Georgia; font-size:11px; width:200px;} .font1 { font-family:Georgia; font-size:11px; height:14px; width:200px; } 
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
if (agree) { var x = "Thought.php?action=edit&eid="+value;  window.location=x;}}

function OpenThoughtImg(v)
{window.open("ThoughtImg.php?action=Img&value="+v,"Img","menubar=no,scrollbars=yes,resizable=no,directories=no,width=500,height=400");}

function validate(form) 
{ 
  var ThoughtImg = form.ThoughtImg.value; 
  if (ThoughtImg.length === 0) { alert("Please Select Thought Images.");  return false; }
   <!----------------Check PHOTO Validation--------------------------------->
  var ext = ThoughtImg.substring(ThoughtImg.lastIndexOf('.') + 1);
  if(ext == "gif" || ext == "GIF" || ext == "png" || ext == "PNG" || ext == "JPEG" || ext == "jpeg" || ext == "jpg" || ext == "JPG" || ext == "bmp" || ext == "BMP")
  {return true;} else { alert("Upload gif,bmp or jpg images only"); return false; }
   <!----------------Check PHOTO Validation Close--------------------------------->
}  

function SendThought()
{
 DeptId=document.getElementById("DepartmentE").value;
 if(DeptId==''){alert("Please Select Department?"); return false; }
 var agree=confirm("Are you sure you want to send thought for day?");
 if (agree) { var x = "Thought.php?action=SendThought&DeptId="+DeptId;  window.location=x;}
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
<?php  $m=date("m"); $year=date("Y");
       if($m==1 OR $m==3 OR $m==5 OR $m==7 OR $m==8 OR $m==10 OR $m==12){ $day=31;}
       elseif($m==2){ if(date("Y")==2012 OR date("Y")==2016 OR date("Y")==2020 OR date("Y")==2024 OR date("Y")==2028 OR date("Y")==2032) { $day=29; } else { $day=28;}}
       elseif($m==4 OR $m==6 OR $m==9 OR $m==11){ $day=30;}
?>	  
<table border="0" style="margin-top:0px; width:100%; height:300px;">
 <tr>
  <td align="left" height="20" valign="top" colspan="3">
   <table border="0">
    <tr>
	  <td align="right" width="215" class="heading">Thought for the Day</td>
	  <td align="right" width="215" style="font-family:Georgia; font-size:17px; color:#804040; ">
	    <b>(Month : <u><?php echo date("F"); ?></u>)</b>
	  </td>
	  <td class="font4" style="left">&nbsp;&nbsp;&nbsp;<b><?php echo $msg; ?></b></td>
	</tr>
   </table>
  </td>
 </tr>
<?php if(($_SESSION['UserType']=='S' OR $_SESSION['UserType']=='A') AND $_SESSION['login'] = true) { ?>	
 <tr>
 <td width="50">&nbsp;</td>
<?php //*********************************************** Open Department******************************************************?> 
<td align="left" id="type" valign="top" style="display:block; width:100%">             
   <table border="0" width="1000">
   
	<tr>
	  <td align="left" width="900">
	     <table width="900" border="1">
		 <tr>
		   <td bgcolor="#7a6189" align="center" style="font:Georgia; color:#FFFFFF; font-size:11px; width:50px;"><b>Day</b></td>
		   <td bgcolor="#7a6189" style="color:#ffffff; font-family:Georgia; font-size:11px; width:230px;" valign="top" align="center"><b>ThoughtImages/ Database</b></td>
		   <td bgcolor="#7a6189" style="color:#ffffff; font-family:Georgia; font-size:11px; width:180px;" valign="top" align="center"><b>ThoughtImages/ Folder</b></td>
		   <td bgcolor="#7a6189" style="color:#ffffff; font-family:Georgia; font-size:11px; width:250px;" valign="top" align="center"><b>Thought Text</b></td>
		   <td bgcolor="#7a6189" valign="top" align="center" style="font:Georgia; font-size:11px; width:50px; color:#FFFFFF"><b>Action</b></td>
		 </tr>
<?php $sqlTh=mysql_query("select * from hrm_thought order by ThoughtDay ASC", $con); $SNo=1; while($resTh=mysql_fetch_array($sqlTh)) {
      if(isset($_REQUEST['action']) && $_REQUEST['action']=="edit" && $_REQUEST['eid']==$resTh['ThoughtId']){ ?>
	      <form enctype="multipart/form-data" name="form" method="post" onSubmit="return validate(this)">
          <tr bgcolor="#FFFFFF">
		   <td align="center" style="font:Georgia; font-size:11px; width:50px;">
		   <input type="hidden" name="SNo" value="<?php echo $SNo; ?>" /><?php echo $SNo; ?></td>
		   <td style="width:220px;" align="left">
		   <input type="file" name="ThoughtImg" id="ThoughtImg" size="23" style="width:200px; height:19px;"/>
		   </td>
		   <td>&nbsp;</td>
		   <td style="width:250px;" align="left">
  <input name="ThoughtText" id="ThoughtText" maxlength="200" style="font-family:Georgia; font-size:11px; width:270px; height:18px;" value="<?php echo $resTh['ThoughtText']; ?>"></td>
		   <td align="center" valign="middle" style="font:Georgia; font-size:11px; width:50px;" bgcolor="<?php if($resTh['ThoughtMonth']==date("m")+1){ echo '#F3D15C'; } ?>">
<?php if($_SESSION['User_Permission']=='Edit'){?>
		   &nbsp;<input type="submit" name="<?php if($resTh['ImgType']!=''){echo 'SaveEdit';} else {echo 'save';}?>"  value="" class="SaveButton">
<?php } ?>
		   &nbsp;<input type="hidden" name="ThoughtId" id="ThoughtId" value="<?php echo $_REQUEST['eid']; ?>"/>
		   </td>
		 </tr>
		 </form>
		 
<?php } else { if($SNo<=$day) { ?>	 
  <tr bgcolor="<?php if(date("w",strtotime(date($year.'-'.$m.'-'.$SNo)))!=0) {echo '#FFFFFF';} else {echo '#008000';} ?>" >
   <td align="center" style="font:Georgia; font-size:11px; width:50px;"><?php echo $SNo;?></td>
   <td style="font-family:Georgia; font-size:11px; width:220px;" align="left" valign="top">
   <?php if(date("w",strtotime(date($year.'-'.$m.'-'.$SNo)))!=0) { ?>
   <a href="#" onClick="OpenThoughtImg(<?php echo $resTh['ThoughtDay']; ?>)" style="text-decoration:none;">
   <?php echo "<img style='width:150; height:20;' src=\"show_Thought.php?id=".$resTh['ThoughtDay']."\">\n"; ?>
   &nbsp;&nbsp;&nbsp;<?php if($resTh['ImgType']!=''){echo '<font color="#008000"><b>Uploaded</b></font>';} else{echo '';} ?></a>
   <?php } else { echo '&nbsp;<font style="color:#FFFFFF;font-family:Times New Roman;font-size:16px;"><b>Sunday</b></font>';}?>
   </td>
   <td style="font-family:Georgia; font-size:11px; width:180px;" align="left" valign="top">
   <img src="ThoughtImg/<?php echo $resTh['ThoughtDay']; ?>.jpeg" style="width:150; height:20;" /></td>
   <td style="font-family:Georgia; font-size:11px; width:250px;" align="left" valign="top">&nbsp;<?php echo $resTh['ThoughtText']; ?></td>
   <td align="center" valign="middle" style="font:Georgia; font-size:11px; width:50px;" bgcolor="<?php if($resTh['ThoughtMonth']==$TM){ echo '#F3D15C'; } ?>">
<?php if($_SESSION['User_Permission']=='Edit'){?>
	 <?php if(date("w",strtotime(date($year.'-'.$m.'-'.$SNo)))!=0) { ?>
	 <a href="#"><img src="images/edit.png" border="0" alt="Edit" onClick="edit(<?php echo $resTh['ThoughtId']; ?>)"></a>
	 <?php } ?>
<?php } ?>
   </td>
 </tr>
<?php } } $SNo++;} ?>
		 </table>
	  </td>
    </tr>
	  
   <tr>
      <td align="Right" class="fontButton"><table border="0" width="550">
		<tr><td align="right">
		<input type="button" name="Back" id="Back" style="width:90px;" value="back" onClick="javascript:window.location='Index.php?log=<?php echo $_SESSION['logCheckUser']; ?>'"/>
		<input type="button" name="Refrash" value="refresh" onclick="javascript:window.location='Thought.php'"/>&nbsp;
			     </td> 
		</tr></table>
      </td>
   </tr>
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
