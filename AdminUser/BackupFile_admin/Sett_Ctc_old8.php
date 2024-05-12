<script language="javascript" type="text/javascript">
/*----------------------------------------------Cost to Company------------------------------------------------*/
/*----------------------------------------------Cost to Company------------------------------------------------*/
/*----------------------------------------------Cost to Company------------------------------------------------*/

function GrossSalary(v)
{ 
 var BWageId=parseFloat(document.getElementById("BWageId").value);
 if(v==0){ var GMS = parseFloat(document.getElementById("GMS").value); }
 else { var GMS = parseFloat(document.getElementById("EmpGrossMonSalary").value); }
 
 var GrossSalary = document.getElementById("EmpGrossMonSalary").value=GMS; <!--Gross Salary-->
 var GrossMonSalary_PAC = document.getElementById("GrossMonSalary_PAC").value=GMS;
 var GMS_PAC = document.getElementById("GMS_PAC").value=GMS; 
 var Cal_EmpBasic = parseFloat(document.getElementById("EmpBasic").value);
 //52500
 
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
 
 /*
 if(PFGross>=47109 && PFGross<=52525) //PFGross>=37687 && PFGross<=42020 (for 50%)
 {
  var BonusM = document.getElementById("Bonus_Month").value=0;
  if(Cal_EmpBasic<=21000)
  { 
   var Cal_EmpBasic = document.getElementById("EmpBasic").value=21010;
  }
  var ChkHRA=Math.round((((Cal_EmpBasic*40)/100)*100)/100,0);
  var TotBH=Math.round(((Cal_EmpBasic+ChkHRA)*100)/100,0);
  <!-- HRA Con Special -->
  
  if(TotBH<=PFGross)
  {
   var Cal_EmpHRA = document.getElementById("EmpHRA").value=ChkHRA; //HRA
  }
  else
  {
   var Cal_EmpHRA = document.getElementById("EmpHRA").value=Math.round(((PFGross-Cal_EmpBasic)*100)/100,0); //HRA
  }
  
  var Cal_EmpConAllow = document.getElementById("EmpConAllow").value=parseFloat(document.getElementById("Convance").value);
  var Cal_TotBasHraCon = document.getElementById("TotBasHraCon").value=Math.round((Cal_EmpBasic+Cal_EmpHRA+Cal_EmpConAllow+CAR_ALL+BonusM)*100)/100;
  var Cal_EmpSpeAllow = document.getElementById("EmpSpeAllow").value=Math.round((GMS-Cal_TotBasHraCon)*100)/100;
  
  
  
 }
 else */
 
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
 if(document.getElementById("CheckLTA").checked==true)
 {
  var LTABasicInto_value = parseFloat(document.getElementById("LTABasicInto_value").value); 
  var Extra_MrLtaCea = parseFloat(document.getElementById("Extra_MrLtaCea").value);
  var C_LTAYear = document.getElementById("EmpLeaveTraAllow").value=Math.round(((Cal_EmpBasic*LTABasicInto_value)*100)/100,0);
  var C_LTAMonth = Math.round(((C_LTAYear/12)*100)/100,0);  
 }
 else{ var C_LTAMonth=0; }
 
 <!-- CEA -->
 if(document.getElementById("CheckCEA").checked==true)
 {
  var C_CEAMonth = parseFloat(document.getElementById("CEA_value").value);
  var C_CEAYear = document.getElementById("EmpChildEduAllow").value=Math.round((C_CEAMonth*12)*100)/100; 
  if(document.getElementById("CheckC2").checked==true)
  { var C_CEAYear = document.getElementById("EmpChildEduAllow").value=Math.round((C_CEAYear*2)*100)/100; 
    var C_CEAMonth = Math.round((C_CEAMonth*2)*100)/100; 
  }
  
 }
 else{ var C_CEAMonth=0; }
 
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
  /*
   function round(n){ n = Math.pow(10,n); return function(num) { return Math.round(num*n)/n; } }
   var round_decimal = round(1);
   var CESCI = round_decimal((((GMS*Esic_ContriRate)/100)*100)/100);
   */
   var CESCI = (((GMS*Esic_ContriRate)/100)*100)/100;
   var ComESCI = Math.round(((CESCI*12)*100)/100,0);
   document.getElementById("ComESCI").value=ComESCI;
   document.getElementById("AnnualESCI").value=ComESCI;
   var Cal_Emp_MPP=document.getElementById("EmpMediPoliPremium").value=0;
   document.getElementById("EmpAddBenifit_MediInsu").value=0;
 }
 else
 { 
   var EmpESCI=0; var ComESCI=0;
   document.getElementById("EmpESCI").value=EmpESCI;
   document.getElementById("AnnualESCI").value=ComESCI;
   document.getElementById("ComESCI").value=ComESCI;
   var Cal_Emp_MPP = document.getElementById("EmpMediPoliPremium").value = document.getElementById("Emp_MPP").value;
   document.getElementById("EmpAddBenifit_MediInsu").value=document.getElementById("MCSSP").value;
 }
    
 <!-- Net Salary --> 
 var VGrossMonSalary_PAC = parseFloat(document.getElementById("GrossMonSalary_PAC").value); 
 var EmpNetSal = Math.round(((VGrossMonSalary_PAC-(Cal_EmpProviFund+EmpESCI))*100)/100,0);
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
 
 if(document.getElementById("ActPFCheck").value=='Y'){ CheckEmpComActPf(); } //CheckEmpActPf();
 if(document.getElementById("ActComPFCheck").value=='Y'){ CheckEmpComActPf(); } 
 if(document.getElementById("BSActPfCheck").value=='Y'){ CheckEmpBSActPf(); } 
 
 if(v==0){ CtcGrossSalary(); }
  
}


<!-- CheckEmpActPf(); && CheckEmpComActPf(); && CheckEmpBSActPf(); OPEN  -->
<!-- CheckEmpActPf(); && CheckEmpComActPf(); && CheckEmpBSActPf(); OPEN  -->
function CheckEmpActPf()
{ 
  if(document.getElementById("ActPFCheck").value=='Y')
  {
  
   //document.getElementById("EmpComActPf").checked=false; document.getElementById("ActComPFCheck").value='N';
   //document.getElementById("ActPFCheck").value='Y';
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
   document.getElementById("EppTotalCtc").value=ctc;
   
   var Ac_Pf=Math.round((bs*12)/100);
   if(Ac_Pf>pf)
   {
    document.getElementById("EmpProviFund").value=Ac_Pf;
    var diffpf=Math.round((Ac_Pf-pf)*100)/100;
    var Ac_Sp=document.getElementById("EmpSpeAllow").value=Math.round((sp-diffpf)*100)/100;
    var Ac_Gross=document.getElementById("EmpGrossMonSalary").value=Math.round((gross-diffpf)*100)/100;
    var Ac_pac_Gross=document.getElementById("GMS_PAC").value=Math.round((pacgross-diffpf)*100)/100;
    var Ac_NetSal=document.getElementById("EmpNetMonSalary").value=Math.round((netsal-(diffpf*2))*100)/100;
   
    var Ac_Gross_Annual=document.getElementById("EmpAnnGrossSalary").value=Math.round((Ac_Gross*12)*100)/100;
    var Ac_Employer_PfContb=document.getElementById("EmpEmployerPFContri").value=Math.round((ComPfContbAnnual+(diffpf*12))*100)/100;
    document.getElementById("Employer_ExtraPF_Annual").value=Math.round((diffpf*12)*100)/100;
   } 
    
  }
  //else if(document.getElementById("EmpActPf").checked==false){ document.getElementById("ActPFCheck").value='N'; }
     
}


function CheckEmpComActPf()
{ 
  if(document.getElementById("ActComPFCheck").value=='Y' || document.getElementById("ActPFCheck").value=='Y')
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
    
   var Ac_Pf=Math.round((bs*12)/100); //alert(Ac_Pf+">"+pf);
   if(Ac_Pf>pf)
   { 
    document.getElementById("EmpProviFund").value=Ac_Pf;
    var diffpf=Math.round((Ac_Pf-pf)*100)/100;
    var Ac_NetSal=document.getElementById("EmpNetMonSalary").value=Math.round((netsal-diffpf)*100)/100; 
    var Ac_Employer_PfContb=document.getElementById("EmpEmployerPFContri").value=Math.round((ComPfContbAnnual+(diffpf*12))*100)/100; 
    document.getElementById("EmpTotalCtc").value=Math.round((ctc+(diffpf*12))*100)/100; 
	document.getElementById("ETotCtc").value=Math.round((ctc+(diffpf*12))*100)/100; 
   } 
    
  }
  //else if(document.getElementById("EmpComActPf").checked==false){ document.getElementById("ActComPFCheck").value='N'; }
    
}  


function CheckEmpBSActPf()
{ 
  
  var bs = parseFloat(document.getElementById("EmpBasic").value);
  
  if(bs<15000)
  {  
      
  if(document.getElementById("BSActPfCheck").value=='Y')
  {
    //document.getElementById("BSActPfCheck").value='Y';
   
    var bs = parseFloat(document.getElementById("EmpBasic").value);
	var sp = parseFloat(document.getElementById("EmpSpeAllow").value);
    var pf = parseFloat(document.getElementById("EmpProviFund").value);
    var netsal = parseFloat(document.getElementById("EmpNetMonSalary").value);
    var ComPfContbAnnual = parseFloat(document.getElementById("EmpEmployerPFContri").value);
    var ctc = parseFloat(document.getElementById("EmpTotalCtc").value);
  
    document.getElementById("EppBasic").value=bs;
    document.getElementById("EppProviFund").value=pf;
    document.getElementById("EppNetMonSalary").value=netsal;
    document.getElementById("EppEmployerPFContri").value=ComPfContbAnnual;
    document.getElementById("EppTotalCtc").value=ctc; 
   
    var TotSalBS=Math.round((bs+sp)*100)/100;
	if(TotSalBS<=15000){ var Ac_Pf=Math.round(((bs+sp)*12)/100); }
	else { var Ac_Pf=1800; }
	
    document.getElementById("EmpProviFund").value=Ac_Pf;
    var diffpf=Math.round((Ac_Pf-pf)*100)/100;
    var Ac_NetSal=document.getElementById("EmpNetMonSalary").value=Math.round((netsal-diffpf)*100)/100;
    var Ac_Employer_PfContb=document.getElementById("EmpEmployerPFContri").value=Math.round((ComPfContbAnnual+(diffpf*12))*100)/100;
    var Act_ctc = document.getElementById("EmpTotalCtc").value=Math.round((ctc+(diffpf*12))*100)/100;
    
  }
  else if(document.getElementById("BSActPfCheck").value=='N')
  { 
    //document.getElementById("BSActPfCheck").value='N';
    document.getElementById("EmpProviFund").value=document.getElementById("EppProviFund").value;
    document.getElementById("EmpNetMonSalary").value=document.getElementById("EppNetMonSalary").value;
    document.getElementById("EmpEmployerPFContri").value=document.getElementById("EppEmployerPFContri").value;
    document.getElementById("EmpTotalCtc").value=document.getElementById("EppTotalCtc").value;
  }
  
  }
     
}  
<!-- CheckEmpActPf(); && CheckEmpComActPf(); && CheckEmpBSActPf(); Close  -->
<!-- CheckEmpActPf(); && CheckEmpComActPf(); && CheckEmpBSActPf(); Close  -->


