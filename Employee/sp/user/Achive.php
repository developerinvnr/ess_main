<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');}
include("../function.php");
include('codeEncDec.php');
if(check_user()==false){header('Location:../../../index.php');}
if($_SESSION['login'] = true){require_once('UserMenuSession.php');}
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
</style>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<Script type="text/javascript">window.history.forward(1);</Script>
<Script language="javascript">
function ClickCoutry(value,ei,di)
{ var url = 'SlctSalesCouStaCitAchive.php';	var pars = 'CouId='+value+'&ei='+ei+'&di='+di;	var myAjax = new Ajax.Request(
  url, { method: 'post', parameters: pars, onComplete: show_State });
}
function show_State(originalRequest)
{ document.getElementById('StateSpan').innerHTML = originalRequest.responseText; }

function ClickState(value,ei)
{ var CId=document.getElementById('ComId').value; var url = 'SlctSalesCouStaCitAchive.php';	var pars = 'AchiveStaId='+value+'&CId='+CId+'&ei='+ei;	var myAjax = new Ajax.Request(
  url, { method: 'post', parameters: pars, onComplete: show_Hq });
}
function show_Hq(originalRequest)
{ document.getElementById('HqSpan').innerHTML = originalRequest.responseText;}

function ClickHq(value)
{ var url = 'SlctSalesCouStaCit.php';	var pars = 'AchiveHqId='+value;	var myAjax = new Ajax.Request(
  url, { method: 'post', parameters: pars, onComplete: show_Dealer });
}
function show_Dealer(originalRequest)
{ document.getElementById('TabResult').innerHTML = originalRequest.responseText;}


function ClickDealer(di)
{ 
  var YearV=document.getElementById("YearV").value; var CropGrp=document.getElementById("CropGrp").value; var ii=document.getElementById("ItemV").value;
  var QtrV=document.getElementById("QtrV").value; var Coutry=document.getElementById("Coutry").value; var State=document.getElementById("State").value;
  var Hq=document.getElementById("Hq").value; var DealerD=document.getElementById("DealerD").value; var ci=document.getElementById("ComId").value;
  window.location="Achive.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y="+YearV+"&ci="+ci+"&c="+Coutry+"&s="+State+"&hq="+Hq+"&dil="+di+"&grp="+CropGrp+"&q="+QtrV+"&ii="+ii; 
}
function ChangrYear(YearV)
{
  var di=document.getElementById("DealerD").value; var CropGrp=document.getElementById("CropGrp").value; var ii=document.getElementById("ItemV").value;
  var QtrV=document.getElementById("QtrV").value; var Coutry=document.getElementById("Coutry").value; var State=document.getElementById("State").value;
  var Hq=document.getElementById("Hq").value; var DealerD=document.getElementById("DealerD").value; var ci=document.getElementById("ComId").value;
  window.location="Achive.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y="+YearV+"&ci="+ci+"&c="+Coutry+"&s="+State+"&hq="+Hq+"&dil="+di+"&grp="+CropGrp+"&q="+QtrV+"&ii="+ii; 
}
function ClickGrp(CropGrp)
{
  var di=document.getElementById("DealerD").value; var YearV=document.getElementById("YearV").value; var ii=0;
  var QtrV=document.getElementById("QtrV").value; var Coutry=document.getElementById("Coutry").value; var State=document.getElementById("State").value;
  var Hq=document.getElementById("Hq").value; var DealerD=document.getElementById("DealerD").value; var ci=document.getElementById("ComId").value;
  window.location="Achive.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y="+YearV+"&ci="+ci+"&c="+Coutry+"&s="+State+"&hq="+Hq+"&dil="+di+"&grp="+CropGrp+"&q="+QtrV+"&ii="+ii; 
}
function ChangeII(ii)
{
  var di=document.getElementById("DealerD").value; var YearV=document.getElementById("YearV").value; var CropGrp=document.getElementById("CropGrp").value;
  var QtrV=document.getElementById("QtrV").value; var Coutry=document.getElementById("Coutry").value; var State=document.getElementById("State").value;
  var Hq=document.getElementById("Hq").value; var DealerD=document.getElementById("DealerD").value; var ci=document.getElementById("ComId").value;
  window.location="Achive.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y="+YearV+"&ci="+ci+"&c="+Coutry+"&s="+State+"&hq="+Hq+"&dil="+di+"&grp="+CropGrp+"&q="+QtrV+"&ii="+ii; 
}

function ChangeQtr(QtrV)
{
  var di=document.getElementById("DealerD").value; var YearV=document.getElementById("YearV").value; var ii=document.getElementById("ItemV").value;
  var CropGrp=document.getElementById("CropGrp").value; var Coutry=document.getElementById("Coutry").value; var State=document.getElementById("State").value;
  var Hq=document.getElementById("Hq").value; var DealerD=document.getElementById("DealerD").value; var ci=document.getElementById("ComId").value;
  window.location="Achive.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y="+YearV+"&ci="+ci+"&c="+Coutry+"&s="+State+"&hq="+Hq+"&dil="+di+"&grp="+CropGrp+"&q="+QtrV+"&ii="+ii; 
}

function editD(sn,q,d)
{ document.getElementById(d+"EditBtn_"+sn).style.display='none'; document.getElementById(d+"SaveBtn_"+sn).style.display='block'; 
  if(q==1){ document.getElementById(d+"TM1_Ae"+sn).style.background='#FFFFFF'; document.getElementById(d+"TM1_Ae"+sn).style.background='#FFFFFF';
  document.getElementById(d+"M1_Ae"+sn).style.background='#FFFFFF';document.getElementById(d+"M1_Ae"+sn).readOnly=false;
  document.getElementById(d+"TM2_Ae"+sn).style.background='#FFFFFF'; document.getElementById(d+"TM2_Ae"+sn).style.background='#FFFFFF';
  document.getElementById(d+"M2_Ae"+sn).style.background='#FFFFFF'; document.getElementById(d+"M2_Ae"+sn).readOnly=false;
  document.getElementById(d+"TM3_Ae"+sn).style.background='#FFFFFF'; document.getElementById(d+"TM3_Ae"+sn).style.background='#FFFFFF';
  document.getElementById(d+"M3_Ae"+sn).style.background='#FFFFFF';document.getElementById(d+"M3_Ae"+sn).readOnly=false; }
  else if(q==2){ document.getElementById(d+"TM4_Ae"+sn).style.background='#FFFFFF'; document.getElementById(d+"TM4_Ae"+sn).style.background='#FFFFFF';
  document.getElementById(d+"M4_Ae"+sn).style.background='#FFFFFF';document.getElementById(d+"M4_Ae"+sn).readOnly=false;
  document.getElementById(d+"TM5_Ae"+sn).style.background='#FFFFFF'; document.getElementById(d+"TM5_Ae"+sn).style.background='#FFFFFF';
  document.getElementById(d+"M5_Ae"+sn).style.background='#FFFFFF'; document.getElementById(d+"M5_Ae"+sn).readOnly=false;
  document.getElementById(d+"TM6_Ae"+sn).style.background='#FFFFFF'; document.getElementById(d+"TM6_Ae"+sn).style.background='#FFFFFF';
  document.getElementById(d+"M6_Ae"+sn).style.background='#FFFFFF';document.getElementById(d+"M6_Ae"+sn).readOnly=false; }
  else if(q==3){ document.getElementById(d+"TM7_Ae"+sn).style.background='#FFFFFF'; document.getElementById(d+"TM7_Ae"+sn).style.background='#FFFFFF';
  document.getElementById(d+"M7_Ae"+sn).style.background='#FFFFFF';document.getElementById(d+"M7_Ae"+sn).readOnly=false;
  document.getElementById(d+"TM8_Ae"+sn).style.background='#FFFFFF'; document.getElementById(d+"TM8_Ae"+sn).style.background='#FFFFFF';
  document.getElementById(d+"M8_Ae"+sn).style.background='#FFFFFF'; document.getElementById(d+"M8_Ae"+sn).readOnly=false;
  document.getElementById(d+"TM9_Ae"+sn).style.background='#FFFFFF'; document.getElementById(d+"TM9_Ae"+sn).style.background='#FFFFFF';
  document.getElementById(d+"M9_Ae"+sn).style.background='#FFFFFF'; document.getElementById(d+"M9_Ae"+sn).readOnly=false; }
  else if(q==4){ document.getElementById(d+"TM10_Ae"+sn).style.background='#FFFFFF'; document.getElementById(d+"TM10_Ae"+sn).style.background='#FFFFFF';
  document.getElementById(d+"M10_Ae"+sn).style.background='#FFFFFF';document.getElementById(d+"M10_Ae"+sn).readOnly=false;
  document.getElementById(d+"TM11_Ae"+sn).style.background='#FFFFFF'; document.getElementById(d+"TM11_Ae"+sn).style.background='#FFFFFF';
  document.getElementById(d+"M11_Ae"+sn).style.background='#FFFFFF'; document.getElementById(d+"M11_Ae"+sn).readOnly=false;
  document.getElementById(d+"TM12_Ae"+sn).style.background='#FFFFFF'; document.getElementById(d+"TM12_Ae"+sn).style.background='#FFFFFF';
  document.getElementById(d+"M12_Ae"+sn).style.background='#FFFFFF'; document.getElementById(d+"M12_Ae"+sn).readOnly=false; }
}

