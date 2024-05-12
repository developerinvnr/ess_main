// JavaScript Document

function OpenPf()

{

document.getElementById("pf").style.display = 'block'; document.getElementById("esic").style.display = 'none'; document.getElementById("tds").style.display = 'none'; document.getElementById("lumpsum").style.display = 'none'; document.getElementById("taxsaving").style.display = 'none'; document.getElementById("spf").style.display = 'block'; document.getElementById("sesic").style.display = 'none'; document.getElementById("stds").style.display = 'none'; document.getElementById("slumpsum").style.display = 'none'; document.getElementById("staxsaving").style.display = 'none'; document.getElementById("msg").style.display = 'none';

}



function OpenEsic()

{

document.getElementById("pf").style.display = 'none'; document.getElementById("esic").style.display = 'block'; document.getElementById("tds").style.display = 'none'; document.getElementById("lumpsum").style.display = 'none'; document.getElementById("taxsaving").style.display = 'none'; document.getElementById("spf").style.display = 'none'; document.getElementById("sesic").style.display = 'block'; document.getElementById("stds").style.display = 'none'; document.getElementById("slumpsum").style.display = 'none'; document.getElementById("staxsaving").style.display = 'none'; document.getElementById("msg").style.display = 'none';

}

function OpenTds()

{

document.getElementById("pf").style.display = 'none'; document.getElementById("esic").style.display = 'none';document.getElementById("tds").style.display = 'block';document.getElementById("lumpsum").style.display = 'none'; document.getElementById("taxsaving").style.display = 'none'; document.getElementById("spf").style.display = 'none'; document.getElementById("sesic").style.display = 'none'; document.getElementById("stds").style.display = 'block'; document.getElementById("slumpsum").style.display = 'none'; document.getElementById("staxsaving").style.display = 'none'; document.getElementById("msg").style.display = 'none';

}

function OpenLumpsum()

{

document.getElementById("pf").style.display = 'none'; document.getElementById("esic").style.display = 'none'; document.getElementById("tds").style.display = 'none'; document.getElementById("lumpsum").style.display = 'block'; document.getElementById("taxsaving").style.display = 'none'; document.getElementById("spf").style.display = 'none'; document.getElementById("sesic").style.display = 'none'; document.getElementById("stds").style.display = 'none'; document.getElementById("slumpsum").style.display = 'block'; document.getElementById("staxsaving").style.display = 'none'; document.getElementById("msg").style.display = 'none';

}



function OpenTaxSaving()

{

document.getElementById("pf").style.display = 'none'; document.getElementById("esic").style.display = 'none'; document.getElementById("tds").style.display = 'none'; document.getElementById("lumpsum").style.display = 'none'; document.getElementById("taxsaving").style.display = 'block'; document.getElementById("spf").style.display = 'none'; document.getElementById("sesic").style.display = 'none'; document.getElementById("stds").style.display = 'none'; document.getElementById("slumpsum").style.display = 'none'; document.getElementById("staxsaving").style.display = 'block'; document.getElementById("msg").style.display = 'none';

}





function EditPF()

{ 

document.getElementById("ChangePF").style.display="none"; document.getElementById("SavePF").style.display="block";  document.getElementById("Pf_StatusCode").disabled=false;  document.getElementById("Prifix").disabled=false;  document.getElementById("EstacodeNo").disabled=false;  document.getElementById("MaxSalPF").disabled=false;  document.getElementById("MaxSalEPS").disabled=false;  document.getElementById("MaxSalDLI").disabled=false;  document.getElementById("PFDeduct").disabled=false;  document.getElementById("PFContribute").disabled=false;  document.getElementById("EPSContribute").disabled=false;  document.getElementById("EPSContribute").disabled=false;  document.getElementById("EDLIContribute").disabled=false;    document.getElementById("PFAdminCharge").disabled=false;  document.getElementById("EDLIAdminCharge").disabled=false;   document.getElementById("con_for_arrCalcu").disabled=false; 

}



function EditESIC()

