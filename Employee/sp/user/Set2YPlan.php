<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');}
include("../function.php");
include('codeEncDec.php');
if(check_user()==false){header('Location:../../../index.php');}
if($_SESSION['login'] = true){require_once('UserMenuSession.php');}
?>
<?php 
if(isset($_POST['SaveAchTgt']))
{ 

 if ($_FILES['Ach_csv_file']['error'] > 0) {
  echo "Error: " . $_FILES['Ach_csv_file']['error'] . "<br />"; 
 }else{  
  if (($handle = fopen($_FILES['Ach_csv_file']['tmp_name'], "r"))!== FALSE) {
  $ctr = 1; // used to exclude the CSV header
  while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) { 
  $c1 = mysql_real_escape_string($data[1]); $c3 = mysql_real_escape_string($data[3]);
  $c6 = mysql_real_escape_string($data[6]); $c9 = mysql_real_escape_string($data[9]); $c12 = mysql_real_escape_string($data[12]); $c15 = mysql_real_escape_string($data[15]);
  $c18 = mysql_real_escape_string($data[18]); $c21 = mysql_real_escape_string($data[21]); $c24 = mysql_real_escape_string($data[24]); $c27 = mysql_real_escape_string($data[27]);
  $c30 = mysql_real_escape_string($data[30]); $c33 = mysql_real_escape_string($data[33]); $c36 = mysql_real_escape_string($data[36]); $c39 = mysql_real_escape_string($data[39]);  
  if($c6=='' OR $c6=='#N/A'){$c6_c=0;}else{$c6_c=$c6;} if($c9=='' OR $c9=='#N/A'){$c9_c=0;}else{$c9_c=$c9;} if($c12=='' OR $c12=='#N/A'){$c12_c=0;}else{$c12_c=$c12;} 
  if($c15=='' OR $c15=='#N/A'){$c15_c=0;}else{$c15_c=$c15;} if($c18=='' OR $c18=='#N/A'){$c18_c=0;}else{$c18_c=$c18;} if($c21=='' OR $c21=='#N/A'){$c21_c=0;}else{$c21_c=$c21;} 
  if($c24=='' OR $c24=='#N/A'){$c24_c=0;}else{$c24_c=$c24;} if($c27=='' OR $c27=='#N/A'){$c27_c=0;}else{$c27_c=$c27;} if($c30=='' OR $c30=='#N/A'){$c30_c=0;}else{$c30_c=$c30;} 
  if($c33=='' OR $c33=='#N/A'){$c33_c=0;}else{$c33_c=$c33;} if($c36=='' OR $c36=='#N/A'){$c36_c=0;}else{$c36_c=$c36;} if($c39=='' OR $c39=='#N/A'){$c39_c=0;}else{$c39_c=$c39;}
  if($ctr > 1 AND $c1>0 AND $c3>0 AND ($c6_c>0 OR $c9_c>0 OR $c12_c>0 OR $c15_c>0 OR $c18_c>0 OR $c21_c>0 OR $c24_c>0 OR $c27_c>0 OR $c30_c>0 OR $c33_c>0 OR $c36_c>0 OR $c39_c>0))
  { 
    $sql=mysql_query("Select * from hrm_sales_sal_details WHERE DealerId=".$_POST['DI']." AND ItemId=".$c1." AND ProductId=".$c3." AND YearId=".$_POST['YearV'], $con); 
    $rows = mysql_num_rows($sql); 
	if($rows>0){ $sqlUp = mysql_query("UPDATE hrm_sales_sal_details SET M1_Ach='".$c6_c."',M2_Ach='".$c9_c."',M3_Ach='".$c12_c."',M4_Ach='".$c15_c."',M5_Ach='".$c18_c."',M6_Ach='".$c21_c."',M7_Ach='".$c24_c."',M8_Ach='".$c27_c."',M9_Ach='".$c30_c."',M10_Ach='".$c33_c."',M11_Ach='".$c36_c."',M12_Ach='".$c39_c."' WHERE DealerId=".$_POST['DI']." AND ItemId=".$c1." AND ProductId=".$c3." AND YearId=".$_POST['YearV'], $con); }
	elseif($rows==0){ $sqlUp = mysql_query("insert into hrm_sales_sal_details(DealerId, ItemId, ProductId, YearId, M1_Ach, M2_Ach, M3_Ach, M4_Ach, M5_Ach, M6_Ach, M7_Ach, M8_Ach, M9_Ach, M10_Ach, M11_Ach, M12_Ach) values(".$_POST['DI'].", ".$c1.", ".$c3.", ".$_POST['YearV'].", ".$c6_c.", ".$c9_c.", ".$c12_c.", ".$c15_c.", ".$c18_c.", ".$c21_c.", ".$c24_c.", ".$c27_c.", ".$c30_c.", ".$c33_c.", ".$c36_c.", ".$c39_c.")", $con);	}
	}
    else { $ctr++; }
   }
   fclose($handle);
   if($sql){ $msgImp= '<font color="#008000"><b>Product achivement details for ID '.$_POST['DI'].' uploaded successfully...</b></font>';}
  }
 }

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
  window.location="Set2YPlan.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y="+YearV+"&ci="+ci+"&c="+c+"&s="+s+"&hq="+hq;
}

