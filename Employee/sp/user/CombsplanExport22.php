<?php require_once('config/config.php');
require_once('config/config.php');

if($_REQUEST['action']=='TgtPlanRExport') 
{ 
$sy=mysql_query("select * from hrm_year where YearId=".$_REQUEST['y']."", $con); $ry=mysql_fetch_assoc($sy); 
$FD=date("Y",strtotime($ry['FromDate'])); $TD=date("Y",strtotime($ry['ToDate'])); $PRD=$FD.'-'.$TD;

$csv_output .= '"SN",';
$csv_output .= '"CROP",'; 
$csv_output .= '"VARIETY",';
$csv_output .= '"TYPE",';
$csv_output .= '"DISTRIBUTORS",';
$csv_output .= '"CITY",';
$csv_output .= '"HEADQUARTER",';
$csv_output .= '"TERRITORY",';
$csv_output .= '"ZONE",';
$csv_output .= '"STATE",';	
$csv_output .= '"COUNTRY",';
$csv_output .= '"APR",';	
$csv_output .= '"MAY",';
$csv_output .= '"JUN",';
$csv_output .= '"Q1",';
$csv_output .= '"JUL",';	
$csv_output .= '"AUG",';
$csv_output .= '"SEP",';
$csv_output .= '"Q2",';
$csv_output .= '"OCT",';
$csv_output .= '"NOV",';
$csv_output .= '"DEC",';
$csv_output .= '"Q3",';
$csv_output .= '"JAN",';
$csv_output .= '"FEB",';
$csv_output .= '"MAR",';
$csv_output .= '"Q4",';
$csv_output .= '"TOTAL",';
$csv_output .= "\n";
	
$sql = mysql_query("select hrm_sales_sal_details.ProductId,DealerId,M1,M2,M3,M4,M5,M6,M7,M8,M9,M10,M11,M12,ProductName,ItemName,ItemCode from hrm_sales_sal_details INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details.ProductId=hrm_sales_seedsproduct.ProductId INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId where YearId=".$_REQUEST['y']." AND (M1!=0 OR M2!=0 OR M3!=0 OR M4!=0 OR M5!=0 OR M6!=0 OR M7!=0 OR M8!=0 OR M9!=0 OR M10!=0 OR M11!=0 OR M12!=0) order by hrm_sales_seedsitem.ItemName ASC,hrm_sales_seedsproduct.ProductName ASC", $con); $Sn=1; while($res=mysql_fetch_array($sql)){ 
	  
$sP=mysql_query("select TypeId from hrm_sales_seedsproduct where ProductId=".$res['ProductId'], $con); $rP=mysql_fetch_assoc($sP);
if($rP['TypeId']>0){$sT=mysql_query("select TypeName from hrm_sales_seedtype where TypeId=".$rP['TypeId'], $con); $rT=mysql_fetch_assoc($sT);}
if($res['DealerId']>0){$sD=mysql_query("select DealerName,DealerCity,HqId from hrm_sales_dealer where DealerId=".$res['DealerId'], $con); $rD=mysql_fetch_assoc($sD);}
if($rD['HqId']>0)
{ $sH=mysql_query("select HqName,StateId from hrm_headquater where HqId=".$rD['HqId'], $con); $rH=mysql_fetch_assoc($sH);
  $sEId=mysql_query("select EmployeeID from hrm_sales_hq_temp where HqId=".$rD['HqId'], $con); $rEId=mysql_fetch_assoc($sEId);
  if($rEId['EmployeeID']>0){ $sEmp=mysql_query("select Fname,Sname,Lname from hrm_employee where EmployeeID=".$rEId['EmployeeID'], $con); $rEmp=mysql_fetch_assoc($sEmp);
  $rEmpName=$rEmp['Fname'].' '.$rEmp['Sname'].' '.$rEmp['Lname']; } else {$rEmpName=' ';}
}
if($rH['StateId']>0){$sS=mysql_query("select StateName,ZoneId,CountryId from hrm_state where StateId=".$rH['StateId'], $con); $rS=mysql_fetch_assoc($sS);}
if($rS['ZoneId']>0){$sZ=mysql_query("select ZoneName from hrm_sales_zone where ZoneId=".$rS['ZoneId'], $con); $rZ=mysql_fetch_assoc($sZ);}
if($rS['CountryId']>0){$sC=mysql_query("select CountryName from hrm_country where CountryId=".$rS['CountryId'], $con); $rC=mysql_fetch_assoc($sC);}

	  
$resTot=$res['M1']+$res['M2']+$res['M3']+$res['M4']+$res['M5']+$res['M6']+$res['M7']+$res['M8']+$res['M9']+$res['M10']+$res['M11']+$res['M12']; 
$resTot1=$res['M1']+$res['M2']+$res['M3']; $resTot2=$res['M4']+$res['M5']+$res['M6'];
$resTot3=$res['M7']+$res['M8']+$res['M9']; $resTot4=$res['M10']+$res['M11']+$res['M12'];	

if($res['M1']!=0){$M1=floatval($res['M1']);}else{$M1=' ';} if($res['M2']!=0){$M2=floatval($res['M2']);}else{$M2=' ';}
if($res['M3']!=0){$M3=floatval($res['M3']);}else{$M3=' ';} if($res['M4']!=0){$M4=floatval($res['M4']);}else{$M4=' ';}
if($res['M5']!=0){$M5=floatval($res['M5']);}else{$M5=' ';} if($res['M6']!=0){$M6=floatval($res['M6']);}else{$M6=' ';}
if($res['M7']!=0){$M7=floatval($res['M7']);}else{$M7=' ';} if($res['M8']!=0){$M8=floatval($res['M8']);}else{$M8=' ';}
if($res['M9']!=0){$M9=floatval($res['M9']);}else{$M9=' ';} if($res['M10']!=0){$M10=floatval($res['M10']);}else{$M10=' ';}
if($res['M11']!=0){$M11=floatval($res['M11']);}else{$M11=' ';} if($res['M12']!=0){$M12=floatval($res['M12']);}else{$M12=' ';}
    
$csv_output .= '"'.str_replace('"', '""', $Sn).'",';
$csv_output .= '"'.str_replace('"', '""', $res['ItemName']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['ProductName']).'",';
$csv_output .= '"'.str_replace('"', '""', substr_replace($rT['TypeName'],'',2)).'",';
$csv_output .= '"'.str_replace('"', '""', $rD['DealerName']).'",';
$csv_output .= '"'.str_replace('"', '""', $rD['DealerCity']).'",';
$csv_output .= '"'.str_replace('"', '""', $rH['HqName']).'",';
$csv_output .= '"'.str_replace('"', '""', $rEmpName).'",';
$csv_output .= '"'.str_replace('"', '""', $rZ['ZoneName']).'",';
$csv_output .= '"'.str_replace('"', '""', $rS['StateName']).'",';
$csv_output .= '"'.str_replace('"', '""', strtoupper($rC['CountryName'])).'",';
$csv_output .= '"'.str_replace('"', '""', $M1).'",';
$csv_output .= '"'.str_replace('"', '""', $M2).'",';
$csv_output .= '"'.str_replace('"', '""', $M3).'",';
$csv_output .= '"'.str_replace('"', '""', $resTot1).'",';
$csv_output .= '"'.str_replace('"', '""', $M4).'",';
$csv_output .= '"'.str_replace('"', '""', $M5).'",';
$csv_output .= '"'.str_replace('"', '""', $M6).'",';
$csv_output .= '"'.str_replace('"', '""', $resTot2).'",';
$csv_output .= '"'.str_replace('"', '""', $M7).'",';
$csv_output .= '"'.str_replace('"', '""', $M8).'",';
$csv_output .= '"'.str_replace('"', '""', $M9).'",';
$csv_output .= '"'.str_replace('"', '""', $resTot3).'",';
$csv_output .= '"'.str_replace('"', '""', $M10).'",';
$csv_output .= '"'.str_replace('"', '""', $M11).'",';
$csv_output .= '"'.str_replace('"', '""', $M12).'",';
$csv_output .= '"'.str_replace('"', '""', $resTot4).'",';
$csv_output .= '"'.str_replace('"', '""', $resTot).'",';
$csv_output .= "\n";
$Sn++; }

# Close the MySql connection
mysql_close($con);
# Set the headers so the file downloads
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Content-Length: " . strlen($csv_output));
header("Content-type: text/x-csv");
header("Content-Disposition: attachment; filename=Target_".$PRD.".csv");
echo $csv_output;
exit;
}


