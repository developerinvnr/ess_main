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
if(isset($_POST['EditPersonalE']))
{  if($_POST['MobileNoPer']==''){$_POST['MobileNoPer']=0;}if($_POST['PhoneNoPer']==''){$_POST['PhoneNoPer']=0;} if($_POST['PanCardNo']==''){$_POST['PanCardNo']='';} 
   if($_POST['MarrigeDate']==''){$MarrigeDate='0000-00-00'; $DateMarrigeDate='0000-00-00';} 
   if($_POST['MarrigeDate']!=''){$MarrigeDate='2012-'.$_POST['mm'].'-'.$_POST['md']; $DateMarrigeDate='0000-'.$_POST['mm'].'-'.$_POST['md'];} 
   
 $SqlInsPer = mysql_query("UPDATE hrm_employee_personal SET Gender='".$_POST['gender']."',Religion='".$_POST['Religion']."', AadharNo='".$_POST['AadharNo']."',DR='".$_POST['EDr']."',BloodGroup='".$_POST['BloodGroup']."',SeniorCitizen='".$_POST['SeniorCitizen']."',MetroCity='".$_POST['MetroCity']."',MobileNo=".$_POST['MobileNoPer'].",PhoneNo=".$_POST['PhoneNoPer'].",EmailId_Self='".$_POST['EmailId']."',PanNo='".$_POST['PanCardNo']."',PanNo_YN='".$_POST['ChPanNo']."',PassportNo='".$_POST['PassPortNo']."',PassportNo_YN='".$_POST['ChPassPort']."',Passport_ExpiryDateFrom='".date("Y-m-d",strtotime($_POST['PassPortFrom']))."',Passport_ExpiryDateTo='".date("Y-m-d",strtotime($_POST['PassPortTo']))."',DrivingLicNo='".$_POST['DrivingLicNo']."',DrivingLicNo_YN='".$_POST['ChDrivingLic']."',Driv_ExpiryDateFrom='".date("Y-m-d",strtotime($_POST['DrivingLicFrom']))."',Driv_ExpiryDateTo='".date("Y-m-d",strtotime($_POST['DrivingLicTo']))."',Qualification='".$_POST['Qualification']."',Married='".$_POST['Marrige']."',MarriageDate='".$MarrigeDate."',MarriageDate_dm='".$DateMarrigeDate."',Categoryy='".$_POST['Category']."',Widow='".$_POST['Widow']."',Divorce='".$_POST['Divorce']."',CreatedBy=".$UserId.",CreatedDate='".date('Y-m-d')."',YearId=".$YearId." WHERE EmployeeID=".$EMPID, $con); 
   if($SqlInsPer){ $msg = "Personal data has been Updeted successfully..."; }
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
function EditPersonal()
{document.getElementById("EditPersonalE").style.display = 'block'; document.getElementById("ChangePersonal").style.display = 'none';
 document.getElementById("male").disabled = false; document.getElementById("female").disabled = false; document.getElementById("BloodGroup").disabled = false;
 document.getElementById("SeniorCitizen").disabled = false; document.getElementById("MetroCity").disabled = false; document.getElementById("MobileNoPer").readOnly = false;
 document.getElementById("PhoneNoPer").readOnly = false; document.getElementById("EmailId").readOnly = false; document.getElementById("PanCardNo").readOnly = false; document.getElementById("PassPortNo").readOnly = false; document.getElementById("PPFrom").disabled = false; document.getElementById("PPTo").disabled = false; document.getElementById("DrivingLicNo").readOnly = false; document.getElementById("DLFrom").disabled = false; document.getElementById("DLTo").disabled = false; document.getElementById("Qualification").readOnly = false; document.getElementById("Marrige").disabled = false; document.getElementById("PassPortFrom").readOnly = false; document.getElementById("PassPortTo").readOnly = false;
 document.getElementById("DrivingLicFrom").readOnly = false; document.getElementById("DrivingLicTo").readOnly = false; //document.getElementById("MarrigeDate").readOnly = false;
 var Marr=document.getElementById("Marrige").value; 
 if(Marr=='Y'){document.getElementById("MarrigeDate").readOnly = false; document.getElementById("Marrigebtn").disabled = false;} 
 document.getElementById("PassportNoCheck").disabled = false; document.getElementById("DrivingLicNoCheck").disabled = false;
 document.getElementById("PanNoCheck").disabled = false;
 document.getElementById("Category").disabled = false; document.getElementById("Divorce").disabled = false; document.getElementById("Widow").disabled = false;
document.getElementById("AadharNo").readOnly = false; document.getElementById("Religion").disabled = false;
}

function MarrigeEMP(value1)
{ if(value1=='N'){document.getElementById("MarrigeDate").disabled = true; document.getElementById("Marrigebtn").disabled = true; document.getElementById("MarrigeDate").value = '';}
else if(value1=='Y'){document.getElementById("MarrigeDate").disabled = false; document.getElementById("Marrigebtn").disabled = false;} }

function RefPer()
{ 
document.getElementById("BloodGroup").value=''; document.getElementById("MobileNoPer").value=''; document.getElementById("PhoneNoPer").value=''; document.getElementById("EmailId").value=''; document.getElementById("PanCardNo").value=''; document.getElementById("PassPortNo").value=''; document.getElementById("PassPortFrom").value=''; document.getElementById("PassPortTo").value=''; document.getElementById("DrivingLicNo").value=''; document.getElementById("DrivingLicFrom").value=''; document.getElementById("DrivingLicTo").value=''; document.getElementById("Qualification").value=''; document.getElementById("MarrigeDate").value=''; document.getElementById("SeniorCitizen").value='N'; document.getElementById("MetroCity").value='N'; document.getElementById("Marrige").value='N';
}


function MarrigeEMP(value1)
{ if(value1=='N'){document.getElementById("MarrigeDate").readOnly = true; document.getElementById("Marrigebtn").disabled = true; document.getElementById("MarrigeDate").value = '';}
else if(value1=='Y'){document.getElementById("MarrigeDate").readOnly = false; document.getElementById("Marrigebtn").disabled = false;} }

function validate(formEpersonal) 
{ 
  var MobileNoPer = formEpersonal.MobileNoPer.value; var Numfilter=/^[0-9 ]+$/;  var test_num2 = Numfilter.test(MobileNoPer)
  //if (MobileNoPer.length === 0) { alert("You must enter a Mobile number.");  return false; }
  if (MobileNoPer!='')  {
  if(test_num2==false) { alert('Please Enter Only Number in the Office mobile number Field'); return false; }	
  if (MobileNoPer.length<10 || MobileNoPer.length>10)  { alert("Please enter a right formate of mobile no number");  return false; } }

  var PhoneNoPer = formEpersonal.PhoneNoPer.value; 
  if (PhoneNoPer!='')  { var Numfilter=/^[0-9 ]+$/;  var test_num3 = Numfilter.test(PhoneNoPer)
  if(test_num3==false) { alert('Please Enter Only Number in the phone number Field'); return false; }	
  if (PhoneNoPer.length<6 || PhoneNoPer.length>15)  { alert("Please enter a right formate of phone number");  return false; } }	

  var EmailId = formEpersonal.EmailId.value;
  if (EmailId!='')  {  var EmailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
  var EmailCheck = EmailPattern.test(EmailId); if(!(EmailCheck)) { alert("You haven't entered in an valid email address!");   return false; } }
  
  //var PanCardNo = formEpersonal.PanCardNo.value; 
  //if (PanCardNo!='')  { var Numfilter=/^[0-9 ]+$/;  var test_num4 = Numfilter.test(PhoneNoPer)
  //if(test_num4==false) { alert('Please Enter Only Number in the pan card no. Field'); return false; }}

  var PassPortNo = formEpersonal.PassPortNo.value;  var PassPortFrom = formEpersonal.PassPortFrom.value; var PassPortTo = formEpersonal.PassPortTo.value;
  var P_DMY=PassPortFrom.split('-');     //splits the date string by '-' and stores in a array.
  var P_DMY2=PassPortTo.split('-');
  var P_day=P_DMY[0];  var P_month=P_DMY[1];  var P_year=P_DMY[2];
  var P_day1=P_DMY2[0];  var P_month1=P_DMY2[1];  var P_year1=P_DMY2[2];
  var P_dateTemp1=P_month+'/'+P_day+'/'+P_year;  
  var P_dateTemp2=P_month1+'/'+P_day1+'/'+P_year1;
  var P_date1 = new Date(P_dateTemp1);//mm/dd/yy 
  var P_date2 = new Date(P_dateTemp2); //mm/dd/yy
  var P_d1=P_date1.getTime(); var P_d2=P_date2.getTime();
  if (PassPortNo!='' && PassPortNo!='NA')  
  { 
    if(PassPortFrom=='') { alert('Please enter passport valid date Field'); return false; }
	if(PassPortTo=='') { alert('Please enter passport valid date Field'); return false; }
	if(PassPortFrom=='01-01-1970' || PassPortFrom=='00-00-0000') { alert('Please check passport valid date Field'); return false; }
	if(PassPortTo=='01-01-1970' || PassPortTo=='00-00-0000') { alert('Please check passport valid date Field'); return false; }
	if(P_d1>P_d2) { alert('Please check passport valid date Field'); return false; }
  }
  
  var DrivingLicNo = formEpersonal.DrivingLicNo.value;  var DrivingLicFrom = formEpersonal.DrivingLicFrom.value; var DrivingLicTo = formEpersonal.DrivingLicTo.value;
  var DMY=DrivingLicFrom.split('-');     //splits the date string by '-' and stores in a array.
  var DMY2=DrivingLicTo.split('-');
  var day=DMY[0];  var month=DMY[1];  var year=DMY[2];
  var day1=DMY2[0];  var month1=DMY2[1];  var year1=DMY2[2];
  var dateTemp1=month+'/'+day+'/'+year;  
  var dateTemp2=month1+'/'+day1+'/'+year1;
  var date1 = new Date(dateTemp1);//mm/dd/yy 
  var date2 = new Date(dateTemp2); //mm/dd/yy
  var d1=date1.getTime(); var d2=date2.getTime();
  if (DrivingLicNo!='' && DrivingLicNo!='NA')  
  { 
    if(DrivingLicFrom=='') { alert('Please enter driving lic. valid date Field'); return false; }
	if(DrivingLicTo=='') { alert('Please enter driving lic. valid date Field'); return false; }
	if(DrivingLicFrom=='01-01-1970' || DrivingLicFrom=='00-00-0000') { alert('Please check driving lic. valid date Field'); return false; }
	if(DrivingLicTo=='01-01-1970' || DrivingLicTo=='00-00-0000') { alert('Please check driving lic. valid date Field'); return false; }
	if(d1>d2) { alert('Please check driving lic. valid date Field'); return false; }
  }
  
  var MarrigeDate = formEpersonal.MarrigeDate.value; 
  var DM=MarrigeDate.split('-');     //splits the date string by '-' and stores in a array.
  var dayM=DM[0];  var monthM=DM[1]; 
  document.getElementById("md").value=dayM; document.getElementById("mm").value=monthM;
  
  //var Qualification = formEpersonal.Qualification.value; 
  //if (Qualification.length === 0) { alert("You must enter a Qualification.");  return false; }

}

function toUpper(txt)
{ document.getElementById(txt).value=document.getElementById(txt).value.toUpperCase(); return true; }

function CheckPanNo()
{ if(document.getElementById("PanNoCheck").checked==true){document.getElementById("PanNoCheck").value='Y'; document.getElementById("ChPanNo").value='Y';} 
  if(document.getElementById("PanNoCheck").checked==false){document.getElementById("PanNoCheck").value='N'; document.getElementById("ChPanNo").value='N';} 
}

function CheckPassPort()
{ if(document.getElementById("PassportNoCheck").checked==true){document.getElementById("PassportNoCheck").value='Y'; document.getElementById("ChPassPort").value='Y';} 
  if(document.getElementById("PassportNoCheck").checked==false){document.getElementById("PassportNoCheck").value='N'; document.getElementById("ChPassPort").value='N';} 
}

function CheckDrivingLic()
{ if(document.getElementById("DrivingLicNoCheck").checked==true){document.getElementById("DrivingLicNoCheck").value='Y'; document.getElementById("ChDrivingLic").value='Y';} 
  if(document.getElementById("DrivingLicNoCheck").checked==false){document.getElementById("DrivingLicNoCheck").value='N'; document.getElementById("ChDrivingLic").value='N';}
}

function CheckWidow()
{ if(document.getElementById("Widow").checked==true){document.getElementById("Widow").value='Y'; document.getElementById("ChWidow").value='Y';} 
  if(document.getElementById("Widow").checked==false){document.getElementById("Widow").value='N'; document.getElementById("ChWidow").value='N';}
}

function CheckDivorce()
{ if(document.getElementById("Divorce").checked==true){document.getElementById("Divorce").value='Y'; document.getElementById("ChDivorce").value='Y';} 
  if(document.getElementById("Divorce").checked==false){document.getElementById("Divorce").value='N'; document.getElementById("ChDivorce").value='N';}
}

</script>
</head>
<body class="body">
<?php 
$SqlEmp = mysql_query("SELECT *,hrm_employee_general.*,hrm_employee_personal.* FROM hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID WHERE hrm_employee.EmployeeID=".$EMPID, $con) or die(mysql_error());  $ResEmp=mysql_fetch_assoc($SqlEmp);
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
	  <td align="right" width="250" class="heading">Personal</td>
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
<?php if($_REQUEST['Event']=='Edit') {  //enctype="multipart/form-data" ?>
<td align="left" id="Epersonal" valign="top">             
 <form name="formEpersonal" method="post" onSubmit="return validate(this)">
<table border="0">
<tr>
 <td>
  <table><tr>
 <td class="All_100">EmpCode :</td><td class="All_60"><input name="EmpCode" id="EmpCode" class="All_50" style="background-color:#E6EBC5;" value="<?php echo $EC; ?>" Readonly></td>
 <td class="All_50">Name :</td><td class="All_220"><input name="EmpName" id="EmpName" style="width:210px; height:18px; font-size:11px;background-color:#E6EBC5;text-transform:uppercase;" value="<?php echo $Ename; ?>" Readonly></td>
  </tr></table>
 </td>
</tr>
<tr> 
<td align="left" valign="top">
<table border="0" width="750" id="TEmp" style="display:block;">
<tr> 
<td class="All_120">Gender :&nbsp;<font color="#FF0000">*</font></td><td class="All_180"><input type="radio" name="gender" id="male" value="M" <?php if($ResEmp['Gender']=='M') {echo 'checked';} ?> disabled>&nbsp;male&nbsp;&nbsp;<input type="radio" name="gender" id="female" value="F" <?php if($ResEmp['Gender']=='F') {echo 'checked';} ?> disabled>&nbsp;female</td>
<?php if($ResEmp['BloodGroup']=='O+'){$BG='O Positive';} if($ResEmp['BloodGroup']=='A+'){$BG='A Positive';} if($ResEmp['BloodGroup']=='B+'){$BG='B Positive';} 
if($ResEmp['BloodGroup']=='AB+'){$BG='AB Positive';} if($ResEmp['BloodGroup']=='O-'){$BG='O Negative';} if($ResEmp['BloodGroup']=='A-'){$BG='A Negative';}
if($ResEmp['BloodGroup']=='B-'){$BG='B Negative';}if($ResEmp['BloodGroup']=='AB-'){$BG='AB Negative';}?>
<td class="All_120">Blood Group :</td><td class="All_180"><select name="BloodGroup" id="BloodGroup" class="All_90" disabled>
       <?php if($ResEmp['BloodGroup']!=''){ ?><option value="<?php echo $ResEmp['BloodGroup']; ?>"><?php echo $BG; ?></option><?php }?>
	   <?php if($ResEmp['BloodGroup']==''){  ?><option style="background-color:#DBD3E2;" value="">-Select-</option><?php } ?>
       <option value="O+">O Positive</option><option value="O-">O Negative</option><option value="A+">A Positive</option><option value="A-">A Negative</option>
	   <option value="B+">B Positive</option><option value="B-">B Negative</option><option value="AB+">AB Positive</option><option value="AB-">AB Negative</option></select></td>  
</tr>
<tr>
  <td class="All_120">Senior Citizen :&nbsp;</td><td class="All_180"><select name="SeniorCitizen" id="SeniorCitizen" class="All_90" disabled>
   <option value="N" <?php if($ResEmp['SeniorCitizen']=='N') {echo 'selected';} ?>>&nbsp;No</option>
   <option value="Y" <?php if($ResEmp['SeniorCitizen']=='Y') {echo 'selected';} ?>>&nbsp;Yes</option></select></td>
  <td class="All_120">Metro City :</td><td class="All_180"><select name="MetroCity" id="MetroCity" class="All_90" disabled>
   <option value="N" <?php if($ResEmp['MetroCity']=='N') {echo 'selected';} ?>>&nbsp;No</option>
   <option value="Y" <?php if($ResEmp['MetroCity']=='Y') {echo 'selected';} ?>>&nbsp;Yes</option></select></td>
</tr>
<tr>
  <td class="All_120">Mobile No :&nbsp;</td><td class="All_180"><input name="MobileNoPer" id="MobileNoPer" class="All_150" value="<?php if($ResEmp['MobileNo']==0){ echo ''; } else { echo $ResEmp['MobileNo']; } ?>" maxlength="10" readonly></td>
  <td class="All_120">Phone No :</td><td style="width:180px;"><input name="PhoneNoPer" id="PhoneNoPer" class="All_150" value="<?php if($ResEmp['PhoneNo']==0){echo '';} else {echo $ResEmp['PhoneNo']; } ?>" maxlength="15" readonly></td>
</tr>
<tr>
 <td class="All_120">Email_Id :</td><td class="All_180"><span id="GetEmpCode"><input name="EmailId" id="EmailId" value="<?php echo $ResEmp['EmailId_Self']; ?>" class="All_150" readonly></span></td>
 <td class="All_120"><input type="checkbox" id="PanNoCheck" name="PanNoCheck" onClick="CheckPanNo()" <?php if($ResEmp['PanNo_YN']=='Y'){echo 'checked';} else {echo '';} ?> value="<?php echo $ResEmp['PanNo_YN']; ?>" disabled/>&nbsp;PanCard No :</td><td class="All_300"><input name="PanCardNo" id="PanCardNo" class="All_150" value="<?php echo $ResEmp['PanNo']; ?>" onkeyup="return toUpper(this.id)" readonly maxlength="25"></td>
</tr>
<tr>
 <td class="All_120"><input type="checkbox" id="PassportNoCheck" name="PassportNoCheck" onClick="CheckPassPort()" <?php if($ResEmp['PassportNo_YN']=='Y'){echo 'checked';} else {echo '';} ?> value="<?php echo $ResEmp['PassportNo_YN']; ?>" disabled/>&nbsp;Passport No :</td><td class="All_180"><input name="PassPortNo" id="PassPortNo" class="All_150" value="<?php echo $ResEmp['PassportNo']; ?>" onkeyup="return toUpper(this.id)" readonly maxlength="35"></td>
 <td class="All_120">Valid Passport :</td><td class="All_300">
 from :<input name="PassPortFrom" id="PassPortFrom" class="All_80" value="<?php if($ResEmp['PassportNo']=='' OR $ResEmp['PassportNo']=='NA'){echo '';} else { echo date("d-m-Y", strtotime($ResEmp['Passport_ExpiryDateFrom'])); } ?>" readonly><button id="PPFrom" class="CalenderButton" disabled></button>
 &nbsp;to :<input name="PassPortTo" id="PassPortTo" class="All_80" value="<?php if($ResEmp['PassportNo']=='' OR $ResEmp['PassportNo']=='NA'){echo '';} else {echo date("d-m-Y", strtotime($ResEmp['Passport_ExpiryDateTo'])); }?>" readonly><button id="PPTo" class="CalenderButton" disabled></button>
 <script type="text/javascript">  var cal = Calendar.setup({ onSelect:  function(cal) { cal.hide()}, showTime: true }); 
 cal.manageFields("PPFrom", "PassPortFrom", "%d-%m-%Y");  cal.manageFields("PPTo", "PassPortTo", "%d-%m-%Y");</script>
 </td>
</tr>
<tr> 
 <td class="All_120"><input type="checkbox" id="DrivingLicNoCheck" name="DrivingLicNoCheck" onClick="CheckDrivingLic()" <?php if($ResEmp['DrivingLicNo_YN']=='Y'){echo 'checked';} else {echo '';} ?> value="<?php echo $ResEmp['DrivingLicNo_YN']; ?>" disabled/>&nbsp;Driving Lic. No :</td><td class="All_180"><input name="DrivingLicNo" id="DrivingLicNo" value="<?php echo $ResEmp['DrivingLicNo']; ?>" maxlength="35" onkeyup="return toUpper(this.id)" class="All_150" readonly></td>
 <td class="All_120">Valid DrivingLic.:</td><td class="All_300">
  from :<input name="DrivingLicFrom" id="DrivingLicFrom" class="All_80" value="<?php if($ResEmp['DrivingLicNo']==''){echo '';} else {echo date("d-m-Y", strtotime($ResEmp['Driv_ExpiryDateFrom'])); } ?>" readonly><button id="DLFrom" class="CalenderButton" disabled></button>
  &nbsp;to :<input name="DrivingLicTo" id="DrivingLicTo" class="All_80" value="<?php if($ResEmp['DrivingLicNo']==''){echo '';} else {echo date("d-m-Y", strtotime($ResEmp['Driv_ExpiryDateTo'])); } ?>" readonly><button id="DLTo" class="CalenderButton" disabled></button>
  <script type="text/javascript">  var cal = Calendar.setup({ onSelect:  function(cal) { cal.hide()}, showTime: true }); 
  cal.manageFields("DLFrom", "DrivingLicFrom", "%d-%m-%Y");  cal.manageFields("DLTo", "DrivingLicTo", "%d-%m-%Y");</script>
  <input type="hidden" name="ChPanNo" id="ChPanNo" value="<?php echo $ResEmp['PanNo_YN']; ?>" />
  <input type="hidden" name="ChPassPort" id="ChPassPort" value="<?php echo $ResEmp['PassportNo_YN']; ?>" />
  <input type="hidden" name="ChDrivingLic" id="ChDrivingLic" value="<?php echo $ResEmp['DrivingLicNo_YN']; ?>" />
  </td>
 </tr>
 <tr>
 <td class="All_120">Qualification :</td><td class="All_180"><input type="text" name="Qualification" id="Qualification" class="All_150" value="<?php echo $ResEmp['Qualification']; ?>" onkeyup="return toUpper(this.id)" readonly></td>
 <td class="All_120">Marital status&nbsp;:</td><td class="All_300">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 <select name="Marrige" id="Marrige" class="All_80" onChange="MarrigeEMP(this.value)" disabled>
 <option value="N" <?php if($ResEmp['Married']=='N') {echo 'selected';} ?>>UnMarried</option>
 <option value="Y" <?php if($ResEmp['Married']=='Y') {echo 'selected';} ?>>Married</option></select>
 &nbsp;Date :<input name="MarrigeDate" id="MarrigeDate" class="All_50" value="<?php if($ResEmp['Married']=='N'){echo '';}else {echo date("d-m", strtotime($ResEmp['MarriageDate']));}?>" readonly maxlength="5"><button id="Marrigebtn" class="CalenderButton" disabled></button>&nbsp;<b>(dd-mm)</b>
 <script type="text/javascript">  var cal = Calendar.setup({ onSelect:  function(cal) { cal.hide()}, showTime: true }); cal.manageFields("Marrigebtn", "MarrigeDate", "%d-%m"); </script>
 <input type="hidden" id="md" name="md" /><input type="hidden" id="mm" name="mm" />
 </td>
</tr>
<tr>
 <td class="All_120">Category :</td><td class="All_180"><select name="Category" id="Category" class="All_150" disabled>
   <option value="" <?php if($ResEmp['Categoryy']=='') {echo 'selected';} ?>>Select</option>
   <option value="UR" <?php if($ResEmp['Categoryy']=='UR') {echo 'selected';} ?>>Unreserved</option>
   <option value="OBC" <?php if($ResEmp['Categoryy']=='OBC') {echo 'selected';} ?>>Other Backward Caste</option>
   <option value="ST" <?php if($ResEmp['Categoryy']=='ST') {echo 'selected';} ?>>Schedule Tribe</option>
   <option value="SC" <?php if($ResEmp['Categoryy']=='SC') {echo 'selected';} ?>>Schedule Caste</option></select></td>
 <td class="All_120"></td><td class="All_300">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" id="Widow" name="Widow" onClick="CheckWidow()" <?php if($ResEmp['Widow']=='Y'){echo 'checked';} else {echo '';} ?> value="<?php echo $ResEmp['Widow']; ?>" disabled/>&nbsp;Widow&nbsp;&nbsp;<input type="checkbox" id="Divorce" name="Divorce" onClick="CheckDivorce()" <?php if($ResEmp['Divorce']=='Y'){echo 'checked';} else {echo '';} ?> value="<?php echo $ResEmp['Divorce']; ?>" disabled/>&nbsp;Divorce
 <input type="hidden" name="ChWidow" id="ChWidow" value="<?php echo $ResEmp['DrivingLicNo_YN']; ?>" />
 <input type="hidden" name="ChDivorce" id="ChDivorce" value="<?php echo $ResEmp['DrivingLicNo_YN']; ?>" />
 </td>
</tr>
<tr>
  <td class="All_120">Aadhar No :&nbsp;</td><td class="All_180"><input name="AadharNo" id="AadharNo" class="All_150" value="<?php if($ResEmp['AadharNo']==0){ echo ''; } else { echo $ResEmp['AadharNo']; } ?>" maxlength="15" readonly></td>
  <td class="All_120">Religion :</td><td class="All_180"><select name="Religion" id="Religion" class="All_90" disabled>
   <?php if($ResEmp['Religion']!=''){ ?><option value="<?php echo $ResEmp['Religion']; ?>"><?php echo $ResEmp['Religion']; ?></option><?php }?>
   <?php if($ResEmp['Religion']==''){  ?><option style="background-color:#DBD3E2;" value="">-Select-</option><?php } ?>
   <option value="HINDU">HINDU</option><option value="MUSLIM">MUSLIM</option><option value="SIKH">SIKH</option><option value="CHRISTAIN">CHRISTAIN</option>
   <option value="JAIN">JAIN</option><option value="BUDHH">BUDHH</option><option value="ANY OTHER">ANY OTHER</option></select>

   &nbsp;&nbsp;
   DR: <select name="EDr" id="EDr" class="All_50"><option value="<?php echo $ResEmp['DR']; ?>" selected><?php echo $ResEmp['DR']; ?></option>
   <?php if($ResEmp['DR']=='Y'){ ?><option value="N">N</option><?php } ?>
   <?php if($ResEmp['DR']=='N'){ ?><option value="Y">Y</option><?php } ?>
   </select>
</td>
</tr>

 <tr>
  <td align="Right" class="fontButton" colspan="6"><table border="0" align="right" class="fontButton">
	<tr>	 
<?php if($_SESSION['User_Permission']=='Edit'){?>
	  <td align="right" style="width:90px;"><input type="button" name="ChangePersonal" id="ChangePersonal" style="width:90px; display:block;" value="edit" onClick="EditPersonal()">
		<input type="submit" name="EditPersonalE" id="EditPersonalE" style="width:90px;display:none;" value="save"></td>
<?php } ?>
	  <td align="right" style="width:90px;"><input type="button" name="RefreshPerE" id="RefreshPerE" style="width:90px;" value="refresh" onClick="javascript:window.location='EmpPersonal.php?ID=<?php echo $EMPID; ?>&Event=Edit'"/></td>
	</tr></table>
  </td>
</tr>

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

