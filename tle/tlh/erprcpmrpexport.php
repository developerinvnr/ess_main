<?php session_start();
require_once('../../Employee/sp/user/config/config.php');

if($_REQUEST['act']=='rcpexp')
{
$m=$_REQUEST['m']; $y=$_REQUEST['y']; $hq=$_REQUEST['hq']; 
$s=$_REQUEST['s']; $crop=$_REQUEST['crop']; $ei=$_REQUEST['ei'];

$sqly=mysql_query("select FromDate,ToDate from hrm_sales_year where YearId=".$y, $con); $resy=mysql_fetch_assoc($sqly); $FDate=date("Y",strtotime($resy['FromDate'])); $TDate=date("Y",strtotime($resy['ToDate']));  if($m==1){$Month='JANUARY'; $yy=$TDate; $mm=10;}elseif($m==2){$Month='FEBRUARY'; $yy=$TDate; $mm=11;}elseif($m==3){$Month='MARCH'; $yy=$TDate; $mm=12;}elseif($m==4){$Month='APRIL'; $yy=$FDate; $mm=1;}elseif($m==5){$Month='MAY'; $yy=$FDate; $mm=2;}elseif($m==6){$Month='JUNE'; $yy=$FDate; $mm=3;}elseif($m==7){$Month='JULY'; $yy=$FDate; $mm=4;}elseif($m==8){$Month='AUGUST'; $yy=$FDate; $mm=5;}elseif($m==9){$Month='SEPTEMBER'; $yy=$FDate; $mm=6;}elseif($m==10){$Month='OCTOBER'; $yy=$FDate; $mm=7;}elseif($m==11){$Month='NOVEMBER'; $yy=$FDate; $mm=8;}elseif($m==12){$Month='DECEMBER'; $yy=$FDate; $mm=9;}

$xls_filename = 'RCP_Report_'.$Month.'_'.$yy.'.xls';
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=$xls_filename");
header("Pragma: no-cache");
header("Expires: 0");
$sep = "\t";  

echo "Sn\tDealer\tHeadQuarter\tState\tSalesPlan_Value(VC)\tPendingBill(VC)\tCollection Agains Salesplan(VC)\tCollection Against Outstanding(VC)\tCollection For Abs(VC)\tAbs Name(VC)\tTotal Target(VC)\tActual Collection Sp+Oust(VC)\tActual Collection Abs(VC)\tSalesPlan_Value(FC)\tPendingBill(FC)\tCollection Agains Salesplan(FC)\tCollection Against Outstanding(FC)\tCollection For Abs(FC)\tAbs Name(FC)\tTotal Target(FC)\tActual Collection Sp+Oust(FC)\tActual Collection Abs(FC)";
 print("\n");
 
 $sql=mysql_query("select d.DealerId,DealerName,DealerCity,HqName,StateCode from hrm_sales_dealer d inner join hrm_headquater hq on d.HqId=hq.HqId inner join hrm_state s on hq.StateId=s.StateId where hq.HqId=".$hq." order by hq.HqName ASC, d.DealerName ASC ",$con);
 
 
 $sn=1;
 while($res = mysql_fetch_array($sql))
 {
  $dealer=$res['DealerName'].' - '.$res['DealerCity'];
  
  $schema_insert = "";
  $schema_insert .= $sn.$sep;
  $schema_insert .= $dealer.$sep;
  $schema_insert .= $res['HqName'].$sep;
  $schema_insert .= $res['StateCode'].$sep;
  
  $spb=mysql_query("select * from erp_rcp_ageing where DealerId=".$res['DealerId']." AND AgeingMonth=".date($yy.'-'.$m.'-25')." AND AgeingMonth=".$m." AND AgeingYear=".$yy,$con2); $rpb=mysql_fetch_assoc($spb);
  $scp=mysql_query("select * from erp_rcp where DealerId=".$res['DealerId']." AND RcpMonth=".$m." AND RcpYear=".$yy,$con2); $rcp=mysql_fetch_assoc($scp); 
  
  $schema_insert .= $rcp['SalPTgt_Val'].$sep;
  $schema_insert .= $rpb['PendingBills'].$sep;
  $schema_insert .= $rcp['SalPTgt_CollVal'].$sep;
  $schema_insert .= $rcp['Oust_CollVal'].$sep;
  $schema_insert .= $rcp['Abs_CollVal'].$sep;
  $schema_insert .= $rcp['AbsName'].$sep;
  $schema_insert .= $rcp['Tot_CollVal'].$sep;
  
  $sTv=mysql_query("select SUM(CollAmount) as vamt from erp_dealer_collection where DealerId=".$res['DealerId']." AND Type='vc' AND Abs='N' AND CollDate between '".date($yy.'-'.$m.'-01')."' AND '".date($yy.'-'.$m.'-31')."' ",$con2); $sTva=mysql_query("select SUM(CollAmount) as v2amt from erp_dealer_collection where DealerId=".$res['DealerId']." AND Type='vc' AND Abs='Y' AND CollDate between '".date($yy.'-'.$m.'-01')."' AND '".date($yy.'-'.$m.'-31')."' ",$con2);
  $rTv=mysql_fetch_assoc($sTv); $rTva=mysql_fetch_assoc($sTva);
  $schema_insert .= $rTv['vamt'].$sep;
  $schema_insert .= $rTva['v2amt'].$sep;
  
  $schema_insert .= $rcp['SalPTgt_Valfc'].$sep;
  $schema_insert .= $rpb['PendingBillsfc'].$sep;
  $schema_insert .= $rcp['SalPTgt_CollValfc'].$sep;
  $schema_insert .= $rcp['Oust_CollValfc'].$sep;
  $schema_insert .= $rcp['Abs_CollValfc'].$sep;
  $schema_insert .= $rcp['AbsNamefc'].$sep;
  $schema_insert .= $rcp['Tot_CollValfc'].$sep;
  
  $s2Tv=mysql_query("select SUM(CollAmount) as vamt from erp_dealer_collection where DealerId=".$res['DealerId']." AND Type='fc' AND Abs='N' AND CollDate between '".date($yy.'-'.$m.'-01')."' AND '".date($yy.'-'.$m.'-31')."' ",$con2); $s2Tva=mysql_query("select SUM(CollAmount) as v2amt from erp_dealer_collection where DealerId=".$res['DealerId']." AND Type='fc' AND Abs='Y' AND CollDate between '".date($yy.'-'.$m.'-01')."' AND '".date($yy.'-'.$m.'-31')."' ",$con2);
  $r2Tv=mysql_fetch_assoc($s2Tv); $r2Tva=mysql_fetch_assoc($s2Tva);
  $schema_insert .= $r2Tv['vamt'].$sep;
  $schema_insert .= $r2Tva['v2amt'].$sep;
  						  
  $schema_insert = str_replace($sep."$", "", $schema_insert);
  $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
  $schema_insert .= "\t";
  print(trim($schema_insert));
  print "\n";
  $sn++;
 }

}




