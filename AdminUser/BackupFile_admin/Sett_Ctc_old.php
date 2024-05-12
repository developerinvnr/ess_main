<script language="javascript" type="text/javascript">
/*----------------------------------------------Cost to Company------------------------------------------------*/
/*----------------------------------------------Cost to Company------------------------------------------------*/
/*----------------------------------------------Cost to Company------------------------------------------------*/
function EditCtc()
{
 document.getElementById("EditCtcE").style.display = 'block'; document.getElementById("ChangeCtc").style.display = 'none'; document.getElementById("BasicStipend").disabled = false; document.getElementById("EmpBasic").readOnly = false; document.getElementById("CheckHRA").disabled = false; document.getElementById("EmpBasic").readOnly = false; document.getElementById("EmpGrossMonSalary").readOnly = true; document.getElementById("CheckMPP").disabled = true; document.getElementById("CheckMIC").disabled = false; document.getElementById("CheckMR").disabled = false; document.getElementById("CheckLTA").disabled = false; document.getElementById("CheckCEA").disabled = false; document.getElementById("CheckMIC").disabled = false; document.getElementById("CheckCarEnt").disabled = false; document.getElementById("EmpBonusExg").readOnly = false; document.getElementById("CheckSA").disabled = false; document.getElementById("CheckESCI").disabled = false; document.getElementById("CheckMPP").disabled = false;
 document.getElementById("CheckCarAllow").disabled=false; 
 document.getElementById("CheckBonus").disabled = false; document.getElementById("CBns").disabled = false; document.getElementById("CheckTA").disabled = false;
 
 //document.getElementById("CheckCA").disabled = false;
 
}


function FunTA() 
{if(document.getElementById("CheckTA").checked==true){document.getElementById("TA").readOnly=false;}
else if(document.getElementById("CheckTA").checked==false){document.getElementById("TA").readOnly=true;} }


function FunCheckSA()
{ 
if(document.getElementById("CheckSA").checked==true){ document.getElementById("EmpSpeAllow").readOnly=false; } else if(document.getElementById("CheckSA").checked==false){ document.getElementById("EmpSpeAllow").readOnly=true;}
}

function FunCarAllow()
{
if(document.getElementById("CheckCarAllow").checked==true){document.getElementById("CAR_ALL_Value").readOnly=false;}
else if(document.getElementById("CheckCarAllow").checked==false){document.getElementById("CAR_ALL_Value").readOnly=true;}
}

function ChangeCarAllow()
{
 var Car_Allow=parseFloat(document.getElementById("CAR_ALL_Value").value);
 var VEmpSpeAllow = parseFloat(document.getElementById("EmpSpeAllow").value); 
 document.getElementById("EmpSpeAllow").value=Math.round((VEmpSpeAllow-Car_Allow)*100)/100;  
    
 //var Car_Allow=parseFloat(document.getElementById("CAR_ALL_Value").value);
 //var GrossS=parseFloat(document.getElementById("EmpGrossMonSalary").value);
 //document.getElementById("EmpGrossMonSalary").value=Math.round((GrossS+Car_Allow)*100)/100;
 //GrossSalary(); FunCheckESCI(); //FunMR(); FunLTA(); FunCEA(); ClickCBns();
}


function CheckEmpActPf()
{ 
  if(document.getElementById("EmpActPf").checked==true)
  {
  
   document.getElementById("EmpComActPf").checked=false; document.getElementById("ActComPFCheck").value='N';
   document.getElementById("ActPFCheck").value='Y';
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
   
   //var Ac_Pf=Math.round(((bs*12)/100)*100)/100; alert(Ac_Pf);
   var Ac_Pf=Math.round((bs*12)/100); //alert(Ac_Pf);
   if(Ac_Pf>pf)
   {
    document.getElementById("EmpProviFund").value=Ac_Pf;
    var diffpf=Math.round((Ac_Pf-pf)*100)/100;
    var Ac_Sp=document.getElementById("EmpSpeAllow").value=Math.round((sp-diffpf)*100)/100;
    var Ac_Gross=document.getElementById("EmpGrossMonSalary").value=Math.round((gross-diffpf)*100)/100;
    var Ac_pac_Gross=document.getElementById("GMS_PAC").value=Math.round((pacgross-diffpf)*100)/100;
   
    //var Ac_NetSal=document.getElementById("EmpNetMonSalary").value=Math.round((netsal-diffpf)*100)/100; 
    var Ac_NetSal=document.getElementById("EmpNetMonSalary").value=Math.round((netsal-(diffpf*2))*100)/100;
   
    var Ac_Gross_Annual=document.getElementById("EmpAnnGrossSalary").value=Math.round((Ac_Gross*12)*100)/100;
    var Ac_Employer_PfContb=document.getElementById("EmpEmployerPFContri").value=Math.round((ComPfContbAnnual+(diffpf*12))*100)/100;
    //var Ac_ctc=document.getElementById("EmpTotalCtc").value=Math.round((ctc+(diffpf*12))*100)/100;
    document.getElementById("Employer_ExtraPF_Annual").value=Math.round((diffpf*12)*100)/100;
   } 
    
  }
  else if(document.getElementById("EmpActPf").checked==false)
  { 
   document.getElementById("ActPFCheck").value='N';
  }
     
}  


