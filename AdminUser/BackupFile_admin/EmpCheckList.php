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
if(isset($_POST['EditCheckListE']))
{  
   $sql=mysql_query("update hrm_employee_checklist set Particular_PerHisForm='".$_POST['PerHisForm']."', Particular_PerHisForm_Remark='".$_POST['PerHisForm_Remark']."', Particular_MedicalDeclForm='".$_POST['MedicalDeclForm']."', Particular_BloodGroupReport='".$_POST['BloodGroupReport']."', Particular_MedicalBlood_Remark='".$_POST['MedicalBlood_Remark']."', Particular_Photograph='".$_POST['Photograph']."', Particular_Photograph_Remark='".$_POST['Photograph_Remark']."', Particular_LetestResume='".$_POST['LetestResume']."', Particular_InterviewAssSheet='".$_POST['InterviewAssSheet']."', Particular_ResumeInterview_Remark='".$_POST['ResumeInterview_Remark']."', Particular_OfferLetDulySign='".$_POST['OfferLetDulySign']."', Particular_OfferLetDulySign_Remark='".$_POST['OfferLetDulySign_Remark']."', Particular_AppointmentDulySign='".$_POST['AppointmentDulySign']."', Particular_AppointmentDulySign_Remark='".$_POST['AppointmentDulySign_Remark']."', Edu_10Certificate='".$_POST['10Certificate']."', Edu_10Certificate_Remark='".$_POST['10Certificate_Remark']."', Edu_12Certificate='".$_POST['12Certificate']."', Edu_12Certificate_Remark='".$_POST['12Certificate_Remark']."', Edu_GCertificate='".$_POST['GCertificate']."', Edu_GCertificate_Remark='".$_POST['GCertificate_Remark']."', Edu_PGCertificate='".$_POST['PGCertificate']."', Edu_PGCertificate_Remark='".$_POST['PGCertificate_Remark']."', Edu_AnyOtherCertificate='".$_POST['AnyOtherCertificate']."', Edu_AnyOtherCertificate_Remark='".$_POST['AnyOtherCertificate_Remark']."', PComDetail_Fresher='".$_POST['Fresher']."', PComDetail_Com1='".$_POST['Com1']."', PComDetail_Com2='".$_POST['Com2']."', PComDetail_Com3='".$_POST['Com3']."', PComDetail_Offer_Letter='".$_POST['Offer_Letter']."', PComDetail_Appoint_Letter='".$_POST['Appoint_Letter']."', PComDetail_Appraisal_Letter='".$_POST['Appraisal_Letter']."', PComDetail_Exp_Letter='".$_POST['Exp_Letter']."', PComDetail_OffAppAppExp_Remark='".$_POST['OffAppAppExp_Remark']."', PComDetail_SalaryAnnexure='".$_POST['SalaryAnnexure']."', PComDetail_LastPaySlip='".$_POST['LastPaySlip']."', PComDetail_SalaryCertificate='".$_POST['SalaryCertificate']."', PComDetail_SalLastSal_Remark='".$_POST['SalLastSal_Remark']."', PComDetail_Relieving_Letter='".$_POST['Relieving_Letter']."', PComDetail_ResignationAcceptance_Letter='".$_POST['ResignationAcceptance_Letter']."', PComDetail_NoDuesCertificate='".$_POST['NoDuesCertificate']."', PComDetail_RelResNoD_Remark='".$_POST['RelResNoD_Remark']."', DeclAndNomin_ProvidentAndPension_Fund='".$_POST['ProvidentAndPension_Fund']."', DeclAndNomin_ProvidentAndPension_Fund_Remark='".$_POST['ProvidentAndPension_Fund_Remark']."', DeclAndNomin_Gratuity='".$_POST['Gratuity']."', DeclAndNomin_Gratuity_Remark='".$_POST['Gratuity_Remark']."', DeclAndNomin_AssestDeclaration_Form='".$_POST['AssestDeclaration_Form']."', DeclAndNomin_AssestDeclaration_Form_Remark='".$_POST['AssestDeclaration_Form_Remark']."', AddProof_ElecBill='".$_POST['ElecBill']."', AddProof_Domicile='".$_POST['Domicile']."', AddProof_VoterID='".$_POST['VoterID']."', AddProof_PhoneBill='".$_POST['PhoneBill']."', AddProof_BankPassBook='".$_POST['BankPassBook']."', AddProof_RationCard='".$_POST['RationCard']."', AddProof_PassPort='".$_POST['AddPassPort']."', AddProof_AllRemark='".$_POST['AddProof_AllRemark']."', IDProof_License='".$_POST['License']."', IDProof_PanCard='".$_POST['PanCard']."', IDProof_PassPort='".$_POST['IDPassPort']."', IDProof_VoterId='".$_POST['VoterId']."', IDProof_AdharCard='".$_POST['AdharCard']."', IDProof_CastCerti='".$_POST['CastCerti']."', IDProof_AllRemark='".$_POST['IDProof_AllRemark']."', CarProgress_ConfirmationAss_Letter='".$_POST['ConfirmationAss_Letter']."', CarProgress_ConfirmationAss_Letter_Remark='".$_POST['ConfirmationAss_Letter_Remark']."', CarProgress_AppraisalLetterAndPMS_Form='".$_POST['AppraisalLetterAndPMS_Form']."', CarProgress_AppraisalLetterAndPMS_Form_Remark='".$_POST['AppraisalLetterAndPMS_Form_Remark']."', CarProgress_Transfer_Letter='".$_POST['Transfer_Letter']."', CarProgress_Transfer_Letter_Remark='".$_POST['Transfer_Letter_Remark']."', CarProgress_DesigGradeRoleChange_Letter='".$_POST['DesigGradeRoleChange_Letter']."', CarProgress_DesigGradeRoleChange_Letter_Remark='".$_POST['DesigGradeRoleChange_Letter_Remark']."', vehicle_AgreementForm='".$_POST['VehiAgreeForm']."', vehicle_AgreementForm_Remark='".$_POST['VehiAgreeForm_Remark']."', Particular_Covid19V_Dose1='".$_POST['Dose1']."', Particular_Covid19V_Dose2='".$_POST['Dose2']."', CarProgress_GovtScheme_APY='".$_POST['APY']."', CarProgress_GovtScheme_PMJJBY='".$_POST['PMJJBY']."', CarProgress_GovtScheme_PMSBY='".$_POST['PMSBY']."', CarProgress_GovtScheme_Remark='".$_POST['CarProgress_GovtScheme_Remark']."', AnyOther='".$_POST['AnyOther']."', AnyOther2='".$_POST['AnyOther2']."', CreatedBy='".$UserId."', CreatedDate='".date("Y-m-d")."', YearId='".$YearId."' where EmployeeID=".$EMPID, $con); if($sql){$msg='Employee Checklist Updated Successfully...! ';}   
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
function EditCheckList()
{ document.getElementById("PerHisForm").disabled=false; document.getElementById("PerHisForm_Remark").disabled=false;  document.getElementById("MedicalDeclForm").disabled=false;  document.getElementById("BloodGroupReport").disabled=false;  document.getElementById("MedicalBlood_Remark").disabled=false;  document.getElementById("Photograph").disabled=false;  document.getElementById("Photograph_Remark").disabled=false;  document.getElementById("LetestResume").disabled=false;  document.getElementById("InterviewAssSheet").disabled=false;  document.getElementById("ResumeInterview_Remark").disabled=false;  document.getElementById("OfferLetDulySign").disabled=false;  document.getElementById("OfferLetDulySign_Remark").disabled=false;  document.getElementById("AppointmentDulySign").disabled=false;  document.getElementById("AppointmentDulySign_Remark").disabled=false;  document.getElementById("10Certificate").disabled=false;  document.getElementById("10Certificate_Remark").disabled=false;  document.getElementById("12Certificate").disabled=false;  document.getElementById("12Certificate_Remark").disabled=false;  document.getElementById("GCertificate").disabled=false;  document.getElementById("GCertificate_Remark").disabled=false;  document.getElementById("PGCertificate").disabled=false;  document.getElementById("PGCertificate_Remark").disabled=false;  document.getElementById("AnyOtherCertificate").disabled=false;  document.getElementById("AnyOtherCertificate_Remark").disabled=false; document.getElementById("Fresher").disabled=false; document.getElementById("RelResNoD_Remark").disabled=false;  document.getElementById("ProvidentAndPension_Fund").disabled=false;  document.getElementById("ProvidentAndPension_Fund_Remark").disabled=false;  document.getElementById("EmpStateInsu").disabled=true;  document.getElementById("EmpStateInsu_Remark").disabled=true;  document.getElementById("Gratuity").disabled=false;  document.getElementById("Gratuity_Remark").disabled=false;  document.getElementById("AssestDeclaration_Form").disabled=false;  document.getElementById("AssestDeclaration_Form_Remark").disabled=false;  document.getElementById("ElecBill").disabled=false;  document.getElementById("Domicile").disabled=false;  document.getElementById("VoterID").disabled=false; document.getElementById("AdharCard").disabled=false; document.getElementById("CastCerti").disabled=false;  document.getElementById("PhoneBill").disabled=false;  document.getElementById("BankPassBook").disabled=false;  document.getElementById("RationCard").disabled=false;  document.getElementById("AddPassPort").disabled=false;  document.getElementById("AddProof_AllRemark").disabled=false;  document.getElementById("License").disabled=false;  document.getElementById("PanCard").disabled=false;  document.getElementById("IDPassPort").disabled=false;  document.getElementById("VoterId").disabled=false;  document.getElementById("IDProof_AllRemark").disabled=false;  document.getElementById("ConfirmationAss_Letter").disabled=false;  document.getElementById("ConfirmationAss_Letter_Remark").disabled=false;  document.getElementById("AppraisalLetterAndPMS_Form").disabled=false;  document.getElementById("AppraisalLetterAndPMS_Form_Remark").disabled=false;  document.getElementById("Transfer_Letter").disabled=false;  document.getElementById("Transfer_Letter_Remark").disabled=false;  document.getElementById("DesigGradeRoleChange_Letter").disabled=false;  document.getElementById("DesigGradeRoleChange_Letter_Remark").disabled=false; document.getElementById("VehiAgreeForm").disabled=false;  document.getElementById("VehiAgreeForm_Remark").disabled=false; document.getElementById("AnyOther").disabled=false; document.getElementById("AnyOther2").disabled=false; 

    document.getElementById("Dose1").disabled=false;
    document.getElementById("Dose2").disabled=false;
    document.getElementById("APY").disabled=false;
    document.getElementById("PMJJBY").disabled=false;
    document.getElementById("PMSBY").disabled=false;
    document.getElementById("CarProgress_GovtScheme_Remark").disabled=false;

document.getElementById("ChangeCheckList").style.display='none';  document.getElementById("EditCheckListE").style.display='block';

if(document.getElementById("Fresher").checked==false){document.getElementById("Com1").disabled=false;  document.getElementById("Com2").disabled=false;  document.getElementById("Com3").disabled=false;  document.getElementById("Offer_Letter").disabled=false;  document.getElementById("Appoint_Letter").disabled=false;  document.getElementById("Appraisal_Letter").disabled=false;  document.getElementById("Exp_Letter").disabled=false;  document.getElementById("OffAppAppExp_Remark").disabled=false;  document.getElementById("SalaryAnnexure").disabled=false;  document.getElementById("LastPaySlip").disabled=false;  document.getElementById("SalaryCertificate").disabled=false;   document.getElementById("SalLastSal_Remark").disabled=false;  document.getElementById("Relieving_Letter").disabled=false;  document.getElementById("ResignationAcceptance_Letter").disabled=false;   document.getElementById("NoDuesCertificate").disabled=false;}
}

function FunPerHisForm() 
{ if(document.getElementById("PerHisForm").checked==true){document.getElementById("PerHisForm").value='Y';}
  if(document.getElementById("PerHisForm").checked==false){document.getElementById("PerHisForm").value='N';}} 
  
function FunMedicalDeclForm() 
{ if(document.getElementById("MedicalDeclForm").checked==true){document.getElementById("MedicalDeclForm").value='Y';}
  if(document.getElementById("MedicalDeclForm").checked==false){document.getElementById("MedicalDeclForm").value='N';}} 

function FunBloodGroupReport() 
{ if(document.getElementById("BloodGroupReport").checked==true){document.getElementById("BloodGroupReport").value='Y';}
  if(document.getElementById("BloodGroupReport").checked==false){document.getElementById("BloodGroupReport").value='N';}}
  
function FunPhotograph() 
{ if(document.getElementById("Photograph").checked==true){document.getElementById("Photograph").value='Y';}
  if(document.getElementById("Photograph").checked==false){document.getElementById("Photograph").value='N';}}
  
function FunLetestResume() 
{ if(document.getElementById("LetestResume").checked==true){document.getElementById("LetestResume").value='Y';}
  if(document.getElementById("LetestResume").checked==false){document.getElementById("LetestResume").value='N';}}
  
function FunInterviewAssSheet() 
{ if(document.getElementById("InterviewAssSheet").checked==true){document.getElementById("InterviewAssSheet").value='Y';}
  if(document.getElementById("InterviewAssSheet").checked==false){document.getElementById("InterviewAssSheet").value='N';}}
  
function FunOfferLetDulySign() 
{ if(document.getElementById("OfferLetDulySign").checked==true){document.getElementById("OfferLetDulySign").value='Y';}
  if(document.getElementById("OfferLetDulySign").checked==false){document.getElementById("OfferLetDulySign").value='N';}}        

function FunAppointmentDulySign() 
{ if(document.getElementById("AppointmentDulySign").checked==true){document.getElementById("AppointmentDulySign").value='Y';}
  if(document.getElementById("AppointmentDulySign").checked==false){document.getElementById("AppointmentDulySign").value='N';}}        

function Fun10Certificate() 
{ if(document.getElementById("10Certificate").checked==true){document.getElementById("10Certificate").value='Y';}
  if(document.getElementById("10Certificate").checked==false){document.getElementById("10Certificate").value='N';}}        

function Fun12Certificate() 
{ if(document.getElementById("12Certificate").checked==true){document.getElementById("12Certificate").value='Y';}
  if(document.getElementById("12Certificate").checked==false){document.getElementById("12Certificate").value='N';}}        

function FunGCertificate() 
{ if(document.getElementById("GCertificate").checked==true){document.getElementById("GCertificate").value='Y';}
  if(document.getElementById("GCertificate").checked==false){document.getElementById("GCertificate").value='N';}}        

function FunPGCertificate() 
{ if(document.getElementById("PGCertificate").checked==true){document.getElementById("PGCertificate").value='Y';}
  if(document.getElementById("PGCertificate").checked==false){document.getElementById("PGCertificate").value='N';}}        

function FunAnyOtherCertificate() 
{ if(document.getElementById("AnyOtherCertificate").checked==true){document.getElementById("AnyOtherCertificate").value='Y';}
  if(document.getElementById("AnyOtherCertificate").checked==false){document.getElementById("AnyOtherCertificate").value='N';}}        

function FunFresher() 
{ if(document.getElementById("Fresher").checked==true)
  { document.getElementById("Fresher").value='Y'; 
    document.getElementById("Com1").checked=false; document.getElementById("Com1").disabled=true;
    document.getElementById("Com2").checked=false; document.getElementById("Com2").disabled=true;
	document.getElementById("Com3").checked=false; document.getElementById("Com3").disabled=true;
	document.getElementById("Offer_Letter").checked=false; document.getElementById("Offer_Letter").disabled=true;
	document.getElementById("Appoint_Letter").checked=false; document.getElementById("Appoint_Letter").disabled=true;
    document.getElementById("Appraisal_Letter").checked=false; document.getElementById("Appraisal_Letter").disabled=true;
	document.getElementById("Exp_Letter").checked=false; document.getElementById("Exp_Letter").disabled=true;
	document.getElementById("SalaryAnnexure").checked=false; document.getElementById("SalaryAnnexure").disabled=true;
    document.getElementById("LastPaySlip").checked=false; document.getElementById("LastPaySlip").disabled=true;
	document.getElementById("SalaryCertificate").checked=false; document.getElementById("SalaryCertificate").disabled=true;
	document.getElementById("Relieving_Letter").checked=false; document.getElementById("Relieving_Letter").disabled=true;
    document.getElementById("ResignationAcceptance_Letter").checked=false; document.getElementById("ResignationAcceptance_Letter").disabled=true;
	document.getElementById("NoDuesCertificate").checked=false; document.getElementById("NoDuesCertificate").disabled=true;
  }
  if(document.getElementById("Fresher").checked==false)
  { document.getElementById("Fresher").value='N';
    document.getElementById("Com1").disabled=false;
    document.getElementById("Com2").disabled=false;
	document.getElementById("Com3").disabled=false;
	document.getElementById("Offer_Letter").disabled=false;
	document.getElementById("Appoint_Letter").disabled=false;
    document.getElementById("Appraisal_Letter").disabled=false;
	document.getElementById("Exp_Letter").disabled=false;
	document.getElementById("SalaryAnnexure").disabled=false;
    document.getElementById("LastPaySlip").disabled=false;
	document.getElementById("SalaryCertificate").disabled=false;
	document.getElementById("Relieving_Letter").disabled=false;
    document.getElementById("ResignationAcceptance_Letter").disabled=false;
	document.getElementById("NoDuesCertificate").disabled=false;
  }
}   

function FunCom1() 
{ if(document.getElementById("Com1").checked==true){document.getElementById("Com1").value='Y';}
  if(document.getElementById("Com1").checked==false){document.getElementById("Com1").value='N';}}        

function FunCom2() 
{ if(document.getElementById("Com2").checked==true){document.getElementById("Com2").value='Y';}
  if(document.getElementById("Com2").checked==false){document.getElementById("Com2").value='N';}}        

function FunCom3() 
{ if(document.getElementById("Com3").checked==true){document.getElementById("Com3").value='Y';}
  if(document.getElementById("Com3").checked==false){document.getElementById("Com3").value='N';}}        

function FunOffer_Letter() 
{ if(document.getElementById("Offer_Letter").checked==true){document.getElementById("Offer_Letter").value='Y';}
  if(document.getElementById("Offer_Letter").checked==false){document.getElementById("Offer_Letter").value='N';}}        

function FunAppoint_Letter() 
{ if(document.getElementById("Appoint_Letter").checked==true){document.getElementById("Appoint_Letter").value='Y';}
  if(document.getElementById("Appoint_Letter").checked==false){document.getElementById("Appoint_Letter").value='N';}}        

function FunAppraisal_Letter() 
{ if(document.getElementById("Appraisal_Letter").checked==true){document.getElementById("Appraisal_Letter").value='Y';}
  if(document.getElementById("Appraisal_Letter").checked==false){document.getElementById("Appraisal_Letter").value='N';}}        

function FunExp_Letter() 
{ if(document.getElementById("Exp_Letter").checked==true){document.getElementById("Exp_Letter").value='Y';}
  if(document.getElementById("Exp_Letter").checked==false){document.getElementById("Exp_Letter").value='N';}}        

function FunSalaryAnnexure() 
{ if(document.getElementById("SalaryAnnexure").checked==true){document.getElementById("SalaryAnnexure").value='Y';}
  if(document.getElementById("SalaryAnnexure").checked==false){document.getElementById("SalaryAnnexure").value='N';}}        

function FunLastPaySlip() 
{ if(document.getElementById("LastPaySlip").checked==true){document.getElementById("LastPaySlip").value='Y';}
  if(document.getElementById("LastPaySlip").checked==false){document.getElementById("LastPaySlip").value='N';}}        

function FunSalaryCertificate() 
{ if(document.getElementById("SalaryCertificate").checked==true){document.getElementById("SalaryCertificate").value='Y';}
  if(document.getElementById("SalaryCertificate").checked==false){document.getElementById("SalaryCertificate").value='N';}}        

function FunRelieving_Letter() 
{ if(document.getElementById("Relieving_Letter").checked==true){document.getElementById("Relieving_Letter").value='Y';}
  if(document.getElementById("Relieving_Letter").checked==false){document.getElementById("Relieving_Letter").value='N';}}        

function FunResignationAcceptance_Letter() 
{ if(document.getElementById("ResignationAcceptance_Letter").checked==true){document.getElementById("ResignationAcceptance_Letter").value='Y';}
  if(document.getElementById("ResignationAcceptance_Letter").checked==false){document.getElementById("ResignationAcceptance_Letter").value='N';}}        

function FunNoDuesCertificate() 
{ if(document.getElementById("NoDuesCertificate").checked==true){document.getElementById("NoDuesCertificate").value='Y';}
  if(document.getElementById("NoDuesCertificate").checked==false){document.getElementById("NoDuesCertificate").value='N';}}        

function FunProvidentAndPension_Fund() 
{ if(document.getElementById("ProvidentAndPension_Fund").checked==true){document.getElementById("ProvidentAndPension_Fund").value='Y';}
  if(document.getElementById("ProvidentAndPension_Fund").checked==false){document.getElementById("ProvidentAndPension_Fund").value='N';}}        

function FunEmpStateInsu() 
{ if(document.getElementById("EmpStateInsu").checked==true){document.getElementById("EmpStateInsu").value='Y';}
  if(document.getElementById("EmpStateInsu").checked==false){document.getElementById("EmpStateInsu").value='N';}} 
  
function FunGratuity() 
{ if(document.getElementById("Gratuity").checked==true){document.getElementById("Gratuity").value='Y';}
  if(document.getElementById("Gratuity").checked==false){document.getElementById("Gratuity").value='N';}} 

function FunAssestDeclaration_Form() 
{ if(document.getElementById("AssestDeclaration_Form").checked==true){document.getElementById("AssestDeclaration_Form").value='Y';}
  if(document.getElementById("AssestDeclaration_Form").checked==false){document.getElementById("AssestDeclaration_Form").value='N';}} 

function FunElecBill() 
{ if(document.getElementById("ElecBill").checked==true){document.getElementById("ElecBill").value='Y';}
  if(document.getElementById("ElecBill").checked==false){document.getElementById("ElecBill").value='N';}} 

function FunDomicile() 
{ if(document.getElementById("Domicile").checked==true){document.getElementById("Domicile").value='Y';}
  if(document.getElementById("Domicile").checked==false){document.getElementById("Domicile").value='N';}} 

function FunVoterID() 
{ if(document.getElementById("VoterID").checked==true){document.getElementById("VoterID").value='Y';}
  if(document.getElementById("VoterID").checked==false){document.getElementById("VoterID").value='N';}} 

function FunPhoneBill() 
{ if(document.getElementById("PhoneBill").checked==true){document.getElementById("PhoneBill").value='Y';}
  if(document.getElementById("PhoneBill").checked==false){document.getElementById("PhoneBill").value='N';}} 

function FunBankPassBook() 
{ if(document.getElementById("BankPassBook").checked==true){document.getElementById("BankPassBook").value='Y';}
  if(document.getElementById("BankPassBook").checked==false){document.getElementById("BankPassBook").value='N';}} 

function FunRationCard() 
{ if(document.getElementById("RationCard").checked==true){document.getElementById("RationCard").value='Y';}
  if(document.getElementById("RationCard").checked==false){document.getElementById("RationCard").value='N';}} 

function FunAddPassPort() 
{ if(document.getElementById("AddPassPort").checked==true){document.getElementById("AddPassPort").value='Y';}
  if(document.getElementById("AddPassPort").checked==false){document.getElementById("AddPassPort").value='N';}} 

function FunLicense() 
{ if(document.getElementById("License").checked==true){document.getElementById("License").value='Y';}
  if(document.getElementById("License").checked==false){document.getElementById("License").value='N';}} 

function FunPanCard() 
{ if(document.getElementById("PanCard").checked==true){document.getElementById("PanCard").value='Y';}
  if(document.getElementById("PanCard").checked==false){document.getElementById("PanCard").value='N';}} 

function FunIDPassPort() 
{ if(document.getElementById("IDPassPort").checked==true){document.getElementById("IDPassPort").value='Y';}
  if(document.getElementById("IDPassPort").checked==false){document.getElementById("IDPassPort").value='N';}} 

function FunVoterId() 
{ if(document.getElementById("VoterId").checked==true){document.getElementById("VoterId").value='Y';}
  if(document.getElementById("VoterId").checked==false){document.getElementById("VoterId").value='N';}}

function FunAdharCard() 
{ if(document.getElementById("AdharCard").checked==true){document.getElementById("AdharCard").value='Y';}
  if(document.getElementById("AdharCard").checked==false){document.getElementById("AdharCard").value='N';}} 

function FunCastCerti() 
{ if(document.getElementById("CastCerti").checked==true){document.getElementById("CastCerti").value='Y';}
  if(document.getElementById("CastCerti").checked==false){document.getElementById("CastCerti").value='N';}} 
   

function FunConfirmationAss_Letter() 
{ if(document.getElementById("ConfirmationAss_Letter").checked==true){document.getElementById("ConfirmationAss_Letter").value='Y';}
  if(document.getElementById("ConfirmationAss_Letter").checked==false){document.getElementById("ConfirmationAss_Letter").value='N';}} 

function FunAppraisalLetterAndPMS_Form() 
{ if(document.getElementById("AppraisalLetterAndPMS_Form").checked==true){document.getElementById("AppraisalLetterAndPMS_Form").value='Y';}
  if(document.getElementById("AppraisalLetterAndPMS_Form").checked==false){document.getElementById("AppraisalLetterAndPMS_Form").value='N';}} 

function FunTransfer_Letter() 
{ if(document.getElementById("Transfer_Letter").checked==true){document.getElementById("Transfer_Letter").value='Y';}
  if(document.getElementById("Transfer_Letter").checked==false){document.getElementById("Transfer_Letter").value='N';}} 

function FunDesigGradeRoleChange_Letter() 
{ if(document.getElementById("DesigGradeRoleChange_Letter").checked==true){document.getElementById("DesigGradeRoleChange_Letter").value='Y';}
  if(document.getElementById("DesigGradeRoleChange_Letter").checked==false){document.getElementById("DesigGradeRoleChange_Letter").value='N';}} 
  
function FunVehiAgreeForm() 
{ if(document.getElementById("VehiAgreeForm").checked==true){document.getElementById("VehiAgreeForm").value='Y';}
  if(document.getElementById("VehiAgreeForm").checked==false){document.getElementById("VehiAgreeForm").value='N';}} 
  
function FunCovid19V_Dose1()
{ if(document.getElementById("Dose1").checked==true){document.getElementById("Dose1").value='Y';}
  if(document.getElementById("Dose1").checked==false){document.getElementById("Dose1").value='N';}}
  
function FunCovid19V_Dose2()
{ if(document.getElementById("Dose2").checked==true){document.getElementById("Dose2").value='Y';}
  if(document.getElementById("Dose2").checked==false){document.getElementById("Dose2").value='N';}} 
  
function FunAPY()
{ if(document.getElementById("APY").checked==true){document.getElementById("APY").value='Y';}
  if(document.getElementById("APY").checked==false){document.getElementById("APY").value='N';}}   
  
function FunPMJJBY()
{ if(document.getElementById("PMJJBY").checked==true){document.getElementById("PMJJBY").value='Y';}
  if(document.getElementById("PMJJBY").checked==false){document.getElementById("PMJJBY").value='N';}} 

function FunPMSBY()
{ if(document.getElementById("PMSBY").checked==true){document.getElementById("PMSBY").value='Y';}
  if(document.getElementById("PMSBY").checked==false){document.getElementById("PMSBY").value='N';}}  
  
</script>
</head>
<body class="body">
<?php 
$SqlEmp = mysql_query("SELECT *,hrm_employee_general.*,hrm_employee_personal.* FROM hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID WHERE hrm_employee.EmployeeID=".$EMPID, $con) or die(mysql_error());  $ResEmp=mysql_fetch_assoc($SqlEmp);
$Ename = $ResEmp['Fname'].'&nbsp;'.$ResEmp['Sname'].'&nbsp;'.$ResEmp['Lname']; $LEC=strlen($ResEmp['EmpCode']); 
      if($LEC==1){$EC='000'.$ResEmp['EmpCode'];} if($LEC==2){$EC='00'.$ResEmp['EmpCode'];} if($LEC==3){$EC='0'.$ResEmp['EmpCode'];} if($LEC>=4){$EC=$ResEmp['EmpCode'];}
$sqlCL=mysql_query("select * from hrm_employee_checklist where EmployeeID=".$EMPID, $con); $resCL=mysql_fetch_assoc($sqlCL);
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
	  <td align="right" width="360" class="heading">Personal File CheckList</td>
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
<?php if($_REQUEST['Event']=='Edit') {?>
 <td align="left" id="Equalifi" valign="top">             
<form enctype="multipart/form-data" name="formECheckList" method="post" onSubmit="return validate(this)">
<table border="0">
<tr>
 <td>
  <table><tr>
 <td class="All_80">EmpCode :</td><td class="All_60"><input name="EmpCode" id="EmpCode" class="All_50" style="background-color:#E6EBC5;" value="<?php echo $EC; ?>" Readonly></td>
 <td class="All_50">Name :</td><td class="All_220"><input name="EmpName" id="EmpName" style="width:210px; height:18px; font-size:11px;background-color:#E6EBC5;text-transform:uppercase;" value="<?php echo $Ename; ?>" Readonly></td>
  </tr></table>
 </td>
</tr>
<tr> 
<td align="left" valign="top">
<table border="1" width="800" id="TEmp" style="display:block;" cellpadding="0" cellspacing="0">
<tr>
<td>
  <table style="width:800px;" border="1">
  <tr bgcolor="#BCA9D3">
  <td style="width:50px; font-family:Times New Roman;font-size:14px;font-weight:bold;" align="center" valign="top">Sno</td>
  <td style="width:600px; font-family:Times New Roman;font-size:14px;font-weight:bold;" align="center" valign="top">Particulars of Documents/ Information</td>
  <td style="width:50px; font-family:Times New Roman;font-size:14px;font-weight:bold;" align="center" valign="top">Yes/No</td>
  <td style="width:100px; font-family:Times New Roman;font-size:14px;font-weight:bold;" align="center" valign="top">Remark</td>
  </tr>
<?php /************************************************* Particulars Open *****************************************/ ?>    
  <tr bgcolor="#FFFFFF">
  <td style="width:50px; font-family:Times New Roman;font-size:14px;" align="">&nbsp;&nbsp;<b>1.</b></td>
  <td style="width:600px; font-family:Times New Roman;font-size:14px;" align="" valign="middle">&nbsp;
  <input type="checkbox" name="PerHisForm" id="PerHisForm" value="<?php echo $resCL['Particular_PerHisForm']; ?>" onClick="FunPerHisForm()" <?php if($resCL['Particular_PerHisForm']=='Y'){echo 'checked';} ?> disabled />Personal History Form </td>
  <td style="width:50px; font-family:Times New Roman;font-size:14px;font-weight:bold;" align="center">
  <?php if($resCL['Particular_PerHisForm']=='Y'){echo 'Yes';} else {echo 'No';} ?></td>
  <td style="width:100px; font-family:Times New Roman;font-size:14px;" align="">
  <input name="PerHisForm_Remark" id="PerHisForm_Remark" style="width:99px; height:20px;" value="<?php echo $resCL['Particular_PerHisForm_Remark']; ?>" disabled /></td>
  </tr>
  <tr bgcolor="#FFFFFF">
  <td style="width:50px; font-family:Times New Roman;font-size:14px;" align="">&nbsp;&nbsp;<b>2.</b></td>
  <td style="width:600px; font-family:Times New Roman;font-size:14px;" align="" valign="middle">&nbsp;
  <input type="checkbox" name="MedicalDeclForm" id="MedicalDeclForm" value="<?php echo $resCL['Particular_MedicalDeclForm'];?>" onClick="FunMedicalDeclForm()" <?php if($resCL['Particular_MedicalDeclForm']=='Y'){echo 'checked';} ?> disabled />Medical Declaration Form &nbsp;/
  <input type="checkbox" name="BloodGroupReport" id="BloodGroupReport" value="<?php echo $resCL['Particular_BloodGroupReport'];?>" onClick="FunBloodGroupReport()" <?php if($resCL['Particular_BloodGroupReport']=='Y'){echo 'checked';} ?> disabled />Blood group Report &nbsp;/
  
  Covid-19 Vaccination Certificate: <br>&nbsp;&nbsp;<input type="checkbox" name="Dose1" id="Dose1" value="<?php echo $resCL['Particular_Covid19V_Dose1'];?>" onClick="FunCovid19V_Dose1()" <?php if($resCL['Particular_Covid19V_Dose1']=='Y'){echo 'checked';} ?> disabled />Dose-1 &nbsp;&nbsp;<input type="checkbox" name="Dose2" id="Dose2" value="<?php echo $resCL['Particular_Covid19V_Dose2'];?>" onClick="FunCovid19V_Dose2()" <?php if($resCL['Particular_Covid19V_Dose2']=='Y'){echo 'checked';} ?> disabled/>Dose-2
  
  </td>
  <td style="width:50px; font-family:Times New Roman;font-size:14px;font-weight:bold;" align="center">
  <?php if($resCL['Particular_MedicalDeclForm']=='Y' OR $resCL['Particular_BloodGroupReport']=='Y'){echo 'Yes';} else {echo 'No';} ?></td>
  <td style="width:100px; font-family:Times New Roman;font-size:14px;" align="">
  <input name="MedicalBlood_Remark" id="MedicalBlood_Remark" style="width:99px; height:20px;" value="<?php echo $resCL['Particular_MedicalBlood_Remark']; ?>" disabled /></td>
  </tr>
  <tr bgcolor="#FFFFFF">
  <td style="width:50px; font-family:Times New Roman;font-size:14px;" align="">&nbsp;&nbsp;<b>3.</b></td>
  <td style="width:600px; font-family:Times New Roman;font-size:14px;" align="" valign="middle">&nbsp;
  <input type="checkbox" name="Photograph" id="Photograph" value="<?php echo $resCL['Particular_Photograph'];?>" onClick="FunPhotograph()" <?php if($resCL['Particular_Photograph']=='Y'){echo 'checked';} ?> disabled />Recent color photographs (3 nos.)
  </td>
  <td style="width:50px; font-family:Times New Roman;font-size:14px;font-weight:bold;" align="center">
  <?php if($resCL['Particular_Photograph']=='Y'){echo 'Yes';} else {echo 'No';} ?></td>
  <td style="width:100px; font-family:Times New Roman;font-size:14px;" align="">
  <input name="Photograph_Remark" id="Photograph_Remark" style="width:99px; height:20px;" value="<?php echo $resCL['Particular_Photograph_Remark']; ?>" disabled /></td>
  </tr>
  <tr bgcolor="#FFFFFF">
  <td style="width:50px; font-family:Times New Roman;font-size:14px;" align="">&nbsp;&nbsp;<b>4.</b></td>
  <td style="width:600px; font-family:Times New Roman;font-size:14px;" align="" valign="middle">&nbsp;
  <input type="checkbox" name="LetestResume" id="LetestResume" value="<?php echo $resCL['Particular_LetestResume'];?>" onClick="FunLetestResume()" <?php if($resCL['Particular_LetestResume']=='Y'){echo 'checked';} ?> disabled />Latest Resume &nbsp;/
  <input type="checkbox" name="InterviewAssSheet" id="InterviewAssSheet" value="<?php echo $resCL['Particular_InterviewAssSheet'];?>" onClick="FunInterviewAssSheet()" <?php if($resCL['Particular_InterviewAssSheet']=='Y'){echo 'checked';} ?> disabled />Interview Assessment Sheet
  </td>
  <td style="width:50px; font-family:Times New Roman;font-size:14px;font-weight:bold;" align="center">
  <?php if($resCL['Particular_LetestResume']=='Y' OR $resCL['Particular_InterviewAssSheet']=='Y'){echo 'Yes';} else {echo 'No';} ?></td>
  <td style="width:100px; font-family:Times New Roman;font-size:14px;" align="">
  <input name="ResumeInterview_Remark" id="ResumeInterview_Remark" style="width:99px; height:20px;" value="<?php echo $resCL['Particular_ResumeInterview_Remark']; ?>" disabled /></td>
  </tr>
  <tr bgcolor="#FFFFFF">
  <td style="width:50px; font-family:Times New Roman;font-size:14px;" align="">&nbsp;&nbsp;<b>5.</b></td>
  <td style="width:600px; font-family:Times New Roman;font-size:14px;" align="" valign="middle">&nbsp;
  <input type="checkbox" name="OfferLetDulySign" id="OfferLetDulySign" value="<?php echo $resCL['Particular_OfferLetDulySign'];?>" onClick="FunOfferLetDulySign()" <?php if($resCL['Particular_OfferLetDulySign']=='Y'){echo 'checked';} ?> disabled />Offer letter duly signed
  </td>
  <td style="width:50px; font-family:Times New Roman;font-size:14px;font-weight:bold;" align="center">
  <?php if($resCL['Particular_OfferLetDulySign']=='Y'){echo 'Yes';} else {echo 'No';} ?></td>
  <td style="width:100px; font-family:Times New Roman;font-size:14px;" align="">
  <input name="OfferLetDulySign_Remark" id="OfferLetDulySign_Remark" style="width:99px; height:20px;" value="<?php echo $resCL['Particular_OfferLetDulySign_Remark']; ?>" disabled /></td>
  </tr>
  <tr bgcolor="#FFFFFF">
  <td style="width:50px; font-family:Times New Roman;font-size:14px;" align="">&nbsp;&nbsp;<b>6.</b></td>
  <td style="width:600px; font-family:Times New Roman;font-size:14px;" align="" valign="middle">&nbsp;
  <input type="checkbox" name="AppointmentDulySign" id="AppointmentDulySign" value="<?php echo $resCL['Particular_AppointmentDulySign'];?>" onClick="FunAppointmentDulySign()" <?php if($resCL['Particular_AppointmentDulySign']=='Y'){echo 'checked';} ?> disabled />Appointment letter duly signed
  </td>
  <td style="width:50px; font-family:Times New Roman;font-size:14px;font-weight:bold;" align="center">
  <?php if($resCL['Particular_AppointmentDulySign']=='Y'){echo 'Yes';} else {echo 'No';} ?></td>
  <td style="width:100px; font-family:Times New Roman;font-size:14px;" align="">
<input name="AppointmentDulySign_Remark" id="AppointmentDulySign_Remark" style="width:99px; height:20px;" value="<?php echo $resCL['Particular_AppointmentDulySign_Remark']; ?>" disabled /></td>
  </tr>
<?php /************************************************* Particulars Close *****************************************/ ?>  
<?php /************************************************* Education Open *****************************************/ ?>  
  <tr bgcolor="#FFFFFF">
  <td style="width:50px; font-family:Times New Roman;font-size:14px;" align="">&nbsp;&nbsp;<b>7.</b></td>
  <td style="width:600px; font-family:Times New Roman;font-size:14px;" align="center" valign="middle"><b>Education Details</b></td>
  <td colspan="2">&nbsp;</td>
  </tr>
  <tr bgcolor="#FFFFFF">
  <td style="width:50px; font-family:Times New Roman;font-size:14px;" align="center">&nbsp;a)</td>
  <td style="width:600px; font-family:Times New Roman;font-size:14px;" align="" valign="middle">&nbsp;
  <input type="checkbox" name="10Certificate" id="10Certificate" value="<?php echo $resCL['Edu_10Certificate'];?>" onClick="Fun10Certificate()" <?php if($resCL['Edu_10Certificate']=='Y'){echo 'checked';} ?> disabled />SSC (10<sup>th</sup>) Certificate
  </td>
  <td style="width:50px; font-family:Times New Roman;font-size:14px;font-weight:bold;" align="center">
  <?php if($resCL['Edu_10Certificate']=='Y'){echo 'Yes';} else {echo 'No';} ?></td>
  <td style="width:100px; font-family:Times New Roman;font-size:14px;" align="">
<input name="10Certificate_Remark" id="10Certificate_Remark" style="width:99px; height:20px;" value="<?php echo $resCL['Edu_10Certificate_Remark']; ?>" disabled /></td>
  </tr>
  <tr bgcolor="#FFFFFF">
  <td style="width:50px; font-family:Times New Roman;font-size:14px;" align="center">&nbsp;b)</td>
  <td style="width:600px; font-family:Times New Roman;font-size:14px;" align="" valign="middle">&nbsp;
  <input type="checkbox" name="12Certificate" id="12Certificate" value="<?php echo $resCL['Edu_12Certificate'];?>" onClick="Fun12Certificate()" <?php if($resCL['Edu_12Certificate']=='Y'){echo 'checked';} ?> disabled />HSC (12<sup>th</sup>) Certificate
  </td>
  <td style="width:50px; font-family:Times New Roman;font-size:14px;font-weight:bold;" align="center">
  <?php if($resCL['Edu_12Certificate']=='Y'){echo 'Yes';} else {echo 'No';} ?></td>
  <td style="width:100px; font-family:Times New Roman;font-size:14px;" align="">
