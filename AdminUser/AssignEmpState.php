<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}
//****************************************************************************************************************
if(isset($_POST['SaveE11']))
{ for($i=1; $i<=33; $i++){
  $sqlUp1=mysql_query("update hrm_employee_state set HR_EId=".$_POST['SelEmpHR_'.$i]." where StateId=".$_POST['StateId_'.$i]." AND CompanyId=".$_POST['ComId'], $con);
  $sqlUp2=mysql_query("update hrm_employee_state set RD_EId=".$_POST['SelEmpRD_'.$i]." where StateId=".$_POST['StateId_'.$i]." AND CompanyId=".$_POST['ComId'], $con);
  $sqlUp3=mysql_query("update hrm_employee_state set PD_EId=".$_POST['SelEmpPD_'.$i]." where StateId=".$_POST['StateId_'.$i]." AND CompanyId=".$_POST['ComId'], $con);
  $sqlUp4=mysql_query("update hrm_employee_state set PRODUCTION_EId=".$_POST['SelEmpPROD_'.$i]." where StateId=".$_POST['StateId_'.$i]." AND CompanyId=".$_POST['ComId'], $con);
  $sqlUp5=mysql_query("update hrm_employee_state set PPROCESSING_EId=".$_POST['SelEmpPROSS_'.$i]." where StateId=".$_POST['StateId_'.$i]." AND CompanyId=".$_POST['ComId'], $con);
  $sqlUp6=mysql_query("update hrm_employee_state set SALES_EId=".$_POST['SelEmpSALES_'.$i]." where StateId=".$_POST['StateId_'.$i]." AND CompanyId=".$_POST['ComId'], $con);
  $sqlUp7=mysql_query("update hrm_employee_state set LOGISTICS_EId=".$_POST['SelEmpLOG_'.$i]." where StateId=".$_POST['StateId_'.$i]." AND CompanyId=".$_POST['ComId'], $con);
  $sqlUp8=mysql_query("update hrm_employee_state set FINANCE_EId=".$_POST['SelEmpFIN_'.$i]." where StateId=".$_POST['StateId_'.$i]." AND CompanyId=".$_POST['ComId'], $con);
  $sqlUp9=mysql_query("update hrm_employee_state set IT_EId=".$_POST['SelEmpIT_'.$i]." where StateId=".$_POST['StateId_'.$i]." AND CompanyId=".$_POST['ComId'], $con);
  $sqlUp10=mysql_query("update hrm_employee_state set LEGAL_EId=".$_POST['SelEmpLIG_'.$i]." where StateId=".$_POST['StateId_'.$i]." AND CompanyId=".$_POST['ComId'], $con);
  $sqlUp11=mysql_query("update hrm_employee_state set ADMIN_EId=".$_POST['SelEmpADM_'.$i]." where StateId=".$_POST['StateId_'.$i]." AND CompanyId=".$_POST['ComId'], $con);
  $sqlUp12=mysql_query("update hrm_employee_state set MARKETING_EId=".$_POST['SelEmpMRK_'.$i]." where StateId=".$_POST['StateId_'.$i]." AND CompanyId=".$_POST['ComId'], $con);
  $sqlUp13=mysql_query("update hrm_employee_state set QA_EId=".$_POST['SelEmpQA_'.$i]." where StateId=".$_POST['StateId_'.$i]." AND CompanyId=".$_POST['ComId'], $con);
  $sqlUp14=mysql_query("update hrm_employee_state set FS_EId=".$_POST['SelEmpFS_'.$i]." where StateId=".$_POST['StateId_'.$i]." AND CompanyId=".$_POST['ComId'], $con);
  }
}
?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet"/>
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style>.font4 { color:#1FAD34; font-family:Georgia; font-size:15px;} .All{font-size:11px; height:20px;} .All_80{font-size:11px; height:20px; width:80px;}
.All_40{font-size:11px; height:20px; width:40px;} .All_50{font-size:11px; height:20px; width:50px;} .All_70{font-size:11px; height:20px; width:70px;} .All_80{font-size:11px; height:20px; width:80px;}.All_100{font-size:11px; height:20px; width:100px;} .All_120{font-size:11px; height:20px; width:120px;} .All_140{font-size:11px; height:20px; width:140px;} .All_60{font-size:11px; height:20px; width:60px;}
.All_150{font-size:11px; height:20px; width:150px;}.All_170{font-size:11px; height:20px; width:170px;}.All_180{font-size:11px; height:20px; width:180px;}.All_190{font-size:11px; height:20px; width:190px;} .All_200{font-size:11px; height:20px; width:200px;} .All_450{font-size:11px; height:20px; width:450px;}.All_360{font-size:11px; height:20px; width:350px;}.All_540{font-size:11px; height:20px; width:540px;}.All_400{font-size:11px; height:20px; width:400px;} .All_480{font-size:11px; height:20px; width:480px;}.All_600{font-size:11px; height:20px; width:600px;}
</style>
<script type="text/javascript" src="js/stuHover.js"></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<link rel="stylesheet" type="text/css" href="src/css/jscal2.css"/>
<link rel="stylesheet" type="text/css" href="src/css/border-radius.css"/>
<link rel="stylesheet" type="text/css" href="src/css/steel/steel.css"/>
<script type="text/javascript" src="src/js/jscal2.js"></script>
<script type="text/javascript" src="src/js/lang/en.js"></script>
<style>.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}</style>
<Script type="text/javascript">window.history.forward(1);</script>
<Script type="text/javascript" language="javascript">
function EEdit(v)
{ document.getElementById("EditE11").style.display='none'; document.getElementById("SaveE11").style.display='block'; 
  for(var i=1; i<=33; i++)
  { document.getElementById("SelEmpHR_"+i).disabled=false; document.getElementById("SelEmpRD_"+i).disabled=false; document.getElementById("SelEmpPD_"+i).disabled=false;
    document.getElementById("SelEmpPROD_"+i).disabled=false; document.getElementById("SelEmpPROSS_"+i).disabled=false; document.getElementById("SelEmpSALES_"+i).disabled=false;
	document.getElementById("SelEmpLOG_"+i).disabled=false; document.getElementById("SelEmpFIN_"+i).disabled=false; document.getElementById("SelEmpIT_"+i).disabled=false;
	document.getElementById("SelEmpLIG_"+i).disabled=false; document.getElementById("SelEmpADM_"+i).disabled=false; document.getElementById("SelEmpMRK_"+i).disabled=false;
	document.getElementById("SelEmpQA_"+i).disabled=false; document.getElementById("SelEmpFS_"+i).disabled=false;
  }
}
</Script>
</head>
<body class="body">
<input type="hidden" name="ComId" id="ComId" value="<?php echo $CompanyId; ?>" />
<input type="hidden" name="YId" id="YId" value="<?php echo $YearId; ?>" />
<input type="hidden" name="UserId" id="UserId" value="<?php echo $UserId; ?>" />
<input type="hidden" name="DeId" id="DeId" value="<?php echo $_REQUEST['value']; ?>" />
<table class="table" border="0">
<tr>
 <td>
  <table class="menutable"><tr><td><?php if($_SESSION['login'] = true){ require_once("AMenu.php"); } ?></td></tr></table>
 </td>