function CheckEmpComActPf()
{ 
  if(document.getElementById("EmpComActPf").checked==true || document.getElementById("EmpActPf").checked==true)
  {
  
   //document.getElementById("EmpActPf").checked=false; document.getElementById("ActPFCheck").value='N';
   //document.getElementById("ActComPFCheck").value='Y';
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
   //document.getElementById("EppTotalCtc").value=ctc;
   
   
   var Ac_Pf=Math.round((bs*12)/100); 
   if(Ac_Pf>pf)
   { 
    document.getElementById("EmpProviFund").value=Ac_Pf;
    var diffpf=Math.round((Ac_Pf-pf)*100)/100;
    //var Ac_Sp=document.getElementById("EmpSpeAllow").value=Math.round((sp-diffpf)*100)/100;
    var Ac_NetSal=document.getElementById("EmpNetMonSalary").value=Math.round((netsal-diffpf)*100)/100; 
    var Ac_Employer_PfContb=document.getElementById("EmpEmployerPFContri").value=Math.round((ComPfContbAnnual+(diffpf*12))*100)/100; 
    document.getElementById("EmpTotalCtc").value=Math.round((ctc+(diffpf*12))*100)/100; 
	document.getElementById("ETotCtc").value=Math.round((ctc+(diffpf*12))*100)/100; 
   } 
    
  }
  else if(document.getElementById("EmpComActPf").checked==false)
  { 
   document.getElementById("ActComPFCheck").value='N';
  }
    
}  


function GrossSalary()
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
 var VPf_MaxSalPf = parseFloat(document.getElementById("Pf_MaxSalPf").value); 
 var VGrossMonSalary_PAC = parseFloat(document.getElementById("GrossMonSalary_PAC").value); 
 var VGMS_PAC = parseFloat(document.getElementById("GMS_PAC").value);
 var VB_MaxBonus = parseFloat(document.getElementById("MaxBonus").value); 
 var VTotBasHraCon = parseFloat(document.getElementById("TotBasHraCon").value); 
 var VTotAnnualBasic = parseFloat(document.getElementById("TotAnnualBasic").value);
 var VOneDayBasic = parseFloat(document.getElementById("OneDayBasic").value);  
 var VMaxGrtuityDay = parseFloat(document.getElementById("MaxGrtuityDay").value); 
 var VStrBonusContri = parseFloat(document.getElementById("StrBonusContri").value); 
 var VConvance = parseFloat(document.getElementById("Convance").value);
 var VEmp_MPP = parseFloat(document.getElementById("Emp_MPP").value); 
 var MCS = parseFloat(document.getElementById("MCS").value);
 var MCSSP = parseFloat(document.getElementById("MCSSP").value); 
 var EmpAddBenifit_MediInsu = parseFloat(document.getElementById("EmpAddBenifit_MediInsu").value);
 var D2=document.getElementById("D2").value; var P2=document.getElementById("P2").value; 
 var DeId=document.getElementById("DeId").value;
 
 var CAR_ALL = parseFloat(document.getElementById("CAR_ALL_Value").value);