<input name="12Certificate_Remark" id="12Certificate_Remark" style="width:99px; height:20px;" value="<?php echo $resCL['Edu_12Certificate_Remark']; ?>" disabled /></td>
  </tr>
  <tr bgcolor="#FFFFFF">
  <td style="width:50px; font-family:Times New Roman;font-size:14px;" align="center">&nbsp;c)</td>
  <td style="width:600px; font-family:Times New Roman;font-size:14px;" align="" valign="middle">&nbsp;
  <input type="checkbox" name="GCertificate" id="GCertificate" value="<?php echo $resCL['Edu_GCertificate'];?>" onClick="FunGCertificate()" <?php if($resCL['Edu_GCertificate']=='Y'){echo 'checked';} ?> disabled />Graduation Certificate
  </td>
  <td style="width:50px; font-family:Times New Roman;font-size:14px;font-weight:bold;" align="center">
  <?php if($resCL['Edu_GCertificate']=='Y'){echo 'Yes';} else {echo 'No';} ?></td>
  <td style="width:100px; font-family:Times New Roman;font-size:14px;" align="">
<input name="GCertificate_Remark" id="GCertificate_Remark" style="width:99px; height:20px;" value="<?php echo $resCL['Edu_GCertificate_Remark']; ?>" disabled /></td>
  </tr>
  <tr bgcolor="#FFFFFF">
  <td style="width:50px; font-family:Times New Roman;font-size:14px;" align="center">&nbsp;d)</td>
  <td style="width:600px; font-family:Times New Roman;font-size:14px;" align="" valign="middle">&nbsp;
  <input type="checkbox" name="PGCertificate" id="PGCertificate" value="<?php echo $resCL['Edu_PGCertificate'];?>" onClick="FunPGCertificate()" <?php if($resCL['Edu_PGCertificate']=='Y'){echo 'checked';} ?> disabled />Post Graduation Certificate
  </td>
  <td style="width:50px; font-family:Times New Roman;font-size:14px;font-weight:bold;" align="center">
  <?php if($resCL['Edu_PGCertificate']=='Y'){echo 'Yes';} else {echo 'No';} ?></td>
  <td style="width:100px; font-family:Times New Roman;font-size:14px;" align="">