</tr>
<tr>
 <td>
  <table width="100%" style="margin-top:0px;" border="0">
    <tr>
	  <td valign="top"><?php if($_SESSION['login'] = true){ require_once("AWelcome.php"); } ?></td>
	</tr>
	 <tr>
	  <td valign="top" align="center" width="100%" id="MainWindow">
<?php //************************************************************************************************************************************************************?>
<?php //**********************************************START*****START*****START******START******START***************************************************************?>
<?php //************************************************************************************************************************************************************?>
<table border="0" style="margin-top:0px; width:95%; height:400px;">
	<tr>
		<?php if(($_SESSION['UserType']=='M' OR $_SESSION['UserType']=='S' OR $_SESSION['UserType']=='A' OR $_SESSION['UserType']=='U') AND $_SESSION['login'] = true) { ?>
		<td align="" width="100%" valign="top">
		   <table border="0">
       		 <tr><td colspan="2">
			       <table border="0">
                     <tr><td align="left" class="heading" style="width:200px;">Assign Employee State &nbsp;<span id="ReturnValue">&nbsp;</span></td></tr>
                  </table>
				</td>
			 </tr>
<?php //---------------------------------------Display Record----------------------------------------------------------------- ?>
<tr>
 <td>
   <table border="1" width="2400">
<tr bgcolor="#7a6189">
    <td align="center" style="color:#FFFFFF;" class="All_40"><b>SNo.</b></td>
    <td align="center" style="color:#FFFFFF;" class="All_120"><b>State</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_150"><b>HR</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_150"><b>R&D </b></td>
	<td align="center" style="color:#FFFFFF;" class="All_150"><b>PD</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_150"><b>PRODUCTION</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_150"><b>PROCESSING</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_150"><b>SALES</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_150"><b>LOGISTICS</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_150"><b>FINANCE</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_150"><b>IT</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_150"><b>LEGAL</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_150"><b>ADMIN</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_150"><b>MARKETING</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_150"><b>QA</b></td>
	<td align="center" style="color:#FFFFFF;" class="All_150"><b>FS</b></td>
 </tr> 
<?php if($CompanyId==1){ ?>
<form name="FormStateEmp1" method="post" />
<?php $sql = mysql_query("SELECT hrm_employee_state.*,StateName from hrm_employee_state INNER JOIN hrm_state ON hrm_employee_state.StateId=hrm_state.StateId WHERE hrm_employee_state.CompanyId=".$CompanyId." order by hrm_state.StateName ASC", $con); $no=1; while($res = mysql_fetch_array($sql)) { ?>
<tr bgcolor="#FFFFFF">
    <td align="center" style="" class="All_40"><?php echo $no; ?></td>
    <td align="" style=" background-color:#6FB7FF" class="All_120"><?php echo $res['StateName']; ?>
	<input type="hidden" name="StateId_<?php echo $no; ?>" value="<?php echo $res['StateId']; ?>" /></td>
	<?php // HR // ?>
	<td align="center" style="" class="All_150"><select style="width:148px;font-size:12px; font-family:Georgia;height:20px;" id="SelEmpHR_<?php echo $no; ?>" name="SelEmpHR_<?php echo $no; ?>" disabled><?php if($res['HR_EId']==0) { ?><option style="background-color:#B4B4B4;padding:1px;" value="0">Select Employee</option><?php } else { ?>
<?php $sqlE1=mysql_query("select hrm_employee.EmployeeID,EmpCode,Fname,Sname,Lname from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee_general.EmployeeID=".$res['HR_EId'], $con); $resE1=mysql_fetch_assoc($sqlE1); 
$Ename1=$resE1['EmpCode'].' - '.$resE1['Fname'].' '.$resE1['Sname'].' '.$resE1['Lname']; ?>	
	<option style="background-color:#A4FFA4;padding:1px;" value="<?php echo $res['HR_EId']; ?>"><?php echo $Ename1; ?></option><?php } ?>
<?php $sqlE_HR=mysql_query("select hrm_employee.EmployeeID,EmpCode,Fname,Sname,Lname from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee_general.DepartmentId=1 order by Fname ASC", $con); while($resE_HR=mysql_fetch_assoc($sqlE_HR)) 
{ $Ename_HR=$resE_HR['EmpCode'].' - '.$resE_HR['Fname'].' '.$resE_HR['Sname'].' '.$resE_HR['Lname']; ?>
 <option value="<?php echo $resE_HR['EmployeeID']; ?>" style="padding:1px;"><?php echo $Ename_HR; ?></option><?php } ?></select></td>
 
    <?php // R&D // ?>
	<td align="center" style="" class="All_150"><select style="width:148px;font-size:12px; font-family:Georgia;height:20px;" id="SelEmpRD_<?php echo $no; ?>" name="SelEmpRD_<?php echo $no; ?>" disabled><?php if($res['RD_EId']==0) { ?><option style="background-color:#B4B4B4;padding:1px;" value="0">Select Employee</option><?php } else { ?>
<?php $sqlE2=mysql_query("select hrm_employee.EmployeeID,EmpCode,Fname,Sname,Lname from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee_general.EmployeeID=".$res['RD_EId'], $con); $resE2=mysql_fetch_assoc($sqlE2); 
$Ename2=$resE2['EmpCode'].' - '.$resE2['Fname'].' '.$resE2['Sname'].' '.$resE2['Lname']; ?>	
	<option style="background-color:#A4FFA4;padding:1px;" value="<?php echo $res['RD_EId']; ?>"><?php echo $Ename2; ?></option><?php } ?>
<?php $sqlE_RD=mysql_query("select hrm_employee.EmployeeID,EmpCode,Fname,Sname,Lname from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee_general.DepartmentId=2 order by Fname ASC", $con); while($resE_RD=mysql_fetch_assoc($sqlE_RD)) 
{ $Ename_RD=$resE_RD['EmpCode'].' - '.$resE_RD['Fname'].' '.$resE_RD['Sname'].' '.$resE_RD['Lname']; ?>
 <option value="<?php echo $resE_RD['EmployeeID']; ?>" style="padding:1px;"><?php echo $Ename_RD; ?></option><?php } ?></select></td>
 
    <?php // PD // ?>
	<td align="center" style="" class="All_150"><select style="width:148px;font-size:12px; font-family:Georgia;height:20px;" id="SelEmpPD_<?php echo $no; ?>" name="SelEmpPD_<?php echo $no; ?>" disabled><?php if($res['PD_EId']==0) { ?><option style="background-color:#B4B4B4;padding:1px;" value="0">Select Employee</option><?php } else { ?>
<?php $sqlE3=mysql_query("select hrm_employee.EmployeeID,EmpCode,Fname,Sname,Lname from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee_general.EmployeeID=".$res['PD_EId'], $con); $resE3=mysql_fetch_assoc($sqlE3); 
$Ename3=$resE3['EmpCode'].' - '.$resE3['Fname'].' '.$resE3['Sname'].' '.$resE3['Lname']; ?>	
	<option style="background-color:#A4FFA4;padding:1px;" value="<?php echo $res['PD_EId']; ?>"><?php echo $Ename3; ?></option><?php } ?>
<?php $sqlE_PD=mysql_query("select hrm_employee.EmployeeID,EmpCode,Fname,Sname,Lname from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee_general.DepartmentId=3 order by Fname ASC", $con); while($resE_PD=mysql_fetch_assoc($sqlE_PD)) 
{ $Ename_PD=$resE_PD['EmpCode'].' - '.$resE_PD['Fname'].' '.$resE_PD['Sname'].' '.$resE_PD['Lname']; ?>
 <option value="<?php echo $resE_PD['EmployeeID']; ?>" style="padding:1px;"><?php echo $Ename_PD; ?></option><?php } ?></select></td>
	
	<?php // PRODUCTION // ?>
	<td align="center" style="" class="All_150"><select style="width:148px;font-size:12px; font-family:Georgia;height:20px;" id="SelEmpPROD_<?php echo $no; ?>" name="SelEmpPROD_<?php echo $no; ?>" disabled><?php if($res['PRODUCTION_EId']==0) { ?><option style="background-color:#B4B4B4;padding:1px;" value="0">Select Employee</option><?php } else { ?>
<?php $sqlE4=mysql_query("select hrm_employee.EmployeeID,EmpCode,Fname,Sname,Lname from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee_general.EmployeeID=".$res['PRODUCTION_EId'], $con); $resE4=mysql_fetch_assoc($sqlE4); 
$Ename4=$resE4['EmpCode'].' - '.$resE4['Fname'].' '.$resE4['Sname'].' '.$resE4['Lname']; ?>	
	<option style="background-color:#A4FFA4;padding:1px;" value="<?php echo $res['PRODUCTION_EId']; ?>"><?php echo $Ename4; ?></option><?php } ?>
<?php $sqlE_PROD=mysql_query("select hrm_employee.EmployeeID,EmpCode,Fname,Sname,Lname from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee_general.DepartmentId=4 order by Fname ASC", $con); while($resE_PROD=mysql_fetch_assoc($sqlE_PROD)) 
{ $Ename_PROD=$resE_PROD['EmpCode'].' - '.$resE_PROD['Fname'].' '.$resE_PROD['Sname'].' '.$resE_PROD['Lname']; ?>
 <option value="<?php echo $resE_PROD['EmployeeID']; ?>" style="padding:1px;"><?php echo $Ename_PROD; ?></option><?php } ?></select></td>
 
	<?php // PROCESSING // ?>
	<td align="center" style="" class="All_150"><select style="width:148px;font-size:12px; font-family:Georgia;height:20px;" id="SelEmpPROSS_<?php echo $no; ?>" name="SelEmpPROSS_<?php echo $no; ?>" disabled><?php if($res['PPROCESSING_EId']==0) { ?><option style="background-color:#B4B4B4;padding:1px;" value="0">Select Employee</option><?php } else { ?>
<?php $sqlE5=mysql_query("select hrm_employee.EmployeeID,EmpCode,Fname,Sname,Lname from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee_general.EmployeeID=".$res['PPROCESSING_EId'], $con); $resE5=mysql_fetch_assoc($sqlE5); 
$Ename5=$resE5['EmpCode'].' - '.$resE5['Fname'].' '.$resE5['Sname'].' '.$resE5['Lname']; ?>	
	<option style="background-color:#A4FFA4;padding:1px;" value="<?php echo $res['PPROCESSING_EId']; ?>"><?php echo $Ename5; ?></option><?php } ?>
<?php $sqlE_PROSS=mysql_query("select hrm_employee.EmployeeID,EmpCode,Fname,Sname,Lname from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee_general.DepartmentId=5 order by Fname ASC", $con); while($resE_PROSS=mysql_fetch_assoc($sqlE_PROSS)) 
{ $Ename_PROSS=$resE_PROSS['EmpCode'].' - '.$resE_PROSS['Fname'].' '.$resE_PROSS['Sname'].' '.$resE_PROSS['Lname']; ?>
 <option value="<?php echo $resE_PROSS['EmployeeID']; ?>" style="padding:1px;"><?php echo $Ename_PROSS; ?></option><?php } ?></select></td>
 
	<?php // SALES // ?>
	<td align="center" style="" class="All_150"><select style="width:148px;font-size:12px; font-family:Georgia;height:20px;" id="SelEmpSALES_<?php echo $no; ?>" name="SelEmpSALES_<?php echo $no; ?>" disabled><?php if($res['SALES_EId']==0) { ?><option style="background-color:#B4B4B4;padding:1px;" value="0">Select Employee</option><?php } else { ?>
<?php $sqlE6=mysql_query("select hrm_employee.EmployeeID,EmpCode,Fname,Sname,Lname from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee_general.EmployeeID=".$res['SALES_EId'], $con); $resE6=mysql_fetch_assoc($sqlE6); 
$Ename6=$resE6['EmpCode'].' - '.$resE6['Fname'].' '.$resE6['Sname'].' '.$resE6['Lname']; ?>	
	<option style="background-color:#A4FFA4;padding:1px;" value="<?php echo $res['SALES_EId']; ?>"><?php echo $Ename6; ?></option><?php } ?>
<?php $sqlE_SALES=mysql_query("select hrm_employee.EmployeeID,EmpCode,Fname,Sname,Lname from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee_general.DepartmentId=6 order by Fname ASC", $con); while($resE_SALES=mysql_fetch_assoc($sqlE_SALES)) 
{ $Ename_SALES=$resE_SALES['EmpCode'].' - '.$resE_SALES['Fname'].' '.$resE_SALES['Sname'].' '.$resE_SALES['Lname']; ?>
 <option value="<?php echo $resE_SALES['EmployeeID']; ?>" style="padding:1px;"><?php echo $Ename_SALES; ?></option><?php } ?></select></td>
 
	<?php // LOGISTIC // ?>
	<td align="center" style="" class="All_150"><select style="width:148px;font-size:12px; font-family:Georgia;height:20px;" id="SelEmpLOG_<?php echo $no; ?>" name="SelEmpLOG_<?php echo $no; ?>" disabled><?php if($res['LOGISTICS_EId']==0) { ?><option style="background-color:#B4B4B4;padding:1px;" value="0">Select Employee</option><?php } else { ?>
<?php $sqlE7=mysql_query("select hrm_employee.EmployeeID,EmpCode,Fname,Sname,Lname from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee_general.EmployeeID=".$res['LOGISTICS_EId'], $con); $resE7=mysql_fetch_assoc($sqlE7); 
$Ename7=$resE7['EmpCode'].' - '.$resE7['Fname'].' '.$resE7['Sname'].' '.$resE7['Lname']; ?>	
	<option style="background-color:#A4FFA4;padding:1px;" value="<?php echo $res['LOGISTICS_EId']; ?>"><?php echo $Ename7; ?></option><?php } ?>
<?php $sqlE_LOG=mysql_query("select hrm_employee.EmployeeID,EmpCode,Fname,Sname,Lname from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee_general.DepartmentId=7 order by Fname ASC", $con); while($resE_LOG=mysql_fetch_assoc($sqlE_LOG)) 
{ $Ename_LOG=$resE_LOG['EmpCode'].' - '.$resE_LOG['Fname'].' '.$resE_LOG['Sname'].' '.$resE_LOG['Lname']; ?>
 <option value="<?php echo $resE_LOG['EmployeeID']; ?>" style="padding:1px;"><?php echo $Ename_LOG; ?></option><?php } ?></select></td>
 
	<?php // FINANCE // ?>
	<td align="center" style="" class="All_150"><select style="width:148px;font-size:12px; font-family:Georgia;height:20px;" id="SelEmpFIN_<?php echo $no; ?>" name="SelEmpFIN_<?php echo $no; ?>" disabled><?php if($res['FINANCE_EId']==0) { ?><option style="background-color:#B4B4B4;padding:1px;" value="0">Select Employee</option><?php } else { ?>
<?php $sqlE8=mysql_query("select hrm_employee.EmployeeID,EmpCode,Fname,Sname,Lname from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee_general.EmployeeID=".$res['FINANCE_EId'], $con); $resE8=mysql_fetch_assoc($sqlE8); 
$Ename8=$resE8['EmpCode'].' - '.$resE8['Fname'].' '.$resE8['Sname'].' '.$resE8['Lname']; ?>	
	<option style="background-color:#A4FFA4;padding:1px;" value="<?php echo $res['FINANCE_EId']; ?>"><?php echo $Ename8; ?></option><?php } ?>
<?php $sqlE_FIN=mysql_query("select hrm_employee.EmployeeID,EmpCode,Fname,Sname,Lname from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee_general.DepartmentId=8 order by Fname ASC", $con); while($resE_FIN=mysql_fetch_assoc($sqlE_FIN)) 
{ $Ename_FIN=$resE_FIN['EmpCode'].' - '.$resE_FIN['Fname'].' '.$resE_FIN['Sname'].' '.$resE_FIN['Lname']; ?>
 <option value="<?php echo $resE_FIN['EmployeeID']; ?>" style="padding:1px;"><?php echo $Ename_FIN; ?></option><?php } ?></select></td>
 
	<?php // IT // ?>
	<td align="center" style="" class="All_150"><select style="width:148px;font-size:12px; font-family:Georgia;height:20px;" id="SelEmpIT_<?php echo $no; ?>" name="SelEmpIT_<?php echo $no; ?>" disabled><?php if($res['IT_EId']==0) { ?><option style="background-color:#B4B4B4;padding:1px;" value="0">Select Employee</option><?php } else { ?>
<?php $sqlE9=mysql_query("select hrm_employee.EmployeeID,EmpCode,Fname,Sname,Lname from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee_general.EmployeeID=".$res['IT_EId'], $con); $resE9=mysql_fetch_assoc($sqlE9); 
$Ename9=$resE9['EmpCode'].' - '.$resE9['Fname'].' '.$resE9['Sname'].' '.$resE9['Lname']; ?>	
	<option style="background-color:#A4FFA4;padding:1px;" value="<?php echo $res['IT_EId']; ?>"><?php echo $Ename9; ?></option><?php } ?>
<?php $sqlE_IT=mysql_query("select hrm_employee.EmployeeID,EmpCode,Fname,Sname,Lname from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee_general.DepartmentId=9 order by Fname ASC", $con); while($resE_IT=mysql_fetch_assoc($sqlE_IT)) 
{ $Ename_IT=$resE_IT['EmpCode'].' - '.$resE_IT['Fname'].' '.$resE_IT['Sname'].' '.$resE_IT['Lname']; ?>
 <option value="<?php echo $resE_IT['EmployeeID']; ?>" style="padding:1px;"><?php echo $Ename_IT; ?></option><?php } ?></select></td>
 
	<?php // LEGAL // ?>
	<td align="center" style="" class="All_150"><select style="width:148px;font-size:12px; font-family:Georgia;height:20px;" id="SelEmpLIG_<?php echo $no; ?>" name="SelEmpLIG_<?php echo $no; ?>" disabled><?php if($res['LEGAL_EId']==0) { ?><option style="background-color:#B4B4B4;padding:1px;" value="0">Select Employee</option><?php } else { ?>
<?php $sqlE10=mysql_query("select hrm_employee.EmployeeID,EmpCode,Fname,Sname,Lname from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee_general.EmployeeID=".$res['LEGAL_EId'], $con); $resE10=mysql_fetch_assoc($sqlE10); 
$Ename10=$resE10['EmpCode'].' - '.$resE10['Fname'].' '.$resE10['Sname'].' '.$resE10['Lname']; ?>	
	<option style="background-color:#A4FFA4;padding:1px;" value="<?php echo $res['LEGAL_EId']; ?>"><?php echo $Ename10; ?></option><?php } ?>
<?php $sqlE_LIG=mysql_query("select hrm_employee.EmployeeID,EmpCode,Fname,Sname,Lname from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee_general.DepartmentId=10 order by Fname ASC", $con); while($resE_LIG=mysql_fetch_assoc($sqlE_LIG)) 
{ $Ename_LIG=$resE_LIG['EmpCode'].' - '.$resE_LIG['Fname'].' '.$resE_LIG['Sname'].' '.$resE_LIG['Lname']; ?>
 <option value="<?php echo $resE_LIG['EmployeeID']; ?>" style="padding:1px;"><?php echo $Ename_LIG; ?></option><?php } ?></select></td>
 
	<?php // ADMIN // ?>
	<td align="center" style="" class="All_150"><select style="width:148px;font-size:12px; font-family:Georgia;height:20px;" id="SelEmpADM_<?php echo $no; ?>" name="SelEmpADM_<?php echo $no; ?>" disabled><?php if($res['ADMIN_EId']==0) { ?><option style="background-color:#B4B4B4;padding:1px;" value="0">Select Employee</option><?php } else { ?>
<?php $sqlE11=mysql_query("select hrm_employee.EmployeeID,EmpCode,Fname,Sname,Lname from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee_general.EmployeeID=".$res['ADMIN_EId'], $con); $resE11=mysql_fetch_assoc($sqlE11); 
$Ename11=$resE11['EmpCode'].' - '.$resE11['Fname'].' '.$resE11['Sname'].' '.$resE11['Lname']; ?>	
	<option style="background-color:#A4FFA4;padding:1px;" value="<?php echo $res['ADMIN_EId']; ?>"><?php echo $Ename11; ?></option><?php } ?>
<?php $sqlE_ADM=mysql_query("select hrm_employee.EmployeeID,EmpCode,Fname,Sname,Lname from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee_general.DepartmentId=11 order by Fname ASC", $con); while($resE_ADM=mysql_fetch_assoc($sqlE_ADM)) 
{ $Ename_ADM=$resE_ADM['EmpCode'].' - '.$resE_ADM['Fname'].' '.$resE_ADM['Sname'].' '.$resE_ADM['Lname']; ?>
 <option value="<?php echo $resE_ADM['EmployeeID']; ?>" style="padding:1px;"><?php echo $Ename_ADM; ?></option><?php } ?></select></td>
 
	<?php // MARKETING // ?>
	<td align="center" style="" class="All_150"><select style="width:148px;font-size:12px; font-family:Georgia;height:20px;" id="SelEmpMRK_<?php echo $no; ?>" name="SelEmpMRK_<?php echo $no; ?>" disabled><?php if($res['MARKETING_EId']==0) { ?><option style="background-color:#B4B4B4;padding:1px;" value="0">Select Employee</option><?php } else { ?>
<?php $sqlE12=mysql_query("select hrm_employee.EmployeeID,EmpCode,Fname,Sname,Lname from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee_general.EmployeeID=".$res['MARKETING_EId'], $con); $resE12=mysql_fetch_assoc($sqlE12); 
$Ename12=$resE12['EmpCode'].' - '.$resE12['Fname'].' '.$resE12['Sname'].' '.$resE12['Lname']; ?>	
	<option style="background-color:#A4FFA4;padding:1px;" value="<?php echo $res['MARKETING_EId']; ?>"><?php echo $Ename12; ?></option><?php } ?>
<?php $sqlE_MRK=mysql_query("select hrm_employee.EmployeeID,EmpCode,Fname,Sname,Lname from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee_general.DepartmentId=12 order by Fname ASC", $con); while($resE_MRK=mysql_fetch_assoc($sqlE_MRK)) 
{ $Ename_MRK=$resE_MRK['EmpCode'].' - '.$resE_MRK['Fname'].' '.$resE_MRK['Sname'].' '.$resE_MRK['Lname']; ?>
 <option value="<?php echo $resE_MRK['EmployeeID']; ?>" style="padding:1px;"><?php echo $Ename_MRK; ?></option><?php } ?></select></td>
 
	<?php // QA // ?>
	<td align="center" style="" class="All_150"><select style="width:148px;font-size:12px; font-family:Georgia;height:20px;" id="SelEmpQA_<?php echo $no; ?>" name="SelEmpQA_<?php echo $no; ?>" disabled><?php if($res['QA_EId']==0) { ?><option style="background-color:#B4B4B4;padding:1px;" value="0">Select Employee</option><?php } else { ?>
<?php $sqlE13=mysql_query("select hrm_employee.EmployeeID,EmpCode,Fname,Sname,Lname from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee_general.EmployeeID=".$res['QA_EId'], $con); $resE13=mysql_fetch_assoc($sqlE13); 
$Ename13=$resE13['EmpCode'].' - '.$resE13['Fname'].' '.$resE13['Sname'].' '.$resE13['Lname']; ?>	
	<option style="background-color:#A4FFA4;padding:1px;" value="<?php echo $res['QA_EId']; ?>"><?php echo $Ename13; ?></option><?php } ?>
<?php $sqlE_QA=mysql_query("select hrm_employee.EmployeeID,EmpCode,Fname,Sname,Lname from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee_general.DepartmentId=24 order by Fname ASC", $con); while($resE_QA=mysql_fetch_assoc($sqlE_QA)) 
{ $Ename_QA=$resE_QA['EmpCode'].' - '.$resE_QA['Fname'].' '.$resE_QA['Sname'].' '.$resE_QA['Lname']; ?>
 <option value="<?php echo $resE_QA['EmployeeID']; ?>" style="padding:1px;"><?php echo $Ename_QA; ?></option><?php } ?></select></td>
 
 <?php // FS // ?>
	<td align="center" style="" class="All_150"><select style="width:148px;font-size:12px; font-family:Georgia;height:20px;" id="SelEmpFS_<?php echo $no; ?>" name="SelEmpFS_<?php echo $no; ?>" disabled><?php if($res['FS_EId']==0) { ?><option style="background-color:#B4B4B4;padding:1px;" value="0">Select Employee</option><?php } else { ?>
<?php $sqlE14=mysql_query("select hrm_employee.EmployeeID,EmpCode,Fname,Sname,Lname from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee_general.EmployeeID=".$res['FS_EId'], $con); $resE14=mysql_fetch_assoc($sqlE14); 
$Ename14=$resE14['EmpCode'].' - '.$resE14['Fname'].' '.$resE14['Sname'].' '.$resE14['Lname']; ?>	
	<option style="background-color:#A4FFA4;padding:1px;" value="<?php echo $res['FS_EId']; ?>"><?php echo $Ename14; ?></option><?php } ?>
<?php $sqlE_FS=mysql_query("select hrm_employee.EmployeeID,EmpCode,Fname,Sname,Lname from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee_general.DepartmentId=25 order by Fname ASC", $con); while($resE_FS=mysql_fetch_assoc($sqlE_FS)) 
{ $Ename_FS=$resE_FS['EmpCode'].' - '.$resE_FS['Fname'].' '.$resE_FS['Sname'].' '.$resE_FS['Lname']; ?>
 <option value="<?php echo $resE_FS['EmployeeID']; ?>" style="padding:1px;"><?php echo $Ename_FS; ?></option><?php } ?></select></td>
</tr>
<?php $no++;} ?> 
<tr bgcolor="#7a6189">
<td colspan="16">
 <table>
<?php if($_SESSION['User_Permission']=='Edit'){?>
  <tr>
   <td style="width:70px;">&nbsp;</td>
   <td align="center" style="width:95px;"><input type="hidden" name="ComId" value="<?php echo $CompanyId; ?>" />
   <input type="button" name="EditE11" id="EditE11" style="width:90px; display:block;" value="edit" onClick="EEdit()">
   <input type="submit" name="SaveE11" id="SaveE11" style="width:90px;display:none;" value="save"></td>
   <td align="center" style="width:95px;"><input type="button" style="width:90px;" value="refresh" onClick="javascript:window.location='AssignEmpState.php'"/></td>
  </tr>
<?php } ?>
 </table>
</td> 
</tr>
</form>
<?php }?> 
   </table>
 </td>
</tr> 
   </table>
 </td>
</tr> 
<?php //---------------------------------------Close Record----------------------------------------------------------------- ?>
	   </table>
     </tr>
</table>
		 </td> 
	   </tr>
	 </table>
   </td>
 </tr>
		   </table>
		    </form>  		
		</td>
        <?php } ?>
		<?php //-------------------------------------------------------------------------------------------------------- ?>
		<td align="left" width="20%">&nbsp;</td>
	</tr>
</table>
<?php //************************************************************************************************************************************************************?>
<?php //**********************************************END*****END*****END******END******END***************************************************************?>
<?php //************************************************************************************************************************************************************?>
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