if(CAR_ALL>0){ var VGrossForBasic=Math.round((VGrossSalary-CAR_ALL)*100)/100; }
else{ var VGrossForBasic=VGrossSalary; } 
 
 var GS_PAC = document.getElementById("GrossMonSalary_PAC").value=Math.round((VGrossSalary)*100)/100;  
 var GMS_PAC = document.getElementById("GMS_PAC").value=Math.round((VGrossSalary)*100)/100;
 var Cal_EmpBasic = document.getElementById("EmpBasic").value=Math.round((((VGrossForBasic*40)/100)*100)/100,0);
 var Cal_LimitPFbasic = document.getElementById("LimitPFbasic").value=Math.round((((VPf_MaxSalPf*40)/100)*100)/100,0);
 var Cal_EmpHRA = document.getElementById("EmpHRA").value=Math.round((((Cal_EmpBasic*40)/100)*100)/100,0);
 var Cal_EmpConAllow = document.getElementById("EmpConAllow").value=Math.round((VConvance)*100)/100;
 var Cal_TotBasHraCon = document.getElementById("TotBasHraCon").value=Math.round((Cal_EmpBasic+Cal_EmpHRA+Cal_EmpConAllow+CAR_ALL)*100)/100;
 var Cal_EmpSpeAllow = document.getElementById("EmpSpeAllow").value=Math.round((VGrossSalary-Cal_TotBasHraCon)*100)/100;

 if(Cal_EmpBasic<=VPf_MaxSalPf){ var Cal_EmpProviFund = document.getElementById("EmpProviFund").value=Math.round((((Cal_EmpBasic*12)/100)*100)/100,0); }
 else if(Cal_EmpBasic>VPf_MaxSalPf){ var Cal_EmpProviFund = document.getElementById("EmpProviFund").value=Math.round((((VPf_MaxSalPf*12)/100)*100)/100,0); }

 var Cal_EmpNetMonSalary=document.getElementById("EmpNetMonSalary").value=Math.round(((VGrossMonSalary_PAC-Cal_EmpProviFund)*100)/100,0);
 var Cal_EmpAnnGrossSalary=document.getElementById("EmpAnnGrossSalary").value=Math.round((VGrossSalary*12)*100)/100;
 var Cal_EmpEmployerPFContri=document.getElementById("EmpEmployerPFContri").value=Math.round((Cal_EmpProviFund*12)*100)/100;
 var Cal_TotAnnualBasic=document.getElementById("TotAnnualBasic").value=Math.round((Cal_EmpBasic*12)*100)/100;

 var ESCI = parseFloat(document.getElementById("ESCI").value);
 var EmpESCI = document.getElementById("ESCI").value=Math.ceil((((VGrossSalary*0.75)/100)*100)/100,0); //1.75
 
 function round(n){ n = Math.pow(10,n); return function(num) { return Math.round(num*n)/n; } }
 var round_decimal = round(1);
 var CESCI = round_decimal((((VGrossSalary*3.25)/100)*100)/100);
 
 //var CESCI = (((VGrossSalary*3.25)/100)*100)/100; //4.75 //var CESCI = Math.round((((VGrossSalary*4.75)/100)*100)/100); 
 var ComESCI = document.getElementById("ComESCI").value=Math.round(((CESCI*12)*100)/100,0);
 var EmpNetMonSalary = parseFloat(document.getElementById("EmpNetMonSalary").value);
 var NetMonSalary = document.getElementById("NetMonSalary").value=EmpNetMonSalary;
 
 if(Cal_EmpBasic<21000){ var Cal_EmpBonusExg = document.getElementById("EmpBonusExg").value=16800; }
 else{ var Cal_EmpBonusExg = document.getElementById("EmpBonusExg").value=0; }
 
 var Cal_OneDayBasic = document.getElementById("OneDayBasic").value=Math.round((Cal_EmpBasic/26)*100)/100;
 var Cal_EmpEstiGratuity = document.getElementById("EmpEstiGratuity").value=Math.round(((Cal_OneDayBasic*VMaxGrtuityDay)*100)/100,0);

 var Cal_Emp_MPP = document.getElementById("EmpMediPoliPremium").value=Math.round((VEmp_MPP)*100)/100;
 var Cal_EmptotalCtc = document.getElementById("EmpTotalCtc").value=Math.round((Cal_EmpAnnGrossSalary+Cal_EmpBonusExg+Cal_EmpEstiGratuity+Cal_EmpEmployerPFContri+Cal_Emp_MPP)*100)/100;
 var Cal_EmptotalCtc2 = document.getElementById("ETotCtc").value=Math.round((Cal_EmpAnnGrossSalary+Cal_EmpBonusExg+Cal_EmpEstiGratuity+Cal_EmpEmployerPFContri+Cal_Emp_MPP)*100)/100;

 if(D2==DeId || P2==DeId){document.getElementById("EmpAddBenifit_MediInsu").value=Math.round((MCSSP)*100)/100;}
 else if(D2!=DeId && P2!=DeId){document.getElementById("EmpAddBenifit_MediInsu").value=Math.round((MCS)*100)/100;}
 
 
 
 if(document.getElementById("ActPFCheck").value=='Y'){ CheckEmpComActPf(); } //CheckEmpActPf();
 if(document.getElementById("ActComPFCheck").value=='Y'){ CheckEmpComActPf(); }
 
 FunCheckESCI(); 
 
 if(document.getElementById("CheckCEA").checked==true)
 { FunCEA(); 
   if(document.getElementById("CheckC2").checked==true){ FunChild2(); }  
 } 
 if(document.getElementById("CheckLTA").checked==true){ FunLTA(); } 
 
 //ChangeTA();
 
 //CheckC1 CheckC2 CheckCEA FunCEA() FunLTA() CheckLTA
 
 
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
 
 if(Cal_VEmpBasic<21000){ var Cal_EmpBonusExg = document.getElementById("EmpBonusExg").value=16800; }
 else{ var Cal_EmpBonusExg = document.getElementById("EmpBonusExg").value=0; }
 

 if(Cal_VEmpBasic<=VPf_MaxSalPf) { var Cal_EmpProviFund = document.getElementById("EmpProviFund").value=Math.round((((Cal_VEmpBasic*12)/100)*100)/100,0); }
 else if(Cal_VEmpBasic>VPf_MaxSalPf) { var Cal_EmpProviFund = document.getElementById("EmpProviFund").value=Math.round((((VPf_MaxSalPf*12)/100)*100)/100,0); } ;

 var Cal_EmpHRA = document.getElementById("EmpHRA").value=Math.round((((Cal_VEmpBasic*40)/100)*100)/100,0);
 var Cal_EmpConAllow = document.getElementById("EmpConAllow").value=Math.round((VConvance)*100)/100;
 var CAR_ALL = parseFloat(document.getElementById("CAR_ALL_Value").value);
 var Cal_TotBasHraCon = document.getElementById("TotBasHraCon").value=Math.round((Cal_VEmpBasic+Cal_EmpHRA+Cal_EmpConAllow+CAR_ALL)*100)/100; 
 var Cal_EmpSpeAllow = document.getElementById("EmpSpeAllow").value=Math.round((VGrossSalary-Cal_TotBasHraCon)*100)/100;
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
//var VConvance = parseFloat(document.getElementById("Convance").value);
//var Cal_EmpConAllow = document.getElementById("EmpConAllow").value=Math.round((VConvance)*100)/100;
var Cal_TotBasHraCon = document.getElementById("TotBasHraCon").value=Math.round((VEmpBasic+VEmpHRA+VEmpConAllow+VTA)*100)/100;
var Cal_EmpSpeAllow = document.getElementById("EmpSpeAllow").value=Math.round((VGrossSalary-Cal_TotBasHraCon)*100)/100;
var Cal_ESA2 = document.getElementById("ESA2").value=Math.round((VGrossSalary-Cal_TotBasHraCon)*100)/100;

