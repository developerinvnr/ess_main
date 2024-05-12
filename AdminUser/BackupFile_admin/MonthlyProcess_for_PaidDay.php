<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}
//********************************************************************************

/*********************** Insert AttReports Open *****************************************/
if($_REQUEST['action']=='AttMonth' && $_REQUEST['v']!='')
{ if(date("m")==01){ if($_REQUEST['v']==12){$Y=date("Y")-1;}else{$Y=date("Y");} }  //EmployeeID>601 AND EmployeeID<=650
  if(date("m")!=01){ $Y=date("Y");}
  $sqlE=mysql_query("select EmployeeID from hrm_employee where CompanyId=".$CompanyId." AND (EmpStatus='A' OR (EmpStatus='D' AND (DateOfSepration='0000-00-00' OR DateOfSepration='1970-01-01' OR DateOfSepration>='".date($Y."-".$_REQUEST['v']."-01")."')))", $con);
   
  while($resE=mysql_fetch_assoc($sqlE))
  { $m=$_REQUEST['v'];  
    for($i=1; $i<=31; $i++)
    { 
        
      $sAtt=mysql_query("select AttValue from hrm_employee_attendance where EmployeeID=".$resE['EmployeeID']." AND AttDate='".date($Y.'-'.$m.'-'.$i)."'", $con); 
      $rowAtt=mysql_num_rows($sAtt); 
      if($rowAtt>0)
      { $resAtt=mysql_fetch_assoc($sAtt); 
	    //if($i==1)
		//{ 
         $sIAtt=mysql_query("select * from hrm_employee_attreport where EmployeeID=".$resE['EmployeeID']." AND Month=".$m." AND Year=".$Y, $con); $rowIAtt=mysql_num_rows($sIAtt); 
         if($rowIAtt>0)
	     { $sUAtt=mysql_query("update hrm_employee_attreport set A".$i."='".$resAtt['AttValue']."' where EmployeeID=".$resE['EmployeeID']." AND Month=".$m." AND Year=".$Y, $con); }
         else
	     { $sUAtt=mysql_query("insert into hrm_employee_attreport(EmployeeID, Month, Year, A".$i.", YearId) values(".$resE['EmployeeID'].", ".$m.", ".$Y.", '".$resAtt['AttValue']."', ".$YearId.")", $con); }
		//} 
		//else
		//{
		 //$sUAtt=mysql_query("update hrm_employee_attreport set A".$i."='".$resAtt['AttValue']."' where EmployeeID=".$resE['EmployeeID']." AND Month=".$m." AND Year=".$Y, $con);
		//}
      } 
    }
  }	
  if($sUAtt){$msgAtt="Successfully process attendance."; }
}
/*********************** Insert AttReports Close *****************************************/ 



//* Open Attendance Update *//
if($_REQUEST['action']=='UpAttMonth' && $_REQUEST['v']!='')
{
 $M=$_REQUEST['v'];
 if(date("m")==01){ if($M==12){$Y=date("Y")-1;}else{$Y=date("Y");} } // EmployeeID>0 AND EmployeeID<=100 AND
 if(date("m")!=01){ $Y=date("Y");}  
 
 $sqlEI=mysql_query("select EmployeeID from hrm_employee where CompanyId=".$CompanyId." AND EmpStatus!='De'", $con); 
 while($resEI=mysql_fetch_assoc($sqlEI))
 {	  
 $SqlCL=mysql_query("select count(DISTINCT AttDate)as CL from hrm_employee_attendance where AttValue='CL' AND EmployeeID=".$resEI['EmployeeID']." AND (AttDate between '".date($Y."-".$M."-1")."' AND '".date($Y."-".$M."-31")."')", $con); 
 $SqlCH=mysql_query("select count(DISTINCT AttDate)as CH from hrm_employee_attendance where AttValue='CH' AND EmployeeID=".$resEI['EmployeeID']." AND (AttDate between '".date($Y."-".$M."-1")."' AND '".date($Y."-".$M."-31")."')", $con); 
 $SqlSL=mysql_query("select count(DISTINCT AttDate)as SL from hrm_employee_attendance where AttValue='SL' AND EmployeeID=".$resEI['EmployeeID']." AND (AttDate between '".date($Y."-".$M."-1")."' AND '".date($Y."-".$M."-31")."')", $con); 
 $SqlSH=mysql_query("select count(DISTINCT AttDate)as SH from hrm_employee_attendance where AttValue='SH' AND EmployeeID=".$resEI['EmployeeID']." AND (AttDate between '".date($Y."-".$M."-1")."' AND '".date($Y."-".$M."-31")."')", $con); 
 $SqlPH=mysql_query("select count(DISTINCT AttDate)as PH from hrm_employee_attendance where AttValue='PH' AND EmployeeID=".$resEI['EmployeeID']." AND (AttDate between '".date($Y."-".$M."-1")."' AND '".date($Y."-".$M."-31")."')", $con); 
 $SqlPL=mysql_query("select count(DISTINCT AttDate)as PL from hrm_employee_attendance where AttValue='PL' AND EmployeeID=".$resEI['EmployeeID']." AND (AttDate between '".date($Y."-".$M."-1")."' AND '".date($Y."-".$M."-31")."')", $con); 
 $SqlEL=mysql_query("select count(DISTINCT AttDate)as EL from hrm_employee_attendance where AttValue='EL' AND EmployeeID=".$resEI['EmployeeID']." AND (AttDate between '".date($Y."-".$M."-1")."' AND '".date($Y."-".$M."-31")."')", $con); 
 $SqlHf=mysql_query("select count(DISTINCT AttDate)as Hf from hrm_employee_attendance where AttValue='HF' AND EmployeeID=".$resEI['EmployeeID']." AND (AttDate between '".date($Y."-".$M."-1")."' AND '".date($Y."-".$M."-31")."')", $con); 
 
 $SqlAch=mysql_query("select count(DISTINCT AttDate)as ACH from hrm_employee_attendance where AttValue='ACH' AND EmployeeID=".$resEI['EmployeeID']." AND (AttDate between '".date($Y."-".$M."-1")."' AND '".date($Y."-".$M."-31")."')", $con);
 $SqlAsh=mysql_query("select count(DISTINCT AttDate)as ASH from hrm_employee_attendance where AttValue='ASH' AND EmployeeID=".$resEI['EmployeeID']." AND (AttDate between '".date($Y."-".$M."-1")."' AND '".date($Y."-".$M."-31")."')", $con);
 $SqlAph=mysql_query("select count(DISTINCT AttDate)as APH from hrm_employee_attendance where AttValue='APH' AND EmployeeID=".$resEI['EmployeeID']." AND (AttDate between '".date($Y."-".$M."-1")."' AND '".date($Y."-".$M."-31")."')", $con);
 
 $SqlPresent=mysql_query("select count(DISTINCT AttDate)as Present from hrm_employee_attendance where (AttValue='P' OR AttValue='WFH') AND EmployeeID=".$resEI['EmployeeID']." AND (AttDate between '".date($Y."-".$M."-1")."' AND '".date($Y."-".$M."-31")."')", $con); 
 $SqlAbsent=mysql_query("select count(DISTINCT AttDate)as Absent from hrm_employee_attendance where AttValue='A' AND EmployeeID=".$resEI['EmployeeID']." AND (AttDate between '".date($Y."-".$M."-1")."' AND '".date($Y."-".$M."-31")."')", $con); 
 $SqlOnDuties=mysql_query("select count(DISTINCT AttDate)as OnDuties from hrm_employee_attendance where AttValue='OD' AND EmployeeID=".$resEI['EmployeeID']." AND (AttDate between '".date($Y."-".$M."-1")."' AND '".date($Y."-".$M."-31")."')", $con); 
 $SqlHoliday=mysql_query("select count(DISTINCT AttDate)as Holiday from hrm_employee_attendance where AttValue='HO' AND EmployeeID=".$resEI['EmployeeID']." AND (AttDate between '".date($Y."-".$M."-1")."' AND '".date($Y."-".$M."-31")."')", $con); 
 $SqlELSun=mysql_query("select count(CheckSunday)as SUN from hrm_employee_attendance where CheckSunday='Y' AND EmployeeID=".$resEI['EmployeeID']." AND (AttDate between '".date($Y."-".$M."-1")."' AND '".date($Y."-".$M."-31")."')", $con); 
 $SqlFL=mysql_query("select count(DISTINCT AttDate)as FL from hrm_employee_attendance where AttValue='FL' AND EmployeeID=".$resEI['EmployeeID']." AND (AttDate between '".date($Y."-".$M."-1")."' AND '".date($Y."-".$M."-31")."')", $con); 
 $SqlTL=mysql_query("select count(DISTINCT AttDate)as TL from hrm_employee_attendance where AttValue='TL' AND EmployeeID=".$resEI['EmployeeID']." AND (AttDate between '".date($Y."-".$M."-1")."' AND '".date($Y."-".$M."-31")."')", $con); 
 $SqlML=mysql_query("select count(DISTINCT AttDate)as ML from hrm_employee_attendance where AttValue='ML' AND EmployeeID=".$resEI['EmployeeID']." AND (AttDate between '".date($Y."-".$M."-1")."' AND '".date($Y."-".$M."-31")."')", $con);
      $ResCL=mysql_fetch_array($SqlCL); $ResCH=mysql_fetch_array($SqlCH); $ResSL=mysql_fetch_array($SqlSL); $ResSH=mysql_fetch_array($SqlSH); $ResPH=mysql_fetch_array($SqlPH); $ResPL=mysql_fetch_array($SqlPL); $ResEL=mysql_fetch_array($SqlEL); $ResFL=mysql_fetch_array($SqlFL); $ResHf=mysql_fetch_array($SqlHf); $ResPresent=mysql_fetch_array($SqlPresent); $ResAbsent=mysql_fetch_array($SqlAbsent); $ResOnDuties=mysql_fetch_array($SqlOnDuties); $ResHoliday=mysql_fetch_array($SqlHoliday); $ResELSun=mysql_fetch_array($SqlELSun); $ResTL=mysql_fetch_array($SqlTL); $ResML=mysql_fetch_array($SqlML);
	  
   $ResAch=mysql_fetch_array($SqlAch); $ResAsh=mysql_fetch_array($SqlAsh); $ResAph=mysql_fetch_array($SqlAph);

   $CountCL=$ResCL['CL']; $CountCH=$ResCH['CH']/2; $CountSL=$ResSL['SL']; 
   $CountSH=$ResSH['SH']/2; 
   $CountPH=$ResPH['PH']/2; $TotalEL=$ResEL['EL']; $TotalFL=$ResFL['FL'];
   $TotalTL=$ResTL['TL']; $TotalML=$ResML['ML']; 
  
   $CountAch=$ResAch['ACH']/2; $CountAsh=$ResAsh['ASH']/2; $CountAph=$ResAph['APH']/2;
   $TotalCL=$CountCL+$CountCH+$CountAch;
   $TotalSL=$CountSL+$CountSH+$CountAsh;   
   $TotalPL=$ResPL['PL']+$CountPH+$CountAph;
  
   $TotalLeaveCount=$TotalCL+$TotalSL+$TotalPL+$TotalEL+$TotalFL+$TotalTL+$TotalML; 
   $CountHf=$ResHf['Hf']/2; $TotELSun=$ResELSun['SUN'];
   $TotalPR=$ResPresent['Present']+$CountCH+$CountSH+$CountPH+$CountHf;  
   $TotalAbsent=$ResAbsent['Absent']+$CountHf+$CountAch+$CountAsh+$CountAph; 
   $TotalOnDuties=$ResOnDuties['OnDuties']; 
   $TotalHoliday=$ResHoliday['Holiday']; 
   $TotalDayWithSunEL=$TotalPR+$TotalLeaveCount+$TotalOnDuties+$TotalHoliday;
   $TotalPaidDay=$TotalDayWithSunEL-$TotELSun; $TotalWorkingDay=26;
   
/********************************************** Open 1 ***********/
   $SL=mysql_query("select * from hrm_employee_monthlyleave_balance where EmployeeID=".$resEI['EmployeeID']." AND Month='".$M."' AND Year='".$Y."'", $con);  $RowL=mysql_num_rows($SL);
   if($RowL>0){ $RL=mysql_fetch_assoc($SL); 
   if($M!=1)
   { 
    $TotBalCL=$RL['OpeningCL']-$TotalCL; $TotBalSL=$RL['OpeningSL']-$TotalSL; 
	$TotBalPL=$RL['OpeningPL']-$TotalPL;  $TotBalEL=$RL['OpeningEL']-$TotalEL; 
	$TotBalFL=$RL['OpeningOL']-$TotalFL; $TotBalML=$RL['OpeningML']-$TotalML; 
   }  
   if($M==1)
   { 
    $TotCLT=$RL['EnCashCL']+$TotalCL; $TotSLT=$RL['EnCashSL']+$TotalSL; 
	$TotPLT=$RL['EnCashPL']+$TotalPL; $TotELT=$RL['EnCashEL']+$TotalEL; 
	$TotBalCL=$RL['TotCL']-$TotCLT; $TotBalSL=$RL['TotSL']-$TotSLT; 
	$TotBalPL=$RL['TotPL']-$TotPLT;  $TotBalEL=$RL['TotEL']-$TotELT;
	$TotBalFL=$RL['TotOL']-$TotalFL; $TotBalML=$RL['TotML']-$TotalML; 
   }         
   
   $sUpL=mysql_query("UPDATE hrm_employee_monthlyleave_balance set AvailedCL='".$TotalCL."', AvailedSL='".$TotalSL."', AvailedPL='".$TotalPL."', AvailedEL='".$TotalEL."', AvailedML='".$TotalML."', AvailedOL='".$TotalFL."', AvailedTL='".$TotalTL."', BalanceCL='".$TotBalCL."', BalanceSL='".$TotBalSL."', BalancePL='".$TotBalPL."', BalanceEL='".$TotBalEL."', BalanceML='".$TotBalML."', BalanceOL='".$TotBalFL."', MonthAtt_TotLeave='".$TotalLeaveCount."', MonthAtt_TotOD='".$TotalOnDuties."', MonthAtt_TotHO='".$TotalHoliday."', MonthAtt_TotPR='".$TotalPR."', MonthAtt_TotAP='".$TotalAbsent."', MonthAtt_TotWorkDay='".$TotalWorkingDay."', MonthAtt_TotPaidDay='".$TotalPaidDay."' where EmployeeID=".$resEI['EmployeeID']." AND Month='".$M."' AND Year='".$Y."'", $con); }
	 
   if($sUpL){ $msgUpAtt= 'Employee attendance update for month '.date("F",strtotime($Y."-".$M."-01")).' uploaded successfully...';}
  } 
}



