<?php session_start();
if($_SESSION['login'] = true){require_once('../AdminUser/config/config.php');}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('../AdminUser/logcheck.php');
if($_SESSION['logCheckEmp']!=$logemp){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('EmpMenuSession.php');}
//**********************************
$EMPID=$_REQUEST['ID'];
$SqEC=mysql_query("select EmpCode from hrm_employee where EmployeeID=".$EMPID, $con); $ReEC=mysql_fetch_assoc($SqEC); $resEC=mysql_fetch_assoc($SqEC);
$Lenght=strlen($resEC['EmpCode']); 
if($Lenght==1){$FileN='000'.$resEC['EmpCode'];} 
elseif($Lenght==2){$FileN='00'.$resEC['EmpCode'];} 
elseif($Lenght==3){$FileN='0'.$resEC['EmpCode'];}
elseif($Lenght==4){$FileN=$resEC['EmpCode'];}

//**********************************

?> 
<html>
<head>
<title>Asset Request</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet"/>
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<link rel="stylesheet" type="text/css" href="src/css/jscal2.css"/>
<link rel="stylesheet" type="text/css" href="src/css/border-radius.css"/>
<link rel="stylesheet" type="text/css" href="src/css/steel/steel.css"/>
<style>
.SaveButton {background-image:url(images/save.gif); width:20px; height:20px; background-repeat:no-repeat; background-color:#FFFFFF; border-color:#FFFFFF; border-bottom:inherit;}
.EditSelect { font-family:Georgia; font-size:12px; height:18px;}
.EditInput { font-family:Georgia; font-size:12px; height:18px;}
.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}
</style>
<script type="text/javascript" src="src/js/jscal2.js"></script>
<script type="text/javascript" src="src/js/lang/en.js"></script>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<script type="text/javascript" language="javascript">

</script>

<?php /************ Check It**********/ ?>
</head>
<body class="body">
<?php 
$SqlEmp = mysql_query("SELECT * FROM hrm_employee WHERE EmployeeID=".$EMPID, $con);  $ResEmp=mysql_fetch_assoc($SqlEmp);
$Ename = $ResEmp['Fname'].'&nbsp;'.$ResEmp['Sname'].'&nbsp;'.$ResEmp['Lname']; $LEC=strlen($ResEmp['EmpCode']); 
if($LEC==1){$EC='000'.$ResEmp['EmpCode'];} if($LEC==2){$EC='00'.$ResEmp['EmpCode'];} if($LEC==3){$EC='0'.$ResEmp['EmpCode'];} if($LEC>=4){$EC=$ResEmp['EmpCode'];}
$sqlG=mysql_query("select GradeId from hrm_employee_general where EmployeeID=".$EMPID, $con); $resG=mysql_fetch_assoc($sqlG);
$sqlMax=mysql_query("select AssetEmpReqId from hrm_asset_employee_request where EmployeeID=".$EMPID, $con); $rowMax=mysql_num_rows($sqlMax); 
?>
<span id="EventSpan1"></span>
<table class="table" border="0" align="center">
<tr><td valign="top" align="center">
      <table width="100%" style="margin-top:0px;" border="0">
	    <tr>
	        <td valign="top" width="100%" id="MainWindow">
<?php //**********************************************START*****START*****START******START******START***************************************************************?>
  <table border="0" style="margin-top:0px; width:100%; height:300px;">
 <tr>
<?php //*********************************************************************************************************************************************************?>
<td align="center" id="Eexp" valign="top" style="width:500px;"> 
<input type="hidden" id="ID" value="<?php echo $_REQUEST['ID']; ?>" /> 
<form name="form1" id="form1" enctype="multipart/form-data" method="post" onSubmit="return validate(this)">           
<table border="0">
<tr bgcolor="#7a6189">
 <td>
  <table>
    <tr style="height:20px;">
    <td style="font-weight:bold;height:22px;font-family:Times New Roman;font-size:14px;color:#FFFFFF;" valign="bottom">EmpCode :</td>
	<td style="font-weight:bold;height:22px;font-family:Times New Roman;font-size:14px;width:50px;color:#FFFFAA;" valign="bottom"><?php echo $EC; ?></td>
    <td style="font-weight:bold;height:22px;font-family:Times New Roman;font-size:14px;color:#FFFFFF;" valign="bottom">Name :</td>
	<td style="font-weight:bold;height:22px;font-family:Times New Roman;font-size:14px;color:#FFFFAA;" valign="bottom"><?php echo $Ename; ?></td>
    <td class="font4" style="left" valign="bottom"><b><span id="msgspan"><?php //echo $msg; ?></span></b></td>
    </tr>
  </table>
 </td>
