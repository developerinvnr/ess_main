<?php require_once('config/config.php');
require_once('config/config.php');
date_default_timezone_set('Asia/Calcutta');
if($_REQUEST['action']=='DiffpRExport') 
{ 
$sy=mysql_query("select * from hrm_year where YearId=".$_REQUEST['y']."", $con); $ry=mysql_fetch_assoc($sy); 
$FD=date("Y",strtotime($ry['FromDate'])); $TD=date("Y",strtotime($ry['ToDate'])); $PRD=$FD.'-'.$TD;
$y1m=date("y",strtotime($ry['FromDate'])); $y2m=date("y",strtotime($ry['ToDate']));
$fy1=date("Y",strtotime($ry['FromDate'])); $ty1=date("Y",strtotime($ry['ToDate']));

// Define Excel (.xls) file name
if($_REQUEST['e']>0){$sqlee=mysql_query("select e.EmployeeID,EmpCode,Fname,Sname,Lname,CostCenter,HqName,StateName from hrm_employee e inner join hrm_employee_general g on e.EmployeeID=g.EmployeeID inner join hrm_headquater hq on g.HqId=hq.HqId inner join hrm_state s on hq.StateId=s.StateId where e.EmployeeID=".$_REQUEST['e'],$con); $ree=mysql_fetch_assoc($sqlee); $e=$ree['Fname'].' '.$ree['Sname'].' '.$ree['Lname'].'-'.$ree['HqName'].' ('.$ree['StateName'].')'; $xls_filename = 'Deviation_Reports_Employee_'.str_replace(' ', '', $e).'-'.$FD.'_'.$TD.'.xls'; }
elseif($_REQUEST['dil']>0){ $sqldil=mysql_query("SELECT DealerName,DealerCity FROM hrm_sales_dealer where DealerId=".$_REQUEST['dil'], $con); $resdil=mysql_fetch_array($sqldil); $xls_filename = 'Deviation_Reports_Dealer_'.str_replace(' ', '', $resdil['DealerName']).'-'.$resdil['DealerCity'].'-'.$FD.'_'.$TD.'.xls'; }
elseif($_REQUEST['hq']>0){ $sqlhq=mysql_query("SELECT HqName FROM hrm_headquater where HqId=".$_REQUEST['hq'], $con); $reshq=mysql_fetch_array($sqlhq); $xls_filename = 'Deviation_Reports_Hq_'.str_replace(' ', '', $reshq['HqName']).'-'.$FD.'_'.$TD.'.xls'; }
elseif($_REQUEST['z']>0 OR $_REQUEST['s']>0){ if($_REQUEST['z']>0){$sqlZ=mysql_query("SELECT ZoneName FROM hrm_sales_zone where ZoneId=".$_REQUEST['z'], $con); $resZ=mysql_fetch_array($sqlZ); $xls_filename = 'Deviation_Reports_Zone_'.str_replace(' ', '', $resZ['ZoneName']).'-'.$FD.'_'.$TD.'.xls';}elseif($_REQUEST['s']>0){$sqlS=mysql_query("SELECT StateName FROM hrm_state where StateId=".$_REQUEST['s'], $con); $resS=mysql_fetch_array($sqlS); $xls_filename = 'Deviation_Reports_State_'.str_replace(' ', '', $resS['StateName']).'-'.$FD.'_'.$TD.'.xls'; } }
elseif($_REQUEST['c']>0){ $sqlC=mysql_query("SELECT CountryName FROM hrm_country where CountryId=".$_REQUEST['c'], $con); $resC=mysql_fetch_array($sqlC); $xls_filename = 'Deviation_Reports_Country_'.$resC['CountryName'].'-'.$FD.'_'.$TD.'.xls'; } 
// Header info settings
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=$xls_filename");
header("Pragma: no-cache");
header("Expires: 0");


if($_REQUEST['grp']==1){ $HqCon='Hq_vc'; $TerrCon='Terr_vc'; }
elseif($_REQUEST['grp']==2){ $HqCon='Hq_fc'; $TerrCon='Terr_fc'; }

if($_REQUEST['ii']>0){ $qin="sp.ItemId=".$_REQUEST['ii']; }
else{ if($_REQUEST['grp']==1 OR $_REQUEST['grp']==2){ $qin="si.GroupId=".$_REQUEST['grp']; }else{ $qin='1=1'; } }

 
/***** Start of Formatting for Excel *****/
// Define separator (defines columns in excel &amp; tabs in word)
$sep = "\t"; // tabbed character
 
// Start of printing column names as names of MySQL fields
$sql = mysql_query("select sp.ItemId,ProductId,ProductName,ItemName,ItemCode,TypeName from hrm_sales_seedsproduct sp INNER JOIN hrm_sales_seedsitem si ON sp.ItemId=si.ItemId INNER JOIN hrm_sales_seedtype st ON sp.TypeId=st.TypeId where si.ItemId=".$_REQUEST['ii']." order by si.GroupId ASC, ItemName ASC, TypeName ASC, ProductName ASC", $con); 
echo "SN\tCROP\tVARIETY\tTYPE\tYEAR\tProj\tTgt\tDeviation";
print("\n");
// End of printing column names
 
// Start while loop to get data
     $Sn=1; 
     while($res=mysql_fetch_array($sql))
     {	  
	  if($_REQUEST['e']>0){ $result = mysql_query("select sum(M1) as M1, sum(M2) as M2, sum(M3) as M3, sum(M4) as M4, sum(M5) as M5, sum(M6) as M6, sum(M7) as M7, sum(M8) as M8, sum(M9) as M9, sum(M10) as M10, sum(M11) as M11, sum(M12) as M12, sum(M1_Proj) as M1p, sum(M2_Proj) as M2p, sum(M3_Proj) as M3p, sum(M4_Proj) as M4p, sum(M5_Proj) as M5p, sum(M6_Proj) as M6p, sum(M7_Proj) as M7p, sum(M8_Proj) as M8p, sum(M9_Proj) as M9p, sum(M10_Proj) as M10p, sum(M11_Proj) as M11p, sum(M12_Proj) as M12p from hrm_sales_sal_details_".$_REQUEST['y']." sd inner join hrm_sales_dealer d on sd.DealerId=d.DealerId inner join hrm_sales_reporting_level rl d.".$TerrCon."=rl.EmployeeID where d.DealerSts='A' AND (".$TerrCon."=".$_REQUEST['e']." OR rl.R1=".$_REQUEST['e']." OR rl.R2=".$_REQUEST['e']." OR rl.R3=".$_REQUEST['e']." OR rl.R4=".$_REQUEST['e']." OR rl.R5=".$_REQUEST['e'].") AND sd.YearId=".$_REQUEST['y']." AND sd.ProductId=".$res['ProductId'], $con); }
	  
	  elseif($_REQUEST['dil']>0){ $result = mysql_query("select sum(M1) as M1, sum(M2) as M2, sum(M3) as M3, sum(M4) as M4, sum(M5) as M5, sum(M6) as M6, sum(M7) as M7, sum(M8) as M8, sum(M9) as M9, sum(M10) as M10, sum(M11) as M11, sum(M12) as M12, sum(M1_Proj) as M1p, sum(M2_Proj) as M2p, sum(M3_Proj) as M3p, sum(M4_Proj) as M4p, sum(M5_Proj) as M5p, sum(M6_Proj) as M6p, sum(M7_Proj) as M7p, sum(M8_Proj) as M8p, sum(M9_Proj) as M9p, sum(M10_Proj) as M10p, sum(M11_Proj) as M11p, sum(M12_Proj) as M12p from hrm_sales_sal_details_".$_REQUEST['y']." where DealerId=".$_REQUEST['dil']." AND YearId=".$_REQUEST['y']." AND ProductId=".$res['ProductId'], $con); }
	  
	  elseif($_REQUEST['hq']>0){ $result = mysql_query("select sum(M1) as M1, sum(M2) as M2, sum(M3) as M3, sum(M4) as M4, sum(M5) as M5, sum(M6) as M6, sum(M7) as M7, sum(M8) as M8, sum(M9) as M9, sum(M10) as M10, sum(M11) as M11, sum(M12) as M12, sum(M1_Proj) as M1p, sum(M2_Proj) as M2p, sum(M3_Proj) as M3p, sum(M4_Proj) as M4p, sum(M5_Proj) as M5p, sum(M6_Proj) as M6p, sum(M7_Proj) as M7p, sum(M8_Proj) as M8p, sum(M9_Proj) as M9p, sum(M10_Proj) as M10p, sum(M11_Proj) as M11p, sum(M12_Proj) as M12p from hrm_sales_sal_details_".$_REQUEST['y']." sd inner join hrm_sales_dealer d on sd.DealerId=d.DealerId where d.".$HqCon."=".$_REQUEST['hq']." AND d.DealerSts='A' AND sd.YearId=".$_REQUEST['y']." AND sd.ProductId=".$res['ProductId'], $con); }
	  
	  elseif($_REQUEST['z']>0 OR $_REQUEST['s']>0)
	  {  
	    if($_REQUEST['z']>0){ $result = mysql_query("select sum(M1) as M1, sum(M2) as M2, sum(M3) as M3, sum(M4) as M4, sum(M5) as M5, sum(M6) as M6, sum(M7) as M7, sum(M8) as M8, sum(M9) as M9, sum(M10) as M10, sum(M11) as M11, sum(M12) as M12, sum(M1_Proj) as M1p, sum(M2_Proj) as M2p, sum(M3_Proj) as M3p, sum(M4_Proj) as M4p, sum(M5_Proj) as M5p, sum(M6_Proj) as M6p, sum(M7_Proj) as M7p, sum(M8_Proj) as M8p, sum(M9_Proj) as M9p, sum(M10_Proj) as M10p, sum(M11_Proj) as M11p, sum(M12_Proj) as M12p from hrm_sales_sal_details_".$_REQUEST['y']." sd inner join hrm_sales_dealer d on sd.DealerId=d.DealerId inner join hrm_headquater hq on d.".$HqCon."=hq.HqId inner join hrm_state s on hq.StateId=s.StateId where s.ZoneId=".$_REQUEST['z']." AND d.DealerSts='A' AND sd.YearId=".$_REQUEST['y']." AND sd.ProductId=".$res['ProductId'], $con); }
		elseif($_REQUEST['s']>0){ $result = mysql_query("select sum(M1) as M1, sum(M2) as M2, sum(M3) as M3, sum(M4) as M4, sum(M5) as M5, sum(M6) as M6, sum(M7) as M7, sum(M8) as M8, sum(M9) as M9, sum(M10) as M10, sum(M11) as M11, sum(M12) as M12, sum(M1_Proj) as M1p, sum(M2_Proj) as M2p, sum(M3_Proj) as M3p, sum(M4_Proj) as M4p, sum(M5_Proj) as M5p, sum(M6_Proj) as M6p, sum(M7_Proj) as M7p, sum(M8_Proj) as M8p, sum(M9_Proj) as M9p, sum(M10_Proj) as M10p, sum(M11_Proj) as M11p, sum(M12_Proj) as M12p from hrm_sales_sal_details_".$_REQUEST['y']." sd inner join hrm_sales_dealer d on sd.DealerId=d.DealerId inner join hrm_headquater hq on d.".$HqCon."=hq.HqId where hq.StateId=".$_REQUEST['s']." AND sd.YearId=".$_REQUEST['y']." AND d.DealerSts='A' AND sd.ProductId=".$res['ProductId'], $con); }
	  }
	  
	  elseif($_REQUEST['c']>0){ $result = mysql_query("select sum(M1) as M1, sum(M2) as M2, sum(M3) as M3, sum(M4) as M4, sum(M5) as M5, sum(M6) as M6, sum(M7) as M7, sum(M8) as M8, sum(M9) as M9, sum(M10) as M10, sum(M11) as M11, sum(M12) as M12, sum(M1_Proj) as M1p, sum(M2_Proj) as M2p, sum(M3_Proj) as M3p, sum(M4_Proj) as M4p, sum(M5_Proj) as M5p, sum(M6_Proj) as M6p, sum(M7_Proj) as M7p, sum(M8_Proj) as M8p, sum(M9_Proj) as M9p, sum(M10_Proj) as M10p, sum(M11_Proj) as M11p, sum(M12_Proj) as M12p from hrm_sales_sal_details_".$_REQUEST['y']." sd inner join hrm_sales_dealer d on sd.DealerId=d.DealerId inner join hrm_headquater hq on d.".$HqCon."=hq.HqId inner join hrm_state s on hq.StateId=s.StateId where s.CountryId=".$_REQUEST['c']." AND d.DealerSts='A' AND sd.YearId=".$_REQUEST['y']." AND sd.ProductId=".$res['ProductId'], $con); }
	  $r=mysql_fetch_assoc($result);
	  $Fill=$r['M1']+$r['M2']+$r['M3']+$r['M4']+$r['M5']+$r['M6']+$r['M7']+$r['M8']+$r['M9']+$r['M10']+$r['M11']+$r['M12']; 
	  $Proj=$r['M1p']+$r['M2p']+$r['M3p']+$r['M4p']+$r['M5p']+$r['M6p']+$r['M7p']+$r['M8p']+$r['M9p']+$r['M10p']+$r['M11p']+$r['M12p'];
	  if($Fill<$Proj){ $Diff=$Proj-$Fill; $MDiff='-'.$Diff; }elseif($Fill>=$Proj){ $Diff=$Fill-$Proj; $MDiff='+'.$Diff; }
      if($Fill<0 OR $Fill>0 OR $Proj<0 OR $Proj>0)
      { 
       $schema_insert = "";
       $schema_insert .= $Sn.$sep;
       $schema_insert .= strtoupper($res['ItemName']).$sep;
       $schema_insert .= strtoupper($res['ProductName']).$sep;
       $schema_insert .= strtoupper(substr_replace($res['TypeName'],'',2)).$sep;				
       $schema_insert .= $FD.'-'.$TD.$sep;
       $schema_insert .= $Proj.$sep;	
       $schema_insert .= $Fill.$sep;
       $schema_insert .= $MDiff.$sep ;
 
       $schema_insert = str_replace($sep."$", "", $schema_insert);
       $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
       $schema_insert .= "\t";
       print(trim($schema_insert));
       print "\n";
       $Sn++; }
     }
}





