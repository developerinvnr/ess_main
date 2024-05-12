<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}
//**********************************
$_SESSION['EEID']=$_REQUEST['ID']; $EMPID=$_SESSION['EEID'];
$SqEC=mysql_query("select EmpCode from hrm_employee where EmployeeID=".$EMPID, $con); $ReEC=mysql_fetch_assoc($SqEC);
//**********************************
if(isset($_POST['SaveNew']))
{ $SqlInseart=mysql_query("INSERT INTO hrm_asset_employee(EmployeeID, AssetNId, AssetId, AComName, ASrn, AModelName, APurDate, AAllocate, ADeAllocate, AExpiryDate, CreatedBy, CreatedDate, YearId) VALUES (".$EMPID.", '".$_POST['AssetNId']."', '".$_POST['AssetId']."', '".$_POST['AComName']."', '".$_POST['ASrn']."', '".$_POST['AModelName']."', '".date("Y-m-d",strtotime($_POST['APurDate']))."', '".date("Y-m-d",strtotime($_POST['AAllocate']))."', '".date("Y-m-d",strtotime($_POST['ADeAllocate']))."', '".date("Y-m-d",strtotime($_POST['AExpiryDate']))."', ".$UserId.",'".date('Y-m-d')."',".$YearId.")", $con);
}
if(isset($_POST['SaveEdit']))
{ $SqlUpdate = mysql_query("UPDATE hrm_asset_employee SET AssetNId='".$_POST['AssetNId']."', AssetId='".$_POST['AssetId']."', AComName='".$_POST['AComName']."', ASrn='".$_POST['ASrn']."', AModelName='".$_POST['AModelName']."', APurDate='".date("Y-m-d",strtotime($_POST['APurDate']))."', AAllocate='".date("Y-m-d",strtotime($_POST['AAllocate']))."', ADeAllocate='".date("Y-m-d",strtotime($_POST['ADeAllocate']))."', AExpiryDate='".date("Y-m-d",strtotime($_POST['AExpiryDate']))."', CreatedBy=".$UserId.", CreatedDate='".date('Y-m-d')."', YearId=".$YearId." WHERE AssetEmpId=".$_POST['AssetEmpId'], $con); }

if(isset($_REQUEST['action']) && $_REQUEST['action']=="delete")
{ $SqlDelete=mysql_query("delete from hrm_asset_employee WHERE AssetEmpId=".$_REQUEST['did']." AND EmployeeID=".$EMPID, $con) or die(mysql_error()); }

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
function edit(value) { var ID=document.getElementById("ID").value; var agree=confirm("Are you sure you want to edit this record?");
if (agree){ var x = "AssetEmp.php?action=edit&eid="+value+"&ID="+ID;  window.location=x;}}
function del(value) { var ID=document.getElementById("ID").value; var agree=confirm("Are you sure you want to delete this record?");
if (agree){ var ID=document.getElementById("ID").value; var x = "AssetEmp.php?action=delete&did="+value+"&ID="+ID;  window.location=x;}}
function newsave(){ var ID=document.getElementById("ID").value; var x = "AssetEmp.php?action=newsave&ID="+ID;  window.location=x;}

function FunClickAsset(Aei)
{ var ID=document.getElementById("ID").value; window.open("AssetEmpAnyField.php?CheckAct=ExtraField&ID="+ID+"&Aei="+Aei,"AForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=550,height=400"); 
}

</script>
<?php /************ Check It**********/ ?>
</head>
<body class="body">
<?php 
$SqlEmp = mysql_query("SELECT hrm_employee.*, hrm_employee_general.* FROM hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID WHERE hrm_employee.EmployeeID=".$EMPID, $con) or die(mysql_error());  $ResEmp=mysql_fetch_assoc($SqlEmp);
$Ename = $ResEmp['Fname'].'&nbsp;'.$ResEmp['Sname'].'&nbsp;'.$ResEmp['Lname']; $LEC=strlen($ResEmp['EmpCode']); 
 if($LEC==1){$EC='000'.$ResEmp['EmpCode'];} if($LEC==2){$EC='00'.$ResEmp['EmpCode'];} if($LEC==3){$EC='0'.$ResEmp['EmpCode'];} if($LEC>=4){$EC=$ResEmp['EmpCode'];}
?>
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
<input type="hidden" id="ID" value="<?php echo $_REQUEST['ID']; ?>" />            
 <form enctype="multipart/form-data" name="formEAsst" method="post" onSubmit="return validate(this)">