</tr>
<tr> 
<td align="left" valign="top">
<table border="0" id="TEmp" style="font-weight:bold;height:22px;font-family:Times New Roman;font-size:12px;" cellpadding="1" cellspacing="0">
<?php $sql=mysql_query("select * from hrm_asset_employee_request where AssetEmpReqId=".$_REQUEST['Aeri'], $con); $res=mysql_fetch_array($sql); ?>
<form name="OformEdit" method="post" onSubmit="return OvalidateEdit(this)">
<input type="hidden" name="AssetEmpReqId" id="AssetEmpReqId" value="<?php echo $_REQUEST['Aeri']; ?>" />
<tr>
 <td style="width:120px;"><b>Asset Name:</b></td>
 <td style="width:180px;"><?php $sqlAn=mysql_query("select AssetName from hrm_asset_name where AssetNId=".$res['AssetNId']); $resAn=mysql_fetch_array($sqlAn); ?>
 <select name="AssetNId" id="AssetNId" style="height:22px;font-family:Times New Roman;font-size:12px;width:120px;" onChange="FunChgAsset(this.value,<?php echo $EMPID.','.$resG['GradeId']; ?>)"><option value="<?php echo $res['AssetNId']; ?>"><?php echo $resAn['AssetName']; ?></option>
<?php $sqlNA=mysql_query("select * from hrm_asset_name where Status='A' order by AssetName ASC", $con); while($resNA=mysql_fetch_assoc($sqlNA)) { ?>
<option value="<?php echo $resNA['AssetNId']; ?>"><?php echo $resNA['AssetName']; ?></option><?php } ?></select></td>
 <td style="width:120px;">Maximum Limit:</td>
 <td style="width:110px;"><input name="MaxLimitAmt" id="MaxLimitAmt" style="font-family:Times New Roman;width:80px;text-align:left;background-color:#E0DBE3;font-size:14px;font-weight:bold;text-align:center;vertical-align:middle;" readonly value="<?php echo intval($res['MaxLimitAmt']); ?>"/></td>
</tr>
<tr>
 <td>Company Name</td>
 <td><input name="ComName" id="ComName" style="width:150px;height:22px;font-family:Times New Roman;font-size:12px;" value="<?php echo $res['ComName']; ?>" /></td>
 <td>Amount PerMonth</td>
 <td><input name="ReqAmt" id="ReqAmt" style="width:80px;height:22px;font-family:Times New Roman;font-size:12px;" style="text-align:right;" value="<?php echo round($res['ReqAmtPerMonth']).'.00'; ?>" readonly/></td>
</tr>
<tr>
 <td>Model No</td><td><input name="ModelNo" id="ModelNo" style="width:150px;height:22px;font-family:Times New Roman;font-size:12px;" value="<?php echo $res['ModelNo']; ?>" /></td>
 <td>Price</td><td><input name="Price" id="Price" style="width:80px;height:22px;font-family:Times New Roman;font-size:12px;" style="text-align:right;" value="<?php echo intval($res['Price']); ?>" /></td>
</tr>
<tr>
 <td>Model Name</td><td><input name="ModelName" id="ModelName" style="width:150px;height:22px;font-family:Times New Roman;font-size:12px;" value="<?php echo $res['ModelName']; ?>" /></td>
 <td>Request Amount</td><td><input name="ReqAmt" id="ReqAmt" style="width:80px;height:22px;font-family:Times New Roman;font-size:12px;" style="text-align:right;" value="<?php echo intval($res['ReqAmt']); ?>"/></td>
</tr>
<tr>
 <td>Bill No</td><td><input name="BillNo" id="BillNo" style="width:150px;height:22px;font-family:Times New Roman;font-size:12px;" value="<?php echo $res['BillNo']; ?>" /></td>
 <td>Approval Amount</td><td><input name="ApprovalAmt" id="ApprovalAmt" style="width:80px;height:22px;font-family:Times New Roman;font-size:12px;" style="text-align:right;" value="<?php echo intval($res['ApprovalAmt']); ?>" /></td>
</tr>
<tr>
 <td>EMI No</td><td><input name="EmiNo" id="EmiNo" style="width:150px;height:22px;font-family:Times New Roman;font-size:12px;" value="<?php echo $res['EmiNo']; ?>" /></td>
 <td>Amount ExpiryDate</td>
 <td><input name="ReqAmtExpiryDate" id="ReqAmtExpiryDate" style="width:80px;height:22px;font-family:Times New Roman;font-size:12px;text-align:center;" value="<?php echo date("d-m-Y",strtotime($res['ReqAmtExpiryDate'])); ?>" readonly/></td>
