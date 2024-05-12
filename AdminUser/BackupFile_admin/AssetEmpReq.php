<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}
//**********************************
date_default_timezone_set('Asia/Kolkata');

if(isset($_POST['SaveNew']))
{ 

$sqlEC=mysql_query("select EmpCode from hrm_employee where EmployeeID=".$_POST['AEmpId'], $con); $resEC=mysql_fetch_assoc($sqlEC);
$Lenght=strlen($resEC['EmpCode']); 
if($Lenght==1){$FileN='000'.$resEC['EmpCode'];} 
elseif($Lenght==2){$FileN='00'.$resEC['EmpCode'];} 
elseif($Lenght==3){$FileN='0'.$resEC['EmpCode'];}
elseif($Lenght==4){$FileN=$resEC['EmpCode'];}

  $uploadedBill=0; $extBill=""; $uploadedAsset=0; $extAsset="";
  if((!empty($_FILES["uBill"])) && ($_FILES['uBill']['error'] == 0))
  {
   $filenameBill =strtolower(basename($_FILES['uBill']['name']));
   $fileSizeBill =$_FILES['uBill']['size'];
   $extBill = substr($filenameBill, strrpos($filenameBill, '.') + 1);
   $newfilenameBill='B'.$FileN.'_'.date("dmyHis").'.'.$extBill;
   if((($extBill == 'jpg') || ($extBill == 'jpeg') || ($extBill == 'gif') || ($extBill == 'png')))
   { $newname = dirname(__FILE__).'/../Employee/AssetReqUploadFile/'.$newfilenameBill; move_uploaded_file($_FILES['uBill']['tmp_name'],$newname); }
   else { $msgUp = "Error: Only jpg, jpeg, png or gif files is allowed"; }
   include_once("ak_php_img_lib_1.0.php");
   $target_file = "../Employee/AssetReqUploadFile/$newfilenameBill";
   $resized_file = "../Employee/AssetReqUploadFile/$newfilenameBill";
   $wmax = 500;
   $hmax = 600;
   ak_img_resize($target_file, $resized_file, $wmax, $hmax, $extBill);
  }
  if((!empty($_FILES["uAssImg"])) && ($_FILES['uAssImg']['error'] == 0))
  {
   $filenameAsset =strtolower(basename($_FILES['uAssImg']['name']));
   $fileSizeAsset =$_FILES['uAssImg']['size'];
   $extAsset = substr($filenameAsset, strrpos($filenameAsset, '.') + 1);
   $newfilenameAsset='A'.$FileN.'_'.date("dmyHis").'.'.$extAsset;
   if((($extAsset=='jpg') || ($extAsset =='jpeg') || ($extAsset=='gif') || ($extAsset=='png')))
   { $newname2= dirname(__FILE__).'/../Employee/AssetReqUploadFile/'.$newfilenameAsset; move_uploaded_file($_FILES['uAssImg']['tmp_name'],$newname2); }
   else { $msgUp = "Error: Only jpg, jpeg, png or gif files is allowed"; }
   include_once("ak_php_img_lib_1.0.php");
   $target_file = "../Employee/AssetReqUploadFile/$newfilenameAsset";
   $resized_file = "../Employee/AssetReqUploadFile/$newfilenameAsset";
   $wmax = 500;
   $hmax = 600;
   ak_img_resize($target_file, $resized_file, $wmax, $hmax, $extAsset);  
  }
  
   

 $sqlRep=mysql_query("select RepEmployeeID from hrm_employee_general where EmployeeID=".$_POST['AEmpId'], $con); $resRep=mysql_fetch_assoc($sqlRep);
 $sqlHod=mysql_query("select HodId from hrm_employee_reporting where EmployeeID=".$_POST['AEmpId'], $con); $resHod=mysql_fetch_assoc($sqlHod);
 $SqlInsert=mysql_query("INSERT INTO hrm_asset_employee_request(EmployeeID, AssetNId, ReqAmt, ApprovalAmt, ReqDate, ReportingId, HodId, ReqAssestImgExtName, ReqAssestImgExt, ReqBillImgExtName, ReqBillImgExt, ApprovalStatus, ApprovalDate, CreatedBy, CreatedDate, YearId) VALUES (".$_POST['AEmpId'].", '".$_POST['AssetNId']."', '".$_POST['ReqAmt']."', '".$_POST['ApprovalAmt']."', '".date("Y-m-d",strtotime($_POST['ReqDate']))."', '".$resRep['RepEmployeeID']."', '".$resHod['HodId']."', '".$newfilenameAsset."', '".$extAsset."', '".$newfilenameBill."', '".$extBill."', '".$_POST['ReqApproval']."', '".date("Y-m-d",strtotime($_POST['ApprovalDate']))."', ".$UserId.",'".date('Y-m-d')."',".$YearId.")", $con);
}

