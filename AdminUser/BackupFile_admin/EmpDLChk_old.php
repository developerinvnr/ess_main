<?php
require_once('config/config.php');

if($_POST['For']=='ChkDLUser' && $_POST['Eid']!='' && $_POST['vv']!='')
{ 
  $Du=mysql_query("update hrm_employee_general set Req_DrivLic='".$_POST['vv']."' where EmployeeID=".$_POST['Eid'],$con); 
  if($Du){ echo '<input type="hidden"  id="ChkV" value="1"  />'; }else{echo '<input type="hidden"  id="ChkV" value="0"  />'; }
  echo '<input type="hidden"  id="ChkVEmp" value='.$_POST['Eid'].'  />';
  echo '<input type="hidden"  id="ChkVvv" value='.$_POST['vv'].'  />';
}



if($_POST['For']=='ChkOnLineExamUser' && $_POST['Eid']!='' && $_POST['vv']!='')
{ 
  $Du=mysql_query("update hrm_employee_general set exam_allow='".$_POST['vv']."' where EmployeeID=".$_POST['Eid'],$con); 
  if($Du){ echo '<input type="hidden"  id="ChkV" value="1"  />'; }else{echo '<input type="hidden"  id="ChkV" value="0"  />'; }
  echo '<input type="hidden"  id="ChkVEmp" value='.$_POST['Eid'].'  />';
  echo '<input type="hidden"  id="ChkVvv" value='.$_POST['vv'].'  />';
}


if($_POST['For']=='ChkKRAUnBlock' && $_POST['Eid']!='' && $_POST['vv']!='')
{ 
  $Du=mysql_query("update hrm_employee_general set KRAUnBlock='".$_POST['vv']."' where EmployeeID=".$_POST['Eid'],$con); 
  if($Du){ echo '<input type="hidden"  id="ChkV" value="1"  />'; }else{echo '<input type="hidden"  id="ChkV" value="0"  />'; }
  echo '<input type="hidden"  id="ChkVEmp" value='.$_POST['Eid'].'  />';
  echo '<input type="hidden"  id="ChkVvv" value='.$_POST['vv'].'  />';
}


elseif($_POST['For']=='ChkUseApps' && $_POST['Eid']!='' && $_POST['vv']!='')
{ 
  $Du=mysql_query("update hrm_employee set UseApps='".$_POST['vv']."' where EmployeeID=".$_POST['Eid'],$con); 
  if($Du){ echo '<input type="hidden"  id="ChkV" value="1"  />'; }else{echo '<input type="hidden"  id="ChkV" value="0"  />'; }
  echo '<input type="hidden"  id="ChkVEmp" value='.$_POST['Eid'].'  />';
  echo '<input type="hidden"  id="ChkVvv" value='.$_POST['vv'].'  />';
}