if($_REQUEST['action']=='Diff22pRExport') 
{ 
$sy=mysql_query("select * from hrm_year where YearId=".$_REQUEST['y']."", $con); $ry=mysql_fetch_assoc($sy); 
$FD=date("Y",strtotime($ry['FromDate'])); $TD=date("Y",strtotime($ry['ToDate'])); $PRD=$FD.'-'.$TD;
$y1m=date("y",strtotime($ry['FromDate'])); $y2m=date("y",strtotime($ry['ToDate']));
$fy1=date("Y",strtotime($ry['FromDate'])); $ty1=date("Y",strtotime($ry['ToDate']));

$xls_filename = 'Deviation_Reports_'.$FD.'_'.$TD.'.xls'; // Define Excel (.xls) file name
// Header info settings
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=$xls_filename");
header("Pragma: no-cache");
header("Expires: 0");
 
/***** Start of Formatting for Excel *****/
// Define separator (defines columns in excel &amp; tabs in word)
$sep = "\t"; // tabbed character
 
// Start of printing column names as names of MySQL fields
$result = mysql_query("select sd.*,ProductName,ItemName,ItemCode,TypeName,DealerName,DealerCity,HqName,StateName,ZoneName from hrm_sales_sal_details_".$_REQUEST['y']." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId INNER JOIN hrm_sales_seedsitem si ON sp.ItemId=si.ItemId INNER JOIN hrm_sales_seedtype st ON sp.TypeId=st.TypeId INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_headquater hq ON d.".$HqCon."=hq.HqId INNER JOIN hrm_state s ON hq.StateId=s.StateId INNER JOIN hrm_sales_zone z ON s.ZoneId=z.ZoneId where sd.YearId=".$_REQUEST['y']." AND d.DealerSts='A' AND (M1!=0 OR M2!=0 OR M3!=0 OR M4!=0 OR M5!=0 OR M6!=0 OR M7!=0 OR M8!=0 OR M9!=0 OR M10!=0 OR M11!=0 OR M12!=0 OR M1_Proj!=0 OR M2_Proj!=0 OR M3_Proj!=0 OR M4_Proj!=0 OR M5_Proj!=0 OR M6_Proj!=0 OR M7_Proj!=0 OR M8_Proj!=0 OR M9_Proj!=0 OR M10_Proj!=0 OR M11_Proj!=0 OR M12_Proj!=0) order by si.GroupId ASC, si.ItemName ASC, sp.ProductName ASC", $con); 

echo "SN\tCROP\tVARIETY\tTYPE\tDEALER\tCITY\tHQ\tSTATE\tZONE\tYEAR\tProj\tTgt\tDiff";
print("\n");
// End of printing column names
 
// Start while loop to get data
$sn=1;
while($res = mysql_fetch_array($result))
{
 
 $schema_insert = "";
 $schema_insert .= $sn.$sep;
 $schema_insert .= $res['ItemName'].$sep;
 $schema_insert .= $res['ProductName'].$sep;				
 $schema_insert .= substr_replace($res['TypeName'],'',2).$sep;
 $schema_insert .= $res['DealerName'].$sep;	
 $schema_insert .= $res['DealerCity'].$sep;
 $schema_insert .= $res['HqName'].$sep ;
 $schema_insert .= $res['StateName'] .$sep;
 $schema_insert .= $res['ZoneName'].$sep;
 $schema_insert .= $FD.'-'.$TD.$sep;
 
$Proj=$res['M1_Proj']+$res['M2_Proj']+$res['M3_Proj']+$res['M4_Proj']+$res['M5_Proj']+$res['M6_Proj']+$res['M7_Proj']+$res['M8_Proj']+$res['M9_Proj']+$res['M10_Proj']+$res['M11_Proj']+$res['M12_Proj']; 
$schema_insert .= $Proj.$sep;

$Fill=$res['M1']+$res['M2']+$res['M3']+$res['M4']+$res['M5']+$res['M6']+$res['M7']+$res['M8']+$res['M9']+$res['M10']+$res['M11']+$res['M12'];
$schema_insert .= $Fill.$sep;

if($Fill<$Proj){ $Diff=$Proj-$Fill; $MDiff='-'.$Diff; }
elseif($Fill>$Proj){ $Diff=$Fill-$Proj; $MDiff='+'.$Diff; }
elseif($Fill==$Proj){ $MDiff=0; }
$schema_insert .= $MDiff.$sep;

 $schema_insert = str_replace($sep."$", "", $schema_insert);
 $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
 $schema_insert .= "\t";
 print(trim($schema_insert));
 print "\n";
  
$sn++;
}

}



?>