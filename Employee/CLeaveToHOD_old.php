<?php session_start();
if($_SESSION['login'] = true){require_once('../AdminUser/config/config.php');}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('../AdminUser/logcheck.php');
if($_SESSION['logCheckEmp']!=$logemp){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('EmpMenuSession.php');}

if($_REQUEST['lid'] AND $_REQUEST['lid']!='')
{ $Fday=date("d",strtotime($_REQUEST['FD'])); $Fmonth=date("m",strtotime($_REQUEST['FD'])); $Fyear=date("Y",strtotime($_REQUEST['FD']));
  $Tday=date("d",strtotime($_REQUEST['TD'])); $Tmonth=date("m",strtotime($_REQUEST['TD'])); $Tyear=date("Y",strtotime($_REQUEST['TD']));
  $startTimeStamp = strtotime($_REQUEST['FD']); $endTimeStamp = strtotime($_REQUEST['TD']);
  if($Fmonth==01){$DateFmonth=31;} 
  elseif($Fmonth==02){ if($Fyear==2012 OR $Fyear==2016 OR $Fyear==2020 OR $Fyear==2024 OR $Fyear==2028 OR $Fyear==2032) {$DateFmonth=29;}else{$DateFmonth=28;}} 
  elseif($Fmonth==03){$DateFmonth=31;}  elseif($Fmonth==04){$DateFmonth=30;}  elseif($Fmonth==05){$DateFmonth=31;}   elseif($Fmonth==06){$DateFmonth=30;}
  elseif($Fmonth==07){$DateFmonth=31;}  elseif($Fmonth==08){$DateFmonth=31;}  elseif($Fmonth==09){$DateFmonth=30;}   elseif($Fmonth==10){$DateFmonth=31;}
  elseif($Fmonth==11){$DateFmonth=30;}  elseif($Fmonth==12){$DateFmonth=31;} 
   
  if($_REQUEST['LS']!=2)
   { $sqlUp=mysql_query("update hrm_employee_applyleave set LeaveCancelStatus='Y' where ApplyLeaveId=".$_REQUEST['lid'], $con); 
     if($sqlUp){$msg='Leave cancelation successfully...';}
   }
  elseif($_REQUEST['LS']==2) 
  {
/***************************************************************************************************************************/ 
//____________________________  Open ______________________________________________//	
  if($Fmonth==$Tmonth) 
  { for($i=$Fday; $i<=$Tday; $i++) 
    { if(date("w",strtotime(date($Fyear.'-'.$Fmonth.'-'.$i)))!=0) 
	  { 
       $sIns=mysql_query("delete from hrm_employee_attendance where AttValue='".$_REQUEST['LeT']."' AND EmployeeID=".$_REQUEST['EI']." AND AttDate='".date($Fyear.'-'.$Fmonth.'-'.$i)."' AND YearId=".$YearId, $con);
	  } 
	  elseif(date("w",strtotime(date($Fyear.'-'.$Fmonth.'-'.$i)))==0 AND $_REQUEST['LeT']=='EL') 
	  { 
       $sIns=mysql_query("delete from hrm_employee_attendance where AttValue='".$_REQUEST['LeT']."' AND EmployeeID=".$_REQUEST['EI']." AND AttDate='".date($Fyear.'-'.$Fmonth.'-'.$i)."' AND YearId=".$YearId, $con);
	  } 
    }  
  }
  
  elseif($Fmonth!=$Tmonth AND $Fyear==$Tyear)
  { for($i=$Fday; $i<=$DateFmonth; $i++) 
	{ if(date("w",strtotime(date($Fyear.'-'.$Fmonth.'-'.$i)))!=0) 
	  { 
        $sIns=mysql_query("delete from hrm_employee_attendance where AttValue='".$_REQUEST['LeT']."' AND EmployeeID=".$_REQUEST['EI']." AND AttDate='".date($Fyear.'-'.$Fmonth.'-'.$i)."' AND YearId=".$YearId, $con); 
	  }     
	  elseif(date("w",strtotime(date($Fyear.'-'.$Fmonth.'-'.$i)))==0 AND $_REQUEST['LeT']=='EL') 
	  { 
        $sIns=mysql_query("delete from hrm_employee_attendance where AttValue='".$_REQUEST['LeT']."' AND EmployeeID=".$_REQUEST['EI']." AND AttDate='".date($Fyear.'-'.$Fmonth.'-'.$i)."' AND YearId=".$YearId, $con); 
	  }   
	} 
	for($i=1; $i<=$Tday; $i++) 
	{ if(date("w",strtotime(date($Fyear.'-'.$Tmonth.'-'.$i)))!=0) 
	  { 
	   $sIns=mysql_query("delete from hrm_employee_attendance where AttValue='".$_REQUEST['LeT']."' AND EmployeeID=".$_REQUEST['EI']." AND AttDate='".date($Fyear.'-'.$Tmonth.'-'.$i)."' AND YearId=".$YearId, $con); 
	  } 
	  elseif(date("w",strtotime(date($Fyear.'-'.$Tmonth.'-'.$i)))==0 AND $_REQUEST['LeT']=='EL') 
	  { 
	   $sIns=mysql_query("delete from hrm_employee_attendance where AttValue='".$_REQUEST['LeT']."' AND EmployeeID=".$_REQUEST['EI']." AND AttDate='".date($Fyear.'-'.$Tmonth.'-'.$i)."' AND YearId=".$YearId, $con); 
	  } 
	}     
  }
	 
  elseif($Fmonth!=$Tmonth AND $Fyear!=$Tyear)
  { for($i=$Fday; $i<=$DateFmonth; $i++) 
    { if(date("w",strtotime(date($Fyear.'-'.$Fmonth.'-'.$i)))!=0) 
	  { 
	   $sIns=mysql_query("delete from hrm_employee_attendance where AttValue='".$_REQUEST['LeT']."' AND EmployeeID=".$_REQUEST['EI']." AND AttDate='".date($Fyear.'-'.$Fmonth.'-'.$i)."' AND YearId=".$YearId, $con); 
	  } 
	  if(date("w",strtotime(date($Fyear.'-'.$Fmonth.'-'.$i)))==0 AND $_REQUEST['LeT']=='EL') 
	  { 
	   $sIns=mysql_query("delete from hrm_employee_attendance where AttValue='".$_REQUEST['LeT']."' AND EmployeeID=".$_REQUEST['EI']." AND AttDate='".date($Fyear.'-'.$Fmonth.'-'.$i)."' AND YearId=".$YearId, $con); 
	  } 
	}     
	for($i=1; $i<=$Tday; $i++) 
	{ if(date("w",strtotime(date($Tyear.'-'.$Tmonth.'-'.$i)))!=0) 
	  { 
        $sIns=mysql_query("delete from hrm_employee_attendance where AttValue='".$_REQUEST['LeT']."' AND EmployeeID=".$_REQUEST['EI']." AND AttDate='".date($Tyear.'-'.$Tmonth.'-'.$i)."' AND YearId=".$YearId, $con); 
	  }  
	  elseif(date("w",strtotime(date($Tyear.'-'.$Tmonth.'-'.$i)))==0 AND $_REQUEST['LeT']=='EL') 
	  { 
        $sIns=mysql_query("delete from hrm_employee_attendance where AttValue='".$_REQUEST['LeT']."' AND EmployeeID=".$_REQUEST['EI']." AND AttDate='".date($Tyear.'-'.$Tmonth.'-'.$i)."' AND YearId=".$YearId, $con); 
	  } 
	}    
  }
//____________________________  Close ______________________________________________//	
//*************************************** Update hrm_employee_leave Table OPEN*******************************************//  
if($sIns)
{
$m=date("m");	$id=$_REQUEST['EI'];	 
if($m==1 OR $m==3 OR $m==5 OR $m==7 OR $m==8 OR $m==10 OR $m==12){ 
$SqlCL=mysql_query("select count(AttValue)as CL from hrm_employee_attendance where AttValue='CL' AND EmployeeID=".$id." AND (AttDate between '".date("Y-".$m."-1")."' AND '".date("Y-".$m."-31")."')");
$SqlCH=mysql_query("select count(AttValue)as CH from hrm_employee_attendance where AttValue='CH' AND EmployeeID=".$id." AND (AttDate between '".date("Y-".$m."-1")."' AND '".date("Y-".$m."-31")."')");
$SqlSL=mysql_query("select count(AttValue)as SL from hrm_employee_attendance where AttValue='SL' AND EmployeeID=".$id." AND (AttDate between '".date("Y-".$m."-1")."' AND '".date("Y-".$m."-31")."')");
$SqlSH=mysql_query("select count(AttValue)as SH from hrm_employee_attendance where AttValue='SH' AND EmployeeID=".$id." AND (AttDate between '".date("Y-".$m."-1")."' AND '".date("Y-".$m."-31")."')");
$SqlPL=mysql_query("select count(AttValue)as PL from hrm_employee_attendance where AttValue='PL' AND EmployeeID=".$id." AND (AttDate between '".date("Y-".$m."-1")."' AND '".date("Y-".$m."-31")."')");
$SqlEL=mysql_query("select count(AttValue)as EL from hrm_employee_attendance where AttValue='EL' AND EmployeeID=".$id." AND (AttDate between '".date("Y-".$m."-1")."' AND '".date("Y-".$m."-31")."')");
$SqlFL=mysql_query("select count(AttValue)as FL from hrm_employee_attendance where AttValue='FL' AND EmployeeID=".$id." AND (AttDate between '".date("Y-".$m."-1")."' AND '".date("Y-".$m."-31")."')");
$SqlTL=mysql_query("select count(AttValue)as TL from hrm_employee_attendance where AttValue='TL' AND EmployeeID=".$id." AND (AttDate between '".date("Y-".$m."-1")."' AND '".date("Y-".$m."-31")."')");
$SqlHf=mysql_query("select count(AttValue)as Hf from hrm_employee_attendance where AttValue='HF' AND EmployeeID=".$id." AND (AttDate between '".date("Y-".$m."-1")."' AND '".date("Y-".$m."-31")."')");
$SqlPresent=mysql_query("select count(AttValue)as Present from hrm_employee_attendance where AttValue='P' AND EmployeeID=".$id." AND (AttDate between '".date("Y-".$m."-1")."' AND '".date("Y-".$m."-31")."')");
$SqlAbsent=mysql_query("select count(AttValue)as Absent from hrm_employee_attendance where AttValue='A' AND EmployeeID=".$id." AND (AttDate between '".date("Y-".$m."-1")."' AND '".date("Y-".$m."-31")."')");
$SqlOnDuties=mysql_query("select count(AttValue)as OnDuties from hrm_employee_attendance where AttValue='OD' AND EmployeeID=".$id." AND (AttDate between '".date("Y-".$m."-1")."' AND '".date("Y-".$m."-31")."')");
$SqlHoliday=mysql_query("select count(AttValue)as Holiday from hrm_employee_attendance where AttValue='HO' AND EmployeeID=".$id." AND (AttDate between '".date("Y-".$m."-1")."' AND '".date("Y-".$m."-31")."')"); 
$SqlELSun=mysql_query("select count(CheckSunday)as SUN from hrm_employee_attendance where CheckSunday='Y' AND EmployeeID=".$id." AND (AttDate between '".date("Y-".$m."-1")."' AND '".date("Y-".$m."-31")."')", $con);} 
	 
elseif($m==2){ if(date("Y")==2012 OR date("Y")==2016 OR date("Y")==2020 OR date("Y")==2024 OR date("Y")==2028 OR date("Y")==2032 OR date("Y")==2036 OR date("Y")==2040) { $day=29; } 
else { $day=28;}
$SqlCL=mysql_query("select count(AttValue)as CL from hrm_employee_attendance where AttValue='CL' AND EmployeeID=".$id." AND (AttDate between '".date("Y-".$m."-1")."' AND '".date("Y-".$m."-".$day)."')");
$SqlCH=mysql_query("select count(AttValue)as CH from hrm_employee_attendance where AttValue='CH' AND EmployeeID=".$id." AND (AttDate between '".date("Y-".$m."-1")."' AND '".date("Y-".$m."-".$day)."')");
$SqlSL=mysql_query("select count(AttValue)as SL from hrm_employee_attendance where AttValue='SL' AND EmployeeID=".$id." AND (AttDate between '".date("Y-".$m."-1")."' AND '".date("Y-".$m."-".$day)."')");
$SqlSH=mysql_query("select count(AttValue)as SH from hrm_employee_attendance where AttValue='SH' AND EmployeeID=".$id." AND (AttDate between '".date("Y-".$m."-1")."' AND '".date("Y-".$m."-".$day)."')");
$SqlPL=mysql_query("select count(AttValue)as PL from hrm_employee_attendance where AttValue='PL' AND EmployeeID=".$id." AND (AttDate between '".date("Y-".$m."-1")."' AND '".date("Y-".$m."-".$day)."')");
$SqlEL=mysql_query("select count(AttValue)as EL from hrm_employee_attendance where AttValue='EL' AND EmployeeID=".$id." AND (AttDate between '".date("Y-".$m."-1")."' AND '".date("Y-".$m."-".$day)."')");
$SqlFL=mysql_query("select count(AttValue)as FL from hrm_employee_attendance where AttValue='FL' AND EmployeeID=".$id." AND (AttDate between '".date("Y-".$m."-1")."' AND '".date("Y-".$m."-".$day)."')");
$SqlTL=mysql_query("select count(AttValue)as TL from hrm_employee_attendance where AttValue='TL' AND EmployeeID=".$id." AND (AttDate between '".date("Y-".$m."-1")."' AND '".date("Y-".$m."-".$day)."')");
$SqlHf=mysql_query("select count(AttValue)as Hf from hrm_employee_attendance where AttValue='HF' AND EmployeeID=".$id." AND (AttDate between '".date("Y-".$m."-1")."' AND '".date("Y-".$m."-".$day)."')");
$SqlPresent=mysql_query("select count(AttValue)as Present from hrm_employee_attendance where AttValue='P' AND EmployeeID=".$id." AND (AttDate between '".date("Y-".$m."-1")."' AND '".date("Y-".$m."-".$day)."')");
$SqlAbsent=mysql_query("select count(AttValue)as Absent from hrm_employee_attendance where AttValue='A' AND EmployeeID=".$id." AND (AttDate between '".date("Y-".$m."-1")."' AND '".date("Y-".$m."-".$day)."')");
$SqlOnDuties=mysql_query("select count(AttValue)as OnDuties from hrm_employee_attendance where AttValue='OD' AND EmployeeID=".$id." AND (AttDate between '".date("Y-".$m."-1")."' AND '".date("Y-".$m."-".$day)."')");
$SqlHoliday=mysql_query("select count(AttValue)as Holiday from hrm_employee_attendance where AttValue='HO' AND EmployeeID=".$id." AND (AttDate between '".date("Y-".$m."-1")."' AND '".date("Y-".$m."-".$day)."')"); 
$SqlELSun=mysql_query("select count(CheckSunday)as SUN from hrm_employee_attendance where CheckSunday='Y' AND EmployeeID=".$id." AND (AttDate between '".date("Y-".$m."-1")."' AND '".date("Y-".$m."-".$day)."')", $con);} 
	  
elseif($m==4 OR $m==6 OR $m==9 OR $m==11){ 
$SqlCL=mysql_query("select count(AttValue)as CL from hrm_employee_attendance where AttValue='CL' AND EmployeeID=".$id." AND (AttDate between '".date("Y-".$m."-1")."' AND '".date("Y-".$m."-30")."')");
$SqlCH=mysql_query("select count(AttValue)as CH from hrm_employee_attendance where AttValue='CH' AND EmployeeID=".$id." AND (AttDate between '".date("Y-".$m."-1")."' AND '".date("Y-".$m."-30")."')");
$SqlSL=mysql_query("select count(AttValue)as SL from hrm_employee_attendance where AttValue='SL' AND EmployeeID=".$id." AND (AttDate between '".date("Y-".$m."-1")."' AND '".date("Y-".$m."-30")."')");
$SqlSH=mysql_query("select count(AttValue)as SH from hrm_employee_attendance where AttValue='SH' AND EmployeeID=".$id." AND (AttDate between '".date("Y-".$m."-1")."' AND '".date("Y-".$m."-30")."')");
$SqlPL=mysql_query("select count(AttValue)as PL from hrm_employee_attendance where AttValue='PL' AND EmployeeID=".$id." AND (AttDate between '".date("Y-".$m."-1")."' AND '".date("Y-".$m."-30")."')");
$SqlEL=mysql_query("select count(AttValue)as EL from hrm_employee_attendance where AttValue='EL' AND EmployeeID=".$id." AND (AttDate between '".date("Y-".$m."-1")."' AND '".date("Y-".$m."-30")."')");
$SqlFL=mysql_query("select count(AttValue)as FL from hrm_employee_attendance where AttValue='FL' AND EmployeeID=".$id." AND (AttDate between '".date("Y-".$m."-1")."' AND '".date("Y-".$m."-30")."')");
$SqlTL=mysql_query("select count(AttValue)as TL from hrm_employee_attendance where AttValue='TL' AND EmployeeID=".$id." AND (AttDate between '".date("Y-".$m."-1")."' AND '".date("Y-".$m."-30")."')");
$SqlHf=mysql_query("select count(AttValue)as Hf from hrm_employee_attendance where AttValue='HF' AND EmployeeID=".$id." AND (AttDate between '".date("Y-".$m."-1")."' AND '".date("Y-".$m."-30")."')");
$SqlPresent=mysql_query("select count(AttValue)as Present from hrm_employee_attendance where AttValue='P' AND EmployeeID=".$id." AND (AttDate between '".date("Y-".$m."-1")."' AND '".date("Y-".$m."-30")."')");
$SqlAbsent=mysql_query("select count(AttValue)as Absent from hrm_employee_attendance where AttValue='A' AND EmployeeID=".$id." AND (AttDate between '".date("Y-".$m."-1")."' AND '".date("Y-".$m."-30")."')");
$SqlOnDuties=mysql_query("select count(AttValue)as OnDuties from hrm_employee_attendance where AttValue='OD' AND EmployeeID=".$id." AND (AttDate between '".date("Y-".$m."-1")."' AND '".date("Y-".$m."-30")."')");
$SqlHoliday=mysql_query("select count(AttValue)as Holiday from hrm_employee_attendance where AttValue='HO' AND EmployeeID=".$id." AND (AttDate between '".date("Y-".$m."-1")."' AND '".date("Y-".$m."-30")."')"); 
$SqlELSun=mysql_query("select count(CheckSunday)as SUN from hrm_employee_attendance where CheckSunday='Y' AND EmployeeID=".$id." AND (AttDate between '".date("Y-".$m."-1")."' AND '".date("Y-".$m."-30")."')", $con);} 

   $ResCL=mysql_fetch_array($SqlCL); $ResCH=mysql_fetch_array($SqlCH); $ResSL=mysql_fetch_array($SqlSL); $ResSH=mysql_fetch_array($SqlSH);
   $ResPL=mysql_fetch_array($SqlPL); $ResEL=mysql_fetch_array($SqlEL); $ResFL=mysql_fetch_array($SqlFL); $ResTL=mysql_fetch_array($SqlTL); $ResHf=mysql_fetch_array($SqlHf); 
   $ResPresent=mysql_fetch_array($SqlPresent); $ResAbsent=mysql_fetch_array($SqlAbsent); $ResOnDuties=mysql_fetch_array($SqlOnDuties); $ResHoliday=mysql_fetch_array($SqlHoliday); 
   $ResELSun=mysql_fetch_array($SqlELSun);

   $CountCL=$ResCL['CL']; $CountCH=$ResCH['CH']/2; $TotalCL=$CountCL+$CountCH; $CountSL=$ResSL['SL']; $CountSH=$ResSH['SH']/2; $TotalSL=$CountSL+$CountSH;
   $TotalPL=$ResPL['PL']; $TotalEL=$ResEL['EL']; $TotalFL=$ResFL['FL']; $TotalTL=$ResTL['TL']; $TotalLeaveCount=$TotalCL+$TotalSL+$TotalPL+$TotalEL+$TotalFL+$TotalTL; 
   $TotELSun=$ResELSun['SUN'];
   $CountHf=$ResHf['Hf']/2;  
   $TotalPR=$ResPresent['Present']+$CountCH+$CountSH+$CountHf; //$TotalPR=$ResPresent['Present']+$CountHf;  
   $TotalAbsent=$ResAbsent['Absent']+$CountHf;
   $TotalOnDuties=$ResOnDuties['OnDuties']; $TotalHoliday=$ResHoliday['Holiday']; 
   
   $TotalDayWithSunEL=$TotalPR+$TotalLeaveCount+$TotalOnDuties+$TotalHoliday;

   $TotalPaidDay=$TotalDayWithSunEL-$TotELSun;
   $TotalWorkingDay=26;
   
    /********************************************** hrm_employee_monthlyleave_balance open***********************************************/
	  $SL=mysql_query("select * from hrm_employee_monthlyleave_balance where EmployeeID=".$id." AND Month='".$m."' AND Year='".date("Y")."'");  
	  $RowL=mysql_num_rows($SL);
	  if($RowL>0) { $RL=mysql_fetch_assoc($SL);   
	  if($m!=1) { $TotBalCL=$RL['OpeningCL']-$TotalCL;  $TotBalSL=$RL['OpeningSL']-$TotalSL; $TotBalPL=$RL['OpeningPL']-$TotalPL;  $TotBalEL=$RL['OpeningEL']-$TotalEL;
	              $TotBalFL=$RL['OpeningOL']-$TotalFL; }  
      if($m==1) { $TotBalCL=$RL['TotCL']-$TotalCL;  $TotBalSL=$RL['TotSL']-$TotalSL; $TotBalPL=$RL['TotPL']-$TotalPL;  $TotBalEL=$RL['TotEL']-$TotalEL;
	              $TotBalFL=$RL['TotOL']-$TotalFL; }
	  $sUpL=mysql_query("UPDATE hrm_employee_monthlyleave_balance set AvailedCL='".$TotalCL."', AvailedSL='".$TotalSL."', AvailedPL='".$TotalPL."', AvailedEL='".$TotalEL."', AvailedOL='".$TotalFL."', AvailedTL='".$TotalTL."', BalanceCL='".$TotBalCL."', BalanceSL='".$TotBalSL."', BalancePL='".$TotBalPL."', BalanceEL='".$TotBalEL."', BalanceOL='".$TotBalFL."' where EmployeeID=".$id." AND Month='".$m."' AND Year='".date("Y")."'", $con); }
	  /********************************************** hrm_employee_monthlyleave_balance close ***********************************************/

/********************************************** hrm_employee_monthatt ***********************************************/  
   $SqlMonthLeave=mysql_query("select * from hrm_employee_monthatt where EmployeeID=".$id." AND Month=".$m." AND Year='".date("Y")."'"); 
   $RowMonthLeave=mysql_num_rows($SqlMonthLeave);
   if($RowMonthLeave==0){ $InsUpMonth=mysql_query("insert into hrm_employee_monthatt(YearId,Year,EmployeeID,Month,MonthAtt_TotCL,MonthAtt_TotSL,MonthAtt_TotPL,MonthAtt_TotEL,MonthAtt_TotOL,MonthAtt_TotTL,MonthAtt_TotLeave,MonthAtt_TotOD,MonthAtt_TotHO,MonthAtt_TotPR,MonthAtt_TotAP,MonthAtt_TotWorkDay,MonthAtt_TotPaidDay,MonthAtt_UpdatedDate,MonthAtt_UpdatedYearId)values(".$YearId.",'".date("Y")."',".$id.",".$m.",'".$TotalCL."','".$TotalSL."','".$TotalPL."','".$TotalEL."','".$TotalFL."','".$TotalTL."','".$TotalLeaveCount."','".$TotalOnDuties."','".$TotalHoliday."','".$TotalPR."','".$TotalAbsent."','".$TotalWorkingDay."','".$TotalPaidDay."','".date("Y-m-d")."',".$YearId.")");}
   if($RowMonthLeave>0){ $InsUpMonth=mysql_query("UPDATE hrm_employee_monthatt SET YearId=".$YearId.", Year='".date("Y")."', EmployeeID=".$id.", Month=".$m.", MonthAtt_TotCL='".$TotalCL."', MonthAtt_TotSL='".$TotalSL."', MonthAtt_TotPL='".$TotalPL."', MonthAtt_TotEL='".$TotalEL."', MonthAtt_TotOL='".$TotalFL."', MonthAtt_TotTL='".$TotalTL."', MonthAtt_TotLeave='".$TotalLeaveCount."', MonthAtt_TotOD='".$TotalOnDuties."', MonthAtt_TotHO='".$TotalHoliday."', MonthAtt_TotPR='".$TotalPR."', MonthAtt_TotAP='".$TotalAbsent."', MonthAtt_TotWorkDay='".$TotalWorkingDay."', MonthAtt_TotPaidDay='".$TotalPaidDay."', MonthAtt_UpdatedDate='".date("Y-m-d")."', MonthAtt_UpdatedYearId=".$YearId." where EmployeeID=".$id." AND Month=".$m." AND Year='".date("Y")."'");}
  
  if($InsUpMonth) 
    {  
	 /********************************************** hrm_employee_yearatt open ***********************************************/
	  $SqlTotCL=mysql_query("select SUM(MonthAtt_TotCL)as TotCL from hrm_employee_monthatt where Year='".date("Y")."' AND EmployeeID=".$id);
	  $SqlTotSL=mysql_query("select SUM(MonthAtt_TotSL)as TotSL from hrm_employee_monthatt where Year='".date("Y")."' AND EmployeeID=".$id);
	  $SqlTotPL=mysql_query("select SUM(MonthAtt_TotPL)as TotPL from hrm_employee_monthatt where Year='".date("Y")."' AND EmployeeID=".$id);
	  $SqlTotEL=mysql_query("select SUM(MonthAtt_TotEL)as TotEL from hrm_employee_monthatt where Year='".date("Y")."' AND EmployeeID=".$id); 
	  $SqlTotFL=mysql_query("select SUM(MonthAtt_TotOL)as TotOL from hrm_employee_monthatt where Year='".date("Y")."' AND EmployeeID=".$id); 
	  $SqlTotTL=mysql_query("select SUM(MonthAtt_TotTL)as TotTL from hrm_employee_monthatt where Year='".date("Y")."' AND EmployeeID=".$id); 
	  $SqlTotLeave=mysql_query("select SUM(MonthAtt_TotLeave)as TotLeave from hrm_employee_monthatt where Year='".date("Y")."' AND EmployeeID=".$id);
	  $SqlTotOD=mysql_query("select SUM(MonthAtt_TotOD)as TotOD from hrm_employee_monthatt where Year='".date("Y")."' AND EmployeeID=".$id);
	  $SqlTotHO=mysql_query("select SUM(MonthAtt_TotHO)as TotHO from hrm_employee_monthatt where Year='".date("Y")."' AND EmployeeID=".$id);
	  $SqlTotPR=mysql_query("select SUM(MonthAtt_TotPR)as TotPR from hrm_employee_monthatt where Year='".date("Y")."' AND EmployeeID=".$id);
	  $SqlTotAP=mysql_query("select SUM(MonthAtt_TotAP)as TotAP from hrm_employee_monthatt where Year='".date("Y")."' AND EmployeeID=".$id);
	  $SqlTotWorkDay=mysql_query("select SUM(MonthAtt_TotWorkDay)as TotWorkDay from hrm_employee_monthatt where Year='".date("Y")."' AND EmployeeID=".$id);
	  $SqlTotPaidDay=mysql_query("select SUM(MonthAtt_TotPaidDay)as TotPaidDay from hrm_employee_monthatt where Year='".date("Y")."' AND EmployeeID=".$id); 
	  	
      $ResTotCL=mysql_fetch_array($SqlTotCL); $ResTotSL=mysql_fetch_array($SqlTotSL); $ResTotPL=mysql_fetch_array($SqlTotPL);  $ResTotEL=mysql_fetch_array($SqlTotEL); 
	  $ResTotFL=mysql_fetch_array($SqlTotFL); $ResTotTL=mysql_fetch_array($SqlTotTL); $ResTotLeave=mysql_fetch_array($SqlTotLeave); $ResTotOD=mysql_fetch_array($SqlTotOD);
      $ResTotHO=mysql_fetch_array($SqlTotHO); $ResTotPR=mysql_fetch_array($SqlTotPR); $ResTotAP=mysql_fetch_array($SqlTotAP);
      $ResTotWorkDay=mysql_fetch_array($SqlTotWorkDay); $ResTotPaidDay=mysql_fetch_array($SqlTotPaidDay);
	  
	  $CountTotCL=$ResTotCL['TotCL']; $CountTotSL=$ResTotSL['TotSL']; $CountTotPL=$ResTotPL['TotPL']; $CountTotEL=$ResTotEL['TotEL']; $CountTotFL=$ResTotFL['TotOL'];
	  $CountTotTL=$ResTotTL['TotTL']; $CountTotLeave=$ResTotLeave['TotLeave']; $CountTotOD=$ResTotOD['TotOD']; $CountTotHO=$ResTotHO['TotHO']; $CountTotPR=$ResTotPR['TotPR'];
	  $CountTotAP=$ResTotAP['TotAP']; $CountTotWorkDay=$ResTotWorkDay['TotWorkDay']; $CountTotPaidDay=$ResTotPaidDay['TotPaidDay'];
	  
	  $SqlYearAtt=mysql_query("select * from hrm_employee_yearatt where EmployeeID=".$id." AND Year='".date("Y")."'"); 
      $RowYearAtt=mysql_num_rows($SqlYearAtt);
	  if($RowYearAtt==0){ $InsUpYear=mysql_query("insert into hrm_employee_yearatt(YearId,Year,EmployeeID,YearAtt_TotCL,YearAtt_TotSL,YearAtt_TotPL,YearAtt_TotEL,YearAtt_TotOL,YearAtt_TotTL,YearAtt_TotLeave,YearAtt_TotOD,YearAtt_TotHO,YearAtt_TotPR,YearAtt_TotAP,YearAtt_TotWorkDay,YearAtt_TotPaidDay,YearAtt_UpdatedDate,YearAtt_UpdatedYearId)values(".$YearId.",'".date("Y")."',".$id.",'".$CountTotCL."','".$CountTotSL."','".$CountTotPL."','".$CountTotEL."','".$CountTotFL."','".$CountTotTL."','".$CountTotLeave."','".$CountTotOD."','".$CountTotHO."','".$CountTotPR."','".$CountTotAP."','".$CountTotWorkDay."','".$CountTotPaidDay."','".date("Y-m-d")."',".$YearId.")"); }
	  if($RowYearAtt>0){ $InsUpYear=mysql_query("UPDATE hrm_employee_yearatt SET YearId=".$YearId.", Year='".date("Y")."', EmployeeID=".$id.", YearAtt_TotCL='".$CountTotCL."', YearAtt_TotSL='".$CountTotSL."', YearAtt_TotPL='".$CountTotPL."', YearAtt_TotEL='".$CountTotEL."', YearAtt_TotOL='".$CountTotFL."', YearAtt_TotTL='".$CountTotTL."', YearAtt_TotLeave='".$CountTotLeave."', YearAtt_TotOD='".$CountTotOD."', YearAtt_TotHO='".$CountTotHO."', YearAtt_TotPR='".$CountTotPR."', YearAtt_TotAP='".$CountTotAP."', YearAtt_TotWorkDay='".$CountTotWorkDay."', YearAtt_TotPaidDay='".$CountTotPaidDay."', YearAtt_UpdatedDate='".date("Y-m-d")."', YearAtt_UpdatedYearId=".$YearId." where EmployeeID=".$id." AND Year='".date("Y")."'"); }
	  
	  /********************************************** hrm_employee_leave open ***********************************************/
	  //$SL=mysql_query("select * from hrm_employee_leave where EmployeeID=".$id." AND Year='".date("Y")."'");  $RowL=mysql_num_rows($SL);
	  //if($RowL>0) { $RL=mysql_fetch_assoc($SL);   
	                //$TotBalCL=$RL['Emp_TotalCL']-$CountTotCL;  $TotBalSL=$RL['Emp_TotalSL']-$CountTotSL;  
	                //$TotBalPL=$RL['Emp_TotalPL']-$CountTotPL;  $TotBalEL=$RL['Emp_TotalEL']-$CountTotEL;
	  //$sUpL=mysql_query("UPDATE hrm_employee_leave set Emp_AvailedCL='".$CountTotCL."', Emp_AvailedSL='".$CountTotSL."', Emp_AvailedPL='".$CountTotPL."', Emp_AvailedEL='".$CountTotEL."', Emp_BalanceCL='".$TotBalCL."', Emp_BalanceSL='".$TotBalSL."', Emp_BalancePL='".$TotBalPL."', Emp_BalanceEL='".$TotBalEL."' where EmployeeID=".$id." AND Year='".date("Y")."' AND Status='A'", $con); }
	  /********************************************** hrm_employee_leave close ***********************************************/
	  
	   /********************************************** hrm_employee_finyearatt open***********************************************/
	  $SqlFinCL=mysql_query("select SUM(MonthAtt_TotCL)as FinCL from hrm_employee_monthatt where YearId='".$YearId."' AND EmployeeID=".$id);
	  $SqlFinSL=mysql_query("select SUM(MonthAtt_TotSL)as FinSL from hrm_employee_monthatt where YearId='".$YearId."' AND EmployeeID=".$id);
	  $SqlFinPL=mysql_query("select SUM(MonthAtt_TotPL)as FinPL from hrm_employee_monthatt where YearId='".$YearId."' AND EmployeeID=".$id);
	  $SqlFinEL=mysql_query("select SUM(MonthAtt_TotEL)as FinEL from hrm_employee_monthatt where YearId='".$YearId."' AND EmployeeID=".$id); 
	  $SqlFinFL=mysql_query("select SUM(MonthAtt_TotOL)as FinOL from hrm_employee_monthatt where YearId='".$YearId."' AND EmployeeID=".$id); 
	  $SqlFinTL=mysql_query("select SUM(MonthAtt_TotTL)as FinTL from hrm_employee_monthatt where YearId='".$YearId."' AND EmployeeID=".$id);
	  $SqlFinLeave=mysql_query("select SUM(MonthAtt_TotLeave)as FinLeave from hrm_employee_monthatt where YearId='".$YearId."' AND EmployeeID=".$id);
	  $SqlFinOD=mysql_query("select SUM(MonthAtt_TotOD)as FinOD from hrm_employee_monthatt where YearId='".$YearId."' AND EmployeeID=".$id);
	  $SqlFinHO=mysql_query("select SUM(MonthAtt_TotHO)as FinHO from hrm_employee_monthatt where YearId='".$YearId."' AND EmployeeID=".$id);
	  $SqlFinPR=mysql_query("select SUM(MonthAtt_TotPR)as FinPR from hrm_employee_monthatt where YearId='".$YearId."' AND EmployeeID=".$id);
	  $SqlFinAP=mysql_query("select SUM(MonthAtt_TotAP)as FinAP from hrm_employee_monthatt where YearId='".$YearId."' AND EmployeeID=".$id);
	  $SqlFinWorkDay=mysql_query("select SUM(MonthAtt_TotWorkDay)as FinWorkDay from hrm_employee_monthatt where YearId='".$YearId."' AND EmployeeID=".$id);
	  $SqlFinPaidDay=mysql_query("select SUM(MonthAtt_TotPaidDay)as FinPaidDay from hrm_employee_monthatt where YearId='".$YearId."' AND EmployeeID=".$id);
	  	
      $ResFinCL=mysql_fetch_array($SqlFinCL); $ResFinSL=mysql_fetch_array($SqlFinSL); $ResFinPL=mysql_fetch_array($SqlFinPL); $ResFinEL=mysql_fetch_array($SqlFinEL); 
	  $ResFinFL=mysql_fetch_array($SqlFinFL); $ResFinTL=mysql_fetch_array($SqlFinTL); $ResFinLeave=mysql_fetch_array($SqlFinLeave); $ResFinOD=mysql_fetch_array($SqlFinOD);
      $ResFinHO=mysql_fetch_array($SqlFinHO); //$ResFinPR=mysql_fetch_array($SqlFinPR); $ResFinAP=mysql_fetch_array($SqlFinAP);
      $ResFinWorkDay=mysql_fetch_array($SqlFinWorkDay); $ResFinPaidDay=mysql_fetch_array($SqlFinPaidDay);
	  
	  $CountFinCL=$ResFinCL['FinCL']; $CountFinSL=$ResFinSL['FinSL']; $CountFinPL=$ResFinPL['FinPL']; $CountFinEL=$ResFinEL['FinEL']; $CountFinFL=$ResFinFL['FinOL'];
	  $CountFinTL=$ResFinTL['FinTL']; $CountFinLeave=$ResFinLeave['FinLeave']; $CountFinOD=$ResFinOD['FinOD']; $CountFinHO=$ResFinHO['FinHO']; $CountFinPR=$ResFinPR['FinPR'];
	  $CountFinAP=$ResFinAP['FinAP']; $CountFinWorkDay=$ResFinWorkDay['FinWorkDay']; $CountFinPaidDay=$ResFinPaidDay['FinPaidDay'];
	  
	  $SqlFinYearAtt=mysql_query("select * from hrm_employee_finyearatt where EmployeeID=".$id." AND YearId=".$YearId); 
      $RowFinYearAtt=mysql_num_rows($SqlFinYearAtt);
	  if($RowFinYearAtt==0){ $InsUpFinYear=mysql_query("insert into hrm_employee_finyearatt(YearId,Year,EmployeeID,FinYearAtt_TotCL,FinYearAtt_TotSL,FinYearAtt_TotPL,FinYearAtt_TotEL,FinYearAtt_TotOL,FinYearAtt_TotTL,FinYearAtt_TotLeave,FinYearAtt_TotOD,FinYearAtt_TotHO,FinYearAtt_TotPR,FinYearAtt_TotAP,FinYearAtt_TotWorkDay,FinYearAtt_TotPaidDay,FinYearAtt_UpdatedBy,FinYearAtt_UpdatedDate,FinYearAtt_UpdatedYearId)values(".$YearId.",'".date("Y")."',".$id.",'".$CountFinCL."','".$CountFinSL."','".$CountFinPL."','".$CountFinEL."','".$CountFinFL."','".$CountFinTL."','".$CountFinLeave."','".$CountFinOD."','".$CountFinHO."','".$CountFinPR."','".$CountFinAP."','".$CountFinWorkDay."','".$CountFinPaidDay."',".$UserId.",'".date("Y-m-d")."',".$YearId.")"); }
	  if($RowFinYearAtt>0){ $InsUpFinYear=mysql_query("UPDATE hrm_employee_finyearatt SET YearId=".$YearId.", Year='".date("Y")."', EmployeeID=".$id.", FinYearAtt_TotCL='".$CountFinCL."', FinYearAtt_TotSL='".$CountFinSL."', FinYearAtt_TotPL='".$CountFinPL."', FinYearAtt_TotEL='".$CountFinEL."', FinYearAtt_TotOL='".$CountFinFL."', FinYearAtt_TotTL='".$CountFinTL."', FinYearAtt_TotLeave='".$CountFinLeave."', FinYearAtt_TotOD='".$CountFinOD."', FinYearAtt_TotHO='".$CountFinHO."', FinYearAtt_TotPR='".$CountFinPR."', FinYearAtt_TotAP='".$CountFinAP."', FinYearAtt_TotWorkDay='".$CountFinWorkDay."', FinYearAtt_TotPaidDay='".$CountFinPaidDay."', FinYearAtt_UpdatedDate='".date("Y-m-d")."', FinYearAtt_UpdatedYearId=".$YearId." where EmployeeID=".$id." AND YearId=".$YearId); }
	  /********************************************** hrm_employee_finyearatt close ***********************************************/
	  
    /********************************************** hrm_employee_yearatt close ***********************************************/
	}
/********************************************** hrm_employee_monthatt Close***********************************************/  

  $sqlUp=mysql_query("update hrm_employee_applyleave set LeaveCancelStatus='Y', LeaveStatus=4 where ApplyLeaveId=".$_REQUEST['lid'], $con); 
  if($sqlUp){$msg='Leave cancelation successfully...';}
}
else {$msg='Error...';}
//*************************************** Update hrm_employee_leave Table CLOSE*******************************************// 
/***************************************************************************************************************************/  
 }
}