<input name="PGCertificate_Remark" id="PGCertificate_Remark" style="width:99px; height:20px;" value="<?php echo $resCL['Edu_PGCertificate_Remark']; ?>" disabled /></td>
  </tr>
  <tr bgcolor="#FFFFFF">
  <td style="width:50px; font-family:Times New Roman;font-size:14px;" align="center">&nbsp;e)</td>
  <td style="width:600px; font-family:Times New Roman;font-size:14px;" align="" valign="middle">&nbsp;
  <input type="checkbox" name="AnyOtherCertificate" id="AnyOtherCertificate" value="<?php echo $resCL['Edu_AnyOtherCertificate'];?>" onClick="FunAnyOtherCertificate()" <?php if($resCL['Edu_AnyOtherCertificate']=='Y'){echo 'checked';} ?> disabled />Any Other
  </td>
  <td style="width:50px; font-family:Times New Roman;font-size:14px;font-weight:bold;" align="center">
  <?php if($resCL['Edu_AnyOtherCertificate']=='Y'){echo 'Yes';} else {echo 'No';} ?></td>
  <td style="width:100px; font-family:Times New Roman;font-size:14px;" align="">
<input name="AnyOtherCertificate_Remark" id="AnyOtherCertificate_Remark" style="width:99px; height:20px;" value="<?php echo $resCL['Edu_AnyOtherCertificate_Remark']; ?>" disabled /></td>
  </tr>