/************************** Leave Month ************************************/
if($_REQUEST['action']=='LeaveMonth' && $_REQUEST['v']!='')
{   
  if(date("m")==01){ if($_REQUEST['v']==12){$Y=date("Y")-1;}else{$Y=date("Y");} }
  if(date("m")!=01){ $Y=date("Y");}
  if($_REQUEST['v']==1){$NM=2; $NY=$Y;}
  elseif($_REQUEST['v']==2){$NM=3; $NY=$Y;}
  elseif($_REQUEST['v']==3){$NM=4; $NY=$Y;}
  elseif($_REQUEST['v']==4){$NM=5; $NY=$Y;}
  elseif($_REQUEST['v']==5){$NM=6; $NY=$Y;}
  elseif($_REQUEST['v']==6){$NM=7; $NY=$Y;}
  elseif($_REQUEST['v']==7){$NM=8; $NY=$Y;}
  elseif($_REQUEST['v']==8){$NM=9; $NY=$Y;}
  elseif($_REQUEST['v']==9){$NM=10; $NY=$Y;}
  elseif($_REQUEST['v']==10){$NM=11; $NY=$Y;}
  elseif($_REQUEST['v']==11){$NM=12; $NY=$Y;}
  elseif($_REQUEST['v']==12){$NM=1; $NY=$Y+1;}                                                                                                                     //e.EmployeeID>601 AND e.EmployeeID<=650 AND
  
  $sqlE=mysql_query("select e.EmployeeID,g.DateJoining,g.DateConfirmationYN from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID where e.CompanyId=".$CompanyId." AND e.EmpStatus='A' ", $con);
	 
  while($resE=mysql_fetch_assoc($sqlE))
  { 
   $m=$_REQUEST['v']; $id=$resE['EmployeeID']; 
   $sqlME=mysql_query("select * from hrm_employee_monthlyleave_balance where Year=".$Y." AND EmployeeID=".$id." AND Month=".$m."", $con); $rowME=mysql_num_rows($sqlME); 
   
   if($rowME>0) 
   { 
	$resME=mysql_fetch_assoc($sqlME);
	$sqlME2=mysql_query("select * from hrm_employee_monthlyleave_balance where EmployeeID=".$id." AND Month=".$NM." AND Year=".$NY."",$con); $rowME2=mysql_num_rows($sqlME2);
	
	if($rowME2>0)
	{ 
	    
	    if($resE['DateConfirmationYN']=='Y' && $resE['DateConfirmation']>=date($NY."-".$NM."-01") && $resE['DateConfirmation']<=date($NY."-".$NM."-31") && date("m")==$NM && date("Y")==$NY && $resME['BalancePL']==0 && $resME['BalanceOL']==0)
	 { $resME2=mysql_fetch_assoc($sqlME2); $oppl=$resME2['OpeningPL']; $opfl=$resME2['OpeningOL']; }
	 else{ $oppl=0; $opfl=0; }
	 
	 $opBalPL=$resME['BalancePL']+$oppl; $opBalOL=$resME['BalanceOL']+$opfl;
	 
	 //echo "update hrm_employee_monthlyleave_balance set OpeningCL=".$resME['BalanceCL'].", OpeningSL=".$resME['BalanceSL'].", OpeningPL=".$opBalPL.", OpeningEL=".$resME['BalanceEL'].", OpeningOL=".$opBalOL.", OpeningML=".$resME['BalanceML'].", BalanceCL=".$resME['BalanceCL'].", BalanceSL=".$resME['BalanceSL'].", BalancePL=".$opBalPL.", BalanceEL=".$resME['BalanceEL'].", BalanceOL=".$opBalOL.", BalanceML=".$resME['BalanceML'].", CreatedBy=".$UserId.", CreatedDate='".date("Y-m-d")."', YearId=".$YearId." where EmployeeID=".$id." AND Month=".$NM." AND Year=".$NY.';<br>';
	 
	    $sqlUp=mysql_query("update hrm_employee_monthlyleave_balance set OpeningCL=".$resME['BalanceCL'].", OpeningSL=".$resME['BalanceSL'].", OpeningPL=".$opBalPL.", OpeningEL=".$resME['BalanceEL'].", OpeningOL=".$opBalOL.", OpeningML=".$resME['BalanceML'].", BalanceCL=".$resME['BalanceCL'].", BalanceSL=".$resME['BalanceSL'].", BalancePL=".$opBalPL.", BalanceEL=".$resME['BalanceEL'].", BalanceOL=".$opBalOL.", BalanceML=".$resME['BalanceML'].", CreatedBy=".$UserId.", CreatedDate='".date("Y-m-d")."', YearId=".$YearId." where EmployeeID=".$id." AND Month=".$NM." AND Year=".$NY, $con);
	    
	    //$sqlUp=mysql_query("update hrm_employee_monthlyleave_balance set OpeningCL=".$resME['BalanceCL'].", OpeningSL=".$resME['BalanceSL'].", OpeningPL=".$resME['BalancePL'].", OpeningEL=".$resME['BalanceEL'].", OpeningOL=".$resME['BalanceOL'].", OpeningML=".$resME['BalanceML'].", BalanceCL=".$resME['BalanceCL'].", BalanceSL=".$resME['BalanceSL'].", BalancePL=".$resME['BalancePL'].", BalanceEL=".$resME['BalanceEL'].", BalanceOL=".$resME['BalanceOL'].", BalanceML=".$resME['BalanceML'].", CreatedBy=".$UserId.", CreatedDate='".date("Y-m-d")."', YearId=".$YearId." where EmployeeID=".$id." AND Month=".$NM." AND Year=".$NY, $con); 
	    
	}
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

$SqlPresent=mysql_query("select count(AttValue)as Present from hrm_employee_attendance where (AttValue='P' OR AttValue='WFH') AND EmployeeID=".$id." AND (AttDate between '".date($NY."-".$NM."-1")."' AND '".date($NY."-".$NM."-".$day)."')",$con); $SqlAbsent=mysql_query("select count(AttValue)as Absent from hrm_employee_attendance where AttValue='A' AND EmployeeID=".$id." AND (AttDate between '".date($NY."-".$NM."-1")."' AND '".date($NY."-".$NM."-".$day)."')",$con); $SqlOnDuties=mysql_query("select count(AttValue)as OnDuties from hrm_employee_attendance where AttValue='OD' AND EmployeeID=".$id." AND (AttDate between '".date($NY."-".$NM."-1")."' AND '".date($NY."-".$NM."-".$day)."')", $con); $SqlHoliday=mysql_query("select count(AttValue)as Holiday from hrm_employee_attendance where AttValue='HO' AND EmployeeID=".$id." AND (AttDate between '".date($NY."-".$NM."-1")."' AND '".date($NY."-".$NM."-".$day)."')",$con); $SqlELSun=mysql_query("select count(CheckSunday)as SUN from hrm_employee_attendance where CheckSunday='Y' AND EmployeeID=".$id." AND (AttDate between '".date($NY."-".$NM."-1")."' AND '".date($NY."-".$NM."-".$day)."')",$con);

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
   $TotalTL=$ResTL['TL']; 
   
   $CountAch=$ResAch['ACH']/2; $CountAsh=$ResAsh['ASH']/2; $CountAph=$ResAph['APH']/2;
   $TotalCL=$CountCL+$CountCH+$CountAch;
   $TotalSL=$CountSL+$CountSH+$CountAsh;   
   $TotalPL=$ResPL['PL']+$CountPH+$CountAph;
   
   $TotalLeaveCount=$TotalCL+$TotalSL+$TotalPL+$TotalEL+$TotalFL+$TotalTL+$TotalML; $TotELSun=$ResELSun['SUN'];
   $CountHf=$ResHf['Hf']/2; $TotalPR=$ResPresent['Present']+$CountCH+$CountSH+$CountPH+$CountHf;   
   $TotalAbsent=$ResAbsent['Absent']+$CountHf+$CountAch+$CountAsh+$CountAph; 
   $TotalOnDuties=$ResOnDuties['OnDuties']; 
   $TotalHoliday=$ResHoliday['Holiday']; 
   
   $TotalDayWithSunEL=$TotalPR+$TotalLeaveCount+$TotalOnDuties+$TotalHoliday;
   $TotalPaidDay=$TotalDayWithSunEL-$TotELSun;
   $TotalWorkingDay=26;
   
   /***************** hrm_employee_monthlyleave_balance open ******************/
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
	                
	 $sUpL=mysql_query("UPDATE hrm_employee_monthlyleave_balance set AvailedCL='".$TotalCL."', AvailedSL='".$TotalSL."', AvailedPL='".$TotalPL."', AvailedEL='".$TotalEL."', AvailedML='".$TotalML."', AvailedOL='".$TotalFL."', AvailedTL='".$TotalTL."', BalanceCL='".$TotBalCL."', BalanceSL='".$TotBalSL."', BalancePL='".$TotBalPL."', BalanceEL='".$TotBalEL."', BalanceML='".$TotBalML."', BalanceOL='".$TotBalFL."', MonthAtt_TotLeave='".$TotalLeaveCount."', MonthAtt_TotOD='".$TotalOnDuties."', MonthAtt_TotHO='".$TotalHoliday."', MonthAtt_TotPR='".$TotalPR."', MonthAtt_TotAP='".$TotalAbsent."', MonthAtt_TotWorkDay='".$TotalWorkingDay."', MonthAtt_TotPaidDay='".$TotalPaidDay."' where EmployeeID=".$id." AND Month='".$NM."' AND Year='".$NY."'", $con); }
	/**************** hrm_employee_monthlyleave_balance close **************/
   
    if($sUpL) 
    {  
	   
      /*********************** January January January January Open Open ***********************/
      if($_REQUEST['v']==12 AND date("m")==01)
      { 
       
       /*
       $NMM=1; $NYY=$Y+1; $yfT=$Y."-01-01"; $ytT=$Y."-12-31"; 
       $TW=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$id." AND (AttValue='P' OR AttValue='WFH') AND AttDate>='".$yfT."' AND AttDate<='".$ytT."' GROUP BY AttDate", $con); $TOD=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$id." AND AttValue='OD' AND AttDate>='".$yfT."' AND AttDate<='".$ytT."' GROUP BY AttDate", $con); $TCH=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$id." AND (AttValue='CH' OR AttValue='ACH') AND AttDate>='".$yfT."' AND AttDate<='".$ytT."' GROUP BY AttDate", $con); $TSH=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$id." AND (AttValue='SH' OR AttValue='ASH') AND AttDate>='".$yfT."' AND AttDate<='".$ytT."' GROUP BY AttDate", $con); $TPH=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$id." AND (AttValue='PH' OR AttValue='APH') AND AttDate>='".$yfT."' AND AttDate<='".$ytT."' GROUP BY AttDate", $con); $THF=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$id." AND AttValue='HF' AND AttDate>='".$yfT."' AND AttDate<='".$ytT."' GROUP BY AttDate", $con); $THO=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$id." AND AttValue='HO' AND AttDate>='".$yfT."' AND AttDate<='".$ytT."' GROUP BY AttDate", $con); 
       $TC_W=mysql_num_rows($TW); $TC_OD=mysql_num_rows($TOD); $TC_CH=mysql_num_rows($TCH); 
       $TC_SH=mysql_num_rows($TSH); $TC_PH=mysql_num_rows($TPH); $TC_HF=mysql_num_rows($THF); 
       $TC_HO=mysql_num_rows($THO); 
       $TCountW=$TC_W; $TCountOD=$TC_OD; $TCountCH=$TC_CH/2; $TCountSH=$TC_SH/2; 
       $TCountPH=$TC_PH/2; $TCountHF=$TC_HF/2; $TCountHO=$TC_HO;
       */
       
       $ExpMonthDate=date('Y-m-d', strtotime("-2 months", strtotime(date("Y-m-d")))); $pp=strtotime($ExpMonthDate);
       $ExpMonth=date('m', strtotime("-2 months", strtotime(date("Y-m-d"))));
       $ExpYear=date('Y', strtotime("-2 months", strtotime(date("Y-m-d"))));
	   $BY=date("Y")-1;
	   $AttT='hrm_employee_attendance_'.$BY; $AttT2='hrm_employee_attendance'; 
	   
	   $Cond1="EmployeeID=".$id." AND AttDate>='".date($Y."-01-01")."' AND AttDate<'".$ExpMonthDate."'";
       $Cond2="EmployeeID=".$id." AND AttDate>='".$ExpMonthDate."' AND AttDate<='".date($Y."-12-31")."'"; 
	   
       $NMM=1; $NYY=$Y+1; $yfT=$Y."-01-01"; $ytT=$Y."-12-31"; 
       
	   $TW=mysql_query("select * from ".$AttT." where (AttValue='P' OR AttValue='WFH') AND ".$Cond1." GROUP BY AttDate", $con); 
	   $TOD=mysql_query("select * from ".$AttT." where AttValue='OD' AND ".$Cond1." GROUP BY AttDate", $con); 
	   $TCH=mysql_query("select * from ".$AttT." where AttValue='CH' AND ".$Cond1." GROUP BY AttDate", $con); 
	   $TSH=mysql_query("select * from ".$AttT." where AttValue='SH' AND ".$Cond1." GROUP BY AttDate", $con); 
	   $TPH=mysql_query("select * from ".$AttT." where AttValue='PH' AND ".$Cond1." GROUP BY AttDate", $con); 
	   $THF=mysql_query("select * from ".$AttT." where AttValue='HF' AND ".$Cond1." GROUP BY AttDate", $con); 
	   $THO=mysql_query("select * from ".$AttT." where AttValue='HO' AND ".$Cond1." GROUP BY AttDate", $con); 
	   $TC_W=mysql_num_rows($TW); $TC_OD=mysql_num_rows($TOD); $TC_CH=mysql_num_rows($TCH); 
       $TC_SH=mysql_num_rows($TSH); $TC_PH=mysql_num_rows($TPH); $TC_HF=mysql_num_rows($THF); 
       $TC_HO=mysql_num_rows($THO);
	   
	   $TW2=mysql_query("select * from ".$AttT2." where (AttValue='P' OR AttValue='WFH') AND ".$Cond2." GROUP BY AttDate", $con); 
	   $TOD2=mysql_query("select * from ".$AttT2." where AttValue='OD' AND ".$Cond2." GROUP BY AttDate", $con); 
	   $TCH2=mysql_query("select * from ".$AttT2." where (AttValue='CH' OR AttValue='ACH') AND ".$Cond2." GROUP BY AttDate", $con); 
	   $TSH2=mysql_query("select * from ".$AttT2." where (AttValue='SH' OR AttValue='ASH') AND ".$Cond2." GROUP BY AttDate", $con); 
	   $TPH2=mysql_query("select * from ".$AttT2." where (AttValue='PH' OR AttValue='APH') AND ".$Cond2." GROUP BY AttDate", $con); 
	   $THF2=mysql_query("select * from ".$AttT2." where AttValue='HF' AND ".$Cond2." GROUP BY AttDate", $con); 
	   $THO2=mysql_query("select * from ".$AttT2." where AttValue='HO' AND ".$Cond2." GROUP BY AttDate", $con);
       $TC2_W=mysql_num_rows($TW2); $TC2_OD=mysql_num_rows($TOD2); $TC2_CH=mysql_num_rows($TCH2); 
       $TC2_SH=mysql_num_rows($TSH2); $TC2_PH=mysql_num_rows($TPH2); $TC2_HF=mysql_num_rows($THF2); 
       $TC2_HO=mysql_num_rows($THO2);
	   
       $TCountW=$TC_W+$TC2_W; $TCountOD=$TC_OD+$TC2_OD; $TCountCH=($TC_CH/2)+($TC2_CH/2); $TCountSH=($TC_SH/2)+($TC2_SH/2); 
       $TCountPH=($TC_PH/2)+($TC2_PH/2); $TCountHF=($TC_HF/2)+($TC2_HF/2); $TCountHO=$TC_HO+$TC2_HO;
       
       $TTotW=$TCountW+$TCountOD+$TCountCH+$TCountSH+$TCountPH+$TCountHF+$TCountHO;
       $TTotW_NoHO=$TCountW+$TCountOD+$TCountCH+$TCountSH+$TCountPH+$TCountHF;
 
       if(($resE['DateJoining']<=date($Y.'-09-30')) OR ($TTotW_NoHO>=90)) //$TTotW
       { 
        $sqlTotEL=mysql_query("select EL from hrm_eldistributed where ".$TTotW_NoHO.">=Day_GraterthenEqual AND ".$TTotW_NoHO."<Day_LessThen AND CompanyId=".$CompanyId, $con); $rowTotEL=mysql_num_rows($sqlTotEL); 
       if($rowTotEL>0){$resTotEL=mysql_fetch_assoc($sqlTotEL); $CreditEL=$resTotEL['EL'];}else{$CreditEL=0;}
       }
       else{$CreditEL=0;} 
       
	   $sqlB=mysql_query("select OpeningSL,OpeningEL from hrm_employee_monthlyleave_balance where EmployeeID=".$id." AND Month=".$NMM." AND Year=".$NYY, $con); $rowB=mysql_num_rows($sqlB); 
       if($rowB>0)
       {
        $resB=mysql_fetch_assoc($sqlB); 
        if($resB['OpeningSL']>=30){ $OSL=30; $CSL=0; $TSL=30; }
        elseif($resB['OpeningSL']==29){ $OSL=29; $CSL=1; $TSL=30; }
        elseif($resB['OpeningSL']==28){ $OSL=28; $CSL=2; $TSL=30; }
        elseif($resB['OpeningSL']==27){ $OSL=27; $CSL=3; $TSL=30; }
        elseif($resB['OpeningSL']==26){ $OSL=26; $CSL=4; $TSL=30; }
	    elseif($resB['OpeningSL']<0){ $OSL=0; $CSL=5; $TSL=5; }
        else{ $OSL=$resB['OpeningSL']; $CSL=5; $TSL=$resB['OpeningSL']+5; }
	
	    //if($resE['DateConfirmationYN']=='Y'){ $CPL=6; $TPL=6; $COL=2; $TOL=2; }else{ $CPL=0; $TPL=0; $COL=0; $TOL=0; }
        
        if($resE['DateConfirmationYN']=='Y' && $CompanyId==1){ $CPL=6; $TPL=6; $COL=2; $TOL=2; }
		elseif($resE['DateConfirmationYN']=='Y' && $CompanyId==3){ $CPL=8; $TPL=8; $COL=0; $TOL=0; }
		else{ $CPL=0; $TPL=0; $COL=0; $TOL=0; }
        
        
        $CEL=$CreditEL; $TEL=$resB['OpeningEL']+$CreditEL;
        if($TEL>30){ $EnCashEL=$TEL-30; }else{ $EnCashEL=0; }
        $BalEL=$TEL-$EnCashEL;
	
	    $sqlUp=mysql_query("update hrm_employee_monthlyleave_balance set OpeningCL=0, OpeningSL=".$OSL.", OpeningPL=0, OpeningOL=0, CreditedCL=7, CreditedSL=".$CSL.", CreditedPL=".$CPL.", CreditedEL=".$CEL.", CreditedOL=".$COL.", TotCL=7, TotSL=".$TSL.", TotPL=".$TPL.", TotEL=".$TEL.", TotOL=".$TOL.", EnCashEL=".$EnCashEL.", BalanceCL=7, BalanceSL=".$TSL.", BalancePL=".$TPL.", BalanceEL=".$BalEL.", BalanceOL=".$TOL." where EmployeeID=".$id." AND Month=".$NMM." AND Year=".$NYY, $con);	    
       }
      }
      /*********************** January January January January Close Close ***********************/		  
	  
    } //if($InsUpMonth)
  }
  if($sUpL){$msgLeave="Successfully process monthly leave."; } 
}





