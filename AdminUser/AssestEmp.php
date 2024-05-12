<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}
//**********************************
$_SESSION['EEID']=$_REQUEST['ID'];
$EMPID=$_SESSION['EEID'];
//**********************************
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
function DetailsAsst(EI)
{ window.open("DetailsEmpAsst.php?EI="+EI,"AsstForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=800,height=1000");}
</script>
</head>
<body class="body">
<?php 
$SqlEmp = mysql_query("SELECT *,hrm_employee_general.*,hrm_employee_personal.* FROM hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID WHERE hrm_employee.EmployeeID=".$EMPID, $con) or die(mysql_error());  $ResEmp=mysql_fetch_assoc($SqlEmp);
$Ename = $ResEmp['Fname'].'&nbsp;'.$ResEmp['Sname'].'&nbsp;'.$ResEmp['Lname']; $LEC=strlen($ResEmp['EmpCode']); 
      if($LEC==1){$EC='000'.$ResEmp['EmpCode'];} if($LEC==2){$EC='00'.$ResEmp['EmpCode'];} if($LEC==3){$EC='0'.$ResEmp['EmpCode'];} if($LEC>=4){$EC=$ResEmp['EmpCode'];}  
?>
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
	  <td align="right" width="230" class="heading">Assest</td>
	  <td>&nbsp;&nbsp;&nbsp;</td>
	  <td style="font-family:Times New Roman; font-size:16px; color:#287126; font-weight:bold;"><font color="#FF0000" size="4">*</font>  - Require Field</td>
	   <td><table><tr><td class="font4" style="left">&nbsp;&nbsp;&nbsp;<b><span id="msgspan">
	   <?php echo $msg; ?></span></b></td></tr></table></td>
	</tr>
   </table>
  </td>
 </tr>
