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
<link rel="stylesheet" type="text/css" href="src/css/jscal2."/>
<link rel="stylesheet" type="text/css" href="src/css/border-radius.css"/>
<link rel="stylesheet" type="text/css" href="src/css/steel/steecssl.css"/>
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
.InputB{font-size:13px;width:65px;text-align:right;border:0px;font-weight:bold;background-color:#D9D9FF;} 
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
  var myh=1; var myt=document.getElementById("myt").value; var rowHq=document.getElementById("Rowhq2").value;
  window.location="SalesEntry.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&act="+act+"&hq="+hq+"&y="+v+"&q="+q+"&ii="+ii+"&vc="+vc+"&fc="+fc+"&cc="+cc+"&di="+di+"&gi="+gi+'&EHq='+EHq+'&myh='+myh+'&myt='+myt+'&no='+no;
}

function ChangeTeam(hq,v)
{
  var act=document.getElementById("act").value; //var hq=document.getElementById("hq").value; 
  var q=document.getElementById("q").value; var cc=document.getElementById("cc").value; var di=document.getElementById("di").value;
  var gi=document.getElementById("gi").value; var EHq=document.getElementById("EHq").value; var ii=document.getElementById("ii").value; 
  var fc=document.getElementById("fc").value; var vc=document.getElementById("vc").value; var no=document.getElementById("no").value;
  var myh=document.getElementById("myh").value; var myt=1;
  window.location="SalesEntryMt.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&act="+act+"&hq="+hq+"&y="+v+"&q="+q+"&ii="+ii+"&vc="+vc+"&fc="+fc+"&cc="+cc+"&di="+di+"&gi="+gi+'&EHq='+EHq+'&myh='+myh+'&myt='+myt+"&no="+no; 
}

function ChangePerMi(hq,v)
{
  var act=document.getElementById("act").value; //var hq=document.getElementById("hq").value; 
  var q=document.getElementById("q").value; var cc=document.getElementById("cc").value; var di=document.getElementById("di").value;
  var gi=document.getElementById("gi").value; var EHq=document.getElementById("EHq").value; var ii=document.getElementById("ii").value; 
  var fc=document.getElementById("fc").value; var vc=document.getElementById("vc").value; var no=document.getElementById("no").value;
  var myh=document.getElementById("myh").value; var myt=1;
  window.location="SalesEntryPerMi.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&act="+act+"&hq="+hq+"&y="+v+"&q="+q+"&ii="+ii+"&vc="+vc+"&fc="+fc+"&cc="+cc+"&di="+di+"&gi="+gi+'&EHq='+EHq+'&myh='+myh+'&myt='+myt+"&no="+no; 
}

function ChangeItem(ii,v)
{  
  var act=document.getElementById("act").value; var hq=document.getElementById("hq").value; var y=document.getElementById("y").value;
  var q=document.getElementById("q").value; var cc=document.getElementById("cc").value; var di=document.getElementById("di").value;
  var gi=document.getElementById("gi").value; var EHq=document.getElementById("EHq").value; var no=document.getElementById("no").value;
  var myh=document.getElementById("myh").value; var myt=document.getElementById("myt").value;
  if(ii==0 && v=='vc'){alert("please select vegitable crop item"); return false;}
  else if(ii==0 && v=='fc'){alert("please select field crop item"); return false;}
  else if(ii>0 && v=='vc'){window.location="SalesEntry.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&act="+act+"&hq="+hq+"&y="+y+"&q="+q+"&ii="+ii+"&vc=1&fc=0&cc="+cc+"&di="+di+"&gi="+gi+"&EHq="+EHq+"&myh="+myh+"&myt="+myt+"&no="+no; }
  else if(ii>0 && v=='fc'){window.location="SalesEntry.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&act="+act+"&hq="+hq+"&y="+y+"&q="+q+"&ii="+ii+"&vc=0&fc=1&cc="+cc+"&di="+di+"&gi="+gi+"&EHq="+EHq+"&myh="+myh+"&myt="+myt+"&no="+no; }
  else if(ii=='All_2' && v=='fc'){window.location="SalesEntry.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&act="+act+"&hq="+hq+"&y="+y+"&q="+q+"&ii="+ii+"&vc=0&fc=1&cc="+cc+"&di="+di+"&gi="+gi+"&EHq="+EHq+"&myh="+myh+"&myt="+myt+"&no="+no; }
}

function ClickAllProd(ii,v)
{
 var act=document.getElementById("act").value; var hq=document.getElementById("hq").value; var y=document.getElementById("y").value;
 var q=document.getElementById("q").value; var cc=document.getElementById("cc").value; var di=document.getElementById("di").value;
 var gi=document.getElementById("gi").value; var EHq=document.getElementById("EHq").value; var no=document.getElementById("no").value;
 var myh=document.getElementById("myh").value; var myt=document.getElementById("myt").value; 
 if(v=='ac'){window.location="SalesEntry.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&act="+act+"&hq="+hq+"&y="+y+"&q="+q+"&ac=1&vc=0&fc=0&cc="+cc+"&di="+di+"&gi="+gi+"&EHq="+EHq+"&myh="+myh+"&myt="+myt+"&ii="+ii+"&no="+no; }
}

function ChangeYear(v)
{  
  var act=document.getElementById("act").value; var hq=document.getElementById("hq").value; 
  var q=document.getElementById("q").value; var cc=document.getElementById("cc").value; var di=document.getElementById("di").value;
  var gi=document.getElementById("gi").value; var EHq=document.getElementById("EHq").value; var ii=document.getElementById("ii").value; 
  var fc=document.getElementById("fc").value; var vc=document.getElementById("vc").value; var no=document.getElementById("no").value;
  var myh=document.getElementById("myh").value; var myt=document.getElementById("myt").value;
  window.location="SalesEntry.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&act="+act+"&hq="+hq+"&y="+v+"&q="+q+"&ii="+ii+"&vc="+vc+"&fc="+fc+"&cc="+cc+"&di="+di+"&gi="+gi+"&EHq="+EHq+"&myh="+myh+"&myt="+myt+"&no="+no; 
}

function ChangeQtr(v)
{  
  var act=document.getElementById("act").value; var hq=document.getElementById("hq").value; var y=document.getElementById("y").value;
  var ii=document.getElementById("ii").value; var cc=document.getElementById("cc").value; var di=document.getElementById("di").value;
  var gi=document.getElementById("gi").value; var EHq=document.getElementById("EHq").value; var no=document.getElementById("no").value;
  var fc=document.getElementById("fc").value; var vc=document.getElementById("vc").value;
  var myh=document.getElementById("myh").value; var myt=document.getElementById("myt").value;
  window.location="SalesEntry.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&act="+act+"&hq="+hq+"&y="+y+"&q="+v+"&ii="+ii+"&vc="+vc+"&fc="+fc+"&cc="+cc+"&di="+di+"&gi="+gi+"&EHq="+EHq+"&myh="+myh+"&myt="+myt+"&no="+no;
  
}

function editD(sn,q,d)
{ document.getElementById(d+"EditBtn_"+sn).style.display='none'; document.getElementById(d+"SaveBtn_"+sn).style.display='block'; 
  if(q==1){ document.getElementById(d+"TM1_Ae"+sn).style.background='#FFFFFF';  document.getElementById(d+"TM1_Be"+sn).style.background='#FFFFFF';document.getElementById(d+"M1_Be"+sn).style.background='#FFFFFF';document.getElementById(d+"M1_Be"+sn).readOnly=false;document.getElementById(d+"TM1_Ce"+sn).style.background='#FFFFFF';document.getElementById(d+"M1_Ce"+sn).style.background='#FFFFFF';document.getElementById(d+"M1_Ce"+sn).readOnly=false; document.getElementById(d+"TM2_Ae"+sn).style.background='#FFFFFF'; document.getElementById(d+"TM2_Be"+sn).style.background='#FFFFFF';document.getElementById(d+"M2_Be"+sn).style.background='#FFFFFF';document.getElementById(d+"M2_Be"+sn).readOnly=false;document.getElementById(d+"TM2_Ce"+sn).style.background='#FFFFFF';document.getElementById(d+"M2_Ce"+sn).style.background='#FFFFFF';document.getElementById(d+"M2_Ce"+sn).readOnly=false; document.getElementById(d+"TM3_Ae"+sn).style.background='#FFFFFF'; document.getElementById(d+"TM3_Be"+sn).style.background='#FFFFFF';document.getElementById(d+"M3_Be"+sn).style.background='#FFFFFF';document.getElementById(d+"M3_Be"+sn).readOnly=false;document.getElementById(d+"TM3_Ce"+sn).style.background='#FFFFFF';document.getElementById(d+"M3_Ce"+sn).style.background='#FFFFFF';document.getElementById(d+"M3_Ce"+sn).readOnly=false; }
  else if(q==2){ document.getElementById(d+"TM4_Ae"+sn).style.background='#FFFFFF'; document.getElementById(d+"TM4_Be"+sn).style.background='#FFFFFF';document.getElementById(d+"M4_Be"+sn).style.background='#FFFFFF';document.getElementById(d+"M4_Be"+sn).readOnly=false;document.getElementById(d+"TM4_Ce"+sn).style.background='#FFFFFF';document.getElementById(d+"M4_Ce"+sn).style.background='#FFFFFF';document.getElementById(d+"M4_Ce"+sn).readOnly=false; document.getElementById(d+"TM5_Ae"+sn).style.background='#FFFFFF'; document.getElementById(d+"TM5_Be"+sn).style.background='#FFFFFF';document.getElementById(d+"M5_Be"+sn).style.background='#FFFFFF';document.getElementById(d+"M5_Be"+sn).readOnly=false;document.getElementById(d+"TM5_Ce"+sn).style.background='#FFFFFF';document.getElementById(d+"M5_Ce"+sn).style.background='#FFFFFF';document.getElementById(d+"M5_Ce"+sn).readOnly=false; document.getElementById(d+"TM6_Ae"+sn).style.background='#FFFFFF'; document.getElementById(d+"TM6_Be"+sn).style.background='#FFFFFF';document.getElementById(d+"M6_Be"+sn).style.background='#FFFFFF';document.getElementById(d+"M6_Be"+sn).readOnly=false;document.getElementById(d+"TM6_Ce"+sn).style.background='#FFFFFF';document.getElementById(d+"M6_Ce"+sn).style.background='#FFFFFF';document.getElementById(d+"M6_Ce"+sn).readOnly=false; }
  else if(q==3){ document.getElementById(d+"TM7_Ae"+sn).style.background='#FFFFFF'; document.getElementById(d+"TM7_Be"+sn).style.background='#FFFFFF';document.getElementById(d+"M7_Be"+sn).style.background='#FFFFFF';document.getElementById(d+"M7_Be"+sn).readOnly=false;document.getElementById(d+"TM7_Ce"+sn).style.background='#FFFFFF';document.getElementById(d+"M7_Ce"+sn).style.background='#FFFFFF';document.getElementById(d+"M7_Ce"+sn).readOnly=false; document.getElementById(d+"TM8_Ae"+sn).style.background='#FFFFFF'; document.getElementById(d+"TM8_Be"+sn).style.background='#FFFFFF';document.getElementById(d+"M8_Be"+sn).style.background='#FFFFFF';document.getElementById(d+"M8_Be"+sn).readOnly=false;document.getElementById(d+"TM8_Ce"+sn).style.background='#FFFFFF';document.getElementById(d+"M8_Ce"+sn).style.background='#FFFFFF';document.getElementById(d+"M8_Ce"+sn).readOnly=false; document.getElementById(d+"TM9_Ae"+sn).style.background='#FFFFFF'; document.getElementById(d+"TM9_Be"+sn).style.background='#FFFFFF';document.getElementById(d+"M9_Be"+sn).style.background='#FFFFFF';document.getElementById(d+"M9_Be"+sn).readOnly=false;document.getElementById(d+"TM9_Ce"+sn).style.background='#FFFFFF';document.getElementById(d+"M9_Ce"+sn).style.background='#FFFFFF';document.getElementById(d+"M9_Ce"+sn).readOnly=false; }
  else if(q==4){ document.getElementById(d+"TM10_Ae"+sn).style.background='#FFFFFF'; document.getElementById(d+"TM10_Be"+sn).style.background='#FFFFFF';document.getElementById(d+"M10_Be"+sn).style.background='#FFFFFF';document.getElementById(d+"M10_Be"+sn).readOnly=false; document.getElementById(d+"TM10_Ce"+sn).style.background='#FFFFFF';document.getElementById(d+"M10_Ce"+sn).style.background='#FFFFFF';document.getElementById(d+"M10_Ce"+sn).readOnly=false; document.getElementById(d+"TM11_Ae"+sn).style.background='#FFFFFF'; document.getElementById(d+"TM11_Be"+sn).style.background='#FFFFFF';document.getElementById(d+"M11_Be"+sn).style.background='#FFFFFF';document.getElementById(d+"M11_Be"+sn).readOnly=false;document.getElementById(d+"TM11_Ce"+sn).style.background='#FFFFFF';document.getElementById(d+"M11_Ce"+sn).style.background='#FFFFFF';document.getElementById(d+"M11_Ce"+sn).readOnly=false; document.getElementById(d+"TM12_Ae"+sn).style.background='#FFFFFF'; document.getElementById(d+"TM12_Be"+sn).style.background='#FFFFFF';document.getElementById(d+"M12_Be"+sn).style.background='#FFFFFF';document.getElementById(d+"M12_Be"+sn).readOnly=false;document.getElementById(d+"TM12_Ce"+sn).style.background='#FFFFFF';document.getElementById(d+"M12_Ce"+sn).style.background='#FFFFFF';document.getElementById(d+"M12_Ce"+sn).readOnly=false; } 
}

