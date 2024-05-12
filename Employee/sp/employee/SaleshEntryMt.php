<?php session_start();
if($_SESSION['login'] = true){require_once('../user/config/config.php');}
include("../function.php");
if(check_user()==false){header('Location:../../../index.php');}

$StscId=$_SESSION['a1'].",".$_SESSION['a2'].",".$_SESSION['a3'].",".$_SESSION['a4'].",".$_SESSION['a5'].",".$_SESSION['a6'].",".$_SESSION['a7'].",".$_SESSION['a8'].",".$_SESSION['a9'].",".$_SESSION['a10'].",".$_SESSION['a11'].",".$_SESSION['a12'].",".$_SESSION['a13'].",".$_SESSION['a14'].",".$_SESSION['a15'].",".$_SESSION['a16'].",".$_SESSION['a17'].",".$_SESSION['a18'].",".$_SESSION['a19'].",".$_SESSION['a20'].",".$_SESSION['a21'].",".$_SESSION['a22'].",".$_SESSION['a23'].",".$_SESSION['a24'].",".$_SESSION['a25'];
?>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php include_once('../Title.php'); ?></title>

<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<style> /*background-color:#D9D9FF;  background-color:#EEEEEE; */
.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;}
.SaveButton {background-image:url(images/save.gif); width:20px; height:20px; background-repeat:no-repeat; background-color:#FFFFFF; border-color:#FFFFFF; border-bottom:inherit;}
.EditSelect { font-family:Georgia; font-size:12px; height:18px;}
.EditInput { font-family:Georgia; font-size:12px; height:18px;}
.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}
.InputB{font-size:12px;width:100%; font-family:Times New Roman; font-weight:bold;text-align:right;border:0px;background-color:#D9D9FF;} 
.Input{font-size:11px;width:100%;text-align:right;border:0px;background-color:#EEE;}
.Inputt{font-size:11px;font-family:Times New Roman;border:0px;background-color:#FFF; color:#000000;}
.Inputi{font-size:11px;width:100%;text-align:right;border:0px;background-color:#EEE;}
.TInput{font-size:11px;width:100%;text-align:right;border:0px;background-color:#FFFFA6;}
.TbInput{font-size:11px;width:100%;text-align:right;border:0px;background-color:#FFFFA6;font-weight:bold;}
.InputBc{font-size:11px;width:100%;text-align:right;border:0px;font-weight:bold;background-color:#62B0FF;} 
.Inputc{font-size:11px;width:100%;text-align:right;border:0px;background-color:#62B0FF;}
.Trh60{font-size:11px;text-align:center;width:40px;font-weight:bold;}
.Revised{font-size:12px;width:60px;font-weight:bold;background-color:#D7FFAE;text-align:right;}
.Revisedt{font-size:12px;width:60px;font-weight:bold;background-color:#FFFFA6;text-align:right;}
.outerbox .innerbox { /* width:100%; */   /*DEFINES TABLES WIDTH */ width:100%; }       
.innerbox{display:block;float:left; /*DEFINES TABLES HEIGHT*/ /*height:200px;*/ overflow-x:auto;overflow-y:auto; }
.det{ color:#FFFFFF;font-family:Times New Roman;font-size:12px;font-weight:bold;vertical-align:bottom; }\
.detsel{ font-family:Times New Roman;font-size:12px;background-color:#C4FFC4;height:23px;font-weight:bold; }
</style>
<Script type="text/javascript">//window.history.forward(1);</Script> 
<script type="text/javascript" language="javascript">
function ChangeHq(hq,v)
{
  var act=document.getElementById("act").value; //var hq=document.getElementById("hq").value; 
  var q=document.getElementById("q").value; var cc=document.getElementById("cc").value; var di=document.getElementById("di").value;
  var gi=document.getElementById("gi").value; var EHq=document.getElementById("EHq").value; var ii=document.getElementById("ii").value; 
  var fc=document.getElementById("fc").value; var vc=document.getElementById("vc").value;
  var myh=1; var myt=document.getElementById("myt").value;
  window.location="SaleshEntry.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&act="+act+"&hq="+hq+"&y="+v+"&q="+q+"&ii="+ii+"&vc="+vc+"&fc="+fc+"&cc="+cc+"&di="+di+"&gi="+gi+'&EHq='+EHq+'&myh='+myh+'&myt='+myt; 
}

function ChangeItem(ii,v)
{  
  var act=document.getElementById("act").value; var hq=document.getElementById("hq").value; var y=document.getElementById("y").value;
  var q=document.getElementById("q").value; var cc=document.getElementById("cc").value; var di=document.getElementById("di").value;
  var gi=document.getElementById("gi").value; var EHq=document.getElementById("EHq").value; 
  var myh=document.getElementById("myh").value; var myt=document.getElementById("myt").value;
  if(ii==0 && v=='vc'){alert("please select vegitable crop item"); return false;}
else if(ii==0 && v=='fc'){alert("please select field crop item"); return false;}
else if(ii>0 && v=='vc'){window.location="SaleshEntryMt.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&act="+act+"&hq="+hq+"&y="+y+"&q="+q+"&ii="+ii+"&vc=1&fc=0&cc="+cc+"&di="+di+"&gi="+gi+"&EHq="+EHq+"&myh="+myh+"&myt="+myt; }
else if(ii>0 && v=='fc'){window.location="SaleshEntryMt.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&act="+act+"&hq="+hq+"&y="+y+"&q="+q+"&ii="+ii+"&vc=0&fc=1&cc="+cc+"&di="+di+"&gi="+gi+"&EHq="+EHq+"&myh="+myh+"&myt="+myt; }
else if(ii=='All_2' && v=='fc'){window.location="SaleshEntryMt.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&act="+act+"&hq="+hq+"&y="+y+"&q="+q+"&ii="+ii+"&vc=0&fc=1&cc="+cc+"&di="+di+"&gi="+gi+"&EHq="+EHq+"&myh="+myh+"&myt="+myt; }
}

function ClickAllProd(ii,v)
{ 
  var act=document.getElementById("act").value; var hq=document.getElementById("hq").value; var y=document.getElementById("y").value;
  var q=document.getElementById("q").value; var cc=document.getElementById("cc").value; var di=document.getElementById("di").value;
  var gi=document.getElementById("gi").value; var EHq=document.getElementById("EHq").value; 
  var myh=document.getElementById("myh").value; var myt=document.getElementById("myt").value;
  if(v=='ac'){window.location="SaleshEntryMt.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&act="+act+"&hq="+hq+"&y="+y+"&q="+q+"&ac=1&vc=0&fc=0&cc="+cc+"&di="+di+"&gi="+gi+"&EHq="+EHq+"&myh="+myh+"&myt="+myt+"&ii="+ii; }
}

function ChangePerMi(hq,v)
{
  var act=document.getElementById("act").value; //var hq=document.getElementById("hq").value; 
  var q=document.getElementById("q").value; var cc=document.getElementById("cc").value; var di=document.getElementById("di").value;
  var gi=document.getElementById("gi").value; var EHq=document.getElementById("EHq").value; var ii=document.getElementById("ii").value; 
  var fc=document.getElementById("fc").value; var vc=document.getElementById("vc").value;
  var myh=document.getElementById("myh").value; var myt=1;
  window.location="SaleshEntryPerMi.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&act="+act+"&hq="+hq+"&y="+v+"&q="+q+"&ii="+ii+"&vc="+vc+"&fc="+fc+"&cc="+cc+"&di="+di+"&gi="+gi+'&EHq='+EHq+'&myh='+myh+'&myt='+myt; 
}

/*function ChangeYear(v)
{  
  var act=document.getElementById("act").value; var hq=document.getElementById("hq").value; 
  var q=document.getElementById("q").value; var cc=document.getElementById("cc").value; var di=document.getElementById("di").value;
  var gi=document.getElementById("gi").value; var EHq=document.getElementById("EHq").value; var ii=document.getElementById("ii").value; 
  var fc=document.getElementById("fc").value; var vc=document.getElementById("vc").value;
  var myh=document.getElementById("myh").value; var myt=document.getElementById("myt").value;
  window.location="SaleshEntryMt.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&act="+act+"&hq="+hq+"&y="+v+"&q="+q+"&ii="+ii+"&vc="+vc+"&fc="+fc+"&cc="+cc+"&di="+di+"&gi="+gi+"&EHq="+EHq+"&myh="+myh+"&myt="+myt; 
}
function ChangeQtr(v)
{  
  var act=document.getElementById("act").value; var hq=document.getElementById("hq").value; var y=document.getElementById("y").value;
  var ii=document.getElementById("ii").value; var cc=document.getElementById("cc").value; var di=document.getElementById("di").value;
  var gi=document.getElementById("gi").value; var EHq=document.getElementById("EHq").value; 
  var fc=document.getElementById("fc").value; var vc=document.getElementById("vc").value;
  var myh=document.getElementById("myh").value; var myt=document.getElementById("myt").value;
   window.location="SaleshEntryMt.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&act="+act+"&hq="+hq+"&y="+y+"&q="+v+"&ii="+ii+"&vc="+vc+"&fc="+fc+"&cc="+cc+"&di="+di+"&gi="+gi+"&EHq="+EHq+"&myh="+myh+"&myt="+myt;
}*/


function editD(sn,gi,e,nhq)
{ 
  document.getElementById(nhq+"_"+e+"EditBtn_"+sn).style.display='none'; 
  document.getElementById(nhq+"_"+e+"SaveBtn_"+sn).style.display='block'; 
  for(var i=1; i<=4; i++)
  {
    document.getElementById(nhq+"_"+e+"M"+i+"_Be"+sn).style.background='#FFFFFF';
	document.getElementById(nhq+"_"+e+"M"+i+"_Ce"+sn).style.background='#FFFFFF';
  }
    
var M1B=parseFloat(document.getElementById(nhq+'_'+e+'M1_Be'+sn).value); var M2B=parseFloat(document.getElementById(nhq+'_'+e+'M2_Be'+sn).value); var M3B=parseFloat(document.getElementById(nhq+'_'+e+'M3_Be'+sn).value); var M4B=parseFloat(document.getElementById(nhq+'_'+e+'M4_Be'+sn).value); var M1C=parseFloat(document.getElementById(nhq+'_'+e+'M1_Ce'+sn).value); var M2C=parseFloat(document.getElementById(nhq+'_'+e+'M2_Ce'+sn).value); var M3C=parseFloat(document.getElementById(nhq+'_'+e+'M3_Ce'+sn).value); var M4C=parseFloat(document.getElementById(nhq+'_'+e+'M4_Ce'+sn).value); var a1=parseFloat(document.getElementById(nhq+'_'+e+'M1a'+sn).value); var a2=parseFloat(document.getElementById(nhq+'_'+e+'M2a'+sn).value); var a3=parseFloat(document.getElementById(nhq+'_'+e+'M3a'+sn).value); var a4=parseFloat(document.getElementById(nhq+'_'+e+'M4a'+sn).value); var b1=parseFloat(document.getElementById(nhq+'_'+e+'M1b'+sn).value); var b2=parseFloat(document.getElementById(nhq+'_'+e+'M2b'+sn).value); var b3=parseFloat(document.getElementById(nhq+'_'+e+'M3b'+sn).value); var b4=parseFloat(document.getElementById(nhq+'_'+e+'M4b'+sn).value); var T2=parseFloat(document.getElementById(nhq+"_"+e+"TotP2d_"+sn).value); var T3=parseFloat(document.getElementById(nhq+"_"+e+"TotP3d_"+sn).value); var Ta=parseFloat(document.getElementById(nhq+"_"+e+"MTota"+sn).value); var Tb=parseFloat(document.getElementById(nhq+"_"+e+"MTotb"+sn).value);

if(isNaN(a1)){var a11=0;}else{var a11=a1;} if(isNaN(M1B)){var M1BB=0;}else{var M1BB=M1B;} 
if(M1BB==0){document.getElementById(nhq+"_"+e+"M1_Be"+sn).value=document.getElementById(nhq+"_"+e+"M1a"+sn).value;} 
if(isNaN(b1)){var b11=0;}else{var b11=b1;} if(isNaN(M1C)){var M1CC=0;}else{var M1CC=M1C;}
if(M1CC==0){document.getElementById(nhq+"_"+e+"M1_Ce"+sn).value=document.getElementById(nhq+"_"+e+"M1b"+sn).value;}

if(isNaN(a2)){var a22=0;}else{var a22=a2;} if(isNaN(M2B)){var M2BB=0;}else{var M2BB=M2B;} 
if(M2BB==0){document.getElementById(nhq+"_"+e+"M2_Be"+sn).value=document.getElementById(nhq+"_"+e+"M2a"+sn).value;}
if(isNaN(b2)){var b22=0;}else{var b22=b2;} if(isNaN(M2C)){var M2CC=0;}else{var M2CC=M2C;}
if(M2CC==0){document.getElementById(nhq+"_"+e+"M2_Ce"+sn).value=document.getElementById(nhq+"_"+e+"M2b"+sn).value;}

if(isNaN(a3)){var a33=0;}else{var a33=a3;} if(isNaN(M3B)){var M3BB=0;}else{var M3BB=M3B;} 
if(M3BB==0){document.getElementById(nhq+"_"+e+"M3_Be"+sn).value=document.getElementById(nhq+"_"+e+"M3a"+sn).value;}
if(isNaN(b3)){var b33=0;}else{var b33=b3;} if(isNaN(M3C)){var M3CC=0;}else{var M3CC=M3C;}
if(M3CC==0){document.getElementById(nhq+"_"+e+"M3_Ce"+sn).value=document.getElementById(nhq+"_"+e+"M3b"+sn).value;}

if(isNaN(a4)){var a44=0;}else{var a44=a4;} if(isNaN(M4B)){var M4BB=0;}else{var M4BB=M4B;} 
if(M4BB==0){document.getElementById(nhq+"_"+e+"M4_Be"+sn).value=document.getElementById(nhq+"_"+e+"M4a"+sn).value;}
if(isNaN(b4)){var b44=0;}else{var b44=b4;} if(isNaN(M4C)){var M4CC=0;}else{var M4CC=M4C;}
if(M4CC==0){document.getElementById(nhq+"_"+e+"M4_Ce"+sn).value=document.getElementById(nhq+"_"+e+"M4b"+sn).value;}

if(isNaN(Ta)){var Taa=0;}else{var Taa=Ta;} if(isNaN(T2)){var T22=0;}else{var T22=T2;} 
if(T22==0){document.getElementById(nhq+"_"+e+"TotP2d_"+sn).value=document.getElementById(nhq+"_"+e+"MTota"+sn).value; }
if(isNaN(Tb)){var Tbb=0;}else{var Tbb=Tb;} if(isNaN(T3)){var T33=0;}else{var T33=T3;}
if(T33==0){document.getElementById(nhq+"_"+e+"TotP3d_"+sn).value=document.getElementById(nhq+"_"+e+"MTotb"+sn).value; }
}


function saveD(sn,yi,gi,eId,rn,nhq)
{ var PId=document.getElementById(nhq+'_'+eId+'P_'+sn).value; var EId=document.getElementById('EmpId').value; 
  var ii=document.getElementById('ii').value; var hq=document.getElementById('hq').value; 
  var ComId=document.getElementById('ComId').value;  
  
  var M1B=parseFloat(document.getElementById(nhq+'_'+eId+'M1_Be'+sn).value); 
  var M2B=parseFloat(document.getElementById(nhq+'_'+eId+'M2_Be'+sn).value); 
  var M3B=parseFloat(document.getElementById(nhq+'_'+eId+'M3_Be'+sn).value); 
  var M4B=parseFloat(document.getElementById(nhq+'_'+eId+'M4_Be'+sn).value); 
  var M1C=parseFloat(document.getElementById(nhq+'_'+eId+'M1_Ce'+sn).value); 
  var M2C=parseFloat(document.getElementById(nhq+'_'+eId+'M2_Ce'+sn).value); 
  var M3C=parseFloat(document.getElementById(nhq+'_'+eId+'M3_Ce'+sn).value); 
  var M4C=parseFloat(document.getElementById(nhq+'_'+eId+'M4_Ce'+sn).value); 
  var Mn1B=document.getElementById(nhq+'_'+eId+'M1_Be'+sn).value; 
  var Mn2B=document.getElementById(nhq+'_'+eId+'M2_Be'+sn).value; 
  var Mn3B=document.getElementById(nhq+'_'+eId+'M3_Be'+sn).value; 
  var Mn4B=document.getElementById(nhq+'_'+eId+'M4_Be'+sn).value;
  var Mn1C=document.getElementById(nhq+'_'+eId+'M1_Ce'+sn).value; 
  var Mn2C=document.getElementById(nhq+'_'+eId+'M2_Ce'+sn).value; 
  var Mn3C=document.getElementById(nhq+'_'+eId+'M3_Ce'+sn).value; 
  var Mn4C=document.getElementById(nhq+'_'+eId+'M4_Ce'+sn).value;    
  if(Mn1B==''){var n1B=0;}else{var n1B=M1B;} if(Mn2B==''){var n2B=0;}else{var n2B=M2B;} 
  if(Mn3B==''){var n3B=0;}else{var n3B=M3B;} if(Mn4B==''){var n4B=0;}else{var n4B=M4B;}
  if(Mn1C==''){var n1C=0;}else{var n1C=M1C;} if(Mn2C==''){var n2C=0;}else{var n2C=M2C;} 
  if(Mn3C==''){var n3C=0;}else{var n3C=M3C;} if(Mn4C==''){var n4C=0;}else{var n4C=M4C;} 
  var TotA=0; var TotB=Math.round((n1B+n2B+n3B+n4B)*100)/100; var TotC=Math.round((n1C+n2C+n3C+n4C)*100)/100; 
  document.getElementById("TotAValueM").value=TotA; document.getElementById("TotBValueM").value=TotB; 
  document.getElementById("TotCValueM").value=TotC; document.getElementById("Sno").value=sn; 
  document.getElementById("MainSelTerrId").value=eId; document.getElementById("sgi").value=gi; 
  document.getElementById("nhq").value=nhq; alert('Action=AddMonth&p='+PId+'&e='+EId+'&m1B='+n1B+'&m2B='+n2B+'&m3B='+n3B+'&m4B='+n4B+'&m1C='+n1C+'&m2C='+n2C+'&m3C='+n3C+'&m4C='+n4C+'&TotA='+TotA+'&TotB='+TotB+'&TotC='+TotC+'&yi='+yi+'&eId='+eId+'&sn='+sn+'&hi='+hq+'&ii='+ii+'&rn='+rn+'&gi='+gi+'&c='+ComId+'&nhq='+nhq);
  var url = 'SlctSalesProdDealHodMt.php';  var pars = 'Action=AddMonth&p='+PId+'&e='+EId+'&m1B='+n1B+'&m2B='+n2B+'&m3B='+n3B+'&m4B='+n4B+'&m1C='+n1C+'&m2C='+n2C+'&m3C='+n3C+'&m4C='+n4C+'&TotA='+TotA+'&TotB='+TotB+'&TotC='+TotC+'&yi='+yi+'&eId='+eId+'&sn='+sn+'&hi='+hq+'&ii='+ii+'&rn='+rn+'&gi='+gi+'&c='+ComId+'&nhq='+nhq;     
  var myAjax = new Ajax.Request( url, { method: 'post', parameters: pars, onComplete: show_AddMonth });  
}
function show_AddMonth(originalRequest)
{ document.getElementById('AddMonthResult').innerHTML = originalRequest.responseText; 
  var Sno=document.getElementById('Sno').value; var ii=document.getElementById('ii').value;
  var eId=document.getElementById('MainSelTerrId').value; var gi=document.getElementById('sgi').value; 
  var nhq=document.getElementById('nhq').value; 
  //var TotalA=document.getElementById(nhq+'_'+eId+'TotP1d_'+Sno).value=document.getElementById('TotAValueM').value; 
  var TotalB=document.getElementById(nhq+'_'+eId+'TotP2d_'+Sno).value=document.getElementById('TotBValueM').value;   
  var TotalC=document.getElementById(nhq+'_'+eId+'TotP3d_'+Sno).value=document.getElementById('TotCValueM').value; 
    
  if(ii!='All_1' && ii!='All_2')
  { 
   document.getElementById(nhq+'_'+eId+'M1_BeT').value=document.getElementById("Tot21").value; 
   document.getElementById(nhq+'_'+eId+'M2_BeT').value=document.getElementById("Tot22").value; 
   document.getElementById(nhq+'_'+eId+'M3_BeT').value=document.getElementById("Tot23").value; 
   document.getElementById(nhq+'_'+eId+'M4_BeT').value=document.getElementById("Tot24").value; 
   document.getElementById(nhq+'_'+eId+'M1_CeT').value=document.getElementById("Tot31").value; 
   document.getElementById(nhq+'_'+eId+'M2_CeT').value=document.getElementById("Tot32").value; 
   document.getElementById(nhq+'_'+eId+'M3_CeT').value=document.getElementById("Tot33").value; 
   document.getElementById(nhq+'_'+eId+'M4_CeT').value=document.getElementById("Tot34").value;
   document.getElementById(nhq+'_'+eId+'TotM_BeT').value=document.getElementById("TTot2").value; 
   document.getElementById(nhq+'_'+eId+'TotM_CeT').value=document.getElementById("TTot3").value;  
  } 
  
  for(var i=1; i<=4; i++)
  {
    document.getElementById(nhq+'_'+eId+'M'+i+'_Be'+Sno).style.background='#B6FF6C';
	document.getElementById(nhq+'_'+eId+'M'+i+'_Ce'+Sno).style.background='#B6FF6C';
  } 
  document.getElementById(nhq+"_"+eId+"EditBtn_"+Sno).style.display='block';  
  document.getElementById(nhq+"_"+eId+"SaveBtn_"+Sno).style.display='none'; 
}

function SalesTeam(hq,v,gv)
{
  var act=document.getElementById("act").value; 
  var q=document.getElementById("q").value; var cc=document.getElementById("cc").value; var di=document.getElementById("di").value;
  var gi=document.getElementById("gi").value; var EHq=document.getElementById("EHq").value; var ii=document.getElementById("ii").value; 
  var fc=document.getElementById("fc").value; var vc=document.getElementById("vc").value;
  var myh=document.getElementById("myh").value; var myt=document.getElementById("myt").value;
  window.location="SalesTeam.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&act="+act+"&hq="+hq+"&y="+v+"&q="+q+"&ii="+ii+"&vc="+vc+"&fc="+fc+"&cc="+cc+"&di="+di+"&gi="+gi+'&EHq='+EHq+'&myh='+myh+'&myt='+myt+'&crop=0';  
}

function ClickFSL2(e,y,g)
{ 
  var act=document.getElementById("act").value; var hq=document.getElementById("hq").value; 
  var q=document.getElementById("q").value; var cc=document.getElementById("cc").value; var di=document.getElementById("di").value;
  var gi=document.getElementById("gi").value; var EHq=document.getElementById("EHq").value; var ii=document.getElementById("ii").value; 
  var fc=document.getElementById("fc").value; var vc=document.getElementById("vc").value;
  var myh=1; var myt=document.getElementById("myt").value;
  var win = window.open("SbOpenhFile.php?CheckAct=Fsb2&y="+y+"&e="+e+"&g="+g,"QForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=620,height=300");
  var timer = setInterval( function() { if(win.closed) { clearInterval(timer);  window.location="SaleshEntryMt.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&act="+act+"&hq="+hq+"&y="+y+"&q="+q+"&ii=0&vc=0&fc=0&ac=1&cc="+cc+"&di="+di+"&gi="+gi+'&EHq='+EHq+'&myh='+myh+'&myt='+myt; } }, 1000);
}

</script>  
</head>
<body class="body">   
<table class="table" style="width:100%;">
<tr><td style="width:100%;"><table class="menutable"><tr><td><?php if($_SESSION['login'] = true){ require_once("EMenu.php"); } ?></td></tr></table></td></tr>
<tr>
 <td>
 <table style="margin-top:0px;width:100%;" border="0">
  <tr><td valign="top"><?php if($_SESSION['login'] = true){ require_once("EWelcome.php"); } ?></td></tr>
  <tr>
   <td valign="top" style="width:100%;">
   <table border="0" style="width:100%;" cellpadding="0">
    <tr>
     <td valign="top" style="width:100%;"> 
<!--------------------- Start Start Start Start Start Start Start Start Start Start Open Open ------------>
<!--------------------- Start Start Start Start Start Start Start Start Start Start Open Open ------------>	
<?php $SpEG=mysql_query("select GradeValue from hrm_grade where CompanyId=".$CompanyId." AND GradeId=".$_SESSION['GradeId'], $con); $resSpEG=mysql_fetch_assoc($SpEG); ?>		
<input type="hidden" name="ComId" id="ComId" value="<?php echo $CompanyId; ?>" /><input type="hidden" id="EmpId" name="EmpId" value="<?php echo $EmployeeId; ?>" /><input type="hidden" id="act" value="<?php echo $_REQUEST['act']; ?>" /><input type="hidden" name="y" id="y" value="<?php echo $_REQUEST['y']; ?>" /><input type="hidden" name="hq" id="hq" value="<?php echo $_REQUEST['hq']; ?>" /><input type="hidden" name="q" id="q" value="<?php echo $_REQUEST['q']; ?>" /><input type="hidden" name="vc" id="vc" value="<?php echo $_REQUEST['vc']; ?>" /><input type="hidden" name="fc" id="fc" value="<?php echo $_REQUEST['fc']; ?>" /><input type="hidden" id="di" value="<?php echo $_REQUEST['di']; ?>" /><input type="hidden" id="gi" value="<?php echo $_REQUEST['gi']; ?>" /><input type="hidden" id="cc" value="<?php echo $_REQUEST['cc']; ?>" /><input type="hidden" id="ActThought" value="0" /><input type="hidden" id="ii" value="<?php echo $_REQUEST['ii']; ?>" /><input type="hidden" id="EHq" value="<?php echo $_REQUEST['EHq']; ?>" /><input type="hidden" id="TotAValueM" value="" /><input type="hidden" id="TotBValueM" value="" /><input type="hidden" id="TotCValueM" value="" /><input type="hidden" id="MainSelTerrId" value="" /><input type="hidden" id="Sno" value="" /><input type="hidden" id="myh" value="<?php echo $_REQUEST['myh']; ?>" />
<input type="hidden" id="myt" value="<?php echo $_REQUEST['myt']; ?>" /><input type="hidden" id="HqV" value="<?php echo $_REQUEST['hq']; ?>" /><input type="hidden" id="sgi" value="" /><input type="hidden" id="nhq" value="" />

<input type="hidden" id="Rowhq2" value="<?php echo $_SESSION['rowHq2']; ?>" />
<?php if($_SESSION['rowHq2']==1){ echo '<input type="hidden" id="h1q" value="'.$_SESSION['Hq2Id'].'" />'; } ?> 
<input type="hidden" id="no" value="<?php echo $_REQUEST['no']; ?>" />

<table border="0" id="Activity" style="width:100%;"> <?php /* 11111 Start Table*/ ?>

<!-- cccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccc Open -->
<!-- cccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccc Open -->
 <tr>
  <td valign="top">
  <table border="0" style="width:100%;">
 
<!----------------------- Top Btn Open Top Btn Open Top Btn Open Top Btn Open -----------------------> 
<!----------------------- Top Btn Open Top Btn Open Top Btn Open Top Btn Open -----------------------> 

<?php 
if($_SESSION['Vertical']==16 || ($_SESSION['Hqv']>0 && $_SESSION['Hqf']>0))
{ 
 $sHqv=mysql_query("select Hq_vc as HqIdv,HqName as HqNamev from hrm_sales_dealer d INNER JOIN hrm_headquater hq ON d.Hq_vc=hq.HqId where Terr_vc=".$EmployeeId." AND DealerSts='A' group by Hq_vc order by HqName asc");
  
 $ssHqv=mysql_query("select Hq_vc from hrm_sales_dealer where Terr_vc=".$EmployeeId." AND DealerSts='A' group by Hq_vc order by Hq_vc asc"); $rowHqv=mysql_num_rows($ssHqv); while($rrHqv=mysql_fetch_array($ssHqv)){ $arr_v[]=$rrHqv['Hq_vc']; } 
 if($rowHqv>0){ $Hqv = implode(',', $arr_v); }else{ $Hqv='99999';}
 $sHqf=mysql_query("select Hq_fc as HqIdf,HqName as HqNamef from hrm_sales_dealer d INNER JOIN hrm_headquater hq ON d.Hq_fc=hq.HqId where Terr_fc=".$EmployeeId." AND DealerSts='A' AND Hq_fc NOT IN (".$Hqv.") group by Hq_fc order by HqName asc"); 
  
 $rowHqv=mysql_num_rows($sHqv); $rowHqf=mysql_num_rows($sHqf);
}
elseif($_SESSION['Vertical']==14 || $_SESSION['Hqv']>0)
{ 
  $sHqv=mysql_query("select Hq_vc as HqIdv,HqName as HqNamev from hrm_sales_dealer d INNER JOIN hrm_headquater hq ON d.Hq_vc=hq.HqId where Terr_vc=".$EmployeeId." AND DealerSts='A' group by Hq_vc order by HqName asc");
  $rowHqv=mysql_num_rows($sHqv); $rowHqf=0;
}
elseif($_SESSION['Vertical']==15 || $_SESSION['Hqf']>0)
{
  $sHqf=mysql_query("select Hq_fc as HqIdf,HqName as HqNamef from hrm_sales_dealer d INNER JOIN hrm_headquater hq ON d.Hq_fc=hq.HqId where Terr_fc=".$EmployeeId." AND DealerSts='A' group by Hq_fc order by HqName asc");
  $rowHqv=0; $rowHqf=mysql_num_rows($sHqf);
}
?>
  
<tr>
 <td style="width:100%;">	      
  <table border="0">
   <tr>
   <td align="left" style="width:170px;"><img src="images/PlannerH.png" border="0" style="height:40px;width:150px;"/></td>
   <?php if($_REQUEST['act']>0){ ?>
   <td valign="bottom" style="width:140px;"><a href="#"><img src="images/Myteam1.png" border="0" style="height:30px;width:130px;"/></a></td>
   <td valign="bottom" style="width:140px;"><a href="#" onClick="ChangePerMi(<?php echo $_REQUEST['hq'].', '.$_REQUEST['y']; ?>)"><img src="images/Permission.png" border="0" style="height:30px;width:130px;" /></a></td>
   <?php } ?>
   <?php if($resSpEG['GradeValue']=='MG'){ ?>
   <td align="center" valign="bottom"><a href="#" onClick="SalesTeam(<?php echo $_REQUEST['hq'].', '.$_REQUEST['y']; ?>,'<?php echo $resSpEG['GradeValue']; ?>')"><img src="images/SalesTeam.png" border="0" style="height:30px;width:130px;" /></a></td>
   <?php } ?>		 
  </tr>
  </table>
 </td>
</tr>
<!----------------------- Top Btn Close Top Btn Close Top Btn Close Top Btn Close -----------------------> 
<!----------------------- Top Btn Close Top Btn Close Top Btn Close Top Btn Close ----------------------->


<tr>
 <td style="width:100%;">	      
  <table border="0">
  <tr>    
   <td align="left" style="width:170px;">&nbsp;</td>
<?php
$Ymin1=$_REQUEST['y']-1; $Ymin2=$_REQUEST['y']-2;
$sUpy=mysql_query("select FromDate,ToDate from hrm_sales_year where YearId=".$YearId, $con); 
$sYmin1=mysql_query("select FromDate,ToDate from hrm_sales_year where YearId=".$Ymin1, $con); 
$sYmin2=mysql_query("select FromDate,ToDate from hrm_sales_year where YearId=".$Ymin2, $con);
$rUpy=mysql_fetch_assoc($sUpy); $rYmin1=mysql_fetch_assoc($sYmin1); $rYmin2=mysql_fetch_assoc($sYmin2);
$FUpy=date("Y",strtotime($rUpy['FromDate'])); $TUpy=date("Y",strtotime($rUpy['ToDate']));
$FYmin1=date("Y",strtotime($rYmin1['FromDate'])); $TYmin1=date("Y",strtotime($rYmin1['ToDate']));
$FYmin2=date("Y",strtotime($rYmin2['FromDate'])); $TYmin2=date("Y",strtotime($rYmin2['ToDate'])); 
?>	   
   <td class="det">Year :&nbsp;<select class="detsel" style="width:90px;background-color:#C4FFC4;" id="YearV" onChange="ChangeYear(this.value)"><?php $sqlye=mysql_query("select YearId,FromDate,ToDate from hrm_sales_year where YearId=".$_REQUEST['y'], $con); $resye=mysql_fetch_assoc($sqlye); $FFromDate=date("Y",strtotime($resye['FromDate'])); $TToDate=date("Y",strtotime($resye['ToDate'])); ?><option value="<?php echo $resye['YearId']; ?>" selected><?php echo $FFromDate.'-'.$TToDate; ?></option>
      <?php if($_REQUEST['y']==$YearId){ ?>
      <option value="<?php echo $Ymin1; ?>"><?php echo $FYmin1.'-'.$TYmin1; ?></option>
      <option value="<?php echo $Ymin2; ?>"><?php echo $FYmin2.'-'.$TYmin2; ?></option>
      <?php } elseif($_REQUEST['y']!=$YearId) { ?>
      <option value="<?php echo $YearId; ?>"><?php echo $FUpy.'-'.$TUpy; ?></option>
      <?php if($_REQUEST['y']!=$Ymin1){?>
      <option value="<?php echo $Ymin1; ?>"><?php echo $FYmin1.'-'.$TYmin1; ?></option><?php } ?>

      <?php if($_REQUEST['y']!=$Ymin2){?>
      <option value="<?php echo $Ymin2; ?>"><?php echo $FYmin2.'-'.$TYmin2; ?></option><?php } ?> 
      <?php } ?>	 
   </select> 
   <input type="hidden" id="QtrV" value="0" />
   </td>
   <td>&nbsp;</td>
   <?php if($_SESSION['Vertical']==14 OR $_SESSION['Vertical']==16){ ?>
   <td class="det">VC :&nbsp;<select class="detsel" style="width:140px;background-color:#C4FFC4;" id="ItemV" onChange="ChangeItem(this.value,'vc')">
   <?php if($_REQUEST['vc']!=0 && $_REQUEST['ii']!=0){$sqlI=mysql_query("select ItemName from hrm_sales_seedsitem where ItemId=".$_REQUEST['ii'], $con); $resI=mysql_fetch_assoc($sqlI);?><option value="<?php echo $_REQUEST['ii']; ?>" selected><?php echo strtoupper($resI['ItemName']); ?></option><?php }else{ ?><option value="0" selected>SELECT</option><?php } ?>
   <?php $sqlItem=mysql_query("select * from hrm_sales_seedsitem where GroupId=1 order by ItemName ASC", $con); while($resItem=mysql_fetch_assoc($sqlItem)){ ?><option value="<?php echo $resItem['ItemId']; ?>"><?php echo $resItem['ItemName']; ?></option><?php } /* ?><option value="All_1"> --- All ---</option><?php */ ?></select>
   </td>
   <?php }else{ ?><input type="hidden" id="ItemV" value="0" /><?php } ?>
   
   <input type="hidden" id="ValueItem" value="<?php echo $_REQUEST['ii']; ?>" /> 
   <input type="hidden" id="ValueName" value="<?php if($_REQUEST['vc']>0){echo 'vc';}elseif($_REQUEST['fc']>0){echo 'fc';}?>"/>	
   
   <?php if($_SESSION['Vertical']==15 OR $_SESSION['Vertical']==16){ ?>
   <td>&nbsp;</td>
   <td class="det">FC :&nbsp;<select class="detsel" style="width:140px;background-color:#C4FFC4;" id="ItemV2" onChange="ChangeItem(this.value,'fc')">
   <?php if($_REQUEST['fc']!=0 AND $_REQUEST['ii']!='All_2'){$sqlIf=mysql_query("select ItemName from hrm_sales_seedsitem where ItemId=".$_REQUEST['ii'], $con); $resIf=mysql_fetch_assoc($sqlIf);?><option value="<?php echo $_REQUEST['ii']; ?>" selected><?php echo strtoupper($resIf['ItemName']); ?></option><?php } elseif($_REQUEST['fc']!=0 AND $_REQUEST['ii']=='All_2'){?><option value="<?php echo $_REQUEST['ii']; ?>" selected>--- All ---</option><?php } else{ ?><option value="0" selected>SELECT</option><?php } ?><?php $sqlItemf=mysql_query("select * from hrm_sales_seedsitem where GroupId=2 order by ItemName ASC", $con); while($resItemf=mysql_fetch_assoc($sqlItemf)){ ?><option value="<?php echo $resItemf['ItemId']; ?>"><?php echo $resItemf['ItemName']; ?></option><?php } ?><!--<option value="All_2"> --- All ---</option>--></select>
   </td>
   <?php }else{ ?><input type="hidden" id="ItemV2" value="0" /><?php } ?>
   	
   <td>&nbsp;</td>
   <?php if($_REQUEST['hq']>0)
         { $sqlSt=mysql_query("select HqName,StateId from hrm_headquater where HqId=".$_REQUEST['hq'], $con);      
           $resSt=mysql_fetch_assoc($sqlSt); }
   ?>
   <script type="text/javascript">
    function ChangeTotal(hq,v,no)
    {
	 if(document.getElementById("ii").value==0){ alert("please select any one item!"); return false;}
	 else
	 {
      var myh=1; var rowHq=document.getElementById("Rowhq2").value; window.location=
"SaleshEntryMt.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=EewTottv&act="+document.getElementById("act").value+"&hq="+document.getElementById("hq").value+"&y="+document.getElementById("y").value+"&q="+document.getElementById("q").value+"&ii="+document.getElementById("ii").value+"&vc=1&fc=0&cc="+document.getElementById("cc").value+"&di="+document.getElementById("di").value+"&gi="+document.getElementById("gi").value+"&EHq="+document.getElementById("EHq").value+"&myh="+document.getElementById("myh").value+"&myt="+document.getElementById("myt").value+"&no="+no+"&SelectV=TotalNo";
	  
	 }  
    }
   </script>
   <td align="center" valign="bottom">
    <a href="#" onClick="ChangeTotal(<?php echo $_REQUEST['hq'].', '.$_REQUEST['y'].', '.$_REQUEST['no']; ?>)"><font style="color:<?php if($_REQUEST['ernS']=='EewTottv'){echo '#FFF';}else{echo '#FF8000';} ?>;font-family:Times New Roman;font-size:16px;font-weight:bold; text-decoration:underline;">
 Total My-Team</font></a></td>
    
   	 
  </tr>
  </table>
 </td>
</tr>

<tr><td><span id="DealerHqSpan"></span></td></tr>

  </table>
 </td>
</tr>
<!-- cccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccc Close -->
<!-- cccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccc Close -->

<!-- ---------------------------------- Main Page Open ---------------------------------- Open -->
<!-- ---------------------------------- Main Page Open ---------------------------------- Open -->
<?php if($_REQUEST['act']>0){ ?>

<?php $sql = mysql_query("select HqName from hrm_headquater where HqId=".$_REQUEST['hq'], $con); 
      $res=mysql_fetch_array($sql); 
	  $Before2YId=$_REQUEST['y']-2; $BeforeYId=$_REQUEST['y']-1; $AfterYId=$_REQUEST['y']+1;
	  $sqlY0=mysql_query("select FromDate,ToDate from hrm_sales_year where YearId=".$Before2YId, $con); 
	  $sqlY1=mysql_query("select FromDate,ToDate from hrm_sales_year where YearId=".$BeforeYId, $con); 
	  $sqlY2=mysql_query("select FromDate,ToDate from hrm_sales_year where YearId=".$_REQUEST['y'], $con); 
	  $sqlY3=mysql_query("select FromDate,ToDate from hrm_sales_year where YearId=".$AfterYId, $con); 
	  $resY0=mysql_fetch_assoc($sqlY0); $resY1=mysql_fetch_assoc($sqlY1); $resY2=mysql_fetch_assoc($sqlY2); 
	  $resY3=mysql_fetch_assoc($sqlY3);
	  $y0=date("y",strtotime($resY0['FromDate'])).'-'.date("y",strtotime($resY0['ToDate'])); 
	  $y0T='<font color="#A60053">Ach.</font>'; 
	  $y1=date("y",strtotime($resY1['FromDate'])).'-'.date("y",strtotime($resY1['ToDate'])); 
	  $y1T='<font color="#A60053">Ach.</font>';
	  $y2=date("y",strtotime($resY2['FromDate'])).'-'.date("y",strtotime($resY2['ToDate'])); 
	  $y2T='<font color="#A60053">Tgt.</font>';
	  $y3=date("y",strtotime($resY3['FromDate'])).'-'.date("y",strtotime($resY3['ToDate'])); 
	  $y3T='<font color="#A60053">Proj.</font>';
	  if($_REQUEST['ii']=='All_1' OR $_REQUEST['ii']=='All_2'){ $ItemN='All Crop'; }
	  else{ $sqlItem = mysql_query("select ItemName from hrm_sales_seedsitem where ItemId=".$_REQUEST['ii'], $con); $resItem=mysql_fetch_assoc($sqlItem); $ItemN=$resItem['ItemName'];
	  $sqlSubEmp = mysql_query("select * from hrm_sales_emp_action where EmployeeID=".$EmployeeId." AND YearId=".$_REQUEST['y']." AND StatusB=1", $con); $rowSubEmp=mysql_num_rows($sqlSubEmp);
	  } ?>	 
      <input type="hidden" name="rowSubEmp" id="rowSubEmp" value="<?php echo $rowSubEmp; ?>" />
	  <input type="hidden" name="VDealer" id="VDealer" value="<?php echo strtoupper($res['DealerName']); ?>" readonly/>
	  <input type="hidden" name="DealerId" id="DealerId" value="<?php echo $_POST['DealIdE']; ?>" />
	  <input type="hidden" name="DealerCity" id="DealerCity" value="<?php echo $res['DealerCity']; ?>" />
	  <input type="hidden" name="ni" id="ni" value="<?php echo $_POST['ni']; ?>" />
	  
<!-- Overall Total Overall Total Overall Total Overall Total Overall Total Open -->
<!-- Overall Total Overall Total Overall Total Overall Total Overall Total Open -->
<?php if($_REQUEST['ernS']=='EewTottv'){ ?>
<tr>
 <td style="width:100%;">
<div class="outerbox">
<div class="innerbox">	  	  
<table border="1" cellpadding="0" cellspacing="0" style="font-family:Times New Roman;font-size:14px;width:100%;">	
  <tr>
  <td colspan="<?php if($_REQUEST['ii']=='All_1' OR $_REQUEST['ii']=='All_2' OR $_REQUEST['ac']==1){ echo 3;}else{echo 2;}?>" align="center" style="height:25px;background-color:#005300;font-family:Times New Roman;font-size:16px;color:#FFFF20;font-weight:bold;" id="TD_<?php echo $counter; ?>">  <font color="#D7EBFF">Crop:</font>&nbsp;<?php echo $ItemN; ?>
  </td>
  <td colspan="24" style="height:25px;background-color:#005300;font-family:Times New Roman;font-size:16px;color:#FFFF20;font-weight:bold;" id="TD_<?php echo $counter; ?>">
   &nbsp;<font color="#D7EBFF"></font>ALL My-Team&nbsp;&nbsp;&nbsp;
   &nbsp;<font color="#D7EBFF">Year:&nbsp;</font><?php echo $FFromDate.'-'.$TToDate; //$fromdate.'-'.$todate; ?>
   
   &nbsp;&nbsp;&nbsp;
   <?php if($_REQUEST['ac']==1){ ?>
   <?php $sqlSb=mysql_query("select * from hrm_sales_emp_action where EmployeeID=".$EmployeeId." AND YearId=".$_REQUEST['y']." AND StatusB=1", $con); $rowSb=mysql_num_rows($sqlSb); ?><input type="button" style="font-family:Times New Roman;width:100px;height:25px;font-weight:bold;" value="Final Submit" onClick="ClickFSL2(<?php echo $EmployeeId.', '.$_REQUEST['y']; ?>)" <?php if($rowSb>0){echo 'disabled';}else{echo '';}?>/><?php } ?>
   
   </td>
 </td>
  </tr>
  <tr style="background-color:#D5F1D1;color:#000000;">
    <td colspan="<?php if($_REQUEST['ii']=='All_1' OR $_REQUEST['ii']=='All_2' OR $_REQUEST['ac']==1){echo 3;}else{echo 2;}?>" align="center" style="font-size:16px;color:#FFFFFF;background-color:#183E83;">
<b><?php echo "ALL HQ"; ?></b></td>

<td colspan="4" align="center"><b>Quarter 1</b></td><td colspan="4" align="center"><b>Quarter 2</b></td>
<td colspan="4" align="center"><b>Quarter 3</b></td><td colspan="4" align="center"><b>Quarter 4</b></td>
<td colspan="4" align="center" style="background-color:#D9D9FF;"><b>TOTAL</b></td>
<?php /*?><td colspan="2" align="center" style="background-color:#D7FFAE;"><b>&nbsp;REVISED&nbsp;</b></td><?php */?>
  </tr>	
   <tr style="background-color:#D5F1D1;color:#000000;">
<?php if($_REQUEST['ii']=='All_1' OR $_REQUEST['ii']=='All_2' OR $_REQUEST['ac']==1){ ?>   
    <td align="center" style="font-size:12px;width:100px;"><b>CROP</b></td>
<?php } ?>	
	<td align="center" style="font-size:12px;width:120px;"><b>VARIETY</b></td>
	<td align="center" style="font-size:12px;width:30px;"><b>TYPE</b></td>
	<?php for($i=1; $i<=5; $i++){ ?>
	<td class="Trh60"><?php echo $y2T.'<br>'.$y2; ?></td><td class="Trh60"><?php echo $y3T.'<br>'.$y3; ?></td>
	<td class="Trh60"><?php echo '<font color="#A60053">Suggest</font><br>'.$y2; ?></td>
	<td class="Trh60"><?php echo '<font color="#A60053">Suggest</font><br>'.$y3; ?></td>
	<?php } ?>
	<?php /*?><td class="Trh60"><?php echo $y2T.'<br>'.$y2; ?></td><td class="Trh60"><?php echo $y3T.'<br>'.$y3; ?></td><?php */?>
   </tr>	
<?php if($_REQUEST['ii']!='All_1' AND $_REQUEST['ii']!='All_2' AND $_REQUEST['ii']!=0)
     {
$sql = mysql_query("select sp.ItemId,sp.ProductId,ProductName,ItemName,TypeName from hrm_sales_state_prod p inner join hrm_sales_seedsproduct sp on p.ProductId=sp.ProductId inner join hrm_sales_seedsitem si on sp.ItemId=si.ItemId inner join hrm_sales_seedtype st on sp.TypeId=st.TypeId where p.StateId in (".$StscId.") AND sp.ProductSts='A' AND si.ItemId=".$_REQUEST['ii']." group by sp.ProductId order by ItemName ASC, TypeName ASC, ProductName ASC", $con);
//$sql = mysql_query("select sp.ItemId,ProductId,ProductName,ItemName,TypeName from hrm_sales_seedsproduct sp INNER JOIN hrm_sales_seedsitem si ON sp.ItemId=si.ItemId INNER JOIN hrm_sales_seedtype st ON sp.TypeId=st.TypeId where sp.ProductSts='A' AND si.ItemId=".$_REQUEST['ii']." order by ItemName ASC, TypeName ASC, ProductName ASC", $con);
      }
      elseif($_REQUEST['ii']=='All_1')
	  {
$sql = mysql_query("select sp.ItemId,sp.ProductId,ProductName,ItemName,TypeName from hrm_sales_state_prod p inner join hrm_sales_seedsproduct sp on p.ProductId=sp.ProductId inner join hrm_sales_seedsitem si on sp.ItemId=si.ItemId inner join hrm_sales_seedtype st on sp.TypeId=st.TypeId where p.StateId in (".$StscId.") AND sp.ProductSts='A' AND si.GroupId=1 group by sp.ProductId order by ItemName ASC, TypeName ASC, ProductName ASC", $con);	  
//$sql = mysql_query("select sp.ItemId,ProductId,ProductName,ItemName,TypeName from hrm_sales_seedsproduct sp INNER JOIN hrm_sales_seedsitem si ON sp.ItemId=si.ItemId INNER JOIN hrm_sales_seedtype st ON sp.TypeId=st.TypeId where sp.ProductSts='A' AND si.GroupId=1 order by ItemName ASC, TypeName ASC, ProductName ASC", $con);
      }
	  elseif($_REQUEST['ii']=='All_2')
	  {
$sql = mysql_query("select sp.ItemId,sp.ProductId,ProductName,ItemName,TypeName from hrm_sales_state_prod p inner join hrm_sales_seedsproduct sp on p.ProductId=sp.ProductId inner join hrm_sales_seedsitem si on sp.ItemId=si.ItemId inner join hrm_sales_seedtype st on sp.TypeId=st.TypeId where p.StateId in (".$StscId.") AND sp.ProductSts='A' AND si.GroupId=2 group by sp.ProductId order by ItemName ASC, TypeName ASC, ProductName ASC", $con);		  
//$sql = mysql_query("select sp.ItemId,ProductId,ProductName,ItemName,TypeName from hrm_sales_seedsproduct sp INNER JOIN hrm_sales_seedsitem si ON sp.ItemId=si.ItemId INNER JOIN hrm_sales_seedtype st ON sp.TypeId=st.TypeId where sp.ProductSts='A' AND si.GroupId=2 order by ItemName ASC, TypeName ASC, ProductName ASC", $con);
      } 
	  elseif($_REQUEST['ii']==0 AND $_REQUEST['ac']==1)
	  {
$sql = mysql_query("select sp.ItemId,sp.ProductId,ProductName,ItemName,TypeName from hrm_sales_state_prod p inner join hrm_sales_seedsproduct sp on p.ProductId=sp.ProductId inner join hrm_sales_seedsitem si on sp.ItemId=si.ItemId inner join hrm_sales_seedtype st on sp.TypeId=st.TypeId where p.StateId in (".$StscId.") AND sp.ProductSts='A' AND (si.GroupId=1 OR si.GroupId=2) group by sp.ProductId order by ItemName ASC, TypeName ASC, ProductName ASC", $con);		  
//$sql = mysql_query("select sp.ItemId,ProductId,ProductName,ItemName,TypeName from hrm_sales_seedsproduct sp INNER JOIN hrm_sales_seedsitem si ON sp.ItemId=si.ItemId INNER JOIN hrm_sales_seedtype st ON sp.TypeId=st.TypeId where sp.ProductSts='A' AND (si.GroupId=1 OR si.GroupId=2) order by ItemName ASC, TypeName ASC, ProductName ASC", $con);
      }
	  	     
/*if($_REQUEST['ii']!='All_1' AND $_REQUEST['ii']!='All_2' AND $_REQUEST['ii']!=0){$sql = mysql_query("select sp.ItemId,ProductId,ProductName,ItemName,TypeName from hrm_sales_seedsproduct sp INNER JOIN hrm_sales_seedsitem si ON sp.ItemId=si.ItemId INNER JOIN hrm_sales_seedtype st ON sp.TypeId=st.TypeId where sp.ProductSts='A' AND si.ItemId=".$_REQUEST['ii']." order by ItemName ASC, TypeName ASC, ProductName ASC", $con);}
      elseif($_REQUEST['ii']=='All_1'){$sql = mysql_query("select sp.ItemId,ProductId,ProductName,ItemName,TypeName from hrm_sales_seedsproduct sp INNER JOIN hrm_sales_seedsitem si ON sp.ItemId=si.ItemId INNER JOIN hrm_sales_seedtype st ON sp.TypeId=st.TypeId where sp.ProductSts='A' AND si.GroupId=1 order by ItemName ASC, TypeName ASC, ProductName ASC", $con);}
	  elseif($_REQUEST['ii']=='All_2'){$sql = mysql_query("select sp.ItemId,ProductId,ProductName,ItemName,TypeName from hrm_sales_seedsproduct sp INNER JOIN hrm_sales_seedsitem si ON sp.ItemId=si.ItemId INNER JOIN hrm_sales_seedtype st ON sp.TypeId=st.TypeId where sp.ProductSts='A' AND si.GroupId=2 order by ItemName ASC, TypeName ASC, ProductName ASC", $con);}
	  elseif($_REQUEST['ii']==0 AND $_REQUEST['ac']==1){$sql = mysql_query("select sp.ItemId,ProductId,ProductName,ItemName,TypeName from hrm_sales_seedsproduct sp INNER JOIN hrm_sales_seedsitem si ON sp.ItemId=si.ItemId INNER JOIN hrm_sales_seedtype st ON sp.TypeId=st.TypeId where sp.ProductSts='A' AND (si.GroupId=1 OR si.GroupId=2) order by ItemName ASC, TypeName ASC, ProductName ASC", $con);}*/
	  
 if($_REQUEST['vc']>0){ $joinD="d.Terr_vc=rl.EmployeeID"; $suvD="Terr_vc=".$EmployeeId; }
 elseif($_REQUEST['fc']>0){ $joinD="d.Terr_fc=rl.EmployeeID"; $suvD="Terr_fc=".$EmployeeId; }	  
	  
 $Sn=1; 
 while($res=mysql_fetch_array($sql)){

 /*** TeamLease Employee Open ***/ 
 /*** TeamLease Employee Open ***/
 $rowP0a=0; $rowP1a=0;
 if($rtl>0)
 { 
   $sqlP0a=mysql_query("select SUM(M1) as sM1,SUM(M2) as sM2,SUM(M3) as sM3,SUM(M4) as sM4,SUM(M5) as sM5,SUM(M6) as sM6,SUM(M7) as sM7,SUM(M8) as sM8,SUM(M9) as sM9,SUM(M10) as sM10,SUM(M11) as sM11,SUM(M12) as sM12 from hrm_sales_sal_details_".$_REQUEST['y']." sd INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_sales_tlemp tl ON d.HqId=tl.TLHq where TLStatus='A' AND tl.TLRepId=".$EmployeeId." AND d.DealerSts='A' AND sd.ProductId=".$res['ProductId']." AND sd.YearId=".$_REQUEST['y'], $con); $rowP0a=mysql_num_rows($sqlP0a); $resP0a=mysql_fetch_assoc($sqlP0a);
  $sqlP1a=mysql_query("select SUM(M1_Proj) as sM1,SUM(M2_Proj) as sM2,SUM(M3_Proj) as sM3,SUM(M4_Proj) as sM4,SUM(M5_Proj) as sM5,SUM(M6_Proj) as sM6,SUM(M7_Proj) as sM7,SUM(M8_Proj) as sM8,SUM(M9_Proj) as sM9,SUM(M10_Proj) as sM10,SUM(M11_Proj) as sM11,SUM(M12_Proj) as sM12 from hrm_sales_sal_details_".$AfterYId." sd INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_sales_tlemp tl ON d.HqId=tl.TLHq where TLStatus='A' AND tl.TLRepId=".$EmployeeId." AND d.DealerSts='A' AND sd.ProductId=".$res['ProductId']." AND sd.YearId=".$AfterYId, $con); 
  $rowP1a=mysql_num_rows($sqlP1a); $resP1a=mysql_fetch_assoc($sqlP1a);
 }
 /*** TeamLease Employee CLose ***/
 /*** TeamLease Employee CLose ***/
 
  $sqlP0=mysql_query("select SUM(M1) as sM1,SUM(M2) as sM2,SUM(M3) as sM3,SUM(M4) as sM4,SUM(M5) as sM5,SUM(M6) as sM6,SUM(M7) as sM7,SUM(M8) as sM8,SUM(M9) as sM9,SUM(M10) as sM10,SUM(M11) as sM11,SUM(M12) as sM12 from hrm_sales_sal_details_".$_REQUEST['y']." sd INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_sales_reporting_level rl ON ".$joinD." where d.DealerSts='A' AND (".$suvD." OR rl.R1=".$EmployeeId." OR rl.R2=".$EmployeeId." OR rl.R3=".$EmployeeId." OR rl.R4=".$EmployeeId." OR rl.R5=".$EmployeeId.") AND sd.ProductId=".$res['ProductId']." AND sd.YearId=".$_REQUEST['y'], $con); $rowP0=mysql_num_rows($sqlP0); $resP0=mysql_fetch_assoc($sqlP0);
  $sqlP1=mysql_query("select SUM(M1_Proj) as sM1,SUM(M2_Proj) as sM2,SUM(M3_Proj) as sM3,SUM(M4_Proj) as sM4,SUM(M5_Proj) as sM5,SUM(M6_Proj) as sM6,SUM(M7_Proj) as sM7,SUM(M8_Proj) as sM8,SUM(M9_Proj) as sM9,SUM(M10_Proj) as sM10,SUM(M11_Proj) as sM11,SUM(M12_Proj) as sM12 from hrm_sales_sal_details_".$AfterYId." sd INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_sales_reporting_level rl ON ".$joinD." where d.DealerSts='A' AND (".$suvD." OR rl.R1=".$EmployeeId." OR rl.R2=".$EmployeeId." OR rl.R3=".$EmployeeId." OR rl.R4=".$EmployeeId." OR rl.R5=".$EmployeeId.") AND sd.ProductId=".$res['ProductId']." AND sd.YearId=".$AfterYId, $con); $rowP1=mysql_num_rows($sqlP1); $resP1=mysql_fetch_assoc($sqlP1);
 if($rtl>0)
 { 
  $P0p1=$resP0['sM1']+$resP0['sM2']+$resP0['sM3']+$resP0a['sM1']+$resP0a['sM2']+$resP0a['sM3']; 
  $P0p2=$resP0['sM4']+$resP0['sM5']+$resP0['sM6']+$resP0a['sM4']+$resP0a['sM5']+$resP0a['sM6'];
  $P0p3=$resP0['sM7']+$resP0['sM8']+$resP0['sM9']+$resP0a['sM7']+$resP0a['sM8']+$resP0a['sM9']; 
  $P0p4=$resP0['sM10']+$resP0['sM11']+$resP0['sM12']+$resP0a['sM10']+$resP0a['sM11']+$resP0a['sM12'];
  $Pp1=$resP1['sM1']+$resP1['sM2']+$resP1['sM3']+$resP1a['sM1']+$resP1a['sM2']+$resP1a['sM3']; 
  $Pp2=$resP1['sM4']+$resP1['sM5']+$resP1['sM6']+$resP1a['sM4']+$resP1a['sM5']+$resP1a['sM6'];
  $Pp3=$resP1['sM7']+$resP1['sM8']+$resP1['sM9']+$resP1a['sM7']+$resP1a['sM8']+$resP1a['sM9']; 
  $Pp4=$resP1['sM10']+$resP1['sM11']+$resP1['sM12']+$resP1a['sM10']+$resP1a['sM11']+$resP1a['sM12'];
 }
 else
 {
  $P0p1=$resP0['sM1']+$resP0['sM2']+$resP0['sM3']; $P0p2=$resP0['sM4']+$resP0['sM5']+$resP0['sM6'];
  $P0p3=$resP0['sM7']+$resP0['sM8']+$resP0['sM9']; $P0p4=$resP0['sM10']+$resP0['sM11']+$resP0['sM12'];
  $Pp1=$resP1['sM1']+$resP1['sM2']+$resP1['sM3']; $Pp2=$resP1['sM4']+$resP1['sM5']+$resP1['sM6'];
  $Pp3=$resP1['sM7']+$resP1['sM8']+$resP1['sM9']; $Pp4=$resP1['sM10']+$resP1['sM11']+$resP1['sM12']; 
 } 

 $sqlP2=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_terr where TerrRepEmpID=".$EmployeeId." AND ProductId=".$res['ProductId']." AND YearId=".$_REQUEST['y'], $con);
 $rowP2=mysql_num_rows($sqlP2); $resP2=mysql_fetch_assoc($sqlP2); 
 $sqlP3=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_terr where TerrRepEmpID=".$EmployeeId." AND ProductId=".$res['ProductId']." AND YearId=".$AfterYId, $con); 
 $rowP3=mysql_num_rows($sqlP3); $resP3=mysql_fetch_assoc($sqlP3);

 $sqlP2a=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_hq where HqRepEmpID=".$EmployeeId." AND ProductId=".$res['ProductId']." AND YearId=".$_REQUEST['y'], $con); 
 $rowP2a=mysql_num_rows($sqlP2a); $resP2a=mysql_fetch_assoc($sqlP2a);
 $sqlP3a=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_hq where HqRepEmpID=".$EmployeeId." AND ProductId=".$res['ProductId']." AND YearId=".$AfterYId, $con); 
 $rowP3a=mysql_num_rows($sqlP3a); $resP3a=mysql_fetch_assoc($sqlP3a); 

 $sqlP2b=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_area where AreaRepEmpID=".$EmployeeId." AND ProductId=".$res['ProductId']." AND YearId=".$_REQUEST['y'], $con); 
 $rowP2b=mysql_num_rows($sqlP2b); $resP2b=mysql_fetch_assoc($sqlP2b);
 $sqlP3b=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_area where AreaRepEmpID=".$EmployeeId." AND ProductId=".$res['ProductId']." AND YearId=".$AfterYId, $con); 
 $rowP3b=mysql_num_rows($sqlP3b); $resP3b=mysql_fetch_assoc($sqlP3b);
 
 $sqlP2c=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_region where RegionRepEmpID=".$EmployeeId." AND ProductId=".$res['ProductId']." AND YearId=".$_REQUEST['y'], $con); 
 $sqlP3c=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_region where RegionRepEmpID=".$EmployeeId." AND ProductId=".$res['ProductId']." AND YearId=".$AfterYId, $con); 
 $resP2c=mysql_fetch_assoc($sqlP2c); $resP3c=mysql_fetch_assoc($sqlP3c);
 
 $sqlP2d=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_zone where ZoneRepEmpID=".$EmployeeId." AND ProductId=".$res['ProductId']." AND YearId=".$_REQUEST['y'], $con); 
 $sqlP3d=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_zone where ZoneRepEmpID=".$EmployeeId." AND ProductId=".$res['ProductId']." AND YearId=".$AfterYId, $con); 
 $resP2d=mysql_fetch_assoc($sqlP2d); $resP3d=mysql_fetch_assoc($sqlP3d);
 
 $sqlP2e=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_gm where GmRepEmpID=".$EmployeeId." AND ProductId=".$res['ProductId']." AND YearId=".$_REQUEST['y'], $con); $sqlP3e=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_gm where GmRepEmpID=".$EmployeeId." AND ProductId=".$res['ProductId']." AND YearId=".$AfterYId, $con); 
 $resP2e=mysql_fetch_assoc($sqlP2e); $resP3e=mysql_fetch_assoc($sqlP3e);

 $TotP2a=$resP2['Qa']+$resP2a['Qa']+$resP2b['Qa']+$resP2c['Qa']+$resP2d['Qa']+$resP2e['Qa']; 
 $TotP2b=$resP2['Qb']+$resP2a['Qb']+$resP2b['Qb']+$resP2c['Qb']+$resP2d['Qb']+$resP2e['Qb']; 
 $TotP2c=$resP2['Qc']+$resP2a['Qc']+$resP2b['Qc']+$resP2c['Qc']+$resP2d['Qc']+$resP2e['Qc']; 
 $TotP2d=$resP2['Qd']+$resP2a['Qd']+$resP2b['Qd']+$resP2c['Qd']+$resP2d['Qd']+$resP2e['Qd'];
 $TotP3a=$resP3['Qa']+$resP3a['Qa']+$resP3b['Qa']+$resP3c['Qa']+$resP3d['Qa']+$resP3e['Qa']; 
 $TotP3b=$resP3['Qb']+$resP3a['Qb']+$resP3b['Qb']+$resP3c['Qb']+$resP3d['Qb']+$resP3e['Qb']; 
 $TotP3c=$resP3['Qc']+$resP3a['Qc']+$resP3b['Qc']+$resP3c['Qc']+$resP3d['Qc']+$resP3e['Qc']; 
 $TotP3d=$resP3['Qd']+$resP3a['Qd']+$resP3b['Qd']+$resP3c['Qd']+$resP3d['Qd']+$resP3e['Qd'];
 
 $TotP2ch=0; $rowChkP=0;
 /*
 if($rowP0a==0 && $rowP1a==0 && $rowP0==0 && $rowP1==0 && $rowP2==0 && $rowP3==0 && $rowP2a==0 && $rowP3a==0 && $rowP2b==0 && $rowP3b==0)
 {
 $sChk=mysql_query("select * from hrm_sales_arrange_prod sap INNER JOIN hrm_headquater hq ON sap.StateId=hq.StateId INNER JOIN hrm_sales_hq_temp hqt ON hq.HqId=hqt.HqId INNER JOIN hrm_employee_general g ON hqt.EmployeeID=g.EmployeeID INNER JOIN hrm_sales_reporting_level rl ON hqt.EmployeeID=rl.EmployeeID where ProductId=".$res['ProductId']." AND ArrgStatus='Y' AND HqTEmpStatus='A' AND (hqt.EmployeeID=".$EmployeeId." OR rl.R1=".$EmployeeId." OR rl.R2=".$EmployeeId." OR rl.R3=".$EmployeeId." OR rl.R4=".$EmployeeId." OR rl.R5=".$EmployeeId.")", $con); $rowChkP=mysql_fetch_assoc($sChk);
 }
*/
 //if($rowChkP>0 OR $P0p1!=0 OR $P0p2!=0 OR $P0p3!=0 OR $P0p4!=0 OR $Pp1!=0 OR $Pp2!=0 OR $Pp3!=0 OR $Pp4!=0 OR $TotP2a!=0 OR $TotP2b!=0 OR $TotP2c!=0 OR $TotP2d!=0 OR $TotP3a!=0 OR $TotP3b!=0 OR $TotP3c!=0 OR $TotP3d!=0){ ?>	
 <tr bgcolor="#EEEEEE" style="height:22px;">
 <?php if($_REQUEST['ii']=='All_1' OR $_REQUEST['ii']=='All_2' OR $_REQUEST['ac']==1){ ?>	  
  <td bgcolor="#FFFFFF"><input class="Inputt" style="width:100px;" value="<?php echo $res['ItemName']; ?>"/></td>
 <?php } ?>		 
  <td bgcolor="#FFFFFF"><input class="Inputt" style="width:120px;" value="<?php echo $res['ProductName']; ?>" /><input type="hidden" id="P_<?php echo $Sn; ?>" value="<?php echo $res['ProductId']; ?>" /></td>
  <td bgcolor="#FFFFFF" align="center" style="font-size:12px;"><?php echo substr_replace($res['TypeName'], '', 2); ?></td>	
  <td><input class="Input" id="M1_D<?php echo $Sn;?>" value="<?php if($P0p1!='' && $P0p1!=0){echo $P0p1;}?>" readonly/></td>	
  <td><input class="Input" id="M1_A<?php echo $Sn;?>" value="<?php if($Pp1!='' && $Pp1!=0){echo $Pp1;} ?>" readonly/></td>
  <td><input class="Input" id="M1_B<?php echo $Sn;?>" value="<?php if($TotP2a!='' && $TotP2a!=0){echo $TotP2a;} ?>" style="background-color:#D3FED7;" readonly/></td>
  <td><input class="Input" id="M1_C<?php echo $Sn;?>" value="<?php if($TotP3a!='' && $TotP3a!=0){echo $TotP3a;} ?>" style="background-color:#D3FED7;" readonly/></td>

  <td><input class="Input" id="M2_D<?php echo $Sn;?>" value="<?php if($P0p2!='' && $P0p2!=0){echo $P0p2;}?>" readonly/></td>
  <td><input class="Input" id="M2_A<?php echo $Sn;?>" value="<?php if($Pp2!='' && $Pp2!=0){echo $Pp2;} ?>" readonly/></td>
  <td><input class="Input" id="M2_B<?php echo $Sn;?>" value="<?php if($TotP2b!='' && $TotP2b!=0){echo $TotP2b;} ?>" style="background-color:#D3FED7;" readonly/></td>
  <td><input class="Input" id="M2_C<?php echo $Sn;?>" value="<?php if($TotP3b!='' && $TotP3b!=0){echo $TotP3b;} ?>" style="background-color:#D3FED7;" readonly/></td>

  <td><input class="Input" id="M3_D<?php echo $Sn;?>" value="<?php if($P0p3!='' && $P0p3!=0){echo $P0p3;}?>" readonly/></td>
  <td><input class="Input" id="M3_A<?php echo $Sn;?>" value="<?php if($Pp3!='' && $Pp3!=0){echo $Pp3;} ?>" readonly/></td>
  <td><input class="Input" id="M3_B<?php echo $Sn;?>" value="<?php if($TotP2c!='' && $TotP2c!=0){echo $TotP2c;} ?>" style="background-color:#D3FED7;" readonly/></td>
  <td><input class="Input" id="M3_C<?php echo $Sn;?>" value="<?php if($TotP3c!='' && $TotP3c!=0){echo $TotP3c;} ?>" style="background-color:#D3FED7;" readonly/></td>

  <td><input class="Input" id="M4_D<?php echo $Sn;?>" value="<?php if($P0p4!='' && $P0p4!=0){echo $P0p4;}?>" readonly/></td>
  <td><input class="Input" id="M4_A<?php echo $Sn;?>" value="<?php if($Pp4!='' && $Pp4!=0){echo $Pp4;} ?>" readonly/></td>
  <td><input class="Input" id="M4_B<?php echo $Sn;?>" value="<?php if($TotP2d!='' && $TotP2d!=0){echo $TotP2d;} ?>" style="background-color:#D3FED7;" readonly/></td>
  <td><input class="Input" id="M4_C<?php echo $Sn;?>" value="<?php if($TotP3d!='' && $TotP3d!=0){echo $TotP3d;} ?>" style="background-color:#D3FED7;" readonly/></td>

  <?php $TotP0=$P0p1+$P0p2+$P0p3+$P0p4; $TotP1=$Pp1+$Pp2+$Pp3+$Pp4; 
        $TotP2=$TotP2a+$TotP2b+$TotP2c+$TotP2d; $TotP3=$TotP3a+$TotP3b+$TotP3c+$TotP3d; ?>	
  <td><input class="InputB" id="TotP0_<?php echo $Sn;?>" value="<?php if($TotP0!=0 AND $TotP0!=''){echo $TotP0;}else{echo '';} ?>" readonly/></td>
  <td><input class="InputB" id="TotP1_<?php echo $Sn;?>" value="<?php if($TotP1!=0 AND $TotP1!=''){echo $TotP1;}else{echo '';} ?>" readonly/></td>
  <td><input class="InputB" id="TotP2_<?php echo $Sn;?>" value="<?php if($TotP2!=0 AND $TotP2!=''){echo $TotP2;}else{echo '';} ?>" readonly/></td>
  <td><input class="InputB" id="TotP3_<?php echo $Sn;?>" value="<?php if($TotP3!=0 AND $TotP3!=''){echo $TotP3;}else{echo '';} ?>" readonly/></td>

<?php /*?><?php if($resSpEG['GradeValue']=='L1' OR $resSpEG['GradeValue']=='L2'){ $SsqlP2=mysql_query("select Q1,Q2,Q3,Q4 from hrm_sales_sal_details_zone where ZoneEmpID=".$EmployeeId." AND ProductId=".$res['ProductId']." AND YearId=".$_REQUEST['y'], $con); $SsqlP3=mysql_query("select Q1,Q2,Q3,Q4 from hrm_sales_sal_details_zone where ZoneEmpID=".$EmployeeId." AND ProductId=".$res['ProductId']." AND YearId=".$AfterYId, $con); } 
elseif($resSpEG['GradeValue']=='L3' OR $resSpEG['GradeValue']=='L4'){ $SsqlP2=mysql_query("select Q1,Q2,Q3,Q4 from hrm_sales_sal_details_gm where GmEmpID=".$EmployeeId." AND ProductId=".$res['ProductId']." AND YearId=".$_REQUEST['y'], $con); $SsqlP3=mysql_query("select Q1,Q2,Q3,Q4 from hrm_sales_sal_details_gm where GmEmpID=".$EmployeeId." AND ProductId=".$res['ProductId']." AND YearId=".$AfterYId, $con); }

 $SresP2=mysql_fetch_assoc($SsqlP2); $SresP3=mysql_fetch_assoc($SsqlP3); 
 $SToptP2=$SresP2['Q1']+$SresP2['Q2']+$SresP2['Q3']+$SresP2['Q4']; 
 $SToptP3=$SresP3['Q1']+$SresP3['Q2']+$SresP3['Q3']+$SresP3['Q4']; ?>

 <td class="Revised" style="background-color:#D7FFAE;"><?php if($SToptP2!=0 AND $SToptP2!=''){echo $SToptP2;}else{echo '';} ?><input type="hidden" id="STotP2_<?php echo $Sn; ?>" value="<?php if($SToptP2!=0 AND $SToptP2!=''){echo $SToptP2;}else{echo '';} ?>" /></td>
 <td class="Revised" style="background-color:#D7FFAE;"><?php if($SToptP3!=0 AND $SToptP3!=''){echo $SToptP3;}else{echo '';} ?><input type="hidden" id="STotP3_<?php echo $Sn; ?>" value="<?php if($SToptP3!=0 AND $SToptP3!=''){echo $SToptP3;}else{echo '';} ?>" /></td><?php */?>	 
	</tr>		
<?php //} 
$Sn++; } //if($rowChkP>0 OR $P0p1!=0 OR $P0p2!=0 OR $P0p3!=0 OR $P0p4!=0 OR $Pp1!=0 OR $Pp2!=0 OR $Pp3!=0 OR $Pp4!=0 OR $TotP2a!=0 OR $TotP2b!=0 OR $TotP2c!=0 OR $TotP2d!=0 OR $TotP3a!=0 OR $TotP3b!=0 OR $TotP3c!=0 OR $TotP3d!=0)
$ActSn=$Sn-1; echo '<input type="hidden" id="ActualSn" value="'.$ActSn.'" />'; ?>    

<?php if($_REQUEST['ii']!='All_1' AND $_REQUEST['ii']!='All_2' AND $_REQUEST['ac']!=1){ 

 /*** TeamLease Employee Open ***/
 /*** TeamLease Employee Open ***/
 if($rtl>0)
 {
 $sqlP0ta=mysql_query("select SUM(M1) as tsM1,SUM(M2) as tsM2,SUM(M3) as tsM3,SUM(M4) as tsM4,SUM(M5) as tsM5,SUM(M6) as tsM6,SUM(M7) as tsM7,SUM(M8) as tsM8,SUM(M9) as tsM9,SUM(M10) as tsM10,SUM(M11) as tsM11,SUM(M12) as tsM12 from hrm_sales_sal_details_".$_REQUEST['y']." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_sales_tlemp tl ON d.HqId=tl.TLHq where sp.ProductSts='A' AND TLStatus='A' AND tl.TLRepId=".$EmployeeId." AND d.DealerSts='A' AND sp.ItemId=".$_REQUEST['ii']." AND sd.YearId=".$_REQUEST['y'], $con); 
 $resP0ta=mysql_fetch_assoc($sqlP0ta); 
 $sqlP1ta=mysql_query("select SUM(M1_Proj) as tsM1,SUM(M2_Proj) as tsM2,SUM(M3_Proj) as tsM3,SUM(M4_Proj) as tsM4,SUM(M5_Proj) as tsM5,SUM(M6_Proj) as tsM6,SUM(M7_Proj) as tsM7,SUM(M8_Proj) as tsM8,SUM(M9_Proj) as tsM9,SUM(M10_Proj) as tsM10,SUM(M11_Proj) as tsM11,SUM(M12_Proj) as tsM12 from hrm_sales_sal_details_".$AfterYId." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_sales_tlemp tl ON d.HqId=tl.TLHq where sp.ProductSts='A' AND TLStatus='A' AND tl.TLRepId=".$EmployeeId." AND d.DealerSts='A' AND sp.ItemId=".$_REQUEST['ii']." AND sd.YearId=".$AfterYId, $con); $resP1ta=mysql_fetch_assoc($sqlP1ta);
 }
 /*** TeamLease Employee CLose ***/
 /*** TeamLease Employee CLose ***/ 
 
 if($_REQUEST['vc']>0){ $joinD="d.Terr_vc=rl.EmployeeID"; $suvD="Terr_vc=".$EmployeeId; }
 elseif($_REQUEST['fc']>0){ $joinD="d.Terr_fc=rl.EmployeeID"; $suvD="Terr_fc=".$EmployeeId; }

 $sqlP0t=mysql_query("select SUM(M1) as tsM1,SUM(M2) as tsM2,SUM(M3) as tsM3,SUM(M4) as tsM4,SUM(M5) as tsM5,SUM(M6) as tsM6,SUM(M7) as tsM7,SUM(M8) as tsM8,SUM(M9) as tsM9,SUM(M10) as tsM10,SUM(M11) as tsM11,SUM(M12) as tsM12 from hrm_sales_sal_details_".$_REQUEST['y']." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_sales_reporting_level rl ON ".$joinD." where sp.ProductSts='A' AND d.DealerSts='A' AND (".$suvD." OR rl.R1=".$EmployeeId." OR rl.R2=".$EmployeeId." OR rl.R3=".$EmployeeId." OR rl.R4=".$EmployeeId." OR rl.R5=".$EmployeeId.") AND sp.ItemId=".$_REQUEST['ii']." AND sd.YearId=".$_REQUEST['y'], $con); $resP0t=mysql_fetch_assoc($sqlP0t);
 $sqlP1t=mysql_query("select SUM(M1_Proj) as tsM1,SUM(M2_Proj) as tsM2,SUM(M3_Proj) as tsM3,SUM(M4_Proj) as tsM4,SUM(M5_Proj) as tsM5,SUM(M6_Proj) as tsM6,SUM(M7_Proj) as tsM7,SUM(M8_Proj) as tsM8,SUM(M9_Proj) as tsM9,SUM(M10_Proj) as tsM10,SUM(M11_Proj) as tsM11,SUM(M12_Proj) as tsM12 from hrm_sales_sal_details_".$AfterYId." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_sales_reporting_level rl ON ".$joinD." where sp.ProductSts='A' AND d.DealerSts='A' AND (".$suvD." OR rl.R1=".$EmployeeId." OR rl.R2=".$EmployeeId." OR rl.R3=".$EmployeeId." OR rl.R4=".$EmployeeId." OR rl.R5=".$EmployeeId.") AND sp.ItemId=".$_REQUEST['ii']." AND sd.YearId=".$AfterYId, $con); $resP1t=mysql_fetch_assoc($sqlP1t);
 
 if($rtl>0)
 {
  $TotP0p1=$resP0t['tsM1']+$resP0t['tsM2']+$resP0t['tsM3']+$resP0ta['tsM1']+$resP0ta['tsM2']+$resP0ta['tsM3']; 
  $TotP0p2=$resP0t['tsM4']+$resP0t['tsM5']+$resP0t['tsM6']+$resP0ta['tsM4']+$resP0ta['tsM5']+$resP0ta['tsM6'];
  $TotP0p3=$resP0t['tsM7']+$resP0t['tsM8']+$resP0t['tsM9']+$resP0ta['tsM7']+$resP0ta['tsM8']+$resP0ta['tsM9']; 
  $TotP0p4=$resP0t['tsM10']+$resP0t['tsM11']+$resP0t['tsM12']+$resP0ta['tsM10']+$resP0ta['tsM11']+$resP0ta['tsM12'];
  $TotPp1=$resP1t['tsM1']+$resP1t['tsM2']+$resP1t['tsM3']+$resP1ta['tsM1']+$resP1ta['tsM2']+$resP1ta['tsM3']; 
  $TotPp2=$resP1t['tsM4']+$resP1t['tsM5']+$resP1t['tsM6']+$resP1ta['tsM4']+$resP1ta['tsM5']+$resP1ta['tsM6'];
  $TotPp3=$resP1t['tsM7']+$resP1t['tsM8']+$resP1t['tsM9']+$resP1ta['tsM7']+$resP1ta['tsM8']+$resP1ta['tsM9']; 
  $TotPp4=$resP1t['tsM10']+$resP1t['tsM11']+$resP1t['tsM12']+$resP1ta['tsM10']+$resP1ta['tsM11']+$resP1ta['tsM12'];
 }
 else
 {
 $TotP0p1=$resP0t['tsM1']+$resP0t['tsM2']+$resP0t['tsM3']; $TotP0p2=$resP0t['tsM4']+$resP0t['tsM5']+$resP0t['tsM6'];
 $TotP0p3=$resP0t['tsM7']+$resP0t['tsM8']+$resP0t['tsM9']; $TotP0p4=$resP0t['tsM10']+$resP0t['tsM11']+$resP0t['tsM12'];
 $TotPp1=$resP1t['tsM1']+$resP1t['tsM2']+$resP1t['tsM3']; $TotPp2=$resP1t['tsM4']+$resP1t['tsM5']+$resP1t['tsM6'];
 $TotPp3=$resP1t['tsM7']+$resP1t['tsM8']+$resP1t['tsM9']; $TotPp4=$resP1t['tsM10']+$resP1t['tsM11']+$resP1t['tsM12'];
 }

 $sqlP2t=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_terr sdt INNER JOIN hrm_sales_seedsproduct sp ON sdt.ProductId=sp.ProductId where sp.ProductSts='A' AND sdt.TerrRepEmpID=".$EmployeeId." AND sp.ItemId=".$_REQUEST['ii']." AND sdt.YearId=".$_REQUEST['y'], $con); $resP2t=mysql_fetch_assoc($sqlP2t); 
 $sqlP3t=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_terr sdt INNER JOIN hrm_sales_seedsproduct sp ON sdt.ProductId=sp.ProductId where sp.ProductSts='A' AND sdt.TerrRepEmpID=".$EmployeeId." AND sp.ItemId=".$_REQUEST['ii']." AND sdt.YearId=".$AfterYId, $con); $resP3t=mysql_fetch_assoc($sqlP3t);
 $sqlP2ta=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_hq sdh INNER JOIN hrm_sales_seedsproduct sp ON sdh.ProductId=sp.ProductId where sp.ProductSts='A' AND sdh.HqRepEmpID=".$EmployeeId." AND sp.ItemId=".$_REQUEST['ii']." AND sdh.YearId=".$_REQUEST['y'], $con); $resP2ta=mysql_fetch_assoc($sqlP2ta);
 $sqlP3ta=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_hq sdh INNER JOIN hrm_sales_seedsproduct sp ON sdh.ProductId=sp.ProductId where sp.ProductSts='A' AND sdh.HqRepEmpID=".$EmployeeId." AND sp.ItemId=".$_REQUEST['ii']." AND sdh.YearId=".$AfterYId, $con); $resP3ta=mysql_fetch_assoc($sqlP3ta);
 $sqlP2tb=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_area sda INNER JOIN hrm_sales_seedsproduct sp ON sda.ProductId=sp.ProductId where sp.ProductSts='A' AND sda.AreaRepEmpID=".$EmployeeId." AND sp.ItemId=".$_REQUEST['ii']." AND sda.YearId=".$_REQUEST['y'], $con); $resP2tb=mysql_fetch_assoc($sqlP2tb);
 $sqlP3tb=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_area sda INNER JOIN hrm_sales_seedsproduct sp ON sda.ProductId=sp.ProductId where sp.ProductSts='A' AND sda.AreaRepEmpID=".$EmployeeId." AND sp.ItemId=".$_REQUEST['ii']." AND sda.YearId=".$AfterYId, $con); $resP3tb=mysql_fetch_assoc($sqlP3tb);
 
 $sqlP2tc=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_region rg INNER JOIN hrm_sales_seedsproduct sp ON rg.ProductId=sp.ProductId where sp.ProductSts='A' AND rg.RegionRepEmpID=".$EmployeeId." AND sp.ItemId=".$_REQUEST['ii']." AND rg.YearId=".$_REQUEST['y'], $con); $resP2tc=mysql_fetch_assoc($sqlP2tc); 
 $sqlP3tc=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_region rg INNER JOIN hrm_sales_seedsproduct sp ON rg.ProductId=sp.ProductId where sp.ProductSts='A' AND rg.RegionRepEmpID=".$EmployeeId." AND sp.ItemId=".$_REQUEST['ii']." AND rg.YearId=".$AfterYId, $con); $resP3tc=mysql_fetch_assoc($sqlP3tc);
 $sqlP2td=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_zone zn INNER JOIN hrm_sales_seedsproduct sp ON zn.ProductId=sp.ProductId where sp.ProductSts='A' AND zn.ZoneRepEmpID=".$EmployeeId." AND sp.ItemId=".$_REQUEST['ii']." AND zn.YearId=".$_REQUEST['y'], $con); $resP2td=mysql_fetch_assoc($sqlP2td); 
 $sqlP3td=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_zone zn INNER JOIN hrm_sales_seedsproduct sp ON zn.ProductId=sp.ProductId where sp.ProductSts='A' AND zn.ZoneRepEmpID=".$EmployeeId." AND sp.ItemId=".$_REQUEST['ii']." AND zn.YearId=".$AfterYId, $con); $resP3td=mysql_fetch_assoc($sqlP3td);
 $sqlP2te=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_gm gm INNER JOIN hrm_sales_seedsproduct sp ON gm.ProductId=sp.ProductId where sp.ProductSts='A' AND gm.GmRepEmpID=".$EmployeeId." AND sp.ItemId=".$_REQUEST['ii']." AND gm.YearId=".$_REQUEST['y'], $con); $resP2te=mysql_fetch_assoc($sqlP2te); 
 $sqlP3te=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_gm gm INNER JOIN hrm_sales_seedsproduct sp ON gm.ProductId=sp.ProductId where sp.ProductSts='A' AND gm.GmRepEmpID=".$EmployeeId." AND sp.ItemId=".$_REQUEST['ii']." AND gm.YearId=".$AfterYId, $con); $resP3te=mysql_fetch_assoc($sqlP3te); 
  

 $TotP2ta=$resP2t['Qa']+$resP2ta['Qa']+$resP2tb['Qa']+$resP2tc['Qa']+$resP2td['Qa']+$resP2te['Qa']; 
 $TotP2tb=$resP2t['Qb']+$resP2ta['Qb']+$resP2tb['Qb']+$resP2tc['Qb']+$resP2td['Qb']+$resP2te['Qb']; 
 $TotP2tc=$resP2t['Qc']+$resP2ta['Qc']+$resP2tb['Qc']+$resP2tc['Qc']+$resP2td['Qc']+$resP2te['Qc']; 
 $TotP2td=$resP2t['Qd']+$resP2ta['Qd']+$resP2tb['Qd']+$resP2tc['Qd']+$resP2td['Qd']+$resP2te['Qd'];
 $TotP3ta=$resP3t['Qa']+$resP3ta['Qa']+$resP3tb['Qa']+$resP3tc['Qa']+$resP3td['Qa']+$resP3te['Qa']; 
 $TotP3tb=$resP3t['Qb']+$resP3ta['Qb']+$resP3tb['Qb']+$resP3tc['Qb']+$resP3td['Qb']+$resP3te['Qb']; 
 $TotP3tc=$resP3t['Qc']+$resP3ta['Qc']+$resP3tb['Qc']+$resP3tc['Qc']+$resP3td['Qc']+$resP3te['Qc']; 
 $TotP3td=$resP3t['Qd']+$resP3ta['Qd']+$resP3tb['Qd']+$resP3tc['Qd']+$resP3td['Qd']+$resP3te['Qd'];

 $TotP2cht=0;
?>
 <tr style="font-size:14px;color:#000000;background-color:#FFFFA6;height:24px;">
  <td colspan="2" align="right" style="font-size:16px;"><b>TOTAL:&nbsp;</b></td>
  <td><input class="TInput" id="TotP1_TD" value="<?php if($TotP0p1!=0){echo $TotP0p1;} ?>" readonly/></td>
  <td><input class="TInput" id="TotP1_TA" value="<?php if($TotPp1!=0){echo $TotPp1;} ?>" readonly/></td>		
  <td><input class="TInput" id="TotP1_TB" value="<?php if($TotP2ta!=0){echo $TotP2ta;} ?>" readonly/></td>
  <td><input class="TInput" id="TotP1_TC" value="<?php if($TotP3ta!=0){echo $TotP3ta;} ?>" readonly/></td>
	 
  <td><input class="TInput" id="TotP2_TD" value="<?php if($TotP0p2!=0){echo $TotP0p2;} ?>" readonly/></td>
  <td><input class="TInput" id="TotP2_TA" value="<?php if($TotPp2!=0){echo $TotPp2;} ?>" readonly/></td>
  <td><input class="TInput" id="TotP2_TB" value="<?php if($TotP2tb!=0){echo $TotP2tb;} ?>" readonly/></td>
  <td><input class="TInput" id="TotP2_TC" value="<?php if($TotP3tb!=0){echo $TotP3tb;} ?>" readonly/></td>
  	 
  <td><input class="TInput" id="TotP3_TD" value="<?php if($TotP0p3!=0){echo $TotP0p3;} ?>" readonly/></td>
  <td><input class="TInput" id="TotP3_TA" value="<?php if($TotPp3!=0){echo $TotPp3;} ?>" readonly/></td>	
  <td><input class="TInput" id="TotP3_TB" value="<?php if($TotP2tc!=0){echo $TotP2tc;} ?>" readonly/></td>
  <td><input class="TInput" id="TotP3_TC" value="<?php if($TotP3tc!=0){echo $TotP3tc;} ?>" readonly/></td> 
	 	
  <td><input class="TInput" id="TotP4_TD" value="<?php if($TotP0p4!=0){echo $TotP0p4;} ?>" readonly/></td> 
  <td><input class="TInput" id="TotP4_TA" value="<?php if($TotPp4!=0){echo $TotPp4;} ?>" readonly/></td>		
  <td><input class="TInput" id="TotP4_TB" value="<?php if($TotP2td!=0){echo $TotP2td;} ?>" readonly/></td>
  <td><input class="TInput" id="TotP4_TC" value="<?php if($TotP3td!=0){echo $TotP3td;} ?>" readonly/></td> 
	 
<?php $TotP0t=$TotP0p1+$TotP0p2+$TotP0p3+$TotP0p4; $TotP1t=$TotPp1+$TotPp2+$TotPp3+$TotPp4; 
      $TotP2t=$TotP2ta+$TotP2tb+$TotP2tc+$TotP2td; $TotP3t=$TotP3ta+$TotP3tb+$TotP3tc+$TotP3td; ?>
  <td><input class="TInput" id="TotM_DeT" value="<?php if($TotP0t!=0){echo $TotP0t;}else{echo '';} ?>" readonly/></td>
  <td><input class="TInput" id="TotM_AeT" value="<?php if($TotP1t!=0){echo $TotP1t;}else{echo '';} ?>" readonly/></td>
  <td><input class="TInput" id="TotM_BeT" value="<?php if($TotP2t!=0){echo $TotP2t;}else{echo '';} ?>" readonly/></td>
  <td><input class="TInput" id="TotM_CeT" value="<?php if($TotP3t!=0){echo $TotP3t;}else{echo '';} ?>" readonly/></td>	  
	  
<?php /*?><?php if($resSpEG['GradeValue']=='L1' OR $resSpEG['GradeValue']=='L2'){ $TSsqlP2=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_zone zn INNER JOIN hrm_sales_seedsproduct sp ON zn.ProductId=sp.ProductId where sp.ProductSts='A' AND zn.ZoneEmpID=".$EmployeeId." AND sp.ItemId=".$_REQUEST['ii']." AND zn.YearId=".$_REQUEST['y'], $con); $TSsqlP3=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_zone zn INNER JOIN hrm_sales_seedsproduct sp ON zn.ProductId=sp.ProductId where sp.ProductSts='A' AND zn.ZoneEmpID=".$EmployeeId." AND sp.ItemId=".$_REQUEST['ii']." AND zn.YearId=".$AfterYId, $con); } 
 elseif($resSpEG['GradeValue']=='L3' OR $resSpEG['GradeValue']=='l4'){ $TSsqlP2=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_gm gm INNER JOIN hrm_sales_seedsproduct sp ON gm.ProductId=sp.ProductId where sp.ProductSts='A' AND gm.GmEmpID=".$EmployeeId." AND sp.ItemId=".$_REQUEST['ii']." AND gm.YearId=".$_REQUEST['y'], $con); $TSsqlP3=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_gm gm INNER JOIN hrm_sales_seedsproduct sp ON gm.ProductId=sp.ProductId where sp.ProductSts='A' AND gm.GmEmpID=".$EmployeeId." AND sp.ItemId=".$_REQUEST['ii']." AND gm.YearId=".$AfterYId, $con); }
 $TSresP2=mysql_fetch_assoc($TSsqlP2); $TSresP3=mysql_fetch_assoc($TSsqlP3);  
 $TSTotP2=$TSresP2['Qa']+$TSresP2['Qb']+$TSresP2['Qc']+$TSresP2['Qd']; 
 $TSTotP3=$TSresP3['Qa']+$TSresP3['Qb']+$TSresP3['Qc']+$TSresP3['Qd']; ?>
  <td class="Revised"><?php if($TSTotP2!=0 AND $TSTotP2!=''){echo $TSTotP2;}else{echo '';} ?></td>
  <td class="Revised"><?php if($TSTotP3!=0 AND $TSTotP3!=''){echo $TSTotP3;}else{echo '';} ?></td>	<?php */?>	  
 </tr>	
<?php } ?>  
 
</table>
</div>
</div>     
 </td>
</tr>
<?php } //if($_REQUEST['ernS']=='EewTottv') ?>
<!-- Overall Total Overall Total Overall Total Overall Total Overall Total Close -->
<!-- Overall Total Overall Total Overall Total Overall Total Overall Total Close -->


<?php
if($_REQUEST['vc']>0)
{ 
 $slqry='Hq_vc as HqId'; $joinD="g.EmployeeID=d.Terr_vc"; $joinD2="d.Hq_vc=hq.HqId"; $joinD3="d.Terr_vc=e.EmployeeID";  
 $suvD="Terr_vc=".$EmployeeId; 
}
elseif($_REQUEST['fc']>0)
{ 
 $slqry='Hq_fc as HqId'; $joinD="g.EmployeeID=d.Terr_fc"; $joinD2="d.Hq_fc=hq.HqId"; $joinD3="d.Terr_fc=e.EmployeeID";
 $suvD="Terr_fc=".$EmployeeId; 
}
?>


<?php if($_REQUEST['ac']!=1 && $_REQUEST['ii']!=0 && $_REQUEST['ernS']!='EewTottv'){ ?>
<tr>
<td style="width:100%;">
 <table border="0" cellpadding="0" cellspacing="4" cellpadding="0" style="width:100%;">
 
<?php $sqlRepHq = mysql_query("select e.EmployeeID,Fname,Sname,Lname,Gender,DR,Married,GradeId,".$slqry.",HqName from hrm_employee_general g INNER JOIN hrm_sales_dealer d ON ".$joinD." INNER JOIN hrm_headquater hq ON ".$joinD2." INNER JOIN hrm_employee_personal p ON g.EmployeeID=p.EmployeeID INNER JOIN hrm_employee e ON ".$joinD3." where (".$suvD." OR g.RepEmployeeID=".$EmployeeId.") AND e.EmpStatus='A' AND g.DepartmentId=6 AND d.DealerSts='A' group by e.EmployeeID order by g.EmployeeID ASC", $con); $resRepHqRow=mysql_num_rows($sqlRepHq);  
$DealRow=$resRepHqRow+1; echo '<input type="hidden" id="DealRows" value="'.$DealRow.'" />'; $counter=1; 
while($resRepHq=mysql_fetch_array($sqlRepHq))
{	/*********** Open Hq-Dealer **********//*********** Open Hq-Dealer **********/
    /*********** Open Hq-Dealer **********//*********** Open Hq-Dealer **********/  
if($resRepHq['DR']=='Y'){$M='Dr.';} elseif($resRepHq['Gender']=='M'){$M='Mr.';} elseif($resRepHq['Gender']=='F' AND $resRepHq['Married']=='Y'){$M='Mrs.';} elseif($resRepHq['Gender']=='F' AND $resRepHq['Married']=='N'){$M='Miss.';} $Ename=$resRepHq['Fname'].' '.$resRepHq['Sname'].' '.$resRepHq['Lname']; $HqEmpId=$resRepHq['EmployeeID']; $HqId=$resRepHq['HqId']; 
$sqlRpt=mysql_query("select g.EmployeeID from hrm_employee_general g INNER JOIN hrm_employee e ON g.EmployeeID=e.EmployeeID where g.DepartmentId=6 AND e.EmpStatus='A' AND g.RepEmployeeID=".$resRepHq['EmployeeID'], $con); $rowRpt=mysql_num_rows($sqlRpt); $sqlEgv=mysql_query("select GradeValue from hrm_grade where CompanyId=".$CompanyId." AND GradeId=".$resRepHq['GradeId'], $con); $resEgv=mysql_fetch_assoc($sqlEgv); ?>

<tr> <?php //style="background-color:#CBD7F3;" ?>
 <td style="width:100%;">
 <table border="0" style="width:100%;"> 
<?php /***************** Open Open Open Open Open Open Open Open Open Open 11 Open Open ************/ ?>
<?php /***************** Open Open Open Open Open Open Open Open Open Open 11 Open Open ************/ ?>
 
<?php if($_REQUEST['vc']>0){ $shqt="Hq_vc"; $sqq="Hq_vc as HqId"; $suuD="Terr_vc=".$HqEmpId; }
 elseif($_REQUEST['fc']>0){ $shqt="Hq_fc"; $sqq="Hq_fc as HqId"; $suuD="Terr_fc=".$HqEmpId; }	

$sHq2=mysql_query("select ".$sqq." from hrm_sales_dealer where ".$suuD." AND DealerSts='A' AND ".$shqt."!=".$HqId." group by ".$shqt." asc", $con); 
$rowHq2=mysql_num_rows($sHq2); echo '<input type="hidden" id="Rowhq2" value="'.$rowHq2.'" />';
if($rowHq2==1){$resHq2=mysql_fetch_assoc($sHq2); echo '<input type="hidden" id="h1q" value="'.$resHq2['HqId'].'" />';}?>   
<tr>
 <td style="width:100%;">
 <table border="1" cellpadding="0" cellspacing="0" style="font-family:Times New Roman;font-size:14px;width:100%;">
 <tr>
  <td colspan="50" style="font-size:16px;color:#FFFF00;background-color:#183E83;">&nbsp;<b><?php echo ucfirst(strtolower($Ename)).'-<font color="#D7EBFF">'.$resRepHq['HqName'].'</font>'; ?></b></td>
  </tr>	
  <tr style="background-color:#D5F1D1;color:#000000;">
   <td colspan="<?php if($_REQUEST['ii']=='All_1' OR $_REQUEST['ii']=='All_2'){echo 4;}else{echo 3;}?>"></td>
   <td colspan="4" align="center"><b>Quarter 1</b></td><td colspan="4" align="center"><b>Quarter 2</b></td>
   <td colspan="4" align="center"><b>Quarter 3</b></td><td colspan="4" align="center"><b>Quarter 4</b></td>
   <td colspan="4" align="center"><b>TOTAL</b></td>
  </tr>	
  <tr style="background-color:#D5F1D1;color:#000000;">
  <?php if($_REQUEST['ii']=='All_1' OR $_REQUEST['ii']=='All_2'){ ?>   
   <td align="center" style="width:100px;" style="font-size:12px;"><b>CROP</b></td>
  <?php } ?>	
   <td align="center" style="width:120px;font-size:12px;"><b>VARIETY</b></td>
   <td align="center" style="width:30px;font-size:12px;"><b>TYPE</b></td>
   <td align="center" style="width:30px;font-size:12px;"><b>Edit</b></td>
  <?php for($i=1; $i<=5; $i++){?>
   <td class="Trh60"><?php echo $y2T.'<br>'.$y2; ?></td>
   <td class="Trh60"><?php echo $y3T.'<br>'.$y3; ?></td>
   <td class="Trh60"><?php echo '<font color="#A60053">Suggest</font><br>'.$y2; ?></td>
   <td class="Trh60"><?php echo '<font color="#A60053">Suggest</font><br>'.$y3; ?></td>
  <?php } ?>
  </tr>
<?php   
if($_REQUEST['ii']!='All_1' AND $_REQUEST['ii']!='All_2')
{ 
 $sql = mysql_query("select sp.ItemId,sp.ProductId,ProductName,ItemName,TypeName from hrm_sales_state_prod p inner join hrm_sales_seedsproduct sp on p.ProductId=sp.ProductId inner join hrm_sales_seedsitem si on sp.ItemId=si.ItemId inner join hrm_sales_seedtype st on sp.TypeId=st.TypeId where sp.ProductSts='A' AND p.StateId in (".$StscId.") AND si.ItemId=".$_REQUEST['ii']." group by sp.ProductId order by ItemName ASC, TypeName ASC, ProductName ASC", $con); 
 //$sql = mysql_query("select sp.ItemId,ProductId,ProductName,ItemName,TypeName from hrm_sales_seedsproduct sp INNER JOIN hrm_sales_seedsitem si ON sp.ItemId=si.ItemId INNER JOIN hrm_sales_seedtype st ON sp.TypeId=st.TypeId where sp.ProductSts='A' AND si.ItemId=".$_REQUEST['ii']." order by ItemName ASC, TypeName ASC, ProductName ASC", $con); 
 }
elseif($_REQUEST['ii']=='All_1')
 { 
 $sql = mysql_query("select sp.ItemId,sp.ProductId,ProductName,ItemName,TypeName from hrm_sales_state_prod p inner join hrm_sales_seedsproduct sp on p.ProductId=sp.ProductId inner join hrm_sales_seedsitem si on sp.ItemId=si.ItemId inner join hrm_sales_seedtype st on sp.TypeId=st.TypeId where sp.ProductSts='A' AND p.StateId in (".$StscId.") AND si.GroupId=1 group by sp.ProductId order by ItemName ASC, TypeName ASC, ProductName ASC", $con); 
 //$sql = mysql_query("select sp.ItemId,ProductId,ProductName,ItemName,TypeName from hrm_sales_seedsproduct sp INNER JOIN hrm_sales_seedsitem si ON sp.ItemId=si.ItemId INNER JOIN hrm_sales_seedtype st ON sp.TypeId=st.TypeId where sp.ProductSts='A' AND si.GroupId=1 order by ItemName ASC, TypeName ASC, ProductName ASC", $con); 
 }
elseif($_REQUEST['ii']=='All_2')
 { 
 $sql = mysql_query("select sp.ItemId,sp.ProductId,ProductName,ItemName,TypeName from hrm_sales_state_prod p inner join hrm_sales_seedsproduct sp on p.ProductId=sp.ProductId inner join hrm_sales_seedsitem si on sp.ItemId=si.ItemId inner join hrm_sales_seedtype st on sp.TypeId=st.TypeId where sp.ProductSts='A' AND p.StateId in (".$StscId.") AND si.GroupId=2 group by sp.ProductId order by ItemName ASC, TypeName ASC, ProductName ASC", $con);
 //$sql = mysql_query("select sp.ItemId,ProductId,ProductName,ItemName,TypeName from hrm_sales_seedsproduct sp INNER JOIN hrm_sales_seedsitem si ON sp.ItemId=si.ItemId INNER JOIN hrm_sales_seedtype st ON sp.TypeId=st.TypeId where sp.ProductSts='A' AND si.GroupId=2 order by ItemName ASC, TypeName ASC, ProductName ASC", $con); 
 } 

/*if($_REQUEST['ii']!='All_1' AND $_REQUEST['ii']!='All_2'){$sql = mysql_query("select sp.ItemId,ProductId,ProductName,ItemName,TypeName from hrm_sales_seedsproduct sp INNER JOIN hrm_sales_seedsitem si ON sp.ItemId=si.ItemId INNER JOIN hrm_sales_seedtype st ON sp.TypeId=st.TypeId where sp.ProductSts='A' AND si.ItemId=".$_REQUEST['ii']." order by ItemName ASC, TypeName ASC, ProductName ASC", $con);}
      elseif($_REQUEST['ii']=='All_1'){$sql = mysql_query("select sp.ItemId,ProductId,ProductName,ItemName,TypeName from hrm_sales_seedsproduct sp INNER JOIN hrm_sales_seedsitem si ON sp.ItemId=si.ItemId INNER JOIN hrm_sales_seedtype st ON sp.TypeId=st.TypeId where sp.ProductSts='A' AND si.GroupId=1 order by ItemName ASC, TypeName ASC, ProductName ASC", $con);}
	  elseif($_REQUEST['ii']=='All_2'){$sql = mysql_query("select sp.ItemId,ProductId,ProductName,ItemName,TypeName from hrm_sales_seedsproduct sp INNER JOIN hrm_sales_seedsitem si ON sp.ItemId=si.ItemId INNER JOIN hrm_sales_seedtype st ON sp.TypeId=st.TypeId where sp.ProductSts='A' AND si.GroupId=2 order by ItemName ASC, TypeName ASC, ProductName ASC", $con);}*/
 
 if($_REQUEST['vc']>0){ $shqt="Hq_vc"; $sqq="Hq_vc as HqId"; $suuD="Terr_vc=".$HqEmpId; $suuT="Terr_vc="; }
 elseif($_REQUEST['fc']>0){ $shqt="Hq_fc"; $sqq="Hq_fc as HqId"; $suuD="Terr_fc=".$HqEmpId; $suuT="Terr_fc="; }
 
 $Sn=1; while($res=mysql_fetch_array($sql)){ 
 
 if($resEgv['GradeValue']=='L3' OR $resEgv['GradeValue']=='L4')
 { 
 
  $sql4ta=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_terr where TerrRepEmpID=".$HqEmpId." AND ProductId=".$res['ProductId']." AND YearId=".$_REQUEST['y'], $con); $sql5ta=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_terr where TerrRepEmpID=".$HqEmpId." AND ProductId=".$res['ProductId']." AND YearId=".$AfterYId, $con); 
  $res4ta=mysql_fetch_assoc($sql4ta); $res5ta=mysql_fetch_assoc($sql5ta);
  $sql4tb=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_hq where HqRepEmpID=".$HqEmpId." AND ProductId=".$res['ProductId']." AND YearId=".$_REQUEST['y'], $con); $sql5tb=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_hq where HqRepEmpID=".$HqEmpId." AND ProductId=".$res['ProductId']." AND YearId=".$AfterYId, $con); 
  $res4tb=mysql_fetch_assoc($sql4tb); $res5tb=mysql_fetch_assoc($sql5tb);
  $sql4tc=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_area where AreaRepEmpID=".$HqEmpId." AND ProductId=".$res['ProductId']." AND YearId=".$_REQUEST['y'], $con); $sql5tc=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_area where AreaRepEmpID=".$HqEmpId." AND ProductId=".$res['ProductId']." AND YearId=".$AfterYId, $con); 
  $res4tc=mysql_fetch_assoc($sql4tc); $res5tc=mysql_fetch_assoc($sql5tc);
$sql4td=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_region where RegionRepEmpID=".$HqEmpId." AND ProductId=".$res['ProductId']." AND YearId=".$_REQUEST['y'], $con); $sql5td=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_region where RegionRepEmpID=".$HqEmpId." AND ProductId=".$res['ProductId']." AND YearId=".$AfterYId, $con); 
  $res4td=mysql_fetch_assoc($sql4td); $res5td=mysql_fetch_assoc($sql5td);
  $sql4te=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_zone where ZoneRepEmpID=".$HqEmpId." AND ProductId=".$res['ProductId']." AND YearId=".$_REQUEST['y'], $con); $sql5te=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_zone where ZoneRepEmpID=".$HqEmpId." AND ProductId=".$res['ProductId']." AND YearId=".$AfterYId, $con); 
  $res4te=mysql_fetch_assoc($sql4te); $res5te=mysql_fetch_assoc($sql5te);
  
  $Ach4Q1=$res4ta['Qa']+$res4tb['Qa']+$res4tc['Qa']+$res4td['Qa']+$res4te['Qa']; 
  $Ach4Q2=$res4ta['Qb']+$res4tb['Qb']+$res4tc['Qb']+$res4td['Qb']+$res4te['Qb']; 
  $Ach4Q3=$res4ta['Qc']+$res4tb['Qc']+$res4tc['Qc']+$res4td['Qc']+$res4te['Qc']; 
  $Ach4Q4=$res4ta['Qd']+$res4tb['Qd']+$res4tc['Qd']+$res4td['Qd']+$res4te['Qd'];
  $Ach5Q1=$res5ta['Qa']+$res5tb['Qa']+$res5tc['Qa']+$res5td['Qa']+$res5te['Qa']; 
  $Ach5Q2=$res5ta['Qb']+$res5tb['Qb']+$res5tc['Qb']+$res5td['Qb']+$res5te['Qb']; 
  $Ach5Q3=$res5ta['Qc']+$res5tb['Qc']+$res5tc['Qc']+$res5td['Qc']+$res5te['Qc']; 
  $Ach5Q4=$res5ta['Qd']+$res5tb['Qd']+$res5tc['Qd']+$res5td['Qd']+$res5te['Qd'];

  $sqlP2d=mysql_query("select * from hrm_sales_sal_details_gm where GmEmpID=".$HqEmpId." AND ProductId=".$res['ProductId']." AND YearId=".$_REQUEST['y'], $con); $sqlP3d=mysql_query("select * from hrm_sales_sal_details_gm where GmEmpID=".$HqEmpId." AND ProductId=".$res['ProductId']." AND YearId=".$AfterYId, $con);
  //$sChk=mysql_query("select * from hrm_sales_arrange_prod sap INNER JOIN hrm_headquater hq ON sap.StateId=hq.StateId INNER JOIN hrm_sales_dealer d ON hq.HqId=d.".$shqt." INNER JOIN hrm_sales_reporting_level rl ON d.".$suuT."=rl.EmployeeID where ProductId=".$res['ProductId']." AND ArrgStatus='Y' AND (d.".$suuT."=".$HqEmpId." OR rl.R1=".$HqEmpId." OR rl.R2=".$HqEmpId." OR rl.R3=".$HqEmpId." OR rl.R4=".$HqEmpId." OR rl.R5=".$HqEmpId.")", $con);

 } 
 elseif($resEgv['GradeValue']=='L1' OR $resEgv['GradeValue']=='L2')  /* 2222  */
 { 

  $sql4ta=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_terr where TerrRepEmpID=".$HqEmpId." AND ProductId=".$res['ProductId']." AND YearId=".$_REQUEST['y'], $con); $sql5ta=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_terr where TerrRepEmpID=".$HqEmpId." AND ProductId=".$res['ProductId']." AND YearId=".$AfterYId, $con); 
  $res4ta=mysql_fetch_assoc($sql4ta); $res5ta=mysql_fetch_assoc($sql5ta);
 
  $sql4tb=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_hq where HqRepEmpID=".$HqEmpId." AND ProductId=".$res['ProductId']." AND YearId=".$_REQUEST['y'], $con); $sql5tb=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_hq where HqRepEmpID=".$HqEmpId." AND ProductId=".$res['ProductId']." AND YearId=".$AfterYId, $con); 
  $res4tb=mysql_fetch_assoc($sql4tb); $res5tb=mysql_fetch_assoc($sql5tb);
 
  $sql4tc=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_area where AreaRepEmpID=".$HqEmpId." AND ProductId=".$res['ProductId']." AND YearId=".$_REQUEST['y'], $con); $sql5tc=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_area where AreaRepEmpID=".$HqEmpId." AND ProductId=".$res['ProductId']." AND YearId=".$AfterYId, $con); 
  $res4tc=mysql_fetch_assoc($sql4tc); $res5tc=mysql_fetch_assoc($sql5tc);
 
  $sql4td=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_region where RegionRepEmpID=".$HqEmpId." AND ProductId=".$res['ProductId']." AND YearId=".$_REQUEST['y'], $con); $sql5td=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_region where RegionRepEmpID=".$HqEmpId." AND ProductId=".$res['ProductId']." AND YearId=".$AfterYId, $con); 
  $res4td=mysql_fetch_assoc($sql4td); $res5td=mysql_fetch_assoc($sql5td);
  $Ach4Q1=$res4ta['Qa']+$res4tb['Qa']+$res4tc['Qa']+$res4td['Qa']; 
  $Ach4Q2=$res4ta['Qb']+$res4tb['Qb']+$res4tc['Qb']+$res4td['Qb']; 
  $Ach4Q3=$res4ta['Qc']+$res4tb['Qc']+$res4tc['Qc']+$res4td['Qc']; 
  $Ach4Q4=$res4ta['Qd']+$res4tb['Qd']+$res4tc['Qd']+$res4td['Qd'];
  $Ach5Q1=$res5ta['Qa']+$res5tb['Qa']+$res5tc['Qa']+$res5td['Qa']; 
  $Ach5Q2=$res5ta['Qb']+$res5tb['Qb']+$res5tc['Qb']+$res5td['Qb']; 
  $Ach5Q3=$res5ta['Qc']+$res5tb['Qc']+$res5tc['Qc']+$res5td['Qc']; 
  $Ach5Q4=$res5ta['Qd']+$res5tb['Qd']+$res5tc['Qd']+$res5td['Qd']; 
  
  $sqlP2d=mysql_query("select * from hrm_sales_sal_details_zone where ZoneEmpID=".$HqEmpId." AND ProductId=".$res['ProductId']." AND YearId=".$_REQUEST['y'], $con); $sqlP3d=mysql_query("select * from hrm_sales_sal_details_zone where ZoneEmpID=".$HqEmpId." AND ProductId=".$res['ProductId']." AND YearId=".$AfterYId, $con);
  //$sChk=mysql_query("select * from hrm_sales_arrange_prod sap INNER JOIN hrm_headquater hq ON sap.StateId=hq.StateId INNER JOIN hrm_sales_dealer d ON hq.HqId=d.".$shqt." INNER JOIN hrm_sales_reporting_level rl ON d.".$suuT."=rl.EmployeeID where ProductId=".$res['ProductId']." AND ArrgStatus='Y' AND (d.".$suuT."=".$HqEmpId." OR rl.R1=".$HqEmpId." OR rl.R2=".$HqEmpId." OR rl.R3=".$HqEmpId." OR rl.R4=".$HqEmpId." OR rl.R5=".$HqEmpId.")", $con);

 } 
 elseif($resEgv['GradeValue']=='M4' OR $resEgv['GradeValue']=='M5') /* 3333  */
 {
  
   $sql4ta=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_terr where TerrRepEmpID=".$HqEmpId." AND ProductId=".$res['ProductId']." AND YearId=".$_REQUEST['y'], $con); $sql5ta=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_terr where TerrRepEmpID=".$HqEmpId." AND ProductId=".$res['ProductId']." AND YearId=".$AfterYId, $con); 
   $res4ta=mysql_fetch_assoc($sql4ta); $res5ta=mysql_fetch_assoc($sql5ta);
   
   $sql4tb=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_hq where HqRepEmpID=".$HqEmpId." AND ProductId=".$res['ProductId']." AND YearId=".$_REQUEST['y'], $con); $sql5tb=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_hq where HqRepEmpID=".$HqEmpId." AND ProductId=".$res['ProductId']." AND YearId=".$AfterYId, $con); 
   $res4tb=mysql_fetch_assoc($sql4tb); $res5tb=mysql_fetch_assoc($sql5tb);
   
   $sql4tc=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_area where AreaRepEmpID=".$HqEmpId." AND ProductId=".$res['ProductId']." AND YearId=".$_REQUEST['y'], $con); $sql5tc=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_area where AreaRepEmpID=".$HqEmpId." AND ProductId=".$res['ProductId']." AND YearId=".$AfterYId, $con); 
   $res4tc=mysql_fetch_assoc($sql4tc); $res5tc=mysql_fetch_assoc($sql5tc);
   $Ach4Q1=$res4ta['Qa']+$res4tb['Qa']+$res4tc['Qa']; $Ach4Q2=$res4ta['Qb']+$res4tb['Qb']+$res4tc['Qb']; 
   $Ach4Q3=$res4ta['Qc']+$res4tb['Qc']+$res4tc['Qc']; $Ach4Q4=$res4ta['Qd']+$res4tb['Qd']+$res4tc['Qd'];
   $Ach5Q1=$res5ta['Qa']+$res5tb['Qa']+$res5tc['Qa']; $Ach5Q2=$res5ta['Qb']+$res5tb['Qb']+$res5tc['Qb']; 
   $Ach5Q3=$res5ta['Qc']+$res5tb['Qc']+$res5tc['Qc']; $Ach5Q4=$res5ta['Qd']+$res5tb['Qd']+$res5tc['Qd'];
   
   $sqlP2d=mysql_query("select * from hrm_sales_sal_details_region where RegionEmpID=".$HqEmpId." AND ProductId=".$res['ProductId']." AND YearId=".$_REQUEST['y'], $con); $sqlP3d=mysql_query("select * from hrm_sales_sal_details_region where RegionEmpID=".$HqEmpId." AND ProductId=".$res['ProductId']." AND YearId=".$AfterYId, $con); 
   //$sChk=mysql_query("select * from hrm_sales_arrange_prod sap INNER JOIN hrm_headquater hq ON sap.StateId=hq.StateId INNER JOIN hrm_sales_dealer d ON hq.HqId=d.".$shqt." INNER JOIN hrm_sales_reporting_level rl ON d.".$suuT."=rl.EmployeeID where ProductId=".$res['ProductId']." AND ArrgStatus='Y' AND (d.".$suuT."=".$HqEmpId." OR rl.R1=".$HqEmpId." OR rl.R2=".$HqEmpId." OR rl.R3=".$HqEmpId." OR rl.R4=".$HqEmpId." OR rl.R5=".$HqEmpId.")", $con);

 } 
 elseif($resEgv['GradeValue']=='M2' OR $resEgv['GradeValue']=='M3') /* 444  */
 { 
 
  if($rowRpt==0)
  {
   $sql4ta=mysql_query("select SUM(M1) as sM1,SUM(M2) as sM2,SUM(M3) as sM3,SUM(M4) as sM4,SUM(M5) as sM5,SUM(M6) as sM6,SUM(M7) as sM7,SUM(M8) as sM8,SUM(M9) as sM9,SUM(M10) as sM10,SUM(M11) as sM11,SUM(M12) as sM12 from hrm_sales_sal_details_".$_REQUEST['y']." sd INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId where (".$suuD." OR d.".$shqt."=".$HqId.") AND sd.ProductId=".$res['ProductId']." AND d.DealerSts='A' AND sd.YearId=".$_REQUEST['y'], $con); $res4ta=mysql_fetch_assoc($sql4ta);
   $sql5ta=mysql_query("select SUM(M1_Proj) as sM1,SUM(M2_Proj) as sM2,SUM(M3_Proj) as sM3,SUM(M4_Proj) as sM4,SUM(M5_Proj) as sM5,SUM(M6_Proj) as sM6,SUM(M7_Proj) as sM7,SUM(M8_Proj) as sM8,SUM(M9_Proj) as sM9,SUM(M10_Proj) as sM10,SUM(M11_Proj) as sM11,SUM(M12_Proj) as sM12 from hrm_sales_sal_details_".$AfterYId." sd INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId where (".$suuD." OR d.".$shqt."=".$HqId.") AND sd.ProductId=".$res['ProductId']." AND d.DealerSts='A' AND sd.YearId=".$AfterYId, $con); 
   $res5ta=mysql_fetch_assoc($sql5ta);
   $Ach4Q1=$res4ta['sM1']+$res4ta['sM2']+$res4ta['sM3']; $Ach4Q2=$res4ta['sM4']+$res4ta['sM5']+$res4ta['sM6'];
   $Ach4Q3=$res4ta['sM7']+$res4ta['sM8']+$res4ta['sM9']; $Ach4Q4=$res4ta['sM10']+$res4ta['sM11']+$res4ta['sM12'];
   $Ach5Q1=$res5ta['sM1']+$res5ta['sM2']+$res5ta['sM3']; $Ach5Q2=$res5ta['sM4']+$res5ta['sM5']+$res5ta['sM6'];
   $Ach5Q3=$res5ta['sM7']+$res5ta['sM8']+$res5ta['sM9']; $Ach5Q4=$res5ta['sM10']+$res5ta['sM11']+$res5ta['sM12'];

   $sqlP2d=mysql_query("select * from hrm_sales_sal_details_hq where HqId=".$HqId." AND ProductId=".$res['ProductId']." AND YearId=".$_REQUEST['y'], $con); $sqlP3d=mysql_query("select * from hrm_sales_sal_details_hq where HqId=".$HqId." AND ProductId=".$res['ProductId']." AND YearId=".$AfterYId, $con); 
   //$sChk=mysql_query("select * from hrm_sales_arrange_prod sap INNER JOIN hrm_headquater hq ON sap.StateId=hq.StateId where ProductId=".$res['ProductId']." AND ArrgStatus='Y' AND HqTEmpStatus='A' AND hq.HqId=".$HqId, $con);
  }
  else
  { 
  $sql4ta=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_terr where TerrRepEmpID=".$HqEmpId." AND ProductId=".$res['ProductId']." AND YearId=".$_REQUEST['y'], $con); $sql5ta=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_terr where TerrRepEmpID=".$HqEmpId." AND ProductId=".$res['ProductId']." AND YearId=".$AfterYId, $con); 
  $res4ta=mysql_fetch_assoc($sql4ta); $res5ta=mysql_fetch_assoc($sql5ta);
  $sql4tb=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_hq where HqRepEmpID=".$HqEmpId." AND ProductId=".$res['ProductId']." AND YearId=".$_REQUEST['y'], $con); $sql5tb=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_hq where HqRepEmpID=".$HqEmpId." AND ProductId=".$res['ProductId']." AND YearId=".$AfterYId, $con); 
  $res4tb=mysql_fetch_assoc($sql4tb); $res5tb=mysql_fetch_assoc($sql5tb);
  $Ach4Q1=$res4ta['Qa']+$res4tb['Qa']; $Ach4Q2=$res4ta['Qb']+$res4tb['Qb']; 
  $Ach4Q3=$res4ta['Qc']+$res4tb['Qc']; $Ach4Q4=$res4ta['Qd']+$res4tb['Qd'];
  $Ach5Q1=$res5ta['Qa']+$res5tb['Qa']; $Ach5Q2=$res5ta['Qb']+$res5tb['Qb']; 
  $Ach5Q3=$res5ta['Qc']+$res5tb['Qc']; $Ach5Q4=$res5ta['Qd']+$res5tb['Qd']; 

  $sqlP2d=mysql_query("select * from hrm_sales_sal_details_area where AreaEmpID=".$HqEmpId." AND ProductId=".$res['ProductId']." AND YearId=".$_REQUEST['y'], $con); $sqlP3d=mysql_query("select * from hrm_sales_sal_details_area where AreaEmpID=".$HqEmpId." AND ProductId=".$res['ProductId']." AND YearId=".$AfterYId, $con); 
  //$sChk=mysql_query("select * from hrm_sales_arrange_prod sap INNER JOIN hrm_headquater hq ON sap.StateId=hq.StateId INNER JOIN hrm_sales_dealer d ON hq.HqId=d.".$shqt." INNER JOIN hrm_sales_reporting_level rl ON d.".$suuT."=rl.EmployeeID where ProductId=".$res['ProductId']." AND ArrgStatus='Y' AND (d.".$suuT."=".$HqEmpId." OR rl.R1=".$HqEmpId." OR rl.R2=".$HqEmpId." OR rl.R3=".$HqEmpId." OR rl.R4=".$HqEmpId." OR rl.R5=".$HqEmpId.")", $con);
  }
  
 } 
 elseif($rowRpt>0) /* 2222  */
 {
  
  $sql4ta=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_terr where TerrRepEmpID=".$HqEmpId." AND ProductId=".$res['ProductId']." AND YearId=".$_REQUEST['y'], $con); $sql5ta=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_terr where TerrRepEmpID=".$HqEmpId." AND ProductId=".$res['ProductId']." AND YearId=".$AfterYId, $con); 
  $res4ta=mysql_fetch_assoc($sql4ta); $res5ta=mysql_fetch_assoc($sql5ta);
  $sql4tb=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_hq where HqRepEmpID=".$HqEmpId." AND ProductId=".$res['ProductId']." AND YearId=".$_REQUEST['y'], $con); $sql5tb=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_hq where HqRepEmpID=".$HqEmpId." AND ProductId=".$res['ProductId']." AND YearId=".$AfterYId, $con); 
  $res4tb=mysql_fetch_assoc($sql4tb); $res5tb=mysql_fetch_assoc($sql5tb);
  $Ach4Q1=$res4ta['Qa']+$res4tb['Qa']; $Ach4Q2=$res4ta['Qb']+$res4tb['Qb']; 
  $Ach4Q3=$res4ta['Qc']+$res4tb['Qc']; $Ach4Q4=$res4ta['Qd']+$res4tb['Qd'];
  $Ach5Q1=$res5ta['Qa']+$res5tb['Qa']; $Ach5Q2=$res5ta['Qb']+$res5tb['Qb']; 
  $Ach5Q3=$res5ta['Qc']+$res5tb['Qc']; $Ach5Q4=$res5ta['Qd']+$res5tb['Qd'];

  $sqlP2d=mysql_query("select * from hrm_sales_sal_details_terr where TerrEmpID=".$HqEmpId." AND TerrHqID=".$HqId." AND ProductId=".$res['ProductId']." AND YearId=".$_REQUEST['y'], $con); $sqlP3d=mysql_query("select * from hrm_sales_sal_details_terr where TerrEmpID=".$HqEmpId." AND TerrHqID=".$HqId." AND ProductId=".$res['ProductId']." AND YearId=".$AfterYId, $con); 
  //$sChk=mysql_query("select * from hrm_sales_arrange_prod sap INNER JOIN hrm_headquater hq ON sap.StateId=hq.StateId INNER JOIN hrm_sales_dealer d ON hq.HqId=d.".$shqt." INNER JOIN hrm_sales_reporting_level rl ON d.".$suuT."=rl.EmployeeID where ProductId=".$res['ProductId']." AND ArrgStatus='Y' AND (d.".$suuT."=".$HqEmpId." OR rl.R1=".$HqEmpId." OR rl.R2=".$HqEmpId." OR rl.R3=".$HqEmpId." OR rl.R4=".$HqEmpId." OR rl.R5=".$HqEmpId.")", $con);
  
 } 
 elseif($rowRpt==0) /* 2222  */
 {
 
  $sql4ta=mysql_query("select SUM(M1) as sM1,SUM(M2) as sM2,SUM(M3) as sM3,SUM(M4) as sM4,SUM(M5) as sM5,SUM(M6) as sM6,SUM(M7) as sM7,SUM(M8) as sM8,SUM(M9) as sM9,SUM(M10) as sM10,SUM(M11) as sM11,SUM(M12) as sM12 from hrm_sales_sal_details_".$_REQUEST['y']." sd INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId where (".$suuD." OR d.".$shqt."=".$HqId.") AND sd.ProductId=".$res['ProductId']." AND d.DealerSts='A' AND sd.YearId=".$_REQUEST['y'], $con); 
  $sql5ta=mysql_query("select SUM(M1_Proj) as sM1,SUM(M2_Proj) as sM2,SUM(M3_Proj) as sM3,SUM(M4_Proj) as sM4,SUM(M5_Proj) as sM5,SUM(M6_Proj) as sM6,SUM(M7_Proj) as sM7,SUM(M8_Proj) as sM8,SUM(M9_Proj) as sM9,SUM(M10_Proj) as sM10,SUM(M11_Proj) as sM11,SUM(M12_Proj) as sM12 from hrm_sales_sal_details_".$AfterYId." sd INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId where (".$suuD." OR d.".$shqt."=".$HqId.") AND sd.ProductId=".$res['ProductId']." AND d.DealerSts='A' AND sd.YearId=".$AfterYId, $con); 
  $res4ta=mysql_fetch_assoc($sql4ta); $res5ta=mysql_fetch_assoc($sql5ta);
  $Ach4Q1=$res4ta['sM1']+$res4ta['sM2']+$res4ta['sM3']; $Ach4Q2=$res4ta['sM4']+$res4ta['sM5']+$res4ta['sM6'];
  $Ach4Q3=$res4ta['sM7']+$res4ta['sM8']+$res4ta['sM9']; $Ach4Q4=$res4ta['sM10']+$res4ta['sM11']+$res4ta['sM12'];
  $Ach5Q1=$res5ta['sM1']+$res5ta['sM2']+$res5ta['sM3']; $Ach5Q2=$res5ta['sM4']+$res5ta['sM5']+$res5ta['sM6'];
  $Ach5Q3=$res5ta['sM7']+$res5ta['sM8']+$res5ta['sM9']; $Ach5Q4=$res5ta['sM10']+$res5ta['sM11']+$res5ta['sM12'];

  $sqlP2d=mysql_query("select * from hrm_sales_sal_details_hq where HqId=".$HqId." AND ProductId=".$res['ProductId']." AND YearId=".$_REQUEST['y'], $con); $sqlP3d=mysql_query("select * from hrm_sales_sal_details_hq where HqId=".$HqId." AND ProductId=".$res['ProductId']." AND YearId=".$AfterYId, $con); 
  //$sChk=mysql_query("select * from hrm_sales_arrange_prod sap INNER JOIN hrm_headquater hq ON sap.StateId=hq.StateId where ProductId=".$res['ProductId']." AND ArrgStatus='Y' AND hq.HqId=".$HqId, $con);

 }
  
  $resP2d=mysql_fetch_assoc($sqlP2d); $resP3d=mysql_fetch_assoc($sqlP3d); 
  $TotP2chd=0; //$rowChkP=mysql_fetch_assoc($sChk);