<?php if(($_SESSION['UserType']=='M' OR $_SESSION['UserType']=='S' OR $_SESSION['UserType']=='A' OR $_SESSION['UserType']=='U') AND $_SESSION['login'] = true) { ?>	
 <tr>
 <td style="width:100px;" align="center" valign="top"><?php if($_REQUEST['Event']=='Edit') { include("EmpMasterMenu.php"); } ?></td>
 
<td style="width:50px;" align="center" valign="top"></td>
<?php //*********************************************************************************************************************************************************?>
<?php if($_REQUEST['Event']=='Add') {?>
<td align="left" id="Equalifi" valign="top">             
<form enctype="multipart/form-data" name="formEAssest" method="post" onSubmit="return validate(this)">
<table border="0">
<tr>
 <td>
  <table><tr>
 <td class="All_80">EmpCode :</td><td class="All_60"><input name="EmpCode" class="All_50" style="background-color:#E6EBC5;" value="<?php echo $EC; ?>" Readonly></td>
 <td class="All_50">Name :</td><td class="All_220"><input name="EmpName" style="width:210px; height:18px; font-size:11px;background-color:#E6EBC5;text-transform:uppercase;" value="<?php echo $Ename; ?>" Readonly></td>
  </tr></table>
 </td>
</tr>
<tr> 
<td align="left" valign="top">
<table border="1" width="800" id="TEmp" style="display:block;" cellpadding="0" cellspacing="0">
<tr>
<td>
  <table style="width:800px;" border="1">
  <tr bgcolor="#BCA9D3">
  <td style="width:50px; font-family:Times New Roman;font-size:14px;font-weight:bold;" align="center" valign="top">Sno</td>
  <td style="width:600px; font-family:Times New Roman;font-size:14px;font-weight:bold;" align="center" valign="top">Particulars of Documents/ Information</td>
  <td style="width:50px; font-family:Times New Roman;font-size:14px;font-weight:bold;" align="center" valign="top">Yes/No</td>
  <td style="width:100px; font-family:Times New Roman;font-size:14px;font-weight:bold;" align="center" valign="top">Remark</td>
  </tr>
<?php /************************************************* Particulars Open *****************************************/ ?>    
  <tr bgcolor="#FFFFFF">
  <td style="width:50px; font-family:Times New Roman;font-size:14px;" align="">&nbsp;&nbsp;<b>1.</b></td>
  <td style="width:600px; font-family:Times New Roman;font-size:14px;" align="" valign="middle">&nbsp;
  <input type="checkbox" name="PerHisForm" id="PerHisForm" value="<?php echo $resCL['Particular_PerHisForm']; ?>" onClick="FunPerHisForm()" <?php if($resCL['Particular_PerHisForm']=='Y'){echo 'checked';} ?> disabled />Personal History Form </td>
  <td style="width:50px; font-family:Times New Roman;font-size:14px;font-weight:bold;" align="center">
  <?php if($resCL['Particular_PerHisForm']=='Y'){echo 'Yes';} else {echo 'No';} ?></td>
  <td style="width:100px; font-family:Times New Roman;font-size:14px;" align="">
  <input name="PerHisForm_Remark" id="PerHisForm_Remark" style="width:99px; height:20px;" value="<?php echo $resCL['Particular_PerHisForm_Remark']; ?>" disabled /></td>
  </tr>
<?php /************************************************* Particulars Close *****************************************/ ?>  
  </table>
</td>
</tr>
<tr>
  <td align="Right" class="fontButton" colspan="6"><table border="0" align="right" class="fontButton">
	<tr>	 
	  <td align="right" style="width:90px;"><input type="button" name="ChangeAddAssest" id="ChangeAddAssest" style="width:90px; display:block;" value="Edit" onClick="AddAssest()">
		<input type="submit" name="AddAssestE" id="AddAssestE" style="width:90px;display:none;" value="save"></td>
	  <td align="right" style="width:90px;"><input type="button" name="RefreshAssestE" id="RefreshAssestE" style="width:90px;" value="refresh" onClick="javascript:window.location='AssestEmp.php?ID=<?php echo $EMPID; ?>&Event=Add'"/></td>
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
<?php } if($_REQUEST['Event']=='Edit') {?>
 <td align="left" id="Equalifi" valign="top">             
<form enctype="multipart/form-data" name="formEAssest" method="post" onSubmit="return validate(this)">
<table border="0">
<tr>
 <td>
  <table><tr>
 <td class="All_80">EmpCode :</td><td class="All_60"><input name="EmpCode" id="EmpCode" class="All_50" style="background-color:#E6EBC5;" value="<?php echo $EC; ?>" Readonly></td>
 <td class="All_50">Name :</td><td class="All_220"><input name="EmpName" id="EmpName" style="width:210px; height:18px; font-size:11px;background-color:#E6EBC5;text-transform:uppercase;" value="<?php echo $Ename; ?>" Readonly></td>
  </tr></table>
 </td>
</tr>
<tr> 
<td align="left" valign="top">
<table border="1" width="900" id="TEmp" style="display:block;" cellpadding="0" cellspacing="0">
<tr>
<td>
  <table style="width:900px;" border="1">
  <tr bgcolor="#BCA9D3">
  <td style="width:30px; font-family:Times New Roman;font-size:14px;font-weight:bold;" align="center" valign="top">Sno</td>
  <td style="width:150px; font-family:Times New Roman;font-size:14px;font-weight:bold;" align="center" valign="top">Name</td>
  <td style="width:180px; font-family:Times New Roman;font-size:14px;font-weight:bold;" align="center" valign="top">Company</td>
  <td style="width:180px; font-family:Times New Roman;font-size:14px;font-weight:bold;" align="center" valign="top">Model</td>
  <td style="width:70px; font-family:Times New Roman;font-size:14px;font-weight:bold;" align="center" valign="top">Purchase</td>
  <td style="width:70px; font-family:Times New Roman;font-size:14px;font-weight:bold;" align="center" valign="top">Allocate</td>
  <td style="width:70px; font-family:Times New Roman;font-size:14px;font-weight:bold;" align="center" valign="top">Deallocate</td>
  <td style="width:200px; font-family:Times New Roman;font-size:14px;font-weight:bold;" align="center" valign="top">Remark</td>
  </tr>
<?php $sqlAsst=mysql_query("select * from hrm_employee_assest where EmployeeID=".$EMPID." order by AllocatedDate ASC", $con); 
      $sn=1; while($resAsst=mysql_fetch_assoc($sqlAsst)) { ?>    
  <tr bgcolor="#FFFFFF">
  <td style="width:30px; font-family:Times New Roman;font-size:12px;" align="center" valign="top"><?php echo $sn; ?></td>
  <td style="width:150px; font-family:Times New Roman;font-size:12px;text-transform:uppercase;" align="" valign="top"><?php echo $resAsst['AssestName']; ?></td>
  <td style="width:180px; font-family:Times New Roman;font-size:12px;text-transform:uppercase;" align="" valign="top"><?php echo $resAsst['AssestCompanyName']; ?></td>
   <td style="width:180px; font-family:Times New Roman;font-size:12px;text-transform:uppercase;" align="" valign="top"><?php echo $resAsst['ModelNo']; ?></td>
  <td style="width:70px; font-family:Times New Roman;font-size:12px;" align="center" valign="top"><?php if($resAsst['PurchaseDate']=='0000-00-00' OR $resAsst['PurchaseDate']=='1970-01-01'){echo '';} else {echo date("d-M-y", strtotime($resAsst['PurchaseDate']));} ?></td>
  <td style="width:70px; font-family:Times New Roman;font-size:12px;" align="center" valign="top"><?php if($resAsst['AllocatedDate']=='0000-00-00' OR $resAsst['AllocatedDate']=='1970-01-01'){echo '';} else {echo date("d-M-y", strtotime($resAsst['AllocatedDate']));} ?></td>
  <td style="width:70px; font-family:Times New Roman;font-size:12px;" align="center" valign="top"><?php if($resAsst['DeAllocatedDate']=='0000-00-00' OR $resAsst['DeAllocatedDate']=='1970-01-01'){echo '';} else {echo date("d-M-y", strtotime($resAsst['DeAllocatedDate']));} ?></td>
  <td style="width:200px; font-family:Times New Roman;font-size:12px;text-transform:uppercase;" align="" valign="top"><?php echo $resAsst['IdentyDetails']; ?></td>
  </tr>
<?php $sn++; } ?>  
  </table>
</td>
</tr>
<tr>
  <td align="Right" class="fontButton" colspan="6"><table border="0" align="right" class="fontButton">
	<tr>	 
	  <td align="right" style="width:90px;" valign="middle"><a href="#" onClick="DetailsAsst(<?php echo $EMPID; ?>);"><font color="#FF9D3C"><b>Details</b></font></a></td>
	  <td align="right" style="width:90px;"></td>
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

