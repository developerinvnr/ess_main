<?php session_start();
if($_SESSION['login'] = true){require_once('../AdminUser/config/config.php');}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('../AdminUser/logcheck.php');
if($_SESSION['logCheckEmp']!=$logemp){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('EmpMenuSession.php');}else{header('Location:../index.php');}
/******************************************************************************/

$OllYId=$_SESSION['KraYId_Old']-1;

$sqlOld=mysql_query("select * from hrm_year where YearId=".$OllYId, $con);
$sqlCurr=mysql_query("select * from hrm_year where YearId=".$_SESSION['KraYId_Old'], $con); 
$sqlNew=mysql_query("select * from hrm_year where YearId=".$_SESSION['KraYId'], $con); 
$resOld=mysql_fetch_assoc($sqlOld); $resCurr=mysql_fetch_assoc($sqlCurr); $resNew=mysql_fetch_assoc($sqlNew);  
$FromOld=date("Y", strtotime($resOld['FromDate'])); $ToOld=date("Y", strtotime($resOld['ToDate'])); 
$FromCurr=date("Y", strtotime($resCurr['FromDate'])); $ToCurr=date("Y", strtotime($resCurr['ToDate']));
$FromNew=date("Y", strtotime($resNew['FromDate'])); $ToNew=date("Y", strtotime($resNew['ToDate']));
$SNo=1; $CuDate=date("Y-m-d");

$sqlkk2=mysql_query("select * from hrm_pms_kra where YearId=".$_SESSION['KraYId_Old']." AND CompanyId=".$CompanyId." AND EmployeeID=".$EmployeeId." AND (KRAStatus='R' OR KRAStatus='A') AND (UseKRA='A' OR UseKRA='R' OR UseKRA='H')", $con); 
$rowkk2=mysql_num_rows($sqlkk2); 


?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<link type="text/css" href="css/mycss.css" rel="stylesheet"/>
<script type="text/javascript" language="javascript">
for(var j=6; j<15; j++) 
{ function ShowRow(j) 
  {
  var u = j+1;  var u1 = j-1; //var a = j+2; c=a-1; alert("a="+a+"j="+c);
  if(j<=14) {document.getElementById('minusImg_'+j).style.display = 'block'; document.getElementById('addImg_'+j).style.display = 'none';
   document.getElementById('Row_'+j).style.display = 'block'; document.getElementById('addImg_'+u).style.display = 'block';
   document.getElementById('minusImg_'+u1).style.display = 'none';} 
  else { document.getElementById('minusImg_'+j).style.display = 'block'; document.getElementById('addImg_'+j).style.display = 'none';
    document.getElementById('Row_'+j).style.display = 'block';  document.getElementById('minusImg_'+u1).style.display = 'none';  } 
  }
  function HideRow(j)
  { 
  var u = j+1;  var u1 = j-1; 
  if(j<=14)
  {document.getElementById('minusImg_'+j).style.display = 'none'; document.getElementById('addImg_'+j).style.display = 'block';
   document.getElementById('Row_'+j).style.display = 'none'; document.getElementById('addImg_'+u).style.display = 'none';
   document.getElementById('minusImg_'+u1).style.display = 'block'; }
  else { document.getElementById('minusImg_'+j).style.display = 'none'; document.getElementById('addImg_'+j).style.display = 'block';
    document.getElementById('Row_'+j).style.display = 'none';  document.getElementById('minusImg_'+u1).style.display = 'block'; }  
  } 
}	

function OpenOldKra()
{document.getElementById("OldKRaID").style.display='block';}
function CloseOldKra()
{document.getElementById("OldKRaID").style.display='none';}


function OpenHelpfile(value){window.open("HelpFile.php?a=open&v="+value,"HelpFile","width=800,height=650"); }
function OpenFaqfile(value){window.open("HelpFile.php?a=FaqOpen&v="+value,"HelpFile","width=800,height=650"); }


function ClickCheckKRA(v)
{var K=document.getElementById("KRAGoal"+v).value; var KD=document.getElementById("Des"+v).value; var M=document.getElementById("Mea"+v).value; 
 var U=document.getElementById("Uni"+v).value; var W=document.getElementById("Wei"+v).value; var T=document.getElementById("Tar"+v).value; 
 
 if(document.getElementById("NoId_"+v).checked==true)
 { 
   for(var i=1; i<=15; i++)
   {  
    if(document.getElementById("KRA_"+i).value=='')
	 {document.getElementById("KRA_"+i).value=K; document.getElementById("KRADes_"+i).value=KD; document.getElementById("Measure_"+i).value=M; 
	  document.getElementById("Unit_"+i).value=U; document.getElementById("Weightage_"+i).value=W; document.getElementById("Target_"+i).value=T;
	  document.getElementById("KRA_"+i).readOnly=true; document.getElementById("KRADes_"+i).readOnly=true; document.getElementById("Measure_"+i).readOnly=true; 
	  document.getElementById("Unit_"+i).readOnly=true; document.getElementById("Weightage_"+i).readOnly=false; document.getElementById("Target_"+i).readOnly=false;
	  document.getElementById("KraIdNo_"+i).value=v; document.getElementById("TR_"+v).style.backgroundColor='#CAFFCA'; 
	  var Weightage=document.getElementById("Weightage_"+i).value; 
	  if(Weightage==''){document.getElementById("WWeightage_"+i).value=0;} else {document.getElementById("WWeightage_"+i).value=Weightage;}
	  brack; 
	 }
   }
   
 }
  if(document.getElementById("NoId_"+v).checked==false)
  { 
   for(var i=1; i<=15; i++)
   {   
    if(document.getElementById("KraIdNo_"+i).value==v)
	 {document.getElementById("KRA_"+i).value=''; document.getElementById("KRADes_"+i).value=''; document.getElementById("Measure_"+i).value=''; 
	  document.getElementById("Unit_"+i).value=''; document.getElementById("Weightage_"+i).value=''; document.getElementById("Target_"+i).value='';
	  document.getElementById("KRA_"+i).readOnly=false; document.getElementById("KRADes_"+i).readOnly=false; document.getElementById("Measure_"+i).readOnly=false; 
	  document.getElementById("Unit_"+i).readOnly=false; document.getElementById("Weightage_"+i).readOnly=false; document.getElementById("Target_"+i).readOnly=false;
	  document.getElementById("KraIdNo_"+i).value=''; document.getElementById("TR_"+v).style.backgroundColor='#FFFFFF'; 
	  document.getElementById("WWeightage_"+i).value=0; brack; 
	 }
   }
   
  }
  
}


function ChangeWeight(v,n)
{ //var Weightage=document.getElementById("Weightage_"+n).value; 
  if(v==''){document.getElementById("WWeightage_"+n).value=0;}else{document.getElementById("WWeightage_"+n).value=v;}
  if(v<=5){document.getElementById("Period_"+n).value='Annual';} 
  else{document.getElementById("Period_"+n).value=document.getElementById("PPeriod_"+n).value;}
}

function EditKRAvalue()
{ var n=document.getElementById("EditTNRow").value; 
  for(var r=1; r<=n; r++){document.getElementById("KRA_"+r).readOnly=false; document.getElementById("KRADes_"+r).readOnly=false; 
  document.getElementById("Measure_"+r).readOnly=false; document.getElementById("Unit_"+r).readOnly=false; document.getElementById("Weightage_"+r).readOnly=false;
  document.getElementById("Target_"+r).readOnly=false;}
  document.getElementById("EditKRA").style.display='block'; document.getElementById("EditK").style.display='none';
}

function printpageKRA(CId,YId,EmpId) 
{ window.open ("EmpKraFormPrint.php?YId="+YId+"&EmpId="+EmpId+"&CId="+CId,"KRAForm","menubar=yes,scrollbars=yes,resizable=1,width=1170,height=600");}


function KRAOpenWindow(){var CI=document.getElementById("ComId").value; var YI=document.getElementById("YId").value;
window.open("KRASchedule.php?C="+CI+"&Y="+YI,"Schedule","menubar='no',resizable=1,width=850,height=350");}

