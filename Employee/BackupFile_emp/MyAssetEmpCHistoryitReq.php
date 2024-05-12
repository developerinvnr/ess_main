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
$SqlEmp = mysql_query("SELECT * FROM hrm_employee WHERE EmployeeID=".$EmMPID, $con);  $ResEmp=mysql_fetch_assoc($SqlEmp);
$Ename = $ResEmp['Fname'].'&nbsp;'.$ResEmp['Sname'].'&nbsp;'.$ResEmp['Lname']; $LEC=strlen($ResEmp['EmpCode']); 
 if($LEC==1){$EC='000'.$ResEmp['EmpCode'];} if($LEC==2){$EC='00'.$ResEmp['EmpCode'];} if($LEC==3){$EC='0'.$ResEmp['EmpCode'];} if($LEC>=4){$EC=$ResEmp['EmpCode'];}
?>
<table class="table" border="0">
<tr><td valign="top">
      <table width="1800" style="margin-top:0px;" border="0">
	    <tr>
	        <td valign="top" width="100%" id="MainWindow">
<?php //**********************************************START*****START*****START******START******START***************************************************************?>
  <table border="0" style="margin-top:0px;width:1800px;height:300px;">
 <tr>
<?php //*********************************************************************************************************************************************************?>
<td align="center" id="Eexp" valign="top" style="width:1800px;"> 
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
  </table>
 </td>
</tr>
<tr>
<td style="font-weight:bold;height:22px;font-family:Times New Roman;font-size:14px; color:#0080FF;" valign="bottom">REQUEST -->></td>
</tr>
<tr> 
<td align="left" valign="top">
<table border="1" id="TEmp" style="font-weight:bold;height:22px;font-family:Times New Roman;font-size:12px;" cellpadding="1" cellspacing="0">
  <tr bgcolor="#7a6189" style="height:22px;">
  <td style="color:#FFFFFF;font-family:Times New Roman;font-size:12px;width:40px;" align="center"><b>SNo.</b></td>
  <td style="color:#FFFFFF;font-family:Times New Roman;font-size:12px;width:150px;" align="center"><b>Name Of Asset</b></td>
  <td style="color:#FFFFFF;font-family:Times New Roman;font-size:12px;width:60px;" align="center"><b>Balance Amount</b></td>
  <td style="color:#FFFFFF;font-family:Times New Roman;font-size:12px;width:60px;" align="center"><b>Request Amount</b></td>
  <td style="color:#FFFFFF;font-family:Times New Roman;font-size:12px;width:80px;" align="center"><b>Request Date</b></td>
  
  <td style="color:#FFFFFF;font-family:Times New Roman;font-size:12px;width:150px;" align="center"><b>Company</b></td>
  <td style="color:#FFFFFF;font-family:Times New Roman;font-size:12px;width:150px;" align="center"><b>Model</b></td>
  <td style="color:#FFFFFF;font-family:Times New Roman;font-size:12px;width:80px;" align="center"><b>Price</b></td>
  <td style="color:#FFFFFF;font-family:Times New Roman;font-size:12px;width:150px;" align="center"><b>Deale Name</b></td>
  
  <td colspan="2" style="color:#FFFFFF;font-family:Times New Roman;font-size:12px;" align="center"><b>Copy</b></td>
  <td style="width:100px;color:#FFFFFF;font-family:Times New Roman;font-size:12px;" align="center"><b>Status</b></td>
  <td style="color:#FFFFFF;font-family:Times New Roman;font-size:12px;width:150px;" align="center"><b>Remark</b></td>
  
  </tr>		   
