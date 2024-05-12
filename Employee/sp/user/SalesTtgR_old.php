<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');}
include("../function.php");
include('codeEncDec.php');
if(check_user()==false){header('Location:../../../index.php');}
if($_SESSION['login'] = true){require_once('UserMenuSession.php');}
?>
<?php 
?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
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
.mousechange:hover{cursor:pointer;}
.inner_table { height:380px;overflow-y:auto;width:auto; }
</style>
<?php //.inner_table { height:500px; overflow-y: auto; width:1150px; }  <div class="inner_table"></div> ?>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<Script type="text/javascript">window.history.forward(1);</Script>
<Script language="javascript">
function ChangrYear(YearV,ci) 
{
  var c=0; var s=0; var hq=0; var ta=document.getElementById("ta").value; var tb=document.getElementById("tb").value; var tc=document.getElementById("tc").value;
  window.location="SalesTtgR.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y="+YearV+"&ci="+ci+"&c="+c+"&s="+s+"&hq="+hq+"&ta="+ta+"&tb="+tb+"&tc="+tc;
}

function ClickCoutry(v)
{ 
  var State=0; var Hq=0; var y=document.getElementById("YearV").value; var ta=document.getElementById("ta").value; var tb=document.getElementById("tb").value;
  var tc=document.getElementById("tc").value;
  window.location="SalesTtgR.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&c="+v+"&s="+State+"&hq="+Hq+"&y="+y+"&ta="+ta+"&tb="+tb+"&tc="+tc; 
}
function ClickState(v)
{
  var Coutry=document.getElementById("Coutry").value; var Hq=0; var y=document.getElementById("YearV").value;
  var ta=document.getElementById("ta").value; var tb=document.getElementById("tb").value; var tc=document.getElementById("tc").value;
  window.location="SalesTtgR.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&c="+Coutry+"&s="+v+"&hq="+Hq+"&y="+y+"&ta="+ta+"&tb="+tb+"&tc="+tc; 
}

function ClickChkHq(no,hqi)
{ if(document.getElementById("Chk_"+no).checked==true){document.getElementById("Inp_"+no).value=hqi;}
  else if(document.getElementById("Chk_"+no).checked==false){document.getElementById("Inp_"+no).value=0;} 
}

function FunChkSubmit()
{ 
  var Coutry=document.getElementById("Coutry").value; var State=document.getElementById("State").value; var y=document.getElementById("YearV").value;
  var ta=document.getElementById("ta").value; var tb=document.getElementById("tb").value; var tc=document.getElementById("tc").value; var no=document.getElementById("no").value;
  var s1=document.getElementById("Inp_1").value; var s2=document.getElementById("Inp_2").value; var s3=document.getElementById("Inp_3").value; var s4=document.getElementById("Inp_5").value;
  var s5=document.getElementById("Inp_6").value; var s6=document.getElementById("Inp_7").value;	var s7=document.getElementById("Inp_7").value; var s8=document.getElementById("Inp_8").value;
  var s9=document.getElementById("Inp_9").value; var s10=document.getElementById("Inp_10").value; var s11=document.getElementById("Inp_11").value; var s12=document.getElementById("Inp_12").value;
  var s13=document.getElementById("Inp_13").value; var s14=document.getElementById("Inp_14").value;	var s15=document.getElementById("Inp_15").value; var s16=document.getElementById("Inp_16").value;
  var s17=document.getElementById("Inp_17").value; var s18=document.getElementById("Inp_18").value;	var s19=document.getElementById("Inp_19").value; var s20=document.getElementById("Inp_20").value;
  var s21=document.getElementById("Inp_21").value; var s22=document.getElementById("Inp_22").value;	var s23=document.getElementById("Inp_23").value; var s24=document.getElementById("Inp_24").value;
  var s25=document.getElementById("Inp_25").value; var s26=document.getElementById("Inp_26").value;	var s27=document.getElementById("Inp_27").value; var s28=document.getElementById("Inp_28").value;
  var s29=document.getElementById("Inp_29").value; var s30=document.getElementById("Inp_30").value;	var s31=document.getElementById("Inp_31").value; var s32=document.getElementById("Inp_32").value;
  var s33=document.getElementById("Inp_33").value; var s34=document.getElementById("Inp_34").value;	var s35=document.getElementById("Inp_35").value;  
    
  window.location="SalesTtgR.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&c="+Coutry+"&s="+State+"&y="+y+"&ta="+ta+"&tb="+tb+"&tc="+tc+"&hq1="+s1+"&hq2="+s2+"&hq3="+s3+"&hq4="+s4+"&hq5="+s5+"&hq6="+s6+"&hq7="+s7+"&hq8="+s8+"&hq9="+s9+"&hq10="+s10+"&hq11="+s11+"&hq12="+s12+"&hq13="+s13+"&hq14="+s14+"&hq15="+s15+"&hq16="+s16+"&hq17="+s17+"&hq18="+s18+"&hq19="+s19+"&hq20="+s20+"&hq21="+s21+"&hq22="+s22+"&hq23="+s23+"&hq24="+s24+"&hq25="+s25+"&hq26="+s26+"&hq27="+s27+"&hq28="+s28+"&hq29="+s29+"&hq30="+s30+"&hq31="+s31+"&hq32="+s32+"&hq33="+s33+"&hq34="+s34+"&hq35="+s35+"&Multihq=88&act=Multihq"; 
}



function ClickHq(v)
{
  var Coutry=document.getElementById("Coutry").value; var State=document.getElementById("State").value; var y=document.getElementById("YearV").value;
  var ta=document.getElementById("ta").value; var tb=document.getElementById("tb").value; var tc=document.getElementById("tc").value;
  window.location="SalesTtgR.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&c="+Coutry+"&s="+State+"&hq="+v+"&y="+y+"&ta="+ta+"&tb="+tb+"&tc="+tc;
}

function CB1Click()
{ var tb=document.getElementById("tb").value; var tc=document.getElementById("tc").value; var hq=document.getElementById("Hq").value;
  var Coutry=document.getElementById("Coutry").value; var State=document.getElementById("State").value; var y=document.getElementById("YearV").value;
  if(document.getElementById("FChkk1").checked==true){ window.location="SalesTtgR.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&c="+Coutry+"&s="+State+"&hq="+hq+"&y="+y+"&ta=1&tb="+tb+"&tc="+tc; }
  else if(document.getElementById("FChkk1").checked==false){ window.location="SalesTtgR.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&c="+Coutry+"&s="+State+"&hq="+hq+"&y="+y+"&ta=0&tb="+tb+"&tc="+tc; }
}

function CB2Click()
{ var ta=document.getElementById("ta").value; var tc=document.getElementById("tc").value; var hq=document.getElementById("Hq").value;
  var Coutry=document.getElementById("Coutry").value; var State=document.getElementById("State").value; var y=document.getElementById("YearV").value;
  if(document.getElementById("FChkk2").checked==true){ window.location="SalesTtgR.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&c="+Coutry+"&s="+State+"&hq="+hq+"&y="+y+"&tb=1&ta="+ta+"&tc="+tc; }
  else if(document.getElementById("FChkk2").checked==false){ window.location="SalesTtgR.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&c="+Coutry+"&s="+State+"&hq="+hq+"&y="+y+"&tb=0&ta="+ta+"&tc="+tc; }
}

function CB3Click()
{ var ta=document.getElementById("ta").value; var tb=document.getElementById("tb").value; var hq=document.getElementById("Hq").value;
  var Coutry=document.getElementById("Coutry").value; var State=document.getElementById("State").value; var y=document.getElementById("YearV").value;
  if(document.getElementById("FChkk3").checked==true){ window.location="SalesTtgR.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&c="+Coutry+"&s="+State+"&hq="+hq+"&y="+y+"&tb="+tb+"&ta="+ta+"&tc=1"; }
  else if(document.getElementById("FChkk3").checked==false){ window.location="SalesTtgR.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&c="+Coutry+"&s="+State+"&hq="+hq+"&y="+y+"&tb="+tb+"&ta="+ta+"&tc=0"; }
}


function FunCBClick(sn)
{ var ta=document.getElementById("ta").value; var tb=document.getElementById("tb").value; var tc=document.getElementById("tc").value;
if(document.getElementById("Chk_"+sn).checked==true){ document.getElementById("TR_"+sn).style.background='#FFC4FF';
   if(ta==1){document.getElementById("TDSave1_"+sn).style.background='#FFC4FF';} 
   if(tb==1){document.getElementById("TDSave2_"+sn).style.background='#FFC4FF';}
   if(tc==1){document.getElementById("TDSave3_"+sn).style.background='#FFC4FF';} }
else if(document.getElementById("Chk_"+sn).checked==false){document.getElementById("TR_"+sn).style.background='#FFFFFF';
   if(ta==1){document.getElementById("TDSave1_"+sn).style.background='#BFFC6D';}
   if(tb==1){ document.getElementById("TDSave2_"+sn).style.background='#BFFC6D';}
   if(tc==1){ document.getElementById("TDSave3_"+sn).style.background='#BFFC6D';} }
}

/******************************************/
function FunHqChk(no,hqi,yi) 
{ var ei=document.getElementById("EId").value; 
  if(document.getElementById("HqChk"+no).checked==true)
  { var agree=confirm("Are you sure you want to approve head quarter?")
    if(agree){ var url = 'SalesTtgRAct.php'; var pars = 'act=Hqverify&hqi='+hqi+'&yi='+yi+'&ei='+ei+'&no='+no;	
    var myAjax = new Ajax.Request( url, { method: 'post', parameters: pars, onComplete: show_SalesHqVarify }); }
	else{ document.getElementById("HqChk"+no).checked=false; return false;} 
  }
}
function show_SalesHqVarify(originalRequest)
{ document.getElementById('ResultSpan').innerHTML = originalRequest.responseText; var no=document.getElementById("no").value; var yi=document.getElementById("yi").value;
  document.getElementById("HqChk"+no).disabled=true; //document.getElementById("Rmkhq"+no).disabled=true;
  //document.getElementById("SpnHq"+no).style.display='none';
}

