<?php  require_once('config/config.php');
if(isset($_POST['action']) && $_POST['action']=='add')
{ 
$ei = $_POST['ei']; $m = $_POST['m']; $y = $_POST['y']; $ci = $_POST['Ci']; $yi = $_POST['yi']; $d1 = $_POST['d1']; $d2 = $_POST['d2']; 

$BY=date("Y")-1;
if($_POST['y']>=date("Y"))
{ $AttTable='hrm_employee_attendance'; $LeaveTable='hrm_employee_monthlyleave_balance';
  $AppLeaveTable='hrm_employee_applyleave'; }
elseif($_POST['y']==$BY AND date("m")=='01' AND $_POST['m']==12)
{ $AttTable='hrm_employee_attendance'; $LeaveTable='hrm_employee_monthlyleave_balance'; 
  $AppLeaveTable='hrm_employee_applyleave';}
elseif($_POST['y']==$BY AND $_POST['m']<12)
{ $AttTable='hrm_employee_attendance_'.$_POST['y']; $LeaveTable='hrm_employee_monthlyleave_balance_'.$_POST['y']; $AppLeaveTable='hrm_employee_applyleave_'.$_POST['y']; }
else
{$AttTable='hrm_employee_attendance_'.$_POST['y']; $LeaveTable='hrm_employee_monthlyleave_balance_'.$_POST['y']; $AppLeaveTable='hrm_employee_applyleave_'.$_POST['y']; }


for($j=$d1; $j<=$d2; $j++) 
{ 
 if($_POST['e_'.$j]!='') 
 {  
   if(date("w",strtotime(date($y.'-'.$m.'-'.$j)))==0 AND $_POST['e_'.$j]=='EL' AND $ei!='' AND $y!='' AND $m!='' AND $j!='')
   {
	$Sql=mysql_query("select * from ".$AttTable." where EmployeeID=".$ei." and AttDate='".date($y."-".$m."-".$j)."'", $con); $row=mysql_num_rows($Sql);
	if($row==0) { $sIns=mysql_query("insert into ".$AttTable."(EmployeeID,AttValue,AttDate,CheckSunday,Year,YearId)values(".$ei.",'".$_POST['e_'.$j]."','".date($y."-".$m."-".$j)."','Y','".$y."',".$yi.")", $con);}
	elseif($row>0) { $sUp=mysql_query("UPDATE ".$AttTable." SET AttValue='".$_POST['e_'.$j]."',CheckSunday='Y' where EmployeeID=".$ei." AND AttDate='".date($y."-".$m."-".$j)."'", $con); }  
   }
   elseif(date("w",strtotime(date($y.'-'.$m.'-'.$j)))!=0 AND $ei!='' AND $y!='' AND $m!='' AND $j!='' AND ($_POST['e_'.$j]=='P' OR $_POST['e_'.$j]=='A' OR $_POST['e_'.$j]=='EL' OR $_POST['e_'.$j]=='PL' OR $_POST['e_'.$j]=='PH' OR $_POST['e_'.$j]=='CL' OR $_POST['e_'.$j]=='CH' OR $_POST['e_'.$j]=='SL' OR $_POST['e_'.$j]=='SH' OR $_POST['e_'.$j]=='HF' OR $_POST['e_'.$j]=='OD' OR $_POST['e_'.$j]=='HO' OR $_POST['e_'.$j]=='FL' OR $_POST['e_'.$j]=='TL' OR $_POST['e_'.$j]=='WFH' OR $_POST['e_'.$j]=='ACH' OR $_POST['e_'.$j]=='ASH' OR $_POST['e_'.$j]=='APH'))
   {
   $Sql=mysql_query("select * from ".$AttTable." where EmployeeID=".$ei." and AttDate='".date($y."-".$m."-".$j)."'", $con); $row=mysql_num_rows($Sql);
   if($row==0) { $sIns=mysql_query("insert into ".$AttTable."(EmployeeID,AttValue,AttDate,Year,YearId)values(".$ei.",'".$_POST['e_'.$j]."','".date($y."-".$m."-".$j)."','".$y."',".$yi.")", $con);}
   elseif($row>0) { $sUp=mysql_query("UPDATE ".$AttTable." SET AttValue='".$_POST['e_'.$j]."' where EmployeeID=".$ei." AND AttDate='".date($y."-".$m."-".$j)."'", $con);}
   }	   
 }
 if($_POST['e_'.$j]=='' AND $ei!='' AND $y!='' AND $m!='' AND $j!='') 
 { $Sql=mysql_query("select * from ".$AttTable." where EmployeeID=".$ei." and AttDate='".date($y."-".$m."-".$j)."'", $con); $row=mysql_num_rows($Sql);
   if($row>0) { $sUp=mysql_query("delete from ".$AttTable." where EmployeeID=".$ei." AND AttDate='".date($y."-".$m."-".$j)."' ", $con);}  
 }
} 

$SqlCL=mysql_query("select count(AttValue)as CL from ".$AttTable." where AttValue='CL' AND EmployeeID=".$ei." AND (AttDate between '".date($y."-".$m."-1")."' AND '".date($y."-".$m."-".$ci)."')", $con); 
$SqlCH=mysql_query("select count(AttValue)as CH from ".$AttTable." where AttValue='CH' AND EmployeeID=".$ei." AND (AttDate between '".date($y."-".$m."-1")."' AND '".date($y."-".$m."-".$ci)."')", $con); 
$SqlSL=mysql_query("select count(AttValue)as SL from ".$AttTable." where AttValue='SL' AND EmployeeID=".$ei." AND (AttDate between '".date($y."-".$m."-1")."' AND '".date($y."-".$m."-".$ci)."')", $con); 
$SqlSH=mysql_query("select count(AttValue)as SH from ".$AttTable." where AttValue='SH' AND EmployeeID=".$ei." AND (AttDate between '".date($y."-".$m."-1")."' AND '".date($y."-".$m."-".$ci)."')", $con); 
$SqlPH=mysql_query("select count(AttValue)as PH from ".$AttTable." where AttValue='PH' AND EmployeeID=".$ei." AND (AttDate between '".date($y."-".$m."-1")."' AND '".date($y."-".$m."-".$ci)."')", $con); 
$SqlPL=mysql_query("select count(AttValue)as PL from ".$AttTable." where AttValue='PL' AND EmployeeID=".$ei." AND (AttDate between '".date($y."-".$m."-1")."' AND '".date($y."-".$m."-".$ci)."')", $con);
$SqlEL=mysql_query("select count(AttValue)as EL from ".$AttTable." where AttValue='EL' AND EmployeeID=".$ei." AND (AttDate between '".date($y."-".$m."-1")."' AND '".date($y."-".$m."-".$ci)."')", $con); 
$SqlFL=mysql_query("select count(AttValue)as FL from ".$AttTable." where AttValue='FL' AND EmployeeID=".$ei." AND (AttDate between '".date($y."-".$m."-1")."' AND '".date($y."-".$m."-".$ci)."')", $con); 
$SqlTL=mysql_query("select count(AttValue)as TL from ".$AttTable." where AttValue='TL' AND EmployeeID=".$ei." AND (AttDate between '".date($y."-".$m."-1")."' AND '".date($y."-".$m."-".$ci)."')", $con); 
$SqlHf=mysql_query("select count(AttValue)as Hf from ".$AttTable." where AttValue='HF' AND EmployeeID=".$ei." AND (AttDate between '".date($y."-".$m."-1")."' AND '".date($y."-".$m."-".$ci)."')", $con); 

$SqlAch=mysql_query("select count(DISTINCT AttDate)as ACH from ".$AttTable." where AttValue='ACH' AND EmployeeID=".$ei." AND (AttDate between '".date($y."-".$m."-1")."' AND '".date($y."-".$m."-".$ci)."')", $con);
$SqlAsh=mysql_query("select count(DISTINCT AttDate)as ASH from ".$AttTable." where AttValue='ASH' AND EmployeeID=".$ei." AND (AttDate between '".date($y."-".$m."-1")."' AND '".date($y."-".$m."-".$ci)."')", $con);
$SqlAph=mysql_query("select count(DISTINCT AttDate)as APH from ".$AttTable." where AttValue='APH' AND EmployeeID=".$ei." AND (AttDate between '".date($y."-".$m."-1")."' AND '".date($y."-".$m."-".$ci)."')", $con);

$SqlPresent=mysql_query("select count(AttValue)as Present from ".$AttTable." where (AttValue='P' OR AttValue='WFH') AND EmployeeID=".$ei." AND (AttDate between '".date($y."-".$m."-1")."' AND '".date($y."-".$m."-".$ci)."')", $con); 
$SqlAbsent=mysql_query("select count(AttValue)as Absent from ".$AttTable." where AttValue='A' AND EmployeeID=".$ei." AND (AttDate between '".date($y."-".$m."-1")."' AND '".date($y."-".$m."-".$ci)."')", $con); 
$SqlOnDuties=mysql_query("select count(AttValue)as OnDuties from ".$AttTable." where AttValue='OD' AND EmployeeID=".$ei." AND (AttDate between '".date($y."-".$m."-1")."' AND '".date($y."-".$m."-".$ci)."')", $con); 
$SqlHoliday=mysql_query("select count(AttValue)as Holiday from ".$AttTable." where AttValue='HO' AND EmployeeID=".$ei." AND (AttDate between '".date($y."-".$m."-1")."' AND '".date($y."-".$m."-".$ci)."')", $con); 
$SqlELSun=mysql_query("select count(CheckSunday)as SUN from ".$AttTable." where CheckSunday='Y' AND EmployeeID=".$ei." AND (AttDate between '".date($y."-".$m."-1")."' AND '".date($y."-".$m."-".$ci)."')", $con);

$ResCL=mysql_fetch_array($SqlCL); $ResCH=mysql_fetch_array($SqlCH); $ResSL=mysql_fetch_array($SqlSL); $ResSH=mysql_fetch_array($SqlSH); $ResPH=mysql_fetch_array($SqlPH);
$ResPL=mysql_fetch_array($SqlPL); $ResEL=mysql_fetch_array($SqlEL); $ResFL=mysql_fetch_array($SqlFL); $ResTL=mysql_fetch_array($SqlTL); $ResHf=mysql_fetch_array($SqlHf); 
$ResPresent=mysql_fetch_array($SqlPresent); 
$ResAbsent=mysql_fetch_array($SqlAbsent); $ResOnDuties=mysql_fetch_array($SqlOnDuties); $ResHoliday=mysql_fetch_array($SqlHoliday); 
$ResELSun=mysql_fetch_array($SqlELSun);

$ResAch=mysql_fetch_array($SqlAch); $ResAsh=mysql_fetch_array($SqlAsh); $ResAph=mysql_fetch_array($SqlAph);

$CountCL=$ResCL['CL']; $CountCH=$ResCH['CH']/2; $CountSL=$ResSL['SL']; $CountSH=$ResSH['SH']/2; 
$CountPH=$ResPH['PH']/2; $TotalEL=$ResEL['EL']; $TotalFL=$ResFL['FL']; $TotalTL=$ResTL['TL']; 

   $CountAch=$ResAch['ACH']/2; $CountAsh=$ResAsh['ASH']/2; $CountAph=$ResAph['APH']/2;
   $TotalCL=$CountCL+$CountCH+$CountAch;
   $TotalSL=$CountSL+$CountSH+$CountAsh;   
   $TotalPL=$ResPL['PL']+$CountPH+$CountAph;

$TotalLeaveCount=$TotalCL+$TotalSL+$TotalPL+$TotalEL+$TotalFL+$TotalTL; $TotELSun=$ResELSun['SUN'];
$CountHf=$ResHf['Hf']/2; //$CountHf=$ResHf['Hf']/2;  
$TotalPR=$ResPresent['Present']+$CountCH+$CountSH+$CountPH+$CountHf;  //$TotalPR=$ResPresent['Present']+$CountHf; 
$TotalAbsent=$ResAbsent['Absent']+$CountHf+$CountAch+$CountAsh+$CountAph;
$TotalOnDuties=$ResOnDuties['OnDuties']; $TotalHoliday=$ResHoliday['Holiday']; 
$TotalDayWithSunEL=$TotalPR+$TotalLeaveCount+$TotalOnDuties+$TotalHoliday;
$TotalPD=$TotalDayWithSunEL-$TotELSun;
$TotalPaidDay=$TotalDayWithSunEL-$TotELSun;
$TotalWorkingDay=26;

    /********************************************** hrm_employee_monthlyleave_balance open***********************************************/
	  $SL=mysql_query("select * from ".$LeaveTable." where EmployeeID=".$ei." AND Month='".$m."' AND Year='".$y."'", $con);  
	  $RowL=mysql_num_rows($SL);
	  if($RowL>0) { $RL=mysql_fetch_assoc($SL); 
	  if($m!=1) { $TotBalCL=$RL['OpeningCL']-$TotalCL;  $TotBalSL=$RL['OpeningSL']-$TotalSL; $TotBalPL=$RL['OpeningPL']-$TotalPL;  $TotBalEL=$RL['OpeningEL']-$TotalEL; 
	              $TotBalFL=$RL['OpeningOL']-$TotalFL; }  
	  if($m==1) { $TotBalCL=$RL['TotCL']-$TotalCL;  $TotBalSL=$RL['TotSL']-$TotalSL; $TotBalPL=$RL['TotPL']-$TotalPL;  $TotBalEL=$RL['TotEL']-($TotalEL+$RL['EnCashEL']); 
	              $TotBalFL=$RL['TotOL']-$TotalFL;}  
	  
	  $sUpL=mysql_query("UPDATE ".$LeaveTable." set AvailedCL='".$TotalCL."', AvailedSL='".$TotalSL."', AvailedPL='".$TotalPL."', AvailedEL='".$TotalEL."', AvailedOL='".$TotalFL."', AvailedTL='".$TotalTL."', BalanceCL='".$TotBalCL."', BalanceSL='".$TotBalSL."', BalancePL='".$TotBalPL."', BalanceEL='".$TotBalEL."', BalanceOL='".$TotBalFL."' where EmployeeID=".$ei." AND Month='".$m."' AND Year='".$y."'", $con); }
	  /******************** hrm_employee_monthlyleave_balance close *******************/

   

  
?>	  
<input type="hidden" id="ei" value="<?php echo $ei; ?>" />
<?php } ?>



