<?php
$con=mysqli_connect('localhost','vnrseed2_hr','vnrhrims321');
if(!$con) die("Failed to connect to database!");
$db=mysqli_select_db( $con, 'vnrseed2_hrims');
if(!$db) die("Failed to select database!");

$OldDate=date("d-m-Y",strtotime('-1 day', strtotime(date("Y-m-d"))));
$json = file_get_contents('http://45.124.144.98:6868/essl/attendance/date/'.$OldDate);
$obj = json_decode($json);

foreach($obj->data as $key =>$value)
{
   
 //if($value->CompanySName=='VSPL' && $value->UserId=='169')  
 if($value->CompanySName=='VSPL' || $value->CompanySName=='VNPL')
 {  
 
   $ec=$value->UserId;
   $date=date("Y-m-d",strtotime($value->attendanceDate));
   $y=date("Y",strtotime($date));
   $m=intval(date("m",strtotime($date)));
   $mm=date("m",strtotime($date));
   $c10=date("H:i",strtotime($value->inTime));         //inTime
   $c11=date("H:i",strtotime($value->outTime));        //outTime
   $diff=$value->MinuteDiff;
   $com=$value->CompanySName; //VSPL VVNR VNPL
   
   if($diff==0){ $c11='00:00:00'; }
   
   $mkdate = mktime(0,0,0, $m, 1, $y);
   $nodinm = date('t',$mkdate);  //Number of days in the given month (28-31)
   $dv=''; $comid=0; $YearId=0;
   if($com=='VSPL'){$comid=1;}elseif($com=='VNPL'){$comid=3;}
   
   $sY=mysqli_query($con,"select YearId from hrm_year where Company".$comid."Status='A'"); 
   $rY=mysqli_fetch_assoc($sY); $YearId=$rY['YearId'];
   
   if($comid==3){ $condn="EsslCode=".$ec; }else{ $condn="EmpCode=".$ec; }
   
   $sE=mysqli_query($con,"select EmployeeID, TimeApply, InTime, OutTime from hrm_employee where ".$condn." AND CompanyId=".$comid); $rowE=mysqli_num_rows($sE); 
   if($rowE>0)
   {
    $rE=mysqli_fetch_assoc($sE); 
	$ei=$rE['EmployeeID'];
	
	if($rE['TimeApply']=='Y' AND (($c10!='' AND $c10!='00:00' AND $c10!='00:00:00') OR ($c11!='' AND $c11!='00:00' AND $c11!='00:00:00')))
	{
	  
/********************************* OPEN ******************************************/
/********************************* OPEN ******************************************/

$dv = intval(date("d",strtotime($date)));
$dvv = date("d",strtotime($date));

$s2E=mysqli_query($con,"select S".$dv.", I".$dv.", O".$dv." from hrm_employee_attendance_settime where EmployeeID=".$ei); 
$row2E=mysqli_num_rows($s2E); $r2E=mysqli_fetch_assoc($s2E);
	  
 if($row2E>0) //Check 3 Open
 {

  $Inexp=date($c10); $Outexp=date($c11);
  $In=date("H:i",strtotime($r2E['I'.$dv])); $In_15=strtotime(date($r2E['I'.$dv]))+(15*60); $nI15=date('H:i',$In_15); 
  $Out=date("H:i",strtotime($r2E['O'.$dv])); $Out_15=strtotime(date($r2E['O'.$dv]))-(15*60); $nO15=date('H:i',$Out_15);

  /**************************** Check Leave Query Open ******************************/ 
  /**************************** Check Leave Query Open ******************************/ 	
  //Check Total CL Availed in month 
  $sCL=mysqli_query($con,"select SUM(Apply_TotalDay) as aCL from hrm_employee_applyleave where LeaveStatus!=4 AND LeaveStatus!=3 AND LeaveStatus!=2 AND EmployeeID=".$ei." AND Apply_FromDate>='".$y."-".$m."-01' AND Apply_ToDate<='".$y."-".$m."-".$nodinm."' AND (Leave_Type='CL' OR Leave_Type='CH')"); $rCL=mysqli_fetch_array($sCL);
  $ssCL=mysqli_query($con,"select Count(AttValue) as aaCL from hrm_employee_attendance where EmployeeID=".$ei." AND AttDate between '".$y."-".$m."-01' AND '".$y."-".$m."-".$nodinm."' AND AttValue='CL' group by AttDate"); 
  $rrCL=mysqli_fetch_array($ssCL);
  $ssCH=mysqli_query($con,"select Count(AttValue) as aaCH from hrm_employee_attendance where EmployeeID=".$ei." AND AttDate between '".$y."-".$mm."-01' AND '".$y."-".$mm."-".$nodinm."' AND AttValue='CH' group by AttDate"); 
  $rrCH=mysqli_fetch_array($ssCH);
  $CountCH=$rrCH['aaCH']/2; $tCL=$rCL['aCL']+$rrCL['aaCL']+$CountCH;
  //Check Total PL Availed in month
  $sPL=mysqli_query($con,"select SUM(Apply_TotalDay) as aPL from hrm_employee_applyleave where LeaveStatus!=4 AND LeaveStatus!=3 AND LeaveStatus!=2 AND EmployeeID=".$ei." AND Apply_FromDate>='".$y."-".$m."-01' AND Apply_ToDate<='".$y."-".$mm."-".$nodinm."' AND (Leave_Type='PL' OR Leave_Type='PH')"); $rPL=mysqli_fetch_array($sPL);
  $ssPL=mysqli_query($con,"select Count(AttValue) as aaPL from hrm_employee_attendance where EmployeeID=".$ei." AND AttDate between '".$y."-".$m."-01' AND '".$y."-".$mm."-".$nodinm."' AND AttValue='PL' group by AttDate"); 
  $rrPL=mysqli_fetch_array($ssPL);
  $ssPH=mysqli_query($con,"select Count(AttValue) as aaPH from hrm_employee_attendance where EmployeeID=".$ei." AND AttDate between '".$y."-".$m."-01' AND '".$y."-".$mm."-".$nodinm."' AND AttValue='PH' group by AttDate"); 
  $rrPH=mysqli_fetch_array($ssPH); 
  $CountPH=$rrPH['aaPH']/2; $tPL=$rPL['aPL']+$rrPL['aaPL']+$CountPH;

  //Check Balce CL & PL & SL in month
  $op=mysqli_query($con,"select OpeningCL,OpeningPL,OpeningSL,CreditedCL,CreditedPL,CreditedSL from hrm_employee_monthlyleave_balance where EmployeeID=".$ei." AND Month='".$m."' AND Year='".$y."'"); 
  $rowp=mysqli_num_rows($op); $rop=mysqli_fetch_array($op);
  if($rowp>0)
  { 
   $balCL=($rop['OpeningCL']+$rop['CreditedCL'])-$tCL; $balPL=($rop['OpeningPL']+$rop['CreditedPL'])-$tPL; 
   $balSL=($rop['OpeningSL']+$rop['CreditedSL'])-$tSL; 
  }
  else 
  { 
   $Pmm=date('m', strtotime("-1 months", strtotime(date($y."-".$mm."-".$dv)))); 
   $Pyy=date('Y', strtotime("-1 months", strtotime(date($y."-".$mm."-".$dv)))); 
   $op2=mysqli_query($con,"select BalanceCL,BalancePL,BalanceSL from hrm_employee_monthlyleave_balance where EmployeeID=".$ei." AND Month='".$Pmm."' AND Year='".$Pyy."'"); $rop2=mysqli_fetch_array($op2);
   $balCL=$rop2['BalanceCL']-$tCL; $balPL=$rop2['BalancePL']-$tPL; $balSL=$rop2['BalanceSL']-$tSL;
  }	  

  $schk=mysqli_query($con,"select Leave_Type from hrm_employee_applyleave where LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$ei." AND Apply_FromDate='".$y."-".$m."-".$dv."' AND Apply_ToDate='".$y."-".$m."-".$dv."' AND (Leave_Type='SH' OR Leave_Type='CH' OR Leave_Type='PH')"); $rowchk=mysqli_num_rows($schk); $rchk=mysqli_fetch_array($schk);

  if($rowchk>0){$Lv=$rchk['Leave_Type'];}
  elseif($balCL>0){$Lv='CH';}
  elseif($balPL>0){$Lv='PH';}
  else{$Lv='HF';}
  /**************************** Check Leave Query Close ******************************/	
  /**************************** Check Leave Query Close ******************************/	

  $Innlate=0; $Outtlate=0; $Late=0; $Inncnt='Y'; $Outtcnt='Y'; 
  $Relax='N'; $Allow='N'; $Af15=0;


  if(($c10=='' OR $c10=='00:00' OR $c10=='00:00:00') AND ($c11=='' OR $c11=='00:00' OR $c11=='00:00:00'))
  {$Att='A'; $Inncnt='Y'; $Outtcnt='Y'; $Innlate=0; $Outtlate=0; $Late=0; $Relax='N'; $Allow='N'; $Af15=0;}	
  elseif($c10<=$In AND $c11>=$Out AND ($c10!='' AND $c10!='00:00' AND $c10!='00:00:00'))
  {$Att='P'; $Inncnt='Y'; $Outtcnt='Y'; $Innlate=0; $Outtlate=0; $Late=0; $Relax='N'; $Allow='N'; $Af15=0;}
  elseif($c10>$nI15 OR $c11<$nO15 OR ($c10!='' AND $c11=='') OR ($c10=='' AND $c11!=''))
  { 
   $Att=$Lv; $Inncnt='Y'; $Outtcnt='Y';
   if($c10>$nI15 OR $c10==''){$Innlate=1;}else{$Innlate=0;}
   if($c11<$nO15 OR $c11==''){$Outtlate=1;}else{$Outtlate=0;}
   $Late=$Innlate+$Outtlate;
   $Relax='N'; $Allow='Y'; $Af15=1;
  }
  elseif(($c10>$In AND $c10<=$nI15) OR ($c11>=$nO15 AND $c11<$Out))
  { 
   if($c10>$In AND $c10<=$nI15){$Innlate=1;}else{$Innlate=0;}
   if($c11>=$nO15 AND $c11<$Out){$Outtlate=1;}else{$Outtlate=0;}   
   $tt=$Innlate+$Outtlate; if($tt==1){$Late=1;}elseif($tt==2){$Late=2;}else{$Late=0;}
   $Inncnt='Y'; $Outtcnt='Y'; $Af15=0;

   //Check between 15 minute late in IN/OUT 
   //Check between 15 minute late in IN/OUT
   $Innn=mysqli_query($con,"select SUM(InnLate) as ILate from hrm_employee_attendance where EmployeeID=".$ei." AND AttDate>='".$y."-".$m."-01' AND AttDate<='".$y."-".$m."-".$dv."' AND InnCnt='Y' AND Af15=0 group by AttDate"); 
   $Outtt=mysqli_query($con,"select SUM(OuttLate) as OLate from hrm_employee_attendance where EmployeeID=".$ei." AND AttDate>='".$y."-".$m."-01' AND AttDate<='".$y."-".$m."-".$dv."' AND OuttCnt='Y' AND Af15=0 group by AttDate"); 
   $rIn=mysqli_fetch_assoc($Innn); $rOut=mysqli_fetch_assoc($Outtt);
   $tLate=$rIn['ILate']+$rOut['OLate']+$tt;	   

   if($dv!=$nodinm)
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
   elseif($dv==$nodinm)
   {
    if($tLate<=2){$Att='P'; $Relax='Y'; $Allow='N';}
    elseif($tLate>2){$Att=$Lv; $Relax='N'; $Allow='Y';}
   }
  }
  else{$Att='A'; $Inncnt='Y'; $Outtcnt='Y'; $Innlate=0; $Outtlate=0; $Late=0; $Relax='N'; $Allow='N'; $Af15=0;}

  if(($c10!='' AND $c10!='00:00' AND $c10!='00:00:00') OR ($c11!='' AND $c11!='00:00' AND $c11!='00:00:00'))
  {  ////////////ififopen
    $chk=mysqli_query($con,"select * from hrm_employee_attendance WHERE EmployeeID=".$ei." AND AttDate='".$y."-".$mm."-".$dvv."'"); $rowchk=mysqli_num_rows($chk);
    if($rowchk>0)
    { 
	 $reschk=mysqli_fetch_assoc($chk); 
	 if($reschk['AttValue']=='CL' OR $reschk['AttValue']=='PL' OR $reschk['AttValue']=='SL' OR $reschk['AttValue']=='EL' OR $reschk['AttValue']=='OD' OR $reschk['AttValue']=='P'){ $ltv=$reschk['AttValue']; }
	 else{$ltv=$Att;} 
	 $Up=mysqli_query($con,"update hrm_employee_attendance set AttValue='".$ltv."', II='".$In.":00', OO='".$Out.":00', Inn='".$c10."', InnCnt='".$Inncnt."', InnLate=".$Innlate.", Outt='".$c11."', OuttCnt='".$Outtcnt."', OuttLate=".$Outtlate.", Late=".$Late.", Relax='".$Relax."', Allow='".$Allow."', Af15=".$Af15." WHERE EmployeeID=".$ei." AND AttDate='".$y."-".$mm."-".$dvv."'");
    } 
    elseif($rowchk==0)
	{
     $Up = mysqli_query($con,"insert into hrm_employee_attendance(EmployeeID, AttValue, AttDate, Year, YearId, II, OO, Inn, InnCnt, InnLate, Outt, OuttCnt, OuttLate, Late, Relax, Allow, Af15) values(".$ei.", '".$Att."', '".$y."-".$mm."-".$dvv."', '".$y."', ".$YearId.", '".$In.":00', '".$Out.":00', '".$c10."', '".$Inncnt."', ".$Innlate.", '".$c11."', '".$Outtcnt."', ".$Outtlate.", ".$Late.", '".$Relax."', '".$Allow."', ".$Af15.")");
    }
  } //////////ififclose

  
  /**** Leave Update Open ****/ /**** Leave Update Open ****/
  /**** Leave Update Open ****/ /**** Leave Update Open ****/
   
  $SqlCL=mysqli_query($con,"select count(DISTINCT AttDate)as CL from hrm_employee_attendance where AttValue='CL' AND EmployeeID=".$ei." AND AttDate between '".$y."-".$mm."-01' AND '".$y."-".$m."-".$nodinm."'"); 
  $SqlCH=mysqli_query($con,"select count(DISTINCT AttDate)as CH from hrm_employee_attendance where AttValue='CH' AND EmployeeID=".$ei." AND AttDate between '".$y."-".$mm."-01' AND '".$y."-".$m."-".$nodinm."'"); 
  $SqlSL=mysqli_query($con,"select count(DISTINCT AttDate)as SL from hrm_employee_attendance where AttValue='SL' AND EmployeeID=".$ei." AND AttDate between '".$y."-".$mm."-01' AND '".$y."-".$m."-".$nodinm."'"); 
  $SqlSH=mysqli_query($con,"select count(DISTINCT AttDate)as SH from hrm_employee_attendance where AttValue='SH' AND EmployeeID=".$ei." AND AttDate between '".$y."-".$mm."-01' AND '".$y."-".$m."-".$nodinm."'"); 
  $SqlPL=mysqli_query($con,"select count(DISTINCT AttDate)as PL from hrm_employee_attendance where AttValue='PL' AND EmployeeID=".$ei." AND AttDate between '".$y."-".$mm."-01' AND '".$y."-".$m."-".$nodinm."'"); 
  $SqlPH=mysqli_query($con,"select count(DISTINCT AttDate)as PH from hrm_employee_attendance where AttValue='PH' AND EmployeeID=".$ei." AND AttDate between '".$y."-".$mm."-01' AND '".$y."-".$m."-".$nodinm."'"); 
  $SqlEL=mysqli_query($con,"select count(DISTINCT AttDate)as EL from hrm_employee_attendance where AttValue='EL' AND EmployeeID=".$ei." AND AttDate between '".$y."-".$mm."-01' AND '".$y."-".$m."-".$nodinm."'"); 
  $SqlFL=mysqli_query($con,"select count(DISTINCT AttDate)as FL from hrm_employee_attendance where AttValue='FL' AND EmployeeID=".$ei." AND AttDate between '".$y."-".$mm."-01' AND '".$y."-".$m."-".$nodinm."'"); 
  $SqlTL=mysqli_query($con,"select count(DISTINCT AttDate)as TL from hrm_employee_attendance where AttValue='TL' AND EmployeeID=".$ei." AND AttDate between '".$y."-".$mm."-01' AND '".$y."-".$m."-".$nodinm."'"); 
  $SqlHf=mysqli_query($con,"select count(DISTINCT AttDate)as Hf from hrm_employee_attendance where AttValue='HF' AND EmployeeID=".$ei." AND AttDate between '".$y."-".$mm."-01' AND '".$y."-".$m."-".$nodinm."'"); 
  $SqlPresent=mysqli_query($con,"select count(DISTINCT AttDate)as Present from hrm_employee_attendance where AttValue='P' AND EmployeeID=".$ei." AND AttDate between '".$y."-".$mm."-01' AND '".$y."-".$m."-".$nodinm."'"); 
  $SqlAbsent=mysqli_query($con,"select count(DISTINCT AttDate)as Absent from hrm_employee_attendance where AttValue='A' AND EmployeeID=".$ei." AND AttDate between '".$y."-".$mm."-01' AND '".$y."-".$m."-".$nodinm."'"); 
  $SqlOnDuties=mysqli_query($con,"select count(DISTINCT AttDate)as OnDuties from hrm_employee_attendance where AttValue='OD' AND EmployeeID=".$ei." AND AttDate between '".$y."-".$mm."-01' AND '".$y."-".$m."-".$nodinm."'");
  $SqlHoliday=mysqli_query($con,"select count(DISTINCT AttDate)as Holiday from hrm_employee_attendance where AttValue='HO' AND EmployeeID=".$ei." AND AttDate between '".$y."-".$mm."-01' AND '".$y."-".$m."-".$nodinm."'"); 
  $SqlELSun=mysqli_query($con,"select count(DISTINCT AttDate)as SUN from hrm_employee_attendance where CheckSunday='Y' AND EmployeeID=".$ei." AND AttDate between '".$y."-".$mm."-01' AND '".$y."-".$m."-".$nodinm."'");  

  $ResCL=mysqli_fetch_array($SqlCL); $ResCH=mysqli_fetch_array($SqlCH); $ResSL=mysqli_fetch_array($SqlSL); 
  $ResSH=mysqli_fetch_array($SqlSH); $ResPH=mysqli_fetch_array($SqlPH); $ResPL=mysqli_fetch_array($SqlPL); 
  $ResEL=mysqli_fetch_array($SqlEL); $ResFL=mysqli_fetch_array($SqlFL); $ResTL=mysqli_fetch_array($SqlTL); 
  $ResHf=mysqli_fetch_array($SqlHf); $ResPresent=mysqli_fetch_array($SqlPresent); 
  $ResAbsent=mysqli_fetch_array($SqlAbsent); $ResOnDuties=mysqli_fetch_array($SqlOnDuties); 
  $ResHoliday=mysqli_fetch_array($SqlHoliday); $ResELSun=mysqli_fetch_array($SqlELSun);
  $CountCL=$ResCL['CL']; $CountCH=$ResCH['CH']/2; $TotalCL=$CountCL+$CountCH; 
  $CountSL=$ResSL['SL']; $CountSH=$ResSH['SH']/2; $TotalSL=$CountSL+$CountSH;
  $CountPH=$ResPH['PH']/2; $TotalPL=$ResPL['PL']+$CountPH;   
  $CountHf=$ResHf['Hf']/2; $TotalEL=$ResEL['EL']; $TotalFL=$ResFL['FL']; $TotalTL=$ResTL['TL'];

  $TotalLeaveCount=$TotalCL+$TotalSL+$TotalPL+$ResEL['EL']+$ResFL['FL']+$ResTL['TL']; 
  $TotalPR=$ResPresent['Present']+$CountCH+$CountSH+$CountPH+$CountHf;   
  $TotalAbsent=$ResAbsent['Absent']+$CountHf;
  $TotalOnDuties=$ResOnDuties['OnDuties']; $TotalHoliday=$ResHoliday['Holiday']; 
  $TotalDayWithSunEL=$TotalPR+$TotalLeaveCount+$TotalOnDuties+$TotalHoliday;
  $TotalPaidDay=$TotalDayWithSunEL-$ResELSun['SUN'];

  $SL=mysqli_query($con,"select * from hrm_employee_monthlyleave_balance where EmployeeID=".$ei." AND Month='".$mm."' AND Year='".$y."'");  $RowL=mysqli_num_rows($SL);
  if($RowL>0)
  { 
    $RL=mysqli_fetch_assoc($SL); 
    if($m!=1)
    { 
	  $TotBalCL=$RL['OpeningCL']-$TotalCL; $TotBalSL=$RL['OpeningSL']-$TotalSL; 
      $TotBalPL=$RL['OpeningPL']-$TotalPL; $TotBalEL=$RL['OpeningEL']-$TotalEL; 
      $TotBalFL=$RL['OpeningOL']-$TotalFL; 
    }  
    elseif($m==1)
    { 
	  $TotBalCL=$RL['TotCL']-$TotalCL; $TotBalSL=$RL['TotSL']-$TotalSL; $TotBalPL=$RL['TotPL']-$TotalPL;  
      $TotBalEL=$RL['TotEL']-($TotalEL+$RL['EnCashEL']); $TotBalFL=$RL['TotOL']-$TotalFL;
    }  

    $sUpL=mysqli_query($con,"UPDATE hrm_employee_monthlyleave_balance set AvailedCL='".$TotalCL."', AvailedSL='".$TotalSL."', AvailedPL='".$TotalPL."', AvailedEL='".$TotalEL."', AvailedOL='".$TotalFL."', AvailedTL='".$TotalTL."', BalanceCL='".$TotBalCL."', BalanceSL='".$TotBalSL."', BalancePL='".$TotBalPL."', BalanceEL='".$TotBalEL."', BalanceOL='".$TotBalFL."' where EmployeeID=".$ei." AND Month='".$m."' AND Year='".$y."'");
	
  } //if($RowL>0)
  
  /**** Leave update Close ****//**** Leave update Close ****/
  /**** Leave update Close ****//**** Leave update Close ****/

 } //Check 3 Close
	
/********************************* CLOSE *****************************************/
/********************************* CLOSE *****************************************/	  
	  
	 	  
	} //if($rE['TimeApply']=='Y')
   
   } //if($rowE>0)
   
 
 } //if($value->CompanySName=='VSPL' || $value->CompanySName=='VNPL')
 
}


?>