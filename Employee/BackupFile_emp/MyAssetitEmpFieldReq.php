<?php session_start(); require_once('../AdminUser/config/config.php'); 

$EmMPID=$_REQUEST['ID'];
$SqEC=mysql_query("select EmpCode from hrm_employee where EmployeeID=".$EmMPID, $con); $resEC=mysql_fetch_assoc($SqEC);
$Lenght=strlen($resEC['EmpCode']); 
if($Lenght==1){$FileN='000'.$resEC['EmpCode'];} 
elseif($Lenght==2){$FileN='00'.$resEC['EmpCode'];} 
elseif($Lenght==3){$FileN='0'.$resEC['EmpCode'];}
elseif($Lenght==4){$FileN=$resEC['EmpCode'];}


if(isset($_POST['Update']))
{ 

  $uploadedBill=0; $extBill=""; $uploadedAsset=0; $extAsset="";
  if((!empty($_FILES["uBill"])) && ($_FILES['uBill']['error'] == 0))
  {
   $filenameBill =strtolower(basename($_FILES['uBill']['name']));
   $fileSizeBill =$_FILES['uBill']['size'];
   $extBill = substr($filenameBill, strrpos($filenameBill, '.') + 1);
   $newfilenameBill='B'.$FileN.'_'.date("dmyHis").'.'.$extBill;
   if(($extBill == 'jpg' || $extBill == 'jpeg' || $extBill == 'png' || $extBill == 'pdf'))
   { 
     $newname = dirname(__FILE__).'/AssetReqUploadFile/'.$newfilenameBill;
     move_uploaded_file($_FILES['uBill']['tmp_name'],$newname); 
   }
   else { $msgUp = "Error: Only jpg, jpeg, png or pdf files is allowed"; }
   //include_once("ak_php_img_lib_1.0.php");
   //$target_file = "AssetReqUploadFile/$newfilenameBill";
   //$resized_file = "AssetReqUploadFile/$newfilenameBill";
   //$wmax = 500;
   //$hmax = 600;
   //ak_img_resize($target_file, $resized_file, $wmax, $hmax, $extBill);
   $SqlUpdate = mysql_query("UPDATE hrm_asset_employee_request SET ReqBillImgExtName='".$newfilenameBill."', ReqBillImgExt='".$extBill."' WHERE AssetEmpReqId=".$_POST['AssetEmpReqId'], $con);
   
  }
  if((!empty($_FILES["uAssImg"])) && ($_FILES['uAssImg']['error'] == 0))
  {
   $filenameAsset =strtolower(basename($_FILES['uAssImg']['name']));
   $fileSizeAsset =$_FILES['uAssImg']['size'];
   $extAsset = substr($filenameAsset, strrpos($filenameAsset, '.') + 1);
   $newfilenameAsset='A'.$FileN.'_'.date("dmyHis").'.'.$extAsset;
   if(($extAsset=='jpg' || $extAsset =='jpeg' || $extAsset=='png' || $extAsset=='ppf'))
   { 
    $newname2= dirname(__FILE__).'/AssetReqUploadFile/'.$newfilenameAsset;
    move_uploaded_file($_FILES['uAssImg']['tmp_name'],$newname2); 
   }
   else { $msgUp = "Error: Only jpg, jpeg, png or pdf files is allowed"; }
   //include_once("ak_php_img_lib_1.0.php");
   //$target_file = "AssetReqUploadFile/$newfilenameAsset";
   //$resized_file = "AssetReqUploadFile/$newfilenameAsset";
   //$wmax = 500;
   //$hmax = 600;
   //ak_img_resize($target_file, $resized_file, $wmax, $hmax, $extAsset);
   $SqlUpdate = mysql_query("UPDATE hrm_asset_employee_request SET ReqAssestImgExtName='".$newfilenameAsset."', ReqAssestImgExt='".$extAsset."' WHERE AssetEmpReqId=".$_POST['AssetEmpReqId'], $con); 
  }


if($_POST['ReqAmtExpiryNOM']!='' AND $_POST['ReqAmtExpiryNOM']>0 AND $_POST['ApprovalAmt']>0 AND $_POST['ApprovalDate']!=''){
$AmtPerMonth=$_POST['ApprovalAmt']/$_POST['ReqAmtExpiryNOM']; $AmtExpiryDate=date("Y-m-d",strtotime($_POST['ApprovalDate'].'+'.$_POST['ReqAmtExpiryNOM'].' month'));}
else{ $AmtPerMonth=0; $AmtExpiryDate='0000-00-00';}
if(TApproval==2){$AppStatus=2;}else{$AppStatus=1;}

$SqlUpdate = mysql_query("UPDATE hrm_asset_employee_request SET AssetNId='".$_POST['AssetNId']."', ReqAmt='".$_POST['ReqAmt']."', ApprovalAmt='".$_POST['ApprovalAmt']."', ReqDate='".date("Y-m-d",strtotime($_POST['ReqDate']))."', ComName='".$_POST['ComName']."', Srn='".$_POST['Srn']."', ModelNo='".$_POST['ModelNo']."', ModelName='".$_POST['ModelName']."', PurDate='".date("Y-m-d",strtotime($_POST['PurDate']))."', BillNo='".$_POST['BillNo']."', Price='".$_POST['Price']."', Quantity='".$_POST['Quantity']."', EmiNo='".$_POST['EmiNo']."', ExpiryDate='".date("Y-m-d",strtotime($_POST['ExpiryDate']))."', IdentityRemark='".$_POST['IdentityRemark']."', ApprovalStatus='".$AppStatus."', ApprovalDate='".date("Y-m-d",strtotime($_POST['ApprovalDate']))."', DealeName='".$_POST['DealeName']."', DealerContNo='".$_POST['DealerContNo']."', DealerAdd='".$_POST['DealerAdd']."', DealerEmail='".$_POST['DealerEmail']."', BatteryCom='".$_POST['BatteryCom']."', BatteryModel='".$_POST['BatteryModel']."', BatteryExpiry='".date("Y-m-d",strtotime($_POST['BatteryExpiry']))."', AnyOtherRemark='".$_POST['AnyOtherRemark']."', ReqAmtExpiryNOM='".$_POST['ReqAmtExpiryNOM']."', ReqAmtExpiryDate='".$AmtExpiryDate."', ReqAmtPerMonth='".$AmtPerMonth."', MaxLimitAmt='".$_POST['MaxLimitAmt']."', HODApprovalStatus='".$_POST['FApproval']."', ITApprovalStatus='".$_POST['SApproval']."', AccPayStatus='".$_POST['TApproval']."' WHERE AssetEmpReqId=".$_POST['AssetEmpReqId'], $con);

if($SqlUpdate){$msg='Record updated successfully...';}

}


