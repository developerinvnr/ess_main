<?php session_start();
if($_SESSION['login'] = true){require_once('../AdminUser/config/config.php');}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('../AdminUser/logcheck.php');
if($_SESSION['logCheckEmp']!=$logemp){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('EmpMenuSession.php');}else{header('Location:../index.php');}

?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style>
.tdl{ font-family:Arial;font-size:12px;text-align:left; }
.tdc{ font-family:Arial;font-size:12px;text-align:center; }
.tdr{ font-family:Arial;font-size:12px;text-align:right; }
.rinput{font-family:Arial;font-weight:bold;color:#9F0000;font-size:15px;text-align:center;height:21px;}
.tdll{ font-family:Arial;font-size:14px;text-align:left; }
.tdcc{ font-family:Arial;font-size:14px;text-align:center; }
.tdrr{ font-family:Arial;font-size:14px;text-align:right; }
</style>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<link type="text/css" href="css/mycss.css" rel="stylesheet"/>
<script src="../AdminUser/js/jquery-1.9.1.js"></script>
<script type="text/javascript" src="../AdminUser/js/jquery.freezeheader.js"></script>
<script>$(document).ready(function () { $("#table1").freezeHeader({ 'height':'500px' }); })</script>
<script type="text/javascript" language="javascript">
function SelectHQEmpInc(value1,value2,value3){  
  var D=document.getElementById('DeE').value; var S=document.getElementById('StE').value; var H=document.getElementById('HQE').value; window.location= 'HodPmsIncrement.php?FilD='+D+'&FilS='+S+'&FilH='+H+'&ee=1&aa=1&rr=1&hh=0&sh=1&hp=1&fr=1&kr=1&fq=1&prt=1&msg=1&pd=1&mt=1&mts=1&scr=1&prom=1&inc=0&incr=1&pmsr=1&rg=1&h=1&fachiv=1&fa=1&fb=1&ffeedb=1&org=1';
} 

function SelectStateEmpInc(value1,value2,value3){  
  var D=document.getElementById('DeE').value; var S=document.getElementById('StE').value; var H=document.getElementById('HQE').value; window.location= 'HodPmsIncrement.php?FilD='+D+'&FilS='+S+'&FilH='+H+'&ee=1&aa=1&rr=1&hh=0&sh=1&hp=1&fr=1&kr=1&fq=1&prt=1&msg=1&pd=1&mt=1&mts=1&scr=1&prom=1&inc=0&incr=1&pmsr=1&rg=1&h=1&fachiv=1&fa=1&fb=1&ffeedb=1&org=1';
} 

function SelectDeptEmp(value1,value2,value3){ 
  var D=document.getElementById('DeE').value; var S=document.getElementById('StE').value; var H=document.getElementById('HQE').value; window.location= 'HodPmsIncrement.php?FilD='+D+'&FilS='+S+'&FilH='+H+'&ee=1&aa=1&rr=1&hh=0&sh=1&hp=1&fr=1&kr=1&fq=1&prt=1&msg=1&pd=1&mt=1&mts=1&scr=1&prom=1&inc=0&incr=1&pmsr=1&rg=1&h=1&fachiv=1&fa=1&fb=1&ffeedb=1&org=1';
} 

function FunFresh(){ window.location= "HodPmsIncrement.php?ee=1&aa=1&rr=1&hh=0&sh=1&hp=1&fr=1&kr=1&fq=1&prt=1&msg=1&pd=1&mt=1&mts=1&scr=1&prom=1&inc=0&incr=1&pmsr=1&rg=1&h=1&fachiv=1&fa=1&fb=1&ffeedb=1&org=1"; }
		
function ClickEdit(Sno,EI,v)
{
  document.getElementById("CtcProGSPM_"+Sno).disabled=false; document.getElementById("CtcProSC_"+Sno).disabled=false; 
  //if(v==0){document.getElementById("CtcProGSPM_"+Sno).readOnly=true;}
  document.getElementById("CtcProGSPM_"+Sno).readOnly=true;
  document.getElementById("SpanEdit_"+Sno).style.display='none';  
  document.getElementById("SpanEditSave_"+Sno).style.display='block'; 
  document.getElementById("msg_"+Sno).style.display='none'; 
  document.getElementById("TDD1_"+Sno).style.backgroundColor='#9FCFFF';
  document.getElementById("CtcProGSPM_"+Sno).style.backgroundColor='#9FCFFF';
  document.getElementById("TDD2_"+Sno).style.backgroundColor='#9FCFFF';
  document.getElementById("CtcProSC_"+Sno).style.backgroundColor='#9FCFFF';
  var IncenCheck = document.getElementById("IncenCheck_"+Sno).value; 
  
  if(IncenCheck=='Y')
  { 
   document.getElementById("EmpInctv"+Sno).disabled=false; 
   document.getElementById("EmpInctv"+Sno).style.backgroundColor='#9FCFFF'; 
  }
  var NewGross = parseFloat(document.getElementById("CtcNewGross_"+Sno).value);
  var GrossAmt = document.getElementById("CtcProGSPM_"+Sno).value=Math.round((NewGross)*100)/100;
  
  var OverMsg = document.getElementById("OverMsg"+Sno).value;
  if(OverMsg!=''){document.getElementById("CtcProGSPM_"+Sno).readOnly=false; }
  
  CalProInc(Sno);
}

function CalProInc(Sno)
{ 
/*
var ProGSPM = parseFloat(document.getElementById("ProGSPM_"+Sno).value);
var Per_ProGSPM = parseFloat(document.getElementById("Per_ProGSPM_"+Sno).value);
var ProSC = parseFloat(document.getElementById("ProSC_"+Sno).value);
var TotalProGSPM = parseFloat(document.getElementById("TotalProGSPM_"+Sno).value);
var Per_TotalProGSPM = parseFloat(document.getElementById("Per_TotalProGSPM_"+Sno).value);
*/

/** Ctc Open **/
var CtcProGSPM = parseFloat(document.getElementById("CtcProGSPM_"+Sno).value);
var CtcPer_ProGSPM = parseFloat(document.getElementById("CtcPer_ProGSPM_"+Sno).value);
var CtcProSC = parseFloat(document.getElementById("CtcProSC_"+Sno).value);
var CtcTotalProGSPM = parseFloat(document.getElementById("CtcTotalProGSPM_"+Sno).value);
var CtcPer_TotalProGSPM = parseFloat(document.getElementById("CtcPer_TotalProGSPM_"+Sno).value);
var Ctc = parseFloat(document.getElementById("Ctc_"+Sno).value);  
/** Ctc Close **/

var GS = parseFloat(document.getElementById("GS_"+Sno).value);
var MinV = parseFloat(document.getElementById("MinV_"+Sno).value); 
var MaxV = parseFloat(document.getElementById("MaxV_"+Sno).value); 
var OnePerPre = parseFloat(document.getElementById("OnePerPre").value);
var ETIncG = parseFloat(document.getElementById("EmpTTIncGross"+Sno).value);

var ETIncGP = parseFloat(document.getElementById("EmpTTIncGrossPercent"+Sno).value);
var ETPISP = parseFloat(document.getElementById("EmpTTPISPercent"+Sno).value);
var ETSCGP = parseFloat(document.getElementById("EmpTTSCPercent"+Sno).value);

/** Ctc Open **/ 
var Cal_OnePer = Math.round(((Ctc*1)/100)*100)/100;  
var Cal_MinCtcSV = document.getElementById("Cal_MinCtcSV"+Sno).value=Math.round((CtcProGSPM-Ctc)*100)/100;
var Cal_Per_ProInc = document.getElementById("CtcPer_ProGSPM_"+Sno).value=Math.round((Cal_MinCtcSV/Cal_OnePer)*100)/100; 
var Cal_Per_ProSC = document.getElementById("CtcPer_SalaryCorr"+Sno).value=Math.round((CtcProSC/Cal_OnePer)*100)/100; 
var Cal_TotCtc = document.getElementById("CtcTotalProGSPM_"+Sno).value=Math.round((CtcProGSPM+CtcProSC)*100)/100; 
var Cal_Per_TotGSPM = document.getElementById("CtcPer_TotalProGSPM_"+Sno).value=Math.round((Cal_Per_ProInc+Cal_Per_ProSC)*100)/100; 
document.getElementById("CtcIncSalaryPM"+Sno).value=Math.round((Cal_MinCtcSV+CtcProSC)*100)/100; 
/** Ctc Close **/

/************** New New New New New New New New New New New New New New New New New New Open Open */
/************** New New New New New New New New New New New New New New New New New New Open Open */

//var Mediclaim_val=parseFloat(document.getElementById("EMediPP").value);
var BWageId=parseFloat(document.getElementById("BWageId_"+Sno).value); 


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
//var MonthlyGross = Math.round((AnnualGross/12)*100)/100; 
var MonthlyGross = Math.round(AnnualGross/12);  

//alert("Bonus:="+BonusY+"-ESIC="+ComESIC+"-Mediclaim="+Mediclaim+"-PF="+ComPF+"-Gratuity="+Gratuity+"-AGross="+AnnualGross+"-MGross="+MonthlyGross);

document.getElementById("ProGSPM_"+Sno).value=MonthlyGross;
var ProGSPM = parseFloat(document.getElementById("ProGSPM_"+Sno).value);
var OldGSPM = parseFloat(document.getElementById("GS_"+Sno).value);

/** Gross Open **/ 
var Cal_OnePer1 = Math.round(((OldGSPM*1)/100)*100)/100;  
var Cal_MinGSV1 = document.getElementById("Cal_MinGSV"+Sno).value=Math.round((ProGSPM-OldGSPM)*100)/100;
var Cal_Per_ProInc1 = document.getElementById("Per_ProGSPM_"+Sno).value=Math.round((Cal_MinGSV1/Cal_OnePer1)*100)/100;  
var Cal_TotGSPM1 = document.getElementById("TotalProGSPM_"+Sno).value=ProGSPM; 
var Cal_Per_TotGSPM1 = document.getElementById("Per_TotalProGSPM_"+Sno).value=Cal_Per_ProInc1; 
document.getElementById("IncSalaryPM"+Sno).value=Cal_MinGSV1; 
/** Gross Close **/

/************** New New New New New New New New New New New New New New New New New New Close Close */
/************** New New New New New New New New New New New New New New New New New New Close Close */

var Cal_IncGrossAnnual = document.getElementById("TotalAnnualSalary"+Sno).value=Math.round((Cal_TotGSPM1*12)*100)/100;
var Cal_IncGrossMonthalySalary = document.getElementById("IncSalaryPM"+Sno).value=Cal_MinGSV1;

var Cal_ETIncG = document.getElementById("EmpTTIncGross"+Sno).value=Cal_MinGSV1;
var Cal_ETIncGP = document.getElementById("EmpTTIncGrossPercent"+Sno).value=Cal_Per_ProInc1;
var Cal_ETPISP = document.getElementById("EmpTTPISPercent"+Sno).value=Cal_Per_ProInc1;
var Cal_ETSCGP = document.getElementById("EmpTTSCPercent"+Sno).value=0;

var IncenCheck = document.getElementById("IncenCheck_"+Sno).value; 
if(IncenCheck=='Y') {var EmpInctv = parseFloat(document.getElementById("EmpInctv"+Sno).value); 
var Per_EmpInctv = document.getElementById("IncentivePer"+Sno).value=Math.round((EmpInctv/Cal_OnePer1)*100)/100; 
var TotalPay = document.getElementById("TotalPay"+Sno).value=Math.round((EmpInctv+Cal_TotGSPM1)*100)/100; }
var TotIncrement = document.getElementById("TotIncrement"+Sno).value=Math.round((Cal_Per_TotGSPM1+Per_EmpInctv)*100)/100; 

}

function ClickSaveEdit(No,PmsId,EmpId,C,Y,HE)
{ 
  var ProGSPM=document.getElementById("ProGSPM_"+No).value; var Per_ProGSPM=document.getElementById("Per_ProGSPM_"+No).value;
  var ProSC=document.getElementById("ProSC_"+No).value; var TotalProGSPM=document.getElementById("TotalProGSPM_"+No).value; 
  var Per_TotalProGSPM=document.getElementById("Per_TotalProGSPM_"+No).value; 
  var ComId=document.getElementById("ComId").value; var MinV=parseFloat(document.getElementById("MinV_"+No).value); 
  var MaxV=parseFloat(document.getElementById("MaxV_"+No).value);
  var Per_ProSC=document.getElementById("Per_SalaryCorr"+No).value; 
  var IncSalaryPM=document.getElementById("IncSalaryPM"+No).value; 
  var TotalAnnualSalary=document.getElementById("TotalAnnualSalary"+No).value; 
  var Cal_MinGSV=document.getElementById("Cal_MinGSV"+No).value;
  
  var ETIncGP = document.getElementById("EmpTTIncGrossPercent"+No).value; 
  var ETPISP = document.getElementById("EmpTTPISPercent"+No).value;
  var ETSCGP = document.getElementById("EmpTTSCPercent"+No).value; 
  
  var MTPreG = document.getElementById("MyTTPreGross").value; var OnePerPre = document.getElementById("OnePerPre").value; 
  var UpDesigId = document.getElementById("UpDesigId_"+No).value; 
  var IncenCheck = document.getElementById("IncenCheck_"+No).value; 
  var IncentivePer = document.getElementById("IncentivePer"+No).value; 
  var Extra3Month = document.getElementById("Extra3Month"+No).value; 
  if(IncenCheck=='Y'){var EmpInctv = document.getElementById("EmpInctv"+No).value;}
  if(IncenCheck=='N'){var EmpInctv = 0.00;} var Numfilter=/^[0-9. ]+$/;  var test_num = Numfilter.test(EmpInctv);
  if(test_num==false) { alert('Please check incentive!'); return false; }

  var Per_SC=parseFloat(document.getElementById("Per_SalaryCorr"+No).value);   //alert(Per_SC);
  var Per_AG=parseFloat(document.getElementById("ActualPer_Gross_"+No).value); //alert(Per_AG);
  var ActualPer=Math.round((Per_SC+Per_AG)*100)/100; //alert(ActualPer);	
  
  var Hod_ProIncCTC = document.getElementById("CtcProGSPM_"+No).value; 
  var Hod_Percent_ProIncCTC = document.getElementById("CtcPer_ProGSPM_"+No).value;
  var Hod_ProCorrCTC = document.getElementById("CtcProSC_"+No).value; 
  var Hod_Percent_ProCorrCTC = document.getElementById("CtcPer_SalaryCorr"+No).value; 
  var Hod_Proposed_ActualCTC = document.getElementById("CtcTotalProGSPM_"+No).value;
  var Hod_IncNetCTC = document.getElementById("CtcIncSalaryPM"+No).value;
  var Hod_Percent_IncNetCTC = document.getElementById("CtcPer_TotalProGSPM_"+No).value;
  
  var agree=confirm("Are you sure you want to save data?"); 
  if (agree) { 
  var url = 'NormalizedInc.php'; var pars = 'ProGSPM='+ProGSPM+'&PmsId='+PmsId+'&EmpId='+EmpId+'&Per_ProGSPM='+Per_ProGSPM+'&ProSC='+ProSC+'&Per_ProSC='+Per_ProSC+'&TotalProGSPM='+TotalProGSPM+'&Per_TotalProGSPM='+Per_TotalProGSPM+'&IncSalaryPM='+IncSalaryPM+'&TotalAnnualSalary='+TotalAnnualSalary+'&No='+No+'&ETIncGP='+ETIncGP+'&ETPISP='+ETPISP+'&ETSCGP='+ETSCGP+'&C='+C+'&Y='+Y+'&HE='+HE+'&MTPreG='+MTPreG+'&OnePerPre='+OnePerPre+'&EmpInctv='+EmpInctv+'&IncentivePer='+IncentivePer+'&ActualPer='+ActualPer+'&Extra3Month='+Extra3Month+'&Hod_ProIncCTC='+Hod_ProIncCTC+'&Hod_Percent_ProIncCTC='+Hod_Percent_ProIncCTC+'&Hod_ProCorrCTC='+Hod_ProCorrCTC+'&Hod_Percent_ProCorrCTC='+Hod_Percent_ProCorrCTC+'&Hod_Proposed_ActualCTC='+Hod_Proposed_ActualCTC+'&Hod_IncNetCTC='+Hod_IncNetCTC+'&Hod_Percent_IncNetCTC='+Hod_Percent_IncNetCTC;  
  var myAjax = new Ajax.Request(
  url, { 	method: 'post', parameters: pars, onComplete: show_IncNormalized });
  return true; } else {return false;}
}
function show_IncNormalized(originalRequest)
{ 
  document.getElementById("msg").innerHTML = originalRequest.responseText; var Sno=document.getElementById("NoId").value;
  var TPGrossPM=document.getElementById("TPGrossPM").value; var IGrossS=document.getElementById("IGrossS").value; 
  var PIGrossS=document.getElementById("PIGrossS").value;  var TPPIS=document.getElementById("TPPIS").value; 
  var TPPSC=document.getElementById("TPPSC").value; 
  document.getElementById("MyTTProGross").value=TPGrossPM; document.getElementById("MyTTIncGross").value=IGrossS; 
  document.getElementById("MyTTIncGrossPercent").value=PIGrossS; 
  document.getElementById("MyTTPISPercent").value=TPPIS;
  document.getElementById("MyTTSCPercent").value=TPPSC;  document.getElementById("msg_"+Sno).style.display='block';
  document.getElementById("SpanEdit_"+Sno).style.display='block'; 
  document.getElementById("SpanEditSave_"+Sno).style.display='none';
  document.getElementById("ProGSPM_"+Sno).disabled=true; document.getElementById("ProSC_"+Sno).disabled=true;
  document.getElementById("TDD1_"+Sno).style.backgroundColor='#B9FFB9';
  document.getElementById("ProGSPM_"+Sno).style.backgroundColor='#B9FFB9'; 
  document.getElementById("TDD1_"+Sno).style.backgroundColor='#B9FFB9';
  document.getElementById("ProSC_"+Sno).style.backgroundColor='#B9FFB9'; 
  document.getElementById("FinalSubmit_"+Sno).disabled=false;
  
  document.getElementById("MyTTProGross_22").value=TPGrossPM; 
  document.getElementById("MyTTIncGross_22").value=IGrossS; 
  document.getElementById("MyTTIncGrossPercent_22").value=PIGrossS; 
  document.getElementById("MyTTSCPercent_22").value=TPPSC; 
  
  document.getElementById("OneOverAllSubmit").disabled=false;
  document.getElementById("TwoOverAllSubmit").disabled=false;
   
}

function FinalSubmit(No,PmsId,EmpId)
{
  var agree=confirm("Are you sure you want to submit data?"); 
  if(agree) 
  {
   var url = 'NormalizedInc.php'; var pars = 'action=submit&PmsId='+PmsId+'&EmpId='+EmpId+'&No='+No; 
   var myAjax = new Ajax.Request( url, { method: 'post', parameters: pars, onComplete: show_SubIncNormalized });
   return true; 
  } 
  else{ return false; }
}
function show_SubIncNormalized(originalRequest)
{ document.getElementById("msg").innerHTML = originalRequest.responseText; var Sno=document.getElementById("NoId").value; 
  document.getElementById("msg_"+Sno).style.display='none'; document.getElementById("msgSub_"+Sno).style.display='block'; 
  document.getElementById("FinalSubmit_"+Sno).disabled=true; document.getElementById("SpanEdit_"+Sno).style.display='none';
  document.getElementById("SpanEditSave_"+Sno).style.display='none';
}

function OverAllSubmit(y,e)
{
 var No = document.getElementById("RowNo").value; 
 var agree=confirm("Are you sure you want to over all final submit data?"); 
 if(agree) 
 {
  var url = 'NormalizedInc.php'; var pars = 'OverAll=OverAllsubmit&Y='+y+'&E='+e+'&N='+No; 
  var myAjax = new Ajax.Request( url, { method: 'post', parameters: pars, onComplete: show_OverAll });
  return true; 
 }
  else{ return false; }
}
function show_OverAll(originalRequest)
{ document.getElementById("OverAllmsg").innerHTML = originalRequest.responseText; 
  var Sno=document.getElementById("RowNoId").value; //document.getElementById("OneOverAllSubmit").disabled=true; 
  for(var i=1; i<=Sno; i++)
  { 
   if(document.getElementById("IncSalaryPM"+i).value>0 && document.getElementById("HodPmsSts"+i).value!=2)
   {
    document.getElementById("FinalSubmit_"+i).disabled=true;
	document.getElementById("SpanEdit_"+i).style.display='none';
   }	 
  }  
  document.getElementById("OneOverAllSubmit").disabled=true;
  document.getElementById("TwoOverAllSubmit").disabled=true;
}

function FunTgtAch(e,y){window.open("HodPmsTgtAch.php?e="+e+"&y="+y+"&grp=3","TcForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=800,height=600");}


function FunExpFormat(y,e,c)
{ window.open("ExportPmsIncHis.php?action=IncHisExport&value=export&c="+c+"&YI="+y+"&ee="+e,"ExportForm","menubar=yes,scrollbars=yes,resizable=no,directories=no,width=20,height=20"); }

/*function SelectDeptEmp(d,e){ window.location="HodPmsIncrement.php?deptId="+d+"&e="+e+"&ee=1&aa=1&rr=1&hh=0&sh=1&hp=1&fr=1&kr=1&fq=1&prt=1&msg=1&pd=1&mt=1&mts=1&scr=1&prom=1&inc=0&incr=1&pmsr=1&rg=1&h=1&fachiv=1&fa=1&fb=1&ffeedb=1&org=1"; }  */                                   

function isNumberKey(evt)
{
 var charCode = (evt.which) ? evt.which : event.keyCode
 if (charCode > 31 && (charCode < 48 || charCode > 57))
 //if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57))  /* For floating*/
	return false;

 return true;
}

</script>
</head>
<body class="body">
<table class="table">
<tr><td><table class="menutable"><tr><td><?php if($_SESSION['login'] = true){ require_once("EMenu.php"); } ?></td></tr></table></td></tr>
<tr>
 <td>
 <table width="100%" style="margin-top:0px;">
  <tr><td valign="top"><?php if($_SESSION['login'] = true){ require_once("EWelcome.php"); } ?></td></tr>
  <tr>
   <td valign="top" style="background-image:url(images/pmsback.png);width:100%;">
   <table border="0" style="width:100%;height:500px;float:none;" cellpadding="0">
   <tr>
    <td valign="top" style="width:100%;">      
    <table border="0" id="Activity" style="width:100%;">
	<tr>
     <td style="width:100%;" valign="top">
	 <table border="0" style="width:100%;">
<?php //*************************************** Start ********************************************* ?>	
<?php //*************************************** Start ********************************************* ?>
<?php
$SqlStat=mysql_query("select MedicalPolicyPremium from hrm_company_statutory_taxsaving where CompanyId=".$CompanyId,$con); $ResStat=mysql_fetch_assoc($SqlStat);
?>
<input type="hidden" id="EMediPP" value="<?php echo $ResStat['MedicalPolicyPremium'];?>" readonly/>
					
<tr>
 <td>	 
 <table style="width:100%;">
<!--  Head Parts Open Open Open  --> 
<!--  Head Parts Open Open Open  --> 
 <tr>
  <td>
   <table>
    <tr>
<?php if($_SESSION['EmpType']=='E'){ ?>
<td align="center" valign="top"><a href="pms.php?log=<?php echo $_SESSION['logCheckEmp']; ?>&ee=0&aa=1&rr=1&hh=1&sh=1&hp=1&rr2=1&fr=1&kr=1&fq=1&prt=1&msg=1&pd=0&mt=1&mts=1&scr=1&prom=1&inc=1&incr=1&pmsr=1&rg=1&h=1&fachiv=1&fa=1&fb=1&ffeedb=1&org=1"><img id="Img_emp1" style="display:<?php if($_REQUEST['ee']==1){echo 'block';}else{echo 'none';} ?>;" src="images/emp1.png" border="0"/></a></td>

<?php } if($_SESSION['BtnApp']>0) { ?>
<td align="center" valign="top"><a href="ManagerPms.php?ee=1&aa=0&rr=1&rr2=1&hh=1&sh=1&hp=1&fr=1&kr=1&fq=1&prt=1&msg=1&pd=1&mt=0&mts=1&scr=1&prom=1&inc=1&incr=1&pmsr=1&rg=1&h=1&fachiv=1&fa=1&fb=1&ffeedb=1&org=1"><img id="Img_manager1" style="display:<?php if($_REQUEST['aa']==1){echo 'block';}else{echo 'none';} ?>;" src="images/manager1.png" border="0"/></a></td></td>
		   
<?php } if($_SESSION['BtnRev']>0) { ?>
<td align="center" valign="top"><a href="HodPms.php?ee=1&aa=1&rr2=1&rr=0&hh=1&sh=1&hp=1&fr=1&kr=1&fq=1&prt=1&msg=1&pd=1&mt=0&mts=1&scr=1&prom=1&inc=1&incr=1&pmsr=1&rg=1&h=1&fachiv=1&fa=1&fb=1&ffeedb=1&org=1"><img id="Img_hod1" src="images/hod1.png" border="0"/></a></td>

<?php } if($_SESSION['BtnRev2']>0) { ?>
<td align="center" valign="top"><a href="Rev2HodPms.php?ee=1&rr2=0&aa=1&rr=1&hh=0&sh=1&hp=1&fr=1&kr=1&fq=1&prt=1&msg=1&pd=1&mt=1&mts=0&scr=1&prom=1&inc=1&incr=1&pmsr=1&rg=1&h=1&fachiv=1&fa=1&fb=1&ffeedb=1&org=1"><img id="Img_hod1" src="images/RevHod1.png" border="0"/></a></td>	
		   
<?php } if($_SESSION['BtnHod']>0) { ?>
<td align="center" valign="top"><img id="Img_hod1" src="images/m.png" border="0"/></td><?php } ?>

<?php /******************** Msg Msg Msg Msg Msg Msg Msg Msg Msg Msg Msg Msg OPEN************/ ?>
<?php if($_SESSION['eMsg']=='Y'){ ?>
 <td>
 <?php $CuDate=date("Y-m-d"); if(($_SESSION['eAppform']=='Y' OR $_SESSION['eMidform']=='Y') AND $CuDate>=$_SESSION['hFrom'] AND $CuDate<=$_SESSION['hTo'] AND $_SESSION['hSts']=='A'){ $LastDate=$_SESSION['hTo']; $CurrentDate=date("Y-m-d");
		 $diff = abs(strtotime($LastDate) - strtotime($CurrentDate));
         $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/(60*60*24)); ?>
 <font class="msg_r"><font color="#00366C">&nbsp;&nbsp;PMS :</font><span class="blink_me"> <?php echo $days;?> Days Remaining! Last date : <?php echo date("d-F",strtotime($_SESSION['hTo'])); ?> </span></font>
 <?php } ?>
 </td>
<?php } ?>
<?php /******************** Msg Msg Msg Msg Msg Msg Msg Msg Msg Msg Msg Msg CLOSE************/ ?>
 
	</tr>
   </table>
  </td>
 </tr>
 
 <tr><td style="vertical-align:top;width:100%;"><?php include("SetKraPmsmh.php"); ?></td></tr>
