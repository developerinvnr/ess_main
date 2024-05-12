<?php require_once('../user/config/config.php');
$SpGrd=mysql_query("select GradeId from hrm_employee_general where EmployeeID=".$_REQUEST['ei'], $con); $resSpGrd=mysql_fetch_assoc($SpGrd); $EGrd=$resSpGrd['GradeId'];

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

if($EGrd==76 OR $EGrd==77){
$csv_output .= '"REPORTING_1",';
$csv_output .= '"REPORTING_2",';
$csv_output .= '"REPORTING_3",';
$csv_output .= '"ZONE",';
$csv_output .= '"STATE",';	
$csv_output .= '"COUNTRY",';
} elseif($EGrd==72 OR $EGrd==73 OR $EGrd==74 OR $EGrd==75){
$csv_output .= '"REPORTING_1",';
$csv_output .= '"REPORTING_2",';
$csv_output .= '"ZONE",';
$csv_output .= '"STATE",';
} elseif($EGrd==68 OR $EGrd==69 OR $EGrd==70 OR $EGrd==71){
$csv_output .= '"REPORTING_1",';
$csv_output .= '"ZONE",';
$csv_output .= '"STATE",';
} elseif($EGrd==61 OR $EGrd==62 OR $EGrd==63 OR $EGrd==64 OR $EGrd==65 OR $EGrd==66 OR $EGrd==67){ 
$csv_output .= '"STATE",';
}

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
	
