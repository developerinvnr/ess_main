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
.EditSelect { font-family:Georgia; font-size:12px; height:18px;}
.EditInput { font-family:Georgia; font-size:12px; height:18px;}
.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}
.InputB{font-size:12px;width:40px;text-align:right;border:0px;background-color:#D9D9FF;} 
.Input{font-size:12px;width:40px;text-align:right;border:0px;background-color:#EEE;}
.Inputt{font-size:12px;font-family:Times New Roman;border:0px;background-color:#FFF; color:#000000;}
.Inputi{font-size:12px;width:40px;text-align:right;border:0px;background-color:#EEE;}
.TInput{font-size:12px;width:40px;text-align:right;border:0px;background-color:#FFFFA6;}
.InputBc{font-size:12px;width:50px;text-align:right;border:0px;font-weight:bold;background-color:#62B0FF;} 
.Inputc{font-size:12px;width:50px;text-align:right;border:0px;background-color:#62B0FF;}
.Trh60{text-align:center;width:40px;font-size:12px;font-weight:bold;}
.Revised{width:60px;font-weight:bold;background-color:#D7FFAE;text-align:right;}
.Revisedt{width:60px;font-weight:bold;background-color:#FFFFA6;text-align:right;}
.outerbox .innerbox { /* width:100%; */   /*DEFINES TABLES WIDTH */ width:1250px; }       
.innerbox{display:block;float:left; /*DEFINES TABLES HEIGHT*/ /*height:200px;*/ overflow-x:auto;overflow-y:auto; }
</style>
<Script type="text/javascript">//window.history.forward(1);</Script> 
<script type="text/javascript" language="javascript">
function ChangeHq(hq,v,no)
{
  var myh=1; var rowHq=document.getElementById("Rowhq2").value; window.location="SalesEntry.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&act="+document.getElementById("act").value+"&hq="+hq+"&y="+v+"&q="+document.getElementById("q").value+"&ii="+document.getElementById("ii").value+"&vc="+document.getElementById("vc").value+"&fc="+document.getElementById("fc").value+"&cc="+document.getElementById("cc").value+"&di="+document.getElementById("di").value+"&gi="+document.getElementById("gi").value+'&EHq='+document.getElementById("EHq").value+'&myh='+myh+'&myt='+document.getElementById("myt").value+'&no='+no;
}

function ChangeTeam(hq,v)
{ 
  var myt=1; window.location="SalesEntryMt.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&act="+document.getElementById("act").value+"&hq="+hq+"&y="+v+"&q="+document.getElementById("q").value+"&ii="+document.getElementById("ii").value+"&vc="+document.getElementById("vc").value+"&fc="+document.getElementById("fc").value+"&cc="+document.getElementById("cc").value+"&di="+document.getElementById("di").value+"&gi="+document.getElementById("gi").value+'&EHq='+document.getElementById("EHq").value+'&myh='+document.getElementById("myh").value+'&myt='+myt+"&no="+document.getElementById("no").value; 
}

function ChangePerMi(hq,v)
{
  var myt=1; window.location="SalesEntryPerMi.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&act="+document.getElementById("act").value+"&hq="+hq+"&y="+v+"&q="+document.getElementById("q").value+"&ii="+document.getElementById("ii").value+"&vc="+document.getElementById("vc").value+"&fc="+document.getElementById("fc").value+"&cc="+document.getElementById("cc").value+"&di="+document.getElementById("di").value+"&gi="+document.getElementById("gi").value+'&EHq='+document.getElementById("EHq").value+'&myh='+document.getElementById("myh").value+'&myt='+myt+"&no="+document.getElementById("no").value; 
}

function ChangeItem(ii,v)
{  
  if(ii==0 && v=='vc'){alert("please select vegitable crop item"); return false;}
  else if(ii==0 && v=='fc'){alert("please select field crop item"); return false;}
  else if(ii>0 && v=='vc'){window.location="SalesEntry.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&act="+document.getElementById("act").value+"&hq="+document.getElementById("hq").value+"&y="+document.getElementById("y").value+"&q="+document.getElementById("q").value+"&ii="+ii+"&vc=1&fc=0&cc="+document.getElementById("cc").value+"&di="+document.getElementById("di").value+"&gi="+document.getElementById("gi").value+"&EHq="+document.getElementById("EHq").value+"&myh="+document.getElementById("myh").value+"&myt="+document.getElementById("myt").value+"&no="+document.getElementById("no").value; }
  else if(ii>0 && v=='fc'){window.location="SalesEntry.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&act="+document.getElementById("act").value+"&hq="+document.getElementById("hq").value+"&y="+document.getElementById("y").value+"&q="+document.getElementById("q").value+"&ii="+ii+"&vc=0&fc=1&cc="+document.getElementById("cc").value+"&di="+document.getElementById("di").value+"&gi="+document.getElementById("gi").value+"&EHq="+document.getElementById("EHq").value+"&myh="+document.getElementById("myh").value+"&myt="+document.getElementById("myt").value+"&no="+document.getElementById("no").value; }
  else if(ii=='All_2' && v=='fc'){window.location="SalesEntry.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&act="+document.getElementById("act").value+"&hq="+document.getElementById("hq").value+"&y="+document.getElementById("y").value+"&q="+document.getElementById("q").value+"&ii="+ii+"&vc=0&fc=1&cc="+document.getElementById("cc").value+"&di="+document.getElementById("di").value+"&gi="+document.getElementById("gi").value+"&EHq="+document.getElementById("EHq").value+"&myh="+document.getElementById("myh").value+"&myt="+document.getElementById("myt").value+"&no="+document.getElementById("no").value; }
}

function ClickAllProd(ii,v)
{
 if(v=='ac'){window.location="SalesEntry.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&act="+document.getElementById("act").value+"&hq="+document.getElementById("hq").value+"&y="+document.getElementById("y").value+"&q="+document.getElementById("q").value+"&ac=1&vc=0&fc=0&cc="+document.getElementById("cc").value+"&di="+document.getElementById("di").value+"&gi="+document.getElementById("gi").value+"&EHq="+document.getElementById("EHq").value+"&myh="+document.getElementById("myh").value+"&myt="+document.getElementById("myt").value+"&ii="+ii+"&no="+document.getElementById("no").value; }
}

function ChangeYear(v)
{  
  window.location="SalesEntry.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&act="+document.getElementById("act").value+"&hq="+document.getElementById("hq").value+"&y="+v+"&q="+document.getElementById("q").value+"&ii="+document.getElementById("ii").value+"&vc="+document.getElementById("vc").value+"&fc="+document.getElementById("fc").value+"&cc="+document.getElementById("cc").value+"&di="+document.getElementById("di").value+"&gi="+document.getElementById("gi").value+"&EHq="+document.getElementById("EHq").value+"&myh="+document.getElementById("myh").value+"&myt="+document.getElementById("myt").value+"&no="+document.getElementById("no").value; 
}

function ChangeQtr(v)
{  
  window.location="SalesEntry.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&act="+document.getElementById("act").value+"&hq="+document.getElementById("hq").value+"&y="+document.getElementById("y").value+"&q="+v+"&ii="+document.getElementById("ii").value+"&vc="+document.getElementById("vc").value+"&fc="+document.getElementById("fc").value+"&cc="+document.getElementById("cc").value+"&di="+document.getElementById("di").value+"&gi="+document.getElementById("gi").value+"&EHq="+document.getElementById("EHq").value+"&myh="+document.getElementById("myh").value+"&myt="+document.getElementById("myt").value+"&no="+document.getElementById("no").value;
}

function editD(sn,q,d)
{ document.getElementById(d+"EditBtn_"+sn).style.display='none'; 
  document.getElementById(d+"SaveBtn_"+sn).style.display='block';
  document.getElementById("TD"+d+"_"+sn).style.background='#FFFF00';
  for(var i=1; i<=12; i++)
  {
   document.getElementById(d+'M'+i+'_Be'+sn).style.background='#FFFFFF';
   document.getElementById(d+'M'+i+'_Ce'+sn).style.background='#FFFFFF';
  }
}

function saveD(sn,yi,di,q)
{    
  if(document.getElementById(di+'M1_Be'+sn).value==''){var n1B=0;}else{var n1B=parseFloat(document.getElementById(di+'M1_Be'+sn).value);} if(document.getElementById(di+'M2_Be'+sn).value==''){var n2B=0;}else{var n2B=parseFloat(document.getElementById(di+'M2_Be'+sn).value);} if(document.getElementById(di+'M3_Be'+sn).value==''){var n3B=0;}else{var n3B=parseFloat(document.getElementById(di+'M3_Be'+sn).value);} if(document.getElementById(di+'M4_Be'+sn).value==''){var n4B=0;}else{var n4B=parseFloat(document.getElementById(di+'M4_Be'+sn).value);} if(document.getElementById(di+'M5_Be'+sn).value==''){var n5B=0;}else{var n5B=parseFloat(document.getElementById(di+'M5_Be'+sn).value);} if(document.getElementById(di+'M6_Be'+sn).value==''){var n6B=0;}else{var n6B=parseFloat(document.getElementById(di+'M6_Be'+sn).value);} if(document.getElementById(di+'M7_Be'+sn).value==''){var n7B=0;}else{var n7B=parseFloat(document.getElementById(di+'M7_Be'+sn).value);} if(document.getElementById(di+'M8_Be'+sn).value==''){var n8B=0;}else{var n8B=parseFloat(document.getElementById(di+'M8_Be'+sn).value);} if(document.getElementById(di+'M9_Be'+sn).value==''){var n9B=0;}else{var n9B=parseFloat(document.getElementById(di+'M9_Be'+sn).value);} if(document.getElementById(di+'M10_Be'+sn).value==''){var n10B=0;}else{var n10B=parseFloat(document.getElementById(di+'M10_Be'+sn).value);} if(document.getElementById(di+'M11_Be'+sn).value==''){var n11B=0;}else{var n11B=parseFloat(document.getElementById(di+'M11_Be'+sn).value);} if(document.getElementById(di+'M12_Be'+sn).value==''){var n12B=0;}else{var n12B=parseFloat(document.getElementById(di+'M12_Be'+sn).value);}
  
  if(document.getElementById(di+'M1_Ce'+sn).value==''){var n1C=0;}else{var n1C=parseFloat(document.getElementById(di+'M1_Ce'+sn).value);} if(document.getElementById(di+'M2_Ce'+sn).value==''){var n2C=0;}else{var n2C=parseFloat(document.getElementById(di+'M2_Ce'+sn).value);} if(document.getElementById(di+'M3_Ce'+sn).value==''){var n3C=0;}else{var n3C=parseFloat(document.getElementById(di+'M3_Ce'+sn).value);} if(document.getElementById(di+'M4_Ce'+sn).value==''){var n4C=0;}else{var n4C=parseFloat(document.getElementById(di+'M4_Ce'+sn).value);} if(document.getElementById(di+'M5_Ce'+sn).value==''){var n5C=0;}else{var n5C=parseFloat(document.getElementById(di+'M5_Ce'+sn).value);} if(document.getElementById(di+'M6_Ce'+sn).value==''){var n6C=0;}else{var n6C=parseFloat(document.getElementById(di+'M6_Ce'+sn).value);} if(document.getElementById(di+'M7_Ce'+sn).value==''){var n7C=0;}else{var n7C=parseFloat(document.getElementById(di+'M7_Ce'+sn).value);} if(document.getElementById(di+'M8_Ce'+sn).value==''){var n8C=0;}else{var n8C=parseFloat(document.getElementById(di+'M8_Ce'+sn).value);} if(document.getElementById(di+'M9_Ce'+sn).value==''){var n9C=0;}else{var n9C=parseFloat(document.getElementById(di+'M9_Ce'+sn).value);} if(document.getElementById(di+'M10_Ce'+sn).value==''){var n10C=0;}else{var n10C=parseFloat(document.getElementById(di+'M10_Ce'+sn).value);} if(document.getElementById(di+'M11_Ce'+sn).value==''){var n11C=0;}else{var n11C=parseFloat(document.getElementById(di+'M11_Ce'+sn).value);} if(document.getElementById(di+'M12_Ce'+sn).value==''){var n12C=0;}else{var n12C=parseFloat(document.getElementById(di+'M12_Ce'+sn).value);} 
    
  var TotB=document.getElementById("TotBValueM").value=Math.round((n1B+n2B+n3B+n4B+n5B+n6B+n7B+n8B+n9B+n10B+n11B+n12B)*100)/100; var TotC=document.getElementById("TotCValueM").value=Math.round((n1C+n2C+n3C+n4C+n5C+n6C+n7C+n8C+n9C+n10C+n11C+n12C)*100)/100; document.getElementById("Sno").value=sn; document.getElementById("DealerId").value=di; 
  
  var url = 'SlctSalesProdDeal.php';  var pars = 'Action=AddMonth&p='+document.getElementById(di+'P_'+sn).value+'&e='+document.getElementById('EmpId').value+'&m1B='+n1B+'&m2B='+n2B+'&m3B='+n3B+'&m4B='+n4B+'&m5B='+n5B+'&m6B='+n6B+'&m7B='+n7B+'&m8B='+n8B+'&m9B='+n9B+'&m10B='+n10B+'&m11B='+n11B+'&m12B='+n12B+'&m1C='+n1C+'&m2C='+n2C+'&m3C='+n3C+'&m4C='+n4C+'&m5C='+n5C+'&m6C='+n6C+'&m7C='+n7C+'&m8C='+n8C+'&m9C='+n9C+'&m10C='+n10C+'&m11C='+n11C+'&m12C='+n12C+'&TotB='+TotB+'&TotC='+TotC+'&yi='+yi+'&di='+di+'&sn='+sn+'&hi='+document.getElementById('hq').value+'&TerId='+document.getElementById('TerId').value+'&q='+q+'&ii='+document.getElementById('ii').value+'&Reporting='+document.getElementById('Reporting').value; 
 
  var myAjax = new Ajax.Request( url, { method: 'post', parameters: pars, onComplete: show_AddMonth });  
}

function show_AddMonth(originalRequest)
{ document.getElementById('AddMonthResult').innerHTML = originalRequest.responseText; 
  var Sno=document.getElementById('Sno').value; var di=document.getElementById('DealerId').value; 
  var q=document.getElementById('q').value; var ii=document.getElementById('ii').value;
  //var TotalA=document.getElementById(di+'TotP1d_'+Sno).value=document.getElementById('TotAValueM').value; 
  var TotalB=document.getElementById(di+'TotP2d_'+Sno).value=document.getElementById('TotBValueM').value;   
  var TotalC=document.getElementById(di+'TotP3d_'+Sno).value=document.getElementById('TotCValueM').value; 
  
  for(var i=1; i<=12; i++)
  {
   document.getElementById(di+'M'+i+'_Be'+Sno).style.background='#B6FF6C';
   document.getElementById(di+'M'+i+'_Ce'+Sno).style.background='#B6FF6C';
  }
  
	if(ii!='All_1' && ii!='All_2')
    { 
	 
	 document.getElementById(di+'M1_BeT').value=document.getElementById("Tot21").value; document.getElementById(di+'M2_BeT').value=document.getElementById("Tot22").value; document.getElementById(di+'M3_BeT').value=document.getElementById("Tot23").value; document.getElementById(di+'M4_BeT').value=document.getElementById("Tot24").value; document.getElementById(di+'M5_BeT').value=document.getElementById("Tot25").value; document.getElementById(di+'M6_BeT').value=document.getElementById("Tot26").value; document.getElementById(di+'M7_BeT').value=document.getElementById("Tot27").value; document.getElementById(di+'M8_BeT').value=document.getElementById("Tot28").value; document.getElementById(di+'M9_BeT').value=document.getElementById("Tot29").value; document.getElementById(di+'M10_BeT').value=document.getElementById("Tot210").value; document.getElementById(di+'M11_BeT').value=document.getElementById("Tot211").value; document.getElementById(di+'M12_BeT').value=document.getElementById("Tot212").value; 
	 	 
     document.getElementById(di+'M1_CeT').value=document.getElementById("Tot31").value; document.getElementById(di+'M2_CeT').value=document.getElementById("Tot32").value; document.getElementById(di+'M3_CeT').value=document.getElementById("Tot33").value; document.getElementById(di+'M4_CeT').value=document.getElementById("Tot34").value; document.getElementById(di+'M5_CeT').value=document.getElementById("Tot35").value; document.getElementById(di+'M6_CeT').value=document.getElementById("Tot36").value; document.getElementById(di+'M7_CeT').value=document.getElementById("Tot37").value; document.getElementById(di+'M8_CeT').value=document.getElementById("Tot38").value; document.getElementById(di+'M9_CeT').value=document.getElementById("Tot39").value; document.getElementById(di+'M10_CeT').value=document.getElementById("Tot310").value; document.getElementById(di+'M11_CeT').value=document.getElementById("Tot311").value; document.getElementById(di+'M12_CeT').value=document.getElementById("Tot312").value;
	 
	 document.getElementById(di+'TotM_BeT').value=document.getElementById("TTot2").value;  
	 document.getElementById(di+'TotM_CeT').value=document.getElementById("TTot3").value;
	 /* SalesEntry_Hide.php */
	 
	 }	
  document.getElementById(di+"EditBtn_"+Sno).style.display='block'; 
  document.getElementById(di+"SaveBtn_"+Sno).style.display='none'; 
  document.getElementById("TD"+di+"_"+Sno).style.background='#FFFFFF';
}


function ClickFSL1(e,y)
{
  var ActSn=document.getElementById("ActualSn").value;
  if(ActSn>0)
  {
   for(var i=1; i<=ActSn; i++)
   { 
    var va1=parseFloat(document.getElementById("TotP2_"+i).value); 
	var va2=parseFloat(document.getElementById("STotP2_"+i).value);
	var vb1=parseFloat(document.getElementById("TotP3_"+i).value); 
	var vb2=parseFloat(document.getElementById("STotP3_"+i).value);  
	if(va1<va2){alert("Please check product value, your product value equal or more then from reporting values"); return false;}
	if(vb1<vb2){alert("Please check product value, your product value equal or more then from reporting values"); return false;}
   }
  }

  var win = window.open("SbOpenFile.php?CheckAct=Fsb1&y="+y+"&e="+e,"QForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=620,height=300");	
  var timer = setInterval( function() { if(win.closed) { clearInterval(timer);  window.location="SalesEntry.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&act="+document.getElementById("act").value+"&hq="+document.getElementById("hq").value+"&y="+y+"&q="+document.getElementById("q").value+"&ii=0&vc=0&fc=0&ac=1&cc="+document.getElementById("cc").value+"&di="+document.getElementById("di").value+"&gi="+document.getElementById("gi").value+"&EHq="+document.getElementById("EHq").value+"&myh=1&myt="+document.getElementById("myt").value; } }, 1000);
	
}

function FunChk(sn)
{ 
 if(document.getElementById("FChk"+sn).checked==true)
 { document.getElementById("Tr"+sn).style.background='#FFAAFF';
   for(var i=1; i<=12; i++)
   {
	document.getElementById("M"+i+"_D"+sn).style.background='#FFAAFF';
	document.getElementById("M"+i+"_A"+sn).style.background='#FFAAFF';
	document.getElementById("M"+i+"_B"+sn).style.background='#FFAAFF';
	document.getElementById("M"+i+"_C"+sn).style.background='#FFAAFF';
   }
  }
  else
  { document.getElementById("Tr"+sn).style.background='#EEEEEE';
    for(var i=1; i<=12; i++)
	{
	document.getElementById("M"+i+"_D"+sn).style.background='#EEEEEE';
	document.getElementById("M"+i+"_A"+sn).style.background='#EEEEEE';
	document.getElementById("M"+i+"_B"+sn).style.background='#EEEEEE';
	document.getElementById("M"+i+"_C"+sn).style.background='#EEEEEE';
	}
  }  
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
		   
<?php //********************************************************************************************************* ?>	   
		     <table border="0" id="Activity">
			  <tr>
			     <td id="Anni" valign="top" style="width:5px;"></td>
				 <td width="100%" valign="top">
				  <table border="0">
<?php //********************** Start ***************************************************** ?>		
<?php $SpP=mysql_query("select GradeId,DepartmentId,HqId,RepEmployeeID from hrm_employee_general where EmployeeID=".$EmployeeId, $con); $resSpP=mysql_fetch_assoc($SpP); ?>		
<input type="hidden" name="ComId" id="ComId" value="<?php echo $CompanyId; ?>" />
<input type="hidden" id="EmpId" name="EmpId" value="<?php echo $EmployeeId; ?>" />
<input type="hidden" id="act" value="<?php echo $_REQUEST['act']; ?>" />
<input type="hidden" name="y" id="y" value="<?php echo $_REQUEST['y']; ?>" />
<input type="hidden" name="hq" id="hq" value="<?php echo $_REQUEST['hq']; ?>" />
<input type="hidden" name="q" id="q" value="<?php echo $_REQUEST['q']; ?>" />
<input type="hidden" name="vc" id="vc" value="<?php echo $_REQUEST['vc']; ?>" />
<input type="hidden" name="fc" id="fc" value="<?php echo $_REQUEST['fc']; ?>" />
<input type="hidden" id="di" value="<?php echo $_REQUEST['di']; ?>" />
<input type="hidden" id="gi" value="<?php echo $_REQUEST['gi']; ?>" />
<input type="hidden" id="cc" value="<?php echo $_REQUEST['cc']; ?>" />
<input type="hidden" id="ActThought" value="0" />
<input type="hidden" id="ii" value="<?php echo $_REQUEST['ii']; ?>" />
<input type="hidden" id="EHq" value="<?php echo $_REQUEST['EHq']; ?>" /> 
<input type="hidden" id="TotAValueM" value="0" /><input type="hidden" id="TotBValueM" value="0" />
<input type="hidden" id="TotCValueM" value="0" /><input type="hidden" id="DealerId" value="0" />
<input type="hidden" id="Sno" value="" /><input type="hidden" id="myh" value="<?php echo $_REQUEST['myh']; ?>" />
<input type="hidden" id="myt" value="<?php echo $_REQUEST['myt']; ?>" />
<input type="hidden" id="HqV" value="<?php echo $_REQUEST['hq']; ?>" />
<input type="hidden" id="no" value="<?php echo $_REQUEST['no']; ?>" />
<input type="hidden" id="Reporting" value="<?php echo $resSpP['RepEmployeeID']; ?>" />
<?php $sqlCPerMi=mysql_query("select EditPerMi from hrm_sales_reporting_level where EmployeeID=".$EmployeeId,$con); $resCPerMi=mysql_fetch_assoc($sqlCPerMi); $sHq2=mysql_query("select HqId from hrm_sales_hq_temp where EmployeeID=".$EmployeeId." AND HqId!=".$resSpP['HqId'], $con); $rowHq2=mysql_num_rows($sHq2);
echo '<input type="hidden" id="Rowhq2" value="'.$rowHq2.'" />';
if($rowHq2==1){$resHq2=mysql_fetch_assoc($sHq2); echo '<input type="hidden" id="h1q" value="'.$resHq2['HqId'].'" />';}?>
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
       
<td align="center"><img src="images/Planner.png" border="0" style="height:40px;width:150px;"/></td>
<td>&nbsp;</td>
<?php $sHq=mysql_query("select hqt.HqId,HqName from hrm_sales_hq_temp hqt INNER JOIN hrm_headquater hq ON hqt.HqId=hq.HqId where hqt.EmployeeID=".$EmployeeId." AND hqt.HqTEmpStatus='A' order by hq.HqName ASC", $con); $rowHq=mysql_num_rows($sHq); if($rowHq>0){ ?>
<td align="center" valign="bottom">
<?php $sn=1; while($resHq=mysql_fetch_assoc($sHq)){ ?>
<a href="#" onClick="ChangeHq(<?php echo $resHq['HqId'].', '.$_REQUEST['y'].','.$sn; ?>)" style="text-decoration:none;">
 <font style="color:<?php if($_REQUEST['no']==$sn){echo '#fff';}else{echo '#FF8000';} ?>;font-family:Times New Roman;font-size:16px;font-weight:bold;">
 <u><?php echo $resHq['HqName']; ?></u>
 </font>&nbsp;&nbsp;
</a>
<?php $sn++; } ?>
</td>
<?php } ?>
<?php if($_REQUEST['act']>0){ ?>
<td>&nbsp;</td><td align="center" valign="bottom">
<a href="#" onClick="ChangeTeam(<?php echo $resSpP['HqId'].', '.$_REQUEST['y']; ?>)"><img src="images/Myteam.png" border="0" style="height:30px;width:130px;" /></a>
</td>
<td>&nbsp;</td><td align="center" valign="bottom">
<a href="#" onClick="ChangePerMi(<?php echo $resSpP['HqId'].', '.$_REQUEST['y']; ?>)"><img src="images/Permission.png" border="0" style="height:30px;width:130px;" /></a>
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

<?php if($_REQUEST['hq']>0){ $EmpID=$EmployeeId;
echo '<input type="hidden" name="MainEmp" id="MainEmp" value="'.$EmpID.'" />';
echo '<input type="hidden" id="TerId" value="'.$EmpID.'" />';
$sqlL=mysql_query("select R1,R2,R3,R4,R5 from hrm_sales_reporting_level where EmployeeID=".$EmpID, $con); 
$resL=mysql_fetch_assoc($sqlL);
echo '<input type="hidden" id="L1" value="'.$resL['R1'].'" />'; 
echo '<input type="hidden" id="L2" value="'.$resL['R2'].'" />'; 
echo '<input type="hidden" id="L3" value="'.$resL['R3'].'" />'; 
echo '<input type="hidden" id="L4" value="'.$resL['R4'].'" />'; 
echo '<input type="hidden" id="L5" value="'.$resL['R5'].'" />';
}   
echo '<input type="hidden" id="HqV" value="'.$_REQUEST['hq'].'" />'; 
 
$Ymin1=$_REQUEST['y']-1; $Ymin2=$_REQUEST['y']-2;
$sUpy=mysql_query("select FromDate,ToDate from hrm_sales_year where YearId=".$YearId, $con); $rUpy=mysql_fetch_assoc($sUpy);
$sYmin1=mysql_query("select FromDate,ToDate from hrm_sales_year where YearId=".$Ymin1, $con); 
$rYmin1=mysql_fetch_assoc($sYmin1);$sYmin2=mysql_query("select FromDate,ToDate from hrm_sales_year where YearId=".$Ymin2, $con); $rYmin2=mysql_fetch_assoc($sYmin2);
$FUpy=date("Y",strtotime($rUpy['FromDate'])); $TUpy=date("Y",strtotime($rUpy['ToDate']));
$FYmin1=date("Y",strtotime($rYmin1['FromDate'])); $TYmin1=date("Y",strtotime($rYmin1['ToDate']));
$FYmin2=date("Y",strtotime($rYmin2['FromDate'])); $TYmin2=date("Y",strtotime($rYmin2['ToDate']));

if($_REQUEST['hq']>0){ ?>	
     <td style="color:#FFFFFF;font-family:Times New Roman;font-size:14px;font-weight:bold;" valign="bottom">Year :</b><select style="font-family:Times New Roman;font-size:14px;width:90px;background-color:#E4E0FC;height:23px;font-weight:bold;" id="YearV" onChange="ChangeYear(this.value)">
<?php $sqlye=mysql_query("select YearId,FromDate,ToDate from hrm_sales_year where YearId=".$_REQUEST['y'], $con); $resye=mysql_fetch_assoc($sqlye); $FFromDate=date("Y",strtotime($resye['FromDate'])); $TToDate=date("Y",strtotime($resye['ToDate'])); ?><option value="<?php echo $resye['YearId']; ?>" selected><?php echo $FFromDate.'-'.$TToDate; ?></option>
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
	 
	</td>
	<td>&nbsp;</td>
	<input type="hidden" id="QtrV" value="0" />
	<?php /*
	<td style="color:#FFFFFF;font-family:Times New Roman;font-size:14px;font-weight:bold;" valign="bottom">Quarter :</b><select style="font-family:Times New Roman;font-size:14px;width:80px;background-color:#E4E0FC;height:23px;font-weight:bold;" id="QtrV" onChange="ChangeQtr(this.value)"><option value="<?php echo $_REQUEST['q']; ?>" selected><?php echo 'Qtr-0'.$_REQUEST['q']; ?></option> 
<?php if($_REQUEST['q']==1){ ?>
   <option value="2">Qtr-02</option><option value="3">Qtr-03</option><option value="4">Qtr-04</option>
<?php } elseif($_REQUEST['q']==2){ ?>
   <option value="3">Qtr-03</option><option value="4">Qtr-04</option><option value="1">Qtr-01</option>
<?php } elseif($_REQUEST['q']==3){ ?>
   <option value="4">Qtr-04</option><option value="1">Qtr-01</option><option value="2">Qtr-02</option>
<?php } elseif($_REQUEST['q']==4){ ?>
   <option value="1">Qtr-01</option><option value="2">Qtr-02</option><option value="3">Qtr-03</option>
<?php } ?></select>  
    </td>
	<td>&nbsp;</td>
	*/ ?>
	<td style="color:#FFFFFF;font-family:Times New Roman;font-size:14px;font-weight:bold;" valign="bottom">VC :</b><select style="font-family:Times New Roman;font-size:14px;width:140px;background-color:#C4FFC4;height:23px;font-weight:bold;" id="ItemV" onChange="ChangeItem(this.value,'vc')">
<?php if($_REQUEST['vc']!=0){$sqlI=mysql_query("select ItemName from hrm_sales_seedsitem where ItemId=".$_REQUEST['ii'], $con); $resI=mysql_fetch_assoc($sqlI);?><option value="<?php echo $_REQUEST['ii']; ?>" selected><?php echo strtoupper($resI['ItemName']); ?></option><?php }else{ ?><option value="0" selected>SELECT</option><?php } ?>
<?php $sqlItem=mysql_query("select * from hrm_sales_seedsitem where GroupId=1 order by ItemName ASC", $con); while($resItem=mysql_fetch_assoc($sqlItem)){ ?><option value="<?php echo $resItem['ItemId']; ?>"><?php echo $resItem['ItemName']; ?></option><?php } /* ?><option value="All_1"> --- All ---</option><?php */ ?></select>
	<input type="hidden" id="ValueItem" value="<?php echo $_REQUEST['ii']; ?>" /><input type="hidden" id="ValueName" value="<?php if($_REQUEST['vc']>0){echo 'vc';}elseif($_REQUEST['fc']>0){echo 'fc';} ?>" />	
    </td>
	<td>&nbsp;</td>
	<td style="color:#FFFFFF;font-family:Times New Roman;font-size:14px;font-weight:bold;" valign="bottom">FC :</b><select style="font-family:Times New Roman;font-size:14px;width:140px;background-color:#C4FFC4;height:23px;font-weight:bold;" id="ItemV2" onChange="ChangeItem(this.value,'fc')">
<?php if($_REQUEST['fc']!=0 AND $_REQUEST['ii']!='All_2'){$sqlIf=mysql_query("select ItemName from hrm_sales_seedsitem where ItemId=".$_REQUEST['ii'], $con); $resIf=mysql_fetch_assoc($sqlIf);?><option value="<?php echo $_REQUEST['ii']; ?>" selected><?php echo strtoupper($resIf['ItemName']); ?></option><?php } elseif($_REQUEST['fc']!=0 AND $_REQUEST['ii']=='All_2'){?><option value="<?php echo $_REQUEST['ii']; ?>" selected>--- All ---</option><?php } else{ ?><option value="0" selected>SELECT</option><?php } ?><?php $sqlItemf=mysql_query("select * from hrm_sales_seedsitem where GroupId=2 order by ItemName ASC", $con); while($resItemf=mysql_fetch_assoc($sqlItemf)){ ?> 
 <option value="<?php echo $resItemf['ItemId']; ?>"><?php echo $resItemf['ItemName']; ?></option><?php } ?><option value="All_2"> --- All ---</option></select>
   </td>
<?php } ?>   
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
      $EntP=$resCoc['EntryPlan']; $RslP=$resCoc['ResultPlan']; 
	  if($_REQUEST['hq']>0){ $sqlSt=mysql_query("select StateId from hrm_headquater where HqId=".$_REQUEST['hq'], $con);      $resSt=mysql_fetch_assoc($sqlSt); 
?>
<tr>
 <td>
<?php $sql=mysql_query("select HqName from hrm_headquater where HqId=".$_REQUEST['hq'], $con); $res=mysql_fetch_array($sql);
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
	  if($_REQUEST['ii']=='All_1' OR $_REQUEST['ii']=='All_2' OR $_REQUEST['ac']==1){ $ItemN='All Crop'; }
      elseif($_REQUEST['ii']>0){ $sqlItem=mysql_query("select ItemName from hrm_sales_seedsitem where ItemId=".$_REQUEST['ii'], $con); $resItem=mysql_fetch_assoc($sqlItem); $ItemN=$resItem['ItemName']; }
	  
	  $sqlSubEmp=mysql_query("select * from hrm_sales_emp_action where EmployeeID=".$EmployeeId." AND YearId=".$_REQUEST['y']." AND StatusA=1", $con); $rowSubEmp=mysql_num_rows($sqlSubEmp);   
?>	 
      <input type="hidden" name="rowSubEmp" id="rowSubEmp" value="<?php echo $rowSubEmp; ?>" />
	  <input type="hidden" name="VDealer" id="VDealer" value="<?php echo strtoupper($res['DealerName']); ?>" readonly/>
	  <input type="hidden" name="DealerId" id="DealerId" value="<?php echo $_POST['DealIdE']; ?>" />
	  <input type="hidden" name="DealerCity" id="DealerCity" value="<?php echo $res['DealerCity']; ?>" />
	  <input type="hidden" name="ni" id="ni" value="<?php echo $_POST['ni']; ?>" />
<div class="outerbox">
<div class="innerbox">	  
<table class="bluetable" border="1" cellpadding="0" cellspacing="0" style="font-family:Times New Roman;font-size:14px;width:100%;">
  <tr>
  <td colspan="<?php if($_REQUEST['ii']=='All_1' OR $_REQUEST['ii']=='All_2' OR $_REQUEST['ac']==1){echo 3;}else{echo 2;}?>" align="center" style="height:25px;background-color:#005300;font-family:Times New Roman;font-size:16px;color:#FFFF20;font-weight:bold;" id="TD_<?php echo $counter; ?>"> <font color="#D7EBFF">Crop:</font>&nbsp;<?php echo $ItemN; ?>
  </td>
  <td colspan="36" style="height:25px;background-color:#005300;font-family:Times New Roman;font-size:16px;color:#FFFF20;font-weight:bold;" id="TD_<?php echo $counter; ?>" valign="top">
   &nbsp;<font color="#D7EBFF">Head Quarter:&nbsp;</font><?php echo $res['HqName']; ?>&nbsp;&nbsp;&nbsp;
   <?php /*&nbsp;<font color="#D7EBFF">Quarter:&nbsp;</font><?php echo '0'.$_REQUEST['q']; ?>&nbsp;&nbsp;&nbsp; */ ?>
   &nbsp;<font color="#D7EBFF">Year:&nbsp;</font><?php echo $FFromDate.'-'.$TToDate; //$fromdate.'-'.$todate; ?>
   &nbsp;&nbsp;&nbsp;&nbsp;<a href="#" onClick="javascript:window.location='SalesEntry.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&act=<?php echo $_REQUEST['act']; ?>&hq=<?php echo $_REQUEST['hq']; ?>&y=<?php echo $_REQUEST['y']; ?>&q=<?php echo $_REQUEST['q']; ?>&ii=<?php echo $_REQUEST['ii']; ?>&vc=<?php echo $_REQUEST['vc']; ?>&fc=<?php echo $_REQUEST['fc']; ?>&cc=<?php echo $_REQUEST['cc']; ?>&di=<?php echo $_REQUEST['di']; ?>&gi=<?php echo $_REQUEST['gi']; ?>&EHq=<?php echo $_REQUEST['EHq']; ?>&myh=<?php echo $_REQUEST['myh']; ?>&myt=<?php echo $_REQUEST['myt']; ?>&no=<?php echo $_REQUEST['no']; ?>'" style="color:#FFFFFF;font-size:12px;">Refresh</a>   
   &nbsp;&nbsp;&nbsp;
   <?php if($_REQUEST['ac']==1){ ?>
   <?php $sqlSb=mysql_query("select * from hrm_sales_emp_action where EmployeeID=".$EmployeeId." AND YearId=".$_REQUEST['y']." AND StatusA=1", $con); $rowSb=mysql_num_rows($sqlSb); ?><input type="button" style="font-family:Times New Roman;width:100px;height:25px;font-weight:bold;" value="Final Submit" onClick="ClickFSL1(<?php echo $EmployeeId.', '.$_REQUEST['y']; ?>)" <?php if($rowSb>0 OR $RslP=='Y'){echo 'disabled';}else{echo '';}?>/><?php } ?>
   </td>
  </tr>
  <tr style="background-color:#D5F1D1;color:#000000;">
    <td colspan="<?php if($_REQUEST['ii']=='All_1' OR $_REQUEST['ii']=='All_2' OR $_REQUEST['ac']==1){echo 3;}else{echo 2;}?>" align="center" style="font-size:16px;color:#FFFFFF;background-color:#183E83;">
<b><?php echo "ALL DEALER"; ?></b> </td>
<td colspan="3" align="center"><b>APR</b></td><td colspan="2" align="center"><b>MAY</b></td><td colspan="2" align="center"><b>JUN</b></td><td colspan="2" align="center"><b>JUL</b></td><td colspan="2" align="center"><b>AUG</b></td><td colspan="2" align="center"><b>SEP</b></td><td colspan="2" align="center"><b>OCT</b></td><td colspan="2" align="center"><b>NOV</b></td><td colspan="2" align="center"><b>DEC</b></td><td colspan="2" align="center"><b>JAN</b></td><td colspan="2" align="center"><b>FEB</b></td><td colspan="2" align="center"><b>MAR</b></td>
<td colspan="2" align="center" style="background-color:#D9D9FF;"><b>TOTAL</b></td>
<td colspan="2" align="center" style="background-color:#D7FFAE;"><b>&nbsp;REVISED&nbsp;</b></td>
  </tr>	
   <tr style="background-color:#D5F1D1;color:#000000;">
<?php if($_REQUEST['ii']=='All_1' OR $_REQUEST['ii']=='All_2' OR $_REQUEST['ac']==1){ ?>   
    <td align="center" style="width:100px;"><b>CROP</b></td>
<?php } ?>	
	<td align="center" style="width:120px;"><b>VARIETY</b></td>
	<td align="center" style="width:50px;"><b>&nbsp;TYPE&nbsp;</b></td>	
	<td></td>
	<?php for($i=1;$i<=13;$i++){?>
	<td class="Trh60"><?php echo $y2T.'<br>'.$y2; ?></td>
	<?php if($RslP=='Y'){ ?><td class="Trh60"><?php echo $y1T.'<br>'.$y2; ?></td><?php } ?>
	<?php if($EntP=='Y'){ ?><td class="Trh60"><?php echo $y3T.'<br>'.$y3; ?></td><?php } ?>
	<?php } ?>
	<td class="Trh60"><?php echo $y2T.'<br>'.$y2; ?></td>
	<td class="Trh60"><?php echo $y3T.'<br>'.$y3; ?></td>
   </tr>
 	
<?php if($_REQUEST['ii']!='All_1' AND $_REQUEST['ii']!='All_2' AND $_REQUEST['ii']!=0){$sql = mysql_query("select sp.ItemId,ProductId,ProductName,ItemName,TypeName from hrm_sales_seedsproduct sp INNER JOIN hrm_sales_seedsitem si ON sp.ItemId=si.ItemId INNER JOIN hrm_sales_seedtype st ON sp.TypeId=st.TypeId where si.ItemId=".$_REQUEST['ii']." order by ItemName ASC, TypeName ASC, ProductName ASC", $con);}
      elseif($_REQUEST['ii']=='All_1'){$sql = mysql_query("select sp.ItemId,ProductId,ProductName,ItemName,TypeName from hrm_sales_seedsproduct sp INNER JOIN hrm_sales_seedsitem si ON sp.ItemId=si.ItemId INNER JOIN hrm_sales_seedtype st ON sp.TypeId=st.TypeId where si.GroupId=1 order by ItemName ASC, TypeName ASC, ProductName ASC", $con);}
	  elseif($_REQUEST['ii']=='All_2'){$sql = mysql_query("select sp.ItemId,ProductId,ProductName,ItemName,TypeName from hrm_sales_seedsproduct sp INNER JOIN hrm_sales_seedsitem si ON sp.ItemId=si.ItemId INNER JOIN hrm_sales_seedtype st ON sp.TypeId=st.TypeId where si.GroupId=2 order by ItemName ASC, TypeName ASC, ProductName ASC", $con);} 
	  elseif($_REQUEST['ii']==0 AND $_REQUEST['ac']==1){$sql = mysql_query("select sp.ItemId,ProductId,ProductName,ItemName,TypeName from hrm_sales_seedsproduct sp INNER JOIN hrm_sales_seedsitem si ON sp.ItemId=si.ItemId INNER JOIN hrm_sales_seedtype st ON sp.TypeId=st.TypeId where (si.GroupId=1 OR si.GroupId=2) order by ItemName ASC, TypeName ASC, ProductName ASC", $con);}
	  
 $Sn=1; while($res=mysql_fetch_array($sql)){ 
 /*$sqlP0=mysql_query("select SUM(M1_Ach) as sM1,SUM(M2_Ach) as sM2,SUM(M3_Ach) as sM3,SUM(M4_Ach) as sM4,SUM(M5_Ach) as sM5,SUM(M6_Ach) as sM6,SUM(M7_Ach) as sM7,SUM(M8_Ach) as sM8,SUM(M9_Ach) as sM9,SUM(M10_Ach) as sM10,SUM(M11_Ach) as sM11,SUM(M12_Ach) as sM12 from hrm_sales_sal_details_".$Before2YId." sd INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId where d.HqId=".$_REQUEST['hq']." AND d.DealerSts='A' AND ProductId=".$res['ProductId']." AND YearId=".$Before2YId, $con); 
 
 $sqlP1=mysql_query("select SUM(M1_Ach) as sM1,SUM(M2_Ach) as sM2,SUM(M3_Ach) as sM3,SUM(M4_Ach) as sM4,SUM(M5_Ach) as sM5,SUM(M6_Ach) as sM6,SUM(M7_Ach) as sM7,SUM(M8_Ach) as sM8,SUM(M9_Ach) as sM9,SUM(M10_Ach) as sM10,SUM(M11_Ach) as sM11,SUM(M12_Ach) as sM12 from hrm_sales_sal_details_".$BeforeYId." sd INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId where d.HqId=".$_REQUEST['hq']." AND d.DealerSts='A' AND ProductId=".$res['ProductId']." AND YearId=".$BeforeYId, $con); $resP0=mysql_fetch_assoc($sqlP0); $resP1=mysql_fetch_assoc($sqlP1); */ 
 
 $sqlP2=mysql_query("select SUM(M1) as sM1,SUM(M2) as sM2,SUM(M3) as sM3,SUM(M4) as sM4,SUM(M5) as sM5,SUM(M6) as sM6,SUM(M7) as sM7,SUM(M8) as sM8,SUM(M9) as sM9,SUM(M10) as sM10,SUM(M11) as sM11,SUM(M12) as sM12, SUM(M1_Ach) as ssM1,SUM(M2_Ach) as ssM2,SUM(M3_Ach) as ssM3,SUM(M4_Ach) as ssM4,SUM(M5_Ach) as ssM5,SUM(M6_Ach) as ssM6,SUM(M7_Ach) as ssM7,SUM(M8_Ach) as ssM8,SUM(M9_Ach) as ssM9,SUM(M10_Ach) as ssM10,SUM(M11_Ach) as ssM11,SUM(M12_Ach) as ssM12 from hrm_sales_sal_details_".$_REQUEST['y']." sd INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId where d.HqId=".$_REQUEST['hq']." AND d.DealerSts='A' AND ProductId=".$res['ProductId']." AND YearId=".$_REQUEST['y'], $con); 
 
 $sqlP3=mysql_query("select SUM(M1_Proj) as sM1,SUM(M2_Proj) as sM2,SUM(M3_Proj) as sM3,SUM(M4_Proj) as sM4,SUM(M5_Proj) as sM5,SUM(M6_Proj) as sM6,SUM(M7_Proj) as sM7,SUM(M8_Proj) as sM8,SUM(M9_Proj) as sM9,SUM(M10_Proj) as sM10,SUM(M11_Proj) as sM11,SUM(M12_Proj) as sM12 from hrm_sales_sal_details_".$AfterYId." sd INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId where d.HqId=".$_REQUEST['hq']." AND d.DealerSts='A' AND ProductId=".$res['ProductId']." AND YearId=".$AfterYId, $con); $resP2=mysql_fetch_assoc($sqlP2);  $resP3=mysql_fetch_assoc($sqlP3); 

$sChk=mysql_query("select * from hrm_sales_arrange_prod where ProductId=".$res['ProductId']." AND ArrgStatus='Y' AND StateId=".$resSt['StateId'], $con); $rowChkP=mysql_fetch_assoc($sChk);

if($RslP=='Y'){ $a1=$resP2['ssM1']; $a2=$resP2['ssM2']; $a3=$resP2['ssM3']; $a4=$resP2['ssM4']; $a5=$resP2['ssM5']; $a6=$resP2['ssM6']; $a7=$resP2['ssM7']; $a8=$resP2['ssM8']; $a9=$resP2['ssM9']; $a10=$resP2['ssM10']; $a11=$resP2['ssM11']; $a12=$resP2['ssM12']; } 
if($EntP=='Y'){ $a1=$resP3['sM1']; $a2=$resP3['sM2']; $a3=$resP3['sM3']; $a4=$resP3['sM4']; $a5=$resP3['sM5']; $a6=$resP3['sM6']; $a7=$resP3['sM7']; $a8=$resP3['sM8']; $a9=$resP3['sM9']; $a10=$resP3['sM10']; $a11=$resP3['sM11']; $a12=$resP3['sM12']; } 	  

if($rowChkP>0 OR $resP2['sM1']!=0 OR $resP2['sM2']!=0 OR $resP2['sM3']!=0 OR $resP2['sM4']!=0 OR $resP2['sM5']!=0 OR $resP2['sM6']!=0 OR $resP2['sM7']!=0 OR $resP2['sM8']!=0 OR $resP2['sM9']!=0 OR $resP2['sM10']!=0 OR $resP2['sM11']!=0 OR $resP2['sM12']!=0 OR $a1!=0 OR $a2!=0 OR $a3!=0 OR $a4!=0 OR $a5!=0 OR $a6!=0 OR $a7!=0 OR $a8!=0 OR $a9!=0 OR $a10!=0 OR $a11!=0 OR $a12!=0){
?>	   
  <tr bgcolor="#EEEEEE" style="height:22px;" id="Tr<?php echo $Sn; ?>">
<?php if($_REQUEST['ii']=='All_1' OR $_REQUEST['ii']=='All_2' OR $_REQUEST['ac']==1){ ?>	  
<td bgcolor="#FFFFFF" valign="top"><input class="Inputt" style="width:100px;" value="<?php echo $res['ItemName']; ?>"/></td>
<?php } ?>		 
<td bgcolor="#FFFFFF"><input class="Inputt" style="width:120px;" value="<?php echo $res['ProductName']; ?>" /><input type="hidden" id="P_<?php echo $Sn; ?>" value="<?php echo $res['ProductId']; ?>" /></td>
<td bgcolor="#FFFFFF" align="center" style="font-size:12px;"><?php echo substr_replace($res['TypeName'], '', 2); ?></td>
<td align="center" class="Trh60"><input type="checkbox" id="FChk<?php echo $Sn; ?>" onClick="FunChk(<?php echo $Sn; ?>)" /></td>
<?php /********************************** Open Overall******************************************/ ?>
<td><input class="Input" id="M1_B<?php echo $Sn; ?>" value="<?php if($resP2['sM1']!=0){echo floatval($resP2['sM1']);}?>" readonly/></td>
<?php if($RslP=='Y'){ ?><td><input class="Inputc" id="M1_C<?php echo $Sn; ?>" value="<?php if($resP2['ssM1']!=0){echo floatval($resP2['ssM1']);}?>" readonly/></td><?php } ?>
<?php if($EntP=='Y'){ ?><td><input class="Input" id="M1_C<?php echo $Sn; ?>" value="<?php if($resP3['sM1']!=0){echo floatval($resP3['sM1']);}?>" readonly/></td><?php } ?>

<td><input class="Input" id="M2_B<?php echo $Sn; ?>" value="<?php if($resP2['sM2']!=0){echo floatval($resP2['sM2']);}?>" readonly/></td>
<?php if($RslP=='Y'){ ?><td><input class="Inputc" id="M2_C<?php echo $Sn; ?>" value="<?php if($resP2['ssM2']!=0){echo floatval($resP2['ssM2']);}?>" readonly/></td><?php } ?>
<?php if($EntP=='Y'){ ?><td><input class="Input" id="M2_C<?php echo $Sn; ?>" value="<?php if($resP3['sM2']!=0){echo floatval($resP3['sM2']);}?>" readonly/></td><?php } ?>

<td><input class="Input" id="M3_B<?php echo $Sn; ?>" value="<?php if($resP2['sM3']!=0){echo floatval($resP2['sM3']);}?>" readonly/></td>
<?php if($RslP=='Y'){ ?><td><input class="Inputc" id="M3_C<?php echo $Sn; ?>" value="<?php if($resP2['ssM3']!=0){echo floatval($resP2['ssM3']);}?>" readonly/></td><?php } ?>
<?php if($EntP=='Y'){ ?><td><input class="Input" id="M3_C<?php echo $Sn; ?>" value="<?php if($resP3['sM3']!=0){echo floatval($resP3['sM3']);}?>" readonly/></td><?php } ?>

<td><input class="Input" id="M4_B<?php echo $Sn; ?>" value="<?php if($resP2['sM4']!=0){echo floatval($resP2['sM4']);}?>" readonly/></td>
<?php if($RslP=='Y'){ ?><td><input class="Inputc" id="M4_C<?php echo $Sn; ?>" value="<?php if($resP2['ssM4']!=0){echo floatval($resP2['ssM4']);}?>" readonly/></td><?php } ?>
<?php if($EntP=='Y'){ ?><td id="<?php echo 'TM4_C'.$Sn; ?>"><input class="Input" id="M4_C<?php echo $Sn; ?>" value="<?php if($resP3['sM4']!=0){echo floatval($resP3['sM4']);}?>" readonly/></td><?php } ?>

<td><input class="Input" id="M5_B<?php echo $Sn; ?>" value="<?php if($resP2['sM5']!=0){echo floatval($resP2['sM5']);}?>" readonly/></td>
<?php if($RslP=='Y'){ ?><td><input class="Inputc" id="M5_C<?php echo $Sn; ?>" value="<?php if($resP2['ssM5']!=0){echo floatval($resP2['ssM5']);}?>" readonly/></td><?php } ?>
<?php if($EntP=='Y'){ ?><td id="<?php echo 'TM5_C'.$Sn; ?>"><input class="Input" id="M5_C<?php echo $Sn; ?>" value="<?php if($resP3['sM5']!=0){echo floatval($resP3['sM5']);}?>" readonly/></td><?php } ?>

<td><input class="Input" id="M6_B<?php echo $Sn; ?>" value="<?php if($resP2['sM6']!=0){echo floatval($resP2['sM6']);}?>" readonly/></td>
<?php if($RslP=='Y'){ ?><td><input class="Inputc" id="M6_C<?php echo $Sn; ?>" value="<?php if($resP2['ssM6']!=0){echo floatval($resP2['ssM6']);}?>" readonly/></td><?php } ?>
<?php if($EntP=='Y'){ ?><td id="<?php echo 'TM6_C'.$Sn; ?>"><input class="Input" id="M6_C<?php echo $Sn; ?>" value="<?php if($resP3['sM6']!=0){echo floatval($resP3['sM6']);}?>" readonly/></td><?php } ?>

<td><input class="Input" id="M7_B<?php echo $Sn; ?>" value="<?php if($resP2['sM7']!=0){echo floatval($resP2['sM7']);}?>" readonly/></td>
<?php if($RslP=='Y'){ ?><td><input class="Inputc" id="M7_C<?php echo $Sn; ?>" value="<?php if($resP2['ssM7']!=0){echo floatval($resP2['ssM7']);}?>" readonly/></td><?php } ?>
<?php if($EntP=='Y'){ ?><td><input class="Input" id="M7_C<?php echo $Sn; ?>" value="<?php if($resP3['sM7']!=0){echo floatval($resP3['sM7']);}?>" readonly/></td><?php } ?>

<td><input class="Input" id="M8_B<?php echo $Sn; ?>" value="<?php if($resP2['sM8']!=0){echo floatval($resP2['sM8']);}?>" readonly/></td>
<?php if($RslP=='Y'){ ?><td><input class="Inputc" id="M8_C<?php echo $Sn; ?>" value="<?php if($resP2['ssM8']!=0){echo floatval($resP2['ssM8']);}?>" readonly/></td><?php } ?>
<?php if($EntP=='Y'){ ?><td><input class="Input" id="M8_C<?php echo $Sn; ?>" value="<?php if($resP3['sM8']!=0){echo floatval($resP3['sM8']);}?>" readonly/></td><?php } ?>

<td><input class="Input" id="M9_B<?php echo $Sn; ?>" value="<?php if($resP2['sM9']!=0){echo floatval($resP2['sM9']);}?>" readonly/></td>
<?php if($RslP=='Y'){ ?><td><input class="Inputc" id="M9_C<?php echo $Sn; ?>" value="<?php if($resP2['ssM9']!=0){echo floatval($resP2['ssM9']);}?>" readonly/></td><?php } ?>
<?php if($EntP=='Y'){ ?><td id="<?php echo 'TM9_C'.$Sn; ?>"><input class="Input" id="M9_C<?php echo $Sn; ?>" value="<?php if($resP3['sM9']!=0){echo floatval($resP3['sM9']);}?>" readonly/></td><?php } ?>

<td><input class="Input" id="M10_B<?php echo $Sn; ?>" value="<?php if($resP2['sM10']!=0){echo floatval($resP2['sM10']);}?>" readonly/></td>
<?php if($RslP=='Y'){ ?><td><input class="Inputc" id="M10_C<?php echo $Sn; ?>" value="<?php if($resP2['ssM10']!=0){echo floatval($resP2['ssM10']);}?>" readonly/></td><?php } ?>
<?php if($EntP=='Y'){ ?><td id="<?php echo 'TM10_C'.$Sn; ?>"><input class="Input" id="M10_C<?php echo $Sn; ?>" value="<?php if($resP3['sM10']!=0){echo floatval($resP3['sM10']);}?>" readonly/></td><?php } ?>

<td><input class="Input" id="M11_B<?php echo $Sn; ?>" value="<?php if($resP2['sM11']!=0){echo floatval($resP2['sM11']);}?>" readonly/></td>
<?php if($RslP=='Y'){ ?><td><input class="Inputc" id="M11_C<?php echo $Sn; ?>" value="<?php if($resP2['ssM11']!=0){echo floatval($resP2['ssM11']);}?>" readonly/></td><?php } ?>
<?php if($EntP=='Y'){ ?><td id="<?php echo 'TM11_C'.$Sn; ?>"><input class="Input" id="M11_C<?php echo $Sn; ?>" value="<?php if($resP3['sM11']!=0){echo floatval($resP3['sM11']);}?>" readonly/></td><?php } ?>

<td><input class="Input" id="M12_B<?php echo $Sn; ?>" value="<?php if($resP2['sM12']!=0){echo floatval($resP2['sM12']);}?>" readonly/></td>
<?php if($RslP=='Y'){ ?><td><input class="Inputc" id="M12_C<?php echo $Sn; ?>" style="width:50px;" value="<?php if($resP2['ssM12']!=0){echo floatval($resP2['ssM12']);}?>" readonly/></td><?php } ?>
<?php if($EntP=='Y'){ ?><td id="<?php echo 'TM12_C'.$Sn; ?>"><input class="Input" id="M12_C<?php echo $Sn; ?>" value="<?php if($resP3['sM12']!=0){echo floatval($resP3['sM12']);}?>" readonly/></td><?php } ?>
<?php /********************************** Close Overall******************************************/ ?>


<?php  
$TotP2=$resP2['sM1']+$resP2['sM2']+$resP2['sM3']+$resP2['sM4']+$resP2['sM5']+$resP2['sM6']+$resP2['sM7']+$resP2['sM8']+$resP2['sM9']+$resP2['sM10']+$resP2['sM11']+$resP2['sM12']; 
$TotP2ch=$resP2['ssM1']+$resP2['ssM2']+$resP2['ssM3']+$resP2['ssM4']+$resP2['ssM5']+$resP2['ssM6']+$resP2['ssM7']+$resP2['ssM8']+$resP2['ssM9']+$resP2['ssM10']+$resP2['ssM11']+$resP2['ssM12']; 
$TotP3=$resP3['sM1']+$resP3['sM2']+$resP3['sM3']+$resP3['sM4']+$resP3['sM5']+$resP3['sM6']+$resP3['sM7']+$resP3['sM8']+$resP3['sM9']+$resP3['sM10']+$resP3['sM11']+$resP3['sM12'];
?>	

<td><input class="InputB" id="TotP2_<?php echo $Sn; ?>" value="<?php if($TotP2!=0){echo floatval($TotP2);}else{echo '';} ?>" readonly/></td>
<?php if($RslP=='Y'){ ?><td><input class="InputBc" value="<?php if($TotP2ch!=0){echo $TotP2ch;}else{echo '';} ?>" readonly/></td><?php } ?>
<?php if($EntP=='Y'){ ?><td id="<?php echo 'TTotP3_'.$Sn; ?>"><input class="InputB" id="TotP3_<?php echo $Sn; ?>" value="<?php if($TotP3!=0){echo floatval($TotP3);}else{echo '';} ?>" readonly/></td><?php } ?>

<?php $SsqlP2=mysql_query("select * from hrm_sales_sal_details_hq where HqId=".$_REQUEST['hq']." AND ProductId=".$res['ProductId']." AND YearId=".$_REQUEST['y'], $con); $SsqlP3=mysql_query("select * from hrm_sales_sal_details_hq where HqId=".$_REQUEST['hq']." AND ProductId=".$res['ProductId']." AND YearId=".$AfterYId, $con); 
$SresP2=mysql_fetch_assoc($SsqlP2); $SresP3=mysql_fetch_assoc($SsqlP3);  
$STotP2=$SresP2['Q1']+$SresP2['Q2']+$SresP2['Q3']+$SresP2['Q4']; 
$STotP3=$SresP3['Q1']+$SresP3['Q2']+$SresP3['Q3']+$SresP3['Q4']; 
?>
<input type="hidden" id="STotP2_<?php echo $Sn; ?>" value="<?php if($STotP2!=0){echo floatval($STotP2);}else{echo '';}?>"/>
<input type="hidden" id="STotP3_<?php echo $Sn; ?>" value="<?php if($STotP3!=0){echo floatval($STotP3);}else{echo '';}?>"/>
<td class="Revised"><?php if($STotP2!=0){echo floatval($STotP2);}else{echo '';} ?></td>
<td class="Revised"><?php if($STotP3!=0){echo floatval($STotP3);}else{echo '';} ?></td>	 
</tr>	
<?php } $Sn++; } $ActSn=$Sn-1; echo '<input type="hidden" id="ActualSn" value="'.$ActSn.'" />'; ?> 

   
<?php if($_REQUEST['ii']!='All_1' AND $_REQUEST['ii']!='All_2' AND $_REQUEST['ac']!=1){ 

$sqlP2t=mysql_query("select SUM(M1) as tsM1,SUM(M2) as tsM2,SUM(M3) as tsM3,SUM(M4) as tsM4,SUM(M5) as tsM5,SUM(M6) as tsM6,SUM(M7) as tsM7,SUM(M8) as tsM8,SUM(M9) as tsM9,SUM(M10) as tsM10,SUM(M11) as tsM11,SUM(M12) as tsM12, SUM(M1_Ach) as tssM1,SUM(M2_Ach) as tssM2,SUM(M3_Ach) as tssM3,SUM(M4_Ach) as tssM4,SUM(M5_Ach) as tssM5,SUM(M6_Ach) as tssM6,SUM(M7_Ach) as tssM7,SUM(M8_Ach) as tssM8,SUM(M9_Ach) as tssM9,SUM(M10_Ach) as tssM10,SUM(M11_Ach) as tssM11,SUM(M12_Ach) as tssM12 from hrm_sales_sal_details_".$_REQUEST['y']." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId where d.HqId=".$_REQUEST['hq']." AND sp.ItemId=".$_REQUEST['ii']." AND sd.YearId=".$_REQUEST['y'], $con); $resP2t=mysql_fetch_assoc($sqlP2t);

$sqlP3t=mysql_query("select SUM(M1_Proj) as tsM1,SUM(M2_Proj) as tsM2,SUM(M3_Proj) as tsM3,SUM(M4_Proj) as tsM4,SUM(M5_Proj) as tsM5,SUM(M6_Proj) as tsM6,SUM(M7_Proj) as tsM7,SUM(M8_Proj) as tsM8,SUM(M9_Proj) as tsM9,SUM(M10_Proj) as tsM10,SUM(M11_Proj) as tsM11,SUM(M12_Proj) as tsM12 from hrm_sales_sal_details_".$AfterYId." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId where d.HqId=".$_REQUEST['hq']." AND sp.ItemId=".$_REQUEST['ii']." AND sd.YearId=".$AfterYId, $con); $resP3t=mysql_fetch_assoc($sqlP3t);
?>
 <tr style="font-size:14px;color:#000000;background-color:#FFFFA6;height:24px;">
	 <td colspan="3" align="right" style="font-size:16px;"><b>TOTAL:&nbsp;</b></td>	
	 <td><input class="TInput" id="TotP1_TB" value="<?php if($resP2t['tsM1']>0){echo floatval($resP2t['tsM1']);} ?>" readonly/></td>
	 <?php if($RslP=='Y'){ ?><td><input class="TInput" value="<?php if($resP2t['tssM1']>0){echo floatval($resP2t['tssM1']);} ?>" readonly/></td><?php } ?>
     <?php if($EntP=='Y'){ ?><td><input class="TInput" id="TotP1_TC" value="<?php if($resP3t['tsM1']>0){echo floatval($resP3t['tsM1']);} ?>" readonly/></td><?php } ?>
	 
	 <td><input class="TInput" id="TotP2_TB" value="<?php if($resP2t['tsM2']>0){echo floatval($resP2t['tsM2']);} ?>" readonly/></td>
	 <?php if($RslP=='Y'){ ?><td><input class="TInput" value="<?php if($resP2t['tssM2']>0){echo floatval($resP2t['tssM2']);} ?>" readonly/></td><?php } ?>
     <?php if($EntP=='Y'){ ?><td><input class="TInput" id="TotP2_TC" value="<?php if($resP3t['tsM2']>0){echo floatval($resP3t['tsM2']);} ?>" readonly/></td><?php } ?>
	 
	 <td><input class="TInput" id="TotP3_TB" value="<?php if($resP2t['tsM3']>0){echo floatval($resP2t['tsM3']);} ?>" readonly/></td>
	 <?php if($RslP=='Y'){ ?><td><input class="TInput" value="<?php if($resP2t['tssM3']>0){echo floatval($resP2t['tssM3']);} ?>" readonly/></td><?php } ?>
     <?php if($EntP=='Y'){ ?><td><input class="TInput" id="TotP3_TC" value="<?php if($resP3t['tsM3']>0){echo floatval($resP3t['tsM3']);} ?>" readonly/></td><?php } ?>
	 	 	
	 <td><input class="TInput" id="TotP4_TB" value="<?php if($resP2t['tsM4']>0){echo floatval($resP2t['tsM4']);} ?>" readonly/></td>
	 <?php if($RslP=='Y'){ ?><td><input class="TInput" value="<?php if($resP2t['tssM4']>0){echo floatval($resP2t['tssM4']);} ?>" readonly/></td><?php } ?>
     <?php if($EntP=='Y'){ ?><td><input class="TInput" id="TotP4_TC" value="<?php if($resP3t['tsM4']>0){echo floatval($resP3t['tsM4']);} ?>" readonly/></td><?php } ?>
	 
	 <td><input class="TInput" id="TotP5_TB" value="<?php if($resP2t['tsM5']>0){echo floatval($resP2t['tsM5']);} ?>" readonly/></td>
	 <?php if($RslP=='Y'){ ?><td><input class="TInput" value="<?php if($resP2t['tssM5']>0){echo floatval($resP2t['tssM5']);} ?>" readonly/></td><?php } ?>
     <?php if($EntP=='Y'){ ?><td><input class="TInput" id="TotP5_TC" value="<?php if($resP3t['tsM5']>0){echo floatval($resP3t['tsM5']);} ?>" readonly/></td><?php } ?>
	 
	 <td><input class="TInput" id="TotP6_TB" value="<?php if($resP2t['tsM6']>0){echo floatval($resP2t['tsM6']);} ?>" readonly/></td>
	 <?php if($RslP=='Y'){ ?><td><input class="TInput" value="<?php if($resP2t['tssM6']>0){echo floatval($resP2t['tssM6']);} ?>" readonly/></td><?php } ?>
     <?php if($EntP=='Y'){ ?><td><input class="TInput" id="TotP6_TC" value="<?php if($resP3t['tsM6']>0){echo floatval($resP3t['tsM6']);} ?>" readonly/></td>	<?php } ?>
	 		
	 <td><input class="TInput" id="TotP7_TB" value="<?php if($resP2t['tsM7']>0){echo floatval($resP2t['tsM7']);} ?>" readonly/></td>
	 <?php if($RslP=='Y'){ ?><td><input class="TInput" value="<?php if($resP2t['tssM7']>0){echo floatval($resP2t['tssM7']);} ?>" readonly/></td><?php } ?>
     <?php if($EntP=='Y'){ ?><td><input class="TInput" id="TotP7_TC" value="<?php if($resP3t['tsM7']>0){echo floatval($resP3t['tsM7']);} ?>" readonly/></td><?php } ?>
	 
	 <td><input class="TInput" id="TotP8_TB" value="<?php if($resP2t['tsM8']>0){echo floatval($resP2t['tsM8']);} ?>" readonly/></td>
	 <?php if($RslP=='Y'){ ?><td><input class="TInput" value="<?php if($resP2t['tssM8']>0){echo floatval($resP2t['tssM8']);} ?>" readonly/></td><?php } ?>
     <?php if($EntP=='Y'){ ?><td><input class="TInput" id="TotP8_TC" value="<?php if($resP3t['tsM8']>0){echo floatval($resP3t['tsM8']);} ?>" readonly/></td><?php } ?>
	 
	 <td><input class="TInput" id="TotP9_TB" value="<?php if($resP2t['tsM9']>0){echo floatval($resP2t['tsM9']);} ?>" readonly/></td>
	 <?php if($RslP=='Y'){ ?><td><input class="TInput" value="<?php if($resP2t['tssM9']>0){echo floatval($resP2t['tssM9']);} ?>" readonly/></td><?php } ?>
     <?php if($EntP=='Y'){ ?><td><input class="TInput" id="TotP9_TC" value="<?php if($resP3t['tsM9']>0){echo floatval($resP3t['tsM9']);} ?>" readonly/></td><?php } ?>
	 		
	 <td><input class="TInput" id="TotP10_TB" value="<?php if($resP2t['tsM10']>0){echo floatval($resP2t['tsM10']);} ?>" readonly/></td>
	 <?php if($RslP=='Y'){ ?><td><input class="TInput" value="<?php if($resP2t['tssM10']>0){echo floatval($resP2t['tssM10']);} ?>" readonly/></td><?php } ?>
     <?php if($EntP=='Y'){ ?><td><input class="TInput" id="TotP10_TC" value="<?php if($resP3t['tsM10']>0){echo floatval($resP3t['tsM10']);} ?>" readonly/></td><?php } ?>
	 
	 <td><input class="TInput" id="TotP11_TB" value="<?php if($resP2t['tsM11']>0){echo floatval($resP2t['tsM11']);} ?>" readonly/></td>
	 <?php if($RslP=='Y'){ ?><td><input class="TInput" value="<?php if($resP2t['tssM11']>0){echo floatval($resP2t['tssM11']);} ?>" readonly/></td><?php } ?>
     <?php if($EntP=='Y'){ ?><td><input class="TInput" id="TotP11_TC" value="<?php if($resP3t['tsM11']>0){echo floatval($resP3t['tsM11']);} ?>" readonly/></td><?php } ?>
	 
	 <td><input class="TInput" id="TotP12_TB" value="<?php if($resP2t['tsM12']>0){echo floatval($resP2t['tsM12']);} ?>" readonly/></td>
	 <?php if($RslP=='Y'){ ?><td><input class="TInput" value="<?php if($resP2t['tssM12']>0){echo floatval($resP2t['tssM12']);} ?>" readonly/></td><?php } ?>
     <?php if($EntP=='Y'){ ?><td><input class="TInput" id="TotP12_TC" value="<?php if($resP3t['tsM12']>0){echo floatval($resP3t['tsM12']);} ?>" readonly/></td><?php } ?>
	 	
<?php  
$TotP2t=$resP2t['tsM1']+$resP2t['tsM2']+$resP2t['tsM3']+$resP2t['tsM4']+$resP2t['tsM5']+$resP2t['tsM6']+$resP2t['tsM7']+$resP2t['tsM8']+$resP2t['tsM9']+$resP2t['tsM10']+$resP2t['tsM11']+$resP2t['tsM12']; 
$TotP2tch=$resP2t['tssM1']+$resP2t['tssM2']+$resP2t['tssM3']+$resP2t['tssM4']+$resP2t['tssM5']+$resP2t['tssM6']+$resP2t['tssM7']+$resP2t['tssM8']+$resP2t['tssM9']+$resP2t['tssM10']+$resP2t['tssM11']+$resP2t['tssM12']; 
$TotP3t=$resP3t['tsM1']+$resP3t['tsM2']+$resP3t['tsM3']+$resP3t['tsM4']+$resP3t['tsM5']+$resP3t['tsM6']+$resP3t['tsM7']+$resP3t['tsM8']+$resP3t['tsM9']+$resP3t['tsM10']+$resP3t['tsM11']+$resP3t['tsM12'];
?>
	  <td><input class="TInput" id="TotM_BeT" value="<?php if($TotP2t!=0 AND $TotP2t!=''){echo floatval($TotP2t);}else{echo '';} ?>" readonly/></td>
<?php if($RslP=='Y'){ ?><td><input class="TInput" value="<?php if($TotP2tch!=0 AND $TotP2tch!=''){echo floatval($TotP2tch);}else{echo '';} ?>" readonly/></td><?php } ?>
<?php if($EntP=='Y'){ ?><td><input class="TInput" id="TotM_CeT" value="<?php if($TotP3t!=0 AND $TotP3t!=''){echo floatval($TotP3t);}else{echo '';} ?>" readonly/></td><?php } ?>	  
	  
<?php
$TSsqlP2=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_hq sdhq INNER JOIN hrm_sales_seedsproduct sp ON sdhq.ProductId=sp.ProductId where sdhq.HqId=".$_REQUEST['hq']." AND sp.ItemId=".$_REQUEST['ii']." AND sdhq.YearId=".$_REQUEST['y'], $con); $TSsqlP3=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_hq sdhq INNER JOIN hrm_sales_seedsproduct sp ON sdhq.ProductId=sp.ProductId where sdhq.HqId=".$_REQUEST['hq']." AND sp.ItemId=".$_REQUEST['ii']." AND sdhq.YearId=".$AfterYId, $con);  
$TSresP2=mysql_fetch_assoc($TSsqlP2); $TSresP3=mysql_fetch_assoc($TSsqlP3);  
$TSTotP2=$TSresP2['Qa']+$TSresP2['Qb']+$TSresP2['Qc']+$TSresP2['Qd']; 
$TSTotP3=$TSresP3['Qa']+$TSresP2['Qb']+$TSresP2['Qc']+$TSresP2['Qd']; ?>
	<td class="Revisedt"><?php if($TSTotP2!=0 AND $TSTotP2!=''){echo floatval($TSTotP2);}else{echo '';} ?></td>
	<td class="Revisedt"><?php if($TSTotP3!=0 AND $TSTotP3!=''){echo floatval($TSTotP3);}else{echo '';} ?></td>		
   </tr>	
<?php } ?>  
<?php /********************** Overall Total Close ****************************/ ?>
</table>
</div>
</div>   
	  
 </td>
</tr>
<?php if($_REQUEST['ac']!=1){ ?>
<tr>
 <td style="width:100%;">
 <table border="0" cellpadding="0" cellspacing="2" cellpadding="0" style="width:100%;">
<?php $sqlDeal = mysql_query("select * from hrm_sales_dealer where HqId=".$_REQUEST['hq']." order by DealerId ASC", $con); $resDealRow=mysql_num_rows($sqlDeal);  
      $DealRow=$resDealRow+1; echo '<input type="hidden" id="DealRows" value="'.$DealRow.'" />'; $counter=1; ?>   
<?php while($resDeal=mysql_fetch_array($sqlDeal)){ /*********** Open Dealer **********/ ?>	
	
<?php 
/////////////////////////////////////////////////
if($_REQUEST['ii']!='All_1' AND $_REQUEST['ii']!='All_2'){ $sqlDealChk = mysql_query("select count(*) as rtotal from hrm_sales_sal_details_".$AfterYId." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId INNER JOIN hrm_sales_seedsitem si ON sp.ItemId=si.ItemId where si.ItemId=".$_REQUEST['ii']." AND (YearId=".$Before2YId." OR YearId=".$BeforeYId.") AND YearId!=".$_REQUEST['y']." AND YearId!=".$AfterYId." AND DealerId=".$resDeal['DealerId'], $con); }
elseif($_REQUEST['ii']=='All_1'){$sqlDealChk = mysql_query("select count(*) as rtotal from hrm_sales_sal_details_".$AfterYId." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId INNER JOIN hrm_sales_seedsitem si ON sp.ItemId=si.ItemId where si.GroupId=1 AND (YearId=".$Before2YId." OR YearId=".$BeforeYId.") AND YearId!=".$_REQUEST['y']." AND YearId!=".$AfterYId." AND DealerId=".$resDeal['DealerId'], $con); }
elseif($_REQUEST['ii']=='All_2'){$sqlDealChk = mysql_query("select count(*) as rtotal from hrm_sales_sal_details_".$AfterYId." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId INNER JOIN hrm_sales_seedsitem si ON sp.ItemId=si.ItemId where si.GroupId=2 AND (YearId=".$Before2YId." OR YearId=".$BeforeYId.") AND YearId!=".$_REQUEST['y']." AND YearId!=".$AfterYId." AND DealerId=".$resDeal['DealerId'], $con); }
$resDealChk=mysql_fetch_assoc($sqlDealChk); $rowDealChk=$resDealChk['rtotal']; 
/////////////////////////////////////////////////
?>		
 <tr style="background-color:#CBD7F3;">
 <table border="0" style="width:100%;"> 
  <tr>
   <td style="width:100%;">
<div class="outerbox">
<div class="innerbox">	  
<table class="bluetable" border="1" cellpadding="0" cellspacing="0" style="font-family:Times New Roman;font-size:14px;width:100%;">	
  <tr>
  <td colspan="36" style="font-size:16px;color:#FFFF00;background-color:#183E83;">&nbsp;<b><?php echo ucfirst(strtolower($resDeal['DealerName'])).'-<font color="#D7EBFF">'.$resDeal['DealerCity'].'</font>'; ?></b></td>
  </tr>
  </tr>
  <tr style="background-color:#D5F1D1;color:#000000;">
    <td colspan="<?php if($_REQUEST['ii']=='All_1' OR $_REQUEST['ii']=='All_2'){echo 4;}else{echo 3;}?>" style="font-size:16px;color:#FFFF00;">&nbsp;</td>	
<td colspan="2" align="center"><b>APR</b></td><td colspan="2" align="center"><b>MAY</b></td><td colspan="2" align="center"><b>JUN</b></td><td colspan="2" align="center"><b>JUL</b></td><td colspan="2" align="center"><b>AUG</b></td><td colspan="2" align="center"><b>SEP</b></td><td colspan="2" align="center"><b>OCT</b></td><td colspan="2" align="center"><b>NOV</b></td><td colspan="2" align="center"><b>DEC</b></td><td colspan="2" align="center"><b>JAN</b></td><td colspan="2" align="center"><b>FEB</b></td><td colspan="2" align="center"><b>MAR</b></td>
<td colspan="2" align="center"><b>TOTAL</b></td>
  </tr>	
   <tr style="background-color:#D5F1D1;color:#000000;">
<?php if($_REQUEST['ii']=='All_1' OR $_REQUEST['ii']=='All_2'){?>   
    <td align="center" style="width:100px;"><b>CROP</b></td>
<?php } ?>	
	<td align="center" style="width:120px;"><b>VARIETY</b></td>
	<td align="center" style="width:50px;"><b>TYPE</b></td>
	<td align="center" style="width:50px;"><b>EDIT</b></td>
	
	<?php for($i=1;$i<=13;$i++){?>
	<td class="Trh60"><?php echo $y2T.'<br>'.$y2; ?></td>
	<?php if($RslP=='Y'){ ?><td class="Trh60"><?php echo $y1T.'<br>'.$y2; ?></td><?php } ?>
	<?php if($EntP=='Y'){ ?><td class="Trh60"><?php echo $y3T.'<br>'.$y3; ?></td><?php } ?>
	<?php } ?>
  </tr>	 
  
<?php if($_REQUEST['ii']!='All_1' AND $_REQUEST['ii']!='All_2'){$sql = mysql_query("select sp.ItemId,ProductId,ProductName,ItemName,TypeName from hrm_sales_seedsproduct sp INNER JOIN hrm_sales_seedsitem si ON sp.ItemId=si.ItemId INNER JOIN hrm_sales_seedtype st ON sp.TypeId=st.TypeId where si.ItemId=".$_REQUEST['ii']." order by ItemName ASC, TypeName ASC, ProductName ASC", $con); }
      elseif($_REQUEST['ii']=='All_1'){$sql = mysql_query("select sp.ItemId,ProductId,ProductName,ItemName,TypeName from hrm_sales_seedsproduct sp INNER JOIN hrm_sales_seedsitem si ON sp.ItemId=si.ItemId INNER JOIN hrm_sales_seedtype st ON sp.TypeId=st.TypeId where si.GroupId=1 order by ItemName ASC, TypeName ASC, ProductName ASC", $con); }
	  elseif($_REQUEST['ii']=='All_2'){$sql = mysql_query("select sp.ItemId,ProductId,ProductName,ItemName,TypeName from hrm_sales_seedsproduct sp INNER JOIN hrm_sales_seedsitem si ON sp.ItemId=si.ItemId INNER JOIN hrm_sales_seedtype st ON sp.TypeId=st.TypeId where si.GroupId=2 order by ItemName ASC, TypeName ASC, ProductName ASC", $con);}
	  
      $Sn=1; while($res=mysql_fetch_array($sql)){
$sqlP2d=mysql_query("select * from hrm_sales_sal_details_".$_REQUEST['y']." where YearId=".$_REQUEST['y']." AND ProductId=".$res['ProductId']." AND DealerId=".$resDeal['DealerId'], $con); $resP2d=mysql_fetch_assoc($sqlP2d);
$sqlP3d=mysql_query("select M1_Proj, M2_Proj, M3_Proj, M4_Proj, M5_Proj, M6_Proj, M7_Proj, M8_Proj, M9_Proj, M10_Proj, M11_Proj, M12_Proj from hrm_sales_sal_details_".$AfterYId." where YearId=".$AfterYId." AND ProductId=".$res['ProductId']." AND DealerId=".$resDeal['DealerId'], $con);  $resP3d=mysql_fetch_assoc($sqlP3d); $DeId=$resDeal['DealerId'];

/////////////////////////////////////////////////
$sqlP2dhq=mysql_query("select * from hrm_sales_sal_details_".$_REQUEST['y']." sd INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId where d.HqId=".$_REQUEST['hq']." AND ProductId=".$res['ProductId']." AND YearId=".$_REQUEST['y'], $con);
$sqlP3dhq=mysql_query("select * from hrm_sales_sal_details_".$AfterYId." sd INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId where d.HqId=".$_REQUEST['hq']." AND ProductId=".$res['ProductId']." AND YearId=".$AfterYId, $con);   
$rowP2dhq=mysql_num_rows($sqlP2dhq); $rowP3dhq=mysql_num_rows($sqlP3dhq); 
////////////////////////////////////////////////

$sChk=mysql_query("select * from hrm_sales_arrange_prod where ProductId=".$res['ProductId']." AND ArrgStatus='Y' AND StateId=".$resSt['StateId'], $con); $rowChkP=mysql_fetch_assoc($sChk);

if($RslP=='Y'){ $a1d=$resP2d['M1_Ach']; $a2d=$resP2d['M2_Ach']; $a3d=$resP2d['M3_Ach']; $a4d=$resP2d['M4_Ach']; $a5d=$resP2d['M5_Ach']; $a6d=$resP2d['M6_Ach']; $a7d=$resP2d['M7_Ach']; $a8d=$resP2d['M8_Ach']; $a9d=$resP2d['M9_Ach']; $a10d=$resP2d['M10_Ach']; $a11d=$resP2d['M11_Ach']; $a12d=$resP2d['M12_Ach']; } 
if($EntP=='Y'){ $a1d=$resP3d['M1_Proj']; $a2d=$resP3d['M2_Proj']; $a3d=$resP3d['M3_Proj']; $a4d=$resP3d['M4_Proj']; $a5d=$resP3d['M5_Proj']; $a6d=$resP3d['M6_Proj']; $a7d=$resP3d['M7_Proj']; $a8d=$resP3d['M8_Proj']; $a9d=$resP3d['M9_Proj']; $a10d=$resP3d['M10_Proj']; $a11d=$resP3d['M11_Proj']; $a12d=$resP3d['M12_Proj']; }

if(($rowDealChk>0 AND ($rowChkP>0 OR $resP2d['M1']!=0 OR $resP2d['M2']!=0 OR $resP2d['M3']!=0 OR $resP2d['M4']!=0 OR $resP2d['M5']!=0 OR $resP2d['M6']!=0 OR $resP2d['M7']!=0 OR $resP2d['M8']!=0 OR $resP2d['M9']!=0 OR $resP2d['M10']!=0 OR $resP2d['M11']!=0 OR $resP2d['M12']!=0 OR $a1d!=0 OR $a2d!=0 OR $a3d!=0 OR $a4d!=0 OR $a5d!=0 OR $a6d!=0 OR $a7d!=0 OR $a8d!=0 OR $a9d!=0 OR $a10d!=0 OR $a11d!=0 OR $a12d!=0)) OR ($rowDealChk==0 AND ($rowChkP>0 OR $rowP2dhq>0 OR $rowP3dhq>0))){ ?>	

   <tr bgcolor="#EEEEEE" style="height:22px;">
<?php if($_REQUEST['ii']=='All_1' OR $_REQUEST['ii']=='All_2'){ ?>	  
     <td bgcolor="#FFFFFF"><input class="Inputt" style="width:100px;" value="<?php echo $res['ItemName']; ?>" /></td>
<?php } ?>		 
	 <td bgcolor="#FFFFFF"><input class="Inputt" style="width:120px;" value="<?php echo $res['ProductName']; ?>" /><input type="hidden" id="<?php echo $DeId; ?>P_<?php echo $Sn; ?>" value="<?php echo $res['ProductId']; ?>" /></td>
	 <td bgcolor="#FFFFFF" align="center" style="font-size:12px;"><?php echo substr_replace($res['TypeName'], '', 2); ?></td>
	 <td align="center" valign="middle" bgcolor="#FFFFFF" id="TD<?php echo $resDeal['DealerId'].'_'.$Sn; ?>">
	   <?php if($resCPerMi['EditPerMi']=='Y' AND $EntP=='Y'){ ?>
	   <?php //if($rowSubEmp==0){ //if($resP2['St_EmployeeID']==0 OR $resP2['St_EmployeeID']==1 OR $resP2['St_R1']==3){ ?>
<img src="images/edit.png" border="0" alt="Edit" id="<?php echo $resDeal['DealerId']; ?>EditBtn_<?php echo $Sn; ?>" onClick="editD(<?php echo $Sn.', '.$_REQUEST['q'].', '.$resDeal['DealerId']; ?>)" style="display:block;">
<img src="images/Floppy-Small-icon.png" border="0" alt="Save" id="<?php echo $resDeal['DealerId']; ?>SaveBtn_<?php echo $Sn; ?>" onClick="saveD(<?php echo $Sn.', '.$_REQUEST['y'].', '.$resDeal['DealerId'].', '.$_REQUEST['q']; ?>)" style="display:none;">
	   <?php //} ?>
	   <?php } else {echo '&nbsp;';} ?>
   	</td>
<td><input class="Inputi" id="<?php echo $DeId; ?>M1_Be<?php echo $Sn; ?>" value="<?php if($resP2d['M1']!='' AND $resP2d['M1']!=0){echo floatval($resP2d['M1']);} ?>"/></td>
<?php if($RslP=='Y'){ ?><td><input class="Inputc" style="width:50px;" value="<?php if($resP2d['M1_Ach']!='' AND $resP2d['M1_Ach']!=0){echo floatval($resP2d['M1_Ach']);} ?>" readonly/></td><?php } ?>
<?php if($EntP=='Y'){ ?><td id="<?php echo $DeId.'TM1_Ce'.$Sn; ?>"><input class="Inputi" id="<?php echo $DeId; ?>M1_Ce<?php echo $Sn; ?>" value="<?php if($resP3d['M1_Proj']!='' AND $resP3d['M1_Proj']!=0){echo floatval($resP3d['M1_Proj']);} ?>"/></td><?php } ?>	  

<td><input class="Inputi" id="<?php echo $DeId; ?>M2_Be<?php echo $Sn; ?>" value="<?php if($resP2d['M2']!='' AND $resP2d['M2']!=0){echo floatval($resP2d['M2']);} ?>"/></td>
<?php if($RslP=='Y'){ ?><td><input class="Inputc" style="width:50px;" value="<?php if($resP2d['M2_Ach']!='' AND $resP2d['M2_Ach']!=0){echo floatval($resP2d['M2_Ach']);} ?>" readonly/></td><?php } ?>
<?php if($EntP=='Y'){ ?><td id="<?php echo $DeId.'TM2_Ce'.$Sn; ?>"><input class="Inputi" id="<?php echo $DeId; ?>M2_Ce<?php echo $Sn; ?>" value="<?php if($resP3d['M2_Proj']!='' AND $resP3d['M2_Proj']!=0){echo floatval($resP3d['M2_Proj']);} ?>"/></td><?php } ?>	  

<td><input class="Inputi" id="<?php echo $DeId; ?>M3_Be<?php echo $Sn; ?>" value="<?php if($resP2d['M3']!='' AND $resP2d['M3']!=0){echo floatval($resP2d['M3']);} ?>"/></td>
<?php if($RslP=='Y'){ ?><td><input class="Inputc" style="width:50px;" value="<?php if($resP2d['M3_Ach']!='' AND $resP2d['M3_Ach']!=0){echo floatval($resP2d['M3_Ach']);} ?>" readonly/></td><?php } ?>
<?php if($EntP=='Y'){ ?><td id="<?php echo $DeId.'TM3_Ce'.$Sn; ?>"><input class="Inputi" id="<?php echo $DeId; ?>M3_Ce<?php echo $Sn; ?>" value="<?php if($resP3d['M3_Proj']!='' AND $resP3d['M3_Proj']!=0){echo floatval($resP3d['M3_Proj']);} ?>"/></td><?php } ?>	  
	 
<td><input class="Inputi" id="<?php echo $DeId; ?>M4_Be<?php echo $Sn; ?>" value="<?php if($resP2d['M4']!='' AND $resP2d['M4']!=0){echo floatval($resP2d['M4']);} ?>"/></td>
<?php if($RslP=='Y'){ ?><td><input class="Inputc" style="width:50px;" value="<?php if($resP2d['M4_Ach']!='' AND $resP2d['M4_Ach']!=0){echo floatval($resP2d['M4_Ach']);} ?>" readonly/></td><?php } ?>
<?php if($EntP=='Y'){ ?><td id="<?php echo $DeId.'TM4_Ce'.$Sn; ?>"><input class="Inputi" id="<?php echo $DeId; ?>M4_Ce<?php echo $Sn; ?>" value="<?php if($resP3d['M4_Proj']!='' AND $resP3d['M4_Proj']!=0){echo floatval($resP3d['M4_Proj']);} ?>"/></td><?php } ?>	  

<td><input class="Inputi" id="<?php echo $DeId; ?>M5_Be<?php echo $Sn; ?>" value="<?php if($resP2d['M5']!='' AND $resP2d['M5']!=0){echo floatval($resP2d['M5']);} ?>"/></td>
<?php if($RslP=='Y'){ ?><td><input class="Inputc" style="width:50px;" value="<?php if($resP2d['M5_Ach']!='' AND $resP2d['M5_Ach']!=0){echo floatval($resP2d['M5_Ach']);} ?>" readonly/></td><?php } ?>
<?php if($EntP=='Y'){ ?><td id="<?php echo $DeId.'TM5_Ce'.$Sn; ?>"><input class="Inputi" id="<?php echo $DeId; ?>M5_Ce<?php echo $Sn; ?>" value="<?php if($resP3d['M5_Proj']!='' AND $resP3d['M5_Proj']!=0){echo floatval($resP3d['M5_Proj']);} ?>"/></td><?php } ?>	  

<td><input class="Inputi" id="<?php echo $DeId; ?>M6_Be<?php echo $Sn; ?>" value="<?php if($resP2d['M6']!='' AND $resP2d['M6']!=0){echo floatval($resP2d['M6']);} ?>"/></td>
<?php if($RslP=='Y'){ ?><td><input class="Inputc" style="width:50px;" value="<?php if($resP2d['M6_Ach']!='' AND $resP2d['M6_Ach']!=0){echo floatval($resP2d['M6_Ach']);} ?>" readonly/></td><?php } ?>
<?php if($EntP=='Y'){ ?><td id="<?php echo $DeId.'TM6_Ce'.$Sn; ?>"><input class="Inputi" id="<?php echo $DeId; ?>M6_Ce<?php echo $Sn; ?>" value="<?php if($resP3d['M6_Proj']!='' AND $resP3d['M6_Proj']!=0){echo floatval($resP3d['M6_Proj']);} ?>"/></td><?php } ?>	  
	 
<td><input class="Inputi" id="<?php echo $DeId; ?>M7_Be<?php echo $Sn; ?>" value="<?php if($resP2d['M7']!='' AND $resP2d['M7']!=0){echo floatval($resP2d['M7']);} ?>"/></td>
<?php if($RslP=='Y'){ ?><td><input class="Inputc" style="width:50px;" value="<?php if($resP2d['M7_Ach']!='' AND $resP2d['M7_Ach']!=0){echo floatval($resP2d['M7_Ach']);} ?>" readonly/></td><?php } ?>
<?php if($EntP=='Y'){ ?><td id="<?php echo $DeId.'TM7_Ce'.$Sn; ?>"><input class="Inputi" id="<?php echo $DeId; ?>M7_Ce<?php echo $Sn; ?>" value="<?php if($resP3d['M7_Proj']!='' AND $resP3d['M7_Proj']!=0){echo floatval($resP3d['M7_Proj']);} ?>"/></td><?php } ?>	  

<td><input class="Inputi" id="<?php echo $DeId; ?>M8_Be<?php echo $Sn; ?>" value="<?php if($resP2d['M8']!='' AND $resP2d['M8']!=0){echo floatval($resP2d['M8']);} ?>"/></td>
<?php if($RslP=='Y'){ ?><td><input class="Inputc" style="width:50px;" value="<?php if($resP2d['M8_Ach']!='' AND $resP2d['M8_Ach']!=0){echo floatval($resP2d['M8_Ach']);} ?>" readonly/></td><?php } ?>
<?php if($EntP=='Y'){ ?><td id="<?php echo $DeId.'TM8_Ce'.$Sn; ?>"><input class="Inputi" id="<?php echo $DeId; ?>M8_Ce<?php echo $Sn; ?>" value="<?php if($resP3d['M8_Proj']!='' AND $resP3d['M8_Proj']!=0){echo floatval($resP3d['M8_Proj']);} ?>"/></td><?php } ?>	  

<td><input class="Inputi" id="<?php echo $DeId; ?>M9_Be<?php echo $Sn; ?>" value="<?php if($resP2d['M9']!='' AND $resP2d['M9']!=0){echo floatval($resP2d['M9']);} ?>"/></td>
<?php if($RslP=='Y'){ ?><td><input class="Inputc" style="width:50px;" value="<?php if($resP2d['M9_Ach']!='' AND $resP2d['M9_Ach']!=0){echo floatval($resP2d['M9_Ach']);} ?>" readonly/></td><?php } ?>
<?php if($EntP=='Y'){ ?><td id="<?php echo $DeId.'TM9_Ce'.$Sn; ?>"><input class="Inputi" id="<?php echo $DeId; ?>M9_Ce<?php echo $Sn; ?>" value="<?php if($resP3d['M9_Proj']!='' AND $resP3d['M9_Proj']!=0){echo floatval($resP3d['M9_Proj']);} ?>"/></td><?php } ?>	  	

<td><input class="Inputi" id="<?php echo $DeId; ?>M10_Be<?php echo $Sn; ?>" value="<?php if($resP2d['M10']!=0){echo floatval($resP2d['M10']);} ?>"/></td>
<?php if($RslP=='Y'){ ?><td><input class="Inputc" style="width:50px;" value="<?php if($resP2d['M10_Ach']!=0){echo floatval($resP2d['M10_Ach']);} ?>" readonly/></td><?php } ?>
<?php if($EntP=='Y'){ ?><td id="<?php echo $DeId.'TM10_Ce'.$Sn; ?>"><input class="Inputi" id="<?php echo $DeId; ?>M10_Ce<?php echo $Sn; ?>" value="<?php if($resP3d['M10_Proj']!='' AND $resP3d['M10_Proj']!=0){echo floatval($resP3d['M10_Proj']);} ?>"/></td><?php } ?>	  

<td><input class="Inputi" id="<?php echo $DeId; ?>M11_Be<?php echo $Sn; ?>" value="<?php if($resP2d['M11']!=0){echo floatval($resP2d['M11']);} ?>"/></td>
<?php if($RslP=='Y'){ ?><td><input class="Inputc" style="width:50px;" value="<?php if($resP2d['M11_Ach']!='' AND $resP2d['M11_Ach']!=0){echo floatval($resP2d['M11_Ach']);} ?>" readonly/></td><?php } ?>
<?php if($EntP=='Y'){ ?><td id="<?php echo $DeId.'TM11_Ce'.$Sn; ?>"><input class="Inputi" id="<?php echo $DeId; ?>M11_Ce<?php echo $Sn; ?>" value="<?php if($resP3d['M11_Proj']!='' AND $resP3d['M11_Proj']!=0){echo floatval($resP3d['M11_Proj']);} ?>"/></td><?php } ?>	  

<td><input class="Inputi" id="<?php echo $DeId; ?>M12_Be<?php echo $Sn; ?>" value="<?php if($resP2d['M12']!='' AND $resP2d['M12']!=0){echo floatval($resP2d['M12']);} ?>"/></td>
<?php if($RslP=='Y'){ ?><td><input class="Inputc" style="width:50px;" value="<?php if($resP2d['M12_Ach']!='' AND $resP2d['M12_Ach']!=0){echo floatval($resP2d['M12_Ach']);} ?>" readonly/></td><?php } ?>
<?php if($EntP=='Y'){ ?><td id="<?php echo $DeId.'TM12_Ce'.$Sn; ?>"><input class="Inputi" id="<?php echo $DeId; ?>M12_Ce<?php echo $Sn; ?>" value="<?php if($resP3d['M12_Proj']!='' AND $resP3d['M12_Proj']!=0){echo floatval($resP3d['M12_Proj']);} ?>"/></td><?php } ?>
	  	 
<?php  
$TotP2d=$resP2d['M1']+$resP2d['M2']+$resP2d['M3']+$resP2d['M4']+$resP2d['M5']+$resP2d['M6']+$resP2d['M7']+$resP2d['M8']+$resP2d['M9']+$resP2d['M10']+$resP2d['M11']+$resP2d['M12']; 
$TotP2dch=$resP2d['M1_Ach']+$resP2d['M2_Ach']+$resP2d['M3_Ach']+$resP2d['M4_Ach']+$resP2d['M5_Ach']+$resP2d['M6_Ach']+$resP2d['M7_Ach']+$resP2d['M8_Ach']+$resP2d['M9_Ach']+$resP2d['M10_Ach']+$resP2d['M11_Ach']+$resP2d['M12_Ach'];
$TotP3d=$resP3d['M1_Proj']+$resP3d['M2_Proj']+$resP3d['M3_Proj']+$resP3d['M4_Proj']+$resP3d['M5_Proj']+$resP3d['M6_Proj']+$resP3d['M7_Proj']+$resP3d['M8_Proj']+$resP3d['M9_Proj']+$resP3d['M10_Proj']+$resP3d['M11_Proj']+$resP3d['M12_Proj'];
?>	 	 
<td><input class="InputB" id="<?php echo $DeId; ?>TotP2d_<?php echo $Sn; ?>" value="<?php if($TotP2d!=0 AND $TotP2d!=''){echo floatval($TotP2d);}else{echo '';} ?>" readonly/></td>
<?php if($RslP=='Y'){ ?><td><input class="InputBc" style="width:50px;" value="<?php if($TotP2dch!=0 AND $TotP2dch!=''){echo floatval($TotP2dch);}else{echo '';} ?>" readonly/></td><?php } ?>
<?php if($EntP=='Y'){ ?><td><input class="InputB" id="<?php echo $DeId; ?>TotP3d_<?php echo $Sn; ?>" value="<?php if($TotP3d!=0 AND $TotP3d!=''){echo floatval($TotP3d);}else{echo '';} ?>" readonly/></td><?php } ?>
	
  </tr>	
<?php } $Sn++; } $dSn=$Sn-1; ?><input type="hidden" id="<?php echo $DeId; ?>Count" value="<?php echo $dSn; ?>" />     

<?php if($_REQUEST['ii']!='All_1' AND $_REQUEST['ii']!='All_2'){ 
$sqlP2td=mysql_query("select SUM(M1) as tsM1,SUM(M2) as tsM2,SUM(M3) as tsM3,SUM(M4) as tsM4,SUM(M5) as tsM5,SUM(M6) as tsM6,SUM(M7) as tsM7,SUM(M8) as tsM8,SUM(M9) as tsM9,SUM(M10) as tsM10,SUM(M10) as tsM10,SUM(M11) as tsM11,SUM(M12) as tsM12, SUM(M1_Ach) as tssM1,SUM(M2_Ach) as tssM2,SUM(M3_Ach) as tssM3,SUM(M4_Ach) as tssM4,SUM(M5_Ach) as tssM5,SUM(M6_Ach) as tssM6,SUM(M7_Ach) as tssM7,SUM(M8_Ach) as tssM8,SUM(M9_Ach) as tssM9,SUM(M10_Ach) as tssM10,SUM(M11_Ach) as tssM11,SUM(M12_Ach) as tssM12 from hrm_sales_sal_details_".$_REQUEST['y']." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId where sd.DealerId=".$resDeal['DealerId']." AND sp.ItemId=".$_REQUEST['ii']." AND sd.YearId=".$_REQUEST['y'], $con); $resP2td=mysql_fetch_assoc($sqlP2td); 
$sqlP3td=mysql_query("select SUM(M1_Proj) as tsM1,SUM(M2_Proj) as tsM2,SUM(M3_Proj) as tsM3,SUM(M4_Proj) as tsM4,SUM(M5_Proj) as tsM5,SUM(M6_Proj) as tsM6,SUM(M7_Proj) as tsM7,SUM(M8_Proj) as tsM8,SUM(M9_Proj) as tsM9,SUM(M10_Proj) as tsM10,SUM(M11_Proj) as tsM11,SUM(M12_Proj) as tsM12 from hrm_sales_sal_details_".$AfterYId." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId where sd.DealerId=".$resDeal['DealerId']." AND sp.ItemId=".$_REQUEST['ii']." AND sd.YearId=".$AfterYId, $con); $resP3td=mysql_fetch_assoc($sqlP3td);
?>
   <tr style="font-size:14px;color:#000000;background-color:#FFFFA6;height:24px;">
	  <td colspan="3" align="right" style="font-size:16px;"><b>TOTAL:&nbsp;</b></td>
	 <td><input class="TInput" id="<?php echo $DeId; ?>M1_BeT" value="<?php if($resP2td['tsM1']!=0){echo floatval($resP2td['tsM1']);} ?>" readonly/></td>
	 <?php if($RslP=='Y'){ ?><td><input class="TInput" value="<?php if($resP2td['tssM1']!=0){echo floatval($resP2td['tssM1']);} ?>" readonly/></td><?php } ?>
     <?php if($EntP=='Y'){ ?><td><input class="TInput" id="<?php echo $DeId; ?>M1_CeT" value="<?php if($resP3td['tsM1']!=0){echo floatval($resP3td['tsM1']);} ?>" readonly/></td><?php } ?>
	 
	 <td><input class="TInput" id="<?php echo $DeId; ?>M2_BeT" value="<?php if($resP2td['tsM2']!=0){echo floatval($resP2td['tsM2']);} ?>" readonly/></td>
	 <?php if($RslP=='Y'){ ?><td><input class="TInput" value="<?php if($resP2td['tssM2']!=0){echo floatval($resP2td['tssM2']);} ?>" readonly/></td><?php } ?>
     <?php if($EntP=='Y'){ ?><td><input class="TInput" id="<?php echo $DeId; ?>M2_CeT" value="<?php if($resP3td['tsM2']!=0){echo floatval($resP3td['tsM2']);} ?>" readonly/></td><?php } ?>
	 
	 <td><input class="TInput" id="<?php echo $DeId; ?>M3_BeT" value="<?php if($resP2td['tsM3']!=0){echo floatval($resP2td['tsM3']);} ?>" readonly/></td>
	 <?php if($RslP=='Y'){ ?><td><input class="TInput" value="<?php if($resP2td['tssM3']!=0){echo floatval($resP2td['tssM3']);} ?>" readonly/></td><?php } ?>
     <?php if($EntP=='Y'){ ?><td><input class="TInput" id="<?php echo $DeId; ?>M3_CeT" value="<?php if($resP3td['tsM3']!=0){echo floatval($resP3td['tsM3']);} ?>" readonly/></td><?php } ?>
	 						 							
	 <td><input class="TInput" id="<?php echo $DeId; ?>M4_BeT" value="<?php if($resP2td['tsM4']!=0){echo floatval($resP2td['tsM4']);} ?>" readonly/></td>
	 <?php if($RslP=='Y'){ ?><td><input class="TInput" value="<?php if($resP2td['tssM4']!=0){echo floatval($resP2td['tssM4']);} ?>" readonly/></td><?php } ?>
     <?php if($EntP=='Y'){ ?><td><input class="TInput" id="<?php echo $DeId; ?>M4_CeT" value="<?php if($resP3td['tsM4']!=0){echo floatval($resP3td['tsM4']);} ?>" readonly/></td><?php } ?>
	 
	 <td><input class="TInput" id="<?php echo $DeId; ?>M5_BeT" value="<?php if($resP2td['tsM5']!=0){echo floatval($resP2td['tsM5']);} ?>" readonly/></td>
	 <?php if($RslP=='Y'){ ?><td><input class="TInput" value="<?php if($resP2td['tssM5']!=0){echo floatval($resP2td['tssM5']);} ?>" readonly/></td><?php } ?>
     <?php if($EntP=='Y'){ ?><td><input class="TInput" id="<?php echo $DeId; ?>M5_CeT" value="<?php if($resP3td['tsM5']!=0){echo floatval($resP3td['tsM5']);} ?>" readonly/></td><?php } ?>
	 
	 <td><input class="TInput" id="<?php echo $DeId; ?>M6_BeT" value="<?php if($resP2td['tsM6']!=0){echo floatval($resP2td['tsM6']);} ?>" readonly/></td>
	 <?php if($RslP=='Y'){ ?><td><input class="TInput" value="<?php if($resP2td['tssM6']!=0){echo floatval($resP2td['tssM6']);} ?>" readonly/></td><?php } ?>
     <?php if($EntP=='Y'){ ?><td><input class="TInput" id="<?php echo $DeId; ?>M6_CeT" value="<?php if($resP3td['tsM6']!=0){echo floatval($resP3td['tsM6']);} ?>" readonly/></td><?php } ?>
	 		
	 <td><input class="TInput" id="<?php echo $DeId; ?>M7_BeT" value="<?php if($resP2td['tsM7']!=0){echo floatval($resP2td['tsM7']);} ?>" readonly/></td>
	 <?php if($RslP=='Y'){ ?><td><input class="TInput" value="<?php if($resP2td['tssM7']!=0){echo floatval($resP2td['tssM7']);} ?>" readonly/></td><?php } ?>
     <?php if($EntP=='Y'){ ?><td><input class="TInput" id="<?php echo $DeId; ?>M7_CeT" value="<?php if($resP3td['tsM7']!=0){echo floatval($resP3td['tsM7']);} ?>" readonly/></td><?php } ?>
	 
	 <td><input class="TInput" id="<?php echo $DeId; ?>M8_BeT" value="<?php if($resP2td['tsM8']!=0){echo floatval($resP2td['tsM8']);} ?>" readonly/></td>
	 <?php if($RslP=='Y'){ ?><td><input class="TInput" value="<?php if($resP2td['tssM8']!=0){echo floatval($resP2td['tssM8']);} ?>" readonly/></td><?php } ?>
     <?php if($EntP=='Y'){ ?><td><input class="TInput" id="<?php echo $DeId; ?>M8_CeT" value="<?php if($resP3td['tsM8']!=0){echo floatval($resP3td['tsM8']);} ?>" readonly/></td><?php } ?>
	 
	 <td><input class="TInput" id="<?php echo $DeId; ?>M9_BeT" value="<?php if($resP2td['tsM9']!=0){echo floatval($resP2td['tsM9']);} ?>" readonly/></td>
	 <?php if($RslP=='Y'){ ?><td><input class="TInput" value="<?php if($resP2td['tssM9']!=0){echo floatval($resP2td['tssM9']);} ?>" readonly/></td><?php } ?>
     <?php if($EntP=='Y'){ ?><td><input class="TInput" id="<?php echo $DeId; ?>M9_CeT" value="<?php if($resP3td['tsM9']!=0){echo floatval($resP3td['tsM9']);} ?>" readonly/></td><?php } ?>
	 		
	 <td><input class="TInput" id="<?php echo $DeId; ?>M10_BeT" value="<?php if($resP2td['tsM10']!=0){echo floatval($resP2td['tsM10']);} ?>" readonly/></td>
	 <?php if($RslP=='Y'){ ?><td><input class="TInput" value="<?php if($resP2td['tssM10']!=0){echo floatval($resP2td['tssM10']);} ?>" readonly/></td><?php } ?>
     <?php if($EntP=='Y'){ ?><td><input class="TInput" id="<?php echo $DeId; ?>M10_CeT" value="<?php if($resP3td['tsM10']!=0){echo floatval($resP3td['tsM10']);} ?>" readonly/></td><?php } ?>
	 
	 <td><input class="TInput" id="<?php echo $DeId; ?>M11_BeT" value="<?php if($resP2td['tsM11']!=0){echo floatval($resP2td['tsM11']);} ?>" readonly/></td>
	 <?php if($RslP=='Y'){ ?><td><input class="TInput" value="<?php if($resP2td['tssM11']!=0){echo floatval($resP2td['tssM11']);} ?>" readonly/></td><?php } ?>
     <?php if($EntP=='Y'){ ?><td><input class="TInput" id="<?php echo $DeId; ?>M11_CeT" value="<?php if($resP3td['tsM11']!=0){echo floatval($resP3td['tsM11']);} ?>" readonly/></td><?php } ?>
	 
	 <td><input class="TInput" id="<?php echo $DeId; ?>M12_BeT" value="<?php if($resP2td['tsM12']!=0){echo floatval($resP2td['tsM12']);} ?>" readonly/></td>
	 <?php if($RslP=='Y'){ ?><td><input class="TInput" value="<?php if($resP2td['tssM12']!=0){echo floatval($resP2td['tssM12']);} ?>" readonly/></td><?php } ?>
     <?php if($EntP=='Y'){ ?><td><input class="TInput" id="<?php echo $DeId; ?>M12_CeT" value="<?php if($resP3td['tsM12']!=0){echo floatval($resP3td['tsM12']);} ?>" readonly/></td><?php } ?>
	 		
	
<?php 
$TotP2td=$resP2td['tsM1']+$resP2td['tsM2']+$resP2td['tsM3']+$resP2td['tsM4']+$resP2td['tsM5']+$resP2td['tsM6']+$resP2td['tsM7']+$resP2td['tsM8']+$resP2td['tsM9']+$resP2td['tsM10']+$resP2td['tsM11']+$resP2td['tsM12']; 
$TotP2tdch=$resP2td['tssM1']+$resP2td['tssM2']+$resP2td['tssM3']+$resP2td['tssM4']+$resP2td['tssM5']+$resP2td['tssM6']+$resP2td['tssM7']+$resP2td['tssM8']+$resP2td['tssM9']+$resP2td['tssM10']+$resP2td['tssM11']+$resP2td['tssM12']; 
$TotP3td=$resP3td['tsM1']+$resP3td['tsM2']+$resP3td['tsM3']+$resP3td['tsM4']+$resP3td['tsM5']+$resP3td['tsM6']+$resP3td['tsM7']+$resP3td['tsM8']+$resP3td['tsM9']+$resP3td['tsM10']+$resP3td['tsM11']+$resP3td['tsM12'];
?>
	  <td><input class="TInput" id="<?php echo $DeId; ?>TotM_BeT" value="<?php if($TotP2td!=0 AND $TotP2td!=''){echo floatval($TotP2td);}else{echo '';} ?>" readonly/></td>
	  <?php if($RslP=='Y'){ ?><td><input class="TInput" value="<?php if($TotP2tdch!=0 AND $TotP2tdch!=''){echo floatval($TotP2tdch);}else{echo '';} ?>" readonly/></td><?php } ?>
      <?php if($EntP=='Y'){ ?><td><input class="TInput" id="<?php echo $DeId; ?>TotM_CeT" value="<?php if($TotP3td!=0 AND $TotP3td!=''){echo floatval($TotP3td);}else{echo '';} ?>" readonly/></td><?php } ?>
	  
  </tr>	
<?php } ?>  
</table>
</div>
</div>	       
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
<?php //********************************** Close ******************************************** ?>
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
			
<?php //***************************************************************************** ?>
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