?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Asset Details</title>
</head>
<link type="text/css" href="css/body.css" rel="stylesheet"/>
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<link rel="stylesheet" type="text/css" href="src/css/jscal2.css"/>
<link rel="stylesheet" type="text/css" href="src/css/border-radius.css"/>
<link rel="stylesheet" type="text/css" href="src/css/steel/steel.css"/>
<script type="text/javascript" src="src/js/jscal2.js"></script>
<script type="text/javascript" src="src/js/lang/en.js"></script>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<style>
.SaveButton {background-image:url(images/save.gif); width:20px; height:20px; background-repeat:no-repeat; background-color:#FFFFFF; border-color:#FFFFFF; border-bottom:inherit;}
.EditSelect { font-family:Georgia; font-size:12px; height:18px;}
.EditInput { font-family:Georgia; font-size:12px; height:18px;}
.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}.tt{font-weight:bold;height:22px;font-family:Times New Roman;font-size:14px;color:#FFFFFF;}.dd{font-weight:bold;height:22px;font-family:Times New Roman;font-size:14px;width:50px;color:#FFFFAA;}
inp{height:20px;font-family:Times New Roman;font-size:12px;width:100%;}
</style>
<script type="text/javascript" language="javascript">
function FunChgAsset(v,ei,gi)
{
  var url = 'MyAssetReqAct.php'; var pars = 'act=SetAssetMaxMint&v='+v+'&gi='+gi+'&ei='+ei; 
  var myAjax = new Ajax.Request( url, { method: 'post', parameters: pars, onComplete: show_valueMax });
}
function show_valueMax(originalRequest)
{ document.getElementById('EventSpan1').innerHTML = originalRequest.responseText; var v=document.getElementById("v").value;
  var gi=document.getElementById("gi").value; var ei=document.getElementById("ei").value; var actionAmt=document.getElementById("actionAmt1").value; 
  var ActualAmt=document.getElementById("ActualAmt").value; var PriviousAmt=document.getElementById("PriviousAmt").value;
  var MaxLimitAmt=document.getElementById("MaxLimitAmt").value=document.getElementById("ActualAmt").value;
}


function validate(form1) 
{  var Numfilter=/^[0-9 ]+$/;  var filter=/^[a-zA-Z. /]+$/;
   var AssetNId = document.getElementById("AssetNId").value;  
   if(AssetNId==0){ alert("Please select asset name.");  return false; }
   
   var ModelName = document.getElementById("ModelName").value;
   if(ModelName.length===0){ alert("You must enter a asset model name.");  return false; }
   
   //var ModelNo = document.getElementById("ModelNo").value;
   //if(ModelNo.length===0){ alert("You must enter a asset model number.");  return false; }
   
   var Price = parseFloat(document.getElementById("Price").value);
   if(Price.length===0){ alert("You must enter a asset price.");  return false; } var testN_Price = Numfilter.test(Price);
   if(testN_Price==false){ alert('please enter only number in the price field'); return false; }
   
   var ComName = document.getElementById("ComName").value;
   if(ComName.length===0){ alert("You must enter a asset company name.");  return false; } var testb_ComName = filter.test(ComName);
   if(testb_ComName==false){ alert('Please enter only alphabets in the company name field');  return false; }
   
   var PurDate = document.getElementById("PurDate").value;
   if(PurDate.length===0){ alert("You must enter purchase date.");  return false; }
   
   if(AssetNId==3 || AssetNId==12)
   {
   //var EmiNo = document.getElementById("EmiNo").value;
   //if(EmiNo.length===0){ alert("You must enter emi no.");  return false; }
   }
   
   //var Srn = document.getElementById("Srn").value;
   //if(Srn.length===0){ alert("You must enter serial no.");  return false; }
   
   var DealeName = document.getElementById("DealeName").value;
   if(DealeName.length===0){ alert("You must enter dealer name.");  return false; } var testb_DealeName = filter.test(DealeName);
   if(testb_DealeName==false){ alert('Please enter only alphabets in the dealer name field');  return false; }
   
   var BillNo = document.getElementById("BillNo").value;
   if(BillNo.length===0){ alert("You must enter bill no.");  return false; }
   
   //var DealerContNo = document.getElementById("DealerContNo").value;
   //if(DealerContNo.length===0){ alert("You must enter dealer contact no.");  return false; } var testN_DealerContNo = Numfilter.test(DealerContNo);
   //if(testN_DealerContNo==false){ alert('please enter only number in the dealer contact no field'); return false; }
   //if(DealerContNo.length<10){ alert("Please check dealer contact no.");  return false; }
   
   if(AssetNId==12)
   {
   //var BatteryCom = document.getElementById("BatteryCom").value;
   //if(BatteryCom.length===0){ alert("You must enter battory company name.");  return false; } var testb_BatteryCom = filter.test(BatteryCom);
   //if(testb_BatteryCom==false){ alert('Please enter only alphabets in the battory company name field');  return false; }
   
   //var BatteryModel = document.getElementById("BatteryModel").value;
   //if(BatteryModel.length===0){ alert("You must enter battory model.");  return false; }
   } 
   
   var FApp = document.getElementById("FApproval").value; var SApp = document.getElementById("SApproval").value; var TApp = document.getElementById("TApproval").value;
   if(FApp==0 && SApp==0 && TApp==0){alert("please select approval status");  return false;}
   if(TApp==2)
   { 
     if(FApp==0 || FApp==1  || FApp==3){alert("please check HOD approval status"); return false;}
	 if(SApp==0 || SApp==1  || SApp==3){alert("please check IT approval status"); return false;}
	 var ApprovalAmt = document.getElementById("ApprovalAmt").value; var testN_ApprovalAmt = Numfilter.test(ApprovalAmt);
     if(ApprovalAmt.length===0){ alert("You must enter a approval amount.");  return false; }
	 if(testN_ApprovalAmt==false){ alert('please enter only number in the approval amount field'); return false; }
     var ApprovalDate = document.getElementById("ApprovalDate").value;
     if(ApprovalDate.length===0){alert("please enter approval date"); return false;}
   }
    if(SApp==2){ if(FApp==0 || FApp==1  || FApp==3){alert("please check HOD approval status"); return false;}  }
   
   var agree=confirm("Are you sure, you want to update asset request?");
   if(agree){return true;}else{return false;}
   
}

</script>
<body class="body">
<?php 
$SqlEmp = mysql_query("SELECT * FROM hrm_employee WHERE EmployeeID=".$EmMPID, $con);  $ResEmp=mysql_fetch_assoc($SqlEmp);
$Ename = $ResEmp['Fname'].'&nbsp;'.$ResEmp['Sname'].'&nbsp;'.$ResEmp['Lname']; $LEC=strlen($ResEmp['EmpCode']); 
if($LEC==1){$EC='000'.$ResEmp['EmpCode'];} if($LEC==2){$EC='00'.$ResEmp['EmpCode'];} if($LEC==3){$EC='0'.$ResEmp['EmpCode'];} if($LEC>=4){$EC=$ResEmp['EmpCode'];}
$sqlG=mysql_query("select GradeId from hrm_employee_general where EmployeeID=".$EmMPID, $con); $resG=mysql_fetch_assoc($sqlG);
$sqlMax=mysql_query("select AssetEmpReqId from hrm_asset_employee_request where EmployeeID=".$EmMPID, $con); $rowMax=mysql_num_rows($sqlMax); 
?>
<span id="EventSpan1"></span>
<table style="width:100%;">
<tr bgcolor="#7a6189">
 <td style="width:100%; vertical-align:middle;">
  <table style="width:100%;">
   <tr style="height:20px;">
    <td class="tt" style="width:80px;">EmpCode :</td>
	<td class="dd" style="width:80px;"><?php echo $EC; ?></td>
    <td class="tt" style="width:50px;">Name :</td>
	<td class="dd"><?php echo $Ename; ?></td>
    <td class="font4" style="left"><b><span id="msgspan"><?php //echo $msg; ?></span></b></td>
   </tr>
  </table>
 </td>
</tr>
<?php $sql=mysql_query("select * from hrm_asset_employee_request where AssetEmpReqId=".$_REQUEST['Aeri'], $con); 
      $res=mysql_fetch_array($sql); ?>
<form name="form1" enctype="multipart/form-data" method="post" onSubmit="return validate(this)">
<input type="hidden" id="ID" value="<?php echo $_REQUEST['ID']; ?>" /> 
<input type="hidden" name="AssetEmpReqId" id="AssetEmpReqId" value="<?php echo $_REQUEST['Aeri']; ?>" />
<tr>
 <td style="width:100%;">
  <table style="width:100%;">
   
<tr>
 <td style="width:120px;"><b>Asset Name:</b></td>
 <td style="width:180px;"><?php $sqlAn=mysql_query("select AssetName from hrm_asset_name where AssetNId=".$res['AssetNId']); $resAn=mysql_fetch_array($sqlAn); ?>
 <select name="AssetNId" id="AssetNId" class="inp" onChange="FunChgAsset(this.value,<?php echo $EmMPID.','.$resG['GradeId']; ?>)"><option value="<?php echo $res['AssetNId']; ?>"><?php echo $resAn['AssetName']; ?></option>
<?php $sqlNA=mysql_query("select * from hrm_asset_name where Status='A' order by AssetName ASC", $con); while($resNA=mysql_fetch_assoc($sqlNA)) { ?>
<option value="<?php echo $resNA['AssetNId']; ?>"><?php echo $resNA['AssetName']; ?></option><?php } ?></select></td>
 <td style="width:120px;">Maximum Limit:</td>
 <td style="width:110px;"><input name="MaxLimitAmt" id="MaxLimitAmt" class="inp" style="background-color:#E0DBE3;font-weight:bold;text-align:center;vertical-align:middle;" readonly value="<?php echo intval($res['MaxLimitAmt']); ?>"/></td>
</tr>
<tr>
 <td>Company Name</td><td><input name="ComName" id="ComName" class="inp" value="<?php echo $res['ComName']; ?>" /></td>
 <td>Amount PerMonth</td><td><input name="ReqAmt" id="ReqAmt" class="inp" style="text-align:right;" value="<?php echo round($res['ReqAmtPerMonth']).'.00'; ?>" readonly/></td>
</tr>
<tr>
 <td>Model No</td><td><input name="ModelNo" id="ModelNo" class="inp" value="<?php echo $res['ModelNo']; ?>" /></td>
 <td>Price</td><td><input name="Price" id="Price" class="inp" style="text-align:right;" value="<?php echo intval($res['Price']); ?>" /></td>
</tr>
<tr>
 <td>Model Name</td><td><input name="ModelName" id="ModelName" class="inp" value="<?php echo $res['ModelName']; ?>" /></td>
 <td>Request Amount</td><td><input name="ReqAmt" id="ReqAmt" class="inp" style="text-align:right;" value="<?php echo intval($res['ReqAmt']); ?>"/></td>
</tr>
<tr>
 <td>Bill No</td><td><input name="BillNo" id="BillNo" class="inp" value="<?php echo $res['BillNo']; ?>" /></td>
 <td>Approval Amount</td><td><input name="ApprovalAmt" id="ApprovalAmt" class="inp" style="text-align:right;" value="<?php echo intval($res['ApprovalAmt']); ?>" /></td>
</tr>
<tr>
 <td>EMI No</td><td><input name="EmiNo" id="EmiNo" class="inp" value="<?php echo $res['EmiNo']; ?>" /></td>
 <td>Amt ExpiryDate</td>
 <td><input name="ReqAmtExpiryDate" id="ReqAmtExpiryDate" class="inp" style="text-align:center;" value="<?php if($res['ReqAmtExpiryDate']!='' && $res['ReqAmtExpiryDate']!='0000-00-00' && $res['ReqAmtExpiryDate']!='1970-01-01'){ echo date("d-m-Y",strtotime($res['ReqAmtExpiryDate'])); }else{echo '0000-00-00';} ?>" readonly/></td>
</tr>
<tr>
 <td>Sr. No</td><td><input name="Srn" id="Srn" class="inp" value="<?php echo $res['Srn']; ?>" /></td>
 <td>Request Date</td><td><input name="ReqDate" id="ReqDate" class="inp" style="text-align:center;" value="<?php echo date("d-m-Y",strtotime($res['ReqDate'])); ?>" style="text-align:center;" readonly/><button id="ReqDateBtn" class="CalenderButton"></button></td>
</tr>
<tr>
 <td>Dealer Name</td><td><input name="DealeName" id="DealeName" class="inp" value="<?php echo $res['DealeName']; ?>" /></td>
 <td>Purchase Date</td><td><input name="PurDate" id="PurDate" class="inp" style="text-align:center;" value="<?php echo date("d-m-Y",strtotime($res['PurDate'])); ?>" style="text-align:center;" readonly/><button id="PurDateBtn" class="CalenderButton"></button></td>
</tr>
<tr>
 <td>Dealer ContactNo</td><td><input name="DealerContNo" id="DealerContNo" class="inp" value="<?php echo $res['DealerContNo']; ?>" /></td>
 <td>Model Expiry Date</td><td><input name="ExpiryDate" id="ExpiryDate" class="inp" style="text-align:center;" value="<?php if($res['ExpiryDate']!='' && $res['ExpiryDate']!='0000-00-00' && $res['ExpiryDate']!='1970-01-01'){ echo date("d-m-Y",strtotime($res['ExpiryDate'])); }else{echo '0000-00-00';} ?>" style="text-align:center;" readonly/><button id="ExpiryDateBtn" class="CalenderButton"></button></td>
</tr>
<tr>
 <td>Dealer Email-Id</td><td><input name="DealerEmail" id="DealerEmail" class="inp" value="<?php echo $res['DealerEmail']; ?>" /></td>
 <td>Quantity</td><td><input name="Quantity" id="Quantity" class="inp" value="<?php echo $res['Quantity']; ?>" style="text-align:center;" /></td>
</tr>
<tr>
 <td>Dealer Address</td><td><input name="DealerAdd" id="DealerAdd" class="inp" value="<?php echo $res['DealerAdd']; ?>" /></td>
 <td valign="top">Identity Remark</td><td valign="top"><input name="IdentityRemark" id="IdentityRemark" class="inp" value="<?php echo $res['IdentityRemark']; ?>" /></td>
</tr>
<tr>
 <td>Battery Company</td><td><input name="BatteryCom" id="BatteryCom" class="inp" value="<?php echo $res['BatteryCom']; ?>" /></td>
 <td>HOD Approval</td><td><select name="FApproval" id="FApproval" class="inp"><option value="<?php if($res['HODApprovalStatus']==0){echo 'Draft';}elseif($res['HODApprovalStatus']==1){echo 'Pending';}elseif($res['HODApprovalStatus']==2){echo 'Approved';}elseif($res['HODApprovalStatus']==3){echo 'Rejected';}elseif($res['HODApprovalStatus']==4){if($res['FwdApprovalStatus']==0){echo 'Draft';}elseif($res['FwdApprovalStatus']==1){echo 'Pending';}elseif($res['FwdApprovalStatus']==2){echo 'Approved';}elseif($res['FwdApprovalStatus']==3){echo 'Rejected';}} ?>"><?php if($res['HODApprovalStatus']==0){echo 'Draft';}elseif($res['HODApprovalStatus']==1){echo 'Pending';}elseif($res['HODApprovalStatus']==2){echo 'Approved';}elseif($res['HODApprovalStatus']==3){echo 'Rejected';}elseif($res['HODApprovalStatus']==4){if($res['FwdApprovalStatus']==0){echo 'Draft';}elseif($res['FwdApprovalStatus']==1){echo 'Pending';}elseif($res['FwdApprovalStatus']==2){echo 'Approved';}elseif($res['FwdApprovalStatus']==3){echo 'Rejected';}} ?></option><?php if($res['HODApprovalStatus']!=0){ ?> <option value="0">Draft</option><?php } ?><?php if($res['HODApprovalStatus']!=1){ ?><option value="1">Pending</option><?php } ?><?php if($res['HODApprovalStatus']!=2){ ?><option value="2">Approved</option><?php } ?></select></td>
</tr>
<tr>
 <td>Battery Model</td><td><input name="BatteryModel" id="BatteryModel" class="inp" value="<?php echo $res['BatteryModel']; ?>" /></td> 
 <td>IT Approval</td><td><select name="SApproval" id="SApproval" class="inp"><option value="<?php echo $res['ITApprovalStatus']; ?>"><?php if($res['ITApprovalStatus']==0){echo 'Draft';}elseif($res['ITApprovalStatus']==1){echo 'Pending';}elseif($res['ITApprovalStatus']==2){echo 'Approved';}elseif($res['ITApprovalStatus']==3){echo 'Rejected';} ?></option><?php if($res['ITApprovalStatus']!=0){ ?> <option value="0">Draft</option><?php } ?><?php if($res['ITApprovalStatus']!=1){ ?><option value="1">Pending</option><?php } ?><?php if($res['ITApprovalStatus']!=2){ ?><option value="2">Approved</option><?php } ?></select></td>
</tr>
<tr>
 <td>Battery Expiry</td><td><input name="BatteryExpiry" id="BatteryExpiry" class="inp" style="text-align:center;" value="<?php if($res['BatteryExpiry']!='' && $res['BatteryExpiry']!='0000-00-00' && $res['BatteryExpiry']!='1970-01-01'){ echo date("d-m-Y",strtotime($res['BatteryExpiry'])); }else{echo '0000-00-00';} ?>"/><button id="BatteryExpiryBtn" class="CalenderButton"></button><script type="text/javascript">  var cal = Calendar.setup({ onSelect:  function(cal) { cal.hide()}, showTime: true }); cal.manageFields("ReqDateBtn", "ReqDate", "%d-%m-%Y"); </script></td>
 <td>A/C Approval</td><td><select name="TApproval" id="TApproval" class="inp"><option value="<?php echo $res['AccPayStatus']; ?>"><?php if($res['AccPayStatus']==0){echo 'Draft';}elseif($res['AccPayStatus']==1){echo 'Pending';}elseif($res['AccPayStatus']==2){echo 'Approved';}elseif($res['AccPayStatus']==3){echo 'Rejected';} ?></option><?php if($res['AccPayStatus']!=0){ ?> <option value="0">Draft</option><?php } ?><?php if($res['AccPayStatus']!=1){ ?><option value="1">Pending</option><?php } ?><?php if($res['AccPayStatus']!=2){ ?><option value="2">Approved</option><?php } ?></select></td>
</tr>

<tr>
 <td valign="top">Bill Copy</td><td><input type="file" size="" name="uBill" id="uBill" class="inp"></td>
 <td>Approval Date</td><td><input name="ApprovalDate" id="ApprovalDate" class="inp" style="text-align:center;" value="<?php if($res['ApprovalDate']!='' && $res['ApprovalDate']!='0000-00-00' && $res['ApprovalDate']!='1970-01-01'){ echo date("d-m-Y",strtotime($res['ApprovalDate'])); }else{echo '0000-00-00';} ?>" style="text-align:center;" readonly/><button id="ApprovalDateBtn" class="CalenderButton"></button><script type="text/javascript">  var cal = Calendar.setup({ onSelect:  function(cal) { cal.hide()}, showTime: true }); cal.manageFields("ReqDateBtn", "ReqDate", "%d-%m-%Y"); cal.manageFields("ApprovalDateBtn", "ApprovalDate", "%d-%m-%Y"); cal.manageFields("PurDateBtn", "PurDate", "%d-%m-%Y"); cal.manageFields("ExpiryDateBtn", "ExpiryDate", "%d-%m-%Y"); cal.manageFields("BatteryExpiryBtn", "BatteryExpiry", "%d-%m-%Y"); </script></td>
 
</tr> 
<tr>
 <td valign="top">Asset Copy</td><td valign="top"><input type="file" size="" name="uAssImg" id="uAssImg" class="inp"></td>
 <td>Amount Valid</td><td><input name="ReqAmtExpiryNOM" id="ReqAmtExpiryNOM"  class="inp" style="text-align:center; width:50px;" value="<?php echo $res['ReqAmtExpiryNOM']; ?>" />&nbsp;Month</td>
</tr>
<tr>
<td valign="top">Any Remark</td>
<td valign="top" colspan="3"><textarea name="AnyOtherRemark" id="AnyOtherRemark" class="inp" cols="45" rows="1"><?php echo $res['AnyOtherRemark']; ?></textarea></td>
</tr>   
   
  </table>
 </td>
</tr>

<tr>
 <td style="width:100%;">
  <table style="width:100%;">
   <tr>
      <td align="Right" bgcolor="#7a6189" class="fontButton">
	  <table border="0"><tr><td><font style="font-family:Times New Roman;color:#80FF80;font-size:14px;"><b><?php echo $msg; ?></b></font></td>
	  <td align="right">
      <input type="submit" name="Update" value="Update"/>
      <input type="button" value="refresh" onClick="javascript:window.location='MyAssetitEmpFieldReq.php?act=true&mm=sas&ask=false&ww=rightProtect&we=12345&mm=er4e&r=t5t%t5s&yy=eloi&gosto=false&rigt=checkessue&mailto=promt&wew=e%e@er%rdd=012&CheckAct=ExtraReqField&ID=<?php echo $_REQUEST['ID']; ?>&Aeri=<?php echo $_REQUEST['Aeri']; ?>'"/>&nbsp;
     </td></tr></table></td>
   </tr>
  </table>
 </td>
</tr>

</form>

</table>

</body>
</html>