<!-- CtcGrossSalary() CtcGrossSalary() CtcGrossSalary() CtcGrossSalary() Open  -->
<!-- CtcGrossSalary() CtcGrossSalary() CtcGrossSalary() CtcGrossSalary() Open  -->
function CtcGrossSalary()
{
 var BWageId=parseFloat(document.getElementById("BWageId").value);
 var CtcGAS = parseFloat(document.getElementById("CtcGAS").value);
 var Cal_TotCTC = document.getElementById("CtcEmpTotalCtc").value = CtcGAS; 
 
 //Bonus
 if(CtcGAS<=682355.38)
 { var BonusM = Math.round(((BWageId*20)/100)*100)/100; var BonusY = Math.round((BonusM*12)*100)/100;  }
 else { var BonusM=0; var BonusY=0; }  
 var CtcBonusM = document.getElementById("CtcBonus_Month").value=BonusM; <!--Bonus-->
 var CtcCARm = parseFloat(document.getElementById("CtcCAR_ALL_Value").value);  <!--Car Allow --> 
 var CtcCARy = Math.round((CtcCARm*12)*100)/100;
 var TotBonCar=Math.round((BonusY+CtcCARy)*100)/100;  
 
 //Employer ESIC
 if(CtcGAS<=275304.01 && BonusM==2266){ var ComESIC=Math.round((CtcGAS*2.974893101)/100);}
 else if(CtcGAS<=275429.87 && BonusM==2110){ var ComESIC=Math.round((CtcGAS*2.973533698)/100);}
 else if(CtcGAS<=275555.73 && BonusM==1954){ var ComESIC=Math.round((CtcGAS*2.972175538)/100);}
 else if(CtcGAS<=275660.61 && BonusM==1824){ var ComESIC=Math.round((CtcGAS*2.971044721)/100);}
 else { var ComESIC=0; } 
 var CtcComESCI = document.getElementById("CtcAnnualESCI").value=ComESIC;
 
 //Mediclaim
 if((CtcGAS<=275304.01 && BonusM==2266) || (CtcGAS<=275429.87 && BonusM==2110) || (CtcGAS<=275555.73 && BonusM==1954) || (CtcGAS<=275660.61 && BonusM==1824))
 { var CtcMediclaim=0; }
 else{ var CtcMediclaim=document.getElementById("CtcEmpMediPoliPremium").value = parseFloat(document.getElementById("Emp_MPP").value); }
 
 
 //Employer PF Contribustion
 var GcomPF=parseFloat(document.getElementById("EmpEmployerPFContri").value);
 if(document.getElementById("ActPFCheck").value=='N' && document.getElementById("ActComPFCheck").value=='N' && document.getElementById("BSActPfCheck").value=='N' && GcomPF==21600)
  { var ComPF=21600; }
  else{ var ComPF = Math.round((((CtcGAS-TotBonCar)-(CtcComESCI+CtcMediclaim))*4.49762145)/100); }
  
  var CtcComPF = document.getElementById("CtcEmpEmployerPFContri").value=ComPF;
 
 //Employer PF Contribustion
 //var ComPF = Math.round((((CtcGAS-TotBonCar)-(CtcComESCI+CtcMediclaim))*4.49762145)/100); 
 //var CtcComPF = document.getElementById("CtcEmpEmployerPFContri").value=ComPF;

 //Gratuity
 var ComGratuity =Math.round((((CtcGAS-TotBonCar)-(CtcComESCI+CtcMediclaim))*1.801931373)/100); 
 var CtcComGratuity = document.getElementById("CtcEmpEstiGratuity").value=ComGratuity;
 
 //Annual Gross
 var AnnualGross =Math.round(((CtcGAS-TotBonCar)-(ComGratuity+CtcComPF+CtcComESCI+CtcMediclaim))+TotBonCar);
 var CtcAnnualGross = document.getElementById("CtcEmpAnnGrossSalary").value=AnnualGross;
 
 //Monthly Gross
 //var MonthlyGross = Math.round(CtcAnnualGross/12);
 var CtcMonthlyGross = document.getElementById("CtcEmpGrossMonSalary").value=Math.round(CtcAnnualGross/12);
 var CtcMonthlyGross_PAC = document.getElementById("CtcGMS_PAC").value=Math.round(CtcAnnualGross/12);
 
 if(CtcMonthlyGross<=42000)  //if(CtcMonthlyGross<=47109)
 { 
  var BonusM = document.getElementById("CtcBonus_Month").value=BonusM;
  var BonusY = Math.round((BonusM*12)*100)/100;
 }
 else { var BonusM=0; var BonusY=0; }
 var CtcBonusM = document.getElementById("CtcBonus_Month").value=BonusM;
 
 //Basic
 var CtcMonthlyGross = parseFloat(document.getElementById("CtcEmpGrossMonSalary").value);
 var CtcMonthlyGross_PAC = parseFloat(document.getElementById("CtcGMS_PAC").value);
 
 /*************************************************************************/
 /*************************************************************************/
 //var PFGross = Math.round((CtcMonthlyGross-(BonusM+CtcCARm))*100)/100;
 var PFGross = Math.round((CtcMonthlyGross)*100)/100;
 
 /*
 if(PFGross>=47109 && PFGross<=52525) //if(PFGross>=37687 && PFGross<=42020) for 50%
 {
  var CtcBonusM = document.getElementById("CtcBonus_Month").value=0;
  var CtcEmpBasic = document.getElementById("CtcEmpBasic").value=21010;
  
  <!-- HRA Con Special -->
  var ChkHRA=Math.round((((CtcEmpBasic*40)/100)*100)/100,0);
  var TotBH=Math.round(((CtcEmpBasic+ChkHRA)*100)/100,0);
  
  if(TotBH<=PFGross)
  {
   var CtcEmpHRA = document.getElementById("CtcEmpHRA").value=ChkHRA; //HRA
  }
  else
  {
   var CtcEmpHRA = document.getElementById("CtcEmpHRA").value=Math.round(((PFGross-CtcEmpBasic)*100)/100,0); //HRA
  }
  
  var CtcTotBasHraCon = Math.round(CtcEmpBasic+CtcEmpHRA+BonusM+CtcCARm);
  var CtcEmpSpeAllow = document.getElementById("CtcEmpSpeAllow").value=Math.round(CtcMonthlyGross-CtcTotBasHraCon);
 }
 else */
 
 if(PFGross>15050 && PFGross<=30000)  //if(PFGross>15050 && PFGross<=37500)
 {
 
  var AvlGross=Math.round(((PFGross-BonusM)*100)/100,0);
  if(AvlGross<15050)
  {
   var CtcEmpBasic = document.getElementById("CtcEmpBasic").value=Math.round(((PFGross-BonusM)*100)/100,0);
   var ChkHRA=0;
  }
  else
  { 
   var Cal_EmpBasic = document.getElementById("CtcEmpBasic").value=15050; 
   var ChkHRA=Math.round((((CtcEmpBasic*40)/100)*100)/100,0);
  }
 
  <!-- HRA Con Special -->
  var TotBH=Math.round(((CtcEmpBasic+ChkHRA)*100)/100,0);
  
  if(TotBH<=AvlGross){ var CtcEmpHRA = document.getElementById("CtcEmpHRA").value=ChkHRA; }
  else{ var CtcEmpHRA = document.getElementById("CtcEmpHRA").value=Math.round(((AvlGross-CtcEmpBasic)*100)/100,0); }
  
  var CtcTotBasHraCon = Math.round(CtcEmpBasic+CtcEmpHRA+BonusM+CtcCARm);
  
  if(CtcTotBasHraCon<=CtcMonthlyGross)
  { var CtcEmpSpeAllow = document.getElementById("CtcEmpSpeAllow").value=Math.round((CtcMonthlyGross-CtcTotBasHraCon)*100)/100; }
  else{ var Cal_EmpSpeAllow = document.getElementById("CtcEmpSpeAllow").value=0; }
  
 }
 else if(PFGross<=15000)
 {
  var CtcEmpBasic = document.getElementById("CtcEmpBasic").value=Math.round(((PFGross-BonusM)*100)/100,0);
  //var CtcEmpBasic = document.getElementById("CtcEmpBasic").value=PFGross;
  <!-- HRA Con Special -->
  var CtcEmpHRA = document.getElementById("CtcEmpHRA").value=0; //HRA
  var CtcTotBasHraCon = 0;
  var CtcEmpSpeAllow = document.getElementById("CtcEmpSpeAllow").value=0;  
 }
 else
 {
  var CtcEmpBasic = document.getElementById("CtcEmpBasic").value=Math.round((((PFGross*50)/100)*100)/100,0); //Basic
  <!-- HRA Con Special -->
  var CtcEmpHRA = document.getElementById("CtcEmpHRA").value=Math.round((((CtcEmpBasic*40)/100)*100)/100,0); //HRA
  var CtcTotBasHraCon = Math.round(CtcEmpBasic+CtcEmpHRA+BonusM+CtcCARm);
  var CtcEmpSpeAllow = document.getElementById("CtcEmpSpeAllow").value=Math.round(CtcMonthlyGross-CtcTotBasHraCon);
 }
 /*************************************************************************/
 /*************************************************************************/
 
 
 //var CtcEmpBasic = document.getElementById("CtcEmpBasic").value=Math.round((((CtcMonthlyGross-(BonusM+CtcCARm))*40)/100),0); 
 
 
if(document.getElementById("ActPFCheck").value=='N' && document.getElementById("ActComPFCheck").value=='N' && document. getElementById("BSActPfCheck").value=='N' && GcomPF==21600)
{ 
  //Again Gratuity
 <!-- Gratuity -->  
 var VMaxGrtuityDay = parseFloat(document.getElementById("MaxGrtuityDay").value); 
 var Cal_OneDayBasic =Math.round((CtcEmpBasic/26)*100)/100;
 var CtcComGratuity = document.getElementById("CtcEmpEstiGratuity").value=Math.round(((Cal_OneDayBasic*VMaxGrtuityDay)*100)/100,0);
}
 
 //HRA Con Special 
 //var CtcEmpHRA = document.getElementById("CtcEmpHRA").value=Math.round(((CtcEmpBasic*40)/100),0);
 //var CtcTotBasHraCon = Math.round(CtcEmpBasic+CtcEmpHRA+BonusM+CtcCARm);
 //var CtcEmpSpeAllow = document.getElementById("CtcEmpSpeAllow").value=Math.round(CtcMonthlyGross-CtcTotBasHraCon);
  
 //LTA
 if(document.getElementById("CheckLTA").checked==true)
 {
  var LTABasicInto_value = parseFloat(document.getElementById("LTABasicInto_value").value); 
  var Extra_MrLtaCea = parseFloat(document.getElementById("Extra_MrLtaCea").value);
  var LTAYear = document.getElementById("CtcEmpLeaveTraAllow").value=Math.round((CtcEmpBasic*LTABasicInto_value),0);
  var LTAMonth = Math.round((LTAYear/12),0);  
 }
 else{ var LTAMonth=0; }
 
 //CEA 
 if(document.getElementById("CheckCEA").checked==true)
 {
  var CEAMonth = parseFloat(document.getElementById("CEA_value").value);
  var CEAYear = document.getElementById("CtcEmpChildEduAllow").value=Math.round(CEAMonth*12); 
  if(document.getElementById("CheckC2").checked==true)
  { var CEAYear = document.getElementById("CtcEmpChildEduAllow").value=Math.round(CEAYear*2); 
    var CEAMonth = Math.round((CEAMonth*2)*100)/100; 
  }
  
 }
 else{ var CEAMonth=0; }
 
 var TotLtaCea=Math.round((LTAMonth+CEAMonth)*100)/100; 
 var VGMS_PAC = parseFloat(document.getElementById("CtcGMS_PAC").value);
 var SpeAllow = document.getElementById("CtcEmpSpeAllow").value=Math.round(CtcEmpSpeAllow-TotLtaCea); 
 var GMS_PAC = document.getElementById("CtcGMS_PAC").value=Math.round(VGMS_PAC-TotLtaCea);
 
 <!-- PF -->
 var VPf_MaxSalPf = parseFloat(document.getElementById("Pf_MaxSalPf").value);
 if(CtcEmpBasic<=VPf_MaxSalPf)
 { var CtcEmpProviFund = document.getElementById("CtcEmpProviFund").value=Math.round((((CtcEmpBasic*12)/100)*100)/100,0); }
 else if(CtcEmpBasic>VPf_MaxSalPf)
 { var CtcEmpProviFund = document.getElementById("CtcEmpProviFund").value=Math.round((((VPf_MaxSalPf*12)/100)*100)/100,0); }
 
 <!-- ESIC -->
 var Esic_DeducRate = parseFloat(document.getElementById("Esic_DeducRate").value);   //0.75
 var Esic_ContriRate = parseFloat(document.getElementById("Esic_ContriRate").value); //3.25
 var Esic_MaxSalEsic = parseFloat(document.getElementById("Esic_MaxSalEsic").value); //max basic for ESIC 8400
 
 if(CtcMonthlyGross<=21000)  //if(CtcEmpBasic<=Esic_MaxSalEsic) 
 {  
   var EmpESCI = document.getElementById("CtcEmpESCI").value=Math.round((((CtcMonthlyGross*Esic_DeducRate)/100)*100)/100,0); 
   
   /*
   function round(n){ n = Math.pow(10,n); return function(num) { return Math.round(num*n)/n; } }
   var round_decimal = round(1); 
   var CESCI = round_decimal((((CtcMonthlyGross*Esic_ContriRate)/100)*100)/100);
   */
   
   var CESCI = (((VGrossSalary*Esic_ContriRate)/100)*100)/100;
   var ComESCI = Math.round(((CESCI*12)*100)/100,0);
   document.getElementById("CtcAnnualESCI").value=ComESCI;
   var Cal_Emp_MPP=document.getElementById("CtcEmpMediPoliPremium").value=0;
   document.getElementById("CtcEmpAddBenifit_MediInsu").value=0;
 }
 else
 { var EmpESCI=0; ComESCI=0; 
   var Cal_Emp_MPP = document.getElementById("CtcEmpMediPoliPremium").value = document.getElementById("Emp_MPP").value;
   document.getElementById("CtcEmpAddBenifit_MediInsu").value=document.getElementById("MCSSP").value;  
 }
   
 <!-- Net Salary --> 
 var VGrossMonSalary_PAC = parseFloat(document.getElementById("CtcGMS_PAC").value);  
 var EmpNetSal = Math.round(((VGrossMonSalary_PAC-(CtcEmpProviFund+EmpESCI))*100)/100,0); 
 document.getElementById("CtcEmpNetMonSalary").value=EmpNetSal;
 
 if(document.getElementById("ActPFCheck").value=='N' && document.getElementById("ActComPFCheck").value=='N' && document.getElementById("BSActPfCheck").value=='N' && GcomPF==21600)
 { 
  var MonthlyGross = document.getElementById("EmpGrossMonSalary").value=Math.round(CtcMonthlyGross);
  GrossSalary(1); 
 }
 
 if(document.getElementById("ActPFCheck").value=='Y'){ CtcEmpComActPf(); } 
 if(document.getElementById("ActComPFCheck").value=='Y'){ CtcEmpComActPf(); } 
 if(document.getElementById("BSActPfCheck").value=='Y'){ CtcEmpBSActPf(); }
 /************************************************************************************** Start /
 /**************************************************************************************/
 /**************************************************************************************/
 
function CtcEmpComActPf()
{ 
  if(document.getElementById("ActComPFCheck").value=='Y' || document.getElementById("ActPFCheck").value=='Y')
  { 
   var bs = parseFloat(document.getElementById("CtcEmpBasic").value); 
   var pf = parseFloat(document.getElementById("CtcEmpProviFund").value);
   var sp = parseFloat(document.getElementById("CtcEmpSpeAllow").value);
   var gross = parseFloat(document.getElementById("CtcEmpGrossMonSalary").value); 
   var pacgross = parseFloat(document.getElementById("CtcGMS_PAC").value);
   var netsal = parseFloat(document.getElementById("CtcEmpNetMonSalary").value);
   var gross_annual = parseFloat(document.getElementById("CtcEmpAnnGrossSalary").value); 
   var ComPfContbAnnual = parseFloat(document.getElementById("CtcEmpEmployerPFContri").value);
   var ctc = parseFloat(document.getElementById("CtcEmpTotalCtc").value);
    
   var Ac_Pf=Math.round((bs*12)/100); //alert(Ac_Pf+">"+pf);
   if(Ac_Pf>pf)
   { 
    document.getElementById("CtcEmpProviFund").value=Ac_Pf;
    var diffpf=Math.round((Ac_Pf-pf)*100)/100;
    var Ac_NetSal=document.getElementById("CtcEmpNetMonSalary").value=Math.round((netsal-diffpf)*100)/100; 
	
	//alert(ComPfContbAnnual+" + ("+diffpf+"*12)");
	
    //var Ac_Employer_PfContb=document.getElementById("CtcEmpEmployerPFContri").value=Math.round((ComPfContbAnnual+(diffpf*12))*100)/100; alert("aa");
    //document.getElementById("CtcEmpTotalCtc").value=Math.round((ctc+(diffpf*12))*100)/100; 
   } 
    
  }
  //else if(document.getElementById("EmpComActPf").checked==false){ document.getElementById("ActComPFCheck").value='N'; }
    
}  


function CtcEmpBSActPf()
{ 
  if(document.getElementById("BSActPfCheck").value=='Y')
  {
    //document.getElementById("BSActPfCheck").value='Y';
   
    var bs = parseFloat(document.getElementById("CtcEmpBasic").value);
	var sp = parseFloat(document.getElementById("CtcEmpSpeAllow").value);
    var pf = parseFloat(document.getElementById("CtcEmpProviFund").value);
    var netsal = parseFloat(document.getElementById("CtcEmpNetMonSalary").value);
    var ComPfContbAnnual = parseFloat(document.getElementById("CtcEmpEmployerPFContri").value);
    var ctc = parseFloat(document.getElementById("CtcEmpTotalCtc").value);
   
    var TotSalBS=Math.round((bs+sp)*100)/100;
	if(TotSalBS<=15000){ var Ac_Pf=Math.round(((bs+sp)*12)/100); }
	else { var Ac_Pf=1800; }
	
    document.getElementById("CtcEmpProviFund").value=Ac_Pf;
    var diffpf=Math.round((Ac_Pf-pf)*100)/100;
    var Ac_NetSal=document.getElementById("CtcEmpNetMonSalary").value=Math.round((netsal-diffpf)*100)/100;
    //var Ac_Employer_PfContb=document.getElementById("CtcEmpEmployerPFContri").value=Math.round((ComPfContbAnnual+(diffpf*12))*100)/100;
    //var Act_ctc = document.getElementById("CtcEmpTotalCtc").value=Math.round((ctc+(diffpf*12))*100)/100;
    
  }
  
     
}  
 
 /************************************************************************************** Close/
 /**************************************************************************************/
 /**************************************************************************************/
 
 
 FunCompaire(); 
 
}
<!-- CtcGrossSalary() CtcGrossSalary() CtcGrossSalary() CtcGrossSalary() Close  -->
<!-- CtcGrossSalary() CtcGrossSalary() CtcGrossSalary() CtcGrossSalary() Close  -->


