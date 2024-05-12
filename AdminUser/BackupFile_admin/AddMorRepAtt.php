<?php  require_once('config/config.php');
if(isset($_POST['action']) && $_POST['action']=='addMorRep')
{ $ei = $_POST['ei']; $m = $_POST['m']; $y = $_POST['y']; $yi = $_POST['yi'];
  $search =  '"!#$%_' ; $search = str_split($search); 
  $MorRep=str_replace($search, "", $_POST['MorRpt']); 
  
  $YearVV=date("Y", strtotime($_POST['RDate']));
  $BY=date("Y")-1;
  if($YearVV>=date("Y"))
  { $AttTable='hrm_employee_attendance'; $LeaveTable='hrm_employee_monthlyleave_balance'; }
  elseif($YearVV==$BY AND date("m")=='01')
  { $AttTable='hrm_employee_attendance'; $LeaveTable='hrm_employee_monthlyleave_balance'; }
  elseif($YearVV==$BY AND date("m")>1)
  { $AttTable='hrm_employee_attendance_'.$YearVV; $LeaveTable='hrm_employee_monthlyleave_balance_'.$YearVV; }
  else
  { $AttTable='hrm_employee_attendance_'.$YearVV; $LeaveTable='hrm_employee_monthlyleave_balance_'.$YearVV; }
  
  
  $sql=mysql_query("Select MorEveRepId from hrm_employee_moreve_report_".$y." WHERE EmployeeID=".$ei." AND MorEveDate='".$_POST['RDate']."'", $con); $rows = mysql_num_rows($sql); 
  if($rows>0)
  { $sqlUp = mysql_query("UPDATE hrm_employee_moreve_report_".$y." SET MorDateTime='".$_POST['MorDate']."', MorReports='".$MorRep."', Att='".$_POST['Att']."', UpAtt='".$_POST['UpAtt']."' WHERE EmployeeID=".$ei." AND MorEveDate='".$_POST['RDate']."'", $con); }
 else
 { $sqlUp = mysql_query("insert into hrm_employee_moreve_report_".$y."(EmployeeID, MorEveDate, MorDateTime, MorReports, Att, UpAtt) values(".$ei.", '".$_POST['RDate']."', '".$_POST['MorDate']."', '".$MorRep."', '".$_POST['Att']."', '".$_POST['UpAtt']."')", $con); }
 
if($sqlUp AND $_POST['UpAtt']=='Y')
{ 
  if($_POST['Att']!='')
  { 
   if(date("w",strtotime($_POST['RDate']))==0 AND $_POST['Att']=='EL' AND $ei!='' AND $_POST['RDate']!='')
   {   
    $Sql=mysql_query("select * from ".$AttTable." where EmployeeID=".$ei." and AttDate='".$_POST['RDate']."'", $con); $row=mysql_num_rows($Sql);
    if($row==0){ $sIns=mysql_query("insert into ".$AttTable."(EmployeeID,AttValue,AttDate,CheckSunday,Year,YearId)values(".$ei.",'".$_POST['Att']."','".$_POST['RDate']."','Y','".$_POST['Y2']."',".$_POST['YearId2'].")", $con); }elseif($row>0){ $sUp=mysql_query("UPDATE ".$AttTable." SET AttValue='".$_POST['Att']."',CheckSunday='Y' where EmployeeID=".$ei." AND AttDate='".$_POST['RDate']."'", $con);}  
   }
   elseif(date("w",strtotime($_POST['RDate']))!=0 AND $ei!='' AND $_POST['RDate']!='' AND ($_POST['Att']=='P' OR $_POST['Att']=='A' OR $_POST['Att']=='EL' OR $_POST['Att']=='PL' OR $_POST['Att']=='PH' OR $_POST['Att']=='CL' OR $_POST['Att']=='CH' OR $_POST['Att']=='SL' OR $_POST['Att']=='SH' OR $_POST['Att']=='HF' OR $_POST['Att']=='OD' OR $_POST['Att']=='HO' OR $_POST['Att']=='FL' OR $_POST['Att']=='TL')) 
   { 
    $Sql=mysql_query("select * from ".$AttTable." where EmployeeID=".$ei." and AttDate='".$_POST['RDate']."'", $con); $row=mysql_num_rows($Sql);
    if($row==0){ $sIns=mysql_query("insert into ".$AttTable."(EmployeeID,AttValue,AttDate,Year,YearId)values(".$ei.",'".$_POST['Att']."','".$_POST['RDate']."','".$_POST['Y2']."',".$_POST['YearId2'].")", $con);} elseif($row>0){ $sUp=mysql_query("UPDATE hrm_employee_attendance SET AttValue='".$_POST['Att']."' where EmployeeID=".$ei." AND AttDate='".$_POST['RDate']."'", $con); }
    }  
  }
  elseif($_POST['Att']=='' AND $ei!='' AND $_POST['RDate']!='')
  {
   $Sql=mysql_query("select * from ".$AttTable." where EmployeeID=".$ei." and AttDate='".$_POST['RDate']."'", $con); $row=mysql_num_rows($Sql);
   if($row>0){$sUp=mysql_query("delete from ".$AttTable." where EmployeeID=".$ei." AND AttDate='".$_POST['RDate']."' ", $con);} 
  }  

   $Y=$_POST['Y2']; $m=$_POST['M2']; $EMPID=$ei;
   $SqlCL=mysql_query("select count(AttValue)as CL from ".$AttTable." where AttValue='CL' AND EmployeeID=".$EMPID." AND (AttDate between '".date($Y."-".$m."-1")."' AND '".date($Y."-".$m."-31")."')", $con); 
   $SqlCH=mysql_query("select count(AttValue)as CH from ".$AttTable." where AttValue='CH' AND EmployeeID=".$EMPID." AND (AttDate between '".date($Y."-".$m."-1")."' AND '".date($Y."-".$m."-31")."')", $con); 
   $SqlSL=mysql_query("select count(AttValue)as SL from ".$AttTable." where AttValue='SL' AND EmployeeID=".$EMPID." AND (AttDate between '".date($Y."-".$m."-1")."' AND '".date($Y."-".$m."-31")."')", $con); 
   $SqlSH=mysql_query("select count(AttValue)as SH from ".$AttTable." where AttValue='SH' AND EmployeeID=".$EMPID." AND (AttDate between '".date($Y."-".$m."-1")."' AND '".date($Y."-".$m."-31")."')", $con); 
   $SqlPL=mysql_query("select count(AttValue)as PL from ".$AttTable." where AttValue='PL' AND EmployeeID=".$EMPID." AND (AttDate between '".date($Y."-".$m."-1")."' AND '".date($Y."-".$m."-31")."')", $con); 
   $SqlPH=mysql_query("select count(AttValue)as PH from ".$AttTable." where AttValue='PH' AND EmployeeID=".$EMPID." AND (AttDate between '".date($Y."-".$m."-1")."' AND '".date($Y."-".$m."-31")."')", $con); 
   $SqlEL=mysql_query("select count(AttValue)as EL from ".$AttTable." where AttValue='EL' AND EmployeeID=".$EMPID." AND (AttDate between '".date($Y."-".$m."-1")."' AND '".date($Y."-".$m."-31")."')", $con); 
   $SqlFL=mysql_query("select count(AttValue)as FL from ".$AttTable." where AttValue='FL' AND EmployeeID=".$EMPID." AND (AttDate between '".date($Y."-".$m."-1")."' AND '".date($Y."-".$m."-31")."')", $con); 
   $SqlTL=mysql_query("select count(AttValue)as TL from ".$AttTable." where AttValue='TL' AND EmployeeID=".$EMPID." AND (AttDate between '".date($Y."-".$m."-1")."' AND '".date($Y."-".$m."-31")."')", $con); 
   $SqlHf=mysql_query("select count(AttValue)as Hf from ".$AttTable." where AttValue='HF' AND EmployeeID=".$EMPID." AND (AttDate between '".date($Y."-".$m."-1")."' AND '".date($Y."-".$m."-31")."')", $con); 
   
   $SqlAch=mysql_query("select count(DISTINCT AttDate)as ACH from ".$AttTable." where AttValue='ACH' AND EmployeeID=".$EMPID." AND (AttDate between '".date($Y."-".$m."-1")."' AND '".date($Y."-".$m."-31")."')", $con);
   $SqlAsh=mysql_query("select count(DISTINCT AttDate)as ASH from ".$AttTable." where AttValue='ASH' AND EmployeeID=".$EMPID." AND (AttDate between '".date($Y."-".$m."-1")."' AND '".date($Y."-".$m."-31")."')", $con);
   $SqlAph=mysql_query("select count(DISTINCT AttDate)as APH from ".$AttTable." where AttValue='APH' AND EmployeeID=".$EMPID." AND (AttDate between '".date($Y."-".$m."-1")."' AND '".date($Y."-".$m."-31")."')", $con);
   
   $SqlPresent=mysql_query("select count(AttValue)as Present from ".$AttTable." where (AttValue='P' OR AttValue='WFH') AND EmployeeID=".$EMPID." AND (AttDate between '".date($Y."-".$m."-1")."' AND '".date($Y."-".$m."-31")."')", $con); 
   $SqlAbsent=mysql_query("select count(AttValue)as Absent from ".$AttTable." where AttValue='A' AND EmployeeID=".$EMPID." AND (AttDate between '".date($Y."-".$m."-1")."' AND '".date($Y."-".$m."-31")."')", $con); 
   $SqlOnDuties=mysql_query("select count(AttValue)as OnDuties from ".$AttTable." where AttValue='OD' AND EmployeeID=".$EMPID." AND (AttDate between '".date($Y."-".$m."-1")."' AND '".date($Y."-".$m."-31")."')", $con); 
   $SqlHoliday=mysql_query("select count(AttValue)as Holiday from ".$AttTable." where AttValue='HO' AND EmployeeID=".$EMPID." AND (AttDate between '".date($Y."-".$m."-1")."' AND '".date($Y."-".$m."-31")."')", $con); 
   $SqlELSun=mysql_query("select count(CheckSunday)as SUN from ".$AttTable." where CheckSunday='Y' AND EmployeeID=".$EMPID." AND (AttDate between '".date($Y."-".$m."-1")."' AND '".date($Y."-".$m."-31")."')", $con);  
   
   $ResCL=mysql_fetch_array($SqlCL); $ResCH=mysql_fetch_array($SqlCH); $ResSL=mysql_fetch_array($SqlSL); $ResSH=mysql_fetch_array($SqlSH); $ResPH=mysql_fetch_array($SqlPH);
   $ResPL=mysql_fetch_array($SqlPL); $ResEL=mysql_fetch_array($SqlEL); $ResFL=mysql_fetch_array($SqlFL); $ResTL=mysql_fetch_array($SqlTL); $ResHf=mysql_fetch_array($SqlHf); 
   $ResPresent=mysql_fetch_array($SqlPresent); 
   $ResAbsent=mysql_fetch_array($SqlAbsent); $ResOnDuties=mysql_fetch_array($SqlOnDuties); $ResHoliday=mysql_fetch_array($SqlHoliday); 
   $ResELSun=mysql_fetch_array($SqlELSun);
   
   $ResAch=mysql_fetch_array($SqlAch); $ResAsh=mysql_fetch_array($SqlAsh); $ResAph=mysql_fetch_array($SqlAph);
   
   $CountCL=$ResCL['CL']; $CountCH=$ResCH['CH']/2;  
   $CountSL=$ResSL['SL']; $CountSH=$ResSH['SH']/2; 
   $CountPH=$ResPH['PH']/2; 
   $TotalEL=$ResEL['EL']; $TotalFL=$ResFL['FL']; $TotalTL=$ResTL['TL']; 
   
   $CountAch=$ResAch['ACH']/2; $CountAsh=$ResAsh['ASH']/2; $CountAph=$ResAph['APH']/2;
   $TotalCL=$CountCL+$CountCH+$CountAch;
   $TotalSL=$CountSL+$CountSH+$CountAsh;   
   $TotalPL=$ResPL['PL']+$CountPH+$CountAph;
   
   $TotalLeaveCount=$TotalCL+$TotalSL+$TotalPL+$TotalEL+$TotalFL+$TotalTL; 
   $TotELSun=$ResELSun['SUN'];
   $CountHf=$ResHf['Hf']/2; //$CountHf=$ResHf['Hf']/2;  
   $TotalPR=$ResPresent['Present']+$CountCH+$CountSH+$CountPH+$CountHf;  //$TotalPR=$ResPresent['Present']+$CountHf; 
   $TotalAbsent=$ResAbsent['Absent']+$CountHf+$CountAch+$CountAsh+$CountAph;
   $TotalOnDuties=$ResOnDuties['OnDuties']; $TotalHoliday=$ResHoliday['Holiday']; 
   $TotalDayWithSunEL=$TotalPR+$TotalLeaveCount+$TotalOnDuties+$TotalHoliday;
   $TotalPaidDay=$TotalDayWithSunEL-$TotELSun;
   
   $SL=mysql_query("select * from ".$LeaveTable." where EmployeeID=".$EMPID." AND Month='".$m."' AND Year='".$Y."'", $con);  
   $RowL=mysql_num_rows($SL);
   if($RowL>0) 
   { 
   $RL=mysql_fetch_assoc($SL); 
   if($m!=1) { $TotBalCL=$RL['OpeningCL']-$TotalCL; $TotBalSL=$RL['OpeningSL']-$TotalSL; $TotBalPL=$RL['OpeningPL']-$TotalPL; $TotBalEL=$RL['OpeningEL']-$TotalEL; 
	           $TotBalFL=$RL['OpeningOL']-$TotalFL;}  
   if($m==1) { $TotBalCL=$RL['TotCL']-$TotalCL; $TotBalSL=$RL['TotSL']-$TotalSL; $TotBalPL=$RL['TotPL']-$TotalPL; $TotBalEL=$RL['TotEL']-($TotalEL+$RL['EnCashEL']); $TotBalFL=$RL['TotOL']-$TotalFL;}  
   $sUpL=mysql_query("UPDATE ".$LeaveTable." set AvailedCL='".$TotalCL."', AvailedSL='".$TotalSL."', AvailedPL='".$TotalPL."', AvailedEL='".$TotalEL."', AvailedOL='".$TotalFL."', AvailedTL='".$TotalTL."', BalanceCL='".$TotBalCL."', BalanceSL='".$TotBalSL."', BalancePL='".$TotBalPL."', BalanceEL='".$TotBalEL."', BalanceOL='".$TotBalFL."' where EmployeeID=".$EMPID." AND Month='".$m."' AND Year='".$Y."'", $con); 
   }
   
  }

?>	  
<input type="hidden" id="ei" value="<?php echo $ei; ?>" />
<?php } ?>