{ 

document.getElementById("ChangeESIC").style.display="none"; document.getElementById("SaveESIC").style.display="block";  document.getElementById("EmployerCodeNo").disabled=false;  document.getElementById("MaxSalESIC").disabled=false;  document.getElementById("ESICDeduction").disabled=false;  document.getElementById("ESICContribute").disabled=false; 

}



function EditTDS()
{ 
document.getElementById("ChangeTDS").style.display="none"; document.getElementById("SaveTDS").style.display="block";  document.getElementById("PAN").disabled=false;  document.getElementById("TAN").disabled=false;  document.getElementById("TDSPerson").disabled=false;  document.getElementById("TDSDesignation").disabled=false; document.getElementById("TDSCircle").disabled=false;  document.getElementById("TDSDoSo").disabled=false; document.getElementById("DefaulHRACal").disabled=false; 
document.getElementById("OtherEduCess").disabled=false; document.getElementById("TDSMax80C").disabled=false; document.getElementById("IncHouseProperty").disabled=false;  document.getElementById("PTax").disabled=false;
var TaxRow=document.getElementById("TaxRowNo").value;  document.getElementById("Rebate").disabled=false; document.getElementById("Rebate86").disabled=false; document.getElementById("Rebate89").disabled=false; document.getElementById("Rebate90").disabled=false; document.getElementById("Rebate90A").disabled=false; document.getElementById("Rebate91").disabled=false; document.getElementById("RebateRsIncomeUp").disabled=false; document.getElementById("Surcharge").disabled=false; document.getElementById("SurchargeTaxIncome").disabled=false;
for(var i=1; i<=TaxRow; i++){ document.getElementById("VFrom_"+i).disabled=false; document.getElementById("VTo_"+i).disabled=false; 
                              document.getElementById("TaxV_"+i).disabled=false; document.getElementById("VStatus_"+i).disabled=false; }
var Wo_TaxRow=document.getElementById("Wo_TaxRowNo").value; 
for(var i=1; i<=Wo_TaxRow; i++){ document.getElementById("Wo_VFrom_"+i).disabled=false; document.getElementById("Wo_VTo_"+i).disabled=false; 
                              document.getElementById("Wo_TaxV_"+i).disabled=false; document.getElementById("Wo_VStatus_"+i).disabled=false; }
var A60B80_TaxRow=document.getElementById("A60B80_TaxRowNo").value; 
for(var i=1; i<=A60B80_TaxRow; i++){ document.getElementById("A60B80_VFrom_"+i).disabled=false; document.getElementById("A60B80_VTo_"+i).disabled=false; 
                              document.getElementById("A60B80_TaxV_"+i).disabled=false; document.getElementById("A60B80_VStatus_"+i).disabled=false; }
var A80_TaxRow=document.getElementById("A80_TaxRowNo").value; 
for(var i=1; i<=A80_TaxRow; i++){ document.getElementById("A80_VFrom_"+i).disabled=false; document.getElementById("A80_VTo_"+i).disabled=false; 
                              document.getElementById("A80_TaxV_"+i).disabled=false; document.getElementById("A80_VStatus_"+i).disabled=false; }							  
}




function EditLumpsum()

{ 

document.getElementById("ChangeLumpsum").style.display="none"; document.getElementById("SaveLumpsum").style.display="block";  document.getElementById("MaxBonus").disabled=false;  document.getElementById("BonusContribute").disabled=false;  document.getElementById("BonusMonth").disabled=false;  document.getElementById("MaxGratuity").disabled=false; document.getElementById("GratuityDay").disabled=false; 

}



function EditTaxSaving()

{ 

document.getElementById("ChangeTaxSaving").style.display="none"; document.getElementById("SaveTaxSaving").style.display="block";  document.getElementById("ConAllow").disabled=false;  document.getElementById("MediReim").disabled=false;  document.getElementById("LtaBasicInto").disabled=false;  document.getElementById("ChildEduAllowMonth").disabled=false; document.getElementById("ChildEdu_Maxchild").disabled=false;  document.getElementById("MPP").disabled=false;

}



