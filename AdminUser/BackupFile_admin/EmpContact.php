<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}
//**********************************
$_SESSION['EmpID']=$_REQUEST['ID'];
$EMPID=$_SESSION['EmpID'];
//**********************************
if(isset($_POST['EditContactE']))
{ 
  if($_POST['RefPerName']==''){$_POST['RefPerName']='"';}   if($_POST['RefPerContactNo']==''){$_POST['RefPerContactNo']=0;}   if($_POST['RefPerDesig']==''){$_POST['RefPerDesig']='&nbsp;';}   if($_POST['RefPerEmailId']==''){$_POST['RefPerEmailId']='"';}   if($_POST['RefPerRelation']==''){$_POST['RefPerRelation']='"';}   if($_POST['RefPerCompany']==''){$_POST['RefPerCompany']='"';}   if($_POST['RefPerAddress']==''){$_POST['RefPerAddress']='"';}   if($_POST['RefProName']==''){$_POST['RefProName']='"';}   if($_POST['RefProContactNo']==''){$_POST['RefProContactNo']=0;}   if($_POST['RefProDesig']==''){$_POST['RefProDesig']='"';}   if($_POST['RefProEmailId']==''){$_POST['RefProEmailId']='"';}   if($_POST['RefProRelation']==''){$_POST['RefProRelation']='"';}   if($_POST['RefProCompany']==''){$_POST['RefProCompany']='"';}   if($_POST['RefProAddress']==''){$_POST['RefProAddress']='"';}
  if($_POST['EmgContactNo']==''){$_POST['EmgContactNo']=0;}

    $SqlInsCont = mysql_query("UPDATE hrm_employee_contact SET Curradd='".addslashes($_POST['CurrentAdd'])."', CurrAdd_State=".addslashes($_POST['EmpCurrAddState']).", CurrAdd_City=".addslashes($_POST['EmpCurrAddCity']).", CurrAdd_PinNo=".$_POST['EmpCurrAddCode'].", ParAdd='".addslashes($_POST['PermanentAdd'])."',ParAdd_State=".addslashes($_POST['EmpPerAddState']).", ParAdd_City=".addslashes($_POST['EmpPerAddCity']).", ParAdd_PinNo=".$_POST['EmpPerAddCode'].", EmgContactNo=".$_POST['EmgContactNo'].", EmgRelation='".$_POST['EmgRelation']."', EmgName='".$_POST['EmgName']."', EmgAdd='".addslashes($_POST['EmgAddress'])."', EmgEmailId='".$_POST['EmgEmailID']."', Personal_RefName='".$_POST['RefPerName']."', Personal_RefContactNo=".$_POST['RefPerContactNo'].", Personal_RefDesig='".$_POST['RefPerDesig']."', Personal_RefEmailId='".$_POST['RefPerEmailId']."', Personal_RefRelation='".$_POST['RefPerRelation']."', Personal_RefCompany='".$_POST['RefPerCompany']."', Personal_RefAdd='".addslashes($_POST['RefPerAddress'])."', Prof_RefName='".$_POST['RefProName']."', Prof_RefContactNo=".$_POST['RefProContactNo'].", Prof_RefDesig='".$_POST['RefProDesig']."', Prof_RefEmailId='".$_POST['RefProEmailId']."', Prof_RefRelation='".$_POST['RefProRelation']."', Prof_RefCompany='".$_POST['RefProCompany']."', Prof_RefAdd='".addslashes($_POST['RefProAddress'])."',CreatedBy=".$UserId.",CreatedDate='".date('Y-m-d')."',YearId=".$YearId." WHERE EmployeeID=".$EMPID); 
   if($SqlInsCont){ $msg = "Contact data has been Updated successfully..."; }
}

