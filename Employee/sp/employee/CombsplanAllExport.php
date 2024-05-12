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
$csv_output .= '"ZONE",';
$csv_output .= '"STATE",';	
}
if($_SESSION['Vertical']==15 OR $_SESSION['Vertical']==16 OR $_SESSION['Hqf']>0)
{
$csv_output .= '"HQ FC",';
$csv_output .= '"TERRITORY FC",';
$csv_output .= '"ZONE",';
$csv_output .= '"STATE",';
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

$sql = mysql_query("select sd.ProductId,sd.DealerId,M1,M2,M3,M4,M5,M6,M7,M8,M9,M10,M11,M12,M1_Ach,M2_Ach,M3_Ach,M4_Ach,M5_Ach,M6_Ach,M7_Ach,M8_Ach,M9_Ach,M10_Ach,M11_Ach,M12_Ach,ProductName,ItemName,ItemCode from hrm_sales_sal_details_".$_REQUEST['y']." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId INNER JOIN hrm_sales_seedsitem si ON sp.ItemId=si.ItemId INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_sales_reporting_level rl ON (d.Terr_vc=rl.EmployeeID OR d.Terr_fc=rl.EmployeeID) where d.DealerSts='A' AND (Terr_vc=".$_REQUEST['ei']." OR Terr_fc=".$_REQUEST['ei']." OR rl.R1=".$_REQUEST['ei']." OR rl.R2=".$_REQUEST['ei']." OR rl.R3=".$_REQUEST['ei']." OR rl.R4=".$_REQUEST['ei']." OR rl.R5=".$_REQUEST['ei'].") AND sd.YearId=".$_REQUEST['y']." AND ".$suq2." AND (M1!=0 OR M2!=0 OR M3!=0 OR M4!=0 OR M5!=0 OR M6!=0 OR M7!=0 OR M8!=0 OR M9!=0 OR M10!=0 OR M11!=0 OR M12!=0 OR M1_Ach!=0 OR M2_Ach!=0 OR M3_Ach!=0 OR M4_Ach!=0 OR M5_Ach!=0 OR M6_Ach!=0 OR M7_Ach!=0 OR M8_Ach!=0 OR M9_Ach!=0 OR M10_Ach!=0 OR M11_Ach!=0 OR M12_Ach!=0) group by sd.DealerId,sd.ProductId order by si.ItemName ASC,sp.ProductName ASC", $con); $Sn=1; while($res=mysql_fetch_array($sql)){ 
	  
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
 
 if($rEmpv['RepEmployeeID']>0 AND $rEmpv['RepEmployeeID']!=224)
 { 
  $sEmpRv=mysql_query("select Fname,Sname,Lname,RepEmployeeID from hrm_employee e inner join hrm_employee_general g on e.EmployeeID=g.EmployeeID where e.EmployeeID=".$rEmpv['RepEmployeeID'],$con); 
 $rEmpRv=mysql_fetch_assoc($sEmpRv); $rEvR1=$rEmpRv['Fname'].' '.$rEmpRv['Sname'].' '.$rEmpRv['Lname']; 
  
   if($rEmpRv['RepEmployeeID']>0 AND $rEmpRv['RepEmployeeID']!=224)
   { 
    $sEmpR2v=mysql_query("select Fname,Sname,Lname,RepEmployeeID from hrm_employee e inner join hrm_employee_general g on e.EmployeeID=g.EmployeeID where e.EmployeeID=".$rEmpRv['RepEmployeeID'],$con); 
    $rEmpR2v=mysql_fetch_assoc($sEmpR2v); $rEvR2=$rEmpR2v['Fname'].' '.$rEmpR2v['Sname'].' '.$rEmpR2v['Lname']; 
  
    if($rEmpR2v['RepEmployeeID']>0 AND $rEmpR2v['RepEmployeeID']!=224)
    { 
     $sEmpR3v=mysql_query("select Fname,Sname,Lname,RepEmployeeID from hrm_employee e inner join hrm_employee_general g on e.EmployeeID=g.EmployeeID where e.EmployeeID=".$rEmpR2v['RepEmployeeID'],$con); 
     $rEmpR3v=mysql_fetch_assoc($sEmpR3v); $rEvR3=$rEmpR3v['Fname'].' '.$rEmpR3v['Sname'].' '.$rEmpR3v['Lname']; 
    }else{ $rEvR3=''; }
  
  }else{ $rEvR2=''; $rEvR3=''; }
 
 }else{ $rEvR1=''; $rEvR2=''; $rEvR3=''; }
  
}
else {$rEv=''; $rEvR1=''; $rEvR2=''; $rEvR3=''; }


if($rD['Hq_fc']>0){ $sHf=mysql_query("select HqName,StateName,ZoneName from hrm_headquater hq inner join hrm_state s on hq.StateId=s.StateId inner join hrm_sales_zone z on s.ZoneId=z.ZoneId where hq.HqId=".$rD['Hq_fc'],$con); 
$rHf=mysql_fetch_assoc($sHf); $Hqf=$rHf['HqName']; $Stf=$rHf['StateName']; $Znf=$rHf['ZoneName']; }
else{ $Hqf='';; $Stf=''; $Znf=''; }

if($rD['Terr_fc']>0)
{ 
 $sEmpf=mysql_query("select Fname,Sname,Lname,RepEmployeeID from hrm_employee e inner join hrm_employee_general g on e.EmployeeID=g.EmployeeID where e.EmployeeID=".$rD['Terr_fc'],$con); 
 $rEmpf=mysql_fetch_assoc($sEmpf); $rEf=$rEmpf['Fname'].' '.$rEmpf['Sname'].' '.$rEmpf['Lname']; 
 
 if($rEmpf['RepEmployeeID']>0 AND $rEmpf['RepEmployeeID']!=224)
 { 
  $sEmpRf=mysql_query("select Fname,Sname,Lname,RepEmployeeID from hrm_employee e inner join hrm_employee_general g on e.EmployeeID=g.EmployeeID where e.EmployeeID=".$rEmpf['RepEmployeeID'],$con); 
 $rEmpRf=mysql_fetch_assoc($sEmpRf); $rEfR1=$rEmpRf['Fname'].' '.$rEmpRf['Sname'].' '.$rEmpRf['Lname']; 
  
   if($rEmpRf['RepEmployeeID']>0 AND $rEmpRf['RepEmployeeID']!=224)
   { 
    $sEmpR2f=mysql_query("select Fname,Sname,Lname,RepEmployeeID from hrm_employee e inner join hrm_employee_general g on e.EmployeeID=g.EmployeeID where e.EmployeeID=".$rEmpRf['RepEmployeeID'],$con); 
    $rEmpR2f=mysql_fetch_assoc($sEmpR2f); $rEfR2=$rEmpR2f['Fname'].' '.$rEmpR2f['Sname'].' '.$rEmpR2f['Lname']; 
  
    if($rEmpR2f['RepEmployeeID']>0 AND $rEmpR2f['RepEmployeeID']!=224)
    { 
     $sEmpR3f=mysql_query("select Fname,Sname,Lname,RepEmployeeID from hrm_employee e inner join hrm_employee_general g on e.EmployeeID=g.EmployeeID where e.EmployeeID=".$rEmpR2f['RepEmployeeID'],$con); 
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
$csv_output .= '"'.str_replace('"', '""', $rD['DealerName']).'",';
$csv_output .= '"'.str_replace('"', '""', $rD['DealerCity']).'",';

if($_SESSION['Vertical']==14 OR $_SESSION['Vertical']==16 OR $_SESSION['Hqv']>0)
{
$csv_output .= '"'.str_replace('"', '""', $Hqv).'",';
$csv_output .= '"'.str_replace('"', '""', $rEv).'",';
$csv_output .= '"'.str_replace('"', '""', $Znv).'",';
$csv_output .= '"'.str_replace('"', '""', $Stv).'",';
}
if($_SESSION['Vertical']==15 OR $_SESSION['Vertical']==16 OR $_SESSION['Hqf']>0)
{
$csv_output .= '"'.str_replace('"', '""', $Hqf).'",';
$csv_output .= '"'.str_replace('"', '""', $rEf).'",';
$csv_output .= '"'.str_replace('"', '""', $Znf).'",';
$csv_output .= '"'.str_replace('"', '""', $Stf).'",';
}
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

$sqlChk=mysql_query("select * from hrm_sales_tlemp tle INNER JOIN hrm_sales_reporting_level rl ON tle.TLRepId=rl.EmployeeID where tle.TLStatus='A' AND (tle.TLRepId=".$_REQUEST['ei']." OR rl.R1=".$_REQUEST['ei']." OR rl.R2=".$_REQUEST['ei']." OR rl.R3=".$_REQUEST['ei']." OR rl.R4=".$_REQUEST['ei']." OR rl.R5=".$_REQUEST['ei'].")",$con);
$rowchk=mysql_num_rows($sqlChk);
if($rowchk>0){
/**********222******************//**********222******* Teamlease *********222******************/
$sql = mysql_query("select sd.ProductId,sd.DealerId,M1,M2,M3,M4,M5,M6,M7,M8,M9,M10,M11,M12,M1_Ach,M2_Ach,M3_Ach,M4_Ach,M5_Ach,M6_Ach,M7_Ach,M8_Ach,M9_Ach,M10_Ach,M11_Ach,M12_Ach,ProductName,ItemName,ItemCode,TLName,TLRepId from hrm_sales_sal_details_".$_REQUEST['y']." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId INNER JOIN hrm_sales_seedsitem si ON sp.ItemId=si.ItemId INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_sales_tlemp tle ON d.HqId=tle.TLHq INNER JOIN hrm_sales_reporting_level rl ON tle.TLRepId=rl.EmployeeID where tle.TLStatus='A' AND (tle.TLRepId=".$_REQUEST['ei']." OR rl.R1=".$_REQUEST['ei']." OR rl.R2=".$_REQUEST['ei']." OR rl.R3=".$_REQUEST['ei']." OR rl.R4=".$_REQUEST['ei']." OR rl.R5=".$_REQUEST['ei'].") AND sd.YearId=".$_REQUEST['y']." AND ".$suq." AND (M1!=0 OR M2!=0 OR M3!=0 OR M4!=0 OR M5!=0 OR M6!=0 OR M7!=0 OR M8!=0 OR M9!=0 OR M10!=0 OR M11!=0 OR M12!=0 OR M1_Ach!=0 OR M2_Ach!=0 OR M3_Ach!=0 OR M4_Ach!=0 OR M5_Ach!=0 OR M6_Ach!=0 OR M7_Ach!=0 OR M8_Ach!=0 OR M9_Ach!=0 OR M10_Ach!=0 OR M11_Ach!=0 OR M12_Ach!=0) order by si.ItemName ASC,sp.ProductName ASC", $con); $Sn1=$Sn; while($res=mysql_fetch_array($sql)){ 
	  
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
$Sn1++; }
/**********222 Close ******************//**********222 Close *** Teamlease ********222 Close **************/
}

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