$sql = mysql_query("select hrm_sales_sal_details_".$_REQUEST['y'].".ProductId,hrm_sales_sal_details_".$_REQUEST['y'].".DealerId,M1,M2,M3,M4,M5,M6,M7,M8,M9,M10,M11,M12,ProductName,ItemName,ItemCode from hrm_sales_sal_details_".$_REQUEST['y']." INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details_".$_REQUEST['y'].".ProductId=hrm_sales_seedsproduct.ProductId INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId INNER JOIN hrm_sales_dealer ON hrm_sales_sal_details_".$_REQUEST['y'].".DealerId=hrm_sales_dealer.DealerId INNER JOIN hrm_sales_hq_temp ON hrm_sales_dealer.HqId=hrm_sales_hq_temp.HqId INNER JOIN hrm_sales_reporting_level ON hrm_sales_hq_temp.EmployeeID=hrm_sales_reporting_level.EmployeeID where HqTEmpStatus='A' AND (hrm_sales_hq_temp.EmployeeID=".$_REQUEST['ei']." OR hrm_sales_reporting_level.R1=".$_REQUEST['ei']." OR hrm_sales_reporting_level.R2=".$_REQUEST['ei']." OR hrm_sales_reporting_level.R3=".$_REQUEST['ei']." OR hrm_sales_reporting_level.R4=".$_REQUEST['ei']." OR hrm_sales_reporting_level.R5=".$_REQUEST['ei'].") AND hrm_sales_sal_details_".$_REQUEST['y'].".YearId=".$_REQUEST['y']." AND (M1!=0 OR M2!=0 OR M3!=0 OR M4!=0 OR M5!=0 OR M6!=0 OR M7!=0 OR M8!=0 OR M9!=0 OR M10!=0 OR M11!=0 OR M12!=0) order by hrm_sales_seedsitem.ItemName ASC,hrm_sales_seedsproduct.ProductName ASC", $con); $Sn=1; while($res=mysql_fetch_array($sql)){ 

	  
$sP=mysql_query("select TypeId from hrm_sales_seedsproduct where ProductId=".$res['ProductId'], $con); $rP=mysql_fetch_assoc($sP);

if($rP['TypeId']>0){$sT=mysql_query("select TypeName from hrm_sales_seedtype where TypeId=".$rP['TypeId'], $con); $rT=mysql_fetch_assoc($sT);}
if($res['DealerId']>0){$sD=mysql_query("select DealerName,DealerCity,HqId from hrm_sales_dealer where DealerId=".$res['DealerId'], $con); $rD=mysql_fetch_assoc($sD);}
if($rD['HqId']>0)
{ $sH=mysql_query("select HqName,StateId from hrm_headquater where HqId=".$rD['HqId'], $con); $rH=mysql_fetch_assoc($sH);
  $sEId=mysql_query("select EmployeeID from hrm_sales_hq_temp where HqId=".$rD['HqId']." AND HqTEmpStatus='A'", $con); $rEId=mysql_fetch_assoc($sEId);
  if($rEId['EmployeeID']>0){ $sEmp=mysql_query("select Fname,Sname,Lname from hrm_employee where EmployeeID=".$rEId['EmployeeID'], $con); $rEmp=mysql_fetch_assoc($sEmp);
  $rEmpName=$rEmp['Fname'].' '.$rEmp['Sname'].' '.$rEmp['Lname']; } else {$rEmpName=' ';}
}

if($rEId['EmployeeID']>0)
{
  $s2EId=mysql_query("select RepEmployeeID from hrm_employee_general where EmployeeID=".$rEId['EmployeeID'], $con); $r2EId=mysql_fetch_assoc($s2EId);
  if($r2EId['RepEmployeeID']>0 AND $r2EId['RepEmployeeID']!=224)
  { $s2Emp=mysql_query("select Fname,Sname,Lname from hrm_employee where EmployeeID=".$r2EId['RepEmployeeID'], $con); $r2Emp=mysql_fetch_assoc($s2Emp);
  $r2EmpName=$r2Emp['Fname'].' '.$r2Emp['Sname'].' '.$r2Emp['Lname']; } else {$r2EmpName=' ';}
}
if($r2EId['RepEmployeeID']>0)
{
  $s3EId=mysql_query("select RepEmployeeID from hrm_employee_general where EmployeeID=".$r2EId['RepEmployeeID'], $con); $r3EId=mysql_fetch_assoc($s3EId);
  if($r3EId['RepEmployeeID']>0 AND $r3EId['RepEmployeeID']!=224)
  { $s3Emp=mysql_query("select Fname,Sname,Lname from hrm_employee where EmployeeID=".$r3EId['RepEmployeeID'], $con); $r3Emp=mysql_fetch_assoc($s3Emp);
  $r3EmpName=$r3Emp['Fname'].' '.$r3Emp['Sname'].' '.$r3Emp['Lname']; } else {$r3EmpName=' ';}
}
if($r3EId['RepEmployeeID']>0)
{
  $s4EId=mysql_query("select RepEmployeeID from hrm_employee_general where EmployeeID=".$r3EId['RepEmployeeID'], $con); $r4EId=mysql_fetch_assoc($s4EId);
  if($r4EId['RepEmployeeID']>0 AND $r4EId['RepEmployeeID']!=224)
  { $s4Emp=mysql_query("select Fname,Sname,Lname from hrm_employee where EmployeeID=".$r4EId['RepEmployeeID'], $con); $r4Emp=mysql_fetch_assoc($s4Emp);
  $r4EmpName=$r4Emp['Fname'].' '.$r4Emp['Sname'].' '.$r4Emp['Lname']; } else {$r4EmpName=' ';}
}

if($rH['StateId']>0){$sS=mysql_query("select StateName,ZoneId,CountryId from hrm_state where StateId=".$rH['StateId'], $con); $rS=mysql_fetch_assoc($sS);}
if($rS['ZoneId']>0){$sZ=mysql_query("select ZoneName from hrm_sales_zone where ZoneId=".$rS['ZoneId'], $con); $rZ=mysql_fetch_assoc($sZ);}
if($rS['CountryId']>0){$sC=mysql_query("select CountryName from hrm_country where CountryId=".$rS['CountryId'], $con); $rC=mysql_fetch_assoc($sC);}
	
// NRV NRV Check Open Open
$fy1=date("Y",strtotime($ry['FromDate'])); $ty1=date("Y",strtotime($ry['ToDate']));
//$sNr=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND PStatus='A'", $con);
    
$csv_output .= '"'.str_replace('"', '""', $Sn).'",';
$csv_output .= '"'.str_replace('"', '""', $res['ItemName']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['ProductName']).'",';
$csv_output .= '"'.str_replace('"', '""', substr_replace($rT['TypeName'],'',2)).'",';
$csv_output .= '"'.str_replace('"', '""', $rD['DealerName']).'",';
$csv_output .= '"'.str_replace('"', '""', $rD['DealerCity']).'",';
$csv_output .= '"'.str_replace('"', '""', $rH['HqName']).'",';
$csv_output .= '"'.str_replace('"', '""', $rEmpName).'",';

if($EGrd==76 OR $EGrd==77){
$csv_output .= '"'.str_replace('"', '""', $r2EmpName).'",';
$csv_output .= '"'.str_replace('"', '""', $r3EmpName).'",';
$csv_output .= '"'.str_replace('"', '""', $r4EmpName).'",';
$csv_output .= '"'.str_replace('"', '""', $rZ['ZoneName']).'",';
$csv_output .= '"'.str_replace('"', '""', $rS['StateName']).'",';
$csv_output .= '"'.str_replace('"', '""', strtoupper($rC['CountryName'])).'",';
} elseif($EGrd==72 OR $EGrd==73 OR $EGrd==74 OR $EGrd==75){
$csv_output .= '"'.str_replace('"', '""', $r2EmpName).'",';
$csv_output .= '"'.str_replace('"', '""', $r3EmpName).'",';
$csv_output .= '"'.str_replace('"', '""', $rZ['ZoneName']).'",';
$csv_output .= '"'.str_replace('"', '""', $rS['StateName']).'",';
} elseif($EGrd==68 OR $EGrd==69 OR $EGrd==70 OR $EGrd==71){
$csv_output .= '"'.str_replace('"', '""', $r2EmpName).'",';
$csv_output .= '"'.str_replace('"', '""', $rZ['ZoneName']).'",';
$csv_output .= '"'.str_replace('"', '""', $rS['StateName']).'",';
} elseif($EGrd==61 OR $EGrd==62 OR $EGrd==63 OR $EGrd==64 OR $EGrd==65 OR $EGrd==66 OR $EGrd==67){ 
$csv_output .= '"'.str_replace('"', '""', $rS['StateName']).'",';
}

include("Nrv1_tgt.php");
//include("Nrv1.php");

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
$Sn++; }

