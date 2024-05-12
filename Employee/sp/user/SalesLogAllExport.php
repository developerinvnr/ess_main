<?php require_once('config/config.php');

if($_REQUEST['action']=='SalTgtPlanRExport') 
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
$csv_output .= '"Apr-'.$y1m.'_tgt",';
$csv_output .= '"Apr-'.$y1m.'_sal",';
$csv_output .= '"Apr-'.$y1m.'_tgt_val",';
$csv_output .= '"Apr-'.$y1m.'_sal_val",';
	
$csv_output .= '"May-'.$y1m.'_tgt",';
$csv_output .= '"May-'.$y1m.'_sal",';
$csv_output .= '"May-'.$y1m.'_tgt_val",';
$csv_output .= '"May-'.$y1m.'_sal_val",';

$csv_output .= '"Jun-'.$y1m.'_tgt",';
$csv_output .= '"Jun-'.$y1m.'_sal",';
$csv_output .= '"Jun-'.$y1m.'_tgt_val",';
$csv_output .= '"Jun-'.$y1m.'_sal_val",';

$csv_output .= '"Q1_tgt",';
$csv_output .= '"Q1_sal",';
$csv_output .= '"Q1_tgt_val",';
$csv_output .= '"Q1_sal_val",';

$csv_output .= '"Jul-'.$y1m.'_tgt",';
$csv_output .= '"Jul-'.$y1m.'_sal",';
$csv_output .= '"Jul-'.$y1m.'_tgt_val",';
$csv_output .= '"Jul-'.$y1m.'_sal_val",';
	
$csv_output .= '"Aug-'.$y1m.'_tgt",';
$csv_output .= '"Aug-'.$y1m.'_sal",';
$csv_output .= '"Aug-'.$y1m.'_tgt_Val",';
$csv_output .= '"Aug-'.$y1m.'_sal_Val",';

$csv_output .= '"Sep-'.$y1m.'_tgt",';
$csv_output .= '"Sep-'.$y1m.'_sal",';
$csv_output .= '"Sep-'.$y1m.'_tgt_val",';
$csv_output .= '"Sep-'.$y1m.'_sal_val",';

$csv_output .= '"Q2_tgt",';
$csv_output .= '"Q2_sal",';
$csv_output .= '"Q2_tgt_val",';
$csv_output .= '"Q2_sal_val",';

$csv_output .= '"Oct-'.$y1m.'_tgt",';
$csv_output .= '"Oct-'.$y1m.'_sal",';
$csv_output .= '"Oct-'.$y1m.'_tgt_val",';
$csv_output .= '"Oct-'.$y1m.'_sal_val",';

$csv_output .= '"Nov-'.$y1m.'_tgt",';
$csv_output .= '"Nov-'.$y1m.'_sal",';
$csv_output .= '"Nov-'.$y1m.'_tgt_val",';
$csv_output .= '"Nov-'.$y1m.'_sal_val",';

$csv_output .= '"Dec-'.$y1m.'_tgt",';
$csv_output .= '"Dec-'.$y1m.'_Sal",';
$csv_output .= '"Dec-'.$y1m.'_tgt_val",';
$csv_output .= '"Dec-'.$y1m.'_Sal_val",';

$csv_output .= '"Q3_tgt",';
$csv_output .= '"Q3_sal",';
$csv_output .= '"Q3_tgt_val",';
$csv_output .= '"Q3_sal_val",';

$csv_output .= '"Jan-'.$y2m.'_tgt",';
$csv_output .= '"Jan-'.$y2m.'_sal",';
$csv_output .= '"Jan-'.$y2m.'_tgt_val",';
$csv_output .= '"Jan-'.$y2m.'_sal_val",';

$csv_output .= '"Feb-'.$y2m.'_tgt",';
$csv_output .= '"Feb-'.$y2m.'_sal",';
$csv_output .= '"Feb-'.$y2m.'_tgt_val",';
$csv_output .= '"Feb-'.$y2m.'_sal_val",';

$csv_output .= '"Mar-'.$y2m.'_tgt",';
$csv_output .= '"Mar-'.$y2m.'_sal",';
$csv_output .= '"Mar-'.$y2m.'_tgt_val",';
$csv_output .= '"Mar-'.$y2m.'_sal_val",';

$csv_output .= '"Q4_tgt",';
$csv_output .= '"Q4_sal",';
$csv_output .= '"Q4_tgt_val",';
$csv_output .= '"Q4_sal_val",';

$csv_output .= '"TOT_tgt",';
$csv_output .= '"TOT_sal",';
$csv_output .= '"TOT_tgt_val",';
$csv_output .= '"TOT_sal_val",';
$csv_output .= "\n";
				
