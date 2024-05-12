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
</head>
<body class="body">
<?php 
$SqlEmp = mysql_query("SELECT EmpCode,Fname,Sname,Lname FROM hrm_employee WHERE EmployeeID=".$EMPID, $con);  $ResEmp=mysql_fetch_assoc($SqlEmp);
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
	  <td align="right" width="230" class="heading">Conference</td>
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
<?php if($_REQUEST['Event']=='Edit') {?>
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
<table border="0" style="width:900px;" id="TEmp" style="display:block;" cellpadding="0" cellspacing="0">
<tr>
<td>
  <table border="1" style="width:1000px;">
  <tr bgcolor="#BCA9D3">
  <td style="width:40px;font-family:Times New Roman;font-size:14px;font-weight:bold;" align="center" valign="top">Sn</td>
  <td style="width:250px;font-family:Times New Roman;font-size:14px;font-weight:bold;" align="center" valign="top">Subject</td>
  <td style="width:60px;font-family:Times New Roman;font-size:14px;font-weight:bold;" align="center" valign="top">Year</td>
  <td style="width:80px;font-family:Times New Roman;font-size:14px;font-weight:bold;" align="center" valign="top">Date Frpm</td>
  <td style="width:80px;font-family:Times New Roman;font-size:14px;font-weight:bold;" align="center" valign="top">Date To</td>
  <td style="width:50px;font-family:Times New Roman;font-size:14px;font-weight:bold;" align="center" valign="top">No Of Day</td>
  <td style="width:150px;font-family:Times New Roman;font-size:14px;font-weight:bold;" align="center" valign="top">Location</td>
  <td style="width:150px;font-family:Times New Roman;font-size:14px;font-weight:bold;" align="center" valign="top">Conducted By</td>
  </tr>
<?php $sqlCo=mysql_query("select * from hrm_company_conference_participant INNER JOIN hrm_company_conference ON hrm_company_conference_participant.ConferenceId=hrm_company_conference.ConferenceId where hrm_company_conference_participant.EmployeeID=".$EMPID." order by ConfFrom DESC", $con); 
$sn=1; while($resCo=mysql_fetch_array($sqlCo)) { ?>    
  <tr bgcolor="#FFFFFF">
  <td style="font-family:Times New Roman;font-size:12px;text-transform:uppercase;" align="center" valign="top"><?php echo $sn; ?></td>
  <td style="font-family:Times New Roman;font-size:12px;text-transform:uppercase;" align="" valign="top">&nbsp;<?php echo $resCo['ConfTitle']; ?></td>
  <td style="font-family:Times New Roman;font-size:12px;text-transform:uppercase;" align="center" valign="top"><?php echo $resCo['ConfYear']; ?></td>
  <td style="font-family:Times New Roman;font-size:12px;text-transform:uppercase;" align="center" valign="top"><?php echo date("d-M-y",strtotime($resCo['ConfFrom'])); ?></td>
  <td style="font-family:Times New Roman;font-size:12px;text-transform:uppercase;" align="center" valign="top"><?php echo date("d-M-y",strtotime($resCo['ConfTo'])); ?></td>
  <td style="font-family:Times New Roman;font-size:12px;text-transform:uppercase;" align="center" valign="top"><?php echo $resCo['Duration']; ?></td>
  <td style="font-family:Times New Roman;font-size:12px;text-transform:uppercase;" align="" valign="top">&nbsp;<?php echo $resCo['Location']; ?></td>
  <td style="font-family:Times New Roman;font-size:12px;text-transform:uppercase;" align="" valign="top">&nbsp;<?php echo $resCo['ConductedBy']; ?></td>
  </tr>
  <?php $sn++; } $RowCountTr=$sn-1; ?><input type="hidden" name="RowCountTr" id="RowCountTr" value="<?php echo $RowCountTr; ?>" /> 
  </table>

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

