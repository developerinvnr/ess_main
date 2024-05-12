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


elseif($_POST['For']=='ChkUseCovid' && $_POST['Eid']!='' && $_POST['vv']!='')
{ 
  $Du=mysql_query("update hrm_employee set Unblock_Covid='".$_POST['vv']."' where EmployeeID=".$_POST['Eid'],$con); 
  if($Du){ echo '<input type="hidden"  id="ChkV" value="1"  />'; }else{echo '<input type="hidden"  id="ChkV" value="0"  />'; }
  echo '<input type="hidden"  id="ChkVEmp" value='.$_POST['Eid'].'  />';
  echo '<input type="hidden"  id="ChkVvv" value='.$_POST['vv'].'  />';
}



elseif($_POST['For']=='ChkMoveRep' && $_POST['Eid']!='' && $_POST['vv']!='')
{ 
    	
 if($_POST['vv']=='Y')
 {      
    $sql=mysql_query("select e.*,g.*,p.* from hrm_employee e inner join hrm_employee_general g on e.EmployeeID=g.EmployeeID inner join hrm_employee_personal p on e.EmployeeID=p.EmployeeID where e.EmployeeID=".$_POST['Eid'],$con);
	if($sql)
	{
	 $res=mysql_fetch_assoc($sql);
	 
	 $earr = array();
	 $arr = array(
	 'Action'=> 'DataMoveToVess',
	 'vv'=> 'Y',
	 'EmployeeID'=> $_POST['Eid'], 
	 'EmpCode'=> $res['EmpCode'],
	 'EmpPass'=> $res['EmpPass'],
	 'EmpType'=> $res['EmpType'],
	 'EmpStatus'=> $res['EmpStatus'],
	 'Fname'=> $res['Fname'],
	 'Sname'=> $res['Sname'],
	 'Lname'=> $res['Lname'],
	 'RetiStatus'=> $res['RetiStatus'],
	 'RetiDate'=> $res['RetiDate'],
	 'RetiNewCode'=> $res['RetiNewCode'],
	 'RetiOldCode'=> $res['RetiOldCode'],
	 'Nname'=> $res['Nname'],
	 'TimeApply'=> $res['TimeApply'],
	 'Shift'=> $res['Shift'],
	 'InTime'=> $res['InTime'],
	 'OutTime'=> $res['OutTime'],
	 'ChangePwd'=> $res['ChangePwd'],
	 'Resig_Permission'=> $res['Resig_Permission'],
	 'DateOfResignation'=> $res['DateOfResignation'],
	 'DateOfSepration'=> $res['DateOfSepration'],
	 'ProfileCertify'=> $res['ProfileCertify'],
	 'ScalateKRA'=> $res['ScalateKRA'],
	 'SubmitSelfAsset'=> $res['SubmitSelfAsset'],
	 'EmpGen_Status'=> $res['EmpGen_Status'],
	 'EmpPer_Status'=> $res['EmpPer_Status'],
	 'EmpCon_Status'=> $res['EmpCon_Status'],
	 'EmpEdu_Status'=> $res['EmpEdu_Status'],
	 'EmpFam_Status'=> $res['EmpFam_Status'],
	 'EmpExp_Status'=> $res['EmpExp_Status'],
	 'EmpLang_Status'=> $res['EmpLang_Status'],
	 'EmpAss_Status'=> $res['EmpAss_Status'],
	 'EmpGen_Noc'=> $res['EmpGen_Noc'],
	 'EmpPer_Noc'=> $res['EmpPer_Noc'],
	 'EmpCon_Noc'=> $res['EmpCon_Noc'],
	 'EmpEdu_Noc'=> $res['EmpEdu_Noc'],
	 'EmpFam_Noc'=> $res['EmpFam_Noc'],
	 'EmpExp_Noc'=> $res['EmpExp_Noc'],
	 'EmpLang_Noc'=> $res['EmpLang_Noc'],
	 'EmpAss_Noc'=> $res['EmpAss_Noc'],
	 'ExtraChangeStatus'=> $res['ExtraChangeStatus'],
	 'ExtraChange'=> $res['ExtraChange'],
	 'tokenid'=> $res['tokenid'],
	 'CompanyId'=> 11,
	 'CreatedBy'=> $_REQUEST['Uid'],
	                                          
	 //General
	 'FileNo'=> $res['FileNo'],
	 'DateJoining'=> $res['DateJoining'],
	 'DateConfirmationYN'=> $res['DateConfirmationYN'],
	 'ConfirmHR'=> $res['ConfirmHR'],
	 'DateConfirmation'=> $res['DateConfirmation'],
	 'ConfirmMonth'=> $res['ConfirmMonth'],
	 'ConfirmMailNofT'=> $res['ConfirmMailNofT'],
	 'DOB'=> $res['DOB'],
	 'DOB_dm'=> $res['DOB_dm'],
	 'GradeId'=> $res['GradeId'],
	 'CostCenter'=> $res['CostCenter'],
	 'HqId'=> $res['HqId'],
	 'DepartmentId'=> $res['DepartmentId'],
	 'DesigId'=> $res['DesigId'],
	 'DesigId2'=> $res['DesigId2'],
	 'PositionCode'=> $res['PositionCode'],
	 'EmailId_Vnr'=> $res['EmailId_Vnr'],
	 'MobileNo_Vnr'=> $res['MobileNo_Vnr'],
	 'MobileNo2_Vnr'=> $res['MobileNo2_Vnr'],
	 'VNRExpYear'=> $res['VNRExpYear'],
	 'VNRExpMonth'=> $res['VNRExpMonth'],
	 'PreviousExpYear'=> $res['PreviousExpYear'],
	 'PreviousExpMonth'=> $res['PreviousExpMonth'],
	 'TotalExp'=> $res['TotalExp'],
	 'BankName'=> $res['BankName'],
	 'BranchName'=> $res['BranchName'],
	 'AccountNo'=> $res['AccountNo'],
	 'BranchAdd'=> $res['BranchAdd'],
	 'BankName2'=> $res['BankName2'],
	 'BranchName2'=> $res['BranchName2'],
	 'AccountNo2'=> $res['AccountNo2'],
	 'BranchAdd2'=> $res['BranchAdd2'],
	 'BankIfscCode'=> $res['BankIfscCode'],
	 'BankIfscCode2'=> $res['BankIfscCode2'],
	 'PaymentType'=> $res['PaymentType'],
	 'InsuCardNo'=> $res['InsuCardNo'],
	 'PfAccountNo'=> $res['PfAccountNo'],
	 'PF_UAN'=> $res['PF_UAN'],
	 'EsicAllow'=> $res['EsicAllow'],
	 'EsicNo'=> $res['EsicNo'],
	 'RepEmployeeID'=> $res['RepEmployeeID'],
	 'ReportingName'=> $res['ReportingName'],
	 'ReportingDesigId'=> $res['ReportingDesigId'],
	 'ReportingContactNo'=> $res['ReportingContactNo'],
	 'ReportingEmailId'=> $res['ReportingEmailId'],
	 'Category'=> $res['Category'],
	 'Section'=> $res['Section'],
	 'AttMobileNo1'=> $res['AttMobileNo1'],
	 'AttMobileNo2'=> $res['AttMobileNo2'],
	 'EmpVertical'=> $res['EmpVertical'],
	 'BWageId'=> $res['BWageId'],
	 'Req_DrivLic'=> $res['Req_DrivLic'],
	 'Covid_19'=> $res['Covid_19'],
	 'Covid_19Date'=> $res['Covid_19Date'],                                                
	 
	 //Personal
	 'Gender'=> $res['Gender'],
	 'Religion'=> $res['Religion'],
	 'AadharNo'=> $res['AadharNo'],
	 'DR'=> $res['DR'],
	 'BloodGroup'=> $res['BloodGroup'],
	 'SeniorCitizen'=> $res['SeniorCitizen'],
	 'MetroCity'=> $res['MetroCity'],
	 'MobileNo'=> $res['MobileNo'],
	 'PhoneNo'=> $res['PhoneNo'],
	 'EmailId_Self'=> $res['EmailId_Self'],
	 'PanNo'=> $res['PanNo'],
	 'PanNo_YN'=> $res['PanNo_YN'],
	 'PassportNo'=> $res['PassportNo'],
	 'PassportNo_YN'=> $res['PassportNo_YN'],
	 'Passport_ExpiryDateFrom'=> $res['Passport_ExpiryDateFrom'],
	 'Passport_ExpiryDateTo'=> $res['Passport_ExpiryDateTo'],
	 'DrivingLicNo'=> $res['DrivingLicNo'],
	 'DrivingLicNo_YN'=> $res['DrivingLicNo_YN'],
	 'Driv_ExpiryDateFrom'=> $res['Driv_ExpiryDateFrom'],
	 'Driv_ExpiryDateTo'=> $res['Driv_ExpiryDateTo'],
	 'Qualification'=> $res['Qualification'],
	 'Married'=> $res['Married'],
	 'MarriageDate'=> $res['MarriageDate'],
	 'MarriageDate_dm'=> $res['MarriageDate_dm'],
	 'Widow'=> $res['Widow'],
	 'Divorce'=> $res['Divorce'],
	 'Warm_WelC_Oth'=> $res['Warm_WelC_Oth'],
	 
	  );
      array_push($earr,$arr);
      $data['emp_personal_detail'] = $earr;
      $json_response = json_encode($data);
     
      $url = 'https://www.vnress.in/AdminUser/api/ESSToVESS.php';
      $ch = curl_init($url);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $json_response);
      curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      $result = curl_exec($ch);
      curl_close($ch);
      $rdata = json_decode($result);
      $sts = $rdata->Status;
	  
	  if($sts == 'Moved')
	  { 
	    $Du=mysql_query("update hrm_employee set MoveRep='".$_POST['vv']."' where EmployeeID=".$_POST['Eid'],$con); 
	    echo '<input type="hidden"  id="ChkV" value="1"  />'; 
	  } 
	  else{ echo '<input type="hidden"  id="ChkV" value="0"  />'; } 
	
	 
	} //if($sql)
	
  
 } //if($_POST['vv']=='Y')	
 elseif($_POST['vv']=='N')
 { 
    
    $earr = array();
	$arr = array(
	'Action'=> 'DataMoveToVess',
	'vv'=> 'N',
	'EmployeeID'=> $_POST['Eid'],
	
	);
      array_push($earr,$arr);
      $data['emp_personal_detail'] = $earr;
      $json_response = json_encode($data);
     
      $url = 'https://www.vnress.in/AdminUser/api/ESSToVESS.php';
      $ch = curl_init($url);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $json_response);
      curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      $result = curl_exec($ch);
      curl_close($ch);
      $rdata = json_decode($result);
      $sts = $rdata->Status;
	  
	  if($sts == 'Moved')
	  { 
	    $Du=mysql_query("update hrm_employee set MoveRep='".$_POST['vv']."' where EmployeeID=".$_POST['Eid'],$con);
	    echo '<input type="hidden"  id="ChkV" value="1"  />'; 
	  } 
	  else{ echo '<input type="hidden"  id="ChkV" value="0"  />'; } 
	
 } //elseif($_POST['vv']=='N')
  
 echo '<input type="hidden"  id="ChkVEmp" value='.$_POST['Eid'].'  />';
 echo '<input type="hidden"  id="ChkVvv" value='.$_POST['vv'].'  />';
  
}

?>