<?php /************************************************* Education Close *****************************************/ ?>  
<?php /************************************************* Privious Employer Details Open *****************************************/ ?>  
  <tr bgcolor="#FFFFFF">
  <td style="width:50px; font-family:Times New Roman;font-size:14px;" align="">&nbsp;&nbsp;<b>8.</b></td>
  <td style="width:600px; font-family:Times New Roman;font-size:14px;" align="center" valign="middle"><b>Previous Emplyer Details</b></td>
   <td colspan="2">&nbsp;</td>
  </tr>
  <tr bgcolor="#FFFFFF">
  <td style="width:50px; font-family:Times New Roman;font-size:14px;" align="">&nbsp;</td>
  <td style="width:600px; font-family:Times New Roman;font-size:14px;" align="" valign="middle">&nbsp;
  <input type="checkbox" name="Fresher" id="Fresher" onClick="FunFresher()" value="<?php echo $resCL['PComDetail_Fresher'];?>" <?php if($resCL['PComDetail_Fresher']=='Y'){echo 'checked';} ?> disabled /><b>a.</b> Fresher &nbsp;/
  <input type="checkbox" name="Com1" id="Com1" onClick="FunCom1()" value="<?php echo $resCL['PComDetail_Com1'];?>" <?php if($resCL['PComDetail_Com1']=='Y'){echo 'checked';} ?> disabled /><b>b.</b> 1<sup>st</sup> Employer &nbsp;/
  <input type="checkbox" name="Com2" id="Com2" onClick="FunCom2()" value="<?php echo $resCL['PComDetail_Com2'];?>" <?php if($resCL['PComDetail_Com2']=='Y'){echo 'checked';} ?> disabled /><b>c.</b> 2<sup>nd</sup> Employer &nbsp;/
  <input type="checkbox" name="Com3" id="Com3" onClick="FunCom3()" value="<?php echo $resCL['PComDetail_Com3'];?>" <?php if($resCL['PComDetail_Com3']=='Y'){echo 'checked';} ?> disabled /><b>d.</b> 3<sup>rd</sup> Employer
  </td>
  <td colspan="2" style="width:50px; font-family:Times New Roman;font-size:14px;" align="center">&nbsp;</td>
  </tr>
  <tr bgcolor="#FFFFFF">
  <td style="width:50px; font-family:Times New Roman;font-size:14px;" align="center">&nbsp;a)</td>
  <td style="width:600px; font-family:Times New Roman;font-size:14px;" align="" valign="middle">&nbsp;
  <input type="checkbox" name="Offer_Letter" id="Offer_Letter" value="<?php echo $resCL['PComDetail_Offer_Letter'];?>" onClick="FunOffer_Letter()" <?php if($resCL['PComDetail_Offer_Letter']=='Y'){echo 'checked';} ?> disabled />Offer &nbsp;/
  <input type="checkbox" name="Appoint_Letter" id="Appoint_Letter" value="<?php echo $resCL['PComDetail_Appoint_Letter'];?>" onClick="FunAppoint_Letter()" <?php if($resCL['PComDetail_Appoint_Letter']=='Y'){echo 'checked';} ?> disabled />Appointment &nbsp;/
  <input type="checkbox" name="Appraisal_Letter" id="Appraisal_Letter" value="<?php echo $resCL['PComDetail_Appraisal_Letter'];?>" onClick="FunAppraisal_Letter()" <?php if($resCL['PComDetail_Appraisal_Letter']=='Y'){echo 'checked';} ?> disabled />Appraisal &nbsp;/
  <input type="checkbox" name="Exp_Letter" id="Exp_Letter" value="<?php echo $resCL['PComDetail_Exp_Letter'];?>" onClick="FunExp_Letter()" <?php if($resCL['PComDetail_Exp_Letter']=='Y'){echo 'checked';} ?> disabled />Exp letter
  </td>
  <td style="width:50px; font-family:Times New Roman;font-size:14px;font-weight:bold;" align="center">
  <?php if($resCL['PComDetail_Offer_Letter']=='Y' OR $resCL['PComDetail_Appoint_Letter']=='Y' OR $resCL['PComDetail_Appraisal_Letter']=='Y' OR $resCL['PComDetail_Exp_Letter']=='Y'){echo 'Yes';} else {echo 'No';} ?></td>
  <td style="width:100px; font-family:Times New Roman;font-size:14px;" align="">
  <input name="OffAppAppExp_Remark" id="OffAppAppExp_Remark" style="width:99px; height:20px;" value="<?php echo $resCL['PComDetail_OffAppAppExp_Remark']; ?>" disabled /></td>
  </tr>
  <tr bgcolor="#FFFFFF">
  <td style="width:50px; font-family:Times New Roman;font-size:14px;" align="center">&nbsp;b)</td>
  <td style="width:600px; font-family:Times New Roman;font-size:14px;" align="" valign="middle">&nbsp;
  <input type="checkbox" name="SalaryAnnexure" id="SalaryAnnexure" value="<?php echo $resCL['PComDetail_SalaryAnnexure'];?>" onClick="FunSalaryAnnexure()" <?php if($resCL['PComDetail_SalaryAnnexure']=='Y'){echo 'checked';} ?> disabled />Previous company salary structure &nbsp;/
  <input type="checkbox" name="LastPaySlip" id="LastPaySlip" value="<?php echo $resCL['PComDetail_LastPaySlip'];?>" onClick="FunLastPaySlip()" <?php if($resCL['PComDetail_LastPaySlip']=='Y'){echo 'checked';} ?> disabled />Last Pay slip &nbsp;/
  <input type="checkbox" name="SalaryCertificate" id="SalaryCertificate" value="<?php echo $resCL['PComDetail_SalaryCertificate'];?>" onClick="FunSalaryCertificate()" <?php if($resCL['PComDetail_SalaryCertificate']=='Y'){echo 'checked';} ?> disabled />Salary certificate 
  </td>
  <td style="width:50px; font-family:Times New Roman;font-size:14px;font-weight:bold;" align="center">
  <?php if($resCL['PComDetail_SalaryAnnexure']=='Y' OR $resCL['PComDetail_LastPaySlip']=='Y' OR $resCL['PComDetail_SalaryCertificate']=='Y'){echo 'Yes';} else {echo 'No';} ?></td>
  <td style="width:100px; font-family:Times New Roman;font-size:14px;" align="">
  <input name="SalLastSal_Remark" id="SalLastSal_Remark" style="width:99px; height:20px;" value="<?php echo $resCL['PComDetail_SalLastSal_Remark']; ?>" disabled /></td>
  </tr>
  <tr bgcolor="#FFFFFF">
  <td style="width:50px; font-family:Times New Roman;font-size:14px;" align="center">&nbsp;c)</td>
  <td style="width:600px; font-family:Times New Roman;font-size:14px;" align="" valign="middle">&nbsp;
  <input type="checkbox" name="Relieving_Letter" id="Relieving_Letter" value="<?php echo $resCL['PComDetail_Relieving_Letter'];?>" onClick="FunRelieving_Letter()" <?php if($resCL['PComDetail_Relieving_Letter']=='Y'){echo 'checked';} ?> disabled />Relieving letter &nbsp;/
  <input type="checkbox" name="ResignationAcceptance_Letter" id="ResignationAcceptance_Letter" value="<?php echo $resCL['PComDetail_ResignationAcceptance_Letter'];?>" onClick="FunResignationAcceptance_Letter()" <?php if($resCL['PComDetail_ResignationAcceptance_Letter']=='Y'){echo 'checked';} ?> disabled />Resignation acceptance letter &nbsp;/
  <input type="checkbox" name="NoDuesCertificate" id="NoDuesCertificate" value="<?php echo $resCL['PComDetail_NoDuesCertificate'];?>" onClick="FunNoDuesCertificate()" <?php if($resCL['PComDetail_NoDuesCertificate']=='Y'){echo 'checked';} ?> disabled />No dues certificate 
  </td>
  <td style="width:50px; font-family:Times New Roman;font-size:14px; font-weight:bold;" align="center">
  <?php if($resCL['PComDetail_Relieving_Letter']=='Y' OR $resCL['PComDetail_ResignationAcceptance_Letter']=='Y' OR $resCL['PComDetail_NoDuesCertificate']=='Y'){echo 'Yes';} else {echo 'No';} ?></td>
  <td style="width:100px; font-family:Times New Roman;font-size:14px;" align="">
  <input name="RelResNoD_Remark" id="RelResNoD_Remark" style="width:99px; height:20px;" value="<?php echo $resCL['PComDetail_RelResNoD_Remark']; ?>" disabled /></td>
  </tr>