function FunCompaire()
{
 if(document.getElementById("CtcEmpBasic").value!=document.getElementById("EmpBasic").value)
 { document.getElementById("CtcEmpBasic").style.background='#FFBBFF'; }else{ document.getElementById("CtcEmpBasic").style.background='#FFFFFF'; }
 if(document.getElementById("CtcEmpHRA").value!=document.getElementById("EmpHRA").value)
 { document.getElementById("CtcEmpHRA").style.background='#FFBBFF'; }else{ document.getElementById("CtcEmpHRA").style.background='#FFFFFF'; }
 if(document.getElementById("CtcTA").value!=document.getElementById("TA").value)
 { document.getElementById("CtcTA").style.background='#FFBBFF'; }else{ document.getElementById("CtcTA").style.background='#FFFFFF'; }
        
 if(document.getElementById("CtcCAR_ALL_Value").value!=document.getElementById("CAR_ALL_Value").value)
 { document.getElementById("CtcCAR_ALL_Value").style.background='#FFBBFF'; }else{ document.getElementById("CtcCAR_ALL_Value").style.background='#FFFFFF'; }
 if(document.getElementById("CtcBonus_Month").value!=document.getElementById("Bonus_Month").value)
 { document.getElementById("CtcBonus_Month").style.background='#FFBBFF'; }else{ document.getElementById("CtcBonus_Month").style.background='#FFFFFF'; }
 if(document.getElementById("CtcEmpSpeAllow").value!=document.getElementById("EmpSpeAllow").value)
 { document.getElementById("CtcEmpSpeAllow").style.background='#FFBBFF'; }else{ document.getElementById("CtcEmpSpeAllow").style.background='#FFFFFF'; }
 if(document.getElementById("CtcEmpGrossMonSalary").value!=document.getElementById("EmpGrossMonSalary").value)
 { document.getElementById("CtcEmpGrossMonSalary").style.background='#FFBBFF'; }else{ document.getElementById("CtcEmpGrossMonSalary").style.background='#FFFFFF'; }
 if(document.getElementById("CtcGMS_PAC").value!=document.getElementById("GMS_PAC").value)
 { document.getElementById("CtcGMS_PAC").style.background='#FFBBFF'; }else{ document.getElementById("CtcGMS_PAC").style.background='#FFFFFF'; }
 if(document.getElementById("CtcEmpProviFund").value!=document.getElementById("EmpProviFund").value)
 { document.getElementById("CtcEmpProviFund").style.background='#FFBBFF'; }else{ document.getElementById("CtcEmpProviFund").style.background='#FFFFFF'; }
 if(document.getElementById("CtcEmpESCI").value!=document.getElementById("EmpESCI").value)
 { document.getElementById("CtcEmpESCI").style.background='#FFBBFF'; }else{ document.getElementById("CtcEmpESCI").style.background='#FFFFFF'; }
 if(document.getElementById("CtcEmpNetMonSalary").value!=document.getElementById("EmpNetMonSalary").value)
 { document.getElementById("CtcEmpNetMonSalary").style.background='#FFBBFF'; }else{ document.getElementById("CtcEmpNetMonSalary").style.background='#FFFFFF'; }
 if(document.getElementById("CtcEmpLeaveTraAllow").value!=document.getElementById("EmpLeaveTraAllow").value)
 { document.getElementById("CtcEmpLeaveTraAllow").style.background='#FFBBFF'; }else{ document.getElementById("CtcEmpLeaveTraAllow").style.background='#FFFFFF'; }
 if(document.getElementById("CtcEmpChildEduAllow").value!=document.getElementById("EmpChildEduAllow").value)
 { document.getElementById("CtcEmpChildEduAllow").style.background='#FFBBFF'; }else{ document.getElementById("CtcEmpChildEduAllow").style.background='#FFFFFF'; }
 if(document.getElementById("CtcEmpAnnGrossSalary").value!=document.getElementById("EmpAnnGrossSalary").value)
 { document.getElementById("CtcEmpAnnGrossSalary").style.background='#FFBBFF'; }else{ document.getElementById("CtcEmpAnnGrossSalary").style.background='#FFFFFF'; }
 if(document.getElementById("CtcEmpEstiGratuity").value!=document.getElementById("EmpEstiGratuity").value)
 { document.getElementById("CtcEmpEstiGratuity").style.background='#FFBBFF'; }else{ document.getElementById("CtcEmpEstiGratuity").style.background='#FFFFFF'; }
 if(document.getElementById("CtcEmpEmployerPFContri").value!=document.getElementById("EmpEmployerPFContri").value)
 { document.getElementById("CtcEmpEmployerPFContri").style.background='#FFBBFF'; }else{ document.getElementById("CtcEmpEmployerPFContri").style.background='#FFFFFF'; }
 if(document.getElementById("CtcAnnualESCI").value!=document.getElementById("AnnualESCI").value)
 { document.getElementById("CtcAnnualESCI").style.background='#FFBBFF'; }else{ document.getElementById("CtcAnnualESCI").style.background='#FFFFFF'; }
 if(document.getElementById("CtcEmpMediPoliPremium").value!=document.getElementById("EmpMediPoliPremium").value)
 { document.getElementById("CtcEmpMediPoliPremium").style.background='#FFBBFF'; }else{ document.getElementById("CtcEmpMediPoliPremium").style.background='#FFFFFF'; }
 if(document.getElementById("CtcEmpTotalCtc").value!=document.getElementById("EmpTotalCtc").value)
 { document.getElementById("CtcEmpTotalCtc").style.background='#FFBBFF'; }else{ document.getElementById("CtcEmpTotalCtc").style.background='#FFFFFF'; }
}



function EditCtc()
{
 document.getElementById("EditCtcE").style.display = 'block'; document.getElementById("ChangeCtc").style.display = 'none'; document.getElementById("BasicStipend").disabled = false; document.getElementById("EmpBasic").readOnly = false; document.getElementById("CheckHRA").disabled = false; document.getElementById("EmpBasic").readOnly = false; document.getElementById("EmpGrossMonSalary").readOnly = true; document.getElementById("CheckMPP").disabled = true; document.getElementById("CheckMIC").disabled = false; document.getElementById("CheckLTA").disabled = false; document.getElementById("CheckCEA").disabled = false; document.getElementById("CheckMIC").disabled = false; document.getElementById("CheckCarEnt").disabled = false; document.getElementById("CheckSA").disabled = false; document.getElementById("CheckESCI").disabled = false; document.getElementById("CheckMPP").disabled = false;
 document.getElementById("CheckCarAllow").disabled=false; 
 
 document.getElementById("EmpAddBenifit_MediInsu").value=document.getElementById("EAddBenifit_MI").value;
  
  document.getElementById("CheckTA").disabled = false;
  document.getElementById("EmpBonusExg").readOnly = true; 
  document.getElementById("CheckBonusM").disabled = false;
  document.getElementById("EmpGrossMonSalary").readOnly = false;
   
}

function FunBonusM() 
{if(document.getElementById("CheckBonusM").checked==true){document.getElementById("Bonus_Month").readOnly = false; document.getElementById("CtcBonus_Month").readOnly = false;}
else if(document.getElementById("CheckBonusM").checked==false){document.getElementById("Bonus_Month").readOnly = true; document.getElementById("CtcBonus_Month").readOnly = true;} }


function FunTA() 
{if(document.getElementById("CheckTA").checked==true){document.getElementById("TA").readOnly=false; document.getElementById("CtcTA").readOnly=false;}
else if(document.getElementById("CheckTA").checked==false){document.getElementById("TA").readOnly=true; document.getElementById("CtcTA").readOnly=true;} }


function FunCheckSA()
{ 
if(document.getElementById("CheckSA").checked==true){ document.getElementById("EmpSpeAllow").readOnly=false; document.getElementById("CtcEmpSpeAllow").readOnly=false; } else if(document.getElementById("CheckSA").checked==false){ document.getElementById("EmpSpeAllow").readOnly=true; document.getElementById("CtcEmpSpeAllow").readOnly=true;}
}

function FunCarAllow()
{
if(document.getElementById("CheckCarAllow").checked==true){document.getElementById("CAR_ALL_Value").readOnly=false; document.getElementById("CtcCAR_ALL_Value").readOnly=false;}
else if(document.getElementById("CheckCarAllow").checked==false){document.getElementById("CAR_ALL_Value").readOnly=true; document.getElementById("CtcCAR_ALL_Value").readOnly=true;}
}

function ChangeCarAllow()
{
 var Car_Allow=parseFloat(document.getElementById("CAR_ALL_Value").value);
 var VEmpSpeAllow = parseFloat(document.getElementById("EmpSpeAllow").value); 
 document.getElementById("EmpSpeAllow").value=Math.round((VEmpSpeAllow-Car_Allow)*100)/100;  
}


function SelectHRCalcu(value)
{ 
 var VGrossSalary = parseFloat(document.getElementById("EmpGrossMonSalary").value); 
 var VEmpBasic = parseFloat(document.getElementById("EmpBasic").value);
 var VEmpHRA = parseFloat(document.getElementById("EmpHRA").value); 
 var VEmpConAllow = parseFloat(document.getElementById("EmpConAllow").value);
 var VEmpSpeAllow = parseFloat(document.getElementById("EmpSpeAllow").value); 
 var VConvance = parseFloat(document.getElementById("Convance").value);
 var V_ESA2 = parseFloat(document.getElementById("ESA2").value);
 var CAR_ALL = parseFloat(document.getElementById("CAR_ALL_Value").value);
 var Cal_EmpHRA2 = document.getElementById("EmpHRA").value=Math.round((((VEmpBasic*value)/100)*100)/100,0);
 var Cal_EmpConAllow = document.getElementById("EmpConAllow").value=Math.round((VConvance)*100)/100;
 var Cal_TotBasHraCon = document.getElementById("TotBasHraCon").value=Math.round((VEmpBasic+Cal_EmpHRA2+Cal_EmpConAllow+CAR_ALL)*100)/100;
 var Cal_EmpSpeAllow = document.getElementById("EmpSpeAllow").value=Math.round((VGrossSalary-Cal_TotBasHraCon)*100)/100;
 var Cal_ESA2 = document.getElementById("ESA2").value=Math.round((VGrossSalary-Cal_TotBasHraCon)*100)/100;
}

function HRCalcu(value)
{ 
 var VGrossSalary = parseFloat(document.getElementById("EmpGrossMonSalary").value); 
 var VEmpBasic = parseFloat(document.getElementById("EmpBasic").value);
 var VEmpHRA = parseFloat(document.getElementById("EmpHRA").value); 
 var VEmpConAllow = parseFloat(document.getElementById("EmpConAllow").value);
 var VEmpSpeAllow = parseFloat(document.getElementById("EmpSpeAllow").value); 
 var VConvance = parseFloat(document.getElementById("Convance").value);
 var V_ESA2 = parseFloat(document.getElementById("ESA2").value);
 var CAR_ALL = parseFloat(document.getElementById("CAR_ALL_Value").value);
 var Cal_EmpConAllow = document.getElementById("EmpConAllow").value=Math.round((VConvance)*100)/100;
 var Cal_EmpHRA = document.getElementById("EmpHRA").value=Math.round((VEmpHRA)*100)/100;
 var Cal_TotBasHraCon = document.getElementById("TotBasHraCon").value=Math.round((VEmpBasic+Cal_EmpHRA+Cal_EmpConAllow+CAR_ALL)*100)/100;
 var Cal_EmpSpeAllow = document.getElementById("EmpSpeAllow").value=Math.round((VGrossSalary-Cal_TotBasHraCon)*100)/100;
 var Cal_ESA2 = document.getElementById("ESA2").value=Math.round((VGrossSalary-Cal_TotBasHraCon)*100)/100;
}

function ChangeBasic()
{ 

 var VGrossSalary = parseFloat(document.getElementById("EmpGrossMonSalary").value); 
 var VEmpBasic = parseFloat(document.getElementById("EmpBasic").value);
 var VEmpHRA = parseFloat(document.getElementById("EmpHRA").value); 
 var VEmpConAllow = parseFloat(document.getElementById("EmpConAllow").value);
 var VEmpSpeAllow = parseFloat(document.getElementById("EmpSpeAllow").value); 
 var VEmpProviFund = parseFloat(document.getElementById("EmpProviFund").value);
 var VEmpNetMonSalary = parseFloat(document.getElementById("EmpNetMonSalary").value); 
 var VEmpMediReim = parseFloat(document.getElementById("EmpMediReim").value);
 var VEmpLeaveTraAllow = parseFloat(document.getElementById("EmpLeaveTraAllow").value); 
 var VEmpChildEduAllow = parseFloat(document.getElementById("EmpChildEduAllow").value);
 var VEmpAnnGrossSalary = parseFloat(document.getElementById("EmpAnnGrossSalary").value); 
 var VEmpBonusExg = parseFloat(document.getElementById("EmpBonusExg").value);
 var VEmpEstiGratuity = parseFloat(document.getElementById("EmpEstiGratuity").value); 
 var VEmpEmployerPFContri = parseFloat(document.getElementById("EmpEmployerPFContri").value);
 var VEmpMediPoliPremium = parseFloat(document.getElementById("EmpMediPoliPremium").value); 
 var VEmptotalCtc = parseFloat(document.getElementById("EmpTotalCtc").value);
 var VEmpAddBenifit_MediInsu = parseFloat(document.getElementById("EmpAddBenifit_MediInsu").value); 
 var VEmp_MPP = parseFloat(document.getElementById("Emp_MPP").value);
 var VTotBasHraCon = parseFloat(document.getElementById("TotBasHraCon").value); 
 var VTotAnnualBasic = parseFloat(document.getElementById("TotAnnualBasic").value);
 var VOneDayBasic = parseFloat(document.getElementById("OneDayBasic").value); 
 var VMaxGrtuityDay = parseFloat(document.getElementById("MaxGrtuityDay").value); 
 var VStrBonusContri = parseFloat(document.getElementById("StrBonusContri").value); 
 var VConvance = parseFloat(document.getElementById("Convance").value);
 var VPf_MaxSalPf = parseFloat(document.getElementById("Pf_MaxSalPf").value); 
 var V_ESA2 = parseFloat(document.getElementById("ESA2").value);
 var VB_MaxBonus = parseFloat(document.getElementById("MaxBonus").value);  
 var VGrossMonSalary_PAC = parseFloat(document.getElementById("GrossMonSalary_PAC").value); 
 var Cal_TotAnnualBasic = document.getElementById("TotAnnualBasic").value=Math.round(((VEmpBasic*12)*100)/100,0);
 var Cal_VEmpBasic = parseFloat(document.getElementById("EmpBasic").value); 
 var BonusM = parseFloat(document.getElementById("Bonus_Month").value);
 //if(Cal_VEmpBasic<21000){ var Cal_EmpBonusExg = document.getElementById("EmpBonusExg").value=16800; }
 //else{ var Cal_EmpBonusExg = document.getElementById("EmpBonusExg").value=0; }
 var Cal_EmpBonusExg = document.getElementById("EmpBonusExg").value=0;
 
 /****************************************/
 /****************************************/
  if(Cal_VEmpBasic>21000)
 {
   var BonusM = document.getElementById("Bonus_Month").value=0;
   var ChkHRA=Math.round((((Cal_VEmpBasic*40)/100)*100)/100,0);
   var TotBH=Math.round(((Cal_VEmpBasic+ChkHRA)*100)/100,0);
   var VGrossSalary = parseFloat(document.getElementById("EmpGrossMonSalary").value);
  <!-- HRA Con Special -->
  
  if(TotBH<=VGrossSalary)
  {
   var Cal_EmpHRA = document.getElementById("EmpHRA").value=ChkHRA; //HRA
  }
  else
  {
   var Cal_EmpHRA = document.getElementById("EmpHRA").value=Math.round(((VGrossSalary-Cal_VEmpBasic)*100)/100,0); //HRA
  }
  
  var Cal_EmpConAllow = document.getElementById("EmpConAllow").value=0;
  var CAR_ALL = parseFloat(document.getElementById("CAR_ALL_Value").value);
  var Cal_TotBasHraCon = document.getElementById("TotBasHraCon").value=Math.round((Cal_VEmpBasic+Cal_EmpHRA+Cal_EmpConAllow+CAR_ALL+BonusM)*100)/100; 
  var Cal_EmpSpeAllow = document.getElementById("EmpSpeAllow").value=Math.round((VGrossSalary-Cal_TotBasHraCon)*100)/100;
   
 }
 else
 {
  var Cal_EmpHRA = document.getElementById("EmpHRA").value=Math.round((((Cal_VEmpBasic*40)/100)*100)/100,0);
  var Cal_EmpConAllow = document.getElementById("EmpConAllow").value=Math.round((VConvance)*100)/100;
  var CAR_ALL = parseFloat(document.getElementById("CAR_ALL_Value").value);
  var Cal_TotBasHraCon = document.getElementById("TotBasHraCon").value=Math.round((Cal_VEmpBasic+Cal_EmpHRA+Cal_EmpConAllow+CAR_ALL)*100)/100; 
  var Cal_EmpSpeAllow = document.getElementById("EmpSpeAllow").value=Math.round((VGrossSalary-Cal_TotBasHraCon)*100)/100;
 }
 /****************************************/
 /****************************************/
 

 if(Cal_VEmpBasic<=VPf_MaxSalPf) { var Cal_EmpProviFund = document.getElementById("EmpProviFund").value=Math.round((((Cal_VEmpBasic*12)/100)*100)/100,0); }
 else if(Cal_VEmpBasic>VPf_MaxSalPf) { var Cal_EmpProviFund = document.getElementById("EmpProviFund").value=Math.round((((VPf_MaxSalPf*12)/100)*100)/100,0); } ;

 //var Cal_EmpProviFund = document.getElementById("EmpProviFund").value=Math.round((((Cal_VEmpBasic*12)/100)*100)/100,0);
 
 
 var Cal_ESA2 = document.getElementById("ESA2").value=Math.round((VGrossSalary-Cal_TotBasHraCon)*100)/100;
 var Cal_EmpNetMonSalary = document.getElementById("EmpNetMonSalary").value=Math.round((VGrossMonSalary_PAC-Cal_EmpProviFund)*100)/100;
 var Cal_EmpAnnGrossSalary = document.getElementById("EmpAnnGrossSalary").value=Math.round((VGrossSalary*12)*100)/100; 
 var Cal_EmpEmployerPFContri=document.getElementById("EmpEmployerPFContri").value=Math.round((Cal_EmpProviFund*12)*100)/100;  
 var Cal_OneDayBasic = document.getElementById("OneDayBasic").value=Math.round((Cal_VEmpBasic/26)*100)/100;
 var Cal_EmpEstiGratuity = document.getElementById("EmpEstiGratuity").value=Math.round(((Cal_OneDayBasic*VMaxGrtuityDay)*100)/100,0);
 var Cal_Emp_MPP = document.getElementById("EmpMediPoliPremium").value=Math.round((VEmp_MPP)*100)/100;
 var Cal_EmptotalCtc = document.getElementById("EmpTotalCtc").value=Math.round((Cal_EmpAnnGrossSalary+Cal_EmpBonusExg+Cal_EmpEstiGratuity+Cal_EmpEmployerPFContri+Cal_Emp_MPP)*100)/100;
 var Cal_EmptotalCtc2 = document.getElementById("ETotCtc").value=Math.round((Cal_EmpAnnGrossSalary+Cal_EmpBonusExg+Cal_EmpEstiGratuity+Cal_EmpEmployerPFContri+Cal_Emp_MPP)*100)/100;
 
 if(document.getElementById("ActPFCheck").value=='Y'){ CheckEmpComActPf(); } //CheckEmpActPf();
 if(document.getElementById("ActComPFCheck").value=='Y'){ CheckEmpComActPf(); }
 
 FunCheckESCI();
 
}

