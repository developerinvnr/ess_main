<?php session_start();
if($_SESSION['login'] = true){require_once('../user/config/config.php');}
include("../function.php");
if(check_user()==false){header('Location:../../../index.php');}
$EmployeeId=$_SESSION['EmployeeID'];
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
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<style> /*background-color:#D9D9FF;  background-color:#EEEEEE; */
.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;}
.SaveButton {background-image:url(images/save.gif); width:20px; height:20px; background-repeat:no-repeat; background-color:#FFFFFF; border-color:#FFFFFF; border-bottom:inherit;}
.EditSelect { font-family:Georgia; font-size:12px; height:18px;}
.EditInput { font-family:Georgia; font-size:12px; height:18px;}
.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}
.InputB{font-size:13px;width:60px;text-align:right;border:0px;font-weight:bold;background-color:#D9D9FF;} 
.Input{font-size:13px;width:60px;text-align:right;border:0px;background-color:#EEEEEE;}
.TInput{font-size:13px;width:60px;text-align:right;border:0px;background-color:#FFFFA6;font-weight:bold;}
.Trh60{text-align:center;width:60px;font-weight:bold;}
</style>
<Script type="text/javascript">//window.history.forward(1);</Script> 
<script type="text/javascript" language="javascript">
function ChangeHq(hq,v,no)
{
  var act=document.getElementById("act").value; //var hq=document.getElementById("hq").value; 
  var q=document.getElementById("q").value; var cc=document.getElementById("cc").value; var di=document.getElementById("di").value;
  var gi=document.getElementById("gi").value; var EHq=document.getElementById("EHq").value; var ii=document.getElementById("ii").value; 
  var fc=document.getElementById("fc").value; var vc=document.getElementById("vc").value;
  var myh=1; var myt=document.getElementById("myt").value;
  window.location="SalesEntry.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&act="+act+"&hq="+hq+"&y="+v+"&q="+q+"&ii="+ii+"&vc="+vc+"&fc="+fc+"&cc="+cc+"&di="+di+"&gi="+gi+'&EHq='+EHq+'&myh='+myh+'&myt='+myt+'&no='+no; 
}

function ChangePerMi(hq,v)
{
  var act=document.getElementById("act").value; //var hq=document.getElementById("hq").value; 
  var q=document.getElementById("q").value; var cc=document.getElementById("cc").value; var di=document.getElementById("di").value;
  var gi=document.getElementById("gi").value; var EHq=document.getElementById("EHq").value; var ii=document.getElementById("ii").value; 
  var fc=document.getElementById("fc").value; var vc=document.getElementById("vc").value;
  var myh=document.getElementById("myh").value; var myt=1;
  window.location="SalesEntryPerMi.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&act="+act+"&hq="+hq+"&y="+v+"&q="+q+"&ii="+ii+"&vc="+vc+"&fc="+fc+"&cc="+cc+"&di="+di+"&gi="+gi+'&EHq='+EHq+'&myh='+myh+'&myt='+myt; 
}

function ChangeItem(ii,v)
{  
  var act=document.getElementById("act").value; var hq=document.getElementById("hq").value; var y=document.getElementById("y").value;
  var q=document.getElementById("q").value; var cc=document.getElementById("cc").value; var di=document.getElementById("di").value;
  var gi=document.getElementById("gi").value; var EHq=document.getElementById("EHq").value; 
  var myh=document.getElementById("myh").value; var myt=document.getElementById("myt").value;
  if(ii==0 && v=='vc'){alert("please select vegitable crop item"); return false;}
  else if(ii==0 && v=='fc'){alert("please select field crop item"); return false;}
  else if(ii>0 && v=='vc'){window.location="SalesEntryMt.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&act="+act+"&hq="+hq+"&y="+y+"&q="+q+"&ii="+ii+"&vc=1&fc=0&cc="+cc+"&di="+di+"&gi="+gi+"&EHq="+EHq+"&myh="+myh+"&myt="+myt; }
  else if(ii>0 && v=='fc'){window.location="SalesEntryMt.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&act="+act+"&hq="+hq+"&y="+y+"&q="+q+"&ii="+ii+"&vc=0&fc=1&cc="+cc+"&di="+di+"&gi="+gi+"&EHq="+EHq+"&myh="+myh+"&myt="+myt; }
  else if(ii=='All_2' && v=='fc'){window.location="SalesEntryMt.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&act="+act+"&hq="+hq+"&y="+y+"&q="+q+"&ii="+ii+"&vc=0&fc=1&cc="+cc+"&di="+di+"&gi="+gi+"&EHq="+EHq+"&myh="+myh+"&myt="+myt; }
}


function ClickAllProd(ii,v)
{
 var act=document.getElementById("act").value; var hq=document.getElementById("hq").value; var y=document.getElementById("y").value;
  var q=document.getElementById("q").value; var cc=document.getElementById("cc").value; var di=document.getElementById("di").value;
  var gi=document.getElementById("gi").value; var EHq=document.getElementById("EHq").value; 
  var myh=document.getElementById("myh").value; var myt=document.getElementById("myt").value;
 if(v=='ac'){window.location="SalesEntryMt.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&act="+act+"&hq="+hq+"&y="+y+"&q="+q+"&ac=1&vc=0&fc=0&cc="+cc+"&di="+di+"&gi="+gi+"&EHq="+EHq+"&myh="+myh+"&myt="+myt+"&ii="+ii; }
}

function ChangeYear(v)
{  
  var act=document.getElementById("act").value; var hq=document.getElementById("hq").value; 
  var q=document.getElementById("q").value; var cc=document.getElementById("cc").value; var di=document.getElementById("di").value;
  var gi=document.getElementById("gi").value; var EHq=document.getElementById("EHq").value; var ii=document.getElementById("ii").value; 
  var fc=document.getElementById("fc").value; var vc=document.getElementById("vc").value;
  var myh=document.getElementById("myh").value; var myt=document.getElementById("myt").value;
  window.location="SalesEntryMt.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&act="+act+"&hq="+hq+"&y="+v+"&q="+q+"&ii="+ii+"&vc="+vc+"&fc="+fc+"&cc="+cc+"&di="+di+"&gi="+gi+"&EHq="+EHq+"&myh="+myh+"&myt="+myt; 
}
function ChangeQtr(v)
{  
  var act=document.getElementById("act").value; var hq=document.getElementById("hq").value; var y=document.getElementById("y").value;
  var ii=document.getElementById("ii").value; var cc=document.getElementById("cc").value; var di=document.getElementById("di").value;
  var gi=document.getElementById("gi").value; var EHq=document.getElementById("EHq").value; 
  var fc=document.getElementById("fc").value; var vc=document.getElementById("vc").value;
  var myh=document.getElementById("myh").value; var myt=document.getElementById("myt").value;
   window.location="SalesEntryMt.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&act="+act+"&hq="+hq+"&y="+y+"&q="+v+"&ii="+ii+"&vc="+vc+"&fc="+fc+"&cc="+cc+"&di="+di+"&gi="+gi+"&EHq="+EHq+"&myh="+myh+"&myt="+myt;
}

function editD(sn,q,d)   //'MTot_ea'.$Sn;  //$HqId.'TTotP2d_'.$Sn 
{ 
document.getElementById(d+"EditBtn_"+sn).style.display='none'; document.getElementById(d+"SaveBtn_"+sn).style.display='block'; 
document.getElementById(d+"TM1_Ae"+sn).style.background='#FFFFFF';document.getElementById(d+"TM1_Be"+sn).style.background='#FFFFFF';document.getElementById(d+"M1_Be"+sn).style.background='#FFFFFF';document.getElementById(d+"M1_Be"+sn).readOnly=false;document.getElementById(d+"TM1_Ce"+sn).style.background='#FFFFFF';document.getElementById(d+"M1_Ce"+sn).style.background='#FFFFFF';document.getElementById(d+"M1_Ce"+sn).readOnly=false; 
document.getElementById(d+"TM2_Ae"+sn).style.background='#FFFFFF'; document.getElementById(d+"TM2_Be"+sn).style.background='#FFFFFF';document.getElementById(d+"M2_Be"+sn).style.background='#FFFFFF';document.getElementById(d+"M2_Be"+sn).readOnly=false;document.getElementById(d+"TM2_Ce"+sn).style.background='#FFFFFF';document.getElementById(d+"M2_Ce"+sn).style.background='#FFFFFF';document.getElementById(d+"M2_Ce"+sn).readOnly=false; document.getElementById(d+"TM3_Ae"+sn).style.background='#FFFFFF'; 
document.getElementById(d+"TM3_Be"+sn).style.background='#FFFFFF';document.getElementById(d+"M3_Be"+sn).style.background='#FFFFFF';document.getElementById(d+"M3_Be"+sn).readOnly=false;document.getElementById(d+"TM3_Ce"+sn).style.background='#FFFFFF';document.getElementById(d+"M3_Ce"+sn).style.background='#FFFFFF';document.getElementById(d+"M3_Ce"+sn).readOnly=false; 
document.getElementById(d+"TM4_Ae"+sn).style.background='#FFFFFF'; document.getElementById(d+"TM4_Be"+sn).style.background='#FFFFFF';document.getElementById(d+"M4_Be"+sn).style.background='#FFFFFF';document.getElementById(d+"M4_Be"+sn).readOnly=false;document.getElementById(d+"TM4_Ce"+sn).style.background='#FFFFFF';document.getElementById(d+"M4_Ce"+sn).style.background='#FFFFFF';document.getElementById(d+"M4_Ce"+sn).readOnly=false;

/*
if(document.getElementById(d+"M1_Be"+sn).value<document.getElementById(d+"M1a"+sn).value){document.getElementById(d+"M1_Be"+sn).value=document.getElementById(d+"M1a"+sn).value;} 
if(document.getElementById(d+"M1_Ce"+sn).value<document.getElementById(d+"M1b"+sn).value){document.getElementById(d+"M1_Ce"+sn).value=document.getElementById(d+"M1b"+sn).value;}
if(document.getElementById(d+"M2_Be"+sn).value<document.getElementById(d+"M2a"+sn).value){document.getElementById(d+"M2_Be"+sn).value=document.getElementById(d+"M2a"+sn).value;}
if(document.getElementById(d+"M2_Ce"+sn).value<document.getElementById(d+"M2b"+sn).value){document.getElementById(d+"M2_Ce"+sn).value=document.getElementById(d+"M2b"+sn).value;}
if(document.getElementById(d+"M3_Be"+sn).value<document.getElementById(d+"M3a"+sn).value){document.getElementById(d+"M3_Be"+sn).value=document.getElementById(d+"M3a"+sn).value;}
if(document.getElementById(d+"M3_Ce"+sn).value<document.getElementById(d+"M3b"+sn).value){document.getElementById(d+"M3_Ce"+sn).value=document.getElementById(d+"M3b"+sn).value;}
if(document.getElementById(d+"M4_Be"+sn).value<document.getElementById(d+"M4a"+sn).value){document.getElementById(d+"M4_Be"+sn).value=document.getElementById(d+"M4a"+sn).value;}
if(document.getElementById(d+"M4_Ce"+sn).value<document.getElementById(d+"M4b"+sn).value){document.getElementById(d+"M4_Ce"+sn).value=document.getElementById(d+"M4b"+sn).value;}

if(document.getElementById(d+"TotP2d_"+sn).value<document.getElementById(d+"MTota"+sn).value)
{document.getElementById(d+"TotP2d_"+sn).value=document.getElementById(d+"MTota"+sn).value;}
if(document.getElementById(d+"TotP3d_"+sn).value<document.getElementById(d+"MTotb"+sn).value)
{document.getElementById(d+"TotP3d_"+sn).value=document.getElementById(d+"MTotb"+sn).value;}
*/

var M1B=parseFloat(document.getElementById(d+'M1_Be'+sn).value); var M2B=parseFloat(document.getElementById(d+'M2_Be'+sn).value); 
var M3B=parseFloat(document.getElementById(d+'M3_Be'+sn).value); var M4B=parseFloat(document.getElementById(d+'M4_Be'+sn).value); 
var M1C=parseFloat(document.getElementById(d+'M1_Ce'+sn).value); var M2C=parseFloat(document.getElementById(d+'M2_Ce'+sn).value); 
var M3C=parseFloat(document.getElementById(d+'M3_Ce'+sn).value); var M4C=parseFloat(document.getElementById(d+'M4_Ce'+sn).value);
var a1=parseFloat(document.getElementById(d+'M1a'+sn).value); var a2=parseFloat(document.getElementById(d+'M2a'+sn).value); 
var a3=parseFloat(document.getElementById(d+'M3a'+sn).value); var a4=parseFloat(document.getElementById(d+'M4a'+sn).value); 
var b1=parseFloat(document.getElementById(d+'M1b'+sn).value); var b2=parseFloat(document.getElementById(d+'M2b'+sn).value); 
var b3=parseFloat(document.getElementById(d+'M3b'+sn).value); var b4=parseFloat(document.getElementById(d+'M4b'+sn).value);
var T2=parseFloat(document.getElementById(d+"TotP2d_"+sn).value); var T3=parseFloat(document.getElementById(d+"TotP3d_"+sn).value); 
var Ta=parseFloat(document.getElementById(d+"MTota"+sn).value); var Tb=parseFloat(document.getElementById(d+"MTotb"+sn).value);

if(isNaN(a1)){var a11=0;}else{var a11=a1;} if(isNaN(M1B)){var M1BB=0;}else{var M1BB=M1B;} 
if(M1BB<a11){document.getElementById(d+"M1_Be"+sn).value=document.getElementById(d+"M1a"+sn).value;} 
if(isNaN(b1)){var b11=0;}else{var b11=b1;} if(isNaN(M1C)){var M1CC=0;}else{var M1CC=M1C;}
if(M1CC<b11){document.getElementById(d+"M1_Ce"+sn).value=document.getElementById(d+"M1b"+sn).value;}

if(isNaN(a2)){var a22=0;}else{var a22=a2;} if(isNaN(M2B)){var M2BB=0;}else{var M2BB=M2B;} 
if(M2BB<a22){document.getElementById(d+"M2_Be"+sn).value=document.getElementById(d+"M2a"+sn).value;}
if(isNaN(b2)){var b22=0;}else{var b22=b2;} if(isNaN(M2C)){var M2CC=0;}else{var M2CC=M2C;}
if(M2CC<b22){document.getElementById(d+"M2_Ce"+sn).value=document.getElementById(d+"M2b"+sn).value;}

if(isNaN(a3)){var a33=0;}else{var a33=a3;} if(isNaN(M3B)){var M3BB=0;}else{var M3BB=M3B;} 
if(M3BB<a33){document.getElementById(d+"M3_Be"+sn).value=document.getElementById(d+"M3a"+sn).value;}
if(isNaN(b3)){var b33=0;}else{var b33=b3;} if(isNaN(M3C)){var M3CC=0;}else{var M3CC=M3C;}
if(M3CC<b33){document.getElementById(d+"M3_Ce"+sn).value=document.getElementById(d+"M3b"+sn).value;}

if(isNaN(a4)){var a44=0;}else{var a44=a4;} if(isNaN(M4B)){var M4BB=0;}else{var M4BB=M4B;} 
if(M4BB<a44){document.getElementById(d+"M4_Be"+sn).value=document.getElementById(d+"M4a"+sn).value;}
if(isNaN(b4)){var b44=0;}else{var b44=b4;} if(isNaN(M4C)){var M4CC=0;}else{var M4CC=M4C;}
if(M4CC<b44){document.getElementById(d+"M4_Ce"+sn).value=document.getElementById(d+"M4b"+sn).value;}

if(isNaN(Ta)){var Taa=0;}else{var Taa=Ta;} if(isNaN(T2)){var T22=0;}else{var T22=T2;} 
if(T22<Taa){document.getElementById(d+"TotP2d_"+sn).value=document.getElementById(d+"MTota"+sn).value;}
if(isNaN(Tb)){var Tbb=0;}else{var Tbb=Tb;} if(isNaN(T3)){var T33=0;}else{var T33=T3;}
if(T33<Tbb){document.getElementById(d+"TotP3d_"+sn).value=document.getElementById(d+"MTotb"+sn).value;}

}

function saveD(sn,yi,di,q,hqe)
{
 //alert(di); return false;
 var PId=document.getElementById(di+'P_'+sn).value; var EId=document.getElementById('EmpId').value; var ii=document.getElementById('ii').value; 
  var hq=document.getElementById('hq').value; 
  var TerId=0; var StaId=0; var RepTerId=0;
  var M1A=parseFloat(document.getElementById(di+'M1_Ae'+sn).value); var M2A=parseFloat(document.getElementById(di+'M2_Ae'+sn).value); 
  var M3A=parseFloat(document.getElementById(di+'M3_Ae'+sn).value); var M4A=parseFloat(document.getElementById(di+'M4_Ae'+sn).value); 
  var M1B=parseFloat(document.getElementById(di+'M1_Be'+sn).value); var M2B=parseFloat(document.getElementById(di+'M2_Be'+sn).value); 
  var M3B=parseFloat(document.getElementById(di+'M3_Be'+sn).value); var M4B=parseFloat(document.getElementById(di+'M4_Be'+sn).value); 
  var M1C=parseFloat(document.getElementById(di+'M1_Ce'+sn).value); var M2C=parseFloat(document.getElementById(di+'M2_Ce'+sn).value); 
  var M3C=parseFloat(document.getElementById(di+'M3_Ce'+sn).value); var M4C=parseFloat(document.getElementById(di+'M4_Ce'+sn).value); 
  var Mn1A=document.getElementById(di+'M1_Ae'+sn).value; var Mn2A=document.getElementById(di+'M2_Ae'+sn).value; 
  var Mn3A=document.getElementById(di+'M3_Ae'+sn).value; var Mn4A=document.getElementById(di+'M4_Ae'+sn).value;
  var Mn1B=document.getElementById(di+'M1_Be'+sn).value; var Mn2B=document.getElementById(di+'M2_Be'+sn).value; 
  var Mn3B=document.getElementById(di+'M3_Be'+sn).value; var Mn4B=document.getElementById(di+'M4_Be'+sn).value; 
  var Mn1C=document.getElementById(di+'M1_Ce'+sn).value; var Mn2C=document.getElementById(di+'M2_Ce'+sn).value; 
  var Mn3C=document.getElementById(di+'M3_Ce'+sn).value; var Mn4C=document.getElementById(di+'M4_Ce'+sn).value;  
  if(Mn1A==''){var n1A=0;}else{var n1A=M1A;} if(Mn2A==''){var n2A=0;}else{var n2A=M2A;} if(Mn3A==''){var n3A=0;}else{var n3A=M3A;} if(Mn4A==''){var n4A=0;}else{var n4A=M4A;} 
  if(Mn1B==''){var n1B=0;}else{var n1B=M1B;} if(Mn2B==''){var n2B=0;}else{var n2B=M2B;} if(Mn3B==''){var n3B=0;}else{var n3B=M3B;} if(Mn4B==''){var n4B=0;}else{var n4B=M4B;}
  if(Mn1C==''){var n1C=0;}else{var n1C=M1C;} if(Mn2C==''){var n2C=0;}else{var n2C=M2C;} if(Mn3C==''){var n3C=0;}else{var n3C=M3C;} if(Mn4C==''){var n4C=0;}else{var n4C=M4C;}   
  var TotA=Math.round((n1A+n2A+n3A+n4A)*100)/100; var TotB=Math.round((n1B+n2B+n3B+n4B)*100)/100; var TotC=Math.round((n1C+n2C+n3C+n4C)*100)/100; 
  document.getElementById("TotAValueM").value=TotA; document.getElementById("TotBValueM").value=TotB; document.getElementById("TotCValueM").value=TotC; 
  document.getElementById("Sno").value=sn; document.getElementById("MainSelHqId").value=di; 
  var url = 'SlctSalesProdDealMt.php';  var pars = 'Action=AddMonth&p='+PId+'&e='+EId+'&m1A='+n1A+'&m2A='+n2A+'&m3A='+n3A+'&m4A='+n4A+'&m1B='+n1B+'&m2B='+n2B+'&m3B='+n3B+'&m4B='+n4B+'&m1C='+n1C+'&m2C='+n2C+'&m3C='+n3C+'&m4C='+n4C+'&TotA='+TotA+'&TotB='+TotB+'&TotC='+TotC+'&yi='+yi+'&Mhq='+di+'&sn='+sn+'&hi='+hq+'&TerId='+TerId+'&StaId='+StaId+'&RepTerId='+RepTerId+'&q='+q+'&ii='+ii+'&hqe='+hqe; 
  
  var myAjax = new Ajax.Request( url, { method: 'post', parameters: pars, onComplete: show_AddMonth });  
}
function show_AddMonth(originalRequest)
{ document.getElementById('AddMonthResult').innerHTML = originalRequest.responseText; var Sno=document.getElementById('Sno').value; 
  var di=document.getElementById('MainSelHqId').value; var q=document.getElementById('q').value; var ii=document.getElementById('ii').value;
  var TotalA=document.getElementById(di+'TotP1d_'+Sno).value=document.getElementById('TotAValueM').value; 
  var TotalB=document.getElementById(di+'TotP2d_'+Sno).value=document.getElementById('TotBValueM').value;   
  var TotalC=document.getElementById(di+'TotP3d_'+Sno).value=document.getElementById('TotCValueM').value; 
 
  document.getElementById(di+'TM1_Ae'+Sno).style.background='#E0FFC1'; document.getElementById(di+'TM2_Ae'+Sno).style.background='#E0FFC1'; 
  document.getElementById(di+'TM3_Ae'+Sno).style.background='#E0FFC1'; document.getElementById(di+'TM4_Ae'+Sno).style.background='#E0FFC1'; 
  document.getElementById(di+'TM1_Be'+Sno).style.background='#E0FFC1'; document.getElementById(di+'TM2_Be'+Sno).style.background='#E0FFC1'; 
  document.getElementById(di+'TM3_Be'+Sno).style.background='#E0FFC1'; document.getElementById(di+'TM4_Be'+Sno).style.background='#E0FFC1';
  document.getElementById(di+'TM1_Ce'+Sno).style.background='#E0FFC1'; document.getElementById(di+'TM2_Ce'+Sno).style.background='#E0FFC1'; 
  document.getElementById(di+'TM3_Ce'+Sno).style.background='#E0FFC1'; document.getElementById(di+'TM4_Ce'+Sno).style.background='#E0FFC1';
  document.getElementById(di+'M1_Be'+Sno).style.background='#E0FFC1'; document.getElementById(di+'M2_Be'+Sno).style.background='#E0FFC1'; 
  document.getElementById(di+'M3_Be'+Sno).style.background='#E0FFC1'; document.getElementById(di+'M4_Be'+Sno).style.background='#E0FFC1'; 
  document.getElementById(di+'M1_Ce'+Sno).style.background='#E0FFC1'; document.getElementById(di+'M2_Ce'+Sno).style.background='#E0FFC1'; 
  document.getElementById(di+'M3_Ce'+Sno).style.background='#E0FFC1'; document.getElementById(di+'M4_Ce'+Sno).style.background='#E0FFC1'; 
  document.getElementById('M1_B'+Sno).value=document.getElementById("Tot21P").value; document.getElementById('M2_B'+Sno).value=document.getElementById("Tot22P").value; 
  document.getElementById('M3_B'+Sno).value=document.getElementById("Tot23P").value; document.getElementById('M4_B'+Sno).value=document.getElementById("Tot24P").value;
  document.getElementById('M1_C'+Sno).value=document.getElementById("Tot31P").value; document.getElementById('M2_C'+Sno).value=document.getElementById("Tot32P").value; 
  document.getElementById('M3_C'+Sno).value=document.getElementById("Tot33P").value; document.getElementById('M4_C'+Sno).value=document.getElementById("Tot34P").value; 
  document.getElementById('TotP2_'+Sno).value=document.getElementById("PTot2P").value; document.getElementById('TotP3_'+Sno).value=document.getElementById("PTot3P").value; 
  if(ii!='All_1' && ii!='All_2'){ 
  document.getElementById(di+'M1_BeT').value=document.getElementById("Tot21").value; document.getElementById(di+'M2_BeT').value=document.getElementById("Tot22").value; 
  document.getElementById(di+'M3_BeT').value=document.getElementById("Tot23").value; document.getElementById(di+'M4_BeT').value=document.getElementById("Tot24").value; 
  document.getElementById(di+'M1_CeT').value=document.getElementById("Tot31").value; document.getElementById(di+'M2_CeT').value=document.getElementById("Tot32").value; 
  document.getElementById(di+'M3_CeT').value=document.getElementById("Tot33").value; document.getElementById(di+'M4_CeT').value=document.getElementById("Tot34").value; 
  document.getElementById(di+'TotM_BeT').value=document.getElementById("TTot2").value; document.getElementById(di+'TotM_CeT').value=document.getElementById("TTot3").value; 
  document.getElementById('TotP1_TB').value=document.getElementById("Tot21T").value; document.getElementById('TotP2_TB').value=document.getElementById("Tot22T").value; 
  document.getElementById('TotP3_TB').value=document.getElementById("Tot23T").value; document.getElementById('TotP4_TB').value=document.getElementById("Tot24T").value; 
  document.getElementById('TotP1_TC').value=document.getElementById("Tot31T").value; document.getElementById('TotP2_TC').value=document.getElementById("Tot32T").value; 
  document.getElementById('TotP3_TC').value=document.getElementById("Tot33T").value; document.getElementById('TotP4_TC').value=document.getElementById("Tot34T").value; 
  document.getElementById('TotM_BeT').value=document.getElementById("TTot2T").value; document.getElementById('TotM_CeT').value=document.getElementById("TTot3T").value; }
 
 document.getElementById(di+"EditBtn_"+Sno).style.display='block';  document.getElementById(di+"SaveBtn_"+Sno).style.display='none'; 
 //document.getElementById("SubmitBtn_"+Sno).style.display='block';
}

function ClickFSL2(e,y)
{
   var ActSn=document.getElementById("ActualSn").value;
	if(ActSn>0)
	{
	  for(var i=1; i<=ActSn; i++)
	  { var va1=parseFloat(document.getElementById("TotP2_"+i).value); var va2=parseFloat(document.getElementById("STotP2_"+i).value);
	    var vb1=parseFloat(document.getElementById("TotP3_"+i).value); var vb2=parseFloat(document.getElementById("STotP3_"+i).value);  
	    if(va1<va2){alert("Please check product value, your product value equal or more then from reporting values"); return false;}
	    if(vb1<vb2){alert("Please check product value, your product value equal or more then from reporting values"); return false;}
	  }
	}
    var act=document.getElementById("act").value; var hq=document.getElementById("hq").value; 
    var q=document.getElementById("q").value; var cc=document.getElementById("cc").value; var di=document.getElementById("di").value;
    var gi=document.getElementById("gi").value; var EHq=document.getElementById("EHq").value; var ii=document.getElementById("ii").value; 
    var fc=document.getElementById("fc").value; var vc=document.getElementById("vc").value; var myh=1; var myt=document.getElementById("myt").value;
    var win = window.open("SbOpenFile.php?CheckAct=Fsb2&y="+y+"&e="+e,"QForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=620,height=300");
	var timer = setInterval( function() { if(win.closed) { clearInterval(timer);  window.location="SalesEntryMt.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&act="+act+"&hq="+hq+"&y="+y+"&q="+q+"&ii=0&vc=0&fc=0&ac=1&cc="+cc+"&di="+di+"&gi="+gi+"&EHq="+EHq+"&myh="+myh+"&myt="+myt; } }, 1000);
}

</script>  
</head>
<body class="body">   
<table class="table">
<tr>
 <td>
 <table class="menutable"><tr><td><?php if($_SESSION['login'] = true){ require_once("EMenu.php"); } ?></td></tr></table> 
 </td>
</tr>
<tr>
 <td>
  <table width="100%" style="margin-top:0px;">
    <tr>
	  <td valign="top"><?php if($_SESSION['login'] = true){ require_once("EWelcome.php"); } ?></td>
	</tr>
	 <tr>
	  <td valign="top">
	     <table border="0" style="width:100%; height:380px; float:none;" cellpadding="0">
		  <tr>
		   <td valign="top"> 
		   
<?php //*************************************************************************************************************************************************** ?>	   
		     <table border="0" id="Activity">
			  <tr>
			     <td id="Anni" valign="top" style="width:5px;"></td>
				 <td colspan="2" width="100%" valign="top">
				  <table border="0">
<?php //*************************************************************** Start ******************************************************************************** ?>		
<?php $SpP=mysql_query("select GradeId,DepartmentId,HqId from hrm_employee_general where EmployeeID=".$EmployeeId, $con); $resSpP=mysql_fetch_assoc($SpP); ?>		
<input type="hidden" name="ComId" id="ComId" value="<?php echo $CompanyId; ?>" /><input type="hidden" id="EmpId" name="EmpId" value="<?php echo $EmployeeId; ?>" />
<input type="hidden" id="act" value="<?php echo $_REQUEST['act']; ?>" /><input type="hidden" name="y" id="y" value="<?php echo $_REQUEST['y']; ?>" />
<input type="hidden" name="hq" id="hq" value="<?php echo $_REQUEST['hq']; ?>" /><input type="hidden" name="q" id="q" value="<?php echo $_REQUEST['q']; ?>" />
<input type="hidden" name="vc" id="vc" value="<?php echo $_REQUEST['vc']; ?>" /><input type="hidden" name="fc" id="fc" value="<?php echo $_REQUEST['fc']; ?>" />
<input type="hidden" id="di" value="<?php echo $_REQUEST['di']; ?>" /><input type="hidden" id="gi" value="<?php echo $_REQUEST['gi']; ?>" />
<input type="hidden" id="cc" value="<?php echo $_REQUEST['cc']; ?>" /><input type="hidden" id="ActThought" value="0" />
<input type="hidden" id="ii" value="<?php echo $_REQUEST['ii']; ?>" /><input type="hidden" id="EHq" value="<?php echo $_REQUEST['EHq']; ?>" /> 
<input type="hidden" id="TotAValueM" value="" /><input type="hidden" id="TotBValueM" value="" /><input type="hidden" id="TotCValueM" value="" />
<input type="hidden" id="MainSelHqId" value="" /><input type="hidden" id="Sno" value="" /><input type="hidden" id="myh" value="<?php echo $_REQUEST['myh']; ?>" />
<input type="hidden" id="myt" value="<?php echo $_REQUEST['myt']; ?>" /><input type="hidden" id="HqV" value="<?php echo $_REQUEST['hq']; ?>" />
<?php $sqlCPerMi=mysql_query("select EditPerMi from hrm_sales_reporting_level where EmployeeID=".$EmployeeId,$con); $resCPerMi=mysql_fetch_assoc($sqlCPerMi); ?>

<?php $sHq2=mysql_query("select HqId from hrm_sales_hq_temp where EmployeeID=".$EmployeeId." AND HqId!=".$resSpP['HqId'], $con); $rowHq2=mysql_num_rows($sHq2);
      echo '<input type="hidden" id="Rowhq2" value="'.$rowHq2.'" />';
      if($rowHq2==1){$resHq2=mysql_fetch_assoc($sHq2); echo '<input type="hidden" id="h1q" value="'.$resHq2['HqId'].'" />';}
?><input type="hidden" id="no" value="<?php echo $_REQUEST['no']; ?>" />

<tr>
 <td colspan="5"> 	 
  <table border="0">
  <tr>
   <td>
     <table border="0">
	  <tr>
	   <td>
	    <table border="0">
		 <tr>	
<?php /*		  
<td align="center"><a href="SalesPlan.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq"><img src="images/Planner.png" border="0" style="height:30px;width:130px;"/></a></td> */ ?>
<td align="center"><img src="images/Planner.png" border="0" style="height:40px;width:150px;"/></td>
<td>&nbsp;</td>
<?php $sHq2=mysql_query("select HqId from hrm_sales_hq_temp where EmployeeID=".$EmployeeId." AND HqId!=".$resSpP['HqId'], $con); $rowHq2=mysql_num_rows($sHq2); ?>
<td align="center" valign="bottom">
<?php if($rowHq2==0){ ?><a href="#" onClick="ChangeHq(<?php echo $resSpP['HqId'].', '.$_REQUEST['y'].',1'; ?>)"><img src="images/Myhq.png" border="0" style="height:30px;width:130px;"  /></a>
<?php } elseif($rowHq2==1){ $resHq2=mysql_fetch_assoc($sHq2); ?><a href="#" onClick="ChangeHq(<?php echo $resSpP['HqId'].', '.$_REQUEST['y'].',1'; ?>)"><img src="images/My1hq.png" border="0" style="height:30px;width:100px;"  /></a>&nbsp;<a href="#" onClick="ChangeHq(<?php echo $resHq2['HqId'].', '.$_REQUEST['y'].',2'; ?>)"><img src="images/My2hq.png" border="0" style="height:30px;width:100px;"  /></a>
<?php } ?>
</td>

<?php /*
<td align="center" valign="bottom">
<a href="#" onClick="ChangeHq(<?php echo $resSpP['HqId'].', '.$_REQUEST['y']; ?>)"><img src="images/Myhq.png" border="0" style="height:30px;width:130px;"  /></a>
</td> */ ?>

<?php if($_REQUEST['act']>0){ ?>
<td>&nbsp;</td><td align="center" valign="bottom">
<?php if($_REQUEST['myt']==0){ ?><a href="#"><img src="images/Myteam.png" border="0" style="height:30px;width:130px;"  /></a><?php } elseif($_REQUEST['myt']==1){ ?><a href="#"><img src="images/Myteam1.png" border="0" style="height:30px;width:130px;"/></a><?php } ?>
</td>
<td>&nbsp;</td><td align="center" valign="bottom">
<a href="#" onClick="ChangePerMi(<?php echo $resSpP['HqId'].', '.$_REQUEST['y']; ?>)"><img src="images/Permission.png" border="0" style="height:30px;width:130px;"  /></a>
</td>
<?php } ?> 
	<td>&nbsp;</td>
	<td style="font-family:Times New Roman;font-size:14px;font-weight:bold;color:#FFFFC6;" valign="bottom">Year :</b><select style="font-family:Times New Roman;font-size:14px;width:90px;background-color:#E4E0FC;height:23px;font-weight:bold;" id="YearV" onChange="ChangeYear(this.value)">
<?php $sqlye=mysql_query("select YearId,FromDate,ToDate from hrm_sales_year where YearId=".$_REQUEST['y'], $con); $resye=mysql_fetch_assoc($sqlye); 
      $FFromDate=date("Y",strtotime($resye['FromDate'])); $TToDate=date("Y",strtotime($resye['ToDate'])); ?>
		 <option value="<?php echo $resye['YearId']; ?>" selected><?php echo $FFromDate.'-'.$TToDate; ?></option>
<?php $sqly=mysql_query("select YearId from hrm_sales_year where Company1='A'", $con); $resy=mysql_fetch_assoc($sqly); 
if($_REQUEST['y']==$resy['YearId']){$sqlYear=mysql_query("select YearId,FromDate,ToDate from hrm_sales_year where YearId>".$_REQUEST['y']." order by FromDate ASC limit 1 ", $con);} elseif($_REQUEST['y']>$resy['YearId']){$sqlYear=mysql_query("select YearId,FromDate,ToDate from hrm_sales_year where YearId=".$resy['YearId']." order by FromDate ASC limit 1 ", $con);} while($resYear=mysql_fetch_assoc($sqlYear)){ 
 $FFrom2Date=date("Y",strtotime($resYear['FromDate'])); $TTo2Date=date("Y",strtotime($resYear['ToDate'])); ?>
         <option value="<?php echo $resYear['YearId']; ?>"><?php echo $FFrom2Date.'-'.$TTo2Date; ?></option><?php } ?></select>	
	
	
<?php /* $sqly=mysql_query("select FromDate,ToDate from hrm_year where YearId=".$_REQUEST['y'], $con); $resy=mysql_fetch_assoc($sqly); 
      $fromdate=date("Y",strtotime($resy['FromDate'])); $todate=date("Y",strtotime($resy['ToDate'])); 
	  $NextYear=$_REQUEST['y']+1; $PrevYear=$_REQUEST['y']-1; 
	  $sqly2=mysql_query("select FromDate,ToDate from hrm_year where YearId=".$NextYear, $con); $resy2=mysql_fetch_assoc($sqly2);
	  $sqly3=mysql_query("select FromDate,ToDate from hrm_year where YearId=".$PrevYear, $con); $resy3=mysql_fetch_assoc($sqly3); ?>		
 <option value="<?php echo $_REQUEST['y']; ?>" selected><?php echo $fromdate.'-'.$todate; ?></option>
 <?php if($PrevYear>=1){?><option value="<?php echo $PrevYear; ?>"><?php echo date("Y",strtotime($resy3['FromDate'])).'-'.date("Y",strtotime($resy3['ToDate'])); ?></option><?php } ?>
 <option value="<?php echo $NextYear; ?>"><?php echo date("Y",strtotime($resy2['FromDate'])).'-'.date("Y",strtotime($resy2['ToDate'])); ?></option></select>
 */ ?>
	</td>
	<td>&nbsp;</td>
	<td style="font-family:Times New Roman;font-size:14px;font-weight:bold;color:#FFFFC6;" valign="bottom">VC :</b><select style="font-family:Times New Roman;font-size:14px;width:140px;background-color:#C4FFC4;height:23px;font-weight:bold;" id="ItemV" onChange="ChangeItem(this.value,'vc')">
<?php if($_REQUEST['vc']!=0){$sqlI=mysql_query("select ItemName from hrm_sales_seedsitem where ItemId=".$_REQUEST['ii'], $con); $resI=mysql_fetch_assoc($sqlI);?>	
    <option value="<?php echo $_REQUEST['ii']; ?>" selected><?php echo strtoupper($resI['ItemName']); ?></option><?php }else{ ?><option value="0" selected>SELECT</option><?php } ?>
<?php $sqlItem=mysql_query("select * from hrm_sales_seedsitem where GroupId=1 order by ItemName ASC", $con); while($resItem=mysql_fetch_assoc($sqlItem)){ ?> 
    <option value="<?php echo $resItem['ItemId']; ?>"><?php echo $resItem['ItemName']; ?></option><?php } /* ?><option value="All_1"> --- All ---</option><?php */ ?></select>
	<input type="hidden" id="ValueItem" value="<?php echo $_REQUEST['ii']; ?>" /> 
	<input type="hidden" id="ValueName" value="<?php if($_REQUEST['vc']>0){echo 'vc';}elseif($_REQUEST['fc']>0){echo 'fc';} ?>" />	
    </td>
	<td>&nbsp;</td>
	<td style="font-family:Times New Roman;font-size:14px;font-weight:bold;color:#FFFFC6;" valign="bottom">FC :</b><select style="font-family:Times New Roman;font-size:14px;width:140px;background-color:#C4FFC4;height:23px;font-weight:bold;" id="ItemV2" onChange="ChangeItem(this.value,'fc')">
<?php if($_REQUEST['fc']!=0 AND $_REQUEST['ii']!='All_2'){$sqlIf=mysql_query("select ItemName from hrm_sales_seedsitem where ItemId=".$_REQUEST['ii'], $con); $resIf=mysql_fetch_assoc($sqlIf);?><option value="<?php echo $_REQUEST['ii']; ?>" selected><?php echo strtoupper($resIf['ItemName']); ?></option>
<?php } elseif($_REQUEST['fc']!=0 AND $_REQUEST['ii']=='All_2'){?><option value="<?php echo $_REQUEST['ii']; ?>" selected>--- All ---</option>
<?php } else{ ?><option value="0" selected>SELECT</option><?php } ?>
<?php $sqlItemf=mysql_query("select * from hrm_sales_seedsitem where GroupId=2 order by ItemName ASC", $con); while($resItemf=mysql_fetch_assoc($sqlItemf)){ ?> 
 <option value="<?php echo $resItemf['ItemId']; ?>"><?php echo $resItemf['ItemName']; ?></option><?php } ?><option value="All_2"> --- All ---</option></select>
   </td>
   <td style="font-family:Times New Roman;font-size:14px;font-weight:bold;" valign="bottom">&nbsp;<a href="#" onClick="ClickAllProd(0,'ac')" style="color:#FFFF80">Over All-Crop/My-Team</a></td>
   </tr>
 </table>
	   </td>
	  </tr>
<tr><td><span id="DealerHqSpan"></span></td></tr>
  </table>
 </td>
</tr>
<?php /***************************************** Main Page Open **************************************/ ?>
<?php if($_REQUEST['act']>0){ //if($_REQUEST['act']==0){ ?>
<tr>
 <td>
<?php $sql = mysql_query("select HqName from hrm_headquater where HqId=".$_REQUEST['hq'], $con); $res=mysql_fetch_array($sql); 
	  $Before2YId=$_REQUEST['y']-2; $BeforeYId=$_REQUEST['y']-1; $AfterYId=$_REQUEST['y']+1;
	  $sqlY0=mysql_query("select FromDate,ToDate from hrm_sales_year where YearId=".$Before2YId, $con); $resY0=mysql_fetch_assoc($sqlY0); 
	  $sqlY1=mysql_query("select FromDate,ToDate from hrm_sales_year where YearId=".$BeforeYId, $con); $resY1=mysql_fetch_assoc($sqlY1); 
	  $sqlY2=mysql_query("select FromDate,ToDate from hrm_sales_year where YearId=".$_REQUEST['y'], $con); $resY2=mysql_fetch_assoc($sqlY2); 
	  $sqlY3=mysql_query("select FromDate,ToDate from hrm_sales_year where YearId=".$AfterYId, $con); $resY3=mysql_fetch_assoc($sqlY3);
	  $y0=date("y",strtotime($resY0['FromDate'])).'-'.date("y",strtotime($resY0['ToDate'])); $y0T='<font color="#A60053">Ach.</font>'; 
	  $y1=date("y",strtotime($resY1['FromDate'])).'-'.date("y",strtotime($resY1['ToDate'])); $y1T='<font color="#A60053">Ach.</font>';
	  $y2=date("y",strtotime($resY2['FromDate'])).'-'.date("y",strtotime($resY2['ToDate'])); $y2T='<font color="#A60053">Tgt.</font>';
	  $y3=date("y",strtotime($resY3['FromDate'])).'-'.date("y",strtotime($resY3['ToDate'])); $y3T='<font color="#A60053">Proj.</font>';
	  if($_REQUEST['ii']=='All_1' OR $_REQUEST['ii']=='All_2' OR $_REQUEST['ac']==1){ $ItemN='All Crop'; }
	  else{ $sqlItem = mysql_query("select ItemName from hrm_sales_seedsitem where ItemId=".$_REQUEST['ii'], $con); $resItem=mysql_fetch_assoc($sqlItem); $ItemN=$resItem['ItemName']; 
	  $sqlSubEmp = mysql_query("select * from hrm_sales_emp_action where EmployeeID=".$EmployeeId." AND YearId=".$_REQUEST['y']." AND StatusB=1", $con); 
	  $rowSubEmp=mysql_num_rows($sqlSubEmp);
	  }    
?>	 
      <input type="hidden" name="rowSubEmp" id="rowSubEmp" value="<?php echo $rowSubEmp; ?>" />
	  <input type="hidden" name="VDealer" id="VDealer" value="<?php echo strtoupper($res['DealerName']); ?>" readonly/>
	  <input type="hidden" name="DealerId" id="DealerId" value="<?php echo $_POST['DealIdE']; ?>" />
	  <input type="hidden" name="DealerCity" id="DealerCity" value="<?php echo $res['DealerCity']; ?>" />
	  
	  <input type="hidden" name="ni" id="ni" value="<?php echo $_POST['ni']; ?>" />
<table border="1" cellpadding="0" cellspacing="0" style="font-family:Times New Roman;font-size:14px;width:<?php if($_REQUEST['ii']=='All_1' OR $_REQUEST['ii']=='All_2' OR $_REQUEST['ac']==1){ echo '1850px';}else{echo '1750px';}?>;">	
  <tr>
  <td colspan="<?php if($_REQUEST['ii']=='All_1' OR $_REQUEST['ii']=='All_2' OR $_REQUEST['ac']==1){ echo 3;}else{echo 2;}?>" align="center" style="height:25px;background-color:#005300;font-family:Times New Roman;font-size:16px;color:#FFFF20;font-weight:bold;" id="TD_<?php echo $counter; ?>">  <font color="#D7EBFF">Crop:</font>&nbsp;<?php echo $ItemN; ?>
  </td>
  <td colspan="24" style="height:25px;background-color:#005300;font-family:Times New Roman;font-size:16px;color:#FFFF20;font-weight:bold;" id="TD_<?php echo $counter; ?>">
   &nbsp;<font color="#D7EBFF">Head Quarter:&nbsp;</font>ALL HEAD QUARTER&nbsp;&nbsp;&nbsp;
<?php /*  &nbsp;<font color="#D7EBFF">Quarter:&nbsp;</font><?php echo '0'.$_REQUEST['q']; ?>&nbsp;&nbsp;&nbsp; */ ?>
   &nbsp;<font color="#D7EBFF">Year:&nbsp;</font><?php echo $FFromDate.'-'.$TToDate; //$fromdate.'-'.$todate; ?>
   
   &nbsp;&nbsp;&nbsp;
   <?php if($_REQUEST['ac']==1){ ?>
   <?php $sqlSb=mysql_query("select * from hrm_sales_emp_action where EmployeeID=".$EmployeeId." AND YearId=".$_REQUEST['y']." AND StatusB=1", $con); $rowSb=mysql_num_rows($sqlSb); ?><input type="button" style="font-family:Times New Roman;width:100px;height:25px;font-weight:bold;" value="Final Submit" onClick="ClickFSL2(<?php echo $EmployeeId.', '.$_REQUEST['y']; ?>)" <?php if($rowSb>0){echo 'disabled';}else{echo '';}?>/><?php } ?>
   
   </td>
 </td>
  </tr>
  <tr style="background-color:#D5F1D1;color:#000000;">
    <td colspan="<?php if($_REQUEST['ii']=='All_1' OR $_REQUEST['ii']=='All_2' OR $_REQUEST['ac']==1){echo 3;}else{echo 2;}?>" align="center" style="font-size:16px;color:#FFFFFF;background-color:#183E83;">
<b><?php echo "ALL HEAD QUARTER"; ?></b> </td>

<td colspan="4" align="center"><b>Quarter 1</b></td><td colspan="4" align="center"><b>Quarter 2</b></td>
<td colspan="4" align="center"><b>Quarter 3</b></td><td colspan="4" align="center"><b>Quarter 4</b></td>
<td colspan="4" align="center" style="background-color:#D9D9FF;"><b>TOTAL</b></td>
<td colspan="4" align="center" style="background-color:#D7FFAE;"><b>REPORTING TOTAL</b></td>
  </tr>	
   <tr style="background-color:#D5F1D1;color:#000000;">
<?php if($_REQUEST['ii']=='All_1' OR $_REQUEST['ii']=='All_2' OR $_REQUEST['ac']==1){ ?>   
    <td align="center" style="width:150px;"><b>CROP</b></td>
<?php } ?>	
	<td align="center" style="width:250px;"><b>VARIETY</b></td>
	<td align="center" style="width:50px;"><b>&nbsp;TYPE&nbsp;</b></td>
	<td class="Trh60"><?php echo $y0T.'<br>'.$y0; ?></td>
	<td class="Trh60"><?php echo $y1T.'<br>'.$y1; ?></td><td class="Trh60"><?php echo $y2; ?></td><td class="Trh60"><?php echo $y3; ?></td>
	<td class="Trh60"><?php echo $y0T.'<br>'.$y0; ?></td>
	<td class="Trh60"><?php echo $y1T.'<br>'.$y1; ?></td><td class="Trh60"><?php echo $y2; ?></td><td class="Trh60"><?php echo $y3; ?></td>
	<td class="Trh60"><?php echo $y0T.'<br>'.$y0; ?></td>
	<td class="Trh60"><?php echo $y1T.'<br>'.$y1; ?></td><td class="Trh60"><?php echo $y2; ?></td><td class="Trh60"><?php echo $y3; ?></td>
	<td class="Trh60"><?php echo $y0T.'<br>'.$y0; ?></td>
	<td class="Trh60"><?php echo $y1T.'<br>'.$y1; ?></td><td class="Trh60"><?php echo $y2; ?></td><td class="Trh60"><?php echo $y3; ?></td>
	<td class="Trh60"><?php echo $y0T.'<br>'.$y0; ?></td>
	<td class="Trh60"><?php echo $y1T.'<br>'.$y1; ?></td><td class="Trh60"><?php echo $y2; ?></td><td class="Trh60"><?php echo $y3; ?></td>
	<td class="Trh60"><?php echo $y0T.'<br>'.$y0; ?></td>
	<td class="Trh60"><?php echo $y1T.'<br>'.$y1; ?></td><td class="Trh60"><?php echo $y2T.'<br>'.$y2; ?></td><td class="Trh60"><?php echo $y3T.'<br>'.$y3; ?></td>
   </tr>	
<?php if($_REQUEST['ii']!='All_1' AND $_REQUEST['ii']!='All_2' AND $_REQUEST['ii']!=0){$sql = mysql_query("select hrm_sales_seedsproduct.ItemId,ProductId,ProductName,ItemName,TypeName from hrm_sales_seedsproduct INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId INNER JOIN hrm_sales_seedtype ON hrm_sales_seedsproduct.TypeId=hrm_sales_seedtype.TypeId where hrm_sales_seedsitem.ItemId=".$_REQUEST['ii']." order by ItemName ASC, TypeName ASC, ProductName ASC", $con);}
      elseif($_REQUEST['ii']=='All_1'){$sql = mysql_query("select hrm_sales_seedsproduct.ItemId,ProductId,ProductName,ItemName,TypeName from hrm_sales_seedsproduct INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId INNER JOIN hrm_sales_seedtype ON hrm_sales_seedsproduct.TypeId=hrm_sales_seedtype.TypeId where hrm_sales_seedsitem.GroupId=1 order by ItemName ASC, TypeName ASC, ProductName ASC", $con);}
	  elseif($_REQUEST['ii']=='All_2'){$sql = mysql_query("select hrm_sales_seedsproduct.ItemId,ProductId,ProductName,ItemName,TypeName from hrm_sales_seedsproduct INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId INNER JOIN hrm_sales_seedtype ON hrm_sales_seedsproduct.TypeId=hrm_sales_seedtype.TypeId where hrm_sales_seedsitem.GroupId=2 order by ItemName ASC, TypeName ASC, ProductName ASC", $con);}
	  elseif($_REQUEST['ii']==0 AND $_REQUEST['ac']==1){$sql = mysql_query("select hrm_sales_seedsproduct.ItemId,ProductId,ProductName,ItemName,TypeName from hrm_sales_seedsproduct INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId INNER JOIN hrm_sales_seedtype ON hrm_sales_seedsproduct.TypeId=hrm_sales_seedtype.TypeId where (hrm_sales_seedsitem.GroupId=1 OR hrm_sales_seedsitem.GroupId=2) order by ItemName ASC, TypeName ASC, ProductName ASC", $con);}
 $Sn=1; while($res=mysql_fetch_array($sql)){ 
 
$sqlP0=mysql_query("select SUM(M1_Ach) as sM1,SUM(M2_Ach) as sM2,SUM(M3_Ach) as sM3,SUM(M4_Ach) as sM4,SUM(M5_Ach) as sM5,SUM(M6_Ach) as sM6,SUM(M7_Ach) as sM7,SUM(M8_Ach) as sM8,SUM(M9_Ach) as sM9,SUM(M10_Ach) as sM10,SUM(M11_Ach) as sM11,SUM(M12_Ach) as sM12 from hrm_sales_sal_details INNER JOIN hrm_sales_dealer ON hrm_sales_sal_details.DealerId=hrm_sales_dealer.DealerId INNER JOIN hrm_sales_hq_temp ON hrm_sales_dealer.HqId=hrm_sales_hq_temp.HqId INNER JOIN hrm_employee_general ON hrm_sales_hq_temp.EmployeeID=hrm_employee_general.EmployeeID where HqTEmpStatus='A' AND (hrm_sales_hq_temp.EmployeeID=".$EmployeeId." OR hrm_employee_general.RepEmployeeID=".$EmployeeId.") AND hrm_sales_sal_details.ProductId=".$res['ProductId']." AND hrm_sales_sal_details.YearId=".$Before2YId, $con); $resP0=mysql_fetch_assoc($sqlP0);
$P0p1=$resP0['sM1']+$resP0['sM2']+$resP0['sM3']; $P0p2=$resP0['sM4']+$resP0['sM5']+$resP0['sM6'];
$P0p3=$resP0['sM7']+$resP0['sM8']+$resP0['sM9']; $P0p4=$resP0['sM10']+$resP0['sM11']+$resP0['sM12'];
 
$sqlP1=mysql_query("select SUM(M1_Ach) as sM1,SUM(M2_Ach) as sM2,SUM(M3_Ach) as sM3,SUM(M4_Ach) as sM4,SUM(M5_Ach) as sM5,SUM(M6_Ach) as sM6,SUM(M7_Ach) as sM7,SUM(M8_Ach) as sM8,SUM(M9_Ach) as sM9,SUM(M10_Ach) as sM10,SUM(M11_Ach) as sM11,SUM(M12_Ach) as sM12 from hrm_sales_sal_details INNER JOIN hrm_sales_dealer ON hrm_sales_sal_details.DealerId=hrm_sales_dealer.DealerId INNER JOIN hrm_sales_hq_temp ON hrm_sales_dealer.HqId=hrm_sales_hq_temp.HqId INNER JOIN hrm_employee_general ON hrm_sales_hq_temp.EmployeeID=hrm_employee_general.EmployeeID where HqTEmpStatus='A' AND (hrm_sales_hq_temp.EmployeeID=".$EmployeeId." OR hrm_employee_general.RepEmployeeID=".$EmployeeId.") AND hrm_sales_sal_details.ProductId=".$res['ProductId']." AND hrm_sales_sal_details.YearId=".$BeforeYId, $con); $resP1=mysql_fetch_assoc($sqlP1);
$Pp1=$resP1['sM1']+$resP1['sM2']+$resP1['sM3']; $Pp2=$resP1['sM4']+$resP1['sM5']+$resP1['sM6'];
$Pp3=$resP1['sM7']+$resP1['sM8']+$resP1['sM9']; $Pp4=$resP1['sM10']+$resP1['sM11']+$resP1['sM12'];

/*
$sqlP2=mysql_query("select SUM(M1) as sM1,SUM(M2) as sM2,SUM(M3) as sM3,SUM(M4) as sM4,SUM(M5) as sM5,SUM(M6) as sM6,SUM(M7) as sM7,SUM(M8) as sM8,SUM(M9) as sM9,SUM(M10) as sM10,SUM(M11) as sM11,SUM(M12) as sM12 from hrm_sales_sal_details where ReportingTerId=".$EmployeeId." AND hrm_sales_sal_details.ProductId=".$res['ProductId']." AND hrm_sales_sal_details.YearId=".$_REQUEST['y'], $con); $resP2=mysql_fetch_assoc($sqlP2);
$P2p1=$resP2['sM1']+$resP2['sM2']+$resP2['sM3']; $P2p2=$resP2['sM4']+$resP2['sM5']+$resP2['sM6'];
$P2p3=$resP2['sM7']+$resP2['sM8']+$resP2['sM9']; $P2p4=$resP2['sM10']+$resP2['sM11']+$resP2['sM12'];
$sqlP3=mysql_query("select SUM(M1) as sM1,SUM(M2) as sM2,SUM(M3) as sM3,SUM(M4) as sM4,SUM(M5) as sM5,SUM(M6) as sM6,SUM(M7) as sM7,SUM(M8) as sM8,SUM(M9) as sM9,SUM(M10) as sM10,SUM(M11) as sM11,SUM(M12) as sM12 from hrm_sales_sal_details where ReportingTerId=".$EmployeeId." AND hrm_sales_sal_details.ProductId=".$res['ProductId']." AND hrm_sales_sal_details.YearId=".$AfterYId, $con); $resP3=mysql_fetch_assoc($sqlP3);
$P3p1=$resP3['sM1']+$resP3['sM2']+$resP3['sM3']; $P3p2=$resP3['sM4']+$resP3['sM5']+$resP3['sM6'];
$P3p3=$resP3['sM7']+$resP3['sM8']+$resP3['sM9']; $P3p4=$resP3['sM10']+$resP3['sM11']+$resP3['sM12'];
*/

$sqlP4=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_hq where HqRepEmpID=".$EmployeeId." AND ProductId=".$res['ProductId']." AND YearId=".$_REQUEST['y'], $con);
$sqlP5=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_hq where HqRepEmpID=".$EmployeeId." AND ProductId=".$res['ProductId']." AND YearId=".$AfterYId, $con); $resP4=mysql_fetch_assoc($sqlP4); $resP5=mysql_fetch_assoc($sqlP5);

?>	

   <tr bgcolor="#EEEEEE" style="height:22px;">
<?php if($_REQUEST['ii']=='All_1' OR $_REQUEST['ii']=='All_2' OR $_REQUEST['ac']==1){ ?>	  
     <td bgcolor="#FFFFFF">&nbsp;<?php echo $res['ItemName']; ?></td>
<?php } ?>		 
	 <td bgcolor="#FFFFFF">&nbsp;<?php echo $res['ProductName']; ?><input type="hidden" id="P_<?php echo $Sn; ?>" value="<?php echo $res['ProductId']; ?>" /></td>
	 <td bgcolor="#FFFFFF" align="center">&nbsp;<?php echo substr_replace($res['TypeName'], '', 2); ?></td>		
<td id="<?php echo 'TM1_D'.$Sn; ?>"><input class="Input" id="M1_D<?php echo $Sn; ?>" value="<?php if($P0p1!='' AND $P0p1!=0){echo $P0p1;} ?>" readonly/></td>	 	 							
<td id="<?php echo 'TM1_A'.$Sn; ?>"><input class="Input" id="M1_A<?php echo $Sn; ?>" value="<?php if($Pp1!='' AND $Pp1!=0){echo $Pp1;} ?>" readonly/></td>
<?php /*<td id=""><input class="Input" id="" value="<?php if($P2p1!='' AND $P2p1!=0){echo $P2p1;} ?>" readonly/></td>*/ ?>
<?php /*<td id=""><input class="Input" id="" value="<?php if($P3p1!='' AND $P3p1!=0){echo $P3p1;} ?>" readonly/></td>*/ ?>
<td id="<?php echo 'TM1_B'.$Sn; ?>">
<input class="Input" id="M1_B<?php echo $Sn; ?>" style="background-color:#D3FED7;" value="<?php if($resP4['Qa']!='' AND $resP4['Qa']!=0){echo $resP4['Qa'];} ?>" readonly/></td>
<td id="<?php echo 'TM1_C'.$Sn; ?>">
<input class="Input" id="M1_C<?php echo $Sn; ?>" style="background-color:#D3FED7;" value="<?php if($resP5['Qa']!='' AND $resP5['Qa']!=0){echo $resP5['Qa'];} ?>" readonly/></td>

<td id="<?php echo 'TM2_D'.$Sn; ?>"><input class="Input" id="M2_D<?php echo $Sn; ?>" value="<?php if($P0p2!='' AND $P0p2!=0){echo $P0p2;} ?>" readonly/></td>
<td id="<?php echo 'TM2_A'.$Sn; ?>"><input class="Input" id="M2_A<?php echo $Sn; ?>" value="<?php if($Pp2!='' AND $Pp2!=0){echo $Pp2;} ?>" readonly/></td>
<?php /*<td id=""><input class="Input" id="" value="<?php if($P2p2!='' AND $P2p2!=0){echo $P2p2;} ?>" readonly/></td>*/ ?>
<?php /*<td id=""><input class="Input" id="" value="<?php if($P3p2!='' AND $P3p2!=0){echo $P3p2;} ?>" readonly/></td>*/ ?>
<td id="<?php echo 'TM2_B'.$Sn; ?>">
<input class="Input" id="M2_B<?php echo $Sn; ?>" style="background-color:#D3FED7;" value="<?php if($resP4['Qb']!='' AND $resP4['Qb']!=0){echo $resP4['Qb'];} ?>" readonly/></td>
<td id="<?php echo 'TM2_C'.$Sn; ?>">
<input class="Input" id="M2_C<?php echo $Sn; ?>" style="background-color:#D3FED7;" value="<?php if($resP5['Qb']!='' AND $resP5['Qb']!=0){echo $resP5['Qb'];} ?>" readonly/></td>

<td id="<?php echo 'TM3_D'.$Sn; ?>"><input class="Input" id="M3_D<?php echo $Sn; ?>" value="<?php if($P0p3!='' AND $P0p3!=0){echo $P0p3;} ?>" readonly/></td>
<td id="<?php echo 'TM3_A'.$Sn; ?>"><input class="Input" id="M3_A<?php echo $Sn; ?>" value="<?php if($Pp3!='' AND $Pp3!=0){echo $Pp3;} ?>" readonly/></td>
<?php /*<td id=""><input class="Input" id="" value="<?php if($P2p3!='' AND $P2p3!=0){echo $P2p3;} ?>" readonly/></td>*/ ?>
<?php /*<td id=""><input class="Input" id="" value="<?php if($P3p3!='' AND $P3p3!=0){echo $P3p3;} ?>" readonly/></td>*/ ?>
<td id="<?php echo 'TM3_B'.$Sn; ?>">
<input class="Input" id="M3_B<?php echo $Sn; ?>" style="background-color:#D3FED7;" value="<?php if($resP4['Qc']!='' AND $resP4['Qc']!=0){echo $resP4['Qc'];} ?>" readonly/></td>
<td id="<?php echo 'TM3_C'.$Sn; ?>">
<input class="Input" id="M3_C<?php echo $Sn; ?>" style="background-color:#D3FED7;" value="<?php if($resP5['Qc']!='' AND $resP5['Qc']!=0){echo $resP5['Qc'];} ?>" readonly/></td>

<td id="<?php echo 'TM3_D'.$Sn; ?>"><input class="Input" id="M4_D<?php echo $Sn; ?>" value="<?php if($P0p4!='' AND $P0p4!=0){echo $P0p4;} ?>" readonly/></td>
<td id="<?php echo 'TM3_A'.$Sn; ?>"><input class="Input" id="M4_A<?php echo $Sn; ?>" value="<?php if($Pp4!='' AND $Pp4!=0){echo $Pp4;} ?>" readonly/></td>
<?php /*<td id=""><input class="Input" id="" value="<?php if($P2p4!='' AND $P2p4!=0){echo $P2p4;} ?>" readonly/></td>*/ ?>
<?php /*<td id=""><input class="Input" id="" value="<?php if($P3p4!='' AND $P3p4!=0){echo $P3p4;} ?>" readonly/></td>*/ ?>
<td id="<?php echo 'TM3_B'.$Sn; ?>">
<input class="Input" id="M4_B<?php echo $Sn; ?>" style="background-color:#D3FED7;" value="<?php if($resP4['Qd']!='' AND $resP4['Qd']!=0){echo $resP4['Qd'];} ?>" readonly/></td>
<td id="<?php echo 'TM3_C'.$Sn; ?>">
<input class="Input" id="M4_C<?php echo $Sn; ?>" style="background-color:#D3FED7;" value="<?php if($resP5['Qd']!='' AND $resP5['Qd']!=0){echo $resP5['Qd'];} ?>" readonly/></td>

<?php $TotP0=$P0p1+$P0p2+$P0p3+$P0p4; $TotP1=$Pp1+$Pp2+$Pp3+$Pp4; //$TotP2=$P2p1+$P2p2+$P2p3+$P2p4; $TotP3=$P3p1+$P3p2+$P3p3+$P3p4;
      $TotP4=$resP4['Qa']+$resP4['Qb']+$resP4['Qc']+$resP4['Qd']; $TotP5=$resP5['Qa']+$resP5['Qb']+$resP5['Qc']+$resP5['Qd']; ?> 
<td id="<?php echo 'TTotP0_'.$Sn; ?>"><input class="InputB" id="TotP0_<?php echo $Sn; ?>" value="<?php if($TotP0!=0 AND $TotP0!=''){echo $TotP0;}else{echo '';} ?>" readonly/></td> 
<td id="<?php echo 'TTotP1_'.$Sn; ?>"><input class="InputB" id="TotP1_<?php echo $Sn; ?>" value="<?php if($TotP1!=0 AND $TotP1!=''){echo $TotP1;}else{echo '';} ?>" readonly/></td>
<?php /*	 <td id=""><input class="InputB" id="" value="<?php if($TotP2!=0 AND $TotP2!=''){echo $TotP2;}else{echo '';} ?>" readonly/></td>*/ ?>
<?php /*	 <td id=""><input class="InputB" id="" value="<?php if($TotP3!=0 AND $TotP3!=''){echo $TotP3;}else{echo '';} ?>" readonly/></td>*/ ?>
<td id="<?php echo 'TTotP2_'.$Sn; ?>"><input class="InputB" id="TotP2_<?php echo $Sn; ?>" value="<?php if($TotP4!=0 AND $TotP4!=''){echo $TotP4;}else{echo '';} ?>" readonly/></td>
<td id="<?php echo 'TTotP3_'.$Sn; ?>"><input class="InputB" id="TotP3_<?php echo $Sn; ?>" value="<?php if($TotP5!=0 AND $TotP5!=''){echo $TotP5;}else{echo '';} ?>" readonly/></td>
<?php
$SsqlP0=mysql_query("select Q1,Q2,Q3,Q4 from hrm_sales_sal_details_terr where TerrEmpID=".$EmployeeId." AND ProductId=".$res['ProductId']." AND YearId=".$Before2YId, $con); 
$SsqlP1=mysql_query("select Q1,Q2,Q3,Q4 from hrm_sales_sal_details_terr where TerrEmpID=".$EmployeeId." AND ProductId=".$res['ProductId']." AND YearId=".$BeforeYId, $con); 
$SsqlP2=mysql_query("select Q1,Q2,Q3,Q4 from hrm_sales_sal_details_terr where TerrEmpID=".$EmployeeId." AND ProductId=".$res['ProductId']." AND YearId=".$_REQUEST['y'], $con);
$SsqlP3=mysql_query("select Q1,Q2,Q3,Q4 from hrm_sales_sal_details_terr where TerrEmpID=".$EmployeeId." AND ProductId=".$res['ProductId']." AND YearId=".$AfterYId, $con); 
$SresP0=mysql_fetch_assoc($SsqlP0); $SresP1=mysql_fetch_assoc($SsqlP1); $SresP2=mysql_fetch_assoc($SsqlP2); $SresP3=mysql_fetch_assoc($SsqlP3); 
$SToptP0=$SresP0['Q1']+$SresP0['Q2']+$SresP0['Q3']+$SresP0['Q4']; $SToptP1=$SresP1['Q1']+$SresP1['Q2']+$SresP1['Q3']+$SresP1['Q4']; 
$SToptP2=$SresP2['Q1']+$SresP2['Q2']+$SresP2['Q3']+$SresP2['Q4']; $SToptP3=$SresP3['Q1']+$SresP3['Q2']+$SresP3['Q3']+$SresP3['Q4']; ?>
    <td style="width:70px;font-weight:bold;background-color:#D7FFAE;" align="right"><?php if($SToptP0!=0 AND $SToptP0!=''){echo $SToptP0;}else{echo '';} ?>&nbsp;
	<input type="hidden" id="STotP0_<?php echo $Sn; ?>" value="<?php if($SToptP0!=0 AND $SToptP0!=''){echo $SToptP0;}else{echo '';} ?>" /></td>
    <td style="width:70px;font-weight:bold;background-color:#D7FFAE;" align="right"><?php if($SToptP1!=0 AND $SToptP1!=''){echo $SToptP1;}else{echo '';} ?>&nbsp;
	<input type="hidden" id="STotP1_<?php echo $Sn; ?>" value="<?php if($SToptP1!=0 AND $SToptP1!=''){echo $SToptP1;}else{echo '';} ?>" /></td>
	<td style="width:70px;font-weight:bold;background-color:#D7FFAE;" align="right"><?php if($SToptP2!=0 AND $SToptP2!=''){echo $SToptP2;}else{echo '';} ?>&nbsp;
	<input type="hidden" id="STotP2_<?php echo $Sn; ?>" value="<?php if($SToptP2!=0 AND $SToptP2!=''){echo $SToptP2;}else{echo '';} ?>" /></td>
	<td style="width:70px;font-weight:bold;background-color:#D7FFAE;" align="right"><?php if($SToptP3!=0 AND $SToptP3!=''){echo $SToptP3;}else{echo '';} ?>&nbsp;
	<input type="hidden" id="STotP3_<?php echo $Sn; ?>" value="<?php if($SToptP3!=0 AND $SToptP3!=''){echo $SToptP3;}else{echo '';} ?>" /></td>	 
	</tr>	
<?php $Sn++; } $ActSn=$Sn-1; echo '<input type="hidden" id="ActualSn" value="'.$ActSn.'" />';  ?>    
<?php if($_REQUEST['ii']!='All_1' AND $_REQUEST['ii']!='All_2' AND $_REQUEST['ac']!=1){ 
$sqlP0t=mysql_query("select SUM(M1_Ach) as tsM1,SUM(M2_Ach) as tsM2,SUM(M3_Ach) as tsM3,SUM(M4_Ach) as tsM4,SUM(M5_Ach) as tsM5,SUM(M6_Ach) as tsM6,SUM(M7_Ach) as tsM7,SUM(M8_Ach) as tsM8,SUM(M9_Ach) as tsM9,SUM(M10_Ach) as tsM10,SUM(M11_Ach) as tsM11,SUM(M12_Ach) as tsM12 from hrm_sales_sal_details INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details.ProductId=hrm_sales_seedsproduct.ProductId INNER JOIN hrm_sales_dealer ON hrm_sales_sal_details.DealerId=hrm_sales_dealer.DealerId INNER JOIN hrm_sales_hq_temp ON hrm_sales_dealer.HqId=hrm_sales_hq_temp.HqId INNER JOIN hrm_employee_general ON hrm_sales_hq_temp.EmployeeID=hrm_employee_general.EmployeeID where HqTEmpStatus='A' AND (hrm_sales_hq_temp.EmployeeID=".$EmployeeId." OR hrm_employee_general.RepEmployeeID=".$EmployeeId.") AND hrm_sales_seedsproduct.ItemId=".$_REQUEST['ii']." AND hrm_sales_sal_details.YearId=".$Before2YId, $con); $resP0t=mysql_fetch_assoc($sqlP0t);
$TotP0p1=$resP0t['tsM1']+$resP0t['tsM2']+$resP0t['tsM3']; $TotP0p2=$resP0t['tsM4']+$resP0t['tsM5']+$resP0t['tsM6'];
$TotP0p3=$resP0t['tsM7']+$resP0t['tsM8']+$resP0t['tsM9']; $TotP0p4=$resP0t['tsM10']+$resP0t['tsM11']+$resP0t['tsM12'];

$sqlP1t=mysql_query("select SUM(M1_Ach) as tsM1,SUM(M2_Ach) as tsM2,SUM(M3_Ach) as tsM3,SUM(M4_Ach) as tsM4,SUM(M5_Ach) as tsM5,SUM(M6_Ach) as tsM6,SUM(M7_Ach) as tsM7,SUM(M8_Ach) as tsM8,SUM(M9_Ach) as tsM9,SUM(M10_Ach) as tsM10,SUM(M11_Ach) as tsM11,SUM(M12_Ach) as tsM12 from hrm_sales_sal_details INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details.ProductId=hrm_sales_seedsproduct.ProductId INNER JOIN hrm_sales_dealer ON hrm_sales_sal_details.DealerId=hrm_sales_dealer.DealerId INNER JOIN hrm_sales_hq_temp ON hrm_sales_dealer.HqId=hrm_sales_hq_temp.HqId INNER JOIN hrm_employee_general ON hrm_sales_hq_temp.EmployeeID=hrm_employee_general.EmployeeID where HqTEmpStatus='A' AND (hrm_sales_hq_temp.EmployeeID=".$EmployeeId." OR hrm_employee_general.RepEmployeeID=".$EmployeeId.") AND hrm_sales_seedsproduct.ItemId=".$_REQUEST['ii']." AND hrm_sales_sal_details.YearId=".$BeforeYId, $con); $resP1t=mysql_fetch_assoc($sqlP1t);
$TotPp1=$resP1t['tsM1']+$resP1t['tsM2']+$resP1t['tsM3']; $TotPp2=$resP1t['tsM4']+$resP1t['tsM5']+$resP1t['tsM6'];
$TotPp3=$resP1t['tsM7']+$resP1t['tsM8']+$resP1t['tsM9']; $TotPp4=$resP1t['tsM10']+$resP1t['tsM11']+$resP1t['tsM12'];

/*
$sqlP2t=mysql_query("select SUM(M1) as tsM1,SUM(M2) as tsM2,SUM(M3) as tsM3,SUM(M4) as tsM4,SUM(M5) as tsM5,SUM(M6) as tsM6,SUM(M7) as tsM7,SUM(M8) as tsM8,SUM(M9) as tsM9,SUM(M10) as tsM10,SUM(M11) as tsM11,SUM(M12) as tsM12 from hrm_sales_sal_details where ReportingTerId=".$EmployeeId." AND hrm_sales_sal_details.ItemId=".$_REQUEST['ii']." AND hrm_sales_sal_details.YearId=".$_REQUEST['y'], $con); $resP2t=mysql_fetch_assoc($sqlP2t);
$TotP2p1=$resP2t['tsM1']+$resP2t['tsM2']+$resP2t['tsM3']; $TotP2p2=$resP2t['tsM4']+$resP2t['tsM5']+$resP2t['tsM6'];
$TotP2p3=$resP2t['tsM7']+$resP2t['tsM8']+$resP2t['tsM9']; $TotP2p4=$resP2t['tsM10']+$resP2t['tsM11']+$resP2t['tsM12'];
$sqlP3t=mysql_query("select SUM(M1) as tsM1,SUM(M2) as tsM2,SUM(M3) as tsM3,SUM(M4) as tsM4,SUM(M5) as tsM5,SUM(M6) as tsM6,SUM(M7) as tsM7,SUM(M8) as tsM8,SUM(M9) as tsM9,SUM(M10) as tsM10,SUM(M11) as tsM11,SUM(M12) as tsM12 from hrm_sales_sal_details where ReportingTerId=".$EmployeeId." AND hrm_sales_sal_details.ItemId=".$_REQUEST['ii']." AND hrm_sales_sal_details.YearId=".$AfterYId, $con);  $resP3t=mysql_fetch_assoc($sqlP3t);
$TotP3p1=$resP3t['tsM1']+$resP3t['tsM2']+$resP3t['tsM3']; $TotP3p2=$resP3t['tsM4']+$resP3t['tsM5']+$resP3t['tsM6'];
$TotP3p3=$resP3t['tsM7']+$resP3t['tsM8']+$resP3t['tsM9']; $TotP3p4=$resP3t['tsM10']+$resP3t['tsM11']+$resP3t['tsM12'];
*/
$sqlP4t=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_hq INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details_hq.ProductId=hrm_sales_seedsproduct.ProductId where hrm_sales_sal_details_hq.HqRepEmpID=".$EmployeeId." AND hrm_sales_seedsproduct.ItemId=".$_REQUEST['ii']." AND hrm_sales_sal_details_hq.YearId=".$_REQUEST['y'], $con);
$sqlP5t=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_hq INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details_hq.ProductId=hrm_sales_seedsproduct.ProductId where hrm_sales_sal_details_hq.HqRepEmpID=".$EmployeeId." AND hrm_sales_seedsproduct.ItemId=".$_REQUEST['ii']." AND hrm_sales_sal_details_hq.YearId=".$AfterYId, $con); $resP4t=mysql_fetch_assoc($sqlP4t); $resP5t=mysql_fetch_assoc($sqlP5t);

 

?>
   <tr style="font-size:14px;color:#000000;background-color:#FFFFA6;height:24px;">
	 <td colspan="2" align="right" style="font-size:16px;"><b>TOTAL:&nbsp;</b></td>
	 <td><input class="TInput" id="TotP1_TD" value="<?php if($TotP0p1>0){echo $TotP0p1;} ?>" readonly/></td>
	 <td><input class="TInput" id="TotP1_TA" value="<?php if($TotPp1>0){echo $TotPp1;} ?>" readonly/></td>		
<?php /*	 <td><input class="TInput" id="" value="<?php if($TotP2p1>0){echo $TotP2p1;} ?>" readonly/></td>*/ ?>
<?php /*	 <td><input class="TInput" id="" value="<?php if($TotP3p1>0){echo $TotP3p1;} ?>" readonly/></td>*/ ?>
	 <td><input class="TInput" id="TotP1_TB" value="<?php if($resP4t['Qa']>0){echo $resP4t['Qa'];} ?>" readonly/></td>
	 <td><input class="TInput" id="TotP1_TC" value="<?php if($resP5t['Qa']>0){echo $resP5t['Qa'];} ?>" readonly/></td>
	 
	 <td><input class="TInput" id="TotP2_TD" value="<?php if($TotP0p2>0){echo $TotP0p2;} ?>" readonly/></td>
	 <td><input class="TInput" id="TotP2_TA" value="<?php if($TotPp2>0){echo $TotPp2;} ?>" readonly/></td>
<?php /*	 <td><input class="TInput" id="" value="<?php if($TotP2p2>0){echo $TotP2p2;} ?>" readonly/></td>*/ ?>
<?php /*	 <td><input class="TInput" id="" value="<?php if($TotP3p2>0){echo $TotP3p2;} ?>" readonly/></td>*/ ?>
	 <td><input class="TInput" id="TotP2_TB" value="<?php if($resP4t['Qb']>0){echo $resP4t['Qb'];} ?>" readonly/></td>
	 <td><input class="TInput" id="TotP2_TC" value="<?php if($resP5t['Qb']>0){echo $resP5t['Qb'];} ?>" readonly/></td>
	 
	 <td><input class="TInput" id="TotP3_TD" value="<?php if($TotP0p3>0){echo $TotP0p3;} ?>" readonly/></td>
	 <td><input class="TInput" id="TotP3_TA" value="<?php if($TotPp3>0){echo $TotPp3;} ?>" readonly/></td>
<?php /*	 <td><input class="TInput" id="" value="<?php if($TotP2p3>0){echo $TotP2p3;} ?>" readonly/></td>*/ ?>	 
<?php /*	 <td><input class="TInput" id="" value="<?php if($TotP3p3>0){echo $TotP3p3;} ?>" readonly/></td>*/ ?>	
	 <td><input class="TInput" id="TotP3_TB" value="<?php if($resP4t['Qc']>0){echo $resP4t['Qc'];} ?>" readonly/></td>	 
	 <td><input class="TInput" id="TotP3_TC" value="<?php if($resP5t['Qc']>0){echo $resP5t['Qc'];} ?>" readonly/></td>	
	  
	 <td><input class="TInput" id="TotP4_TD" value="<?php if($TotP0p4>0){echo $TotP0p4;} ?>" readonly/></td>
	 <td><input class="TInput" id="TotP4_TA" value="<?php if($TotPp4>0){echo $TotPp4;} ?>" readonly/></td>		
<?php /*	 <td><input class="TInput" id="" value="<?php if($TotP2p4>0){echo $TotP2p4;} ?>" readonly/></td>*/ ?>	 
<?php /*	 <td><input class="TInput" id="" value="<?php if($TotP3p4>0){echo $TotP3p4;} ?>" readonly/></td>*/ ?>
	 <td><input class="TInput" id="TotP4_TB" value="<?php if($resP4t['Qd']>0){echo $resP4t['Qd'];} ?>" readonly/></td>	 
	 <td><input class="TInput" id="TotP4_TC" value="<?php if($resP5t['Qd']>0){echo $resP5t['Qd'];} ?>" readonly/></td>
	 
<?php $TotP0t=$TotP0p1+$TotP0p2+$TotP0p3+$TotP0p4; $TotP1t=$TotPp1+$TotPp2+$TotPp3+$TotPp4; 
      //$TotP2t=$TotP2p1+$TotP2p2+$TotP2p3+$TotP2p4; $TotP3t=$TotP3p1+$TotP3p2+$TotP3p3+$TotP3p4;
      $TotP4t=$resP4t['Qa']+$resP4t['Qb']+$resP4t['Qc']+$resP4t['Qd']; $TotP5t=$resP5t['Qa']+$resP5t['Qb']+$resP5t['Qc']; ?>
	  <td><input class="TInput" id="TotM_DeT" value="<?php if($TotP0t!=0 AND $TotP0t!=''){echo $TotP0t;}else{echo '';} ?>" readonly/></td>
      <td><input class="TInput" id="TotM_AeT" value="<?php if($TotP1t!=0 AND $TotP1t!=''){echo $TotP1t;}else{echo '';} ?>" readonly/></td>
<?php /*	  <td><input class="TInput" id="" value="<?php if($TotP2t!=0 AND $TotP2t!=''){echo $TotP2t;}else{echo '';} ?>" readonly/></td>*/ ?>	  
<?php /*	  <td><input class="TInput" id="" value="<?php if($TotP3t!=0 AND $TotP3t!=''){echo $TotP3t;}else{echo '';} ?>" readonly/></td>*/ ?>
	  <td><input class="TInput" id="TotM_BeT" value="<?php if($TotP4t!=0 AND $TotP4t!=''){echo $TotP4t;}else{echo '';} ?>" readonly/></td>	  
	  <td><input class="TInput" id="TotM_CeT" value="<?php if($TotP5t!=0 AND $TotP5t!=''){echo $TotP5t;}else{echo '';} ?>" readonly/></td>
<?php
$TSsqlP0=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_terr INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details_terr.ProductId=hrm_sales_seedsproduct.ProductId where hrm_sales_sal_details_terr.TerrEmpID=".$EmployeeId." AND hrm_sales_seedsproduct.ItemId=".$_REQUEST['ii']." AND hrm_sales_sal_details_terr.YearId=".$Before2YId, $con); 
$TSsqlP1=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_terr INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details_terr.ProductId=hrm_sales_seedsproduct.ProductId where hrm_sales_sal_details_terr.TerrEmpID=".$EmployeeId." AND hrm_sales_seedsproduct.ItemId=".$_REQUEST['ii']." AND hrm_sales_sal_details_terr.YearId=".$BeforeYId, $con); 
$TSsqlP2=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_terr INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details_terr.ProductId=hrm_sales_seedsproduct.ProductId where hrm_sales_sal_details_terr.TerrEmpID=".$EmployeeId." AND hrm_sales_seedsproduct.ItemId=".$_REQUEST['ii']." AND hrm_sales_sal_details_terr.YearId=".$_REQUEST['y'], $con); 
$TSsqlP3=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_terr INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details_terr.ProductId=hrm_sales_seedsproduct.ProductId where hrm_sales_sal_details_terr.TerrEmpID=".$EmployeeId." AND hrm_sales_seedsproduct.ItemId=".$_REQUEST['ii']." AND hrm_sales_sal_details_terr.YearId=".$AfterYId, $con); 
$TSresP0=mysql_fetch_assoc($TSsqlP0); $TSresP1=mysql_fetch_assoc($TSsqlP1); $TSresP2=mysql_fetch_assoc($TSsqlP2); $TSresP3=mysql_fetch_assoc($TSsqlP3); 
$TSTotP0=$TSresP0['Qa']+$TSresP0['Qb']+$TSresP0['Qc']+$TSresP0['Qd']; $TSTotP1=$TSresP1['Qa']+$TSresP1['Qb']+$TSresP1['Qc']+$TSresP1['Qd']; 
$TSTotP2=$TSresP2['Qa']+$TSresP2['Qb']+$TSresP2['Qc']+$TSresP2['Qd']; $TSTotP3=$TSresP3['Qa']+$TSresP3['Qb']+$TSresP3['Qc']+$TSresP3['Qd'];
?>
    <td style="width:70px;font-weight:bold;" align="right"><?php if($TSTotP0!=0 AND $TSTotP0!=''){echo $TSTotP0;}else{echo '';} ?>&nbsp;</td>
    <td style="width:70px;font-weight:bold;" align="right"><?php if($TSTotP1!=0 AND $TSTotP1!=''){echo $TSTotP1;}else{echo '';} ?>&nbsp;</td>
	<td style="width:70px;font-weight:bold;" align="right"><?php if($TSTotP2!=0 AND $TSTotP2!=''){echo $TSTotP2;}else{echo '';} ?>&nbsp;</td>
	<td style="width:70px;font-weight:bold;" align="right"><?php if($TSTotP3!=0 AND $TSTotP3!=''){echo $TSTotP3;}else{echo '';} ?>&nbsp;</td>		  
   </tr>	
<?php } ?>  
<?php /********************** Overall Total Close ****************************/ ?>
</table>	     
 </td>
</tr>
<?php if($_REQUEST['ac']!=1) { ?>
<tr>
<td>
 <table border="0" cellpadding="0" cellspacing="4" cellpadding="0">
<?php $sqlRepHq = mysql_query("select hrm_employee.EmployeeID,Fname,Sname,Lname,Gender,DR,Married,hrm_employee_general.HqId,HqName from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee_general.EmployeeID=hrm_employee_personal.EmployeeID INNER JOIN hrm_headquater ON hrm_employee_general.HqId=hrm_headquater.HqId where hrm_employee.EmpStatus='A' AND hrm_employee_general.DepartmentId=6 AND (hrm_employee_general.RepEmployeeID=".$EmployeeId." OR hrm_employee_general.EmployeeID=".$EmployeeId.") order by hrm_employee_general.EmployeeID ASC", $con); $resRepHqRow=mysql_num_rows($sqlRepHq);  
      $DealRow=$resRepHqRow+1; echo '<input type="hidden" id="DealRows" value="'.$DealRow.'" />'; $counter=1; 
while($resRepHq=mysql_fetch_array($sqlRepHq)){	  /*********** Open Hq **********/ 
if($resRepHq['DR']=='Y'){$M='Dr.';} elseif($resRepHq['Gender']=='M'){$M='Mr.';} elseif($resRepHq['Gender']=='F' AND $resRepHq['Married']=='Y'){$M='Mrs.';} elseif($resRepHq['Gender']=='F' AND $resRepHq['Married']=='N'){$M='Miss.';} $Ename=$resRepHq['Fname'].' '.$resRepHq['Sname'].' '.$resRepHq['Lname']; $HqEmpId=$resRepHq['EmployeeID']; $HqId=$resRepHq['HqId']; ?>
<tr style="background-color:#CBD7F3;">
 <table border="0"> 
<?php //////////////////////////////////////////////////////////*****************Open Open *********************/////////////////////////////////////////// ?> 
<?php $sHq2=mysql_query("select HqId from hrm_sales_hq_temp where EmployeeID=".$HqEmpId." AND HqId!=".$HqId, $con); $rowHq2=mysql_num_rows($sHq2);
      echo '<input type="hidden" id="Rowhq2" value="'.$rowHq2.'" />';
      if($rowHq2==1){$resHq2=mysql_fetch_assoc($sHq2); echo '<input type="hidden" id="h1q" value="'.$resHq2['HqId'].'" />';} ?> 	  
  <tr>
   <td>
<table border="1" cellpadding="0" cellspacing="0" style="font-family:Times New Roman;font-size:14px;width:<?php if($_REQUEST['ii']=='All_1' OR $_REQUEST['ii']=='All_2'){ echo '2200px';}else{echo '2200px';}?>;">	
  <tr style="background-color:#D5F1D1;color:#000000;">
    <td colspan="<?php if($_REQUEST['ii']=='All_1' OR $_REQUEST['ii']=='All_2'){echo 4;}else{echo 3;}?>" style="font-size:16px;color:#FFFF00;background-color:#183E83;">&nbsp;<b><?php echo ucfirst(strtolower($Ename)).'-<font color="#D7EBFF">'.$resRepHq['HqName'].'</font>'; ?></b></td>
<td colspan="6" align="center"><b>Quarter 1</b></td><td colspan="6" align="center"><b>Quarter 2</b></td>
<td colspan="6" align="center"><b>Quarter 3</b></td><td colspan="6" align="center"><b>Quarter 4</b></td>
<td colspan="6" align="center"><b>TOTAL</b></td>
  </tr>	
   <tr style="background-color:#D5F1D1;color:#000000;">
<?php if($_REQUEST['ii']=='All_1' OR $_REQUEST['ii']=='All_2'){ ?>   
    <td align="center" style="width:150px;"><b>CROP</b></td>
<?php } ?>	
	<td align="center" style="width:250px;"><b>VARIETY</b></td>
	<td align="center" style="width:50px;"><b>&nbsp;TYPE&nbsp;</b></td>
	<td align="center" style="width:50px;"><b>&nbsp;Edit&nbsp;</b></td>
<?php	/* <td align="center" style="width:50px;"><b>&nbsp;Submit&nbsp;</b></td> */ ?>

	<td class="Trh60"><?php echo $y0T.'<br>'.$y0; ?></td><td class="Trh60"><?php echo $y1T.'<br>'.$y1; ?></td><td class="Trh60"><?php echo $y2T.'<br>'.$y2; ?></td>
	<td class="Trh60"><?php echo $y3T.'<br>'.$y3; ?></td><td class="Trh60"><?php echo $y2; ?></td><td class="Trh60"><?php echo $y3; ?></td>
	
	<td class="Trh60"><?php echo $y0T.'<br>'.$y0; ?></td><td class="Trh60"><?php echo $y1T.'<br>'.$y1; ?></td><td class="Trh60"><?php echo $y2T.'<br>'.$y2; ?></td>
	<td class="Trh60"><?php echo $y3T.'<br>'.$y3; ?></td><td class="Trh60"><?php echo $y2; ?></td><td class="Trh60"><?php echo $y3; ?></td>
	
	<td class="Trh60"><?php echo $y0T.'<br>'.$y0; ?></td><td class="Trh60"><?php echo $y1T.'<br>'.$y1; ?></td><td class="Trh60"><?php echo $y2T.'<br>'.$y2; ?></td>
	<td class="Trh60"><?php echo $y3T.'<br>'.$y3; ?></td><td class="Trh60"><?php echo $y2; ?></td><td class="Trh60"><?php echo $y3; ?></td>
	
	<td class="Trh60"><?php echo $y0T.'<br>'.$y0; ?></td><td class="Trh60"><?php echo $y1T.'<br>'.$y1; ?></td><td class="Trh60"><?php echo $y2T.'<br>'.$y2; ?></td>
	<td class="Trh60"><?php echo $y3T.'<br>'.$y3; ?></td><td class="Trh60"><?php echo $y2; ?></td><td class="Trh60"><?php echo $y3; ?></td>
	
	<td class="Trh60"><?php echo $y0T.'<br>'.$y0; ?></td><td class="Trh60"><?php echo $y1T.'<br>'.$y1; ?></td><td class="Trh60"><?php echo $y2T.'<br>'.$y2; ?></td>
	<td class="Trh60"><?php echo $y3T.'<br>'.$y3; ?></td><td class="Trh60"><?php echo $y2; ?></td><td class="Trh60"><?php echo $y3; ?></td>
  </tr>	
<?php if($_REQUEST['ii']!='All_1' AND $_REQUEST['ii']!='All_2'){$sql = mysql_query("select hrm_sales_seedsproduct.ItemId,ProductId,ProductName,ItemName,TypeName from hrm_sales_seedsproduct INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId INNER JOIN hrm_sales_seedtype ON hrm_sales_seedsproduct.TypeId=hrm_sales_seedtype.TypeId where hrm_sales_seedsitem.ItemId=".$_REQUEST['ii']." order by ItemName ASC, TypeName ASC, ProductName ASC", $con);}
      elseif($_REQUEST['ii']=='All_1'){$sql = mysql_query("select hrm_sales_seedsproduct.ItemId,ProductId,ProductName,ItemName,TypeName from hrm_sales_seedsproduct INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId INNER JOIN hrm_sales_seedtype ON hrm_sales_seedsproduct.TypeId=hrm_sales_seedtype.TypeId where hrm_sales_seedsitem.GroupId=1 order by ItemName ASC, TypeName ASC, ProductName ASC", $con);}
	  elseif($_REQUEST['ii']=='All_2'){$sql = mysql_query("select hrm_sales_seedsproduct.ItemId,ProductId,ProductName,ItemName,TypeName from hrm_sales_seedsproduct INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId INNER JOIN hrm_sales_seedtype ON hrm_sales_seedsproduct.TypeId=hrm_sales_seedtype.TypeId where hrm_sales_seedsitem.GroupId=2 order by ItemName ASC, TypeName ASC, ProductName ASC", $con);}
 $Sn=1; while($res=mysql_fetch_array($sql)){ 
 
$sqlP0d=mysql_query("select SUM(M1_Ach) as sM1,SUM(M2_Ach) as sM2,SUM(M3_Ach) as sM3,SUM(M4_Ach) as sM4,SUM(M5_Ach) as sM5,SUM(M6_Ach) as sM6,SUM(M7_Ach) as sM7,SUM(M8_Ach) as sM8,SUM(M9_Ach) as sM9,SUM(M10_Ach) as sM10,SUM(M11_Ach) as sM11,SUM(M12_Ach) as sM12 from hrm_sales_sal_details INNER JOIN hrm_sales_dealer ON hrm_sales_sal_details.DealerId=hrm_sales_dealer.DealerId INNER JOIN hrm_sales_hq_temp ON hrm_sales_dealer.HqId=hrm_sales_hq_temp.HqId where HqTEmpStatus='A' AND hrm_sales_hq_temp.EmployeeID=".$HqEmpId." AND hrm_sales_dealer.HqId=".$HqId." AND hrm_sales_sal_details.ProductId=".$res['ProductId']." AND hrm_sales_sal_details.YearId=".$Before2YId, $con); $resP0d=mysql_fetch_assoc($sqlP0d);
$Ach0Q1=$resP0d['sM1']+$resP0d['sM2']+$resP0d['sM3']; $Ach0Q2=$resP0d['sM4']+$resP0d['sM5']+$resP0d['sM6'];
$Ach0Q3=$resP0d['sM7']+$resP0d['sM8']+$resP0d['sM9']; $Ach0Q4=$resP0d['sM10']+$resP0d['sM11']+$resP0d['sM12'];
 
$sqlP1d=mysql_query("select SUM(M1_Ach) as sM1,SUM(M2_Ach) as sM2,SUM(M3_Ach) as sM3,SUM(M4_Ach) as sM4,SUM(M5_Ach) as sM5,SUM(M6_Ach) as sM6,SUM(M7_Ach) as sM7,SUM(M8_Ach) as sM8,SUM(M9_Ach) as sM9,SUM(M10_Ach) as sM10,SUM(M11_Ach) as sM11,SUM(M12_Ach) as sM12 from hrm_sales_sal_details INNER JOIN hrm_sales_dealer ON hrm_sales_sal_details.DealerId=hrm_sales_dealer.DealerId INNER JOIN hrm_sales_hq_temp ON hrm_sales_dealer.HqId=hrm_sales_hq_temp.HqId where HqTEmpStatus='A' AND hrm_sales_hq_temp.EmployeeID=".$HqEmpId." AND hrm_sales_dealer.HqId=".$HqId." AND hrm_sales_sal_details.ProductId=".$res['ProductId']." AND hrm_sales_sal_details.YearId=".$BeforeYId, $con); $resP1d=mysql_fetch_assoc($sqlP1d);
$AchQ1=$resP1d['sM1']+$resP1d['sM2']+$resP1d['sM3']; $AchQ2=$resP1d['sM4']+$resP1d['sM5']+$resP1d['sM6'];
$AchQ3=$resP1d['sM7']+$resP1d['sM8']+$resP1d['sM9']; $AchQ4=$resP1d['sM10']+$resP1d['sM11']+$resP1d['sM12'];

$sqlP4d=mysql_query("select SUM(M1) as sM1,SUM(M2) as sM2,SUM(M3) as sM3,SUM(M4) as sM4,SUM(M5) as sM5,SUM(M6) as sM6,SUM(M7) as sM7,SUM(M8) as sM8,SUM(M9) as sM9,SUM(M10) as sM10,SUM(M11) as sM11,SUM(M12) as sM12 from hrm_sales_sal_details INNER JOIN hrm_sales_dealer ON hrm_sales_sal_details.DealerId=hrm_sales_dealer.DealerId INNER JOIN hrm_sales_hq_temp ON hrm_sales_dealer.HqId=hrm_sales_hq_temp.HqId where HqTEmpStatus='A' AND hrm_sales_hq_temp.EmployeeID=".$HqEmpId." AND hrm_sales_dealer.HqId=".$HqId." AND hrm_sales_sal_details.ProductId=".$res['ProductId']." AND hrm_sales_sal_details.YearId=".$_REQUEST['y'], $con); 
$resP4d=mysql_fetch_assoc($sqlP4d);
$Ach4Q1=$resP4d['sM1']+$resP4d['sM2']+$resP4d['sM3']; $Ach4Q2=$resP4d['sM4']+$resP4d['sM5']+$resP4d['sM6'];
$Ach4Q3=$resP4d['sM7']+$resP4d['sM8']+$resP4d['sM9']; $Ach4Q4=$resP4d['sM10']+$resP4d['sM11']+$resP4d['sM12'];
$sqlP5d=mysql_query("select SUM(M1) as sM1,SUM(M2) as sM2,SUM(M3) as sM3,SUM(M4) as sM4,SUM(M5) as sM5,SUM(M6) as sM6,SUM(M7) as sM7,SUM(M8) as sM8,SUM(M9) as sM9,SUM(M10) as sM10,SUM(M11) as sM11,SUM(M12) as sM12 from hrm_sales_sal_details INNER JOIN hrm_sales_dealer ON hrm_sales_sal_details.DealerId=hrm_sales_dealer.DealerId INNER JOIN hrm_sales_hq_temp ON hrm_sales_dealer.HqId=hrm_sales_hq_temp.HqId where HqTEmpStatus='A' AND hrm_sales_hq_temp.EmployeeID=".$HqEmpId." AND hrm_sales_dealer.HqId=".$HqId." AND hrm_sales_sal_details.ProductId=".$res['ProductId']." AND hrm_sales_sal_details.YearId=".$AfterYId, $con); 
$resP5d=mysql_fetch_assoc($sqlP5d); 
$Ach5Q1=$resP5d['sM1']+$resP5d['sM2']+$resP5d['sM3']; $Ach5Q2=$resP5d['sM4']+$resP5d['sM5']+$resP5d['sM6'];
$Ach5Q3=$resP5d['sM7']+$resP5d['sM8']+$resP5d['sM9']; $Ach5Q4=$resP5d['sM10']+$resP5d['sM11']+$resP5d['sM12'];
$sqlP2d=mysql_query("select * from hrm_sales_sal_details_hq where HqEmpID=".$HqEmpId." AND HqId=".$HqId." AND ProductId=".$res['ProductId']." AND YearId=".$_REQUEST['y'], $con); 
$sqlP3d=mysql_query("select * from hrm_sales_sal_details_hq where HqEmpID=".$HqEmpId." AND HqId=".$HqId." AND ProductId=".$res['ProductId']." AND YearId=".$AfterYId, $con);  
 $resP2d=mysql_fetch_assoc($sqlP2d); $resP3d=mysql_fetch_assoc($sqlP3d);
 
?>	  
   <tr bgcolor="#EEEEEE" style="height:22px;">
<?php if($_REQUEST['ii']=='All_1' OR $_REQUEST['ii']=='All_2'){ ?>	  
     <td bgcolor="#FFFFFF">&nbsp;<?php echo $res['ItemName']; ?></td>
<?php } ?>		 
	 <td bgcolor="#FFFFFF">&nbsp;<?php echo $res['ProductName']; ?><input type="hidden" id="<?php echo $HqId; ?>P_<?php echo $Sn; ?>" value="<?php echo $res['ProductId']; ?>" /></td>
	 <td bgcolor="#FFFFFF" align="center">&nbsp;<?php echo substr_replace($res['TypeName'], '', 2); ?></td>
	 <td align="center" valign="middle" bgcolor="#FFFFFF">
	   <?php if($resCPerMi['EditPerMi']=='Y'){ ?>
	   <?php if($rowSubEmp==0){ //if($resP2['St_EmployeeID']==0 OR $resP2['St_EmployeeID']==1 OR $resP2['St_R1']==3){ ?>
<img src="images/edit.png" border="0" alt="Edit" id="<?php echo $HqId; ?>EditBtn_<?php echo $Sn; ?>" onClick="editD(<?php echo $Sn.', '.$_REQUEST['q'].', '.$HqId; ?>)" style="display:block;">
<img src="images/Floppy-Small-icon.png" border="0" alt="Save" id="<?php echo $HqId; ?>SaveBtn_<?php echo $Sn; ?>" onClick="saveD(<?php echo $Sn.', '.$_REQUEST['y'].', '.$HqId.', '.$_REQUEST['q'].', '.$HqEmpId; ?>)" style="display:none;">
	   <?php } ?>
	   <?php } else {echo '&nbsp;';}?>
	</td>
<td id="<?php echo $HqId.'TM1_De'.$Sn; ?>">
<input class="Input" id="<?php echo $HqId; ?>M1_De<?php echo $Sn; ?>" value="<?php if($Ach0Q1!=0 AND $Ach0Q1!=0){echo $Ach0Q1;} ?>" readonly/></td>	
<td id="<?php echo $HqId.'TM1_Ae'.$Sn; ?>">
<input class="Input" id="<?php echo $HqId; ?>M1_Ae<?php echo $Sn; ?>" value="<?php if($AchQ1!=0 AND $AchQ1!=0){echo $AchQ1;} ?>" readonly/></td>
<td id=""><input class="Input" id="<?php echo $HqId.'M1a'.$Sn; ?>" value="<?php if($Ach4Q1!=0 AND $Ach4Q1!=0){echo $Ach4Q1;} ?>" readonly/></td>
<td id=""><input class="Input" id="<?php echo $HqId.'M1b'.$Sn; ?>" value="<?php if($Ach5Q1!=0 AND $Ach5Q1!=0){echo $Ach5Q1;} ?>" readonly/></td>
<td id="<?php echo $HqId.'TM1_Be'.$Sn; ?>">
<input class="Input" id="<?php echo $HqId; ?>M1_Be<?php echo $Sn; ?>" style="background-color:#D3FED7;" value="<?php if($resP2d['Q1']!='' AND $resP2d['Q1']!=0){echo $resP2d['Q1'];} ?>" readonly/></td>
<td id="<?php echo $HqId.'TM1_Ce'.$Sn; ?>">
<input class="Input" id="<?php echo $HqId; ?>M1_Ce<?php echo $Sn; ?>" style="background-color:#D3FED7;" value="<?php if($resP3d['Q1']!='' AND $resP3d['Q1']!=0){echo $resP3d['Q1'];} ?>" readonly/></td>


<td id="<?php echo $HqId.'TM2_De'.$Sn; ?>">
<input class="Input" id="<?php echo $HqId; ?>M2_De<?php echo $Sn; ?>" value="<?php if($Ach0Q2!='' AND $Ach0Q2!=0){echo $Ach0Q2;} ?>" readonly/></td>
<td id="<?php echo $HqId.'TM2_Ae'.$Sn; ?>">
<input class="Input" id="<?php echo $HqId; ?>M2_Ae<?php echo $Sn; ?>" value="<?php if($AchQ2!='' AND $AchQ2!=0){echo $AchQ2;} ?>" readonly/></td>
<td id=""><input class="Input" id="<?php echo $HqId.'M2a'.$Sn; ?>" value="<?php if($Ach4Q2!='' AND $Ach4Q2!=0){echo $Ach4Q2;} ?>" readonly/></td>
<td id=""><input class="Input" id="<?php echo $HqId.'M2b'.$Sn; ?>" value="<?php if($Ach5Q2!='' AND $Ach5Q2!=0){echo $Ach5Q2;} ?>" readonly/></td>
<td id="<?php echo $HqId.'TM2_Be'.$Sn; ?>">
<input class="Input" id="<?php echo $HqId; ?>M2_Be<?php echo $Sn; ?>" style="background-color:#D3FED7;" value="<?php if($resP2d['Q2']!='' AND $resP2d['Q2']!=0){echo $resP2d['Q2'];} ?>" readonly/></td>
<td id="<?php echo $HqId.'TM2_Ce'.$Sn; ?>">
<input class="Input" id="<?php echo $HqId; ?>M2_Ce<?php echo $Sn; ?>" style="background-color:#D3FED7;" value="<?php if($resP3d['Q2']!='' AND $resP3d['Q2']!=0){echo $resP3d['Q2'];} ?>" readonly/></td>

<td id="<?php echo $HqId.'TM3_De'.$Sn; ?>">
<input class="Input" id="<?php echo $HqId; ?>M3_De<?php echo $Sn; ?>" value="<?php if($Ach0Q3!='' AND $Ach0Q3!=0){echo $Ach0Q3;} ?>" readonly/></td>
<td id="<?php echo $HqId.'TM3_Ae'.$Sn; ?>">
<input class="Input" id="<?php echo $HqId; ?>M3_Ae<?php echo $Sn; ?>" value="<?php if($AchQ3!='' AND $AchQ3!=0){echo $AchQ3;} ?>" readonly/></td>
<td id=""><input class="Input" id="<?php echo $HqId.'M3a'.$Sn; ?>" value="<?php if($Ach4Q3!='' AND $Ach4Q3!=0){echo $Ach4Q3;} ?>" readonly/></td>
<td id=""><input class="Input" id="<?php echo $HqId.'M3b'.$Sn; ?>" value="<?php if($Ach5Q3!='' AND $Ach5Q3!=0){echo $Ach5Q3;} ?>" readonly/></td>	
<td id="<?php echo $HqId.'TM3_Be'.$Sn; ?>">
<input class="Input" id="<?php echo $HqId; ?>M3_Be<?php echo $Sn; ?>" style="background-color:#D3FED7;" value="<?php if($resP2d['Q3']!='' AND $resP2d['Q3']!=0){echo $resP2d['Q3'];} ?>" readonly/></td>
<td id="<?php echo $HqId.'TM3_Ce'.$Sn; ?>">
<input class="Input" id="<?php echo $HqId; ?>M3_Ce<?php echo $Sn; ?>" style="background-color:#D3FED7;" value="<?php if($resP3d['Q3']!='' AND $resP3d['Q3']!=0){echo $resP3d['Q3'];} ?>" readonly/></td>	
 
<td id="<?php echo $HqId.'TM4_De'.$Sn; ?>">
<input class="Input" id="<?php echo $HqId; ?>M4_De<?php echo $Sn; ?>" value="<?php if($Ach0Q4!='' AND $Ach0Q4!=0){echo $Ach0Q4;} ?>" readonly/></td> 
<td id="<?php echo $HqId.'TM4_Ae'.$Sn; ?>">
<input class="Input" id="<?php echo $HqId; ?>M4_Ae<?php echo $Sn; ?>" value="<?php if($AchQ4!='' AND $AchQ4!=0){echo $AchQ4;} ?>" readonly/></td>
<td id=""><input class="Input" id="<?php echo $HqId.'M4a'.$Sn; ?>" value="<?php if($Ach4Q4!='' AND $Ach4Q4!=0){echo $Ach4Q4;} ?>" readonly/></td>
<td id=""><input class="Input" id="<?php echo $HqId.'M4b'.$Sn; ?>" value="<?php if($Ach5Q4!='' AND $Ach5Q4!=0){echo $Ach5Q4;} ?>" readonly/></td>
<td id="<?php echo $HqId.'TM4_Be'.$Sn; ?>">
<input class="Input" id="<?php echo $HqId; ?>M4_Be<?php echo $Sn; ?>" style="background-color:#D3FED7;" value="<?php if($resP2d['Q4']!='' AND $resP2d['Q4']!=0){echo $resP2d['Q4'];} ?>" readonly/></td>
<td id="<?php echo $HqId.'TM4_Ce'.$Sn; ?>">
<input class="Input" id="<?php echo $HqId; ?>M4_Ce<?php echo $Sn; ?>" style="background-color:#D3FED7;" value="<?php if($resP3d['Q4']!='' AND $resP3d['Q4']!=0){echo $resP3d['Q4'];} ?>" readonly/></td>	
<?php $TotP0d=$Ach0Q1+$Ach0Q2+$Ach0Q3+$Ach0Q4; $TotP1d=$AchQ1+$AchQ2+$AchQ3+$AchQ4; $TotP4d=$Ach4Q1+$Ach4Q2+$Ach4Q3+$Ach4Q4;  $TotP5d=$Ach5Q1+$Ach5Q2+$Ach5Q3+$Ach5Q4; 
$TotP2d=$resP2d['Q1']+$resP2d['Q2']+$resP2d['Q3']+$resP2d['Q4']; 
$TotP3d=$resP3d['Q1']+$resP3d['Q2']+$resP3d['Q3']+$resP3d['Q4']; 
?>	
<td id="<?php echo $HqId.'TTotP0d_'.$Sn; ?>"><input class="InputB" id="<?php echo $HqId; ?>TotP0d_<?php echo $Sn; ?>" value="<?php if($TotP0d!=0 AND $TotP0d!=''){echo $TotP0d;}else{echo '';} ?>" readonly/></td> 
<td id="<?php echo $HqId.'TTotP1d_'.$Sn; ?>"><input class="InputB" id="<?php echo $HqId; ?>TotP1d_<?php echo $Sn; ?>" value="<?php if($TotP1d!=0 AND $TotP1d!=''){echo $TotP1d;}else{echo '';} ?>" readonly/></td>
<td id=""><input class="InputB" id="<?php echo $HqId.'MTota'.$Sn; ?>" value="<?php if($TotP4d!=0 AND $TotP4d!=''){echo $TotP4d;}else{echo '';} ?>" readonly/></td>
<td id=""><input class="InputB" id="<?php echo $HqId.'MTotb'.$Sn; ?>" value="<?php if($TotP5d!=0 AND $TotP5d!=''){echo $TotP5d;}else{echo '';} ?>" readonly/></td>	
<td id="<?php echo $HqId.'TTotP2d_'.$Sn; ?>"><input class="InputB" id="<?php echo $HqId; ?>TotP2d_<?php echo $Sn; ?>" value="<?php if($TotP2d!=0 AND $TotP2d!=''){echo $TotP2d;}else{echo '';} ?>" readonly/></td>
<td id="<?php echo $HqId.'TTotP3d_'.$Sn; ?>"><input class="InputB" id="<?php echo $HqId; ?>TotP3d_<?php echo $Sn; ?>" value="<?php if($TotP3d!=0 AND $TotP3d!=''){echo $TotP3d;}else{echo '';} ?>" readonly/></td>	
  </tr>	
<?php $Sn++; }  ?>     
<?php if($_REQUEST['ii']!='All_1' AND $_REQUEST['ii']!='All_2'){ 
$sqlP0td=mysql_query("select SUM(M1_Ach) as tsM1,SUM(M2_Ach) as tsM2,SUM(M3_Ach) as tsM3,SUM(M4_Ach) as tsM4,SUM(M5_Ach) as tsM5,SUM(M6_Ach) as tsM6,SUM(M7_Ach) as tsM7,SUM(M8_Ach) as tsM8,SUM(M9_Ach) as tsM9,SUM(M10_Ach) as tsM10,SUM(M11_Ach) as tsM11,SUM(M12_Ach) as tsM12 from hrm_sales_sal_details INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details.ProductId=hrm_sales_seedsproduct.ProductId INNER JOIN hrm_sales_dealer ON hrm_sales_sal_details.DealerId=hrm_sales_dealer.DealerId INNER JOIN hrm_sales_hq_temp ON hrm_sales_dealer.HqId=hrm_sales_hq_temp.HqId where HqTEmpStatus='A' AND hrm_sales_hq_temp.EmployeeID=".$HqEmpId." AND hrm_sales_dealer.HqId=".$HqId." AND hrm_sales_seedsproduct.ItemId=".$_REQUEST['ii']." AND hrm_sales_sal_details.YearId=".$Before2YId, $con); $resP0td=mysql_fetch_assoc($sqlP0td);
$TotP0p1=$resP0td['tsM1']+$resP0td['tsM2']+$resP0td['tsM3']; $TotP0p2=$resP0td['tsM4']+$resP0td['tsM5']+$resP0td['tsM6'];
$TotP0p3=$resP0td['tsM7']+$resP0td['tsM8']+$resP0td['tsM9']; $TotP0p4=$resP0td['tsM10']+$resP0td['tsM11']+$resP0td['tsM12'];

$sqlP1td=mysql_query("select SUM(M1_Ach) as tsM1,SUM(M2_Ach) as tsM2,SUM(M3_Ach) as tsM3,SUM(M4_Ach) as tsM4,SUM(M5_Ach) as tsM5,SUM(M6_Ach) as tsM6,SUM(M7_Ach) as tsM7,SUM(M8_Ach) as tsM8,SUM(M9_Ach) as tsM9,SUM(M10_Ach) as tsM10,SUM(M11_Ach) as tsM11,SUM(M12_Ach) as tsM12 from hrm_sales_sal_details INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details.ProductId=hrm_sales_seedsproduct.ProductId INNER JOIN hrm_sales_dealer ON hrm_sales_sal_details.DealerId=hrm_sales_dealer.DealerId INNER JOIN hrm_sales_hq_temp ON hrm_sales_dealer.HqId=hrm_sales_hq_temp.HqId where HqTEmpStatus='A' AND hrm_sales_hq_temp.EmployeeID=".$HqEmpId." AND hrm_sales_dealer.HqId=".$HqId." AND hrm_sales_seedsproduct.ItemId=".$_REQUEST['ii']." AND hrm_sales_sal_details.YearId=".$BeforeYId, $con); $resP1td=mysql_fetch_assoc($sqlP1td);
$TotPp1=$resP1td['tsM1']+$resP1td['tsM2']+$resP1td['tsM3']; $TotPp2=$resP1td['tsM4']+$resP1td['tsM5']+$resP1td['tsM6'];
$TotPp3=$resP1td['tsM7']+$resP1td['tsM8']+$resP1td['tsM9']; $TotPp4=$resP1td['tsM10']+$resP1td['tsM11']+$resP1td['tsM12'];

$sqlP4td=mysql_query("select SUM(M1) as tsM1,SUM(M2) as tsM2,SUM(M3) as tsM3,SUM(M4) as tsM4,SUM(M5) as tsM5,SUM(M6) as tsM6,SUM(M7) as tsM7,SUM(M8) as tsM8,SUM(M9) as tsM9,SUM(M10) as tsM10,SUM(M11) as tsM11,SUM(M12) as tsM12 from hrm_sales_sal_details INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details.ProductId=hrm_sales_seedsproduct.ProductId INNER JOIN hrm_sales_dealer ON hrm_sales_sal_details.DealerId=hrm_sales_dealer.DealerId INNER JOIN hrm_sales_hq_temp ON hrm_sales_dealer.HqId=hrm_sales_hq_temp.HqId where HqTEmpStatus='A' AND hrm_sales_hq_temp.EmployeeID=".$HqEmpId." AND hrm_sales_dealer.HqId=".$HqId." AND hrm_sales_seedsproduct.ItemId=".$_REQUEST['ii']." AND hrm_sales_sal_details.YearId=".$_REQUEST['y'], $con); $resP4td=mysql_fetch_assoc($sqlP4td);
$TotP4p1=$resP4td['tsM1']+$resP4td['tsM2']+$resP4td['tsM3']; $TotP4p2=$resP4td['tsM4']+$resP4td['tsM5']+$resP4td['tsM6'];
$TotP4p3=$resP4td['tsM7']+$resP4td['tsM8']+$resP4td['tsM9']; $TotP4p4=$resP4td['tsM10']+$resP4td['tsM11']+$resP4td['tsM12'];
$sqlP5td=mysql_query("select SUM(M1) as tsM1,SUM(M2) as tsM2,SUM(M3) as tsM3,SUM(M4) as tsM4,SUM(M5) as tsM5,SUM(M6) as tsM6,SUM(M7) as tsM7,SUM(M8) as tsM8,SUM(M9) as tsM9,SUM(M10) as tsM10,SUM(M11) as tsM11,SUM(M12) as tsM12 from hrm_sales_sal_details INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details.ProductId=hrm_sales_seedsproduct.ProductId INNER JOIN hrm_sales_dealer ON hrm_sales_sal_details.DealerId=hrm_sales_dealer.DealerId INNER JOIN hrm_sales_hq_temp ON hrm_sales_dealer.HqId=hrm_sales_hq_temp.HqId where HqTEmpStatus='A' AND hrm_sales_hq_temp.EmployeeID=".$HqEmpId." AND hrm_sales_dealer.HqId=".$HqId." AND hrm_sales_seedsproduct.ItemId=".$_REQUEST['ii']." AND hrm_sales_sal_details.YearId=".$AfterYId, $con); 
$resP5td=mysql_fetch_assoc($sqlP5td);
$TotP5p1=$resP5td['tsM1']+$resP5td['tsM2']+$resP5td['tsM3']; $TotP5p2=$resP5td['tsM4']+$resP5td['tsM5']+$resP5td['tsM6'];
$TotP5p3=$resP5td['tsM7']+$resP5td['tsM8']+$resP5td['tsM9']; $TotP5p4=$resP5td['tsM10']+$resP5td['tsM11']+$resP5td['tsM12'];

$sqlP2td=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_hq INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details_hq.ProductId=hrm_sales_seedsproduct.ProductId where hrm_sales_sal_details_hq.HqEmpID=".$HqEmpId." AND hrm_sales_sal_details_hq.HqId=".$HqId." AND hrm_sales_seedsproduct.ItemId=".$_REQUEST['ii']." AND hrm_sales_sal_details_hq.YearId=".$_REQUEST['y'], $con);
$sqlP3td=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_hq INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details_hq.ProductId=hrm_sales_seedsproduct.ProductId where hrm_sales_sal_details_hq.HqEmpID=".$HqEmpId." AND hrm_sales_sal_details_hq.HqId=".$HqId." AND hrm_sales_seedsproduct.ItemId=".$_REQUEST['ii']." AND hrm_sales_sal_details_hq.YearId=".$AfterYId, $con); $resP2td=mysql_fetch_assoc($sqlP2td); $resP3td=mysql_fetch_assoc($sqlP3td);

?>
   <tr style="font-size:14px;color:#000000;background-color:#FFFFA6;height:24px;">
	 <td colspan="3" align="right" style="font-size:16px;"><b>TOTAL:&nbsp;</b></td>
	 <td><input class="TInput" id="<?php echo $HqId; ?>M1_DeT" value="<?php if($TotP0p1>0){echo $TotP0p1;} ?>" readonly/></td>
     <td><input class="TInput" id="<?php echo $HqId; ?>M1_AeT" value="<?php if($TotPp1>0){echo $TotPp1;} ?>" readonly/></td>
	 <td><input class="TInput" id="" value="<?php if($TotP4p1>0){echo $TotP4p1;} ?>" /></td>
	 <td><input class="TInput" id="" value="<?php if($TotP5p1>0){echo $TotP5p1;} ?>" readonly/></td>
	  <td><input class="TInput" id="<?php echo $HqId; ?>M1_BeT" value="<?php if($resP2td['Qa']>0){echo $resP2td['Qa'];} ?>" /></td>
	 <td><input class="TInput" id="<?php echo $HqId; ?>M1_CeT" value="<?php if($resP3td['Qa']>0){echo $resP3td['Qa'];} ?>" readonly/></td>
	 
	 <td><input class="TInput" id="<?php echo $HqId; ?>M2_DeT" value="<?php if($TotP0p2>0){echo $TotP0p2;} ?>" readonly/></td>
	 <td><input class="TInput" id="<?php echo $HqId; ?>M2_AeT" value="<?php if($TotPp2>0){echo $TotPp2;} ?>" readonly/></td>
	 <td><input class="TInput" id="" value="<?php if($TotP4p2>0){echo $TotP4p2;} ?>" readonly/></td>
	 <td><input class="TInput" id="" value="<?php if($TotP5p2>0){echo $TotP5p2;} ?>" readonly/></td>
	 <td><input class="TInput" id="<?php echo $HqId; ?>M2_BeT" value="<?php if($resP2td['Qb']>0){echo $resP2td['Qb'];} ?>" readonly/></td>
	 <td><input class="TInput" id="<?php echo $HqId; ?>M2_CeT" value="<?php if($resP3td['Qb']>0){echo $resP3td['Qb'];} ?>" readonly/></td>
	 
	 <td><input class="TInput" id="<?php echo $HqId; ?>M3_DeT" value="<?php if($TotP0p3>0){echo $TotP0p3;} ?>" readonly/></td>
	 <td><input class="TInput" id="<?php echo $HqId; ?>M3_AeT" value="<?php if($TotPp3>0){echo $TotPp3;} ?>" readonly/></td>
	 <td><input class="TInput" id="" value="<?php if($TotP4p3>0){echo $TotP4p3;} ?>" readonly/></td>
	 <td><input class="TInput" id="" value="<?php if($TotP5p3>0){echo $TotP5p3;} ?>" readonly/></td>		
	  <td><input class="TInput" id="<?php echo $HqId; ?>M3_BeT" value="<?php if($resP2td['Qc']>0){echo $resP2td['Qc'];} ?>" readonly/></td>
	 <td><input class="TInput" id="<?php echo $HqId; ?>M3_CeT" value="<?php if($resP3td['Qc']>0){echo $resP3td['Qc'];} ?>" readonly/></td>			
	 			 							
	 <td><input class="TInput" id="<?php echo $HqId; ?>M4_DeT" value="<?php if($TotP0p4>0){echo $TotP0p4;} ?>" readonly/></td>										
     <td><input class="TInput" id="<?php echo $HqId; ?>M4_AeT" value="<?php if($TotPp4>0){echo $TotPp4;} ?>" readonly/></td>
	 <td><input class="TInput" id="" value="<?php if($TotP4p4>0){echo $TotP4p4;} ?>" readonly/></td>
	 <td><input class="TInput" id="" value="<?php if($TotP5p4>0){echo $TotP5p4;} ?>" readonly/></td>
	 <td><input class="TInput" id="<?php echo $HqId; ?>M4_BeT" value="<?php if($resP2td['Qd']>0){echo $resP2td['Qd'];} ?>" readonly/></td>
	 <td><input class="TInput" id="<?php echo $HqId; ?>M4_CeT" value="<?php if($resP3td['Qd']>0){echo $resP3td['Qd'];} ?>" readonly/></td>
<?php 
$TotP0td=$TotP0p1+$TotP0p2+$TotP0p3+$TotP0p4; $TotP1td=$TotPp1+$TotPp2+$TotPp3+$TotPp4; $TotP4td=$TotP4p1+$TotP4p2+$TotP4p3+$TotP4p4; $TotP5td=$TotP5p1+$TotP5p2+$TotP5p3+$TotP5p4; 
$TotP2td=$resP2td['Qa']+$resP2td['Qb']+$resP2td['Qc']+$resP2td['Qd']; 
$TotP3td=$resP3td['Qa']+$resP3td['Qb']+$resP3td['Qc']+$resP3td['Qd']; 
?>    <td><input class="TInput" id="<?php echo $HqId; ?>TotM_DeT" value="<?php if($TotP0td!=0 AND $TotP0td!=''){echo $TotP0td;}else{echo '';} ?>" readonly/></td>
      <td><input class="TInput" id="<?php echo $HqId; ?>TotM_AeT" value="<?php if($TotP1td!=0 AND $TotP1td!=''){echo $TotP1td;}else{echo '';} ?>" readonly/></td>
	  <td><input class="TInput" id="" value="<?php if($TotP4td!=0 AND $TotP4td!=''){echo $TotP4td;}else{echo '';} ?>" readonly/></td>
	  <td><input class="TInput" id="" value="<?php if($TotP5td!=0 AND $TotP5td!=''){echo $TotP5td;}else{echo '';} ?>" readonly/></td>
	  <td><input class="TInput" id="<?php echo $HqId; ?>TotM_BeT" value="<?php if($TotP2td!=0 AND $TotP2td!=''){echo $TotP2td;}else{echo '';} ?>" readonly/></td>
	  <td><input class="TInput" id="<?php echo $HqId; ?>TotM_CeT" value="<?php if($TotP3td!=0 AND $TotP3td!=''){echo $TotP3td;}else{echo '';} ?>" readonly/></td>
  </tr>	
<?php } ?>  
</table>	       
   </td>  
  </tr>
  
  
  
<?php /*/*//*/*//*///// Open Open  ///*///*//*//*/  ?>
<?php if($rowHq2==1){ $sHqq2=mysql_query("select HqName from hrm_headquater where HqId=".$resHq2['HqId'],$con); $rHqq2=mysql_fetch_assoc($sHqq2);?>	  
  <tr>
   <td>
<table border="1" cellpadding="0" cellspacing="0" style="font-family:Times New Roman;font-size:14px;width:<?php if($_REQUEST['ii']=='All_1' OR $_REQUEST['ii']=='All_2'){ echo '2200px';}else{echo '2200px';}?>;">	
  <tr style="background-color:#D5F1D1;color:#000000;">
    <td colspan="<?php if($_REQUEST['ii']=='All_1' OR $_REQUEST['ii']=='All_2'){echo 4;}else{echo 3;}?>" style="font-size:16px;color:#FFFF00;background-color:#183E83;">&nbsp;<b><?php echo ucfirst(strtolower($Ename)).'-<font color="#D7EBFF">'.$rHqq2['HqName'].'</font>'; ?></b></td>
<td colspan="6" align="center"><b>Quarter 1</b></td><td colspan="6" align="center"><b>Quarter 2</b></td>
<td colspan="6" align="center"><b>Quarter 3</b></td><td colspan="6" align="center"><b>Quarter 4</b></td>
<td colspan="6" align="center"><b>TOTAL</b></td>
  </tr>	
   <tr style="background-color:#D5F1D1;color:#000000;">
<?php if($_REQUEST['ii']=='All_1' OR $_REQUEST['ii']=='All_2'){ ?>   
    <td align="center" style="width:150px;"><b>CROP</b></td>
<?php } ?>	
	<td align="center" style="width:250px;"><b>VARIETY</b></td>
	<td align="center" style="width:50px;"><b>&nbsp;TYPE&nbsp;</b></td>
	<td align="center" style="width:50px;"><b>&nbsp;Edit&nbsp;</b></td>
<?php	/* <td align="center" style="width:50px;"><b>&nbsp;Submit&nbsp;</b></td> */ ?>

	<td class="Trh60"><?php echo $y0T.'<br>'.$y0; ?></td><td class="Trh60"><?php echo $y1T.'<br>'.$y1; ?></td><td class="Trh60"><?php echo $y2T.'<br>'.$y2; ?></td>
	<td class="Trh60"><?php echo $y3T.'<br>'.$y3; ?></td><td class="Trh60"><?php echo $y2; ?></td><td class="Trh60"><?php echo $y3; ?></td>
	
	<td class="Trh60"><?php echo $y0T.'<br>'.$y0; ?></td><td class="Trh60"><?php echo $y1T.'<br>'.$y1; ?></td><td class="Trh60"><?php echo $y2T.'<br>'.$y2; ?></td>
	<td class="Trh60"><?php echo $y3T.'<br>'.$y3; ?></td><td class="Trh60"><?php echo $y2; ?></td><td class="Trh60"><?php echo $y3; ?></td>
	
	<td class="Trh60"><?php echo $y0T.'<br>'.$y0; ?></td><td class="Trh60"><?php echo $y1T.'<br>'.$y1; ?></td><td class="Trh60"><?php echo $y2T.'<br>'.$y2; ?></td>
	<td class="Trh60"><?php echo $y3T.'<br>'.$y3; ?></td><td class="Trh60"><?php echo $y2; ?></td><td class="Trh60"><?php echo $y3; ?></td>
	
	<td class="Trh60"><?php echo $y0T.'<br>'.$y0; ?></td><td class="Trh60"><?php echo $y1T.'<br>'.$y1; ?></td><td class="Trh60"><?php echo $y2T.'<br>'.$y2; ?></td>
	<td class="Trh60"><?php echo $y3T.'<br>'.$y3; ?></td><td class="Trh60"><?php echo $y2; ?></td><td class="Trh60"><?php echo $y3; ?></td>
	
	<td class="Trh60"><?php echo $y0T.'<br>'.$y0; ?></td><td class="Trh60"><?php echo $y1T.'<br>'.$y1; ?></td><td class="Trh60"><?php echo $y2T.'<br>'.$y2; ?></td>
	<td class="Trh60"><?php echo $y3T.'<br>'.$y3; ?></td><td class="Trh60"><?php echo $y2; ?></td><td class="Trh60"><?php echo $y3; ?></td>
  </tr>	
<?php if($_REQUEST['ii']!='All_1' AND $_REQUEST['ii']!='All_2'){$sql = mysql_query("select hrm_sales_seedsproduct.ItemId,ProductId,ProductName,ItemName,TypeName from hrm_sales_seedsproduct INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId INNER JOIN hrm_sales_seedtype ON hrm_sales_seedsproduct.TypeId=hrm_sales_seedtype.TypeId where hrm_sales_seedsitem.ItemId=".$_REQUEST['ii']." order by ItemName ASC, TypeName ASC, ProductName ASC", $con);}
      elseif($_REQUEST['ii']=='All_1'){$sql = mysql_query("select hrm_sales_seedsproduct.ItemId,ProductId,ProductName,ItemName,TypeName from hrm_sales_seedsproduct INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId INNER JOIN hrm_sales_seedtype ON hrm_sales_seedsproduct.TypeId=hrm_sales_seedtype.TypeId where hrm_sales_seedsitem.GroupId=1 order by ItemName ASC, TypeName ASC, ProductName ASC", $con);}
	  elseif($_REQUEST['ii']=='All_2'){$sql = mysql_query("select hrm_sales_seedsproduct.ItemId,ProductId,ProductName,ItemName,TypeName from hrm_sales_seedsproduct INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId INNER JOIN hrm_sales_seedtype ON hrm_sales_seedsproduct.TypeId=hrm_sales_seedtype.TypeId where hrm_sales_seedsitem.GroupId=2 order by ItemName ASC, TypeName ASC, ProductName ASC", $con);}
 $Sn=1; while($res=mysql_fetch_array($sql)){ 
 
$sqlP0d=mysql_query("select SUM(M1_Ach) as sM1,SUM(M2_Ach) as sM2,SUM(M3_Ach) as sM3,SUM(M4_Ach) as sM4,SUM(M5_Ach) as sM5,SUM(M6_Ach) as sM6,SUM(M7_Ach) as sM7,SUM(M8_Ach) as sM8,SUM(M9_Ach) as sM9,SUM(M10_Ach) as sM10,SUM(M11_Ach) as sM11,SUM(M12_Ach) as sM12 from hrm_sales_sal_details INNER JOIN hrm_sales_dealer ON hrm_sales_sal_details.DealerId=hrm_sales_dealer.DealerId INNER JOIN hrm_sales_hq_temp ON hrm_sales_dealer.HqId=hrm_sales_hq_temp.HqId where HqTEmpStatus='A' AND hrm_sales_hq_temp.EmployeeID=".$HqEmpId." AND hrm_sales_dealer.HqId=".$HqId." AND hrm_sales_sal_details.ProductId=".$res['ProductId']." AND hrm_sales_sal_details.YearId=".$Before2YId, $con); $resP0d=mysql_fetch_assoc($sqlP0d);
$Ach0Q1=$resP0d['sM1']+$resP0d['sM2']+$resP0d['sM3']; $Ach0Q2=$resP0d['sM4']+$resP0d['sM5']+$resP0d['sM6'];
$Ach0Q3=$resP0d['sM7']+$resP0d['sM8']+$resP0d['sM9']; $Ach0Q4=$resP0d['sM10']+$resP0d['sM11']+$resP0d['sM12'];
 
$sqlP1d=mysql_query("select SUM(M1_Ach) as sM1,SUM(M2_Ach) as sM2,SUM(M3_Ach) as sM3,SUM(M4_Ach) as sM4,SUM(M5_Ach) as sM5,SUM(M6_Ach) as sM6,SUM(M7_Ach) as sM7,SUM(M8_Ach) as sM8,SUM(M9_Ach) as sM9,SUM(M10_Ach) as sM10,SUM(M11_Ach) as sM11,SUM(M12_Ach) as sM12 from hrm_sales_sal_details INNER JOIN hrm_sales_dealer ON hrm_sales_sal_details.DealerId=hrm_sales_dealer.DealerId INNER JOIN hrm_sales_hq_temp ON hrm_sales_dealer.HqId=hrm_sales_hq_temp.HqId where HqTEmpStatus='A' AND hrm_sales_hq_temp.EmployeeID=".$HqEmpId." AND hrm_sales_dealer.HqId=".$HqId." AND hrm_sales_sal_details.ProductId=".$res['ProductId']." AND hrm_sales_sal_details.YearId=".$BeforeYId, $con); $resP1d=mysql_fetch_assoc($sqlP1d);
$AchQ1=$resP1d['sM1']+$resP1d['sM2']+$resP1d['sM3']; $AchQ2=$resP1d['sM4']+$resP1d['sM5']+$resP1d['sM6'];
$AchQ3=$resP1d['sM7']+$resP1d['sM8']+$resP1d['sM9']; $AchQ4=$resP1d['sM10']+$resP1d['sM11']+$resP1d['sM12'];

$sqlP4d=mysql_query("select SUM(M1) as sM1,SUM(M2) as sM2,SUM(M3) as sM3,SUM(M4) as sM4,SUM(M5) as sM5,SUM(M6) as sM6,SUM(M7) as sM7,SUM(M8) as sM8,SUM(M9) as sM9,SUM(M10) as sM10,SUM(M11) as sM11,SUM(M12) as sM12 from hrm_sales_sal_details INNER JOIN hrm_sales_dealer ON hrm_sales_sal_details.DealerId=hrm_sales_dealer.DealerId INNER JOIN hrm_sales_hq_temp ON hrm_sales_dealer.HqId=hrm_sales_hq_temp.HqId where HqTEmpStatus='A' AND hrm_sales_hq_temp.EmployeeID=".$HqEmpId." AND hrm_sales_dealer.HqId=".$HqId." AND hrm_sales_sal_details.ProductId=".$res['ProductId']." AND hrm_sales_sal_details.YearId=".$_REQUEST['y'], $con); 
$resP4d=mysql_fetch_assoc($sqlP4d);
$Ach4Q1=$resP4d['sM1']+$resP4d['sM2']+$resP4d['sM3']; $Ach4Q2=$resP4d['sM4']+$resP4d['sM5']+$resP4d['sM6'];
$Ach4Q3=$resP4d['sM7']+$resP4d['sM8']+$resP4d['sM9']; $Ach4Q4=$resP4d['sM10']+$resP4d['sM11']+$resP4d['sM12'];
$sqlP5d=mysql_query("select SUM(M1) as sM1,SUM(M2) as sM2,SUM(M3) as sM3,SUM(M4) as sM4,SUM(M5) as sM5,SUM(M6) as sM6,SUM(M7) as sM7,SUM(M8) as sM8,SUM(M9) as sM9,SUM(M10) as sM10,SUM(M11) as sM11,SUM(M12) as sM12 from hrm_sales_sal_details INNER JOIN hrm_sales_dealer ON hrm_sales_sal_details.DealerId=hrm_sales_dealer.DealerId INNER JOIN hrm_sales_hq_temp ON hrm_sales_dealer.HqId=hrm_sales_hq_temp.HqId where HqTEmpStatus='A' AND hrm_sales_hq_temp.EmployeeID=".$HqEmpId." AND hrm_sales_dealer.HqId=".$HqId." AND hrm_sales_sal_details.ProductId=".$res['ProductId']." AND hrm_sales_sal_details.YearId=".$AfterYId, $con); 
$resP5d=mysql_fetch_assoc($sqlP5d); 
$Ach5Q1=$resP5d['sM1']+$resP5d['sM2']+$resP5d['sM3']; $Ach5Q2=$resP5d['sM4']+$resP5d['sM5']+$resP5d['sM6'];
$Ach5Q3=$resP5d['sM7']+$resP5d['sM8']+$resP5d['sM9']; $Ach5Q4=$resP5d['sM10']+$resP5d['sM11']+$resP5d['sM12'];
$sqlP2d=mysql_query("select * from hrm_sales_sal_details_hq where HqEmpID=".$HqEmpId." AND HqId=".$resHq2['HqId']." AND ProductId=".$res['ProductId']." AND YearId=".$_REQUEST['y'], $con); 
$sqlP3d=mysql_query("select * from hrm_sales_sal_details_hq where HqEmpID=".$HqEmpId." AND HqId=".$resHq2['HqId']." AND ProductId=".$res['ProductId']." AND YearId=".$AfterYId, $con);  
 $resP2d=mysql_fetch_assoc($sqlP2d); $resP3d=mysql_fetch_assoc($sqlP3d);
 
?>	  
   <tr bgcolor="#EEEEEE" style="height:22px;">
<?php if($_REQUEST['ii']=='All_1' OR $_REQUEST['ii']=='All_2'){ ?>	  
     <td bgcolor="#FFFFFF">&nbsp;<?php echo $res['ItemName']; ?></td>
<?php } ?>		 
	 <td bgcolor="#FFFFFF">&nbsp;<?php echo $res['ProductName']; ?><input type="hidden" id="<?php echo $resHq2['HqId']; ?>P_<?php echo $Sn; ?>" value="<?php echo $res['ProductId']; ?>" /></td>
	 <td bgcolor="#FFFFFF" align="center">&nbsp;<?php echo substr_replace($res['TypeName'], '', 2); ?></td>
	 <td align="center" valign="middle" bgcolor="#FFFFFF">
	   <?php if($resCPerMi['EditPerMi']=='Y'){ ?>
	   <?php if($rowSubEmp==0){ //if($resP2['St_EmployeeID']==0 OR $resP2['St_EmployeeID']==1 OR $resP2['St_R1']==3){ ?>
<img src="images/edit.png" border="0" alt="Edit" id="<?php echo $resHq2['HqId']; ?>EditBtn_<?php echo $Sn; ?>" onClick="editD(<?php echo $Sn.', '.$_REQUEST['q'].', '.$resHq2['HqId']; ?>)" style="display:block;">
<img src="images/Floppy-Small-icon.png" border="0" alt="Save" id="<?php echo $resHq2['HqId']; ?>SaveBtn_<?php echo $Sn; ?>" onClick="saveD(<?php echo $Sn.', '.$_REQUEST['y'].', '.$resHq2['HqId'].', '.$_REQUEST['q'].', '.$HqEmpId; ?>)" style="display:none;">
	   <?php } ?>
	   <?php } else {echo '&nbsp;';}?>
	</td>
<td id="<?php echo $resHq2['HqId'].'TM1_De'.$Sn; ?>">
<input class="Input" id="<?php echo $resHq2['HqId']; ?>M1_De<?php echo $Sn; ?>" value="<?php if($Ach0Q1!=0 AND $Ach0Q1!=0){echo $Ach0Q1;} ?>" readonly/></td>	
<td id="<?php echo $resHq2['HqId'].'TM1_Ae'.$Sn; ?>">
<input class="Input" id="<?php echo $resHq2['HqId']; ?>M1_Ae<?php echo $Sn; ?>" value="<?php if($AchQ1!=0 AND $AchQ1!=0){echo $AchQ1;} ?>" readonly/></td>
<td id=""><input class="Input" id="<?php echo $resHq2['HqId'].'M1a'.$Sn; ?>" value="<?php if($Ach4Q1!=0 AND $Ach4Q1!=0){echo $Ach4Q1;} ?>" readonly/></td>
<td id=""><input class="Input" id="<?php echo $resHq2['HqId'].'M1b'.$Sn; ?>" value="<?php if($Ach5Q1!=0 AND $Ach5Q1!=0){echo $Ach5Q1;} ?>" readonly/></td>
<td id="<?php echo $resHq2['HqId'].'TM1_Be'.$Sn; ?>">
<input class="Input" id="<?php echo $resHq2['HqId']; ?>M1_Be<?php echo $Sn; ?>" style="background-color:#D3FED7;" value="<?php if($resP2d['Q1']!='' AND $resP2d['Q1']!=0){echo $resP2d['Q1'];} ?>" readonly/></td>
<td id="<?php echo $resHq2['HqId'].'TM1_Ce'.$Sn; ?>">
<input class="Input" id="<?php echo $resHq2['HqId']; ?>M1_Ce<?php echo $Sn; ?>" style="background-color:#D3FED7;" value="<?php if($resP3d['Q1']!='' AND $resP3d['Q1']!=0){echo $resP3d['Q1'];} ?>" readonly/></td>


<td id="<?php echo $resHq2['HqId'].'TM2_De'.$Sn; ?>">
<input class="Input" id="<?php echo $resHq2['HqId']; ?>M2_De<?php echo $Sn; ?>" value="<?php if($Ach0Q2!='' AND $Ach0Q2!=0){echo $Ach0Q2;} ?>" readonly/></td>
<td id="<?php echo $resHq2['HqId'].'TM2_Ae'.$Sn; ?>">
<input class="Input" id="<?php echo $resHq2['HqId']; ?>M2_Ae<?php echo $Sn; ?>" value="<?php if($AchQ2!='' AND $AchQ2!=0){echo $AchQ2;} ?>" readonly/></td>
<td id=""><input class="Input" id="<?php echo $resHq2['HqId'].'M2a'.$Sn; ?>" value="<?php if($Ach4Q2!='' AND $Ach4Q2!=0){echo $Ach4Q2;} ?>" readonly/></td>
<td id=""><input class="Input" id="<?php echo $resHq2['HqId'].'M2b'.$Sn; ?>" value="<?php if($Ach5Q2!='' AND $Ach5Q2!=0){echo $Ach5Q2;} ?>" readonly/></td>
<td id="<?php echo $resHq2['HqId'].'TM2_Be'.$Sn; ?>">
<input class="Input" id="<?php echo $resHq2['HqId']; ?>M2_Be<?php echo $Sn; ?>" style="background-color:#D3FED7;" value="<?php if($resP2d['Q2']!='' AND $resP2d['Q2']!=0){echo $resP2d['Q2'];} ?>" readonly/></td>
<td id="<?php echo $resHq2['HqId'].'TM2_Ce'.$Sn; ?>">
<input class="Input" id="<?php echo $resHq2['HqId']; ?>M2_Ce<?php echo $Sn; ?>" style="background-color:#D3FED7;" value="<?php if($resP3d['Q2']!='' AND $resP3d['Q2']!=0){echo $resP3d['Q2'];} ?>" readonly/></td>

<td id="<?php echo $resHq2['HqId'].'TM3_De'.$Sn; ?>">
<input class="Input" id="<?php echo $resHq2['HqId']; ?>M3_De<?php echo $Sn; ?>" value="<?php if($Ach0Q3!='' AND $Ach0Q3!=0){echo $Ach0Q3;} ?>" readonly/></td>
<td id="<?php echo $resHq2['HqId'].'TM3_Ae'.$Sn; ?>">
<input class="Input" id="<?php echo $resHq2['HqId']; ?>M3_Ae<?php echo $Sn; ?>" value="<?php if($AchQ3!='' AND $AchQ3!=0){echo $AchQ3;} ?>" readonly/></td>
<td id=""><input class="Input" id="<?php echo $resHq2['HqId'].'M3a'.$Sn; ?>" value="<?php if($Ach4Q3!='' AND $Ach4Q3!=0){echo $Ach4Q3;} ?>" readonly/></td>
<td id=""><input class="Input" id="<?php echo $resHq2['HqId'].'M3b'.$Sn; ?>" value="<?php if($Ach5Q3!='' AND $Ach5Q3!=0){echo $Ach5Q3;} ?>" readonly/></td>	
<td id="<?php echo $resHq2['HqId'].'TM3_Be'.$Sn; ?>">
<input class="Input" id="<?php echo $resHq2['HqId']; ?>M3_Be<?php echo $Sn; ?>" style="background-color:#D3FED7;" value="<?php if($resP2d['Q3']!='' AND $resP2d['Q3']!=0){echo $resP2d['Q3'];} ?>" readonly/></td>
<td id="<?php echo $resHq2['HqId'].'TM3_Ce'.$Sn; ?>">
<input class="Input" id="<?php echo $resHq2['HqId']; ?>M3_Ce<?php echo $Sn; ?>" style="background-color:#D3FED7;" value="<?php if($resP3d['Q3']!='' AND $resP3d['Q3']!=0){echo $resP3d['Q3'];} ?>" readonly/></td>	
 
<td id="<?php echo $resHq2['HqId'].'TM4_De'.$Sn; ?>">
<input class="Input" id="<?php echo $resHq2['HqId']; ?>M4_De<?php echo $Sn; ?>" value="<?php if($Ach0Q4!='' AND $Ach0Q4!=0){echo $Ach0Q4;} ?>" readonly/></td> 
<td id="<?php echo $resHq2['HqId'].'TM4_Ae'.$Sn; ?>">
<input class="Input" id="<?php echo $resHq2['HqId']; ?>M4_Ae<?php echo $Sn; ?>" value="<?php if($AchQ4!='' AND $AchQ4!=0){echo $AchQ4;} ?>" readonly/></td>
<td id=""><input class="Input" id="<?php echo $resHq2['HqId'].'M4a'.$Sn; ?>" value="<?php if($Ach4Q4!='' AND $Ach4Q4!=0){echo $Ach4Q4;} ?>" readonly/></td>
<td id=""><input class="Input" id="<?php echo $resHq2['HqId'].'M4b'.$Sn; ?>" value="<?php if($Ach5Q4!='' AND $Ach5Q4!=0){echo $Ach5Q4;} ?>" readonly/></td>
<td id="<?php echo $resHq2['HqId'].'TM4_Be'.$Sn; ?>">
<input class="Input" id="<?php echo $resHq2['HqId']; ?>M4_Be<?php echo $Sn; ?>" style="background-color:#D3FED7;" value="<?php if($resP2d['Q4']!='' AND $resP2d['Q4']!=0){echo $resP2d['Q4'];} ?>" readonly/></td>
<td id="<?php echo $resHq2['HqId'].'TM4_Ce'.$Sn; ?>">
<input class="Input" id="<?php echo $resHq2['HqId']; ?>M4_Ce<?php echo $Sn; ?>" style="background-color:#D3FED7;" value="<?php if($resP3d['Q4']!='' AND $resP3d['Q4']!=0){echo $resP3d['Q4'];} ?>" readonly/></td>	
<?php $TotP0d=$Ach0Q1+$Ach0Q2+$Ach0Q3+$Ach0Q4; $TotP1d=$AchQ1+$AchQ2+$AchQ3+$AchQ4; $TotP4d=$Ach4Q1+$Ach4Q2+$Ach4Q3+$Ach4Q4;  $TotP5d=$Ach5Q1+$Ach5Q2+$Ach5Q3+$Ach5Q4; 
$TotP2d=$resP2d['Q1']+$resP2d['Q2']+$resP2d['Q3']+$resP2d['Q4']; 
$TotP3d=$resP3d['Q1']+$resP3d['Q2']+$resP3d['Q3']+$resP3d['Q4']; 
?>	
<td id="<?php echo $resHq2['HqId'].'TTotP0d_'.$Sn; ?>"><input class="InputB" id="<?php echo $resHq2['HqId']; ?>TotP0d_<?php echo $Sn; ?>" value="<?php if($TotP0d!=0 AND $TotP0d!=''){echo $TotP0d;}else{echo '';} ?>" readonly/></td> 
<td id="<?php echo $resHq2['HqId'].'TTotP1d_'.$Sn; ?>"><input class="InputB" id="<?php echo $resHq2['HqId']; ?>TotP1d_<?php echo $Sn; ?>" value="<?php if($TotP1d!=0 AND $TotP1d!=''){echo $TotP1d;}else{echo '';} ?>" readonly/></td>
<td id=""><input class="InputB" id="<?php echo $resHq2['HqId'].'MTota'.$Sn; ?>" value="<?php if($TotP4d!=0 AND $TotP4d!=''){echo $TotP4d;}else{echo '';} ?>" readonly/></td>
<td id=""><input class="InputB" id="<?php echo $resHq2['HqId'].'MTotb'.$Sn; ?>" value="<?php if($TotP5d!=0 AND $TotP5d!=''){echo $TotP5d;}else{echo '';} ?>" readonly/></td>	
<td id="<?php echo $resHq2['HqId'].'TTotP2d_'.$Sn; ?>"><input class="InputB" id="<?php echo $resHq2['HqId']; ?>TotP2d_<?php echo $Sn; ?>" value="<?php if($TotP2d!=0 AND $TotP2d!=''){echo $TotP2d;}else{echo '';} ?>" readonly/></td>
<td id="<?php echo $resHq2['HqId'].'TTotP3d_'.$Sn; ?>"><input class="InputB" id="<?php echo $resHq2['HqId']; ?>TotP3d_<?php echo $Sn; ?>" value="<?php if($TotP3d!=0 AND $TotP3d!=''){echo $TotP3d;}else{echo '';} ?>" readonly/></td>	
  </tr>	
<?php $Sn++; }  ?>     
<?php if($_REQUEST['ii']!='All_1' AND $_REQUEST['ii']!='All_2'){ 
$sqlP0td=mysql_query("select SUM(M1_Ach) as tsM1,SUM(M2_Ach) as tsM2,SUM(M3_Ach) as tsM3,SUM(M4_Ach) as tsM4,SUM(M5_Ach) as tsM5,SUM(M6_Ach) as tsM6,SUM(M7_Ach) as tsM7,SUM(M8_Ach) as tsM8,SUM(M9_Ach) as tsM9,SUM(M10_Ach) as tsM10,SUM(M11_Ach) as tsM11,SUM(M12_Ach) as tsM12 from hrm_sales_sal_details INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details.ProductId=hrm_sales_seedsproduct.ProductId INNER JOIN hrm_sales_dealer ON hrm_sales_sal_details.DealerId=hrm_sales_dealer.DealerId INNER JOIN hrm_sales_hq_temp ON hrm_sales_dealer.HqId=hrm_sales_hq_temp.HqId where HqTEmpStatus='A' AND hrm_sales_hq_temp.EmployeeID=".$HqEmpId." AND hrm_sales_dealer.HqId=".$HqId." AND hrm_sales_seedsproduct.ItemId=".$_REQUEST['ii']." AND hrm_sales_sal_details.YearId=".$Before2YId, $con); $resP0td=mysql_fetch_assoc($sqlP0td);
$TotP0p1=$resP0td['tsM1']+$resP0td['tsM2']+$resP0td['tsM3']; $TotP0p2=$resP0td['tsM4']+$resP0td['tsM5']+$resP0td['tsM6'];
$TotP0p3=$resP0td['tsM7']+$resP0td['tsM8']+$resP0td['tsM9']; $TotP0p4=$resP0td['tsM10']+$resP0td['tsM11']+$resP0td['tsM12'];

$sqlP1td=mysql_query("select SUM(M1_Ach) as tsM1,SUM(M2_Ach) as tsM2,SUM(M3_Ach) as tsM3,SUM(M4_Ach) as tsM4,SUM(M5_Ach) as tsM5,SUM(M6_Ach) as tsM6,SUM(M7_Ach) as tsM7,SUM(M8_Ach) as tsM8,SUM(M9_Ach) as tsM9,SUM(M10_Ach) as tsM10,SUM(M11_Ach) as tsM11,SUM(M12_Ach) as tsM12 from hrm_sales_sal_details INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details.ProductId=hrm_sales_seedsproduct.ProductId INNER JOIN hrm_sales_dealer ON hrm_sales_sal_details.DealerId=hrm_sales_dealer.DealerId INNER JOIN hrm_sales_hq_temp ON hrm_sales_dealer.HqId=hrm_sales_hq_temp.HqId where HqTEmpStatus='A' AND hrm_sales_hq_temp.EmployeeID=".$HqEmpId." AND hrm_sales_dealer.HqId=".$HqId." AND hrm_sales_seedsproduct.ItemId=".$_REQUEST['ii']." AND hrm_sales_sal_details.YearId=".$BeforeYId, $con); $resP1td=mysql_fetch_assoc($sqlP1td);
$TotPp1=$resP1td['tsM1']+$resP1td['tsM2']+$resP1td['tsM3']; $TotPp2=$resP1td['tsM4']+$resP1td['tsM5']+$resP1td['tsM6'];
$TotPp3=$resP1td['tsM7']+$resP1td['tsM8']+$resP1td['tsM9']; $TotPp4=$resP1td['tsM10']+$resP1td['tsM11']+$resP1td['tsM12'];

$sqlP4td=mysql_query("select SUM(M1) as tsM1,SUM(M2) as tsM2,SUM(M3) as tsM3,SUM(M4) as tsM4,SUM(M5) as tsM5,SUM(M6) as tsM6,SUM(M7) as tsM7,SUM(M8) as tsM8,SUM(M9) as tsM9,SUM(M10) as tsM10,SUM(M11) as tsM11,SUM(M12) as tsM12 from hrm_sales_sal_details INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details.ProductId=hrm_sales_seedsproduct.ProductId INNER JOIN hrm_sales_dealer ON hrm_sales_sal_details.DealerId=hrm_sales_dealer.DealerId INNER JOIN hrm_sales_hq_temp ON hrm_sales_dealer.HqId=hrm_sales_hq_temp.HqId where HqTEmpStatus='A' AND hrm_sales_hq_temp.EmployeeID=".$HqEmpId." AND hrm_sales_dealer.HqId=".$HqId." AND hrm_sales_seedsproduct.ItemId=".$_REQUEST['ii']." AND hrm_sales_sal_details.YearId=".$_REQUEST['y'], $con); $resP4td=mysql_fetch_assoc($sqlP4td);
$TotP4p1=$resP4td['tsM1']+$resP4td['tsM2']+$resP4td['tsM3']; $TotP4p2=$resP4td['tsM4']+$resP4td['tsM5']+$resP4td['tsM6'];
$TotP4p3=$resP4td['tsM7']+$resP4td['tsM8']+$resP4td['tsM9']; $TotP4p4=$resP4td['tsM10']+$resP4td['tsM11']+$resP4td['tsM12'];
$sqlP5td=mysql_query("select SUM(M1) as tsM1,SUM(M2) as tsM2,SUM(M3) as tsM3,SUM(M4) as tsM4,SUM(M5) as tsM5,SUM(M6) as tsM6,SUM(M7) as tsM7,SUM(M8) as tsM8,SUM(M9) as tsM9,SUM(M10) as tsM10,SUM(M11) as tsM11,SUM(M12) as tsM12 from hrm_sales_sal_details INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details.ProductId=hrm_sales_seedsproduct.ProductId INNER JOIN hrm_sales_dealer ON hrm_sales_sal_details.DealerId=hrm_sales_dealer.DealerId INNER JOIN hrm_sales_hq_temp ON hrm_sales_dealer.HqId=hrm_sales_hq_temp.HqId where HqTEmpStatus='A' AND hrm_sales_hq_temp.EmployeeID=".$HqEmpId." AND hrm_sales_dealer.HqId=".$HqId." AND hrm_sales_seedsproduct.ItemId=".$_REQUEST['ii']." AND hrm_sales_sal_details.YearId=".$AfterYId, $con); 
$resP5td=mysql_fetch_assoc($sqlP5td);
$TotP5p1=$resP5td['tsM1']+$resP5td['tsM2']+$resP5td['tsM3']; $TotP5p2=$resP5td['tsM4']+$resP5td['tsM5']+$resP5td['tsM6'];
$TotP5p3=$resP5td['tsM7']+$resP5td['tsM8']+$resP5td['tsM9']; $TotP5p4=$resP5td['tsM10']+$resP5td['tsM11']+$resP5td['tsM12'];

$sqlP2td=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_hq INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details_hq.ProductId=hrm_sales_seedsproduct.ProductId where hrm_sales_sal_details_hq.HqEmpID=".$HqEmpId." AND hrm_sales_sal_details_hq.HqId=".$resHq2['HqId']." AND hrm_sales_seedsproduct.ItemId=".$_REQUEST['ii']." AND hrm_sales_sal_details_hq.YearId=".$_REQUEST['y'], $con);
$sqlP3td=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_hq INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details_hq.ProductId=hrm_sales_seedsproduct.ProductId where hrm_sales_sal_details_hq.HqEmpID=".$HqEmpId." AND hrm_sales_sal_details_hq.HqId=".$resHq2['HqId']." AND hrm_sales_seedsproduct.ItemId=".$_REQUEST['ii']." AND hrm_sales_sal_details_hq.YearId=".$AfterYId, $con); $resP2td=mysql_fetch_assoc($sqlP2td); $resP3td=mysql_fetch_assoc($sqlP3td);

?>
   <tr style="font-size:14px;color:#000000;background-color:#FFFFA6;height:24px;">
	 <td colspan="3" align="right" style="font-size:16px;"><b>TOTAL:&nbsp;</b></td>
	 <td><input class="TInput" id="<?php echo $resHq2['HqId']; ?>M1_DeT" value="<?php if($TotP0p1>0){echo $TotP0p1;} ?>" readonly/></td>
     <td><input class="TInput" id="<?php echo $resHq2['HqId']; ?>M1_AeT" value="<?php if($TotPp1>0){echo $TotPp1;} ?>" readonly/></td>
	 <td><input class="TInput" id="" value="<?php if($TotP4p1>0){echo $TotP4p1;} ?>" /></td>
	 <td><input class="TInput" id="" value="<?php if($TotP5p1>0){echo $TotP5p1;} ?>" readonly/></td>
	  <td><input class="TInput" id="<?php echo $resHq2['HqId']; ?>M1_BeT" value="<?php if($resP2td['Qa']>0){echo $resP2td['Qa'];} ?>" /></td>
	 <td><input class="TInput" id="<?php echo $resHq2['HqId']; ?>M1_CeT" value="<?php if($resP3td['Qa']>0){echo $resP3td['Qa'];} ?>" readonly/></td>
	 
	 <td><input class="TInput" id="<?php echo $resHq2['HqId']; ?>M2_DeT" value="<?php if($TotP0p2>0){echo $TotP0p2;} ?>" readonly/></td>
	 <td><input class="TInput" id="<?php echo $resHq2['HqId']; ?>M2_AeT" value="<?php if($TotPp2>0){echo $TotPp2;} ?>" readonly/></td>
	 <td><input class="TInput" id="" value="<?php if($TotP4p2>0){echo $TotP4p2;} ?>" readonly/></td>
	 <td><input class="TInput" id="" value="<?php if($TotP5p2>0){echo $TotP5p2;} ?>" readonly/></td>
	 <td><input class="TInput" id="<?php echo $resHq2['HqId']; ?>M2_BeT" value="<?php if($resP2td['Qb']>0){echo $resP2td['Qb'];} ?>" readonly/></td>
	 <td><input class="TInput" id="<?php echo $resHq2['HqId']; ?>M2_CeT" value="<?php if($resP3td['Qb']>0){echo $resP3td['Qb'];} ?>" readonly/></td>
	 
	 <td><input class="TInput" id="<?php echo $resHq2['HqId']; ?>M3_DeT" value="<?php if($TotP0p3>0){echo $TotP0p3;} ?>" readonly/></td>
	 <td><input class="TInput" id="<?php echo $resHq2['HqId']; ?>M3_AeT" value="<?php if($TotPp3>0){echo $TotPp3;} ?>" readonly/></td>
	 <td><input class="TInput" id="" value="<?php if($TotP4p3>0){echo $TotP4p3;} ?>" readonly/></td>
	 <td><input class="TInput" id="" value="<?php if($TotP5p3>0){echo $TotP5p3;} ?>" readonly/></td>		
	  <td><input class="TInput" id="<?php echo $resHq2['HqId']; ?>M3_BeT" value="<?php if($resP2td['Qc']>0){echo $resP2td['Qc'];} ?>" readonly/></td>
	 <td><input class="TInput" id="<?php echo $resHq2['HqId']; ?>M3_CeT" value="<?php if($resP3td['Qc']>0){echo $resP3td['Qc'];} ?>" readonly/></td>			
	 			 							
	 <td><input class="TInput" id="<?php echo $resHq2['HqId']; ?>M4_DeT" value="<?php if($TotP0p4>0){echo $TotP0p4;} ?>" readonly/></td>										
     <td><input class="TInput" id="<?php echo $resHq2['HqId']; ?>M4_AeT" value="<?php if($TotPp4>0){echo $TotPp4;} ?>" readonly/></td>
	 <td><input class="TInput" id="" value="<?php if($TotP4p4>0){echo $TotP4p4;} ?>" readonly/></td>
	 <td><input class="TInput" id="" value="<?php if($TotP5p4>0){echo $TotP5p4;} ?>" readonly/></td>
	 <td><input class="TInput" id="<?php echo $resHq2['HqId']; ?>M4_BeT" value="<?php if($resP2td['Qd']>0){echo $resP2td['Qd'];} ?>" readonly/></td>
	 <td><input class="TInput" id="<?php echo $resHq2['HqId']; ?>M4_CeT" value="<?php if($resP3td['Qd']>0){echo $resP3td['Qd'];} ?>" readonly/></td>
<?php 
$TotP0td=$TotP0p1+$TotP0p2+$TotP0p3+$TotP0p4; $TotP1td=$TotPp1+$TotPp2+$TotPp3+$TotPp4; $TotP4td=$TotP4p1+$TotP4p2+$TotP4p3+$TotP4p4; $TotP5td=$TotP5p1+$TotP5p2+$TotP5p3+$TotP5p4; 
$TotP2td=$resP2td['Qa']+$resP2td['Qb']+$resP2td['Qc']+$resP2td['Qd']; 
$TotP3td=$resP3td['Qa']+$resP3td['Qb']+$resP3td['Qc']+$resP3td['Qd']; 
?>    <td><input class="TInput" id="<?php echo $resHq2['HqId']; ?>TotM_DeT" value="<?php if($TotP0td!=0 AND $TotP0td!=''){echo $TotP0td;}else{echo '';} ?>" readonly/></td>
      <td><input class="TInput" id="<?php echo $resHq2['HqId']; ?>TotM_AeT" value="<?php if($TotP1td!=0 AND $TotP1td!=''){echo $TotP1td;}else{echo '';} ?>" readonly/></td>
	  <td><input class="TInput" id="" value="<?php if($TotP4td!=0 AND $TotP4td!=''){echo $TotP4td;}else{echo '';} ?>" readonly/></td>
	  <td><input class="TInput" id="" value="<?php if($TotP5td!=0 AND $TotP5td!=''){echo $TotP5td;}else{echo '';} ?>" readonly/></td>
	  <td><input class="TInput" id="<?php echo $resHq2['HqId']; ?>TotM_BeT" value="<?php if($TotP2td!=0 AND $TotP2td!=''){echo $TotP2td;}else{echo '';} ?>" readonly/></td>
	  <td><input class="TInput" id="<?php echo $resHq2['HqId']; ?>TotM_CeT" value="<?php if($TotP3td!=0 AND $TotP3td!=''){echo $TotP3td;}else{echo '';} ?>" readonly/></td>
  </tr>	
<?php } ?>  
</table>	       
   </td>  
  </tr>
<?php } ?>  
<?php /*/*//*/*//*///// Close Close  ///*///*//*//*/  ?>




<?php //////////////////////////////////////////////////////////*****************Close Close *********************/////////////////////////////////////////// ?>  
 </table>
</tr>
<?php } /*********** Close Dealer **********/ ?>   	
  </table>
</td>

</tr>
<tr><td>&nbsp;</td></tr>
<?php } ?>
<?php } ?>
<?php /***************************************** Main Page Close **************************************/ ?>   
	 </table>
   </td>
  </tr>
<?php //*************************************************************** Close ******************************************************************************** ?>
<tr bgcolor="#C7C7C7">
 <td id="TDResultId" style="width:3000px;">
  <span id="ResultTDSpan"></span>
  <span id="AddMonthResult"></span>
  <span id="SubSpanMsg"></span>
 </td>
</tr>						
				  </table>
				 </td>
			  </tr>
			</table>
           </td>
			  </tr>
	        </table>
			
<?php //*************************************************************************************************************************************************** ?>
		   </td>
		   
		  </tr>
		</table>
	  </td>
	</tr>
  </table>
 </td>
</tr>
</table>
</body>
</html>