$sqlChk=mysql_query("select * from hrm_sales_tlemp tle INNER JOIN hrm_sales_reporting_level rl ON tle.TLRepId=rl.EmployeeID where tle.TLStatus='A' AND (tle.TLRepId=".$_REQUEST['ei']." OR rl.R1=".$_REQUEST['ei']." OR rl.R2=".$_REQUEST['ei']." OR rl.R3=".$_REQUEST['ei']." OR rl.R4=".$_REQUEST['ei']." OR rl.R5=".$_REQUEST['ei'].")",$con);
$rowchk=mysql_num_rows($sqlChk);
if($rowchk>0){
/**********222******************//**********222******************//**********222******************/
$sql = mysql_query("select sd.ProductId,sd.DealerId,M1,M2,M3,M4,M5,M6,M7,M8,M9,M10,M11,M12,ProductName,ItemName,ItemCode,TLName,TLRepId from hrm_sales_sal_details_".$_REQUEST['y']." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId INNER JOIN hrm_sales_seedsitem si ON sp.ItemId=si.ItemId INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_sales_tlemp tle ON d.HqId=tle.TLHq INNER JOIN hrm_sales_reporting_level rl ON tle.TLRepId=rl.EmployeeID where tle.TLStatus='A' AND (tle.TLRepId=".$_REQUEST['ei']." OR rl.R1=".$_REQUEST['ei']." OR rl.R2=".$_REQUEST['ei']." OR rl.R3=".$_REQUEST['ei']." OR rl.R4=".$_REQUEST['ei']." OR rl.R5=".$_REQUEST['ei'].") AND sd.YearId=".$_REQUEST['y']." AND (M1!=0 OR M2!=0 OR M3!=0 OR M4!=0 OR M5!=0 OR M6!=0 OR M7!=0 OR M8!=0 OR M9!=0 OR M10!=0 OR M11!=0 OR M12!=0) order by si.ItemName ASC,sp.ProductName ASC", $con); $Sn1=$Sn; while($res=mysql_fetch_array($sql)){ 

	  
$sP=mysql_query("select TypeId from hrm_sales_seedsproduct where ProductId=".$res['ProductId'], $con); $rP=mysql_fetch_assoc($sP);

if($rP['TypeId']>0){$sT=mysql_query("select TypeName from hrm_sales_seedtype where TypeId=".$rP['TypeId'], $con); $rT=mysql_fetch_assoc($sT);}
if($res['DealerId']>0){$sD=mysql_query("select DealerName,DealerCity,HqId from hrm_sales_dealer where DealerId=".$res['DealerId'], $con); $rD=mysql_fetch_assoc($sD);}
if($rD['HqId']>0)
{ $sH=mysql_query("select HqName,StateId from hrm_headquater where HqId=".$rD['HqId'], $con); $rH=mysql_fetch_assoc($sH);
  $sEId=mysql_query("select EmployeeID from hrm_sales_hq_temp where HqId=".$rD['HqId']." AND HqTEmpStatus='A'", $con); $rEId=mysql_fetch_assoc($sEId);
  if($rEId['EmployeeID']>0){ $sEmp=mysql_query("select Fname,Sname,Lname from hrm_employee where EmployeeID=".$rEId['EmployeeID'], $con); $rEmp=mysql_fetch_assoc($sEmp);
  $rEmpName=$rEmp['Fname'].' '.$rEmp['Sname'].' '.$rEmp['Lname']; } else {$rEmpName=' ';}
}

if($res['TLName']!='')
{
  //$s2EId=mysql_query("select RepEmployeeID from hrm_employee_general where EmployeeID=".$rEId['EmployeeID'], $con); $r2EId=mysql_fetch_assoc($s2EId);
  if($res['TLRepId']>0 AND $res['TLRepId']!=224)
  { $s2Emp=mysql_query("select Fname,Sname,Lname from hrm_employee where EmployeeID=".$res['TLRepId'], $con); $r2Emp=mysql_fetch_assoc($s2Emp);
  $r2EmpName=$r2Emp['Fname'].' '.$r2Emp['Sname'].' '.$r2Emp['Lname']; } else {$r2EmpName=' ';}
}
if($res['TLRepId']>0)
{
  $s3EId=mysql_query("select RepEmployeeID from hrm_employee_general where EmployeeID=".$res['TLRepId'], $con); $r3EId=mysql_fetch_assoc($s3EId);
  if($r3EId['RepEmployeeID']>0 AND $r3EId['RepEmployeeID']!=224)
  { $s3Emp=mysql_query("select Fname,Sname,Lname from hrm_employee where EmployeeID=".$r3EId['RepEmployeeID'], $con); $r3Emp=mysql_fetch_assoc($s3Emp);
  $r3EmpName=$r3Emp['Fname'].' '.$r3Emp['Sname'].' '.$r3Emp['Lname']; } else {$r3EmpName=' ';}
}
if($r3EId['RepEmployeeID']>0)
{
  $s4EId=mysql_query("select RepEmployeeID from hrm_employee_general where EmployeeID=".$r3EId['RepEmployeeID'], $con); $r4EId=mysql_fetch_assoc($s4EId);
  if($r4EId['RepEmployeeID']>0 AND $r4EId['RepEmployeeID']!=224)
  { $s4Emp=mysql_query("select Fname,Sname,Lname from hrm_employee where EmployeeID=".$r4EId['RepEmployeeID'], $con); $r4Emp=mysql_fetch_assoc($s4Emp);
  $r4EmpName=$r4Emp['Fname'].' '.$r4Emp['Sname'].' '.$r4Emp['Lname']; } else {$r4EmpName=' ';}
}

if($rH['StateId']>0){$sS=mysql_query("select StateName,ZoneId,CountryId from hrm_state where StateId=".$rH['StateId'], $con); $rS=mysql_fetch_assoc($sS);}
if($rS['ZoneId']>0){$sZ=mysql_query("select ZoneName from hrm_sales_zone where ZoneId=".$rS['ZoneId'], $con); $rZ=mysql_fetch_assoc($sZ);}
if($rS['CountryId']>0){$sC=mysql_query("select CountryName from hrm_country where CountryId=".$rS['CountryId'], $con); $rC=mysql_fetch_assoc($sC);}
	
// NRV NRV Check Open Open
$fy1=date("Y",strtotime($ry['FromDate'])); $ty1=date("Y",strtotime($ry['ToDate']));
//$sNr=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND PStatus='A'", $con);
    
$csv_output .= '"'.str_replace('"', '""', $Sn1).'",';
$csv_output .= '"'.str_replace('"', '""', $res['ItemName']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['ProductName']).'",';
$csv_output .= '"'.str_replace('"', '""', substr_replace($rT['TypeName'],'',2)).'",';
$csv_output .= '"'.str_replace('"', '""', $rD['DealerName']).'",';
$csv_output .= '"'.str_replace('"', '""', $rD['DealerCity']).'",';
$csv_output .= '"'.str_replace('"', '""', $rH['HqName']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['TLName']).'",';

if($EGrd==76 OR $EGrd==77){
$csv_output .= '"'.str_replace('"', '""', $r2EmpName).'",';
$csv_output .= '"'.str_replace('"', '""', $r3EmpName).'",';
$csv_output .= '"'.str_replace('"', '""', $r4EmpName).'",';
$csv_output .= '"'.str_replace('"', '""', $rZ['ZoneName']).'",';
$csv_output .= '"'.str_replace('"', '""', $rS['StateName']).'",';
$csv_output .= '"'.str_replace('"', '""', strtoupper($rC['CountryName'])).'",';
} elseif($EGrd==72 OR $EGrd==73 OR $EGrd==74 OR $EGrd==75){
$csv_output .= '"'.str_replace('"', '""', $r2EmpName).'",';
$csv_output .= '"'.str_replace('"', '""', $r3EmpName).'",';
$csv_output .= '"'.str_replace('"', '""', $rZ['ZoneName']).'",';
$csv_output .= '"'.str_replace('"', '""', $rS['StateName']).'",';
} elseif($EGrd==68 OR $EGrd==69 OR $EGrd==70 OR $EGrd==71){
$csv_output .= '"'.str_replace('"', '""', $r2EmpName).'",';
$csv_output .= '"'.str_replace('"', '""', $rZ['ZoneName']).'",';
$csv_output .= '"'.str_replace('"', '""', $rS['StateName']).'",';
} elseif($EGrd==61 OR $EGrd==62 OR $EGrd==63 OR $EGrd==64 OR $EGrd==65 OR $EGrd==66 OR $EGrd==67){ 
$csv_output .= '"'.str_replace('"', '""', $rS['StateName']).'",';
}

include("Nrv1_tgt.php");
//include("Nrv1.php");

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
$Sn1++; }
/**********222 CLose **************//**********222 CLose**************//**********222 CLose ******************/
}

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
	