function ChangeCA()
{ 
 var VGrossSalary = parseFloat(document.getElementById("EmpGrossMonSalary").value); 
 var VEmpBasic = parseFloat(document.getElementById("EmpBasic").value);
 var VEmpHRA = parseFloat(document.getElementById("EmpHRA").value); 
 var VEmpConAllow = parseFloat(document.getElementById("EmpConAllow").value);
 var VEmpSpeAllow = parseFloat(document.getElementById("EmpSpeAllow").value); 
 var V_ESA2 = parseFloat(document.getElementById("ESA2").value); 
 var CAR_ALL = parseFloat(document.getElementById("CAR_ALL_Value").value);
 var Cal_TotBasHraCon = document.getElementById("TotBasHraCon").value=Math.round((VEmpBasic+VEmpHRA+VEmpConAllow+CAR_ALL)*100)/100;
 var Cal_EmpSpeAllow = document.getElementById("EmpSpeAllow").value=Math.round((VGrossSalary-Cal_TotBasHraCon)*100)/100;
 var Cal_ESA2 = document.getElementById("ESA2").value=Math.round((VGrossSalary-Cal_TotBasHraCon)*100)/100;
 
if(document.getElementById("CheckMR").checked==true)
  {
    var C_MRYear = document.getElementById("EmpMediReim").value
	var VSpeAllow = parseFloat(document.getElementById("EmpSpeAllow").value);
	var V_ESA2 = parseFloat(document.getElementById("ESA2").value);
	var C_MRMonth = Math.round(((C_MRYear/12)*100)/100,0);
	document.getElementById("EmpSpeAllow").value=Math.round((VSpeAllow-C_MRMonth)*100)/100;
	document.getElementById("ESA2").value=Math.round((V_ESA2-C_MRMonth)*100)/100;
  }
  if(document.getElementById("CheckLTA").checked==true)
  {
    var C_LTAYear = document.getElementById("EmpLeaveTraAllow").value;
	var VSpeAllow = parseFloat(document.getElementById("EmpSpeAllow").value);
	var V_ESA2 = parseFloat(document.getElementById("ESA2").value);
	var C_LTAMonth = Math.round(((C_LTAYear/12)*100)/100,0); 
	document.getElementById("EmpSpeAllow").value=Math.round((VSpeAllow-C_LTAMonth)*100)/100;
	document.getElementById("ESA2").value=Math.round((V_ESA2-C_LTAMonth)*100)/100;
  }
  if(document.getElementById("CheckCEA").checked==true)
  {
    var C_CEAYear = document.getElementById("EmpChildEduAllow").value
	var VSpeAllow = parseFloat(document.getElementById("EmpSpeAllow").value);
	var V_ESA2 = parseFloat(document.getElementById("ESA2").value);
	var C_CEAMonth = Math.round(((C_CEAYear/12)*100)/100,0);
	document.getElementById("EmpSpeAllow").value=Math.round((VSpeAllow-C_CEAMonth)*100)/100;
	document.getElementById("ESA2").value=Math.round((V_ESA2-C_CEAMonth)*100)/100; 
  } 
 
}


function ChangeTA()
{ 
var VGrossSalary = parseFloat(document.getElementById("EmpGrossMonSalary").value); var VEmpBasic = parseFloat(document.getElementById("EmpBasic").value); var VEmpHRA = parseFloat(document.getElementById("EmpHRA").value); var VEmpConAllow = parseFloat(document.getElementById("EmpConAllow").value); var VEmpSpeAllow = parseFloat(document.getElementById("EmpSpeAllow").value); var V_ESA2 = parseFloat(document.getElementById("ESA2").value); 
var VTA = parseFloat(document.getElementById("TA").value); 
var Cal_TotBasHraCon = document.getElementById("TotBasHraCon").value=Math.round((VEmpBasic+VEmpHRA+VEmpConAllow+VTA)*100)/100;
var Cal_EmpSpeAllow = document.getElementById("EmpSpeAllow").value=Math.round((VGrossSalary-Cal_TotBasHraCon)*100)/100;
var Cal_ESA2 = document.getElementById("ESA2").value=Math.round((VGrossSalary-Cal_TotBasHraCon)*100)/100;

}


function ChangeMPP()
{ 
 var VEmpAnnGrossSalary = parseFloat(document.getElementById("EmpAnnGrossSalary").value); 
 var VEmpBonusExg = parseFloat(document.getElementById("EmpBonusExg").value);
 var VEmpEstiGratuity = parseFloat(document.getElementById("EmpEstiGratuity").value); 
 var VEmpEmployerPFContri = parseFloat(document.getElementById("EmpEmployerPFContri").value);
 var AnnualESCI=parseFloat(document.getElementById("AnnualESCI").value);
 var VEmpMediPoliPremium = parseFloat(document.getElementById("EmpMediPoliPremium").value); 
 var VEmptotalCtc = parseFloat(document.getElementById("EmpTotalCtc").value);
 var Cal_EmptotalCtc = document.getElementById("EmpTotalCtc").value=Math.round((VEmpAnnGrossSalary+VEmpBonusExg+VEmpEstiGratuity+VEmpEmployerPFContri+VEmpMediPoliPremium+AnnualESCI)*100)/100;
 var Cal_EmptotalCtc2 = document.getElementById("ETotCtc").value=Math.round((VEmpAnnGrossSalary+VEmpBonusExg+VEmpEstiGratuity+VEmpEmployerPFContri+VEmpMediPoliPremium+AnnualESCI)*100)/100;
}

function ChangeMR(value)
{ 
 var VEmpSpeAllow = parseFloat(document.getElementById("EmpSpeAllow").value);  
 var VEmpMediReim = parseFloat(document.getElementById("EmpMediReim").value);
 var VEmpLeaveTraAllow = parseFloat(document.getElementById("EmpLeaveTraAllow").value); 
 var VEmpChildEduAllow = parseFloat(document.getElementById("EmpChildEduAllow").value);
 if(VEmpSpeAllow<VEmpMediReim){ alert("Please check Special Allowance!"); return false; }
 else if(VEmpSpeAllow>=VEmpMediReim){ var TotMrLtaCea=document.getElementById("EmpTotMrLtaCea").value=Math.round((VEmpLeaveTraAllow+VEmpChildEduAllow+VEmpMediReim)*100)/100; var Cal_EmpSpeAllow = document.getElementById("LessSpeAllow").value=Math.round((VEmpSpeAllow-TotMrLtaCea)*100)/100; return true; }
}

function ChangeLTA(value)
{ 
 var VEmpSpeAllow = parseFloat(document.getElementById("EmpSpeAllow").value);  
 var VEmpMediReim = parseFloat(document.getElementById("EmpMediReim").value);
  var VEmpLeaveTraAllow = parseFloat(document.getElementById("EmpLeaveTraAllow").value); 
  var VEmpChildEduAllow = parseFloat(document.getElementById("EmpChildEduAllow").value);
  if(VEmpSpeAllow<VEmpLeaveTraAllow){alert("Please check Special Allowance!"); return false;}
  else if(VEmpSpeAllow>=VEmpLeaveTraAllow) 
  { var TotMrLtaCea=document.getElementById("EmpTotMrLtaCea").value=Math.round((VEmpLeaveTraAllow+VEmpChildEduAllow+VEmpLeaveTraAllow)*100)/100;
    var Cal_EmpSpeAllow = document.getElementById("LessSpeAllow").value=Math.round((VEmpSpeAllow-TotMrLtaCea)*100)/100; return true;}
}

function ChangeCEA(value)
{ 
 var VEmpSpeAllow = parseFloat(document.getElementById("EmpSpeAllow").value);  
 var VEmpMediReim = parseFloat(document.getElementById("EmpMediReim").value);
 var VEmpLeaveTraAllow = parseFloat(document.getElementById("EmpLeaveTraAllow").value); 
 var VEmpChildEduAllow = parseFloat(document.getElementById("EmpChildEduAllow").value);
 if(VEmpSpeAllow<VEmpChildEduAllow){ alert("Please check Special Allowance!"); return false; }
 else if(VEmpSpeAllow>=VEmpChildEduAllow){ var TotMrLtaCea=document.getElementById("EmpTotMrLtaCea").value=Math.round((VEmpLeaveTraAllow+VEmpChildEduAllow+VEmpChildEduAllow)*100)/100; var Cal_EmpSpeAllow = document.getElementById("LessSpeAllow").value=Math.round((VEmpSpeAllow-TotMrLtaCea)*100)/100; return true; }
}

function FunHRA() 
{
 if(document.getElementById("CheckHRA").checked==true){ document.getElementById("EmpHRA").readOnly=false; document.getElementById("HRACalcu").disabled=false; }
 else if(document.getElementById("CheckHRA").checked==false){ document.getElementById("EmpHRA").readOnly=true; document.getElementById("HRACalcu").disabled=true; }
}

function FunCA() 
{
 if(document.getElementById("CheckCA").checked==true){document.getElementById("EmpConAllow").readOnly=false;}
 else if(document.getElementById("CheckCA").checked==false){document.getElementById("EmpConAllow").readOnly=true;}
}

function FunSA() 
{
 if(document.getElementById("CheckSA").checked==true){document.getElementById("EmpSpeAllow").readOnly=false;}
 else if(document.getElementById("CheckSA").checked==false){document.getElementById("EmpSpeAllow").readOnly=true;}
}

function FunMPP()
{
 if(document.getElementById("CheckMPP").checked==true){document.getElementById("EmpMediPoliPremium").readOnly=false;}
 else if(document.getElementById("CheckMPP").checked==false){document.getElementById("EmpMediPoliPremium").readOnly=true;}
}

function FunMIC() 
{ 
 if(document.getElementById("CheckMIC").checked==true){document.getElementById("EmpAddBenifit_MediInsu").readOnly=false;}
 if(document.getElementById("CheckMIC").checked==false){document.getElementById("EmpAddBenifit_MediInsu").readOnly=true;}
}

function FunCarEnt() 
{ 
 if(document.getElementById("CheckCarEnt").checked==true){document.getElementById("Car_Entitlement").readOnly=false;}
 if(document.getElementById("CheckCarEnt").checked==false){document.getElementById("Car_Entitlement").readOnly=true;}
}

