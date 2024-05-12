<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');}
include("../function.php");
include('codeEncDec.php');
if(check_user()==false){header('Location:../../../index.php');}
if($_SESSION['login'] = true){require_once('UserMenuSession.php');}

if($_REQUEST['act']=='MoveHQ'){ $sqlUp=mysql_query("update hrm_sales_dealer set HqId=".$_REQUEST['mh']." where DealerId=".$_REQUEST['DI'],$con); 
}

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
function ChangrYear(YearV,ci) 
{
  var c=0; var s=0; var hq=0;
  window.location="ArrengeDealer.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y="+YearV+"&ci="+ci+"&c="+c+"&s="+s+"&hq="+hq;
}

function ClickCoutry(v)
{ 
  var State=0; var Hq=0; var y=document.getElementById("YearV").value; var CId=document.getElementById('ComId').value;
  window.location="ArrengeDealer.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&c="+v+"&s="+State+"&hq="+Hq+"&y="+y+"&ci="+CId; 
}
function ClickState(v)
{
  var Coutry=document.getElementById("Coutry").value; var Hq=0; var y=document.getElementById("YearV").value; var CId=document.getElementById('ComId').value;
  window.location="ArrengeDealer.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&c="+Coutry+"&s="+v+"&hq="+Hq+"&y="+y+"&ci="+CId; 
}
function ClickHq(v)
{
  var Coutry=document.getElementById("Coutry").value; var State=document.getElementById("State").value; var y=document.getElementById("YearV").value;
  var CId=document.getElementById('ComId').value;
  window.location="ArrengeDealer.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&c="+Coutry+"&s="+State+"&hq="+v+"&y="+y+"&ci="+CId;
}


function Click2State(value,sn)
{ var CId=document.getElementById('ComId').value; document.getElementById('snn').value=sn; 
  var url = 'SlctSalesCouStaCit.php'; var pars = 'StaId22='+value+'&CId='+CId+"&sn="+sn;	var myAjax = new Ajax.Request(
  url, { method: 'post', parameters: pars, onComplete: show_Hq });
}
function show_Hq(originalRequest)
{ var sn=document.getElementById("snn").value; document.getElementById('HqSpan_'+sn).innerHTML = originalRequest.responseText;  }

function Fun2Hq(sn){ document.getElementById("MoveHqSave_"+sn).disabled=false;
}


function FunClickMove(di,sn)
{
 var aa=confirm("Are you sure, you want move dealer head quarter");
 if(aa){ var Coutry=document.getElementById("Coutry").value; var State=document.getElementById("State").value; var y=document.getElementById("YearV").value;
  var CId=document.getElementById('ComId').value; var hq=document.getElementById("Hq").value; var mh=document.getElementById("Hq2_"+sn).value;
  window.location="ArrengeDealer.php?act=MoveHQ&ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&c="+Coutry+"&s="+State+"&hq="+hq+"&y="+y+"&ci="+CId+"&mh="+mh+"&DI="+di; }
 else{return false;}
}


/*
function FunUpLD(di,sn)
{ var UpLDFile=document.getElementById("At_csv_f"+sn).value;  var y=document.getElementById("YearV").value; 
  var url = 'Set2PlanUpLD.php';	var pars = 'Action=TarAChivUpload&UpLDF='+UpLDFile+'&sn='+sn+'&di='+di+'&y='+y;	var myAjax = new Ajax.Request(
  url, { method: 'post', parameters: pars, onComplete: show_UpMsg });
}
function show_UpMsg(originalRequest)
{ document.getElementById('ResultSpan').innerHTML = originalRequest.responseText; 
  var sn=document.getElementById("sn").value; document.getElementById("msg_"+sn).style.display='block';
}
*/
  
