<?php require_once('config/config.php');
require_once('config/config.php');

if($_REQUEST['action']=='TgtPlanRExport') 
{ 
$sy=mysql_query("select * from hrm_year where YearId=".$_REQUEST['y']."", $con); $ry=mysql_fetch_assoc($sy); 
$FD=date("Y",strtotime($ry['FromDate'])); $TD=date("Y",strtotime($ry['ToDate'])); $PRD=$FD.'-'.$TD;
$y1m=date("y",strtotime($ry['FromDate'])); $y2m=date("y",strtotime($ry['ToDate']));
$fy1=date("Y",strtotime($ry['FromDate'])); $ty1=date("Y",strtotime($ry['ToDate']));

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
$csv_output .= '"APR-'.$y1m.'",';
$csv_output .= '"APR-'.$y1m.'_Val",';	
$csv_output .= '"MAY-'.$y1m.'",';
$csv_output .= '"MAY-'.$y1m.'_Val",';
$csv_output .= '"JUN-'.$y1m.'",';
$csv_output .= '"JUN-'.$y1m.'_Val",';
$csv_output .= '"Q1",';
$csv_output .= '"Q1_Value",';
$csv_output .= '"JUL-'.$y1m.'",';
$csv_output .= '"JUL-'.$y1m.'_Val",';	
$csv_output .= '"AUG-'.$y1m.'",';
$csv_output .= '"AUG-'.$y1m.'_Val",';
$csv_output .= '"SEP-'.$y1m.'",';
$csv_output .= '"SEP-'.$y1m.'_Val",';
$csv_output .= '"Q2",';
$csv_output .= '"Q2_Value",';
$csv_output .= '"OCT-'.$y1m.'",';
$csv_output .= '"OCT-'.$y1m.'_Val",';
$csv_output .= '"NOV-'.$y1m.'",';
$csv_output .= '"NOV-'.$y1m.'_Val",';
$csv_output .= '"DEC-'.$y1m.'",';
$csv_output .= '"DEC-'.$y1m.'_Val",';
$csv_output .= '"Q3",';
$csv_output .= '"Q3_Value",';
$csv_output .= '"JAN-'.$y2m.'",';
$csv_output .= '"JAN-'.$y2m.'_VAL",';
$csv_output .= '"FEB-'.$y2m.'",';
$csv_output .= '"FEB-'.$y2m.'_VAL",';
$csv_output .= '"MAR-'.$y2m.'",';
$csv_output .= '"MAR-'.$y2m.'_VAL",';
$csv_output .= '"Q4",';
$csv_output .= '"Q4_Value",';
$csv_output .= '"TOTAL",';
$csv_output .= '"TOTAL_Value",';
$csv_output .= "\n";
	
$sql = mysql_query("select hrm_sales_sal_details.ProductId,DealerId,M1,M2,M3,M4,M5,M6,M7,M8,M9,M10,M11,M12,ProductName,ItemName,ItemCode from hrm_sales_sal_details INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details.ProductId=hrm_sales_seedsproduct.ProductId INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId where YearId=".$_REQUEST['y']." AND (M1!=0 OR M2!=0 OR M3!=0 OR M4!=0 OR M5!=0 OR M6!=0 OR M7!=0 OR M8!=0 OR M9!=0 OR M10!=0 OR M11!=0 OR M12!=0) order by hrm_sales_seedsitem.ItemName ASC,hrm_sales_seedsproduct.ProductName ASC", $con); $Sn=1; while($res=mysql_fetch_array($sql)){ 
$sP=mysql_query("select TypeId from hrm_sales_seedsproduct where ProductId=".$res['ProductId'], $con); $rP=mysql_fetch_assoc($sP);
if($rP['TypeId']>0){$sT=mysql_query("select TypeName from hrm_sales_seedtype where TypeId=".$rP['TypeId'], $con); $rT=mysql_fetch_assoc($sT);}
if($res['DealerId']>0){$sD=mysql_query("select DealerName,DealerCity,HqId from hrm_sales_dealer where DealerId=".$res['DealerId'], $con); $rD=mysql_fetch_assoc($sD);}
if($rD['HqId']>0)
{ $sH=mysql_query("select HqName,StateId from hrm_headquater where HqId=".$rD['HqId'], $con); $rH=mysql_fetch_assoc($sH);
  $sEId=mysql_query("select EmployeeID from hrm_sales_hq_temp where HqId=".$rD['HqId']." AND HqTEmpStatus='A'", $con); $rEId=mysql_fetch_assoc($sEId);
  if($rEId['EmployeeID']>0){ $sEmp=mysql_query("select Fname,Sname,Lname from hrm_employee where EmployeeID=".$rEId['EmployeeID'], $con); $rEmp=mysql_fetch_assoc($sEmp);
  $rEmpName=$rEmp['Fname'].' '.$rEmp['Sname'].' '.$rEmp['Lname']; } else {$rEmpName=' ';}
}
if($rH['StateId']>0){$sS=mysql_query("select StateName,ZoneId,CountryId from hrm_state where StateId=".$rH['StateId'], $con); $rS=mysql_fetch_assoc($sS);}
if($rS['ZoneId']>0){$sZ=mysql_query("select ZoneName from hrm_sales_zone where ZoneId=".$rS['ZoneId'], $con); $rZ=mysql_fetch_assoc($sZ);}
if($rS['CountryId']>0){$sC=mysql_query("select CountryName from hrm_country where CountryId=".$rS['CountryId'], $con); $rC=mysql_fetch_assoc($sC);}
    
if($rD['DealerName']!=''){
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
$sNr=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND PStatus='A'", $con);

$csv_output .= '"'.str_replace('"', '""', floatval($res['M1'])).'",';
$s4=mysql_query("select NRV from hrm_sales_product_nrv where Fdate=(select max(Fdate) as Fdate from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate<='".$fy1."-04-01') AND ProductId=".$res['ProductId'],$con);
$row4=mysql_num_rows($s4); if($row4>0){ $r4=mysql_fetch_assoc($s4);}else{ $r4=mysql_fetch_assoc($sNr);}
$csv_output .= '"'.str_replace('"', '""', $res['M1']*$r4['NRV']).'",';

$csv_output .= '"'.str_replace('"', '""', floatval($res['M2'])).'",';
$s5=mysql_query("select NRV from hrm_sales_product_nrv where Fdate=(select max(Fdate) as Fdate from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate<='".$fy1."-05-01') AND ProductId=".$res['ProductId'],$con); 
$row5=mysql_num_rows($s5); if($row5>0){ $r5=mysql_fetch_assoc($s5);}else{ $r5=mysql_fetch_assoc($sNr); }
$csv_output .= '"'.str_replace('"', '""', $res['M2']*$r5['NRV']).'",';

$csv_output .= '"'.str_replace('"', '""', floatval($res['M3'])).'",';
$s6=mysql_query("select NRV from hrm_sales_product_nrv where Fdate=(select max(Fdate) as Fdate from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate<='".$fy1."-06-01') AND ProductId=".$res['ProductId'],$con);
$row6=mysql_num_rows($s6); if($row6>0){ $r6=mysql_fetch_assoc($s6);}else{ $r6=mysql_fetch_assoc($sNr); }
$csv_output .= '"'.str_replace('"', '""', $res['M3']*$r6['NRV']).'",';

$csv_output .= '"'.str_replace('"', '""', floatval($res['M1']+$res['M2']+$res['M3'])).'",';
$csv_output .= '"'.str_replace('"', '""', floatval(($res['M1']*$r4['NRV'])+($res['M2']*$r5['NRV'])+($res['M3']*$r6['NRV']))).'",';

$csv_output .= '"'.str_replace('"', '""', floatval($res['M4'])).'",';
$s7=mysql_query("select NRV from hrm_sales_product_nrv where Fdate=(select max(Fdate) as Fdate from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate<='".$fy1."-07-01') AND ProductId=".$res['ProductId'],$con);
$row7=mysql_num_rows($s7); if($row7>0){ $r7=mysql_fetch_assoc($s7);}else{ $r7=mysql_fetch_assoc($sNr); }
$csv_output .= '"'.str_replace('"', '""', $res['M4']*$r7['NRV']).'",';

$csv_output .= '"'.str_replace('"', '""', floatval($res['M5'])).'",';
$s8=mysql_query("select NRV from hrm_sales_product_nrv where Fdate=(select max(Fdate) as Fdate from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate<='".$fy1."-08-01') AND ProductId=".$res['ProductId'],$con);
$row8=mysql_num_rows($s8); if($row8>0){ $r8=mysql_fetch_assoc($s8);}else{ $r8=mysql_fetch_assoc($sNr); }
$csv_output .= '"'.str_replace('"', '""', $res['M5']*$r8['NRV']).'",';

$csv_output .= '"'.str_replace('"', '""', floatval($res['M6'])).'",';
$s9=mysql_query("select NRV from hrm_sales_product_nrv where Fdate=(select max(Fdate) as Fdate from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate<='".$fy1."-09-01') AND ProductId=".$res['ProductId'],$con);
$row9=mysql_num_rows($s9); if($row9>0){ $r9=mysql_fetch_assoc($s9);}else{ $r9=mysql_fetch_assoc($sNr); }
$csv_output .= '"'.str_replace('"', '""', $res['M6']*$r9['NRV']).'",';

$csv_output .= '"'.str_replace('"', '""', floatval($res['M4']+$res['M5']+$res['M6'])).'",';
$csv_output .= '"'.str_replace('"', '""', floatval(($res['M4']*$r7['NRV'])+($res['M5']*$r8['NRV'])+($res['M6']*$r9['NRV']))).'",';

$csv_output .= '"'.str_replace('"', '""', floatval($res['M7'])).'",';
$s10=mysql_query("select NRV from hrm_sales_product_nrv where Fdate=(select max(Fdate) as Fdate from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate<='".$fy1."-10-01') AND ProductId=".$res['ProductId'],$con);
$row10=mysql_num_rows($s10); if($row10>0){ $r10=mysql_fetch_assoc($s10);}else{ $r10=mysql_fetch_assoc($sNr); }
$csv_output .= '"'.str_replace('"', '""', $res['M7']*$r10['NRV']).'",';

$csv_output .= '"'.str_replace('"', '""', floatval($res['M8'])).'",';
$s11=mysql_query("select NRV from hrm_sales_product_nrv where Fdate=(select max(Fdate) as Fdate from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate<='".$fy1."-11-01') AND ProductId=".$res['ProductId'],$con);
$row11=mysql_num_rows($s11); if($row11>0){ $r11=mysql_fetch_assoc($s11);}else{ $r11=mysql_fetch_assoc($sNr); }
$csv_output .= '"'.str_replace('"', '""', $res['M8']*$r11['NRV']).'",';

$csv_output .= '"'.str_replace('"', '""', floatval($res['M9'])).'",';
$s12=mysql_query("select NRV from hrm_sales_product_nrv where Fdate=(select max(Fdate) as Fdate from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate<='".$fy1."-12-01') AND ProductId=".$res['ProductId'],$con);
$row12=mysql_num_rows($s12); if($row12>0){ $r12=mysql_fetch_assoc($s12);}else{ $r12=mysql_fetch_assoc($sNr); }
$csv_output .= '"'.str_replace('"', '""', $res['M9']*$r12['NRV']).'",';

$csv_output .= '"'.str_replace('"', '""', floatval($res['M7']+$res['M8']+$res['M9'])).'",';
$csv_output .= '"'.str_replace('"', '""', floatval(($res['M7']*$r10['NRV'])+($res['M8']*$r11['NRV'])+($res['M9']*$r12['NRV']))).'",';

$csv_output .= '"'.str_replace('"', '""', floatval($res['M10'])).'",';
$s1=mysql_query("select NRV from hrm_sales_product_nrv where Fdate=(select max(Fdate) as Fdate from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate<='".$ty1."-01-01') AND ProductId=".$res['ProductId'],$con);
$row1=mysql_num_rows($s1); if($row1>0){ $r1=mysql_fetch_assoc($s1);}else{ $r1=mysql_fetch_assoc($sNr); }
$csv_output .= '"'.str_replace('"', '""', $res['M10']*$r1['NRV']).'",';

$csv_output .= '"'.str_replace('"', '""', floatval($res['M11'])).'",';
$s2=mysql_query("select NRV from hrm_sales_product_nrv where Fdate=(select max(Fdate) as Fdate from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate<='".$ty1."-02-01') AND ProductId=".$res['ProductId'],$con);
$row2=mysql_num_rows($s2); if($row2>0){ $r2=mysql_fetch_assoc($s2);}else{ $r2=mysql_fetch_assoc($sNr); }
$csv_output .= '"'.str_replace('"', '""', $res['M11']*$r2['NRV']).'",';

$csv_output .= '"'.str_replace('"', '""', floatval($res['M12'])).'",';
$s3=mysql_query("select NRV from hrm_sales_product_nrv where Fdate=(select max(Fdate) as Fdate from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate<='".$ty1."-03-01') AND ProductId=".$res['ProductId'],$con); $row3=mysql_num_rows($s3); if($row3>0){ $r3=mysql_fetch_assoc($s3);}else{ $r3=mysql_fetch_assoc($sNr); }
$csv_output .= '"'.str_replace('"', '""', $res['M12']*$r3['NRV']).'",';

$csv_output .= '"'.str_replace('"', '""', floatval($res['M10']+$res['M11']+$res['M12'])).'",';
$csv_output .= '"'.str_replace('"', '""', floatval(($res['M10']*$r1['NRV'])+($res['M11']*$r2['NRV'])+($res['M12']*$r3['NRV']))).'",';

$csv_output .= '"'.str_replace('"', '""', floatval($res['M1']+$res['M2']+$res['M3']+$res['M4']+$res['M5']+$res['M6']+$res['M7']+$res['M8']+$res['M9']+$res['M10']+$res['M11']+$res['M12'])).'",';
$csv_output .= '"'.str_replace('"', '""', floatval(($res['M1']*$r4['NRV'])+($res['M2']*$r5['NRV'])+($res['M3']*$r6['NRV'])+($res['M4']*$r7['NRV'])+($res['M5']*$r8['NRV'])+($res['M6']*$r9['NRV'])+($res['M7']*$r10['NRV'])+($res['M8']*$r11['NRV'])+($res['M9']*$r12['NRV'])+($res['M10']*$r1['NRV'])+($res['M11']*$r2['NRV'])+($res['M12']*$r3['NRV']))).'",';
$csv_output .= "\n";
}
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
$y1m=date("y",strtotime($ry['FromDate'])); $y2m=date("y",strtotime($ry['ToDate']));
$fy1=date("Y",strtotime($ry['FromDate'])); $ty1=date("Y",strtotime($ry['ToDate']));

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

$csv_output .= '"APR-'.$y1m.'",';
$csv_output .= '"APR-'.$y1m.'_Val",';	
$csv_output .= '"MAY-'.$y1m.'",';
$csv_output .= '"MAY-'.$y1m.'_Val",';
$csv_output .= '"JUN-'.$y1m.'",';
$csv_output .= '"JUN-'.$y1m.'_Val",';
$csv_output .= '"Q1",';
$csv_output .= '"Q1_Value",';
$csv_output .= '"JUL-'.$y1m.'",';
$csv_output .= '"JUL-'.$y1m.'_Val",';	
$csv_output .= '"AUG-'.$y1m.'",';
$csv_output .= '"AUG-'.$y1m.'_Val",';
$csv_output .= '"SEP-'.$y1m.'",';
$csv_output .= '"SEP-'.$y1m.'_Val",';
$csv_output .= '"Q2",';
$csv_output .= '"Q2_Value",';
$csv_output .= '"OCT-'.$y1m.'",';
$csv_output .= '"OCT-'.$y1m.'_Val",';
$csv_output .= '"NOV-'.$y1m.'",';
$csv_output .= '"NOV-'.$y1m.'_Val",';
$csv_output .= '"DEC-'.$y1m.'",';
$csv_output .= '"DEC-'.$y1m.'_Val",';
$csv_output .= '"Q3",';
$csv_output .= '"Q3_Value",';
$csv_output .= '"JAN-'.$y2m.'",';
$csv_output .= '"JAN-'.$y2m.'_VAL",';
$csv_output .= '"FEB-'.$y2m.'",';
$csv_output .= '"FEB-'.$y2m.'_VAL",';
$csv_output .= '"MAR-'.$y2m.'",';
$csv_output .= '"MAR-'.$y2m.'_VAL",';
$csv_output .= '"Q4",';
$csv_output .= '"Q4_Value",';
$csv_output .= '"TOTAL",';
$csv_output .= '"TOTAL_Value",';
$csv_output .= "\n";
	
$sql = mysql_query("select hrm_sales_sal_details.ProductId,DealerId,M1_Ach,M2_Ach,M3_Ach,M4_Ach,M5_Ach,M6_Ach,M7_Ach,M8_Ach,M9_Ach,M10_Ach,M11_Ach,M12_Ach,ProductName,ItemName,ItemCode from hrm_sales_sal_details INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details.ProductId=hrm_sales_seedsproduct.ProductId INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId where YearId=".$_REQUEST['y']." AND (M1_Ach!=0 OR M2_Ach!=0 OR M3_Ach!=0 OR M4_Ach!=0 OR M5_Ach!=0 OR M6_Ach!=0 OR M7_Ach!=0 OR M8_Ach!=0 OR M9_Ach!=0 OR M10_Ach!=0 OR M11_Ach!=0 OR M12_Ach!=0) order by hrm_sales_seedsitem.ItemName ASC,hrm_sales_seedsproduct.ProductName ASC", $con); $Sn=1; while($res=mysql_fetch_array($sql)){ 
	  
$sP=mysql_query("select TypeId from hrm_sales_seedsproduct where ProductId=".$res['ProductId'], $con); $rP=mysql_fetch_assoc($sP);
if($rP['TypeId']>0){$sT=mysql_query("select TypeName from hrm_sales_seedtype where TypeId=".$rP['TypeId'], $con); $rT=mysql_fetch_assoc($sT);}
if($res['DealerId']>0){$sD=mysql_query("select DealerName,DealerCity,HqId from hrm_sales_dealer where DealerId=".$res['DealerId'], $con); $rD=mysql_fetch_assoc($sD);}
if($rD['HqId']>0)
{ $sH=mysql_query("select HqName,StateId from hrm_headquater where HqId=".$rD['HqId'], $con); $rH=mysql_fetch_assoc($sH);
  $sEId=mysql_query("select EmployeeID from hrm_sales_hq_temp where HqId=".$rD['HqId']." AND HqTEmpStatus='A'", $con); $rEId=mysql_fetch_assoc($sEId);
  if($rEId['EmployeeID']>0){ $sEmp=mysql_query("select Fname,Sname,Lname from hrm_employee where EmployeeID=".$rEId['EmployeeID'], $con); $rEmp=mysql_fetch_assoc($sEmp);
  $rEmpName=$rEmp['Fname'].' '.$rEmp['Sname'].' '.$rEmp['Lname']; } else {$rEmpName='';}
}
if($rH['StateId']>0){$sS=mysql_query("select StateName,ZoneId,CountryId from hrm_state where StateId=".$rH['StateId'], $con); $rS=mysql_fetch_assoc($sS);}
if($rS['ZoneId']>0){$sZ=mysql_query("select ZoneName from hrm_sales_zone where ZoneId=".$rS['ZoneId'], $con); $rZ=mysql_fetch_assoc($sZ);}
if($rS['CountryId']>0){$sC=mysql_query("select CountryName from hrm_country where CountryId=".$rS['CountryId'], $con); $rC=mysql_fetch_assoc($sC);}
    
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
$sNr=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND PStatus='A'", $con);

$csv_output .= '"'.str_replace('"', '""', floatval($res['M1_Ach'])).'",';
$s4=mysql_query("select NRV from hrm_sales_product_nrv where Fdate=(select max(Fdate) as Fdate from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate<='".$fy1."-04-01') AND ProductId=".$res['ProductId'],$con); 
$row4=mysql_num_rows($s4); if($row4>0){ $r4=mysql_fetch_assoc($s4);}else{ $r4=mysql_fetch_assoc($sNr);}
$csv_output .= '"'.str_replace('"', '""', $res['M1_Ach']*$r4['NRV']).'",';


$csv_output .= '"'.str_replace('"', '""', floatval($res['M2_Ach'])).'",';
$s5=mysql_query("select NRV from hrm_sales_product_nrv where Fdate=(select max(Fdate) as Fdate from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate<='".$fy1."-05-01') AND ProductId=".$res['ProductId'],$con);
$row5=mysql_num_rows($s5); if($row5>0){ $r5=mysql_fetch_assoc($s5);}else{ $r5=mysql_fetch_assoc($sNr); }
$csv_output .= '"'.str_replace('"', '""', $res['M2_Ach']*$r5['NRV']).'",';

$csv_output .= '"'.str_replace('"', '""', floatval($res['M3_Ach'])).'",';
$s6=mysql_query("select NRV from hrm_sales_product_nrv where Fdate=(select max(Fdate) as Fdate from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate<='".$fy1."-06-01') AND ProductId=".$res['ProductId'],$con);
$row6=mysql_num_rows($s6); if($row6>0){ $r6=mysql_fetch_assoc($s6);}else{ $r6=mysql_fetch_assoc($sNr); }
$csv_output .= '"'.str_replace('"', '""', $res['M3_Ach']*$r6['NRV']).'",';

//Q1 Q1 Q1
$csv_output .= '"'.str_replace('"', '""', floatval($res['M1_Ach']+$res['M2_Ach']+$res['M3_Ach'])).'",';
$csv_output .= '"'.str_replace('"', '""', floatval(($res['M1_Ach']*$r4['NRV'])+($res['M2_Ach']*$r5['NRV'])+($res['M3_Ach']*$r6['NRV']))).'",';

$csv_output .= '"'.str_replace('"', '""', floatval($res['M4_Ach'])).'",';
$s7=mysql_query("select NRV from hrm_sales_product_nrv where Fdate=(select max(Fdate) as Fdate from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate<='".$fy1."-07-01') AND ProductId=".$res['ProductId'],$con);
$row7=mysql_num_rows($s7); if($row7>0){ $r7=mysql_fetch_assoc($s7);}else{ $r7=mysql_fetch_assoc($sNr); }
$csv_output .= '"'.str_replace('"', '""', $res['M4_Ach']*$r7['NRV']).'",';

$csv_output .= '"'.str_replace('"', '""', floatval($res['M5_Ach'])).'",';
$s8=mysql_query("select NRV from hrm_sales_product_nrv where Fdate=(select max(Fdate) as Fdate from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate<='".$fy1."-08-01') AND ProductId=".$res['ProductId'],$con);
$row8=mysql_num_rows($s8); if($row8>0){ $r8=mysql_fetch_assoc($s8);}else{ $r8=mysql_fetch_assoc($sNr); }
$csv_output .= '"'.str_replace('"', '""', $res['M5_Ach']*$r8['NRV']).'",';

$csv_output .= '"'.str_replace('"', '""', floatval($res['M6_Ach'])).'",';
$s9=mysql_query("select NRV from hrm_sales_product_nrv where Fdate=(select max(Fdate) as Fdate from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate<='".$fy1."-09-01') AND ProductId=".$res['ProductId'],$con);
$row9=mysql_num_rows($s9); if($row9>0){ $r9=mysql_fetch_assoc($s9);}else{ $r9=mysql_fetch_assoc($sNr); }
$csv_output .= '"'.str_replace('"', '""', $res['M6_Ach']*$r9['NRV']).'",';

//Q2 Q2 Q2
$csv_output .= '"'.str_replace('"', '""', floatval($res['M4_Ach']+$res['M5_Ach']+$res['M6_Ach'])).'",';
$csv_output .= '"'.str_replace('"', '""', floatval(($res['M4_Ach']*$r7['NRV'])+($res['M5_Ach']*$r8['NRV'])+($res['M6_Ach']*$r9['NRV']))).'",';

$csv_output .= '"'.str_replace('"', '""', floatval($res['M7_Ach'])).'",';
$s10=mysql_query("select NRV from hrm_sales_product_nrv where Fdate=(select max(Fdate) as Fdate from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate<='".$fy1."-10-01') AND ProductId=".$res['ProductId'],$con);
$row10=mysql_num_rows($s10); if($row10>0){ $r10=mysql_fetch_assoc($s10);}else{ $r10=mysql_fetch_assoc($sNr); }
$csv_output .= '"'.str_replace('"', '""', $res['M7_Ach']*$r10['NRV']).'",';

$csv_output .= '"'.str_replace('"', '""', floatval($res['M8_Ach'])).'",';
$s11=mysql_query("select NRV from hrm_sales_product_nrv where Fdate=(select max(Fdate) as Fdate from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate<='".$fy1."-11-01') AND ProductId=".$res['ProductId'],$con);
$row11=mysql_num_rows($s11); if($row11>0){ $r11=mysql_fetch_assoc($s11);}else{ $r11=mysql_fetch_assoc($sNr); }
$csv_output .= '"'.str_replace('"', '""', $res['M8_Ach']*$r11['NRV']).'",';

$csv_output .= '"'.str_replace('"', '""', floatval($res['M9_Ach'])).'",';
$s12=mysql_query("select NRV from hrm_sales_product_nrv where Fdate=(select max(Fdate) as Fdate from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate<='".$fy1."-12-01') AND ProductId=".$res['ProductId'],$con);
$row12=mysql_num_rows($s12); if($row12>0){ $r12=mysql_fetch_assoc($s12);}else{ $r12=mysql_fetch_assoc($sNr); }
$csv_output .= '"'.str_replace('"', '""', $res['M9_Ach']*$r12['NRV']).'",';

//Q3 Q3 Q3
$csv_output .= '"'.str_replace('"', '""', floatval($res['M7_Ach']+$res['M8_Ach']+$res['M9_Ach'])).'",';
$csv_output .= '"'.str_replace('"', '""', floatval(($res['M7_Ach']*$r10['NRV'])+($res['M8_Ach']*$r11['NRV'])+($res['M9_Ach']*$r12['NRV']))).'",';

$csv_output .= '"'.str_replace('"', '""', floatval($res['M10_Ach'])).'",';
$s1=mysql_query("select NRV from hrm_sales_product_nrv where Fdate=(select max(Fdate) as Fdate from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate<='".$ty1."-01-01') AND ProductId=".$res['ProductId'],$con);
$row1=mysql_num_rows($s1); if($row1>0){ $r1=mysql_fetch_assoc($s1);}else{ $r1=mysql_fetch_assoc($sNr); }
$csv_output .= '"'.str_replace('"', '""', $res['M10_Ach']*$r1['NRV']).'",';

$csv_output .= '"'.str_replace('"', '""', floatval($res['M11_Ach'])).'",';
$s2=mysql_query("select NRV from hrm_sales_product_nrv where Fdate=(select max(Fdate) as Fdate from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate<='".$ty1."-02-01') AND ProductId=".$res['ProductId'],$con);
$row2=mysql_num_rows($s2); if($row2>0){ $r2=mysql_fetch_assoc($s2);}else{ $r2=mysql_fetch_assoc($sNr); }
$csv_output .= '"'.str_replace('"', '""', $res['M11_Ach']*$r2['NRV']).'",';

$csv_output .= '"'.str_replace('"', '""', floatval($res['M12_Ach'])).'",';
$s3=mysql_query("select NRV from hrm_sales_product_nrv where Fdate=(select max(Fdate) as Fdate from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate<='".$ty1."-03-01') AND ProductId=".$res['ProductId'],$con);
$row3=mysql_num_rows($s3); if($row3>0){ $r3=mysql_fetch_assoc($s3);}else{ $r3=mysql_fetch_assoc($sNr); }
$csv_output .= '"'.str_replace('"', '""', $res['M12_Ach']*$r3['NRV']).'",';

//Q4 Q4 Q4
$csv_output .= '"'.str_replace('"', '""', floatval($res['M10_Ach']+$res['M11_Ach']+$res['M12_Ach'])).'",';
$csv_output .= '"'.str_replace('"', '""', floatval(($res['M10_Ach']*$r1['NRV'])+($res['M11_Ach']*$r2['NRV'])+($res['M12_Ach']*$r3['NRV']))).'",';

//Total Total Total
$csv_output .= '"'.str_replace('"', '""', floatval($res['M1_Ach']+$res['M2_Ach']+$res['M3_Ach']+$res['M4_Ach']+$res['M5_Ach']+$res['M6_Ach']+$res['M7_Ach']+$res['M8_Ach']+$res['M9_Ach']+$res['M10_Ach']+$res['M11_Ach']+$res['M12_Ach'])).'",';
$csv_output .= '"'.str_replace('"', '""', floatval(($res['M1_Ach']*$r4['NRV'])+($res['M2_Ach']*$r5['NRV'])+($res['M3_Ach']*$r6['NRV'])+($res['M4_Ach']*$r7['NRV'])+($res['M5_Ach']*$r8['NRV'])+($res['M6_Ach']*$r9['NRV'])+($res['M7_Ach']*$r10['NRV'])+($res['M8_Ach']*$r11['NRV'])+($res['M9_Ach']*$r12['NRV'])+($res['M10_Ach']*$r1['NRV'])+($res['M11_Ach']*$r2['NRV'])+($res['M12_Ach']*$r3['NRV']))).'",';
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