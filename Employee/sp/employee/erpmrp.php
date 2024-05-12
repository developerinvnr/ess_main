<?php session_start();
if($_SESSION['login'] = true){require_once('../user/config/config.php');}
include("../function.php");
if(check_user()==false){header('Location:../../../index.php');}
$EmployeeId=$_SESSION['EmployeeID'];
$m=$_REQUEST['m']; $y=$_REQUEST['y']; $hq=$_REQUEST['hq']; 
$s=$_REQUEST['s']; $crop=$_REQUEST['crop']; $branch=$_REQUEST['branch']; 

if($_REQUEST['action']=='setNewProd')
{ 
 $spd=mysql_query("select TypeId from hrm_sales_seedsproduct where ProductId=".$_REQUEST['prod'],$con);
 $rpd=mysql_fetch_assoc($spd);
 $sin=mysql_query("insert into erp_mrp(MrpMonth, MrpYear, MrpDate, BranchId, ProductId, TypeId, SizeId, FilledBy_Stock, Crd, YId) values(".$_REQUEST['m'].", ".$_REQUEST['yy'].", '".date("Y-m-d")."', ".$_REQUEST['branch'].", ".$_REQUEST['prod'].", ".$rpd['TypeId'].", ".$_REQUEST['size'].", ".$_REQUEST['ei'].", '".date("Y-m-d")."', ".$_REQUEST['y'].")",$con2);
 
 if($sin)
 {
  for($i=1; $i<=$_REQUEST['sn']; $i++)
  {  
   $s2in=mysql_query("insert into erp_mrp_require(ReqMrpMonth, ReqMrpYear, ReqMrpDate, BranchId, StateId, ProductId, TypeId, SizeId, RequireQty, FilledBy_RequireQty, Crd, YId) values(".$_REQUEST['m'].", ".$_REQUEST['yy'].", '".date("Y-m-d")."', ".$_REQUEST['branch'].", ".$_REQUEST['s'.$i].", ".$_REQUEST['prod'].", ".$rpd['TypeId'].", ".$_REQUEST['size'].", ".$_REQUEST['r'.$i].", ".$_REQUEST['ei'].", '".date("Y-m-d")."', ".$_REQUEST['y'].")",$con2);
  
  }
 }
  if($s2in)
  {
   header("location:erpmrp.php?ac=2441&ee=2421&der=true2&c=false&trht=FTF%%F1&tt=valuased&m=".$_REQUEST['m']."&y=".$_REQUEST['y']."&filter=zero&s=0&hq=".$_REQUEST['hq']."&dis=0&crop=0&branch=".$_REQUEST['branch']);
   exit();
  }
 
 
}

