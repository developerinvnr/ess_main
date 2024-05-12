<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}

//**********************************
$_SESSION['EmpID']=$_REQUEST['ID']; $EMPID=$_SESSION['EmpID']; 
$sqlEC=mysql_query("select EmpCode from hrm_employee where EmployeeId=".$EMPID, $con); $resEC=mysql_fetch_assoc($sqlEC);
//**********************************

if(isset($_POST['EditL']))
{ $sql=mysql_query("select * from hrm_employee_monthlyleave_balance where EmployeeId=".$EMPID." AND Month=".$_POST['M1']." AND Year=".$_POST['y']."", $con);
  $row=mysql_num_rows($sql);
  if($row>0) 
  {$sqlUp=mysql_query("update hrm_employee_monthlyleave_balance set OpeningCL=".$_POST['PriCL'].", OpeningSL=".$_POST['PriSL'].", OpeningPL=".$_POST['PriPL'].", OpeningEL=".$_POST['PriEL'].", OpeningML=".$_POST['PriML'].", OpeningOL=".$_POST['PriOL'].", CreditedCL=".$_POST['AllowCL'].", CreditedSL=".$_POST['AllowSL'].", CreditedPL=".$_POST['AllowPL'].", CreditedEL=".$_POST['AllowEL'].", CreditedML=".$_POST['AllowML'].", CreditedOL=".$_POST['AllowOL'].", TotCL=".$_POST['TotCL'].", TotSL=".$_POST['TotSL'].", TotPL=".$_POST['TotPL'].", TotEL=".$_POST['TotEL'].", TotML=".$_POST['TotML'].", TotOL=".$_POST['TotOL'].", EnCashCL=".$_POST['CashCL'].", EnCashSL=".$_POST['CashSL'].", EnCashPL=".$_POST['CashPL'].", EnCashEL=".$_POST['CashEL'].", EnCashML=".$_POST['CashML'].", EnCashOL=".$_POST['CashOL'].", AvailedCL=".$_POST['AvailCL'].", AvailedSL=".$_POST['AvailSL'].", AvailedPL=".$_POST['AvailPL'].", AvailedEL=".$_POST['AvailEL'].", AvailedML=".$_POST['AvailML'].", AvailedOL=".$_POST['AvailOL'].", BalanceCL=".$_POST['BalCL'].", BalanceSL=".$_POST['BalSL'].", BalancePL=".$_POST['BalPL'].", BalanceEL=".$_POST['BalEL'].", BalanceML=".$_POST['BalML'].", BalanceOL=".$_POST['BalOL']." where EmployeeId=".$EMPID." AND Month=".$_POST['M1']." AND Year=".$_POST['y']."", $con);}
  else
  {$sqlIns=mysql_query("insert into hrm_employee_monthlyleave_balance(EmployeeID, EC, Month, Year, OpeningCL, OpeningSL, OpeningPL, OpeningEL, OpeningML, OpeningOL, CreditedCL, CreditedSL, CreditedPL, CreditedEL, CreditedML, CreditedOL, TotCL, TotSL, TotPL, TotEL, TotML, TotOL, EnCashCL, EnCashSL, EnCashPL, EnCashEL, EnCashML, EnCashOL, AvailedCL, AvailedSL, AvailedPL, AvailedEL, AvailedML, AvailedOL, BalanceCL, BalanceSL, BalancePL, BalanceEL, BalanceML, BalanceOL, CreatedBy, CreatedDate, YearId) values(".$EMPID.", ".$resEC['EmpCode'].", ".$_POST['M1'].", ".$_POST['y'].", ".$_POST['PriCL'].", ".$_POST['PriSL'].", ".$_POST['PriPL'].", ".$_POST['PriEL'].", ".$_POST['PriML'].", ".$_POST['PriOL'].", ".$_POST['AllowCL'].", ".$_POST['AllowSL'].", ".$_POST['AllowPL'].", ".$_POST['AllowEL'].", ".$_POST['AllowML'].", ".$_POST['AllowOL'].", ".$_POST['TotCL'].", ".$_POST['TotSL'].", ".$_POST['TotPL'].", ".$_POST['TotEL'].", ".$_POST['TotML'].", ".$_POST['TotOL'].", ".$_POST['CashCL'].", ".$_POST['CashSL'].", ".$_POST['CashPL'].", ".$_POST['CashEL'].", ".$_POST['CashML'].", ".$_POST['CashOL'].", ".$_POST['AvailCL'].", ".$_POST['AvailSL'].", ".$_POST['AvailPL'].", ".$_POST['AvailEL'].", ".$_POST['AvailML'].", ".$_POST['AvailOL'].", ".$_POST['BalCL'].", ".$_POST['BalSL'].", ".$_POST['BalPL'].", ".$_POST['BalEL'].", ".$_POST['BalML'].", ".$_POST['BalOL'].", ".$UserId.", '".date("Y-m-d")."', ".$YearId.")", $con);}
  if($sqlUp OR $sqlIns){$msg='Data leave of month <font color="#800000">'.date("F",strtotime($_POST['y']."-".$_POST['M1']."-01")).'</font> updated successfully....';}
}
?>
<?php 
if(isset($_POST['AddAtt']))
{ 
  $i=1; $m=$_POST['MonthId']; $Y=$_POST['y'];
  
  $ExpMonthDate=date('Y-m-d', strtotime("-2 months", strtotime(date("Y-m-d")))); $pp=strtotime($ExpMonthDate);
  $ExpMonth=date('m', strtotime("-2 months", strtotime(date("Y-m-d"))));
  $ExpYear=date('Y', strtotime("-2 months", strtotime(date("Y-m-d"))));
  
  $BY=date("Y")-1;
  if($Y>=date("Y")){ $AttTable='hrm_employee_attendance'; $AttTable2='hrm_employee_attendance_'.$Y; }
  elseif($Y==$BY AND date("m")=='01' AND $m==12){ $AttTable='hrm_employee_attendance'; }
  elseif($Y==$BY AND $m<12){ $AttTable='hrm_employee_attendance'; $AttTable2='hrm_employee_attendance_'.$Y; }
  else{$AttTable='hrm_employee_attendance'; $AttTable2='hrm_employee_attendance_'.$Y;  }
  
  if($m==1 OR $m==3 OR $m==5 OR $m==7 OR $m==8 OR $m==10 OR $m==12){$day=31;}
  elseif($m==4 OR $m==6 OR $m==9 OR $m==11){$day=30;} 
  elseif($m==2)
  { 
   if($Y==2012 OR $Y==2016 OR $Y==2020 OR $Y==2024 OR $Y==2028 OR $Y==2032 OR $Y==2036 OR $Y==2040){$day=29;} 
   else{$day=28;} 
  }

  for($j=1; $j<=$day; $j++) 
  { 
    $tt=strtotime(date($Y.'-'.$m.'-'.$j)); 
	if($tt<$pp){$tab=$AttTable2; }else{$tab=$AttTable; }
  
   if($_POST['Day'.$i.'_'.$j]!='') 
   { 
   
	if(date("w",strtotime(date($Y.'-'.$m.'-'.$j)))==0 AND ($_POST['Day'.$i.'_'.$j]=='EL' OR $_POST['Day'.$i.'_'.$j]=='ML'))
	{
	    
	    
	 $Sql=mysql_query("select * from ".$tab." where EmployeeID=".$EMPID." and AttDate='".date($Y."-".$m."-".$j)."'", $con); $row=mysql_num_rows($Sql);
	 if($row==0) { $sIns=mysql_query("insert into ".$tab."(EmployeeID,AttValue,AttDate,CheckSunday,Year,YearId)values(".$EMPID.",'".$_POST['Day'.$i.'_'.$j]."','".date($Y."-".$m."-".$j)."','Y','".$Y."',".$YearId.")", $con);}
	 elseif($row>0) { $sUp=mysql_query("UPDATE ".$tab." SET AttValue='".$_POST['Day'.$i.'_'.$j]."',CheckSunday='Y' where EmployeeID=".$EMPID." AND AttDate='".date($Y."-".$m."-".$j)."'", $con);}  
	 }
	 else 
	 {
	  if($_POST['Day'.$i.'_'.$j]=='S'){$_POST['Day'.$i.'_'.$j]=='';}
      $Sql=mysql_query("select * from ".$tab." where EmployeeID=".$EMPID." and AttDate='".date($Y."-".$m."-".$j)."'", $con); $row=mysql_num_rows($Sql);
	  if($row==0) { $sIns=mysql_query("insert into ".$tab."(EmployeeID,AttValue,AttDate,Year,YearId)values(".$EMPID.",'".$_POST['Day'.$i.'_'.$j]."','".date($Y."-".$m."-".$j)."','".$Y."',".$YearId.")", $con);}
	  elseif($row>0) { $sUp=mysql_query("UPDATE ".$tab." SET AttValue='".$_POST['Day'.$i.'_'.$j]."' where EmployeeID=".$EMPID." AND AttDate='".date($Y."-".$m."-".$j)."'", $con);}  
	 }
	 	   
   }
   if($_POST['Day'.$i.'_'.$j]=='') 
   { $Sql=mysql_query("select * from ".$tab." where EmployeeID=".$EMPID." and AttDate='".date($Y."-".$m."-".$j)."'", $con); $row=mysql_num_rows($Sql);
   if($row>0) { $sUp=mysql_query("delete from ".$tab." where EmployeeID=".$EMPID." AND AttDate='".date($Y."-".$m."-".$j)."' ", $con);}  
   }
   
  }  //for($j=1; $j<=$day; $j++)


 if($sql) 
  {
	
	$tt=strtotime(date($Y."-".$m."-1")); $tt2=strtotime(date($Y."-".$m."-".$day)); 
	if($tt>=$pp)
	{ 
	  $tab1=$AttTable;
$Cond1="EmployeeID=".$EMPID." AND AttDate>='".date($Y."-".$m."-1")."' AND AttDate<='".date($Y."-".$m."-".$day)."'";
	  
$SqlCL=mysql_query("select count(DISTINCT AttDate)as CL from ".$tab1." where AttValue='CL' AND ".$Cond1, $con); 
$SqlCH=mysql_query("select count(DISTINCT AttDate)as CH from ".$tab1." where AttValue='CH' AND ".$Cond1, $con); 
$SqlSL=mysql_query("select count(DISTINCT AttDate)as SL from ".$tab1." where AttValue='SL' AND ".$Cond1, $con); 
$SqlSH=mysql_query("select count(DISTINCT AttDate)as SH from ".$tab1." where AttValue='SH' AND ".$Cond1, $con); 
$SqlPL=mysql_query("select count(DISTINCT AttDate)as PL from ".$tab1." where AttValue='PL' AND ".$Cond1, $con);
$SqlPH=mysql_query("select count(DISTINCT AttDate)as PH from ".$tab1." where AttValue='PH' AND ".$Cond1, $con); 
$SqlEL=mysql_query("select count(DISTINCT AttDate)as EL from ".$tab1." where AttValue='EL' AND ".$Cond1, $con); 
$SqlML=mysql_query("select count(DISTINCT AttDate)as ML from ".$tab1." where AttValue='ML' AND ".$Cond1, $con); 
$SqlFL=mysql_query("select count(DISTINCT AttDate)as FL from ".$tab1." where AttValue='FL' AND ".$Cond1, $con); 
$SqlTL=mysql_query("select count(DISTINCT AttDate)as TL from ".$tab1." where AttValue='TL' AND ".$Cond1, $con); 
$SqlHf=mysql_query("select count(DISTINCT AttDate)as Hf from ".$tab1." where AttValue='HF' AND ".$Cond1, $con); 
$SqlAch=mysql_query("select count(DISTINCT AttDate)as ACH from ".$tab1." where AttValue='ACH' AND ".$Cond1, $con);
$SqlAsh=mysql_query("select count(DISTINCT AttDate)as ASH from ".$tab1." where AttValue='ASH' AND ".$Cond1, $con);
$SqlAph=mysql_query("select count(DISTINCT AttDate)as APH from ".$tab1." where AttValue='APH' AND ".$Cond1, $con);

$SqlPresent=mysql_query("select count(DISTINCT AttDate)as Present from ".$tab1." where (AttValue='P' OR AttValue='WFH') AND ".$Cond1, $con);$SqlAbsent=mysql_query("select count(DISTINCT AttDate)as Absent from ".$tab1." where AttValue='A' AND ".$Cond1, $con); $SqlOnDuties=mysql_query("select count(DISTINCT AttDate)as OnDuties from ".$tab1." where AttValue='OD' AND ".$Cond1, $con); 
$SqlHoliday=mysql_query("select count(DISTINCT AttDate)as Holiday from ".$tab1." where AttValue='HO' AND ".$Cond1, $con);
$SqlELSun=mysql_query("select count(CheckSunday)as SUN from ".$tab1." where CheckSunday='Y' AND ".$Cond1, $con); 
	  
   $ResCL=mysql_fetch_array($SqlCL); $ResCH=mysql_fetch_array($SqlCH); $ResSL=mysql_fetch_array($SqlSL); 
   $ResSH=mysql_fetch_array($SqlSH); $ResPH=mysql_fetch_array($SqlPH); $ResPL=mysql_fetch_array($SqlPL); 
   $ResEL=mysql_fetch_array($SqlEL); $ResFL=mysql_fetch_array($SqlFL); $ResTL=mysql_fetch_array($SqlTL); 
   $ResML=mysql_fetch_array($SqlML); $ResHf=mysql_fetch_array($SqlHf); $ResPresent=mysql_fetch_array($SqlPresent); 
   $ResAbsent=mysql_fetch_array($SqlAbsent); $ResOnDuties=mysql_fetch_array($SqlOnDuties);  
   $ResHoliday=mysql_fetch_array($SqlHoliday); $ResELSun=mysql_fetch_array($SqlELSun);
   $ResAch=mysql_fetch_array($SqlAch); $ResAsh=mysql_fetch_array($SqlAsh); $ResAph=mysql_fetch_array($SqlAph);

   $CountCL=$ResCL['CL']; $CountCH=$ResCH['CH']/2; $CountSL=$ResSL['SL']; 
   $CountSH=$ResSH['SH']/2; $CountPH=$ResPH['PH']/2; 
   
   $CountAch=$ResAch['ACH']/2; $CountAsh=$ResAsh['ASH']/2; $CountAph=$ResAph['APH']/2;
   $TotalCL=$CountCL+$CountCH+$CountAch;
   $TotalSL=$CountSL+$CountSH+$CountAsh;   
   $TotalPL=$ResPL['PL']+$CountPH+$CountAph;
   
   $TotalEL=$ResEL['EL']; $TotalML=$ResML['ML']; $TotalFL=$ResFL['FL']; $TotalTL=$ResTL['TL']; 
   $TotELSun=$ResELSun['SUN']; $CountHf=$ResHf['Hf']/2;  
    
   $TotalLeaveCount=$TotalCL+$TotalSL+$TotalPL+$TotalEL+$TotalFL+$TotalTL+$TotalML; 
   $TotalPR=$ResPresent['Present']+$CountCH+$CountSH+$CountPH+$CountHf;  //$TotalPR=$ResPresent['Present']+$CountHf; 
   $TotalAbsent=$ResAbsent['Absent']+$CountHf+$CountAch+$CountAsh+$CountAph;
   $TotalOnDuties=$ResOnDuties['OnDuties']; $TotalHoliday=$ResHoliday['Holiday']; 
   $TotalDayWithSunEL=$TotalPR+$TotalLeaveCount+$TotalOnDuties+$TotalHoliday;
   $TotalPaidDay=$TotalDayWithSunEL-$TotELSun;
   $TotalWorkingDay=26;
	  
	}
	elseif($tt<$pp AND $tt2>=$pp)
	{
	  $tab1=$AttTable2; $tab2=$AttTable;
$Cond1="EmployeeID=".$EMPID." AND AttDate>='".date($Y."-".$m."-1")."' AND AttDate<'".$ExpMonthDate."'";
$Cond2="EmployeeID=".$EMPID." AND AttDate>='".$ExpMonthDate."' AND AttDate<='".date($Y."-".$m."-".$day)."'";
	  
$SqlCL=mysql_query("select count(DISTINCT AttDate)as CL from ".$tab1." where AttValue='CL' AND ".$Cond1, $con); 
$SqlCH=mysql_query("select count(DISTINCT AttDate)as CH from ".$tab1." where AttValue='CH' AND ".$Cond1, $con); 
$SqlSL=mysql_query("select count(DISTINCT AttDate)as SL from ".$tab1." where AttValue='SL' AND ".$Cond1, $con); 
$SqlSH=mysql_query("select count(DISTINCT AttDate)as SH from ".$tab1." where AttValue='SH' AND ".$Cond1, $con); 
$SqlPL=mysql_query("select count(DISTINCT AttDate)as PL from ".$tab1." where AttValue='PL' AND ".$Cond1, $con);
$SqlPH=mysql_query("select count(DISTINCT AttDate)as PH from ".$tab1." where AttValue='PH' AND ".$Cond1, $con); 
$SqlEL=mysql_query("select count(DISTINCT AttDate)as EL from ".$tab1." where AttValue='EL' AND ".$Cond1, $con); 
$SqlML=mysql_query("select count(DISTINCT AttDate)as ML from ".$tab1." where AttValue='ML' AND ".$Cond1, $con); 
$SqlFL=mysql_query("select count(DISTINCT AttDate)as FL from ".$tab1." where AttValue='FL' AND ".$Cond1, $con); 
$SqlTL=mysql_query("select count(DISTINCT AttDate)as TL from ".$tab1." where AttValue='TL' AND ".$Cond1, $con); 
$SqlHf=mysql_query("select count(DISTINCT AttDate)as Hf from ".$tab1." where AttValue='HF' AND ".$Cond1, $con);
$SqlAch=mysql_query("select count(DISTINCT AttDate)as ACH from ".$tab1." where AttValue='ACH' AND ".$Cond1, $con);
$SqlAsh=mysql_query("select count(DISTINCT AttDate)as ASH from ".$tab1." where AttValue='ASH' AND ".$Cond1, $con);
$SqlAph=mysql_query("select count(DISTINCT AttDate)as APH from ".$tab1." where AttValue='APH' AND ".$Cond1, $con);
 
$SqlPresent=mysql_query("select count(DISTINCT AttDate)as Present from ".$tab1." where (AttValue='P' OR AttValue='WFH') AND ".$Cond1, $con);$SqlAbsent=mysql_query("select count(DISTINCT AttDate)as Absent from ".$tab1." where AttValue='A' AND ".$Cond1, $con); $SqlOnDuties=mysql_query("select count(DISTINCT AttDate)as OnDuties from ".$tab1." where AttValue='OD' AND ".$Cond1, $con); 
$SqlHoliday=mysql_query("select count(DISTINCT AttDate)as Holiday from ".$tab1." where AttValue='HO' AND ".$Cond1, $con);
$SqlELSun=mysql_query("select count(CheckSunday)as SUN from ".$tab1." where CheckSunday='Y' AND ".$Cond1, $con); 
	  
   $ResCL=mysql_fetch_array($SqlCL); $ResCH=mysql_fetch_array($SqlCH); $ResSL=mysql_fetch_array($SqlSL); 
   $ResSH=mysql_fetch_array($SqlSH); $ResPH=mysql_fetch_array($SqlPH); $ResPL=mysql_fetch_array($SqlPL); 
   $ResEL=mysql_fetch_array($SqlEL); $ResFL=mysql_fetch_array($SqlFL); $ResTL=mysql_fetch_array($SqlTL); 
   $ResML=mysql_fetch_array($SqlML); $ResHf=mysql_fetch_array($SqlHf); $ResPresent=mysql_fetch_array($SqlPresent); 
   $ResAbsent=mysql_fetch_array($SqlAbsent); $ResOnDuties=mysql_fetch_array($SqlOnDuties);  
   $ResHoliday=mysql_fetch_array($SqlHoliday); $ResELSun=mysql_fetch_array($SqlELSun);
   $ResAch=mysql_fetch_array($SqlAch); $ResAsh=mysql_fetch_array($SqlAsh); $ResAph=mysql_fetch_array($SqlAph);
   
$Sql2CL=mysql_query("select count(DISTINCT AttDate)as CL from ".$tab2." where AttValue='CL' AND ".$Cond2, $con); 
$Sql2CH=mysql_query("select count(DISTINCT AttDate)as CH from ".$tab2." where AttValue='CH' AND ".$Cond2, $con); 
$Sql2SL=mysql_query("select count(DISTINCT AttDate)as SL from ".$tab2." where AttValue='SL' AND ".$Cond2, $con); 
$Sql2SH=mysql_query("select count(DISTINCT AttDate)as SH from ".$tab2." where AttValue='SH' AND ".$Cond2, $con); 
$Sql2PL=mysql_query("select count(DISTINCT AttDate)as PL from ".$tab2." where AttValue='PL' AND ".$Cond2, $con);
$Sql2PH=mysql_query("select count(DISTINCT AttDate)as PH from ".$tab2." where AttValue='PH' AND ".$Cond2, $con); 
$Sql2EL=mysql_query("select count(DISTINCT AttDate)as EL from ".$tab2." where AttValue='EL' AND ".$Cond2, $con); 
$Sql2ML=mysql_query("select count(DISTINCT AttDate)as ML from ".$tab2." where AttValue='ML' AND ".$Cond2, $con); 
$Sql2FL=mysql_query("select count(DISTINCT AttDate)as FL from ".$tab2." where AttValue='FL' AND ".$Cond2, $con); 
$Sql2TL=mysql_query("select count(DISTINCT AttDate)as TL from ".$tab2." where AttValue='TL' AND ".$Cond2, $con); 
$Sql2Hf=mysql_query("select count(DISTINCT AttDate)as Hf from ".$tab2." where AttValue='HF' AND ".$Cond2, $con); 
$Sql2Ach=mysql_query("select count(DISTINCT AttDate)as ACH from ".$tab2." where AttValue='ACH' AND ".$Cond2, $con);
$Sql2Ash=mysql_query("select count(DISTINCT AttDate)as ASH from ".$tab2." where AttValue='ASH' AND ".$Cond2, $con);
$Sql2Aph=mysql_query("select count(DISTINCT AttDate)as APH from ".$tab2." where AttValue='APH' AND ".$Cond2, $con);

$Sql2Present=mysql_query("select count(DISTINCT AttDate)as Present from ".$tab2." where (AttValue='P' OR AttValue='WFH') AND ".$Cond2, $con);$Sql2Absent=mysql_query("select count(DISTINCT AttDate)as Absent from ".$tab2." where AttValue='A' AND ".$Cond2, $con); $Sql2OnDuties=mysql_query("select count(DISTINCT AttDate)as OnDuties from ".$tab2." where AttValue='OD' AND ".$Cond2,$con); 
$Sql2Holiday=mysql_query("select count(DISTINCT AttDate)as Holiday from ".$tab2." where AttValue='HO' AND ".$Cond2, $con);
$Sql2ELSun=mysql_query("select count(CheckSunday)as SUN from ".$tab2." where CheckSunday='Y' AND ".$Cond2, $con); 
	  
   $Res2CL=mysql_fetch_array($Sql2CL); $Res2CH=mysql_fetch_array($Sql2CH); $Res2SL=mysql_fetch_array($Sql2SL); 
   $Res2SH=mysql_fetch_array($Sql2SH); $Res2PH=mysql_fetch_array($Sql2PH); $Res2PL=mysql_fetch_array($Sql2PL); 
   $Res2EL=mysql_fetch_array($Sql2EL); $Res2FL=mysql_fetch_array($Sql2FL); $Res2TL=mysql_fetch_array($Sql2TL); 
   $Res2ML=mysql_fetch_array($Sql2ML); $Res2Hf=mysql_fetch_array($Sql2Hf); $Res2Present=mysql_fetch_array($Sql2Present); 
   $Res2Absent=mysql_fetch_array($Sql2Absent); $Res2OnDuties=mysql_fetch_array($Sql2OnDuties);  
   $ResHoliday=mysql_fetch_array($SqlHoliday); $ResELSun=mysql_fetch_array($SqlELSun);  
   $Res2Ach=mysql_fetch_array($Sql2Ach); $Res2Ash=mysql_fetch_array($Sql2Ash); $Res2Aph=mysql_fetch_array($Sql2Aph); 

   $CountCL=$ResCL['CL']+$Res2CL['CL']; $CountCH=($ResCH['CH']+$Res2CH['CH'])/2; 
   $CountSL=$ResSL['SL']+$Res2SL['SL']; $CountSH=($ResSH['SH']+$Res2SH['SH'])/2;  
   $CountPH=($ResPH['PH']+$Res2PH['PH'])/2; 
   
   $CountAch=($ResAch['ACH']+$Res2Ach['ACH'])/2; 
   $CountAsh=($ResAsh['ASH']+$Res2Ash['ASH'])/2; 
   $CountAph=($ResAph['APH']+$Res2Aph['APH'])/2; 
   $TotalCL=$CountCL+$CountCH+$CountAch;
   $TotalSL=$CountSL+$CountSH+$CountAsh;   
   $TotalPL=($ResPL['PL']+$Res2PL['PL'])+$CountPH+$CountAph; 
   
   $TotalEL=$ResEL['EL']+$Res2EL['EL']; $TotalML=$ResML['ML']+$Res2ML['ML']; $TotalFL=$ResFL['FL']+$Res2FL['FL']; 
   $TotalTL=$ResTL['TL']+$Res2TL['TL']; $TotELSun=$ResELSun['SUN']+$Res2ELSun['SUN']; 
   $CountHf=($ResHf['Hf']+$Res2Hf['Hf'])/2; 
  
    
   $TotalLeaveCount=$TotalCL+$TotalSL+$TotalPL+$TotalEL+$TotalFL+$TotalTL+$TotalML; 
   $TotalPR=($ResPresent['Present']+$Res2Present['Present'])+$CountCH+$CountSH+$CountPH+$CountHf;  
   //$TotalPR=$ResPresent['Present']+$CountHf; 
   $TotalAbsent=($ResAbsent['Absent']+$Res2Absent['Absent'])+$CountHf+$CountAch+$CountAsh+$CountAph;
   $TotalOnDuties=$ResOnDuties['OnDuties']+$Res2OnDuties['OnDuties']; 
   $TotalHoliday=$ResHoliday['Holiday']+$Res2Holiday['Holiday']; 
   $TotalDayWithSunEL=$TotalPR+$TotalLeaveCount+$TotalOnDuties+$TotalHoliday;
   $TotalPaidDay=$TotalDayWithSunEL-$TotELSun;
   $TotalWorkingDay=26;	  
	  
	}
	elseif($tt2<$pp)
	{
      $tab1=$AttTable2;
$Cond1="EmployeeID=".$EMPID." AND AttDate>='".date($Y."-".$m."-1")."' AND AttDate<='".date($Y."-".$m."-".$day)."'";
	  
$SqlCL=mysql_query("select count(DISTINCT AttDate)as CL from ".$tab1." where AttValue='CL' AND ".$Cond1, $con); 
$SqlCH=mysql_query("select count(DISTINCT AttDate)as CH from ".$tab1." where AttValue='CH' AND ".$Cond1, $con); 
$SqlSL=mysql_query("select count(DISTINCT AttDate)as SL from ".$tab1." where AttValue='SL' AND ".$Cond1, $con); 
$SqlSH=mysql_query("select count(DISTINCT AttDate)as SH from ".$tab1." where AttValue='SH' AND ".$Cond1, $con); 
$SqlPL=mysql_query("select count(DISTINCT AttDate)as PL from ".$tab1." where AttValue='PL' AND ".$Cond1, $con);
$SqlPH=mysql_query("select count(DISTINCT AttDate)as PH from ".$tab1." where AttValue='PH' AND ".$Cond1, $con); 
$SqlEL=mysql_query("select count(DISTINCT AttDate)as EL from ".$tab1." where AttValue='EL' AND ".$Cond1, $con); 
$SqlML=mysql_query("select count(DISTINCT AttDate)as ML from ".$tab1." where AttValue='ML' AND ".$Cond1, $con); 
$SqlFL=mysql_query("select count(DISTINCT AttDate)as FL from ".$tab1." where AttValue='FL' AND ".$Cond1, $con); 
$SqlTL=mysql_query("select count(DISTINCT AttDate)as TL from ".$tab1." where AttValue='TL' AND ".$Cond1, $con); 
$SqlHf=mysql_query("select count(DISTINCT AttDate)as Hf from ".$tab1." where AttValue='HF' AND ".$Cond1, $con); 
$SqlAch=mysql_query("select count(DISTINCT AttDate)as ACH from ".$tab1." where AttValue='ACH' AND ".$Cond1, $con);
$SqlAsh=mysql_query("select count(DISTINCT AttDate)as ASH from ".$tab1." where AttValue='ASH' AND ".$Cond1, $con);
$SqlAph=mysql_query("select count(DISTINCT AttDate)as APH from ".$tab1." where AttValue='APH' AND ".$Cond1, $con);

$SqlPresent=mysql_query("select count(DISTINCT AttDate)as Present from ".$tab1." where (AttValue='P' OR AttValue='WFH') AND ".$Cond1, $con);$SqlAbsent=mysql_query("select count(DISTINCT AttDate)as Absent from ".$tab1." where AttValue='A' AND ".$Cond1, $con); $SqlOnDuties=mysql_query("select count(DISTINCT AttDate)as OnDuties from ".$tab1." where AttValue='OD' AND ".$Cond1, $con); 
$SqlHoliday=mysql_query("select count(DISTINCT AttDate)as Holiday from ".$tab1." where AttValue='HO' AND ".$Cond1, $con);
$SqlELSun=mysql_query("select count(CheckSunday)as SUN from ".$tab1." where CheckSunday='Y' AND ".$Cond1, $con); 
	  
   $ResCL=mysql_fetch_array($SqlCL); $ResCH=mysql_fetch_array($SqlCH); $ResSL=mysql_fetch_array($SqlSL); 
   $ResSH=mysql_fetch_array($SqlSH); $ResPH=mysql_fetch_array($SqlPH); $ResPL=mysql_fetch_array($SqlPL); 
   $ResEL=mysql_fetch_array($SqlEL); $ResFL=mysql_fetch_array($SqlFL); $ResTL=mysql_fetch_array($SqlTL); 
   $ResML=mysql_fetch_array($SqlML); $ResHf=mysql_fetch_array($SqlHf); $ResPresent=mysql_fetch_array($SqlPresent); 
   $ResAbsent=mysql_fetch_array($SqlAbsent); $ResOnDuties=mysql_fetch_array($SqlOnDuties);  
   $ResHoliday=mysql_fetch_array($SqlHoliday); $ResELSun=mysql_fetch_array($SqlELSun);
   $ResAch=mysql_fetch_array($SqlAch); $ResAsh=mysql_fetch_array($SqlAsh); $ResAph=mysql_fetch_array($SqlAph);
 
   $CountCL=$ResCL['CL']; $CountCH=$ResCH['CH']/2; $CountSL=$ResSL['SL']; 
   $CountSH=$ResSH['SH']/2; $CountPH=$ResPH['PH']/2;
   
   $CountAch=$ResAch['ACH']/2; $CountAsh=$ResAsh['ASH']/2; $CountAph=$ResAph['APH']/2;
   $TotalCL=$CountCL+$CountCH+$CountAch;
   $TotalSL=$CountSL+$CountSH+$CountAsh;   
   $TotalPL=$ResPL['PL']+$CountPH+$CountAph;
   
   $TotalEL=$ResEL['EL']; $TotalML=$ResML['ML']; $TotalFL=$ResFL['FL']; $TotalTL=$ResTL['TL']; 
   $TotELSun=$ResELSun['SUN']; $CountHf=$ResHf['Hf']/2;   
   
   
   $TotalLeaveCount=$TotalCL+$TotalSL+$TotalPL+$TotalEL+$TotalFL+$TotalTL+$TotalML; 
   $TotalPR=$ResPresent['Present']+$CountCH+$CountSH+$CountPH+$CountHf;  //$TotalPR=$ResPresent['Present']+$CountHf; 
   $TotalAbsent=$ResAbsent['Absent']+$CountHf+$CountAch+$CountAsh+$CountAph;
   $TotalOnDuties=$ResOnDuties['OnDuties']; $TotalHoliday=$ResHoliday['Holiday']; 
   $TotalDayWithSunEL=$TotalPR+$TotalLeaveCount+$TotalOnDuties+$TotalHoliday;
   $TotalPaidDay=$TotalDayWithSunEL-$TotELSun;
   $TotalWorkingDay=26;	 
	}
	
/*$SqlCL=mysql_query("select count(DISTINCT AttDate)as CL from ".$AttTable." where AttValue='CL' AND EmployeeID=".$EMPID." AND (AttDate between '".date($Y."-".$m."-1")."' AND '".date($Y."-".$m."-".$day)."')", $con); $SqlCH=mysql_query("select count(DISTINCT AttDate)as CH from ".$AttTable." where AttValue='CH' AND EmployeeID=".$EMPID." AND (AttDate between '".date($Y."-".$m."-1")."' AND '".date($Y."-".$m."-".$day)."')", $con); $SqlSL=mysql_query("select count(DISTINCT AttDate)as SL from ".$AttTable." where AttValue='SL' AND EmployeeID=".$EMPID." AND (AttDate between '".date($Y."-".$m."-1")."' AND '".date($Y."-".$m."-".$day)."')", $con); $SqlSH=mysql_query("select count(DISTINCT AttDate)as SH from ".$AttTable." where AttValue='SH' AND EmployeeID=".$EMPID." AND (AttDate between '".date($Y."-".$m."-1")."' AND '".date($Y."-".$m."-".$day)."')", $con); $SqlPL=mysql_query("select count(DISTINCT AttDate)as PL from ".$AttTable." where AttValue='PL' AND EmployeeID=".$EMPID." AND (AttDate between '".date($Y."-".$m."-1")."' AND '".date($Y."-".$m."-".$day)."')", $con); $SqlPH=mysql_query("select count(DISTINCT AttDate)as PH from ".$AttTable." where AttValue='PH' AND EmployeeID=".$EMPID." AND (AttDate between '".date($Y."-".$m."-1")."' AND '".date($Y."-".$m."-".$day)."')", $con); $SqlEL=mysql_query("select count(DISTINCT AttDate)as EL from ".$AttTable." where AttValue='EL' AND EmployeeID=".$EMPID." AND (AttDate between '".date($Y."-".$m."-1")."' AND '".date($Y."-".$m."-".$day)."')", $con); $SqlML=mysql_query("select count(DISTINCT AttDate)as ML from ".$AttTable." where AttValue='ML' AND EmployeeID=".$EMPID." AND (AttDate between '".date($Y."-".$m."-1")."' AND '".date($Y."-".$m."-".$day)."')", $con); $SqlFL=mysql_query("select count(DISTINCT AttDate)as FL from ".$AttTable." where AttValue='FL' AND EmployeeID=".$EMPID." AND (AttDate between '".date($Y."-".$m."-1")."' AND '".date($Y."-".$m."-".$day)."')", $con); $SqlTL=mysql_query("select count(DISTINCT AttDate)as TL from ".$AttTable." where AttValue='TL' AND EmployeeID=".$EMPID." AND (AttDate between '".date($Y."-".$m."-1")."' AND '".date($Y."-".$m."-".$day)."')", $con); $SqlHf=mysql_query("select count(DISTINCT AttDate)as Hf from ".$AttTable." where AttValue='HF' AND EmployeeID=".$EMPID." AND (AttDate between '".date($Y."-".$m."-1")."' AND '".date($Y."-".$m."-".$day)."')", $con); $SqlPresent=mysql_query("select count(DISTINCT AttDate)as Present from ".$AttTable." where (AttValue='P' OR AttValue='WFH') AND EmployeeID=".$EMPID." AND (AttDate between '".date($Y."-".$m."-1")."' AND '".date($Y."-".$m."-".$day)."')", $con); $SqlAbsent=mysql_query("select count(DISTINCT AttDate)as Absent from ".$AttTable." where AttValue='A' AND EmployeeID=".$EMPID." AND (AttDate between '".date($Y."-".$m."-1")."' AND '".date($Y."-".$m."-".$day)."')", $con); $SqlOnDuties=mysql_query("select count(DISTINCT AttDate)as OnDuties from ".$AttTable." where AttValue='OD' AND EmployeeID=".$EMPID." AND (AttDate between '".date($Y."-".$m."-1")."' AND '".date($Y."-".$m."-".$day)."')", $con); $SqlHoliday=mysql_query("select count(DISTINCT AttDate)as Holiday from ".$AttTable." where AttValue='HO' AND EmployeeID=".$EMPID." AND (AttDate between '".date($Y."-".$m."-1")."' AND '".date($Y."-".$m."-".$day)."')", $con); $SqlELSun=mysql_query("select count(CheckSunday)as SUN from ".$AttTable." where CheckSunday='Y' AND EmployeeID=".$EMPID." AND (AttDate between '".date($Y."-".$m."-1")."' AND '".date($Y."-".$m."-".$day)."')", $con); 
	  
   $ResCL=mysql_fetch_array($SqlCL); $ResCH=mysql_fetch_array($SqlCH); $ResSL=mysql_fetch_array($SqlSL); 
   $ResSH=mysql_fetch_array($SqlSH); $ResPH=mysql_fetch_array($SqlPH); $ResPL=mysql_fetch_array($SqlPL); 
   $ResEL=mysql_fetch_array($SqlEL); $ResFL=mysql_fetch_array($SqlFL); $ResTL=mysql_fetch_array($SqlTL); 
   $ResML=mysql_fetch_array($SqlML); $ResHf=mysql_fetch_array($SqlHf); $ResPresent=mysql_fetch_array($SqlPresent); 
   $ResAbsent=mysql_fetch_array($SqlAbsent); $ResOnDuties=mysql_fetch_array($SqlOnDuties);  
   $ResHoliday=mysql_fetch_array($SqlHoliday); $ResELSun=mysql_fetch_array($SqlELSun);

   $CountCL=$ResCL['CL']; $CountCH=$ResCH['CH']/2; $TotalCL=$CountCL+$CountCH; $CountSL=$ResSL['SL']; 
   $CountSH=$ResSH['SH']/2; $TotalSL=$CountSL+$CountSH;  $CountPH=$ResPH['PH']/2; $TotalPL=$ResPL['PL']+$CountPH; 
   $TotalEL=$ResEL['EL']; $TotalML=$ResML['ML']; $TotalFL=$ResFL['FL']; $TotalTL=$ResTL['TL']; 
   $TotELSun=$ResELSun['SUN']; $CountHf=$ResHf['Hf']/2;   
   $TotalLeaveCount=$TotalCL+$TotalSL+$TotalPL+$TotalEL+$TotalFL+$TotalTL+$TotalML; 
   $TotalPR=$ResPresent['Present']+$CountCH+$CountSH+$CountPH+$CountHf;  //$TotalPR=$ResPresent['Present']+$CountHf; 
   $TotalAbsent=$ResAbsent['Absent']+$CountHf;
   $TotalOnDuties=$ResOnDuties['OnDuties']; $TotalHoliday=$ResHoliday['Holiday']; 
   $TotalDayWithSunEL=$TotalPR+$TotalLeaveCount+$TotalOnDuties+$TotalHoliday;
   $TotalPaidDay=$TotalDayWithSunEL-$TotELSun;
   $TotalWorkingDay=26;*/
   
    /******************** hrm_employee_monthlyleave_balance open**************************/
	  $SL=mysql_query("select * from hrm_employee_monthlyleave_balance where EmployeeID=".$EMPID." AND Month='".$m."' AND Year='".$Y."'", $con);  
	  $RowL=mysql_num_rows($SL);
	  if($RowL>0) { $RL=mysql_fetch_assoc($SL); 
	  if($m!=1) { $TotBalCL=$RL['OpeningCL']-$TotalCL;  $TotBalSL=$RL['OpeningSL']-$TotalSL; $TotBalPL=$RL['OpeningPL']-$TotalPL;  $TotBalEL=$RL['OpeningEL']-$TotalEL; 
	              $TotBalFL=$RL['OpeningOL']-$TotalFL; $TotBalML=$RL['OpeningML']-$TotalML; }  
	  if($m==1) { $TotBalCL=$RL['TotCL']-$TotalCL;  $TotBalSL=$RL['TotSL']-$TotalSL; $TotBalPL=$RL['TotPL']-$TotalPL;  $TotBalEL=$RL['TotEL']-$TotalEL; 
	              $TotBalFL=$RL['TotOL']-$TotalFL; $TotBalML=$RL['TotML']-$TotalML; }  
	  
	  $sUpL=mysql_query("UPDATE hrm_employee_monthlyleave_balance set AvailedCL='".$TotalCL."', AvailedSL='".$TotalSL."', AvailedPL='".$TotalPL."', AvailedEL='".$TotalEL."', AvailedML='".$TotalML."', AvailedOL='".$TotalFL."', AvailedTL='".$TotalTL."', BalanceCL='".$TotBalCL."', BalanceSL='".$TotBalSL."', BalancePL='".$TotBalPL."', BalanceEL='".$TotBalEL."', BalanceML='".$TotBalML."', BalanceOL='".$TotBalFL."', MonthAtt_TotLeave='".$TotalLeaveCount."', MonthAtt_TotOD='".$TotalOnDuties."', MonthAtt_TotHO='".$TotalHoliday."', MonthAtt_TotPR='".$TotalPR."', MonthAtt_TotAP='".$TotalAbsent."', MonthAtt_TotWorkDay='".$TotalWorkingDay."', MonthAtt_TotPaidDay='".$TotalPaidDay."' where EmployeeID=".$EMPID." AND Month='".$m."' AND Year='".$_REQUEST['y']."'", $con); }
	  /****************** hrm_employee_monthlyleave_balance close *************************/
  
  if($sUpL) 
    {  
/************************************************************************/
/*
for($i=1; $i<=31; $i++)
{ $sAtt=mysql_query("select AttValue from ".$AttTable." where EmployeeID=".$EMPID." AND AttDate='".date($Y.'-'.$m.'-'.$i)."'", $con); $rowAtt=mysql_num_rows($sAtt); 
  if($rowAtt>0)
  { 
    if($i==1)
	{
     $resAtt=mysql_fetch_assoc($sAtt); $sIAtt=mysql_query("select * from hrm_employee_attreport where EmployeeID=".$EMPID." AND Month=".$m." AND Year=".$Y, $con); $rowIAtt=mysql_num_rows($sIAtt);
     if($rowIAtt>0){ $sUAtt=mysql_query("update hrm_employee_attreport set A".$i."='".$resAtt['AttValue']."' where EmployeeID=".$EMPID." AND Month=".$m." AND Year=".$Y, $con); }
     else { $sUAtt=mysql_query("insert into hrm_employee_attreport(EmployeeID, Month, Year, A".$i.", YearId) values(".$EMPID.", ".$m.", ".$Y.", '".$resAtt['AttValue']."', ".$YearId.")", $con);	}
	}
	else
	{
	 $sUAtt=mysql_query("update hrm_employee_attreport set A".$i."='".$resAtt['AttValue']."' where EmployeeID=".$EMPID." AND Month=".$m." AND Year=".$Y, $con);
	} 
  } 
  
}
*/
/************************************************************************/	
	
	  if($InsUpFinYear){$msg="Employee attendance date updated successfully"; }
	}
  
  }
}