/*
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
    var C_CEAYear = document.getElementById("EmpChildEduAllow").value;
	var VSpeAllow = parseFloat(document.getElementById("EmpSpeAllow").value);
	var V_ESA2 = parseFloat(document.getElementById("ESA2").value);
	var C_CEAMonth = Math.round(((C_CEAYear/12)*100)/100,0);
	document.getElementById("EmpSpeAllow").value=Math.round((VSpeAllow-C_CEAMonth)*100)/100;
	document.getElementById("ESA2").value=Math.round((V_ESA2-C_CEAMonth)*100)/100; 
  } 
*/ 
  
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
 var VGrossSalary = parseFloat(document.getElementById("EmpGrossMonSalary").value);
 var ESCI = parseFloat(document.getElementById("ESCI").value);
 var EmpESCI = document.getElementById("ESCI").value=Math.ceil((((VGrossSalary*0.75)/100)*100)/100,0); //1.75
 
 function round(n){ n = Math.pow(10,n); return function(num) { return Math.round(num*n)/n; } }
 var round_decimal = round(1);
 var CESCI = round_decimal((((VGrossSalary*3.25)/100)*100)/100);
 
 //var CESCI = (((VGrossSalary*3.25)/100)*100)/100; //4.75 //var CESCI = Math.round((((VGrossSalary*4.75)/100)*100)/100);
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
 if(VGrossSalary<=21000) 
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
 if(VGrossSalary>21000) 
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
 var Numfilter=/^[0-9. ]+$/; 
 var EmpBasic = document.getElementById("EmpBasic").value ; var test_num = Numfilter.test(EmpBasic); 
 if(EmpBasic.length === 0){ alert("Please check basic!.");  return false; } 
 if(test_num==false){ alert('Please check basic!'); return false; } 
 var EmpHRA = document.getElementById("EmpHRA").value; var test_num1 = Numfilter.test(EmpHRA); 
 if(EmpHRA.length === 0){ alert("Please check HRA!.");  return false; } 
 if(test_num1==false){ alert('Please check HRA!'); return false; }	 
 var EmpConAllow = document.getElementById("EmpConAllow").value; var test_num2 = Numfilter.test(EmpConAllow);  
 if(EmpConAllow.length === 0){ alert("Please check convance!.");  return false; } 
 if(test_num2==false){ alert('Please check convance!'); return false; }	 
 var EmpGrossMonSalary = document.getElementById("EmpGrossMonSalary").value; 
 var test_num3 = Numfilter.test(EmpGrossMonSalary); 
 if(EmpGrossMonSalary.length === 0){ alert("Please check Gross!.");  return false; } 
 if(test_num3==false) { alert('Please check Gross!'); return false; }	

 var V_ESA2 = parseFloat(document.getElementById("ESA2").value);
 var V_EmpBasic = parseFloat(document.getElementById("EmpBasic").value); 
 var V_EmpHRA = parseFloat(document.getElementById("EmpHRA").value);
 var V_EmpConAllow = parseFloat(document.getElementById("EmpConAllow").value); 
 var V_EmpSpeAllow = parseFloat(document.getElementById("EmpSpeAllow").value);
 if(V_EmpSpeAllow<0){alert("Please check Value of basic,hra,convance, etc"); return false;} 
 var EmpChildEduAllow = document.getElementById("EmpChildEduAllow").value;  
 var EmpLeaveTraAllow = document.getElementById("EmpLeaveTraAllow").value;
 var EmpMediReim = document.getElementById("EmpMediReim").value; 
 var Extra_MrLtaCea = parseFloat(document.getElementById("Extra_MrLtaCea").value);
 if(EmpChildEduAllow>0 || EmpLeaveTraAllow>0 || EmpMediReim>0) 
 { var MinCEA = Math.round((EmpChildEduAllow/12)*100)/100; var MinLTA = Math.round((EmpLeaveTraAllow/12)*100)/100; var MinMR = Math.round((EmpMediReim/12)*100)/100; }else{ var MinCEA = 0; var MinLTA = 0; var MinMR = 0; }
 var MrLtaCeaExtra = document.getElementById("Extra_MrLtaCea").value = Math.round((MinCEA+MinLTA+MinMR)*100)/100;  
 var SumBHCS = Math.round((V_EmpBasic+V_EmpHRA+V_EmpConAllow+V_ESA2)*100)/100; 
 
 var V_EmpGrossMonSalary = parseFloat(document.getElementById("EmpGrossMonSalary").value);
 var EmpMediPoliPremium = document.getElementById("EmpMediPoliPremium").value; var test_num4 = Numfilter.test(EmpMediPoliPremium);
 if(EmpMediPoliPremium.length === 0) { alert("Please check Medical Policy Premium!.");  return false; }
 if(test_num4==false) { alert('Please check Medical Policy Premium!'); return false; }	  
 var EmpTotalCtc = document.getElementById("EmpTotalCtc").value;  var test_num5 = Numfilter.test(EmpTotalCtc);
 if(EmpTotalCtc.length === 0) { alert("Please check enter value!.");  return false; } 
 if(test_num5==false) { alert('Please check enter Value!'); return false; }
 var EmpAddBenifit_MediInsu = document.getElementById("EmpAddBenifit_MediInsu").value; 
 var test_num6 = Numfilter.test(EmpAddBenifit_MediInsu);
 if(EmpAddBenifit_MediInsu.length === 0) { alert("Please check Mediclaim insurance coverage!.");  return false; }
 if(test_num6==false) { alert('Please check Mediclaim insurance coverage!'); return false; }	

 var BasicStipend = document.getElementById("BasicStipend").value; 
 var EmpSpeAllow = document.getElementById("EmpSpeAllow").value;
 var EmpNetMonSalary = document.getElementById("EmpNetMonSalary").value;
 var EmpBonusExg = document.getElementById("EmpBonusExg").value; 
 var EmpEstiGratuity = document.getElementById("EmpEstiGratuity").value;
 var EmpAnnGrossSalary = document.getElementById("EmpAnnGrossSalary").value; 
 var EmpProviFund = document.getElementById("EmpProviFund").value;
 var EmpEmployerPFContri = document.getElementById("EmpEmployerPFContri").value; 
 var EmpEmployerPFContri = document.getElementById("EmpEmployerPFContri").value;
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
 
 var agree=confirm("Are you sure you want to save Employee CTC?"); 
 if(agree)
 { 
  var url = 'HRNormalizedInc.php'; var pars = 'BasicStipend='+BasicStipend+'&EmpChildEduAllow='+EmpChildEduAllow+'&EmpLeaveTraAllow='+EmpLeaveTraAllow+'&EmpSpeAllow='+EmpSpeAllow+'&EmpMediReim='+EmpMediReim+'&EmpNetMonSalary='+EmpNetMonSalary+'&EmpBonusExg='+EmpBonusExg+'&EmpEstiGratuity='+EmpEstiGratuity+'&EmpAnnGrossSalary='+EmpAnnGrossSalary+'&EmpProviFund='+EmpProviFund+'&EmpEmployerPFContri='+EmpEmployerPFContri+'&EmpEmployerPFContri='+EmpEmployerPFContri+'&CHDate='+CHDate+'&GradeName='+GradeName+'&DesigName='+DesigName+'&DepartmentName='+DepartmentName+'&GS='+GS+'&PIS='+PIS+'&PPIS='+PPIS+'&PCS='+PCS+'&PINMS='+PINMS+'&Score='+Score+'&Rating='+Rating+'&CDesig='+CDesig+'&CGrade='+CGrade+'&EmpCode='+EmpCode+'&EmpAddBenifit_MediInsu='+EmpAddBenifit_MediInsu+'&EmpTotalCtc='+EmpTotalCtc+'&EmpMediPoliPremium='+EmpMediPoliPremium+'&EmpGrossMonSalary='+EmpGrossMonSalary+'&EmpConAllow='+EmpConAllow+'&EmpHRA='+EmpHRA+'&EmpBasic='+EmpBasic+'&E='+E+'&P='+P+'&Y='+Y+'&C='+C+'&U='+U+'&Ename='+Ename+'&GMS_PAC='+GMS_PAC+'&Car_Entitlement='+Car_Entitlement+'&ESCI='+ESCI+'&AnnualESCI='+AnnualESCI+'&Car_Allow='+Car_Allow+'&EmpActPf='+EmpActPf+'&EmpComActPf='+EmpComActPf+'&TA='+TA; 
  var myAjax = new Ajax.Request(  url, { method: 'post', parameters: pars, onComplete: show_HREmpCtc});
  return true; 
 }else{ return false; }
}
function show_HREmpCtc(originalRequest)
{ document.getElementById("msgCTC").innerHTML = originalRequest.responseText;  } 
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
<input type="hidden" name="MaxBonus" id="MaxBonus" value="<?php echo $ResStat['Lumpsum_MaxBonus']; ?>"/> 
<input type="hidden" name="StrGrtuity" id="StrGrtuity" value="<?php echo $ResStat['Lumpsum_MaxGratuity']; ?>"/>
<input type="hidden" name="MaxGrtuity" id="MaxGrtuityDay" value="<?php echo $ResStat['Lumpsum_GratuityDay']; ?>"/>
<input type="hidden" name="Emp_MPP" id="Emp_MPP" value="<?php echo $ResStat['MedicalPolicyPremium']; ?>"/>
<input type="hidden" name="Convance" id="Convance" value="<?php echo $ResStat['ConvanceAllow']; ?>"/>
<input type="hidden" name="Pf_MaxSalPf" id="Pf_MaxSalPf" value="<?php echo $ResStat['Pf_MaxSalPf']; ?>"/>
<input type="hidden" name="TotBasHraCon" id="TotBasHraCon"/><input type="hidden" name="TotAnnualBasic" id="TotAnnualBasic"/>
<input type="hidden" name="OneDayBasic" id="OneDayBasic"/><input type="hidden" name="EmpTotMrLtaCea" id="EmpTotMrLtaCea"/>
<input type="hidden" name="LessSpeAllow" id="LessSpeAllow"/><input type="hidden" name="LimitPFbasic" id="LimitPFbasic"/>
<table border="1" width="100%" id="TEmp" cellpadding="1" cellspacing="1">
 <tr>
  <td class="td33" style="width:100%;" colspan="3">&nbsp;<b>[A] Monthly Components</b>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  Actual PF&nbsp;:&nbsp;<input type="checkbox" id="EmpActPf" name="EmpActPf" value="" <?php if($ResCtc['EmpActPf']=='Y') echo 'checked'; ?> disabled <?php if($ResP['HR_PmsStatus']!=2){ echo 'disabled'; } ?> onClick="CheckEmpActPf()"/><input type="hidden" id="ActPFCheck" name="ActPFCheck" value="<?php echo $ResCtc['EmpActPf']; ?>" />&nbsp;&nbsp;&nbsp;
	
  Actual with Company PF&nbsp;:&nbsp;<input type="checkbox" id="EmpComActPf" name="EmpComActPf" value="" <?php if($ResCtc['EmpComActPf']=='Y') echo 'checked'; ?> disabled <?php if($ResP['HR_PmsStatus']!=2){ echo 'disabled'; } ?> onClick="CheckEmpComActPf()"/><input type="hidden" id="ActComPFCheck" name="ActComPFCheck" value="<?php echo $ResCtc['EmpComActPf']; ?>" />
  </td>
 </tr>
 <tr>
  <td class="td3" style="width:5%;">&nbsp;</td>
  <td class="td3" style="width:65%;">&nbsp;<span id="BasSti"><input type="hidden" value="B" name="Basic"/><?php if($ResCtc['BAS']=='Y' AND $ResCtc['BAS_Value']>0) { echo 'Basic'; } elseif($ResCtc['STIPEND']=='Y' AND $ResCtc['STIPEND_Value']>0) { echo 'Stipend'; }?></span> :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <select class="td3" style="width:80px;" name="BasicStipend" id="BasicStipend" onChange="SelectBasSti(this.value)" disabled><option value="B" <?php if($ResCtc['BAS']=='Y' AND $ResCtc['STIPEND']=='N') {echo 'selected';} ?>>Basic</option><option value="S" <?php if($ResCtc['BAS']=='N' AND $ResCtc['STIPEND']=='Y') {echo 'selected';} ?>>Stipend</option></select></td>
  <td class="td3" style="width:30%;">&nbsp;Rs. &nbsp;<input class="td3" style="width:55%; text-align:right;" name="EmpBasic" id="EmpBasic" readonly value="<?php if($ResCtc['BAS']=='Y' AND $ResCtc['STIPEND']=='N') { echo $ResCtc['BAS_Value']; } if($ResCtc['BAS']=='N' AND $ResCtc['STIPEND']=='Y') { echo $ResCtc['STIPEND_Value']; }?>" onChange="ChangeBasic()" onKeyUp="ChangeBasic()"></td>
 </tr>
 <tr>
  <td class="td2"><input type="checkbox" name="CheckHRA" id="CheckHRA" onClick="FunHRA()" disabled/></td>
  <td class="td3" id="hraA">&nbsp;HRA :</td>
  <td class="td3" id="hraB">&nbsp;Rs. &nbsp;<input class="td3" style="width:55%;text-align:right;" name="EmpHRA" id="EmpHRA" value="<?php echo $ResCtc['HRA_Value']; ?>" onChange="HRCalcu(this.value)" onKeyUp="HRCalcu(this.value)" readonly /><select class="td3" style="width:20%;" name="HRACalcu" id="HRACalcu" onChange="SelectHRCalcu(this.value)" disabled><option value="40" selected>40</option><option value="50">50</option></select>%</td>
 </tr>
 
 <?php if($ResCtc['CONV_Value']>0){ ?>
 <tr>
  <td class="td2"><input type="checkbox" name="CheckCA" id="CheckCA" onClick="FunCA()" disabled/></td>
  <td class="td3" id="caA">&nbsp;Conveyance Allowance :</td>
  <td class="td3" id="caB">&nbsp;Rs. &nbsp;<input class="td3" style="width:55%;text-align:right;" name="EmpConAllow" value="<?php echo $ResCtc['CONV_Value']; ?>" id="EmpConAllow" onChange="ChangeCA()" onKeyUp="ChangeCA()"  readonly/></td>
 </tr>
 <?php }else{ echo '<input type="hidden" name="EmpConAllow" value="0" id="EmpConAllow" readonly/>'; } ?>
 
 <tr>
  <td class="td2">&nbsp;<input type="checkbox" name="CheckTA" id="CheckTA" onClick="FunTA()" disabled/></td>
  <td class="td3" id="caA">&nbsp;Transport Allowance :</td>
  <td class="td3" id="caB">&nbsp;Rs. &nbsp;<input class="td3" style="width:55%;text-align:right;" name="TA" id="TA" value="<?php echo $ResCtc['TA_Value']; ?>" onChange="ChangeTA()" onKeyDown="ChangeTA()" onKeyUp="ChangeTA()" class="All_100"  readonly/></td>
 </tr>
 
 <tr>
  <td class="td2"><input type="checkbox" name="CheckCarAllow" id="CheckCarAllow" onClick="FunCarAllow()" disabled/></td>
  <td class="td3" id="caA">&nbsp;Car Allowance :</td>
  <td class="td3" id="caB">&nbsp;Rs. &nbsp;<input class="td3" style="width:55%;text-align:right;" name="CAR_ALL_Value" value="<?php echo $ResCtc['CAR_ALL_Value']; ?>" id="CAR_ALL_Value" onChange="ChangeCarAllow()" readonly/></td>
 </tr>
 <tr>
  <td class="td2"><input type="checkbox" name="CheckSA" id="CheckSA" onClick="FunCheckSA()" disabled="disabled"/></td>
  <td class="td3" id="saA">&nbsp;Special Allowance :</td>
  <td class="td3" id="saB">&nbsp;Rs. &nbsp;<input name="EmpSpeAllow" class="td3" style="width:55%;text-align:right;" value="<?php echo $ResCtc['SPECIAL_ALL_Value']; ?>" id="EmpSpeAllow" readonly/><input type="hidden" name="ESA2" value="<?php echo $ResCtc['SPECIAL_ALL_Value']; ?>" id="ESA2" class="All_100" readonly/></td>
 </tr>
 <tr>
  <td class="td3">&nbsp;</td><td class="td3">&nbsp;Gross Monthly Salary :</td>
  <td class="td3">&nbsp;Rs. &nbsp;<input name="EmpGrossMonSalary" value="<?php echo $ResCtc['Tot_GrossMonth']; ?>" id="EmpGrossMonSalary" class="td3" style="width:55%;text-align:right;" readonly/><input type="hidden" name="GrossMonSalary_PAC" value="<?php if($ResCtc['GrossSalary_PostAnualComponent_Value']>0) { echo $ResCtc['GrossSalary_PostAnualComponent_Value']; } else { echo $ResCtc['Tot_GrossMonth']; } ?>" id="GrossMonSalary_PAC" readonly/></td>
 </tr>
 <tr>
  <td class="td3">&nbsp;</td><td class="td3">&nbsp;Gross Monthly Salary (Post Annual Components):</td>
  <td class="td3">&nbsp;Rs. &nbsp;<input name="GMS_PAC" value="<?php if($ResCtc['GrossSalary_PostAnualComponent_Value']>0) { echo $ResCtc['GrossSalary_PostAnualComponent_Value']; } else { echo $ResCtc['Tot_GrossMonth']; } ?>" id="GMS_PAC" class="td3" style="width:55%;text-align:right;" readonly/></td>
 </tr>
 <tr>
  <td class="td2"><input type="checkbox" name="CheckPF" id="CheckPF" checked onClick="CheckPF()" disabled/></td>
  <td class="td3" id="pfA">&nbsp;Provident Fund :</td>
  <td class="td3" id="pfB">&nbsp;Rs. &nbsp;<input name="EmpProviFund" value="<?php echo $ResCtc['PF_Employee_Contri_Value']; ?>" id="EmpProviFund" class="td3" style="width:55%;text-align:right;" readonly />&nbsp;<?php /*+ */ ?>&nbsp;<input type="hidden" name="Extra_MrLtaCea" value="0" id="Extra_MrLtaCea" readonly/></td>
 </tr>

 <?php /*  ESCI  ESCI  ESCI  ESCI  ESCI  ESCI  ESCI  ESCI  ESCI  ESCI  ESCI  ESCI OPEN */ ?>
 <tr>
  <td class="td2"><input type="checkbox" name="CheckESCI" id="CheckESCI" onClick="FunCheckESCI()" <?php if($ResCtc['ESCI']>0){echo 'checked';} ?> disabled/></td>
  <td class="td3" id="pfA">&nbsp;ESIC :</td>
  <td class="td3" id="pfB">&nbsp;Rs. &nbsp;<input name="EmpESCI" value="<?php echo $ResCtc['ESCI']; ?>" id="EmpESCI" class="td3" style="width:55%;text-align:right;" onChange="Fun2CheckESCI()" onBlur="Fun2CheckESCI()" readonly />&nbsp;<?php /*+ */ ?>&nbsp;<input type="hidden" name="ESCI" value="0" id="ESCI" readonly/><input type="hidden" name="ComESCI" value="0" id="ComESCI" readonly/></td>
 </tr>
 <?php /*  ESCI  ESCI  ESCI  ESCI  ESCI  ESCI  ESCI  ESCI  ESCI  ESCI  ESCI  ESCI CLOSE */ ?>

 <tr>
  <td class="td3">&nbsp;</td><td class="td3">&nbsp;Net Monthaly Salary :</td>
  <td class="td3">&nbsp;Rs. &nbsp;<input value="<?php echo $ResCtc['NetMonthSalary_Value']; ?>" name="EmpNetMonSalary" id="EmpNetMonSalary" class="td3" style="width:55%;text-align:right;background-color:#DCEEF1;font-weight:bold;" readonly/><input type="hidden" value="<?php echo $ResCtc['NetMonthSalary_Value']; ?>" id="NetMonSalary" readonly/></td>
 </tr>
 <tr><td class="td33" colspan="3">&nbsp;<b>[B] Annual Components (Tax saving components which shall be reimbursed on production of documents)</b></td></tr>