<!--  Head Parts Close Close Close  --> 
<!--  Head Parts Close Close Close  --> 
 
  <tr>
    <td style="width:100%;">
	  <table border="0" style="width:100%;">
	    <tr>
        <?php /****************************************** Form Start **************************/ ?>
		<?php /****************************************** Form Start **************************/ ?>
		
<?php /***************** Submitted **************************/ ?>		 


 		  <td id="TeamDetails" style="display:block;width:100%;">
		  <table border="0" style="width:100%;">
<tr>
 <td style="width:100%;">
  <table border="0" style="width:100%;" cellspacing="0">
   <tr>
    <td class="formh" style="width:140px;">(<i>Team Increment</i>) :&nbsp;</td>
	<?php if($_SESSION['hStatus']=='Y'){ ?>
	<td class="tdd" style="width:80px;"><b>Department:</b></td>
    <td class="td1" style="width:100px;"><select class="tdsel" name="DeE" id="DeE" onChange="SelectDeptEmp(this.value,<?php echo $EmployeeId.','.$_SESSION['PmsYId']; ?>)"><?php if($_REQUEST['FilD']>0){ $sqlde=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$_REQUEST['FilD'],$con); $resde=mysql_fetch_assoc($sqlde); ?><option value="<?php echo $_REQUEST['FilD']; ?>" selected><?php echo $resde['DepartmentCode']; ?></option><?php }else{ ?><option value="All" selected>All</option><?php } $SqlDept=mysql_query("select HR_Curr_DepartmentId,DepartmentName,DepartmentCode from hrm_employee_pms pms inner join hrm_department d on pms.HR_Curr_DepartmentId=d.DepartmentId where AssessmentYear=".$_SESSION['PmsYId']." AND pms.CompanyId=".$CompanyId." AND HOD_EmployeeID=".$EmployeeId." group by HR_Curr_DepartmentId order by DepartmentName ASC"); while($ResDept=mysql_fetch_array($SqlDept)) { ?><option value="<?php echo $ResDept['HR_Curr_DepartmentId']; ?>"><?php echo $ResDept['DepartmentCode'];?></option><?php } ?><option value="All">All</option></select></td>
	<td class="tddr" style="width:40px;"><b>State:</b></td>
	<td class="td1" style="width:150px;"><select class="tdsel" name="StE" id="StE" onChange="SelectStateEmpInc(this.value,<?php echo $EmployeeId.','.$_SESSION['PmsYId']; ?>)"><?php if($_REQUEST['FilS']>0){ $sqlSe=mysql_query("select StateName from hrm_state where StateId=".$_REQUEST['FilS'],$con); $resSe=mysql_fetch_assoc($sqlSe); ?><option value="<?php echo $_REQUEST['FilS']; ?>" selected><?php echo $resSe['StateName']; ?></option><?php }else{ ?><option value="All" selected>All</option><?php } $SqlSt=mysql_query("select st.* from hrm_state st inner join hrm_headquater hq on st.StateId=hq.StateId inner join hrm_employee_general g on hq.HqId=g.HqId inner join hrm_employee_pms pms on g.EmployeeID=pms.EmployeeID where pms.HOD_EmployeeID=".$EmployeeId." AND hq.CompanyId=".$CompanyId." group by st.StateId order by StateName ASC"); while($ResSt=mysql_fetch_array($SqlSt)) { ?><option value="<?php echo $ResSt['StateId']; ?>"><?php echo $ResSt['StateName'];?></option><?php } ?><option value="All">All</option></select></td>
	
	<input type="hidden" id="HQE" name="HQE" value="0"/>
	<?php /*?><td class="tdr" style="width:40px;color:#FFFFFF;">HQ:</td>
    <td class="td1" style="width:120px;"><select class="tdsel" name="HQE" id="HQE" onChange="SelectHQEmpInc(this.value,<?php echo $EmployeeId.','.$_SESSION['PmsYId']; ?>)"><option value="All" style="margin-left:0px; background-color:#84D9D5;" selected>All</option><?php $SqlHQ=mysql_query("select hq.* from hrm_headquater hq inner join hrm_employee_general g on hq.HqId=g.HqId inner join hrm_employee_pms pms on g.EmployeeID=pms.EmployeeID where pms.HOD_EmployeeID=".$EmployeeId." AND hq.CompanyId=".$CompanyId." group by hq.HqId order by HqName ASC", $con); while($ResHQ=mysql_fetch_array($SqlHQ)) { ?><option value="<?php echo $ResHQ['HqId']; ?>"><?php echo $ResHQ['HqName'];?></option><?php } ?><option value="All">All</option></select></td><?php */?>
       
	<?php } ?>
	<td class="tdc" style="width:50px;"><a href="#" onClick="FunFresh()">Refresh</a></td>
	<td class="tdc" style="width:100px;"><a href="#" onClick="FunExpFormat(<?php echo $_SESSION['PmsYId'].','.$EmployeeId.','.$CompanyId; ?>)">Export_Format</a></td>
	<td class="tdr" style="width:500px;vertical-align:middle;">PGSPM - <font color="#FFFFFF">Proposed Gross Salary PM</font>&nbsp;&nbsp;PIS - <font color="#FFFFFF">Proposed Increment Salary</font>&nbsp;&nbsp;SC - <font color="#FFFFFF">Salary Correction</font></td>	
   </tr>
  </table>
 </td>
