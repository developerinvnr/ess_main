<?php  require_once('config/config.php');
if(isset($_POST['action']) && $_POST['action']=='add')
{ 
$ei = $_POST['ei']; $m = $_POST['m']; $y = $_POST['y']; $ci = $_POST['Ci']; $yi = $_POST['yi']; $d1 = $_POST['d1']; $d2 = $_POST['d2']; 

for($j=$d1; $j<=$d2; $j++) 
{ 
 if($_POST['e_'.$j]!='') 
 {  
   if(date("w",strtotime(date($y.'-'.$m.'-'.$j)))==0 AND $_POST['e_'.$j]=='EL' AND $ei!='' AND $y!='' AND $m!='' AND $j!='')
   {
	$Sql=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$ei." and AttDate='".date($y."-".$m."-".$j)."'", $con); $row=mysql_num_rows($Sql);
	if($row==0) { $sIns=mysql_query("insert into hrm_employee_attendance(EmployeeID,AttValue,AttDate,CheckSunday,Year,YearId)values(".$ei.",'".$_POST['e_'.$j]."','".date($y."-".$m."-".$j)."','Y','".$y."',".$yi.")", $con);}
	elseif($row>0) { $sUp=mysql_query("UPDATE hrm_employee_attendance SET AttValue='".$_POST['e_'.$j]."',CheckSunday='Y' where EmployeeID=".$ei." AND AttDate='".date($y."-".$m."-".$j)."'", $con); }  
   }
   elseif(date("w",strtotime(date($y.'-'.$m.'-'.$j)))!=0 AND $ei!='' AND $y!='' AND $m!='' AND $j!='' AND ($_POST['e_'.$j]=='P' OR $_POST['e_'.$j]=='A' OR $_POST['e_'.$j]=='EL' OR $_POST['e_'.$j]=='PL' OR $_POST['e_'.$j]=='PH' OR $_POST['e_'.$j]=='CL' OR $_POST['e_'.$j]=='CH' OR $_POST['e_'.$j]=='SL' OR $_POST['e_'.$j]=='SH' OR $_POST['e_'.$j]=='HF' OR $_POST['e_'.$j]=='OD' OR $_POST['e_'.$j]=='HO' OR $_POST['e_'.$j]=='FL' OR $_POST['e_'.$j]=='TL'))
   {
   $Sql=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$ei." and AttDate='".date($y."-".$m."-".$j)."'", $con); $row=mysql_num_rows($Sql);
   if($row==0) { $sIns=mysql_query("insert into hrm_employee_attendance(EmployeeID,AttValue,AttDate,Year,YearId)values(".$ei.",'".$_POST['e_'.$j]."','".date($y."-".$m."-".$j)."','".$y."',".$yi.")", $con);}
   elseif($row>0) { $sUp=mysql_query("UPDATE hrm_employee_attendance SET AttValue='".$_POST['e_'.$j]."' where EmployeeID=".$ei." AND AttDate='".date($y."-".$m."-".$j)."'", $con);}
   }	   
 }
 if($_POST['e_'.$j]=='' AND $ei!='' AND $y!='' AND $m!='' AND $j!='') 
 { $Sql=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$ei." and AttDate='".date($y."-".$m."-".$j)."'", $con); $row=mysql_num_rows($Sql);
   if($row>0) { $sUp=mysql_query("delete from hrm_employee_attendance where EmployeeID=".$ei." AND AttDate='".date($y."-".$m."-".$j)."' ", $con);}  
 }
} 