//if($rowChkP>0 OR $Ach4Q1!=0 OR $Ach4Q2!=0 OR $Ach4Q3!=0 OR $Ach4Q4!=0 OR $Ach5Q1!=0 OR $Ach5Q2!=0 OR $Ach5Q3!=0 OR $Ach5Q4!=0 OR $resP2d['Q1']!=0 OR $resP2d['Q2']!=0 OR $resP2d['Q3']!=0 OR $resP2d['Q4']!=0 OR $resP3d['Q1']!=0 OR $resP3d['Q2']!=0 OR $resP3d['Q3']!=0 OR $resP3d['Q4']!=0){ ?>	  
  <tr bgcolor="#EEEEEE" style="height:22px;">
  <?php if($_REQUEST['ii']=='All_1' OR $_REQUEST['ii']=='All_2'){ ?>	  
   <td bgcolor="#FFFFFF"><input class="Inputt" style="width:100px;" value="<?php echo $res['ItemName']; ?>"/></td>
  <?php } ?>		 
   <td bgcolor="#FFFFFF"><input class="Inputt" style="width:120px;" value="<?php echo $res['ProductName']; ?>" />
   <input type="hidden" id="<?php echo $HqId.'_'.$HqEmpId; ?>P_<?php echo $Sn; ?>" value="<?php echo $res['ProductId']; ?>" /></td>
   <td bgcolor="#FFFFFF" align="center" style="font-size:12px;"><?php echo substr_replace($res['TypeName'], '', 2); ?></td>
   <td align="center" valign="middle" bgcolor="#FFFFFF">
   <?php //if($resCPerMi['EditPerMi']=='Y' AND $EntP=='Y'){ ?>
   <?php //if($rowSubEmp==0){?>
   <img src="images/edit.png" border="0" alt="Edit" id="<?php echo $HqId.'_'.$HqEmpId; ?>EditBtn_<?php echo $Sn; ?>" onClick="editD(<?php echo $Sn.', '.$resRepHq['GradeId'].', '.$HqEmpId.', '.$HqId; ?>)" style="display:block;">
   <img src="images/Floppy-Small-icon.png" border="0" alt="Save" id="<?php echo $HqId.'_'.$HqEmpId; ?>SaveBtn_<?php echo $Sn; ?>" onClick="saveD(<?php echo $Sn.', '.$_REQUEST['y'].', '.$resRepHq['GradeId'].', '.$HqEmpId.', '.$rowRpt.', '.$HqId; ?>)" style="display:none;">
   <?php //} ?>
   <?php //} else {echo '&nbsp;';}?>
   </td>
   <td><input class="Input" id="<?php echo $HqId.'_'.$HqEmpId.'M1a'.$Sn; ?>" value="<?php if($Ach4Q1!=0 AND $Ach4Q1!=0){echo $Ach4Q1;} ?>" readonly/></td>
   <td><input class="Input" id="<?php echo $HqId.'_'.$HqEmpId.'M1b'.$Sn; ?>" value="<?php if($Ach5Q1!=0 AND $Ach5Q1!=0){echo $Ach5Q1;} ?>" readonly/></td>
   <td><input class="Input" id="<?php echo $HqId.'_'.$HqEmpId; ?>M1_Be<?php echo $Sn; ?>" value="<?php if($resP2d['Q1']!='' AND $resP2d['Q1']!=0){echo floatval($resP2d['Q1']);} ?>" style="background-color:#D3FED7;"/></td>
   <td><input class="Input" id="<?php echo $HqId.'_'.$HqEmpId; ?>M1_Ce<?php echo $Sn; ?>" value="<?php if($resP3d['Q1']!='' AND $resP3d['Q1']!=0){echo floatval($resP3d['Q1']);} ?>" style="background-color:#D3FED7;"/></td>


   <td><input class="Input" id="<?php echo $HqId.'_'.$HqEmpId.'M2a'.$Sn; ?>" value="<?php if($Ach4Q2!='' AND $Ach4Q2!=0){echo $Ach4Q2;} ?>" readonly/></td>
   <td><input class="Input" id="<?php echo $HqId.'_'.$HqEmpId.'M2b'.$Sn; ?>" value="<?php if($Ach5Q2!='' AND $Ach5Q2!=0){echo $Ach5Q2;} ?>" readonly/></td>
   <td><input class="Input" id="<?php echo $HqId.'_'.$HqEmpId; ?>M2_Be<?php echo $Sn; ?>" value="<?php if($resP2d['Q2']!='' AND $resP2d['Q2']!=0){echo floatval($resP2d['Q2']);} ?>" style="background-color:#D3FED7;"/></td>
   <td><input class="Input" id="<?php echo $HqId.'_'.$HqEmpId; ?>M2_Ce<?php echo $Sn; ?>" value="<?php if($resP3d['Q2']!='' AND $resP3d['Q2']!=0){echo floatval($resP3d['Q2']);} ?>" style="background-color:#D3FED7;"/></td>

   <td><input class="Input" id="<?php echo $HqId.'_'.$HqEmpId.'M3a'.$Sn; ?>" value="<?php if($Ach4Q3!='' AND $Ach4Q3!=0){echo $Ach4Q3;} ?>" readonly/></td>
   <td><input class="Input" id="<?php echo $HqId.'_'.$HqEmpId.'M3b'.$Sn; ?>" value="<?php if($Ach5Q3!='' AND $Ach5Q3!=0){echo $Ach5Q3;} ?>" readonly/></td>	
   <td><input class="Input" id="<?php echo $HqId.'_'.$HqEmpId; ?>M3_Be<?php echo $Sn; ?>" value="<?php if($resP2d['Q3']!='' AND $resP2d['Q3']!=0){echo floatval($resP2d['Q3']);} ?>" style="background-color:#D3FED7;"/></td>
   <td><input class="Input" id="<?php echo $HqId.'_'.$HqEmpId; ?>M3_Ce<?php echo $Sn; ?>" value="<?php if($resP3d['Q3']!='' AND $resP3d['Q3']!=0){echo floatval($resP3d['Q3']);} ?>" style="background-color:#D3FED7;"/></td>
	
   <td><input class="Input" id="<?php echo $HqId.'_'.$HqEmpId.'M4a'.$Sn; ?>" value="<?php if($Ach4Q4!='' AND $Ach4Q4!=0){echo $Ach4Q4;} ?>" readonly/></td>
   <td><input class="Input" id="<?php echo $HqId.'_'.$HqEmpId.'M4b'.$Sn; ?>" value="<?php if($Ach5Q4!='' AND $Ach5Q4!=0){echo $Ach5Q4;} ?>" readonly/></td>
   <td><input class="Input" id="<?php echo $HqId.'_'.$HqEmpId; ?>M4_Be<?php echo $Sn; ?>" value="<?php if($resP2d['Q4']!='' AND $resP2d['Q4']!=0){echo floatval($resP2d['Q4']);} ?>" style="background-color:#D3FED7;"/></td>
   <td><input class="Input" id="<?php echo $HqId.'_'.$HqEmpId; ?>M4_Ce<?php echo $Sn; ?>" value="<?php if($resP3d['Q4']!='' AND $resP3d['Q4']!=0){echo floatval($resP3d['Q4']);} ?>" style="background-color:#D3FED7;"/></td>

