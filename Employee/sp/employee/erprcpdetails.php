<?php session_start();
require_once('../user/config/config.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>
<style> 
.td1{font-family:Times New Roman;color:#FFF;font-weight:bold;text-align:center;font-size:14px;background-color:#2356B6;height:24px;}.td2{font-family:Times New Roman;color:#000;text-align:center;font-size:12px;background-color:#FFFFFF;}.td3{font-family:Times New Roman;color:#000;font-size:14px;background-color:#FFFFFF;height:22px;text-transform:capitalize;}.td4{font-family:Times New Roman;color:#000;font-size:13px;background-color:#FFFFFF;text-align:right;}.itd4{font-family:Times New Roman;color:#000;font-size:14px;background-color:#FFFFFF;width:100%;border:hidden;text-align:right;}
</style>
<script src="js/jquery-1.9.1.js"></script>
<script type="text/javascript" src="js/jquery.freezeheader.js"></script>
<script type="text/jscript" language="javascript">
function Fun2Total(v)                                             
{ var a=parseFloat(v); //alert(v); 
  var Tt=parseFloat(document.getElementById("TtValue").value); //alert(Tt);
  document.getElementById("TtValue").value=Math.round((a+Tt)*1000)/1000;  
}

<!-- Grid open -->
$(document).ready(function () { $("#table1").freezeHeader({ 'height': '430px' }); })
<!-- Grid close -->
</script>
<body>

<?php if($_REQUEST['msg']=='spdetails')
{ $m=$_REQUEST['m']; $y=$_REQUEST['y']; $di=$_REQUEST['di']; $grp=$_REQUEST['grp']; $mf=$_REQUEST['mf']; 
$sqly=mysql_query("select FromDate,ToDate from hrm_sales_year where YearId=".$y, $con); $resy=mysql_fetch_assoc($sqly); $FDate=date("Y",strtotime($resy['FromDate'])); $TDate=date("Y",strtotime($resy['ToDate']));  if($m==1){$Month='JANUARY'; $yy=$TDate; $mm=10;}elseif($m==2){$Month='FEBRUARY'; $yy=$TDate; $mm=11;}elseif($m==3){$Month='MARCH'; $yy=$TDate; $mm=12;}elseif($m==4){$Month='APRIL'; $yy=$FDate; $mm=1;}elseif($m==5){$Month='MAY'; $yy=$FDate; $mm=2;}elseif($m==6){$Month='JUNE'; $yy=$FDate; $mm=3;}elseif($m==7){$Month='JULY'; $yy=$FDate; $mm=4;}elseif($m==8){$Month='AUGUST'; $yy=$FDate; $mm=5;}elseif($m==9){$Month='SEPTEMBER'; $yy=$FDate; $mm=6;}elseif($m==10){$Month='OCTOBER'; $yy=$FDate; $mm=7;}elseif($m==11){$Month='NOVEMBER'; $yy=$FDate; $mm=8;}elseif($m==12){$Month='DECEMBER'; $yy=$FDate; $mm=9;}
?>
<center>
<table style="width:100%;" id="table1" border="1" cellspacing="1">
<div class="thead" style="width:100%;">
<thead>
 <tr>
  <td colspan="5" class="td1" style="width:10%;"><?php $sdl=mysql_query("select DealerName from hrm_sales_dealer where DealerId=".$di,$con); $rdl=mysql_fetch_assoc($sdl); echo $rdl['DealerName'].'<br>'; echo '"Sales-Plan"&nbsp;&nbsp;&nbsp;(&nbsp;'.$Month.'&nbsp;&nbsp;'.$FDate.'-'.$TDate.'&nbsp;)'; ?></td>
 </tr>
 <tr>
  <td class="td1" style="width:5%;">Sn.</td>
  <td class="td1" style="width:30%;">Item</td>
  <td class="td1" style="width:30%;">Product</td>
  <td class="td1" style="width:15%;">Qty</td>
  <td class="td1" style="width:25%;">Value</td>
 </tr>
</thead> 
</div>  
<?php $sv=mysql_query("select sd.ProductId,si.ItemId,".$mf.",ProductName,ItemName from hrm_sales_sal_details_".$y." sd inner join hrm_sales_seedsproduct sp on sd.ProductId=sp.ProductId inner join hrm_sales_seedsitem si on sp.ItemId=si.ItemId where si.GroupId=".$grp." AND sd.YearId=".$y." AND ".$mf."!=0 AND sd.DealerId=".$di,$con); 
   $sn=1; while($rv=mysql_fetch_assoc($sv)){ ?>
<div class="tbody">
<tbody>     
 <tr>
  <td class="td2"><?php echo $sn; ?></td>
  <td class="td3">&nbsp;<?php echo strtolower($rv['ItemName']); ?></td>
  <td class="td3">&nbsp;<?php echo strtolower($rv['ProductName']); ?></td>
  <td class="td4"><?php echo $rv[$mf]; ?>&nbsp;</td>
  <?php 
    $sNa=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$rv['ProductId']." AND Fdate>='".$yy."-".$mm."-01' AND Tdate<='".$yy."-".$mm."-31'", $con); $rowNa=mysql_num_rows($sNa); 
    if($rowNa==0){$sNb=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$rv['ProductId']." AND Fdate>='".$yy."-".$mm."-01' AND '".$yy."-".$mm."-31'<=Tdate", $con); $rowNb=mysql_num_rows($sNb);
    if($rowNb==0){$sNc=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$rv['ProductId']." AND Fdate>='".$yy."-".$mm."-01' AND PStatus='A'", $con); $rowNc=mysql_num_rows($sNc);
    if($rowNc==0)
    { $sNd=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$rv['ProductId']." AND PStatus='A'", $con); $rowNd=mysql_num_rows($sNd);
      if($rowNd==0){$Nrv4=0;}else{$resNd=mysql_fetch_assoc($sNd); $Nrv=$resNd['NRV'];} 
    }else{$resNc=mysql_fetch_assoc($sNc); $Nrv=$resNc['NRV'];} 
    }else{$resNb=mysql_fetch_assoc($sNb); $Nrv=$resNb['NRV'];} 
    }else{$resNa=mysql_fetch_assoc($sNa); $Nrv=$resNa['NRV'];}
	//echo $rv[$mf].'*'.$Nrv.'-';
    $Net=$rv[$mf]*$Nrv; if($Net>0){$val=$Net;}else{$val=0;}
	echo '<script>Fun2Total('.$val.');</script>'; 
   ?>
  <td class="td4"><?php if($Net>0){echo $Net;}else{echo '';} ?>&nbsp;</td>
 </tr>