function OpenKRAHelpfile(value){window.open("KRAHelpFile.php?a=open&v="+value,"HelpFile","width=800,height=650"); }

function UploadEmpfile(e,y)
{ window.open("UploadKraFileEmp.php?action=up&E="+e+"&Y="+y,"UploadFile","menubar=no,scrollbars=yes,resizable='no',width=650,height=300");} 


/**** Sub KRA open Sub KRA open **************************************/
function FunSubO(k){ document.getElementById("Div"+k).style.display='block'; document.getElementById("SpanO"+k).style.display='block'; document.getElementById("SpanC"+k).style.display='none'; } 
function FunSubC(k){ document.getElementById("Div"+k).style.display='none'; document.getElementById("SpanO"+k).style.display='none'; document.getElementById("SpanC"+k).style.display='block'; } 

function ChangeWeighta(v,k,m)
{ //var Weightage=document.getElementById("Wei_a"+k+"_"+m).value; 
  if(v==''){document.getElementById("WWei_a"+k+"_"+m).value=0;}else{document.getElementById("WWei_a"+k+"_"+m).value=v;} 
  if(v<=5){document.getElementById("Per_a"+k+"_"+m).value='Annual';} 
  else{document.getElementById("Per_a"+k+"_"+m).value=document.getElementById("PPer_a"+k+"_"+m).value;}
}
  
function ChangeTargeta(v,k,m)
{ //var Target=document.getElementById("Tar_a"+k+"_"+m).value; 
  if(v==''){document.getElementById("TTar_a"+k+"_"+m).value=0;} 
  else {document.getElementById("TTar_a"+k+"_"+m).value=v; } }  


/**** Sub KRA open Sub KRA close **************************************/

function FunTgt(kid,prd,tgt,wgt,lgc)
{ var e=document.getElementById("e").value; var c=document.getElementById("ComId").value;
  var win = window.open("setkratgt.php?act=setkratgt&n=1&valueins=true&checkalpha=false&d=12&pa=4&y=2&kid="+kid+"&prd="+prd+"&yy=t1t&tgt="+tgt+"&e="+e+"&lgc="+lgc+"&wgt="+wgt+"&row="+document.getElementById("row").value+"&row2="+document.getElementById("row2").value+"&DateJoining="+document.getElementById("DateJoining").value+"&After31DayDoJ="+document.getElementById("After31DayDoJ").value+"&CuDate="+document.getElementById("CuDate").value+"&EmpFromDate="+document.getElementById("EmpFromDate").value+"&EmpToDate="+document.getElementById("EmpToDate").value+"&ExtraAllowKRA="+document.getElementById("ExtraAllowKRA").value+"&AppFromDate="+document.getElementById("AppFromDate").value+"&AppToDate="+document.getElementById("AppToDate").value+"&RevFromDate="+document.getElementById("RevFromDate").value+"&RevToDate="+document.getElementById("RevToDate").value+"&EmpDateStatus="+document.getElementById("EmpDateStatus").value+"&AppDateStatus="+document.getElementById("AppDateStatus").value+"&RevDateStatus="+document.getElementById("RevDateStatus").value+"&HodDateStatus="+document.getElementById("HodDateStatus").value+"&EmpStatus="+document.getElementById("EmpStatus").value+"&AppStatus="+document.getElementById("AppStatus").value+"&RevStatus="+document.getElementById("RevStatus").value+"&HODStatus="+document.getElementById("HODStatus").value+"&c="+c, "QForm", "menubar=no,scrollbars=yes,resizable=no,directories=no,width=1200,height=600"); 
  //var timer = setInterval( function() { if(win.closed) { clearInterval(timer);  window.location="Emp2AddNewKRA.php?act=setkratgt&n=1&valueins=true&checkalpha=false&d=12&pa=4&y=2&kid="+kid+"&prd="+prd+"&yy=t1t&tgt="+tgt+"&e="+e+"&row="+document.getElementById("row").value+"&row2="+document.getElementById("row2").value+"&DateJoining="+document.getElementById("DateJoining").value+"&After31DayDoJ="+document.getElementById("After31DayDoJ").value+"&CuDate="+document.getElementById("CuDate").value+"&EmpFromDate="+document.getElementById("EmpFromDate").value+"&EmpToDate="+document.getElementById("EmpToDate").value+"&ExtraAllowKRA="+document.getElementById("ExtraAllowKRA").value+"&AppFromDate="+document.getElementById("AppFromDate").value+"&AppToDate="+document.getElementById("AppToDate").value+"&RevFromDate="+document.getElementById("RevFromDate").value+"&RevToDate="+document.getElementById("RevToDate").value+"&EmpDateStatus="+document.getElementById("EmpDateStatus").value+"&AppDateStatus="+document.getElementById("AppDateStatus").value+"&RevDateStatus="+document.getElementById("RevDateStatus").value+"&HodDateStatus="+document.getElementById("HodDateStatus").value+"&EmpStatus="+document.getElementById("EmpStatus").value+"&AppStatus="+document.getElementById("AppStatus").value+"&RevStatus="+document.getElementById("RevStatus").value+"&HODStatus="+document.getElementById("HODStatus").value; } }, 1000); 
}

function FunSubTgt(kid,prd,tgt,wgt,lgc)
{ var e=document.getElementById("e").value; var c=document.getElementById("ComId").value; 
  var win = window.open("setkratgt.php?act=setkratgt&n=2&valueins=true&checkalpha=false&d=12&pa=4&y=2&kid="+kid+"&prd="+prd+"&yy=t1t&tgt="+tgt+"&e="+e+"&lgc="+lgc+"&wgt="+wgt+"&row="+document.getElementById("row").value+"&row2="+document.getElementById("row2").value+"&DateJoining="+document.getElementById("DateJoining").value+"&After31DayDoJ="+document.getElementById("After31DayDoJ").value+"&CuDate="+document.getElementById("CuDate").value+"&EmpFromDate="+document.getElementById("EmpFromDate").value+"&EmpToDate="+document.getElementById("EmpToDate").value+"&ExtraAllowKRA="+document.getElementById("ExtraAllowKRA").value+"&AppFromDate="+document.getElementById("AppFromDate").value+"&AppToDate="+document.getElementById("AppToDate").value+"&RevFromDate="+document.getElementById("RevFromDate").value+"&RevToDate="+document.getElementById("RevToDate").value+"&EmpDateStatus="+document.getElementById("EmpDateStatus").value+"&AppDateStatus="+document.getElementById("AppDateStatus").value+"&RevDateStatus="+document.getElementById("RevDateStatus").value+"&HodDateStatus="+document.getElementById("HodDateStatus").value+"&EmpStatus="+document.getElementById("EmpStatus").value+"&AppStatus="+document.getElementById("AppStatus").value+"&RevStatus="+document.getElementById("RevStatus").value+"&HODStatus="+document.getElementById("HODStatus").value+"&c="+c, "QForm", "menubar=no,scrollbars=yes,resizable=no,directories=no,width=1200,height=600"); 
  //var timer = setInterval( function() { if(win.closed) { clearInterval(timer);  window.location="Emp2AddNewKRA.php?act=setkratgt&n=2&valueins=true&checkalpha=false&d=12&pa=4&y=2&kid="+kid+"&prd="+prd+"&yy=t1t&tgt="+tgt+"&e="+e+"&row="+document.getElementById("row").value+"&row2="+document.getElementById("row2").value+"&DateJoining="+document.getElementById("DateJoining").value+"&After31DayDoJ="+document.getElementById("After31DayDoJ").value+"&CuDate="+document.getElementById("CuDate").value+"&EmpFromDate="+document.getElementById("EmpFromDate").value+"&EmpToDate="+document.getElementById("EmpToDate").value+"&ExtraAllowKRA="+document.getElementById("ExtraAllowKRA").value+"&AppFromDate="+document.getElementById("AppFromDate").value+"&AppToDate="+document.getElementById("AppToDate").value+"&RevFromDate="+document.getElementById("RevFromDate").value+"&RevToDate="+document.getElementById("RevToDate").value+"&EmpDateStatus="+document.getElementById("EmpDateStatus").value+"&AppDateStatus="+document.getElementById("AppDateStatus").value+"&RevDateStatus="+document.getElementById("RevDateStatus").value+"&HodDateStatus="+document.getElementById("HodDateStatus").value+"&EmpStatus="+document.getElementById("EmpStatus").value+"&AppStatus="+document.getElementById("AppStatus").value+"&RevStatus="+document.getElementById("RevStatus").value+"&HODStatus="+document.getElementById("HODStatus").value; } }, 1000);  
}

