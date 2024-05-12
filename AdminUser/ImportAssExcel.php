<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}
//**********************************************************************************************************************
//====================================================Import Increment=============================================================//
if(isset($_POST['SaveEmpBill']))
{
 if ($_FILES['csv_file']['error'] > 0) {
  echo "Error: " . $_FILES['csv_file']['error'] . "<br />"; 
 }else{  
  if (($handle = fopen($_FILES['csv_file']['tmp_name'], "r")) !== FALSE) {
   $ctr = 1; // used to exclude the CSV header
   while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) { 
   $c0 = mysql_real_escape_string($data[0]); $c1 = mysql_real_escape_string($data[1]); $c2 = mysql_real_escape_string($data[2]); $c3 = mysql_real_escape_string($data[3]);
   $c4 = mysql_real_escape_string($data[4]); $c5 = mysql_real_escape_string($data[5]); $c6 = mysql_real_escape_string($data[6]); $c7 = mysql_real_escape_string($data[7]);
   $c8 = mysql_real_escape_string($data[8]); $c9 = mysql_real_escape_string($data[9]); $c10 = mysql_real_escape_string($data[10]); $c11 = mysql_real_escape_string($data[11]);
   $c12 = mysql_real_escape_string($data[12]); $c13 = mysql_real_escape_string($data[13]); $c14 = mysql_real_escape_string($data[14]); $c15 = mysql_real_escape_string($data[15]);
   $c16 = mysql_real_escape_string($data[16]); $c17 = mysql_real_escape_string($data[17]); $c18 = mysql_real_escape_string($data[18]); $c19 = mysql_real_escape_string($data[19]);
   $c20 = mysql_real_escape_string($data[20]); $c21 = mysql_real_escape_string($data[21]); $c22 = mysql_real_escape_string($data[22]); 

    if ($ctr > 1 AND ($c0!='' OR $c0!=0)) { $sql=mysql_query("INSERT INTO hrm_employee_assestbill(AccNo, MobileNo, EC, User, Oprator, Dept, State, Plan, TotPlanValue, BillPeriod, BillGenerationDate, LastDateBillpayment, LimitValue, BillPwd, EmailId, EmpDeclStatus, ActivationDate, OldUser, HandoverDate, CompanyId, CreatedBy, CreatedDate, YearId) VALUES ('".$c1."', '".$c2."','".$c3."','".$c4."','".$c5."','".$c6."','".$c7."','".$c8."','".$c9."','".$c10."','".$c11."','".$c12."','".$c13."','".$c14."','".$c15."', '".$c16."','".date("Y-m-d",strtotime($c17))."','".$c18."','".date("Y-m-d",strtotime($c19))."',".$CompanyId.",".$UserId.",'".date("Y-m-d")."','".$YearId."')", $con); }

    else { $ctr++; }
   }
   fclose($handle);
   if($sql){ $msgBill= 'Employee Assest excel Bill file uploaded successfully...';}
  }
 }
}

if(isset($_REQUEST['action']) && $_REQUEST['action']=="delete")
{
  $SqlDelete=mysql_query("delete from hrm_employee_assestbill WHERE CompanyId=".$_REQUEST['did'], $con) or die(mysql_error());
  if($SqlDelete) { echo '<script> alert("Data has been deleted successfully..."); window.location="ImportAssExcel.php";</script>'; }
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
<script type="text/javascript" language="javascript">
function DeletedBillEmp(v)
{ var agree=confirm("Are you sure you want to delete Employee Assest Details!");
if (agree) { var x = "ImportAssExcel.php?action=delete&did="+v;  window.location=x;}}

function Del()
{ document.getElementById("IUnDel").style.display='block'; document.getElementById("IDel").style.display='none'; 
  document.getElementById("csv_file").disabled=false; document.getElementById("DeleteEmpBill").disabled=false;  document.getElementById("UpBill").disabled=false;
}
function UnDel()
{ document.getElementById("IUnDel").style.display='none'; document.getElementById("IDel").style.display='block'; 
  document.getElementById("csv_file").disabled=true; document.getElementById("DeleteEmpBill").disabled=true;  document.getElementById("UpBill").disabled=true;}
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
	  <td align="" width="400" class="heading">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<u>Import CSV File</u> </td>
	  <td class="font4" style=" color:#B00000;">&nbsp;&nbsp;&nbsp;<b><i><?php echo $msg; ?></i></b></td>
	</tr>
   </table>
  </td>
 </tr>
<?php if(($_SESSION['UserType']=='S' OR $_SESSION['UserType']=='A' OR $_SESSION['UserType']=='U') AND $_SESSION['login'] = true) { ?>	
 <tr>

 <td width="17">&nbsp;</td>
<?php //*********************************************** Open Department******************************************************?> 
<td align="left" id="type" valign="top" style="display:block; width:100%">             
   <table border="0" width="1150">
<tr>
  <td align="left" width="1150">
	 
	 <table width="" border="0">
	   <form name="FormBill" method="POST" enctype="multipart/form-data">
       <tr style="height:20px;">
	     <td style="font-family:Times New Roman; font-size:15px; color:#003300; width:150px; font-weight:bold;">Bill Tetails :</td>
	     <td style="width:285px;"><input type="file" name="csv_file" id="csv_file" style="width:200px; background-color:#CEFFCE;" size="30" disabled/></td>
		  <td style="width:75px;"><input type="submit" name="SaveEmpBill" value="Upload" id="UpBill" disabled/></td>
		  <td width="1">&nbsp;</td>
		  <td style="font-family:Times New Roman; font-size:15px; color:#003300; width:70px; font-weight:bold;">Deleted :</td>
		  <td style="width:70px;"><input type="button" name="DeleteEmpBill" id="DeleteEmpBill" value="Delete" onClick="DeletedBillEmp(<?php echo $CompanyId; ?>)" disabled/></td>
		  <td><img src="images/checkbox_UnCheck.png" border="0" id="IUnDel" onClick="UnDel()" style="display:none;"/>
		      <img src="images/checkbox.png" border="0" id="IDel" onClick="Del()"/></td>
		  <td class="font4" style=" color:#B00000;">&nbsp;<b><i><?php echo $msgBill; ?></i></b></td>	  
	   </tr>
	   </form>
	 </table>
	  
  </td>
</tr>
  </table>  
</td>
<?php //*********************************************** Close Department******************************************************?>    
 </tr> 
</table>
<?php } ?>
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