<?php
if(isset($_POST['action']) && $_POST['action']=='addTimeatt')
{ 
    $dd=intval(date("d",strtotime($_POST['RDate']))); 
	$mm=date("m",strtotime($_POST['RDate'])); $yy=date("Y",strtotime($_POST['RDate']));
    $mkdate = mktime(0,0,0, $mm, 1, $yy);
    $nodinm = date('t',$mkdate);  //Number of days in the given month (28-31)
	
	
	$YearVV=date("Y", strtotime($_POST['RDate']));
    $BY=date("Y")-1;
    if($YearVV>=date("Y"))
	{ $AttTable='hrm_employee_attendance'; $AppLeaveTable='hrm_employee_applyleave';
	  $LeaveTable='hrm_employee_monthlyleave_balance'; }
    elseif($YearVV==$BY AND date("m")=='01')
	{ $AttTable='hrm_employee_attendance'; $AppLeaveTable='hrm_employee_applyleave'; 
	  $LeaveTable='hrm_employee_monthlyleave_balance'; }
    elseif($YearVV==$BY AND date("m")>1)
	{ $AttTable='hrm_employee_attendance_'.$YearVV; $AppLeaveTable='hrm_employee_applyleave_'.$YearVV; 
	  $LeaveTable='hrm_employee_monthlyleave_balance_'.$YearVV; }
    else{$AttTable='hrm_employee_attendance_'.$YearVV; $AppLeaveTable='hrm_employee_applyleave_'.$YearVV; 
	     $LeaveTable='hrm_employee_monthlyleave_balance_'.$YearVV;}
 
    if($_POST['InLate']>0){ if($_POST['InnCnt']=='N'){$InL=0;}else{$InL=1;} }else{ $InL=0; } 
    if($_POST['OutLate']>0){ if($_POST['OuttCnt']=='N'){$OutL=0;}else{$OutL=1;} }else{ $OutL=0; }
    $Late=$InL+$OutL; 
/************************************/
if($Late==0 OR $Late==1)
{   
    //$In=$_POST['inn']; $Out=$_POST['outt']; $aIn=$_POST['aIn']; $aOut=$_POST['aOut'];
    //$In_15 = strtotime(date($_POST['inn'])) + (15 * 60); $nI15=date('H:i:s',$In_15); 
    //$Out_15 = strtotime(date($_POST['outt'])) - (15 * 60); $nO15=date('H:i:s',$Out_15);
	  
	  $aIn=date("H:i",$_POST['aIn']); $aOut=date("H:i",$_POST['aOut']);
	  $In=date("H:i",strtotime($_POST['inn'])); 
	  $In_15 = strtotime(date($_POST['inn'])) + (15 * 60); $nI15=date('H:i',$In_15); 
	  $Out=date("H:i",strtotime($_POST['outt'])); 
	  $Out_15 = strtotime(date($_POST['Outt'])) - (15 * 60); $nO15=date('H:i',$Out_15);
	
    //Check Total CL Availed in month 
	$sCL=mysql_query("select SUM(Apply_TotalDay) as aCL from ".$AppLeaveTable." where LeaveStatus!=4 AND LeaveStatus!=3 AND LeaveStatus!=2 AND EmployeeID=".$_POST['ei']." AND Apply_FromDate>='".date("Y-m-01",strtotime($_POST['RDate']))."' AND Apply_ToDate<='".date("Y-m-31",strtotime($_POST['RDate']))."' AND (Leave_Type='CL' OR Leave_Type='CH')", $con); 
	$ssCL=mysql_query("select Count(AttValue) as aaCL from ".$AttTable." where EmployeeID=".$_POST['ei']." AND AttDate between '".date("Y-m-01",strtotime($_POST['RDate']))."' AND '".date("Y-m-31",strtotime($_POST['RDate']))."' AND AttDate!='".$_POST['RDate']."' AND AttValue='CL'", $con); $rCL=mysql_fetch_array($sCL); $rrCL=mysql_fetch_array($ssCL);
	$ssCH=mysql_query("select Count(AttValue) as aaCH from ".$AttTable." where EmployeeID=".$_POST['ei']." AND AttDate between '".date("Y-m-01",strtotime($_POST['RDate']))."' AND '".date("Y-m-31",strtotime($_POST['RDate']))."' AND AttDate!='".$_POST['RDate']."' AND (AttValue='CH' OR AttValue='ACH')", $con); $rrCH=mysql_fetch_array($ssCH); $CountCH=$rrCH['aaCH']/2; $tCL=$rCL['aCL']+$rrCL['aaCL']+$CountCH;
	//Check Total PL Availed in month
	$sPL=mysql_query("select SUM(Apply_TotalDay) as aPL from ".$AppLeaveTable." where LeaveStatus!=4 AND LeaveStatus!=3 AND LeaveStatus!=2 AND EmployeeID=".$_POST['ei']." AND Apply_FromDate>='".date("Y-m-01",strtotime($_POST['RDate']))."' AND Apply_ToDate<='".date("Y-m-31",strtotime($_POST['RDate']))."' AND (Leave_Type='PL' OR Leave_Type='PH')", $con); 
	$ssPL=mysql_query("select Count(AttValue) as aaPL from ".$AttTable." where EmployeeID=".$_POST['ei']." AND AttDate between '".date("Y-m-01",strtotime($_POST['RDate']))."' AND '".date("Y-m-31",strtotime($_POST['RDate']))."' AND AttDate!='".$_POST['RDate']."' AND AttValue='PL'", $con); $rPL=mysql_fetch_array($sPL); $rrPL=mysql_fetch_array($ssPL);
	$ssPH=mysql_query("select Count(AttValue) as aaPH from ".$AttTable." where EmployeeID=".$_POST['ei']." AND AttDate between '".date("Y-m-01",strtotime($_POST['RDate']))."' AND '".date("Y-m-31",strtotime($_POST['RDate']))."' AND AttDate!='".$_POST['RDate']."' AND (AttValue='PH' OR AttValue='APH')", $con); $rrPH=mysql_fetch_array($ssPH); $CountPH=$rrPH['aaPH']/2; $tPL=$rPL['aPL']+$rrPL['aaPL']+$CountPH;
        //Check Total SL Availed in month 
	  $sSL=mysql_query("select SUM(Apply_TotalDay) as aSL from ".$AppLeaveTable." where LeaveStatus!=4 AND LeaveStatus!=3 AND LeaveStatus!=2 AND EmployeeID=".$_POST['ei']." AND Apply_FromDate>='".date("Y-m-01",strtotime($_POST['RDate']))."' AND Apply_ToDate<='".date("Y-m-31",strtotime($_POST['RDate']))."' AND (Leave_Type='SL' OR Leave_Type='SH')", $con); $rSL=mysql_fetch_array($sSL);
	  $ssSL=mysql_query("select Count(AttValue) as aaSL from ".$AttTable." where EmployeeID=".$_POST['ei']." AND AttDate>='".date("Y-m-01",strtotime($_POST['RDate']))."' AND AttDate<='".date("Y-m-31",strtotime($_POST['RDate']))."' AND AttValue='SL'", $con); $rrSL=mysql_fetch_array($ssSL);
	  $ssSH=mysql_query("select Count(AttValue) as aaSH from ".$AttTable." where EmployeeID=".$_POST['ei']." AND AttDate>='".date("Y-m-01",strtotime($_POST['RDate']))."' AND AttDate<='".date("Y-m-31",strtotime($_POST['RDate']))."' AND (AttValue='SH' OR AttValue='ASH')", $con); $rrSH=mysql_fetch_array($ssSH);
	  $CountSH=$rrSH['aaSH']/2; $tSL=$rSL['aSL']+$rrSL['aaSL']+$CountSH;
        
	//Check Balce CL & PL in month
	$op=mysql_query("select OpeningCL,OpeningPL,OpeningSL,CreditedCL,CreditedPL,CreditedSL from ".$LeaveTable." where EmployeeID=".$_POST['ei']." AND Month='".date("m",strtotime($_POST['RDate']))."' AND Year='".date("Y",strtotime($_POST['RDate']))."'", $con); $rowp=mysql_num_rows($op); $rop=mysql_fetch_array($op); 
	//$balCL=$rop['OpeningCL']-$tCL; $balPL=$rop['OpeningPL']-$tPL;
	if($rowp>0){ $balCL=($rop['OpeningCL']+$rop['CreditedCL'])-$tCL; $balPL=($rop['OpeningPL']+$rop['CreditedPL'])-$tPL; $balSL=($rop['OpeningSL']+$rop['CreditedSL'])-$tSL; }
    else { $Pmm=date('m', strtotime("-1 months", strtotime($_POST['RDate']))); 
	       $Pyy=date('Y', strtotime("-1 months", strtotime($_POST['RDate']))); 
	       $op2=mysql_query("select BalanceCL,BalancePL,BalanceSL from ".$LeaveTable." where EmployeeID=".$_POST['ei']." AND Month='".$Pmm."' AND Year='".$Pyy."'", $con); $rop2=mysql_fetch_array($op2);
	       $balCL=$rop2['BalanceCL']-$tCL; $balPL=$rop2['BalancePL']-$tPL; $balSL=$rop2['BalanceSL']-$tSL; }
	
	$schk=mysql_query("select Leave_Type from ".$AppLeaveTable." where LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$_POST['ei']." AND Apply_FromDate='".$_POST['RDate']."' AND Apply_ToDate='".$_POST['RDate']."' AND (Leave_Type='SH' OR Leave_Type='CH' OR Leave_Type='PH')", $con); $rowchk=mysql_num_rows($schk); $rchk=mysql_fetch_array($schk);
	
	if($rowchk>0){$Lv=$rchk['Leave_Type'];}
	elseif($balCL>0){$Lv='CH';}
	elseif($balPL>0){$Lv='PH';}
        elseif($balSL>0){$Lv='SH';}else{$Lv='HF';}
	
	$sIn=mysql_query("select SUM(InnLate) as ILate from ".$AttTable." where EmployeeID=".$_POST['ei']." AND AttDate>='".date("Y-m-01",strtotime($_POST['RDate']))."' AND AttDate<'".$_POST['RDate']."' AND InnCnt='Y' AND Af15=0",$con);
    $sOut=mysql_query("select SUM(OuttLate) as OLate from ".$AttTable." where EmployeeID=".$_POST['ei']." AND AttDate>='".date("Y-m-01",strtotime($_POST['RDate']))."' AND AttDate<'".$_POST['RDate']."' AND OuttCnt='Y' AND Af15=0",$con);    $rIn=mysql_fetch_assoc($sIn); $rOut=mysql_fetch_assoc($sOut); $tLate=$rIn['ILate']+$rOut['OLate']+$Late;
}
/************************************/
	 if($Late==0){ $Att='P'; $Relax='N'; $Allow='N'; $Af15=0;}
	 elseif($Late==2){ $Att=$_POST['attv']; $Relax=$_POST['relax']; $Allow=$_POST['allow']; $Af15=$_POST['Af15']; }
     elseif($Late==1 AND $_POST['InLate']==1 AND $_POST['OutLate']==1) //A open
     {
      if($_POST['InnCnt']=='Y' AND $_POST['OuttCnt']=='N') //1 Open
	  { 
	    if($aIn>$nI15 OR $aIn=='' OR $aIn=='00:00:00'){$Att=$Lv; $Relax='N'; $Allow='Y'; $Af15=1;}
		elseif($aIn<=$In){$Att='P'; $Relax='N'; $Allow='N'; $Af15=0;}
		elseif($aIn>$In AND $aIn<=$nI15) 
		{
		
		 if($dd!=$nodinm)
         {
          if($tLate<=2){$Att='P'; $Relax='Y'; $Allow='N'; $Af15=0;}
          else
		  {
           if($tLate==3 OR $tLate==4 OR $tLate==6 OR $tLate==7 OR $tLate==9 OR $tLate==10 OR $tLate==12 OR $tLate==13 OR $tLate==15 OR $tLate==16 OR $tLate==18 OR $tLate==19 OR $tLate==21 OR $tLate==22 OR $tLate==24 OR $tLate==25 OR $tLate==27 OR $tLate==28 OR $tLate==30 OR $tLate==31 OR $tLate==33 OR $tLate==34 OR $tLate==36 OR $tLate==37 OR $tLate==39 OR $tLate==40 OR $tLate==42 OR $tLate==43 OR $tLate==45 OR $tLate==46 OR $tLate==48 OR $tLate==49 OR $tLate==51 OR $tLate==52){$Att='P'; $Relax='N'; $Allow='N'; $Af15=0;}
           elseif($tLate==5 OR $tLate==8 OR $tLate==11 OR $tLate==14 OR $tLate==17 OR $tLate==20 OR $tLate==23 OR $tLate==26 OR $tLate==29 OR $tLate==32 OR $tLate==35 OR $tLate==38 OR $tLate==41 OR $tLate==44 OR $tLate==47 OR $tLate==50){$Att=$Lv; $Relax='N'; $Allow='Y'; $Af15=0;}
          }
		 }
		 elseif($dd==$nodinm)
         {
          if($tLate<=2){$Att='P'; $Relax='Y'; $Allow='N'; $Af15=0;}
		  elseif($tLate>2){$Att=$Lv; $Relax='N'; $Allow='Y'; $Af15=0;}
		 }
		
		 /*
		 if($tLate>0 AND $dd==$nodinm){$Att=$Lv; $Relax='N'; $Allow='Y'; $Af15=0;}
         elseif($tLate<=2 AND $dd!=$nodinm){$Att='P'; $Relax='Y'; $Allow='N'; $Af15=0;}
         else
		 {
          if($tLate==3 OR $tLate==4 OR $tLate==6 OR $tLate==7 OR $tLate==9 OR $tLate==10 OR $tLate==12 OR $tLate==13 OR $tLate==15 OR $tLate==16 OR $tLate==18 OR $tLate==19 OR $tLate==21 OR $tLate==22 OR $tLate==24 OR $tLate==25 OR $tLate==27 OR $tLate==28 OR $tLate==30 OR $tLate==31 OR $tLate==33 OR $tLate==34 OR $tLate==36 OR $tLate==37 OR $tLate==39 OR $tLate==40 OR $tLate==42 OR $tLate==43 OR $tLate==45 OR $tLate==46 OR $tLate==48 OR $tLate==49 OR $tLate==51 OR $tLate==52){$Att='P'; $Relax='N'; $Allow='N'; $Af15=0;}
          elseif($tLate==5 OR $tLate==8 OR $tLate==11 OR $tLate==14 OR $tLate==17 OR $tLate==20 OR $tLate==23 OR $tLate==26 OR $tLate==29 OR $tLate==32 OR $tLate==35 OR $tLate==38 OR $tLate==41 OR $tLate==44 OR $tLate==47 OR $tLate==50){$Att=$Lv; $Relax='N'; $Allow='Y'; $Af15=0;}
         }
		 */
	   }
	   
	  } //1 Close
	  if($_POST['InnCnt']=='N' AND $_POST['OuttCnt']=='Y') //2 Open
	  {  
	    if($aOut<$nO15 OR $aOut=='' OR $aOut='00:00:00'){$Att=$Lv; $Relax='N'; $Allow='Y'; $Af15=1;}
		elseif($aOut>=$Out){ $Att='P'; $Relax='N'; $Allow='N'; $Af15=0;}
		elseif($aOut>=$nO15 AND $aOut<$Out)
		{ 
		
		 if($dd!=$nodinm)
         {
		  if($tLate<=2){$Att='P'; $Relax='Y'; $Allow='N'; $Af15=0;}
          else
		  {
           if($tLate==3 OR $tLate==4 OR $tLate==6 OR $tLate==7 OR $tLate==9 OR $tLate==10 OR $tLate==12 OR $tLate==13 OR $tLate==15 OR $tLate==16 OR $tLate==18 OR $tLate==19 OR $tLate==21 OR $tLate==22 OR $tLate==24 OR $tLate==25 OR $tLate==27 OR $tLate==28 OR $tLate==30 OR $tLate==31 OR $tLate==33 OR $tLate==34 OR $tLate==36 OR $tLate==37 OR $tLate==39 OR $tLate==40 OR $tLate==42 OR $tLate==43 OR $tLate==45 OR $tLate==46 OR $tLate==48 OR $tLate==49 OR $tLate==51 OR $tLate==52){$Att='P'; $Relax='N'; $Allow='N'; $Af15=0;}
           elseif($tLate==5 OR $tLate==8 OR $tLate==11 OR $tLate==14 OR $tLate==17 OR $tLate==20 OR $tLate==23 OR $tLate==26 OR $tLate==29 OR $tLate==32 OR $tLate==35 OR $tLate==38 OR $tLate==41 OR $tLate==44 OR $tLate==47 OR $tLate==50){$Att=$Lv; $Relax='N'; $Allow='Y'; $Af15=0;}
          }
		 }
		 elseif($dd==$nodinm)
         {
          if($tLate<=2){$Att='P'; $Relax='Y'; $Allow='N'; $Af15=0;}
		  elseif($tLate>2){$Att=$Lv; $Relax='N'; $Allow='Y'; $Af15=0;}
		 }
		 
		 /*
		 if($tLate>0 AND $dd==$nodinm){$Att=$Lv; $Relax='N'; $Allow='Y'; $Af15=0;}
         elseif($tLate<=2 AND $dd!=$nodinm){$Att='P'; $Relax='Y'; $Allow='N'; $Af15=0;}
         else
		 {
          if($tLate==3 OR $tLate==4 OR $tLate==6 OR $tLate==7 OR $tLate==9 OR $tLate==10 OR $tLate==12 OR $tLate==13 OR $tLate==15 OR $tLate==16 OR $tLate==18 OR $tLate==19 OR $tLate==21 OR $tLate==22 OR $tLate==24 OR $tLate==25 OR $tLate==27 OR $tLate==28 OR $tLate==30 OR $tLate==31 OR $tLate==33 OR $tLate==34 OR $tLate==36 OR $tLate==37 OR $tLate==39 OR $tLate==40 OR $tLate==42 OR $tLate==43 OR $tLate==45 OR $tLate==46 OR $tLate==48 OR $tLate==49 OR $tLate==51 OR $tLate==52){$Att='P'; $Relax='N'; $Allow='N'; $Af15=0;}
          elseif($tLate==5 OR $tLate==8 OR $tLate==11 OR $tLate==14 OR $tLate==17 OR $tLate==20 OR $tLate==23 OR $tLate==26 OR $tLate==29 OR $tLate==32 OR $tLate==35 OR $tLate==38 OR $tLate==41 OR $tLate==44 OR $tLate==47 OR $tLate==50){$Att=$Lv; $Relax='N'; $Allow='Y'; $Af15=0;}
         }
		 */
		
	   } 
	  } //2 Close
	 
	 } ////A close
	 elseif($Late==1 AND (($_POST['InLate']==1 AND $_POST['OutLate']==0) OR ($_POST['InLate']==0 AND $_POST['OutLate']==1))) 
     { // B open
	   $Att=$_POST['attv']; $Relax=$_POST['relax']; $Allow=$_POST['allow']; $Af15=$_POST['Af15']; 
	 } // B close

 $sUp=mysql_query("UPDATE ".$AttTable." SET AttValue='".$Att."', II='".$In.":00', OO='".$Out.":00', InnCnt='".$_POST['InnCnt']."', OuttCnt='".$_POST['OuttCnt']."', Relax='".$Relax."', Allow='".$Allow."', Af15=".$Af15." where AttId=".$_POST['AttId']." AND EmployeeID=".$_POST['ei'], $con);
 
 $NextDate=date("Y-m-d",strtotime('+1 day', strtotime($_POST['RDate'])));
/************************************************/ 	 
 for($i=$NextDate; $i<=date(date("Y",strtotime($_POST['RDate']))."-".date("m",strtotime($_POST['RDate']))."-d"); $i++)
 { 
 
   $d2d=intval(date("d",strtotime($i)));
   $sE=mysql_query("select AttValue,Inn,Outt,InnCnt,OuttCnt,InnLate,OuttLate,Late,Af15 from ".$AttTable." where EmployeeID=".$_POST['ei']." AND AttDate='".$i."'", $con); $rowE=mysql_num_rows($sE); $rE=mysql_fetch_assoc($sE);
   if($rowE>0 AND $rE['Late']>0 AND $rE['Af15']==0 AND (($rE['Inn']!='' AND $rE['Inn']!='00:00' AND $rE['Inn']!='00:00:00') OR ($rE['Outt']!='' AND $rE['Outt']!='00:00' AND $rE['Outt']!='00:00:00')))
   { 
    if(($rE['InnCnt']=='Y' AND $rE['InnLate']==1) OR ($rE['OuttCnt']=='Y' AND $rE['OuttLate']==1))
    {
     $c5=$rE['Inn']; $c7=$rE['Outt'];
/******************* 111111111111 Open ***************/
     if($rE['InnCnt']=='Y' AND $rE['InnLate']==1){$Innlate=1;}else{$Innlate=0;}
	 if($rE['OuttCnt']=='Y' AND $rE['OuttLate']==1){$Outtlate=1;}else{$Outtlate=0;}
	 
	 $tt=$Innlate+$Outtlate; if($tt==1){$Late=1;}elseif($tt==2){$Late=2;}else{$Late=0;}
 
     //Check between 15 minute late in IN/OUT
     $IIn=mysql_query("select SUM(InnLate) as ILate from ".$AttTable." where EmployeeID=".$_POST['ei']." AND AttDate>='".date("Y-m-01",strtotime($_POST['RDate']))."' AND AttDate<'".$i."' AND InnCnt='Y' AND Af15=0",$con); 
     $OOut=mysql_query("select SUM(OuttLate) as OLate from ".$AttTable." where EmployeeID=".$_POST['ei']." AND AttDate>='".date("Y-m-01",strtotime($_POST['RDate']))."' AND AttDate<'".$i."' AND OuttCnt='Y' AND Af15=0",$con); $rrIn=mysql_fetch_assoc($IIn); $rrOut=mysql_fetch_assoc($OOut);
     $tLate=$rrIn['ILate']+$rrOut['OLate']+$tt;	   
     
	if($rE['AttValue']!='CL' AND $rE['AttValue']!='PL' AND $rE['AttValue']!='SL' AND $rE['AttValue']!='EL' AND $rE['AttValue']!='OD' AND $rE['AttValue']!='A')
	{
/************/
    //Check Total CL Availed in month 
	$sCL=mysql_query("select SUM(Apply_TotalDay) as aCL from ".$AppLeaveTable." where LeaveStatus!=4 AND LeaveStatus!=3 AND LeaveStatus!=2 AND EmployeeID=".$_POST['ei']." AND Apply_FromDate>='".date("Y-m-01",strtotime($_POST['RDate']))."' AND Apply_ToDate<='".date("Y-m-31",strtotime($_POST['RDate']))."' AND (Leave_Type='CL' OR Leave_Type='CH')", $con); 
	$ssCL=mysql_query("select Count(AttValue) as aaCL from ".$AttTable." where EmployeeID=".$_POST['ei']." AND AttDate between '".date("Y-m-01",strtotime($_POST['RDate']))."' AND '".date("Y-m-31",strtotime($_POST['RDate']))."' AND AttDate!='".$i."' AND AttValue='CL'", $con); $rCL=mysql_fetch_array($sCL); $rrCL=mysql_fetch_array($ssCL);
	$ssCH=mysql_query("select Count(AttValue) as aaCH from ".$AttTable." where EmployeeID=".$_POST['ei']." AND AttDate between '".date("Y-m-01",strtotime($_POST['RDate']))."' AND '".date("Y-m-31",strtotime($_POST['RDate']))."' AND AttDate!='".$i."' AND (AttValue='CH' OR AttValue='ACH')", $con); $rrCH=mysql_fetch_array($ssCH); $CountCH=$rrCH['aaCH']/2; $tCL=$rCL['aCL']+$rrCL['aaCL']+$CountCH;
	//Check Total PL Availed in month
	$sPL=mysql_query("select SUM(Apply_TotalDay) as aPL from ".$AppLeaveTable." where LeaveStatus!=4 AND LeaveStatus!=3 AND LeaveStatus!=2 AND EmployeeID=".$_POST['ei']." AND Apply_FromDate>='".date("Y-m-01",strtotime($_POST['RDate']))."' AND Apply_ToDate<='".date("Y-m-31",strtotime($_POST['RDate']))."' AND (Leave_Type='PL' OR Leave_Type='PH')", $con); 
	$ssPL=mysql_query("select Count(AttValue) as aaPL from ".$AttTable." where EmployeeID=".$_POST['ei']." AND AttDate between '".date("Y-m-01",strtotime($_POST['RDate']))."' AND '".date("Y-m-31",strtotime($_POST['RDate']))."' AND AttDate!='".$i."' AND AttValue='PL'", $con); $rPL=mysql_fetch_array($sPL); $rrPL=mysql_fetch_array($ssPL);
	$ssPH=mysql_query("select Count(AttValue) as aaPH from ".$AttTable." where EmployeeID=".$_POST['ei']." AND AttDate between '".date("Y-m-01",strtotime($_POST['RDate']))."' AND '".date("Y-m-31",strtotime($_POST['RDate']))."' AND AttDate!='".$i."' AND (AttValue='PH' OR AttValue='APH')", $con); $rrPH=mysql_fetch_array($ssPH); $CountPH=$rrPH['aaPH']/2; $tPL=$rPL['aPL']+$rrPL['aaPL']+$CountPH;
	//Check Total SL Availed in month 
	  $sSL=mysql_query("select SUM(Apply_TotalDay) as aSL from ".$AppLeaveTable." where LeaveStatus!=4 AND LeaveStatus!=3 AND LeaveStatus!=2 AND EmployeeID=".$_POST['ei']." AND Apply_FromDate>='".date("Y-m-01",strtotime($_POST['RDate']))."' AND Apply_ToDate<='".date("Y-m-31",strtotime($_POST['RDate']))."' AND (Leave_Type='SL' OR Leave_Type='SH')", $con); $rSL=mysql_fetch_array($sSL);
	  $ssSL=mysql_query("select Count(AttValue) as aaSL from ".$AttTable." where EmployeeID=".$_POST['ei']." AND AttDate>='".date("Y-m-01",strtotime($_POST['RDate']))."' AND AttDate<='".date("Y-m-31",strtotime($_POST['RDate']))."' AND AttValue='SL'", $con); $rrSL=mysql_fetch_array($ssSL);
	  $ssSH=mysql_query("select Count(AttValue) as aaSH from ".$AttTable." where EmployeeID=".$_POST['ei']." AND AttDate>='".date("Y-m-01",strtotime($_POST['RDate']))."' AND AttDate<='".date("Y-m-31",strtotime($_POST['RDate']))."' AND (AttValue='SH' OR AttValue='ASH')", $con); $rrSH=mysql_fetch_array($ssSH);
	  $CountSH=$rrSH['aaSH']/2; $tSL=$rSL['aSL']+$rrSL['aaSL']+$CountSH;

//Check Balce CL & PL & SL in month
	$op=mysql_query("select OpeningCL,OpeningPL,OpeningSL,CreditedCL,CreditedPL,CreditedSL from ".$LeaveTable." where EmployeeID=".$_POST['ei']." AND Month='".date("m",strtotime($_POST['RDate']))."' AND Year='".date("Y",strtotime($_POST['RDate']))."'", $con); $rop=mysql_fetch_array($op); $rowp=mysql_num_rows($op);
	//$balCL=$rop['OpeningCL']-$tCL; $balPL=$rop['OpeningPL']-$tPL;
	if($rowp>0){ $balCL=($rop['OpeningCL']+$rop['CreditedCL'])-$tCL; $balPL=($rop['OpeningPL']+$rop['CreditedPL'])-$tPL; $balSL=($rop['OpeningSL']+$rop['CreditedSL'])-$tSL; }
    else { $Pmm=date('m', strtotime("-1 months", strtotime($_POST['RDate']))); 
	       $Pyy=date('Y', strtotime("-1 months", strtotime($_POST['RDate']))); 
	       $op2=mysql_query("select BalanceCL,BalancePL,BalanceSL from ".$LeaveTable." where EmployeeID=".$_POST['ei']." AND Month='".$Pmm."' AND Year='".$Pyy."'", $con); $rop2=mysql_fetch_array($op2);
	       $balCL=$rop2['BalanceCL']-$tCL; $balPL=$rop2['BalancePL']-$tPL; $balSL=$rop2['BalanceSL']-$tSL; }	  
	
	$schk=mysql_query("select Leave_Type from ".$AppLeaveTable." where LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$_POST['ei']." AND Apply_FromDate='".$i."' AND Apply_ToDate='".$i."' AND (Leave_Type='SH' OR Leave_Type='CH' OR Leave_Type='PH')", $con); $rowchk=mysql_num_rows($schk); $rchk=mysql_fetch_array($schk);
	
	if($rowchk>0){$Lv=$rchk['Leave_Type'];}
	elseif($balCL>0){$Lv='CH';}
	elseif($balPL>0){$Lv='PH';}
        elseif($balSL>0){$Lv='SH';}else{$Lv='HF';}
/************/   	 
	} //if($rE['AttValue']!='A' AND $rE['AttValue']!='P')
	 
	 
	 if($d2d!=$nodinm)
	 {
	  if($tLate<=2){$Att='P'; $Relax='Y'; $Allow='N';}
      elseif($tLate>2 AND $tt==1)
      {
       if($tLate==3 OR $tLate==4 OR $tLate==6 OR $tLate==7 OR $tLate==9 OR $tLate==10 OR $tLate==12 OR $tLate==13 OR $tLate==15 OR $tLate==16 OR $tLate==18 OR $tLate==19 OR $tLate==21 OR $tLate==22 OR $tLate==24 OR $tLate==25 OR $tLate==27 OR $tLate==28 OR $tLate==30 OR $tLate==31 OR $tLate==33 OR $tLate==34 OR $tLate==36 OR $tLate==37 OR $tLate==39 OR $tLate==40 OR $tLate==42 OR $tLate==43 OR $tLate==45 OR $tLate==46 OR $tLate==48 OR $tLate==49 OR $tLate==51 OR $tLate==52){$Att='P'; $Relax='N'; $Allow='N';}
       elseif($tLate==5 OR $tLate==8 OR $tLate==11 OR $tLate==14 OR $tLate==17 OR $tLate==20 OR $tLate==23 OR $tLate==26 OR $tLate==29 OR $tLate==32 OR $tLate==35 OR $tLate==38 OR $tLate==41 OR $tLate==44 OR $tLate==47 OR $tLate==50){$Att=$Lv; $Relax='N'; $Allow='Y';}
      }
      elseif($tLate>2 AND $tt==2)
      {
       if($tLate==3 OR $tLate==4 OR $tLate==7 OR $tLate==10 OR $tLate==13 OR $tLate==16 OR $tLate==19 OR $tLate==22 OR $tLate==25 OR $tLate==28 OR $tLate==31 OR $tLate==34 OR $tLate==37 OR $tLate==40 OR $tLate==43 OR $tLate==46 OR $tLate==49 OR $tLate==52){$Att='P'; $Relax='N'; $Allow='N';}
       elseif($tLate==5 OR $tLate==6 OR $tLate==8 OR $tLate==9 OR $tLate==11 OR $tLate==12 OR $tLate==14 OR $tLate==15 OR $tLate==17 OR $tLate==18 OR $tLate==20 OR $tLate==21 OR $tLate==23 OR $tLate==24 OR $tLate==26 OR $tLate==27 OR $tLate==29 OR $tLate==30 OR $tLate==32 OR $tLate==33 OR $tLate==35 OR $tLate==36 OR $tLate==38 OR $tLate==39 OR $tLate==41 OR $tLate==42 OR $tLate==44 OR $tLate==45 OR $tLate==47 OR $tLate==48 OR $tLate==50 OR $tLate==51){$Att=$Lv; $Relax='N'; $Allow='Y';}  
      }
	 }
	 elseif($d2d==$nodinm)
	 {
      if($tLate<=2){$Att='P'; $Relax='Y'; $Allow='N';}
	  elseif($tLate>2){$Att=$Lv; $Relax='N'; $Allow='Y';}
	 }
	 
	 /*
	 if($tLate>0 AND $d2d==$nodinm){$Att=$Lv; $Relax='N'; $Allow='Y';}
     elseif($tLate<=2 AND $d2d!=$nodinm){$Att='P'; $Relax='Y'; $Allow='N';}
     elseif($tLate>2 AND $d2d!=$nodinm AND $tt==1)
     {
      if($tLate==3 OR $tLate==4 OR $tLate==6 OR $tLate==7 OR $tLate==9 OR $tLate==10 OR $tLate==12 OR $tLate==13 OR $tLate==15 OR $tLate==16 OR $tLate==18 OR $tLate==19 OR $tLate==21 OR $tLate==22 OR $tLate==24 OR $tLate==25 OR $tLate==27 OR $tLate==28 OR $tLate==30 OR $tLate==31 OR $tLate==33 OR $tLate==34 OR $tLate==36 OR $tLate==37 OR $tLate==39 OR $tLate==40 OR $tLate==42 OR $tLate==43 OR $tLate==45 OR $tLate==46 OR $tLate==48 OR $tLate==49 OR $tLate==51 OR $tLate==52){$Att='P'; $Relax='N'; $Allow='N';}
      elseif($tLate==5 OR $tLate==8 OR $tLate==11 OR $tLate==14 OR $tLate==17 OR $tLate==20 OR $tLate==23 OR $tLate==26 OR $tLate==29 OR $tLate==32 OR $tLate==35 OR $tLate==38 OR $tLate==41 OR $tLate==44 OR $tLate==47 OR $tLate==50){$Att=$Lv; $Relax='N'; $Allow='Y';}
     }
     elseif($tLate>2 AND $d2d!=$nodinm AND $tt==2)
     {
      if($tLate==3 OR $tLate==4 OR $tLate==7 OR $tLate==10 OR $tLate==13 OR $tLate==16 OR $tLate==19 OR $tLate==22 OR $tLate==25 OR $tLate==28 OR $tLate==31 OR $tLate==34 OR $tLate==37 OR $tLate==40 OR $tLate==43 OR $tLate==46 OR $tLate==49 OR $tLate==52){$Att='P'; $Relax='N'; $Allow='N';}
      elseif($tLate==5 OR $tLate==6 OR $tLate==8 OR $tLate==9 OR $tLate==11 OR $tLate==12 OR $tLate==14 OR $tLate==15 OR $tLate==17 OR $tLate==18 OR $tLate==20 OR $tLate==21 OR $tLate==23 OR $tLate==24 OR $tLate==26 OR $tLate==27 OR $tLate==29 OR $tLate==30 OR $tLate==32 OR $tLate==33 OR $tLate==35 OR $tLate==36 OR $tLate==38 OR $tLate==39 OR $tLate==41 OR $tLate==42 OR $tLate==44 OR $tLate==45 OR $tLate==47 OR $tLate==48 OR $tLate==50 OR $tLate==51){$Att=$Lv; $Relax='N'; $Allow='Y';}  
     }
	 */
     
     $UpAtt=mysql_query("update ".$AttTable." set AttValue='".$Att."', Relax='".$Relax."', Allow='".$Allow."' WHERE EmployeeID=".$_POST['ei']." AND AttDate='".$i."'", $con);
/******************* 111111111111 Close **************/    
    } //if(($rE['InnCnt']=='Y' AND $rE['InnLate']==1) OR ($rE['OuttCnt']=='Y' AND $rE['OuttLate']==1))
   } //if($rowE>0 AND $rE['Late']>0 AND $rE['Af15']==0)  
 } //for
/************************************************/
   $mm=date("m",strtotime($_POST['RDate'])); $yy=date("Y",strtotime($_POST['RDate']));
 /**** Leave Update Open ****/
   $SqlCL=mysql_query("select count(AttValue)as CL from ".$AttTable." where AttValue='CL' AND EmployeeID=".$_POST['ei']." AND AttDate between '".$yy."-".$mm."-01' AND '".$yy."-".$mm."-31'", $con); 
   $SqlCH=mysql_query("select count(AttValue)as CH from ".$AttTable." where AttValue='CH' AND EmployeeID=".$_POST['ei']." AND AttDate between '".$yy."-".$mm."-01' AND '".$yy."-".$mm."-31'", $con); 
   $SqlSL=mysql_query("select count(AttValue)as SL from ".$AttTable." where AttValue='SL' AND EmployeeID=".$_POST['ei']." AND AttDate between '".$yy."-".$mm."-01' AND '".$yy."-".$mm."-31'", $con); 
   $SqlSH=mysql_query("select count(AttValue)as SH from ".$AttTable." where AttValue='SH' AND EmployeeID=".$_POST['ei']." AND AttDate between '".$yy."-".$mm."-01' AND '".$yy."-".$mm."-31'", $con); 
   $SqlPL=mysql_query("select count(AttValue)as PL from ".$AttTable." where AttValue='PL' AND EmployeeID=".$_POST['ei']." AND AttDate between '".$yy."-".$mm."-01' AND '".$yy."-".$mm."-31'", $con); 
   $SqlPH=mysql_query("select count(AttValue)as PH from ".$AttTable." where AttValue='PH' AND EmployeeID=".$_POST['ei']." AND AttDate between '".$yy."-".$mm."-01' AND '".$yy."-".$mm."-31'", $con); 
   $SqlEL=mysql_query("select count(AttValue)as EL from ".$AttTable." where AttValue='EL' AND EmployeeID=".$_POST['ei']." AND AttDate between '".$yy."-".$mm."-01' AND '".$yy."-".$mm."-31'", $con); 
   $SqlFL=mysql_query("select count(AttValue)as FL from ".$AttTable." where AttValue='FL' AND EmployeeID=".$_POST['ei']." AND AttDate between '".$yy."-".$mm."-01' AND '".$yy."-".$mm."-31'", $con); 
   $SqlTL=mysql_query("select count(AttValue)as TL from ".$AttTable." where AttValue='TL' AND EmployeeID=".$_POST['ei']." AND AttDate between '".$yy."-".$mm."-01' AND '".$yy."-".$mm."-31'", $con); 
   $SqlHf=mysql_query("select count(AttValue)as Hf from ".$AttTable." where AttValue='HF' AND EmployeeID=".$_POST['ei']." AND AttDate between '".$yy."-".$mm."-01' AND '".$yy."-".$mm."-31'", $con);
   
   $SqlAch=mysql_query("select count(DISTINCT AttDate)as ACH from ".$AttTable." where AttValue='ACH' AND EmployeeID=".$_POST['ei']." AND AttDate between '".$yy."-".$mm."-01' AND '".$yy."-".$mm."-31'", $con);
   $SqlAsh=mysql_query("select count(DISTINCT AttDate)as ASH from ".$AttTable." where AttValue='ASH' AND EmployeeID=".$_POST['ei']." AND AttDate between '".$yy."-".$mm."-01' AND '".$yy."-".$mm."-31'", $con);
   $SqlAph=mysql_query("select count(DISTINCT AttDate)as APH from ".$AttTable." where AttValue='APH' AND EmployeeID=".$_POST['ei']." AND AttDate between '".$yy."-".$mm."-01' AND '".$yy."-".$mm."-31'", $con);
    
   $SqlPresent=mysql_query("select count(AttValue)as Present from ".$AttTable." where (AttValue='P' OR AttValue='WFH') AND EmployeeID=".$_POST['ei']." AND AttDate between '".$yy."-".$mm."-01' AND '".$yy."-".$mm."-31'", $con); 
   $SqlAbsent=mysql_query("select count(AttValue)as Absent from ".$AttTable." where AttValue='A' AND EmployeeID=".$_POST['ei']." AND AttDate between '".$yy."-".$mm."-01' AND '".$yy."-".$mm."-31'", $con); 
   $SqlOnDuties=mysql_query("select count(AttValue)as OnDuties from ".$AttTable." where AttValue='OD' AND EmployeeID=".$_POST['ei']." AND AttDate between '".$yy."-".$mm."-01' AND '".$yy."-".$mm."-31'", $con); 
   $SqlHoliday=mysql_query("select count(AttValue)as Holiday from ".$AttTable." where AttValue='HO' AND EmployeeID=".$_POST['ei']." AND AttDate between '".$yy."-".$mm."-01' AND '".$yy."-".$mm."-31'", $con); 
   $SqlELSun=mysql_query("select count(CheckSunday)as SUN from ".$AttTable." where CheckSunday='Y' AND EmployeeID=".$_POST['ei']." AND AttDate between '".$yy."-".$mm."-01' AND '".$yy."-".$mm."-31'", $con);  
   
   $ResCL=mysql_fetch_array($SqlCL); $ResCH=mysql_fetch_array($SqlCH); $ResSL=mysql_fetch_array($SqlSL); 
   $ResSH=mysql_fetch_array($SqlSH); $ResPH=mysql_fetch_array($SqlPH); $ResPL=mysql_fetch_array($SqlPL); 
   $ResEL=mysql_fetch_array($SqlEL); $ResFL=mysql_fetch_array($SqlFL); $ResTL=mysql_fetch_array($SqlTL); 
   $ResHf=mysql_fetch_array($SqlHf); $ResPresent=mysql_fetch_array($SqlPresent); 
   $ResAbsent=mysql_fetch_array($SqlAbsent); $ResOnDuties=mysql_fetch_array($SqlOnDuties); 
   $ResHoliday=mysql_fetch_array($SqlHoliday); $ResELSun=mysql_fetch_array($SqlELSun);
   $ResAch=mysql_fetch_array($SqlAch); $ResAsh=mysql_fetch_array($SqlAsh); $ResAph=mysql_fetch_array($SqlAph);
   
   $CountCL=$ResCL['CL']; $CountCH=$ResCH['CH']/2; 
   $CountSL=$ResSL['SL']; $CountSH=$ResSH['SH']/2; 
   $CountPH=$ResPH['PH']/2;    
   $CountHf=$ResHf['Hf']/2;
    
   $CountAch=$ResAch['ACH']/2; $CountAsh=$ResAsh['ASH']/2; $CountAph=$ResAph['APH']/2;
   $TotalCL=$CountCL+$CountCH+$CountAch;
   $TotalSL=$CountSL+$CountSH+$CountAsh;   
   $TotalPL=$ResPL['PL']+$CountPH+$CountAph;
	
   $TotalLeaveCount=$TotalCL+$TotalSL+$TotalPL+$ResEL['EL']+$ResFL['FL']+$ResTL['TL']; 
   $TotalPR=$ResPresent['Present']+$CountCH+$CountSH+$CountPH+$CountHf;   
   $TotalAbsent=$ResAbsent['Absent']+$CountHf+$CountAch+$CountAsh+$CountAph;
   $TotalOnDuties=$ResOnDuties['OnDuties']; $TotalHoliday=$ResHoliday['Holiday']; 
   $TotalDayWithSunEL=$TotalPR+$TotalLeaveCount+$TotalOnDuties+$TotalHoliday;
   $TotalPaidDay=$TotalDayWithSunEL-$ResELSun['SUN'];
   
   $SL=mysql_query("select * from ".$LeaveTable." where EmployeeID=".$_POST['ei']." AND Month='".$mm."' AND Year='".$yy."'", $con);  $RowL=mysql_num_rows($SL);
   if($RowL>0)
   { $RL=mysql_fetch_assoc($SL); 
     if($mm!=1)
	 { $TotBalCL=$RL['OpeningCL']-$TotalCL; $TotBalSL=$RL['OpeningSL']-$TotalSL; 
	   $TotBalPL=$RL['OpeningPL']-$TotalPL; $TotBalEL=$RL['OpeningEL']-$TotalEL; 
	   $TotBalFL=$RL['OpeningOL']-$TotalFL;
	 }  
     elseif($mm==1)
	 { $TotBalCL=$RL['TotCL']-$TotalCL; $TotBalSL=$RL['TotSL']-$TotalSL; $TotBalPL=$RL['TotPL']-$TotalPL;  
	   $TotBalEL=$RL['TotEL']-($TotalEL+$RL['EnCashEL']); $TotBalFL=$RL['TotOL']-$TotalFL;
	 }  
   
   $sUpL=mysql_query("UPDATE ".$LeaveTable." set AvailedCL='".$TotalCL."', AvailedSL='".$TotalSL."', AvailedPL='".$TotalPL."', AvailedOL='".$TotalFL."', AvailedTL='".$TotalTL."', BalanceCL='".$TotBalCL."', BalanceSL='".$TotBalSL."', BalancePL='".$TotBalPL."', BalanceOL='".$TotBalFL."' where EmployeeID=".$_POST['ei']." AND Month='".$mm."' AND Year='".$yy."'",$con);
   }
/**** Leave update Close ****/
 
 echo '<input type="hidden" id="ei" value="'.$_POST['ei'].'" />';  
}
?>



