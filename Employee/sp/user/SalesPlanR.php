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
.InputB{font-size:12px;width:65px;text-align:right;border:0px;font-weight:bold;background-color:#D9D9FF;} 
.Input{font-size:12px;width:60px;text-align:right;border:0px;background-color:#EEEEEE;}
.TInput{font-size:12px;width:60px;text-align:right;border:0px;background-color:#FFFFA6;font-weight:bold;}
.Th60{text-align:center;width:60px;font-weight:bold;font-size:12px;} .Th80{text-align:center;width:80px;font-weight:bold;font-size:12px;}
.Th40{text-align:center;width:40px;font-weight:bold;font-size:12px;} .Tr60{text-align:center;width:60px;font-weight:bold;font-size:12px;}
.Th50{text-align:center;width:50px;font-weight:bold;font-size:12px;} .Td60{text-align:right;width:60px;font-size:12px;} 
.ChkImg{width:20px;hieght:20px;}
.inner_table { height:300px;overflow-y:auto;width:auto; }
</style>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<Script type="text/javascript">window.history.forward(1);</Script>
<Script language="javascript">
function ClickCoutry(value)
{ var url = 'SlctSalesCouStaCit.php';	var pars = 'CouId='+value;	var myAjax = new Ajax.Request(
  url, { method: 'post', parameters: pars, onComplete: show_State });
}
function show_State(originalRequest)
{ document.getElementById('StateSpan').innerHTML = originalRequest.responseText; }

function ClickState(value)
{ var CId=document.getElementById('ComId').value; var url = 'SlctSalesCouStaCit.php';	var pars = 'AchiveStaId='+value+'&CId='+CId;	var myAjax = new Ajax.Request(
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
  var Coutry=document.getElementById("Coutry").value; var State=document.getElementById("State").value; //var QtrV=document.getElementById("QtrV").value;
  var Hq=document.getElementById("Hq").value; var DealerD=document.getElementById("DealerD").value; var ci=document.getElementById("ComId").value;
  var Q1=document.getElementById("Q1").value; var Q2=document.getElementById("Q2").value; var Q3=document.getElementById("Q3").value; var Q4=document.getElementById("Q4").value;
  window.location="SalesPlanR.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y="+YearV+"&ci="+ci+"&c="+Coutry+"&s="+State+"&hq="+Hq+"&dil="+di+"&grp="+CropGrp+"&ii="+ii+"&Qq1="+Q1+"&Qq2="+Q2+"&Qq3="+Q3+"&Qq4="+Q4; 
  var ActSn=document.getElementById("ActSn").value; 
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
function FunDTotal(v)
{ var D=parseFloat(v); var TotD=parseFloat(document.getElementById("TotVal_D").value);
  document.getElementById("TotVal_D").value=Math.round((D+TotD)*10000)/10000; 
}
function FunETotal(v)
{ var E=parseFloat(v); var TotE=parseFloat(document.getElementById("TotVal_E").value);
  document.getElementById("TotVal_E").value=Math.round((E+TotE)*10000)/10000; 
}

function ChangrYear(YearV)
{
  var di=document.getElementById("DealerD").value; var CropGrp=document.getElementById("CropGrp").value; var ii=document.getElementById("ItemV").value;
  var Coutry=document.getElementById("Coutry").value; var State=document.getElementById("State").value; //var QtrV=document.getElementById("QtrV").value;
  var Hq=document.getElementById("Hq").value; var DealerD=document.getElementById("DealerD").value; var ci=document.getElementById("ComId").value;
  var Q1=document.getElementById("Q1").value; var Q2=document.getElementById("Q2").value; var Q3=document.getElementById("Q3").value; var Q4=document.getElementById("Q4").value;
  window.location="SalesPlanR.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y="+YearV+"&ci="+ci+"&c="+Coutry+"&s="+State+"&hq="+Hq+"&dil="+di+"&grp="+CropGrp+"&ii="+ii+"&Qq1="+Q1+"&Qq2="+Q2+"&Qq3="+Q3+"&Qq4="+Q4; 
}
function ClickGrp(CropGrp)
{
  var di=document.getElementById("DealerD").value; var YearV=document.getElementById("YearV").value; var ii=0;
  var Coutry=document.getElementById("Coutry").value; var State=document.getElementById("State").value; //var QtrV=document.getElementById("QtrV").value;
  var Hq=document.getElementById("Hq").value; var DealerD=document.getElementById("DealerD").value; var ci=document.getElementById("ComId").value;
  var Q1=document.getElementById("Q1").value; var Q2=document.getElementById("Q2").value; var Q3=document.getElementById("Q3").value; var Q4=document.getElementById("Q4").value;
  window.location="SalesPlanR.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y="+YearV+"&ci="+ci+"&c="+Coutry+"&s="+State+"&hq="+Hq+"&dil="+di+"&grp="+CropGrp+"&ii="+ii+"&Qq1="+Q1+"&Qq2="+Q2+"&Qq3="+Q3+"&Qq4="+Q4; 
}
function ChangeII(ii)
{
  var di=document.getElementById("DealerD").value; var YearV=document.getElementById("YearV").value; var CropGrp=document.getElementById("CropGrp").value;
  var Coutry=document.getElementById("Coutry").value; var State=document.getElementById("State").value; //var QtrV=document.getElementById("QtrV").value;
  var Hq=document.getElementById("Hq").value; var DealerD=document.getElementById("DealerD").value; var ci=document.getElementById("ComId").value;
  var Q1=document.getElementById("Q1").value; var Q2=document.getElementById("Q2").value; var Q3=document.getElementById("Q3").value; var Q4=document.getElementById("Q4").value;
  window.location="SalesPlanR.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y="+YearV+"&ci="+ci+"&c="+Coutry+"&s="+State+"&hq="+Hq+"&dil="+di+"&grp="+CropGrp+"&ii="+ii+"&Qq1="+Q1+"&Qq2="+Q2+"&Qq3="+Q3+"&Qq4="+Q4; 
}

function PrintSpR()
{ var di=document.getElementById("DealerD").value; var YearV=document.getElementById("YearV").value; var CropGrp=document.getElementById("CropGrp").value;
  var Coutry=document.getElementById("Coutry").value; var State=document.getElementById("State").value; //var QtrV=document.getElementById("QtrV").value;
  var Hq=document.getElementById("Hq").value; var DealerD=document.getElementById("DealerD").value; var ci=document.getElementById("ComId").value;
  var ii=document.getElementById("ItemV").value;  
  window.open("SalesPlanRPrint.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y="+YearV+"&ci="+ci+"&c="+Coutry+"&s="+State+"&hq="+Hq+"&dil="+di+"&grp="+CropGrp+"&ii="+ii,"PrintForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=100,height=100");
}


function FunClckQ(v)
{
if(document.getElementById("Qq"+v).checked==true){document.getElementById("Q"+v).value=1;}
else if(document.getElementById("Qq"+v).checked==false){document.getElementById("Q"+v).value=0;}
}


function ExportDealerPlan(y,g,i,d)
{ var ComId=document.getElementById("ComId").value; var YId=document.getElementById("YId").value; 
  window.open("ReportCSVSalesPlanR.php?action=PlanRExport&c="+ComId+"&y="+y+"&g="+g+"&i="+i+"&d="+d+"&YId="+y,"PrintForm","menubar=yes,scrollbars=yes,resizable=no,directories=no,width=20,height=20"); } 

</Script>
</head>
<body class="body">
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
	  <td valign="top" width="100%" id="MainWindow"><br>
<?php //**********************************************************************************?>
<?php //*****************START*****START*****START******START******START****************************?>
<?php //*******************************************************************************?>
<input type="hidden" id="ComId" value="<?php echo $_REQUEST['ci']; ?>" />
<input type="hidden" id="UserId" value="<?php echo $UserId; ?>" />
<input type="hidden" id="YId" value="<?php echo $YearId; ?>" />			  
<table border="0" style="margin-top:0px; width:100%; height:150px;">	
<tr>
 <td valign="top">
  <table border="0">
   <tr>
    <td id="Entry" style="width:1200px;" valign="top">
	<span id="TabEntry">
     <table border="0">
      <tr>
	    <td style="margin-top:0px;width:100px;" class="heading" align="center"><u>Reports</u></td>
	    <td style="font-size:11px;height:18px;width:90px;color:#E6E6E6;" align="right"><b>Year :</b></td>
	    <td><select style="font-size:12px;width:120px;height:20px;background-color:#DDFFBB;" name="YearV" id="YearV" onChange="ChangrYear(this.value)"> 
<?php $sqly=mysql_query("select FromDate,ToDate from hrm_year where YearId=".$_REQUEST['y'], $con); $resy=mysql_fetch_assoc($sqly); 
      $fromdate=date("Y",strtotime($resy['FromDate'])); $todate=date("Y",strtotime($resy['ToDate'])); 
	  $NextYear=$_REQUEST['y']+1; $PrevYear=$_REQUEST['y']-1; 
	  $sqly2=mysql_query("select FromDate,ToDate from hrm_year where YearId=".$NextYear, $con); $resy2=mysql_fetch_assoc($sqly2);
	  $sqly3=mysql_query("select FromDate,ToDate from hrm_year where YearId=".$PrevYear, $con); $resy3=mysql_fetch_assoc($sqly3); ?>		
 <option value="<?php echo $_REQUEST['y']; ?>" selected><?php echo $fromdate.'-'.$todate; ?></option>
 <?php if($PrevYear>=1){?><option value="<?php echo $PrevYear; ?>"><?php echo date("Y",strtotime($resy3['FromDate'])).'-'.date("Y",strtotime($resy3['ToDate'])); ?></option><?php } ?><option value="<?php echo $NextYear; ?>"><?php echo date("Y",strtotime($resy2['FromDate'])).'-'.date("Y",strtotime($resy2['ToDate'])); ?></option></select>
       </td>
	   <td style="font-size:11px;height:18px;width:80px;color:#E6E6E6;" align="right"><b>Crop :</b></td>
	    <td>
		 <select style="font-size:12px;width:180px;height:20px;background-color:#DDFFBB;" name="CropGrp" id="CropGrp" onChange="ClickGrp(this.value)">
<option value="1" <?php if($_REQUEST['grp']==1){echo 'selected';}?>>Vegitable Crop</option>
		 <option value="2" <?php if($_REQUEST['grp']==2){echo 'selected';}?>>Field Crop</option>
		 <?php /*?><option value="3" <?php if($_REQUEST['grp']==3){echo 'selected';}?>>All Crop</option><?php */?>
        </select>
		</td>
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
	     <td colspan="3" style="font-size:11px;height:18px;width:200px;color:#E6E6E6;">&nbsp;&nbsp;&nbsp; 
		 <input type="hidden" id="Q1" value="<?php echo $_REQUEST['Qq1']; ?>" /><input type="hidden" id="Q2" value="<?php echo $_REQUEST['Qq2']; ?>" />
		 <input type="hidden" id="Q3" value="<?php echo $_REQUEST['Qq3']; ?>" /><input type="hidden" id="Q4" value="<?php echo $_REQUEST['Qq4']; ?>" />
		 
		 <?php /*
		 <input type="checkbox" id="Qq1" <?php if($_REQUEST['Qq1']>0){echo 'checked';} ?> onClick="FunClckQ(1)" />&nbsp;<b>Q1</b>&nbsp;&nbsp;
		 <input type="checkbox" id="Qq2" <?php if($_REQUEST['Qq2']>0){echo 'checked';} ?> onClick="FunClckQ(2)" />&nbsp;<b>Q2</b>&nbsp;&nbsp;
		 <input type="checkbox" id="Qq3" <?php if($_REQUEST['Qq3']>0){echo 'checked';} ?> onClick="FunClckQ(3)" />&nbsp;<b>Q3</b>&nbsp;&nbsp;
		 <input type="checkbox" id="Qq4" <?php if($_REQUEST['Qq4']>0){echo 'checked';} ?> onClick="FunClckQ(4)" />&nbsp;<b>Q4</b>  */ ?>
		</td>
	  </tr>
	  <tr>
	    <td style="margin-top:0px;width:100px;" class="heading" align="center"><u>Dealer-Wise</u></td>
	    <td style="font-size:11px;height:18px;width:90px;color:#E6E6E6;" align="right"><b>Country :</b></td>
	    <td><select style="font-size:12px;width:120px;height:20px;background-color:#DDFFBB;" name="Coutry" id="Coutry" onChange="ClickCoutry(this.value)"> 
<?php if($_REQUEST['c']>0){ $sqlC=mysql_query("SELECT CountryName FROM hrm_country where CountryId=".$_REQUEST['c'], $con); $resC=mysql_fetch_array($sqlC); ?>
<option value="<?php echo $_REQUEST['c']; ?>"><?php echo ucwords(strtolower($resC['CountryName'])); ?></option><?php }else{ ?><option value="">Select</option><?php } ?>		
<?php $SqlCountry=mysql_query("SELECT * FROM hrm_country order by CountryName ASC", $con); while($ResCountry=mysql_fetch_array($SqlCountry)) { ?>
<option value="<?php echo $ResCountry['CountryId']; ?>"><?php echo ucwords(strtolower($ResCountry['CountryName'])); ?></option><?php } ?></select>
       </td>
	   <td style="font-size:11px;height:18px;width:80px;color:#E6E6E6;" align="right"><b>State :</b></td>
	    <td>
		 <span id="StateSpan">
		 <select style="font-size:12px;width:180px;height:20px;background-color:#DDFFBB;" name="State" id="State" onChange="ClickState(this.value)">
<?php if($_REQUEST['s']>0){ $sqlS=mysql_query("SELECT StateName FROM hrm_state where StateId=".$_REQUEST['s'], $con); $resS=mysql_fetch_array($sqlS); ?>
<option value="<?php echo $_REQUEST['s']; ?>"><?php echo ucwords(strtolower($resS['StateName'])); ?></option><?php }else{ ?><option value="">Select</option><?php } ?>		
        <?php $sql = mysql_query("SELECT * FROM hrm_state order by StateName ASC", $con); while($res = mysql_fetch_array($sql)){ ?>
        <option value="<?php echo $res['StateId']; ?>"><?php echo ucwords(strtolower($res['StateName'])); ?></option><?php } ?></select>
		 </span>
		</td>
		<td style="font-size:11px; height:18px;width:80px;color:#E6E6E6;" align="right"><b>HQ :</b></td>
	     <td>
		 <span id="HqSpan">
		 <select style="font-size:12px;width:120px;height:20px;background-color:#DDFFBB;" name="Hq" id="Hq" onChange="ClickHq(this.value)">
<?php if($_REQUEST['hq']>0){ $sqlhq=mysql_query("SELECT HqName FROM hrm_headquater where HqId=".$_REQUEST['hq'], $con); $reshq=mysql_fetch_array($sqlhq); ?>
<option value="<?php echo $_REQUEST['hq']; ?>"><?php echo ucwords(strtolower($reshq['HqName'])); ?></option><?php }else{ ?><option value="">Select</option><?php } ?>
<?php $sql = mysql_query("SELECT * FROM hrm_headquater where CompanyId=".$CompanyId." AND HQStatus='A' order by HqName ASC", $con); while($res = mysql_fetch_array($sql)){ ?>
         <option value="<?php echo $res['HqId']; ?>"><?php echo ucwords(strtolower($res['HqName'])); ?></option><?php } ?></select>
		 </span>
		 </td>
		 <td style="font-size:11px; height:18px;width:80px;color:#E6E6E6;" align="right"><b>Dealer :</b></td>
		 <td><input type="hidden" id="DealerId" value="" /><input type="hidden" id="TotAValueM" value="" /><input type="hidden" id="Sno" value="" />
		     <input type="hidden" name="q" id="q" value="<?php echo $_REQUEST['q']; ?>" /><input type="hidden" id="ii" value="<?php echo $_REQUEST['ii']; ?>" />
		  <span id="TabResult">
<select style="font-size:12px;width:250px;height:20px;background-color:#DDFFBB;" name="DealerD" id="DealerD" onChange="ClickDealer(this.value)" <?php if($_REQUEST['dil']==0){echo '';} ?>><?php if($_REQUEST['dil']>0){ $sqldil=mysql_query("SELECT DealerName,DealerCity FROM hrm_sales_dealer where DealerId=".$_REQUEST['dil'], $con); $resdil=mysql_fetch_array($sqldil); ?><option value="<?php echo $_REQUEST['dil']; ?>"><?php echo ucwords(strtolower($resdil['DealerName'].'-'.$resdil['DealerCity'])); ?></option><?php }else{ ?><option value="">Select</option><?php } ?>
<?php if($_REQUEST['hq']>0){ $sql=mysql_query("SELECT DealerId,DealerName,DealerCity FROM hrm_sales_dealer where (Hq_vc=".$_REQUEST['hq']." OR Hq_fc=".$_REQUEST['hq'].") group by DealerId order by DealerName asc", $con); while($res=mysql_fetch_array($sql)){ ?><option value="<?php echo $res['DealerId']; ?>"><?php echo ucwords(strtolower($res['DealerName'].'-'.$res['DealerCity'])); ?></option><?php } } else{ $sql = mysql_query("SELECT * FROM hrm_sales_dealer order by DealerName ASC", $con); while($res = mysql_fetch_array($sql)){ ?><option value="<?php echo $res['DealerId']; ?>"><?php echo $res['DealerName'].'-'.ucwords(strtolower($res['DealerCity'])); ?></option><?php } } ?></select>
	      </span>
		 </td>
		 <td style="font-size:11px; height:18px;width:180px;color:#E6E6E6;" align="center">
		 <?php if($_REQUEST['dil']>0){ ?>
		 <!--<a href="#" onClick="PrintSpR()" style="color:#FFCE9D;"><b>PRINT</b></a>-->
		 &nbsp;&nbsp;<a href="#" onClick="ExportDealerPlan(<?php echo $_REQUEST['y'].', '.$_REQUEST['grp'].', '.$_REQUEST['ii'].', '.$_REQUEST['dil']; ?>)" style="color:#F9F900; font-size:12px;"><b>Export</b></a>
		 <?php } ?>
		 </td>
	  </tr>
	   </table>
      </td>
   </tr>
  </table>
  </td>
  </tr>

<?php 
if($_REQUEST['grp']==1){ $HqCon='Hq_vc'; }
elseif($_REQUEST['grp']==2){ $HqCon='Hq_fc'; }

if($_REQUEST['ii']>0){ $qin="sp.ItemId=".$_REQUEST['ii']; }
else{ if($_REQUEST['grp']==1 OR $_REQUEST['grp']==2){ $qin="si.GroupId=".$_REQUEST['grp']; }else{ $qin='1=1'; } }
?>  
  
  <tr>
    <td colspan="10" valign="top" style="width:1251px;">
<?php if($_REQUEST['dil']>0){ 
$BeforeYId2=$_REQUEST['y']-2; $BeforeYId=$_REQUEST['y']-1; $AfterYId=$_REQUEST['y']+1; 	
$sqlY1=mysql_query("select FromDate,ToDate from hrm_sales_year where YearId=".$BeforeYId2, $con); $resY1=mysql_fetch_assoc($sqlY1); 
$sqlY2=mysql_query("select FromDate,ToDate from hrm_sales_year where YearId=".$BeforeYId, $con); $resY2=mysql_fetch_assoc($sqlY2); 
$sqlY3=mysql_query("select FromDate,ToDate from hrm_sales_year where YearId=".$_REQUEST['y'], $con); $resY3=mysql_fetch_assoc($sqlY3); 
$sqlY4=mysql_query("select FromDate,ToDate from hrm_sales_year where YearId=".$AfterYId, $con); $resY4=mysql_fetch_assoc($sqlY4);
$y1=date("y",strtotime($resY1['FromDate'])).'-'.date("y",strtotime($resY1['ToDate'])); $y1T='<font color="#A60053">Ach.</font>';
$y2=date("y",strtotime($resY2['FromDate'])).'-'.date("y",strtotime($resY2['ToDate'])); $y2T='<font color="#A60053">Ach.</font>';
$y3=date("y",strtotime($resY3['FromDate'])).'-'.date("y",strtotime($resY3['ToDate'])); $y3T='<font color="#A60053">Tgt.</font>';
$y4=date("y",strtotime($resY4['FromDate'])).'-'.date("y",strtotime($resY4['ToDate'])); $y4T='<font color="#A60053">Proj.</font>';
$y5=date("y",strtotime($resY3['FromDate'])).'-'.date("y",strtotime($resY3['ToDate'])); $y5T='<font color="#A60053">YTD.</font>';
$my1='<font color="#A60053">'.date("y",strtotime($resY3['FromDate'])).'</font>'; $my2='<font color="#A60053">'.date("y",strtotime($resY3['ToDate'])).'</font>';
$fy1=date("Y",strtotime($resY1['FromDate'])); $ty1=date("Y",strtotime($resY1['ToDate'])); 
$fy2=date("Y",strtotime($resY2['FromDate'])); $ty2=date("Y",strtotime($resY2['ToDate'])); 
$fy3=date("Y",strtotime($resY3['FromDate'])); $ty3=date("Y",strtotime($resY3['ToDate'])); 
$fy4=date("Y",strtotime($resY4['FromDate'])); $ty4=date("Y",strtotime($resY4['ToDate'])); 
$fy5=date("Y",strtotime($resY3['FromDate'])); $ty5=date("Y",strtotime($resY3['ToDate'])); 
?>  

<table border="1" cellpadding="0" cellspacing="0" style="font-family:Times New Roman;font-size:12px;width:1251px;vertical-align:top;">

<?php ///////////////////////////////////////////////////////////?>
<tr style="height:22px;background-color:#D5F1D1;">
 <td colspan="5" align="center" style="font-size:12px;font-weight:bold;background-color:#FFFF80;">Distributores Wise</td>
 <td class="Th60">Apr</td><td class="Th60">May</td><td class="Th60">Jun</td><td class="Th60" bgcolor="#FAD25A">Q1</td>
 <td class="Th60">Jul</td><td class="Th60">Aug</td><td class="Th60">Sep</td><td class="Th60" bgcolor="#FAD25A">Q2</td>
 <td class="Th60">Oct</td><td class="Th60">Nov</td><td class="Th60">Dec</td><td class="Th60" bgcolor="#FAD25A">Q3</td>
 <td class="Th60">Jan</td><td class="Th60">Feb</td><td class="Th60">Mar</td><td class="Th60" bgcolor="#FAD25A">Q4</td>
 <td class="Th60"><b>Total Kg</b></td>
 <td class="Th60"><b>Total Value</b></td>
 <td style="width:18px;" rowspan="8"></td>
</tr>

<?php for($i=1; $i<=5; $i++){ ?>
  <tr bgcolor="#EEEEEE" style="height:22px;"> 
   <?php if($i==1){ ?>
     <td rowspan="5" colspan="3" bgcolor="<?php if($i==1){echo '#B8E29C';}?>" align="right" style="font-size:15px;">
	 <b><?php if($i==1){ ?>Overall Reports: <?php } ?></b>&nbsp;
	 </td>	 
   <?php } ?>
   	 	
	   
<?php /* 1 */ if($i==1){
$sqlP1d=mysql_query("select SUM(M1_Ach) as sM1,SUM(M2_Ach) as sM2,SUM(M3_Ach) as sM3,SUM(M4_Ach) as sM4,SUM(M5_Ach) as sM5,SUM(M6_Ach) as sM6,SUM(M7_Ach) as sM7,SUM(M8_Ach) as sM8,SUM(M9_Ach) as sM9,SUM(M10_Ach) as sM10,SUM(M11_Ach) as sM11,SUM(M12_Ach) as sM12 from hrm_sales_sal_details_".$BeforeYId2." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId INNER JOIN hrm_sales_seedsitem si ON sp.ItemId=si.ItemId where sd.YearId=".$BeforeYId2." AND ".$qin." AND sd.DealerId=".$_REQUEST['dil'], $con);

//$sqlP1d=mysql_query("select * from hrm_sales_sal_details_".$BeforeYId2." where YearId=".$BeforeYId2." AND DealerId=".$_REQUEST['dil'], $con); 
$res1=mysql_fetch_assoc($sqlP1d); 
$res1Tot=$res1['sM1']+$res1['sM2']+$res1['sM3']+$res1['sM4']+$res1['sM5']+$res1['sM6']+$res1['sM7']+$res1['sM8']+$res1['sM9']+$res1['sM10']+$res1['sM11']+$res1['sM12'];
$TotQ1=$res1['sM1']+$res1['sM2']+$res1['sM3']; $TotQ2=$res1['sM4']+$res1['sM5']+$res1['sM6'];
$TotQ3=$res1['sM7']+$res1['sM8']+$res1['sM9']; $TotQ4=$res1['sM10']+$res1['sM11']+$res1['sM12'];
 
 ?>
 <td class="Th40"><b><?php echo $y1T; ?></b></td><td class="Th40"><b><?php echo $y1; ?></b></td>
 <td class="Td60"><?php if($res1['sM1']!=0){echo floatval($res1['sM1']);} ?></td><td class="Td60"><?php if($res1['sM2']!=0){echo floatval($res1['sM2']);} ?></td>
  <td class="Td60"><?php if($res1['sM3']!=0){echo floatval($res1['sM3']);} ?></td><td class="Td60" bgcolor="#FEE496"><?php if($TotQ1!=0){echo floatval($TotQ1);} ?></td>
  <td class="Td60"><?php if($res1['sM4']!=0){echo floatval($res1['sM4']);} ?></td><td class="Td60"><?php if($res1['sM5']!=0){echo floatval($res1['sM5']);} ?></td>
  <td class="Td60"><?php if($res1['sM6']!=0){echo floatval($res1['sM6']);} ?></td><td class="Td60" bgcolor="#FEE496"><?php if($TotQ2!=0){echo floatval($TotQ2);} ?></td>
  <td class="Td60"><?php if($res1['sM7']!=0){echo floatval($res1['sM7']);} ?></td><td class="Td60"><?php if($res1['sM8']!=0){echo floatval($res1['sM8']);} ?></td>
  <td class="Td60"><?php if($res1['sM9']!=0){echo floatval($res1['sM9']);} ?></td><td class="Td60" bgcolor="#FEE496"><?php if($TotQ3!=0){echo floatval($TotQ3);} ?></td>
  <td class="Td60"><?php if($res1['sM10']!=0){echo floatval($res1['sM10']);} ?></td><td class="Td60"><?php if($res1['sM11']!=0){echo floatval($res1['sM11']);} ?></td>
  <td class="Td60"><?php if($res1['sM12']!=0){echo floatval($res1['sM12']);} ?></td><td class="Td60" bgcolor="#FEE496"><?php if($TotQ4!=0){echo floatval($TotQ4);} ?></td>
  <td class="Td60"><b><?php if($res1Tot!=0){echo floatval($res1Tot);} ?></b></td> 
	 <td class="Td60"><input type="text" id="TotVal_A" style="width:60px;height:20px;text-align:right;" value="0" readonly/></td> 
	 
<?php } /* 2 */ if($i==2){ 
$sqlP2d=mysql_query("select SUM(M1_Ach) as sM1,SUM(M2_Ach) as sM2,SUM(M3_Ach) as sM3,SUM(M4_Ach) as sM4,SUM(M5_Ach) as sM5,SUM(M6_Ach) as sM6,SUM(M7_Ach) as sM7,SUM(M8_Ach) as sM8,SUM(M9_Ach) as sM9,SUM(M10_Ach) as sM10,SUM(M11_Ach) as sM11,SUM(M12_Ach) as sM12 from hrm_sales_sal_details_".$BeforeYId." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId INNER JOIN hrm_sales_seedsitem si ON sp.ItemId=si.ItemId where sd.YearId=".$BeforeYId." AND ".$qin." AND sd.DealerId=".$_REQUEST['dil'], $con); 

//$sqlP2d=mysql_query("select * from hrm_sales_sal_details_".$BeforeYId." where YearId=".$BeforeYId." AND DealerId=".$_REQUEST['dil'], $con); 
$res2=mysql_fetch_assoc($sqlP2d);
$res2Tot=$res2['sM1']+$res2['sM2']+$res2['sM3']+$res2['sM4']+$res2['sM5']+$res2['sM6']+$res2['sM7']+$res2['sM8']+$res2['sM9']+$res2['sM10']+$res2['sM11']+$res2['sM12']; 
$Tot2Q1=$res2['sM1']+$res2['sM2']+$res2['sM3']; $Tot2Q2=$res2['sM4']+$res2['sM5']+$res2['sM6'];
$Tot2Q3=$res2['sM7']+$res2['sM8']+$res2['sM9']; $Tot2Q4=$res2['sM10']+$res2['sM11']+$res2['sM12'];
 ?>
     <td class="Th40"><b><?php echo $y2T; ?></b></td><td class="Th40"><b><?php echo $y2; ?></b></td>
 <td class="Td60"><?php if($res2['sM1']!=0){echo floatval($res2['sM1']);} ?></td><td class="Td60"><?php if($res2['sM2']!=0){echo floatval($res2['sM2']);} ?></td>
  <td class="Td60"><?php if($res2['sM3']!=0){echo floatval($res2['sM3']);} ?></td><td class="Td60" bgcolor="#FEE496"><?php if($Tot2Q1!=0){echo floatval($Tot2Q1);} ?></td>
  <td class="Td60"><?php if($res2['sM4']!=0){echo floatval($res2['sM4']);} ?></td><td class="Td60"><?php if($res2['sM5']!=0){echo floatval($res2['sM5']);} ?></td>
  <td class="Td60"><?php if($res2['sM6']!=0){echo floatval($res2['sM6']);} ?></td><td class="Td60" bgcolor="#FEE496"><?php if($Tot2Q2!=0){echo floatval($Tot2Q2);} ?></td>
  <td class="Td60"><?php if($res2['sM7']!=0){echo floatval($res2['sM7']);} ?></td><td class="Td60"><?php if($res2['sM8']!=0){echo floatval($res2['sM8']);} ?></td>
  <td class="Td60"><?php if($res2['sM9']!=0){echo floatval($res2['sM9']);} ?></td><td class="Td60" bgcolor="#FEE496"><?php if($Tot2Q3!=0){echo floatval($Tot2Q3);} ?></td>
  <td class="Td60"><?php if($res2['sM10']!=0){echo floatval($res2['sM10']);} ?></td><td class="Td60"><?php if($res2['sM11']!=0){echo floatval($res2['sM11']);} ?></td>
  <td class="Td60"><?php if($res2['sM12']!=0){echo floatval($res2['sM12']);} ?></td><td class="Td60" bgcolor="#FEE496"><?php if($Tot2Q4!=0){echo floatval($Tot2Q4);} ?></td>
  <td class="Td60"><b><?php if($res2Tot!=0){echo floatval($res2Tot);} ?></b></td> 
	 <td class="Td60"><input type="text" id="TotVal_B" style="width:60px;height:20px;text-align:right;" value="0" readonly/></td>
	   
<?php } /* 3 */ if($i==3){ 
$sqlP3d=mysql_query("select SUM(M1) as sM1,SUM(M2) as sM2,SUM(M3) as sM3,SUM(M4) as sM4,SUM(M5) as sM5,SUM(M6) as sM6,SUM(M7) as sM7,SUM(M8) as sM8,SUM(M9) as sM9,SUM(M10) as sM10,SUM(M11) as sM11,SUM(M12) as sM12 from hrm_sales_sal_details_".$_REQUEST['y']." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId INNER JOIN hrm_sales_seedsitem si ON sp.ItemId=si.ItemId where sd.YearId=".$_REQUEST['y']." AND ".$qin." AND sd.DealerId=".$_REQUEST['dil'], $con);
//$sqlP3d=mysql_query("select * from hrm_sales_sal_details_".$_REQUEST['y']." where YearId=".$_REQUEST['y']." AND DealerId=".$_REQUEST['dil'], $con); 
$res3=mysql_fetch_assoc($sqlP3d); 
$res3Tot=$res3['sM1']+$res3['sM2']+$res3['sM3']+$res3['sM4']+$res3['sM5']+$res3['sM6']+$res3['sM7']+$res3['sM8']+$res3['sM9']+$res3['sM10']+$res3['sM11']+$res3['sM12']; 
$Tot3Q1=$res3['sM1']+$res3['sM2']+$res3['sM3']; $Tot3Q2=$res3['sM4']+$res3['sM5']+$res3['sM6'];
$Tot3Q3=$res3['sM7']+$res3['sM8']+$res3['sM9']; $Tot3Q4=$res3['sM10']+$res3['sM11']+$res3['sM12'];
 ?>
	 <td class="Th40"><b><?php echo $y3T; ?></b></td><td class="Th40"><b><?php echo $y3; ?></b></td> 
 <td class="Td60"><?php if($res3['sM1']!=0){echo floatval($res3['sM1']);} ?></td><td class="Td60"><?php if($res3['sM2']!=0){echo floatval($res3['sM2']);} ?></td>
  <td class="Td60"><?php if($res3['sM3']!=0){echo floatval($res3['sM3']);} ?></td><td class="Td60" bgcolor="#FEE496"><?php if($Tot3Q1!=0){echo floatval($Tot3Q1);} ?></td>
  <td class="Td60"><?php if($res3['sM4']!=0){echo floatval($res3['sM4']);} ?></td><td class="Td60"><?php if($res3['sM5']!=0){echo floatval($res3['sM5']);} ?></td>
  <td class="Td60"><?php if($res3['sM6']!=0){echo floatval($res3['sM6']);} ?></td><td class="Td60" bgcolor="#FEE496"><?php if($Tot3Q2!=0){echo floatval($Tot3Q2);} ?></td>
  <td class="Td60"><?php if($res3['sM7']!=0){echo floatval($res3['sM7']);} ?></td><td class="Td60"><?php if($res3['sM8']!=0){echo floatval($res3['sM8']);} ?></td>
  <td class="Td60"><?php if($res3['sM9']!=0){echo floatval($res3['sM9']);} ?></td><td class="Td60" bgcolor="#FEE496"><?php if($Tot3Q3!=0){echo floatval($Tot3Q3);} ?></td>
  <td class="Td60"><?php if($res3['sM10']!=0){echo floatval($res3['sM10']);} ?></td><td class="Td60"><?php if($res3['sM11']!=0){echo floatval($res3['sM11']);} ?></td>
  <td class="Td60"><?php if($res3['sM12']!=0){echo floatval($res3['sM12']);} ?></td><td class="Td60" bgcolor="#FEE496"><?php if($Tot3Q4!=0){echo floatval($Tot3Q4);} ?></td>	 
  <td class="Td60"><b><?php if($res3Tot!=0){echo floatval($res3Tot);} ?></b></td>
	 <td class="Td60"><input type="text" id="TotVal_C" style="width:60px;height:20px;text-align:right;" value="0" readonly/></td>  
	     
<?php } /* 4 */  if($i==4){ 
$sqlP4d=mysql_query("select SUM(M1_Proj) as sM1,SUM(M2_Proj) as sM2,SUM(M3_Proj) as sM3,SUM(M4_Proj) as sM4,SUM(M5_Proj) as sM5,SUM(M6_Proj) as sM6,SUM(M7_Proj) as sM7,SUM(M8_Proj) as sM8,SUM(M9_Proj) as sM9,SUM(M10_Proj) as sM10,SUM(M11_Proj) as sM11,SUM(M12_Proj) as sM12 from hrm_sales_sal_details_".$AfterYId." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId INNER JOIN hrm_sales_seedsitem si ON sp.ItemId=si.ItemId where sd.YearId=".$AfterYId." AND ".$qin." AND sd.DealerId=".$_REQUEST['dil'], $con);
//$sqlP4d=mysql_query("select * from hrm_sales_sal_details_".$AfterYId." where YearId=".$AfterYId." AND DealerId=".$_REQUEST['dil'], $con); 
$res4=mysql_fetch_assoc($sqlP4d); 
$res4Tot=$res4['sM1']+$res4['sM2']+$res4['sM3']+$res4['sM4']+$res4['sM5']+$res4['sM6']+$res4['sM7']+$res4['sM8']+$res4['sM9']+$res4['sM10']+$res4['sM11']+$res4['sM12']; 
$Tot4Q1=$res4['sM1']+$res4['sM2']+$res4['sM3']; $Tot4Q2=$res4['sM4']+$res4['sM5']+$res4['sM6'];
$Tot4Q3=$res4['sM7']+$res4['sM8']+$res4['sM9']; $Tot4Q4=$res4['sM10']+$res4['sM11']+$res4['sM12'];
 ?>
	 <td class="Th40"><b><?php echo $y4T; ?></b></td><td class="Th40"><b><?php echo $y4; ?></b></td> 
 <td class="Td60"><?php if($res4['sM1']!=0){echo floatval($res4['sM1']);} ?></td><td class="Td60"><?php if($res4['sM2']!=0){echo floatval($res4['sM2']);} ?></td>
  <td class="Td60"><?php if($res4['sM3']!=0){echo floatval($res4['sM3']);} ?></td><td class="Td60" bgcolor="#FEE496"><?php if($Tot4Q1!=0){echo floatval($Tot4Q1);} ?></td>
  <td class="Td60"><?php if($res4['sM4']!=0){echo floatval($res4['sM4']);} ?></td><td class="Td60"><?php if($res4['sM5']!=0){echo floatval($res4['sM5']);} ?></td>
  <td class="Td60"><?php if($res4['sM6']!=0){echo floatval($res4['sM6']);} ?></td><td class="Td60" bgcolor="#FEE496"><?php if($Tot4Q2!=0){echo floatval($Tot4Q2);} ?></td>
  <td class="Td60"><?php if($res4['sM7']!=0){echo floatval($res4['sM7']);} ?></td><td class="Td60"><?php if($res4['sM8']!=0){echo floatval($res4['sM8']);} ?></td>
  <td class="Td60"><?php if($res4['sM9']!=0){echo floatval($res4['sM9']);} ?></td><td class="Td60" bgcolor="#FEE496"><?php if($Tot4Q3!=0){echo floatval($Tot4Q3);} ?></td>
  <td class="Td60"><?php if($res4['sM10']!=0){echo floatval($res4['sM10']);} ?></td><td class="Td60"><?php if($res4['sM11']!=0){echo floatval($res4['sM11']);} ?></td>
  <td class="Td60"><?php if($res4['sM12']!=0){echo floatval($res4['sM12']);} ?></td><td class="Td60" bgcolor="#FEE496"><?php if($Tot4Q4!=0){echo floatval($Tot4Q4);} ?></td>	 
  <td class="Td60"><b><?php if($res4Tot!=0){echo floatval($res4Tot);} ?></b></td>
	 <td class="Td60"><input type="text" id="TotVal_D" style="width:60px;height:20px;text-align:right;" value="0" readonly/></td>
	 
<?php } /* 5 */  $sqlYe=mysql_query("select FromDate,ToDate from hrm_sales_year where YearId=".$_REQUEST['y'], $con); $resYe=mysql_fetch_assoc($sqlYe);
        $yeft=date("y",strtotime($resYe['FromDate'])).'-'.date("y",strtotime($resYe['ToDate'])); $yeT='<font color="#A60053">YTD</font>'; 
	    if($i==5){ 
$sqlP5d=mysql_query("select SUM(M1_Ach) as sM1,SUM(M2_Ach) as sM2,SUM(M3_Ach) as sM3,SUM(M4_Ach) as sM4,SUM(M5_Ach) as sM5,SUM(M6_Ach) as sM6,SUM(M7_Ach) as sM7,SUM(M8_Ach) as sM8,SUM(M9_Ach) as sM9,SUM(M10_Ach) as sM10,SUM(M11_Ach) as sM11,SUM(M12_Ach) as sM12 from hrm_sales_sal_details_".$_REQUEST['y']." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId INNER JOIN hrm_sales_seedsitem si ON sp.ItemId=si.ItemId where sd.YearId=".$_REQUEST['y']." AND ".$qin." AND sd.DealerId=".$_REQUEST['dil'], $con); 
//$sqlP5d=mysql_query("select * from hrm_sales_sal_details_".$YearId." where YearId=".$YearId." AND DealerId=".$_REQUEST['dil'], $con); 
 $res5=mysql_fetch_assoc($sqlP5d);  
 $res5Tot=$res5['sM1']+$res5['sM2']+$res5['sM3']+$res5['sM4']+$res5['sM5']+$res5['sM6']+$res5['sM7']+$res5['sM8']+$res5['sM9']+$res5['sM10']+$res5['sM11']+$res5['sM12'];
 $Tot5Q1=$res5['sM1']+$res5['sM2']+$res5['sM3']; $Tot5Q2=$res5['sM4']+$res5['sM5']+$res5['sM6'];
 $Tot5Q3=$res5['sM7']+$res5['sM8']+$res5['sM9']; $Tot5Q4=$res5['sM10']+$res5['sM11']+$res5['sM12']; 
 
 ?>
	 <td class="Th40"><b><?php echo $yeT; ?></b></td><td class="Th40"><b><?php echo $yeft; ?></b></td> 
  <td class="Td60"><?php if($res5['sM1']!=0){echo floatval($res5['sM1']);} ?></td><td class="Td60"><?php if($res5['sM2']!=0){echo floatval($res5['sM2']);} ?></td>
  <td class="Td60"><?php if($res5['sM3']!=0){echo floatval($res5['sM3']);} ?></td><td class="Td60" bgcolor="#FEE496"><?php if($Tot5Q1!=0){echo floatval($Tot5Q1);} ?></td>
  <td class="Td60"><?php if($res5['sM4']!=0){echo floatval($res5['sM4']);} ?></td><td class="Td60"><?php if($res5['sM5']!=0){echo floatval($res5['sM5']);} ?></td>
  <td class="Td60"><?php if($res5['sM6']!=0){echo floatval($res5['sM6']);} ?></td><td class="Td60" bgcolor="#FEE496"><?php if($Tot5Q2!=0){echo floatval($Tot5Q2);} ?></td>
  <td class="Td60"><?php if($res5['sM7']!=0){echo floatval($res5['sM7']);} ?></td><td class="Td60"><?php if($res5['sM8']!=0){echo floatval($res5['sM8']);} ?></td>
  <td class="Td60"><?php if($res5['sM9']!=0){echo floatval($res5['sM9']);} ?></td><td class="Td60" bgcolor="#FEE496"><?php if($Tot5Q3!=0){echo floatval($Tot5Q3);} ?></td>
  <td class="Td60"><?php if($res5['sM10']!=0){echo floatval($res5['sM10']);} ?></td><td class="Td60"><?php if($res5['sM11']!=0){echo floatval($res5['sM11']);} ?></td>
  <td class="Td60"><?php if($res5['sM12']!=0){echo floatval($res5['sM12']);} ?></td><td class="Td60" bgcolor="#FEE496"><?php if($Tot5Q4!=0){echo floatval($Tot5Q4);} ?></td>	 
  <td class="Td60"><b><?php if($res5Tot!=0){echo floatval($res5Tot);} ?></b></td>
	 <td class="Td60"><input type="text" id="TotVal_E" style="width:60px;height:20px;text-align:right;" value="0" readonly/></td>
<?php } ?>	   	   
  </tr>
<?php } ?>   

<?php ////////////////////////////////////////////////////////// ?>
  
  <tr style="background-color:#D5F1D1;color:#000000;">
    <td colspan="5" style="font-size:12px;color:#FFFF00;background-color:#183E83;">&nbsp;<b><?php echo ucfirst(strtolower($resdil['DealerName'])).'-<font color="#D7EBFF">'.$resdil['DealerCity'].'</font>'; ?></b></td>
  <td class="Th60" rowspan="2">Apr</td><td class="Th60" rowspan="2">May</td><td class="Th60" rowspan="2">Jun</td><td class="Th60" bgcolor="#FAD25A" rowspan="2">Q1</td>
  <td class="Th60" rowspan="2">Jul</td><td class="Th60" rowspan="2">Aug</td><td class="Th60" rowspan="2">Sep</td><td class="Th60" bgcolor="#FAD25A" rowspan="2">Q2</td>
  <td class="Th60" rowspan="2">Oct</td><td class="Th60" rowspan="2">Nov</td><td class="Th60" rowspan="2">Dec</td><td class="Th60" bgcolor="#FAD25A" rowspan="2">Q3</td>
  <td class="Th60" rowspan="2">Jan</td><td class="Th60" rowspan="2">Feb</td><td class="Th60" rowspan="2">Mar</td><td class="Th60" bgcolor="#FAD25A" rowspan="2">Q4</td>
  <td class="Th60" rowspan="2"><b>Total<br><font color="#E67300">Kg</font></b></td>
  <td class="Th60" rowspan="2"><b>Value<br><font color="#E67300">Lakh</font></b></td>	  
  </tr>	
   <tr style="background-color:#D5F1D1;color:#000000;">  
   <td align="center" style="width:50px;font-size:11px;"><b>Crop Code</b></td>
   <td align="center" style="width:100px;font-size:11px;"><b>Variety</b></td>
   <td align="center" class="Th40"><b>Type</b></td>
   <td colspan="2" align="center" style="width:80px;font-size:11px;"><b>Year</b></td>
  </tr>	
 <tr>
<td colspan="30">
<div class="inner_table" style="width:1250px;">
<table border="1" cellpadding="0" cellspacing="0" style="font-family:Times New Roman;font-size:14px; vertical-align:top;">	
 
  <?php $sql = mysql_query("select sp.ItemId,ProductId,ProductName,ItemName,ItemCode,TypeName from hrm_sales_seedsproduct sp INNER JOIN hrm_sales_seedsitem si ON sp.ItemId=si.ItemId INNER JOIN hrm_sales_seedtype st ON sp.TypeId=st.TypeId where ".$qin." order by si.GroupId ASC, si.ItemName ASC, st.TypeName ASC, sp.ProductName ASC", $con); 
  $Sn=1; while($res=mysql_fetch_array($sql)){ 
	  //$sqlRR=mysql_query("select * from hrm_sales_seedsproduct where ItemId=".$res['ItemId'], $con); $roww=mysql_num_rows($sqlRR); $MRow=$roww*5; echo 'aa='.$roww;
	  for($i=1; $i<=5; $i++){?>
  <tr bgcolor="#EEEEEE" style="height:22px;background-color:<?php if($i==1){echo '#E2F3D8'; }?>;">   
     <td bgcolor="<?php if($i==1){echo '#B8E29C';}?>" style="width:50px;font-size:11px;">&nbsp;<?php if($i==1){echo $res['ItemCode'];} ?></td>	 
     <td bgcolor="<?php if($i==1){echo '#B8E29C';}?>" style="width:100px;font-size:11px;">&nbsp;<?php if($i==1){echo $res['ProductName'];} ?></td>
     <td bgcolor="<?php if($i==1){echo '#B8E29C';}?>" align="center" style="width:50px;font-size:11px;">&nbsp;<?php if($i==1){echo substr_replace($res['TypeName'],'',2);}?></td>	  
<?php /* 1 */ if($i==1){$sqlP1d=mysql_query("select * from hrm_sales_sal_details_".$BeforeYId2." where YearId=".$BeforeYId2." AND ProductId=".$res['ProductId']." AND DealerId=".$_REQUEST['dil'], $con); $res1=mysql_fetch_assoc($sqlP1d); 

$res1Tot=$res1['M1_Ach']+$res1['M2_Ach']+$res1['M3_Ach']+$res1['M4_Ach']+$res1['M5_Ach']+$res1['M6_Ach']+$res1['M7_Ach']+$res1['M8_Ach']+$res1['M9_Ach']+$res1['M10_Ach']+$res1['M11_Ach']+$res1['M12_Ach']; 
$res1Tot1=$res1['M1_Ach']+$res1['M2_Ach']+$res1['M3_Ach']; $res1Tot2=$res1['M4_Ach']+$res1['M5_Ach']+$res1['M6_Ach'];
$res1Tot3=$res1['M7_Ach']+$res1['M8_Ach']+$res1['M9_Ach']; $res1Tot4=$res1['M10_Ach']+$res1['M11_Ach']+$res1['M12_Ach'];
?>
<?php 
include("Nrv1.php"); 
$Net4=$res1['M1_Ach']*$Nrv4; $Net5=$res1['M2_Ach']*$Nrv5; $Net6=$res1['M3_Ach']*$Nrv6; $Net7=$res1['M4_Ach']*$Nrv7; $Net8=$res1['M5_Ach']*$Nrv8; 
$Net9=$res1['M6_Ach']*$Nrv9; $Net10=$res1['M7_Ach']*$Nrv10; $Net11=$res1['M8_Ach']*$Nrv11; $Net12=$res1['M9_Ach']*$Nrv12; $Net1=$res1['M10_Ach']*$Nrv1; 
$Net2=$res1['M11_Ach']*$Nrv2; $Net3=$res1['M12_Ach']*$Nrv3; $NetNRV_1=$Net4+$Net5+$Net6+$Net7+$Net8+$Net9+$Net10+$Net11+$Net12+$Net1+$Net2+$Net3; $LakhNRV_1=$NetNRV_1/100000;
?>

  <td class="Th40"><b><?php echo $y1T; ?></b></td><td class="Th40"><b><?php echo $y1; ?></b></td>
  <td class="Td60"><?php if($res1['M1_Ach']!=0){echo floatval($res1['M1_Ach']);} ?></td>
  <td class="Td60"><?php if($res1['M2_Ach']!=0){echo floatval($res1['M2_Ach']);} ?></td>
  <td class="Td60"><?php if($res1['M3_Ach']!=0){echo floatval($res1['M3_Ach']);} ?></td>
  <td class="Td60" bgcolor="#FEE496"><?php if($res1Tot1!=0){echo floatval($res1Tot1);} ?></td>
  <td class="Td60"><?php if($res1['M4_Ach']!=0){echo floatval($res1['M4_Ach']);} ?></td>
  <td class="Td60"><?php if($res1['M5_Ach']!=0){echo floatval($res1['M5_Ach']);} ?></td>
  <td class="Td60"><?php if($res1['M6_Ach']!=0){echo floatval($res1['M6_Ach']);} ?></td>
  <td class="Td60" bgcolor="#FEE496"><?php if($res1Tot2!=0){echo floatval($res1Tot2);} ?></td>
  <td class="Td60"><?php if($res1['M7_Ach']!=0){echo floatval($res1['M7_Ach']);} ?></td>
  <td class="Td60"><?php if($res1['M8_Ach']!=0){echo floatval($res1['M8_Ach']);} ?></td>
  <td class="Td60"><?php if($res1['M9_Ach']!=0){echo floatval($res1['M9_Ach']);} ?></td>
  <td class="Td60" bgcolor="#FEE496"><?php if($res1Tot3!=0){echo floatval($res1Tot3);} ?></td>
  <td class="Td60"><?php if($res1['M10_Ach']!=0){echo floatval($res1['M10_Ach']);} ?></td>
  <td class="Td60"><?php if($res1['M11_Ach']!=0){echo floatval($res1['M11_Ach']);} ?></td>
  <td class="Td60"><?php if($res1['M12_Ach']!=0){echo floatval($res1['M12_Ach']);} ?></td>
  <td class="Td60" bgcolor="#FEE496"><?php if($res1Tot4!=0){echo floatval($res1Tot4);} ?></td>
  <td class="Td60"><b><?php if($res1Tot!=0){echo floatval($res1Tot);} ?></b></td>

  <td class="Td60"><input type="text" style="width:60px;height:20px;text-align:right;" value="<?php if($LakhNRV_1!=0){echo round($LakhNRV_1,4);} ?>" readonly />
  <input type="hidden" id="<?php echo 'A'.$Sn; ?>" value="<?php if($LakhNRV_1>0){echo round($LakhNRV_1,4);}else{echo 0;} ?>" />
  <?php if($LakhNRV_1>0){$valA=$LakhNRV_1;}else{$valA=0;} echo '<script>FunATotal('.$valA.');</script>'; ?>
  </td> 

	 
<?php } /* 2 */ if($i==2){ $sqlP2d=mysql_query("select * from hrm_sales_sal_details_".$BeforeYId." where YearId=".$BeforeYId." AND ProductId=".$res['ProductId']." AND DealerId=".$_REQUEST['dil'], $con); $res2=mysql_fetch_assoc($sqlP2d);
$res2Tot=$res2['M1_Ach']+$res2['M2_Ach']+$res2['M3_Ach']+$res2['M4_Ach']+$res2['M5_Ach']+$res2['M6_Ach']+$res2['M7_Ach']+$res2['M8_Ach']+$res2['M9_Ach']+$res2['M10_Ach']+$res2['M11_Ach']+$res2['M12_Ach']; 
$res2Tot1=$res2['M1_Ach']+$res2['M2_Ach']+$res2['M3_Ach']; $res2Tot2=$res2['M4_Ach']+$res2['M5_Ach']+$res2['M6_Ach'];
$res2Tot3=$res2['M7_Ach']+$res2['M8_Ach']+$res2['M9_Ach']; $res2Tot4=$res2['M10_Ach']+$res2['M11_Ach']+$res2['M12_Ach'];
 ?>

<?php 
include("Nrv2.php");
$Net4=$res2['M1_Ach']*$Nrv4; $Net5=$res2['M2_Ach']*$Nrv5; $Net6=$res2['M3_Ach']*$Nrv6; $Net7=$res2['M4_Ach']*$Nrv7; $Net8=$res2['M5_Ach']*$Nrv8; 
$Net9=$res2['M6_Ach']*$Nrv9; $Net10=$res2['M7_Ach']*$Nrv10; $Net11=$res2['M8_Ach']*$Nrv11; $Net12=$res2['M9_Ach']*$Nrv12; $Net1=$res2['M10_Ach']*$Nrv1; 
$Net2=$res2['M11_Ach']*$Nrv2; $Net3=$res2['M12_Ach']*$Nrv3; $NetNRV_2=$Net4+$Net5+$Net6+$Net7+$Net8+$Net9+$Net10+$Net11+$Net12+$Net1+$Net2+$Net3; $LakhNRV_2=$NetNRV_2/100000;
?>
    <td class="Th40"><b><?php echo $y2T; ?></b></td><td class="Th40"><b><?php echo $y2; ?></b></td>
 <td class="Td60"><?php if($res2['M1_Ach']!=0){echo floatval($res2['M1_Ach']);} ?></td>
  <td class="Td60"><?php if($res2['M2_Ach']!=0){echo floatval($res2['M2_Ach']);} ?></td>
  <td class="Td60"><?php if($res2['M3_Ach']!=0){echo floatval($res2['M3_Ach']);} ?></td>
  <td class="Td60" bgcolor="#FEE496"><?php if($res2Tot1!=0){echo floatval($res2Tot1);} ?></td>
  <td class="Td60"><?php if($res2['M4_Ach']!=0){echo floatval($res2['M4_Ach']);} ?></td>
  <td class="Td60"><?php if($res2['M5_Ach']!=0){echo floatval($res2['M5_Ach']);} ?></td>
  <td class="Td60"><?php if($res2['M6_Ach']!=0){echo floatval($res2['M6_Ach']);} ?></td>
  <td class="Td60" bgcolor="#FEE496"><?php if($res2Tot2!=0){echo floatval($res2Tot2);} ?></td>
  <td class="Td60"><?php if($res2['M7_Ach']!=0){echo floatval($res2['M7_Ach']);} ?></td>
  <td class="Td60"><?php if($res2['M8_Ach']!=0){echo floatval($res2['M8_Ach']);} ?></td>
  <td class="Td60"><?php if($res2['M9_Ach']!=0){echo floatval($res2['M9_Ach']);} ?></td>
  <td class="Td60" bgcolor="#FEE496"><?php if($res2Tot3!=0){echo floatval($res2Tot3);} ?></td>
  <td class="Td60"><?php if($res2['M10_Ach']!=0){echo floatval($res2['M10_Ach']);} ?></td>
  <td class="Td60"><?php if($res2['M11_Ach']!=0){echo floatval($res2['M11_Ach']);} ?></td>
  <td class="Td60"><?php if($res2['M12_Ach']!=0){echo floatval($res2['M12_Ach']);} ?></td>
  <td class="Td60" bgcolor="#FEE496"><?php if($res2Tot4!=0){echo floatval($res2Tot4);} ?></td>	   	   
  <td class="Td60"><b><?php if($res2Tot!=0){echo floatval($res2Tot);} ?></b></td>
 
  <td class="Td60"><input type="text" style="width:60px;height:20px;text-align:right;" value="<?php if($LakhNRV_2!=0){echo round($LakhNRV_2,4);} ?>" readonly />
  <input type="hidden" id="id="<?php echo 'B'.$Sn; ?>"" value="<?php if($LakhNRV_2>0){echo round($LakhNRV_2,4);}else{echo 0;} ?>" />
  <?php if($LakhNRV_2>0){$valB=$LakhNRV_2;}else{$valB=0;} echo '<script>FunBTotal('.$valB.');</script>'; ?>
  </td>  

	   
<?php } /* 3 */ if($i==3){ $sqlP3d=mysql_query("select * from hrm_sales_sal_details_".$_REQUEST['y']." where YearId=".$_REQUEST['y']." AND ProductId=".$res['ProductId']." AND DealerId=".$_REQUEST['dil'], $con); $res3=mysql_fetch_assoc($sqlP3d); 
$res3Tot=$res3['M1']+$res3['M2']+$res3['M3']+$res3['M4']+$res3['M5']+$res3['M6']+$res3['M7']+$res3['M8']+$res3['M9']+$res3['M10']+$res3['M11']+$res3['M12'];
$res3Tot1=$res3['M1']+$res3['M2']+$res3['M3']; $res3Tot2=$res3['M4']+$res3['M5']+$res3['M6'];
$res3Tot3=$res3['M7']+$res3['M8']+$res3['M9']; $res3Tot4=$res3['M10']+$res3['M11']+$res3['M12'];
 
 ?>

<?php 
include("Nrv3.php");
$Net4=$res3['M1']*$Nrv4; $Net5=$res3['M2']*$Nrv5; $Net6=$res3['M3']*$Nrv6; $Net7=$res3['M4']*$Nrv7; $Net8=$res3['M5']*$Nrv8; 
$Net9=$res3['M6']*$Nrv9; $Net10=$res3['M7']*$Nrv10; $Net11=$res3['M8']*$Nrv11; $Net12=$res3['M9']*$Nrv12; $Net1=$res3['M10']*$Nrv1; 
$Net2=$res3['M11']*$Nrv2; $Net3=$res3['M12']*$Nrv3; $NetNRV_3=$Net4+$Net5+$Net6+$Net7+$Net8+$Net9+$Net10+$Net11+$Net12+$Net1+$Net2+$Net3; $LakhNRV_3=$NetNRV_3/100000;
?>

  <td class="Th40"><b><?php echo $y3T; ?></b></td><td class="Th40"><b><?php echo $y3; ?></b></td> 
  <td class="Td60"><?php if($res3['M1']!=0){echo floatval($res3['M1']);} ?></td>
  <td class="Td60"><?php if($res3['M2']!=0){echo floatval($res3['M2']);} ?></td>
  <td class="Td60"><?php if($res3['M3']!=0){echo floatval($res3['M3']);} ?></td>
  <td class="Td60" bgcolor="#FEE496"><?php if($res3Tot1!=0){echo floatval($res3Tot1);} ?></td>
  <td class="Td60"><?php if($res3['M4']!=0){echo floatval($res3['M4']);} ?></td>
  <td class="Td60"><?php if($res3['M5']!=0){echo floatval($res3['M5']);} ?></td>
  <td class="Td60"><?php if($res3['M6']!=0){echo floatval($res3['M6']);} ?></td>
  <td class="Td60" bgcolor="#FEE496"><?php if($res3Tot2!=0){echo floatval($res3Tot2);} ?></td>
  <td class="Td60"><?php if($res3['M7']!=0){echo floatval($res3['M7']);} ?></td>
  <td class="Td60"><?php if($res3['M8']!=0){echo floatval($res3['M8']);} ?></td>
  <td class="Td60"><?php if($res3['M9']!=0){echo floatval($res3['M9']);} ?></td>
  <td class="Td60" bgcolor="#FEE496"><?php if($res3Tot3!=0){echo floatval($res3Tot3);} ?></td>
  <td class="Td60"><?php if($res3['M10']!=0){echo floatval($res3['M10']);} ?></td>
  <td class="Td60"><?php if($res3['M11']!=0){echo floatval($res3['M11']);} ?></td>
  <td class="Td60"><?php if($res3['M12']!=0){echo floatval($res3['M12']);} ?></td>
  <td class="Td60" bgcolor="#FEE496"><?php if($res3Tot4!=0){echo floatval($res3Tot4);} ?></td>	   	   	 
  <td class="Td60"><b><?php if($res3Tot!=0){echo floatval($res3Tot);} ?></b></td>
  
  <td class="Td60"><input type="text" style="width:60px;height:20px;text-align:right;" value="<?php if($LakhNRV_3!=0){echo round($LakhNRV_3,4);} ?>" readonly />
  <input type="hidden" id="<?php echo 'C'.$Sn; ?>" value="<?php if($LakhNRV_3>0){echo round($LakhNRV_3,4);}else{echo 0;} ?>" />
  <?php if($LakhNRV_3>0){$valC=$LakhNRV_3;}else{$valC=0;} echo '<script>FunCTotal('.$valC.');</script>'; ?>
  </td>    
	     
<?php } /* 4 */  if($i==4){ $sqlP4d=mysql_query("select * from hrm_sales_sal_details_".$AfterYId." where YearId=".$AfterYId." AND ProductId=".$res['ProductId']." AND DealerId=".$_REQUEST['dil'], $con); $res4=mysql_fetch_assoc($sqlP4d); 
$res4Tot=$res4['M1_Proj']+$res4['M2_Proj']+$res4['M3_Proj']+$res4['M4_Proj']+$res4['M5_Proj']+$res4['M6_Proj']+$res4['M7_Proj']+$res4['M8_Proj']+$res4['M9_Proj']+$res4['M10_Proj']+$res4['M11_Proj']+$res4['M12_Proj']; 
$res4Tot1=$res4['M1_Proj']+$res4['M2_Proj']+$res4['M3_Proj']; $res4Tot2=$res4['M4_Proj']+$res4['M5_Proj']+$res4['M6_Proj'];
$res4Tot3=$res4['M7_Proj']+$res4['M8_Proj']+$res4['M9_Proj']; $res4Tot4=$res4['M10_Proj']+$res4['M11_Proj']+$res4['M12_Proj'];
 ?>


<?php 
include("Nrv4.php");
$Net4=$res4['M1_Proj']*$Nrv4; $Net5=$res4['M2_Proj']*$Nrv5; $Net6=$res4['M3_Proj']*$Nrv6; $Net7=$res4['M4_Proj']*$Nrv7; 
$Net8=$res4['M5_Proj']*$Nrv8; $Net9=$res4['M6_Proj']*$Nrv9; $Net10=$res4['M7_Proj']*$Nrv10; $Net11=$res4['M8_Proj']*$Nrv11; $Net12=$res4['M9_Proj']*$Nrv12; $Net1=$res4['M10_Proj']*$Nrv1; $Net2=$res4['M11_Proj']*$Nrv2; $Net3=$res4['M12_Proj']*$Nrv3; $NetNRV_4=$Net4+$Net5+$Net6+$Net7+$Net8+$Net9+$Net10+$Net11+$Net12+$Net1+$Net2+$Net3; $LakhNRV_4=$NetNRV_4/100000;

?>
  <td class="Th40"><b><?php echo $y4T; ?></b></td><td class="Th40"><b><?php echo $y4; ?></b></td> 
  <td class="Td60"><?php if($res4['M1_Proj']!=0){echo floatval($res4['M1_Proj']);} ?></td>
  <td class="Td60"><?php if($res4['M2_Proj']!=0){echo floatval($res4['M2_Proj']);} ?></td>
  <td class="Td60"><?php if($res4['M3_Proj']!=0){echo floatval($res4['M3_Proj']);} ?></td>
  <td class="Td60" bgcolor="#FEE496"><?php if($res4Tot1!=0){echo floatval($res4Tot1);} ?></td>
  <td class="Td60"><?php if($res4['M4_Proj']!=0){echo floatval($res4['M4_Proj']);} ?></td>
  <td class="Td60"><?php if($res4['M5_Proj']!=0){echo floatval($res4['M5_Proj']);} ?></td>
  <td class="Td60"><?php if($res4['M6_Proj']!=0){echo floatval($res4['M6_Proj']);} ?></td>
  <td class="Td60" bgcolor="#FEE496"><?php if($res4Tot2!=0){echo floatval($res4Tot2);} ?></td>
  <td class="Td60"><?php if($res4['M7_Proj']!=0){echo floatval($res4['M7_Proj']);} ?></td>
  <td class="Td60"><?php if($res4['M8_Proj']!=0){echo floatval($res4['M8_Proj']);} ?></td>
  <td class="Td60"><?php if($res4['M9_Proj']!=0){echo floatval($res4['M9_Proj']);} ?></td>
  <td class="Td60" bgcolor="#FEE496"><?php if($res4Tot3!=0){echo floatval($res4Tot3);} ?></td>
  <td class="Td60"><?php if($res4['M10_Proj']!=0){echo floatval($res4['M10_Proj']);} ?></td>
  <td class="Td60"><?php if($res4['M11_Proj']!=0){echo floatval($res4['M11_Proj']);} ?></td>
  <td class="Td60"><?php if($res4['M12_Proj']!=0){echo floatval($res4['M12_Proj']);} ?></td>
  <td class="Td60" bgcolor="#FEE496"><?php if($res4Tot4!=0){echo floatval($res4Tot4);} ?></td>	   	   	 
  <td class="Td60"><b><?php if($res4Tot!=0){echo floatval($res4Tot);} ?></b></td>
  
  <td class="Td60"><input type="text" style="width:60px;height:20px;text-align:right;" value="<?php if($LakhNRV_4!=0){echo round($LakhNRV_4,4);} ?>" readonly />
  <input type="hidden" id="<?php echo 'D'.$Sn; ?>" value="<?php if($LakhNRV_4>0){echo round($LakhNRV_4,4);}else{echo 0;} ?>" />
  <?php if($LakhNRV_4>0){$valD=$LakhNRV_4;}else{$valD=0;} echo '<script>FunDTotal('.$valD.');</script>'; ?>
  </td>  
	 
<?php } /* 5 */  $sqlYe=mysql_query("select FromDate,ToDate from hrm_sales_year where YearId=".$_REQUEST['y'], $con); $resYe=mysql_fetch_assoc($sqlYe);
        $yeft=date("y",strtotime($resYe['FromDate'])).'-'.date("y",strtotime($resYe['ToDate'])); $yeT='<font color="#A60053">YTD</font>'; 
	    if($i==5){ $sqlP5d=mysql_query("select * from hrm_sales_sal_details_".$_REQUEST['y']." where YearId=".$_REQUEST['y']." AND ProductId=".$res['ProductId']." AND DealerId=".$_REQUEST['dil'], $con); 
$res5=mysql_fetch_assoc($sqlP5d);  
$res5Tot=$res5['M1_Ach']+$res5['M2_Ach']+$res5['M3_Ach']+$res5['M4_Ach']+$res5['M5_Ach']+$res5['M6_Ach']+$res5['M7_Ach']+$res5['M8_Ach']+$res5['M9_Ach']+$res5['M10_Ach']+$res5['M11_Ach']+$res5['M12_Ach'];
$res5Tot1=$res5['M1_Ach']+$res5['M2_Ach']+$res5['M3_Ach']; $res5Tot2=$res5['M4_Ach']+$res5['M5_Ach']+$res5['M6_Ach'];
$res5Tot3=$res5['M7_Ach']+$res5['M8_Ach']+$res5['M9_Ach']; $res5Tot4=$res5['M10_Ach']+$res5['M11_Ach']+$res5['M12_Ach'];
 ?>

<?php 
include("Nrv5.php");
$Net4=$res5['M1_Ach']*$Nrv4; $Net5=$res5['M2_Ach']*$Nrv5; $Net6=$res5['M3_Ach']*$Nrv6; $Net7=$res5['M4_Ach']*$Nrv7; $Net8=$res5['M5_Ach']*$Nrv8; 
$Net9=$res5['M6_Ach']*$Nrv9; $Net10=$res5['M7_Ach']*$Nrv10; $Net11=$res5['M8_Ach']*$Nrv11; $Net12=$res5['M9_Ach']*$Nrv12; $Net1=$res5['M10_Ach']*$Nrv1; 
$Net2=$res5['M11_Ach']*$Nrv2; $Net3=$res5['M12_Ach']*$Nrv3; $NetNRV_5=$Net4+$Net5+$Net6+$Net7+$Net8+$Net9+$Net10+$Net11+$Net12+$Net1+$Net2+$Net3; $LakhNRV_5=$NetNRV_5/100000;

?>
  <td class="Th40"><b><?php echo $yeT; ?></b></td><td class="Th40"><b><?php echo $yeft; ?></b></td> 
  <td class="Td60"><?php if($res5['M1_Ach']!=0){echo floatval($res5['M1_Ach']);} ?></td>
  <td class="Td60"><?php if($res5['M2_Ach']!=0){echo floatval($res5['M2_Ach']);} ?></td>
  <td class="Td60"><?php if($res5['M3_Ach']!=0){echo floatval($res5['M3_Ach']);} ?></td>
  <td class="Td60" bgcolor="#FEE496"><?php if($res5Tot1!=0){echo floatval($res5Tot1);} ?></td>
  <td class="Td60"><?php if($res5['M4_Ach']!=0){echo floatval($res5['M4_Ach']);} ?></td>
  <td class="Td60"><?php if($res5['M5_Ach']!=0){echo floatval($res5['M5_Ach']);} ?></td>
  <td class="Td60"><?php if($res5['M6_Ach']!=0){echo floatval($res5['M6_Ach']);} ?></td>
  <td class="Td60" bgcolor="#FEE496"><?php if($res5Tot2!=0){echo floatval($res5Tot2);} ?></td>
  <td class="Td60"><?php if($res5['M7_Ach']!=0){echo floatval($res5['M7_Ach']);} ?></td>
  <td class="Td60"><?php if($res5['M8_Ach']!=0){echo floatval($res5['M8_Ach']);} ?></td>
  <td class="Td60"><?php if($res5['M9_Ach']!=0){echo floatval($res5['M9_Ach']);} ?></td>
  <td class="Td60" bgcolor="#FEE496"><?php if($res5Tot3!=0){echo floatval($res5Tot3);} ?></td>
  <td class="Td60"><?php if($res5['M10_Ach']!=0){echo floatval($res5['M10_Ach']);} ?></td>
  <td class="Td60"><?php if($res5['M11_Ach']!=0){echo floatval($res5['M11_Ach']);} ?></td>
  <td class="Td60"><?php if($res5['M12_Ach']!=0){echo floatval($res5['M12_Ach']);} ?></td>
  <td class="Td60" bgcolor="#FEE496"><?php if($res5Tot4!=0){echo floatval($res5Tot4);} ?></td>
  <td class="Td60"><b><?php if($res5Tot!=0){echo floatval($res5Tot);} ?></b></td>
 
  <td class="Td60"><input type="text" style="width:60px;height:20px;text-align:right;" value="<?php if($LakhNRV_5!=0){echo round($LakhNRV_5,4);} ?>" readonly />
  <input type="hidden" id="<?php echo 'E'.$Sn; ?>" value="<?php if($LakhNRV_5!=0){echo round($LakhNRV_5,4);}else{echo 0;} ?>" />
  <?php if($LakhNRV_5!=0){$valE=$LakhNRV_5;}else{$valE=0;} echo '<script>FunETotal('.$valE.');</script>'; ?>
  </td> 
  
<?php } ?>	   	   
  </tr> 
<?php } $Sn++; } $ActSn=$Sn-1; echo '<input type="hidden" id="ActSn" value="'.$ActSn.'" />'; ?> 	
</table>
</div>
</td>
</tr>  	  
</table>	       
<?php } ?>
    </td>
   </tr> 
<tr>
 <td id="TDResultId">
  <span id="ResultTDSpan"></span>
  <span id="AddMonthResult"></span>
  <span id="SubSpanMsg"></span>
 </td>
</tr>   	
  </table>
 </td>
</tr>
</table>
		
<?php //*************************************************************?>
<?php //*****************END*****END*****END******END******END**************************?>
<?php //************************************************************************************?>
		
	  </td>
	</tr>
  </table>
 </td>
</tr>
</table>
</body>
</html>

</html>