elseif($_REQUEST['act']=='mrpexp')
{
$m=$_REQUEST['m']; $y=$_REQUEST['y']; $bi=$_REQUEST['branch']; $ei=$_REQUEST['ei'];

$sqly=mysql_query("select FromDate,ToDate from hrm_sales_year where YearId=".$y, $con); $resy=mysql_fetch_assoc($sqly); $FDate=date("Y",strtotime($resy['FromDate'])); $TDate=date("Y",strtotime($resy['ToDate']));  if($m==1){$Month='JANUARY'; $yy=$TDate; $mm=10;}elseif($m==2){$Month='FEBRUARY'; $yy=$TDate; $mm=11;}elseif($m==3){$Month='MARCH'; $yy=$TDate; $mm=12;}elseif($m==4){$Month='APRIL'; $yy=$FDate; $mm=1;}elseif($m==5){$Month='MAY'; $yy=$FDate; $mm=2;}elseif($m==6){$Month='JUNE'; $yy=$FDate; $mm=3;}elseif($m==7){$Month='JULY'; $yy=$FDate; $mm=4;}elseif($m==8){$Month='AUGUST'; $yy=$FDate; $mm=5;}elseif($m==9){$Month='SEPTEMBER'; $yy=$FDate; $mm=6;}elseif($m==10){$Month='OCTOBER'; $yy=$FDate; $mm=7;}elseif($m==11){$Month='NOVEMBER'; $yy=$FDate; $mm=8;}elseif($m==12){$Month='DECEMBER'; $yy=$FDate; $mm=9;}

$xls_filename = 'MRP_Report_'.$Month.'_'.$yy.'.xls';
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=$xls_filename");
header("Pragma: no-cache");
header("Expires: 0");
$sep = "\t";  

echo "Sn\tCrop\tVariety\tType\tSize\tBranch\tClosing Stock at C&F Point\tStock In-Transit\tTotal Stock Qty";

$ss=mysql_query("select ms.StateId,StateCode from erp_mrp_empstate ms inner join erp_state s on ms.StateId=s.StateId where ms.EmpId=".$ei." AND ms.Sts='A' AND ms.TlEmp='Y' order by StateCode ASC",$con2);
while($rs=mysql_fetch_assoc($ss)){ echo "\tState_".$rs['StateCode']; } 
   
echo "\tTotal Requirement\tStock to be Supplied";
print("\n");
 
 if($_REQUEST['branch']>0)
 { 
  $sql=mysql_query("select m.*,TypeName,ProductName,ItemName,SizeName from ".db2.".erp_mrp m inner join ".db1.".hrm_sales_seedtype t on m.TypeId=t.TypeId inner join ".db1.".hrm_sales_seedsproduct p on m.ProductId=p.ProductId inner join ".db1.".hrm_sales_seedsitem i on p.ItemId=i.ItemId inner join ".db1.".hrm_sales_itemsize s on m.SizeId=s.SizeId where m.MrpMonth=".$m." AND m.MrpYear=".$yy." AND m.BranchId=".$_REQUEST['branch']." order by i.ItemName ASC, p.ProductName ASC");
 
 
  $sn=1;
  while($res = mysql_fetch_array($sql))
  {
   $schema_insert = "";
   $schema_insert .= $sn.$sep;
   $schema_insert .= $res['ItemName'].$sep;
   $schema_insert .= $res['ProductName'].$sep;
   $schema_insert .= $res['TypeName'].$sep;
   $schema_insert .= $res['SizeName'].$sep;
   
   $sbn=mysql_query("select BranchName from erp_branch where BranchId=".$bi,$con2);$rbn=mysql_fetch_assoc($sbn);
   $schema_insert .= $rbn['BranchName'].$sep;
   
   $schema_insert .= $res['StockClosing'].$sep;
   $schema_insert .= $res['StockTransit'].$sep;
   
   $totStck=$res['StockClosing']+$res['StockTransit'];
   $schema_insert .= $totStck.$sep;
  
   $ss=mysql_query("select ms.StateId,StateCode from erp_mrp_empstate ms inner join erp_state s on ms.StateId=s.StateId where ms.EmpId=".$ei." AND ms.Sts='A' AND ms.TlEmp='Y' order by StateCode ASC",$con2);
   while($rs=mysql_fetch_assoc($ss))
   { 
    $stck=mysql_query("select RequireQty from erp_mrp_require where ReqMrpMonth=".$m." AND ReqMrpYear=".$yy." AND StateId=".$rs['StateId']." AND ProductId=".$res['ProductId']." AND TypeId=".$res['TypeId']." AND SizeId=".$res['SizeId']." ",$con2); $rstck=mysql_fetch_assoc($stck); 
    $schema_insert .= $rstck['RequireQty'].$sep;
   }
   
   $stotReq=mysql_query("select sum(RequireQty) as tqty from erp_mrp_require where ReqMrpMonth=".$m." AND ReqMrpYear=".$yy." AND BranchId=".$_REQUEST['branch']." AND ProductId=".$res['ProductId']." AND TypeId=".$res['TypeId']." AND SizeId=".$res['SizeId']." AND FilledBy_RequireQty=".$ei,$con2); $rtotReq=mysql_fetch_assoc($stotReq); if($rtotReq['tqty']>$totStck){ $reqtot=$rtotReq['tqty']-$totStck;}else{$reqtot='';}
   $schema_insert .= $rtotReq['tqty'].$sep;
   $schema_insert .= $reqtot.$sep;
  						  
   $schema_insert = str_replace($sep."$", "", $schema_insert);
   $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
   $schema_insert .= "\t";
   print(trim($schema_insert));
   print "\n";
   $sn++;
  }
 } 
}
?>