<?php $TotP4d=$Ach4Q1+$Ach4Q2+$Ach4Q3+$Ach4Q4;  $TotP5d=$Ach5Q1+$Ach5Q2+$Ach5Q3+$Ach5Q4; 
      $TotP2d=$resP2d['Q1']+$resP2d['Q2']+$resP2d['Q3']+$resP2d['Q4']; 
      $TotP3d=$resP3d['Q1']+$resP3d['Q2']+$resP3d['Q3']+$resP3d['Q4']; ?>	 

   <td><input class="InputB" id="<?php echo $HqId.'_'.$HqEmpId.'MTota'.$Sn; ?>" value="<?php if($TotP4d!=0 AND $TotP4d!=''){echo $TotP4d;}else{echo '';} ?>" readonly/></td>
   <td><input class="InputB" id="<?php echo $HqId.'_'.$HqEmpId.'MTotb'.$Sn; ?>" value="<?php if($TotP5d!=0 AND $TotP5d!=''){echo $TotP5d;}else{echo '';} ?>" readonly/></td>	
   <td><input class="InputB" id="<?php echo $HqId.'_'.$HqEmpId; ?>TotP2d_<?php echo $Sn; ?>" value="<?php if($TotP2d!=0 AND $TotP2d!=''){echo $TotP2d;}else{echo '';} ?>" readonly/></td>
   <td><input class="InputB" id="<?php echo $HqId.'_'.$HqEmpId; ?>TotP3d_<?php echo $Sn; ?>" value="<?php if($TotP3d!=0 AND $TotP3d!=''){echo $TotP3d;}else{echo '';} ?>" readonly/></td>
	
  </tr>	