function FunSubFormBTgt(yid,fbid,prd,tgt,wgt,lgc)
{ var e=document.getElementById("e").value; var c=document.getElementById("ComId").value; 
  var win = window.open("setkratgtformb.php?act=setkratgt&n=2&valueins=true&checkalpha=false&d=12&pa=4&y=2&fbid="+fbid+"&prd="+prd+"&yy=t1t&tgt="+tgt+"&e="+e+"&lgc="+lgc+"&wgt="+wgt+"&yid="+yid+"&row="+document.getElementById("row").value+"&row2="+document.getElementById("row2").value+"&DateJoining="+document.getElementById("DateJoining").value+"&After31DayDoJ="+document.getElementById("After31DayDoJ").value+"&CuDate="+document.getElementById("CuDate").value+"&EmpFromDate="+document.getElementById("EmpFromDate").value+"&EmpToDate="+document.getElementById("EmpToDate").value+"&ExtraAllowKRA="+document.getElementById("ExtraAllowKRA").value+"&AppFromDate="+document.getElementById("AppFromDate").value+"&AppToDate="+document.getElementById("AppToDate").value+"&RevFromDate="+document.getElementById("RevFromDate").value+"&RevToDate="+document.getElementById("RevToDate").value+"&EmpDateStatus="+document.getElementById("EmpDateStatus").value+"&AppDateStatus="+document.getElementById("AppDateStatus").value+"&RevDateStatus="+document.getElementById("RevDateStatus").value+"&HodDateStatus="+document.getElementById("HodDateStatus").value+"&EmpStatus="+document.getElementById("EmpStatus").value+"&AppStatus="+document.getElementById("AppStatus").value+"&RevStatus="+document.getElementById("RevStatus").value+"&HODStatus="+document.getElementById("HODStatus").value+"&c="+c, "QForm", "menubar=no,scrollbars=yes,resizable=no,directories=no,width=1200,height=600"); 
}




<!--
function doBlink(){
	var blink = document.all.tags("BLINK")
	for (var i=0; i<blink.length; i++)
		blink[i].style.visibility = blink[i].style.visibility == "" ? "hidden" : "" 
}
function startBlink(){
	if (document.all)
		setInterval("doBlink()",1000)
}
window.onload = startBlink;
// -->
</script>
</head>
<body class="body"> 
 
<input type="hidden" name="ComId" id="ComId" value="<?php echo $CompanyId; ?>" />
<input type="hidden" name="YId" id="YId" value="<?php echo $YearId; ?>" />
<input type="hidden" id="e" value="<?php echo $EmployeeId; ?>"/>
<input type="hidden" name="KraYId" id="KraYId" value="<?php echo $_SESSION['KraYId']; ?>" /> 
<input type="hidden" name="PmsYId" id="PmsYId" value="<?php echo $_SESSION['PmsYId']; ?>" />
<input type="hidden" id="DI" value="0"/>
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
<tr>
 <td style="background-image:url(images/pmsback.png);width:100%;">	 
 <table style="width:100%;">
<!--  Head Parts Open Open Open  --> 
<!--  Head Parts Open Open Open  --> 
 <tr>
  <td>
   <table>
    <tr>
<?php if($_SESSION['EmpType']=='E'){ ?>
<td align="center" valign="top"><a href="#"><img id="Img_emp1" src="images/emp.png" border="0"/></a></td>

<?php } if($_SESSION['BtnApp']>0) { ?><td align="center" valign="top"><a href="ManagerPms.php?ee=1&rr2=1&aa=0&rr=1&hh=1&sh=1&hp=1&fr=1&kr=1&fq=1&prt=1&msg=1&pd=1&mt=0&mts=1&scr=1&prom=1&inc=1&incr=1&pmsr=1&rg=1&h=1&fachiv=1&fa=1&fb=1&ffeedb=1&org=1"><img id="Img_manager1" src="images/manager1.png" border="0"/></a></td>
		   
<?php } if($_SESSION['BtnRev']>0) { ?><td align="center" valign="top"><a href="HodPms.php?ee=1&aa=1&rr2=1&rr=0&hh=1&sh=1&hp=1&fr=1&kr=1&fq=1&prt=1&msg=1&pd=1&mt=0&mts=1&scr=1&prom=1&inc=1&incr=1&pmsr=1&rg=1&h=1&fachiv=1&fa=1&fb=1&ffeedb=1&org=1"><img id="Img_hod1" src="images/hod1.png" border="0"/></a></td>

<?php } if($_SESSION['BtnRev2']>0) { ?><td align="center" valign="top"><a href="Rev2HodPms.php?ee=1&rr2=0&aa=1&rr=1&hh=0&sh=1&hp=1&fr=1&kr=1&fq=1&prt=1&msg=1&pd=1&mt=1&mts=0&scr=1&prom=1&inc=1&incr=1&pmsr=1&rg=1&h=1&fachiv=1&fa=1&fb=1&ffeedb=1&org=1"><img id="Img_hod1" src="images/RevHod1.png" border="0"/></a></td>	
		   
<?php } if($_SESSION['BtnHod']>0) { ?><td align="center" valign="top"><a href="RevHodPms.php?ee=1&rr2=1&aa=1&rr=1&hh=0&sh=1&hp=1&fr=1&kr=1&fq=1&prt=1&msg=1&pd=1&mt=1&mts=0&scr=1&prom=1&inc=1&incr=1&pmsr=1&rg=1&h=1&fachiv=1&fa=1&fb=1&ffeedb=1&org=1"><img id="Img_hod1" src="images/m1.png" border="0"/></a></td><?php } ?>

<td><font class="msg_b"><i><?php echo $msg; ?></i></font><font class="formc"><span id="MsgSpan"></span></font></td>	 
	</tr>
   </table>
  </td>
 </tr>
 
 <tr><td style="vertical-align:top;width:100%;"><?php include("SetKraPmsme.php"); ?></td></tr>
<!--  Head Parts Close Close Close  --> 
<!--  Head Parts Close Close Close  --> 
 				     
         
 <tr>
  <td style="width:100%;">
   <table border="0" style="width:100%;">
	<tr>
	 
<?php /****************************************** Form Start **************************/ ?>	 
<?php /***************** AppraisalForm **************************/ ?>	
	  <td id="AppraisalForm" style="width:100%;display:block;">
	  <table cellpadding="0" cellspacing="0" style="width:100%;">
	  		     
<tr>
<?php /***************** Achivement **************************/ ?>   
<form name="KRAForm" method="post" onSubmit="return ValidationAchive(this)">

<input type="hidden" id="row" value="<?php echo $rowk; ?>" />
<input type="hidden" id="row2" value="<?php echo $rowkk2; ?>" />
<input type="hidden" id="DateJoining" value="<?php echo $_SESSION['Joining']; ?>" />
<input type="hidden" id="After31DayDoJ" value="<?php echo $_SESSION['After31DayDoJ']; ?>" />
<input type="hidden" id="CuDate" value="<?php echo $CuDate; ?>" />
<input type="hidden" id="EmpFromDate" value="<?php echo $_SESSION['ekFrom']; ?>" />
<input type="hidden" id="EmpToDate" value="<?php echo $_SESSION['ekTo']; ?>" />
<input type="hidden" id="ExtraAllowKRA" value="<?php echo $resY['ExtraAllowKRA']; ?>" />
<input type="hidden" id="AppFromDate" value="<?php echo $_SESSION['akFrom']; ?>" />
<input type="hidden" id="AppToDate" value="<?php echo $_SESSION['akTo']; ?>" />
<input type="hidden" id="RevFromDate" value="<?php echo $_SESSION['rkFrom']; ?>" />
<input type="hidden" id="RevToDate" value="<?php echo $_SESSION['rkTo']; ?>" />
<input type="hidden" id="EmpDateStatus" value="<?php echo $_SESSION['ekSts']; ?>" />
<input type="hidden" id="AppDateStatus" value="<?php echo $_SESSION['akSts']; ?>" />
<input type="hidden" id="RevDateStatus" value="<?php echo $_SESSION['rkSts']; ?>" />
<input type="hidden" id="HodDateStatus" value="<?php echo $_SESSION['hkSts']; ?>" />
<input type="hidden" id="EmpStatus" value="<?php echo $resRe['EmpStatus']; ?>" />
<input type="hidden" id="AppStatus" value="<?php echo $resRe['AppStatus']; ?>" />
<input type="hidden" id="RevStatus" value="<?php echo $resRe['RevStatus']; ?>" />
<input type="hidden" id="HODStatus" value="<?php echo $resRe['HODStatus']; ?>" />   
 <td id="Achivement" style="width:100%;">
  <table border="0" cellpadding="0" cellspacing="0" style="width:100%;"> 

