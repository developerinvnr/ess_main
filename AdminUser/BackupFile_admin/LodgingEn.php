<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}
/*************************************************************************************************************************/
if(isset($_POST['SaveEdit']))
{
 $Sql2=mysql_query("Select * from hrm_lodentitle WHERE LodEntitleId='".$_POST['EditId']."' AND CompanyId=".$CompanyId, $con); $Result2 = mysql_fetch_assoc($Sql2); 
 $SqlInsert2 = mysql_query("INSERT INTO hrm_lodentitle_event(LodEntitleId,GradeValue,CategoryA_City,CategoryB_City,CategoryC_City,CompanyId,CreatedBy,CreatedDate,YearId)VALUES('".$Result2['LodEntitleId']."', '".$Result2['GradeValue']."', '".$Result2['CategoryA_City']."', '".$Result2['CategoryB_City']."', '".$Result2['CategoryC_City']."', '".$Result2['CompanyId']."', ".$Result2['CreatedBy'].", '".$Result2['CreatedDate']."', ".$Result2['YearId'].")", $con); 
  if($SqlInsert2)
    {
	 $SqlUpdate = mysql_query("UPDATE hrm_lodentitle SET CategoryA_City='".$_POST['CategoryA']."', CategoryB_City='".$_POST['CategoryB']."', CategoryC_City='".$_POST['CategoryC']."', CreatedBy=".$UserId.", CreatedDate='".date("Y-m-d")."', YearId=".$YearId." WHERE LodEntitleId=".$_POST['EditId'], $con) or die(mysql_error());
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
<style> .font { color:#ffffff; font-family:Georgia; font-size:11px; width:150px;} .font1 { font-family:"Times New Roman", Times, serif; font-size:11px; width:200px; } 
.font2 { font-size:11px;width:260px;height:18px;} .font4 { color:#1FAD34; font-family:Georgia; font-size:15px;}
.span {display:none; font-family:Courier New; font-size:14px; }.span1 {display:block; font-family:Courier New; font-size:14px; }
.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;}
.SaveButton {background-image:url(images/save.gif); width:20px; height:20px; background-repeat:no-repeat; background-color:#FFFFFF; border-color:#FFFFFF; border-bottom:inherit;}
.TextInput { font-family:"Times New Roman", Times, serif; font-size:11px; width:178px; height:18px;}
</style>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<script type="text/javascript" src="js/MandatoryAjaxCall.js"></script>
<Script type="text/javascript">window.history.forward(1);
function edit(value) { var agree=confirm("Are you sure you want to edit this record?");
if (agree) { var x = "LodgingEn.php?action=edit&eid="+value;  window.location=x;}}
function del(value) { var agree=confirm("Are you sure you want to delete this record?");
if (agree) { var x = "LodgingEn.php?action=delete&did="+value;  window.location=x;}}

/*
function validateEdit(formEdit) 
{
  var CategoryA = formEdit.CategoryA.value;  var Numfilter=/^[0-9.]+$/;  var test_num = Numfilter.test(CategoryA);
  if (CategoryA.length === 0) { alert("You must enter a CategoryA Value.");  return false; }
  if(test_num==false) { alert('Please Enter Only number in the CategoryA Field');  return false; }	
  
  var CategoryB = formEdit.CategoryB.value;  var Numfilter=/^[0-9.]+$/;  var test_num2 = Numfilter.test(CategoryB);
  if (CategoryB.length === 0) { alert("You must enter a CategoryB Value.");  return false; }
  if(test_num2==false) { alert('Please Enter Only number in the CategoryB Field');  return false; }
  
  var CategoryC = formEdit.CategoryC.value;  var Numfilter=/^[0-9.]+$/;  var test_num3 = Numfilter.test(CategoryC);
  if (CategoryC.length === 0) { alert("You must enter a CategoryC Value.");  return false; }
  if(test_num3==false) { alert('Please Enter Only number in the CategoryC Field');  return false; }
} */
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
	  <td align="right" width="360" class="heading">Lodging Entitlement</td>
	  <td align="left">
	    <b><span id="Vtype" class="span">: -&nbsp;LodEn Entitlement</span></b>
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
<?php //*********************************************** Open Entitlement******************************************************?> 
<td align="left" id="type" valign="top" style="display:block; width:100%">             
   <table border="0" width="700">
   
	<tr>
	  <td align="left" width="700">
	     <table border="1" width="700" border="1" bgcolor="#FFFFFF">
		 <tr bgcolor="#7a6189">
		   <td align="center" style="font:Georgia; color:#FFFFFF; font-size:11px; width:50px;"><b>SNo</b></td>
		   <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:110px;" valign="top" align="center"><b>Grade</b></td>
		   <td class="font" valign="top" align="center"><b>Category A City</b></td>
		   <td class="font" valign="top" align="center"><b>Category B City</b></td>
 		   <td class="font" valign="top" align="center"><b>Category C City</b></td>
		   <td valign="top" align="center" style="font:Georgia; font-size:11px; width:100px; color:#FFFFFF;"><b>Action</b></td>
		 </tr>
		
      <?php 
if($CompanyId==1){$sqlLodEn=mysql_query("select * from hrm_lodentitle where CompanyId=".$CompanyId." AND CreatedDate>='2014-01-21' order by GradeId DESC", $con);}
else{$sqlLodEn=mysql_query("select * from hrm_lodentitle where CompanyId=".$CompanyId." order by GradeId DESC", $con);}

	        $SNo=1; while($resLodEn=mysql_fetch_array($sqlLodEn)) {
      if(isset($_REQUEST['action']) && $_REQUEST['action']=="edit" && $_REQUEST['eid']==$resLodEn['LodEntitleId']){ ?>
	      <form name="formEdit" method="post" onSubmit="return validateEdit(this)">
          <tr>
		   <td align="center" style="font:Georgia; font-size:11px; width:50px;"><?php echo $SNo; ?></td>
		   <td style="color:#000000; font-family:Georgia; font-size:11px; width:110px;" align="center">&nbsp;<?php echo $resLodEn['GradeValue']; ?></td>
		   <td class="font1" align="left"><input name="CategoryA" id="CategoryA" class="textInput" value="<?php echo $resLodEn['CategoryA_City']; ?>" /></td>
		   <td class="font1" align="left"><input name="CategoryB" id="CategoryB" class="textInput" value="<?php echo $resLodEn['CategoryB_City']; ?>" /></td>
 		   <td class="font1" align="left"><input name="CategoryC" id="CategoryC" class="textInput" value="<?php echo $resLodEn['CategoryC_City']; ?>" /></td>
		   <input type="hidden" name="EditId" id="EditId" value="<?php echo $_REQUEST['eid']; ?>"/></td>
		   <td align="center" valign="middle" style="font:Georgia; font-size:11px; width:100px;">
<?php if($_SESSION['User_Permission']=='Edit'){?>
			 &nbsp;<input type="submit" name="SaveEdit"  value="" class="SaveButton">&nbsp;
<?php } ?>
		   </td>
		 </tr>
		 </form>
		 
<?php } else { ?>	
		  <tr>
		   <td align="center" style="font:Georgia; font-size:11px; width:50px;"><?php echo $SNo; ?></td>
		   <td style="color:#000000; font-family:Georgia; font-size:11px; width:110px;" align="center">&nbsp;<?php echo $resLodEn['GradeValue']; ?></td>
		   <td class="font1" align="left">&nbsp;<?php echo $resLodEn['CategoryA_City']; ?></td>
		   <td class="font1" align="left">&nbsp;<?php echo $resLodEn['CategoryB_City']; ?></td>
 		   <td class="font1" align="left">&nbsp;<?php echo $resLodEn['CategoryC_City']; ?></td>
		   <td align="center" valign="middle" style="font:Georgia; font-size:11px; width:50px;">
<?php if($_SESSION['User_Permission']=='Edit'){?>
			 <a href="#"><img src="images/edit.png" border="0" alt="Edit" onClick="edit(<?php echo $resLodEn['LodEntitleId']; ?>)"></a>
			 &nbsp;&nbsp;<a href="#"><img src="images/delete.png" alt="Delete" style="display:none" border="0" onClick="del(<?php echo $resLodEn['LodEntitleId']; ?>)"></a>
<?php } ?>
		   </td>
		 </tr>
<?php } $SNo++;} ?>
         <tr><td bgcolor="#B6E9E2" colspan="10"></td></tr>
		 </table>
	  </td>
    </tr>
	  
   <tr>
      <td align="Right" class="fontButton"><table border="0" width="550">
		<tr><td align="right">
		<input type="button" name="back" id="back" style="width:90px;" value="back" onClick="javascript:window.location='Index.php?log=<?php echo $_SESSION['logCheckUser']; ?>'"/>
		<input type="button" name="Refrash" value="refresh" onclick="javascript:window.location='LodgingEn.php'"/>&nbsp;</td>
		</tr></table>
      </td>
   </tr>
  </table>
</td>
<?php //*********************************************** Close EntitleMent******************************************************?>    

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