$SqlCL=mysql_query("select count(AttValue)as CL from hrm_employee_attendance where AttValue='CL' AND EmployeeID=".$ei." AND (AttDate between '".date($y."-".$m."-1")."' AND '".date($y."-".$m."-".$ci)."')", $con); $SqlCH=mysql_query("select count(AttValue)as CH from hrm_employee_attendance where AttValue='CH' AND EmployeeID=".$ei." AND (AttDate between '".date($y."-".$m."-1")."' AND '".date($y."-".$m."-".$ci)."')", $con); $SqlSL=mysql_query("select count(AttValue)as SL from hrm_employee_attendance where AttValue='SL' AND EmployeeID=".$ei." AND (AttDate between '".date($y."-".$m."-1")."' AND '".date($y."-".$m."-".$ci)."')", $con); $SqlSH=mysql_query("select count(AttValue)as SH from hrm_employee_attendance where AttValue='SH' AND EmployeeID=".$ei." AND (AttDate between '".date($y."-".$m."-1")."' AND '".date($y."-".$m."-".$ci)."')", $con); $SqlPH=mysql_query("select count(AttValue)as PH from hrm_employee_attendance where AttValue='PH' AND EmployeeID=".$ei." AND (AttDate between '".date($y."-".$m."-1")."' AND '".date($y."-".$m."-".$ci)."')", $con); $SqlPL=mysql_query("select count(AttValue)as PL from hrm_employee_attendance where AttValue='PL' AND EmployeeID=".$ei." AND (AttDate between '".date($y."-".$m."-1")."' AND '".date($y."-".$m."-".$ci)."')", $con);
$SqlEL=mysql_query("select count(AttValue)as EL from hrm_employee_attendance where AttValue='EL' AND EmployeeID=".$ei." AND (AttDate between '".date($y."-".$m."-1")."' AND '".date($y."-".$m."-".$ci)."')", $con); $SqlFL=mysql_query("select count(AttValue)as FL from hrm_employee_attendance where AttValue='FL' AND EmployeeID=".$ei." AND (AttDate between '".date($y."-".$m."-1")."' AND '".date($y."-".$m."-".$ci)."')", $con); $SqlTL=mysql_query("select count(AttValue)as TL from hrm_employee_attendance where AttValue='TL' AND EmployeeID=".$ei." AND (AttDate between '".date($y."-".$m."-1")."' AND '".date($y."-".$m."-".$ci)."')", $con); $SqlHf=mysql_query("select count(AttValue)as Hf from hrm_employee_attendance where AttValue='HF' AND EmployeeID=".$ei." AND (AttDate between '".date($y."-".$m."-1")."' AND '".date($y."-".$m."-".$ci)."')", $con); $SqlPresent=mysql_query("select count(AttValue)as Present from hrm_employee_attendance where AttValue='P' AND EmployeeID=".$ei." AND (AttDate between '".date($y."-".$m."-1")."' AND '".date($y."-".$m."-".$ci)."')", $con); $SqlAbsent=mysql_query("select count(AttValue)as Absent from hrm_employee_attendance where AttValue='A' AND EmployeeID=".$ei." AND (AttDate between '".date($y."-".$m."-1")."' AND '".date($y."-".$m."-".$ci)."')", $con); $SqlOnDuties=mysql_query("select count(AttValue)as OnDuties from hrm_employee_attendance where AttValue='OD' AND EmployeeID=".$ei." AND (AttDate between '".date($y."-".$m."-1")."' AND '".date($y."-".$m."-".$ci)."')", $con); $SqlHoliday=mysql_query("select count(AttValue)as Holiday from hrm_employee_attendance where AttValue='HO' AND EmployeeID=".$ei." AND (AttDate between '".date($y."-".$m."-1")."' AND '".date($y."-".$m."-".$ci)."')", $con); $SqlELSun=mysql_query("select count(CheckSunday)as SUN from hrm_employee_attendance where CheckSunday='Y' AND EmployeeID=".$ei." AND (AttDate between '".date($y."-".$m."-1")."' AND '".date($y."-".$m."-".$ci)."')", $con);

$ResCL=mysql_fetch_array($SqlCL); $ResCH=mysql_fetch_array($SqlCH); $ResSL=mysql_fetch_array($SqlSL); $ResSH=mysql_fetch_array($SqlSH); $ResPH=mysql_fetch_array($SqlPH);
$ResPL=mysql_fetch_array($SqlPL); $ResEL=mysql_fetch_array($SqlEL); $ResFL=mysql_fetch_array($SqlFL); $ResTL=mysql_fetch_array($SqlTL); $ResHf=mysql_fetch_array($SqlHf); 
$ResPresent=mysql_fetch_array($SqlPresent); 
$ResAbsent=mysql_fetch_array($SqlAbsent); $ResOnDuties=mysql_fetch_array($SqlOnDuties); $ResHoliday=mysql_fetch_array($SqlHoliday); 
$ResELSun=mysql_fetch_array($SqlELSun);