function HQFSaveClick(no,hqi,yi)
{
  var ei=document.getElementById("EId").value; var rmk=document.getElementById("Rmkhq"+no).value;
  if(rmk==''){alert("please type remark."); return false;}
  else if(rmk!=''){ actRmk =  rmk.replace(/[^a-zA-Z 0-9.,='']+/g,''); var agree=confirm("Are you sure you save remark?")
    if(agree)
    { var url = 'SalesTtgRAct.php'; var pars = 'act=HQsaveRemark&no='+no+'&hqi='+hqi+'&yi='+yi+'&ei='+ei+'&rmk='+actRmk;	
      var myAjax = new Ajax.Request( url, { method: 'post', parameters: pars, onComplete: show_HQSalesVarify }); 
    }
    else{return false;} 
  }
}
function show_HQSalesVarify(originalRequest)
{ document.getElementById('ResultSpan').innerHTML = originalRequest.responseText; var no=document.getElementById("no").value; var yi=document.getElementById("yi").value;
  document.getElementById("HqChk"+no).disabled=true; //document.getElementById("Rmkhq"+no).readOnly=true;
  //document.getElementById("SpnHq"+no).style.display='none';
}


function FunStChk(no,si,yi) 
{ var ei=document.getElementById("EId").value; 
  if(document.getElementById("StChk"+no).checked==true)
  { var agree=confirm("Are you sure you want to approve state?")
    if(agree){ var url = 'SalesTtgRAct.php'; var pars = 'act=Stverify&si='+si+'&yi='+yi+'&ei='+ei+'&no='+no;	
    var myAjax = new Ajax.Request( url, { method: 'post', parameters: pars, onComplete: show_SalesStVarify }); }
	else{ document.getElementById("StChk"+no).checked=false; return false;} 
  }
}
function show_SalesStVarify(originalRequest)
{ document.getElementById('ResultSpan').innerHTML = originalRequest.responseText; var no=document.getElementById("no").value; var yi=document.getElementById("yi").value;
  document.getElementById("StChk"+no).disabled=true; //document.getElementById("RmkSt"+no).disabled=true;
  //document.getElementById("SpnSt"+no).style.display='none';
}

function SFSaveClick(no,si,yi)
{
  var ei=document.getElementById("EId").value; var rmk=document.getElementById("RmkSt"+no).value;
  if(rmk==''){alert("please type remark."); return false;}
  else if(rmk!=''){ actRmk =  rmk.replace(/[^a-zA-Z 0-9.,='']+/g,''); var agree=confirm("Are you sure you save remark?")
    if(agree)
    { var url = 'SalesTtgRAct.php'; var pars = 'act=StsaveRemark&no='+no+'&si='+si+'&yi='+yi+'&ei='+ei+'&rmk='+actRmk;	
      var myAjax = new Ajax.Request( url, { method: 'post', parameters: pars, onComplete: show_StSalesVarify }); 
    }
    else{return false;} 
  }
}
function show_StSalesVarify(originalRequest)
{ document.getElementById('ResultSpan').innerHTML = originalRequest.responseText; var no=document.getElementById("no").value; var yi=document.getElementById("yi").value;
  document.getElementById("StChk"+no).disabled=true; //document.getElementById("RmkSt"+no).readOnly=true;
  //document.getElementById("SpnSt"+no).style.display='none';
}

/******************************************/
function FunOpenRecrd(yi,di)
{ window.open("Dsywr.php?uu=ok&Event=Edit&oo=we&p=g&ok=true&rslt=y&pp=qw&di="+di+"&yi="+yi, '_blank'); window.focus(); }

function FChkApClick(sn,di,yi) 
{ var ei=document.getElementById("EId").value; 
  if(document.getElementById("AppChk"+yi+"_"+sn).checked==true)
  { var agree=confirm("Are you sure you want to approve?")
    if(agree)
	{ var chek=1;
	  var url = 'SalesTtgRAct.php'; var pars = 'act=verify&sn='+sn+'&di='+di+'&yi='+yi+'&ei='+ei+'&chek='+chek;	
      var myAjax = new Ajax.Request( url, { method: 'post', parameters: pars, onComplete: show_SalesVarify }); 
	}
	else{ var chek=0; document.getElementById("AppChk"+yi+"_"+sn).checked=false; return false;} 
  }
}
function show_SalesVarify(originalRequest)
{ document.getElementById('ResultSpan').innerHTML = originalRequest.responseText; var sn=document.getElementById("sn").value; var yi=document.getElementById("yi").value;
  document.getElementById("AppChk"+yi+"_"+sn).disabled=true; //document.getElementById("Remark"+yi+"_"+sn).disabled=true;
  //document.getElementById("Span"+yi+"_"+sn).style.display='none';
}

function FSaveClick(sn,di,yi) 
{ var ei=document.getElementById("EId").value; var rmk=document.getElementById("Remark"+yi+"_"+sn).value;
  if(rmk==''){alert("please type remark.."); return false;}
  else if(rmk!='')
  { 
   actRmk =  rmk.replace(/[^a-zA-Z 0-9.,='']+/g,'');
   var agree=confirm("Are you sure you save remark?")
    if(agree)
    { 
	  var url = 'SalesTtgRAct.php'; var pars = 'act=saveRemark&sn='+sn+'&di='+di+'&yi='+yi+'&ei='+ei+'&rmk='+actRmk;	
      var myAjax = new Ajax.Request( url, { method: 'post', parameters: pars, onComplete: show_SalesVarify }); 
    }
    else{return false;} 
  }
 }
function show_SalesVarify(originalRequest)
{ document.getElementById('ResultSpan').innerHTML = originalRequest.responseText; var sn=document.getElementById("sn").value; var yi=document.getElementById("yi").value;
  document.getElementById("AppChk"+yi+"_"+sn).disabled=true; //document.getElementById("Remark"+yi+"_"+sn).readOnly=true;
  //document.getElementById("Span"+yi+"_"+sn).style.display='none';
}

</Script>
</head>
<body class="body"><font color="#FFC4FF"></font>
<span id="ResultSpan"></span>
<?php $sqlDept=mysql_query("select DepartmentId from hrm_employee_general where EmployeeID=".$EmployeeId, $con); $resDept=mysql_fetch_assoc($sqlDept); ?>
<table class="table">
<tr>
 <td>
  <table class="menutable"><tr><td><?php if($_SESSION['login'] = true){ require_once("EMenu.php"); } ?></td></tr></table>
 </td>
</tr>
<tr>
 <td valign="top">
  <table width="100%" style="margin-top:0px;" border="0">
    <tr>
	  <td valign="top"><?php if($_SESSION['login'] = true){ require_once("EWelcome.php"); } ?></td>
	</tr>
	 <tr>
	  <td valign="top" align="center"  width="100%" id="MainWindow">
<?php //*************************************************************************************?>
<?php //***************START*****START*****START******START******START**************************?>
<?php //****************************************************************************************************?>
<input type="hidden" id="ComId" value="<?php echo $_REQUEST['ci']; ?>" />
<input type="hidden" id="EId" value="<?php echo $EmployeeId; ?>" /><input type="hidden" id="YId" value="<?php echo $YearId; ?>" />	
<input type="hidden" id="ta" value="<?php echo $_REQUEST['ta']; ?>" /><input type="hidden" id="tb" value="<?php echo $_REQUEST['tb']; ?>" />
<input type="hidden" id="tc" value="<?php echo $_REQUEST['tc']; ?>" />		  
<table border="0" style="margin-top:0px; width:100%; height:150px;">	
<tr>
 <td valign="top" align="left">
  <table border="0">
   <tr>
    <td id="Entry" style="width:1045px;" valign="top" align="left">
	<span id="TabEntry">
     <table border="0">
	  <tr>
	   <td style="font-size:14px;height:18px;width:100px; color:#FFFF6A;"><b>TESTING :</b>&nbsp;</td>
	   <td>
		<table border="0">
		<tr>
	   <td style="font-size:11px;height:18px;width:1px;color:#E6E6E6;" align="right"><b></b>&nbsp;</td>
	   <td><input type="checkbox" id="FChkk1" onClick="CB1Click()" <?php if($_REQUEST['ta']==1){echo 'checked';} ?>/></td>
		 <td style="font-size:11px; height:18px;width:80px;color:#E6E6E6;"><b>2016-17</b></td>
		 <td ><input type="checkbox" id="FChkk2" onClick="CB2Click()" <?php if($_REQUEST['tb']==1){echo 'checked';} ?> /></td>
		 <td style="font-size:11px; height:18px;width:80px;color:#E6E6E6;"><b>2017-18</b></td>
		 <td ><input type="checkbox" id="FChkk3" onClick="CB3Click()" <?php if($_REQUEST['tc']==1){echo 'checked';} ?> /></td>
		 <td style="font-size:11px; height:18px;width:80px;color:#E6E6E6;"><b>2018-19</b></td>
	   <td style="width:10px;"><input type="hidden" name="YearV" id="YearV" value="<?php echo $_REQUEST['y']; ?>" /></td>
	    <td style="font-size:11px;height:18px;width:90px;color:#E6E6E6;" align="right"><b>Country :</b></td>
	    <td><?php if($_REQUEST['c']>0){ $sqlC=mysql_query("SELECT CountryName FROM hrm_country where CountryId=".$_REQUEST['c'], $con); $resC=mysql_fetch_array($sqlC); ?>
	<input style="font-size:12px;width:100px;height:20px;background-color:#DDFFBB;" name="CouN" id="CouN" value="&nbsp;<?php echo strtoupper($resC['CountryName']); ?>" readonly/>
		<input type="hidden" name="Coutry" id="Coutry" value="<?php echo $_REQUEST['c']; ?>" /><?php } ?>  
        </td>
	   <td>&nbsp;</td>
	   <td style="font-size:11px;height:18px;width:80px;color:#E6E6E6;" align="right"><b>State :</b></td>
	   <td>
		 <span id="StateSpan">
		 <select style="font-size:12px;width:180px;height:20px;background-color:#DDFFBB;" name="State" id="State" onChange="ClickState(this.value)">