<!--Msg Msg Msg -->
<?php if($_SESSION['eKraform']=='Y'){ ?>
<tr>
 <td colspan="8" style=" text-align:right;">
<?php 
if(date("Y-m-d")>=$_SESSION['Joining'] AND date("Y-m-d")<=$_SESSION['After31DayDoJ'])
{ 
 if($rowk==0){ echo '<font class="msg_y">Submit Your KRA by '.date("d-m-Y",strtotime($After31DayDoJ)).'</font>'; } 
 if($rowk>0)
 { 
   $resk=mysql_fetch_assoc($sqlk); 
   if($resk['KRAStatus']='R' AND $resk['UseKRA']=='E'){ echo '<font class="msg_y"><span class="blink_me">Please click on final submit button for complete your KRA form.!</span></font>'; } 
   if($resk['KRAStatus']='R' AND $resk['UseKRA']=='A'){ echo '<font class="msg_g"><span class="blink_me">You have successfully submited KRA form!.!</span></font>'; } 
 } 
 
}  
elseif(date("Y-m-d")>=$_SESSION['ekFrom'] AND date("Y-m-d")<=$_SESSION['ekTo'] AND $_SESSION['ekSts']=='A') 
{ 
 if($rowk==0){ echo '<font class="msg_y"><span class="blink_me">Please fill KRA form before last date!</b></span></font>'; } 
 if($rowk>0)
 { 
  $resk=mysql_fetch_assoc($sqlk); 
  if($resk['KRAStatus']='R' AND $resk['UseKRA']=='E'){ echo '<font class="msg_y"><span class="blink_me">Please click on final submit button for complete your KRA form.!</span></font>'; } 
  if($resk['KRAStatus']='R' AND $resk['UseKRA']=='A'){ echo '<font class="msg_g"><span class="blink_me">You have successfully submited KRA form!.!</span></font>'; }
 } 
}
?>
 </td>&nbsp;
</tr>
<?php } ?>  
<!--Msg Msg Msg -->
  
   <tr>
    <td style="width:2%;"></td>
	<td colspan="8" style="width:98%;">
	<table border="0" style="width:100%;">
	 <tr>
	  <td class="fbody" style="color:#000084;width:75%;font-weight:bold;" valign="middle">List down your KRA for Assessment Year&nbsp;<?php if($CompanyId==1){ echo $FromCurr; }else{ $NF=$FromCurr-1; $NT=$FromCurr; echo $NF.'-'.$NT; } ?></td>
	  
	  <!-- View/Print KRA -->
      <?php /* if($_SESSION['eKraform']=='Y' AND $rowk>0){ ?> 
      <td class="tdc" style="width:5%;"><a href="#" onClick="printpageKRA(<?php echo $CompanyId.', '.$_SESSION['KraYId_Old'].', '.$EmployeeId; ?>)" style="text-decoration:none;"/><input type="button" style="width:150px;" value="View/ Print KRA"/></a></td><!--<img src="images/printSaveKRA.png" border="0" />-->
      <?php } */ //if($rowk>0){ ?>
	  
	  <td class="tdc" style="width:5%;" valign="middle"><script>function FunLog(){ window.open("viewlogic.php", "F", "menubar=no,scrollbars=yes,resizable=no,directories=no,width=1000,height=500");}</script><input type="button" style="width:90px;background-color:#99CC00;font-weight:bold;" value="Logic" onClick="FunLog()"/></td>
	  
	  <td class="tdc" style="width:5%;" valign="middle"><input type="button" name="Refresh" id="Refresh" style="width:90px;" value="Refresh" onClick="javascript:window.location='Emp2AddNewKRA.php?ee=0&aa=1&rr=1&hh=1&sh=1&hp=1&fr=1&kr=0&kOr=1&fq=1&prt=1&msg=1&pd=1&mt=1&mts=1&scr=1&prom=1&inc=1&incr=1&pmsr=1&rg=1&h=1&fachiv=0&fa=1&fb=1&ffeedb=1&org=1'"/></td>
	   
	 </tr>
	</table>
   </td>	  
  </tr> 
  <tr style="height:24px;">	
   <td style="width:2%;"></td> 
   <td colspan="8" style="width:98%;">
    <table border="1" style="width:100%;" cellspacing="0"> 
     <tr style="height:25px;background-color:#FFFF53;">   
      <td class="tdc" style="width:30px;"><b>Sn</b></td>
      <td class="tdc" style="width:300px;"><b>KRA/Goals</b></td>
      <td class="tdc" style="width:400px;"><b>Description</b></td>  
      <td class="tdc" style="width:80px;"><b>Measure</b></td>
      <td class="tdc" style="width:80px;"><b>Unit</b></td>
      <td class="tdc" style="width:60px;"><b>Weightage</b></td>
      <td class="tdc" style="width:80px;"><b>Logic</b></td>
      <td class="tdc" style="width:80px;"><b>Period</b></td>
      <td class="tdc" style="width:60px;"><b>Target</b></td>
     </tr>
	</table>
   </td>
  </tr>
