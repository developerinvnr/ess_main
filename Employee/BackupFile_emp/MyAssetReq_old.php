<?php session_start();
if($_SESSION['login'] = true){require_once('../AdminUser/config/config.php');}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('../AdminUser/logcheck.php');
if($_SESSION['logCheckEmp']!=$logemp){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('EmpMenuSession.php');} 
date_default_timezone_set('Asia/Kolkata');
$sqlEC=mysql_query("select EmpCode from hrm_employee where EmployeeID=".$EmployeeId, $con); $resEC=mysql_fetch_assoc($sqlEC);
$Lenght=strlen($resEC['EmpCode']); 
if($Lenght==1){$FileN='000'.$resEC['EmpCode'];} 
elseif($Lenght==2){$FileN='00'.$resEC['EmpCode'];} 
elseif($Lenght==3){$FileN='0'.$resEC['EmpCode'];}
elseif($Lenght==4){$FileN=$resEC['EmpCode'];}

if(isset($_POST['SendRequest']))
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
  }
  if((!empty($_FILES["uAssImg"])) && ($_FILES['uAssImg']['error'] == 0))
  {
   $filenameAsset =strtolower(basename($_FILES['uAssImg']['name']));
   $fileSizeAsset =$_FILES['uAssImg']['size'];
   $extAsset = substr($filenameAsset, strrpos($filenameAsset, '.') + 1);
   $newfilenameAsset='A'.$FileN.'_'.date("dmyHis").'.'.$extAsset;
   if(($extAsset=='jpg' || $extAsset =='jpeg' || $extAsset=='png' || $extAsset=='pdf'))
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
  }

  $ExpMDate=date('Y-m-d', strtotime("+36 months", strtotime(date("Y-m-d"))));
  $sqlOldReq=mysql_query("select * from hrm_asset_employee_request where EmployeeID=".$EmployeeId." AND AssetNId=".$_POST['AssetNId']." AND ITApprovalStatus!=2 AND ITApprovalStatus!=3 ", $con); $rowOldReq=mysql_num_rows($sqlOldReq); 
 if($rowOldReq>0){ $msgerror="Your request is allready processed..."; }
 else
 { 
   if($_POST['AssetNId']==11 OR $_POST['AssetNId']==12 OR $_POST['AssetNId']==18){ $sqlIns=mysql_query("insert into hrm_asset_employee_request(EmployeeID, AssetNId, ReqAmt, ReqDate, ReqAmtExpiryNOM, ReqAmtExpiryDate, ComName, Srn, ModelNo, ModelName, WarrantyNOY, WarrantyExpiry, PurDate, BillNo, Price, EmiNo, ReportingId, HodId, HODApprovalStatus, ITId, MaxLimitAmt, ReqAssestImgExtName, ReqAssestImgExt, ReqBillImgExtName, ReqBillImgExt, DealeName, DealerContNo, BatteryCom, BatteryModel, AnyOtherRemark, ApprovalStatus) values(".$EmployeeId.", ".$_POST['AssetNId'].", '".$_POST['ReqAmt']."', '".date("Y-m-d")."', 36, '".$ExpMDate."', '".$_POST['ComName']."', '".$_POST['Srn']."', '".$_POST['ModelNo']."', '".$_POST['ModelName']."', '".$_POST['WarrantyNOY']."', '".date("Y-m-d",strtotime($_POST['WarrantyExpiry']))."', '".date("Y-m-d",strtotime($_POST['PurDate']))."', '".$_POST['BillNo']."', '".$_POST['Price']."', '".$_POST['EmiNo']."', '".$_POST['RID']."', '".$_POST['HID']."', 2, '".$_POST['ITID']."', '".$_POST['MaxLimitAmt']."', '".$newfilenameAsset."', '".$extAsset."', '".$newfilenameBill."', '".$extBill."', '".$_POST['DealeName']."', '".$_POST['DealerContNo']."', '".$_POST['BatteryCom']."', '".$_POST['BatteryModel']."', '".$_POST['Remark']."', 1)", $con); }
   else{ $sqlIns=mysql_query("insert into hrm_asset_employee_request(EmployeeID, AssetNId, ReqAmt, ReqDate, ReqAmtExpiryNOM, ReqAmtExpiryDate, ComName, Srn, ModelNo, ModelName, WarrantyNOY, WarrantyExpiry, PurDate, BillNo, Price, EmiNo, ReportingId, HodId, ITId, MaxLimitAmt, ReqAssestImgExtName, ReqAssestImgExt, ReqBillImgExtName, ReqBillImgExt, DealeName, DealerContNo, BatteryCom, BatteryModel, AnyOtherRemark) values(".$EmployeeId.", ".$_POST['AssetNId'].", '".$_POST['ReqAmt']."', '".date("Y-m-d")."', 36, '".$ExpMDate."', '".$_POST['ComName']."', '".$_POST['Srn']."', '".$_POST['ModelNo']."', '".$_POST['ModelName']."', '".$_POST['WarrantyNOY']."', '".date("Y-m-d",strtotime($_POST['WarrantyExpiry']))."', '".date("Y-m-d",strtotime($_POST['PurDate']))."', '".$_POST['BillNo']."', '".$_POST['Price']."', '".$_POST['EmiNo']."', '".$_POST['RID']."', '".$_POST['HID']."', '".$_POST['ITID']."', '".$_POST['MaxLimitAmt']."', '".$newfilenameAsset."', '".$extAsset."', '".$newfilenameBill."', '".$extBill."', '".$_POST['DealeName']."', '".$_POST['DealerContNo']."', '".$_POST['BatteryCom']."', '".$_POST['BatteryModel']."', '".$_POST['Remark']."')", $con); }


 
 }
  
  if($sqlIns)
  {   
      if($_POST['EmailRep']!='')
      {
      $email_to = $_POST['EmailRep'];
      $email_from='admin@vnrseeds.co.in';
      $email_subject = $_POST['Ename']." submitted asset request form";
      $email_txt = $_POST['Ename']." submitted asset request form"; 
      $headers = "From: ".$email_from."\r\n"; 
      $semi_rand = md5(time()); 
      $headers .= "MIME-Version: 1.0\r\n";
      $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
      $email_message .="<html><head></head><body>";
	  $email_message .= "Dear <b>".$_POST['Rname']."</b> <br><br>\n\n\n";
      $email_message .=$_POST['EName']." has submitted asset request form, for details, kindly log on to ESS <a href='https://www.vnrseeds.co.in'>www.vnrseeds.co.in</a>.<br><br>\n\n";
	  $email_message .= "From <br><b>ADMIN ESS</b><br>";
      $email_message .="</body></html>";	      
	  $ok = @mail($email_to, $email_subject, $email_message, $headers);
	  }	  
	  
if($_POST['AssetNId']!=11 OR $_POST['AssetNId']!=12 OR $_POST['AssetNId']!=18)
{
     if($_POST['EmailHod']!='')
      {
      $email_to22 = $_POST['EmailHod'];
      $email_from22='admin@vnrseeds.co.in';
      $email_subject22 = $_POST['Hname']." submitted asset request form";
      $email_txt22 = $_POST['Hname']." submitted asset request form"; 
      $headers22 = "From: ".$email_from22."\r\n"; 
      $semi_rand = md5(time()); 
      $headers22 .= "MIME-Version: 1.0\r\n";
      $headers22 .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
      $email_message22 .="<html><head></head><body>";
	  $email_message22 .= "Dear <b>".$_POST['Hname']."</b> <br><br>\n\n\n";
      $email_message22 .=$_POST['EName']." has submitted asset request form, for your approval & details, kindly log on to ESS <a href='https://www.vnrseeds.co.in'>www.vnrseeds.co.in</a>.<br><br>\n\n";
	  $email_message22 .= "From <br><b>ADMIN ESS</b><br>";
      $email_message22 .="</body></html>";	      
	  $ok2 = @mail($email_to22, $email_subject22, $email_message22, $headers22);
	  }
}	  
      if($_POST['EmailITEmp']!='')
      {
      $email_to33 = $_POST['EmailITEmp'];
      $email_from33='admin@vnrseeds.co.in';
      $email_subject33 = $_POST['Ename']." submitted asset request form";
      $email_txt33 = $_POST['Ename']." submitted asset request form"; 
      $headers33 = "From: ".$email_from33."\r\n"; 
      $semi_rand33 = md5(time()); 
      $headers33 .= "MIME-Version: 1.0\r\n";
      $headers33 .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
      $email_message33 .="<html><head></head><body>";
      $email_message33 .= "Dear <b>".$_POST['ITEMpname']."</b> <br><br>\n\n\n";

if($_POST['AssetNId']==11 OR $_POST['AssetNId']==12 OR $_POST['AssetNId']==18){ $email_message33 .=$_POST['EName']." has submitted asset request form, for approval next level, kindly log on to ESS <a href='https://www.vnrseeds.co.in'>www.vnrseeds.co.in</a>.<br><br>\n\n"; }
else { $email_message33 .=$_POST['EName']." has submitted asset request form, for details, kindly log on to ESS <a href='https://www.vnrseeds.co.in'>www.vnrseeds.co.in</a>.<br><br>\n\n"; }

      $email_message33 .= "From <br><b>ADMIN ESS</b><br>";
      $email_message33 .="</body></html>";	      
	  $ok3 = @mail($email_to33, $email_subject33, $email_message33, $headers33);
	  }
	  
      $email_to44 = 'vspl.hr@vnrseeds.com';
      $email_from44='admin@vnrseeds.co.in';
      $email_subject44 = $_POST['Ename']." submitted asset request form";
      $email_txt44 = $_POST['Ename']." submitted asset request form"; 
      $headers44 = "From: ".$email_from44."\r\n"; 
      $semi_rand44 = md5(time()); 
      $headers44 .= "MIME-Version: 1.0\r\n";
      $headers44 .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
      $email_message44 .="<html><head></head><body>";
	  $email_message44 .= "Dear <b>Sir/Mam, </b> <br><br>\n\n\n";
      $email_message44 .=$_POST['EName']." has submitted asset request form, for details, kindly log on to ESS <a href='https://www.vnrseeds.co.in'>www.vnrseeds.co.in</a>.<br><br>\n\n";
	  $email_message44 .= "From <br><b>ADMIN ESS</b><br>";
      $email_message44 .="</body></html>";	      
	  $ok4 = @mail($email_to44, $email_subject44, $email_message44, $headers44);

      // echo $email_to.'<br>'; echo $email_to22.'<br>'; echo $email_to33.'<br>'; echo $email_to44.'<br>';
	  
	  echo '<script>alert("Your request has been submitted successfully");</script>';
  }

 

}
?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>