function saveD(sn,yi,di,q)                            
{ var PId=document.getElementById(di+'P_'+sn).value; var hq=document.getElementById('Hq').value; var CropGrp=document.getElementById("CropGrp").value;
  var ii=document.getElementById("ItemV").value;
  if(q==1){ var M1A=parseFloat(document.getElementById(di+'M1_Ae'+sn).value); var M2A=parseFloat(document.getElementById(di+'M2_Ae'+sn).value); var M3A=parseFloat(document.getElementById(di+'M3_Ae'+sn).value); var Mn1A=document.getElementById(di+'M1_Ae'+sn).value; var Mn2A=document.getElementById(di+'M2_Ae'+sn).value; 
  var Mn3A=document.getElementById(di+'M3_Ae'+sn).value; 
  if(Mn1A==''){var n1A=0;}else{var n1A=M1A;} if(Mn2A==''){var n2A=0;}else{var n2A=M2A;} if(Mn3A==''){var n3A=0;}else{var n3A=M3A;}  
  var TotA=Math.round((n1A+n2A+n3A)*100)/100; 
  document.getElementById("TotAValueM").value=TotA;  
  document.getElementById("Sno").value=sn; document.getElementById("DealerId").value=di; var url = 'SlctSalesProdDeal.php';   
  var pars = 'Action=AddMonth&p='+PId+'&m1A='+n1A+'&m2A='+n2A+'&m3A='+n3A+'&TotA='+TotA+'&yi='+yi+'&di='+di+'&sn='+sn+'&hi='+hq+'&q='+q+'&ii='+ii+'&cg='+CropGrp; } 
  
  else if(q==2){ var M4A=parseFloat(document.getElementById(di+'M4_Ae'+sn).value); var M5A=parseFloat(document.getElementById(di+'M5_Ae'+sn).value); var M6A=parseFloat(document.getElementById(di+'M6_Ae'+sn).value); var Mn4A=document.getElementById(di+'M4_Ae'+sn).value; var Mn5A=document.getElementById(di+'M5_Ae'+sn).value; var Mn6A=document.getElementById(di+'M6_Ae'+sn).value; 
  if(Mn4A==''){var n4A=0;}else{var n4A=M4A;}if(Mn5A==''){var n5A=0;}else{var n5A=M5A;} if(Mn6A==''){var n6A=0;}else{var n6A=M6A;} 
  var TotA=Math.round((n4A+n5A+n6A)*100)/100; 
  document.getElementById("TotAValueM").value=TotA; 
  document.getElementById("Sno").value=sn; document.getElementById("DealerId").value=di; var url = 'SlctSalesProdDeal.php';  
  var pars = 'Action=AddMonth&p='+PId+'&m4A='+n4A+'&m5A='+n5A+'&m6A='+n6A+'&TotA='+TotA+'&yi='+yi+'&di='+di+'&sn='+sn+'&hi='+hq+'&q='+q+'&ii='+ii+'&cg='+CropGrp; } 
  
  else if(q==3){ var M7A=parseFloat(document.getElementById(di+'M7_Ae'+sn).value); var M8A=parseFloat(document.getElementById(di+'M8_Ae'+sn).value); var M9A=parseFloat(document.getElementById(di+'M9_Ae'+sn).value); var Mn7A=document.getElementById(di+'M7_Ae'+sn).value; var Mn8A=document.getElementById(di+'M8_Ae'+sn).value; var Mn9A=document.getElementById(di+'M9_Ae'+sn).value;
  if(Mn7A==''){var n7A=0;}else{var n7A=M7A;} if(Mn8A==''){var n8A=0;}else{var n8A=M8A;}if(Mn9A==''){var n9A=0;}else{var n9A=M9A;} 
  var TotA=Math.round((n7A+n8A+n9A)*100)/100; 
  document.getElementById("TotAValueM").value=TotA; 
  document.getElementById("Sno").value=sn; document.getElementById("DealerId").value=di; var url = 'SlctSalesProdDeal.php';  
  var pars = 'Action=AddMonth&p='+PId+'&m7A='+n7A+'&m8A='+n8A+'&m9A='+n9A+'&TotA='+TotA+'&yi='+yi+'&di='+di+'&sn='+sn+'&hi='+hq+'&q='+q+'&ii='+ii+'&cg='+CropGrp; } 
  
  else if(q==4){ var M10A=parseFloat(document.getElementById(di+'M10_Ae'+sn).value); var M11A=parseFloat(document.getElementById(di+'M11_Ae'+sn).value); var M12A=parseFloat(document.getElementById(di+'M12_Ae'+sn).value); var Mn10A=document.getElementById(di+'M10_Ae'+sn).value; var Mn11A=document.getElementById(di+'M11_Ae'+sn).value; var Mn12A=document.getElementById(di+'M12_Ae'+sn).value;
  if(Mn10A==''){var n10A=0;}else{var n10A=M10A;} if(Mn11A==''){var n11A=0;}else{var n11A=M11A;} if(Mn12A==''){var n12A=0;}else{var n12A=M12A;}
  var TotA=Math.round((n10A+n11A+n12A)*100)/100;  
  document.getElementById("TotAValueM").value=TotA; 
  document.getElementById("Sno").value=sn; document.getElementById("DealerId").value=di;  var url = 'SlctSalesProdDeal.php'; 
  var pars = 'Action=AddMonth&p='+PId+'&m10A='+n10A+'&m11A='+n11A+'&m12A='+n12A+'&TotA='+TotA+'&yi='+yi+'&di='+di+'&sn='+sn+'&hi='+hq+'&q='+q+'&ii='+ii+'&cg='+CropGrp; }  
  var myAjax = new Ajax.Request( url, { method: 'post', parameters: pars, onComplete: show_AddMonth });  
}
function show_AddMonth(originalRequest)   //TotP13d_  M12_CeT TotM_AeT
{ document.getElementById('AddMonthResult').innerHTML = originalRequest.responseText; var Sno=document.getElementById('Sno').value; 
  var di=document.getElementById('DealerId').value; var q=document.getElementById('q').value; var ii=document.getElementById('ii').value;
  var TotalA=document.getElementById(di+'TotP1d_'+Sno).value=document.getElementById('TotAValueM').value; 
 
  if(q==1){ document.getElementById(di+'TM1_Ae'+Sno).style.background='#E0FFC1'; document.getElementById(di+'TM2_Ae'+Sno).style.background='#E0FFC1'; document.getElementById(di+'TM3_Ae'+Sno).style.background='#E0FFC1'; document.getElementById(di+'M1_Ae'+Sno).style.background='#E0FFC1'; document.getElementById(di+'M2_Ae'+Sno).style.background='#E0FFC1'; document.getElementById(di+'M3_Ae'+Sno).style.background='#E0FFC1'; 
  document.getElementById(di+'M1_AeT').value=document.getElementById("Tot11").value; 
  document.getElementById(di+'M2_AeT').value=document.getElementById("Tot12").value; 
  document.getElementById(di+'M3_AeT').value=document.getElementById("Tot13").value; 
  document.getElementById(di+'TotM_AeT').value=document.getElementById("TTot1T").value;
  }  
  else if(q==2){ document.getElementById(di+'TM4_Ae'+Sno).style.background='#E0FFC1'; document.getElementById(di+'TM5_Ae'+Sno).style.background='#E0FFC1'; document.getElementById(di+'TM6_Ae'+Sno).style.background='#E0FFC1'; document.getElementById(di+'M4_Ae'+Sno).style.background='#E0FFC1'; document.getElementById(di+'M5_Ae'+Sno).style.background='#E0FFC1'; document.getElementById(di+'M6_Ae'+Sno).style.background='#E0FFC1'; 
  document.getElementById(di+'M4_AeT').value=document.getElementById("Tot11").value; 
  document.getElementById(di+'M5_AeT').value=document.getElementById("Tot12").value; 
  document.getElementById(di+'M6_AeT').value=document.getElementById("Tot13").value;
  document.getElementById(di+'TotM_AeT').value=document.getElementById("TTot1T").value;
  } 
  else if(q==3){ document.getElementById(di+'TM7_Ae'+Sno).style.background='#E0FFC1'; document.getElementById(di+'TM8_Ae'+Sno).style.background='#E0FFC1'; document.getElementById(di+'TM9_Ae'+Sno).style.background='#E0FFC1'; document.getElementById(di+'M7_Ae'+Sno).style.background='#E0FFC1'; document.getElementById(di+'M8_Ae'+Sno).style.background='#E0FFC1'; document.getElementById(di+'M9_Ae'+Sno).style.background='#E0FFC1';
  document.getElementById(di+'M7_AeT').value=document.getElementById("Tot11").value; 
  document.getElementById(di+'M8_AeT').value=document.getElementById("Tot12").value; 
  document.getElementById(di+'M9_AeT').value=document.getElementById("Tot13").value;
  document.getElementById(di+'TotM_AeT').value=document.getElementById("TTot1T").value;
  } 
  else if(q==4){ document.getElementById(di+'TM10_Ae'+Sno).style.background='#E0FFC1'; document.getElementById(di+'TM11_Ae'+Sno).style.background='#E0FFC1'; document.getElementById(di+'TM12_Ae'+Sno).style.background='#E0FFC1';  document.getElementById(di+'M10_Ae'+Sno).style.background='#E0FFC1'; document.getElementById(di+'M11_Ae'+Sno).style.background='#E0FFC1'; document.getElementById(di+'M12_Ae'+Sno).style.background='#E0FFC1';
  document.getElementById(di+'M10_AeT').value=document.getElementById("Tot11").value; 
  document.getElementById(di+'M11_AeT').value=document.getElementById("Tot12").value; 
  document.getElementById(di+'M12_AeT').value=document.getElementById("Tot13").value;
  document.getElementById(di+'TotM_AeT').value=document.getElementById("TTot1T").value;
  }
 document.getElementById(di+"EditBtn_"+Sno).style.display='block';  document.getElementById(di+"SaveBtn_"+Sno).style.display='none'; 
}

