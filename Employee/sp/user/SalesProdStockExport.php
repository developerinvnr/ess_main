<?php require_once('config/config.php');
require_once('config/config.php');
date_default_timezone_set('Asia/Calcutta');
if($_REQUEST['action']=='DiffpRExport') 
{ 
 $sy=mysql_query("select * from hrm_year where YearId=".$_REQUEST['y']."", $con); $ry=mysql_fetch_assoc($sy); 
 $FD=date("Y",strtotime($ry['FromDate'])); $TD=date("Y",strtotime($ry['ToDate'])); $PRD=$FD.'-'.$TD;
 $y1m=date("y",strtotime($ry['FromDate'])); $y2m=date("y",strtotime($ry['ToDate']));
 $fy1=date("Y",strtotime($ry['FromDate'])); $ty1=date("Y",strtotime($ry['ToDate']));
 $my1=date("y",strtotime($ry['FromDate'])); $my2=date("y",strtotime($ry['ToDate']));

if($_REQUEST['stcloc']>0){$sqlstcl=mysql_query("select * from hrm_sales_product_stockloc where StckLocId=".$_REQUEST['stcloc'], $con); $restcl=mysql_fetch_assoc($sqlstcl); $loc=strtoupper($restcl['StckLocName'].'-'.$restcl['StckLocRef']); }
else {$loc='ALL_LOCATION';}

$xls_filename = 'Stock_Reports-'.$FD.'_'.$TD.'.xls'; 
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=$xls_filename");
header("Pragma: no-cache");
header("Expires: 0");
 
/***** Start of Formatting for Excel *****/
// Define separator (defines columns in excel &amp; tabs in word)
$sep = "\t"; // tabbed character
 
// Start of printing column names as names of MySQL fields
if($_REQUEST['ii']>0){$sql = mysql_query("select hrm_sales_seedsproduct.ItemId,ProductId,ProductName,ItemName,TypeName from hrm_sales_seedsproduct INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId INNER JOIN hrm_sales_seedtype ON hrm_sales_seedsproduct.TypeId=hrm_sales_seedtype.TypeId where hrm_sales_seedsitem.ItemId=".$_REQUEST['ii']." order by ItemName ASC, TypeName ASC, ProductName ASC", $con); }
      else
	  { if($_REQUEST['grp']==1 OR $_REQUEST['grp']==2){$sql = mysql_query("select hrm_sales_seedsproduct.ItemId,ProductId,ProductName,ItemName,TypeName from hrm_sales_seedsproduct INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId INNER JOIN hrm_sales_seedtype ON hrm_sales_seedsproduct.TypeId=hrm_sales_seedtype.TypeId where hrm_sales_seedsitem.GroupId=".$_REQUEST['grp']." order by ItemName ASC, TypeName ASC, ProductName ASC", $con);} if($_REQUEST['grp']==3){$sql = mysql_query("select hrm_sales_seedsproduct.ItemId,ProductId,ProductName,ItemName,TypeName from hrm_sales_seedsproduct INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId INNER JOIN hrm_sales_seedtype ON hrm_sales_seedsproduct.TypeId=hrm_sales_seedtype.TypeId order by hrm_sales_seedsitem.GroupId ASC, ItemName ASC, TypeName ASC, ProductName ASC", $con); }
	  } 
	  if($_REQUEST['grp']==0){$sqlI=mysql_query("select GroupId from hrm_sales_seedsitem where ItemId=".$_REQUEST['ii'], $con); $resI=mysql_fetch_array($sqlI);
	  $sqlSe=mysql_query("select SeasonId from hrm_sales_season where GroupId=".$resI['GroupId'], $con); }
	  else{$sqlSe=mysql_query("select SeasonId from hrm_sales_season where GroupId=".$_REQUEST['grp'], $con);}
	  
echo "SN\tCROP\tVARIETY\tTYPE\tAPR-".$my1."\tMAY-".$my1."\tJUN-".$my1."\tJUL-".$my1."\tAUG-".$my1."\tSEP-".$my1."\tOCT-".$my1."\tNOV-".$my1."\tDEC-".$my1."\tJAN-".$my2."\tFEB-".$my2."\tMAR-".$my2."";
print("\n");
// End of printing column names
 
// Start while loop to get data
    $Sn=1; 
	$rowSe=mysql_num_rows($sqlSe); $Sn=1; 
    while($res=mysql_fetch_array($sql))
    {	  
	  
	  if($_REQUEST['stcloc']=='All'){$sqlStck=mysql_query("select SUM(Apr) as sApr,SUM(May) as sMay,SUM(Jun) as sJun,SUM(Jul) as sJul,SUM(Aug) as sAug,SUM(Sep) as sSep,SUM(Oct) as sOct,SUM(Nov) as sNov,SUM(Dece) as sDece,SUM(Jan) as sJan,SUM(Feb) as sFeb,SUM(Mar) as sMar from hrm_sales_product_stock_actual where ProductId=".$res['ProductId']." AND YearId=".$_REQUEST['y']." AND CompanyId=".$_REQUEST['ci'], $con); }else{$sqlStck=mysql_query("select * from hrm_sales_product_stock_actual where StckLocId=".$_REQUEST['stcloc']." AND ProductId=".$res['ProductId']." AND YearId=".$_REQUEST['y']." AND CompanyId=".$_REQUEST['ci'], $con); 
}
      $resStck=mysql_fetch_assoc($sqlStck);
	  
	  if($_REQUEST['stcloc']=='All')
	  { 
       $schema_insert = "";
       $schema_insert .= $Sn.$sep;
       $schema_insert .= strtoupper($res['ItemName']).$sep;
       $schema_insert .= strtoupper($res['ProductName']).$sep;
       $schema_insert .= strtoupper(substr_replace($res['TypeName'],'',2)).$sep;
       $schema_insert .= $resStck['sApr'].$sep;
       $schema_insert .= $resStck['sMay'].$sep;
       $schema_insert .= $resStck['sJun'].$sep;
       $schema_insert .= $resStck['sJul'].$sep;
	   $schema_insert .= $resStck['sAug'].$sep;
	   $schema_insert .= $resStck['sSep'].$sep;
	   $schema_insert .= $resStck['sOct'].$sep;
	   $schema_insert .= $resStck['sNov'].$sep;
	   $schema_insert .= $resStck['sDece'].$sep;
	   $schema_insert .= $resStck['sJan'].$sep;
	   $schema_insert .= $resStck['sFeb'].$sep;
	   $schema_insert .= $resStck['sMar'].$sep;
       $schema_insert = str_replace($sep."$", "", $schema_insert);
       $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
       $schema_insert .= "\t";
       print(trim($schema_insert));
       print "\n";
       $Sn++; 
	  }
	  else
	  { 
       $schema_insert = "";
       $schema_insert .= $Sn.$sep;
       $schema_insert .= strtoupper($res['ItemName']).$sep;
       $schema_insert .= strtoupper($res['ProductName']).$sep;
       $schema_insert .= strtoupper(substr_replace($res['TypeName'],'',2)).$sep;
       $schema_insert .= $resStck['Apr'].$sep;
       $schema_insert .= $resStck['May'].$sep;
       $schema_insert .= $resStck['Jun'].$sep;
       $schema_insert .= $resStck['Jul'].$sep;
	   $schema_insert .= $resStck['Aug'].$sep;
	   $schema_insert .= $resStck['Sep'].$sep;
	   $schema_insert .= $resStck['Oct'].$sep;
	   $schema_insert .= $resStck['Nov'].$sep;
	   $schema_insert .= $resStck['Dece'].$sep;
	   $schema_insert .= $resStck['Jan'].$sep;
	   $schema_insert .= $resStck['Feb'].$sep;
	   $schema_insert .= $resStck['Mar'].$sep;
       $schema_insert = str_replace($sep."$", "", $schema_insert);
       $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
       $schema_insert .= "\t";
       print(trim($schema_insert));
       print "\n";
       $Sn++; 
	  }
	   
	   
    }
}

?>