/* Open Monthaly Pay process */ 
if($_REQUEST['action']=='PayMonthPro' && $_REQUEST['mp']!='')
{ 
 $m=$_REQUEST['mp']; $Y=$_REQUEST['yp']; $id=$_REQUEST['ID']; 
 $fd=date("Y",strtotime($_SESSION['fromdate'])); $td=date("Y",strtotime($_SESSION['todate'])); $PRD=$fd.'-'.$td;
 $sqlStD=mysql_query("select * from hrm_company_statutory_tds where CompanyId=".$CompanyId." AND Status='A'", $con); $resStD=mysql_fetch_assoc($sqlStD);
 $sqlE=mysql_query("select DepartmentId,DesigId,GradeId,DateJoining from hrm_employee_general where EmployeeID=".$id." AND DateJoining<='".date($Y.'-'.$m.'-31')."' ", $con); $resE=mysql_fetch_assoc($sqlE);

   $sqlME=mysql_query("select * from hrm_employee_monthlyleave_balance where Year=".$Y." AND EmployeeID=".$id." AND Month=".$m."", $con); $rowME=mysql_num_rows($sqlME); 
   //echo 'aa='.$rowME;
   if($rowME>0) 
   {  
	  $resME=mysql_fetch_assoc($sqlME);
	  if($m==1 OR $m==2 OR $m==3 OR $m==4 OR $m==5 OR $m==6 OR $m==7 OR $m==8 OR $m==9){ $FY=date("Y")-1; $TY=date("Y"); }
	  elseif($m==10 OR $m==11 OR $m==12){ $FY=date("Y"); $TY=date("Y"); } 
	  $FromD=$FY.'-10-01'; $ToD=$TY.'-'.$m.'-31';
	  
	  /*
	  
	  if($resE['DateJoining']<='2019-12-31')
	  { 
	     $sqlQ=mysql_query("select * from hrm_employee_ctc where SalChangeDate='2020-04-01' and EmployeeID=".$id,$con);  
	     $rowQ=mysql_num_rows($sqlQ);
	     
	     if($rowQ>0){ $ExtQry="CtcCreatedDate='2020-04-01'";  }
	     else{ $ExtQry="CtcCreatedDate<='2019-12-31'";  }
	     
	     //$ExtQry="CtcCreatedDate<='2019-12-31'"; 
	  }
	  else
	  { 
	    $ExtQry="CtcCreatedDate>='".$FromD."' AND CtcCreatedDate<='".$ToD."'";
	  }
	  

	  //$sql_1=mysql_query("select MAX(CtcId) as MaxID from hrm_employee_ctc where EmployeeID=".$id." AND CtcCreatedDate!='0000-00-00' AND CtcCreatedDate!='1970-01-01' AND CtcCreatedDate>='".$FromD."' AND CtcCreatedDate<='".$ToD."'", $con); 
	  
	  $sql_1=mysql_query("select MAX(CtcId) as MaxID from hrm_employee_ctc where EmployeeID=".$id." AND CtcCreatedDate!='0000-00-00' AND CtcCreatedDate!='1970-01-01' AND ".$ExtQry."", $con);
	  
	  $row_1=mysql_num_rows($sql_1);
	  $res_1=mysql_fetch_assoc($sql_1); $MaxCtcId=$res_1['MaxID']; 
	  
	  if($resE['DateJoining']>='2020-01-01'){$sqlCTC=mysql_query("select * from hrm_employee_ctc where EmployeeID=".$id." AND Status='A'", $con);}
	  elseif($MaxCtcId!=''){$sqlCTC=mysql_query("select * from hrm_employee_ctc where EmployeeID=".$id." AND CtcId=".$MaxCtcId, $con);}
	  */
	  
	  $sqlCTC=mysql_query("select * from hrm_employee_ctc where EmployeeID=".$id." AND Status='A'", $con);
	  
	  $resCTC=mysql_fetch_assoc($sqlCTC);  

	  $SqlLumSum=mysql_query("select hrm_company_statutory_lumpsum.*,hrm_company_statutory_taxsaving.*,hrm_company_statutory_pf.* from hrm_company_statutory_lumpsum INNER JOIN hrm_company_statutory_taxsaving ON hrm_company_statutory_lumpsum.CompanyId=hrm_company_statutory_taxsaving.CompanyId INNER JOIN hrm_company_statutory_pf ON hrm_company_statutory_lumpsum.CompanyId=hrm_company_statutory_pf.CompanyId where hrm_company_statutory_lumpsum.CompanyId=".$CompanyId, $con); $ResLumSum=mysql_fetch_assoc($SqlLumSum);
	
	   $WorkDay=$resME['MonthAtt_TotWorkDay'];
       $PaidDay=$_REQUEST['MPD'];
       //echo 'aa='.$WorkDay; 
	   
	   //echo "update hrm_employee_monthlyleave_balance set MonthAtt_TotPaidDay=".$PaidDay." where Year=".$Y." AND EmployeeID=".$id." AND Month=".$m."";
	   
	   $sqlUp=mysql_query("update hrm_employee_monthlyleave_balance set MonthAtt_TotPaidDay=".$PaidDay." where Year=".$Y." AND EmployeeID=".$id." AND Month=".$m."",$con);
	   $Absent=$resME['MonthAtt_TotAP'];
	   
       if($resCTC['BAS_Value']>0){$OneDay_Basic=$resCTC['BAS_Value']/$WorkDay; $Basic=round($OneDay_Basic*$PaidDay);} else {$Basic=0;}
       if($resCTC['SPECIAL_ALL_Value']>0){$OneDay_Spe=$resCTC['SPECIAL_ALL_Value']/$WorkDay; $Special=round($OneDay_Spe*$PaidDay);}else{$Special=0;}
       
	   $ctcPf=round(($resCTC['BAS_Value']*12)/100);
	   //if($resCTC['EmpBSActPf']=='Y' && $resCTC['BAS_Value']<=$ResLumSum['Pf_MaxSalPf'])
	   //echo $resCTC['EmpBSActPf'].' - '.$Basic.'<='.$ResLumSum['Pf_MaxSalPf'];
	   if($resCTC['EmpBSActPf']=='Y' && $Basic<=$ResLumSum['Pf_MaxSalPf'])
	   { 
	      
	    $TotSalBS=$resCTC['BAS_Value']+$resCTC['SPECIAL_ALL_Value'];
		if($PaidDay<$WorkDay)
		{
		  $PFBas=$Basic+$Special;
		  if($PFBas<=$ResLumSum['Pf_MaxSalPf']){$PFBasic=$PFBas;}
		  else{ $PFBasic=$ResLumSum['Pf_MaxSalPf']; }
		}
		else
		{ 
		  if($TotSalBS<=$ResLumSum['Pf_MaxSalPf']){ $PFBasic=$TotSalBS; }
	      else{ $PFBasic=$ResLumSum['Pf_MaxSalPf']; } 
		}
	   }
	   elseif($resCTC['PF_Employee_Contri_Value']==$ctcPf OR $Basic<=$ResLumSum['Pf_MaxSalPf'])
	   { $PFBasic=$Basic; }
	   else{ $PFBasic=$ResLumSum['Pf_MaxSalPf']; }
	  
	   /*$ctcPf=round(($resCTC['BAS_Value']*12)/100);
	   if($resCTC['PF_Employee_Contri_Value']==$ctcPf OR $Basic<=$ResLumSum['Pf_MaxSalPf'])
	   { $PFBasic=$Basic; }
	   else{ $PFBasic=$ResLumSum['Pf_MaxSalPf']; }*/
	   
       //if($Basic<=$ResLumSum['Pf_MaxSalPf']){$PFBasic=$Basic;}else{$PFBasic=$ResLumSum['Pf_MaxSalPf'];}
       
       if($resCTC['Bonus_Month']>0) {$OneDay_Bonus=$resCTC['Bonus_Month']/$WorkDay; $Bonus=round($OneDay_Bonus*$PaidDay);}else{$Bonus=0;}
	   
	   if($resCTC['STIPEND_Value']>0) {$OneDay_Stip=$resCTC['STIPEND_Value']/$WorkDay; $Stip=round($OneDay_Stip*$PaidDay);} else {$Stip=0;}
	   if($resCTC['HRA_Value']>0) {$OneDay_Hra=$resCTC['HRA_Value']/$WorkDay; $HRA=round($OneDay_Hra*$PaidDay);} else {$HRA=0;}
	   if($resCTC['CONV_Value']>0) {$OneDay_Con=$resCTC['CONV_Value']/$WorkDay; $Con=round($OneDay_Con*$PaidDay);} else {$Con=0;}
	   if($resCTC['SPECIAL_ALL_Value']>0) {$OneDay_Spe=$resCTC['SPECIAL_ALL_Value']/$WorkDay; $Special=round($OneDay_Spe*$PaidDay);} else {$Special=0;}
	   if($resCTC['CHILD_EDU_ALL_Value']>0)
	   { if($resCTC['CHILD_EDU_ALL_Value']==1200){$CEA=$ResLumSum['CEA_PerChildMonth'];} if($resCTC['CHILD_EDU_ALL_Value']==2400){$CEA=$ResLumSum['CEA_PerChildMonth']*2;} } 
	   else{$CEA=0;}
	   if($resCTC['MED_REM_Value']>0) {$MR=$ResLumSum['MR_PerMonth'];} else {$MR=0;}  
	   if($resCTC['LTA_Value']>0){$LTA=round($resCTC['LTA_Value']/12);} else {$LTA=0;}  

       //$Emp_PF=round(($PFBasic*12)/100); 
       $Emp_PF=ceil(($PFBasic*12)/100);  //uperside
       
       
       $Emp_EPS=0; $Emp_EDLI=0; $Emp_PFAdminCharge=0; $Emp_EDLIAdminCharge=0;
	   $Contri_PF=round(($PFBasic*$ResLumSum['Pf_PfContriRate'])/100); $Contri_EPS=round(($PFBasic*$ResLumSum['Pf_EpsContriRate'])/100); 
	   $Contri_EDLI=round(($PFBasic*$ResLumSum['Pf_DliContribution'])/100);  $Contri_PFAdminCharge=round(($PFBasic*$ResLumSum['Pf_PfAdminCharge'])/100); 
	   $Contri_EDLIAdminCharge=round((($PFBasic*$ResLumSum['Pf_DliAdminCharge'])/100), 2);
	   $TotPF_Emp=$Emp_PF+$Emp_EPS+$Emp_EDLI+$Emp_PFAdminCharge+$Emp_EDLIAdminCharge;
	   $TotPF_Contri=$Contri_PF+$Contri_EPS+$Contri_EDLI+$Contri_PFAdminCharge+$Contri_EDLIAdminCharge;
	   $TotPF=$TotPF_Emp+$TotPF_Contri;
	   if($resCTC['GrossSalary_PostAnualComponent_Value']>0){ $TotGross=$Basic+$HRA+$Con+$Special+$Bonus; } 
	   else {$TotGross=0;}
	   
           //if($resCTC['ESCI']>0){ $ESCI=round(($TotGross*0.75)/100); $ComESCI=round(($TotGross*3.25)/100); }
	   //else{ $ESCI=0; $ComESCI=0; }
	   
	   if($resCTC['ESCI']>0){ $ESCI=ceil(($TotGross*0.75)/100); $ComESCI=round((($TotGross*3.25)/100), 1, PHP_ROUND_HALF_UP); }
	else{ $ESCI=0; $ComESCI=0; } //round( 1.55, 1, PHP_ROUND_HALF_UP);
	   
	   
//echo 'aa='.$TotGross.'<br>';
//echo 'aa='.$ESCI;
	   $TotDeduct=$TotPF_Emp+$ESCI;
	   $Tot_NetAmount=$TotGross-$TotDeduct;
	   $YI=$YearId;
	   $sqlME2=mysql_query("select * from hrm_employee_monthlypayslip where EmployeeID=".$id." AND Month=".$m." AND Year=".$Y."", $con); $rowME2=mysql_num_rows($sqlME2);
	   
	   //echo 'aa='.$rowME2;
	   
	   if($rowME2>0){ $sqlUp=mysql_query("update hrm_employee_monthlypayslip set DepartmentId=".$resE['DepartmentId'].", DesigId=".$resE['DesigId'].", GradeId=".$resE['GradeId'].", TotalDay=".$WorkDay.", PaidDay=".$PaidDay.", Absent=".$Absent.", ActualBasic=".$resCTC['BAS_Value'].", Basic=".$Basic.",  Stipend=".$Stip.", Hra=".$HRA.", Convance=".$Con.", Bonus_Month=".$Bonus.", Special=".$Special.", CEA_Ded=".$CEA.", MA_Ded=".$MR.", LTA_Ded=".$LTA.", EPF_Employee=".$Emp_PF.", EPF_Employer=".$Contri_PF.", ESCI_Employee=".$ESCI.", ESCI_Employer=".$ComESCI.", EPS_Employee=".$Emp_EPS.", EPS_Employer=".$Contri_EPS.", EDLI_Employee=".$Emp_EDLI.", EDLI_Employer=".$Contri_EDLI.", EPF_AdminCharge_Employee=".$Emp_PFAdminCharge.", EPF_AdminCharge_Employer=".$Contri_PFAdminCharge.", EDLI_AdminCharge_Employee=".$Emp_EDLIAdminCharge.", EDLI_AdminCharge_Employer=".$Contri_EDLIAdminCharge.", Tot_Pf_Employee=".$TotPF_Emp.", Tot_Pf_Employer=".$TotPF_Contri.", Tot_Pf=".$TotPF.", Tot_Gross=".$TotGross.", Tot_Deduct=".$TotDeduct.", Tot_NetAmount=".$Tot_NetAmount.", PaySlipCreatedBy=".$UserId.", PaySlipCreatedDate='".date("Y-m-d")."', PaySlipYearId=".$YearId." where EmployeeID=".$id." AND Month=".$m." AND Year=".$Y."", $con); }
	   if($rowME2==0){ $sqlUp=mysql_query("insert into hrm_employee_monthlypayslip(EmployeeID, Month, Year, DepartmentId, DesigId, GradeId, TotalDay, PaidDay, Absent, ActualBasic, Basic, Stipend, Hra, Convance, Bonus_Month, Special, CEA_Ded, MA_Ded, LTA_Ded, EPF_Employee, EPF_Employer, ESCI_Employee, ESCI_Employer, EPS_Employee, EPS_Employer, EDLI_Employee, EDLI_Employer, EPF_AdminCharge_Employee, EPF_AdminCharge_Employer, EDLI_AdminCharge_Employee, EDLI_AdminCharge_Employer, Tot_Pf_Employee, Tot_Pf_Employer, Tot_Pf, Tot_Gross, Tot_Deduct, Tot_NetAmount, PaySlipCreatedBy, PaySlipCreatedDate, PaySlipYearId) values(".$id.", ".$m.", ".$Y.", ".$resE['DepartmentId'].", ".$resE['DesigId'].", ".$resE['GradeId'].", ".$WorkDay.", ".$PaidDay.", ".$Absent.", ".$resCTC['BAS_Value'].", ".$Basic.",  ".$Stip.", ".$HRA.", ".$Con.", ".$Bonus.", ".$Special.", ".$CEA.", ".$MR.", ".$LTA.", ".$Emp_PF.", ".$Contri_PF.", ".$ESCI.", ".$ComESCI.", ".$Emp_EPS.", ".$Contri_EPS.", ".$Emp_EDLI.", ".$Contri_EDLI.", ".$Emp_PFAdminCharge.", ".$TotPF_Contri.", ".$Emp_EDLIAdminCharge.", ".$Contri_EDLIAdminCharge.", ".$TotPF_Emp.", ".$TotPF_Contri.", ".$TotPF.", ".$TotGross.", ".$TotDeduct.", ".$Tot_NetAmount.", ".$UserId.", '".date("Y-m-d")."', ".$YI.")", $con); }
	   
	   
	   /**************************************************/
	   /**************************************************/
	   
	   /**************************************************/
	   /**************************************************/
	   
	   
	   
	 } 
	 
/* TDS Component Process Open */	/* TDS Component Process Open */	/* TDS Component Process Open */	

/* Upload Hear PaySlipTdsProcess2.php check file same folder */

/* TDS Component Process Close */	 /* TDS Component Process Close */	/* TDS Component Process Close */	


  if($sqlUp) {  $msgPay='Successfully process monthly pay...';  }
}
/* Close Monthaly Pay process */