function saveD(sn,yi,di,q)
{ var PId=document.getElementById(di+'P_'+sn).value; var EId=document.getElementById('EmpId').value; var ii=document.getElementById('ii').value; 
  var hq=document.getElementById('hq').value; var TerId=document.getElementById('TerId').value; var Reporting=document.getElementById('Reporting').value;
  //var L1=document.getElementById('L1').value; var L2=document.getElementById('L2').value; var L3=document.getElementById('L3').value; 
  //var L4=document.getElementById('L4').value; var L5=document.getElementById('L5').value; 
  
  if(q==1){ var M1A=parseFloat(document.getElementById(di+'M1_Ae'+sn).value); var M2A=parseFloat(document.getElementById(di+'M2_Ae'+sn).value); var M3A=parseFloat(document.getElementById(di+'M3_Ae'+sn).value); var M1B=parseFloat(document.getElementById(di+'M1_Be'+sn).value); var M2B=parseFloat(document.getElementById(di+'M2_Be'+sn).value); var M3B=parseFloat(document.getElementById(di+'M3_Be'+sn).value); var M1C=parseFloat(document.getElementById(di+'M1_Ce'+sn).value); var M2C=parseFloat(document.getElementById(di+'M2_Ce'+sn).value); var M3C=parseFloat(document.getElementById(di+'M3_Ce'+sn).value); var Mn1A=document.getElementById(di+'M1_Ae'+sn).value; var Mn2A=document.getElementById(di+'M2_Ae'+sn).value; var Mn3A=document.getElementById(di+'M3_Ae'+sn).value; var Mn1B=document.getElementById(di+'M1_Be'+sn).value; var Mn2B=document.getElementById(di+'M2_Be'+sn).value; var Mn3B=document.getElementById(di+'M3_Be'+sn).value; var Mn1C=document.getElementById(di+'M1_Ce'+sn).value; var Mn2C=document.getElementById(di+'M2_Ce'+sn).value; var Mn3C=document.getElementById(di+'M3_Ce'+sn).value;  
  if(Mn1A==''){var n1A=0;}else{var n1A=M1A;} if(Mn2A==''){var n2A=0;}else{var n2A=M2A;} if(Mn3A==''){var n3A=0;}else{var n3A=M3A;} 
  if(Mn1B==''){var n1B=0;}else{var n1B=M1B;} if(Mn2B==''){var n2B=0;}else{var n2B=M2B;} if(Mn3B==''){var n3B=0;}else{var n3B=M3B;}
  if(Mn1C==''){var n1C=0;}else{var n1C=M1C;} if(Mn2C==''){var n2C=0;}else{var n2C=M2C;} if(Mn3C==''){var n3C=0;}else{var n3C=M3C;}  
  var TotA=Math.round((n1A+n2A+n3A)*100)/100; var TotB=Math.round((n1B+n2B+n3B)*100)/100; var TotC=Math.round((n1C+n2C+n3C)*100)/100; 
  document.getElementById("TotAValueM").value=TotA; document.getElementById("TotBValueM").value=TotB; document.getElementById("TotCValueM").value=TotC; 
  document.getElementById("Sno").value=sn; document.getElementById("DealerId").value=di; 
  var url = 'SlctSalesProdDeal.php';  var pars = 'Action=AddMonth&p='+PId+'&e='+EId+'&m1A='+n1A+'&m2A='+n2A+'&m3A='+n3A+'&m1B='+n1B+'&m2B='+n2B+'&m3B='+n3B+'&m1C='+n1C+'&m2C='+n2C+'&m3C='+n3C+'&TotA='+TotA+'&TotB='+TotB+'&TotC='+TotC+'&yi='+yi+'&di='+di+'&sn='+sn+'&hi='+hq+'&TerId='+TerId+'&q='+q+'&ii='+ii+'&Reporting='+Reporting; } 
  //+'&L1='+L1+'&L2='+L2+'&L3='+L3+'&L4='+L4+'&L5='+L5
  
  else if(q==2){ var M4A=parseFloat(document.getElementById(di+'M4_Ae'+sn).value); var M5A=parseFloat(document.getElementById(di+'M5_Ae'+sn).value); var M6A=parseFloat(document.getElementById(di+'M6_Ae'+sn).value); var M4B=parseFloat(document.getElementById(di+'M4_Be'+sn).value); var M5B=parseFloat(document.getElementById(di+'M5_Be'+sn).value); var M6B=parseFloat(document.getElementById(di+'M6_Be'+sn).value); var M4C=parseFloat(document.getElementById(di+'M4_Ce'+sn).value); var M5C=parseFloat(document.getElementById(di+'M5_Ce'+sn).value); var M6C=parseFloat(document.getElementById(di+'M6_Ce'+sn).value); var Mn4A=document.getElementById(di+'M4_Ae'+sn).value; var Mn5A=document.getElementById(di+'M5_Ae'+sn).value; var Mn6A=document.getElementById(di+'M6_Ae'+sn).value; var Mn4B=document.getElementById(di+'M4_Be'+sn).value; var Mn5B=document.getElementById(di+'M5_Be'+sn).value; var Mn6B=document.getElementById(di+'M6_Be'+sn).value; var Mn4C=document.getElementById(di+'M4_Ce'+sn).value; var Mn5C=document.getElementById(di+'M5_Ce'+sn).value; var Mn6C=document.getElementById(di+'M6_Ce'+sn).value; 
  if(Mn4A==''){var n4A=0;}else{var n4A=M4A;}if(Mn5A==''){var n5A=0;}else{var n5A=M5A;} if(Mn6A==''){var n6A=0;}else{var n6A=M6A;} 
  if(Mn4B==''){var n4B=0;}else{var n4B=M4B;}if(Mn5B==''){var n5B=0;}else{var n5B=M5B;} if(Mn6B==''){var n6B=0;}else{var n6B=M6B;}
  if(Mn4C==''){var n4C=0;}else{var n4C=M4C;}if(Mn5C==''){var n5C=0;}else{var n5C=M5C;} if(Mn6C==''){var n6C=0;}else{var n6C=M6C;}
  var TotA=Math.round((n4A+n5A+n6A)*100)/100; var TotB=Math.round((n4B+n5B+n6B)*100)/100; var TotC=Math.round((n4C+n5C+n6C)*100)/100;
  document.getElementById("TotAValueM").value=TotA; document.getElementById("TotBValueM").value=TotB; document.getElementById("TotCValueM").value=TotC;
  document.getElementById("Sno").value=sn; document.getElementById("DealerId").value=di;
  var url = 'SlctSalesProdDeal.php';  var pars = 'Action=AddMonth&p='+PId+'&e='+EId+'&m4A='+n4A+'&m5A='+n5A+'&m6A='+n6A+'&m4B='+n4B+'&m5B='+n5B+'&m6B='+n6B+'&m4C='+n4C+'&m5C='+n5C+'&m6C='+n6C+'&TotA='+TotA+'&TotB='+TotB+'&TotC='+TotC+'&yi='+yi+'&di='+di+'&sn='+sn+'&hi='+hq+'&TerId='+TerId+'&q='+q+'&ii='+ii+'&Reporting='+Reporting; } 
  //+'&L1='+L1+'&L2='+L2+'&L3='+L3+'&L4='+L4+'&L5='+L5
  
  else if(q==3){ var M7A=parseFloat(document.getElementById(di+'M7_Ae'+sn).value); var M8A=parseFloat(document.getElementById(di+'M8_Ae'+sn).value); var M9A=parseFloat(document.getElementById(di+'M9_Ae'+sn).value); var M7B=parseFloat(document.getElementById(di+'M7_Be'+sn).value); var M8B=parseFloat(document.getElementById(di+'M8_Be'+sn).value); var M9B=parseFloat(document.getElementById(di+'M9_Be'+sn).value); var M7C=parseFloat(document.getElementById(di+'M7_Ce'+sn).value); var M8C=parseFloat(document.getElementById(di+'M8_Ce'+sn).value); var M9C=parseFloat(document.getElementById(di+'M9_Ce'+sn).value); var Mn7A=document.getElementById(di+'M7_Ae'+sn).value; var Mn8A=document.getElementById(di+'M8_Ae'+sn).value; var Mn9A=document.getElementById(di+'M9_Ae'+sn).value; var Mn7B=document.getElementById(di+'M7_Be'+sn).value; var Mn8B=document.getElementById(di+'M8_Be'+sn).value; var Mn9B=document.getElementById(di+'M9_Be'+sn).value; var Mn7C=document.getElementById(di+'M7_Ce'+sn).value; var Mn8C=document.getElementById(di+'M8_Ce'+sn).value; var Mn9C=document.getElementById(di+'M9_Ce'+sn).value;
  if(Mn7A==''){var n7A=0;}else{var n7A=M7A;} if(Mn8A==''){var n8A=0;}else{var n8A=M8A;}if(Mn9A==''){var n9A=0;}else{var n9A=M9A;} 
  if(Mn7B==''){var n7B=0;}else{var n7B=M7B;} if(Mn8B==''){var n8B=0;}else{var n8B=M8B;}if(Mn9B==''){var n9B=0;}else{var n9B=M9B;} 
  if(Mn7C==''){var n7C=0;}else{var n7C=M7C;} if(Mn8C==''){var n8C=0;}else{var n8C=M8C;}if(Mn9C==''){var n9C=0;}else{var n9C=M9C;}
  var TotA=Math.round((n7A+n8A+n9A)*100)/100; var TotB=Math.round((n7B+n8B+n9B)*100)/100; var TotC=Math.round((n7C+n8C+n9C)*100)/100;
  document.getElementById("TotAValueM").value=TotA; document.getElementById("TotBValueM").value=TotB; document.getElementById("TotCValueM").value=TotC;
  document.getElementById("Sno").value=sn; document.getElementById("DealerId").value=di;
  var url = 'SlctSalesProdDeal.php';  var pars = 'Action=AddMonth&p='+PId+'&e='+EId+'&m7A='+n7A+'&m8A='+n8A+'&m9A='+n9A+'&m7B='+n7B+'&m8B='+n8B+'&m9B='+n9B+'&m7C='+n7C+'&m8C='+n8C+'&m9C='+n9C+'&TotA='+TotA+'&TotB='+TotB+'&TotC='+TotC+'&yi='+yi+'&di='+di+'&sn='+sn+'&hi='+hq+'&TerId='+TerId+'&q='+q+'&ii='+ii+'&Reporting='+Reporting; } 
  //+'&L1='+L1+'&L2='+L2+'&L3='+L3+'&L4='+L4+'&L5='+L5
  
  else if(q==4){ var M10A=parseFloat(document.getElementById(di+'M10_Ae'+sn).value); var M11A=parseFloat(document.getElementById(di+'M11_Ae'+sn).value); var M12A=parseFloat(document.getElementById(di+'M12_Ae'+sn).value); var M10B=parseFloat(document.getElementById(di+'M10_Be'+sn).value); var M11B=parseFloat(document.getElementById(di+'M11_Be'+sn).value); var M12B=parseFloat(document.getElementById(di+'M12_Be'+sn).value); var M10C=parseFloat(document.getElementById(di+'M10_Ce'+sn).value); var M11C=parseFloat(document.getElementById(di+'M11_Ce'+sn).value); var M12C=parseFloat(document.getElementById(di+'M12_Ce'+sn).value); var Mn10A=document.getElementById(di+'M10_Ae'+sn).value; var Mn11A=document.getElementById(di+'M11_Ae'+sn).value; var Mn12A=document.getElementById(di+'M12_Ae'+sn).value; var Mn10B=document.getElementById(di+'M10_Be'+sn).value; var Mn11B=document.getElementById(di+'M11_Be'+sn).value; var Mn12B=document.getElementById(di+'M12_Be'+sn).value; var Mn10C=document.getElementById(di+'M10_Ce'+sn).value; var Mn11C=document.getElementById(di+'M11_Ce'+sn).value; var Mn12C=document.getElementById(di+'M12_Ce'+sn).value; 
  if(Mn10A==''){var n10A=0;}else{var n10A=M10A;} if(Mn11A==''){var n11A=0;}else{var n11A=M11A;} if(Mn12A==''){var n12A=0;}else{var n12A=M12A;}
  if(Mn10B==''){var n10B=0;}else{var n10B=M10B;} if(Mn11B==''){var n11B=0;}else{var n11B=M11B;} if(Mn12B==''){var n12B=0;}else{var n12B=M12B;}
  if(Mn10C==''){var n10C=0;}else{var n10C=M10C;} if(Mn11C==''){var n11C=0;}else{var n11C=M11C;} if(Mn12C==''){var n12C=0;}else{var n12C=M12C;}
  var TotA=Math.round((n10A+n11A+n12A)*100)/100; var TotB=Math.round((n10B+n11B+n12B)*100)/100; var TotC=Math.round((n10C+n11C+n12C)*100)/100; 
  document.getElementById("TotAValueM").value=TotA; document.getElementById("TotBValueM").value=TotB; document.getElementById("TotCValueM").value=TotC;
  document.getElementById("Sno").value=sn; document.getElementById("DealerId").value=di;  var url = 'SlctSalesProdDeal.php'; 
  var pars = 'Action=AddMonth&p='+PId+'&e='+EId+'&m10A='+n10A+'&m11A='+n11A+'&m12A='+n12A+'&m10B='+n10B+'&m11B='+n11B+'&m12B='+n12B+'&m10C='+n10C+'&m11C='+n11C+'&m12C='+n12C+'&TotA='+TotA+'&TotB='+TotB+'&TotC='+TotC+'&yi='+yi+'&di='+di+'&sn='+sn+'&hi='+hq+'&TerId='+TerId+'&q='+q+'&ii='+ii+'&Reporting='+Reporting; }
  //+'&L1='+L1+'&L2='+L2+'&L3='+L3+'&L4='+L4+'&L5='+L5  
    
  var myAjax = new Ajax.Request( url, { method: 'post', parameters: pars, onComplete: show_AddMonth });  
}
function show_AddMonth(originalRequest)
{ document.getElementById('AddMonthResult').innerHTML = originalRequest.responseText; var Sno=document.getElementById('Sno').value; 
  var di=document.getElementById('DealerId').value; var q=document.getElementById('q').value; var ii=document.getElementById('ii').value;
  var TotalA=document.getElementById(di+'TotP1d_'+Sno).value=document.getElementById('TotAValueM').value; 
  var TotalB=document.getElementById(di+'TotP2d_'+Sno).value=document.getElementById('TotBValueM').value;   
  var TotalC=document.getElementById(di+'TotP3d_'+Sno).value=document.getElementById('TotCValueM').value; 
 
  if(q==1){ document.getElementById(di+'TM1_Ae'+Sno).style.background='#E0FFC1'; document.getElementById(di+'TM2_Ae'+Sno).style.background='#E0FFC1'; document.getElementById(di+'TM3_Ae'+Sno).style.background='#E0FFC1'; document.getElementById(di+'TM1_Be'+Sno).style.background='#E0FFC1'; document.getElementById(di+'TM2_Be'+Sno).style.background='#E0FFC1'; document.getElementById(di+'TM3_Be'+Sno).style.background='#E0FFC1'; document.getElementById(di+'TM1_Ce'+Sno).style.background='#E0FFC1'; document.getElementById(di+'TM2_Ce'+Sno).style.background='#E0FFC1'; document.getElementById(di+'TM3_Ce'+Sno).style.background='#E0FFC1'; document.getElementById(di+'M1_Be'+Sno).style.background='#E0FFC1'; document.getElementById(di+'M2_Be'+Sno).style.background='#E0FFC1'; document.getElementById(di+'M3_Be'+Sno).style.background='#E0FFC1'; document.getElementById(di+'M1_Ce'+Sno).style.background='#E0FFC1'; document.getElementById(di+'M2_Ce'+Sno).style.background='#E0FFC1'; document.getElementById(di+'M3_Ce'+Sno).style.background='#E0FFC1'; 
  document.getElementById('M1_B'+Sno).value=document.getElementById("Tot21P").value; document.getElementById('M2_B'+Sno).value=document.getElementById("Tot22P").value; 
  document.getElementById('M3_B'+Sno).value=document.getElementById("Tot23P").value; document.getElementById('M1_C'+Sno).value=document.getElementById("Tot31P").value;  
  document.getElementById('M2_C'+Sno).value=document.getElementById("Tot32P").value; document.getElementById('M3_C'+Sno).value=document.getElementById("Tot33P").value; 
  document.getElementById('TotP2_'+Sno).value=document.getElementById("PTot2P").value; document.getElementById('TotP3_'+Sno).value=document.getElementById("PTot3P").value; 
  if(ii!='All_1' && ii!='All_2'){ 
  document.getElementById(di+'M1_BeT').value=document.getElementById("Tot21").value; document.getElementById(di+'M2_BeT').value=document.getElementById("Tot22").value; 
  document.getElementById(di+'M3_BeT').value=document.getElementById("Tot23").value; document.getElementById(di+'M1_CeT').value=document.getElementById("Tot31").value;  
  document.getElementById(di+'M2_CeT').value=document.getElementById("Tot32").value; document.getElementById(di+'M3_CeT').value=document.getElementById("Tot33").value; 
  document.getElementById(di+'TotM_BeT').value=document.getElementById("TTot2").value; document.getElementById(di+'TotM_CeT').value=document.getElementById("TTot3").value; 
  document.getElementById('TotP1_TB').value=document.getElementById("Tot21T").value; document.getElementById('TotP2_TB').value=document.getElementById("Tot22T").value; 
  document.getElementById('TotP3_TB').value=document.getElementById("Tot23T").value; document.getElementById('TotP1_TC').value=document.getElementById("Tot31T").value;  
  document.getElementById('TotP2_TC').value=document.getElementById("Tot32T").value; document.getElementById('TotP3_TC').value=document.getElementById("Tot33T").value; 
  document.getElementById('TotM_BeT').value=document.getElementById("TTot2T").value; document.getElementById('TotM_CeT').value=document.getElementById("TTot3T").value; }
  }  
  
  else if(q==2){ document.getElementById(di+'TM4_Ae'+Sno).style.background='#E0FFC1'; document.getElementById(di+'TM5_Ae'+Sno).style.background='#E0FFC1'; document.getElementById(di+'TM6_Ae'+Sno).style.background='#E0FFC1'; document.getElementById(di+'TM4_Be'+Sno).style.background='#E0FFC1'; document.getElementById(di+'TM5_Be'+Sno).style.background='#E0FFC1'; document.getElementById(di+'TM6_Be'+Sno).style.background='#E0FFC1'; document.getElementById(di+'TM4_Ce'+Sno).style.background='#E0FFC1'; document.getElementById(di+'TM5_Ce'+Sno).style.background='#E0FFC1'; document.getElementById(di+'TM6_Ce'+Sno).style.background='#E0FFC1'; document.getElementById(di+'M4_Be'+Sno).style.background='#E0FFC1'; document.getElementById(di+'M5_Be'+Sno).style.background='#E0FFC1'; document.getElementById(di+'M6_Be'+Sno).style.background='#E0FFC1'; document.getElementById(di+'M4_Ce'+Sno).style.background='#E0FFC1'; document.getElementById(di+'M5_Ce'+Sno).style.background='#E0FFC1'; document.getElementById(di+'M6_Ce'+Sno).style.background='#E0FFC1'; 
  document.getElementById('M4_B'+Sno).value=document.getElementById("Tot21P").value; document.getElementById('M5_B'+Sno).value=document.getElementById("Tot22P").value; 
  document.getElementById('M6_B'+Sno).value=document.getElementById("Tot23P").value; document.getElementById('M4_C'+Sno).value=document.getElementById("Tot31P").value;  
  document.getElementById('M5_C'+Sno).value=document.getElementById("Tot32P").value; document.getElementById('M6_C'+Sno).value=document.getElementById("Tot33P").value; 
  document.getElementById('TotP2_'+Sno).value=document.getElementById("PTot2P").value; document.getElementById('TotP3_'+Sno).value=document.getElementById("PTot3P").value;
  if(ii!='All_1' && ii!='All_2'){
  document.getElementById(di+'M4_BeT').value=document.getElementById("Tot21").value; document.getElementById(di+'M5_BeT').value=document.getElementById("Tot22").value; 
  document.getElementById(di+'M6_BeT').value=document.getElementById("Tot23").value; document.getElementById(di+'M4_CeT').value=document.getElementById("Tot31").value;  
  document.getElementById(di+'M5_CeT').value=document.getElementById("Tot32").value; document.getElementById(di+'M6_CeT').value=document.getElementById("Tot33").value;
  document.getElementById(di+'TotM_BeT').value=document.getElementById("TTot2").value; document.getElementById(di+'TotM_CeT').value=document.getElementById("TTot3").value;
  document.getElementById('TotP4_TB').value=document.getElementById("Tot21T").value; document.getElementById('TotP5_TB').value=document.getElementById("Tot22T").value; 
  document.getElementById('TotP6_TB').value=document.getElementById("Tot23T").value; document.getElementById('TotP4_TC').value=document.getElementById("Tot31T").value;  
  document.getElementById('TotP5_TC').value=document.getElementById("Tot32T").value; document.getElementById('TotP6_TC').value=document.getElementById("Tot33T").value; 
  document.getElementById('TotM_BeT').value=document.getElementById("TTot2T").value; document.getElementById('TotM_CeT').value=document.getElementById("TTot3T").value; }
  } 
  
  else if(q==3){ document.getElementById(di+'TM7_Ae'+Sno).style.background='#E0FFC1'; document.getElementById(di+'TM8_Ae'+Sno).style.background='#E0FFC1'; document.getElementById(di+'TM9_Ae'+Sno).style.background='#E0FFC1'; document.getElementById(di+'TM7_Be'+Sno).style.background='#E0FFC1'; document.getElementById(di+'TM8_Be'+Sno).style.background='#E0FFC1'; document.getElementById(di+'TM9_Be'+Sno).style.background='#E0FFC1'; document.getElementById(di+'TM7_Ce'+Sno).style.background='#E0FFC1'; document.getElementById(di+'TM8_Ce'+Sno).style.background='#E0FFC1'; document.getElementById(di+'TM9_Ce'+Sno).style.background='#E0FFC1'; document.getElementById(di+'M7_Be'+Sno).style.background='#E0FFC1'; document.getElementById(di+'M8_Be'+Sno).style.background='#E0FFC1'; document.getElementById(di+'M9_Be'+Sno).style.background='#E0FFC1'; document.getElementById(di+'M7_Ce'+Sno).style.background='#E0FFC1'; document.getElementById(di+'M8_Ce'+Sno).style.background='#E0FFC1'; document.getElementById(di+'M9_Ce'+Sno).style.background='#E0FFC1';
  document.getElementById('M7_B'+Sno).value=document.getElementById("Tot21P").value; document.getElementById('M8_B'+Sno).value=document.getElementById("Tot22P").value; 
  document.getElementById('M9_B'+Sno).value=document.getElementById("Tot23P").value; document.getElementById('M7_C'+Sno).value=document.getElementById("Tot31P").value;  
  document.getElementById('M8_C'+Sno).value=document.getElementById("Tot32P").value; document.getElementById('M9_C'+Sno).value=document.getElementById("Tot33P").value; 
  document.getElementById('TotP2_'+Sno).value=document.getElementById("PTot2P").value; document.getElementById('TotP3_'+Sno).value=document.getElementById("PTot3P").value;
  if(ii!='All_1' && ii!='All_2'){
  document.getElementById(di+'M7_BeT').value=document.getElementById("Tot21").value; document.getElementById(di+'M8_BeT').value=document.getElementById("Tot22").value; 
  document.getElementById(di+'M9_BeT').value=document.getElementById("Tot23").value; document.getElementById(di+'M7_CeT').value=document.getElementById("Tot31").value;  
  document.getElementById(di+'M8_CeT').value=document.getElementById("Tot32").value; document.getElementById(di+'M9_CeT').value=document.getElementById("Tot33").value;
  document.getElementById(di+'TotM_BeT').value=document.getElementById("TTot2").value; document.getElementById(di+'TotM_CeT').value=document.getElementById("TTot3").value;
  document.getElementById('TotP7_TB').value=document.getElementById("Tot21T").value; document.getElementById('TotP8_TB').value=document.getElementById("Tot22T").value; 
  document.getElementById('TotP9_TB').value=document.getElementById("Tot23T").value; document.getElementById('TotP7_TC').value=document.getElementById("Tot31T").value;  
  document.getElementById('TotP8_TC').value=document.getElementById("Tot32T").value; document.getElementById('TotP9_TC').value=document.getElementById("Tot33T").value; 
  document.getElementById('TotM_BeT').value=document.getElementById("TTot2T").value; document.getElementById('TotM_CeT').value=document.getElementById("TTot3T").value; }
  } 
  
  else if(q==4){ document.getElementById(di+'TM10_Ae'+Sno).style.background='#E0FFC1'; document.getElementById(di+'TM11_Ae'+Sno).style.background='#E0FFC1'; document.getElementById(di+'TM12_Ae'+Sno).style.background='#E0FFC1'; document.getElementById(di+'TM10_Be'+Sno).style.background='#E0FFC1'; document.getElementById(di+'TM11_Be'+Sno).style.background='#E0FFC1'; document.getElementById(di+'TM12_Be'+Sno).style.background='#E0FFC1'; document.getElementById(di+'TM10_Ce'+Sno).style.background='#E0FFC1'; document.getElementById(di+'TM11_Ce'+Sno).style.background='#E0FFC1'; document.getElementById(di+'TM12_Ce'+Sno).style.background='#E0FFC1'; document.getElementById(di+'M10_Be'+Sno).style.background='#E0FFC1'; document.getElementById(di+'M11_Be'+Sno).style.background='#E0FFC1'; document.getElementById(di+'M12_Be'+Sno).style.background='#E0FFC1'; document.getElementById(di+'M10_Ce'+Sno).style.background='#E0FFC1'; document.getElementById(di+'M11_Ce'+Sno).style.background='#E0FFC1'; document.getElementById(di+'M12_Ce'+Sno).style.background='#E0FFC1'; 
  document.getElementById('M10_B'+Sno).value=document.getElementById("Tot21P").value; document.getElementById('M11_B'+Sno).value=document.getElementById("Tot22P").value; 
  document.getElementById('M12_B'+Sno).value=document.getElementById("Tot23P").value; document.getElementById('M10_C'+Sno).value=document.getElementById("Tot31P").value;  
  document.getElementById('M11_C'+Sno).value=document.getElementById("Tot32P").value; document.getElementById('M12_C'+Sno).value=document.getElementById("Tot33P").value; 
  document.getElementById('TotP2_'+Sno).value=document.getElementById("PTot2P").value; document.getElementById('TotP3_'+Sno).value=document.getElementById("PTot3P").value;
  if(ii!='All_1' && ii!='All_2'){
  document.getElementById(di+'M10_BeT').value=document.getElementById("Tot21").value; document.getElementById(di+'M11_BeT').value=document.getElementById("Tot22").value; 
  document.getElementById(di+'M12_BeT').value=document.getElementById("Tot23").value; document.getElementById(di+'M10_CeT').value=document.getElementById("Tot31").value;  
  document.getElementById(di+'M11_CeT').value=document.getElementById("Tot32").value; document.getElementById(di+'M12_CeT').value=document.getElementById("Tot33").value;
  document.getElementById(di+'TotM_BeT').value=document.getElementById("TTot2").value; document.getElementById(di+'TotM_CeT').value=document.getElementById("TTot3").value;
  document.getElementById('TotP10_TB').value=document.getElementById("Tot21T").value; document.getElementById('TotP11_TB').value=document.getElementById("Tot22T").value; 
  document.getElementById('TotP12_TB').value=document.getElementById("Tot23T").value; document.getElementById('TotP10_TC').value=document.getElementById("Tot31T").value;  
  document.getElementById('TotP11_TC').value=document.getElementById("Tot32T").value; document.getElementById('TotP12_TC').value=document.getElementById("Tot33T").value; 
  document.getElementById('TotM_BeT').value=document.getElementById("TTot2T").value; document.getElementById('TotM_CeT').value=document.getElementById("TTot3T").value; }
  }
  
 document.getElementById(di+"EditBtn_"+Sno).style.display='block';  document.getElementById(di+"SaveBtn_"+Sno).style.display='none'; 
 //document.getElementById("SubmitBtn_"+Sno).style.display='block';
 
}

