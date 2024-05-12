<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}
if($_SESSION['login'] = true){require_once('PhpFile/CityClassificationP.php'); } else {$msg= "Session Expiry..............."; }
?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style> .font { color:#ffffff; font-family:Georgia; font-size:11px; width:200px;} .font1 { font-family:Georgia; font-size:11px; width:200px; } 
.font2 { font-size:11px;width:260px;height:18px;} .font4 { color:#1FAD34; font-family:Georgia; font-size:15px;}
.span {display:none; font-family:Courier New; font-size:14px; }.span1 {display:block; font-family:Courier New; font-size:14px; }
.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;}
.SaveButton {background-image:url(images/save.gif); width:20px; height:20px; background-repeat:no-repeat; background-color:#FFFFFF; border-color:#FFFFFF; border-bottom:inherit;}
.EditSelect { font-family:Georgia; font-size:11px; width:200px; height:18px;}
</style>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<script type="text/javascript" src="js/MandatoryAjaxCall.js"></script>
<Script type="text/javascript">window.history.forward(1);
function edit(value) { var agree=confirm("Are you sure you want to edit this record?");
if (agree) { var x = "CityClassification.php?action=edit&eid="+value;  window.location=x;}}
function del(value) { var agree=confirm("Are you sure you want to delete this record?");
if (agree) { var x = "CityClassification.php?action=delete&did="+value;  window.location=x;}}
function newsave() { var x = "CityClassification.php?action=newsave";  window.location=x;}
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
	  <td align="right" width="360" class="heading">City Clasification</td>
	  <td align="left">
	    <b><span id="Vtype" class="span">: -&nbsp;City Classification</span></b>
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
	<tr><td align="center">&nbsp;</td></tr>
   </table>
 </td>
 <td width="100">&nbsp;</td>
<?php //*********************************************** Open Department******************************************************?> 
<td align="left" id="type" valign="top" style="display:block; width:100%">             
  <form  name="formCityC" method="post" onSubmit="return validate(this)">
   <table border="0" width="800">
   
	<tr>
	  <td align="left" width="850">
	     <table border="1" width="800" border="1" bgcolor="#FFFFFF">
		 <tr bgcolor="#7a6189">
		   <td align="center" style="font:Georgia; color:#FFFFFF; font-size:11px; width:50px;"><b>SNo</b></td>
		   <td class="font" valign="top" align="center"><b>Category A City</b></td>
		   <td class="font" valign="top" align="center"><b>Category B City</b></td>
 		   <td class="font" valign="top" align="center"><b>Category C City</b></td>
		   <td valign="top" align="center" style="font:Georgia; font-size:11px; width:100px; color:#FFFFFF"><b>Action</b></td>
		 </tr>
      <?php $sqlCity=mysql_query("select * from hrm_citycategory where CityCategoryStatus='A' AND CompanyId=".$CompanyId, $con); $SNo=1; while($resCity=mysql_fetch_array($sqlCity)) {
      if(isset($_REQUEST['action']) && $_REQUEST['action']=="edit" && $_REQUEST['eid']==$resCity['CityCategoryId']){ ?>
	      <form name="formEdit" method="post" onSubmit="return validateEdit(this)">	
          <tr>
		   <td align="center" style="font:Georgia; font-size:11px; width:50px;"><?php echo $SNo; ?></td>
		   <td class="font1" align="left">
		          <select name="CategoryA" id="CategoryA" class="EditSelect">
		          <option value="<?php echo $resCity['CategoryA_City']; ?>"><?php echo $resCity['CategoryA_City']; ?></option>
				  <?php $sqlC1=mysql_query("select * from hrm_city order by CityName ASC", $con); while($resC1=mysql_fetch_array($sqlC1)) { ?>
				  <option value="<?php echo $resC1['CityName']; ?>"><?php echo $resC1['CityName']; ?></option><?php } ?>
				  <option value="Other">Other</option>
				  </select></td>
		   <td class="font1" align="left">
		          <select name="CategoryB" id="CategoryB" class="EditSelect">
		          <option value="<?php echo $resCity['CategoryB_City']; ?>"><?php echo $resCity['CategoryB_City']; ?></option>
				  <?php $sqlC2=mysql_query("select * from hrm_city order by CityName ASC", $con); while($resC2=mysql_fetch_array($sqlC2)) { ?>
				  <option value="<?php echo $resC2['CityName']; ?>"><?php echo $resC2['CityName']; ?></option><?php } ?>
				  <option value="Other">Other</option>
				  </select></td>
 		   <td class="font1" align="left">
		          <select name="CategoryC" id="CategoryC" class="EditSelect">
		          <option value="<?php echo $resCity['CategoryC_City']; ?>"><?php echo $resCity['CategoryC_City']; ?></option>
				  <?php $sqlC3=mysql_query("select * from hrm_city order by CityName ASC", $con); while($resC3=mysql_fetch_array($sqlC3)) { ?>
				  <option value="<?php echo $resC3['CityName']; ?>"><?php echo $resC3['CityName']; ?></option><?php } ?>
				  <option value="Other">Other</option>
				  </select></td>
		   <td align="center" valign="middle" style="font:Georgia; font-size:11px; width:100px;">
<?php if($_SESSION['User_Permission']=='Edit'){?>
		 &nbsp;<input type="submit" name="SaveEdit"  value="" class="SaveButton">&nbsp;<input type="hidden" name="CityClassId" id="CityClassId" value="<?php echo $_REQUEST['eid']; ?>"/>
<?php } ?>
		   </td>
		 </tr>
		 </form>
		 
<?php } else { ?>	 
		  <tr>
		   <td align="center" style="font:Georgia; font-size:11px; width:50px;"><?php echo $SNo; ?></td>
		   <td class="font1" align="left">&nbsp;<?php echo $resCity['CategoryA_City']; ?></td>
		   <td class="font1" align="left">&nbsp;<?php echo $resCity['CategoryB_City']; ?></td>
 		   <td class="font1" align="left">&nbsp;<?php echo $resCity['CategoryC_City']; ?></td>
		   <td align="center" valign="middle" style="font:Georgia; font-size:11px; width:100px;">
			 <a href="#"><img src="images/edit.png" border="0" alt="Edit" onClick="edit(<?php echo $resCity['CityCategoryId']; ?>)"></a>
			 &nbsp;&nbsp;<a href="#"><img src="images/delete.png" alt="Delete" border="0" onClick="del(<?php echo $resCity['CityCategoryId']; ?>)"></a>
		   </td>
		 </tr>
<?php } $SNo++;} ?>
         <tr><td bgcolor="#B6E9E2" colspan="10"></td></tr>
		 <?php if(isset($_REQUEST['action']) && $_REQUEST['action']=="newsave"){ ?>
		 <form name="formNew" method="post" onSubmit="return validateNew(this)">
	     <tr>
		   <td align="center" style="font:Georgia; font-size:11px; width:50px;"><?php echo $SNo; ?></td>
		   <td class="font1" align="left">
		          <select name="CategoryA" id="CategoryA" class="EditSelect">
				  <?php $sqlC=mysql_query("select * from hrm_city order by CityName ASC", $con); while($resC=mysql_fetch_array($sqlC)) { ?>
				  <option value="<?php echo $resC['CityName']; ?>"><?php echo $resC['CityName']; ?></option><?php } ?>
				  <option value="Other">Other</option>
				  </select></td>
		   <td class="font1" align="left">
		          <select name="CategoryB" id="CategoryB" class="EditSelect">
				  <?php $sqlC=mysql_query("select * from hrm_city order by CityName ASC", $con); while($resC=mysql_fetch_array($sqlC)) { ?>
				  <option value="<?php echo $resC['CityName']; ?>"><?php echo $resC['CityName']; ?></option><?php } ?>
				  <option value="Other">Other</option>
				  </select></td>
 		   <td class="font1" align="left">
		          <select name="CategoryC" id="CategoryC" class="EditSelect">
				  <?php $sqlC=mysql_query("select * from hrm_city order by CityName ASC", $con); while($resC=mysql_fetch_array($sqlC)) { ?>
				  <option value="<?php echo $resC['CityName']; ?>"><?php echo $resC['CityName']; ?></option><?php } ?>
				  <option value="Other">Other</option>
				  </select></td>
		   <td align="center" valign="middle" style="font:Georgia; font-size:11px; width:100px;">
<?php if($_SESSION['User_Permission']=='Edit'){?>
			 &nbsp;<input type="submit" name="SaveNew"  value="" class="SaveButton">&nbsp;
<?php } ?>
		   </td>
		 </tr>
		 </form>
		 <?php } ?>
		     
			
		 </table>
	  </td>
    </tr>
<?php if($_SESSION['User_Permission']=='Edit'){?>	  
   <tr>
      <td align="Right" class="fontButton"><table border="0" width="550">
		<tr>
		<td align="right">
		<input type="button" name="NewSave" id="NewSave" value="new" onClick="newsave()" <?php if($_REQUEST['action']=="newsave" OR $_REQUEST['action']=="edit"){ echo "style=display:none;"; }?>/>
		<input type="button" name="back" id="back" style="width:90px;" value="back" onClick="javascript:window.location='Index.php?log=<?php echo $_SESSION['logCheckUser']; ?>'"/>
				  <input type="button" name="Refrash" value="refresh" onclick="javascript:window.location='Cityclassification.php'"/>&nbsp;
			     </td>
		</tr></table>
      </td>
   </tr>
<?php } ?>
  </table>
 </form>     
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