function a() {  

document.getElementById("pf").style.display = 'block'; document.getElementById("esic").style.display = 'none'; document.getElementById("tds").style.display = 'none'; document.getElementById("lumpsum").style.display = 'none'; document.getElementById("taxsaving").style.display = 'none'; document.getElementById("spf").style.display = 'block'; document.getElementById("sesic").style.display = 'none'; document.getElementById("stds").style.display = 'none'; document.getElementById("slumpsum").style.display = 'none'; document.getElementById("staxsaving").style.display = 'none'; document.getElementById("msg").style.display = 'none'; 

document.getElementById("ChangePF").style.display="block"; document.getElementById("SavePF").style.display="none";  document.getElementById("Pf_StatusCode").disabled=true;  document.getElementById("Prifix").disabled=true;  document.getElementById("EstacodeNo").disabled=true;  document.getElementById("MaxSalPF").disabled=true;  document.getElementById("MaxSalEPS").disabled=true;  document.getElementById("MaxSalDLI").disabled=true;  document.getElementById("PFDeduct").disabled=true;  document.getElementById("PFContribute").disabled=true;  document.getElementById("EPSContribute").disabled=true;  document.getElementById("EPSContribute").disabled=true;  document.getElementById("EDLIContribute").disabled=true;    document.getElementById("PFAdminCharge").disabled=true;  document.getElementById("EDLIAdminCharge").disabled=true;   document.getElementById("con_for_arrCalcu").disabled=true; }



function b() { 

document.getElementById("pf").style.display = 'none'; document.getElementById("esic").style.display = 'block'; document.getElementById("tds").style.display = 'none'; document.getElementById("lumpsum").style.display = 'none'; document.getElementById("taxsaving").style.display = 'none'; document.getElementById("spf").style.display = 'none'; document.getElementById("sesic").style.display = 'block'; document.getElementById("stds").style.display = 'none'; document.getElementById("slumpsum").style.display = 'none'; document.getElementById("staxsaving").style.display = 'none'; document.getElementById("msg").style.display = 'none'; 

document.getElementById("ChangeESIC").style.display="block"; document.getElementById("SaveESIC").style.display="none";  document.getElementById("EmployerCodeNo").disabled=true;  document.getElementById("MaxSalESIC").disabled=true;  document.getElementById("ESICDeduction").disabled=true;  document.getElementById("ESICContribute").disabled=true; }