<?php if($_REQUEST['s']>0){ $sqlS=mysql_query("SELECT StateName FROM hrm_state where StateId=".$_REQUEST['s'], $con); $resS=mysql_fetch_array($sqlS); ?>
<option value="<?php echo $_REQUEST['s']; ?>"><?php echo strtoupper($resS['StateName']); ?></option><?php }else{ ?><option value="">SELECT</option><?php } ?>
<?php if($resDept['DepartmentId']==7){ $sqlSt=mysql_query("select hrm_sales_ebillstate.StateId,StateName from hrm_sales_ebillstate INNER JOIN hrm_state ON hrm_sales_ebillstate.StateId=hrm_state.StateId where (EmployeeID=".$EmployeeId." OR EmployeeID2=".$EmployeeId." OR EmployeeID3=".$EmployeeId." OR EmployeeID4=".$EmployeeId.") order by StateName ASC", $con); }
	  elseif($EmployeeId==169 OR $EmployeeId==223){ $sqlSt=mysql_query("SELECT * FROM hrm_state order by StateName ASC", $con); } 
	  while($resSt=mysql_fetch_array($sqlSt)){ ?><option value="<?php echo $resSt['StateId']; ?>"><?php echo strtoupper($resSt['StateName']); ?></option><?php } ?>
	  <?php if($EmployeeId==116){?><option value="16">MAHARASHTRA</option><?php } ?></select>
		 </span>
		</td>
		<td>&nbsp;</td>
		<td style="font-size:11px; height:18px;width:80px;color:#E6E6E6;" align="right"><b>HQ :</b></td>
	     <td>
		 <span id="HqSpan">
		 <select style="font-size:12px;width:150px;height:20px;background-color:#DDFFBB;" name="Hq" id="Hq" onChange="ClickHq(this.value)">
<?php if($_REQUEST['hq']>0){ $sqlhq=mysql_query("SELECT HqName FROM hrm_headquater where HqId=".$_REQUEST['hq']." AND CompanyId=1", $con); $reshq=mysql_fetch_array($sqlhq); ?>
<option value="<?php echo $_REQUEST['hq']; ?>"><?php echo strtoupper($reshq['HqName']); ?></option><?php }else{ ?><option value="">SELECT</option><?php } ?>
<?php if($_REQUEST['s']>0){ $sqlhq2 = mysql_query("SELECT DISTINCT hrm_sales_dealer.HqId,HqName FROM hrm_sales_dealer INNER JOIN hrm_headquater ON hrm_sales_dealer.HqId=hrm_headquater.HqId where hrm_headquater.StateId=".$_REQUEST['s']." AND hrm_headquater.CompanyId=".$CompanyId." AND hrm_headquater.HQStatus='A' order by hrm_headquater.HqName ASC", $con); while($reshq2 = mysql_fetch_array($sqlhq2)){ ?><option value="<?php echo $reshq2['HqId']; ?>"><?php echo strtoupper($reshq2['HqName']); ?></option><?php } ?>
<?php } elseif($resDept['DepartmentId']==7){ $sqlHq=mysql_query("select HqId,HqName from hrm_headquater INNER JOIN hrm_sales_ebillstate ON hrm_headquater.StateId=hrm_sales_ebillstate.StateId where (hrm_sales_ebillstate.EmployeeID=".$EmployeeId." OR hrm_sales_ebillstate.EmployeeID2=".$EmployeeId." OR hrm_sales_ebillstate.EmployeeID3=".$EmployeeId." OR hrm_sales_ebillstate.EmployeeID4=".$EmployeeId.") order by HqName ASC", $con);}
	  elseif($EmployeeId==169 OR $EmployeeId==223){$sqlHq = mysql_query("SELECT * FROM hrm_headquater where CompanyId=".$CompanyId." AND HQStatus='A' order by HqName ASC", $con);}
	  while($resHq = mysql_fetch_array($sqlHq)){ ?><option value="<?php echo $resHq['HqId']; ?>"><?php echo strtoupper($resHq['HqName']); ?></option><?php } ?>
</select>
		 </span>
		 <?php //"SELECT * FROM hrm_headquater where StateId=".$_REQUEST['s']." AND CompanyId=1 AND HQStatus='A' order by HqName ASC" ?>
		 </td>
		</tr>
		</table>
		</td> 
		 <td>&nbsp;</td>
	  </tr>
<?php if($_REQUEST['s']>0) { ?>	  
	  <tr>
	   <td colspan="12">
	   <table>
<tr>
 <td>
  <table border="0" cellpadding="0" cellspacing="4" cellpadding="0"> 
   <tr> 
<?php $sqls=mysql_query("SELECT DISTINCT hrm_sales_dealer.HqId,HqName FROM hrm_sales_dealer INNER JOIN hrm_headquater ON hrm_sales_dealer.HqId=hrm_headquater.HqId where hrm_headquater.StateId=".$_REQUEST['s']." AND hrm_headquater.CompanyId=".$CompanyId." AND hrm_headquater.HQStatus='A' order by hrm_headquater.HqName ASC", $con); $no=0; $rowss=mysql_num_rows($sqls); while($ress=mysql_fetch_array($sqls)){ $no=$no+1; ?>		
    <td align="center" style="height:25px;background-color:#AD6DB6;font-family:Times New Roman;font-size:14px;color:#FFFFFF;font-weight:bold; width:141px;" id="TD_<?php echo $no; ?>">
	<input type="checkbox" id="Chk_<?php echo $no; ?>" <?php if($_REQUEST['hq'.$no]>0){echo 'checked';} ?> onClick="ClickChkHq(<?php echo $no.','.$ress['HqId']; ?>)" />&nbsp;<?php echo substr_replace($ress['HqName'], '', 10); ?>
	<input type="hidden" id="s<?php echo $no; ?>" value="<?php echo $ress['HqId']; ?>" /></td>
<?php if($no%7==0) { ?></tr><tr> <?php } } ?>
 <?php if($rowss>0) { ?>
  <td align="center"><input type="button" value="Click" style="width:80px;" onClick="FunChkSubmit()" />
  <input type="hidden" id="no" value="<?php echo $no; ?>" /></td> <?php } ?>   	
  </table>

 </td>
</tr> 
	   
	   </table>
	   </td>
<?php for($no=1; $no<=35; $no++){ ?> <input type="hidden" id="Inp_<?php echo $no; ?>" value="<?php if($_REQUEST['hq'.$no]>0){echo $_REQUEST['hq'.$no]; }else{echo '0';} ?>" /> <?php } ?>	    
		 <td>&nbsp;</td>
	  </tr>
<?php } ?>	  
	   </table>
      </td>
   </tr>
  </table>
  </td>
  </tr>
<?php //2013-14->2, 2014-15->3, 2015-16->4, 2016-17->5, 2017-18->6, 2018-19->7    ?>  
  <tr>
    <td colspan="3" valign="top">