<script>
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
 <tr>
  <td class="td2"><input type="checkbox" name="CheckMR" id="CheckMR" onClick="FunMR()" disabled <?php if($ResCtc['MED_REM_Value']>0){echo 'checked';} ?> />
  <input type="hidden" name="MR_value" id="MR_value" value="<?php echo $ResStat['MR_PerMonth']; ?>" />
  <input type="hidden" name="LTA_value" id="LTA_value" value="<?php echo $ResStat['']; ?>" /> 
  <input type="hidden" name="LTABasicInto" id="LTABasicInto_value" value="<?php echo $ResStat['LTA_BasicInto']; ?>" />
  <input type="hidden" name="CEA_value" id="CEA_value" value="<?php echo $ResStat['CEA_PerChildMonth']; ?>"/>
  <?php $OneChild=$ResStat['CEA_PerChildMonth']*12; $TwoChild=$OneChild*2;?></td>
  <td class="td3" id="mrA">&nbsp;Medical Reimbursement :</td>
  <td class="td3" id="mrB">&nbsp;Rs. &nbsp;<input name="EmpMediReim" value="<?php echo $ResCtc['MED_REM_Value']; ?>" id="EmpMediReim" onChange="return ChangeMR(this.value)" onKeyUp="return ChangeMR(this.value)" class="td3" style="width:55%;text-align:right;" readonly/></td>
 </tr>
 <tr>
  <td class="td2"><input type="checkbox" name="CheckLTA" id="CheckLTA" onClick="FunLTA()" disabled <?php if($ResCtc['LTA_Value']>0){echo 'checked';} ?> /></td>
  <td class="td3" id="ltaA">&nbsp;Leave Travel Allowance :</td>
  <td class="td3" id="ltaB">&nbsp;Rs. &nbsp;<input name="EmpLeaveTraAllow" value="<?php echo $ResCtc['LTA_Value']; ?>" id="EmpLeaveTraAllow" onChange="return ChangeLTA(this.value)" onKeyUp="return ChangeLTA(this.value)" class="td3" style="width:55%;text-align:right;" readonly/></td>
 </tr>
 <tr>
  <td class="td2"><input type="checkbox" name="CheckCEA" id="CheckCEA" onClick="FunCEA()" disabled <?php if($ResCtc['CHILD_EDU_ALL_Value']>0){echo 'checked';} ?> /></td>
  <td class="td3" id="ceaA">&nbsp;Children Education Allow. :&nbsp;&nbsp;
   Child1 :<input type="checkbox" name="CheckC1" id="CheckC1" onClick="FunChild1()" disabled <?php if($ResCtc['CHILD_EDU_ALL_Value']==$OneChild OR $ResCtc['CHILD_EDU_ALL_Value']==$TwoChild){echo 'checked';} ?> />&nbsp;
   Child2 :<input type="checkbox" name="CheckC2" id="CheckC2" onClick="FunChild2()" disabled <?php if($ResCtc['CHILD_EDU_ALL_Value']==$TwoChild){echo 'checked';} ?> /></td>
  <td class="td3" id="ceaB">&nbsp;Rs. &nbsp;<input name="EmpChildEduAllow" value="<?php echo $ResCtc['CHILD_EDU_ALL_Value']; ?>" id="EmpChildEduAllow" onChange="return ChangeCEA(this.value)" onKeyUp="return ChangeCEA(this.value)" class="td3" style="width:55%;text-align:right;" readonly/></td>
 </tr>
 <tr>
  <td class="td3">&nbsp;</td><td class="td3">&nbsp;Annual Gross Salary :</td>
  <td class="td3">&nbsp;Rs. &nbsp;<input value="<?php echo $ResCtc['Tot_Gross_Annual']; ?>" name="EmpAnnGrossSalary" id="EmpAnnGrossSalary" class="td3" style="width:55%;text-align:right;background-color:#DCEEF1;font-weight:bold;" /></td>
 </tr>
 <tr><td class="td33" colspan="3">&nbsp;<b>[C] Other Annual Components (Statutory components)</tr>
 <tr>
  <td class="td2"><input type="checkbox" name="CheckBonus" id="CheckBonus" checked onClick="CheckBonus()" disabled/></td>
  <td class="td3" id="bonusA">&nbsp;Bonus/Exgretia :</td>
  <td class="td3" id="bonusB">&nbsp;Rs. &nbsp;<input name="EmpBonusExg" value="<?php echo $ResCtc['BONUS_Value']; ?>" id="EmpBonusExg" class="td3" style="width:55%;text-align:right;" readonly/></td>
 </tr>
 <tr>
  <td class="td2"><input type="checkbox" name="CheckGratuity" id="CheckGratuity" checked onClick="CheckGratuity()" disabled/></td>
  <td class="td3" id="gratuityA">&nbsp;Estimated Gratuity :</td>
  <td class="td3" id="gratuityB">&nbsp;Rs. &nbsp;<input name="EmpEstiGratuity" value="<?php echo $ResCtc['GRATUITY_Value']; ?>" id="EmpEstiGratuity" class="td3" style="width:55%;text-align:right;" readonly/></td>
 </tr>
 <tr>
  <td class="td2"><input type="checkbox" name="CheckPFContri" id="CheckPFContri" checked onClick="CheckPFContri()" disabled/></td>
  <td class="td3" id="pfcontriA">&nbsp;Employer's PF Contribution :</td>
  <td class="td3" id="pfcontriB">&nbsp;Rs. &nbsp;<input name="EmpEmployerPFContri" value="<?php echo $ResCtc['PF_Employer_Contri_Annul']; ?>" id="EmpEmployerPFContri" class="td3" style="width:55%;text-align:right;" readonly/></td>
 </tr>
 <tr>
  <td class="td3">&nbsp;</td>
  <td class="td3" id="mppA">&nbsp;Employer's ESIC Contribution :</td>
  <td class="td3" id="mppB">&nbsp;Rs. &nbsp;<input name="AnnualESCI" value="<?php echo $ResCtc['AnnualESCI']; ?>" id="AnnualESCI" class="td3" style="width:55%;text-align:right;" readonly/></td>
 </tr>
 <tr>
  <td class="td2"><input type="checkbox" name="CheckMPP" id="CheckMPP" onClick="FunMPP()" disabled Checked/></td>
  <td class="td3" id="mppA">&nbsp;Mediclaim Policy Premium :</td>
  <td class="td3" id="mppB">&nbsp;Rs. &nbsp;<input name="EmpMediPoliPremium" id="EmpMediPoliPremium" onChange="ChangeMPP()" onKeyUp="ChangeMPP()" value="<?php echo $ResCtc['Mediclaim_Policy']; ?>" class="td3" style="width:55%;text-align:right;" readonly/><input type="hidden" id="EMediPP" value="<?php echo $ResStat['MedicalPolicyPremium']; ?>" readonly/></td>
 </tr>
 <tr>
  <td class="td3">&nbsp;</td><td class="td3">&nbsp;Total Cost to Company :</td>
  <td class="td3">&nbsp;Rs. &nbsp;<input id="EmpTotalCtc" name="EmpTotalCtc" value="<?php echo $ResCtc['Tot_CTC']; ?>" class="td3" style="width:55%;text-align:right;background-color:#DCEEF1;font-weight:bold;" /><input type="hidden" id="HideCtc" value="0" /><input type="hidden" value="<?php echo $ResCtc['Tot_CTC']; ?>" id="ETotCtc" readonly /></td>
 </tr>
 <tr>
  <td class="td3">&nbsp;</td>
  <td class="td33" colspan="3">&nbsp;<b>Additional Benifit</b>
 </tr>
 <tr>
  <td class="td2"><input type="checkbox" name="CheckMIC" id="CheckMIC" onClick="FunMIC()" disabled/></td>
  <td class="td3" id="micA">&nbsp;Mediclaim insurance coverage for Employee, Spouse 2 children :
  <input type="hidden" id="MCS" value="<?php echo $resDaily['MCS']; ?>"/><input type="hidden" id="MCSSP" value="<?php echo $resDaily['MCSSP']; ?>"/></td>
  <td class="td3" id="micB">&nbsp;Rs. &nbsp;<input name="EmpAddBenifit_MediInsu" id="EmpAddBenifit_MediInsu" value="<?php if($ResCtc['DepartmentId']==4 OR $ResCtc['DepartmentId']==6){echo $resDaily['MCSSP'];}else{echo $resDaily['MCS'];} //echo $ResCtc['EmpAddBenifit_MediInsu_value']; ?>" class="td3" style="width:55%;text-align:right;" readonly/><input type="hidden" id="EAddBenifit_MI" value="<?php echo $ResCtc['EmpAddBenifit_MediInsu_value']; ?>" readonly/></td>
 </tr>
 <tr>
  <td class="td2"><input type="checkbox" name="CheckCarEnt" id="CheckCarEnt" onClick="FunCarEnt()" disabled/></td>
  <td class="td3" id="micA">&nbsp;Car entitlement as per car policy :</td>
  <td class="td3" id="micB">&nbsp;Rs. &nbsp;<input name="Car_Entitlement" id="Car_Entitlement" value="<?php echo $ResCtc['Car_Entitlement']; ?>" class="td3" style="width:55%;text-align:right;" readonly/></td>
 </tr>
 <tr>  
  <td class="td3" class="fontButton" colspan="3">
  <table border="0" align="right" class="fontButton">
   <tr>
	<td class="hl" style="width:100%;text-align:right;font-weight:bold;"><span id="msgCTC">&nbsp;</span></td>	 
	<td align="right" style="width:90px;"><input type="button" name="ChangeCtc" id="ChangeCtc" style="width:90px; display:block;" value="edit" onClick="EditCtc()" <?php if($ResP['HR_PmsStatus']!=2) { echo 'disabled'; } ?>><input type="button" name="EditCtcE" id="EditCtcE" style="width:90px;display:none;" value="save" onClick="return HRSaveCTC(<?php echo $EmpId.', '.$PmsId.', '.$YearId.', '.$ComId.', '.$UId; ?>)" /></td>
   </tr>
  </table>
  </td> 
 </tr>
</table>