<?php //} 
$Sn++; } //if($rowChkP>0 OR $Ach4Q1!=0 OR $Ach4Q2!=0 OR $Ach4Q3!=0 OR $Ach4Q4!=0 OR $Ach5Q1!=0 OR $Ach5Q2!=0 OR $Ach5Q3!=0 OR $Ach5Q4!=0 OR $resP2d['Q1']!=0 OR $resP2d['Q2']!=0 OR $resP2d['Q3']!=0 OR $resP2d['Q4']!=0 OR $resP3d['Q1']!=0 OR $resP3d['Q2']!=0 OR $resP3d['Q3']!=0 OR $resP3d['Q4']!=0) ?> 
    
<?php if($_REQUEST['ii']!='All_1' AND $_REQUEST['ii']!='All_2'){ 
 
 if($resEgv['GradeValue']=='L3' OR $resEgv['GradeValue']=='L4')
 {
   
  $sql4ta2=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_terr sdt INNER JOIN hrm_sales_seedsproduct sp ON sdt.ProductId=sp.ProductId where sp.ProductSts='A' AND sdt.TerrRepEmpID=".$HqEmpId." AND sp.ItemId=".$_REQUEST['ii']." AND sdt.YearId=".$_REQUEST['y'], $con); 
  $sql5ta2=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_terr sdt INNER JOIN hrm_sales_seedsproduct sp ON sdt.ProductId=sp.ProductId where sp.ProductSts='A' AND sdt.TerrRepEmpID=".$HqEmpId." AND sp.ItemId=".$_REQUEST['ii']." AND sdt.YearId=".$AfterYId, $con); 
  $res4ta2=mysql_fetch_assoc($sql4ta2); $res5ta2=mysql_fetch_assoc($sql5ta2);

  $sql4tb2=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_hq sdh INNER JOIN hrm_sales_seedsproduct sp ON sdh.ProductId=sp.ProductId where sp.ProductSts='A' AND sdh.HqRepEmpID=".$HqEmpId." AND sp.ItemId=".$_REQUEST['ii']." AND sdh.YearId=".$_REQUEST['y'], $con); 
  $sql5tb2=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_hq sdh INNER JOIN hrm_sales_seedsproduct sp ON sdh.ProductId=sp.ProductId where sp.ProductSts='A' AND sdh.HqRepEmpID=".$HqEmpId." AND sp.ItemId=".$_REQUEST['ii']." AND sdh.YearId=".$AfterYId, $con); 
  $res4tb2=mysql_fetch_assoc($sql4tb2); $res5tb2=mysql_fetch_assoc($sql5tb2);

  $sql4tc2=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_area sda INNER JOIN hrm_sales_seedsproduct sp ON sda.ProductId=sp.ProductId where sp.ProductSts='A' AND sda.AreaEmpID=".$HqEmpId." AND sp.ItemId=".$_REQUEST['ii']." AND sda.YearId=".$_REQUEST['y'], $con); 
  $sql5tc2=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_area sda INNER JOIN hrm_sales_seedsproduct sp ON sda.ProductId=sp.ProductId where sp.ProductSts='A' AND sda.AreaEmpID=".$HqEmpId." AND sp.ItemId=".$_REQUEST['ii']." AND sda.YearId=".$AfterYId, $con); 
  $res4tc2=mysql_fetch_assoc($sql4tc2); $res5tc2=mysql_fetch_assoc($sql5tc2);

  $sql4td2=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_region rg INNER JOIN hrm_sales_seedsproduct sp ON rg.ProductId=sp.ProductId where sp.ProductSts='A' AND rg.RegionRepEmpID=".$HqEmpId." AND sp.ItemId=".$_REQUEST['ii']." AND rg.YearId=".$_REQUEST['y'], $con); 
  $sql5td2=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_region rg INNER JOIN hrm_sales_seedsproduct sp ON rg.ProductId=sp.ProductId where sp.ProductSts='A' AND rg.RegionRepEmpID=".$HqEmpId." AND sp.ItemId=".$_REQUEST['ii']." AND rg.YearId=".$AfterYId, $con); 
  $res4td2=mysql_fetch_assoc($sql4td2); $res5td2=mysql_fetch_assoc($sql5td2);

  $sql4te2=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_zone zn INNER JOIN hrm_sales_seedsproduct sp ON zn.ProductId=sp.ProductId where sp.ProductSts='A' AND zn.ZoneEmpID=".$HqEmpId." AND sp.ItemId=".$_REQUEST['ii']." AND zn.YearId=".$_REQUEST['y'], $con); 
  $sql5te2=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_zone zn INNER JOIN hrm_sales_seedsproduct sp ON zn.ProductId=sp.ProductId where sp.ProductSts='A' AND zn.ZoneEmpID=".$HqEmpId." AND sp.ItemId=".$_REQUEST['ii']." AND zn.YearId=".$AfterYId, $con); 
  $res4te2=mysql_fetch_assoc($sql4te2); $res5te2=mysql_fetch_assoc($sql5te2);
  $Acht4Q1=$res4ta2['Qa']+$res4tb2['Qa']+$res4tc2['Qa']+$res4td2['Qa']+$res4te2['Qa']; 
  $Acht4Q2=$res4ta2['Qb']+$res4tb2['Qb']+$res4tc2['Qb']+$res4td2['Qb']+$res4te2['Qb']; 
  $Acht4Q3=$res4ta2['Qc']+$res4tb2['Qc']+$res4tc2['Qc']+$res4td2['Qc']+$res4te2['Qc']; 
  $Acht4Q4=$res4ta2['Qd']+$res4tb2['Qd']+$res4tc2['Qd']+$res4td2['Qd']+$res4te2['Qd'];
  $Acht5Q1=$res5ta2['Qa']+$res5tb2['Qa']+$res5tc2['Qa']+$res5td2['Qa']+$res5te2['Qa']; 
  $Acht5Q2=$res5ta2['Qb']+$res5tb2['Qb']+$res5tc2['Qb']+$res5td2['Qb']+$res5te2['Qb']; 
  $Acht5Q3=$res5ta2['Qc']+$res5tb2['Qc']+$res5tc2['Qc']+$res5td2['Qc']+$res5te2['Qc']; 
  $Acht5Q4=$res5ta2['Qd']+$res5tb2['Qd']+$res5tc2['Qd']+$res5td2['Qd']+$res5te2['Qd'];

 $sqlP2td=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_gm gm INNER JOIN hrm_sales_seedsproduct sp ON gm.ProductId=sp.ProductId where gm.GmEmpID=".$HqEmpId." AND sp.ItemId=".$_REQUEST['ii']." AND gm.YearId=".$_REQUEST['y'], $con); $sqlP3td=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_gm gm INNER JOIN hrm_sales_seedsproduct sp ON gm.ProductId=sp.ProductId where sp.ProductSts='A' AND gm.GmEmpID=".$HqEmpId." AND sp.ItemId=".$_REQUEST['ii']." AND gm.YearId=".$AfterYId, $con); 

 } 
 elseif($resEgv['GradeValue']=='L1' OR $resEgv['GradeValue']=='L2')
 { 
 
  $sql4ta2=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_terr tr INNER JOIN hrm_sales_seedsproduct sp ON tr.ProductId=sp.ProductId where sp.ProductSts='A' AND tr.TerrRepEmpID=".$HqEmpId." AND sp.ItemId=".$_REQUEST['ii']." AND tr.YearId=".$_REQUEST['y'], $con); 
  $sql5ta2=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_terr tr INNER JOIN hrm_sales_seedsproduct sp ON tr.ProductId=sp.ProductId where sp.ProductSts='A' AND tr.TerrRepEmpID=".$HqEmpId." AND sp.ItemId=".$_REQUEST['ii']." AND tr.YearId=".$AfterYId, $con); 
  $res4ta2=mysql_fetch_assoc($sql4ta2); $res5ta2=mysql_fetch_assoc($sql5ta2);

  $sql4tb2=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_hq hq INNER JOIN hrm_sales_seedsproduct sp ON hq.ProductId=sp.ProductId where sp.ProductSts='A' AND hq.HqRepEmpID=".$HqEmpId." AND sp.ItemId=".$_REQUEST['ii']." AND hq.YearId=".$_REQUEST['y'], $con); 
  $sql5tb2=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_hq hq INNER JOIN hrm_sales_seedsproduct sp ON hq.ProductId=sp.ProductId where sp.ProductSts='A' AND hq.HqRepEmpID=".$HqEmpId." AND sp.ItemId=".$_REQUEST['ii']." AND hq.YearId=".$AfterYId, $con); 
  $res4tb2=mysql_fetch_assoc($sql4tb2); $res5tb2=mysql_fetch_assoc($sql5tb2);

  $sql4tc2=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_area ar INNER JOIN hrm_sales_seedsproduct sp ON ar.ProductId=sp.ProductId where sp.ProductSts='A' AND ar.AreaRepEmpID=".$HqEmpId." AND sp.ItemId=".$_REQUEST['ii']." AND ar.YearId=".$_REQUEST['y'], $con); 
  $sql5tc2=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_area ar INNER JOIN hrm_sales_seedsproduct sp ON ar.ProductId=sp.ProductId where sp.ProductSts='A' AND ar.AreaRepEmpID=".$HqEmpId." AND sp.ItemId=".$_REQUEST['ii']." AND ar.YearId=".$AfterYId, $con); 
  $res4tc2=mysql_fetch_assoc($sql4tc2); $res5tc2=mysql_fetch_assoc($sql5tc2);

  $sql4td2=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_region rg INNER JOIN hrm_sales_seedsproduct sp ON rg.ProductId=sp.ProductId where sp.ProductSts='A' AND rg.RegionRepEmpID=".$HqEmpId." AND sp.ItemId=".$_REQUEST['ii']." AND rg.YearId=".$_REQUEST['y'], $con); 
  $sql5td2=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_region rg INNER JOIN hrm_sales_seedsproduct sp ON rg.ProductId=sp.ProductId where sp.ProductSts='A' AND rg.RegionRepEmpID=".$HqEmpId." AND sp.ItemId=".$_REQUEST['ii']." AND rg.YearId=".$AfterYId, $con); 
  $res4td2=mysql_fetch_assoc($sql4td2); $res5td2=mysql_fetch_assoc($sql5td2);
  $Acht4Q1=$res4ta2['Qa']+$res4tb2['Qa']+$res4tc2['Qa']+$res4td2['Qa']; 
  $Acht4Q2=$res4ta2['Qb']+$res4tb2['Qb']+$res4tc2['Qb']+$res4td2['Qb']; 
  $Acht4Q3=$res4ta2['Qc']+$res4tb2['Qc']+$res4tc2['Qc']+$res4td2['Qc']; 
  $Acht4Q4=$res4ta2['Qd']+$res4tb2['Qd']+$res4tc2['Qd']+$res4td2['Qd'];
  $Acht5Q1=$res5ta2['Qa']+$res5tb2['Qa']+$res5tc2['Qa']+$res5td2['Qa']; 
  $Acht5Q2=$res5ta2['Qb']+$res5tb2['Qb']+$res5tc2['Qb']+$res5td2['Qb']; 
  $Acht5Q3=$res5ta2['Qc']+$res5tb2['Qc']+$res5tc2['Qc']+$res5td2['Qc']; 
  $Acht5Q4=$res5ta2['Qd']+$res5tb2['Qd']+$res5tc2['Qd']+$res5td2['Qd']; 
  
  $sqlP2td=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_zone zn INNER JOIN hrm_sales_seedsproduct sp ON zn.ProductId=sp.ProductId where sp.ProductSts='A' AND zn.ZoneEmpID=".$HqEmpId." AND sp.ItemId=".$_REQUEST['ii']." AND zn.YearId=".$_REQUEST['y'], $con); 
  $sqlP3td=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_zone zn INNER JOIN hrm_sales_seedsproduct sp ON zn.ProductId=sp.ProductId where sp.ProductSts='A' AND zn.ZoneEmpID=".$HqEmpId." AND sp.ItemId=".$_REQUEST['ii']." AND zn.YearId=".$AfterYId, $con); 

 } 
 elseif($resEgv['GradeValue']=='M4' OR $resEgv['GradeValue']=='M5')
 {

  $sql4ta2=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_terr tr INNER JOIN hrm_sales_seedsproduct sp ON tr.ProductId=sp.ProductId where sp.ProductSts='A' AND tr.TerrRepEmpID=".$HqEmpId." AND sp.ItemId=".$_REQUEST['ii']." AND tr.YearId=".$_REQUEST['y'], $con); 
  $sql5ta2=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_terr tr INNER JOIN hrm_sales_seedsproduct sp ON tr.ProductId=sp.ProductId where sp.ProductSts='A' AND tr.TerrRepEmpID=".$HqEmpId." AND sp.ItemId=".$_REQUEST['ii']." AND tr.YearId=".$AfterYId, $con); 
  $res4ta2=mysql_fetch_assoc($sql4ta2); $res5ta2=mysql_fetch_assoc($sql5ta2);
  
  $sql4tb2=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_hq hq INNER JOIN hrm_sales_seedsproduct sp ON hq.ProductId=sp.ProductId where sp.ProductSts='A' AND hq.HqRepEmpID=".$HqEmpId." AND sp.ItemId=".$_REQUEST['ii']." AND hq.YearId=".$_REQUEST['y'], $con); 
  $sql5tb2=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_hq hq INNER JOIN hrm_sales_seedsproduct sp ON hq.ProductId=sp.ProductId where sp.ProductSts='A' AND hq.HqRepEmpID=".$HqEmpId." AND sp.ItemId=".$_REQUEST['ii']." AND hq.YearId=".$AfterYId, $con); 
  $res4tb2=mysql_fetch_assoc($sql4tb2); $res5tb2=mysql_fetch_assoc($sql5tb2);
  
  $sql4tc2=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_area ar INNER JOIN hrm_sales_seedsproduct sp ON ar.ProductId=sp.ProductId where sp.ProductSts='A' AND ar.AreaRepEmpID=".$HqEmpId." AND sp.ItemId=".$_REQUEST['ii']." AND ar.YearId=".$_REQUEST['y'], $con); 
  $sql5tc2=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_area ar INNER JOIN hrm_sales_seedsproduct sp ON ar.ProductId=sp.ProductId where sp.ProductSts='A' AND ar.AreaRepEmpID=".$HqEmpId." AND sp.ItemId=".$_REQUEST['ii']." AND ar.YearId=".$AfterYId, $con); 
  $res4tc2=mysql_fetch_assoc($sql4tc2); $res5tc2=mysql_fetch_assoc($sql5tc2);
  $Acht4Q1=$res4ta2['Qa']+$res4tb2['Qa']+$res4tc2['Qa']; $Acht4Q2=$res4ta2['Qb']+$res4tb2['Qb']+$res4tc2['Qb']; 
  $Acht4Q3=$res4ta2['Qc']+$res4tb2['Qc']+$res4tc2['Qc']; $Acht4Q4=$res4ta2['Qd']+$res4tb2['Qd']+$res4tc2['Qd'];
  $Acht5Q1=$res5ta2['Qa']+$res5tb2['Qa']+$res5tc2['Qa']; $Acht5Q2=$res5ta2['Qb']+$res5tb2['Qb']+$res5tc2['Qb']; 
  $Acht5Q3=$res5ta2['Qc']+$res5tb2['Qc']+$res5tc2['Qc']; $Acht5Q4=$res5ta2['Qd']+$res5tb2['Qd']+$res5tc2['Qd']; 

  $sqlP2td=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_region rg INNER JOIN hrm_sales_seedsproduct sp ON rg.ProductId=sp.ProductId where sp.ProductSts='A' AND rg.RegionEmpID=".$HqEmpId." AND sp.ItemId=".$_REQUEST['ii']." AND rg.YearId=".$_REQUEST['y'], $con); 
  $sqlP3td=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_region rg INNER JOIN hrm_sales_seedsproduct sp ON rg.ProductId=sp.ProductId where sp.ProductSts='A' AND rg.RegionEmpID=".$HqEmpId." AND sp.ItemId=".$_REQUEST['ii']." AND rg.YearId=".$AfterYId, $con); 

 } 
 elseif($resEgv['GradeValue']=='M2' OR $resEgv['GradeValue']=='M3')
 { 

  if($rowRpt==0)
  {
   $sql4ta2=mysql_query("select SUM(M1) as sM1,SUM(M2) as sM2,SUM(M3) as sM3,SUM(M4) as sM4,SUM(M5) as sM5,SUM(M6) as sM6,SUM(M7) as sM7,SUM(M8) as sM8,SUM(M9) as sM9,SUM(M10) as sM10,SUM(M11) as sM11,SUM(M12) as sM12 from hrm_sales_sal_details_".$_REQUEST['y']." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId where sp.ProductSts='A' AND (".$suuD." OR d.".$shqt."=".$HqId.") AND sp.ItemId=".$_REQUEST['ii']." AND d.DealerSts='A' AND sd.YearId=".$_REQUEST['y'], $con); 
   $sql5ta2=mysql_query("select SUM(M1_Proj) as sM1,SUM(M2_Proj) as sM2,SUM(M3_Proj) as sM3,SUM(M4_Proj) as sM4,SUM(M5_Proj) as sM5,SUM(M6_Proj) as sM6,SUM(M7_Proj) as sM7,SUM(M8_Proj) as sM8,SUM(M9_Proj) as sM9,SUM(M10_Proj) as sM10,SUM(M11_Proj) as sM11,SUM(M12_Proj) as sM12 from hrm_sales_sal_details_".$AfterYId." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId where sp.ProductSts='A' AND (".$suuD." OR d.".$shqt."=".$HqId.") AND sp.ItemId=".$_REQUEST['ii']." AND d.DealerSts='A' AND sd.YearId=".$AfterYId, $con); 
   $res4ta2=mysql_fetch_assoc($sql4ta2); $res5ta2=mysql_fetch_assoc($sql5ta2);
   $Acht4Q1=$res4ta2['sM1']+$res4ta2['sM2']+$res4ta2['sM3']; $Acht4Q2=$res4ta2['sM4']+$res4ta2['sM5']+$res4ta2['sM6'];
   $Acht4Q3=$res4ta2['sM7']+$res4ta2['sM8']+$res4ta2['sM9']; $Acht4Q4=$res4ta2['sM10']+$res4ta2['sM11']+$res4ta2['sM12'];
   $Acht5Q1=$res5ta2['sM1']+$res5ta2['sM2']+$res5ta2['sM3']; $Acht5Q2=$res5ta2['sM4']+$res5ta2['sM5']+$res5ta2['sM6'];
   $Acht5Q3=$res5ta2['sM7']+$res5ta2['sM8']+$res5ta2['sM9']; $Acht5Q4=$res5ta2['sM10']+$res5ta2['sM11']+$res5ta2['sM12'];

   $sqlP2td=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_hq sdh INNER JOIN hrm_sales_seedsproduct sp ON sdh.ProductId=sp.ProductId where sp.ProductSts='A' AND sdh.HqId=".$HqId." AND sp.ItemId=".$_REQUEST['ii']." AND sdh.YearId=".$_REQUEST['y'], $con); 
   $sqlP3td=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_hq sdh INNER JOIN hrm_sales_seedsproduct sp ON sdh.ProductId=sp.ProductId where sp.ProductSts='A' AND sdh.HqId=".$HqId." AND sp.ItemId=".$_REQUEST['ii']." AND sdh.YearId=".$AfterYId, $con); 
  }
  else
  {
   $sql4ta2=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_terr sdt INNER JOIN hrm_sales_seedsproduct sp ON sdt.ProductId=sp.ProductId where sp.ProductSts='A' AND sdt.TerrRepEmpID=".$HqEmpId." AND sp.ItemId=".$_REQUEST['ii']." AND sdt.YearId=".$_REQUEST['y'], $con); $res4ta2=mysql_fetch_assoc($sql4ta2); 
   $sql5ta2=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_terr sdt INNER JOIN hrm_sales_seedsproduct sp ON sdt.ProductId=sp.ProductId where sp.ProductSts='A' AND sdt.TerrRepEmpID=".$HqEmpId." AND sp.ItemId=".$_REQUEST['ii']." AND sdt.YearId=".$AfterYId, $con); $res5ta2=mysql_fetch_assoc($sql5ta2);
   $sql4tb2=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_hq sdh INNER JOIN hrm_sales_seedsproduct sp ON sdh.ProductId=sp.ProductId where sp.ProductSts='A' AND sdh.HqRepEmpID=".$HqEmpId." AND sp.ItemId=".$_REQUEST['ii']." AND sdh.YearId=".$_REQUEST['y'], $con); $res4tb2=mysql_fetch_assoc($sql4tb2); 
   $sql5tb2=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_hq sdh INNER JOIN hrm_sales_seedsproduct sp ON sdh.ProductId=sp.ProductId where sp.ProductSts='A' AND sdh.HqRepEmpID=".$HqEmpId." AND sp.ItemId=".$_REQUEST['ii']." AND sdh.YearId=".$AfterYId, $con); $res5tb2=mysql_fetch_assoc($sql5tb2);
   $Acht4Q1=$res4ta2['Qa']+$res4tb2['Qa']; $Acht4Q2=$res4ta2['Qb']+$res4tb2['Qb']; 
   $Acht4Q3=$res4ta2['Qc']+$res4tb2['Qc']; $Acht4Q4=$res4ta2['Qd']+$res4tb2['Qd'];
   $Acht5Q1=$res5ta2['Qa']+$res5tb2['Qa']; $Acht5Q2=$res5ta2['Qb']+$res5tb2['Qb']; 
   $Acht5Q3=$res5ta2['Qc']+$res5tb2['Qc']; $Acht5Q4=$res5ta2['Qd']+$res5tb2['Qd'];

   $sqlP2td=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_area sda INNER JOIN hrm_sales_seedsproduct sp ON sda.ProductId=sp.ProductId where sp.ProductSts='A' AND sda.AreaEmpID=".$HqEmpId." AND sp.ItemId=".$_REQUEST['ii']." AND sda.YearId=".$_REQUEST['y'], $con); 
   $sqlP3td=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_area sda INNER JOIN hrm_sales_seedsproduct sp ON sda.ProductId=sp.ProductId where sp.ProductSts='A' AND sda.AreaEmpID=".$HqEmpId." AND sp.ItemId=".$_REQUEST['ii']." AND sda.YearId=".$AfterYId, $con);
  }

 } 
 elseif($rowRpt>0)
 {

  $sql4ta2=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_terr sdt INNER JOIN hrm_sales_seedsproduct sp ON sdt.ProductId=sp.ProductId where sp.ProductSts='A' AND sdt.TerrRepEmpID=".$HqEmpId." AND sp.ItemId=".$_REQUEST['ii']." AND sdt.YearId=".$_REQUEST['y'], $con); $res4ta2=mysql_fetch_assoc($sql4ta2);
  $sql5ta2=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_terr sdt INNER JOIN hrm_sales_seedsproduct sp ON sdt.ProductId=sp.ProductId where sp.ProductSts='A' AND sdt.TerrRepEmpID=".$HqEmpId." AND sp.ItemId=".$_REQUEST['ii']." AND sdt.YearId=".$AfterYId, $con); $res5ta2=mysql_fetch_assoc($sql5ta2);
  $sql4tb2=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_hq sdh INNER JOIN hrm_sales_seedsproduct sp ON sdh.ProductId=sp.ProductId where sp.ProductSts='A' AND sdh.HqRepEmpID=".$HqEmpId." AND sp.ItemId=".$_REQUEST['ii']." AND sdh.YearId=".$_REQUEST['y'], $con); $res4tb2=mysql_fetch_assoc($sql4tb2); 
  $sql5tb2=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_hq sdh INNER JOIN hrm_sales_seedsproduct sp ON sdh.ProductId=sp.ProductId where sp.ProductSts='A' AND sdh.HqRepEmpID=".$HqEmpId." AND sp.ItemId=".$_REQUEST['ii']." AND sdh.YearId=".$AfterYId, $con); $res5tb2=mysql_fetch_assoc($sql5tb2);
  $Acht4Q1=$res4ta2['Qa']+$res4tb2['Qa']; $Acht4Q2=$res4ta2['Qb']+$res4tb2['Qb']; 
  $Acht4Q3=$res4ta2['Qc']+$res4tb2['Qc']; $Acht4Q4=$res4ta2['Qd']+$res4tb2['Qd'];
  $Acht5Q1=$res5ta2['Qa']+$res5tb2['Qa']; $Acht5Q2=$res5ta2['Qb']+$res5tb2['Qb']; 
  $Acht5Q3=$res5ta2['Qc']+$res5tb2['Qc']; $Acht5Q4=$res5ta2['Qd']+$res5tb2['Qd']; 

  $sqlP2td=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_terr sdt INNER JOIN hrm_sales_seedsproduct sp ON sdt.ProductId=sp.ProductId where sp.ProductSts='A' AND sdt.TerrEmpID=".$HqEmpId." AND sdt.TerrHqID=".$HqId." AND sp.ItemId=".$_REQUEST['ii']." AND sdt.YearId=".$_REQUEST['y'], $con); 
  $sqlP3td=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_terr sdt INNER JOIN hrm_sales_seedsproduct sp ON sdt.ProductId=sp.ProductId where sp.ProductSts='A' AND sdt.TerrEmpID=".$HqEmpId." AND sdt.TerrHqID=".$HqId." AND sp.ItemId=".$_REQUEST['ii']." AND sdt.YearId=".$AfterYId, $con);

 } 
 elseif($rowRpt==0)
 { 

  $sql4ta2=mysql_query("select SUM(M1) as sM1,SUM(M2) as sM2,SUM(M3) as sM3,SUM(M4) as sM4,SUM(M5) as sM5,SUM(M6) as sM6,SUM(M7) as sM7,SUM(M8) as sM8,SUM(M9) as sM9,SUM(M10) as sM10,SUM(M11) as sM11,SUM(M12) as sM12 from hrm_sales_sal_details_".$_REQUEST['y']." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId where sp.ProductSts='A' AND (".$suuD." OR d.".$shqt."=".$HqId.") AND sp.ItemId=".$_REQUEST['ii']." AND d.DealerSts='A' AND sd.YearId=".$_REQUEST['y'], $con); $res4ta2=mysql_fetch_assoc($sql4ta2);
  $sql5ta2=mysql_query("select SUM(M1_Proj) as sM1,SUM(M2_Proj) as sM2,SUM(M3_Proj) as sM3,SUM(M4_Proj) as sM4,SUM(M5_Proj) as sM5,SUM(M6_Proj) as sM6,SUM(M7_Proj) as sM7,SUM(M8_Proj) as sM8,SUM(M9_Proj) as sM9,SUM(M10_Proj) as sM10,SUM(M11_Proj) as sM11,SUM(M12_Proj) as sM12 from hrm_sales_sal_details_".$AfterYId." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId where sp.ProductSts='A' AND (".$suuD." OR d.".$shqt."=".$HqId.") AND sp.ItemId=".$_REQUEST['ii']." AND d.DealerSts='A' AND sd.YearId=".$AfterYId, $con); $res5ta2=mysql_fetch_assoc($sql5ta2);
  $Acht4Q1=$res4ta2['sM1']+$res4ta2['sM2']+$res4ta2['sM3']; $Acht4Q2=$res4ta2['sM4']+$res4ta2['sM5']+$res4ta2['sM6'];
  $Acht4Q3=$res4ta2['sM7']+$res4ta2['sM8']+$res4ta2['sM9']; $Acht4Q4=$res4ta2['sM10']+$res4ta2['sM11']+$res4ta2['sM12'];
  $Acht5Q1=$res5ta2['sM1']+$res5ta2['sM2']+$res5ta2['sM3']; $Acht5Q2=$res5ta2['sM4']+$res5ta2['sM5']+$res5ta2['sM6'];
  $Acht5Q3=$res5ta2['sM7']+$res5ta2['sM8']+$res5ta2['sM9']; $Acht5Q4=$res5ta2['sM10']+$res5ta2['sM11']+$res5ta2['sM12'];

  $sqlP2td=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_hq sdh INNER JOIN hrm_sales_seedsproduct sp ON sdh.ProductId=sp.ProductId where sp.ProductSts='A' AND sdh.HqId=".$HqId." AND sp.ItemId=".$_REQUEST['ii']." AND sdh.YearId=".$_REQUEST['y'], $con); 
  $sqlP3td=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_hq sdh INNER JOIN hrm_sales_seedsproduct sp ON sdh.ProductId=sp.ProductId where sp.ProductSts='A' AND sdh.HqId=".$HqId." AND sp.ItemId=".$_REQUEST['ii']." AND sdh.YearId=".$AfterYId, $con); 
 
 }
 $resP2td=mysql_fetch_assoc($sqlP2td); $resP3td=mysql_fetch_assoc($sqlP3td);