$sql = mysql_query("select hrm_sales_sal_details_".$_REQUEST['y'].".ProductId,hrm_sales_sal_details_".$_REQUEST['y'].".DealerId,M1_Ach,M2_Ach,M3_Ach,M4_Ach,M5_Ach,M6_Ach,M7_Ach,M8_Ach,M9_Ach,M10_Ach,M11_Ach,M12_Ach,ProductName,ItemName,ItemCode from hrm_sales_sal_details_".$_REQUEST['y']." INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details_".$_REQUEST['y'].".ProductId=hrm_sales_seedsproduct.ProductId INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId INNER JOIN hrm_sales_dealer ON hrm_sales_sal_details_".$_REQUEST['y'].".DealerId=hrm_sales_dealer.DealerId INNER JOIN hrm_sales_hq_temp ON hrm_sales_dealer.HqId=hrm_sales_hq_temp.HqId INNER JOIN hrm_sales_reporting_level ON hrm_sales_hq_temp.EmployeeID=hrm_sales_reporting_level.EmployeeID where HqTEmpStatus='A' AND (hrm_sales_hq_temp.EmployeeID=".$_REQUEST['ei']." OR hrm_sales_reporting_level.R1=".$_REQUEST['ei']." OR hrm_sales_reporting_level.R2=".$_REQUEST['ei']." OR hrm_sales_reporting_level.R3=".$_REQUEST['ei']." OR hrm_sales_reporting_level.R4=".$_REQUEST['ei']." OR hrm_sales_reporting_level.R5=".$_REQUEST['ei'].") AND hrm_sales_sal_details_".$_REQUEST['y'].".YearId=".$_REQUEST['y']." AND (M1_Ach!=0 OR M2_Ach!=0 OR M3_Ach!=0 OR M4_Ach!=0 OR M5_Ach!=0 OR M6_Ach!=0 OR M7_Ach!=0 OR M8_Ach!=0 OR M9_Ach!=0 OR M10_Ach!=0 OR M11_Ach!=0 OR M12_Ach!=0) order by hrm_sales_seedsitem.ItemName ASC,hrm_sales_seedsproduct.ProductName ASC", $con); $Sn=1; while($res=mysql_fetch_array($sql)){ 
	  
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


// NRV NRV Check Open Open
$fy1=date("Y",strtotime($ry['FromDate'])); $ty1=date("Y",strtotime($ry['ToDate']));
//$sNr=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND PStatus='A'", $con);
    
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

$sqlChk=mysql_query("select * from hrm_sales_tlemp tle INNER JOIN hrm_sales_reporting_level rl ON tle.TLRepId=rl.EmployeeID where tle.TLStatus='A' AND (tle.TLRepId=".$_REQUEST['ei']." OR rl.R1=".$_REQUEST['ei']." OR rl.R2=".$_REQUEST['ei']." OR rl.R3=".$_REQUEST['ei']." OR rl.R4=".$_REQUEST['ei']." OR rl.R5=".$_REQUEST['ei'].")",$con);
$rowchk=mysql_num_rows($sqlChk);
if($rowchk>0){
/**********222******************//**********222******************//**********222******************/
$sql = mysql_query("select sd.ProductId,sd.DealerId,M1_Ach,M2_Ach,M3_Ach,M4_Ach,M5_Ach,M6_Ach,M7_Ach,M8_Ach,M9_Ach,M10_Ach,M11_Ach,M12_Ach,ProductName,ItemName,ItemCode,TLName,TLRepId from hrm_sales_sal_details_".$_REQUEST['y']." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId INNER JOIN hrm_sales_seedsitem si ON sp.ItemId=si.ItemId INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_sales_tlemp tle ON d.HqId=tle.TLHq INNER JOIN hrm_sales_reporting_level rl ON tle.TLRepId=rl.EmployeeID where tle.TLStatus='A' AND (tle.TLRepId=".$_REQUEST['ei']." OR rl.R1=".$_REQUEST['ei']." OR rl.R2=".$_REQUEST['ei']." OR rl.R3=".$_REQUEST['ei']." OR rl.R4=".$_REQUEST['ei']." OR rl.R5=".$_REQUEST['ei'].") AND sd.YearId=".$_REQUEST['y']." AND (M1_Ach!=0 OR M2_Ach!=0 OR M3_Ach!=0 OR M4_Ach!=0 OR M5_Ach!=0 OR M6_Ach!=0 OR M7_Ach!=0 OR M8_Ach!=0 OR M9_Ach!=0 OR M10_Ach!=0 OR M11_Ach!=0 OR M12_Ach!=0) order by si.ItemName ASC,sp.ProductName ASC", $con); 
$Sn1=$Sn; while($res=mysql_fetch_array($sql)){ 
	  
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


// NRV NRV Check Open Open
$fy1=date("Y",strtotime($ry['FromDate'])); $ty1=date("Y",strtotime($ry['ToDate']));
//$sNr=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND PStatus='A'", $con);
    
$csv_output .= '"'.str_replace('"', '""', $Sn1).'",';
$csv_output .= '"'.str_replace('"', '""', $res['ItemName']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['ProductName']).'",';
$csv_output .= '"'.str_replace('"', '""', substr_replace($rT['TypeName'],'',2)).'",';
$csv_output .= '"'.str_replace('"', '""', $rD['DealerName']).'",';
$csv_output .= '"'.str_replace('"', '""', $rD['DealerCity']).'",';
$csv_output .= '"'.str_replace('"', '""', $rH['HqName']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['TLName']).'",';
$csv_output .= '"'.str_replace('"', '""', $rZ['ZoneName']).'",';
$csv_output .= '"'.str_replace('"', '""', $rS['StateName']).'",';
$csv_output .= '"'.str_replace('"', '""', strtoupper($rC['CountryName'])).'",';

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
$Sn1++; }
/**********2222 Close ****************//**********2222 Close ****************//**********2222 Close ****************/
}

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



elseif($_REQUEST['action']=='SalCollExport') 
{ 
$sy=mysql_query("select * from hrm_year where YearId=".$_REQUEST['y']."", $con); $ry=mysql_fetch_assoc($sy); 
$FD=date("Y",strtotime($ry['FromDate'])); $TD=date("Y",strtotime($ry['ToDate'])); $PRD=$FD.'-'.$TD;
$y1m=date("y",strtotime($ry['FromDate'])); $y2m=date("y",strtotime($ry['ToDate']));

$csv_output .= '"SN",';
$csv_output .= '"Dealer",'; 
$csv_output .= '"State",';
$csv_output .= '"Hq",';
$csv_output .= '"Territory",';
$csv_output .= '"Apr",';
$csv_output .= '"May",';
$csv_output .= '"Jun",';
$csv_output .= '"Jul",';
$csv_output .= '"Aug",';	
$csv_output .= '"Sep",';
$csv_output .= '"Oct",';
$csv_output .= '"Nov",';
$csv_output .= '"Dec",';	
$csv_output .= '"jan",';
$csv_output .= '"Feb",';
$csv_output .= '"Mar",';
$csv_output .= '"Total",';	
$csv_output .= "\n";

/**/
$csv_output .= '"",';
$csv_output .= '"",'; 
$csv_output .= '"",';
$csv_output .= '"",';
$csv_output .= '"Total:",';

$results = mysql_query("select sum(col_4) as scol_4,sum(col_5) as scol_5,sum(col_6) as scol_6,sum(col_7) as scol_7,sum(col_8) as scol_8,sum(col_9) as scol_9,sum(col_10) as scol_10,sum(col_11) as scol_11,sum(col_12) as scol_12,sum(col_1) as scol_1,sum(col_2) as scol_2,sum(col_3) as scol_3 from hrm_sales_rcp_collection sd inner join hrm_sales_dealer d on sd.DealerId=d.DealerId inner join hrm_sales_hq_temp hqt on d.HqId=hqt.HqId inner join hrm_sales_reporting_level rl on hqt.EmployeeID=rl.EmployeeID where hqt.HqTEmpStatus='A' AND (hqt.EmployeeID=".$_REQUEST['ei']." OR rl.R1=".$_REQUEST['ei']." OR rl.R2=".$_REQUEST['ei']." OR rl.R3=".$_REQUEST['ei']." OR rl.R4=".$_REQUEST['ei']." OR rl.R5=".$_REQUEST['ei'].") AND sd.YearId=".$_REQUEST['y'], $con); $rs=mysql_fetch_array($results);

$csv_output .= '"'.str_replace('"', '""', floatval($rs['scol_4'])).'",';
$csv_output .= '"'.str_replace('"', '""', floatval($rs['scol_5'])).'",';
$csv_output .= '"'.str_replace('"', '""', floatval($rs['scol_6'])).'",';
$csv_output .= '"'.str_replace('"', '""', floatval($rs['scol_7'])).'",';
$csv_output .= '"'.str_replace('"', '""', floatval($rs['scol_8'])).'",';
$csv_output .= '"'.str_replace('"', '""', floatval($rs['scol_9'])).'",';
$csv_output .= '"'.str_replace('"', '""', floatval($rs['scol_10'])).'",';
$csv_output .= '"'.str_replace('"', '""', floatval($rs['scol_11'])).'",';
$csv_output .= '"'.str_replace('"', '""', floatval($rs['scol_12'])).'",';
$csv_output .= '"'.str_replace('"', '""', floatval($rs['scol_1'])).'",';
$csv_output .= '"'.str_replace('"', '""', floatval($rs['scol_2'])).'",';
$csv_output .= '"'.str_replace('"', '""', floatval($rs['scol_3'])).'",';

$Fills=$rs['scol_4']+$rs['scol_5']+$rs['scol_6']+$rs['scol_7']+$rs['scol_8']+$rs['scol_9']+$rs['scol_10']+$rs['scol_11']+$rs['scol_12']+$rs['scol_1']+$rs['scol_2']+$rs['scol_3']; 
$csv_output .= '"'.str_replace('"', '""', $Fills).'",';
$csv_output .= "\n";
/**/

$result = mysql_query("select sd.*,StateName,StateCode,HqName,DealerName,hqt.EmployeeID from hrm_sales_rcp_collection sd inner join hrm_sales_dealer d on sd.DealerId=d.DealerId inner join hrm_headquater hq on d.HqId=hq.HqId inner join hrm_state s on hq.StateId=s.StateId inner join hrm_sales_hq_temp hqt on d.HqId=hqt.HqId inner join hrm_sales_reporting_level rl on hqt.EmployeeID=rl.EmployeeID where hqt.HqTEmpStatus='A' AND (hqt.EmployeeID=".$_REQUEST['ei']." OR rl.R1=".$_REQUEST['ei']." OR rl.R2=".$_REQUEST['ei']." OR rl.R3=".$_REQUEST['ei']." OR rl.R4=".$_REQUEST['ei']." OR rl.R5=".$_REQUEST['ei'].") AND sd.YearId=".$_REQUEST['y']." order by StateName,HqName,DealerName", $con);

$Sn=1; while($r=mysql_fetch_array($result)){  
$sE=mysql_query("select Fname,Sname,Lname from hrm_employee where EmployeeID=".$r['EmployeeID'],$con);
$rE=mysql_fetch_assoc($sE); $rTName=$rE['Fname'].' '.$rE['Sname'].' '.$rE['Lname'];	
    
$csv_output .= '"'.str_replace('"', '""', $Sn).'",';
$csv_output .= '"'.str_replace('"', '""', ucwords(strtoupper($r['DealerName']))).'",';
$csv_output .= '"'.str_replace('"', '""', ucwords(strtoupper($r['StateName']))).'",';
$csv_output .= '"'.str_replace('"', '""', ucwords(strtoupper($r['HqName']))).'",';
$csv_output .= '"'.str_replace('"', '""', ucwords(strtoupper($rTName))).'",';
$csv_output .= '"'.str_replace('"', '""', floatval($r['col_4'])).'",';
$csv_output .= '"'.str_replace('"', '""', floatval($r['col_5'])).'",';
$csv_output .= '"'.str_replace('"', '""', floatval($r['col_6'])).'",';
$csv_output .= '"'.str_replace('"', '""', floatval($r['col_7'])).'",';
$csv_output .= '"'.str_replace('"', '""', floatval($r['col_8'])).'",';
$csv_output .= '"'.str_replace('"', '""', floatval($r['col_9'])).'",';
$csv_output .= '"'.str_replace('"', '""', floatval($r['col_10'])).'",';
$csv_output .= '"'.str_replace('"', '""', floatval($r['col_11'])).'",';
$csv_output .= '"'.str_replace('"', '""', floatval($r['col_12'])).'",';
$csv_output .= '"'.str_replace('"', '""', floatval($r['col_1'])).'",';
$csv_output .= '"'.str_replace('"', '""', floatval($r['col_2'])).'",';
$csv_output .= '"'.str_replace('"', '""', floatval($r['col_3'])).'",';

$Fill=$r['col_4']+$r['col_5']+$r['col_6']+$r['col_7']+$r['col_8']+$r['col_9']+$r['col_10']+$r['col_11']+$r['col_12']+$r['col_1']+$r['col_2']+$r['col_3'];
$csv_output .= '"'.str_replace('"', '""', $Fill).'",';

$csv_output .= "\n";
$Sn++; 
 }


# Close the MySql connection
mysql_close($con);
# Set the headers so the file downloads
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Content-Length: " . strlen($csv_output));
header("Content-type: text/x-csv");
header("Content-Disposition: attachment; filename=Collection_".$PRD.".csv");
echo $csv_output;
exit;
}

?>