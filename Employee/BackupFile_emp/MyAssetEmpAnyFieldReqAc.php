<?php session_start();
if($_SESSION['login'] = true){require_once('../AdminUser/config/config.php');}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('../AdminUser/logcheck.php');
if($_SESSION['logCheckEmp']!=$logemp){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('EmpMenuSession.php');} 
date_default_timezone_set('Asia/Kolkata');

//**********************************
$_SESSION['mEEID']=$_REQUEST['ID']; $EmMPID=$_SESSION['mEEID'];
$SqEC=mysql_query("select EmpCode from hrm_employee where EmployeeID=".$EmMPID, $con); $ReEC=mysql_fetch_assoc($SqEC);
//**********************************
?> 
<html>
<head>
<title>Asset Request Details</title>
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
<?php /************ Check It**********/ ?>
</head>
<body class="body">
<?php 
$SqlEmp = mysql_query("SELECT EmpCode,Fname,Sname,Lname,DepartmentName,HqName,StateName FROM hrm_employee e inner join hrm_employee_general g on e.EmployeeID=g.EmployeeID inner join hrm_department d on g.DepartmentId=d.DepartmentId inner join hrm_headquater hq on g.HqId=hq.HqId inner join hrm_state s on g.CostCenter=s.StateId WHERE e.EmployeeID=".$EmMPID, $con);  $ResEmp=mysql_fetch_assoc($SqlEmp);
$Ename = $ResEmp['Fname'].'&nbsp;'.$ResEmp['Sname'].'&nbsp;'.$ResEmp['Lname']; $LEC=strlen($ResEmp['EmpCode']); 
 if($LEC==1){$EC='000'.$ResEmp['EmpCode'];} if($LEC==2){$EC='00'.$ResEmp['EmpCode'];} if($LEC==3){$EC='0'.$ResEmp['EmpCode'];} if($LEC>=4){$EC=$ResEmp['EmpCode'];}
?>
<table class="table" border="0">
<tr><td valign="top">
      <table width="100%" style="margin-top:0px;" border="0">
	    <tr>
	        <td valign="top" align="center"  width="100%" id="MainWindow">
<?php //**********************************************START*****START*****START******START******START***************************************************************?>
  <table border="0" style="margin-top:0px; width:100%; height:300px;">
 <tr>
<?php //*********************************************************************************************************************************************************?>
<td align="center" id="Eexp" valign="top" style="width:500px;"> 
<input type="hidden" id="ID" value="<?php echo $_REQUEST['ID']; ?>" />            
 <form enctype="multipart/form-data" name="formEAsst" method="post" onSubmit="return validate(this)">
<table border="0">
<tr>
 <td>
  <table>
    <tr style="height:20px;">
    <td style="font-weight:bold;height:22px;font-family:Times New Roman;font-size:14px;" valign="bottom">EmpCode :</td>
	<td style="font-weight:bold;height:22px;font-family:Times New Roman;font-size:14px;width:50px;color:#693434;" valign="bottom"><?php echo $EC; ?></td>
    <td style="font-weight:bold;height:22px;font-family:Times New Roman;font-size:14px;" valign="bottom">Name :</td>
	<td style="font-weight:bold;height:22px;font-family:Times New Roman;font-size:14px;color:#693434;" valign="bottom"><?php echo $Ename; ?></td>
    <td class="font4" style="left" valign="bottom">&nbsp;&nbsp;&nbsp;<b><span id="msgspan"><?php //echo $msg; ?></span></b></td>
    </tr>
    <tr style="height:20px;">
    <td style="font-weight:bold;height:22px;font-family:Times New Roman;font-size:14px;" valign="bottom">Department :</td>
	<td style="font-weight:bold;height:22px;font-family:Times New Roman;font-size:14px;width:50px;color:#693434;" valign="bottom"><?php echo $ResEmp['DepartmentName']; ?></td>
    <td style="font-weight:bold;height:22px;font-family:Times New Roman;font-size:14px;" valign="bottom">HQ :</td>
	<td style="font-weight:bold;height:22px;font-family:Times New Roman;font-size:14px;color:#693434;" valign="bottom"><?php echo $ResEmp['HqName'].' ('.$ResEmp['StateName'].')'; ?></td>
    <td class="font4" style="left" valign="bottom">&nbsp;&nbsp;&nbsp;<b><span id="msgspan"><?php //echo $msg; ?></span></b></td>
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