/* Open Arrear Pay process */ 

if($_REQUEST['action']=='ArrPayMonthPro' && $_REQUEST['mp']!='')
{ 
 $m=$_REQUEST['mp']; $Y=$_REQUEST['yp']; $id=$_REQUEST['ID']; 
 $fd=date("Y",strtotime($_SESSION['fromdate'])); $td=date("Y",strtotime($_SESSION['todate'])); $PRD=$fd.'-'.$td;
 
	  if($m==1 OR $m==2 OR $m==3 OR $m==4 OR $m==5 OR $m==6 OR $m==7 OR $m==8 OR $m==9){ $FY=date("Y")-1; $TY=date("Y"); }
	  elseif($m==10 OR $m==11 OR $m==12){ $FY=date("Y"); $TY=date("Y"); } 
	  $FromD=$FY.'-10-01'; $ToD=$TY.'-'.$m.'-31';

	  $sql_1=mysql_query("select MAX(CtcId) as MaxID from hrm_employee_ctc where EmployeeID=".$id." AND CtcCreatedDate!='0000-00-00' AND CtcCreatedDate!='1970-01-01' AND CtcCreatedDate>='".$FromD."' AND CtcCreatedDate<='".$ToD."'", $con); $row_1=mysql_num_rows($sql_1);
	  $res_1=mysql_fetch_assoc($sql_1); $MaxCtcId=$res_1['MaxID']; 
if($MaxCtcId!=''){$sqlCTC=mysql_query("select * from hrm_employee_ctc where EmployeeID=".$id." AND CtcId=".$MaxCtcId,$con);}
elseif($MaxCtcId==''){$sqlCTC=mysql_query("select * from hrm_employee_ctc where EmployeeID=".$id." AND Status='A'",$con);}
$resCTC=mysql_fetch_assoc($sqlCTC);  

	  $SqlLumSum=mysql_query("select hrm_company_statutory_lumpsum.*,hrm_company_statutory_taxsaving.*,hrm_company_statutory_pf.* from hrm_company_statutory_lumpsum INNER JOIN hrm_company_statutory_taxsaving ON hrm_company_statutory_lumpsum.CompanyId=hrm_company_statutory_taxsaving.CompanyId INNER JOIN hrm_company_statutory_pf ON hrm_company_statutory_lumpsum.CompanyId=hrm_company_statutory_pf.CompanyId where hrm_company_statutory_lumpsum.CompanyId=".$CompanyId, $con); $ResLumSum=mysql_fetch_assoc($SqlLumSum);
	
	    $WDay=26; $PDay=$_REQUEST['MPD'];

if($resCTC['BAS_Value']>0){$OneD_Bas=$resCTC['BAS_Value']/$WDay; $Bas=round($OneD_Bas*$PDay);}else{$Bas=0;}
if($resCTC['HRA_Value']>0){$OneD_Hra=$resCTC['HRA_Value']/$WDay; $HRA=round($OneD_Hra*$PDay);}else{$HRA=0;}
if($resCTC['CONV_Value']>0){$OneD_Con=$resCTC['CONV_Value']/$WDay; $Con=round($OneD_Con*$PDay);}else{$Con=0;}
if($resCTC['SPECIAL_ALL_Value']>0){$OneD_Spe=$resCTC['SPECIAL_ALL_Value']/$WDay; $Spe=round($OneD_Spe*$PDay);}else{$Spe=0;}
if($Bas>0){$ArrPF=round(($Bas*12)/100);}else{$ArrPF=0;}
$TotGross=$Bas+$HRA+$Con+$Spe;
if($resCTC['ESCI']>0){$ESCI=round(($TotGross*0.75)/100); $ComESCI=round(($TotGross*3.25)/100);}else{$ESCI=0; $ComESCI=0;}

	   $YI=$YearId;
	   $sqlME2=mysql_query("select * from hrm_employee_monthlypayslip where EmployeeID=".$id." AND Month=".$m." AND Year=".$Y."", $con); $rowME2=mysql_num_rows($sqlME2);
	   if($rowME2>0){ $sqlUp=mysql_query("update hrm_employee_monthlypayslip set VariableAdjustment=".$TotGross.", Ext_paidday=".$PDay.", Ext_bas=".$Bas.", Ext_hra=".$HRA.", Ext_con=".$Con.", Ext_spl=".$Spe.", Ext_pf=".$ArrPF.", Ext_esic=".$ESCI." where EmployeeID=".$id." AND Month=".$m." AND Year=".$Y,$con); }
	   
       if($sqlUp){ $msgArrPay='Successfully process arrear pay...';  }
}
/* Close Arrear Pay process */


/* Open Set Holiday */ 
if($_REQUEST['action']=='SetEmpAttHoliday' && $_REQUEST['mp']!='' && $_REQUEST['y']==date("Y"))
{ 
 $m=$_REQUEST['m']; $Y=$_REQUEST['y']; $id=$_REQUEST['ID'];  
 $cc=mysql_query("select CostCenter from hrm_employee_general where EmployeeID=".$id,$con);
 $rcc=mysql_fetch_assoc($cc); $cc=$rcc['CostCenter'];
 if($cc!=1 AND $cc!=14 AND $cc!=13 AND $cc!=26 AND $cc!=30 AND $cc!=0)
 {
  $sqlS_1=mysql_query("select HolidayDate from hrm_holiday where State_1=1 AND Year='".$Y."' AND HolidayDate>='".date($Y."-".$m."-d")."' AND status='A' order by HolidayId ASC",$con); 
  while($resS_1=mysql_fetch_array($sqlS_1))
  { echo 'aa='.$resS_1['HolidayDate'].' ';
   $sql_1=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$id." AND AttDate='".$resS_1['HolidayDate']."'",$con); $row_1=mysql_num_rows($sql_1);
   if($row_1==0){ $sIns=mysql_query("insert into hrm_employee_attendance(EmployeeID,AttValue,AttDate,Year,YearId)values(".$id.",'HO','".$resS_1['HolidayDate']."','".$Y."',".$YearId.")",$con); }
   elseif($row_1>0){ $sUp=mysql_query("UPDATE hrm_employee_attendance SET AttValue='HO' where EmployeeID=".$id." AND AttDate='".$resS_1['HolidayDate']."' AND YearId=".$YearId,$con); } 
  }
 }
 elseif(($cc==1 OR $cc==14 OR $cc==13 OR $cc==26 OR $cc==30) AND $cc!=0)
 {
  $sqlS_2=mysql_query("select HolidayDate from hrm_holiday where State_2=1 AND Year='".$Y."' AND status='A' AND HolidayDate>='".date($Y."-".$m."-d")."' order by HolidayId ASC",$con); 
  while($resS_2=mysql_fetch_array($sqlS_2))
  { echo 'bb='.$resS_2['HolidayDate'].' ';
   $sql_2=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$id." AND AttDate='".$resS_2['HolidayDate']."'",$con); $row_2=mysql_num_rows($sql_2);
   if($row_2==0) { $sIns=mysql_query("insert into hrm_employee_attendance(EmployeeID,AttValue,AttDate,Year,YearId)values(".$id.",'HO','".$resS_2['HolidayDate']."','".$Y."',".$YearId.")",$con); }
   elseif($row_2>0) { $sUp=mysql_query("UPDATE hrm_employee_attendance SET AttValue='HO' where EmployeeID=".$id." AND AttDate='".$resS_2['HolidayDate']."' AND YearId=".$YearId,$con); } 
  }
 }
 else
 {
  $sqlS_3=mysql_query("select HolidayDate from hrm_holiday where State_3=1 AND Year='".$Y."' AND status='A' AND HolidayDate>='".date($Y."-".$m."-d")."' order by HolidayId ASC",$con); 
  while($resS_3=mysql_fetch_array($sqlS_3))
  { echo 'cc='.$resS_3['HolidayDate'].' ';
   $sql_3=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$id." AND AttDate='".$resS_3['HolidayDate']."'",$con); $row_3=mysql_num_rows($sql_3);
   if($row_3==0){ $sIns=mysql_query("insert into hrm_employee_attendance(EmployeeID,AttValue,AttDate,Year,YearId)values(".$id.",'HO','".$resS_3['HolidayDate']."','".$Y."',".$YearId.")",$con); }
   elseif($row_2>0){ $sUp=mysql_query("UPDATE hrm_employee_attendance SET AttValue='HO' where EmployeeID=".$id." AND AttDate='".$resS_3['HolidayDate']."' AND YearId=".$YearId,$con); } 
  }
 }
} 
 /* Close Set Holiday */


