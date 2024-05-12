<?php session_start();
if($_SESSION['login'] = true){require_once('../user/config/config.php');}
include("../function.php");
if(check_user()==false){header('Location:../../index.php');}
$EmployeeId=$_SESSION['EmployeeID'];
?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
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
.InputB{font-size:12px;width:50px;text-align:right;border:0px;background-color:#D9D9FF;} 
.Input{font-size:12px;width:50px;text-align:right;border:0px;background-color:#EEE;}
.Inputt{font-size:12px;font-family:Times New Roman;border:0px;background-color:#FFF; color:#000000;}
.Inputi{font-size:12px;width:50px;text-align:right;border:0px;background-color:#EEE;}
.TInput{font-size:12px;width:50px;text-align:right;border:0px;background-color:#FFFFA6;}
.InputBc{font-size:12px;width:50px;text-align:right;border:0px;font-weight:bold;background-color:#62B0FF;} 
.Inputc{font-size:12px;width:50px;text-align:right;border:0px;background-color:#62B0FF;}
.Trh60{text-align:center;width:50px;font-size:12px;font-weight:bold;}
.Revised{width:60px;font-weight:bold;text-align:right;}
.Revisedt{width:60px;font-weight:bold;text-align:right;}
</style>
<Script type="text/javascript">//window.history.forward(1);</Script> 
<script type="text/javascript" language="javascript">
function ChangeHq(hq,v,no)
{ window.location="SalesaEntry.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&act="+document.getElementById("act").value+"&hq="+hq+"&y="+v+"&q="+document.getElementById("q").value+"&ii="+document.getElementById("ii").value+"&vc="+document.getElementById("vc").value+"&fc="+document.getElementById("fc").value+"&cc="+document.getElementById("cc").value+"&di="+document.getElementById("di").value+"&gi="+document.getElementById("gi").value+'&EHq='+document.getElementById("EHq").value+'&myh=1&myt='+document.getElementById("myt").value+'&no='+no; 
}

function ChangeItem(ii,v)
{  
 if(ii==0 && v=='vc'){alert("please select vegitable crop item"); return false;}
 else if(ii==0 && v=='fc'){alert("please select field crop item"); return false;}
 else if(ii>0 && v=='vc'){ window.location="SalesaEntryMt.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&act="+document.getElementById("act").value+"&hq="+document.getElementById("hq").value+"&y="+document.getElementById("y").value+"&q="+document.getElementById("q").value+"&ii="+ii+"&vc=1&fc=0&cc="+document.getElementById("cc").value+"&di="+document.getElementById("di").value+"&gi="+document.getElementById("gi").value+"&EHq="+document.getElementById("EHq").value+"&myh="+document.getElementById("myh").value+"&myt="+document.getElementById("myt").value; }
else if(ii>0 && v=='fc'){window.location="SalesaEntryMt.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&act="+document.getElementById("act").value+"&hq="+document.getElementById("hq").value+"&y="+document.getElementById("y").value+"&q="+document.getElementById("q").value+"&ii="+ii+"&vc=0&fc=1&cc="+document.getElementById("cc").value+"&di="+document.getElementById("di").value+"&gi="+document.getElementById("gi").value+"&EHq="+document.getElementById("EHq").value+"&myh="+document.getElementById("myh").value+"&myt="+document.getElementById("myt").value; }
else if(ii=='All_2' && v=='fc'){window.location="SalesaEntryMt.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&act="+document.getElementById("act").value+"&hq="+document.getElementById("hq").value+"&y="+document.getElementById("y").value+"&q="+document.getElementById("q").value+"&ii="+ii+"&vc=0&fc=1&cc="+document.getElementById("cc").value+"&di="+document.getElementById("di").value+"&gi="+document.getElementById("gi").value+"&EHq="+document.getElementById("EHq").value+"&myh="+document.getElementById("myh").value+"&myt="+document.getElementById("myt").value; }
}


function ClickAllProd(ii,v)
{
  if(v=='ac'){window.location="SalesaEntryMt.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&act="+document.getElementById("act").value+"&hq="+document.getElementById("hq").value+"&y="+document.getElementById("y").value+"&q="+document.getElementById("q").value+"&ac=1&vc=0&fc=0&cc="+document.getElementById("cc").value+"&di="+document.getElementById("di").value+"&gi="+document.getElementById("gi").value+"&EHq="+document.getElementById("EHq").value+"&myh="+document.getElementById("myh").value+"&myt="+document.getElementById("myt").value+"&ii="+ii; }
}

function ChangePerMi(hq,v)
{
  var myt=1; window.location="SalesaEntryPerMi.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&act="+document.getElementById("act").value+"&hq="+hq+"&y="+v+"&q="+document.getElementById("q").value+"&ii="+document.getElementById("ii").value+"&vc="+document.getElementById("vc").value+"&fc="+document.getElementById("fc").value+"&cc="+document.getElementById("cc").value+"&di="+document.getElementById("di").value+"&gi="+document.getElementById("gi").value+'&EHq='+document.getElementById("EHq").value+'&myh='+document.getElementById("myh").value+'&myt='+myt; 
}

function ChangeYear(v)
{  window.location="SalesaEntryMt.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&act="+document.getElementById("act").value+"&hq="+document.getElementById("hq").value+"&y="+v+"&q="+document.getElementById("q").value+"&ii="+document.getElementById("ii").value+"&vc="+document.getElementById("vc").value+"&fc="+document.getElementById("fc").value+"&cc="+document.getElementById("cc").value+"&di="+document.getElementById("di").value+"&gi="+document.getElementById("gi").value+"&EHq="+document.getElementById("EHq").value+"&myh="+document.getElementById("myh").value+"&myt="+document.getElementById("myt").value; 
}

function ChangeQtr(v)
{ window.location="SalesaEntryMt.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&act="+document.getElementById("act").value+"&hq="+document.getElementById("hq").value+"&y="+document.getElementById("y").value+"&q="+v+"&ii="+document.getElementById("ii").value+"&vc="+document.getElementById("vc").value+"&fc="+document.getElementById("fc").value+"&cc="+document.getElementById("cc").value+"&di="+document.getElementById("di").value+"&gi="+document.getElementById("gi").value+"&EHq="+document.getElementById("EHq").value+"&myh="+document.getElementById("myh").value+"&myt="+document.getElementById("myt").value;
}

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
  
   
  var M1A=parseFloat(document.getElementById(nhq+'_'+eId+'M1_Ae'+sn).value); 
  var M2A=parseFloat(document.getElementById(nhq+'_'+eId+'M2_Ae'+sn).value); 
  var M3A=parseFloat(document.getElementById(nhq+'_'+eId+'M3_Ae'+sn).value); 
  var M4A=parseFloat(document.getElementById(nhq+'_'+eId+'M4_Ae'+sn).value); 
  var M1B=parseFloat(document.getElementById(nhq+'_'+eId+'M1_Be'+sn).value); 
  var M2B=parseFloat(document.getElementById(nhq+'_'+eId+'M2_Be'+sn).value); 
  var M3B=parseFloat(document.getElementById(nhq+'_'+eId+'M3_Be'+sn).value); 
  var M4B=parseFloat(document.getElementById(nhq+'_'+eId+'M4_Be'+sn).value); 
  var M1C=parseFloat(document.getElementById(nhq+'_'+eId+'M1_Ce'+sn).value); 
  var M2C=parseFloat(document.getElementById(nhq+'_'+eId+'M2_Ce'+sn).value); 
  var M3C=parseFloat(document.getElementById(nhq+'_'+eId+'M3_Ce'+sn).value); 
  var M4C=parseFloat(document.getElementById(nhq+'_'+eId+'M4_Ce'+sn).value); 
  var Mn1A=document.getElementById(nhq+'_'+eId+'M1_Ae'+sn).value; 
  var Mn2A=document.getElementById(nhq+'_'+eId+'M2_Ae'+sn).value; 
  var Mn3A=document.getElementById(nhq+'_'+eId+'M3_Ae'+sn).value; 
  var Mn4A=document.getElementById(nhq+'_'+eId+'M4_Ae'+sn).value; 
  var Mn1B=document.getElementById(nhq+'_'+eId+'M1_Be'+sn).value; 
  var Mn2B=document.getElementById(nhq+'_'+eId+'M2_Be'+sn).value; 
  var Mn3B=document.getElementById(nhq+'_'+eId+'M3_Be'+sn).value; 
  var Mn4B=document.getElementById(nhq+'_'+eId+'M4_Be'+sn).value;
  var Mn1C=document.getElementById(nhq+'_'+eId+'M1_Ce'+sn).value; 
  var Mn2C=document.getElementById(nhq+'_'+eId+'M2_Ce'+sn).value; 
  var Mn3C=document.getElementById(nhq+'_'+eId+'M3_Ce'+sn).value; 
  var Mn4C=document.getElementById(nhq+'_'+eId+'M4_Ce'+sn).value;    
  
  if(Mn1A==''){var n1A=0;}else{var n1A=M1A;} if(Mn2A==''){var n2A=0;}else{var n2A=M2A;} if(Mn3A==''){var n3A=0;}else{var n3A=M3A;} if(Mn4A==''){var n4A=0;}else{var n4A=M4A;} 
  if(Mn1B==''){var n1B=0;}else{var n1B=M1B;} if(Mn2B==''){var n2B=0;}else{var n2B=M2B;} if(Mn3B==''){var n3B=0;}else{var n3B=M3B;} if(Mn4B==''){var n4B=0;}else{var n4B=M4B;}
  if(Mn1C==''){var n1C=0;}else{var n1C=M1C;} if(Mn2C==''){var n2C=0;}else{var n2C=M2C;} if(Mn3C==''){var n3C=0;}else{var n3C=M3C;} if(Mn4C==''){var n4C=0;}else{var n4C=M4C;} 
   var TotA=Math.round((n1A+n2A+n3A+n4A)*100)/100; var TotB=Math.round((n1B+n2B+n3B+n4B)*100)/100; var TotC=Math.round((n1C+n2C+n3C+n4C)*100)/100; 
  document.getElementById("TotAValueM").value=TotA; document.getElementById("TotBValueM").value=TotB; 
  document.getElementById("TotCValueM").value=TotC; document.getElementById("Sno").value=sn; 
  document.getElementById("MainSelTerrId").value=eId; document.getElementById("sgi").value=gi; 
  document.getElementById("nhq").value=nhq;
  var url = 'SlctSalesProdDealAppMt.php';  var pars = 'Action=AddMonth&p='+PId+'&e='+EId+'&m1A='+n1A+'&m2A='+n2A+'&m3A='+n3A+'&m4A='+n4A+'&m1B='+n1B+'&m2B='+n2B+'&m3B='+n3B+'&m4B='+n4B+'&m1C='+n1C+'&m2C='+n2C+'&m3C='+n3C+'&m4C='+n4C+'&TotA='+TotA+'&TotB='+TotB+'&TotC='+TotC+'&yi='+yi+'&eId='+eId+'&sn='+sn+'&hi='+hq+'&ii='+ii+'&rn='+rn+'&gi='+gi+'&c='+ComId+'&nhq='+nhq;     
  var myAjax = new Ajax.Request( url, { method: 'post', parameters: pars, onComplete: show_AddMonth });  
}
function show_AddMonth(originalRequest)
{ document.getElementById('AddMonthResult').innerHTML = originalRequest.responseText;
  var Sno=document.getElementById('Sno').value; var ii=document.getElementById('ii').value;
  var eId=document.getElementById('MainSelTerrId').value; var gi=document.getElementById('sgi').value; 
  var nhq=document.getElementById('nhq').value;
  var TotalA=document.getElementById(nhq+'_'+eId+'TotP1d_'+Sno).value=document.getElementById('TotAValueM').value; 
  var TotalB=document.getElementById(nhq+'_'+eId+'TotP2d_'+Sno).value=document.getElementById('TotBValueM').value;   
  var TotalC=document.getElementById(nhq+'_'+eId+'TotP3d_'+Sno).value=document.getElementById('TotCValueM').value; 
  for(var i=1; i<=4; i++)
  {
    document.getElementById(nhq+'_'+eId+'M'+i+'_Be'+Sno).style.background='#B6FF6C';
	document.getElementById(nhq+'_'+eId+'M'+i+'_Ce'+Sno).style.background='#B6FF6C';
  } 
   
  /*document.getElementById('M1_B'+Sno).value=document.getElementById("Tot21P").value; 
  document.getElementById('M2_B'+Sno).value=document.getElementById("Tot22P").value;  
  document.getElementById('M3_B'+Sno).value=document.getElementById("Tot23P").value; 
  document.getElementById('M4_B'+Sno).value=document.getElementById("Tot24P").value;
  document.getElementById('M1_C'+Sno).value=document.getElementById("Tot31P").value; 
  document.getElementById('M2_C'+Sno).value=document.getElementById("Tot32P").value; 
  document.getElementById('M3_C'+Sno).value=document.getElementById("Tot33P").value; 
  document.getElementById('M4_C'+Sno).value=document.getElementById("Tot34P").value; 
  document.getElementById('TotP2_'+Sno).value=document.getElementById("PTot2P").value; 
  document.getElementById('TotP3_'+Sno).value=document.getElementById("PTot3P").value;*/ 
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
   /*document.getElementById('TotP1_TB').value=document.getElementById("Tot21T").value; 
   document.getElementById('TotP2_TB').value=document.getElementById("Tot22T").value; 
   document.getElementById('TotP3_TB').value=document.getElementById("Tot23T").value; 
   document.getElementById('TotP4_TB').value=document.getElementById("Tot24T").value; 
   document.getElementById('TotP1_TC').value=document.getElementById("Tot31T").value; 
   document.getElementById('TotP2_TC').value=document.getElementById("Tot32T").value; 
   document.getElementById('TotP3_TC').value=document.getElementById("Tot33T").value; 
   document.getElementById('TotP4_TC').value=document.getElementById("Tot34T").value; 
   document.getElementById('TotM_BeT').value=document.getElementById("TTot2T").value; 
   document.getElementById('TotM_CeT').value=document.getElementById("TTot3T").value; */
  }  
  document.getElementById(nhq+"_"+eId+"EditBtn_"+Sno).style.display='block';  
  document.getElementById(nhq+"_"+eId+"SaveBtn_"+Sno).style.display='none'; 
}

function ClickFSL2(e,y,g)
{  
 var ActSn=document.getElementById("ActualSn").value;
 if(ActSn>0)
 {
  for(var i=1; i<=ActSn; i++)
  { var va1=parseFloat(document.getElementById("TotP2_"+i).value); 
    var va2=parseFloat(document.getElementById("STotP2_"+i).value);
	var vb1=parseFloat(document.getElementById("TotP3_"+i).value); 
	var vb2=parseFloat(document.getElementById("STotP3_"+i).value);  
	if(va1<va2){alert("Please check product value, your product value equal or more then from reporting values"); return false;}
	if(vb1<vb2){alert("Please check product value, your product value equal or more then from reporting values"); return false;}
  }
}
   var win = window.open("SbOpenaFile.php?CheckAct=Fsb2&y="+y+"&e="+e+"&g="+g,"QForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=620,height=300");
   var timer = setInterval( function() { if(win.closed) { clearInterval(timer);  window.location="SalesaEntryMt.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&act="+document.getElementById("act").value+"&hq="+document.getElementById("hq").value+"&y="+y+"&q="+document.getElementById("q").value+"&ii=0&vc=0&fc=0&ac=1&cc="+document.getElementById("cc").value+"&di="+document.getElementById("di").value+"&gi="+document.getElementById("gi").value+'&EHq='+document.getElementById("EHq").value+'&myh=1&myt='+document.getElementById("myt").value; } }, 1000);
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
		   
<?php //**************************************************************************************** ?>	   
		     <table border="0" id="Activity">
			  <tr>
			     <td id="Anni" valign="top" style="width:5px;"></td>
				 <td colspan="2" width="100%" valign="top">
				  <table border="0">
<?php //********************** Start ********************************************************* ?>		
<?php 
$SpP=mysql_query("select GradeId,DepartmentId,HqId from hrm_employee_general where EmployeeID=".$EmployeeId, $con); 
$resSpP=mysql_fetch_assoc($SpP); $SpEG=mysql_query("select GradeValue from hrm_grade where CompanyId=".$CompanyId." AND GradeId=".$resSpP['GradeId'], $con); $resSpEG=mysql_fetch_assoc($SpEG);
?>		
<input type="hidden" name="ComId" id="ComId" value="<?php echo $CompanyId; ?>" /><input type="hidden" id="EmpId" name="EmpId" value="<?php echo $EmployeeId; ?>" /><input type="hidden" id="act" value="<?php echo $_REQUEST['act']; ?>" /><input type="hidden" name="y" id="y" value="<?php echo $_REQUEST['y']; ?>" /><input type="hidden" name="hq" id="hq" value="<?php echo $_REQUEST['hq']; ?>" /><input type="hidden" name="q" id="q" value="<?php echo $_REQUEST['q']; ?>" /><input type="hidden" name="vc" id="vc" value="<?php echo $_REQUEST['vc']; ?>" /><input type="hidden" name="fc" id="fc" value="<?php echo $_REQUEST['fc']; ?>" /><input type="hidden" id="di" value="<?php echo $_REQUEST['di']; ?>" /><input type="hidden" id="gi" value="<?php echo $_REQUEST['gi']; ?>" /><input type="hidden" id="cc" value="<?php echo $_REQUEST['cc']; ?>" /><input type="hidden" id="ActThought" value="0" /><input type="hidden" id="ii" value="<?php echo $_REQUEST['ii']; ?>" /><input type="hidden" id="EHq" value="<?php echo $_REQUEST['EHq']; ?>" /><input type="hidden" id="TotAValueM" value="" /><input type="hidden" id="TotBValueM" value="" /><input type="hidden" id="TotCValueM" value="" /><input type="hidden" id="MainSelTerrId" value="" /><input type="hidden" id="Sno" value="" /><input type="hidden" id="myh" value="<?php echo $_REQUEST['myh']; ?>" /><input type="hidden" id="myt" value="<?php echo $_REQUEST['myt']; ?>" /><input type="hidden" id="HqV" value="<?php echo $_REQUEST['hq']; ?>" /><input type="hidden" id="sgi" value="" /><input type="hidden" id="nhq" value="" />
<?php $sqlCPerMi=mysql_query("select EditPerMi from hrm_sales_reporting_level where EmployeeID=".$EmployeeId,$con); $resCPerMi=mysql_fetch_assoc($sqlCPerMi); $sHq2=mysql_query("select HqId from hrm_sales_hq_temp where EmployeeID=".$EmployeeId." AND HqTEmpStatus='A' AND HqId!=".$resSpP['HqId'], $con); $rowHq2=mysql_num_rows($sHq2);
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
		 <td>
		 <table>
		 <tr>
<td align="center"><img src="images/PlannerA.png" border="0" style="height:40px;width:150px;"/></td>
<td>&nbsp;</td>
<?php $sHq=mysql_query("select hqt.HqId,HqName from hrm_sales_hq_temp hqt INNER JOIN hrm_headquater hq ON hqt.HqId=hq.HqId where hqt.EmployeeID=".$EmployeeId." AND hqt.HqTEmpStatus='A' order by HqName ASC", $con); $rowHq=mysql_num_rows($sHq); 
if($rowHq>0){ ?>
<td align="center" valign="bottom">
<?php $sn=1; while($resHq=mysql_fetch_assoc($sHq)){ ?>
<a href="#" onClick="ChangeHq(<?php echo $resHq['HqId'].', '.$_REQUEST['y'].','.$sn; ?>)" style="text-decoration:none;">
 <font style="color:#FF8000;font-family:Times New Roman;font-size:16px;font-weight:bold;">
 <u><?php echo $resHq['HqName']; ?></u>
 </font>&nbsp;&nbsp;
</a>
<?php $sn++; } ?>
</td>
<?php } ?>		 

<?php if($_REQUEST['act']>0){ ?>
<td>&nbsp;</td><td align="center" valign="bottom">
<?php if($_REQUEST['myt']==0){ ?><a href="#"><img src="images/Myteam.png" border="0" style="height:30px;width:130px;"  /></a><?php } elseif($_REQUEST['myt']==1){ ?><a href="#"><img src="images/Myteam1.png" border="0" style="height:30px;width:130px;"/></a><?php } ?>
</td>
<td>&nbsp;</td><td align="center" valign="bottom">
<a href="#" onClick="ChangePerMi(<?php echo $resSpP['HqId'].', '.$_REQUEST['y']; ?>)"><img src="images/Permission.png" border="0" style="height:30px;width:130px;"  /></a>
</td>
<?php } ?>		 
		 </tr>
		 </table>
		 </td>
		 </tr>
		 <tr>	
		 <td>
		 <table>
		 <tr>
	<td>&nbsp;</td>
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
	<td style="font-family:Times New Roman;font-size:14px;font-weight:bold;color:#FFFFC6;" valign="bottom">Year:</b><select style="font-family:Times New Roman;font-size:14px;width:90px;background-color:#E4E0FC;height:23px;font-weight:bold;" id="YearV" onChange="ChangeYear(this.value)"><?php $sqlye=mysql_query("select YearId,FromDate,ToDate from hrm_sales_year where YearId=".$_REQUEST['y'], $con); $resye=mysql_fetch_assoc($sqlye); $FFromDate=date("Y",strtotime($resye['FromDate'])); $TToDate=date("Y",strtotime($resye['ToDate'])); ?><option value="<?php echo $resye['YearId']; ?>" selected><?php echo $FFromDate.'-'.$TToDate; ?></option><?php if($_REQUEST['y']==$YearId){?><option value="<?php echo $Ymin1; ?>"><?php echo $FYmin1.'-'.$TYmin1; ?></option><option value="<?php echo $Ymin2; ?>"><?php echo $FYmin2.'-'.$TYmin2; ?></option><?php } elseif($_REQUEST['y']!=$YearId) { ?><option value="<?php echo $YearId; ?>"><?php echo $FUpy.'-'.$TUpy; ?></option><?php if($_REQUEST['y']!=$Ymin1){?><option value="<?php echo $Ymin1; ?>"><?php echo $FYmin1.'-'.$TYmin1; ?></option><?php } ?><?php if($_REQUEST['y']!=$Ymin2){?><option value="<?php echo $Ymin2; ?>"><?php echo $FYmin2.'-'.$TYmin2; ?></option><?php } } ?>
</select>	
	</td>
	<td>&nbsp;</td>
	<td style="font-family:Times New Roman;font-size:14px;font-weight:bold;color:#FFFFC6;" valign="bottom">VC :</b><select style="font-family:Times New Roman;font-size:14px;width:140px;background-color:#C4FFC4;height:23px;font-weight:bold;" id="ItemV" onChange="ChangeItem(this.value,'vc')"><?php if($_REQUEST['vc']!=0){$sqlI=mysql_query("select ItemName from hrm_sales_seedsitem where ItemId=".$_REQUEST['ii'], $con); $resI=mysql_fetch_assoc($sqlI);?><option value="<?php echo $_REQUEST['ii']; ?>" selected><?php echo strtoupper($resI['ItemName']); ?></option><?php }else{ ?><option value="0" selected>SELECT</option><?php } ?><?php $sqlItem=mysql_query("select * from hrm_sales_seedsitem where GroupId=1 order by ItemName ASC", $con); while($resItem=mysql_fetch_assoc($sqlItem)){ ?><option value="<?php echo $resItem['ItemId']; ?>"><?php echo $resItem['ItemName']; ?></option><?php } /* ?><option value="All_1"> --- All ---</option><?php */ ?></select>
	<input type="hidden" id="ValueItem" value="<?php echo $_REQUEST['ii']; ?>" /><input type="hidden" id="ValueName" value="<?php if($_REQUEST['vc']>0){echo 'vc';}elseif($_REQUEST['fc']>0){echo 'fc';} ?>" />	
    </td>
	<td>&nbsp;</td>
	<td style="font-family:Times New Roman;font-size:14px;font-weight:bold;color:#FFFFC6;" valign="bottom">FC :</b><select style="font-family:Times New Roman;font-size:14px;width:140px;background-color:#C4FFC4;height:23px;font-weight:bold;" id="ItemV2" onChange="ChangeItem(this.value,'fc')"><?php if($_REQUEST['fc']!=0 AND $_REQUEST['ii']!='All_2'){$sqlIf=mysql_query("select ItemName from hrm_sales_seedsitem where ItemId=".$_REQUEST['ii'], $con); $resIf=mysql_fetch_assoc($sqlIf);?><option value="<?php echo $_REQUEST['ii']; ?>" selected><?php echo strtoupper($resIf['ItemName']); ?></option><?php } elseif($_REQUEST['fc']!=0 AND $_REQUEST['ii']=='All_2'){?><option value="<?php echo $_REQUEST['ii']; ?>" selected>--- All ---</option><?php } else{ ?><option value="0" selected>SELECT</option><?php } ?><?php $sqlItemf=mysql_query("select * from hrm_sales_seedsitem where GroupId=2 order by ItemName ASC", $con); while($resItemf=mysql_fetch_assoc($sqlItemf)){ ?> 
 <option value="<?php echo $resItemf['ItemId']; ?>"><?php echo $resItemf['ItemName']; ?></option><?php } ?><option value="All_2"> --- All ---</option></select>
   </td>
   <?php /*
   <td style="font-family:Times New Roman;font-size:14px;font-weight:bold;" valign="bottom">&nbsp;<a href="#" onClick="ClickAllProd(0,'ac')" style="color:#FFFF80">Over All-Crop/My-Team</a></td> */ ?>	
   
   <script>
function ChangeTotal(hq,v)
{
  window.location="SalesaEntryMt.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=TotalNo&act="+document.getElementById("act").value+"&hq="+hq+"&y="+v+"&q="+document.getElementById("q").value+"&ii="+document.getElementById("ii").value+"&vc="+document.getElementById("vc").value+"&fc="+document.getElementById("fc").value+"&cc="+document.getElementById("cc").value+"&di="+document.getElementById("di").value+"&gi="+document.getElementById("gi").value+"&EHq="+document.getElementById("EHq").value+"&myh="+document.getElementById("myh").value+"&myt="+document.getElementById("myt").value+'&SelectV=TotalNo'; 

}

function ChangeTeamS(Tte,hq,v)
{
  window.location="SalesaEntryMt.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&act="+document.getElementById("act").value+"&hq="+hq+"&y="+v+"&q="+document.getElementById("q").value+"&ii="+document.getElementById("ii").value+"&vc="+document.getElementById("vc").value+"&fc="+document.getElementById("fc").value+"&cc="+document.getElementById("cc").value+"&di="+document.getElementById("di").value+"&gi="+document.getElementById("gi").value+"&EHq="+document.getElementById("EHq").value+"&myh="+document.getElementById("myh").value+"&myt="+document.getElementById("myt").value+'&SelectV=TeamEmpNo&TeamEmpVV='+Tte;
}

</script>

   <td>&nbsp;</td><td align="center" valign="bottom">
         <a href="#" onClick="ChangeTotal(<?php echo $_REQUEST['hq'].', '.$_REQUEST['y']; ?>)"><font style="color:#fff;font-family:Times New Roman;font-size:16px;font-weight:bold;">
 <u>TOTAL My-TEAM</u></font></a></td>
         <td>&nbsp;</td>
		 
		 <td align="center" valign="top">
         <select style="font-family:Times New Roman;font-size:14px;width:200px;background-color:#C4FFC4;height:23px;font-weight:bold;" id="ItemV2" onChange="ChangeTeamS(this.value,<?php echo $_REQUEST['hq'].', '.$_REQUEST['y']; ?>)"><option>Select Territory</option><?php  $sqlRepHq = mysql_query("select e.EmployeeID,Fname,Sname,Lname,Gender,DR,Married,GradeId,hqt.HqId,HqName from hrm_employee_general g INNER JOIN hrm_sales_hq_temp hqt ON g.EmployeeID=hqt.EmployeeID INNER JOIN hrm_headquater hq ON hqt.HqId=hq.HqId INNER JOIN hrm_employee_personal p ON g.EmployeeID=p.EmployeeID INNER JOIN hrm_employee e ON hqt.EmployeeID=e.EmployeeID where (hqt.EmployeeID=".$EmployeeId." OR g.RepEmployeeID=".$EmployeeId.") AND g.DepartmentId=6 AND hqt.HqTEmpStatus='A' group by e.EmployeeID order by g.EmployeeID ASC", $con); while($resRepHq=mysql_fetch_array($sqlRepHq)){ if($resRepHq['DR']=='Y'){$M='Dr.';} elseif($resRepHq['Gender']=='M'){$M='Mr.';} elseif($resRepHq['Gender']=='F' AND $resRepHq['Married']=='Y'){$M='Mrs.';} elseif($resRepHq['Gender']=='F' AND $resRepHq['Married']=='N'){$M='Miss.';} $Ename=$resRepHq['Fname'].' '.$resRepHq['Sname'].' '.$resRepHq['Lname'];?><option value="<?php echo $resRepHq['EmployeeID']; ?>"><?php echo $Ename; ?></option><?php } ?>
		 </select>
		 </td>

		 </tr>
		 </table>
		 </td>
   </tr>
 </table>
	   </td>
	  </tr>
<tr><td><span id="DealerHqSpan"></span></td></tr>
  </table>
 </td>
</tr>
<?php /***************************************** Main Page Open **************************************/ ?>
<?php $sqlCoc=mysql_query("select * from hrm_sales_planshow where PlanshowId=1",$con); $resCoc=mysql_fetch_assoc($sqlCoc); 
      $EntP=$resCoc['EntryPlan']; $RslP=$resCoc['ResultPlan']; ?>
<?php if($_REQUEST['act']>0){ //if($_REQUEST['act']==0){ ?>
<tr>
 <td>
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
	  
	  
<?php if($_REQUEST['ernS']=='TotalNo'){?>	  
	  
<table border="1" cellpadding="0" cellspacing="0" style="font-family:Times New Roman;font-size:14px;width:<?php if($_REQUEST['ii']=='All_1' OR $_REQUEST['ii']=='All_2' OR $_REQUEST['ac']==1){ echo '1300px';}else{echo '1200px';}?>;">	
  <tr>
  <td colspan="<?php if($_REQUEST['ii']=='All_1' OR $_REQUEST['ii']=='All_2' OR $_REQUEST['ac']==1){echo 3;}else{echo 2;}?>" align="center" style="height:25px;background-color:#005300;font-family:Times New Roman;font-size:16px;color:#FFFF20;font-weight:bold;" id="TD_<?php echo $counter; ?>">  <font color="#D7EBFF">Crop:</font>&nbsp;<?php echo $ItemN; ?>
  </td>
  <td colspan="24" style="height:25px;background-color:#005300;font-family:Times New Roman;font-size:16px;color:#FFFF20;font-weight:bold;" id="TD_<?php echo $counter; ?>">
   &nbsp;<font color="#D7EBFF">Team:&nbsp;</font>ALL MY TEAM&nbsp;&nbsp;&nbsp;
   <?php /*
   &nbsp;<font color="#D7EBFF">Quarter:&nbsp;</font><?php echo '0'.$_REQUEST['q']; ?>&nbsp;&nbsp;&nbsp;
   */ ?>
   &nbsp;<font color="#D7EBFF">Year:&nbsp;</font><?php echo $FFromDate.'-'.$TToDate; //$fromdate.'-'.$todate; ?>
   
   &nbsp;&nbsp;&nbsp;
   <?php if($_REQUEST['ac']==1){ ?>
   <?php $sqlSb=mysql_query("select * from hrm_sales_emp_action where EmployeeID=".$EmployeeId." AND YearId=".$_REQUEST['y']." AND StatusB=1", $con); $rowSb=mysql_num_rows($sqlSb); ?><input type="button" style="font-family:Times New Roman;width:100px;height:25px;font-weight:bold;" value="Final Submit" onClick="ClickFSL2(<?php echo $EmployeeId.', '.$_REQUEST['y'].', '.$resSpP['GradeId']; ?>)" <?php if($rowSb>0){echo 'disabled';}else{echo '';}?>/><?php } ?>
   </td>
  </tr>
  <tr style="background-color:#D5F1D1;color:#000000;">
 <td colspan="<?php if($_REQUEST['ii']=='All_1' OR $_REQUEST['ii']=='All_2' OR $_REQUEST['ac']==1){echo 3;}else{echo 2;}?>" align="center" style="font-size:16px;color:#FFFFFF;background-color:#183E83;">
<b><?php echo "ALL MY TEAM"; ?></b> </td>
<td colspan="4" align="center"><b>Quarter 1</b></td><td colspan="4" align="center"><b>Quarter 2</b></td>
<td colspan="4" align="center"><b>Quarter 3</b></td><td colspan="4" align="center"><b>Quarter 4</b></td>
<td colspan="4" align="center" style="background-color:#D9D9FF;"><b>TOTAL</b></td>
<td colspan="2" align="center" style="background-color:#D7FFAE;"><b>REVISED</b></td>
  </tr>	
   <tr style="background-color:#D5F1D1;color:#000000;">
<?php if($_REQUEST['ii']=='All_1' OR $_REQUEST['ii']=='All_2' OR $_REQUEST['ac']==1){ ?>   
    <td align="center" style="width:100px;font-size:12px;"><b>CROP</b></td>
<?php } ?>	
	<td align="center" style="width:120px;font-size:12px;"><b>VARIETY</b></td>
	<td align="center" style="width:30px;font-size:12px;"><b>&nbsp;TYPE&nbsp;</b></td>
	<?php for($i=1; $i<=5; $i++){?>
	 <td class="Trh60"><?php echo $y0T.'<br>'.$y0; ?></td><td class="Trh60"><?php echo $y1T.'<br>'.$y1; ?></td>
	 <td class="Trh60"><?php echo '<font color="#A60053">Suggest</font><br>'.$y2; ?></td>
	<?php if($RslP=='Y'){ ?><td class="Trh60"><?php echo $y1T.'<br>'.$y2; ?></td><?php } ?>
	<?php if($EntP=='Y'){ ?><td class="Trh60"><?php echo '<font color="#A60053">Suggest</font><br>'.$y3; ?></td><?php } ?>
	<?php } ?>
	<td class="Trh60"><?php echo $y2T.'<br>'.$y2; ?></td><td class="Trh60"><?php echo $y3T.'<br>'.$y3; ?></td>
   </tr>
   
<?php $stl = mysql_query("SELECT * FROM hrm_sales_tlemp where TLRepId=".$EmployeeId." AND TLStatus='A'", $con);
      $rtl = mysql_num_rows($stl); ?>   
   	
<?php if($_REQUEST['ii']!='All_1' AND $_REQUEST['ii']!='All_2' AND $_REQUEST['ii']!=0){$sql = mysql_query("select sp.ItemId,ProductId,ProductName,ItemName,TypeName from hrm_sales_seedsproduct sp INNER JOIN hrm_sales_seedsitem si ON sp.ItemId=si.ItemId INNER JOIN hrm_sales_seedtype st ON sp.TypeId=st.TypeId where si.ItemId=".$_REQUEST['ii']." order by ItemName ASC, TypeName ASC, ProductName ASC", $con);}
      elseif($_REQUEST['ii']=='All_1'){$sql = mysql_query("select sp.ItemId,ProductId,ProductName,ItemName,TypeName from hrm_sales_seedsproduct sp INNER JOIN hrm_sales_seedsitem si ON sp.ItemId=si.ItemId INNER JOIN hrm_sales_seedtype st ON sp.TypeId=st.TypeId where si.GroupId=1 order by ItemName ASC, TypeName ASC, ProductName ASC", $con);}
	  elseif($_REQUEST['ii']=='All_2'){$sql = mysql_query("select sp.ItemId,ProductId,ProductName,ItemName,TypeName from hrm_sales_seedsproduct sp INNER JOIN hrm_sales_seedsitem si ON sp.ItemId=si.ItemId INNER JOIN hrm_sales_seedtype st ON sp.TypeId=st.TypeId where si.GroupId=2 order by ItemName ASC, TypeName ASC, ProductName ASC", $con);} 
	  elseif($_REQUEST['ii']==0 AND $_REQUEST['ac']==1){$sql = mysql_query("select sp.ItemId,ProductId,ProductName,ItemName,TypeName from hrm_sales_seedsproduct sp INNER JOIN hrm_sales_seedsitem si ON sp.ItemId=si.ItemId INNER JOIN hrm_sales_seedtype st ON sp.TypeId=st.TypeId where (si.GroupId=1 OR si.GroupId=2) order by ItemName ASC, TypeName ASC, ProductName ASC", $con);} 
 $Sn=1; while($res=mysql_fetch_array($sql)){ 
 
/*** TeamLease Employee Open ***/
 if($rtl>0)
 { 
  $sqlP0a=mysql_query("select SUM(M1_Ach) as sM1,SUM(M2_Ach) as sM2,SUM(M3_Ach) as sM3,SUM(M4_Ach) as sM4,SUM(M5_Ach) as sM5,SUM(M6_Ach) as sM6,SUM(M7_Ach) as sM7,SUM(M8_Ach) as sM8,SUM(M9_Ach) as sM9,SUM(M10_Ach) as sM10,SUM(M11_Ach) as sM11,SUM(M12_Ach) as sM12 from hrm_sales_sal_details_".$Before2YId." sd INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_sales_tlemp tl ON d.HqId=tl.TLHq where TLStatus='A' AND tl.TLRepId=".$EmployeeId." AND sd.ProductId=".$res['ProductId']." AND sd.YearId=".$Before2YId, $con); $resP0a=mysql_fetch_assoc($sqlP0a);
  $sqlP1a=mysql_query("select SUM(M1_Ach) as sM1,SUM(M2_Ach) as sM2,SUM(M3_Ach) as sM3,SUM(M4_Ach) as sM4,SUM(M5_Ach) as sM5,SUM(M6_Ach) as sM6,SUM(M7_Ach) as sM7,SUM(M8_Ach) as sM8,SUM(M9_Ach) as sM9,SUM(M10_Ach) as sM10,SUM(M11_Ach) as sM11,SUM(M12_Ach) as sM12 from hrm_sales_sal_details_".$BeforeYId." sd INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_sales_tlemp tl ON d.HqId=tl.TLHq where TLStatus='A' AND tl.TLRepId=".$EmployeeId." AND sd.ProductId=".$res['ProductId']." AND sd.YearId=".$BeforeYId, $con); $resP1a=mysql_fetch_assoc($sqlP1a);
  $sqlPcha=mysql_query("select SUM(M1_Ach) as sM1,SUM(M2_Ach) as sM2,SUM(M3_Ach) as sM3,SUM(M4_Ach) as sM4,SUM(M5_Ach) as sM5,SUM(M6_Ach) as sM6,SUM(M7_Ach) as sM7,SUM(M8_Ach) as sM8,SUM(M9_Ach) as sM9,SUM(M10_Ach) as sM10,SUM(M11_Ach) as sM11,SUM(M12_Ach) as sM12 from hrm_sales_sal_details_".$_REQUEST['y']." sd INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_sales_tlemp tl ON d.HqId=tl.TLHq where TLStatus='A' AND tl.TLRepId=".$EmployeeId." AND sd.ProductId=".$res['ProductId']." AND sd.YearId=".$_REQUEST['y'], $con); $resPcha=mysql_fetch_assoc($sqlPcha);
 }
/*** TeamLease Employee CLose ***/
 
$sqlP0=mysql_query("select SUM(M1_Ach) as sM1,SUM(M2_Ach) as sM2,SUM(M3_Ach) as sM3,SUM(M4_Ach) as sM4,SUM(M5_Ach) as sM5,SUM(M6_Ach) as sM6,SUM(M7_Ach) as sM7,SUM(M8_Ach) as sM8,SUM(M9_Ach) as sM9,SUM(M10_Ach) as sM10,SUM(M11_Ach) as sM11,SUM(M12_Ach) as sM12 from hrm_sales_sal_details_".$Before2YId." sd INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_sales_hq_temp hqt ON d.HqId=hqt.HqId INNER JOIN hrm_sales_reporting_level rl ON hqt.EmployeeID=rl.EmployeeID where HqTEmpStatus='A' AND (hqt.EmployeeID=".$EmployeeId." OR rl.R1=".$EmployeeId." OR rl.R2=".$EmployeeId." OR rl.R3=".$EmployeeId." OR rl.R4=".$EmployeeId." OR rl.R5=".$EmployeeId.") AND sd.ProductId=".$res['ProductId']." AND sd.YearId=".$Before2YId, $con); $resP0=mysql_fetch_assoc($sqlP0);
if($rtl>0)
{ 
$P0p1=$resP0['sM1']+$resP0['sM2']+$resP0['sM3']+$resP0a['sM1']+$resP0a['sM2']+$resP0a['sM3']; 
$P0p2=$resP0['sM4']+$resP0['sM5']+$resP0['sM6']+$resP0a['sM4']+$resP0a['sM5']+$resP0a['sM6'];
$P0p3=$resP0['sM7']+$resP0['sM8']+$resP0['sM9']+$resP0a['sM7']+$resP0a['sM8']+$resP0a['sM9']; 
$P0p4=$resP0['sM10']+$resP0['sM11']+$resP0['sM12']+$resP0a['sM10']+$resP0a['sM11']+$resP0a['sM12'];
}
else
{
$P0p1=$resP0['sM1']+$resP0['sM2']+$resP0['sM3']; $P0p2=$resP0['sM4']+$resP0['sM5']+$resP0['sM6'];
$P0p3=$resP0['sM7']+$resP0['sM8']+$resP0['sM9']; $P0p4=$resP0['sM10']+$resP0['sM11']+$resP0['sM12']; 
} 
$sqlP1=mysql_query("select SUM(M1_Ach) as sM1,SUM(M2_Ach) as sM2,SUM(M3_Ach) as sM3,SUM(M4_Ach) as sM4,SUM(M5_Ach) as sM5,SUM(M6_Ach) as sM6,SUM(M7_Ach) as sM7,SUM(M8_Ach) as sM8,SUM(M9_Ach) as sM9,SUM(M10_Ach) as sM10,SUM(M11_Ach) as sM11,SUM(M12_Ach) as sM12 from hrm_sales_sal_details_".$BeforeYId." sd INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_sales_hq_temp hqt ON d.HqId=hqt.HqId INNER JOIN hrm_sales_reporting_level rl ON hqt.EmployeeID=rl.EmployeeID where HqTEmpStatus='A' AND (hqt.EmployeeID=".$EmployeeId." OR rl.R1=".$EmployeeId." OR rl.R2=".$EmployeeId." OR rl.R3=".$EmployeeId." OR rl.R4=".$EmployeeId." OR rl.R5=".$EmployeeId.") AND sd.ProductId=".$res['ProductId']." AND sd.YearId=".$BeforeYId, $con); $resP1=mysql_fetch_assoc($sqlP1);
if($rtl>0)
{
$Pp1=$resP1['sM1']+$resP1['sM2']+$resP1['sM3']+$resP1a['sM1']+$resP1a['sM2']+$resP1a['sM3']; 
$Pp2=$resP1['sM4']+$resP1['sM5']+$resP1['sM6']+$resP1a['sM4']+$resP1a['sM5']+$resP1a['sM6'];
$Pp3=$resP1['sM7']+$resP1['sM8']+$resP1['sM9']+$resP1a['sM7']+$resP1a['sM8']+$resP1a['sM9']; 
$Pp4=$resP1['sM10']+$resP1['sM11']+$resP1['sM12']+$resP1a['sM10']+$resP1a['sM11']+$resP1a['sM12'];
}
else
{
$Pp1=$resP1['sM1']+$resP1['sM2']+$resP1['sM3']; $Pp2=$resP1['sM4']+$resP1['sM5']+$resP1['sM6'];
$Pp3=$resP1['sM7']+$resP1['sM8']+$resP1['sM9']; $Pp4=$resP1['sM10']+$resP1['sM11']+$resP1['sM12'];
}

$sqlP2=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_terr where TerrRepEmpID=".$EmployeeId." AND ProductId=".$res['ProductId']." AND YearId=".$_REQUEST['y'], $con); 
$sqlP3=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_terr where TerrRepEmpID=".$EmployeeId." AND ProductId=".$res['ProductId']." AND YearId=".$AfterYId, $con); 
$resP2=mysql_fetch_assoc($sqlP2); $resP3=mysql_fetch_assoc($sqlP3);

$sqlP2a=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_hq where HqRepEmpID=".$EmployeeId." AND ProductId=".$res['ProductId']." AND YearId=".$_REQUEST['y'], $con); 
$sqlP3a=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_hq where HqRepEmpID=".$EmployeeId." AND ProductId=".$res['ProductId']." AND YearId=".$AfterYId, $con); 
$resP2a=mysql_fetch_assoc($sqlP2a); $resP3a=mysql_fetch_assoc($sqlP3a); 

$sqlP2b=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_area where AreaRepEmpID=".$EmployeeId." AND ProductId=".$res['ProductId']." AND YearId=".$_REQUEST['y'], $con); 
$sqlP3b=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_area where AreaRepEmpID=".$EmployeeId." AND ProductId=".$res['ProductId']." AND YearId=".$AfterYId, $con); 
$resP2b=mysql_fetch_assoc($sqlP2b); $resP3b=mysql_fetch_assoc($sqlP3b);

$TotP2a=$resP2['Qa']+$resP2a['Qa']+$resP2b['Qa']; $TotP2b=$resP2['Qb']+$resP2a['Qb']+$resP2b['Qb']; 
$TotP2c=$resP2['Qc']+$resP2a['Qc']+$resP2b['Qc']; $TotP2d=$resP2['Qd']+$resP2a['Qd']+$resP2b['Qd'];
$TotP3a=$resP3['Qa']+$resP3a['Qa']+$resP3b['Qa']; $TotP3b=$resP3['Qb']+$resP3a['Qb']+$resP3b['Qb']; 
$TotP3c=$resP3['Qc']+$resP3a['Qc']+$resP3b['Qc']; $TotP3d=$resP3['Qd']+$resP3a['Qd']+$resP3b['Qd'];

$sqlPch=mysql_query("select SUM(M1_Ach) as sM1,SUM(M2_Ach) as sM2,SUM(M3_Ach) as sM3,SUM(M4_Ach) as sM4,SUM(M5_Ach) as sM5,SUM(M6_Ach) as sM6,SUM(M7_Ach) as sM7,SUM(M8_Ach) as sM8,SUM(M9_Ach) as sM9,SUM(M10_Ach) as sM10,SUM(M11_Ach) as sM11,SUM(M12_Ach) as sM12 from hrm_sales_sal_details_".$_REQUEST['y']." sd INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_sales_hq_temp hqt ON d.HqId=hqt.HqId INNER JOIN hrm_sales_reporting_level rl ON hqt.EmployeeID=rl.EmployeeID where HqTEmpStatus='A' AND (hqt.EmployeeID=".$EmployeeId." OR rl.R1=".$EmployeeId." OR rl.R2=".$EmployeeId." OR rl.R3=".$EmployeeId." OR rl.R4=".$EmployeeId." OR rl.R5=".$EmployeeId.") AND sd.ProductId=".$res['ProductId']." AND sd.YearId=".$_REQUEST['y'], $con); $resPch=mysql_fetch_assoc($sqlPch);
if($rtl>0)
{
$TP2ch1=$resPch['sM1']+$resPch['sM2']+$resPch['sM3']+$resPcha['sM1']+$resPcha['sM2']+$resPcha['sM3']; 
$TP2ch2=$resPch['sM4']+$resPch['sM5']+$resPch['sM6']+$resPcha['sM4']+$resPcha['sM5']+$resPcha['sM6']; 
$TP2ch3=$resPch['sM7']+$resPch['sM8']+$resPch['sM9']+$resPcha['sM7']+$resPcha['sM8']+$resPcha['sM9']; 
$TP2ch4=$resPch['sM10']+$resPch['sM11']+$resPch['sM12']+$resPcha['sM10']+$resPcha['sM11']+$resPcha['sM12'];
}
else
{
$TP2ch1=$resPch['sM1']+$resPch['sM2']+$resPch['sM3']; $TP2ch2=$resPch['sM4']+$resPch['sM5']+$resPch['sM6']; 
$TP2ch3=$resPch['sM7']+$resPch['sM8']+$resPch['sM9']; $TP2ch4=$resPch['sM10']+$resPch['sM11']+$resPch['sM12'];
}
$TotP2ch=$TP2ch1+$TP2ch2+$TP2ch3+$TP2ch4;

$sChk=mysql_query("select * from hrm_sales_arrange_prod sap INNER JOIN hrm_headquater hq ON sap.StateId=hq.StateId INNER JOIN hrm_sales_hq_temp hqt ON hq.HqId=hqt.HqId INNER JOIN hrm_employee_general g ON hqt.EmployeeID=g.EmployeeID INNER JOIN hrm_sales_reporting_level rl ON hqt.EmployeeID=rl.EmployeeID where ProductId=".$res['ProductId']." AND ArrgStatus='Y' AND HqTEmpStatus='A' AND (hqt.EmployeeID=".$EmployeeId." OR rl.R1=".$EmployeeId." OR rl.R2=".$EmployeeId." OR rl.R3=".$EmployeeId." OR rl.R4=".$EmployeeId." OR rl.R5=".$EmployeeId.")", $con); $rowChkP=mysql_fetch_assoc($sChk);

if($RslP=='Y'){ $a1=$TP2ch1; $a2=$TP2ch2; $a3=$TP2ch3; $a4=$TP2ch4; } 
if($EntP=='Y'){ $a1=$TotP3a; $a2=$TotP3b; $a3=$TotP3c; $a4=$TotP3d; }

if($rowChkP>0 OR $resP0['sM1']!=0 OR $resP0['sM2']!=0 OR $resP0['sM3']!=0 OR $resP0['sM4']!=0 OR $resP0['sM5']!=0 OR $resP0['sM6']!=0 OR $resP0['sM7']!=0 OR $resP0['sM8']!=0 OR $resP0['sM9']!=0 OR $resP0['sM10']!=0 OR $resP0['sM11']!=0 OR $resP0['sM12']!=0 OR $resP1['sM1']!=0 OR $resP1['sM2']!=0 OR $resP1['sM3']!=0 OR $resP1['sM4']!=0 OR $resP1['sM5']!=0 OR $resP1['sM6']!=0 OR $resP1['sM7']!=0 OR $resP1['sM8']!=0 OR $resP1['sM9']!=0 OR $resP1['sM10']!=0 OR $resP1['sM11']!=0 OR $resP1['sM12']!=0 OR $TotP2a!=0 OR $TotP2b!=0 OR $TotP2c!=0 OR $TotP2d!=0 OR $a1!=0 OR $a2!=0 OR $a3!=0 OR $a4!=0) {
?>	

   <tr bgcolor="#EEEEEE" style="height:22px;">
<?php if($_REQUEST['ii']=='All_1' OR $_REQUEST['ii']=='All_2' OR $_REQUEST['ac']==1){ ?>	  
     <td bgcolor="#FFFFFF"><input class="Inputt" style="width:100px;" value="<?php echo $res['ItemName']; ?>"/></td>
<?php } ?>		 
	 <td bgcolor="#FFFFFF"><input class="Inputt" style="width:120px;" value="<?php echo $res['ProductName']; ?>" /><input type="hidden" id="P_<?php echo $Sn; ?>" value="<?php echo $res['ProductId']; ?>" /></td>
<td bgcolor="#FFFFFF" align="center" style="font-size:12px;"><?php echo substr_replace($res['TypeName'], '', 2); ?></td>
	
<td><input class="Input" id="M1_D<?php echo $Sn; ?>" value="<?php if($P0p1!='' AND $P0p1!=0){echo $P0p1;}?>" readonly/></td>	
<td><input class="Input" id="M1_A<?php echo $Sn; ?>" value="<?php if($Pp1!='' AND $Pp1!=0){echo $Pp1;} ?>" readonly/></td>
<td><input class="Input" style="background-color:#D3FED7;" id="M1_B<?php echo $Sn; ?>" value="<?php if($TotP2a!='' AND $TotP2a!=0){echo $TotP2a;} ?>" readonly/></td>
<?php if($RslP=='Y'){ ?><td><input class="Input" style="background-color:#D3FED7;" value="<?php if($TP2ch1!=0){echo $TP2ch1;} ?>" readonly/></td><?php } ?>
<?php if($EntP=='Y'){ ?><td><input class="Input" style="background-color:#D3FED7;" id="M1_C<?php echo $Sn; ?>" value="<?php if($TotP3a!='' AND $TotP3a!=0){echo $TotP3a;} ?>" readonly/></td><?php } ?>


<td><input class="Input" id="M2_D<?php echo $Sn; ?>" value="<?php if($P0p2!='' AND $P0p2!=0){echo $P0p2;}?>" readonly/></td>
<td><input class="Input" id="M2_A<?php echo $Sn; ?>" value="<?php if($Pp2!='' AND $Pp2!=0){echo $Pp2;} ?>" readonly/></td>
<td><input class="Input" style="background-color:#D3FED7;" id="M2_B<?php echo $Sn; ?>" value="<?php if($TotP2b!='' AND $TotP2b!=0){echo $TotP2b;} ?>" readonly/></td>
<?php if($RslP=='Y'){ ?><td><input class="Input" style="background-color:#D3FED7;" value="<?php if($TP2ch2!=0){echo $TP2ch2;} ?>" readonly/></td><?php } ?>
<?php if($EntP=='Y'){ ?><td><input class="Input" style="background-color:#D3FED7;" id="M2_C<?php echo $Sn; ?>" value="<?php if($TotP3b!='' AND $TotP3b!=0){echo $TotP3b;} ?>" readonly/></td><?php } ?>


<td><input class="Input" id="M3_D<?php echo $Sn; ?>" value="<?php if($P0p3!='' AND $P0p3!=0){echo $P0p3;}?>" readonly/></td>
<td><input class="Input" id="M3_A<?php echo $Sn; ?>" value="<?php if($Pp3!='' AND $Pp3!=0){echo $Pp3;} ?>" readonly/></td>
<td><input class="Input" style="background-color:#D3FED7;" id="M3_B<?php echo $Sn; ?>" value="<?php if($TotP2c!='' AND $TotP2c!=0){echo $TotP2c;} ?>" readonly/></td>
<?php if($RslP=='Y'){ ?><td><input class="Input" style="background-color:#D3FED7;" value="<?php if($TP2ch3!=0){echo $TP2ch3;} ?>" readonly/></td><?php } ?>
<?php if($EntP=='Y'){ ?><td><input class="Input" style="background-color:#D3FED7;" id="M3_C<?php echo $Sn; ?>" value="<?php if($TotP3c!='' AND $TotP3c!=0){echo $TotP3c;} ?>" readonly/></td><?php } ?>


<td><input class="Input" id="M4_D<?php echo $Sn; ?>" value="<?php if($P0p4!='' AND $P0p4!=0){echo $P0p4;}?>" readonly/></td>
<td><input class="Input" id="M4_A<?php echo $Sn; ?>" value="<?php if($Pp4!='' AND $Pp4!=0){echo $Pp4;} ?>" readonly/></td>
<td><input class="Input" style="background-color:#D3FED7;" id="M4_B<?php echo $Sn; ?>" value="<?php if($TotP2d!='' AND $TotP2d!=0){echo $TotP2d;} ?>" readonly/></td>
<?php if($RslP=='Y'){ ?><td><input class="Input" style="background-color:#D3FED7;" value="<?php if($TP2ch4!=0){echo $TP2ch4;} ?>" readonly/></td><?php } ?>
<?php if($EntP=='Y'){ ?><td><input class="Input" style="background-color:#D3FED7;" id="M4_C<?php echo $Sn; ?>" value="<?php if($TotP3d!='' AND $TotP3d!=0){echo $TotP3d;} ?>" readonly/></td><?php } ?>

<?php $TotP0=$P0p1+$P0p2+$P0p3+$P0p4; $TotP1=$Pp1+$Pp2+$Pp3+$Pp4; $TotP2=$TotP2a+$TotP2b+$TotP2c+$TotP2d; $TotP3=$TotP3a+$TotP3b+$TotP3c+$TotP3d;  ?>	
<td><input class="InputB" id="TotP0_<?php echo $Sn; ?>" value="<?php if($TotP0!=0 AND $TotP0!=''){echo $TotP0;}else{echo '';} ?>" readonly/></td>
<td><input class="InputB" id="TotP1_<?php echo $Sn; ?>" value="<?php if($TotP1!=0 AND $TotP1!=''){echo $TotP1;}else{echo '';} ?>" readonly/></td>
<td><input class="InputB" id="TotP2_<?php echo $Sn; ?>" value="<?php if($TotP2!=0 AND $TotP2!=''){echo $TotP2;}else{echo '';} ?>" readonly/></td>
<?php if($RslP=='Y'){ ?><td><input class="InputB" value="<?php if($TotP2ch!=0){echo $TotP2ch;}else{echo '';} ?>" readonly/></td><?php } ?>
<?php if($EntP=='Y'){ ?><td><input class="InputB" id="TotP3_<?php echo $Sn; ?>" value="<?php if($TotP3!=0 AND $TotP3!=''){echo $TotP3;}else{echo '';} ?>" readonly/></td><?php } ?>

<?php if($resSpEG['GradeValue']=='M2' OR $resSpEG['GradeValue']=='M3'){ 
$SsqlP2=mysql_query("select Q1,Q2,Q3,Q4 from hrm_sales_sal_details_area where AreaEmpID=".$EmployeeId." AND ProductId=".$res['ProductId']." AND YearId=".$_REQUEST['y'], $con);
$SsqlP3=mysql_query("select Q1,Q2,Q3,Q4 from hrm_sales_sal_details_area where AreaEmpID=".$EmployeeId." AND ProductId=".$res['ProductId']." AND YearId=".$AfterYId, $con);
} elseif($resSpEG['GradeValue']=='M4' OR $resSpEG['GradeValue']=='M5'){  
$SsqlP2=mysql_query("select Q1,Q2,Q3,Q4 from hrm_sales_sal_details_region where RegionEmpID=".$EmployeeId." AND ProductId=".$res['ProductId']." AND YearId=".$_REQUEST['y'], $con);
$SsqlP3=mysql_query("select Q1,Q2,Q3,Q4 from hrm_sales_sal_details_region where RegionEmpID=".$EmployeeId." AND ProductId=".$res['ProductId']." AND YearId=".$AfterYId, $con); 
}
$SresP2=mysql_fetch_assoc($SsqlP2); $SresP3=mysql_fetch_assoc($SsqlP3); 
$SToptP2=$SresP2['Q1']+$SresP2['Q2']+$SresP2['Q3']+$SresP2['Q4']; 
$SToptP3=$SresP3['Q1']+$SresP3['Q2']+$SresP3['Q3']+$SresP3['Q4']; ?>

	<td class="Revised" style="background-color:#D7FFAE;"><?php if($SToptP2!=0 AND $SToptP2!=''){echo $SToptP2;}else{echo '';} ?><input type="hidden" id="STotP2_<?php echo $Sn; ?>" value="<?php if($SToptP2!=0 AND $SToptP2!=''){echo $SToptP2;}else{echo '';} ?>" /></td>
	<td class="Revised" style="background-color:#D7FFAE;"><?php if($SToptP3!=0 AND $SToptP3!=''){echo $SToptP3;}else{echo '';} ?><input type="hidden" id="STotP3_<?php echo $Sn; ?>" value="<?php if($SToptP3!=0 AND $SToptP3!=''){echo $SToptP3;}else{echo '';} ?>" /></td>	 
	</tr>		
<?php } $Sn++; } $ActSn=$Sn-1; echo '<input type="hidden" id="ActualSn" value="'.$ActSn.'" />'; ?>    
<?php if($_REQUEST['ii']!='All_1' AND $_REQUEST['ii']!='All_2' AND $_REQUEST['ac']!=1){ 

/*** TeamLease Employee Open ***/
 if($rtl>0)
 { 
  $sqlP0ta=mysql_query("select SUM(M1_Ach) as tsM1,SUM(M2_Ach) as tsM2,SUM(M3_Ach) as tsM3,SUM(M4_Ach) as tsM4,SUM(M5_Ach) as tsM5,SUM(M6_Ach) as tsM6,SUM(M7_Ach) as tsM7,SUM(M8_Ach) as tsM8,SUM(M9_Ach) as tsM9,SUM(M10_Ach) as tsM10,SUM(M11_Ach) as tsM11,SUM(M12_Ach) as tsM12 from hrm_sales_sal_details_".$Before2YId." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_sales_tlemp tl ON d.HqId=tl.TLHq where TLStatus='A' AND tl.TLRepId=".$EmployeeId." AND sp.ItemId=".$_REQUEST['ii']." AND sd.YearId=".$Before2YId, $con); $resP0ta=mysql_fetch_assoc($sqlP0ta);
  $sqlP1ta=mysql_query("select SUM(M1_Ach) as tsM1,SUM(M2_Ach) as tsM2,SUM(M3_Ach) as tsM3,SUM(M4_Ach) as tsM4,SUM(M5_Ach) as tsM5,SUM(M6_Ach) as tsM6,SUM(M7_Ach) as tsM7,SUM(M8_Ach) as tsM8,SUM(M9_Ach) as tsM9,SUM(M10_Ach) as tsM10,SUM(M11_Ach) as tsM11,SUM(M12_Ach) as tsM12 from hrm_sales_sal_details_".$BeforeYId." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_sales_tlemp tl ON d.HqId=tl.TLHq where TLStatus='A' AND tl.TLRepId=".$EmployeeId." AND sp.ItemId=".$_REQUEST['ii']." AND sd.YearId=".$BeforeYId, $con); $resP1ta=mysql_fetch_assoc($sqlP1ta);
  $sqlPchta=mysql_query("select SUM(M1_Ach) as sM1,SUM(M2_Ach) as sM2,SUM(M3_Ach) as sM3,SUM(M4_Ach) as sM4,SUM(M5_Ach) as sM5,SUM(M6_Ach) as sM6,SUM(M7_Ach) as sM7,SUM(M8_Ach) as sM8,SUM(M9_Ach) as sM9,SUM(M10_Ach) as sM10,SUM(M11_Ach) as sM11,SUM(M12_Ach) as sM12 from hrm_sales_sal_details_".$_REQUEST['y']." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_sales_tlemp tl ON d.HqId=tl.TLHq where TLStatus='A' AND tl.TLRepId=".$EmployeeId." AND sp.ItemId=".$_REQUEST['ii']." AND sd.YearId=".$_REQUEST['y'], $con); 
$resPchta=mysql_fetch_assoc($sqlPchta);
 }
/*** TeamLease Employee CLose ***/

$sqlP0t=mysql_query("select SUM(M1_Ach) as tsM1,SUM(M2_Ach) as tsM2,SUM(M3_Ach) as tsM3,SUM(M4_Ach) as tsM4,SUM(M5_Ach) as tsM5,SUM(M6_Ach) as tsM6,SUM(M7_Ach) as tsM7,SUM(M8_Ach) as tsM8,SUM(M9_Ach) as tsM9,SUM(M10_Ach) as tsM10,SUM(M11_Ach) as tsM11,SUM(M12_Ach) as tsM12 from hrm_sales_sal_details_".$Before2YId." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_sales_hq_temp hqt ON d.HqId=hqt.HqId INNER JOIN hrm_sales_reporting_level rl ON hqt.EmployeeID=rl.EmployeeID where HqTEmpStatus='A' AND (hqt.EmployeeID=".$EmployeeId." OR rl.R1=".$EmployeeId." OR rl.R2=".$EmployeeId." OR rl.R3=".$EmployeeId." OR rl.R4=".$EmployeeId." OR rl.R5=".$EmployeeId.") AND sp.ItemId=".$_REQUEST['ii']." AND sd.YearId=".$Before2YId, $con); $resP0t=mysql_fetch_assoc($sqlP0t);
if($rtl>0)
{
$TotP0p1=$resP0t['tsM1']+$resP0t['tsM2']+$resP0t['tsM3']+$resP0ta['tsM1']+$resP0ta['tsM2']+$resP0ta['tsM3']; 
$TotP0p2=$resP0t['tsM4']+$resP0t['tsM5']+$resP0t['tsM6']+$resP0ta['tsM4']+$resP0ta['tsM5']+$resP0ta['tsM6'];
$TotP0p3=$resP0t['tsM7']+$resP0t['tsM8']+$resP0t['tsM9']+$resP0ta['tsM7']+$resP0ta['tsM8']+$resP0ta['tsM9']; 
$TotP0p4=$resP0t['tsM10']+$resP0t['tsM11']+$resP0t['tsM12']+$resP0ta['tsM10']+$resP0ta['tsM11']+$resP0ta['tsM12'];
}
else
{
$TotP0p1=$resP0t['tsM1']+$resP0t['tsM2']+$resP0t['tsM3']; $TotP0p2=$resP0t['tsM4']+$resP0t['tsM5']+$resP0t['tsM6'];
$TotP0p3=$resP0t['tsM7']+$resP0t['tsM8']+$resP0t['tsM9']; $TotP0p4=$resP0t['tsM10']+$resP0t['tsM11']+$resP0t['tsM12'];
}


$sqlP1t=mysql_query("select SUM(M1_Ach) as tsM1,SUM(M2_Ach) as tsM2,SUM(M3_Ach) as tsM3,SUM(M4_Ach) as tsM4,SUM(M5_Ach) as tsM5,SUM(M6_Ach) as tsM6,SUM(M7_Ach) as tsM7,SUM(M8_Ach) as tsM8,SUM(M9_Ach) as tsM9,SUM(M10_Ach) as tsM10,SUM(M11_Ach) as tsM11,SUM(M12_Ach) as tsM12 from hrm_sales_sal_details_".$BeforeYId." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_sales_hq_temp hqt ON d.HqId=hqt.HqId INNER JOIN hrm_sales_reporting_level rl ON hqt.EmployeeID=rl.EmployeeID where HqTEmpStatus='A' AND (hqt.EmployeeID=".$EmployeeId." OR rl.R1=".$EmployeeId." OR rl.R2=".$EmployeeId." OR rl.R3=".$EmployeeId." OR rl.R4=".$EmployeeId." OR rl.R5=".$EmployeeId.") AND sp.ItemId=".$_REQUEST['ii']." AND sd.YearId=".$BeforeYId, $con); $resP1t=mysql_fetch_assoc($sqlP1t);
if($rtl>0)
{
$TotPp1=$resP1t['tsM1']+$resP1t['tsM2']+$resP1t['tsM3']+$resP1ta['tsM1']+$resP1ta['tsM2']+$resP1ta['tsM3']; 
$TotPp2=$resP1t['tsM4']+$resP1t['tsM5']+$resP1t['tsM6']+$resP1ta['tsM4']+$resP1ta['tsM5']+$resP1ta['tsM6'];
$TotPp3=$resP1t['tsM7']+$resP1t['tsM8']+$resP1t['tsM9']+$resP1ta['tsM7']+$resP1ta['tsM8']+$resP1ta['tsM9']; 
$TotPp4=$resP1t['tsM10']+$resP1t['tsM11']+$resP1t['tsM12']+$resP1ta['tsM10']+$resP1ta['tsM11']+$resP1ta['tsM12'];
}
else
{
$TotPp1=$resP1t['tsM1']+$resP1t['tsM2']+$resP1t['tsM3']; $TotPp2=$resP1t['tsM4']+$resP1t['tsM5']+$resP1t['tsM6'];
$TotPp3=$resP1t['tsM7']+$resP1t['tsM8']+$resP1t['tsM9']; $TotPp4=$resP1t['tsM10']+$resP1t['tsM11']+$resP1t['tsM12'];
}

$sqlP2t=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_terr sdt INNER JOIN hrm_sales_seedsproduct sp ON sdt.ProductId=sp.ProductId where sdt.TerrRepEmpID=".$EmployeeId." AND sp.ItemId=".$_REQUEST['ii']." AND sdt.YearId=".$_REQUEST['y'], $con); $resP2t=mysql_fetch_assoc($sqlP2t); 
$sqlP3t=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_terr sdt INNER JOIN hrm_sales_seedsproduct sp ON sdt.ProductId=sp.ProductId where sdt.TerrRepEmpID=".$EmployeeId." AND sp.ItemId=".$_REQUEST['ii']." AND sdt.YearId=".$AfterYId, $con); $resP3t=mysql_fetch_assoc($sqlP3t);
$sqlP2ta=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_hq sdh INNER JOIN hrm_sales_seedsproduct sp ON sdh.ProductId=sp.ProductId where sdh.HqRepEmpID=".$EmployeeId." AND sp.ItemId=".$_REQUEST['ii']." AND sdh.YearId=".$_REQUEST['y'], $con); $resP2ta=mysql_fetch_assoc($sqlP2ta);
$sqlP3ta=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_hq sdh INNER JOIN hrm_sales_seedsproduct sp ON sdh.ProductId=sp.ProductId where sdh.HqRepEmpID=".$EmployeeId." AND sp.ItemId=".$_REQUEST['ii']." AND sdh.YearId=".$AfterYId, $con); $resP3ta=mysql_fetch_assoc($sqlP3ta);
$sqlP2tb=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_area sda INNER JOIN hrm_sales_seedsproduct sp ON sda.ProductId=sp.ProductId where sda.AreaRepEmpID=".$EmployeeId." AND sp.ItemId=".$_REQUEST['ii']." AND sda.YearId=".$_REQUEST['y'], $con); $resP2tb=mysql_fetch_assoc($sqlP2tb);
$sqlP3tb=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_area sda INNER JOIN hrm_sales_seedsproduct sp ON sda.ProductId=sp.ProductId where sda.AreaRepEmpID=".$EmployeeId." AND sp.ItemId=".$_REQUEST['ii']." AND sda.YearId=".$AfterYId, $con); $resP3tb=mysql_fetch_assoc($sqlP3tb);

$TotP2ta=$resP2t['Qa']+$resP2ta['Qa']+$resP2tb['Qa']; $TotP2tb=$resP2t['Qb']+$resP2ta['Qb']+$resP2tb['Qb']; 
$TotP2tc=$resP2t['Qc']+$resP2ta['Qc']+$resP2tb['Qc']; $TotP2td=$resP2t['Qd']+$resP2ta['Qd']+$resP2tb['Qd'];
$TotP3ta=$resP3t['Qa']+$resP3ta['Qa']+$resP3tb['Qa']; $TotP3tb=$resP3t['Qb']+$resP3ta['Qb']+$resP3tb['Qb']; 
$TotP3tc=$resP3t['Qc']+$resP3ta['Qc']+$resP3tb['Qc']; $TotP3td=$resP3t['Qd']+$resP3ta['Qd']+$resP3tb['Qd'];

$sqlPcht=mysql_query("select SUM(M1_Ach) as sM1,SUM(M2_Ach) as sM2,SUM(M3_Ach) as sM3,SUM(M4_Ach) as sM4,SUM(M5_Ach) as sM5,SUM(M6_Ach) as sM6,SUM(M7_Ach) as sM7,SUM(M8_Ach) as sM8,SUM(M9_Ach) as sM9,SUM(M10_Ach) as sM10,SUM(M11_Ach) as sM11,SUM(M12_Ach) as sM12 from hrm_sales_sal_details_".$_REQUEST['y']." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_sales_hq_temp hqt ON d.HqId=hqt.HqId INNER JOIN hrm_sales_reporting_level rl ON hqt.EmployeeID=rl.EmployeeID where HqTEmpStatus='A' AND (hqt.EmployeeID=".$EmployeeId." OR rl.R1=".$EmployeeId." OR rl.R2=".$EmployeeId." OR rl.R3=".$EmployeeId." OR rl.R4=".$EmployeeId." OR rl.R5=".$EmployeeId.") AND sp.ItemId=".$_REQUEST['ii']." AND sd.YearId=".$_REQUEST['y'], $con); $resPcht=mysql_fetch_assoc($sqlPcht);
if($rtl>0)
{
$TP2ch1t=$resPcht['sM1']+$resPcht['sM2']+$resPcht['sM3']+$resPchta['sM1']+$resPchta['sM2']+$resPchta['sM3']; 
$TP2ch2t=$resPcht['sM4']+$resPcht['sM5']+$resPcht['sM6']+$resPchta['sM4']+$resPchta['sM5']+$resPchta['sM6']; 
$TP2ch3t=$resPcht['sM7']+$resPcht['sM8']+$resPcht['sM9']+$resPchta['sM7']+$resPchta['sM8']+$resPchta['sM9']; 
$TP2ch4t=$resPcht['sM10']+$resPcht['sM11']+$resPcht['sM12']+$resPchta['sM10']+$resPchta['sM11']+$resPchta['sM12'];
}
else
{
$TP2ch1t=$resPcht['sM1']+$resPcht['sM2']+$resPcht['sM3']; $TP2ch2t=$resPcht['sM4']+$resPcht['sM5']+$resPcht['sM6']; 
$TP2ch3t=$resPcht['sM7']+$resPcht['sM8']+$resPcht['sM9']; $TP2ch4t=$resPcht['sM10']+$resPcht['sM11']+$resPcht['sM12'];
}
$TotP2cht=$TP2ch1t+$TP2ch2t+$TP2ch3t+$TP2ch4t;
?>
   <tr style="font-size:14px;color:#000000;background-color:#FFFFA6;height:24px;">
	 <td colspan="2" align="right" style="font-size:16px;"><b>TOTAL:&nbsp;</b></td>
	 <td><input class="TInput" id="TotP1_TD" value="<?php if($TotP0p1!=0){echo $TotP0p1;} ?>" readonly/></td>
	 <td><input class="TInput" id="TotP1_TA" value="<?php if($TotPp1!=0){echo $TotPp1;} ?>" readonly/></td>		
	 <td><input class="TInput" id="TotP1_TB" value="<?php if($TotP2ta!=0){echo $TotP2ta;} ?>" readonly/></td>
<?php if($RslP=='Y'){ ?><td><input class="TInput" value="<?php if($TP2ch1t!=0){echo $TP2ch1t;} ?>" readonly/></td><?php } ?>
<?php if($EntP=='Y'){ ?><td><input class="TInput" id="TotP1_TC" value="<?php if($TotP3ta!=0){echo $TotP3ta;} ?>" readonly/></td><?php } ?>
	 
	 <td><input class="TInput" id="TotP2_TD" value="<?php if($TotP0p2!=0){echo $TotP0p2;} ?>" readonly/></td>
	 <td><input class="TInput" id="TotP2_TA" value="<?php if($TotPp2!=0){echo $TotPp2;} ?>" readonly/></td>
	 <td><input class="TInput" id="TotP2_TB" value="<?php if($TotP2tb!=0){echo $TotP2tb;} ?>" readonly/></td>
<?php if($RslP=='Y'){ ?><td><input class="TInput" value="<?php if($TP2ch2t!=0){echo $TP2ch2t;} ?>" readonly/></td><?php } ?>
<?php if($EntP=='Y'){ ?><td><input class="TInput" id="TotP2_TC" value="<?php if($TotP3tb!=0){echo $TotP3tb;} ?>" readonly/></td><?php } ?>	 
	 
	 <td><input class="TInput" id="TotP3_TD" value="<?php if($TotP0p3!=0){echo $TotP0p3;} ?>" readonly/></td>
	 <td><input class="TInput" id="TotP3_TA" value="<?php if($TotPp3!=0){echo $TotPp3;} ?>" readonly/></td>	
	 <td><input class="TInput" id="TotP3_TB" value="<?php if($TotP2tc!=0){echo $TotP2tc;} ?>" readonly/></td>
<?php if($RslP=='Y'){ ?><td><input class="TInput" value="<?php if($TP2ch3t!=0){echo $TP2ch3t;} ?>" readonly/></td><?php } ?>
<?php if($EntP=='Y'){ ?><td><input class="TInput" id="TotP3_TC" value="<?php if($TotP3tc!=0){echo $TotP3tc;} ?>" readonly/></td><?php } ?>	 
	 	
	 <td><input class="TInput" id="TotP4_TD" value="<?php if($TotP0p4!=0){echo $TotP0p4;} ?>" readonly/></td> 
	 <td><input class="TInput" id="TotP4_TA" value="<?php if($TotPp4!=0){echo $TotPp4;} ?>" readonly/></td>		
	 <td><input class="TInput" id="TotP4_TB" value="<?php if($TotP2td!=0){echo $TotP2td;} ?>" readonly/></td>
<?php if($RslP=='Y'){ ?><td><input class="TInput" value="<?php if($TP2ch4t!=0){echo $TP2ch4t;} ?>" readonly/></td><?php } ?>
<?php if($EntP=='Y'){ ?><td><input class="TInput" id="TotP4_TC" value="<?php if($TotP3td!=0){echo $TotP3td;} ?>" readonly/></td><?php } ?>	 
	 
<?php $TotP0t=$TotP0p1+$TotP0p2+$TotP0p3+$TotP0p4; $TotP1t=$TotPp1+$TotPp2+$TotPp3+$TotPp4; 
      $TotP2t=$TotP2ta+$TotP2tb+$TotP2tc+$TotP2td; $TotP3t=$TotP3ta+$TotP3tb+$TotP3tc+$TotP3td; ?>
	  <td><input class="TInput" id="TotM_DeT" value="<?php if($TotP0t!=0 AND $TotP0t!=''){echo $TotP0t;}else{echo '';} ?>" readonly/></td>
      <td><input class="TInput" id="TotM_AeT" value="<?php if($TotP1t!=0 AND $TotP1t!=''){echo $TotP1t;}else{echo '';} ?>" readonly/></td>
	  <td><input class="TInput" id="TotM_BeT" value="<?php if($TotP2t!=0 AND $TotP2t!=''){echo $TotP2t;}else{echo '';} ?>" readonly/></td>
<?php if($RslP=='Y'){ ?><td><input class="TInput" value="<?php if($TotP2cht!=0){echo $TotP2cht;}else{echo '';} ?>" readonly/></td><?php } ?>
<?php if($EntP=='Y'){ ?><td><input class="TInput" id="TotM_CeT" value="<?php if($TotP3t!=0 AND $TotP3t!=''){echo $TotP3t;}else{echo '';} ?>" readonly/></td><?php } ?>	  
	  
<?php if($resSpEG['GradeValue']=='M2' OR $resSpEG['GradeValue']=='M3'){ 
$TSsqlP2=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_area sda INNER JOIN hrm_sales_seedsproduct sp ON sda.ProductId=sp.ProductId where sda.AreaEmpID=".$EmployeeId." AND sp.ItemId=".$_REQUEST['ii']." AND sda.YearId=".$_REQUEST['y'], $con); 
$TSsqlP3=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_area sda INNER JOIN hrm_sales_seedsproduct sp ON sda.ProductId=sp.ProductId where sda.AreaEmpID=".$EmployeeId." AND sp.ItemId=".$_REQUEST['ii']." AND sda.YearId=".$AfterYId, $con); 
} elseif($resSpEG['GradeValue']=='M4' OR $resSpEG['GradeValue']=='M5'){
$TSsqlP2=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_region sdr INNER JOIN hrm_sales_seedsproduct sp ON sdr.ProductId=sp.ProductId where sdr.RegionEmpID=".$EmployeeId." AND sp.ItemId=".$_REQUEST['ii']." AND sdr.YearId=".$_REQUEST['y'], $con); 
$TSsqlP3=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_region sdr INNER JOIN hrm_sales_seedsproduct sp ON sdr.ProductId=sp.ProductId where sdr.RegionEmpID=".$EmployeeId." AND sp.ItemId=".$_REQUEST['ii']." AND sdr.YearId=".$AfterYId, $con); 
}

$TSresP2=mysql_fetch_assoc($TSsqlP2); $TSresP3=mysql_fetch_assoc($TSsqlP3);  
$TSTotP2=$TSresP2['Qa']+$TSresP2['Qb']+$TSresP2['Qc']+$TSresP2['Qd']; 
$TSTotP3=$TSresP3['Qa']+$TSresP3['Qb']+$TSresP3['Qc']+$TSresP3['Qd']; ?>
	
	<td class="Revised"><?php if($TSTotP2!=0 AND $TSTotP2!=''){echo $TSTotP2;}else{echo '';} ?></td>
	<td class="Revised"><?php if($TSTotP3!=0 AND $TSTotP3!=''){echo $TSTotP3;}else{echo '';} ?></td>		  
   </tr>	
<?php } ?>  
<?php /********************** Overall Total Close ****************************/ ?>
</table>
<?php } ?>


	     
 </td>
</tr>
<?php if($_REQUEST['ac']!=1) { ?>
<tr>
<td> 


                   
 <table border="0" cellpadding="0" cellspacing="4" cellpadding="0">
 
<?php if($_REQUEST['SelectV']=='TeamEmpNo' AND $_REQUEST['TeamEmpVV']!=''){ ?> 
 
<?php $sqlRepHq = mysql_query("select e.EmployeeID,Fname,Sname,Lname,Gender,DR,Married,GradeId,hqt.HqId,HqName from hrm_employee_general g INNER JOIN hrm_sales_hq_temp hqt ON g.EmployeeID=hqt.EmployeeID INNER JOIN hrm_headquater hq ON hqt.HqId=hq.HqId INNER JOIN hrm_employee_personal p ON g.EmployeeID=p.EmployeeID INNER JOIN hrm_employee e ON hqt.EmployeeID=e.EmployeeID where hqt.EmployeeID=".$_REQUEST['TeamEmpVV']." AND g.DepartmentId=6 AND hqt.HqTEmpStatus='A' group by e.EmployeeID order by g.EmployeeID ASC", $con); $resRepHqRow=mysql_num_rows($sqlRepHq); 

$DealRow=$resRepHqRow+1; echo '<input type="hidden" id="DealRows" value="'.$DealRow.'" />'; $counter=1; 
while($resRepHq=mysql_fetch_array($sqlRepHq)){	  /*********** Open Hq **********/ 
if($resRepHq['DR']=='Y'){$M='Dr.';} elseif($resRepHq['Gender']=='M'){$M='Mr.';} elseif($resRepHq['Gender']=='F' AND $resRepHq['Married']=='Y'){$M='Mrs.';} elseif($resRepHq['Gender']=='F' AND $resRepHq['Married']=='N'){$M='Miss.';} $Ename=$resRepHq['Fname'].' '.$resRepHq['Sname'].' '.$resRepHq['Lname']; $HqEmpId=$resRepHq['EmployeeID']; $HqId=$resRepHq['HqId']; 
$sqlRpt=mysql_query("select g.EmployeeID from hrm_employee_general g INNER JOIN hrm_employee e ON g.EmployeeID=e.EmployeeID where g.DepartmentId=6 AND e.EmpStatus='A' AND g.RepEmployeeID=".$resRepHq['EmployeeID'], $con); $rowRpt=mysql_num_rows($sqlRpt); $sqlEgv=mysql_query("select GradeValue from hrm_grade where CompanyId=".$CompanyId." AND GradeId=".$resRepHq['GradeId'], $con); $resEgv=mysql_fetch_assoc($sqlEgv); 
?>
<tr style="background-color:#CBD7F3;">
 <table border="0">
<?php /////////////////////*****************Open Open *********************///////////////////// ?> 
<?php $sHq2=mysql_query("select HqId from hrm_sales_hq_temp where EmployeeID=".$HqEmpId." AND HqTEmpStatus='A' AND HqId!=".$HqId, $con); $rowHq2=mysql_num_rows($sHq2); echo '<input type="hidden" id="Rowhq2" value="'.$rowHq2.'" />';
      if($rowHq2==1){$resHq2=mysql_fetch_assoc($sHq2); echo '<input type="hidden" id="h1q" value="'.$resHq2['HqId'].'" />';}?>   
  <tr>
   <td>
<table border="1" cellpadding="0" cellspacing="0" style="font-family:Times New Roman;font-size:14px;width:<?php if($_REQUEST['ii']=='All_1' OR $_REQUEST['ii']=='All_2'){ echo '1600px';}else{echo '1500px';}?>;">
  <tr>
  <td colspan="50" style="font-size:16px;color:#FFFF00;background-color:#183E83;">&nbsp;<b><?php echo ucfirst(strtolower($Ename)).'-<font color="#D7EBFF">'.$resRepHq['HqName'].'</font>'; ?></b></td>
  </tr>	
  <tr style="background-color:#D5F1D1;color:#000000;">
    <td colspan="<?php if($_REQUEST['ii']=='All_1' OR $_REQUEST['ii']=='All_2'){echo 4;}else{echo 3;}?>"></td>
<td colspan="6" align="center"><b>Quarter 1</b></td><td colspan="6" align="center"><b>Quarter 2</b></td>
<td colspan="6" align="center"><b>Quarter 3</b></td><td colspan="6" align="center"><b>Quarter 4</b></td>
<td colspan="6" align="center"><b>TOTAL</b></td>
  </tr>	
   <tr style="background-color:#D5F1D1;color:#000000;">
<?php if($_REQUEST['ii']=='All_1' OR $_REQUEST['ii']=='All_2'){ ?>   
    <td align="center" style="width:100pxfont-size:12px;;"><b>CROP</b></td>
<?php } ?>	
	<td align="center" style="width:120px;font-size:12px;"><b>VARIETY</b></td>
	<td align="center" style="width:30px;font-size:12px;"><b>&nbsp;TYPE&nbsp;</b></td>
	<td align="center" style="width:50px;font-size:12px;"><b>&nbsp;Edit&nbsp;</b></td>
	<?php for($i=1;$i<=5; $i++){ ?>
	 <td class="Trh60"><?php echo $y0T.'<br>'.$y0; ?></td>
	 <td class="Trh60"><?php echo $y1T.'<br>'.$y1; ?></td>
	 <td class="Trh60"><?php echo $y2T.'<br>'.$y2; ?>
	 <td class="Trh60"><?php echo $y3T.'<br>'.$y3; ?></td>
	 <td class="Trh60"><?php echo '<font color="#A60053">Suggest</font><br>'.$y2; ?></td>
	<?php if($RslP=='Y'){ ?><td class="Trh60"><?php echo $y1T.'<br>'.$y2; ?></td><?php } ?>
	<?php if($EntP=='Y'){ ?><td class="Trh60"><?php echo '<font color="#A60053">Suggest</font><br>'.$y3; ?></td><?php } ?>
	<?php } ?>
  </tr>	
<?php if($_REQUEST['ii']!='All_1' AND $_REQUEST['ii']!='All_2'){$sql = mysql_query("select sp.ItemId,ProductId,ProductName,ItemName,TypeName from hrm_sales_seedsproduct sp INNER JOIN hrm_sales_seedsitem si ON sp.ItemId=si.ItemId INNER JOIN hrm_sales_seedtype st ON sp.TypeId=st.TypeId where si.ItemId=".$_REQUEST['ii']." order by ItemName ASC, TypeName ASC, ProductName ASC", $con);}
      elseif($_REQUEST['ii']=='All_1'){$sql = mysql_query("select sp.ItemId,ProductId,ProductName,ItemName,TypeName from hrm_sales_seedsproduct sp INNER JOIN hrm_sales_seedsitem si ON sp.ItemId=si.ItemId INNER JOIN hrm_sales_seedtype st ON sp.TypeId=st.TypeId where si.GroupId=1 order by ItemName ASC, TypeName ASC, ProductName ASC", $con);}
	  elseif($_REQUEST['ii']=='All_2'){$sql = mysql_query("select sp.ItemId,ProductId,ProductName,ItemName,TypeName from hrm_sales_seedsproduct sp INNER JOIN hrm_sales_seedsitem si ON sp.ItemId=si.ItemId INNER JOIN hrm_sales_seedtype st ON sp.TypeId=st.TypeId where si.GroupId=2 order by ItemName ASC, TypeName ASC, ProductName ASC", $con);}
 $Sn=1; while($res=mysql_fetch_array($sql)){ 
 
if($HqEmpId==$EmployeeId)
{ $sqlP0d=mysql_query("select SUM(M1_Ach) as sM1,SUM(M2_Ach) as sM2,SUM(M3_Ach) as sM3,SUM(M4_Ach) as sM4,SUM(M5_Ach) as sM5,SUM(M6_Ach) as sM6,SUM(M7_Ach) as sM7,SUM(M8_Ach) as sM8,SUM(M9_Ach) as sM9,SUM(M10_Ach) as sM10,SUM(M11_Ach) as sM11,SUM(M12_Ach) as sM12 from hrm_sales_sal_details_".$Before2YId." sd INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId where d.HqId=".$HqId." AND sd.ProductId=".$res['ProductId']." AND sd.YearId=".$Before2YId, $con); 
$sqlP1d=mysql_query("select SUM(M1_Ach) as sM1,SUM(M2_Ach) as sM2,SUM(M3_Ach) as sM3,SUM(M4_Ach) as sM4,SUM(M5_Ach) as sM5,SUM(M6_Ach) as sM6,SUM(M7_Ach) as sM7,SUM(M8_Ach) as sM8,SUM(M9_Ach) as sM9,SUM(M10_Ach) as sM10,SUM(M11_Ach) as sM11,SUM(M12_Ach) as sM12 from hrm_sales_sal_details_".$BeforeYId." sd INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId where d.HqId=".$HqId." AND sd.ProductId=".$res['ProductId']." AND sd.YearId=".$BeforeYId, $con);  

$sqlP4d=mysql_query("select SUM(M1) as sM1,SUM(M2) as sM2,SUM(M3) as sM3,SUM(M4) as sM4,SUM(M5) as sM5,SUM(M6) as sM6,SUM(M7) as sM7,SUM(M8) as sM8,SUM(M9) as sM9,SUM(M10) as sM10,SUM(M11) as sM11,SUM(M12) as sM12 from hrm_sales_sal_details_".$_REQUEST['y']." sd INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId where d.HqId=".$HqId." AND sd.ProductId=".$res['ProductId']." AND sd.YearId=".$_REQUEST['y'], $con); 
$sqlP5d=mysql_query("select SUM(M1_Proj) as sM1,SUM(M2_Proj) as sM2,SUM(M3_Proj) as sM3,SUM(M4_Proj) as sM4,SUM(M5_Proj) as sM5,SUM(M6_Proj) as sM6,SUM(M7_Proj) as sM7,SUM(M8_Proj) as sM8,SUM(M9_Proj) as sM9,SUM(M10_Proj) as sM10,SUM(M11_Proj) as sM11,SUM(M12_Proj) as sM12 from hrm_sales_sal_details_".$AfterYId." sd INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId where d.HqId=".$HqId." AND sd.ProductId=".$res['ProductId']." AND sd.YearId=".$AfterYId, $con); $resP4d=mysql_fetch_assoc($sqlP4d); $resP5d=mysql_fetch_assoc($sqlP5d);
$Ach4Q1=$resP4d['sM1']+$resP4d['sM2']+$resP4d['sM3']; $Ach4Q2=$resP4d['sM4']+$resP4d['sM5']+$resP4d['sM6'];
$Ach4Q3=$resP4d['sM7']+$resP4d['sM8']+$resP4d['sM9']; $Ach4Q4=$resP4d['sM10']+$resP4d['sM11']+$resP4d['sM12'];
$Ach5Q1=$resP5d['sM1']+$resP5d['sM2']+$resP5d['sM3']; $Ach5Q2=$resP5d['sM4']+$resP5d['sM5']+$resP5d['sM6'];
$Ach5Q3=$resP5d['sM7']+$resP5d['sM8']+$resP5d['sM9']; $Ach5Q4=$resP5d['sM10']+$resP5d['sM11']+$resP5d['sM12'];

$sqlP2d=mysql_query("select * from hrm_sales_sal_details_terr where TerrEmpID=".$HqEmpId." AND TerrHqID=".$HqId." AND ProductId=".$res['ProductId']." AND YearId=".$_REQUEST['y'], $con); 
$sqlP3d=mysql_query("select * from hrm_sales_sal_details_terr where TerrEmpID=".$HqEmpId." AND TerrHqID=".$HqId." AND ProductId=".$res['ProductId']." AND YearId=".$AfterYId, $con);

$sqlPchd=mysql_query("select SUM(M1_Ach) as sM1,SUM(M2_Ach) as sM2,SUM(M3_Ach) as sM3,SUM(M4_Ach) as sM4,SUM(M5_Ach) as sM5,SUM(M6_Ach) as sM6,SUM(M7_Ach) as sM7,SUM(M8_Ach) as sM8,SUM(M9_Ach) as sM9,SUM(M10_Ach) as sM10,SUM(M11_Ach) as sM11,SUM(M12_Ach) as sM12 from hrm_sales_sal_details_".$_REQUEST['y']." sd INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId where d.HqId=".$HqId." AND sd.ProductId=".$res['ProductId']." AND sd.YearId=".$_REQUEST['y'], $con); 

$sChk=mysql_query("select * from hrm_sales_arrange_prod sap INNER JOIN hrm_headquater hq ON sap.StateId=hq.StateId INNER JOIN hrm_sales_hq_temp hqt ON hq.HqId=hqt.HqId where ProductId=".$res['ProductId']." AND ArrgStatus='Y' AND HqTEmpStatus='A' AND hqt.HqId=".$HqId, $con);
} 
elseif($resEgv['GradeValue']=='M2' OR $resEgv['GradeValue']=='M3'){ 

if($rowRpt==0)
{
$sqlP0d=mysql_query("select SUM(M1_Ach) as sM1,SUM(M2_Ach) as sM2,SUM(M3_Ach) as sM3,SUM(M4_Ach) as sM4,SUM(M5_Ach) as sM5,SUM(M6_Ach) as sM6,SUM(M7_Ach) as sM7,SUM(M8_Ach) as sM8,SUM(M9_Ach) as sM9,SUM(M10_Ach) as sM10,SUM(M11_Ach) as sM11,SUM(M12_Ach) as sM12 from hrm_sales_sal_details_".$Before2YId." sd INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId where d.HqId=".$HqId." AND sd.ProductId=".$res['ProductId']." AND sd.YearId=".$Before2YId, $con);
$sqlP1d=mysql_query("select SUM(M1_Ach) as sM1,SUM(M2_Ach) as sM2,SUM(M3_Ach) as sM3,SUM(M4_Ach) as sM4,SUM(M5_Ach) as sM5,SUM(M6_Ach) as sM6,SUM(M7_Ach) as sM7,SUM(M8_Ach) as sM8,SUM(M9_Ach) as sM9,SUM(M10_Ach) as sM10,SUM(M11_Ach) as sM11,SUM(M12_Ach) as sM12 from hrm_sales_sal_details_".$BeforeYId." sd INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId where d.HqId=".$HqId." AND sd.ProductId=".$res['ProductId']." AND sd.YearId=".$BeforeYId, $con);

$sql4ta=mysql_query("select SUM(M1) as sM1,SUM(M2) as sM2,SUM(M3) as sM3,SUM(M4) as sM4,SUM(M5) as sM5,SUM(M6) as sM6,SUM(M7) as sM7,SUM(M8) as sM8,SUM(M9) as sM9,SUM(M10) as sM10,SUM(M11) as sM11,SUM(M12) as sM12 from hrm_sales_sal_details_".$_REQUEST['y']." sd INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId where d.HqId=".$HqId." AND sd.ProductId=".$res['ProductId']." AND sd.YearId=".$_REQUEST['y'], $con); 
$sql5ta=mysql_query("select SUM(M1_Proj) as sM1,SUM(M2_Proj) as sM2,SUM(M3_Proj) as sM3,SUM(M4_Proj) as sM4,SUM(M5_Proj) as sM5,SUM(M6_Proj) as sM6,SUM(M7_Proj) as sM7,SUM(M8_Proj) as sM8,SUM(M9_Proj) as sM9,SUM(M10_Proj) as sM10,SUM(M11_Proj) as sM11,SUM(M12_Proj) as sM12 from hrm_sales_sal_details_".$AfterYId." sd INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId where d.HqId=".$HqId." AND sd.ProductId=".$res['ProductId']." AND sd.YearId=".$AfterYId, $con); 
$res4ta=mysql_fetch_assoc($sql4ta); $res5ta=mysql_fetch_assoc($sql5ta);
$Ach4Q1=$res4ta['sM1']+$res4ta['sM2']+$res4ta['sM3']; $Ach4Q2=$res4ta['sM4']+$res4ta['sM5']+$res4ta['sM6'];
$Ach4Q3=$res4ta['sM7']+$res4ta['sM8']+$res4ta['sM9']; $Ach4Q4=$res4ta['sM10']+$res4ta['sM11']+$res4ta['sM12'];
$Ach5Q1=$res5ta['sM1']+$res5ta['sM2']+$res5ta['sM3']; $Ach5Q2=$res5ta['sM4']+$res5ta['sM5']+$res5ta['sM6'];
$Ach5Q3=$res5ta['sM7']+$res5ta['sM8']+$res5ta['sM9']; $Ach5Q4=$res5ta['sM10']+$res5ta['sM11']+$res5ta['sM12'];

$sqlP2d=mysql_query("select * from hrm_sales_sal_details_hq where HqId=".$HqId." AND ProductId=".$res['ProductId']." AND YearId=".$_REQUEST['y'], $con); 
$sqlP3d=mysql_query("select * from hrm_sales_sal_details_hq where HqId=".$HqId." AND ProductId=".$res['ProductId']." AND YearId=".$AfterYId, $con); 

$sqlPchd=mysql_query("select SUM(M1_Ach) as sM1,SUM(M2_Ach) as sM2,SUM(M3_Ach) as sM3,SUM(M4_Ach) as sM4,SUM(M5_Ach) as sM5,SUM(M6_Ach) as sM6,SUM(M7_Ach) as sM7,SUM(M8_Ach) as sM8,SUM(M9_Ach) as sM9,SUM(M10_Ach) as sM10,SUM(M11_Ach) as sM11,SUM(M12_Ach) as sM12 from hrm_sales_sal_details_".$_REQUEST['y']." sd INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId where d.HqId=".$HqId." AND sd.ProductId=".$res['ProductId']." AND sd.YearId=".$_REQUEST['y'], $con); 

$sChk=mysql_query("select * from hrm_sales_arrange_prod sap INNER JOIN hrm_headquater hq ON sap.StateId=hq.StateId INNER JOIN hrm_sales_hq_temp hqt ON hq.HqId=hqt.HqId where ProductId=".$res['ProductId']." AND ArrgStatus='Y' AND HqTEmpStatus='A' AND hqt.HqId=".$HqId, $con);

}
else
{
$sqlP0d=mysql_query("select SUM(M1_Ach) as sM1,SUM(M2_Ach) as sM2,SUM(M3_Ach) as sM3,SUM(M4_Ach) as sM4,SUM(M5_Ach) as sM5,SUM(M6_Ach) as sM6,SUM(M7_Ach) as sM7,SUM(M8_Ach) as sM8,SUM(M9_Ach) as sM9,SUM(M10_Ach) as sM10,SUM(M11_Ach) as sM11,SUM(M12_Ach) as sM12 from hrm_sales_sal_details_".$Before2YId." sd INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_sales_hq_temp hqt ON d.HqId=hqt.HqId INNER JOIN hrm_sales_reporting_level rl ON hqt.EmployeeID=rl.EmployeeID where HqTEmpStatus='A' AND (hqt.EmployeeID=".$HqEmpId." OR rl.R1=".$HqEmpId." OR rl.R2=".$HqEmpId." OR rl.R3=".$HqEmpId." OR rl.R4=".$HqEmpId." OR rl.R5=".$HqEmpId.") AND sd.ProductId=".$res['ProductId']." AND sd.YearId=".$Before2YId, $con);
$sqlP1d=mysql_query("select SUM(M1_Ach) as sM1,SUM(M2_Ach) as sM2,SUM(M3_Ach) as sM3,SUM(M4_Ach) as sM4,SUM(M5_Ach) as sM5,SUM(M6_Ach) as sM6,SUM(M7_Ach) as sM7,SUM(M8_Ach) as sM8,SUM(M9_Ach) as sM9,SUM(M10_Ach) as sM10,SUM(M11_Ach) as sM11,SUM(M12_Ach) as sM12 from hrm_sales_sal_details_".$BeforeYId." sd INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_sales_hq_temp hqt ON d.HqId=hqt.HqId INNER JOIN hrm_sales_reporting_level rl ON hqt.EmployeeID=rl.EmployeeID where HqTEmpStatus='A' AND (hqt.EmployeeID=".$HqEmpId." OR rl.R1=".$HqEmpId." OR rl.R2=".$HqEmpId." OR rl.R3=".$HqEmpId." OR rl.R4=".$HqEmpId." OR rl.R5=".$HqEmpId.") AND sd.ProductId=".$res['ProductId']." AND sd.YearId=".$BeforeYId, $con);

$sql4ta=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_terr where TerrRepEmpID=".$HqEmpId." AND ProductId=".$res['ProductId']." AND YearId=".$_REQUEST['y'], $con); $sql5ta=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_terr where TerrRepEmpID=".$HqEmpId." AND ProductId=".$res['ProductId']." AND YearId=".$AfterYId, $con); $res4ta=mysql_fetch_assoc($sql4ta); $res5ta=mysql_fetch_assoc($sql5ta);
$sql4tb=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_hq where HqRepEmpID=".$HqEmpId." AND ProductId=".$res['ProductId']." AND YearId=".$_REQUEST['y'], $con); $sql5tb=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_hq where HqRepEmpID=".$HqEmpId." AND ProductId=".$res['ProductId']." AND YearId=".$AfterYId, $con); $res4tb=mysql_fetch_assoc($sql4tb); $res5tb=mysql_fetch_assoc($sql5tb);
$Ach4Q1=$res4ta['Qa']+$res4tb['Qa']; $Ach4Q2=$res4ta['Qb']+$res4tb['Qb']; 
$Ach4Q3=$res4ta['Qc']+$res4tb['Qc']; $Ach4Q4=$res4ta['Qd']+$res4tb['Qd'];
$Ach5Q1=$res5ta['Qa']+$res5tb['Qa']; $Ach5Q2=$res5ta['Qb']+$res5tb['Qb']; 
$Ach5Q3=$res5ta['Qc']+$res5tb['Qc']; $Ach5Q4=$res5ta['Qd']+$res5tb['Qd']; 

$sqlP2d=mysql_query("select * from hrm_sales_sal_details_area where AreaEmpID=".$HqEmpId." AND ProductId=".$res['ProductId']." AND YearId=".$_REQUEST['y'], $con); 
$sqlP3d=mysql_query("select * from hrm_sales_sal_details_area where AreaEmpID=".$HqEmpId." AND ProductId=".$res['ProductId']." AND YearId=".$AfterYId, $con); 

$sqlPchd=mysql_query("select SUM(M1_Ach) as sM1,SUM(M2_Ach) as sM2,SUM(M3_Ach) as sM3,SUM(M4_Ach) as sM4,SUM(M5_Ach) as sM5,SUM(M6_Ach) as sM6,SUM(M7_Ach) as sM7,SUM(M8_Ach) as sM8,SUM(M9_Ach) as sM9,SUM(M10_Ach) as sM10,SUM(M11_Ach) as sM11,SUM(M12_Ach) as sM12 from hrm_sales_sal_details_".$_REQUEST['y']." sd INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_sales_hq_temp hqt ON d.HqId=hqt.HqId INNER JOIN hrm_sales_reporting_level rl ON hqt.EmployeeID=rl.EmployeeID where HqTEmpStatus='A' AND (hqt.EmployeeID=".$HqEmpId." OR rl.R1=".$HqEmpId." OR rl.R2=".$HqEmpId." OR rl.R3=".$HqEmpId." OR rl.R4=".$HqEmpId." OR rl.R5=".$HqEmpId.") AND sd.ProductId=".$res['ProductId']." AND sd.YearId=".$_REQUEST['y'], $con); 

$sChk=mysql_query("select * from hrm_sales_arrange_prod sap INNER JOIN hrm_headquater hq ON sap.StateId=hq.StateId INNER JOIN hrm_sales_hq_temp hqt ON hq.HqId=hqt.HqId INNER JOIN hrm_sales_reporting_level rl ON hqt.EmployeeID=rl.EmployeeID where ProductId=".$res['ProductId']." AND ArrgStatus='Y' AND HqTEmpStatus='A' AND (hqt.EmployeeID=".$HqEmpId." OR rl.R1=".$HqEmpId." OR rl.R2=".$HqEmpId." OR rl.R3=".$HqEmpId." OR rl.R4=".$HqEmpId." OR rl.R5=".$HqEmpId.")", $con);
}

} 
elseif($rowRpt>0){
$sqlP0d=mysql_query("select SUM(M1_Ach) as sM1,SUM(M2_Ach) as sM2,SUM(M3_Ach) as sM3,SUM(M4_Ach) as sM4,SUM(M5_Ach) as sM5,SUM(M6_Ach) as sM6,SUM(M7_Ach) as sM7,SUM(M8_Ach) as sM8,SUM(M9_Ach) as sM9,SUM(M10_Ach) as sM10,SUM(M11_Ach) as sM11,SUM(M12_Ach) as sM12 from hrm_sales_sal_details_".$Before2YId." sd INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_sales_hq_temp hqt ON d.HqId=hqt.HqId INNER JOIN hrm_sales_reporting_level rl ON hqt.EmployeeID=rl.EmployeeID where HqTEmpStatus='A' AND (hqt.EmployeeID=".$HqEmpId." OR rl.R1=".$HqEmpId." OR rl.R2=".$HqEmpId." OR rl.R3=".$HqEmpId." OR rl.R4=".$HqEmpId." OR rl.R5=".$HqEmpId.") AND sd.ProductId=".$res['ProductId']." AND sd.YearId=".$Before2YId, $con); 
$sqlP1d=mysql_query("select SUM(M1_Ach) as sM1,SUM(M2_Ach) as sM2,SUM(M3_Ach) as sM3,SUM(M4_Ach) as sM4,SUM(M5_Ach) as sM5,SUM(M6_Ach) as sM6,SUM(M7_Ach) as sM7,SUM(M8_Ach) as sM8,SUM(M9_Ach) as sM9,SUM(M10_Ach) as sM10,SUM(M11_Ach) as sM11,SUM(M12_Ach) as sM12 from hrm_sales_sal_details_".$BeforeYId." sd INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_sales_hq_temp hqt ON d.HqId=hqt.HqId INNER JOIN hrm_sales_reporting_level rl ON hqt.EmployeeID=rl.EmployeeID where HqTEmpStatus='A' AND (hqt.EmployeeID=".$HqEmpId." OR rl.R1=".$HqEmpId." OR rl.R2=".$HqEmpId." OR rl.R3=".$HqEmpId." OR rl.R4=".$HqEmpId." OR rl.R5=".$HqEmpId.") AND sd.ProductId=".$res['ProductId']." AND sd.YearId=".$BeforeYId, $con); 

$sql4ta=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_terr where TerrRepEmpID=".$HqEmpId." AND ProductId=".$res['ProductId']." AND YearId=".$_REQUEST['y'], $con); $sql5ta=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_terr where TerrRepEmpID=".$HqEmpId." AND ProductId=".$res['ProductId']." AND YearId=".$AfterYId, $con); $res4ta=mysql_fetch_assoc($sql4ta); $res5ta=mysql_fetch_assoc($sql5ta);
$sql4tb=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_hq where HqRepEmpID=".$HqEmpId." AND ProductId=".$res['ProductId']." AND YearId=".$_REQUEST['y'], $con); $sql5tb=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_hq where HqRepEmpID=".$HqEmpId." AND ProductId=".$res['ProductId']." AND YearId=".$AfterYId, $con); $res4tb=mysql_fetch_assoc($sql4tb); $res5tb=mysql_fetch_assoc($sql5tb);
$Ach4Q1=$res4ta['Qa']+$res4tb['Qa']; $Ach4Q2=$res4ta['Qb']+$res4tb['Qb']; 
$Ach4Q3=$res4ta['Qc']+$res4tb['Qc']; $Ach4Q4=$res4ta['Qd']+$res4tb['Qd'];
$Ach5Q1=$res5ta['Qa']+$res5tb['Qa']; $Ach5Q2=$res5ta['Qb']+$res5tb['Qb']; 
$Ach5Q3=$res5ta['Qc']+$res5tb['Qc']; $Ach5Q4=$res5ta['Qd']+$res5tb['Qd'];

$sqlP2d=mysql_query("select * from hrm_sales_sal_details_terr where TerrEmpID=".$HqEmpId." AND TerrHqID=".$HqId." AND ProductId=".$res['ProductId']." AND YearId=".$_REQUEST['y'], $con); 
$sqlP3d=mysql_query("select * from hrm_sales_sal_details_terr where TerrEmpID=".$HqEmpId." AND TerrHqID=".$HqId." AND ProductId=".$res['ProductId']." AND YearId=".$AfterYId, $con); 

$sqlPchd=mysql_query("select SUM(M1_Ach) as sM1,SUM(M2_Ach) as sM2,SUM(M3_Ach) as sM3,SUM(M4_Ach) as sM4,SUM(M5_Ach) as sM5,SUM(M6_Ach) as sM6,SUM(M7_Ach) as sM7,SUM(M8_Ach) as sM8,SUM(M9_Ach) as sM9,SUM(M10_Ach) as sM10,SUM(M11_Ach) as sM11,SUM(M12_Ach) as sM12 from hrm_sales_sal_details_".$_REQUEST['y']." sd INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_sales_hq_temp hqt ON d.HqId=hqt.HqId INNER JOIN hrm_sales_reporting_level rl ON hqt.EmployeeID=rl.EmployeeID where HqTEmpStatus='A' AND (hqt.EmployeeID=".$HqEmpId." OR rl.R1=".$HqEmpId." OR rl.R2=".$HqEmpId." OR rl.R3=".$HqEmpId." OR rl.R4=".$HqEmpId." OR rl.R5=".$HqEmpId.") AND sd.ProductId=".$res['ProductId']." AND sd.YearId=".$_REQUEST['y'], $con); 

$sChk=mysql_query("select * from hrm_sales_arrange_prod sap INNER JOIN hrm_headquater hq ON sap.StateId=hq.StateId INNER JOIN hrm_sales_hq_temp hqt ON hq.HqId=hqt.HqId INNER JOIN hrm_sales_reporting_level rl ON hqt.EmployeeID=rl.EmployeeID where ProductId=".$res['ProductId']." AND ArrgStatus='Y' AND HqTEmpStatus='A' AND (hqt.EmployeeID=".$HqEmpId." OR rl.R1=".$HqEmpId." OR rl.R2=".$HqEmpId." OR rl.R3=".$HqEmpId." OR rl.R4=".$HqEmpId." OR rl.R5=".$HqEmpId.")", $con);

} 
elseif($rowRpt==0){
$sqlP0d=mysql_query("select SUM(M1_Ach) as sM1,SUM(M2_Ach) as sM2,SUM(M3_Ach) as sM3,SUM(M4_Ach) as sM4,SUM(M5_Ach) as sM5,SUM(M6_Ach) as sM6,SUM(M7_Ach) as sM7,SUM(M8_Ach) as sM8,SUM(M9_Ach) as sM9,SUM(M10_Ach) as sM10,SUM(M11_Ach) as sM11,SUM(M12_Ach) as sM12 from hrm_sales_sal_details_".$Before2YId." sd INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId where d.HqId=".$HqId." AND sd.ProductId=".$res['ProductId']." AND sd.YearId=".$Before2YId, $con);
$sqlP1d=mysql_query("select SUM(M1_Ach) as sM1,SUM(M2_Ach) as sM2,SUM(M3_Ach) as sM3,SUM(M4_Ach) as sM4,SUM(M5_Ach) as sM5,SUM(M6_Ach) as sM6,SUM(M7_Ach) as sM7,SUM(M8_Ach) as sM8,SUM(M9_Ach) as sM9,SUM(M10_Ach) as sM10,SUM(M11_Ach) as sM11,SUM(M12_Ach) as sM12 from hrm_sales_sal_details_".$BeforeYId." sd INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId where d.HqId=".$HqId." AND sd.ProductId=".$res['ProductId']." AND sd.YearId=".$BeforeYId, $con);

$sql4ta=mysql_query("select SUM(M1) as sM1,SUM(M2) as sM2,SUM(M3) as sM3,SUM(M4) as sM4,SUM(M5) as sM5,SUM(M6) as sM6,SUM(M7) as sM7,SUM(M8) as sM8,SUM(M9) as sM9,SUM(M10) as sM10,SUM(M11) as sM11,SUM(M12) as sM12 from hrm_sales_sal_details_".$_REQUEST['y']." sd INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId where d.HqId=".$HqId." AND sd.ProductId=".$res['ProductId']." AND sd.YearId=".$_REQUEST['y'], $con); 
$sql5ta=mysql_query("select SUM(M1_Proj) as sM1,SUM(M2_Proj) as sM2,SUM(M3_Proj) as sM3,SUM(M4_Proj) as sM4,SUM(M5_Proj) as sM5,SUM(M6_Proj) as sM6,SUM(M7_Proj) as sM7,SUM(M8_Proj) as sM8,SUM(M9_Proj) as sM9,SUM(M10_Proj) as sM10,SUM(M11_Proj) as sM11,SUM(M12_Proj) as sM12 from hrm_sales_sal_details_".$AfterYId." sd INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId where d.HqId=".$HqId." AND sd.ProductId=".$res['ProductId']." AND sd.YearId=".$AfterYId, $con); 
$res4ta=mysql_fetch_assoc($sql4ta); $res5ta=mysql_fetch_assoc($sql5ta);
$Ach4Q1=$res4ta['sM1']+$res4ta['sM2']+$res4ta['sM3']; $Ach4Q2=$res4ta['sM4']+$res4ta['sM5']+$res4ta['sM6'];
$Ach4Q3=$res4ta['sM7']+$res4ta['sM8']+$res4ta['sM9']; $Ach4Q4=$res4ta['sM10']+$res4ta['sM11']+$res4ta['sM12'];
$Ach5Q1=$res5ta['sM1']+$res5ta['sM2']+$res5ta['sM3']; $Ach5Q2=$res5ta['sM4']+$res5ta['sM5']+$res5ta['sM6'];
$Ach5Q3=$res5ta['sM7']+$res5ta['sM8']+$res5ta['sM9']; $Ach5Q4=$res5ta['sM10']+$res5ta['sM11']+$res5ta['sM12'];

$sqlP2d=mysql_query("select * from hrm_sales_sal_details_hq where HqId=".$HqId." AND ProductId=".$res['ProductId']." AND YearId=".$_REQUEST['y'], $con); 
$sqlP3d=mysql_query("select * from hrm_sales_sal_details_hq where HqId=".$HqId." AND ProductId=".$res['ProductId']." AND YearId=".$AfterYId, $con); 

$sqlPchd=mysql_query("select SUM(M1_Ach) as sM1,SUM(M2_Ach) as sM2,SUM(M3_Ach) as sM3,SUM(M4_Ach) as sM4,SUM(M5_Ach) as sM5,SUM(M6_Ach) as sM6,SUM(M7_Ach) as sM7,SUM(M8_Ach) as sM8,SUM(M9_Ach) as sM9,SUM(M10_Ach) as sM10,SUM(M11_Ach) as sM11,SUM(M12_Ach) as sM12 from hrm_sales_sal_details_".$_REQUEST['y']." sd INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId where d.HqId=".$HqId." AND sd.ProductId=".$res['ProductId']." AND sd.YearId=".$_REQUEST['y'], $con); 

$sChk=mysql_query("select * from hrm_sales_arrange_prod sap INNER JOIN hrm_headquater hq ON sap.StateId=hq.StateId INNER JOIN hrm_sales_hq_temp hqt ON hq.HqId=hqt.HqId where ProductId=".$res['ProductId']." AND ArrgStatus='Y' AND HqTEmpStatus='A' AND hqt.HqId=".$HqId, $con);

}
$resP0d=mysql_fetch_assoc($sqlP0d); 
$Ach0Q1=$resP0d['sM1']+$resP0d['sM2']+$resP0d['sM3']; $Ach0Q2=$resP0d['sM4']+$resP0d['sM5']+$resP0d['sM6'];
$Ach0Q3=$resP0d['sM7']+$resP0d['sM8']+$resP0d['sM9']; $Ach0Q4=$resP0d['sM10']+$resP0d['sM11']+$resP0d['sM12'];
$resP1d=mysql_fetch_assoc($sqlP1d);  
$AchQ1=$resP1d['sM1']+$resP1d['sM2']+$resP1d['sM3']; $AchQ2=$resP1d['sM4']+$resP1d['sM5']+$resP1d['sM6'];
$AchQ3=$resP1d['sM7']+$resP1d['sM8']+$resP1d['sM9']; $AchQ4=$resP1d['sM10']+$resP1d['sM11']+$resP1d['sM12']; 
$resP2d=mysql_fetch_assoc($sqlP2d); $resP3d=mysql_fetch_assoc($sqlP3d); 

$resPchd=mysql_fetch_assoc($sqlPchd);
$TP2chd1=$resPchd['sM1']+$resPchd['sM2']+$resPchd['sM3']; $TP2chd2=$resPchd['sM4']+$resPchd['sM5']+$resPchd['sM6']; 
$TP2chd3=$resPchd['sM7']+$resPchd['sM8']+$resPchd['sM9']; $TP2chd4=$resPchd['sM10']+$resPchd['sM11']+$resPchd['sM12'];
$TotP2chd=$TP2chd1+$TP2chd2+$TP2chd3+$TP2chd4;


$rowChkP=mysql_fetch_assoc($sChk);

if($RslP=='Y'){ $a1d=$TP2chd1; $a2d=$TP2chd2; $a3d=$TP2chd3; $a4d=$TP2chd4; } 
if($EntP=='Y'){ $a1d=$resP3d['Q1']; $a2d=$resP3d['Q2']; $a3d=$resP3d['Q3']; $a4d=$resP3d['Q4']; }

if($rowChkP>0 OR $Ach0Q1!=0 OR $Ach0Q2!=0 OR $Ach0Q3!=0 OR $Ach0Q4!=0 OR $AchQ1!=0 OR $AchQ2!=0 OR $AchQ3!=0 OR $AchQ4!=0 OR $Ach4Q1!=0 OR $Ach4Q2!=0 OR $Ach4Q3!=0 OR $Ach4Q4!=0 OR $Ach5Q1!=0 OR $Ach5Q2!=0 OR $Ach5Q3!=0 OR $Ach5Q4!=0 OR $resP2d['Q1']!=0 OR $resP2d['Q2']!=0 OR $resP2d['Q3']!=0 OR $resP2d['Q4']!=0 OR $a1d!=0 OR $a2d!=0 OR $a3d!=0 OR $a4d!=0) {

?>	  
   <tr bgcolor="#EEEEEE" style="height:22px;">
<?php if($_REQUEST['ii']=='All_1' OR $_REQUEST['ii']=='All_2'){ ?>	  
     <td bgcolor="#FFFFFF"><input class="Inputt" style="width:100px;" value="<?php echo $res['ItemName']; ?>"/></td>
<?php } ?>		 
	 <td bgcolor="#FFFFFF"><input class="Inputt" style="width:120px;" value="<?php echo $res['ProductName']; ?>" /><input type="hidden" id="<?php echo $HqId.'_'.$HqEmpId; ?>P_<?php echo $Sn; ?>" value="<?php echo $res['ProductId']; ?>" /></td>
	<td bgcolor="#FFFFFF" align="center" style="font-size:12px;"><?php echo substr_replace($res['TypeName'], '', 2); ?></td>
	<td align="center" valign="middle" bgcolor="#FFFFFF">
	   <?php if($resCPerMi['EditPerMi']=='Y' AND $EntP=='Y'){ ?>
	   <?php if($rowSubEmp==0){?>
<img src="images/edit.png" border="0" alt="Edit" id="<?php echo $HqId.'_'.$HqEmpId; ?>EditBtn_<?php echo $Sn; ?>" onClick="editD(<?php echo $Sn.', '.$resRepHq['GradeId'].', '.$HqEmpId.', '.$HqId; ?>)" style="display:block;">
<img src="images/Floppy-Small-icon.png" border="0" alt="Save" id="<?php echo $HqId.'_'.$HqEmpId; ?>SaveBtn_<?php echo $Sn; ?>" onClick="saveD(<?php echo $Sn.', '.$_REQUEST['y'].', '.$resRepHq['GradeId'].', '.$HqEmpId.', '.$rowRpt.', '.$HqId; ?>)" style="display:none;">
	   <?php } ?>
	   <?php } else {echo '&nbsp;';}?>
	</td>
<td><input class="Input" id="<?php echo $HqId.'_'.$HqEmpId; ?>M1_De<?php echo $Sn; ?>" value="<?php if($Ach0Q1!=0 AND $Ach0Q1!=0){echo $Ach0Q1;} ?>" readonly/></td>						
<td><input class="Input" id="<?php echo $HqId.'_'.$HqEmpId; ?>M1_Ae<?php echo $Sn; ?>" value="<?php if($AchQ1!=0 AND $AchQ1!=0){echo $AchQ1;} ?>" readonly/></td>
<td><input class="Input" id="<?php echo $HqId.'_'.$HqEmpId.'M1a'.$Sn; ?>" value="<?php if($Ach4Q1!=0 AND $Ach4Q1!=0){echo $Ach4Q1;} ?>" readonly/></td>
<td><input class="Input" id="<?php echo $HqId.'_'.$HqEmpId.'M1b'.$Sn; ?>" value="<?php if($Ach5Q1!=0 AND $Ach5Q1!=0){echo $Ach5Q1;} ?>" readonly/></td>
<td><input class="Input" id="<?php echo $HqId.'_'.$HqEmpId; ?>M1_Be<?php echo $Sn; ?>" style="background-color:#D3FED7;" value="<?php if($resP2d['Q1']!='' AND $resP2d['Q1']!=0){echo floatval($resP2d['Q1']);} ?>"/></td>
<?php if($RslP=='Y'){ ?><td><input class="Input" style="background-color:#D3FED7;" value="<?php if($TP2chd1!=0){echo $TP2chd1;} ?>" readonly/></td><?php } ?>
<?php if($EntP=='Y'){ ?><td><input class="Input" id="<?php echo $HqId.'_'.$HqEmpId; ?>M1_Ce<?php echo $Sn; ?>" style="background-color:#D3FED7;" value="<?php if($resP3d['Q1']!='' AND $resP3d['Q1']!=0){echo floatval($resP3d['Q1']);} ?>"/></td><?php } ?>

<td><input class="Input" id="<?php echo $HqId.'_'.$HqEmpId; ?>M2_De<?php echo $Sn; ?>" value="<?php if($Ach0Q2!='' AND $Ach0Q2!=0){echo $Ach0Q2;} ?>" readonly/></td>
<td><input class="Input" id="<?php echo $HqId.'_'.$HqEmpId; ?>M2_Ae<?php echo $Sn; ?>" value="<?php if($AchQ2!='' AND $AchQ2!=0){echo $AchQ2;} ?>" readonly/></td>
<td><input class="Input" id="<?php echo $HqId.'_'.$HqEmpId.'M2a'.$Sn; ?>" value="<?php if($Ach4Q2!='' AND $Ach4Q2!=0){echo $Ach4Q2;} ?>" readonly/></td>
<td><input class="Input" id="<?php echo $HqId.'_'.$HqEmpId.'M2b'.$Sn; ?>" value="<?php if($Ach5Q2!='' AND $Ach5Q2!=0){echo $Ach5Q2;} ?>" readonly/></td>
<td><input class="Input" id="<?php echo $HqId.'_'.$HqEmpId; ?>M2_Be<?php echo $Sn; ?>" style="background-color:#D3FED7;" value="<?php if($resP2d['Q2']!='' AND $resP2d['Q2']!=0){echo floatval($resP2d['Q2']);} ?>"/></td>
<?php if($RslP=='Y'){ ?><td><input class="Input" style="background-color:#D3FED7;" value="<?php if($TP2chd2!=0){echo $TP2chd2;} ?>" readonly/></td><?php } ?>
<?php if($EntP=='Y'){ ?><td><input class="Input" id="<?php echo $HqId.'_'.$HqEmpId; ?>M2_Ce<?php echo $Sn; ?>" style="background-color:#D3FED7;" value="<?php if($resP3d['Q2']!='' AND $resP3d['Q2']!=0){echo floatval($resP3d['Q2']);} ?>"/></td><?php } ?>

<td><input class="Input" id="<?php echo $HqId.'_'.$HqEmpId; ?>M3_De<?php echo $Sn; ?>" value="<?php if($Ach0Q3!='' AND $Ach0Q3!=0){echo $Ach0Q3;} ?>" readonly/></td>
<td><input class="Input" id="<?php echo $HqId.'_'.$HqEmpId; ?>M3_Ae<?php echo $Sn; ?>" value="<?php if($AchQ3!='' AND $AchQ3!=0){echo $AchQ3;} ?>" readonly/></td>
<td><input class="Input" id="<?php echo $HqId.'_'.$HqEmpId.'M3a'.$Sn; ?>" value="<?php if($Ach4Q3!='' AND $Ach4Q3!=0){echo $Ach4Q3;} ?>" readonly/></td>
<td><input class="Input" id="<?php echo $HqId.'_'.$HqEmpId.'M3b'.$Sn; ?>" value="<?php if($Ach5Q3!='' AND $Ach5Q3!=0){echo $Ach5Q3;} ?>" readonly/></td>	
<td><input class="Input" id="<?php echo $HqId.'_'.$HqEmpId; ?>M3_Be<?php echo $Sn; ?>" style="background-color:#D3FED7;" value="<?php if($resP2d['Q3']!='' AND $resP2d['Q3']!=0){echo floatval($resP2d['Q3']);} ?>"/></td>
<?php if($RslP=='Y'){ ?><td><input class="Input" style="background-color:#D3FED7;" value="<?php if($TP2chd3!=0){echo $TP2chd3;} ?>" readonly/></td><?php } ?>
<?php if($EntP=='Y'){ ?><td><input class="Input" id="<?php echo $HqId.'_'.$HqEmpId; ?>M3_Ce<?php echo $Sn; ?>" style="background-color:#D3FED7;" value="<?php if($resP3d['Q3']!='' AND $resP3d['Q3']!=0){echo floatval($resP3d['Q3']);} ?>"/></td><?php } ?>
	
<td><input class="Input" id="<?php echo $HqId.'_'.$HqEmpId; ?>M4_De<?php echo $Sn; ?>" value="<?php if($Ach0Q4!='' AND $Ach0Q4!=0){echo $Ach0Q4;} ?>" readonly/></td> 
<td><input class="Input" id="<?php echo $HqId.'_'.$HqEmpId; ?>M4_Ae<?php echo $Sn; ?>" value="<?php if($AchQ4!='' AND $AchQ4!=0){echo $AchQ4;} ?>" readonly/></td>
<td><input class="Input" id="<?php echo $HqId.'_'.$HqEmpId.'M4a'.$Sn; ?>" value="<?php if($Ach4Q4!='' AND $Ach4Q4!=0){echo $Ach4Q4;} ?>" readonly/></td>
<td><input class="Input" id="<?php echo $HqId.'_'.$HqEmpId.'M4b'.$Sn; ?>" value="<?php if($Ach5Q4!='' AND $Ach5Q4!=0){echo $Ach5Q4;} ?>" readonly/></td>
<td><input class="Input" id="<?php echo $HqId.'_'.$HqEmpId; ?>M4_Be<?php echo $Sn; ?>" style="background-color:#D3FED7;" value="<?php if($resP2d['Q4']!='' AND $resP2d['Q4']!=0){echo floatval($resP2d['Q4']);} ?>"/></td>
<?php if($RslP=='Y'){ ?><td><input class="Input" style="background-color:#D3FED7;" value="<?php if($TP2chd4!=0){echo $TP2chd4;} ?>" readonly/></td><?php } ?>
<?php if($EntP=='Y'){ ?><td><input class="Input" id="<?php echo $HqId.'_'.$HqEmpId; ?>M4_Ce<?php echo $Sn; ?>" style="background-color:#D3FED7;" value="<?php if($resP3d['Q4']!='' AND $resP3d['Q4']!=0){echo floatval($resP3d['Q4']);} ?>"/></td><?php } ?>

<?php 
$TotP0d=$Ach0Q1+$Ach0Q2+$Ach0Q3+$Ach0Q4; $TotP1d=$AchQ1+$AchQ2+$AchQ3+$AchQ4; $TotP4d=$Ach4Q1+$Ach4Q2+$Ach4Q3+$Ach4Q4;  $TotP5d=$Ach5Q1+$Ach5Q2+$Ach5Q3+$Ach5Q4; 
$TotP2d=$resP2d['Q1']+$resP2d['Q2']+$resP2d['Q3']+$resP2d['Q4']; 
$TotP3d=$resP3d['Q1']+$resP3d['Q2']+$resP3d['Q3']+$resP3d['Q4']; 
?>	 
<td><input class="InputB" id="<?php echo $HqId.'_'.$HqEmpId; ?>TotP0d_<?php echo $Sn; ?>" value="<?php if($TotP0d!=0 AND $TotP0d!=''){echo $TotP0d;}else{echo '';} ?>" readonly/></td>
<td><input class="InputB" id="<?php echo $HqId.'_'.$HqEmpId; ?>TotP1d_<?php echo $Sn; ?>" value="<?php if($TotP1d!=0 AND $TotP1d!=''){echo $TotP1d;}else{echo '';} ?>" readonly/></td>
<td><input class="InputB" id="<?php echo $HqId.'_'.$HqEmpId.'MTota'.$Sn; ?>" value="<?php if($TotP4d!=0 AND $TotP4d!=''){echo $TotP4d;}else{echo '';} ?>" readonly/></td>
<td><input class="InputB" id="<?php echo $HqId.'_'.$HqEmpId.'MTotb'.$Sn; ?>" value="<?php if($TotP5d!=0 AND $TotP5d!=''){echo $TotP5d;}else{echo '';} ?>" readonly/></td>	
<td><input class="InputB" id="<?php echo $HqId.'_'.$HqEmpId; ?>TotP2d_<?php echo $Sn; ?>" value="<?php if($TotP2d!=0 AND $TotP2d!=''){echo $TotP2d;}else{echo '';} ?>" readonly/></td>
<?php if($RslP=='Y'){ ?><td><input class="InputB" value="<?php if($TotP2chd!=0){echo $TotP2chd;}else{echo '';} ?>" readonly/></td><?php } ?>
<?php if($EntP=='Y'){ ?><td><input class="InputB" id="<?php echo $HqId.'_'.$HqEmpId; ?>TotP3d_<?php echo $Sn; ?>" value="<?php if($TotP3d!=0 AND $TotP3d!=''){echo $TotP3d;}else{echo '';} ?>" readonly/></td><?php } ?>
	
  </tr>	
<?php } $Sn++; }  ?>     
<?php if($_REQUEST['ii']!='All_1' AND $_REQUEST['ii']!='All_2'){ 
if($HqEmpId==$EmployeeId){
$sqlP0td=mysql_query("select SUM(M1_Ach) as tsM1,SUM(M2_Ach) as tsM2,SUM(M3_Ach) as tsM3,SUM(M4_Ach) as tsM4,SUM(M5_Ach) as tsM5,SUM(M6_Ach) as tsM6,SUM(M7_Ach) as tsM7,SUM(M8_Ach) as tsM8,SUM(M9_Ach) as tsM9,SUM(M10_Ach) as tsM10,SUM(M11_Ach) as tsM11,SUM(M12_Ach) as tsM12 from hrm_sales_sal_details_".$Before2YId." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId where d.HqId=".$HqId." AND sp.ItemId=".$_REQUEST['ii']." AND sd.YearId=".$Before2YId, $con);
$sqlP1td=mysql_query("select SUM(M1_Ach) as tsM1,SUM(M2_Ach) as tsM2,SUM(M3_Ach) as tsM3,SUM(M4_Ach) as tsM4,SUM(M5_Ach) as tsM5,SUM(M6_Ach) as tsM6,SUM(M7_Ach) as tsM7,SUM(M8_Ach) as tsM8,SUM(M9_Ach) as tsM9,SUM(M10_Ach) as tsM10,SUM(M11_Ach) as tsM11,SUM(M12_Ach) as tsM12 from hrm_sales_sal_details_".$BeforeYId." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId where d.HqId=".$HqId." AND sp.ItemId=".$_REQUEST['ii']." AND sd.YearId=".$BeforeYId, $con);

$sqlP4td=mysql_query("select SUM(M1) as sM1,SUM(M2) as sM2,SUM(M3) as sM3,SUM(M4) as sM4,SUM(M5) as sM5,SUM(M6) as sM6,SUM(M7) as sM7,SUM(M8) as sM8,SUM(M9) as sM9,SUM(M10) as sM10,SUM(M11) as sM11,SUM(M12) as sM12 from hrm_sales_sal_details_".$_REQUEST['y']." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId where d.HqId=".$HqId." AND sp.ItemId=".$_REQUEST['ii']." AND sd.YearId=".$_REQUEST['y'], $con); 
$sqlP5td=mysql_query("select SUM(M1_Proj) as sM1,SUM(M2_Proj) as sM2,SUM(M3_Proj) as sM3,SUM(M4_Proj) as sM4,SUM(M5_Proj) as sM5,SUM(M6_Proj) as sM6,SUM(M7_Proj) as sM7,SUM(M8_Proj) as sM8,SUM(M9_Proj) as sM9,SUM(M10_Proj) as sM10,SUM(M11_Proj) as sM11,SUM(M12_Proj) as sM12 from hrm_sales_sal_details_".$AfterYId." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId where d.HqId=".$HqId." AND sp.ItemId=".$_REQUEST['ii']." AND sd.YearId=".$AfterYId, $con); 
$resP4td=mysql_fetch_assoc($sqlP4td); $resP5td=mysql_fetch_assoc($sqlP5td);
$Acht4Q1=$resP4td['sM1']+$resP4td['sM2']+$resP4td['sM3']; $Acht4Q2=$resP4td['sM4']+$resP4td['sM5']+$resP4td['sM6'];
$Acht4Q3=$resP4td['sM7']+$resP4td['sM8']+$resP4td['sM9']; $Acht4Q4=$resP4td['sM10']+$resP4td['sM11']+$resP4td['sM12'];
$Acht5Q1=$resP5td['sM1']+$resP5td['sM2']+$resP5td['sM3']; $Acht5Q2=$resP5td['sM4']+$resP5td['sM5']+$resP5td['sM6'];
$Acht5Q3=$resP5td['sM7']+$resP5td['sM8']+$resP5td['sM9']; $Acht5Q4=$resP5td['sM10']+$resP5td['sM11']+$resP5td['sM12'];

$sqlP2td=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_terr sdt INNER JOIN hrm_sales_seedsproduct sp ON sdt.ProductId=sp.ProductId where sdt.TerrEmpID=".$HqEmpId." AND sdt.TerrHqID=".$HqId." AND sp.ItemId=".$_REQUEST['ii']." AND sdt.YearId=".$_REQUEST['y'], $con); 
$sqlP3td=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_terr sdt INNER JOIN hrm_sales_seedsproduct sp ON sdt.ProductId=sp.ProductId where sdt.TerrEmpID=".$HqEmpId." AND sdt.TerrHqID=".$HqId." AND sp.ItemId=".$_REQUEST['ii']." AND sdt.YearId=".$AfterYId, $con);

$sqlPchtd=mysql_query("select SUM(M1_Ach) as sM1,SUM(M2_Ach) as sM2,SUM(M3_Ach) as sM3,SUM(M4_Ach) as sM4,SUM(M5_Ach) as sM5,SUM(M6_Ach) as sM6,SUM(M7_Ach) as sM7,SUM(M8_Ach) as sM8,SUM(M9_Ach) as sM9,SUM(M10_Ach) as sM10,SUM(M11_Ach) as sM11,SUM(M12_Ach) as sM12 from hrm_sales_sal_details_".$_REQUEST['y']." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId where d.HqId=".$HqId." AND sp.ItemId=".$_REQUEST['ii']." AND sd.YearId=".$_REQUEST['y'], $con);
}
elseif($resEgv['GradeValue']=='M2' OR $resEgv['GradeValue']=='M3'){ 

if($rowRpt==0)
{
$sqlP0td=mysql_query("select SUM(M1_Ach) as tsM1,SUM(M2_Ach) as tsM2,SUM(M3_Ach) as tsM3,SUM(M4_Ach) as tsM4,SUM(M5_Ach) as tsM5,SUM(M6_Ach) as tsM6,SUM(M7_Ach) as tsM7,SUM(M8_Ach) as tsM8,SUM(M9_Ach) as tsM9,SUM(M10_Ach) as tsM10,SUM(M11_Ach) as tsM11,SUM(M12_Ach) as tsM12 from hrm_sales_sal_details_".$Before2YId." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId where d.HqId=".$HqId." AND sp.ItemId=".$_REQUEST['ii']." AND sd.YearId=".$Before2YId, $con);

$sqlP1td=mysql_query("select SUM(M1_Ach) as tsM1,SUM(M2_Ach) as tsM2,SUM(M3_Ach) as tsM3,SUM(M4_Ach) as tsM4,SUM(M5_Ach) as tsM5,SUM(M6_Ach) as tsM6,SUM(M7_Ach) as tsM7,SUM(M8_Ach) as tsM8,SUM(M9_Ach) as tsM9,SUM(M10_Ach) as tsM10,SUM(M11_Ach) as tsM11,SUM(M12_Ach) as tsM12 from hrm_sales_sal_details_".$BeforeYId." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId where d.HqId=".$HqId." AND sp.ItemId=".$_REQUEST['ii']." AND sd.YearId=".$BeforeYId, $con);

$sql4ta2=mysql_query("select SUM(M1) as sM1,SUM(M2) as sM2,SUM(M3) as sM3,SUM(M4) as sM4,SUM(M5) as sM5,SUM(M6) as sM6,SUM(M7) as sM7,SUM(M8) as sM8,SUM(M9) as sM9,SUM(M10) as sM10,SUM(M11) as sM11,SUM(M12) as sM12 from hrm_sales_sal_details_".$_REQUEST['y']." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId where d.HqId=".$HqId." AND sp.ItemId=".$_REQUEST['ii']." AND sd.YearId=".$_REQUEST['y'], $con); 

$sql5ta2=mysql_query("select SUM(M1_Proj) as sM1,SUM(M2_Proj) as sM2,SUM(M3_Proj) as sM3,SUM(M4_Proj) as sM4,SUM(M5_Proj) as sM5,SUM(M6_Proj) as sM6,SUM(M7_Proj) as sM7,SUM(M8_Proj) as sM8,SUM(M9_Proj) as sM9,SUM(M10_Proj) as sM10,SUM(M11_Proj) as sM11,SUM(M12_Proj) as sM12 from hrm_sales_sal_details_".$AfterYId." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId where d.HqId=".$HqId." AND sp.ItemId=".$_REQUEST['ii']." AND sd.YearId=".$AfterYId, $con); 
$res4ta2=mysql_fetch_assoc($sql4ta2); $res5ta2=mysql_fetch_assoc($sql5ta2);
$Acht4Q1=$res4ta2['sM1']+$res4ta2['sM2']+$res4ta2['sM3']; $Acht4Q2=$res4ta2['sM4']+$res4ta2['sM5']+$res4ta2['sM6'];
$Acht4Q3=$res4ta2['sM7']+$res4ta2['sM8']+$res4ta2['sM9']; $Acht4Q4=$res4ta2['sM10']+$res4ta2['sM11']+$res4ta2['sM12'];
$Acht5Q1=$res5ta2['sM1']+$res5ta2['sM2']+$res5ta2['sM3']; $Acht5Q2=$res5ta2['sM4']+$res5ta2['sM5']+$res5ta2['sM6'];
$Acht5Q3=$res5ta2['sM7']+$res5ta2['sM8']+$res5ta2['sM9']; $Acht5Q4=$res5ta2['sM10']+$res5ta2['sM11']+$res5ta2['sM12'];

$sqlP2td=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_hq sdh INNER JOIN hrm_sales_seedsproduct sp ON sdh.ProductId=sp.ProductId where sdh.HqId=".$HqId." AND sp.ItemId=".$_REQUEST['ii']." AND sdh.YearId=".$_REQUEST['y'], $con); 
$sqlP3td=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_hq sdh INNER JOIN hrm_sales_seedsproduct sp ON sdh.ProductId=sp.ProductId where sdh.HqId=".$HqId." AND sp.ItemId=".$_REQUEST['ii']." AND sdh.YearId=".$AfterYId, $con); 

$sqlPchtd=mysql_query("select SUM(M1_Ach) as sM1,SUM(M2_Ach) as sM2,SUM(M3_Ach) as sM3,SUM(M4_Ach) as sM4,SUM(M5_Ach) as sM5,SUM(M6_Ach) as sM6,SUM(M7_Ach) as sM7,SUM(M8_Ach) as sM8,SUM(M9_Ach) as sM9,SUM(M10_Ach) as sM10,SUM(M11_Ach) as sM11,SUM(M12_Ach) as sM12 from hrm_sales_sal_details_".$_REQUEST['y']." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId where d.HqId=".$HqId." AND sp.ItemId=".$_REQUEST['ii']." AND sd.YearId=".$_REQUEST['y'], $con);

}
else
{
$sqlP0td=mysql_query("select SUM(M1_Ach) as tsM1,SUM(M2_Ach) as tsM2,SUM(M3_Ach) as tsM3,SUM(M4_Ach) as tsM4,SUM(M5_Ach) as tsM5,SUM(M6_Ach) as tsM6,SUM(M7_Ach) as tsM7,SUM(M8_Ach) as tsM8,SUM(M9_Ach) as tsM9,SUM(M10_Ach) as tsM10,SUM(M11_Ach) as tsM11,SUM(M12_Ach) as tsM12 from hrm_sales_sal_details_".$Before2YId." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_sales_hq_temp hqt ON d.HqId=hqt.HqId INNER JOIN hrm_sales_reporting_level rl ON hqt.EmployeeID=rl.EmployeeID where HqTEmpStatus='A' AND (hqt.EmployeeID=".$HqEmpId." OR rl.R1=".$HqEmpId." OR rl.R2=".$HqEmpId." OR rl.R3=".$HqEmpId." OR rl.R4=".$HqEmpId." OR rl.R5=".$HqEmpId.") AND sp.ItemId=".$_REQUEST['ii']." AND sd.YearId=".$Before2YId, $con);

$sqlP1td=mysql_query("select SUM(M1_Ach) as tsM1,SUM(M2_Ach) as tsM2,SUM(M3_Ach) as tsM3,SUM(M4_Ach) as tsM4,SUM(M5_Ach) as tsM5,SUM(M6_Ach) as tsM6,SUM(M7_Ach) as tsM7,SUM(M8_Ach) as tsM8,SUM(M9_Ach) as tsM9,SUM(M10_Ach) as tsM10,SUM(M11_Ach) as tsM11,SUM(M12_Ach) as tsM12 from hrm_sales_sal_details_".$BeforeYId." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_sales_hq_temp hqt ON d.HqId=hqt.HqId INNER JOIN hrm_sales_reporting_level rl ON hqt.EmployeeID=rl.EmployeeID where HqTEmpStatus='A' AND (hqt.EmployeeID=".$HqEmpId." OR rl.R1=".$HqEmpId." OR rl.R2=".$HqEmpId." OR rl.R3=".$HqEmpId." OR rl.R4=".$HqEmpId." OR rl.R5=".$HqEmpId.") AND sp.ItemId=".$_REQUEST['ii']." AND sd.YearId=".$BeforeYId, $con);

$sql4ta2=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_terr sdt INNER JOIN hrm_sales_seedsproduct sp ON sdt.ProductId=sp.ProductId where sdt.TerrRepEmpID=".$HqEmpId." AND sp.ItemId=".$_REQUEST['ii']." AND sdt.YearId=".$_REQUEST['y'], $con); 
$sql5ta2=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_terr sdt INNER JOIN hrm_sales_seedsproduct sp ON sdt.ProductId=sp.ProductId where sdt.TerrRepEmpID=".$HqEmpId." AND sp.ItemId=".$_REQUEST['ii']." AND sdt.YearId=".$AfterYId, $con); $res4ta2=mysql_fetch_assoc($sql4ta2); $res5ta2=mysql_fetch_assoc($sql5ta2);
$sql4tb2=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_hq sdh INNER JOIN hrm_sales_seedsproduct sp ON sdh.ProductId=sp.ProductId where sdh.HqRepEmpID=".$HqEmpId." AND sp.ItemId=".$_REQUEST['ii']." AND sdh.YearId=".$_REQUEST['y'], $con); 
$sql5tb2=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_hq sdh INNER JOIN hrm_sales_seedsproduct sp ON sdh.ProductId=sp.ProductId where sdh.HqRepEmpID=".$HqEmpId." AND sp.ItemId=".$_REQUEST['ii']." AND sdh.YearId=".$AfterYId, $con); $res4tb2=mysql_fetch_assoc($sql4tb2); $res5tb2=mysql_fetch_assoc($sql5tb2);
$Acht4Q1=$res4ta2['Qa']+$res4tb2['Qa']; $Acht4Q2=$res4ta2['Qb']+$res4tb2['Qb']; 
$Acht4Q3=$res4ta2['Qc']+$res4tb2['Qc']; $Acht4Q4=$res4ta2['Qd']+$res4tb2['Qd'];
$Acht5Q1=$res5ta2['Qa']+$res5tb2['Qa']; $Acht5Q2=$res5ta2['Qb']+$res5tb2['Qb']; 
$Acht5Q3=$res5ta2['Qc']+$res5tb2['Qc']; $Acht5Q4=$res5ta2['Qd']+$res5tb2['Qd'];

$sqlP2td=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_area sda INNER JOIN hrm_sales_seedsproduct sp ON sda.ProductId=sp.ProductId where sda.AreaEmpID=".$HqEmpId." AND sp.ItemId=".$_REQUEST['ii']." AND sda.YearId=".$_REQUEST['y'], $con); 
$sqlP3td=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_area sda INNER JOIN hrm_sales_seedsproduct sp ON sda.ProductId=sp.ProductId where sda.AreaEmpID=".$HqEmpId." AND sp.ItemId=".$_REQUEST['ii']." AND sda.YearId=".$AfterYId, $con);

$sqlPchtd=mysql_query("select SUM(M1_Ach) as sM1,SUM(M2_Ach) as sM2,SUM(M3_Ach) as sM3,SUM(M4_Ach) as sM4,SUM(M5_Ach) as sM5,SUM(M6_Ach) as sM6,SUM(M7_Ach) as sM7,SUM(M8_Ach) as sM8,SUM(M9_Ach) as sM9,SUM(M10_Ach) as sM10,SUM(M11_Ach) as sM11,SUM(M12_Ach) as sM12 from hrm_sales_sal_details_".$_REQUEST['y']." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_sales_hq_temp hqt ON d.HqId=hqt.HqId INNER JOIN hrm_sales_reporting_level rl ON hqt.EmployeeID=rl.EmployeeID where HqTEmpStatus='A' AND (hqt.EmployeeID=".$HqEmpId." OR rl.R1=".$HqEmpId." OR rl.R2=".$HqEmpId." OR rl.R3=".$HqEmpId." OR rl.R4=".$HqEmpId." OR rl.R5=".$HqEmpId.") AND sp.ItemId=".$_REQUEST['ii']." AND sd.YearId=".$_REQUEST['y'], $con);
}

} 
elseif($rowRpt>0){
$sqlP0td=mysql_query("select SUM(M1_Ach) as tsM1,SUM(M2_Ach) as tsM2,SUM(M3_Ach) as tsM3,SUM(M4_Ach) as tsM4,SUM(M5_Ach) as tsM5,SUM(M6_Ach) as tsM6,SUM(M7_Ach) as tsM7,SUM(M8_Ach) as tsM8,SUM(M9_Ach) as tsM9,SUM(M10_Ach) as tsM10,SUM(M11_Ach) as tsM11,SUM(M12_Ach) as tsM12 from hrm_sales_sal_details_".$Before2YId." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_sales_hq_temp hqt ON d.HqId=hqt.HqId INNER JOIN hrm_sales_reporting_level rl ON hqt.EmployeeID=rl.EmployeeID where HqTEmpStatus='A' AND (hqt.EmployeeID=".$HqEmpId." OR rl.R1=".$HqEmpId." OR rl.R2=".$HqEmpId." OR rl.R3=".$HqEmpId." OR rl.R4=".$HqEmpId." OR rl.R5=".$HqEmpId.") AND sp.ItemId=".$_REQUEST['ii']." AND sd.YearId=".$Before2YId, $con); 

$sqlP1td=mysql_query("select SUM(M1_Ach) as tsM1,SUM(M2_Ach) as tsM2,SUM(M3_Ach) as tsM3,SUM(M4_Ach) as tsM4,SUM(M5_Ach) as tsM5,SUM(M6_Ach) as tsM6,SUM(M7_Ach) as tsM7,SUM(M8_Ach) as tsM8,SUM(M9_Ach) as tsM9,SUM(M10_Ach) as tsM10,SUM(M11_Ach) as tsM11,SUM(M12_Ach) as tsM12 from hrm_sales_sal_details_".$BeforeYId." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_sales_hq_temp hqt ON d.HqId=hqt.HqId INNER JOIN hrm_sales_reporting_level rl ON hqt.EmployeeID=rl.EmployeeID where HqTEmpStatus='A' AND (hqt.EmployeeID=".$HqEmpId." OR rl.R1=".$HqEmpId." OR rl.R2=".$HqEmpId." OR rl.R3=".$HqEmpId." OR rl.R4=".$HqEmpId." OR rl.R5=".$HqEmpId.") AND sp.ItemId=".$_REQUEST['ii']." AND sd.YearId=".$BeforeYId, $con);

$sql4ta2=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_terr sdt INNER JOIN hrm_sales_seedsproduct sp ON sdt.ProductId=sp.ProductId where sdt.TerrRepEmpID=".$HqEmpId." AND sp.ItemId=".$_REQUEST['ii']." AND sdt.YearId=".$_REQUEST['y'], $con); $res4ta2=mysql_fetch_assoc($sql4ta2);
$sql5ta2=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_terr sdt INNER JOIN hrm_sales_seedsproduct sp ON sdt.ProductId=sp.ProductId where sdt.TerrRepEmpID=".$HqEmpId." AND sp.ItemId=".$_REQUEST['ii']." AND sdt.YearId=".$AfterYId, $con); $res5ta2=mysql_fetch_assoc($sql5ta2);
$sql4tb2=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_hq sdh INNER JOIN hrm_sales_seedsproduct sp ON sdh.ProductId=sp.ProductId where sdh.HqRepEmpID=".$HqEmpId." AND sp.ItemId=".$_REQUEST['ii']." AND sdh.YearId=".$_REQUEST['y'], $con); 
$sql5tb2=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_hq sdh INNER JOIN hrm_sales_seedsproduct sp ON sdh.ProductId=sp.ProductId where sdh.HqRepEmpID=".$HqEmpId." AND sp.ItemId=".$_REQUEST['ii']." AND sdh.YearId=".$AfterYId, $con); $res4tb2=mysql_fetch_assoc($sql4tb2); $res5tb2=mysql_fetch_assoc($sql5tb2);
$Acht4Q1=$res4ta2['Qa']+$res4tb2['Qa']; $Acht4Q2=$res4ta2['Qb']+$res4tb2['Qb']; 
$Acht4Q3=$res4ta2['Qc']+$res4tb2['Qc']; $Acht4Q4=$res4ta2['Qd']+$res4tb2['Qd'];
$Acht5Q1=$res5ta2['Qa']+$res5tb2['Qa']; $Acht5Q2=$res5ta2['Qb']+$res5tb2['Qb']; 
$Acht5Q3=$res5ta2['Qc']+$res5tb2['Qc']; $Acht5Q4=$res5ta2['Qd']+$res5tb2['Qd']; 

$sqlP2td=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_terr sdt INNER JOIN hrm_sales_seedsproduct sp ON sdt.ProductId=sp.ProductId where sdt.TerrEmpID=".$HqEmpId." AND sdt.TerrHqID=".$HqId." AND sp.ItemId=".$_REQUEST['ii']." AND sdt.YearId=".$_REQUEST['y'], $con); 
$sqlP3td=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_terr sdt INNER JOIN hrm_sales_seedsproduct sp ON sdt.ProductId=sp.ProductId where sdt.TerrEmpID=".$HqEmpId." AND sdt.TerrHqID=".$HqId." AND sp.ItemId=".$_REQUEST['ii']." AND sdt.YearId=".$AfterYId, $con);

$sqlPchtd=mysql_query("select SUM(M1_Ach) as sM1,SUM(M2_Ach) as sM2,SUM(M3_Ach) as sM3,SUM(M4_Ach) as sM4,SUM(M5_Ach) as sM5,SUM(M6_Ach) as sM6,SUM(M7_Ach) as sM7,SUM(M8_Ach) as sM8,SUM(M9_Ach) as sM9,SUM(M10_Ach) as sM10,SUM(M11_Ach) as sM11,SUM(M12_Ach) as sM12 from hrm_sales_sal_details_".$_REQUEST['y']." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_sales_hq_temp hqt ON d.HqId=hqt.HqId INNER JOIN hrm_sales_reporting_level rl ON hqt.EmployeeID=rl.EmployeeID where HqTEmpStatus='A' AND (hqt.EmployeeID=".$HqEmpId." OR rl.R1=".$HqEmpId." OR rl.R2=".$HqEmpId." OR rl.R3=".$HqEmpId." OR rl.R4=".$HqEmpId." OR rl.R5=".$HqEmpId.") AND sp.ItemId=".$_REQUEST['ii']." AND sd.YearId=".$_REQUEST['y'], $con);

} 
elseif($rowRpt==0){ 
$sqlP0td=mysql_query("select SUM(M1_Ach) as tsM1,SUM(M2_Ach) as tsM2,SUM(M3_Ach) as tsM3,SUM(M4_Ach) as tsM4,SUM(M5_Ach) as tsM5,SUM(M6_Ach) as tsM6,SUM(M7_Ach) as tsM7,SUM(M8_Ach) as tsM8,SUM(M9_Ach) as tsM9,SUM(M10_Ach) as tsM10,SUM(M11_Ach) as tsM11,SUM(M12_Ach) as tsM12 from hrm_sales_sal_details_".$Before2YId." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId where d.HqId=".$HqId." AND sp.ItemId=".$_REQUEST['ii']." AND sd.YearId=".$Before2YId, $con);

$sqlP1td=mysql_query("select SUM(M1_Ach) as tsM1,SUM(M2_Ach) as tsM2,SUM(M3_Ach) as tsM3,SUM(M4_Ach) as tsM4,SUM(M5_Ach) as tsM5,SUM(M6_Ach) as tsM6,SUM(M7_Ach) as tsM7,SUM(M8_Ach) as tsM8,SUM(M9_Ach) as tsM9,SUM(M10_Ach) as tsM10,SUM(M11_Ach) as tsM11,SUM(M12_Ach) as tsM12 from hrm_sales_sal_details_".$BeforeYId." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId where d.HqId=".$HqId." AND sp.ItemId=".$_REQUEST['ii']." AND sd.YearId=".$BeforeYId, $con);

$sql4ta2=mysql_query("select SUM(M1) as sM1,SUM(M2) as sM2,SUM(M3) as sM3,SUM(M4) as sM4,SUM(M5) as sM5,SUM(M6) as sM6,SUM(M7) as sM7,SUM(M8) as sM8,SUM(M9) as sM9,SUM(M10) as sM10,SUM(M11) as sM11,SUM(M12) as sM12 from hrm_sales_sal_details_".$_REQUEST['y']." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId where d.HqId=".$HqId." AND sp.ItemId=".$_REQUEST['ii']." AND sd.YearId=".$_REQUEST['y'], $con); 

$sql5ta2=mysql_query("select SUM(M1_Proj) as sM1,SUM(M2_Proj) as sM2,SUM(M3_Proj) as sM3,SUM(M4_Proj) as sM4,SUM(M5_Proj) as sM5,SUM(M6_Proj) as sM6,SUM(M7_Proj) as sM7,SUM(M8_Proj) as sM8,SUM(M9_Proj) as sM9,SUM(M10_Proj) as sM10,SUM(M11_Proj) as sM11,SUM(M12_Proj) as sM12 from hrm_sales_sal_details_".$AfterYId." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId where d.HqId=".$HqId." AND sp.ItemId=".$_REQUEST['ii']." AND sd.YearId=".$AfterYId, $con); 
$res4ta2=mysql_fetch_assoc($sql4ta2); $res5ta2=mysql_fetch_assoc($sql5ta2);
$Acht4Q1=$res4ta2['sM1']+$res4ta2['sM2']+$res4ta2['sM3']; $Acht4Q2=$res4ta2['sM4']+$res4ta2['sM5']+$res4ta2['sM6'];
$Acht4Q3=$res4ta2['sM7']+$res4ta2['sM8']+$res4ta2['sM9']; $Acht4Q4=$res4ta2['sM10']+$res4ta2['sM11']+$res4ta2['sM12'];
$Acht5Q1=$res5ta2['sM1']+$res5ta2['sM2']+$res5ta2['sM3']; $Acht5Q2=$res5ta2['sM4']+$res5ta2['sM5']+$res5ta2['sM6'];
$Acht5Q3=$res5ta2['sM7']+$res5ta2['sM8']+$res5ta2['sM9']; $Acht5Q4=$res5ta2['sM10']+$res5ta2['sM11']+$res5ta2['sM12'];

$sqlP2td=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_hq sdh INNER JOIN hrm_sales_seedsproduct sp ON sdh.ProductId=sp.ProductId where sdh.HqId=".$HqId." AND sp.ItemId=".$_REQUEST['ii']." AND sdh.YearId=".$_REQUEST['y'], $con); 
$sqlP3td=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_hq sdh INNER JOIN hrm_sales_seedsproduct sp ON sdh.ProductId=sp.ProductId where sdh.HqId=".$HqId." AND sp.ItemId=".$_REQUEST['ii']." AND sdh.YearId=".$AfterYId, $con); 

$sqlPchtd=mysql_query("select SUM(M1_Ach) as sM1,SUM(M2_Ach) as sM2,SUM(M3_Ach) as sM3,SUM(M4_Ach) as sM4,SUM(M5_Ach) as sM5,SUM(M6_Ach) as sM6,SUM(M7_Ach) as sM7,SUM(M8_Ach) as sM8,SUM(M9_Ach) as sM9,SUM(M10_Ach) as sM10,SUM(M11_Ach) as sM11,SUM(M12_Ach) as sM12 from hrm_sales_sal_details_".$_REQUEST['y']." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId where d.HqId=".$HqId." AND sp.ItemId=".$_REQUEST['ii']." AND sd.YearId=".$_REQUEST['y'], $con);

}
$resP0td=mysql_fetch_assoc($sqlP0td); 
$TotP0p1=$resP0td['tsM1']+$resP0td['tsM2']+$resP0td['tsM3']; $TotP0p2=$resP0td['tsM4']+$resP0td['tsM5']+$resP0td['tsM6'];
$TotP0p3=$resP0td['tsM7']+$resP0td['tsM8']+$resP0td['tsM9']; $TotP0p4=$resP0td['tsM10']+$resP0td['tsM11']+$resP0td['tsM12'];
$resP1td=mysql_fetch_assoc($sqlP1td); 
$TotPp1=$resP1td['tsM1']+$resP1td['tsM2']+$resP1td['tsM3']; $TotPp2=$resP1td['tsM4']+$resP1td['tsM5']+$resP1td['tsM6'];
$TotPp3=$resP1td['tsM7']+$resP1td['tsM8']+$resP1td['tsM9']; $TotPp4=$resP1td['tsM10']+$resP1td['tsM11']+$resP1td['tsM12'];
$resP2td=mysql_fetch_assoc($sqlP2td); $resP3td=mysql_fetch_assoc($sqlP3td);
 
$resPchtd=mysql_fetch_assoc($sqlPchtd);
$TP2ch1td=$resPchtd['sM1']+$resPchtd['sM2']+$resPchtd['sM3']; $TP2ch2td=$resPchtd['sM4']+$resPchtd['sM5']+$resPchtd['sM6']; 
$TP2ch3td=$resPchtd['sM7']+$resPchtd['sM8']+$resPchtd['sM9']; $TP2ch4td=$resPchtd['sM10']+$resPchtd['sM11']+$resPchtd['sM12'];
$TotP2chtd=$TP2ch1td+$TP2ch2td+$TP2ch3td+$TP2ch4td;

?>
   <tr style="font-size:14px;color:#000000;background-color:#FFFFA6;height:24px;">
	 <td colspan="3" align="right" style="font-size:16px;"><b>TOTAL:&nbsp;</b></td>
	 <td><input class="TInput" id="<?php echo $HqId.'_'.$HqEmpId; ?>M1_DeT" value="<?php if($TotP0p1!=0){echo $TotP0p1;} ?>" readonly/></td>
     <td><input class="TInput" id="<?php echo $HqId.'_'.$HqEmpId; ?>M1_AeT" value="<?php if($TotPp1!=0){echo $TotPp1;} ?>" readonly/></td>
	 <td><input class="TInput" id="" value="<?php if($Acht4Q1!=0 AND $Acht4Q1!=0){echo $Acht4Q1;} ?>" /></td>
	 <td><input class="TInput" id="" value="<?php if($Acht5Q1!=0 AND $Acht5Q1!=0){echo $Acht5Q1;} ?>" readonly/></td>
	 <td><input class="TInput" id="<?php echo $HqId.'_'.$HqEmpId; ?>M1_BeT" value="<?php if($resP2td['Qa']!=0){echo floatval($resP2td['Qa']);} ?>" /></td>
<?php if($RslP=='Y'){ ?><td><input class="TInput" value="<?php if($TP2ch1td!=0){echo $TP2ch1td;} ?>" readonly/></td><?php } ?>
<?php if($EntP=='Y'){ ?><td><input class="TInput" id="<?php echo $HqId.'_'.$HqEmpId; ?>M1_CeT" value="<?php if($resP3td['Qa']!=0){echo floatval($resP3td['Qa']);} ?>" readonly/></td><?php } ?>
	 
	 
	 <td><input class="TInput" id="<?php echo $HqId.'_'.$HqEmpId; ?>M2_DeT" value="<?php if($TotP0p2!=0){echo $TotP0p2;} ?>" readonly/></td>
	 <td><input class="TInput" id="<?php echo $HqId.'_'.$HqEmpId; ?>M2_AeT" value="<?php if($TotPp2!=0){echo $TotPp2;} ?>" readonly/></td>
	 <td><input class="TInput" id="" value="<?php if($Acht4Q2!=0 AND $Acht4Q2!=0){echo $Acht4Q2;} ?>" readonly/></td>
	 <td><input class="TInput" id="" value="<?php if($Acht5Q2!=0 AND $Acht5Q2!=0){echo $Acht5Q2;} ?>" readonly/></td>
	 <td><input class="TInput" id="<?php echo $HqId.'_'.$HqEmpId; ?>M2_BeT" value="<?php if($resP2td['Qb']!=0){echo floatval($resP2td['Qb']);} ?>" readonly/></td>
<?php if($RslP=='Y'){ ?><td><input class="TInput" value="<?php if($TP2ch2td!=0){echo $TP2ch2td;} ?>" readonly/></td><?php } ?>
<?php if($EntP=='Y'){ ?><td><input class="TInput" id="<?php echo $HqId.'_'.$HqEmpId; ?>M2_CeT" value="<?php if($resP3td['Qb']!=0){echo floatval($resP3td['Qb']);} ?>" readonly/></td><?php } ?>	 
	 
	 
	 <td><input class="TInput" id="<?php echo $HqId.'_'.$HqEmpId; ?>M3_DeT" value="<?php if($TotP0p3!=0){echo $TotP0p3;} ?>" readonly/></td>
	 <td><input class="TInput" id="<?php echo $HqId.'_'.$HqEmpId; ?>M3_AeT" value="<?php if($TotPp3!=0){echo $TotPp3;} ?>" readonly/></td>
	 <td><input class="TInput" id="" value="<?php if($Acht4Q3!=0 AND $Acht4Q3!=0){echo $Acht4Q3;} ?>" readonly/></td>
	 <td><input class="TInput" id="" value="<?php if($Acht5Q3!=0 AND $Acht5Q3!=0){echo $Acht5Q3;} ?>" readonly/></td>	
	 <td><input class="TInput" id="<?php echo $HqId.'_'.$HqEmpId; ?>M3_BeT" value="<?php if($resP2td['Qc']!=0){echo floatval($resP2td['Qc']);} ?>" readonly/></td>
<?php if($RslP=='Y'){ ?><td><input class="TInput" value="<?php if($TP2ch3td!=0){echo $TP2ch3td;} ?>" readonly/></td><?php } ?>
<?php if($EntP=='Y'){ ?><td><input class="TInput" id="<?php echo $HqId.'_'.$HqEmpId; ?>M3_CeT" value="<?php if($resP3td['Qc']!=0){echo floatval($resP3td['Qc']);} ?>" readonly/></td><?php } ?>	 
	 		
	 				 							
	 <td><input class="TInput" id="<?php echo $HqId.'_'.$HqEmpId; ?>M4_DeT" value="<?php if($TotP0p4!=0){echo $TotP0p4;} ?>" readonly/></td>											
     <td><input class="TInput" id="<?php echo $HqId.'_'.$HqEmpId; ?>M4_AeT" value="<?php if($TotPp4!=0){echo $TotPp4;} ?>" readonly/></td>
	 <td><input class="TInput" id="" value="<?php if($Acht4Q4!=0 AND $Acht4Q4!=0){echo $Acht4Q4;} ?>" readonly/></td>
	 <td><input class="TInput" id="" value="<?php if($Acht5Q4!=0 AND $Acht5Q4!=0){echo $Acht5Q4;} ?>" readonly/></td>
	 <td><input class="TInput" id="<?php echo $HqId.'_'.$HqEmpId; ?>M4_BeT" value="<?php if($resP2td['Qd']!=0){echo floatval($resP2td['Qd']);} ?>" readonly/></td>
<?php if($RslP=='Y'){ ?><td><input class="TInput" value="<?php if($TP2ch4td!=0){echo $TP2ch4td;} ?>" readonly/></td><?php } ?>
<?php if($EntP=='Y'){ ?><td><input class="TInput" id="<?php echo $HqId.'_'.$HqEmpId; ?>M4_CeT" value="<?php if($resP3td['Qd']!=0){echo floatval($resP3td['Qd']);} ?>" readonly/></td><?php } ?>	 
	 
	
<?php 
$TotP0td=$TotP0p1+$TotP0p2+$TotP0p3+$TotP0p4; $TotP1td=$TotPp1+$TotPp2+$TotPp3+$TotPp4; 
$TotP4td=$Acht4Q1+$Acht4Q2+$Acht4Q3+$Acht4Q4; $TotP5td=$Acht5Q1+$Acht5Q2+$Acht5Q3+$Acht5Q4; 
$TotP2td=$resP2td['Qa']+$resP2td['Qb']+$resP2td['Qc']+$resP2td['Qd']; 
$TotP3td=$resP3td['Qa']+$resP3td['Qb']+$resP3td['Qc']+$resP3td['Qd'];  ?>
      <td><input class="TInput" id="<?php echo $HqId.'_'.$HqEmpId; ?>TotM_DeT" value="<?php if($TotP0td!=0 AND $TotP0td!=''){echo $TotP0td;}else{echo '';} ?>" readonly/></td>
      <td><input class="TInput" id="<?php echo $HqId.'_'.$HqEmpId; ?>TotM_AeT" value="<?php if($TotP1td!=0 AND $TotP1td!=''){echo $TotP1td;}else{echo '';} ?>" readonly/></td>
	  <td><input class="TInput" id="" value="<?php if($TotP4td!=0 AND $TotP4td!=''){echo $TotP4td;}else{echo '';} ?>" readonly/></td>
	  <td><input class="TInput" id="" value="<?php if($TotP5td!=0 AND $TotP5td!=''){echo $TotP5td;}else{echo '';} ?>" readonly/></td>
	  <td><input class="TInput" id="<?php echo $HqId.'_'.$HqEmpId; ?>TotM_BeT" value="<?php if($TotP2td!=0 AND $TotP2td!=''){echo $TotP2td;}else{echo '';} ?>" readonly/></td>
<?php if($RslP=='Y'){ ?><td><input class="TInput" value="<?php if($TotP2chtd!=0){echo $TotP2chtd;}else{echo '';} ?>" readonly/></td><?php } ?>
<?php if($EntP=='Y'){ ?><td><input class="TInput" id="<?php echo $HqId.'_'.$HqEmpId; ?>TotM_CeT" value="<?php if($TotP3td!=0 AND $TotP3td!=''){echo $TotP3td;}else{echo '';} ?>" readonly/></td><?php } ?>	  
  </tr>	
<?php } ?>  
</table>


	       
   </td>  
  </tr>
 </table>
</tr>


<?php ////////////////////////////*****************Close Close *********************////////////////// ?>  
<?php } /*********** Close Dealer **********/ ?>  

<?php } ?>


 	
<?php /******* Teamlease Employe Open Teamlease Employe Open Teamlease Employe Open ****************/ ?>
<?php if($rtl>0){ ?>
<tr>
<td>
 <table border="0" cellpadding="0" cellspacing="4" cellpadding="0">
 <?php $sRpHq = mysql_query("select tl.*,HqName from hrm_sales_tlemp tl INNER JOIN hrm_headquater hq ON tl.TLHq=hq.HqId where tl.TLRepId=".$EmployeeId." AND tl.TLStatus='A' order by tl.TLName ASC", $con); $rowRpHq=mysql_num_rows($sRpHq); 
      echo '<input type="hidden" id="DealTLRows" value="'.$rowRpHq.'" />'; $counter=1;
      while($rRpHq=mysql_fetch_array($sRpHq))
	  { $HqEmpId=$rRpHq['TLEId']; $HqId=$rRpHq['TLHq']; ?>

<tr style="background-color:#CBD7F3;">
 <table border="0">
<input type="hidden" id="Rowhq2" value="<?php echo $rowRpHq; ?>" />
<input type="hidden" id="h1q" value="<?php echo $HqId; ?>" />   
  <tr>
   <td>
<table border="1" cellpadding="0" cellspacing="0" style="font-family:Times New Roman;font-size:14px;width:<?php if($_REQUEST['ii']=='All_1' OR $_REQUEST['ii']=='All_2'){ echo '1600px';}else{echo '1500px';}?>;">
  <tr>
  <td colspan="50" style="font-size:16px;color:#FFFF00;background-color:#183E83;">&nbsp;<b><?php echo ucfirst(strtolower($rRpHq['TLName'])).'-<font color="#D7EBFF">'.$rRpHq['HqName'].'</font>'; ?></b></td>
  </tr>	
  <tr style="background-color:#D5F1D1;color:#000000;">
    <td colspan="<?php if($_REQUEST['ii']=='All_1' OR $_REQUEST['ii']=='All_2'){echo 4;}else{echo 3;}?>"></td>
<td colspan="6" align="center"><b>Quarter 1</b></td><td colspan="6" align="center"><b>Quarter 2</b></td>
<td colspan="6" align="center"><b>Quarter 3</b></td><td colspan="6" align="center"><b>Quarter 4</b></td>
<td colspan="6" align="center"><b>TOTAL</b></td>
  </tr>	
   <tr style="background-color:#D5F1D1;color:#000000;">
<?php if($_REQUEST['ii']=='All_1' OR $_REQUEST['ii']=='All_2'){ ?>   
    <td align="center" style="width:100pxfont-size:12px;;"><b>CROP</b></td>
<?php } ?>	
	<td align="center" style="width:120px;font-size:12px;"><b>VARIETY</b></td>
	<td align="center" style="width:30px;font-size:12px;"><b>&nbsp;TYPE&nbsp;</b></td>
	<td align="center" style="width:50px;font-size:12px;"><b>&nbsp;Edit&nbsp;</b></td>
	<?php for($i=1;$i<=5; $i++){ ?>
	 <td class="Trh60"><?php echo $y0T.'<br>'.$y0; ?></td>
	 <td class="Trh60"><?php echo $y1T.'<br>'.$y1; ?></td>
	 <td class="Trh60"><?php echo $y2T.'<br>'.$y2; ?>
	 <td class="Trh60"><?php echo $y3T.'<br>'.$y3; ?></td>
	 <td class="Trh60"><?php echo '<font color="#A60053">Suggest</font><br>'.$y2; ?></td>
	<?php if($RslP=='Y'){ ?><td class="Trh60"><?php echo $y1T.'<br>'.$y2; ?></td><?php } ?>
	<?php if($EntP=='Y'){ ?><td class="Trh60"><?php echo '<font color="#A60053">Suggest</font><br>'.$y3; ?></td><?php } ?>
	<?php } ?>
  </tr>	
<?php if($_REQUEST['ii']!='All_1' AND $_REQUEST['ii']!='All_2'){$sql = mysql_query("select sp.ItemId,ProductId,ProductName,ItemName,TypeName from hrm_sales_seedsproduct sp INNER JOIN hrm_sales_seedsitem si ON sp.ItemId=si.ItemId INNER JOIN hrm_sales_seedtype st ON sp.TypeId=st.TypeId where si.ItemId=".$_REQUEST['ii']." order by ItemName ASC, TypeName ASC, ProductName ASC", $con);}
      elseif($_REQUEST['ii']=='All_1'){$sql = mysql_query("select sp.ItemId,ProductId,ProductName,ItemName,TypeName from hrm_sales_seedsproduct sp INNER JOIN hrm_sales_seedsitem si ON sp.ItemId=si.ItemId INNER JOIN hrm_sales_seedtype st ON sp.TypeId=st.TypeId where si.GroupId=1 order by ItemName ASC, TypeName ASC, ProductName ASC", $con);}
	  elseif($_REQUEST['ii']=='All_2'){$sql = mysql_query("select sp.ItemId,ProductId,ProductName,ItemName,TypeName from hrm_sales_seedsproduct sp INNER JOIN hrm_sales_seedsitem si ON sp.ItemId=si.ItemId INNER JOIN hrm_sales_seedtype st ON sp.TypeId=st.TypeId where si.GroupId=2 order by ItemName ASC, TypeName ASC, ProductName ASC", $con);}
 $Sn=1; while($res=mysql_fetch_array($sql)){ 
 
$sqlP0d=mysql_query("select SUM(M1_Ach) as sM1,SUM(M2_Ach) as sM2,SUM(M3_Ach) as sM3,SUM(M4_Ach) as sM4,SUM(M5_Ach) as sM5,SUM(M6_Ach) as sM6,SUM(M7_Ach) as sM7,SUM(M8_Ach) as sM8,SUM(M9_Ach) as sM9,SUM(M10_Ach) as sM10,SUM(M11_Ach) as sM11,SUM(M12_Ach) as sM12 from hrm_sales_sal_details_".$Before2YId." sd INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_sales_tlemp tl ON d.HqId=tl.TLHq where TLStatus='A' AND tl.TLRepId=".$EmployeeId." AND d.HqId=".$HqId." AND sd.ProductId=".$res['ProductId']." AND sd.YearId=".$Before2YId, $con);
$sqlP1d=mysql_query("select SUM(M1_Ach) as sM1,SUM(M2_Ach) as sM2,SUM(M3_Ach) as sM3,SUM(M4_Ach) as sM4,SUM(M5_Ach) as sM5,SUM(M6_Ach) as sM6,SUM(M7_Ach) as sM7,SUM(M8_Ach) as sM8,SUM(M9_Ach) as sM9,SUM(M10_Ach) as sM10,SUM(M11_Ach) as sM11,SUM(M12_Ach) as sM12 from hrm_sales_sal_details_".$BeforeYId." sd INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_sales_tlemp tl ON d.HqId=tl.TLHq where TLStatus='A' AND tl.TLRepId=".$EmployeeId." AND d.HqId=".$HqId." AND sd.ProductId=".$res['ProductId']." AND sd.YearId=".$BeforeYId, $con);

$sql4ta=mysql_query("select SUM(M1) as sM1,SUM(M2) as sM2,SUM(M3) as sM3,SUM(M4) as sM4,SUM(M5) as sM5,SUM(M6) as sM6,SUM(M7) as sM7,SUM(M8) as sM8,SUM(M9) as sM9,SUM(M10) as sM10,SUM(M11) as sM11,SUM(M12) as sM12 from hrm_sales_sal_details_".$_REQUEST['y']." sd INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_sales_tlemp tl ON d.HqId=tl.TLHq where TLStatus='A' AND tl.TLRepId=".$EmployeeId." AND d.HqId=".$HqId." AND sd.ProductId=".$res['ProductId']." AND sd.YearId=".$_REQUEST['y'], $con); 
$sql5ta=mysql_query("select SUM(M1_Proj) as sM1,SUM(M2_Proj) as sM2,SUM(M3_Proj) as sM3,SUM(M4_Proj) as sM4,SUM(M5_Proj) as sM5,SUM(M6_Proj) as sM6,SUM(M7_Proj) as sM7,SUM(M8_Proj) as sM8,SUM(M9_Proj) as sM9,SUM(M10_Proj) as sM10,SUM(M11_Proj) as sM11,SUM(M12_Proj) as sM12 from hrm_sales_sal_details_".$AfterYId." sd INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_sales_tlemp tl ON d.HqId=tl.TLHq where TLStatus='A' AND tl.TLRepId=".$EmployeeId." AND d.HqId=".$HqId." AND sd.ProductId=".$res['ProductId']." AND sd.YearId=".$AfterYId, $con); 
$res4ta=mysql_fetch_assoc($sql4ta); $res5ta=mysql_fetch_assoc($sql5ta);
$Ach4Q1=$res4ta['sM1']+$res4ta['sM2']+$res4ta['sM3']; $Ach4Q2=$res4ta['sM4']+$res4ta['sM5']+$res4ta['sM6'];
$Ach4Q3=$res4ta['sM7']+$res4ta['sM8']+$res4ta['sM9']; $Ach4Q4=$res4ta['sM10']+$res4ta['sM11']+$res4ta['sM12'];
$Ach5Q1=$res5ta['sM1']+$res5ta['sM2']+$res5ta['sM3']; $Ach5Q2=$res5ta['sM4']+$res5ta['sM5']+$res5ta['sM6'];
$Ach5Q3=$res5ta['sM7']+$res5ta['sM8']+$res5ta['sM9']; $Ach5Q4=$res5ta['sM10']+$res5ta['sM11']+$res5ta['sM12'];

$sqlP2d=mysql_query("select * from hrm_sales_sal_details_hq where HqRepEmpID=".$EmployeeId." AND HqId=".$HqId." AND ProductId=".$res['ProductId']." AND YearId=".$_REQUEST['y'], $con);
$sqlP3d=mysql_query("select * from hrm_sales_sal_details_hq where HqRepEmpID=".$EmployeeId." AND HqId=".$HqId." AND ProductId=".$res['ProductId']." AND YearId=".$AfterYId, $con); 

$sqlPchd=mysql_query("select SUM(M1_Ach) as sM1,SUM(M2_Ach) as sM2,SUM(M3_Ach) as sM3,SUM(M4_Ach) as sM4,SUM(M5_Ach) as sM5,SUM(M6_Ach) as sM6,SUM(M7_Ach) as sM7,SUM(M8_Ach) as sM8,SUM(M9_Ach) as sM9,SUM(M10_Ach) as sM10,SUM(M11_Ach) as sM11,SUM(M12_Ach) as sM12 from hrm_sales_sal_details_".$_REQUEST['y']." sd INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_sales_tlemp tl ON d.HqId=tl.TLHq where TLStatus='A' AND tl.TLRepId=".$EmployeeId." AND d.HqId=".$HqId." AND sd.ProductId=".$res['ProductId']." AND sd.YearId=".$_REQUEST['y'], $con); 

$sChk=mysql_query("select * from hrm_sales_arrange_prod sap INNER JOIN hrm_headquater hq ON sap.StateId=hq.StateId INNER JOIN hrm_sales_tlemp tl ON hq.HqId=tl.TLHq where TLStatus='A' AND ProductId=".$res['ProductId']." AND ArrgStatus='Y' AND tl.TLHq=".$HqId, $con);

$resP0d=mysql_fetch_assoc($sqlP0d); 
$Ach0Q1=$resP0d['sM1']+$resP0d['sM2']+$resP0d['sM3']; $Ach0Q2=$resP0d['sM4']+$resP0d['sM5']+$resP0d['sM6'];
$Ach0Q3=$resP0d['sM7']+$resP0d['sM8']+$resP0d['sM9']; $Ach0Q4=$resP0d['sM10']+$resP0d['sM11']+$resP0d['sM12'];
$resP1d=mysql_fetch_assoc($sqlP1d);  
$AchQ1=$resP1d['sM1']+$resP1d['sM2']+$resP1d['sM3']; $AchQ2=$resP1d['sM4']+$resP1d['sM5']+$resP1d['sM6'];
$AchQ3=$resP1d['sM7']+$resP1d['sM8']+$resP1d['sM9']; $AchQ4=$resP1d['sM10']+$resP1d['sM11']+$resP1d['sM12']; 
$resP2d=mysql_fetch_assoc($sqlP2d); $resP3d=mysql_fetch_assoc($sqlP3d); 

$resPchd=mysql_fetch_assoc($sqlPchd);
$TP2chd1=$resPchd['sM1']+$resPchd['sM2']+$resPchd['sM3']; $TP2chd2=$resPchd['sM4']+$resPchd['sM5']+$resPchd['sM6']; 
$TP2chd3=$resPchd['sM7']+$resPchd['sM8']+$resPchd['sM9']; $TP2chd4=$resPchd['sM10']+$resPchd['sM11']+$resPchd['sM12'];
$TotP2chd=$TP2chd1+$TP2chd2+$TP2chd3+$TP2chd4;


$rowChkP=mysql_fetch_assoc($sChk);

if($RslP=='Y'){ $a1d=$TP2chd1; $a2d=$TP2chd2; $a3d=$TP2chd3; $a4d=$TP2chd4; } 
if($EntP=='Y'){ $a1d=$resP3d['Q1']; $a2d=$resP3d['Q2']; $a3d=$resP3d['Q3']; $a4d=$resP3d['Q4']; }

if($rowChkP>0 OR $Ach0Q1!=0 OR $Ach0Q2!=0 OR $Ach0Q3!=0 OR $Ach0Q4!=0 OR $AchQ1!=0 OR $AchQ2!=0 OR $AchQ3!=0 OR $AchQ4!=0 OR $Ach4Q1!=0 OR $Ach4Q2!=0 OR $Ach4Q3!=0 OR $Ach4Q4!=0 OR $Ach5Q1!=0 OR $Ach5Q2!=0 OR $Ach5Q3!=0 OR $Ach5Q4!=0 OR $resP2d['Q1']!=0 OR $resP2d['Q2']!=0 OR $resP2d['Q3']!=0 OR $resP2d['Q4']!=0 OR $a1d!=0 OR $a2d!=0 OR $a3d!=0 OR $a4d!=0) {

?>	  
   <tr bgcolor="#EEEEEE" style="height:22px;">
<?php if($_REQUEST['ii']=='All_1' OR $_REQUEST['ii']=='All_2'){ ?>	  
     <td bgcolor="#FFFFFF"><input class="Inputt" style="width:100px;" value="<?php echo $res['ItemName']; ?>"/></td>
<?php } ?>		 
	 <td bgcolor="#FFFFFF"><input class="Inputt" style="width:120px;" value="<?php echo $res['ProductName']; ?>" /><input type="hidden" id="<?php echo $HqId.'_'.$HqEmpId; ?>P_<?php echo $Sn; ?>" value="<?php echo $res['ProductId']; ?>" /></td>
	<td bgcolor="#FFFFFF" align="center" style="font-size:12px;"><?php echo substr_replace($res['TypeName'], '', 2); ?></td>
	<td align="center" valign="middle" bgcolor="#FFFFFF">
	   <?php if($rRpHq['EditPerMi']=='Y' AND $EntP=='Y'){ ?>
	   <?php if($rowSubEmp==0){?>
<img src="images/edit.png" border="0" alt="Edit" id="<?php echo $HqId.'_'.$HqEmpId; ?>EditBtn_<?php echo $Sn; ?>" onClick="editD(<?php echo $Sn.', 61, '.$HqEmpId.', '.$HqId; ?>)" style="display:block;">
<img src="images/Floppy-Small-icon.png" border="0" alt="Save" id="<?php echo $HqId.'_'.$HqEmpId; ?>SaveBtn_<?php echo $Sn; ?>" onClick="saveD(<?php echo $Sn.', '.$_REQUEST['y'].', 61, '.$HqEmpId.', '.$rowRpt.', '.$HqId; ?>)" style="display:none;">
	   <?php } ?>
	   <?php } else {echo '&nbsp;';}?>
	</td>
<td><input class="Input" id="<?php echo $HqId.'_'.$HqEmpId; ?>M1_De<?php echo $Sn; ?>" value="<?php if($Ach0Q1!=0 AND $Ach0Q1!=0){echo $Ach0Q1;} ?>" readonly/></td>						
<td><input class="Input" id="<?php echo $HqId.'_'.$HqEmpId; ?>M1_Ae<?php echo $Sn; ?>" value="<?php if($AchQ1!=0 AND $AchQ1!=0){echo $AchQ1;} ?>" readonly/></td>
<td><input class="Input" id="<?php echo $HqId.'_'.$HqEmpId.'M1a'.$Sn; ?>" value="<?php if($Ach4Q1!=0 AND $Ach4Q1!=0){echo $Ach4Q1;} ?>" readonly/></td>
<td><input class="Input" id="<?php echo $HqId.'_'.$HqEmpId.'M1b'.$Sn; ?>" value="<?php if($Ach5Q1!=0 AND $Ach5Q1!=0){echo $Ach5Q1;} ?>" readonly/></td>
<td><input class="Input" id="<?php echo $HqId.'_'.$HqEmpId; ?>M1_Be<?php echo $Sn; ?>" style="background-color:#D3FED7;" value="<?php if($resP2d['Q1']!='' AND $resP2d['Q1']!=0){echo floatval($resP2d['Q1']);} ?>"/></td>
<?php if($RslP=='Y'){ ?><td><input class="Input" style="background-color:#D3FED7;" value="<?php if($TP2chd1!=0){echo $TP2chd1;} ?>" readonly/></td><?php } ?>
<?php if($EntP=='Y'){ ?><td><input class="Input" id="<?php echo $HqId.'_'.$HqEmpId; ?>M1_Ce<?php echo $Sn; ?>" style="background-color:#D3FED7;" value="<?php if($resP3d['Q1']!='' AND $resP3d['Q1']!=0){echo floatval($resP3d['Q1']);} ?>"/></td><?php } ?>

<td><input class="Input" id="<?php echo $HqId.'_'.$HqEmpId; ?>M2_De<?php echo $Sn; ?>" value="<?php if($Ach0Q2!='' AND $Ach0Q2!=0){echo $Ach0Q2;} ?>" readonly/></td>
<td><input class="Input" id="<?php echo $HqId.'_'.$HqEmpId; ?>M2_Ae<?php echo $Sn; ?>" value="<?php if($AchQ2!='' AND $AchQ2!=0){echo $AchQ2;} ?>" readonly/></td>
<td><input class="Input" id="<?php echo $HqId.'_'.$HqEmpId.'M2a'.$Sn; ?>" value="<?php if($Ach4Q2!='' AND $Ach4Q2!=0){echo $Ach4Q2;} ?>" readonly/></td>
<td><input class="Input" id="<?php echo $HqId.'_'.$HqEmpId.'M2b'.$Sn; ?>" value="<?php if($Ach5Q2!='' AND $Ach5Q2!=0){echo $Ach5Q2;} ?>" readonly/></td>
<td><input class="Input" id="<?php echo $HqId.'_'.$HqEmpId; ?>M2_Be<?php echo $Sn; ?>" style="background-color:#D3FED7;" value="<?php if($resP2d['Q2']!='' AND $resP2d['Q2']!=0){echo floatval($resP2d['Q2']);} ?>"/></td>
<?php if($RslP=='Y'){ ?><td><input class="Input" style="background-color:#D3FED7;" value="<?php if($TP2chd2!=0){echo $TP2chd2;} ?>" readonly/></td><?php } ?>
<?php if($EntP=='Y'){ ?><td><input class="Input" id="<?php echo $HqId.'_'.$HqEmpId; ?>M2_Ce<?php echo $Sn; ?>" style="background-color:#D3FED7;" value="<?php if($resP3d['Q2']!='' AND $resP3d['Q2']!=0){echo floatval($resP3d['Q2']);} ?>"/></td><?php } ?>

<td><input class="Input" id="<?php echo $HqId.'_'.$HqEmpId; ?>M3_De<?php echo $Sn; ?>" value="<?php if($Ach0Q3!='' AND $Ach0Q3!=0){echo $Ach0Q3;} ?>" readonly/></td>
<td><input class="Input" id="<?php echo $HqId.'_'.$HqEmpId; ?>M3_Ae<?php echo $Sn; ?>" value="<?php if($AchQ3!='' AND $AchQ3!=0){echo $AchQ3;} ?>" readonly/></td>
<td><input class="Input" id="<?php echo $HqId.'_'.$HqEmpId.'M3a'.$Sn; ?>" value="<?php if($Ach4Q3!='' AND $Ach4Q3!=0){echo $Ach4Q3;} ?>" readonly/></td>
<td><input class="Input" id="<?php echo $HqId.'_'.$HqEmpId.'M3b'.$Sn; ?>" value="<?php if($Ach5Q3!='' AND $Ach5Q3!=0){echo $Ach5Q3;} ?>" readonly/></td>	
<td><input class="Input" id="<?php echo $HqId.'_'.$HqEmpId; ?>M3_Be<?php echo $Sn; ?>" style="background-color:#D3FED7;" value="<?php if($resP2d['Q3']!='' AND $resP2d['Q3']!=0){echo floatval($resP2d['Q3']);} ?>"/></td>
<?php if($RslP=='Y'){ ?><td><input class="Input" style="background-color:#D3FED7;" value="<?php if($TP2chd3!=0){echo $TP2chd3;} ?>" readonly/></td><?php } ?>
<?php if($EntP=='Y'){ ?><td><input class="Input" id="<?php echo $HqId.'_'.$HqEmpId; ?>M3_Ce<?php echo $Sn; ?>" style="background-color:#D3FED7;" value="<?php if($resP3d['Q3']!='' AND $resP3d['Q3']!=0){echo floatval($resP3d['Q3']);} ?>"/></td><?php } ?>
	
<td><input class="Input" id="<?php echo $HqId.'_'.$HqEmpId; ?>M4_De<?php echo $Sn; ?>" value="<?php if($Ach0Q4!='' AND $Ach0Q4!=0){echo $Ach0Q4;} ?>" readonly/></td> 
<td><input class="Input" id="<?php echo $HqId.'_'.$HqEmpId; ?>M4_Ae<?php echo $Sn; ?>" value="<?php if($AchQ4!='' AND $AchQ4!=0){echo $AchQ4;} ?>" readonly/></td>
<td><input class="Input" id="<?php echo $HqId.'_'.$HqEmpId.'M4a'.$Sn; ?>" value="<?php if($Ach4Q4!='' AND $Ach4Q4!=0){echo $Ach4Q4;} ?>" readonly/></td>
<td><input class="Input" id="<?php echo $HqId.'_'.$HqEmpId.'M4b'.$Sn; ?>" value="<?php if($Ach5Q4!='' AND $Ach5Q4!=0){echo $Ach5Q4;} ?>" readonly/></td>
<td><input class="Input" id="<?php echo $HqId.'_'.$HqEmpId; ?>M4_Be<?php echo $Sn; ?>" style="background-color:#D3FED7;" value="<?php if($resP2d['Q4']!='' AND $resP2d['Q4']!=0){echo floatval($resP2d['Q4']);} ?>"/></td>
<?php if($RslP=='Y'){ ?><td><input class="Input" style="background-color:#D3FED7;" value="<?php if($TP2chd4!=0){echo $TP2chd4;} ?>" readonly/></td><?php } ?>
<?php if($EntP=='Y'){ ?><td><input class="Input" id="<?php echo $HqId.'_'.$HqEmpId; ?>M4_Ce<?php echo $Sn; ?>" style="background-color:#D3FED7;" value="<?php if($resP3d['Q4']!='' AND $resP3d['Q4']!=0){echo floatval($resP3d['Q4']);} ?>"/></td><?php } ?>

<?php 
$TotP0d=$Ach0Q1+$Ach0Q2+$Ach0Q3+$Ach0Q4; $TotP1d=$AchQ1+$AchQ2+$AchQ3+$AchQ4; $TotP4d=$Ach4Q1+$Ach4Q2+$Ach4Q3+$Ach4Q4;  $TotP5d=$Ach5Q1+$Ach5Q2+$Ach5Q3+$Ach5Q4; 
$TotP2d=$resP2d['Q1']+$resP2d['Q2']+$resP2d['Q3']+$resP2d['Q4']; 
$TotP3d=$resP3d['Q1']+$resP3d['Q2']+$resP3d['Q3']+$resP3d['Q4']; 
?>	 
<td><input class="InputB" id="<?php echo $HqId.'_'.$HqEmpId; ?>TotP0d_<?php echo $Sn; ?>" value="<?php if($TotP0d!=0 AND $TotP0d!=''){echo $TotP0d;}else{echo '';} ?>" readonly/></td>
<td><input class="InputB" id="<?php echo $HqId.'_'.$HqEmpId; ?>TotP1d_<?php echo $Sn; ?>" value="<?php if($TotP1d!=0 AND $TotP1d!=''){echo $TotP1d;}else{echo '';} ?>" readonly/></td>
<td><input class="InputB" id="<?php echo $HqId.'_'.$HqEmpId.'MTota'.$Sn; ?>" value="<?php if($TotP4d!=0 AND $TotP4d!=''){echo $TotP4d;}else{echo '';} ?>" readonly/></td>
<td><input class="InputB" id="<?php echo $HqId.'_'.$HqEmpId.'MTotb'.$Sn; ?>" value="<?php if($TotP5d!=0 AND $TotP5d!=''){echo $TotP5d;}else{echo '';} ?>" readonly/></td>	
<td><input class="InputB" id="<?php echo $HqId.'_'.$HqEmpId; ?>TotP2d_<?php echo $Sn; ?>" value="<?php if($TotP2d!=0 AND $TotP2d!=''){echo $TotP2d;}else{echo '';} ?>" readonly/></td>
<?php if($RslP=='Y'){ ?><td><input class="InputB" value="<?php if($TotP2chd!=0){echo $TotP2chd;}else{echo '';} ?>" readonly/></td><?php } ?>
<?php if($EntP=='Y'){ ?><td><input class="InputB" id="<?php echo $HqId.'_'.$HqEmpId; ?>TotP3d_<?php echo $Sn; ?>" value="<?php if($TotP3d!=0 AND $TotP3d!=''){echo $TotP3d;}else{echo '';} ?>" readonly/></td><?php } ?>
	
  </tr>	
<?php } $Sn++; }  ?>     
<?php if($_REQUEST['ii']!='All_1' AND $_REQUEST['ii']!='All_2'){ 

$sqlP0td=mysql_query("select SUM(M1_Ach) as tsM1,SUM(M2_Ach) as tsM2,SUM(M3_Ach) as tsM3,SUM(M4_Ach) as tsM4,SUM(M5_Ach) as tsM5,SUM(M6_Ach) as tsM6,SUM(M7_Ach) as tsM7,SUM(M8_Ach) as tsM8,SUM(M9_Ach) as tsM9,SUM(M10_Ach) as tsM10,SUM(M11_Ach) as tsM11,SUM(M12_Ach) as tsM12 from hrm_sales_sal_details_".$Before2YId." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_sales_tlemp tl ON d.HqId=tl.TLHq where TLStatus='A' AND tl.TLRepId=".$EmployeeId." AND d.HqId=".$HqId." AND sp.ItemId=".$_REQUEST['ii']." AND sd.YearId=".$Before2YId, $con);

$sqlP1td=mysql_query("select SUM(M1_Ach) as tsM1,SUM(M2_Ach) as tsM2,SUM(M3_Ach) as tsM3,SUM(M4_Ach) as tsM4,SUM(M5_Ach) as tsM5,SUM(M6_Ach) as tsM6,SUM(M7_Ach) as tsM7,SUM(M8_Ach) as tsM8,SUM(M9_Ach) as tsM9,SUM(M10_Ach) as tsM10,SUM(M11_Ach) as tsM11,SUM(M12_Ach) as tsM12 from hrm_sales_sal_details_".$BeforeYId." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_sales_tlemp tl ON d.HqId=tl.TLHq where TLStatus='A' AND tl.TLRepId=".$EmployeeId." AND d.HqId=".$HqId." AND sp.ItemId=".$_REQUEST['ii']." AND sd.YearId=".$BeforeYId, $con);

$sql4ta2=mysql_query("select SUM(M1) as sM1,SUM(M2) as sM2,SUM(M3) as sM3,SUM(M4) as sM4,SUM(M5) as sM5,SUM(M6) as sM6,SUM(M7) as sM7,SUM(M8) as sM8,SUM(M9) as sM9,SUM(M10) as sM10,SUM(M11) as sM11,SUM(M12) as sM12 from hrm_sales_sal_details_".$_REQUEST['y']." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_sales_tlemp tl ON d.HqId=tl.TLHq where TLStatus='A' AND tl.TLRepId=".$EmployeeId." AND d.HqId=".$HqId." AND sp.ItemId=".$_REQUEST['ii']." AND sd.YearId=".$_REQUEST['y'], $con); 

$sql5ta2=mysql_query("select SUM(M1_Proj) as sM1,SUM(M2_Proj) as sM2,SUM(M3_Proj) as sM3,SUM(M4_Proj) as sM4,SUM(M5_Proj) as sM5,SUM(M6_Proj) as sM6,SUM(M7_Proj) as sM7,SUM(M8_Proj) as sM8,SUM(M9_Proj) as sM9,SUM(M10_Proj) as sM10,SUM(M11_Proj) as sM11,SUM(M12_Proj) as sM12 from hrm_sales_sal_details_".$AfterYId." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_sales_tlemp tl ON d.HqId=tl.TLHq where TLStatus='A' AND tl.TLRepId=".$EmployeeId." AND d.HqId=".$HqId." AND sp.ItemId=".$_REQUEST['ii']." AND sd.YearId=".$AfterYId, $con); 
$res4ta2=mysql_fetch_assoc($sql4ta2); $res5ta2=mysql_fetch_assoc($sql5ta2);
$Acht4Q1=$res4ta2['sM1']+$res4ta2['sM2']+$res4ta2['sM3']; $Acht4Q2=$res4ta2['sM4']+$res4ta2['sM5']+$res4ta2['sM6'];
$Acht4Q3=$res4ta2['sM7']+$res4ta2['sM8']+$res4ta2['sM9']; $Acht4Q4=$res4ta2['sM10']+$res4ta2['sM11']+$res4ta2['sM12'];
$Acht5Q1=$res5ta2['sM1']+$res5ta2['sM2']+$res5ta2['sM3']; $Acht5Q2=$res5ta2['sM4']+$res5ta2['sM5']+$res5ta2['sM6'];
$Acht5Q3=$res5ta2['sM7']+$res5ta2['sM8']+$res5ta2['sM9']; $Acht5Q4=$res5ta2['sM10']+$res5ta2['sM11']+$res5ta2['sM12'];

$sqlP2td=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_hq sdh INNER JOIN hrm_sales_seedsproduct sp ON sdh.ProductId=sp.ProductId where sdh.HqRepEmpID=".$EmployeeId." AND sdh.HqId=".$HqId." AND sp.ItemId=".$_REQUEST['ii']." AND sdh.YearId=".$_REQUEST['y'], $con); 
$sqlP3td=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_hq sdh INNER JOIN hrm_sales_seedsproduct sp ON sdh.ProductId=sp.ProductId where sdh.HqRepEmpID=".$EmployeeId." AND sdh.HqId=".$HqId." AND sp.ItemId=".$_REQUEST['ii']." AND sdh.YearId=".$AfterYId, $con); 

$sqlPchtd=mysql_query("select SUM(M1_Ach) as sM1,SUM(M2_Ach) as sM2,SUM(M3_Ach) as sM3,SUM(M4_Ach) as sM4,SUM(M5_Ach) as sM5,SUM(M6_Ach) as sM6,SUM(M7_Ach) as sM7,SUM(M8_Ach) as sM8,SUM(M9_Ach) as sM9,SUM(M10_Ach) as sM10,SUM(M11_Ach) as sM11,SUM(M12_Ach) as sM12 from hrm_sales_sal_details_".$_REQUEST['y']." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_sales_tlemp tl ON d.HqId=tl.TLHq where TLStatus='A' AND tl.TLRepId=".$EmployeeId." AND d.HqId=".$HqId." AND sp.ItemId=".$_REQUEST['ii']." AND sd.YearId=".$_REQUEST['y'], $con);

$resP0td=mysql_fetch_assoc($sqlP0td); 
$TotP0p1=$resP0td['tsM1']+$resP0td['tsM2']+$resP0td['tsM3']; $TotP0p2=$resP0td['tsM4']+$resP0td['tsM5']+$resP0td['tsM6'];
$TotP0p3=$resP0td['tsM7']+$resP0td['tsM8']+$resP0td['tsM9']; $TotP0p4=$resP0td['tsM10']+$resP0td['tsM11']+$resP0td['tsM12'];
$resP1td=mysql_fetch_assoc($sqlP1td); 
$TotPp1=$resP1td['tsM1']+$resP1td['tsM2']+$resP1td['tsM3']; $TotPp2=$resP1td['tsM4']+$resP1td['tsM5']+$resP1td['tsM6'];
$TotPp3=$resP1td['tsM7']+$resP1td['tsM8']+$resP1td['tsM9']; $TotPp4=$resP1td['tsM10']+$resP1td['tsM11']+$resP1td['tsM12'];
$resP2td=mysql_fetch_assoc($sqlP2td); $resP3td=mysql_fetch_assoc($sqlP3td);
 
$resPchtd=mysql_fetch_assoc($sqlPchtd);
$TP2ch1td=$resPchtd['sM1']+$resPchtd['sM2']+$resPchtd['sM3']; $TP2ch2td=$resPchtd['sM4']+$resPchtd['sM5']+$resPchtd['sM6']; 
$TP2ch3td=$resPchtd['sM7']+$resPchtd['sM8']+$resPchtd['sM9']; $TP2ch4td=$resPchtd['sM10']+$resPchtd['sM11']+$resPchtd['sM12'];
$TotP2chtd=$TP2ch1td+$TP2ch2td+$TP2ch3td+$TP2ch4td;

?>
   <tr style="font-size:14px;color:#000000;background-color:#FFFFA6;height:24px;">
	 <td colspan="3" align="right" style="font-size:16px;"><b>TOTAL:&nbsp;</b></td>
	 <td><input class="TInput" id="<?php echo $HqId.'_'.$HqEmpId; ?>M1_DeT" value="<?php if($TotP0p1!=0){echo $TotP0p1;} ?>" readonly/></td>
     <td><input class="TInput" id="<?php echo $HqId.'_'.$HqEmpId; ?>M1_AeT" value="<?php if($TotPp1!=0){echo $TotPp1;} ?>" readonly/></td>
	 <td><input class="TInput" id="" value="<?php if($Acht4Q1!=0 AND $Acht4Q1!=0){echo $Acht4Q1;} ?>" /></td>
	 <td><input class="TInput" id="" value="<?php if($Acht5Q1!=0 AND $Acht5Q1!=0){echo $Acht5Q1;} ?>" readonly/></td>
	 <td><input class="TInput" id="<?php echo $HqId.'_'.$HqEmpId; ?>M1_BeT" value="<?php if($resP2td['Qa']!=0){echo floatval($resP2td['Qa']);} ?>" /></td>
<?php if($RslP=='Y'){ ?><td><input class="TInput" value="<?php if($TP2ch1td!=0){echo $TP2ch1td;} ?>" readonly/></td><?php } ?>
<?php if($EntP=='Y'){ ?><td><input class="TInput" id="<?php echo $HqId.'_'.$HqEmpId; ?>M1_CeT" value="<?php if($resP3td['Qa']!=0){echo floatval($resP3td['Qa']);} ?>" readonly/></td><?php } ?>
	 
	 
	 <td><input class="TInput" id="<?php echo $HqId.'_'.$HqEmpId; ?>M2_DeT" value="<?php if($TotP0p2!=0){echo $TotP0p2;} ?>" readonly/></td>
	 <td><input class="TInput" id="<?php echo $HqId.'_'.$HqEmpId; ?>M2_AeT" value="<?php if($TotPp2!=0){echo $TotPp2;} ?>" readonly/></td>
	 <td><input class="TInput" id="" value="<?php if($Acht4Q2!=0 AND $Acht4Q2!=0){echo $Acht4Q2;} ?>" readonly/></td>
	 <td><input class="TInput" id="" value="<?php if($Acht5Q2!=0 AND $Acht5Q2!=0){echo $Acht5Q2;} ?>" readonly/></td>
	 <td><input class="TInput" id="<?php echo $HqId.'_'.$HqEmpId; ?>M2_BeT" value="<?php if($resP2td['Qb']!=0){echo floatval($resP2td['Qb']);} ?>" readonly/></td>
<?php if($RslP=='Y'){ ?><td><input class="TInput" value="<?php if($TP2ch2td!=0){echo $TP2ch2td;} ?>" readonly/></td><?php } ?>
<?php if($EntP=='Y'){ ?><td><input class="TInput" id="<?php echo $HqId.'_'.$HqEmpId; ?>M2_CeT" value="<?php if($resP3td['Qb']!=0){echo floatval($resP3td['Qb']);} ?>" readonly/></td><?php } ?>	 
	 
	 
	 <td><input class="TInput" id="<?php echo $HqId.'_'.$HqEmpId; ?>M3_DeT" value="<?php if($TotP0p3!=0){echo $TotP0p3;} ?>" readonly/></td>
	 <td><input class="TInput" id="<?php echo $HqId.'_'.$HqEmpId; ?>M3_AeT" value="<?php if($TotPp3!=0){echo $TotPp3;} ?>" readonly/></td>
	 <td><input class="TInput" id="" value="<?php if($Acht4Q3!=0 AND $Acht4Q3!=0){echo $Acht4Q3;} ?>" readonly/></td>
	 <td><input class="TInput" id="" value="<?php if($Acht5Q3!=0 AND $Acht5Q3!=0){echo $Acht5Q3;} ?>" readonly/></td>	
	 <td><input class="TInput" id="<?php echo $HqId.'_'.$HqEmpId; ?>M3_BeT" value="<?php if($resP2td['Qc']!=0){echo floatval($resP2td['Qc']);} ?>" readonly/></td>
<?php if($RslP=='Y'){ ?><td><input class="TInput" value="<?php if($TP2ch3td!=0){echo $TP2ch3td;} ?>" readonly/></td><?php } ?>
<?php if($EntP=='Y'){ ?><td><input class="TInput" id="<?php echo $HqId.'_'.$HqEmpId; ?>M3_CeT" value="<?php if($resP3td['Qc']!=0){echo floatval($resP3td['Qc']);} ?>" readonly/></td><?php } ?>	 
	 		
	 				 							
	 <td><input class="TInput" id="<?php echo $HqId.'_'.$HqEmpId; ?>M4_DeT" value="<?php if($TotP0p4!=0){echo $TotP0p4;} ?>" readonly/></td>											
     <td><input class="TInput" id="<?php echo $HqId.'_'.$HqEmpId; ?>M4_AeT" value="<?php if($TotPp4!=0){echo $TotPp4;} ?>" readonly/></td>
	 <td><input class="TInput" id="" value="<?php if($Acht4Q4!=0 AND $Acht4Q4!=0){echo $Acht4Q4;} ?>" readonly/></td>
	 <td><input class="TInput" id="" value="<?php if($Acht5Q4!=0 AND $Acht5Q4!=0){echo $Acht5Q4;} ?>" readonly/></td>
	 <td><input class="TInput" id="<?php echo $HqId.'_'.$HqEmpId; ?>M4_BeT" value="<?php if($resP2td['Qd']!=0){echo floatval($resP2td['Qd']);} ?>" readonly/></td>
<?php if($RslP=='Y'){ ?><td><input class="TInput" value="<?php if($TP2ch4td!=0){echo $TP2ch4td;} ?>" readonly/></td><?php } ?>
<?php if($EntP=='Y'){ ?><td><input class="TInput" id="<?php echo $HqId.'_'.$HqEmpId; ?>M4_CeT" value="<?php if($resP3td['Qd']!=0){echo floatval($resP3td['Qd']);} ?>" readonly/></td><?php } ?>	 
	 
	
<?php 
$TotP0td=$TotP0p1+$TotP0p2+$TotP0p3+$TotP0p4; $TotP1td=$TotPp1+$TotPp2+$TotPp3+$TotPp4; 
$TotP4td=$Acht4Q1+$Acht4Q2+$Acht4Q3+$Acht4Q4; $TotP5td=$Acht5Q1+$Acht5Q2+$Acht5Q3+$Acht5Q4; 
$TotP2td=$resP2td['Qa']+$resP2td['Qb']+$resP2td['Qc']+$resP2td['Qd']; 
$TotP3td=$resP3td['Qa']+$resP3td['Qb']+$resP3td['Qc']+$resP3td['Qd'];  ?>
      <td><input class="TInput" id="<?php echo $HqId.'_'.$HqEmpId; ?>TotM_DeT" value="<?php if($TotP0td!=0 AND $TotP0td!=''){echo $TotP0td;}else{echo '';} ?>" readonly/></td>
      <td><input class="TInput" id="<?php echo $HqId.'_'.$HqEmpId; ?>TotM_AeT" value="<?php if($TotP1td!=0 AND $TotP1td!=''){echo $TotP1td;}else{echo '';} ?>" readonly/></td>
	  <td><input class="TInput" id="" value="<?php if($TotP4td!=0 AND $TotP4td!=''){echo $TotP4td;}else{echo '';} ?>" readonly/></td>
	  <td><input class="TInput" id="" value="<?php if($TotP5td!=0 AND $TotP5td!=''){echo $TotP5td;}else{echo '';} ?>" readonly/></td>
	  <td><input class="TInput" id="<?php echo $HqId.'_'.$HqEmpId; ?>TotM_BeT" value="<?php if($TotP2td!=0 AND $TotP2td!=''){echo $TotP2td;}else{echo '';} ?>" readonly/></td>
<?php if($RslP=='Y'){ ?><td><input class="TInput" value="<?php if($TotP2chtd!=0){echo $TotP2chtd;}else{echo '';} ?>" readonly/></td><?php } ?>
<?php if($EntP=='Y'){ ?><td><input class="TInput" id="<?php echo $HqId.'_'.$HqEmpId; ?>TotM_CeT" value="<?php if($TotP3td!=0 AND $TotP3td!=''){echo $TotP3td;}else{echo '';} ?>" readonly/></td><?php } ?>	  
  </tr>	
<?php } ?>  
</table>	       
   </td>  
  </tr>
 </table>
</tr>
<?php } ?> 

<?php } ?>
<?php /******* Teamlease Employe CLose Teamlease Employe CLose Teamlease Employe CLose ****************/ ?>
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
<?php //******************************** Close *************************************** ?>
<tr>
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
			
<?php //****************************************************************************************** ?>
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

