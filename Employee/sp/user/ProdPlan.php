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
.Trh60{text-align:center;width:60px;font-weight:bold;}.textData{width:80px;height:22px;background-color:#EDEBD6;border:hidden;text-align:right;}
.field{width:80px;text-align:center; font-weight:bold;} .field2{width:80px;text-align:center; font-weight:bold;} .field3{width:60px;text-align:center; font-weight:bold;}
.InputRec{ width:75px;text-align:right;font-size:12px;font-family:Times New Roman;}
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

function ChangrYear(YearV)
{ var c=document.getElementById("Coutry").value;
  var CropGrp=document.getElementById("CropGrp").value; var ii=document.getElementById("ItemV").value; var ci=document.getElementById("ComId").value;
  window.location="ProdPlan.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y="+YearV+"&ci="+ci+"&grp="+CropGrp+"&ii="+ii+"&c="+c; 
}
function ClickGrp(CropGrp)
{ var c=document.getElementById("Coutry").value;
  var YearV=document.getElementById("YearV").value; var ii=0; var ci=document.getElementById("ComId").value;
  window.location="ProdPlan.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y="+YearV+"&ci="+ci+"&grp="+CropGrp+"&ii="+ii+"&c="+c; 
}
function ChangeII(ii)
{ var c=document.getElementById("Coutry").value;
  var YearV=document.getElementById("YearV").value; var CropGrp=document.getElementById("CropGrp").value; var ci=document.getElementById("ComId").value;
  window.location="ProdPlan.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y="+YearV+"&ci="+ci+"&grp="+CropGrp+"&ii="+ii+"&c="+c; 
}

	                              
function editD1(sn,si)
{ document.getElementById("EB1_"+sn+"_"+si).style.display='none'; document.getElementById("SB1_"+sn+"_"+si).style.display='block';
  document.getElementById("Buff_"+sn+"_"+si).readOnly=false; document.getElementById("Buff_"+sn+"_"+si).style.background='#FFA8FF'; }
function editD2(sn,si)
{ document.getElementById("EB2_"+sn+"_"+si).style.display='none'; document.getElementById("SB2_"+sn+"_"+si).style.display='block';
  document.getElementById("Buff2_"+sn+"_"+si).readOnly=false; document.getElementById("Buff2_"+sn+"_"+si).style.background='#FFA8FF'; }


function saveD1(sn,yi,pi,si,m,y)
{ var StmtReq=document.getElementById("StmtReq_"+sn+"_"+si).value; var Buff=document.getElementById("Buff_"+sn+"_"+si).value;
  var url = 'ProdPlanAct.php';	var pars = 'Action=RequireOneTwo&sn='+sn+'&yi='+yi+'&pi='+pi+'&si='+si+'&m='+m+'&y='+y+'&StmtReq='+StmtReq+'&Buff='+Buff;	
  var myAjax = new Ajax.Request( url, { method: 'post', parameters: pars, onComplete: show_StmReqBuff }); 
}
function show_StmReqBuff(originalRequest)
{ document.getElementById('resulrSpan').innerHTML = originalRequest.responseText; var sn=document.getElementById("sn").value; var si=document.getElementById("si").value;
  document.getElementById("EB1_"+sn+"_"+si).style.display='block'; document.getElementById("SB1_"+sn+"_"+si).style.display='none';
  document.getElementById("Buff_"+sn+"_"+si).readOnly=true; document.getElementById("Buff_"+sn+"_"+si).style.background='#B0FB4D';
}

function saveD2(sn,yi,pi,si,m,y)
{ var StmtReq=document.getElementById("StmtReq2_"+sn+"_"+si).value; var Buff=document.getElementById("Buff2_"+sn+"_"+si).value;
  var url = 'ProdPlanAct.php';	var pars = 'Action=RequireOneTwo&sn='+sn+'&yi='+yi+'&pi='+pi+'&si='+si+'&m='+m+'&y='+y+'&StmtReq='+StmtReq+'&Buff='+Buff;	
  var myAjax = new Ajax.Request( url, { method: 'post', parameters: pars, onComplete: show_StmReqBuff2 }); 
}
function show_StmReqBuff2(originalRequest)
{ document.getElementById('resulrSpan').innerHTML = originalRequest.responseText; var sn=document.getElementById("sn").value; var si=document.getElementById("si").value;
  document.getElementById("EB2_"+sn+"_"+si).style.display='block'; document.getElementById("SB2_"+sn+"_"+si).style.display='none';
  document.getElementById("Buff2_"+sn+"_"+si).readOnly=true; document.getElementById("Buff2_"+sn+"_"+si).style.background='#B0FB4D';
}

function FunCalcy(v,sn,si)
{
  var v1=parseFloat(document.getElementById("StmtReq_"+sn+"_"+si).value);
  var v2=parseFloat(v); var TotV=parseFloat(document.getElementById("TotReq_"+sn+"_"+si).value);
  if(v1!='' && v2!=''){ var TotV=document.getElementById("TotReq_"+sn+"_"+si).value=Math.round((v1+v2)*100)/100; }
}
function FunCalcy2(v,sn,si)
{ var v1=parseFloat(document.getElementById("StmtReq2_"+sn+"_"+si).value);
  var v2=parseFloat(v); var TotV=parseFloat(document.getElementById("TotReq2_"+sn+"_"+si).value);
  if(v1!='' && v2!=''){ var TotV=document.getElementById("TotReq2_"+sn+"_"+si).value=Math.round((v1+v2)*100)/100; }
}
//TotReq2_ TotReq_ StmtReq_
  
</Script>
</head>
<body class="body">
<span id="resulrSpan"></span>
<input type="hidden" id="MonthN" value="<?php date("m"); ?>" />
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
<?php //*******************************************************************************************?>
<?php //******************START*****START*****START******START******START*******************************?>
<?php //***********************************************************************************************?>
<input type="hidden" id="ComId" value="<?php echo $_REQUEST['ci']; ?>" />
<input type="hidden" id="UserId" value="<?php echo $UserId; ?>" />		  
<table border="0" style="margin-top:0px; width:100%; height:150px;">	
<tr>
 <td valign="top">
  <table border="0">
   <tr>
    <td id="Entry" valign="top" style="width:1000px;" align="left">
	<span id="TabEntry">
     <table border="0">
      <tr>
	    <td rowspan="2" style="margin-top:0px;width:300px;" class="heading" align="center"><u>Production Plan</u></td>
		<td style="font-size:11px;height:18px;width:90px;color:#E6E6E6;" align="right"><b>Country :</b></td>
	    <td><select style="font-size:12px;width:120px;height:20px;background-color:#DDFFBB;" name="Coutry" id="Coutry" onChange="ClickCoutry(this.value)"> 
<?php if($_REQUEST['c']>0){ $sqlC=mysql_query("SELECT CountryName FROM hrm_country where CountryId=".$_REQUEST['c'], $con); $resC=mysql_fetch_array($sqlC); ?>
<option value="<?php echo $_REQUEST['c']; ?>"><?php echo strtoupper($resC['CountryName']); ?></option><?php }else{ ?><option value="">SELECT</option><?php } ?>		
<?php $SqlCountry=mysql_query("SELECT * FROM hrm_country order by CountryName ASC", $con); while($ResCountry=mysql_fetch_array($SqlCountry)) { ?>
<option value="<?php echo $ResCountry['CountryId']; ?>"><?php echo strtoupper($ResCountry['CountryName']); ?></option><?php } ?></select>
       </td>
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
	   <td>&nbsp;</td>
	   <td style="font-size:11px;height:18px;width:80px;color:#E6E6E6;" align="right"><b>Crop :</b></td>
	    <td><select style="font-size:12px;width:180px;height:20px;background-color:#DDFFBB;" name="CropGrp" id="CropGrp" onChange="ClickGrp(this.value)">
<?php if($_REQUEST['grp']==0){ ?><option value="0" selected>SELECT CROP</option><option value="1">VEGETABLE CROP</option>
                                 <option value="2">FIELD CROP</option><?php /*<option value="3">All CROP</option>*/ ?>		 
<?php }elseif($_REQUEST['grp']==1){ ?><option value="1" selected>VEGETABLE CROP</option><option value="2">FIELD CROP</option>
<?php }elseif($_REQUEST['grp']==2){ ?><option value="2" selected>FIELD CROP</option><option value="1">VEGETABLE CROP</option><?php } ?>
        </select>
		</td>
		<td>&nbsp;</td>
		<td style="font-size:11px;height:18px;width:80px;color:#E6E6E6;" align="right"><b>Name :</b></td>
	    <td><select style="font-size:12px;width:120px;height:20px;background-color:#DDFFBB;" name="ItemV" id="ItemV" onChange="ChangeII(this.value)">
<?php if($_REQUEST['ii']>0){ $sqlI=mysql_query("select ItemName from hrm_sales_seedsitem where ItemId=".$_REQUEST['ii'], $con); $resI=mysql_fetch_assoc($sqlI); ?>	
         <option value="<?php echo $_REQUEST['ii']; ?>" selected><?php echo strtoupper($resI['ItemName']); ?></option>
		 <?php }else{ ?><option value="0" selected>SELECT</option><?php } ?>
<?php if($_REQUEST['grp']==0){ $sqlItem=mysql_query("select * from hrm_sales_seedsitem order by ItemName ASC", $con);}
      elseif($_REQUEST['grp']==1){ $sqlItem=mysql_query("select * from hrm_sales_seedsitem where GroupId=1 order by ItemName ASC", $con);}
      elseif($_REQUEST['grp']==2){ $sqlItem=mysql_query("select * from hrm_sales_seedsitem where GroupId=2 order by ItemName ASC", $con);}
      //elseif($_REQUEST['grp']==3){ $sqlItem=mysql_query("select * from hrm_sales_seedsitem where (GroupId=1 OR GroupId=2) order by GroupId ASC,ItemName ASC", $con);}
	  while($resItem=mysql_fetch_assoc($sqlItem)){ ?><option value="<?php echo $resItem['ItemId']; ?>"><?php echo $resItem['ItemName']; ?></option><?php } ?></select>	  
		 </td>
		 <?php /*
		 <td>&nbsp;</td>
		 <td style="font-size:11px; height:18px;width:80px;color:#E6E6E6;" align="center"><a href="#" <?php //onClick="PrintSpR()" ?> style="color:#FFCE9D;"><b>PRINT</b></a></td>
		 */ ?>
	  </tr>
	   </table>
      </td>
   </tr>
  </table>
  </td>
  </tr>
  <tr>
    <td colspan="3" valign="top">
<?php if($_REQUEST['ii']>0 OR $_REQUEST['grp']>0){ 
$BeforeYId2=$_REQUEST['y']-2; $BeforeYId=$_REQUEST['y']-1; $AfterYId=$_REQUEST['y']+1; $AfterYId2=$_REQUEST['y']+2; 	
$sqlY1=mysql_query("select FromDate,ToDate from hrm_sales_year where YearId=".$BeforeYId2, $con); $resY1=mysql_fetch_assoc($sqlY1); 
$sqlY2=mysql_query("select FromDate,ToDate from hrm_sales_year where YearId=".$BeforeYId, $con); $resY2=mysql_fetch_assoc($sqlY2); 
$sqlY3=mysql_query("select FromDate,ToDate from hrm_sales_year where YearId=".$_REQUEST['y'], $con); $resY3=mysql_fetch_assoc($sqlY3); 
$sqlY4=mysql_query("select FromDate,ToDate from hrm_sales_year where YearId=".$AfterYId, $con); $resY4=mysql_fetch_assoc($sqlY4);
$sqlY5=mysql_query("select FromDate,ToDate from hrm_sales_year where YearId=".$AfterYId2, $con); $resY5=mysql_fetch_assoc($sqlY5);
$y1=date("y",strtotime($resY1['FromDate'])).'-'.date("y",strtotime($resY1['ToDate'])); $y1T='<font color="#A60053">Ach.</font>';
$y2=date("y",strtotime($resY2['FromDate'])).'-'.date("y",strtotime($resY2['ToDate'])); $y2T='<font color="#A60053">Ach.</font>';
$y3=date("Y",strtotime($resY3['FromDate'])).'-'.date("Y",strtotime($resY3['ToDate'])); $y3T='<font color="#A60053">Tgt.</font>';
$y4=date("Y",strtotime($resY4['FromDate'])).'-'.date("Y",strtotime($resY4['ToDate'])); $y4T='<font color="#A60053">Proj.</font>';
$y5=date("y",strtotime($resY5['FromDate'])).'-'.date("y",strtotime($resY5['ToDate'])); $y5T='<font color="#A60053">YTD.</font>';
$my1='<font color="#A60053">'.date("y",strtotime($resY3['FromDate'])).'</font>'; $my2='<font color="#A60053">'.date("y",strtotime($resY3['ToDate'])).'</font>';
$my11=date("Y",strtotime($resY3['FromDate'])); $my22=date("Y",strtotime($resY3['ToDate']));
?>  
<?php if($_REQUEST['ii']>0){$sqlI=mysql_query("select GroupId from hrm_sales_seedsitem where ItemId=".$_REQUEST['ii'],$con); $resI=mysql_fetch_array($sqlI);
        $sqlSe=mysql_query("select * from hrm_sales_season where GroupId=".$resI['GroupId'],$con); }
      elseif($_REQUEST['grp']==1 OR $_REQUEST['grp']==2){ $sql = mysql_query("select hrm_sales_seedsproduct.ItemId from hrm_sales_seedsproduct INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId where hrm_sales_seedsitem.GroupId=".$_REQUEST['grp'], $con);
	    $sqlSe=mysql_query("select * from hrm_sales_season where GroupId=".$_REQUEST['grp'],$con); } $rowSe=mysql_num_rows($sqlSe); $rowSpan=$rowSe*6;  ?>

<table border="1" cellpadding="0" cellspacing="0" style="font-family:Times New Roman;font-size:14px;width:<?php if($rowSe==5){echo 3200;}elseif($rowSe==4){echo 2950;}elseif($rowSe==3){echo 2700;}else{echo 2450;}?>px; vertical-align:top;">	
  <tr style="background-color:#D5F1D1;color:#000000;"> 
    <td colspan="<?php if($_REQUEST['ii']>0){ echo 2;}else{echo 3;}?>" align="center"><b>Details</b>&nbsp;<b>Year : <?php echo $y3; ?></b></td> 
    <td colspan="<?php echo $rowSpan; ?>" align="center" bgcolor="#898945" style="color:#FFFFFF;"><b>Details</b>&nbsp;<b>Year : <?php echo $y3; ?></b></td>
	<td rowspan="500" bgcolor="#FFFFFF" style="width:10px;">&nbsp;&nbsp;</td>
	<td colspan="<?php echo $rowSpan; ?>" align="center" bgcolor="#898945" style="color:#FFFFFF;"><b>Details</b>&nbsp;<b>Year : <?php echo $y4; ?></b></td>
 </tr>
   <tr style="background-color:#D5F1D1;color:#000000;">  
<?php if($_REQUEST['ii']==0){?><td rowspan="2" align="center" style="width:150px;"><b>CROP</b></td><?php } ?>
	<td rowspan="2" align="center" style="width:200px;"><b>VARIETY</b></td>
	<td rowspan="2" align="center" style="width:50px;"><b>&nbsp;TYPE&nbsp;</b></td>
<?php if($_REQUEST['ii']>0){$sqlI=mysql_query("select GroupId from hrm_sales_seedsitem where ItemId=".$_REQUEST['ii'],$con); $resI=mysql_fetch_array($sqlI);
        $sqlSe=mysql_query("select SeasonId,SeasonName from hrm_sales_season where GroupId=".$resI['GroupId'],$con); }
      elseif($_REQUEST['grp']==1 OR $_REQUEST['grp']==2){ $sql = mysql_query("select hrm_sales_seedsproduct.ItemId from hrm_sales_seedsproduct INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId where hrm_sales_seedsitem.GroupId=".$_REQUEST['grp'], $con);
	    $sqlSe=mysql_query("select SeasonId,SeasonName from hrm_sales_season where GroupId=".$_REQUEST['grp'],$con); } $rowSe=mysql_num_rows($sqlSe); 
		while($resSe=mysql_fetch_assoc($sqlSe)){ ?>  
	    <td colspan="2" class="field2" bgcolor="#7BCAF9"><?php echo $resSe['SeasonName']; ?></td>
	    <td rowspan="2" class="field">Estimate<br/>Req.</td><td rowspan="2" class="field">Buffer</td><td rowspan="2" class="field">Total<br/>Req.</td>
		<td rowspan="2" align="center" style="width:50px;"><b>&nbsp;Edit&nbsp;</b></td>
<?php } ?>  
<?php if($_REQUEST['ii']>0){$sqlI=mysql_query("select GroupId from hrm_sales_seedsitem where ItemId=".$_REQUEST['ii'],$con); $resI=mysql_fetch_array($sqlI);
        $sqlSe=mysql_query("select SeasonId,SeasonName from hrm_sales_season where GroupId=".$resI['GroupId'],$con); }
      elseif($_REQUEST['grp']==1 OR $_REQUEST['grp']==2){ $sql = mysql_query("select hrm_sales_seedsproduct.ItemId from hrm_sales_seedsproduct INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId where hrm_sales_seedsitem.GroupId=".$_REQUEST['grp'], $con);
	    $sqlSe=mysql_query("select SeasonId,SeasonName from hrm_sales_season where GroupId=".$_REQUEST['grp'],$con); } $rowSe=mysql_num_rows($sqlSe); 
		while($resSe=mysql_fetch_assoc($sqlSe)){ ?>  
	    <td colspan="2" class="field2" bgcolor="#7BCAF9"><?php echo $resSe['SeasonName']; ?></td>
	    <td rowspan="2" class="field">Estimate<br/>Req.</td><td rowspan="2" class="field">Buffer</td><td rowspan="2" class="field">Total<br/>Req.</td>
		<td rowspan="2" align="center" style="width:50px;"><b>&nbsp;Edit&nbsp;</b></td>
<?php } ?>  

  </tr>	
  <tr style="background-color:#D5F1D1;color:#000000;">
<?php if($_REQUEST['ii']>0){$sqlI=mysql_query("select GroupId from hrm_sales_seedsitem where ItemId=".$_REQUEST['ii'],$con); $resI=mysql_fetch_array($sqlI);
        $sqlSe=mysql_query("select SeasonId,SeasonName from hrm_sales_season where GroupId=".$resI['GroupId'],$con); }
      elseif($_REQUEST['grp']==1 OR $_REQUEST['grp']==2){ $sql = mysql_query("select hrm_sales_seedsproduct.ItemId from hrm_sales_seedsproduct INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId where hrm_sales_seedsitem.GroupId=".$_REQUEST['grp'], $con);
	    $sqlSe=mysql_query("select SeasonId,SeasonName from hrm_sales_season where GroupId=".$_REQUEST['grp'],$con); } $rowSe=mysql_num_rows($sqlSe); 
		while($resSe=mysql_fetch_assoc($sqlSe)){ ?>  
	    <td class="field3">Month</td><td class="field3">Year</td>
<?php } ?>   
<?php if($_REQUEST['ii']>0){$sqlI=mysql_query("select GroupId from hrm_sales_seedsitem where ItemId=".$_REQUEST['ii'],$con); $resI=mysql_fetch_array($sqlI);
        $sqlSe=mysql_query("select SeasonId,SeasonName from hrm_sales_season where GroupId=".$resI['GroupId'],$con); }
      elseif($_REQUEST['grp']==1 OR $_REQUEST['grp']==2){ $sql = mysql_query("select hrm_sales_seedsproduct.ItemId from hrm_sales_seedsproduct INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId where hrm_sales_seedsitem.GroupId=".$_REQUEST['grp'], $con);
	    $sqlSe=mysql_query("select SeasonId,SeasonName from hrm_sales_season where GroupId=".$_REQUEST['grp'],$con); } $rowSe=mysql_num_rows($sqlSe); 
		while($resSe=mysql_fetch_assoc($sqlSe)){ ?>  
	    <td class="field3">Month</td><td class="field3">Year</td>
<?php } ?>   

  </tr>	
 <?php if($_REQUEST['ii']>0){$sql = mysql_query("select hrm_sales_seedsproduct.ItemId,ProductId,ProductName,ItemName,TypeName from hrm_sales_seedsproduct INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId INNER JOIN hrm_sales_seedtype ON hrm_sales_seedsproduct.TypeId=hrm_sales_seedtype.TypeId where hrm_sales_seedsitem.ItemId=".$_REQUEST['ii']." order by ItemName ASC, TypeName ASC, ProductName ASC", $con); }
      elseif($_REQUEST['grp']==1 OR $_REQUEST['grp']==2)
	  { $sql = mysql_query("select hrm_sales_seedsproduct.ItemId,ProductId,ProductName,ItemName,TypeName from hrm_sales_seedsproduct INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId INNER JOIN hrm_sales_seedtype ON hrm_sales_seedsproduct.TypeId=hrm_sales_seedtype.TypeId where hrm_sales_seedsitem.GroupId=".$_REQUEST['grp']." order by ItemName ASC, TypeName ASC, ProductName ASC", $con);
	  } 
	  if($_REQUEST['grp']==0){$sqlI=mysql_query("select GroupId from hrm_sales_seedsitem where ItemId=".$_REQUEST['ii'], $con); $resI=mysql_fetch_array($sqlI);
	  $sqlSe=mysql_query("select SeasonId from hrm_sales_season where GroupId=".$resI['GroupId'], $con); }
	  else{$sqlSe=mysql_query("select SeasonId from hrm_sales_season where GroupId=".$_REQUEST['grp'], $con);}
	  //$sqlSe=mysql_query("select SeasonId from hrm_sales_season where GroupId=1",$con);
	   $rowSe=mysql_num_rows($sqlSe);  $Sn=1; while($res=mysql_fetch_array($sql)){ ?>  
   <tr bgcolor="#FFFFFF" style="height:22px;background-color:#E2F3D8;">  
<?php if($_REQUEST['ii']==0){?><td bgcolor="<?php echo '#B8E29C';?>">&nbsp;<?php echo $res['ItemName']; ?></td><?php } ?> 
     <td bgcolor="<?php echo '#B8E29C';?>">&nbsp;<?php echo $res['ProductName']; ?></td>
     <td bgcolor="<?php echo '#B8E29C';?>" align="center">&nbsp;<?php echo substr_replace($res['TypeName'],'',2);?></td> 
	  
<?php /*********************** 11111111111111111111111111111111111111111 ************************************/ ?>	  

<?php $sqlI22=mysql_query("select GroupId from hrm_sales_seedsitem where ItemId=".$res['ItemId'],$con); $resI22=mysql_fetch_array($sqlI22);
      $sqlSe22=mysql_query("select SeasonId from hrm_sales_season where GroupId=".$resI22['GroupId'],$con); 
	  while($resSe22=mysql_fetch_assoc($sqlSe22)){
/*******************  for Month/Year Start ***********************/ 
    $sqlTest=mysql_query("select LM,LY from hrm_sales_product_month_activity where ProductID=".$res['ProductId']." AND SeasonId=".$resSe22['SeasonId'], $con);
	$testrows=mysql_num_rows($sqlTest); $test=mysql_fetch_array($sqlTest);
	$resY=mysql_fetch_assoc(mysql_query("select FromDate from hrm_sales_year where YearId=".$_REQUEST['y'], $con)); $Y=date("Y",strtotime($resY['FromDate']));
	$LastM=$test['LM']; $LastY=date("Y",strtotime($resY['FromDate']))+$test['LY'];
	if($LastM==1){$M='Jan';}elseif($LastM==2){$M='Feb';}elseif($LastM==3){$M='Mar';}elseif($LastM==4){$M='Apr';}elseif($LastM==5){$M='May';}elseif($LastM==6){$M='Jun';}
	elseif($LastM==7){$M='Jul';}elseif($LastM==8){$M='Aug';}elseif($LastM==9){$M='Sep';}elseif($LastM==10){$M='Oct';}elseif($LastM==11){$M='Nov';}elseif($LastM==12){$M='Dec';}
	if($testrows>0 AND $LastM>0){echo '<td align="center" bgcolor="#FFFFAA">'.$M.'</td>'; }else {echo '<td align="center" bgcolor="#FFFFAA">&nbsp;</td>';} 
    if($testrows>0 AND $LastY>0){echo '<td align="center" bgcolor="#FFFFAA">'.$LastY.'</td>'; }else {echo '<td align="center" bgcolor="#FFFFAA">&nbsp;</td>';}
/*******************  for Month/Year Close ***********************/ 
$sChk=mysql_query("select * from hrm_sales_product_month_activity where ProductID=".$res['ProductId'], $con); $rowChk=mysql_num_rows($sChk);
if($rowChk==0){echo '<td align="right">&nbsp;</td>'; echo '<td align="right">&nbsp;</td>'; echo '<td align="right">&nbsp;</td>'; }
elseif($rowChk==1)
{
 if($test['LY']==0){$Qm=$test['LM']; $Qy=$Y; $Qm2=$test['LM']; $Qy2=$Y+1;}
 elseif($test['LY']==1){$Qm=$test['LM']; $Qy=$Y+1; $Qm2=$test['LM']; $Qy2=$Y+2;}
 elseif($test['LY']==2){$Qm=$test['LM']; $Qy=$Y+2; $Qm2=$test['LM']; $Qy2=$Y+4;}
 else{$Qm=0; $Qm2=0; $Qy=0; $Qy2=0;}
 $Q=$Qy2-$Qy;
 include("ProdPlanCalReq.php");
 if($testrows>0){ ?><td align="right" bgcolor="<?php if($Tot>0){ echo '#FF80FF'; } ?>">
 <?php echo $Tot; ?>&nbsp;<input type="hidden" id="StmtReq_<?php echo $Sn.'_'.$resSe22['SeasonId']; ?>" value="<?php if($Tot>0){echo $Tot;}else{echo 0;} ?>" /></td>
 <?php  $sqlrec=mysql_query("select Buffer from hrm_sales_product_plan where ProductId=".$res['ProductId']." AND SeasonId=".$resSe22['SeasonId']." AND M=".$LastM." AND Y=".$LastY, $con); $rowrec=mysql_num_rows($sqlrec); $resrec=mysql_fetch_assoc($sqlrec);  if($resrec['Buffer']!=''){$Buff=$resrec['Buffer'];}else{$Buff=0;} $Total=$Tot+$Buff; ?>  
  <td align="center"><input id="Buff_<?php echo $Sn.'_'.$resSe22['SeasonId']; ?>" value="<?php if($Buff>0){echo $Buff; }else{ echo 0;} ?>" onChange="FunCalcy(this.value,<?php echo $Sn.', '.$resSe22['SeasonId']; ?>)" onKeyUp="FunCalcy(this.value,<?php echo $Sn.', '.$resSe22['SeasonId']; ?>)" onBlur="FunCalcy(this.value,<?php echo $Sn.', '.$resSe22['SeasonId']; ?>)" class="InputRec" readonly style="background-color:<?php if($rowrec>0){echo '#FFCCFF'; } ?>;"/></td> 
  <td align="center"><input id="TotReq_<?php echo $Sn.'_'.$resSe22['SeasonId']; ?>" value="<?php if($Total>0){echo $Total; } ?>" class="InputRec" readonly /></td>

 <?php }else{ ?><td align="center">&nbsp;</td><td align="center">&nbsp;</td><td align="center">&nbsp;</td><?php } ?>
   
<?php }
elseif($rowChk==2)
{ $s=mysql_query("select LM,LY from hrm_sales_product_month_activity where ProductID=".$res['ProductId']." AND SeasonId!=".$resSe22['SeasonId'], $con);
  $r=mysql_fetch_array($s);
  if($test['LY']==0 AND $r['LY']==0)
  {   
    if($test['LM']>$r['LM']){$Qm=$test['LM']; $Qm2=$r['LM']; $Qy=$Y; $Qy2=$Y+1; }
	elseif($test['LM']<$r['LM']){$Qm=$test['LM']; $Qm2=$r['LM']; $Qy=$Y; $Qy2=$Y;}
    elseif($test['LM']==$r['LM']){$Qm=$test['LM']; $Qm2=$r['LM']; $Qy=$Y; $Qy2=$Y; }
  }
  elseif($test['LY']==0 AND $r['LY']==1){ $Qm=$test['LM']; $Qm2=$r['LM']; $Qy=$Y; $Qy2=$Y+1;}
  elseif($test['LY']==1 AND $r['LY']==0){ $Qm=$test['LM']; $Qm2=$r['LM']; $Qy=$Y+1; $Qy2=$Y+1;}
  elseif($test['LY']==1 AND $r['LY']==1)
  { 
    if($test['LM']>$r['LM']){$Qm=$test['LM']; $Qm2=$r['LM']; $Qy=$Y+1; $Qy2=$Y+2; }
	elseif($test['LM']<$r['LM']){$Qm=$test['LM']; $Qm2=$r['LM']; $Qy=$Y+1; $Qy2=$Y+1;}
    elseif($test['LM']==$r['LM']){$Qm=$test['LM']; $Qm2=$r['LM']; $Qy=$Y+1; $Qy2=$Y+2; }
  }   
  elseif($test['LY']==0 AND $r['LY']==2){ $Qm=$test['LM']; $Qm2=$r['LM']; $Qy=$Y; $Qy2=$Y+2;}
  elseif($test['LY']==2 AND $r['LY']==0){ $Qm=$test['LM']; $Qm2=$r['LM']; $Qy=$Y+2; $Qy2=$Y+2;}
  elseif($test['LY']==1 AND $r['LY']==2){ $Qm=$test['LM']; $Qm2=$r['LM']; $Qy=$Y+1; $Qy2=$Y+2;}
  elseif($test['LY']==2 AND $r['LY']==1){ $Qm=$test['LM']; $Qm2=$r['LM']; $Qy=$Y+2; $Qy2=$Y+3;}
  elseif($test['LY']==2 AND $r['LY']==2)
  { 
    if($test['LM']>$r['LM']){$Qm=$test['LM']; $Qm2=$r['LM']; $Qy=$Y+2; $Qy2=$Y+3; }
	elseif($test['LM']<$r['LM']){$Qm=$test['LM']; $Qm2=$r['LM']; $Qy=$Y+2; $Qy2=$Y+2;}
    elseif($test['LM']==$r['LM']){$Qm=$test['LM']; $Qm2=$r['LM']; $Qy=$Y+2; $Qy2=$Y+4; }
  }
  else {$Qm=0; $Qm2=0; $Qy=0; $Qy2=0;}
  $Q=$Qy2-$Qy;
  include("ProdPlanCalReq.php");
  if($testrows>0){ ?><td align="right" bgcolor="<?php if($Tot>0){ echo '#FF80FF'; } ?>">
  <?php echo $Tot; ?>&nbsp;<input type="hidden" id="StmtReq_<?php echo $Sn.'_'.$resSe22['SeasonId']; ?>" value="<?php if($Tot>0){echo $Tot;}else{echo 0;} ?>" /></td>
  <?php $sqlrec=mysql_query("select Buffer from hrm_sales_product_plan where ProductId=".$res['ProductId']." AND SeasonId=".$resSe22['SeasonId']." AND M=".$LastM." AND Y=".$LastY, $con); $rowrec=mysql_num_rows($sqlrec);  $resrec=mysql_fetch_assoc($sqlrec); if($resrec['Buffer']!=''){$Buff=$resrec['Buffer'];}else{$Buff=0;} $Total=$Tot+$Buff; ?>  
  <td align="center"><input id="Buff_<?php echo $Sn.'_'.$resSe22['SeasonId']; ?>" value="<?php if($Buff>0){echo $Buff; }else{ echo 0;} ?>" onChange="FunCalcy(this.value,<?php echo $Sn.', '.$resSe22['SeasonId']; ?>)" onKeyUp="FunCalcy(this.value,<?php echo $Sn.', '.$resSe22['SeasonId']; ?>)" onBlur="FunCalcy(this.value,<?php echo $Sn.', '.$resSe22['SeasonId']; ?>)" class="InputRec" readonly style="background-color:<?php if($rowrec>0){echo '#FFCCFF'; } ?>;"/></td> 
  <td align="center"><input id="TotReq_<?php echo $Sn.'_'.$resSe22['SeasonId']; ?>" value="<?php if($Total>0){echo $Total; } ?>" class="InputRec" readonly /></td>

  <?php }else{ ?><td align="center">&nbsp;</td><td align="center">&nbsp;</td><td align="center">&nbsp;</td><?php } ?>
   
<?php }
elseif($rowChk==3)
{ $LY=$test['LY']; $LY2=$test['LY']+1; $LY3=$test['LY']+2; $LY4=$test['LY']+3; $LY5=$test['LY']+4; $LY6=$test['LY']+5;
  $s0=mysql_query("select LM,LY from hrm_sales_product_month_activity where ProductID=".$res['ProductId']." AND SeasonId!=".$resSe22['SeasonId']." AND LY=".$LY, $con);
  $s1=mysql_query("select LM,LY from hrm_sales_product_month_activity where ProductID=".$res['ProductId']." AND SeasonId!=".$resSe22['SeasonId']." AND LY=".$LY2, $con);
  $s2=mysql_query("select LM,LY from hrm_sales_product_month_activity where ProductID=".$res['ProductId']." AND SeasonId!=".$resSe22['SeasonId']." AND LY=".$LY3, $con);
  $s3=mysql_query("select LM,LY from hrm_sales_product_month_activity where ProductID=".$res['ProductId']." AND SeasonId!=".$resSe22['SeasonId']." AND LY=".$LY4, $con);
  $s4=mysql_query("select LM,LY from hrm_sales_product_month_activity where ProductID=".$res['ProductId']." AND SeasonId!=".$resSe22['SeasonId']." AND LY=".$LY5, $con);
  $s5=mysql_query("select LM,LY from hrm_sales_product_month_activity where ProductID=".$res['ProductId']." AND SeasonId!=".$resSe22['SeasonId']." AND LY=".$LY6, $con);
  $rw0=mysql_num_rows($s0); $rw1=mysql_num_rows($s1); $rw2=mysql_num_rows($s2); $rw3=mysql_num_rows($s3); $rw4=mysql_num_rows($s4); $rw5=mysql_num_rows($s5);
  if($rw0==1){$r=mysql_fetch_array($s0);}elseif($rw1==1){$r=mysql_fetch_array($s1);}elseif($rw2==1){$r=mysql_fetch_array($s2);}elseif($rw3==1){$r=mysql_fetch_array($s3);}
  elseif($rw4==1){$r=mysql_fetch_array($s4);}elseif($rw5==1){$r=mysql_fetch_array($s5);}
  
  if($test['LY']==0 AND $r['LY']==0)
  {   
    if($test['LM']>$r['LM']){$Qm=$test['LM']; $Qm2=$r['LM']; $Qy=$Y; $Qy2=$Y+1; }
	elseif($test['LM']<$r['LM']){$Qm=$test['LM']; $Qm2=$r['LM']; $Qy=$Y; $Qy2=$Y;}
    elseif($test['LM']==$r['LM']){$Qm=$test['LM']; $Qm2=$r['LM']; $Qy=$Y; $Qy2=$Y; }
  }
  elseif($test['LY']==0 AND $r['LY']==1){ $Qm=$test['LM']; $Qm2=$r['LM']; $Qy=$Y; $Qy2=$Y+1;}
  elseif($test['LY']==1 AND $r['LY']==0){ $Qm=$test['LM']; $Qm2=$r['LM']; $Qy=$Y+1; $Qy2=$Y+1;}
  elseif($test['LY']==1 AND $r['LY']==1)
  { 
    if($test['LM']>$r['LM']){$Qm=$test['LM']; $Qm2=$r['LM']; $Qy=$Y+1; $Qy2=$Y+2; }
	elseif($test['LM']<$r['LM']){$Qm=$test['LM']; $Qm2=$r['LM']; $Qy=$Y+1; $Qy2=$Y+1;}
    elseif($test['LM']==$r['LM']){$Qm=$test['LM']; $Qm2=$r['LM']; $Qy=$Y+1; $Qy2=$Y+2; }
  }   
  elseif($test['LY']==0 AND $r['LY']==2){ $Qm=$test['LM']; $Qm2=$r['LM']; $Qy=$Y; $Qy2=$Y+2;}
  elseif($test['LY']==2 AND $r['LY']==0){ $Qm=$test['LM']; $Qm2=$r['LM']; $Qy=$Y+2; $Qy2=$Y+2;}
  elseif($test['LY']==1 AND $r['LY']==2){ $Qm=$test['LM']; $Qm2=$r['LM']; $Qy=$Y+1; $Qy2=$Y+2;}
  elseif($test['LY']==2 AND $r['LY']==1){ $Qm=$test['LM']; $Qm2=$r['LM']; $Qy=$Y+2; $Qy2=$Y+3;}
  elseif($test['LY']==2 AND $r['LY']==2)
  { 
    if($test['LM']>$r['LM']){$Qm=$test['LM']; $Qm2=$r['LM']; $Qy=$Y+2; $Qy2=$Y+3; }
	elseif($test['LM']<$r['LM']){$Qm=$test['LM']; $Qm2=$r['LM']; $Qy=$Y+2; $Qy2=$Y+2;}
    elseif($test['LM']==$r['LM']){$Qm=$test['LM']; $Qm2=$r['LM']; $Qy=$Y+2; $Qy2=$Y+4; }
  }
  elseif($test['LY']==0 AND $r['LY']==3){ $Qm=$test['LM']; $Qm2=$r['LM']; $Qy=$Y; $Qy2=$Y+3;}
  elseif($test['LY']==3 AND $r['LY']==0){ $Qm=$test['LM']; $Qm2=$r['LM']; $Qy=$Y+3; $Qy2=$Y+3;}
  elseif($test['LY']==1 AND $r['LY']==3){ $Qm=$test['LM']; $Qm2=$r['LM']; $Qy=$Y+1; $Qy2=$Y+3;}
  elseif($test['LY']==3 AND $r['LY']==1){ $Qm=$test['LM']; $Qm2=$r['LM']; $Qy=$Y+3; $Qy2=$Y+4;}
  elseif($test['LY']==2 AND $r['LY']==3){ $Qm=$test['LM']; $Qm2=$r['LM']; $Qy=$Y+2; $Qy2=$Y+3;}
  elseif($test['LY']==3 AND $r['LY']==2){ $Qm=$test['LM']; $Qm2=$r['LM']; $Qy=$Y+3; $Qy2=$Y+4;}
  elseif($test['LY']==3 AND $r['LY']==3)
  { 
    if($test['LM']>$r['LM']){$Qm=$test['LM']; $Qm2=$r['LM']; $Qy=$Y+3; $Qy2=$Y+4; }
	elseif($test['LM']<$r['LM']){$Qm=$test['LM']; $Qm2=$r['LM']; $Qy=$Y+3; $Qy2=$Y+3;}
    elseif($test['LM']==$r['LM']){$Qm=$test['LM']; $Qm2=$r['LM']; $Qy=$Y+3; $Qy2=$Y+6; }
  }
  else {$Qm=0; $Qm2=0; $Qy=0; $Qy2=0;}
  $Q=$Qy2-$Qy;
  include("ProdPlanCalReq.php");
  if($testrows>0){ ?><td align="right" bgcolor="<?php if($Tot>0){ echo '#FF80FF'; } ?>">
  <?php echo $Tot; ?>&nbsp;<input type="hidden" id="StmtReq_<?php echo $Sn.'_'.$resSe22['SeasonId']; ?>" value="<?php if($Tot>0){echo $Tot;}else{echo 0;} ?>" /></td>
  <?php $sqlrec=mysql_query("select Buffer from hrm_sales_product_plan where ProductId=".$res['ProductId']." AND SeasonId=".$resSe22['SeasonId']." AND M=".$LastM." AND Y=".$LastY, $con); $rowrec=mysql_num_rows($sqlrec); $resrec=mysql_fetch_assoc($sqlrec);  if($resrec['Buffer']!=''){$Buff=$resrec['Buffer'];}else{$Buff=0;} $Total=$Tot+$Buff; ?>  
  <td align="center"><input id="Buff_<?php echo $Sn.'_'.$resSe22['SeasonId']; ?>" value="<?php if($Buff>0){echo $Buff; }else{ echo 0;} ?>" onChange="FunCalcy(this.value,<?php echo $Sn.', '.$resSe22['SeasonId']; ?>)" onKeyUp="FunCalcy(this.value,<?php echo $Sn.', '.$resSe22['SeasonId']; ?>)" onBlur="FunCalcy(this.value,<?php echo $Sn.', '.$resSe22['SeasonId']; ?>)" class="InputRec" readonly style="background-color:<?php if($rowrec>0){echo '#FFCCFF'; } ?>;"/></td> 
  <td align="center"><input id="TotReq_<?php echo $Sn.'_'.$resSe22['SeasonId']; ?>" value="<?php if($Total>0){echo $Total; } ?>" class="InputRec" readonly /></td>

  <?php }else{ ?><td align="center">&nbsp;</td><td align="center">&nbsp;</td><td align="center">&nbsp;</td><?php } ?>
   
<?php }
elseif($rowChk==4)
{ 
  $LY=$test['LY']; $LY2=$test['LY']+1; $LY3=$test['LY']+2; $LY4=$test['LY']+3; $LY5=$test['LY']+4; $LY6=$test['LY']+5;
  $s0=mysql_query("select LM,LY from hrm_sales_product_month_activity where ProductID=".$res['ProductId']." AND SeasonId!=".$resSe22['SeasonId']." AND LY=".$LY, $con);
  $s1=mysql_query("select LM,LY from hrm_sales_product_month_activity where ProductID=".$res['ProductId']." AND SeasonId!=".$resSe22['SeasonId']." AND LY=".$LY2, $con);
  $s2=mysql_query("select LM,LY from hrm_sales_product_month_activity where ProductID=".$res['ProductId']." AND SeasonId!=".$resSe22['SeasonId']." AND LY=".$LY3, $con);
  $s3=mysql_query("select LM,LY from hrm_sales_product_month_activity where ProductID=".$res['ProductId']." AND SeasonId!=".$resSe22['SeasonId']." AND LY=".$LY4, $con);
  $s4=mysql_query("select LM,LY from hrm_sales_product_month_activity where ProductID=".$res['ProductId']." AND SeasonId!=".$resSe22['SeasonId']." AND LY=".$LY5, $con);
  $s5=mysql_query("select LM,LY from hrm_sales_product_month_activity where ProductID=".$res['ProductId']." AND SeasonId!=".$resSe22['SeasonId']." AND LY=".$LY6, $con);
  $rw0=mysql_num_rows($s0); $rw1=mysql_num_rows($s1); $rw2=mysql_num_rows($s2); $rw3=mysql_num_rows($s3); $rw4=mysql_num_rows($s4); $rw5=mysql_num_rows($s5);
  if($rw0==1){$r=mysql_fetch_array($s0);}elseif($rw1==1){$r=mysql_fetch_array($s1);}elseif($rw2==1){$r=mysql_fetch_array($s2);}elseif($rw3==1){$r=mysql_fetch_array($s3);}
  elseif($rw4==1){$r=mysql_fetch_array($s4);}elseif($rw5==1){$r=mysql_fetch_array($s5);}
  
  if($test['LY']==0 AND $r['LY']==0)
  {   
    if($test['LM']>$r['LM']){$Qm=$test['LM']; $Qm2=$r['LM']; $Qy=$Y; $Qy2=$Y+1; }
	elseif($test['LM']<$r['LM']){$Qm=$test['LM']; $Qm2=$r['LM']; $Qy=$Y; $Qy2=$Y;}
    elseif($test['LM']==$r['LM']){$Qm=$test['LM']; $Qm2=$r['LM']; $Qy=$Y; $Qy2=$Y; }
  }
  elseif($test['LY']==0 AND $r['LY']==1){ $Qm=$test['LM']; $Qm2=$r['LM']; $Qy=$Y; $Qy2=$Y+1;}
  elseif($test['LY']==1 AND $r['LY']==0){ $Qm=$test['LM']; $Qm2=$r['LM']; $Qy=$Y+1; $Qy2=$Y+1;}
  elseif($test['LY']==1 AND $r['LY']==1)
  { 
    if($test['LM']>$r['LM']){$Qm=$test['LM']; $Qm2=$r['LM']; $Qy=$Y+1; $Qy2=$Y+2; }
	elseif($test['LM']<$r['LM']){$Qm=$test['LM']; $Qm2=$r['LM']; $Qy=$Y+1; $Qy2=$Y+1;}
    elseif($test['LM']==$r['LM']){$Qm=$test['LM']; $Qm2=$r['LM']; $Qy=$Y+1; $Qy2=$Y+2; }
  }   
  elseif($test['LY']==0 AND $r['LY']==2){ $Qm=$test['LM']; $Qm2=$r['LM']; $Qy=$Y; $Qy2=$Y+2;}
  elseif($test['LY']==2 AND $r['LY']==0){ $Qm=$test['LM']; $Qm2=$r['LM']; $Qy=$Y+2; $Qy2=$Y+2;}
  elseif($test['LY']==1 AND $r['LY']==2){ $Qm=$test['LM']; $Qm2=$r['LM']; $Qy=$Y+1; $Qy2=$Y+2;}
  elseif($test['LY']==2 AND $r['LY']==1){ $Qm=$test['LM']; $Qm2=$r['LM']; $Qy=$Y+2; $Qy2=$Y+3;}
  elseif($test['LY']==2 AND $r['LY']==2)
  { 
    if($test['LM']>$r['LM']){$Qm=$test['LM']; $Qm2=$r['LM']; $Qy=$Y+2; $Qy2=$Y+3; }
	elseif($test['LM']<$r['LM']){$Qm=$test['LM']; $Qm2=$r['LM']; $Qy=$Y+2; $Qy2=$Y+2;}
    elseif($test['LM']==$r['LM']){$Qm=$test['LM']; $Qm2=$r['LM']; $Qy=$Y+2; $Qy2=$Y+4; }
  }
  elseif($test['LY']==0 AND $r['LY']==3){ $Qm=$test['LM']; $Qm2=$r['LM']; $Qy=$Y; $Qy2=$Y+3;}
  elseif($test['LY']==3 AND $r['LY']==0){ $Qm=$test['LM']; $Qm2=$r['LM']; $Qy=$Y+3; $Qy2=$Y+3;}
  elseif($test['LY']==1 AND $r['LY']==3){ $Qm=$test['LM']; $Qm2=$r['LM']; $Qy=$Y+1; $Qy2=$Y+3;}
  elseif($test['LY']==3 AND $r['LY']==1){ $Qm=$test['LM']; $Qm2=$r['LM']; $Qy=$Y+3; $Qy2=$Y+4;}
  elseif($test['LY']==2 AND $r['LY']==3){ $Qm=$test['LM']; $Qm2=$r['LM']; $Qy=$Y+2; $Qy2=$Y+3;}
  elseif($test['LY']==3 AND $r['LY']==2){ $Qm=$test['LM']; $Qm2=$r['LM']; $Qy=$Y+3; $Qy2=$Y+4;}
  elseif($test['LY']==3 AND $r['LY']==3)
  { 
    if($test['LM']>$r['LM']){$Qm=$test['LM']; $Qm2=$r['LM']; $Qy=$Y+3; $Qy2=$Y+4; }
	elseif($test['LM']<$r['LM']){$Qm=$test['LM']; $Qm2=$r['LM']; $Qy=$Y+3; $Qy2=$Y+3;}
    elseif($test['LM']==$r['LM']){$Qm=$test['LM']; $Qm2=$r['LM']; $Qy=$Y+3; $Qy2=$Y+6; }
  }
  elseif($test['LY']==0 AND $r['LY']==4){ $Qm=$test['LM']; $Qm2=$r['LM']; $Qy=$Y; $Qy2=$Y+4;}
  elseif($test['LY']==4 AND $r['LY']==0){ $Qm=$test['LM']; $Qm2=$r['LM']; $Qy=$Y+4; $Qy2=$Y+4;}
  elseif($test['LY']==1 AND $r['LY']==4){ $Qm=$test['LM']; $Qm2=$r['LM']; $Qy=$Y+1; $Qy2=$Y+4;}
  elseif($test['LY']==4 AND $r['LY']==1){ $Qm=$test['LM']; $Qm2=$r['LM']; $Qy=$Y+4; $Qy2=$Y+5;}
  elseif($test['LY']==2 AND $r['LY']==4){ $Qm=$test['LM']; $Qm2=$r['LM']; $Qy=$Y+2; $Qy2=$Y+4;}
  elseif($test['LY']==4 AND $r['LY']==2){ $Qm=$test['LM']; $Qm2=$r['LM']; $Qy=$Y+4; $Qy2=$Y+5;}
  elseif($test['LY']==3 AND $r['LY']==4){ $Qm=$test['LM']; $Qm2=$r['LM']; $Qy=$Y+3; $Qy2=$Y+4;}
  elseif($test['LY']==4 AND $r['LY']==3){ $Qm=$test['LM']; $Qm2=$r['LM']; $Qy=$Y+4; $Qy2=$Y+5;}
  elseif($test['LY']==4 AND $r['LY']==4)
  { 
    if($test['LM']>$r['LM']){$Qm=$test['LM']; $Qm2=$r['LM']; $Qy=$Y+4; $Qy2=$Y+5; }
	elseif($test['LM']<$r['LM']){$Qm=$test['LM']; $Qm2=$r['LM']; $Qy=$Y+4; $Qy2=$Y+4;}
    elseif($test['LM']==$r['LM']){$Qm=$test['LM']; $Qm2=$r['LM']; $Qy=$Y+4; $Qy2=$Y+8; }
  }
  else {$Qm=0; $Qm2=0; $Qy=0; $Qy2=0;}
  $Q=$Qy2-$Qy;
  include("ProdPlanCalReq.php");
  if($testrows>0){ ?><td align="right" bgcolor="<?php if($Tot>0){ echo '#FF80FF'; } ?>">
  <?php echo $Tot; ?>&nbsp;<input type="hidden" id="StmtReq_<?php echo $Sn.'_'.$resSe22['SeasonId']; ?>" value="<?php if($Tot>0){echo $Tot;}else{echo 0;} ?>" /></td>
  <?php $sqlrec=mysql_query("select Buffer from hrm_sales_product_plan where ProductId=".$res['ProductId']." AND SeasonId=".$resSe22['SeasonId']." AND M=".$LastM." AND Y=".$LastY, $con); $rowrec=mysql_num_rows($sqlrec); $resrec=mysql_fetch_assoc($sqlrec);  if($resrec['Buffer']!=''){$Buff=$resrec['Buffer'];}else{$Buff=0;} $Total=$Tot+$Buff; ?>  
  <td align="center"><input id="Buff_<?php echo $Sn.'_'.$resSe22['SeasonId']; ?>" value="<?php if($Buff>0){echo $Buff; }else{ echo 0;} ?>" onChange="FunCalcy(this.value,<?php echo $Sn.', '.$resSe22['SeasonId']; ?>)" onKeyUp="FunCalcy(this.value,<?php echo $Sn.', '.$resSe22['SeasonId']; ?>)" onBlur="FunCalcy(this.value,<?php echo $Sn.', '.$resSe22['SeasonId']; ?>)" class="InputRec" readonly style="background-color:<?php if($rowrec>0){echo '#FFCCFF'; } ?>;"/></td> 
  <td align="center"><input id="TotReq_<?php echo $Sn.'_'.$resSe22['SeasonId']; ?>" value="<?php if($Total>0){echo $Total; } ?>" class="InputRec" readonly /></td>

  <?php }else{ ?><td align="center">&nbsp;</td><td align="center">&nbsp;</td><td align="center">&nbsp;</td><?php } ?>
   
<?php }
  
elseif($rowChk==5)
{ $LY=$test['LY']; $LY2=$test['LY']+1; $LY3=$test['LY']+2; $LY4=$test['LY']+3; $LY5=$test['LY']+4; $LY6=$test['LY']+5;
  $s0=mysql_query("select LM,LY from hrm_sales_product_month_activity where ProductID=".$res['ProductId']." AND SeasonId!=".$resSe22['SeasonId']." AND LY=".$LY, $con);
  $s1=mysql_query("select LM,LY from hrm_sales_product_month_activity where ProductID=".$res['ProductId']." AND SeasonId!=".$resSe22['SeasonId']." AND LY=".$LY2, $con);
  $s2=mysql_query("select LM,LY from hrm_sales_product_month_activity where ProductID=".$res['ProductId']." AND SeasonId!=".$resSe22['SeasonId']." AND LY=".$LY3, $con);
  $s3=mysql_query("select LM,LY from hrm_sales_product_month_activity where ProductID=".$res['ProductId']." AND SeasonId!=".$resSe22['SeasonId']." AND LY=".$LY4, $con);
  $s4=mysql_query("select LM,LY from hrm_sales_product_month_activity where ProductID=".$res['ProductId']." AND SeasonId!=".$resSe22['SeasonId']." AND LY=".$LY5, $con);
  $s5=mysql_query("select LM,LY from hrm_sales_product_month_activity where ProductID=".$res['ProductId']." AND SeasonId!=".$resSe22['SeasonId']." AND LY=".$LY6, $con);
  $rw0=mysql_num_rows($s0); $rw1=mysql_num_rows($s1); $rw2=mysql_num_rows($s2); $rw3=mysql_num_rows($s3); $rw4=mysql_num_rows($s4); $rw5=mysql_num_rows($s5);
  if($rw0==1){$r=mysql_fetch_array($s0);}elseif($rw1==1){$r=mysql_fetch_array($s1);}elseif($rw2==1){$r=mysql_fetch_array($s2);}elseif($rw3==1){$r=mysql_fetch_array($s3);}
  elseif($rw4==1){$r=mysql_fetch_array($s4);}elseif($rw5==1){$r=mysql_fetch_array($s5);}

  if($test['LY']==0 AND $r['LY']==0)
  {   
    if($test['LM']>$r['LM']){$Qm=$test['LM']; $Qm2=$r['LM']; $Qy=$Y; $Qy2=$Y+1; }
	elseif($test['LM']<$r['LM']){$Qm=$test['LM']; $Qm2=$r['LM']; $Qy=$Y; $Qy2=$Y;}
    elseif($test['LM']==$r['LM']){$Qm=$test['LM']; $Qm2=$r['LM']; $Qy=$Y; $Qy2=$Y; }
  }
  elseif($test['LY']==0 AND $r['LY']==1){ $Qm=$test['LM']; $Qm2=$r['LM']; $Qy=$Y; $Qy2=$Y+1;}
  elseif($test['LY']==1 AND $r['LY']==0){ $Qm=$test['LM']; $Qm2=$r['LM']; $Qy=$Y+1; $Qy2=$Y+1;}
  elseif($test['LY']==1 AND $r['LY']==1)
  { 
    if($test['LM']>$r['LM']){$Qm=$test['LM']; $Qm2=$r['LM']; $Qy=$Y+1; $Qy2=$Y+2; }
	elseif($test['LM']<$r['LM']){$Qm=$test['LM']; $Qm2=$r['LM']; $Qy=$Y+1; $Qy2=$Y+1;}
    elseif($test['LM']==$r['LM']){$Qm=$test['LM']; $Qm2=$r['LM']; $Qy=$Y+1; $Qy2=$Y+2; }
  }   
  elseif($test['LY']==0 AND $r['LY']==2){ $Qm=$test['LM']; $Qm2=$r['LM']; $Qy=$Y; $Qy2=$Y+2;}
  elseif($test['LY']==2 AND $r['LY']==0){ $Qm=$test['LM']; $Qm2=$r['LM']; $Qy=$Y+2; $Qy2=$Y+2;}
  elseif($test['LY']==1 AND $r['LY']==2){ $Qm=$test['LM']; $Qm2=$r['LM']; $Qy=$Y+1; $Qy2=$Y+2;}
  elseif($test['LY']==2 AND $r['LY']==1){ $Qm=$test['LM']; $Qm2=$r['LM']; $Qy=$Y+2; $Qy2=$Y+3;}
  elseif($test['LY']==2 AND $r['LY']==2)
  { 
    if($test['LM']>$r['LM']){$Qm=$test['LM']; $Qm2=$r['LM']; $Qy=$Y+2; $Qy2=$Y+3; }
	elseif($test['LM']<$r['LM']){$Qm=$test['LM']; $Qm2=$r['LM']; $Qy=$Y+2; $Qy2=$Y+2;}
    elseif($test['LM']==$r['LM']){$Qm=$test['LM']; $Qm2=$r['LM']; $Qy=$Y+2; $Qy2=$Y+4; }
  }
  elseif($test['LY']==0 AND $r['LY']==3){ $Qm=$test['LM']; $Qm2=$r['LM']; $Qy=$Y; $Qy2=$Y+3;}
  elseif($test['LY']==3 AND $r['LY']==0){ $Qm=$test['LM']; $Qm2=$r['LM']; $Qy=$Y+3; $Qy2=$Y+3;}
  elseif($test['LY']==1 AND $r['LY']==3){ $Qm=$test['LM']; $Qm2=$r['LM']; $Qy=$Y+1; $Qy2=$Y+3;}
  elseif($test['LY']==3 AND $r['LY']==1){ $Qm=$test['LM']; $Qm2=$r['LM']; $Qy=$Y+3; $Qy2=$Y+4;}
  elseif($test['LY']==2 AND $r['LY']==3){ $Qm=$test['LM']; $Qm2=$r['LM']; $Qy=$Y+2; $Qy2=$Y+3;}
  elseif($test['LY']==3 AND $r['LY']==2){ $Qm=$test['LM']; $Qm2=$r['LM']; $Qy=$Y+3; $Qy2=$Y+4;}
  elseif($test['LY']==3 AND $r['LY']==3)
  { 
    if($test['LM']>$r['LM']){$Qm=$test['LM']; $Qm2=$r['LM']; $Qy=$Y+3; $Qy2=$Y+4; }
	elseif($test['LM']<$r['LM']){$Qm=$test['LM']; $Qm2=$r['LM']; $Qy=$Y+3; $Qy2=$Y+3;}
    elseif($test['LM']==$r['LM']){$Qm=$test['LM']; $Qm2=$r['LM']; $Qy=$Y+3; $Qy2=$Y+6; }
  }
  elseif($test['LY']==0 AND $r['LY']==4){ $Qm=$test['LM']; $Qm2=$r['LM']; $Qy=$Y; $Qy2=$Y+4;}
  elseif($test['LY']==4 AND $r['LY']==0){ $Qm=$test['LM']; $Qm2=$r['LM']; $Qy=$Y+4; $Qy2=$Y+4;}
  elseif($test['LY']==1 AND $r['LY']==4){ $Qm=$test['LM']; $Qm2=$r['LM']; $Qy=$Y+1; $Qy2=$Y+4;}
  elseif($test['LY']==4 AND $r['LY']==1){ $Qm=$test['LM']; $Qm2=$r['LM']; $Qy=$Y+4; $Qy2=$Y+5;}
  elseif($test['LY']==2 AND $r['LY']==4){ $Qm=$test['LM']; $Qm2=$r['LM']; $Qy=$Y+2; $Qy2=$Y+4;}
  elseif($test['LY']==4 AND $r['LY']==2){ $Qm=$test['LM']; $Qm2=$r['LM']; $Qy=$Y+4; $Qy2=$Y+5;}
  elseif($test['LY']==3 AND $r['LY']==4){ $Qm=$test['LM']; $Qm2=$r['LM']; $Qy=$Y+3; $Qy2=$Y+4;}
  elseif($test['LY']==4 AND $r['LY']==3){ $Qm=$test['LM']; $Qm2=$r['LM']; $Qy=$Y+4; $Qy2=$Y+5;}
  elseif($test['LY']==4 AND $r['LY']==4)
  { 
    if($test['LM']>$r['LM']){$Qm=$test['LM']; $Qm2=$r['LM']; $Qy=$Y+4; $Qy2=$Y+5; }
	elseif($test['LM']<$r['LM']){$Qm=$test['LM']; $Qm2=$r['LM']; $Qy=$Y+4; $Qy2=$Y+4;}
    elseif($test['LM']==$r['LM']){$Qm=$test['LM']; $Qm2=$r['LM']; $Qy=$Y+4; $Qy2=$Y+8; }
  }
  elseif($test['LY']==0 AND $r['LY']==5){ $Qm=$test['LM']; $Qm2=$r['LM']; $Qy=$Y; $Qy2=$Y+5;}
  elseif($test['LY']==5 AND $r['LY']==0){ $Qm=$test['LM']; $Qm2=$r['LM']; $Qy=$Y+5; $Qy2=$Y+5;}
  elseif($test['LY']==1 AND $r['LY']==5){ $Qm=$test['LM']; $Qm2=$r['LM']; $Qy=$Y+1; $Qy2=$Y+5;}
  elseif($test['LY']==5 AND $r['LY']==1){ $Qm=$test['LM']; $Qm2=$r['LM']; $Qy=$Y+5; $Qy2=$Y+6;}
  elseif($test['LY']==2 AND $r['LY']==5){ $Qm=$test['LM']; $Qm2=$r['LM']; $Qy=$Y+2; $Qy2=$Y+5;}
  elseif($test['LY']==5 AND $r['LY']==2){ $Qm=$test['LM']; $Qm2=$r['LM']; $Qy=$Y+5; $Qy2=$Y+6;}
  elseif($test['LY']==3 AND $r['LY']==5){ $Qm=$test['LM']; $Qm2=$r['LM']; $Qy=$Y+3; $Qy2=$Y+5;}
  elseif($test['LY']==5 AND $r['LY']==3){ $Qm=$test['LM']; $Qm2=$r['LM']; $Qy=$Y+5; $Qy2=$Y+6;}
  elseif($test['LY']==4 AND $r['LY']==5){ $Qm=$test['LM']; $Qm2=$r['LM']; $Qy=$Y+4; $Qy2=$Y+5;}
  elseif($test['LY']==5 AND $r['LY']==4){ $Qm=$test['LM']; $Qm2=$r['LM']; $Qy=$Y+5; $Qy2=$Y+6;}
  elseif($test['LY']==5 AND $r['LY']==5)
  { 
    if($test['LM']>$r['LM']){$Qm=$test['LM']; $Qm2=$r['LM']; $Qy=$Y+5; $Qy2=$Y+6; }
	elseif($test['LM']<$r['LM']){$Qm=$test['LM']; $Qm2=$r['LM']; $Qy=$Y+5; $Qy2=$Y+5;}
    elseif($test['LM']==$r['LM']){$Qm=$test['LM']; $Qm2=$r['LM']; $Qy=$Y+5; $Qy2=$Y+10; }
  }
  else {$Qm=0; $Qm2=0; $Qy=0; $Qy2=0;}
  $Q=$Qy2-$Qy;
  include("ProdPlanCalReq.php");   //.$Qy.'-'.$Qm.'---'.$Qy2.'-'.$Qm2.'-'.
  if($testrows>0){ ?><td align="right" bgcolor="<?php if($Tot>0){ echo '#FF80FF'; } ?>">
  <?php echo $Tot; ?>&nbsp;<input type="hidden" id="StmtReq_<?php echo $Sn.'_'.$resSe22['SeasonId']; ?>" value="<?php if($Tot>0){echo $Tot;}else{echo 0;} ?>" /></td>
  <?php $sqlrec=mysql_query("select Buffer from hrm_sales_product_plan where ProductId=".$res['ProductId']." AND SeasonId=".$resSe22['SeasonId']." AND M=".$LastM." AND Y=".$LastY, $con); $rowrec=mysql_num_rows($sqlrec); $resrec=mysql_fetch_assoc($sqlrec); if($resrec['Buffer']!=''){$Buff=$resrec['Buffer'];}else{$Buff=0;} $Total=$Tot+$Buff; ?>  
  <td align="center"><input id="Buff_<?php echo $Sn.'_'.$resSe22['SeasonId']; ?>" value="<?php if($Buff>0){echo $Buff; }else{ echo 0;} ?>" onChange="FunCalcy(this.value,<?php echo $Sn.', '.$resSe22['SeasonId']; ?>)" onKeyUp="FunCalcy(this.value,<?php echo $Sn.', '.$resSe22['SeasonId']; ?>)" onBlur="FunCalcy(this.value,<?php echo $Sn.', '.$resSe22['SeasonId']; ?>)" class="InputRec" readonly style="background-color:<?php if($rowrec>0){echo '#FFCCFF'; } ?>;"/></td> 
  <td align="center"><input id="TotReq_<?php echo $Sn.'_'.$resSe22['SeasonId']; ?>" value="<?php if($Total>0){echo $Total; } ?>" class="InputRec" readonly /></td>

  <?php }else{ ?><td align="center">&nbsp;</td><td align="center">&nbsp;</td><td align="center">&nbsp;</td><?php } ?>
   
<?php } ?>
 <td bgcolor="#FFFFFF" align="center" id="TD_<?php echo $Sn.'_'.$resSe22['SeasonId']; ?>">
 <img src="images/edit.png" border="0" alt="Edit" id="EB1_<?php echo $Sn.'_'.$resSe22['SeasonId']; ?>" onClick="editD1(<?php echo $Sn.', '.$resSe22['SeasonId']; ?>)" style="display:<?php if($testrows>0 AND $Tot>0){ echo 'block'; } else{echo 'none';} ?>;">
 <img src="images/Floppy-Small-icon.png" border="0" alt="Save" id="SB1_<?php echo $Sn.'_'.$resSe22['SeasonId']; ?>" onClick="saveD1(<?php echo $Sn.', '.$_REQUEST['y'].', '.$res['ProductId'].', '.$resSe22['SeasonId'].', '.$LastM.', '.$LastY; ?>)" style="display:none;"></td> 
<?php } ?>	
<?php /*********************** 222222222222222222222222222222222222222222 ************************************/ ?>	

<?php $sqlI33=mysql_query("select GroupId from hrm_sales_seedsitem where ItemId=".$res['ItemId'],$con); $resI33=mysql_fetch_array($sqlI33);
      $sqlSe33=mysql_query("select SeasonId from hrm_sales_season where GroupId=".$resI33['GroupId'],$con); 
	  while($resSe33=mysql_fetch_assoc($sqlSe33)){
/*******************  for Month/Year Start ***********************/ 
    $sqlTestY=mysql_query("select LM,LY from hrm_sales_product_month_activity where ProductID=".$res['ProductId']." AND SeasonId=".$resSe33['SeasonId'], $con);
	$testrowsY=mysql_num_rows($sqlTestY); $testY=mysql_fetch_array($sqlTestY);
	$resYY=mysql_fetch_assoc(mysql_query("select FromDate from hrm_sales_year where YearId=".$AfterYId, $con)); $YY=date("Y",strtotime($resYY['FromDate']));
	$LastMM=$testY['LM']; $LastYY=date("Y",strtotime($resYY['FromDate']))+$testY['LY'];
    if($LastMM==1){$MM='Jan';}elseif($LastMM==2){$MM='Feb';}elseif($LastMM==3){$MM='Mar';}elseif($LastMM==4){$MM='Apr';}elseif($LastMM==5){$MM='May';}elseif($LastMM==6){$MM='Jun';}
    elseif($LastMM==7){$MM='Jul';}elseif($LastMM==8){$MM='Aug';}elseif($LastMM==9){$MM='Sep';}elseif($LastMM==10){$MM='Oct';}elseif($LastMM==11){$MM='Nov';}elseif($LastMM==12){$MM='Dec';}
	if($testrowsY>0 AND $LastMM>0){echo '<td align="center" bgcolor="#FFFFAA">'.$MM.'</td>'; }else {echo '<td align="center" bgcolor="#FFFFAA">&nbsp;</td>';} 
    if($testrowsY>0 AND $LastYY>0){echo '<td align="center" bgcolor="#FFFFAA">'.$LastYY.'</td>'; }else {echo '<td align="center" bgcolor="#FFFFAA">&nbsp;</td>';}
/*******************  for Month/Year Close ***********************/ 
$sChkY=mysql_query("select * from hrm_sales_product_month_activity where ProductID=".$res['ProductId'], $con); $rowChkY=mysql_num_rows($sChkY);
if($rowChkY==0){echo '<td align="right">&nbsp;</td>'; echo '<td align="right">&nbsp;</td>'; echo '<td align="right">&nbsp;</td>'; }
elseif($rowChkY==1)
{
 if($testY['LY']==0){$Qmm=$testY['LM']; $Qyy=$YY; $Qmm2=$testY['LM']; $Qyy2=$YY+1;}
 elseif($testY['LY']==1){$Qmm=$testY['LM']; $Qyy=$YY+1; $Qmm2=$testY['LM']; $Qyy2=$YY+2;}
 elseif($testY['LY']==2){$Qmm=$testY['LM']; $Qyy=$YY+2; $Qmm2=$testY['LM']; $Qyy2=$YY+4;}
 else{$Qmm=0; $Qmm2=0; $Qyy=0; $Qyy2=0;}
 $QQ=$Qyy2-$Qyy;
 include("ProdPlanCalReq2T.php");
 if($testrowsY>0){ ?><td align="right" bgcolor="<?php if($Tott>0){ echo '#FF80FF'; } ?>">
 <?php echo $Tott; ?>&nbsp;<input type="hidden" id="StmtReq2_<?php echo $Sn.'_'.$resSe33['SeasonId']; ?>" value="<?php if($Tott>0){echo $Tott;}else{echo 0;} ?>" /></td>
 <?php $sqlrec2=mysql_query("select Buffer from hrm_sales_product_plan where ProductId=".$res['ProductId']." AND SeasonId=".$resSe33['SeasonId']." AND M=".$LastMM." AND Y=".$LastYY, $con); $rowrec2=mysql_num_rows($sqlrec2);$resrec2=mysql_fetch_assoc($sqlrec2); if($resrec2['Buffer']!=''){$Buff2=$resrec2['Buffer'];}else{$Buff2=0;} $Total2=$Tott+$Buff2; ?>  
  <td align="center"><input id="Buff2_<?php echo $Sn.'_'.$resSe33['SeasonId']; ?>" value="<?php if($Buff2>0){echo $Buff2; }else{ echo 0;} ?>" onChange="FunCalcy2(this.value,<?php echo $Sn.', '.$resSe33['SeasonId']; ?>)" onKeyUp="FunCalcy2(this.value,<?php echo $Sn.', '.$resSe33['SeasonId']; ?>)" onBlur="FunCalcy2(this.value,<?php echo $Sn.', '.$resSe33['SeasonId']; ?>)" class="InputRec" readonly style="background-color:<?php if($rowrec2>0){echo '#FFCCFF'; } ?>;" /></td> 
  <td align="center"><input id="TotReq2_<?php echo $Sn.'_'.$resSe33['SeasonId']; ?>" value="<?php if($Total2>0){echo $Total2; } ?>" class="InputRec" readonly /></td>

 <?php }else{ ?><td align="center">&nbsp;</td><td align="center">&nbsp;</td><td align="center">&nbsp;</td><?php } ?>
   
<?php }
elseif($rowChkY==2)
{ $sY=mysql_query("select LM,LY from hrm_sales_product_month_activity where ProductID=".$res['ProductId']." AND SeasonId!=".$resSe33['SeasonId'], $con);
  $rY=mysql_fetch_array($sY);
  if($testY['LY']==0 AND $rY['LY']==0)
  {   
    if($testY['LM']>$rY['LM']){$Qmm=$testY['LM']; $Qmm2=$rY['LM']; $Qyy=$YY; $Qyy2=$YY+1; }
	elseif($testY['LM']<$rY['LM']){$Qmm=$testY['LM']; $Qmm2=$rY['LM']; $Qyy=$YY; $Qyy2=$YY;}
    elseif($testY['LM']==$rY['LM']){$Qmm=$testY['LM']; $Qmm2=$rY['LM']; $Qyy=$YY; $Qyy2=$YY; }
  }
  elseif($testY['LY']==0 AND $rY['LY']==1){ $Qmm=$testY['LM']; $Qmm2=$rY['LM']; $Qyy=$YY; $Qyy2=$YY+1;}
  elseif($testY['LY']==1 AND $rY['LY']==0){ $Qmm=$testY['LM']; $Qmm2=$rY['LM']; $Qyy=$YY+1; $Qyy2=$YY+1;}
  elseif($testY['LY']==1 AND $rY['LY']==1)
  { 
    if($testY['LM']>$rY['LM']){$Qmm=$testY['LM']; $Qmm2=$rY['LM']; $Qyy=$YY+1; $Qyy2=$YY+2; }
	elseif($testY['LM']<$rY['LM']){$Qmm=$testY['LM']; $Qmm2=$rY['LM']; $Qyy=$YY+1; $Qyy2=$YY+1;}
    elseif($testY['LM']==$rY['LM']){$Qmm=$testY['LM']; $Qmm2=$rY['LM']; $Qyy=$YY+1; $Qyy2=$YY+2; }
  }   
  elseif($testY['LY']==0 AND $rY['LY']==2){ $Qmm=$testY['LM']; $Qmm2=$rY['LM']; $Qyy=$YY; $Qyy2=$YY+2;}
  elseif($testY['LY']==2 AND $rY['LY']==0){ $Qmm=$testY['LM']; $Qmm2=$rY['LM']; $Qyy=$YY+2; $Qyy2=$YY+2;}
  elseif($testY['LY']==1 AND $rY['LY']==2){ $Qmm=$testY['LM']; $Qmm2=$rY['LM']; $Qyy=$YY+1; $Qyy2=$YY+2;}
  elseif($testY['LY']==2 AND $rY['LY']==1){ $Qmm=$testY['LM']; $Qmm2=$rY['LM']; $Qyy=$YY+2; $Qyy2=$YY+3;}
  elseif($testY['LY']==2 AND $rY['LY']==2)
  { 
    if($testY['LM']>$rY['LM']){$Qmm=$testY['LM']; $Qmm2=$rY['LM']; $Qyy=$YY+2; $Qyy2=$YY+3; }
	elseif($testY['LM']<$rY['LM']){$Qmm=$testY['LM']; $Qmm2=$rY['LM']; $Qyy=$YY+2; $Qyy2=$YY+2;}
    elseif($testY['LM']==$rY['LM']){$Qmm=$testY['LM']; $Qmm2=$rY['LM']; $Qyy=$YY+2; $Qyy2=$YY+4; }
  }
  else {$Qmm=0; $Qmm2=0; $Qyy=0; $Qyy2=0;}
  $QQ=$Qyy2-$Qyy;
  include("ProdPlanCalReq2T.php");
  if($testrowsY>0){ ?><td align="right" bgcolor="<?php if($Tott>0){ echo '#FF80FF'; } ?>">
  <?php echo $Tott; ?>&nbsp;<input type="hidden" id="StmtReq2_<?php echo $Sn.'_'.$resSe33['SeasonId']; ?>" value="<?php if($Tott>0){echo $Tott;}else{echo 0;} ?>" /></td>
  <?php $sqlrec2=mysql_query("select Buffer from hrm_sales_product_plan where ProductId=".$res['ProductId']." AND SeasonId=".$resSe33['SeasonId']." AND M=".$LastMM." AND Y=".$LastYY, $con); $rowrec2=mysql_num_rows($sqlrec2); $resrec2=mysql_fetch_assoc($sqlrec2); if($resrec2['Buffer']!=''){$Buff2=$resrec2['Buffer'];}else{$Buff2=0;} $Total2=$Tott+$Buff2; ?>  
  <td align="center"><input id="Buff2_<?php echo $Sn.'_'.$resSe33['SeasonId']; ?>" value="<?php if($Buff2>0){echo $Buff2; }else{ echo 0;} ?>" onChange="FunCalcy2(this.value,<?php echo $Sn.', '.$resSe33['SeasonId']; ?>)" onKeyUp="FunCalcy2(this.value,<?php echo $Sn.', '.$resSe33['SeasonId']; ?>)" onBlur="FunCalcy2(this.value,<?php echo $Sn.', '.$resSe33['SeasonId']; ?>)" class="InputRec" readonly style="background-color:<?php if($rowrec2>0){echo '#FFCCFF'; } ?>;" /></td> 
  <td align="center"><input id="TotReq2_<?php echo $Sn.'_'.$resSe33['SeasonId']; ?>" value="<?php if($Total2>0){echo $Total2; } ?>" class="InputRec" readonly /></td>

  <?php }else{ ?><td align="center">&nbsp;</td><td align="center">&nbsp;</td><td align="center">&nbsp;</td><?php } ?>
   
<?php }
elseif($rowChkY==3)
{ $LY=$testY['LY']; $LY2=$testY['LY']+1; $LY3=$testY['LY']+2; $LY4=$testY['LY']+3; $LY5=$testY['LY']+4; $LY6=$testY['LY']+5;
  $sY0=mysql_query("select LM,LY from hrm_sales_product_month_activity where ProductID=".$res['ProductId']." AND SeasonId!=".$resSe33['SeasonId']." AND LY=".$LY, $con);
  $sY1=mysql_query("select LM,LY from hrm_sales_product_month_activity where ProductID=".$res['ProductId']." AND SeasonId!=".$resSe33['SeasonId']." AND LY=".$LY2, $con);
  $sY2=mysql_query("select LM,LY from hrm_sales_product_month_activity where ProductID=".$res['ProductId']." AND SeasonId!=".$resSe33['SeasonId']." AND LY=".$LY3, $con);
  $sY3=mysql_query("select LM,LY from hrm_sales_product_month_activity where ProductID=".$res['ProductId']." AND SeasonId!=".$resSe33['SeasonId']." AND LY=".$LY4, $con);
  $sY4=mysql_query("select LM,LY from hrm_sales_product_month_activity where ProductID=".$res['ProductId']." AND SeasonId!=".$resSe33['SeasonId']." AND LY=".$LY5, $con);
  $sY5=mysql_query("select LM,LY from hrm_sales_product_month_activity where ProductID=".$res['ProductId']." AND SeasonId!=".$resSe33['SeasonId']." AND LY=".$LY6, $con);
  $rwY0=mysql_num_rows($sY0); $rwY1=mysql_num_rows($sY1); $rwY2=mysql_num_rows($sY2); $rwY3=mysql_num_rows($sY3); $rwY4=mysql_num_rows($sY4); $rwY5=mysql_num_rows($sY5);
  if($rwY0==1){$rY=mysql_fetch_array($sY0);}elseif($rwY1==1){$rY=mysql_fetch_array($sY1);}elseif($rwY2==1){$rY=mysql_fetch_array($sY2);}
  elseif($rwY3==1){$rY=mysql_fetch_array($sY3);}elseif($rwY4==1){$rY=mysql_fetch_array($sY4);}elseif($rwY5==1){$rY=mysql_fetch_array($sY5);}

  if($testY['LY']==0 AND $rY['LY']==0)
  {   
    if($testY['LM']>$rY['LM']){$Qmm=$testY['LM']; $Qmm2=$rY['LM']; $Qyy=$YY; $Qyy2=$YY+1; }
	elseif($testY['LM']<$rY['LM']){$Qmm=$testY['LM']; $Qmm2=$rY['LM']; $Qyy=$YY; $Qyy2=$YY;}
    elseif($testY['LM']==$rY['LM']){$Qmm=$testY['LM']; $Qmm2=$rY['LM']; $Qyy=$YY; $Qyy2=$YY; }
  }
  elseif($testY['LY']==0 AND $rY['LY']==1){ $Qmm=$testY['LM']; $Qmm2=$rY['LM']; $Qyy=$YY; $Qyy2=$YY+1; }
  elseif($testY['LY']==1 AND $rY['LY']==0){ $Qmm=$testY['LM']; $Qmm2=$rY['LM']; $Qyy=$YY+1; $Qyy2=$YY+1;}
  elseif($testY['LY']==1 AND $rY['LY']==1)
  { 
    if($testY['LM']>$rY['LM']){$Qmm=$testY['LM']; $Qmm2=$rY['LM']; $Qyy=$YY+1; $Qyy2=$YY+2; }
	elseif($testY['LM']<$rY['LM']){$Qmm=$testY['LM']; $Qmm2=$rY['LM']; $Qyy=$YY+1; $Qyy2=$YY+1;}
    elseif($testY['LM']==$rY['LM']){$Qmm=$testY['LM']; $Qmm2=$rY['LM']; $Qyy=$YY+1; $Qyy2=$YY+2; }
  }   
  elseif($testY['LY']==0 AND $rY['LY']==2){ $Qmm=$testY['LM']; $Qmm2=$rY['LM']; $Qyy=$YY; $Qyy2=$YY+2;}
  elseif($testY['LY']==2 AND $rY['LY']==0){ $Qmm=$testY['LM']; $Qmm2=$rY['LM']; $Qyy=$YY+2; $Qyy2=$YY+2;}
  elseif($testY['LY']==1 AND $rY['LY']==2){ $Qmm=$testY['LM']; $Qmm2=$rY['LM']; $Qyy=$YY+1; $Qyy2=$YY+2;}
  elseif($testY['LY']==2 AND $rY['LY']==1){ $Qmm=$testY['LM']; $Qmm2=$rY['LM']; $Qyy=$YY+2; $Qyy2=$YY+3;}
  elseif($testY['LY']==2 AND $rY['LY']==2)
  { 
    if($testY['LM']>$rY['LM']){$Qmm=$testY['LM']; $Qmm2=$rY['LM']; $Qyy=$YY+2; $Qyy2=$YY+3; }
	elseif($testY['LM']<$rY['LM']){$Qmm=$testY['LM']; $Qmm2=$rY['LM']; $Qyy=$YY+2; $Qyy2=$YY+2;}
    elseif($testY['LM']==$rY['LM']){$Qmm=$testY['LM']; $Qmm2=$rY['LM']; $Qyy=$YY+2; $Qyy2=$YY+4; }
  }
  elseif($testY['LY']==0 AND $rY['LY']==3){ $Qmm=$testY['LM']; $Qmm2=$rY['LM']; $Qyy=$YY; $Qyy2=$YY+3;}
  elseif($testY['LY']==3 AND $rY['LY']==0){ $Qmm=$testY['LM']; $Qmm2=$rY['LM']; $Qyy=$YY+3; $Qyy2=$YY+3;}
  elseif($testY['LY']==1 AND $rY['LY']==3){ $Qmm=$testY['LM']; $Qmm2=$rY['LM']; $Qyy=$YY+1; $Qyy2=$YY+3;}
  elseif($testY['LY']==3 AND $rY['LY']==1){ $Qmm=$testY['LM']; $Qmm2=$rY['LM']; $Qyy=$YY+3; $Qyy2=$YY+4;}
  elseif($testY['LY']==2 AND $rY['LY']==3){ $Qmm=$testY['LM']; $Qmm2=$rY['LM']; $Qyy=$YY+2; $Qyy2=$YY+3;}
  elseif($testY['LY']==3 AND $rY['LY']==2){ $Qmm=$testY['LM']; $Qmm2=$rY['LM']; $Qyy=$YY+3; $Qyy2=$YY+4;}
  elseif($testY['LY']==3 AND $rY['LY']==3)
  { 
    if($testY['LM']>$rY['LM']){$Qmm=$testY['LM']; $Qmm2=$rY['LM']; $Qyy=$YY+3; $Qyy2=$YY+4; }
	elseif($testY['LM']<$rY['LM']){$Qmm=$testY['LM']; $Qmm2=$rY['LM']; $Qyy=$YY+3; $Qyy2=$YY+3;}
    elseif($testY['LM']==$rY['LM']){$Qmm=$testY['LM']; $Qmm2=$rY['LM']; $Qyy=$YY+3; $Qyy2=$YY+6; }
  }
  else {$Qmm=0; $Qmm2=0; $Qyy=0; $Qyy2=0;}
  $QQ=$Qyy2-$Qyy;
  
  include("ProdPlanCalReq2T.php");
  if($testrowsY>0){ ?><td align="right" bgcolor="<?php if($Tott>0){ echo '#FF80FF'; } ?>">
  <?php echo $Tott; ?>&nbsp;<input type="hidden" id="StmtReq2_<?php echo $Sn.'_'.$resSe33['SeasonId']; ?>" value="<?php if($Tott>0){echo $Tott;}else{echo 0;} ?>" /></td>
  <?php $sqlrec2=mysql_query("select Buffer from hrm_sales_product_plan where ProductId=".$res['ProductId']." AND SeasonId=".$resSe33['SeasonId']." AND M=".$LastMM." AND Y=".$LastYY, $con); $rowrec2=mysql_num_rows($sqlrec2); $resrec2=mysql_fetch_assoc($sqlrec2); if($resrec2['Buffer']!=''){$Buff2=$resrec2['Buffer'];}else{$Buff2=0;} $Total2=$Tott+$Buff2; ?>  
  <td align="center"><input id="Buff2_<?php echo $Sn.'_'.$resSe33['SeasonId']; ?>" value="<?php if($Buff2>0){echo $Buff2; }else{ echo 0;} ?>" onChange="FunCalcy2(this.value,<?php echo $Sn.', '.$resSe33['SeasonId']; ?>)" onKeyUp="FunCalcy2(this.value,<?php echo $Sn.', '.$resSe33['SeasonId']; ?>)" onBlur="FunCalcy2(this.value,<?php echo $Sn.', '.$resSe33['SeasonId']; ?>)" class="InputRec" readonly style="background-color:<?php if($rowrec2>0){echo '#FFCCFF'; } ?>;" /></td> 
  <td align="center"><input id="TotReq2_<?php echo $Sn.'_'.$resSe33['SeasonId']; ?>" value="<?php if($Total2>0){echo $Total2; } ?>" class="InputRec" readonly /></td>

  <?php }else{ ?><td align="center">&nbsp;</td><td align="center">&nbsp;</td><td align="center">&nbsp;</td><?php } ?>
   
<?php }
elseif($rowChkY==4)
{ $LY=$testY['LY']; $LY2=$testY['LY']+1; $LY3=$testY['LY']+2; $LY4=$testY['LY']+3; $LY5=$testY['LY']+4; $LY6=$testY['LY']+5;
  $sY0=mysql_query("select LM,LY from hrm_sales_product_month_activity where ProductID=".$res['ProductId']." AND SeasonId!=".$resSe33['SeasonId']." AND LY=".$LY, $con);
  $sY1=mysql_query("select LM,LY from hrm_sales_product_month_activity where ProductID=".$res['ProductId']." AND SeasonId!=".$resSe33['SeasonId']." AND LY=".$LY2, $con);
  $sY2=mysql_query("select LM,LY from hrm_sales_product_month_activity where ProductID=".$res['ProductId']." AND SeasonId!=".$resSe33['SeasonId']." AND LY=".$LY3, $con);
  $sY3=mysql_query("select LM,LY from hrm_sales_product_month_activity where ProductID=".$res['ProductId']." AND SeasonId!=".$resSe33['SeasonId']." AND LY=".$LY4, $con);
  $sY4=mysql_query("select LM,LY from hrm_sales_product_month_activity where ProductID=".$res['ProductId']." AND SeasonId!=".$resSe33['SeasonId']." AND LY=".$LY5, $con);
  $sY5=mysql_query("select LM,LY from hrm_sales_product_month_activity where ProductID=".$res['ProductId']." AND SeasonId!=".$resSe33['SeasonId']." AND LY=".$LY6, $con);
  $rwY0=mysql_num_rows($sY0); $rwY1=mysql_num_rows($sY1); $rwY2=mysql_num_rows($sY2); $rwY3=mysql_num_rows($sY3); $rwY4=mysql_num_rows($sY4); $rwY5=mysql_num_rows($sY5);
  if($rwY0==1){$rY=mysql_fetch_array($sY0);}elseif($rwY1==1){$rY=mysql_fetch_array($sY1);}elseif($rwY2==1){$rY=mysql_fetch_array($sY2);}
  elseif($rwY3==1){$rY=mysql_fetch_array($sY3);}elseif($rwY4==1){$rY=mysql_fetch_array($sY4);}elseif($rwY5==1){$rY=mysql_fetch_array($sY5);}
  
  if($testY['LY']==0 AND $rY['LY']==0)
  {   
    if($testY['LM']>$rY['LM']){$Qmm=$testY['LM']; $Qmm2=$rY['LM']; $Qyy=$YY; $Qyy2=$YY+1; }
	elseif($testY['LM']<$rY['LM']){$Qmm=$testY['LM']; $Qmm2=$rY['LM']; $Qyy=$YY; $Qyy2=$YY;}
    elseif($testY['LM']==$rY['LM']){$Qmm=$testY['LM']; $Qmm2=$rY['LM']; $Qyy=$YY; $Qyy2=$YY; }
  }
  elseif($testY['LY']==0 AND $rY['LY']==1){ $Qmm=$testY['LM']; $Qmm2=$rY['LM']; $Qyy=$YY; $Qyy2=$YY+1;}
  elseif($testY['LY']==1 AND $rY['LY']==0){ $Qmm=$testY['LM']; $Qmm2=$rY['LM']; $Qyy=$YY+1; $Qyy2=$YY+1;}
  elseif($testY['LY']==1 AND $rY['LY']==1)
  { 
    if($testY['LM']>$rY['LM']){$Qmm=$testY['LM']; $Qmm2=$rY['LM']; $Qyy=$YY+1; $Qyy2=$YY+2; }
	elseif($testY['LM']<$rY['LM']){$Qmm=$testY['LM']; $Qmm2=$rY['LM']; $Qyy=$YY+1; $Qyy2=$YY+1;}
    elseif($testY['LM']==$rY['LM']){$Qmm=$testY['LM']; $Qmm2=$rY['LM']; $Qyy=$YY+1; $Qyy2=$YY+2; }
  }   
  elseif($testY['LY']==0 AND $rY['LY']==2){ $Qmm=$testY['LM']; $Qmm2=$rY['LM']; $Qyy=$YY; $Qyy2=$YY+2;}
  elseif($testY['LY']==2 AND $rY['LY']==0){ $Qmm=$testY['LM']; $Qmm2=$rY['LM']; $Qyy=$YY+2; $Qyy2=$YY+2;}
  elseif($testY['LY']==1 AND $rY['LY']==2){ $Qmm=$testY['LM']; $Qmm2=$rY['LM']; $Qyy=$YY+1; $Qyy2=$YY+2;}
  elseif($testY['LY']==2 AND $rY['LY']==1){ $Qmm=$testY['LM']; $Qmm2=$rY['LM']; $Qyy=$YY+2; $Qyy2=$YY+3;}
  elseif($testY['LY']==2 AND $rY['LY']==2)
  { 
    if($testY['LM']>$rY['LM']){$Qmm=$testY['LM']; $Qmm2=$rY['LM']; $Qyy=$YY+2; $Qyy2=$YY+3; }
	elseif($testY['LM']<$rY['LM']){$Qmm=$testY['LM']; $Qmm2=$rY['LM']; $Qyy=$YY+2; $Qyy2=$YY+2;}
    elseif($testY['LM']==$rY['LM']){$Qmm=$testY['LM']; $Qmm2=$rY['LM']; $Qyy=$YY+2; $Qyy2=$YY+4; }
  }
  elseif($testY['LY']==0 AND $rY['LY']==3){ $Qmm=$testY['LM']; $Qmm2=$rY['LM']; $Qyy=$YY; $Qyy2=$YY+3;}
  elseif($testY['LY']==3 AND $rY['LY']==0){ $Qmm=$testY['LM']; $Qmm2=$rY['LM']; $Qyy=$YY+3; $Qyy2=$YY+3;}
  elseif($testY['LY']==1 AND $rY['LY']==3){ $Qmm=$testY['LM']; $Qmm2=$rY['LM']; $Qyy=$YY+1; $Qyy2=$YY+3;}
  elseif($testY['LY']==3 AND $rY['LY']==1){ $Qmm=$testY['LM']; $Qmm2=$rY['LM']; $Qyy=$YY+3; $Qyy2=$YY+4;}
  elseif($testY['LY']==2 AND $rY['LY']==3){ $Qmm=$testY['LM']; $Qmm2=$rY['LM']; $Qyy=$YY+2; $Qyy2=$YY+3;}
  elseif($testY['LY']==3 AND $rY['LY']==2){ $Qmm=$testY['LM']; $Qmm2=$rY['LM']; $Qyy=$YY+3; $Qyy2=$YY+4;}
  elseif($testY['LY']==3 AND $rY['LY']==3)
  { 
    if($testY['LM']>$rY['LM']){$Qmm=$testY['LM']; $Qmm2=$rY['LM']; $Qyy=$YY+3; $Qyy2=$YY+4; }
	elseif($testY['LM']<$rY['LM']){$Qmm=$testY['LM']; $Qmm2=$rY['LM']; $Qyy=$YY+3; $Qyy2=$YY+3;}
    elseif($testY['LM']==$rY['LM']){$Qmm=$testY['LM']; $Qmm2=$rY['LM']; $Qyy=$YY+3; $Qyy2=$YY+6; }
  }
  elseif($testY['LY']==0 AND $rY['LY']==4){ $Qmm=$testY['LM']; $Qmm2=$rY['LM']; $Qyy=$YY; $Qyy2=$YY+4;}
  elseif($testY['LY']==4 AND $rY['LY']==0){ $Qmm=$testY['LM']; $Qmm2=$rY['LM']; $Qyy=$YY+4; $Qyy2=$YY+4;}
  elseif($testY['LY']==1 AND $rY['LY']==4){ $Qmm=$testY['LM']; $Qmm2=$rY['LM']; $Qyy=$YY+1; $Qyy2=$YY+4;}
  elseif($testY['LY']==4 AND $rY['LY']==1){ $Qmm=$testY['LM']; $Qmm2=$rY['LM']; $Qyy=$YY+4; $Qyy2=$YY+5;}
  elseif($testY['LY']==2 AND $rY['LY']==4){ $Qmm=$testY['LM']; $Qmm2=$rY['LM']; $Qyy=$YY+2; $Qyy2=$YY+4;}
  elseif($testY['LY']==4 AND $rY['LY']==2){ $Qmm=$testY['LM']; $Qmm2=$rY['LM']; $Qyy=$YY+4; $Qyy2=$YY+5;}
  elseif($testY['LY']==3 AND $rY['LY']==4){ $Qmm=$testY['LM']; $Qmm2=$rY['LM']; $Qyy=$YY+3; $Qyy2=$YY+4;}
  elseif($testY['LY']==4 AND $rY['LY']==3){ $Qmm=$testY['LM']; $Qmm2=$rY['LM']; $Qyy=$YY+4; $Qyy2=$YY+5;}
  elseif($testY['LY']==4 AND $rY['LY']==4)
  { 
    if($testY['LM']>$rY['LM']){$Qmm=$testY['LM']; $Qmm2=$rY['LM']; $Qyy=$YY+4; $Qyy2=$YY+5; }
	elseif($testY['LM']<$rY['LM']){$Qmm=$testY['LM']; $Qmm2=$rY['LM']; $Qyy=$YY+4; $Qyy2=$YY+4;}
    elseif($testY['LM']==$rY['LM']){$Qmm=$testY['LM']; $Qmm2=$rY['LM']; $Qyy=$YY+4; $Qyy2=$YY+8; }
  }
  else {$Qmm=0; $Qmm2=0; $Qyy=0; $Qyy2=0;}
  $QQ=$Qyy2-$Qyy;
  include("ProdPlanCalReq2T.php");
  if($testrowsY>0){ ?><td align="right" bgcolor="<?php if($Tott>0){ echo '#FF80FF'; } ?>">
  <?php echo $Tott; ?>&nbsp;<input type="hidden" id="StmtReq2_<?php echo $Sn.'_'.$resSe33['SeasonId']; ?>" value="<?php if($Tott>0){echo $Tott;}else{echo 0;} ?>" /></td>
  <?php $sqlrec2=mysql_query("select Buffer from hrm_sales_product_plan where ProductId=".$res['ProductId']." AND SeasonId=".$resSe33['SeasonId']." AND M=".$LastMM." AND Y=".$LastYY, $con); $rowrec2=mysql_num_rows($sqlrec2); $resrec2=mysql_fetch_assoc($sqlrec2); if($resrec2['Buffer']!=''){$Buff2=$resrec2['Buffer'];}else{$Buff2=0;} $Total2=$Tott+$Buff2; ?>  
  <td align="center"><input id="Buff2_<?php echo $Sn.'_'.$resSe33['SeasonId']; ?>" value="<?php if($Buff2>0){echo $Buff2; }else{ echo 0;} ?>" onChange="FunCalcy2(this.value,<?php echo $Sn.', '.$resSe33['SeasonId']; ?>)" onKeyUp="FunCalcy2(this.value,<?php echo $Sn.', '.$resSe33['SeasonId']; ?>)" onBlur="FunCalcy2(this.value,<?php echo $Sn.', '.$resSe33['SeasonId']; ?>)" class="InputRec" readonly style="background-color:<?php if($rowrec2>0){echo '#FFCCFF'; } ?>;" /></td> 
  <td align="center"><input id="TotReq2_<?php echo $Sn.'_'.$resSe33['SeasonId']; ?>" value="<?php if($Total2>0){echo $Total2; } ?>" class="InputRec" readonly /></td>

  <?php }else{ ?><td align="center">&nbsp;</td><td align="center">&nbsp;</td><td align="center">&nbsp;</td><?php } ?>  
<?php } 
elseif($rowChkY==5)
{ $LY=$testY['LY']; $LY2=$testY['LY']+1; $LY3=$testY['LY']+2; $LY4=$testY['LY']+3; $LY5=$testY['LY']+4; $LY6=$testY['LY']+5;
  $sY0=mysql_query("select LM,LY from hrm_sales_product_month_activity where ProductID=".$res['ProductId']." AND SeasonId!=".$resSe33['SeasonId']." AND LY=".$LY, $con);
  $sY1=mysql_query("select LM,LY from hrm_sales_product_month_activity where ProductID=".$res['ProductId']." AND SeasonId!=".$resSe33['SeasonId']." AND LY=".$LY2, $con);
  $sY2=mysql_query("select LM,LY from hrm_sales_product_month_activity where ProductID=".$res['ProductId']." AND SeasonId!=".$resSe33['SeasonId']." AND LY=".$LY3, $con);
  $sY3=mysql_query("select LM,LY from hrm_sales_product_month_activity where ProductID=".$res['ProductId']." AND SeasonId!=".$resSe33['SeasonId']." AND LY=".$LY4, $con);
  $sY4=mysql_query("select LM,LY from hrm_sales_product_month_activity where ProductID=".$res['ProductId']." AND SeasonId!=".$resSe33['SeasonId']." AND LY=".$LY5, $con);
  $sY5=mysql_query("select LM,LY from hrm_sales_product_month_activity where ProductID=".$res['ProductId']." AND SeasonId!=".$resSe33['SeasonId']." AND LY=".$LY6, $con);
  $rwY0=mysql_num_rows($sY0); $rwY1=mysql_num_rows($sY1); $rwY2=mysql_num_rows($sY2); $rwY3=mysql_num_rows($sY3); $rwY4=mysql_num_rows($sY4); $rwY5=mysql_num_rows($sY5);
  if($rwY0==1){$rY=mysql_fetch_array($sY0);}elseif($rwY1==1){$rY=mysql_fetch_array($sY1);}elseif($rwY2==1){$rY=mysql_fetch_array($sY2);}
  elseif($rwY3==1){$rY=mysql_fetch_array($sY3);}elseif($rwY4==1){$rY=mysql_fetch_array($sY4);}elseif($rwY5==1){$rY=mysql_fetch_array($sY5);}
  
  if($testY['LY']==0 AND $rY['LY']==0)
  {   
    if($testY['LM']>$rY['LM']){$Qmm=$testY['LM']; $Qmm2=$rY['LM']; $Qyy=$YY; $Qyy2=$YY+1; }
	elseif($testY['LM']<$rY['LM']){$Qmm=$testY['LM']; $Qmm2=$rY['LM']; $Qyy=$YY; $Qyy2=$YY;}
    elseif($testY['LM']==$rY['LM']){$Qmm=$testY['LM']; $Qmm2=$rY['LM']; $Qyy=$YY; $Qyy2=$YY; }
  }
  elseif($testY['LY']==0 AND $rY['LY']==1){ $Qmm=$testY['LM']; $Qmm2=$rY['LM']; $Qyy=$YY; $Qyy2=$YY+1;}
  elseif($testY['LY']==1 AND $rY['LY']==0){ $Qmm=$testY['LM']; $Qmm2=$rY['LM']; $Qyy=$YY+1; $Qyy2=$YY+1;}
  elseif($testY['LY']==1 AND $rY['LY']==1)
  { 
    if($testY['LM']>$rY['LM']){$Qmm=$testY['LM']; $Qmm2=$rY['LM']; $Qyy=$YY+1; $Qyy2=$YY+2; }
	elseif($testY['LM']<$rY['LM']){$Qmm=$testY['LM']; $Qmm2=$rY['LM']; $Qyy=$YY+1; $Qyy2=$YY+1;}
    elseif($testY['LM']==$rY['LM']){$Qmm=$testY['LM']; $Qmm2=$rY['LM']; $Qyy=$YY+1; $Qyy2=$YY+2; }
  }   
  elseif($testY['LY']==0 AND $rY['LY']==2){ $Qmm=$testY['LM']; $Qmm2=$rY['LM']; $Qyy=$YY; $Qyy2=$YY+2;}
  elseif($testY['LY']==2 AND $rY['LY']==0){ $Qmm=$testY['LM']; $Qmm2=$rY['LM']; $Qyy=$YY+2; $Qyy2=$YY+2;}
  elseif($testY['LY']==1 AND $rY['LY']==2){ $Qmm=$testY['LM']; $Qmm2=$rY['LM']; $Qyy=$YY+1; $Qyy2=$YY+2;}
  elseif($testY['LY']==2 AND $rY['LY']==1){ $Qmm=$testY['LM']; $Qmm2=$rY['LM']; $Qyy=$YY+2; $Qyy2=$YY+3;}
  elseif($testY['LY']==2 AND $rY['LY']==2)
  { 
    if($testY['LM']>$rY['LM']){$Qmm=$testY['LM']; $Qmm2=$rY['LM']; $Qyy=$YY+2; $Qyy2=$YY+3; }
	elseif($testY['LM']<$rY['LM']){$Qmm=$testY['LM']; $Qmm2=$rY['LM']; $Qyy=$YY+2; $Qyy2=$YY+2;}
    elseif($testY['LM']==$rY['LM']){$Qmm=$testY['LM']; $Qmm2=$rY['LM']; $Qyy=$YY+2; $Qyy2=$YY+4; }
  }
  elseif($testY['LY']==0 AND $rY['LY']==3){ $Qmm=$testY['LM']; $Qmm2=$rY['LM']; $Qyy=$YY; $Qyy2=$YY+3;}
  elseif($testY['LY']==3 AND $rY['LY']==0){ $Qmm=$testY['LM']; $Qmm2=$rY['LM']; $Qyy=$YY+3; $Qyy2=$YY+3;}
  elseif($testY['LY']==1 AND $rY['LY']==3){ $Qmm=$testY['LM']; $Qmm2=$rY['LM']; $Qyy=$YY+1; $Qyy2=$YY+3;}
  elseif($testY['LY']==3 AND $rY['LY']==1){ $Qmm=$testY['LM']; $Qmm2=$rY['LM']; $Qyy=$YY+3; $Qyy2=$YY+4;}
  elseif($testY['LY']==2 AND $rY['LY']==3){ $Qmm=$testY['LM']; $Qmm2=$rY['LM']; $Qyy=$YY+2; $Qyy2=$YY+3;}
  elseif($testY['LY']==3 AND $rY['LY']==2){ $Qmm=$testY['LM']; $Qmm2=$rY['LM']; $Qyy=$YY+3; $Qyy2=$YY+4;}
  elseif($testY['LY']==3 AND $rY['LY']==3)
  { 
    if($testY['LM']>$rY['LM']){$Qmm=$testY['LM']; $Qmm2=$rY['LM']; $Qyy=$YY+3; $Qyy2=$YY+4; }
	elseif($testY['LM']<$rY['LM']){$Qmm=$testY['LM']; $Qmm2=$rY['LM']; $Qyy=$YY+3; $Qyy2=$YY+3;}
    elseif($testY['LM']==$rY['LM']){$Qmm=$testY['LM']; $Qmm2=$rY['LM']; $Qyy=$YY+3; $Qyy2=$YY+6; }
  }
  elseif($testY['LY']==0 AND $rY['LY']==4){ $Qmm=$testY['LM']; $Qmm2=$rY['LM']; $Qyy=$YY; $Qyy2=$YY+4;}
  elseif($testY['LY']==4 AND $rY['LY']==0){ $Qmm=$testY['LM']; $Qmm2=$rY['LM']; $Qyy=$YY+4; $Qyy2=$YY+4;}
  elseif($testY['LY']==1 AND $rY['LY']==4){ $Qmm=$testY['LM']; $Qmm2=$rY['LM']; $Qyy=$YY+1; $Qyy2=$YY+4;}
  elseif($testY['LY']==4 AND $rY['LY']==1){ $Qmm=$testY['LM']; $Qmm2=$rY['LM']; $Qyy=$YY+4; $Qyy2=$YY+5;}
  elseif($testY['LY']==2 AND $rY['LY']==4){ $Qmm=$testY['LM']; $Qmm2=$rY['LM']; $Qyy=$YY+2; $Qyy2=$YY+4;}
  elseif($testY['LY']==4 AND $rY['LY']==2){ $Qmm=$testY['LM']; $Qmm2=$rY['LM']; $Qyy=$YY+4; $Qyy2=$YY+5;}
  elseif($testY['LY']==3 AND $rY['LY']==4){ $Qmm=$testY['LM']; $Qmm2=$rY['LM']; $Qyy=$YY+3; $Qyy2=$YY+4;}
  elseif($testY['LY']==4 AND $rY['LY']==3){ $Qmm=$testY['LM']; $Qmm2=$rY['LM']; $Qyy=$YY+4; $Qyy2=$YY+5;}
  elseif($testY['LY']==4 AND $rY['LY']==4)
  { 
    if($testY['LM']>$rY['LM']){$Qmm=$testY['LM']; $Qmm2=$rY['LM']; $Qyy=$YY+4; $Qyy2=$YY+5; }
	elseif($testY['LM']<$rY['LM']){$Qmm=$testY['LM']; $Qmm2=$rY['LM']; $Qyy=$YY+4; $Qyy2=$YY+4;}
    elseif($testY['LM']==$rY['LM']){$Qmm=$testY['LM']; $Qmm2=$rY['LM']; $Qyy=$YY+4; $Qyy2=$YY+8; }
  }
  elseif($testY['LY']==0 AND $rY['LY']==5){ $Qmm=$testY['LM']; $Qmm2=$rY['LM']; $Qyy=$YY; $Qyy2=$YY+5;}
  elseif($testY['LY']==5 AND $rY['LY']==0){ $Qmm=$testY['LM']; $Qmm2=$rY['LM']; $Qyy=$YY+5; $Qyy2=$YY+5;}
  elseif($testY['LY']==1 AND $rY['LY']==5){ $Qmm=$testY['LM']; $Qmm2=$rY['LM']; $Qyy=$YY+1; $Qyy2=$YY+5;}
  elseif($testY['LY']==5 AND $rY['LY']==1){ $Qmm=$testY['LM']; $Qmm2=$rY['LM']; $Qyy=$YY+5; $Qyy2=$YY+6;}
  elseif($testY['LY']==2 AND $rY['LY']==5){ $Qmm=$testY['LM']; $Qmm2=$rY['LM']; $Qyy=$YY+2; $Qyy2=$YY+5;}
  elseif($testY['LY']==5 AND $rY['LY']==2){ $Qmm=$testY['LM']; $Qmm2=$rY['LM']; $Qyy=$YY+5; $Qyy2=$YY+6;}
  elseif($testY['LY']==3 AND $rY['LY']==5){ $Qmm=$testY['LM']; $Qmm2=$rY['LM']; $Qyy=$YY+3; $Qyy2=$YY+5;}
  elseif($testY['LY']==5 AND $rY['LY']==3){ $Qmm=$testY['LM']; $Qmm2=$rY['LM']; $Qyy=$YY+5; $Qyy2=$YY+6;}
  elseif($testY['LY']==4 AND $rY['LY']==5){ $Qmm=$testY['LM']; $Qmm2=$rY['LM']; $Qyy=$YY+4; $Qyy2=$YY+5;}
  elseif($testY['LY']==5 AND $rY['LY']==4){ $Qmm=$testY['LM']; $Qmm2=$rY['LM']; $Qyy=$YY+5; $Qyy2=$YY+6;}
  elseif($testY['LY']==5 AND $rY['LY']==5)
  { 
    if($testY['LM']>$rY['LM']){$Qmm=$testY['LM']; $Qmm2=$rY['LM']; $Qyy=$YY+5; $Qyy2=$YY+6; }
	elseif($testY['LM']<$rY['LM']){$Qmm=$testY['LM']; $Qmm2=$rY['LM']; $Qyy=$YY+5; $Qyy2=$YY+5;}
    elseif($testY['LM']==$rY['LM']){$Qmm=$testY['LM']; $Qmm2=$rY['LM']; $Qyy=$YY+5; $Qyy2=$YY+10; }
  }
  else {$Qmm=0; $Qmm2=0; $Qyy=0; $Qyy2=0;}
  $QQ=$Qyy2-$Qyy;
  include("ProdPlanCalReq2T.php"); //$Qyy.'-'.$Qmm.'---'.$Qyy2.'-'.$Qmm2.'-'.
  if($testrowsY>0){ ?>
  <td align="right" bgcolor="<?php if($Tott>0){ echo '#FF80FF'; } ?>">
  <?php echo $Tott; ?>&nbsp;<input type="hidden" id="StmtReq2_<?php echo $Sn.'_'.$resSe33['SeasonId']; ?>" value="<?php if($Tott>0){echo $Tott;}else{echo 0;} ?>" /></td>
<?php $sqlrec2=mysql_query("select Buffer from hrm_sales_product_plan where ProductId=".$res['ProductId']." AND SeasonId=".$resSe33['SeasonId']." AND M=".$LastMM." AND Y=".$LastYY, $con); $rowrec2=mysql_num_rows($sqlrec2); $resrec2=mysql_fetch_assoc($sqlrec2); if($resrec2['Buffer']!=''){$Buff2=$resrec2['Buffer'];}else{$Buff2=0;} $Total2=$Tott+$Buff2; ?>  
  <td align="center"><input id="Buff2_<?php echo $Sn.'_'.$resSe33['SeasonId']; ?>" value="<?php if($Buff2>0){echo $Buff2; }else{ echo 0;} ?>" onChange="FunCalcy2(this.value,<?php echo $Sn.', '.$resSe33['SeasonId']; ?>)" onKeyUp="FunCalcy2(this.value,<?php echo $Sn.', '.$resSe33['SeasonId']; ?>)" onBlur="FunCalcy2(this.value,<?php echo $Sn.', '.$resSe33['SeasonId']; ?>)" class="InputRec" readonly style="background-color:<?php if($rowrec2>0){echo '#FFCCFF'; } ?>;" /></td> 
  <td align="center"><input id="TotReq2_<?php echo $Sn.'_'.$resSe33['SeasonId']; ?>" value="<?php if($Total2>0){echo $Total2;} ?>" class="InputRec" readonly /></td>
  <?php }else{ ?><td align="center">&nbsp;</td><td align="center">&nbsp;</td><td align="center">&nbsp;</td><?php } ?>
<?php } ?>
 <td bgcolor="#FFFFFF" align="center" id="TD_<?php echo $Sn.'_'.$resSe33['SeasonId']; ?>">
 <img src="images/edit.png" border="0" alt="Edit" id="EB2_<?php echo $Sn.'_'.$resSe33['SeasonId']; ?>" onClick="editD2(<?php echo $Sn.', '.$resSe33['SeasonId']; ?>)" style="display:<?php if($testrowsY>0 AND $Tott>0){ echo 'block'; } else{echo 'none';} ?>;">
 <img src="images/Floppy-Small-icon.png" border="0" alt="Save" id="SB2_<?php echo $Sn.'_'.$resSe33['SeasonId']; ?>" onClick="saveD2(<?php echo $Sn.', '.$AfterYId.', '.$res['ProductId'].', '.$resSe33['SeasonId'].', '.$LastMM.', '.$LastYY; ?>)" style="display:none;"></td> 
<?php } ?>								  
  </tr>	
<?php $Sn++; } ?>  	 
</table>	   	       
<?php } ?>
    </td>
   </tr>   	
  </table>
 </td>
</tr>
<tr><td><span id="AStockSpan"></span></td></tr>
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
