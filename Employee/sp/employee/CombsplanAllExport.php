<?php session_start();
require_once('../user/config/config.php');

if($_SESSION['Vertical']==16 || ($_SESSION['Hqv']>0 && $_SESSION['Hqf']>0)){$suq='1=1'; $suq2='1=1';}
elseif($_SESSION['Vertical']==14 || $_SESSION['Hqv']>0){$suq='si.GroupId=1'; $suq2='si.GroupId=1';}
elseif($_SESSION['Vertical']==15 || $_SESSION['Hqf']>0){$suq='si.GroupId=1'; $suq2='si.GroupId=2';}
else{$suq='1=1'; $suq2='1=1';}

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

if($_SESSION['Vertical']==14 OR $_SESSION['Vertical']==16 OR $_SESSION['Hqv']>0)
{
$csv_output .= '"HQ VC",';
$csv_output .= '"TERRITORY VC",';
$csv_output .= '"REGION",';
$csv_output .= '"ZONE",';	
}
if($_SESSION['Vertical']==15 OR $_SESSION['Vertical']==16 OR $_SESSION['Hqf']>0)
{
$csv_output .= '"HQ FC",';
$csv_output .= '"TERRITORY FC",';
$csv_output .= '"REGION",';
$csv_output .= '"ZONE",';
}
$csv_output .= '"Apr-'.$y1m.'_Tgt",';
$csv_output .= '"Apr-'.$y1m.'_Ach",';
$csv_output .= '"Apr-'.$y1m.'_Tgt_val",';
$csv_output .= '"Apr-'.$y1m.'_Ach_val",';
	
$csv_output .= '"May-'.$y1m.'_Tgt",';
$csv_output .= '"May-'.$y1m.'_Ach",';
$csv_output .= '"May-'.$y1m.'_Tgt_val",';
$csv_output .= '"May-'.$y1m.'_Ach_val",';

$csv_output .= '"Jun-'.$y1m.'_Tgt",';
$csv_output .= '"Jun-'.$y1m.'_Ach",';
$csv_output .= '"Jun-'.$y1m.'_Tgt_val",';
$csv_output .= '"Jun-'.$y1m.'_Ach_val",';

$csv_output .= '"Q1_Tgt",';
$csv_output .= '"Q1_Ach",';
$csv_output .= '"Q1_Tgt_val",';
$csv_output .= '"Q1_Ach_val",';

$csv_output .= '"Jul-'.$y1m.'_Tgt",';
$csv_output .= '"Jul-'.$y1m.'_Ach",';
$csv_output .= '"Jul-'.$y1m.'_Tgt_val",';
$csv_output .= '"Jul-'.$y1m.'_Ach_val",';
	
$csv_output .= '"Aug-'.$y1m.'_Tgt",';
$csv_output .= '"Aug-'.$y1m.'_Ach",';
$csv_output .= '"Aug-'.$y1m.'_Tgt_val",';
$csv_output .= '"Aug-'.$y1m.'_Ach_val",';

$csv_output .= '"Sep-'.$y1m.'_Tgt",';
$csv_output .= '"Sep-'.$y1m.'_Ach",';
$csv_output .= '"Sep-'.$y1m.'_Tgt_val",';
$csv_output .= '"Sep-'.$y1m.'_Ach_val",';

$csv_output .= '"Q2_Tgt",';
$csv_output .= '"Q2_Ach",';
$csv_output .= '"Q2_Tgt_val",';
$csv_output .= '"Q2_Ach_val",';

$csv_output .= '"Oct-'.$y1m.'_Tgt",';
$csv_output .= '"Oct-'.$y1m.'_Ach",';
$csv_output .= '"Oct-'.$y1m.'_Tgt_val",';
$csv_output .= '"Oct-'.$y1m.'_Ach_val",';

$csv_output .= '"Nov-'.$y1m.'_Tgt",';
$csv_output .= '"Nov-'.$y1m.'_Ach",';
$csv_output .= '"Nov-'.$y1m.'_Tgt_val",';
$csv_output .= '"Nov-'.$y1m.'_Ach_val",';

$csv_output .= '"Dec-'.$y1m.'_Tgt",';
$csv_output .= '"Dec-'.$y1m.'_Ach",';
$csv_output .= '"Dec-'.$y1m.'_Tgt_val",';
$csv_output .= '"Dec-'.$y1m.'_Ach_val",';

$csv_output .= '"Q3_Tgt",';
$csv_output .= '"Q3_Ach",';
$csv_output .= '"Q3_Tgt_val",';
$csv_output .= '"Q3_Ach_val",';