function ClickFSL1(e,y)
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
    var win = window.open("SbOpenFile.php?CheckAct=Fsb1&y="+y+"&e="+e,"QForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=620,height=300");
	//alert("act="+act+"&hq="+hq+"&y="+y+"&q="+q+"&ii="+ii+"&vc="+vc+"&fc="+fc+"&cc="+cc+"&di="+di+"&gi="+gi+"&EHq="+EHq+"&myh="+myh+"&myt="+myt);
	var timer = setInterval( function() { if(win.closed) { clearInterval(timer);  window.location="SalesEntry.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&act="+act+"&hq="+hq+"&y="+y+"&q="+q+"&ii=0&vc=0&fc=0&ac=1&cc="+cc+"&di="+di+"&gi="+gi+"&EHq="+EHq+"&myh="+myh+"&myt="+myt; } }, 1000);
	
	//window.location="SalesEntry.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&act="+act+"&hq="+hq+"&y="+y+"&q="+q+"&ii="+ii+"&vc="+vc+"&fc="+fc+"&cc="+cc+"&di="+di+"&gi="+gi+"&EHq="+EHq+"&myh="+myh+"&myt="+myt; } }, 1000);
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
<?php $SpP=mysql_query("select GradeId,DepartmentId,HqId,RepEmployeeID from hrm_employee_general where EmployeeID=".$EmployeeId, $con); $resSpP=mysql_fetch_assoc($SpP); ?>		
<input type="hidden" name="ComId" id="ComId" value="<?php echo $CompanyId; ?>" /><input type="hidden" id="EmpId" name="EmpId" value="<?php echo $EmployeeId; ?>" />
<input type="hidden" id="act" value="<?php echo $_REQUEST['act']; ?>" /><input type="hidden" name="y" id="y" value="<?php echo $_REQUEST['y']; ?>" />
<input type="hidden" name="hq" id="hq" value="<?php echo $_REQUEST['hq']; ?>" /><input type="hidden" name="q" id="q" value="<?php echo $_REQUEST['q']; ?>" />
<input type="hidden" name="vc" id="vc" value="<?php echo $_REQUEST['vc']; ?>" /><input type="hidden" name="fc" id="fc" value="<?php echo $_REQUEST['fc']; ?>" />
<input type="hidden" id="di" value="<?php echo $_REQUEST['di']; ?>" /><input type="hidden" id="gi" value="<?php echo $_REQUEST['gi']; ?>" />
<input type="hidden" id="cc" value="<?php echo $_REQUEST['cc']; ?>" /><input type="hidden" id="ActThought" value="0" />
<input type="hidden" id="ii" value="<?php echo $_REQUEST['ii']; ?>" /><input type="hidden" id="EHq" value="<?php echo $_REQUEST['EHq']; ?>" /> 
<input type="hidden" id="TotAValueM" value="" /><input type="hidden" id="TotBValueM" value="" /><input type="hidden" id="TotCValueM" value="" />
<input type="hidden" id="DealerId" value="" /><input type="hidden" id="Sno" value="" /><input type="hidden" id="myh" value="<?php echo $_REQUEST['myh']; ?>" />
<input type="hidden" id="myt" value="<?php echo $_REQUEST['myt']; ?>" /><input type="hidden" id="HqV" value="<?php echo $_REQUEST['hq']; ?>" />
<input type="hidden" id="Reporting" value="<?php echo $resSpP['RepEmployeeID']; ?>" />
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
<td align="center"><?php if($_REQUEST['myh']==0){ ?><a href="#"><img src="images/Planner1.png" border="0" style="height:30px;width:130px;"/></a><?php } elseif($_REQUEST['myh']==1){ ?><a href="SalesPlan.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq"><img src="images/Planner.png" border="0" style="height:30px;width:130px;"/></a><?php } ?></td> */ ?>

<td align="center"><img src="images/Planner.png" border="0" style="height:40px;width:150px;"/></td>
<td>&nbsp;</td>

<?php /**************************************/ ?>


<?php echo "select HqId from hrm_sales_hq_temp where EmployeeID=".$EmployeeId." AND HqId!=".$resSpP['HqId']; $sHq2=mysql_query("select HqId from hrm_sales_hq_temp where EmployeeID=".$EmployeeId." AND HqId!=".$resSpP['HqId'], $con); $rowHq2=mysql_num_rows($sHq2); echo 'aa='.$rowHq2;?>
<td align="center" valign="bottom">
<?php if($rowHq2==0 AND $_REQUEST['myh']==0){ ?><a href="#" onClick="ChangeHq(<?php echo $resSpP['HqId'].', '.$_REQUEST['y'].',1'; ?>)"><img src="images/Myhq.png" border="0" style="height:30px;width:130px;"  /></a>
<?php } elseif($rowHq2==0 AND $_REQUEST['myh']==1){ if($_REQUEST['no']==1){?><img src="images/Myhq1.png" border="0" style="height:30px;width:130px;"/><?php } } ?>

<?php if($rowHq2==1 AND $_REQUEST['myh']==0){ $resHq2=mysql_fetch_assoc($sHq2); ?><a href="#" onClick="ChangeHq(<?php echo $resSpP['HqId'].', '.$_REQUEST['y'].',1'; ?>)"><img src="images/My1hq.png" border="0" style="height:30px;width:100px;"  /></a>&nbsp;<a href="#" onClick="ChangeHq(<?php echo $resHq2['HqId'].', '.$_REQUEST['y'].',2'; ?>)"><img src="images/My2hq.png" border="0" style="height:30px;width:100px;"  /></a>
<?php } elseif($rowHq2==1 AND $_REQUEST['myh']==1){ ?>
<?php if($_REQUEST['no']==1){?><img src="images/My1hq1.png" style="height:30px;width:100px;"/><?php }else{?><a href="#" onClick="ChangeHq(<?php echo $resSpP['HqId'].', '.$_REQUEST['y'].',1'; ?>)"><img src="images/My1hq.png" border="0" style="height:30px;width:100px;"  /></a><?php }?>
&nbsp;
<?php if($_REQUEST['no']==2){?><img src="images/My2hq1.png" style="height:30px;width:100px;"/><?php }else{?><a href="#" onClick="ChangeHq(<?php echo $resHq2['HqId'].', '.$_REQUEST['y'].',2'; ?>)"><img src="images/My2hq.png" border="0" style="height:30px;width:100px;"  /></a><?php }?>
<?php } ?>
</td>



<?php /**************************************/ ?>

<?php if($_REQUEST['act']>0){ ?>
<td>&nbsp;</td><td align="center" valign="bottom">
<a href="#" onClick="ChangeTeam(<?php echo $resSpP['HqId'].', '.$_REQUEST['y']; ?>)"><img src="images/Myteam.png" border="0" style="height:30px;width:130px;" /></a>
</td>
<td>&nbsp;</td><td align="center" valign="bottom">
<a href="#" onClick="ChangePerMi(<?php echo $resSpP['HqId'].', '.$_REQUEST['y']; ?>)"><img src="images/Permission.png" border="0" style="height:30px;width:130px;" /></a>
</td>
<?php } ?>

	<td>&nbsp;</td>

<?php if($_REQUEST['hq']>0){ 
if($resSpP['HqId']==$_REQUEST['hq'] OR $rowHq2==1){$EmpID=$EmployeeId;}
elseif($resSpP['HqId']!=$_REQUEST['hq']){  $sqlhqi = mysql_query("select hrm_employee_general.EmployeeID from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where DepartmentId=6 AND hrm_employee.EmpStatus='A' AND HqId=".$_REQUEST['hq']." AND RepEmployeeID=".$EmployeeId, $con); $reshqi=mysql_fetch_assoc($sqlhqi); $EmpID=$reshqi['EmployeeID'];}
echo '<input type="hidden" name="MainEmp" id="MainEmp" value="'.$EmpID.'" /><input type="hidden" id="TerId" value="'.$EmpID.'" />';
$sqlL=mysql_query("select R1,R2,R3,R4,R5 from hrm_sales_reporting_level where EmployeeID=".$EmpID, $con); $resL=mysql_fetch_assoc($sqlL);
echo '<input type="hidden" id="L1" value="'.$resL['R1'].'" />'; echo '<input type="hidden" id="L2" value="'.$resL['R2'].'" />'; 
echo '<input type="hidden" id="L3" value="'.$resL['R3'].'" />'; echo '<input type="hidden" id="L4" value="'.$resL['R4'].'" />'; 
echo '<input type="hidden" id="L5" value="'.$resL['R5'].'" />';
}   
echo '<input type="hidden" id="HqV" value="'.$_REQUEST['hq'].'" />';  

if($_REQUEST['hq']>0){
?>	
	<td style="font-family:Times New Roman;font-size:14px;font-weight:bold;color:#FFFFC6;" valign="bottom">Year :</b><select style="font-family:Times New Roman;font-size:14px;width:90px;background-color:#E4E0FC;height:23px;font-weight:bold;" id="YearV" onChange="ChangeYear(this.value)">
<?php $sqlye=mysql_query("select YearId,FromDate,ToDate from hrm_sales_year where YearId=".$_REQUEST['y'], $con); $resye=mysql_fetch_assoc($sqlye); 
      $FFromDate=date("Y",strtotime($resye['FromDate'])); $TToDate=date("Y",strtotime($resye['ToDate'])); ?>
		 <option value="<?php echo $resye['YearId']; ?>" selected><?php echo $FFromDate.'-'.$TToDate; ?></option>
<?php $sqly=mysql_query("select YearId from hrm_sales_year where Company1='A'", $con); $resy=mysql_fetch_assoc($sqly); 
if($_REQUEST['y']==$resy['YearId']){$sqlYear=mysql_query("select YearId,FromDate,ToDate from hrm_sales_year where YearId>".$_REQUEST['y']." order by FromDate ASC limit 1 ", $con);} elseif($_REQUEST['y']>$resy['YearId']){$sqlYear=mysql_query("select YearId,FromDate,ToDate from hrm_sales_year where YearId=".$resy['YearId']." order by FromDate ASC limit 1 ", $con);} while($resYear=mysql_fetch_assoc($sqlYear)){ 
 $FFrom2Date=date("Y",strtotime($resYear['FromDate'])); $TTo2Date=date("Y",strtotime($resYear['ToDate'])); ?>
         <option value="<?php echo $resYear['YearId']; ?>"><?php echo $FFrom2Date.'-'.$TTo2Date; ?></option><?php } ?></select>
	
<?php 
/* $sqly=mysql_query("select FromDate,ToDate from hrm_year where YearId=".$_REQUEST['y'], $con); $resy=mysql_fetch_assoc($sqly); 
      $fromdate=date("Y",strtotime($resy['FromDate'])); $todate=date("Y",strtotime($resy['ToDate'])); 
	  $NextYear=$_REQUEST['y']+1; $PrevYear=$_REQUEST['y']-1; 
	  $sqly2=mysql_query("select FromDate,ToDate from hrm_year where YearId=".$NextYear, $con); $resy2=mysql_fetch_assoc($sqly2);
	  $sqly3=mysql_query("select FromDate,ToDate from hrm_year where YearId=".$PrevYear, $con); $resy3=mysql_fetch_assoc($sqly3); ?>		
 <option value="<?php echo $_REQUEST['y']; ?>" selected><?php echo $fromdate.'-'.$todate; ?></option>
<?php if($PrevYear>=1){?><option value="<?php echo $PrevYear; ?>"><?php echo date("Y",strtotime($resy3['FromDate'])).'-'.date("Y",strtotime($resy3['ToDate']));?></option><?php } ?>
 <option value="<?php echo $NextYear; ?>"><?php echo date("Y",strtotime($resy2['FromDate'])).'-'.date("Y",strtotime($resy2['ToDate'])); ?></option>
 */
?>
 
	</td>
	<td>&nbsp;</td>
	<td id="" style="font-family:Times New Roman;font-size:14px;font-weight:bold;color:#FFFFC6;" valign="bottom">Quarter :</b><select style="font-family:Times New Roman;font-size:14px;width:80px;background-color:#E4E0FC;height:23px;font-weight:bold;" id="QtrV" onChange="ChangeQtr(this.value)">
	<option value="<?php echo $_REQUEST['q']; ?>" selected><?php echo 'Qtr-0'.$_REQUEST['q']; ?></option> 
<?php if($_REQUEST['q']==1){ ?>	<option value="2">Qtr-02</option><option value="3">Qtr-03</option><option value="4">Qtr-04</option>
<?php } elseif($_REQUEST['q']==2){ ?><option value="3">Qtr-03</option><option value="4">Qtr-04</option><option value="1">Qtr-01</option>
<?php } elseif($_REQUEST['q']==3){ ?><option value="4">Qtr-04</option><option value="1">Qtr-01</option><option value="2">Qtr-02</option>
<?php } elseif($_REQUEST['q']==4){ ?><option value="1">Qtr-01</option><option value="2">Qtr-02</option><option value="3">Qtr-03</option><?php } ?></select>  
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
   <td style="font-family:Times New Roman;font-size:14px;font-weight:bold;" valign="bottom">&nbsp;<a href="#" onClick="ClickAllProd(0,'ac')" style="color:#FFFF80">Over All-Crop</a></td>
<?php } ?>   
   </tr>
 </table>
	   </td>
	  </tr>
      <tr><td><span id="DealerHqSpan"></span></td></tr>
  </table>
 </td>
