<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}
//**********************************************************************************************************************
//====================================================Import Increment=============================================================//
if(isset($_POST['SaveEmpInc']))
{
 if ($_FILES['csv_file']['error'] > 0) {
  echo "Error: " . $_FILES['csv_file']['error'] . "<br />"; 
 }else{  
  if (($handle = fopen($_FILES['csv_file']['tmp_name'], "r")) !== FALSE) {
   $ctr = 1; // used to exclude the CSV header
   while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) { 
   $c0 = mysql_real_escape_string($data[0]); $c1 = mysql_real_escape_string($data[1]); $c2 = mysql_real_escape_string($data[2]); $c3 = mysql_real_escape_string($data[3]);
   $c4 = mysql_real_escape_string($data[4]); $c5 = mysql_real_escape_string($data[5]); $c6 = mysql_real_escape_string($data[6]); $c7 = mysql_real_escape_string($data[7]);
   $c8 = mysql_real_escape_string($data[8]); $c9 = mysql_real_escape_string($data[9]); $c10 = mysql_real_escape_string($data[10]); $c11 = mysql_real_escape_string($data[11]);
   $c12 = mysql_real_escape_string($data[12]); $c13 = mysql_real_escape_string($data[13]); $c14 = mysql_real_escape_string($data[14]); $c15 = mysql_real_escape_string($data[15]);
   $c16 = mysql_real_escape_string($data[16]); $c17 = mysql_real_escape_string($data[17]); $c18 = mysql_real_escape_string($data[18]); $c19 = mysql_real_escape_string($data[19]);
   $c20 = mysql_real_escape_string($data[20]); $c21 = mysql_real_escape_string($data[21]); $c22 = mysql_real_escape_string($data[22]); $c23 = mysql_real_escape_string($data[23]);
   $c24 = mysql_real_escape_string($data[24]); $c25 = mysql_real_escape_string($data[25]);

    if ($ctr > 1 AND ($c0!='' OR $c0!=0)) { $sql=mysql_query("INSERT INTO hrm_pms_appraisal_history(EmpCode, EmpName, Current_Grade, Proposed_Grade, Department, Current_Designation, Proposed_Designation, SalaryChange_Date, Salary_Basic, Salary_Stipend, Salary_HRA, Salary_CA, Salary_VA, Salary_SA, Salary_PI, Industry_Bench_Marking, Previous_GrossSalaryPM, Current_GrossSalaryPM, Proposed_GrossSalaryPM, BonusAnnual_September, Prop_PeInc_GSPM, PropSalary_Correction, TotalProp_GSPM, TotalProp_PerInc_GSPM, Score, Rating, CompanyId) VALUES ('$c0', '$c1','$c2','$c3','$c4','$c5','$c6','".date("Y-m-d",strtotime($c7))."','$c8','$c9','$c10','$c11','$c12','$c13','$c14','$c15', '$c16','$c17','$c18','$c19','$c20','$c21','$c22','$c23','$c24', '$c25', ".$CompanyId.")", $con); }

    else { $ctr++; }
   }
   fclose($handle);
   if($sql){ $msgInc= 'Employee increment excel file uploaded successfully...';}
  }
 }
}