elseif($_POST['For']=='ChkMoveRep' && $_POST['Eid']!='' && $_POST['vv']!='')
{ 
    define('HOST','localhost'); define('USER','vnrseed2_hr');	
    define('PASS','vnrhrims321'); define('DATABASE1','vnrseed2_hrims');
	
	//define('USER2','vnressus_hrims_user'); define('PASS2','hrims@192');
	//define('DATABASE2','vnressus_hrims');
	
 if($_POST['vv']=='Y')
 {  
    $con=mysql_connect(HOST,USER,PASS); $db=mysql_select_db(DATABASE1, $con);
    $sql=mysql_query("select e.*,g.*,p.* from hrm_employee e inner join hrm_employee_general g on e.EmployeeID=g.EmployeeID inner join hrm_employee_personal p on e.EmployeeID=p.EmployeeID where e.EmployeeID=".$_POST['Eid'],$con);
	if($sql)
	{
	 $res=mysql_fetch_assoc($sql);
	 
	 //$con2=mysql_connect('https://184.168.127.72',USER2,PASS2); $db2=mysql_select_db(DATABASE2, $con2);
	 $InsE = mysql_query("insert into hrm_employee(EmployeeID, VCode, EmpCode, EmpPass, EmpType, EmpStatus, Fname, Sname, Lname, RetiStatus, RetiDate, RetiNewCode, RetiOldCode, Nname, TimeApply, Shift, InTime, OutTime, ChangePwd, Resig_Permission, DateOfResignation, DateOfSepration, ProfileCertify, ScalateKRA, SubmitSelfAsset, EmpGen_Status, EmpPer_Status, EmpCon_Status, EmpEdu_Status, EmpFam_Status, EmpExp_Status, EmpLang_Status, EmpAss_Status, EmpGen_Noc, EmpPer_Noc, EmpCon_Noc, EmpEdu_Noc, EmpFam_Noc, EmpExp_Noc, EmpLang_Noc, EmpAss_Noc, ExtraChangeStatus, ExtraChange, tokenid, CompanyId, CreatedBy, CreatedDate)values(".$_POST['Eid'].", '',".$res['EmpCode'].", '".$res['EmpPass']."', '".$res['EmpType']."', '".$res['EmpStatus']."', '".$res['Fname']."', '".$res['Sname']."', '".$res['Lname']."', '".$res['RetiStatus']."', '".$res['RetiDate']."', '".$res['RetiNewCode']."', '".$res['RetiOldCode']."', '".$res['Nname']."', '".$res['TimeApply']."', '".$res['Shift']."', '".$res['InTime']."', '".$res['OutTime']."', '".$res['ChangePwd']."', '".$res['Resig_Permission']."', '".$res['DateOfResignation']."', '".$res['DateOfSepration']."', '".$res['ProfileCertify']."', '".$res['ScalateKRA']."', '".$res['SubmitSelfAsset']."', '".$res['EmpGen_Status']."', '".$res['EmpPer_Status']."', '".$res['EmpCon_Status']."', '".$res['EmpEdu_Status']."', '".$res['EmpFam_Status']."', '".$res['EmpExp_Status']."', '".$res['EmpLang_Status']."', '".$res['EmpAss_Status']."', '".$res['EmpGen_Noc']."', '".$res['EmpPer_Noc']."', '".$res['EmpCon_Noc']."', '".$res['EmpEdu_Noc']."', '".$res['EmpFam_Noc']."', '".$res['EmpExp_Noc']."', '".$res['EmpLang_Noc']."', '".$res['EmpAss_Noc']."', '".$res['ExtraChangeStatus']."', '".$res['ExtraChange']."', '".$res['tokenid']."', 11, ".$_REQUEST['Uid'].", '".date("Y-m-d")."')", $con2);
	 
	 
	 if($InsE)
	 {
	   $InsG = mysql_query("insert into hrm_employee_general(EmployeeID, EC, FileNo, DateJoining, DateConfirmationYN, ConfirmHR, DateConfirmation, ConfirmMonth, ConfirmMailNofT, DOB, DOB_dm, GradeId, CostCenter, HqId, DepartmentId, DesigId, DesigId2, PositionCode, EmailId_Vnr, MobileNo_Vnr, MobileNo2_Vnr, VNRExpYear, VNRExpMonth, PreviousExpYear, PreviousExpMonth, TotalExp, BankName, BranchName, AccountNo, BranchAdd, BankName2, BranchName2, AccountNo2, BranchAdd2, BankIfscCode, BankIfscCode2, PaymentType, InsuCardNo, PfAccountNo, PF_UAN, EsicAllow, EsicNo, RepEmployeeID, ReportingName, ReportingDesigId, ReportingContactNo, ReportingEmailId, Category, Section, AttMobileNo1, AttMobileNo2, EmpVertical, BWageId, Req_DrivLic, Covid_19, Covid_19Date, CreatedBy, CreatedDate, SysDate) values('".$_POST['Eid']."', 0, '".$res['FileNo']."', '".$res['DateJoining']."', '".$res['DateConfirmationYN']."', '".$res['ConfirmHR']."', '".$res['DateConfirmation']."', '".$res['ConfirmMonth']."', '".$res['ConfirmMailNofT']."', '".$res['DOB']."', '".$res['DOB_dm']."', '".$res['GradeId']."', '".$res['CostCenter']."', '".$res['HqId']."', '".$res['DepartmentId']."', '".$res['DesigId']."', '".$res['DesigId2']."', '".$res['PositionCode']."', '".$res['EmailId_Vnr']."', '".$res['MobileNo_Vnr']."', '".$res['MobileNo2_Vnr']."', '".$res['VNRExpYear']."', '".$res['VNRExpMonth']."', '".$res['PreviousExpYear']."', '".$res['PreviousExpMonth']."', '".$res['TotalExp']."', '".$res['BankName']."', '".$res['BranchName']."', '".$res['AccountNo']."', '".$res['BranchAdd']."', '".$res['BankName2']."', '".$res['BranchName2']."', '".$res['AccountNo2']."', '".$res['BranchAdd2']."', '".$res['BankIfscCode']."', '".$res['BankIfscCode2']."', '".$res['PaymentType']."', '".$res['InsuCardNo']."', '".$res['PfAccountNo']."', '".$res['PF_UAN']."', '".$res['EsicAllow']."', '".$res['EsicNo']."', '".$res['RepEmployeeID']."', '".$res['ReportingName']."', '".$res['ReportingDesigId']."', '".$res['ReportingContactNo']."', '".$res['ReportingEmailId']."', '".$res['Category']."', '".$res['Section']."', '".$res['AttMobileNo1']."', '".$res['AttMobileNo2']."', '".$res['EmpVertical']."', '".$res['BWageId']."', '".$res['Req_DrivLic']."', '".$res['Covid_19']."', '".$res['Covid_19Date']."',  ".$_REQUEST['Uid'].", '".date("Y-m-d")."', '".date("Y-m-d")."')", $con2);
	   
	   
	   $InsP = mysql_query("insert into hrm_employee_personal(EmployeeID, EC, Gender, Religion, AadharNo, DR, BloodGroup, SeniorCitizen, MetroCity, MobileNo, PhoneNo, EmailId_Self, PanNo, PanNo_YN, PassportNo, PassportNo_YN, Passport_ExpiryDateFrom, Passport_ExpiryDateTo, DrivingLicNo, DrivingLicNo_YN, Driv_ExpiryDateFrom, Driv_ExpiryDateTo, Qualification, Married, MarriageDate, MarriageDate_dm, Widow, Divorce, Warm_WelC_Oth, CreatedBy,	CreatedDate)values('".$_POST['Eid']."', 0, '".$res['Gender']."', '".$res['Religion']."', '".$res['AadharNo']."', '".$res['DR']."', '".$res['BloodGroup']."', '".$res['SeniorCitizen']."', '".$res['MetroCity']."', '".$res['MobileNo']."', '".$res['PhoneNo']."', '".$res['EmailId_Self']."', '".$res['PanNo']."', '".$res['PanNo_YN']."', '".$res['PassportNo']."', '".$res['PassportNo_YN']."', '".$res['Passport_ExpiryDateFrom']."', '".$res['Passport_ExpiryDateTo']."', '".$res['DrivingLicNo']."', '".$res['DrivingLicNo_YN']."', '".$res['Driv_ExpiryDateFrom']."', '".$res['Driv_ExpiryDateTo']."', '".$res['Qualification']."', '".$res['Married']."', '".$res['MarriageDate']."', '".$res['MarriageDate_dm']."', '".$res['Widow']."', '".$res['Divorce']."', '".$res['Warm_WelC_Oth']."', ".$_REQUEST['Uid'].", '".date("Y-m-d")."')", $con2);
	   
	   
	   $InsPh = mysql_query("insert into hrm_employee_photo(EmployeeID,EC)values(".$_POST['Eid'].",0)", $con2); 
 	   $InsC = mysql_query("insert into hrm_employee_contact(EmployeeID,EC)values(".$_POST['Eid'].",0)", $con2);    
	   $InsF = mysql_query("insert into hrm_employee_family(EmployeeID,EC)values(".$_POST['Eid'].",0)", $con2);    
	   $InsEl = mysql_query("insert into hrm_employee_eligibility(EmployeeID,EC)values(".$_POST['Eid'].",0)", $con2); 
	   $InsCt = mysql_query("insert into hrm_employee_ctc(EmployeeID,EC)values(".$_POST['Eid'].",0)", $con2); 
	   $InsEx = mysql_query("insert into hrm_employee_experience(EmployeeID,EC)values(".$_POST['Eid'].",0)", $con2);
	   $Inso=mysql_query("insert into hrm_opinion(EmployeeID, OpenionName) values(".$_POST['Eid'].", 'jsy')",$con2);
	   
	   $con=mysql_connect(HOST,USER,PASS); $db=mysql_select_db(DATABASE1, $con);
	   $Du=mysql_query("update hrm_employee set MoveRep='".$_POST['vv']."' where EmployeeID=".$_POST['Eid'],$con); 
       if($Du){ echo '<input type="hidden"  id="ChkV" value="1"  />'; }
       else{echo '<input type="hidden"  id="ChkV" value="0"  />'; }
	 
	 } //if($InsE)
	 
	} //if($sql)
	
  
  } //if($_POST['vv']=='Y')	
  elseif($_POST['vv']=='N')
  { 
    //$con2=mysql_connect('https://184.168.127.72',USER2,PASS2); 
    $db2=mysql_select_db(DATABASE2, $con2);
    
    $DelE = mysql_query("delete from hrm_employee where EmployeeID=".$_POST['Eid'], $con2);
	$DelG = mysql_query("delete from hrm_employee_general where EmployeeID=".$_POST['Eid'], $con2);
	$DelP = mysql_query("delete from hrm_employee_personal where EmployeeID=".$_POST['Eid'], $con2);
    $DelPh = mysql_query("delete from hrm_employee_photo where EmployeeID=".$_POST['Eid'], $con2); 
 	$DelC = mysql_query("delete from hrm_employee_contact where EmployeeID=".$_POST['Eid'], $con2);    
	$DelF = mysql_query("delete from hrm_employee_family where EmployeeID=".$_POST['Eid'], $con2);    
	$DelEl = mysql_query("delete from hrm_employee_eligibility where EmployeeID=".$_POST['Eid'], $con2); 
	$DelCt = mysql_query("delete from hrm_employee_ctc where EmployeeID=".$_POST['Eid'], $con2); 
	$DelEx = mysql_query("delete from hrm_employee_experience where EmployeeID=".$_POST['Eid'], $con2);
	$Delo=mysql_query("delete from hrm_opinion where EmployeeID=".$_POST['Eid']." AND OpenionName='jsy'",$con2);
	
	
	if($DelE)
	{
	   $con=mysql_connect(HOST,USER,PASS); $db=mysql_select_db(DATABASE1, $con);
	   $Du=mysql_query("update hrm_employee set MoveRep='".$_POST['vv']."' where EmployeeID=".$_POST['Eid'],$con); 
       if($Du){ echo '<input type="hidden"  id="ChkV" value="1"  />'; }
       else{echo '<input type="hidden"  id="ChkV" value="0"  />'; }
	} //if($DelE)
  }
  
  echo '<input type="hidden"  id="ChkVEmp" value='.$_POST['Eid'].'  />';
  echo '<input type="hidden"  id="ChkVvv" value='.$_POST['vv'].'  />';
  
}

?>