</tbody> 
</div>    
<?php $sn++; }

$s2v=mysql_query("select SUM(".$mf.") as M from hrm_sales_sal_details_".$y." sd inner join hrm_sales_seedsproduct sp on sd.ProductId=sp.ProductId inner join hrm_sales_seedsitem si on sp.ItemId=si.ItemId where si.GroupId=".$grp." AND sd.YearId=".$y." AND ".$mf."!=0 AND sd.DealerId=".$di,$con); $r2v=mysql_fetch_assoc($s2v); ?>  
 <?php /*?><tr>
  <td colspan="3" class="td4"><b>Total:</b>&nbsp;</td>
  <td class="td4"><input class="itd4" id="TotQty" value="<?php echo $r2v['M']; ?>" readonly/></td>
  <td class="td4"><input class="itd4" id="TtValue" value="0" readonly/></td>
 </tr><?php */?> 
  
</table> 
</center> 


<?php }elseif($_REQUEST['msg']=='billdetails')
{ $m=$_REQUEST['m']; $y=$_REQUEST['y']; $di=$_REQUEST['di']; $grp=$_REQUEST['grp'];  
$sqly=mysql_query("select FromDate,ToDate from hrm_sales_year where YearId=".$y, $con); $resy=mysql_fetch_assoc($sqly); $FDate=date("Y",strtotime($resy['FromDate'])); $TDate=date("Y",strtotime($resy['ToDate']));  if($m==1){$Month='JANUARY'; $yy=$TDate; $mm=10;}elseif($m==2){$Month='FEBRUARY'; $yy=$TDate; $mm=11;}elseif($m==3){$Month='MARCH'; $yy=$TDate; $mm=12;}elseif($m==4){$Month='APRIL'; $yy=$FDate; $mm=1;}elseif($m==5){$Month='MAY'; $yy=$FDate; $mm=2;}elseif($m==6){$Month='JUNE'; $yy=$FDate; $mm=3;}elseif($m==7){$Month='JULY'; $yy=$FDate; $mm=4;}elseif($m==8){$Month='AUGUST'; $yy=$FDate; $mm=5;}elseif($m==9){$Month='SEPTEMBER'; $yy=$FDate; $mm=6;}elseif($m==10){$Month='OCTOBER'; $yy=$FDate; $mm=7;}elseif($m==11){$Month='NOVEMBER'; $yy=$FDate; $mm=8;}elseif($m==12){$Month='DECEMBER'; $yy=$FDate; $mm=9;}
?>
<center>
<table style="width:80%;" id="table1" border="1" cellspacing="1">
<div class="thead" style="width:100%;">
<thead>
 <tr>
  <td colspan="5" class="td1" style="width:10%;"><?php $sdl=mysql_query("select DealerName from hrm_sales_dealer where DealerId=".$di,$con); $rdl=mysql_fetch_assoc($sdl); echo $rdl['DealerName'].'<br>'; echo '"Ageing"&nbsp;&nbsp;&nbsp;(&nbsp;'.$Month.'&nbsp;&nbsp;'.$FDate.'-'.$TDate.'&nbsp;)'; ?></td>
 </tr>
 <tr>
  <td class="td1" style="width:10%;">Sn.</td>
  <td class="td1" style="width:65%;">Ageing</td>
  <td class="td1" style="width:25%;">Value</td>
 </tr>
</thead> 
</div>  
<?php $spb=mysql_query("select * from erp_rcp_ageing where DealerId=".$di." AND AgeingMonth=".$m." AND AgeingYear=".$yy,$con2); $rpb=mysql_fetch_assoc($spb); ?>
<div class="tbody">
<tbody>     
 <tr>
  <td class="td2">1</td><td class="td3">&nbsp;< 30 days </td>
  <td class="td4"><?php if($grp==1){echo $rpb['Less30'];}elseif($grp==2){echo $rpb['Less30fc'];}?>&nbsp;</td>
 </tr>
 <tr>
  <td class="td2">2</td><td class="td3">&nbsp;30 to 60 days</td>
  <td class="td4"><?php if($grp==1){echo $rpb['30to60'];}elseif($grp==2){echo $rpb['30to60fc'];}?>&nbsp;</td>
 </tr>
 <tr>
  <td class="td2">3</td><td class="td3">&nbsp;60 to 90 days </td>
  <td class="td4"><?php if($grp==1){echo $rpb['60to90'];}elseif($grp==2){echo $rpb['60to90fc'];}?>&nbsp;</td>
 </tr>
 <tr>
  <td class="td2">4</td><td class="td3">&nbsp;90 to 120 days</td>
  <td class="td4"><?php if($grp==1){echo $rpb['90to120'];}elseif($grp==2){echo $rpb['90to120fc'];}?>&nbsp;</td>
 </tr>
 <tr>
  <td class="td2">5</td><td class="td3">&nbsp;120 to 180 days </td>
  <td class="td4"><?php if($grp==1){echo $rpb['120to180'];}elseif($grp==2){echo $rpb['120to180fc'];}?>&nbsp;</td>
 </tr>
 <tr>
  <td class="td2">6</td><td class="td3">&nbsp;180 to 240 days</td>
  <td class="td4"><?php if($grp==1){echo $rpb['180to240'];}elseif($grp==2){echo $rpb['180to240fc'];}?>&nbsp;</td>
 </tr>
  <tr>
  <td class="td2">7</td><td class="td3">&nbsp;240 to 365 days</td>
  <td class="td4"><?php if($grp==1){echo $rpb['240to365'];}elseif($grp==2){echo $rpb['240to365fc'];}?>&nbsp;</td>
 </tr>
  <tr>
  <td class="td2">8</td><td class="td3">&nbsp;365 to 545 days</td>
  <td class="td4"><?php if($grp==1){echo $rpb['365to545'];}elseif($grp==2){echo $rpb['365to545fc'];}?>&nbsp;</td>
 </tr>
  <tr>
  <td class="td2">9</td><td class="td3">&nbsp;545 to 725 days</td>
  <td class="td4"><?php if($grp==1){echo $rpb['545to725'];}elseif($grp==2){echo $rpb['545to725fc'];}?>&nbsp;</td>
 </tr>
 <tr>
  <td class="td2">10</td><td class="td3">&nbsp;> 725 days</td>
  <td class="td4"><?php if($grp==1){echo $rpb['Grat725'];}elseif($grp==2){echo $rpb['Grat725fc'];}?>&nbsp;</td>
 </tr>
</tbody> 
</div>    
 <tr>
  <td colspan="2" class="td4"><b>Total Pending Bill:</b>&nbsp;</td>
  <td class="td4"><?php if($grp==1){ echo $rpb['PendingBills'];}elseif($grp==2){echo $rpb['PendingBillsfc'];}?>&nbsp;</td>
 </tr> 
  
</table> 
</center>

 
<?php }elseif($_REQUEST['msg']=='collectiondetails')
{ $m=$_REQUEST['m']; $y=$_REQUEST['y']; $di=$_REQUEST['di']; $grp=$_REQUEST['grp'];  
$sqly=mysql_query("select FromDate,ToDate from hrm_sales_year where YearId=".$y, $con); $resy=mysql_fetch_assoc($sqly); $FDate=date("Y",strtotime($resy['FromDate'])); $TDate=date("Y",strtotime($resy['ToDate']));  if($m==1){$Month='JANUARY'; $yy=$TDate; $mm=10;}elseif($m==2){$Month='FEBRUARY'; $yy=$TDate; $mm=11;}elseif($m==3){$Month='MARCH'; $yy=$TDate; $mm=12;}elseif($m==4){$Month='APRIL'; $yy=$FDate; $mm=1;}elseif($m==5){$Month='MAY'; $yy=$FDate; $mm=2;}elseif($m==6){$Month='JUNE'; $yy=$FDate; $mm=3;}elseif($m==7){$Month='JULY'; $yy=$FDate; $mm=4;}elseif($m==8){$Month='AUGUST'; $yy=$FDate; $mm=5;}elseif($m==9){$Month='SEPTEMBER'; $yy=$FDate; $mm=6;}elseif($m==10){$Month='OCTOBER'; $yy=$FDate; $mm=7;}elseif($m==11){$Month='NOVEMBER'; $yy=$FDate; $mm=8;}elseif($m==12){$Month='DECEMBER'; $yy=$FDate; $mm=9;}
?>
<center>
<table style="width:80%;" id="table1" border="1" cellspacing="1">
<div class="thead" style="width:100%;">
<thead>
 <tr>
  <td colspan="5" class="td1" style="width:10%;"><?php $sdl=mysql_query("select DealerName from hrm_sales_dealer where DealerId=".$di,$con); $rdl=mysql_fetch_assoc($sdl); echo $rdl['DealerName'].'<br>'; echo '"Actual Collection"&nbsp;&nbsp;&nbsp;(&nbsp;'.$Month.'&nbsp;&nbsp;'.$FDate.'-'.$TDate.'&nbsp;)'; ?></td>
 </tr>
 <tr>
  <td class="td1" style="width:10%;">Sn.</td>
  <td class="td1" style="width:40%;">Week</td>
  <td class="td1" style="width:25%;">SalesPlan+Oust</td>
  <td class="td1" style="width:25%;">Abs</td>
 </tr>
</thead> 
</div>  
<div class="tbody">
<tbody>     
 <tr>
  <td class="td2">1</td><td class="td3">&nbsp;Week-1 </td>
  <?php if($grp==1){ $sv=mysql_query("select SUM(CollAmount) as vamt from erp_dealer_collection where DealerId=".$di." AND Type='vc' AND Abs='N' AND CollDate between '".date($yy.'-'.$m.'-01')."' AND '".date($yy.'-'.$m.'-07')."' ",$con2); $sva=mysql_query("select SUM(CollAmount) as v2amt from erp_dealer_collection where DealerId=".$di." AND Type='vc' AND Abs='Y' AND CollDate between '".date($yy.'-'.$m.'-01')."' AND '".date($yy.'-'.$m.'-07')."' ",$con2); }elseif($grp==2){ $sv=mysql_query("select SUM(CollAmount) as vamt from erp_dealer_collection where DealerId=".$di." AND Type='fc' AND Abs='N' AND CollDate between '".date($yy.'-'.$m.'-01')."' AND '".date($yy.'-'.$m.'-07')."' ",$con2); $sva=mysql_query("select SUM(CollAmount) as v2amt from erp_dealer_collection where DealerId=".$di." AND Type='fc' AND Abs='Y' AND CollDate between '".date($yy.'-'.$m.'-01')."' AND '".date($yy.'-'.$m.'-07')."' ",$con2); } 
  $rv=mysql_fetch_assoc($sv); $rva=mysql_fetch_assoc($sva); ?>
  <td class="td4"><?php echo $rv['vamt']; ?>&nbsp;</td>
  <td class="td4"><?php echo $rva['v2amt'];?>&nbsp;</td>
 </tr>
 <tr>
  <td class="td2">2</td><td class="td3">&nbsp;Week-2</td>
  <?php if($grp==1){ $s2v=mysql_query("select SUM(CollAmount) as vamt from erp_dealer_collection where DealerId=".$di." AND Type='vc' AND Abs='N' AND CollDate between '".date($yy.'-'.$m.'-08')."' AND '".date($yy.'-'.$m.'-14')."' ",$con2); $s2va=mysql_query("select SUM(CollAmount) as v2amt from erp_dealer_collection where DealerId=".$di." AND Type='vc' AND Abs='Y' AND CollDate between '".date($yy.'-'.$m.'-08')."' AND '".date($yy.'-'.$m.'-14')."' ",$con2); }elseif($grp==2){ $s2v=mysql_query("select SUM(CollAmount) as vamt from erp_dealer_collection where DealerId=".$di." AND Type='fc' AND Abs='N' AND CollDate between '".date($yy.'-'.$m.'-08')."' AND '".date($yy.'-'.$m.'-14')."' ",$con2); $s2va=mysql_query("select SUM(CollAmount) as v2amt from erp_dealer_collection where DealerId=".$di." AND Type='fc' AND Abs='Y' AND CollDate between '".date($yy.'-'.$m.'-08')."' AND '".date($yy.'-'.$m.'-14')."' ",$con2); } 
  $r2v=mysql_fetch_assoc($s2v); $r2va=mysql_fetch_assoc($s2va); ?>
  <td class="td4"><?php echo $r2v['vamt']; ?>&nbsp;</td>
  <td class="td4"><?php echo $r2va['v2amt'];?>&nbsp;</td>
 </tr>
 <tr>
  <td class="td2">3</td><td class="td3">&nbsp;Week-3 </td>
  <?php if($grp==1){ $s3v=mysql_query("select SUM(CollAmount) as vamt from erp_dealer_collection where DealerId=".$di." AND Type='vc' AND Abs='N' AND CollDate between '".date($yy.'-'.$m.'-15')."' AND '".date($yy.'-'.$m.'-21')."' ",$con2); $s3va=mysql_query("select SUM(CollAmount) as v2amt from erp_dealer_collection where DealerId=".$di." AND Type='vc' AND Abs='Y' AND CollDate between '".date($yy.'-'.$m.'-15')."' AND '".date($yy.'-'.$m.'-21')."' ",$con2); }elseif($grp==2){ $s3v=mysql_query("select SUM(CollAmount) as vamt from erp_dealer_collection where DealerId=".$di." AND Type='fc' AND Abs='N' AND CollDate between '".date($yy.'-'.$m.'-15')."' AND '".date($yy.'-'.$m.'-21')."' ",$con2); $s3va=mysql_query("select SUM(CollAmount) as v2amt from erp_dealer_collection where DealerId=".$di." AND Type='fc' AND Abs='Y' AND CollDate between '".date($yy.'-'.$m.'-15')."' AND '".date($yy.'-'.$m.'-21')."' ",$con2); } 
  $r3v=mysql_fetch_assoc($s3v); $r3va=mysql_fetch_assoc($s3va); ?>
  <td class="td4"><?php echo $r3v['vamt']; ?>&nbsp;</td>
  <td class="td4"><?php echo $r3va['v2amt'];?>&nbsp;</td>
 </tr>
 <tr>
  <td class="td2">4</td><td class="td3">&nbsp;Week-4</td>
  <?php if($grp==1){ $s4v=mysql_query("select SUM(CollAmount) as vamt from erp_dealer_collection where DealerId=".$di." AND Type='vc' AND Abs='N' AND CollDate between '".date($yy.'-'.$m.'-22')."' AND '".date($yy.'-'.$m.'-31')."' ",$con2); $s4va=mysql_query("select SUM(CollAmount) as v2amt from erp_dealer_collection where DealerId=".$di." AND Type='vc' AND Abs='Y' AND CollDate between '".date($yy.'-'.$m.'-22')."' AND '".date($yy.'-'.$m.'-31')."' ",$con2); }elseif($grp==2){ $s4v=mysql_query("select SUM(CollAmount) as vamt from erp_dealer_collection where DealerId=".$di." AND Type='fc' AND Abs='N' AND CollDate between '".date($yy.'-'.$m.'-22')."' AND '".date($yy.'-'.$m.'-31')."' ",$con2); $s4va=mysql_query("select SUM(CollAmount) as v2amt from erp_dealer_collection where DealerId=".$di." AND Type='fc' AND Abs='Y' AND CollDate between '".date($yy.'-'.$m.'-22')."' AND '".date($yy.'-'.$m.'-31')."' ",$con2); } 
  $r4v=mysql_fetch_assoc($s4v); $r4va=mysql_fetch_assoc($s4va); ?>
  <td class="td4"><?php echo $r4v['vamt']; ?>&nbsp;</td>
  <td class="td4"><?php echo $r4va['v2amt'];?>&nbsp;</td>
 </tr>


</tbody> 
</div>    
 <tr>
  <td colspan="2" class="td4"><b>Total Collection:</b>&nbsp;</td>
  <?php if($grp==1){ $sTv=mysql_query("select SUM(CollAmount) as vamt from erp_dealer_collection where DealerId=".$di." AND Type='vc' AND Abs='N' AND CollDate between '".date($yy.'-'.$m.'-01')."' AND '".date($yy.'-'.$m.'-31')."' ",$con2); $sTva=mysql_query("select SUM(CollAmount) as v2amt from erp_dealer_collection where DealerId=".$di." AND Type='vc' AND Abs='Y' AND CollDate between '".date($yy.'-'.$m.'-01')."' AND '".date($yy.'-'.$m.'-31')."' ",$con2); }elseif($grp==2){ $sTv=mysql_query("select SUM(CollAmount) as vamt from erp_dealer_collection where DealerId=".$di." AND Type='fc' AND Abs='N' AND CollDate between '".date($yy.'-'.$m.'-01')."' AND '".date($yy.'-'.$m.'-31')."' ",$con2); $sTva=mysql_query("select SUM(CollAmount) as v2amt from erp_dealer_collection where DealerId=".$di." AND Type='fc' AND Abs='Y' AND CollDate between '".date($yy.'-'.$m.'-01')."' AND '".date($yy.'-'.$m.'-31')."' ",$con2); } 
  $rTv=mysql_fetch_assoc($sTv); $rTva=mysql_fetch_assoc($sTva); ?>
  <td class="td4"><?php echo $rTv['vamt']; ?>&nbsp;</td>
  <td class="td4"><?php echo $rTva['v2amt'];?>&nbsp;</td>
 </tr> 
  
</table> 
</center> 
<?php } ?>


</body>
</html>