<tr height="20">
 <td align="left" valign="top" style="font-family:Times New Roman;color:#004993;font-size:14px;"><b>Asset Name :</b></td> 
 <?php $sqlAn=mysql_query("select AssetName from hrm_asset_name where AssetNId=".$res['AssetNId']); $resAn=mysql_fetch_array($sqlAn); ?>
 <td><input name="ModelName" id="ModelName" class="All_150" value="<?php echo strtoupper($resAn['AssetName']); ?>" readonly/></td>
 <td align="left" valign="top" style="font-family:Times New Roman;color:#004993;font-size:14px;"><b>Request Date :</b></td>
 <td><input name="ReqAmt" id="ReqAmt" style="font-family:Times New Roman;width:120px;text-align:center;font-size:14px;height:22px;" value="<?php if($res['ReqDate']!='' AND $res['ReqDate']!='1970-01-01' AND $res['ReqDate']!='0000-00-00'){ echo date("d-m-Y",strtotime($res['ReqDate'])); } ?>" readonly/></td>
</tr>
<tr height="20">
 <td align="left" valign="top" style="font-family:Times New Roman;color:#004993;font-size:14px;"><b>Model_Name :</b></td>
 <td><input name="ModelName" id="ModelName" class="All_150" value="<?php echo $res['ModelName']; ?>" readonly/></td>
 <td align="left" valign="top" style="font-family:Times New Roman;color:#004993;font-size:14px;"><b>Request_Amount :</b></td>
 <td><input name="ReqAmt" id="ReqAmt" style="font-family:Times New Roman;width:120px;text-align:right;font-size:14px;height:22px;" value="<?php echo $res['ReqAmt']; ?>" readonly/></td>
</tr>
<tr height="20">
 <td align="left" valign="top" style="font-family:Times New Roman;color:#004993;font-size:14px;"><b>Model No :</b></td>
 <td><input name="ModelNo" id="ModelNo" class="All_150" value="<?php echo $res['ModelNo']; ?>" readonly/></td>
 <td align="left" valign="top" style="font-family:Times New Roman;color:#004993;font-size:14px;"><b>Asset Price :</b></td>
 <td><input name="Price" id="Price" style="font-family:Times New Roman;width:120px;text-align:right;font-size:14px;height:22px;" value="<?php echo $res['Price']; ?>" readonly/></td>
</tr>
<tr height="20">
 <td align="left" valign="top" style="font-family:Times New Roman;color:#004993;font-size:14px;"><b>Company_Name :</b></td>
 <td><input name="ComName" id="ComName" class="All_150" value="<?php echo $res['ComName']; ?>" readonly/></td>
 <td align="left" valign="top" style="font-family:Times New Roman;color:#004993;font-size:14px;"><b>Purchase_Date :</b></td>
 <td><input name="PurDate" id="PurDate" style="font-family:Times New Roman;width:120px;text-align:center;font-size:14px;height:22px;" value="<?php if($res['PurDate']!='' AND $res['PurDate']!='1970-01-01' AND $res['PurDate']!='0000-00-00'){ echo date("d-m-Y",strtotime($res['PurDate'])); } ?>" readonly/></td>