<?php /************************************************* Privious Employer Details Close *****************************************/ ?>  
<?php /************************************************* Declaration and Normination form for Open *****************************************/ ?>  
  <tr bgcolor="#FFFFFF">
  <td style="width:50px; font-family:Times New Roman;font-size:14px;" align="">&nbsp;&nbsp;<b>9.</b></td>
  <td style="width:600px; font-family:Times New Roman;font-size:14px;" align="center" valign="middle"><b>Declaration and Nomination form for</b></td>
   <td colspan="2">&nbsp;</td>
  </tr>
  <tr bgcolor="#FFFFFF">
  <td style="width:50px; font-family:Times New Roman;font-size:14px;" align="center">&nbsp;a)</td>
  <td style="width:600px; font-family:Times New Roman;font-size:14px;" align="" valign="middle">&nbsp;
  <input type="checkbox" name="ProvidentAndPension_Fund" id="ProvidentAndPension_Fund" value="<?php echo $resCL['DeclAndNomin_ProvidentAndPension_Fund'];?>" onClick="FunProvidentAndPension_Fund()" <?php if($resCL['DeclAndNomin_ProvidentAndPension_Fund']=='Y'){echo 'checked';} ?> disabled />Provident and Pension Fund
  </td>
  <td style="width:50px; font-family:Times New Roman;font-size:14px;font-weight:bold;" align="center">
  <?php if($resCL['DeclAndNomin_ProvidentAndPension_Fund']=='Y'){echo 'Yes';} else {echo 'No';} ?></td>
  <td style="width:100px; font-family:Times New Roman;font-size:14px;" align="">
  <input name="ProvidentAndPension_Fund_Remark" id="ProvidentAndPension_Fund_Remark" style="width:99px; height:20px;" value="<?php echo $resCL['DeclAndNomin_ProvidentAndPension_Fund_Remark']; ?>" disabled /></td>
  </tr>
  <tr bgcolor="#FFFFFF">
  <td style="width:50px; font-family:Times New Roman;font-size:14px;" align="center">&nbsp;b)</td>
  <td style="width:600px; font-family:Times New Roman;font-size:14px;" align="" valign="middle">&nbsp;
  <input type="checkbox" name="EmpStateInsu" id="EmpStateInsu" value="<?php echo $resCL['DeclAndNomin_EmpStateInsu'];?>" onClick="FunEmpStateInsu()" <?php if($resCL['DeclAndNomin_EmpStateInsu']=='Y'){echo 'checked';} ?> disabled />Employees State Insurance (if applicable)
  </td>
  <td style="width:50px; font-family:Times New Roman;font-size:14px;font-weight:bold;" align="center">
  <?php if($resCL['DeclAndNomin_EmpStateInsu']=='Y'){echo 'Yes';} else {echo 'No';} ?></td>
  <td style="width:100px; font-family:Times New Roman;font-size:14px;" align="">
  <input name="EmpStateInsu_Remark" id="EmpStateInsu_Remark" style="width:99px; height:20px;" value="<?php echo $resCL['DeclAndNomin_EmpStateInsu_Remark']; ?>" disabled /></td>
  </tr>
  <tr bgcolor="#FFFFFF">
  <td style="width:50px; font-family:Times New Roman;font-size:14px;" align="center">&nbsp;c)</td>
  <td style="width:600px; font-family:Times New Roman;font-size:14px;" align="" valign="middle">&nbsp;
  <input type="checkbox" name="Gratuity" id="Gratuity" value="<?php echo $resCL['DeclAndNomin_Gratuity'];?>" onClick="FunGratuity()" <?php if($resCL['DeclAndNomin_Gratuity']=='Y'){echo 'checked';} ?> disabled />Gratuity
  </td>
  <td style="width:50px; font-family:Times New Roman;font-size:14px;font-weight:bold;" align="center">
  <?php if($resCL['DeclAndNomin_Gratuity']=='Y'){echo 'Yes';} else {echo 'No';} ?></td>
  <td style="width:100px; font-family:Times New Roman;font-size:14px;" align="">
  <input name="Gratuity_Remark" id="Gratuity_Remark" style="width:99px; height:20px;" value="<?php echo $resCL['DeclAndNomin_Gratuity_Remark']; ?>" disabled /></td>
  </tr>
  <tr bgcolor="#FFFFFF">
  <td style="width:50px; font-family:Times New Roman;font-size:14px;" align="center">&nbsp;d)</td>
  <td style="width:600px; font-family:Times New Roman;font-size:14px;" align="" valign="middle">&nbsp;
  <input type="checkbox" name="AssestDeclaration_Form" value="<?php echo $resCL['DeclAndNomin_AssestDeclaration_Form'];?>" id="AssestDeclaration_Form" onClick="FunAssestDeclaration_Form()" <?php if($resCL['DeclAndNomin_AssestDeclaration_Form']=='Y'){echo 'checked';} ?> disabled />Assets declaration form
  </td>
  <td style="width:50px; font-family:Times New Roman;font-size:14px;font-weight:bold;" align="center">
  <?php if($resCL['DeclAndNomin_AssestDeclaration_Form']=='Y'){echo 'Yes';} else {echo 'No';} ?></td>
  <td style="width:100px; font-family:Times New Roman;font-size:14px;" align="">
  <input name="AssestDeclaration_Form_Remark" id="AssestDeclaration_Form_Remark" style="width:99px; height:20px;" value="<?php echo $resCL['DeclAndNomin_AssestDeclaration_Form_Remark']; ?>" disabled /></td>
  </tr>
