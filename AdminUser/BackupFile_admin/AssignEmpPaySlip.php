<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}
if($_SESSION['login'] = true){require_once('PhpFile/DailyAllowanceP.php'); } else {$msg= "Session Expiry..............."; }
if(isset($_POST['SaveEditMK']))
{ 
	 $SqlUpMK = mysql_query("UPDATE hrm_employee_key SET Profile='".$_POST['Profile']."', Att='".$_POST['Att']."', LV='".$_POST['LV']."', Holiday='".$_POST['Holiday']."', Ctc='".$_POST['Ctc']."', Elig='".$_POST['Elig']."', Payslip='".$_POST['Payslip']."', InvestDecl='".$_POST['InvestDecl']."', Query='".$_POST['Query']."', WarmWelCome='".$_POST['WarmWelCome']."' WHERE CompanyId=".$CompanyId." AND EmpKeyId=".$_POST['EditMKId'], $con) or die(mysql_error());
     if($SqlUpMK){ $msgEmpMK = "Data has been Updeted successfully...";}   
}

if(isset($_POST['SaveEditPayM']))
{    $SqlUpPayM = mysql_query("UPDATE hrm_employee_key_paymonth SET Jan='".$_POST['Jan']."', Feb='".$_POST['Feb']."', Mar='".$_POST['Mar']."', Apr='".$_POST['Apr']."', May='".$_POST['May']."', Jun='".$_POST['Jun']."', Jul='".$_POST['Jul']."', Aug='".$_POST['Aug']."', Sep='".$_POST['Sep']."', Oct='".$_POST['Oct']."', Nov='".$_POST['Nov']."', Decm='".$_POST['Dec']."' WHERE CompanyId=".$CompanyId." AND EmpPayMKeyId=".$_POST['EditPayMId'], $con) or die(mysql_error());
     if($SqlUpPayM){ $msgEmpPayM = "Data has been Updeted successfully...";}   
}
?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style> .font { color:#ffffff; font-family:Georgia; font-size:11px; width:120px;} .font1 { font-family:"Times New Roman", Times, serif; font-size:11px; width:120px; } 
.font2 { font-size:11px;width:260px;height:18px;} .font4 {color:#1FAD34; font-family:Georgia; font-size:15px;}
.span {display:none; font-family:Courier New; font-size:14px; }.span1 {display:block; font-family:Courier New; font-size:14px; }
.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;}
.SaveButton {background-image:url(images/save.gif); width:20px; height:20px; background-repeat:no-repeat; background-color:#FFFFFF; border-color:#FFFFFF; border-bottom:inherit;}
.TextInput { font-family:"Times New Roman", Times, serif; font-size:11px; width:100px; height:18px;}
</style>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<script type="text/javascript" src="js/MandatoryAjaxCall.js"></script>
<Script type="text/javascript">window.history.forward(1);
function EmpMK(value) { var agree=confirm("Are you sure you want to edit this record?");
if (agree) { var x = "AssignEmpPaySlip.php?action=editMK&eidMK="+value;  window.location=x;}}
function EmpPayM(value) { var agree=confirm("Are you sure you want to edit this record?");
if (agree) { var x = "AssignEmpPaySlip.php?action=editPayM&eidPayM="+value;  window.location=x;}}

//function del(value) { var agree=confirm("Are you sure you want to delete this record?");
//if (agree) { var x = "PmsOpenClose.php?action=delete&did="+value;  window.location=x;}}

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
    <tr><td valign="top"><?php if($_SESSION['login'] = true){ require_once("AWelcome.php"); } ?></td></tr>
	<tr>
	  <td valign="top" align="center"  width="100%" id="MainWindow"><br>
<?php //************************************************************************************************************************************************************?>
<?php //**********************************************START*****START*****START******START******START***************************************************************?>
<?php //************************************************************************************************************************************************************?>
<table border="0" style="margin-top:0px; width:100%; height:300px;">
<?php if(($_SESSION['UserType']=='S' AND $_SESSION['login']==true) OR ($UserId==5 AND $_SESSION['login']==true) OR ($UserId==23 AND $_SESSION['login']==true) OR ($UserId==25 AND $_SESSION['login']==true)) { ?>	
 <tr>
 <td style="width:1px;" valign="top" align="center">&nbsp;</td>
 <td width="1">&nbsp;</td>
<?php //*********************************************** Open Menu PMS ******************************************************?> 
<td align="left" id="type" valign="top" style="display:block; width:100%">             
   <table border="0" width="1200">
   <tr>
	  <td align="" width="200" class="heading">&nbsp;&nbsp;&nbsp;Menu/ Submenu Allow
	  <font class="font4" style="left">&nbsp;&nbsp;&nbsp;<b><?php echo $msgEmpMK; ?></b></font>
	  </td>
	</tr>
   
   
<?php ///*******************************// ?>

<tr>
	  <td align="left" width="900">
	     <table border="1" width="900" border="1" bgcolor="#FFFFFF">
		 <tr bgcolor="#7a6189">
		   <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:300px;" valign="top" align="center"><b>Company</b></td>
		   <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:60px;" valign="top" align="center"><b>Profile</b></td>
		   <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:60px;" valign="top" align="center"><b>Attend</b></td>
		   <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:60px;" valign="top" align="center"><b>Leave</b></td>
		   <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:60px;" valign="top" align="center"><b>Holiday</b></td>
		   <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:60px;" valign="top" align="center"><b>CTC</b></td>
		   <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:60px;" valign="top" align="center"><b>Elig</b></td>
		   <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:60px;" valign="top" align="center"><b>Payslip</b></td>
		   <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:60px;" valign="top" align="center"><b>InvtDecl</b></td>
		   <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:60px;" valign="top" align="center"><b>Query</b></td>
		   <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:60px;" valign="top" align="center"><b>Warm<br>WelCome</b></td>
		   <td valign="top" align="center" style="font:Georgia; font-size:11px; width:50px; color:#FFFFFF;"><b>Action</b></td>
		 </tr>
<?php $sqlCom=mysql_query("select CompanyName from hrm_company_basic where CompanyId=".$CompanyId, $con); $resCom=mysql_fetch_assoc($sqlCom);
      $sqlMK=mysql_query("select * from hrm_employee_key where CompanyId=".$CompanyId, $con); $SNo=1; $resMK=mysql_fetch_array($sqlMK);
      if(isset($_REQUEST['action']) && $_REQUEST['action']=="editMK" && $_REQUEST['eidMK']==$resMK['EmpKeyId']){ ?>
	      <form name="formEdit" method="post" onSubmit="return validateMK(this)">		  
          <tr>
		   <td style="color:#000000; font-family:Georgia; font-size:11px; width:300px;" align="">&nbsp;<?php echo $resCom['CompanyName'];?></td>
		   <td style="width:60px;" align="center"><select name="Profile" id="Profile" style="font-family:Times New Roman; font-size:11px; width:58px; height:20px;">
		   <option value="<?php echo $resMK['Profile']; ?>"><?php if($resMK['Profile']=='Y')echo 'YES'; else echo 'NO'; ?></option>
		   <option value="<?php if($resMK['Profile']=='Y') echo 'N'; else echo 'Y'; ?>"><?php if($resMK['Profile']=='Y')echo 'NO'; else echo 'YES'; ?></option>
		   </select></td>
 		   <td style="width:60px;" align="center"><select name="Att" id="Att" style="font-family:Times New Roman; font-size:11px; width:58px; height:20px;">
		   <option value="<?php echo $resMK['Att']; ?>"><?php if($resMK['Att']=='Y')echo 'YES'; else echo 'NO'; ?></option>
		   <option value="<?php if($resMK['Att']=='Y') echo 'N'; else echo 'Y'; ?>"><?php if($resMK['Att']=='Y')echo 'NO'; else echo 'YES'; ?></option>
		   </select></td>
		   <td style="width:60px;" align="center"><select name="LV" id="LV" style="font-family:Times New Roman; font-size:11px; width:58px; height:20px;">
		   <option value="<?php echo $resMK['LV']; ?>"><?php if($resMK['LV']=='Y')echo 'YES'; else echo 'NO'; ?></option>
		   <option value="<?php if($resMK['LV']=='Y') echo 'N'; else echo 'Y'; ?>"><?php if($resMK['LV']=='Y')echo 'NO'; else echo 'YES'; ?></option>
		   </select></td>
		   <td style="width:60px;" align="center"><select name="Holiday" id="Holiday" style="font-family:Times New Roman; font-size:11px; width:58px; height:20px;">
		   <option value="<?php echo $resMK['Holiday']; ?>"><?php if($resMK['Holiday']=='Y')echo 'YES'; else echo 'NO'; ?></option>
		   <option value="<?php if($resMK['Holiday']=='Y') echo 'N'; else echo 'Y'; ?>"><?php if($resMK['Holiday']=='Y')echo 'NO'; else echo 'YES'; ?></option>
		   </select></td>
		   <td  style="width:60px;" align="center"><select name="Ctc" id="Ctc" style="font-family:Times New Roman; font-size:11px; width:58px; height:20px;">
		   <option value="<?php echo $resMK['Ctc']; ?>"><?php if($resMK['Ctc']=='Y')echo 'YES'; else echo 'NO'; ?></option>
		   <option value="<?php if($resMK['Ctc']=='Y') echo 'N'; else echo 'Y'; ?>"><?php if($resMK['Ctc']=='Y')echo 'NO'; else echo 'YES'; ?></option>
		   </select></td>
		   <td style="width:60px;" align="center"><select name="Elig" id="Elig" style="font-family:Times New Roman; font-size:11px; width:58px; height:20px;">
		   <option value="<?php echo $resMK['Elig']; ?>"><?php if($resMK['Elig']=='Y')echo 'YES'; else echo 'NO'; ?></option>
		   <option value="<?php if($resMK['Elig']=='Y') echo 'N'; else echo 'Y'; ?>"><?php if($resMK['Elig']=='Y')echo 'NO'; else echo 'YES'; ?></option>
		   </select></td>
		   <td style="width:60px;" align="center"><select name="Payslip" id="Payslip" style="font-family:Times New Roman; font-size:11px; width:58px; height:20px;">
		   <option value="<?php echo $resMK['Payslip']; ?>"><?php if($resMK['Payslip']=='Y')echo 'YES'; else echo 'NO'; ?></option>
		   <option value="<?php if($resMK['Payslip']=='Y') echo 'N'; else echo 'Y'; ?>"><?php if($resMK['Payslip']=='Y')echo 'NO'; else echo 'YES'; ?></option>
		   </select></td>
		   <td style="width:60px;" align="center"><select name="InvestDecl" id="InvestDecl" style="font-family:Times New Roman; font-size:11px; width:58px; height:20px;">
		   <option value="<?php echo $resMK['InvestDecl']; ?>"><?php if($resMK['InvestDecl']=='Y')echo 'YES'; else echo 'NO'; ?></option>
		   <option value="<?php if($resMK['InvestDecl']=='Y') echo 'N'; else echo 'Y'; ?>"><?php if($resMK['InvestDecl']=='Y')echo 'NO'; else echo 'YES'; ?></option>
		   </select></td>
		   <td style="width:60px;" align="center"><select name="Query" id="Query" style="font-family:Times New Roman; font-size:11px; width:58px; height:20px;">
		   <option value="<?php echo $resMK['Query']; ?>"><?php if($resMK['Query']=='Y')echo 'YES'; else echo 'NO'; ?></option>
		   <option value="<?php if($resMK['Query']=='Y') echo 'N'; else echo 'Y'; ?>"><?php if($resMK['Query']=='Y')echo 'NO'; else echo 'YES'; ?></option>
		   </select><input type="hidden" name="EditMKId" id="EditMKId" value="<?php echo $_REQUEST['eidMK']; ?>"/></td>
		   
		   <td style="width:60px;" align="center"><select name="WarmWelCome" id="WarmWelCome" style="font-family:Times New Roman; font-size:11px; width:58px; height:20px;">
		   <option value="<?php echo $resMK['WarmWelCome']; ?>"><?php if($resMK['WarmWelCome']=='Y')echo 'YES'; else echo 'NO'; ?></option>
		   <option value="<?php if($resMK['WarmWelCome']=='Y') echo 'N'; else echo 'Y'; ?>"><?php if($resMK['WarmWelCome']=='Y')echo 'NO'; else echo 'YES'; ?></option>
		   </select></td>
		   
		   <td align="center" valign="middle" style="font:Georgia; font-size:11px; width:50px;">
<?php if($_SESSION['User_Permission']=='Edit'){?>
			 &nbsp;<input type="submit" name="SaveEditMK"  value="" class="SaveButton">&nbsp;
<?php } ?>
		   </td>
		 </tr>

		 </form>
<?php } else { ?>	 
		  <tr bgcolor="#FFFFFF">
		   <td style="font-family:Georgia;font-size:11px;width:300px;">&nbsp;<b><?php echo $resCom['CompanyName'];?></b></td>
		   <td style="font-family:Georgia;font-size:11px;width:60px;background-color:<?php if($resMK['Profile']=='Y')echo '#7DFF7D'; ?>;" align="center"><?php if($resMK['Profile']=='Y')echo 'YES'; else echo 'NO'; ?></td>
		   <td style="font-family:Georgia;font-size:11px;width:60px;background-color:<?php if($resMK['Att']=='Y')echo '#7DFF7D'; ?>;" align="center"><?php if($resMK['Att']=='Y')echo 'YES'; else echo 'NO'; ?></td>
		   <td style="font-family:Georgia;font-size:11px;width:60px;background-color:<?php if($resMK['LV']=='Y')echo '#7DFF7D'; ?>;" align="center"><?php if($resMK['LV']=='Y')echo 'YES'; else echo 'NO'; ?></td>
		   <td style="font-family:Georgia;font-size:11px;width:60px;background-color:<?php if($resMK['Holiday']=='Y')echo '#7DFF7D'; ?>;" align="center"><?php if($resMK['Holiday']=='Y')echo 'YES'; else echo 'NO'; ?></td>
		   <td style="font-family:Georgia;font-size:11px;width:60px;background-color:<?php if($resMK['Ctc']=='Y')echo '#7DFF7D'; ?>;" align="center"><?php if($resMK['Ctc']=='Y')echo 'YES'; else echo 'NO'; ?></td>
		   <td style="font-family:Georgia;font-size:11px;width:60px;background-color:<?php if($resMK['Elig']=='Y')echo '#7DFF7D'; ?>;" align="center"><?php if($resMK['Elig']=='Y')echo 'YES'; else echo 'NO'; ?></td>
		   <td style="font-family:Georgia;font-size:11px;width:60px;background-color:<?php if($resMK['Payslip']=='Y')echo '#7DFF7D'; ?>;" align="center"><?php if($resMK['Payslip']=='Y')echo 'YES'; else echo 'NO'; ?></td>
		   <td style="font-family:Georgia;font-size:11px;width:60px;background-color:<?php if($resMK['InvestDecl']=='Y')echo '#7DFF7D'; ?>;" align="center"><?php if($resMK['InvestDecl']=='Y')echo 'YES'; else echo 'NO'; ?></td>
		   <td style="font-family:Georgia;font-size:11px;width:60px;background-color:<?php if($resMK['Query']=='Y')echo '#7DFF7D'; ?>;" align="center"><?php if($resMK['Query']=='Y')echo 'YES'; else echo 'NO'; ?></td>
		   
		   <td style="font-family:Georgia;font-size:11px;width:60px;background-color:<?php if($resMK['WarmWelCome']=='Y')echo '#7DFF7D'; ?>;" align="center"><?php if($resMK['WarmWelCome']=='Y')echo 'YES'; else echo 'NO'; ?></td>
		   
		   <td align="center" valign="middle" style="font:Georgia; font-size:11px; width:50px;">
<?php if($_SESSION['User_Permission']=='Edit'){?>
			 <a href="#"><img src="images/edit.png" border="0" alt="Edit" onClick="EmpMK(<?php echo $resMK['EmpKeyId']; ?>)"></a>
<?php } ?>
		   </td>
		 </tr>
<?php } ?>
         <tr><td bgcolor="#B6E9E2" colspan="12"></td></tr>
		 </table>
	  </td>
    </tr>

<?php ///*******************************// ?>

<?php ///*************************** PaySlip Permission Open ****// ?>
   <tr>
	  <td align="" width="200" class="heading">&nbsp;&nbsp;&nbsp;PaySlip Permission
	  <font class="font4" style="left">&nbsp;&nbsp;&nbsp;<b><?php echo $msgEmpPayM; ?></b></font>
	  </td>
	</tr>
   <tr>
	  <td align="left" width="1060">
	     <table border="1" width="1060" border="1" bgcolor="#FFFFFF">
		 <tr bgcolor="#7a6189">
		   <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:300px;" valign="top" align="center"><b>Company</b></td>
		   <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:60px;" valign="top" align="center"><b>Jan</b></td>
		   <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:60px;" valign="top" align="center"><b>Feb</b></td>
		   <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:60px;" valign="top" align="center"><b>Mar</b></td>
		   <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:60px;" valign="top" align="center"><b>Apr</b></td>
		   <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:60px;" valign="top" align="center"><b>May</b></td>
		   <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:60px;" valign="top" align="center"><b>Jun</b></td>
		   <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:60px;" valign="top" align="center"><b>Jul</b></td>
		   <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:60px;" valign="top" align="center"><b>Aug</b></td>
		   <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:60px;" valign="top" align="center"><b>Sep</b></td>
		    <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:60px;" valign="top" align="center"><b>Oct</b></td>
		   <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:60px;" valign="top" align="center"><b>Nov</b></td>
		   <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:60px;" valign="top" align="center"><b>Dec</b></td>
		   <td valign="top" align="center" style="font:Georgia; font-size:11px; width:50px; color:#FFFFFF;"><b>Action</b></td>
		 </tr>
<?php $sqlPayM=mysql_query("select * from hrm_employee_key_paymonth where CompanyId=".$CompanyId, $con); $SNo=1; $resPayM=mysql_fetch_array($sqlPayM);
      if(isset($_REQUEST['action']) && $_REQUEST['action']=="editPayM" && $_REQUEST['eidPayM']==$resPayM['EmpPayMKeyId']){ ?>
	      <form name="formEdit" method="post" onSubmit="return validatePayM(this)">		  
          <tr>
		   <td style="color:#000000; font-family:Georgia; font-size:11px; width:300px;" align="">&nbsp;<?php echo $resCom['CompanyName'];?></td>
		   <td style="width:60px;" align="center"><select name="Jan" id="Jan" style="font-family:Times New Roman; font-size:11px; width:58px; height:20px;">
		   <option value="<?php echo $resPayM['Jan']; ?>"><?php if($resPayM['Jan']=='Y')echo 'YES'; else echo 'NO'; ?></option>
		   <option value="<?php if($resPayM['Jan']=='Y') echo 'N'; else echo 'Y'; ?>"><?php if($resPayM['Jan']=='Y')echo 'NO'; else echo 'YES'; ?></option>
		   </select></td>
 		   <td style="width:60px;" align="center"><select name="Feb" id="Feb" style="font-family:Times New Roman; font-size:11px; width:58px; height:20px;">
		   <option value="<?php echo $resPayM['Feb']; ?>"><?php if($resPayM['Feb']=='Y')echo 'YES'; else echo 'NO'; ?></option>
		   <option value="<?php if($resPayM['Feb']=='Y') echo 'N'; else echo 'Y'; ?>"><?php if($resPayM['Feb']=='Y')echo 'NO'; else echo 'YES'; ?></option>
		   </select></td>
		   <td style="width:60px;" align="center"><select name="Mar" id="Mar" style="font-family:Times New Roman; font-size:11px; width:58px; height:20px;">
		   <option value="<?php echo $resPayM['Mar']; ?>"><?php if($resPayM['Mar']=='Y')echo 'YES'; else echo 'NO'; ?></option>
		   <option value="<?php if($resPayM['Mar']=='Y') echo 'N'; else echo 'Y'; ?>"><?php if($resPayM['Mar']=='Y')echo 'NO'; else echo 'YES'; ?></option>
		   </select></td>
		   <td style="width:60px;" align="center"><select name="Apr" id="Apr" style="font-family:Times New Roman; font-size:11px; width:58px; height:20px;">
		   <option value="<?php echo $resPayM['Apr']; ?>"><?php if($resPayM['Apr']=='Y')echo 'YES'; else echo 'NO'; ?></option>
		   <option value="<?php if($resPayM['Apr']=='Y') echo 'N'; else echo 'Y'; ?>"><?php if($resPayM['Apr']=='Y')echo 'NO'; else echo 'YES'; ?></option>
		   </select></td>
		   <td  style="width:60px;" align="center"><select name="May" id="May" style="font-family:Times New Roman; font-size:11px; width:58px; height:20px;">
		   <option value="<?php echo $resPayM['May']; ?>"><?php if($resPayM['May']=='Y')echo 'YES'; else echo 'NO'; ?></option>
		   <option value="<?php if($resPayM['May']=='Y') echo 'N'; else echo 'Y'; ?>"><?php if($resPayM['May']=='Y')echo 'NO'; else echo 'YES'; ?></option>
		   </select></td>
		   <td style="width:60px;" align="center"><select name="Jun" id="Jun" style="font-family:Times New Roman; font-size:11px; width:58px; height:20px;">
		   <option value="<?php echo $resPayM['Jun']; ?>"><?php if($resPayM['Jun']=='Y')echo 'YES'; else echo 'NO'; ?></option>
		   <option value="<?php if($resPayM['Jun']=='Y') echo 'N'; else echo 'Y'; ?>"><?php if($resPayM['Jun']=='Y')echo 'NO'; else echo 'YES'; ?></option>
		   </select></td>
		   <td style="width:60px;" align="center"><select name="Jul" id="Jul" style="font-family:Times New Roman; font-size:11px; width:58px; height:20px;">
		   <option value="<?php echo $resPayM['Jul']; ?>"><?php if($resPayM['Jul']=='Y')echo 'YES'; else echo 'NO'; ?></option>
		   <option value="<?php if($resPayM['Jul']=='Y') echo 'N'; else echo 'Y'; ?>"><?php if($resPayM['Jul']=='Y')echo 'NO'; else echo 'YES'; ?></option>
		   </select></td>
		   <td style="width:60px;" align="center"><select name="Aug" id="Aug" style="font-family:Times New Roman; font-size:11px; width:58px; height:20px;">
		   <option value="<?php echo $resPayM['Aug']; ?>"><?php if($resPayM['Aug']=='Y')echo 'YES'; else echo 'NO'; ?></option>
		   <option value="<?php if($resPayM['Aug']=='Y') echo 'N'; else echo 'Y'; ?>"><?php if($resPayM['Aug']=='Y')echo 'NO'; else echo 'YES'; ?></option>
		   </select></td>
		   <td style="width:60px;" align="center"><select name="Sep" id="Sep" style="font-family:Times New Roman; font-size:11px; width:58px; height:20px;">
		   <option value="<?php echo $resPayM['Sep']; ?>"><?php if($resPayM['Sep']=='Y')echo 'YES'; else echo 'NO'; ?></option>
		   <option value="<?php if($resPayM['Sep']=='Y') echo 'N'; else echo 'Y'; ?>"><?php if($resPayM['Sep']=='Y')echo 'NO'; else echo 'YES'; ?></option>
		   </select></td>
		    <td style="width:60px;" align="center"><select name="Oct" id="Oct" style="font-family:Times New Roman; font-size:11px; width:58px; height:20px;">
		   <option value="<?php echo $resPayM['Oct']; ?>"><?php if($resPayM['Oct']=='Y')echo 'YES'; else echo 'NO'; ?></option>
		   <option value="<?php if($resPayM['Oct']=='Y') echo 'N'; else echo 'Y'; ?>"><?php if($resPayM['Oct']=='Y')echo 'NO'; else echo 'YES'; ?></option>
		   </select></td>
		   <td style="width:60px;" align="center"><select name="Nov" id="Nov" style="font-family:Times New Roman; font-size:11px; width:58px; height:20px;">
		   <option value="<?php echo $resPayM['Nov']; ?>"><?php if($resPayM['Nov']=='Y')echo 'YES'; else echo 'NO'; ?></option>
		   <option value="<?php if($resPayM['Nov']=='Y') echo 'N'; else echo 'Y'; ?>"><?php if($resPayM['Nov']=='Y')echo 'NO'; else echo 'YES'; ?></option>
		   </select></td>
		   <td style="width:60px;" align="center"><select name="Dec" id="Dec" style="font-family:Times New Roman; font-size:11px; width:58px; height:20px;">
		   <option value="<?php echo $resPayM['Decm']; ?>"><?php if($resPayM['Decm']=='Y')echo 'YES'; else echo 'NO'; ?></option>
		   <option value="<?php if($resPayM['Decm']=='Y') echo 'N'; else echo 'Y'; ?>"><?php if($resPayM['Decm']=='Y')echo 'NO'; else echo 'YES'; ?></option>
		   </select><input type="hidden" name="EditPayMId" id="EditPayMId" value="<?php echo $_REQUEST['eidPayM']; ?>"/></td>
		   <td align="center" valign="middle" style="font:Georgia; font-size:11px; width:50px;">
<?php if($_SESSION['User_Permission']=='Edit'){?>
			 &nbsp;<input type="submit" name="SaveEditPayM"  value="" class="SaveButton">&nbsp;
<?php } ?>
		   </td>
		 </tr>

		 </form>
<?php } else { ?>	 
		  <tr bgcolor="#FFFFFF">
		   <td style="font-family:Georgia;font-size:11px;width:300px;">&nbsp;<b><?php echo $resCom['CompanyName'];?></b></td>
		   <td style="font-family:Georgia;font-size:11px;width:60px;background-color:<?php if($resPayM['Jan']=='Y')echo '#7DFF7D'; ?>;" align="center"><?php if($resPayM['Jan']=='Y')echo 'YES'; else echo 'NO'; ?></td>
		   <td style="font-family:Georgia;font-size:11px;width:60px;background-color:<?php if($resPayM['Feb']=='Y')echo '#7DFF7D'; ?>;" align="center"><?php if($resPayM['Feb']=='Y')echo 'YES'; else echo 'NO'; ?></td>
		   <td style="font-family:Georgia;font-size:11px;width:60px;background-color:<?php if($resPayM['Mar']=='Y')echo '#7DFF7D'; ?>;" align="center"><?php if($resPayM['Mar']=='Y')echo 'YES'; else echo 'NO'; ?></td>
		   <td style="font-family:Georgia;font-size:11px;width:60px;background-color:<?php if($resPayM['Apr']=='Y')echo '#7DFF7D'; ?>;" align="center"><?php if($resPayM['Apr']=='Y')echo 'YES'; else echo 'NO'; ?></td>
		   <td style="font-family:Georgia;font-size:11px;width:60px;background-color:<?php if($resPayM['May']=='Y')echo '#7DFF7D'; ?>;" align="center"><?php if($resPayM['May']=='Y')echo 'YES'; else echo 'NO'; ?></td>
		   <td style="font-family:Georgia;font-size:11px;width:60px;background-color:<?php if($resPayM['Jun']=='Y')echo '#7DFF7D'; ?>;" align="center"><?php if($resPayM['Jun']=='Y')echo 'YES'; else echo 'NO'; ?></td>
		   <td style="font-family:Georgia;font-size:11px;width:60px;background-color:<?php if($resPayM['Jul']=='Y')echo '#7DFF7D'; ?>;" align="center"><?php if($resPayM['Jul']=='Y')echo 'YES'; else echo 'NO'; ?></td>
		   <td style="font-family:Georgia;font-size:11px;width:60px;background-color:<?php if($resPayM['Aug']=='Y')echo '#7DFF7D'; ?>;" align="center"><?php if($resPayM['Aug']=='Y')echo 'YES'; else echo 'NO'; ?></td>
		   <td style="font-family:Georgia;font-size:11px;width:60px;background-color:<?php if($resPayM['Sep']=='Y')echo '#7DFF7D'; ?>;" align="center"><?php if($resPayM['Sep']=='Y')echo 'YES'; else echo 'NO'; ?></td>
		   <td style="font-family:Georgia;font-size:11px;width:60px;background-color:<?php if($resPayM['Oct']=='Y')echo '#7DFF7D'; ?>;" align="center"><?php if($resPayM['Oct']=='Y')echo 'YES'; else echo 'NO'; ?></td>
		   <td style="font-family:Georgia;font-size:11px;width:60px;background-color:<?php if($resPayM['Nov']=='Y')echo '#7DFF7D'; ?>;" align="center"><?php if($resPayM['Nov']=='Y')echo 'YES'; else echo 'NO'; ?></td>
		   <td style="font-family:Georgia;font-size:11px;width:60px;background-color:<?php if($resPayM['Decm']=='Y')echo '#7DFF7D'; ?>;" align="center"><?php if($resPayM['Decm']=='Y')echo 'YES'; else echo 'NO'; ?></td>
		   <td align="center" valign="middle" style="font:Georgia; font-size:11px; width:50px;">
<?php if($_SESSION['User_Permission']=='Edit'){?>
			 <a href="#"><img src="images/edit.png" border="0" alt="Edit" onClick="EmpPayM(<?php echo $resPayM['EmpPayMKeyId']; ?>)"></a>
<?php } ?>
		   </td>
		 </tr>
<?php } ?>
         <tr><td bgcolor="#B6E9E2" colspan="14"></td></tr>
		 </table>
	  </td>
    </tr>

<?php ///*******************************// ?>
   
   
   
   
   
   
   
   
     
   <tr>
      <td align="Right" class="fontButton"><table border="0" width="550">
		<tr><td align="right">
		<input type="button" name="back" id="back" style="width:90px;" value="back" onClick="javascript:window.location='Index.php?log=<?php echo $_SESSION['logCheckUser']; ?>'"/>
		<input type="button" name="Refrash" value="refresh" onclick="javascript:window.location='AssignEmpPaySlip.php'"/>&nbsp;</td>
		</tr></table>
      </td>
   </tr>
   
  </table>    
</td>
<?php //*********************************************** Close Menu PMS ******************************************************?>    
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