?>
 <tr style="font-size:14px;color:#000000;background-color:#FFFFA6;height:24px;">
  <td colspan="3" align="right" style="font-size:16px;"><b>TOTAL:&nbsp;</b></td>
   <td><input class="TInput" id="" value="<?php if($Acht4Q1!=0 AND $Acht4Q1!=0){echo $Acht4Q1;} ?>" /></td>
   <td><input class="TInput" id="" value="<?php if($Acht5Q1!=0 AND $Acht5Q1!=0){echo $Acht5Q1;} ?>" readonly/></td>
   <td><input class="TInput" id="<?php echo $HqId.'_'.$HqEmpId; ?>M1_BeT" value="<?php if($resP2td['Qa']!=0){echo floatval($resP2td['Qa']);} ?>" /></td><td><input class="TInput" id="<?php echo $HqId.'_'.$HqEmpId; ?>M1_CeT" value="<?php if($resP3td['Qa']!=0){echo floatval($resP3td['Qa']);} ?>" readonly/></td>
	
   <td><input class="TInput" id="" value="<?php if($Acht4Q2!=0 AND $Acht4Q2!=0){echo $Acht4Q2;} ?>" readonly/></td>
   <td><input class="TInput" id="" value="<?php if($Acht5Q2!=0 AND $Acht5Q2!=0){echo $Acht5Q2;} ?>" readonly/></td>
   <td><input class="TInput" id="<?php echo $HqId.'_'.$HqEmpId; ?>M2_BeT" value="<?php if($resP2td['Qb']!=0){echo floatval($resP2td['Qb']);} ?>" readonly/></td><td><input class="TInput" id="<?php echo $HqId.'_'.$HqEmpId; ?>M2_CeT" value="<?php if($resP3td['Qb']!=0){echo floatval($resP3td['Qb']);} ?>" readonly/></td>	 
	 
   <td><input class="TInput" id="" value="<?php if($Acht4Q3!=0 AND $Acht4Q3!=0){echo $Acht4Q3;} ?>" readonly/></td>
   <td><input class="TInput" id="" value="<?php if($Acht5Q3!=0 AND $Acht5Q3!=0){echo $Acht5Q3;} ?>" readonly/></td>	
   <td><input class="TInput" id="<?php echo $HqId.'_'.$HqEmpId; ?>M3_BeT" value="<?php if($resP2td['Qc']!=0){echo floatval($resP2td['Qc']);} ?>" readonly/></td><td><input class="TInput" id="<?php echo $HqId.'_'.$HqEmpId; ?>M3_CeT" value="<?php if($resP3td['Qc']!=0){echo floatval($resP3td['Qc']);} ?>" readonly/></td> 
	 		
   <td><input class="TInput" id="" value="<?php if($Acht4Q4!=0 AND $Acht4Q4!=0){echo $Acht4Q4;} ?>" readonly/></td>
   <td><input class="TInput" id="" value="<?php if($Acht5Q4!=0 AND $Acht5Q4!=0){echo $Acht5Q4;} ?>" readonly/></td>
   <td><input class="TInput" id="<?php echo $HqId.'_'.$HqEmpId; ?>M4_BeT" value="<?php if($resP2td['Qd']!=0){echo floatval($resP2td['Qd']);} ?>" readonly/></td><td><input class="TInput" id="<?php echo $HqId.'_'.$HqEmpId; ?>M4_CeT" value="<?php if($resP3td['Qd']!=0){echo floatval($resP3td['Qd']);} ?>" readonly/></td>	 
	 