function ClickCoutry(v)
{ 
  var State=0; var Hq=0; var y=document.getElementById("YearV").value;
  window.location="Set2YPlan.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&c="+v+"&s="+State+"&hq="+Hq+"&y="+y; 
}
function ClickState(v)
{
  var Coutry=document.getElementById("Coutry").value; var Hq=0; var y=document.getElementById("YearV").value;
  window.location="Set2YPlan.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&c="+Coutry+"&s="+v+"&hq="+Hq+"&y="+y; 
}
function ClickHq(v)
{
  var Coutry=document.getElementById("Coutry").value; var State=document.getElementById("State").value; var y=document.getElementById("YearV").value;
  window.location="Set2YPlan.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&c="+Coutry+"&s="+State+"&hq="+v+"&y="+y;
}

function FunTxls()
{ window.open("FormateFile.php?act=AchFileOpen","MyFile","width=200,height=200");}
  
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
<input type="hidden" id="ComId" value="<?php echo $_REQUEST['ci']; ?>" />
<input type="hidden" id="UserId" value="<?php echo $UserId; ?>" />
<input type="hidden" id="YId" value="<?php echo $YearId; ?>" />			  
<table border="0" style="margin-top:0px; width:100%; height:150px;">	
<tr>
 <td valign="top">
  <table border="0">
   <tr>
    <td id="Entry" style="width:1000px;" valign="top">
	<span id="TabEntry">
     <table border="0">
	  <tr>
	   <td style="font-size:14px;height:18px;width:100px; color:#FFFF6A;" align="right"><b>YearWise-></b>&nbsp;</td>
	   <td style="font-size:11px;height:18px;width:90px;color:#E6E6E6;" align="right"><b>Year:</b>&nbsp;</td>
	     <td style="width:90px;">
		 <select style="font-size:12px;width:90px;height:20px;background-color:#DDFFBB;" name="YearV" id="YearV" onChange="ChangrYear(this.value, <?php echo $_REQUEST['ci']; ?>)"> 
<?php $sqly=mysql_query("select FromDate,ToDate from hrm_year where YearId=".$_REQUEST['y'], $con); $resy=mysql_fetch_assoc($sqly); 
      $fromdate=date("Y",strtotime($resy['FromDate'])); $todate=date("Y",strtotime($resy['ToDate'])); $NextYear=$_REQUEST['y']+1; $PrevYear=$_REQUEST['y']-1; 
	  $sqly2=mysql_query("select FromDate,ToDate from hrm_year where YearId=".$NextYear, $con); $resy2=mysql_fetch_assoc($sqly2);
	  $sqly3=mysql_query("select FromDate,ToDate from hrm_year where YearId=".$PrevYear, $con); $resy3=mysql_fetch_assoc($sqly3); ?>		
         <option value="<?php echo $_REQUEST['y']; ?>" selected><?php echo $fromdate.'-'.$todate; ?></option>
<?php if($PrevYear>=1){?><option value="<?php echo $PrevYear; ?>"><?php echo date("Y",strtotime($resy3['FromDate'])).'-'.date("Y",strtotime($resy3['ToDate'])); ?></option><?php } ?><option value="<?php echo $NextYear; ?>"><?php echo date("Y",strtotime($resy2['FromDate'])).'-'.date("Y",strtotime($resy2['ToDate'])); ?></option></select>
        </td>
		<td>&nbsp;</td>
	    
	    <td style="font-size:11px;height:18px;width:90px;color:#E6E6E6;" align="right"><b>Country :</b></td>
	    <td><select style="font-size:12px;width:120px;height:20px;background-color:#DDFFBB;" name="Coutry" id="Coutry" onChange="ClickCoutry(this.value)"> 