<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<link rel="stylesheet" type="text/css" href="src/css/jscal2.css"/>
<link rel="stylesheet" type="text/css" href="src/css/border-radius.css"/>
<link rel="stylesheet" type="text/css" href="src/css/steel/steel.css"/>
<script type="text/javascript" src="src/js/jscal2.js"></script>
<script type="text/javascript" src="src/js/lang/en.js"></script>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<style>
.fontButton { background-color:#7a6189;}
.SaveButton {background-image:url(images/save.gif); width:20px; height:20px; background-repeat:no-repeat; background-color:#FFFFFF; border-color:#FFFFFF; border-bottom:inherit;}
.EditSelect { font-family:Times New Roman; font-size:12px; height:18px;}
.EditInput { font-family:Times New Roman; font-size:12px; height:18px;}
.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}

</style>
<Script type="text/javascript">window.history.forward(1);</Script>
<script type="text/javascript" language="javascript">
function ClickEdit()
{
  document.getElementById("EditBtn").style.display='none'; document.getElementById("SendRequest").style.display='block';
  document.getElementById("AssetNId").disabled=false; document.getElementById("ReqAmt").readOnly=false; document.getElementById("ComName").readOnly=false;
  document.getElementById("ModelName").readOnly=false; document.getElementById("ModelNo").readOnly=false; document.getElementById("Price").readOnly=false; 
  document.getElementById("Srn").readOnly=false; document.getElementById("EmiNo").readOnly=false; document.getElementById("BillNo").readOnly=false;
  document.getElementById("DealeName").readOnly=false; document.getElementById("DealerContNo").readOnly=false; document.getElementById("WarrantyNOY").readOnly=false;
  document.getElementById("BatteryCom").readOnly=false; document.getElementById("BatteryModel").readOnly=false; document.getElementById("PurDateBtn").disabled=false;
  document.getElementById("WarrantyExpiryBtn").disabled=false; document.getElementById("uBill").disabled=false; document.getElementById("uAssImg").disabled=false;
  document.getElementById("Remark").disabled=false;
}

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
  if(v!=3){document.getElementById("EmiNo").readOnly=true; document.getElementById("EmiSpan").style.color='#E0DBE3';}
  if(v!=11)
  {document.getElementById("EmiNo").readOnly=true; document.getElementById("BatteryCom").readOnly=true; document.getElementById("BatteryModel").readOnly=true; 
   document.getElementById("EmiSpan").style.color='#E0DBE3'; document.getElementById("B1Span").style.color='#E0DBE3'; 
   document.getElementById("B2Span").style.color='#E0DBE3';
  }
  if(v==3){document.getElementById("EmiNo").readOnly=false; document.getElementById("EmiSpan").style.color='#FF0000'; }
  if(v==11)
  { document.getElementById("EmiNo").readOnly=false; document.getElementById("BatteryCom").readOnly=false; document.getElementById("BatteryModel").readOnly=false;
    document.getElementById("EmiSpan").style.color='#FF0000'; document.getElementById("B1Span").style.color='#FF0000'; 
	document.getElementById("B2Span").style.color='#FF0000'; 
  }
 
}

