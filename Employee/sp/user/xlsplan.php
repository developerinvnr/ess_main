<?php 
require_once('config/config.php');
if($_REQUEST['action']='MorEveExport') 
{ 
 
#  Create the Column Headings
$csv_output .= '"Sn",';
$csv_output .= '"ItemId",'; 
$csv_output .= '"ItemName",';
$csv_output .= '"ProductId",'; 
$csv_output .= '"ProductName",';
$csv_output .= '"TypeName",';
$csv_output .= '"NRV",';
$csv_output .= "\n";		

# Get Users Details form the DB #$result = mysql_query("SELECT * from formResults WHERE formID = '$formID'" );
$sql=mysql_query("select hrm_sales_seedsproduct.*,ItemName,TypeName from hrm_sales_seedsproduct INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId INNER JOIN hrm_sales_seedtype ON hrm_sales_seedsproduct.TypeId=hrm_sales_seedtype.TypeId order by ItemName ASC, ProductName ASC", $con);
$sn=1; while($res=mysql_fetch_array($sql)) { 

$csv_output .= '"'.str_replace('"', '""', $sn).'",';
$csv_output .= '"'.str_replace('"', '""', $res['ItemId']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['ItemName']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['ProductId']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['ProductName']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['TypeName']).'",';
$csv_output .= '"'.str_replace('"', '""', '').'",';
$csv_output .= "\n";
$sn++; }

# Close the MySql connection
mysql_close($con);
# Set the headers so the file downloads
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Content-Length: " . strlen($csv_output));
header("Content-type: text/x-csv");
header("Content-Disposition: attachment; filename=Product_NRV.csv");
echo $csv_output;
exit;
}
?>