//====================================================Import Personal=============================================================//
if(isset($_POST['SaveEmpPersonal']))
{
 if ($_FILES['Personal_csv_file']['error'] > 0) {
  echo "Error: " . $_FILES['Personal_csv_file']['error'] . "<br />"; 
 }else{  
  if (($handle = fopen($_FILES['Personal_csv_file']['tmp_name'], "r")) !== FALSE) {
   $ctr = 1; // used to exclude the CSV header
   while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) { 
   $c0 = mysql_real_escape_string($data[0]); $c1 = mysql_real_escape_string($data[1]); $c2 = mysql_real_escape_string($data[2]); $c3 = mysql_real_escape_string($data[3]);
   $c4 = mysql_real_escape_string($data[4]); $c5 = mysql_real_escape_string($data[5]); $c6 = mysql_real_escape_string($data[6]); $c7 = mysql_real_escape_string($data[7]);
   $c8 = mysql_real_escape_string($data[8]); $c9 = mysql_real_escape_string($data[9]); $c10 = mysql_real_escape_string($data[10]); $c11 = mysql_real_escape_string($data[11]);
   $c12 = mysql_real_escape_string($data[12]); $c13 = mysql_real_escape_string($data[13]); $c14 = mysql_real_escape_string($data[14]); $c15 = mysql_real_escape_string($data[15]);
   $c16 = mysql_real_escape_string($data[16]); $c17 = mysql_real_escape_string($data[17]); $c18 = mysql_real_escape_string($data[18]); $c19 = mysql_real_escape_string($data[19]);
   //$c20 = mysql_real_escape_string($data[20]); $c21 = mysql_real_escape_string($data[21]); $c22 = mysql_real_escape_string($data[22]); $c23 = mysql_real_escape_string($data[23]);
   //$c24 = mysql_real_escape_string($data[24]); $c25 = mysql_real_escape_string($data[25]);

    if ($ctr > 1 AND ($c0!='' OR $c0!=0)) { $sql=mysql_query("update hrm_employee_personal set Gender='$c1', DR='$c2', BloodGroup='$c3', SeniorCitizen='$c4', MetroCity
='$c5', MobileNo='$c6', PhoneNo='$c7', EmailId_Self='$c8', PanNo='$c9', PassportNo='$c10', Passport_ExpiryDateFrom='".date("Y-m-d",strtotime($c11))."', Passport_ExpiryDateTo='".date("Y-m-d",strtotime($c12))."', DrivingLicNo='$c13', Driv_ExpiryDateFrom='".date("Y-m-d",strtotime($c14))."', Driv_ExpiryDateTo='".date("Y-m-d",strtotime($c15))."', Qualification='$c16', Married='$c17', MarriageDate='".date("Y-m-d",strtotime($c18))."', MarriageDate_dm='".date("0000-m-d",strtotime($c18))."', CreatedBy=0, CreatedDate='".date("Y-m-d")."', YearId=".$YearId." where EC='$c0'", $con); }

    else { $ctr++; }
   }
   fclose($handle);
   if($sql){ $msgPer= 'Employee Personal Details uploaded successfully...';}
  }
 }
}

//====================================================Import General=============================================================//
if(isset($_POST['SaveEmpGeneral']))
{
 if ($_FILES['General_csv_file']['error'] > 0) {
  echo "Error: " . $_FILES['General_csv_file']['error'] . "<br />"; 
 }else{  
  if (($handle = fopen($_FILES['General_csv_file']['tmp_name'], "r")) !== FALSE) {
   $ctr = 1; // used to exclude the CSV header
   while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) { 
   $c0 = mysql_real_escape_string($data[0]); $c1 = mysql_real_escape_string($data[1]); $c2 = mysql_real_escape_string($data[2]); $c3 = mysql_real_escape_string($data[3]);
   $c4 = mysql_real_escape_string($data[4]); $c5 = mysql_real_escape_string($data[5]); $c6 = mysql_real_escape_string($data[6]); $c7 = mysql_real_escape_string($data[7]);
   $c8 = mysql_real_escape_string($data[8]); $c9 = mysql_real_escape_string($data[9]); $c10 = mysql_real_escape_string($data[10]); $c11 = mysql_real_escape_string($data[11]);
   $c12 = mysql_real_escape_string($data[12]); $c13 = mysql_real_escape_string($data[13]); $c14 = mysql_real_escape_string($data[14]); $c15 = mysql_real_escape_string($data[15]);
   $c16 = mysql_real_escape_string($data[16]); $c17 = mysql_real_escape_string($data[17]); $c18 = mysql_real_escape_string($data[18]); $c19 = mysql_real_escape_string($data[19]);
   $c20 = mysql_real_escape_string($data[20]); $c21 = mysql_real_escape_string($data[21]); $c22 = mysql_real_escape_string($data[22]); $c23 = mysql_real_escape_string($data[23]);
   //$c24 = mysql_real_escape_string($data[24]); $c25 = mysql_real_escape_string($data[25]);

    if ($ctr > 1 AND ($c0!='' OR $c0!=0)) { $sql=mysql_query("update hrm_employee_general set FileNo='$c1', DateJoining='$c2', DateConfirmationYN='$c3', DateConfirmation='$c4', DOB='".date("Y-m-d",strtotime($c5))."', DOB_dm='".date("0000-m-d",strtotime($c5))."', EmailId_Vnr='$c6', MobileNo_Vnr='$c7', VNRExpYear='$c8', VNRExpMonth='$c9', PreviousExpYear='$c10', PreviousExpMonth='$c11', BankName='$c12', BranchName='$c13', AccountNo='$c14', BranchAdd='$c15', BankName2='$c16', BranchName2='$c17', AccountNo2='$c18', BranchAdd2='$c19', PaymentType='$C20', InsuCardNo='$C21', PfAccountNo='$C22', CreatedBy=0, CreatedDate='".date("Y-m-d")."', YearId=".$YearId." where EC='$c0'", $con); }

    else { $ctr++; }
   }
   fclose($handle);
   if($sql){ $msgGen= 'Employee General Details uploaded successfully...';}
  }
 }
}