</tr>




<tr>
 <td style="width:100%;">
  <table style="width:100%;">
   <tr></tr>
  </table>
 </td>
</tr>

<?php //$SqlCount=mysql_query("select SUM(EmpCurrGrossPM) as Old_GROSS, SUM(EmpCurrIncentivePM) as Old_Inc, SUM(Hod_ProIncSalary) as H_IS, SUM(Hod_ProCorrSalary) as H_SC, SUM(Hod_Incentive) as H_Inc, SUM(Hod_IncNetMonthalySalary) as Tinc from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.HOD_EmployeeID=".$EmployeeId, $con); 

$SqlCount=mysql_query("select SUM(EmpCurrCtc) as Old_GROSS, SUM(Hod_ProIncCTC) as H_IS, SUM(Hod_ProCorrCTC) as H_SC, SUM(Hod_IncNetCTC) as Tinc from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.HOD_EmployeeID=".$EmployeeId, $con);

$sno=1; $ResCount=mysql_fetch_array($SqlCount);

$TotEGross=$ResCount['Old_GROSS']; //Total Old Gross //+$ResCount['Old_Inc']
$One=($TotEGross*1)/100; $OnePerPre=number_format($One, 2, '.', ''); //One Percent from Old Gross
$TotHIS=$ResCount['H_IS']+$ResCount['H_SC']; //Total Proposed Increment //+$ResCount['H_Inc']