function validate(form1) 
{  var Numfilter=/^[0-9 ]+$/;  var filter=/^[a-zA-Z. /]+$/;
   var AssetNId = document.getElementById("AssetNId").value;  
   if(AssetNId==0){ alert("Please select asset name.");  return false; }
   
   var ModelName = document.getElementById("ModelName").value;
   if(ModelName.length===0){ alert("You must enter a asset model name.");  return false; }
   
   var ReqAmt = parseFloat(document.getElementById("ReqAmt").value); var MaxLimitAmt = parseFloat(document.getElementById("MaxLimitAmt").value);
   if(ReqAmt.length===0){ alert("You must enter a request amount.");  return false; } var testN_ReqAmt = Numfilter.test(ReqAmt);
   if(testN_ReqAmt==false){ alert('please enter only number in the request amount field'); return false; }
   
   var ModelNo = document.getElementById("ModelNo").value;
   if(ModelNo.length===0){ alert("You must enter a asset model number.");  return false; }
   
   var Price = parseFloat(document.getElementById("Price").value);
   if(Price.length===0){ alert("You must enter a asset price.");  return false; } var testN_Price = Numfilter.test(Price);
   if(testN_Price==false){ alert('please enter only number in the price field'); return false; }
   
   var ComName = document.getElementById("ComName").value;
   if(ComName.length===0){ alert("You must enter a asset company name.");  return false; } var testb_ComName = filter.test(ComName);
   if(testb_ComName==false){ alert('Please enter only alphabets in the company name field');  return false; }
   
   var PurDate = document.getElementById("PurDate").value;
   if(PurDate.length===0){ alert("You must enter purchase date.");  return false; }
   
   if(AssetNId==3 || AssetNId==11)
   {
   var EmiNo = document.getElementById("EmiNo").value;
   if(EmiNo.length===0){ alert("You must enter emi no.");  return false; }
   }
   
   var WarrantyExpiry = document.getElementById("WarrantyExpiry").value;
   if(WarrantyExpiry.length===0){ alert("You must enter warranty expiry date.");  return false; }
   
   //if(PurDate>=WarrantyExpiry){ alert("Please check warranty expiry date"); return false; }
   
   var Srn = document.getElementById("Srn").value;
   if(Srn.length===0){ alert("You must enter serial no.");  return false; }
   
   var DealeName = document.getElementById("DealeName").value;
   if(DealeName.length===0){ alert("You must enter dealer name.");  return false; } var testb_DealeName = filter.test(DealeName);
   if(testb_DealeName==false){ alert('Please enter only alphabets in the dealer name field');  return false; }
   
   var BillNo = document.getElementById("BillNo").value;
   if(BillNo.length===0){ alert("You must enter bill no.");  return false; }

   var ext = uBill.substring(uBill.lastIndexOf('.') + 1);
   if(ext == "jpg" || ext == "jpeg" || ext == "JPEG" || ext == "JPG" || ext == "png" || ext == "gif"){return true;} 
   else { alert("Bill copy: only for image file!"); return false; }

   var DealerContNo = document.getElementById("DealerContNo").value;
   //if(DealerContNo.length===0){ alert("You must enter dealer contact no.");  return false; } 
   var testN_DealerContNo = Numfilter.test(DealerContNo);
   if(DealerContNo.length>0 && testN_DealerContNo==false){ alert('please enter only number in the dealer contact no field'); return false; }
   if(DealerContNo.length>0 && DealerContNo.length<10){ alert("Please check dealer contact no.");  return false; }
   
   if(AssetNId==11)
   {
   var BatteryCom = document.getElementById("BatteryCom").value;
   if(BatteryCom.length===0){ alert("You must enter battory company name.");  return false; } var testb_BatteryCom = filter.test(BatteryCom);
   if(testb_BatteryCom==false){ alert('Please enter only alphabets in the battory company name field');  return false; }
   
   var BatteryModel = document.getElementById("BatteryModel").value;
   if(BatteryModel.length===0){ alert("You must enter battory model.");  return false; }
   }
   
   var uBill = document.getElementById("uBill").value;
   if(uBill.length===0){ alert("Please upload bill copy.");  return false; }
   
   var msgno = parseInt(document.getElementById("msgno").value);
   if(MaxLimitAmt>=0 && msgno==0)
   { 
     if(ReqAmt>MaxLimitAmt)
	 { 
	   alert("Your limit amount is Rs. "+MaxLimitAmt+", you have claimed amount Rs. "+ReqAmt+", please type specific reason for comment box for aproval your request. This will go for approval to your HOD "); document.getElementById("msgno").value=msgno+1; return false;
	   
	   //if(agree){ return true; } else {return false; }
	 }
   }
   
   var Remark = document.getElementById("Remark").value;
   if(ReqAmt>MaxLimitAmt)
   { 
     if(Remark.length===0)
	 { alert("Your request amount is high from maximum limit amount, so please type specific reason for comment box for aproval your request."); return false; }   
   }
   
   var agree=confirm("Are you sure, you want to submit asset request?");
   if(agree){return true;}else{return false;}
   
}