$CountCL=$ResCL['CL']; $CountCH=$ResCH['CH']/2; $TotalCL=$CountCL+$CountCH; $CountSL=$ResSL['SL']; $CountSH=$ResSH['SH']/2; $TotalSL=$CountSL+$CountSH;
$CountPH=$ResPH['PH']/2; $TotalPL=$ResPL['PL']+$CountPH; $TotalEL=$ResEL['EL']; $TotalFL=$ResFL['FL']; $TotalTL=$ResTL['TL']; 
$TotalLeaveCount=$TotalCL+$TotalSL+$TotalPL+$TotalEL+$TotalFL+$TotalTL; $TotELSun=$ResELSun['SUN'];
$CountHf=$ResHf['Hf']/2; //$CountHf=$ResHf['Hf']/2;  
$TotalPR=$ResPresent['Present']+$CountCH+$CountSH+$CountPH+$CountHf;  //$TotalPR=$ResPresent['Present']+$CountHf; 
$TotalAbsent=$ResAbsent['Absent']+$CountHf;
$TotalOnDuties=$ResOnDuties['OnDuties']; $TotalHoliday=$ResHoliday['Holiday']; 
$TotalDayWithSunEL=$TotalPR+$TotalLeaveCount+$TotalOnDuties+$TotalHoliday;
$TotalPD=$TotalDayWithSunEL-$TotELSun;
$TotalPaidDay=$TotalDayWithSunEL-$TotELSun;
$TotalWorkingDay=26;

    /********************************************** hrm_employee_monthlyleave_balance open***********************************************/
	  $SL=mysql_query("select * from hrm_employee_monthlyleave_balance where EmployeeID=".$ei." AND Month='".$m."' AND Year='".$y."'", $con);  
	  $RowL=mysql_num_rows($SL);
	  if($RowL>0) { $RL=mysql_fetch_assoc($SL); 
	  if($m!=1) { $TotBalCL=$RL['OpeningCL']-$TotalCL;  $TotBalSL=$RL['OpeningSL']-$TotalSL; $TotBalPL=$RL['OpeningPL']-$TotalPL;  $TotBalEL=$RL['OpeningEL']-$TotalEL; 
	              $TotBalFL=$RL['OpeningOL']-$TotalFL; }  
	  if($m==1) { $TotBalCL=$RL['TotCL']-$TotalCL;  $TotBalSL=$RL['TotSL']-$TotalSL; $TotBalPL=$RL['TotPL']-$TotalPL;  $TotBalEL=$RL['TotEL']-$TotalEL; 
	              $TotBalFL=$RL['TotOL']-$TotalFL;}  
	  
	  $sUpL=mysql_query("UPDATE hrm_employee_monthlyleave_balance set AvailedCL='".$TotalCL."', AvailedSL='".$TotalSL."', AvailedPL='".$TotalPL."', AvailedEL='".$TotalEL."', AvailedOL='".$TotalFL."', AvailedTL='".$TotalTL."', BalanceCL='".$TotBalCL."', BalanceSL='".$TotBalSL."', BalancePL='".$TotBalPL."', BalanceEL='".$TotBalEL."', BalanceOL='".$TotBalFL."' where EmployeeID=".$ei." AND Month='".$m."' AND Year='".$y."'", $con); }
	  /********************************************** hrm_employee_monthlyleave_balance close ***********************************************/

   
