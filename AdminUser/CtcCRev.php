<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}
//****************************************************************************************************************
?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet"/>
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style>.font4 { color:#1FAD34; font-family:Georgia; font-size:15px;} .All{font-size:11px; height:20px;} .All_80{font-size:11px; height:20px; width:80px;}
.All_40{font-size:11px; height:20px; width:40px;} .All_50{font-size:11px; height:20px; width:50px;} .All_70{font-size:11px; height:20px; width:70px;} .All_80{font-size:11px; height:20px; width:80px;}.All_100{font-size:11px; height:20px; width:100px;} .All_120{font-size:11px; height:20px; width:120px;} .All_140{font-size:11px; height:20px; width:140px;} .All_60{font-size:11px; height:20px; width:60px;}
.All_150{font-size:11px; height:20px; width:150px;}.All_170{font-size:11px; height:20px; width:170px;}.All_180{font-size:11px; height:20px; width:180px;}.All_190{font-size:11px; height:20px; width:190px;} .All_200{font-size:11px; height:20px; width:200px;} .All_450{font-size:11px; height:20px; width:450px;}.All_360{font-size:11px; height:20px; width:350px;}.All_540{font-size:11px; height:20px; width:540px;}.All_400{font-size:11px; height:20px; width:400px;} .All_600{font-size:11px; height:20px; width:600px;}
</style>
<script type="text/javascript" src="js/stuHover.js"></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<link rel="stylesheet" type="text/css" href="src/css/jscal2.css"/>
<link rel="stylesheet" type="text/css" href="src/css/border-radius.css"/>
<link rel="stylesheet" type="text/css" href="src/css/steel/steel.css"/>
<script type="text/javascript" src="src/js/jscal2.js"></script>
<script type="text/javascript" src="src/js/lang/en.js"></script>
<style>.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}</style>
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
<Script type="text/javascript">window.history.forward(1);</script>
<Script type="text/javascript" language="javascript">

</Script>  
</head>
<body class="body">
<input type="hidden" name="ComId" id="ComId" value="<?php echo $CompanyId; ?>" />
<input type="hidden" name="YId" id="YId" value="<?php echo $YearId; ?>" />
<input type="hidden" name="UserId" id="UserId" value="<?php echo $UserId; ?>" />
<input type="hidden" name="DeptValue" id="DeptValue" value="<?php echo $_REQUEST['value']; ?>" />
<table class="table" border="0">
<tr>
 <td>
  <table class="menutable"><tr><td><?php if($_SESSION['login'] = true){ require_once("AMenu.php"); } ?></td></tr></table>
 </td>
</tr>
<tr>
 <td>
  <table width="100%" style="margin-top:0px;" border="0">
    <tr>
	  <td valign="top"><?php if($_SESSION['login'] = true){ require_once("AWelcome.php"); } ?></td>
	</tr>
	 <tr><td style="height:50px;">&nbsp;</td></tr>
	 <tr>
	  <td valign="top" align="center" width="100%" id="MainWindow">
<?php //********************************************************************************?>
<?php //*************START*****START*****START******START******START******************?>
<?php //********************************************************************************?>
<table border="0" style="margin-top:0px; width:60%; height:400px;">
 <tr>