//====================================================Import Contact=============================================================//
if(isset($_POST['SaveEmpContact']))
{
 if ($_FILES['Contact_csv_file']['error'] > 0) {
  echo "Error: " . $_FILES['Contact_csv_file']['error'] . "<br />"; 
 }else{  
  if (($handle = fopen($_FILES['Contact_csv_file']['tmp_name'], "r")) !== FALSE) {
   $ctr = 1; // used to exclude the CSV header
   while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) { 
   $c0 = mysql_real_escape_string($data[0]); $c1 = mysql_real_escape_string($data[1]); $c2 = mysql_real_escape_string($data[2]); $c3 = mysql_real_escape_string($data[3]);
   $c4 = mysql_real_escape_string($data[4]); $c5 = mysql_real_escape_string($data[5]); $c6 = mysql_real_escape_string($data[6]); $c7 = mysql_real_escape_string($data[7]);
   $c8 = mysql_real_escape_string($data[8]); $c9 = mysql_real_escape_string($data[9]); $c10 = mysql_real_escape_string($data[10]); $c11 = mysql_real_escape_string($data[11]);
   $c12 = mysql_real_escape_string($data[12]); $c13 = mysql_real_escape_string($data[13]); $c14 = mysql_real_escape_string($data[14]); $c15 = mysql_real_escape_string($data[15]);
   $c16 = mysql_real_escape_string($data[16]); $c17 = mysql_real_escape_string($data[17]); $c18 = mysql_real_escape_string($data[18]); $c19 = mysql_real_escape_string($data[19]);
   $c20 = mysql_real_escape_string($data[20]); $c21 = mysql_real_escape_string($data[21]); $c22 = mysql_real_escape_string($data[22]); $c23 = mysql_real_escape_string($data[23]);
   $c24 = mysql_real_escape_string($data[24]); $c25 = mysql_real_escape_string($data[25]); $c26 = mysql_real_escape_string($data[26]); $c27 = mysql_real_escape_string($data[27]);
   $c28 = mysql_real_escape_string($data[28]);

    if ($ctr > 1 AND ($c0!='' OR $c0!=0)) { $sql=mysql_query("update hrm_employee_contact set CurrAdd='$c1', CurrAdd_State='$c2', CurrAdd_City='$c3', CurrAdd_PinNo='$c4', ParAdd='$c5', ParAdd_State='$c6', ParAdd_City='$c7', ParAdd_PinNo='$c8', EmgContactNo='$c9', EmgRelation='$c10', EmgName='$c11', EmgAdd='$c12', EmgEmailId='$c13', Personal_RefName='$c14', Personal_RefContactNo='$c15', Personal_RefDesig='$c16', Personal_RefEmailId='$c17', Personal_RefRelation='$c18', Personal_RefCompany='$c19', Personal_RefAdd='$c20', Prof_RefName='$C21', Prof_RefContactNo='$C22', Prof_RefDesig='$C23', Prof_RefEmailId='$c24', Prof_RefRelation='$c25', Prof_RefCompany='$c26', Prof_RefAdd='$c27', CreatedDate='".date("Y-m-d")."', YearId=".$YearId." where EC='$c0'", $con); }
    else { $ctr++; }
   }
   fclose($handle);
   if($sql){ $msgCon= 'Employee Contact Details uploaded successfully...';}
  }
 }
}

//====================================================Import Family=============================================================//
if(isset($_POST['SaveEmpFamily']))
{
 if ($_FILES['Family_csv_file']['error'] > 0) {
  echo "Error: " . $_FILES['Family_csv_file']['error'] . "<br />"; 
 }else{  
  if (($handle = fopen($_FILES['Family_csv_file']['tmp_name'], "r")) !== FALSE) {
   $ctr = 1; // used to exclude the CSV header
   while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) { 
   $c0 = mysql_real_escape_string($data[0]); $c1 = mysql_real_escape_string($data[1]); $c2 = mysql_real_escape_string($data[2]); $c3 = mysql_real_escape_string($data[3]);
   $c4 = mysql_real_escape_string($data[4]); $c5 = mysql_real_escape_string($data[5]); $c6 = mysql_real_escape_string($data[6]); $c7 = mysql_real_escape_string($data[7]);
   $c8 = mysql_real_escape_string($data[8]); $c9 = mysql_real_escape_string($data[9]); $c10 = mysql_real_escape_string($data[10]); $c11 = mysql_real_escape_string($data[11]);
   $c12 = mysql_real_escape_string($data[12]); $c13 = mysql_real_escape_string($data[13]); 

    if ($ctr > 1 AND ($c0!='' OR $c0!=0)) { $sql=mysql_query("update hrm_employee_family set FatherName='$c1', FatherDOB='".date("Y-m-d",strtotime($c2))."', FatherOccupation='$c3', FatherQuali='$c4', MotherName='$c5', MotherDOB='".date("Y-m-d",strtotime($c6))."', MotherOccupation='$c7', MotherQuali='$c8', HusWifeName='$c9', HusWifeDOB='".date("Y-m-d",strtotime($c10))."', HusWifeOccupation='$c11', HusWifeQuali='$c12', CreatedDate='".date("Y-m-d")."', YearId=".$YearId." where EC='$c0'", $con); }
    else { $ctr++; }
   }
   fclose($handle);
   if($sql){ $msgFam= 'Employee Family Details uploaded successfully...';}
  }
 }
}