<table border="1" cellpadding="0" cellspacing="0" style="font-family:Times New Roman;font-size:14px;">
  <tr style="background-color:#D9F28C;color:#000000;"> 
   <?php if($_REQUEST['hq']>0){ $sqlhq=mysql_query("SELECT HqName FROM hrm_headquater where HqId=".$_REQUEST['hq'], $con); $reshq=mysql_fetch_array($sqlhq); ?> <td colspan="15">&nbsp;&nbsp;<b>HeadQuarter:&nbsp;<?php echo strtoupper($reshq['HqName']); ?></b>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $msgImp; ?></td>
   <?php } elseif($_REQUEST['s']>0){ $sqlS=mysql_query("SELECT StateName FROM hrm_state where StateId=".$_REQUEST['s'], $con); $resS=mysql_fetch_array($sqlS);?><td colspan="16">&nbsp;&nbsp;<b>State:&nbsp;<?php echo strtoupper($resS['StateName']); ?></b>&nbsp;&nbsp;<?php echo $msgImp; ?></td>
   <?php } ?>		
  </tr>	
   <tr style="background-color:#D5F1D1;color:#000000;"> 
   <?php if($_REQUEST['hq']>0 OR $_REQUEST['Multihq']>0){?>
    <td rowspan="2" colspan="2" align="center" style="width:193px;"><b>HQ</b></td>
	<td rowspan="2" align="center" style="width:350px;"><b>DEALER</b></td>
	<td rowspan="2" align="center" style="width:200px;"><b>CITY</b></td>
<?php if($_REQUEST['ta']==1){?><td colspan="2" align="center"><b>2016-2017</b></td><?php } ?>
<?php if($_REQUEST['tb']==1){?>	<td colspan="2" align="center"><b>2017-2018</b></td><?php } ?>
<?php if($_REQUEST['tc']==1){?>	<td colspan="2" align="center"><b>2018-2019</b></td><?php } ?>
    <td rowspan="3" align="center" style="width:17px;"><b>&nbsp;</b></td>
   <?php } elseif($_REQUEST['s']>0){?>
	<td rowspan="2" colspan="2" align="center" style="width:193px;"><b>HQ</b></td>
	<td rowspan="2" align="center" style="width:350px;"><b>DEALER</b></td>
	<td rowspan="2" align="center" style="width:200px;"><b>CITY</b></td>
<?php if($_REQUEST['ta']==1){?>	<td colspan="2" align="center"><b>2016-2017</b></td><?php } ?>
<?php if($_REQUEST['tb']==1){?>	<td colspan="2" align="center"><b>2017-2018</b></td><?php } ?>
<?php if($_REQUEST['tc']==1){?>	<td colspan="2" align="center"><b>2018-2019</b></td><?php } ?>
    <td rowspan="3" align="center" style="width:17px;"><b>&nbsp;</b></td>
	<?php } ?>			
  </tr>	  
   <tr style="background-color:#D5F1D1;color:#000000;"> 
   <?php if($_REQUEST['hq']>0 OR $_REQUEST['Multihq']>0){?> 
     <?php if($_REQUEST['ta']==1){?><td align="center" style="width:80px;"><b>achiv</b><td align="center" style="width:50px;"><b>approv</b><?php } ?>
	 <?php if($_REQUEST['tb']==1){?><td align="center" style="width:80px;"><b>achiv</b><td align="center" style="width:50px;"><b>approv</b><?php } ?>
	 <?php if($_REQUEST['tc']==1){?><td align="center" style="width:80px;"><b>achiv</b><td align="center" style="width:50px;"><b>approv</b><?php } ?>
   <?php } elseif($_REQUEST['s']>0){?>
     <?php if($_REQUEST['ta']==1){?><td align="center" style="width:80px;"><b>achiv</b><td align="center" style="width:50px;"><b>approv</b><?php } ?>
	 <?php if($_REQUEST['tb']==1){?><td align="center" style="width:80px;"><b>achiv</b><td align="center" style="width:50px;"><b>approv</b><?php } ?>
	 <?php if($_REQUEST['tc']==1){?><td align="center" style="width:80px;"><b>achiv</b><td align="center" style="width:50px;"><b>approv</b><?php } ?>
   <?php } ?>			
  </tr>	
