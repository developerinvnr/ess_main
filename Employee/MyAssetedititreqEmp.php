<?php session_start();
if($_SESSION['login'] = true){require_once('../AdminUser/config/config.php');}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('../AdminUser/logcheck.php');
if($_SESSION['logCheckEmp']!=$logemp){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('EmpMenuSession.php');}
//**********************************
$EmMPID=$_REQUEST['ID']; $SqEC=mysql_query("select EmpCode from hrm_employee where EmployeeID=".$EmMPID, $con); $ReEC=mysql_fetch_assoc($SqEC); $resEC=mysql_fetch_assoc($SqEC);
$Lenght=strlen($resEC['EmpCode']); 
if($Lenght==1){$FileN='000'.$resEC['EmpCode'];} 
elseif($Lenght==2){$FileN='00'.$resEC['EmpCode'];} 
elseif($Lenght==3){$FileN='0'.$resEC['EmpCode'];}
elseif($Lenght==4){$FileN=$resEC['EmpCode'];}

//**********************************

if(isset($_POST['SaveNew']))
{ 

  $uploadedBill=0; $extBill=""; $uploadedAsset=0; $extAsset=""; 
  if((!empty($_FILES["uBill"])) && ($_FILES['uBill']['error'] == 0))
  { 
   $filenameBill =strtolower(basename($_FILES['uBill']['name']));
   $fileSizeBill =$_FILES['uBill']['size'];
   $extBill = substr($filenameBill, strrpos($filenameBill, '.') + 1);
   $newfilenameBill='B'.$FileN.'_'.date("dmyHis").'.'.$extBill;
   if((($extBill == 'jpg') || ($extBill == 'jpeg') || ($extBill == 'gif') || ($extBill == 'png')))
   { $newname = dirname(__FILE__).'/AssetReqUploadFile/'.$newfilenameBill; move_uploaded_file($_FILES['uBill']['tmp_name'],$newname); }
   else { $msgUp = "Error: Only jpg, jpeg, png or gif files is allowed"; }
   include_once("ak_php_img_lib_1.0.php");
   $target_file = "AssetReqUploadFile/$newfilenameBill";
   $resized_file = "AssetReqUploadFile/$newfilenameBill";
   $wmax = 500;
   $hmax = 600;
   ak_img_resize($target_file, $resized_file, $wmax, $hmax, $extBill);
  }
  if((!empty($_FILES["uAssImg"])) && ($_FILES['uAssImg']['error'] == 0))
  { //echo 'bb';
   $filenameAsset =strtolower(basename($_FILES['uAssImg']['name']));
   $fileSizeAsset =$_FILES['uAssImg']['size'];
   $extAsset = substr($filenameAsset, strrpos($filenameAsset, '.') + 1);
   $newfilenameAsset='A'.$FileN.'_'.date("dmyHis").'.'.$extAsset;
   if((($extAsset=='jpg') || ($extAsset =='jpeg') || ($extAsset=='gif') || ($extAsset=='png') || ($extAsset=='pdf')))
   { $newname2= dirname(__FILE__).'/AssetReqUploadFile/'.$newfilenameAsset; move_uploaded_file($_FILES['uAssImg']['tmp_name'],$newname2); }
   else { $msgUp = "Error: Only jpg, jpeg, png or gif, pdf files is allowed"; }
   include_once("ak_php_img_lib_1.0.php");
   $target_file = "AssetReqUploadFile/$newfilenameAsset";
   $resized_file = "AssetReqUploadFile/$newfilenameAsset";
   $wmax = 500;
   $hmax = 600;
   ak_img_resize($target_file, $resized_file, $wmax, $hmax, $extAsset);  
  }
 if($_POST['ApprovalDate']!=''){$ApprovalDate=date("Y-m-d",strtotime($_POST['ApprovalDate'])); }else{ $ApprovalDate='0000-00-00'; }
 $sqlRep=mysql_query("select RepEmployeeID from hrm_employee_general where EmployeeID=".$EmMPID, $con); $resRep=mysql_fetch_assoc($sqlRep);
 $sqlHod=mysql_query("select HodId from hrm_employee_reporting where EmployeeID=".$EmMPID, $con); $resHod=mysql_fetch_assoc($sqlHod);
 $sqlExpiry=mysql_query("select ExpiryM from hrm_asset_name where AssetNId=".$_POST['AssetNId'],$con); $resExpiry=mysql_fetch_assoc($sqlExpiry);
 
 $AmtPerMonth=$_REQUEST['ApprovalAmt']/$resExpiry['ExpiryM']; $AmtExpiryDate=date("Y-m-d",strtotime($_POST['PurDate'].'+'.$resExpiry['ExpiryM'].' month'));
 if($_POST['TApproval']==2){ $AmtPM=$AmtPerMonth; $AmtED=$AmtExpiryDate; }else{ $AmtPM=0; $AmtED='0000-00-00'; }

 $ExpMDate=date('Y-m-d', strtotime("+36 months", strtotime(date("Y-m-d"))));
 
 $SqlInsert=mysql_query("INSERT INTO hrm_asset_employee_request(EmployeeID, AssetNId, ComName, ModelName, DealeName, PurDate, MaxLimitAmt, ReqAmt, ApprovalAmt, ReqDate, ReportingId, HodId, ReqAssestImgExtName, ReqAssestImgExt, ReqBillImgExtName, ReqBillImgExt, HODApprovalStatus, ITApprovalStatus, AccPayStatus, AccPayAmt, ApprovalDate, ReqAmtExpiryNOM, ReqAmtExpiryDate, ReqAmtPerMonth, ManualShow, CreatedBy, CreatedDate, YearId) VALUES(".$EmMPID.", '".$_POST['AssetNId']."', '".$_POST['ComName']."', '".$_POST['ModelName']."', '".$_POST['DealeName']."', '".date("Y-m-d",strtotime($_POST['PurDate']))."', '".$_POST['MaxLimitAmt']."', '".$_POST['ReqAmt']."', '".$_POST['ApprovalAmt']."', '".date("Y-m-d",strtotime($_POST['ReqDate']))."', '".$resRep['RepEmployeeID']."', '".$resHod['HodId']."', '".$newfilenameAsset."', '".$extAsset."', '".$newfilenameBill."', '".$extBill."', '".$_POST['FApproval']."', '".$_POST['SApproval']."', '".$_POST['TApproval']."', '".$_POST['ApprovalAmt']."', '".$ApprovalDate."', 36, '".$ExpMDate."', '".$AmtPM."', 'Y', ".$EmployeeId.",'".date('Y-m-d')."',".$YearId.")", $con);
}