$sql=mysql_query("select dt.*,ProductName,ItemName,ItemCode,DealerName,DealerCity,de.HqId,TypeId from hrm_sales_sal_details_".$_REQUEST['y']." dt INNER JOIN hrm_sales_dealer de ON dt.DealerId=de.DealerId INNER JOIN hrm_headquater hq ON de.HqId=hq.HqId INNER JOIN hrm_sales_ebillstate ebt ON hq.StateId = ebt.StateId INNER JOIN hrm_sales_seedsproduct sp ON dt.ProductId=sp.ProductId INNER JOIN hrm_sales_seedsitem si ON sp.ItemId=si.ItemId where dt.YearId=".$_REQUEST['y']." AND (M1!=0 OR M2!=0 OR M3!=0 OR M4!=0 OR M5!=0 OR M6!=0 OR M7!=0 OR M8!=0 OR M9!=0 OR M10!=0 OR M11!=0 OR M12!=0 OR M1_Ach!=0 OR M2_Ach!=0 OR M3_Ach!=0 OR M4_Ach!=0 OR M5_Ach!=0 OR M6_Ach!=0 OR M7_Ach!=0 OR M8_Ach!=0 OR M9_Ach!=0 OR M10_Ach!=0 OR M11_Ach!=0 OR M12_Ach!=0) AND (ebt.EmployeeID=".$_REQUEST['e']." OR ebt.EmployeeID2=".$_REQUEST['e']." OR ebt.EmployeeID3=".$_REQUEST['e']." OR ebt.EmployeeID4=".$_REQUEST['e'].") order by si.ItemName ASC,sp.ProductName ASC", $con); 
$Sn=1; while($res=mysql_fetch_array($sql)){ 
	  
if($res['TypeId']>0){ $sT=mysql_query("select TypeName from hrm_sales_seedtype where TypeId=".$res['TypeId'], $con); 
$rT=mysql_fetch_assoc($sT); }
if($res['HqId']>0)
{ $sH=mysql_query("select HqName,StateId from hrm_headquater where HqId=".$res['HqId'], $con);
$sEId=mysql_query("select EmployeeID from hrm_sales_hq_temp where HqId=".$res['HqId']." AND HqTEmpStatus='A'", $con); 
$rH=mysql_fetch_assoc($sH); $rEId=mysql_fetch_assoc($sEId);
 if($rEId['EmployeeID']>0){ $sEmp=mysql_query("select Fname,Sname,Lname from hrm_employee where EmployeeID=".$rEId['EmployeeID'], $con); $rEmp=mysql_fetch_assoc($sEmp); $rEmpName=$rEmp['Fname'].' '.$rEmp['Sname'].' '.$rEmp['Lname']; } 
 else {$rEmpName=' ';}
}
if($rH['StateId']>0){$sS=mysql_query("select StateName,ZoneId,CountryId from hrm_state where StateId=".$rH['StateId'], $con);$rS=mysql_fetch_assoc($sS);}
if($rS['ZoneId']>0){$sZ=mysql_query("select ZoneName from hrm_sales_zone where ZoneId=".$rS['ZoneId'], $con); 
$rZ=mysql_fetch_assoc($sZ);}
if($rS['CountryId']>0){$sC=mysql_query("select CountryName from hrm_country where CountryId=".$rS['CountryId'], $con); 
$rC=mysql_fetch_assoc($sC);}
    
$csv_output .= '"'.str_replace('"', '""', $Sn).'",';
$csv_output .= '"'.str_replace('"', '""', $res['ItemName']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['ProductName']).'",';
$csv_output .= '"'.str_replace('"', '""', substr_replace($rT['TypeName'],'',2)).'",';
$csv_output .= '"'.str_replace('"', '""', $res['DealerName']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['DealerCity']).'",';
$csv_output .= '"'.str_replace('"', '""', $rH['HqName']).'",';
$csv_output .= '"'.str_replace('"', '""', $rEmpName).'",';
$csv_output .= '"'.str_replace('"', '""', $rZ['ZoneName']).'",';
$csv_output .= '"'.str_replace('"', '""', $rS['StateName']).'",';
$csv_output .= '"'.str_replace('"', '""', strtoupper($rC['CountryName'])).'",';

include("Nrv1.php");

$csv_output .= '"'.str_replace('"', '""', floatval($res['M1'])).'",';
$csv_output .= '"'.str_replace('"', '""', floatval($res['M1_Ach'])).'",';
$csv_output .= '"'.str_replace('"', '""', $res['M1']*$r4['NRV']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['M1_Ach']*$r4['NRV']).'",';


$csv_output .= '"'.str_replace('"', '""', floatval($res['M2'])).'",';
$csv_output .= '"'.str_replace('"', '""', floatval($res['M2_Ach'])).'",';
$csv_output .= '"'.str_replace('"', '""', $res['M2']*$r5['NRV']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['M2_Ach']*$r5['NRV']).'",';

$csv_output .= '"'.str_replace('"', '""', floatval($res['M3'])).'",';
$csv_output .= '"'.str_replace('"', '""', floatval($res['M3_Ach'])).'",';
$csv_output .= '"'.str_replace('"', '""', $res['M3']*$r6['NRV']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['M3_Ach']*$r6['NRV']).'",';

//Q1 Q1 Q1
$csv_output .= '"'.str_replace('"', '""', floatval($res['M1']+$res['M2']+$res['M3'])).'",';
$csv_output .= '"'.str_replace('"', '""', floatval($res['M1_Ach']+$res['M2_Ach']+$res['M3_Ach'])).'",';
$csv_output .= '"'.str_replace('"', '""', floatval(($res['M1']*$r4['NRV'])+($res['M2']*$r5['NRV'])+($res['M3']*$r6['NRV']))).'",';
$csv_output .= '"'.str_replace('"', '""', floatval(($res['M1_Ach']*$r4['NRV'])+($res['M2_Ach']*$r5['NRV'])+($res['M3_Ach']*$r6['NRV']))).'",';

$csv_output .= '"'.str_replace('"', '""', floatval($res['M4'])).'",';
$csv_output .= '"'.str_replace('"', '""', floatval($res['M4_Ach'])).'",';
$csv_output .= '"'.str_replace('"', '""', $res['M4']*$r7['NRV']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['M4_Ach']*$r7['NRV']).'",';

$csv_output .= '"'.str_replace('"', '""', floatval($res['M5'])).'",';
$csv_output .= '"'.str_replace('"', '""', floatval($res['M5_Ach'])).'",';
$csv_output .= '"'.str_replace('"', '""', $res['M5']*$r8['NRV']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['M5_Ach']*$r8['NRV']).'",';

$csv_output .= '"'.str_replace('"', '""', floatval($res['M6'])).'",';
$csv_output .= '"'.str_replace('"', '""', floatval($res['M6_Ach'])).'",';
$csv_output .= '"'.str_replace('"', '""', $res['M6']*$r9['NRV']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['M6_Ach']*$r9['NRV']).'",';

//Q2 Q2 Q2
$csv_output .= '"'.str_replace('"', '""', floatval($res['M4']+$res['M5']+$res['M6'])).'",';
$csv_output .= '"'.str_replace('"', '""', floatval($res['M4_Ach']+$res['M5_Ach']+$res['M6_Ach'])).'",';
$csv_output .= '"'.str_replace('"', '""', floatval(($res['M4']*$r7['NRV'])+($res['M5']*$r8['NRV'])+($res['M6']*$r9['NRV']))).'",';
$csv_output .= '"'.str_replace('"', '""', floatval(($res['M4_Ach']*$r7['NRV'])+($res['M5_Ach']*$r8['NRV'])+($res['M6_Ach']*$r9['NRV']))).'",';

$csv_output .= '"'.str_replace('"', '""', floatval($res['M7'])).'",';
$csv_output .= '"'.str_replace('"', '""', floatval($res['M7_Ach'])).'",';
$csv_output .= '"'.str_replace('"', '""', $res['M7']*$r10['NRV']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['M7_Ach']*$r10['NRV']).'",';

$csv_output .= '"'.str_replace('"', '""', floatval($res['M8'])).'",';
$csv_output .= '"'.str_replace('"', '""', floatval($res['M8_Ach'])).'",';
$csv_output .= '"'.str_replace('"', '""', $res['M8']*$r11['NRV']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['M8_Ach']*$r11['NRV']).'",';

$csv_output .= '"'.str_replace('"', '""', floatval($res['M9'])).'",';
$csv_output .= '"'.str_replace('"', '""', floatval($res['M9_Ach'])).'",';
$csv_output .= '"'.str_replace('"', '""', $res['M9']*$r12['NRV']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['M9_Ach']*$r12['NRV']).'",';

//Q3 Q3 Q3
$csv_output .= '"'.str_replace('"', '""', floatval($res['M7']+$res['M8']+$res['M9'])).'",';
$csv_output .= '"'.str_replace('"', '""', floatval($res['M7_Ach']+$res['M8_Ach']+$res['M9_Ach'])).'",';
$csv_output .= '"'.str_replace('"', '""', floatval(($res['M7']*$r10['NRV'])+($res['M8']*$r11['NRV'])+($res['M9']*$r12['NRV']))).'",';
$csv_output .= '"'.str_replace('"', '""', floatval(($res['M7_Ach']*$r10['NRV'])+($res['M8_Ach']*$r11['NRV'])+($res['M9_Ach']*$r12['NRV']))).'",';

$csv_output .= '"'.str_replace('"', '""', floatval($res['M10'])).'",';
$csv_output .= '"'.str_replace('"', '""', floatval($res['M10_Ach'])).'",';
$csv_output .= '"'.str_replace('"', '""', $res['M10']*$r1['NRV']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['M10_Ach']*$r1['NRV']).'",';

$csv_output .= '"'.str_replace('"', '""', floatval($res['M11'])).'",';
$csv_output .= '"'.str_replace('"', '""', floatval($res['M11_Ach'])).'",';
$csv_output .= '"'.str_replace('"', '""', $res['M11']*$r2['NRV']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['M11_Ach']*$r2['NRV']).'",';

$csv_output .= '"'.str_replace('"', '""', floatval($res['M12'])).'",';
$csv_output .= '"'.str_replace('"', '""', floatval($res['M12_Ach'])).'",';
$csv_output .= '"'.str_replace('"', '""', $res['M12']*$r3['NRV']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['M12_Ach']*$r3['NRV']).'",';

//Q4 Q4 Q4
$csv_output .= '"'.str_replace('"', '""', floatval($res['M10']+$res['M11']+$res['M12'])).'",';
$csv_output .= '"'.str_replace('"', '""', floatval($res['M10_Ach']+$res['M11_Ach']+$res['M12_Ach'])).'",';
$csv_output .= '"'.str_replace('"', '""', floatval(($res['M10']*$r1['NRV'])+($res['M11']*$r2['NRV'])+($res['M12']*$r3['NRV']))).'",';
$csv_output .= '"'.str_replace('"', '""', floatval(($res['M10_Ach']*$r1['NRV'])+($res['M11_Ach']*$r2['NRV'])+($res['M12_Ach']*$r3['NRV']))).'",';

//Total Total Total
$csv_output .= '"'.str_replace('"', '""', floatval($res['M1']+$res['M2']+$res['M3']+$res['M4']+$res['M5']+$res['M6']+$res['M7']+$res['M8']+$res['M9']+$res['M10']+$res['M11']+$res['M12'])).'",';
$csv_output .= '"'.str_replace('"', '""', floatval($res['M1_Ach']+$res['M2_Ach']+$res['M3_Ach']+$res['M4_Ach']+$res['M5_Ach']+$res['M6_Ach']+$res['M7_Ach']+$res['M8_Ach']+$res['M9_Ach']+$res['M10_Ach']+$res['M11_Ach']+$res['M12_Ach'])).'",';
$csv_output .= '"'.str_replace('"', '""', floatval(($res['M1']*$r4['NRV'])+($res['M2']*$r5['NRV'])+($res['M3']*$r6['NRV'])+($res['M4']*$r7['NRV'])+($res['M5']*$r8['NRV'])+($res['M6']*$r9['NRV'])+($res['M7']*$r10['NRV'])+($res['M8']*$r11['NRV'])+($res['M9']*$r12['NRV'])+($res['M10']*$r1['NRV'])+($res['M11']*$r2['NRV'])+($res['M12']*$r3['NRV']))).'",';
$csv_output .= '"'.str_replace('"', '""', floatval(($res['M1_Ach']*$r4['NRV'])+($res['M2_Ach']*$r5['NRV'])+($res['M3_Ach']*$r6['NRV'])+($res['M4_Ach']*$r7['NRV'])+($res['M5_Ach']*$r8['NRV'])+($res['M6_Ach']*$r9['NRV'])+($res['M7_Ach']*$r10['NRV'])+($res['M8_Ach']*$r11['NRV'])+($res['M9_Ach']*$r12['NRV'])+($res['M10_Ach']*$r1['NRV'])+($res['M11_Ach']*$r2['NRV'])+($res['M12_Ach']*$r3['NRV']))).'",';
$csv_output .= "\n"; 
$Sn++; }

# Close the MySql connection
mysql_close($con);
# Set the headers so the file downloads
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Content-Length: " . strlen($csv_output));
header("Content-type: text/x-csv");
header("Content-Disposition: attachment; filename=Target_Sale_".$PRD.".csv");
echo $csv_output;
exit;

}

?>