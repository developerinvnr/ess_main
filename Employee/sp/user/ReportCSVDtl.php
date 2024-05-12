<?php require_once('config/config.php');
if($_REQUEST['action']=='ProdDtlExport') 
{ 
#  Create the Column Headings
$csv_output .= '"Sn",';
$csv_output .= '"CROP",'; 
$csv_output .= '"VARIETY",'; 
$csv_output .= '"ID",'; 
$csv_output .= '"TYPE",'; 
$csv_output .= '"NRV",';
$csv_output .= "\n";		
if($_REQUEST['i']>0){$sql = mysql_query("select hrm_sales_seedsproduct.ItemId,ProductId,ProductName,ItemName,TypeName from hrm_sales_seedsproduct INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId INNER JOIN hrm_sales_seedtype ON hrm_sales_seedsproduct.TypeId=hrm_sales_seedtype.TypeId where hrm_sales_seedsitem.ItemId=".$_REQUEST['i']." AND hrm_sales_seedsproduct.ProductSts='A' order by ItemName ASC, TypeName ASC, ProductName ASC", $con); }
else
{ if($_REQUEST['g']==1 OR $_REQUEST['g']==2){$sql = mysql_query("select hrm_sales_seedsproduct.ItemId,ProductId,ProductName,ItemName,TypeName from hrm_sales_seedsproduct INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId INNER JOIN hrm_sales_seedtype ON hrm_sales_seedsproduct.TypeId=hrm_sales_seedtype.TypeId where hrm_sales_seedsitem.GroupId=".$_REQUEST['g']." AND hrm_sales_seedsproduct.ProductSts='A' order by ItemName ASC, TypeName ASC, ProductName ASC", $con);} 
if($_REQUEST['g']==3){$sql = mysql_query("select hrm_sales_seedsproduct.ItemId,ProductId,ProductName,ItemName,TypeName from hrm_sales_seedsproduct INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId INNER JOIN hrm_sales_seedtype ON hrm_sales_seedsproduct.TypeId=hrm_sales_seedtype.TypeId where hrm_sales_seedsproduct.ProductSts='A' order by hrm_sales_seedsitem.GroupId ASC, ItemName ASC, TypeName ASC, ProductName ASC", $con); }
}   
	  $sn=1; while($res=mysql_fetch_array($sql)){
$csv_output .= '"'.str_replace('"', '""', $sn).'",';
$csv_output .= '"'.str_replace('"', '""', $res['ItemName']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['ProductName']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['ProductId']).'",';
$csv_output .= '"'.str_replace('"', '""', substr_replace($res['TypeName'],'',2)).'",';
$sNrv=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND PStatus='A'", $con); $rNrv=mysql_fetch_assoc($sNrv);
$csv_output .= '"'.str_replace('"', '""', $rNrv['NRV']).'",';
$csv_output .= "\n";
$sn++; }

# Close the MySql connection
mysql_close($con);
# Set the headers so the file downloads
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Content-Length: " . strlen($csv_output));
header("Content-type: text/x-csv");
header("Content-Disposition: attachment; filename=ProductList.csv");
echo $csv_output;
exit;
}