<?php $sql=mysql_query("select * from hrm_asset_employee_request where EmployeeID=".$EmMPID." order by ReqDate DESC", $con); $sno=1; while($res=mysql_fetch_array($sql)) { ?>

<tr bgcolor="#FFFFFF">
<td align="center" style="font-size:12px; font-family:Times New Roman;"><?php echo $sno; ?></td>
<td style="font-size:12px; font-family:Times New Roman;">&nbsp;<?php if($res['AssetNId']!=''){ $sqlAn=mysql_query("select AssetName from hrm_asset_name where AssetNId=".$res['AssetNId']); $resAn=mysql_fetch_array($sqlAn); echo $resAn['AssetName']; } else {echo '';} ?></td>

<td align="right" style="font-size:12px; font-family:Times New Roman;"><?php echo intval($res['MaxLimitAmt']); ?>&nbsp;</td>
<td align="right" style="font-size:12px; font-family:Times New Roman;"><?php echo intval($res['ReqAmt']); ?>&nbsp;</td>
<td align="center" style="font-size:12px;font-family:Times New Roman;"><?php if($res['ReqDate']=='0000-00-00' OR $res['ReqDate']=='1970-01-01'){echo '';} else {echo date("d My",strtotime($res['ReqDate']));} ?></td>  

<td style="font-size:12px; font-family:Times New Roman;"><?php echo $res['ComName']; ?></td>
<td style="font-size:12px; font-family:Times New Roman;"><?php echo $res['ModelName']; ?></td>
<td align="right" style="font-size:12px; font-family:Times New Roman;"><?php echo intval($res['Price']); ?></td>
<td style="font-size:12px; font-family:Times New Roman;"><?php echo $res['DealeName']; ?></td>

<td style="font-family:Times New Roman;font-size:13px;width:60px;" align="center"><?php if($res['ReqBillImgExtName']!=''){ ?><a href="#" onClick="javascript:window.open('MyAssetCopy.php?Img=Bill&value=<?php echo $res['ReqBillImgExtName']; ?>','ImgF','width=600,height=500')">Bill</a><?php } ?></td>
<td style="font-family:Times New Roman;font-size:13px;width:60px;" align="center"><?php if($res['ReqAssestImgExtName']!=''){ ?><a href="#" onClick="javascript:window.open('MyAssetCopy.php?Img=Asset&value=<?php echo $res['ReqAssestImgExtName']; ?>','ImgF','width=600,height=500')">Asset</a><?php } ?></td>
  
<td align="center" style="font-size:12px; font-family:Times New Roman;color:<?php if($res['ApprovalStatus']==1){echo '#FF8C1A';}elseif($res['ApprovalStatus']==2){echo '#008200';}elseif($res['ApprovalStatus']==3){echo '#FF0000';} ?>;"><?php if($res['ApprovalStatus']==0){echo 'Draft';}elseif($res['ApprovalStatus']==1){echo 'Pending';}elseif($res['ApprovalStatus']==2){echo 'Approved';}elseif($res['ApprovalStatus']==3){echo 'Rejected';} ?></td>
<td tyle="font-size:12px; font-family:Times New Roman;"><?php echo $res['AnyOtherRemark']; ?></td>
</tr>  
<?php $sno++; } ?>

	  </table>
	 </td>
    </tr>
<tr><td>&nbsp;</td></tr>	
<tr>
<td style="font-weight:bold;height:22px;font-family:Times New Roman;font-size:14px; color:#0080FF;" valign="bottom">ASSET LIST -->></td>
</tr>	
<tr> 
<td align="left" valign="top">
<table border="1" id="TEmp" style="font-weight:bold;height:22px;font-family:Times New Roman;font-size:12px;" cellpadding="1" cellspacing="0">
<tr bgcolor="#7a6189" style="color:#FFFFFF;font-weight:bold;height:22px;font-family:Times New Roman;font-size:12px;">
  <td style="width:50px;" align="center">SNo.</td>
  <td style="width:180px;" align="center">Type Of Asset</td>
  <td style="width:100px;" align="center">Assest ID</td>
  <td style="width:150px;" align="center">Company</td>
  <td style="width:100px;" align="center">Model Name</td>
  <td style="width:150px;" align="center">Serial No</td>
  <td style="width:100px;" align="center">Purchase</td>
  <td style="width:100px;" align="center">Expiry</td>
  <td style="width:100px;" align="center">Allocated</td>
  <td style="width:100px;" align="center">Returned</td>
  <td style="width:60px;" align="center">Price</td>
  <td style="width:100px;" align="center">Model No</td>
  <td style="width:100px;" align="center">EMI No</td>
  <td style="width:150px;" align="center">Processor</td>
  <td style="width:60px;" align="center">HDD</td>
  <td style="width:60px;" align="center">RAM</td>
  <td style="width:60px;" align="center">OS</td>
  <td style="width:80px;" align="center">Bill No</td>
  <td style="width:150px;" align="center">Dealer</td>
  <td style="width:80px;" align="center">Contact</td>
  <td style="width:100px;" align="center">LaptopBag</td>
  <td style="width:200px;" align="center">Remark</td>