function FunCheckESCI()
{ 
 var Esic_DeducRate = parseFloat(document.getElementById("Esic_DeducRate").value);   //0.75
 var Esic_ContriRate = parseFloat(document.getElementById("Esic_ContriRate").value); //3.25
 var Esic_MaxSalEsic = parseFloat(document.getElementById("Esic_MaxSalEsic").value); //max basic for ESIC 8400
 
 var EmpBasic = parseFloat(document.getElementById("EmpBasic").value);
 var VGrossSalary = parseFloat(document.getElementById("EmpGrossMonSalary").value);
 var ESCI = parseFloat(document.getElementById("ESCI").value);
 
 var EmpESCI = document.getElementById("ESCI").value=Math.round((((VGrossSalary*Esic_DeducRate)/100)*100)/100,0); //1.75
 
 /*
 function round(n){ n = Math.pow(10,n); return function(num) { return Math.round(num*n)/n; } }
 var round_decimal = round(1);
 var CESCI = round_decimal((((VGrossSalary*Esic_ContriRate)/100)*100)/100);
 */
 
 var CESCI = (((VGrossSalary*Esic_ContriRate)/100)*100)/100;
 var ComESCI = document.getElementById("ComESCI").value=Math.round(((CESCI*12)*100)/100,0); 
 var ESCI = parseFloat(document.getElementById("ESCI").value); 
 var EmpNetMonSalary=document.getElementById("NetMonSalary").value;
 var NetMSalary=document.getElementById("NetMonSalary").value=EmpNetMonSalary;
 var NetMonSalary=parseFloat(document.getElementById("NetMonSalary").value);
 var ETotCtc=parseFloat(document.getElementById("ETotCtc").value); //alert(ETotCtc);
 var EMediPP=parseFloat(document.getElementById("EMediPP").value);
 var EAddBenifit_MI=parseFloat(document.getElementById("EAddBenifit_MI").value);
 //EmpTotalCtc AnnualESCI EmpMediPoliPremium EMediPP 
 var GMS_PAC=parseFloat(document.getElementById("GMS_PAC").value); 
 var EmpProviFund=parseFloat(document.getElementById("EmpProviFund").value);
  
 //if(document.getElementById("CheckESCI").checked==true) 
 if(VGrossSalary<=21000) //if(EmpBasic<=Esic_MaxSalEsic) 
 { 
  document.getElementById("EmpESCI").value=ESCI; document.getElementById("AnnualESCI").value=ComESCI;
  var EmpESCI=parseFloat(document.getElementById("EmpESCI").value); 
  var AComESCI=parseFloat(document.getElementById("ComESCI").value);	
  var TotDedNet=Math.round((EmpProviFund+EmpESCI)*100)/100; 
  document.getElementById("EmpNetMonSalary").value=Math.round((GMS_PAC-TotDedNet)*100)/100;
  //document.getElementById("EmpNetMonSalary").value=Math.round((EmpNetMonSalary-EmpESCI)*100)/100;
  document.getElementById("EmpMediPoliPremium").value=0;
  document.getElementById("EmpAddBenifit_MediInsu").value=0;
  var Ectc=Math.round((ETotCtc-EMediPP)*100)/100; 
  document.getElementById("EmpTotalCtc").value=Math.round((Ectc+AComESCI)*100)/100;
  document.getElementById("CheckESCI").checked=true;
 }
 //if(document.getElementById("CheckESCI").checked==false)
 if(VGrossSalary>21000) //if(EmpBasic>Esic_MaxSalEsic) 
 { 
  document.getElementById("EmpESCI").value=0; document.getElementById("AnnualESCI").value=0; 
  var EmpESCI=parseFloat(document.getElementById("EmpESCI").value); 
  var AComESCI=parseFloat(document.getElementById("ComESCI").value);
  var TotDedNet=Math.round((EmpProviFund+EmpESCI)*100)/100;
  document.getElementById("EmpNetMonSalary").value=Math.round((GMS_PAC-TotDedNet)*100)/100;
  //document.getElementById("EmpNetMonSalary").value=NetMonSalary;
  document.getElementById("EmpMediPoliPremium").value=EMediPP;
  document.getElementById("EmpAddBenifit_MediInsu").value=EAddBenifit_MI;
  var Ectc=Math.round((ETotCtc-EMediPP)*100)/100;
  document.getElementById("EmpTotalCtc").value=Math.round((Ectc+EMediPP)*100)/100;
 }
 
  var A=parseFloat(document.getElementById("EmpMediPoliPremium").value);
  var B=parseFloat(document.getElementById("AnnualESCI").value); 
  var C=parseFloat(document.getElementById("EmpEmployerPFContri").value); 
  var D=parseFloat(document.getElementById("EmpEstiGratuity").value); 
  var E=parseFloat(document.getElementById("EmpBonusExg").value); 
  var F=parseFloat(document.getElementById("EmpAnnGrossSalary").value);
  document.getElementById("EmpTotalCtc").value=Math.round((A+B+C+D+E+F)*100)/100;
 
}	

function Fun2CheckESCI() 
{       
 if(document.getElementById("CheckESCI").checked==true) 
 { 
  var VGrossSalary = parseFloat(document.getElementById("EmpGrossMonSalary").value);
  var GMS_PAC=parseFloat(document.getElementById("GMS_PAC").value); 
  var EmpProviFund=parseFloat(document.getElementById("EmpProviFund").value);
  var EmpESCI=parseFloat(document.getElementById("EmpESCI").value); 
  var TotDedNet=Math.round((EmpProviFund+EmpESCI)*100)/100; 
  document.getElementById("EmpNetMonSalary").value=Math.round((GMS_PAC-TotDedNet)*100)/100;
 }
}	

function HRSaveCTC(E,P,Y,C,U)
{  
 
 
 var EmpBasic = document.getElementById("CtcEmpBasic").value ;  
 var EmpHRA = document.getElementById("CtcEmpHRA").value;   	 
 var EmpConAllow = 0; 
 var EmpGrossMonSalary = document.getElementById("CtcEmpGrossMonSalary").value; 
 var V_ESA2 = parseFloat(document.getElementById("ESA2").value);
 var V_EmpBasic = parseFloat(document.getElementById("CtcEmpBasic").value); 
 var V_EmpHRA = parseFloat(document.getElementById("CtcEmpHRA").value);
 var V_EmpConAllow = 0;  
 var V_EmpSpeAllow = parseFloat(document.getElementById("CtcEmpSpeAllow").value);  
 var EmpChildEduAllow = document.getElementById("CtcEmpChildEduAllow").value;  
 var EmpLeaveTraAllow = document.getElementById("CtcEmpLeaveTraAllow").value; 
 var EmpMediReim = 0; 
 var Extra_MrLtaCea = parseFloat(document.getElementById("Extra_MrLtaCea").value);  
 if(EmpChildEduAllow>0 || EmpLeaveTraAllow>0 || EmpMediReim>0) 
 { var MinCEA = Math.round((EmpChildEduAllow/12)*100)/100; var MinLTA = Math.round((EmpLeaveTraAllow/12)*100)/100; var MinMR = Math.round((EmpMediReim/12)*100)/100; }else{ var MinCEA = 0; var MinLTA = 0; var MinMR = 0; }
 var MrLtaCeaExtra = document.getElementById("Extra_MrLtaCea").value = Math.round((MinCEA+MinLTA+MinMR)*100)/100;  
 var SumBHCS = Math.round((V_EmpBasic+V_EmpHRA+V_EmpConAllow+V_ESA2)*100)/100; 

 var V_EmpGrossMonSalary = parseFloat(document.getElementById("CtcEmpGrossMonSalary").value);
 var EmpMediPoliPremium = document.getElementById("CtcEmpMediPoliPremium").value; 	  
 var EmpTotalCtc = document.getElementById("CtcEmpTotalCtc").value;  
 var EmpAddBenifit_MediInsu = document.getElementById("CtcEmpAddBenifit_MediInsu").value;
 var BasicStipend = document.getElementById("BasicStipend").value; 
 var EmpSpeAllow = document.getElementById("CtcEmpSpeAllow").value;
 var EmpNetMonSalary = document.getElementById("CtcEmpNetMonSalary").value;
 var EmpBonusExg = document.getElementById("EmpBonusExg").value; 
 var EmpBonusM = document.getElementById("CtcBonus_Month").value; 
 var EmpEstiGratuity = document.getElementById("CtcEmpEstiGratuity").value;
 var EmpAnnGrossSalary = document.getElementById("CtcEmpAnnGrossSalary").value; 
 var EmpProviFund = document.getElementById("CtcEmpProviFund").value;
 var EmpEmployerPFContri = document.getElementById("CtcEmpEmployerPFContri").value; 
 
 var CHDate = document.getElementById("CHDate").value; var GradeName = document.getElementById("GradeName").value; 
 var DesigName = document.getElementById("DesigName").value;
 var DepartmentName = document.getElementById("DepartmentName").value; 
 var GS = document.getElementById("GS").value; var PIS = document.getElementById("PIS").value;
 var PPIS = document.getElementById("PPIS").value; var PCS = document.getElementById("PCS").value; 
 var PINMS = document.getElementById("PINMS").value; var Score = document.getElementById("Score").value;
 var Rating = document.getElementById("Rating").value; var CGrade = document.getElementById("CGradeName").value;
 var CDesig = document.getElementById("CDesigName").value;  var EmpCode = document.getElementById("EmpCode").value;  
 var Ename = document.getElementById("Ename").value; var GMS_PAC = document.getElementById("GMS_PAC").value; 
 var Car_Entitlement = document.getElementById("Car_Entitlement").value;
 var ESCI = document.getElementById("EmpESCI").value; var AnnualESCI = document.getElementById("AnnualESCI").value;
 var Car_Allow=parseFloat(document.getElementById("CAR_ALL_Value").value);
 
 var EmpActPf=document.getElementById("ActPFCheck").value;
 var EmpComActPf=document.getElementById("ActComPFCheck").value; 
 var TA=document.getElementById("TA").value;
 
 /******** Replace value from ctc *******/
 var MCtc=parseFloat(document.getElementById("CtcEmpTotalCtc").value);
 var MGross=parseFloat(document.getElementById("CtcEmpGrossMonSalary").value);
 var CtcProSC = parseFloat(document.getElementById("CtcPCS").value); 
 
 var ActProCtc=document.getElementById("CtcPIS").value=Math.round((MCtc-CtcProSC)*100)/100;
 
 var Ctc = parseFloat(document.getElementById("Ctc").value);
 var Cal_OnePer = Math.round(((Ctc*1)/100)*100)/100;  
 var Cal_MinCtcSV = document.getElementById("Cal_MinCtcSV").value=Math.round((ActProCtc-Ctc)*100)/100;
 var Cal_Per_ProInc = document.getElementById("CtcPPIS").value=Math.round((Cal_MinCtcSV/Cal_OnePer)*100)/100; 
 var CtcProGSPM = parseFloat(document.getElementById("CtcPIS").value); 
 var Cal_TotCtc = document.getElementById("CtcGAS").value=Math.round((CtcProGSPM+CtcProSC)*100)/100; 
 var CtcPer_SC=parseFloat(document.getElementById("CtcPPCS").value);
 var Cal_Per_TotGSPM = document.getElementById("CtcPINMS").value=Math.round((Cal_Per_ProInc+CtcPer_SC)*100)/100; 
 document.getElementById("CtcINMS").value=Math.round((Cal_MinCtcSV+CtcProSC)*100)/100; 
 
 //Gross
 var ActGMS=document.getElementById("GMS").value=MGross;
 var ActGMS=document.getElementById("PIS").value=MGross;
 var OldGSPM = parseFloat(document.getElementById("GS").value);
 var Cal_OnePer1 = Math.round(((OldGSPM*1)/100)*100)/100;   
 var Cal_MinGSV1 = document.getElementById("Cal_MinGSV").value=Math.round((ActGMS-OldGSPM)*100)/100;
 var Cal_Per_ProInc1 = document.getElementById("PPIS").value=Math.round((Cal_MinGSV1/Cal_OnePer1)*100)/100;  
 var Cal_Per_TotGSPM1 = document.getElementById("PINMS").value=Cal_Per_ProInc1;
 var Cal_IncGrossAnnual1 = document.getElementById("GAS").value=Math.round((ActGMS*12)*100)/100;
 var Cal_IncGrossMonthalySalary = document.getElementById("INMS").value=Cal_MinGSV1; 
 /******** Replace value from ctc *******/
 
 
  var PIS = parseFloat(document.getElementById("PIS").value); 
  var PPIS = parseFloat(document.getElementById("PPIS").value); 
  var INMS=document.getElementById("INMS").value;
  var PINMS = parseFloat(document.getElementById("PINMS").value); 
  var GAS=document.getElementById("GAS").value; 
  
  /** Ctc Open ***********/
  var CtcProGSPM = parseFloat(document.getElementById("CtcPIS").value); 
  var CtcPer_ProGSPM = parseFloat(document.getElementById("CtcPPIS").value); 
  var CtcProSC = parseFloat(document.getElementById("CtcPCS").value); 
  var CtcPer_SC=parseFloat(document.getElementById("CtcPPCS").value);
  var CtcIncSalaryPM=parseFloat(document.getElementById("CtcINMS").value); 
  var CtcPer_TotalProGSPM = parseFloat(document.getElementById("CtcPINMS").value); 
  var CtcTotalAnnualSalary=parseFloat(document.getElementById("CtcGAS").value);
  /** Ctc Open ***********/
  
  var Rmk = document.getElementById("Rmkk").value;
 
 var agree=confirm("Are you sure you want to save Employee CTC?"); 
 if(agree)
 { 
  
  var url = 'HRNormalizedInc.php'; var pars = 'BasicStipend='+BasicStipend+'&EmpChildEduAllow='+EmpChildEduAllow+'&EmpLeaveTraAllow='+EmpLeaveTraAllow+'&EmpSpeAllow='+EmpSpeAllow+'&EmpMediReim='+EmpMediReim+'&EmpNetMonSalary='+EmpNetMonSalary+'&EmpBonusExg='+EmpBonusExg+'&EmpEstiGratuity='+EmpEstiGratuity+'&EmpAnnGrossSalary='+EmpAnnGrossSalary+'&EmpProviFund='+EmpProviFund+'&EmpEmployerPFContri='+EmpEmployerPFContri+'&EmpEmployerPFContri='+EmpEmployerPFContri+'&CHDate='+CHDate+'&GradeName='+GradeName+'&DesigName='+DesigName+'&DepartmentName='+DepartmentName+'&GS='+GS+'&PIS='+PIS+'&PPIS='+PPIS+'&PCS='+PCS+'&PINMS='+PINMS+'&Score='+Score+'&Rating='+Rating+'&CDesig='+CDesig+'&CGrade='+CGrade+'&EmpCode='+EmpCode+'&EmpAddBenifit_MediInsu='+EmpAddBenifit_MediInsu+'&EmpTotalCtc='+EmpTotalCtc+'&EmpMediPoliPremium='+EmpMediPoliPremium+'&EmpGrossMonSalary='+EmpGrossMonSalary+'&EmpConAllow='+EmpConAllow+'&EmpHRA='+EmpHRA+'&EmpBasic='+EmpBasic+'&E='+E+'&P='+P+'&Y='+Y+'&C='+C+'&U='+U+'&Ename='+Ename+'&GMS_PAC='+GMS_PAC+'&Car_Entitlement='+Car_Entitlement+'&ESCI='+ESCI+'&AnnualESCI='+AnnualESCI+'&Car_Allow='+Car_Allow+'&EmpActPf='+EmpActPf+'&EmpComActPf='+EmpComActPf+'&TA='+TA+'&EmpBonusM='+EmpBonusM+'&CtcProGSPM='+CtcProGSPM+'&CtcPer_ProGSPM='+CtcPer_ProGSPM+'&CtcProSC='+CtcProSC+'&CtcPer_ProSC='+CtcPer_SC+'&CtcTProGSPM='+CtcTotalAnnualSalary+'&CtcPer_TProGSPM='+CtcPer_TotalProGSPM+'&CtcIncSalaryPM='+CtcIncSalaryPM+'&CtcTAS='+CtcTotalAnnualSalary+'&INMS='+INMS+'&GAS='+GAS+'&CtcProGSPM='+CtcProGSPM+'&CtcPer_ProGSPM='+CtcPer_ProGSPM+'&CtcProSC='+CtcProSC+'&CtcPer_ProSC='+CtcPer_SC+'&CtcTProGSPM='+CtcTotalAnnualSalary+'&CtcPer_TProGSPM='+CtcPer_TotalProGSPM+'&CtcIncSalaryPM='+CtcIncSalaryPM+'&CtcTAS='+CtcTotalAnnualSalary+'&Rmk='+Rmk;
   
  var myAjax = new Ajax.Request(  url, { method: 'post', parameters: pars, onComplete: show_HREmpCtc});
  return true; 
 }else{ return false; }
}
function show_HREmpCtc(originalRequest)
{ document.getElementById("msgCTC").innerHTML = originalRequest.responseText;  } 