<?php if($rowk>0){ $sql=mysql_query("select * from hrm_pms_kra where YearId=".$_SESSION['KraYId_Old']." AND CompanyId=".$CompanyId." AND EmployeeID=".$EmployeeId." AND (KRAStatus='R' OR KRAStatus='A') order by KRAId ASC", $con); 
$k=1; while($res=mysql_fetch_assoc($sql)){ $sSubK=mysql_query("select * from hrm_pms_krasub where KRAId=".$res['KRAId']." AND KSubStatus='A' order by KRASubId ASC",$con); $rowSubK=mysql_num_rows($sSubK); ?>
  <tr id="TR_<?php echo $k; ?>">	
   <td style="width:2%;"></td> 
   <td colspan="8" style="width:98%;">
    <table id="Row_<?php echo $k; ?>" border="1" style="width:100%;" cellspacing="0">
	<input type="hidden" id="KraIdNo_<?php echo $k; ?>"><input type="hidden" name="KId_<?php echo $k; ?>" value="<?php echo $res['KRAId']; ?>"><input type="hidden" id="SubKraRow_<?php echo $k; ?>" value="<?php echo $rowSubK; ?>">
     <tr bgcolor="#FFFFFF">   
      <td class="tdc" style="width:30px;"><?php echo $k; ?><br><center><span style="cursor:pointer;"><img src="images/open-folder.png" style="height:12px;display:<?php if($rowSubK>0){echo 'block';}else{echo 'none';}?>;" onClick="FunSubC(<?php echo $k; ?>)" id="SpanO<?php echo $k; ?>"/><?php if($res['Weightage']>5){ ?><img src="images/close-folder.png" style="height:12px;display:<?php if($rowSubK>0){echo 'none';}else{echo 'block';}?>;" onClick="FunSubO(<?php echo $k; ?>)" id="SpanC<?php echo $k; ?>"/><?php } ?></span></center></td>
	  
      <td class="tdc" style="width:300px;"><textarea name="KRA_<?php echo $k; ?>" id="KRA_<?php echo $k; ?>" class="Inputar" rows="3" style="width:100%;" maxlength="348" readonly><?php echo $res['KRA']; ?></textarea></td>
      <td class="tdc" style="width:400px;"><textarea name="KRADes_<?php echo $k; ?>" id="KRADes_<?php echo $k; ?>" class="Inputar" rows="3" style="width:100%;" maxlength="580" readonly><?php echo $res['KRA_Description'] ?></textarea></td>  
      <td class="tdc" style="width:80px;"><?php if($rowSubK>0){ ?><input type="hidden" style="width:100%;" name="Measure_<?php echo $k; ?>" id="Measure_<?php echo $k; ?>" value="" readonly/><?php } else{ ?><select name="Measure_<?php echo $k; ?>" id="Measure_<?php echo $k; ?>" class="Input" style="width:100%;"><option value="<?php echo $res['Measure']; ?>"><?php echo $res['Measure']; ?></option><option value="Acreage">Acreage</option><option value="Event">Event</option><option value="Program">Program</option><option value="Process">Process</option><option value="Maintenance">Maintenance</option><option value="Time">Time</option><option value="Yield">Yield</option><option value="Value">Value</option><option value="Volume">Volume</option><option value="Quantity">Quantity</option><option value="Quality">Quality</option><option value="None">None</option></select><?php } ?></td>
      <td class="tdc" style="width:80px;"><?php if($rowSubK>0){ ?><input type="hidden" style="width:100%;" name="Unit_<?php echo $k; ?>" id="Unit_<?php echo $k; ?>" value="" readonly/><?php } else{ ?><select name="Unit_<?php echo $k; ?>" id="Unit_<?php echo $k; ?>" class="Input" style="width:78px; height:20px;"><option value="<?php echo $res['Unit']; ?>"><?php echo $res['Unit']; ?></option><option value="%">%</option><option value="Acres">Acres</option><option value="Days">Days</option><option value="Month">Month</option><option value="Hours">Hours</option><option value="Days/Hours">Days/Hours</option><option value="Kg">Kg</option><option value="Ton">Ton</option><option value="Kg/Acre">Kg/Acre</option><option value="Number">Number</option><option value="Lakhs">Lakhs</option><option value="Rs.">Rs.</option><option value="None">None</option></select><?php } ?></td>
      <td class="tdc" style="width:60px;"><input type="hidden" name="WWeightage_<?php echo $k; ?>" id="WWeightage_<?php echo $k; ?>" value="<?php echo $res['Weightage']; ?>" /><input name="Weightage_<?php echo $k; ?>" id="Weightage_<?php echo $k; ?>" class="Input" style="width:100%;text-align:center;" maxlength="8" onKeyUp="ChangeWeight(this.value,<?php echo $k; ?>)" onChange="ChangeWeight(this.value,<?php echo $k; ?>)" value="<?php echo $res['Weightage']; ?>" readonly/></td>
  
      <td class="tdc" style="width:80px;"><?php if($rowSubK>0){?><input type="hidden" style="width:100%;" name="Logic_<?php echo $k; ?>" id="Logic_<?php echo $k; ?>" value="" readonly><?php }else{?><select name="Logic_<?php echo $k; ?>" id="Logic_<?php echo $k; ?>" class="Input" style="width:100%;" readonly><option value="<?php echo $res['Logic']; ?>"><?php echo $res['Logic']; ?></option><option value="Logic1">Logic1</option><option value="Logic2">Logic2</option><option value="Logic3">Logic3</option><option value="Logic4">Logic4</option><option value="Logic5">Logic5</option></select><?php } ?></td>
  
      <td class="tdc" style="width:80px;"><input type="hidden" id="PPeriod_<?php echo $k; ?>" value="<?php if($res['Period']!=''){echo $res['Period']; } else {echo 'Annual';} ?>" /> <?php if($rowSubK>0){ ?><input type="" style="width:100%;height:20px;border:hidden;" name="Period_<?php echo $k; ?>" id="Period_<?php echo $k; ?>" value="" readonly><?php }else{?><select name="Period_<?php echo $k; ?>" id="Period_<?php echo $k; ?>" class="Input" style="width:100%;" readonly><option value="<?php echo $res['Period']; ?>"><?php if($res['Period']=='Annual'){echo 'Annually';}elseif($res['Period']=='1/2 Annual'){echo 'Half Yearly';}elseif($res['Period']=='Quarter'){echo 'Quarterly';}elseif($res['Period']=='Monthly'){echo 'Monthly';} ?></option><option value="Annual">Annually</option><option value="1/2 Annual">Half Yearly</option><option value="Quarter">Quarterly</option><option value="Monthly">Monthly</option></select><?php } ?></td>
  
      <td class="tdc" style="width:60px;">
  <?php if($rowSubK>0){ ?><input type="" style="width:100%;text-align:center; border:hidden;" value="" readonly/><input type="hidden" name="Target_<?php echo $k; ?>" id="Target_<?php echo $k; ?>" value="100" readonly/><?php } else{ ?><input name="Target_<?php echo $k; ?>" id="Target_<?php echo $k; ?>" class="Input" style="cursor:<?php if($res['Period']!='Annual' AND $res['Period']!=''){echo 'pointer';} ?>;width:100%;text-align:center;text-decoration:<?php if($res['Period']!='Annual' AND $res['Period']!=''){ echo 'underline'; }?>;color:<?php if($res['Period']!='Annual' AND $res['Period']!=''){ echo '#000099'; }?>;" maxlength="8" <?php if($res['Period']!='Annual' AND $res['Period']!='' AND $rowkk2>0){?> onClick="FunTgt(<?php echo $res['KRAId']; ?>,'<?php echo $res['Period']; ?>',<?php echo intval($res['Target']).','.intval($res['Weightage']); ?>,'<?php echo $res['Logic']; ?>')" <?php } ?> onChange="ChangeTarget(<?php echo $k; ?>)" value="<?php echo intval($res['Target']); ?>" readonly/>
  <?php } ?><input type="hidden" name="TTarget_<?php echo $k; ?>" id="TTarget_<?php echo $k; ?>" value="<?php echo $res['Target'] ?>"/>
  </td>
  </tr>
  
<?php /* &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& Start Start */ ?>
<?php /* &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& Start Start */ ?>
<?php $sSubK=mysql_query("select * from hrm_pms_krasub where KRAId=".$res['KRAId']." AND KSubStatus='A' order by KRASubId ASC",$con); $rowSubK=mysql_num_rows($sSubK); ?>   
 <tr>
  <td colspan="9" align="right" style="border:hidden;border-style:none;">
  <div id="Div<?php echo $k; ?>" style="display:<?php if($rowSubK>0){echo 'block';}else{echo 'none';} ?>;">
     <table style="width:97%;background-color:#71FF71;" border="0" cellpadding="0" cellspacing="1"> 
     <tr style="background-color:#71FF71;">   
	 <td align="center" class="Input2a" style="width:45px;border:hidden;"><?php /*<span style="cursor:pointer;color:#003162;" onClick="FunSubC(<?php echo $k; ?>)"><u>Hide</u></span>*/ ?></td>
     <td align="center" class="Input2a" style="width:30px;">Sn</td>
     <td align="center" class="Input2a" style="width:280px;">Sub KRA/Goals</td>
     <td align="center" class="Input2a" style="width:390px;">Sub KRA Description</td>  
     <td align="center" class="Input2a" style="width:80px;">Measure</td>
     <td align="center" class="Input2a" style="width:80px;">Unit</td>
     <td align="center" class="Input2a" style="width:60px;">Weightage</td>
	 <td align="center" class="Input2a" style="width:80px;">Logic</td>
	 <td align="center" class="Input2a" style="width:80px;">Period</td>
     <td align="center" class="Input2a" style="width:60px;">Target</td>
     </tr>
<?php if($rowSubK==0){$num=5;}elseif($rowSubK==1){$num=4;}elseif($rowSubK==2){$num=3;}elseif($rowSubK==3){$num=2;}elseif($rowSubK==4){$num=1;}elseif($rowSubK==5){$num=0;} ?>

<?php /* While Open*/ $m=1; while($rSubK=mysql_fetch_assoc($sSubK)){ ?>
  <input type="hidden" id="KraId_<?php echo $k; ?>" value="<?php echo $res['KRAId']; ?>" />
  <input type="hidden" id="SubKraId_<?php echo $k.'_'.$m; ?>" value="<?php echo $rSubK['KRASubId']; ?>" />
  <tr style="background-color:#FFFFFF;">
  <?php if($m==1){ ?>
   <td rowspan="5" class="Input2a" style="background-color:#71FF71;border:hidden;width:50px;" valign="middle" align="center">Sub<br>KRA<br><br><input type="button" style="width:90%;text-align:center;" value="save" onClick="SaveKraA(<?php echo $k.','.$m ?>)" <?php if($rowkk2>0){echo 'disabled';} ?>/></td>
   <?php } ?>   
  <td align="center"><input class="Inputa" style="width:100%;text-align:center;font-weight:bold;" value="<?php if($m==1){$n='a';}elseif($m==2){$n='b';}elseif($m==3){$n='c';}elseif($m==4){$n='d';}elseif($m==5){$n='e';}echo $n; ?>" readonly/><input type="hidden" id="KraIdNo_a<?php echo $k.'_'.$m; ?>"></td>
  <td align="center"><textarea id="Kra_a<?php echo $k.'_'.$m; ?>" class="Inputar2" rows="2" style="width:100%;" maxlength="348" ><?php echo $rSubK['KRA']; ?></textarea></td>
  <td align="center"><textarea id="KraDes_a<?php echo $k.'_'.$m; ?>" class="Inputar2" rows="2" style="width:100%;" maxlength="580"><?php echo $rSubK['KRA_Description']; ?></textarea></td>  
  
  <td align="center" style="background-color:#FFF;"><select id="Mea_a<?php echo $k.'_'.$m; ?>" class="Inputa" style="width:100%; height:20px;"><option value="<?php echo $rSubK['Measure']; ?>" selected><?php echo $rSubK['Measure']; ?></option><option value="Acreage">Acreage</option><option value="Event">Event</option><option value="Program">Program</option><option value="Process">Process</option><option value="Maintenance">Maintenance</option><option value="Time">Time</option><option value="Yield">Yield</option><option value="Value">Value</option><option value="Volume">Volume</option><option value="Quantity">Quantity</option><option value="Quality">Quality</option><option value="None">None</option></select></td>
  
  <td align="center" style="background-color:#FFF;"><select id="Uni_a<?php echo $k.'_'.$m; ?>" class="Inputa" style="width:100%; height:20px;"><option value="<?php echo $rSubK['Unit']; ?>" selected><?php echo $rSubK['Unit']; ?></option><option value="%">%</option><option value="Acres">Acres</option><option value="Days">Days</option><option value="Month">Month</option><option value="Hours">Hours</option><option value="Kg">Kg</option><option value="Ton">Ton</option><option value="Kg/Acre">Kg/Acre</option><option value="Number">Number</option><option value="Lakhs">Lakhs</option><option value="Rs.">Rs.</option><option value="None">None</option></select></td>
  
  <td align="center"><input type="hidden" id="WWei_a<?php echo $k.'_'.$m; ?>" value="<?php echo $rSubK['Weightage']; ?>"/>
  <input id="Wei_a<?php echo $k.'_'.$m; ?>" class="Inputa" value="<?php echo $rSubK['Weightage']; ?>" style="width:100%; text-align:center;" maxlength="8" onKeyUp="ChangeWeighta(this.value,<?php echo $k.', '.$m; ?>)" onChange="ChangeWeighta(this.value,<?php echo $k.', '.$m; ?>)"/></td>
  
  <td align="center" style="background-color:##FFF;"><select id="Log_a<?php echo $k.'_'.$m; ?>" class="Inputa" style="width:100%; height:20px;"><option value="<?php echo $rSubK['Logic']; ?>" selected><?php echo $rSubK['Logic']; ?></option><option value="Logic1">Logic1</option><option value="Logic2">Logic2</option><option value="Logic3">Logic3</option><option value="Logic4">Logic4</option><option value="Logic5">Logic5</option></select></td>
  <td align="center" style="background-color:#FFF;">
  <input type="hidden" id="PPer_a<?php echo $k.'_'.$m; ?>" value="<?php if($rSubK['Period']!=''){echo $rSubK['Period']; } else {echo 'Annual';} ?>" />
  <select id="Per_a<?php echo $k.'_'.$m; ?>" class="Inputa" style="width:100%; height:20px;"><option value="<?php echo $rSubK['Period']; ?>" selected><?php if($rSubK['Period']=='Annual'){echo 'Annually';}elseif($rSubK['Period']=='1/2 Annual'){echo 'Half Yearly';}elseif($rSubK['Period']=='Quarter'){echo 'Quarterly';}elseif($rSubK['Period']=='Monthly'){echo 'Monthly';} ?></option><option value="Annual">Annually</option><option value="1/2 Annual">Half Yearly</option><option value="Quarter">Quarterly</option><option value="Monthly">Monthly</option></select></td>
  
  
  <td align="center"><input type="hidden" id="TTar_a<?php echo $k.'_'.$m; ?>" value="0"/>
  <input id="Tar_a<?php echo $k.'_'.$m; ?>" class="Inputa" value="<?php echo intval($rSubK['Target']); ?>" style="cursor:<?php if($rSubK['Period']!='Annual' AND $rSubK['Period']!=''){echo 'pointer';} ?>;width:100%; text-align:center;text-decoration:<?php if($rSubK['Period']!='Annual' AND $rSubK['Period']!=''){ echo 'underline'; }?>;color:<?php if($rSubK['Period']!='Annual' AND $rSubK['Period']!=''){ echo '#000099'; }?>;" maxlength="8" <?php if($rSubK['Period']!='Annual' AND $rSubK['Period']!='' AND $rowkk2>0){ ?> onClick="FunSubTgt(<?php echo $rSubK['KRASubId']; ?>,'<?php echo $rSubK['Period']; ?>',<?php echo $rSubK['Target'].','.intval($rSubK['Weightage']); ?>,'<?php echo $rSubK['Logic']; ?>')" <?php } ?> onKeyUp="ChangeTargeta(this.value,<?php echo $k.', '.$m; ?>)" onChange="ChangeTargeta(this.value,<?php echo $k.', '.$m; ?>)" /></td>
  
</tr> 
<?php $m++;} ?>	
<?php /* While Close*/ ?>	
<?php if($rowkk2==0){ for($mm=$m; $mm<=5; $mm++){ ?>
  <input type="hidden" id="KraId_<?php echo $k; ?>" value="<?php echo $res['KRAId']; ?>" />
  <input type="hidden" id="SubKraId_<?php echo $k.'_'.$mm; ?>" value="" />
  <tr style="background-color:#FFFFFF;">
  <?php if($mm==1){ ?>
   <td rowspan="5" class="Input2a" style="background-color:#71FF71; border:hidden;width:50px;" valign="middle" align="center">Sub<br>KRA<br><br><input type="button" style="width:90%;text-align:center;" value="save" onClick="SaveKraA(<?php echo $k.','.$mm ?>)" <?php if($rowkk2>0){echo 'disabled';} ?>/></td>
   <?php } ?>   
  <td class="tdc"><?php if($mm==1){$n='a';}elseif($mm==2){$n='b';}elseif($mm==3){$n='c';}elseif($mm==4){$n='d';}elseif($mm==5){$n='e';}echo $n.')'; ?><input type="hidden" id="KraIdNo_a<?php echo $k.'_'.$m; ?>"></td>
  <td class="tdc"><textarea id="Kra_a<?php echo $k.'_'.$mm; ?>" class="Inputar2" rows="2" style="width:100%;" maxlength="348" ></textarea></td>
  <td class="tdc"><textarea id="KraDes_a<?php echo $k.'_'.$mm; ?>" class="Inputar2" rows="2" style="width:100%;" maxlength="580"></textarea></td>  
  <td class="tdc"><select id="Mea_a<?php echo $k.'_'.$mm; ?>" class="Inputa" style="width:100%; height:20px;"><option value="Acreage">Acreage</option><option value="Event">Event</option><option value="Program">Program</option><option value="Process">Process</option><option value="Maintenance">Maintenance</option><option value="Time">Time</option><option value="Yield">Yield</option><option value="Value">Value</option><option value="Volume">Volume</option><option value="Quantity">Quantity</option><option value="Quality">Quality</option><option value="None" selected>None</option></select></td>
  
  <td class="tdc"><select id="Uni_a<?php echo $k.'_'.$mm; ?>" class="Inputa" style="width:100%; height:20px;"><option value="%">%</option><option value="Acres">Acres</option><option value="Days">Days</option><option value="Month">Month</option><option value="Hours">Hours</option><option value="Kg">Kg</option><option value="Ton">Ton</option><option value="Kg/Acre">Kg/Acre</option><option value="Number">Number</option><option value="Lakhs">Lakhs</option><option value="Rs.">Rs.</option><option value="None" selected>None</option></select></td>
  
  <td class="tdc"><input type="hidden" id="WWei_a<?php echo $k.'_'.$mm; ?>" value="0"/>
  <input id="Wei_a<?php echo $k.'_'.$mm; ?>" class="Inputa" style="width:100%; text-align:center;" maxlength="8" onKeyUp="ChangeWeighta(this.value,<?php echo $k.', '.$mm; ?>)" onChange="ChangeWeighta(this.value,<?php echo $k.', '.$mm; ?>)"/></td>
  
  <td class="tdc"><select id="Log_a<?php echo $k.'_'.$mm; ?>" class="Inputa" style="width:100%; height:20px;"><option value="Logic1">Logic1</option><option value="Logic2">Logic2</option><option value="Logic3">Logic3</option><option value="Logic4">Logic4</option><option value="Logic5">Logic5</option></select></td>
  <td class="tdc">
  <input type="hidden" id="PPer_a<?php echo $k.'_'.$mm; ?>" value="Annual" />
  <select id="Per_a<?php echo $k.'_'.$mm; ?>" class="Inputa" style="width:100%; height:20px;"><option value="Annual">Annually</option><option value="1/2 Annual">Half Yearly</option><option value="Quarter">Quarterly</option><option value="Monthly">Monthly</option></select></td>  
  
  
  <td class="tdc"><input type="hidden" id="TTar_a<?php echo $k.'_'.$mm; ?>" value="0"/>
  <input id="Tar_a<?php echo $k.'_'.$mm; ?>" class="Inputa" style="width:100%; text-align:center;" maxlength="8" onKeyUp="ChangeTargeta(this.value,<?php echo $k.', '.$mm; ?>)" onChange="ChangeTargeta(this.value,<?php echo $k.', '.$mm; ?>)" /></td>
  
</tr> 
<?php } } ?>	 
     </table>
  </div> 
  </td>
 </tr>
<?php /* &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& End End */ ?> 
<?php /* &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& End End */ ?>   
  
  </table>
  </td>
</tr>	  
<?php $k++; $tn=$k-1;  $j=$k; } ?> <input type="hidden" id="EditTNRow" name="EditTNRow" value="<?php echo $tn; ?>" /> 
<?php } elseif($rowk==0) { for($i=1; $i<=5; $i++) { ?> 
<tr id="TR_<?php echo $i; ?>">	
  <td style="width:2%;"></td> 
  <td colspan="8" style="width:98%;">
   <table id="Row_<?php echo $i; ?>" style="width:100%;" bgcolor="#FFFFFF" border="1" cellspacing="0"> 
    <tr bgcolor="#FFFFFF">                                          
     <td class="tdc" style="width:30px;"><?php echo $i; ?><input type="hidden" id="KraIdNo_<?php echo $i; ?>"><input type="hidden" id="SubKraRow_<?php echo $i; ?>" value="0"></td>
     <td class="tdc" style="width:300px;"><textarea name="KRA_<?php echo $i; ?>" id="KRA_<?php echo $i; ?>" class="Inputar" rows="3" style="width:100%;" maxlength="348"></textarea></td>
     <td class="tdc" style="width:400px;"><textarea name="KRADes_<?php echo $i; ?>" id="KRADes_<?php echo $i; ?>" class="Inputar" rows="3" style="width:100%;" maxlength="580"></textarea></td>  
     <td class="tdc" style="width:80px;"><select name="Measure_<?php echo $i; ?>" id="Measure_<?php echo $i; ?>" class="Input" style="width:100%;"><option value="Acreage">Acreage</option><option value="Event">Event</option><option value="Program">Program</option><option value="Process">Process</option><option value="Maintenance">Maintenance</option><option value="Time">Time</option><option value="Yield">Yield</option><option value="Value">Value</option><option value="Volume">Volume</option><option value="Quantity">Quantity</option><option value="Quality">Quality</option><option value="None">None</option></select></td>
     <td class="tdc" style="width:80px;"><select name="Unit_<?php echo $i; ?>" id="Unit_<?php echo $i; ?>" class="Input" style="width:100%;"><option value="%">%</option><option value="Acres">Acres</option><option value="Days">Days</option><option value="Month">Month</option><option value="Hours">Hours</option><option value="Days/Hours">Days/Hours</option><option value="Kg">Kg</option><option value="Ton">Ton</option><option value="Kg/Acre">Kg/Acre</option><option value="Number">Number</option><option value="Lakhs">Lakhs</option><option value="Rs.">Rs.</option><option value="None">None</option></select></td>
     <td class="tdc" style="width:60px;"><input type="hidden" name="WWeightage_<?php echo $i; ?>" id="WWeightage_<?php echo $i; ?>" value="0"/><input name="Weightage_<?php echo $i; ?>" id="Weightage_<?php echo $i; ?>" class="Input" style="width:100%; text-align:center;" maxlength="8" onChange="ChangeWeight(<?php echo $i; ?>)"/></td>
     <td class="tdc" style="width:80px;"><select name="Logic_<?php echo $i; ?>" id="Logic_<?php echo $i; ?>" class="Input" style="width:100%;" onChange="ChangeLogic(<?php echo $i; ?>)"><option value="Logic1">Logic1</option><option value="Logic2">Logic2</option><option value="Logic3">Logic3</option><option value="Logic4">Logic4</option><option value="Logic5">Logic5</option></select></td>
     <td class="tdc" style="width:80px;"><select name="Period_<?php echo $i; ?>" id="Period_<?php echo $i; ?>" class="Input" style="width:100%;" onChange="ChangePeriod(<?php echo $i; ?>)"><option value="Annual">Annually</option><option value="1/2 Annual">Half Yearly</option><option value="Quarter">Quarterly</option><option value="Monthly">Monthly</option></select></td>
     <td class="tdc" style="width:60px;"><input type="hidden" name="TTarget_<?php echo $i; ?>" id="TTarget_<?php echo $i; ?>" value="0"/><input name="Target_<?php echo $i; ?>" id="Target_<?php echo $i; ?>" class="Input" style="width:100%;text-align:center;" maxlength="8" onChange="ChangeTarget(<?php echo $i; ?>)" value="<?php if($RD['DepartmentId']!=6) { echo '100'; } elseif($RD['DepartmentId']==6) { echo '0'; }?>" /></td>
    </tr>
   </table>
  </td>
 </tr>
 <?php $j=$i+1; } } for($i=$j; $i<=15; $i++) { if($rowkk2==0){ ?> 
 <tr id="TR_<?php echo $i; ?>">
  <td class="tdc" style="width:2%;background-image:url(images/pmsback.png);" id="AppImg_<?php echo $i; ?>"><?php if($rowkk2>0){echo '&nbsp;&nbsp;';}if($rowkk2==0) { ?><img src="images/Addnew.png" <?php if($i>$j) { echo 'style="display:none;"';} ?> border="0" id="addImg_<?php echo $i; ?>" onClick="ShowRow(<?php echo $i; ?>)"/><?php } ?><img src="images/Minusnew.png" id="minusImg_<?php echo $i; ?>" <?php if($i>=$j){ echo 'style="display:none;"'; } ?> border="0" onClick="HideRow(<?php echo $i; ?>)"/></td>	 
  <td colspan="8" style="width:98%;">
   <table style="display:none;" id="Row_<?php echo $i; ?>" style="width:100%;" border="1" cellspacing="0">
    <tr bgcolor="#FFFFFF"> 
     <td class="tdc" style="width:32px;"><?php echo $i; ?><input type="hidden" id="KraIdNo_<?php echo $i; ?>"><input type="hidden" id="SubKraRow_<?php echo $i; ?>" value="0"></td>
     <td class="tdc" style="width:315px;"><textarea name="KRA_<?php echo $i; ?>" id="KRA_<?php echo $i; ?>" class="Inputar" rows="3" style="width:100%;" maxlength="348"></textarea></td>
     <td class="tdc" style="width:420px;"><textarea name="KRADes_<?php echo $i; ?>" id="KRADes_<?php echo $i; ?>" class="Inputar" rows="3" style="width:100%;" maxlength="580"></textarea></td>  
     <td class="tdc" style="width:85px;"><select name="Measure_<?php echo $i; ?>" id="Measure_<?php echo $i; ?>" class="Input" style="width:100%;"><option value="Acreage">Acreage</option><option value="Event">Event</option><option value="Program">Program</option><option value="Process">Process</option><option value="Maintenance">Maintenance</option><option value="Time">Time</option><option value="Yield">Yield</option><option value="Value">Value</option><option value="Volume">Volume</option><option value="Quantity">Quantity</option><option value="Quality">Quality</option><option value="None">None</option></select></td>
     <td class="tdc" style="width:84px;">
  <select name="Unit_<?php echo $i; ?>" id="Unit_<?php echo $i; ?>" class="Input" style="width:100%;">
  <option value="%">%</option><option value="Acres">Acres</option><option value="Days">Days</option><option value="Month">Month</option><option value="Hours">Hours</option><option value="Days/Hours">Days/Hours</option>
  <option value="Kg">Kg</option><option value="Ton">Ton</option><option value="Kg/Acre">Kg/Acre</option><option value="Number">Number</option><option value="Lakhs">Lakhs</option><option value="Rs.">Rs.</option><option value="None">None</option></select></td>
     <td class="tdc" style="width:63px;"><input type="hidden" name="WWeightage_<?php echo $i; ?>" id="WWeightage_<?php echo $i; ?>" value="0"/><input name="Weightage_<?php echo $i; ?>" id="Weightage_<?php echo $i; ?>" class="Input" style="width:100%;text-align:center;" maxlength="8" onChange="ChangeWeight(<?php echo $i; ?>)" /></td>
     <td class="tdc" style="width:85px;"><select name="Logic_<?php echo $i; ?>" id="Logic_<?php echo $i; ?>" class="Input" style="width:100%;" onChange="ChangeLogic(<?php echo $i; ?>)"><option value="Logic1">Logic1</option><option value="Logic2">Logic2</option><option value="Logic3">Logic3</option><option value="Logic4">Logic4</option><option value="Logic5">Logic5</option></select></td>
     <td class="tdc" style="width:84px;"><select name="Period_<?php echo $i; ?>" id="Period_<?php echo $i; ?>" class="Input" style="width:100%;" onChange="ChangePeriod(<?php echo $i; ?>)"><option value="Annual">Annually</option><option value="1/2 Annual">Half Yearly</option><option value="Quarter">Quarterly</option><option value="Monthly">Monthly</option></select></td>
  
     <td class="tdc" style="width:62px;"><input type="hidden" name="TTarget_<?php echo $i; ?>" id="TTarget_<?php echo $i; ?>" value="0"/><input name="Target_<?php echo $i; ?>" id="Target_<?php echo $i; ?>" class="Input" style="width:100%; text-align:center;" maxlength="8" onChange="ChangeTarget(<?php echo $i; ?>)" value="<?php if($RD['DepartmentId']!=6) { echo '100'; } elseif($RD['DepartmentId']==6){ echo '0'; }?>" /></td>
    </tr>
   </table>
  </td>
 </tr>
<?php } } ?> 
 </table>
 </td>
