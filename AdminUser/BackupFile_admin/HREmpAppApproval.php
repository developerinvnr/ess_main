<?php session_start(); 
require_once('config/config.php');

if($_REQUEST['action']=='approve' AND $_REQUEST['action']!='') 
{ 
 $PmsId=$_REQUEST['P']; $EmpId=$_REQUEST['E']; $YearId=$_REQUEST['Y']; $ComId=$_REQUEST['C']; $UId=$_REQUEST['U'];
 
 $SqlEmp = mysql_query("SELECT e.EmployeeID, EmpCode, Fname, Sname,Lname, d.DepartmentId, g.GradeId, g.DesigId, g.DepartmentId, DepartmentName, g.DateJoining, g.EmpVertical FROM hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_department d ON g.DepartmentId=d.DepartmentId WHERE e.CompanyId=".$ComId." AND e.EmployeeID=".$EmpId, $con) or die(mysql_error()); $ResEmp=mysql_fetch_assoc($SqlEmp); 
//$Ename = $ResEmp['Fname'].' '.$ResEmp['Sname'].' '.$ResEmp['Lname'];

$SqlStat=mysql_query("select l.*,tx.*,pf.*,esic.* from hrm_company_statutory_lumpsum l INNER JOIN hrm_company_statutory_taxsaving tx ON l.CompanyId=tx.CompanyId INNER JOIN hrm_company_statutory_pf pf ON l.CompanyId=pf.CompanyId INNER JOIN hrm_company_statutory_esic esic ON l.CompanyId=esic.CompanyId where l.CompanyId=".$ComId, $con); $ResStat=mysql_fetch_assoc($SqlStat);

$sqlSet=mysql_query("select EffectedDate2,AllowEmpDoj,Arrear_NOM from hrm_pms_setting where CompanyId=".$ComId." AND Process='PMS'", $con); $resSet=mysql_fetch_array($sqlSet); 
$EffDate=$resSet['EffectedDate2']; $AllowDoj=$resSet['AllowEmpDoj'];
$Prev_From_EffDate=date("Y-m-d",strtotime('-1 day', strtotime($resSet['EffectedDate2'])));
?> 
<input type="hidden" id="EMediPP" value="<?php echo $ResStat['MedicalPolicyPremium'];?>" readonly/>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>

<link type="text/css" href="css/body.css" rel="stylesheet"/>
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style>
.th{ font-family:Times New Roman;font-size:12px;height:25px;text-align:center;color:#FFFFFF;font-weight:bold; }
.tdl{ font-family:Times New Roman;font-size:12px;text-align:left; }
.tdc{ font-family:Times New Roman;font-size:12px;text-align:center; }
.tdinput{ font-family:Times New Roman;font-size:14px;text-align:center;width:100%; border:hidden; }
.tdinputl{ font-family:Times New Roman;font-size:14px;text-align:left;width:100%; border:hidden; }
.tdsel{ font-family:Times New Roman;font-size:14px;text-align:left; width:100%;}
.h{ text-align:center;font-family:Times New Roman;color:#FFFFFF;font-size:12px;font-weight:bold; }
.hl{ font-family:Times New Roman;color:#FFFFFF;font-size:14px;font-weight:bold; }
.td2{ text-align:center;font-family:Times New Roman;font-size:12px; }
.td22{ text-align:center;font-family:Times New Roman;font-size:12px; }
.td3{ font-family:Arial, Helvetica, sans-serif;font-size:12px; }
.td33{ font-family:Times New Roman;font-size:14px; }
.inner_table{height:150px;overflow-y:auto;width:auto;}
.blink_me { animation: blinker 1s linear infinite; }
@keyframes blinker {  50% { opacity: 0; } }
</style>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<!--<link rel="stylesheet" type="text/css" href="src/css/jscal2.css"/>
<link rel="stylesheet" type="text/css" href="src/css/border-radius.css"/>
<link rel="stylesheet" type="text/css" href="src/css/steel/steel.css"/>
<script type="text/javascript" src="src/js/jscal2.js"></script>
<script type="text/javascript" src="src/js/lang/en.js"></script>-->
<script src="js/jquery-1.9.1.js"></script>
<script type="text/javascript" src="js/jquery.freezeheader.js"></script>
<Script type="text/javascript" language="javascript">
$(document).ready(function () { $("#table1").freezeHeader({ 'height': '150px' }); })

/*------------------------------------------------HR SAVE Open --------------------------------*/
function ClickEdit(value) 
{ 
 if(value==1)
 { 
  document.getElementById("CtcPIS").readOnly=false; document.getElementById("CtcPCS").readOnly=false;
  document.getElementById("SaveIcon").style.display='block';
  document.getElementById("TD").style.backgroundColor='#CCFFCC'; 
  document.getElementById("TD2").style.backgroundColor='#CCFFCC';
  document.getElementById("CtcPIS").style.backgroundColor='#CCFFCC'; 
  document.getElementById("CtcPCS").style.backgroundColor='#CCFFCC'; 
  
  document.getElementById("HRDesigId").disabled=false; document.getElementById("HRGradeId").disabled=false;
  document.getElementById("HRDesigId").style.backgroundColor='#CCFFCC';
  document.getElementById("HRGradeId").style.backgroundColor='#CCFFCC';
  
  var TDNo=document.getElementById("No").value; document.getElementById("HRRemark").disabled=false;
  CalArrProInc();
 } 
 if(value==2)
 { 
  document.getElementById("CtcPIS").readOnly=true; document.getElementById("CtcPCS").readOnly=true;
  document.getElementById("SaveIcon").style.display='none';
  document.getElementById("TD").style.backgroundColor='#FFFFFF'; 
  document.getElementById("TD2").style.backgroundColor='#FFFFFF';
  document.getElementById("CtcPIS").style.backgroundColor='#FFFFFF'; 
  document.getElementById("CtcPCS").style.backgroundColor='#FFFFFF'; 
  
  document.getElementById("HRDesigId").disabled=false; document.getElementById("HRGradeId").disabled=false;
  document.getElementById("HRDesigId").style.backgroundColor='#CCFFCC';
  document.getElementById("HRGradeId").style.backgroundColor='#CCFFCC';
  
  var TDNo=document.getElementById("No").value; document.getElementById("HRRemark").disabled=true; 
  document.getElementById("TDC"+TDNo).style.backgroundColor='#FFFFFF'; 
  var PmsId=document.getElementById("PmsId").value; var EmpId=document.getElementById("EmpId").value; 
  
  var ProGSPM = parseFloat(document.getElementById("PIS").value); 
  var Per_ProGSPM = parseFloat(document.getElementById("PPIS").value); 
  var ProSC = parseFloat(document.getElementById("PCS").value); 
  var Per_SC=parseFloat(document.getElementById("PPCS").value);
  var Per_TotalProGSPM = parseFloat(document.getElementById("PINMS").value); 
  var TotalProGSPM = parseFloat(document.getElementById("GMS").value); 
  var TotalAnnualSalary=document.getElementById("GAS").value;
  var Per_AG=parseFloat(document.getElementById("ActualPer_Gross").value);
  var Per_ProSC=document.getElementById("PPCS").value; 
  var IncSalaryPM=document.getElementById("INMS").value;  
  var ActualPer=Math.round((Per_SC+Per_ProGSPM)*100)/100;
  
  /** Ctc Open ***********/
  var CtcProGSPM = parseFloat(document.getElementById("CtcPIS").value); 
  var CtcPer_ProGSPM = parseFloat(document.getElementById("CtcPPIS").value); 
  var CtcProSC = parseFloat(document.getElementById("CtcPCS").value); 
  var CtcPer_SC=parseFloat(document.getElementById("CtcPPCS").value);
  var CtcIncSalaryPM=document.getElementById("CtcINMS").value; 
  var CtcPer_TotalProGSPM = parseFloat(document.getElementById("CtcPINMS").value); 
  var CtcTotalAnnualSalary=document.getElementById("CtcGAS").value;
  var CtcActualPer=Math.round((CtcPer_SC+CtcPer_ProGSPM)*100)/100;
  /** Ctc Open ***********/
  
  var ComId=document.getElementById("ComId").value; var Rating=document.getElementById("Rating").value;
  var MinV=parseFloat(document.getElementById("MinV").value); var MaxV=parseFloat(document.getElementById("MaxV").value);
  var Cal_MinGSV=document.getElementById("Cal_MinGSV").value; 
  var UId=document.getElementById("UId").value; var Score=document.getElementById("Score").value; 
  var DesigId=document.getElementById("DesigId").value; var GradeId=document.getElementById("GradeId").value;  
  var HRRemark=document.getElementById("HRRemark").value; var CurrDesigId=document.getElementById("EmpCurrDesigId").value;
  var CurrGradeId=document.getElementById("EmpCurrGradeId").value;
  var UpDesigId = document.getElementById("UpDesigId").value; 
  var Extra3Month = document.getElementById("Extra3Month").value;
  
  var HRDesigId=document.getElementById("HRDesigId").value;
  var HRGradeId=document.getElementById("HRGradeId").value;
  
  var HODMainCtc=document.getElementById("HODMainCtc").value;
  
  if(HODMainCtc!=CtcProGSPM)
  {
   var ActualInc=0; var ProRataInc=0; var ActualIncAmt=0; var ProRataIncAmt=0; 
  }
  else
  {
   var ActualInc = document.getElementById("ActualInc").value;
   var ProRataInc = document.getElementById("ProRataInc").value;
   var ActualIncAmt = document.getElementById("ActualIncAmt").value;
   var ProRataIncAmt = document.getElementById("ProRataIncAmt").value;
  }
  
  
  var agree=confirm("Are you sure you want to approved data?"); 
  if(agree) 
  {
   var url = 'HRNormalizedInc.php'; var pars = 'AppProGSPM='+ProGSPM+'&PmsId='+PmsId+'&EmpId='+EmpId+'&Per_ProGSPM='+Per_ProGSPM+'&ProSC='+ProSC+'&Per_ProSC='+Per_ProSC+'&TProGSPM='+TotalProGSPM+'&Per_TProGSPM='+Per_TotalProGSPM+'&IncSalaryPM='+IncSalaryPM+'&TAS='+TotalAnnualSalary+'&UId='+UId+'&Score='+Score+'&Rating='+Rating+'&DesigId='+DesigId+'&GradeId='+GradeId+'&Remark='+HRRemark+'&CurrDId='+CurrDesigId+'&CurrGId='+CurrGradeId+'&ActualPer='+ActualPer+'&Extra3Month='+Extra3Month+'&CtcProGSPM='+CtcProGSPM+'&CtcPer_ProGSPM='+CtcPer_ProGSPM+'&CtcProSC='+CtcProSC+'&CtcPer_ProSC='+CtcPer_SC+'&CtcTProGSPM='+CtcTotalAnnualSalary+'&CtcPer_TProGSPM='+CtcPer_TotalProGSPM+'&CtcIncSalaryPM='+CtcIncSalaryPM+'&CtcTAS='+CtcTotalAnnualSalary+'&CtcActualPer='+CtcActualPer+'&HRDesigId='+HRDesigId+'&HRGradeId='+HRGradeId+'&ActualInc='+ActualInc+'&ProRataInc='+ProRataInc+'&ActualIncAmt='+ActualIncAmt+'&ProRataIncAmt='+ProRataIncAmt; 
     //+'&CtcProGSPM='+CtcProGSPM+'&CtcPer_ProGSPM='+CtcPer_ProGSPM+'&CtcProSC='+CtcProSC+'&CtcPer_ProSC='+CtcPer_SC+'&CtcTProGSPM='+CtcTotalAnnualSalary+'&CtcPer_TProGSPM='+CtcPer_TotalProGSPM+'&CtcIncSalaryPM='+CtcIncSalaryPM+'&CtcTAS='+CtcTotalAnnualSalary+'&CtcActualPer='+CtcActualPer
   
   var myAjax = new Ajax.Request( url, { method: 'post', parameters: pars, onComplete: show_ApprovedInc });
   return true; 
  }else{ return false; }
 } 
}
function show_ApprovedInc(originalRequest)
{ document.getElementById("msg").innerHTML = originalRequest.responseText; 
  var GSPM = parseFloat(document.getElementById("GMS").value); 
  var EmpGS = document.getElementById("EmpGrossMonSalary").value=Math.round((GSPM)*100)/100; 
  document.getElementById("ChangeCtc").disabled=false; 
  document.getElementById("ChangeElig").disabled=false; 
  document.getElementById("EmpActPf").disabled=true; 
  document.getElementById("EmpComActPf").disabled=true; 
  var GS_PAC = document.getElementById("GrossMonSalary_PAC").value=Math.round((GSPM)*100)/100;  
  var GMS_PAC = document.getElementById("GMS_PAC").value=Math.round((GSPM)*100)/100; 
  GrossSalary(0); 
} 


function CalArrProInc()
{
/****************************** Arreaer Open ******/
var IncSalaryPM = parseFloat(document.getElementById("INMS").value);
document.getElementById("Extra3Month").value=0;

}

function CalProInc()
{ 
 var ProGSPM = parseFloat(document.getElementById("PIS").value); 
 var Per_ProGSPM = parseFloat(document.getElementById("PPIS").value); 
 var ProSC = parseFloat(document.getElementById("PCS").value);
 var TotalProGSPM = parseFloat(document.getElementById("GMS").value);
 var Per_TotalProGSPM = parseFloat(document.getElementById("PINMS").value); 
 var GS = parseFloat(document.getElementById("GS").value); 
 var MinV = parseFloat(document.getElementById("MinV").value); 
 var MaxV= parseFloat(document.getElementById("MaxV").value); 
 
 /** Ctc Open **/
 var CtcProGSPM =parseFloat(document.getElementById("CtcPIS").value);
 var CtcPer_ProGSPM = parseFloat(document.getElementById("CtcPPIS").value); 
 var CtcProSC = parseFloat(document.getElementById("CtcPCS").value);
 var CtcTotalProGSPM = parseFloat(document.getElementById("CtcGAS").value);
 var CtcPer_TotalProGSPM = parseFloat(document.getElementById("CtcPINMS").value);
 var Ctc = parseFloat(document.getElementById("Ctc").value);   
 /** Ctc Close **/
 
 /** Ctc Calculation Open **/ 
 var Cal_OnePer = Math.round(((Ctc*1)/100)*100)/100;  
 var Cal_MinCtcSV = document.getElementById("Cal_MinCtcSV").value=Math.round((CtcProGSPM-Ctc)*100)/100;
 var Cal_Per_ProInc = document.getElementById("CtcPPIS").value=Math.round((Cal_MinCtcSV/Cal_OnePer)*100)/100; 
 var Cal_Per_ProSC = document.getElementById("CtcPPCS").value=Math.round((CtcProSC/Cal_OnePer)*100)/100; 
 var Cal_TotCtc = document.getElementById("CtcGAS").value=Math.round((CtcProGSPM+CtcProSC)*100)/100; 
 var Cal_Per_TotGSPM = document.getElementById("CtcPINMS").value=Math.round((Cal_Per_ProInc+Cal_Per_ProSC)*100)/100; 
 document.getElementById("CtcINMS").value=Math.round((Cal_MinCtcSV+CtcProSC)*100)/100; 
 /** Ctc Calculation Close **/
   
   
/************** New New New New New New New New New New New New New New New New New New Open Open */
/************** New New New New New New New New New New New New New New New New New New Open Open */

//var Mediclaim_val=parseFloat(document.getElementById("EMediPP").value);
var BWageId=parseFloat(document.getElementById("BWageId").value); 

//Bonus
if(Cal_TotCtc<=682355.38)
{ var BonusM = Math.round(((BWageId*20)/100)*100)/100; var BonusY = Math.round((BonusM*12)*100)/100;  }
else { var BonusM=0; var BonusY=0; } 

//Employer ESIC
if(Cal_TotCtc<=275304.01 && BonusM==2266){ var ComESIC=Math.round(((Cal_TotCtc*2.974893101)/100)*100)/100;}
else if(Cal_TotCtc<=275429.87 && BonusM==2110){ var ComESIC=Math.round(((Cal_TotCtc*2.973533698)/100)*100)/100;}
else if(Cal_TotCtc<=275555.73 && BonusM==1954){ var ComESIC=Math.round(((Cal_TotCtc*2.972175538)/100)*100)/100;}
else if(Cal_TotCtc<=275660.61 && BonusM==1824){ var ComESIC=Math.round(((Cal_TotCtc*2.971044721)/100)*100)/100;}
else { var ComESIC=0; } 

//Mediclaim
if((Cal_TotCtc<=275304.01 && BonusM==2266) || (Cal_TotCtc<=275429.87 && BonusM==2110) || (Cal_TotCtc<=275555.73 && BonusM==1954) || (Cal_TotCtc<=275660.61 && BonusM==1824))
{ var Mediclaim=0; }else{ var Mediclaim=parseFloat(document.getElementById("EMediPP").value); }
//Employer PF Contribustion
var ComPF =Math.round(((((Cal_TotCtc-BonusY)-(ComESIC+Mediclaim))*4.49762145)/100)*100)/100; 
//Gratuity
var Gratuity =Math.round(((((Cal_TotCtc-BonusY)-(ComESIC+Mediclaim))*1.801931373)/100)*100)/100; 
//Annual Gross
var AnnualGross =Math.round((((Cal_TotCtc-BonusY)-(Gratuity+ComPF+ComESIC+Mediclaim))+BonusY)*100)/100; 
//Monthly Gross
var MonthlyGross = Math.round(AnnualGross/12);  


document.getElementById("PIS").value=MonthlyGross;
var ProGSPM = parseFloat(document.getElementById("PIS").value);
var OldGSPM = parseFloat(document.getElementById("GS").value);

/** Gross Open **/ 
var Cal_OnePer1 = Math.round(((OldGSPM*1)/100)*100)/100;   
var Cal_MinGSV1 = document.getElementById("Cal_MinGSV").value=Math.round((ProGSPM-OldGSPM)*100)/100;
var Cal_Per_ProInc1 = document.getElementById("PPIS").value=Math.round((Cal_MinGSV1/Cal_OnePer1)*100)/100;  
var Cal_TotGSPM1 = document.getElementById("GMS").value=ProGSPM; 
var Cal_Per_TotGSPM1 = document.getElementById("PINMS").value=Cal_Per_ProInc1;
var Cal_IncGrossAnnual1 = document.getElementById("GAS").value=Math.round((Cal_TotGSPM1*12)*100)/100;
var Cal_IncGrossMonthalySalary = document.getElementById("INMS").value=Cal_MinGSV1;
/** Gross Close **/

/************** New New New New New New New New New New New New New New New New New New Close Close */
/************** New New New New New New New New New New New New New New New New New New Close Close */   
 
}

function ClickSaveEdit(EmpId,PmsId)
{ 
 var ProGSPM = parseFloat(document.getElementById("PIS").value); 
 var Per_ProGSPM = parseFloat(document.getElementById("PPIS").value); 
 var ProSC = parseFloat(document.getElementById("PCS").value); 
 var TotalProGSPM = parseFloat(document.getElementById("GMS").value); 
 var Per_TotalProGSPM = parseFloat(document.getElementById("PINMS").value);  
 var ComId=document.getElementById("ComId").value; var Rating=document.getElementById("Rating").value;
 var MinV=parseFloat(document.getElementById("MinV").value); var MaxV=parseFloat(document.getElementById("MaxV").value);
 var Per_ProSC=document.getElementById("PPCS").value; var IncSalaryPM=document.getElementById("INMS").value; 
 var TotalAnnualSalary=document.getElementById("GAS").value; var Cal_MinGSV=document.getElementById("Cal_MinGSV").value; 
 var UId=document.getElementById("UId").value; var Score=document.getElementById("Score").value;  
 var DesigId=document.getElementById("DesigId").value; var GradeId=document.getElementById("GradeId").value;  
 var HRRemark=document.getElementById("HRRemark").value; var CurrDesigId=document.getElementById("EmpCurrDesigId").value;
 var CurrGradeId=document.getElementById("EmpCurrGradeId").value; 
 var UpDesigId = document.getElementById("UpDesigId").value;  var Y = document.getElementById("YId").value;
 var Per_SC=parseFloat(document.getElementById("PPCS").value);   
 var Per_AG=parseFloat(document.getElementById("ActualPer_Gross").value); 
 var ActualPer=Math.round((Per_SC+Per_AG)*100)/100; 
 var Extra3Month = document.getElementById("Extra3Month").value;
 
 /** Ctc Open ***********/
  var CtcProGSPM = parseFloat(document.getElementById("CtcPIS").value); 
  var CtcPer_ProGSPM = parseFloat(document.getElementById("CtcPPIS").value); 
  var CtcProSC = parseFloat(document.getElementById("CtcPCS").value); 
  var CtcPer_SC=parseFloat(document.getElementById("CtcPPCS").value);
  var CtcIncSalaryPM=document.getElementById("CtcINMS").value; 
  var CtcPer_TotalProGSPM = parseFloat(document.getElementById("CtcPINMS").value); 
  var CtcTotalAnnualSalary=document.getElementById("CtcGAS").value;
  var CtcActualPer=Math.round((CtcPer_SC+CtcPer_ProGSPM)*100)/100;
  /** Ctc Open ***********/
  
  var HRDesigId=document.getElementById("HRDesigId").value;
  var HRGradeId=document.getElementById("HRGradeId").value;
  
  var HODMainCtc=document.getElementById("HODMainCtc").value;
  
  if(HODMainCtc!=CtcProGSPM)
  {
   var ActualInc=0; var ProRataInc=0; var ActualIncAmt=0; var ProRataIncAmt=0; 
  }
  else
  {
   var ActualInc = document.getElementById("ActualInc").value;
   var ProRataInc = document.getElementById("ProRataInc").value;
   var ActualIncAmt = document.getElementById("ActualIncAmt").value;
   var ProRataIncAmt = document.getElementById("ProRataIncAmt").value;
  }
 
 var agree=confirm("Are you sure you want to save data?"); 
 if (agree) 
 {
  var url = 'HRNormalizedInc.php'; var pars = 'ProGSPM='+ProGSPM+'&PmsId='+PmsId+'&EmpId='+EmpId+'&Per_ProGSPM='+Per_ProGSPM+'&ProSC='+ProSC+'&Per_ProSC='+Per_ProSC+'&TProGSPM='+TotalProGSPM+'&Per_TProGSPM='+Per_TotalProGSPM+'&IncSalaryPM='+IncSalaryPM+'&TAS='+TotalAnnualSalary+'&UId='+UId+'&Score='+Score+'&Rating='+Rating+'&DesigId='+DesigId+'&GradeId='+GradeId+'&Remark='+HRRemark+'&CurrDId='+CurrDesigId+'&CurrGId='+CurrGradeId+'&ActualPer='+ActualPer+'&Y='+Y+'&Extra3Month='+Extra3Month+'&CtcProGSPM='+CtcProGSPM+'&CtcPer_ProGSPM='+CtcPer_ProGSPM+'&CtcProSC='+CtcProSC+'&CtcPer_ProSC='+CtcPer_SC+'&CtcTProGSPM='+CtcTotalAnnualSalary+'&CtcPer_TProGSPM='+CtcPer_TotalProGSPM+'&CtcIncSalaryPM='+CtcIncSalaryPM+'&CtcTAS='+CtcTotalAnnualSalary+'&CtcActualPer='+CtcActualPer+'&HRDesigId='+HRDesigId+'&HRGradeId='+HRGradeId+'&ActualInc='+ActualInc+'&ProRataInc='+ProRataInc+'&ActualIncAmt='+ActualIncAmt+'&ProRataIncAmt='+ProRataIncAmt; 
  
//+'&CtcProGSPM='+CtcProGSPM+'&CtcPer_ProGSPM='+CtcPer_ProGSPM+'&CtcProSC='+CtcProSC+'&CtcPer_ProSC='+CtcPer_SC+'&CtcTProGSPM='+CtcTotalAnnualSalary+'&CtcPer_TProGSPM='+CtcPer_TotalProGSPM+'&CtcIncSalaryPM='+CtcIncSalaryPM+'&CtcTAS='+CtcTotalAnnualSalary+'&CtcActualPer='+CtcActualPer
  
  var myAjax = new Ajax.Request( url, { method: 'post', parameters: pars, onComplete: show_HRIncNormalized });
  return true; 
 }else{ return false; } 
}
function show_HRIncNormalized(originalRequest)
{ document.getElementById("msg").innerHTML = originalRequest.responseText; 
  document.getElementById("PIS").readOnly=true; document.getElementById("PCS").readOnly=true;
  document.getElementById("SaveIcon").style.display='none';
  document.getElementById("TD").style.backgroundColor='#FFFFFF'; 
  document.getElementById("TD2").style.backgroundColor='#FFFFFF'; 
  document.getElementById("CtcPIS").style.backgroundColor='#FFFFFF'; 
  document.getElementById("CtcPCS").style.backgroundColor='#FFFFFF'; 
  var TDNo=document.getElementById("No").value;  //document.getElementById("TDC"+TDNo).style.backgroundColor='#FFFFFF'; alert("dd");
  var GSPM = parseFloat(document.getElementById("GMS").value);  
  var EmpGS = document.getElementById("EmpGrossMonSalary").value=Math.round((GSPM)*100)/100;
  var GS_PAC = document.getElementById("GrossMonSalary_PAC").value=Math.round((GSPM)*100)/100;   
  var GMS_PAC = document.getElementById("GMS_PAC").value=Math.round((GSPM)*100)/100; 
  document.getElementById("ChangeCtc").disabled=false; 
  document.getElementById("ChangeElig").disabled=false;
  
  document.getElementById("EmpActPf").disabled=true; 
  document.getElementById("EmpComActPf").disabled=true;
  
  GrossSalary(0);
}
/*------------------------------------------------HR SAVE Close --------------------------------*/ 
</script>

</head>
<body class="body">
<?php $SqlP=mysql_query("select * from hrm_employee_pms where AssessmentYear=".$YearId." AND EmployeeID=".$EmpId." AND EmpPmsId=".$PmsId, $con); $ResP=mysql_fetch_assoc($SqlP);

/*
$sqlD=mysql_query("select DesigName,DesigId from hrm_designation where DesigId=".$ResP['Hod_EmpDesignation'],$con); 
$sqlG=mysql_query("select GradeValue from hrm_grade where GradeId=".$ResP['Hod_EmpGrade']." AND CompanyId=".$ComId,$con);
*/


if($ResP['HR_DesigId']>0){$qryD="DesigId=".$ResP['HR_DesigId'];}else{$qryD="DesigId=".$ResP['Hod_EmpDesignation'];}
if($ResP['HR_GradeId']>0){$qryG="GradeId=".$ResP['HR_GradeId'];}else{$qryG="GradeId=".$ResP['Hod_EmpGrade'];}

$sqlD=mysql_query("select DesigName,DesigId from hrm_designation where ".$qryD,$con); 
$sqlG=mysql_query("select GradeValue from hrm_grade where CompanyId=".$ComId." AND ".$qryG,$con);


$sqlGrade=mysql_query("select GradeValue from hrm_grade where GradeId=".$ResP['Hod_EmpGrade']." AND CompanyId=".$ComId,$con);$sqlDe=mysql_query("select DesigName,DesigId from hrm_designation where DesigId=".$ResP['HR_CurrDesigId'], $con);
$sqlGr=mysql_query("select GradeValue from hrm_grade where GradeId=".$ResP['HR_CurrGradeId']." AND CompanyId=".$ComId,$con);
$resD=mysql_fetch_assoc($sqlD); $resG=mysql_fetch_assoc($sqlG); $resGrade=mysql_fetch_assoc($sqlGrade);
$resDe=mysql_fetch_assoc($sqlDe); $resGr=mysql_fetch_assoc($sqlGr);

$sqlN1 = mysql_query("select Fname, Sname, Lname from hrm_employee where EmployeeID=".$ResP['Appraiser_EmployeeID'],$con); 
$sqlN2 = mysql_query("select Fname, Sname, Lname from hrm_employee where EmployeeID=".$ResP['Reviewer_EmployeeID'],$con);
$sqlN3 = mysql_query("select Fname, Sname, Lname from hrm_employee where EmployeeID=".$ResP['HOD_EmployeeID'], $con);
$resN1=mysql_fetch_assoc($sqlN1); $resN2=mysql_fetch_assoc($sqlN2); $resN3=mysql_fetch_assoc($sqlN3);


$sqB=mysql_query("select BWageId from hrm_employee_general where EmployeeID=".$EmpId,$con); $reB=mysql_fetch_assoc($sqB);
$sqlB=mysql_query("select * from hrm_bonus_wages where BWageId=".$reB['BWageId']." AND CompanyId=".$_REQUEST['C']." AND YearId=".$YearId,$con); $resB=mysql_fetch_assoc($sqlB);

//echo "select * from hrm_bonus_wages where BWageId=".$reB['BWageId']." AND YearId=".$YearId;
//$sqlB=mysql_query("select * from hrm_bonus_wages where BWageId=".$ResEmp['BWageId']); $resB=mysql_fetch_assoc($sqlB);
if(date("m")==01 OR date("m")==02 OR date("m")==03 OR date("m")==10 OR date("m")==11 OR date("m")==12)
{ $WagesBonus=$resB['PerMonthOct']; }
else
{
 $WagesBonus=$resB['PerMonthOct']; 
 //$WagesBonus=$resB['PerMonthApr']; 
}
if($WagesBonus==''){$WagesBonus=0;}

if($ResEmp['EmpVertical']>0)
{ 

 if($ResP['Hod_EmpGrade']>0){ $nxtGrade=$ResP['Hod_EmpGrade']; }else{ $nxtGrade=$ResP['HR_CurrGradeId']; } 
    
 $sqVer=mysql_query("select Min_Ctc,Max_Ctc from hrm_pms_vertical_increment where DepId=".$ResP['HR_Curr_DepartmentId']." AND VerticalId=".$ResEmp['EmpVertical']." AND ".$nxtGrade.">=Min_GradeId AND ".$nxtGrade."<=Max_GradeId",$con); 
 $rowVer=mysql_num_rows($sqVer); $resVer=mysql_fetch_assoc($sqVer);
 if($rowVer>0 AND $resVer['Max_Ctc']>0){ $MaxVCtc=$resVer['Max_Ctc'];}
 else{ $MaxVCtc=0; }
}
else
{
 $MaxVCtc=0; 
}

if($ResP['Hod_EmpGrade']!='' AND $ResP['Hod_EmpGrade']>0){ $GradeId=$ResP['Hod_EmpGrade']; }  
elseif($ResP['Hod_EmpGrade']=='' OR $ResP['Hod_EmpGrade']==0) { $GradeId=$ResP['HR_CurrGradeId']; }

if($resGrade['GradeValue']!=''){ $Grade=$resGrade['GradeValue']; }  
elseif($resGrade['GradeValue']=='') { $Grade=$resGr['GradeValue']; } 

?> 

<table class="table" style="width:100%;">
 <tr>
 <td valign="top">
  <input type="hidden" id="BWageId" value="<?php echo $WagesBonus; ?>" />
  <input type="hidden" id="MaxVCtc" value="<?php echo $MaxVCtc; ?>" />
  <input type="hidden" id="EmpActPf" value="<?php echo $ResEmp['EmpActPf']; ?>" />
  
 <input type="hidden" id="EmpId" value="<?php echo $resSet['Arrear_NOM']; ?>" />
 <input type="hidden" id="EmpId" value="<?php echo $EmpId; ?>" />
 <input type="hidden" id="PmsId" value="<?php echo $PmsId; ?>" />
 <input type="hidden" id="YId" value="<?php echo $YearId; ?>" /> 
 <input type="hidden" id="UId" value="<?php echo $UId; ?>" />
 <input type="hidden" id="ComId" value="<?php echo $ComId; ?>" />
 <input type="hidden" id="EmpCurrDesigId" value="<?php echo $ResEmp['DesigId']; ?>" />
 <input type="hidden" id="EmpCurrGradeId" value="<?php echo $ResEmp['GradeId']; ?>" />
 <input type="hidden" id="UpDesigId" value="<?php echo $ResEmp['DesigId']; ?>" />
 <table style="width:100%;margin-top:0px;" border="0">
  <tr>
   <td>
   <table style="width:100%;">
    <tr>	
     <td valign="top" style="width:100%;">
     <table border="0" width="100%">
     <tr>
	  <td class="h" style="color:#000000;font-size:18px;">
	  <font color="#6A3500">EmpCode: </font><?php echo $ResEmp['EmpCode']; ?>,&nbsp;&nbsp;&nbsp;&nbsp;
	  <font color="#6A3500">Name: </font><?php echo $ResEmp['Fname'].' '.$ResEmp['Sname'].' '.$ResEmp['Lname']; ?>,&nbsp;&nbsp;&nbsp;&nbsp;
	  <font color="#6A3500">Department: </font><?php echo $ResEmp['DepartmentName']; ?>,&nbsp;&nbsp;&nbsp;&nbsp;
	  </td>
	 </tr>
	 <tr>
	  <td class="h" style="color:#0060BF;">
	  <font color="#6A3500"><u>Appraiser</u>: </font><?php echo $resN1['Fname'].' '.$resN1['Sname'].' '.$resN1['Lname']; ?>,&nbsp;&nbsp;&nbsp;&nbsp;<font color="#6A3500"><u>Reviewer</u>: </font><?php echo $resN2['Fname'].' '.$resN2['Sname'].' '.$resN2['Lname']; ?>,&nbsp;&nbsp;&nbsp;&nbsp;<font color="#6A3500"><u>HOD</u>: </font><?php echo $resN3['Fname'].' '.$resN3['Sname'].' '.$resN3['Lname']; ?>
	  </td>
	 </tr>
     </table>
     </td>
    </tr>
   </table>	
   </td>
  </tr>
  <tr>
  <td style="width:100%;">
  <table border="1" id="table1" cellspacing="0" style="width:100%;">
   <div class="thead">
   <thead>
   <tr bgcolor="#7a6189">
	<td class="h" style="width:4%;">Pre. Grade</td>
	<td class="h" style="width:4%;">Pro. Grade</td>
    <td class="h" style="width:10%;">Previouse Designation</td>
    <td class="h" style="width:10%;">Proposed Designation</td>
    <td class="h" style="width:5%;">Change<br>Date</td>
    <td class="h" style="width:4%;">Basic</td> 
    <td class="h" style="width:4%;">HRA</td> 
    <td class="h" style="width:4%;">CA</td> 
    <td class="h" style="width:4%;">Car Allow</td>
    <td class="h" style="width:4%;">SA</td>   
    <td class="h" style="width:5%;">Pre.<br>GSPM</td>
    <td class="h" style="width:5%;">PGSPM</td>
    <!--<td class="h" style="width:3%;">% PIS</td>-->
    <td class="h" style="width:4%;">Salary<br>Corr<sup>n</sup></td>
    <td class="h" style="width:5%;">Total<br>PGSPM</td>
    <td class="h" style="width:3%;">% Total<br>PGSPM</td>
    <!--<td class="h" style="width:5%;">CTC</td>-->
	
	<?php /************************ CTC Open ***********/?> 
	 <td class="th" style="width:5%;"><b>Pre<br>CTC</b></td>			  
	 <td class="th" style="width:5%;"><b>Prop<sup>d</sup><br>CTC</b></td>
	 <td class="th" style="width:3%;"><b>Prop<sup>d</sup><br>(%)</b></td>
	 <td class="th" style="width:5%;"><b>CTC<br>Corr<sup>n</sup></b></b></td>
	 <td class="th" style="width:5%;"><b>Tot<sup>l</sup><br>Prop<sup>d</sup></b></td>
	 <td class="th" style="width:3%;"><b>Tot<sup>l</sup><br>(%)</b></td>	  
	<?php /************************ CTC Close ***********/?>
	
    <td class="h" style="width:3%;">Score</td>
    <td class="h" style="width:3%;">Rating</td>
   </tr>
   </thead>
   </div>
   <?php $sqlHistory=mysql_query("select * from hrm_pms_appraisal_history where EmpCode=".$ResEmp['EmpCode']." AND CompanyId=".$ComId." order by SalaryChange_Date DESC", $con); $Sno=1; while($resHistory=mysql_fetch_array($sqlHistory)){ 
   $OldY=date("Y")-1;
   if($resHistory['SalaryChange_Date']>='2012-01-01' AND $resHistory['SalaryChange_Date']<=$OldY.'-12-31')
   {
    $sn_ctc=mysql_query("select Status,CAR_ALL_Value,Tot_CTC from hrm_employee_ctc where (CtcCreatedDate='".$resHistory['SalaryChange_Date']."' OR SalChangeDate='".$resHistory['SalaryChange_Date']."') AND CtcId=(select Max(CtcId) from hrm_employee_ctc where EmployeeID=".$EmpId." AND (CtcCreatedDate='".$resHistory['SalaryChange_Date']."' OR SalChangeDate='".$resHistory['SalaryChange_Date']."'))",$con); $rn_ctc=mysql_fetch_assoc($sn_ctc);
	
    $preCtc=floatval($rn_ctc['Tot_CTC']); $propCtc=floatval($resHistory['ProIncCTC']); //echo 'bb='.$resHistory['SalaryChange_Date'].'-'.$preCtc;
	$propCtc_per=$resHistory['Percent_ProIncCTC']; $corrCtc=floatval($resHistory['ProCorrCTC']); 
	$totprop=floatval($resHistory['Proposed_ActualCTC']); $totprop_per=$resHistory['Percent_IncNetCTC'];
   }
   elseif($resHistory['SalaryChange_Date']>='2020-01-01')
   {
    $snpms=mysql_query("select EmpCurrCtc from hrm_employee_pms where EmpPmsId=".$resHistory['EmpPmsId']." AND EmployeeID=".$EmpId,$con); $rnpms=mysql_fetch_assoc($snpms);
	
    $preCtc=floatval($rnpms['EmpCurrCtc']); $propCtc=floatval($resHistory['ProIncCTC']); //echo 'dd='.$preCtc;
	$propCtc_per=$resHistory['Percent_ProIncCTC']; $corrCtc=floatval($resHistory['ProCorrCTC']); 
	$totprop=floatval($resHistory['Proposed_ActualCTC']); $totprop_per=$resHistory['Percent_IncNetCTC'];
   }
   else { $preCtc=''; $propCtc=''; $propCtc_per=''; $corrCtc==''; $totprop=''; $totprop_per=''; }
   
   if(($resHistory['SalaryChange_Date']>='2012-01-01' AND $preCtc>=0) OR $resHistory['SalaryChange_Date']<'2012-01-01') //AND $preCtc>0
   {
   ?>			
   <div class="tbody">
   <tbody>
   <tr bgcolor="#FFFFFF"><input type="hidden" value="<?php echo $Sno; ?>" />
    <td class="td22"><?php echo $resHistory['Current_Grade']; ?></td>
	<td class="td22"><?php if($resHistory['Current_Grade']!=$resHistory['Proposed_Grade'] AND $resHistory['Proposed_Grade']!=''){ echo $resHistory['Proposed_Grade']; }?></td>
	<td class="td33"><input type="text" class="td22" style="border:hidden;width:98%;text-align:left;" value="<?php echo ucwords(strtolower($resHistory['Current_Designation'])); ?>" readonly/></td>
	<td class="td33"><input type="text" class="td22" style="border:hidden;width:98%;text-align:left;" value="<?php if($resHistory['Proposed_Designation']!=$resHistory['Current_Designation']){ echo ucwords(strtolower($resHistory['Proposed_Designation'])); }?>" readonly/></td>
	<td class="td22"><input type="text" class="td22" style="border:hidden;width:98%;" value="<?php echo date("d-M-y",strtotime($resHistory['SalaryChange_Date'])); ?>" readonly/></td>
	<td class="td22"><?php echo floatval($resHistory['Salary_Basic']); ?></td>
	<td class="td22"><?php echo floatval($resHistory['Salary_HRA']); ?></td>
	<td class="td22"><?php echo floatval($resHistory['Salary_CA']); ?></td>
	<td class="td22"><?php echo floatval($rn_ctc['CAR_ALL_Value']); ?></td>
	<td class="td22"><?php echo floatval($resHistory['Salary_SA']); ?></td>
	<td class="td22" id="TDC<?php echo $Sno; ?>"><?php echo floatval($resHistory['Previous_GrossSalaryPM']); ?></td>
	<td class="td22"><?php echo floatval($resHistory['Proposed_GrossSalaryPM']); ?></td>
	
	<?php /*?><td class="td22"><?php echo floatval($resHistory['Prop_PeInc_GSPM']); ?></td><?php */?>
	<td class="td22"><?php echo floatval($resHistory['PropSalary_Correction']); ?></td>
	<td class="td22"><?php echo floatval($resHistory['TotalProp_GSPM']); ?></td>
	<td class="td22"><?php echo floatval($resHistory['TotalProp_PerInc_GSPM']); ?></td>
	<?php /*?><td class="td22"><?php echo floatval($rn_ctc['Tot_CTC']); ?></td><?php */?>
	
	<!-- Ctc Open -->
	<td class="td22"><?php echo $preCtc; ?></td>
	<td class="td22"><?php echo $propCtc; ?></td>
	<td class="td22"><?php echo $propCtc_per; ?></td>
	<td class="td22"><?php echo $corrCtc; ?></td>
	<td class="td22"><?php echo $totprop; ?></td>
	<td class="td22"><?php echo $totprop_per; ?></td>
	<!-- Ctc Close -->
	
	<td class="td22"><?php echo floatval($resHistory['Score']); ?></td>
	<td class="td22"><?php echo floatval($resHistory['Rating']); ?></td>
   </tr>
   </tbody>
   </div>
   <?php } $Sno++;} $no=$Sno-1; ?><input type="hidden" id="No" value="<?php echo $no; ?>" />	
  </table>
  </td>
 </tr>
 
 <form enctype="multipart/form-data" name="formEctc" method="post" onSubmit="return validate(this)">
 <?php $sqlM = mysql_query("SELECT MAX(SalaryChange_Date) as SalaryChDate FROM hrm_pms_appraisal_history where EmpCode=".$ResEmp['EmpCode']." AND SalaryChange_Date!='".$EffDate."' AND CompanyId=".$ComId, $con); 
       $resM = mysql_fetch_assoc($sqlM);  
       $sqlS = mysql_query("SELECT Previous_GrossSalaryPM,TotalProp_GSPM,Incentive FROM hrm_pms_appraisal_history where SalaryChange_Date='".$resM['SalaryChDate']."' AND EmpCode=".$ResEmp['EmpCode']." AND CompanyId=".$ComId, $con); 
	   $resS = mysql_fetch_assoc($sqlS); $TPreGross=$ResP['EmpCurrGrossPM']; //$TPreGross=$resS['TotalProp_GSPM'];
	   $TPreCtc=$ResP['EmpCurrCtc']; ?>

<?php  
/**************** aaa bbbb cccc ********************/ 
/**************** aaa bbbb cccc ********************/
$DJ=$ResEmp['DateJoining']; $CuDate=$Prev_From_EffDate;  $diff = abs(strtotime($CuDate) - strtotime($DJ));  
$daysDJ = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24)); 
if($ResP['Hod_TotalFinalRating']>0){ $RatingHod=$ResP['Hod_TotalFinalRating']; } 
else{ $RatingHod=$ResP['Reviewer_TotalFinalRating']; } 

/*------------------------------------------------------------*/
/*------------------------------------------------------------*/
$suqry="Rating=".$RatingHod." AND MgmtId=".$ResP['HOD_EmployeeID']." AND YearId=".$YearId." AND IncDistriFrom>0 AND CompanyId=".$ComId;

$app4 = $suqry." AND DeptId=".$ResP['HR_Curr_DepartmentId']." AND HodId=".$ResP['Rev2_EmployeeID']." AND VertId=".$ResEmp['EmpVertical']." AND RevId=".$ResP['Reviewer_EmployeeID']." AND AppId=".$ResP['Appraiser_EmployeeID'];
$app3 = $suqry." AND DeptId=".$ResP['HR_Curr_DepartmentId']." AND HodId=0 AND VertId=".$ResEmp['EmpVertical']." AND RevId=".$ResP['Reviewer_EmployeeID']." AND AppId=".$ResP['Appraiser_EmployeeID'];
$app2 = $suqry." AND DeptId=".$ResP['HR_Curr_DepartmentId']." AND HodId=".$ResP['Rev2_EmployeeID']." AND VertId=0 AND RevId=".$ResP['Reviewer_EmployeeID']." AND AppId=".$ResP['Appraiser_EmployeeID'];
$app1 = $suqry." AND DeptId=".$ResP['HR_Curr_DepartmentId']." AND HodId=0 AND VertId=0 AND RevId=".$ResP['Reviewer_EmployeeID']." AND AppId=".$ResP['Appraiser_EmployeeID'];
$app0 = $suqry." AND DeptId=".$ResP['HR_Curr_DepartmentId']." AND HodId=0 AND VertId=0 AND RevId=0 AND AppId=".$ResP['Appraiser_EmployeeID'];

/*Apraiser*/
$s_a4= mysql_query("SELECT IncDistriFrom,IncDistriTo FROM hrm_pms_increment_dislevel WHERE ".$app4,$con); 
$r_a4=mysql_num_rows($s_a4);
if($r_a4>0){ $resMaxMin = mysql_fetch_assoc($s_a4); }
else
{ 
 $s_a3= mysql_query("SELECT IncDistriFrom,IncDistriTo FROM hrm_pms_increment_dislevel WHERE ".$app3,$con); 
 $r_a3=mysql_num_rows($s_a3);
 if($r_a3>0){ $resMaxMin = mysql_fetch_assoc($s_a3); }
 else
 { 
  $s_a2= mysql_query("SELECT IncDistriFrom,IncDistriTo FROM hrm_pms_increment_dislevel WHERE ".$app2,$con); 
  $r_a2=mysql_num_rows($s_a2);
  if($r_a2>0){ $resMaxMin = mysql_fetch_assoc($s_a2); }
  else
  { 
   $s_a1= mysql_query("SELECT IncDistriFrom,IncDistriTo FROM hrm_pms_increment_dislevel WHERE ".$app1,$con); 
   $r_a1=mysql_num_rows($s_a1);
   if($r_a1>0){ $resMaxMin = mysql_fetch_assoc($s_a1); }
   else
   { 
    $s_a0= mysql_query("SELECT IncDistriFrom,IncDistriTo FROM hrm_pms_increment_dislevel WHERE ".$app0,$con); 
    $r_a0=mysql_num_rows($s_a0);
    if($r_a0>0){ $resMaxMin = mysql_fetch_assoc($s_a0); }
    else
    { 
      /*Reviewer*/ 
	  $rev3=$suqry." AND DeptId=".$ResP['HR_Curr_DepartmentId']." AND HodId=".$ResP['Rev2_EmployeeID']." AND VertId=".$ResEmp['EmpVertical']." AND RevId=".$ResP['Reviewer_EmployeeID'];
      $rev2=$suqry." AND DeptId=".$ResP['HR_Curr_DepartmentId']." AND HodId=0 AND VertId=".$ResEmp['EmpVertical']." AND RevId=".$ResP['Reviewer_EmployeeID'];
      $rev1=$suqry." AND DeptId=".$ResP['HR_Curr_DepartmentId']." AND HodId=".$ResP['Rev2_EmployeeID']." AND VertId=0 AND RevId=".$ResP['Reviewer_EmployeeID'];
      $rev0=$suqry." AND DeptId=".$ResP['HR_Curr_DepartmentId']." AND HodId=0 AND VertId=0 AND RevId=".$ResP['Reviewer_EmployeeID'];
	  $s_r3= mysql_query("SELECT IncDistriFrom,IncDistriTo FROM hrm_pms_increment_dislevel WHERE AppId=0 AND ".$rev3,$con); 
      $r_r3=mysql_num_rows($s_r3);
      if($r_r3>0){ $resMaxMin = mysql_fetch_assoc($s_r3); }
      else
      { 
       $s_r2= mysql_query("SELECT IncDistriFrom,IncDistriTo FROM hrm_pms_increment_dislevel WHERE AppId=0 AND ".$rev2,$con); 
       $r_r2=mysql_num_rows($s_r2);
       if($r_r2>0){ $resMaxMin = mysql_fetch_assoc($s_r2); }
       else
       { 
        $s_r1= mysql_query("SELECT IncDistriFrom,IncDistriTo FROM hrm_pms_increment_dislevel WHERE AppId=0 AND ".$rev1,$con); 
        $r_r1=mysql_num_rows($s_r1);
        if($r_r1>0){ $resMaxMin = mysql_fetch_assoc($s_r1); }
        else
        { 
         $s_r0= mysql_query("SELECT IncDistriFrom,IncDistriTo FROM hrm_pms_increment_dislevel WHERE AppId=0 AND ".$rev0,$con); 
         $r_r0=mysql_num_rows($s_r0);
         if($r_r0>0){ $resMaxMin = mysql_fetch_assoc($s_r0); }
         else
         { 
           /*Vertical*/
		   $ver1=$suqry." AND DeptId=".$ResP['HR_Curr_DepartmentId']." AND HodId=".$ResP['Rev2_EmployeeID']." AND VertId=".$ResEmp['EmpVertical'];
           $ver0=$suqry." AND DeptId=".$ResP['HR_Curr_DepartmentId']." AND HodId=0 AND VertId=".$ResEmp['EmpVertical'];
		   $s_v1= mysql_query("SELECT IncDistriFrom,IncDistriTo FROM hrm_pms_increment_dislevel WHERE RevId=0 AND ".$ver1,$con); 
           $r_v1=mysql_num_rows($s_v1);
           if($r_v1>0){ $resMaxMin = mysql_fetch_assoc($s_v1); }
           else
           {
		    $s_v0= mysql_query("SELECT IncDistriFrom,IncDistriTo FROM hrm_pms_increment_dislevel WHERE RevId=0 AND ".$ver0,$con); 
            $r_v0=mysql_num_rows($s_v0);
            if($r_v0>0){ $resMaxMin = mysql_fetch_assoc($s_v0); }
            else
            {
			 /*Hod*/
			 $hod0=$suqry." AND DeptId=".$ResP['HR_Curr_DepartmentId']." AND HodId=".$ResP['Rev2_EmployeeID'];
			 $s_h0= mysql_query("SELECT IncDistriFrom,IncDistriTo FROM hrm_pms_increment_dislevel WHERE VertId=0 AND ".$hod0,$con); 
             $r_h0=mysql_num_rows($s_h0);
             if($r_h0>0){ $resMaxMin = mysql_fetch_assoc($s_h0); }
             else
             {
			  /*Department*/
			  $dep0=$suqry." AND DeptId=".$ResP['HR_Curr_DepartmentId'];
			  $s_d0= mysql_query("SELECT IncDistriFrom,IncDistriTo FROM hrm_pms_increment_dislevel WHERE HodId=0 AND ".$dep0,$con); 
              $r_d0=mysql_num_rows($s_d0);
              if($r_d0>0){ $resMaxMin = mysql_fetch_assoc($s_d0); }
              else
              {
			   /*Management*/
			   $mgm0=$suqry;
			   $s_m0= mysql_query("SELECT IncDistriFrom,IncDistriTo FROM hrm_pms_increment_dislevel WHERE DeptId=0 AND ".$mgm0,$con); 
               $resMaxMin = mysql_fetch_assoc($s_m0);
			   /*Management*/
			  }
			  /*Department*/ 
			 }
			 /*Hod*/
		    }
		   }
		   /*Vertical*/
         }
        }  
       }
      }   
	  /*Reviewer*/
    }
   }
  } 
 } 
}
/*Apraiser*/

/*------------------------------------------------------------*/
/*------------------------------------------------------------*/
 

$MainOne=$resMaxMin['IncDistriFrom'];   //Actual_Percent
$MainTwo='';  //Prorata_Percent 

//$sqlMaxMin= mysql_query("SELECT IncDistriFrom,IncDistriTo FROM hrm_pms_increment_dis WHERE Rating=".$RatingHod." AND YearId=".$YearId." AND CompanyId=".$ComId, $con); $resMaxMin = mysql_fetch_assoc($sqlMaxMin);
	    
/**(1)************************* If Allow Minimum/Maximum *************************/
if($daysDJ>=180){ $Min=($TPreCtc*$resMaxMin['IncDistriFrom'])/100;}else { $Min=($TPreCtc*5)/100;}  				
$Max=($TPreCtc*$resMaxMin['IncDistriTo'])/100;	
$OkMin=$TPreCtc+$Min; $OkMax=$TPreCtc+$Max; 
	  
/**(2)************************* If Allow Fix Value *******************************/	  
//$NewAmt=($resS['TotalProp_GSPM']*$resMaxMin['IncDistriFrom'])/100;
//$NewGrossAmt=$resS['TotalProp_GSPM']+$NewAmt;
	  
  // [Logic] 
  // (1) Joining <= 1st Apr 2016 --> Actual + 3 Month Extra
  // (2) Joining >= 1st Apr 2016 ---> Actual + Extra Day(Prorata wise)
  // (3) Joining >= 1st Jan 2017 ---> Actual	  
/**(3)*************************If Prorata wise New Open Open Open Open Open **************************/
  $EffDM=date("m-d",strtotime($_SESSION['EffDate']));                             // $_SESSION['EffDate']=2021-01-01  
  $MinMD=date("m-d",strtotime($Prev_From_EffDate));                    // $Prev_From_EffDate=2019-12-31, $MinMD=12-31 
  $ExtraOneD=date("Y-m-d",strtotime('+1 day', strtotime($AllowDoj)));  // $_SESSION['AllowDoj']=2020-06-30
                                                                                   // $ExtraOneD=2020-07-01
  $ExtraOneMD=date("m-d",strtotime($ExtraOneD));                                   //07-01
  $PrvY=date("Y",strtotime($AllowDoj));                                //2020
  $PrvMD=date("m-d",strtotime($AllowDoj));                             //06-30
  $cY=$PrvY; $pY=$PrvY-1;                                              //$cY=date("Y"); $pY=date("Y")-1; $cY=2020, $pY=2021

  //echo $ResEmp['DateJoining'];
  //Joining<=2019-06-30 
  if($ResEmp['DateJoining']<=$pY.'-'.$PrvMD AND $RatingHod>0)  //if($ResEmp['DateJoining']<=$pY.'-03-31' AND $RatingHod>0)
  {
   $TotIncAmt=($TPreCtc*$resMaxMin['IncDistriFrom'])/100;
   $NewGrossAmt=10*(ceil(($TPreCtc+$TotIncAmt)/10)); 
   $NewGrossAmt2=$TPreCtc+$TotIncAmt;
   $TotInc2=0;
   
   /* ----------------------------------------- */
   $Basicwise_Cal=0; $TopVCal_Cal=0;
   if($MaxVCtc>0 && $TPreCtc>=$MaxVCtc)
   {
    $oneC=($ResP['EmpCurrAnnualBasic']*$resMaxMin['IncDistriFrom'])/100;
	$Basicwise_Cal=$TPreCtc+$oneC; $TopVCal_Cal=$Basicwise_Cal;
   }
   elseif($MaxVCtc>0 && $NewGrossAmt2>$MaxVCtc)
   {
    $oneC=($ResP['EmpCurrAnnualBasic']*$resMaxMin['IncDistriFrom'])/100;
    $Basicwise_Cal=$TPreCtc+$oneC; 
	if($Basicwise_Cal<$MaxVCtc){ $TopVCal_Cal=$MaxVCtc; }
	else{ $TopVCal_Cal=$Basicwise_Cal; }
   }
   /* ----------------------------------------- */
   
  }	 
 
  
  //Joining>=2019-07-01 AND Joining<=2020-06-30 
  
  elseif($ResEmp['DateJoining']>=$pY.'-'.$ExtraOneMD AND $ResEmp['DateJoining']<=$cY.'-'.$PrvMD AND $RatingHod>0)  
  { 
   $sqlCorr=mysql_query("SELECT MAX(SalaryChange_Date) as SalaryChDate FROM hrm_pms_appraisal_history INNER JOIN hrm_employee ON hrm_pms_appraisal_history.EmpCode=hrm_employee.EmpCode where hrm_employee.EmployeeID=".$EmpId." AND Previous_GrossSalaryPM!=".$resS['TotalProp_GSPM']." AND SalaryChange_Date>='".$ResEmp['DateJoining']."' AND hrm_pms_appraisal_history.CompanyId=".$ComId, $con); $resCorr=mysql_fetch_assoc($sqlCorr); 
   $sqlCk1 = mysql_query("SELECT Previous_GrossSalaryPM,TotalProp_GSPM FROM hrm_pms_appraisal_history INNER JOIN hrm_employee ON hrm_pms_appraisal_history.EmpCode=hrm_employee.EmpCode where SalaryChange_Date='".$ResEmp['DateJoining']."' AND hrm_employee.EmployeeID=".$EmpId." AND hrm_pms_appraisal_history.CompanyId=".$ComId, $con); 
   $resCk1=mysql_fetch_assoc($sqlCk1);
   $sqlCk2 = mysql_query("SELECT Previous_GrossSalaryPM,TotalProp_GSPM FROM hrm_pms_appraisal_history INNER JOIN hrm_employee ON hrm_pms_appraisal_history.EmpCode=hrm_employee.EmpCode where SalaryChange_Date='".$resCorr['SalaryChDate']."' AND hrm_employee.EmployeeID=".$EmpId." AND hrm_pms_appraisal_history.CompanyId=".$ComId, $con); 
   $resCk2=mysql_fetch_assoc($sqlCk2); 
   
   //Joining>=2019-07-01 AND Joining<=2019-12-31 -->New
   if($ResEmp['DateJoining']>=$pY.'-'.$ExtraOneMD AND $ResEmp['DateJoining']<=$pY.'-'.$MinMD AND $RatingHod>0)
   {
     $TotIncAmt=($TPreCtc*$resMaxMin['IncDistriFrom'])/100;
     $NewGrossAmt=10*(ceil(($TPreCtc+$TotIncAmt)/10)); 
     $NewGrossAmt2=$TPreCtc+$TotIncAmt;
	 
	 $date11 = new DateTime($ResEmp['DateJoining']); $date22 = new DateTime($pY.'-'.$MinMD);
     $interval = date_diff($date22, $date11);
     $YY=$interval->format('%y');  $MM=$interval->format('%m');  $DD=$interval->format('%d');
	 $PerM2=$resMaxMin['IncDistriFrom']/12;  $PerD2=$PerM2/30;
	 $Month_Per2=round($PerM2*$MM, 3); $Day_Per2=round($PerD2*$DD, 3);
	 $MSal2=($TPreCtc*$Month_Per2)/100; 
	 $DSal2=($TPreCtc*$Day_Per2)/100; 
	 //$TotInc2=round($MSal2+$DSal2);  //Extra 
	 $TotInc2=$MSal2+$DSal2;  //Extra 
	 $MainTwo=$Month_Per2+$Day_Per2;  //Prorata_Percent
	 
	 
	 /* ----------------------------------------- */
     $Basicwise_Cal=0; $TopVCal_Cal=0;
     if($MaxVCtc>0 && $TPreCtc>=$MaxVCtc)
     {
	  $oneC=($ResP['EmpCurrAnnualBasic']*$resMaxMin['IncDistriFrom'])/100;
      $oneCM=($ResP['EmpCurrAnnualBasic']*$Month_Per2)/100;
	  $oneCD=($ResP['EmpCurrAnnualBasic']*$Day_Per2)/100;
	  $Basicwise_Cal=$TPreCtc+$oneC+$oneCM+$oneCD; $TopVCal_Cal=$Basicwise_Cal;
     }
     elseif($MaxVCtc>0 && ($NewGrossAmt2+$TotInc2)>$MaxVCtc)
     {
	  $oneC=($ResP['EmpCurrAnnualBasic']*$resMaxMin['IncDistriFrom'])/100;
      $oneCM=($ResP['EmpCurrAnnualBasic']*$Month_Per2)/100;
	  $oneCD=($ResP['EmpCurrAnnualBasic']*$Day_Per2)/100;
      $Basicwise_Cal=$TPreCtc+$oneC+$oneCM+$oneCD; 
	  if($Basicwise_Cal<$MaxVCtc){ $TopVCal_Cal=$MaxVCtc; }
	  else{ $TopVCal_Cal=$Basicwise_Cal; }
     }
     /* ----------------------------------------- */
	 
   }      
   //Joining>=2020-01-01 AND Dj<=2020-06-30 -->New
   elseif($ResEmp['DateJoining']>=$cY.'-'.$EffDM AND $ResEmp['DateJoining']<=$cY.'-'.$PrvMD AND $RatingHod>0)
   {
   
    if($resCorr>0 AND $resCk2['TotalProp_GSPM']>$resCk1['TotalProp_GSPM'])
	{ //If mid-term increment $date1 = new DateTime($resCorr['SalaryChDate']);
	  $date1 = new DateTime($ResEmp['DateJoining']); 
	} 
	else
	{ 
	  $date1 = new DateTime($ResEmp['DateJoining']); 
	}
      $date2 = new DateTime($cY."-".$MinMD);  //$PrvMD
      $interval = date_diff($date2, $date1);
      $Y=$interval->format('%y');  $M=$interval->format('%m');  $D=$interval->format('%d');
      
      echo 'm='.$M.' - d='.$D.'<br>';
      
      $PerM=$resMaxMin['IncDistriFrom']/12;  $PerD=$PerM/30;
      $Month_Per=round($PerM*$M, 3); $Day_Per=round($PerD*$D, 3);
      
      echo $PerM.'-'.$PerD.'<br>'; 
      
      $MSal=($TPreCtc*$Month_Per)/100; 
      $DSal=($TPreCtc*$Day_Per)/100; 
      //$TotInc=round($MSal+$DSal);
	  $TotInc=$MSal+$DSal;
	  
	  echo 'M%='.$Month_Per.' - D%='.$Day_Per.' - PrvCTC='.$TPreCtc.'<br>';
	  echo 'MSal='.$MSal.' - DSal='.$DSal.' - ='.$TotInc.'<br>';
	  
	  
	  
      $NewGrossAmt=10*(ceil(($TPreCtc+$TotInc)/10)); 
      $NewGrossAmt2=$TPreCtc+$TotInc; 
	  $TotInc2=0; //Not Extra    
	  $MainTwo=$Month_Per+$Day_Per;  ////Prorata_Percent   
	  
	  
	  /* ----------------------------------------- */
    $Basicwise_Cal=0; $TopVCal_Cal=0;
    if($MaxVCtc>0 && $TPreCtc>=$MaxVCtc)
    {
     $oneCM=($ResP['EmpCurrAnnualBasic']*$Month_Per)/100;
	 $oneCD=($ResP['EmpCurrAnnualBasic']*$Day_Per)/100;
	 $Basicwise_Cal=$TPreCtc+$oneCM+$oneCD; $TopVCal_Cal=$Basicwise_Cal;
    }
    elseif($MaxVCtc>0 && $NewGrossAmt2>$MaxVCtc)
    {
     $oneCM=($ResP['EmpCurrAnnualBasic']*$Month_Per)/100;
	 $oneCD=($ResP['EmpCurrAnnualBasic']*$Day_Per)/100;
     $Basicwise_Cal=$TPreCtc+$oneCM+$oneCD; 
	 if($Basicwise_Cal<$MaxVCtc){ $TopVCal_Cal=$MaxVCtc; }
	 else{ $TopVCal_Cal=$Basicwise_Cal; }
    }
    /* ----------------------------------------- */
	  
    }
   
  }
  else
  {
   $NewGrossAmt=10*(ceil($TPreCtc/10)); 
   $NewGrossAmt2=$TPreCtc; 
   $TotInc2=0; //Not Extra   
   
   $Basicwise_Cal=0; $TopVCal_Cal=0;
  } 
  
  //if($TotInc2>0){$ActualNewGS=10*(ceil(($NewGrossAmt2+$TotInc2)/10));}
  //else{$ActualNewGS=10*(ceil(($NewGrossAmt+$TotInc2)/10));}
  
  $ActualNewGS=10*(ceil(($NewGrossAmt2+$TotInc2)/10));
  
  echo 'ActualNew='.$ActualNewGS;
 
 /*
  if($MaxVCtc>0 AND $ActualNewGS>$MaxVCtc){ $ActualNewGS=$TPreCtc; $OverMsg="CTC Amount Crossed Maximum Limit"; }
  else{ $ActualNewGS=$ActualNewGS; $OverMsg=''; } */
  
  if($MaxVCtc>0 AND $ActualNewGS>$MaxVCtc){ $ActualNewGS=round($TopVCal_Cal); $OverMsg="CTC Amount Crossed Maximum Limit"; }
  else{ $ActualNewGS=$ActualNewGS; $OverMsg=''; }
  

  
/**(3)************************* If Prorata wise New Close Close Close Close Close **************************/
$Extra_3Month=0;   
?> 			  
  <tr>
   <td width="100%">
   <table width="100%">
    <tr>
     <td class="hl" style="font-size:15px;color:#005100;">Current Appraisal:&nbsp;&nbsp;
	 <font color="#000066">Proposed CTC:</font>&nbsp;<font color="#FF2D2D"><?php echo $ActualNewGS; ?></font>
	 &nbsp;&nbsp;&nbsp;
	 <font color="#000066">Inc(%):</font>&nbsp;<font color="#FF2D2D"><?php echo $MainOne; ?></font>
	 &nbsp;&nbsp;&nbsp;
	 <font color="#000066">Prorata(%):</font>&nbsp;<font color="#FF2D2D"><?php echo $MainTwo; ?></font>
	 
	 &nbsp;&nbsp;&nbsp;<font color="#000000"><span class="blink_me"><?php echo $OverMsg; ?></span></font>
	 &nbsp;&nbsp;
     <?php if($MaxVCtc>0){?><font color="#000000">[<?php echo 'Min:&nbsp;'.floatval($resVer['Min_Ctc']).' - Max:&nbsp;'.floatval($resVer['Max_Ctc']); ?>]</font><?php } ?>
	 
	 <input type="hidden" id="ActualInc" value="<?=$MainOne?>"/>
     <input type="hidden" id="ProRataInc" value="<?=$MainTwo?>"/>
     <input type="hidden" id="ActualIncAmt" value="<?=$NewGrossAmt2?>"/>
     <input type="hidden" id="ProRataIncAmt" value="<?=$TotInc2?>"/>
	 
	 <input type="hidden" id="OverMsg" value="<?php echo $OverMsg;?>"/>
	 <input type="hidden" id="Doj" value="<?php echo date("m/d/Y",strtotime($ResEmp['DateJoining']));?>"/>
	 <input type="hidden" id="Extra3Month" value="<?php echo $Extra_3Month; ?>" />
	 <input type="hidden" id="ActualPer_Gross" value="<?php if($resMaxMin['IncDistriFrom']!=''){ echo $resMaxMin['IncDistriFrom']; } else {echo 0;} ?>"/>
	 <input type="hidden" id="CtcNewGross_<?php echo $sno; ?>" value="<?php echo $ActualNewGS; ?>"/><input type="hidden" id="MinV_<?php echo $sno; ?>" value="<?php echo $OkMin; ?>"/>
	 <input type="hidden" id="NewGross" value="<?php echo $ActualNewGS; ?>"/>
	 <input type="hidden" id="GS" name="GS" value="<?php echo $TPreGross; ?>" />
	 <input type="hidden" id="Ctc" name="Ctc" value="<?php echo $TPreCtc; ?>" />
	 
	 <input type="hidden" id="MinV" value="<?php echo $OkMin; ?>"/>
	 <input type="hidden" id="MaxV" value="<?php echo $OkMax; ?>"/>
<?php /*<font color="#480000" size="3"><u>Proposed Gross Salary Per Month</u> :</font>&nbsp;<font color="#D70000" size="3">Minimum -</font><font color="#006CD9" size="2">&nbsp;<?php echo $OkMin; ?></font>&nbsp;&nbsp;<font color="#D70000" size="3">Maximum -</font><font color="#006CD9" size="2">&nbsp;<?php echo $OkMax; ?></font>*/ ?>
	 &nbsp;&nbsp;&nbsp;<span id="msg" style="color:#C46200;"><?php echo $msg; ?></span>
	 </td>
	</tr>
   </table>
   </td>
  </tr>
  <tr>		
  <!--<tr>
   <td width="100%" class="hl" style="color:#000000;">&nbsp;<b>PG:</b>&nbsp;<font color="#004080">Proposed Grade,</font>&nbsp;&nbsp;<b>PGSPM:</b>&nbsp;<font color="#004080">Proposed Gross Salary Per Month</font>,&nbsp;&nbsp;<b>PSC :</b>&nbsp;<font color="#004080">Proposed Salary Correction</font>,&nbsp;&nbsp;<b>PNIS :</b>&nbsp;<font color="#004080">Proposed Net Increment Salary</font>,&nbsp;&nbsp;<b>TPGSPM :</b>&nbsp;<font color="#004080">Total Proposed Gross Salary Per Month</font>   </td>
  </tr>-->
  <tr>
   <td width="100%">
   <input type="hidden" id="CDesigName" value="<?php echo $resDe['DesigName'];?>" />
   <input type="hidden" id="CGradeName" value="<?php echo $resGr['GradeValue'];?>" />
   <input type="hidden" id="DepartmentName" name="DepartmentName" value="<?php echo $ResEmp['DepartmentName'];?>" />
   <input type="hidden" id="EmpCode" value="<?php echo $ResEmp['EmpCode'];?>" />
   <input type="hidden" id="Ename" value="<?php echo $ResEmp['Fname'].' '.$ResEmp['Sname'].' '.$ResEmp['Lname']; ?>" />
   <table border="1" cellspacing="1" width="100%">
	<tr bgcolor="#004000">
     <td style="width:60px;">&nbsp;</td>	 
     <td class="td22" style="color:#F9F900;font-weight:bold;width:50px;">Score</td>			
     <td class="td22" style="color:#F9F900;font-weight:bold;width:50px;">Rating</td>
     <td class="td22" style="color:#F9F900;font-weight:bold;width:200px;">Designation</td>
     <td class="td22" style="color:#F9F900;font-weight:bold;width:50px;">Grade</td>
     <td class="td22" style="color:#F9F900;font-weight:bold;width:70px;">Prop<sup>d</sup> CTC</td>
     <td class="td22" style="color:#F9F900;font-weight:bold;width:50px;">(%) <br>Prop<sup>d</sup></td>
     <td class="td22" style="color:#F9F900;font-weight:bold;width:70px;">CTC Corr<sup>n</sup></td>
     <td class="td22" style="color:#F9F900;font-weight:bold;width:50px;">(%) <br>Corr<sup>n</sup></td>
     <td class="td22" style="color:#F9F900;font-weight:bold;width:70px;">Total Increment</td>
     <td class="td22" style="color:#F9F900;font-weight:bold;width:50px;">(%) Increment</td>
     <td class="td22" style="color:#F9F900;font-weight:bold;width:70px;">Total Prop<sup>d</sup> CTC</td>
	 <td class="td22" style="color:#F9F900;font-weight:bold;width:70px;">Total Prop<sup>d</sup> Gross </td>
     <td class="td22" style="color:#F9F900;font-weight:bold;width:40px;">Save</td>
     <td class="td22" style="color:#F9F900;font-weight:bold;width:90px;">Action</td>
	</tr>
	<tr bgcolor="#FFFFFF">
     <td class="td33" style="font-weight:bold;color:#006A00;">&nbsp;HOD :</td>	
     <td class="td22" style="font-weight:bold;"><?php if($ResP['Hod_TotalFinalScore']>0){echo $ResP['Hod_TotalFinalScore']; } else {echo $ResP['Reviewer_TotalFinalScore']; }?></td>
     <td class="td22" style="font-weight:bold;"><?php if($ResP['Hod_TotalFinalRating']>0){echo $ResP['Hod_TotalFinalRating']; } else{echo $ResP['Reviewer_TotalFinalRating']; } ?></td>
     <td class="td33" style="font-weight:bold;"><input type="text" style="border:hidden;width:98%; font-size:14px;font-family:Times New Roman;" value="<?php if($ResP['Hod_EmpDesignation']==0){echo ucwords(strtolower($resDe['DesigName']));}else{echo ucwords(strtolower($resD['DesigName']));} ?>" readonly/></td>
     <td class="td22" style="font-weight:bold;"><?php if($ResP['Hod_EmpGrade']==0){echo $resGr['GradeValue'];} else{echo $resG['GradeValue'];} ?></td>
     <td class="td22" style="font-weight:bold;"><?php echo floatval($ResP['Hod_ProIncCTC']); ?>
	 <input type="hidden" id="HODMainCtc" value="<?php echo floatval($ResP['Hod_ProIncCTC']); ?>" />
	 </td>
     <td class="td22" style="font-weight:bold;"><?php echo floatval($ResP['Hod_Percent_ProIncCTC']); ?></td>
     <td class="td22" style="font-weight:bold;"><?php echo floatval($ResP['Hod_ProCorrCTC']); ?></td>
     <td class="td22" style="font-weight:bold;"><?php echo floatval($ResP['Hod_Percent_ProCorrCTC']); ?></td>
     <td class="td22" style="font-weight:bold;"><?php echo floatval($ResP['Hod_IncNetCTC']); ?></td>
     <td class="td22" style="font-weight:bold;"><?php echo floatval($ResP['Hod_Percent_IncNetCTC']); ?></td>
     <td class="td22" style="font-weight:bold;"><?php echo floatval($ResP['Hod_Proposed_ActualCTC']); ?></td> 
	 <td class="td22" style="font-weight:bold;"><?php echo floatval($ResP['Hod_GrossMonthlySalary']); ?></td>
     <td class="td22" colspan="2" >&nbsp;</td>
    </tr>
    <tr bgcolor="#FFFFFF">
     <td class="td33" style="font-weight:bold;color:#006A00;">&nbsp;HR :</td>	  
     <td class="td22" style="color:#0080FF;font-weight:bold;"><?php if($ResP['Hod_TotalFinalScore']>0){echo $ResP['Hod_TotalFinalScore']; } else {echo $ResP['Reviewer_TotalFinalScore']; }?><input type="hidden" id="Score" name="Score" value="<?php if($ResP['Hod_TotalFinalScore']>0){echo $ResP['Hod_TotalFinalScore']; } else {echo $ResP['Reviewer_TotalFinalScore']; }?>" /></td>
     <td class="td22" style="color:#0080FF;font-weight:bold;" align="center"><?php if($ResP['Hod_TotalFinalRating']>0){echo $ResP['Hod_TotalFinalRating']; } else{echo $ResP['Reviewer_TotalFinalRating']; } ?><input type="hidden" id="Rating" name="Rating" value="<?php if($ResP['Hod_TotalFinalRating']>0){echo $ResP['Hod_TotalFinalRating']; } else{echo $ResP['Reviewer_TotalFinalRating']; } ?>" /></td>
	 
	 
<?php /* ------------------------------------------------------------------------ */ ?>	
<?php /* ------------------------------------------------------------------------ */ ?>	 
<script language="javascript">
function FunDesig(v)
{ 
  if(v>0)
  {
   var url = 'GetGrade.php'; var pars = 'action=GetGrade&DesigId22='+v;	
   var myAjax = new Ajax.Request( url, { method: 'post', parameters: pars, onComplete: show_Grade }); 
  } 
} 
function show_Grade(originalRequest)
{ document.getElementById('SpanGarde').innerHTML = originalRequest.responseText; 
  document.getElementById("HRGradeId").value=document.getElementById("GradeGetId").value;
} 
</script>
<span id="SpanGarde"></span>

<?php 
$sqlDm = mysql_query("SELECT DesigCode,DesigName from hrm_designation where DesigId=".$ResP['HR_CurrDesigId'],$con); 
$sqlGm = mysql_query("SELECT GradeValue FROM hrm_grade WHERE GradeId=".$ResP['HR_CurrGradeId'],$con); 
$resDm = mysql_fetch_assoc($sqlDm); $resGm = mysql_fetch_assoc($sqlGm);
if($resGm['GradeValue']!='MG')
{ 
 $NextGradeId=$ResP['HR_CurrGradeId']+1; $NextGradeId2=$ResP['HR_CurrGradeId']+2;  
 $sqlG2 = mysql_query("SELECT GradeValue FROM hrm_grade WHERE GradeId=".$NextGradeId, $con); 
 $sqlG3 = mysql_query("SELECT GradeValue FROM hrm_grade WHERE GradeId=".$NextGradeId2,$con); 
 $resG2 = mysql_fetch_assoc($sqlG2); $resG3 = mysql_fetch_assoc($sqlG3); 
 $NextGrade=$resG2['GradeValue']; $NextGrade2=$resG3['GradeValue'];
}
elseif($resG['GradeValue']=='MG'){ $NextGrade=$resG['GradeValue']; }	

if($ResP['HR_DesigId']>0){ $Sel_DesigId=$ResP['HR_DesigId'];  }
elseif($ResP['Hod_EmpDesignation']>0){ $Sel_DesigId=$ResP['Hod_EmpDesignation']; }
else{ $Sel_DesigId=$ResP['HR_CurrDesigId']; }

if($ResP['HR_GradeId']>0){ $Sel_GradeId=$ResP['HR_GradeId'];  }
elseif($ResP['Hod_EmpGrade']>0){ $Sel_GradeId=$ResP['Hod_EmpGrade']; }
else{ $Sel_GradeId=$ResP['HR_CurrGradeId']; }

?>
	 
	 <td class="td33"><select class="tdsel" style="border:hidden;width:98%;color:#0080FF;font-size:14px;font-family:Times New Roman;" id="HRDesigId" onChange="FunDesig(this.value)" disabled>
	     
	 <?php if($ResP['HR_DesigId']>0){?><option value="<?php echo $ResP['HR_DesigId']; ?>" selected><?php echo ucwords(strtolower($resHRDe['DesigName'])); ?></option><?php }elseif($ResP['Hod_EmpDesignation']>0){?><option value="<?php echo $ResP['Hod_EmpDesignation']; ?>" selected><?php echo ucwords(strtolower($resD['DesigName'])); ?></option><?php }else{?><option value="<?php echo $ResP['HR_CurrDesigId']; ?>" selected><?php echo ucwords(strtolower($resDm['DesigName'])); ?></option><?php } ?>
	 
	 <?php $sqlEx=mysql_query("select dgd.DesigId,DesigName,DesigCode from hrm_deptgradedesig dgd INNER JOIN hrm_designation de ON dgd.DesigId=de.DesigId where DepartmentId=".$ResEmp['DepartmentId']." AND (GradeId=".$ResP['HR_CurrGradeId']." OR GradeId_2=".$ResP['HR_CurrGradeId']." OR GradeId_3=".$ResP['HR_CurrGradeId']." OR GradeId_4=".$ResP['HR_CurrGradeId']." OR GradeId_5=".$ResP['HR_CurrGradeId']." OR GradeId=".$NextGradeId." OR GradeId_2=".$NextGradeId." OR GradeId_3=".$NextGradeId." OR GradeId_4=".$NextGradeId." OR GradeId_5=".$NextGradeId.") order by DesigName ASC", $con); while($resEx=mysql_fetch_assoc($sqlEx)){ ?><option value="<?php echo $resEx['DesigId'];?>" <?php if($Sel_DesigId==$resEx['DesigId']){echo 'selected';}?>><?php echo ucwords(strtolower($resEx['DesigName'])); ?></option><?php } ?>
	 <option value="<?php echo $ResP['HR_CurrDesigId']; ?>"><?php echo ucwords(strtolower($resDm['DesigName'])); ?></option>
	 <option value="0">NA</option>
	 </select>
	 <input type="hidden" id="DesigId" value="<?php echo $ResP['Hod_EmpDesignation'];?>" />
	 <input type="hidden" name="DesigName" id="DesigName" value="<?php if($resD['DesigName']==''){echo $resDe['DesigName'];}else {echo $resD['DesigName']; } ?>" />
	 <?php /*<input type="text" style="border:hidden;width:98%;color:#0080FF;font-weight:bold; font-size:14px;font-family:Times New Roman;" value="<?php if($resD['DesigName']==''){echo ucwords(strtolower($resDe['DesigName']));}else {echo ucwords(strtolower($resD['DesigName'])); } ?>" readonly />*/?>
	 </td>
	 
	 <td class="td22"><select class="tdsel" style="border:hidden;width:98%;color:#0080FF;font-size:14px;font-family:Times New Roman;" id="HRGradeId" disabled>
	 <?php if($ResP['HR_GradeId']>0){?><option value="<?php echo $ResP['HR_GradeId']; ?>" selected><?php echo ucwords(strtolower($resHRGr['GradeValue'])); ?></option><?php }elseif($ResP['Hod_EmpGrade']>0){?><option value="<?php echo $ResP['Hod_EmpGrade']; ?>" selected><?php echo ucwords(strtolower($resG['GradeValue'])); ?></option><?php }else{?><option value="<?php echo $ResP['HR_CurrGradeId']; ?>" selected><?php echo ucwords(strtolower($resGm['GradeValue'])); ?></option><?php } ?>
	 
	 <?php $sqlNxG=mysql_query("select GradeId,GradeValue from hrm_grade where (GradeId=".$ResP['HR_CurrGradeId']." OR GradeId=".$NextGradeId.") AND CompanyId=".$ComId." order by GradeId ASC",$con); while($resNxG=mysql_fetch_assoc($sqlNxG)){ ?><option value="<?php echo $resNxG['GradeId'];?>" <?php if($Sel_GradeId==$resNxG['GradeId']){echo 'selected';}?>><?php echo $resNxG['GradeValue'];?></option><?php } ?>
	 <option value="<?php echo $ResP['HR_CurrGradeId']; ?>"><?php echo $resGm['GradeValue']; ?></option>
	 <option value="0">NA</option></select>
	 <input type="hidden" id="GradeId" value="<?php echo $ResP['Hod_EmpGrade']; ?>" />
	 <input type="hidden" name="GradeName" id="GradeName" value="<?php if($resG['GradeValue']==''){echo $resGr['GradeValue'];} else{echo $resG['GradeValue'];} ?>" />
	 </td>
	 
<?php /* ------------------------------------------------------------------------ */ ?>	
<?php /* ------------------------------------------------------------------------ */ ?>
	 
	 
<input type="hidden" id="PIS" name="PIS" value="<?php if($ResP['HR_PmsStatus']==2){echo floatval($ResP['HR_ProIncSalary']); } else { echo floatval($ResP['Hod_ProIncSalary']); } ?>" readonly/>
<input type="hidden" id="PPIS" name="PPIS" value="<?php if($ResP['HR_PmsStatus']==2){echo floatval($ResP['HR_Percent_ProIncSalary']); } else { echo floatval($ResP['Hod_Percent_ProIncSalary']); } ?>" readonly/>
<input type="hidden" id="PCS" name="PCS" value="<?php if($ResP['HR_PmsStatus']==2){echo floatval($ResP['HR_ProCorrSalary']); } else { echo floatval($ResP['Hod_ProCorrSalary']); } ?>" onKeyUp="CalProInc()" onChange="CalProInc()" readonly/>
<input type="hidden" id="PPCS" name="PPCS" value="<?php if($ResP['HR_PmsStatus']==2){echo floatval($ResP['HR_Percent_ProCorrSalary']); } else { echo floatval($ResP['Hod_Percent_ProCorrSalary']); } ?>" readonly/>
<input type="hidden" id="INMS" value="<?php if($ResP['HR_PmsStatus']==2){echo floatval($ResP['HR_IncNetMonthalySalary']); } else { echo floatval($ResP['Hod_IncNetMonthalySalary']); } ?>" readonly/>
<input type="hidden" id="PINMS" name="PINMS" value="<?php if($ResP['HR_PmsStatus']==2){echo floatval($ResP['HR_Percent_IncNetMonthalySalary']); } else { echo floatval($ResP['Hod_Percent_IncNetMonthalySalary']); } ?>" readonly/>
<input type="hidden" id="GAS" name="GAS" value="<?php if($ResP['HR_PmsStatus']==2){echo floatval($ResP['HR_GrossAnnualSalary']); } else { echo floatval($ResP['Hod_GrossAnnualSalary']); } ?>" readonly/>
	 	 
	 <!-- Ctc Ctc Ctc Open Open Open Open -->
	 <!-- Ctc Ctc Ctc Open Open Open Open -->
	 <td class="td22" style="background-color:#FFFFFF;" id="TD"><input type="text" class="td22" style="border-style:hidden;border:0;text-align:center;color:#0080FF;font-weight:bold;background-color:#FFFFFF;width:100%;" id="CtcPIS" name="CtcPIS" value="<?php if($ResP['HR_PmsStatus']==2){echo floatval($ResP['HR_ProIncCTC']); } else { echo floatval($ResP['Hod_ProIncCTC']); } ?>" onKeyUp="CalProInc()" onChange="CalProInc()" readonly/></td>
     <td class="td22"><input type="text" class="td22" style="border-style:hidden;color:#0080FF;font-weight:bold;text-align:center;border:0;width:100%;background-color:#FFFFFF;" id="CtcPPIS" name="CtcPPIS" value="<?php if($ResP['HR_PmsStatus']==2){echo floatval($ResP['HR_Percent_ProIncCTC']); } else { echo floatval($ResP['Hod_Percent_ProIncCTC']); } ?>" readonly/></td>
     <td class="td22" style="background-color:#FFFFFF;" id="TD2"><input type="text" class="td22" style="border-style:hidden; border:0;width:100%;text-align:center;color:#0080FF;font-weight:bold;background-color:#FFFFFF;" id="CtcPCS" name="CtcPCS" value="<?php if($ResP['HR_PmsStatus']==2){echo floatval($ResP['HR_ProCorrCTC']); } else { echo floatval($ResP['Hod_ProCorrCTC']); } ?>" onKeyUp="CalProInc()" onChange="CalProInc()" readonly/></td>
     <td class="td22"><input type="text" class="td22" style="border-style:hidden;border:0;width:100%;color:#0080FF;font-weight:bold;text-align:center;background-color:#FFFFFF;" id="CtcPPCS" name="CtcPPCS" value="<?php if($ResP['HR_PmsStatus']==2){echo floatval($ResP['HR_Percent_ProCorrCTC']); } else { echo floatval($ResP['Hod_Percent_ProCorrCTC']); } ?>" readonly/></td>
     <td class="td22"><input type="text" class="td22" style="border-style:hidden;border:0;width:100%;color:#0080FF;font-weight:bold;text-align:center;background-color:#FFFFFF;" id="CtcINMS" value="<?php if($ResP['HR_PmsStatus']==2){echo floatval($ResP['HR_IncNetCTC']); } else { echo floatval($ResP['Hod_IncNetCTC']); } ?>" readonly/></td>
     <td class="td22"><input type="text" class="td22" style="border-style:hidden; border:0;width:100%;color:#0080FF;font-weight:bold;text-align:center;background-color:#FFFFFF;" id="CtcPINMS" name="CtcPINMS" value="<?php if($ResP['HR_PmsStatus']==2){echo floatval($ResP['HR_Percent_IncNetCTC']); } else { echo floatval($ResP['Hod_Percent_IncNetCTC']); } ?>" readonly/></td>
     <td class="td22"><input type="text" class="td22" style="border-style:hidden;border:0;width:100%;color:#0080FF;font-weight:bold;text-align:center;background-color:#FFFFFF;" id="CtcGAS" name="CtcGAS" value="<?php if($ResP['HR_PmsStatus']==2){echo floatval($ResP['HR_Proposed_ActualCTC']); } else { echo floatval($ResP['Hod_Proposed_ActualCTC']); } ?>" readonly/>
     <input type="hidden" value="" id="Cal_MinGSV" />
	 <input type="hidden" value="" id="Cal_MinCtcSV" /></td>
	 <!-- Ctc Ctc Ctc Close Close Close Close -->
	 <!-- Ctc Ctc Ctc Close Close Close Close -->
	 
	 <td class="td22"><input type="text" class="td22" style="border-style:hidden;border:0;width:100%;color:#0080FF;font-weight:bold;text-align:center;background-color:#FFFFFF;" id="GMS" name="GMS" value="<?php if($ResP['HR_PmsStatus']==2){echo floatval($ResP['HR_GrossMonthlySalary']); } else { echo floatval($ResP['Hod_GrossMonthlySalary']); }?>" readonly/></td>

     <td align="center"><img src="images/save.gif" border="0" id="SaveIcon" onClick="return ClickSaveEdit(<?php echo $EmpId.','.$PmsId; ?>); CalProInc();" style="display:none;"/></td>
     <td class="td22"><select class="td33" id="ActionInc" style="width:100%;background-color:#CCFFCC;" onChange="return ClickEdit(this.value)"><option value="0" style="background-color:#FFFFFF;">Select</option><option value="1">Edit</option><option value="2">Approved</option></select></td>
    </tr>
   </table>	 
   </td>
  </tr>	
  <tr>
   <td class="td33" style="width:100%;color:#000000;">
    <table border="0">
	 <tr>
	  <td class="td33" style="width:10%;color:#000000;"><b>&nbsp;HR Remark :</b></td>
	  <td class="td33" style="width:80%;color:#000000;"><input class="td33" style="width:100%;background-color:#FFFFFF;" id="HRRemark" value="<?php echo $ResP['HR_Remark']; ?>" maxlength="250" disabled/></td>
	  <td class="td33" style="width:5%;color:#000000;" align="right"><b>&nbsp;Date :</b></td>
	  <td class="td33" style="width:10%;color:#000000;"><input class="td22" style="width:100px;font-weight:bold;background-color:#CCFFCC;" id="CHDate" name="CHDate" value="<?php echo date("d-m-Y",strtotime($EffDate)); ?>" readonly/>
   <?php /*?>&nbsp;<button id="PPTo" class="CalenderButton" disabled></button><script type="text/javascript">  var cal = Calendar.setup({ onSelect:  function(cal) { cal.hide()}, showTime: true }); cal.manageFields("PPTo", "CHDate", "%d-%m-%Y");</script><?php */?></td>
	 </tr>
	</table>
    </td>
   </tr>  
  </table> 
  </td>
 </tr>
 <tr>		
  <td valign="top" align="center" width="100%" id="MainWindow">
  
<?php /***************START*****START*****START******START******START****************************/ ?>
<?php /***************START*****START*****START******START******START****************************/ ?>
  <table border="0" style="margin-top:0px;width:100%;">
  <tr> 
   <td align="left" id="Ectc" valign="top">             
   <table border="1" width="100%" cellspacing="1">
    <tr>
	 <td class="td22" style="width:50%;font-weight:bold;height:20px;background-color:#6FB7FF;">Cost To Company</td>
     <td class="td22" style="width:50%;font-weight:bold;height:20px;background-color:#6FB7FF;">Eligibility</td>
    </tr> 
	
<?php $sElig=mysql_query("select * from hrm_master_eligibility where DepartmentId='".$ResEmp['DepartmentId']."' AND GradeId='".$GradeId."' AND CompanyId=".$ComId, $con); $rElig=mysql_fetch_assoc($sElig); ?>

<?php
$sqlChCtc=mysql_query("select * from hrm_employee_ctc_pms where EmployeeID=".$EmpId." AND PmsId=".$PmsId,$con);
$rowChCtc=mysql_num_rows($sqlChCtc);
if($rowChCtc==0)
{	 
 $sCtcE = mysql_query("SELECT * FROM hrm_employee_ctc WHERE Status='A' AND EmployeeID=".$EmpId, $con);  
 $ResCtc=mysql_fetch_assoc($sCtcE);	 
}
else{ $ResCtc=mysql_fetch_assoc($sqlChCtc); }
?>	
    <tr> 
     <td align="left" valign="top"><?php include("Sett_Ctc.php"); ?></td>
     <td align="left" id="Eelig" valign="top"> 
      <table border="0">
       <tr>
	   
	   <?php include("Sett_Elig.php"); ?>
	   
	   </tr>
       <tr><td>&nbsp;</td></tr>
       <tr>
        <td colspan="6">
         <table border="1" cellspacing="1" style="background-color:#6FB7FF;width:100%;">
          <tr><td class="td22" style="width:100%;color:#000000;font-weight:bold;">Print & View</td></tr>
         </table>
        </td>
       </tr>
<script>
function LetterClick(P,E,Y,C,R,G,D)
{ window.open("VeiwAppLetter.php?action=Letter&P="+P+"&E="+E+"&Y="+Y+"&C="+C+"&R="+R+"&G="+G+"&D="+D,"AppLetter","scrollbars=yes,resizable=no,width=820,height=750,menubar=no,location=no,directories=no");}
function LetterCTC(P,E,Y,C,R,G,D)
{window.open("VeiwAppCTC.php?action=Ctc&P="+P+"&E="+E+"&Y="+Y+"&C="+C+"&R="+R+"&G="+G+"&D="+D,"AppLetter","scrollbars=yes,resizable=no,width=820,menubar=yes,height=750,location=no,directories=no");}
function LetterElig(P,E,Y,C,R,G,D)
{window.open("VeiwAppElig.php?action=Elig&P="+P+"&E="+E+"&Y="+Y+"&C="+C+"&R="+R+"&G="+G+"&D="+D,"AppLetter","scrollbars=yes,resizable=no,menubar=yes,width=820,height=750,location=no,directories=no");}
function LetterAll(P,E,Y,C,R,G,D)
{window.open("VeiwAppAll.php?action=All&P="+P+"&E="+E+"&Y="+Y+"&C="+C+"&R="+R+"&G="+G+"&D="+D,"AppLetter","scrollbars=yes,resizable=no,menubar=yes,width=820,height=750,location=no,directories=no");}
function LetterAllPdf(P,E,Y,C,R,G,D)
{window.open("VeiwAppAllPdf.php?action=All&P="+P+"&E="+E+"&Y="+Y+"&C="+C+"&R="+R+"&G="+G+"&D="+D,"AppLetter","scrollbars=yes,resizable=no,menubar=yes,width=820,height=750,location=no,directories=no");}
</script>
       <tr>
        <td colspan="6" align="center">
         <table border="0">
          <tr>
           <td class="td22" style="width:150px;font-weight:bold;">
           <?php if($ResP['Hod_TotalFinalRating']>0){$EmpRating=$ResP['Hod_TotalFinalRating']; } else{$EmpRating=$ResP['Reviewer_TotalFinalRating']; }if($resG['GradeValue']==''){$EmpGrade=$resGr['GradeValue'];} else{$EmpGrade=$resG['GradeValue'];} if($resD['DesigId']==''){$Desig=$resDe['DesigId'];}else {$Desig=$resD['DesigId']; }?>
    <a href="#" onClick="LetterClick(<?php echo $PmsId.','.$EmpId.','.$YearId.','.$ComId.','.$EmpRating; ?>,'<?php echo $EmpGrade; ?>',<?php echo $Desig; ?>)"><font color="#005100">Appraisal Letter</font></a></td>
	  
           <td class="td22" style="width:150px;font-weight:bold;"><a href="#" onClick="LetterCTC(<?php echo $PmsId.','.$EmpId.','.$YearId.','.$ComId.','.$EmpRating; ?>,'<?php echo $EmpGrade; ?>',<?php echo $Desig; ?>)"><font color="#005100">CTC</font></td>	
           <td class="td22" style="width:150px;font-weight:bold;"><a href="#" onClick="LetterElig(<?php echo $PmsId.','.$EmpId.','.$YearId.','.$ComId.','.$EmpRating; ?>,'<?php echo $EmpGrade; ?>',<?php echo $Desig; ?>)"><font color="#005100">Eligibility</font></td> 
           <td class="td22" style="width:150px;font-weight:bold;"><a href="#" onClick="LetterAll(<?php echo $PmsId.','.$EmpId.','.$YearId.','.$ComId.','.$EmpRating; ?>,'<?php echo $EmpGrade; ?>',<?php echo $Desig; ?>)"><font color="#005100">All</font></td> 
           <td class="td22" style="width:150px;font-weight:bold;"><a href="#" onClick="LetterAllPdf(<?php echo $PmsId.','.$EmpId.','.$YearId.','.$ComId.','.$EmpRating; ?>,'<?php echo $EmpGrade; ?>',<?php echo $Desig; ?>)"><font color="#005100">Pdf</font></td>	
          </tr>
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
  </td>
 </tr>
<?php //*************END*****END*****END******END******END************************/ ?>
<?php //*************END*****END*****END******END******END************************/ ?>	
 <tr><td style="height:100px;">&nbsp;</td></tr>
  </table>
 </td>
</tr>
</table>
</body>
</html>
<?php } ?>