//====================================================Import All=============================================================//
if(isset($_POST['SaveEmpAll']))
{
 if ($_FILES['All_csv_file']['error'] > 0) {
  echo "Error: " . $_FILES['All_csv_file']['error'] . "<br />"; 
 }else{  
  if (($handle = fopen($_FILES['All_csv_file']['tmp_name'], "r")) !== FALSE) {
   $ctr = 1; // used to exclude the CSV header
   while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) { 
   $c0 = mysql_real_escape_string($data[0]); $c1 = mysql_real_escape_string($data[1]); $c2 = mysql_real_escape_string($data[2]); $c3 = mysql_real_escape_string($data[3]);
   $c4 = mysql_real_escape_string($data[4]); $c5 = mysql_real_escape_string($data[5]); $c6 = mysql_real_escape_string($data[6]); $c7 = mysql_real_escape_string($data[7]);
   $c8 = mysql_real_escape_string($data[8]); $c9 = mysql_real_escape_string($data[9]); $c10 = mysql_real_escape_string($data[10]); $c11 = mysql_real_escape_string($data[11]);
   $c12 = mysql_real_escape_string($data[12]); $c13 = mysql_real_escape_string($data[13]); $c14 = mysql_real_escape_string($data[14]); $c15 = mysql_real_escape_string($data[15]);
   $c16 = mysql_real_escape_string($data[16]); $c17 = mysql_real_escape_string($data[17]); $c18 = mysql_real_escape_string($data[18]); $c19 = mysql_real_escape_string($data[19]);
   $c20 = mysql_real_escape_string($data[20]); $c21 = mysql_real_escape_string($data[21]); $c22 = mysql_real_escape_string($data[22]); $c23 = mysql_real_escape_string($data[23]);
   $c24 = mysql_real_escape_string($data[24]); $c25 = mysql_real_escape_string($data[25]); $c26 = mysql_real_escape_string($data[26]); $c27 = mysql_real_escape_string($data[27]);
   $c28 = mysql_real_escape_string($data[28]); $c29 = mysql_real_escape_string($data[29]); $c30 = mysql_real_escape_string($data[30]); $c31 = mysql_real_escape_string($data[31]); 
   $c32 = mysql_real_escape_string($data[32]); $c33 = mysql_real_escape_string($data[33]); $c34 = mysql_real_escape_string($data[34]); $c35 = mysql_real_escape_string($data[35]); 
   $c36 = mysql_real_escape_string($data[36]); $c37 = mysql_real_escape_string($data[37]); $c38 = mysql_real_escape_string($data[38]); $c39 = mysql_real_escape_string($data[39]); 
   $c40 = mysql_real_escape_string($data[40]); $c41 = mysql_real_escape_string($data[41]); $c42 = mysql_real_escape_string($data[42]); $c43 = mysql_real_escape_string($data[43]);
   $c44 = mysql_real_escape_string($data[44]); $c45 = mysql_real_escape_string($data[45]); $c46 = mysql_real_escape_string($data[46]); $c47 = mysql_real_escape_string($data[47]);
   $c48 = mysql_real_escape_string($data[48]); $c49 = mysql_real_escape_string($data[49]); $c50 = mysql_real_escape_string($data[50]);

    if ($ctr > 1 AND ($c0!='' OR $c0!=0)) { 
	
	$sqlGen=mysql_query("update hrm_employee_general set DateConfirmationYN='$c11', DOB='".date("Y-m-d",strtotime($c22))."', DOB_dm='".date("0000-m-d",strtotime($c22))."', EmailId_Vnr='$c17', MobileNo_Vnr='$c15', VNRExpYear='$c5', PreviousExpYear='$c6', TotalExp='$c7', BankName='$c46', AccountNo='$c47', ReportingName='$c19', CreatedDate='".date("Y-m-d")."', YearId=".$YearId." where EC='$c1'", $con); 
	
	$sqlPer=mysql_query("update hrm_employee_personal set Religion='$c30', BloodGroup='$c31', MobileNo='$c16', EmailId_Self='$c18', Qualification='$c12', Married='$c28', MarriageDate='".date("Y-m-d",strtotime($c29))."', MarriageDate_dm='".date("0000-m-d",strtotime($c29))."', CreatedDate='".date("Y-m-d")."', YearId=".$YearId." where EC='$c1'", $con);
	 
	$sqlCon=mysql_query("update hrm_employee_contact set CurrAdd='$c20', ParAdd='$c21', EmgContactNo='$c24', EmgRelation='$c26', EmgName='$c25', CreatedDate='".date("Y-m-d")."', YearId=".$YearId." where EC='$c1'", $con); 
	
	$sqlFam=mysql_query("update hrm_employee_family set FatherName='$c32', MotherName='$c33', HusWifeName='$c34', HusWifeDOB='".date("Y-m-d",strtotime($c35))."', CreatedDate='".date("Y-m-d")."', YearId=".$YearId." where EC='$c1'", $con); 
	}
    else { $ctr++; }
   }
   fclose($handle);
   if($sqlGen AND $sqlPer AND $sqlCon AND $sqlFam){ $msgAll= 'Employee All Details uploaded successfully...';}
  }
 }
}