</tr>
</form>  
<tr><td>&nbsp;</td></tr>
<?php /* if($rowkk2>0){ ?>
<tr>
<?php /****************************************** Form-B Start ************************** ?>
<?php /****************************************** Form-B Start ************************** ?>	 
<form name="SkillFormB" method="post" onSubmit="return ValidationFormB(this)"> 
<td id="FormB" style="width:100%;">
<table border="1" style="width:100%;" cellspacing="0">
 <tr><td colspan="7" align="center" class="font" style=" height:25px;color:#000084;width:100%;background-color:#EEF0AA;" valign="middle">Form - B (Behavioral/Skills)</td></tr>
 <tr style="height:25px;background-color:#EEF0AA;">   
  <td class="font" align="center" style="width:40px;">SNo.</td>
  <td class="font" align="center" style="width:250px;">Behavioral/Skills</td>
  <td class="font" align="center" style="width:550px;">Description</td>
  <td class="font" align="center" style="width:60px;">Weightage</td>
  <td class="font" align="center" style="width:60px;">Logic</td>
  <td class="font" align="center" style="width:60px;">Period</td>
  <td class="font" align="center" style="width:60px;">Target</td>
 </tr>
 
<?php $sqlBY=mysql_query("select fbf.*,fb.Skill,fb.SkillComment,fb.Weightage,fb.Logic,fb.Period,fb.Target from hrm_employee_pms_behavioralformb fbf inner join hrm_pms_formb fb on fbf.FormBId=fb.FormBId where fbf.EmpId=".$EmployeeId." AND fbf.YearId=".$_SESSION['KraYId']." order by fbf.BehavioralFormBId ASC", $con);	  
$SnoB=1; while($resBY=mysql_fetch_array($sqlBY)){ ?>
 <tr bgcolor="#FFFFFF">   
  <td class="font1" align="center"><?php echo $SnoB; ?></td>	  
  <td class="font1" valign="top"><?php echo ucwords(strtolower($resBY['Skill'])); ?></td>
  <td class="font1" valign="top"><?php echo $resBY['SkillComment']; ?></td>
  <td class="font1" align="center"><?php echo $resBY['Weightage']; ?></td>
  <td class="font1" align="center"><?php echo $resBY['Logic']; ?></td>
  <td class="font1" align="center"><?php echo $resBY['Period']; ?></td>
  <td class="font1" align="center"><span <?php if($resBY['Period']!='Annual' AND $resBY['Period']!=''){ echo 'style="cursor:pointer;text-decoration:underline;color:#000099;"';} if($resBY['Period']!='Annual' AND $resBY['Period']!=''){ ?> onClick="FunSubFormBTgt(<?php echo $resSY['CurrY'].','.$resBY['FormBId']; ?>,'<?php echo $resBY['Period']; ?>',<?php echo $resBY['Target'].','.intval($resBY['Weightage']); ?>,'<?php echo $resBY['Logic']; ?>')" <?php } ?>  ><?php echo $resBY['Target']; ?></span></td>
 </tr> 
<?php $SnoB++;} ?>
								 								 	  	 	  
</table>
</td>
</form>   
<?php /****************************************** Form-B Close ************************** ?>
<?php /****************************************** Form-B Close ************************** ?>
</tr>
<tr><td>&nbsp;</td></tr>
<?php } */?>



<?php //}  ?> 
	 </table>
   </td> 
<?php /****************************************** Form Close **************************/ ?>		   
		</tr>
	  </table>
	</td>
   </tr>
   
  </table>
 </td>
</tr>					
<?php //************************************ Close ********************************** ?>					
				  </table>
				 </td>
			  </tr>
			</table>
           </td>
			  </tr>
	        </table>
			
<?php //************************************************************************* ?>
		   </td>
		   
		  </tr>
		</table>
	  </td>
	</tr>
	
	
	<tr>
	  <td valign="top">
	    <?php require_once("../footer.php"); ?>
	  </td>
	</tr>
  </table>
 </td>
</tr>
</table>
</body>
</html>