</Script>
</head>
<body class="body">
<span id="ResultSpan"></span>
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
<input type="hidden" id="snn" value="" />
<input type="hidden" id="ComId" value="<?php echo $_REQUEST['ci']; ?>" />
<input type="hidden" id="UserId" value="<?php echo $UserId; ?>" />
<input type="hidden" id="YearV" value="<?php echo $_REQUEST['y']; ?>" />			  
<table border="0" style="margin-top:0px; width:100%; height:150px;">	
<tr>
 <td valign="top">
  <table border="0">
   <tr>
    <td id="Entry" style="width:700px;" valign="top">
	<span id="TabEntry">
     <table border="0">
	  <tr>
		<td>&nbsp;</td>
	    <td style="font-size:11px;height:18px;width:90px;color:#E6E6E6;" align="right"><b>Country :</b></td>
	    <td><select style="font-size:12px;width:120px;height:20px;background-color:#DDFFBB;" name="Coutry" id="Coutry" onChange="ClickCoutry(this.value)"> 
<?php if($_REQUEST['c']>0){ $sqlC=mysql_query("SELECT CountryName FROM hrm_country where CountryId=".$_REQUEST['c'], $con); $resC=mysql_fetch_array($sqlC); ?>
<option value="<?php echo $_REQUEST['c']; ?>"><?php echo $resC['CountryName']; ?></option><?php }else{ ?><option value="">SELECT</option><?php } ?>		
<?php $SqlCountry=mysql_query("SELECT * FROM hrm_country order by CountryName ASC", $con); while($ResCountry=mysql_fetch_array($SqlCountry)) { ?>
<option value="<?php echo $ResCountry['CountryId']; ?>"><?php echo $ResCountry['CountryName']; ?></option><?php } ?></select>
       </td>
	   <td>&nbsp;</td>
	   <td style="font-size:11px;height:18px;width:80px;color:#E6E6E6;" align="right"><b>State :</b></td>
	    <td>
		 <select style="font-size:12px;width:180px;height:20px;background-color:#DDFFBB;" name="State" id="State" onChange="ClickState(this.value)">
<?php if($_REQUEST['s']>0){ $sqlS=mysql_query("SELECT StateName FROM hrm_state where StateId=".$_REQUEST['s'], $con); $resS=mysql_fetch_array($sqlS); ?>
<option value="<?php echo $_REQUEST['s']; ?>"><?php echo $resS['StateName']; ?></option><?php }else{ ?><option value="">SELECT</option><?php } ?>
<?php if($_REQUEST['c']>0){ $sqlS2 = mysql_query("SELECT * FROM hrm_state where CountryId=".$_REQUEST['c']." order by StateName ASC", $con); while($resS2 = mysql_fetch_array($sqlS2)){ ?><option value="<?php echo $resS2['StateId']; ?>"><?php echo $resS2['StateName']; ?></option><?php } ?>	
<?php } else{$sql = mysql_query("SELECT * FROM hrm_state order by StateName ASC", $con); while($res = mysql_fetch_array($sql)){ ?>
        <option value="<?php echo $res['StateId']; ?>"><?php echo $res['StateName']; ?></option><?php } } ?></select>
		</td>
		<td>&nbsp;</td>
		<td style="font-size:11px; height:18px;width:80px;color:#E6E6E6;" align="right"><b>HQ :</b></td>
	     <td>
		 <select style="font-size:12px;width:150px;height:20px;background-color:#DDFFBB;" name="Hq" id="Hq" onChange="ClickHq(this.value)">
<?php if($_REQUEST['hq']>0){ $sqlhq=mysql_query("SELECT HqName FROM hrm_headquater where HqId=".$_REQUEST['hq']." AND CompanyId=1", $con); $reshq=mysql_fetch_array($sqlhq); ?>
<option value="<?php echo $_REQUEST['hq']; ?>"><?php echo $reshq['HqName']; ?></option><?php }else{ ?><option value="">SELECT</option><?php } ?>
<?php if($_REQUEST['s']>0){ $sqlhq2 = mysql_query("SELECT * FROM hrm_headquater where StateId=".$_REQUEST['s']." AND CompanyId=1 AND HQStatus='A' order by HqName ASC", $con); while($reshq2 = mysql_fetch_array($sqlhq2)){ ?><option value="<?php echo $reshq2['HqId']; ?>"><?php echo $reshq2['HqName']; ?></option><?php } ?>
<?php }else { $sql = mysql_query("SELECT * FROM hrm_headquater where CompanyId=".$CompanyId." AND HQStatus='A' order by HqName ASC", $con); while($res = mysql_fetch_array($sql)){ ?><option value="<?php echo $res['HqId']; ?>"><?php echo $res['HqName']; ?></option><?php } } ?></select>
		 </td>
		 <td>&nbsp;</td>
	  </tr>
	   </table>
      </td>
   </tr>
  </table>
  </td>
  </tr>
  <tr>
    <td colspan="3" valign="top">