</tr>
<tr>
 <td>Sr. No</td><td><input name="Srn" id="Srn" style="width:150px;height:22px;font-family:Times New Roman;font-size:12px;" value="<?php echo $res['Srn']; ?>" /></td>
 <td>Request Date</td><td><input name="ReqDate" id="ReqDate" style="width:80px;height:22px;font-family:Times New Roman;font-size:12px;text-align:center;" value="<?php echo date("d-m-Y",strtotime($res['ReqDate'])); ?>" style="text-align:center;" readonly/><button id="ReqDateBtn" class="CalenderButton"></button></td>
</tr>
<tr>
 <td>Dealer Name</td><td><input name="DealeName" id="DealeName" style="width:150px;height:22px;font-family:Times New Roman;font-size:12px;" value="<?php echo $res['DealeName']; ?>" /></td>
 <td>Purchase Date</td><td><input name="PurDate" id="PurDate" style="width:80px;height:22px;font-family:Times New Roman;font-size:12px;text-align:center;" value="<?php echo date("d-m-Y",strtotime($res['PurDate'])); ?>" style="text-align:center;" readonly/><button id="PurDateBtn" class="CalenderButton"></button></td>
</tr>
<tr>
 <td>Dealer ContactNo</td><td><input name="DealerContNo" id="DealerContNo" style="width:150px;height:22px;font-family:Times New Roman;font-size:12px;" value="<?php echo $res['DealerContNo']; ?>" /></td>
 <td>Model Expiry Date</td><td><input name="ExpiryDate" id="ExpiryDate" style="width:80px;height:22px;font-family:Times New Roman;font-size:12px;text-align:center;" value="<?php echo date("d-m-Y",strtotime($res['ExpiryDate'])); ?>" style="text-align:center;" readonly/><button id="ExpiryDateBtn" class="CalenderButton"></button></td>
</tr>
<tr>
 <td>Dealer Email-Id</td><td><input name="DealerEmail" id="DealerEmail" style="width:150px;height:22px;font-family:Times New Roman;font-size:12px;" value="<?php echo $res['DealerEmail']; ?>" /></td>
 <td>Quantity</td><td><input name="Quantity" id="Quantity" style="width:80px;height:22px;font-family:Times New Roman;font-size:12px;" value="<?php echo $res['Quantity']; ?>" style="text-align:center;" /></td>
</tr>
<tr>
 <td>Dealer Address</td><td><input name="DealerAdd" id="DealerAdd" style="width:150px;height:22px;font-family:Times New Roman;font-size:12px;" value="<?php echo $res['DealerAdd']; ?>" /></td>
 <td valign="top">Identity Remark</td><td valign="top"><input name="IdentityRemark" id="IdentityRemark" style="width:80px;height:22px;font-family:Times New Roman;font-size:12px;" value="<?php echo $res['IdentityRemark']; ?>" /></td>
</tr>
<tr>
 <td>Battery Company</td><td><input name="BatteryCom" id="BatteryCom" style="width:150px;height:22px;font-family:Times New Roman;font-size:12px;" value="<?php echo $res['BatteryCom']; ?>" /></td>
 <td>HOD Approval</td><td><select name="FApproval" id="FApproval" style="width:80px;height:22px;font-family:Times New Roman;font-size:12px;"><option value="<?php if($res['HODApprovalStatus']==0){echo 'Draft';}elseif($res['HODApprovalStatus']==1){echo 'Pending';}elseif($res['HODApprovalStatus']==2){echo 'Approved';}elseif($res['HODApprovalStatus']==3){echo 'Rejected';}elseif($res['HODApprovalStatus']==4){if($res['FwdApprovalStatus']==0){echo 'Draft';}elseif($res['FwdApprovalStatus']==1){echo 'Pending';}elseif($res['FwdApprovalStatus']==2){echo 'Approved';}elseif($res['FwdApprovalStatus']==3){echo 'Rejected';}} ?>"><?php if($res['HODApprovalStatus']==0){echo 'Draft';}elseif($res['HODApprovalStatus']==1){echo 'Pending';}elseif($res['HODApprovalStatus']==2){echo 'Approved';}elseif($res['HODApprovalStatus']==3){echo 'Rejected';}elseif($res['HODApprovalStatus']==4){if($res['FwdApprovalStatus']==0){echo 'Draft';}elseif($res['FwdApprovalStatus']==1){echo 'Pending';}elseif($res['FwdApprovalStatus']==2){echo 'Approved';}elseif($res['FwdApprovalStatus']==3){echo 'Rejected';}} ?></option><?php if($res['HODApprovalStatus']!=0){ ?> <option value="0">Draft</option><?php } ?><?php if($res['HODApprovalStatus']!=1){ ?><option value="1">Pending</option><?php } ?><?php if($res['HODApprovalStatus']!=2){ ?><option value="2">Approved</option><?php } ?></select></td>