?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<link rel="stylesheet" type="text/css" href="src/css/jscal2.css"/>
<link rel="stylesheet" type="text/css" href="src/css/border-radius.css"/>
<link rel="stylesheet" type="text/css" href="src/css/steel/steel.css"/>
<script type="text/javascript" src="src/js/jscal2.js"></script>
<script type="text/javascript" src="src/js/lang/en.js"></script>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>

<style>.font { color:#ffffff; font-family:Georgia; font-size:11px; width:200px;} .font1 { font-family:Georgia; font-size:11px; height:14px; } 
.font2 { font-size:11px;width:260px;height:18px;}.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;} .TableHead { font-family:Times New Roman; color:#FFFFFF; font-size:15px; }
.TableHead1 { font-family:Times New Roman; color:#000000;  font-size:13px; overflow:hidden; } .InputText {font-family:Times New Roman; font-size:12px; width:100px; height:19px; }
.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}</style>
<Script type="text/javascript">window.history.forward(1);</Script>
<script type="text/javascript" language="javascript">
function OpenWindow(LId)
{window.open("LeaveDWithCancel.php?id="+LId,"leaveForm","menubar=yes,scrollbars=yes,resizable=no,directories=no,width=350,height=350");}

function OpenBalWin(EId)
{window.open("LeaveBalDetails.php?id="+EId,"leaveForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=600,height=220");}

function ActionLC(v,LId,LT,FD,TD,TotD,EI,LS)
{ var agree=confirm("Are you sure you want to cancel OK this apply cancelation leave?"); 
  if (agree) { var x = "CLeaveToHOD.php?AppLeave=yes&lid="+LId+"&v="+v+"&LeT="+LT+"&FD="+FD+"&TD="+TD+"&TotD="+TotD+"&EI="+EI+"&LS="+LS;  window.location=x; }
}

function CloseL(i)
{window.location="CLeaveToHod.php?ac=CloseLeave&LCid="+i;}
</script>
</head>
<body class="body">
<table class="table">
<tr>
 <td>
  <table class="menutable"><tr><td><?php if($_SESSION['login'] = true){ require_once("EMenu.php"); } ?></td></tr></table>
 </td>
</tr>
<tr>
 <td>
  <table width="100%" style="margin-top:0px; ">
    <tr>
	  <td valign="top"><?php if($_SESSION['login'] = true){ require_once("EWelcome.php"); } ?></td>
	</tr>
	<tr><td>&nbsp;</td></tr>
	 <tr>
	  <td valign="top">
	     <table border="0" style="width:100%; height:380px; float:none;" cellpadding="0">
		  <tr>
		   <td valign="top"> 
		   
<?php //*************************************************************************************************************************************************** ?>	   
		     <table border="0" id="Activity">
			  <tr>
			     <td id="Anni" valign="top">
				    <table border="0">
						  <tr height="20">
						    <td align="left" valign="top" width="125">
<?php include("EmpImgEmp.php"); ?>
<?php //echo "<img width=105px height=125px src=\"show_images.php?id=".$EmployeeId."\">\n";?></td>
						  </tr>
					 </table>
				 </td>
				  <td align="left" width="950" valign="top">
	     <table border="0" width="950">
		    <tr>
			 <td colspan="10"><table border="0"><tr>
<?php if($rowApp>0) { ?><td align="center"><a href="CLeave.php"><img id="Img_manager1" style="display:block;" src="images/manager1.png" border="0"/></a>
		     <img id="Img_manager" style="display:none;" src="images/manager.png" border="0"/></td><?php } ?>
<?php if($rowHod>0 OR $rowRev>0) { ?><td align="center"><a href="CLeaveToHOD.php"><img id="Img_hod1" style="display:none;" src="images/RevHod1.png" border="0"/></a>
		     <img id="Img_hod" style="display:block;" src="images/RevHod.png" border="0"/></td><?php } ?>
			 <td>&nbsp;</td>
			 
			 <td width="700" class="TableHead">
			   <font color="#106809" style='font-family:Times New Roman;' size="4"><i><b>Cancelation Leave</b></i></font>
			   <?php if($_REQUEST['ac']=='CloseLeave') { ?><font color="#000000"><b>(Accept Cancelation)</b></font><?php } ?>
			   &nbsp;&nbsp;&nbsp;&nbsp;
			   <font color="#FB0000" style='font-family:Times New Roman;' size="4"><i><b><?php echo $msg; ?></b></i></font>
			 </td>
			 <td align="center" style="font-family:Times New Roman; color:#004A00;width:12px; font-size:15px;">
		     <?php $CFromDate='2013-04-01'; $CToDate=date("Y").'-12-31';
		           $sqlLC=mysql_query("select * from hrm_employee_applyleave where Apply_SentToHOD=".$EmployeeId." AND LeaveEmpCancelStatus='Y' AND LeaveCancelStatus='Y' AND (Apply_Date>='".$CFromDate."' AND Apply_Date<='".$CToDate."') order by Apply_Date ASC", $con); $rowLC=mysql_num_rows($sqlLC);?>
		<td valign="top" style="width:260px;" align="right"><?php if($rowLC>0){?>			
             <?php if($_REQUEST['ac']=='CloseLeave') { ?>
		     <a href="#" onClick="javascript:window.location='CLeaveToHOD.php'"><font color="#464600" style='font-family:Times New Roman;' size="3"><b>Refresh</b></font></a>		             <?php } else { ?>
		     <a href="#" onClick="CloseL()"><font color="#464600" style='font-family:Times New Roman;' size="3"><b>Cancelation Ok Leave</b></font></a>
		     <?php } } ?></td>
			 </tr></table></td>
			</tr>
			<tr>
			 <td>
			   <table border="1">
            <tr bgcolor="#7a6189" style="height:22px;">
		     <td width="40" class="TableHead" align="center"><b>Sno</b></td>
		     <td width="50" class="TableHead" align="center"><b>EC</b></td>
		     <td width="250" class="TableHead" align="center"><b>Name</b></td>
			 <td width="100" class="TableHead" align="center"><b>Apply Date</b></td>
		     <td width="100" class="TableHead" align="center"><b>Leave</b></td>
		     <td width="70" class="TableHead" align="center"><b>From</b></td>
		     <td width="70" class="TableHead" align="center"><b>To</b></td>
			 <td width="40" class="TableHead" align="center"><b>Day</b></td>
		     <td width="60" class="TableHead" align="center"><b>Details</b></td>
			 <td width="60" class="TableHead" align="center"><b>Balance</b></td>
			 <td width="80" class="TableHead" align="center"><b>Status</b></td> 
		     <td width="80" class="TableHead" align="center"><b>Cancel</b></td>
		   </tr>
<?php $CFromDate='2013-04-01'; $CToDate=date("Y").'-12-31'; 

if($rowHod>0 OR $rowRev>0)
{
$sqlCheck=mysql_query("select * from hrm_employee_applyleave where (Leave_Type='PL' OR (Leave_Type='SL' AND SLHodApp='Y')) AND (Apply_SentToHOD=".$EmployeeId." OR Apply_SentToRev=".$EmployeeId.") AND LeaveEmpCancelStatus='Y' AND LeaveCancelStatus='N' AND (Apply_Date>='".$CFromDate."' AND Apply_Date<='".$CToDate."') order by Apply_Date ASC", $con);
}
elseif($rowRev>0)
{
$sqlCheck=mysql_query("select * from hrm_employee_applyleave where Leave_Type='PL' AND Apply_SentToRev=".$EmployeeId." AND LeaveEmpCancelStatus='Y' AND LeaveCancelStatus='N' AND (Apply_Date>='".$CFromDate."' AND Apply_Date<='".$CToDate."') order by Apply_Date ASC", $con);
}

	   
	  $rowCheck=mysql_num_rows($sqlCheck); if($rowCheck>0 AND $_REQUEST['ac']!='CloseLeave'){ $sno=1; while($resL=mysql_fetch_array($sqlCheck)){	  
	  $sqlE=mysql_query("select EmpCode, Fname, Sname, Lname, DesigId, DepartmentId from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee.EmployeeID=".$resL['EmployeeID'], $con); 
      $resE=mysql_fetch_assoc($sqlE); $EmpName=$resE['Fname'].' '.$resE['Sname'].' '.$resE['Lname']; ?>								  					
		   <tr <?php if($resL['Leave_Type']=='PL'){ echo 'bgcolor="#FFEAD5"'; } else {echo 'bgcolor="#FFFFFF"';}?>>
		    <td width="40" class="TableHead1" align="center"><?php echo $sno; ?></td>
		    <td width="50" class="TableHead1" align="center"><?php echo $resE['EmpCode']; ?></td>
		    <td width="250" class="TableHead1" align="left"><?php echo $EmpName; ?></td>
			<td width="100" class="TableHead1" align="center"><?php echo date("d-m-y", strtotime($resL['Apply_Date'])); ?></td>
		    <td width="100" class="TableHead1" align="center"><?php if($resL['Leave_Type']=='CH'){echo 'Half day CL';} elseif($resL['Leave_Type']=='SH'){echo 'Half day SL';} else {echo $resL['Leave_Type'];} ?></td>
		    <td width="70" class="TableHead1" align="center"><?php echo date("d-m-y",strtotime($resL['Apply_FromDate'])); ?></td>
		    <td width="70" class="TableHead1" align="center"><?php echo date("d-m-y",strtotime($resL['Apply_ToDate'])); ?></td>
			<td width="70" class="TableHead1" align="center"  style="background-color:#B9FFB9;"><?php echo $resL['Apply_TotalDay']; ?></td>
		    <td width="60" class="TableHead1" align="center"><a href="javascript:OpenWindow(<?php echo $resL['ApplyLeaveId']; ?>)">Details</a></td>
			<td width="60" class="TableHead1" align="center"><a href="javascript:OpenBalWin(<?php echo $resL['EmployeeID']; ?>)">Balance</a></td>
			<td width="80" class="TableHead1" align="center"><?php if($resL['LeaveStatus']==0) {echo 'Draft';} if($resL['LeaveStatus']==1) {echo 'Pending';} if($resL['LeaveStatus']==2) {echo 'Approved';} if($resL['LeaveStatus']==3) {echo 'Disapproved';}?></td>
		    <td width="80" class="TableHead1" align="center">
			 <a href="#" onClick="ActionLC('Y',<?php echo $resL['ApplyLeaveId']; ?>,'<?php echo $resL['Leave_Type']; ?>','<?php echo $resL['Apply_FromDate']; ?>','<?php echo $resL['Apply_ToDate']; ?>',<?php echo $resL['Apply_TotalDay'].', '.$resL['EmployeeID'].', '.$resL['LeaveStatus'] ; ?>)">OK</a></td>
		  </tr>  
<?php $sno++; } } ?>	
<?php if($_REQUEST['ac']=='CloseLeave') { $snoC=1; while($resLC=mysql_fetch_array($sqlLC)) {
 $sqlE=mysql_query("select EmpCode, Fname, Sname, Lname, DesigId, DepartmentId from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee.EmployeeID=".$resLC['EmployeeID'], $con); 
      $resE=mysql_fetch_assoc($sqlE); $EmpName=$resE['Fname'].' '.$resE['Sname'].' '.$resE['Lname']; ?>								  					
		   <tr <?php if($resL['Leave_Type']=='PL'){ echo 'bgcolor="#FFEAD5"'; } else {echo 'bgcolor="#FFFFFF"';}?>>
		    <td width="40" class="TableHead1" align="center"><?php echo $snoC; ?></td>
		    <td width="50" class="TableHead1" align="center"><?php echo $resE['EmpCode']; ?></td>
		    <td width="250" class="TableHead1" align="left"><?php echo $EmpName; ?></td>
			<td width="100" class="TableHead1" align="center"><?php echo date("d-m-y", strtotime($resLC['Apply_Date'])); ?></td>
		    <td width="100" class="TableHead1" align="center"><?php if($resLC['Leave_Type']=='CH'){echo 'Half day CL';} elseif($resLC['Leave_Type']=='SH'){echo 'Half day SL';} else {echo $resLC['Leave_Type'];} ?></td>
		    <td width="70" class="TableHead1" align="center"><?php echo date("d-m-y",strtotime($resLC['Apply_FromDate'])); ?></td>
		    <td width="70" class="TableHead1" align="center"><?php echo date("d-m-y",strtotime($resLC['Apply_ToDate'])); ?></td>
			<td width="70" class="TableHead1" align="center"  style="background-color:#B9FFB9;"><?php echo $resLC['Apply_TotalDay']; ?></td>
		    <td width="60" class="TableHead1" align="center"><a href="javascript:OpenWindow(<?php echo $resLC['ApplyLeaveId']; ?>)">Details</a></td>
			<td width="60" class="TableHead1" align="center"><a href="javascript:OpenBalWin(<?php echo $resLC['EmployeeID']; ?>)">Balance</a></td>
			<td width="80" class="TableHead1" align="center"><?php if($resLC['LeaveStatus']==0) {echo 'Draft';} if($resLC['LeaveStatus']==1) {echo 'Pending';} if($resLC['LeaveStatus']==2) {echo 'Approved';} if($resLC['LeaveStatus']==3) {echo 'Disapproved';}?></td>	
		    <td width="80" class="TableHead1" align="center">OK</td>
		  </tr>  
<?php $snoC++; } } ?>					  
              </table>
			 </td>
			</tr>
		 </table>
	           </td>
    </tr>
</table>

			
<?php //*************************************************************************************************************************************************** ?>
		   </td>
		    <td valign="top">
		    <table align="right" border="0" style="margin-top:0px; width:10%; height:380px;">
		    <tr><td align="center" valign="top" width="100">&nbsp;</td></tr>
	        </table>
		   </td>
		    <td valign="top">
		    <table align="right" border="0" style="margin-top:0px; width:10%; height:380px;"><tr><td align="center" valign="top">&nbsp;&nbsp;</td></tr></table>
		   </td>
		  </tr>
		</table>
	  </td>
	</tr>
	
	<tr>
	  <td valign="top" align="center">
	    <table border="0" style="margin-top:0px;">
				<tr>
	              <td align="center"><img src="images/home1.png"></td>
				</tr>
	    </table>
	  </td>
	</tr>
	<tr>
	  <td valign="top">
	    <?php require_once("../footer.php"); ?>
	  </td>
	</tr>
  </table>
 </td>
</tr>
</table>
</body>
</html>