if($_POST['ContUpdateSubmit'])
{
$sqlUp=mysql_query("update hrm_employee_contact set EmgContactNo=".$_POST['Cont1'].", EmgRelation='".$_POST['PRel1']."', EmgName='".$_POST['PName1']."', EmgAdd='".addslashes($_POST['PLoc2'])."' where EmployeeID=".$EMPID, $con);
}

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
<script type="text/javascript" src="src/js/jscal2.js"></script>
<script type="text/javascript" src="src/js/lang/en.js"></script>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<script type="text/javascript" src="js/EmpMasterAddNewAjaxCall.js"></script>
<Script type="text/javascript">window.history.forward(1);</script>
<script language="javascript">
function EditContact()
{document.getElementById("EditContactE").style.display = 'block'; document.getElementById("ChangeContact").style.display = 'none';
 document.getElementById("CurrentAdd").readOnly = false; document.getElementById("EmpCurrAddState").disabled = false; document.getElementById("EmpCurrAddCode").readOnly = false; document.getElementById("PermanentAdd").readOnly = false; document.getElementById("EmpPerAddState").disabled = false; document.getElementById("EmpPerAddCode").readOnly = false; document.getElementById("EmgContactNo").readOnly = false; document.getElementById("EmgEmailID").readOnly = false; document.getElementById("EmgName").readOnly = false; document.getElementById("EmgRelation").disabled = false; document.getElementById("EmgAddress").readOnly = false; document.getElementById("RefPerContactNo").readOnly = false; document.getElementById("RefPerEmailId").readOnly = false; document.getElementById("RefPerName").readOnly = false; document.getElementById("RefPerRelation").disabled = false; document.getElementById("RefPerDesig").readOnly = false; document.getElementById("RefPerCompany").readOnly = false; document.getElementById("RefPerAddress").readOnly = false; document.getElementById("RefProContactNo").readOnly = false; document.getElementById("RefProEmailId").readOnly = false; document.getElementById("RefProName").readOnly = false; document.getElementById("RefProRelation").readOnly = false; document.getElementById("RefProDesig").readOnly = false; document.getElementById("RefProCompany").readOnly = false; document.getElementById("RefProAddress").readOnly = false; document.getElementById("CC1").disabled = false; document.getElementById("CC2").disabled = false;
} 
function RefCont()
{
document.getElementById("CurrentAdd").value=''; document.getElementById("EmpCurrAddCode").value=''; document.getElementById("PermanentAdd").value=''; document.getElementById("EmpPerAddCode").value=''; document.getElementById("EmgContactNo").value=''; document.getElementById("EmgEmailID").value=''; document.getElementById("EmgName").value=''; document.getElementById("EmgRelation").value=''; document.getElementById("EmgAddress").value=''; document.getElementById("RefPerContactNo").value=''; document.getElementById("RefPerEmailId").value=''; document.getElementById("RefPerName").value=''; document.getElementById("RefPerRelation").value=''; document.getElementById("RefPerDesig").value=''; document.getElementById("RefPerCompany").value='';document.getElementById("RefPerAddress").value=''; document.getElementById("RefProContactNo").value=''; document.getElementById("RefProEmailId").value=''; document.getElementById("RefProName").value=''; document.getElementById("RefProRelation").value=''; document.getElementById("RefProDesig").value=''; document.getElementById("RefProCompany").value=''; document.getElementById("RefProAddress").value=''; 
}