function isNumberKey(evt)
{
 var charCode = (evt.which) ? evt.which : event.keyCode
 if (charCode > 31 && (charCode < 48 || charCode > 57))
 //if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57))  /* For floating*/
	return false;

 return true;
}

function FunChkvalMov()
{
 if(document.getElementById("ChkvalMov").checked==true)
 { 
  document.getElementById("CtcEmpBasic").value=document.getElementById("EmpBasic").value; 
  document.getElementById("CtcEmpHRA").value=document.getElementById("EmpHRA").value;
  document.getElementById("CtcTA").value=document.getElementById("TA").value;
  document.getElementById("CtcCAR_ALL_Value").value=document.getElementById("CAR_ALL_Value").value; 
  document.getElementById("CtcBonus_Month").value=document.getElementById("Bonus_Month").value;
  document.getElementById("CtcEmpSpeAllow").value=document.getElementById("EmpSpeAllow").value;
  document.getElementById("CtcEmpGrossMonSalary").value=document.getElementById("EmpGrossMonSalary").value;
  document.getElementById("CtcGMS_PAC").value=document.getElementById("GMS_PAC").value;
  document.getElementById("CtcEmpProviFund").value=document.getElementById("EmpProviFund").value;
  document.getElementById("CtcEmpESCI").value=document.getElementById("EmpESCI").value;
  document.getElementById("CtcEmpNetMonSalary").value=document.getElementById("EmpNetMonSalary").value; 
  document.getElementById("CtcEmpLeaveTraAllow").value=document.getElementById("EmpLeaveTraAllow").value;
  document.getElementById("CtcEmpChildEduAllow").value=document.getElementById("EmpChildEduAllow").value;
  document.getElementById("CtcEmpAnnGrossSalary").value=document.getElementById("EmpAnnGrossSalary").value;
  document.getElementById("CtcEmpEstiGratuity").value=document.getElementById("EmpEstiGratuity").value;
  document.getElementById("CtcEmpEmployerPFContri").value=document.getElementById("EmpEmployerPFContri").value;
  document.getElementById("CtcAnnualESCI").value=document.getElementById("AnnualESCI").value;
  document.getElementById("CtcEmpMediPoliPremium").value=document.getElementById("EmpMediPoliPremium").value;
  document.getElementById("CtcEmpTotalCtc").value=document.getElementById("EmpTotalCtc").value;
  document.getElementById("CtcEmpAddBenifit_MediInsu").value=document.getElementById("EmpAddBenifit_MediInsu").value;
  document.getElementById("CtcCar_Entitlement").value=document.getElementById("Car_Entitlement").value;
  FunCompaire();
  
  if(document.getElementById("EmpGrossMonSalary").value==document.getElementById("CtcEmpGrossMonSalary").value && document.getElementById("EmpTotalCtc").value==document.getElementById("CtcEmpTotalCtc").value)
  {
   document.getElementById("EditCtcE").disabled=false;
  }
 }
 else { document.getElementById("EditCtcE").disabled=true; }
}

</script>


<input type="hidden" id="EppBasic" value="0"/>  
<input type="hidden" id="EppProviFund" value="0"/>  
<input type="hidden" id="EppSpeAllow" value="0"/>  
<input type="hidden" id="EppGrossMonSalary" value="0"/>  
<input type="hidden" id="EppGMS_PAC" value="0"/>  
<input type="hidden" id="EppNetMonSalary" value="0"/>  
<input type="hidden" id="EppEmployerPFContri" value="0"/>  
<input type="hidden" id="EppTotalCtc" value="0"/>
<input type="hidden" id="EppAnnGrossSalary" value="0"/> 

<input type="hidden" name="StrBonus" id="StrBonusContri" value="<?php echo $ResStat['Lumpsum_BonusContribute']; ?>"/>

<?php //echo $ResStat['Lumpsum_MaxBonus']; ?>
<input type="hidden" name="MaxBonus" id="MaxBonus" value="<?php echo 0; ?>"/> 

<input type="hidden" name="StrGrtuity" id="StrGrtuity" value="<?php echo $ResStat['Lumpsum_MaxGratuity']; ?>"/>
<input type="hidden" name="MaxGrtuity" id="MaxGrtuityDay" value="<?php echo $ResStat['Lumpsum_GratuityDay']; ?>"/>
<input type="hidden" name="Emp_MPP" id="Emp_MPP" value="<?php echo $ResStat['MedicalPolicyPremium']; ?>"/>
<input type="hidden" name="Convance" id="Convance" value="<?php echo $ResStat['ConvanceAllow']; ?>"/>
<input type="hidden" name="Pf_MaxSalPf" id="Pf_MaxSalPf" value="<?php echo $ResStat['Pf_MaxSalPf']; ?>"/>
<input type="hidden" name="Esic_DeducRate" id="Esic_DeducRate" value="<?php echo $ResStat['Esic_DeducRate']; ?>"/>
<input type="hidden" name="Esic_ContriRate" id="Esic_ContriRate" value="<?php echo $ResStat['Esic_ContriRate']; ?>"/>
<input type="hidden" name="Esic_MaxSalEsic" id="Esic_MaxSalEsic" value="<?php echo $ResStat['Esic_MaxSalEsic']; ?>"/>

<input type="hidden" name="TotBasHraCon" id="TotBasHraCon"/><input type="hidden" name="TotAnnualBasic" id="TotAnnualBasic"/>
<input type="hidden" name="OneDayBasic" id="OneDayBasic"/><input type="hidden" name="EmpTotMrLtaCea" id="EmpTotMrLtaCea"/>
<input type="hidden" name="LessSpeAllow" id="LessSpeAllow"/><input type="hidden" name="LimitPFbasic" id="LimitPFbasic"/>