if(isset($_REQUEST['action']) && $_REQUEST['action']=="delete")
{ $SqlDelete=mysql_query("update hrm_asset_employee_request set Status=0, StatusCngDate='".date("Y-m-d")."' WHERE AssetEmpReqId=".$_REQUEST['did'], $con) or die(mysql_error()); }


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
<script type="text/javascript" src="js/EmpMasterAddNewAjaxCall.js"></script>
<Script type="text/javascript">window.history.forward(1);</script>
<script language="javascript">
function edit(value){ var agree=confirm("Are you sure you want to edit this record?");if(agree){ var x="AssetEmpReq.php?action=edit&eid="+value;  window.location=x;}}
function del(value){ var agree=confirm("Are you sure you want to delete this record?");if(agree){ var x="AssetEmpReq.php?action=delete&did="+value; window.location=x;}}
function newsave(){ var x = "AssetEmpReq.php?action=newsave"; window.location=x;}

function FunClickAssetReq(Aeri,ID)
{ window.open("AssetEmpAnyFieldReq.php?CheckAct=ExtraReqField&ID="+ID+"&Aeri="+Aeri,"AForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=650,height=550"); }

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

function validate(form1) 
{  var Numfilter=/^[0-9 ]+$/;  var filter=/^[a-zA-Z. /]+$/;

   var EC = document.getElementById("EC").value; var Ename = document.getElementById("EName").value;  
   if(EC.length==0 || Ename.length==0){ alert("Please check employee details.");  return false; }
   var AssetNId = document.getElementById("AssetNId").value;  
   if(AssetNId==0){ alert("Please select asset name.");  return false; }
   var ReqAmt = document.getElementById("ReqAmt").value; var testN_ReqAmt = Numfilter.test(ReqAmt);
   if(ReqAmt.length===0){ alert("You must enter a request amount.");  return false; }
   if(testN_ReqAmt==false){ alert('please enter only number in the request amount field'); return false; }
   var ApprovalAmt = document.getElementById("ApprovalAmt").value; var testN_ApprovalAmt = Numfilter.test(ApprovalAmt);
   if(ApprovalAmt.length===0){ alert("You must enter a approval amount.");  return false; }
   if(testN_ApprovalAmt==false){ alert('please enter only number in the approval amount field'); return false; }
   var ReqDate = document.getElementById("ReqDate").value;
   if(ReqDate.length===0){ alert("You must enter a asset request date.");  return false; } 
   var ReqApproval = document.getElementById("ReqApproval").value;
   if(ReqApproval==0){ alert("please select approval status.");  return false; } 
   var agree=confirm("Are you sure, you want to save asset request?");
   if(agree){return true;}else{return false;}
}

</script>
<?php /************ Check It**********/ ?>
</head>
<body class="body">
<span id="ResultECNSpan"></span>
<table class="table" border="0">
<tr><td><table class="menutable"><tr><td><?php if($_SESSION['login'] = true){require_once("AMenu.php"); } ?></td></tr></table></td></tr>
<tr><td valign="top">
      <table width="100%" style="margin-top:0px;" border="0">
	    <tr><td valign="top"><?php if($_SESSION['login'] = true){require_once("AWelcome.php"); } ?></td></tr>
	    <tr>
	        <td valign="top" align="center"  width="100%" id="MainWindow">