//if($TotHIS>$TotEGross){ $Diff=$TotHIS-$TotEGross; }else{ $Diff=$TotEGross-$TotHIS; } //Total Increment
$Diff=$ResCount['Tinc']; //OR

$TotOldGrossPM=number_format($TotEGross, 2, '.', '');
$TotNewGrossPM=number_format($TotHIS, 2, '.', '');
$Increment=number_format($Diff, 2, '.', '');
$IncPer=$Diff/$OnePerPre; $PerInc=number_format($IncPer, 2, '.', ''); //Total % Increment
$TotalPerPIS=($ResCount['H_IS'])/$OnePerPre; $TotalTPerPIS=number_format($TotalPerPIS, 2, '.', ''); //+$ResCount['H_Inc']
$TotalPerPSC=$ResCount['H_SC']/$OnePerPre; $TotalTPerPSC=number_format($TotalPerPSC, 2, '.', ''); //Total % PSC

//$Diff=$TotHIS-$TotEGross;
//$TotHInC=$Diff+$ResCount['H_SC']; //$TotHInC=$ResCount['Tinc'];
//$TotHMonthGS=$TotHIS+$ResCount['H_SC']; 
//$TotNewGrossPM=number_format($TotHMonthGS, 2, '.', '');
//$INCPer=$ResCount['H_Inc']/$OnePerPre;

$Prev_From_EffDate=date("Y-m-d",strtotime('-1 day', strtotime($_SESSION['EffDate']))); ?>

<tr>
 <td style="width:100%;background-color:#FFFF91;">
 
<input type="hidden" id="EmployeeId" value="<?php echo $EmployeeId; ?>" />
<input type="hidden" id="ComId" value="<?php echo $CompanyId; ?>" />
<input type="hidden" id="YearId" value="<?php echo $YearId; ?>" />
<input type="hidden" id="FormMin5" value="0" /><input type="hidden" id="FormMax5" value="0" />	
<input type="hidden" id="PerValue" /><input type="hidden" id="OnePerPre" value="<?php echo $OnePerPre; ?>"/> 
 
  <table border="0" style="width:100%;">
   <tr>
    <td class="tdl" style="width:100%;vertical-align:bottom;font-size:15px;">
	&nbsp;&nbsp;<u>Total Previous CTC</u>&nbsp;:&nbsp;<input class="rinput" style="width:120px;" id="MyTTPreGross" value="<?php echo floatval($TotOldGrossPM); ?>" />&nbsp;&nbsp;&nbsp;&nbsp;<u>Total Proposed CTC</u>&nbsp;:&nbsp;<input class="rinput" style="width:120px;" id="MyTTProGross" value="<?php echo floatval($TotNewGrossPM); ?>" />&nbsp;&nbsp;&nbsp;&nbsp;<u>Total Increment</u>&nbsp;:&nbsp;<input class="rinput" style="width:100px;" id="MyTTIncGross" value="<?php echo floatval($Increment); ?>"/>&nbsp;<input class="rinput" style="width:60px;" id="MyTTIncGrossPercent" value="<?php echo $PerInc; ?>"/>&nbsp;%&nbsp;&nbsp;&nbsp;&nbsp;<u>SC</u>&nbsp;:&nbsp;<input class="rinput" style="width:60px;" id="MyTTSCPercent" value="<?php echo $TotalTPerPSC; ?>" />&nbsp;%
    <?php /*?><u>PIS</u>&nbsp;:&nbsp;*/?><input type="hidden" class="rinput" id="MyTTPISPercent" value="<?php echo $TotalTPerPIS; ?>" /><?php /*&nbsp;%&nbsp;&nbsp;&nbsp;&nbsp;*/ ?>
	
	
	<div style="position:fixed;right:3%;top:2%;color:#000000;background-color:#FFFF80;padding:7px;">
	<style>.rinput{width:100px;font-family:Times New Roman;font-weight:bold;color:#9F0000;font-size:15px;text-align:center;height:21px;}</style>
    <u>Total Previous CTC</u>&nbsp;:&nbsp;<input class="rinput" style="width:120px;" id="MyTTPreGross_22" value="<?php echo $TotOldGrossPM; ?>" />&nbsp;&nbsp;&nbsp;&nbsp;<u>Total Proposed CTC</u>&nbsp;:&nbsp;<input class="rinput" style="width:120px;" id="MyTTProGross_22" value="<?php echo $TotNewGrossPM; ?>" />&nbsp;&nbsp;&nbsp;&nbsp;<u>Total Increment</u>&nbsp;:&nbsp;<input class="rinput" style="width:100px;" id="MyTTIncGross_22" value="<?php echo $Increment; ?>"/>&nbsp;<input class="rinput" style="width:60px;" id="MyTTIncGrossPercent_22" value="<?php echo $PerInc; ?>"/>&nbsp;%&nbsp;&nbsp;&nbsp;&nbsp;<u>SC</u>&nbsp;:&nbsp;<input class="rinput" style="width:60px;" id="MyTTSCPercent_22" value="<?php echo $TotalTPerPSC; ?>" />&nbsp;%
	</div>
	
	 &nbsp;&nbsp;
	 <?php $sql3=mysql_query("select EmpPmsId from hrm_employee_pms where AssessmentYear=".$_SESSION['PmsYId']." AND HOD_EmployeeID=".$EmployeeId." AND Hod_IncNetMonthalySalary>0 AND HodSubmit_IncStatus=1", $con); $rows2=mysql_num_rows($sql3);  
	   if(($_REQUEST['FilD']=='All' AND $_REQUEST['FilS']=='All') OR ($_REQUEST['FilD']=='' AND $_REQUEST['FilS']==''))
	   { ?>  
		
		<input type="button" style="height:28px;cursor:pointer; background-color:#FF82FF;" id="TwoOverAllSubmit" onClick="return OverAllSubmit(<?php echo $_SESSION['PmsYId'].','.$EmployeeId; ?>)" value="Over All Final Submit" <?php if($rows2==0){ echo 'disabled'; }?> /> 
		 
<?php  } ?>
	 
	 
	 &nbsp;&nbsp;
	 <i><span id="msg" class="msg_b"></span></i>
	 <font class="msg_b"><i><?php echo $msg; ?></i></font>
	 <font class="formc"><i><span id="MsgSpan"></span></i></font>
	 <span id="OverAllmsg" class="msg_g" style="font-style:italic;font-size:15px;"></span>
	 
	</td>
   </tr>
      
 

   
    
   <tr>
    <td style="width:100%;">   
     <table border="0" style="width:100%;">
     <tr>
     <?php //************************************************ Start ******************************// ?>
	 <?php //************************************************ Start ******************************// ?>
	 <td style="width:100%;" id="EmpAppInc">
     <span id="MyTeamIncSpan"></span>
	 <span id="MyTeamInc">
	 <table border="0" style="width:100%;">	 
<?php 
if($_REQUEST['FilD']>0 AND $_REQUEST['FilS']=='All')
{ $qry='g.DepartmentId='.$_REQUEST['FilD']; }
elseif($_REQUEST['FilD']>0 AND $_REQUEST['FilS']>0)
{ $qry='g.DepartmentId='.$_REQUEST['FilD'].' AND hq.StateId='.$_REQUEST['FilS']; }
elseif($_REQUEST['FilD']=='All' AND $_REQUEST['FilS']>0)
{ $qry='hq.StateId='.$_REQUEST['FilS']; }
elseif(($_REQUEST['FilD']=='All' AND $_REQUEST['FilS']=='All') OR ($_REQUEST['FilD']=='' AND $_REQUEST['FilS']==''))
{ $qry='1=1'; }

 $sql=mysql_query("select e.EmployeeID, EmpCode, Fname, Sname, Lname, d.DepartmentId, g.GradeId, DateJoining, DepartmentCode, g.EmpVertical, c.BWageId, c.EmpActPf, EmpPmsId, Appraiser_EmployeeID, Reviewer_EmployeeID, Reviewer_TotalFinalScore, Reviewer_TotalFinalRating, Rev2_EmployeeID, Hod_TotalFinalScore, Hod_TotalFinalRating, HodSubmit_IncStatus, Hod_EmpDesignation, Hod_EmpGrade, Hod_ProIncSalary, Hod_Percent_ProIncSalary, Hod_ProCorrSalary, Hod_Percent_ProCorrSalary, Hod_IncNetMonthalySalary, Hod_Percent_IncNetMonthalySalary, Hod_GrossMonthlySalary, Hod_GrossAnnualSalary, Hod_Incentive, HodPer_PIS_From_PreMyTGrossPM, HodPer_SC_From_PreMyTGrossPM, HodPer_TISPM_From_PreMyTGrossPM, HR_CurrDesigId, HR_CurrGradeId, HR_Curr_DepartmentId, INCENTIVE, EmpCurrCtc, Hod_ProIncCTC, Hod_Percent_ProIncCTC, Hod_ProCorrCTC, Hod_Percent_ProCorrCTC, Hod_Proposed_ActualCTC, Hod_IncNetCTC, Hod_Percent_IncNetCTC, Hod_CTC from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID INNER JOIN hrm_employee_general g ON p.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_ctc c ON p.EmployeeID=c.EmployeeID INNER JOIN hrm_department d ON g.DepartmentId=d.DepartmentId INNER JOIN hrm_headquater hq ON g.HqId=hq.HqId where e.EmpStatus='A' AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.HOD_EmployeeID=".$EmployeeId." AND ".$qry." AND c.Status='A' order by EmpCode ASC", $con);
	 
$sno=1; while($res=mysql_fetch_array($sql)){

$sqlB=mysql_query("select * from hrm_bonus_wages where BWageId=".$res['BWageId']); $resB=mysql_fetch_assoc($sqlB);
if(date("m")==01 OR date("m")==02 OR date("m")==03 OR date("m")==10 OR date("m")==11 OR date("m")==12)
{ $WagesBonus=$resB['PerMonthApr']; }else{ $WagesBonus=$resB['PerMonthOct']; }
if($WagesBonus==''){$WagesBonus=0;}

if($res['EmpVertical']>0)
{ 
 
 $sqVer=mysql_query("select Min_Ctc,Max_Ctc from hrm_pms_vertical_increment where DepId=".$res['DepartmentId']." AND VerticalId=".$res['EmpVertical']." AND ".$res['GradeId'].">=Min_GradeId AND ".$res['GradeId']."<=Max_GradeId",$con); 
 $rowVer=mysql_num_rows($sqVer); $resVer=mysql_fetch_assoc($sqVer);
 if($rowVer>0 AND $resVer['Max_Ctc']>0){ $MaxVCtc=$resVer['Max_Ctc'];}
 else{ $MaxVCtc=0; }
}
else
{
 $MaxVCtc=0; 
}

$sqlCount=mysql_query("select SUM(Incentive) as INC from hrm_pms_appraisal_history where EmpCode=".$res['EmpCode']." AND CompanyId=".$CompanyId, $con); while($Count=mysql_fetch_array($sqlCount)){ $TotInEM=$Count['INC']; } $TotInEM=0; ?> 
  <input type="hidden" id="IncenCheck_<?php echo $sno; ?>" value="<?php echo $res['INCENTIVE']; ?>" />
  <input type="hidden" id="BWageId_<?php echo $sno; ?>" value="<?php echo $WagesBonus; ?>" />
  <input type="hidden" id="MaxVCtc_<?php echo $sno; ?>" value="<?php echo $MaxVCtc; ?>" />
  <input type="hidden" id="EmpActPf_<?php echo $sno; ?>" value="<?php echo $res['EmpActPf']; ?>" />
     
  <tr>
   <td style="width:100%;">
   <table border="1" style="width:100%;" cellspacing="1">
    <tr bgcolor="#006BD7" style="height:25px;">
	 <td class="tdc" style="color:#FFFFFF;"><b><?php echo $sno; ?></b></td>
	 <td colspan="<?php if($TotInEM>0){ ?>17<?php }else{ ?>15<?php } ?>" class="td1l" valign="top">
	  <table width="100%" border="0" cellspacing="1">
	   <tr>
<?php /************** 111111111111111111 Open Open *****************/ ?>		  
	    <td class="tdl" style="font-weight:bold;font-size:14px;width:55%;color:#FFFFFF;">&nbsp;
	    <font color="#DDDD00">Code: </font><?php echo $res['EmpCode']; ?>&nbsp;&nbsp;&nbsp;
	    <font color="#DDDD00">Name: </font><?php echo $res['Fname'].' '.$res['Sname'].' '.$res['Lname']; ?>&nbsp;&nbsp;&nbsp;
		<font color="#DDDD00">Department: </font><?php echo $res['DepartmentCode']; ?>&nbsp;&nbsp;&nbsp;
	    <?php if($res['DepartmentId']==6){ echo '<span style="cursor:pointer;" onClick="FunTgtAch('.$res['EmployeeID'].','.$YearId.')"><font color="#C6FFFF">{ <u>Tgt/Ach</u> }</span>'; }else{echo '';} ?></td>
<?php /************** 111111111111111111 Close Close *****************/ ?>	

<?php /************** 222222222222222222 Open Open *****************/ ?>
<?php /************** 222222222222222222 Open Open *****************/ ?>			   
        <td class="tdl" style="font-weight:bold;font-size:14px;width:35%;text-align:right;color:#FFFFFF;">
	    <?php $sqlMax = mysql_query("SELECT MAX(SalaryChange_Date) as SalaryChDate FROM hrm_pms_appraisal_history where EmpCode=".$res['EmpCode']." AND SalaryChange_Date!='".$_SESSION['EffDate']."' AND CompanyId=".$CompanyId, $con); 
			  $resMax = mysql_fetch_assoc($sqlMax); 
              $sqlS = mysql_query("SELECT Previous_GrossSalaryPM,TotalProp_GSPM,Incentive FROM hrm_pms_appraisal_history where SalaryChange_Date='".$resMax['SalaryChDate']."' AND EmpCode=".$res['EmpCode']." AND CompanyId=".$CompanyId, $con); $resS = mysql_fetch_assoc($sqlS); $TPreGross=$resS['TotalProp_GSPM'];
			  $TPreCtc=$res['EmpCurrCtc']; ?> 	   
	     <input type="hidden" id="GS_<?php echo $sno; ?>" value="<?php echo $TPreGross; ?>" />
		 <input type="hidden" id="Ctc_<?php echo $sno; ?>" value="<?php echo $TPreCtc; ?>" />		

<?php  
/**************** aaa bbbb cccc ********************/ 
/**************** aaa bbbb cccc ********************/
$DJ=$res['DateJoining']; $CuDate=$Prev_From_EffDate; $diff = abs(strtotime($CuDate) - strtotime($DJ));  
$daysDJ = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24)); 
if($res['Hod_TotalFinalRating']>0){ $RatingHod=$res['Hod_TotalFinalRating']; } 
else{ $RatingHod=$res['Reviewer_TotalFinalRating']; } 