function FunClickAssetReq(Aeri,ID)
{ window.open("MyAssetEmpAnyFieldReq.php?CheckAct=ExtraReqField&ID="+ID+"&Aeri="+Aeri,"AForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=600,height=400"); }


function OpenHelpfile(value){window.open("HelpFile.php?a=assetopen&v="+value,"HelpFile","width=800,height=650"); }

</script>
</head>
<body class="body">
<span id="EventSpan1"></span>
<table class="table">
<tr>
 <td>
  <table class="menutable"><tr><td><?php if($_SESSION['login'] = true){ require_once("EMenu.php"); } ?></td></tr></table>
 </td>
</tr>
<tr>
 <td>
  <table width="100%" style="margin-top:0px; ">
    <tr>
	  <td valign="top"><?php if($_SESSION['login'] = true){ require_once("EWelcome.php"); } ?></td>
	</tr>
	<tr><td>&nbsp;</td></tr>
	 <tr>
	  <td valign="top">
	     <table border="0" style="height:350px; float:none;" cellpadding="0">
		  <tr>
		   <td valign="top"> 
		   
<?php //*************************************************************************************************************************************************** ?>	   
	 <table border="0" id="Activity">
	  <tr>
		 <td id="Anni" valign="top">
			<table border="0">
				<tr height="20">
				 <td align="left" valign="top" style="width:width:105px;">
<?php // include("EmpImgEmp.php"); ?>
<?php //echo "<img style='width:100px;height:120px;' src=\"show_images.php?id=".$EmployeeId."\">\n";?></td>
				 <td>&nbsp;</td>
				 </tr>
			 </table>
		 </td>
<?php /******************************************** Query I ******************************************/ ?>		
<?php $sqlG=mysql_query("select GradeId,DepartmentId from hrm_employee_general where EmployeeID=".$EmployeeId,$con); $resG=mysql_fetch_assoc($sqlG);
$sqlMax=mysql_query("select AssetEmpReqId from hrm_asset_employee_request where EmployeeID=".$EmployeeId, $con); $rowMax=mysql_num_rows($sqlMax); 
?>	  
		<td style="width:550px;" valign="top">
		  <table border="0">
			<tr>
                        <td colspan="4" style="font-family:Times New Roman;color:#620000;font-size:17px;" align="center">
			 <b><u>My Asset Request</u></b>&nbsp;&nbsp;&nbsp;
			 <a href="#" onClick="OpenHelpfile('assethelp')"><font color="#000099" size="3" ><b>Help Document</b></font></a>
			 </td>
                        </tr>
			<tr><td colspan="4">&nbsp;</td></tr>
<form name="form1" id="form1" enctype="multipart/form-data" method="post" onSubmit="return validate(this)">
<input type="hidden" id="msgno" value="0" />
<tr height="20">
 <td align="left" valign="top" style="font-family:Times New Roman;color:#004993;width:120px;font-size:14px;">CC :</td>
 <td align="" style="width:170px;"><input class="All_180" value="Reporting Mgr & HOD" readonly /></td>
 <td align="left" valign="top" style="font-family:Times New Roman;color:#004993;width:120px;font-size:14px;">Request No :</td>
 <td style="width:120px;"><input style="width:50px;height:22px; text-align:center;" name="AssReqNo" id="AssReqNo" value="<?php echo $rowMax+1; ?>" readonly></td>
</tr>

<?php //echo $resG['DepartmentId']; ?>

<tr height="20">
 <td align="left" valign="top" style="font-family:Times New Roman;color:#004993;font-size:14px;">Asset Name<font color="#FF0000">*</font> :</td> 
 <td> <select name="AssetNId" id="AssetNId" style="width:147px;" onChange="FunChgAsset(this.value,<?php echo $EmployeeId.','.$resG['GradeId']; ?>)" disabled>
 <option value="0">SELECT</option>  