<?php //**********************************************START*****START*****START******START******START***************************************************************?>
  <table border="0" style="margin-top:0px; width:100%; height:300px;">
<?php if(($_SESSION['UserType']=='M' OR $_SESSION['UserType']=='S' OR $_SESSION['UserType']=='A' OR $_SESSION['UserType']=='U') AND $_SESSION['login'] = true) { ?>	
 <tr>
<?php //*********************************************************************************************************************************************************?>
<td align="left" id="Eexp" valign="top"> 
<input type="hidden" id="ComId" value="<?php echo $CompanyId; ?>" />            
<form enctype="multipart/form-data" name="formEAsst" method="post" onSubmit="return validate(this)">
<table border="0">
<tr>
 <td>
  <table>
    <tr>
 <?php /*   <td align="center" valign="top" width="80"><?php echo "<img width=80px height=100px src=\"show_images.php?id=".$EMPID."\">\n";?></td> */ ?>
	<td align="" width="200" class="heading" valign="bottom">Employee Asset Request</td><td>&nbsp;</td>
    <td class="font4" style="left" valign="bottom">&nbsp;&nbsp;&nbsp;<b><span id="msgspan"><?php echo $msg; ?></span></b></td>
    </tr>
  </table>
 </td>
</tr>
<tr> 
<td align="left" valign="top">
<table border="1" id="TEmp" style="display:block;" cellpadding="0" cellspacing="0">
<tr bgcolor="#7a6189" style="color:#FFFFFF;font-weight:bold;height:22px;font-family:Times New Roman;font-size:12px;">
  <td style="width:30px;" align="center">SNo.</td>
  <td style="width:50px;" align="center">EC</td>
  <td style="width:200px;" align="center">Name</td>
  <td style="width:80px;" align="center">Department</td>
  <td style="width:80px;" align="center">Contact No</td>
  <td style="width:100px;" align="center">Type Of Asset</td>
  <td style="width:60px;" align="center">Details</td>
  <td style="width:60px;" align="center">Request Amount</td>
  <td style="width:60px;" align="center">Approval Amount</td>
  <td style="width:80px;" align="center">Amount Expiry</td>
  <td style="width:100px;" align="center">Request Date</td>
  <td style="width:100px;" align="center">Bill Copy</td>
  <td style="width:100px;" align="center">Asset Copy</td>
  <td style="width:80px;" align="center">Approval</td>
  <td style="width:50px;" align="center">Action</td>
</tr>
<?php $sql_statement=mysql_query("select * from hrm_asset_employee_request INNER JOIN hrm_employee ON hrm_asset_employee_request.EmployeeID=hrm_employee.EmployeeID where hrm_employee.CompanyId=".$CompanyId." AND Status!=0 order by ReqDate DESC", $con);
$total_records = mysql_num_rows($sql_statement);
if(isset($_GET['page']))
$page = $_GET['page'];
else
$page = 1;
$offset = 20;
if ($page){
$from = ($page * $offset) - $offset;
}else{
$from = 0;
}
$sql=mysql_query("select * from hrm_asset_employee_request INNER JOIN hrm_employee ON hrm_asset_employee_request.EmployeeID=hrm_employee.EmployeeID where hrm_employee.CompanyId=".$CompanyId." AND Status!=0 order by ReqDate DESC LIMIT ".$from.",".$offset, $con); $sno=1; while($res=mysql_fetch_array($sql)) {
$SqlEmp = mysql_query("SELECT EmpCode,Fname,Sname,Lname,DepartmentId,MobileNo_Vnr,MobileNo from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID WHERE hrm_employee.EmployeeID=".$res['EmployeeID'], $con); $ResEmp=mysql_fetch_assoc($SqlEmp);
$Ename = $ResEmp['Fname'].'&nbsp;'.$ResEmp['Sname'].'&nbsp;'.$ResEmp['Lname']; $LEC=strlen($ResEmp['EmpCode']); 
if($LEC==1){$EC='000'.$ResEmp['EmpCode'];} if($LEC==2){$EC='00'.$ResEmp['EmpCode'];} if($LEC==3){$EC='0'.$ResEmp['EmpCode'];} if($LEC>=4){$EC=$ResEmp['EmpCode'];}
$sDept=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$ResEmp['DepartmentId'], $con); $rDept=mysql_fetch_assoc($sDept);
if($_REQUEST['page']==1){$sno=1;} elseif($_REQUEST['page']==2){$sno=21;} elseif($_REQUEST['page']==3){$sno=41;}
elseif($_REQUEST['page']==4){$sno=61;} elseif($_REQUEST['page']==5){$sno=81;} elseif($_REQUEST['page']==6){$sno=101;} 
elseif($_REQUEST['page']==7){$sno=121;} elseif($_REQUEST['page']==8){$sno=141;} elseif($_REQUEST['page']==161){$sno=81;} 
elseif($_REQUEST['page']==10){$sno=181;}elseif($_REQUEST['page']==11){$sno=201;}elseif($_REQUEST['page']==12){$sno=221;} elseif($_REQUEST['page']==13){$sno=241;}
elseif($_REQUEST['page']==14){$sno=261;}elseif($_REQUEST['page']==15){$sno=281;}elseif($_REQUEST['page']==16){$sno=301;}
?>	
<tr bgcolor="#FFFFFF">
<td align="center" style="font-size:12px; font-family:Times New Roman;"><?php echo $sno; ?></td>
<td style="font-size:12px;font-family:Times New Roman;" align="center"><?php if($res['AssetNId']!=''){ echo $EC; } else {echo '';} ?></td>
<td style="font-size:12px;font-family:Times New Roman;">&nbsp;<?php if($res['AssetNId']!=''){ echo $Ename; } else {echo '';} ?></td>
<td style="font-size:12px;font-family:Times New Roman;">&nbsp;<?php echo $rDept['DepartmentCode']; ?></td>
<td style="font-size:12px;font-family:Times New Roman;" align="center"><?php if($ResEmp['MobileNo_Vnr']>0){echo $ResEmp['MobileNo_Vnr'];}else{echo $ResEmp['MobileNo'];} ?></td>
<td style="font-size:12px;font-family:Times New Roman;">&nbsp;<?php if($res['AssetNId']!=''){ $sqlAn=mysql_query("select AssetName from hrm_asset_name where AssetNId=".$res['AssetNId']); $resAn=mysql_fetch_array($sqlAn); echo $resAn['AssetName']; } else {echo '';} ?></td>
<td style="font-size:12px;font-family:Times New Roman;" align="center"><a href="#" onClick="FunClickAssetReq(<?php echo $res['AssetEmpReqId'].','.$res['EmployeeID']; ?>)">Click</a></td>
<td align="right" style="font-size:12px; font-family:Times New Roman;"><?php echo intval($res['ReqAmt']); ?>&nbsp;</td>
<td align="right" style="font-size:12px; font-family:Times New Roman;"><?php echo intval($res['ApprovalAmt']); ?>&nbsp;</td>

<td align="center" style="font-size:12px;font-family:Times New Roman;"><?php if($res['ReqAmtExpiryDate']=='0000-00-00' OR $res['ReqAmtExpiryDate']=='1970-01-01'){echo '';} else {echo date("d-m-Y",strtotime($res['ReqAmtExpiryDate']));} ?></td>

<td align="center" style="font-size:12px;font-family:Times New Roman;"><?php if($res['ReqDate']=='0000-00-00' OR $res['ReqDate']=='1970-01-01'){echo '';} else {echo date("d-m-Y",strtotime($res['ReqDate']));} ?></td>
  
  <td style="font-family:Times New Roman;font-size:13px;" align="center"><?php if($res['ReqBillImgExtName']!=''){ ?><a href="#" onClick="javascript:window.open('MyAssetCopy.php?Img=Bill&value=<?php echo $res['ReqBillImgExtName']; ?>','ImgF','width=600,height=500')">Bill</a><?php } ?></td>
  <td style="font-family:Times New Roman;font-size:13px;" align="center"><?php if($res['ReqAssestImgExtName']!=''){ ?><a href="#" onClick="javascript:window.open('MyAssetCopy.php?Img=Asset&value=<?php echo $res['ReqAssestImgExtName']; ?>','ImgF','width=600,height=500')">Asset</a><?php } ?></td>
<td align="center" style="font-size:12px; font-family:Times New Roman;color:<?php if($res['AccPayStatus']==1){echo '#FF8C1A';}elseif($res['AccPayStatus']==2){echo '#008200';}elseif($res['AccPayStatus']==3){echo '#FF0000';} ?>;"><?php if($res['AccPayStatus']==0){echo 'Draft';}elseif($res['AccPayStatus']==1){echo 'Pending';}elseif($res['AccPayStatus']==2){echo 'Approved';}elseif($res['AccPayStatus']==3){echo 'Rejected';} ?></td>
<td align="center">
<?php if($_SESSION['User_Permission']=='Edit'){?>
<a href="#"><img src="images/delete.png" alt="Delete" border="0" onClick="del(<?php echo $res['AssetEmpReqId']; ?>)"></a>
<?php } ?>
</td>
<?php /*<a href="#"><img src="images/edit.png" border="0" alt="Edit" onClick="edit(<?php echo $res['AssetEmpReqId']; ?>)"></a>&nbsp;&nbsp;&nbsp;&nbsp; */ ?>
</tr>
<?php $sno++;} ?>
<tr><td bgcolor="#B6E9E2" colspan="10"></td></tr>
<?php if(isset($_REQUEST['action']) && $_REQUEST['action']=="newsave"){ ?>
<form name="formEdit" method="post" onSubmit="return validate(this)">
<tr bgcolor="#FFFFFF">
<td class="All_50" align="center"><?php echo $SNo; ?><input type="hidden" id="AEmpId" name="AEmpId" value="" /></td>
<td align="center"><span id="ECSpan"><input name="EC" id="EC" class="All_50" onKeyUp="Click('EC',this.value)" style="text-align:center;" readonly/></span></td>
<td align="center"><span id="ENSpan"><input name="EName" id="EName" class="All_250" onKeyUp="Click('EN',this.value)"/></span></td>
<td align="center"><input name="DeptName" id="DeptName" class="All_100" readonly/></td>
<td align="center"><input name="Contact" id="Contact" class="All_80" readonly/></td>
<td align="center"><select name="AssetNId" id="AssetNId" class="All_100"><option value="">select</option>
<?php $sqlNA=mysql_query("select * from hrm_asset_name where Status='A' order by AssetName ASC", $con); while($resNA=mysql_fetch_assoc($sqlNA)) { ?>
<option value="<?php echo $resNA['AssetNId']; ?>"><?php echo $resNA['AssetName']; ?></option><?php } ?></select></td>
<td>&nbsp;</td>
<td align="center"><input name="ReqAmt" id="ReqAmt" class="All_50" maxlength="50" style="text-align:right;"/></td>
<td align="center"><input name="ApprovalAmt" id="ApprovalAmt" class="All_50" maxlength="50" style="text-align:right;"/></td>
<td>&nbsp;</td>
<td align="center"><input name="ReqDate" id="ReqDate" class="All_70" readonly/><button id="ReqDateBtn" class="CalenderButton"></button>
<script type="text/javascript">var cal=Calendar.setup({ onSelect:function(cal){cal.hide()},showTime:true}); cal.manageFields("ReqDateBtn","ReqDate","%d-%m-%Y")</script></td>

<td align="center"><input type="file" size="" name="uBill" id="uBill" style="width:80px;"></td>
<td align="center"><input type="file" size="" name="uAssImg" id="uAssImg" style="width:82px;"></td>

<td align="center"><select name="ReqApproval" id="ReqApproval" class="All_60"><option value="0">Select</option><option value="0">Draft</option><option value="1">Pending</option><option value="2">Approved</option></select></td>
<td align="center">
<?php if($_SESSION['User_Permission']=='Edit'){?>
<input type="submit" name="SaveNew"  value="" class="SaveButton">
<?php } ?>
</td>
</tr>
</form>
<?php } ?>
	  </table>
	 </td>
    </tr>
   <tr>
      <td align="Right" class="fontButton">
	  <div id="DIVSpan" style="position:absolute;left:127px;display:none;"><span id="ECNSpan"></span></div>
	  <table border="0" width="410"><tr>
	  <td align="right">