//====================================================Import Leave=============================================================//
if(isset($_POST['SaveEmpLeave']))
{
 if ($_FILES['Leave_csv_file']['error'] > 0) {
  echo "Error: " . $_FILES['Leave_csv_file']['error'] . "<br />"; 
 }else{  
  if (($handle = fopen($_FILES['Leave_csv_file']['tmp_name'], "r")) !== FALSE) {
   $ctr = 1; // used to exclude the CSV header
   while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) { 
   $c0 = mysql_real_escape_string($data[0]); $c1 = mysql_real_escape_string($data[1]); $c2 = mysql_real_escape_string($data[2]); $c3 = mysql_real_escape_string($data[3]);
   $c4 = mysql_real_escape_string($data[4]); $c5 = mysql_real_escape_string($data[5]); $c6 = mysql_real_escape_string($data[6]); $c7 = mysql_real_escape_string($data[7]); 
   $c8 = mysql_real_escape_string($data[8]); $c9 = mysql_real_escape_string($data[9]); $c10 = mysql_real_escape_string($data[10]); $c11 = mysql_real_escape_string($data[11]);
   $c12 = mysql_real_escape_string($data[12]); $c13 = mysql_real_escape_string($data[13]); $c14 = mysql_real_escape_string($data[14]); $c15 = mysql_real_escape_string($data[15]);
   $c16 = mysql_real_escape_string($data[16]); $c17 = mysql_real_escape_string($data[17]); $c18 = mysql_real_escape_string($data[18]); $c19 = mysql_real_escape_string($data[19]);
   
    if ($ctr > 1 AND ($c0!='' OR $c0!=0)) 
	{ $sql=mysql_query("update hrm_employee_leave set LeaveYearId=".$YearId.", Year='".date("Y")."', Emp_PriCL='$c13', Emp_PriSL='$c3', Emp_PriPL='$c7', Emp_PriEL='$c10', Emp_AllowCL='$c14', Emp_AllowSL='$c4', Emp_AllowPL='$c8', Emp_AllowEL='$c11', Emp_AllowMatL='$c6', Emp_TotalCL='$c15', Emp_TotalSL='$c5', Emp_TotalPL='$c9', Emp_TotalEL='$c12', Emp_BalanceCL='$c15', Emp_BalanceSL='$c5', Emp_BalancePL='$c9', Emp_BalanceEL='$c12' where EC='$c0'", $con); }
    else { $ctr++; }
   }
   fclose($handle);
   if($sql){ $msgLeave= 'Employee Leave Details uploaded successfully...';}
  }
 }
}