<?php $TotP4td=$Acht4Q1+$Acht4Q2+$Acht4Q3+$Acht4Q4; $TotP5td=$Acht5Q1+$Acht5Q2+$Acht5Q3+$Acht5Q4; 
      $TotP2td=$resP2td['Qa']+$resP2td['Qb']+$resP2td['Qc']+$resP2td['Qd']; 
      $TotP3td=$resP3td['Qa']+$resP3td['Qb']+$resP3td['Qc']+$resP3td['Qd']; ?>
   <td><input class="TInput" value="<?php if($TotP4td!=0 AND $TotP4td!=''){echo $TotP4td;}else{echo '';} ?>" readonly/></td>
   <td><input class="TInput" value="<?php if($TotP5td!=0 AND $TotP5td!=''){echo $TotP5td;}else{echo '';} ?>" readonly/></td>
   <td><input class="TInput" id="<?php echo $HqId.'_'.$HqEmpId; ?>TotM_BeT" value="<?php if($TotP2td!=0 AND $TotP2td!=''){echo $TotP2td;}else{echo '';} ?>" readonly/></td><td><input class="TInput" id="<?php echo $HqId.'_'.$HqEmpId; ?>TotM_CeT" value="<?php if($TotP3td!=0 AND $TotP3td!=''){echo $TotP3td;}else{echo '';} ?>" readonly/></td>  
  </tr>	
