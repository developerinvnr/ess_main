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
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<style> /*background-color:#D9D9FF;  background-color:#EEEEEE; */
.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;}
.SaveButton {background-image:url(images/save.gif); width:20px; height:20px; background-repeat:no-repeat; background-color:#FFFFFF; border-color:#FFFFFF; border-bottom:inherit;}
.EditSelect { font-family:Georgia; font-size:11px; height:18px;}
.EditInput { font-family:Georgia; font-size:11px; height:18px;}
.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}
.InputB{font-size:12px;width:65px;text-align:right;border:0px;font-weight:bold;background-color:#D9D9FF;} 
.Input{font-size:12px;width:60px;text-align:right;border:0px;background-color:#EEEEEE;}
.TInput{font-size:12px;width:60px;text-align:right;border:0px;background-color:#FFFFA6;font-weight:bold;}
.Th110{text-align:center;width:100px;font-weight:bold;font-size:11px;}
.Th80{text-align:center;width:80px;font-weight:bold;font-size:11px;}
.Th60{text-align:center;width:60px;font-weight:bold;font-size:11px;}
.Th50{text-align:center;width:50px;font-weight:bold;font-size:11px;} 
.Th80{text-align:center;width:80px;font-weight:bold;font-size:11px;}
.Th40{text-align:center;width:40px;font-weight:bold;font-size:11px;}
.Th30{text-align:center;width:30px;font-weight:bold;font-size:11px;} 
.Tr60{text-align:center;width:60px;font-weight:bold;font-size:11px;}
.Th50{text-align:center;width:50px;font-weight:bold;font-size:11px;} 
.Td110{text-align:right;width:110px;font-size:11px;} 
.Td80{text-align:right;width:80px;font-size:11px;} 
.Td60{text-align:right;width:60px;font-size:11px;} 
.Td50{text-align:right;width:50px;font-size:11px;} 
.Td30{text-align:right;width:30px;font-size:11px;} 
.ChkImg{width:20px;hieght:20px;}
.inner_table{height:350px;overflow-y:auto;width:auto;}
</style>
<script src="js/jquery-1.9.1.js"></script>
<script type="text/javascript" src="js/jquery.freezeheader.js"></script>
<Script type="text/javascript">//window.history.forward(1);</Script> 
<script type="text/javascript" language="javascript">
function FChk(v1,v2)
{ 
 if(v2==1 && v1==1)
 { 
   document.getElementById("HqWC0").style.display='block'; document.getElementById("HqWC1").style.display='none'; 
   document.getElementById("DisWC0").style.display='none'; document.getElementById("DisWC1").style.display='block';
   document.getElementById("NameWC0").style.display='none'; document.getElementById("NameWC1").style.display='block';
   document.getElementById("HqWise").value=1; document.getElementById("DisWise").value=0; document.getElementById("NameWise").value=0;
   document.getElementById("TD1").style.display='block'; document.getElementById("TD2").style.display='none'; 
   document.getElementById("TD3").style.display='none';
   var rowSteChk=document.getElementById("rowSteChk").value; 
   if(rowSteChk>0)
   { document.getElementById("SteWC0").style.display='none'; document.getElementById("SteWC1").style.display='block';
     document.getElementById("SteWise").value=0; document.getElementById("TD4").style.display='none'; } 
 }
 else if(v2==2 && v1==1)
 {  
   document.getElementById("DisWC0").style.display='block'; document.getElementById("DisWC1").style.display='none'; 
   document.getElementById("HqWC0").style.display='none'; document.getElementById("HqWC1").style.display='block';
   document.getElementById("NameWC0").style.display='none'; document.getElementById("NameWC1").style.display='block';
   document.getElementById("DisWise").value=1; document.getElementById("HqWise").value=0; document.getElementById("NameWise").value=0;
   document.getElementById("TD2").style.display='block'; document.getElementById("TD1").style.display='none'; 
   document.getElementById("TD3").style.display='none';
   var rowSteChk=document.getElementById("rowSteChk").value;
   if(rowSteChk>0){ document.getElementById("SteWC0").style.display='none'; 
   document.getElementById("SteWC1").style.display='block';
   document.getElementById("SteWise").value=0; document.getElementById("TD4").style.display='none'; }
   
 }
 else if(v2==3 && v1==1)
 {  
   document.getElementById("NameWC0").style.display='block'; document.getElementById("NameWC1").style.display='none'; 
   document.getElementById("HqWC0").style.display='none'; document.getElementById("HqWC1").style.display='block';
   document.getElementById("DisWC0").style.display='none'; document.getElementById("DisWC1").style.display='block';
   document.getElementById("NameWise").value=1; document.getElementById("HqWise").value=0; document.getElementById("DisWise").value=0;
   document.getElementById("TD3").style.display='block'; document.getElementById("TD1").style.display='none'; 
   document.getElementById("TD2").style.display='none';
   var rowSteChk=document.getElementById("rowSteChk").value;
   if(rowSteChk>0){ document.getElementById("SteWC0").style.display='none'; 
   document.getElementById("SteWC1").style.display='block';
   document.getElementById("SteWise").value=0; document.getElementById("TD4").style.display='none'; }
 }
 else if(v2==4 && v1==1)
 { 
   document.getElementById("SteWC0").style.display='block'; document.getElementById("SteWC1").style.display='none'; 
   document.getElementById("NameWC0").style.display='none'; document.getElementById("NameWC1").style.display='block'; 
   document.getElementById("HqWC0").style.display='none'; document.getElementById("HqWC1").style.display='block';
   document.getElementById("DisWC0").style.display='none'; document.getElementById("DisWC1").style.display='block';
   document.getElementById("SteWise").value=1; document.getElementById("NameWise").value=0; 
   document.getElementById("HqWise").value=0; document.getElementById("DisWise").value=0;
   document.getElementById("TD4").style.display='block'; document.getElementById("TD3").style.display='none'; 
   document.getElementById("TD1").style.display='none'; document.getElementById("TD2").style.display='none';
 }
}

function FunSteName(SteName) 
{ 
  var yi=document.getElementById("yi").value; var ci=document.getElementById("ci").value; var c=document.getElementById("c").value;
  var s=document.getElementById("s").value; var hq=document.getElementById("hq").value; var dil=document.getElementById("dil").value;
  var grp=document.getElementById("grp").value; var qtr=document.getElementById("qtr").value; var ii=document.getElementById("ii").value;
  var Qq1=document.getElementById("Qq1").value; var Qq2=document.getElementById("Qq2").value; var Qq3=document.getElementById("Qq3").value;
  var Qq4=document.getElementById("Qq4").value; var HqWise=document.getElementById("HqWise").value; var DisWise=document.getElementById("DisWise").value;
  var SelDis=document.getElementById("SelDis").value; var rpt=document.getElementById("rpt").value; var crp=document.getElementById("crp").value;
  var NameWise=document.getElementById("NameWise").value; var SteWise=document.getElementById("SteWise").value; var SelName=0; var SelHq=0; 
  window.location="SalesTaReports.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&yi="+yi+"&ci="+ci+"&c="+c+"&s="+s+"&hq="+hq+"&dil="+dil+"&grp="+grp+"&qtr="+qtr+"&ii="+ii+"&Qq1="+Qq1+"&Qq2="+Qq2+"&Qq3="+Qq3+"&Qq4="+Qq4+"&HqWise="+HqWise+"&DisWise="+DisWise+"&SelHq="+SelHq+"&SelDis="+SelDis+"&rpt="+rpt+"&crp="+crp+"&Bclick=0&SelName="+SelName+"&NameWise="+NameWise+"&SteWise="+SteWise+"&SteName="+SteName;
}

function FunSelName(SelName) 
{ 
  var yi=document.getElementById("yi").value; var ci=document.getElementById("ci").value; var c=document.getElementById("c").value;
  var s=document.getElementById("s").value; var hq=document.getElementById("hq").value; var dil=document.getElementById("dil").value;
  var grp=document.getElementById("grp").value; var qtr=document.getElementById("qtr").value; var ii=document.getElementById("ii").value;
  var Qq1=document.getElementById("Qq1").value; var Qq2=document.getElementById("Qq2").value; var Qq3=document.getElementById("Qq3").value;
  var Qq4=document.getElementById("Qq4").value; var HqWise=document.getElementById("HqWise").value; var DisWise=document.getElementById("DisWise").value;
  var SelDis=document.getElementById("SelDis").value; var rpt=document.getElementById("rpt").value; var crp=document.getElementById("crp").value;
  var NameWise=document.getElementById("NameWise").value; var SelHq=0; //var SelHq=document.getElementById("SelHq").value; 
  var SteWise=document.getElementById("SteWise").value; var SteName=document.getElementById("SteName").value;
  window.location="SalesTaReports.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&yi="+yi+"&ci="+ci+"&c="+c+"&s="+s+"&hq="+hq+"&dil="+dil+"&grp="+grp+"&qtr="+qtr+"&ii="+ii+"&Qq1="+Qq1+"&Qq2="+Qq2+"&Qq3="+Qq3+"&Qq4="+Qq4+"&HqWise="+HqWise+"&DisWise="+DisWise+"&SelHq="+SelHq+"&SelDis="+SelDis+"&rpt="+rpt+"&crp="+crp+"&Bclick=0&SelName="+SelName+"&NameWise="+NameWise+"&SteWise="+SteWise+"&SteName="+SteName;
}


function FunSelHq(SelHq) 
{ 
  var yi=document.getElementById("yi").value; var ci=document.getElementById("ci").value; var c=document.getElementById("c").value;
  var s=document.getElementById("s").value; var hq=document.getElementById("hq").value; var dil=document.getElementById("dil").value;
  var grp=document.getElementById("grp").value; var qtr=document.getElementById("qtr").value; var ii=document.getElementById("ii").value;
  var Qq1=document.getElementById("Qq1").value; var Qq2=document.getElementById("Qq2").value; var Qq3=document.getElementById("Qq3").value;
  var Qq4=document.getElementById("Qq4").value; var HqWise=document.getElementById("HqWise").value; var DisWise=document.getElementById("DisWise").value;
  var rpt=document.getElementById("rpt").value; var crp=document.getElementById("crp").value; var NameWise=document.getElementById("NameWise").value; 
  var SelName=document.getElementById("SelName").value; var SelDis=0; //var SelDis=document.getElementById("SelDis").value;
  var SteWise=document.getElementById("SteWise").value; var SteName=document.getElementById("SteName").value;
  window.location="SalesTaReports.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&yi="+yi+"&ci="+ci+"&c="+c+"&s="+s+"&hq="+hq+"&dil="+dil+"&grp="+grp+"&qtr="+qtr+"&ii="+ii+"&Qq1="+Qq1+"&Qq2="+Qq2+"&Qq3="+Qq3+"&Qq4="+Qq4+"&HqWise="+HqWise+"&DisWise="+DisWise+"&SelHq="+SelHq+"&SelDis="+SelDis+"&rpt="+rpt+"&crp="+crp+"&Bclick=0&SelName="+SelName+"&NameWise="+NameWise+"&SteWise="+SteWise+"&SteName="+SteName;
}

function FunSelDis(SelDis)
{
  var yi=document.getElementById("yi").value; var ci=document.getElementById("ci").value; var c=document.getElementById("c").value;
  var s=document.getElementById("s").value; var hq=document.getElementById("hq").value; var dil=document.getElementById("dil").value;
  var grp=document.getElementById("grp").value; var qtr=document.getElementById("qtr").value; var ii=document.getElementById("ii").value;
  var Qq1=document.getElementById("Qq1").value; var Qq2=document.getElementById("Qq2").value; var Qq3=document.getElementById("Qq3").value;
  var Qq4=document.getElementById("Qq4").value; var HqWise=document.getElementById("HqWise").value; var DisWise=document.getElementById("DisWise").value;
  var SelHq=document.getElementById("SelHq").value; var rpt=document.getElementById("rpt").value; var crp=document.getElementById("crp").value;
  var NameWise=document.getElementById("NameWise").value; var SelName=document.getElementById("SelName").value;
  var SteWise=document.getElementById("SteWise").value; var SteName=document.getElementById("SteName").value;
  window.location="SalesTaReports.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&yi="+yi+"&ci="+ci+"&c="+c+"&s="+s+"&hq="+hq+"&dil="+dil+"&grp="+grp+"&qtr="+qtr+"&ii="+ii+"&Qq1="+Qq1+"&Qq2="+Qq2+"&Qq3="+Qq3+"&Qq4="+Qq4+"&HqWise="+HqWise+"&DisWise="+DisWise+"&SelHq="+SelHq+"&SelDis="+SelDis+"&rpt="+rpt+"&crp="+crp+"&Bclick=0&SelName="+SelName+"&NameWise="+NameWise+"&SteWise="+SteWise+"&SteName="+SteName;
}

function FunCrp(crp)
{
  var yi=document.getElementById("yi").value; var ci=document.getElementById("ci").value; var c=document.getElementById("c").value;
  var s=document.getElementById("s").value; var hq=document.getElementById("hq").value; var dil=document.getElementById("dil").value;
  var grp=document.getElementById("grp").value; var qtr=document.getElementById("qtr").value; var ii=0; //var ii=document.getElementById("ii").value;
  var Qq1=document.getElementById("Qq1").value; var Qq2=document.getElementById("Qq2").value; var Qq3=document.getElementById("Qq3").value;
  var Qq4=document.getElementById("Qq4").value; var HqWise=document.getElementById("HqWise").value; var DisWise=document.getElementById("DisWise").value;
  var SelHq=document.getElementById("SelHq").value; var rpt=document.getElementById("rpt").value; var SelDis=document.getElementById("SelDis").value;
  var NameWise=document.getElementById("NameWise").value; var SelName=document.getElementById("SelName").value;
  var SteWise=document.getElementById("SteWise").value; var SteName=document.getElementById("SteName").value;
  window.location="SalesTaReports.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&yi="+yi+"&ci="+ci+"&c="+c+"&s="+s+"&hq="+hq+"&dil="+dil+"&grp="+grp+"&qtr="+qtr+"&ii="+ii+"&Qq1="+Qq1+"&Qq2="+Qq2+"&Qq3="+Qq3+"&Qq4="+Qq4+"&HqWise="+HqWise+"&DisWise="+DisWise+"&SelHq="+SelHq+"&SelDis="+SelDis+"&rpt="+rpt+"&crp="+crp+"&Bclick=0&SelName="+SelName+"&NameWise="+NameWise+"&SteWise="+SteWise+"&SteName="+SteName;
}

function FunIi(ii)
{
  var yi=document.getElementById("yi").value; var ci=document.getElementById("ci").value; var c=document.getElementById("c").value;
  var s=document.getElementById("s").value; var hq=document.getElementById("hq").value; var dil=document.getElementById("dil").value;
  var grp=document.getElementById("grp").value; var qtr=document.getElementById("qtr").value; var Qq1=document.getElementById("Qq1").value; 
  var Qq2=document.getElementById("Qq2").value; var Qq3=document.getElementById("Qq3").value; var Qq4=document.getElementById("Qq4").value; 
  var HqWise=document.getElementById("HqWise").value; var DisWise=document.getElementById("DisWise").value; var SelDis=document.getElementById("SelDis").value;
  var SelHq=document.getElementById("SelHq").value; var rpt=document.getElementById("rpt").value; var crp=document.getElementById("crp").value;
  var NameWise=document.getElementById("NameWise").value; var SelName=document.getElementById("SelName").value;
  var SteWise=document.getElementById("SteWise").value; var SteName=document.getElementById("SteName").value;
  window.location="SalesTaReports.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&yi="+yi+"&ci="+ci+"&c="+c+"&s="+s+"&hq="+hq+"&dil="+dil+"&grp="+grp+"&qtr="+qtr+"&ii="+ii+"&Qq1="+Qq1+"&Qq2="+Qq2+"&Qq3="+Qq3+"&Qq4="+Qq4+"&HqWise="+HqWise+"&DisWise="+DisWise+"&SelHq="+SelHq+"&SelDis="+SelDis+"&rpt="+rpt+"&crp="+crp+"&Bclick=0&SelName="+SelName+"&NameWise="+NameWise+"&SteWise="+SteWise+"&SteName="+SteName;
}

function FunYr(yi)
{
  var ii=document.getElementById("ii").value; var ci=document.getElementById("ci").value; var c=document.getElementById("c").value;
  var s=document.getElementById("s").value; var hq=document.getElementById("hq").value; var dil=document.getElementById("dil").value;
  var grp=document.getElementById("grp").value; var qtr=document.getElementById("qtr").value; var Qq1=document.getElementById("Qq1").value; 
  var Qq2=document.getElementById("Qq2").value; var Qq3=document.getElementById("Qq3").value; var Qq4=document.getElementById("Qq4").value; 
  var HqWise=document.getElementById("HqWise").value; var DisWise=document.getElementById("DisWise").value; var SelDis=document.getElementById("SelDis").value;
  var SelHq=document.getElementById("SelHq").value; var rpt=document.getElementById("rpt").value; var crp=document.getElementById("crp").value;
  var NameWise=document.getElementById("NameWise").value; var SelName=document.getElementById("SelName").value;
  var SteWise=document.getElementById("SteWise").value; var SteName=document.getElementById("SteName").value;
  window.location="SalesTaReports.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&yi="+yi+"&ci="+ci+"&c="+c+"&s="+s+"&hq="+hq+"&dil="+dil+"&grp="+grp+"&qtr="+qtr+"&ii="+ii+"&Qq1="+Qq1+"&Qq2="+Qq2+"&Qq3="+Qq3+"&Qq4="+Qq4+"&HqWise="+HqWise+"&DisWise="+DisWise+"&SelHq="+SelHq+"&SelDis="+SelDis+"&rpt="+rpt+"&crp="+crp+"&Bclick=0&SelName="+SelName+"&NameWise="+NameWise+"&SteWise="+SteWise+"&SteName="+SteName;
}

function FunBtnClick(vv)
{
  var SelHq=document.getElementById("SelHq").value; var SelDis=document.getElementById("SelDis").value; var SelName=document.getElementById("SelName").value;
  if(vv==1 && SelHq==0){alert("Please select head quarter"); return false; } if(vv==2 && SelDis==0){alert("Please select dealer name"); return false; }
  if(vv==3 && SelName==0){alert("Please select employee name"); return false; }
  var crp=document.getElementById("crp").value;
  if(crp==0){alert("Please select crop"); return false; }
  var yi=document.getElementById("yi").value; var ci=document.getElementById("ci").value; var c=document.getElementById("c").value;
  var s=document.getElementById("s").value; var hq=document.getElementById("hq").value; var dil=document.getElementById("dil").value;
  var grp=document.getElementById("grp").value; var qtr=document.getElementById("qtr").value; var Qq1=document.getElementById("Qq1").value; 
  var Qq2=document.getElementById("Qq2").value; var Qq3=document.getElementById("Qq3").value; var Qq4=document.getElementById("Qq4").value; 
  var HqWise=document.getElementById("HqWise").value; var DisWise=document.getElementById("DisWise").value; 
  var rpt=document.getElementById("rpt").value; var ii=document.getElementById("ii").value;
  var NameWise=document.getElementById("NameWise").value; var SelName=document.getElementById("SelName").value;
  var SteWise=document.getElementById("SteWise").value; var SteName=document.getElementById("SteName").value;
  window.location="SalesTaReports.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&yi="+yi+"&ci="+ci+"&c="+c+"&s="+s+"&hq="+hq+"&dil="+dil+"&grp="+grp+"&qtr="+qtr+"&ii="+ii+"&Qq1="+Qq1+"&Qq2="+Qq2+"&Qq3="+Qq3+"&Qq4="+Qq4+"&HqWise="+HqWise+"&DisWise="+DisWise+"&SelHq="+SelHq+"&SelDis="+SelDis+"&rpt="+rpt+"&crp="+crp+"&Bclick=1&truvalue=falseok&SelName="+SelName+"&NameWise="+NameWise+"&SteWise="+SteWise+"&SteName="+SteName;
}



/** Q1 Q1 Q1 Q1 **/
function QFunATotal(Q,v)
{ var A=parseFloat(v); var TotA=parseFloat(document.getElementById("TotVal_"+Q+"A").value); 
  document.getElementById("TotVal_"+Q+"A").value=Math.round((A+TotA)*10000)/10000; 
}
function QFunBTotal(Q,v)
{ var B=parseFloat(v); var TotB=parseFloat(document.getElementById("TotVal_"+Q+"B").value);
  document.getElementById("TotVal_"+Q+"B").value=Math.round((B+TotB)*10000)/10000; 
}
function QFunCTotal(Q,v)
{ var C=parseFloat(v); var TotC=parseFloat(document.getElementById("TotVal_"+Q+"C").value);
  document.getElementById("TotVal_"+Q+"C").value=Math.round((C+TotC)*10000)/10000; 
} 
 

function FunATotal(v)
{ var A=parseFloat(v); var TotA=parseFloat(document.getElementById("TotVal_A").value); 
  document.getElementById("TotVal_A").value=Math.round((A+TotA)*10000)/10000; 
}
function FunBTotal(v)
{ var B=parseFloat(v); var TotB=parseFloat(document.getElementById("TotVal_B").value);
  document.getElementById("TotVal_B").value=Math.round((B+TotB)*10000)/10000; 
}
function FunCTotal(v)
{ var C=parseFloat(v); var TotC=parseFloat(document.getElementById("TotVal_C").value);
  document.getElementById("TotVal_C").value=Math.round((C+TotC)*10000)/10000; 
}

function FunExport(v)
{ var EmpId=document.getElementById("EmpId").value; var YId=document.getElementById("yi").value;
  var SelHq=document.getElementById("SelHq").value; var SelDis=document.getElementById("SelDis").value; var crp=document.getElementById("crp").value;
  var yi=document.getElementById("yi").value; var ci=document.getElementById("ci").value; var c=document.getElementById("c").value;
  var s=document.getElementById("s").value; var hq=document.getElementById("hq").value; var dil=document.getElementById("dil").value;
  var grp=document.getElementById("grp").value; var qtr=document.getElementById("qtr").value; var Qq1=document.getElementById("Qq1").value; 
  var Qq2=document.getElementById("Qq2").value; var Qq3=document.getElementById("Qq3").value; var Qq4=document.getElementById("Qq4").value; 
  var HqWise=document.getElementById("HqWise").value; var DisWise=document.getElementById("DisWise").value; 
  var rpt=document.getElementById("rpt").value; var ii=document.getElementById("ii").value;
  var NameWise=document.getElementById("NameWise").value; var SelName=document.getElementById("SelName").value;
  var SteWise=document.getElementById("SteWise").value; var SteName=document.getElementById("SteName").value;
  window.open("SalesTaReportsExport.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&yi="+yi+"&ci="+ci+"&c="+c+"&s="+s+"&hq="+hq+"&dil="+dil+"&grp="+grp+"&qtr="+qtr+"&ii="+ii+"&Qq1="+Qq1+"&Qq2="+Qq2+"&Qq3="+Qq3+"&Qq4="+Qq4+"&HqWise="+HqWise+"&DisWise="+DisWise+"&SelHq="+SelHq+"&SelDis="+SelDis+"&rpt="+rpt+"&crp="+crp+"&Bclick=1&truvalue=falseok&EmpId="+EmpId+"&YId="+YId+"&SelName="+SelName+"&NameWise="+NameWise+"&SteWise="+SteWise+"&SteName="+SteName,"ExpForm","menubar=yes,scrollbars=yes,resizable=no,directories=no,width=20,height=20");
}

</script>    
</head>
<body class="body">   
<table class="table">
<tr><td><table class="menutable"><tr><td><?php if($_SESSION['login'] = true){ require_once("EMenu.php"); } ?></td></tr></table></td></tr>
<tr>
 <td>
  <table style="margin-top:0px;width:100%;">
   <tr><td valign="top"><?php if($_SESSION['login'] = true){ require_once("EWelcome.php"); } ?></td></tr>
   <tr>
	<td valign="top" style="width:100%;">
	<table border="0" style="width:100%;float:none;" cellpadding="0">
	 <tr>
	  <td valign="top" style="width:100%;">    
<?php //*********************************************************************** ?>	   
	  <table border="0" id="Activity" style="width:100%;">
	   <tr>
	    <td colspan="2" valign="top" style="width:100%;">
		<table border="0" style="width:100%;">
<?php //********************************** Start ************************************ ?>		
<?php $Eg=mysql_query("select GradeId,DepartmentId,HqId from hrm_employee_general where EmployeeID=".$EmployeeId, $con); $resEg=mysql_fetch_assoc($Eg); $Egv=mysql_query("select GradeValue from hrm_grade where CompanyId=".$CompanyId." AND GradeId=".$resEg['GradeId'], $con); $resEgv=mysql_fetch_assoc($Egv); ?>		
<input type="hidden" id="EmpId" name="EmpId" value="<?php echo $EmployeeId; ?>" /><input type="hidden" name="gi" id="gi" value="<?php echo $resEg['GradeId']; ?>" />
<input type="hidden" name="di" id="di" value="<?php echo $resEg['DepartmentId']; ?>" /><input type="hidden" name="hqi" id="hqi" value="<?php echo $resEg['HqId']; ?>" />
<input type="hidden" name="ci" id="ci" value="<?php echo $_REQUEST['ci']; ?>" /><input type="hidden" name="YId" id="YId" value="<?php echo $YearId; ?>" />
<input type="hidden" name="Qq1" id="Qq1" value="<?php echo $_REQUEST['Qq1']; ?>" /><input type="hidden" name="Qq2" id="Qq2" value="<?php echo $_REQUEST['Qq2']; ?>" />
<input type="hidden" name="Qq3" id="Qq3" value="<?php echo $_REQUEST['Qq3']; ?>" /><input type="hidden" name="Qq4" id="Qq4" value="<?php echo $_REQUEST['Qq4']; ?>" />
<input type="hidden" name="c" id="c" value="<?php echo $_REQUEST['c']; ?>" /><input type="hidden" name="s" id="s" value="<?php echo $_REQUEST['s']; ?>" />
<input type="hidden" name="hq" id="hq" value="<?php echo $_REQUEST['hq']; ?>" /><input type="hidden" name="dil" id="dil" value="<?php echo $_REQUEST['dil']; ?>" />
<input type="hidden" name="grp" id="grp" value="<?php echo $_REQUEST['grp']; ?>" /><input type="hidden" name="qtr" id="qtr" value="<?php echo $_REQUEST['qtr']; ?>" />
<input type="hidden" name="rpt" id="rpt" value="<?php echo $_REQUEST['rpt']; ?>" /><input type="hidden" name="HqWise" id="HqWise" value="<?php echo $_REQUEST['HqWise']; ?>" />
<input type="hidden" name="DisWise" id="DisWise" value="<?php echo $_REQUEST['DisWise']; ?>" /><input type="hidden" id="Bclick" value="<?php echo $_REQUEST['Bclick']; ?>" />
<input type="hidden" name="NameWise" id="NameWise" value="<?php echo $_REQUEST['NameWise']; ?>" />
<input type="hidden" name="SteWise" id="SteWise" value="<?php echo $_REQUEST['SteWise']; ?>" />

<?php $sqlSteChk=mysql_query("select hrm_state.StateId,StateName from hrm_state INNER JOIN hrm_sales_state_temp ON hrm_state.StateId=hrm_sales_state_temp.StateId where hrm_sales_state_temp.EmployeeID=".$EmployeeId." AND StateTEmpStatus='A' ", $con); $rowSteChk=mysql_num_rows($sqlSteChk); ?>
<input type="hidden" name="rowSteChk" id="rowSteChk" value="<?php echo $rowSteChk; ?>" />
<tr>
 <td colspan="5" style="width:100%;">
  <table border="0" style="width:100%;">
  <tr>
   <td style="width:100%;">
    <table border="0" style="width:100%;">
    <tr>
	 <td style="font-family:Times New Roman;font-size:20px;color:#FFFF80;width:140px;"><b><u>Sales Reports:</u></b></td>
	 <td>
	 <table style="width:100%;">
	  <tr>
<?php if($rowSteChk>0){ ?>
	 <td style="font-family:Times New Roman;font-size:16px;color:#FF80C0;width:100px;" align="right"><b><i>State Wise </i></b></td>
	 <td style="width:30px;">
<img id="SteWC0" src="images/CkbNot.png" onClick="FChk(0,4)" class="ChkImg" style="display:<?php if($_REQUEST['SteWise']==1){echo 'block';}else{echo 'none';} ?>;" />
<img id="SteWC1" src="images/CkbEmpty.png" onClick="FChk(1,4)" class="ChkImg" style="display:<?php if($_REQUEST['SteWise']==0){echo 'block';}else{echo 'none';} ?>;" />
	 </td>  
<?php } ?>	  
	 <td style="font-family:Times New Roman;font-size:16px;color:#FF80C0;width:100px;" align="right"><b><i>Name Wise </i></b></td>
	 <td style="width:30px;">
<img id="NameWC0" src="images/CkbNot.png" onClick="FChk(0,3)" class="ChkImg" style="display:<?php if($_REQUEST['NameWise']==1){echo 'block';}else{echo 'none';} ?>;" />
<img id="NameWC1" src="images/CkbEmpty.png" onClick="FChk(1,3)" class="ChkImg" style="display:<?php if($_REQUEST['NameWise']==0){echo 'block';}else{echo 'none';} ?>;" />
	 </td> 
	  
	 <td style="font-family:Times New Roman;font-size:16px;color:#FF80C0;width:155px;" align="right"><b><i>Head Quarter Wise </i></b></td>
	 <td style="width:30px;">
<img id="HqWC0" src="images/CkbNot.png" onClick="FChk(0,1)" class="ChkImg" style="display:<?php if($_REQUEST['HqWise']==1){echo 'block';}else{echo 'none';} ?>;" />
<img id="HqWC1" src="images/CkbEmpty.png" onClick="FChk(1,1)" class="ChkImg" style="display:<?php if($_REQUEST['HqWise']==0){echo 'block';}else{echo 'none';} ?>;" />
	 </td>
	 <td style="font-family:Times New Roman;font-size:16px;color:#FF80C0;width:130px;" align="right"><b><i>Distributors Wise </i></b></td>
	 <td style="width:30px;">
<img id="DisWC0" src="images/CkbNot.png" border="0" onClick="FChk(0,2)" class="ChkImg" style="display:<?php if($_REQUEST['DisWise']==1){echo 'block';}else{echo 'none';} ?>;" />
<img id="DisWC1" src="images/CkbEmpty.png" border="0" onClick="FChk(1,2)" class="ChkImg" style="display:<?php if($_REQUEST['DisWise']==0){echo 'block';}else{echo 'none';} ?>;" />
	 </td>
	 <td>&nbsp;</td>
	 </tr>
	 </table>
	 </td>
	</tr>
	<tr>
	 <td colspan="7" style="width:100%;">
	 
<?php /******************************************* Selection Open  ****************************/  ?>
<?php /******************************************* Selection Open  ****************************/  ?>	 
<table style="width:100%;">
<tr>
     <td id="TD4" style="display:<?php if($_REQUEST['SteWise']==1){echo 'block';}else{echo 'none';} ?>;">
	 <?php /*************** STATE WISE STATE WISE  */ ?>
  <table>
   <tr>
    <td>
     <select id="yi" name="yi" style="height:22px;font-family:Times New Roman;font-size:14px;width:100px;background-color:<?php if($_REQUEST['yi']>0){echo '#B6FF6C';}?>;" onChange="FunYr(this.value)" >
	 <?php if($_REQUEST['yi']>0){ $sqlYr1=mysql_query("select FromDate,ToDate from hrm_year where YearId=".$_REQUEST['yi'], $con); $resYr1=mysql_fetch_assoc($sqlYr1); ?>
	 <option value="<?php echo $_REQUEST['yi']; ?>"><?php echo date("Y",strtotime($resYr1['FromDate'])).'-'.date("Y",strtotime($resYr1['ToDate'])); ?></option>
	 <?php } else { ?><option value="0">SELECT YEAR</option><?php } ?>
	 <option value="8">2019-2020</option><option value="7">2018-2019</option><option value="6">2017-2018</option>
	 <option value="5">2016-2017</option><option value="4">2015-2016</option>
	 <option value="3">2014-2015</option> 
	 </select>
   </td>
   <td style="width:1px;"></td>
    <td>
	 <select id="SteName" name="SteName" style="width:180px;height:22px;font-family:Times New Roman;font-size:14px;background-color:<?php if($_REQUEST['SteName']>0){echo '#B6FF6C';}?>;" onChange="FunSteName(this.value)">
	 <?php if($_REQUEST['SteName']>0){ $sqlSte=mysql_query("select StateName from hrm_state where StateId=".$_REQUEST['SteName'], $con); $resSte=mysql_fetch_assoc($sqlSte); ?>
	 <option value="<?php echo $_REQUEST['SteName']; ?>"><?php echo strtoupper($resSte['StateName']); ?></option>
	 <?php } else { ?><option value="0">SELECT STATE</option><?php } ?>
	 <?php $sqlSte2=mysql_query("select hrm_state.StateId,StateName from hrm_state INNER JOIN hrm_sales_state_temp ON hrm_state.StateId=hrm_sales_state_temp.StateId where hrm_sales_state_temp.EmployeeID=".$EmployeeId." AND StateTEmpStatus='A' order by StateName ASC", $con); while($resSte2=mysql_fetch_assoc($sqlSte2)){ ?>
	 <option value="<?php echo $resSte2['StateId']; ?>"><?php echo strtoupper($resSte2['StateName']); ?></option><?php } ?>	 
	 </select>
	</td>
	<td style="width:1px;"></td>
	<td>
     <select id="crp" name="crp" style="height:22px;font-family:Times New Roman;font-size:14px;width:150px;background-color:<?php if($_REQUEST['crp']>0){echo '#B6FF6C';}?>;" onChange="FunCrp(this.value)" >
     <option value="0" <?php if($_REQUEST['crp']==0){ echo 'selected'; } ?>>SELECT CROP</option>
	 <option value="1" <?php if($_REQUEST['crp']==1){ echo 'selected'; } ?>>VEGETABLE CROP</option>
	 <option value="2" <?php if($_REQUEST['crp']==2){ echo 'selected'; } ?>>FIELD CROP</option>
	 <option value="3" <?php if($_REQUEST['crp']==3){ echo 'selected'; } ?>>ALL CROP</option>
	 </select>
   </td>
   <td style="width:1px;"></td>
	<td>
     <select id="ii" name="ii" style="height:22px;font-family:Times New Roman;font-size:14px;width:130px;background-color:<?php if($_REQUEST['ii']>0){echo '#B6FF6C';}?>;" onChange="FunIi(this.value)" <?php if($_REQUEST['crp']==0){echo 'disabled';} ?>>
	 <?php if($_REQUEST['ii']>0){ $sqlI1=mysql_query("select ItemName from hrm_sales_seedsitem where ItemId=".$_REQUEST['ii'], $con); $resI1=mysql_fetch_assoc($sqlI1); ?>
	 <option value="<?php echo $_REQUEST['ii']; ?>"><?php echo strtoupper($resI1['ItemName']); ?></option>
	 <?php } else { ?><option value="0">SELECT ITEMS</option><?php } ?>
	 
	 <?php if($_REQUEST['crp']>0){?>
     <?php if($_REQUEST['crp']==1 OR $_REQUEST['crp']==2){ $sI=mysql_query("select ItemId,ItemName from hrm_sales_seedsitem where GroupId=".$_REQUEST['crp']." order by ItemName ASC", $con); } elseif($_REQUEST['crp']==3){ $sI=mysql_query("select ItemId,ItemName from hrm_sales_seedsitem order by ItemName ASC", $con); }
	 while($rI=mysql_fetch_assoc($sI)){ ?><option value="<?php echo $rI['ItemId']; ?>"><?php echo strtoupper($rI['ItemName']); ?></option><?php } ?>
	 <?php } ?>	
	 </select>
   </td>
   <td style="width:1px;"></td>
   <td><input type="button" style="height:26px;font-family:Times New Roman;font-size:14px;width:100px;background-color:#B6FF6C;font-weight:bold;" onClick="FunBtnClick(4)" value="Click" <?php if($_REQUEST['SteName']>0 OR $_REQUEST['SteName']=='All'){echo '';}else{echo 'disabled';} ?> /></td>
   <td style="width:5px;"></td>
   <td><input type="button" style="height:26px;font-family:Times New Roman;font-size:14px;width:100px;background-color:#FFFFA6;font-weight:bold;" onClick="FunExport(4)" value="Export" <?php if($_REQUEST['Bclick']==0){echo 'disabled';} ?> /></td>
   </tr>
  </table> 
 </td>


 <td id="TD3" style="display:<?php if($_REQUEST['NameWise']==1){echo 'block';}else{echo 'none';} ?>;">
 <?php /*************** NAME WISE NAME WISE  */ ?>
  <table>
   <tr>
    <td>
     <select id="yi" name="yi" style="height:22px;font-family:Times New Roman;font-size:14px;width:100px;background-color:<?php if($_REQUEST['yi']>0){echo '#B6FF6C';}?>;" onChange="FunYr(this.value)" >
	 <?php if($_REQUEST['yi']>0){ $sqlYr1=mysql_query("select FromDate,ToDate from hrm_year where YearId=".$_REQUEST['yi'], $con); $resYr1=mysql_fetch_assoc($sqlYr1); ?>
	 <option value="<?php echo $_REQUEST['yi']; ?>"><?php echo date("Y",strtotime($resYr1['FromDate'])).'-'.date("Y",strtotime($resYr1['ToDate'])); ?></option>
	 <?php } else { ?><option value="0">SELECT YEAR</option><?php } ?>
	 <option value="8">2019-2020</option><option value="7">2018-2019</option><option value="6">2017-2018</option>
	 <option value="5">2016-2017</option><option value="4">2015-2016</option>
	 <option value="3">2014-2015</option>
	 
	 <?php /*
	 <?php if($_REQUEST['yi']==4){ ?><option value="3">2014-2015</option>
	 <?php } elseif($_REQUEST['yi']==3){ ?><option value="4">2015-2016</option>
	 <?php } elseif($_REQUEST['yi']==5){ ?><option value="4">2015-2016</option><option value="3">2014-2015</option>
	 <?php } elseif($_REQUEST['yi']==6){ ?><option value="5">2016-2017</option><option value="4">2015-2016</option><option value="3">2014-2015</option>
	 <?php } elseif($_REQUEST['yi']>6){ $n1=$_REQUEST['yi']-1; $n2=$_REQUEST['yi']-2; $n3=$_REQUEST['yi']-3; $n4=$_REQUEST['yi']-4; 
	 $sy1=mysql_query("select FromDate,ToDate from hrm_year where YearId=".$n1, $con); $ry1=mysql_fetch_assoc($sy1);
	 $sy2=mysql_query("select FromDate,ToDate from hrm_year where YearId=".$n2, $con); $ry2=mysql_fetch_assoc($sy2);
	 $sy3=mysql_query("select FromDate,ToDate from hrm_year where YearId=".$n3, $con); $ry3=mysql_fetch_assoc($sy3);
	 $sy4=mysql_query("select FromDate,ToDate from hrm_year where YearId=".$n4, $con); $ry4=mysql_fetch_assoc($sy4); ?>
	 <option value="<?php echo $n1; ?>"><?php echo date("Y",strtotime($ry1['FromDate'])).'-'.date("Y",strtotime($ry1['ToDate'])); ?></option>
	 <option value="<?php echo $n2; ?>"><?php echo date("Y",strtotime($ry2['FromDate'])).'-'.date("Y",strtotime($ry2['ToDate'])); ?></option>
	 <option value="<?php echo $n3; ?>"><?php echo date("Y",strtotime($ry3['FromDate'])).'-'.date("Y",strtotime($ry3['ToDate'])); ?></option>
	 <option value="<?php echo $n4; ?>"><?php echo date("Y",strtotime($ry4['FromDate'])).'-'.date("Y",strtotime($ry4['ToDate'])); ?></option>
	 <?php } */?>
	 
	 </select>
   </td>
   <td style="width:1px;"></td>
    <td>
	 <select id="SelName" name="SelName" style="width:180px;height:22px;font-family:Times New Roman;font-size:14px;background-color:<?php if($_REQUEST['SelName']>0){echo '#B6FF6C';}?>;" onChange="FunSelName(this.value)">
	 <?php if($_REQUEST['SelName']>0){ $sqlName1=mysql_query("select Fname,Sname,Lname from hrm_employee where EmployeeID=".$_REQUEST['SelName'], $con); $resName1=mysql_fetch_assoc($sqlName1); ?>
	 <option value="<?php echo $_REQUEST['SelName']; ?>"><?php echo strtoupper($resName1['Fname'].' '.$resName1['Sname'].' '.$resName1['Lname']); ?></option>
	 <?php } elseif($_REQUEST['SelName']=='All') { ?><option value="All">All MY TEAM</option>
	 <?php } else { ?><option value="0">SELECT NAME</option><?php } ?>
	 
     <?php if($_REQUEST['rpt']==0){ ?>
     <?php $sName=mysql_query("select Fname,Sname,Lname from hrm_employee where EmployeeID=".$EmployeeId, $con); while($rName=mysql_fetch_assoc($sName)){ ?>
	 <option value="<?php echo $EmployeeId; ?>"><?php echo strtoupper($rName['Fname'].' '.$rName['Sname'].' '.$rName['Lname']); ?></option><?php } ?>
	 
	 <?php } elseif($_REQUEST['rpt']>0){ ?>
<?php $sHqck=mysql_query("select * from hrm_sales_hq_temp where EmployeeID=".$EmployeeId." AND HqTEmpStatus='A'",$con); $rowHqck=mysql_num_rows($sHqck);

	 if($rowHqck==0){$sName2=mysql_query("select hrm_employee.EmployeeID,Fname,Sname,Lname,Gender,DR,Married from hrm_employee_general INNER JOIN hrm_employee_personal ON hrm_employee_general.EmployeeID=hrm_employee_personal.EmployeeID INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee_general.RepEmployeeID=".$EmployeeId." AND hrm_employee_general.DepartmentId=6 AND hrm_employee.EmpStatus='A' order by Fname ASC", $con); }
	 elseif($rowHqck>0){$sName2=mysql_query("select hrm_employee.EmployeeID,Fname,Sname,Lname,Gender,DR,Married from hrm_employee_general INNER JOIN hrm_employee_personal ON hrm_employee_general.EmployeeID=hrm_employee_personal.EmployeeID INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where (hrm_employee_general.EmployeeID=".$EmployeeId." OR hrm_employee_general.RepEmployeeID=".$EmployeeId.") AND hrm_employee_general.DepartmentId=6 AND hrm_employee.EmpStatus='A' order by Fname ASC", $con);}
	  while($rName2=mysql_fetch_assoc($sName2)){ 
	 if($rName2['DR']=='Y'){$M='Dr.';} elseif($rName2['Gender']=='M'){$M='Mr.';} elseif($rName2['Gender']=='F' AND $rName2['Married']=='Y'){$M='Mrs.';} elseif($rName2['Gender']=='F' AND $rName2['Married']=='N'){$M='Miss.';} $Ename=$rName2['Fname'].' '.$rName2['Sname'].' '.$rName2['Lname']; ?>
	 <option value="<?php echo $rName2['EmployeeID']; ?>"><?php echo strtoupper($Ename); ?></option><?php } ?>
	 <option value="All">All MY TEAM [OVERALL]</option>
	 <?php } ?>	 
	 </select>
	</td>
	<td style="width:1px;"></td>
	<td>
     <select id="crp" name="crp" style="height:22px;font-family:Times New Roman;font-size:14px;width:150px;background-color:<?php if($_REQUEST['crp']>0){echo '#B6FF6C';}?>;" onChange="FunCrp(this.value)" >
     <option value="0" <?php if($_REQUEST['crp']==0){ echo 'selected'; } ?>>SELECT CROP</option>
	 <option value="1" <?php if($_REQUEST['crp']==1){ echo 'selected'; } ?>>VEGETABLE CROP</option>
	 <option value="2" <?php if($_REQUEST['crp']==2){ echo 'selected'; } ?>>FIELD CROP</option>
	 <option value="3" <?php if($_REQUEST['crp']==3){ echo 'selected'; } ?>>ALL CROP</option>
	 </select>
   </td>
   <td style="width:1px;"></td>
	<td>
     <select id="ii" name="ii" style="height:22px;font-family:Times New Roman;font-size:14px;width:130px;background-color:<?php if($_REQUEST['ii']>0){echo '#B6FF6C';}?>;" onChange="FunIi(this.value)" <?php if($_REQUEST['crp']==0){echo 'disabled';} ?>>
	 <?php if($_REQUEST['ii']>0){ $sqlI1=mysql_query("select ItemName from hrm_sales_seedsitem where ItemId=".$_REQUEST['ii'], $con); $resI1=mysql_fetch_assoc($sqlI1); ?>
	 <option value="<?php echo $_REQUEST['ii']; ?>"><?php echo strtoupper($resI1['ItemName']); ?></option>
	 <?php } else { ?><option value="0">SELECT ITEMS</option><?php } ?>
	 
	 <?php if($_REQUEST['crp']>0){?>
     <?php if($_REQUEST['crp']==1 OR $_REQUEST['crp']==2){ $sI=mysql_query("select ItemId,ItemName from hrm_sales_seedsitem where GroupId=".$_REQUEST['crp']." order by ItemName ASC", $con); } elseif($_REQUEST['crp']==3){ $sI=mysql_query("select ItemId,ItemName from hrm_sales_seedsitem order by ItemName ASC", $con); }
	 while($rI=mysql_fetch_assoc($sI)){ ?><option value="<?php echo $rI['ItemId']; ?>"><?php echo strtoupper($rI['ItemName']); ?></option><?php } ?>
	 <?php } ?>	
	 </select>
   </td>
   <td style="width:1px;"></td>
   <td><input type="button" style="height:26px;font-family:Times New Roman;font-size:14px;width:100px;background-color:#B6FF6C;font-weight:bold;" onClick="FunBtnClick(3)" value="Click" <?php if($_REQUEST['SelName']>0 OR $_REQUEST['SelName']=='All'){echo '';}else{echo 'disabled';} ?> /></td>
   <td style="width:5px;"></td>
   <td><input type="button" style="height:26px;font-family:Times New Roman;font-size:14px;width:100px;background-color:#FFFFA6;font-weight:bold;" onClick="FunExport(3)" value="Export" <?php if($_REQUEST['Bclick']==0){echo 'disabled';} ?> /></td>
   </tr>
  </table> 
 </td>

 <td id="TD1" style="display:<?php if($_REQUEST['HqWise']==1){echo 'block';}else{echo 'none';} ?>;">
 <?php /*************** HQ WISE HQ WISE  */ ?>
  <table>
   <tr>
    <td>
     <select id="yi" name="yi" style="height:22px;font-family:Times New Roman;font-size:14px;width:100px;background-color:<?php if($_REQUEST['yi']>0){echo '#B6FF6C';}?>;" onChange="FunYr(this.value)" >
	 <?php if($_REQUEST['yi']>0){ $sqlYr1=mysql_query("select FromDate,ToDate from hrm_year where YearId=".$_REQUEST['yi'], $con); $resYr1=mysql_fetch_assoc($sqlYr1); ?>
	 <option value="<?php echo $_REQUEST['yi']; ?>"><?php echo date("Y",strtotime($resYr1['FromDate'])).'-'.date("Y",strtotime($resYr1['ToDate'])); ?></option>
	 <?php } else { ?><option value="0">SELECT YEAR</option><?php } ?>
	 <option value="8">2019-2020</option><option value="7">2018-2019</option><option value="6">2017-2018</option>
	 <option value="5">2016-2017</option><option value="4">2015-2016</option>
	 <option value="3">2014-2015</option>
	 </select>
   </td>
   <td style="width:1px;"></td>
    <td>
	 <select id="SelName" name="SelName" style="width:180px;height:22px;font-family:Times New Roman;font-size:14px;background-color:<?php if($_REQUEST['SelName']>0){echo '#B6FF6C';}?>;" onChange="FunSelName(this.value)">
	 <?php if($_REQUEST['SelName']>0){ $sqlName1=mysql_query("select Fname,Sname,Lname from hrm_employee where EmployeeID=".$_REQUEST['SelName'], $con); $resName1=mysql_fetch_assoc($sqlName1); ?>
	 <option value="<?php echo $_REQUEST['SelName']; ?>"><?php echo strtoupper($resName1['Fname'].' '.$resName1['Sname'].' '.$resName1['Lname']); ?></option>
	 <?php } elseif($_REQUEST['SelName']=='All') { ?><option value="All">All MY TEAM</option>
	 <?php } else { ?><option value="0">SELECT NAME</option><?php } ?>
	 <?php if($_REQUEST['rpt']==0){ ?>
     <?php $sName=mysql_query("select Fname,Sname,Lname from hrm_employee where EmployeeID=".$EmployeeId, $con); while($rName=mysql_fetch_assoc($sName)){ ?>
	 <option value="<?php echo $EmployeeId; ?>"><?php echo strtoupper($rName['Fname'].' '.$rName['Sname'].' '.$rName['Lname']); ?></option><?php } ?>
	 <?php } elseif($_REQUEST['rpt']>0){ ?>
<?php $sHqck=mysql_query("select * from hrm_sales_hq_temp where EmployeeID=".$EmployeeId." AND HqTEmpStatus='A'",$con); $rowHqck=mysql_num_rows($sHqck);
	 if($rowHqck==0){$sName2=mysql_query("select hrm_employee.EmployeeID,Fname,Sname,Lname,Gender,DR,Married from hrm_employee_general INNER JOIN hrm_employee_personal ON hrm_employee_general.EmployeeID=hrm_employee_personal.EmployeeID INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee_general.RepEmployeeID=".$EmployeeId." AND hrm_employee_general.DepartmentId=6 AND hrm_employee.EmpStatus='A' order by Fname ASC", $con); }
	 elseif($rowHqck>0){$sName2=mysql_query("select hrm_employee.EmployeeID,Fname,Sname,Lname,Gender,DR,Married from hrm_employee_general INNER JOIN hrm_employee_personal ON hrm_employee_general.EmployeeID=hrm_employee_personal.EmployeeID INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where (hrm_employee_general.EmployeeID=".$EmployeeId." OR hrm_employee_general.RepEmployeeID=".$EmployeeId.") AND hrm_employee_general.DepartmentId=6 AND hrm_employee.EmpStatus='A' order by Fname ASC", $con);}
	  while($rName2=mysql_fetch_assoc($sName2)){ 
	 if($rName2['DR']=='Y'){$M='Dr.';} elseif($rName2['Gender']=='M'){$M='Mr.';} elseif($rName2['Gender']=='F' AND $rName2['Married']=='Y'){$M='Mrs.';} elseif($rName2['Gender']=='F' AND $rName2['Married']=='N'){$M='Miss.';} $Ename=$rName2['Fname'].' '.$rName2['Sname'].' '.$rName2['Lname']; ?>
	 <option value="<?php echo $rName2['EmployeeID']; ?>"><?php echo strtoupper($Ename); ?></option><?php } ?>
	 <?php } ?>	 
	 </select>
	</td>
	<td style="width:1px;"></td>
    <td>
	 <select id="SelHq" name="SelHq" style="width:150px;height:22px;font-family:Times New Roman;font-size:14px;background-color:<?php if($_REQUEST['SelHq']>0){echo '#B6FF6C';}?>;" onChange="FunSelHq(this.value)" <?php if($_REQUEST['SelName']==0){echo 'disabled';} ?>>
	 <?php if($_REQUEST['SelHq']>0){ $sqlHq1=mysql_query("select HqName from hrm_headquater where HqId=".$_REQUEST['SelHq'], $con); $resHq1=mysql_fetch_assoc($sqlHq1); ?>
	 <option value="<?php echo $_REQUEST['SelHq']; ?>"><?php echo strtoupper($resHq1['HqName']); ?></option>
	 <?php } elseif($_REQUEST['SelHq']=='All') { ?><option value="All">All HEAD QUARTER</option>
	 <?php } else { ?><option value="0">SELECT HQ</option><?php } ?>
<?php $sqlRptN=mysql_query("select hrm_employee_general.EmployeeID from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where DepartmentId=6 AND hrm_employee.EmpStatus='A' AND RepEmployeeID=".$_REQUEST['SelName'], $con); $rowRptN=mysql_num_rows($sqlRptN); ?>	 
     <?php if($rowRptN==0){ ?>
     <?php $sHq=mysql_query("select hrm_sales_hq_temp.HqId,HqName from hrm_sales_hq_temp INNER JOIN hrm_headquater ON hrm_sales_hq_temp.HqId=hrm_headquater.HqId where hrm_sales_hq_temp.EmployeeID=".$_REQUEST['SelName']." AND hrm_sales_hq_temp.HqTEmpStatus='A' order by HqName ASC", $con); while($rHq=mysql_fetch_assoc($sHq)){ ?>
	 <option value="<?php echo $rHq['HqId']; ?>"><?php echo strtoupper($rHq['HqName']); ?></option><?php } ?>
	 
	 <?php } elseif($rowRptN>0 AND $_REQUEST['SelName']!=$EmployeeId){ ?>
	 <?php $sHq2=mysql_query("select hrm_employee.EmployeeID,Fname,Sname,Lname,Gender,DR,Married,hrm_sales_hq_temp.HqId,HqName from hrm_employee_general INNER JOIN hrm_sales_hq_temp ON hrm_employee_general.EmployeeID=hrm_sales_hq_temp.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee_general.EmployeeID=hrm_employee_personal.EmployeeID INNER JOIN hrm_headquater ON hrm_sales_hq_temp.HqId=hrm_headquater.HqId INNER JOIN hrm_employee ON hrm_sales_hq_temp.EmployeeID=hrm_employee.EmployeeID where (hrm_sales_hq_temp.EmployeeID=".$_REQUEST['SelName']." OR hrm_employee_general.RepEmployeeID=".$_REQUEST['SelName'].") AND hrm_employee_general.DepartmentId=6 AND hrm_employee.EmpStatus='A' AND hrm_sales_hq_temp.HqTEmpStatus='A' order by HqName ASC", $con); while($rHq2=mysql_fetch_assoc($sHq2)){ 
	 if($rHq2['DR']=='Y'){$M='Dr.';} elseif($rHq2['Gender']=='M'){$M='Mr.';} elseif($rHq2['Gender']=='F' AND $rHq2['Married']=='Y'){$M='Mrs.';} elseif($rHq2['Gender']=='F' AND $rHq2['Married']=='N'){$M='Miss.';} $Ename=$rHq2['Fname'].' '.$rHq2['Sname'].' '.$rHq2['Lname']; ?>
	 <option value="<?php echo $rHq2['HqId']; ?>"><?php echo strtoupper($rHq2['HqName']); ?></option><?php } ?>
	 <?php } elseif($rowRptN>0 AND $_REQUEST['SelName']==$EmployeeId){ ?>
	 <?php $sHq2=mysql_query("select hrm_employee.EmployeeID,Fname,Sname,Lname,Gender,DR,Married,hrm_sales_hq_temp.HqId,HqName from hrm_employee_general INNER JOIN hrm_sales_hq_temp ON hrm_employee_general.EmployeeID=hrm_sales_hq_temp.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee_general.EmployeeID=hrm_employee_personal.EmployeeID INNER JOIN hrm_headquater ON hrm_sales_hq_temp.HqId=hrm_headquater.HqId INNER JOIN hrm_employee ON hrm_sales_hq_temp.EmployeeID=hrm_employee.EmployeeID where hrm_sales_hq_temp.EmployeeID=".$_REQUEST['SelName']." AND hrm_employee_general.DepartmentId=6 AND hrm_employee.EmpStatus='A' AND hrm_sales_hq_temp.HqTEmpStatus='A' order by HqName ASC", $con); while($rHq2=mysql_fetch_assoc($sHq2)){ 
	 if($rHq2['DR']=='Y'){$M='Dr.';} elseif($rHq2['Gender']=='M'){$M='Mr.';} elseif($rHq2['Gender']=='F' AND $rHq2['Married']=='Y'){$M='Mrs.';} elseif($rHq2['Gender']=='F' AND $rHq2['Married']=='N'){$M='Miss.';} $Ename=$rHq2['Fname'].' '.$rHq2['Sname'].' '.$rHq2['Lname']; ?>
	 <option value="<?php echo $rHq2['HqId']; ?>"><?php echo strtoupper($rHq2['HqName']); ?></option><?php } ?>
	 <?php } ?>	 	 
	 </select>
	</td>
	<td style="width:1px;"></td>
	<td>
     <select id="crp" name="crp" style="height:22px;font-family:Times New Roman;font-size:14px;width:150px;background-color:<?php if($_REQUEST['crp']>0){echo '#B6FF6C';}?>;" onChange="FunCrp(this.value)" >
     <option value="0" <?php if($_REQUEST['crp']==0){ echo 'selected'; } ?>>SELECT CROP</option>
	 <option value="1" <?php if($_REQUEST['crp']==1){ echo 'selected'; } ?>>VEGETABLE CROP</option>
	 <option value="2" <?php if($_REQUEST['crp']==2){ echo 'selected'; } ?>>FIELD CROP</option>
	 <option value="3" <?php if($_REQUEST['crp']==3){ echo 'selected'; } ?>>ALL CROP</option>
	 </select>
   </td>
   <td style="width:1px;"></td>
	<td>
     <select id="ii" name="ii" style="height:22px;font-family:Times New Roman;font-size:14px;width:130px;background-color:<?php if($_REQUEST['ii']>0){echo '#B6FF6C';}?>;" onChange="FunIi(this.value)" <?php if($_REQUEST['crp']==0){echo 'disabled';} ?>>
	 <?php if($_REQUEST['ii']>0){ $sqlI1=mysql_query("select ItemName from hrm_sales_seedsitem where ItemId=".$_REQUEST['ii'], $con); $resI1=mysql_fetch_assoc($sqlI1); ?>
	 <option value="<?php echo $_REQUEST['ii']; ?>"><?php echo strtoupper($resI1['ItemName']); ?></option>
	 <?php } else { ?><option value="0">SELECT ITEMS</option><?php } ?>
	 
	 <?php if($_REQUEST['crp']>0){?>
     <?php if($_REQUEST['crp']==1 OR $_REQUEST['crp']==2){ $sI=mysql_query("select ItemId,ItemName from hrm_sales_seedsitem where GroupId=".$_REQUEST['crp']." order by ItemName ASC", $con); } elseif($_REQUEST['crp']==3){ $sI=mysql_query("select ItemId,ItemName from hrm_sales_seedsitem order by ItemName ASC", $con); }
	 while($rI=mysql_fetch_assoc($sI)){ ?><option value="<?php echo $rI['ItemId']; ?>"><?php echo strtoupper($rI['ItemName']); ?></option><?php } ?>
	 <?php } ?>	
	 </select>
   </td>
   <td style="width:1px;"></td>
   <td><input type="button" style="height:26px;font-family:Times New Roman;font-size:14px;width:100px;background-color:#B6FF6C;font-weight:bold;" onClick="FunBtnClick(1)" value="Click" <?php if($_REQUEST['SelHq']>0 OR $_REQUEST['SelHq']=='All'){echo '';}else{echo 'disabled';} ?> /></td>
   <td style="width:5px;"></td>
   <td><input type="button" style="height:26px;font-family:Times New Roman;font-size:14px;width:100px;background-color:#FFFFA6;font-weight:bold;" onClick="FunExport(1)" value="Export" <?php if($_REQUEST['Bclick']==0){echo 'disabled';} ?> /></td>
   </tr>
  </table> 
 </td>
 <td id="TD2" style="display:<?php if($_REQUEST['DisWise']==1){echo 'block';}else{echo 'none';} ?>;">
 <?php /*************** DEALER WISE DEALER WISE  */ ?>
  <table>
   <tr>
    <td>
     <select id="yi" name="yi" style="height:22px;font-family:Times New Roman;font-size:14px;width:100px;background-color:<?php if($_REQUEST['yi']>0){echo '#B6FF6C';}?>;" onChange="FunYr(this.value)" >
	 <?php if($_REQUEST['yi']>0){ $sqlYr1=mysql_query("select FromDate,ToDate from hrm_year where YearId=".$_REQUEST['yi'], $con); $resYr1=mysql_fetch_assoc($sqlYr1); ?>
	 <option value="<?php echo $_REQUEST['yi']; ?>"><?php echo date("Y",strtotime($resYr1['FromDate'])).'-'.date("Y",strtotime($resYr1['ToDate'])); ?></option>
	 <?php } else { ?><option value="0">SELECT YEAR</option><?php } ?>
	 <option value="8">2019-2020</option><option value="7">2018-2019</option><option value="6">2017-2018</option>
	 <option value="5">2016-2017</option><option value="4">2015-2016</option>
	 <option value="3">2014-2015</option>
	 </select>
   </td>
    <td style="width:1px;"></td>
    <td>
	 <select id="SelName" name="SelName" style="width:180px;height:22px;font-family:Times New Roman;font-size:14px;background-color:<?php if($_REQUEST['SelName']>0){echo '#B6FF6C';}?>;" onChange="FunSelName(this.value)">
	 <?php if($_REQUEST['SelName']>0){ $sqlName1=mysql_query("select Fname,Sname,Lname from hrm_employee where EmployeeID=".$_REQUEST['SelName'], $con); $resName1=mysql_fetch_assoc($sqlName1); ?>
	 <option value="<?php echo $_REQUEST['SelName']; ?>"><?php echo strtoupper($resName1['Fname'].' '.$resName1['Sname'].' '.$resName1['Lname']); ?></option>
	 <?php } elseif($_REQUEST['SelName']=='All') { ?><option value="All">All MY TEAM</option>
	 <?php } else { ?><option value="0">SELECT NAME</option><?php } ?>
	 
     <?php if($_REQUEST['rpt']==0){ ?>
     <?php $sName=mysql_query("select Fname,Sname,Lname from hrm_employee where EmployeeID=".$EmployeeId, $con); while($rName=mysql_fetch_assoc($sName)){ ?>
	 <option value="<?php echo $EmployeeId; ?>"><?php echo strtoupper($rName['Fname'].' '.$rName['Sname'].' '.$rName['Lname']); ?></option><?php } ?>
	 
	 <?php } elseif($_REQUEST['rpt']>0){ ?>
<?php $sHqck=mysql_query("select * from hrm_sales_hq_temp where EmployeeID=".$EmployeeId." AND HqTEmpStatus='A'",$con); $rowHqck=mysql_num_rows($sHqck);
	 if($rowHqck==0){$sName2=mysql_query("select hrm_employee.EmployeeID,Fname,Sname,Lname,Gender,DR,Married from hrm_employee_general INNER JOIN hrm_employee_personal ON hrm_employee_general.EmployeeID=hrm_employee_personal.EmployeeID INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee_general.RepEmployeeID=".$EmployeeId." AND hrm_employee_general.DepartmentId=6 AND hrm_employee.EmpStatus='A' order by Fname ASC", $con); }
	 elseif($rowHqck>0){$sName2=mysql_query("select hrm_employee.EmployeeID,Fname,Sname,Lname,Gender,DR,Married from hrm_employee_general INNER JOIN hrm_employee_personal ON hrm_employee_general.EmployeeID=hrm_employee_personal.EmployeeID INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where (hrm_employee_general.EmployeeID=".$EmployeeId." OR hrm_employee_general.RepEmployeeID=".$EmployeeId.") AND hrm_employee_general.DepartmentId=6 AND hrm_employee.EmpStatus='A' order by Fname ASC", $con);}
	  while($rName2=mysql_fetch_assoc($sName2)){ 
	 if($rName2['DR']=='Y'){$M='Dr.';} elseif($rName2['Gender']=='M'){$M='Mr.';} elseif($rName2['Gender']=='F' AND $rName2['Married']=='Y'){$M='Mrs.';} elseif($rName2['Gender']=='F' AND $rName2['Married']=='N'){$M='Miss.';} $Ename=$rName2['Fname'].' '.$rName2['Sname'].' '.$rName2['Lname']; ?>
	 <option value="<?php echo $rName2['EmployeeID']; ?>"><?php echo strtoupper($Ename); ?></option><?php } ?>
	 <?php } ?>	 
	 </select>
	</td> 
	<td style="width:1px;"></td>
    <td>
	 <select id="SelHq" name="SelHq" style="width:150px;height:22px;font-family:Times New Roman;font-size:14px;background-color:<?php if($_REQUEST['SelHq']>0){echo '#B6FF6C';}?>;" onChange="FunSelHq(this.value)" <?php if($_REQUEST['SelName']==0){echo 'disabled';} ?>>
	 <?php if($_REQUEST['SelHq']>0){ $sqlHq1=mysql_query("select HqName from hrm_headquater where HqId=".$_REQUEST['SelHq'], $con); $resHq1=mysql_fetch_assoc($sqlHq1); ?>
	 <option value="<?php echo $_REQUEST['SelHq']; ?>"><?php echo strtoupper($resHq1['HqName']); ?></option>
	 <?php } else { ?><option value="0">SELECT HQ</option><?php } ?>
<?php $sqlRptN=mysql_query("select hrm_employee_general.EmployeeID from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where DepartmentId=6 AND hrm_employee.EmpStatus='A' AND RepEmployeeID=".$_REQUEST['SelName'], $con); $rowRptN=mysql_num_rows($sqlRptN); ?>	 
	 
     <?php if($rowRptN==0){ ?>
     <?php $sHq=mysql_query("select hrm_sales_hq_temp.HqId,HqName from hrm_sales_hq_temp INNER JOIN hrm_headquater ON hrm_sales_hq_temp.HqId=hrm_headquater.HqId where hrm_sales_hq_temp.EmployeeID=".$_REQUEST['SelName']." AND hrm_sales_hq_temp.HqTEmpStatus='A' order by HqName ASC", $con); while($rHq=mysql_fetch_assoc($sHq)){ ?>
	 <option value="<?php echo $rHq['HqId']; ?>"><?php echo strtoupper($rHq['HqName']); ?></option><?php } ?>
	  <?php } elseif($rowRptN>0 AND $_REQUEST['SelName']!=$EmployeeId){ ?>
	 <?php $sHq2=mysql_query("select hrm_employee.EmployeeID,Fname,Sname,Lname,Gender,DR,Married,hrm_sales_hq_temp.HqId,HqName from hrm_employee_general INNER JOIN hrm_sales_hq_temp ON hrm_employee_general.EmployeeID=hrm_sales_hq_temp.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee_general.EmployeeID=hrm_employee_personal.EmployeeID INNER JOIN hrm_headquater ON hrm_sales_hq_temp.HqId=hrm_headquater.HqId INNER JOIN hrm_employee ON hrm_sales_hq_temp.EmployeeID=hrm_employee.EmployeeID where (hrm_sales_hq_temp.EmployeeID=".$_REQUEST['SelName']." OR hrm_employee_general.RepEmployeeID=".$_REQUEST['SelName'].") AND hrm_employee_general.DepartmentId=6 AND hrm_employee.EmpStatus='A' AND hrm_sales_hq_temp.HqTEmpStatus='A' order by HqName ASC", $con); while($rHq2=mysql_fetch_assoc($sHq2)){ 
	 if($rHq2['DR']=='Y'){$M='Dr.';} elseif($rHq2['Gender']=='M'){$M='Mr.';} elseif($rHq2['Gender']=='F' AND $rHq2['Married']=='Y'){$M='Mrs.';} elseif($rHq2['Gender']=='F' AND $rHq2['Married']=='N'){$M='Miss.';} $Ename=$rHq2['Fname'].' '.$rHq2['Sname'].' '.$rHq2['Lname']; ?>
	 <option value="<?php echo $rHq2['HqId']; ?>"><?php echo strtoupper($rHq2['HqName']); ?></option><?php } ?>
	 <?php } elseif($rowRptN>0 AND $_REQUEST['SelName']==$EmployeeId){ ?>
	 <?php $sHq2=mysql_query("select hrm_employee.EmployeeID,Fname,Sname,Lname,Gender,DR,Married,hrm_sales_hq_temp.HqId,HqName from hrm_employee_general INNER JOIN hrm_sales_hq_temp ON hrm_employee_general.EmployeeID=hrm_sales_hq_temp.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee_general.EmployeeID=hrm_employee_personal.EmployeeID INNER JOIN hrm_headquater ON hrm_sales_hq_temp.HqId=hrm_headquater.HqId INNER JOIN hrm_employee ON hrm_sales_hq_temp.EmployeeID=hrm_employee.EmployeeID where hrm_sales_hq_temp.EmployeeID=".$_REQUEST['SelName']." AND hrm_employee_general.DepartmentId=6 AND hrm_employee.EmpStatus='A' AND hrm_sales_hq_temp.HqTEmpStatus='A' order by HqName ASC", $con); while($rHq2=mysql_fetch_assoc($sHq2)){ 
	 if($rHq2['DR']=='Y'){$M='Dr.';} elseif($rHq2['Gender']=='M'){$M='Mr.';} elseif($rHq2['Gender']=='F' AND $rHq2['Married']=='Y'){$M='Mrs.';} elseif($rHq2['Gender']=='F' AND $rHq2['Married']=='N'){$M='Miss.';} $Ename=$rHq2['Fname'].' '.$rHq2['Sname'].' '.$rHq2['Lname']; ?>
	 <option value="<?php echo $rHq2['HqId']; ?>"><?php echo strtoupper($rHq2['HqName']); ?></option><?php } ?>
	 <?php } ?>	 	 
	 </select>
	</td>
    <td style="width:1px;"></td>
	<td>
	 <select id="SelDis" name="SelDis" style="width:150px;height:22px;font-family:Times New Roman;font-size:14px;background-color:<?php if($_REQUEST['SelDis']>0){echo '#B6FF6C';}?>;" onChange="FunSelDis(this.value)" <?php if($_REQUEST['SelHq']==0){echo 'disabled';} ?>>
 <?php if($_REQUEST['SelDis']>0){$sqlDis1=mysql_query("select DealerName from hrm_sales_dealer where DealerId=".$_REQUEST['SelDis'], $con); $resDis1=mysql_fetch_assoc($sqlDis1);?>
	 <option value="<?php echo $_REQUEST['SelDis']; ?>"><?php echo strtoupper($resDis1['DealerName']); ?></option>
	 <?php } else { ?><option value="0">SELECT DEALER</option><?php } ?>
	 
     <?php if($_REQUEST['SelHq']>0){ ?>
     <?php $sDis=mysql_query("select DealerId,DealerName from hrm_sales_dealer where HqId=".$_REQUEST['SelHq']." order by DealerName ASC", $con); 
	 while($rDis=mysql_fetch_assoc($sDis)){ ?><option value="<?php echo $rDis['DealerId']; ?>"><?php echo strtoupper($rDis['DealerName']); ?></option><?php } ?>
	 <?php } ?>	 
	 </select>
	</td>
	<td style="width:1px;"></td>
	<td>
     <select id="crp" name="crp" style="height:22px;font-family:Times New Roman;font-size:14px;width:150px;background-color:<?php if($_REQUEST['crp']>0){echo '#B6FF6C';}?>;" onChange="FunCrp(this.value)">
     <option value="0" <?php if($_REQUEST['crp']==0){ echo 'selected'; } ?>>SELECT CROP</option>
	 <option value="1" <?php if($_REQUEST['crp']==1){ echo 'selected'; } ?>>VEGETABLE CROP</option>
	 <option value="2" <?php if($_REQUEST['crp']==2){ echo 'selected'; } ?>>FIELD CROP</option>
	 <option value="3" <?php if($_REQUEST['crp']==3){ echo 'selected'; } ?>>ALL CROP</option>
	 </select>
   </td>
   <td style="width:1px;"></td>
	<td>
     <select id="ii" name="ii" style="height:22px;font-family:Times New Roman;font-size:14px;width:130px;background-color:<?php if($_REQUEST['ii']>0){echo '#B6FF6C';}?>;" onChange="FunIi(this.value)" <?php if($_REQUEST['crp']==0){echo 'disabled';} ?>>
	 <?php if($_REQUEST['ii']>0){ $sqlI1=mysql_query("select ItemName from hrm_sales_seedsitem where ItemId=".$_REQUEST['ii'], $con); $resI1=mysql_fetch_assoc($sqlI1); ?>
	 <option value="<?php echo $_REQUEST['ii']; ?>"><?php echo strtoupper($resI1['ItemName']); ?></option>
	 <?php } else { ?><option value="0">SELECT ITEMS</option><?php } ?>
	 
	 <?php if($_REQUEST['crp']>0){?>
     <?php if($_REQUEST['crp']==1 OR $_REQUEST['crp']==2){ $sI=mysql_query("select ItemId,ItemName from hrm_sales_seedsitem where GroupId=".$_REQUEST['crp']." order by ItemName ASC", $con); } elseif($_REQUEST['crp']==3){ $sI=mysql_query("select ItemId,ItemName from hrm_sales_seedsitem order by ItemName ASC", $con); }
	 while($rI=mysql_fetch_assoc($sI)){ ?><option value="<?php echo $rI['ItemId']; ?>"><?php echo strtoupper($rI['ItemName']); ?></option><?php } ?>
	 <?php } ?>	
	 </select>
   </td>
   <td style="width:1px;"></td>
   <td><input type="button" style="height:26px;font-family:Times New Roman;font-size:14px;width:100px;background-color:#B6FF6C;font-weight:bold;" onClick="FunBtnClick(2)" value="Click" <?php if($_REQUEST['SelDis']==0){echo 'disabled';} ?> /></td>
   <td style="width:1px;"></td>
   <td><input type="button" style="height:26px;font-family:Times New Roman;font-size:14px;width:100px;background-color:#FFFFA6;font-weight:bold;" onClick="FunExport(2)" value="Export" <?php if($_REQUEST['Bclick']==0){echo 'disabled';} ?> /></td>
   </tr>
  
  </table> 
 </td>
</tr>
</table>
<?php /******************************************* Selection Close  ****************************/  ?>	
<?php /******************************************* Selection Close  ****************************/  ?>	
    
	</td>
   </tr>
   <tr>
	<td colspan="10" style="width:100%;">
<?php $BeforeYId2=$_REQUEST['yi']-2; $BeforeYId=$_REQUEST['yi']-1; $AfterYId=$_REQUEST['yi']+1; 	
//$sqlY1=mysql_query("select FromDate,ToDate from hrm_sales_year where YearId=".$BeforeYId2, $con); 
$sqlY2=mysql_query("select FromDate,ToDate from hrm_sales_year where YearId=".$BeforeYId, $con);  
$sqlY3=mysql_query("select FromDate,ToDate from hrm_sales_year where YearId=".$_REQUEST['yi'], $con); 
//$sqlY4=mysql_query("select FromDate,ToDate from hrm_sales_year where YearId=".$AfterYId, $con); 
//$resY1=mysql_fetch_assoc($sqlY1); 
$resY2=mysql_fetch_assoc($sqlY2); $resY3=mysql_fetch_assoc($sqlY3); 
//$resY4=mysql_fetch_assoc($sqlY4);
//$y1=date("y",strtotime($resY1['FromDate'])).'-'.date("y",strtotime($resY1['ToDate'])); 
$y2=date("y",strtotime($resY2['FromDate'])).'-'.date("y",strtotime($resY2['ToDate'])); 
//$y1T='<font color="#A60053">Ach.</font>'; 
$y2T='<font color="#A60053">Ach</font>';
$y3=date("y",strtotime($resY3['FromDate'])).'-'.date("y",strtotime($resY3['ToDate'])); 
//$y4=date("y",strtotime($resY4['FromDate'])).'-'.date("y",strtotime($resY4['ToDate'])); 
$y3T='<font color="#A60053">Tgt</font>'; //$y4T='<font color="#A60053">Proj.</font>';
//$y5=date("y",strtotime($resY3['FromDate'])).'-'.date("y",strtotime($resY3['ToDate']));
//$y5T='<font color="#A60053">YTD.</font>'; 
$my1='<font color="#A60053">'.date("y",strtotime($resY3['FromDate'])).'</font>'; 
$my2='<font color="#A60053">'.date("y",strtotime($resY3['ToDate'])).'</font>';
//$fy1=date("Y",strtotime($resY1['FromDate'])); $ty1=date("Y",strtotime($resY1['ToDate'])); 
$fy2=date("Y",strtotime($resY2['FromDate'])); $ty2=date("Y",strtotime($resY2['ToDate'])); 
$fy3=date("Y",strtotime($resY3['FromDate'])); $ty3=date("Y",strtotime($resY3['ToDate'])); 
//$fy4=date("Y",strtotime($resY4['FromDate'])); $ty4=date("Y",strtotime($resY4['ToDate'])); 
//$fy5=date("Y",strtotime($resY3['FromDate'])); $ty5=date("Y",strtotime($resY3['ToDate'])); 
?>  	

<?php /******************************************* Result Open  ****************************/  ?>
<?php /******************************************* Result Open  ****************************/  ?>
<?php if($_REQUEST['Bclick']==1){ ?>

<table border="1" cellpadding="0" cellspacing="0" style="font-family:Times New Roman;font-size:14px;width:100%;">
<?php /* ---TOTAL TOTAL TOTAL TOTAL TOTAL TOTAL OPEN OPEN OPEN OPEN OPEN OPEN OPEN OPEN*/ ?>
<?php /* ---TOTAL TOTAL TOTAL TOTAL TOTAL TOTAL OPEN OPEN OPEN OPEN OPEN OPEN OPEN OPEN */ ?>
<!--<div class="thead">
<thead> -->  
<tr style="height:22px;background-color:#D5F1D1;">
 <td colspan="5" align="center" style="font-size:12px;font-weight:bold;background-color:#FFFF80;">
  <?php if($_REQUEST['SteWise']>0){echo 'STATE WISE';}elseif($_REQUEST['NameWise']>0){echo 'NAME WISE';}elseif($_REQUEST['HqWise']>0){echo 'HEAD QUATER WISE';}elseif($_REQUEST['DisWise']>0){echo 'DISTRIBUTORES WISE';} ?>
 </td>
 <td class="Th50">APR</td><td class="Th50">MAY</td><td class="Th50">JUN</td>
 <td class="Th50" bgcolor="#FAD25A">Q1</td><td class="Th60" bgcolor="#FAD25A">Q1_Val</td>
 <td class="Th50">JUL</td><td class="Th60">AUG</td><td class="Th60">SEP</td>
 <td class="Th50" bgcolor="#FAD25A">Q2</td><td class="Th60" bgcolor="#FAD25A">Q2_Val</td>
 <td class="Th50">OCT</td><td class="Th60">NOV</td><td class="Th60">DEC</td>
 <td class="Th50" bgcolor="#FAD25A">Q3</td><td class="Th60" bgcolor="#FAD25A">Q3_Val</td>
 <td class="Th50">JAN</td><td class="Th60">FEB</td><td class="Th60">MAR</td>
 <td class="Th50" bgcolor="#FAD25A">Q4</td><td class="Th60" bgcolor="#FAD25A">Q4_Val</td>
 <td class="Th60">TOTAL<br><font color="#E67300">Kg</font></td>
 <td class="Th60">VALUE<br><font color="#E67300">Lakh</font></td> 

 <td rowspan="6" style="width:20px;">&nbsp;</td>
</tr>
<?php for($i=1; $i<=3; $i++){ ?>
<tr style="height:22px;background-color:<?php if($i==5){echo '#D2E9FF';}else{echo '#EEEEEE'; } ?>;"> 
 <?php if($i==1){ ?>
 <td rowspan="3" colspan="3" bgcolor="<?php if($i==1){echo '#B8E29C';}?>" align="right" style="font-size:15px;"><b><?php if($i==1){ ?>TOTAL:<?php } ?></b>&nbsp;</td><?php } ?>   	
<?php /*Start*/ 
if($i==1)
{ 
 $yset=$BeforeYId; $subquery='SUM(M1_Ach) as sM1,SUM(M2_Ach) as sM2,SUM(M3_Ach) as sM3,SUM(M4_Ach) as sM4,SUM(M5_Ach) as sM5,SUM(M6_Ach) as sM6,SUM(M7_Ach) as sM7,SUM(M8_Ach) as sM8,SUM(M9_Ach) as sM9,SUM(M10_Ach) as sM10,SUM(M11_Ach) as sM11,SUM(M12_Ach) as sM12'; $Lbl_1=$y2T; $Lbl_2=$y2; $Vv='A'; 
}
elseif($i==2)
{ 
 $yset=$_REQUEST['yi']; $subquery='SUM(M1) as sM1,SUM(M2) as sM2,SUM(M3) as sM3,SUM(M4) as sM4,SUM(M5) as sM5,SUM(M6) as sM6,SUM(M7) as sM7,SUM(M8) as sM8,SUM(M9) as sM9,SUM(M10) as sM10,SUM(M11) as sM11,SUM(M12) as sM12'; 
 $Lbl_1=$y3T; $Lbl_2=$y3; $Vv='B';
} 
elseif($i==3)
{ 
 $yset=$_REQUEST['yi']; $subquery='SUM(M1_Ach) as sM1,SUM(M2_Ach) as sM2,SUM(M3_Ach) as sM3,SUM(M4_Ach) as sM4,SUM(M5_Ach) as sM5,SUM(M6_Ach) as sM6,SUM(M7_Ach) as sM7,SUM(M8_Ach) as sM8,SUM(M9_Ach) as sM9,SUM(M10_Ach) as sM10,SUM(M11_Ach) as sM11,SUM(M12_Ach) as sM12'; $Lbl_1=$y2T; $Lbl_2=$y3; $Vv='C';
} 

/***********************************************************************************/
if($_REQUEST['SteWise']>0)
{
 if($_REQUEST['ii']>0){ $sqlPd=mysql_query("select ".$subquery." from hrm_sales_sal_details_".$yset." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_headquater hq ON d.HqId=hq.HqId where hq.StateId=".$_REQUEST['SteName']." AND sd.YearId=".$yset." AND sp.ProductSts='A' AND sp.ItemId=".$_REQUEST['ii'], $con); }
 else{ if($_REQUEST['crp']==1 OR $_REQUEST['crp']==2){ $sqlPd=mysql_query("select ".$subquery." from hrm_sales_sal_details_".$yset." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId INNER JOIN hrm_sales_seedsitem si ON sp.ItemId=si.ItemId INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_headquater hq ON d.HqId=hq.HqId where hq.StateId=".$_REQUEST['SteName']." AND si.GroupId=".$_REQUEST['crp']." AND sp.ProductSts='A' AND sd.YearId=".$yset, $con); } 
 if($_REQUEST['crp']==3){ $sqlPd=mysql_query("select ".$subquery." from hrm_sales_sal_details_".$yset." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_headquater hq ON d.HqId=hq.HqId where hq.StateId=".$_REQUEST['SteName']." AND sp.ProductSts='A' AND sd.YearId=".$yset, $con); }  } 
}
elseif($_REQUEST['NameWise']>0)
{
 if($_REQUEST['SelName']>0)
 {
 if($_REQUEST['ii']>0){ $sqlPd=mysql_query("select ".$subquery." from hrm_sales_sal_details_".$yset." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_sales_hq_temp hqt ON d.HqId=hqt.HqId INNER JOIN hrm_sales_reporting_level rl ON hqt.EmployeeID=rl.EmployeeID where HqTEmpStatus='A' AND (hqt.EmployeeID=".$_REQUEST['SelName']." OR rl.R1=".$_REQUEST['SelName']." OR rl.R2=".$_REQUEST['SelName']." OR rl.R3=".$_REQUEST['SelName']." OR rl.R4=".$_REQUEST['SelName']." OR rl.R5=".$_REQUEST['SelName'].") AND sd.YearId=".$yset." AND sp.ProductSts='A' AND sp.ItemId=".$_REQUEST['ii'], $con); }
  
 else{ if($_REQUEST['crp']==1 OR $_REQUEST['crp']==2){ $sqlPd=mysql_query("select ".$subquery." from hrm_sales_sal_details_".$yset." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId INNER JOIN hrm_sales_seedsitem si ON sp.ItemId=si.ItemId INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_sales_hq_temp hqt ON d.HqId=hqt.HqId INNER JOIN hrm_sales_reporting_level rl ON hqt.EmployeeID=rl.EmployeeID where HqTEmpStatus='A' AND (hqt.EmployeeID=".$_REQUEST['SelName']." OR rl.R1=".$_REQUEST['SelName']." OR rl.R2=".$_REQUEST['SelName']." OR rl.R3=".$_REQUEST['SelName']." OR rl.R4=".$_REQUEST['SelName']." OR rl.R5=".$_REQUEST['SelName'].") AND si.GroupId=".$_REQUEST['crp']." AND sp.ProductSts='A' AND sd.YearId=".$yset, $con); } 
 
 if($_REQUEST['crp']==3){ $sqlPd=mysql_query("select ".$subquery." from hrm_sales_sal_details_".$yset." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_sales_hq_temp hqt ON d.HqId=hqt.HqId INNER JOIN hrm_sales_reporting_level rl ON hqt.EmployeeID=rl.EmployeeID where HqTEmpStatus='A' AND (hqt.EmployeeID=".$_REQUEST['SelName']." OR rl.R1=".$_REQUEST['SelName']." OR rl.R2=".$_REQUEST['SelName']." OR rl.R3=".$_REQUEST['SelName']." OR rl.R4=".$_REQUEST['SelName']." OR rl.R5=".$_REQUEST['SelName'].") AND sp.ProductSts='A' AND sd.YearId=".$yset, $con); }  } 
 }
 if($_REQUEST['SelName']=='All')
 {
 if($_REQUEST['ii']>0){  $sqlPd=mysql_query("select ".$subquery." from hrm_sales_sal_details_".$yset." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_sales_hq_temp hqt ON d.HqId=hqt.HqId INNER JOIN hrm_sales_reporting_level rl ON hqt.EmployeeID=rl.EmployeeID where HqTEmpStatus='A' AND (hqt.EmployeeID=".$EmployeeId." OR rl.R1=".$EmployeeId." OR rl.R2=".$EmployeeId." OR rl.R3=".$EmployeeId." OR rl.R4=".$EmployeeId." OR rl.R5=".$EmployeeId.") AND sp.ProductSts='A' AND sd.YearId=".$yset." AND sp.ItemId=".$_REQUEST['ii'], $con); } 
 else{ if($_REQUEST['crp']==1 OR $_REQUEST['crp']==2){ $sqlPd=mysql_query("select ".$subquery." from hrm_sales_sal_details_".$yset." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId INNER JOIN hrm_sales_seedsitem si ON sp.ItemId=si.ItemId INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_sales_hq_temp hqt ON d.HqId=hqt.HqId INNER JOIN hrm_sales_reporting_level rl ON hqt.EmployeeID=rl.EmployeeID where HqTEmpStatus='A' AND (hqt.EmployeeID=".$EmployeeId." OR rl.R1=".$EmployeeId." OR rl.R2=".$EmployeeId." OR rl.R3=".$EmployeeId." OR rl.R4=".$EmployeeId." OR rl.R5=".$EmployeeId.") AND sp.ProductSts='A' AND sd.YearId=".$yset." AND si.GroupId=".$_REQUEST['crp'], $con); } 
 if($_REQUEST['crp']==3){ $sqlPd=mysql_query("select ".$subquery." from hrm_sales_sal_details_".$yset." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_sales_hq_temp hqt ON d.HqId=hqt.HqId INNER JOIN hrm_sales_reporting_level rl ON hqt.EmployeeID=rl.EmployeeID where HqTEmpStatus='A' AND (hqt.EmployeeID=".$EmployeeId." OR rl.R1=".$EmployeeId." OR rl.R2=".$EmployeeId." OR rl.R3=".$EmployeeId." OR rl.R4=".$EmployeeId." OR rl.R5=".$EmployeeId.") AND sp.ProductSts='A' AND sd.YearId=".$yset, $con); }  } 
 }
 
}
elseif($_REQUEST['HqWise']>0)
{
 if($_REQUEST['SelHq']>0)
 {
 if($_REQUEST['ii']>0){ $sqlPd=mysql_query("select ".$subquery." from hrm_sales_sal_details_".$yset." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId where sd.YearId=".$yset." AND sp.ItemId=".$_REQUEST['ii']." AND sp.ProductSts='A' AND d.HqId=".$_REQUEST['SelHq'], $con); } 
 else{ if($_REQUEST['crp']==1 OR $_REQUEST['crp']==2){ $sqlPd=mysql_query("select ".$subquery." from hrm_sales_sal_details_".$yset." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId INNER JOIN hrm_sales_seedsitem si ON sp.ItemId=si.ItemId INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId where si.GroupId=".$_REQUEST['crp']." AND sd.YearId=".$yset." AND sp.ProductSts='A' AND d.HqId=".$_REQUEST['SelHq'], $con); } 
 if($_REQUEST['crp']==3){ $sqlPd=mysql_query("select ".$subquery." from hrm_sales_sal_details_".$yset." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId where sd.YearId=".$yset." AND sp.ProductSts='A' AND d.HqId=".$_REQUEST['SelHq'], $con); }  } 
 }
 if($_REQUEST['SelHq']=='All')
 {
 if($_REQUEST['ii']>0){  $sqlPd=mysql_query("select ".$subquery." from hrm_sales_sal_details_".$yset." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_sales_hq_temp hqt ON d.HqId=hqt.HqId INNER JOIN hrm_employee_general g ON hqt.EmployeeID=g.EmployeeID where HqTEmpStatus='A' AND (hqt.EmployeeID=".$EmployeeId." OR g.RepEmployeeID=".$EmployeeId.") AND sp.ProductSts='A' AND sd.YearId=".$yset." AND sp.ItemId=".$_REQUEST['ii'], $con); } 
 else{ if($_REQUEST['crp']==1 OR $_REQUEST['crp']==2){ $sqlPd=mysql_query("select ".$subquery." from hrm_sales_sal_details_".$yset." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId INNER JOIN hrm_sales_seedsitem si ON sp.ItemId=si.ItemId INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_sales_hq_temp hqt ON d.HqId=hqt.HqId INNER JOIN hrm_employee_general g ON hqt.EmployeeID=g.EmployeeID where HqTEmpStatus='A' AND (hqt.EmployeeID=".$EmployeeId." OR g.RepEmployeeID=".$EmployeeId.") AND sd.YearId=".$yset." AND sp.ProductSts='A' AND si.GroupId=".$_REQUEST['crp'], $con); } 
 if($_REQUEST['crp']==3){ $sqlPd=mysql_query("select ".$subquery." from hrm_sales_sal_details_".$yset." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_sales_hq_temp hqt ON d.HqId=hqt.HqId INNER JOIN hrm_employee_general g ON hqt.EmployeeID=g.EmployeeID where HqTEmpStatus='A' AND (hqt.EmployeeID=".$EmployeeId." OR g.RepEmployeeID=".$EmployeeId.") AND sp.ProductSts='A' AND sd.YearId=".$yset, $con); }  } 
 }
 
}

elseif($_REQUEST['DisWise']>0)
{
 if($_REQUEST['ii']>0){ $sqlPd=mysql_query("select ".$subquery." from hrm_sales_sal_details_".$yset." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId where sd.YearId=".$yset." AND sp.ItemId=".$_REQUEST['ii']." AND sp.ProductSts='A' AND sd.DealerId=".$_REQUEST['SelDis'], $con); } 
 else{ if($_REQUEST['crp']==1 OR $_REQUEST['crp']==2){ $sqlPd=mysql_query("select ".$subquery." from hrm_sales_sal_details_".$yset." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId INNER JOIN hrm_sales_seedsitem si ON sp.ItemId=si.ItemId where si.GroupId=".$_REQUEST['crp']." AND sp.ProductSts='A' AND sd.YearId=".$yset." AND sd.DealerId=".$_REQUEST['SelDis'], $con); } if($_REQUEST['crp']==3){ $sqlPd=mysql_query("select ".$subquery." from hrm_sales_sal_details_".$yset." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId where sd.YearId=".$yset." AND sp.ProductSts='A' AND sd.DealerId=".$_REQUEST['SelDis'], $con); } } 
}
/***********************************************************************************/


$res=mysql_fetch_assoc($sqlPd);
$resTot=$res['sM1']+$res['sM2']+$res['sM3']+$res['sM4']+$res['sM5']+$res['sM6']+$res['sM7']+$res['sM8']+$res['sM9']+$res['sM10']+$res['sM11']+$res['sM12']; 
$TotQ1=$res['sM1']+$res['sM2']+$res['sM3']; $TotQ2=$res['sM4']+$res['sM5']+$res['sM6'];
$TotQ3=$res['sM7']+$res['sM8']+$res['sM9']; $TotQ4=$res['sM10']+$res['sM11']+$res['sM12'];
?>
  <td class="Th30"><b><?php echo $Lbl_1; ?></b></td><td class="Th40"><b><?php echo $Lbl_2; ?></b></td>
  <td class="Td50"><input type="text" style="width:100%;height:20px;text-align:right;font-size:11px;border:hidden;" value="<?php if($res['sM1']!=0){echo floatval($res['sM1']);} ?>" /></td>
  <td class="Td50"><input type="text" style="width:100%;height:20px;text-align:right;font-size:11px;border:hidden;" value="<?php if($res['sM2']!=0){echo floatval($res['sM2']);} ?>" /></td>
  <td class="Td50"><input type="text" style="width:100%;height:20px;text-align:right;font-size:11px;border:hidden;" value="<?php if($res['sM3']!=0){echo floatval($res['sM3']);} ?>" /></td>
  <td class="Td50" bgcolor="#FEE496"><input type="text" style="width:100%;height:20px;text-align:right;font-size:11px;border:hidden;background-color:#FEE496;" value="<?php if($TotQ1!=0){echo floatval($TotQ1);} ?>" /></td>
  <td class="Td60"><input type="text" id="TotVal_Q1<?php echo $Vv;?>" style="width:100%;height:20px;text-align:right;border:hidden;font-size:11px;background-color:#FEE496;" value="0" readonly/></td>
  
  <td class="Td50"><input type="text" style="width:100%;height:20px;text-align:right;font-size:11px;border:hidden;" value="<?php if($res['sM4']!=0){echo floatval($res['sM4']);} ?>" /></td>
  <td class="Td50"><input type="text" style="width:100%;height:20px;text-align:right;font-size:11px;border:hidden;" value="<?php if($res['sM5']!=0){echo floatval($res['sM5']);} ?>" /></td>
  <td class="Td50"><input type="text" style="width:100%;height:20px;text-align:right;font-size:11px;border:hidden;" value="<?php if($res['sM6']!=0){echo floatval($res['sM6']);} ?>" /></td>
  <td class="Td50" bgcolor="#FEE496"><input type="text" style="width:100%;height:20px;text-align:right;font-size:11px;border:hidden;background-color:#FEE496;" value="<?php if($TotQ2!=0){echo floatval($TotQ2);} ?>" /></td>
  <td class="Td60"><input type="text" id="TotVal_Q2<?php echo $Vv;?>" style="width:100%;height:20px;text-align:right;border:hidden;font-size:11px;background-color:#FEE496;" value="0" readonly/></td>
  
  <td class="Td50"><input type="text" style="width:100%;height:20px;text-align:right;font-size:11px;border:hidden;" value="<?php if($res['sM7']!=0){echo floatval($res['sM7']);} ?>" /></td>
  <td class="Td50"><input type="text" style="width:100%;height:20px;text-align:right;font-size:11px;border:hidden;" value="<?php if($res['sM8']!=0){echo floatval($res['sM8']);} ?>" /></td>
  <td class="Td50"><input type="text" style="width:100%;height:20px;text-align:right;font-size:11px;border:hidden;" value="<?php if($res['sM9']!=0){echo floatval($res['sM9']);} ?>" /></td>
  <td class="Td50" bgcolor="#FEE496"><input type="text" style="width:100%;height:20px;text-align:right;font-size:11px;border:hidden;background-color:#FEE496;" value="<?php if($TotQ3!=0){echo floatval($TotQ3);} ?>" /></td>
  <td class="Td60"><input type="text" id="TotVal_Q3<?php echo $Vv;?>" style="width:100%;height:20px;text-align:right;border:hidden;font-size:11px;background-color:#FEE496;" value="0" readonly/></td>
  
  <td class="Td50"><input type="text" style="width:100%;height:20px;text-align:right;font-size:11px;border:hidden;" value="<?php if($res['sM10']!=0){echo floatval($res['sM10']);} ?>" /></td>
  <td class="Td50"><input type="text" style="width:100%;height:20px;text-align:right;font-size:11px;border:hidden;" value="<?php if($res['sM11']!=0){echo floatval($res['sM11']);} ?>" /></td>
  <td class="Td50"><input type="text" style="width:100%;height:20px;text-align:right;font-size:11px;border:hidden;" value="<?php if($res['sM12']!=0){echo floatval($res['sM12']);} ?>" /></td>
  <td class="Td50" bgcolor="#FEE496"><input type="text" style="width:100%;height:20px;text-align:right;font-size:11px;border:hidden;background-color:#FEE496;" value="<?php if($TotQ4!=0){echo floatval($TotQ4);} ?>" /></td>
  <td class="Td60"><input type="text" id="TotVal_Q4<?php echo $Vv;?>" style="width:100%;height:20px;text-align:right;border:hidden;font-size:11px;background-color:#FEE496;" value="0" readonly/></td>
  
  <td class="Td60"><input type="text" style="width:100%;height:20px;text-align:right;border:hidden;font-size:11px;" value="<?php if($resTot!=0){echo floatval($resTot);} ?>" /></td> 
  <td class="Td60"><input type="text" id="TotVal_<?php echo $Vv;?>" style="width:100%;height:20px;text-align:right;border:hidden;font-size:11px; " value="0" readonly/></td>
 </tr>
<?php } ?> 
<script language="javascript">document.getElementById("TotVal_A").value=0; document.getElementById("TotVal_B").value=0;
  document.getElementById("TotVal_C").value=0;</script>
<?php /* ---TOTAL TOTAL TOTAL TOTAL TOTAL TOTAL CLOSE CLOSE CLOSE CLOSE CLOSE CLOSE CLOSE CLOSE*/ ?>
<?php /* ---TOTAL TOTAL TOTAL TOTAL TOTAL TOTAL CLOSE CLOSE CLOSE CLOSE CLOSE CLOSE CLOSE CLOSE */ ?>


<?php /*************************************** OPEN FIELD************************************************/ ?>
<?php /*************************************** OPEN FIELD************************************************/ ?> 

 <tr style="background-color:#D5F1D1;color:#000000;">
  <td colspan="5" align="center" style="font-size:12px;font-weight:bold;background-color:#FFFF80;">
   <?php if($_REQUEST['SteWise']>0 AND $_REQUEST['SteName']>0){ echo strtoupper($resSte['StateName']); }
	    elseif($_REQUEST['NameWise']>0){ if($_REQUEST['SelName']>0){echo strtoupper($resName1['Fname'].' '.$resName1['Sname'].' '.$resName1['Lname']);}
                                     if($_REQUEST['SelName']=='All'){echo 'All MY TEAM';} }
        elseif($_REQUEST['HqWise']>0){ if($_REQUEST['SelHq']>0){echo strtoupper($resHq1['HqName']);}if($_REQUEST['SelHq']=='All'){echo 'All HEAD QUARTER';} }
        elseif($_REQUEST['DisWise']>0){echo strtoupper($resDis1['DealerName']);} ?>
  </td>
  <td class="Th50" rowspan="2">APR</td><td class="Th50" rowspan="2">MAY</td><td class="Th50" rowspan="2">JUN</td>
  <td class="Th50" bgcolor="#FAD25A" rowspan="2">Q1</td><td class="Th60" rowspan="2" bgcolor="#FAD25A">Q1_Val</td>
  <td class="Th50" rowspan="2">JUL</td><td class="Th50" rowspan="2">AUG</td><td class="Th50" rowspan="2">SEP</td>
  <td class="Th50" bgcolor="#FAD25A" rowspan="2">Q2</td><td class="Th60" rowspan="2" bgcolor="#FAD25A">Q2_Val</td>
  <td class="Th50" rowspan="2">OCT</td><td class="Th50" rowspan="2">NOV</td><td class="Th50" rowspan="2">DEC</td>
  <td class="Th50" bgcolor="#FAD25A" rowspan="2">Q3</td><td class="Th60" rowspan="2" bgcolor="#FAD25A">Q3_Val</td>
  <td class="Th50" rowspan="2">JAN</td><td class="Th50" rowspan="2">FEB</td><td class="Th50" rowspan="2">MAR</td>
  <td class="Th50" bgcolor="#FAD25A" rowspan="2">Q4</td><td class="Th60" rowspan="2" bgcolor="#FAD25A">Q4_Val</td>
  <td class="Th60" rowspan="2"><b>TOTAL<br><font color="#E67300">Kg</font></b></td>
  <td class="Th60" rowspan="2"><b>VALUE<br><font color="#E67300">Lakh</font></b></td> 
 </tr>	
  <tr style="background-color:#D5F1D1;color:#000000;">  
   <td align="center" class="Th80" style="width:85px;">CROP</td>
   <td align="center" class="Th110" style="width:116px;">VARIETY</td>
   <td align="center" class="Th30">TYP</td>
   <td align="center" class="Th30" colspan="2">YEAR</td>
  </tr>	
 
<!--</thead> 
</div>-->
<?php /*************************************** CLOSE FIELD************************************************/ ?>
<?php /*************************************** CLOSE FIELD************************************************/ ?>
</table>

<div class="inner_table" style="width:100%;">
<table border="1" cellpadding="0" cellspacing="0" style="font-family:Times New Roman;font-size:14px;width:100%;"> 
<?php /*************************************** OPEN DATA DATA DATA FIELD ************************************************/ ?>
<!--<div class="tbody" id="table1">
<tbody>-->
<?php  
if($_REQUEST['ii']>0){$sql = mysql_query("select sp.ItemId,ProductId,ProductName,ItemName,ItemCode,TypeName from hrm_sales_seedsproduct sp INNER JOIN hrm_sales_seedsitem si ON sp.ItemId=si.ItemId INNER JOIN hrm_sales_seedtype st ON sp.TypeId=st.TypeId where si.ItemId=".$_REQUEST['ii']." AND sp.ProductSts='A' order by ItemName ASC, TypeName ASC, ProductName ASC", $con); }
else{ if($_REQUEST['crp']==1 OR $_REQUEST['crp']==2){$sql = mysql_query("select sp.ItemId,ItemCode,ProductId,ProductName,ItemName,TypeName from hrm_sales_seedsproduct sp INNER JOIN hrm_sales_seedsitem si ON sp.ItemId=si.ItemId INNER JOIN hrm_sales_seedtype st ON sp.TypeId=st.TypeId where si.GroupId=".$_REQUEST['crp']." AND sp.ProductSts='A' order by ItemName ASC, TypeName ASC, ProductName ASC", $con);} if($_REQUEST['crp']==3){$sql = mysql_query("select sp.ItemId,ProductId,ProductName,ItemName,ItemCode,TypeName from hrm_sales_seedsproduct sp INNER JOIN hrm_sales_seedsitem si ON sp.ItemId=si.ItemId INNER JOIN hrm_sales_seedtype st ON sp.TypeId=st.TypeId where sp.ProductSts='A' order by si.GroupId ASC, ItemName ASC, TypeName ASC, ProductName ASC", $con); }  }  $Sn=1; 
while($res=mysql_fetch_array($sql)){ 
for($i=1; $i<=3; $i++){ ?>
 <tr style="height:22px;background-color:<?php if($i==5){echo '#D2E9FF';}else{echo '#EEEEEE'; } ?>;">   
   <td bgcolor="<?php if($i==1){echo '#B8E29C';}?>" class="Td80"><input type="text" value="<?php if($i==1){echo $res['ItemCode'];}?>" style="border:hidden;width:100%;font-size:11px;height:20px;font-family:Times New Roman;"/></td>	 
   <td bgcolor="<?php if($i==1){echo '#B8E29C';}?>" class="Td110"><input type="text" value="<?php if($i==1){echo $res['ProductName'];}?>" style="border:hidden;width:100%;font-size:11px;height:20px;font-family:Times New Roman;" /></td>
   <td bgcolor="<?php if($i==1){echo '#B8E29C';}?>" align="center" class="Th30"><?php if($i==1){echo substr_replace($res['TypeName'],'',2);}?></td>	  
<?php /* Start */ 
if($i==1)
{ 
 $yset=$BeforeYId; $subquery='SUM(M1_Ach) as tm1,SUM(M2_Ach) as tm2,SUM(M3_Ach) as tm3,SUM(M4_Ach) as tm4,SUM(M5_Ach) as tm5,SUM(M6_Ach) as tm6,SUM(M7_Ach) as tm7,SUM(M8_Ach) as tm8,SUM(M9_Ach) as tm9,SUM(M10_Ach) as tm10,SUM(M11_Ach) as tm11,SUM(M12_Ach) as tm12';
 $Lbl_1=$y2T; $Lbl_2=$y2; $Vv='A';
 $fy=date("Y",strtotime($resY2['FromDate'])); $ty=date("Y",strtotime($resY2['ToDate'])); 
 
}
elseif($i==2)
{ 
 $yset=$_REQUEST['yi']; $subquery='SUM(M1) as tm1,SUM(M2) as tm2,SUM(M3) as tm3,SUM(M4) as tm4,SUM(M5) as tm5,SUM(M6) as tm6,SUM(M7) as tm7,SUM(M8) as tm8,SUM(M9) as tm9,SUM(M10) as tm10,SUM(M11) as tm11,SUM(M12) as tm12'; 
 $Lbl_1=$y3T; $Lbl_2=$y3; $Vv='B';
 $fy=date("Y",strtotime($resY3['FromDate'])); $ty=date("Y",strtotime($resY3['ToDate']));
} 
elseif($i==3)
{ 
 $yset=$_REQUEST['yi']; $subquery='SUM(M1_Ach) as tm1,SUM(M2_Ach) as tm2,SUM(M3_Ach) as tm3,SUM(M4_Ach) as tm4,SUM(M5_Ach) as tm5,SUM(M6_Ach) as tm6,SUM(M7_Ach) as tm7,SUM(M8_Ach) as tm8,SUM(M9_Ach) as tm9,SUM(M10_Ach) as tm10,SUM(M11_Ach) as tm11,SUM(M12_Ach) as tm12'; 
 $Lbl_1=$y2T; $Lbl_2=$y3; $Vv='C';
 $fy=date("Y",strtotime($resY3['FromDate'])); $ty=date("Y",strtotime($resY3['ToDate']));
} 

/**************************************************************************************/
if($_REQUEST['SteWise']>0 AND $_REQUEST['SteName']>0)
{ 
 $sqlPd=mysql_query("select ".$subquery." from hrm_sales_sal_details_".$yset." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_headquater hq ON d.HqId=hq.HqId where hq.StateId=".$_REQUEST['SteName']." AND sd.ProductId=".$res['ProductId']." AND sp.ProductSts='A' AND sd.YearId=".$yset, $con); 
}
elseif($_REQUEST['NameWise']>0)
{ 
 if($_REQUEST['SelName']>0)
 {
 $sqlPd=mysql_query("select ".$subquery." from hrm_sales_sal_details_".$yset." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_sales_hq_temp hqt ON d.HqId=hqt.HqId INNER JOIN hrm_sales_reporting_level rl ON hqt.EmployeeID=rl.EmployeeID where HqTEmpStatus='A' AND (hqt.EmployeeID=".$_REQUEST['SelName']." OR rl.R1=".$_REQUEST['SelName']." OR rl.R2=".$_REQUEST['SelName']." OR rl.R3=".$_REQUEST['SelName']." OR rl.R4=".$_REQUEST['SelName']." OR rl.R5=".$_REQUEST['SelName'].") AND sp.ProductSts='A' AND sd.ProductId=".$res['ProductId']." AND sd.YearId=".$yset, $con); 
 }
 if($_REQUEST['SelName']=='All')
 {
  $sqlPd=mysql_query("select ".$subquery." from hrm_sales_sal_details_".$yset." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_sales_hq_temp hqt ON d.HqId=hqt.HqId INNER JOIN hrm_sales_reporting_level rl ON hqt.EmployeeID=rl.EmployeeID where HqTEmpStatus='A' AND (hqt.EmployeeID=".$EmployeeId." OR rl.R1=".$EmployeeId." OR rl.R2=".$EmployeeId." OR rl.R3=".$EmployeeId." OR rl.R4=".$EmployeeId." OR rl.R5=".$EmployeeId.") AND sp.ProductSts='A' AND sd.ProductId=".$res['ProductId']." AND sd.YearId=".$yset, $con);
 }
}
elseif($_REQUEST['HqWise']>0)
{ 
 if($_REQUEST['SelHq']>0)
 {
 $sqlPd=mysql_query("select ".$subquery." from hrm_sales_sal_details_".$yset." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId where sd.YearId=".$yset." AND sd.ProductId=".$res['ProductId']." AND sp.ProductSts='A' AND d.HqId=".$_REQUEST['SelHq'], $con); 
 }
 if($_REQUEST['SelHq']=='All')
 {
  $sqlPd=mysql_query("select ".$subquery." from hrm_sales_sal_details_".$yset." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_sales_hq_temp hqt ON d.HqId=hqt.HqId INNER JOIN hrm_employee_general g ON hqt.EmployeeID=g.EmployeeID where HqTEmpStatus='A' AND (hqt.EmployeeID=".$EmployeeId." OR g.RepEmployeeID=".$EmployeeId.") AND sd.ProductId=".$res['ProductId']." AND sp.ProductSts='A' AND sd.YearId=".$yset, $con);
 }
}
elseif($_REQUEST['DisWise']>0)
{ $sqlPd=mysql_query("select ".$subquery." from hrm_sales_sal_details_".$yset." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId where sd.YearId=".$yset." AND sp.ProductSts='A' AND sd.ProductId=".$res['ProductId']." AND sd.DealerId=".$_REQUEST['SelDis'], $con); }
/**************************************************************************************/

$rs=mysql_fetch_assoc($sqlPd);
$rsTot=$rs['tm1']+$rs['tm2']+$rs['tm3']+$rs['tm4']+$rs['tm5']+$rs['tm6']+$rs['tm7']+$rs['tm8']+$rs['tm9']+$rs['tm10']+$rs['tm11']+$rs['tm12']; 
$rsTot1=$rs['tm1']+$rs['tm2']+$rs['tm3']; $rsTot2=$rs['tm4']+$rs['tm5']+$rs['tm6'];
$rsTot3=$rs['tm7']+$rs['tm8']+$rs['tm9']; $rsTot4=$rs['tm10']+$rs['tm11']+$rs['tm12']; ?>
<?php

if($i==2){include("Nrv_tgt.php");}
else{ include("Nrv.php"); } 
//include("Nrv.php");

$Net4=$rs['tm1']*$Nrv4;   $Net5=$rs['tm2']*$Nrv5;  $Net6=$rs['tm3']*$Nrv6;   $Net7=$rs['tm4']*$Nrv7; 
$Net8=$rs['tm5']*$Nrv8;   $Net9=$rs['tm6']*$Nrv9;  $Net10=$rs['tm7']*$Nrv10; $Net11=$rs['tm8']*$Nrv11; 
$Net12=$rs['tm9']*$Nrv12; $Net1=$rs['tm10']*$Nrv1; $Net2=$rs['tm11']*$Nrv2;  $Net3=$rs['tm12']*$Nrv3;

$NetNRV1=$Net4+$Net5+$Net6; $LakhNRV1=$NetNRV1/100000;
$NetNRV2=$Net7+$Net8+$Net9; $LakhNRV2=$NetNRV2/100000;
$NetNRV3=$Net10+$Net11+$Net12; $LakhNRV3=$NetNRV3/100000;
$NetNRV4=$Net1+$Net2+$Net3; $LakhNRV4=$NetNRV4/100000;
 
$NetNRV=$Net4+$Net5+$Net6+$Net7+$Net8+$Net9+$Net10+$Net11+$Net12+$Net1+$Net2+$Net3; 
$LakhNRV=$NetNRV/100000;

?>
  <td class="Th30"><b><?php echo $Lbl_1; ?></b></td><td class="Th30"><b><?php echo $Lbl_2; ?></b></td>
  <td class="Td50"><input type="text" style="width:100%;height:20px;text-align:right;font-size:11px;border:hidden;" value="<?php if($rs['tm1']!=0){echo floatval($rs['tm1']);} ?>" /></td>
  <td class="Td50"><input type="text" style="width:100%;height:20px;text-align:right;font-size:11px;border:hidden;" value="<?php if($rs['tm2']!=0){echo floatval($rs['tm2']);} ?>" /></td>
  <td class="Td50"><input type="text" style="width:100%;height:20px;text-align:right;font-size:11px;border:hidden;" value="<?php if($rs['tm3']!=0){echo floatval($rs['tm3']);} ?>" /></td>
  <td class="Td50" bgcolor="#FEE496"><input type="text" style="width:100%;height:20px;text-align:right;font-size:11px;border:hidden;background-color:#FEE496;" value="<?php if($rsTot1!=0){echo floatval($rsTot1);} ?>" /></td>
  <td class="Td60"><input type="text" style="width:100%;height:20px;text-align:right;font-size:11px;border:hidden;background-color:#FEE496;" value="<?php if($LakhNRV1!=0){echo round($LakhNRV1,4);} ?>" readonly /><input type="hidden" id="Q1<?php echo $Vv.''.$Sn;?>" value="<?php if($LakhNRV1!=0){echo round($LakhNRV1,4);}else{echo 0;} ?>" />
  <?php if($LakhNRV1!=0){$val1=$LakhNRV1;}else{$val1=0;} 
        if($Vv=='A'){ echo "<script>QFunATotal('Q1',".$val1.");</script>"; }
		elseif($Vv=='B'){ echo "<script>QFunBTotal('Q1',".$val1.");</script>"; }
		elseif($Vv=='C'){ echo "<script>QFunCTotal('Q1',".$val1.");</script>"; } ?>
  </td>  
  
  <td class="Td50"><input type="text" style="width:100%;height:20px;text-align:right;font-size:11px;border:hidden;" value="<?php if($rs['tm4']!=0){echo floatval($rs['tm4']);} ?>" /></td>
  <td class="Td50"><input type="text" style="width:100%;height:20px;text-align:right;font-size:11px;border:hidden;" value="<?php if($rs['tm5']!=0){echo floatval($rs['tm5']);} ?>" /></td>
  <td class="Td50"><input type="text" style="width:100%;height:20px;text-align:right;font-size:11px;border:hidden;" value="<?php if($rs['tm6']!=0){echo floatval($rs['tm6']);} ?>" /></td>
  <td class="Td50" bgcolor="#FEE496"><input type="text" style="width:100%;height:20px;text-align:right;font-size:11px;border:hidden;background-color:#FEE496;" value="<?php if($rsTot2!=0){echo floatval($rsTot2);} ?>" /></td>
  <td class="Td60"><input type="text" style="width:100%;height:20px;text-align:right;font-size:11px;border:hidden;background-color:#FEE496;" value="<?php if($LakhNRV2!=0){echo round($LakhNRV2,4);} ?>" readonly /><input type="hidden" id="Q2<?php echo $Vv.''.$Sn;?>" value="<?php if($LakhNRV2!=0){echo round($LakhNRV2,4);}else{echo 0;} ?>" />
  <?php if($LakhNRV2!=0){$val2=$LakhNRV2;}else{$val2=0;} 
        if($Vv=='A'){ echo "<script>QFunATotal('Q2',".$val2.");</script>"; }
		elseif($Vv=='B'){ echo "<script>QFunBTotal('Q2',".$val2.");</script>"; }
		elseif($Vv=='C'){ echo "<script>QFunCTotal('Q2',".$val2.");</script>"; } ?>
  </td> 
  
  <td class="Td50"><input type="text" style="width:100%;height:20px;text-align:right;font-size:11px;border:hidden;" value="<?php if($rs['tm7']!=0){echo floatval($rs['tm7']);} ?>" /></td>
  <td class="Td50"><input type="text" style="width:100%;height:20px;text-align:right;font-size:11px;border:hidden;" value="<?php if($rs['tm8']!=0){echo floatval($rs['tm8']);} ?>" /></td>
  <td class="Td50"><input type="text" style="width:100%;height:20px;text-align:right;font-size:11px;border:hidden;" value="<?php if($rs['tm9']!=0){echo floatval($rs['tm9']);} ?>" /></td>
  <td class="Td50" bgcolor="#FEE496"><input type="text" style="width:100%;height:20px;text-align:right;font-size:11px;border:hidden;background-color:#FEE496;" value="<?php if($rsTot3!=0){echo floatval($rsTot3);} ?>" /></td>
  <td class="Td60"><input type="text" style="width:100%;height:20px;text-align:right;font-size:11px;border:hidden;background-color:#FEE496;" value="<?php if($LakhNRV3!=0){echo round($LakhNRV3,4);} ?>" readonly /><input type="hidden" id="Q3<?php echo $Vv.''.$Sn;?>" value="<?php if($LakhNRV3!=0){echo round($LakhNRV3,4);}else{echo 0;} ?>" />
  <?php if($LakhNRV3!=0){$val3=$LakhNRV3;}else{$val3=0;} 
        if($Vv=='A'){ echo "<script>QFunATotal('Q3',".$val3.");</script>"; }
		elseif($Vv=='B'){ echo "<script>QFunBTotal('Q3',".$val3.");</script>"; }
		elseif($Vv=='C'){ echo "<script>QFunCTotal('Q3',".$val3.");</script>"; } ?>
  </td> 
  
  <td class="Td50"><input type="text" style="width:100%;height:20px;text-align:right;font-size:11px;border:hidden;" value="<?php if($rs['tm10']!=0){echo floatval($rs['tm10']);} ?>" /></td>
  <td class="Td50"><input type="text" style="width:100%;height:20px;text-align:right;font-size:11px;border:hidden;" value="<?php if($rs['tm11']!=0){echo floatval($rs['tm11']);} ?>" /></td>
  <td class="Td50"><input type="text" style="width:100%;height:20px;text-align:right;font-size:11px;border:hidden;" value="<?php if($rs['tm12']!=0){echo floatval($rs['tm12']);} ?>" /></td>
  <td class="Td50" bgcolor="#FEE496"><input type="text" style="width:100%;height:20px;text-align:right;font-size:11px;border:hidden;background-color:#FEE496;" value="<?php if($rsTot4!=0){echo floatval($rsTot4);} ?>" /></td>
  <td class="Td60"><input type="text" style="width:100%;height:20px;text-align:right;font-size:11px;border:hidden; background-color:#FEE496;" value="<?php if($LakhNRV4!=0){echo round($LakhNRV4,4);} ?>" readonly /><input type="hidden" id="Q4<?php echo $Vv.''.$Sn;?>" value="<?php if($LakhNRV4!=0){echo round($LakhNRV4,4);}else{echo 0;} ?>" />
  <?php if($LakhNRV4!=0){$val4=$LakhNRV4;}else{$val4=0;} 
        if($Vv=='A'){ echo "<script>QFunATotal('Q4',".$val4.");</script>"; }
		elseif($Vv=='B'){ echo "<script>QFunBTotal('Q4',".$val4.");</script>"; }
		elseif($Vv=='C'){ echo "<script>QFunCTotal('Q4',".$val4.");</script>"; } ?>
  </td> 
  	   	   
  <td class="Td60"><input type="text" style="width:100%;height:20px;text-align:right;font-size:11px;border:hidden;" value="<?php if($rsTot!=0){echo floatval($rsTot);} ?>" /></td>
  <td class="Td60"><input type="text" id="TotVal_E" style="width:100%;height:20px;text-align:right;font-size:11px;border:hidden;" value="<?php if($LakhNRV!=0){echo round($LakhNRV,4);} ?>" readonly />
  <input type="hidden" id="<?php echo $Vv.''.$Sn;?>" value="<?php if($LakhNRV>0){echo round($LakhNRV,4);}else{echo 0;} ?>" />
  <?php if($LakhNRV!=0){$val=$LakhNRV;}else{$val=0;} 
        if($Vv=='A'){ echo '<script>FunATotal('.$val.');</script>'; }
		elseif($Vv=='B'){ echo '<script>FunBTotal('.$val.');</script>'; }
		elseif($Vv=='C'){ echo '<script>FunCTotal('.$val.');</script>'; } ?>
  </td>    	   
 </tr> 
<?php } $Sn++; } $ActSn=$Sn-1; echo '<input type="hidden" id="ActSn" value="'.$ActSn.'" />'; ?>
</tbody>
</div>
<?php /******************** CLOSE DATA DATA DATA FIELD ***************************************/ ?>
<?php /******************** CLOSE DATA DATA DATA FIELD ***************************************/ ?>
</table>
</div>
<?php } ?>
<?php /******************************************* Result Close  ****************************/  ?>	
<?php /******************************************* Result Close  ****************************/  ?>

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
<?php //********************************************* Close ************************************ ?>
				  </table>
				 </td>
			  </tr>
			</table>
           </td>
			  </tr>
	        </table>
			
<?php //***************************************************************************************** ?>
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
<script language="javascript">
document.getElementById("TotVal_A").value=document.getElementById("TotVal_A").value; 
document.getElementById("TotVal_B").value=document.getElementById("TotVal_B").value;
document.getElementById("TotVal_C").value=document.getElementById("TotVal_C").value;
</script>