<table border="0">
<tr>
 <td>
  <table>
    <tr>
 <?php /*   <td align="center" valign="top" width="80"><?php echo "<img width=80px height=100px src=\"show_images.php?id=".$EMPID."\">\n";?></td> */ ?>
	<td align="" width="150" class="heading" valign="bottom">Employee Asset</td><td>&nbsp;</td>
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
  <td style="width:50px;" align="center">SNo.</td>
  <td style="width:100px;" align="center">Type Of Asset</td>
  <td style="width:100px;" align="center">Assest ID</td>
  <td style="width:150px;" align="center">Company</td>
  <td style="width:100px;" align="center">Model Name</td>
  <td style="width:150px;" align="center">Serial No</td>
  <td style="width:100px;" align="center">Purchase</td>
  <td style="width:100px;" align="center">Expiry</td>
  <td style="width:100px;" align="center">Allocated</td>
  <td style="width:100px;" align="center">Returned</td>
  <td style="width:100px;" align="center">Action</td>
</tr>
<?php $sql=mysql_query("select * from hrm_asset_employee where EmployeeID=".$EMPID." order by AAllocate DESC", $con); $SNo=1; while($res=mysql_fetch_array($sql)) {
if(isset($_REQUEST['action']) && $_REQUEST['action']=="edit" && $_REQUEST['eid']==$res['AssetEmpId']){ ?>
<form name="OformEdit" method="post" onSubmit="return OvalidateEdit(this)">	
<tr bgcolor="#FFFFFF">
<td align="center" style="font-size:11px; font-family:Times New Roman;"><?php echo $SNo; ?>
<input type="hidden" name="AssetEmpId" id="AssetEmpId" value="<?php echo $res['AssetEmpId']; ?>" /></td>
<td align="center"><select name="AssetNId" id="AssetNId" class="All_100">
<?php $sqlAn=mysql_query("select AssetName from hrm_asset_name where AssetNId=".$res['AssetNId']); $resAn=mysql_fetch_array($sqlAn); ?>
<option value="<?php echo $res['AssetNId']; ?>"><?php if($res['AssetNId']!=''){echo $resAn['AssetName'];} else {echo 'select';} ?></option>
<?php $sqlNA=mysql_query("select * from hrm_asset_name where Status='A' order by AssetName ASC", $con); while($resNA=mysql_fetch_assoc($sqlNA)) {?>
<option value="<?php echo $resNA['AssetNId']; ?>"><?php echo $resNA['AssetName']; ?></option><?php } ?></select></td>
<td align="center"><input name="AssetId" id="AssetId" class="All_100" value="<?php echo $res['AssetId']; ?>" maxlength="50"/></td>
<td align="center"><input name="AComName" id="AComName" class="All_150" value="<?php echo $res['AComName']; ?>" maxlength="50"/></td>
<td align="center"><input name="AModelName" id="AModelName" class="All_100" value="<?php echo $res['AModelName']; ?>" maxlength="50"/></td>
<td align="center"><input name="ASrn" id="ASrn" class="All_150" value="<?php echo $res['ASrn']; ?>" maxlength="50"/></td>
<td align="center"><input name="APurDate" id="APurDate" class="All_70" value="<?php if($res['APurDate']=='0000-00-00' OR $res['APurDate']=='1970-01-01'){echo '';} else {echo date("d-m-Y",strtotime($res['APurDate']));} ?>" readonly/><button id="APurDateBtn" class="CalenderButton"></button></td>

<td align="center"><input name="AExpiryDate" id="AExpiryDate" class="All_70" value="<?php if($res['AExpiryDate']=='0000-00-00' OR $res['AExpiryDate']=='1970-01-01'){echo '0000-00-00';} else {echo date("d-m-Y",strtotime($res['AExpiryDate']));} ?>" readonly/><button id="AExpiryDateBtn" class="CalenderButton"></button></td>	
							
<td align="center"><input name="AAllocate" id="AAllocate" class="All_70" value="<?php if($res['AAllocate']=='0000-00-00' OR $res['AAllocate']=='1970-01-01'){echo '';} else {echo date("d-m-Y",strtotime($res['AAllocate']));} ?>" readonly/><button id="AAllocateBtn" class="CalenderButton"></button></td>
<td align="center"><input name="ADeAllocate" id="ADeAllocate" class="All_70" value="<?php if($res['ADeAllocate']=='0000-00-00' OR $res['ADeAllocate']=='1970-01-01'){echo '0000-00-00';} else {echo date("d-m-Y",strtotime($res['ADeAllocate']));} ?>" readonly/>
                                   <button id="ADeAllocateBtn" class="CalenderButton"></button><script type="text/javascript">  var cal = Calendar.setup({ onSelect:  function(cal) { cal.hide()}, showTime: true }); cal.manageFields("APurDateBtn", "APurDate", "%d-%m-%Y"); cal.manageFields("AExpiryDateBtn", "AExpiryDate", "%d-%m-%Y");  cal.manageFields("AAllocateBtn", "AAllocate", "%d-%m-%Y"); cal.manageFields("ADeAllocateBtn", "ADeAllocate", "%d-%m-%Y"); </script></td>
<td align="center"><input type="submit" name="SaveEdit"  value="" class="SaveButton"><input type="hidden" name="AssetEmpId" id="AssetEmpId" value="<?php echo $_REQUEST['eid']; ?>"/></td>
</tr>
</form> 
<?php } else { ?>	
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
<td align="center"><a href="#"><img src="images/edit.png" border="0" alt="Edit" onClick="edit(<?php echo $res['AssetEmpId']; ?>)"></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#"><img src="images/delete.png" alt="Delete" border="0" onClick="del(<?php echo $res['AssetEmpId']; ?>)"></a></td>
</tr>
<?php } $SNo++;} ?>
<tr><td bgcolor="#B6E9E2" colspan="10"></td></tr>
<?php if(isset($_REQUEST['action']) && $_REQUEST['action']=="newsave"){ ?>
<form name="formEdit" method="post" onSubmit="return validateEdit(this)">
<tr bgcolor="#FFFFFF">
<td class="All_50" align="center"><?php echo $SNo; ?></td>
<td class="All_100" align="center"><select name="AssetNId" id="AssetNId" class="All_100"><option value="">select</option>
<?php $sqlNA=mysql_query("select * from hrm_asset_name where Status='A' order by AssetName ASC", $con); while($resNA=mysql_fetch_assoc($sqlNA)) {?>
<option value="<?php echo $resNA['AssetNId']; ?>"><?php echo $resNA['AssetName']; ?></option><?php } ?></select></td>
<td class="All_100" align="center"><input name="AssetId" id="AssetId" class="All_100" maxlength="50" /></td>
<td class="All_100" align="center"><input name="AComName" id="AComName" class="All_150" maxlength="50" /></td>
<td class="All_100" align="center"><input name="AModelName" id="AModelName" class="All_100" maxlength="50" /></td>
<td class="All_100" align="center"><input name="ASrn" id="ASrn" class="All_150" maxlength="50" /></td>
<td class="All_100" align="center"><input name="APurDate" id="APurDate" class="All_70" readonly/>
                                   <button id="APurDateBtn" class="CalenderButton"></button></td>
<td class="All_100" align="center"><input name="AExpiryDate" id="AExpiryDate" class="All_70" value="0000-00-00" readonly/>
                                   <button id="AExpiryDateBtn" class="CalenderButton"></button></td>								   
<td class="All_100" align="center"><input name="AAllocate" id="AAllocate" class="All_70" readonly/>
                                   <button id="AAllocateBtn" class="CalenderButton"></button></td>
<td class="All_100" align="center"><input name="ADeAllocate" id="ADeAllocate" class="All_70" value="0000-00-00" readonly/>
                                   <button id="ADeAllocateBtn" class="CalenderButton"></button><script type="text/javascript">  var cal = Calendar.setup({ onSelect:  function(cal) { cal.hide()}, showTime: true }); cal.manageFields("APurDateBtn", "APurDate", "%d-%m-%Y"); cal.manageFields("AExpiryDateBtn", "AExpiryDate", "%d-%m-%Y");  cal.manageFields("AAllocateBtn", "AAllocate", "%d-%m-%Y"); cal.manageFields("ADeAllocateBtn", "ADeAllocate", "%d-%m-%Y");</script></td>
<td align="center"><input type="submit" name="SaveNew"  value="" class="SaveButton"></td>
</tr>
</form>
<?php } ?>
	  </table>
	 </td>
    </tr>
   <tr>
      <td align="Right" class="fontButton"><table border="0" width="410"><tr><td align="right">
<input type="button" name="NewSave" id="NewSave" value="new" onClick="newsave()" <?php if($_REQUEST['action']=="newsave" OR $_REQUEST['action']=="edit"){ echo "style=display:none;"; }?>/>
<input type="button" name="back" id="back" style="width:90px;" value="back" onClick="javascript:window.location='Index.php?log=<?php echo $_SESSION['logCheckUser']; ?>'"/>
<input type="button" name="Refrash" value="refresh" onClick="javascript:window.location='AssetEmp.php?C&ID=<?php echo $_REQUEST['ID']; ?>'"/>&nbsp;
     </td></tr></table></td>
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
	<tr>
	  <td valign="top" align="center">
	    <table border="0" style="margin-top:0px;">
				<tr>
	              <td align="center"><img src="images/home1.png"></td>
				</tr>
	    </table>
	  </td>
	</tr>
<?php //**********************************************END*****END*****END*****END*****END***************************************************************?>	
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