/* Open Monthaly Pay process */
if($_REQUEST['action']=='PayMonth' && $_REQUEST['v']!='')
{
 if(date("m")==01){ if($_REQUEST['v']==12){$Y=date("Y")-1;}else{$Y=date("Y");} }
 if(date("m")!=01){ $Y=date("Y");}
 $fd=date("Y",strtotime($_SESSION['fromdate'])); $td=date("Y",strtotime($_SESSION['todate'])); $PRD=$fd.'-'.$td;
 $sqlStD=mysql_query("select * from hrm_company_statutory_tds where CompanyId=".$CompanyId." AND Status='A'", $con); $resStD=mysql_fetch_assoc($sqlStD);
 $SqlLumSum=mysql_query("select hrm_company_statutory_lumpsum.*,hrm_company_statutory_taxsaving.*,hrm_company_statutory_pf.* from hrm_company_statutory_lumpsum INNER JOIN hrm_company_statutory_taxsaving ON hrm_company_statutory_lumpsum.CompanyId=hrm_company_statutory_taxsaving.CompanyId INNER JOIN hrm_company_statutory_pf ON hrm_company_statutory_lumpsum.CompanyId=hrm_company_statutory_pf.CompanyId where hrm_company_statutory_lumpsum.CompanyId=".$CompanyId, $con); $ResLumSum=mysql_fetch_assoc($SqlLumSum);
 
 $sqlE=mysql_query("select e.EmployeeID,EmpCode,DepartmentId,DesigId,GradeId,DateJoining from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID where e.CompanyId=".$CompanyId." AND e.EmpStatus='A' AND g.DateJoining!='0000-00-00' AND g.DateJoining!='1970-01-01' AND g.DateJoining<='".date($Y.'-'.$_REQUEST['v'].'-31')."' ", $con); 
 
 
 //(e.EmpCode= OR e.EmpCode= OR e.EmpCode= OR e.EmpCode= OR e.EmpCode= OR e.EmpCode= OR e.EmpCode= OR e.EmpCode= OR e.EmpCode= OR e.EmpCode= OR e.EmpCode= OR e.EmpCode= OR e.EmpCode= OR e.EmpCode= OR e.EmpCode= OR e.EmpCode= OR e.EmpCode= OR e.EmpCode= OR e.EmpCode= OR e.EmpCode= OR e.EmpCode= OR e.EmpCode= OR e.EmpCode= OR e.EmpCode= OR e.EmpCode= OR e.EmpCode= OR e.EmpCode= OR e.EmpCode= OR e.EmpCode= OR e.EmpCode= OR e.EmpCode= OR e.EmpCode= OR e.EmpCode= OR e.EmpCode= OR e.EmpCode= OR e.EmpCode= OR e.EmpCode= OR e.EmpCode= OR e.EmpCode= OR e.EmpCode= OR e.EmpCode= OR e.EmpCode= OR e.EmpCode= OR e.EmpCode= OR e.EmpCode= OR e.EmpCode= OR e.EmpCode= OR e.EmpCode= OR e.EmpCode= OR e.EmpCode= OR e.EmpCode= OR e.EmpCode= OR e.EmpCode= OR e.EmpCode= OR e.EmpCode= OR e.EmpCode= OR e.EmpCode= OR e.EmpCode= OR e.EmpCode= OR e.EmpCode= OR e.EmpCode= OR e.EmpCode= OR e.EmpCode= OR e.EmpCode= OR e.EmpCode= OR e.EmpCode= OR e.EmpCode= OR e.EmpCode= OR e.EmpCode=) AND
 

  while($resE=mysql_fetch_assoc($sqlE))
  { $m=$_REQUEST['v']; $id=$resE['EmployeeID']; 
    $sqlME=mysql_query("select * from hrm_employee_monthlyleave_balance where Year=".$Y." AND EmployeeID=".$id." AND Month=".$m."", $con); 
	$rowME=mysql_num_rows($sqlME); 
	
	if($rowME>0) 
	{ 
	  $resME=mysql_fetch_assoc($sqlME);
/*********************************************************************************/
	  if($m==1 OR $m==2 OR $m==3 OR $m==4 OR $m==5 OR $m==6 OR $m==7 OR $m==8 OR $m==9)
	  { $FY=date("Y")-1; $TY=date("Y"); }
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
	     $sqldg=mysql_query("select HR_CurrDesigId,HR_CurrGradeId from hrm_employee_pms where EmployeeID=".$id." AND AssessmentYear=8",$con); $rqldg=mysql_fetch_assoc($sqldg);
	     $DesigId=$rqldg['HR_CurrDesigId']; $GradeId=$rqldg['HR_CurrGradeId']; 
	      
	  }
	  else
	  { 
	    $ExtQry="CtcCreatedDate>='".$FromD."' AND CtcCreatedDate<='".$ToD."'";
	    $DesigId=$resE['DesigId']; $GradeId=$resE['GradeId'];  
	  }
	  */
	  
	  //$sql_1=mysql_query("select MAX(CtcId) as MaxID from hrm_employee_ctc where EmployeeID=".$id." AND CtcCreatedDate!='0000-00-00' AND CtcCreatedDate!='1970-01-01' AND ".$ExtQry."", $con); 
	  
	  
	  //if($resE['DepartmentId']==2){ echo $resE['EmpCode'].' - '.$row_1.', '; }
	  
	  //$row_1=mysql_num_rows($sql_1);
	  //$res_1=mysql_fetch_assoc($sql_1); $MaxCtcId=$res_1['MaxID']; 
	  
	 /* 
	 if($resE['DateJoining']>='2020-01-01'){$sqlCTC=mysql_query("select * from hrm_employee_ctc where EmployeeID=".$id." AND Status='A'", $con);}
	  elseif($MaxCtcId!=''){$sqlCTC=mysql_query("select * from hrm_employee_ctc where EmployeeID=".$id." AND CtcId=".$MaxCtcId, $con);}
	 */ 
	  
	  /*if($MaxCtcId!=''){$sqlCTC=mysql_query("select * from hrm_employee_ctc where EmployeeID=".$id." AND CtcId=".$MaxCtcId, $con);}elseif($MaxCtcId==''){$sqlCTC=mysql_query("select * from hrm_employee_ctc where EmployeeID=".$id." AND ".$ExtQry." AND Status='A'", $con);}
	  */
	  
	  //echo "select * from hrm_employee_ctc where EmployeeID=".$id." AND Status='A'";
	  
	  $DesigId=$resE['DesigId']; $GradeId=$resE['GradeId'];
	  
	  $sqlCTC=mysql_query("select * from hrm_employee_ctc where EmployeeID=".$id." AND Status='A'", $con);
	  $resCTC=mysql_fetch_assoc($sqlCTC); 
/*********************************************************************************/	 
	
	 //echo 'aa='.$MaxCtcId.'-'.$resCTC['BAS_Value'];
	 
	$WorkDay=$resME['MonthAtt_TotWorkDay'];
        $TotalWorkDay=$resME['MonthAtt_TotLeave']+$resME['MonthAtt_TotOD']+$resME['MonthAtt_TotHO']+$resME['MonthAtt_TotPR']+$resME['MonthAtt_TotAP'];

       $SqlSun=mysql_query("select count(CheckSunday)as SUN from hrm_employee_attendance where CheckSunday='Y' AND EmployeeID=".$id." AND (AttDate between '".date($Y."-".$m."-1")."' AND '".date($Y."-".$m."-31")."')", $con); $ResSun=mysql_fetch_array($SqlSun); $TotSun=$ResSun['SUN'];
       if($TotSun>0){$TotalWork=$TotalWorkDay-$TotSun;}else{$TotalWork=$TotalWorkDay;} 
       $PrDay=$TotalWork-$resME['MonthAtt_TotAP'];
	  
       if($TotalWork==24 OR $TotalWork==25){$TotalWD=$WorkDay;}else{$TotalWD=$TotalWork;}
       if($TotalWD>$WorkDay){$TWD=$WorkDay;}else{$TWD=$TotalWD;}

	   
	if($resME['MonthAtt_TotAP']>0 AND $resME['MonthAtt_TotAP']>=10){$ActPD=$TotalWork-$resME['MonthAtt_TotAP'];}
	elseif($resME['MonthAtt_TotAP']>0 AND $resME['MonthAtt_TotAP']<10){$ActPD=$TWD-$resME['MonthAtt_TotAP'];}
	else{$ActPD=$TWD;}
    
	if($PrDay>0){$PaidDay=$ActPD;}else{$PaidDay=0;} 
	$sqlUp=mysql_query("update hrm_employee_monthlyleave_balance set MonthAtt_TotPaidDay=".$PaidDay." where Year=".$Y." AND EmployeeID=".$id." AND Month=".$m."",$con); $Absent=$resME['MonthAtt_TotAP'];

	  if($resCTC['BAS_Value']>0){ $OneDay_Basic=$resCTC['BAS_Value']/$WorkDay; 
	$Basic=round($OneDay_Basic*$PaidDay);}else{$Basic=0;}
	if($resCTC['SPECIAL_ALL_Value']>0){$OneDay_Spe=$resCTC['SPECIAL_ALL_Value']/$WorkDay; 
	$Special=round($OneDay_Spe*$PaidDay);}else{$Special=0;}
	  
	 /*if($resCTC['BAS_Value']>0)
	  { 
	   if($resCTC['EmpBSActPf']=='Y')
	   { 
	    $ToSalBS=$resCTC['BAS_Value']+$resCTC['SPECIAL_ALL_Value'];
		if($ToSalBS<=$ResLumSum['Pf_MaxSalPf']){ $BasicV=$ToSalBS; }else{ $BasicV=$ResLumSum['Pf_MaxSalPf']; }
	    $OneDay_Basic=$BasicV/$WorkDay; 
	   }
	   else{ $OneDay_Basic=$resCTC['BAS_Value']/$WorkDay; }
	   $Basic=round($OneDay_Basic*$PaidDay);
	  }
	  else{$Basic=0;}*/
	  
	  $ctcPf=round(($resCTC['BAS_Value']*12)/100);
	  if($resCTC['EmpBSActPf']=='Y' && $resCTC['BAS_Value']<=$ResLumSum['Pf_MaxSalPf'])
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
	  
	  
      
      //if($Basic<=$ResLumSum['Pf_MaxSalPf']){$PFBasic=$Basic;}else{$PFBasic=$ResLumSum['Pf_MaxSalPf'];}

  if($resCTC['Bonus_Month']>0) {$OneDay_Bonus=$resCTC['Bonus_Month']/$WorkDay; $Bonus=round($OneDay_Bonus*$PaidDay);}else{$Bonus=0;}	  
  if($resCTC['STIPEND_Value']>0) {$OneDay_Stip=$resCTC['STIPEND_Value']/$WorkDay; $Stip=round($OneDay_Stip*$PaidDay);}else{$Stip=0;}
  if($resCTC['HRA_Value']>0) {$OneDay_Hra=$resCTC['HRA_Value']/$WorkDay; $HRA=round($OneDay_Hra*$PaidDay);}else{$HRA=0;}
  if($resCTC['CONV_Value']>0) {$OneDay_Con=$resCTC['CONV_Value']/$WorkDay; $Con=round($OneDay_Con*$PaidDay);}else{$Con=0;}
  if($resCTC['CAR_ALL_Value']>0) {$OneDay_Car=$resCTC['CAR_ALL_Value']/$WorkDay; $Car=round($OneDay_Car*$PaidDay);}else{$Car=0;}
  if($resCTC['TA_Value']>0){$OneDay_Ta=$resCTC['TA_Value']/$WorkDay; $TA=round($OneDay_Ta*$PaidDay);}else{$TA=0;}
  if($resCTC['SPECIAL_ALL_Value']>0) {$OneDay_Spe=$resCTC['SPECIAL_ALL_Value']/$WorkDay; $Special=round($OneDay_Spe*$PaidDay);}else{$Special=0;}
  if($resCTC['CHILD_EDU_ALL_Value']>0)
  {
   if($resCTC['CHILD_EDU_ALL_Value']==1200){$CEA=$ResLumSum['CEA_PerChildMonth'];} 
   if($resCTC['CHILD_EDU_ALL_Value']==2400){$CEA=$ResLumSum['CEA_PerChildMonth']*2;}
  } 
  else{$CEA=0;}
  if($resCTC['MED_REM_Value']>0){$MR=$ResLumSum['MR_PerMonth'];}else{$MR=0;}  
  if($resCTC['LTA_Value']>0){$LTA=round($resCTC['LTA_Value']/12);}else{$LTA=0;}  
	  
  //if($Basic<=$ResLumSum['Pf_MaxSalPf']){ $Emp_PF=round(($PFBasic*12)/100);} else {$Emp_PF=round(($ResLumSum['Pf_MaxSalPf']*12)/100);}

      $Emp_PF=round(($PFBasic*12)/100);
      //$Emp_PF=ceil(($PFBasic*12)/100);  //uperside
      
      
      $Emp_EPS=0; $Emp_EDLI=0; $Emp_PFAdminCharge=0; $Emp_EDLIAdminCharge=0;
	  $Contri_PF=round(($PFBasic*$ResLumSum['Pf_PfContriRate'])/100); $Contri_EPS=round(($PFBasic*$ResLumSum['Pf_EpsContriRate'])/100); 
	  $Contri_EDLI=round(($PFBasic*$ResLumSum['Pf_DliContribution'])/100);  $Contri_PFAdminCharge=round(($PFBasic*$ResLumSum['Pf_PfAdminCharge'])/100); 
	  $Contri_EDLIAdminCharge=round((($PFBasic*$ResLumSum['Pf_DliAdminCharge'])/100), 2);
	  $TotPF_Emp=$Emp_PF+$Emp_EPS+$Emp_EDLI+$Emp_PFAdminCharge+$Emp_EDLIAdminCharge;
	  $TotPF_Contri=$Contri_PF+$Contri_EPS+$Contri_EDLI+$Contri_PFAdminCharge+$Contri_EDLIAdminCharge;
	  $TotPF=$TotPF_Emp+$TotPF_Contri;
	  if($resCTC['GrossSalary_PostAnualComponent_Value']>0) 
	  { //$OneDay_Gross=$resCTC['GrossSalary_PostAnualComponent_Value']/$WorkDay;
	    //$TotGross=round($OneDay_Gross*$PaidDay);
		$TotGross=$Basic+$HRA+$Con+$Special+$Bonus;
	  } 
	  else {$TotGross=0;}
	  
	  //if($resCTC['ESCI']>0){ $ESCI=round(($TotGross*0.75)/100); $ComESCI=round(($TotGross*3.25)/100); }
	  //else{ $ESCI=0; $ComESCI=0; }
	  
	  
	  if($resCTC['ESCI']>0){ $ESCI=ceil(($TotGross*0.75)/100); $ComESCI=round((($TotGross*3.25)/100), 1, PHP_ROUND_HALF_UP); }
	 else{ $ESCI=0; $ComESCI=0; } //round( 1.55, 1, PHP_ROUND_HALF_UP);
	  
	  
	  $TotDeduct=$TotPF_Emp+$ESCI;
	  $Tot_NetAmount=$TotGross-$TotDeduct;
	  $YI=$YearId;
	  $sqlME2=mysql_query("select * from hrm_employee_monthlypayslip where EmployeeID=".$id." AND Month=".$m." AND Year=".$Y."", $con); $rowME2=mysql_num_rows($sqlME2);
	  if($rowME2>0)
	  { $sqlUp=mysql_query("update hrm_employee_monthlypayslip set DepartmentId=".$resE['DepartmentId'].", DesigId=".$DesigId.", GradeId=".$GradeId.", TotalDay=".$WorkDay.", PaidDay=".$PaidDay.", Absent=".$Absent.", ActualBasic=".$resCTC['BAS_Value'].", Basic=".$Basic.",  Stipend=".$Stip.", Hra=".$HRA.", Convance=".$Con.", TA='".$TA."', Car_Allowance=".$Car.", Bonus_Month=".$Bonus.", Special=".$Special.", CEA_Ded=".$CEA.", MA_Ded=".$MR.", LTA_Ded=".$LTA.", EPF_Employee=".$Emp_PF.", EPF_Employer=".$Contri_PF.", ESCI_Employee=".$ESCI.", ESCI_Employer=".$ComESCI.", EPS_Employee=".$Emp_EPS.", EPS_Employer=".$Contri_EPS.", EDLI_Employee=".$Emp_EDLI.", EDLI_Employer=".$Contri_EDLI.", EPF_AdminCharge_Employee=".$Emp_PFAdminCharge.", EPF_AdminCharge_Employer=".$Contri_PFAdminCharge.", EDLI_AdminCharge_Employee=".$Emp_EDLIAdminCharge.", EDLI_AdminCharge_Employer=".$Contri_EDLIAdminCharge.", Tot_Pf_Employee=".$TotPF_Emp.", Tot_Pf_Employer=".$TotPF_Contri.", Tot_Pf=".$TotPF.", Tot_Gross=".$TotGross.", Tot_Deduct=".$TotDeduct.", Tot_NetAmount=".$Tot_NetAmount.", PaySlipCreatedBy=".$UserId.", PaySlipCreatedDate='".date("Y-m-d")."', PaySlipYearId=".$YearId." where EmployeeID=".$id." AND Month=".$m." AND Year=".$Y."", $con); }
	  if($rowME2==0)
	  {
	   $sqlUp=mysql_query("insert into hrm_employee_monthlypayslip(EmployeeID, Month, Year, DepartmentId, DesigId, GradeId, TotalDay, PaidDay, Absent, ActualBasic, Basic, Stipend, Hra, Convance, TA, Car_Allowance, Bonus_Month, Special, CEA_Ded, MA_Ded, LTA_Ded, EPF_Employee, EPF_Employer, ESCI_Employee, ESCI_Employer, EPS_Employee, EPS_Employer, EDLI_Employee, EDLI_Employer, EPF_AdminCharge_Employee, EPF_AdminCharge_Employer, EDLI_AdminCharge_Employee, EDLI_AdminCharge_Employer, Tot_Pf_Employee, Tot_Pf_Employer, Tot_Pf, Tot_Gross, Tot_Deduct, Tot_NetAmount, PaySlipCreatedBy, PaySlipCreatedDate, PaySlipYearId) values(".$id.", ".$m.", ".$Y.", ".$resE['DepartmentId'].", ".$DesigId.", ".$GradeId.", ".$WorkDay.", ".$PaidDay.", ".$Absent.", ".$resCTC['BAS_Value'].", ".$Basic.",  ".$Stip.", ".$HRA.", ".$Con.", '".$TA."', ".$Car.", ".$Bonus.", ".$Special.", ".$CEA.", ".$MR.", ".$LTA.", ".$Emp_PF.", ".$Contri_PF.", ".$ESCI.", ".$ComESCI.", ".$Emp_EPS.", ".$Contri_EPS.", ".$Emp_EDLI.", ".$Contri_EDLI.", ".$Emp_PFAdminCharge.", ".$TotPF_Contri.", ".$Emp_EDLIAdminCharge.", ".$Contri_EDLIAdminCharge.", ".$TotPF_Emp.", ".$TotPF_Contri.", ".$TotPF.", ".$TotGross.", ".$TotDeduct.", ".$Tot_NetAmount.", ".$UserId.", '".date("Y-m-d")."', ".$YI.")", $con); }
	 } 
	 
/* TDS Component Process Open */	/* TDS Component Process Open */	/* TDS Component Process Open */	
/* Upload Hear PaySlipTdsProcess.php check file same folder */
/* TDS Component Process Close */	 /* TDS Component Process Close */	/* TDS Component Process Close */	

  }
  if($sqlUp) {  $msgPay='Successfully process monthly pay...';  }
}
/* Close Monthaly Pay process */