<?php /************************************************* Declaration and Normination form for Close *****************************************/ ?>  
<?php /************************************************* Address/ ID Proof Open *****************************************/ ?>  
  <tr bgcolor="#FFFFFF">
  <td style="width:50px; font-family:Times New Roman;font-size:14px;" align="">&nbsp;&nbsp;<b>10.</b></td>
  <td style="width:600px; font-family:Times New Roman;font-size:14px;" align="" valign="middle">&nbsp;&nbsp;<b>Address Proof</b></td>
   <td colspan="2">&nbsp;</td>
  </tr>
  <tr bgcolor="#FFFFFF">
  <td style="width:50px; font-family:Times New Roman;font-size:14px;" align="">&nbsp;</td>
  <td style="width:600px; font-family:Times New Roman;font-size:14px;" align="" valign="middle">&nbsp;
  <input type="checkbox" name="ElecBill" id="ElecBill" value="<?php echo $resCL['AddProof_ElecBill'];?>" onClick="FunElecBill()" <?php if($resCL['AddProof_ElecBill']=='Y'){echo 'checked';} ?> disabled />Elec. Bill&nbsp;/
  <input type="checkbox" name="Domicile" id="Domicile" value="<?php echo $resCL['AddProof_Domicile'];?>" onClick="FunDomicile()" <?php if($resCL['AddProof_Domicile']=='Y'){echo 'checked';} ?> disabled />Domicile&nbsp;/
  <input type="checkbox" name="VoterID" id="VoterID" value="<?php echo $resCL['AddProof_VoterID'];?>" onClick="FunVoterID()" <?php if($resCL['AddProof_VoterID']=='Y'){echo 'checked';} ?> disabled />VoterID&nbsp;/
  <input type="checkbox" name="PhoneBill" id="PhoneBill" value="<?php echo $resCL['AddProof_PhoneBill'];?>" onClick="FunPhoneBill()" <?php if($resCL['AddProof_PhoneBill']=='Y'){echo 'checked';} ?> disabled />PhoneBill&nbsp;/
  <input type="checkbox" name="BankPassBook" id="BankPassBook" value="<?php echo $resCL['AddProof_BankPassBook'];?>" onClick="FunBankPassBook()" <?php if($resCL['AddProof_BankPassBook']=='Y'){echo 'checked';} ?> disabled />Bank PB&nbsp;/
  <input type="checkbox" name="RationCard" id="RationCard" value="<?php echo $resCL['AddProof_RationCard'];?>" onClick="FunRationCard()" <?php if($resCL['AddProof_RationCard']=='Y'){echo 'checked';} ?> disabled />RationCard
  <input type="hidden" name="AddPassPort" id="AddPassPort" value="<?php echo $resCL['AddProof_PassPort'];?>" onClick="FunAddPassPort()" <?php if($resCL['AddProof_PassPort']=='Y'){echo 'checked';} ?> disabled /><?php //Passport ?>
  </td>
   <td style="width:50px; font-family:Times New Roman;font-size:14px;font-weight:bold;" align="center">
  <?php if($resCL['AddProof_ElecBill']=='Y' OR $resCL['AddProof_Domicile']=='Y' OR $resCL['AddProof_VoterID']=='Y' OR $resCL['AddProof_PhoneBill']=='Y' OR $resCL['AddProof_BankPassBook']=='Y' OR $resCL['AddProof_RationCard']=='Y' OR $resCL['AddProof_PassPort']=='Y'){echo 'Yes';} else {echo 'No';} ?></td>
  <td style="width:100px; font-family:Times New Roman;font-size:14px;" align="">
  <input name="AddProof_AllRemark" id="AddProof_AllRemark" style="width:99px; height:20px;" value="<?php echo $resCL['AddProof_AllRemark']; ?>" disabled /></td>
  </tr>
  <tr bgcolor="#FFFFFF">
  <td style="width:50px; font-family:Times New Roman;font-size:14px;" align="">&nbsp;&nbsp;<b>11.</b></td>
  <td colspan="3" style="width:600px; font-family:Times New Roman;font-size:14px;" align="" valign="middle">&nbsp;&nbsp;<b>ID Proof</b></td>
  </tr>
  <tr bgcolor="#FFFFFF">
  <td style="width:50px; font-family:Times New Roman;font-size:14px;" align="">&nbsp;</td>
  <td style="width:600px; font-family:Times New Roman;font-size:14px;" align="" valign="middle">&nbsp;
  <input type="checkbox" name="License" id="License" value="<?php echo $resCL['IDProof_License'];?>" onClick="FunLicense()" <?php if($resCL['IDProof_License']=='Y'){echo 'checked';} ?> disabled />License&nbsp;/
  <input type="checkbox" name="PanCard" id="PanCard" value="<?php echo $resCL['IDProof_PanCard'];?>" onClick="FunPanCard()" <?php if($resCL['IDProof_PanCard']=='Y'){echo 'checked';} ?> disabled />Pan Card&nbsp;/
  <input type="checkbox" name="IDPassPort" id="IDPassPort" value="<?php echo $resCL['IDProof_PassPort'];?>" onClick="FunIDPassPort()" <?php if($resCL['IDProof_PassPort']=='Y'){echo 'checked';} ?> disabled />Passport&nbsp;/
  <input type="checkbox" name="VoterId" id="VoterId" value="<?php echo $resCL['IDProof_VoterId'];?>" onClick="FunVoterId()" <?php if($resCL['IDProof_VoterId']=='Y'){echo 'checked';} ?> disabled />Voter ID&nbsp;/
  <input type="checkbox" name="AdharCard" id="AdharCard" value="<?php echo $resCL['IDProof_AdharCard'];?>" onClick="FunAdharCard()" <?php if($resCL['IDProof_AdharCard']=='Y'){echo 'checked';} ?> disabled />Adhar Card&nbsp;/
  <input type="checkbox" name="CastCerti" id="CastCerti" value="<?php echo $resCL['IDProof_CastCerti'];?>" onClick="FunCastCerti()" <?php if($resCL['IDProof_CastCerti']=='Y'){echo 'checked';} ?> disabled />Cast Certificate
  </td>
   <td style="width:50px; font-family:Times New Roman;font-size:14px;font-weight:bold;" align="center">
  <?php if($resCL['IDProof_License']=='Y' OR $resCL['IDProof_PanCard']=='Y' OR $resCL['IDProof_PassPort']=='Y' OR $resCL['IDProof_VoterId']=='Y' OR $resCL['IDProof_AdharCard']=='Y' OR $resCL['IDProof_CastCerti']=='Y'){echo 'Yes';} else {echo 'No';} ?></td>
  <td style="width:100px; font-family:Times New Roman;font-size:14px;" align="">
  <input name="IDProof_AllRemark" id="IDProof_AllRemark" style="width:99px; height:20px;" value="<?php echo $resCL['IDProof_AllRemark']; ?>" disabled /></td>
  </tr>