<table border="1" width="100%" id="TEmp" cellpadding="1" cellspacing="1">
 <tr>
  <td class="td33" style="width:100%;" colspan="5">&nbsp;<b>[A] Monthly Components</b>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  PF With Adjust<sup>n</sup>&nbsp;:<input type="checkbox" id="EmpActPf" name="EmpActPf" value="" <?php if($ResCtc['EmpActPf']=='Y') echo 'checked'; ?> disabled <?php if($ResP['HR_PmsStatus']!=2){ echo 'disabled'; } ?> onClick="CheckEmpActPf()"/><input type="hidden" id="ActPFCheck" name="ActPFCheck" value="<?php echo $ResCtc['EmpActPf']; ?>" />&nbsp;&nbsp;&nbsp;
	
  PF Without Adjust<sup>n</sup>&nbsp;:<input type="checkbox" id="EmpComActPf" name="EmpComActPf" value="" <?php if($ResCtc['EmpComActPf']=='Y') echo 'checked'; ?> disabled <?php if($ResP['HR_PmsStatus']!=2){ echo 'disabled'; } ?> onClick="CheckEmpComActPf()"/><input type="hidden" id="ActComPFCheck" name="ActComPFCheck" value="<?php echo $ResCtc['EmpComActPf']; ?>" />&nbsp;&nbsp;&nbsp; 
  
  PF With Allow&nbsp;:<input type="checkbox" id="EmpBSActPf" name="EmpBSActPf" value="" <?php if($ResCtc['EmpBSActPf']=='Y') echo 'checked'; ?> disabled onClick="CheckEmpBSActPf()"/><input type="hidden" id="BSActPfCheck" name="BSActPfCheck" value="<?php echo $ResCtc['EmpBSActPf']; ?>" />
  </td>
 </tr>
 <tr>
  <td class="td3" colspan="2" style="width:55%;">&nbsp;</td>
  <td class="td3" style="text-align:center;width:80px;"><b>Prev. CTC</b></td>
  <td class="td3" style="text-align:center;width:80px;"><b>Old Cal<sup>n</sup></b></td>
  <td class="td3" style="text-align:center;width:80px;"><b>New Cal<sup>n</sup></b></td>
 </tr>
 <tr>
  <td class="td3" style="width:5%;">&nbsp;</td>
  <td class="td3" style="width:50%;">&nbsp;<span id="BasSti"><input type="hidden" value="B" name="Basic"/><?php if($ResCtc['BAS']=='Y' AND $ResCtc['BAS_Value']>0) { echo 'Basic'; } elseif($ResCtc['STIPEND']=='Y' AND $ResCtc['STIPEND_Value']>0) { echo 'Stipend'; }?></span> :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <select class="td3" style="width:80px;" name="BasicStipend" id="BasicStipend" onChange="SelectBasSti(this.value)" disabled><option value="B" selected>Basic</option></select>
  
  <?php /*?><option value="S" <?php if($ResCtc['BAS']=='N' AND $ResCtc['STIPEND']=='Y') {echo 'selected';} ?>>Stipend</option><?php */?>
  </td>
  <td class="td3" style="text-align:center;"><input class="td3" style="width:95%;text-align:right;background-color:#92D1BD;" readonly value="<?php if($ResCtc['BAS']=='Y' AND $ResCtc['STIPEND']=='N') { echo $ResCtc['BAS_Value']; } if($ResCtc['BAS']=='N' AND $ResCtc['STIPEND']=='Y') { echo $ResCtc['STIPEND_Value']; }?>" disabled></td>
  <td class="td3" style="text-align:center;"><input class="td3" style="width:95%;text-align:right;" name="EmpBasic" id="EmpBasic" readonly value="<?php if($ResCtc['BAS']=='Y' AND $ResCtc['STIPEND']=='N') { echo $ResCtc['BAS_Value']; } if($ResCtc['BAS']=='N' AND $ResCtc['STIPEND']=='Y') { echo $ResCtc['STIPEND_Value']; }?>" onChange="ChangeBasic()" onKeyUp="ChangeBasic()" onKeyPress="return isNumberKey(event)"></td>
  <td class="td3" style="text-align:center;"><input class="td3" style="width:95%;text-align:right;" name="CtcEmpBasic" id="CtcEmpBasic" readonly value="<?php if($ResCtc['BAS']=='Y' AND $ResCtc['STIPEND']=='N') { echo $ResCtc['BAS_Value']; } if($ResCtc['BAS']=='N' AND $ResCtc['STIPEND']=='Y') { echo $ResCtc['STIPEND_Value']; }?>" onChange="ChangeBasic()" onKeyUp="ChangeBasic()" onKeyPress="return isNumberKey(event)" required></td>
 </tr>
 <tr>
  <td class="td2"><input type="checkbox" name="CheckHRA" id="CheckHRA" onClick="FunHRA()" disabled/></td>
  <td class="td3" id="hraA">&nbsp;HRA :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<select class="td3" style="width:50px;" name="HRACalcu" id="HRACalcu" onChange="SelectHRCalcu(this.value)" disabled><option value="40" selected>40</option><option value="50">50</option></select>%</td>
  
  <td class="td3" id="hraB" style="text-align:center;"><input class="td3" style="width:95%;text-align:right;background-color:#92D1BD;" value="<?php echo $ResCtc['HRA_Value']; ?>" disabled/></td>
  <td class="td3" id="hraB" style="text-align:center;"><input class="td3" style="width:95%;text-align:right;" name="EmpHRA" id="EmpHRA" value="<?php echo $ResCtc['HRA_Value']; ?>" onChange="HRCalcu(this.value)" onKeyUp="HRCalcu(this.value)" readonly onKeyPress="return isNumberKey(event)"/></td>
  <td class="td3" id="hraB" style="text-align:center;"><input class="td3" style="width:95%;text-align:right;" name="CtcEmpHRA" id="CtcEmpHRA" value="<?php echo $ResCtc['HRA_Value']; ?>" onChange="FunCompaire()" onkeyup="FunCompaire()" onKeyPress="return isNumberKey(event)" required/></td>
 </tr>
 
 <?php if($ResCtc['CONV_Value']>0){ ?>
 <tr>
  <td class="td2"><input type="checkbox" name="CheckCA" id="CheckCA" onClick="FunCA()" disabled/></td>
  <td class="td3" id="caA">&nbsp;Conveyance Allowance :</td>
  
  <td class="td3" id="caB" style="text-align:center;"><input class="td3" style="width:95%;text-align:right;background-color:#92D1BD;" value="<?php echo $ResCtc['CONV_Value']; ?>" id="EmpConAllow" disabled/></td>
  <td class="td3" id="caB" style="text-align:center;"><input class="td3" style="width:95%;text-align:right;" name="EmpConAllow" value="<?php echo $ResCtc['CONV_Value']; ?>" id="EmpConAllow" onChange="ChangeCA()" onKeyUp="ChangeCA()"  readonly onKeyPress="return isNumberKey(event)"/></td>
  <td class="td3" id="caB" style="text-align:center;"><input class="td3" style="width:95%;text-align:right;" name="CtcEmpConAllow" value="<?php echo $ResCtc['CONV_Value']; ?>" id="CtcEmpConAllow" onChange="FunCompaire()" onkeyup="FunCompaire()" onKeyPress="return isNumberKey(event)" required/></td>
 </tr>
 <?php }else{ echo '<input type="hidden" name="EmpConAllow" value="0" id="EmpConAllow" readonly/><input type="hidden" name="CtcEmpConAllow" value="0" id="CtcEmpConAllow" readonly/>'; } ?>
 
 <tr>
  <td class="td2"><input type="checkbox" name="CheckTA" id="CheckTA" onClick="FunTA()" disabled/></td>
  <td class="td3" id="caA">&nbsp;Transport Allowance :</td>
  
  <td class="td3" id="caB" style="text-align:center;"><input class="td3" style="width:95%;text-align:right;background-color:#92D1BD;" value="<?php echo $ResCtc['TA_Value']; ?>" class="All_100"  disabled/></td>
  <td class="td3" id="caB" style="text-align:center;"><input class="td3" style="width:95%;text-align:right;" name="TA" id="TA" value="<?php echo $ResCtc['TA_Value']; ?>" onChange="ChangeTA()" onKeyDown="ChangeTA()" onKeyUp="ChangeTA()" class="All_100"  readonly onKeyPress="return isNumberKey(event)"/></td>
  <td class="td3" id="caB" style="text-align:center;"><input class="td3" style="width:95%;text-align:right;" name="CtcTA" id="CtcTA" value="<?php echo $ResCtc['TA_Value']; ?>" onChange="ChangeTA()" onKeyDown="ChangeTA()" onKeyUp="ChangeTA()" class="All_100"  readonly onKeyPress="return isNumberKey(event)" required/></td>
 </tr>
 
 <?php if($ResCtc['CAR_ALL_Value']>0){ ?>
 <tr>
  <td class="td2"><input type="checkbox" name="CheckCarAllow" id="CheckCarAllow" onClick="FunCarAllow()" disabled/></td>
  <td class="td3" id="caA">&nbsp;Car Allowance :</td>
  
  <td class="td3" id="caB" style="text-align:center;"><input class="td3" style="width:95%;text-align:right;background-color:#92D1BD;" value="<?php echo $ResCtc['CAR_ALL_Value']; ?>" disabled/></td>
  <td class="td3" id="caB" style="text-align:center;"><input class="td3" style="width:95%;text-align:right;" name="CAR_ALL_Value" value="<?php echo $ResCtc['CAR_ALL_Value']; ?>" id="CAR_ALL_Value" onChange="ChangeCarAllow()" readonly onKeyPress="return isNumberKey(event)"/></td>
  <td class="td3" id="caB" style="text-align:center;"><input class="td3" style="width:95%;text-align:right;" name="CtcCAR_ALL_Value" value="<?php echo $ResCtc['CAR_ALL_Value']; ?>" id="CtcCAR_ALL_Value" onChange="FunCompaire()" onkeyup="FunCompaire()" onKeyPress="return isNumberKey(event)" required/></td>
 </tr>
 <?php }else{ echo '<input type="hidden" name="CheckCarAllow" id="CheckCarAllow" readonly/><input type="hidden" name="CAR_ALL_Value" value="0" id="CAR_ALL_Value" readonly/><input type="hidden" name="CtcCAR_ALL_Value" value="0" id="CtcCAR_ALL_Value" readonly/>';  } ?>
 
 <tr>
  <td class="td2"><input type="checkbox" name="CheckBonusM" id="CheckBonusM" onClick="FunBonusM()" disabled/></td>
  <td class="td3" id="caA">&nbsp;Bonus :</td>
  
  <td class="td3" id="caB" style="text-align:center;"><input class="td3" style="width:95%;text-align:right;background-color:#92D1BD;" value="<?php echo $ResCtc['Bonus_Month']; ?>" disabled/></td>
  <td class="td3" id="caB" style="text-align:center;"><input class="td3" style="width:95%;text-align:right;" name="Bonus_Month" value="<?php echo $ResCtc['Bonus_Month']; ?>" id="Bonus_Month" onChange="ChangeBonusM()" readonly onKeyPress="return isNumberKey(event)"/></td>
  <td class="td3" id="caB" style="text-align:center;"><input class="td3" style="width:95%;text-align:right;" name="CtcBonus_Month" value="<?php echo $ResCtc['Bonus_Month']; ?>" id="CtcBonus_Month" onChange="FunCompaire()" onkeyup="FunCompaire()" onKeyPress="return isNumberKey(event)" required/></td>
 </tr>
 
 <tr>
  <td class="td2"><input type="checkbox" name="CheckSA" id="CheckSA" onClick="FunCheckSA()" disabled="disabled"/></td>
  <td class="td3" id="saA">&nbsp;Special Allowance :</td>
  
  <td class="td3" id="saB" style="text-align:center;"><input class="td3" style="width:95%;text-align:right;background-color:#92D1BD;" value="<?php echo $ResCtc['SPECIAL_ALL_Value']; ?>" disabled/></td>
  <td class="td3" id="saB" style="text-align:center;"><input name="EmpSpeAllow" class="td3" style="width:95%;text-align:right;" value="<?php echo $ResCtc['SPECIAL_ALL_Value']; ?>" id="EmpSpeAllow" readonly onKeyPress="return isNumberKey(event)"/><input type="hidden" name="ESA2" value="<?php echo $ResCtc['SPECIAL_ALL_Value']; ?>" id="ESA2" class="All_100" readonly/></td>
  <td class="td3" id="saB" style="text-align:center;"><input name="CtcEmpSpeAllow" class="td3" style="width:95%;text-align:right;" value="<?php echo $ResCtc['SPECIAL_ALL_Value']; ?>" id="CtcEmpSpeAllow" onChange="FunCompaire()" onkeyup="FunCompaire()" onKeyPress="return isNumberKey(event)" required/></td>
 </tr>
 <tr>
  <td class="td3">&nbsp;</td><td class="td3">&nbsp;Gross Monthly Salary :</td>
  
  <td class="td3" style="text-align:center;"><input value="<?php echo $ResCtc['Tot_GrossMonth']; ?>" class="td3" style="width:95%;text-align:right;background-color:#92D1BD;" disabled/></td>
  <td class="td3" style="text-align:center;"><input name="EmpGrossMonSalary" value="<?php echo $ResCtc['Tot_GrossMonth']; ?>" id="EmpGrossMonSalary" class="td3" onChange="GrossSalary(1)" onKeyUp="GrossSalary(1)" style="width:95%;text-align:right;" readonly onKeyPress="return isNumberKey(event)"/><input type="hidden" name="GrossMonSalary_PAC" value="<?php if($ResCtc['GrossSalary_PostAnualComponent_Value']>0) { echo $ResCtc['GrossSalary_PostAnualComponent_Value']; } else { echo $ResCtc['Tot_GrossMonth']; } ?>" id="GrossMonSalary_PAC" readonly/></td>
  <td class="td3" style="text-align:center;"><input name="CtcEmpGrossMonSalary" value="<?php echo $ResCtc['Tot_GrossMonth']; ?>" id="CtcEmpGrossMonSalary" class="td3" style="width:95%;text-align:right;" onChange="FunCompaire()" onkeyup="FunCompaire()" onKeyPress="return isNumberKey(event)" required/></td>
 </tr>
 <tr>
  <td class="td3">&nbsp;</td><td class="td3">&nbsp;Gross Monthly Salary (Post Annual Components):</td>
  
  <td class="td3" style="text-align:center;"><input value="<?php if($ResCtc['GrossSalary_PostAnualComponent_Value']>0) { echo $ResCtc['GrossSalary_PostAnualComponent_Value']; } else { echo $ResCtc['Tot_GrossMonth']; } ?>" class="td3" style="width:95%;text-align:right;background-color:#92D1BD;" disabled/></td>
  <td class="td3" style="text-align:center;"><input name="GMS_PAC" value="<?php if($ResCtc['GrossSalary_PostAnualComponent_Value']>0) { echo $ResCtc['GrossSalary_PostAnualComponent_Value']; } else { echo $ResCtc['Tot_GrossMonth']; } ?>" id="GMS_PAC" class="td3" style="width:95%;text-align:right;" readonly onKeyPress="return isNumberKey(event)"/></td>
  <td class="td3" style="text-align:center;"><input name="CtcGMS_PAC" value="<?php if($ResCtc['GrossSalary_PostAnualComponent_Value']>0) { echo $ResCtc['GrossSalary_PostAnualComponent_Value']; } else { echo $ResCtc['Tot_GrossMonth']; } ?>" id="CtcGMS_PAC" class="td3" style="width:95%;text-align:right;" onChange="FunCompaire()" onkeyup="FunCompaire()" onKeyPress="return isNumberKey(event)" required/></td>
 </tr>
 <tr>
  <td class="td2"><input type="checkbox" name="CheckPF" id="CheckPF" checked onClick="CheckPF()" disabled/></td>
  <td class="td3" id="pfA">&nbsp;Provident Fund :</td>
  
  <td class="td3" id="pfB" style="text-align:center;"><input value="<?php echo $ResCtc['PF_Employee_Contri_Value']; ?>" class="td3" style="width:95%;text-align:right;background-color:#92D1BD;" disabled/></td>
  <td class="td3" id="pfB" style="text-align:center;"><input name="EmpProviFund" value="<?php echo $ResCtc['PF_Employee_Contri_Value']; ?>" id="EmpProviFund" class="td3" style="width:95%;text-align:right;" readonly onKeyPress="return isNumberKey(event)"/><input type="hidden" name="Extra_MrLtaCea" value="0" id="Extra_MrLtaCea" readonly/></td>
  <td class="td3" id="pfB" style="text-align:center;"><input name="CtcEmpProviFund" value="<?php echo $ResCtc['PF_Employee_Contri_Value']; ?>" id="CtcEmpProviFund" class="td3" style="width:95%;text-align:right;" onChange="FunCompaire()" onkeyup="FunCompaire()" onKeyPress="return isNumberKey(event)" required/></td>
 </tr>

 <?php /*  ESCI  ESCI  ESCI  ESCI  ESCI  ESCI  ESCI  ESCI  ESCI  ESCI  ESCI  ESCI OPEN */ ?>
 <tr>
  <td class="td2"><input type="checkbox" name="CheckESCI" id="CheckESCI" onClick="FunCheckESCI()" <?php if($ResCtc['ESCI']>0){echo 'checked';} ?> disabled/></td>
  <td class="td3" id="pfA">&nbsp;ESIC :</td>
  
  <td class="td3" id="pfB" style="text-align:center;"><input value="<?php echo $ResCtc['ESCI']; ?>" class="td3" style="width:95%;text-align:right;background-color:#92D1BD;" disabled/></td>
  <td class="td3" id="pfB" style="text-align:center;"><input name="EmpESCI" value="<?php echo $ResCtc['ESCI']; ?>" id="EmpESCI" class="td3" style="width:95%;text-align:right;" onChange="Fun2CheckESCI()" onBlur="Fun2CheckESCI()" readonly onKeyPress="return isNumberKey(event)"/><input type="hidden" name="ESCI" value="0" id="ESCI" readonly/><input type="hidden" name="ComESCI" value="0" id="ComESCI" readonly/></td>
  <td class="td3" id="pfB" style="text-align:center;"><input name="CtcEmpESCI" value="<?php echo $ResCtc['ESCI']; ?>" id="CtcEmpESCI" class="td3" style="width:95%;text-align:right;" onChange="FunCompaire()" onkeyup="FunCompaire()" onKeyPress="return isNumberKey(event)" required/></td>
 </tr>
 <?php /*  ESCI  ESCI  ESCI  ESCI  ESCI  ESCI  ESCI  ESCI  ESCI  ESCI  ESCI  ESCI CLOSE */ ?>

 <tr>
  <td class="td3">&nbsp;</td><td class="td3">&nbsp;Net Monthaly Salary :</td>
  
  <td class="td3" style="text-align:center;"><input value="<?php echo $ResCtc['NetMonthSalary_Value']; ?>" class="td3" style="width:95%;text-align:right;background-color:#92D1BD;font-weight:bold;" disabled/></td>
  <td class="td3" style="text-align:center;"><input value="<?php echo $ResCtc['NetMonthSalary_Value']; ?>" name="EmpNetMonSalary" id="EmpNetMonSalary" class="td3" style="width:95%;text-align:right;background-color:#DCEEF1;font-weight:bold;" readonly/><input type="hidden" value="<?php echo $ResCtc['NetMonthSalary_Value']; ?>" id="NetMonSalary" readonly/></td>
  <td class="td3" style="text-align:center;"><input value="<?php echo $ResCtc['NetMonthSalary_Value']; ?>" name="CtcEmpNetMonSalary" id="CtcEmpNetMonSalary" class="td3" style="width:95%;text-align:right;background-color:#DCEEF1;font-weight:bold;" onChange="FunCompaire()" onkeyup="FunCompaire()" onKeyPress="return isNumberKey(event)" required/></td>
 </tr>
 <tr><td class="td33" colspan="5">&nbsp;<b>[B] Annual Components (Tax saving components which shall be reimbursed on production of documents)</b></td></tr>

<script>
/*
function FunMR() 
{ 
 if(document.getElementById("CheckMR").checked==true)
 { 
  var MR_value = parseFloat(document.getElementById("MR_value").value);  
  var VSpeAllow = parseFloat(document.getElementById("EmpSpeAllow").value);
  var VGrossMonSalary_PAC = parseFloat(document.getElementById("GrossMonSalary_PAC").value); 
  var VGMS_PAC = parseFloat(document.getElementById("GMS_PAC").value);
  var VEmpProviFund = parseFloat(document.getElementById("EmpProviFund").value); 
  var VEmpNetMonSalary = parseFloat(document.getElementById("EmpNetMonSalary").value);
  var Extra_MrLtaCea = parseFloat(document.getElementById("Extra_MrLtaCea").value);
  var VSpeAllow = parseFloat(document.getElementById("EmpSpeAllow").value);
  var C_MRYear = document.getElementById("EmpMediReim").value=Math.round((MR_value*12)*100)/100;
  var C_SpeAllow = document.getElementById("EmpSpeAllow").value=Math.round((VSpeAllow-MR_value)*100)/100; 
  var C_GrossMonSalary_PAC = document.getElementById("GrossMonSalary_PAC").value=Math.round((VGrossMonSalary_PAC-MR_value)*100)/100;
  var C_GMS_PAC = document.getElementById("GMS_PAC").value=Math.round((VGMS_PAC-MR_value)*100)/100;
  var Cal_EmpNetMonSalary = document.getElementById("EmpNetMonSalary").value=Math.round((C_GrossMonSalary_PAC-VEmpProviFund)*100)/100;
  var C_Extra_MrLtaCea = document.getElementById("Extra_MrLtaCea").value=Math.round((Extra_MrLtaCea+MR_value)*100)/100;
 }
 else if(document.getElementById("CheckMR").checked==false)
 { 
  var VSpeAllow = parseFloat(document.getElementById("EmpSpeAllow").value); 
  var MR_value = parseFloat(document.getElementById("MR_value").value);
  var Extra_MrLtaCea = parseFloat(document.getElementById("Extra_MrLtaCea").value);
  var VGrossMonSalary_PAC = parseFloat(document.getElementById("GrossMonSalary_PAC").value); 
  var VGMS_PAC = parseFloat(document.getElementById("GMS_PAC").value);
  var VEmpProviFund = parseFloat(document.getElementById("EmpProviFund").value); 
  var VEmpNetMonSalary = parseFloat(document.getElementById("EmpNetMonSalary").value);
  var C2_SpeAllow = document.getElementById("EmpSpeAllow").value=Math.round((VSpeAllow+MR_value)*100)/100;
  var C2_GrossMonSalary_PAC = document.getElementById("GrossMonSalary_PAC").value=Math.round((VGrossMonSalary_PAC+MR_value)*100)/100;
  var C2_GMS_PAC = document.getElementById("GMS_PAC").value=Math.round((VGMS_PAC+MR_value)*100)/100; 
  var C2_EmpNetMonSalary = document.getElementById("EmpNetMonSalary").value=Math.round((C2_GrossMonSalary_PAC-VEmpProviFund)*100)/100;
  document.getElementById("EmpMediReim").value=0;
  var C_Extra_MrLtaCea = document.getElementById("Extra_MrLtaCea").value=Math.round((Extra_MrLtaCea-MR_value)*100)/100; 
 }
}
*/

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