</Script>
</head>
<body class="body">
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
	  <td valign="top" align="center"  width="100%" id="MainWindow"><br>
<?php //************************************************************************************************************************************************************?>
<?php //**********************************************START*****START*****START******START******START***************************************************************?>
<?php //************************************************************************************************************************************************************?>
<input type="hidden" id="ComId" value="<?php echo $_REQUEST['ci']; ?>" />
<input type="hidden" id="UserId" value="<?php echo $UserId; ?>" />		  
<table border="0" style="margin-top:0px; width:100%; height:300px;">	
<tr>
 <td valign="top">
  <table>
   <tr>
    <td id="Entry" style="width:1080px;" valign="top">
	<span id="TabEntry">
     <table border="0">
      <tr>
	    <td style="margin-top:0px;width:200px;" class="heading"><u>Achivement</u></td>
	    <td style="font-size:11px;height:18px;width:90px;color:#E6E6E6;" align="right"><b>Year :</b></td>
		<?php /*
	    <td><select style="font-size:12px;width:120px;height:20px;background-color:#DDFFBB;" name="YearV" id="YearV" onChange="ChangrYear(this.value)"> 
<?php $sqly=mysql_query("select FromDate,ToDate from hrm_year where YearId=".$_REQUEST['y'], $con); $resy=mysql_fetch_assoc($sqly); 
      $fromdate=date("Y",strtotime($resy['FromDate'])); $todate=date("Y",strtotime($resy['ToDate'])); 
	  $NextYear=$_REQUEST['y']+1; $PrevYear=$_REQUEST['y']-1; 
	  $sqly2=mysql_query("select FromDate,ToDate from hrm_year where YearId=".$NextYear, $con); $resy2=mysql_fetch_assoc($sqly2);
	  $sqly3=mysql_query("select FromDate,ToDate from hrm_year where YearId=".$PrevYear, $con); $resy3=mysql_fetch_assoc($sqly3); ?>		
 <option value="<?php echo $_REQUEST['y']; ?>" selected><?php echo $fromdate.'-'.$todate; ?></option>
 <?php if($PrevYear>=1){?><option value="<?php echo $PrevYear; ?>"><?php echo date("Y",strtotime($resy3['FromDate'])).'-'.date("Y",strtotime($resy3['ToDate'])); ?></option><?php } ?><option value="<?php echo $NextYear; ?>"><?php echo date("Y",strtotime($resy2['FromDate'])).'-'.date("Y",strtotime($resy2['ToDate'])); ?></option></select>
       </td>
	   */ ?>
	   
	    <td><select style="font-size:12px;width:120px;height:20px;background-color:#DDFFBB;" name="YearV" id="YearV" onChange="ChangrYear(this.value)"> 
<?php $sqly=mysql_query("select FromDate,ToDate from hrm_year where YearId=".$_REQUEST['y'], $con); $resy=mysql_fetch_assoc($sqly); 
      $fromdate=date("Y",strtotime($resy['FromDate'])); $todate=date("Y",strtotime($resy['ToDate'])); ?>		
 <option value="<?php echo $_REQUEST['y']; ?>" selected><?php echo $fromdate.'-'.$todate; ?></option>
 <option value="3"><?php echo '2014-2015'; ?></option><option value="4"><?php echo '2015-2016'; ?></option></select>
       </td>
	   
	   
	   <td>&nbsp;</td>
	   <td style="font-size:11px;height:18px;width:80px;color:#E6E6E6;" align="right"><b>Crop :</b></td>
	    <td>
		 <select style="font-size:12px;width:180px;height:20px;background-color:#DDFFBB;" name="CropGrp" id="CropGrp" onChange="ClickGrp(this.value)">
<?php if($_REQUEST['grp']==1){ ?><option value="1" selected>Vegetable Crop</option><option value="2">Field Crop</option><option value="3">All Crop</option>
<?php }elseif($_REQUEST['grp']==2){ ?><option value="2" selected>Field Crop</option><option value="1">Vegetable Crop</option><option value="3">All Crop</option>
<?php }elseif($_REQUEST['grp']==3){ ?><option value="3" selected>All Crop</option><option value="1">Vegetable Crop</option><option value="2">Field Crop</option><?php } ?>	
        </select>
		</td>
		<td>&nbsp;</td>
		<td style="font-size:11px; height:18px;width:80px;color:#E6E6E6;" align="right"><b>Name :</b></td>
	     <td>
		 <select style="font-size:12px;width:120px;height:20px;background-color:#DDFFBB;" name="ItemV" id="ItemV" onChange="ChangeII(this.value)">
<?php if($_REQUEST['ii']>0){ $sqlI=mysql_query("select ItemName from hrm_sales_seedsitem where ItemId=".$_REQUEST['ii'], $con); $resI=mysql_fetch_assoc($sqlI); ?>	
         <option value="<?php echo $_REQUEST['ii']; ?>" selected><?php echo ucwords(strtolower($resI['ItemName'])); ?></option>
		 <?php }else{ ?><option value="0" selected>Select</option><?php } ?>
<?php if($_REQUEST['grp']==1){ $sqlItem=mysql_query("select * from hrm_sales_seedsitem where GroupId=1 order by ItemName ASC", $con);}
      elseif($_REQUEST['grp']==2){ $sqlItem=mysql_query("select * from hrm_sales_seedsitem where GroupId=2 order by ItemName ASC", $con);}
      elseif($_REQUEST['grp']==3){ $sqlItem=mysql_query("select * from hrm_sales_seedsitem where (GroupId=1 OR GroupId=2) order by GroupId ASC,ItemName ASC", $con);}
	  while($resItem=mysql_fetch_assoc($sqlItem)){ ?><option value="<?php echo $resItem['ItemId']; ?>"><?php echo $resItem['ItemName']; ?></option><?php } ?>
	     </select>	  
		 </td>
		 <td>&nbsp;</td>
		<td style="font-size:11px; height:18px;width:100px;color:#E6E6E6;" align="right"><b>Quarter :</b></td>
	     <td>
		 <select style="font-size:12px;width:120px;height:20px;background-color:#DDFFBB;" name="QtrV" id="QtrV" onChange="ChangeQtr(this.value)">
         <option value="<?php echo $_REQUEST['q']; ?>" selected><?php echo 'Quarter-0'.$_REQUEST['q']; ?></option> 
<?php if($_REQUEST['q']==1){ ?>	<option value="2">Quarter-02</option><option value="3">Quarter-03</option><option value="4">Quarter-04</option>
<?php } elseif($_REQUEST['q']==2){ ?><option value="3">Quarter-03</option><option value="4">Quarter-04</option><option value="1">Quarter-01</option>
<?php } elseif($_REQUEST['q']==3){ ?><option value="4">Quarter-04</option><option value="1">Quarter-01</option><option value="2">Quarter-02</option>
<?php } elseif($_REQUEST['q']==4){ ?><option value="1">Quarter-01</option><option value="2">Quarter-02</option><option value="3">Quarter-03</option><?php } ?></select>
		 </td>
	  </tr>
	  <tr>
	    <td style="margin-top:0px;width:200px;" class="heading">&nbsp;</td>
	    <td style="font-size:11px;height:18px;width:90px;color:#E6E6E6;" align="right"><b>Country :</b></td>
	    <td>
<select style="font-size:12px;width:120px;height:20px;background-color:#DDFFBB;" name="Coutry" id="Coutry" onChange="ClickCoutry(this.value,<?php echo $EmployeeId.', '.$resDept['DepartmentId']; ?>)"> 
<?php if($_REQUEST['c']>0){ $sqlC=mysql_query("SELECT CountryName FROM hrm_country where CountryId=".$_REQUEST['c'], $con); $resC=mysql_fetch_array($sqlC); ?>
<option value="<?php echo $_REQUEST['c']; ?>"><?php echo ucwords(strtolower($resC['CountryName'])); ?></option><?php }else{ ?><option value="">SELECT</option><?php } ?>		
<?php $SqlCountry=mysql_query("SELECT * FROM hrm_country order by CountryName ASC", $con); while($ResCountry=mysql_fetch_array($SqlCountry)) { ?>
<option value="<?php echo $ResCountry['CountryId']; ?>"><?php echo ucwords(strtolower($ResCountry['CountryName'])); ?></option><?php } ?></select>
       </td>
	   <td>&nbsp;</td>
	   <td style="font-size:11px;height:18px;width:80px;color:#E6E6E6;" align="right"><b>State :</b></td>
	    <td>
		 <span id="StateSpan">