if(isset($_REQUEST['action']) && $_REQUEST['action']=="delete")
{ $SqlDelete=mysql_query("update hrm_asset_employee_request set Status=0, StatusCngDate='".date("Y-m-d")."' WHERE AssetEmpReqId=".$_REQUEST['did'], $con) or die(mysql_error()); }

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
<script type="text/javascript" src="src/js/jscal2.js"></script>
<script type="text/javascript" src="src/js/lang/en.js"></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<style>.font { color:#ffffff; font-family:Georgia; font-size:11px; width:200px;} .font1 { font-family:Georgia; font-size:11px; height:14px; } 
.font2 { font-size:11px;width:260px;height:18px;}.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;} .TableHead { font-family:Times New Roman; color:#FFFFFF; font-size:15px; }
.TableHead1 { font-family:Times New Roman; color:#000000; background-color:#FFFFFF; font-size:13px; overflow:hidden; } .InputText {font-family:Times New Roman; font-size:12px; width:100px; height:19px; }
.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}
.SaveButton {background-image:url(images/save.gif); width:20px; height:20px; background-repeat:no-repeat; background-color:#FFFFFF; border-color:#FFFFFF; border-bottom:inherit;}
.EditSelect { font-family:Georgia; font-size:12px; height:18px;}
.EditInput { font-family:Georgia; font-size:12px; height:18px;}
.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}
</style>
<Script type="text/javascript">window.history.forward(1);</Script>
<script type="text/javascript" language="javascript">
function edit(value){ var ID=document.getElementById("ID").value; var agree=confirm("Are you sure you want to edit this record?");if(agree){ var x="MyAssetedititreqEmp.php?act=true&mm=sas&ask=false&ww=rightProtect&we=12345&mm=er4e&r=t5t%t5s&yy=eloi&gosto=false&rigt=checkessue&mailto=promt&wew=e%e@er%rdd=012&page=1&action=edit&eid="+value+"&ID="+ID;  window.location=x;}}
function del(value){ var ID=document.getElementById("ID").value; var agree=confirm("Are you sure you want to delete this record?");if(agree){ var x="MyAssetedititreqEmp.php?act=true&mm=sas&ask=false&ww=rightProtect&we=12345&mm=er4e&r=t5t%t5s&yy=eloi&gosto=false&rigt=checkessue&mailto=promt&wew=e%e@er%rdd=012&page=1&action=delete&did="+value+"&ID="+ID; window.location=x;}}
function newsave(){ var ID=document.getElementById("ID").value; var x = "MyAssetedititreqEmp.php?act=true&mm=sas&ask=false&ww=rightProtect&we=12345&mm=er4e&r=t5t%t5s&yy=eloi&gosto=false&rigt=checkessue&mailto=promt&wew=e%e@er%rdd=012&page=1&action=newsave&ID="+ID; window.location=x;}

function FunClickAssetReq(Aeri,ID)
{ var win=window.open("MyAssetitEmpFieldReq.php?act=true&mm=sas&ask=false&ww=rightProtect&we=12345&mm=er4e&r=t5t%t5s&yy=eloi&gosto=false&rigt=checkessue&mailto=promt&wew=e%e@er%rdd=012&CheckAct=ExtraReqField&ID="+ID+"&Aeri="+Aeri,"AForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=700,height=550"); 
 var timer = setInterval( function() { if(win.closed){ clearInterval(timer);
 window.location="MyAssetedititreqEmp.php?act=true&mm=sas&ask=false&ww=rightProtect&we=12345&mm=er4e&r=t5t%t5s&yy=eloi&gosto=false&rigt=checkessue&mailto=promt&wew=e%e@er%rdd=012&page=1&ID="+ID; } }, 1000);	
}

/*
function Click(v1,v2)
{ document.getElementById("DIVSpan").style.display='block'; var ComId=document.getElementById("ComId").value; 
  var url = 'AssetCheckECN.php'; var pars = 'checkv=v1&v2='+v2+'&CId='+ComId;
  var myAjax = new Ajax.Request( url, { method: 'post', parameters: pars,  onComplete: show_CheckECN }); 	
}
function show_CheckECN(originalRequest){ document.getElementById('ECNSpan').innerHTML=originalRequest.responseText; }

function GetEmp(Id)
{ var ComId=document.getElementById("ComId").value;
  var url = 'AssetCheckECN.php'; var pars = 'checkemp=v1&EId='+Id+'&CId='+ComId;  var myAjax = new Ajax.Request(
  url, { method: 'post', parameters: pars,  onComplete: show_GetEmp });
}	
function show_GetEmp(originalRequest){ document.getElementById('ResultECNSpan').innerHTML = originalRequest.responseText; 
document.getElementById("AEmpId").value=document.getElementById("AEI").value; document.getElementById("EC").value=document.getElementById("AEC").value;
document.getElementById("EName").value=document.getElementById("AEN").value; document.getElementById("DeptName").value=document.getElementById("AEDC").value;
document.getElementById("Contact").value=document.getElementById("AEMN").value; document.getElementById("DIVSpan").style.display='none';
}	
*/

function FunChgAsset(v,ei,gi,sn)
{ //alert(v+"-"+ei+"-"+gi+"-"+sn);
  var url = 'MyAssetReqAct.php'; var pars = 'act=SetAssetMaxMint&v='+v+'&gi='+gi+'&ei='+ei+'&sn='+sn;  
  var myAjax = new Ajax.Request( url, { method: 'post', parameters: pars, onComplete: show_valueMax2 }); 
}

function show_valueMax2(originalRequest)
{ document.getElementById('EventSpan11').innerHTML = originalRequest.responseText; var v=document.getElementById("v").value;
  var gi=document.getElementById("gi").value; var ei=document.getElementById("ei").value; var actionAmt=document.getElementById("actionAmt1").value; 
  var ActualAmt=document.getElementById("ActualAmt").value; var PriviousAmt=document.getElementById("PriviousAmt").value; 
  var sn=document.getElementById("sn").value;
  var MaxLimitAmt=document.getElementById("MaxLimitAmt_"+sn).value=document.getElementById("ActualAmt").value;
}	


function validate(form1) 
{  var Numfilter=/^[0-9 ]+$/;  var filter=/^[a-zA-Z. /]+$/;
   var AssetNId = document.getElementById("AssetNId").value;  
   if(AssetNId==0){ alert("Please select asset name.");  return false; }
   var ComName = document.getElementById("ComName").value;
   if(ComName.length===0){ alert("You must enter a company name.");  return false; }
   var DealeName = document.getElementById("DealeName").value;
   if(DealeName.length===0){ alert("You must enter a dealer name.");  return false; }
   var PurDate = document.getElementById("PurDate").value;
   if(PurDate.length===0){ alert("You must enter a purchase date.");  return false; }
   var ReqAmt = document.getElementById("ReqAmt").value; var testN_ReqAmt = Numfilter.test(ReqAmt);
   if(ReqAmt.length===0){ alert("You must enter a request amount.");  return false; }
   if(testN_ReqAmt==false){ alert('please enter only number in the request amount field'); return false; }
  
   if(testN_ApprovalAmt==false){ alert('please enter only number in the approval amount field'); return false; }
   var ReqDate = document.getElementById("ReqDate").value;
   if(ReqDate.length===0){ alert("You must enter a asset request date.");  return false; } 
   
   var uBill = document.getElementById("uBill").value;
   if(uBill.length===0){ alert("Please upload bill copy.");  return false; }
   
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
   
   var agree=confirm("Are you sure, you want to save asset request?");
   if(agree){return true;}else{return false;}
}

</script>
</head>
<body class="body">
<span id="EventSpan11"></span>
<table class="table">
<tr>
 <td>
  <table class="menutable"><tr><td><?php if($_SESSION['login'] = true){ require_once("EMenu.php"); } ?></td></tr></table>
 </td>
</tr>
<tr>
 <td>
  <table style="margin-top:0px;">
    <tr>
	  <td valign="top"><?php if($_SESSION['login'] = true){ require_once("EWelcome.php"); } ?></td>
	</tr>
	 <tr>
	  <td valign="top">
	     <table border="0" cellpadding="0">
		  <tr>
		   <td valign="top"> 
		   
<?php //*************************************************************************************************************************************************** ?>	  
		     <table border="0" id="Activity">
			  <tr>
				  <td align="left" valign="top">
	     <table border="0">
		    <tr>
			 <td colspan="10"><table border="0" style="width:1500px;">
<?php $SqlEmp = mysql_query("SELECT hrm_employee.*, hrm_employee_general.* FROM hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID WHERE hrm_employee.EmployeeID=".$EmMPID, $con);  $ResEmp=mysql_fetch_assoc($SqlEmp);
$Ename = $ResEmp['Fname'].'&nbsp;'.$ResEmp['Sname'].'&nbsp;'.$ResEmp['Lname']; $LEC=strlen($ResEmp['EmpCode']); 
 if($LEC==1){$EC='000'.$ResEmp['EmpCode'];} if($LEC==2){$EC='00'.$ResEmp['EmpCode'];} if($LEC==3){$EC='0'.$ResEmp['EmpCode'];} if($LEC>=4){$EC=$ResEmp['EmpCode'];}
$sqlG=mysql_query("select GradeId from hrm_employee_general where EmployeeID=".$EmMPID, $con); $resG=mysql_fetch_assoc($sqlG);
$sqlMax=mysql_query("select AssetEmpReqId from hrm_asset_employee_request where EmployeeID=".$EmMPID, $con); $rowMax=mysql_num_rows($sqlMax); 

?>		
 <tr>
  <td><input type="hidden" name="ID" id="ID" value="<?php echo $_REQUEST['ID']; ?>" />		 
   <table border="0">
<tr>
 <td>
  <table>
    <tr>
 <?php /*   <td align="center" valign="top" width="80"><?php echo "<img width=80px height=100px src=\"show_images.php?id=".$EmMPID."\">\n";?></td> */ ?>
	<td class="heading" valign="bottom"><font color="#106809" style='font-family:Times New Roman;' size="4"><i><b>Employee Asset Request: </b></i></font></td>
	<td>&nbsp;</td>
    <td style="font-weight:bold;height:22px;font-family:Times New Roman;font-size:14px;" valign="bottom">EmpCode :</td>
	<td style="font-weight:bold;height:22px;font-family:Times New Roman;font-size:14px;width:50px;color:#693434;" valign="bottom"><?php echo $EC; ?></td>
    <td style="font-weight:bold;height:22px;font-family:Times New Roman;font-size:14px;" valign="bottom">Name :</td>
	<td style="font-weight:bold;height:22px;font-family:Times New Roman;font-size:14px;color:#693434;" valign="bottom"><?php echo $Ename; ?></td>
    <td class="font4" style="left" valign="bottom">&nbsp;&nbsp;&nbsp;<b><span id="msgspan"><?php echo $msg; ?></span></b></td>
    </tr>
  </table>
 </td>
</tr>
<tr> 

<td align="left" valign="top">
<table border="1" id="TEmp" style="display:block;" cellpadding="0" cellspacing="0">
<tr bgcolor="#7a6189" style="color:#FFFFFF;font-weight:bold;height:22px;font-family:Times New Roman;font-size:12px;">
  <td rowspan="2" style="width:30px;" align="center">SNo.</td>
  <td rowspan="2" style="width:50px;" align="center">Details</td>
  <td rowspan="2" style="width:50px;" align="center">Action</td>
  <td rowspan="2" style="width:120px;" align="center">Name Of Asset</td>
  <td rowspan="2" style="width:100px;" align="center">Company</td>
  <td rowspan="2" style="width:100px;" align="center">Model</td>
  <td rowspan="2" style="width:100px;" align="center">Dealer</td>
  <td rowspan="2" style="width:100px;" align="center">Purchase</td>
  <td colspan="3" align="center">Amount</td>
  <td rowspan="2" style="width:60px;" align="center">Amount ExpiryDate</td>
  <td rowspan="2" style="width:100px;" align="center">Request Date</td>
  <td colspan="2" align="center">Copy</td>
  <td colspan="3" align="center">Approval Status</td>
  <td rowspan="2" style="width:100px;" align="center">Approval Date</td>
</tr>
<tr bgcolor="#7a6189" style="color:#FFFFFF;font-weight:bold;height:22px;font-family:Times New Roman;font-size:12px;">
  <td style="width:60px;" align="center">Balance</td>
  <td style="width:60px;" align="center">Request</td>
  <td style="width:60px;" align="center">Approval</td>
  <td style="width:60px;" align="center">Bill</td>
  <td style="width:60px;" align="center">Asset</td>
  <td style="width:60px;" align="center">HOD</td>
  <td style="width:60px;" align="center">IT</td>
  <td style="width:60px;" align="center">A/C</td>
</tr>
<?php $sql=mysql_query("select * from hrm_asset_employee_request where EmployeeID=".$EmMPID." AND Status!=0 order by ReqDate DESC", $con); 
      $sno=1; while($res=mysql_fetch_array($sql)) {
?>	
<tr bgcolor="#FFFFFF">
<td align="center" style="font-size:12px; font-family:Times New Roman; height:20px;"><?php echo $sno; ?></td>
<td style="font-size:12px;font-family:Times New Roman;" align="center"><a href="#" onClick="FunClickAssetReq(<?php echo $res['AssetEmpReqId'].','.$EmMPID; ?>)">Click</a></td>
<td align="center"><?php if($res['ManualShow']=='Y'){ ?><a href="#"><img src="images/delete.png" alt="Delete" border="0" onClick="del(<?php echo $res['AssetEmpReqId']; ?>)"></a><?php } ?></td>
<td><input style="width:120px;height:20px;font-size:12px;font-family:Times New Roman;" value="<?php if($res['AssetNId']!=''){ $sqlAn=mysql_query("select AssetName from hrm_asset_name where AssetNId=".$res['AssetNId']); $resAn=mysql_fetch_array($sqlAn); echo $resAn['AssetName']; } else {echo '';} ?>" /></td>
<td><input style="width:100px;height:20px;font-size:12px;font-family:Times New Roman;" value="<?php echo $res['ComName']; ?>" /></td>
<td><input style="width:100px;height:20px;font-size:12px;font-family:Times New Roman;" value="<?php echo $res['ModelName']; ?>" /></td>
<td><input style="width:100px;height:20px;font-size:12px;font-family:Times New Roman;" value="<?php echo $res['DealeName']; ?>" /></td>
<td><input style="width:100px;height:20px;font-size:12px;font-family:Times New Roman;text-align:center;" value="<?php echo date("d My",strtotime($res['PurDate'])); ?>" /></td>
<td><input style="width:60px;height:20px;font-size:12px;font-family:Times New Roman;text-align:right;" value="<?php echo intval($res['MaxLimitAmt']); ?>"/></td>
<td><input style="width:60px;height:20px;font-size:12px;font-family:Times New Roman;text-align:right;" value="<?php echo intval($res['ReqAmt']); ?>" /></td>
<td><input style="width:60px;height:20px;font-size:12px;font-family:Times New Roman;text-align:right;" value="<?php echo intval($res['ApprovalAmt']); ?>"/></td>
<td><input style="width:60px;height:20px;font-size:12px;font-family:Times New Roman;text-align:center;" value="<?php if($res['ReqAmtExpiryDate']!='0000-00-00' AND $res['ReqAmtExpiryDate']!='1970-01-01'){ echo date("d My",strtotime($res['ReqAmtExpiryDate']));} ?>" /></td>
<td><input style="width:100px;height:20px;font-size:12px;font-family:Times New Roman;text-align:center;" value="<?php if($res['ReqDate']!='0000-00-00' AND $res['ReqDate']!='1970-01-01'){echo date("d My",strtotime($res['ReqDate']));} ?>" /></td>
<td style="width:60px;height:20px;font-size:12px;font-family:Times New Roman;text-align:center;" align="center"><?php if($res['ReqBillImgExtName']!=''){ ?><a href="#" onClick="javascript:window.open('MyAssetCopy.php?Img=Bill&value=<?php echo $res['ReqBillImgExtName']; ?>','ImgF','width=600,height=500')">Bill</a><?php } ?></td>
<td style="width:60px;height:20px;font-size:12px;font-family:Times New Roman;text-align:center;" align="center"><?php if($res['ReqAssestImgExtName']!=''){ ?><a href="#" onClick="javascript:window.open('MyAssetCopy.php?Img=Asset&value=<?php echo $res['ReqAssestImgExtName']; ?>','ImgF','width=600,height=500')">Asset</a><?php } ?></td>

<td align="center" style="width:60px;font-size:12px;font-family:Times New Roman;color:<?php if($res['HODApprovalStatus']==1){echo '#FF8C1A';}elseif($res['HODApprovalStatus']==2){echo '#008200';}elseif($res['HODApprovalStatus']==3){echo '#FF0000';}elseif($res['HODApprovalStatus']==4){if($res['FwdApprovalStatus']==1){echo '#FF8C1A';}elseif($res['FwdApprovalStatus']==2){echo '#008200';}elseif($res['FwdApprovalStatus']==3){echo '#FF0000';}} ?>;"><?php if($res['HODApprovalStatus']==0){echo 'Draft';}elseif($res['HODApprovalStatus']==1){echo 'Pending';}elseif($res['HODApprovalStatus']==2){echo 'Approved';}elseif($res['HODApprovalStatus']==3){echo 'Rejected';}elseif($res['HODApprovalStatus']==4){if($res['FwdApprovalStatus']==0){echo 'Draft';}elseif($res['FwdApprovalStatus']==1){echo 'Pending';}elseif($res['FwdApprovalStatus']==2){echo 'Approved';}elseif($res['FwdApprovalStatus']==3){echo 'Rejected';}} ?></td>
<td align="center" style="width:60px;font-size:12px;font-family:Times New Roman;color:<?php if($res['ITApprovalStatus']==1){echo '#FF8C1A';}elseif($res['ITApprovalStatus']==2){echo '#008200';}elseif($res['ITApprovalStatus']==3){echo '#FF0000';} ?>;"><?php if($res['ITApprovalStatus']==0){echo 'Draft';}elseif($res['ITApprovalStatus']==1){echo 'Pending';}elseif($res['ITApprovalStatus']==2){echo 'Approved';}elseif($res['ITApprovalStatus']==3){echo 'Rejected';} ?></td>
<td align="center" style="width:60px;font-size:12px;font-family:Times New Roman;color:<?php if($res['AccPayStatus']==1){echo '#FF8C1A';}elseif($res['AccPayStatus']==2){echo '#008200';}elseif($res['AccPayStatus']==3){echo '#FF0000';} ?>;"><?php if($res['AccPayStatus']==0){echo 'Draft';}elseif($res['AccPayStatus']==1){echo 'Pending';}elseif($res['AccPayStatus']==2){echo 'Paid';}elseif($res['AccPayStatus']==3){echo 'Rejected';} ?></td>
<td><input style="width:100px;height:20px;font-size:12px;font-family:Times New Roman;text-align:center;" value="<?php if($res['ApprovalDate']!='0000-00-00' AND $res['ApprovalDate']!='1970-01-01'){ echo date("d My",strtotime($res['ApprovalDate']));} ?>" /></td>
<?php /*<a href="#"><img src="images/edit.png" border="0" alt="Edit" onClick="edit(<?php echo $res['AssetEmpReqId']; ?>)"></a>&nbsp;&nbsp;&nbsp;&nbsp; */ ?>
</tr>
<?php $sno++;} ?>
<tr><td bgcolor="#B6E9E2" colspan="10"></td></tr>
<?php if(isset($_REQUEST['action']) && $_REQUEST['action']=="newsave"){ ?>
<form name="formEdit" method="post" enctype="multipart/form-data" onSubmit="return validate(this)">
<tr bgcolor="#FFFFFF">
<td align="center" style="font-size:12px; font-family:Times New Roman; height:20px;"><?php echo $sno; ?><input type="hidden" id="AEmpId" name="AEmpId" value="" /></td>
<td style="font-size:12px;font-family:Times New Roman;width:60px;" align="center">&nbsp;</td>
<td align="center"><input type="submit" name="SaveNew"  value="" class="SaveButton"></td>
<td><select name="AssetNId" id="AssetNId" style="width:120px;height:20px;font-size:12px;font-family:Times New Roman;" onChange="FunChgAsset(this.value,<?php echo $EmMPID.','.$resG['GradeId'].','.$sno; ?>)"><option value="">select</option>
<?php $sqlNA=mysql_query("select * from hrm_asset_name where Status='A' order by AssetName ASC", $con); while($resNA=mysql_fetch_assoc($sqlNA)) { ?>
<option value="<?php echo $resNA['AssetNId']; ?>"><?php echo $resNA['AssetName']; ?></option><?php } ?></select></td>
<td><input style="width:100px;height:20px;font-size:12px;font-family:Times New Roman;" name="ComName" id="ComName"/></td>
<td><input style="width:100px;height:20px;font-size:12px;font-family:Times New Roman;" name="ModelName" id="ModelName"/></td>
<td><input style="width:100px;height:20px;font-size:12px;font-family:Times New Roman;" name="DealeName" id="DealeName"/></td>
<td align="center"><input style="width:70px;height:20px;font-size:12px;font-family:Times New Roman;text-align:center;" name="PurDate" id="PurDate" /><button id="PurDateBtn" class="CalenderButton"></button><script type="text/javascript">var cal=Calendar.setup({ onSelect:function(cal){cal.hide()},showTime:true}); cal.manageFields("PurDateBtn","PurDate","%d-%m-%Y")</script></td>
<td><input style="width:60px;height:20px;font-size:12px;font-family:Times New Roman;text-align:right;font-weight:bold;color:#FF0000;" name="MaxLimitAmt" id="MaxLimitAmt_<?php echo $sno; ?>" /></td>
<td><input style="width:60px;height:20px;font-size:12px;font-family:Times New Roman;text-align:right;" name="ReqAmt" id="ReqAmt" /></td>
<td><input style="width:60px;height:20px;font-size:12px;font-family:Times New Roman;text-align:right;" name="ApprovalAmt" id="ApprovalAmt" /></td>
<td style="font-size:12px;font-family:Times New Roman;width:60px;" align="center">&nbsp;</td>
<td align="center"><input style="width:70px;height:20px;font-size:12px;font-family:Times New Roman;text-align:center;" name="ReqDate" id="ReqDate" /><button id="ReqDateBtn" class="CalenderButton"></button><script type="text/javascript">var cal=Calendar.setup({ onSelect:function(cal){cal.hide()},showTime:true}); cal.manageFields("ReqDateBtn","ReqDate","%d-%m-%Y")</script></td>
<td align="center"><input type="file" size="" name="uBill" id="uBill" style="width:60px;height:20px;font-size:12px;font-family:Times New Roman;"></td>
<td align="center"><input type="file" size="" name="uAssImg" id="uAssImg" style="width:60px;height:20px;font-size:12px;font-family:Times New Roman;"></td>

<td align="center"><select name="FApproval" id="FApproval" style="width:60px;font-family:Times New Roman;font-size:12px;height:20px;"><option value="0">Select</option><option value="0">Draft</option><option value="1">Pending</option><option value="2">Approved</option></select></td>
<td align="center"><select name="SApproval" id="SApproval" style="width:60px;font-family:Times New Roman;font-size:12px;height:20px;"><option value="0">Select</option><option value="0">Draft</option><option value="1">Pending</option><option value="2">Approved</option></select></td>
<td align="center"><select name="TApproval" id="TApproval" style="width:60px;font-family:Times New Roman;font-size:12px;height:20px;"><option value="0">Select</option><option value="0">Draft</option><option value="1">Pending</option><option value="2">Paid</option></select></td>

<td align="center"><input style="width:70px;height:20px;font-size:12px;font-family:Times New Roman;text-align:center;" name="ApprovalDate" id="ApprovalDate" /><button id="ApprovalDateBtn" class="CalenderButton"></button><script type="text/javascript">var cal=Calendar.setup({ onSelect:function(cal){cal.hide()},showTime:true}); cal.manageFields("ApprovalDateBtn","ApprovalDate","%d-%m-%Y")</script></td>
</tr>
</form>
<?php } ?>
	  </table>
	 </td>
    </tr>
   <tr>
      <td class="fontButton">
	  <table border="0" width="410"><tr>
	  <td>
<input type="button" style="width:80px;" name="NewSave" id="NewSave" value="new" onClick="newsave()" <?php if($_REQUEST['action']=="newsave" OR $_REQUEST['action']=="edit"){ echo "style=display:none;"; }?>/>
<input type="button" style="width:80px;" name="Refrash" value="refresh" onClick="javascript:window.location='MyAssetedititreqEmp.php?act=true&mm=sas&ask=false&ww=rightProtect&we=12345&mm=er4e&r=t5t%t5s&yy=eloi&gosto=false&rigt=checkessue&mailto=promt&wew=e%e@er%rdd=012&page=1&ID=<?php echo $_REQUEST['ID']; ?>'"/>&nbsp;
     </td></tr></table>
	 <div id="DIVSpan" style="position:absolute;left:127px;display:none;"><span id="ECNSpan"></span></div>
	 </td>
   </tr>
			      
  </table>  
</td>
</tr>
	
              </table>
			 </td>
			</tr>		
		 </table>
	           </td>
    </tr>
</table>
	
<?php //*************************************************************************************************************************************************** ?>
		   </td>
		    <td valign="top">
		    <table align="right" border="0" style="margin-top:0px; width:10%; height:380px;">
		    <tr><td align="center" valign="top" width="100">&nbsp;</td></tr>
	        </table>
		   </td>
		    <td valign="top">
		    <table align="right" border="0" style="margin-top:0px; width:10%; height:380px;"><tr><td align="center" valign="top">&nbsp;&nbsp;</td></tr></table>
		   </td>
		  </tr>
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