<?php /************************************************* Address/ ID Proof Close *****************************************/ ?>  
<?php /************************************************* Career progression Open *****************************************/ ?>  
  <tr bgcolor="#FFFFFF">
  <td style="width:50px; font-family:Times New Roman;font-size:14px;" align="">&nbsp;&nbsp;<b>12.</b></td>
  <td style="width:600px; font-family:Times New Roman;font-size:14px;" align="center" valign="middle"><b>Career Progression</b></td>
  <td colspan="2">&nbsp;</td>
  </tr>
  <tr bgcolor="#FFFFFF">
  <td style="width:50px; font-family:Times New Roman;font-size:14px;" align="center">&nbsp;a)</td>
  <td style="width:600px; font-family:Times New Roman;font-size:14px;" align="" valign="middle">&nbsp;
  <input type="checkbox" name="ConfirmationAss_Letter" id="ConfirmationAss_Letter" value="<?php echo $resCL['CarProgress_ConfirmationAss_Letter'];?>" onClick="FunConfirmationAss_Letter()" <?php if($resCL['CarProgress_ConfirmationAss_Letter']=='Y'){echo 'checked';} ?> disabled />Confirmation Assessment & Letter
  </td>
  <td style="width:50px; font-family:Times New Roman;font-size:14px;font-weight:bold;" align="center">
  <?php if($resCL['CarProgress_ConfirmationAss_Letter']=='Y'){echo 'Yes';} else {echo 'No';} ?></td>
  <td style="width:100px; font-family:Times New Roman;font-size:14px;" align="">