$csv_output .= '"Jan-'.$y2m.'_Tgt",';
$csv_output .= '"Jan-'.$y2m.'_Ach",';
$csv_output .= '"Jan-'.$y2m.'_Tgt_val",';
$csv_output .= '"Jan-'.$y2m.'_Ach_val",';

$csv_output .= '"Feb-'.$y2m.'_Tgt",';
$csv_output .= '"Feb-'.$y2m.'_Ach",';
$csv_output .= '"Feb-'.$y2m.'_Tgt_val",';
$csv_output .= '"Feb-'.$y2m.'_Ach_val",';

$csv_output .= '"Mar-'.$y2m.'_Tgt",';
$csv_output .= '"Mar-'.$y2m.'_Ach",';
$csv_output .= '"Mar-'.$y2m.'_Tgt_val",';
$csv_output .= '"Mar-'.$y2m.'_Ach_val",';

$csv_output .= '"Q4_Tgt",';
$csv_output .= '"Q4_Ach",';
$csv_output .= '"Q4_Tgt_val",';
$csv_output .= '"Q4_Ach_val",';

$csv_output .= '"TOT_Tgt",';
$csv_output .= '"TOT_Ach",';
$csv_output .= '"TOT_Tgt_val",';
$csv_output .= '"TOT_Ach_val",';
$csv_output .= "\n";