<?php if($_REQUEST['c']>0){ $sqlC=mysql_query("SELECT CountryName FROM hrm_country where CountryId=".$_REQUEST['c'], $con); $resC=mysql_fetch_array($sqlC); ?>
<option value="<?php echo $_REQUEST['c']; ?>"><?php echo strtoupper($resC['CountryName']); ?></option><?php }else{ ?><option value="">SELECT</option><?php } ?>		
<?php $SqlCountry=mysql_query("SELECT * FROM hrm_country order by CountryName ASC", $con); while($ResCountry=mysql_fetch_array($SqlCountry)) { ?>
<option value="<?php echo $ResCountry['CountryId']; ?>"><?php echo strtoupper($ResCountry['CountryName']); ?></option><?php } ?></select>
       </td>
	   <td>&nbsp;</td>
	   <td style="font-size:11px;height:18px;width:80px;color:#E6E6E6;" align="right"><b>State :</b></td>
	    <td>
		 <span id="StateSpan">
		 <select style="font-size:12px;width:180px;height:20px;background-color:#DDFFBB;" name="State" id="State" onChange="ClickState(this.value)">
<?php if($_REQUEST['s']>0){ $sqlS=mysql_query("SELECT StateName FROM hrm_state where StateId=".$_REQUEST['s'], $con); $resS=mysql_fetch_array($sqlS); ?>
<option value="<?php echo $_REQUEST['s']; ?>"><?php echo strtoupper($resS['StateName']); ?></option><?php }else{ ?><option value="">SELECT</option><?php } ?>
<?php if($_REQUEST['c']>0){ $sqlS2 = mysql_query("SELECT * FROM hrm_state where CountryId=".$_REQUEST['c']." order by StateName ASC", $con); while($resS2 = mysql_fetch_array($sqlS2)){ ?><option value="<?php echo $resS2['StateId']; ?>"><?php echo strtoupper($resS2['StateName']); ?></option><?php } ?>	
<?php } else{$sql = mysql_query("SELECT * FROM hrm_state order by StateName ASC", $con); while($res = mysql_fetch_array($sql)){ ?>
        <option value="<?php echo $res['StateId']; ?>"><?php echo strtoupper($res['StateName']); ?></option><?php } } ?></select>
		 </span>
		</td>
		<td>&nbsp;</td>
		<td style="font-size:11px; height:18px;width:80px;color:#E6E6E6;" align="right"><b>HQ :</b></td>
	     <td>
		 <span id="HqSpan">
		 <select style="font-size:12px;width:150px;height:20px;background-color:#DDFFBB;" name="Hq" id="Hq" onChange="ClickHq(this.value)">
<?php if($_REQUEST['hq']>0){ $sqlhq=mysql_query("SELECT HqName FROM hrm_headquater where HqId=".$_REQUEST['hq']." AND CompanyId=1", $con); $reshq=mysql_fetch_array($sqlhq); ?>
<option value="<?php echo $_REQUEST['hq']; ?>"><?php echo strtoupper($reshq['HqName']); ?></option><?php }else{ ?><option value="">SELECT</option><?php } ?>
<?php if($_REQUEST['s']>0){ $sqlhq2 = mysql_query("SELECT * FROM hrm_headquater where StateId=".$_REQUEST['s']." AND CompanyId=1 AND HQStatus='A' order by HqName ASC", $con); while($reshq2 = mysql_fetch_array($sqlhq2)){ ?><option value="<?php echo $reshq2['HqId']; ?>"><?php echo strtoupper($reshq2['HqName']); ?></option><?php } ?>
<?php }else { $sql = mysql_query("SELECT * FROM hrm_headquater where CompanyId=".$CompanyId." AND HQStatus='A' order by HqName ASC", $con); while($res = mysql_fetch_array($sql)){ ?><option value="<?php echo $res['HqId']; ?>"><?php echo strtoupper($res['HqName']); ?></option><?php } } ?></select>
		 </span>
		 </td>
		 <td>&nbsp;&nbsp;&nbsp;</td>
		 <td><b><a href="#" onClick="FunTxls('xls')" style="width:90px;font-size:12px; color:#FFFFFF;">Formate</a></b></td>
	  </tr>
	   </table>
      </td>
   </tr>
  </table>
  </td>
  </tr>
  <tr>
    <td colspan="3" valign="top">