?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style> 
.td1{font-family:Times New Roman;color:#000;font-weight:bold;text-align:center;font-size:14px;background-color:#97FFFF;height:24px;}.td2{font-family:Times New Roman;color:#000;text-align:center;font-size:12px;background-color:#FFFFFF;}.td3{font-family:Times New Roman;color:#000;font-size:14px;background-color:#FFFFFF;height:22px;text-transform:capitalize;}.td4{font-family:Times New Roman;color:#000;font-size:12px;background-color:#FFFFFF;text-align:right;}.htf{font-family:Georgia;color:#FF80FF;font-weight:bold;text-align:center;font-size:18px;height:24px;}.tdf{font-family:Times New Roman;font-size:14px;color:#fff;}.InputSel {font-family:Georgia;font-size:12px;text-align:left; }.itd4{font-family:Times New Roman;color:#000;font-size:13px;background-color:#FFFFFF;width:100%;border:hidden;text-align:right;}.itd3{font-family:Times New Roman;color:#000;font-size:13px;background-color:#FFFFFF;width:100%;border:hidden;}
</style>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<script src="js/jquery-1.9.1.js"></script>
<script type="text/javascript" src="js/jquery.freezeheader.js"></script>
<Script language="javascript">
function FunRef(m,y,s,hq,branch)
{ window.location="erpmrp.php?ac=2441&ee=2421&der=true2&c=false&trht=FTF%%F1&tt=valuased&m="+m+"&y="+y+"&filter=zero&s="+s+"&hq="+hq+"&dis=0&crop=0&branch="+branch; }
function funmonth(m,y,s,hq,branch)
{ window.location="erpmrp.php?ac=2441&ee=2421&der=true2&c=false&trht=FTF%%F1&tt=valuased&m="+m+"&y="+y+"&filter=zero&s="+s+"&hq="+hq+"&dis=0&crop=0&branch="+branch; }
function funyear(y,m,s,hq,branch)
{ window.location="erpmrp.php?ac=2441&ee=2421&der=true2&c=false&trht=FTF%%F1&tt=valuased&m="+m+"&y="+y+"&filter=zero&s="+s+"&hq="+hq+"&dis=0&crop=0&branch="+branch;}
function funbranch(branch,m,y,s,hq)
{ window.location="erpmrp.php?ac=2441&ee=2421&der=true2&c=false&trht=FTF%%F1&tt=valuased&m="+m+"&y="+y+"&filter=zero&s="+s+"&hq="+hq+"&dis=0&crop=0&branch="+branch; }

function FunEdit(sn,n)
{
 document.getElementById("Edit"+n).style.display='none';document.getElementById("Save"+n).style.display='block';
 for(var i=1; i<=sn; i++)
 {
  document.getElementById("td"+i+"_"+n).style.background='#FAEF6B';
  document.getElementById("ReqQty"+i+"_"+n).style.background='#FAEF6B';
  document.getElementById("ReqQty"+i+"_"+n).readOnly=false;
 }
}

function FunCheckEdit(sn)
{ 
 if(document.getElementById("chkId").checked==true)
 { 
  for(var i=1; i<=document.getElementById("rowc").value; i++)
  {
   document.getElementById("Edit"+i).style.display='none';
   document.getElementById("Save"+i).style.display='block';
   for(var j=1; j<=sn; j++)
   { 
    document.getElementById("td"+j+"_"+i).style.background='#FAEF6B';
    document.getElementById("ReqQty"+j+"_"+i).style.background='#FAEF6B';
    document.getElementById("ReqQty"+j+"_"+i).readOnly=false;
   }
  }
 }
 else
 {
  for(var i=1; i<=document.getElementById("rowc").value; i++)
  {
   document.getElementById("Edit"+i).style.display='block';
   document.getElementById("Save"+i).style.display='none';
   for(var j=1; j<=sn; j++)
   {
    document.getElementById("td"+j+"_"+i).style.background='#FFFFFF';
    document.getElementById("ReqQty"+j+"_"+i).style.background='#FFFFFF';
    document.getElementById("ReqQty"+j+"_"+i).readOnly=true;
   }
  }
 }
}


function funCalV(v,sn,n,stck)
{
 if(sn==1)
 {
  if(document.getElementById("ReqQty1_"+n).value==''){var req1=0;}
  else{var req1=parseFloat(document.getElementById("ReqQty1_"+n).value);}
  var tot=document.getElementById("TotReqQty"+n).value=req1; 
 }
 else if(sn==2)
 {
  if(document.getElementById("ReqQty1_"+n).value==''){var req1=0;}
  else{var req1=parseFloat(document.getElementById("ReqQty1_"+n).value);}
  if(document.getElementById("ReqQty2_"+n).value==''){var req2=0;}
  else{var req2=parseFloat(document.getElementById("ReqQty2_"+n).value);}
  var tot=document.getElementById("TotReqQty"+n).value=Math.round((req1+req2)*1000)/1000;
 }
 else if(sn==3)
 {
  if(document.getElementById("ReqQty1_"+n).value==''){var req1=0;}
  else{var req1=parseFloat(document.getElementById("ReqQty1_"+n).value);}
  if(document.getElementById("ReqQty2_"+n).value==''){var req2=0;}
  else{var req2=parseFloat(document.getElementById("ReqQty2_"+n).value);}
  if(document.getElementById("ReqQty3_"+n).value==''){var req3=0;}
  else{var req3=parseFloat(document.getElementById("ReqQty3_"+n).value);}
  var tot=document.getElementById("TotReqQty"+n).value=Math.round((req1+req2+req3)*1000)/1000;
 }
 else if(sn==4)
 {
  if(document.getElementById("ReqQty1_"+n).value==''){var req1=0;}
  else{var req1=parseFloat(document.getElementById("ReqQty1_"+n).value);}
  if(document.getElementById("ReqQty2_"+n).value==''){var req2=0;}
  else{var req2=parseFloat(document.getElementById("ReqQty2_"+n).value);}
  if(document.getElementById("ReqQty3_"+n).value==''){var req3=0;}
  else{var req3=parseFloat(document.getElementById("ReqQty3_"+n).value);}
  if(document.getElementById("ReqQty4_"+n).value==''){var req4=0;}
  else{var req4=parseFloat(document.getElementById("ReqQty4_"+n).value);}
  var tot=document.getElementById("TotReqQty"+n).value=Math.round((req1+req2+req3+req4)*1000)/1000;
 }
 else if(sn==5)
 {
  if(document.getElementById("ReqQty1_"+n).value==''){var req1=0;}
  else{var req1=parseFloat(document.getElementById("ReqQty1_"+n).value);}
  if(document.getElementById("ReqQty2_"+n).value==''){var req2=0;}
  else{var req2=parseFloat(document.getElementById("ReqQty2_"+n).value);}
  if(document.getElementById("ReqQty3_"+n).value==''){var req3=0;}
  else{var req3=parseFloat(document.getElementById("ReqQty3_"+n).value);}
  if(document.getElementById("ReqQty4_"+n).value==''){var req4=0;}
  else{var req4=parseFloat(document.getElementById("ReqQty4_"+n).value);}
  if(document.getElementById("ReqQty5_"+n).value==''){var req5=0;}
  else{var req5=parseFloat(document.getElementById("ReqQty5_"+n).value);}
  var tot=document.getElementById("TotReqQty"+n).value=Math.round((req1+req2+req3+req4+req5)*1000)/1000;
 }
  
  var diff=Math.round((stck-tot)*1000)/1000;
  if (diff<0){ var diffv = diff*(-1); document.getElementById("TotSplyQty"+n).value=diffv;  }
  else{ var diffv=diff; document.getElementById("TotSplyQty"+n).value=0; }
  
}


function saveD(n,hq,m,y,yy,ei,sn,pi,ti,szi,bi)
{
 document.getElementById("Numb").value=n; document.getElementById("Num2b").value=sn; 
 var r1=0; var r2=0; var r3=0; var r4=0; var r5=0; 
 var s1=0; var s2=0; var s3=0; var s4=0; var s5=0;
 if(sn==1)
 {
  if(document.getElementById("ReqQty1_"+n).value==''){var r1=0;}
  else{var r1=parseFloat(document.getElementById("ReqQty1_"+n).value);}
  var s1=document.getElementById("StateId1_"+n).value; 
 }
 else if(sn==2)
 {
  if(document.getElementById("ReqQty1_"+n).value==''){var r1=0;}
  else{var r1=parseFloat(document.getElementById("ReqQty1_"+n).value);}
  if(document.getElementById("ReqQty2_"+n).value==''){var r2=0;}
  else{var r2=parseFloat(document.getElementById("ReqQty2_"+n).value);}
  var s1=document.getElementById("StateId1_"+n).value; var s2=document.getElementById("StateId2_"+n).value;
 }
 else if(sn==3)
 {
  if(document.getElementById("ReqQty1_"+n).value==''){var r1=0;}
  else{var r1=parseFloat(document.getElementById("ReqQty1_"+n).value);}
  if(document.getElementById("ReqQty2_"+n).value==''){var r2=0;}
  else{var r2=parseFloat(document.getElementById("ReqQty2_"+n).value);}
  if(document.getElementById("ReqQty3_"+n).value==''){var r3=0;}
  else{var r3=parseFloat(document.getElementById("ReqQty3_"+n).value);} 
  var s1=document.getElementById("StateId1_"+n).value; var s2=document.getElementById("StateId2_"+n).value;
  var s3=document.getElementById("StateId3_"+n).value; 
 }
 else if(sn==4)
 {
  if(document.getElementById("ReqQty1_"+n).value==''){var r1=0;}
  else{var r1=parseFloat(document.getElementById("ReqQty1_"+n).value);}
  if(document.getElementById("ReqQty2_"+n).value==''){var r2=0;}
  else{var r2=parseFloat(document.getElementById("ReqQty2_"+n).value);}
  if(document.getElementById("ReqQty3_"+n).value==''){var r3=0;}
  else{var r3=parseFloat(document.getElementById("ReqQty3_"+n).value);}
  if(document.getElementById("ReqQty4_"+n).value==''){var r4=0;}
  else{var r4=parseFloat(document.getElementById("ReqQty4_"+n).value);}
  var s1=document.getElementById("StateId1_"+n).value; var s2=document.getElementById("StateId2_"+n).value;
  var s3=document.getElementById("StateId3_"+n).value; var s4=document.getElementById("StateId4_"+n).value;
 }
 else if(sn==5)
 {
  if(document.getElementById("ReqQty1_"+n).value==''){var r1=0;}
  else{var r1=parseFloat(document.getElementById("ReqQty1_"+n).value);}
  if(document.getElementById("ReqQty2_"+n).value==''){var r2=0;}
  else{var r2=parseFloat(document.getElementById("ReqQty2_"+n).value);}
  if(document.getElementById("ReqQty3_"+n).value==''){var r3=0;}
  else{var r3=parseFloat(document.getElementById("ReqQty3_"+n).value);}
  if(document.getElementById("ReqQty4_"+n).value==''){var r4=0;}
  else{var r4=parseFloat(document.getElementById("ReqQty4_"+n).value);}
  if(document.getElementById("ReqQty5_"+n).value==''){var r5=0;}
  else{var r5=parseFloat(document.getElementById("ReqQty5_"+n).value);}
  var s1=document.getElementById("StateId1_"+n).value; var s2=document.getElementById("StateId2_"+n).value;
  var s3=document.getElementById("StateId3_"+n).value; var s4=document.getElementById("StateId4_"+n).value;
  var s5=document.getElementById("StateId5_"+n).value;
 } 
 var url = 'erprcpmrpact.php'; var pars = 'action=setMrpv&m='+m+'&y='+y+'&sn='+sn+'&bi='+bi+'&pi='+pi+'&ti='+ti+'&szi='+szi+'&yy='+yy+'&ei='+ei+'&r1='+r1+'&r2='+r2+'&r3='+r3+'&r4='+r4+'&r5='+r5+'&s1='+s1+'&s2='+s2+'&s3='+s3+'&s4='+s4+'&s5='+s5; var myAjax = new Ajax.Request( url,{ method:'post', parameters:pars, onComplete:show_result});
 
}
function show_result(originalRequest)
{ document.getElementById('ResultSpan').innerHTML=originalRequest.responseText; 
  if(document.getElementById("vsts").value==1)
  { 
   var n=document.getElementById("Numb").value; var n2=document.getElementById("Num2b").value;
   document.getElementById("Edit"+n).style.display='block';
   document.getElementById("Save"+n).style.display='none';
   for(var i=1; i<=n2; i++)
   {
   document.getElementById("td"+i+"_"+n).style.background='#BCFF79';
   document.getElementById("ReqQty"+i+"_"+n).style.background='#BCFF79';
   document.getElementById("ReqQty"+i+"_"+n).readOnly=true;
   }
  }
  else if(document.getElementById("vsts").value==0){ alert("Error!"); }
}


function Fun2Edit(sn)
{
 document.getElementById("Edit").style.display='none';document.getElementById("Save").style.display='block';
 document.getElementById("Item").disabled=false; document.getElementById("Product").disabled=false;
 document.getElementById("Size").disabled=false;
 for(var i=1; i<=sn; i++)
 {
  document.getElementById("td"+i).style.background='#FAEF6B';
  document.getElementById("ReqQty"+i).style.background='#FAEF6B';
  document.getElementById("ReqQty"+i).readOnly=false;
 }
}

function IFun(v,m,yy,bi){ var url = 'erprcpmrpact.php'; var pars = 'action=setProduct&v='+v+'&m='+m+'&yy='+yy+'&bi='+bi; var myAjax = new Ajax.Request( url,{ method:'post', parameters:pars, onComplete:show_product}); }
function show_product(originalRequest){document.getElementById('PSpan').innerHTML=originalRequest.responseText;}

function PFun(v,m,yy,bi){ var url = 'erprcpmrpact.php'; var pars = 'action=setSize&v='+v+'&m='+m+'&yy='+yy+'&bi='+bi; var myAjax = new Ajax.Request( url,{ method:'post', parameters:pars, onComplete:show_size}); }
function show_size(originalRequest){document.getElementById('SSpan').innerHTML=originalRequest.responseText;}


function fun2CalV(v,sn)
{ 
 if(sn==1)
 {
  if(document.getElementById("ReqQty1").value==''){var req1=0;}
  else{var req1=parseFloat(document.getElementById("ReqQty1").value);}
  var tot=document.getElementById("Tot2ReqQty").value=req1; 
 }
 else if(sn==2)
 {
  if(document.getElementById("ReqQty1").value==''){var req1=0;}
  else{var req1=parseFloat(document.getElementById("ReqQty1").value);}
  if(document.getElementById("ReqQty2").value==''){var req2=0;}
  else{var req2=parseFloat(document.getElementById("ReqQty2").value);}
  var tot=document.getElementById("Tot2ReqQty").value=Math.round((req1+req2)*1000)/1000;
 }
 else if(sn==3)
 {
  if(document.getElementById("ReqQty1").value==''){var req1=0;}
  else{var req1=parseFloat(document.getElementById("ReqQty1").value);}
  if(document.getElementById("ReqQty2").value==''){var req2=0;}
  else{var req2=parseFloat(document.getElementById("ReqQty2").value);}
  if(document.getElementById("ReqQty3").value==''){var req3=0;}
  else{var req3=parseFloat(document.getElementById("ReqQty3").value);}
  var tot=document.getElementById("Tot2ReqQty").value=Math.round((req1+req2+req3)*1000)/1000;
 }
 else if(sn==4)
 {
  if(document.getElementById("ReqQty1").value==''){var req1=0;}
  else{var req1=parseFloat(document.getElementById("ReqQty1").value);}
  if(document.getElementById("ReqQty2").value==''){var req2=0;}
  else{var req2=parseFloat(document.getElementById("ReqQty2").value);}
  if(document.getElementById("ReqQty3").value==''){var req3=0;}
  else{var req3=parseFloat(document.getElementById("ReqQty3").value);}
  if(document.getElementById("ReqQty4").value==''){var req4=0;}
  else{var req4=parseFloat(document.getElementById("ReqQty4").value);}
  var tot=document.getElementById("Tot2ReqQty").value=Math.round((req1+req2+req3+req4)*1000)/1000;
 }
 else if(sn==5)
 {
  if(document.getElementById("ReqQty1").value==''){var req1=0;}
  else{var req1=parseFloat(document.getElementById("ReqQty1").value);}
  if(document.getElementById("ReqQty2").value==''){var req2=0;}
  else{var req2=parseFloat(document.getElementById("ReqQty2").value);}
  if(document.getElementById("ReqQty3").value==''){var req3=0;}
  else{var req3=parseFloat(document.getElementById("ReqQty3").value);}
  if(document.getElementById("ReqQty4").value==''){var req4=0;}
  else{var req4=parseFloat(document.getElementById("ReqQty4").value);}
  if(document.getElementById("ReqQty5").value==''){var req5=0;}
  else{var req5=parseFloat(document.getElementById("ReqQty5").value);}
  var tot=document.getElementById("Tot2ReqQty").value=Math.round((req1+req2+req3+req4+req5)*1000)/1000;
 }
 
}


function save2D(hq,m,y,yy,ei,sn,bi)
{ 
 if(document.getElementById("Product").value==0){alert("please select product!"); return false;}
 else if(document.getElementById("Size").value==0){alert("please select product size!"); return false;}
 else if(document.getElementById("Tot2ReqQty").value==0 || document.getElementById("Tot2ReqQty").value==''){alert("please enter product quantity!"); return false;}
 else
 {
  
  var r1=0; var r2=0; var r3=0; var r4=0; var r5=0; 
  var s1=0; var s2=0; var s3=0; var s4=0; var s5=0;
  if(sn==1)
  {
   if(document.getElementById("ReqQty1").value==''){var r1=0;}
   else{var r1=parseFloat(document.getElementById("ReqQty1").value);}
   var s1=document.getElementById("StateId1").value; 
  }
  else if(sn==2)
  {
   if(document.getElementById("ReqQty1").value==''){var r1=0;}
   else{var r1=parseFloat(document.getElementById("ReqQty1").value);}
   if(document.getElementById("ReqQty2").value==''){var r2=0;}
   else{var r2=parseFloat(document.getElementById("ReqQty2").value);}
   var s1=document.getElementById("StateId1").value; var s2=document.getElementById("StateId2").value;
  }
  else if(sn==3)
  {
   if(document.getElementById("ReqQty1").value==''){var r1=0;}
   else{var r1=parseFloat(document.getElementById("ReqQty1").value);}
   if(document.getElementById("ReqQty2").value==''){var r2=0;}
   else{var r2=parseFloat(document.getElementById("ReqQty2").value);}
   if(document.getElementById("ReqQty3").value==''){var r3=0;}
   else{var r3=parseFloat(document.getElementById("ReqQty3").value);} 
   var s1=document.getElementById("StateId1").value; var s2=document.getElementById("StateId2").value;
   var s3=document.getElementById("StateId3").value; 
  }
  else if(sn==4)
  {
   if(document.getElementById("ReqQty1").value==''){var r1=0;}
   else{var r1=parseFloat(document.getElementById("ReqQty1").value);}
   if(document.getElementById("ReqQty2").value==''){var r2=0;}
   else{var r2=parseFloat(document.getElementById("ReqQty2").value);}
   if(document.getElementById("ReqQty3").value==''){var r3=0;}
   else{var r3=parseFloat(document.getElementById("ReqQty3").value);}
   if(document.getElementById("ReqQty4").value==''){var r4=0;}
   else{var r4=parseFloat(document.getElementById("ReqQty4").value);}
   var s1=document.getElementById("StateId1").value; var s2=document.getElementById("StateId2").value;
   var s3=document.getElementById("StateId3").value; var s4=document.getElementById("StateId4").value;
  }
  else if(sn==5)
  {
   if(document.getElementById("ReqQty1").value==''){var r1=0;}
   else{var r1=parseFloat(document.getElementById("ReqQty1").value);}
   if(document.getElementById("ReqQty2").value==''){var r2=0;}
   else{var r2=parseFloat(document.getElementById("ReqQty2").value);}
   if(document.getElementById("ReqQty3").value==''){var r3=0;}
   else{var r3=parseFloat(document.getElementById("ReqQty3").value);}
   if(document.getElementById("ReqQty4").value==''){var r4=0;}
   else{var r4=parseFloat(document.getElementById("ReqQty4").value);}
   if(document.getElementById("ReqQty5").value==''){var r5=0;}
   else{var r5=parseFloat(document.getElementById("ReqQty5").value);}
   var s1=document.getElementById("StateId1").value; var s2=document.getElementById("StateId2").value;
   var s3=document.getElementById("StateId3").value; var s4=document.getElementById("StateId4").value;
   var s5=document.getElementById("StateId5").value;
  }
  
  var agree=confirm("Are you sure?");
  if(agree){window.location="erpmrp.php?ac=2441&ee=2421&der=true2&c=false&trht=FTF%%F1&tt=valuased&action=setNewProd&m="+m+"&y="+y+"&filter=zero&s=0&hq="+hq+"&dis=0&crop=0&branch="+bi+'&r1='+r1+'&r2='+r2+'&r3='+r3+'&r4='+r4+'&r5='+r5+'&s1='+s1+'&s2='+s2+'&s3='+s3+'&s4='+s4+'&s5='+s5+'&yy='+yy+'&ei='+ei+'&sn='+sn+'&prod='+document.getElementById("Product").value+'&size='+document.getElementById("Size").value;}
 }
  
}


function FunExport(m,y,branch,ei)
{ window.open("erprcpmrpexport.php?act=mrpexp&aa=2441&ee=2421&der=true2&c=false&trht=FTF%%F1&tt=valuased&m="+m+"&y="+y+"&filter=zero&dis=0&crop=0&branch="+branch+"&ei="+ei,"ExpForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=50,height=50"); }



<!-- Number Key -->
function isNumberKey(evt)
{
  var charCode = (evt.which) ? evt.which : evt.keyCode;
  if (charCode != 46 && charCode > 31 
	&& (charCode < 48 || charCode > 57))
	 return false;
  return true;
}
<!-- Number Key -->
<!-- Grid open -->
$(document).ready(function () { $("#table1").freezeHeader({ 'height': '400px' }); })
<!-- Grid close -->
</Script>
</head>
<body class="body">
<span id="ResultSpan"></span>
<input type="hidden" id="EmpId" name="EmpId" value="<?php echo $EmployeeId; ?>" />
<input type="hidden" id="Numb" name="Numb" value="0" />
<input type="hidden" id="Num2b" name="Num2b" value="0" />
<table class="table">
<tr>
 <td>
  <table class="menutable"><tr><td><?php if($_SESSION['login']=true){ require_once("EMenu.php"); } ?></td></tr></table>
 </td>
</tr>
<tr>
 <td valign="top">
  <table width="100%" style="margin-top:0px;" border="0">
    <tr>
	  <td valign="top"><?php if($_SESSION['login'] = true){ require_once("EWelcome.php"); } ?></td>
	</tr>
	 <tr>
	  <td valign="top" width="100%" id="MainWindow">
<!DOCTYPE html>
<html>
<?php //***************START*****START*****START******START******START***************************?>
<?php $sqly=mysql_query("select FromDate,ToDate from hrm_sales_year where YearId=".$y, $con); $resy=mysql_fetch_assoc($sqly); $FDate=date("Y",strtotime($resy['FromDate'])); $TDate=date("Y",strtotime($resy['ToDate']));  if($m==1){$Month='JANUARY'; $yy=$TDate; $mm=10;}elseif($m==2){$Month='FEBRUARY'; $yy=$TDate; $mm=11;}elseif($m==3){$Month='MARCH'; $yy=$TDate; $mm=12;}elseif($m==4){$Month='APRIL'; $yy=$FDate; $mm=1;}elseif($m==5){$Month='MAY'; $yy=$FDate; $mm=2;}elseif($m==6){$Month='JUNE'; $yy=$FDate; $mm=3;}elseif($m==7){$Month='JULY'; $yy=$FDate; $mm=4;}elseif($m==8){$Month='AUGUST'; $yy=$FDate; $mm=5;}elseif($m==9){$Month='SEPTEMBER'; $yy=$FDate; $mm=6;}elseif($m==10){$Month='OCTOBER'; $yy=$FDate; $mm=7;}elseif($m==11){$Month='NOVEMBER'; $yy=$FDate; $mm=8;}elseif($m==12){$Month='DECEMBER'; $yy=$FDate; $mm=9;} 
  if($m==1 OR $m==3 OR $m==5 OR $m==7 OR $m==8 OR $m==10 OR $m==12){ $day=31; } 
  elseif($m==4 OR $m==6 OR $m==9 OR $m==11){ $day=30; }
  elseif($m==2){ if($Y==2012 OR $Y==2016 OR $Y==2020 OR $Y==2024 OR $Y==2028 OR $Y==2032 OR $Y==2036 OR $Y==2040 OR $Y==2044 OR $Y==2048 OR $Y==2052 OR $Y==2056 OR $Y==2060){$day=29;}else{$day=28;} } 

$ck2s=mysql_query("select * from erp_empassign_rcpmrp where EmpId=".$EmployeeId." AND WorkName='MRP' AND Sts='A'",$con2); $ck2r=mysql_num_rows($ck2s);
?>
<table border="0" style="margin-top:0px;width:100%;height:150px;">	
<tr>
 <td valign="top" style="width:100%;">
 <table border="0" style="width:100%;">
 <tr>
<td style="width:100%;">
 <table border="0" style="width:100%;">
  <td style="width:100%;" valign="top">  
   <table border="0" cellpadding="0" cellspacing="1" style="width:100%;">
    <tr>
	 <td colspan="35">
	  <table border="0" style="width:100%;">
   <tr>
	<td style="width:100%;">
	
<?php //for($i=1; $i<=100; $i++){ echo '<input type="" id="T'.$i.'" value="0"/>'; } ?>	
	 <?php if($ck2r>0){ ?>
	 <table border="0">
		<tr>
	    <td class="htf" align="left"><u>Monthly Requirement Plan</u>&nbsp;&nbsp;&nbsp;&nbsp;</td>
	    <td class="tdf" align="center">&nbsp;</td>
		<td class="tdf">&nbsp;Month:&nbsp;</td>
		<td style="width:100px;"><select style="width:100px;" class="InputSel" id="month" name="month" onChange="funmonth(this.value,<?php echo $y.','.$_REQUEST['s'].','.$_REQUEST['hq'].','.$_REQUEST['branch']; ?>)"><option value="<?php echo $m; ?>" selected="selected"><?php echo $Month; ?></option><?php for($i=1;$i<=12;$i++){ if($i!=$m){ ?><option value="<?php echo $i; ?>"><?php if($i==1){echo 'JANUARY';}elseif($i==2){echo 'FEBRUARY';}elseif($i==3){echo 'MARCH';}elseif($i==4){echo 'APRIL';}elseif($i==5){echo 'MAY';}elseif($i==6){echo 'JUNE';}elseif($i==7){echo 'JULY';}elseif($i==8){echo 'AUGUST';}elseif($i==9){echo 'SEPTEMBER';}elseif($i==10){echo 'OCTOBER';}elseif($i==11){echo 'NOVEMBER';}elseif($i==12){echo 'DECEMBER';} ?></option><?php }} ?></select></td>
		 
		<td class="tdf">&nbsp;Year:&nbsp;</td>
		<td style="width:60px;"><select style="width:100px;" class="InputSel" id="year" name="year" onChange="funyear(this.value,<?php echo $m.','.$_REQUEST['s'].','.$_REQUEST['hq'].','.$_REQUEST['branch']; ?>)"><option value="<?php echo $y; ?>" selected="selected"><?php echo $FDate.'-'.$TDate; ?></option>
		<?php $sql2y=mysql_query("select YearId,FromDate,ToDate from hrm_sales_year where YearId!=".$y." AND YearId<=".$YearId, $con); while($res2y=mysql_fetch_assoc($sql2y)){ $F2Date=date("Y",strtotime($res2y['FromDate'])); $T2Date=date("Y",strtotime($res2y['ToDate'])); ?><option value="<?php echo $res2y['YearId']; ?>"><?php echo $F2Date.'-'.$T2Date; ?></option><?php } ?></select></td>
		
		
		<td class="tdf">&nbsp;Branch:&nbsp;</td>
		<td style="width:120px;"><select style="width:120px;" class="InputSel" id="branch" name="branch" onChange="funbranch(this.value,<?php echo $m.','.$y.','.$_REQUEST['s'].','.$_REQUEST['hq']; ?>)">
<?php if($branch>0){ $sbranch=mysql_query("select BranchName from erp_branch where BranchId=".$branch,$con2); $rbranch=mysql_fetch_assoc($sbranch); ?><option value='<?php echo $branch;?>' selected><?php echo $rbranch['BranchName'];?></option><?php }else{ ?><option value="0" selected>select</option><?php } $s2branch=mysql_query("select b.BranchId,BranchName from erp_branch b inner join erp_branch_state bs on b.BranchId=bs.BranchId inner join erp_mrp_empstate es on bs.StateId=es.StateId where es.EmpId=".$EmployeeId." AND es.Sts='A' group by b.BranchId order by b.BranchName ASC",$con2);
while($r2branch=mysql_fetch_assoc($s2branch)){ ?><option value='<?php echo $r2branch['BranchId'];?>'><?php echo $r2branch['BranchName'];?></option><?php } ?></select></td>  
	 
	 <td style="font-family:Georgia;color:#FF80FF;font-weight:bold;font-size:12px;width:60px;">&nbsp;<span style="cursor:pointer;color:#FFFF6A;" onClick="FunRef(<?php echo $m.','.$y.','.$_REQUEST['s'].','.$_REQUEST['hq'].','.$_REQUEST['branch']; ?>)"><u>refresh</u></span></td>
	 <?php if($_REQUEST['branch']>0){ ?>
	 <td style="font-family:Georgia;color:#FF80FF;font-weight:bold;font-size:12px;width:100px;">&nbsp;<span style="cursor:pointer;color:#FFFF6A;" onClick="FunExport(<?php echo $m.','.$y.','.$_REQUEST['branch'].','.$EmployeeId; ?>)"><u>Export All</u></span></td>
	 <?php } ?>
	 
	   </tr>
	  </table>
	  <?php } ?>
	
	 </td>
	</tr>
	<tr>
	 <td>
<?php
$s1=mysql_query("select * from erp_settdate where RcpMrp='MRP' AND Sts='A'",$con2); $r1=mysql_fetch_assoc($s1);
$Vwl=strlen($r1['ViewD']); $Opl=strlen($r1['OpeningD']); $Cll=strlen($r1['ClosingD']); $ml=strlen($m);
if($Vwl==1){$Vw='0'.$r1['ViewD'];} else{$Vw=$r1['ViewD'];}
if($Opl==1){$Op='0'.$r1['OpeningD'];} else{$Op=$r1['OpeningD'];}
if($Cll==1){$Cl='0'.$r1['ClosingD'];} else{$Cl=$r1['ClosingD'];}
if($ml==1){$mnt='0'.$m;} else{$mnt=$m;}
$OpD=date($yy.'-'.$mnt.'-'.$Op); $ClD=date($yy.'-'.$mnt.'-'.$Cl);
?>	 
<!-- start table formate open -->
<!-- start table formate open --> 
<?php if($ck2r>0){ ?>
<table width="100%" id="table1" style="background-color:#000000;" cellspacing="1">
<?php if($_REQUEST['branch']>0){ ?>
<div class="thead" style="width:100%;">
<thead>
<?php 
$ssb=mysql_query("select * from erp_branch_state where BranchId=".$branch,$con2); $rowssb=mysql_num_rows($ssb); 
$sstate=mysql_query("select * from erp_mrp_empstate where EmpId=".$EmployeeId." AND Sts='A'",$con2);
$rowst=mysql_num_rows($sstate); $ww=$rowst*10; ?>
 <tr>
  <td colspan="5" class="td1"><font color="#003871" size="3"><i><u><?php echo $Month.'-'.$yy.'&nbsp;&nbsp;{ '.$rbranch['BranchName'].' }'; ?></u></i></font></td>
  <td rowspan="2" class="td1" style="width:6%;">Closing<br />Stock at <br />C&F Point</td>
  <td rowspan="2" class="td1" style="width:6%;">Stock <br />In-Transit</td>
  <td rowspan="2" class="td1" style="width:6%;">Total <br />Stock Qty</td> 
  <td rowspan="2" class="td1" style="width:3%;">Edit<br><?php if(date("Y-m-d")>=$OpD AND date("Y-m-d")<=$ClD){ ?>All<br><input type="checkbox" id="chkId" onClick="FunCheckEdit(<?php echo $rowst; ?>)" /><?php } ?></td>  
  <td colspan="<?php echo $rowst; ?>" class="td1" style="width:<?php echo $ww;?>%;">Stock Requirement</td>
  <td rowspan="2" class="td1" style="width:6%;">Total<br />Requirement</td>
  <td rowspan="2" class="td1" style="width:6%;">Stock<br />to be<br />Supplied</td>
 </tr>
 <tr>
  <td class="td1" style="width:2%;">Sn.</td>
  <td class="td1" style="width:13%;">Crop</td>
  <td class="td1" style="width:15%;">Variety</td>
  <td class="td1" style="width:2%;">Type</td>
  <td class="td1" style="width:5%;">Size</td>
  <?php $ss=mysql_query("select ms.StateId,StateCode from erp_mrp_empstate ms inner join erp_state s on ms.StateId=s.StateId where ms.EmpId=".$EmployeeId." AND ms.Sts='A' order by StateCode ASC",$con2);
  while($rs=mysql_fetch_assoc($ss)){ ?> 
   <td class="td1" style="width:6%;"><?php echo $rs['StateCode']; ?></td>
  <?php } ?>
 </tr>
</thead> 
</div> 
<?php } if($_REQUEST['branch']>0){ $sql=mysql_query("select m.*,TypeName,ProductName,ItemName,SizeName from ".db2.".erp_mrp m inner join ".db1.".hrm_sales_seedtype t on m.TypeId=t.TypeId inner join ".db1.".hrm_sales_seedsproduct p on m.ProductId=p.ProductId inner join ".db1.".hrm_sales_seedsitem i on p.ItemId=i.ItemId inner join ".db1.".hrm_sales_itemsize s on m.SizeId=s.SizeId where m.MrpMonth=".$m." AND m.MrpYear=".$yy." AND m.BranchId=".$_REQUEST['branch']." order by i.ItemName ASC, p.ProductName ASC");
$sn=1; while($res=mysql_fetch_assoc($sql)){ ?>
<div class="tbody">
<tbody> 
 <tr>
  <td class="td2"><?php echo $sn; ?></td>
  <td class="td3">&nbsp;<?php echo $res['ItemName']; ?></td>
  <td class="td3">&nbsp;<?php echo $res['ProductName']; ?></td>
  <td class="td2">&nbsp;<?php echo $res['TypeName']; ?></td>
  <td class="td2">&nbsp;<?php echo $res['SizeName']; ?></td>
  <td class="td4"><?php echo floatval($res['StockClosing']); ?>&nbsp;</td>
  <td class="td4"><?php if($res['StockTransit']>0){echo floatval($res['StockTransit']);} ?>&nbsp;</td>
  <?php $totStck=$res['StockClosing']+$res['StockTransit']; ?>
  <td class="td4"><?php echo floatval($totStck); ?>&nbsp;</td>
  
  <td align="center" valign="middle" bgcolor="#FFFFFF">
  <?php if(date("Y-m-d")>=$OpD AND date("Y-m-d")<=$ClD){ ?>
  <span style="cursor:pointer;">
  <img src="images/edit.png" id="Edit<?php echo $sn;?>" onClick="FunEdit(<?php echo $rowst.','.$sn;?>)" />
  <img src="images/Floppy-Small-icon.png" id="Save<?php echo $sn;?>" onClick="saveD(<?php echo $sn.','.$_REQUEST['hq'].','.$m.','.$y.','.$yy.','.$EmployeeId.','.$rowst.','.$res['ProductId'].','.$res['TypeId'].','.$res['SizeId'].','.$_REQUEST['branch']; ?>)" style="display:none;"></span>
  <?php } ?>
  </td>
  
  <?php $ss=mysql_query("select ms.StateId,StateCode from erp_mrp_empstate ms inner join erp_state s on ms.StateId=s.StateId where ms.EmpId=".$EmployeeId." AND ms.Sts='A' order by StateCode ASC",$con2);
  $sn2=1; while($rs=mysql_fetch_assoc($ss)){ 
  $stck=mysql_query("select RequireQty from erp_mrp_require where ReqMrpMonth=".$m." AND ReqMrpYear=".$yy." AND StateId=".$rs['StateId']." AND ProductId=".$res['ProductId']." AND TypeId=".$res['TypeId']." AND SizeId=".$res['SizeId']." ",$con2); $rstck=mysql_fetch_assoc($stck); ?> 
   <td class="td4" style="width:6%;" id="td<?php echo $sn2.'_'.$sn;?>"><input class="itd4" id="ReqQty<?php echo $sn2.'_'.$sn;?>" value="<?php if($rstck['RequireQty']>0){echo floatval($rstck['RequireQty']);} ?>" onKeyPress="return isNumberKey(event)" maxlength="12" onKeyUp="funCalV(this.value,<?php echo $rowst.','.$sn.','.$totStck;?>)" readonly/>
   <input type="hidden" id="StateId<?php echo $sn2.'_'.$sn;?>" value="<?php echo $rs['StateId']; ?>" readonly/>
   </td>
  <?php $sn2++; } $stotReq=mysql_query("select sum(RequireQty) as tqty from erp_mrp_require where ReqMrpMonth=".$m." AND ReqMrpYear=".$yy." AND BranchId=".$_REQUEST['branch']." AND ProductId=".$res['ProductId']." AND TypeId=".$res['TypeId']." AND SizeId=".$res['SizeId']." AND FilledBy_RequireQty=".$EmployeeId,$con2); $rtotReq=mysql_fetch_assoc($stotReq); if($rtotReq['tqty']>$totStck){ $reqtot=$rtotReq['tqty']-$totStck;}else{$reqtot='';} ?>
  
  <td class="td4"><input class="itd4" id="TotReqQty<?php echo $sn;?>" value="<?php if($rtotReq['tqty']>0){echo floatval($rtotReq['tqty']);} ?>" readonly/></td>
  <td class="td4"><input class="itd4" style="font-weight:bold;" id="TotSplyQty<?php echo $sn;?>" value="<?php echo $reqtot; ?>" readonly/></td>

 </tr>
 </tbody> 
</div>
<?php $sn++; } $ssn=$sn-1; echo '<input type="hidden" id="rowc" value='.$ssn.' />'; ?>
<?php } ?>
            
</table>
<?php } ?>
<!-- start table formate close -->
<!-- start table formate close -->	  
	 </td>	 
   </tr>
   
 <tr>
  <td style="width:100%;">
  <?php if($ck2r>0){ ?>
  <table style="width:80%;">
  <?php if($_REQUEST['branch']>0){ ?>
   <tr>
    <td rowspan="2" class="td1" style="width:3%;">Edit</td>
    <td colspan="3" class="td1"><font color="#003871" size="3"><i><u>Any Other</u></i></font></td> 
    <td colspan="<?php echo $rowst; ?>" class="td1" style="width:<?php echo $ww;?>%;">Stock Requirement</td>
    <td rowspan="2" class="td1" style="width:6%;">Total<br />Requirement</td>
   </tr>
   <tr>
    <td class="td1" style="width:13%;">Crop</td>
    <td class="td1" style="width:15%;">Variety</td>
    <td class="td1" style="width:5%;">Size</td>
    <?php $ss=mysql_query("select ms.StateId,StateCode from erp_mrp_empstate ms inner join erp_state s on ms.StateId=s.StateId where ms.EmpId=".$EmployeeId." AND ms.Sts='A' order by StateCode ASC",$con2);
  while($rs=mysql_fetch_assoc($ss)){ ?> 
    <td class="td1" style="width:6%;"><?php echo $rs['StateCode']; ?></td>
    <?php } ?>
   </tr> 
   <tr>
    <td align="center" valign="middle" bgcolor="#FFFFFF">
	<span style="cursor:pointer;">
    <img src="images/edit.png" id="Edit" onClick="Fun2Edit(<?php echo $rowst;?>)" />
    <img src="images/Floppy-Small-icon.png" id="Save" onClick="save2D(<?php echo $_REQUEST['hq'].','.$m.','.$y.','.$yy.','.$EmployeeId.','.$rowst.','.$_REQUEST['branch']; ?>)" style="display:none;"></span></td>
	<td class="td3"><select class="itd3" id="Item" onChange="IFun(this.value,<?php echo $m.','.$yy.','.$_REQUEST['branch']; ?>)" disabled><option value="0" selected>select</option><?php $si=mysql_query("select ItemId,ItemName from hrm_sales_seedsitem order by ItemName ASC",$con); while($ri=mysql_fetch_assoc($si)){ ?><option value="<?php echo $ri['ItemId']; ?>"><?php echo $ri['ItemName']; ?></option><?php } ?></select></td>
    <td class="td3"><span id="PSpan"><select class="itd3" id="Product" onChange="PFun(this.value,<?php echo $m.','.$yy.','.$_REQUEST['branch']; ?>)" disabled><option value="0" selected>select</option><?php $sp=mysql_query("select ProductId,ProductName,TypeName from hrm_sales_seedsproduct sp inner join hrm_sales_seedtype st on sp.TypeId=st.TypeId order by ProductName ASC",$con); while($rp=mysql_fetch_assoc($sp)){ ?><option value="<?php echo $rp['ProductId']; ?>"><?php echo $rp['ProductName'].' - '.$rp['TypeName']; ?></option><?php } ?></select></span></td>
	
    <td class="td2"><span id="SSpan"><select class="itd3" id="Size" disabled></select></span></td>
	<?php $ss=mysql_query("select ms.StateId,StateCode from erp_mrp_empstate ms inner join erp_state s on ms.StateId=s.StateId where ms.EmpId=".$EmployeeId." AND ms.Sts='A' order by StateCode ASC",$con2);
  $sn3=1; while($rs=mysql_fetch_assoc($ss)){ ?> 
    <td class="td4" style="width:6%;" id="td<?php echo $sn3;?>"><input class="itd4" id="ReqQty<?php echo $sn3;?>" onKeyPress="return isNumberKey(event)" maxlength="12" onKeyUp="fun2CalV(this.value,<?php echo $rowst;?>)" readonly/>
   <input type="hidden" id="StateId<?php echo $sn3;?>" value="<?php echo $rs['StateId']; ?>" readonly/>
   </td>
  <?php $sn3++; } ?>
  <td class="td4"><input class="itd4" id="Tot2ReqQty" readonly/></td>
   </tr>
   <?php } ?>
  </table>
  <?php } ?>
  </td>
 </tr>
	
	 	

 </table>
</td>
</tr>
	   
   </table>
  </td>
 </table>
</td>  
  </tr>
  
 </table>
 </td>
</tr>
</table>	

<?php //*****************END*****END*****END******END******END**************************?>
	  </td>
	</tr>
  </table>
 </td>
</tr>
</table>
</body>
</html>