</tr>
<tr>
 <td>Battery Model</td><td><input name="BatteryModel" id="BatteryModel" style="width:150px;height:22px;font-family:Times New Roman;font-size:12px;" value="<?php echo $res['BatteryModel']; ?>" /></td> 
 <td>IT Approval</td><td><select name="SApproval" id="SApproval" style="width:80px;height:22px;font-family:Times New Roman;font-size:12px;"><option value="<?php echo $res['ITApprovalStatus']; ?>"><?php if($res['ITApprovalStatus']==0){echo 'Draft';}elseif($res['ITApprovalStatus']==1){echo 'Pending';}elseif($res['ITApprovalStatus']==2){echo 'Approved';}elseif($res['ITApprovalStatus']==3){echo 'Rejected';} ?></option><?php if($res['ITApprovalStatus']!=0){ ?> <option value="0">Draft</option><?php } ?><?php if($res['ITApprovalStatus']!=1){ ?><option value="1">Pending</option><?php } ?><?php if($res['ITApprovalStatus']!=2){ ?><option value="2">Approved</option><?php } ?></select></td>
</tr>
<tr>
 <td>Battery Expiry</td><td><input name="BatteryExpiry" id="BatteryExpiry" style="width:80px;height:22px;font-family:Times New Roman;font-size:12px;text-align:center;" value="<?php echo date("d-m-Y",strtotime($res['BatteryExpiry'])); ?>"  style="text-align:center;" readonly/><button id="BatteryExpiryBtn" class="CalenderButton"></button><script type="text/javascript">  var cal = Calendar.setup({ onSelect:  function(cal) { cal.hide()}, showTime: true }); cal.manageFields("ReqDateBtn", "ReqDate", "%d-%m-%Y"); </script></td>
 <td>A/C Approval</td><td><select name="TApproval" id="TApproval" style="width:80px;height:22px;font-family:Times New Roman;font-size:12px;"><option value="<?php echo $res['AccPayStatus']; ?>"><?php if($res['AccPayStatus']==0){echo 'Draft';}elseif($res['AccPayStatus']==1){echo 'Pending';}elseif($res['AccPayStatus']==2){echo 'Approved';}elseif($res['AccPayStatus']==3){echo 'Rejected';} ?></option><?php if($res['AccPayStatus']!=0){ ?> <option value="0">Draft</option><?php } ?><?php if($res['AccPayStatus']!=1){ ?><option value="1">Pending</option><?php } ?><?php if($res['AccPayStatus']!=2){ ?><option value="2">Approved</option><?php } ?></select></td>
</tr>

<tr>
 <td valign="top" colspan="2"></td>
 <td>Approval Date</td><td><input name="ApprovalDate" id="ApprovalDate" style="width:80px;height:22px;font-family:Times New Roman;font-size:12px;text-align:center;" value="<?php echo date("d-m-Y",strtotime($res['ApprovalDate'])); ?>" style="text-align:center;" readonly/><button id="ApprovalDateBtn" class="CalenderButton"></button><script type="text/javascript">  var cal = Calendar.setup({ onSelect:  function(cal) { cal.hide()}, showTime: true }); cal.manageFields("ReqDateBtn", "ReqDate", "%d-%m-%Y"); cal.manageFields("ApprovalDateBtn", "ApprovalDate", "%d-%m-%Y"); cal.manageFields("PurDateBtn", "PurDate", "%d-%m-%Y"); cal.manageFields("ExpiryDateBtn", "ExpiryDate", "%d-%m-%Y"); cal.manageFields("BatteryExpiryBtn", "BatteryExpiry", "%d-%m-%Y"); </script></td>
 
</tr> 
<tr>
 <td valign="top" colspan="2"></td>
 <td>Amount Valid</td><td><input name="ReqAmtExpiryNOM" id="ReqAmtExpiryNOM" style="height:22px;font-family:Times New Roman;font-size:12px;width:50px;text-align:center;" style="text-align:center;" value="<?php echo $res['ReqAmtExpiryNOM']; ?>" />&nbsp;Month</td>
</tr>
<tr>
<td valign="top">Any Remark</td>
<td valign="top" colspan="3"><textarea name="AnyOtherRemark" id="AnyOtherRemark" cols="45" rows="1"><?php echo $res['AnyOtherRemark']; ?></textarea></td>
</tr>
	  </table>
	 </td>
    </tr>
  </table>  
</td>
</tr>
</form> 	

</table>
</td>
</tr>
</table>
</form>  
</td>
</tr> 
</table>
	  </td>
	</tr>
  </table>
 </td>
</tr>
</table>
</body>
</html>