</tr>
<?php $sql=mysql_query("select * from hrm_asset_employee where EmployeeID=".$EmMPID." order by AAllocate DESC", $con); $SNo=1; while($res=mysql_fetch_array($sql)) { ?>
	
<tr bgcolor="#FFFFFF">
<td align="center" style="font-size:12px; font-family:Times New Roman;"><?php echo $SNo; ?></td>
<td style="font-size:12px; font-family:Times New Roman;"><a href="#" onClick="FunClickAsset(<?php echo $res['AssetEmpId']; ?>)"><?php if($res['AssetNId']!=''){ $sqlAn=mysql_query("select AssetName from hrm_asset_name where AssetNId=".$res['AssetNId']); $resAn=mysql_fetch_array($sqlAn); echo $resAn['AssetName']; } else {echo '';} ?></a></td>
<td style="font-size:12px;font-family:Times New Roman;"><?php echo $res['AssetId']; ?></td>
<td style="font-size:12px;font-family:Times New Roman;"><?php echo $res['AComName']; ?></td>
<td style="font-size:12px;font-family:Times New Roman;"><?php echo $res['AModelName']; ?></td>
<td style="font-size:12px;font-family:Times New Roman;"><?php echo $res['ASrn']; ?></td>
<td align="center" style="font-size:12px; font-family:Times New Roman;"><?php if($res['APurDate']=='0000-00-00' OR $res['APurDate']=='1970-01-01'){echo '';} else {echo date("d-m-Y",strtotime($res['APurDate']));} ?></td>
<td align="center" style="font-size:12px;font-family:Times New Roman;"><?php if($res['AExpiryDate']=='0000-00-00' OR $res['AExpiryDate']=='1970-01-01'){echo '';} else {echo date("d-m-Y",strtotime($res['AExpiryDate']));} ?></td>
<td align="center" style="font-size:12px; font-family:Times New Roman;"><?php if($res['AAllocate']=='0000-00-00' OR $res['AAllocate']=='1970-01-01'){echo '';} else {echo date("d-m-Y",strtotime($res['AAllocate']));} ?></td>
<td align="center" style="font-size:12px; font-family:Times New Roman;"><?php if($res['ADeAllocate']=='0000-00-00' OR $res['ADeAllocate']=='1970-01-01'){echo '';} else {echo date("d-m-Y",strtotime($res['ADeAllocate']));} ?></td>


<td style="font-size:12px;font-family:Times New Roman;"><?php echo $res['APrice']; ?></td>
<td style="font-size:12px;font-family:Times New Roman;"><?php echo $res['AModelNo']; ?></td>
<td style="font-size:12px;font-family:Times New Roman;"><?php echo $res['AEmiNo']; ?></td>
<td style="font-size:12px;font-family:Times New Roman;"><?php echo $res['AProcessor']; ?></td>
<td style="font-size:12px;font-family:Times New Roman;"><?php echo $res['AHDD']; ?></td>
<td style="font-size:12px;font-family:Times New Roman;"><?php echo $res['ARAM']; ?></td>
<td style="font-size:12px;font-family:Times New Roman;"><?php echo $res['AOS']; ?></td>
<td style="font-size:12px;font-family:Times New Roman;"><?php echo $res['ABillNo']; ?></td>
<td style="font-size:12px;font-family:Times New Roman;"><?php echo $res['ADealeName']; ?></td>
<td style="font-size:12px;font-family:Times New Roman;"><?php echo $res['ADealerContNo']; ?></td>
<td style="font-size:12px;font-family:Times New Roman;"><?php echo $res['ALaptopBag']; ?></td>
<td style="font-size:12px;font-family:Times New Roman;"><?php echo $res['AnyOtherRemark']; ?></td>

</tr>
<?php $SNo++;} ?>


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



