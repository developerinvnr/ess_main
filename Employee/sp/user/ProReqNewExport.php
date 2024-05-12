<?php require_once('config/config.php');
$sqlY3=mysql_query("select FromDate,ToDate from hrm_sales_year where YearId=".$_REQUEST['y'], $con); $resY3=mysql_fetch_assoc($sqlY3); 
$y3=date("y",strtotime($resY3['FromDate'])).'-'.date("y",strtotime($resY3['ToDate'])); 
$my1='<font color="#A60053">'.date("y",strtotime($resY3['FromDate'])).'</font>'; $my2='<font color="#A60053">'.date("y",strtotime($resY3['ToDate'])).'</font>';

if($_REQUEST['action']=='ProTargExport') 
{  
#  Create the Column Headings
$csv_output .= '"CROP",';
$csv_output .= '"VARIETY",';
$csv_output .= '"TYPE",';
$csv_output .= '"Req(Kg)",'; 
$csv_output .= '"New Predict(Kg)",';
$csv_output .= '"Difference(Kg)",';
$csv_output .= '"Placement Buffer",';
$csv_output .= '"Total Req",';
$csv_output .= '"Physical Stock",';
$csv_output .= '"Useful Stock",';
$csv_output .= '"Need to Produce",';
$csv_output .= '"Production Buffer",';
$csv_output .= '"Production Target",';
$csv_output .= "\n";		

if($_REQUEST['i']>0){$sql = mysql_query("select hrm_sales_seedsproduct.ItemId,ProductId,ProductName,ItemName,TypeName from hrm_sales_seedsproduct INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId INNER JOIN hrm_sales_seedtype ON hrm_sales_seedsproduct.TypeId=hrm_sales_seedtype.TypeId where hrm_sales_seedsitem.ItemId=".$_REQUEST['i']." order by ItemName ASC, TypeName ASC, ProductName ASC", $con); }
else
{ if($_REQUEST['g']==1 OR $_REQUEST['g']==2){$sql = mysql_query("select hrm_sales_seedsproduct.ItemId,ProductId,ProductName,ItemName,TypeName from hrm_sales_seedsproduct INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId INNER JOIN hrm_sales_seedtype ON hrm_sales_seedsproduct.TypeId=hrm_sales_seedtype.TypeId where hrm_sales_seedsitem.GroupId=".$_REQUEST['g']." order by ItemName ASC, TypeName ASC, ProductName ASC", $con);} if($_REQUEST['g']==3){$sql = mysql_query("select hrm_sales_seedsproduct.ItemId,ProductId,ProductName,ItemName,TypeName from hrm_sales_seedsproduct INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId INNER JOIN hrm_sales_seedtype ON hrm_sales_seedsproduct.TypeId=hrm_sales_seedtype.TypeId order by hrm_sales_seedsitem.GroupId ASC, ItemName ASC, TypeName ASC, ProductName ASC", $con);}
} $Sn=1; while($res=mysql_fetch_array($sql)){ 
$sqlTgt=mysql_query("select * from hrm_sales_product_target where YearId=".$_REQUEST['y']." AND ProductId=".$res['ProductId'],$con); $resTgt=mysql_fetch_assoc($sqlTgt);

$csv_output .= '"'.str_replace('"', '""', $res['ItemName']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['ProductName']).'",';
$csv_output .= '"'.str_replace('"', '""', substr_replace($res['TypeName'],'',2)).'",';

$BeforeYId2=$_REQUEST['y']-2; $BeforeYId=$_REQUEST['y']-1; $AfterYId=$_REQUEST['y']+1; $AfterYId2=$_REQUEST['y']+2;
$sqlP2d=mysql_query("select SUM(M1) as sM1,SUM(M2) as sM2,SUM(M3) as sM3,SUM(M4) as sM4,SUM(M5) as sM5,SUM(M6) as sM6,SUM(M7) as sM7,SUM(M8) as sM8,SUM(M9) as sM9,SUM(M10) as sM10,SUM(M11) as sM11,SUM(M12) as sM12 from hrm_sales_sal_details_".$_REQUEST['y']." where YearId=".$_REQUEST['y']." AND ProductId=".$res['ProductId'], $con); $res2=mysql_fetch_assoc($sqlP2d);
$res2Tot=$res2['sM1']+$res2['sM2']+$res2['sM3']+$res2['sM4']+$res2['sM5']+$res2['sM6']+$res2['sM7']+$res2['sM8']+$res2['sM9']+$res2['sM10']+$res2['sM11']+$res2['sM12'];
$csv_output .= '"'.str_replace('"', '""', $res2Tot).'",';
$csv_output .= '"'.str_replace('"', '""', $resTgt['NewReq']).'",';

$Diff=$res2Tot-$resTgt['NewReq'];
$csv_output .= '"'.str_replace('"', '""', $Diff).'",';
$csv_output .= '"'.str_replace('"', '""', $resTgt['PBuff']).'",';

$TotReq=$resTgt['NewReq']+$resTgt['PBuff'];
$csv_output .= '"'.str_replace('"', '""', $TotReq).'",';

$Stck=mysql_query("select * from hrm_sales_product_stock_actual where ProductId=".$res['ProductId']." AND YearId=".$BeforeYId, $con); $resStck=mysql_fetch_assoc($Stck);
$sqlP1d=mysql_query("select SUM(M1) as sM1,SUM(M2) as sM2,SUM(M3) as sM3,SUM(M4) as sM4,SUM(M5) as sM5,SUM(M6) as sM6,SUM(M7) as sM7,SUM(M8) as sM8,SUM(M9) as sM9,SUM(M10) as sM10,SUM(M11) as sM11,SUM(M12) as sM12 from hrm_sales_sal_details".$BeforeYId." where YearId=".$BeforeYId." AND ProductId=".$res['ProductId'], $con); $res1=mysql_fetch_assoc($sqlP1d);
if($resStck['Mar']!=0 AND $resStck['Mar']!=''){$stock=$resStck['Mar']-$res1['sM12']; $csv_output .= '"'.str_replace('"', '""', round(intval($stock))).'",';} 
elseif($resStck['Feb']!=0 AND $resStck['Feb']!=''){$stock=$resStck['Feb']-($res1['sM11']+$res1['sM12']); $csv_output .= '"'.str_replace('"', '""', round(intval($stock))).'",';}
elseif($resStck['Jan']!=0 AND $resStck['Jan']!=''){$stock=$resStck['Jan']-($res1['sM10']+$res1['sM11']+$res1['sM12']); $csv_output .= '"'.str_replace('"', '""', round(intval($stock))).'",';}
elseif($resStck['Dece']!=0 AND $resStck['Dece']!=''){$stock=$resStck['Dece']-($res1['sM9']+$res1['sM10']+$res1['sM11']+$res1['sM12']); $csv_output .= '"'.str_replace('"', '""', round(intval($stock))).'",';}
elseif($resStck['Nov']!=0 AND $resStck['Nov']!=''){$stock=$resStck['Nov']-($res1['sM8']+$res1['sM9']+$res1['sM10']+$res1['sM11']+$res1['sM12']); $csv_output .= '"'.str_replace('"', '""', round(intval($stock))).'",';}
elseif($resStck['Oct']!=0 AND $resStck['Oct']!=''){$stock=$resStck['Oct']-($res1['sM7']+$res1['sM8']+$res1['sM9']+$res1['sM10']+$res1['sM11']+$res1['sM12']); $csv_output .= '"'.str_replace('"', '""', round(intval($stock))).'",'; }
elseif($resStck['Sep']!=0 AND $resStck['Sep']!=''){$stock=$resStck['Sep']-($res1['sM6']+$res1['sM7']+$res1['sM8']+$res1['sM9']+$res1['sM10']+$res1['sM11']+$res1['sM12']); 
$csv_output .= '"'.str_replace('"', '""', round(intval($stock))).'",'; }
elseif($resStck['Aug']!=0 AND $resStck['Aug']!=''){$stock=$resStck['Aug']-($res1['sM5']+$res1['sM6']+$res1['sM7']+$res1['sM8']+$res1['sM9']+$res1['sM10']+$res1['sM11']+$res1['sM12']); $csv_output .= '"'.str_replace('"', '""', round(intval($stock))).'",';}
elseif($resStck['Jul']!=0 AND $resStck['Jul']!=''){$stock=$resStck['Jul']-($res1['sM4']+$res1['sM5']+$res1['sM6']+$res1['sM7']+$res1['sM8']+$res1['sM9']+$res1['sM10']+$res1['sM11']+$res1['sM12']); $csv_output .= '"'.str_replace('"', '""', round(intval($stock))).'",';}
elseif($resStck['Jun']!=0 AND $resStck['Jun']!=''){$stock=$resStck['Jun']-($res1['sM3']+$res1['sM4']+$res1['sM5']+$res1['sM6']+$res1['sM7']+$res1['sM8']+$res1['sM9']+$res1['sM10']+$res1['sM11']+$res1['sM12']); $csv_output .= '"'.str_replace('"', '""', round(intval($stock))).'",';}
elseif($resStck['May']!=0 AND $resStck['May']!=''){$stock=$resStck['May']-($res1['sM2']+$res1['sM3']+$res1['sM4']+$res1['sM5']+$res1['sM6']+$res1['sM7']+$res1['sM8']+$res1['sM9']+$res1['sM10']+$res1['sM11']+$res1['sM12']); $csv_output .= '"'.str_replace('"', '""', round(intval($stock))).'",';}
elseif($resStck['Apr']!=0 AND $resStck['Apr']!=''){$stock=$resStck['Apr']-($res1['sM1']+$res1['sM2']+$res1['sM3']+$res1['sM4']+$res1['sM5']+$res1['sM6']+$res1['sM7']+$res1['sM8']+$res1['sM9']+$res1['sM10']+$res1['sM11']+$res1['sM12']); $csv_output .= '"'.str_replace('"', '""', round(intval($stock))).'",'; }

$csv_output .= '"'.str_replace('"', '""', $resTgt['UFStck']).'",';
$csv_output .= '"'.str_replace('"', '""', $resTgt['NTPduce']).'",';
$csv_output .= '"'.str_replace('"', '""', $resTgt['ProdBuff']).'",';
$csv_output .= '"'.str_replace('"', '""', $resTgt['ProdTgt']).'",';
$csv_output .= "\n";
$Sn++; }

# Close the MySql connection
mysql_close($con);
# Set the headers so the file downloads
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Content-Length: " . strlen($csv_output));
header("Content-type: text/x-csv");
header("Content-Disposition: attachment; filename=Production_Target_".$y3.".csv");
echo $csv_output;
exit;
}

?>