<select style="font-size:12px;width:180px;height:20px;background-color:#DDFFBB;" name="State" id="State" onChange="ClickState(this.value,<?php echo $EmployeeId; ?>)">
<?php if($_REQUEST['s']>0){  $sqlS=mysql_query("SELECT StateName FROM hrm_state where StateId=".$_REQUEST['s'], $con); $resS=mysql_fetch_array($sqlS); ?><option value="<?php echo $_REQUEST['s']; ?>"><?php echo ucwords(strtolower($resS['StateName'])); ?></option><?php }else{ ?><option value="">Select</option><?php } ?>
<?php if($resDept['DepartmentId']==7){ $sqlSt=mysql_query("select hrm_sales_ebillstate.StateId,StateName from hrm_sales_ebillstate INNER JOIN hrm_state ON hrm_sales_ebillstate.StateId=hrm_state.StateId where (EmployeeID=".$EmployeeId." OR EmployeeID2=".$EmployeeId." OR EmployeeID3=".$EmployeeId." OR EmployeeID4=".$EmployeeId.") order by StateName ASC", $con); }
	  elseif($EmployeeId==169 OR $EmployeeId==223){ $sqlSt=mysql_query("SELECT * FROM hrm_state order by StateName ASC", $con); } 
	  while($resSt=mysql_fetch_array($sqlSt)){ ?><option value="<?php echo $resSt['StateId']; ?>"><?php echo ucwords(strtolower($resSt['StateName'])); ?></option><?php } ?>
	  <?php if($EmployeeId==116){?><option value="16">MAHARASHTRA</option><?php } ?>
</select>
</span>
		</td>
		<td>&nbsp;</td>
		<td style="font-size:11px; height:18px;width:80px;color:#E6E6E6;" align="right"><b>HQ :</b></td>
	     <td>
		 <span id="HqSpan">
<select style="font-size:12px;width:120px;height:20px;background-color:#DDFFBB;" name="Hq" id="Hq" onChange="ClickHq(this.value)">
<?php if($_REQUEST['hq']>0){ $sqlhq=mysql_query("SELECT HqName FROM hrm_headquater where HqId=".$_REQUEST['hq'], $con); $reshq=mysql_fetch_array($sqlhq); ?>
<option value="<?php echo $_REQUEST['hq']; ?>"><?php echo ucwords(strtolower($reshq['HqName'])); ?></option><?php }else{ ?><option value="">Select</option><?php } ?>
<?php if($resDept['DepartmentId']==7){ $sqlHq=mysql_query("select HqId,HqName from hrm_headquater INNER JOIN hrm_sales_ebillstate ON hrm_headquater.StateId=hrm_sales_ebillstate.StateId where (hrm_sales_ebillstate.EmployeeID=".$EmployeeId." OR hrm_sales_ebillstate.EmployeeID2=".$EmployeeId." OR hrm_sales_ebillstate.EmployeeID3=".$EmployeeId." OR hrm_sales_ebillstate.EmployeeID4=".$EmployeeId.") order by HqName ASC", $con);}
	  elseif($EmployeeId==169 OR $EmployeeId==223){$sqlHq = mysql_query("SELECT * FROM hrm_headquater where CompanyId=".$CompanyId." AND HQStatus='A' order by HqName ASC", $con);}
	  while($resHq = mysql_fetch_array($sqlHq)){ ?><option value="<?php echo $resHq['HqId']; ?>"><?php echo ucwords(strtolower($resHq['HqName'])); ?></option><?php } ?>
</select>
		 </span>
		 </td>
		 <td>&nbsp;</td>
		 <td style="font-size:11px; height:18px;width:80px;color:#E6E6E6;" align="right"><b>Dealer :</b></td>
		 <td><input type="hidden" id="DealerId" value="" /><input type="hidden" id="TotAValueM" value="" /><input type="hidden" id="Sno" value="" />
		     <input type="hidden" name="q" id="q" value="<?php echo $_REQUEST['q']; ?>" /><input type="hidden" id="ii" value="<?php echo $_REQUEST['ii']; ?>" />
		  <span id="TabResult">
<select style="font-size:12px;width:250px;height:20px;background-color:#DDFFBB;" name="DealerD" id="DealerD" onChange="ClickDealer(this.value)" <?php if($_REQUEST['dil']==0){echo '';} ?>><?php if($_REQUEST['dil']>0){ $sqldil=mysql_query("SELECT DealerName,DealerCity FROM hrm_sales_dealer where DealerId=".$_REQUEST['dil'], $con); $resdil=mysql_fetch_array($sqldil); ?><option value="<?php echo $_REQUEST['dil']; ?>"><?php echo ucwords(strtolower($resdil['DealerName'].'-'.$resdil['DealerCity'])); ?></option><?php }else{ ?><option value="">Select</option><?php } ?>
<?php if($resDept['DepartmentId']==7){$sqlDe = mysql_query("SELECT DealerId,DealerName FROM hrm_sales_dealer INNER JOIN hrm_headquater ON hrm_sales_dealer.HqId=hrm_headquater.HqId INNER JOIN hrm_employee_state ON hrm_headquater.StateId=hrm_employee_state.StateId where hrm_employee_state.LOGISTICS_EId=".$EmployeeId." order by DealerName ASC", $con);}
      elseif($EmployeeId==169 OR $EmployeeId==223){$sqlDe = mysql_query("SELECT * FROM hrm_sales_dealer order by DealerName ASC", $con);} 
	  while($resDe = mysql_fetch_array($sqlDe)){ ?>
     <option value="<?php echo $resDe['DealerId']; ?>"><?php echo ucwords(strtolower($resDe['DealerName'])).'-'.ucwords(strtolower($res['DealerCity'])); ?></option><?php } ?></select>
	      </span>
		 </td>
	  </tr> 
	   </table>
      </td>
   </tr>
   <tr><td>&nbsp;</td></tr>
	 </table>
    </td>
   </tr>
      <tr>
    <td colspan="3">