elseif($_REQUEST['action']=='ProdAreaDtlExport') 
{ 
#  Create the Column Headings
$csv_output .= '"Sn",';
$csv_output .= '"CROP",'; 
$csv_output .= '"VARIETY",'; 
$csv_output .= '"TYPE",'; 
$csv_output .= '"VILLAGE",';
$csv_output .= '"AREA",';
$csv_output .= '"DISTRIC",';
$csv_output .= '"STATE",';
$csv_output .= "\n";		
if($_REQUEST['i']>0){$sql = mysql_query("select hrm_sales_seedsproduct.ItemId,ProductId,ProductName,ItemName,TypeName from hrm_sales_seedsproduct INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId INNER JOIN hrm_sales_seedtype ON hrm_sales_seedsproduct.TypeId=hrm_sales_seedtype.TypeId where hrm_sales_seedsitem.ItemId=".$_REQUEST['i']." order by ItemName ASC, TypeName ASC, ProductName ASC", $con); }
else
{ if($_REQUEST['g']==1 OR $_REQUEST['g']==2){$sql = mysql_query("select hrm_sales_seedsproduct.ItemId,ProductId,ProductName,ItemName,TypeName from hrm_sales_seedsproduct INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId INNER JOIN hrm_sales_seedtype ON hrm_sales_seedsproduct.TypeId=hrm_sales_seedtype.TypeId where hrm_sales_seedsitem.GroupId=".$_REQUEST['g']." order by ItemName ASC, TypeName ASC, ProductName ASC", $con);} 
if($_REQUEST['g']==3){$sql = mysql_query("select hrm_sales_seedsproduct.ItemId,ProductId,ProductName,ItemName,TypeName from hrm_sales_seedsproduct INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId INNER JOIN hrm_sales_seedtype ON hrm_sales_seedsproduct.TypeId=hrm_sales_seedtype.TypeId order by hrm_sales_seedsitem.GroupId ASC, ItemName ASC, TypeName ASC, ProductName ASC", $con); }
}   
	  $sn=1; while($res=mysql_fetch_array($sql)){
$sAn=mysql_query("SELECT DISTINCT hrm_sales_villageloc.VillageLocName,hrm_sales_villageloc.AreaId FROM hrm_sales_product_area INNER JOIN hrm_sales_villageloc ON hrm_sales_product_area.VillageLocId=hrm_sales_villageloc.VillageLocId INNER JOIN hrm_sales_areavillage ON hrm_sales_villageloc.AreaId=hrm_sales_areavillage.AreaId WHERE ProductId=".$res['ProductId']." AND ActiveStatus=1 ORDER BY AreaName ASC", $con);	  
$csv_output .= '"'.str_replace('"', '""', $sn).'",';
$csv_output .= '"'.str_replace('"', '""', $res['ItemName']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['ProductName']).'",';
$csv_output .= '"'.str_replace('"', '""', substr_replace($res['TypeName'],'',2)).'",';
while($resArea=mysql_fetch_assoc($sAn)){ $areaIdNeed=mysql_fetch_array(mysql_query("select AreaId from hrm_sales_areavillage where AreaId='".$resArea['AreaId']."'", $con)); if($areaIdNeed['AreaId']>0){ $query=mysql_query("select AreaName,DistName,StateName from hrm_sales_areavillage C INNER JOIN hrm_sales_distric D ON C.DistId=D.DistId INNER JOIN hrm_state F ON D.StateId=F.StateId where AreaId=".$areaIdNeed['AreaId']." order by AreaName asc,DistName asc,StateName asc"); while($resDiS=mysql_fetch_array($query)){
$csv_output .= '"'.str_replace('"', '""', $resArea['VillageLocName']).'",';
$csv_output .= '"'.str_replace('"', '""', $resDiS['AreaName']).'",';
$csv_output .= '"'.str_replace('"', '""', $resDiS['DistName']).'",';
$csv_output .= '"'.str_replace('"', '""', $resDiS['StateName']).'",'; } } }
$csv_output .= "\n";
$sn++; } 

# Close the MySql connection
mysql_close($con);
# Set the headers so the file downloads
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Content-Length: " . strlen($csv_output));
header("Content-type: text/x-csv");
header("Content-Disposition: attachment; filename=ProductAreaList.csv");
echo $csv_output;
exit;
}