$ss0= mysql_query("SELECT IncDistriFrom,IncDistriTo FROM hrm_pms_increment_disbuc WHERE Rating=".$RatingHod." AND HodId=".$EmployeeId." AND DeptId=".$res['HR_Curr_DepartmentId']." AND BUCId=".$res['EmpVertical']." AND YearId=".$_SESSION['PmsYId']." AND IncDistriFrom>0 AND CompanyId=".$CompanyId, $con); $rr0=mysql_num_rows($ss0);
if($rr0>0){ $resMaxMin = mysql_fetch_assoc($ss0); }
else
{ 
 $ss= mysql_query("SELECT IncDistriFrom,IncDistriTo FROM hrm_pms_increment_disrev WHERE Rating=".$RatingHod." AND HodId=".$EmployeeId." AND (RevId=".$res['Appraiser_EmployeeID']." OR RevId=".$res['Reviewer_EmployeeID'].") AND YearId=".$_SESSION['PmsYId']." AND IncDistriFrom>0 AND CompanyId=".$CompanyId, $con); $rr=mysql_num_rows($ss);
 if($rr>0){ $resMaxMin = mysql_fetch_assoc($ss); }
 else
 {
  $ss1= mysql_query("SELECT IncDistriFrom,IncDistriTo FROM hrm_pms_increment_disdept WHERE Rating=".$RatingHod." AND HodId=".$EmployeeId." AND DeptId=".$res['HR_Curr_DepartmentId']." AND YearId=".$_SESSION['PmsYId']." AND IncDistriFrom>0 AND CompanyId=".$CompanyId, $con); $rr1=mysql_num_rows($ss1);
  if($rr1>0){ $resMaxMin = mysql_fetch_assoc($ss1); }
  else
  {
   $ss2= mysql_query("SELECT IncDistriFrom,IncDistriTo FROM hrm_pms_increment_dishod2 WHERE Rating=".$RatingHod." AND HodId=".$EmployeeId." AND Hod2Id=".$res['Rev2_EmployeeID']." AND YearId=".$_SESSION['PmsYId']." AND IncDistriFrom>0 AND CompanyId=".$CompanyId, $con); 
   $rr2=mysql_num_rows($ss2);
   if($rr2>0){ $resMaxMin = mysql_fetch_assoc($ss2); }
   else
   {
    $ss3= mysql_query("SELECT IncDistriFrom,IncDistriTo FROM hrm_pms_increment_dishod WHERE Rating=".$RatingHod." AND HodId=".$EmployeeId." AND YearId=".$_SESSION['PmsYId']." AND IncDistriFrom>0 AND CompanyId=".$CompanyId, $con);
	$rr3=mysql_num_rows($ss3);
    if($rr3>0){ $resMaxMin = mysql_fetch_assoc($ss3); }
	else
    {
     $sqlMaxMin= mysql_query("SELECT IncDistriFrom,IncDistriTo FROM hrm_pms_increment_dis WHERE Rating=".$RatingHod." AND YearId=".$_SESSION['PmsYId']." AND CompanyId=".$CompanyId, $con); $resMaxMin = mysql_fetch_assoc($sqlMaxMin); 
    } //$ss3	
   } //$ss2
  } //$ss1
 } //$ss
} //$ss0  
/**************** aaa bbbb cccc ********************/ 
/**************** aaa bbbb cccc ********************/  
   
 
//$sqlMaxMin= mysql_query("SELECT IncDistriFrom,IncDistriTo FROM hrm_pms_increment_dis WHERE Rating=".$RatingHod." AND YearId=".$YearId." AND CompanyId=".$CompanyId, $con); $resMaxMin = mysql_fetch_assoc($sqlMaxMin); 
					 
/**(1)************************* If Allow Minimum/Maximum *************************/
if($daysDJ>=180){ $Min=($TPreCtc*$resMaxMin['IncDistriFrom'])/100; }else{ $Min=($TPreCtc*5)/100; } 
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

  $EffDM=date("m-d",strtotime($_SESSION['EffDate']));                             // $_SESSION['EffDate']=2018-01-01  
  $MinMD=date("m-d",strtotime($Prev_From_EffDate));                    // $Prev_From_EffDate=2018-12-31, $MinMD=12-31 
  $ExtraOneD=date("Y-m-d",strtotime('+1 day', strtotime($_SESSION['AllowDoj'])));  // $_SESSION['AllowDoj']=2018-06-30
                                                                                   // $ExtraOneD=2018-07-01
  $ExtraOneMD=date("m-d",strtotime($ExtraOneD));                                   //07-01
  $PrvY=date("Y",strtotime($_SESSION['AllowDoj']));                                //2018
  $PrvMD=date("m-d",strtotime($_SESSION['AllowDoj']));                             //06-30
  $cY=$PrvY; $pY=$PrvY-1;                                              //$cY=date("Y"); $pY=date("Y")-1; $cY=2018, $pY=2017
	
  //Joining<=2017-06-30 
  if($res['DateJoining']<=$pY.'-'.$PrvMD AND $RatingHod>0)  //if($res['DateJoining']<=$pY.'-03-31' AND $RatingHod>0)
  {
   $TotIncAmt=($TPreCtc*$resMaxMin['IncDistriFrom'])/100;
   $NewGrossAmt=10*(ceil(($TPreCtc+$TotIncAmt)/10)); 
   $NewGrossAmt2=$TPreCtc+$TotIncAmt;
   $TotInc2=0;
  }	 
                    
  //New--> Dj>=2017-07-01 AND Dj<=2018-06-30  
  
  //Joining>=2017-07-01 AND Joining<=2018-06-30					
  elseif($res['DateJoining']>=$pY.'-'.$ExtraOneMD AND $res['DateJoining']<=$cY.'-'.$PrvMD AND $RatingHod>0)
  {
   $sqlCorr=mysql_query("SELECT MAX(SalaryChange_Date) as SalaryChDate FROM hrm_pms_appraisal_history where EmpCode=".$res['EmpCode']." AND CompanyId=".$CompanyId." AND Previous_GrossSalaryPM!=".$resS['TotalProp_GSPM']." AND SalaryChange_Date>='".$res['DateJoining']."'", $con); $resCorr=mysql_fetch_assoc($sqlCorr);  
   $sqlCk1 = mysql_query("SELECT Previous_GrossSalaryPM,TotalProp_GSPM FROM hrm_pms_appraisal_history where SalaryChange_Date='".$res['DateJoining']."' AND EmpCode=".$res['EmpCode']." AND CompanyId=".$CompanyId, $con); 
   $sqlCk2 = mysql_query("SELECT Previous_GrossSalaryPM,TotalProp_GSPM FROM hrm_pms_appraisal_history where SalaryChange_Date='".$resCorr['SalaryChDate']."' AND EmpCode=".$res['EmpCode']." AND CompanyId=".$CompanyId, $con); 
   $resCk1=mysql_fetch_assoc($sqlCk1); $resCk2=mysql_fetch_assoc($sqlCk2);
   
  
   //Joining>=2017-07-01 AND Joining<=2017-12-31 -->New
   if($res['DateJoining']>=$pY.'-'.$ExtraOneMD AND $res['DateJoining']<=$pY.'-'.$MinMD AND $RatingHod>0)
   {
     $TotIncAmt=($TPreCtc*$resMaxMin['IncDistriFrom'])/100;
     $NewGrossAmt=10*(ceil(($TPreCtc+$TotIncAmt)/10)); 
     $NewGrossAmt2=$TPreCtc+$TotIncAmt;
	 
	 $date11 = new DateTime($res['DateJoining']); $date22 = new DateTime($pY.'-'.$MinMD);
     $interval = date_diff($date22, $date11);
     $YY=$interval->format('%y');  $MM=$interval->format('%m');  $DD=$interval->format('%d');
	 $PerM2=$resMaxMin['IncDistriFrom']/12;  $PerD2=$PerM2/30;
	 $Month_Per2=round($PerM2*$MM, 3); $Day_Per2=round($PerD2*$DD, 3);
	 $MSal2=($TPreCtc*$Month_Per2)/100; 
	 $DSal2=($TPreCtc*$Day_Per2)/100; 
	 $TotInc2=round($MSal2+$DSal2);  //Extra 
   }                               
   //Joining>=2018-01-01 AND Dj<=2018-06-30 -->New
   elseif($res['DateJoining']>=$cY.'-'.$EffDM AND $res['DateJoining']<=$cY.'-'.$PrvMD AND $RatingHod>0)
   {
    
    if($resCorr>0 AND $resCk2['TotalProp_GSPM']>$resCk1['TotalProp_GSPM'])
	{ //If mid-term increment $date1 = new DateTime($resCorr['SalaryChDate']);
	$date1 = new DateTime($res['DateJoining']); } 
	else{ $date1 = new DateTime($res['DateJoining']); }
    $date2 = new DateTime($cY."-".$MinMD); //$PrvMD
    $interval = date_diff($date2, $date1);
    $Y=$interval->format('%y');  $M=$interval->format('%m');  $D=$interval->format('%d');
    $PerM=$resMaxMin['IncDistriFrom']/12;  $PerD=$PerM/30;
    $Month_Per=round($PerM*$M, 3); $Day_Per=round($PerD*$D, 3);
    $MSal=($TPreCtc*$Month_Per)/100; 
    $DSal=($TPreCtc*$Day_Per)/100; 
    $TotInc=round($MSal+$DSal);
    $NewGrossAmt=10*(ceil(($TPreCtc+$TotInc)/10)); 
    $NewGrossAmt2=$TPreCtc+$TotInc; 
	$TotInc2=0; //Not Extra                      
   }
        
  }
  else
  {
   $NewGrossAmt=10*(ceil($TPreCtc/10)); 
   $NewGrossAmt2=$TPreCtc; 
   $TotInc2=0; //Not Extra                       
  }
  
  if($TotInc2>0){$ActualNewGS=10*(ceil(($NewGrossAmt2+$TotInc2)/10));}
  else{$ActualNewGS=10*(ceil(($NewGrossAmt+$TotInc2)/10));}
  
  if($MaxVCtc>0 AND $ActualNewGS>$MaxVCtc){ $ActualNewGS=$TPreCtc; $OverMsg="CTC Amount Crossed Maximum Limit"; }
  else{ $ActualNewGS=$ActualNewGS; $OverMsg=''; }
  