$sql = mysql_query("select sd.*, ProductName, ItemName, ItemCode, sp.TypeId, DealerName, DealerCity, Hq_vc, Hq_fc, Terr_vc, Terr_fc from hrm_sales_sal_details_".$_REQUEST['y']." sd INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId INNER JOIN hrm_sales_seedsitem si ON sp.ItemId=si.ItemId INNER JOIN hrm_sales_reporting_level rl ON (d.Terr_vc=rl.EmployeeID OR d.Terr_fc=rl.EmployeeID) where d.DealerSts='A' AND (Terr_vc=".$_REQUEST['ei']." OR Terr_fc=".$_REQUEST['ei']." OR rl.R1=".$_REQUEST['ei']." OR rl.R2=".$_REQUEST['ei']." OR rl.R3=".$_REQUEST['ei']." OR rl.R4=".$_REQUEST['ei']." OR rl.R5=".$_REQUEST['ei'].") AND sd.YearId=".$_REQUEST['y']." AND ".$suq2." AND (M1!=0 OR M2!=0 OR M3!=0 OR M4!=0 OR M5!=0 OR M6!=0 OR M7!=0 OR M8!=0 OR M9!=0 OR M10!=0 OR M11!=0 OR M12!=0 OR M1_Ach!=0 OR M2_Ach!=0 OR M3_Ach!=0 OR M4_Ach!=0 OR M5_Ach!=0 OR M6_Ach!=0 OR M7_Ach!=0 OR M8_Ach!=0 OR M9_Ach!=0 OR M10_Ach!=0 OR M11_Ach!=0 OR M12_Ach!=0) group by sd.DealerId, sd.ProductId order by si.ItemName ASC,sp.ProductName ASC", $con); $Sn=1; while($res=mysql_fetch_array($sql)){ 
	  
if($res['TypeId']>0){$sT=mysql_query("select TypeName from hrm_sales_seedtype where TypeId=".$res['TypeId'], $con); $rT=mysql_fetch_assoc($sT);}

if($res['Hq_vc']>0){ $sHv=mysql_query("select HqName,StateName,ZoneName from hrm_headquater hq inner join hrm_state s on hq.StateId=s.StateId inner join hrm_sales_zone z on s.ZoneId=z.ZoneId where hq.HqId=".$res['Hq_vc'],$con); 
$rHv=mysql_fetch_assoc($sHv); $Hqv=$rHv['HqName']; $Stv=$rHv['StateName']; $Znv=$rHv['ZoneName']; }
else{ $Hqv='';; $Stv=''; $Znv=''; }

$VresRgnv=''; 
if($res['Terr_vc']>0)
{ 
 $sEmpv=mysql_query("select Fname,Sname,Lname,RepEmployeeID,DepartmentId,EmpVertical from hrm_employee e inner join hrm_employee_general g on e.EmployeeID=g.EmployeeID where e.EmployeeID=".$res['Terr_vc'],$con); 
 $rEmpv=mysql_fetch_assoc($sEmpv); $rEv=$rEmpv['Fname'].' '.$rEmpv['Sname'].' '.$rEmpv['Lname']; 
 
 
 if($rEmpv['EmpVertical']>0)
 {
  $sqlRId=mysql_query("select RegionId from hrm_sales_verhq where HqId=".$res['Hq_vc']." AND Vertical=".$rEmpv['EmpVertical']." AND DeptId=".$rEmpv['DepartmentId'], $con); $rowRId=mysql_num_rows($sqlRId);
  if($rowRId>0){ $resRId=mysql_fetch_assoc($sqlRId); }
  else
  { $sqlHq2=mysql_query("select HqId from hrm_headquater where HqName='".$rHv['HqName']."' and HQStatus!='De'", $con); $resHq2=mysql_fetch_assoc($sqlHq2); 
  $sqlRId=mysql_query("select RegionId from hrm_sales_verhq where HqId=".$resHq2['HqId']." AND Vertical=".$rEmpv['EmpVertical']." AND DeptId=".$rEmpv['DepartmentId'], $con); $resRId=mysql_fetch_assoc($sqlRId);   
  }
   if($resRId['RegionId']>0)
   {
    $sqlRR=mysql_query("select RegionName,ZoneId from hrm_sales_region where RegionId=".$resRId['RegionId'], $con); 
    $resRR=mysql_fetch_assoc($sqlRR);
    $sqlZZ=mysql_query("select ZoneName from hrm_sales_zone where ZoneId=".$resRR['ZoneId'], $con); 
    $resZZ=mysql_fetch_assoc($sqlZZ);
    $VresRgnv=$resRR['RegionName']; $Znv=$resZZ['ZoneName'];
   }
   else{ $VresRgnv='.'; $Znv='.'; }	 
 }
 
 
 if($rEmpv['RepEmployeeID']>0 AND $rEmpv['RepEmployeeID']!=224)
 { 
  $sEmpRv=mysql_query("select Fname,Sname,Lname,RepEmployeeID,DepartmentId,EmpVertical from hrm_employee e inner join hrm_employee_general g on e.EmployeeID=g.EmployeeID where e.EmployeeID=".$rEmpv['RepEmployeeID'],$con); 
 $rEmpRv=mysql_fetch_assoc($sEmpRv); $rEvR1=$rEmpRv['Fname'].' '.$rEmpRv['Sname'].' '.$rEmpRv['Lname']; 
  
   if($rEmpRv['RepEmployeeID']>0 AND $rEmpRv['RepEmployeeID']!=224)
   { 
    $sEmpR2v=mysql_query("select Fname,Sname,Lname,RepEmployeeID,DepartmentId,EmpVertical from hrm_employee e inner join hrm_employee_general g on e.EmployeeID=g.EmployeeID where e.EmployeeID=".$rEmpRv['RepEmployeeID'],$con); 
    $rEmpR2v=mysql_fetch_assoc($sEmpR2v); $rEvR2=$rEmpR2v['Fname'].' '.$rEmpR2v['Sname'].' '.$rEmpR2v['Lname']; 
  
    if($rEmpR2v['RepEmployeeID']>0 AND $rEmpR2v['RepEmployeeID']!=224)
    { 
     $sEmpR3v=mysql_query("select Fname,Sname,Lname,RepEmployeeID,DepartmentId,EmpVertical from hrm_employee e inner join hrm_employee_general g on e.EmployeeID=g.EmployeeID where e.EmployeeID=".$rEmpR2v['RepEmployeeID'],$con); 
     $rEmpR3v=mysql_fetch_assoc($sEmpR3v); $rEvR3=$rEmpR3v['Fname'].' '.$rEmpR3v['Sname'].' '.$rEmpR3v['Lname']; 
    }else{ $rEvR3=''; }
  
  }else{ $rEvR2=''; $rEvR3=''; }
 
 }else{ $rEvR1=''; $rEvR2=''; $rEvR3=''; }
  
}
else {$rEv=''; $rEvR1=''; $rEvR2=''; $rEvR3=''; }


if($res['Hq_fc']>0){ $sHf=mysql_query("select HqName,StateName,ZoneName from hrm_headquater hq inner join hrm_state s on hq.StateId=s.StateId inner join hrm_sales_zone z on s.ZoneId=z.ZoneId where hq.HqId=".$res['Hq_fc'],$con); 
$rHf=mysql_fetch_assoc($sHf); $Hqf=$rHf['HqName']; $Stf=$rHf['StateName']; $Znf=$rHf['ZoneName']; }
else{ $Hqf='';; $Stf=''; $Znf=''; }

$VresRgnf='';
if($res['Terr_fc']>0)
{ 
 $sEmpf=mysql_query("select Fname,Sname,Lname,RepEmployeeID,DepartmentId,EmpVertical from hrm_employee e inner join hrm_employee_general g on e.EmployeeID=g.EmployeeID where e.EmployeeID=".$res['Terr_fc'],$con); 
 $rEmpf=mysql_fetch_assoc($sEmpf); $rEf=$rEmpf['Fname'].' '.$rEmpf['Sname'].' '.$rEmpf['Lname']; 
 
 if($rEmpf['EmpVertical']>0)
 {
  $sqlRId=mysql_query("select RegionId from hrm_sales_verhq where HqId=".$res['Hq_fc']." AND Vertical=".$rEmpf['EmpVertical']." AND DeptId=".$rEmpf['DepartmentId'], $con); $rowRId=mysql_num_rows($sqlRId);
  if($rowRId>0){ $resRId=mysql_fetch_assoc($sqlRId); }
  else
  { $sqlHq2=mysql_query("select HqId from hrm_headquater where HqName='".$rHf['HqName']."' and HQStatus!='De'", $con); $resHq2=mysql_fetch_assoc($sqlHq2); 
  $sqlRId=mysql_query("select RegionId from hrm_sales_verhq where HqId=".$resHq2['HqId']." AND Vertical=".$rEmpf['EmpVertical']." AND DeptId=".$rEmpf['DepartmentId'], $con); $resRId=mysql_fetch_assoc($sqlRId);   
  }
   if($resRId['RegionId']>0)
   {
    $sqlRR=mysql_query("select RegionName,ZoneId from hrm_sales_region where RegionId=".$resRId['RegionId'], $con); 
    $resRR=mysql_fetch_assoc($sqlRR);
    $sqlZZ=mysql_query("select ZoneName from hrm_sales_zone where ZoneId=".$resRR['ZoneId'], $con); 
    $resZZ=mysql_fetch_assoc($sqlZZ);
    $VresRgnf=$resRR['RegionName']; $Znf=$resZZ['ZoneName'];
   }
   else { $VresRgnf='.'; $Znf='.'; }	
 }
 
 if($rEmpf['RepEmployeeID']>0 AND $rEmpf['RepEmployeeID']!=224)
 { 
  $sEmpRf=mysql_query("select Fname,Sname,Lname,RepEmployeeID,DepartmentId,EmpVertical from hrm_employee e inner join hrm_employee_general g on e.EmployeeID=g.EmployeeID where e.EmployeeID=".$rEmpf['RepEmployeeID'],$con); 
 $rEmpRf=mysql_fetch_assoc($sEmpRf); $rEfR1=$rEmpRf['Fname'].' '.$rEmpRf['Sname'].' '.$rEmpRf['Lname']; 
  
   if($rEmpRf['RepEmployeeID']>0 AND $rEmpRf['RepEmployeeID']!=224)
   { 
    $sEmpR2f=mysql_query("select Fname,Sname,Lname,RepEmployeeID,DepartmentId,EmpVertical from hrm_employee e inner join hrm_employee_general g on e.EmployeeID=g.EmployeeID where e.EmployeeID=".$rEmpRf['RepEmployeeID'],$con); 
    $rEmpR2f=mysql_fetch_assoc($sEmpR2f); $rEfR2=$rEmpR2f['Fname'].' '.$rEmpR2f['Sname'].' '.$rEmpR2f['Lname']; 
  
    if($rEmpR2f['RepEmployeeID']>0 AND $rEmpR2f['RepEmployeeID']!=224)
    { 
     $sEmpR3f=mysql_query("select Fname,Sname,Lname,RepEmployeeID,DepartmentId,EmpVertical from hrm_employee e inner join hrm_employee_general g on e.EmployeeID=g.EmployeeID where e.EmployeeID=".$rEmpR2f['RepEmployeeID'],$con); 
     $rEmpR3f=mysql_fetch_assoc($sEmpR3f); $rEfR3=$rEmpR3f['Fname'].' '.$rEmpR3f['Sname'].' '.$rEmpR3f['Lname']; 
    }else{ $rEfR3=''; }
  
  }else{ $rEfR2=''; $rEfR3=''; }
 
 }else{ $rEfR1=''; $rEfR2=''; $rEfR3=''; }
  
}
else {$rEf=''; $rEfR1=''; $rEfR2=''; $rEfR3=''; }


// NRV NRV Check Open Open
$fy1=date("Y",strtotime($ry['FromDate'])); $ty1=date("Y",strtotime($ry['ToDate']));
//$sNr=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND PStatus='A'", $con);
		
    
$csv_output .= '"'.str_replace('"', '""', $Sn).'",';
$csv_output .= '"'.str_replace('"', '""', $res['ItemName']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['ProductName']).'",';
$csv_output .= '"'.str_replace('"', '""', substr_replace($rT['TypeName'],'',2)).'",';
$csv_output .= '"'.str_replace('"', '""', $res['DealerName']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['DealerCity']).'",';

if($_SESSION['Vertical']==14 OR $_SESSION['Vertical']==16 OR $_SESSION['Hqv']>0)
{
$csv_output .= '"'.str_replace('"', '""', $Hqv).'",';
$csv_output .= '"'.str_replace('"', '""', $rEv).'",';
$csv_output .= '"'.str_replace('"', '""', $VresRgnv).'",';
$csv_output .= '"'.str_replace('"', '""', $Znv).'",';
}
if($_SESSION['Vertical']==15 OR $_SESSION['Vertical']==16 OR $_SESSION['Hqf']>0)
{
$csv_output .= '"'.str_replace('"', '""', $Hqf).'",';
$csv_output .= '"'.str_replace('"', '""', $rEf).'",';
$csv_output .= '"'.str_replace('"', '""', $VresRgnf).'",';
$csv_output .= '"'.str_replace('"', '""', $Znf).'",';
}

$csv_output .= '"'.str_replace('"', '""', floatval($res['M1'])).'",';
$csv_output .= '"'.str_replace('"', '""', floatval($res['M1_Ach'])).'",';
$csv_output .= '"'.str_replace('"', '""', $res['M1a']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['M1a_Ach']).'",';


$csv_output .= '"'.str_replace('"', '""', floatval($res['M2'])).'",';
$csv_output .= '"'.str_replace('"', '""', floatval($res['M2_Ach'])).'",';
$csv_output .= '"'.str_replace('"', '""', $res['M2a']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['M2a_Ach']).'",';

$csv_output .= '"'.str_replace('"', '""', floatval($res['M3'])).'",';
$csv_output .= '"'.str_replace('"', '""', floatval($res['M3_Ach'])).'",';
$csv_output .= '"'.str_replace('"', '""', $res['M3a']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['M3a_Ach']).'",';

//Q1 Q1 Q1
$csv_output .= '"'.str_replace('"', '""', floatval($res['M1']+$res['M2']+$res['M3'])).'",';
$csv_output .= '"'.str_replace('"', '""', floatval($res['M1_Ach']+$res['M2_Ach']+$res['M3_Ach'])).'",';
$csv_output .= '"'.str_replace('"', '""', floatval($res['M1a']+$res['M2a']+$res['M3a'])).'",';
$csv_output .= '"'.str_replace('"', '""', floatval($res['M1a_Ach']+$res['M2a_Ach']+$res['M3a_Ach'])).'",';

$csv_output .= '"'.str_replace('"', '""', floatval($res['M4'])).'",';
$csv_output .= '"'.str_replace('"', '""', floatval($res['M4_Ach'])).'",';
$csv_output .= '"'.str_replace('"', '""', $res['M4a']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['M4a_Ach']).'",';

$csv_output .= '"'.str_replace('"', '""', floatval($res['M5'])).'",';
$csv_output .= '"'.str_replace('"', '""', floatval($res['M5_Ach'])).'",';
$csv_output .= '"'.str_replace('"', '""', $res['M5a']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['M5a_Ach']).'",';

$csv_output .= '"'.str_replace('"', '""', floatval($res['M6'])).'",';
$csv_output .= '"'.str_replace('"', '""', floatval($res['M6_Ach'])).'",';
$csv_output .= '"'.str_replace('"', '""', $res['M6a']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['M6a_Ach']).'",';

//Q2 Q2 Q2
$csv_output .= '"'.str_replace('"', '""', floatval($res['M4']+$res['M5']+$res['M6'])).'",';
$csv_output .= '"'.str_replace('"', '""', floatval($res['M4_Ach']+$res['M5_Ach']+$res['M6_Ach'])).'",';
$csv_output .= '"'.str_replace('"', '""', floatval($res['M4a']+$res['M5a']+$res['M6a'])).'",';
$csv_output .= '"'.str_replace('"', '""', floatval($res['M4a_Ach']+$res['M5a_Ach']+$res['M6a_Ach'])).'",';

$csv_output .= '"'.str_replace('"', '""', floatval($res['M7'])).'",';
$csv_output .= '"'.str_replace('"', '""', floatval($res['M7_Ach'])).'",';
$csv_output .= '"'.str_replace('"', '""', $res['M7a']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['M7a_Ach']).'",';

$csv_output .= '"'.str_replace('"', '""', floatval($res['M8'])).'",';
$csv_output .= '"'.str_replace('"', '""', floatval($res['M8_Ach'])).'",';
$csv_output .= '"'.str_replace('"', '""', $res['M8a']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['M8a_Ach']).'",';

$csv_output .= '"'.str_replace('"', '""', floatval($res['M9'])).'",';
$csv_output .= '"'.str_replace('"', '""', floatval($res['M9_Ach'])).'",';
$csv_output .= '"'.str_replace('"', '""', $res['M9a']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['M9a_Ach']).'",';

//Q3 Q3 Q3
$csv_output .= '"'.str_replace('"', '""', floatval($res['M7']+$res['M8']+$res['M9'])).'",';
$csv_output .= '"'.str_replace('"', '""', floatval($res['M7_Ach']+$res['M8_Ach']+$res['M9_Ach'])).'",';
$csv_output .= '"'.str_replace('"', '""', floatval($res['M7a']+$res['M8a']+$res['M9a'])).'",';
$csv_output .= '"'.str_replace('"', '""', floatval($res['M7a_Ach']+$res['M8a_Ach']+$res['M9a_Ach'])).'",';

$csv_output .= '"'.str_replace('"', '""', floatval($res['M10'])).'",';
$csv_output .= '"'.str_replace('"', '""', floatval($res['M10_Ach'])).'",';
$csv_output .= '"'.str_replace('"', '""', $res['M10a']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['M10a_Ach']).'",';

$csv_output .= '"'.str_replace('"', '""', floatval($res['M11'])).'",';
$csv_output .= '"'.str_replace('"', '""', floatval($res['M11_Ach'])).'",';
$csv_output .= '"'.str_replace('"', '""', $res['M11a']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['M11a_Ach']).'",';

$csv_output .= '"'.str_replace('"', '""', floatval($res['M12'])).'",';
$csv_output .= '"'.str_replace('"', '""', floatval($res['M12_Ach'])).'",';
$csv_output .= '"'.str_replace('"', '""', $res['M12a']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['M12a_Ach']).'",';

//Q4 Q4 Q4
$csv_output .= '"'.str_replace('"', '""', floatval($res['M10']+$res['M11']+$res['M12'])).'",';
$csv_output .= '"'.str_replace('"', '""', floatval($res['M10_Ach']+$res['M11_Ach']+$res['M12_Ach'])).'",';
$csv_output .= '"'.str_replace('"', '""', floatval($res['M10a']+$res['M11a']+$res['M12a'])).'",';
$csv_output .= '"'.str_replace('"', '""', floatval($res['M10a_Ach']+$res['M11a_Ach']+$res['M12a_Ach'])).'",';

//Total Total Total
$csv_output .= '"'.str_replace('"', '""', floatval($res['M1']+$res['M2']+$res['M3']+$res['M4']+$res['M5']+$res['M6']+$res['M7']+$res['M8']+$res['M9']+$res['M10']+$res['M11']+$res['M12'])).'",';
$csv_output .= '"'.str_replace('"', '""', floatval($res['M1_Ach']+$res['M2_Ach']+$res['M3_Ach']+$res['M4_Ach']+$res['M5_Ach']+$res['M6_Ach']+$res['M7_Ach']+$res['M8_Ach']+$res['M9_Ach']+$res['M10_Ach']+$res['M11_Ach']+$res['M12_Ach'])).'",';
$csv_output .= '"'.str_replace('"', '""', floatval($res['M1a']+$res['M2a']+$res['M3a']+$res['M4a']+$res['M5a']+$res['M6a']+$res['M7a']+$res['M8a']+$res['M9a']+$res['M10a']+$res['M11a']+$res['M12a'])).'",';
$csv_output .= '"'.str_replace('"', '""', floatval($res['M1a_Ach']+$res['M2a_Ach']+$res['M3a_Ach']+$res['M4a_Ach']+$res['M5a_Ach']+$res['M6a_Ach']+$res['M7a_Ach']+$res['M8a_Ach']+$res['M9a_Ach']+$res['M10a_Ach']+$res['M11a_Ach']+$res['M12a_Ach'])).'",';
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