if($_REQUEST['action']=='LeaveMonthPro' && $_REQUEST['mp']!='')
{ 
 $m=$_REQUEST['mp']; $Y=$_REQUEST['yp']; $id=$_REQUEST['ID']; 
 $fd=date("Y",strtotime($_SESSION['fromdate'])); $td=date("Y",strtotime($_SESSION['todate'])); $PRD=$fd.'-'.$td;   
 for($i=1; $i<=31; $i++)
 { $sAtt=mysql_query("select AttValue from hrm_employee_attendance_2020 where EmployeeID=".$id." AND AttDate='".date($Y.'-'.$m.'-'.$i)."'", $con); $rowAtt=mysql_num_rows($sAtt); 
  if($rowAtt>0)
  { $resAtt=mysql_fetch_assoc($sAtt); 
	if($i==1)
	{
	 $sIAtt=mysql_query("select * from hrm_employee_attreport where EmployeeID=".$id." AND Month=".$m." AND Year=".$Y, $con); $rowIAtt=mysql_num_rows($sIAtt);
	 if($rowIAtt>0)
	 { $sUAtt=mysql_query("update hrm_employee_attreport set A".$i."='".$resAtt['AttValue']."' where EmployeeID=".$id." AND Month=".$m." AND Year=".$Y, $con); }
	 else
	 { $sUAtt=mysql_query("insert into hrm_employee_attreport(EmployeeID, Month, Year, A".$i.", YearId) values(".$id.", ".$m.", ".$Y.", '".$resAtt['AttValue']."', ".$YearId.")", $con); }
	} 
	else
	{
	 $sUAtt=mysql_query("update hrm_employee_attreport set A".$i."='".$resAtt['AttValue']."' where EmployeeID=".$id." AND Month=".$m." AND Year=".$Y, $con);
	}
  } 
 } //for($i=1; $i<=31; $i++)
 
 
 /***************************************/
 /***************************************/
 $SqlCL=mysql_query("select count(DISTINCT AttDate)as CL from hrm_employee_attendance_2020 where AttValue='CL' AND EmployeeID=".$id." AND (AttDate between '".date($Y."-".$m."-1")."' AND '".date($Y."-".$m."-31")."')", $con); 
 $SqlCH=mysql_query("select count(DISTINCT AttDate)as CH from hrm_employee_attendance_2020 where AttValue='CH' AND EmployeeID=".$id." AND (AttDate between '".date($Y."-".$m."-1")."' AND '".date($Y."-".$m."-31")."')", $con); 
 $SqlSL=mysql_query("select count(DISTINCT AttDate)as SL from hrm_employee_attendance_2020 where AttValue='SL' AND EmployeeID=".$id." AND (AttDate between '".date($Y."-".$m."-1")."' AND '".date($Y."-".$m."-31")."')", $con); 
 $SqlSH=mysql_query("select count(DISTINCT AttDate)as SH from hrm_employee_attendance_2020 where AttValue='SH' AND EmployeeID=".$id." AND (AttDate between '".date($Y."-".$m."-1")."' AND '".date($Y."-".$m."-31")."')", $con); 
 $SqlPH=mysql_query("select count(DISTINCT AttDate)as PH from hrm_employee_attendance_2020 where AttValue='PH' AND EmployeeID=".$id." AND (AttDate between '".date($Y."-".$m."-1")."' AND '".date($Y."-".$m."-31")."')", $con); 
 $SqlPL=mysql_query("select count(DISTINCT AttDate)as PL from hrm_employee_attendance_2020 where AttValue='PL' AND EmployeeID=".$id." AND (AttDate between '".date($Y."-".$m."-1")."' AND '".date($Y."-".$m."-31")."')", $con); 
 $SqlEL=mysql_query("select count(DISTINCT AttDate)as EL from hrm_employee_attendance_2020 where AttValue='EL' AND EmployeeID=".$id." AND (AttDate between '".date($Y."-".$m."-1")."' AND '".date($Y."-".$m."-31")."')", $con); 
 $SqlHf=mysql_query("select count(DISTINCT AttDate)as Hf from hrm_employee_attendance where AttValue='HF' AND EmployeeID=".$id." AND (AttDate between '".date($Y."-".$m."-1")."' AND '".date($Y."-".$m."-31")."')", $con); 
 
 $SqlAch=mysql_query("select count(DISTINCT AttDate)as ACH from hrm_employee_attendance_2020 where AttValue='ACH' AND EmployeeID=".$id." AND (AttDate between '".date($Y."-".$m."-1")."' AND '".date($Y."-".$m."-31")."')", $con);
 $SqlAsh=mysql_query("select count(DISTINCT AttDate)as ASH from hrm_employee_attendance_2020 where AttValue='ASH' AND EmployeeID=".$id." AND (AttDate between '".date($Y."-".$m."-1")."' AND '".date($Y."-".$m."-31")."')", $con);
 $SqlAph=mysql_query("select count(DISTINCT AttDate)as APH from hrm_employee_attendance_2020 where AttValue='APH' AND EmployeeID=".$id." AND (AttDate between '".date($Y."-".$m."-1")."' AND '".date($Y."-".$m."-31")."')", $con);
 
 $SqlPresent=mysql_query("select count(DISTINCT AttDate)as Present from hrm_employee_attendance_2020 where (AttValue='P' OR AttValue='WFH') AND EmployeeID=".$id." AND (AttDate between '".date($Y."-".$m."-1")."' AND '".date($Y."-".$m."-31")."')", $con); 
 $SqlAbsent=mysql_query("select count(DISTINCT AttDate)as Absent from hrm_employee_attendance_2020 where AttValue='A' AND EmployeeID=".$id." AND (AttDate between '".date($Y."-".$m."-1")."' AND '".date($Y."-".$m."-31")."')", $con); 
 $SqlOnDuties=mysql_query("select count(DISTINCT AttDate)as OnDuties from hrm_employee_attendance_2020 where AttValue='OD' AND EmployeeID=".$id." AND (AttDate between '".date($Y."-".$m."-1")."' AND '".date($Y."-".$m."-31")."')", $con); 
 $SqlHoliday=mysql_query("select count(DISTINCT AttDate)as Holiday from hrm_employee_attendance_2020 where AttValue='HO' AND EmployeeID=".$id." AND (AttDate between '".date($Y."-".$m."-1")."' AND '".date($Y."-".$m."-31")."')", $con); 
 $SqlELSun=mysql_query("select count(CheckSunday)as SUN from hrm_employee_attendance_2020 where CheckSunday='Y' AND EmployeeID=".$id." AND (AttDate between '".date($Y."-".$m."-1")."' AND '".date($Y."-".$m."-31")."')", $con); 
 $SqlFL=mysql_query("select count(DISTINCT AttDate)as FL from hrm_employee_attendance_2020 where AttValue='FL' AND EmployeeID=".$id." AND (AttDate between '".date($Y."-".$m."-1")."' AND '".date($Y."-".$m."-31")."')", $con); 
 $SqlTL=mysql_query("select count(DISTINCT AttDate)as TL from hrm_employee_attendance_2020 where AttValue='TL' AND EmployeeID=".$id." AND (AttDate between '".date($Y."-".$m."-1")."' AND '".date($Y."-".$m."-31")."')", $con); 
 $SqlML=mysql_query("select count(DISTINCT AttDate)as ML from hrm_employee_attendance_2020 where AttValue='ML' AND EmployeeID=".$id." AND (AttDate between '".date($Y."-".$m."-1")."' AND '".date($Y."-".$m."-31")."')", $con);
      $ResCL=mysql_fetch_array($SqlCL); $ResCH=mysql_fetch_array($SqlCH); $ResSL=mysql_fetch_array($SqlSL); $ResSH=mysql_fetch_array($SqlSH); $ResPH=mysql_fetch_array($SqlPH); $ResPL=mysql_fetch_array($SqlPL); $ResEL=mysql_fetch_array($SqlEL); $ResFL=mysql_fetch_array($SqlFL); $ResHf=mysql_fetch_array($SqlHf); $ResPresent=mysql_fetch_array($SqlPresent); $ResAbsent=mysql_fetch_array($SqlAbsent); $ResOnDuties=mysql_fetch_array($SqlOnDuties); $ResHoliday=mysql_fetch_array($SqlHoliday); $ResELSun=mysql_fetch_array($SqlELSun); $ResTL=mysql_fetch_array($SqlTL); $ResML=mysql_fetch_array($SqlML);
	  $ResAch=mysql_fetch_array($SqlAch); $ResAsh=mysql_fetch_array($SqlAsh); $ResAph=mysql_fetch_array($SqlAph);

   $CountCL=$ResCL['CL']; $CountCH=$ResCH['CH']/2; $CountSL=$ResSL['SL']; 
   $CountSH=$ResSH['SH']/2; $CountPH=$ResPH['PH']/2; $TotalEL=$ResEL['EL']; $TotalFL=$ResFL['FL'];
   
   $CountAch=$ResAch['ACH']/2; $CountAsh=$ResAsh['ASH']/2; $CountAph=$ResAph['APH']/2;
   $TotalCL=$CountCL+$CountCH+$CountAch;
   $TotalSL=$CountSL+$CountSH+$CountAsh;   
   $TotalPL=$ResPL['PL']+$CountPH+$CountAph;
   
   $TotalTL=$ResTL['TL']; $TotalML=$ResML['ML']; 
   $TotalLeaveCount=$TotalCL+$TotalSL+$TotalPL+$TotalEL+$TotalFL+$TotalTL+$TotalML; 
   $CountHf=$ResHf['Hf']/2; $TotELSun=$ResELSun['SUN'];
   $TotalPR=$ResPresent['Present']+$CountCH+$CountSH+$CountPH+$CountHf;  
   $TotalAbsent=$ResAbsent['Absent']+$CountHf+$CountAch+$CountAsh+$CountAph; $TotalOnDuties=$ResOnDuties['OnDuties']; 
   $TotalHoliday=$ResHoliday['Holiday']; 
   $TotalDayWithSunEL=$TotalPR+$TotalLeaveCount+$TotalOnDuties+$TotalHoliday;
   $TotalPaidDay=$TotalDayWithSunEL-$TotELSun; $TotalWorkingDay=26;
   
/********************************************** Open 1 ***********/
   $SL=mysql_query("select * from hrm_employee_monthlyleave_balance where EmployeeID=".$id." AND Month='".$m."' AND Year='".$Y."'", $con);  $RowL=mysql_num_rows($SL);
   if($RowL>0){ $RL=mysql_fetch_assoc($SL); 
   if($m!=1)
   { 
    $TotBalCL=$RL['OpeningCL']-$TotalCL; $TotBalSL=$RL['OpeningSL']-$TotalSL; 
	$TotBalPL=$RL['OpeningPL']-$TotalPL;  $TotBalEL=$RL['OpeningEL']-$TotalEL; 
	$TotBalFL=$RL['OpeningOL']-$TotalFL; $TotBalML=$RL['OpeningML']-$TotalML; 
   }  
   if($m==1)
   { 
    $TotCLT=$RL['EnCashCL']+$TotalCL; $TotSLT=$RL['EnCashSL']+$TotalSL; 
	$TotPLT=$RL['EnCashPL']+$TotalPL; $TotELT=$RL['EnCashEL']+$TotalEL; 
	$TotBalCL=$RL['TotCL']-$TotCLT; $TotBalSL=$RL['TotSL']-$TotSLT; 
	$TotBalPL=$RL['TotPL']-$TotPLT;  $TotBalEL=$RL['TotEL']-$TotELT;
	$TotBalFL=$RL['TotOL']-$TotalFL; $TotBalML=$RL['TotML']-$TotalML; 
   }         
   
   $sUpL=mysql_query("UPDATE hrm_employee_monthlyleave_balance set AvailedCL='".$TotalCL."', AvailedSL='".$TotalSL."', AvailedPL='".$TotalPL."', AvailedEL='".$TotalEL."', AvailedML='".$TotalML."', AvailedOL='".$TotalFL."', AvailedTL='".$TotalTL."', BalanceCL='".$TotBalCL."', BalanceSL='".$TotBalSL."', BalancePL='".$TotBalPL."', BalanceEL='".$TotBalEL."', BalanceML='".$TotBalML."', BalanceOL='".$TotBalFL."', MonthAtt_TotLeave='".$TotalLeaveCount."', MonthAtt_TotOD='".$TotalOnDuties."', MonthAtt_TotHO='".$TotalHoliday."', MonthAtt_TotPR='".$TotalPR."', MonthAtt_TotAP='".$TotalAbsent."', MonthAtt_TotWorkDay='".$TotalWorkingDay."', MonthAtt_TotPaidDay='".$TotalPaidDay."' where EmployeeID=".$id." AND Month='".$m."' AND Year='".$Y."'", $con); 
   }
 /***************************************/
 /***************************************/
 
 
  /**************************************************/
  /**************************************************/
  /**************************************************
 
  if(date("m")==01){ if($m==12){$Y=date("Y")-1;}else{$Y=date("Y");} }
  if(date("m")!=01){ $Y=date("Y");}
  if($m==1){$NM=2; $NY=$Y;}
  elseif($m==2){$NM=3; $NY=$Y;}
  elseif($m==3){$NM=4; $NY=$Y;}
  elseif($m==4){$NM=5; $NY=$Y;}
  elseif($m==5){$NM=6; $NY=$Y;}
  elseif($m==6){$NM=7; $NY=$Y;}
  elseif($m==7){$NM=8; $NY=$Y;}
  elseif($m==8){$NM=9; $NY=$Y;}
  elseif($m==9){$NM=10; $NY=$Y;}
  elseif($m==10){$NM=11; $NY=$Y;}
  elseif($m==11){$NM=12; $NY=$Y;}
  elseif($m==12){$NM=1; $NY=$Y+1;}
  
     $sqlME=mysql_query("select * from hrm_employee_monthlyleave_balance where Year=".$Y." AND EmployeeID=".$id." AND Month=".$m."", $con); $rowME=mysql_num_rows($sqlME); 
   
   if($rowME>0) 
   { 
	$resME=mysql_fetch_assoc($sqlME);
	$sqlME2=mysql_query("select * from hrm_employee_monthlyleave_balance where EmployeeID=".$id." AND Month=".$NM." AND Year=".$NY."",$con); $rowME2=mysql_num_rows($sqlME2);
	
	if($rowME2>0){ $sqlUp=mysql_query("update hrm_employee_monthlyleave_balance set OpeningCL=".$resME['BalanceCL'].", OpeningSL=".$resME['BalanceSL'].", OpeningPL=".$resME['BalancePL'].", OpeningEL=".$resME['BalanceEL'].", OpeningOL=".$resME['BalanceOL'].", OpeningML=".$resME['BalanceML'].", BalanceCL=".$resME['BalanceCL'].", BalanceSL=".$resME['BalanceSL'].", BalancePL=".$resME['BalancePL'].", BalanceEL=".$resME['BalanceEL'].", BalanceOL=".$resME['BalanceOL'].", BalanceML=".$resME['BalanceML'].", CreatedBy=".$UserId.", CreatedDate='".date("Y-m-d")."', YearId=".$YearId." where EmployeeID=".$id." AND Month=".$NM." AND Year=".$NY, $con); }
	if($rowME2==0){ $sqlUp=mysql_query("insert into hrm_employee_monthlyleave_balance(EmployeeID, EC, Month, Year, OpeningCL, OpeningSL, OpeningPL, OpeningEL, OpeningOL, OpeningML, BalanceCL, BalanceSL, BalancePL, BalanceEL, BalanceOL, BalanceML, CreatedBy, CreatedDate, YearId) values(".$id.", ".$resME['EC'].", ".$NM.", ".$NY.", ".$resME['BalanceCL'].", ".$resME['BalanceSL'].", ".$resME['BalancePL'].", ".$resME['BalanceEL'].", ".$resME['BalanceOL'].", ".$resME['BalanceML'].", ".$resME['BalanceCL'].", ".$resME['BalanceSL'].", ".$resME['BalancePL'].", ".$resME['BalanceEL'].", ".$resME['BalanceOL'].", ".$resME['BalanceML'].", ".$UserId.", '".date("Y-m-d")."', ".$YearId.")", $con); }
	}
	
	//Att Process //
if($NM==1 OR $NM==3 OR $NM==5 OR $NM==7 OR $NM==8 OR $NM==10 OR $NM==12){ $day=31; } 
elseif($NM==4 OR $NM==6 OR $NM==9 OR $NM==11){ $day=30; }
elseif($NM==2){ if($NY==2012 OR $NY==2016 OR $NY==2020 OR $NY==2024 OR $NY==2028 OR $NY==2032 OR $NY==2036 OR $NY==2040){$day=29;}else{$day=28;} }
 
$SqlCL=mysql_query("select count(AttValue)as CL from hrm_employee_attendance where AttValue='CL' AND EmployeeID=".$id." AND (AttDate between '".date($NY."-".$NM."-1")."' AND '".date($NY."-".$NM."-".$day)."')",$con); 
$SqlCH=mysql_query("select count(AttValue)as CH from hrm_employee_attendance where AttValue='CH' AND EmployeeID=".$id." AND (AttDate between '".date($NY."-".$NM."-1")."' AND '".date($NY."-".$NM."-".$day)."')",$con); 
$SqlSL=mysql_query("select count(AttValue)as SL from hrm_employee_attendance where AttValue='SL' AND EmployeeID=".$id." AND (AttDate between '".date($NY."-".$NM."-1")."' AND '".date($NY."-".$NM."-".$day)."')",$con); 
$SqlSH=mysql_query("select count(AttValue)as SH from hrm_employee_attendance where AttValue='SH' AND EmployeeID=".$id." AND (AttDate between '".date($NY."-".$NM."-1")."' AND '".date($NY."-".$NM."-".$day)."')",$con); 
$SqlPH=mysql_query("select count(AttValue)as PH from hrm_employee_attendance where AttValue='PH' AND EmployeeID=".$id." AND (AttDate between '".date($NY."-".$NM."-1")."' AND '".date($NY."-".$NM."-".$day)."')",$con); 
$SqlPL=mysql_query("select count(AttValue)as PL from hrm_employee_attendance where AttValue='PL' AND EmployeeID=".$id." AND (AttDate between '".date($NY."-".$NM."-1")."' AND '".date($NY."-".$NM."-".$day)."')",$con); 
$SqlEL=mysql_query("select count(AttValue)as EL from hrm_employee_attendance where AttValue='EL' AND EmployeeID=".$id." AND (AttDate between '".date($NY."-".$NM."-1")."' AND '".date($NY."-".$NM."-".$day)."')",$con); 
$SqlML=mysql_query("select count(AttValue)as ML from hrm_employee_attendance where AttValue='ML' AND EmployeeID=".$id." AND (AttDate between '".date($NY."-".$NM."-1")."' AND '".date($NY."-".$NM."-".$day)."')",$con); 
$SqlFL=mysql_query("select count(AttValue)as FL from hrm_employee_attendance where AttValue='FL' AND EmployeeID=".$id." AND (AttDate between '".date($NY."-".$NM."-1")."' AND '".date($NY."-".$NM."-".$day)."')",$con); 
$SqlTL=mysql_query("select count(AttValue)as TL from hrm_employee_attendance where AttValue='TL' AND EmployeeID=".$id." AND (AttDate between '".date($NY."-".$NM."-1")."' AND '".date($NY."-".$NM."-".$day)."')",$con); 
$SqlHf=mysql_query("select count(AttValue)as Hf from hrm_employee_attendance where AttValue='HF' AND EmployeeID=".$id." AND (AttDate between '".date($NY."-".$NM."-1")."' AND '".date($NY."-".$NM."-".$day)."')",$con); 

$SqlAch=mysql_query("select count(DISTINCT AttDate)as ACH from hrm_employee_attendance where AttValue='ACH' AND EmployeeID=".$id." AND (AttDate between '".date($NY."-".$NM."-1")."' AND '".date($NY."-".$NM."-".$day)."')", $con);
$SqlAsh=mysql_query("select count(DISTINCT AttDate)as ASH from hrm_employee_attendance where AttValue='ASH' AND EmployeeID=".$id." AND (AttDate between '".date($NY."-".$NM."-1")."' AND '".date($NY."-".$NM."-".$day)."')", $con);
$SqlAph=mysql_query("select count(DISTINCT AttDate)as APH from hrm_employee_attendance where AttValue='APH' AND EmployeeID=".$id." AND (AttDate between '".date($NY."-".$NM."-1")."' AND '".date($NY."-".$NM."-".$day)."')", $con);

$SqlPresent=mysql_query("select count(AttValue)as Present from hrm_employee_attendance where (AttValue='P' OR AttValue='WFH') AND EmployeeID=".$id." AND (AttDate between '".date($NY."-".$NM."-1")."' AND '".date($NY."-".$NM."-".$day)."')",$con); 
$SqlAbsent=mysql_query("select count(AttValue)as Absent from hrm_employee_attendance where AttValue='A' AND EmployeeID=".$id." AND (AttDate between '".date($NY."-".$NM."-1")."' AND '".date($NY."-".$NM."-".$day)."')",$con); 
$SqlOnDuties=mysql_query("select count(AttValue)as OnDuties from hrm_employee_attendance where AttValue='OD' AND EmployeeID=".$id." AND (AttDate between '".date($NY."-".$NM."-1")."' AND '".date($NY."-".$NM."-".$day)."')", $con); $SqlHoliday=mysql_query("select count(AttValue)as Holiday from hrm_employee_attendance where AttValue='HO' AND EmployeeID=".$id." AND (AttDate between '".date($NY."-".$NM."-1")."' AND '".date($NY."-".$NM."-".$day)."')",$con); 
$SqlELSun=mysql_query("select count(CheckSunday)as SUN from hrm_employee_attendance where CheckSunday='Y' AND EmployeeID=".$id." AND (AttDate between '".date($NY."-".$NM."-1")."' AND '".date($NY."-".$NM."-".$day)."')",$con);

   $ResCL=mysql_fetch_array($SqlCL); $ResCH=mysql_fetch_array($SqlCH); $ResSL=mysql_fetch_array($SqlSL); 
   $ResSH=mysql_fetch_array($SqlSH); $ResPH=mysql_fetch_array($SqlPH); $ResPL=mysql_fetch_array($SqlPL); 
   $ResEL=mysql_fetch_array($SqlEL); $ResFL=mysql_fetch_array($SqlFL); $ResTL=mysql_fetch_array($SqlTL); 
   $ResHf=mysql_fetch_array($SqlHf); $ResPresent=mysql_fetch_array($SqlPresent); 
   $ResML=mysql_fetch_array($SqlML); $ResAbsent=mysql_fetch_array($SqlAbsent); 
   $ResOnDuties=mysql_fetch_array($SqlOnDuties); $ResHoliday=mysql_fetch_array($SqlHoliday); 
   $ResELSun=mysql_fetch_array($SqlELSun);
   $ResAch=mysql_fetch_array($SqlAch); $ResAsh=mysql_fetch_array($SqlAsh); $ResAph=mysql_fetch_array($SqlAph);

   $CountCL=$ResCL['CL']; $CountCH=$ResCH['CH']/2; $CountSL=$ResSL['SL']; 
   $CountSH=$ResSH['SH']/2; $CountPH=$ResPH['PH']/2; 
   $TotalEL=$ResEL['EL']; $TotalML=$ResML['ML']; $TotalFL=$ResFL['FL']; 
   
   $CountAch=$ResAch['ACH']/2; $CountAsh=$ResAsh['ASH']/2; $CountAph=$ResAph['APH']/2;
   $TotalCL=$CountCL+$CountCH+$CountAch;
   $TotalSL=$CountSL+$CountSH+$CountAsh;   
   $TotalPL=$ResPL['PL']+$CountPH+$CountAph;
   
   
   $TotalTL=$ResTL['TL']; 
   $TotalLeaveCount=$TotalCL+$TotalSL+$TotalPL+$TotalEL+$TotalFL+$TotalTL+$TotalML; $TotELSun=$ResELSun['SUN'];
   $CountHf=$ResHf['Hf']/2; $TotalPR=$ResPresent['Present']+$CountCH+$CountSH+$CountPH+$CountHf;   
   $TotalAbsent=$ResAbsent['Absent']+$CountHf+$CountAch+$CountAsh+$CountAph; 
   $TotalOnDuties=$ResOnDuties['OnDuties']; 
   $TotalHoliday=$ResHoliday['Holiday']; 
   
   $TotalDayWithSunEL=$TotalPR+$TotalLeaveCount+$TotalOnDuties+$TotalHoliday;
   $TotalPaidDay=$TotalDayWithSunEL-$TotELSun;
   $TotalWorkingDay=26;
   
   /***************** hrm_employee_monthlyleave_balance open ******************
   $SL=mysql_query("select * from hrm_employee_monthlyleave_balance where EmployeeID=".$id." AND Month='".$NM."' AND Year='".$NY."'", $con);  $RowL=mysql_num_rows($SL);
   if($RowL>0) 
   { $RL=mysql_fetch_assoc($SL); 
	 if($m!=1)
	 { 
	  $TotBalCL=$RL['OpeningCL']-$TotalCL; $TotBalSL=$RL['OpeningSL']-$TotalSL; 
	  $TotBalPL=$RL['OpeningPL']-$TotalPL;  $TotBalEL=$RL['OpeningEL']-$TotalEL; 
	  $TotBalFL=$RL['OpeningOL']-$TotalFL; $TotBalML=$RL['OpeningML']-$TotalML; 
	 } 
	 if($m==1)
	 { 
	  $TotBalCL=$RL['TotCL']-$TotalCL; $TotBalSL=$RL['TotSL']-$TotalSL; 
	  $TotBalPL=$RL['TotPL']-$TotalPL;  $TotBalEL=$RL['TotEL']-$TotalEL; 
	  $TotBalFL=$RL['TotOL']-$TotalFL; $TotBalML=$RL['TotML']-$TotalML; 
	 } 	            
	                
	 $sUpL=mysql_query("UPDATE hrm_employee_monthlyleave_balance set AvailedCL='".$TotalCL."', AvailedSL='".$TotalSL."', AvailedPL='".$TotalPL."', AvailedEL='".$TotalEL."', AvailedML='".$TotalML."', AvailedOL='".$TotalFL."', AvailedTL='".$TotalTL."', BalanceCL='".$TotBalCL."', BalanceSL='".$TotBalSL."', BalancePL='".$TotBalPL."', BalanceEL='".$TotBalEL."', BalanceML='".$TotBalML."', BalanceOL='".$TotBalFL."', MonthAtt_TotOD='".$TotalOnDuties."', MonthAtt_TotHO='".$TotalHoliday."', MonthAtt_TotPR='".$TotalPR."', MonthAtt_TotAP='".$TotalAbsent."', MonthAtt_TotWorkDay='".$TotalWorkingDay."', MonthAtt_TotPaidDay='".$TotalPaidDay."' where EmployeeID=".$id." AND Month='".$NM."' AND Year='".$NY."'", $con); 
   }
  
  /**************************************************/
  /**************************************************/
  /**************************************************/
 

}