/**(3)************************* If Prorata wise New Close Close Close Close Close **************************/
$Extra_3Month=0;    
?> 
<input type="hidden" id="OverMsg<?php echo $sno;?>" value="<?php echo $OverMsg;?>"/>
<input type="hidden" id="Doj<?php echo $sno;?>" value="<?php echo date("m/d/Y",strtotime($res['DateJoining']));?>"/>
<input type="hidden" id="Extra3Month<?php echo $sno; ?>" value="<?php echo $Extra_3Month;?>"/>

<input type="hidden" id="ActualPer_Gross_<?php echo $sno; ?>" value="<?php if($resMaxMin['IncDistriFrom']!=''){ echo $resMaxMin['IncDistriFrom']; } else {echo 0;} ?>"/><input type="hidden" id="CtcNewGross_<?php echo $sno; ?>" value="<?php echo $ActualNewGS; ?>"/><input type="hidden" id="MinV_<?php echo $sno; ?>" value="<?php echo $OkMin; ?>"/><input type="hidden" id="MaxV_<?php echo $sno; ?>" value="<?php echo $OkMax; ?>"/> 

<font color="#000000"><span class="blink_me"><?php echo $OverMsg; ?></span></font>
&nbsp;&nbsp;
<?php if($MaxVCtc>0){?>
<font color="#000000">[<?php echo 'Min:&nbsp;'.floatval($resVer['Min_Ctc']).' - Max:&nbsp;'.floatval($resVer['Max_Ctc']); ?>]</font>
&nbsp;&nbsp;
<?php } ?>
<font color="#DDDD00">Proposed CTC : <!--Gross Salary Per Month--></font>&nbsp;<font color="#FFFFFF"><?php echo $ActualNewGS; ?></font>&nbsp;&nbsp; 			  
              
<?php /*<font color="#DDDD00">Proposed Gross Salary Per Month:</font>&nbsp;<font color="#FFCEE7">Minimum</font>-<font color="#FFFFFF"><?php echo $OkMin; ?></font>&nbsp;<font color="#FFCEE7">Maximum</font>- <font color="#FFFFFF"><?php echo $OkMax; ?></font>*/ ?>
               </td>
<?php /************** 222222222222222222 Close Close *****************/ ?>	
<?php /************** 222222222222222222 Close Close *****************/ ?>
 
			  </tr>
			 </table>
			</td>
			<td colspan="2" align="center">
			<input type="button" id="FinalSubmit_<?php echo $sno; ?>" onClick="return FinalSubmit(<?php echo $sno.','.$res['EmpPmsId'].','.$res['EmployeeID']; ?>)" value="Final Submit" <?php if($res['Hod_GrossMonthlySalary']==0 OR $res['Hod_GrossMonthlySalary']==0.00 OR $res['HodSubmit_IncStatus']==2) { echo 'disabled'; } ?>  /></td>
		  </tr>			
		  
		  <tr>
		   <td rowspan="2" class="th" style="width:3%;"><b>Pre. Grade</b></td>
		   <td rowspan="2" class="th" style="width:3%;"><b>Pro. Grade</b></td>
		   <td rowspan="2" class="th" style="width:15%;"><b>Previouse Designation</b></td>
		   <td rowspan="2" class="th" style="width:15%;"><b>Proposed Designation</b></td>
		   <td rowspan="2" class="th" style="width:6%;"><b>Change<br>Date</b></td>
		   <!--<td rowspan="2" class="th" style="width:4%;"><b>&nbsp;</b></td>-->		
		   <td class="th" colspan="<?php if($TotInEM>0){echo 7;}else{echo 5;}?>">Gross Salary Per Month</td>
		   <?php /************************ CTC Open ***********/?>
		   <td class="th" colspan="6">CTC</td>
		   <?php /************************ CTC Close ***********/?>
		   <td rowspan="2" class="th" style="width:3%;"><b>Score</b></td>
		   <td rowspan="2" class="th" style="width:3%;"><b>Rating</b></td>
		  </tr>
		  
		  <tr bgcolor="#7a6189">
		     <td class="th" style="width:5%;"><b>Previous</b></td>			  
		     <td class="th" style="width:5%;"><b>Proposed</b></td>
		     <!--<td class="th" style="width:5%;"><b>% PIS</b></td>-->
		     <td class="th" style="width:4%;"><b>Correc<br>tion</b></td>
		     <td class="th" style="width:5%;"><b>Total<br>Proposed</b></td>
		     <td class="th" style="width:4%;"><b>Total<br>(%)</b></td>
           <?php if($TotInEM>0) { ?>
             <td class="th" style="width:5%;"><b>IN-<br>CENTIVE</b></td>
             <td class="th" style="width:5%;"><b>Total<br>Pay PM</b></td>
           <?php } ?>	
		      
			 <?php /************************ CTC Open ***********/?> 
		   	 <td class="th" style="width:6%;"><b>Previous<br>CTC</b></td>			  
		     <td class="th" style="width:6%;"><b>Proposed<br>CTC</b></td>
		     <td class="th" style="width:4%;"><b>Proposed<br>(%)</b></td>
		     <td class="th" style="width:5%;"><b>CTC<br>Correction</b></b></td>
		     <td class="th" style="width:6%;"><b>Total<br>Proposed</b></td>
		     <td class="th" style="width:4%;"><b>Total<br>(%)</b></td>	  
		     <?php /************************ CTC Close ***********/?>
			</tr>
			
            <?php $sqlHistory=mysql_query("select * from hrm_pms_appraisal_history where EmpCode=".$res['EmpCode']." AND CompanyId=".$CompanyId." AND SalaryChange_Date<='".date("2011-12-31")."' order by SalaryChange_Date ASC", $con); while($resHistory=mysql_fetch_array($sqlHistory)){ if($resHistory['Previous_GrossSalaryPM']!=$resHistory['TotalProp_GSPM']){ ?>			
			<tr bgcolor="#FFFFFF" height="20px;">
			 <td class="tdc"><?php echo $resHistory['Current_Grade']; ?></td>
		     <td class="tdc"><?php echo $resHistory['Proposed_Grade']; ?></td>
		     <td class="tdl"><?php echo strtoupper($resHistory['Current_Designation']); ?></td>
		     <td class="tdl"><?php echo strtoupper($resHistory['Proposed_Designation']); ?></td>
		     <td class="tdc"><?php echo date("d-M-y",strtotime($resHistory['SalaryChange_Date'])); ?></td>
		     <?php /*?><td class="tdc">&nbsp;</td>
		     <td class="tdc"><?php echo ''; ?></td><?php */?>		  
		     <td class="tdc"><?php echo ''; ?></td>
		     <td class="tdc"><?php echo ''; ?></td>
		     <td class="tdr"><?php echo ''; ?></td>
	         <td class="tdr"><?php echo floatval($resHistory['Previous_GrossSalaryPM']); //$resHistory['TotalProp_GSPM'];?>&nbsp;</td>
             <td class="tdc"><?php echo $resHistory['Prop_PeInc_GSPM']; //$resHistory['TotalProp_PerInc_GSPM'];?></td>
           <?php if($TotInEM>0){ $TotalPay=$resHistory['Previous_GrossSalaryPM']+$resHistory['Incentive']; ?>
             <td class="tdr"><?php echo floatval($resHistory['Incentive']); ?>&nbsp;</td>
             <td class="tdr"><?php echo number_format($TotalPay, 2, '.', ''); ?>&nbsp;</td>
		   <?php } ?>	
		     
			 <?php /************************ CTC Open ***********/?>
			 <td class="tdr"><?php echo ''; ?></td>
		     <td class="tdr"><?php echo ''; ?></td>
		     <td class="tdc"><?php echo ''; ?></td>
			 <td class="tdr"><?php echo ''; ?></td>
		     <td class="tdr"><?php echo ''; ?></td>
		     <td class="tdc"><?php echo ''; ?></td>
			 <?php /************************ CTC Close ***********/?>
		   		  
		     <td class="tdc"><?php echo $resHistory['Score']; ?></td>
		     <td class="tdc"><?php echo $resHistory['Rating']; ?></td>
			</tr>
           <?php } } ?>	
						
            <?php $sqlHistory=mysql_query("select * from hrm_pms_appraisal_history where EmpCode=".$res['EmpCode']." AND CompanyId=".$CompanyId." AND SalaryChange_Date>='".date("2012-01-01")."' AND SalaryChange_Date!='".date("Y-10-01")."' order by SalaryChange_Date ASC", $con); $rowHis=mysql_num_rows($sqlHistory); 
			while($resHistory=mysql_fetch_array($sqlHistory))
			{  
			  $sctc=mysql_query("select Tot_CTC,Status from hrm_employee_ctc where EmployeeID=".$res['EmployeeID']." AND (CtcCreatedDate='".$resHistory['SalaryChange_Date']."' OR SalChangeDate='".$resHistory['SalaryChange_Date']."')",$con); 
			  $rctc=mysql_fetch_assoc($sctc); 
			  if($rctc['Tot_CTC']>0 AND $rctc['Tot_CTC']!='')
			  { 
			  
			   if($resHistory['Previous_GrossSalaryPM']!=$resHistory['TotalProp_GSPM'] OR $rctc['Status']=='A')
			   {
			  
			  
			  ?>			
			<tr bgcolor="#FFFFFF" height="20px;">
			 <td class="tdc"><?php echo $resHistory['Current_Grade']; ?></td>
		     <td class="tdc"><?php echo $resHistory['Proposed_Grade']; ?></td>
		     <td class="tdl"><?php echo strtoupper($resHistory['Current_Designation']); ?></td>
		     <td class="tdl"><?php echo strtoupper($resHistory['Proposed_Designation']); ?></td>
		     <td class="tdc"><?php echo date("d-M-y",strtotime($resHistory['SalaryChange_Date'])); ?></td>
		     <!--<td class="tdc">&nbsp;</td>-->
		     <td class="tdr" align="right"><?php echo floatval($resHistory['Previous_GrossSalaryPM']); ?>&nbsp;</td>			
		     <td class="tdr" align="right"><?php echo floatval($resHistory['Proposed_GrossSalaryPM']); ?>&nbsp;</td>
		     <?php /*?><td class="tdc"><?php echo $resHistory['Prop_PeInc_GSPM']; ?></td><?php */?>
		     <td class="tdr" align="right"><?php echo floatval($resHistory['PropSalary_Correction']); ?>&nbsp;</td>
		     <td class="tdr" align="right"><?php echo floatval($resHistory['TotalProp_GSPM']); ?>&nbsp;</td>
		     <td class="tdc"><?php echo $resHistory['TotalProp_PerInc_GSPM']; ?></td>
           <?php if($TotInEM>0) { ?>
             <td class="tdr"><?php echo floatval($resHistory['Incentive']); ?>&nbsp;</td>
             <?php $TotalPay=$resHistory['TotalProp_GSPM']+$resHistory['Incentive']; ?>
             <td class="tdr"><?php echo number_format($TotalPay, 2, '.', ''); ?>&nbsp;</td>
		   <?php } ?>	
		   
		     <?php /************************ CTC Open ***********/?>
			 
			 <td class="tdr"><?php echo floatval($rctc['Tot_CTC']); ?>&nbsp;</td>
		     <td class="tdr"><?php echo ''; ?></td>
		     <td class="tdc"><?php echo ''; ?></td>
			 <td class="tdr"><?php echo ''; ?></td>
		     <td class="tdr"><?php echo ''; ?></td>
		     <td class="tdc"><?php echo ''; ?></td>
			 <?php /************************ CTC Close ***********/?>
		   		  
		     <td class="tdc"><?php echo $resHistory['Score']; ?></td>
		     <td class="tdc"><?php echo $resHistory['Rating']; ?></td>
			</tr>
            <?php }  //if($resHistory['Previous_GrossSalaryPM']!=$resHistory['TotalProp_GSPM'] OR $rctc['Status']!='A')
			   }   ////if($rctc['Tot_CTC']>0 AND $rctc['Tot_CTC']!='') 
			} //while($resHistory=mysql_fetch_array($sqlHistory))
			
			?>	