if(isset($_REQUEST['action']) && $_REQUEST['action']=="delete")
{
  $SqlDelete=mysql_query("delete from hrm_pms_appraisal_history WHERE CompanyId=".$_REQUEST['did'], $con) or die(mysql_error());
  if($SqlDelete) { echo '<script> alert("Data has been deleted successfully..."); window.location="ImportExcel.php";</script>'; }
}
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
<style> .font { color:#ffffff; font-family:Georgia; font-size:11px; width:350px;} .font1 { color:#ffffff;font-family:Georgia; font-size:11px; height:14px; width:125px; } 
.font2 { font-size:11px;width:260px;height:18px;} .font4 { color:#1FAD34; font-family:Georgia; font-size:15px;}
.span {display:none; font-family:Courier New; font-size:14px; }.span1 {display:block; font-family:Courier New; font-size:14px; }
.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;}
.SaveButton {background-image:url(images/save.gif); width:20px; height:20px; background-repeat:no-repeat; background-color:#FFFFFF; border-color:#FFFFFF; border-bottom:inherit;}
.EditSelect { font-family:Georgia; font-size:11px; width:120px; height:18px;}
.EditInput { font-family:Georgia; font-size:11px; width:150px; height:18px;}
.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}
</style>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<script type="text/javascript" src="js/MandatoryAjaxCall.js"></script>
<Script type="text/javascript">window.history.forward(1);</Script>
<script type="text/javascript" language="javascript">
function DeletedInsEmp(v)
{ var agree=confirm("Are you sure you want to delete Increment history!");
if (agree) { var x = "ImportExcel.php?action=delete&did="+v;  window.location=x;}}

function Del()
{ document.getElementById("IUnDel").style.display='block'; document.getElementById("IDel").style.display='none'; 
  document.getElementById("csv_file").disabled=false; document.getElementById("DeleteEmpInc").disabled=true;  document.getElementById("UpInc").disabled=false;
  Gen_UnDel(); Per_UnDel(); Con_UnDel(); Fam_UnDel(); All_UnDel(); Leave_UnDel();
}
function UnDel()
{ document.getElementById("IUnDel").style.display='none'; document.getElementById("IDel").style.display='block'; 
  document.getElementById("csv_file").disabled=true; document.getElementById("DeleteEmpInc").disabled=true;  document.getElementById("UpInc").disabled=true;}
  
function Gen_Del()
{ document.getElementById("Gen_IUnDel").style.display='block'; document.getElementById("Gen_IDel").style.display='none';  
  document.getElementById("General_csv_file").disabled=false; document.getElementById("Gen_DeleteEmp").disabled=true;  document.getElementById("Gen_Up").disabled=false;
  UnDel(); Per_UnDel(); Con_UnDel(); Fam_UnDel(); All_UnDel(); Leave_UnDel();
}
function Gen_UnDel()
{ document.getElementById("Gen_IUnDel").style.display='none'; document.getElementById("Gen_IDel").style.display='block';  
  document.getElementById("General_csv_file").disabled=true; document.getElementById("Gen_DeleteEmp").disabled=true;  document.getElementById("Gen_Up").disabled=true;}  
  
function Per_Del()
{ document.getElementById("Per_IUnDel").style.display='block'; document.getElementById("Per_IDel").style.display='none';  
  document.getElementById("Personal_csv_file").disabled=false; document.getElementById("Per_DeleteEmp").disabled=true;  document.getElementById("Per_Up").disabled=false;
  UnDel(); Gen_UnDel(); Con_UnDel(); Fam_UnDel(); All_UnDel(); Leave_UnDel();
}
function Per_UnDel()
{ document.getElementById("Per_IUnDel").style.display='none'; document.getElementById("Per_IDel").style.display='block';  
  document.getElementById("Personal_csv_file").disabled=true; document.getElementById("Per_DeleteEmp").disabled=true;  document.getElementById("Per_Up").disabled=true;}
  
function Con_Del()
{ document.getElementById("Con_IUnDel").style.display='block'; document.getElementById("Con_IDel").style.display='none';  
  document.getElementById("Contact_csv_file").disabled=false; document.getElementById("Con_DeleteEmp").disabled=true;  document.getElementById("Con_Up").disabled=false;
  UnDel(); Gen_UnDel(); Per_UnDel(); Fam_UnDel(); All_UnDel(); Leave_UnDel();
}
function Con_UnDel()
{ document.getElementById("Con_IUnDel").style.display='none'; document.getElementById("Con_IDel").style.display='block';  
  document.getElementById("Contact_csv_file").disabled=true; document.getElementById("Con_DeleteEmp").disabled=true;  document.getElementById("Con_Up").disabled=true;}   
  
function Fam_Del()
{ document.getElementById("Fam_IUnDel").style.display='block'; document.getElementById("Fam_IDel").style.display='none';  
  document.getElementById("Family_csv_file").disabled=false; document.getElementById("Fam_DeleteEmp").disabled=true;  document.getElementById("Fam_Up").disabled=false;
  UnDel(); Gen_UnDel(); Per_UnDel(); Con_UnDel(); All_UnDel(); Leave_UnDel();
}
function Fam_UnDel()
{ document.getElementById("Fam_IUnDel").style.display='none'; document.getElementById("Fam_IDel").style.display='block';  
  document.getElementById("Family_csv_file").disabled=true; document.getElementById("Fam_DeleteEmp").disabled=true;  document.getElementById("Fam_Up").disabled=true;}    
  
function All_Del()
{ document.getElementById("All_IUnDel").style.display='block'; document.getElementById("All_IDel").style.display='none';  
  document.getElementById("All_csv_file").disabled=false; document.getElementById("All_DeleteEmp").disabled=true;  document.getElementById("All_Up").disabled=false;
  UnDel(); Gen_UnDel(); Per_UnDel(); Con_UnDel(); Fam_UnDel(); Leave_UnDel();
}
function All_UnDel()
{ document.getElementById("All_IUnDel").style.display='none'; document.getElementById("All_IDel").style.display='block';  
  document.getElementById("All_csv_file").disabled=true; document.getElementById("All_DeleteEmp").disabled=true;  document.getElementById("All_Up").disabled=true;}    
  
function Leave_Del()
{ document.getElementById("Leave_IUnDel").style.display='block'; document.getElementById("Leave_IDel").style.display='none';  
  document.getElementById("Leave_csv_file").disabled=false; document.getElementById("Leave_DeleteEmp").disabled=true;  document.getElementById("Leave_Up").disabled=false;
  UnDel(); Gen_UnDel(); Per_UnDel(); Con_UnDel(); Fam_UnDel(); All_UnDel();
}
function Leave_UnDel()
{ document.getElementById("Leave_IUnDel").style.display='none'; document.getElementById("Leave_IDel").style.display='block';  
  document.getElementById("Leave_csv_file").disabled=true; document.getElementById("Leave_DeleteEmp").disabled=true;  document.getElementById("Leave_Up").disabled=true;}     
</script>

</head>
<body class="body">
<table class="table">
<tr>
 <td>
  <table class="menutable"><tr><td><?php if($_SESSION['login'] = true){ require_once("AMenu.php"); } ?></td></tr></table>
 </td>
</tr>
<tr>
 <td valign="top">
  <table width="100%" style="margin-top:0px;" border="0">
    <tr>
	  <td valign="top"><?php if($_SESSION['login'] = true){ require_once("AWelcome.php"); } ?></td>
	</tr>
	 <tr>
	  <td valign="top" align="center"  width="100%" id="MainWindow"><br>
<?php //************************************************************************************************************************************************************?>
<?php //**********************************************START*****START*****START******START******START***************************************************************?>
<?php //************************************************************************************************************************************************************?>
<table border="0" style="margin-top:0px; width:100%; height:300px;">
 <tr>
  <td align="left" height="20" valign="top" colspan="3">
   <table border="0">
    <tr>
	  <td align="right" width="200" class="heading"><u>Import CSV File</u> </td>
	  <td class="font4" style=" color:#B00000;">&nbsp;&nbsp;&nbsp;<b><i><?php echo $msg; ?></i></b></td>
	</tr>
   </table>
  </td>
 </tr>
<?php if(($_SESSION['UserType']=='S' OR $_SESSION['UserType']=='A') AND $_SESSION['login'] = true) { ?>	
 <tr>

 <td width="17">&nbsp;</td>
<?php //*********************************************** Open Department******************************************************?> 
<td align="left" id="type" valign="top" style="display:block; width:100%">             
   <table border="0" width="1150">
<tr>
  <td align="left" width="1150">
	 
	 <table width="" border="0">
	   <form name="FormInc" method="POST" enctype="multipart/form-data">
       <tr style="height:20px;">
	     <td style="font-family:Times New Roman; font-size:15px; color:#003300; width:150px; font-weight:bold;">(1) Increment :</td>
	     <td style="width:285px;"><input type="file" name="csv_file" id="csv_file" style="width:200px; background-color:#CEFFCE;" size="30" disabled/></td>
		  <td style="width:75px;"><input type="submit" name="SaveEmpInc" value="Upload" id="UpInc" disabled/></td>
		  <td width="1">&nbsp;</td>
		  <td style="font-family:Times New Roman; font-size:15px; color:#003300; width:70px; font-weight:bold;">Deleted :</td>
		  <td style="width:70px;"><input type="button" name="DeleteEmpInc" id="DeleteEmpInc" value="Delete" onClick="DeletedInsEmp(<?php echo $CompanyId; ?>)" disabled/></td>
		  <td><img src="images/checkbox_UnCheck.png" border="0" id="IUnDel" onClick="UnDel()" style="display:none;"/>
		      <img src="images/checkbox.png" border="0" id="IDel" onClick="Del()"/></td>
		  <td class="font4" style=" color:#B00000;">&nbsp;<b><i><?php echo $msgInc; ?></i></b></td>	  
	   </tr>
	   </form>
	   <form name="FormGeneral" method="POST" enctype="multipart/form-data" >
	   <tr style="height:20px;">
	     <td style="font-family:Times New Roman; font-size:15px; color:#003300; width:150px; font-weight:bold;">(2) General :</td>
	     <td style="width:285px;"><input type="file" name="General_csv_file" id="General_csv_file" style="width:200px; background-color:#CEFFCE;" size="30" disabled/></td>
		  <td style="width:75px;"><input type="submit" name="SaveEmpGeneral" value="Upload" id="Gen_Up" disabled/></td>
		  <td width="1">&nbsp;</td>
		  <td style="font-family:Times New Roman; font-size:15px; color:#003300; width:70px; font-weight:bold;">Deleted :</td>
		  <td style="width:70px;"><input type="button" name="Gen_DeleteEmp" id="Gen_DeleteEmp" value="Delete" onClick="Gen_DeletedEmp(<?php echo $CompanyId; ?>)" disabled/></td>
		  <td><img src="images/checkbox_UnCheck.png" border="0" id="Gen_IUnDel" onClick="Gen_UnDel()" style="display:none;"/>
		      <img src="images/checkbox.png" border="0" id="Gen_IDel" onClick="Gen_Del()"/></td>
		  <td class="font4" style=" color:#B00000;">&nbsp;<b><i><?php echo $msgGen; ?></i></b></td>		  
	   </tr>		
	   </form> 
	   <form name="FormPersonal" method="POST" enctype="multipart/form-data" >
	   <tr style="height:20px;">
	     <td style="font-family:Times New Roman; font-size:15px; color:#003300; width:150px; font-weight:bold;">(3) Personal :</td>
	     <td style="width:285px;"><input type="file" name="Personal_csv_file" id="Personal_csv_file" style="width:200px; background-color:#CEFFCE;" size="30" disabled/></td>
		  <td style="width:75px;"><input type="submit" name="SaveEmpPersonal" value="Upload" id="Per_Up" disabled/></td>
		  <td width="1">&nbsp;</td>
		  <td style="font-family:Times New Roman; font-size:15px; color:#003300; width:70px; font-weight:bold;">Deleted :</td>
		  <td style="width:70px;"><input type="button" name="Per_DeleteEmp" id="Per_DeleteEmp" value="Delete" onClick="Per_DeletedEmp(<?php echo $CompanyId; ?>)" disabled/></td>
		  <td><img src="images/checkbox_UnCheck.png" border="0" id="Per_IUnDel" onClick="Per_UnDel()" style="display:none;"/>
		      <img src="images/checkbox.png" border="0" id="Per_IDel" onClick="Per_Del()"/></td>
		  <td class="font4" style=" color:#B00000;">&nbsp;<b><i><?php echo $msgPer; ?></i></b></td>		  
	   </tr>		
	   </form> 
	   <form name="FormContact" method="POST" enctype="multipart/form-data">
	   <tr style="height:20px;">
	     <td style="font-family:Times New Roman; font-size:15px; color:#003300; width:150px; font-weight:bold;">(4) Contact :</td>
	     <td style="width:285px;"><input type="file" name="Contact_csv_file" id="Contact_csv_file" style="width:200px; background-color:#CEFFCE;" size="30" disabled/></td>
		  <td style="width:75px;"><input type="submit" name="SaveEmpContact" value="Upload" id="Con_Up" disabled/></td>
		  <td width="1">&nbsp;</td>
		  <td style="font-family:Times New Roman; font-size:15px; color:#003300; width:70px; font-weight:bold;">Deleted :</td>
		  <td style="width:70px;"><input type="button" name="Con_DeleteEmp" id="Con_DeleteEmp" value="Delete" onClick="Con_DeletedEmp(<?php echo $CompanyId; ?>)" disabled/></td>
		  <td><img src="images/checkbox_UnCheck.png" border="0" id="Con_IUnDel" onClick="Con_UnDel()" style="display:none;"/>
		      <img src="images/checkbox.png" border="0" id="Con_IDel" onClick="Con_Del()"/></td>
		  <td class="font4" style=" color:#B00000;">&nbsp;<b><i><?php echo $msgCon; ?></i></b></td>		  
	   </tr>		
	   </form> 
	   <form name="FormFamily" method="POST" enctype="multipart/form-data" >
	   <tr style="height:20px;">
	     <td style="font-family:Times New Roman; font-size:15px; color:#003300; width:150px; font-weight:bold;">(5) Family :</td>
	     <td style="width:285px;"><input type="file" name="Family_csv_file" id="Family_csv_file" style="width:200px; background-color:#CEFFCE;" size="30" disabled/></td>
		  <td style="width:75px;"><input type="submit" name="SaveEmpFamily" value="Upload" id="Fam_Up" disabled/></td>
		  <td width="1">&nbsp;</td>
		  <td style="font-family:Times New Roman; font-size:15px; color:#003300; width:70px; font-weight:bold;">Deleted :</td>
		  <td style="width:70px;"><input type="button" name="Fam_DeleteEmp" id="Fam_DeleteEmp" value="Delete" onClick="Fam_DeletedEmp(<?php echo $CompanyId; ?>)" disabled/></td>
		  <td><img src="images/checkbox_UnCheck.png" border="0" id="Fam_IUnDel" onClick="Fam_UnDel()" style="display:none;"/>
		      <img src="images/checkbox.png" border="0" id="Fam_IDel" onClick="Fam_Del()"/></td>
		  <td class="font4" style=" color:#B00000;">&nbsp;<b><i><?php echo $msgFam; ?></i></b></td>		  
	   </tr>		
	   </form>
	   <form name="FormAll" method="POST" enctype="multipart/form-data" >
	   <tr style="height:20px;">
	     <td style="font-family:Times New Roman; font-size:15px; color:#003300; width:150px; font-weight:bold;">(6) All Details:</td>
	     <td style="width:285px;"><input type="file" name="All_csv_file" id="All_csv_file" style="width:200px; background-color:#CEFFCE;" size="30" disabled/></td>
		 <td style="width:75px;"><input type="submit" name="SaveEmpAll" value="Upload" id="All_Up" disabled/></td>
		 <td width="1">&nbsp;</td>
		 <td style="font-family:Times New Roman; font-size:15px; color:#003300; width:70px; font-weight:bold;">Deleted :</td>
		 <td style="width:70px;"><input type="button" name="All_DeleteEmp" id="All_DeleteEmp" value="Delete" onClick="All_DeletedEmp(<?php echo $CompanyId; ?>)" disabled/></td>
		 <td><img src="images/checkbox_UnCheck.png" border="0" id="All_IUnDel" onClick="All_UnDel()" style="display:none;"/>
		     <img src="images/checkbox.png" border="0" id="All_IDel" onClick="All_Del()"/></td>
		 <td class="font4" style=" color:#B00000;">&nbsp;<b><i><?php echo $msgAll; ?></i></b></td>		  
	   </tr>		
	   </form>  
	   <form name="FormLeave" method="POST" enctype="multipart/form-data">
	   <tr style="height:20px;">
	     <td style="font-family:Times New Roman; font-size:15px; color:#003300; width:150px; font-weight:bold;">(6) Leave Details:</td>
	     <td style="width:285px;"><input type="file" name="Leave_csv_file" id="Leave_csv_file" style="width:200px; background-color:#CEFFCE;" size="30" disabled/></td>
		 <td style="width:75px;"><input type="submit" name="SaveEmpLeave" value="Upload" id="Leave_Up" disabled/></td>
		 <td width="1">&nbsp;</td>
		 <td style="font-family:Times New Roman; font-size:15px; color:#003300; width:70px; font-weight:bold;">Deleted :</td>
		 <td style="width:70px;"><input type="button" name="Leave_DeleteEmp" id="Leave_DeleteEmp" value="Delete" onClick="Leave_DeletedEmp(<?php echo $CompanyId; ?>)" disabled/></td>
		 <td><img src="images/checkbox_UnCheck.png" border="0" id="Leave_IUnDel" onClick="Leave_UnDel()" style="display:none;"/>
		     <img src="images/checkbox.png" border="0" id="Leave_IDel" onClick="Leave_Del()"/></td>
		 <td class="font4" style=" color:#B00000;">&nbsp;<b><i><?php echo $msgLeave; ?></i></b></td>		  
	   </tr>		
	   </form>  
	 </table>
	  
  </td>
</tr>
  </table>  
</td>
<?php //*********************************************** Close Department******************************************************?>    
 </tr> 
</table>
<?php } ?>
<?php //************************************************************************************************************************************************************?>
<?php //**********************************************END*****END*****END******END******END***************************************************************?>
<?php //************************************************************************************************************************************************************?>
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