/********************************************** hrm_employee_monthatt ***********************************************/  
   $SqlMonthLeave=mysql_query("select * from hrm_employee_monthatt where EmployeeID=".$ei." AND Month=".$m." AND Year='".$y."'", $con); 
   $RowMonthLeave=mysql_num_rows($SqlMonthLeave);
   if($RowMonthLeave==0){ $InsUpMonth=mysql_query("insert into hrm_employee_monthatt(YearId,Year,EmployeeID,Month,MonthAtt_TotCL,MonthAtt_TotSL,MonthAtt_TotPL,MonthAtt_TotEL,MonthAtt_TotOL,MonthAtt_TotTL,MonthAtt_TotLeave,MonthAtt_TotOD,MonthAtt_TotHO,MonthAtt_TotPR,MonthAtt_TotAP,MonthAtt_TotWorkDay,MonthAtt_TotPaidDay,MonthAtt_UpdatedBy,MonthAtt_UpdatedDate,MonthAtt_UpdatedYearId)values(".$yi.",'".$y."',".$ei.",".$m.",'".$TotalCL."','".$TotalSL."','".$TotalPL."','".$TotalEL."','".$TotalFL."','".$TotalTL."','".$TotalLeaveCount."','".$TotalOnDuties."','".$TotalHoliday."','".$TotalPR."','".$TotalAbsent."','".$TotalWorkingDay."','".$TotalPaidDay."',".$UserId.",'".date("Y-m-d")."',".$yi.")", $con);}
   if($RowMonthLeave>0){ $InsUpMonth=mysql_query("UPDATE hrm_employee_monthatt SET YearId=".$yi.", Year='".$y."', EmployeeID=".$ei.", Month=".$m.", MonthAtt_TotCL='".$TotalCL."', MonthAtt_TotSL='".$TotalSL."', MonthAtt_TotPL='".$TotalPL."', MonthAtt_TotEL='".$TotalEL."', MonthAtt_TotOL='".$TotalFL."', MonthAtt_TotTL='".$TotalTL."', MonthAtt_TotLeave='".$TotalLeaveCount."', MonthAtt_TotOD='".$TotalOnDuties."', MonthAtt_TotHO='".$TotalHoliday."', MonthAtt_TotPR='".$TotalPR."', MonthAtt_TotAP='".$TotalAbsent."', MonthAtt_TotWorkDay='".$TotalWorkingDay."', MonthAtt_TotPaidDay='".$TotalPaidDay."', MonthAtt_UpdatedBy=".$UserId.", MonthAtt_UpdatedDate='".date("Y-m-d")."', MonthAtt_UpdatedYearId=".$yi." where EmployeeID=".$ei." AND Month=".$m." AND Year='".$y."'", $con);}
  
  
  if($InsUpMonth) 
    {  /********************************************** hrm_employee_yearatt ***********************************************/
	  $SqlTotCL=mysql_query("select SUM(MonthAtt_TotCL)as TotCL from hrm_employee_monthatt where Year='".$y."' AND EmployeeID=".$ei, $con);
	  $SqlTotSL=mysql_query("select SUM(MonthAtt_TotSL)as TotSL from hrm_employee_monthatt where Year='".$y."' AND EmployeeID=".$ei, $con);
	  $SqlTotPL=mysql_query("select SUM(MonthAtt_TotPL)as TotPL from hrm_employee_monthatt where Year='".$y."' AND EmployeeID=".$ei, $con);
	  $SqlTotEL=mysql_query("select SUM(MonthAtt_TotEL)as TotEL from hrm_employee_monthatt where Year='".$y."' AND EmployeeID=".$ei, $con); 
	  $SqlTotFL=mysql_query("select SUM(MonthAtt_TotOL)as TotOL from hrm_employee_monthatt where Year='".$y."' AND EmployeeID=".$ei, $con);
	  $SqlTotTL=mysql_query("select SUM(MonthAtt_TotTL)as TotTL from hrm_employee_monthatt where Year='".$y."' AND EmployeeID=".$EMPID, $con); 
	  $SqlTotLeave=mysql_query("select SUM(MonthAtt_TotLeave)as TotLeave from hrm_employee_monthatt where Year='".$y."' AND EmployeeID=".$ei, $con);
	  $SqlTotOD=mysql_query("select SUM(MonthAtt_TotOD)as TotOD from hrm_employee_monthatt where Year='".$y."' AND EmployeeID=".$ei, $con);
	  $SqlTotHO=mysql_query("select SUM(MonthAtt_TotHO)as TotHO from hrm_employee_monthatt where Year='".$y."' AND EmployeeID=".$ei, $con);
	  $SqlTotPR=mysql_query("select SUM(MonthAtt_TotPR)as TotPR from hrm_employee_monthatt where Year='".$y."' AND EmployeeID=".$ei, $con);
	  $SqlTotAP=mysql_query("select SUM(MonthAtt_TotAP)as TotAP from hrm_employee_monthatt where Year='".$y."' AND EmployeeID=".$ei, $con);
	  $SqlTotWorkDay=mysql_query("select SUM(MonthAtt_TotWorkDay)as TotWorkDay from hrm_employee_monthatt where Year='".$y."' AND EmployeeID=".$ei, $con);
	  $SqlTotPaidDay=mysql_query("select SUM(MonthAtt_TotPaidDay)as TotPaidDay from hrm_employee_monthatt where Year='".$y."' AND EmployeeID=".$ei, $con); 
	  	
      $ResTotCL=mysql_fetch_array($SqlTotCL); $ResTotSL=mysql_fetch_array($SqlTotSL); $ResTotPL=mysql_fetch_array($SqlTotPL); $ResTotEL=mysql_fetch_array($SqlTotEL); 
	  $ResTotFL=mysql_fetch_array($SqlTotFL); $ResTotTL=mysql_fetch_array($SqlTotTL); $ResTotLeave=mysql_fetch_array($SqlTotLeave); $ResTotOD=mysql_fetch_array($SqlTotOD);
      $ResTotHO=mysql_fetch_array($SqlTotHO); $ResTotPR=mysql_fetch_array($SqlTotPR); $ResTotAP=mysql_fetch_array($SqlTotAP);
      $ResTotWorkDay=mysql_fetch_array($SqlTotWorkDay); $ResTotPaidDay=mysql_fetch_array($SqlTotPaidDay);
	  
	  $CountTotCL=$ResTotCL['TotCL']; $CountTotSL=$ResTotSL['TotSL']; $CountTotPL=$ResTotPL['TotPL']; $CountTotEL=$ResTotEL['TotEL']; $CountTotFL=$ResTotFL['TotOL'];
	  $CountTotTL=$ResTotTL['TotTL']; $CountTotLeave=$ResTotLeave['TotLeave']; $CountTotOD=$ResTotOD['TotOD']; $CountTotHO=$ResTotHO['TotHO']; $CountTotPR=$ResTotPR['TotPR'];
	  $CountTotAP=$ResTotAP['TotAP']; $CountTotWorkDay=$ResTotWorkDay['TotWorkDay']; $CountTotPaidDay=$ResTotPaidDay['TotPaidDay'];
	  
	  $SqlYearAtt=mysql_query("select * from hrm_employee_yearatt where EmployeeID=".$ei." AND Year='".$y."'", $con); 
      $RowYearAtt=mysql_num_rows($SqlYearAtt);
	  if($RowYearAtt==0){ $InsUpYear=mysql_query("insert into hrm_employee_yearatt(YearId,Year,EmployeeID,YearAtt_TotCL,YearAtt_TotSL,YearAtt_TotPL,YearAtt_TotEL,YearAtt_TotOL,YearAtt_TotTL,YearAtt_TotLeave,YearAtt_TotOD,YearAtt_TotHO,YearAtt_TotPR,YearAtt_TotAP,YearAtt_TotWorkDay,YearAtt_TotPaidDay,YearAtt_UpdatedBy,YearAtt_UpdatedDate,YearAtt_UpdatedYearId)values(".$yi.",'".$y."',".$ei.",'".$CountTotCL."','".$CountTotSL."','".$CountTotPL."','".$CountTotEL."','".$CountTotFL."','".$CountTotTL."','".$CountTotLeave."','".$CountTotOD."','".$CountTotHO."','".$CountTotPR."','".$CountTotAP."','".$CountTotWorkDay."','".$CountTotPaidDay."',".$UserId.",'".date("Y-m-d")."',".$yi.")", $con); }
	  if($RowYearAtt>0){ $InsUpYear=mysql_query("UPDATE hrm_employee_yearatt SET YearId=".$yi.", Year='".$y."', EmployeeID=".$ei.", YearAtt_TotCL='".$CountTotCL."', YearAtt_TotSL='".$CountTotSL."', YearAtt_TotPL='".$CountTotPL."', YearAtt_TotEL='".$CountTotEL."', YearAtt_TotOL='".$CountTotFL."', YearAtt_TotTL='".$CountTotTL."', YearAtt_TotLeave='".$CountTotLeave."', YearAtt_TotOD='".$CountTotOD."', YearAtt_TotHO='".$CountTotHO."', YearAtt_TotPR='".$CountTotPR."', YearAtt_TotAP='".$CountTotAP."', YearAtt_TotWorkDay='".$CountTotWorkDay."', YearAtt_TotPaidDay='".$CountTotPaidDay."', YearAtt_UpdatedBy=".$UserId.", YearAtt_UpdatedDate='".date("Y-m-d")."', YearAtt_UpdatedYearId=".$yi." where EmployeeID=".$ei." AND Year='".$y."'", $con); }
	  
	   /********************************************** hrm_employee_finyearatt ***********************************************/
	  $SqlFinCL=mysql_query("select SUM(MonthAtt_TotCL)as FinCL from hrm_employee_monthatt where YearId='".$yi."' AND EmployeeID=".$ei, $con);
	  $SqlFinSL=mysql_query("select SUM(MonthAtt_TotSL)as FinSL from hrm_employee_monthatt where YearId='".$yi."' AND EmployeeID=".$ei, $con);
	  $SqlFinPL=mysql_query("select SUM(MonthAtt_TotPL)as FinPL from hrm_employee_monthatt where YearId='".$yi."' AND EmployeeID=".$ei, $con);
	  $SqlFinEL=mysql_query("select SUM(MonthAtt_TotEL)as FinEL from hrm_employee_monthatt where YearId='".$yi."' AND EmployeeID=".$ei, $con); 
	  $SqlFinFL=mysql_query("select SUM(MonthAtt_TotOL)as FinOL from hrm_employee_monthatt where YearId='".$yi."' AND EmployeeID=".$ei, $con); 
	  $SqlFinTL=mysql_query("select SUM(MonthAtt_TotTL)as FinTL from hrm_employee_monthatt where YearId='".$yi."' AND EmployeeID=".$EMPID, $con);  
	  $SqlFinLeave=mysql_query("select SUM(MonthAtt_TotLeave)as FinLeave from hrm_employee_monthatt where YearId='".$yi."' AND EmployeeID=".$ei, $con);
	  $SqlFinOD=mysql_query("select SUM(MonthAtt_TotOD)as FinOD from hrm_employee_monthatt where YearId='".$yi."' AND EmployeeID=".$ei, $con);
	  $SqlFinHO=mysql_query("select SUM(MonthAtt_TotHO)as FinHO from hrm_employee_monthatt where YearId='".$yi."' AND EmployeeID=".$ei, $con);
	  $SqlFinPR=mysql_query("select SUM(MonthAtt_TotPR)as FinPR from hrm_employee_monthatt where YearId='".$yi."' AND EmployeeID=".$ei, $con);
	  $SqlFinAP=mysql_query("select SUM(MonthAtt_TotAP)as FinAP from hrm_employee_monthatt where YearId='".$yi."' AND EmployeeID=".$ei, $con);
	  $SqlFinWorkDay=mysql_query("select SUM(MonthAtt_TotWorkDay)as FinWorkDay from hrm_employee_monthatt where YearId='".$yi."' AND EmployeeID=".$ei, $con);
	  $SqlFinPaidDay=mysql_query("select SUM(MonthAtt_TotPaidDay)as FinPaidDay from hrm_employee_monthatt where YearId='".$yi."' AND EmployeeID=".$ei, $con);
	  	
      $ResFinCL=mysql_fetch_array($SqlFinCL); $ResFinSL=mysql_fetch_array($SqlFinSL); $ResFinPL=mysql_fetch_array($SqlFinPL);  $ResFinEL=mysql_fetch_array($SqlFinEL); 
	  $ResFinFL=mysql_fetch_array($SqlFinFL); $ResFinTL=mysql_fetch_array($SqlFinTL); $ResFinLeave=mysql_fetch_array($SqlFinLeave); $ResFinOD=mysql_fetch_array($SqlFinOD);
      $ResFinHO=mysql_fetch_array($SqlFinHO); //$ResFinPR=mysql_fetch_array($SqlFinPR); $ResFinAP=mysql_fetch_array($SqlFinAP);
      $ResFinWorkDay=mysql_fetch_array($SqlFinWorkDay); $ResFinPaidDay=mysql_fetch_array($SqlFinPaidDay);
	  
	  $CountFinCL=$ResFinCL['FinCL']; $CountFinSL=$ResFinSL['FinSL']; $CountFinPL=$ResFinPL['FinPL']; $CountFinEL=$ResFinEL['FinEL']; $CountFinFL=$ResFinFL['FinOL'];
	  $CountFinTL=$ResFinTL['FinTL']; $CountFinLeave=$ResFinLeave['FinLeave']; $CountFinOD=$ResFinOD['FinOD']; $CountFinHO=$ResFinHO['FinHO']; $CountFinPR=$ResFinPR['FinPR'];
	  $CountFinAP=$ResFinAP['FinAP']; $CountFinWorkDay=$ResFinWorkDay['FinWorkDay']; $CountFinPaidDay=$ResFinPaidDay['FinPaidDay'];
	  
	  $SqlFinYearAtt=mysql_query("select * from hrm_employee_finyearatt where EmployeeID=".$ei." AND YearId=".$yi, $con); 
      $RowFinYearAtt=mysql_num_rows($SqlFinYearAtt);
	  if($RowFinYearAtt==0){ $InsUpFinYear=mysql_query("insert into hrm_employee_finyearatt(YearId,Year,EmployeeID,FinYearAtt_TotCL,FinYearAtt_TotSL,FinYearAtt_TotPL,FinYearAtt_TotEL,FinYearAtt_TotOL,FinYearAtt_TotTL,FinYearAtt_TotLeave,FinYearAtt_TotOD,FinYearAtt_TotHO,FinYearAtt_TotPR,FinYearAtt_TotAP,FinYearAtt_TotWorkDay,FinYearAtt_TotPaidDay,FinYearAtt_UpdatedBy,FinYearAtt_UpdatedDate,FinYearAtt_UpdatedYearId)values(".$yi.",'".$y."',".$ei.",'".$CountFinCL."','".$CountFinSL."','".$CountFinPL."','".$CountFinEL."','".$CountFinFL."','".$CountFinTL."','".$CountFinLeave."','".$CountFinOD."','".$CountFinHO."','".$CountFinPR."','".$CountFinAP."','".$CountFinWorkDay."','".$CountFinPaidDay."',".$UserId.",'".date("Y-m-d")."',".$yi.")", $con); }
	  if($RowFinYearAtt>0){ $InsUpFinYear=mysql_query("UPDATE hrm_employee_finyearatt SET YearId=".$yi.", Year='".$y."', EmployeeID=".$ei.", FinYearAtt_TotCL='".$CountFinCL."', FinYearAtt_TotSL='".$CountFinSL."', FinYearAtt_TotPL='".$CountFinPL."', FinYearAtt_TotEL='".$CountFinEL."', FinYearAtt_TotOL='".$CountFinFL."', FinYearAtt_TotTL='".$CountFinTL."', FinYearAtt_TotLeave='".$CountFinLeave."', FinYearAtt_TotOD='".$CountFinOD."', FinYearAtt_TotHO='".$CountFinHO."', FinYearAtt_TotPR='".$CountFinPR."', FinYearAtt_TotAP='".$CountFinAP."', FinYearAtt_TotWorkDay='".$CountFinWorkDay."', FinYearAtt_TotPaidDay='".$CountFinPaidDay."', FinYearAtt_UpdatedBy=".$UserId.", FinYearAtt_UpdatedDate='".date("Y-m-d")."', FinYearAtt_UpdatedYearId=".$yi." where EmployeeID=".$ei." AND YearId=".$yi, $con); }
	  
	} 
?>	  
<input type="hidden" id="ei" value="<?php echo $ei; ?>" />
<?php } ?>



