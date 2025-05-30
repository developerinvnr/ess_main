<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}
if($_SESSION['login'] = true){require_once('PhpFile/DepartmentP.php'); } else {$msg= "Session Expiry..............."; }
?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style type="text/css">
.thc{ font-family:Times New Roman;font-size:14px;height:25px;text-align:center; background-color:#7a6189;color:#FFFFFF;font-weight:bold; }
.tdl{ font-family:Times New Roman;font-size:14px;text-align:left;background-color:#FFFFFF; }
.tdc{ font-family:Times New Roman;font-size:14px;text-align:center;background-color:#FFFFFF; }
.inner_table{height:400px;overflow-y:auto;width:auto;}
</style>
<!-- <script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<script type="text/javascript" src="js/MandatoryAjaxCall.js"></script> -->
<script src="js/jquery-1.9.1.js"></script>
<script type="text/javascript" src="js/jquery.freezeheader.js"></script>
<Script type="text/javascript">window.history.forward(1);
$(document).ready(function () { $("#table1").freezeHeader({ 'height': '450px' }); })

function deleteDept(value) { var agree=confirm("Are you sure you want to delete this record?");
if (agree) { var a = document.getElementById("DeptId").value; var x = "Department.php?action=delete&did="+a;  window.location=x;}}

function validate(formDept) 
{
  var DeptName = formDept.DeptName.value;  var filter=/^[a-zA-Z. /]+$/; var test_bool = filter.test(DeptName);
  if (DeptName.length === 0) { alert("You must enter a Department Name.");  return false; }
  if(test_bool==false) { alert('Please Enter Only Alphabets in the Department Name Field');  return false; }	
  
  var DeptCode = formDept.DeptCode.value;  var filter=/^[A-Z. /]+$/; var test_bool = filter.test(DeptCode);
  if (DeptCode.length === 0) { alert("You must enter a Department Code.");  return false; }
  if(test_bool==false) { alert('Please Enter Only Capital Alphabets in the Department Code Field');  return false; }
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
<?php //**********************************************************************?>
<?php //********************START*****START*****START******START******START**********************************?>
<?php //********************************************************************?>
	  
<table border="0" style="margin-top:0px; width:100%; height:300px;">
 <tr>
  <td align="left" height="20" valign="top" colspan="3">
   <table border="0">
    <tr>
	  <td align="left" width="350" class="heading">Department Name:</td>
	  <td class="font4" style="left">&nbsp;&nbsp;&nbsp;<b><?php echo $msg; ?></b></td>
	</tr>
   </table>
  </td>
 </tr>
<?php if(($_SESSION['UserType']=='M' OR $_SESSION['UserType']=='S' OR $_SESSION['UserType']=='A' OR $_SESSION['UserType']=='U') AND $_SESSION['login'] = true AND ($_SESSION['Master']==1 OR $_SESSION['Mas_DetailMand_Dept']==1)) { ?>	
 <tr>

 <?php //*********************************************** Open Department******************************************************?> 
<td align="left" id="type" valign="top" style="display:block; width:100%">             
   <table border="0" width="60%">
   
	<tr>
	  <td align="left" width="100%">
	     <table border="1" width="100%" bgcolor="#FFFFFF" id="table1" cellspacing="0" style="width:100%;">
		 <div class="thead">
		 <thead>
 <tr bgcolor="#7a6189">
   <td class="thc" style="width:50;">Sn</td>
   <?php /*<td class="thc" style="width:50;">Dept-Id</td>*/?>
   <td class="thc" style="width:150;">Name</td>
   <td class="thc" style="width:100;">Code</td>
 </tr>
</thead>
</div>
<?php $sql=mysql_query("select * from core_departments where is_active=1 order by department_name", $con); $SNo=1; while($res=mysql_fetch_array($sql)) { ?>
<div class="tbody">
 <tbody>
		  <tr>
		   <td class="tdc"><?php echo $SNo; ?></td>
		   <?php /*<td class="tdc">&nbsp;<?php echo $res['id']; ?></td>*/ ?>
		   <td class="tdl">&nbsp;<?php echo $res['department_name']; ?></td>
 		   <td class="tdc"><?php echo $res['department_code']; ?></td>
		 </tr>
 </tbody>
</div>		 
<?php $SNo++;} ?>
         <tr><td bgcolor="#B6E9E2" colspan="10"></td></tr>
		     
			
		 </table>
	  </td>
    </tr>
  </table>  
</td>
<?php //*********************************************** Close Department******************************************************?>

 </tr>
<?php } ?> 
</table>
		
<?php //******************************************************************************?>
<?php //**********************END*****END*****END******END******END********************************?>
<?php //************************************************************************************?>
		
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