/*********************** Open TDS **********************************/
if($_REQUEST['action']=='TDSMonth' && $_REQUEST['v']!='')
{}
/*********************** Close TDS *********************************/






?>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php include_once('../Title.php'); ?></title>

<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<link rel="stylesheet" type="text/css" href="src/css/jscal2.css"/>
<link rel="stylesheet" type="text/css" href="src/css/border-radius.css"/>
<link rel="stylesheet" type="text/css" href="src/css/steel/steel.css"/>
<script type="text/javascript" src="src/js/jscal2.js"></script>
<script type="text/javascript" src="src/js/lang/en.js"></script>
<style> .font { color:#ffffff; font-family:Times New Roman; font-size:15px; width:200px;} .font1 { font-family:Times New Roman; font-size:12px; height:14px; width:200px; } 
.font2 { font-size:12px;width:260px;height:18px;} .font4 { color:#1FAD34; font-family:Georgia; font-size:15px;}
.span {display:none; font-family:Courier New; font-size:14px; }.span1 {display:block; font-family:Courier New; font-size:14px; }
.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;}
.SaveButton {background-image:url(images/save.gif); width:20px; height:20px; background-repeat:no-repeat; background-color:#FFFFFF; border-color:#FFFFFF; border-bottom:inherit;}
.EditSelect { font-family:Georgia; font-size:12px; height:18px;}
.EditInput { font-family:Georgia; font-size:12px; height:18px;}
.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}
</style>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<script type="text/javascript" src="js/MandatoryAjaxCall.js"></script>
<Script type="text/javascript">window.history.forward(1);</Script>
<Script>
function MonthUpAtt(v)
{ if(v!=''){document.getElementById("BtnsubUpAtt").disabled=false; 
  window.location="MonthlyProcess.php?act=SelUpAttMonth&v="+v+"&ls=10&wer=123grtd&se=reew&w=ee102&tt=false&true=r%r"; } 
  if(v==''){document.getElementById("BtnsubUpAtt").disabled=true; 
  window.location="MonthlyProcess.php?act=SelUpAttMonth&v="+v+"&ls=10&wer=123grtd&se=reew&w=ee102&tt=false&true=r%r"; } 
}
function SelMonthUpAtt() 
{ var value=document.getElementById("CMonthUpAtt").value;  
  if(value==1){var m='January';}if(value==2){var m='February';}if(value==3){var m='March';}if(value==4){var m='April';}if(value==5){var m='May';}
  if(value==6){var m='June';}if(value==7){var m='July';}if(value==8){var m='August';}if(value==9){var m='September';}if(value==10){var m='October';}
  if(value==11){var m='November';}if(value==12){var m='December';}

  var agree1=confirm("Are you sure you want to process monthly attendance upadte for the month "+m+"?");
  if(agree1)
  { var agree2=confirm("Confirmation-2: Are you sure?");
    if(agree2)
	{ var agree3=confirm("Confirmation-3: Are you sure?");
	  if(agree3)
	  { var x = "MonthlyProcess.php?action=UpAttMonth&v="+value;  window.location=x; }
	}
  }
}

function MonthPay(v)
{ if(v!=''){document.getElementById("BtnsubPay").disabled=false; var x = "MonthlyProcess.php?act=SelMonth&v="+v+"&ls=10&wer=123grtd&se=reew&w=ee102&tt=false&true=r%r";   window.location=x;} 
  if(v==''){document.getElementById("BtnsubPay").disabled=true; var x = "MonthlyProcess.php?act=SelMonth&v="+v+"&ls=10&wer=123grtd&se=reew&w=ee102&tt=false&true=r%r"; window.location=x;} 
}
function SelMonthPay() 
{ var value=document.getElementById("CMonthPay").value;  
  if(value==1){var m='January';}if(value==2){var m='February';}if(value==3){var m='March';}if(value==4){var m='April';}if(value==5){var m='May';}
  if(value==6){var m='June';}if(value==7){var m='July';}if(value==8){var m='August';}if(value==9){var m='September';}if(value==10){var m='October';}
  if(value==11){var m='November';}if(value==12){var m='December';}

  var agree1=confirm("Are you sure you want to process monthly pay for the month "+m+"?");
  if(agree1)
  { var agree2=confirm("Confirmation-2: Are you sure?");
    if(agree2)
	{ var agree3=confirm("Confirmation-3: Are you sure?");
	  if(agree3)
	  { var x = "MonthlyProcess.php?action=PayMonth&v="+value;  window.location=x; }
	}
  }
}

function MonthLeave(v)
{ if(v!=''){document.getElementById("BtnsubLeave").disabled=false; var x = "MonthlyProcess.php?act=SelMonthLeave&v="+v+"&ls=10&wer=123grtd&se=reew&w=ee102&tt=false&true=r%r"; window.location=x;} 
  if(v==''){document.getElementById("BtnsubLeave").disabled=true; var x = "MonthlyProcess.php?act=SelMonthLeave&v="+v+"&ls=10&wer=123grtd&se=reew&w=ee102&tt=false&true=r%r"; window.location=x;} 
}
function SelMonthLeave() 
{ var value=document.getElementById("CMonthLeave").value;  
  if(value==1){var m='January';}if(value==2){var m='February';}if(value==3){var m='March';}if(value==4){var m='April';}if(value==5){var m='May';}
  if(value==6){var m='June';}if(value==7){var m='July';}if(value==8){var m='August';}if(value==9){var m='September';}if(value==10){var m='October';}
  if(value==11){var m='November';}if(value==12){var m='December';}

  var agree1=confirm("Are you sure you want to process monthly leave for the month "+m+"?");
  if(agree1)
  { var agree2=confirm("Confirmation-2: Are you sure?");
    if(agree2)
	{ var agree3=confirm("Confirmation-3: Are you sure?");
	  if(agree3)
	  { var x = "MonthlyProcess.php?action=LeaveMonth&v="+value;  window.location=x; }
	}
  }
}

function MonthAtt(v)
{ if(v!=''){document.getElementById("BtnsubAtt").disabled=false; var x = "MonthlyProcess.php?act=SelMonthAtt&v="+v+"&ls=10&wer=123grtd&se=reew&w=ee102&tt=false&true=r%r"; window.location=x;} 
  if(v==''){document.getElementById("BtnsubAtt").disabled=true; var x = "MonthlyProcess.php?act=SelMonthAtt&v="+v+"&ls=10&wer=123grtd&se=reew&w=ee102&tt=false&true=r%r"; window.location=x;} 
}
function SelMonthAtt() 
{ var value=document.getElementById("CMonthAtt").value;  
  if(value==1){var m='January';}if(value==2){var m='February';}if(value==3){var m='March';}if(value==4){var m='April';}if(value==5){var m='May';}
  if(value==6){var m='June';}if(value==7){var m='July';}if(value==8){var m='August';}if(value==9){var m='September';}if(value==10){var m='October';}
  if(value==11){var m='November';}if(value==12){var m='December';}

  var agree1=confirm("Are you sure you want to process Attendance for the month "+m+"?");
  if(agree1)
  { var agree2=confirm("Confirmation-2: Are you sure?");
    if(agree2)
	{ var agree3=confirm("Confirmation-3: Are you sure?");
	  if(agree3)
	  { var x = "MonthlyProcess.php?action=AttMonth&v="+value;  window.location=x; }
	}
  }
}

</SCRIPT> 
</head>
<body class="body">
<table class="table">
<tr>
 <td>
  <table class="menutable"><tr><td><?php if($_SESSION['login'] = true){ require_once("AMenu.php"); } ?></td></tr></table>
 </td>
</tr>
<tr>
 <td valign="top">
  <table width="100%" style="margin-top:0px;" border="0">
    <tr>
	  <td valign="top"><?php if($_SESSION['login'] = true){ require_once("AWelcome.php"); } ?></td>
	</tr>
	 <tr>
	  <td valign="top" align="center"  width="100%" id="MainWindow"><br>
<?php //*******************************************************************************************?>
<?php //************START*****START*****START******START******START****************************?>
<?php //*******************************************************************************************?>
<?php 
      if(date("m")==1){$OneDM=12; $OneTM='December'; $TwoDM=01; $TwoTM='January';} 
	  elseif(date("m")==2){$OneDM=01; $OneTM='January'; $TwoDM=02; $TwoTM='February';}  
      elseif(date("m")==3){$OneDM=02; $OneTM='February'; $TwoDM=03; $TwoTM='March';}   
	  elseif(date("m")==4){$OneDM=03; $OneTM='March'; $TwoDM=04; $TwoTM='April';}
      elseif(date("m")==5){$OneDM=04; $OneTM='April'; $TwoDM=05; $TwoTM='May';}        
	  elseif(date("m")==6){$OneDM=05; $OneTM='May'; $TwoDM=06; $TwoTM='June';}
      elseif(date("m")==7){$OneDM=06; $OneTM='June'; $TwoDM=07; $TwoTM='July';}        
	  elseif(date("m")==8){$OneDM=07; $OneTM='July'; $TwoDM=08; $TwoTM='August';}
      elseif(date("m")==9){$OneDM=08; $OneTM='August'; $TwoDM=09; $TwoTM='September';} 
	  elseif(date("m")==10){$OneDM=09; $OneTM='September'; $TwoDM=10; $TwoTM='October';}
      elseif(date("m")==11){$OneDM=10; $OneTM='October'; $TwoDM=11; $TwoTM='November';}
	  elseif(date("m")==12){$OneDM=11; $OneTM='November'; $TwoDM=12; $TwoTM='December';}	 

      if($_REQUEST['act']=='SelUpAttMonth' OR $_REQUEST['act']=='SelMonth' OR $_REQUEST['act']=='SelMonthTDS' OR $_REQUEST['act']=='SelMonthLeave' OR $_REQUEST['act']=='SelMonthAtt') 
      {
	   if($_REQUEST['v']==1){$SelM='January';} 
	   elseif($_REQUEST['v']==2){$SelM='February';} 
	   elseif($_REQUEST['v']==3){$SelM='March';} 
       elseif($_REQUEST['v']==4){$SelM='April';} 
	   elseif($_REQUEST['v']==5){$SelM='May';} 
	   elseif($_REQUEST['v']==6){$SelM='June';} 
	   elseif($_REQUEST['v']==7){$SelM='July';} 
	   elseif($_REQUEST['v']==8){$SelM='August';} 
	   elseif($_REQUEST['v']==9){$SelM='September';} 
	   elseif($_REQUEST['v']==10){$SelM='October';} 
	   elseif($_REQUEST['v']==11){$SelM='November';} 
	   elseif($_REQUEST['v']==12){$SelM='December';}
	  }  	
?>	
						  
<table border="0" style="margin-top:0px; width:100%; height:300px;">
 <tr>
  <td align="left" height="20" valign="top" colspan="3">
   <table border="0">
        <tr>
	  <td align="" width="210" style="font-family:Times New Roman;font-size:16px;color:#452969;font-weight:bold;">&nbsp;&nbsp;&nbsp;(1) <u>Attendance</u> :&nbsp;</td>
	  <td align="" style="font-family:Times New Roman; font-size:14px; color:#008000;" ><b>&nbsp;Select Month :</b></td>
	  <td align="left"><select style="font-family:Times New Roman;font-size:14px; width:100px; height:22px; font-weight:bold;" id="CMonthAtt" onChange="MonthAtt(this.value)"><?php if($_REQUEST['act']=='SelMonthAtt'){ ?><option value="<?php echo $_REQUEST['v']; ?>"><?php echo $SelM; ?></option><?php } ?>
	  <option value="">Select</option>
<?php if(date("m")==1 OR date("m")==2 OR $CompanyId==3){?><option value="1" >January</option><?php } ?>
<?php if(date("m")==2 OR date("m")==3 OR $CompanyId==3){?><option value="2" >February</option><?php } ?>
<?php if(date("m")==3 OR date("m")==4 OR $CompanyId==3){?><option value="3">March</option><?php } ?>
<?php if(date("m")==4 OR date("m")==5 OR $CompanyId==3){?><option value="4" >April</option><?php } ?>
<?php if(date("m")==5 OR date("m")==6 OR $CompanyId==3){?><option value="5" >May</option><?php } ?>
<?php if(date("m")==6 OR date("m")==7 OR $CompanyId==3){?><option value="6" >June</option><?php } ?>
<?php if(date("m")==7 OR date("m")==8 OR $CompanyId==3){?><option value="7" >July</option><?php } ?>
<?php if(date("m")==8 OR date("m")==9 OR $CompanyId==3){?><option value="8" >August</option><?php } ?>
<?php if(date("m")==9 OR date("m")==10 OR $CompanyId==3){?><option value="9" >September</option><?php } ?>
<?php if(date("m")==10 OR date("m")==11 OR $CompanyId==3){?><option value="10" >October</option><?php } ?>
<?php if(date("m")==11 OR date("m")==12 OR $CompanyId==3){?><option value="11" >November</option><?php } ?>
<?php if(date("m")==12 OR date("m")==1 OR $CompanyId==3){?><option value="12" >December</option><?php } ?>
	   </select></td>
	  <td style="font-family:Times New Roman; font-size:14px; color:#4A0000; font-weight:bold;">
<?php if($_SESSION['User_Permission']=='Edit' AND ($UserId==9 OR $UserId==10 OR $UserId==14)){?><input type="button" id="BtnsubAtt" value="submit" onClick="SelMonthAtt()" <?php if($_REQUEST['act']=='SelMonthAtt' AND $_REQUEST['v']!=''){ echo '';} else {echo 'disabled';} ?> style="width:80px; "/>&nbsp;&nbsp;&nbsp;<?php echo $msgAtt; ?><?php } ?></td>
	  <td class="font4" style="left">&nbsp;&nbsp;&nbsp;<b><?php echo $msg; ?></b></td>
	</tr>
	
    <tr>
	  <td align="" width="210" style="font-family:Times New Roman;font-size:16px;color:#452969;font-weight:bold;">&nbsp;&nbsp;&nbsp;(2) <u>Update Attendance</u> :&nbsp;</td>
	  <td align="" style="font-family:Times New Roman; font-size:14px; color:#008000;" ><b>&nbsp;Select Month :</b></td>
	  <td align="left"><select style="font-family:Times New Roman;font-size:14px; width:100px; height:22px; font-weight:bold;" id="CMonthUpAtt" onChange="MonthUpAtt(this.value)"> <?php if($_REQUEST['act']=='SelUpAttMonth') { ?><option value="<?php echo $_REQUEST['v']; ?>"><?php echo $SelM; ?></option><?php } ?>
      <option value="">Select</option>
<?php if(date("m")==1 OR date("m")==2 OR $CompanyId==3){?><option value="1" >January</option><?php } ?>
<?php if(date("m")==2 OR date("m")==3 OR $CompanyId==3){?><option value="2" >February</option><?php } ?>
<?php if(date("m")==3 OR date("m")==4 OR $CompanyId==3){?><option value="3">March</option><?php } ?>
<?php if(date("m")==4 OR date("m")==5 OR $CompanyId==3){?><option value="4" >April</option><?php } ?>
<?php if(date("m")==5 OR date("m")==6 OR $CompanyId==3){?><option value="5" >May</option><?php } ?>
<?php if(date("m")==6 OR date("m")==7 OR $CompanyId==3){?><option value="6" >June</option><?php } ?>
<?php if(date("m")==7 OR date("m")==8 OR $CompanyId==3){?><option value="7" >July</option><?php } ?>
<?php if(date("m")==8 OR date("m")==9 OR $CompanyId==3){?><option value="8" >August</option><?php } ?>
<?php if(date("m")==9 OR date("m")==10 OR $CompanyId==3){?><option value="9" >September</option><?php } ?>
<?php if(date("m")==10 OR date("m")==11 OR $CompanyId==3){?><option value="10" >October</option><?php } ?>
<?php if(date("m")==11 OR date("m")==12 OR $CompanyId==3){?><option value="11" >November</option><?php } ?>
<?php if(date("m")==12 OR date("m")==1 OR $CompanyId==3){?><option value="12" >December</option><?php } ?>
	   </select></td>
	  <td style="font-family:Times New Roman; font-size:14px; color:#4A0000; font-weight:bold;">
<?php if($_SESSION['User_Permission']=='Edit'){?><input type="button" id="BtnsubUpAtt" value="submit" onClick="SelMonthUpAtt()" <?php if($_REQUEST['act']=='SelUpAttMonth' AND $_REQUEST['v']!=''){ echo '';} else {echo 'disabled';} ?> style="width:80px; "/>&nbsp;&nbsp;&nbsp;<?php echo $msgUpAtt; ?><?php } ?></td>
	</tr>

    <tr>
	  <td align="" width="210" style="font-family:Times New Roman;font-size:16px;color:#452969;font-weight:bold;">&nbsp;&nbsp;&nbsp;(3) <u>Monthly Leave</u> :&nbsp;</td>
	  <td align="" style="font-family:Times New Roman; font-size:14px; color:#008000;" ><b>&nbsp;Select Month :</b></td>
	  <td align="left"><select style="font-family:Times New Roman;font-size:14px; width:100px; height:22px; font-weight:bold;" id="CMonthLeave" onChange="MonthLeave(this.value)"><?php if($_REQUEST['act']=='SelMonthLeave') { ?><option value="<?php echo $_REQUEST['v']; ?>"><?php echo $SelM; ?></option><?php } ?>
      <option value="">Select</option>
<?php if(date("m")==1 OR date("m")==2 OR $CompanyId==3){?><option value="1" >January</option><?php } ?>
<?php if(date("m")==2 OR date("m")==3 OR $CompanyId==3){?><option value="2" >February</option><?php } ?>
<?php if(date("m")==3 OR date("m")==4 OR $CompanyId==3){?><option value="3">March</option><?php } ?>
<?php if(date("m")==4 OR date("m")==5 OR $CompanyId==3){?><option value="4" >April</option><?php } ?>
<?php if(date("m")==5 OR date("m")==6 OR $CompanyId==3){?><option value="5" >May</option><?php } ?>
<?php if(date("m")==6 OR date("m")==7 OR $CompanyId==3){?><option value="6" >June</option><?php } ?>
<?php if(date("m")==7 OR date("m")==8 OR $CompanyId==3){?><option value="7" >July</option><?php } ?>
<?php if(date("m")==8 OR date("m")==9 OR $CompanyId==3){?><option value="8" >August</option><?php } ?>
<?php if(date("m")==9 OR date("m")==10 OR $CompanyId==3){?><option value="9" >September</option><?php } ?>
<?php if(date("m")==10 OR date("m")==11 OR $CompanyId==3){?><option value="10" >October</option><?php } ?>
<?php if(date("m")==11 OR date("m")==12 OR $CompanyId==3){?><option value="11" >November</option><?php } ?>
<?php if(date("m")==12 OR date("m")==1 OR $CompanyId==3){?><option value="12" >December</option><?php } ?>	   
	   </select></td>
	  <td style="font-family:Times New Roman; font-size:14px; color:#4A0000; font-weight:bold;">
<?php if($_SESSION['User_Permission']=='Edit'){?><input type="button" id="BtnsubLeave" value="submit" onClick="SelMonthLeave()" <?php if($_REQUEST['act']=='SelMonthLeave' AND $_REQUEST['v']!=''){ echo '';} else {echo 'disabled';} ?> style="width:80px; "/>&nbsp;&nbsp;&nbsp;<?php echo $msgLeave; ?><?php } ?></td>
	  <td class="font4" style="left">&nbsp;&nbsp;&nbsp;<b><?php echo $msg; ?></b></td>
	</tr>

	<tr>
	  <td align="" width="210" style="font-family:Times New Roman;font-size:16px;color:#452969;font-weight:bold;">&nbsp;&nbsp;&nbsp;(4) <u>Monthly Pay</u> :&nbsp;</td>
	  <td align="" style="font-family:Times New Roman; font-size:14px; color:#008000;" ><b>&nbsp;Select Month :</b></td>
	  <td align="left"><select style="font-family:Times New Roman;font-size:14px; width:100px; height:22px; font-weight:bold;" id="CMonthPay" onChange="MonthPay(this.value)"><?php if($_REQUEST['act']=='SelMonth') { ?><option value="<?php echo $_REQUEST['v']; ?>"><?php echo $SelM; ?></option><?php } ?>
          <option value="">Select</option>
<?php if(date("m")==1 OR date("m")==2 OR $CompanyId==3){?><option value="1" >January</option><?php } ?>
<?php if(date("m")==2 OR date("m")==3 OR $CompanyId==3){?><option value="2" >February</option><?php } ?>
<?php if(date("m")==3 OR date("m")==4 OR $CompanyId==3){?><option value="3">March</option><?php } ?>
<?php if(date("m")==4 OR date("m")==5 OR $CompanyId==3){?><option value="4" >April</option><?php } ?>
<?php if(date("m")==5 OR date("m")==6 OR $CompanyId==3){?><option value="5" >May</option><?php } ?>
<?php if(date("m")==6 OR date("m")==7 OR $CompanyId==3){?><option value="6" >June</option><?php } ?>
<?php if(date("m")==7 OR date("m")==8 OR $CompanyId==3){?><option value="7" >July</option><?php } ?>
<?php if(date("m")==8 OR date("m")==9 OR $CompanyId==3){?><option value="8" >August</option><?php } ?>
<?php if(date("m")==9 OR date("m")==10 OR $CompanyId==3){?><option value="9" >September</option><?php } ?>
<?php if(date("m")==10 OR date("m")==11 OR $CompanyId==3){?><option value="10" >October</option><?php } ?>
<?php if(date("m")==11 OR date("m")==12 OR $CompanyId==3){?><option value="11" >November</option><?php } ?>
<?php if(date("m")==12 OR date("m")==1 OR $CompanyId==3){?><option value="12" >December</option><?php } ?>
	   </select></td>
	  <td style="font-family:Times New Roman; font-size:14px; color:#4A0000; font-weight:bold;">
<?php if($_SESSION['User_Permission']=='Edit'){?><input type="button" id="BtnsubPay" value="submit" onClick="SelMonthPay()" <?php if($_REQUEST['act']=='SelMonth' AND $_REQUEST['v']!=''){ echo '';} else {echo 'disabled';} ?> style="width:80px; "/>&nbsp;&nbsp;&nbsp;<?php echo $msgPay; ?><?php } ?></td>
	  <td class="font4" style="left">&nbsp;&nbsp;&nbsp;<b><?php echo $msg; ?></b></td>
	</tr>
	
<?php if($_SESSION['User_Permission']=='Edit'){?>
<script>
function FunArrCal(c,y,m1,m2,m3,y1,y2,y3,uid){window.open("ArrCal.php?act=cal&c="+c+"&y="+y+"&m1="+m1+"&m2="+m2+"&m3="+m3+"&y1="+y1+"&y2="+y2+"&y3="+y3+"&chk=0&uid="+uid+"&dept=0&v1=1&v2=0","CF","menubar=no,scrollbars=yes,resizable=no,directories=no,width=1000,height=600"); }
</script>
	<tr>
	  <td align="" width="210" style="font-family:Times New Roman;font-size:16px;color:#452969;font-weight:bold;">&nbsp;&nbsp;&nbsp;(5) <span style="cursor:pointer" onClick="FunArrCal(<?php echo $CompanyId.','.$YearId.','.date("m").','.date("m").','.date("m").','.date("Y").','.date("Y").','.date("Y").','.$UserId; ?>)"><u>Arrear Calculation</u></span>&nbsp;</td>
	</tr>
<?php } ?>	
   </table>
  </td>
 </tr> 
</table>
		
<?php //*****************************************************************************?>
<?php //***************END*****END*****END******END******END*************************?>
<?php //*****************************************************************************************?>
		
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