</tr>
<tr height="20">
 <td align="left" valign="top" style="font-family:Times New Roman;color:#004993;font-size:14px;"><b>EMI No :</b></td>
 <td><input name="EmiNo" id="EmiNo" class="All_150" value="<?php echo $res['EmiNo']; ?>" readonly/></td>
 <td align="left" valign="top" style="font-family:Times New Roman;color:#004993;font-size:14px;"><b>Warranty Expiry :</b></td>
 <td><input name="WarrantyExpiry" id="WarrantyExpiry" style="font-family:Times New Roman;width:120px;text-align:center;font-size:14px;height:22px;" value="<?php if($res['WarrantyExpiry']!='' AND $res['WarrantyExpiry']!='1970-01-01' AND $res['WarrantyExpiry']!='0000-00-00'){ echo date("d-m-Y",strtotime($res['WarrantyExpiry'])); } ?>" readonly/></td>
</tr>
<tr height="20">
 <td align="left" valign="top" style="font-family:Times New Roman;color:#004993;font-size:14px;"><b>Serial No :</b></td>
 <td><input name="Srn" id="Srn" class="All_150" value="<?php echo $res['Srn']; ?>" readonly/></td>
 <td align="left" valign="top" style="font-family:Times New Roman;color:#004993;font-size:14px;"><b>Bill No :</b></td>
 <td><input name="BillNo" id="BillNo" style="font-family:Times New Roman;width:120px;;font-size:14px;height:22px;" value="<?php echo $res['BillNo']; ?>" readonly/></td>
</tr>
<tr height="20">
 <td align="left" valign="top" style="font-family:Times New Roman;color:#004993;font-size:14px;"><b>Dealer_Name :</b></td>
 <td><input name="DealeName" id="DealeName" class="All_150" value="<?php echo $res['DealeName']; ?>" readonly/></td>
 <td align="left" valign="top" style="font-family:Times New Roman;color:#004993;font-size:14px;"><b>Dealer_Contact :</b></td>
 <td><input name="DealerContNo" id="DealerContNo" style="font-family:Times New Roman;width:120px;;font-size:14px;height:22px;" value="<?php echo $res['DealerContNo']; ?>" readonly/></td>
 
</tr>
<tr height="20">
 <td align="left" valign="top" style="font-family:Times New Roman;color:#004993;font-size:14px;"><b>Battery_Company :</b></td>
 <td><input name="BatteryCom" id="BatteryCom" class="All_150" value="<?php echo $res['BatteryCom']; ?>" readonly/></td>
 <td align="left" valign="top" style="font-family:Times New Roman;color:#004993;font-size:14px;"><b>Battery_Model :</b></td>
 <td><input name="BatteryModel" id="BatteryModel" style="font-family:Times New Roman;width:120px;;font-size:14px;height:22px;" value="<?php echo $res['BatteryModel']; ?>" readonly/></td>
</tr>
<tr height="20">
 <td align="left" valign="top" style="font-family:Times New Roman;color:#004993;font-size:16px;"><b>Emp Remark :</b></td>
 <td colspan="3" align=""><textarea name="Remark" id="Remark" style="font-family:Times New Roman;font-size:15px;" cols="57" rows="1"><?php echo $res['AnyOtherRemark']; ?></textarea></td>
</tr>
<tr height="20">
 <td align="left" valign="top" style="font-family:Times New Roman;color:#004993;font-size:16px;"><b>HOD Remark :</b></td>
 <td colspan="3" align=""><textarea name="Remark" id="Remark" style="font-family:Times New Roman;font-size:15px;" cols="57" rows="1"><?php echo $res['HODRemark']; ?></textarea></td>
</tr>
<tr height="20">
 <td align="left" valign="top" style="font-family:Times New Roman;color:#004993;font-size:16px;"><b>Delegation Remark :</b></td>
 <td colspan="3" align=""><textarea name="Remark" id="Remark" style="font-family:Times New Roman;font-size:15px;" cols="57" rows="1"><?php echo $res['FwdRemark']; ?></textarea></td>
</tr>
</tr>
<tr height="20">
 <td align="left" valign="top" style="font-family:Times New Roman;color:#004993;font-size:16px;"><b>IT Remark :</b></td>
 <td colspan="3" align=""><textarea name="Remark" id="Remark" style="font-family:Times New Roman;font-size:15px;" cols="57" rows="1"><?php echo $res['ITRemark']; ?></textarea></td>
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