<?php 
if($_REQUEST['hq']>0)
{ 
 if($_REQUEST['ta']==1){ $hq1=mysql_query("select SUM(M1_Ach) as sM1,SUM(M2_Ach) as sM2,SUM(M3_Ach) as sM3,SUM(M4_Ach) as sM4,SUM(M5_Ach) as sM5,SUM(M6_Ach) as sM6,SUM(M7_Ach) as sM7,SUM(M8_Ach) as sM8,SUM(M9_Ach) as sM9,SUM(M10_Ach) as sM10,SUM(M11_Ach) as sM11,SUM(M12_Ach) as sM12 from hrm_sales_sal_details_5 INNER JOIN hrm_sales_dealer ON hrm_sales_sal_details_5.DealerId=hrm_sales_dealer.DealerId where hrm_sales_sal_details_5.YearId=5 AND hrm_sales_dealer.HqId=".$_REQUEST['hq'], $con); $rhq1=mysql_fetch_assoc($hq1);$TotHq1=$rhq1['sM1']+$rhq1['sM2']+$rhq1['sM3']+$rhq1['sM4']+$rhq1['sM5']+$rhq1['sM6']+$rhq1['sM7']+$rhq1['sM8']+$rhq1['sM9']+$rhq1['sM10']+$rhq1['sM11']+$rhq1['sM12']; $AppHq1=mysql_query("select * from hrm_sales_achive_approved_hq where HqId=".$_REQUEST['hq']." AND YearId=3", $con); $rAppHq1=mysql_num_rows($AppHq1); $resAppHq1=mysql_fetch_assoc($AppHq1); } 
 if($_REQUEST['tb']==1){ $hq2=mysql_query("select SUM(M1_Ach) as sM1,SUM(M2_Ach) as sM2,SUM(M3_Ach) as sM3,SUM(M4_Ach) as sM4,SUM(M5_Ach) as sM5,SUM(M6_Ach) as sM6,SUM(M7_Ach) as sM7,SUM(M8_Ach) as sM8,SUM(M9_Ach) as sM9,SUM(M10_Ach) as sM10,SUM(M11_Ach) as sM11,SUM(M12_Ach) as sM12 from hrm_sales_sal_details_6 INNER JOIN hrm_sales_dealer ON hrm_sales_sal_details_6.DealerId=hrm_sales_dealer.DealerId where hrm_sales_sal_details_6.YearId=6 AND hrm_sales_dealer.HqId=".$_REQUEST['hq'], $con); $rhq2=mysql_fetch_assoc($hq2);
$TotHq2=$rhq2['sM1']+$rhq2['sM2']+$rhq2['sM3']+$rhq2['sM4']+$rhq2['sM5']+$rhq2['sM6']+$rhq2['sM7']+$rhq2['sM8']+$rhq2['sM9']+$rhq2['sM10']+$rhq2['sM11']+$rhq2['sM12'];	
$AppHq2=mysql_query("select * from hrm_sales_achive_approved_hq where HqId=".$_REQUEST['hq']." AND YearId=5", $con); $rAppHq2=mysql_num_rows($AppHq2); $resAppHq2=mysql_fetch_assoc($AppHq2); } 
 if($_REQUEST['tc']==1){ $hq3=mysql_query("select SUM(M1_Ach) as sM1,SUM(M2_Ach) as sM2,SUM(M3_Ach) as sM3,SUM(M4_Ach) as sM4,SUM(M5_Ach) as sM5,SUM(M6_Ach) as sM6,SUM(M7_Ach) as sM7,SUM(M8_Ach) as sM8,SUM(M9_Ach) as sM9,SUM(M10_Ach) as sM10,SUM(M11_Ach) as sM11,SUM(M12_Ach) as sM12 from hrm_sales_sal_details_7 INNER JOIN hrm_sales_dealer ON hrm_sales_sal_details_7.DealerId=hrm_sales_dealer.DealerId where hrm_sales_sal_details_7.YearId=7 AND hrm_sales_dealer.HqId=".$_REQUEST['hq'], $con); $rhq3=mysql_fetch_assoc($hq3);$TotHq3=$rhq3['sM1']+$rhq3['sM2']+$rhq3['sM3']+$rhq3['sM4']+$rhq3['sM5']+$rhq3['sM6']+$rhq3['sM7']+$rhq3['sM8']+$rhq3['sM9']+$rhq3['sM10']+$rhq3['sM11']+$rhq3['sM12'];
$AppHq3=mysql_query("select * from hrm_sales_achive_approved_hq where HqId=".$_REQUEST['hq']." AND YearId=6", $con); $rAppHq3=mysql_num_rows($AppHq3); $resAppHq3=mysql_fetch_assoc($AppHq3); } 
} 
elseif($_REQUEST['Multihq']>0)
{ 
 if($_REQUEST['ta']==1){ $hq1=mysql_query("select SUM(M1_Ach) as sM1,SUM(M2_Ach) as sM2,SUM(M3_Ach) as sM3,SUM(M4_Ach) as sM4,SUM(M5_Ach) as sM5,SUM(M6_Ach) as sM6,SUM(M7_Ach) as sM7,SUM(M8_Ach) as sM8,SUM(M9_Ach) as sM9,SUM(M10_Ach) as sM10,SUM(M11_Ach) as sM11,SUM(M12_Ach) as sM12 from hrm_sales_sal_details_5 INNER JOIN hrm_sales_dealer ON hrm_sales_sal_details_5.DealerId=hrm_sales_dealer.DealerId where hrm_sales_sal_details_5.YearId=5 AND (hrm_sales_dealer.HqId=".$_REQUEST['hq1']." OR hrm_sales_dealer.HqId=".$_REQUEST['hq2']." OR hrm_sales_dealer.HqId=".$_REQUEST['hq3']." OR hrm_sales_dealer.HqId=".$_REQUEST['hq4']." OR hrm_sales_dealer.HqId=".$_REQUEST['hq5']." OR hrm_sales_dealer.HqId=".$_REQUEST['hq6']." OR hrm_sales_dealer.HqId=".$_REQUEST['hq7']." OR hrm_sales_dealer.HqId=".$_REQUEST['hq8']." OR hrm_sales_dealer.HqId=".$_REQUEST['hq9']." OR hrm_sales_dealer.HqId=".$_REQUEST['hq10']." OR hrm_sales_dealer.HqId=".$_REQUEST['hq11']." OR hrm_sales_dealer.HqId=".$_REQUEST['hq12']." OR hrm_sales_dealer.HqId=".$_REQUEST['hq13']." OR hrm_sales_dealer.HqId=".$_REQUEST['hq14']." OR hrm_sales_dealer.HqId=".$_REQUEST['hq15']." OR hrm_sales_dealer.HqId=".$_REQUEST['hq16']." OR hrm_sales_dealer.HqId=".$_REQUEST['hq17']." OR hrm_sales_dealer.HqId=".$_REQUEST['hq18']." OR hrm_sales_dealer.HqId=".$_REQUEST['hq19']." OR hrm_sales_dealer.HqId=".$_REQUEST['hq20']." OR hrm_sales_dealer.HqId=".$_REQUEST['hq21']." OR hrm_sales_dealer.HqId=".$_REQUEST['hq22']." OR hrm_sales_dealer.HqId=".$_REQUEST['hq23']." OR hrm_sales_dealer.HqId=".$_REQUEST['hq24']." OR hrm_sales_dealer.HqId=".$_REQUEST['hq25']." OR hrm_sales_dealer.HqId=".$_REQUEST['hq26']." OR hrm_sales_dealer.HqId=".$_REQUEST['hq27']." OR hrm_sales_dealer.HqId=".$_REQUEST['hq28']." OR hrm_sales_dealer.HqId=".$_REQUEST['hq29']." OR hrm_sales_dealer.HqId=".$_REQUEST['hq30']." OR hrm_sales_dealer.HqId=".$_REQUEST['hq31']." OR hrm_sales_dealer.HqId=".$_REQUEST['hq32']." OR hrm_sales_dealer.HqId=".$_REQUEST['hq33']." OR hrm_sales_dealer.HqId=".$_REQUEST['hq34']." OR hrm_sales_dealer.HqId=".$_REQUEST['hq35'].")", $con); $rhq1=mysql_fetch_assoc($hq1);$TotHq1=$rhq1['sM1']+$rhq1['sM2']+$rhq1['sM3']+$rhq1['sM4']+$rhq1['sM5']+$rhq1['sM6']+$rhq1['sM7']+$rhq1['sM8']+$rhq1['sM9']+$rhq1['sM10']+$rhq1['sM11']+$rhq1['sM12']; if($_REQUEST['act']!='Multihq'){ $AppHq1=mysql_query("select * from hrm_sales_achive_approved_hq where HqId=".$_REQUEST['hq']." AND YearId=5", $con); $rAppHq1=mysql_num_rows($AppHq1); $resAppHq1=mysql_fetch_assoc($AppHq1); } } 
 if($_REQUEST['tb']==1){ $hq2=mysql_query("select SUM(M1_Ach) as sM1,SUM(M2_Ach) as sM2,SUM(M3_Ach) as sM3,SUM(M4_Ach) as sM4,SUM(M5_Ach) as sM5,SUM(M6_Ach) as sM6,SUM(M7_Ach) as sM7,SUM(M8_Ach) as sM8,SUM(M9_Ach) as sM9,SUM(M10_Ach) as sM10,SUM(M11_Ach) as sM11,SUM(M12_Ach) as sM12 from hrm_sales_sal_details_6 INNER JOIN hrm_sales_dealer ON hrm_sales_sal_details_6.DealerId=hrm_sales_dealer.DealerId where hrm_sales_sal_details_6.YearId=6 AND (hrm_sales_dealer.HqId=".$_REQUEST['hq1']." OR hrm_sales_dealer.HqId=".$_REQUEST['hq2']." OR hrm_sales_dealer.HqId=".$_REQUEST['hq3']." OR hrm_sales_dealer.HqId=".$_REQUEST['hq4']." OR hrm_sales_dealer.HqId=".$_REQUEST['hq5']." OR hrm_sales_dealer.HqId=".$_REQUEST['hq6']." OR hrm_sales_dealer.HqId=".$_REQUEST['hq7']." OR hrm_sales_dealer.HqId=".$_REQUEST['hq8']." OR hrm_sales_dealer.HqId=".$_REQUEST['hq9']." OR hrm_sales_dealer.HqId=".$_REQUEST['hq10']." OR hrm_sales_dealer.HqId=".$_REQUEST['hq11']." OR hrm_sales_dealer.HqId=".$_REQUEST['hq12']." OR hrm_sales_dealer.HqId=".$_REQUEST['hq13']." OR hrm_sales_dealer.HqId=".$_REQUEST['hq14']." OR hrm_sales_dealer.HqId=".$_REQUEST['hq15']." OR hrm_sales_dealer.HqId=".$_REQUEST['hq16']." OR hrm_sales_dealer.HqId=".$_REQUEST['hq17']." OR hrm_sales_dealer.HqId=".$_REQUEST['hq18']." OR hrm_sales_dealer.HqId=".$_REQUEST['hq19']." OR hrm_sales_dealer.HqId=".$_REQUEST['hq20']." OR hrm_sales_dealer.HqId=".$_REQUEST['hq21']." OR hrm_sales_dealer.HqId=".$_REQUEST['hq22']." OR hrm_sales_dealer.HqId=".$_REQUEST['hq23']." OR hrm_sales_dealer.HqId=".$_REQUEST['hq24']." OR hrm_sales_dealer.HqId=".$_REQUEST['hq25']." OR hrm_sales_dealer.HqId=".$_REQUEST['hq26']." OR hrm_sales_dealer.HqId=".$_REQUEST['hq27']." OR hrm_sales_dealer.HqId=".$_REQUEST['hq28']." OR hrm_sales_dealer.HqId=".$_REQUEST['hq29']." OR hrm_sales_dealer.HqId=".$_REQUEST['hq30']." OR hrm_sales_dealer.HqId=".$_REQUEST['hq31']." OR hrm_sales_dealer.HqId=".$_REQUEST['hq32']." OR hrm_sales_dealer.HqId=".$_REQUEST['hq33']." OR hrm_sales_dealer.HqId=".$_REQUEST['hq34']." OR hrm_sales_dealer.HqId=".$_REQUEST['hq35'].")", $con); $rhq2=mysql_fetch_assoc($hq2);
$TotHq2=$rhq2['sM1']+$rhq2['sM2']+$rhq2['sM3']+$rhq2['sM4']+$rhq2['sM5']+$rhq2['sM6']+$rhq2['sM7']+$rhq2['sM8']+$rhq2['sM9']+$rhq2['sM10']+$rhq2['sM11']+$rhq2['sM12'];	
if($_REQUEST['act']!='Multihq'){$AppHq2=mysql_query("select * from hrm_sales_achive_approved_hq where HqId=".$_REQUEST['hq']." AND YearId=6", $con); $rAppHq2=mysql_num_rows($AppHq2); $resAppHq2=mysql_fetch_assoc($AppHq2); } } 
 if($_REQUEST['tc']==1){ $hq3=mysql_query("select SUM(M1_Ach) as sM1,SUM(M2_Ach) as sM2,SUM(M3_Ach) as sM3,SUM(M4_Ach) as sM4,SUM(M5_Ach) as sM5,SUM(M6_Ach) as sM6,SUM(M7_Ach) as sM7,SUM(M8_Ach) as sM8,SUM(M9_Ach) as sM9,SUM(M10_Ach) as sM10,SUM(M11_Ach) as sM11,SUM(M12_Ach) as sM12 from hrm_sales_sal_details_7 INNER JOIN hrm_sales_dealer ON hrm_sales_sal_details_7.DealerId=hrm_sales_dealer.DealerId where hrm_sales_sal_details_7.YearId=7 AND (hrm_sales_dealer.HqId=".$_REQUEST['hq1']." OR hrm_sales_dealer.HqId=".$_REQUEST['hq2']." OR hrm_sales_dealer.HqId=".$_REQUEST['hq3']." OR hrm_sales_dealer.HqId=".$_REQUEST['hq4']." OR hrm_sales_dealer.HqId=".$_REQUEST['hq5']." OR hrm_sales_dealer.HqId=".$_REQUEST['hq6']." OR hrm_sales_dealer.HqId=".$_REQUEST['hq7']." OR hrm_sales_dealer.HqId=".$_REQUEST['hq8']." OR hrm_sales_dealer.HqId=".$_REQUEST['hq9']." OR hrm_sales_dealer.HqId=".$_REQUEST['hq10']." OR hrm_sales_dealer.HqId=".$_REQUEST['hq11']." OR hrm_sales_dealer.HqId=".$_REQUEST['hq12']." OR hrm_sales_dealer.HqId=".$_REQUEST['hq13']." OR hrm_sales_dealer.HqId=".$_REQUEST['hq14']." OR hrm_sales_dealer.HqId=".$_REQUEST['hq15']." OR hrm_sales_dealer.HqId=".$_REQUEST['hq16']." OR hrm_sales_dealer.HqId=".$_REQUEST['hq17']." OR hrm_sales_dealer.HqId=".$_REQUEST['hq18']." OR hrm_sales_dealer.HqId=".$_REQUEST['hq19']." OR hrm_sales_dealer.HqId=".$_REQUEST['hq20']." OR hrm_sales_dealer.HqId=".$_REQUEST['hq21']." OR hrm_sales_dealer.HqId=".$_REQUEST['hq22']." OR hrm_sales_dealer.HqId=".$_REQUEST['hq23']." OR hrm_sales_dealer.HqId=".$_REQUEST['hq24']." OR hrm_sales_dealer.HqId=".$_REQUEST['hq25']." OR hrm_sales_dealer.HqId=".$_REQUEST['hq26']." OR hrm_sales_dealer.HqId=".$_REQUEST['hq27']." OR hrm_sales_dealer.HqId=".$_REQUEST['hq28']." OR hrm_sales_dealer.HqId=".$_REQUEST['hq29']." OR hrm_sales_dealer.HqId=".$_REQUEST['hq30']." OR hrm_sales_dealer.HqId=".$_REQUEST['hq31']." OR hrm_sales_dealer.HqId=".$_REQUEST['hq32']." OR hrm_sales_dealer.HqId=".$_REQUEST['hq33']." OR hrm_sales_dealer.HqId=".$_REQUEST['hq34']." OR hrm_sales_dealer.HqId=".$_REQUEST['hq35'].")", $con); $rhq3=mysql_fetch_assoc($hq3);$TotHq3=$rhq3['sM1']+$rhq3['sM2']+$rhq3['sM3']+$rhq3['sM4']+$rhq3['sM5']+$rhq3['sM6']+$rhq3['sM7']+$rhq3['sM8']+$rhq3['sM9']+$rhq3['sM10']+$rhq3['sM11']+$rhq3['sM12']; if($_REQUEST['act']!='Multihq'){
$AppHq3=mysql_query("select * from hrm_sales_achive_approved_hq where HqId=".$_REQUEST['hq']." AND YearId=7", $con); $rAppHq3=mysql_num_rows($AppHq3); $resAppHq3=mysql_fetch_assoc($AppHq3); } }
} 
elseif($_REQUEST['s']>0)
{
 if($_REQUEST['ta']==1){ $s1=mysql_query("select SUM(M1_Ach) as sM1,SUM(M2_Ach) as sM2,SUM(M3_Ach) as sM3,SUM(M4_Ach) as sM4,SUM(M5_Ach) as sM5,SUM(M6_Ach) as sM6,SUM(M7_Ach) as sM7,SUM(M8_Ach) as sM8,SUM(M9_Ach) as sM9,SUM(M10_Ach) as sM10,SUM(M11_Ach) as sM11,SUM(M12_Ach) as sM12 from hrm_sales_sal_details_5 INNER JOIN hrm_sales_dealer ON hrm_sales_sal_details_5.DealerId=hrm_sales_dealer.DealerId INNER JOIN hrm_headquater ON hrm_sales_dealer.HqId=hrm_headquater.HqId where hrm_sales_sal_details_5.YearId=5 AND hrm_headquater.StateId=".$_REQUEST['s'], $con); $rs1=mysql_fetch_assoc($s1); $TotSt1=$rs1['sM1']+$rs1['sM2']+$rs1['sM3']+$rs1['sM4']+$rs1['sM5']+$rs1['sM6']+$rs1['sM7']+$rs1['sM8']+$rs1['sM9']+$rs1['sM10']+$rs1['sM11']+$rs1['sM12']; $AppSt1=mysql_query("select * from hrm_sales_achive_approved_state where StateId=".$_REQUEST['s']." AND YearId=5", $con); $rAppSt1=mysql_num_rows($AppSt1); $resAppSt1=mysql_fetch_assoc($AppSt1); }
  if($_REQUEST['tb']==1){ $s2=mysql_query("select SUM(M1_Ach) as sM1,SUM(M2_Ach) as sM2,SUM(M3_Ach) as sM3,SUM(M4_Ach) as sM4,SUM(M5_Ach) as sM5,SUM(M6_Ach) as sM6,SUM(M7_Ach) as sM7,SUM(M8_Ach) as sM8,SUM(M9_Ach) as sM9,SUM(M10_Ach) as sM10,SUM(M11_Ach) as sM11,SUM(M12_Ach) as sM12 from hrm_sales_sal_details_6 INNER JOIN hrm_sales_dealer ON hrm_sales_sal_details_6.DealerId=hrm_sales_dealer.DealerId INNER JOIN hrm_headquater ON hrm_sales_dealer.HqId=hrm_headquater.HqId where hrm_sales_sal_details_6.YearId=6 AND hrm_headquater.StateId=".$_REQUEST['s'], $con); $rs2=mysql_fetch_assoc($s2); $TotSt2=$rs2['sM1']+$rs2['sM2']+$rs2['sM3']+$rs2['sM4']+$rs2['sM5']+$rs2['sM6']+$rs2['sM7']+$rs2['sM8']+$rs2['sM9']+$rs2['sM10']+$rs2['sM11']+$rs2['sM12']; $AppSt2=mysql_query("select * from hrm_sales_achive_approved_state where StateId=".$_REQUEST['s']." AND YearId=6", $con); $rAppSt2=mysql_num_rows($AppSt2); $resAppSt2=mysql_fetch_assoc($AppSt2); }
 if($_REQUEST['tc']==1){ $s3=mysql_query("select SUM(M1_Ach) as sM1,SUM(M2_Ach) as sM2,SUM(M3_Ach) as sM3,SUM(M4_Ach) as sM4,SUM(M5_Ach) as sM5,SUM(M6_Ach) as sM6,SUM(M7_Ach) as sM7,SUM(M8_Ach) as sM8,SUM(M9_Ach) as sM9,SUM(M10_Ach) as sM10,SUM(M11_Ach) as sM11,SUM(M12_Ach) as sM12 from hrm_sales_sal_details_7 INNER JOIN hrm_sales_dealer ON hrm_sales_sal_details_7.DealerId=hrm_sales_dealer.DealerId INNER JOIN hrm_headquater ON hrm_sales_dealer.HqId=hrm_headquater.HqId where hrm_sales_sal_details_7.YearId=7 AND hrm_headquater.StateId=".$_REQUEST['s'], $con); $rs3=mysql_fetch_assoc($s3); $TotSt3=$rs3['sM1']+$rs3['sM2']+$rs3['sM3']+$rs3['sM4']+$rs3['sM5']+$rs3['sM6']+$rs3['sM7']+$rs3['sM8']+$rs3['sM9']+$rs3['sM10']+$rs3['sM11']+$rs3['sM12']; $AppSt3=mysql_query("select * from hrm_sales_achive_approved_state where StateId=".$_REQUEST['s']." AND YearId=7", $con); $rAppSt3=mysql_num_rows($AppSt3); $resAppSt3=mysql_fetch_assoc($AppSt3); }
}
?>  
  <tr style="background-color:#FFFF79;color:#000000;"> 
   <?php if($_REQUEST['hq']>0 OR $_REQUEST['Multihq']>0){?> 
    <td colspan="4" align="right"><b>TOTAL :</b>&nbsp;&nbsp;</td>
    <?php if($_REQUEST['ta']==1){ ?>
	<td align="right"><b><?php echo $TotHq1; ?>&nbsp;</b></td>
	<td align="center"><?php if($_REQUEST['act']!='Multihq'){ ?><input type="checkbox" id="HqChk2" onClick="FunHqChk(<?php echo '4,'.$_REQUEST['hq'].', 4'; ?>)" <?php if($rAppHq1>0){echo 'disabled'; } ?> <?php if($resAppHq1['Approved']=='Y'){echo 'checked';} ?> /><?php } ?></td>
	<?php } ?>
	<?php if($_REQUEST['tb']==1){  ?>
	<td align="right"><b><?php echo $TotHq2; ?>&nbsp;</b></td>
	<td align="center"><?php if($_REQUEST['act']!='Multihq'){ ?><input type="checkbox" id="HqChk3" onClick="FunHqChk(<?php echo '5,'.$_REQUEST['hq'].', 5'; ?>)" <?php if($rAppHq2>0){echo 'disabled'; } ?> <?php if($resAppHq2['Approved']=='Y'){echo 'checked';} ?> /><?php } ?></td>
	<?php } ?>
	<?php if($_REQUEST['tc']==1){ ?>
	<td align="right"><b><?php echo $TotHq3; ?>&nbsp;</b></td>
	<td align="center"><?php if($_REQUEST['act']!='Multihq'){ ?><input type="checkbox" id="HqChk4" onClick="FunHqChk(<?php echo '6,'.$_REQUEST['hq'].', 6'; ?>)" <?php if($rAppHq3>0){echo 'disabled'; } ?> <?php if($resAppHq3['Approved']=='Y'){echo 'checked';} ?> /><?php } ?></td>
	<?php } ?>
   <?php } elseif($_REQUEST['s']>0){ ?>
   <td colspan="4" align="right"><b>TOTAL :</b>&nbsp;&nbsp;</td>
    <?php if($_REQUEST['ta']==1){  ?>
	<td align="right"><b><?php echo $TotSt1; ?>&nbsp;</b> 
	<td align="center"><input type="checkbox" id="StChk2" onClick="FunStChk(<?php echo '5,'.$_REQUEST['s'].', 5'; ?>)" <?php if($rAppSt1>0){echo 'disabled'; } ?> <?php if($resAppSt1['Approved']=='Y'){echo 'checked';} ?> /></td>
	<?php } ?>
	<?php if($_REQUEST['tb']==1){ 	?>
	<td align="right"><b><?php echo $TotSt2; ?>&nbsp;</b>
	<td align="center"><input type="checkbox" id="StChk3" onClick="FunStChk(<?php echo '6,'.$_REQUEST['s'].', 6'; ?>)" <?php if($rAppSt2>0){echo 'disabled'; } ?> <?php if($resAppSt2['Approved']=='Y'){echo 'checked';} ?> /></td>
	<?php } ?>
	<?php if($_REQUEST['tc']==1){  ?>
	<td align="right"><b><?php echo $TotSt3; ?>&nbsp;</b>
	<td align="center"><input type="checkbox" id="StChk4" onClick="FunStChk(<?php echo '7,'.$_REQUEST['s'].', 7'; ?>)" <?php if($rAppSt3>0){echo 'disabled'; } ?> <?php if($resAppSt3['Approved']=='Y'){echo 'checked';} ?> /></td>
	<?php } ?>
   <?php } ?>			
  </tr>	