</tr>
<?php /***************************************** Main Page Open **************************************/ ?>
<?php if($_REQUEST['hq']>0){ //if($_REQUEST['act']==0){ ?>
<tr>
 <td>
<?php $sql=mysql_query("select HqName from hrm_headquater where HqId=".$_REQUEST['hq'], $con); $res=mysql_fetch_array($sql); 
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
      elseif($_REQUEST['ii']>0){ $sqlItem=mysql_query("select ItemName from hrm_sales_seedsitem where ItemId=".$_REQUEST['ii'], $con); 
	  $resItem=mysql_fetch_assoc($sqlItem); $ItemN=$resItem['ItemName']; }
	  
	  $sqlSubEmp=mysql_query("select * from hrm_sales_emp_action where EmployeeID=".$EmployeeId." AND YearId=".$_REQUEST['y']." AND StatusA=1", $con); 
	  $rowSubEmp=mysql_num_rows($sqlSubEmp);
	 // }    
?>	 
      <input type="hidden" name="rowSubEmp" id="rowSubEmp" value="<?php echo $rowSubEmp; ?>" />
	  <input type="hidden" name="VDealer" id="VDealer" value="<?php echo strtoupper($res['DealerName']); ?>" readonly/>
	  <input type="hidden" name="DealerId" id="DealerId" value="<?php echo $_POST['DealIdE']; ?>" />
	  <input type="hidden" name="DealerCity" id="DealerCity" value="<?php echo $res['DealerCity']; ?>" />
	  <input type="hidden" name="ni" id="ni" value="<?php echo $_POST['ni']; ?>" />
<table border="1" cellpadding="0" cellspacing="0" style="font-family:Times New Roman;font-size:14px;width:<?php if($_REQUEST['ii']=='All_1' OR $_REQUEST['ii']=='All_2' OR $_REQUEST['ac']==1){ echo '1600px';}else{echo '1500px';}?>;">	
  <tr>
  <td colspan="<?php if($_REQUEST['ii']=='All_1' OR $_REQUEST['ii']=='All_2' OR $_REQUEST['ac']==1){echo 3;}else{echo 2;}?>" align="center" style="height:25px;background-color:#005300;font-family:Times New Roman;font-size:16px;color:#FFFF20;font-weight:bold;" id="TD_<?php echo $counter; ?>"> <font color="#D7EBFF">Crop:</font>&nbsp;<?php echo $ItemN; ?>
  </td>
  <td colspan="20" style="height:25px;background-color:#005300;font-family:Times New Roman;font-size:16px;color:#FFFF20;font-weight:bold;" id="TD_<?php echo $counter; ?>">
   &nbsp;<font color="#D7EBFF">Head Quarter:&nbsp;</font><?php echo $res['HqName']; ?>&nbsp;&nbsp;&nbsp;
   &nbsp;<font color="#D7EBFF">Quarter:&nbsp;</font><?php echo '0'.$_REQUEST['q']; ?>&nbsp;&nbsp;&nbsp;
   &nbsp;<font color="#D7EBFF">Year:&nbsp;</font><?php echo $FFromDate.'-'.$TToDate; //$fromdate.'-'.$todate; ?>
   &nbsp;&nbsp;&nbsp;
   <?php if($_REQUEST['ac']==1){ ?>
   <?php $sqlSb=mysql_query("select * from hrm_sales_emp_action where EmployeeID=".$EmployeeId." AND YearId=".$_REQUEST['y']." AND StatusA=1", $con); $rowSb=mysql_num_rows($sqlSb); ?><input type="button" style="font-family:Times New Roman;width:100px;height:25px;font-weight:bold;" value="Final Submit" onClick="ClickFSL1(<?php echo $EmployeeId.', '.$_REQUEST['y']; ?>)" <?php if($rowSb>0){echo 'disabled';}else{echo '';}?>/><?php } ?>
   </td>
  </tr>
  <tr style="background-color:#D5F1D1;color:#000000;">
    <td colspan="<?php if($_REQUEST['ii']=='All_1' OR $_REQUEST['ii']=='All_2' OR $_REQUEST['ac']==1){echo 3;}else{echo 2;}?>" align="center" style="font-size:16px;color:#FFFFFF;background-color:#183E83;">
<b><?php echo "ALL DEALER"; ?></b> </td>

<?php if($_REQUEST['q']==1){ ?><td colspan="4" align="center"><b>APRIL</b></td><td colspan="4" align="center"><b>MAY</b></td><td colspan="4" align="center"><b>JUNE</b></td>
<?php } elseif($_REQUEST['q']==2){ ?><td colspan="4" align="center"><b>JULY</b></td><td colspan="4" align="center"><b>AUGUST</b></td><td colspan="4" align="center"><b>SEPTEMBER</b></td>
<?php } elseif($_REQUEST['q']==3){ ?><td colspan="4" align="center"><b>OCTOBER</b></td><td colspan="4" align="center"><b>NOVEMBER</b></td><td colspan="4" align="center"><b>DECEMBER</b></td><?php } elseif($_REQUEST['q']==4){ ?><td colspan="4" align="center"><b>JANUARY</b></td><td colspan="4" align="center"><b>FEBRUARY</b></td><td colspan="4" align="center"><b>MARCH</b></td><?php } ?>
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
	<td class="Trh60"><?php echo $y1T.'<br>'.$y1; ?></td><td class="Trh60"><?php echo $y2T.'<br>'.$y2; ?></td><td class="Trh60"><?php echo $y3T.'<br>'.$y3; ?></td>
	<td class="Trh60"><?php echo $y0T.'<br>'.$y0; ?></td>
	<td class="Trh60"><?php echo $y1T.'<br>'.$y1; ?></td><td class="Trh60"><?php echo $y2T.'<br>'.$y2; ?></td><td class="Trh60"><?php echo $y3T.'<br>'.$y3; ?></td>
	<td class="Trh60"><?php echo $y0T.'<br>'.$y0; ?></td>
	<td class="Trh60"><?php echo $y1T.'<br>'.$y1; ?></td><td class="Trh60"><?php echo $y2T.'<br>'.$y2; ?></td><td class="Trh60"><?php echo $y3T.'<br>'.$y3; ?></td>
	<td class="Trh60"><?php echo $y0T.'<br>'.$y0; ?></td>
	<td class="Trh60"><?php echo $y1T.'<br>'.$y1; ?></td><td class="Trh60"><?php echo $y2T.'<br>'.$y2; ?></td><td class="Trh60"><?php echo $y3T.'<br>'.$y3; ?></td>
	<td class="Trh60"><?php echo $y0T.'<br>'.$y0; ?></td>
	<td class="Trh60"><?php echo $y1T.'<br>'.$y1; ?></td><td class="Trh60"><?php echo $y2T.'<br>'.$y2; ?></td><td class="Trh60"><?php echo $y3T.'<br>'.$y3; ?></td>
   </tr>	
<?php if($_REQUEST['ii']!='All_1' AND $_REQUEST['ii']!='All_2' AND $_REQUEST['ii']!=0){$sql = mysql_query("select hrm_sales_seedsproduct.ItemId,ProductId,ProductName,ItemName,TypeName from hrm_sales_seedsproduct INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId INNER JOIN hrm_sales_seedtype ON hrm_sales_seedsproduct.TypeId=hrm_sales_seedtype.TypeId where hrm_sales_seedsitem.ItemId=".$_REQUEST['ii']." order by ItemName ASC, TypeName ASC, ProductName ASC", $con);}
      elseif($_REQUEST['ii']=='All_1'){$sql = mysql_query("select hrm_sales_seedsproduct.ItemId,ProductId,ProductName,ItemName,TypeName from hrm_sales_seedsproduct INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId INNER JOIN hrm_sales_seedtype ON hrm_sales_seedsproduct.TypeId=hrm_sales_seedtype.TypeId where hrm_sales_seedsitem.GroupId=1 order by ItemName ASC, TypeName ASC, ProductName ASC", $con);}
	  elseif($_REQUEST['ii']=='All_2'){$sql = mysql_query("select hrm_sales_seedsproduct.ItemId,ProductId,ProductName,ItemName,TypeName from hrm_sales_seedsproduct INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId INNER JOIN hrm_sales_seedtype ON hrm_sales_seedsproduct.TypeId=hrm_sales_seedtype.TypeId where hrm_sales_seedsitem.GroupId=2 order by ItemName ASC, TypeName ASC, ProductName ASC", $con);} 
	  elseif($_REQUEST['ii']==0 AND $_REQUEST['ac']==1){$sql = mysql_query("select hrm_sales_seedsproduct.ItemId,ProductId,ProductName,ItemName,TypeName from hrm_sales_seedsproduct INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId INNER JOIN hrm_sales_seedtype ON hrm_sales_seedsproduct.TypeId=hrm_sales_seedtype.TypeId where (hrm_sales_seedsitem.GroupId=1 OR hrm_sales_seedsitem.GroupId=2) order by ItemName ASC, TypeName ASC, ProductName ASC", $con);}
	  
 $Sn=1; while($res=mysql_fetch_array($sql)){ 
 $sqlP0=mysql_query("select SUM(M1_Ach) as sM1,SUM(M2_Ach) as sM2,SUM(M3_Ach) as sM3,SUM(M4_Ach) as sM4,SUM(M5_Ach) as sM5,SUM(M6_Ach) as sM6,SUM(M7_Ach) as sM7,SUM(M8_Ach) as sM8,SUM(M9_Ach) as sM9,SUM(M10_Ach) as sM10,SUM(M11_Ach) as sM11,SUM(M12_Ach) as sM12 from hrm_sales_sal_details INNER JOIN hrm_sales_dealer ON hrm_sales_sal_details.DealerId=hrm_sales_dealer.DealerId where hrm_sales_dealer.HqId=".$_REQUEST['hq']." AND ProductId=".$res['ProductId']." AND YearId=".$Before2YId, $con); 
 $sqlP1=mysql_query("select SUM(M1_Ach) as sM1,SUM(M2_Ach) as sM2,SUM(M3_Ach) as sM3,SUM(M4_Ach) as sM4,SUM(M5_Ach) as sM5,SUM(M6_Ach) as sM6,SUM(M7_Ach) as sM7,SUM(M8_Ach) as sM8,SUM(M9_Ach) as sM9,SUM(M10_Ach) as sM10,SUM(M11_Ach) as sM11,SUM(M12_Ach) as sM12 from hrm_sales_sal_details INNER JOIN hrm_sales_dealer ON hrm_sales_sal_details.DealerId=hrm_sales_dealer.DealerId where hrm_sales_dealer.HqId=".$_REQUEST['hq']." AND ProductId=".$res['ProductId']." AND YearId=".$BeforeYId, $con); 
 $sqlP2=mysql_query("select SUM(M1) as sM1,SUM(M2) as sM2,SUM(M3) as sM3,SUM(M4) as sM4,SUM(M5) as sM5,SUM(M6) as sM6,SUM(M7) as sM7,SUM(M8) as sM8,SUM(M9) as sM9,SUM(M10) as sM10,SUM(M11) as sM11,SUM(M12) as sM12 from hrm_sales_sal_details INNER JOIN hrm_sales_dealer ON hrm_sales_sal_details.DealerId=hrm_sales_dealer.DealerId where hrm_sales_dealer.HqId=".$_REQUEST['hq']." AND ProductId=".$res['ProductId']." AND YearId=".$_REQUEST['y'], $con); 
 $sqlP3=mysql_query("select SUM(M1) as sM1,SUM(M2) as sM2,SUM(M3) as sM3,SUM(M4) as sM4,SUM(M5) as sM5,SUM(M6) as sM6,SUM(M7) as sM7,SUM(M8) as sM8,SUM(M9) as sM9,SUM(M10) as sM10,SUM(M11) as sM11,SUM(M12) as sM12 from hrm_sales_sal_details INNER JOIN hrm_sales_dealer ON hrm_sales_sal_details.DealerId=hrm_sales_dealer.DealerId where hrm_sales_dealer.HqId=".$_REQUEST['hq']." AND ProductId=".$res['ProductId']." AND YearId=".$AfterYId, $con); 
 $resP0=mysql_fetch_assoc($sqlP0); $resP1=mysql_fetch_assoc($sqlP1); $resP2=mysql_fetch_assoc($sqlP2); $resP3=mysql_fetch_assoc($sqlP3);
?>	  
   <tr bgcolor="#EEEEEE" style="height:22px;">
<?php if($_REQUEST['ii']=='All_1' OR $_REQUEST['ii']=='All_2' OR $_REQUEST['ac']==1){ ?>	  
     <td bgcolor="#FFFFFF">&nbsp;<?php echo $res['ItemName']; ?></td>
<?php } ?>		 
	 <td bgcolor="#FFFFFF">&nbsp;<?php echo $res['ProductName']; ?><input type="hidden" id="P_<?php echo $Sn; ?>" value="<?php echo $res['ProductId']; ?>" /></td>
	 <td bgcolor="#FFFFFF" align="center">&nbsp;<?php echo substr_replace($res['TypeName'], '', 2); ?></td>
 <?php if($_REQUEST['q']==1){ ?>
<td id="<?php echo 'TM1_D'.$Sn;?>"><input class="Input" id="M1_D<?php echo $Sn; ?>" value="<?php if($resP0['sM1']!='' AND $resP0['sM1']!=0){echo $resP0['sM1'];}?>" readonly/></td>
<td id="<?php echo 'TM1_A'.$Sn;?>"><input class="Input" id="M1_A<?php echo $Sn; ?>" value="<?php if($resP1['sM1']!='' AND $resP1['sM1']!=0){echo $resP1['sM1'];}?>" readonly/></td>
<td id="<?php echo 'TM1_B'.$Sn; ?>"><input class="Input" id="M1_B<?php echo $Sn; ?>" value="<?php if($resP2['sM1']!='' AND $resP2['sM1']!=0){echo $resP2['sM1'];}?>" readonly/></td>
<td id="<?php echo 'TM1_C'.$Sn; ?>"><input class="Input" id="M1_C<?php echo $Sn; ?>" value="<?php if($resP3['sM1']!='' AND $resP3['sM1']!=0){echo $resP3['sM1'];}?>" readonly/></td>
<td id="<?php echo 'TM2_D'.$Sn; ?>"><input class="Input" id="M2_D<?php echo $Sn; ?>" value="<?php if($resP0['sM2']!='' AND $resP0['sM2']!=0){echo $resP0['sM2'];}?>" readonly/></td>
<td id="<?php echo 'TM2_A'.$Sn; ?>"><input class="Input" id="M2_A<?php echo $Sn; ?>" value="<?php if($resP1['sM2']!='' AND $resP1['sM2']!=0){echo $resP1['sM2'];}?>" readonly/></td>
<td id="<?php echo 'TM2_B'.$Sn; ?>"><input class="Input" id="M2_B<?php echo $Sn; ?>" value="<?php if($resP2['sM2']!='' AND $resP2['sM2']!=0){echo $resP2['sM2'];}?>" readonly/></td>
<td id="<?php echo 'TM2_C'.$Sn; ?>"><input class="Input" id="M2_C<?php echo $Sn; ?>" value="<?php if($resP3['sM2']!='' AND $resP3['sM2']!=0){echo $resP3['sM2'];}?>" readonly/></td>
<td id="<?php echo 'TM3_D'.$Sn; ?>"><input class="Input" id="M3_D<?php echo $Sn; ?>" value="<?php if($resP0['sM3']!='' AND $resP0['sM3']!=0){echo $resP0['sM3'];}?>" readonly/></td>
<td id="<?php echo 'TM3_A'.$Sn; ?>"><input class="Input" id="M3_A<?php echo $Sn; ?>" value="<?php if($resP1['sM3']!='' AND $resP1['sM3']!=0){echo $resP1['sM3'];}?>" readonly/></td>
<td id="<?php echo 'TM3_B'.$Sn; ?>"><input class="Input" id="M3_B<?php echo $Sn; ?>" value="<?php if($resP2['sM3']!='' AND $resP2['sM3']!=0){echo $resP2['sM3'];}?>" readonly/></td>
<td id="<?php echo 'TM3_C'.$Sn; ?>"><input class="Input" id="M3_C<?php echo $Sn; ?>" value="<?php if($resP3['sM3']!='' AND $resP3['sM3']!=0){echo $resP3['sM3'];}?>" readonly/></td>
<?php } elseif($_REQUEST['q']==2){ ?>
<td id="<?php echo 'TM4_D'.$Sn; ?>"><input class="Input" id="M4_D<?php echo $Sn; ?>" value="<?php if($resP0['sM4']!='' AND $resP0['sM4']!=0){echo $resP0['sM4'];}?>" readonly/></td>
<td id="<?php echo 'TM4_A'.$Sn; ?>"><input class="Input" id="M4_A<?php echo $Sn; ?>" value="<?php if($resP1['sM4']!='' AND $resP1['sM4']!=0){echo $resP1['sM4'];}?>" readonly/></td>
<td id="<?php echo 'TM4_B'.$Sn; ?>"><input class="Input" id="M4_B<?php echo $Sn; ?>" value="<?php if($resP2['sM4']!='' AND $resP2['sM4']!=0){echo $resP2['sM4'];}?>" readonly/></td>
<td id="<?php echo 'TM4_C'.$Sn; ?>"><input class="Input" id="M4_C<?php echo $Sn; ?>" value="<?php if($resP3['sM4']!='' AND $resP3['sM4']!=0){echo $resP3['sM4'];}?>" readonly/></td>
<td id="<?php echo 'TM5_D'.$Sn; ?>"><input class="Input" id="M5_D<?php echo $Sn; ?>" value="<?php if($resP0['sM5']!='' AND $resP0['sM5']!=0){echo $resP0['sM5'];}?>" readonly/></td>
<td id="<?php echo 'TM5_A'.$Sn; ?>"><input class="Input" id="M5_A<?php echo $Sn; ?>" value="<?php if($resP1['sM5']!='' AND $resP1['sM5']!=0){echo $resP1['sM5'];}?>" readonly/></td>
<td id="<?php echo 'TM5_B'.$Sn; ?>"><input class="Input" id="M5_B<?php echo $Sn; ?>" value="<?php if($resP2['sM5']!='' AND $resP2['sM5']!=0){echo $resP2['sM5'];}?>" readonly/></td>
<td id="<?php echo 'TM5_C'.$Sn; ?>"><input class="Input" id="M5_C<?php echo $Sn; ?>" value="<?php if($resP3['sM5']!='' AND $resP3['sM5']!=0){echo $resP3['sM5'];}?>" readonly/></td>
<td id="<?php echo 'TM6_D'.$Sn; ?>"><input class="Input" id="M6_D<?php echo $Sn; ?>" value="<?php if($resP0['sM6']!='' AND $resP0['sM6']!=0){echo $resP0['sM6'];}?>" readonly/></td>
<td id="<?php echo 'TM6_A'.$Sn; ?>"><input class="Input" id="M6_A<?php echo $Sn; ?>" value="<?php if($resP1['sM6']!='' AND $resP1['sM6']!=0){echo $resP1['sM6'];}?>" readonly/></td>
<td id="<?php echo 'TM6_B'.$Sn; ?>"><input class="Input" id="M6_B<?php echo $Sn; ?>" value="<?php if($resP2['sM6']!='' AND $resP2['sM6']!=0){echo $resP2['sM6'];}?>" readonly/></td>
<td id="<?php echo 'TM6_C'.$Sn; ?>"><input class="Input" id="M6_C<?php echo $Sn; ?>" value="<?php if($resP3['sM6']!='' AND $resP3['sM6']!=0){echo $resP3['sM6'];}?>" readonly/></td>
<?php } elseif($_REQUEST['q']==3){ ?>
<td id="<?php echo 'TM7_D'.$Sn; ?>"><input class="Input" id="M7_D<?php echo $Sn; ?>" value="<?php if($resP0['sM7']!='' AND $resP0['sM7']!=0){echo $resP0['sM7'];}?>" readonly/></td>
<td id="<?php echo 'TM7_A'.$Sn; ?>"><input class="Input" id="M7_A<?php echo $Sn; ?>" value="<?php if($resP1['sM7']!='' AND $resP1['sM7']!=0){echo $resP1['sM7'];}?>" readonly/></td>
<td id="<?php echo 'TM7_B'.$Sn; ?>"><input class="Input" id="M7_B<?php echo $Sn; ?>" value="<?php if($resP2['sM7']!='' AND $resP2['sM7']!=0){echo $resP2['sM7'];}?>" readonly/></td>
<td id="<?php echo 'TM7_C'.$Sn; ?>"><input class="Input" id="M7_C<?php echo $Sn; ?>" value="<?php if($resP3['sM7']!='' AND $resP3['sM7']!=0){echo $resP3['sM7'];}?>" readonly/></td>
<td id="<?php echo 'TM8_D'.$Sn; ?>"><input class="Input" id="M8_D<?php echo $Sn; ?>" value="<?php if($resP0['sM8']!='' AND $resP0['sM8']!=0){echo $resP0['sM8'];}?>" readonly/></td>
<td id="<?php echo 'TM8_A'.$Sn; ?>"><input class="Input" id="M8_A<?php echo $Sn; ?>" value="<?php if($resP1['sM8']!='' AND $resP1['sM8']!=0){echo $resP1['sM8'];}?>" readonly/></td>
<td id="<?php echo 'TM8_B'.$Sn; ?>"><input class="Input" id="M8_B<?php echo $Sn; ?>" value="<?php if($resP2['sM8']!='' AND $resP2['sM8']!=0){echo $resP2['sM8'];}?>" readonly/></td>
<td id="<?php echo 'TM8_C'.$Sn; ?>"><input class="Input" id="M8_C<?php echo $Sn; ?>" value="<?php if($resP3['sM8']!='' AND $resP3['sM8']!=0){echo $resP3['sM8'];}?>" readonly/></td>
<td id="<?php echo 'TM9_D'.$Sn; ?>"><input class="Input" id="M9_D<?php echo $Sn; ?>" value="<?php if($resP0['sM9']!='' AND $resP0['sM9']!=0){echo $resP0['sM9'];}?>" readonly/></td>
<td id="<?php echo 'TM9_A'.$Sn; ?>"><input class="Input" id="M9_A<?php echo $Sn; ?>" value="<?php if($resP1['sM9']!='' AND $resP1['sM9']!=0){echo $resP1['sM9'];}?>" readonly/></td>
<td id="<?php echo 'TM9_B'.$Sn; ?>"><input class="Input" id="M9_B<?php echo $Sn; ?>" value="<?php if($resP2['sM9']!='' AND $resP2['sM9']!=0){echo $resP2['sM9'];}?>" readonly/></td>
<td id="<?php echo 'TM9_C'.$Sn; ?>"><input class="Input" id="M9_C<?php echo $Sn; ?>" value="<?php if($resP3['sM9']!='' AND $resP3['sM9']!=0){echo $resP3['sM9'];}?>" readonly/></td>
<?php } elseif($_REQUEST['q']==4){ ?>
<td id="<?php echo 'TM10_D'.$Sn; ?>"><input class="Input" id="M10_D<?php echo $Sn; ?>" value="<?php if($resP0['sM10']!='' AND $resP0['sM10']!=0){echo $resP0['sM10'];}?>" readonly/></td>
<td id="<?php echo 'TM10_A'.$Sn; ?>"><input class="Input" id="M10_A<?php echo $Sn; ?>" value="<?php if($resP1['sM10']!='' AND $resP1['sM10']!=0){echo $resP1['sM10'];}?>" readonly/></td>
<td id="<?php echo 'TM10_B'.$Sn; ?>"><input class="Input" id="M10_B<?php echo $Sn; ?>" value="<?php if($resP2['sM10']!='' AND $resP2['sM10']!=0){echo $resP2['sM10'];}?>" readonly/></td>
<td id="<?php echo 'TM10_C'.$Sn; ?>"><input class="Input" id="M10_C<?php echo $Sn; ?>" value="<?php if($resP3['sM10']!='' AND $resP3['sM10']!=0){echo $resP3['sM10'];}?>" readonly/></td>
<td id="<?php echo 'TM11_D'.$Sn; ?>"><input class="Input" id="M11_D<?php echo $Sn; ?>" value="<?php if($resP0['sM11']!='' AND $resP0['sM11']!=0){echo $resP0['sM11'];}?>" readonly/></td>
<td id="<?php echo 'TM11_A'.$Sn; ?>"><input class="Input" id="M11_A<?php echo $Sn; ?>" value="<?php if($resP1['sM11']!='' AND $resP1['sM11']!=0){echo $resP1['sM11'];}?>" readonly/></td>
<td id="<?php echo 'TM11_B'.$Sn; ?>"><input class="Input" id="M11_B<?php echo $Sn; ?>" value="<?php if($resP2['sM11']!='' AND $resP2['sM11']!=0){echo $resP2['sM11'];}?>" readonly/></td>
<td id="<?php echo 'TM11_C'.$Sn; ?>"><input class="Input" id="M11_C<?php echo $Sn; ?>" value="<?php if($resP3['sM11']!='' AND $resP3['sM11']!=0){echo $resP3['sM11'];}?>" readonly/></td>
<td id="<?php echo 'TM12_D'.$Sn; ?>"><input class="Input" id="M12_D<?php echo $Sn; ?>" value="<?php if($resP0['sM12']!='' AND $resP0['sM12']!=0){echo $resP0['sM12'];}?>" readonly/></td>
<td id="<?php echo 'TM12_A'.$Sn; ?>"><input class="Input" id="M12_A<?php echo $Sn; ?>" value="<?php if($resP1['sM12']!='' AND $resP1['sM12']!=0){echo $resP1['sM12'];}?>" readonly/></td>
<td id="<?php echo 'TM12_B'.$Sn; ?>"><input class="Input" id="M12_B<?php echo $Sn; ?>" value="<?php if($resP2['sM12']!='' AND $resP2['sM12']!=0){echo $resP2['sM12'];}?>" readonly/></td>
<td id="<?php echo 'TM12_C'.$Sn; ?>"><input class="Input" id="M12_C<?php echo $Sn; ?>" value="<?php if($resP3['sM12']!='' AND $resP3['sM12']!=0){echo $resP3['sM12'];}?>" readonly/></td>
<?php } ?>
<?php if($_REQUEST['q']==1){ $TotP0=$resP0['sM1']+$resP0['sM2']+$resP0['sM3']; $TotP1=$resP1['sM1']+$resP1['sM2']+$resP1['sM3']; $TotP2=$resP2['sM1']+$resP2['sM2']+$resP2['sM3']; $TotP3=$resP3['sM1']+$resP3['sM2']+$resP3['sM3'];
}elseif($_REQUEST['q']==2){ $TotP0=$resP0['sM4']+$resP0['sM5']+$resP0['sM6']; $TotP1=$resP1['sM4']+$resP1['sM5']+$resP1['sM6']; $TotP2=$resP2['sM4']+$resP2['sM5']+$resP2['sM6']; $TotP3=$resP3['sM4']+$resP3['sM5']+$resP3['sM6'];
}elseif($_REQUEST['q']==3){ $TotP0=$resP0['sM7']+$resP0['sM8']+$resP0['sM9']; $TotP1=$resP1['sM7']+$resP1['sM8']+$resP1['sM9']; $TotP2=$resP2['sM7']+$resP2['sM8']+$resP2['sM9']; $TotP3=$resP3['sM7']+$resP3['sM8']+$resP3['sM9'];
}elseif($_REQUEST['q']==4){ $TotP0=$resP0['sM10']+$resP0['sM11']+$resP0['sM12']; $TotP1=$resP1['sM10']+$resP1['sM11']+$resP1['sM12']; $TotP2=$resP2['sM10']+$resP2['sM11']+$resP2['sM12']; $TotP3=$resP3['sM10']+$resP3['sM11']+$resP3['sM12'];} ?>	
<td id="<?php echo 'TTotP0_'.$Sn; ?>"><input class="InputB" id="TotP0_<?php echo $Sn; ?>" value="<?php if($TotP0!=0 AND $TotP0!=''){echo $TotP0;}else{echo '';} ?>" readonly/></td> 
<td id="<?php echo 'TTotP1_'.$Sn; ?>"><input class="InputB" id="TotP1_<?php echo $Sn; ?>" value="<?php if($TotP1!=0 AND $TotP1!=''){echo $TotP1;}else{echo '';} ?>" readonly/></td>
<td id="<?php echo 'TTotP2_'.$Sn; ?>"><input class="InputB" id="TotP2_<?php echo $Sn; ?>" value="<?php if($TotP2!=0 AND $TotP2!=''){echo $TotP2;}else{echo '';} ?>" readonly/></td>
<td id="<?php echo 'TTotP3_'.$Sn; ?>"><input class="InputB" id="TotP3_<?php echo $Sn; ?>" value="<?php if($TotP3!=0 AND $TotP3!=''){echo $TotP3;}else{echo '';} ?>" readonly/></td>
<?php
$SsqlP0=mysql_query("select * from hrm_sales_sal_details_hq where HqId=".$_REQUEST['hq']." AND ProductId=".$res['ProductId']." AND YearId=".$Before2YId, $con); 
$SsqlP1=mysql_query("select * from hrm_sales_sal_details_hq where HqId=".$_REQUEST['hq']." AND ProductId=".$res['ProductId']." AND YearId=".$BeforeYId, $con); 
$SsqlP2=mysql_query("select * from hrm_sales_sal_details_hq where HqId=".$_REQUEST['hq']." AND ProductId=".$res['ProductId']." AND YearId=".$_REQUEST['y'], $con); 
$SsqlP3=mysql_query("select * from hrm_sales_sal_details_hq where HqId=".$_REQUEST['hq']." AND ProductId=".$res['ProductId']." AND YearId=".$AfterYId, $con); 
$SresP0=mysql_fetch_assoc($SsqlP0); $SresP1=mysql_fetch_assoc($SsqlP1); $SresP2=mysql_fetch_assoc($SsqlP2); $SresP3=mysql_fetch_assoc($SsqlP3);  //AND HqId=".$_REQUEST['hq']."

if($_REQUEST['q']==1){$STotP0=$SresP0['Q1']; $STotP1=$SresP1['Q1']; $STotP2=$SresP2['Q1']; $STotP3=$SresP3['Q1']; }
elseif($_REQUEST['q']==2){$STotP0=$SresP0['Q2']; $STotP1=$SresP1['Q2']; $STotP2=$SresP2['Q2']; $STotP3=$SresP3['Q2']; }
elseif($_REQUEST['q']==3){$STotP0=$SresP0['Q3']; $STotP1=$SresP1['Q3']; $STotP2=$SresP2['Q3']; $STotP3=$SresP3['Q3']; }
elseif($_REQUEST['q']==4){$STotP0=$SresP0['Q4']; $STotP1=$SresP1['Q4']; $STotP2=$SresP2['Q4']; $STotP3=$SresP3['Q4']; } ?>
    <td style="width:70px;font-weight:bold;background-color:#D7FFAE;" align="right"><?php if($STotP0!=0 AND $STotP0!=''){echo $STotP0;}else{echo '';} ?>&nbsp;
	<input type="hidden" id="STotP0_<?php echo $Sn; ?>" value="<?php if($STotP0!=0 AND $STotP0!=''){echo $STotP0;}else{echo '';} ?>" /></td>
    <td style="width:70px;font-weight:bold;background-color:#D7FFAE;" align="right"><?php if($STotP1!=0 AND $STotP1!=''){echo $STotP1;}else{echo '';} ?>&nbsp;
	<input type="hidden" id="STotP1_<?php echo $Sn; ?>" value="<?php if($STotP1!=0 AND $STotP1!=''){echo $STotP1;}else{echo '';} ?>" /></td>
	<td style="width:70px;font-weight:bold;background-color:#D7FFAE;" align="right"><?php if($STotP2!=0 AND $STotP2!=''){echo $STotP2;}else{echo '';} ?>&nbsp;
	<input type="hidden" id="STotP2_<?php echo $Sn; ?>" value="<?php if($STotP2!=0 AND $STotP2!=''){echo $STotP2;}else{echo '';} ?>" /></td>
	<td style="width:70px;font-weight:bold;background-color:#D7FFAE;" align="right"><?php if($STotP3!=0 AND $STotP3!=''){echo $STotP3;}else{echo '';} ?>&nbsp;
	<input type="hidden" id="STotP3_<?php echo $Sn; ?>" value="<?php if($STotP3!=0 AND $STotP3!=''){echo $STotP3;}else{echo '';} ?>" /></td>	 
	</tr>	
<?php $Sn++; } $ActSn=$Sn-1; echo '<input type="hidden" id="ActualSn" value="'.$ActSn.'" />'; ?>    
<?php if($_REQUEST['ii']!='All_1' AND $_REQUEST['ii']!='All_2' AND $_REQUEST['ac']!=1){ 
$sqlP0t=mysql_query("select SUM(M1_Ach) as tsM1,SUM(M2_Ach) as tsM2,SUM(M3_Ach) as tsM3,SUM(M4_Ach) as tsM4,SUM(M5_Ach) as tsM5,SUM(M6_Ach) as tsM6,SUM(M7_Ach) as tsM7,SUM(M8_Ach) as tsM8,SUM(M9_Ach) as tsM9,SUM(M10_Ach) as tsM10,SUM(M11_Ach) as tsM11,SUM(M12_Ach) as tsM12 from hrm_sales_sal_details INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details.ProductId=hrm_sales_seedsproduct.ProductId INNER JOIN hrm_sales_dealer ON hrm_sales_sal_details.DealerId=hrm_sales_dealer.DealerId where hrm_sales_dealer.HqId=".$_REQUEST['hq']." AND hrm_sales_seedsproduct.ItemId=".$_REQUEST['ii']." AND hrm_sales_sal_details.YearId=".$Before2YId, $con); 
$sqlP1t=mysql_query("select SUM(M1_Ach) as tsM1,SUM(M2_Ach) as tsM2,SUM(M3_Ach) as tsM3,SUM(M4_Ach) as tsM4,SUM(M5_Ach) as tsM5,SUM(M6_Ach) as tsM6,SUM(M7_Ach) as tsM7,SUM(M8_Ach) as tsM8,SUM(M9_Ach) as tsM9,SUM(M10_Ach) as tsM10,SUM(M11_Ach) as tsM11,SUM(M12_Ach) as tsM12 from hrm_sales_sal_details INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details.ProductId=hrm_sales_seedsproduct.ProductId INNER JOIN hrm_sales_dealer ON hrm_sales_sal_details.DealerId=hrm_sales_dealer.DealerId where hrm_sales_dealer.HqId=".$_REQUEST['hq']." AND hrm_sales_seedsproduct.ItemId=".$_REQUEST['ii']." AND hrm_sales_sal_details.YearId=".$BeforeYId, $con); 
$sqlP2t=mysql_query("select SUM(M1) as tsM1,SUM(M2) as tsM2,SUM(M3) as tsM3,SUM(M4) as tsM4,SUM(M5) as tsM5,SUM(M6) as tsM6,SUM(M7) as tsM7,SUM(M8) as tsM8,SUM(M9) as tsM9,SUM(M10) as tsM10,SUM(M11) as tsM11,SUM(M12) as tsM12 from hrm_sales_sal_details INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details.ProductId=hrm_sales_seedsproduct.ProductId INNER JOIN hrm_sales_dealer ON hrm_sales_sal_details.DealerId=hrm_sales_dealer.DealerId where hrm_sales_dealer.HqId=".$_REQUEST['hq']." AND hrm_sales_seedsproduct.ItemId=".$_REQUEST['ii']." AND hrm_sales_sal_details.YearId=".$_REQUEST['y'], $con);
$sqlP3t=mysql_query("select SUM(M1) as tsM1,SUM(M2) as tsM2,SUM(M3) as tsM3,SUM(M4) as tsM4,SUM(M5) as tsM5,SUM(M6) as tsM6,SUM(M7) as tsM7,SUM(M8) as tsM8,SUM(M9) as tsM9,SUM(M10) as tsM10,SUM(M11) as tsM11,SUM(M12) as tsM12 from hrm_sales_sal_details INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details.ProductId=hrm_sales_seedsproduct.ProductId INNER JOIN hrm_sales_dealer ON hrm_sales_sal_details.DealerId=hrm_sales_dealer.DealerId where hrm_sales_dealer.HqId=".$_REQUEST['hq']." AND hrm_sales_seedsproduct.ItemId=".$_REQUEST['ii']." AND hrm_sales_sal_details.YearId=".$AfterYId, $con); 
$resP0t=mysql_fetch_assoc($sqlP0t); $resP1t=mysql_fetch_assoc($sqlP1t); $resP2t=mysql_fetch_assoc($sqlP2t); $resP3t=mysql_fetch_assoc($sqlP3t);
?>
   <tr style="font-size:14px;color:#000000;background-color:#FFFFA6;height:24px;">
	 <td colspan="2" align="right" style="font-size:16px;"><b>TOTAL:&nbsp;</b></td>
	 <?php if($_REQUEST['q']==1){ ?>
	 <td><input class="TInput" id="TotP1_TD" value="<?php if($resP0t['tsM1']>0){echo $resP0t['tsM1'];} ?>" readonly/></td>
	 <td><input class="TInput" id="TotP1_TA" value="<?php if($resP1t['tsM1']>0){echo $resP1t['tsM1'];} ?>" readonly/></td>		
	 <td><input class="TInput" id="TotP1_TB" value="<?php if($resP2t['tsM1']>0){echo $resP2t['tsM1'];} ?>" readonly/></td>
	 <td><input class="TInput" id="TotP1_TC" value="<?php if($resP3t['tsM1']>0){echo $resP3t['tsM1'];} ?>" readonly/></td>
	 <td><input class="TInput" id="TotP2_TD" value="<?php if($resP0t['tsM2']>0){echo $resP0t['tsM2'];} ?>" readonly/></td>
	 <td><input class="TInput" id="TotP2_TA" value="<?php if($resP1t['tsM2']>0){echo $resP1t['tsM2'];} ?>" readonly/></td>
	 <td><input class="TInput" id="TotP2_TB" value="<?php if($resP2t['tsM2']>0){echo $resP2t['tsM2'];} ?>" readonly/></td>
	 <td><input class="TInput" id="TotP2_TC" value="<?php if($resP3t['tsM2']>0){echo $resP3t['tsM2'];} ?>" readonly/></td>
	 <td><input class="TInput" id="TotP3_TD" value="<?php if($resP0t['tsM3']>0){echo $resP0t['tsM3'];} ?>" readonly/></td>
	 <td><input class="TInput" id="TotP3_TA" value="<?php if($resP1t['tsM3']>0){echo $resP1t['tsM3'];} ?>" readonly/></td>
	 <td><input class="TInput" id="TotP3_TB" value="<?php if($resP2t['tsM3']>0){echo $resP2t['tsM3'];} ?>" readonly/></td>
	 <td><input class="TInput" id="TotP3_TC" value="<?php if($resP3t['tsM3']>0){echo $resP3t['tsM3'];} ?>" readonly/></td>	 
	 <?php } elseif($_REQUEST['q']==2){ ?>
	 <td><input class="TInput" id="TotP4_TD" value="<?php if($resP0t['tsM4']>0){echo $resP0t['tsM4'];} ?>" readonly/></td>
	 <td><input class="TInput" id="TotP4_TA" value="<?php if($resP1t['tsM4']>0){echo $resP1t['tsM4'];} ?>" readonly/></td>		
	 <td><input class="TInput" id="TotP4_TB" value="<?php if($resP2t['tsM4']>0){echo $resP2t['tsM4'];} ?>" readonly/></td>
	 <td><input class="TInput" id="TotP4_TC" value="<?php if($resP3t['tsM4']>0){echo $resP3t['tsM4'];} ?>" readonly/></td>
	 <td><input class="TInput" id="TotP5_TD" value="<?php if($resP0t['tsM5']>0){echo $resP0t['tsM5'];} ?>" readonly/></td>
	 <td><input class="TInput" id="TotP5_TA" value="<?php if($resP1t['tsM5']>0){echo $resP1t['tsM5'];} ?>" readonly/></td>
	 <td><input class="TInput" id="TotP5_TB" value="<?php if($resP2t['tsM5']>0){echo $resP2t['tsM5'];} ?>" readonly/></td>
	 <td><input class="TInput" id="TotP5_TC" value="<?php if($resP3t['tsM5']>0){echo $resP3t['tsM5'];} ?>" readonly/></td>
	 <td><input class="TInput" id="TotP6_TD" value="<?php if($resP0t['tsM6']>0){echo $resP0t['tsM6'];} ?>" readonly/></td>
	 <td><input class="TInput" id="TotP6_TA" value="<?php if($resP1t['tsM6']>0){echo $resP1t['tsM6'];} ?>" readonly/></td>
	 <td><input class="TInput" id="TotP6_TB" value="<?php if($resP2t['tsM6']>0){echo $resP2t['tsM6'];} ?>" readonly/></td>
	 <td><input class="TInput" id="TotP6_TC" value="<?php if($resP3t['tsM6']>0){echo $resP3t['tsM6'];} ?>" readonly/></td>	
	 <?php } elseif($_REQUEST['q']==3){ ?>
	 <td><input class="TInput" id="TotP7_TD" value="<?php if($resP0t['tsM7']>0){echo $resP0t['tsM7'];} ?>" readonly/></td>	
	 <td><input class="TInput" id="TotP7_TA" value="<?php if($resP1t['tsM7']>0){echo $resP1t['tsM7'];} ?>" readonly/></td>		
	 <td><input class="TInput" id="TotP7_TB" value="<?php if($resP2t['tsM7']>0){echo $resP2t['tsM7'];} ?>" readonly/></td>
	 <td><input class="TInput" id="TotP7_TC" value="<?php if($resP3t['tsM7']>0){echo $resP3t['tsM7'];} ?>" readonly/></td>
	 <td><input class="TInput" id="TotP8_TD" value="<?php if($resP0t['tsM8']>0){echo $resP0t['tsM8'];} ?>" readonly/></td>
	 <td><input class="TInput" id="TotP8_TA" value="<?php if($resP1t['tsM8']>0){echo $resP1t['tsM8'];} ?>" readonly/></td>
	 <td><input class="TInput" id="TotP8_TB" value="<?php if($resP2t['tsM8']>0){echo $resP2t['tsM8'];} ?>" readonly/></td>
	 <td><input class="TInput" id="TotP8_TC" value="<?php if($resP3t['tsM8']>0){echo $resP3t['tsM8'];} ?>" readonly/></td>
	 <td><input class="TInput" id="TotP9_TD" value="<?php if($resP0t['tsM9']>0){echo $resP0t['tsM9'];} ?>" readonly/></td>
	 <td><input class="TInput" id="TotP9_TA" value="<?php if($resP1t['tsM9']>0){echo $resP1t['tsM9'];} ?>" readonly/></td>
	 <td><input class="TInput" id="TotP9_TB" value="<?php if($resP2t['tsM9']>0){echo $resP2t['tsM9'];} ?>" readonly/></td>
	 <td><input class="TInput" id="TotP9_TC" value="<?php if($resP3t['tsM9']>0){echo $resP3t['tsM9'];} ?>" readonly/></td>	
	 <?php } elseif($_REQUEST['q']==4){ ?>
	 <td><input class="TInput" id="TotP10_TD" value="<?php if($resP0t['tsM10']>0){echo $resP0t['tsM10'];} ?>" readonly/></td>
	 <td><input class="TInput" id="TotP10_TA" value="<?php if($resP1t['tsM10']>0){echo $resP1t['tsM10'];} ?>" readonly/></td>		
	 <td><input class="TInput" id="TotP10_TB" value="<?php if($resP2t['tsM10']>0){echo $resP2t['tsM10'];} ?>" readonly/></td>
	 <td><input class="TInput" id="TotP10_TC" value="<?php if($resP3t['tsM10']>0){echo $resP3t['tsM10'];} ?>" readonly/></td>
	 <td><input class="TInput" id="TotP11_TD" value="<?php if($resP0t['tsM11']>0){echo $resP0t['tsM11'];} ?>" readonly/></td>
	 <td><input class="TInput" id="TotP11_TA" value="<?php if($resP1t['tsM11']>0){echo $resP1t['tsM11'];} ?>" readonly/></td>
	 <td><input class="TInput" id="TotP11_TB" value="<?php if($resP2t['tsM11']>0){echo $resP2t['tsM11'];} ?>" readonly/></td>
	 <td><input class="TInput" id="TotP11_TC" value="<?php if($resP3t['tsM11']>0){echo $resP3t['tsM11'];} ?>" readonly/></td>
	 <td><input class="TInput" id="TotP12_TD" value="<?php if($resP0t['tsM12']>0){echo $resP0t['tsM12'];} ?>" readonly/></td>
	 <td><input class="TInput" id="TotP12_TA" value="<?php if($resP1t['tsM12']>0){echo $resP1t['tsM12'];} ?>" readonly/></td>
	 <td><input class="TInput" id="TotP12_TB" value="<?php if($resP2t['tsM12']>0){echo $resP2t['tsM12'];} ?>" readonly/></td>
	 <td><input class="TInput" id="TotP12_TC" value="<?php if($resP3t['tsM12']>0){echo $resP3t['tsM12'];} ?>" readonly/></td>	
	 <?php } ?>
<?php 
if($_REQUEST['q']==1){ $TotP0t=$resP0t['tsM1']+$resP0t['tsM2']+$resP0t['tsM3']; $TotP1t=$resP1t['tsM1']+$resP1t['tsM2']+$resP1t['tsM3']; $TotP2t=$resP2t['tsM1']+$resP2t['tsM2']+$resP2t['tsM3']; $TotP3t=$resP3t['tsM1']+$resP3t['tsM2']+$resP3t['tsM3'];}elseif($_REQUEST['q']==2){ $TotP0t=$resP0t['tsM4']+$resP0t['tsM5']+$resP0t['tsM6']; $TotP1t=$resP1t['tsM4']+$resP1t['tsM5']+$resP1t['tsM6']; $TotP2t=$resP2t['tsM4']+$resP2t['tsM5']+$resP2t['tsM6']; $TotP3t=$resP3t['tsM4']+$resP3t['tsM5']+$resP3t['tsM6'];}elseif($_REQUEST['q']==3){ $TotP0t=$resP0t['tsM7']+$resP0t['tsM8']+$resP0t['tsM9']; $TotP1t=$resP1t['tsM7']+$resP1t['tsM8']+$resP1t['tsM9']; $TotP2t=$resP2t['tsM7']+$resP2t['tsM8']+$resP2t['tsM9']; $TotP3t=$resP3t['tsM7']+$resP3t['tsM8']+$resP3t['tsM9'];}elseif($_REQUEST['q']==4){ $TotP0t=$resP0t['tsM10']+$resP0t['tsM11']+$resP0t['tsM12']; $TotP1t=$resP1t['tsM10']+$resP1t['tsM11']+$resP1t['tsM12']; $TotP2t=$resP2t['tsM10']+$resP2t['tsM11']+$resP2t['tsM12']; $TotP3t=$resP3t['tsM10']+$resP3t['tsM11']+$resP3t['tsM12'];} ?>
      <td><input class="TInput" id="TotM_DeT" value="<?php if($TotP0t!=0 AND $TotP0t!=''){echo $TotP0t;}else{echo '';} ?>" readonly/></td>
      <td><input class="TInput" id="TotM_AeT" value="<?php if($TotP1t!=0 AND $TotP1t!=''){echo $TotP1t;}else{echo '';} ?>" readonly/></td>
	  <td><input class="TInput" id="TotM_BeT" value="<?php if($TotP2t!=0 AND $TotP2t!=''){echo $TotP2t;}else{echo '';} ?>" readonly/></td>
	  <td><input class="TInput" id="TotM_CeT" value="<?php if($TotP3t!=0 AND $TotP3t!=''){echo $TotP3t;}else{echo '';} ?>" readonly/></td>
<?php
$TSsqlP0=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_hq INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details_hq.ProductId=hrm_sales_seedsproduct.ProductId where hrm_sales_sal_details_hq.HqId=".$_REQUEST['hq']." AND hrm_sales_seedsproduct.ItemId=".$_REQUEST['ii']." AND hrm_sales_sal_details_hq.YearId=".$Before2YId, $con); $TSsqlP1=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_hq INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details_hq.ProductId=hrm_sales_seedsproduct.ProductId where hrm_sales_sal_details_hq.HqId=".$_REQUEST['hq']." AND hrm_sales_seedsproduct.ItemId=".$_REQUEST['ii']." AND hrm_sales_sal_details_hq.YearId=".$BeforeYId, $con); $TSsqlP2=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_hq INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details_hq.ProductId=hrm_sales_seedsproduct.ProductId where hrm_sales_sal_details_hq.HqId=".$_REQUEST['hq']." AND hrm_sales_seedsproduct.ItemId=".$_REQUEST['ii']." AND hrm_sales_sal_details_hq.YearId=".$_REQUEST['y'], $con); 
$TSsqlP3=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_hq INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details_hq.ProductId=hrm_sales_seedsproduct.ProductId where hrm_sales_sal_details_hq.HqId=".$_REQUEST['hq']." AND hrm_sales_seedsproduct.ItemId=".$_REQUEST['ii']." AND hrm_sales_sal_details_hq.YearId=".$AfterYId, $con); 
$TSresP0=mysql_fetch_assoc($TSsqlP0); $TSresP1=mysql_fetch_assoc($TSsqlP1); $TSresP2=mysql_fetch_assoc($TSsqlP2); $TSresP3=mysql_fetch_assoc($TSsqlP3);  
//AND HqId=".$_REQUEST['hq']."
if($_REQUEST['q']==1){ $TSTotP0=$TSresP0['Qa']; $TSTotP1=$TSresP1['Qa']; $TSTotP2=$TSresP2['Qa']; $TSTotP3=$TSresP3['Qa']; }elseif($_REQUEST['q']==2){ $TSTotP0=$TSresP0['Qb']; $TSTotP1=$TSresP1['Qb']; $TSTotP2=$TSresP2['Qb']; $TSTotP3=$TSresP3['Qb']; }elseif($_REQUEST['q']==3){ $TSTotP0=$TSresP0['Qc']; $TSTotP1=$TSresP1['Qc']; $TSTotP2=$TSresP2['Qc']; $TSTotP3=$TSresP3['Qc']; }elseif($_REQUEST['q']==4){ $TSTotP0=$TSresP0['Qd']; $TSTotP1=$TSresP1['Qd']; $TSTotP2=$TSresP2['Qd']; $TSTotP3=$TSresP3['Qd'];} ?>
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
<?php if($_REQUEST['ac']!=1){ ?>
<tr>
 <td>
 <table border="0" cellpadding="0" cellspacing="4" cellpadding="0">
<?php $sqlDeal = mysql_query("select * from hrm_sales_dealer where HqId=".$_REQUEST['hq']." order by DealerId ASC", $con); $resDealRow=mysql_num_rows($sqlDeal);  
      $DealRow=$resDealRow+1; echo '<input type="hidden" id="DealRows" value="'.$DealRow.'" />'; $counter=1; ?>   
<?php while($resDeal=mysql_fetch_array($sqlDeal)){ /*********** Open Dealer **********/ ?>		
 <tr style="background-color:#CBD7F3;">
 <table border="0"> 
  <tr>
   <td>
<table border="1" cellpadding="0" cellspacing="0" style="font-family:Times New Roman;font-size:14px;width:<?php if($_REQUEST['ii']=='All_1' OR $_REQUEST['ii']=='All_2'){ echo '1500px';}else{echo '1400px';}?>;">	
  <tr style="background-color:#D5F1D1;color:#000000;">
    <td colspan="<?php if($_REQUEST['ii']=='All_1' OR $_REQUEST['ii']=='All_2'){echo 4;}else{echo 3;}?>" style="font-size:16px;color:#FFFF00;background-color:#183E83;">&nbsp;<b><?php echo ucfirst(strtolower($resDeal['DealerName'])).'-<font color="#D7EBFF">'.$resDeal['DealerCity'].'</font>'; ?></b></td>
<?php if($_REQUEST['q']==1){ ?><td colspan="4" align="center"><b>APRIL</b></td><td colspan="4" align="center"><b>MAY</b></td><td colspan="4" align="center"><b>JUNE</b></td>
<?php } elseif($_REQUEST['q']==2){ ?><td colspan="4" align="center"><b>JULY</b></td><td colspan="4" align="center"><b>AUGUST</b></td><td colspan="4" align="center"><b>SEPTEMBER</b></td>
<?php } elseif($_REQUEST['q']==3){ ?><td colspan="4" align="center"><b>OCTOBER</b></td><td colspan="4" align="center"><b>NOVEMBER</b></td><td colspan="4" align="center"><b>DECEMBER</b></td><?php } elseif($_REQUEST['q']==4){ ?><td colspan="4" align="center"><b>JANUARY</b></td><td colspan="4" align="center"><b>FEBRUARY</b></td><td colspan="4" align="center"><b>MARCH</b></td><?php } ?>
<td colspan="4" align="center"><b>TOTAL</b></td>
  </tr>	
   <tr style="background-color:#D5F1D1;color:#000000;">
<?php if($_REQUEST['ii']=='All_1' OR $_REQUEST['ii']=='All_2'){ ?>   
    <td align="center" style="width:150px;"><b>CROP</b></td>
<?php } ?>	
	<td align="center" style="width:250px;"><b>VARIETY</b></td>
	<td align="center" style="width:50px;"><b>&nbsp;TYPE&nbsp;</b></td>
	<td align="center" style="width:50px;"><b>&nbsp;Edit&nbsp;</b></td>
<?php	/* <td align="center" style="width:50px;"><b>&nbsp;Submit&nbsp;</b></td> */ ?>
    <td class="Trh60"><?php echo $y0T.'<br>'.$y0; ?>
	<td class="Trh60"><?php echo $y1T.'<br>'.$y1; ?></td><td class="Trh60"><?php echo $y2T.'<br>'.$y2; ?></td><td class="Trh60"><?php echo $y3T.'<br>'.$y3; ?></td>
	<td class="Trh60"><?php echo $y0T.'<br>'.$y0; ?>
	<td class="Trh60"><?php echo $y1T.'<br>'.$y1; ?></td><td class="Trh60"><?php echo $y2T.'<br>'.$y2; ?></td><td class="Trh60"><?php echo $y3T.'<br>'.$y3; ?></td>
	<td class="Trh60"><?php echo $y0T.'<br>'.$y0; ?>
	<td class="Trh60"><?php echo $y1T.'<br>'.$y1; ?></td><td class="Trh60"><?php echo $y2T.'<br>'.$y2; ?></td><td class="Trh60"><?php echo $y3T.'<br>'.$y3; ?></td>
	<td class="Trh60"><?php echo $y0T.'<br>'.$y0; ?>
	<td class="Trh60"><?php echo $y1T.'<br>'.$y1; ?></td><td class="Trh60"><?php echo $y2T.'<br>'.$y2; ?></td><td class="Trh60"><?php echo $y3T.'<br>'.$y3; ?></td>
  </tr>	
<?php if($_REQUEST['ii']!='All_1' AND $_REQUEST['ii']!='All_2'){$sql = mysql_query("select hrm_sales_seedsproduct.ItemId,ProductId,ProductName,ItemName,TypeName from hrm_sales_seedsproduct INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId INNER JOIN hrm_sales_seedtype ON hrm_sales_seedsproduct.TypeId=hrm_sales_seedtype.TypeId where hrm_sales_seedsitem.ItemId=".$_REQUEST['ii']." order by ItemName ASC, TypeName ASC, ProductName ASC", $con);}
      elseif($_REQUEST['ii']=='All_1'){$sql = mysql_query("select hrm_sales_seedsproduct.ItemId,ProductId,ProductName,ItemName,TypeName from hrm_sales_seedsproduct INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId INNER JOIN hrm_sales_seedtype ON hrm_sales_seedsproduct.TypeId=hrm_sales_seedtype.TypeId where hrm_sales_seedsitem.GroupId=1 order by ItemName ASC, TypeName ASC, ProductName ASC", $con);}
	  elseif($_REQUEST['ii']=='All_2'){$sql = mysql_query("select hrm_sales_seedsproduct.ItemId,ProductId,ProductName,ItemName,TypeName from hrm_sales_seedsproduct INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId INNER JOIN hrm_sales_seedtype ON hrm_sales_seedsproduct.TypeId=hrm_sales_seedtype.TypeId where hrm_sales_seedsitem.GroupId=2 order by ItemName ASC, TypeName ASC, ProductName ASC", $con);}
	  
 $Sn=1; while($res=mysql_fetch_array($sql)){
$sqlP0d=mysql_query("select * from hrm_sales_sal_details where YearId=".$Before2YId." AND ProductId=".$res['ProductId']." AND DealerId=".$resDeal['DealerId'], $con); 
$sqlP1d=mysql_query("select * from hrm_sales_sal_details where YearId=".$BeforeYId." AND ProductId=".$res['ProductId']." AND DealerId=".$resDeal['DealerId'], $con);
$sqlP2d=mysql_query("select * from hrm_sales_sal_details where YearId=".$_REQUEST['y']." AND ProductId=".$res['ProductId']." AND DealerId=".$resDeal['DealerId'], $con); 
$sqlP3d=mysql_query("select * from hrm_sales_sal_details where YearId=".$AfterYId." AND ProductId=".$res['ProductId']." AND DealerId=".$resDeal['DealerId'], $con);  
$resP0d=mysql_fetch_assoc($sqlP0d); $resP1d=mysql_fetch_assoc($sqlP1d); $resP2d=mysql_fetch_assoc($sqlP2d); $resP3d=mysql_fetch_assoc($sqlP3d); $DeId=$resDeal['DealerId'];
?>	  
   <tr bgcolor="#EEEEEE" style="height:22px;">
<?php if($_REQUEST['ii']=='All_1' OR $_REQUEST['ii']=='All_2'){ ?>	  
     <td bgcolor="#FFFFFF">&nbsp;<?php echo $res['ItemName']; ?></td>
<?php } ?>		 
	 <td bgcolor="#FFFFFF">&nbsp;<?php echo $res['ProductName']; ?><input type="hidden" id="<?php echo $DeId; ?>P_<?php echo $Sn; ?>" value="<?php echo $res['ProductId']; ?>" /></td>
	 <td bgcolor="#FFFFFF" align="center">&nbsp;<?php echo substr_replace($res['TypeName'], '', 2); ?></td>
	 <td align="center" valign="middle" bgcolor="#FFFFFF">
	   <?php if($resCPerMi['EditPerMi']=='Y'){ ?>
	   <?php if($rowSubEmp==0){ //if($resP2['St_EmployeeID']==0 OR $resP2['St_EmployeeID']==1 OR $resP2['St_R1']==3){ ?>
<img src="images/edit.png" border="0" alt="Edit" id="<?php echo $resDeal['DealerId']; ?>EditBtn_<?php echo $Sn; ?>" onClick="editD(<?php echo $Sn.', '.$_REQUEST['q'].', '.$resDeal['DealerId']; ?>)" style="display:block;">
<img src="images/Floppy-Small-icon.png" border="0" alt="Save" id="<?php echo $resDeal['DealerId']; ?>SaveBtn_<?php echo $Sn; ?>" onClick="saveD(<?php echo $Sn.', '.$_REQUEST['y'].', '.$resDeal['DealerId'].', '.$_REQUEST['q']; ?>)" style="display:none;">
	   <?php } ?>
	   <?php } else {echo '&nbsp;';} ?>
	</td>
<?php if($_REQUEST['q']==1){ ?>	
<td id="<?php echo $DeId.'TM1_De'.$Sn; ?>"><input class="Input" id="<?php echo $DeId; ?>M1_De<?php echo $Sn; ?>" value="<?php if($resP0d['M1_Ach']!='' AND $resP0d['M1_Ach']!=0){echo $resP0d['M1_Ach'];} ?>" readonly/></td>						 							 					 	 
<td id="<?php echo $DeId.'TM1_Ae'.$Sn; ?>"><input class="Input" id="<?php echo $DeId; ?>M1_Ae<?php echo $Sn; ?>" value="<?php if($resP1d['M1_Ach']!='' AND $resP1d['M1_Ach']!=0){echo $resP1d['M1_Ach'];} ?>" readonly/></td>
<td id="<?php echo $DeId.'TM1_Be'.$Sn; ?>"><input class="Input" id="<?php echo $DeId; ?>M1_Be<?php echo $Sn; ?>" value="<?php if($resP2d['M1']!='' AND $resP2d['M1']!=0){echo $resP2d['M1'];} ?>" readonly/></td>
<td id="<?php echo $DeId.'TM1_Ce'.$Sn; ?>"><input class="Input" id="<?php echo $DeId; ?>M1_Ce<?php echo $Sn; ?>" value="<?php if($resP3d['M1']!='' AND $resP3d['M1']!=0){echo $resP3d['M1'];} ?>" readonly/></td>
<td id="<?php echo $DeId.'TM2_De'.$Sn; ?>"><input class="Input" id="<?php echo $DeId; ?>M2_De<?php echo $Sn; ?>" value="<?php if($resP0d['M2_Ach']!='' AND $resP0d['M2_Ach']!=0){echo $resP0d['M2_Ach'];} ?>" readonly/></td>
<td id="<?php echo $DeId.'TM2_Ae'.$Sn; ?>"><input class="Input" id="<?php echo $DeId; ?>M2_Ae<?php echo $Sn; ?>" value="<?php if($resP1d['M2_Ach']!='' AND $resP1d['M2_Ach']!=0){echo $resP1d['M2_Ach'];} ?>" readonly/></td>
<td id="<?php echo $DeId.'TM2_Be'.$Sn; ?>"><input class="Input" id="<?php echo $DeId; ?>M2_Be<?php echo $Sn; ?>" value="<?php if($resP2d['M2']!='' AND $resP2d['M2']!=0){echo $resP2d['M2'];} ?>" readonly/></td>
<td id="<?php echo $DeId.'TM2_Ce'.$Sn; ?>"><input class="Input" id="<?php echo $DeId; ?>M2_Ce<?php echo $Sn; ?>" value="<?php if($resP3d['M2']!='' AND $resP3d['M2']!=0){echo $resP3d['M2'];} ?>" readonly/></td>
<td id="<?php echo $DeId.'TM3_De'.$Sn; ?>"><input class="Input" id="<?php echo $DeId; ?>M3_De<?php echo $Sn; ?>" value="<?php if($resP0d['M3_Ach']!='' AND $resP0d['M3_Ach']!=0){echo $resP0d['M3_Ach'];} ?>" readonly/></td>
<td id="<?php echo $DeId.'TM3_Ae'.$Sn; ?>"><input class="Input" id="<?php echo $DeId; ?>M3_Ae<?php echo $Sn; ?>" value="<?php if($resP1d['M3_Ach']!='' AND $resP1d['M3_Ach']!=0){echo $resP1d['M3_Ach'];} ?>" readonly/></td>
<td id="<?php echo $DeId.'TM3_Be'.$Sn; ?>"><input class="Input" id="<?php echo $DeId; ?>M3_Be<?php echo $Sn; ?>" value="<?php if($resP2d['M3']!='' AND $resP2d['M3']!=0){echo $resP2d['M3'];} ?>" readonly/></td>
<td id="<?php echo $DeId.'TM3_Ce'.$Sn; ?>"><input class="Input" id="<?php echo $DeId; ?>M3_Ce<?php echo $Sn; ?>" value="<?php if($resP3d['M3']!='' AND $resP3d['M3']!=0){echo $resP3d['M3'];} ?>" readonly/></td>
<?php } elseif($_REQUEST['q']==2){ ?>	 
<td id="<?php echo $DeId.'TM4_De'.$Sn; ?>"><input class="Input" id="<?php echo $DeId; ?>M4_De<?php echo $Sn; ?>" value="<?php if($resP0d['M4_Ach']!='' AND $resP0d['M4_Ach']!=0){echo $resP0d['M4_Ach'];} ?>" readonly/></td>
<td id="<?php echo $DeId.'TM4_Ae'.$Sn; ?>"><input class="Input" id="<?php echo $DeId; ?>M4_Ae<?php echo $Sn; ?>" value="<?php if($resP1d['M4_Ach']!='' AND $resP1d['M4_Ach']!=0){echo $resP1d['M4_Ach'];} ?>" readonly/></td>
<td id="<?php echo $DeId.'TM4_Be'.$Sn; ?>"><input class="Input" id="<?php echo $DeId; ?>M4_Be<?php echo $Sn; ?>" value="<?php if($resP2d['M4']!='' AND $resP2d['M4']!=0){echo $resP2d['M4'];} ?>" readonly/></td>
<td id="<?php echo $DeId.'TM4_Ce'.$Sn; ?>"><input class="Input" id="<?php echo $DeId; ?>M4_Ce<?php echo $Sn; ?>" value="<?php if($resP3d['M4']!='' AND $resP3d['M4']!=0){echo $resP3d['M4'];} ?>" readonly/></td>
<td id="<?php echo $DeId.'TM5_De'.$Sn; ?>"><input class="Input" id="<?php echo $DeId; ?>M5_De<?php echo $Sn; ?>" value="<?php if($resP0d['M5_Ach']!='' AND $resP0d['M5_Ach']!=0){echo $resP0d['M5_Ach'];} ?>" readonly/></td>
<td id="<?php echo $DeId.'TM5_Ae'.$Sn; ?>"><input class="Input" id="<?php echo $DeId; ?>M5_Ae<?php echo $Sn; ?>" value="<?php if($resP1d['M5_Ach']!='' AND $resP1d['M5_Ach']!=0){echo $resP1d['M5_Ach'];} ?>" readonly/></td>
<td id="<?php echo $DeId.'TM5_Be'.$Sn; ?>"><input class="Input" id="<?php echo $DeId; ?>M5_Be<?php echo $Sn; ?>" value="<?php if($resP2d['M5']!='' AND $resP2d['M5']!=0){echo $resP2d['M5'];} ?>" readonly/></td>
<td id="<?php echo $DeId.'TM5_Ce'.$Sn; ?>"><input class="Input" id="<?php echo $DeId; ?>M5_Ce<?php echo $Sn; ?>" value="<?php if($resP3d['M5']!='' AND $resP3d['M5']!=0){echo $resP3d['M5'];} ?>" readonly/></td>
<td id="<?php echo $DeId.'TM6_De'.$Sn; ?>"><input class="Input" id="<?php echo $DeId; ?>M6_De<?php echo $Sn; ?>" value="<?php if($resP0d['M6_Ach']!='' AND $resP0d['M6_Ach']!=0){echo $resP0d['M6_Ach'];} ?>" readonly/></td>
<td id="<?php echo $DeId.'TM6_Ae'.$Sn; ?>"><input class="Input" id="<?php echo $DeId; ?>M6_Ae<?php echo $Sn; ?>" value="<?php if($resP1d['M6_Ach']!='' AND $resP1d['M6_Ach']!=0){echo $resP1d['M6_Ach'];} ?>" readonly/></td>
<td id="<?php echo $DeId.'TM6_Be'.$Sn; ?>"><input class="Input" id="<?php echo $DeId; ?>M6_Be<?php echo $Sn; ?>" value="<?php if($resP2d['M6']!='' AND $resP2d['M6']!=0){echo $resP2d['M6'];} ?>" readonly/></td>
<td id="<?php echo $DeId.'TM6_Ce'.$Sn; ?>"><input class="Input" id="<?php echo $DeId; ?>M6_Ce<?php echo $Sn; ?>" value="<?php if($resP3d['M6']!='' AND $resP3d['M6']!=0){echo $resP3d['M6'];} ?>" readonly/></td>
<?php } elseif($_REQUEST['q']==3){ ?>	 
<td id="<?php echo $DeId.'TM7_De'.$Sn; ?>"><input class="Input" id="<?php echo $DeId; ?>M7_De<?php echo $Sn; ?>" value="<?php if($resP0d['M7_Ach']!='' AND $resP0d['M7_Ach']!=0){echo $resP0d['M7_Ach'];} ?>" readonly/></td>
<td id="<?php echo $DeId.'TM7_Ae'.$Sn; ?>"><input class="Input" id="<?php echo $DeId; ?>M7_Ae<?php echo $Sn; ?>" value="<?php if($resP1d['M7_Ach']!='' AND $resP1d['M7_Ach']!=0){echo $resP1d['M7_Ach'];} ?>" readonly/></td>
<td id="<?php echo $DeId.'TM7_Be'.$Sn; ?>"><input class="Input" id="<?php echo $DeId; ?>M7_Be<?php echo $Sn; ?>" value="<?php if($resP2d['M7']!='' AND $resP2d['M7']!=0){echo $resP2d['M7'];} ?>" readonly/></td>
<td id="<?php echo $DeId.'TM7_Ce'.$Sn; ?>"><input class="Input" id="<?php echo $DeId; ?>M7_Ce<?php echo $Sn; ?>" value="<?php if($resP3d['M7']!='' AND $resP3d['M7']!=0){echo $resP3d['M7'];} ?>" readonly/></td>
<td id="<?php echo $DeId.'TM8_De'.$Sn; ?>"><input class="Input" id="<?php echo $DeId; ?>M8_De<?php echo $Sn; ?>" value="<?php if($resP0d['M8_Ach']!='' AND $resP0d['M8_Ach']!=0){echo $resP0d['M8_Ach'];} ?>" readonly/></td>
<td id="<?php echo $DeId.'TM8_Ae'.$Sn; ?>"><input class="Input" id="<?php echo $DeId; ?>M8_Ae<?php echo $Sn; ?>" value="<?php if($resP1d['M8_Ach']!='' AND $resP1d['M8_Ach']!=0){echo $resP1d['M8_Ach'];} ?>" readonly/></td>
<td id="<?php echo $DeId.'TM8_Be'.$Sn; ?>"><input class="Input" id="<?php echo $DeId; ?>M8_Be<?php echo $Sn; ?>" value="<?php if($resP2d['M8']!='' AND $resP2d['M8']!=0){echo $resP2d['M8'];} ?>" readonly/></td>
<td id="<?php echo $DeId.'TM8_Ce'.$Sn; ?>"><input class="Input" id="<?php echo $DeId; ?>M8_Ce<?php echo $Sn; ?>" value="<?php if($resP3d['M8']!='' AND $resP3d['M8']!=0){echo $resP3d['M8'];} ?>" readonly/></td>
<td id="<?php echo $DeId.'TM9_De'.$Sn; ?>"><input class="Input" id="<?php echo $DeId; ?>M9_De<?php echo $Sn; ?>" value="<?php if($resP0d['M9_Ach']!='' AND $resP0d['M9_Ach']!=0){echo $resP0d['M9_Ach'];} ?>" readonly/></td>
<td id="<?php echo $DeId.'TM9_Ae'.$Sn; ?>"><input class="Input" id="<?php echo $DeId; ?>M9_Ae<?php echo $Sn; ?>" value="<?php if($resP1d['M9_Ach']!='' AND $resP1d['M9_Ach']!=0){echo $resP1d['M9_Ach'];} ?>" readonly/></td>
<td id="<?php echo $DeId.'TM9_Be'.$Sn; ?>"><input class="Input" id="<?php echo $DeId; ?>M9_Be<?php echo $Sn; ?>" value="<?php if($resP2d['M9']!='' AND $resP2d['M9']!=0){echo $resP2d['M9'];} ?>" readonly/></td>
<td id="<?php echo $DeId.'TM9_Ce'.$Sn; ?>"><input class="Input" id="<?php echo $DeId; ?>M9_Ce<?php echo $Sn; ?>" value="<?php if($resP3d['M9']!='' AND $resP3d['M9']!=0){echo $resP3d['M9'];} ?>" readonly/></td>
<?php } elseif($_REQUEST['q']==4){ ?>	
<td id="<?php echo $DeId.'TM10_De'.$Sn; ?>"><input class="Input" id="<?php echo $DeId; ?>M10_De<?php echo $Sn; ?>" value="<?php if($resP0d['M10_Ach']!='' AND $resP0d['M10_Ach']!=0){echo $resP0d['M10_Ach'];} ?>" readonly/></td>
<td id="<?php echo $DeId.'TM10_Ae'.$Sn; ?>"><input class="Input" id="<?php echo $DeId; ?>M10_Ae<?php echo $Sn; ?>" value="<?php if($resP1d['M10_Ach']!='' AND $resP1d['M10_Ach']!=0){echo $resP1d['M10_Ach'];} ?>" readonly/></td>
<td id="<?php echo $DeId.'TM10_Be'.$Sn; ?>"><input class="Input" id="<?php echo $DeId; ?>M10_Be<?php echo $Sn; ?>" value="<?php if($resP2d['M10']!='' AND $resP2d['M10']!=0){echo $resP2d['M10'];} ?>" readonly/></td>
<td id="<?php echo $DeId.'TM10_Ce'.$Sn; ?>"><input class="Input" id="<?php echo $DeId; ?>M10_Ce<?php echo $Sn; ?>" value="<?php if($resP3d['M10']!='' AND $resP3d['M10']!=0){echo $resP3d['M10'];} ?>" readonly/></td>
<td id="<?php echo $DeId.'TM11_De'.$Sn; ?>"><input class="Input" id="<?php echo $DeId; ?>M11_De<?php echo $Sn; ?>" value="<?php if($resP0d['M111_Ach']!='' AND $resP0d['M1_Ach']!=0){echo $resP0d['M11_Ach'];} ?>" readonly/></td>
<td id="<?php echo $DeId.'TM11_Ae'.$Sn; ?>"><input class="Input" id="<?php echo $DeId; ?>M11_Ae<?php echo $Sn; ?>" value="<?php if($resP1d['M111_Ach']!='' AND $resP1d['M1_Ach']!=0){echo $resP1d['M11_Ach'];} ?>" readonly/></td>
<td id="<?php echo $DeId.'TM11_Be'.$Sn; ?>"><input class="Input" id="<?php echo $DeId; ?>M11_Be<?php echo $Sn; ?>" value="<?php if($resP2d['M11']!='' AND $resP2d['M11']!=0){echo $resP2d['M11'];} ?>" readonly/></td>
<td id="<?php echo $DeId.'TM11_Ce'.$Sn; ?>"><input class="Input" id="<?php echo $DeId; ?>M11_Ce<?php echo $Sn; ?>" value="<?php if($resP3d['M11']!='' AND $resP3d['M11']!=0){echo $resP3d['M11'];} ?>" readonly/></td>
<td id="<?php echo $DeId.'TM12_De'.$Sn; ?>"><input class="Input" id="<?php echo $DeId; ?>M12_De<?php echo $Sn; ?>" value="<?php if($resP0d['M12_Ach']!='' AND $resP0d['M12_Ach']!=0){echo $resP0d['M12_Ach'];} ?>" readonly/></td>
<td id="<?php echo $DeId.'TM12_Ae'.$Sn; ?>"><input class="Input" id="<?php echo $DeId; ?>M12_Ae<?php echo $Sn; ?>" value="<?php if($resP1d['M12_Ach']!='' AND $resP1d['M12_Ach']!=0){echo $resP1d['M12_Ach'];} ?>" readonly/></td>
<td id="<?php echo $DeId.'TM12_Be'.$Sn; ?>"><input class="Input" id="<?php echo $DeId; ?>M12_Be<?php echo $Sn; ?>" value="<?php if($resP2d['M12']!='' AND $resP2d['M12']!=0){echo $resP2d['M12'];} ?>" readonly/></td>
<td id="<?php echo $DeId.'TM12_Ce'.$Sn; ?>"><input class="Input" id="<?php echo $DeId; ?>M12_Ce<?php echo $Sn; ?>" value="<?php if($resP3d['M12']!='' AND $resP3d['M12']!=0){echo $resP3d['M12'];} ?>" readonly/></td>
<?php } ?>	 
<?php 
if($_REQUEST['q']==1){$TotP0d=$resP0d['M1_Ach']+$resP0d['M2_Ach']+$resP0d['M3_Ach']; $TotP1d=$resP1d['M1_Ach']+$resP1d['M2_Ach']+$resP1d['M3_Ach']; $TotP2d=$resP2d['M1']+$resP2d['M2']+$resP2d['M3']; $TotP3d=$resP3d['M1']+$resP3d['M2']+$resP3d['M3'];}elseif($_REQUEST['q']==2){$TotP0d=$resP0d['M4_Ach']+$resP0d['M5_Ach']+$resP0d['M6_Ach']; $TotP1d=$resP1d['M4_Ach']+$resP1d['M5_Ach']+$resP1d['M6_Ach']; $TotP2d=$resP2d['M4']+$resP2d['M5']+$resP2d['M6']; $TotP3d=$resP3d['M4']+$resP3d['M5']+$resP3d['M6'];}elseif($_REQUEST['q']==3){$TotP0d=$resP0d['M7_Ach']+$resP0d['M8_Ach']+$resP0d['M9_Ach']; $TotP1d=$resP1d['M7_Ach']+$resP1d['M8_Ach']+$resP1d['M9_Ach']; $TotP2d=$resP2d['M7']+$resP2d['M8']+$resP2d['M9']; $TotP3d=$resP3d['M7']+$resP3d['M8']+$resP3d['M9'];}elseif($_REQUEST['q']==4){ $TotP0d=$resP0d['M10_Ach']+$resP0d['M11_Ach']+$resP0d['M12_Ach']; $TotP1d=$resP1d['M10_Ach']+$resP1d['M11_Ach']+$resP1d['M12_Ach']; $TotP2d=$resP2d['M10']+$resP2d['M11']+$resP2d['M12'];$TotP3d=$resP3d['M10']+$resP3d['M11']+$resP3d['M12'];} 
?>	 
<td id="<?php echo $DeId.'TTotP0d_'.$Sn; ?>"><input class="InputB" id="<?php echo $DeId; ?>TotP0d_<?php echo $Sn; ?>" value="<?php if($TotP0d!=0 AND $TotP0d!=''){echo $TotP0d;}else{echo '';} ?>" readonly/></td>
<td id="<?php echo $DeId.'TTotP1d_'.$Sn; ?>"><input class="InputB" id="<?php echo $DeId; ?>TotP1d_<?php echo $Sn; ?>" value="<?php if($TotP1d!=0 AND $TotP1d!=''){echo $TotP1d;}else{echo '';} ?>" readonly/></td>
<td id="<?php echo $DeId.'TTotP2d_'.$Sn; ?>"><input class="InputB" id="<?php echo $DeId; ?>TotP2d_<?php echo $Sn; ?>" value="<?php if($TotP2d!=0 AND $TotP2d!=''){echo $TotP2d;}else{echo '';} ?>" readonly/></td>
<td id="<?php echo $DeId.'TTotP3d_'.$Sn; ?>"><input class="InputB" id="<?php echo $DeId; ?>TotP3d_<?php echo $Sn; ?>" value="<?php if($TotP3d!=0 AND $TotP3d!=''){echo $TotP3d;}else{echo '';} ?>" readonly/></td>	
  </tr>	
<?php $Sn++; }  ?>     
<?php if($_REQUEST['ii']!='All_1' AND $_REQUEST['ii']!='All_2'){ 
$sqlP0td=mysql_query("select SUM(M1_Ach) as tsM1,SUM(M2_Ach) as tsM2,SUM(M3_Ach) as tsM3,SUM(M4_Ach) as tsM4,SUM(M5_Ach) as tsM5,SUM(M6_Ach) as tsM6,SUM(M7_Ach) as tsM7,SUM(M8_Ach) as tsM8,SUM(M9_Ach) as tsM9,SUM(M10_Ach) as tsM10,SUM(M11_Ach) as tsM11,SUM(M12_Ach) as tsM12 from hrm_sales_sal_details INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details.ProductId=hrm_sales_seedsproduct.ProductId where hrm_sales_sal_details.DealerId=".$resDeal['DealerId']." AND hrm_sales_seedsproduct.ItemId=".$_REQUEST['ii']." AND hrm_sales_sal_details.YearId=".$Before2YId, $con); 
$sqlP1td=mysql_query("select SUM(M1_Ach) as tsM1,SUM(M2_Ach) as tsM2,SUM(M3_Ach) as tsM3,SUM(M4_Ach) as tsM4,SUM(M5_Ach) as tsM5,SUM(M6_Ach) as tsM6,SUM(M7_Ach) as tsM7,SUM(M8_Ach) as tsM8,SUM(M9_Ach) as tsM9,SUM(M10_Ach) as tsM10,SUM(M11_Ach) as tsM11,SUM(M12_Ach) as tsM12 from hrm_sales_sal_details INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details.ProductId=hrm_sales_seedsproduct.ProductId where hrm_sales_sal_details.DealerId=".$resDeal['DealerId']." AND hrm_sales_seedsproduct.ItemId=".$_REQUEST['ii']." AND hrm_sales_sal_details.YearId=".$BeforeYId, $con); 
$sqlP2td=mysql_query("select SUM(M1) as tsM1,SUM(M2) as tsM2,SUM(M3) as tsM3,SUM(M4) as tsM4,SUM(M5) as tsM5,SUM(M6) as tsM6,SUM(M7) as tsM7,SUM(M8) as tsM8,SUM(M9) as tsM9,SUM(M10) as tsM10,SUM(M10) as tsM10,SUM(M11) as tsM11,SUM(M12) as tsM12 from hrm_sales_sal_details INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details.ProductId=hrm_sales_seedsproduct.ProductId where hrm_sales_sal_details.DealerId=".$resDeal['DealerId']." AND hrm_sales_seedsproduct.ItemId=".$_REQUEST['ii']." AND hrm_sales_sal_details.YearId=".$_REQUEST['y'], $con);
$sqlP3td=mysql_query("select SUM(M1) as tsM1,SUM(M2) as tsM2,SUM(M3) as tsM3,SUM(M4) as tsM4,SUM(M5) as tsM5,SUM(M6) as tsM6,SUM(M7) as tsM7,SUM(M8) as tsM8,SUM(M9) as tsM9,SUM(M10) as tsM10,SUM(M10) as tsM10,SUM(M11) as tsM11,SUM(M12) as tsM12 from hrm_sales_sal_details INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details.ProductId=hrm_sales_seedsproduct.ProductId where hrm_sales_sal_details.DealerId=".$resDeal['DealerId']." AND hrm_sales_seedsproduct.ItemId=".$_REQUEST['ii']." AND hrm_sales_sal_details.YearId=".$AfterYId, $con); 
$resP0td=mysql_fetch_assoc($sqlP0td); $resP1td=mysql_fetch_assoc($sqlP1td); $resP2td=mysql_fetch_assoc($sqlP2td); $resP3td=mysql_fetch_assoc($sqlP3td);
?>
   <tr style="font-size:14px;color:#000000;background-color:#FFFFA6;height:24px;">
	  <td colspan="3" align="right" style="font-size:16px;"><b>TOTAL:&nbsp;</b></td>
<?php if($_REQUEST['q']==1){ ?>	
     <td><input class="TInput" id="<?php echo $DeId; ?>M1_DeT" value="<?php if($resP0td['tsM1']>0){echo $resP0td['tsM1'];} ?>" readonly/></td>
     <td><input class="TInput" id="<?php echo $DeId; ?>M1_AeT" value="<?php if($resP1td['tsM1']>0){echo $resP1td['tsM1'];} ?>" readonly/></td>
	 <td><input class="TInput" id="<?php echo $DeId; ?>M1_BeT" value="<?php if($resP2td['tsM1']>0){echo $resP2td['tsM1'];} ?>" readonly/></td>
	 <td><input class="TInput" id="<?php echo $DeId; ?>M1_CeT" value="<?php if($resP3td['tsM1']>0){echo $resP3td['tsM1'];} ?>" readonly/></td>
	 <td><input class="TInput" id="<?php echo $DeId; ?>M2_DeT" value="<?php if($resP0td['tsM2']>0){echo $resP0td['tsM2'];} ?>" readonly/></td>
	 <td><input class="TInput" id="<?php echo $DeId; ?>M2_AeT" value="<?php if($resP1td['tsM2']>0){echo $resP1td['tsM2'];} ?>" readonly/></td>
	 <td><input class="TInput" id="<?php echo $DeId; ?>M2_BeT" value="<?php if($resP2td['tsM2']>0){echo $resP2td['tsM2'];} ?>" readonly/></td>
	 <td><input class="TInput" id="<?php echo $DeId; ?>M2_CeT" value="<?php if($resP3td['tsM2']>0){echo $resP3td['tsM2'];} ?>" readonly/></td>
	 <td><input class="TInput" id="<?php echo $DeId; ?>M3_DeT" value="<?php if($resP0td['tsM3']>0){echo $resP0td['tsM3'];} ?>" readonly/></td>
	 <td><input class="TInput" id="<?php echo $DeId; ?>M3_AeT" value="<?php if($resP1td['tsM3']>0){echo $resP1td['tsM3'];} ?>" readonly/></td>
	 <td><input class="TInput" id="<?php echo $DeId; ?>M3_BeT" value="<?php if($resP2td['tsM3']>0){echo $resP2td['tsM3'];} ?>" readonly/></td>
	 <td><input class="TInput" id="<?php echo $DeId; ?>M3_CeT" value="<?php if($resP3td['tsM3']>0){echo $resP3td['tsM3'];} ?>" readonly/></td>						 							
<?php } elseif($_REQUEST['q']==2){ ?>
     <td><input class="TInput" id="<?php echo $DeId; ?>M4_DeT" value="<?php if($resP0td['tsM4']>0){echo $resP0td['tsM4'];} ?>" readonly/></td>
     <td><input class="TInput" id="<?php echo $DeId; ?>M4_AeT" value="<?php if($resP1td['tsM4']>0){echo $resP1td['tsM4'];} ?>" readonly/></td>
	 <td><input class="TInput" id="<?php echo $DeId; ?>M4_BeT" value="<?php if($resP2td['tsM4']>0){echo $resP2td['tsM4'];} ?>" readonly/></td>
	 <td><input class="TInput" id="<?php echo $DeId; ?>M4_CeT" value="<?php if($resP3td['tsM4']>0){echo $resP3td['tsM4'];} ?>" readonly/></td>
	 <td><input class="TInput" id="<?php echo $DeId; ?>M5_DeT" value="<?php if($resP0td['tsM5']>0){echo $resP0td['tsM5'];} ?>" readonly/></td>
	 <td><input class="TInput" id="<?php echo $DeId; ?>M5_AeT" value="<?php if($resP1td['tsM5']>0){echo $resP1td['tsM5'];} ?>" readonly/></td>
	 <td><input class="TInput" id="<?php echo $DeId; ?>M5_BeT" value="<?php if($resP2td['tsM5']>0){echo $resP2td['tsM5'];} ?>" readonly/></td>
	 <td><input class="TInput" id="<?php echo $DeId; ?>M5_CeT" value="<?php if($resP3td['tsM5']>0){echo $resP3td['tsM5'];} ?>" readonly/></td>
	 <td><input class="TInput" id="<?php echo $DeId; ?>M6_DeT" value="<?php if($resP0td['tsM6']>0){echo $resP0td['tsM6'];} ?>" readonly/></td>
	 <td><input class="TInput" id="<?php echo $DeId; ?>M6_AeT" value="<?php if($resP1td['tsM6']>0){echo $resP1td['tsM6'];} ?>" readonly/></td>
	 <td><input class="TInput" id="<?php echo $DeId; ?>M6_BeT" value="<?php if($resP2td['tsM6']>0){echo $resP2td['tsM6'];} ?>" readonly/></td>
	 <td><input class="TInput" id="<?php echo $DeId; ?>M6_CeT" value="<?php if($resP3td['tsM6']>0){echo $resP3td['tsM6'];} ?>" readonly/></td>		
<?php } elseif($_REQUEST['q']==3){ ?>
     <td><input class="TInput" id="<?php echo $DeId; ?>M7_DeT" value="<?php if($resP0td['tsM7']>0){echo $resP0td['tsM7'];} ?>" readonly/></td>
     <td><input class="TInput" id="<?php echo $DeId; ?>M7_AeT" value="<?php if($resP1td['tsM7']>0){echo $resP1td['tsM7'];} ?>" readonly/></td>
	 <td><input class="TInput" id="<?php echo $DeId; ?>M7_BeT" value="<?php if($resP2td['tsM7']>0){echo $resP2td['tsM7'];} ?>" readonly/></td>
	 <td><input class="TInput" id="<?php echo $DeId; ?>M7_CeT" value="<?php if($resP3td['tsM7']>0){echo $resP3td['tsM7'];} ?>" readonly/></td>
	 <td><input class="TInput" id="<?php echo $DeId; ?>M8_DeT" value="<?php if($resP0td['tsM8']>0){echo $resP0td['tsM8'];} ?>" readonly/></td>
	 <td><input class="TInput" id="<?php echo $DeId; ?>M8_AeT" value="<?php if($resP1td['tsM8']>0){echo $resP1td['tsM8'];} ?>" readonly/></td>
	 <td><input class="TInput" id="<?php echo $DeId; ?>M8_BeT" value="<?php if($resP2td['tsM8']>0){echo $resP2td['tsM8'];} ?>" readonly/></td>
	 <td><input class="TInput" id="<?php echo $DeId; ?>M8_CeT" value="<?php if($resP3td['tsM8']>0){echo $resP3td['tsM8'];} ?>" readonly/></td>
	 <td><input class="TInput" id="<?php echo $DeId; ?>M9_DeT" value="<?php if($resP0td['tsM9']>0){echo $resP0td['tsM9'];} ?>" readonly/></td>
	 <td><input class="TInput" id="<?php echo $DeId; ?>M9_AeT" value="<?php if($resP1td['tsM9']>0){echo $resP1td['tsM9'];} ?>" readonly/></td>
	 <td><input class="TInput" id="<?php echo $DeId; ?>M9_BeT" value="<?php if($resP2td['tsM9']>0){echo $resP2td['tsM9'];} ?>" readonly/></td>
	 <td><input class="TInput" id="<?php echo $DeId; ?>M9_CeT" value="<?php if($resP3td['tsM9']>0){echo $resP3td['tsM9'];} ?>" readonly/></td>		
<?php } elseif($_REQUEST['q']==4){ ?>
     <td><input class="TInput" id="<?php echo $DeId; ?>M10_DeT" value="<?php if($resP0td['tsM10']>0){echo $resP0td['tsM10'];} ?>" readonly/></td>
     <td><input class="TInput" id="<?php echo $DeId; ?>M10_AeT" value="<?php if($resP1td['tsM10']>0){echo $resP1td['tsM10'];} ?>" readonly/></td>
	 <td><input class="TInput" id="<?php echo $DeId; ?>M10_BeT" value="<?php if($resP2td['tsM10']>0){echo $resP2td['tsM10'];} ?>" readonly/></td>
	 <td><input class="TInput" id="<?php echo $DeId; ?>M10_CeT" value="<?php if($resP3td['tsM10']>0){echo $resP3td['tsM10'];} ?>" readonly/></td>
	 <td><input class="TInput" id="<?php echo $DeId; ?>M11_DeT" value="<?php if($resP0td['tsM11']>0){echo $resP0td['tsM11'];} ?>" readonly/></td>
	 <td><input class="TInput" id="<?php echo $DeId; ?>M11_AeT" value="<?php if($resP1td['tsM11']>0){echo $resP1td['tsM11'];} ?>" readonly/></td>
	 <td><input class="TInput" id="<?php echo $DeId; ?>M11_BeT" value="<?php if($resP2td['tsM11']>0){echo $resP2td['tsM11'];} ?>" readonly/></td>
	 <td><input class="TInput" id="<?php echo $DeId; ?>M11_CeT" value="<?php if($resP3td['tsM11']>0){echo $resP3td['tsM11'];} ?>" readonly/></td>
	 <td><input class="TInput" id="<?php echo $DeId; ?>M12_DeT" value="<?php if($resP0td['tsM12']>0){echo $resP0td['tsM12'];} ?>" readonly/></td>
	 <td><input class="TInput" id="<?php echo $DeId; ?>M12_AeT" value="<?php if($resP1td['tsM12']>0){echo $resP1td['tsM12'];} ?>" readonly/></td>
	 <td><input class="TInput" id="<?php echo $DeId; ?>M12_BeT" value="<?php if($resP2td['tsM12']>0){echo $resP2td['tsM12'];} ?>" readonly/></td>
	 <td><input class="TInput" id="<?php echo $DeId; ?>M12_CeT" value="<?php if($resP3td['tsM12']>0){echo $resP3td['tsM12'];} ?>" readonly/></td>		
<?php } ?>	
<?php 
if($_REQUEST['q']==1){ $TotP0td=$resP0td['tsM1']+$resP0td['tsM2']+$resP0td['tsM3']; $TotP1td=$resP1td['tsM1']+$resP1td['tsM2']+$resP1td['tsM3']; $TotP2td=$resP2td['tsM1']+$resP2td['tsM2']+$resP2td['tsM3']; $TotP3td=$resP3td['tsM1']+$resP3td['tsM2']+$resP3td['tsM3'];}elseif($_REQUEST['q']==2){ $TotP0td=$resP0td['tsM4']+$resP0td['tsM5']+$resP0td['tsM6']; $TotP1td=$resP1td['tsM4']+$resP1td['tsM5']+$resP1td['tsM6']; $TotP2td=$resP2td['tsM4']+$resP2td['tsM5']+$resP2td['tsM6']; $TotP3td=$resP3td['tsM4']+$resP3td['tsM5']+$resP3td['tsM6'];}elseif($_REQUEST['q']==3){ $TotP0td=$resP0td['tsM7']+$resP0td['tsM8']+$resP0td['tsM9']; $TotP1td=$resP1td['tsM7']+$resP1td['tsM8']+$resP1td['tsM9']; $TotP2td=$resP2td['tsM7']+$resP2td['tsM8']+$resP2td['tsM9']; $TotP3td=$resP3td['tsM7']+$resP3td['tsM8']+$resP3td['tsM9'];}elseif($_REQUEST['q']==4){ $TotP0td=$resP0td['tsM10']+$resP0td['tsM11']+$resP0td['tsM12']; $TotP1td=$resP1td['tsM10']+$resP1td['tsM11']+$resP1td['tsM12']; $TotP2td=$resP2td['tsM10']+$resP2td['tsM11']+$resP2td['tsM12']; $TotP3td=$resP3td['tsM10']+$resP3td['tsM11']+$resP3td['tsM12'];} ?>
      <td><input class="TInput" id="<?php echo $DeId; ?>TotM_DeT" value="<?php if($TotP0td!=0 AND $TotP0td!=''){echo $TotP0td;}else{echo '';} ?>" readonly/></td>
      <td><input class="TInput" id="<?php echo $DeId; ?>TotM_AeT" value="<?php if($TotP1td!=0 AND $TotP1td!=''){echo $TotP1td;}else{echo '';} ?>" readonly/></td>
	  <td><input class="TInput" id="<?php echo $DeId; ?>TotM_BeT" value="<?php if($TotP2td!=0 AND $TotP2td!=''){echo $TotP2td;}else{echo '';} ?>" readonly/></td>
	  <td><input class="TInput" id="<?php echo $DeId; ?>TotM_CeT" value="<?php if($TotP3td!=0 AND $TotP3td!=''){echo $TotP3td;}else{echo '';} ?>" readonly/></td>
  </tr>	
<?php } ?>  
</table>	       
   </td>  
  </tr>
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