elseif($_REQUEST['action']=='SalPlanRExport') 
{ 
$sy=mysql_query("select * from hrm_year where YearId=".$_REQUEST['y']."", $con); $ry=mysql_fetch_assoc($sy); 
$FD=date("Y",strtotime($ry['FromDate'])); $TD=date("Y",strtotime($ry['ToDate'])); $PRD=$FD.'-'.$TD;

$csv_output .= '"SN",';
$csv_output .= '"CROP",'; 
$csv_output .= '"VARIETY",';
$csv_output .= '"TYPE",';
$csv_output .= '"DISTRIBUTORS",';
$csv_output .= '"CITY",';
$csv_output .= '"HEADQUARTER",';
$csv_output .= '"TERRITORY",';
$csv_output .= '"ZONE",';
$csv_output .= '"STATE",';	
$csv_output .= '"COUNTRY",';
$csv_output .= '"APR",';	
$csv_output .= '"MAY",';
$csv_output .= '"JUN",';
$csv_output .= '"Q1",';
$csv_output .= '"JUL",';	
$csv_output .= '"AUG",';
$csv_output .= '"SEP",';
$csv_output .= '"Q2",';
$csv_output .= '"OCT",';
$csv_output .= '"NOV",';
$csv_output .= '"DEC",';
$csv_output .= '"Q3",';
$csv_output .= '"JAN",';
$csv_output .= '"FEB",';
$csv_output .= '"MAR",';
$csv_output .= '"Q4",';
$csv_output .= '"TOTAL",';
$csv_output .= "\n";
	
$sql = mysql_query("select hrm_sales_sal_details.ProductId,DealerId,M1_Ach,M2_Ach,M3_Ach,M4_Ach,M5_Ach,M6_Ach,M7_Ach,M8_Ach,M9_Ach,M10_Ach,M11_Ach,M12_Ach,ProductName,ItemName,ItemCode from hrm_sales_sal_details INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details.ProductId=hrm_sales_seedsproduct.ProductId INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId where YearId=".$_REQUEST['y']." AND (M1_Ach!=0 OR M2_Ach!=0 OR M3_Ach!=0 OR M4_Ach!=0 OR M5_Ach!=0 OR M6_Ach!=0 OR M7_Ach!=0 OR M8_Ach!=0 OR M9_Ach!=0 OR M10_Ach!=0 OR M11_Ach!=0 OR M12_Ach!=0) order by hrm_sales_seedsitem.ItemName ASC,hrm_sales_seedsproduct.ProductName ASC", $con); $Sn=1; while($res=mysql_fetch_array($sql)){ 
	  
$sP=mysql_query("select TypeId from hrm_sales_seedsproduct where ProductId=".$res['ProductId'], $con); $rP=mysql_fetch_assoc($sP);
if($rP['TypeId']>0){$sT=mysql_query("select TypeName from hrm_sales_seedtype where TypeId=".$rP['TypeId'], $con); $rT=mysql_fetch_assoc($sT);}
if($res['DealerId']>0){$sD=mysql_query("select DealerName,DealerCity,HqId from hrm_sales_dealer where DealerId=".$res['DealerId'], $con); $rD=mysql_fetch_assoc($sD);}
if($rD['HqId']>0)
{ $sH=mysql_query("select HqName,StateId from hrm_headquater where HqId=".$rD['HqId'], $con); $rH=mysql_fetch_assoc($sH);
  $sEId=mysql_query("select EmployeeID from hrm_sales_hq_temp where HqId=".$rD['HqId'], $con); $rEId=mysql_fetch_assoc($sEId);
  if($rEId['EmployeeID']>0){ $sEmp=mysql_query("select Fname,Sname,Lname from hrm_employee where EmployeeID=".$rEId['EmployeeID'], $con); $rEmp=mysql_fetch_assoc($sEmp);
  $rEmpName=$rEmp['Fname'].' '.$rEmp['Sname'].' '.$rEmp['Lname']; } else {$rEmpName='';}
}
if($rH['StateId']>0){$sS=mysql_query("select StateName,ZoneId,CountryId from hrm_state where StateId=".$rH['StateId'], $con); $rS=mysql_fetch_assoc($sS);}
if($rS['ZoneId']>0){$sZ=mysql_query("select ZoneName from hrm_sales_zone where ZoneId=".$rS['ZoneId'], $con); $rZ=mysql_fetch_assoc($sZ);}
if($rS['CountryId']>0){$sC=mysql_query("select CountryName from hrm_country where CountryId=".$rS['CountryId'], $con); $rC=mysql_fetch_assoc($sC);}

	  
$resTot=$res['M1_Ach']+$res['M2_Ach']+$res['M3_Ach']+$res['M4_Ach']+$res['M5_Ach']+$res['M6_Ach']+$res['M7_Ach']+$res['M8_Ach']+$res['M9_Ach']+$res['M10_Ach']+$res['M11_Ach']+$res['M12_Ach']; 
$resTot1=$res['M1_Ach']+$res['M2_Ach']+$res['M3_Ach']; $resTot2=$res['M4_Ach']+$res['M5_Ach']+$res['M6_Ach'];
$resTot3=$res['M7_Ach']+$res['M8_Ach']+$res['M9_Ach']; $resTot4=$res['M10_Ach']+$res['M11_Ach']+$res['M12_Ach'];	

if($res['M1_Ach']!=0){$M1=floatval($res['M1_Ach']);}else{$M1=' ';} if($res['M2_Ach']!=0){$M2=floatval($res['M2_Ach']);}else{$M2=' ';}
if($res['M3_Ach']!=0){$M3=floatval($res['M3_Ach']);}else{$M3=' ';} if($res['M4_Ach']!=0){$M4=floatval($res['M4_Ach']);}else{$M4=' ';}
if($res['M5_Ach']!=0){$M5=floatval($res['M5_Ach']);}else{$M5=' ';} if($res['M6_Ach']!=0){$M6=floatval($res['M6_Ach']);}else{$M6=' ';}
if($res['M7_Ach']!=0){$M7=floatval($res['M7_Ach']);}else{$M7=' ';} if($res['M8_Ach']!=0){$M8=floatval($res['M8_Ach']);}else{$M8=' ';}
if($res['M9_Ach']!=0){$M9=floatval($res['M9_Ach']);}else{$M9=' ';} if($res['M10_Ach']!=0){$M10=floatval($res['M10_Ach']);}else{$M10=' ';}
if($res['M11_Ach']!=0){$M11=floatval($res['M11_Ach']);}else{$M11=' ';} if($res['M12_Ach']!=0){$M12=floatval($res['M12_Ach']);}else{$M12=' ';}
    
$csv_output .= '"'.str_replace('"', '""', $Sn).'",';
$csv_output .= '"'.str_replace('"', '""', $res['ItemName']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['ProductName']).'",';
$csv_output .= '"'.str_replace('"', '""', substr_replace($rT['TypeName'],'',2)).'",';
$csv_output .= '"'.str_replace('"', '""', $rD['DealerName']).'",';
$csv_output .= '"'.str_replace('"', '""', $rD['DealerCity']).'",';
$csv_output .= '"'.str_replace('"', '""', $rH['HqName']).'",';
$csv_output .= '"'.str_replace('"', '""', $rEmpName).'",';
$csv_output .= '"'.str_replace('"', '""', $rZ['ZoneName']).'",';
$csv_output .= '"'.str_replace('"', '""', $rS['StateName']).'",';
$csv_output .= '"'.str_replace('"', '""', strtoupper($rC['CountryName'])).'",';
$csv_output .= '"'.str_replace('"', '""', $M1).'",';
$csv_output .= '"'.str_replace('"', '""', $M2).'",';
$csv_output .= '"'.str_replace('"', '""', $M3).'",';
$csv_output .= '"'.str_replace('"', '""', $resTot1).'",';
$csv_output .= '"'.str_replace('"', '""', $M4).'",';
$csv_output .= '"'.str_replace('"', '""', $M5).'",';
$csv_output .= '"'.str_replace('"', '""', $M6).'",';
$csv_output .= '"'.str_replace('"', '""', $resTot2).'",';
$csv_output .= '"'.str_replace('"', '""', $M7).'",';
$csv_output .= '"'.str_replace('"', '""', $M8).'",';
$csv_output .= '"'.str_replace('"', '""', $M9).'",';
$csv_output .= '"'.str_replace('"', '""', $resTot3).'",';
$csv_output .= '"'.str_replace('"', '""', $M10).'",';
$csv_output .= '"'.str_replace('"', '""', $M11).'",';
$csv_output .= '"'.str_replace('"', '""', $M12).'",';
$csv_output .= '"'.str_replace('"', '""', $resTot4).'",';
$csv_output .= '"'.str_replace('"', '""', $resTot).'",';
$csv_output .= "\n";
$Sn++; }

# Close the MySql connection
mysql_close($con);
# Set the headers so the file downloads
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Content-Length: " . strlen($csv_output));
header("Content-type: text/x-csv");
header("Content-Disposition: attachment; filename=Sales_".$PRD.".csv");
echo $csv_output;
exit;
}

?>