<?php if($_SESSION['User_Permission']=='Edit'){?>
<?php /*	  
<input type="button" name="NewSave" id="NewSave" value="new" onClick="newsave()" <?php if($_REQUEST['action']=="newsave" OR $_REQUEST['action']=="edit"){ echo "style=display:none;"; }?>/>
<input type="button" name="back" id="back" style="width:90px;" value="back" onClick="javascript:window.location='Index.php?log=<?php echo $_SESSION['logCheckUser']; ?>'"/>
<input type="button" name="Refrash" value="refresh" onClick="javascript:window.location='AssetEmpReq.php?C&ID=<?php echo $_REQUEST['ID']; ?>'"/>&nbsp;
*/ ?>
<?php } ?>
     </td></tr></table></td>
   </tr>
<tr>
<td align="center" colspan="13" style="font-family:Times New Roman;font-size:15px;font-weight:bold;">
<?PHP doPages($offset, 'AssetEmpReq.php', '', $total_records); ?>
</td>
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
<?php //*********************************************************************************************************************************************************?>
</tr>
<?php } ?> 
</table>
	  </td>
	</tr>
<?php //**********************************************END*****END*****END*****END*****END***************************************************************?>	
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
function doPages($page_size, $thepage, $query_string, $total=0) {
$index_limit = 5;
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
echo '<a href="'.$thepage.'?page='.$i.$query.'&ls='.$_REQUEST['ls'].'&yly='.$_REQUEST['yly'].'&ee=we23&er=1013&rr=wew101" class="prn" rel="nofollow" title="go to page '.$i.'">&lt; Previous</a>&nbsp;';
echo '<span class="prn">...</span>&nbsp;';
}
if($start > 1) {
$i = 1;
echo '<a href="'.$thepage.'?page='.$i.$query.'&ls='.$_REQUEST['ls'].'&yly='.$_REQUEST['yly'].'&ee=we23&er=1013&rr=wew101" title="go to page '.$i.'">'.$i.'</a>&nbsp;';
}
for ($i = $start; $i <= $end && $i <= $total_pages; $i++){
if($i==$current) {
echo '<span>'.$i.'</span>&nbsp;';
} else {
echo '<a href="'.$thepage.'?page='.$i.$query.'&ls='.$_REQUEST['ls'].'&yly='.$_REQUEST['yly'].'&ee=we23&er=1013&rr=wew101" title="go to page '.$i.'">'.$i.'</a>&nbsp;';
}
}
if($total_pages > $end){
$i = $total_pages;
echo '<a href="'.$thepage.'?page='.$i.$query.'&ls='.$_REQUEST['ls'].'&yly='.$_REQUEST['yly'].'&ee=we23&er=1013&rr=wew101" title="go to page '.$i.'">'.$i.'</a>&nbsp;';
}
if($current < $total_pages) {
$i = $current+1;
echo '<span class="prn">...</span>&nbsp;';
echo '<a href="'.$thepage.'?page='.$i.$query.'&ls='.$_REQUEST['ls'].'&yly='.$_REQUEST['yly'].'&ee=we23&er=1013&rr=wew101" class="prn" rel="nofollow" title="go to page '.$i.'">Next &gt;</a>&nbsp;';
} else {
echo '<span class="prn">Next &gt;</span>&nbsp;';
}
if ($total != 0){
//prints the total result count just below the paging
echo '&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ee4545"<h4>(Total '.$total.' Records)</h></div>';
}
}
?> 