?>
<html>
<head><meta charset="windows-1252">
<title><?php include_once('../Title.php'); ?></title>

<link type="text/css" href="css/body.css" rel="stylesheet"/>
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<link rel="stylesheet" type="text/css" href="src/css/jscal2.css"/>
<link rel="stylesheet" type="text/css" href="src/css/border-radius.css"/>
<link rel="stylesheet" type="text/css" href="src/css/steel/steel.css"/>
<style> .font { color:#ffffff; font-family:Georgia; font-size:11px; width:250px;} .font4 { color:#1FAD34; font-family:Georgia; font-size:13px; height:10px;}
.span {display:none; font-family:Courier New; font-size:14px; }.span1 {display:block; font-family:Courier New; font-size:14px; }
.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;}
.cell {color:#FFFFFF;font-family:Times New Roman;font-size:14px;font-weight:bold;} 
.cell2 {color:#000;font-family:Times New Roman;font-size:14px;} .cell3 {color:#030303;font-family:Times New Roman;font-size:14px; font-weight:bold;} 
.cellOpe {color:#FFFFFF;font-family:Times New Roman; height:20px; font-size:14px; font-weight:bold;}
.cellOpe2 {color:#000;font-family:Times New Roman; height:20px; font-size:14px; font-weight:bold;}
.cellOpe3 {color:#000;font-family:Times New Roman; width:30px;height:20px; font-size:14px; font-weight:bold;}
.font1 { font-family:Georgia; font-size:11px; height:14px; } 
.font2 { font-size:11px;width:260px;height:18px;}.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;} .TableHead { font-family:Times New Roman; color:#FFFFFF; font-size:15px; }
.TableHead1 { font-family:Times New Roman; color:#000000; background-color:#FFFFFF; font-size:13px; overflow:hidden; } .InputText {font-family:Times New Roman; font-size:12px; width:90px; height:19px; }
.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}
</style>
<script type="text/javascript" src="src/js/jscal2.js"></script>
<script type="text/javascript" src="src/js/lang/en.js"></script>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<script type="text/javascript" src="js/EmpMasterAddNewAjaxCall.js"></script>
<Script type="text/javascript">window.history.forward(1);</script>
<script language="javascript">
function SelMonth(v)
{ var y=document.getElementById("Year").value; var EmpId=document.getElementById("EmpId").value; 
  window.location='EmpLeave.php?acct=rue&cal=yespro&ss=101&myms=22&try=true&cor=gainchaek&m='+v+'&ID='+EmpId+'&Event=Edit&y='+y; }
  
function SelectYear(v)
{ var m=document.getElementById("Month").value; var EmpId=document.getElementById("EmpId").value; 
  window.location='EmpLeave.php?acct=rue&cal=yespro&ss=101&myms=22&try=true&cor=gainchaek&m='+m+'&ID='+EmpId+'&Event=Edit&y='+v; }  
  

//******************************* January **********************************// 
function Edit()
{ document.getElementById("EditL").style.display = 'block'; 
  document.getElementById("ChangeL").style.display = 'none';
  document.getElementById("AllowCL").readOnly=false; document.getElementById("AllowSL").readOnly=false; 
  document.getElementById("AllowPL").readOnly=false; document.getElementById("AllowEL").readOnly=false; 
  document.getElementById("AllowOL").readOnly=false; document.getElementById("AllowML").readOnly=false; 
  document.getElementById("AvailCL").readOnly=false; document.getElementById("AvailSL").readOnly=false; 
  document.getElementById("AvailPL").readOnly=false; document.getElementById("AvailEL").readOnly=false; 
  document.getElementById("AvailOL").readOnly=false; document.getElementById("AvailML").readOnly=false; 
  document.getElementById("CashCL").readOnly=true; document.getElementById("CashSL").readOnly=true; 
  document.getElementById("CashPL").readOnly=true; document.getElementById("CashEL").readOnly=false; 
  document.getElementById("CashOL").readOnly=true; document.getElementById("CashML").readOnly=true;
  document.getElementById("PriCL").readOnly=false; document.getElementById("PriSL").readOnly=false;   
  document.getElementById("PriPL").readOnly=false; document.getElementById("PriEL").readOnly=false; 
  document.getElementById("PriOL").readOnly=false; document.getElementById("PriML").readOnly=false;
}

function CalTotCL()
{ var PriCL = parseFloat(document.getElementById("PriCL").value); 
  var AllowCL = parseFloat(document.getElementById("AllowCL").value);  
  var CLSumPriAllow = document.getElementById("TotCL").value=Math.round((PriCL+AllowCL)*100)/100;
  var TotCL = parseFloat(document.getElementById("TotCL").value); 
  var AvailCL = parseFloat(document.getElementById("AvailCL").value);
  var CLTotBal = document.getElementById("BalCL").value=Math.round((TotCL-AvailCL)*100)/100; }
    
function CalTotSL()
{ var PriSL = parseFloat(document.getElementById("PriSL").value); 
  var AllowSL = parseFloat(document.getElementById("AllowSL").value);  
  var SLSumPriAllow = document.getElementById("TotSL").value=Math.round((PriSL+AllowSL)*100)/100;
  var TotSL = parseFloat(document.getElementById("TotSL").value); 
  var AvailSL = parseFloat(document.getElementById("AvailSL").value);
  var SLTotBal = document.getElementById("BalSL").value=Math.round((TotSL-AvailSL)*100)/100; }
  
function CalTotPL()
{ var PriPL = parseFloat(document.getElementById("PriPL").value); 
  var AllowPL = parseFloat(document.getElementById("AllowPL").value);  
  var PLSumPriAllow = document.getElementById("TotPL").value=Math.round((PriPL+AllowPL)*100)/100;
  var TotPL = parseFloat(document.getElementById("TotPL").value); 
  var AvailPL = parseFloat(document.getElementById("AvailPL").value);
  var PLTotBal = document.getElementById("BalPL").value=Math.round((TotPL-AvailPL)*100)/100; }
  
function CalTotEL()
{ var PriEL = parseFloat(document.getElementById("PriEL").value); 
  var AllowEL = parseFloat(document.getElementById("AllowEL").value);  
  var ELSumPriAllow = document.getElementById("TotEL").value=Math.round((PriEL+AllowEL)*100)/100;
  var TotEL = parseFloat(document.getElementById("TotEL").value); 
  var AvailEL = parseFloat(document.getElementById("AvailEL").value);
  var ELTotBal = document.getElementById("BalEL").value=Math.round((TotEL-AvailEL)*100)/100; }
       
function CalTotOL()
{ var PriOL = parseFloat(document.getElementById("PriOL").value); 
  var AllowOL = parseFloat(document.getElementById("AllowOL").value);  
  var OLSumPriAllow = document.getElementById("TotOL").value=Math.round((PriOL+AllowOL)*100)/100;
  var TotOL = parseFloat(document.getElementById("TotOL").value); 
  var AvailOL = parseFloat(document.getElementById("AvailOL").value);
  var OLTotBal = document.getElementById("BalOL").value=Math.round((TotOL-AvailOL)*100)/100; }
  
function CalTotML()
{ var PriML = parseFloat(document.getElementById("PriML").value); 
  var AllowML = parseFloat(document.getElementById("AllowML").value);  
  var MLSumPriAllow = document.getElementById("TotML").value=Math.round((PriML+AllowML)*100)/100;
  var TotML = parseFloat(document.getElementById("TotML").value); 
  var AvailML = parseFloat(document.getElementById("AvailML").value);
  var MLTotBal = document.getElementById("BalML").value=Math.round((TotML-AvailML)*100)/100; }      

function CalBalCL()
{ var PriCL = parseFloat(document.getElementById("PriCL").value); 
  var AllowCL = parseFloat(document.getElementById("AllowCL").value);
  var TotCL = PriCL+AllowCL; 
  var AvailCL = parseFloat(document.getElementById("AvailCL").value);
  var CLTotBal = document.getElementById("BalCL").value=Math.round((TotCL-AvailCL)*100)/100; }
  
function CalBalSL()
{ var PriSL = parseFloat(document.getElementById("PriSL").value); 
  var AllowSL = parseFloat(document.getElementById("AllowSL").value); 
  var TotSL = PriSL+AllowSL; 
  var AvailSL = parseFloat(document.getElementById("AvailSL").value);
  var SLTotBal = document.getElementById("BalSL").value=Math.round((TotSL-AvailSL)*100)/100; }
  
function CalBalPL()
{ var PriPL = parseFloat(document.getElementById("PriPL").value); 
  var AllowPL = parseFloat(document.getElementById("AllowPL").value);
  var TotPL = PriPL+AllowPL; 
  var AvailPL = parseFloat(document.getElementById("AvailPL").value);
  var PLTotBal = document.getElementById("BalPL").value=Math.round((TotPL-AvailPL)*100)/100;}
  
function CalBalEL()
{ var PriEL = parseFloat(document.getElementById("PriEL").value); 
  var AllowEL = parseFloat(document.getElementById("AllowEL").value);
  var TotEL = PriEL+AllowEL; 
  var CashEL = parseFloat(document.getElementById("CashEL").value);
  var AvailEL = parseFloat(document.getElementById("AvailEL").value); 
  var TotAvailEL=Math.round((CashEL+AvailEL)*100)/100;
  var ELTotBal = document.getElementById("BalEL").value=Math.round((TotEL-TotAvailEL)*100)/100; }
   
function CalBalOL()
{ var PriOL = parseFloat(document.getElementById("PriOL").value); 
  var AllowOL = parseFloat(document.getElementById("AllowOL").value);
  var TotOL = PriOL+AllowOL; 
  var CashOL = parseFloat(document.getElementById("CashOL").value);
  var AvailOL = parseFloat(document.getElementById("AvailOL").value); 
  var TotAvailOL=Math.round((CashOL+AvailOL)*100)/100; 
  var OLTotBal = document.getElementById("BalOL").value=Math.round((TotOL-TotAvailOL)*100)/100; }
  
function CalBalML()
{ var PriML = parseFloat(document.getElementById("PriML").value); 
  var AllowML = parseFloat(document.getElementById("AllowML").value);
  var TotML = PriML+AllowML;
  var CashML = parseFloat(document.getElementById("CashML").value);
  var AvailML = parseFloat(document.getElementById("AvailML").value); 
  var TotAvailML=Math.round((CashML+AvailML)*100)/100;
  var MLTotBal = document.getElementById("BalML").value=Math.round((TotML-TotAvailML)*100)/100; }     
  
function validate(form_1)
{ var TCL=parseFloat(form_1.TotCL.value); var TSL=parseFloat(form_1.TotSL.value); 
  var TPL=parseFloat(form_1.TotPL.value); var TEL=parseFloat(form_1.TotEL.value); 
  var TOL=parseFloat(form_1.TotOL.value); var CashEL=parseFloat(form_1.CashEL.value); 
  var AvCL=parseFloat(form_1.AvailCL.value); 
  var AvSL=parseFloat(form_1.AvailSL.value); var AvPL=parseFloat(form_1.AvailPL.value); 
  var AvEL=parseFloat(form_1.AvailEL.value); var AvOL=parseFloat(form_1.AvailOL.value);
  var TML=parseFloat(form_1.TotML.value); var AvML=parseFloat(form_1.AvailML.value);
  var agree=confirm("Are you sure you to save leave!"); if(agree){return true;} else{return false;}
}  


function EditAtt()
{ 
  document.getElementById("AddAtt").style.display = 'block'; 
  document.getElementById("Editbtn").style.display = 'none';
  var m=document.getElementById("MonthId").value;  var Y=document.getElementById("Yer").value; var i;
  if(m==1 || m==3 || m==5 || m==7 || m==8 || m==10 || m==12){var day=31;}
  else if(m==4 || m==6 || m==9 || m==11){var day=30;} 
  else if(m==2)
  { 
   if(Y==2012 || Y==2016 || Y==2020 || Y==2024 || Y==2028 || Y==2032 || Y==2036 || Y==2040){var day=29;} 
   else{var day=28;} 
  }
  for(i=1; i<=day; i++) { document.getElementById("Day1_"+i).disabled=false; }
}

function SelMonthEditPay()
{ 
 document.getElementById("BtnsubEditPay").style.display='none';
 document.getElementById("BtnsubPay").style.display='block';
 document.getElementById("MainPaidDay").readOnly=false;
}
function SelMonthPay(mp,yp,e,mm,y) 
{ if(mp==1){var m='January';}if(mp==2){var m='February';}if(mp==3){var m='March';}if(mp==4){var m='April';}if(mp==5){var m='May';}
  if(mp==6){var m='June';}if(mp==7){var m='July';}if(mp==8){var m='August';}if(mp==9){var m='September';}if(mp==10){var m='October';}
  if(mp==11){var m='November';}if(mp==12){var m='December';}
  var MPD=document.getElementById("MainPaidDay").value;
  var agree1=confirm("Are you sure you want to process monthly pay for the month "+m+"?");
  if(agree1)
  { var agree2=confirm("aa");
    if(agree2)
	{ var agree3=confirm("bb");
	  if(agree3)
	  { var x = "EmpLeave.php?action=PayMonthPro&mp="+mp+"&yp="+yp+"&ID="+e+"&m="+mm+"&y="+y+"&MPD="+MPD+"&Event=Edit";  window.location=x; }
	}
  }
}

function SelMonthEditLeave()
{ 
 document.getElementById("BtnsubEditLeave").style.display='none';
 document.getElementById("BtnsubLeave").style.display='block';
}
function SelMonthLeave(mp,yp,e,mm,y) 
{ if(mp==1){var m='January';}if(mp==2){var m='February';}if(mp==3){var m='March';}if(mp==4){var m='April';}if(mp==5){var m='May';}
  if(mp==6){var m='June';}if(mp==7){var m='July';}if(mp==8){var m='August';}if(mp==9){var m='September';}if(mp==10){var m='October';}
  if(mp==11){var m='November';}if(mp==12){var m='December';}
  var MPD=document.getElementById("MainPaidDay").value;
  var agree1=confirm("Are you sure you want to process monthly att/leave for the month "+m+"?");
  if(agree1)
  { var agree2=confirm("aa");
    if(agree2)
	{ var agree3=confirm("bb");
	  if(agree3)
	  { var x = "EmpLeave.php?action=LeaveMonthPro&mp="+mp+"&yp="+yp+"&ID="+e+"&m="+mm+"&y="+y+"&MPD="+MPD+"&Event=Edit";  window.location=x; }
	}
  }
}

</script>
</head>
<body class="body">
<?php 
$SqlEmp = mysql_query("SELECT *,hrm_employee_general.*,hrm_employee_personal.* FROM hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID WHERE hrm_employee.EmployeeID=".$EMPID, $con) or die(mysql_error());  $ResEmp=mysql_fetch_assoc($SqlEmp);
$Ename = $ResEmp['Fname'].'&nbsp;'.$ResEmp['Sname'].'&nbsp;'.$ResEmp['Lname']; $LEC=strlen($ResEmp['EmpCode']); 
      if($LEC==1){$EC='000'.$ResEmp['EmpCode'];} if($LEC==2){$EC='00'.$ResEmp['EmpCode'];} if($LEC==3){$EC='0'.$ResEmp['EmpCode'];} if($LEC>=4){$EC=$ResEmp['EmpCode'];}
?>
<table class="table">
<tr><td><table class="menutable"><tr><td><?php if($_SESSION['login'] = true){require_once("AMenu.php"); } ?></td></tr></table></td></tr>
<tr><td valign="top">
      <table width="100%" style="margin-top:0px;" border="0">
	    <tr><td valign="top"><?php if($_SESSION['login'] = true){require_once("AWelcome.php"); } ?></td></tr>
	    <tr>
	        <td valign="top" align="center"  width="100%" id="MainWindow"><br>
<?php //**********************************************START*****START*****START******START******START***************************************************************?>
  <table border="0" style="margin-top:0px; width:100%; height:300px;">
 <tr>
  <td align="left" height="20" valign="top" colspan="7">
   <table border="0">
    <tr>
	  <td align="right" width="230" class="heading">Leave</td>
	  <td>&nbsp;&nbsp;&nbsp;</td>
	  <td style="font-family:Times New Roman; font-size:16px; color:#287126; font-weight:bold;"><font color="#FF0000" size="4">*</font>  - Require Field</td>
	   <td><table><tr><td class="font4" style="left">&nbsp;&nbsp;&nbsp;<b><span id="msgspan">
	   <?php //echo $msg; ?></span></b></td></tr></table></td>
	</tr>
   </table>
  </td>
 </tr>
<?php if(($_SESSION['UserType']=='M' OR $_SESSION['UserType']=='S' OR $_SESSION['UserType']=='A' OR $_SESSION['UserType']=='U') AND $_SESSION['login'] = true) { ?>	
 <tr>
 <td style="width:100px;" align="center" valign="top"><?php if($_REQUEST['Event']=='Edit') { include("EmpMasterMenu.php"); } ?></td>
 
<td style="width:50px;" align="center" valign="top"></td>
<?php //********************************************************************************************* ?>
<?php if($_REQUEST['Event']=='Edit') {?>
<td align="left" id="Eleave" valign="top">             
<table border="0">
<tr> 
<td align="left" valign="top">
<table border="0" width="750" id="TEmp" style="display:block;" cellpadding="0" cellspacing="0">
<tr>
 <td colspan="2">
  <table border="0"><tr>
 <td class="All_80">EmpCode :</td><td class="All_90"><input name="EmpCode" id="EmpCode" style="background-color:#E6EBC5;" class="All_80" value="<?php echo $EC; ?>" readonly></td>
 <td class="All_50">Name :</td><td class="All_220"><input name="EmpName" id="EmpName" style="width:210px; height:18px; font-size:11px;background-color:#E6EBC5;" value="<?php echo $Ename; ?>" readonly><input type="hidden" name="EmpId" id="EmpId" class="All_80" value="<?php echo $EMPID; ?>" readonly></td><td style="width:200px;">&nbsp;</td>
  </tr>
  <tr><td colspan="7">&nbsp;</td></tr>
  <tr>
<td colspan="7" style="width:800px; font-family:Times New Roman; font-size:14px;">Select Year&nbsp;	
<select style="font-family:Times New Roman; font-size:14px; width:70px;" name="Year" id="Year" onChange="SelectYear(this.value)">
	  <option value="<?php echo $_REQUEST['y']; ?>"><?php echo $_REQUEST['y']; ?></option>
          <?php for($i=date("Y")+1; $i>=2013; $i--){ ?>
<?php if($_REQUEST['y']!=$i){ ?><option value="<?php echo $i; ?>"><?php echo $i; ?></option><?php } ?>
<?php } ?></select>
	  
&nbsp;&nbsp;Select Month:&nbsp;<select style="font-family:Times New Roman; font-size:14px; width:90px;" onChange="SelMonth(this.value)" id="Month" name="Month">
<option value="<?php echo $_REQUEST['m']; ?>"><?php echo date("F",strtotime($_REQUEST['y']."-".$_REQUEST['m']."-01")); ?><option value="12">December</option><option value="11">November</option><option value="10">October</option><option value="9">September</option><option value="8">August</option><option value="7">July</option><option value="6">June</option><option value="5">May</option><option value="4">April</option><option value="3">March</option><option value="2">February</option><option value="1">January</option>
</select>		  
<b style="font-family:Times New Roman; font-size:16px;color:#005500;"><?php echo $msg; ?></span>
	</td>	
</tr>
  </table>
 </td>
</tr>
<tr>
<?php //************ Start Start Start *************************** ?>

<?php
$ExpMonthDate=date('Y-m-d', strtotime("-2 months", strtotime(date("Y-m-d")))); $pp=strtotime($ExpMonthDate);
$ExpMonth=date('m', strtotime("-2 months", strtotime(date("Y-m-d"))));
$ExpYear=date('Y', strtotime("-2 months", strtotime(date("Y-m-d"))));

$BY=date("Y")-1;
if($_REQUEST['y']>=date("Y"))
{ $AttTable='hrm_employee_attendance'; $AttTable2='hrm_employee_attendance_'.$_REQUEST['y']; 
  $LeaveTable='hrm_employee_monthlyleave_balance'; $PayTable='hrm_employee_monthlypayslip';  }
elseif($_REQUEST['y']==$BY AND date("m")=='01' AND $_REQUEST['m']==12)
{ $AttTable='hrm_employee_attendance'; $AttTable2='hrm_employee_attendance_'.$_REQUEST['y']; 
  $LeaveTable='hrm_employee_monthlyleave_balance'; $PayTable='hrm_employee_monthlypayslip'; }
elseif($_REQUEST['y']==$BY AND $_REQUEST['m']<12)
{ $AttTable='hrm_employee_attendance'; $AttTable2='hrm_employee_attendance_'.$_REQUEST['y']; 
  $LeaveTable='hrm_employee_monthlyleave_balance_'.$_REQUEST['y']; $PayTable='hrm_employee_monthlypayslip_'.$_REQUEST['y']; }
else
{$AttTable='hrm_employee_attendance'; $AttTable2='hrm_employee_attendance_'.$_REQUEST['y']; 
 $LeaveTable='hrm_employee_monthlyleave_balance_'.$_REQUEST['y']; $PayTable='hrm_employee_monthlypayslip_'.$_REQUEST['y'];  }


?>

		    	
<form enctype="multipart/form-data" name="form_1" method="post" onSubmit="return validate(this)">
<input type="hidden" id="y" name="y" value="<?php echo $_REQUEST['y']; ?>" />
<?php $sqlJ=mysql_query("select * from ".$LeaveTable." where EmployeeID=".$EMPID." AND Month=".$_REQUEST['m']." AND Year='".$_REQUEST['y']."'", $con); $resJ=mysql_fetch_array($sqlJ); ?>   
<td id="JanDT" style="width:530px;">
<table style="width:530px;" border="1" bgcolor="#FFFFFF">
<tr bgcolor="#7a6189">
 <td colspan="7" bgcolor="#0080FF" align="center" style="font-family:Times New Roman; color:#FFFFFF; font-size:15px; height:25px; width:530px;">
 <b><blink>My Leave </blink>(Month - <font color="#FFFF00"><?php echo date("F",strtotime($_REQUEST['y']."-".$_REQUEST['m']."-01")); ?></font>)</b></td>
</tr>
<tr bgcolor="#7a6189">
 <td style="color:#ffffff;font-family:Georgia;font-size:11px;width:50px;" align="center"><b>LV</b></td>
 <td style="color:#ffffff;font-family:Georgia;font-size:11px;width:80px;" align="center"><b>Opening</b></td>
 <td style="color:#ffffff;font-family:Georgia;font-size:11px;width:80px;" align="center"><b>Credit</b></td>
 <td style="color:#ffffff;font-family:Georgia;font-size:11px;width:80px;" align="center"><b>Total</b></td>
 <td style="color:#ffffff;font-family:Georgia;font-size:11px;width:80px;" align="center"><b>EnCash</b></td>
 <td style="color:#ffffff;font-family:Georgia;font-size:11px;width:80px;" align="center"><b>Availed</b></td>
 <td style="color:#ffffff;font-family:Georgia;font-size:11px;width:80px;" align="center"><b>Balance</b></td>
</tr>
<tr>
 <td class="font1" align="center">CL</td>
 <td class="font1" align="center"><input name="PriCL" id="PriCL" class="All_70" value="<?php if($resJ['OpeningCL']==''){echo '0';} else { echo $resJ['OpeningCL']; }?>" onKeyUp="CalTotCL()" onChange="CalTotCL()" onKeyDown="CalTotCL()" readonly/></td>
 <td class="font1" align="center"><input name="AllowCL" id="AllowCL" class="All_70" value="<?php if($resJ['CreditedCL']==''){echo '0';} else { echo $resJ['CreditedCL']; } ?>" onKeyUp="CalTotCL()" onChange="CalTotCL()" onKeyDown="CalTotCL()" readonly/></td>
 <td class="font1" align="center"><input name="TotCL" id="TotCL" class="All_70" value="<?php if($resJ['TotCL']==''){echo '0';} else { echo $resJ['TotCL']; }?>" readonly/></td>
 <td class="font1" align="center"><input name="CashCL" id="CashCL" class="All_70" value="<?php if($resJ['EnCashCL']==''){echo '0';} else {echo $resJ['EnCashCL']; } ?>" readonly/></td>
 <td class="font1" align="center"><input name="AvailCL" id="AvailCL" class="All_70" value="<?php if($resJ['AvailedCL']==''){echo '0';} else { echo $resJ['AvailedCL']; } ?>" onKeyUp="CalBalCL()" onChange="CalBalCL()" onKeyDown="CalBalCL()" readonly/></td>
 <td class="font1" align="center"><input name="BalCL" id="BalCL" class="All_70" value="<?php if($resJ['BalanceCL']==''){echo '0';} else { echo $resJ['BalanceCL'];} ?>" readonly/></td>
</tr>
<tr>
<td class="font1" align="center">SL</td>
 <td class="font1" align="center"><input name="PriSL" id="PriSL" class="All_70" value="<?php if($resJ['OpeningSL']==''){echo '0';} else { echo $resJ['OpeningSL']; }?>" onKeyUp="CalTotSL()" onChange="CalTotSL()" onKeyDown="CalTotSL()" readonly/></td>
 <td class="font1" align="center"><input name="AllowSL" id="AllowSL" class="All_70" value="<?php if($resJ['CreditedSL']==''){echo '0';} else { echo $resJ['CreditedSL']; } ?>" onKeyUp="CalTotSL()" onChange="CalTotSL()" onKeyDown="CalTotSL()" readonly/></td>
 <td class="font1" align="center"><input name="TotSL" id="TotSL" class="All_70" value="<?php if($resJ['TotSL']==''){echo '0';} else { echo $resJ['TotSL']; }?>" readonly/></td>
 <td class="font1" align="center"><input name="CashSL" id="CashSL" class="All_70" value="<?php if($resJ['EnCashSL']==''){echo '0';} else {echo $resJ['EnCashSL']; } ?>" readonly/></td>
 <td class="font1" align="center"><input name="AvailSL" id="AvailSL" class="All_70" value="<?php if($resJ['AvailedSL']==''){echo '0';} else { echo $resJ['AvailedSL']; } ?>" onKeyUp="CalBalSL()" onChange="CalBalSL()" onKeyDown="CalBalSL()" readonly/></td>
 <td class="font1" align="center"><input name="BalSL" id="BalSL" class="All_70" value="<?php if($resJ['BalanceSL']==''){echo '0';} else { echo $resJ['BalanceSL'];} ?>" readonly/></td>
</tr>
<tr>
 <td class="font1" align="center">PL</td>
 <td class="font1" align="center"><input name="PriPL" id="PriPL" class="All_70" value="<?php if($resJ['OpeningPL']==''){echo '0';} else { echo $resJ['OpeningPL']; }?>" onKeyUp="CalTotPL()" onChange="CalTotPL()" onKeyDown="CalTotPL()" readonly/></td>
 <td class="font1" align="center"><input name="AllowPL" id="AllowPL" class="All_70" value="<?php if($resJ['CreditedPL']==''){echo '0';} else { echo $resJ['CreditedPL']; } ?>" onKeyUp="CalTotPL()" onChange="CalTotPL()" onKeyDown="CalTotPL()" readonly/></td>
 <td class="font1" align="center"><input name="TotPL" id="TotPL" class="All_70" value="<?php if($resJ['TotPL']==''){echo '0';} else { echo $resJ['TotPL']; }?>" readonly/></td>
 <td class="font1" align="center"><input name="CashPL" id="CashPL" class="All_70" value="<?php if($resJ['EnCashPL']==''){echo '0';} else {echo $resJ['EnCashPL']; } ?>" readonly/></td>
 <td class="font1" align="center"><input name="AvailPL" id="AvailPL" class="All_70" value="<?php if($resJ['AvailedPL']==''){echo '0';} else { echo $resJ['AvailedPL']; } ?>" onKeyUp="CalBalPL()" onChange="CalBalPL()" onKeyDown="CalBalPL()" readonly/></td>
 <td class="font1" align="center"><input name="BalPL" id="BalPL" class="All_70" value="<?php if($resJ['BalancePL']==''){echo '0';} else { echo $resJ['BalancePL'];} ?>" readonly/></td>
</tr>
<tr>
<td class="font1" align="center">EL</td>
 <td class="font1" align="center"><input name="PriEL" id="PriEL" class="All_70" value="<?php if($resJ['OpeningEL']==''){echo '0';} else { echo $resJ['OpeningEL']; }?>" onKeyUp="CalTotEL()" onChange="CalTotEL()" onKeyDown="CalTotEL()" readonly/></td>
 <td class="font1" align="center"><input name="AllowEL" id="AllowEL" class="All_70" value="<?php if($resJ['CreditedEL']==''){echo '0';} else { echo $resJ['CreditedEL']; } ?>" onKeyUp="CalTotEL()" onChange="CalTotEL()" onKeyDown="CalTotEL()" readonly/></td>
 <td class="font1" align="center"><input name="TotEL" id="TotEL" class="All_70" value="<?php if($resJ['TotEL']==''){echo '0';} else { echo $resJ['TotEL']; }?>" readonly/></td>
 <td class="font1" align="center"><input name="CashEL" id="CashEL" class="All_70" value="<?php if($resJ['EnCashEL']==''){echo '0';} else {echo $resJ['EnCashEL']; } ?>" onKeyUp="CalBalEL()" onChange="CalBalEL()" onKeyDown="CalBalEL()" readonly/></td>
 <td class="font1" align="center"><input name="AvailEL" id="AvailEL" class="All_70" value="<?php if($resJ['AvailedEL']==''){echo '0';} else { echo $resJ['AvailedEL']; } ?>" onKeyUp="CalBalEL()" onChange="CalBalEL()" onKeyDown="CalBalEL()" readonly/></td>
 <td class="font1" align="center"><input name="BalEL" id="BalEL" class="All_70" value="<?php if($resJ['BalanceEL']==''){echo '0';} else { echo $resJ['BalanceEL'];} ?>" readonly/></td>
</tr>
<tr>
<td class="font1" align="center">FL</td>
 <td class="font1" align="center"><input name="PriOL" id="PriOL" class="All_70" value="<?php if($resJ['OpeningOL']==''){echo '0';} else { echo $resJ['OpeningOL']; }?>" onKeyUp="CalTotOL()" onChange="CalTotOL()" onKeyDown="CalTotOL()" readonly/></td>
 <td class="font1" align="center"><input name="AllowOL" id="AllowOL" class="All_70" value="<?php if($resJ['CreditedOL']==''){echo '0';} else { echo $resJ['CreditedOL']; } ?>" onKeyUp="CalTotOL()" onChange="CalTotOL()" onKeyDown="CalTotOL()" readonly/></td>
 <td class="font1" align="center"><input name="TotOL" id="TotOL" class="All_70" value="<?php if($resJ['TotOL']==''){echo '0';} else { echo $resJ['TotOL']; }?>" readonly/></td>
 <td class="font1" align="center"><input name="CashOL" id="CashOL" class="All_70" value="<?php if($resJ['EnCashOL']==''){echo '0';} else {echo $resJ['EnCashOL']; } ?>" onKeyUp="CalBalOL()" onChange="CalBalOL()" onKeyDown="CalBalOL()" readonly/></td>
 <td class="font1" align="center"><input name="AvailOL" id="AvailOL" class="All_70" value="<?php if($resJ['AvailedOL']==''){echo '0';} else { echo $resJ['AvailedOL']; } ?>" onKeyUp="CalBalOL()" onChange="CalBalOL()" onKeyDown="CalBalOL()" readonly/></td>
 <td class="font1" align="center"><input name="BalOL" id="BalOL" class="All_70" value="<?php if($resJ['BalanceOL']==''){echo '0';} else { echo $resJ['BalanceOL'];} ?>" readonly/></td>
</tr>
<tr>
<td class="font1" align="center">ML</td>
 <td class="font1" align="center"><input name="PriML" id="PriML" class="All_70" value="<?php if($resJ['OpeningML']==''){echo '0';} else { echo $resJ['OpeningML']; }?>" onKeyUp="CalTotML()" onChange="CalTotML()" onKeyDown="CalTotML()" readonly/></td>
 <td class="font1" align="center"><input name="AllowML" id="AllowML" class="All_70" value="<?php if($resJ['CreditedML']==''){echo '0';} else { echo $resJ['CreditedML']; } ?>" onKeyUp="CalTotML()" onChange="CalTotML()" onKeyDown="CalTotML()" readonly/></td>
 <td class="font1" align="center"><input name="TotML" id="TotML" class="All_70" value="<?php if($resJ['TotML']==''){echo '0';} else { echo $resJ['TotML']; }?>" readonly/></td>
 <td class="font1" align="center"><input name="CashML" id="CashML" class="All_70" value="<?php if($resJ['EnCashML']==''){echo '0';} else {echo $resJ['EnCashML']; } ?>" onKeyUp="CalBalML()" onChange="CalBalML()" onKeyDown="CalBalML()" readonly/></td>
 <td class="font1" align="center"><input name="AvailML" id="AvailML" class="All_70" value="<?php if($resJ['AvailedML']==''){echo '0';} else { echo $resJ['AvailedML']; } ?>" onKeyUp="CalBalML()" onChange="CalBalML()" onKeyDown="CalBalML()" readonly/></td>
 <td class="font1" align="center"><input name="BalML" id="BalML" class="All_70" value="<?php if($resJ['BalanceML']==''){echo '0';} else { echo $resJ['BalanceML'];} ?>" readonly/></td>
</tr>

<tr>
  <td align="Right" class="fontButton" colspan="7"><table border="0" align="right" class="fontButton">
	<tr>	
<?php if($_SESSION['User_Permission']=='Edit'){?> 
	  <td align="right" style="width:90px;">
	    <input type="hidden" name="M1" id="M1" value="<?php echo $_REQUEST['m']; ?>"><input type="button" name="ChangeL" id="ChangeL" style="width:90px; display:block;" value="edit" onClick="Edit()">
		<input type="submit" name="EditL" id="EditL" style="width:90px;display:none;" value="save"></td>
	  <td align="right" style="width:90px;"><input type="button" name="Refresh" id="Refresh" style="width:90px;" value="refresh" onClick="javascript:window.location='EmpLeave.php?ID=<?php echo $EMPID; ?>&Event=Edit&m=<?php echo $_REQUEST['m']; ?>&y=<?php echo $_REQUEST['y']; ?>'"/></td>
<?php } ?>
	</tr></table>
  </td>
</tr>
</table>
</td>
</form>
<?php //************ Close Close Close *************************** ?>		 
</tr>

<?php /************************************* Attendance Open **********************************/ ?>
<?php if($_REQUEST['m']==1){$SelM='January';} if($_REQUEST['m']==2){$SelM='February';} if($_REQUEST['m']==3){$SelM='March';}if($_REQUEST['m']==4){$SelM='April';} 
if($_REQUEST['m']==5){$SelM='May';} if($_REQUEST['m']==6){$SelM='June';} if($_REQUEST['m']==7){$SelM='July';} if($_REQUEST['m']==8){$SelM='August';} 
if($_REQUEST['m']==9){$SelM='September';} if($_REQUEST['m']==10){$SelM='October';} if($_REQUEST['m']==11){$SelM='November';} if($_REQUEST['m']==12){$SelM='December';} ?> 
 <tr>
  <td align="left" height="20" valign="top" colspan="3" width="1600">
	    <table border="0">
		  <tr>
	  <td style="width:150px;" align="right">&nbsp;<font color="#2D002D" style='font-family:Times New Roman; font-size:14px;'>
	  <b>Attendance &nbsp;:</b></font></td>
	  <td>
	    <table border="0">
		            <tr>
					  <td width="900" align="left" class="cell3">&nbsp;&nbsp;&nbsp;
					  <font color="#0080FF">P</font>– Present, <font color="#0080FF">A</font>- Absent,
					  <font color="#0080FF">CH</font>– Half day CL, <font color="#0080FF">SH</font>– Half day SL, <font color="#0080FF">PH</font>– Half day PL,  <font color="#0080FF">H</font>- Holiday,  
					  <font color="#0080FF">OD</font>- Outdoor Duties  </td>
		           </tr>
         </table>
	  </td>
	</tr>
         </table>
  </td>
 </tr>
 <tr>
<?php //******************* Open ********************************************** ?> 
<td align="left" id="type" valign="top" width="1600">             
<form method="post" name="FormAtt" onSubmit="return validate(this)">
<input type="hidden" name="ComId" id="ComId" value="<?php echo $CompanyId; ?>" /> 
<input type="hidden" name="YearId" id="YearId" value="<?php echo $YearId; ?>" />
<input type="hidden" name="MonthId" id="MonthId" value="<?php echo $_REQUEST['m']; ?>" />
<input type="hidden" name="Yer" id="Yer" value="<?php echo $_REQUEST['y']; ?>" />
<input type="hidden" id="y" name="y" value="<?php echo $_REQUEST['y']; ?>" />
<?php $id=$_REQUEST['m']; $Y=$_REQUEST['y']; 
      if($id==1 OR $id==3 OR $id==5 OR $id==7 OR $id==8 OR $id==10 OR $id==12){ $day=31; } 
	  elseif($id==4 OR $id==6 OR $id==9 OR $id==11){ $day=30; }
	  elseif($id==2){ if($Y==2012 OR $Y==2016 OR $Y==2020 OR $Y==2024 OR $Y==2028 OR $Y==2032 OR $Y==2036 OR $Y==2040){$day=29;}else{$day=28;} } ?>
<table border="0" cellpadding="0" cellspacing="0">
 <tr>
  <td width="1600"> 
   <table border="1" cellpadding="0" cellspacing="0" width="1600">
	<tr>	 
<?php for($i=1; $i<=$day; $i++) { ?> 
    <td align="center" class="cell" <?php if(date("w",strtotime(date($Y.'-'.$id.'-'.$i)))==0) {echo 'bgcolor="#6B983A"';} else {echo 'bgcolor="#7a6189"';}?> width="45"><?php echo $i; ?></td><?php } ?>
    <td class="cellOpe" align="center" width="48" style="background-color:#7a6189;">Le</td>
    <td class="cellOpe" align="center" width="48" style="background-color:#7a6189;">Ho</td>
    <td class="cellOpe" align="center" width="48" style="background-color:#7a6189;">Od</td>
    <td class="cellOpe" align="center" width="48" style="background-color:#7a6189;">Pr</td>
    <td class="cellOpe" align="center" width="48" style="background-color:#7a6189;">Ab</td>
	<td style="background-color:#7a6189;color:#FFFFFF;font-family:Times New Roman; width:70px; font-size:14px;" align="center"><b>Paid</b></td>
   </tr>
	
  <tr>
<?php 
$month=$_REQUEST['m']; $Sno=1; 

if($month==1 OR $month==3 OR $month==5 OR $month==7 OR $month==8 OR $month==10 OR $month==12){$day=31;}
elseif($month==4 OR $month==6 OR $month==9 OR $month==11){$day=30;} 
elseif($month==2)
{ 
 if($Y==2012 OR $Y==2016 OR $Y==2020 OR $Y==2024 OR $Y==2028 OR $Y==2032 OR $Y==2036 OR $Y==2040){$day=29;} 
 else{$day=28;} 
}

for($i=1; $i<=$day; $i++) { $tt=strtotime(date($Y."-".$month."-".$i)); if($tt<$pp){$tab=$AttTable2; }else{$tab=$AttTable; }
$SqlEmp2=mysql_query("SELECT * FROM ".$tab." WHERE EmployeeID =".$EMPID." AND AttDate='".date($Y."-".$month."-".$i)."'", $con); $ResEmp2=mysql_fetch_array($SqlEmp2); ?>
<td align="center" valign="top" style="margin-top:0px;margin-right:0px;margin-bottom:0px;margin-left:0px;" <?php if(date("w",strtotime(date($Y.'-'.$month.'-'.$i)))==0) {echo 'bgcolor="#6B983A"';} ?> width="45">
<select name="Day<?php echo $Sno.'_'.$i; ?>" id="Day<?php echo $Sno.'_'.$i; ?>" style="width:40px; font-size:12px; height:18px; border-style:hidden;" disabled><option value="<?php echo $ResEmp2['AttValue']; ?>"><?php if($ResEmp2['AttValue']==''){echo '';} else {echo $ResEmp2['AttValue'];} ?></option><option value="P">P</option><option style="background-color:#FAD6CF;" value="A">A</option><option value="HF">HF</option><option style="background-color:#F8FBBB;" value="CL">CL</option><option style="background-color:#F8FBBB;" value="SL">SL</option><option style="background-color:#F8FBBB;" value="PL">PL</option><option style="background-color:#F8FBBB;" value="EL">EL</option><option style="background-color:#F8FBBB;" value="CH">CH</option><option style="background-color:#F8FBBB;" value="SH">SH</option><option style="background-color:#F8FBBB;" value="PH">PH</option><option style="background-color:#FFA4D1;" value="OD">OD</option><option style="background-color:#A9D3F5;" value="HO">HO</option><option style="background-color:#F8FBBB;" value="FL">FL</option><option style="background-color:#F8FBBB;" value="TL">TL</option><option style="background-color:#F8FBBB;" value="ML">ML</option><option style="background-color:#FFFFFF;" value="ACH">ACH</option><option style="background-color:#FFFFFF;" value="ASH">ASH</option><option style="background-color:#FFFFFF;" value="APH">APH</option><option style="background-color:#FFFFFF;" value="WFH">WFH</option><option style="background-color:#FFFFFF;" value="COV">COV</option><option style="background-color:#FFFFFF;" value=""></option>
</select></td><?php } ?>

<?php  
 
 $tt=strtotime(date($Y."-".$month."-1")); $tt2=strtotime(date($Y."-".$month."-".$day));
 //echo $pp.'-'.$tt.'/'.$ExpMonthDate.'-'.date($Y."-".$month."-1"); 
 if($tt>=$pp)
 { 
  $tab1=$AttTable;
$Cond1="EmployeeID=".$EMPID." AND AttDate>='".date($Y."-".$month."-1")."' AND AttDate<='".date($Y."-".$month."-".$day)."'";
 
$SqlCL=mysql_query("select count(DISTINCT AttDate)as CL from ".$tab1." where AttValue='CL' AND ".$Cond1, $con); 
$SqlCH=mysql_query("select count(DISTINCT AttDate)as CH from ".$tab1." where AttValue='CH' AND ".$Cond1, $con); 
$SqlSL=mysql_query("select count(DISTINCT AttDate)as SL from ".$tab1." where AttValue='SL' AND ".$Cond1, $con); 
$SqlSH=mysql_query("select count(DISTINCT AttDate)as SH from ".$tab1." where AttValue='SH' AND ".$Cond1, $con); 
$SqlPL=mysql_query("select count(DISTINCT AttDate)as PL from ".$tab1." where AttValue='PL' AND ".$Cond1, $con);
$SqlPH=mysql_query("select count(DISTINCT AttDate)as PH from ".$tab1." where AttValue='PH' AND ".$Cond1, $con); 
$SqlEL=mysql_query("select count(DISTINCT AttDate)as EL from ".$tab1." where AttValue='EL' AND ".$Cond1, $con); 
$SqlML=mysql_query("select count(DISTINCT AttDate)as ML from ".$tab1." where AttValue='ML' AND ".$Cond1, $con); 
$SqlFL=mysql_query("select count(DISTINCT AttDate)as FL from ".$tab1." where AttValue='FL' AND ".$Cond1, $con); 
$SqlTL=mysql_query("select count(DISTINCT AttDate)as TL from ".$tab1." where AttValue='TL' AND ".$Cond1, $con); 
$SqlHf=mysql_query("select count(DISTINCT AttDate)as Hf from ".$tab1." where AttValue='HF' AND ".$Cond1, $con);

$SqlCOV=mysql_query("select count(DISTINCT AttDate)as COV from ".$tab1." where AttValue='COV' AND ".$Cond1, $con);

$SqlAch=mysql_query("select count(DISTINCT AttDate)as ACH from ".$tab1." where AttValue='ACH' AND ".$Cond1, $con);
$SqlAsh=mysql_query("select count(DISTINCT AttDate)as ASH from ".$tab1." where AttValue='ASH' AND ".$Cond1, $con);
$SqlAph=mysql_query("select count(DISTINCT AttDate)as APH from ".$tab1." where AttValue='APH' AND ".$Cond1, $con);
 
$SqlPresent=mysql_query("select count(DISTINCT AttDate)as Present from ".$tab1." where (AttValue='P' OR AttValue='WFH') AND ".$Cond1, $con);$SqlAbsent=mysql_query("select count(DISTINCT AttDate)as Absent from ".$tab1." where AttValue='A' AND ".$Cond1, $con); $SqlOnDuties=mysql_query("select count(DISTINCT AttDate)as OnDuties from ".$tab1." where AttValue='OD' AND ".$Cond1, $con); 
$SqlHoliday=mysql_query("select count(DISTINCT AttDate)as Holiday from ".$tab1." where AttValue='HO' AND ".$Cond1, $con);
$SqlELSun=mysql_query("select count(CheckSunday)as SUN from ".$tab1." where CheckSunday='Y' AND ".$Cond1, $con); 
	  
   $ResCL=mysql_fetch_array($SqlCL); $ResCH=mysql_fetch_array($SqlCH); $ResSL=mysql_fetch_array($SqlSL); 
   $ResSH=mysql_fetch_array($SqlSH); $ResPH=mysql_fetch_array($SqlPH); $ResPL=mysql_fetch_array($SqlPL); 
   $ResEL=mysql_fetch_array($SqlEL); $ResFL=mysql_fetch_array($SqlFL); $ResTL=mysql_fetch_array($SqlTL); 
   $ResML=mysql_fetch_array($SqlML); $ResHf=mysql_fetch_array($SqlHf); $ResPresent=mysql_fetch_array($SqlPresent); 
   $ResAbsent=mysql_fetch_array($SqlAbsent); $ResOnDuties=mysql_fetch_array($SqlOnDuties);  
   $ResHoliday=mysql_fetch_array($SqlHoliday); $ResELSun=mysql_fetch_array($SqlELSun);
   $ResCOV=mysql_fetch_array($SqlCOV);
   
   $ResAch=mysql_fetch_array($SqlAch); $ResAsh=mysql_fetch_array($SqlAsh); $ResAph=mysql_fetch_array($SqlAph);

   $CountCL=$ResCL['CL']; $CountCH=$ResCH['CH']/2; $CountSL=$ResSL['SL']; 
   $CountSH=$ResSH['SH']/2; $CountPH=$ResPH['PH']/2;  
   
   $CountAch=$ResAch['ACH']/2; $CountAsh=$ResAsh['ASH']/2; $CountAph=$ResAph['APH']/2;
   $TotalCL=$CountCL+$CountCH+$CountAch;
   $TotalSL=$CountSL+$CountSH+$CountAsh;   
   $TotalPL=$ResPL['PL']+$CountPH+$CountAph;
   
   $TotalEL=$ResEL['EL']; $TotalML=$ResML['ML']; $TotalFL=$ResFL['FL']; $TotalTL=$ResTL['TL']; $TotalCOV=$ResCOV['COV'];
   $TotELSun=$ResELSun['SUN']; $CountHf=$ResHf['Hf']/2;   
   
   $TotalLeaveCount=$TotalCL+$TotalSL+$TotalPL+$TotalEL+$TotalFL+$TotalTL+$TotalML+$TotalCOV; 
   $TotalPR=$ResPresent['Present']+$CountCH+$CountSH+$CountPH+$CountHf;
     
   //$TotalPR=$ResPresent['Present']+$CountHf; 
   
   $TotalAbsent=$ResAbsent['Absent']+$CountHf+$CountAch+$CountAsh+$CountAph;
   $TotalOnDuties=$ResOnDuties['OnDuties']; $TotalHoliday=$ResHoliday['Holiday']; 
   $TotalDayWithSunEL=$TotalPR+$TotalLeaveCount+$TotalOnDuties+$TotalHoliday;
   $TotalPaidDay=$TotalDayWithSunEL-$TotELSun;
   $TotalWorkingDay=26;  
 }
 elseif($tt<$pp AND $tt2>=$pp)
 {
  $tab1=$AttTable2; $tab2=$AttTable;  
$Cond1="EmployeeID=".$EMPID." AND AttDate>='".date($Y."-".$month."-1")."' AND AttDate<'".$ExpMonthDate."'";
$Cond2="EmployeeID=".$EMPID." AND AttDate>='".$ExpMonthDate."' AND AttDate<='".date($Y."-".$month."-".$day)."'"; 
  
$SqlCL=mysql_query("select count(DISTINCT AttDate)as CL from ".$tab1." where AttValue='CL' AND ".$Cond1, $con); 
$SqlCH=mysql_query("select count(DISTINCT AttDate)as CH from ".$tab1." where AttValue='CH' AND ".$Cond1, $con); 
$SqlSL=mysql_query("select count(DISTINCT AttDate)as SL from ".$tab1." where AttValue='SL' AND ".$Cond1, $con); 
$SqlSH=mysql_query("select count(DISTINCT AttDate)as SH from ".$tab1." where AttValue='SH' AND ".$Cond1, $con); 
$SqlPL=mysql_query("select count(DISTINCT AttDate)as PL from ".$tab1." where AttValue='PL' AND ".$Cond1, $con);
$SqlPH=mysql_query("select count(DISTINCT AttDate)as PH from ".$tab1." where AttValue='PH' AND ".$Cond1, $con); 
$SqlEL=mysql_query("select count(DISTINCT AttDate)as EL from ".$tab1." where AttValue='EL' AND ".$Cond1, $con); 
$SqlML=mysql_query("select count(DISTINCT AttDate)as ML from ".$tab1." where AttValue='ML' AND ".$Cond1, $con); 
$SqlFL=mysql_query("select count(DISTINCT AttDate)as FL from ".$tab1." where AttValue='FL' AND ".$Cond1, $con); 
$SqlTL=mysql_query("select count(DISTINCT AttDate)as TL from ".$tab1." where AttValue='TL' AND ".$Cond1, $con); 
$SqlHf=mysql_query("select count(DISTINCT AttDate)as Hf from ".$tab1." where AttValue='HF' AND ".$Cond1, $con);
$SqlAch=mysql_query("select count(DISTINCT AttDate)as ACH from ".$tab1." where AttValue='ACH' AND ".$Cond1, $con);
$SqlAsh=mysql_query("select count(DISTINCT AttDate)as ASH from ".$tab1." where AttValue='ASH' AND ".$Cond1, $con);
$SqlAph=mysql_query("select count(DISTINCT AttDate)as APH from ".$tab1." where AttValue='APH' AND ".$Cond1, $con);
 
$SqlPresent=mysql_query("select count(DISTINCT AttDate)as Present from ".$tab1." where (AttValue='P' OR AttValue='WFH') AND ".$Cond1, $con);$SqlAbsent=mysql_query("select count(DISTINCT AttDate)as Absent from ".$tab1." where AttValue='A' AND ".$Cond1, $con); $SqlOnDuties=mysql_query("select count(DISTINCT AttDate)as OnDuties from ".$tab1." where AttValue='OD' AND ".$Cond1, $con); 
$SqlHoliday=mysql_query("select count(DISTINCT AttDate)as Holiday from ".$tab1." where AttValue='HO' AND ".$Cond1, $con);
$SqlELSun=mysql_query("select count(CheckSunday)as SUN from ".$tab1." where CheckSunday='Y' AND ".$Cond1, $con); 
	  
   $ResCL=mysql_fetch_array($SqlCL); $ResCH=mysql_fetch_array($SqlCH); $ResSL=mysql_fetch_array($SqlSL); 
   $ResSH=mysql_fetch_array($SqlSH); $ResPH=mysql_fetch_array($SqlPH); $ResPL=mysql_fetch_array($SqlPL); 
   $ResEL=mysql_fetch_array($SqlEL); $ResFL=mysql_fetch_array($SqlFL); $ResTL=mysql_fetch_array($SqlTL); 
   $ResML=mysql_fetch_array($SqlML); $ResHf=mysql_fetch_array($SqlHf); $ResPresent=mysql_fetch_array($SqlPresent); 
   $ResAbsent=mysql_fetch_array($SqlAbsent); $ResOnDuties=mysql_fetch_array($SqlOnDuties);  
   $ResHoliday=mysql_fetch_array($SqlHoliday); $ResELSun=mysql_fetch_array($SqlELSun);
   $ResAch=mysql_fetch_array($SqlAch); $ResAsh=mysql_fetch_array($SqlAsh); $ResAph=mysql_fetch_array($SqlAph);
   
$Sql2CL=mysql_query("select count(DISTINCT AttDate)as CL from ".$tab2." where AttValue='CL' AND ".$Cond2, $con); 
$Sql2CH=mysql_query("select count(DISTINCT AttDate)as CH from ".$tab2." where AttValue='CH' AND ".$Cond2, $con); 
$Sql2SL=mysql_query("select count(DISTINCT AttDate)as SL from ".$tab2." where AttValue='SL' AND ".$Cond2, $con); 
$Sql2SH=mysql_query("select count(DISTINCT AttDate)as SH from ".$tab2." where AttValue='SH' AND ".$Cond2, $con); 
$Sql2PL=mysql_query("select count(DISTINCT AttDate)as PL from ".$tab2." where AttValue='PL' AND ".$Cond2, $con);
$Sql2PH=mysql_query("select count(DISTINCT AttDate)as PH from ".$tab2." where AttValue='PH' AND ".$Cond2, $con); 
$Sql2EL=mysql_query("select count(DISTINCT AttDate)as EL from ".$tab2." where AttValue='EL' AND ".$Cond2, $con); 
$Sql2ML=mysql_query("select count(DISTINCT AttDate)as ML from ".$tab2." where AttValue='ML' AND ".$Cond2, $con); 
$Sql2FL=mysql_query("select count(DISTINCT AttDate)as FL from ".$tab2." where AttValue='FL' AND ".$Cond2, $con); 
$Sql2TL=mysql_query("select count(DISTINCT AttDate)as TL from ".$tab2." where AttValue='TL' AND ".$Cond2, $con); 
$Sql2Hf=mysql_query("select count(DISTINCT AttDate)as Hf from ".$tab2." where AttValue='HF' AND ".$Cond2, $con); 
$Sql2Ach=mysql_query("select count(DISTINCT AttDate)as ACH from ".$tab2." where AttValue='ACH' AND ".$Cond2, $con);
$Sql2Ash=mysql_query("select count(DISTINCT AttDate)as ASH from ".$tab2." where AttValue='ASH' AND ".$Cond2, $con);
$Sql2Aph=mysql_query("select count(DISTINCT AttDate)as APH from ".$tab2." where AttValue='APH' AND ".$Cond2, $con);

$Sql2Present=mysql_query("select count(DISTINCT AttDate)as Present from ".$tab2." where (AttValue='P' OR AttValue='WFH') AND ".$Cond2, $con);$Sql2Absent=mysql_query("select count(DISTINCT AttDate)as Absent from ".$tab2." where AttValue='A' AND ".$Cond2, $con); $Sql2OnDuties=mysql_query("select count(DISTINCT AttDate)as OnDuties from ".$tab2." where AttValue='OD' AND ".$Cond2,$con); 
$Sql2Holiday=mysql_query("select count(DISTINCT AttDate)as Holiday from ".$tab2." where AttValue='HO' AND ".$Cond2, $con);
$Sql2ELSun=mysql_query("select count(CheckSunday)as SUN from ".$tab2." where CheckSunday='Y' AND ".$Cond2, $con); 
	  
   $Res2CL=mysql_fetch_array($Sql2CL); $Res2CH=mysql_fetch_array($Sql2CH); $Res2SL=mysql_fetch_array($Sql2SL); 
   $Res2SH=mysql_fetch_array($Sql2SH); $Res2PH=mysql_fetch_array($Sql2PH); $Res2PL=mysql_fetch_array($Sql2PL); 
   $Res2EL=mysql_fetch_array($Sql2EL); $Res2FL=mysql_fetch_array($Sql2FL); $Res2TL=mysql_fetch_array($Sql2TL); 
   $Res2ML=mysql_fetch_array($Sql2ML); $Res2Hf=mysql_fetch_array($Sql2Hf); $Res2Present=mysql_fetch_array($Sql2Present); 
   $Res2Absent=mysql_fetch_array($Sql2Absent); $Res2OnDuties=mysql_fetch_array($Sql2OnDuties);  
   $ResHoliday=mysql_fetch_array($SqlHoliday); $ResELSun=mysql_fetch_array($SqlELSun); 
   $Res2Ach=mysql_fetch_array($Sql2Ach); $Res2Ash=mysql_fetch_array($Sql2Ash); $Res2Aph=mysql_fetch_array($Sql2Aph);  

   $CountCL=$ResCL['CL']+$Res2CL['CL']; $CountCH=($ResCH['CH']+$Res2CH['CH'])/2;  
   $CountSL=$ResSL['SL']+$Res2SL['SL']; $CountSH=($ResSH['SH']+$Res2SH['SH'])/2;  
   $CountPH=($ResPH['PH']+$Res2PH['PH'])/2;  
   
   $CountAch=($ResAch['ACH']+$Res2Ach['ACH'])/2; 
   $CountAsh=($ResAsh['ASH']+$Res2Ash['ASH'])/2; 
   $CountAph=($ResAph['APH']+$Res2Aph['APH'])/2; 
   $TotalCL=$CountCL+$CountCH+$CountAch;
   $TotalSL=$CountSL+$CountSH+$CountAsh;   
   $TotalPL=($ResPL['PL']+$Res2PL['PL'])+$CountPH+$CountAph;
   
   $TotalEL=$ResEL['EL']+$Res2EL['EL']; $TotalML=$ResML['ML']+$Res2ML['ML']; $TotalFL=$ResFL['FL']+$Res2FL['FL']; 
   $TotalTL=$ResTL['TL']+$Res2TL['TL']; $TotELSun=$ResELSun['SUN']+$Res2ELSun['SUN']; 
   $CountHf=($ResHf['Hf']+$Res2Hf['Hf'])/2;   
   
   
   $TotalLeaveCount=$TotalCL+$TotalSL+$TotalPL+$TotalEL+$TotalFL+$TotalTL+$TotalML; 
   $TotalPR=($ResPresent['Present']+$Res2Present['Present'])+$CountCH+$CountSH+$CountPH+$CountHf;  
   //$TotalPR=$ResPresent['Present']+$CountHf; 
   $TotalAbsent=($ResAbsent['Absent']+$Res2Absent['Absent'])+$CountHf+$CountAch+$CountAsh+$CountAph;
   $TotalOnDuties=$ResOnDuties['OnDuties']+$Res2OnDuties['OnDuties']; 
   $TotalHoliday=$ResHoliday['Holiday']+$Res2Holiday['Holiday']; 
   $TotalDayWithSunEL=$TotalPR+$TotalLeaveCount+$TotalOnDuties+$TotalHoliday;
   $TotalPaidDay=$TotalDayWithSunEL-$TotELSun;
   $TotalWorkingDay=26;	    
 }
 elseif($tt2<$pp)
 {
   $tab1=$AttTable2;
 $Cond1="EmployeeID=".$EMPID." AND AttDate>='".date($Y."-".$month."-1")."' AND AttDate<='".date($Y."-".$month."-".$day)."'";
	  
$SqlCL=mysql_query("select count(DISTINCT AttDate)as CL from ".$tab1." where AttValue='CL' AND ".$Cond1, $con); 
$SqlCH=mysql_query("select count(DISTINCT AttDate)as CH from ".$tab1." where AttValue='CH' AND ".$Cond1, $con); 
$SqlSL=mysql_query("select count(DISTINCT AttDate)as SL from ".$tab1." where AttValue='SL' AND ".$Cond1, $con); 
$SqlSH=mysql_query("select count(DISTINCT AttDate)as SH from ".$tab1." where AttValue='SH' AND ".$Cond1, $con); 
$SqlPL=mysql_query("select count(DISTINCT AttDate)as PL from ".$tab1." where AttValue='PL' AND ".$Cond1, $con);
$SqlPH=mysql_query("select count(DISTINCT AttDate)as PH from ".$tab1." where AttValue='PH' AND ".$Cond1, $con); 
$SqlEL=mysql_query("select count(DISTINCT AttDate)as EL from ".$tab1." where AttValue='EL' AND ".$Cond1, $con); 
$SqlML=mysql_query("select count(DISTINCT AttDate)as ML from ".$tab1." where AttValue='ML' AND ".$Cond1, $con); 
$SqlFL=mysql_query("select count(DISTINCT AttDate)as FL from ".$tab1." where AttValue='FL' AND ".$Cond1, $con); 
$SqlTL=mysql_query("select count(DISTINCT AttDate)as TL from ".$tab1." where AttValue='TL' AND ".$Cond1, $con); 
$SqlHf=mysql_query("select count(DISTINCT AttDate)as Hf from ".$tab1." where AttValue='HF' AND ".$Cond1, $con); 
$SqlAch=mysql_query("select count(DISTINCT AttDate)as ACH from ".$tab1." where AttValue='ACH' AND ".$Cond1, $con);
$SqlAsh=mysql_query("select count(DISTINCT AttDate)as ASH from ".$tab1." where AttValue='ASH' AND ".$Cond1, $con);
$SqlAph=mysql_query("select count(DISTINCT AttDate)as APH from ".$tab1." where AttValue='APH' AND ".$Cond1, $con);

$SqlPresent=mysql_query("select count(DISTINCT AttDate)as Present from ".$tab1." where (AttValue='P' OR AttValue='WFH') AND ".$Cond1, $con);$SqlAbsent=mysql_query("select count(DISTINCT AttDate)as Absent from ".$tab1." where AttValue='A' AND ".$Cond1, $con); $SqlOnDuties=mysql_query("select count(DISTINCT AttDate)as OnDuties from ".$tab1." where AttValue='OD' AND ".$Cond1, $con); 
$SqlHoliday=mysql_query("select count(DISTINCT AttDate)as Holiday from ".$tab1." where AttValue='HO' AND ".$Cond1, $con);
$SqlELSun=mysql_query("select count(CheckSunday)as SUN from ".$tab1." where CheckSunday='Y' AND ".$Cond1, $con); 
	  
   $ResCL=mysql_fetch_array($SqlCL); $ResCH=mysql_fetch_array($SqlCH); $ResSL=mysql_fetch_array($SqlSL); 
   $ResSH=mysql_fetch_array($SqlSH); $ResPH=mysql_fetch_array($SqlPH); $ResPL=mysql_fetch_array($SqlPL); 
   $ResEL=mysql_fetch_array($SqlEL); $ResFL=mysql_fetch_array($SqlFL); $ResTL=mysql_fetch_array($SqlTL); 
   $ResML=mysql_fetch_array($SqlML); $ResHf=mysql_fetch_array($SqlHf); $ResPresent=mysql_fetch_array($SqlPresent); 
   $ResAbsent=mysql_fetch_array($SqlAbsent); $ResOnDuties=mysql_fetch_array($SqlOnDuties);  
   $ResHoliday=mysql_fetch_array($SqlHoliday); $ResELSun=mysql_fetch_array($SqlELSun);
   $ResAch=mysql_fetch_array($SqlAch); $ResAsh=mysql_fetch_array($SqlAsh); $ResAph=mysql_fetch_array($SqlAph);

   $CountCL=$ResCL['CL']; $CountCH=$ResCH['CH']/2; $CountSL=$ResSL['SL']; 
   $CountSH=$ResSH['SH']/2;  $CountPH=$ResPH['PH']/2; 
   
   $CountAch=$ResAch['ACH']/2; $CountAsh=$ResAsh['ASH']/2; $CountAph=$ResAph['APH']/2;
   $TotalCL=$CountCL+$CountCH+$CountAch;
   $TotalSL=$CountSL+$CountSH+$CountAsh;   
   $TotalPL=$ResPL['PL']+$CountPH+$CountAph;
   
   $TotalEL=$ResEL['EL']; $TotalML=$ResML['ML']; $TotalFL=$ResFL['FL']; $TotalTL=$ResTL['TL']; 
   $TotELSun=$ResELSun['SUN']; $CountHf=$ResHf['Hf']/2;   
   
   $TotalLeaveCount=$TotalCL+$TotalSL+$TotalPL+$TotalEL+$TotalFL+$TotalTL+$TotalML; 
   $TotalPR=$ResPresent['Present']+$CountCH+$CountSH+$CountPH+$CountHf;  //$TotalPR=$ResPresent['Present']+$CountHf; 
   $TotalAbsent=$ResAbsent['Absent']+$CountHf+$CountAch+$CountAsh+$CountAph;
   $TotalOnDuties=$ResOnDuties['OnDuties']; $TotalHoliday=$ResHoliday['Holiday']; 
   $TotalDayWithSunEL=$TotalPR+$TotalLeaveCount+$TotalOnDuties+$TotalHoliday;
   $TotalPaidDay=$TotalDayWithSunEL-$TotELSun;
   $TotalWorkingDay=26;	 
 }
 
/*$SqlCL=mysql_query("select count(AttValue)as CL from ".$AttTable." where AttValue='CL' AND EmployeeID=".$EMPID." AND (AttDate between '".date($Y."-".$month."-1")."' AND '".date($Y."-".$month."-".$day)."')", $con); $SqlCH=mysql_query("select count(AttValue)as CH from ".$AttTable." where AttValue='CH' AND EmployeeID=".$EMPID." AND (AttDate between '".date($Y."-".$month."-1")."' AND '".date($Y."-".$month."-".$day)."')", $con); $SqlSL=mysql_query("select count(AttValue)as SL from ".$AttTable." where AttValue='SL' AND EmployeeID=".$EMPID." AND (AttDate between '".date($Y."-".$month."-1")."' AND '".date($Y."-".$month."-".$day)."')", $con); $SqlSH=mysql_query("select count(AttValue)as SH from ".$AttTable." where AttValue='SH' AND EmployeeID=".$EMPID." AND (AttDate between '".date($Y."-".$month."-1")."' AND '".date($Y."-".$month."-".$day)."')", $con); $SqlPH=mysql_query("select count(AttValue)as PH from ".$AttTable." where AttValue='PH' AND EmployeeID=".$EMPID." AND (AttDate between '".date($Y."-".$month."-1")."' AND '".date($Y."-".$month."-".$day)."')", $con); $SqlPL=mysql_query("select count(AttValue)as PL from ".$AttTable." where AttValue='PL' AND EmployeeID=".$EMPID." AND (AttDate between '".date($Y."-".$month."-1")."' AND '".date($Y."-".$month."-".$day)."')", $con); $SqlEL=mysql_query("select count(AttValue)as EL from ".$AttTable." where AttValue='EL' AND EmployeeID=".$EMPID." AND (AttDate between '".date($Y."-".$month."-1")."' AND '".date($Y."-".$month."-".$day)."')", $con); $SqlFL=mysql_query("select count(AttValue)as FL from ".$AttTable." where AttValue='FL' AND EmployeeID=".$EMPID." AND (AttDate between '".date($Y."-".$month."-1")."' AND '".date($Y."-".$month."-".$day)."')", $con); $SqlTL=mysql_query("select count(AttValue)as TL from ".$AttTable." where AttValue='TL' AND EmployeeID=".$EMPID." AND (AttDate between '".date($Y."-".$month."-1")."' AND '".date($Y."-".$month."-".$day)."')", $con); $SqlML=mysql_query("select count(AttValue)as ML from ".$AttTable." where AttValue='ML' AND EmployeeID=".$EMPID." AND (AttDate between '".date($Y."-".$month."-1")."' AND '".date($Y."-".$month."-".$day)."')", $con); $SqlHf=mysql_query("select count(AttValue)as Hf from ".$AttTable." where AttValue='HF' AND EmployeeID=".$EMPID." AND (AttDate between '".date($Y."-".$month."-1")."' AND '".date($Y."-".$month."-".$day)."')", $con); $SqlPresent=mysql_query("select count(AttValue)as Present from ".$AttTable." where AttValue='P' AND EmployeeID=".$EMPID." AND (AttDate between '".date($Y."-".$month."-1")."' AND '".date($Y."-".$month."-".$day)."')", $con); $SqlAbsent=mysql_query("select count(AttValue)as Absent from ".$AttTable." where AttValue='A' AND EmployeeID=".$EMPID." AND (AttDate between '".date($Y."-".$month."-1")."' AND '".date($Y."-".$month."-".$day)."')", $con); $SqlOnDuties=mysql_query("select count(AttValue)as OnDuties from ".$AttTable." where AttValue='OD' AND EmployeeID=".$EMPID." AND (AttDate between '".date($Y."-".$month."-1")."' AND '".date($Y."-".$month."-".$day)."')", $con); $SqlHoliday=mysql_query("select count(AttValue)as Holiday from ".$AttTable." where AttValue='HO' AND EmployeeID=".$EMPID." AND (AttDate between '".date($Y."-".$month."-1")."' AND '".date($Y."-".$month."-".$day)."')", $con); $SqlELSun=mysql_query("select count(CheckSunday)as SUN from ".$AttTable." where CheckSunday='Y' AND EmployeeID=".$EMPID." AND (AttDate between '".date($Y."-".$month."-1")."' AND '".date($Y."-".$month."-".$day)."')", $con); 

   $ResCL=mysql_fetch_array($SqlCL); $ResCH=mysql_fetch_array($SqlCH); $ResSL=mysql_fetch_array($SqlSL); $ResSH=mysql_fetch_array($SqlSH); $ResPH=mysql_fetch_array($SqlPH);
   $ResPL=mysql_fetch_array($SqlPL); $ResEL=mysql_fetch_array($SqlEL); $ResFL=mysql_fetch_array($SqlFL); $ResTL=mysql_fetch_array($SqlTL); $ResML=mysql_fetch_array($SqlML);
   $ResHf=mysql_fetch_array($SqlHf); $ResPresent=mysql_fetch_array($SqlPresent); $ResAbsent=mysql_fetch_array($SqlAbsent); 
   $ResOnDuties=mysql_fetch_array($SqlOnDuties); $ResHoliday=mysql_fetch_array($SqlHoliday); $ResELSun=mysql_fetch_array($SqlELSun);
   
   $CountCL=$ResCL['CL']; $CountCH=$ResCH['CH']/2; $TotalCL=$CountCL+$CountCH; $CountSL=$ResSL['SL']; $CountSH=$ResSH['SH']/2; $TotalSL=$CountSL+$CountSH;
   $CountPH=$ResPH['PH']/2; $TotalPL=$ResPL['PL']+$CountPH; $TotalEL=$ResEL['EL']; $TotalFL=$ResFL['FL']; $TotalTL=$ResTL['TL']; $TotalML=$ResML['ML'];
   $TotalLeaveCount=$TotalCL+$TotalSL+$TotalPL+$TotalEL+$TotalFL+$TotalTL+$TotalML; 
   $TotELSun=$ResELSun['SUN'];
   $CountHf=$ResHf['Hf']/2; //$CountHf=$ResHf['Hf']/2;  
   $TotalPR=$ResPresent['Present']+$CountCH+$CountSH+$CountPH+$CountHf;  //$TotalPR=$ResPresent['Present']+$CountHf; 
   $TotalAbsent=$ResAbsent['Absent']+$CountHf;
   $TotalOnDuties=$ResOnDuties['OnDuties']; $TotalHoliday=$ResHoliday['Holiday']; 
   $TotalDayWithSunEL=$TotalPR+$TotalLeaveCount+$TotalOnDuties+$TotalHoliday;
   $TotalPaidDay=$TotalDayWithSunEL-$TotELSun; 
   //if($TotalPaidDay>26){$TotalPaidDay=26;} echo $TotalPaidDay;
   $TotalWorkingDay=26; 
   */
   
 
   
?>
<input type="hidden" id="Tot_Leave<?php echo $EMPID; ?>"  value="<?php echo $TotalLeaveCount; ?>">
<input type="hidden" id="Tot_Holiday<?php echo $EMPID; ?>"  value="<?php echo $TotalHoliday; ?>">
<input type="hidden" id="Tot_OnDuties<?php echo $EMPID; ?>"  value="<?php echo $TotalOnDuties; ?>">
<input type="hidden" id="Tot_Absent<?php echo $EMPID; ?>"  value="<?php echo $TotalPR; ?>">
<input type="hidden" id="Tot_Present<?php echo $EMPID; ?>" value="<?php echo $TotalAbsent; ?>">
  <td class="cellOpe2" align="center" style="background-color:#F8FBBB;" width="48" valign="top"><?php echo $TotalLeaveCount; ?></td>
  <td class="cellOpe2" align="center" style="background-color:#A9D3F5;" width="48" valign="top"><?php echo $TotalHoliday; ?></td>
  <td class="cellOpe2" align="center" style="background-color:#FFA4D1;" width="48" valign="top"><?php echo $TotalOnDuties; ?></td>
  <td class="cellOpe2" align="center" style="background-color:#FFFFFF;" width="48" valign="top"><?php echo $TotalPR; ?></td>
  <td class="cellOpe2" align="center" style="background-color:#FAD6CF;" width="48" valign="top"><?php echo $TotalAbsent; ?></td>
  <td style="color:#000;font-family:Times New Roman; width:70px; font-size:14px;height:20px; background-color:#B6F1BD; font-weight:bold;" align="center">
<?php //echo $TotalPaidDay; ?><input type="hidden" name="PaidDay<?php echo $EMPID; ?>" id="PaidDay<?php echo $EMPID; ?>" value="<?php echo $TotalPaidDay; ?>" />
  </td>
 </tr>
</table>	  
</td>
</tr>
<tr>
      <td align="left" class="fontButton" style="width:100%; "><table border="0">
		<tr>
<?php if($_SESSION['User_Permission']=='Edit'){?>
		 <td align="right" style="width:90px;"><input type="button" name="Editbtn" id="Editbtn" style="width:90px;display:block;" value="edit" onClick="EditAtt()">
		 <input type="submit" id="AddAtt" name="AddAtt" style="width:90px;display:none;" value="save"/></td>
<?php } ?>
		 <td width="100">&nbsp;</td>
		 <td><table><tr>
		    <td bgcolor="#6B983A" width="10">&nbsp;</td><td>:</td><td class="cell">Sunday</td><td width="50">&nbsp;</td>
			<td bgcolor="#A9D3F5" width="10">&nbsp;</td><td>:</td><td class="cell">Holiday</td><td width="50">&nbsp;</td>
			<td bgcolor="#F8FBBB" width="10">&nbsp;</td><td>:</td><td class="cell">Leave</td><td width="50">&nbsp;</td>
			<td bgcolor="#FAD6CF" width="10">&nbsp;</td><td>:</td><td class="cell">Absent</td><td width="50">&nbsp;</td>
			<td bgcolor="#FFFFFF" width="10">&nbsp;</td><td>:</td><td class="cell">Present</td><td width="50">&nbsp;</td>
			<td bgcolor="#FFA4D1" width="10">&nbsp;</td><td>:</td><td class="cell">Outdoor Duties </td>
		  
		 </tr></table></td>
		</tr></table>
      </td>
   </tr>
 </form>  
	 </table>
    </td>
  </tr>
</table>
</form>     
</td>    
</tr>

<?php if($_SESSION['User_Permission']=='Edit'){?>

<?php if($_REQUEST['m']==1){$mp=12; $yp=date("Y")-1; $MonthP='December';}
      elseif($_REQUEST['m']==2){$mp=1; $yp=date("Y"); $MonthP='January';} 
	  elseif($_REQUEST['m']==3){$mp=2; $yp=date("Y"); $MonthP='February';}
	  elseif($_REQUEST['m']==4){$mp=3; $yp=date("Y"); $MonthP='March';} 
      elseif($_REQUEST['m']==5){$mp=4; $yp=date("Y"); $MonthP='April';} 
	  elseif($_REQUEST['m']==6){$mp=5; $yp=date("Y"); $MonthP='May';} 
	  elseif($_REQUEST['m']==7){$mp=6; $yp=date("Y"); $MonthP='June';} 
	  elseif($_REQUEST['m']==8){$mp=7; $yp=date("Y"); $MonthP='July';} 
      elseif($_REQUEST['m']==9){$mp=8; $yp=date("Y"); $MonthP='August';} 
      elseif($_REQUEST['m']==10){$mp=9; $yp=date("Y"); $MonthP='September';} 
	  elseif($_REQUEST['m']==11){$mp=10; $yp=date("Y"); $MonthP='October';} 
	  elseif($_REQUEST['m']==12){$mp=11; $yp=date("Y"); $MonthP='November';} ?>
<tr>
 <td>
  <table>
   <tr>
    <td align="" width="200" style="font-family:Times New Roman;font-size:16px;color:#452969;font-weight:bold;">&nbsp;&nbsp;&nbsp;<u>Monthly Pay Processing</u> :&nbsp;</td>
<td align="" style="font-family:Times New Roman; font-size:14px; color:#008000;" ><b>&nbsp;Month:&nbsp;<font color="#FF00FF"><?php echo strtoupper($MonthP); ?></font></b>&nbsp;</td>
    <td style="font-family:Times New Roman;font-size:14px;color:#452969;font-weight:bold;">&nbsp;
<?php 
//$sqlME=mysql_query("select * from hrm_employee_monthatt where Year=".$yp." AND EmployeeID=".$EMPID." AND Month=".$mp."", $con); 
$sqlME=mysql_query("select * from ".$LeaveTable." where EmployeeID=".$EMPID." AND Month=".$mp." AND Year='".$yp."'", $con); $rowME=mysql_num_rows($sqlME); 
   if($rowME>0) 
   {  
	  $resME=mysql_fetch_assoc($sqlME);
	  if($mp==1 OR $mp==2 OR $mp==3 OR $mp==4 OR $mp==5 OR $mp==6 OR $mp==7 OR $mp==8 OR $mp==9){ $FY=date("Y")-1; $TY=date("Y"); }
	  elseif($mp==10 OR $mp==11 OR $mp==12){ $FY=date("Y"); $TY=date("Y"); } 
	  $FromD=$FY.'-10-01'; $ToD=$TY.'-'.$mp.'-31';

	  $sql_1=mysql_query("select MAX(CtcId) as MaxID from hrm_employee_ctc where EmployeeID=".$EMPID." AND CtcCreatedDate!='0000-00-00' AND CtcCreatedDate!='1970-01-01' AND CtcCreatedDate>='".$FromD."' AND CtcCreatedDate<='".$ToD."'", $con); $row_1=mysql_num_rows($sql_1);
	  $res_1=mysql_fetch_assoc($sql_1); $MaxCtcId=$res_1['MaxID']; 
	  if($MaxCtcId!=''){$sqlCTC=mysql_query("select * from hrm_employee_ctc where EmployeeID=".$EMPID." AND CtcId=".$MaxCtcId, $con);}
	  elseif($MaxCtcId==''){$sqlCTC=mysql_query("select * from hrm_employee_ctc where EmployeeID=".$EMPID." AND Status='A'", $con);}
	  $resCTC=mysql_fetch_assoc($sqlCTC);  

	  $SqlLumSum=mysql_query("select hrm_company_statutory_lumpsum.*,hrm_company_statutory_taxsaving.*,hrm_company_statutory_pf.* from hrm_company_statutory_lumpsum INNER JOIN hrm_company_statutory_taxsaving ON hrm_company_statutory_lumpsum.CompanyId=hrm_company_statutory_taxsaving.CompanyId INNER JOIN hrm_company_statutory_pf ON hrm_company_statutory_lumpsum.CompanyId=hrm_company_statutory_pf.CompanyId where hrm_company_statutory_lumpsum.CompanyId=".$CompanyId, $con); $ResLumSum=mysql_fetch_assoc($SqlLumSum);
	
	   $WorkDay=$resME['MonthAtt_TotWorkDay'];
       $TotalWorkDay=$resME['MonthAtt_TotLeave']+$resME['MonthAtt_TotOD']+$resME['MonthAtt_TotHO']+$resME['MonthAtt_TotPR']+$resME['MonthAtt_TotAP'];
        
	   	
	   $tt=strtotime(date($Y."-".$mp."-1")); $tt2=strtotime(date($Y."-".$mp."-31"));	
	   if($tt>=$pp)
	   {
	    $SqlSun=mysql_query("select count(CheckSunday)as SUN from ".$AttTable." where CheckSunday='Y' AND EmployeeID=".$id." AND (AttDate between '".date($Y."-".$mp."-1")."' AND '".date($Y."-".$mp."-31")."')", $con); 
	    $ResSun=mysql_fetch_array($SqlSun); $TotSun=$ResSun['SUN'];
	   }
	   elseif($tt<$pp AND $tt2>=$pp)
	   {
		$SqlSun=mysql_query("select count(CheckSunday)as SUN from ".$AttTable2." where CheckSunday='Y' AND EmployeeID=".$id." AND AttDate>='".date($Y."-".$mp."-1")."' AND AttDate<'".$ExpMonthDate."'", $con); 
	   $ResSun=mysql_fetch_array($SqlSun); 
	   $SqlSun2=mysql_query("select count(CheckSunday)as SUN from ".$AttTable." where CheckSunday='Y' AND EmployeeID=".$id." AND AttDate>='".$ExpMonthDate."' AND AttDate<='".date($Y."-".$mp."-31")."')", $con); 
	   $ResSun2=mysql_fetch_array($SqlSun2); $TotSun=$ResSun['SUN']+$ResSun2['SUN'];
	   }
	   elseif($tt2<$pp)
	   {
		$SqlSun=mysql_query("select count(CheckSunday)as SUN from ".$AttTable2." where CheckSunday='Y' AND EmployeeID=".$id." AND AttDate>='".date($Y."-".$mp."-1")."' AND AttDate<'".date($Y."-".$mp."-31")."'", $con); 
	    $ResSun=mysql_fetch_array($SqlSun); $TotSun=$ResSun['SUN'];
	   }
       /*$SqlSun=mysql_query("select count(CheckSunday)as SUN from ".$AttTable." where CheckSunday='Y' AND EmployeeID=".$id." AND (AttDate between '".date($Y."-".$m."-1")."' AND '".date($Y."-".$m."-31")."')", $con); 
	   $ResSun=mysql_fetch_array($SqlSun); $TotSun=$ResSun['SUN'];*/
	   
       if($TotSun>0){$TotalWork=$TotalWorkDay-$TotSun;}else{$TotalWork=$TotalWorkDay;} 
       $PrDay=$TotalWork-$resME['MonthAtt_TotAP'];
	  
       if($TotalWork==24 OR $TotalWork==25){$TotalWD=$WorkDay;}else{$TotalWD=$TotalWork;}
       if($TotalWD>$WorkDay){$TWD=$WorkDay;}else{$TWD=$TotalWD;}
	  
	   //if($resME['MonthAtt_TotAP']>0){$ActPD=$TWD-$resME['MonthAtt_TotAP'];}else{$ActPD=$TWD;}
	   if($resME['MonthAtt_TotAP']>0 AND $resME['MonthAtt_TotAP']>10){$ActPD=$TotalWork-$resME['MonthAtt_TotAP'];}
	   elseif($resME['MonthAtt_TotAP']>0 AND $resME['MonthAtt_TotAP']<=10){$ActPD=$TWD-$resME['MonthAtt_TotAP'];}
	   else{$ActPD=$TWD;}
       if($PrDay>0){$PaidDay=$ActPD;}else{$PaidDay=0;} 
       //$PaidDay=26;
}

?>	
	PaidDay:<input id="MainPaidDay" style="width:40px;text-align:center;" value="<?php echo $PaidDay; ?>" readonly />
	&nbsp;
	</td>
    <td><input type="button" id="BtnsubPay" value="submit" onClick="SelMonthPay(<?php echo $mp.', '.$yp.', '.$EMPID.', '.$_REQUEST['m'].', '.$_REQUEST['y']; ?>)" style="width:80px; background-color:#ADAD5A;display:none;"/><input type="button" id="BtnsubEditPay" value="edit" onClick="SelMonthEditPay()" style="width:80px;background-color:#FFFFB7;"/></td>
	<td style="color:#006600; font-family:Times New Roman;font-size:16px;">&nbsp;&nbsp;&nbsp;<b><?php echo $msgPay; ?></b></td>
   </tr>
   
   
   <tr>
    <td align="" width="200" style="font-family:Times New Roman;font-size:16px;color:#452969;font-weight:bold;">&nbsp;&nbsp;&nbsp;<u>Monthly Att Processing</u> :&nbsp;</td>
<td align="" style="font-family:Times New Roman; font-size:14px; color:#008000;" ><b>&nbsp;Month:&nbsp;<font color="#FF00FF"><?php echo strtoupper($MonthP); ?></font></b>&nbsp;</td>
    <td style="font-family:Times New Roman;font-size:14px;color:#452969;font-weight:bold;">&nbsp;
	</td>
    <td><input type="button" id="BtnsubLeave" value="submit" onClick="SelMonthLeave(<?php echo $mp.', '.$yp.', '.$EMPID.', '.$_REQUEST['m'].', '.$_REQUEST['y']; ?>)" style="width:80px; background-color:#ADAD5A;display:none;"/><input type="button" id="BtnsubEditLeave" value="edit" onClick="SelMonthEditLeave()" style="width:80px;background-color:#FFFFB7;"/></td>
	<td style="color:#006600; font-family:Times New Roman;font-size:16px;">&nbsp;&nbsp;&nbsp;<b><?php echo $msgPay; ?></b></td>
   </tr>
   

<script>
function SelMonthEditArrPay()
{document.getElementById("BtnsubEditArrPay").style.display='none';
 document.getElementById("BtnsubArrPay").style.display='block'; document.getElementById("MainArrPaidDay").readOnly=false;
}
function SelMonthArrPay(mp,yp,e,mm,y) 
{ if(mp==1){var m='January';}if(mp==2){var m='February';}if(mp==3){var m='March';}if(mp==4){var m='April';}if(mp==5){var m='May';}
  if(mp==6){var m='June';}if(mp==7){var m='July';}if(mp==8){var m='August';}if(mp==9){var m='September';}if(mp==10){var m='October';}
  if(mp==11){var m='November';}if(mp==12){var m='December';}
  var MPD=document.getElementById("MainArrPaidDay").value;
  var agree1=confirm("Are you sure you want to process arrear for the month "+m+"?");
  if(agree1)
  { var agree2=confirm("Confirm_2");
    if(agree2)
	{ var agree3=confirm("Confirm_3");
	  if(agree3)
	  { var x = "EmpLeave.php?action=ArrPayMonthPro&mp="+mp+"&yp="+yp+"&ID="+e+"&m="+mm+"&y="+y+"&MPD="+MPD+"&Event=Edit";  window.location=x; }
	}
  }
}
</script>
<?php $sqlEs=mysql_query("select * from ".$PayTable." where EmployeeID=".$EMPID." AND Month=".$mp." AND Year=".$yp."", $con); $rowEs=mysql_num_rows($sqlEs); if($rowEs>0){ $resEs=mysql_fetch_assoc($sqlEs); ?>   
    <tr>
    <td align="" width="200" style="font-family:Times New Roman;font-size:16px;color:#452969;font-weight:bold;">&nbsp;&nbsp;&nbsp;<u>Arrear Calculation</u> :&nbsp;</td>
    <td align="" style="font-family:Times New Roman; font-size:14px; color:#008000;" ><b>&nbsp;Month:&nbsp;<font color="#FF00FF"><?php echo strtoupper($MonthP); ?></font></b>&nbsp;</td>
    <td style="font-family:Times New Roman;font-size:14px;color:#452969;font-weight:bold;">&nbsp;
	PaidDay:<input id="MainArrPaidDay" style="width:40px;text-align:center;" value="<?php echo $resEs['Ext_paidday']; ?>" readonly/>
	&nbsp;
	</td>
    <td><input type="button" id="BtnsubArrPay" value="submit" onClick="SelMonthArrPay(<?php echo $mp.', '.$yp.', '.$EMPID.', '.$_REQUEST['m'].', '.$_REQUEST['y']; ?>)" style="width:80px; background-color:#ADAD5A;display:none;"/><input type="button" id="BtnsubEditArrPay" value="edit" onClick="SelMonthEditArrPay()" style="width:80px;background-color:#FFFFB7;"/></td>
	<td style="color:#006600; font-family:Times New Roman;font-size:16px;">&nbsp;&nbsp;&nbsp;<b><?php echo $msgArrPay; ?></b></td>
   </tr>
   <tr>
    <td colspan="5" style="font-family:Georgia;font-size:14px;color:#008000;"><?php echo 'PaidDay: <font color="#000">'.$resEs['Ext_paidday'].'</font>,&nbsp;&nbsp;&nbsp;&nbsp;Var_Adj: <font color="#000">'.$resEs['VariableAdjustment'].'</font>,&nbsp;&nbsp;&nbsp;&nbsp;Arr_Bas: <font color="#000">'.$resEs['Ext_bas'].'</font>,&nbsp;&nbsp;&nbsp;&nbsp;Arr_Hra: <font color="#000">'.$resEs['Ext_hra'].'</font>,&nbsp;&nbsp;&nbsp;&nbsp;Arr_Con: <font color="#000">'.$resEs['Ext_con'].'</font>,&nbsp;&nbsp;&nbsp;&nbsp;Arr_Spl: <font color="#000">'.$resEs['Ext_spl'].'</font>,&nbsp;&nbsp;&nbsp;&nbsp;Arr_Pf: <font color="#000">'.$resEs['Ext_pf'].'</font>,&nbsp;&nbsp;&nbsp;&nbsp;Arr_Esic: <font color="#000">'.$resEs['Ext_esic'].'</font>'; ?></td>
   </tr>

<?php } ?>

<script>
function EditHoliday(){ document.getElementById("BtnSetEHoli").style.display='none'; 
document.getElementById("BtnSetHoli").style.display='block'; }

function SetHoliday(mp,yp,e,mm,y) 
{ var agree1=confirm("Are you sure you want to set holiday from current month?");
  if(agree1)
  { var agree2=confirm("Confirm_2");
    if(agree2)
	{ var agree3=confirm("Confirm_3");
	  if(agree3)
	  { var x = "EmpLeave.php?action=SetEmpAttHoliday&mp="+mp+"&yp="+yp+"&ID="+e+"&m="+mm+"&y="+y+"&Event=Edit";  
	    window.location=x; }
	}
  }
}
</script>   
    <tr>
    <td align="" width="200" style="font-family:Times New Roman;font-size:16px;color:#452969;font-weight:bold;">&nbsp;&nbsp;&nbsp;<u>Set Holiday</u> :&nbsp;</td>
    <td colspan="3"><input type="button" id="BtnSetHoli" value="submit" onClick="SetHoliday(<?php echo $mp.', '.$yp.', '.$EMPID.', '.$_REQUEST['m'].', '.$_REQUEST['y']; ?>)" style="width:80px; background-color:#ADAD5A;display:none;"/><input type="button" id="BtnSetEHoli" value="edit" onClick="EditHoliday()" style="width:80px;background-color:#FFFFB7;"/></td>
	<td style="color:#006600;font-family:Times New Roman;font-size:16px;">&nbsp;&nbsp;&nbsp;<b><?php echo $msgHoliday; ?></b></td>
   </tr>
 


  </table>
 </td>
</tr>
<?php } ?>
</table>
<?php /************************************* Attendance Close **********************************/ ?>
</td>
<?php include("EmpImg.php"); ?>
</tr>
</table>
</form>  
</td>
 <?php } ?>
<?php //*****************************************************************************************/ ?>
</tr>
<?php } ?> 
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
<?php //******************END*****END*****END******END******END*************************************?>	
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