<?php if($_REQUEST['dil']>0){ 
$BeforeYId=$_REQUEST['y']-1; $AfterYId=$_REQUEST['y']+1; 	
$sqlY1=mysql_query("select FromDate,ToDate from hrm_year where YearId=".$BeforeYId, $con); $resY1=mysql_fetch_assoc($sqlY1); 
$sqlY2=mysql_query("select FromDate,ToDate from hrm_year where YearId=".$_REQUEST['y'], $con); $resY2=mysql_fetch_assoc($sqlY2); 
$sqlY3=mysql_query("select FromDate,ToDate from hrm_year where YearId=".$AfterYId, $con); $resY3=mysql_fetch_assoc($sqlY3); 
$y1=date("y",strtotime($resY1['FromDate'])).'-'.date("y",strtotime($resY1['ToDate'])); $y1T='<font color="#A60053">Ach.</font>';
$y2=date("y",strtotime($resY2['FromDate'])).'-'.date("y",strtotime($resY2['ToDate'])); $y2T='<font color="#A60053">Tgt.</font>';
$y3=date("y",strtotime($resY3['FromDate'])).'-'.date("y",strtotime($resY3['ToDate'])); $y3T='<font color="#A60053">Proj.</font>';
?>	  
<table border="1" cellpadding="0" cellspacing="0" style="font-family:Times New Roman;font-size:14px;width:1200px;">	
  <tr style="background-color:#D5F1D1;color:#000000;">
    <td colspan="4" style="font-size:16px;color:#FFFF00;background-color:#183E83;">&nbsp;<b><?php echo ucfirst(strtolower($resdil['DealerName'])).'-<font color="#D7EBFF">'.$resdil['DealerCity'].'</font>'; ?></b></td>
<?php if($_REQUEST['q']==1){ ?><td colspan="3" align="center"><b>APRIL</b></td><td colspan="3" align="center"><b>MAY</b></td><td colspan="3" align="center"><b>JUNE</b></td>
<?php } elseif($_REQUEST['q']==2){ ?><td colspan="3" align="center"><b>JULY</b></td><td colspan="3" align="center"><b>AUGUST</b></td><td colspan="3" align="center"><b>SEPTEMBER</b></td>
<?php } elseif($_REQUEST['q']==3){ ?><td colspan="3" align="center"><b>OCTOBER</b></td><td colspan="3" align="center"><b>NOVEMBER</b></td><td colspan="3" align="center"><b>DECEMBER</b></td><?php } elseif($_REQUEST['q']==4){ ?><td colspan="3" align="center"><b>JANUARY</b></td><td colspan="3" align="center"><b>FEBRUARY</b></td><td colspan="3" align="center"><b>MARCH</b></td><?php } ?>
<td colspan="3" align="center"><b>TOTAL</b></td>
  </tr>	
   <tr style="background-color:#D5F1D1;color:#000000;">  
    <td align="center" style="width:150px;"><b>CROP</b></td>
	<td align="center" style="width:250px;"><b>VARIETY</b></td>
	<td align="center" style="width:50px;"><b>&nbsp;TYPE&nbsp;</b></td>
	<td align="center" style="width:50px;"><b>&nbsp;Edit&nbsp;</b></td>
<?php	/* <td align="center" style="width:50px;"><b>&nbsp;Submit&nbsp;</b></td> */ ?>

	<td class="Trh60"><?php echo $y1T.'<br>'.$y1; ?></td><td class="Trh60"><?php echo $y2T.'<br>'.$y2; ?></td><td class="Trh60"><?php echo $y3T.'<br>'.$y3; ?></td>
	<td class="Trh60"><?php echo $y1T.'<br>'.$y1; ?></td><td class="Trh60"><?php echo $y2T.'<br>'.$y2; ?></td><td class="Trh60"><?php echo $y3T.'<br>'.$y3; ?></td>
	<td class="Trh60"><?php echo $y1T.'<br>'.$y1; ?></td><td class="Trh60"><?php echo $y2T.'<br>'.$y2; ?></td><td class="Trh60"><?php echo $y3T.'<br>'.$y3; ?></td>
	<td class="Trh60"><?php echo $y1T.'<br>'.$y1; ?></td><td class="Trh60"><?php echo $y2T.'<br>'.$y2; ?></td><td class="Trh60"><?php echo $y3T.'<br>'.$y3; ?></td>
  </tr>	
<?php if($_REQUEST['ii']>0){$sql = mysql_query("select hrm_sales_seedsproduct.ItemId,ProductId,ProductName,ItemName,TypeName from hrm_sales_seedsproduct INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId INNER JOIN hrm_sales_seedtype ON hrm_sales_seedsproduct.TypeId=hrm_sales_seedtype.TypeId where hrm_sales_seedsitem.ItemId=".$_REQUEST['ii']." order by ItemName ASC, TypeName ASC, ProductName ASC", $con); }
      else
	  { if($_REQUEST['grp']==1 OR $_REQUEST['grp']==2){ $sql = mysql_query("select hrm_sales_seedsproduct.ItemId,ProductId,ProductName,ItemName,TypeName from hrm_sales_seedsproduct INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId INNER JOIN hrm_sales_seedtype ON hrm_sales_seedsproduct.TypeId=hrm_sales_seedtype.TypeId where hrm_sales_seedsitem.GroupId=".$_REQUEST['grp']." order by ItemName ASC, TypeName ASC, ProductName ASC", $con);} if($_REQUEST['grp']==3){$sql = mysql_query("select hrm_sales_seedsproduct.ItemId,ProductId,ProductName,ItemName,TypeName from hrm_sales_seedsproduct INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId INNER JOIN hrm_sales_seedtype ON hrm_sales_seedsproduct.TypeId=hrm_sales_seedtype.TypeId order by hrm_sales_seedsitem.GroupId ASC, ItemName ASC, TypeName ASC, ProductName ASC", $con);}
	  } $Sn=1; while($res=mysql_fetch_array($sql)){ 
$sqlP1d=mysql_query("select * from hrm_sales_sal_details_".$BeforeYId." where YearId=".$BeforeYId." AND ProductId=".$res['ProductId']." AND DealerId=".$_REQUEST['dil'], $con);
$sqlP2d=mysql_query("select * from hrm_sales_sal_details_".$_REQUEST['y']." where YearId=".$_REQUEST['y']." AND ProductId=".$res['ProductId']." AND DealerId=".$_REQUEST['dil'], $con); 
$sqlP3d=mysql_query("select * from hrm_sales_sal_details_".$AfterYId." where YearId=".$AfterYId." AND ProductId=".$res['ProductId']." AND DealerId=".$_REQUEST['dil'], $con);  
$resP1d=mysql_fetch_assoc($sqlP1d); $resP2d=mysql_fetch_assoc($sqlP2d); $resP3d=mysql_fetch_assoc($sqlP3d); $DeId=$_REQUEST['dil'];
?>	  
   <tr bgcolor="#EEEEEE" style="height:22px;"> 
     <td bgcolor="#FFFFFF">&nbsp;<?php echo $res['ItemName']; ?></td>	 
	 <td bgcolor="#FFFFFF">&nbsp;<?php echo $res['ProductName']; ?><input type="hidden" id="<?php echo $DeId; ?>P_<?php echo $Sn; ?>" value="<?php echo $res['ProductId']; ?>" /></td>
	 <td bgcolor="#FFFFFF" align="center">&nbsp;<?php echo substr_replace($res['TypeName'], '', 2); ?></td>
	 <td align="center" valign="middle" bgcolor="#FFFFFF">
	   <?php if($rowSubEmp==0){ //if($resP2['St_EmployeeID']==0 OR $resP2['St_EmployeeID']==1 OR $resP2['St_R1']==3){ ?>
<img src="images/edit.png" border="0" alt="Edit" id="<?php echo $_REQUEST['dil']; ?>EditBtn_<?php echo $Sn; ?>" onClick="editD(<?php echo $Sn.', '.$_REQUEST['q'].', '.$_REQUEST['dil']; ?>)" style="display:block;">
<img src="images/Floppy-Small-icon.png" border="0" alt="Save" id="<?php echo $_REQUEST['dil']; ?>SaveBtn_<?php echo $Sn; ?>" onClick="saveD(<?php echo $Sn.', '.$_REQUEST['y'].', '.$_REQUEST['dil'].', '.$_REQUEST['q'].', '.$res['ItemId']; ?>)" style="display:none;">
	   <?php } ?>
	</td>
<?php if($_REQUEST['q']==1){ ?>							 							 					 	 
<td id="<?php echo $DeId.'TM1_Ae'.$Sn; ?>">
<input class="Input" id="<?php echo $DeId; ?>M1_Ae<?php echo $Sn; ?>" value="<?php if($resP1d['M1_Ach']!='' AND $resP1d['M1_Ach']!=0){echo $resP1d['M1_Ach'];} ?>" readonly/></td>
<td id="<?php echo $DeId.'TM1_Be'.$Sn; ?>">
<input class="Input" id="<?php echo $DeId; ?>M1_Be<?php echo $Sn; ?>" value="<?php if($resP2d['M1']!='' AND $resP2d['M1']!=0){echo $resP2d['M1'];} ?>" readonly/></td>
<td id="<?php echo $DeId.'TM1_Ce'.$Sn; ?>">
<input class="Input" id="<?php echo $DeId; ?>M1_Ce<?php echo $Sn; ?>" value="<?php if($resP3d['M1']!='' AND $resP3d['M1']!=0){echo $resP3d['M1'];} ?>" readonly/></td>
<td id="<?php echo $DeId.'TM2_Ae'.$Sn; ?>">
<input class="Input" id="<?php echo $DeId; ?>M2_Ae<?php echo $Sn; ?>" value="<?php if($resP1d['M2_Ach']!='' AND $resP1d['M2_Ach']!=0){echo $resP1d['M2_Ach'];} ?>" readonly/></td>
<td id="<?php echo $DeId.'TM2_Be'.$Sn; ?>">
<input class="Input" id="<?php echo $DeId; ?>M2_Be<?php echo $Sn; ?>" value="<?php if($resP2d['M2']!='' AND $resP2d['M2']!=0){echo $resP2d['M2'];} ?>" readonly/></td>
<td id="<?php echo $DeId.'TM2_Ce'.$Sn; ?>">
<input class="Input" id="<?php echo $DeId; ?>M2_Ce<?php echo $Sn; ?>" value="<?php if($resP3d['M2']!='' AND $resP3d['M2']!=0){echo $resP3d['M2'];} ?>" readonly/></td>
<td id="<?php echo $DeId.'TM3_Ae'.$Sn; ?>">
<input class="Input" id="<?php echo $DeId; ?>M3_Ae<?php echo $Sn; ?>" value="<?php if($resP1d['M3_Ach']!='' AND $resP1d['M3_Ach']!=0){echo $resP1d['M3_Ach'];} ?>" readonly/></td>
<td id="<?php echo $DeId.'TM3_Be'.$Sn; ?>">
<input class="Input" id="<?php echo $DeId; ?>M3_Be<?php echo $Sn; ?>" value="<?php if($resP2d['M3']!='' AND $resP2d['M3']!=0){echo $resP2d['M3'];} ?>" readonly/></td>
<td id="<?php echo $DeId.'TM3_Ce'.$Sn; ?>">
<input class="Input" id="<?php echo $DeId; ?>M3_Ce<?php echo $Sn; ?>" value="<?php if($resP3d['M3']!='' AND $resP3d['M3']!=0){echo $resP3d['M3'];} ?>" readonly/></td>
<?php } elseif($_REQUEST['q']==2){ ?>	 
<td id="<?php echo $DeId.'TM4_Ae'.$Sn; ?>">
<input class="Input" id="<?php echo $DeId; ?>M4_Ae<?php echo $Sn; ?>" value="<?php if($resP1d['M4_Ach']!='' AND $resP1d['M4_Ach']!=0){echo $resP1d['M4_Ach'];} ?>" readonly/></td>
<td id="<?php echo $DeId.'TM4_Be'.$Sn; ?>">
<input class="Input" id="<?php echo $DeId; ?>M4_Be<?php echo $Sn; ?>" value="<?php if($resP2d['M4']!='' AND $resP2d['M4']!=0){echo $resP2d['M4'];} ?>" readonly/></td>
<td id="<?php echo $DeId.'TM4_Ce'.$Sn; ?>">
<input class="Input" id="<?php echo $DeId; ?>M4_Ce<?php echo $Sn; ?>" value="<?php if($resP3d['M4']!='' AND $resP3d['M4']!=0){echo $resP3d['M4'];} ?>" readonly/></td>
<td id="<?php echo $DeId.'TM5_Ae'.$Sn; ?>">
<input class="Input" id="<?php echo $DeId; ?>M5_Ae<?php echo $Sn; ?>" value="<?php if($resP1d['M5_Ach']!='' AND $resP1d['M5_Ach']!=0){echo $resP1d['M5_Ach'];} ?>" readonly/></td>
<td id="<?php echo $DeId.'TM5_Be'.$Sn; ?>">
<input class="Input" id="<?php echo $DeId; ?>M5_Be<?php echo $Sn; ?>" value="<?php if($resP2d['M5']!='' AND $resP2d['M5']!=0){echo $resP2d['M5'];} ?>" readonly/></td>
<td id="<?php echo $DeId.'TM5_Ce'.$Sn; ?>">
<input class="Input" id="<?php echo $DeId; ?>M5_Ce<?php echo $Sn; ?>" value="<?php if($resP3d['M5']!='' AND $resP3d['M5']!=0){echo $resP3d['M5'];} ?>" readonly/></td>
<td id="<?php echo $DeId.'TM6_Ae'.$Sn; ?>">
<input class="Input" id="<?php echo $DeId; ?>M6_Ae<?php echo $Sn; ?>" value="<?php if($resP1d['M6_Ach']!='' AND $resP1d['M6_Ach']!=0){echo $resP1d['M6_Ach'];} ?>" readonly/></td>
<td id="<?php echo $DeId.'TM6_Be'.$Sn; ?>">
<input class="Input" id="<?php echo $DeId; ?>M6_Be<?php echo $Sn; ?>" value="<?php if($resP2d['M6']!='' AND $resP2d['M6']!=0){echo $resP2d['M6'];} ?>" readonly/></td>
<td id="<?php echo $DeId.'TM6_Ce'.$Sn; ?>">
<input class="Input" id="<?php echo $DeId; ?>M6_Ce<?php echo $Sn; ?>" value="<?php if($resP3d['M6']!='' AND $resP3d['M6']!=0){echo $resP3d['M6'];} ?>" readonly/></td>
<?php } elseif($_REQUEST['q']==3){ ?>	 
<td id="<?php echo $DeId.'TM7_Ae'.$Sn; ?>">
<input class="Input" id="<?php echo $DeId; ?>M7_Ae<?php echo $Sn; ?>" value="<?php if($resP1d['M7_Ach']!='' AND $resP1d['M7_Ach']!=0){echo $resP1d['M7_Ach'];} ?>" readonly/></td>
<td id="<?php echo $DeId.'TM7_Be'.$Sn; ?>">
<input class="Input" id="<?php echo $DeId; ?>M7_Be<?php echo $Sn; ?>" value="<?php if($resP2d['M7']!='' AND $resP2d['M7']!=0){echo $resP2d['M7'];} ?>" readonly/></td>
<td id="<?php echo $DeId.'TM7_Ce'.$Sn; ?>">
<input class="Input" id="<?php echo $DeId; ?>M7_Ce<?php echo $Sn; ?>" value="<?php if($resP3d['M7']!='' AND $resP3d['M7']!=0){echo $resP3d['M7'];} ?>" readonly/></td>
<td id="<?php echo $DeId.'TM8_Ae'.$Sn; ?>">
<input class="Input" id="<?php echo $DeId; ?>M8_Ae<?php echo $Sn; ?>" value="<?php if($resP1d['M8_Ach']!='' AND $resP1d['M8_Ach']!=0){echo $resP1d['M8_Ach'];} ?>" readonly/></td>
<td id="<?php echo $DeId.'TM8_Be'.$Sn; ?>">
<input class="Input" id="<?php echo $DeId; ?>M8_Be<?php echo $Sn; ?>" value="<?php if($resP2d['M8']!='' AND $resP2d['M8']!=0){echo $resP2d['M8'];} ?>" readonly/></td>
<td id="<?php echo $DeId.'TM8_Ce'.$Sn; ?>">
<input class="Input" id="<?php echo $DeId; ?>M8_Ce<?php echo $Sn; ?>" value="<?php if($resP3d['M8']!='' AND $resP3d['M8']!=0){echo $resP3d['M8'];} ?>" readonly/></td>
<td id="<?php echo $DeId.'TM9_Ae'.$Sn; ?>">
<input class="Input" id="<?php echo $DeId; ?>M9_Ae<?php echo $Sn; ?>" value="<?php if($resP1d['M9_Ach']!='' AND $resP1d['M9_Ach']!=0){echo $resP1d['M9_Ach'];} ?>" readonly/></td>
<td id="<?php echo $DeId.'TM9_Be'.$Sn; ?>">
<input class="Input" id="<?php echo $DeId; ?>M9_Be<?php echo $Sn; ?>" value="<?php if($resP2d['M9']!='' AND $resP2d['M9']!=0){echo $resP2d['M9'];} ?>" readonly/></td>
<td id="<?php echo $DeId.'TM9_Ce'.$Sn; ?>">
<input class="Input" id="<?php echo $DeId; ?>M9_Ce<?php echo $Sn; ?>" value="<?php if($resP3d['M9']!='' AND $resP3d['M9']!=0){echo $resP3d['M9'];} ?>" readonly/></td>
<?php } elseif($_REQUEST['q']==4){ ?>	 
<td id="<?php echo $DeId.'TM10_Ae'.$Sn; ?>">
<input class="Input" id="<?php echo $DeId; ?>M10_Ae<?php echo $Sn; ?>" value="<?php if($resP1d['M10_Ach']!='' AND $resP1d['M10_Ach']!=0){echo $resP1d['M10_Ach'];} ?>" readonly/></td>
<td id="<?php echo $DeId.'TM10_Be'.$Sn; ?>">
<input class="Input" id="<?php echo $DeId; ?>M10_Be<?php echo $Sn; ?>" value="<?php if($resP2d['M10']!='' AND $resP2d['M10']!=0){echo $resP2d['M10'];} ?>" readonly/></td>
<td id="<?php echo $DeId.'TM10_Ce'.$Sn; ?>">
<input class="Input" id="<?php echo $DeId; ?>M10_Ce<?php echo $Sn; ?>" value="<?php if($resP3d['M10']!='' AND $resP3d['M10']!=0){echo $resP3d['M10'];} ?>" readonly/></td>
<td id="<?php echo $DeId.'TM11_Ae'.$Sn; ?>">
<input class="Input" id="<?php echo $DeId; ?>M11_Ae<?php echo $Sn; ?>" value="<?php if($resP1d['M11_Ach']!='' AND $resP1d['M11_Ach']!=0){echo $resP1d['M11_Ach'];} ?>" readonly/></td>
<td id="<?php echo $DeId.'TM11_Be'.$Sn; ?>">
<input class="Input" id="<?php echo $DeId; ?>M11_Be<?php echo $Sn; ?>" value="<?php if($resP2d['M11']!='' AND $resP2d['M11']!=0){echo $resP2d['M11'];} ?>" readonly/></td>
<td id="<?php echo $DeId.'TM11_Ce'.$Sn; ?>">
<input class="Input" id="<?php echo $DeId; ?>M11_Ce<?php echo $Sn; ?>" value="<?php if($resP3d['M11']!='' AND $resP3d['M11']!=0){echo $resP3d['M11'];} ?>" readonly/></td>
<td id="<?php echo $DeId.'TM12_Ae'.$Sn; ?>">
<input class="Input" id="<?php echo $DeId; ?>M12_Ae<?php echo $Sn; ?>" value="<?php if($resP1d['M12_Ach']!='' AND $resP1d['M12_Ach']!=0){echo $resP1d['M12_Ach'];} ?>" readonly/></td>
<td id="<?php echo $DeId.'TM12_Be'.$Sn; ?>">
<input class="Input" id="<?php echo $DeId; ?>M12_Be<?php echo $Sn; ?>" value="<?php if($resP2d['M12']!='' AND $resP2d['M12']!=0){echo $resP2d['M12'];} ?>" readonly/></td>
<td id="<?php echo $DeId.'TM12_Ce'.$Sn; ?>">
<input class="Input" id="<?php echo $DeId; ?>M12_Ce<?php echo $Sn; ?>" value="<?php if($resP3d['M12']!='' AND $resP3d['M12']!=0){echo $resP3d['M12'];} ?>" readonly/></td>
<?php } ?>	 
<?php 
if($_REQUEST['q']==1){$TotP1d=$resP1d['M1_Ach']+$resP1d['M2_Ach']+$resP1d['M3_Ach']; $TotP2d=$resP2d['M1']+$resP2d['M2']+$resP2d['M3']; $TotP3d=$resP3d['M1']+$resP3d['M2']+$resP3d['M3'];}elseif($_REQUEST['q']==2){$TotP1d=$resP1d['M4_Ach']+$resP1d['M5_Ach']+$resP1d['M6_Ach']; $TotP2d=$resP2d['M4']+$resP2d['M5']+$resP2d['M6']; $TotP3d=$resP3d['M4']+$resP3d['M5']+$resP3d['M6'];}elseif($_REQUEST['q']==3){$TotP1d=$resP1d['M7_Ach']+$resP1d['M8_Ach']+$resP1d['M9_Ach']; $TotP2d=$resP2d['M7']+$resP2d['M8']+$resP2d['M9']; $TotP3d=$resP3d['M7']+$resP3d['M8']+$resP3d['M9'];}elseif($_REQUEST['q']==4){ $TotP1d=$resP1d['M10_Ach']+$resP1d['M11_Ach']+$resP1d['M12_Ach']; $TotP2d=$resP2d['M10']+$resP2d['M11']+$resP2d['M12'];$TotP3d=$resP3d['M10']+$resP3d['M11']+$resP3d['M12'];} 
?>	 
<td id="<?php echo $DeId.'TTotP1d_'.$Sn; ?>"><input class="InputB" id="<?php echo $DeId; ?>TotP1d_<?php echo $Sn; ?>" value="<?php if($TotP1d!=0 AND $TotP1d!=''){echo $TotP1d;}else{echo '';} ?>" readonly/></td>
<td id="<?php echo $DeId.'TTotP2d_'.$Sn; ?>"><input class="InputB" id="<?php echo $DeId; ?>TotP2d_<?php echo $Sn; ?>" value="<?php if($TotP2d!=0 AND $TotP2d!=''){echo $TotP2d;}else{echo '';} ?>" readonly/></td>
<td id="<?php echo $DeId.'TTotP3d_'.$Sn; ?>"><input class="InputB" id="<?php echo $DeId; ?>TotP3d_<?php echo $Sn; ?>" value="<?php if($TotP3d!=0 AND $TotP3d!=''){echo $TotP3d;}else{echo '';} ?>" readonly/></td>	
  </tr>	
<?php $Sn++; }  ?>   
<?php if($_REQUEST['ii']>0){$sqlP1td=mysql_query("select SUM(M1_Ach) as tsM1,SUM(M2_Ach) as tsM2,SUM(M3_Ach) as tsM3,SUM(M4_Ach) as tsM4,SUM(M5_Ach) as tsM5,SUM(M6_Ach) as tsM6,SUM(M7_Ach) as tsM7,SUM(M8_Ach) as tsM8,SUM(M9_Ach) as tsM9,SUM(M10_Ach) as tsM10,SUM(M11_Ach) as tsM11,SUM(M12_Ach) as tsM12 from hrm_sales_sal_details_".$BeforeYId." where DealerId=".$_REQUEST['dil']." AND ItemId=".$_REQUEST['ii']." AND YearId=".$BeforeYId, $con); $sqlP2td=mysql_query("select SUM(M1) as tsM1,SUM(M2) as tsM2,SUM(M3) as tsM3,SUM(M4) as tsM4,SUM(M5) as tsM5,SUM(M6) as tsM6,SUM(M7) as tsM7,SUM(M8) as tsM8,SUM(M9) as tsM9,SUM(M10) as tsM10,SUM(M10) as tsM10,SUM(M11) as tsM11,SUM(M12) as tsM12 from hrm_sales_sal_details_".$_REQUEST['y']." where DealerId=".$_REQUEST['dil']." AND ItemId=".$_REQUEST['ii']." AND YearId=".$_REQUEST['y'], $con); $sqlP3td=mysql_query("select SUM(M1) as tsM1,SUM(M2) as tsM2,SUM(M3) as tsM3,SUM(M4) as tsM4,SUM(M5) as tsM5,SUM(M6) as tsM6,SUM(M7) as tsM7,SUM(M8) as tsM8,SUM(M9) as tsM9,SUM(M10) as tsM10,SUM(M10) as tsM10,SUM(M11) as tsM11,SUM(M12) as tsM12 from hrm_sales_sal_details_".$AfterYId." where DealerId=".$_REQUEST['dil']." AND ItemId=".$_REQUEST['ii']." AND YearId=".$AfterYId, $con); }
else
{ if($_REQUEST['grp']==1 OR $_REQUEST['grp']==2){ $sqlP1td=mysql_query("select SUM(M1_Ach) as tsM1,SUM(M2_Ach) as tsM2,SUM(M3_Ach) as tsM3,SUM(M4_Ach) as tsM4,SUM(M5_Ach) as tsM5,SUM(M6_Ach) as tsM6,SUM(M7_Ach) as tsM7,SUM(M8_Ach) as tsM8,SUM(M9_Ach) as tsM9,SUM(M10_Ach) as tsM10,SUM(M11_Ach) as tsM11,SUM(M12_Ach) as tsM12 from hrm_sales_sal_details_".$BeforeYId." INNER JOIN hrm_sales_seedsitem ON hrm_sales_sal_details_".$BeforeYId.".ItemId=hrm_sales_seedsitem.ItemId where hrm_sales_sal_details_".$BeforeYId.".DealerId=".$_REQUEST['dil']." AND hrm_sales_seedsitem.GroupId=".$_REQUEST['grp']." AND hrm_sales_sal_details_".$BeforeYId.".YearId=".$BeforeYId, $con); 
$sqlP2td=mysql_query("select SUM(M1) as tsM1,SUM(M2) as tsM2,SUM(M3) as tsM3,SUM(M4) as tsM4,SUM(M5) as tsM5,SUM(M6) as tsM6,SUM(M7) as tsM7,SUM(M8) as tsM8,SUM(M9) as tsM9,SUM(M10) as tsM10,SUM(M10) as tsM10,SUM(M11) as tsM11,SUM(M12) as tsM12 from hrm_sales_sal_details_".$_REQUEST['y']." INNER JOIN hrm_sales_seedsitem ON hrm_sales_sal_details_".$_REQUEST['y'].".ItemId=hrm_sales_seedsitem.ItemId where hrm_sales_sal_details_".$_REQUEST['y'].".DealerId=".$_REQUEST['dil']." AND hrm_sales_seedsitem.GroupId=".$_REQUEST['grp']." AND hrm_sales_sal_details_".$_REQUEST['y'].".YearId=".$_REQUEST['y'], $con); 
$sqlP3td=mysql_query("select SUM(M1) as tsM1,SUM(M2) as tsM2,SUM(M3) as tsM3,SUM(M4) as tsM4,SUM(M5) as tsM5,SUM(M6) as tsM6,SUM(M7) as tsM7,SUM(M8) as tsM8,SUM(M9) as tsM9,SUM(M10) as tsM10,SUM(M10) as tsM10,SUM(M11) as tsM11,SUM(M12) as tsM12 from hrm_sales_sal_details_".$AfterYId." INNER JOIN hrm_sales_seedsitem ON hrm_sales_sal_details_".$AfterYId.".ItemId=hrm_sales_seedsitem.ItemId where hrm_sales_sal_details_".$AfterYId.".DealerId=".$_REQUEST['dil']." AND hrm_sales_seedsitem.GroupId=".$_REQUEST['grp']." AND hrm_sales_sal_details_".$AfterYId.".YearId=".$AfterYId, $con); }

if($_REQUEST['grp']==3){ $sqlP1td=mysql_query("select SUM(M1_Ach) as tsM1,SUM(M2_Ach) as tsM2,SUM(M3_Ach) as tsM3,SUM(M4_Ach) as tsM4,SUM(M5_Ach) as tsM5,SUM(M6_Ach) as tsM6,SUM(M7_Ach) as tsM7,SUM(M8_Ach) as tsM8,SUM(M9_Ach) as tsM9,SUM(M10_Ach) as tsM10,SUM(M11_Ach) as tsM11,SUM(M12_Ach) as tsM12 from hrm_sales_sal_details_".$BeforeYId." INNER JOIN hrm_sales_seedsitem ON hrm_sales_sal_details_".$BeforeYId.".ItemId=hrm_sales_seedsitem.ItemId where hrm_sales_sal_details_".$BeforeYId.".DealerId=".$_REQUEST['dil']." AND hrm_sales_sal_details_".$BeforeYId.".YearId=".$BeforeYId, $con); 
$sqlP2td=mysql_query("select SUM(M1) as tsM1,SUM(M2) as tsM2,SUM(M3) as tsM3,SUM(M4) as tsM4,SUM(M5) as tsM5,SUM(M6) as tsM6,SUM(M7) as tsM7,SUM(M8) as tsM8,SUM(M9) as tsM9,SUM(M10) as tsM10,SUM(M10) as tsM10,SUM(M11) as tsM11,SUM(M12) as tsM12 from hrm_sales_sal_details_".$_REQUEST['y']." INNER JOIN hrm_sales_seedsitem ON hrm_sales_sal_details_".$_REQUEST['y'].".ItemId=hrm_sales_seedsitem.ItemId where hrm_sales_sal_details_".$_REQUEST['y'].".DealerId=".$_REQUEST['dil']." AND hrm_sales_sal_details_".$_REQUEST['y'].".YearId=".$_REQUEST['y'], $con); 
$sqlP3td=mysql_query("select SUM(M1) as tsM1,SUM(M2) as tsM2,SUM(M3) as tsM3,SUM(M4) as tsM4,SUM(M5) as tsM5,SUM(M6) as tsM6,SUM(M7) as tsM7,SUM(M8) as tsM8,SUM(M9) as tsM9,SUM(M10) as tsM10,SUM(M10) as tsM10,SUM(M11) as tsM11,SUM(M12) as tsM12 from hrm_sales_sal_details_".$AfterYId." INNER JOIN hrm_sales_seedsitem ON hrm_sales_sal_details_".$AfterYId.".ItemId=hrm_sales_seedsitem.ItemId where hrm_sales_sal_details_".$AfterYId.".DealerId=".$_REQUEST['dil']." AND hrm_sales_sal_details_".$AfterYId.".YearId=".$AfterYId, $con); }
}
$resP1td=mysql_fetch_assoc($sqlP1td); $resP2td=mysql_fetch_assoc($sqlP2td); $resP3td=mysql_fetch_assoc($sqlP3td);
?>
   <tr style="font-size:14px;color:#000000;background-color:#FFFFA6;height:24px;">
	  <td colspan="4" align="right" style="font-size:16px;"><b>TOTAL:&nbsp;</b></td>
<?php if($_REQUEST['q']==1){ ?>	
     <td><input class="TInput" id="<?php echo $DeId; ?>M1_AeT" value="<?php if($resP1td['tsM1']>0){echo $resP1td['tsM1'];} ?>" readonly/></td>
	 <td><input class="TInput" id="<?php echo $DeId; ?>M1_BeT" value="<?php if($resP2td['tsM1']>0){echo $resP2td['tsM1'];} ?>" /></td>
	 <td><input class="TInput" id="<?php echo $DeId; ?>M1_CeT" value="<?php if($resP3td['tsM1']>0){echo $resP3td['tsM1'];} ?>" readonly/></td>
	 <td><input class="TInput" id="<?php echo $DeId; ?>M2_AeT" value="<?php if($resP1td['tsM2']>0){echo $resP1td['tsM2'];} ?>" readonly/></td>
	 <td><input class="TInput" id="<?php echo $DeId; ?>M2_BeT" value="<?php if($resP2td['tsM2']>0){echo $resP2td['tsM2'];} ?>" readonly/></td>
	 <td><input class="TInput" id="<?php echo $DeId; ?>M2_CeT" value="<?php if($resP3td['tsM2']>0){echo $resP3td['tsM2'];} ?>" readonly/></td>
	 <td><input class="TInput" id="<?php echo $DeId; ?>M3_AeT" value="<?php if($resP1td['tsM3']>0){echo $resP1td['tsM3'];} ?>" readonly/></td>
	 <td><input class="TInput" id="<?php echo $DeId; ?>M3_BeT" value="<?php if($resP2td['tsM3']>0){echo $resP2td['tsM3'];} ?>" readonly/></td>
	 <td><input class="TInput" id="<?php echo $DeId; ?>M3_CeT" value="<?php if($resP3td['tsM3']>0){echo $resP3td['tsM3'];} ?>" readonly/></td>						 							
<?php } elseif($_REQUEST['q']==2){ ?>
     <td><input class="TInput" id="<?php echo $DeId; ?>M4_AeT" value="<?php if($resP1td['tsM4']>0){echo $resP1td['tsM4'];} ?>" readonly/></td>
	 <td><input class="TInput" id="<?php echo $DeId; ?>M4_BeT" value="<?php if($resP2td['tsM4']>0){echo $resP2td['tsM4'];} ?>" readonly/></td>
	 <td><input class="TInput" id="<?php echo $DeId; ?>M4_CeT" value="<?php if($resP3td['tsM4']>0){echo $resP3td['tsM4'];} ?>" readonly/></td>
	 <td><input class="TInput" id="<?php echo $DeId; ?>M5_AeT" value="<?php if($resP1td['tsM5']>0){echo $resP1td['tsM5'];} ?>" readonly/></td>
	 <td><input class="TInput" id="<?php echo $DeId; ?>M5_BeT" value="<?php if($resP2td['tsM5']>0){echo $resP2td['tsM5'];} ?>" readonly/></td>
	 <td><input class="TInput" id="<?php echo $DeId; ?>M5_CeT" value="<?php if($resP3td['tsM5']>0){echo $resP3td['tsM5'];} ?>" readonly/></td>
	 <td><input class="TInput" id="<?php echo $DeId; ?>M6_AeT" value="<?php if($resP1td['tsM6']>0){echo $resP1td['tsM6'];} ?>" readonly/></td>
	 <td><input class="TInput" id="<?php echo $DeId; ?>M6_BeT" value="<?php if($resP2td['tsM6']>0){echo $resP2td['tsM6'];} ?>" readonly/></td>
	 <td><input class="TInput" id="<?php echo $DeId; ?>M6_CeT" value="<?php if($resP3td['tsM6']>0){echo $resP3td['tsM6'];} ?>" readonly/></td>		
<?php } elseif($_REQUEST['q']==3){ ?>
     <td><input class="TInput" id="<?php echo $DeId; ?>M7_AeT" value="<?php if($resP1td['tsM7']>0){echo $resP1td['tsM7'];} ?>" readonly/></td>
	 <td><input class="TInput" id="<?php echo $DeId; ?>M7_BeT" value="<?php if($resP2td['tsM7']>0){echo $resP2td['tsM7'];} ?>" readonly/></td>
	 <td><input class="TInput" id="<?php echo $DeId; ?>M7_CeT" value="<?php if($resP3td['tsM7']>0){echo $resP3td['tsM7'];} ?>" readonly/></td>
	 <td><input class="TInput" id="<?php echo $DeId; ?>M8_AeT" value="<?php if($resP1td['tsM8']>0){echo $resP1td['tsM8'];} ?>" readonly/></td>
	 <td><input class="TInput" id="<?php echo $DeId; ?>M8_BeT" value="<?php if($resP2td['tsM8']>0){echo $resP2td['tsM8'];} ?>" readonly/></td>
	 <td><input class="TInput" id="<?php echo $DeId; ?>M8_CeT" value="<?php if($resP3td['tsM8']>0){echo $resP3td['tsM8'];} ?>" readonly/></td>
	 <td><input class="TInput" id="<?php echo $DeId; ?>M9_AeT" value="<?php if($resP1td['tsM9']>0){echo $resP1td['tsM9'];} ?>" readonly/></td>
	 <td><input class="TInput" id="<?php echo $DeId; ?>M9_BeT" value="<?php if($resP2td['tsM9']>0){echo $resP2td['tsM9'];} ?>" readonly/></td>
	 <td><input class="TInput" id="<?php echo $DeId; ?>M9_CeT" value="<?php if($resP3td['tsM9']>0){echo $resP3td['tsM9'];} ?>" readonly/></td>		
<?php } elseif($_REQUEST['q']==4){ ?>
     <td><input class="TInput" id="<?php echo $DeId; ?>M10_AeT" value="<?php if($resP1td['tsM10']>0){echo $resP1td['tsM10'];} ?>" readonly/></td>
	 <td><input class="TInput" id="<?php echo $DeId; ?>M10_BeT" value="<?php if($resP2td['tsM10']>0){echo $resP2td['tsM10'];} ?>" readonly/></td>
	 <td><input class="TInput" id="<?php echo $DeId; ?>M10_CeT" value="<?php if($resP3td['tsM10']>0){echo $resP3td['tsM10'];} ?>" readonly/></td>
	 <td><input class="TInput" id="<?php echo $DeId; ?>M11_AeT" value="<?php if($resP1td['tsM11']>0){echo $resP1td['tsM11'];} ?>" readonly/></td>
	 <td><input class="TInput" id="<?php echo $DeId; ?>M11_BeT" value="<?php if($resP2td['tsM11']>0){echo $resP2td['tsM11'];} ?>" readonly/></td>
	 <td><input class="TInput" id="<?php echo $DeId; ?>M11_CeT" value="<?php if($resP3td['tsM11']>0){echo $resP3td['tsM11'];} ?>" readonly/></td>
	 <td><input class="TInput" id="<?php echo $DeId; ?>M12_AeT" value="<?php if($resP1td['tsM12']>0){echo $resP1td['tsM12'];} ?>" readonly/></td>
	 <td><input class="TInput" id="<?php echo $DeId; ?>M12_BeT" value="<?php if($resP2td['tsM12']>0){echo $resP2td['tsM12'];} ?>" readonly/></td>
	 <td><input class="TInput" id="<?php echo $DeId; ?>M12_CeT" value="<?php if($resP3td['tsM12']>0){echo $resP3td['tsM12'];} ?>" readonly/></td>		
<?php } ?>	
<?php 
if($_REQUEST['q']==1){ $TotP1td=$resP1td['tsM1']+$resP1td['tsM2']+$resP1td['tsM3']; $TotP2td=$resP2td['tsM1']+$resP2td['tsM2']+$resP2td['tsM3']; $TotP3td=$resP3td['tsM1']+$resP3td['tsM2']+$resP3td['tsM3'];}elseif($_REQUEST['q']==2){ $TotP1td=$resP1td['tsM4']+$resP1td['tsM5']+$resP1td['tsM6']; $TotP2td=$resP2td['tsM4']+$resP2td['tsM5']+$resP2td['tsM6']; $TotP3td=$resP3td['tsM4']+$resP3td['tsM5']+$resP3td['tsM6'];}elseif($_REQUEST['q']==3){ $TotP1td=$resP1td['tsM7']+$resP1td['tsM8']+$resP1td['tsM9']; $TotP2td=$resP2td['tsM7']+$resP2td['tsM8']+$resP2td['tsM9']; $TotP3td=$resP3td['tsM7']+$resP3td['tsM8']+$resP3td['tsM9'];}elseif($_REQUEST['q']==4){ $TotP1td=$resP1td['tsM10']+$resP1td['tsM11']+$resP1td['tsM12']; $TotP2td=$resP2td['tsM10']+$resP2td['tsM11']+$resP2td['tsM12']; $TotP3td=$resP3td['tsM10']+$resP3td['tsM11']+$resP3td['tsM12'];} ?>
      <td><input class="TInput" id="<?php echo $DeId; ?>TotM_AeT" value="<?php if($TotP1td!=0 AND $TotP1td!=''){echo $TotP1td;}else{echo '';} ?>" readonly/></td>
	  <td><input class="TInput" id="<?php echo $DeId; ?>TotM_BeT" value="<?php if($TotP2td!=0 AND $TotP2td!=''){echo $TotP2td;}else{echo '';} ?>" readonly/></td>
	  <td><input class="TInput" id="<?php echo $DeId; ?>TotM_CeT" value="<?php if($TotP3td!=0 AND $TotP3td!=''){echo $TotP3td;}else{echo '';} ?>" readonly/></td>
  </tr>	 
</table>	       
<?php } ?>
    </td>
   </tr> 
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
		
<?php //************************************************************************************************************************************************************?>
<?php //**********************************************END*****END*****END******END******END***************************************************************?>
<?php //************************************************************************************************************************************************************?>
		
	  </td>
	</tr>
  </table>
 </td>
</tr>
</table>
</body>
</html>

</html>