<?php //$_SESSION['EffDate'] -->Salary Change Date
            $sqlHi2=mysql_query("select * from hrm_pms_appraisal_history INNER JOIN hrm_employee ON (hrm_pms_appraisal_history.EmpCode=hrm_employee.EmpCode AND hrm_pms_appraisal_history.CompanyId=hrm_employee.CompanyId) where hrm_employee.EmployeeID=".$res['EmployeeID']." AND hrm_employee.CompanyId=".$CompanyId." AND SalaryChange_Date='".$_SESSION['EffDate']."'", $con); $rowHi2=mysql_num_rows($sqlHi2);
            $sqlChh=mysql_query("select * from hrm_pms_allow_inc where EmployeeID=".$res['EmployeeID']." AND CompanyId=".$CompanyId." AND AssesmentYear=".$YearId, $con); $rowChh=mysql_num_rows($sqlChh); 
            $sqlGr=mysql_query("select GradeValue from hrm_grade where GradeId=".$res['HR_CurrGradeId'], $con);
			$sqlGrH=mysql_query("select GradeValue from hrm_grade where GradeId=".$res['Hod_EmpGrade'], $con); 
			$resGr=mysql_fetch_assoc($sqlGr); $resGrH=mysql_fetch_assoc($sqlGrH);
			$sqlD1=mysql_query("select DesigName from hrm_designation where DesigId=".$res['HR_CurrDesigId'], $con);
			$sqlD2=mysql_query("select DesigName from hrm_designation where DesigId=".$res['Hod_EmpDesignation'], $con); 
			$resD1=mysql_fetch_assoc($sqlD1); $resD2=mysql_fetch_assoc($sqlD2);
		    
		    if($CompanyId==1 OR $CompanyId==2 OR $CompanyId==3 OR $CompanyId==4){ /*Check Open*/ ?>
            <tr bgcolor="#FFFFFF">						
			 <td class="tdc"><?php echo $resGr['GradeValue']; ?></td>
		     <td class="tdc" bgcolor="#B9FFB9"><?php if($res['HR_CurrGradeId']!=$res['Hod_EmpGrade'] AND $res['Hod_EmpGrade']>0){ echo $resGrH['GradeValue']; } ?></td>
             <td class="tdc"><input class="tdll" style="border-style:hidden;border:0;width:100%;" value="<?php echo $resD1['DesigName'];?>"/></td>	
		     <td class="tdc"><input class="tdll" style="border-style:hidden;border:0;background-color:#B9FFB9;width:100%;" value="<?php if($res['HR_CurrDesigId']!=$res['Hod_EmpDesignation']){ echo $resD2['DesigName']; } ?>" /></td>
		     <td class="tdc"><b><?php echo date("d-M-y",strtotime($_SESSION['EffDate'])); //$SalChDate; ?></b></td>
		     
			 <?php /*
			 <td class="tdc">
			 <?php if($res['HodSubmit_IncStatus']!=2) { ?>
			 <SPAN id="SpanEdit_<?php echo $sno; ?>"><img src="images/edit.png" border="0" id="Editbtn<?php echo $sno;?>" onClick="return ClickEdit(<?php echo $sno.', '.$res['EmployeeID'].', '.$rowChh; ?>)"/></SPAN>
	         <SPAN id="SpanEditSave_<?php echo $sno; ?>" style="display:none;"><img src="images/Floppy-Small-icon.png" border="0" id="Savebtn<?php echo $sno;?>" onClick="CalProInc(<?php echo $sno; ?>); return ClickSaveEdit(<?php echo $sno.','.$res['EmpPmsId'].','.$res['EmployeeID'].','.$CompanyId.','.$_SESSION['PmsYId'].','.$EmployeeId; ?>)"></SPAN>
			 <?php } ?> 	  
			 </td>
			 */ ?>
			 <td class="tdrr"><b><?php echo floatval($TPreGross); ?></b>&nbsp;</td>
		     <td class="tdc" bgcolor="#B9FFB9" id="TDD1_<?php echo $sno; ?>"><input id="ProGSPM_<?php echo $sno; ?>" class="tdrr" style="border-style:hidden;border:0;background-color:#B9FFB9;width:100%;text-align:right; padding-right:2px;" value="<?php echo floatval($res['Hod_ProIncSalary']); ?>" maxlength="15" <?php if($rowChh>0){ echo 'readonly'; }else{ echo 'readOnly'; }?> onKeyUp="CalProInc(<?php echo $sno; ?>)" onClick="CalProInc(<?php echo $sno; ?>)" onChange="CalProInc(<?php echo $sno; ?>)" onKeyPress="return isNumberKey(event)"/></td>
		     
			 <?php /*?><td class="tdc" bgcolor="#B9FFB9"><input id="Per_ProGSPM_<?php echo $sno; ?>" class="tdcc" style="border-style:hidden;border:0;background-color:#B9FFB9;width:100%;" value="<?php echo $res['Hod_Percent_ProIncSalary']; ?>" readOnly maxlength="12"/></td><?php */?>
			 
			 <input type="hidden" id="Per_ProGSPM_<?php echo $sno; ?>" class="tdcc" style="border-style:hidden;border:0;background-color:#B9FFB9;width:100%;" value="<?php echo $res['Hod_Percent_ProIncSalary']; ?>" readOnly maxlength="12"/>
			 
		     <td class="tdc" bgcolor="#B9FFB9" id="TDD2_<?php echo $sno; ?>"><input id="ProSC_<?php echo $sno; ?>" class="tdrr" style="border-style:hidden;border:0;background-color:#B9FFB9;width:100%;text-align:right;padding-right:2px;" value="<?php echo floatval($res['Hod_ProCorrSalary']); ?>" <?php if($rowChh>0){ echo 'readonly'; }else{ echo 'readonly'; }?>  maxlength="15" onKeyUp="CalProInc(<?php echo $sno; ?>)" onClick="CalProInc(<?php echo $sno; ?>)" onChange="CalProInc(<?php echo $sno; ?>)" onKeyPress="return isNumberKey(event)"/></td>
		     <td class="tdc" bgcolor="#B9FFB9"><input id="TotalProGSPM_<?php echo $sno; ?>" class="tdrr" style="border-style:hidden; border:0; background-color:#B9FFB9;width:100%;text-align:right; padding-right:2px;" value="<?php echo floatval($res['Hod_GrossMonthlySalary']); ?>" readOnly maxlength="15"/></td>
		     <td class="tdc" bgcolor="#B9FFB9"><input type="hidden" id="Per_TotalProGSPM_<?php echo $sno; ?>" class="tdcc" style="border-style:hidden; border:0; background-color:#B9FFB9;color:#B9FFB9;width:100%;" value="<?php echo $res['Hod_Percent_IncNetMonthalySalary']; ?>" readOnly maxlength="15"/>
  <input type="hidden" id="UpDesigId_<?php echo $sno; ?>" value="<?php echo $res['HR_CurrDesigId']; ?>" />			  
  <input type="hidden" value="" id="Cal_MinGSV<?php echo $sno; ?>" />
  <input type="hidden" value="" id="Cal_MinCtcSV<?php echo $sno; ?>" />
  <input type="hidden" value="<?php echo $res['Hod_Percent_ProCorrSalary'];?>" id="Per_SalaryCorr<?php echo $sno;?>"/> 
  <input type="hidden" value="<?php echo $res['Hod_IncNetMonthalySalary'];?>" id="IncSalaryPM<?php echo $sno;?>"/>
  <input type="hidden" value="<?php echo $res['Hod_GrossAnnualSalary'];?>" id="TotalAnnualSalary<?php echo $sno;?>"/> 
  <input type="hidden" value="<?php echo $res['HodPer_PIS_From_PreMyTGrossPM'];?>" id="HodMyTeamPIS<?php echo $sno;?>"/>
  <input type="hidden" value="<?php echo $res['HodPer_SC_From_PreMyTGrossPM'];?>" id="HodMyTeamSC<?php echo $sno;?>"/> 
  <input type="hidden" value="<?php echo $res['HodPer_TISPM_From_PreMyTGrossPM'];?>" id="HodMyTeamTISPM<?php echo $sno;?>"/>
  <input type="hidden" value="<?php echo $res['HodSubmit_IncStatus'];?>" id="HodPmsSts<?php echo $sno;?>"/> 
	         </td>
			 <?php if($TotInEM>0){ $TotpayEmp=$res['Hod_GrossMonthlySalary']+$res['Hod_Incentive']; ?>
			 <td class="tdr">
			 <?php if($res['INCENTIVE']=='Y') { ?><input class="tdrr" style="border-style:hidden;border:0;background-color:#B9FFB9;width:100%;text-align:right;" id="EmpInctv<?php echo $sno; ?>" value="<?php echo $res['Hod_Incentive']; ?>" maxlength="15" onKeyUp="CalProInc(<?php echo $sno; ?>)" onClick="CalProInc(<?php echo $sno; ?>)" onChange="CalProInc(<?php echo $sno; ?>)" disabled/><?php } ?></td>
              <td class="tdr"><?php if($res['INCENTIVE']=='Y') { ?><input class="tdrr" style="border-style:hidden;border:0;background-color:#B9FFB9;width:100%; height:20px;text-align:right;" id="TotalPay<?php echo $sno; ?>" value="<?php echo number_format($TotpayEmp, 2, '.', ''); ?>" maxlength="15" readonly/>
<?php } ?></td><?php } ?> 

             <?php /************************ CTC Open ***********/?>
			 <?php /************************ CTC Open ***********/?>
			 <td class="tdrr"><b><?php echo floatval($res['EmpCurrCtc']); ?></b>&nbsp;</td><!--CTC-->
		     <td class="tdc" bgcolor="#B9FFB9" id="TDD1_<?php echo $sno; ?>"><input id="CtcProGSPM_<?php echo $sno; ?>" class="tdrr" style="border-style:hidden;border:0;background-color:#B9FFB9;width:100%;text-align:right; padding-right:2px;" value="<?php echo floatval($res['Hod_ProIncCTC']); ?>" maxlength="15" <?php if($rowChh>0){ echo ''; }else{ echo 'disabled'; echo 'readOnly'; }?> onKeyUp="CalProInc(<?php echo $sno; ?>)" onClick="CalProInc(<?php echo $sno; ?>)" onChange="CalProInc(<?php echo $sno; ?>)" onKeyPress="return isNumberKey(event)"/></td><!--Proposed CTC-->
			 
		     <td class="tdc"><input id="CtcPer_ProGSPM_<?php echo $sno; ?>" class="tdcc" style="border-style:hidden;border:0;background-color:#B9FFB9;width:100%;" value="<?php echo $res['Hod_Percent_ProIncCTC']; ?>" readOnly maxlength="12"/></td><!--(%) Proposed CTC-->
			 <td class="tdc" bgcolor="#B9FFB9" id="TDD1_<?php echo $sno; ?>"><input id="CtcProSC_<?php echo $sno; ?>" class="tdrr" style="border-style:hidden;border:0;background-color:#B9FFB9;width:100%;text-align:right;padding-right:2px;" value="<?php echo floatval($res['Hod_ProCorrCTC']); ?>" <?php if($rowChh>0){ echo ''; }else{ echo 'disabled'; }?>  maxlength="15" onKeyUp="CalProInc(<?php echo $sno; ?>)" onClick="CalProInc(<?php echo $sno; ?>)" onChange="CalProInc(<?php echo $sno; ?>)" onKeyPress="return isNumberKey(event)"/></td><!--CTC Correction-->
			 
		     <td class="tdc"><input id="CtcTotalProGSPM_<?php echo $sno; ?>" class="tdrr" style="border-style:hidden; border:0; background-color:#B9FFB9;width:100%;text-align:right; padding-right:2px;" value="<?php echo floatval($res['Hod_Proposed_ActualCTC']); ?>" readOnly maxlength="15"/></td><!--Total Proposed CTC-->
			 
		     <td class="tdc"><input id="CtcPer_TotalProGSPM_<?php echo $sno; ?>" class="tdcc" style="border-style:hidden; border:0; background-color:#B9FFB9;width:100%;" value="<?php echo $res['Hod_Percent_IncNetCTC']; ?>" readOnly maxlength="15"/>
			 
  <input type="hidden" value="<?php echo $res['Hod_Percent_ProCorrCTC'];?>" id="CtcPer_SalaryCorr<?php echo $sno;?>"/> 
  <input type="hidden" value="<?php echo $res['Hod_IncNetCTC'];?>" id="CtcIncSalaryPM<?php echo $sno;?>"/>
			 
			 </td><!--(%) Total Proposed CTC-->
			 <?php /************************ CTC Close ***********/?> 
             <?php /************************ CTC Close ***********/?> 
			 

		      <td bgcolor="#B9FFB9" class="tdc"><input class="tdcc" style="border-style:hidden;border:0;background-color:#B9FFB9;width:100%;" value="<?php if($res['Hod_TotalFinalScore']>0) {echo $res['Hod_TotalFinalScore']; } else {echo $res['Reviewer_TotalFinalScore'];} ?>" readOnly/></td>
		      <td bgcolor="#B9FFB9" class="tdc"><input style="border-style:hidden;border:0;background-color:#B9FFB9;width:100%;" class="tdcc" value="<?php  if($res['Hod_TotalFinalRating']>0){echo $res['Hod_TotalFinalRating']; } else {echo $res['Reviewer_TotalFinalRating'];} ?>" readOnly/></td>
			 </tr>
             <?php } /*Check Close*/?>

            <?php 
			 //$MyTTIncGrossPercent=$res['Hod_IncNetMonthalySalary']/$OnePerPre; 
			 //$MyTTIGP=number_format($MyTTIncGrossPercent, 2, '.', '');
			?>			
			<tr style="height:22px;">
			
			<td class="td3" colspan="10" bgcolor="#FFFFFF" style="width:100%;font-weight:bold; vertical-align:middle;" align="right">
            <input type="hidden" class="td22" id="IncentivePer<?php echo $sno; ?>" value="0" /> 
			<input type="hidden" class="td22" id="TotIncrement<?php echo $sno; ?>" value="0" />
            <?php /*My Team - Increment */ ?><input type="hidden" class="td22" id="EmpTTIncGross<?php echo $sno; ?>" value="<?php echo $res['Hod_IncNetMonthalySalary']; ?>" /><input type="hidden" class="td22" id="EmpTTIncGrossPercent<?php echo $sno; ?>" value="<?php echo $res['HodPer_TISPM_From_PreMyTGrossPM']; ?>" />
			<?php /*PIS */ ?><input type="hidden" class="td22" id="EmpTTPISPercent<?php echo $sno; ?>" value="<?php echo $res['HodPer_PIS_From_PreMyTGrossPM']; ?>" />
            <?php /*SC */ ?><input type="hidden" class="td22" id="EmpTTSCPercent<?php echo $sno; ?>" value="<?php echo $res['HodPer_SC_From_PreMyTGrossPM']; ?>" />
			</td>
			<td class="td3" bgcolor="#FFFFFF" style="width:5%;font-weight:bold; vertical-align:middle;" align="center">
			<?php if($res['HodSubmit_IncStatus']!=2) { ?>
			 <SPAN id="SpanEdit_<?php echo $sno; ?>"><img src="images/edit.png" border="0" id="Editbtn<?php echo $sno;?>" onClick="return ClickEdit(<?php echo $sno.', '.$res['EmployeeID'].', '.$rowChh; ?>)"/></SPAN>
	         <SPAN id="SpanEditSave_<?php echo $sno; ?>" style="display:none;"><img src="images/Floppy-Small-icon.png" border="0" id="Savebtn<?php echo $sno;?>" onClick="CalProInc(<?php echo $sno; ?>); return ClickSaveEdit(<?php echo $sno.','.$res['EmpPmsId'].','.$res['EmployeeID'].','.$CompanyId.','.$_SESSION['PmsYId'].','.$EmployeeId; ?>)"></SPAN>
			 <?php } ?>
			</td>
			<td colspan="<?php if($TotInEM>0) {?>9<?php } else { ?>7<?php } ?>" class="msg_g" style="font-size:15px;background-color:#FFFFFF;"><i><span id="msg_<?php echo $sno; ?>" style="display:none;">&nbsp;&nbsp;&nbsp;&nbsp;Data save successfully...</span></i><i><span id="msgSub_<?php echo $sno; ?>" style="display:none;">&nbsp;&nbsp;&nbsp;&nbsp;Data submitted successfully...</span></i>
			</td>
		   </tr>		
		  </table>
		  </td>
	    </tr>