<table border="1" cellpadding="0" cellspacing="0" style="font-family:Times New Roman;font-size:14px;width:<?php if(($_REQUEST['c']>0 AND $_REQUEST['s']>0 AND $_REQUEST['hq']>0) OR ($_REQUEST['hq']>0)){echo '850';} /*elseif($_REQUEST['c']>0 AND $_REQUEST['s']>0){echo '1000';}elseif($_REQUEST['c']>0){echo '1200'; } */ ?>px; vertical-align:top;">	
   
   <tr style="background-color:#D9F28C;color:#000000;"> 
   <?php if($_REQUEST['hq']>0){ $sqlhq=mysql_query("SELECT HqName FROM hrm_headquater where HqId=".$_REQUEST['hq'], $con); $reshq=mysql_fetch_array($sqlhq); ?> <td colspan="2">&nbsp;&nbsp;<b>HeadQuarter:&nbsp;<?php echo $reshq['HqName']; ?></b>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $msgImp; ?></td>
   <td colspan="2" align="center" style="width:350px;"><b>MOVE</b></td><td></td>
   </tr>
   <?php } /* elseif($_REQUEST['s']>0){ $sqlS=mysql_query("SELECT StateName FROM hrm_state where StateId=".$_REQUEST['s'], $con); $resS=mysql_fetch_array($sqlS);?><td colspan="3">&nbsp;&nbsp;<b>State:&nbsp;<?php echo $resS['StateName']; ?></b>&nbsp;&nbsp;<?php echo $msgImp; ?></td>
   <td colspan="2" align="center" style="width:350px;"><b>MOVE</b></td><td></td>
   <?php } elseif($_REQUEST['c']>0){ $sqlC=mysql_query("SELECT CountryName FROM hrm_country where CountryId=".$_REQUEST['c'], $con); $resC=mysql_fetch_array($sqlC); ?> 
    <td colspan="4">&nbsp;&nbsp;<b>Country:&nbsp;<?php echo $resC['CountryName']; ?></b>&nbsp;&nbsp;<?php echo $msgImp; ?></td>
	<td colspan="2" align="center" style="width:350px;"><b>MOVE</b></td><td></td>
   <?php } */ ?>			
  </tr>	
  
   <tr style="background-color:#D5F1D1;color:#000000;"> 
   <?php if($_REQUEST['hq']>0){?> 
    <td align="center" style="width:30px;"><b>SN</b></td>
	<td align="center" style="width:400px;"><b>DEALER</b></td>
	<td align="center" style="width:175px;"><b>STATE</b></td>
	<td align="center" style="width:175px;"><b>HQ</b></td>
	<td align="center" style="width:60px;"><b>SAVE</b></td>
   <?php } /* elseif($_REQUEST['s']>0){?>
    <td align="center" style="width:30px;"><b>SN</b></td>
	<td align="center" style="width:150px;"><b>HQ</b></td>
	<td align="center" style="width:400px;"><b>DEALER</b></td>
	<td align="center" style="width:175px;"><b>STATE</b></td>
	<td align="center" style="width:175px;"><b>HQ</b></td>
	<td align="center" style="width:60px;"><b>SAVE</b></td>
   <?php } elseif($_REQUEST['c']>0){?> 
    <td align="center" style="width:30px;"><b>SN</b></td>
	<td align="center" style="width:150px;"><b>STATE</b></td>
	<td align="center" style="width:150px;"><b>HQ</b></td>
	<td align="center" style="width:400px;"><b>DEALER</b></td>
	<td align="center" style="width:175px;"><b>STATE</b></td>
	<td align="center" style="width:175px;"><b>HQ</b></td>
	<td align="center" style="width:65px;"><b>SAVE</b></td>
   <?php } */ ?>			
  </tr>	