<?php } ////if($_REQUEST['ii']!='All_1' AND $_REQUEST['ii']!='All_2') ?>  
 </table>	       
 </td>  
</tr>

<?php /***************** Open Open Open Open Open Open Open Open Open Open 11 Close Close ************/ ?>
<?php /***************** Open Open Open Open Open Open Open Open Open Open 11 Close Close ************/ ?>

 </table>
 </td>
</tr>
<?php } /*********** Close Hq-Dealer **********//*********** Close Hq-Dealer **********/
        /*********** Close Hq-Dealer **********//*********** Close Hq-Dealer **********/ ?> 

	 	
  </table>
 </td>
</tr>
<tr><td>&nbsp;</td></tr>

<?php } //if($_REQUEST['ac']!=1 && $_REQUEST['ii']!=0 && $_REQUEST['ernS']!='EewTottv') ?>

<?php } //if($_REQUEST['act']>0) ?>
<!-- ---------------------------------- Main Page Open ---------------------------------- Close -->
<!-- ---------------------------------- Main Page Open ---------------------------------- Close -->

<tr>
 <td id="TDResultId" style="width:100%;">
  <span id="ResultTDSpan"></span>
  <span id="AddMonthResult"></span>
  <span id="SubSpanMsg"></span>
 </td>
</tr>


</table> <?php /* 11111 Close Table*/ ?>
			
<!--------------------- Start Start Start Start Start Start Start Start Start Start Close Close ------------>
<!--------------------- Start Start Start Start Start Start Start Start Start Start Close Close ------------>
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