<input name="ConfirmationAss_Letter_Remark" id="ConfirmationAss_Letter_Remark" style="width:99px; height:20px;" value="<?php echo $resCL['CarProgress_ConfirmationAss_Letter_Remark']; ?>" disabled /></td>
  </tr>
  <tr bgcolor="#FFFFFF">
  <td style="width:50px; font-family:Times New Roman;font-size:14px;" align="center">&nbsp;b)</td>
  <td style="width:600px; font-family:Times New Roman;font-size:14px;" align="" valign="middle">&nbsp;
  <input type="checkbox" name="AppraisalLetterAndPMS_Form" id="AppraisalLetterAndPMS_Form" value="<?php echo $resCL['CarProgress_AppraisalLetterAndPMS_Form'];?>" onClick="FunAppraisalLetterAndPMS_Form()" <?php if($resCL['CarProgress_AppraisalLetterAndPMS_Form']=='Y'){echo 'checked';} ?> disabled />Appraisal Letter & PMS form
  </td>
  <td style="width:50px; font-family:Times New Roman;font-size:14px;font-weight:bold;" align="center">
  <?php if($resCL['CarProgress_AppraisalLetterAndPMS_Form']=='Y'){echo 'Yes';} else {echo 'No';} ?></td>
  <td style="width:100px; font-family:Times New Roman;font-size:14px;" align="">
<input name="AppraisalLetterAndPMS_Form_Remark" id="AppraisalLetterAndPMS_Form_Remark" style="width:99px; height:20px;" value="<?php echo $resCL['CarProgress_AppraisalLetterAndPMS_Form_Remark']; ?>" disabled/></td>
  </tr>
  <tr bgcolor="#FFFFFF">
  <td style="width:50px; font-family:Times New Roman;font-size:14px;" align="center">&nbsp;c)</td>
  <td style="width:600px; font-family:Times New Roman;font-size:14px;" align="" valign="middle">&nbsp;
  <input type="checkbox" name="Transfer_Letter" id="Transfer_Letter" value="<?php echo $resCL['CarProgress_Transfer_Letter']; ?>" onClick="FunTransfer_Letter()" <?php if($resCL['CarProgress_Transfer_Letter']=='Y'){echo 'checked';} ?> disabled />Transfer letter
  </td>
  <td style="width:50px; font-family:Times New Roman;font-size:14px;font-weight:bold;" align="center">
  <?php if($resCL['CarProgress_Transfer_Letter']=='Y'){echo 'Yes';} else {echo 'No';} ?></td>
  <td style="width:100px; font-family:Times New Roman;font-size:14px;" align="">
<input name="Transfer_Letter_Remark" id="Transfer_Letter_Remark" style="width:99px; height:20px;" value="<?php echo $resCL['CarProgress_Transfer_Letter_Remark']; ?>" disabled /></td>
  </tr>
  <tr bgcolor="#FFFFFF">
  <td style="width:50px; font-family:Times New Roman;font-size:14px;" align="center">&nbsp;d)</td>
  <td style="width:600px; font-family:Times New Roman;font-size:14px;" align="" valign="middle">&nbsp;
  <input type="checkbox" name="DesigGradeRoleChange_Letter" id="DesigGradeRoleChange_Letter" value="<?php echo $resCL['CarProgress_DesigGradeRoleChange_Letter']; ?>" onClick="FunDesigGradeRoleChange_Letter()" <?php if($resCL['CarProgress_DesigGradeRoleChange_Letter']=='Y'){echo 'checked';} ?> disabled />Designation/ Grade/ Role Change letter
  </td>
  <td style="width:50px; font-family:Times New Roman;font-size:14px;font-weight:bold;" align="center">
  <?php if($resCL['CarProgress_DesigGradeRoleChange_Letter']=='Y'){echo 'Yes';} else {echo 'No';} ?></td>
  <td style="width:100px; font-family:Times New Roman;font-size:14px;" align="">
<input name="DesigGradeRoleChange_Letter_Remark" id="DesigGradeRoleChange_Letter_Remark" style="width:99px; height:20px;" value="<?php echo $resCL['CarProgress_DesigGradeRoleChange_Letter_Remark']; ?>" disabled /></td>
  </tr>
<?php /************************************************* Carrer Progression Close *****************************************/ ?>  
  
  <tr bgcolor="#FFFFFF">
  <td style="width:50px; font-family:Times New Roman;font-size:14px;" align="">&nbsp;&nbsp;<b>13.</b></td>
  <td style="width:600px; font-family:Times New Roman;font-size:14px;" align="" valign="middle">&nbsp;&nbsp; Govt. Scheme: &nbsp;&nbsp;
  <input type="checkbox" name="APY" id="APY" value="<?php echo $resCL['CarProgress_GovtScheme_APY']; ?>" onClick="FunAPY()" <?php if($resCL['CarProgress_GovtScheme_APY']=='Y'){echo 'checked';} ?> disabled />APY &nbsp;/ 
  
  <input type="checkbox" name="PMJJBY" id="PMJJBY" value="<?php echo $resCL['CarProgress_GovtScheme_PMJJBY']; ?>" onClick="FunPMJJBY()" <?php if($resCL['CarProgress_GovtScheme_PMJJBY']=='Y'){echo 'checked';} ?> disabled />PMJJBY &nbsp;/
  
  <input type="checkbox" name="PMSBY" id="PMSBY" value="<?php echo $resCL['CarProgress_GovtScheme_PMSBY']; ?>" onClick="FunPMSBY()" <?php if($resCL['CarProgress_GovtScheme_PMSBY']=='Y'){echo 'checked';} ?> disabled />PMSBY 
  </td>
  <td style="width:50px; font-family:Times New Roman;font-size:14px;font-weight:bold;" align="center">
  <?php if($resCL['CarProgress_GovtScheme_APY']=='Y' OR $resCL['CarProgress_GovtScheme_PMJJBY']=='Y' OR $resCL['CarProgress_GovtScheme_PMSBY']=='Y'){echo 'Yes';} else {echo 'No';} ?></td>
  <td style="width:100px; font-family:Times New Roman;font-size:14px;" align="">
  <input name="CarProgress_GovtScheme_Remark" id="CarProgress_GovtScheme_Remark" style="width:99px; height:20px;" value="<?php echo $resCL['CarProgress_GovtScheme_Remark']; ?>" disabled /></td>
  </tr>
  
  
  <tr bgcolor="#FFFFFF">
  <td style="width:50px; font-family:Times New Roman;font-size:14px;" align="">&nbsp;&nbsp;<b>14.</b></td>
  <td style="width:600px; font-family:Times New Roman;font-size:14px;" align="" valign="middle">&nbsp;
  <input type="checkbox" name="VehiAgreeForm" id="VehiAgreeForm" value="<?php echo $resCL['vehicle_AgreementForm']; ?>" onClick="FunVehiAgreeForm()" <?php if($resCL['vehicle_AgreementForm']=='Y'){echo 'checked';} ?> disabled />Vehicle Agreement form </td>
  <td style="width:50px; font-family:Times New Roman;font-size:14px;font-weight:bold;" align="center">
  <?php if($resCL['vehicle_AgreementForm']=='Y'){echo 'Yes';} else {echo 'No';} ?></td>
  <td style="width:100px; font-family:Times New Roman;font-size:14px;" align="">
  <input name="VehiAgreeForm_Remark" id="VehiAgreeForm_Remark" style="width:99px; height:20px;" value="<?php echo $resCL['vehicle_AgreementForm_Remark']; ?>" disabled /></td>
  </tr>
  <tr bgcolor="#FFFFFF">
  <td style="width:50px; font-family:Times New Roman;font-size:14px;" align="">&nbsp;&nbsp;<b>15.</b></td>
  <td style="width:600px; font-family:Times New Roman;font-size:14px;" align="" valign="middle">&nbsp;&nbsp;
  Any Other &nbsp;<input name="AnyOther" id="AnyOther" style="width:400px; height:20px;" maxlength="100" value="<?php echo $resCL['AnyOther']; ?>" disabled /></td>
  <td style="width:50px; font-family:Times New Roman;font-size:14px;font-weight:bold;" align="center">
  <?php if($resCL['AnyOther']!=''){echo 'Yes';} else {echo 'No';} ?></td>
  <td style="width:100px; font-family:Times New Roman;font-size:14px;" align="">&nbsp;</td>
  </tr>
  <tr bgcolor="#FFFFFF">
  <td style="width:50px; font-family:Times New Roman;font-size:14px;" align="">&nbsp;&nbsp;<b>16.</b></td>
  <td style="width:600px; font-family:Times New Roman;font-size:14px;" align="" valign="middle">&nbsp;&nbsp;
  Any Other &nbsp;<input name="AnyOther2" id="AnyOther2" style="width:400px; height:20px;" maxlength="100" value="<?php echo $resCL['AnyOther2']; ?>" disabled /></td>
  <td style="width:50px; font-family:Times New Roman;font-size:14px;font-weight:bold;" align="center">
  <?php if($resCL['AnyOther2']!=''){echo 'Yes';} else {echo 'No';} ?></td>
  <td style="width:100px; font-family:Times New Roman;font-size:14px;" align="">&nbsp;</td>
  </tr>
  </table>
</td>
</tr>
<tr>
  <td align="Right" class="fontButton" colspan="6"><table border="0" align="right" class="fontButton">
	<tr>	 
	  <td align="right" style="width:90px;"><input type="button" name="ChangeCheckList" id="ChangeCheckList" style="width:90px; display:block;" value="Edit" onClick="EditCheckList()">
		<input type="submit" name="EditCheckListE" id="EditCheckListE" style="width:90px;display:none;" value="save"></td>
	  <td align="right" style="width:90px;"><input type="button" name="RefreshCheckListE" id="RefreshCheckListE" style="width:90px;" value="refresh" onClick="javascript:window.location='EmpCheckList.php?ID=<?php echo $EMPID; ?>&Event=Edit'"/></td>
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