<?php if($_REQUEST['hq']>0){$sqlDeal=mysql_query("select DealerId,DealerName,DealerCity from hrm_sales_dealer where HqId=".$_REQUEST['hq']." order by DealerName ASC",$con); $sn=1; $rowDeal=mysql_num_rows($sqlDeal); if($rowDeal>0){ while($resDeal=mysql_fetch_assoc($sqlDeal)){ ?>
 <tr bgcolor="#EEEEEE" style="height:22px;background-color:<?php if($i==1){echo '#E2F3D8'; }?>;"> 
<form name="FormNrv_<?php echo $sn; ?>" method="POST" enctype="multipart/form-data">
<?php $sqly=mysql_query("select FromDate,ToDate from hrm_year where YearId=".$_REQUEST['y'], $con); $resy=mysql_fetch_assoc($sqly); 
      $fromdate=date("Y",strtotime($resy['FromDate'])); $todate=date("Y",strtotime($resy['ToDate']));  
	  $NextYear=$_REQUEST['y']+1; $PrevYear=$_REQUEST['y']-1; $Prev2Year=$_REQUEST['y']-2;
	  $sqly2=mysql_query("select FromDate,ToDate from hrm_year where YearId=".$NextYear, $con); $resy2=mysql_fetch_assoc($sqly2);
	  $sqly3=mysql_query("select FromDate,ToDate from hrm_year where YearId=".$PrevYear, $con); $resy3=mysql_fetch_assoc($sqly3); ?>
	  <input type="hidden" name="DI" value="<?php echo $resDeal['DealerId']; ?>" /><input type="hidden" name="SN" value="<?php echo $sn; ?>" />
	  <input type="hidden" name="Befor2Y" value="<?php echo $Prev2Year; ?>" /><input type="hidden" name="Befor1Y" value="<?php echo $PrevYear; ?>" />
	  <input type="hidden" name="NextY" value="<?php echo $NextYear; ?>" />	<input type="hidden" name="YearV" value="<?php echo $_REQUEST['y']; ?>" />
     <td align="center"><?php echo $sn; ?></td>			 
     <td>&nbsp;<?php echo $resDeal['DealerName'].' - <font color="#79003D">'.$resDeal['DealerCity'].'</font> -- '.$resDeal['DealerId']; ?></td>
	 <td align="center">
	 <select style="font-size:12px;width:170px;height:20px;background-color:#DDFFBB;" name="State" id="State" onChange="Click2State(this.value,<?php echo $sn; ?>)">
         <option value="" selected>SELECT</option><?php $sql = mysql_query("SELECT * FROM hrm_state order by StateName ASC", $con); while($res = mysql_fetch_array($sql)){ ?>
         <option value="<?php echo $res['StateId']; ?>"><?php echo $res['StateName']; ?></option><?php } ?></select></td>
	 <td align="center">
	 <span id="HqSpan_<?php echo $sn; ?>">
	 <select style="font-size:12px;width:170px;height:20px;background-color:#DDFFBB;" id="Hq2_<?php echo $sn; ?>" onchange="Fun2Hq(<?php echo $sn; ?>)" disabled>
         <option value="" selected>SELECT</option><?php $sql = mysql_query("SELECT * FROM hrm_headquater where CompanyId=".$CompanyId." AND HQStatus='A' order by HqName ASC", $con); while($res = mysql_fetch_array($sql)){ ?><option value="<?php echo $res['HqId']; ?>"><?php echo $res['HqName']; ?></option><?php } ?></select></span></td>
	 <td align="center"><input type="button" style="width:55px;" id="MoveHqSave_<?php echo $sn; ?>" value="save" onclick="FunClickMove(<?php echo $resDeal['DealerId'].','.$sn; ?>)" disabled/></td>
</form>	 
 </tr>
<?php $sn++;} } else{echo '<tr bgcolor="#FFFFFF"><td colspan="6" style="color:#FF8000;font-size:14px;font-weight:bold;">&nbsp;Records Not Available..</td></tr>';} ?> 
<?php } /* elseif($_REQUEST['s']>0){$sqlDeal=mysql_query("select HqName,DealerId,DealerName,DealerCity from hrm_sales_dealer INNER JOIN hrm_headquater ON hrm_sales_dealer.HqId=hrm_headquater.HqId where hrm_headquater.StateId=".$_REQUEST['s']." order by HqName ASC, DealerName ASC",$con); $sn=1; $rowDeal=mysql_num_rows($sqlDeal); if($rowDeal>0){ while($resDeal=mysql_fetch_assoc($sqlDeal)){ $di=$resDeal['DealerId']; ?>
 <tr bgcolor="#EEEEEE" style="height:22px;background-color:<?php if($i==1){echo '#E2F3D8'; }?>;"> 
<form name="FormNrv_<?php echo $sn; ?>" method="POST" enctype="multipart/form-data">
<?php $sqly=mysql_query("select FromDate,ToDate from hrm_year where YearId=".$_REQUEST['y'], $con); $resy=mysql_fetch_assoc($sqly); 
      $fromdate=date("Y",strtotime($resy['FromDate'])); $todate=date("Y",strtotime($resy['ToDate']));  
	  $NextYear=$_REQUEST['y']+1; $PrevYear=$_REQUEST['y']-1; $Prev2Year=$_REQUEST['y']-2;
	  $sqly2=mysql_query("select FromDate,ToDate from hrm_year where YearId=".$NextYear, $con); $resy2=mysql_fetch_assoc($sqly2);
	  $sqly3=mysql_query("select FromDate,ToDate from hrm_year where YearId=".$PrevYear, $con); $resy3=mysql_fetch_assoc($sqly3); ?>
	  <input type="hidden" name="DI" value="<?php echo $resDeal['DealerId']; ?>" /><input type="hidden" name="SN" value="<?php echo $sn; ?>" />
	  <input type="hidden" name="Befor2Y" value="<?php echo $Prev2Year; ?>" /><input type="hidden" name="Befor1Y" value="<?php echo $PrevYear; ?>" />
	  <input type="hidden" name="NextY" value="<?php echo $NextYear; ?>" />	<input type="hidden" name="YearV" value="<?php echo $_REQUEST['y']; ?>" />
     <td align="center"><?php echo $sn; ?></td>		
     <td>&nbsp;<?php echo $resDeal['HqName']; ?></td>	 
     <td>&nbsp;<?php echo $resDeal['DealerName'].' - <font color="#79003D">'.$resDeal['DealerCity'].'</font> -- '.$resDeal['DealerId']; ?></td>
	 <td align="center">
	 <select style="font-size:12px;width:170px;height:20px;background-color:#DDFFBB;" name="State" id="State" onChange="Click2State(this.value,<?php echo $sn; ?>)">
         <option value="" selected>SELECT</option><?php $sql = mysql_query("SELECT * FROM hrm_state order by StateName ASC", $con); while($res = mysql_fetch_array($sql)){ ?>
         <option value="<?php echo $res['StateId']; ?>"><?php echo $res['StateName']; ?></option><?php } ?></select></td>
	 <td align="center">
	  <span id="HqSpan_<?php echo $sn; ?>">
	 <select style="font-size:12px;width:170px;height:20px;background-color:#DDFFBB;" id="Hq2_<?php echo $sn; ?>" onchange="Fun2Hq(<?php echo $sn; ?>)" disabled>
         <option value="" selected>SELECT</option><?php $sql = mysql_query("SELECT * FROM hrm_headquater where CompanyId=".$CompanyId." AND HQStatus='A' order by HqName ASC", $con); while($res = mysql_fetch_array($sql)){ ?><option value="<?php echo $res['HqId']; ?>"><?php echo $res['HqName']; ?></option><?php } ?></select></span></td>
	 <td align="center"><input type="button" style="width:55px;" id="MoveHqSave_<?php echo $sn; ?>" value="save" onclick="FunClickMove(<?php echo $resDeal['DealerId'].','.$sn; ?>)" disabled/></td>
</form>	 
 </tr>
<?php $sn++;} } else{echo '<tr bgcolor="#FFFFFF"><td colspan="6" style="color:#FF8000;font-size:14px;font-weight:bold;">&nbsp;Records Not Available..</td></tr>';} ?> 
<?php  } elseif($_REQUEST['c']>0){ $sqlDeal=mysql_query("select StateName,HqName,DealerId,DealerName,DealerCity from hrm_sales_dealer INNER JOIN hrm_headquater ON hrm_sales_dealer.HqId=hrm_headquater.HqId INNER JOIN hrm_state ON hrm_headquater.StateId=hrm_state.StateId where hrm_state.CountryId=".$_REQUEST['c']." order by StateName ASC,HqName ASC,DealerName ASC",$con); $sn=1; $rowDeal=mysql_num_rows($sqlDeal); if($rowDeal>0){ while($resDeal=mysql_fetch_assoc($sqlDeal)){ 
$di=$resDeal['DealerId']; ?>
 <tr bgcolor="#EEEEEE" style="height:22px;background-color:<?php if($i==1){echo '#E2F3D8'; }?>;"> 
<form name="FormNrv_<?php echo $sn; ?>" method="POST" enctype="multipart/form-data">
<?php $sqly=mysql_query("select FromDate,ToDate from hrm_year where YearId=".$_REQUEST['y'], $con); $resy=mysql_fetch_assoc($sqly); 
      $fromdate=date("Y",strtotime($resy['FromDate'])); $todate=date("Y",strtotime($resy['ToDate']));  
	  $NextYear=$_REQUEST['y']+1; $PrevYear=$_REQUEST['y']-1; $Prev2Year=$_REQUEST['y']-2;
	  $sqly2=mysql_query("select FromDate,ToDate from hrm_year where YearId=".$NextYear, $con); $resy2=mysql_fetch_assoc($sqly2);
	  $sqly3=mysql_query("select FromDate,ToDate from hrm_year where YearId=".$PrevYear, $con); $resy3=mysql_fetch_assoc($sqly3); ?>
	  <input type="hidden" name="DI" value="<?php echo $resDeal['DealerId']; ?>" /><input type="hidden" name="SN" value="<?php echo $sn; ?>" />
	  <input type="hidden" name="Befor2Y" value="<?php echo $Prev2Year; ?>" /><input type="hidden" name="Befor1Y" value="<?php echo $PrevYear; ?>" />
	  <input type="hidden" name="NextY" value="<?php echo $NextYear; ?>" />	<input type="hidden" name="YearV" value="<?php echo $_REQUEST['y']; ?>" />
     <td align="center"><?php echo $sn; ?></td>	
	 <td>&nbsp;<?php echo $resDeal['StateName']; ?></td>	
     <td>&nbsp;<?php echo $resDeal['HqName']; ?></td>	 
     <td>&nbsp;<?php echo $resDeal['DealerName'].' - <font color="#79003D">'.$resDeal['DealerCity'].'</font> -- '.$resDeal['DealerId']; ?></td>
	 <td align="center">
	 <select style="font-size:12px;width:170px;height:20px;background-color:#DDFFBB;" name="State" id="State" onChange="Click2State(this.value,<?php echo $sn; ?>)">
         <option value="" selected>SELECT</option><?php $sql = mysql_query("SELECT * FROM hrm_state order by StateName ASC", $con); while($res = mysql_fetch_array($sql)){ ?>
         <option value="<?php echo $res['StateId']; ?>"><?php echo $res['StateName']; ?></option><?php } ?></select></td>
	 <td align="center">
	 <span id="HqSpan_<?php echo $sn; ?>">
	 <select style="font-size:12px;width:170px;height:20px;background-color:#DDFFBB;" id="Hq2_<?php echo $sn; ?>" onchange="Fun2Hq(<?php echo $sn; ?>)" disabled>
         <option value="" selected>SELECT</option><?php $sql = mysql_query("SELECT * FROM hrm_headquater where CompanyId=".$CompanyId." AND HQStatus='A' order by HqName ASC", $con); while($res = mysql_fetch_array($sql)){ ?><option value="<?php echo $res['HqId']; ?>"><?php echo $res['HqName']; ?></option><?php } ?></select></span></td>
	 <td align="center"><input type="button" style="width:55px;" id="MoveHqSave_<?php echo $sn; ?>" value="save" onclick="FunClickMove(<?php echo $resDeal['DealerId'].','.$sn; ?>)" disabled/></td>
</form>	 
 </tr>
</form> 
<?php $sn++;} } else{echo '<tr bgcolor="#FFFFFF"><td colspan="6" style="color:#FF8000;font-size:14px;font-weight:bold;">&nbsp;Records Not Available..</td></tr>';} ?> 
<?php } */ ?> 	  	  
</table>	  
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