function validate(formEcontact) 
{ 
   var CurrentAdd = formEcontact.CurrentAdd.value;  
  //if (CurrentAdd.length === 0) { alert("please enter current address.");  return false; }
  
  var EmpCurrAddState = formEcontact.EmpCurrAddState.value;  
  if(CurrentAdd!=''){ if (EmpCurrAddState==0) { alert("please select current state.");  return false; } }

  var EmpCurrAddCode = formEcontact.EmpCurrAddCode.value;  
  //var Numfilter=/^[0-9 ]+$/;  var test_num2 = Numfilter.test(EmpCurrAddCode)
  //if (EmpCurrAddCode.length === 0) { alert("please enter current address pin no Field.");  return false; }
  //if(test_num2==false) { alert('Please Enter Only Number in the current address pin no Field'); return false; }	
  //if (EmpCurrAddCode.length<6 || EmpCurrAddCode.length>6)  { alert("Please enter a right formate of current address pin no.");  return false; }
  
   var PermanentAdd = formEcontact.PermanentAdd.value;  
  //if (PermanentAdd.length === 0) { alert("please enter Permanent address.");  return false; }
  
   var EmpPerAddState = formEcontact.EmpPerAddState.value;  
   if(PermanentAdd!=''){if (EmpPerAddState==0) { alert("please select parmanent state.");  return false; } }
  
   var EmpPerAddCode = formEcontact.EmpPerAddCode.value;  
  //var Numfilter=/^[0-9 ]+$/;  var test_num3 = Numfilter.test(EmpCurrAddCode)
  //if (EmpPerAddCode.length === 0) { alert("please enter parmanent address pin no Field.");  return false; }
  //if(test_num3==false) { alert('Please Enter Only Number in the parmanent address pin no Field'); return false; }	
  //if (EmpPerAddCode.length<6 || EmpPerAddCode.length>6)  { alert("Please enter a right formate of parmanent address pin no.");  return false; }
 
   var EmgContactNo = formEcontact.EmgContactNo.value;  
   var Numfilter=/^[0-9 ]+$/;  var test_num4 = Numfilter.test(EmgContactNo)
  //if (EmgContactNo.length === 0) { alert("please enter Emg. contact no. Field.");  return false; }
  //if(test_num4==false) { alert('Please Enter Only Number in the Emg. contact no. Field'); return false; }	
  //if (EmgContactNo.length<6 || EmgContactNo.length>15)  { alert("Please enter a right formate of Emg. contact no.");  return false; } 
  
  var EmgEmailID = formEcontact.EmgEmailID.value;
  if(EmgEmailID!=''){  var EmailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
  var EmailCheck = EmailPattern.test(EmgEmailID);
  if(!(EmailCheck)) { alert("You haven't entered in an valid email address!");   return false; } }
  
  var EmgName = formEcontact.EmgName.value;  var filter=/^[a-zA-Z. /]+$/; var test_bool = filter.test(EmgName);
  //if(EmgContactNo!='' || EmgEmailID!=''){ 
  //if (EmgName.length === 0) { alert("You must enter a Emg. Contact Name.");  return false; }
  //if(test_bool==false) { alert('Please Enter Only Alphabets in the Emg. Contact Name Field');  return false; } }

  var EmgRelation = formEcontact.EmgRelation.value;
  //if(EmgRelation!=''){  var filter=/^[a-zA-Z. /]+$/; var test_bool = filter.test(EmgRelation);
  //if(test_bool==false) { alert('Please Enter Only Alphabets in the Emg. contact Relation Field');  return false; } }
  
  //var EmgAddress = formEcontact.EmgAddress.value;  
  //if (EmgAddress.length === 0) { alert("please enter Emg. contact address.");  return false; }

  var RefPerContactNo = formEcontact.RefPerContactNo.value;  
  if(RefPerContactNo!='') {var Numfilter=/^[0-9 ]+$/;  var test_num4 = Numfilter.test(RefPerContactNo)
  if(test_num4==false) { alert('Please Enter Only Number in the Referance contact no. Field'); return false; }	
  if (RefPerContactNo.length<6 ||RefPerContactNo.length>15)  { alert("Please enter a right formate of Referance contact no.");  return false; } } 
  
  var RefPerEmailId = formEcontact.RefPerEmailId.value;
  if(RefPerEmailId!=''){  var EmailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
  var EmailCheck = EmailPattern.test(RefPerEmailId);
  if(!(EmailCheck)) { alert("You haven't entered in an valid Referance email address!");   return false; } }
  
  var RefPerName = formEcontact.RefPerName.value; var filter=/^[a-zA-Z. /]+$/; var test_bool = filter.test(RefPerName);
  //if(RefPerContactNo!='' || RefPerEmailId!='') { 
  //if(RefPerName.length === 0){ alert("You must enter a Personal Refrence Name.");  return false; }
  //if(test_bool==false) { alert('Please Enter Only Alphabets in the Referance Contact Name Field');  return false; } }

  var RefPerRelation = formEcontact.RefPerRelation.value;
  //if(RefPerRelation!=''){  var filter=/^[a-zA-Z. /]+$/; var test_bool = filter.test(RefPerRelation);
  //if(test_bool==false) { alert('Please Enter Only Alphabets in the Referance contact Relation Field');  return false; } }
 
  var RefPerDesig = formEcontact.RefPerDesig.value;
  //if(RefPerDesig!=''){  var filter=/^[a-zA-Z. /]+$/; var test_bool = filter.test(RefPerDesig);
  //if(test_bool==false) { alert('Please Enter Only Alphabets in the Referance designation Field');  return false; } }

  var RefPerCompany = formEcontact.RefPerCompany.value;
  //if(RefPerCompany!=''){  var filter=/^[a-zA-Z. /]+$/; var test_bool = filter.test(RefPerCompany);
  //if(test_bool==false) { alert('Please Enter Only Alphabets in the Referance company Field');  return false; } }
  
  var RefProContactNo = formEcontact.RefProContactNo.value;  
  if(RefProContactNo!='') {var Numfilter=/^[0-9 ]+$/;  var test_num4 = Numfilter.test(RefProContactNo)
  if(test_num4==false) { alert('Please Enter Only Number in the Referance professional contact no. Field'); return false; }	
  if (RefProContactNo.length<6 ||RefProContactNo.length>15)  { alert("Please enter a right formate of Referance professional contact no.");  return false; } }
  
  var RefProEmailId = formEcontact.RefProEmailId.value;
  if(RefProEmailId!=''){  var EmailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
  var EmailCheck = EmailPattern.test(RefProEmailId);
  if(!(EmailCheck)) { alert("You haven't entered in an valid Referance professional email address!");   return false; } }
  
  var RefProName = formEcontact.RefProName.value;  var filter=/^[a-zA-Z. /]+$/; var test_bool = filter.test(RefProName);
  //if(RefProContactNo!='' || RefProEmailId!='') {
  //if(RefProName.length === 0){ alert("You must enter a Professional Refrence Name.");  return false; }
  //if(test_bool==false) { alert('Please Enter Only Alphabets in the Referance professional Contact Name Field');  return false; } }

  var RefProRelation = formEcontact.RefProRelation.value;
  //if(RefProRelation!=''){  var filter=/^[a-zA-Z. /]+$/; var test_bool = filter.test(RefProRelation);
  //if(test_bool==false) { alert('Please Enter Only Alphabets in the Referance professional contact Relation Field');  return false; } }
 
  var RefProDesig = formEcontact.RefProDesig.value;
  //if(RefProDesig!=''){  var filter=/^[a-zA-Z. /]+$/; var test_bool = filter.test(RefProDesig);
  //if(test_bool==false) { alert('Please Enter Only Alphabets in the Referance professional designation Field');  return false; } }

  var RefProCompany = formEcontact.RefProCompany.value;
  //if(RefProCompany!=''){  var filter=/^[a-zA-Z. /]+$/; var test_bool = filter.test(RefProCompany);
  //if(test_bool==false) { alert('Please Enter Only Alphabets in the Referance professional company Field');  return false; } }

}