function c() { 

document.getElementById("pf").style.display = 'none'; document.getElementById("esic").style.display = 'none';document.getElementById("tds").style.display = 'block';document.getElementById("lumpsum").style.display = 'none'; document.getElementById("taxsaving").style.display = 'none'; document.getElementById("spf").style.display = 'none'; document.getElementById("sesic").style.display = 'none'; document.getElementById("stds").style.display = 'block'; document.getElementById("slumpsum").style.display = 'none'; document.getElementById("staxsaving").style.display = 'none'; document.getElementById("msg").style.display = 'none'; 

document.getElementById("ChangeTDS").style.display="block"; document.getElementById("SaveTDS").style.display="none";  document.getElementById("PAN").disabled=true;  document.getElementById("TAN").disabled=true;  document.getElementById("TDSPerson").disabled=true;  document.getElementById("TDSDesignation").disabled=true; document.getElementById("TDSCircle").disabled=true;  document.getElementById("TDSDoSo").disabled=true; document.getElementById("DefaulHRACal").disabled=true; document.getElementById("OtherEduCess").disabled=true;
document.getElementById("TDSMax80C").disabled=true; document.getElementById("IncHouseProperty").disabled=true; document.getElementById("PTax").disabled=true; document.getElementById("Rebate").disabled=true; document.getElementById("Rebate86").disabled=true; document.getElementById("Rebate89").disabled=true; document.getElementById("Rebate90").disabled=true; document.getElementById("Rebate90A").disabled=true; document.getElementById("Rebate91").disabled=true; document.getElementById("RebateRsIncomeUp").disabled=true; document.getElementById("Surcharge").disabled=true; document.getElementById("SurchargeTaxIncome").disabled=true;
var TaxRow=document.getElementById("TaxRowNo").value;
for(var i=1; i<=TaxRow; i++){ document.getElementById("VFrom_"+i).disabled=true; document.getElementById("VTo_"+i).disabled=true; 
                              document.getElementById("TaxV_"+i).disabled=true; document.getElementById("VStatus_"+i).disabled=true; }
var Wo_TaxRow=document.getElementById("Wo_TaxRowNo").value; 
for(var i=1; i<=Wo_TaxRow; i++){ document.getElementById("Wo_VFrom_"+i).disabled=true; document.getElementById("Wo_VTo_"+i).disabled=true; 
                              document.getElementById("Wo_TaxV_"+i).disabled=true; document.getElementById("Wo_VStatus_"+i).disabled=true; }
var A60B80_TaxRow=document.getElementById("A60B80_TaxRowNo").value; 
for(var i=1; i<=A60B80_TaxRow; i++){ document.getElementById("A60B80_VFrom_"+i).disabled=true; document.getElementById("A60B80_VTo_"+i).disabled=true; 
                              document.getElementById("A60B80_TaxV_"+i).disabled=true; document.getElementById("A60B80_VStatus_"+i).disabled=true; }
var A80_TaxRow=document.getElementById("A80_TaxRowNo").value; 
for(var i=1; i<=A80_TaxRow; i++){ document.getElementById("A80_VFrom_"+i).disabled=true; document.getElementById("A80_VTo_"+i).disabled=true; 
                              document.getElementById("A80_TaxV_"+i).disabled=true; document.getElementById("A80_VStatus_"+i).disabled=true; }							  
}



function d() { 

document.getElementById("pf").style.display = 'none'; document.getElementById("esic").style.display = 'none'; document.getElementById("tds").style.display = 'none'; document.getElementById("lumpsum").style.display = 'block'; document.getElementById("taxsaving").style.display = 'none'; document.getElementById("spf").style.display = 'none'; document.getElementById("sesic").style.display = 'none'; document.getElementById("stds").style.display = 'none'; document.getElementById("slumpsum").style.display = 'block'; document.getElementById("staxsaving").style.display = 'none'; document.getElementById("msg").style.display = 'none'; 

document.getElementById("ChangeLumpsum").style.display="block"; document.getElementById("SaveLumpsum").style.display="none";  document.getElementById("MaxBonus").disabled=true;  document.getElementById("BonusContribute").disabled=true;  document.getElementById("BonusMonth").disabled=true;  document.getElementById("MaxGratuity").disabled=true; document.getElementById("GratuityDay").disabled=true; }

 
function e() { 
document.getElementById("pf").style.display = 'none'; document.getElementById("esic").style.display = 'none'; document.getElementById("tds").style.display = 'none'; document.getElementById("lumpsum").style.display = 'none'; document.getElementById("taxsaving").style.display = 'block'; document.getElementById("spf").style.display = 'none'; document.getElementById("sesic").style.display = 'none'; document.getElementById("stds").style.display = 'none'; document.getElementById("slumpsum").style.display = 'none'; document.getElementById("staxsaving").style.display = 'block'; document.getElementById("msg").style.display = 'none'; 

document.getElementById("ChangeTaxSaving").style.display="block"; document.getElementById("SaveTaxSaving").style.display="none";  document.getElementById("ConAllow").disabled=true;  document.getElementById("MediReim").disabled=true;  document.getElementById("LtaBasicInto").disabled=true;  document.getElementById("ChildEduAllowMonth").disabled=true; document.getElementById("ChildEdu_Maxchild").disabled=true; document.getElementById("MPP").disabled=true;}  


function CheckedArr()

{ if(document.getElementById("con_for_arrCalcu").checked == true) 

  {document.getElementById("con_for_arrCalcu").value = 1;} 

  else { document.getElementById("con_for_arrCalcu").value = 0; } }
  
  