elseif($_REQUEST['action']=='FarmerDistrict') 
{  $sqlhq=mysql_query("SELECT DistName FROM hrm_sales_distric where DistId=".$_REQUEST['value'], $con); $reshq=mysql_fetch_array($sqlhq);
#  Create the Column Headings
$csv_output .= '"Sn",';
$csv_output .= '"Farmer",'; 
$csv_output .= '"Contact No",'; 
$csv_output .= '"Acreage",'; 
$csv_output .= '"Area",';
$csv_output .= "\n";		
$sqlDeal=mysql_query("select AreaName,FarmerName,Acreage,ContactNo from hrm_sales_farmer INNER JOIN hrm_sales_areavillage ON hrm_sales_farmer.AreaId=hrm_sales_areavillage.AreaId where hrm_sales_areavillage.DistId=".$_REQUEST['value']." order by AreaName ASC, FarmerName ASC",$con); $sn=1; $rowDeal=mysql_num_rows($sqlDeal); while($resDeal=mysql_fetch_assoc($sqlDeal)){
$csv_output .= '"'.str_replace('"', '""', $sn).'",';
$csv_output .= '"'.str_replace('"', '""', $resDeal['FarmerName']).'",';
$csv_output .= '"'.str_replace('"', '""', $resDeal['ContactNo']).'",';
$csv_output .= '"'.str_replace('"', '""', $resDeal['Acreage']).'",';
$csv_output .= '"'.str_replace('"', '""', $resDeal['AreaName']).'",';
$csv_output .= "\n";
$sn++; }

# Close the MySql connection
mysql_close($con);
# Set the headers so the file downloads
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Content-Length: " . strlen($csv_output));
header("Content-type: text/x-csv");
header("Content-Disposition: attachment; filename=FarmerList_".$reshq['DistName'].".csv");
echo $csv_output;
exit;
}
elseif($_REQUEST['action']=='FarmerState') 
{ $sqlC=mysql_query("SELECT StateName FROM hrm_state where StateId=".$_REQUEST['value'], $con); $resC=mysql_fetch_array($sqlC);
#  Create the Column Headings
$csv_output .= '"Sn",';
$csv_output .= '"Farmer",'; 
$csv_output .= '"Contact No",'; 
$csv_output .= '"Acreage",'; 
$csv_output .= '"Area",';
$csv_output .= '"District",'; 
$csv_output .= "\n";		
$sqlDeal=mysql_query("SELECT DistName, AreaName, FarmerName,Acreage,ContactNo
FROM hrm_sales_farmer
INNER JOIN hrm_sales_areavillage ON hrm_sales_farmer.AreaId = hrm_sales_areavillage.AreaId
INNER JOIN hrm_sales_distric ON hrm_sales_areavillage.DistId = hrm_sales_distric.DistId
WHERE hrm_sales_distric.StateId=".$_REQUEST['value']." order by AreaName ASC, FarmerName ASC",$con); 
$sn=1; while($resDeal=mysql_fetch_assoc($sqlDeal)){ 
$csv_output .= '"'.str_replace('"', '""', $sn).'",';
$csv_output .= '"'.str_replace('"', '""', $resDeal['FarmerName']).'",';
$csv_output .= '"'.str_replace('"', '""', $resDeal['ContactNo']).'",';
$csv_output .= '"'.str_replace('"', '""', $resDeal['Acreage']).'",';
$csv_output .= '"'.str_replace('"', '""', $resDeal['AreaName']).'",';
$csv_output .= '"'.str_replace('"', '""', $resDeal['DistName']).'",';
$csv_output .= "\n";
$sn++; }

# Close the MySql connection
mysql_close($con);
# Set the headers so the file downloads
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Content-Length: " . strlen($csv_output));
header("Content-type: text/x-csv");
header("Content-Disposition: attachment; filename=FarmerList_".$resC['StateName'].".csv");
echo $csv_output;
exit;
}
elseif($_REQUEST['action']=='FarmerCountry') 
{ $sqlC=mysql_query("SELECT CountryName FROM hrm_country where CountryId=".$_REQUEST['value'], $con); $resC=mysql_fetch_array($sqlC);
#  Create the Column Headings
$csv_output .= '"Sn",';
$csv_output .= '"Farmer",'; 
$csv_output .= '"Contact No",'; 
$csv_output .= '"Acreage",'; 
$csv_output .= '"Area",';
$csv_output .= '"District",'; 
$csv_output .= '"State",';  
$csv_output .= "\n";		
$sqlDeal=mysql_query("SELECT StateName, DistName, AreaName, FarmerName,ContactNo,Acreage FROM hrm_sales_farmer
INNER JOIN hrm_sales_areavillage ON hrm_sales_farmer.AreaId = hrm_sales_areavillage.AreaId
INNER JOIN hrm_sales_distric ON hrm_sales_areavillage.DistId = hrm_sales_distric.DistId
INNER JOIN hrm_state ON hrm_sales_distric.StateId = hrm_state.StateId
WHERE hrm_state.CountryId=".$_REQUEST['value']." ORDER BY StateName ASC , DistName ASC , AreaName ASC , FarmerName ASC",$con); 
$sn=1; while($resDeal=mysql_fetch_assoc($sqlDeal)){ 
$csv_output .= '"'.str_replace('"', '""', $sn).'",';
$csv_output .= '"'.str_replace('"', '""', $resDeal['FarmerName']).'",';
$csv_output .= '"'.str_replace('"', '""', $resDeal['ContactNo']).'",';
$csv_output .= '"'.str_replace('"', '""', $resDeal['Acreage']).'",';
$csv_output .= '"'.str_replace('"', '""', $resDeal['AreaName']).'",';
$csv_output .= '"'.str_replace('"', '""', $resDeal['DistName']).'",';
$csv_output .= '"'.str_replace('"', '""', $resDeal['StateName']).'",';

$csv_output .= "\n";
$sn++; }

# Close the MySql connection
mysql_close($con);
# Set the headers so the file downloads
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Content-Length: " . strlen($csv_output));
header("Content-type: text/x-csv");
header("Content-Disposition: attachment; filename=FarmerList_".$resC['CountryName'].".csv");
echo $csv_output;
exit;
}


?>