function toUpper(txt)
{ document.getElementById(txt).value=document.getElementById(txt).value.toUpperCase(); return true; }

</script>
</head>
<body class="body">
<?php 
$SqlEmp = mysql_query("SELECT *,hrm_employee_general.*,hrm_employee_contact.* FROM hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_contact ON hrm_employee.EmployeeID=hrm_employee_contact.EmployeeID WHERE hrm_employee.EmployeeID=".$EMPID, $con) or die(mysql_error());  $ResEmp=mysql_fetch_assoc($SqlEmp);
$Ename = $ResEmp['Fname'].'&nbsp;'.$ResEmp['Sname'].'&nbsp;'.$ResEmp['Lname']; $LEC=strlen($ResEmp['EmpCode']); 
      if($LEC==1){$EC='000'.$ResEmp['EmpCode'];} if($LEC==2){$EC='00'.$ResEmp['EmpCode'];} if($LEC==3){$EC='0'.$ResEmp['EmpCode'];} if($LEC>=4){$EC=$ResEmp['EmpCode'];}
?>
<table class="table">
<tr><td><table class="menutable"><tr><td><?php if($_SESSION['login'] = true){require_once("AMenu.php"); } ?></td></tr></table></td></tr>
<tr><td valign="top">
      <table width="100%" style="margin-top:0px;" border="0">
	    <tr><td valign="top"><?php if($_SESSION['login'] = true){require_once("AWelcome.php"); } ?></td></tr>
	    <tr>
	        <td valign="top" align="center"  width="100%" id="MainWindow"><br>
<?php //**********************************************START*****START*****START******START******START***************************************************************?>
  <table border="0" style="margin-top:0px; width:100%; height:300px;">
 <tr>
  <td align="left" height="20" valign="top" colspan="4">
   <table border="0">
    <tr>
	  <td align="right" width="250" class="heading">Contact</td>
	  <td>&nbsp;&nbsp;&nbsp;</td>
	  <td style="font-family:Times New Roman; font-size:16px; color:#287126; font-weight:bold;"><font color="#FF0000" size="4">*</font>  - Require Field</td>
	   <td><table><tr><td class="font4" style="left">&nbsp;&nbsp;&nbsp;<b><span id="msgspan">
	   <?php echo $msg; ?></span></b></td></tr></table></td>
	</tr>
   </table>
  </td>
 </tr>
