<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}
if($_SESSION['login'] = true){require_once('PhpFile/DepartmentP.php'); } else {$msg= "Session Expiry..............."; }
?>
<?php 
if(isset($_POST['AddNewAsst']))
{ 
   $SqlInseart = mysql_query("INSERT INTO hrm_assest_name(AssestName, CompanyId, AssestStatus, CreatedBy,CreatedDate,YearId) VALUES('".$_POST['AsstName']."', '".$CompanyId."', 'A', '".$UserId."','".date('Y-m-d')."','".$YearId."')", $con); 
   if($SqlInseart){ $msg = "Data has been Inserted successfully..."; }
}
if(isset($_POST['ChangeAsst']))
{ $SqlUpdate = mysql_query("UPDATE hrm_assest_name SET AssestName='".$_POST['AsstName']."' WHERE AssestNameId='".$_POST['AsstId']."'", $con); 
     if($SqlUpdate){ $msg = "Data has been Updeted successfully...";}  
}
if(isset($_REQUEST['action']) && $_REQUEST['action']=="delete")
{
  $SqlDelete=mysql_query("UPDATE hrm_assest_name SET AssestStatus='De' WHERE AssestNameId=".$_REQUEST['did'], $con) or die(mysql_error());
  if($SqlDelete) { $msg = "Data has been deleted successfully..."; }
}
?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style> .font { color:#ffffff; font-family:Georgia; font-size:11px; width:250px;} .font4 { color:#1FAD34; font-family:Georgia; font-size:13px; height:10px;}
.span {display:none; font-family:Courier New; font-size:14px; }.span1 {display:block; font-family:Courier New; font-size:14px; }
.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;}
</style>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<script type="text/javascript" src="js/MandatoryAjaxCall.js"></script>
<Script type="text/javascript">window.history.forward(1);
function selectAsst(value){ 
    document.getElementById("ChangeAsst").style.display = 'block';
	document.getElementById("DeleteAsst").style.display = 'block';
	document.getElementById("AddNewAsst").style.display = 'none';
	var url = 'GetAssest.php';	var pars = 'Asstid='+value;	var myAjax = new Ajax.Request(
	url, 
	{
		method: 'post', 
		parameters: pars, 
		onComplete: show_NewDept
	});
}
function show_NewDept(originalRequest)
{ document.getElementById('Asst').innerHTML = originalRequest.responseText; }


function deleteAsst() { var agree=confirm("Are you sure you want to delete this record?");
if (agree) { var a = document.getElementById("AsstId").value; var x = "TypeAssest.php?action=delete&did="+a;  window.location=x;}}



function validate(formAsst) 
{
  var AsstName = formAsst.AsstName.value;  var filter=/^[a-zA-Z. /]+$/; var test_bool = filter.test(AsstName);
  if (AsstName.length === 0) { alert("You must enter a assest name.");  return false; }
  //if(test_bool==false) { alert('Please enter only alphabets in the assest name field');  return false; }	
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
	  <td align="right" width="235" class="heading">Name Of Assest</td>
	  <td align="left">
	    <b><span id="Vtype" class="span">: -&nbsp;Type Of Assest</span></b>
	  </td>
	  <td class="font4" style="left">&nbsp;&nbsp;&nbsp;<b><?php echo $msg; ?></b></td>
	</tr>
   </table>
  </td>
 </tr>
<?php if(($_SESSION['UserType']=='M' OR $_SESSION['UserType']=='S' OR $_SESSION['UserType']=='A' OR $_SESSION['UserType']=='U') AND $_SESSION['login'] = true) { ?>	
 <tr>
 <td style="width:50px;" valign="top" align="center">&nbsp;
   <table border="0" cellpadding="0px;" align="center">
<tr><td align="center">&nbsp;</td></tr>
  </table>
 </td>
 <td width="50">&nbsp;</td>
 <?php //*********************************************** Open Department ******************************************************?> 
 <td align="left" id="type" valign="top" style="display:block;">             
 <form  name="formAsst" method="post" onSubmit="return validate(this)">
   <table border="0">
    <tr>
	 <td align="left"><table border="0" width="550">
	   <tr>
		  <td class="td1" style="font-size:11px; width:300px;" valign="top">
		   <span id="Asst">
		      <table>
			     <tr><td style="font-size:11px; height:18px;">Assest Name :</td><td><input name="AsstName" id="AsstName" style="font-size:11px; width:220px; height:18px;"/></td></tr>
			  </table>
		   </span>
		   </td>
		  <td align="right" style="font-size:11px; width:180px;">
		                <select style="width:180px; background-color:#F1EDF8;" name="AsstSelect" id="AsstSelect" size="8" onChange="selectAsst(this.value)">
	<?php $SqlAsst=mysql_query("select * from hrm_assest_name where AssestStatus='A' AND CompanyId=".$CompanyId." order by AssestName ASC", $con); while($ResAsst=mysql_fetch_array($SqlAsst)) { ?>
						<option value="<?php echo $ResAsst['AssestNameId']; ?>"><?php echo $ResAsst['AssestName']; ?><?php } ?>
						</select>
		 </td>
		</tr>
	  </table>
	  </td>
    </tr>
	  
   <tr>
      <td align="Right" class="fontButton"><table border="0" width="550">
		<tr>
		 <td align="right"><input type="submit" name="ChangeAsst" id="ChangeAsst" style="width:90px; display:none;" value="change"></td>
		 <td align="right" style="width:70px;"><input type="button" name="DeleteAsst" id="DeleteAsst" value="delete" style="width:90px; display:none;" onClick="deleteAsst()">
		                                       <input type="submit" name="AddNewAsst" id="AddNewAsst" style="width:90px; display:block;" value="add new"></td>
		<td align="right" style="width:80px;"><input type="button" name="back" id="back" style="width:90px;" value="back" onClick="javascript:window.location='Index.php?log=<?php echo $_SESSION['logCheckUser']; ?>'"/></td>									   
		 <td align="right" style="width:70px;"><input type="button" name="RefreshAsst" id="RefreshAsst" style="width:90px;" value="refresh" onClick="javascript:window.location='TypeAssest.php'"/></td>
		</tr></table>
      </td>
   </tr>
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