<tr>
<td colspan="11" style="width:<?php //if($_REQUEST['hq']>0){echo '740px';}elseif($_REQUEST['s']>0){echo '790px';} ?>;">
<div class="inner_table">
<table border="1" cellpadding="0" cellspacing="0" style="font-family:Times New Roman;font-size:14px;"> 
<?php if($_REQUEST['hq']>0 OR $_REQUEST['Multihq']>0){
 if($_REQUEST['hq']>0){$sqlDeal=mysql_query("select DealerId,DealerName,DealerCity,HqName from hrm_sales_dealer INNER JOIN hrm_headquater ON hrm_sales_dealer.HqId=hrm_headquater.HqId where hrm_sales_dealer.HqId=".$_REQUEST['hq']." order by hrm_headquater.HqName ASC", $con); }
 if($_REQUEST['Multihq']>0){
$sqlDeal=mysql_query("select DealerId,DealerName,DealerCity,HqName from hrm_sales_dealer INNER JOIN hrm_headquater ON hrm_sales_dealer.HqId=hrm_headquater.HqId where (hrm_sales_dealer.HqId=".$_REQUEST['hq1']." OR hrm_sales_dealer.HqId=".$_REQUEST['hq2']." OR hrm_sales_dealer.HqId=".$_REQUEST['hq3']." OR hrm_sales_dealer.HqId=".$_REQUEST['hq4']." OR hrm_sales_dealer.HqId=".$_REQUEST['hq5']." OR hrm_sales_dealer.HqId=".$_REQUEST['hq6']." OR hrm_sales_dealer.HqId=".$_REQUEST['hq7']." OR hrm_sales_dealer.HqId=".$_REQUEST['hq8']." OR hrm_sales_dealer.HqId=".$_REQUEST['hq9']." OR hrm_sales_dealer.HqId=".$_REQUEST['hq10']." OR hrm_sales_dealer.HqId=".$_REQUEST['hq11']." OR hrm_sales_dealer.HqId=".$_REQUEST['hq12']." OR hrm_sales_dealer.HqId=".$_REQUEST['hq13']." OR hrm_sales_dealer.HqId=".$_REQUEST['hq14']." OR hrm_sales_dealer.HqId=".$_REQUEST['hq15']." OR hrm_sales_dealer.HqId=".$_REQUEST['hq16']." OR hrm_sales_dealer.HqId=".$_REQUEST['hq17']." OR hrm_sales_dealer.HqId=".$_REQUEST['hq18']." OR hrm_sales_dealer.HqId=".$_REQUEST['hq19']." OR hrm_sales_dealer.HqId=".$_REQUEST['hq20']." OR hrm_sales_dealer.HqId=".$_REQUEST['hq21']." OR hrm_sales_dealer.HqId=".$_REQUEST['hq22']." OR hrm_sales_dealer.HqId=".$_REQUEST['hq23']." OR hrm_sales_dealer.HqId=".$_REQUEST['hq24']." OR hrm_sales_dealer.HqId=".$_REQUEST['hq25']." OR hrm_sales_dealer.HqId=".$_REQUEST['hq26']." OR hrm_sales_dealer.HqId=".$_REQUEST['hq27']." OR hrm_sales_dealer.HqId=".$_REQUEST['hq28']." OR hrm_sales_dealer.HqId=".$_REQUEST['hq29']." OR hrm_sales_dealer.HqId=".$_REQUEST['hq30']." OR hrm_sales_dealer.HqId=".$_REQUEST['hq31']." OR hrm_sales_dealer.HqId=".$_REQUEST['hq32']." OR hrm_sales_dealer.HqId=".$_REQUEST['hq33']." OR hrm_sales_dealer.HqId=".$_REQUEST['hq34']." OR hrm_sales_dealer.HqId=".$_REQUEST['hq35'].") order by hrm_headquater.HqName ASC", $con); }

$sn=1; $rowDeal=mysql_num_rows($sqlDeal); if($rowDeal>0){ while($resDeal=mysql_fetch_assoc($sqlDeal)){ ?>
 <tr bgcolor="#FFFFFF" style="height:22px;background-color:<?php if($i==1){echo '#E2F3D8'; }?>;" id="TR_<?php echo $sn; ?>"> 
<form name="FormNrv_<?php echo $sn; ?>" method="POST" enctype="multipart/form-data">
     <td align="center" bgcolor="#FFC4FF" style="width:40px;"><input type="checkbox" id="Chk_<?php echo $sn; ?>" onClick="FunCBClick(<?php echo $sn; ?>)" /></td>	
	 <td style="width:150px;">&nbsp;<?php echo $resDeal['HqName']; ?>&nbsp;</td>		 
     <td style="width:350px;">&nbsp;<?php echo $resDeal['DealerName']; ?></td>
	 <td style="width:200px;">&nbsp;<?php echo '<font color="#79003D">'.$resDeal['DealerCity'].'</font>'; ?></td>
	 <?php if($_REQUEST['ta']==1){?>
<?php $sqlP1=mysql_query("select SUM(M1_Ach) as tsM1,SUM(M2_Ach) as tsM2,SUM(M3_Ach) as tsM3,SUM(M4_Ach) as tsM4,SUM(M5_Ach) as tsM5,SUM(M6_Ach) as tsM6,SUM(M7_Ach) as tsM7,SUM(M8_Ach) as tsM8,SUM(M9_Ach) as tsM9,SUM(M10_Ach) as tsM10,SUM(M11_Ach) as tsM11,SUM(M12_Ach) as tsM12 from hrm_sales_sal_details_5 where DealerId=".$resDeal['DealerId']." AND YearId=5", $con); $resP1=mysql_fetch_assoc($sqlP1); $TotP1=$resP1['tsM1']+$resP1['tsM2']+$resP1['tsM3']+$resP1['tsM4']+$resP1['tsM5']+$resP1['tsM6']+$resP1['tsM7']+$resP1['tsM8']+$resP1['tsM9']+$resP1['tsM10']+$resP1['tsM11']+$resP1['tsM12']; 
$sqlchk2=mysql_query("select * from hrm_sales_achive_approved where DealerId=".$resDeal['DealerId']." AND YearId=5", $con); 
$rowchk2=mysql_num_rows($sqlchk2); $reschk2=mysql_fetch_assoc($sqlchk2); ?>	 
	 <td align="right" valign="top" style="width:80px;">
	 <span class="mousechange" onClick="FunOpenRecrd(5,<?php echo $resDeal['DealerId']; ?>)"><u><?php echo $TotP1; ?></u>&nbsp;</span></td>
	 <td align="center" valign="top" style="width:50px;"><input type="checkbox" id="AppChk2_<?php echo $sn; ?>" onClick="FChkApClick(<?php echo $sn.','.$resDeal['DealerId'].', 5'; ?>)" <?php if($rowchk2>0){echo 'disabled'; } ?> <?php if($reschk2['Approved']=='Y'){echo 'checked';} ?> <?php if($rAppHq1>0){echo 'disabled'; } ?> /></td>
	
	 <?php } if($_REQUEST['tb']==1){?>
<?php $sqlP2=mysql_query("select SUM(M1_Ach) as tsM1,SUM(M2_Ach) as tsM2,SUM(M3_Ach) as tsM3,SUM(M4_Ach) as tsM4,SUM(M5_Ach) as tsM5,SUM(M6_Ach) as tsM6,SUM(M7_Ach) as tsM7,SUM(M8_Ach) as tsM8,SUM(M9_Ach) as tsM9,SUM(M10_Ach) as tsM10,SUM(M11_Ach) as tsM11,SUM(M12_Ach) as tsM12 from hrm_sales_sal_details_6 where DealerId=".$resDeal['DealerId']." AND YearId=6", $con); $resP2=mysql_fetch_assoc($sqlP2); $TotP2=$resP2['tsM1']+$resP2['tsM2']+$resP2['tsM3']+$resP2['tsM4']+$resP2['tsM5']+$resP2['tsM6']+$resP2['tsM7']+$resP2['tsM8']+$resP2['tsM9']+$resP2['tsM10']+$resP2['tsM11']+$resP2['tsM12']; 
$sqlchk3=mysql_query("select * from hrm_sales_achive_approved where DealerId=".$resDeal['DealerId']." AND YearId=6", $con); 
$rowchk3=mysql_num_rows($sqlchk3); $reschk3=mysql_fetch_assoc($sqlchk3); ?>	 
	 <td align="right" style="width:80px;"><span class="mousechange" onClick="FunOpenRecrd(6,<?php echo $resDeal['DealerId']; ?>)"><u><?php echo $TotP2; ?></u>&nbsp;</span></td>
	 <td align="center" valign="top" style="width:50px;"><input type="checkbox" id="AppChk3_<?php echo $sn; ?>" onClick="FChkApClick(<?php echo $sn.','.$resDeal['DealerId'].', 6'; ?>)" <?php if($rowchk3>0){echo 'disabled'; } ?> <?php if($reschk3['Approved']=='Y'){echo 'checked';} ?> <?php if($rAppHq2>0){echo 'disabled'; } ?> /></td>	
	 <?php } if($_REQUEST['tc']==1){?>
<?php $sqlP3=mysql_query("select SUM(M1_Ach) as tsM1,SUM(M2_Ach) as tsM2,SUM(M3_Ach) as tsM3,SUM(M4_Ach) as tsM4,SUM(M5_Ach) as tsM5,SUM(M6_Ach) as tsM6,SUM(M7_Ach) as tsM7,SUM(M8_Ach) as tsM8,SUM(M9_Ach) as tsM9,SUM(M10_Ach) as tsM10,SUM(M11_Ach) as tsM11,SUM(M12_Ach) as tsM12 from hrm_sales_sal_details_7 where DealerId=".$resDeal['DealerId']." AND YearId=7", $con); $resP3=mysql_fetch_assoc($sqlP3); $TotP3=$resP3['tsM1']+$resP3['tsM2']+$resP3['tsM3']+$resP3['tsM4']+$resP3['tsM5']+$resP3['tsM6']+$resP3['tsM7']+$resP3['tsM8']+$resP3['tsM9']+$resP3['tsM10']+$resP3['tsM11']+$resP3['tsM12']; 
$sqlchk4=mysql_query("select * from hrm_sales_achive_approved where DealerId=".$resDeal['DealerId']." AND YearId=7", $con); 
$rowchk4=mysql_num_rows($sqlchk4); $reschk4=mysql_fetch_assoc($sqlchk4); ?>	 
	 <td align="right" style="width:80px;"><span class="mousechange" onClick="FunOpenRecrd(7,<?php echo $resDeal['DealerId']; ?>)"><u><?php echo $TotP3; ?></u>&nbsp;</span></td>
	 <td align="center" valign="top" style="width:50px;"><input type="checkbox" id="AppChk4_<?php echo $sn; ?>" onClick="FChkApClick(<?php echo $sn.','.$resDeal['DealerId'].', 7'; ?>)" <?php if($rowchk4>0){echo 'disabled'; } ?> <?php if($reschk4['Approved']=='Y'){echo 'checked';} ?> <?php if($rAppHq3>0){echo 'disabled'; } ?> /></td>
	 <?php } ?> 
</form>	 
 </tr>
<?php $sn++;} } else{echo '<tr bgcolor="#FFFFFF"><td colspan="10" style="color:#FF8000;font-size:14px;font-weight:bold;">&nbsp;Records Not Available..</td></tr>';} ?> 
<?php } elseif($_REQUEST['s']>0){$sqlDeal=mysql_query("select HqName,DealerId,DealerName,DealerCity from hrm_sales_dealer INNER JOIN hrm_headquater ON hrm_sales_dealer.HqId=hrm_headquater.HqId where hrm_headquater.StateId=".$_REQUEST['s']." order by HqName ASC, DealerName ASC",$con); $sn=1; $rowDeal=mysql_num_rows($sqlDeal); if($rowDeal>0){ while($resDeal=mysql_fetch_assoc($sqlDeal)){ $di=$resDeal['DealerId']; ?>
 <tr bgcolor="#FFFFFF" style="height:22px;background-color:<?php if($i==1){echo '#E2F3D8'; }?>;" id="TR_<?php echo $sn; ?>"> 
<form name="FormNrv_<?php echo $sn; ?>" method="POST" enctype="multipart/form-data">
     <td align="center" bgcolor="#FFC4FF" style="width:40px;"><input type="checkbox" id="Chk_<?php echo $sn; ?>" onClick="FunCBClick(<?php echo $sn; ?>)" /></td>		
     <td style="width:150px;">&nbsp;<?php echo $resDeal['HqName']; ?>&nbsp;</td>	 
     <td style="width:350px;">&nbsp;<?php echo $resDeal['DealerName']; ?></td>
	 <td style="width:200px;">&nbsp;<?php echo '<font color="#79003D">'.$resDeal['DealerCity'].'</font>'; ?></td>
	 <?php if($_REQUEST['ta']==1){?>
<?php $sqlP1=mysql_query("select SUM(M1_Ach) as tsM1,SUM(M2_Ach) as tsM2,SUM(M3_Ach) as tsM3,SUM(M4_Ach) as tsM4,SUM(M5_Ach) as tsM5,SUM(M6_Ach) as tsM6,SUM(M7_Ach) as tsM7,SUM(M8_Ach) as tsM8,SUM(M9_Ach) as tsM9,SUM(M10_Ach) as tsM10,SUM(M11_Ach) as tsM11,SUM(M12_Ach) as tsM12 from hrm_sales_sal_details_5 where DealerId=".$resDeal['DealerId']." AND YearId=5", $con); $resP1=mysql_fetch_assoc($sqlP1); $TotP1=$resP1['tsM1']+$resP1['tsM2']+$resP1['tsM3']+$resP1['tsM4']+$resP1['tsM5']+$resP1['tsM6']+$resP1['tsM7']+$resP1['tsM8']+$resP1['tsM9']+$resP1['tsM10']+$resP1['tsM11']+$resP1['tsM12']; 
$sqlchk2=mysql_query("select * from hrm_sales_achive_approved where DealerId=".$resDeal['DealerId']." AND YearId=5", $con); 
$rowchk2=mysql_num_rows($sqlchk2); $reschk2=mysql_fetch_assoc($sqlchk2); ?>	 
	 <td align="right" valign="top" style="width:80px;">
	 <span class="mousechange" onClick="FunOpenRecrd(5,<?php echo $resDeal['DealerId']; ?>)"><u><?php echo $TotP1; ?></u>&nbsp;</span></td>
	 <td align="center" valign="top" style="width:50px;"><input type="checkbox" id="AppChk2_<?php echo $sn; ?>" onClick="FChkApClick(<?php echo $sn.','.$resDeal['DealerId'].', 5'; ?>)" <?php if($rowchk2>0){echo 'disabled'; } ?> <?php if($reschk2['Approved']=='Y'){echo 'checked';} ?> <?php if($rAppSt1>0){echo 'disabled'; } ?> /></td>
	 <?php } if($_REQUEST['tb']==1){?>
<?php $sqlP2=mysql_query("select SUM(M1_Ach) as tsM1,SUM(M2_Ach) as tsM2,SUM(M3_Ach) as tsM3,SUM(M4_Ach) as tsM4,SUM(M5_Ach) as tsM5,SUM(M6_Ach) as tsM6,SUM(M7_Ach) as tsM7,SUM(M8_Ach) as tsM8,SUM(M9_Ach) as tsM9,SUM(M10_Ach) as tsM10,SUM(M11_Ach) as tsM11,SUM(M12_Ach) as tsM12 from hrm_sales_sal_details_6 where DealerId=".$resDeal['DealerId']." AND YearId=6", $con); $resP2=mysql_fetch_assoc($sqlP2); $TotP2=$resP2['tsM1']+$resP2['tsM2']+$resP2['tsM3']+$resP2['tsM4']+$resP2['tsM5']+$resP2['tsM6']+$resP2['tsM7']+$resP2['tsM8']+$resP2['tsM9']+$resP2['tsM10']+$resP2['tsM11']+$resP2['tsM12']; 
$sqlchk3=mysql_query("select * from hrm_sales_achive_approved where DealerId=".$resDeal['DealerId']." AND YearId=6", $con);
$rowchk3=mysql_num_rows($sqlchk3); $reschk3=mysql_fetch_assoc($sqlchk3); ?>	 
	 <td align="right" valign="top" style="width:80px;">
	 <span class="mousechange" onClick="FunOpenRecrd(6,<?php echo $resDeal['DealerId']; ?>)"><u><?php echo $TotP2; ?></u>&nbsp;</span></td>
	 <td align="center" valign="top" style="width:50px;"><input type="checkbox" id="AppChk3_<?php echo $sn; ?>" onClick="FChkApClick(<?php echo $sn.','.$resDeal['DealerId'].', 6'; ?>)" <?php if($rowchk3>0){echo 'disabled'; } ?> <?php if($reschk3['Approved']=='Y'){echo 'checked';} ?> <?php if($rAppSt2>0){echo 'disabled'; } ?> /></td>
	 <?php } if($_REQUEST['tc']==1){?>
<?php $sqlP3=mysql_query("select SUM(M1_Ach) as tsM1,SUM(M2_Ach) as tsM2,SUM(M3_Ach) as tsM3,SUM(M4_Ach) as tsM4,SUM(M5_Ach) as tsM5,SUM(M6_Ach) as tsM6,SUM(M7_Ach) as tsM7,SUM(M8_Ach) as tsM8,SUM(M9_Ach) as tsM9,SUM(M10_Ach) as tsM10,SUM(M11_Ach) as tsM11,SUM(M12_Ach) as tsM12 from hrm_sales_sal_details_7 where DealerId=".$resDeal['DealerId']." AND YearId=7", $con); $resP3=mysql_fetch_assoc($sqlP3); $TotP3=$resP3['tsM1']+$resP3['tsM2']+$resP3['tsM3']+$resP3['tsM4']+$resP3['tsM5']+$resP3['tsM6']+$resP3['tsM7']+$resP3['tsM8']+$resP3['tsM9']+$resP3['tsM10']+$resP3['tsM11']+$resP3['tsM12']; 
$sqlchk4=mysql_query("select * from hrm_sales_achive_approved where DealerId=".$resDeal['DealerId']." AND YearId=7", $con); 
$rowchk4=mysql_num_rows($sqlchk4); $reschk4=mysql_fetch_assoc($sqlchk4); ?>	 
	 <td align="right" style="width:80px;"><span class="mousechange" onClick="FunOpenRecrd(7,<?php echo $resDeal['DealerId']; ?>)"><u><?php echo $TotP3; ?></u>&nbsp;</span></td>
	 <td align="center" valign="top" style="width:50px;"><input type="checkbox" id="AppChk4_<?php echo $sn; ?>" onClick="FChkApClick(<?php echo $sn.','.$resDeal['DealerId'].', 7'; ?>)" <?php if($rowchk4>0){echo 'disabled'; } ?> <?php if($reschk4['Approved']=='Y'){echo 'checked';} ?> <?php if($rAppSt3>0){echo 'disabled'; } ?> /></td>	
	 <?php } ?>	 
</form>	 
 </tr>
<?php $sn++;} } else{echo '<tr bgcolor="#FFFFFF"><td colspan="11" style="color:#FF8000;font-size:14px;font-weight:bold;">&nbsp;Records Not Available..</td></tr>';} ?> 
<?php } ?> 	  	  
</table>
</div>
</td>
</tr>
</table>
 
    </td>
   </tr> 	
  </table>
 </td>
</tr>
</table>
		
<?php //**********************************************************************************************?>
<?php //*************END*****END*****END******END******END*************************?>
<?php //***************************************************************************************************?>
		
	  </td>
	</tr>
  </table>
 </td>
</tr>
</table>
</body>
</html>

</html>