<?php if(($_SESSION['UserType']=='M' OR $_SESSION['UserType']=='S' OR $_SESSION['UserType']=='A' OR $_SESSION['UserType']=='U') AND $_SESSION['login'] = true) { ?>	
 <tr>
 <td style="width:100px;" align="center" valign="top"><?php if($_REQUEST['Event']=='Edit') { include("EmpMasterMenu.php"); } ?></td>
 
<td style="width:50px;" align="center" valign="top"></td>
<?php //*********************************************************************************************************************************************************?>
<?php if($_REQUEST['Event']=='Edit') { ?>
 <td align="left" id="Econtact" valign="top">             
<form enctype="multipart/form-data" name="formEcontact" method="post" onSubmit="return validate(this)">
<table border="0">
<tr>
 <td>
  <table><tr>
 <td class="All_100">&nbsp;&nbsp;&nbsp;&nbsp;EmpCode :</td><td class="All_60"><input name="EmpCode" id="EmpCode" class="All_50" style="background-color:#E6EBC5;" value="<?php echo $EC; ?>" Readonly></td>
 <td class="All_50">Name :</td><td class="All_220"><input name="EmpName" id="EmpName" style="width:210px; height:18px; font-size:11px;background-color:#E6EBC5;text-transform:uppercase;" value="<?php echo $Ename; ?>" Readonly></td>
  </tr></table>
 </td>
</tr>
<tr> 
<td align="left" valign="top">
<table border="0" width="850" id="TEmp" style="display:block;">
<tr>
<td colspan="6" class="All">
<fieldset align="center"><legend><b>Address</b>&nbsp;</legend>
<table border="0">
 <tr>
  <td class="All_150">Current:</td><td style="width:250px;">
  <input name="CurrentAdd" id="CurrentAdd" value="<?php echo $ResEmp['CurrAdd']; ?>" style="width:250px; height:18px; font-size:11px;text-transform:uppercase;" readonly></td>
  <td class="All_80" align="right">State:&nbsp;</td><td style="width:120px;">
  <select class="All_120" id="EmpCurrAddState" name="EmpCurrAddState" onChange="CurrentState(this.value)" disabled>
<?php $sqlSt=mysql_query("select StateName from hrm_state where StateId=".$ResEmp['CurrAdd_State'], $con); $ResSt=mysql_fetch_array($sqlSt);?>  
  <option value="<?php echo $ResEmp['CurrAdd_State']; ?>"><?php echo $ResSt['StateName']; ?></option>
<?php $sqlS=mysql_query("select StateId,StateName from hrm_state order by StateName ASC", $con); while($ResS=mysql_fetch_array($sqlS)) {?>
  <option value="<?php echo $ResS['StateId']; ?>"><?php echo $ResS['StateName']; ?></option><?php } ?></select></td>
  <td class="All_80" align="right">City:&nbsp;</td><td style="width:120px;">
<?php $sqlSt=mysql_query("select CityName from hrm_city where CityId=".$ResEmp['CurrAdd_City'], $con); $ResSt=mysql_fetch_array($sqlSt);?>
  <span id="EmpCACitySpan">
  <select id="CC1" style="text-transform:uppercase;" class="All_120" disabled><option><?php echo $ResSt['CityName']; ?></option></select>
  <input type="hidden" id="EmpCurrAddCity" name="EmpCurrAddCity" value="<?php echo $ResEmp['CurrAdd_City']; ?>" /> </span></td>
  <td class="All_80" align="right">Pin:&nbsp;</td><td style="width:70px;"><input name="EmpCurrAddCode" id="EmpCurrAddCode" value="<?php echo $ResEmp['CurrAdd_PinNo']; ?>" maxlength="6" class="All_60" readonly></td>
</tr>
<tr>
  <td class="All_150">Permanent:</td><td style="width:250px;">
  <input name="PermanentAdd" id="PermanentAdd" value="<?php echo $ResEmp['ParAdd']; ?>" class="All_250"  style="text-transform:uppercase;" readonly></td>
  <td class="All_80" align="right">State:&nbsp;</td><td style="width:120px;">
  <select class="All_120" id="EmpPerAddState" name="EmpPerAddState" onChange="PermanentState(this.value)" disabled>
  <?php $sqlSt=mysql_query("select StateName from hrm_state where StateId=".$ResEmp['ParAdd_State'], $con); $ResSt=mysql_fetch_array($sqlSt);?>  
  <option value="<?php echo $ResEmp['ParAdd_State']; ?>"><?php echo $ResSt['StateName']; ?></option>
  <?php $sqlS1=mysql_query("select StateId,StateName from hrm_state order by StateName ASC", $con); while($ResS1=mysql_fetch_array($sqlS1)) {?>
  <option value="<?php echo $ResS1['StateId']; ?>"><?php echo $ResS1['StateName']; ?></option><?php } ?></select></td>
  <td class="All_80" align="right">City:&nbsp;</td><td style="width:120px;">
 <?php $sqlSt=mysql_query("select CityName from hrm_city where CityId=".$ResEmp['ParAdd_City'], $con); $ResPSt=mysql_fetch_array($sqlSt);?>
  <span id="EmpPACitySpan">
  <select id="CC2" style="text-transform:uppercase;" class="All_120" disabled><option><?php echo $ResPSt['CityName']; ?></option></select>
  <input type="hidden" id="EmpPerAddCity" name="EmpPerAddCity" value="<?php echo $ResEmp['ParAdd_City']; ?>"></span></td>
  <td class="All_80" align="right">Pin:&nbsp;</td><td style="width:70px;"><input name="EmpPerAddCode" id="EmpPerAddCode" class="All_60" maxlength="6" value="<?php echo $ResEmp['ParAdd_PinNo']; ?>" readonly></td>
</tr>
</table>
</fieldset>
</td>
</tr>
<tr>
 <td colspan="6" class="All">
<fieldset align="center"><legend><b>Emergency</b>&nbsp;</legend>
<table border="0">
 <tr>
   <td style="width:76px; height:18px; font-size:11px;">Contact:</td><td style="width:120px;">
   <input class="All_120" name="EmgContactNo" id="EmgContactNo" value="<?php if($ResEmp['EmgContactNo']==0){echo '';} else { echo $ResEmp['EmgContactNo']; }?>" maxlength="15" readonly></td>
   <td class="All_60" align="right">EmailId:&nbsp;</td><td style="width:150px;">
   <input class="All_150" name="EmgEmailID" id="EmgEmailID" value="<?php echo $ResEmp['EmgEmailId']; ?>" maxlength="50" readonly></td>
   <td class="All_60" align="right">Name:&nbsp;</td><td style="width:150px;">
   <input class="All_150" name="EmgName" id="EmgName" value="<?php echo $ResEmp['EmgName']; ?>" style="text-transform:uppercase;" readonly></td>
   <td class="All_80" align="right">Relation:&nbsp;</td><td style="width:110px;">
   <select style="text-transform:uppercase;" name="EmgRelation" id="EmgRelation" class="All_100" disabled>
<?php if($ResEmp['EmgRelation']=='' OR $ResEmp['EmgRelation']=='"') { ?><option value="">Select</option><?php } ?>
<?php if($ResEmp['EmgRelation']!='' AND $ResEmp['EmgRelation']!='"') { ?><option value="<?php echo $ResEmp['EmgRelation']; ?>"><?php echo $ResEmp['EmgRelation']; ?></option><?php } ?>
   <option value="FATHER">&nbsp;FATHER</option><option value="MOTHER">&nbsp;MOTHER</option><option value="HUSBAND">&nbsp;HUSBAND</option><option value="WIFE">&nbsp;WIFE</option>
   <option value="BROTHER">&nbsp;BROTHER</option><option value="SISTER">&nbsp;SISTER</option>
   </select>
   <input type="hidden" style="width:320px; height:18px; font-size:11px;" name="EmgAddress" id="EmgAddress" value="<?php echo $ResEmp['EmgAdd']; ?>" readonly></td>
 </tr>
</table>
</fieldset>
 </td>
</tr>
<tr>
 <td colspan="6" class="All">
<fieldset align="center"><legend><b>Referance:- Personal</b>&nbsp;</legend>
<table border="0">
 <tr>
   <td style="width:76px; height:18px; font-size:11px;">Contact:</td><td style="width:120px;">
   <input class="All_120" name="RefPerContactNo" id="RefPerContactNo" maxlength="15" value="<?php if($ResEmp['Personal_RefContactNo']==0){ echo '';} else { echo $ResEmp['Personal_RefContactNo'];} ?>" readonly></td>
   <td class="All_60" align="right">EmailId:&nbsp;</td><td style="width:150px;">
   <input class="All_150" name="RefPerEmailId" id="RefPerEmailId" maxlength="50" value="<?php echo $ResEmp['Personal_RefEmailId']; ?>" readonly></td>
   <td class="All_60" align="right">Name:&nbsp;</td><td style="width:150px;">
   <input class="All_150" name="RefPerName" id="RefPerName" value="<?php echo $ResEmp['Personal_RefName']; ?>" style="text-transform:uppercase;" readonly></td>
   <td class="All_80" align="right">Relation:&nbsp;</td><td style="width:110px;">
   <select style="text-transform:uppercase;" name="RefPerRelation" id="RefPerRelation" class="All_100" disabled>
   <?php if($ResEmp['Personal_RefRelation']=='' OR $ResEmp['Personal_RefRelation']=='"') { ?><option value="">Select</option><?php } ?>
   <?php if($ResEmp['Personal_RefRelation']!='' AND $ResEmp['Personal_RefRelation']!='"') { ?><option value="<?php echo $ResEmp['Personal_RefRelation']; ?>"><?php echo $ResEmp['Personal_RefRelation']; ?></option><?php } ?>
   <option value="FATHER">&nbsp;FATHER</option><option value="MOTHER">&nbsp;MOTHER</option><option value="HUSBAND">&nbsp;HUSBAND</option><option value="WIFE">&nbsp;WIFE</option>
   <option value="BROTHER">&nbsp;BROTHER</option><option value="SISTER">&nbsp;SISTER</option><option value="FRIEND">&nbsp;FRIEND</option><option value="OTHER">&nbsp;OTHER</option>
   </select>
   <input type="hidden" class="All_120" name="RefPerDesig" id="RefPerDesig" value="<?php echo $ResEmp['Personal_RefDesig']; ?>" style="text-transform:uppercase;" readonly>
   <input type="hidden" class="All_150" name="RefPerCompany" id="RefPerCompany" value="<?php echo $ResEmp['Personal_RefCompany']; ?>" readonly>
   <input type="hidden" style="width:375px; height:18px; font-size:11px;" name="RefPerAddress" id="RefPerAddress" value="<?php echo $ResEmp['Personal_RefAdd']; ?>" readonly>
   </td>
 </tr>
</table>
</fieldset>
 </td>
</tr>
<tr>
 <td colspan="6" class="All">
<fieldset align="center"><legend><b>Referance:- Professional</b>&nbsp;</legend>
<table border="0">
 <tr>
   <td style="width:80px; height:18px; font-size:11px;">Contact:</td><td style="width:120px;">
    <input class="All_120" name="RefProContactNo" id="RefProContactNo" maxlength="15" value="<?php if($ResEmp['Prof_RefContactNo']==0){echo '';} else { echo $ResEmp['Prof_RefContactNo']; }?>" readonly></td>
   <td class="All_60" align="right">EmailId:&nbsp;</td><td style="width:150px;">
   <input class="All_150" name="RefProEmailId" id="RefProEmailId" maxlength="50" value="<?php echo $ResEmp['Prof_RefEmailId']; ?>" readonly></td>
   <td class="All_60" align="right">Name:&nbsp;</td><td style="width:150px;">
   <input class="All_150" name="RefProName" id="RefProName" value="<?php echo $ResEmp['Prof_RefName']; ?>" readonly style="text-transform:uppercase;"></td>
   <td class="All_80" align="right">Desig:&nbsp;</td><td style="width:110px;">
   <input style="width:100px; height:18px; font-size:11px;text-transform:uppercase;" class="All_120" name="RefProDesig" id="RefProDesig" value="<?php echo $ResEmp['Prof_RefDesig']; ?>" readonly>
   <input type="hidden" class="All_120" name="RefProRelation" id="RefProRelation" value="<?php echo $ResEmp['Prof_RefRelation']; ?>" readonly>
   <input type="hidden" style="width:375px; height:18px; font-size:11px;" name="RefProAddress" id="RefProAddress" value="<?php echo $ResEmp['Prof_RefAdd']; ?>" readonly>
   </td>
 </tr>
 <tr>
  <td style="width:80px; height:18px; font-size:11px;">Company:</td><td style="width:340px;" colspan="7">
    <input style="width:336px; height:18px; font-size:11px;text-transform:uppercase;" name="RefProCompany" id="RefProCompany" value="<?php echo $ResEmp['Prof_RefCompany']; ?>" readonly></td>
 </tr>
</table>
</fieldset>
 </td>
</tr>
 <tr>
  <td align="Right" class="fontButton" colspan="6"><table border="0" align="right" class="fontButton">
	<tr>	
<?php if($_SESSION['User_Permission']=='Edit'){?> 
	  <td align="right" style="width:90px;"><input type="button" name="ChangeContact" id="ChangeContact" style="width:90px; display:block;" value="Edit" onClick="EditContact()">
		<input type="submit" name="EditContactE" id="EditContactE" style="width:90px;display:none;" value="save"></td>
<?php } ?>
	  <td align="right" style="width:90px;"><input type="button" name="RefreshContE" id="RefreshContE" style="width:90px;" value="refresh" onClick="javascript:window.location='EmpContact.php?ID=<?php echo $EMPID; ?>&Event=Edit'"/></td>
	</tr></table>
  </td>
</tr>
<?php /******************************** Update Contact *********************************************/ ?>
<form name="formEcontact" method="post" onSubmit="return ValidateCont(this)">	
   <tr>
    <td style="width:800px;">
	 <table border="1" bgcolor="#FFFFFF">
	  <tr>
	   <td style="font-family:Times New Roman;font-size:14px;font-weight:bold;width:150px;">(1) Emergency No. :</td>
	   <td style="font-family:Times New Roman;width:100px;">
	   <input name="Cont1" value="<?php if($ResEmp['Emg_Contact1']!=0){echo $ResEmp['Emg_Contact1']; } ?>" style="width:98px;border-style:hidden;" readonly/></td>
	   <td style="font-family:Times New Roman;font-size:14px;font-weight:bold;width:150px;">&nbsp;Person Name :</td>
	   <td style="font-family:Times New Roman;width:300px;">
	   <input name="PName1" style="width:298px;border-style:hidden;" value="<?php echo $ResEmp['Emg_Person1']; ?>" readonly/></td>
	  </tr>
	  <tr>
	   <td style="font-family:Times New Roman;font-size:14px;font-weight:bold;width:150px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Relation :</td>
	   <td style="font-family:Times New Roman;width:150px;">
	   <input name="PRel1" style="text-transform:uppercase;width:135px;border-style:hidden;" value="<?php echo $ResEmp['Emp_Relation1']; ?>" readonly/>
      </td>
	   <td style="font-family:Times New Roman;font-size:14px;font-weight:bold;width:150px;">&nbsp;Location :</td>
	   <td style="font-family:Times New Roman;width:300px;">
	   <input name="PLoc1" value="<?php echo $ResEmp['Emg_Location1']; ?>" style="width:298px;border-style:hidden;" readonly/></td>
	  </tr>
	   <tr>
	   <td style="font-family:Times New Roman;font-size:14px;font-weight:bold;width:150px;">(2) Emergency No. :</td>
	   <td style="font-family:Times New Roman;width:100px;">
	   <input name="Cont2" value="<?php if($ResEmp['Emg_Contact2']!=0){echo $ResEmp['Emg_Contact2']; } ?>" style="width:98px;border-style:hidden;" readonly/></td>
	   <td style="font-family:Times New Roman;font-size:14px;font-weight:bold;width:150px;">&nbsp;Person Name :</td>
	   <td style="font-family:Times New Roman;width:300px;">
	   <input name="PName2" style="width:298px;border-style:hidden;" value="<?php echo $ResEmp['Emg_Person2']; ?>" readonly/></td>
	  </tr>
	  <tr>
	   <td style="font-family:Times New Roman;font-size:14px;font-weight:bold;width:150px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Relation :</td>
	   <td style="font-family:Times New Roman;width:150px;">
	   <input name="PRel2" style="text-transform:uppercase;width:135px;border-style:hidden;" value="<?php echo $ResEmp['Emp_Relation2']; ?>" readonly/>
	   </td>
	   <td style="font-family:Times New Roman;font-size:14px;font-weight:bold;width:150px;">&nbsp;Location :</td>
	   <td style="font-family:Times New Roman;width:300px;">
	   <input name="PLoc2" value="<?php echo $ResEmp['Emg_Location2']; ?>" style="width:298px;border-style:hidden;" readonly/>
	   <input type="hidden" name="EmpName" value="<?php echo $NameE; ?>" /></td>
	  </tr>
	 </table> 
	</td>
<?php if($_SESSION['User_Permission']=='Edit'){?>
	<td valign="bottom">
	<?php if($ResEmp['SubValue']==1){ ?>
	<input type="submit" name="ContUpdateSubmit" id="ContUpdateSubmit" value="update" style="width:80px;height:25px;background-color:#8080FF;color:#FFFFFF;font-weight:bold;"/>
	<?php } ?>
	</td>
<?php } ?>
   </tr>
</form>   



</table>
</td>
<?php include("EmpImg.php"); ?>
</tr>
</table>
</form>  
</td>
 <?php } ?>
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
<?php //**********************************************END*****END*****END******END******END***************************************************************?>	
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