<?php if(($_SESSION['UserType']=='M' OR $_SESSION['UserType']=='S' OR $_SESSION['UserType']=='A' OR $_SESSION['UserType']=='U') AND $_SESSION['login'] = true) { ?>
  <td align="center" valign="top">
     <b style="font-family:Times New Roman;font-size:20px;">CTC - Reverse Calculation</b>
    <table border="1" style="background-color:#FFFFFF;width:100%;">
<?php //---------------Display Record----------------------------------- ?>


<script language="javascript" type="text/javascript">
/*----------------------------------------------Cost to Company------------------------------------------------*/
/*----------------------------------------------Cost to Company------------------------------------------------*/
/*----------------------------------------------Cost to Company------------------------------------------------*/


function GrossSalary(v)
{ 
 
 var ComId = document.getElementById("ComId").value; 
 if(ComId==1 || ComId==3)
 {
 
  if(document.getElementById("BWageId").value==0)
  {
   if(document.getElementById("BWageCategory").value==0)
   {
     alert("Please select bonus wages skill!"); return false;
   }
   else
   {
    var Bwage=document.getElementById("BWageCategory").value;
    document.getElementById("BWageId").value=document.getElementById("Bw"+Bwage).value;
   }	
  }
  
 
  var BWageId=parseFloat(document.getElementById("BWageId").value); 
  if(v==0)
  { 
    var GMS = parseFloat(document.getElementById("GMS").value);
	document.getElementById("CtcGAS").value=document.getElementById("EmpTotalCtc").value;
    document.getElementById("CtcEmpTotalCtc").value=document.getElementById("EmpTotalCtc").value;
  }
  else if(v==1){ var GMS = parseFloat(document.getElementById("EmpGrossMonSalary").value); }
  else { var GMS = v; } 

  var GrossSalary = document.getElementById("EmpGrossMonSalary").value=GMS; 
  var GrossMonSalary_PAC = document.getElementById("GrossMonSalary_PAC").value=GMS;
  var GMS_PAC = document.getElementById("GMS_PAC").value=GMS; 
  var Cal_EmpBasic = parseFloat(document.getElementById("EmpBasic").value);
 
 
 /*
 if(GMS<=47109 && Cal_EmpBasic<=21000){ var BonusM = Math.round(((BWageId*20)/100)*100)/100; var BonusY = Math.round((BonusM*12)*100)/100; }
 else { var BonusM=0; var BonusY=0; }
 */
 
 if(GMS<=42000 && Cal_EmpBasic<=21000){ var BonusM = Math.round(((BWageId*20)/100)*100)/100; var BonusY = Math.round((BonusM*12)*100)/100; }
 else { var BonusM=0; var BonusY=0; }
 
 var BonusM = document.getElementById("Bonus_Month").value=BonusM; <!--Bonus-->
 var CAR_ALL = parseFloat(document.getElementById("CAR_ALL_Value").value); <!--Car Allow-->
 
 //var PFGross = Math.round((GMS-(BonusM+CAR_ALL))*100)/100;  <!--Gross For Basic & PF Calculation-->
 var PFGross = Math.round((GMS)*100)/100;  <!--Gross For Basic & PF Calculation-->
 

 
 if(PFGross>15050 && PFGross<=30000) ////PFGross<=37500 for 40%
 {
 
  var AvlGross=Math.round(((PFGross-BonusM)*100)/100,0);
  if(AvlGross<15050)
  {
   var Cal_EmpBasic = document.getElementById("EmpBasic").value=Math.round(((PFGross-BonusM)*100)/100,0);
   var ChkHRA=0;
  }
  else
  { 
   var Cal_EmpBasic = document.getElementById("EmpBasic").value=15050; 
   var ChkHRA=Math.round((((Cal_EmpBasic*40)/100)*100)/100,0);
  }
  
  var TotBH=Math.round(((Cal_EmpBasic+ChkHRA)*100)/100,0);
  <!-- HRA Con Special -->
  
  if(TotBH<=AvlGross){ var Cal_EmpHRA = document.getElementById("EmpHRA").value=ChkHRA; }
  else{ var Cal_EmpHRA = document.getElementById("EmpHRA").value=Math.round(((AvlGross-Cal_EmpBasic)*100)/100,0); }
  
  var Cal_EmpConAllow = document.getElementById("EmpConAllow").value=parseFloat(document.getElementById("Convance").value);
  var Cal_TotBasHraCon = document.getElementById("TotBasHraCon").value=Math.round((Cal_EmpBasic+Cal_EmpHRA+Cal_EmpConAllow+CAR_ALL+BonusM)*100)/100;
  
  if(Cal_TotBasHraCon<=GMS)
  { var Cal_EmpSpeAllow = document.getElementById("EmpSpeAllow").value=Math.round((GMS-Cal_TotBasHraCon)*100)/100; }
  else{ var Cal_EmpSpeAllow = document.getElementById("EmpSpeAllow").value=0; }
  
 } //if(PFGross>15050 && PFGross<=30000)
 else if(PFGross<=15050)
 {
  var Cal_EmpBasic = document.getElementById("EmpBasic").value=Math.round(((PFGross-BonusM)*100)/100,0);
  //var Cal_EmpBasic = document.getElementById("EmpBasic").value=PFGross;
  <!-- HRA Con Special -->
  var Cal_EmpHRA = document.getElementById("EmpHRA").value=0; //HRA
  var Cal_EmpConAllow = document.getElementById("EmpConAllow").value=0;
  var Cal_TotBasHraCon = document.getElementById("TotBasHraCon").value=0;
  var Cal_EmpSpeAllow = document.getElementById("EmpSpeAllow").value=0;
 }
 else
 {
  var Cal_EmpBasic = document.getElementById("EmpBasic").value=Math.round((((PFGross*50)/100)*100)/100,0); //Basic
  <!-- HRA Con Special -->
  var Cal_EmpHRA = document.getElementById("EmpHRA").value=Math.round((((Cal_EmpBasic*40)/100)*100)/100,0); //HRA
  var Cal_EmpConAllow = document.getElementById("EmpConAllow").value=parseFloat(document.getElementById("Convance").value);
  var Cal_TotBasHraCon = document.getElementById("TotBasHraCon").value=Math.round((Cal_EmpBasic+Cal_EmpHRA+Cal_EmpConAllow+CAR_ALL+BonusM)*100)/100;
  var Cal_EmpSpeAllow = document.getElementById("EmpSpeAllow").value=Math.round((GMS-Cal_TotBasHraCon)*100)/100;
 }
 
 var VPf_MaxSalPf = parseFloat(document.getElementById("Pf_MaxSalPf").value);
 var Cal_LimitPFbasic = document.getElementById("LimitPFbasic").value=Math.round((((VPf_MaxSalPf*50)/100)*100)/100,0);
 
 <!-- LTA -->
 var C_LTAMonth=0; var C_CEAMonth=0; 
 
 var TotLtaCea=Math.round((C_LTAMonth+C_CEAMonth)*100)/100; 
 
 var VGrossMonSalary_PAC = parseFloat(document.getElementById("GrossMonSalary_PAC").value); 
 var VGMS_PAC = parseFloat(document.getElementById("GMS_PAC").value);
 var C_SpeAllow = document.getElementById("EmpSpeAllow").value=Math.round((Cal_EmpSpeAllow-TotLtaCea)*100)/100; 
 var C_GrossMonSalary_PAC = document.getElementById("GrossMonSalary_PAC").value=Math.round((VGrossMonSalary_PAC-TotLtaCea)*100)/100;
 var C_GMS_PAC = document.getElementById("GMS_PAC").value=Math.round((VGMS_PAC-TotLtaCea)*100)/100;
 
 <!-- PF -->  
 if(Cal_EmpBasic<=VPf_MaxSalPf)
 { var Cal_EmpProviFund = document.getElementById("EmpProviFund").value=Math.round((((Cal_EmpBasic*12)/100)*100)/100,0); }
 else if(Cal_EmpBasic>VPf_MaxSalPf)
 { var Cal_EmpProviFund = document.getElementById("EmpProviFund").value=Math.round((((VPf_MaxSalPf*12)/100)*100)/100,0); }
 
 
 
 <!-- ESIC -->
 var Esic_DeducRate = parseFloat(document.getElementById("Esic_DeducRate").value);   //0.75
 var Esic_ContriRate = parseFloat(document.getElementById("Esic_ContriRate").value); //3.25
 var Esic_MaxSalEsic = parseFloat(document.getElementById("Esic_MaxSalEsic").value); //max basic for ESIC 8400

 
 if(GrossSalary<=21000)  //if(Cal_EmpBasic<=Esic_MaxSalEsic)
 {
   var EmpESCI = document.getElementById("EmpESCI").value=Math.round((((GMS*Esic_DeducRate)/100)*100)/100,0); 
   document.getElementById("ESCI").value=EmpESCI;
   
   var CESCI = (((GMS*Esic_ContriRate)/100)*100)/100;
   var ComESCI = Math.round(((CESCI*12)*100)/100,0);
   document.getElementById("ComESCI").value=ComESCI;
   document.getElementById("AnnualESCI").value=ComESCI; 
   //var Cal_Emp_MPP=document.getElementById("EmpMediPoliPremium").value=0;
   var Cal_Emp_MPP = document.getElementById("EmpMediPoliPremium").value = document.getElementById("Emp_MPP_ESIC").value;
  
   
 }
 else
 { 
   var EmpESCI=0; var ComESCI=0;
   document.getElementById("EmpESCI").value=EmpESCI;
   document.getElementById("AnnualESCI").value=ComESCI;
   document.getElementById("ComESCI").value=ComESCI;
   var Cal_Emp_MPP = document.getElementById("EmpMediPoliPremium").value = document.getElementById("Emp_MPP").value;
 }
 
 var vNPS = parseFloat(document.getElementById("NPS_Value").value);
   
 <!-- Net Salary --> 
 var VGrossMonSalary_PAC = parseFloat(document.getElementById("GrossMonSalary_PAC").value); 
 var EmpNetSal = Math.round(((VGrossMonSalary_PAC-(Cal_EmpProviFund+EmpESCI-vNPS))*100)/100,0);
 document.getElementById("NetMonSalary").value=EmpNetSal;
 document.getElementById("EmpNetMonSalary").value=EmpNetSal;
 
 <!-- Annual Gross Salary & Employer PF Contribution -->
 var Cal_EmpAnnGrossSalary=document.getElementById("EmpAnnGrossSalary").value=Math.round((GMS*12)*100)/100;
 var Cal_EmpEmployerPFContri=document.getElementById("EmpEmployerPFContri").value=Math.round((Cal_EmpProviFund*12)*100)/100;
 
 <!-- Gratuity --> 
 var VMaxGrtuityDay = parseFloat(document.getElementById("MaxGrtuityDay").value); 
 var Cal_OneDayBasic = document.getElementById("OneDayBasic").value=Math.round((Cal_EmpBasic/26)*100)/100;
 var Cal_EmpEstiGratuity = document.getElementById("EmpEstiGratuity").value=Math.round(((Cal_OneDayBasic*VMaxGrtuityDay)*100)/100,0);
 
 var Cal_Emp_MPP = parseFloat(document.getElementById("EmpMediPoliPremium").value);
 var TotCTC=Math.round((Cal_EmpAnnGrossSalary+Cal_EmpEstiGratuity+Cal_EmpEmployerPFContri+Cal_Emp_MPP+ComESCI)*100)/100;
 
 document.getElementById("EmpTotalCtc").value=TotCTC;
 document.getElementById("ETotCtc").value=TotCTC; 
 document.getElementById("PrvOldCTC").value=TotCTC;
 
 
 CheckEmpComActPf();   
 
 FunCheckESCI();  FunNPS_Value();  
 
 if(v==0 || v>1){ CtcGrossSalary(); }

 
} //if(ComId==1 || ComId==3)
else if(ComId==2)
{ 
  document.getElementById("EmpHRA").value=0; 
  document.getElementById("EmpConAllow").value=0; 
  document.getElementById("TA").value=0; 
  document.getElementById("CAR_ALL_Value").value=0; 
  document.getElementById("Bonus_Month").value=0; 
  document.getElementById("EmpSpeAllow").value=0; 
  document.getElementById("EmpProviFund").value=0; 
  document.getElementById("EmpESCI").value=0; 
  document.getElementById("NPS_Value").value=0;
  document.getElementById("EmpNetMonSalary").value=0;
  document.getElementById("EmpMediReim").value=0; 
  document.getElementById("EmpLeaveTraAllow").value=0; 
  document.getElementById("EmpChildEduAllow").value=0; 
  document.getElementById("EmpEstiGratuity").value=0; 
  document.getElementById("EmpEmployerPFContri").value=0; 
  document.getElementById("AnnualESCI").value=0; 
  document.getElementById("EmpMediPoliPremium").value=0; 
  document.getElementById("CheckMIC").value=0; 
  document.getElementById("EmpAddBenifit_MediInsu").value=0;
  document.getElementById("Car_Entitlement").value=0;
  
  var VGrossSalary = parseFloat(document.getElementById("EmpGrossMonSalary").value);
  var VGrossForBasic=Math.round((VGrossSalary)*100)/100;
  var GS_PAC = document.getElementById("GrossMonSalary_PAC").value=Math.round((VGrossSalary)*100)/100;  
  var GMS_PAC = document.getElementById("GMS_PAC").value=Math.round((VGrossSalary)*100)/100; 
  var Cal_EmpBasic = document.getElementById("EmpBasic").value = VGrossForBasic;
  var Cal_EmpAnnGrossSalary = document.getElementById("EmpAnnGrossSalary").value=Math.round((VGrossSalary*12)*100)/100;
  var Cal_EmptotalCtc = document.getElementById("EmpTotalCtc").value=Math.round((VGrossSalary*12)*100)/100;
  var Cal_EmptotalCtc2 = document.getElementById("ETotCtc").value=Math.round((VGrossSalary*12)*100)/100;
  document.getElementById("PrvOldCTC").value=Math.round((VGrossSalary*12)*100)/100;
   
}

  
}


<!-- CheckEmpActPf(); && CheckEmpComActPf(); && CheckEmpBSActPf(); OPEN  -->
<!-- CheckEmpActPf(); && CheckEmpComActPf(); && CheckEmpBSActPf(); OPEN  -->

function CheckEmpComActPf()
{ 
  
   var bs = parseFloat(document.getElementById("EmpBasic").value); 
   var pf = parseFloat(document.getElementById("EmpProviFund").value);
   var sp = parseFloat(document.getElementById("EmpSpeAllow").value);
   var gross = parseFloat(document.getElementById("EmpGrossMonSalary").value); 
   var pacgross = parseFloat(document.getElementById("GMS_PAC").value);
   var netsal = parseFloat(document.getElementById("EmpNetMonSalary").value);
   var gross_annual = parseFloat(document.getElementById("EmpAnnGrossSalary").value);
   var ComPfContbAnnual = parseFloat(document.getElementById("EmpEmployerPFContri").value);
   var ctc = parseFloat(document.getElementById("EmpTotalCtc").value);
  
   document.getElementById("EppBasic").value=bs;
   document.getElementById("EppProviFund").value=pf;
   document.getElementById("EppSpeAllow").value=sp;
   document.getElementById("EppGrossMonSalary").value=gross;
   document.getElementById("EppGMS_PAC").value=pacgross;
   document.getElementById("EppNetMonSalary").value=netsal;
   document.getElementById("EppAnnGrossSalary").value=gross_annual;
   document.getElementById("EppEmployerPFContri").value=ComPfContbAnnual;
    
    var Ac_Pf=Math.round((bs*12)/100); 
   
    document.getElementById("EmpProviFund").value=Ac_Pf;
    var diffpf=Math.round((Ac_Pf-pf)*100)/100;
    var Ac_NetSal=document.getElementById("EmpNetMonSalary").value=Math.round((netsal-diffpf)*100)/100; 
    var Ac_Employer_PfContb=document.getElementById("EmpEmployerPFContri").value=Math.round((ComPfContbAnnual+(diffpf*12))*100)/100; 
    document.getElementById("EmpTotalCtc").value=Math.round((ctc+(diffpf*12))*100)/100; 
	document.getElementById("ETotCtc").value=Math.round((ctc+(diffpf*12))*100)/100; 
	document.getElementById("PrvOldCTC").value=Math.round((ctc+(diffpf*12))*100)/100;
 
}  
   
<!-- CheckEmpComActPf(); Close  -->
<!-- CheckEmpComActPf(); Close  -->


function FunCheckESCI()
{ 
 var Esic_DeducRate = parseFloat(document.getElementById("Esic_DeducRate").value);   //0.75
 var Esic_ContriRate = parseFloat(document.getElementById("Esic_ContriRate").value); //3.25
 var Esic_MaxSalEsic = parseFloat(document.getElementById("Esic_MaxSalEsic").value); //max basic for ESIC 8400
 
 var EmpBasic = parseFloat(document.getElementById("EmpBasic").value);
 var VGrossSalary = parseFloat(document.getElementById("EmpGrossMonSalary").value);
 var ESCI = parseFloat(document.getElementById("ESCI").value);
 
 var EmpESCI = document.getElementById("ESCI").value=Math.round((((VGrossSalary*Esic_DeducRate)/100)*100)/100,0); //1.75
 
 
 var CESCI = (((VGrossSalary*Esic_ContriRate)/100)*100)/100;
 var ComESCI = document.getElementById("ComESCI").value=Math.round(((CESCI*12)*100)/100,0); 
 var ESCI = parseFloat(document.getElementById("ESCI").value); 
 var EmpNetMonSalary=document.getElementById("NetMonSalary").value;
 var NetMSalary=document.getElementById("NetMonSalary").value=EmpNetMonSalary;  
 var NetMonSalary=parseFloat(document.getElementById("NetMonSalary").value);
 var ETotCtc=parseFloat(document.getElementById("ETotCtc").value); //alert(ETotCtc);
 var EMediPP=parseFloat(document.getElementById("EMediPP").value); 
 var GMS_PAC=parseFloat(document.getElementById("GMS_PAC").value); 
 var EmpProviFund=parseFloat(document.getElementById("EmpProviFund").value);
 var vNPS = parseFloat(document.getElementById("NPS_Value").value);
  
 if(VGrossSalary<=21000) 
 { 
  document.getElementById("EmpESCI").value=ESCI; document.getElementById("AnnualESCI").value=ComESCI;
  var EmpESCI=parseFloat(document.getElementById("EmpESCI").value); 
  var AComESCI=parseFloat(document.getElementById("ComESCI").value);	
  var TotDedNet=Math.round((EmpProviFund+EmpESCI+vNPS)*100)/100; 
  document.getElementById("EmpNetMonSalary").value=Math.round((GMS_PAC-TotDedNet)*100)/100;
  document.getElementById("EmpMediPoliPremium").value=document.getElementById("Emp_MPP_ESIC").value; 
  var Ectc=Math.round((ETotCtc-EMediPP)*100)/100; 
  document.getElementById("EmpTotalCtc").value=Math.round((Ectc+AComESCI)*100)/100;
  document.getElementById("PrvOldCTC").value=Math.round((Ectc+AComESCI)*100)/100;
 }
 
 if(VGrossSalary>21000) //if(EmpBasic>Esic_MaxSalEsic) 
 { 
  document.getElementById("EmpESCI").value=0; document.getElementById("AnnualESCI").value=0; 
  var EmpESCI=parseFloat(document.getElementById("EmpESCI").value); 
  var AComESCI=parseFloat(document.getElementById("ComESCI").value);
  var TotDedNet=Math.round((EmpProviFund+EmpESCI+vNPS)*100)/100;
  document.getElementById("EmpNetMonSalary").value=Math.round((GMS_PAC-TotDedNet)*100)/100;
  document.getElementById("EmpMediPoliPremium").value=document.getElementById("Emp_MPP").value;
  var Ectc=Math.round((ETotCtc-EMediPP)*100)/100;
  document.getElementById("EmpTotalCtc").value=Math.round((Ectc+EMediPP)*100)/100;
  document.getElementById("PrvOldCTC").value=Math.round((Ectc+EMediPP)*100)/100;
 }
  
  var A=parseFloat(document.getElementById("EmpMediPoliPremium").value);
  var B=parseFloat(document.getElementById("AnnualESCI").value); 
  var C=parseFloat(document.getElementById("EmpEmployerPFContri").value); 
  var D=parseFloat(document.getElementById("EmpEstiGratuity").value); 
  var E=parseFloat(document.getElementById("EmpBonusExg").value); 
  var F=parseFloat(document.getElementById("EmpAnnGrossSalary").value);
  document.getElementById("EmpTotalCtc").value=Math.round((A+B+C+D+E+F)*100)/100;
  document.getElementById("PrvOldCTC").value=Math.round((A+B+C+D+E+F)*100)/100;
 
}

function FunNPS_Value()
{
 var Pf = parseFloat(document.getElementById("EmpProviFund").value);
 var ESCI = parseFloat(document.getElementById("EmpESCI").value);
 var vNPS = parseFloat(document.getElementById("NPS_Value").value);
 var GMS_PAC = parseFloat(document.getElementById("GMS_PAC").value);
 document.getElementById("EmpNetMonSalary").value=Math.round((GMS_PAC-(Pf+ESCI+vNPS))*100)/100;
}




<!-- CtcGrossSalary() CtcGrossSalary() CtcGrossSalary() CtcGrossSalary() Open  -->
<!-- CtcGrossSalary() CtcGrossSalary() CtcGrossSalary() CtcGrossSalary() Open  -->
function CtcGrossSalary()
{  

  
 var BWageId=parseFloat(document.getElementById("BWageId").value);
 var CtcGAS = parseFloat(document.getElementById("CtcGAS").value); 
 var Cal_TotCTC = document.getElementById("CtcEmpTotalCtc").value = CtcGAS; 
 
 
 /************************************************************************************** Close/
 /**************************************************************************************/
 /**************************************************************************************/
 
 <!------ ----------------- --------------- Random Check Open ---------------- ----------------->
 <!------ ----------------- --------------- Random Check Open ---------------- ----------------->
 
 
 
  var OCtc = parseFloat(document.getElementById("EmpTotalCtc").value); 
  var NCtc = parseFloat(document.getElementById("CtcEmpTotalCtc").value); 
  var OGross = parseFloat(document.getElementById("EmpGrossMonSalary").value); 
  //var NGross = parseFloat(document.getElementById("CtcEmpGrossMonSalary").value); alert("aa");
  var OOGross = parseFloat(document.getElementById("OldGross").value);
  var OOCtc = parseFloat(document.getElementById("PrvOldCTC").value);
  
  var PlusOldGross = parseFloat(document.getElementById("PlusOldGross").value);  
  //alert(OCtc+"-"+NCtc);
  var DiffCtc=0;
  if(OCtc>NCtc){ var DiffCtc = Math.round((NCtc-OOCtc)*100)/100; }
  else { var DiffCtc = Math.round((NCtc-OCtc)*100)/100; }
 
  if(DiffCtc>2000000 && DiffCtc<=5000000){ var Plus10OldGross = Math.round((PlusOldGross+500000)*100)/100; }
  else if(DiffCtc>1000000 && DiffCtc<=2000000){ var Plus10OldGross = Math.round((PlusOldGross+100000)*100)/100; }
  else if(DiffCtc>500000 && DiffCtc<=1000000){ var Plus10OldGross = Math.round((PlusOldGross+10000)*100)/100; }
  else if(DiffCtc>100000 && DiffCtc<=500000){ var Plus10OldGross = Math.round((PlusOldGross+1000)*100)/100; }
  else if(DiffCtc>10000 && DiffCtc<=100000){ var Plus10OldGross = Math.round((PlusOldGross+500)*100)/100; }
  else if(DiffCtc>5000 && DiffCtc<=10000){ var Plus10OldGross = Math.round((PlusOldGross+50)*100)/100; }
  else if(DiffCtc>1000 && DiffCtc<=5000){ var Plus10OldGross = Math.round((PlusOldGross+20)*100)/100; }
  else if(DiffCtc>500 && DiffCtc<=1000){ var Plus10OldGross = Math.round((PlusOldGross+10)*100)/100; }
  else if(DiffCtc>200 && DiffCtc<=500){ var Plus10OldGross = Math.round((PlusOldGross+5)*100)/100; }
  else if(DiffCtc>100 && DiffCtc<=200){ var Plus10OldGross = Math.round((PlusOldGross+2)*100)/100; }
  else if(DiffCtc>1 && DiffCtc<=100){ var Plus10OldGross = Math.round((PlusOldGross+1)*100)/100; }
 
  var Min10_NCtc = Math.round((NCtc-10)*100)/100; var Max10_NCtc = Math.round((NCtc+10)*100)/100;
  var Min50_NCtc = Math.round((NCtc-50)*100)/100;
  var Min40_NCtc = Math.round((NCtc-40)*100)/100;
  var Min30_NCtc = Math.round((NCtc-30)*100)/100;
  var Min20_NCtc = Math.round((NCtc-20)*100)/100;
  var Min15_NCtc = Math.round((NCtc-15)*100)/100;
      
  if(OCtc<parseFloat(Min15_NCtc))
  { 
    document.getElementById("PlusOldGross").value=Plus10OldGross;
	GrossSalary(Plus10OldGross); 
  } 
  else if(OCtc>parseFloat(Max10_NCtc))
  { 
    /*********************************************/
	var DiffCtc=0;
    var DiffCtc = Math.round((OCtc-NCtc)*100)/100; 
    
	if(DiffCtc>2000000 && DiffCtc<=5000000){ var Plus10OldGross = Math.round((PlusOldGross-500000)*100)/100; } 
    else if(DiffCtc>1000000 && DiffCtc<=2000000){ var Plus10OldGross = Math.round((PlusOldGross-100000)*100)/100; } 
    else if(DiffCtc>500000 && DiffCtc<=1000000){ var Plus10OldGross = Math.round((PlusOldGross-10000)*100)/100; }
    else if(DiffCtc>100000 && DiffCtc<=500000){ var Plus10OldGross = Math.round((PlusOldGross-1000)*100)/100; }
    else if(DiffCtc>10000 && DiffCtc<=100000){ var Plus10OldGross = Math.round((PlusOldGross-500)*100)/100; }
    else if(DiffCtc>5000 && DiffCtc<=10000){ var Plus10OldGross = Math.round((PlusOldGross-50)*100)/100; }
    else if(DiffCtc>1000 && DiffCtc<=5000){ var Plus10OldGross = Math.round((PlusOldGross-20)*100)/100; }
    else if(DiffCtc>500 && DiffCtc<=1000){ var Plus10OldGross = Math.round((PlusOldGross-10)*100)/100; }
    else if(DiffCtc>200 && DiffCtc<=500){ var Plus10OldGross = Math.round((PlusOldGross-5)*100)/100; }
    else if(DiffCtc>100 && DiffCtc<=200){ var Plus10OldGross = Math.round((PlusOldGross-2)*100)/100; }
    else if(DiffCtc>1 && DiffCtc<=100){ var Plus10OldGross = Math.round((PlusOldGross-1)*100)/100; }
	/*********************************************/
    document.getElementById("PlusOldGross").value=Plus10OldGross; 
	GrossSalary(Plus10OldGross); 
  } 
  else
  {
    var EaGrs = parseFloat(document.getElementById("EmpAnnGrossSalary").value); 
    var CtcPP = document.getElementById("CtcPP").value = Math.round((EaGrs*5)/100);
    var FixCtc = parseFloat(document.getElementById("EmpTotalCtc").value);
    var CtcPP = parseFloat(document.getElementById("CtcPP").value); 
    document.getElementById("CtcPPCtc").value = Math.round(FixCtc+CtcPP);
  }
 
 <!------ ----------------- --------------- Random Check Close ---------------- ----------------->
 <!------ ----------------- --------------- Random Check Close ---------------- ----------------->
 
}
<!-- CtcGrossSalary() CtcGrossSalary() CtcGrossSalary() CtcGrossSalary() Close  -->
<!-- CtcGrossSalary() CtcGrossSalary() CtcGrossSalary() CtcGrossSalary() Close  -->

function RefreshFun()
{
 document.getElementById("EmpBasic").value=0; document.getElementById("EmpHRA").value=0;
 document.getElementById("Bonus_Month").value=0; document.getElementById("BWageCategory").value=0;
 document.getElementById("EmpSpeAllow").value=0; document.getElementById("EmpGrossMonSalary").value=0; 
 document.getElementById("GMS_PAC").value=0; document.getElementById("EmpProviFund").value=0;
 document.getElementById("NPS_Value").value=0; document.getElementById("EmpNetMonSalary").value=0;
 document.getElementById("EmpLeaveTraAllow").value=0; document.getElementById("EmpChildEduAllow").value=0;
 document.getElementById("EmpAnnGrossSalary").value=0; document.getElementById("EmpEstiGratuity").value=0;
 document.getElementById("EmpEmployerPFContri").value=0; document.getElementById("AnnualESCI").value=0;
 document.getElementById("EmpMediPoliPremium").value=0; document.getElementById("EmpTotalCtc").value=0;
 document.getElementById("CtcPP").value=0; document.getElementById("CtcPPCtc").value=0;
 document.getElementById("CheckC1").checked=false; document.getElementById("CheckC2").checked=false;
 document.getElementById("CheckLTA").checked=false; document.getElementById("EmpESCI").value=0;
}
                 
</script>

<?php 
$sqlB=mysql_query("select * from hrm_bonus_wages where CompanyId=".$CompanyId." AND YearId=".$YearId,$con); 
while($resB=mysql_fetch_assoc($sqlB))
{
 if(date("m")==01 OR date("m")==02 OR date("m")==03 OR date("m")==10 OR date("m")==11 OR date("m")==12)
 { 
  echo '<input type="hidden" id="Bw'.$resB['BWageId'].'" value="'.$resB['PerMonthOct'].'" />';
 }
 else
 {
  echo '<input type="hidden" id="Bw'.$resB['BWageId'].'" value="'.$resB['PerMonthApr'].'" />';
 }
}
 
?>
<input type="hidden" id="BWageId" value="0" />
<input type="hidden" id="MaxVCtc" value="<?php echo $MaxVCtc; ?>" />
<input type="hidden" id="EmpActPf" value="<?php echo $ResEmp['EmpActPf']; ?>" />

<?php $SqlStat=mysql_query("select l.*,tx.*,pf.*,esic.* from hrm_company_statutory_lumpsum l INNER JOIN hrm_company_statutory_taxsaving tx ON l.CompanyId=tx.CompanyId INNER JOIN hrm_company_statutory_pf pf ON l.CompanyId=pf.CompanyId INNER JOIN hrm_company_statutory_esic esic ON l.CompanyId=esic.CompanyId where l.CompanyId=".$CompanyId, $con); $ResStat=mysql_fetch_assoc($SqlStat); ?>

<input type="hidden" id="EppBasic" value="0"/>  
<input type="hidden" id="EppProviFund" value="0"/>  
<input type="hidden" id="EppSpeAllow" value="0"/>  
<input type="hidden" id="EppGrossMonSalary" value="0"/>  
<input type="hidden" id="EppGMS_PAC" value="0"/>  
<input type="hidden" id="EppNetMonSalary" value="0"/>  
<input type="hidden" id="EppEmployerPFContri" value="0"/>  
<input type="hidden" id="EppTotalCtc" value="0"/>
<input type="hidden" id="EppAnnGrossSalary" value="0"/> 
<input type="hidden" id="ComId" value="<?=$CompanyId?>"/>
 


<input type="hidden" name="StrBonus" id="StrBonusContri" value="<?php echo $ResStat['Lumpsum_BonusContribute']; ?>"/>

<?php //echo $ResStat['Lumpsum_MaxBonus']; ?>
<input type="hidden" name="MaxBonus" id="MaxBonus" value="<?php echo 0; ?>"/> 

<input type="hidden" name="StrGrtuity" id="StrGrtuity" value="<?php echo $ResStat['Lumpsum_MaxGratuity']; ?>"/>
<input type="hidden" name="MaxGrtuity" id="MaxGrtuityDay" value="<?php echo $ResStat['Lumpsum_GratuityDay']; ?>"/>
<input type="hidden" name="Emp_MPP" id="Emp_MPP" value="<?php echo $ResStat['MedicalPolicyPremium']; ?>"/>
<input type="hidden" name="Emp_MPP_ESIC" id="Emp_MPP_ESIC" value="<?php echo $ResStat['MedicalPolicyPremium_ESIC']; ?>"/>
<input type="hidden" name="Convance" id="Convance" value="<?php echo $ResStat['ConvanceAllow']; ?>"/>
<input type="hidden" name="Pf_MaxSalPf" id="Pf_MaxSalPf" value="<?php echo $ResStat['Pf_MaxSalPf']; ?>"/>
<input type="hidden" name="Esic_DeducRate" id="Esic_DeducRate" value="<?php echo $ResStat['Esic_DeducRate']; ?>"/>
<input type="hidden" name="Esic_ContriRate" id="Esic_ContriRate" value="<?php echo $ResStat['Esic_ContriRate']; ?>"/>
<input type="hidden" name="Esic_MaxSalEsic" id="Esic_MaxSalEsic" value="<?php echo $ResStat['Esic_MaxSalEsic']; ?>"/>

<input type="hidden" name="TotBasHraCon" id="TotBasHraCon"/><input type="hidden" name="TotAnnualBasic" id="TotAnnualBasic"/>
<input type="hidden" name="OneDayBasic" id="OneDayBasic"/><input type="hidden" name="EmpTotMrLtaCea" id="EmpTotMrLtaCea"/>
<input type="hidden" name="LessSpeAllow" id="LessSpeAllow"/><input type="hidden" name="LimitPFbasic" id="LimitPFbasic"/>

 <tr>
  <td class="td33" style="width:100%;" colspan="6">&nbsp;<b>[A] Monthly Components</b>
  </td>
 </tr>
 <tr>
  <td class="td3" colspan="2" style="text-align:center;width:80%;"><b>Components</b></td>
  <td class="td3" style="text-align:center;width:20%;"><b>Values</b></td>
 </tr>
 <tr>
  <td class="td3" style="width:5%;">&nbsp;</td><td class="td3" style="width:50%;">&nbsp;Basic :</td>
  <td class="td3" style="text-align:center;"><input class="td3" style="width:95%;text-align:right;" name="EmpBasic" id="EmpBasic" readonly value="0" onChange="ChangeBasic()" onKeyUp="ChangeBasic()" onKeyPress="return isNumberKey(event)"></td>
 </tr>
 
 <tr>
  <td class="td2"></td><td class="td3" id="hraA">&nbsp;HRA :</td>
  <td class="td3" id="hraB" style="text-align:center;"><input class="td3" style="width:95%;text-align:right;" name="EmpHRA" id="EmpHRA" value="0" onChange="HRCalcu(this.value)" onKeyUp="HRCalcu(this.value)" readonly onKeyPress="return isNumberKey(event)"/></td>
 </tr>
 
<input type="hidden" name="EmpConAllow" value="0" id="EmpConAllow" readonly/><input type="hidden" name="CtcEmpConAllow" value="0" id="CtcEmpConAllow" readonly/><input type="hidden" name="Ctc2EmpConAllow" value="0" id="Ctc2EmpConAllow" readonly/>
 <input type="hidden" style="width:95%;text-align:right;" name="TA" id="TA" value="0" onChange="ChangeTA()" onKeyDown="ChangeTA()" onKeyUp="ChangeTA()" class="All_100"  readonly onKeyPress="return isNumberKey(event)"/>
 <input type="hidden" name="CheckCarAllow" id="CheckCarAllow" readonly/><input type="hidden" name="CAR_ALL_Value" value="0" id="CAR_ALL_Value" readonly/><input type="hidden" name="CtcCAR_ALL_Value" value="0" id="CtcCAR_ALL_Value" readonly/><input type="hidden" name="Ctc2CAR_ALL_Value" value="0" id="Ctc2CAR_ALL_Value" readonly/>
 
 <tr>
  <td class="td2"></td><td class="td3" id="caA">&nbsp;Bonus :
  
  <select name="BWageCategory" id="BWageCategory" class="All_100"><option value="0">Select</option><?php $sBat=mysql_query("select * from hrm_bonus_wages where BWageStatus!='De' AND CompanyId=".$CompanyId." group by BWageId ASC order by BWageId ASC"); while($rBat=mysql_fetch_assoc($sBat)){ ?><option value="<?php echo $rBat['BWageId'];?>" <?=($ResEmp['BWageId']==$rBat['BWageId'])?'selected':'';?>><?php echo $rBat['Category'];?></option><?php } ?>
  </select>
  
  </td>
  <td class="td3" id="caB" style="text-align:center;"><input class="td3" style="width:95%;text-align:right;" id="Bonus_Month" name="Bonus_Month" value="0" onChange="ChangeBonusM()" readonly onKeyPress="return isNumberKey(event)"/></td>
 </tr>
 <tr>
  <td class="td2"></td><td class="td3" id="saA">&nbsp;Special Allowance :</td>
  <td class="td3" id="saB" style="text-align:center;"><input name="EmpSpeAllow" class="td3" style="width:95%;text-align:right;" value="0" id="EmpSpeAllow" readonly onKeyPress="return isNumberKey(event)"/><input type="hidden" name="ESA2" value="0" id="ESA2" class="All_100" readonly/></td>
 </tr>
 
  <input type="hidden" id="OldGross" value="0" class="td3" style="width:95%;text-align:right;background-color:#92D1BD;"/>
  <input type="hidden" id="PlusOldGross" value="0" class="td3" style="width:95%;text-align:right;background-color:#92D1BD;"/>
 
 <tr>
  <td class="td3">&nbsp;</td><td class="td3">&nbsp;Gross Monthly Salary :</td>
  <td class="td3" style="text-align:center;"><input name="EmpGrossMonSalary" value="0" id="EmpGrossMonSalary" class="td3" onChange="GrossSalary(1)" onKeyUp="GrossSalary(1)" style="width:95%;text-align:right;" readonly onKeyPress="return isNumberKey(event)"/><input type="hidden" name="GrossMonSalary_PAC" value="0" id="GrossMonSalary_PAC" readonly/></td>
 </tr>
 <tr>
  <td class="td3">&nbsp;</td><td class="td3">&nbsp;Gross Monthly Salary (Post Annual Components):</td>
  <td class="td3" style="text-align:center;"><input name="GMS_PAC" value="0" id="GMS_PAC" class="td3" style="width:95%;text-align:right;" readonly onKeyPress="return isNumberKey(event)"/>
  
  <input type="hidden" id="GMS" name="GMS" value="10000" readonly/>
  <input type="hidden" id="CtcGAS" name="CtcGAS" value="0" readonly/>
  <input type="hidden" name="CtcEmpGrossMonSalary" id="CtcEmpGrossMonSalary" value="0"  />
  
  </td>
 </tr>

 <tr>
  <td class="td2"></td><td class="td3" id="pfA">&nbsp;Provident Fund :</td>
  <script>
  function FunEPF(v)
  {
     document.getElementById("EmpEmployerPFContri").value=Math.round((v*12)*100)/100; 
     var A=parseFloat(document.getElementById("EmpMediPoliPremium").value);
     var B=parseFloat(document.getElementById("AnnualESCI").value); 
     var C=parseFloat(document.getElementById("EmpEmployerPFContri").value); 
     var D=parseFloat(document.getElementById("EmpEstiGratuity").value); 
     var E=parseFloat(document.getElementById("EmpBonusExg").value); 
     var F=parseFloat(document.getElementById("EmpAnnGrossSalary").value);
     document.getElementById("EmpTotalCtc").value=Math.round((A+B+C+D+E+F)*100)/100; 
  }
  </script>
  
  <td class="td3" id="pfB" style="text-align:center;"><input name="EmpProviFund" value="0" id="EmpProviFund" class="td3" style="width:95%;text-align:right;" readonly onKeyPress="return isNumberKey(event)" onChange="FunEPF(this.value)"/>
  <input type="hidden" name="Extra_MrLtaCea" value="0" id="Extra_MrLtaCea" readonly/></td>
 </tr>

 <?php /*  ESCI  ESCI  ESCI  ESCI  ESCI  ESCI  ESCI  ESCI  ESCI  ESCI  ESCI  ESCI OPEN */ ?>
 <tr>
  <td class="td2"></td><td class="td3" id="pfA">&nbsp;ESIC :</td>
  <td class="td3" id="pfB" style="text-align:center;"><input name="EmpESCI" value="0" id="EmpESCI" class="td3" style="width:95%;text-align:right;" onChange="Fun2CheckESCI()" onBlur="Fun2CheckESCI()" readonly onKeyPress="return isNumberKey(event)"/><input type="hidden" name="ESCI" value="0" id="ESCI" readonly/><input type="hidden" name="ComESCI" value="0" id="ComESCI" readonly/></td>
 </tr>
 <?php /*  ESCI  ESCI  ESCI  ESCI  ESCI  ESCI ESCI  ESCI  ESCI  ESCI  ESCI  ESCI CLOSE */ ?>
 
<?php /********* NPS NPS NPS **********/ ?>
 <tr>
  <td class="td2"></td><td class="td3" id="pfA">&nbsp;NPS Contribution :</td>
  <td class="td3" id="pfB" style="text-align:center;"><input name="NPS_Value" value="0" id="NPS_Value" class="td3" style="width:95%;text-align:right;" onKeyDown="FunNPS_Value()" onChange="FunNPS_Value()" onBlur="FunNPS_Value()" readonly onKeyPress="return isNumberKey(event)"/></td>
 </tr>
<?php /********* NPS NOPS NPS **********/?>	 
 

 <tr>
  <td class="td3">&nbsp;</td><td class="td3">&nbsp;Net Monthaly Salary :</td>
  <td class="td3" style="text-align:center;"><input value="0" name="EmpNetMonSalary" id="EmpNetMonSalary" class="td3" style="width:95%;text-align:right;background-color:#DCEEF1;font-weight:bold;" readonly/><input type="hidden" value="0" id="NetMonSalary" readonly/></td>
 </tr>
 <tr><td class="td33" colspan="6">&nbsp;<b>[B] Annual Components (Tax saving components which shall be reimbursed on production of documents)</b></td></tr>

<script>


function FunLTA() 
{ 
 if(document.getElementById("CheckLTA").checked==true)
 { 
  var VBasic = parseFloat(document.getElementById("EmpBasic").value);  
  var VSpeAllow = parseFloat(document.getElementById("EmpSpeAllow").value); 
  var VGrossMonSalary_PAC = parseFloat(document.getElementById("GrossMonSalary_PAC").value); 
  var VGMS_PAC = parseFloat(document.getElementById("GMS_PAC").value);
  var VEmpProviFund = parseFloat(document.getElementById("EmpProviFund").value); 
  var VEmpNetMonSalary = parseFloat(document.getElementById("EmpNetMonSalary").value);
  var LTABasicInto_value = parseFloat(document.getElementById("LTABasicInto_value").value); 
  var Extra_MrLtaCea = parseFloat(document.getElementById("Extra_MrLtaCea").value);
  var C_LTAYear = document.getElementById("EmpLeaveTraAllow").value=Math.round(((VBasic*LTABasicInto_value)*100)/100,0);
  var C_LTAMonth = Math.round(((C_LTAYear/12)*100)/100,0); 
  var C_SpeAllow = document.getElementById("EmpSpeAllow").value=Math.round((VSpeAllow-C_LTAMonth)*100)/100; 
  var C_GrossMonSalary_PAC = document.getElementById("GrossMonSalary_PAC").value=Math.round((VGrossMonSalary_PAC-C_LTAMonth)*100)/100;
  var C_GMS_PAC = document.getElementById("GMS_PAC").value=Math.round((VGMS_PAC-C_LTAMonth)*100)/100;
  var C2_EmpNetMonSalary = document.getElementById("EmpNetMonSalary").value=Math.round((C_GrossMonSalary_PAC-VEmpProviFund)*100)/100;
  var C_Extra_MrLtaCea = document.getElementById("Extra_MrLtaCea").value=Math.round((Extra_MrLtaCea+C_LTAMonth)*100)/100;
 }
 else if(document.getElementById("CheckLTA").checked==false)
 { 
  var VBasic = parseFloat(document.getElementById("EmpBasic").value);  
  var VSpeAllow = parseFloat(document.getElementById("EmpSpeAllow").value); 
  var LTABasicInto_value = parseFloat(document.getElementById("LTABasicInto_value").value); 
  var Extra_MrLtaCea = parseFloat(document.getElementById("Extra_MrLtaCea").value);
  var VGrossMonSalary_PAC = parseFloat(document.getElementById("GrossMonSalary_PAC").value); 
  var VGMS_PAC = parseFloat(document.getElementById("GMS_PAC").value);
  var VEmpProviFund = parseFloat(document.getElementById("EmpProviFund").value); 
  var VEmpNetMonSalary = parseFloat(document.getElementById("EmpNetMonSalary").value);
  var C_LTAYear = Math.round(((VBasic*LTABasicInto_value)*100)/100,0);
  var C_LTAMonth =Math.round(((C_LTAYear/12)*100)/100,0);
  var C2_SpeAllow = document.getElementById("EmpSpeAllow").value=Math.round((VSpeAllow+C_LTAMonth)*100)/100; 
  var C2_GrossMonSalary_PAC = document.getElementById("GrossMonSalary_PAC").value=Math.round((VGrossMonSalary_PAC+C_LTAMonth)*100)/100;
  var C2_GMS_PAC = document.getElementById("GMS_PAC").value=Math.round((VGMS_PAC+C_LTAMonth)*100)/100;
  var C2_EmpNetMonSalary = document.getElementById("EmpNetMonSalary").value=Math.round((C2_GrossMonSalary_PAC-VEmpProviFund)*100)/100;
  document.getElementById("EmpLeaveTraAllow").value=0; 
  var C_Extra_MrLtaCea = document.getElementById("Extra_MrLtaCea").value=Math.round((Extra_MrLtaCea-C_LTAMonth)*100)/100; 
 }
}

function FunChild1()
{ 
 if(document.getElementById("CheckC1").checked==true)
 { 
  var CEA_value = parseFloat(document.getElementById("CEA_value").value); 
  var VSpeAllow = parseFloat(document.getElementById("EmpSpeAllow").value);
  var VGrossMonSalary_PAC = parseFloat(document.getElementById("GrossMonSalary_PAC").value); 
  var VGMS_PAC = parseFloat(document.getElementById("GMS_PAC").value);
  var VEmpProviFund = parseFloat(document.getElementById("EmpProviFund").value); 
  var VEmpNetMonSalary = parseFloat(document.getElementById("EmpNetMonSalary").value); 
  var Extra_MrLtaCea = parseFloat(document.getElementById("Extra_MrLtaCea").value); 
  var C_CEAYear = document.getElementById("EmpChildEduAllow").value=Math.round((CEA_value*12)*100)/100;
  var C_SpeAllow = document.getElementById("EmpSpeAllow").value=Math.round((VSpeAllow-CEA_value)*100)/100;
  var C_GrossMonSalary_PAC = document.getElementById("GrossMonSalary_PAC").value=Math.round((VGrossMonSalary_PAC-CEA_value)*100)/100;
  var C_GMS_PAC = document.getElementById("GMS_PAC").value=Math.round((VGMS_PAC-CEA_value)*100)/100;
  var C2_EmpNetMonSalary = document.getElementById("EmpNetMonSalary").value=Math.round((C_GrossMonSalary_PAC-VEmpProviFund)*100)/100;
  
  var C_Extra_MrLtaCea = document.getElementById("Extra_MrLtaCea").value=Math.round((Extra_MrLtaCea+CEA_value)*100)/100;
 }
 else if(document.getElementById("CheckC1").checked==false && document.getElementById("CheckC2").checked==false)
 { 
  var CEA_value = parseFloat(document.getElementById("CEA_value").value); 
  var VSpeAllow = parseFloat(document.getElementById("EmpSpeAllow").value);
  var VGrossMonSalary_PAC = parseFloat(document.getElementById("GrossMonSalary_PAC").value); 
  var VGMS_PAC = parseFloat(document.getElementById("GMS_PAC").value);
  var VEmpProviFund = parseFloat(document.getElementById("EmpProviFund").value); 
  var VEmpNetMonSalary = parseFloat(document.getElementById("EmpNetMonSalary").value);
  var Extra_MrLtaCea = parseFloat(document.getElementById("Extra_MrLtaCea").value);
  var C2_SpeAllow = document.getElementById("EmpSpeAllow").value=Math.round((VSpeAllow+CEA_value)*100)/100; 
  var C2_GrossMonSalary_PAC = document.getElementById("GrossMonSalary_PAC").value=Math.round((VGrossMonSalary_PAC+CEA_value)*100)/100;
  var C2_GMS_PAC = document.getElementById("GMS_PAC").value=Math.round((VGMS_PAC+CEA_value)*100)/100;
  var C2_EmpNetMonSalary = document.getElementById("EmpNetMonSalary").value=Math.round((C2_GrossMonSalary_PAC-VEmpProviFund)*100)/100;
  var C_Extra_MrLtaCea = document.getElementById("Extra_MrLtaCea").value=Math.round((Extra_MrLtaCea-CEA_value)*100)/100;
  document.getElementById("EmpChildEduAllow").value=0; document.getElementById("CheckC1").checked=false; 
 }
 else if(document.getElementById("CheckC1").checked==false && document.getElementById("CheckC2").checked==true)
 { 
  var CEA_value = parseFloat(document.getElementById("CEA_value").value); 
  var VSpeAllow = parseFloat(document.getElementById("EmpSpeAllow").value);
  var VGrossMonSalary_PAC = parseFloat(document.getElementById("GrossMonSalary_PAC").value); 
  var VGMS_PAC = parseFloat(document.getElementById("GMS_PAC").value);
  var VEmpProviFund = parseFloat(document.getElementById("EmpProviFund").value); 
  var VEmpNetMonSalary = parseFloat(document.getElementById("EmpNetMonSalary").value);
  var Extra_MrLtaCea = parseFloat(document.getElementById("Extra_MrLtaCea").value);
  var CEA_value2 = Math.round((CEA_value*2)*100)/100;
  var C2_SpeAllow = document.getElementById("EmpSpeAllow").value=Math.round((VSpeAllow+CEA_value2)*100)/100; 
  var C2_GrossMonSalary_PAC = document.getElementById("GrossMonSalary_PAC").value=Math.round((VGrossMonSalary_PAC+CEA_value2)*100)/100;
  var C2_GMS_PAC = document.getElementById("GMS_PAC").value=Math.round((VGMS_PAC+CEA_value2)*100)/100;
  var C2_EmpNetMonSalary = document.getElementById("EmpNetMonSalary").value=Math.round((C2_GrossMonSalary_PAC-VEmpProviFund)*100)/100;
  var C_Extra_MrLtaCea = document.getElementById("Extra_MrLtaCea").value=Math.round((Extra_MrLtaCea-CEA_value2)*100)/100;
  document.getElementById("EmpChildEduAllow").value=0; document.getElementById("CheckC1").checked=false; 
 }  
} 

function FunChild2()
{ 
 if(document.getElementById("CheckC2").checked==true)
 { 
  var CEA_value = parseFloat(document.getElementById("CEA_value").value); 
  var VSpeAllow = parseFloat(document.getElementById("EmpSpeAllow").value);
  var EmpChildEduAllow = parseFloat(document.getElementById("EmpChildEduAllow").value); 
  var Extra_MrLtaCea = parseFloat(document.getElementById("Extra_MrLtaCea").value);
  var VGrossMonSalary_PAC = parseFloat(document.getElementById("GrossMonSalary_PAC").value); 
  var VGMS_PAC = parseFloat(document.getElementById("GMS_PAC").value);
  var VEmpProviFund = parseFloat(document.getElementById("EmpProviFund").value); 
  var VEmpNetMonSalary = parseFloat(document.getElementById("EmpNetMonSalary").value);
  var C_CEAYear2 = Math.round((CEA_value*12)*100)/100;
  var C_CEAYearTwoChild = document.getElementById("EmpChildEduAllow").value=Math.round((EmpChildEduAllow+C_CEAYear2)*100)/100;
  var C_SpeAllow = document.getElementById("EmpSpeAllow").value=Math.round((VSpeAllow-CEA_value)*100)/100; 
  var C2_GrossMonSalary_PAC = document.getElementById("GrossMonSalary_PAC").value=Math.round((VGrossMonSalary_PAC-CEA_value)*100)/100;
  var C2_GMS_PAC = document.getElementById("GMS_PAC").value=Math.round((VGMS_PAC-CEA_value)*100)/100;
  var C2_EmpNetMonSalary = document.getElementById("EmpNetMonSalary").value=Math.round((C2_GrossMonSalary_PAC-VEmpProviFund)*100)/100;
  var C_Extra_MrLtaCea = document.getElementById("Extra_MrLtaCea").value=Math.round((Extra_MrLtaCea+CEA_value)*100)/100;
 }
 else if(document.getElementById("CheckC2").checked==false)
 { 
  var CEA_value = parseFloat(document.getElementById("CEA_value").value); 
  var VSpeAllow = parseFloat(document.getElementById("EmpSpeAllow").value);
  var EmpChildEduAllow = parseFloat(document.getElementById("EmpChildEduAllow").value); 
  var Extra_MrLtaCea = parseFloat(document.getElementById("Extra_MrLtaCea").value);
  var VGrossMonSalary_PAC = parseFloat(document.getElementById("GrossMonSalary_PAC").value); 
  var VGMS_PAC = parseFloat(document.getElementById("GMS_PAC").value);
  var VEmpProviFund = parseFloat(document.getElementById("EmpProviFund").value); 
  var VEmpNetMonSalary = parseFloat(document.getElementById("EmpNetMonSalary").value);
  var C_CEAYear2 = Math.round((CEA_value*12)*100)/100;
  var C_CEAYearTwoChild = document.getElementById("EmpChildEduAllow").value=Math.round((EmpChildEduAllow-C_CEAYear2)*100)/100;
  var C2_SpeAllow = document.getElementById("EmpSpeAllow").value=Math.round((VSpeAllow+CEA_value)*100)/100;
  var C2_GrossMonSalary_PAC = document.getElementById("GrossMonSalary_PAC").value=Math.round((VGrossMonSalary_PAC+CEA_value)*100)/100;
  var C2_GMS_PAC = document.getElementById("GMS_PAC").value=Math.round((VGMS_PAC+CEA_value)*100)/100;
  var C2_EmpNetMonSalary = document.getElementById("EmpNetMonSalary").value=Math.round((C2_GrossMonSalary_PAC-VEmpProviFund)*100)/100;
  var C_Extra_MrLtaCea = document.getElementById("Extra_MrLtaCea").value=Math.round((Extra_MrLtaCea-CEA_value)*100)/100;
 }
}
</script>
  <input type="hidden" name="MR_value" id="MR_value" value="<?php echo $ResStat['MR_PerMonth']; ?>" />
  <input type="hidden" name="LTA_value" id="LTA_value" value="<?php echo $ResStat['']; ?>" /> 
  <input type="hidden" name="LTABasicInto" id="LTABasicInto_value" value="<?php echo $ResStat['LTA_BasicInto']; ?>" />
  <input type="hidden" name="CEA_value" id="CEA_value" value="<?php echo $ResStat['CEA_PerChildMonth']; ?>"/>
  <?php $OneChild=$ResStat['CEA_PerChildMonth']*12; $TwoChild=$OneChild*2;?>
 <input type="hidden" name="CheckMR" id="CheckMR" />
 <input type="hidden" name="EmpMediReim" value="0" id="EmpMediReim" readonly/>
 <tr>
  <td class="td2"></td><td class="td3" id="ltaA">&nbsp;Leave Travel Allowance :&nbsp;&nbsp;
  <input type="checkbox" name="CheckLTA" id="CheckLTA" onClick="FunLTA()" />
  </td>
  <td class="td3" id="ltaB" style="text-align:center;"><input name="EmpLeaveTraAllow" value="0" id="EmpLeaveTraAllow" onChange="return ChangeLTA(this.value)" onKeyUp="return ChangeLTA(this.value)" class="td3" style="width:95%;text-align:right;" readonly onKeyPress="return isNumberKey(event)"/></td>
 </tr>
 <tr>
  <td class="td2"></td><td class="td3" id="ceaA">&nbsp;Children Education Allow. :&nbsp;&nbsp;
   Child1 :<input type="checkbox" name="CheckC1" id="CheckC1" onClick="FunChild1()" />&nbsp; 
   Child2 :<input type="checkbox" name="CheckC2" id="CheckC2" onClick="FunChild2()" />
  </td>
  <td class="td3" id="ceaB" style="text-align:center;"><input name="EmpChildEduAllow" value="0" id="EmpChildEduAllow" onChange="return ChangeCEA(this.value)" onKeyUp="return ChangeCEA(this.value)" class="td3" style="width:95%;text-align:right;" readonly/></td>
 </tr>
 <tr>
  <td class="td2"></td><td class="td3">&nbsp;Annual Gross Salary :</td>
  <td class="td3" style="text-align:center;"><input value="0" name="EmpAnnGrossSalary" id="EmpAnnGrossSalary" class="td3" style="width:95%;text-align:right;background-color:#DCEEF1;font-weight:bold;" readonly/></td>
 </tr>
 <tr><td class="td33" colspan="6">&nbsp;<b>[C] Other Annual Components (Statutory components)</tr>

 <input type="hidden" name="CheckBonus" id="CheckBonus" checked onClick="CheckBonus()" disabled/>
 <input type="hidden" name="EmpBonusExg" value="0" id="EmpBonusExg" readonly/>
 <tr>
  <td class="td2"></td><td class="td3" id="gratuityA">&nbsp;Estimated Gratuity :</td>
  <td class="td3" id="gratuityB" style="text-align:center;"><input name="EmpEstiGratuity" value="0" id="EmpEstiGratuity" class="td3" style="width:95%;text-align:right;" readonly/></td>
 </tr>
 <tr>
  <td class="td2"></td><td class="td3" id="pfcontriA">&nbsp;Employer's PF Contribution :</td>
  <td class="td3" id="pfcontriB" style="text-align:center;"><input name="EmpEmployerPFContri" value="0" id="EmpEmployerPFContri" class="td3" style="width:95%;text-align:right;" readonly/></td>
 </tr>
 <tr>
  <td class="td3">&nbsp;</td><td class="td3" id="mppA">&nbsp;Employer's ESIC Contribution :</td>
  <td class="td3" id="mppB" style="text-align:center;"><input name="AnnualESCI" value="0" id="AnnualESCI" class="td3" style="width:95%;text-align:right;" readonly/></td>
 </tr>
 <tr>
  <td class="td2"></td><td class="td3" id="mppA">&nbsp;Insurance Policy Premiums :</td>
  <td class="td3" id="mppB" style="text-align:center;"><input name="EmpMediPoliPremium" id="EmpMediPoliPremium" onChange="ChangeMPP()" onKeyUp="ChangeMPP()" value="0" class="td3" style="width:95%;text-align:right;" readonly/><input type="hidden" id="EMediPP" value="<?php echo $ResStat['MedicalPolicyPremium']; ?>" readonly/></td>
 </tr>
 
 <tr>
  <td class="td3">&nbsp;</td><td class="td3">&nbsp;Fixed CTC :</td>
  <td class="td3" style="text-align:center;"><input id="EmpTotalCtc" name="EmpTotalCtc" value="0" class="td3" style="width:95%;text-align:right;background-color:#DCEEF1;font-weight:bold;" /><input type="hidden" id="HideCtc" value="0" /><input type="hidden" value="<?php echo $ResCtc['Tot_CTC']; ?>" id="ETotCtc" readonly onKeyPress="return isNumberKey(event)"/>
  <input type="hidden" id="PrvOldCTC" name="PrvOldCTC" value="0" />
  <input type="hidden" id="CtcEmpTotalCtc" name="CtcEmpTotalCtc" value="0" />
  </td>
 </tr>
 
 <tr>
  <td class="td3">&nbsp;</td><td class="td3">&nbsp;Performance Pay :</td>
  <td class="td3" style="text-align:center;"><input id="CtcPP" name="CtcPP" value="0" class="td3" style="width:95%;text-align:right;font-weight:bold;" readonly/></td>
 </tr>
 <tr>
  <td class="td3">&nbsp;</td><td class="td3">&nbsp;Total CTC :</td>
  <td class="td3" style="text-align:center;"><input id="CtcPPCtc" name="CtcPPCtc" value="0" class="td3" style="width:95%;text-align:right;background-color:#FFD2FF;font-weight:bold;" readonly/></td>
 </tr>
 
 
 
 
 <tr>  
  <td class="td3" class="fontButton" align="right" colspan="6">
  <table border="0" class="fontButton" style="width:100%;">
   <tr>
	<td class="hl" style="width:60%;text-align:right;font-weight:bold;"><span id="msgCTC">&nbsp;</span></td>	 
	<td align="right" style="width:120px;">
	<input type="button" style="width:100px;" value="Refresh" onClick="RefreshFun()"/>
	<input type="button" style="width:100px;" value="Run" onClick="GrossSalary(0)"/>
	</td>
   </tr>
  </table>
  </td> 
 </tr>



<?php //---------------Close Record----------------------------------- ?>
    </table>	
  </td>
<?php } ?>
  <td align="left" width="20%">&nbsp;</td>
 </tr>
</table>
<?php /*******************************************************************************/ ?>
<?php //***************************END*****END*****END******END******END****************************?>
<?php //****************************************************************************************?>
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