<?php $sqlElig=mysql_query("select Mobile_Hand_Elig from hrm_employee_eligibility where EmployeeID=".$EmployeeId." AND Status='A'",$con); $resElig=mysql_fetch_assoc($sqlElig); 
if($resElig['Mobile_Hand_Elig']=='Y'){ // && $resG['DepartmentId']!=4 && $resG['DepartmentId']!=25 ?><option value="11"><?php echo strtoupper('Mobile Phone'); ?></option><option value="12"><?php echo strtoupper('Mobile Accessories'); ?></option><option value="18"><?php echo strtoupper('Mobile Maintenance'); ?></option> <?php } 
$sqlNA=mysql_query("select hrm_asset_name_emp.AssetNId,AssetName,AssetELimit,AssetLimit from hrm_asset_name_emp INNER JOIN hrm_asset_name ON hrm_asset_name_emp.AssetNId=hrm_asset_name.AssetNId where hrm_asset_name_emp.EmployeeID=".$EmployeeId." AND hrm_asset_name_emp.AssetESt='Y' AND hrm_asset_name.Status='A' AND hrm_asset_name.AssetNId!=11 AND hrm_asset_name.AssetNId!=12 AND hrm_asset_name.AssetNId!=18 order by hrm_asset_name.AssetName ASC", $con); while($resNA=mysql_fetch_assoc($sqlNA)){ ?>
<?php //$sqlEa=mysql_query("select * from hrm_asset_name_emp where EmployeeID=".$EmployeeId." AND AssetNId=".$resNA['AssetNId']." AND AssetESt='A'",$con); 
      //$sqlGa=mysql_query("select * from hrm_asset_name_grade where GradeId=".$resG['GradeId']." AND AssetNId=".$resNA['AssetNId']." AND AssetGSt='A'",$con);
	  //$rowEa=mysql_num_rows($sqlEa); $rowGa=mysql_num_rows($sqlGa); ?>
<option value="<?php echo $resNA['AssetNId']; ?>"><?php echo strtoupper($resNA['AssetName']); ?></option><?php } ?></select></td>
 <td align="left" valign="top" style="font-family:Times New Roman;color:#004993;font-size:14px;">Maximum Limit :</td>
 <td><input name="MaxLimitAmt" id="MaxLimitAmt" style="font-family:Times New Roman;width:100px;text-align:left;background-color:#E0DBE3;font-size:14px;font-weight:bold;" readonly/></td>
</tr>
<tr height="20">
 <td align="left" valign="top" style="font-family:Times New Roman;color:#004993;font-size:14px;">Model_Name<font color="#FF0000">*</font> :</td>
 <td><input name="ModelName" id="ModelName" class="All_150" value="" readonly/></td>
 <td align="left" valign="top" style="font-family:Times New Roman;color:#004993;font-size:14px;">Request_Amount<font color="#FF0000">*</font> :</td>
 <td><input name="ReqAmt" id="ReqAmt" style="font-family:Times New Roman;width:100px;text-align:right;font-size:14px;" readonly/></td>
</tr>
<tr height="20">
 <td align="left" valign="top" style="font-family:Times New Roman;color:#004993;font-size:14px;">Model No<font color="#FF0000">*</font> :</td>
 <td><input name="ModelNo" id="ModelNo" class="All_150" value="" readonly/></td>
 <td align="left" valign="top" style="font-family:Times New Roman;color:#004993;font-size:14px;">Price<font color="#FF0000">*</font> :</td>
 <td><input name="Price" id="Price" style="font-family:Times New Roman;width:100px;text-align:right;font-size:14px;" readonly/></td>
</tr>
<tr height="20">
 <td align="left" valign="top" style="font-family:Times New Roman;color:#004993;font-size:14px;">Company_Name<font color="#FF0000">*</font> :</td>
 <td><input name="ComName" id="ComName" class="All_150" value="" readonly/></td>
 <td align="left" valign="top" style="font-family:Times New Roman;color:#004993;font-size:14px;">Purchase_Date<font color="#FF0000">*</font> :</td>
 <td><input name="PurDate" id="PurDate" style="font-family:Times New Roman;width:100px;text-align:center;font-size:14px;" readonly/><button id="PurDateBtn" class="CalenderButton" disabled></button></td>
</tr>
<tr height="20">
 <td align="left" valign="top" style="font-family:Times New Roman;color:#004993;font-size:14px;">IEMI No<span id="EmiSpan" style="color:#E0DBE3;">*</span> :</td>
 <td><input name="EmiNo" id="EmiNo" class="All_150" value="" readonly/></td>
 <td align="left" valign="top" style="font-family:Times New Roman;color:#004993;font-size:14px;">Warranty Expiry :
 <input type="hidden" name="WarrantyNOY" id="WarrantyNOY" class="All_150" value="" readonly/></td>
 <td><input name="WarrantyExpiry" id="WarrantyExpiry" style="font-family:Times New Roman;width:100px;text-align:center;font-size:14px;" readonly/><button id="WarrantyExpiryBtn" class="CalenderButton" disabled></button><script type="text/javascript">  var cal = Calendar.setup({ onSelect:  function(cal) { cal.hide()}, showTime: true }); cal.manageFields("PurDateBtn", "PurDate", "%d-%m-%Y"); cal.manageFields("WarrantyExpiryBtn", "WarrantyExpiry", "%d-%m-%Y");</script></td>
</tr>
<tr height="20">
 <td align="left" valign="top" style="font-family:Times New Roman;color:#004993;font-size:14px;">Serial No<font color="#FF0000">*</font> :</td>
 <td><input name="Srn" id="Srn" class="All_150" value="" readonly/></td>
 <td align="left" valign="top" style="font-family:Times New Roman;color:#004993;font-size:14px;">Bill No<font color="#FF0000">*</font> :</td>
 <td><input name="BillNo" id="BillNo" style="font-family:Times New Roman;width:100px;;font-size:14px;" readonly/></td>
</tr>
<tr height="20">
 <td align="left" valign="top" style="font-family:Times New Roman;color:#004993;font-size:14px;">Dealer_Name<font color="#FF0000">*</font> :</td>
 <td><input name="DealeName" id="DealeName" class="All_150" value="" readonly/></td>
 <td align="left" valign="top" style="font-family:Times New Roman;color:#004993;font-size:14px;">Dealer_Contact :</td>
 <td><input name="DealerContNo" id="DealerContNo" style="font-family:Times New Roman;width:100px;;font-size:14px;" readonly maxlength="10"/></td>
 
</tr>
<tr height="20">
 <td align="left" valign="top" style="font-family:Times New Roman;color:#004993;font-size:14px;">Battery_Name<span id="B1Span" style="color:#E0DBE3;">*</span> :</td>
 <td><input name="BatteryCom" id="BatteryCom" class="All_150" value="" readonly/></td>
 <td align="left" valign="top" style="font-family:Times New Roman;color:#004993;font-size:14px;">Battery_Model<span id="B2Span" style="color:#E0DBE3;">*</span> :</td>
 <td><input name="BatteryModel" id="BatteryModel" style="font-family:Times New Roman;width:100px;;font-size:14px;" readonly/></td>
</tr>
<tr height="20">
 <td align="left" valign="top" style="font-family:Times New Roman;color:#004993;font-size:14px;">Bill_Copy (<font color="#FF0000">Only for Image File</font>)<font color="#FF0000">*</font> :</td>
 <td colspan="3"><input type="file" size="" name="uBill" id="uBill" disabled></td>
</tr>
<tr height="20">
 <td align="left" valign="top" style="font-family:Times New Roman;color:#004993;font-size:14px;">Asset_Images :</td>
 <td colspan="3"><input type="file" size="" name="uAssImg" id="uAssImg" disabled></td>
</tr> 
<tr height="20">
 <td align="left" valign="top" style="font-family:Times New Roman;color:#004993;font-size:16px;">Comment :</td>
 <td colspan="3" align=""><textarea name="Remark" id="Remark" style="font-family:Times New Roman;font-size:15px;" cols="58" rows="1" disabled></textarea></td>
</tr>
<tr height="20">
  <td colspan="4" align="right" style="background-color:#7a6189;">
   <table><tr>
   <td align="center" style="color:#FF0000;font-size:16px;font-family:Times New Roman;background-color:#FFFFFF;width:450px;"><?php echo $msgerror; ?></td>
   <td>&nbsp;</td>
   <td><input type="submit" name="SendRequest" id="SendRequest" style="width:90px;display:none;" value="send"><input type="button" name="EditBtn" id="EditBtn" style="width:90px;" value="edit" onClick="ClickEdit()"></td>
   <td><input type="button" name="Refresh" id="Refresh" style="width:90px;" value="refresh" onClick="javascript:window.location='MyAssetReq.php?act=true&mm=sas&ask=false&ww=rightProtect&we=12345&mm=er4e&r=t5t%t5s&yy=eloi&gosto=false&rigt=checkessue&mailto=promt&wew=e%e@er%rdd=012&page=<?php echo $_REQUEST['page']; ?>'"/></td>
   <td>&nbsp;&nbsp;</td>
   </tr></table>
  
  </td>
</tr>
<tr>
<td>
<?php $sqlRep=mysql_query("select Fname,Sname,Lname,Gender,DR,Married,EmailId_Vnr,RepEmployeeID from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee.EmployeeID=".$EmployeeId, $con); $resRep=mysql_fetch_assoc($sqlRep); if($resRep['DR']=='Y'){$MM='Dr.';} elseif($resRep['Gender']=='M'){$MM='Mr.';} elseif($resRep['Gender']=='F' AND $resRep['Married']=='Y'){$MM='Mrs.';} elseif($resRep['Gender']=='F' AND $resRep['Married']=='N'){$MM='Miss.';}  $EmpName=$MM.' '.$resRep['Fname'].' '.$resRep['Sname'].' '.$resRep['Lname'];
      $Rep=mysql_query("select Fname,Sname,Lname,Gender,DR,Married,EmailId_Vnr from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee.EmployeeID=".$resRep['RepEmployeeID'], $con); $RR=mysql_fetch_assoc($Rep); if($RR['DR']=='Y'){$M='Dr.';} elseif($RR['Gender']=='M'){$M='Mr.';} elseif($RR['Gender']=='F' AND $RR['Married']=='Y'){$M='Mrs.';} elseif($RR['Gender']=='F' AND $RR['Married']=='N'){$M='Miss.';} $RepName=$M.' '.$RR['Fname'].' '.$RR['Sname'].' '.$RR['Lname']; ?>
<input type="hidden" name="EmailSelf" value="<?php echo $resRep['EmailId_Vnr']; ?>" /><input type="hidden" name="EName" value="<?php echo $EmpName; ?>" />
<input type="hidden" name="EmailRep" value="<?php echo $RR['EmailId_Vnr']; ?>" /><input type="hidden" name="Rname" value="<?php echo $RepName; ?>" />
<input type="hidden" name="RID" value="<?php echo $resRep['RepEmployeeID']; ?>" /> 
<?php $sqlHod=mysql_query("select HodId from hrm_employee_reporting where EmployeeID=".$EmployeeId, $con); $resHod=mysql_fetch_assoc($sqlHod);
      $sqlHEmail=mysql_query("select Fname,Sname,Lname,Gender,DR,Married,EmailId_Vnr,RepEmployeeID from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee.EmployeeID=".$resHod['HodId'], $con); $resHEmail=mysql_fetch_assoc($sqlHEmail); if($resHEmail['DR']=='Y'){$MMH='Dr.';} elseif($resHEmail['Gender']=='M'){$MMH='Mr.';} elseif($resHEmail['Gender']=='F' AND $resHEmail['Married']=='Y'){$MMH='Mrs.';} elseif($resHEmail['Gender']=='F' AND $resHEmail['Married']=='N'){$MMH='Miss.';} $HodName=$MMH.' '.$resHEmail['Fname'].' '.$resHEmail['Sname'].' '.$resHEmail['Lname'];
?>
<input type="hidden" name="HID" value="<?php echo $resHod['HodId']; ?>" />
<input type="hidden" name="EmailHod" value="<?php echo $resHEmail['EmailId_Vnr']; ?>" /><input type="hidden" name="Hname" value="<?php echo $HodName; ?>" />


<?php $sqlIT=mysql_query("select EmployeeID from hrm_asset_dept_access where DepartmentId=9", $con); $resIT=mysql_fetch_assoc($sqlIT);
      $sqlItEmp=mysql_query("select Fname,Sname,Lname,Gender,DR,Married,EmailId_Vnr,RepEmployeeID from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee.EmployeeID=".$resIT['EmployeeID'], $con); $resItEmp=mysql_fetch_assoc($sqlItEmp); if($resItEmp['DR']=='Y'){$MMIT='Dr.';} elseif($resItEmp['Gender']=='M'){$MMIT='Mr.';} elseif($resItEmp['Gender']=='F' AND $resItEmp['Married']=='Y'){$MMIT='Mrs.';} elseif($resItEmp['Gender']=='F' AND $resItEmp['Married']=='N'){$MMIT='Miss.';} $ITEmpName=$MMIT.' '.$resItEmp['Fname'].' '.$resItEmp['Sname'].' '.$resItEmp['Lname'];
 ?>
<input type="hidden" name="ITID" value="<?php echo $resIT['EmployeeID']; ?>" />
<input type="hidden" name="EmailITEmp" value="<?php echo $resItEmp['EmailId_Vnr']; ?>" /><input type="hidden" name="ITEMpname" value="<?php echo $ITEmpName; ?>" />

</td>
</tr>
</form>
<tr height="20">
  <td colspan="4" align="">
  <table border="0">
  <tr><td valign="top" colspan="2">&nbsp;<font color="#008000" style='font-family:Times New Roman;' size="3"><b><?php echo $msg; ?></b></font></td></tr>
  </table>
  </td>
</tr>
</table>
     </td>
	</tr>
  </table>	
<?php //*************************************************************************************************************************************************** ?>
<?php /*******************************************Status Open **********/ ?>
 <td>&nbsp;</td>        
 <td bgcolor="#7a6189" style="margin-left:0px;width:5px;">&nbsp;</td>  
 <td>&nbsp;</td>
 <td valign="top" style="margin-left:0px;">
  <table border="0">
   <tr>
    <td style="font-family:Times New Roman; color:#620000; font-size:17px;" align="center"><b><u>Old request Status</u></b></td></tr>
<?php $sql_statement = mysql_query("select * from hrm_asset_employee_request where EmployeeID=".$EmployeeId." AND Status!=0 order by ReqDate DESC", $con);
$total_records = mysql_num_rows($sql_statement);
if(isset($_GET['page'])) $page = $_GET['page']; else $page = 1;  
$offset = 10; 
if ($page){ $from = ($page * $offset) - $offset; }else{ $from = 0;}
$sql_statement = mysql_query("select * from hrm_asset_employee_request where EmployeeID=".$EmployeeId." AND Status!=0 order by ReqDate DESC LIMIT " . $from . "," . $offset, $con);
?>	  
   <tr>
    <td colspan="2" align="center" id="QueryStatusTD" style="margin-left:0px;" valign="top">
	<table border="1">
	   <tr bgcolor="#7a6189" style="height:22px;">
	<?php /*   <td rowspan="2" style="color:#FFFFFF;font-family:Times New Roman;font-size:12px;width:30px;" align="center" ><b>SNo</b></td> */ ?>
	   <td rowspan="2" style="color:#ffffff;font-family:Times New Roman;font-size:12px;width:80px;" align="center"><b>Request<br>Date</b></td>
	   <td rowspan="2" style="color:#ffffff;font-family:Times New Roman;font-size:12px;width:140px;" align="center"><b>Type Of Asset</b></td>
	   <td rowspan="2" style="color:#ffffff;font-family:Times New Roman;font-size:12px;width:80px;" align="center"><b>Balance<br>Amount</b></td>
	   <td rowspan="2" style="color:#ffffff;font-family:Times New Roman;font-size:12px;width:80px;" align="center"><b>Request<br>Amount</b></td>
           <td rowspan="2" style="color:#ffffff;font-family:Times New Roman;font-size:12px;width:80px;" align="center"><b>Approval<br>Amount</b></td>
	   <td colspan="3" style="color:#ffffff;font-family:Times New Roman;font-size:12px;" align="center"><b>ApprovalStatus</b></td>
	   <td colspan="2" style="color:#ffffff;font-family:Times New Roman;font-size:12px;" align="center"><b>Copy</b></td>
	   <td rowspan="2" style="color:#ffffff;font-family:Times New Roman;font-size:12px;width:50px;" align="center"><b>Details</b></td>
	  </tr>	
	  <tr bgcolor="#7a6189" style="height:22px;">
	   <td style="color:#ffffff;font-family:Times New Roman;font-size:12px;width:80px;" align="center"><b>Level-1</b></td>
	   <td style="color:#ffffff;font-family:Times New Roman;font-size:12px;width:80px;" align="center"><b>Level-2</b></td>
	   <td style="color:#ffffff;font-family:Times New Roman;font-size:12px;width:80px;" align="center"><b>Level-3</b></td>
	   <td style="color:#ffffff;font-family:Times New Roman;font-size:12px;width:50px;" align="center"><b>Bill</b></td>
	   <td style="color:#ffffff;font-family:Times New Roman;font-size:12px;width:50px;" align="center"><b>Asset</b></td>
	  </tr>	
<?php if($total_records>0){ if($_REQUEST['page']==1){$Sn=1;} elseif($_REQUEST['page']==2){$Sn=11;} elseif($_REQUEST['page']==3){$Sn=21;}
	  elseif($_REQUEST['page']==4){$Sn=31;}elseif($_REQUEST['page']==5){$Sn=41;} elseif($_REQUEST['page']==6){$Sn=51;} 
	  elseif($_REQUEST['page']==7){$Sn=61;}elseif($_REQUEST['page']==8){$Sn=71;} elseif($_REQUEST['page']==9){$Sn=81;} 
	  elseif($_REQUEST['page']==10){$Sn=91;}else{$Sn=1;} while($res=mysql_fetch_array($sql_statement)){ ?>
	  <?php if($res['ManualShow']=='N' OR ($res['ManualShow']=='Y' AND $res['HODApprovalStatus']==2 AND $res['ITApprovalStatus']==2 AND $res['AccPayStatus']==2)) { ?>
      <tr bgcolor="#FFFFFF" style="height:22px;">
	<?php /*   <td style="font-family:Times New Roman;font-size:13px;" align="center" valign="top"><?php echo $Sn; ?></td> */ ?>
	   <td style="font-family:Times New Roman;font-size:13px;width:80px;"align="center" valign="top"><?php if($res['ReqDate']=='0000-00-00' OR $res['ReqDate']=='1970-01-01'){echo '';} else {echo date("d My",strtotime($res['ReqDate']));} ?></td>
	   <td style="font-family:Times New Roman; font-size:13px; width:140px; overflow:hidden;" valign="top">&nbsp;<?php if($res['AssetNId']!=''){ $sqlAn=mysql_query("select AssetName from hrm_asset_name where AssetNId=".$res['AssetNId']); $resAn=mysql_fetch_array($sqlAn); echo $resAn['AssetName']; } else {echo '';} ?></td>
	   <td style="font-family:Times New Roman; font-size:13px; width:80px;" align="right" valign="top"><?php echo intval($res['MaxLimitAmt']); ?>&nbsp;</td>
	   
	   <td style="font-family:Times New Roman; font-size:13px; width:80px;" align="right" valign="top"><?php echo intval($res['ReqAmt']); ?>&nbsp;</td>
           <td style="font-family:Times New Roman; font-size:13px; width:80px;" align="right" valign="top"><?php echo intval($res['ApprovalAmt']); ?>&nbsp;</td>
	   
	   <td align="center" style="font-size:12px; font-family:Times New Roman;color:<?php if($res['HODApprovalStatus']==1){echo '#FF8C1A';}elseif($res['HODApprovalStatus']==2){echo '#008200';}elseif($res['HODApprovalStatus']==3){echo '#FF0000';}elseif($res['HODApprovalStatus']==4){ if($res['FwdApprovalStatus']==1){echo '#FF8C1A';}elseif($res['FwdApprovalStatus']==2){echo '#008200';}elseif($res['FwdApprovalStatus']==3){echo '#FF0000';} } ?>;"><?php if($res['HODApprovalStatus']==0){echo 'Draft';}elseif($res['HODApprovalStatus']==1){echo 'Pending';}elseif($res['HODApprovalStatus']==2){echo 'Approved';}elseif($res['HODApprovalStatus']==3){echo 'Rejected';}elseif($res['HODApprovalStatus']==4){ if($res['FwdApprovalStatus']==0){echo 'Draft';}elseif($res['FwdApprovalStatus']==1){echo 'Pending';}elseif($res['FwdApprovalStatus']==2){echo 'Approved';}elseif($res['FwdApprovalStatus']==3){echo 'Rejected';} } ?></td>
	   <td align="center" style="font-size:12px; font-family:Times New Roman;color:<?php if($res['ITApprovalStatus']==1){echo '#FF8C1A';}elseif($res['ITApprovalStatus']==2){echo '#008200';}elseif($res['ITApprovalStatus']==3){echo '#FF0000';} ?>;"><?php if($res['ITApprovalStatus']==0){echo 'Draft';}elseif($res['ITApprovalStatus']==1){echo 'Pending';}elseif($res['ITApprovalStatus']==2){echo 'Approved';}elseif($res['ITApprovalStatus']==3){echo 'Rejected';} ?></td>
	   <td align="center" style="font-size:12px; font-family:Times New Roman;color:<?php if($res['AccPayStatus']==1){echo '#FF8C1A';}elseif($res['AccPayStatus']==2){echo '#008200';}elseif($res['AccPayStatus']==3){echo '#FF0000';} ?>;"><?php if($res['AccPayStatus']==0){echo 'Draft';}elseif($res['AccPayStatus']==1){echo 'Pending';}elseif($res['AccPayStatus']==2){echo 'Paid';}elseif($res['AccPayStatus']==3){echo 'Rejected';} ?></td>
	   
	   <td style="font-family:Times New Roman;font-size:13px;width:50px;" align="center"><?php if($res['ReqBillImgExtName']!=''){ ?><a href="#" onClick="javascript:window.open('MyAssetCopy.php?Img=Bill&value=<?php echo $res['ReqBillImgExtName']; ?>','ImgF','width=600,height=500')">Click</a><?php } ?></td>
	   <td style="font-family:Times New Roman;font-size:13px;width:50px;" align="center"><?php if($res['ReqAssestImgExtName']!=''){ ?><a href="#" onClick="javascript:window.open('MyAssetCopy.php?Img=Asset&value=<?php echo $res['ReqAssestImgExtName']; ?>','ImgF','width=600,height=500')">Click</a><?php } ?></td>
	   
	   
 	   <td style="font-family:Times New Roman;font-size:13px;width:60px;" align="center"><a href="#" onClick="FunClickAssetReq(<?php echo $res['AssetEmpReqId'].','.$EmployeeId; ?>)">Click</a></td>
	  </tr>	
<?php $Sn++;} } } if($total_records==0) { ?>
      <tr>
	   <td colspan="11" style="font:Times New Roman; color:#D56A00; font-size:12px; width:50px;"><b>Empty....</b></td>
	  </tr>
<?php } ?>					 			 			 
	</table>
	</td>
  </tr>
<tr>
<td align="center" style="font-family:Times New Roman; font-size:15px; font-weight:bold;" colspan="2">
<?PHP doPages($offset, 'MyAssetReq.php', '', $total_records); ?>
</td>
</tr>
				
<tr>
 <td style="font-family:Times New Roman;font-size:14px;" colspan="2">
   <br>
   Level 1 - <font color="#007700">HOD/ Reporting</font><br>
   Level 2 - <font color="#007700">IT Section</font><br>
   Level 3 - <font color="#007700">Account Section</font><br>
 </td>
</tr>	
		   
  </table>
 </td>
<?php /*******************************************Status Close**********/ ?> 
		   </td>
		  </tr>
		</table>
	  </td>
	</tr>
	<tr style="height:50px;"><td>&nbsp;</td></tr>
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
<?php
function check_integer($which) {
if(isset($_REQUEST[$which])){
if (intval($_REQUEST[$which])>0) {
return intval($_REQUEST[$which]);
} else {
return false;
}
}
return false;
}
function get_current_page() {
if(($var=check_integer('page'))) {
return $var;
} else {
//return 1, if it wasnt set before, page=1
return 1;
}
}
function doPages($page_size, $thepage, $query_string, $total=0){
$index_limit = 4;
$query='';
if(strlen($query_string)>0){
$query = "&amp;".$query_string;
}
$current = get_current_page();
$total_pages=ceil($total/$page_size);
$start=max($current-intval($index_limit/2), 1);
$end=$start+$index_limit-1;
echo '<div class="paging">';
if($current==1) {
echo '<span class="prn">&lt; Previous</span>&nbsp;';
} else {
$i = $current-1;
echo '<a href="'.$thepage.'?page='.$i.$query.'" class="prn" rel="nofollow" title="go to page '.$i.'">&lt; Previous</a>&nbsp;';
echo '<span class="prn">...</span>&nbsp;';
}
if($start > 1) {
$i = 1;
echo '<a href="'.$thepage.'?page='.$i.$query.'" title="go to page '.$i.'">'.$i.'</a>&nbsp;';
}
for ($i = $start; $i <= $end && $i <= $total_pages; $i++){
if($i==$current) {
echo '<span>'.$i.'</span>&nbsp;';
} else {
echo '<a href="'.$thepage.'?page='.$i.$query.'" title="go to page '.$i.'">'.$i.'</a>&nbsp;';
}
}
if($total_pages > $end){
$i = $total_pages;
echo '<a href="'.$thepage.'?page='.$i.$query.'" title="go to page '.$i.'">'.$i.'</a>&nbsp;';
}
if($current < $total_pages) {
$i = $current+1;
echo '<span class="prn">...</span>&nbsp;';
echo '<a href="'.$thepage.'?page='.$i.$query.'" class="prn" rel="nofollow" title="go to page '.$i.'">Next &gt;</a>&nbsp;';
} else {
echo '<span class="prn">Next &gt;</span>&nbsp;';
}
if ($total != 0){
//prints the total result count just below the paging
echo '&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ee4545"<h4>(Total '.$total.' Records)</h4></font></div>';
}
}
?>