<?php $sno++;} $no=$sno-1; echo '<input type="hidden" id="RowNo" value="'.$no.'" />';?> 
     
	    <tr>
	     <td style="text-align:right;">
<?php $sql3=mysql_query("select EmpPmsId from hrm_employee_pms where AssessmentYear=".$_SESSION['PmsYId']." AND HOD_EmployeeID=".$EmployeeId." AND Hod_IncNetMonthalySalary>0 AND HodSubmit_IncStatus=1", $con); $rows2=mysql_num_rows($sql3); 
                  
	   if(($_REQUEST['FilD']=='All' AND $_REQUEST['FilS']=='All') OR ($_REQUEST['FilD']=='' AND $_REQUEST['FilS']==''))
	   { ?>
		<input type="button" style="height:28px;cursor:pointer; background-color:#FF82FF;" id="OneOverAllSubmit" onClick="return OverAllSubmit(<?php echo $_SESSION['PmsYId'].','.$EmployeeId; ?>)" value="Over All Final Submit" <?php if($rows2==0){ echo 'disabled'; }?>/>    
<?php  } ?>	   
	     </td>
	    </tr>
	   </table>
	   </span>		
	   </td>
       <?php //************************************************ Close ******************************// ?>
	   <?php //************************************************ Close ******************************// ?>	  	   
	  </tr>
     </table>
     </td>
    </tr>
   </table>
   </td>
<?php /****************************************** Form Close **************************/ ?>		   
  </tr>
 </table>
 </td>
</tr>
<?php //******************************************** ?>    
  </table>
 </td>
</tr>					
<?php //************************************ Close ************************************* ?>					
				  </table>
				 </td>
			  </tr>
			</table>
           </td>
			  </tr>
	        </table>
<?php //******************************************************************************* ?>
		   </td>
		  </tr>
		</table>
	  </td>
	</tr>
	<tr>
	  <td valign="top">
	    <?php //require_once("../footer.php"); ?>
	  </td>
	</tr>
  </table>
 </td>
</tr>
</table>
</body>
</html>