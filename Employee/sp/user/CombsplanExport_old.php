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

$csv_output .= '"HQ VC",';
$csv_output .= '"TERRITORY VC",';
$csv_output .= '"ZONE VC",';
$csv_output .= '"STATE VC",';	

$csv_output .= '"HQ FC",';
$csv_output .= '"TERRITORY FC",';
$csv_output .= '"ZONE FC",';
$csv_output .= '"STATE FC",';
	
//$csv_output .= '"COUNTRY",';

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
	
$sql = mysql_query("select sd.ProductId,DealerId,M1,M2,M3,M4,M5,M6,M7,M8,M9,M10,M11,M12,ProductName,ItemName,ItemCode from hrm_sales_sal_details_".$_REQUEST['y']." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId INNER JOIN hrm_sales_seedsitem si ON sp.ItemId=si.ItemId where sd.YearId=".$_REQUEST['y']." AND (M1!=0 OR M2!=0 OR M3!=0 OR M4!=0 OR M5!=0 OR M6!=0 OR M7!=0 OR M8!=0 OR M9!=0 OR M10!=0 OR M11!=0 OR M12!=0) order by si.ItemName ASC,sp.ProductName ASC", $con); $Sn=1; while($res=mysql_fetch_array($sql)){ 
$sP=mysql_query("select TypeId from hrm_sales_seedsproduct where ProductId=".$res['ProductId'], $con); $rP=mysql_fetch_assoc($sP);
if($rP['TypeId']>0){$sT=mysql_query("select TypeName from hrm_sales_seedtype where TypeId=".$rP['TypeId'], $con); $rT=mysql_fetch_assoc($sT);}

if($res['DealerId']>0){$sD=mysql_query("select DealerName,DealerCity,Hq_vc,Hq_fc,Terr_vc,Terr_fc from hrm_sales_dealer where DealerId=".$res['DealerId'], $con); $rD=mysql_fetch_assoc($sD);}

if($rD['Hq_vc']>0){ $sHv=mysql_query("select HqName,StateName,ZoneName from hrm_headquater hq inner join hrm_state s on hq.StateId=s.StateId inner join hrm_sales_zone z on s.ZoneId=z.ZoneId where hq.HqId=".$rD['Hq_vc'],$con); 
$rHv=mysql_fetch_assoc($sHv); $Hqv=$rHv['HqName']; $Stv=$rHv['StateName']; $Znv=$rHv['ZoneName']; }
else{ $Hqv='';; $Stv=''; $Znv=''; }

if($rD['Terr_vc']>0)
{ 
 $sEmpv=mysql_query("select Fname,Sname,Lname,RepEmployeeID from hrm_employee e inner join hrm_employee_general g on e.EmployeeID=g.EmployeeID where e.EmployeeID=".$rD['Terr_vc'],$con); 
 $rEmpv=mysql_fetch_assoc($sEmpv); $rEv=$rEmpv['Fname'].' '.$rEmpv['Sname'].' '.$rEmpv['Lname'];   
}
else {$rEv=''; }


if($rD['Hq_fc']>0){ $sHf=mysql_query("select HqName,StateName,ZoneName from hrm_headquater hq inner join hrm_state s on hq.StateId=s.StateId inner join hrm_sales_zone z on s.ZoneId=z.ZoneId where hq.HqId=".$rD['Hq_fc'],$con); 
$rHf=mysql_fetch_assoc($sHf); $Hqf=$rHf['HqName']; $Stf=$rHf['StateName']; $Znf=$rHf['ZoneName']; }
else{ $Hqf='';; $Stf=''; $Znf=''; }

if($rD['Terr_fc']>0)
{ 
 $sEmpf=mysql_query("select Fname,Sname,Lname,RepEmployeeID from hrm_employee e inner join hrm_employee_general g on e.EmployeeID=g.EmployeeID where e.EmployeeID=".$rD['Terr_fc'],$con); 
 $rEmpf=mysql_fetch_assoc($sEmpf); $rEf=$rEmpf['Fname'].' '.$rEmpf['Sname'].' '.$rEmpf['Lname']; 
}
else {$rEf=''; }
    
if($rD['DealerName']!=''){
$csv_output .= '"'.str_replace('"', '""', $Sn).'",';
$csv_output .= '"'.str_replace('"', '""', $res['ItemName']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['ProductName']).'",';
$csv_output .= '"'.str_replace('"', '""', substr_replace($rT['TypeName'],'',2)).'",';
$csv_output .= '"'.str_replace('"', '""', $rD['DealerName']).'",';
$csv_output .= '"'.str_replace('"', '""', $rD['DealerCity']).'",';

$csv_output .= '"'.str_replace('"', '""', $Hqv).'",';
$csv_output .= '"'.str_replace('"', '""', $rEv).'",';
$csv_output .= '"'.str_replace('"', '""', $Znv).'",';
$csv_output .= '"'.str_replace('"', '""', $Stv).'",';

$csv_output .= '"'.str_replace('"', '""', $Hqf).'",';
$csv_output .= '"'.str_replace('"', '""', $rEf).'",';
$csv_output .= '"'.str_replace('"', '""', $Znf).'",';
$csv_output .= '"'.str_replace('"', '""', $Stf).'",';
//$csv_output .= '"'.str_replace('"', '""', strtoupper($rC['CountryName'])).'",';

include("Nrv1.php");

$csv_output .= '"'.str_replace('"', '""', floatval($res['M1'])).'",';
$csv_output .= '"'.str_replace('"', '""', $res['M1']*$r4['NRV']).'",';

$csv_output .= '"'.str_replace('"', '""', floatval($res['M2'])).'",';
$csv_output .= '"'.str_replace('"', '""', $res['M2']*$r5['NRV']).'",';

$csv_output .= '"'.str_replace('"', '""', floatval($res['M3'])).'",';
$csv_output .= '"'.str_replace('"', '""', $res['M3']*$r6['NRV']).'",';

$csv_output .= '"'.str_replace('"', '""', floatval($res['M1']+$res['M2']+$res['M3'])).'",';
$csv_output .= '"'.str_replace('"', '""', floatval(($res['M1']*$r4['NRV'])+($res['M2']*$r5['NRV'])+($res['M3']*$r6['NRV']))).'",';

$csv_output .= '"'.str_replace('"', '""', floatval($res['M4'])).'",';
$csv_output .= '"'.str_replace('"', '""', $res['M4']*$r7['NRV']).'",';

$csv_output .= '"'.str_replace('"', '""', floatval($res['M5'])).'",';
$csv_output .= '"'.str_replace('"', '""', $res['M5']*$r8['NRV']).'",';

$csv_output .= '"'.str_replace('"', '""', floatval($res['M6'])).'",';
$csv_output .= '"'.str_replace('"', '""', $res['M6']*$r9['NRV']).'",';

$csv_output .= '"'.str_replace('"', '""', floatval($res['M4']+$res['M5']+$res['M6'])).'",';
$csv_output .= '"'.str_replace('"', '""', floatval(($res['M4']*$r7['NRV'])+($res['M5']*$r8['NRV'])+($res['M6']*$r9['NRV']))).'",';

$csv_output .= '"'.str_replace('"', '""', floatval($res['M7'])).'",';
$csv_output .= '"'.str_replace('"', '""', $res['M7']*$r10['NRV']).'",';

$csv_output .= '"'.str_replace('"', '""', floatval($res['M8'])).'",';
$csv_output .= '"'.str_replace('"', '""', $res['M8']*$r11['NRV']).'",';

$csv_output .= '"'.str_replace('"', '""', floatval($res['M9'])).'",';
$csv_output .= '"'.str_replace('"', '""', $res['M9']*$r12['NRV']).'",';

$csv_output .= '"'.str_replace('"', '""', floatval($res['M7']+$res['M8']+$res['M9'])).'",';
$csv_output .= '"'.str_replace('"', '""', floatval(($res['M7']*$r10['NRV'])+($res['M8']*$r11['NRV'])+($res['M9']*$r12['NRV']))).'",';

$csv_output .= '"'.str_replace('"', '""', floatval($res['M10'])).'",';
$csv_output .= '"'.str_replace('"', '""', $res['M10']*$r1['NRV']).'",';

$csv_output .= '"'.str_replace('"', '""', floatval($res['M11'])).'",';
$csv_output .= '"'.str_replace('"', '""', $res['M11']*$r2['NRV']).'",';

$csv_output .= '"'.str_replace('"', '""', floatval($res['M12'])).'",';
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

$csv_output .= '"HQ VC",';
$csv_output .= '"TERRITORY VC",';
$csv_output .= '"ZONE VC",';
$csv_output .= '"STATE VC",';	

$csv_output .= '"HQ FC",';
$csv_output .= '"TERRITORY FC",';
$csv_output .= '"ZONE FC",';
$csv_output .= '"STATE FC",';	
//$csv_output .= '"COUNTRY",';

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
	
$sql = mysql_query("select sd.ProductId,DealerId,M1_Ach,M2_Ach,M3_Ach,M4_Ach,M5_Ach,M6_Ach,M7_Ach,M8_Ach,M9_Ach,M10_Ach,M11_Ach,M12_Ach,ProductName,ItemName,ItemCode from hrm_sales_sal_details_".$_REQUEST['y']." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId INNER JOIN hrm_sales_seedsitem si ON sp.ItemId=si.ItemId where sd.YearId=".$_REQUEST['y']." AND (M1_Ach!=0 OR M2_Ach!=0 OR M3_Ach!=0 OR M4_Ach!=0 OR M5_Ach!=0 OR M6_Ach!=0 OR M7_Ach!=0 OR M8_Ach!=0 OR M9_Ach!=0 OR M10_Ach!=0 OR M11_Ach!=0 OR M12_Ach!=0) order by si.ItemName ASC,sp.ProductName ASC", $con); 

//limit 0,4999  limit 5000,4999  limit 10000,4999  limit 15000,4999
//limit 20000,4999    limit 25000,4999
$Sn=1; 
while($res=mysql_fetch_array($sql)){ 
	  
$sP=mysql_query("select TypeId from hrm_sales_seedsproduct where ProductId=".$res['ProductId'], $con); $rP=mysql_fetch_assoc($sP);
if($rP['TypeId']>0){$sT=mysql_query("select TypeName from hrm_sales_seedtype where TypeId=".$rP['TypeId'], $con); $rT=mysql_fetch_assoc($sT);}
if($res['DealerId']>0){$sD=mysql_query("select DealerName,DealerCity,Hq_vc,Hq_fc,Terr_vc,Terr_fc from hrm_sales_dealer where DealerId=".$res['DealerId'], $con); $rD=mysql_fetch_assoc($sD);}


if($rD['Hq_vc']>0){ $sHv=mysql_query("select HqName,StateName,ZoneName from hrm_headquater hq inner join hrm_state s on hq.StateId=s.StateId inner join hrm_sales_zone z on s.ZoneId=z.ZoneId where hq.HqId=".$rD['Hq_vc'],$con); 
$rHv=mysql_fetch_assoc($sHv); $Hqv=$rHv['HqName']; $Stv=$rHv['StateName']; $Znv=$rHv['ZoneName']; }
else{ $Hqv='';; $Stv=''; $Znv=''; }

if($rD['Terr_vc']>0)
{ 
 $sEmpv=mysql_query("select Fname,Sname,Lname,RepEmployeeID from hrm_employee e inner join hrm_employee_general g on e.EmployeeID=g.EmployeeID where e.EmployeeID=".$rD['Terr_vc'],$con); 
 $rEmpv=mysql_fetch_assoc($sEmpv); $rEv=$rEmpv['Fname'].' '.$rEmpv['Sname'].' '.$rEmpv['Lname'];   
}
else {$rEv='';}


if($rD['Hq_fc']>0){ $sHf=mysql_query("select HqName,StateName,ZoneName from hrm_headquater hq inner join hrm_state s on hq.StateId=s.StateId inner join hrm_sales_zone z on s.ZoneId=z.ZoneId where hq.HqId=".$rD['Hq_fc'],$con); 
$rHf=mysql_fetch_assoc($sHf); $Hqf=$rHf['HqName']; $Stf=$rHf['StateName']; $Znf=$rHf['ZoneName']; }
else{ $Hqf='';; $Stf=''; $Znf=''; }

if($rD['Terr_fc']>0)
{ 
 $sEmpf=mysql_query("select Fname,Sname,Lname,RepEmployeeID from hrm_employee e inner join hrm_employee_general g on e.EmployeeID=g.EmployeeID where e.EmployeeID=".$rD['Terr_fc'],$con); 
 $rEmpf=mysql_fetch_assoc($sEmpf); $rEf=$rEmpf['Fname'].' '.$rEmpf['Sname'].' '.$rEmpf['Lname']; 
  
}
else {$rEf=''; }
    
$csv_output .= '"'.str_replace('"', '""', $Sn).'",';
$csv_output .= '"'.str_replace('"', '""', $res['ItemName']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['ProductName']).'",';
$csv_output .= '"'.str_replace('"', '""', substr_replace($rT['TypeName'],'',2)).'",';
$csv_output .= '"'.str_replace('"', '""', $rD['DealerName']).'",';
$csv_output .= '"'.str_replace('"', '""', $rD['DealerCity']).'",';

$csv_output .= '"'.str_replace('"', '""', $Hqv).'",';
$csv_output .= '"'.str_replace('"', '""', $rEv).'",';
$csv_output .= '"'.str_replace('"', '""', $Znv).'",';
$csv_output .= '"'.str_replace('"', '""', $Stv).'",';

$csv_output .= '"'.str_replace('"', '""', $Hqf).'",';
$csv_output .= '"'.str_replace('"', '""', $rEf).'",';
$csv_output .= '"'.str_replace('"', '""', $Znf).'",';
$csv_output .= '"'.str_replace('"', '""', $Stf).'",';

//$csv_output .= '"'.str_replace('"', '""', $rH['HqName']).'",';
//$csv_output .= '"'.str_replace('"', '""', $rEmpName).'",';
//$csv_output .= '"'.str_replace('"', '""', $rZ['ZoneName']).'",';
//$csv_output .= '"'.str_replace('"', '""', $rS['StateName']).'",';
//$csv_output .= '"'.str_replace('"', '""', strtoupper($rC['CountryName'])).'",';

include("Nrv1.php");

$csv_output .= '"'.str_replace('"', '""', floatval($res['M1_Ach'])).'",'; 
$csv_output .= '"'.str_replace('"', '""', $res['M1_Ach']*$r4['NRV']).'",';


$csv_output .= '"'.str_replace('"', '""', floatval($res['M2_Ach'])).'",';
$csv_output .= '"'.str_replace('"', '""', $res['M2_Ach']*$r5['NRV']).'",';

$csv_output .= '"'.str_replace('"', '""', floatval($res['M3_Ach'])).'",';
$csv_output .= '"'.str_replace('"', '""', $res['M3_Ach']*$r6['NRV']).'",';

//Q1 Q1 Q1
$csv_output .= '"'.str_replace('"', '""', floatval($res['M1_Ach']+$res['M2_Ach']+$res['M3_Ach'])).'",';
$csv_output .= '"'.str_replace('"', '""', floatval(($res['M1_Ach']*$r4['NRV'])+($res['M2_Ach']*$r5['NRV'])+($res['M3_Ach']*$r6['NRV']))).'",';

$csv_output .= '"'.str_replace('"', '""', floatval($res['M4_Ach'])).'",';
$csv_output .= '"'.str_replace('"', '""', $res['M4_Ach']*$r7['NRV']).'",';

$csv_output .= '"'.str_replace('"', '""', floatval($res['M5_Ach'])).'",';
$csv_output .= '"'.str_replace('"', '""', $res['M5_Ach']*$r8['NRV']).'",';

$csv_output .= '"'.str_replace('"', '""', floatval($res['M6_Ach'])).'",';
$csv_output .= '"'.str_replace('"', '""', $res['M6_Ach']*$r9['NRV']).'",';

//Q2 Q2 Q2
$csv_output .= '"'.str_replace('"', '""', floatval($res['M4_Ach']+$res['M5_Ach']+$res['M6_Ach'])).'",';
$csv_output .= '"'.str_replace('"', '""', floatval(($res['M4_Ach']*$r7['NRV'])+($res['M5_Ach']*$r8['NRV'])+($res['M6_Ach']*$r9['NRV']))).'",';

$csv_output .= '"'.str_replace('"', '""', floatval($res['M7_Ach'])).'",';
$csv_output .= '"'.str_replace('"', '""', $res['M7_Ach']*$r10['NRV']).'",';

$csv_output .= '"'.str_replace('"', '""', floatval($res['M8_Ach'])).'",';
$csv_output .= '"'.str_replace('"', '""', $res['M8_Ach']*$r11['NRV']).'",';

$csv_output .= '"'.str_replace('"', '""', floatval($res['M9_Ach'])).'",';
$csv_output .= '"'.str_replace('"', '""', $res['M9_Ach']*$r12['NRV']).'",';

//Q3 Q3 Q3
$csv_output .= '"'.str_replace('"', '""', floatval($res['M7_Ach']+$res['M8_Ach']+$res['M9_Ach'])).'",';
$csv_output .= '"'.str_replace('"', '""', floatval(($res['M7_Ach']*$r10['NRV'])+($res['M8_Ach']*$r11['NRV'])+($res['M9_Ach']*$r12['NRV']))).'",';

$csv_output .= '"'.str_replace('"', '""', floatval($res['M10_Ach'])).'",';
$csv_output .= '"'.str_replace('"', '""', $res['M10_Ach']*$r1['NRV']).'",';

$csv_output .= '"'.str_replace('"', '""', floatval($res['M11_Ach'])).'",';
$csv_output .= '"'.str_replace('"', '""', $res['M11_Ach']*$r2['NRV']).'",';

$csv_output .= '"'.str_replace('"', '""', floatval($res['M12_Ach'])).'",';
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


elseif($_REQUEST['action']=='SalTgtProjPlanRExport') 
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
	
$sql = mysql_query("select sd.ProductId,DealerId,M1_Proj,M2_Proj,M3_Proj,M4_Proj,M5_Proj,M6_Proj,M7_Proj,M8_Proj,M9_Proj,M10_Proj,M11_Proj,M12_Proj,ProductName,ItemName,ItemCode from hrm_sales_sal_details_".$_REQUEST['y']." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId INNER JOIN hrm_sales_seedsitem si ON sp.ItemId=si.ItemId where sd.YearId=".$_REQUEST['y']." AND (M1_Proj!=0 OR M2_Proj!=0 OR M3_Proj!=0 OR M4_Proj!=0 OR M5_Proj!=0 OR M6_Proj!=0 OR M7_Proj!=0 OR M8_Proj!=0 OR M9_Proj!=0 OR M10_Proj!=0 OR M11_Proj!=0 OR M12_Proj!=0) order by si.ItemName ASC,sp.ProductName ASC", $con); $Sn=1; while($res=mysql_fetch_array($sql)){ 
	  
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

include("Nrv1.php");

$csv_output .= '"'.str_replace('"', '""', floatval($res['M1_Proj'])).'",'; 
$csv_output .= '"'.str_replace('"', '""', $res['M1_Proj']*$r4['NRV']).'",';


$csv_output .= '"'.str_replace('"', '""', floatval($res['M2_Proj'])).'",';
$csv_output .= '"'.str_replace('"', '""', $res['M2_Proj']*$r5['NRV']).'",';

$csv_output .= '"'.str_replace('"', '""', floatval($res['M3_Proj'])).'",';
$csv_output .= '"'.str_replace('"', '""', $res['M3_Proj']*$r6['NRV']).'",';

//Q1 Q1 Q1
$csv_output .= '"'.str_replace('"', '""', floatval($res['M1_Proj']+$res['M2_Proj']+$res['M3_Proj'])).'",';
$csv_output .= '"'.str_replace('"', '""', floatval(($res['M1_Proj']*$r4['NRV'])+($res['M2_Proj']*$r5['NRV'])+($res['M3_Proj']*$r6['NRV']))).'",';

$csv_output .= '"'.str_replace('"', '""', floatval($res['M4_Proj'])).'",';
$csv_output .= '"'.str_replace('"', '""', $res['M4_Proj']*$r7['NRV']).'",';

$csv_output .= '"'.str_replace('"', '""', floatval($res['M5_Proj'])).'",';
$csv_output .= '"'.str_replace('"', '""', $res['M5_Proj']*$r8['NRV']).'",';

$csv_output .= '"'.str_replace('"', '""', floatval($res['M6_Proj'])).'",';
$csv_output .= '"'.str_replace('"', '""', $res['M6_Proj']*$r9['NRV']).'",';

//Q2 Q2 Q2
$csv_output .= '"'.str_replace('"', '""', floatval($res['M4_Proj']+$res['M5_Proj']+$res['M6_Proj'])).'",';
$csv_output .= '"'.str_replace('"', '""', floatval(($res['M4_Proj']*$r7['NRV'])+($res['M5_Proj']*$r8['NRV'])+($res['M6_Proj']*$r9['NRV']))).'",';

$csv_output .= '"'.str_replace('"', '""', floatval($res['M7_Proj'])).'",';
$csv_output .= '"'.str_replace('"', '""', $res['M7_Proj']*$r10['NRV']).'",';

$csv_output .= '"'.str_replace('"', '""', floatval($res['M8_Proj'])).'",';
$csv_output .= '"'.str_replace('"', '""', $res['M8_Proj']*$r11['NRV']).'",';

$csv_output .= '"'.str_replace('"', '""', floatval($res['M9_Proj'])).'",';
$csv_output .= '"'.str_replace('"', '""', $res['M9_Proj']*$r12['NRV']).'",';

//Q3 Q3 Q3
$csv_output .= '"'.str_replace('"', '""', floatval($res['M7_Proj']+$res['M8_Proj']+$res['M9_Proj'])).'",';
$csv_output .= '"'.str_replace('"', '""', floatval(($res['M7_Proj']*$r10['NRV'])+($res['M8_Proj']*$r11['NRV'])+($res['M9_Proj']*$r12['NRV']))).'",';

$csv_output .= '"'.str_replace('"', '""', floatval($res['M10_Proj'])).'",';
$csv_output .= '"'.str_replace('"', '""', $res['M10_Proj']*$r1['NRV']).'",';

$csv_output .= '"'.str_replace('"', '""', floatval($res['M11_Proj'])).'",';
$csv_output .= '"'.str_replace('"', '""', $res['M11_Proj']*$r2['NRV']).'",';

$csv_output .= '"'.str_replace('"', '""', floatval($res['M12_Proj'])).'",';
$csv_output .= '"'.str_replace('"', '""', $res['M12_Proj']*$r3['NRV']).'",';

//Q4 Q4 Q4
$csv_output .= '"'.str_replace('"', '""', floatval($res['M10_Proj']+$res['M11_Proj']+$res['M12_Proj'])).'",';
$csv_output .= '"'.str_replace('"', '""', floatval(($res['M10_Proj']*$r1['NRV'])+($res['M11_Proj']*$r2['NRV'])+($res['M12_Proj']*$r3['NRV']))).'",';

//Total Total Total
$csv_output .= '"'.str_replace('"', '""', floatval($res['M1_Proj']+$res['M2_Proj']+$res['M3_Proj']+$res['M4_Proj']+$res['M5_Proj']+$res['M6_Proj']+$res['M7_Proj']+$res['M8_Proj']+$res['M9_Proj']+$res['M10_Proj']+$res['M11_Proj']+$res['M12_Proj'])).'",';
$csv_output .= '"'.str_replace('"', '""', floatval(($res['M1_Proj']*$r4['NRV'])+($res['M2_Proj']*$r5['NRV'])+($res['M3_Proj']*$r6['NRV'])+($res['M4_Proj']*$r7['NRV'])+($res['M5_Proj']*$r8['NRV'])+($res['M6_Proj']*$r9['NRV'])+($res['M7_Proj']*$r10['NRV'])+($res['M8_Proj']*$r11['NRV'])+($res['M9_Proj']*$r12['NRV'])+($res['M10_Proj']*$r1['NRV'])+($res['M11_Proj']*$r2['NRV'])+($res['M12_Proj']*$r3['NRV']))).'",';
$csv_output .= "\n";
$Sn++; }

# Close the MySql connection
mysql_close($con);
# Set the headers so the file downloads
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Content-Length: " . strlen($csv_output));
header("Content-type: text/x-csv");
header("Content-Disposition: attachment; filename=Projection_".$PRD.".csv");
echo $csv_output;
exit;
}


?>