<table border="1" cellpadding="0" cellspacing="0" style="font-family:Times New Roman;font-size:14px;width:<?php if(($_REQUEST['c']>0 AND $_REQUEST['s']>0 AND $_REQUEST['hq']>0) OR ($_REQUEST['hq']>0)){echo '850';}elseif($_REQUEST['c']>0 AND $_REQUEST['s']>0){echo '1000';}elseif($_REQUEST['c']>0){echo '1200'; }?>px; vertical-align:top;">	
   
   <tr style="background-color:#D9F28C;color:#000000;"> 
   <?php if($_REQUEST['hq']>0){ $sqlhq=mysql_query("SELECT HqName FROM hrm_headquater where HqId=".$_REQUEST['hq'], $con); $reshq=mysql_fetch_array($sqlhq); ?> <td colspan="4">&nbsp;&nbsp;<b>HeadQuarter:&nbsp;<?php echo strtoupper($reshq['HqName']); ?></b>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $msgImp; ?></td>
   <?php } elseif($_REQUEST['s']>0){ $sqlS=mysql_query("SELECT StateName FROM hrm_state where StateId=".$_REQUEST['s'], $con); $resS=mysql_fetch_array($sqlS);?><td colspan="5">&nbsp;&nbsp;<b>State:&nbsp;<?php echo strtoupper($resS['StateName']); ?></b>&nbsp;&nbsp;<?php echo $msgImp; ?></td>
   <?php } elseif($_REQUEST['c']>0){ $sqlC=mysql_query("SELECT CountryName FROM hrm_country where CountryId=".$_REQUEST['c'], $con); $resC=mysql_fetch_array($sqlC); ?> 
    <td colspan="6">&nbsp;&nbsp;<b>Country:&nbsp;<?php echo strtoupper($resC['CountryName']); ?></b>&nbsp;&nbsp;<?php echo $msgImp; ?></td>
   <?php } ?>			
  </tr>	
  
   <tr style="background-color:#D5F1D1;color:#000000;"> 
   <?php if($_REQUEST['hq']>0){?> 
    <td align="center" style="width:30px;"><b>SN</b></td>
	<td align="center" style="width:400px;"><b>DEALER</b></td>
	<td align="center" style="width:350px;"><b>IMPORT</b></td>
	<td align="center" style="width:60px;"><b>SAVE</b></td>
   <?php } elseif($_REQUEST['s']>0){?>
    <td align="center" style="width:30px;"><b>SN</b></td>
	<td align="center" style="width:150px;"><b>HQ</b></td>
	<td align="center" style="width:400px;"><b>DEALER</b></td>
	<td align="center" style="width:350px;"><b>IMPORT</b></td>
	<td align="center" style="width:60px;"><b>SAVE</b></td>
   <?php } elseif($_REQUEST['c']>0){?> 
    <td align="center" style="width:30px;"><b>SN</b></td>
	<td align="center" style="width:150px;"><b>STATE</b></td>
	<td align="center" style="width:150px;"><b>HQ</b></td>
	<td align="center" style="width:400px;"><b>DEALER</b></td>
	<td align="center" style="width:350px;"><b>IMPORT</b></td>
	<td align="center" style="width:65px;"><b>SAVE</b></td>
   <?php } ?>			
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
	 <td><input type="file" name="Ach_csv_file" id="Ach_csv_file" style="width:300px;" size="30"/></td>
	 <td align="center"><input type="submit" style="width:60px;" name="SaveAchTgt" value="Upload" id="AchTgtId"/></td>
</form>	 
 </tr>
<?php $sn++;} } else{echo '<tr bgcolor="#FFFFFF"><td colspan="6" style="color:#FF8000;font-size:14px;font-weight:bold;">&nbsp;Records Not Available..</td></tr>';} ?> 
<?php } elseif($_REQUEST['s']>0){$sqlDeal=mysql_query("select HqName,DealerId,DealerName,DealerCity from hrm_sales_dealer INNER JOIN hrm_headquater ON hrm_sales_dealer.HqId=hrm_headquater.HqId where hrm_headquater.StateId=".$_REQUEST['s']." order by HqName ASC, DealerName ASC",$con); $sn=1; $rowDeal=mysql_num_rows($sqlDeal); if($rowDeal>0){ while($resDeal=mysql_fetch_assoc($sqlDeal)){ $di=$resDeal['DealerId']; ?>
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
	 <td><input type="file" name="Ach_csv_file" id="Ach_csv_file" style="width:300px;" size="30"/></td>
	 <td align="center"><input type="submit" style="width:60px;" name="SaveAchTgt" value="Upload" id="AchTgtId"/></td>
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
	 <td><input type="file" name="Ach_csv_file" id="Ach_csv_file" style="width:300px;" size="30"/></td>
	 <td align="center"><input type="submit" style="width:60px;" name="SaveAchTgt" value="Upload" id="AchTgtId"/></td>
</form>	 
 </tr>
</form> 
<?php $sn++;} } else{echo '<tr bgcolor="#FFFFFF"><td colspan="6" style="color:#FF8000;font-size:14px;font-weight:bold;">&nbsp;Records Not Available..</td></tr>';} ?> 
<?php } ?> 	  	  
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