function FunCEA() 
{ 
 if(document.getElementById("CheckCEA").checked==true)
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
  document.getElementById("CheckC1").checked=true; document.getElementById("CheckC1").disabled=true; 
  document.getElementById("CheckC2").disabled=false; 
  var C_Extra_MrLtaCea = document.getElementById("Extra_MrLtaCea").value=Math.round((Extra_MrLtaCea+CEA_value)*100)/100;
 }
 else if(document.getElementById("CheckCEA").checked==false && document.getElementById("CheckC2").checked==false)
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
  document.getElementById("CheckC2").checked=false; document.getElementById("CheckC1").disabled=true; 
  document.getElementById("CheckC2").disabled=true; 
 }
 else if(document.getElementById("CheckCEA").checked==false && document.getElementById("CheckC2").checked==true)
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
  document.getElementById("CheckC2").checked=false; document.getElementById("CheckC1").disabled=true; 
  document.getElementById("CheckC2").disabled=true; 
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

 <?php /*?><tr>
  <td class="td2"><input type="checkbox" name="CheckMR" id="CheckMR" onClick="FunMR()" disabled <?php if($ResCtc['MED_REM_Value']>0){echo 'checked';} ?> /></td>
  <td class="td3" id="mrA">&nbsp;Medical Reimbursement :</td>
  <td class="td3" id="mrB"><input name="EmpMediReim" value="<?php echo $ResCtc['MED_REM_Value']; ?>" id="EmpMediReim" onChange="return ChangeMR(this.value)" onKeyUp="return ChangeMR(this.value)" class="td3" style="width:50%;text-align:right;" readonly onKeyPress="return isNumberKey(event)"/></td>
 </tr><?php */?>
 <input type="hidden" name="CheckMR" id="CheckMR" <?php if($ResCtc['MED_REM_Value']>0){echo 'checked';} ?> />
 <input type="hidden" name="EmpMediReim" value="<?php echo $ResCtc['MED_REM_Value']; ?>" id="EmpMediReim" readonly/>
 <tr>
  <td class="td2"><input type="checkbox" name="CheckLTA" id="CheckLTA" onClick="FunLTA()" disabled <?php if($ResCtc['LTA_Value']>0){echo 'checked';} ?> /></td>
  <td class="td3" id="ltaA">&nbsp;Leave Travel Allowance :</td>
  
  <td class="td3" id="ltaB" style="text-align:center;"><input value="<?php echo $ResCtc['LTA_Value']; ?>" class="td3" style="width:95%;text-align:right;background-color:#92D1BD;" disabled/></td>
  <td class="td3" id="ltaB" style="text-align:center;"><input name="EmpLeaveTraAllow" value="<?php echo $ResCtc['LTA_Value']; ?>" id="EmpLeaveTraAllow" onChange="return ChangeLTA(this.value)" onKeyUp="return ChangeLTA(this.value)" class="td3" style="width:95%;text-align:right;" readonly onKeyPress="return isNumberKey(event)"/></td>
  <td class="td3" id="ltaB" style="text-align:center;"><input name="CtcEmpLeaveTraAllow" value="<?php echo $ResCtc['LTA_Value']; ?>" id="CtcEmpLeaveTraAllow" class="td3" style="width:95%;text-align:right;" onChange="FunCompaire()" onkeyup="FunCompaire()" onKeyPress="return isNumberKey(event)" required/></td>
 </tr>
 <tr>
  <td class="td2"><input type="checkbox" name="CheckCEA" id="CheckCEA" onClick="FunCEA()" disabled <?php if($ResCtc['CHILD_EDU_ALL_Value']>0){echo 'checked';} ?> /></td>
  <td class="td3" id="ceaA">&nbsp;Children Education Allow. :&nbsp;&nbsp;
   Child1 :<input type="checkbox" name="CheckC1" id="CheckC1" onClick="FunChild1()" disabled <?php if($ResCtc['CHILD_EDU_ALL_Value']==$OneChild OR $ResCtc['CHILD_EDU_ALL_Value']==$TwoChild){echo 'checked';} ?> />&nbsp;
   Child2 :<input type="checkbox" name="CheckC2" id="CheckC2" onClick="FunChild2()" disabled <?php if($ResCtc['CHILD_EDU_ALL_Value']==$TwoChild){echo 'checked';} ?> /></td>
   
  <td class="td3" id="ceaB" style="text-align:center;"><input value="<?php echo $ResCtc['CHILD_EDU_ALL_Value']; ?>" class="td3" style="width:95%;text-align:right;background-color:#92D1BD;" disabled/></td>
  <td class="td3" id="ceaB" style="text-align:center;"><input name="EmpChildEduAllow" value="<?php echo $ResCtc['CHILD_EDU_ALL_Value']; ?>" id="EmpChildEduAllow" onChange="return ChangeCEA(this.value)" onKeyUp="return ChangeCEA(this.value)" class="td3" style="width:95%;text-align:right;" readonly/></td>
  <td class="td3" id="ceaB" style="text-align:center;"><input name="CtcEmpChildEduAllow" value="<?php echo $ResCtc['CHILD_EDU_ALL_Value']; ?>" id="CtcEmpChildEduAllow" onChange="FunCompaire()" onkeyup="FunCompaire()" class="td3" style="width:95%;text-align:right;" onKeyPress="return isNumberKey(event)" required/></td>
 </tr>
 <tr>
  <td class="td3">&nbsp;</td><td class="td3">&nbsp;Annual Gross Salary :</td>
  
  <td class="td3" style="text-align:center;"><input value="<?php echo $ResCtc['Tot_Gross_Annual']; ?>" class="td3" style="width:95%;text-align:right;background-color:#DCEEF1;font-weight:bold;background-color:#92D1BD;" disabled/></td>
  <td class="td3" style="text-align:center;"><input value="<?php echo $ResCtc['Tot_Gross_Annual']; ?>" name="EmpAnnGrossSalary" id="EmpAnnGrossSalary" class="td3" style="width:95%;text-align:right;background-color:#DCEEF1;font-weight:bold;" readonly/></td>
  <td class="td3" style="text-align:center;"><input value="<?php echo $ResCtc['Tot_Gross_Annual']; ?>" name="CtcEmpAnnGrossSalary" id="CtcEmpAnnGrossSalary" class="td3" style="width:95%;text-align:right;background-color:#DCEEF1;font-weight:bold;" onChange="FunCompaire()" onkeyup="FunCompaire()" onKeyPress="return isNumberKey(event)" required/></td>
 </tr>
 <tr><td class="td33" colspan="5">&nbsp;<b>[C] Other Annual Components (Statutory components)</tr>
 
 <?php /*?><tr>
  <td class="td2"><input type="checkbox" name="CheckBonus" id="CheckBonus" checked onClick="CheckBonus()" disabled/></td>
  <td class="td3" id="bonusA">&nbsp;Bonus/Exgretia :</td>
  <td class="td3" id="bonusB"><input name="EmpBonusExg" value="<?php echo $ResCtc['BONUS_Value']; ?>" id="EmpBonusExg" class="td3" style="width:50%;text-align:right;" readonly/></td>
 </tr><?php */?>
 <input type="hidden" name="CheckBonus" id="CheckBonus" checked onClick="CheckBonus()" disabled/>
 <input type="hidden" name="EmpBonusExg" value="<?php echo $ResCtc['BONUS_Value']; ?>" id="EmpBonusExg" readonly/>
 <tr>
  <td class="td2"><input type="checkbox" name="CheckGratuity" id="CheckGratuity" checked onClick="CheckGratuity()" disabled/></td>
  <td class="td3" id="gratuityA">&nbsp;Estimated Gratuity :</td>
  <td class="td3" id="gratuityB" style="text-align:center;"><input value="<?php echo $ResCtc['GRATUITY_Value']; ?>" class="td3" style="width:95%;text-align:right;background-color:#92D1BD;" disabled/></td>
  <td class="td3" id="gratuityB" style="text-align:center;"><input name="EmpEstiGratuity" value="<?php echo $ResCtc['GRATUITY_Value']; ?>" id="EmpEstiGratuity" class="td3" style="width:95%;text-align:right;" readonly/></td>
  <td class="td3" id="gratuityB" style="text-align:center;"><input name="CtcEmpEstiGratuity" value="<?php echo $ResCtc['GRATUITY_Value']; ?>" id="CtcEmpEstiGratuity" class="td3" style="width:95%;text-align:right;" onChange="FunCompaire()" onkeyup="FunCompaire()" onKeyPress="return isNumberKey(event)" required/></td>
 </tr>
 <tr>
  <td class="td2"><input type="checkbox" name="CheckPFContri" id="CheckPFContri" checked onClick="CheckPFContri()" disabled/></td>
  <td class="td3" id="pfcontriA">&nbsp;Employer's PF Contribution :</td>
  <td class="td3" id="pfcontriB" style="text-align:center;"><input value="<?php echo $ResCtc['PF_Employer_Contri_Annul']; ?>" class="td3" style="width:95%;text-align:right;background-color:#92D1BD;" disabled/></td>
  <td class="td3" id="pfcontriB" style="text-align:center;"><input name="EmpEmployerPFContri" value="<?php echo $ResCtc['PF_Employer_Contri_Annul']; ?>" id="EmpEmployerPFContri" class="td3" style="width:95%;text-align:right;" readonly/></td>
  <td class="td3" id="pfcontriB" style="text-align:center;"><input name="CtcEmpEmployerPFContri" value="<?php echo $ResCtc['PF_Employer_Contri_Annul']; ?>" id="CtcEmpEmployerPFContri" class="td3" style="width:95%;text-align:right;" onChange="FunCompaire()" onkeyup="FunCompaire()" onKeyPress="return isNumberKey(event)" required/></td>
 </tr>
 <tr>
  <td class="td3">&nbsp;</td>
  <td class="td3" id="mppA">&nbsp;Employer's ESIC Contribution :</td>
  
  <td class="td3" id="mppB" style="text-align:center;"><input value="<?php echo $ResCtc['AnnualESCI']; ?>" class="td3" style="width:95%;text-align:right;background-color:#92D1BD;" disabled/></td>
  <td class="td3" id="mppB" style="text-align:center;"><input name="AnnualESCI" value="<?php echo $ResCtc['AnnualESCI']; ?>" id="AnnualESCI" class="td3" style="width:95%;text-align:right;" readonly/></td>
  <td class="td3" id="mppB" style="text-align:center;"><input name="CtcAnnualESCI" value="<?php echo $ResCtc['AnnualESCI']; ?>" id="CtcAnnualESCI" class="td3" style="width:95%;text-align:right;" onChange="FunCompaire()" onkeyup="FunCompaire()" onKeyPress="return isNumberKey(event)" required/></td>
 </tr>
 <tr>
  <td class="td2"><input type="checkbox" name="CheckMPP" id="CheckMPP" onClick="FunMPP()" disabled Checked/></td>
  <td class="td3" id="mppA">&nbsp;Mediclaim Policy Premium :</td>
  
  <td class="td3" id="mppB" style="text-align:center;"><input value="<?php echo $ResCtc['Mediclaim_Policy']; ?>" class="td3" style="width:95%;text-align:right;background-color:#92D1BD;" disabled/></td>
  <td class="td3" id="mppB" style="text-align:center;"><input name="EmpMediPoliPremium" id="EmpMediPoliPremium" onChange="ChangeMPP()" onKeyUp="ChangeMPP()" value="<?php echo $ResCtc['Mediclaim_Policy']; ?>" class="td3" style="width:95%;text-align:right;" readonly/><input type="hidden" id="EMediPP" value="<?php echo $ResStat['MedicalPolicyPremium']; ?>" readonly/></td>
  <td class="td3" id="mppB" style="text-align:center;"><input name="CtcEmpMediPoliPremium" id="CtcEmpMediPoliPremium" onChange="ChangeMPP()" onKeyUp="ChangeMPP()" value="<?php echo $ResCtc['Mediclaim_Policy']; ?>" class="td3" style="width:95%;text-align:right;" onChange="FunCompaire()" onkeyup="FunCompaire()" onKeyPress="return isNumberKey(event)" required/></td>
 </tr>
 <tr>
  <td class="td3">&nbsp;</td><td class="td3">&nbsp;Total Cost to Company :</td>
  
  <td class="td3" style="text-align:center;"><input value="<?php echo $ResCtc['Tot_CTC']; ?>" class="td3" style="width:95%;text-align:right;background-color:#92D1BD;font-weight:bold;" disabled/></td>
  <td class="td3" style="text-align:center;"><input id="EmpTotalCtc" name="EmpTotalCtc" value="<?php echo $ResCtc['Tot_CTC']; ?>" class="td3" style="width:95%;text-align:right;background-color:#DCEEF1;font-weight:bold;" readonly/><input type="hidden" id="HideCtc" value="0" /><input type="hidden" value="<?php echo $ResCtc['Tot_CTC']; ?>" id="ETotCtc" readonly onKeyPress="return isNumberKey(event)"/></td>
  <td class="td3" style="text-align:center;"><input id="CtcEmpTotalCtc" name="CtcEmpTotalCtc" value="<?php echo $ResCtc['Tot_CTC']; ?>" class="td3" style="width:95%;text-align:right;background-color:#DCEEF1;font-weight:bold;" readonly onKeyPress="return isNumberKey(event)" required/></td>
 </tr>
 <tr>
  <td class="td3">&nbsp;</td>
  <td class="td33" colspan="5">&nbsp;<b>Additional Benefit</b>
 </tr>
 <tr>
  <td class="td2"><input type="checkbox" name="CheckMIC" id="CheckMIC" onClick="FunMIC()" disabled/></td>
  <td class="td3" id="micA">&nbsp;Mediclaim insurance coverage for Employee, Spouse 2 children :
  <input type="hidden" id="MCS" value="<?php echo $rElig['Mediclaim_Coverage_Slabs']; ?>"/>
  <input type="hidden" id="MCSSP" value="<?php echo $rElig['Mediclaim_Coverage_Slabs']; ?>"/></td>
  
  <td class="td3" id="micB" style="text-align:center;"><input value="<?php echo $ResCtc['EmpAddBenifit_MediInsu_value']; ?>" class="td3" style="width:95%;text-align:right;background-color:#92D1BD;" disabled/></td>
  <td class="td3" id="micB" style="text-align:center;"><input name="EmpAddBenifit_MediInsu" id="EmpAddBenifit_MediInsu" value="<?php echo $ResCtc['EmpAddBenifit_MediInsu_value']; ?>" class="td3" style="width:95%;text-align:right;" readonly/><input type="hidden" id="EAddBenifit_MI" value="<?php echo $rElig['Mediclaim_Coverage_Slabs']; ?>" readonly/></td>
  <td class="td3" id="micB" style="text-align:center;"><input name="CtcEmpAddBenifit_MediInsu" id="CtcEmpAddBenifit_MediInsu" value="<?php echo $ResCtc['EmpAddBenifit_MediInsu_value']; ?>" class="td3" style="width:95%;text-align:right;" required/></td>
 </tr>
 <tr>
  <td class="td2"><input type="checkbox" name="CheckCarEnt" id="CheckCarEnt" onClick="FunCarEnt()" disabled/></td>
  <td class="td3" id="micA">&nbsp;Car entitlement as per car policy :</td>
  
  <td class="td3" id="micB" style="text-align:center;"><input value="<?php echo $ResCtc['Car_Entitlement']; ?>" class="td3" style="width:95%;text-align:right;background-color:#92D1BD;" disabled/></td>
  <td class="td3" id="micB" style="text-align:center;"><input name="Car_Entitlement" id="Car_Entitlement" value="<?php echo $ResCtc['Car_Entitlement']; ?>" class="td3" style="width:95%;text-align:right;" readonly/></td>
  <td class="td3" id="micB" style="text-align:center;"><input name="CtcCar_Entitlement" id="CtcCar_Entitlement" value="<?php echo $ResCtc['Car_Entitlement']; ?>" class="td3" style="width:95%;text-align:right;" required/></td>
 </tr>
 
 <tr>
  <td class="td2"><input type="checkbox" name="CheckCarEnt" id="CheckCarEnt" onClick="FunCarEnt()" disabled/></td>
  <td class="td3" id="micA">&nbsp;Remark :</td>
  
  <td class="td3" id="micB" colspan="3" style="text-align:center;"><input Name="Rmkk" id="Rmkk" style="width:99%;font-family:Times New Roman;font-size:12px;" value="<?php if($ResCtc['Remark']!=''){echo $ResCtc['Remark'];}else{echo 'PMS Activity';}?>"/></td>
 </tr>
 
 
 <tr>  
  <td class="td3" class="fontButton" align="right" colspan="5">
  <table border="0" class="fontButton" style="width:100%;">
   <tr>
	<td class="hl" style="width:60%;text-align:right;font-weight:bold;"><span id="msgCTC">&nbsp;</span></td>
	<td align="right" style="width:90px;">
	<input type="checkbox" id="ChkvalMov" onclick="FunChkvalMov()" /></td>	 
	<td align="right" style="width:120px;">
	<input type="button" name="ChangeCtc" id="ChangeCtc" style="width:90px; display:block;" value="edit" onClick="EditCtc()" <?php if($ResP['HR_PmsStatus']!=2) { echo 'disabled'; } ?>><input type="button" name="EditCtcE" id="EditCtcE" style="width:90px;display:none;" value="save" onClick="return HRSaveCTC(<?php echo $EmpId.', '.$PmsId.', '.$YearId.', '.$ComId.', '.$UId; ?>)" disabled/></td>
   </tr>
  </table>
  </td> 
 </tr>
</table>