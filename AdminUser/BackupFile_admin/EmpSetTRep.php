<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}
include('AutoLApp.php');
$mkdate = mktime(0,0,0, $_REQUEST['m'], 1, $_REQUEST['Y']);
$days = date('t',$mkdate);  //Number of days in the given month (28-31)

$ExpMonthDate=date('Y-m-d', strtotime("-2 months", strtotime(date("Y-m-d")))); $pp=strtotime($ExpMonthDate);
$ExpMonth=date('m', strtotime("-2 months", strtotime(date("Y-m-d"))));
$ExpYear=date('Y', strtotime("-2 months", strtotime(date("Y-m-d"))));

$BY=date("Y")-1;
if($_REQUEST['Y']>=date("Y"))
{ $AttTable='hrm_employee_attendance'; $LeaveTable='hrm_employee_monthlyleave_balance'; 
  $AppLeaveTable='hrm_employee_applyleave'; $AttTable2='hrm_employee_attendance_'.$_REQUEST['Y']; }
elseif($_REQUEST['Y']==$BY AND date("m")=='01' AND $_REQUEST['m']==12)
{ $AttTable='hrm_employee_attendance'; $LeaveTable='hrm_employee_monthlyleave_balance'; 
  $AppLeaveTable='hrm_employee_applyleave'; $AttTable2='hrm_employee_attendance_'.$_REQUEST['Y']; }
elseif($_REQUEST['Y']==$BY AND $_REQUEST['m']<12)
{ $AttTable='hrm_employee_attendance'; $LeaveTable='hrm_employee_monthlyleave_balance_'.$_REQUEST['Y']; 
  $AppLeaveTable='hrm_employee_applyleave_'.$_REQUEST['Y']; $AttTable2='hrm_employee_attendance_'.$_REQUEST['Y']; }
else
{$AttTable='hrm_employee_attendance'; $LeaveTable='hrm_employee_monthlyleave_balance_'.$_REQUEST['Y']; 
 $AppLeaveTable='hrm_employee_applyleave_'.$_REQUEST['Y']; $AttTable2='hrm_employee_attendance_'.$_REQUEST['Y']; }



if($_REQUEST['act']=='recaltimeatt' AND $_REQUEST['ac2t']=='rctatt')
{
 
 $day=date("t",strtotime(date($_REQUEST['Y']."-".$_REQUEST['m']."-d"))); 
 $Lastday=$_REQUEST['Y']."-".$_REQUEST['m']."-".$day; 
/************************************************************************************/
 for($i=$_REQUEST['Y']."-".$_REQUEST['m']."-01"; $i<=$_REQUEST['Y']."-".$_REQUEST['m']."-".$day; $i++)
 { 
   //$tt=strtotime($i); if($tt<$pp){$tab=$AttTable2; }else{$tab=$AttTable; }
	
   $sE=mysql_query("select AttValue,Inn,Outt,InnCnt,OuttCnt,InnLate,OuttLate,Late,Af15 from ".$AttTable." where EmployeeID=".$_REQUEST['ei']." AND AttDate='".$i."'", $con); $rowE=mysql_num_rows($sE); $rE=mysql_fetch_assoc($sE);
   
   $dv = intval(date("d",strtotime($i)));
   $s2E=mysql_query("select S".$dv.", I".$dv.", O".$dv." from hrm_employee_attendance_settime where EmployeeID=".$_REQUEST['ei'],$con); $row2E=mysql_num_rows($s2E); $r2E=mysql_fetch_assoc($s2E);
	  
   if($row2E>0 AND $rowE>0) //Check 3 Open
   {  
	 $InP=date("H:i",strtotime($rE['Inn'])); $OutP=date("H:i",strtotime($rE['Outt']));
	 $In=date("H:i",strtotime($r2E['I'.$dv])); 
	 $In_15 = strtotime(date($r2E['I'.$dv])) + (15 * 60); $nI15=date('H:i',$In_15); 
	 $Out=date("H:i",strtotime($r2E['O'.$dv])); 
	 $Out_15 = strtotime(date($r2E['O'.$dv])) - (15 * 60); $nO15=date('H:i',$Out_15);
	  
	  //echo $i.' - '.$In.' '.$Out.' '.$nI15.' '.$nO15.' '.$In_15.' '.$Out_15.'<br>';
	
/**************************** Check Leave Query O ******************************/ 	
	  //Check Total CL Availed in month 
	 $sCL=mysql_query("select SUM(Apply_TotalDay) as aCL from ".$AppLeaveTable." where LeaveStatus!=4 AND LeaveStatus!=3 AND LeaveStatus!=2 AND EmployeeID=".$_REQUEST['ei']." AND Apply_FromDate>='".$_REQUEST['Y']."-".$_REQUEST['m']."-01' AND Apply_ToDate<='".$_REQUEST['Y']."-".$_REQUEST['m']."-31' AND (Leave_Type='CL' OR Leave_Type='CH')", $con); 
	 $rCL=mysql_fetch_array($sCL);
	 $ssCL=mysql_query("select Count(AttValue) as aaCL from ".$AttTable." where EmployeeID=".$_REQUEST['ei']." AND AttDate between '".$_REQUEST['Y']."-".$_REQUEST['m']."-01' AND '".$_REQUEST['Y']."-".$_REQUEST['m']."-".$dv."' AND AttValue='CL'", $con); $rrCL=mysql_fetch_array($ssCL);
	 $ssCH=mysql_query("select Count(AttValue) as aaCH from ".$AttTable." where EmployeeID=".$_REQUEST['ei']." AND AttDate between '".$_REQUEST['Y']."-".$_REQUEST['m']."-01' AND '".$_REQUEST['Y']."-".$_REQUEST['m']."-".$dv."' AND (AttValue='CH' OR AttValue='ACH')", $con); $rrCH=mysql_fetch_array($ssCH);
	 $CountCH=$rrCH['aaCH']/2; $tCL=$rCL['aCL']+$rrCL['aaCL']+$CountCH;
	  //Check Total PL Availed in month
	 $sPL=mysql_query("select SUM(Apply_TotalDay) as aPL from ".$AppLeaveTable." where LeaveStatus!=4 AND LeaveStatus!=3 AND LeaveStatus!=2 AND EmployeeID=".$_REQUEST['ei']." AND Apply_FromDate>='".$_REQUEST['Y']."-".$_REQUEST['m']."-01' AND Apply_ToDate<='".$_REQUEST['Y']."-".$_REQUEST['m']."-31' AND (Leave_Type='PL' OR Leave_Type='PH')", $con); $rPL=mysql_fetch_array($sPL);
	 $ssPL=mysql_query("select Count(AttValue) as aaPL from ".$AttTable." where EmployeeID=".$_REQUEST['ei']." AND AttDate between '".$_REQUEST['Y']."-".$_REQUEST['m']."-01' AND '".$_REQUEST['Y']."-".$_REQUEST['m']."-".$dv."' AND AttValue='PL'", $con); $rrPL=mysql_fetch_array($ssPL);
	 $ssPH=mysql_query("select Count(AttValue) as aaPH from ".$AttTable." where EmployeeID=".$_REQUEST['ei']." AND AttDate between '".$_REQUEST['Y']."-".$_REQUEST['m']."-01' AND '".$_REQUEST['Y']."-".$_REQUEST['m']."-".$dv."' AND (AttValue='CH' OR AttValue='APH')", $con); $rrPH=mysql_fetch_array($ssPH); 
	 $CountPH=$rrPH['aaPH']/2; $tPL=$rPL['aPL']+$rrPL['aaPL']+$CountPH;
	  //Check Balce CL & PL in month
	 $op=mysql_query("select OpeningCL,OpeningPL,CreditedCL,CreditedPL from ".$LeaveTable." where EmployeeID=".$_REQUEST['ei']." AND Month='".$_REQUEST['m']."' AND Year='".$_REQUEST['Y']."'", $con); 
	 $rowp=mysql_num_rows($op); $rop=mysql_fetch_array($op);
	 if($rowp>0)
	 { $balCL=($rop['OpeningCL']+$rop['CreditedCL'])-$tCL; $balPL=($rop['OpeningPL']+$rop['CreditedPL'])-$tPL; }
     else { $Pmm=date('m', strtotime("-1 months", strtotime(date($_REQUEST['Y']."-".$_REQUEST['m']."-".$dv)))); $Pyy=date('Y', strtotime("-1 months", strtotime(date($_REQUEST['Y']."-".$_REQUEST['m']."-".$dv)))); 
	 $op2=mysql_query("select BalanceCL,BalancePL from ".$LeaveTable." where EmployeeID=".$_REQUEST['ei']." AND Month='".$Pmm."' AND Year='".$Pyy."'", $con); $rop2=mysql_fetch_array($op2);
	 $balCL=$rop2['BalanceCL']-$tCL; $balPL=$rop2['BalancePL']-$tPL;
	 }	  
        
	 $schk=mysql_query("select Leave_Type from ".$AppLeaveTable." where LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$_REQUEST['ei']." AND Apply_FromDate='".$_REQUEST['Y']."-".$_REQUEST['m']."-".$dv."' AND Apply_ToDate='".$_REQUEST['Y']."-".$_REQUEST['m']."-".$dv."' AND (Leave_Type='SH' OR Leave_Type='CH' OR Leave_Type='PH')", $con); $rowchk=mysql_num_rows($schk); $rchk=mysql_fetch_array($schk);
	  
	 if($rowchk>0){$Lv=$rchk['Leave_Type'];}
	 elseif($balCL>0){$Lv='CH';}
	 elseif($balPL>0){$Lv='PH';}else{$Lv='HF';}
/**************************** Check Leave Query C ******************************/	
  
  //echo 'if('.$InP.'<='.$In.'AND '.$OutP.'>='.$Out.'<br>';	
  //echo 'elseif('.$InP.'>'.$nI15.' OR '.$OutP.'<'.$nO15.' OR ('.$InP.'!="" AND '.$OutP.'=="") OR ('.$InP.'=="" AND '.$OutP.'!=""))<br>';
  //echo 'elseif(('.$InP.'>'.$In.' AND '.$InP.'<='.$nI15.') OR ('.$OutP.'>='.$nO15.' AND '.$OutP.'<'.$Out.'))<br><br>';
	
   if($InP=='00:00' && $OutP!='00:00')
   {
       
    $Att=$Lv; $Inncnt='Y'; $Outtcnt='Y'; $Innlate=1;
	if($OutP<$nO15 OR $OutP==''){$Outtlate=1;}else{$Outtlate=0;}
    $Late=$Innlate+$Outtlate;
    $Relax='N'; $Allow='Y'; $Af15=1; 
   }
   elseif($InP!='00:00' && $OutP=='00:00')
   {
    $Att=$Lv; $Inncnt='Y'; $Outtcnt='Y'; $Outtlate=1;
	if($InP>$nI15 OR $InP==''){$Innlate=1;}else{$Innlate=0;}
    $Late=$Innlate+$Outtlate;
    $Relax='N'; $Allow='Y'; $Af15=1;   
   }
   elseif($InP<=$In AND $OutP>=$Out)
   {$Att='P'; $Inncnt='Y'; $Outtcnt='Y'; $Innlate=0; $Outtlate=0; $Late=0; $Relax='N'; $Allow='N'; $Af15=0;}
   elseif($InP>$nI15 OR $OutP<$nO15 OR ($InP!='' AND $OutP=='') OR ($InP=='' AND $OutP!=''))
   { 
	$Att=$Lv; $Inncnt='Y'; $Outtcnt='Y';
	if($InP>$nI15 OR $InP==''){$Innlate=1;}else{$Innlate=0;}
	if($OutP<$nO15 OR $OutP==''){$Outtlate=1;}else{$Outtlate=0;}
    $Late=$Innlate+$Outtlate;
    $Relax='N'; $Allow='Y'; $Af15=1;
   }
   elseif(($InP>$In AND $InP<=$nI15) OR ($OutP>=$nO15 AND $OutP<$Out))
   { 
    if($InP>$In AND $InP<=$nI15){$Innlate=1;}else{$Innlate=0;}
    if($OutP>=$nO15 AND $OutP<$Out){$Outtlate=1;}else{$Outtlate=0;}   
    $tt=$Innlate+$Outtlate; if($tt==1){$Late=1;}elseif($tt==2){$Late=2;}else{$Late=0;}
    $Inncnt='Y'; $Outtcnt='Y'; $Af15=0;
  	   
    //Check between 15 minute late in IN/OUT
    $Innn=mysql_query("select SUM(InnLate) as ILate from ".$AttTable." where EmployeeID=".$_REQUEST['ei']." AND AttDate>='".$_REQUEST['Y']."-".$_REQUEST['m']."-01' AND AttDate<'".$_REQUEST['Y']."-".$_REQUEST['m']."-".$dv."' AND InnCnt='Y' AND Af15=0",$con); 
    $Outtt=mysql_query("select SUM(OuttLate) as OLate from ".$AttTable." where EmployeeID=".$_REQUEST['ei']." AND AttDate>='".$_REQUEST['Y']."-".$_REQUEST['m']."-01' AND AttDate<'".$_REQUEST['Y']."-".$_REQUEST['m']."-".$dv."' AND OuttCnt='Y' AND Af15=0",$con); 
	$rIn=mysql_fetch_assoc($Innn); $rOut=mysql_fetch_assoc($Outtt);
    $tLate=$rIn['ILate']+$rOut['OLate']+$tt;	   
  
    if($tLate>0 AND $dv==$nodinm){$Att=$Lv; $Relax='N'; $Allow='Y';}
    elseif($tLate<=2 AND $dv!=$nodinm){$Att='P'; $Relax='Y'; $Allow='N';}
	elseif($tLate>2 AND $dv!=$nodinm AND $tt==1)
    {
     if($tLate==3 OR $tLate==4 OR $tLate==6 OR $tLate==7 OR $tLate==9 OR $tLate==10 OR $tLate==12 OR $tLate==13 OR $tLate==15 OR $tLate==16 OR $tLate==18 OR $tLate==19 OR $tLate==21 OR $tLate==22 OR $tLate==24 OR $tLate==25 OR $tLate==27 OR $tLate==28 OR $tLate==30 OR $tLate==31 OR $tLate==33 OR $tLate==34 OR $tLate==36 OR $tLate==37 OR $tLate==39 OR $tLate==40 OR $tLate==42 OR $tLate==43 OR $tLate==45 OR $tLate==46 OR $tLate==48 OR $tLate==49 OR $tLate==51 OR $tLate==52){$Att='P'; $Relax='N'; $Allow='N';}
     elseif($tLate==5 OR $tLate==8 OR $tLate==11 OR $tLate==14 OR $tLate==17 OR $tLate==20 OR $tLate==23 OR $tLate==26 OR $tLate==29 OR $tLate==32 OR $tLate==35 OR $tLate==38 OR $tLate==41 OR $tLate==44 OR $tLate==47 OR $tLate==50){$Att=$Lv; $Relax='N'; $Allow='Y';}
    }
    elseif($tLate>2 AND $dv!=$nodinm AND $tt==2)
    {
     if($tLate==3 OR $tLate==4 OR $tLate==7 OR $tLate==10 OR $tLate==13 OR $tLate==16 OR $tLate==19 OR $tLate==22 OR $tLate==25 OR $tLate==28 OR $tLate==31 OR $tLate==34 OR $tLate==37 OR $tLate==40 OR $tLate==43 OR $tLate==46 OR $tLate==49 OR $tLate==52){$Att='P'; $Relax='N'; $Allow='N';}
     elseif($tLate==5 OR $tLate==6 OR $tLate==8 OR $tLate==9 OR $tLate==11 OR $tLate==12 OR $tLate==14 OR $tLate==15 OR $tLate==17 OR $tLate==18 OR $tLate==20 OR $tLate==21 OR $tLate==23 OR $tLate==24 OR $tLate==26 OR $tLate==27 OR $tLate==29 OR $tLate==30 OR $tLate==32 OR $tLate==33 OR $tLate==35 OR $tLate==36 OR $tLate==38 OR $tLate==39 OR $tLate==41 OR $tLate==42 OR $tLate==44 OR $tLate==45 OR $tLate==47 OR $tLate==48 OR $tLate==50 OR $tLate==51){$Att=$Lv; $Relax='N'; $Allow='Y';}  
    }
   }
   else{$Att='A'; $Inncnt='Y'; $Outtcnt='Y'; $Innlate=0; $Outtlate=0; $Late=0; $Relax='N'; $Allow='N'; $Af15=0;}
	 
   $chk=mysql_query("select * from ".$AttTable." WHERE EmployeeID=".$_REQUEST['ei']." AND AttDate='".$_REQUEST['Y']."-".$_REQUEST['m']."-".$dv."'", $con); $rowchk=mysql_num_rows($chk);	 
   if($rowchk>0)
   { $reschk=mysql_fetch_assoc($chk); 
     if($reschk['AttValue']=='CL' OR $reschk['AttValue']=='PL' OR $reschk['AttValue']=='SL' OR $reschk['AttValue']=='EL' OR $reschk['AttValue']=='OD'){ $ltv=$reschk['AttValue']; }else{$ltv=$Att;}
	 if($reschk['InnCnt']=='Y' AND $reschk['OuttCnt']=='Y' AND (($InP!='' AND $InP!='00:00' AND $InP!='00:00:00') OR ($OutP!='' AND $OutP!='00:00' AND $OutP!='00:00:00')))
	 {
      $Up=mysql_query("update ".$AttTable." set AttValue='".$ltv."', II='".$In.":00', OO='".$Out.":00', Inn='".$InP."', InnCnt='".$Inncnt."', InnLate=".$Innlate.", Outt='".$OutP."', OuttCnt='".$Outtcnt."', OuttLate=".$Outtlate.", Late=".$Late.", Relax='".$Relax."', Allow='".$Allow."', Af15=".$Af15." WHERE EmployeeID=".$_REQUEST['ei']." AND AttDate='".$_REQUEST['Y']."-".$_REQUEST['m']."-".$dv."'", $con);
      
      
     }
	} 
   
  } //Check 2 Close
  
 
 } //for
 
/************************************************************************************/ 

//********************* Revised New Calculation Open ****************************//
//********************* Revised New Calculation Open ****************************///
//********************* Revised New Calculation Open ****************************///
/*
if(date($_REQUEST['Y']."-".$_REQUEST['m']."-".$day)<=date("Y-m-d"))
{
 
  $chk=mysql_query("select Max(AttId) as MxId from hrm_employee_attendance where EmployeeID=".$_REQUEST['ei']." AND ((Innlate=1 AND InnCnt='Y') OR (OuttLate=1 AND OuttCnt='Y')) AND AttDate between '".$_REQUEST['Y']."-".$_REQUEST['m']."-01' AND '".$_REQUEST['Y']."-".$_REQUEST['m']."-".$day."' AND Af15=0 AND Relax='N'",$con); $rowchk=mysql_num_rows($chk);
  $reschk=mysql_fetch_assoc($chk);                                          //AND AttValue = 'P'
  if($reschk['MxId']!='' && $reschk['MxId']>0)
  { 
   /**************************** Check Leave Query O ******************************	
	  //Check Total CL Availed in month 
	  $sCL=mysql_query("select SUM(Apply_TotalDay) as aCL from hrm_employee_applyleave where LeaveStatus!=4 AND LeaveStatus!=3 AND LeaveStatus!=2 AND EmployeeID=".$_REQUEST['ei']." AND Apply_FromDate>='".$_REQUEST['Y']."-".$_REQUEST['m']."-01' AND Apply_ToDate<='".$_REQUEST['Y']."-".$_REQUEST['m']."-".$day."' AND (Leave_Type='CL' OR Leave_Type='CH')", $con); $rCL=mysql_fetch_array($sCL);
	  $ssCL=mysql_query("select Count(AttValue) as aaCL from hrm_employee_attendance where EmployeeID=".$_REQUEST['ei']." AND AttDate between '".$_REQUEST['Y']."-".$_REQUEST['m']."-01' AND '".$_REQUEST['Y']."-".$_REQUEST['m']."-".$day."' AND AttValue='CL' group by AttDate", $con); $rrCL=mysql_fetch_array($ssCL);
	  $ssCH=mysql_query("select Count(AttValue) as aaCH from hrm_employee_attendance where EmployeeID=".$_REQUEST['ei']." AND AttDate between '".$_REQUEST['Y']."-".$_REQUEST['m']."-01' AND '".$_REQUEST['Y']."-".$_REQUEST['m']."-".$day."' AND AttValue='CH' group by AttDate", $con); $rrCH=mysql_fetch_array($ssCH);
	    $CountCH=$rrCH['aaCH']/2; $tCL=$rCL['aCL']+$rrCL['aaCL']+$CountCH;
	  //Check Total PL Availed in month
	  $sPL=mysql_query("select SUM(Apply_TotalDay) as aPL from hrm_employee_applyleave where LeaveStatus!=4 AND LeaveStatus!=3 AND LeaveStatus!=2 AND EmployeeID=".$_REQUEST['ei']." AND Apply_FromDate>='".$_REQUEST['Y']."-".$_REQUEST['m']."-01' AND Apply_ToDate<='".$_REQUEST['Y']."-".$_REQUEST['m']."-".$day."' AND (Leave_Type='PL' OR Leave_Type='PH')", $con); $rPL=mysql_fetch_array($sPL);
	  $ssPL=mysql_query("select Count(AttValue) as aaPL from hrm_employee_attendance where EmployeeID=".$_REQUEST['ei']." AND AttDate between '".$_REQUEST['Y']."-".$_REQUEST['m']."-01' AND '".$_REQUEST['Y']."-".$_REQUEST['m']."-".$day."' AND AttValue='PL' group by AttDate", $con); $rrPL=mysql_fetch_array($ssPL);
	  $ssPH=mysql_query("select Count(AttValue) as aaPH from hrm_employee_attendance where EmployeeID=".$_REQUEST['ei']." AND AttDate between '".$_REQUEST['Y']."-".$_REQUEST['m']."-01' AND '".$_REQUEST['Y']."-".$_REQUEST['m']."-".$day."' AND AttValue='PH' group by AttDate", $con); $rrPH=mysql_fetch_array($ssPH); 
	    $CountPH=$rrPH['aaPH']/2; $tPL=$rPL['aPL']+$rrPL['aaPL']+$CountPH;
	    
		
	  
	  //Check Balce CL & PL in month
	  $op=mysql_query("select OpeningCL,OpeningPL,OpeningSL,CreditedCL,CreditedPL,CreditedSL from hrm_employee_monthlyleave_balance where EmployeeID=".$_REQUEST['ei']." AND Month='".$_REQUEST['m']."' AND Year='".$_REQUEST['Y']."'", $con); 
	  $rowp=mysql_num_rows($op); $rop=mysql_fetch_array($op);
	  if($rowp>0)
	  { $balCL=($rop['OpeningCL']+$rop['CreditedCL'])-$tCL; $balPL=($rop['OpeningPL']+$rop['CreditedPL'])-$tPL; }
      else { $Pmm=date('m', strtotime("-1 months", strtotime(date($_REQUEST['Y']."-".$_REQUEST['m']."-".$day)))); $Pyy=date('Y', strtotime("-1 months", strtotime(date($_REQUEST['Y']."-".$_REQUEST['m']."-".$day)))); 
	   $op2=mysql_query("select BalanceCL,BalancePL,BalanceSL from hrm_employee_monthlyleave_balance where EmployeeID=".$_REQUEST['ei']." AND Month='".$Pmm."' AND Year='".$Pyy."'", $con); $rop2=mysql_fetch_array($op2);
	   $balCL=$rop2['BalanceCL']-$tCL; $balPL=$rop2['BalancePL']-$tPL; $balSL=$rop2['BalanceSL']-$tSL;
	  }	  
	   if($balCL>0){$Lvv='CH';}
	   elseif($balPL>0){$Lvv='PH';}
	   else{$Lvv='HF';}
	   
   /**************************** Check Leave Query C ****************************** 
   $Up=mysql_query("update hrm_employee_attendance set AttValue='".$Lvv."' WHERE AttId=".$reschk['MxId']." AND EmployeeID=".$_REQUEST['ei'], $con);

  }  
} 
*/
//********************* Revised New Calculation Close ****************************//
//********************* Revised New Calculation Close ****************************//
//********************* Revised New Calculation Close ****************************//

/**** Leave Update Open ****/
   $SqlCL=mysql_query("select count(AttValue)as CL from ".$AttTable." where AttValue='CL' AND EmployeeID=".$_REQUEST['ei']." AND AttDate between '".$_REQUEST['Y']."-".$_REQUEST['m']."-01' AND '".$_REQUEST['Y']."-".$_REQUEST['m']."-".$day."'", $con); $SqlCH=mysql_query("select count(AttValue)as CH from ".$AttTable." where AttValue='CH' AND EmployeeID=".$_REQUEST['ei']." AND AttDate between '".$_REQUEST['Y']."-".$_REQUEST['m']."-01' AND '".$_REQUEST['Y']."-".$_REQUEST['m']."-".$day."'", $con); $SqlSL=mysql_query("select count(AttValue)as SL from ".$AttTable." where AttValue='SL' AND EmployeeID=".$_REQUEST['ei']." AND AttDate between '".$_REQUEST['Y']."-".$_REQUEST['m']."-01' AND '".$_REQUEST['Y']."-".$_REQUEST['m']."-".$day."'", $con); $SqlSH=mysql_query("select count(AttValue)as SH from ".$AttTable." where AttValue='SH' AND EmployeeID=".$_REQUEST['ei']." AND AttDate between '".$_REQUEST['Y']."-".$_REQUEST['m']."-01' AND '".$_REQUEST['Y']."-".$_REQUEST['m']."-".$day."'", $con); $SqlPL=mysql_query("select count(AttValue)as PL from ".$AttTable." where AttValue='PL' AND EmployeeID=".$_REQUEST['ei']." AND AttDate between '".$_REQUEST['Y']."-".$_REQUEST['m']."-01' AND '".$_REQUEST['Y']."-".$_REQUEST['m']."-".$day."'", $con); $SqlPH=mysql_query("select count(AttValue)as PH from ".$AttTable." where AttValue='PH' AND EmployeeID=".$_REQUEST['ei']." AND AttDate between '".$_REQUEST['Y']."-".$_REQUEST['m']."-01' AND '".$_REQUEST['Y']."-".$_REQUEST['m']."-".$day."'", $con); $SqlEL=mysql_query("select count(AttValue)as EL from ".$AttTable." where AttValue='EL' AND EmployeeID=".$_REQUEST['ei']." AND AttDate between '".$_REQUEST['Y']."-".$_REQUEST['m']."-01' AND '".$_REQUEST['Y']."-".$_REQUEST['m']."-".$day."'", $con); $SqlFL=mysql_query("select count(AttValue)as FL from ".$AttTable." where AttValue='FL' AND EmployeeID=".$_REQUEST['ei']." AND AttDate between '".$_REQUEST['Y']."-".$_REQUEST['m']."-01' AND '".$_REQUEST['Y']."-".$_REQUEST['m']."-".$day."'", $con); $SqlTL=mysql_query("select count(AttValue)as TL from ".$AttTable." where AttValue='TL' AND EmployeeID=".$_REQUEST['ei']." AND AttDate between '".$_REQUEST['Y']."-".$_REQUEST['m']."-01' AND '".$_REQUEST['Y']."-".$_REQUEST['m']."-".$day."'", $con); $SqlHf=mysql_query("select count(AttValue)as Hf from ".$AttTable." where AttValue='HF' AND EmployeeID=".$_REQUEST['ei']." AND AttDate between '".$_REQUEST['Y']."-".$_REQUEST['m']."-01' AND '".$_REQUEST['Y']."-".$_REQUEST['m']."-".$day."'", $con); 
   
$SqlAch=mysql_query("select count(DISTINCT AttDate)as ACH from ".$AttTable." where AttValue='ACH' AND EmployeeID=".$_REQUEST['ei']." AND AttDate between '".$_REQUEST['Y']."-".$_REQUEST['m']."-01' AND '".$_REQUEST['Y']."-".$_REQUEST['m']."-".$day."'", $con);
$SqlAsh=mysql_query("select count(DISTINCT AttDate)as ASH from ".$AttTable." where AttValue='ASH' AND EmployeeID=".$_REQUEST['ei']." AND AttDate between '".$_REQUEST['Y']."-".$_REQUEST['m']."-01' AND '".$_REQUEST['Y']."-".$_REQUEST['m']."-".$day."'", $con);
$SqlAph=mysql_query("select count(DISTINCT AttDate)as APH from ".$AttTable." where AttValue='APH' AND EmployeeID=".$_REQUEST['ei']." AND AttDate between '".$_REQUEST['Y']."-".$_REQUEST['m']."-01' AND '".$_REQUEST['Y']."-".$_REQUEST['m']."-".$day."'", $con);   
   
   $SqlPresent=mysql_query("select count(AttValue)as Present from ".$AttTable." where (AttValue='P' OR AttValue='WFH') AND EmployeeID=".$_REQUEST['ei']." AND AttDate between '".$_REQUEST['Y']."-".$_REQUEST['m']."-01' AND '".$_REQUEST['Y']."-".$_REQUEST['m']."-".$day."'", $con); $SqlAbsent=mysql_query("select count(AttValue)as Absent from ".$AttTable." where AttValue='A' AND EmployeeID=".$_REQUEST['ei']." AND AttDate between '".$_REQUEST['Y']."-".$_REQUEST['m']."-01' AND '".$_REQUEST['Y']."-".$_REQUEST['m']."-".$day."'", $con); $SqlOnDuties=mysql_query("select count(AttValue)as OnDuties from ".$AttTable." where AttValue='OD' AND EmployeeID=".$_REQUEST['ei']." AND AttDate between '".$_REQUEST['Y']."-".$_REQUEST['m']."-01' AND '".$_REQUEST['Y']."-".$_REQUEST['m']."-".$day."'", $con); $SqlHoliday=mysql_query("select count(AttValue)as Holiday from ".$AttTable." where AttValue='HO' AND EmployeeID=".$_REQUEST['ei']." AND AttDate between '".$_REQUEST['Y']."-".$_REQUEST['m']."-01' AND '".$_REQUEST['Y']."-".$_REQUEST['m']."-".$day."'", $con); $SqlELSun=mysql_query("select count(CheckSunday)as SUN from ".$AttTable." where CheckSunday='Y' AND EmployeeID=".$_REQUEST['ei']." AND AttDate between '".$_REQUEST['Y']."-".$_REQUEST['m']."-01' AND '".$_REQUEST['Y']."-".$_REQUEST['m']."-".$day."'", $con);  
   
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
   
   $SL=mysql_query("select * from ".$LeaveTable." where EmployeeID=".$_REQUEST['ei']." AND Month='".$_REQUEST['m']."' AND Year='".$_REQUEST['Y']."'", $con);  $RowL=mysql_num_rows($SL);
   if($RowL>0)
   { $RL=mysql_fetch_assoc($SL); 
     if($m!=1)
	 { $TotBalCL=$RL['OpeningCL']-$TotalCL; $TotBalSL=$RL['OpeningSL']-$TotalSL; 
	   $TotBalPL=$RL['OpeningPL']-$TotalPL; $TotBalEL=$RL['OpeningEL']-$TotalEL; 
	   $TotBalFL=$RL['OpeningOL']-$TotalFL;
	 }  
     elseif($m==1)
	 { $TotBalCL=$RL['TotCL']-$TotalCL; $TotBalSL=$RL['TotSL']-$TotalSL; $TotBalPL=$RL['TotPL']-$TotalPL;  
	   $TotBalEL=$RL['TotEL']-($TotalEL+$RL['EnCashEL']); $TotBalFL=$RL['TotOL']-$TotalFL;
	 }  
   
   $sUpL=mysql_query("UPDATE ".$LeaveTable." set AvailedCL='".$TotalCL."', AvailedSL='".$TotalSL."', AvailedPL='".$TotalPL."', AvailedEL='".$TotalEL."', AvailedOL='".$TotalFL."', AvailedTL='".$TotalTL."', BalanceCL='".$TotBalCL."', BalanceSL='".$TotBalSL."', BalancePL='".$TotBalPL."', BalanceEL='".$TotBalEL."', BalanceOL='".$TotBalFL."' where EmployeeID=".$_REQUEST['ei']." AND Month='".$_REQUEST['m']."' AND Year='".$_REQUEST['Y']."'", $con);
   }
/**** Leave update Close ****/


}

?>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title><?php include_once('../Title.php'); ?></title>

<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style>
.htf{font-family:Times New Roman;;color:#000;font-weight:bold;text-align:center;font-size:18px;height:24px;}
.htf2{font-family:Times New Roman;;color:#000;font-weight:bold;text-align:center;font-size:12px;}
.tdf{ font-family:Times New Roman;font-size:12px;color:#000; border:hidden;}
.tdft{ font-family:Times New Roman;font-size:14px;color:#fff;}
.tdf2{font-family:Times New Roman;;font-size:12px;text-align:center;color:#fff;}

 .font { color:#ffffff; font-family:Georgia; font-size:11px; width:250px;} .font4 { color:#1FAD34; font-family:Georgia; font-size:13px; height:10px;}
.span {display:none; font-family:Courier New; font-size:14px; }.span1 {display:block; font-family:Courier New; font-size:14px; }
.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;}
.cell {color:#FFFFFF;font-family:Times New Roman;font-size:14px;font-weight:bold;} 
.cell2 {color:#000;font-family:Times New Roman;font-size:14px;} .cell3 {color:#030303;font-family:Times New Roman;font-size:14px; font-weight:bold;} 
.cellOpe {color:#FFFFFF;font-family:Times New Roman; height:20px; font-size:14px; font-weight:bold;}
.cellOpe2 {color:#000;font-family:Times New Roman; height:20px; font-size:14px; font-weight:bold;}
.cellOpe3 {color:#000;font-family:Times New Roman; width:30px;height:20px; font-size:14px; font-weight:bold;}
.inner_table{height:450px;overflow-y:auto;width:auto;}
</style>
<script type="text/javascript" src="js/stuHover.js"></script>
<!--<script type="text/javascript" src="js/MasterAjaxCall.js"></script>
<script type="text/javascript" src="js/Prototype.js"></script>-->
<Script type="text/javascript">window.history.forward(1);</script>
<script src="js/jquery-1.9.1.js"></script>
<script type="text/javascript" src="js/jquery.freezeheader.js"></script>
<script type="text/javascript" language="javascript">
$(document).ready(function () { $("#table1").freezeHeader({ 'height': '450px' }); })
/*function SelectMonth(v,y,d)
{ var x='EmpSetTRep.php?ls=10&wer=123grtd&se=reew&w=ee102&m='+v+'&Y='+y+'&ee=s1s&d='+d+'&dd=truevalu&fals=truefalse'; window.location=x; }
function SelectYear(v,m,d)
{ var x='EmpSetTRep.php?ls=10&wer=123grtd&se=reew&w=ee102&m='+m+'&Y='+v+'&ee=s1s&d='+d+'&dd=truevalu&fals=truefalse'; window.location=x; }
function SelectDept(v,m,y)
{ var x='EmpSetTRep.php?ls=10&wer=123grtd&se=reew&w=ee102&m='+m+'&Y='+y+'&ee=s1s&d='+v+'&dd=truevalu&fals=truefalse'; window.location=x; }*/ 

function FunClick()  
{
 if(document.getElementById("Month").value==''){alert("select month!"); return false;}
 else if(document.getElementById("Year").value==''){alert("select year!"); return false;}
 else if(document.getElementById("Department").value==''){alert("select department!"); return false;}
 else{ window.location='EmpSetTRep.php?ls=10&wer=123grtd&se=reew&w=ee102&m='+document.getElementById("Month").value+'&Y='+document.getElementById("Year").value+'&ee=s1s&d='+document.getElementById("Department").value+'&seh='+document.getElementById("Searchkey").value+'&dd=truevalu&fals=truefalse'; }
}
 
function FucChk(sn)
{ if(document.getElementById("Chk"+sn).checked==true){document.getElementById("TR"+sn).style.background='#55AAFF'; document.getElementById("Name"+sn).style.background='#55AAFF'; }
  else if(document.getElementById("Chk"+sn).checked==false){document.getElementById("TR"+sn).style.background='#FFFFFF'; document.getElementById("Name"+sn).style.background='#FFFFFF'; }
} 
 
function FunSetM(ei,m,y)
{ var win = window.open("EmpSetmTTime.php?D=0&rr=false&ei="+ei+"&m="+m+"&y="+y,"SmForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=850,height=500"); }

function AttReq(ei,m,y,d,lt)
{ if(lt==2){var hgt=500;}else{var hgt=350;}
  window.open("AttReqLD.php?ei="+ei+"&d="+d+"&m="+m+"&y="+y+"&lt="+lt,"Attform","menubar=no,scrollbars=yes,resizable=no,directories=no,width=600,height="+hgt+""); } 


function RefFun(ei,m,y,d)
{
 var agree=confirm("Are you sure?"); 
 if(agree){window.location='EmpSetTRep.php?act=recaltimeatt&ls=10&wer=123grtd&se=reew&w=ee102&m='+m+'&Y='+y+'&ee=s1s&d='+d+'&ei='+ei+'&dd=truevalu&ac2t=rctatt&&fals=truefalse';} 
}
 
</script>   
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
	  <td valign="top" align="left"><?php if($_SESSION['login'] = true){ require_once("AWelcome.php"); } ?></td>
	</tr>
	 <tr>
	  <td valign="top" align="center"  width="100%" id="MainWindow">
<?php //************************************************************************************?>
<?php //*************************START*****START*****START******START******START*****************************?>
<?php //************************************************************************************************ ?>	  
<table border="0" style="margin-top:0px; width:100%; height:350px;">
 <tr>
  <td align="left" height="20" valign="top" colspan="3">
<input type="hidden" name="ComId" id="ComId" value="<?php echo $CompanyId; ?>" /> 
<input type="hidden" name="YearId" id="YearId" value="<?php echo $YearId; ?>" />
<span id="AttMsgSpan"></span>
   <table border="0">
    <tr>
	  <td align="left" width="150">&nbsp;<font color="#2D002D" style='font-family:Times New Roman;' size="4"><b>Attendance :</b></font></td>
	  <td width="90%">
	    <table border="0">
		 <tr>
		   <td class="td1" style="font-size:11px;" align="center">
<?php if($_REQUEST['m']==1){$Month='JANUARY';}elseif($_REQUEST['m']==2){$Month='FEBRUARY';}elseif($_REQUEST['m']==3){$Month='MARCH';}elseif($_REQUEST['m']==4){$Month='APRIL';}elseif($_REQUEST['m']==5){$Month='MAY';}elseif($_REQUEST['m']==6){$Month='JUNE';}elseif($_REQUEST['m']==7){$Month='JULY';}elseif($_REQUEST['m']==8){$Month='AUGUST';}elseif($_REQUEST['m']==9){$Month='SEPTEMBER';}elseif($_REQUEST['m']==10){$Month='OCTOBER';}elseif($_REQUEST['m']==11){$Month='NOVEMBER';}elseif($_REQUEST['m']==12){$Month='DECEMBER';} ?>	  
		   <select style="font-size:11px; width:100px; height:19px; background-color:#DDFFBB; display:block;" name="Month" id="Month" onChange="SelectMonth(this.value, <?php echo $_REQUEST['Y'].', '.$_REQUEST['d']; ?>)"><option value="<?php echo $_REQUEST['m']; ?>"><?php echo $Month; ?></option><option value="12">DECEMBER</option><option value="11">NOVEMBER</option><option value="10">OCTOBER</option><option value="9">SEPTEMBER</option><option value="8">AUGUST</option><option value="7">JULY</option><option value="6">JUNE</option><option value="5">MAY</option><option value="4">APRIL</option><option value="3">MARCH</option><option value="2">FEBRUARY</option><option value="1">JANUARY</option></select></td>
		   
		   <td style="width:60px;"><select style="font-size:12px; width:60px; height:20px;background-color:#DDFFBB" name="Year" id="Year" onChange="SelectYear(this.value, <?php echo $_REQUEST['m'].', '.$_REQUEST['d']; ?>)">
	       <option value="<?php echo $_REQUEST['Y']; ?>"><?php echo $_REQUEST['Y']; ?></option>
               <?php for($i=date("Y"); $i>=2013; $i--){ ?>
<?php if($_REQUEST['Y']!=$i){ ?><option value="<?php echo $i; ?>"><?php echo $i; ?></option><?php } ?>
<?php } ?></select></td> 
		   <td class="td1" style="font-size:11px;"> 
		   <select style="font-size:11px; width:100px; height:19px; background-color:#DDFFBB; display:block;" name="Department" id="Department" onChange="SelectDept(this.value, <?php echo $_REQUEST['m'].', '.$_REQUEST['Y']; ?>)">

<?php $SqlD2=mysql_query("select DepartmentId,DepartmentCode from hrm_department where CompanyId=".$CompanyId." AND DeptStatus='A' order by DepartmentCode ASC", $con); 
      while($ResD2=mysql_fetch_array($SqlD2)) { ?><option value="<?php echo $ResD2['DepartmentId']; ?>" <?php if($_REQUEST['d']==$ResD2['DepartmentId']){ echo 'selected';}?>><?php echo $ResD2['DepartmentCode'];?></option><?php } ?><option value="All" <?php if($_REQUEST['d']=='All'){ echo 'selected';}?>>All</option></select></td>
      
      <td><input type="text" style="width:200px;height:19px; background-color:#DDFFBB;" id="Searchkey" name="Searchkey" placeholder="search from code or name" value="<?=$_REQUEST['seh']?>"/></td>
      
	       <td class="td1" style="font-size:12px; width:10px;">&nbsp;</td>
		   <td><input type="button" value="click" style="width:60px;" onClick="FunClick()" /></td>
		   
	     </tr>
         </table><?php //#FF8888';R, #FFB164';O, #006F00';Dg, '#37FF37';Lg, '#FFFFA4';Y ?>  
	  </td>
	</tr>
<style>.color{font-size:14px;font-family:Times New Roman;font-weight:bold;}</style>		 
	   	 <tr>
		   <td align="justify" valign="middle" colspan="5">
		    <table>
			 <tr>
			  <td style="width:10px;" bgcolor="#FF8888"></td><td class="color">More then 15M late/early going coming</td>
			  <td style="width:10px;">,</td>
			  <td style="width:10px;" bgcolor="#FFB164"></td><td class="color">After 2 relax<sup>n</sup> less then 15M late coming/early going</td>
			  <td style="width:10px;">,</td>
			  <td style="width:10px;" bgcolor="#00AE00"></td><td class="color">App<sup>rd</sup> by Mgr</td>
			  <td style="width:10px;">,</td>
			  <td style="width:10px;" bgcolor="#37FF37"></td><td class="color">App<sup>rd</sup> by HR</td>
			  <td style="width:10px;">,</td>
			  <td style="width:10px;" bgcolor="#FFFFA4"></td><td class="color">Relaxation</td>
			  <td style="width:10px;">,</td>
			  <td style="width:10px;" bgcolor="#2D96FF"></td><td class="color">Leave applied & app<sup>rd</sup></td>
			  <td style="width:10px;">,</td>
			  <td style="width:10px;" bgcolor="#B3D9FF"></td><td class="color">Leave applied & not app<sup>rd</sup></td>
			 </tr>
			</table>
		   </td>  
	    </tr> 
   </table>
  </td>
 </tr>
<?php if(($_SESSION['UserType']=='M' OR $_SESSION['UserType']=='S' OR $_SESSION['UserType']=='A' OR $_SESSION['UserType']=='U') AND $_SESSION['login'] = true) { ?>	
 <tr>
<?php $PreMonth=$ExpMDate=date('m', strtotime("-1 months", strtotime(date("Y-".date("m")."-d")))); ?>     
<?php //*********************************************** Open ****************************************************** ?> 
<td align="left" id="type" valign="top" width="100%">             
 <table border="0" cellpadding="0" cellspacing="0" style="width:100%;">
  <tr><td style="width:100%;">
  <table border="1" id="table1" cellpadding="0" cellspacing="1" style="width:<?php echo ($days*33)+300; ?>px;" style="margin-top:opx;width:100%;">
    <div class="thead">
    <thead>
	<tr bgcolor="#7a6189">	 
	 <td style="width:40px;" align="center" class="tdf2"><b>Sn</b></td>
     <td style="width:40px;" align="center" class="tdf2"><b>EC</b></td>
     <td style="width:150px;" align="center" class="tdf2"><b>Name</b></td>
<?php if($_REQUEST['d']=='All'){ ?><td style="width:100px;" align="center" class="tdf2"><b>Department</b></td><?php } ?>
	 <td style="width:35px;" align="center" class="tdf2"><b>In<br>Time</b></td>
	 <td style="width:35px;" align="center" class="tdf2"><b>Out<br>Time</b></td>
     <td style="width:35px;" align="center" class="tdf2"><b>Re<br>Fresh</b></td>
	 <?php for($i=1; $i<=$days; $i++){ ?>
     <td style="width:33px;" class="tdf2" bgcolor="<?php if(date("w",strtotime(date($_REQUEST['Y']."-".$_REQUEST['m']."-".$i)))==0) { echo '#6B983A'; }?>" ><?php echo $i; ?></td>
	 <?php } ?>
	</tr>
	</thead>
	</div>
<?php /*if($_REQUEST['d']>0){ $ConDQ = "g.DepartmentId=".$_REQUEST['d']; } 
elseif($_REQUEST['d']=='all'){ $ConDQ = "1=1"; }*/


if($_REQUEST['d']>0)
{ 
 if($_REQUEST['seh']!=''){ $ConDQ = "g.DepartmentId=".$_REQUEST['d']." AND (e.Fname like '%".$_REQUEST['seh']."%' OR e.Sname like '%".$_REQUEST['seh']."%' OR e.Lname like '%".$_REQUEST['seh']."%' OR e.EmpCode like '%".$_REQUEST['seh']."%')"; }else{ $ConDQ = "g.DepartmentId=".$_REQUEST['d']; } 
} 
elseif($_REQUEST['d']=='All')
{ 
  if($_REQUEST['seh']!=''){ $ConDQ = "(e.Fname like '%".$_REQUEST['seh']."%' OR e.Sname like '%".$_REQUEST['seh']."%' OR e.Lname like '%".$_REQUEST['seh']."%' OR e.EmpCode like '%".$_REQUEST['seh']."%')"; }
  else{ $ConDQ = "1=1"; }
}

if($ConDQ!='') 
{

$sql_statement=mysql_query("select e.EmployeeID,EmpCode,Fname,Sname,Lname,TimeApply,InTime,OutTime,DepartmentCode from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_department d on g.DepartmentId=d.DepartmentId where e.EmpStatus='A' AND e.TimeApply='Y' AND ".$ConDQ." AND e.CompanyId=".$CompanyId." order by EmpCode ASC", $con);

$total_records = mysql_num_rows($sql_statement);
if(isset($_GET['page'])) $page = $_GET['page']; else $page = 1;
$offset = 15;
if ($page){ $from = ($page * $offset) - $offset; }else{ $from = 0; }

$SqlEmp=mysql_query("select e.EmployeeID,EmpCode,Fname,Sname,Lname,TimeApply,InTime,OutTime,DepartmentCode from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_department d on g.DepartmentId=d.DepartmentId where e.EmpStatus='A' AND e.TimeApply='Y' AND ".$ConDQ." AND e.CompanyId=".$CompanyId." order by EmpCode ASC LIMIT ".$from.",".$offset, $con); //$from.",".$offset



/*if($_REQUEST['d']=='All'){ $SqlEmp=mysql_query("select e.EmployeeID,EmpCode,Fname,Sname,Lname,TimeApply,InTime,OutTime,DepartmentCode from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_department d on g.DepartmentId=d.DepartmentId where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." order by EmpCode ASC", $con); }else{ $SqlEmp=mysql_query("select e.EmployeeID,EmpCode,Fname,Sname,Lname,TimeApply,InTime,OutTime from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID where e.EmpStatus='A' AND g.DepartmentId=".$_REQUEST['d']." AND e.CompanyId=".$CompanyId." order by EmpCode ASC", $con); }*/ 

if($_GET['page']=='' OR $_GET['page']==0 OR $_GET['page']==1){ $Sno = 1; $page=0; }
else{ $Sno = 15*($_GET['page']-1)+1; $page=$_GET['page']; }
 
$SqlRows=mysql_num_rows($SqlEmp); echo '<input type="hidden" name="EmpRows" id="EmpRows" value='.$SqlRows.' />'; while($ResEmp=mysql_fetch_array($SqlEmp)){ if($ResEmp['TimeApply']=='Y'){ $EId=$ResEmp['EmployeeID'];?>
 <div class="tbody">
  <tbody>		
<tr id="TR<?php echo $Sno; ?>" bgcolor="#FFFFFF">
<td align="center" class="tdf"><?php echo $Sno; ?></td>
<td align="center" class="tdf"><span style="cursor:pointer;color:#0079F2;" onClick="FunSetM(<?php echo $ResEmp['EmployeeID'].','.$_REQUEST['m'].','.$_REQUEST['Y']; ?>)"><u><?php echo $ResEmp['EmpCode']; ?></u></span><br>
<input type="checkbox" id="Chk<?php echo $Sno; ?>" onClick="FucChk(<?php echo $Sno; ?>)" />
</td>
<td class="tdf"><span style="cursor:pointer;;" onClick="FunSetM(<?php echo $ResEmp['EmployeeID'].','.$_REQUEST['m'].','.$_REQUEST['Y']; ?>)"><u><?php echo ucfirst(strtolower($ResEmp['Fname'].' '.$ResEmp['Sname'].' '.$ResEmp['Lname'])); ?></u></span></td>	
<?php if($_REQUEST['d']=='All'){ ?>
<td align="center" class="tdf"><?php echo $ResEmp['DepartmentCode']; ?></td>
<?php } ?>
<td align="center" class="tdf"><?php echo date("H:i",strtotime($ResEmp['InTime'])); ?></td>
<td align="center" class="tdf"><?php echo date("H:i",strtotime($ResEmp['OutTime'])); ?></td>
<td align="center" class="tdf"><?php if($_REQUEST['m']==date("m") OR $_REQUEST['m']==$PreMonth){?><img src="images/go-back-icon.png" onClick="RefFun(<?php echo $ResEmp['EmployeeID'].','.$_REQUEST['m'].','.$_REQUEST['Y'].','.$_REQUEST['d'].','.$page; ?>)"/><?php } ?></td>
<?php for($i=1; $i<=$days; $i++){ $tt=strtotime(date($_REQUEST['Y']."-".$_REQUEST['m']."-".$i)); if($tt<$pp){$tab=$AttTable2; }else{$tab=$AttTable; } $SqlEmp2=mysql_query("SELECT * FROM ".$tab." WHERE EmployeeID=".$EId." AND AttDate='".date($_REQUEST['Y']."-".$_REQUEST['m']."-".$i)."'", $con); 


$rowwE=mysql_num_rows($SqlEmp2); $rE=mysql_fetch_array($SqlEmp2); 
$In=date("H:i",strtotime($rE['II'])); $In_15 = strtotime(date($r2E['II'])) + (15 * 60); $nI15=date('H:i',$In_15); 
$Out=date("H:i",strtotime($rE['OO']));$Out_15 = strtotime(date($r2E['OO'])) - (15 * 60); $nO15=date('H:i',$Out_15);
$Inn=date("H:i",strtotime($rE['Inn'])); $Outt=date("H:i",strtotime($rE['Outt']));

$SEmp2=mysql_query("SELECT * FROM hrm_employee_attendance_req WHERE EmployeeID=".$EId." AND AttDate='".date($_REQUEST['Y']."-".$_REQUEST['m']."-".$i)."'", $con); 
$rowwE2=mysql_num_rows($SEmp2); $rE2=mysql_fetch_array($SEmp2); 

$sL=mysql_query("SELECT Leave_Type,LeaveStatus FROM ".$AppLeaveTable." WHERE EmployeeID=".$EId." AND '".date($_REQUEST['Y']."-".$_REQUEST['m']."-".$i)."'>=Apply_FromDate AND '".date($_REQUEST['Y']."-".$_REQUEST['m']."-".$i)."'<=Apply_ToDate AND LeaveStatus!=3 AND LeaveCancelStatus!='Y'", $con); $rowL=mysql_num_rows($sL); if($rowL>0){$rL=mysql_fetch_assoc($sL); }
?>
 
<td align="center" valign="top" style="width:35px;" class="tdf" id="TDId_<?php echo $i.'_'.$Sno; ?>" bgcolor="<?php 
 if(date("w",strtotime(date($_REQUEST['Y']."-".$_REQUEST['m']."-".$i)))==0){echo '#6B983A';}
 //elseif($rowL>0 AND $rL['LeaveStatus']==2){echo '#2D96FF';} 
 //elseif($rowL>0 AND $rL['LeaveStatus']!=2){echo '#B3D9FF';}
 elseif($ResEmp['TimeApply']=='Y' AND $rE['Late']>0)
 {
   if($rowwE2==0)
   {
    if($rE['Af15']==1)
	{
	 if(($rE['InnLate']==1 AND $rE['InnCnt']=='Y') OR ($rE['OuttLate']==1 AND $rE['OuttCnt']=='Y')){echo '#FF8888';} //R
	 elseif(($rE['InnLate']==1 AND $rE['InnCnt']=='N' AND $rE['OuttLate']==1 AND $rE['OuttCnt']=='N') OR ($rE['InnLate']==1 AND $rE['InnCnt']=='N' AND $rE['OuttLate']==0 AND $rE['OuttCnt']=='Y') OR ($rE['InnLate']==0 AND $rE['InnCnt']=='Y' AND $rE['OuttLate']==1 AND $rE['OuttCnt']=='N')){echo '#37FF37';} //Lg 
	 }
    elseif($rE['Af15']==0) 
	{
	 if($rE['Relax']=='Y'){echo '#FFFFA4';} //Y
	 elseif(($rE['InnLate']==1 AND $rE['InnCnt']=='Y') OR ($rE['OuttLate']==1 AND $rE['OuttCnt']=='Y')){echo '#FFB164';} //O
	 elseif(($rE['InnLate']==1 AND $rE['InnCnt']=='N' AND $rE['OuttLate']==1 AND $rE['OuttCnt']=='N') OR ($rE['InnLate']==1 AND $rE['InnCnt']=='N' AND $rE['OuttLate']==0 AND $rE['OuttCnt']=='Y') OR ($rE['InnLate']==0 AND $rE['InnCnt']=='Y' AND $rE['OuttLate']==1 AND $rE['OuttCnt']=='N')){echo '#37FF37';} //Lg 
	}
   }
   elseif($rowwE2>0)
   {
    if($rE['Af15']==1) //
	{
	
	 if(($rE['InnLate']==1 AND $rE['InnCnt']=='Y') OR ($rE['OuttLate']==1 AND $rE['OuttCnt']=='Y')){echo '#FF8888';} //R
	 elseif(($rE2['Status']==1 AND $rE2['R_Remark']!='' AND $rE2['H_Remark']=='') AND (($rE['InnLate']==1 AND $rE['InnCnt']=='N' AND $rE['OuttLate']==1 AND $rE['OuttCnt']=='N') OR ($rE['InnLate']==1 AND $rE['InnCnt']=='N' AND $rE['OuttLate']==0 AND $rE['OuttCnt']=='Y') OR ($rE['InnLate']==0 AND $rE['InnCnt']=='Y' AND $rE['OuttLate']==1 AND $rE['OuttCnt']=='N'))){echo '#00AE00';} //Dg
	 elseif(($rE2['Status']==1 AND $rE2['R_Remark']=='' AND $rE2['H_Remark']!='') AND (($rE['InnLate']==1 AND $rE['InnCnt']=='N' AND $rE['OuttLate']==1 AND $rE['OuttCnt']=='N') OR ($rE['InnLate']==1 AND $rE['InnCnt']=='N' AND $rE['OuttLate']==0 AND $rE['OuttCnt']=='Y') OR ($rE['InnLate']==0 AND $rE['InnCnt']=='Y' AND $rE['OuttLate']==1 AND $rE['OuttCnt']=='N'))){echo '#37FF37';} //Lg
	 elseif($rE2['Status']==0 AND (($rE['InnLate']==1 AND $rE['InnCnt']=='N' AND $rE['OuttLate']==1 AND $rE['OuttCnt']=='N') OR ($rE['InnLate']==1 AND $rE['InnCnt']=='N' AND $rE['OuttLate']==0 AND $rE['OuttCnt']=='Y') OR ($rE['InnLate']==0 AND $rE['InnCnt']=='Y' AND $rE['OuttLate']==1 AND $rE['OuttCnt']=='N'))){echo '#37FF37';} //Lg 
	 
	}
    elseif($rE['Af15']==0)
	{
	
	 if($rE['Relax']=='Y'){echo '#FFFFA4';} //Y
	 elseif(($rE['InnLate']==1 AND $rE['InnCnt']=='Y') OR ($rE['OuttLate']==1 AND $rE['OuttCnt']=='Y')){echo '#FFB164';} //O
	 elseif(($rE2['Status']==1 AND $rE2['R_Remark']!='' AND $rE2['H_Remark']=='') AND (($rE['InnLate']==1 AND $rE['InnCnt']=='N' AND $rE['OuttLate']==1 AND $rE['OuttCnt']=='N') OR ($rE['InnLate']==1 AND $rE['InnCnt']=='N' AND $rE['OuttLate']==0 AND $rE['OuttCnt']=='Y') OR ($rE['InnLate']==0 AND $rE['InnCnt']=='Y' AND $rE['OuttLate']==1 AND $rE['OuttCnt']=='N'))){echo '#00AE00';} //Dg
	 elseif(($rE2['Status']==1 AND $rE2['R_Remark']=='' AND $rE2['H_Remark']!='') AND (($rE['InnLate']==1 AND $rE['InnCnt']=='N' AND $rE['OuttLate']==1 AND $rE['OuttCnt']=='N') OR ($rE['InnLate']==1 AND $rE['InnCnt']=='N' AND $rE['OuttLate']==0 AND $rE['OuttCnt']=='Y') OR ($rE['InnLate']==0 AND $rE['InnCnt']=='Y' AND $rE['OuttLate']==1 AND $rE['OuttCnt']=='N'))){echo '#37FF37';} //Lg
	 elseif($rE2['Status']==0 AND (($rE['InnLate']==1 AND $rE['InnCnt']=='N' AND $rE['OuttLate']==1 AND $rE['OuttCnt']=='N') OR ($rE['InnLate']==1 AND $rE['InnCnt']=='N' AND $rE['OuttLate']==0 AND $rE['OuttCnt']=='Y') OR ($rE['InnLate']==0 AND $rE['InnCnt']=='Y' AND $rE['OuttLate']==1 AND $rE['OuttCnt']=='N'))){echo '#37FF37';} //Lg 
	 
	}
   }
 
 }
 elseif($rE['Late']>0 AND $rE['AttValue']!='A' AND $rE['AttValue']!='P'){echo '#FF8888';}
 elseif($rE['Late']==0 AND $rE['AttValue']!='' AND $rowL==0){echo '#FFFFFF';}
 elseif($rE['AttValue']!='' AND ($rE['AttValue']=='A' OR $rE['AttValue']=='P' OR $rE['AttValue']=='WFH')){echo '#FFFFFF';}
 elseif($rE['AttValue']!='' AND $rowL==0){echo '#FFFFFF';}
 elseif($rowL>0 AND $rL['LeaveStatus']==2){echo '#2D96FF';} 
 elseif($rowL>0 AND $rL['LeaveStatus']!=2){echo '#B3D9FF';}
 //else{echo '#FFFFFF';}
 ?>">
 <?php if($rowwE>0)
       { 
	     if($rowwE2>0){ echo '<span style="cursor:pointer;color:#80FFFF;" onClick="AttReq('.$EId.','.$_REQUEST['m'].','.$_REQUEST['Y'].','.$i.','.$rE['Late'].')"><u><b>'.$rE['AttValue'].'</b></u></span>'; }
		 elseif($rowL>0){ echo $rL['Leave_Type']; }
         else{ echo '<b>'.$rE['AttValue'].'</b>'; }
		 
		 echo '<font style="font-size:11px;">';
	     if($ResEmp['TimeApply']=='Y')
		 { if($rE['Inn']!='' AND $rE['Inn']!='00:00:00' AND $rE['Inn']!='12:00:00'){echo '<br>'.date("H:i",strtotime($rE['Inn']));}else{echo '<br>'.date("H:i",strtotime($rE['Inn']));} 
		   if($rE['InnLate']==1 AND $rE['Relax']=='N')
		   { 
		    //if($rE['InnCnt']=='Y'){echo '<br>L';}if($rE['InnCnt']=='N'){echo '<br>LA';}
		   } 
		   if($rE['Outt']!='' AND $rE['Outt']!='00:00:00' AND $rE['Inn']!='12:00:00'){echo '<br>'.date("H:i",strtotime($rE['Outt']));}else{echo '<br>'.date("H:i",strtotime($rE['Outt']));} 
		   if($rE['OuttLate']==1 AND $rE['Relax']=='N')
		   {  
		    //if($rE['OuttCnt']=='Y'){echo '<br>L';}if($rE['OuttCnt']=='N'){echo '<br>LA';}
		   } 
		   //if($rE['Relax']=='Y'){echo '<br>Rlx';}  
		 }
		 echo '</font>';
	   } 
 ?>
 </td><font color="#80FFFF"></font>
<?php  /*
elseif($rE['InnLate']==1 AND $rE['InnCnt']=='Y' && $rE['OuttLate']==1 AND $rE['OuttCnt']=='Y'){echo '#FF6C6C';}
elseif(($rE['InnLate']==1 AND $rE['InnCnt']=='Y') OR ($rE['OuttLate']==1 AND $rE['OuttCnt']=='Y')){echo '#FFC4C4';} */
?> 
<?php } ?>
</tr>
 </tbody>
 </div>
<?php } $Sno++; } $sn=$Sno-1; ?><input type="hidden" id="TRSr" value="<?php echo $sn; ?>" />


<?php } //if($ConDQ!='') ?>

</table>
</td>
</tr>
		
 <tr>
 <td align="center" colspan="10" style="font-family:Times New Roman;font-size:15px;font-weight:bold;">
  <?PHP doPages($offset, 'EmpSetTRep.php', '', $total_records); ?></td>
 </tr>		
     
	
  </table>
 </form>     
</td>
<?php //************* Close ******************************************************?>    
  

 </tr>
<?php } ?> 
</table>
		
<?php //***********************************************************************?>
<?php //****************************END*****END*****END******END******END***********************?>
<?php //******************************************************************************?>
		
	  </td>
	</tr>
	
	<?php /*?><tr>
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
	</tr><?php */?>
  </table>
 </td>
</tr>
</table>
</body>
</html>
<?php
function check_integer($which) {
if(isset($_REQUEST[$which])){
if (intval($_REQUEST[$which])>0) {
return intval($_REQUEST[$which]);
} else {
return false;
}
}
return false;
}
function get_current_page() {
if(($var=check_integer('page'))) {
return $var;
} else {
//return 1, if it wasnt set before, page=1
return 1;
}
}
function doPages($page_size, $thepage, $query_string, $total=0) {
$index_limit = 10;
$query='';
if(strlen($query_string)>0){
$query = "&amp;".$query_string;
}
$current = get_current_page();
$total_pages=ceil($total/$page_size);
$start=max($current-intval($index_limit/2), 1);
$end=$start+$index_limit-1;
echo '<div class="paging">';
if($current==1) {
echo '<span class="prn">&lt; Previous</span>&nbsp;';
} else {
$i = $current-1;
echo '<a href="'.$thepage.'?page='.$i.$query.'&ls='.$_REQUEST['ls'].'&wer=123grtd&se=reew&w=ee102&m='.$_REQUEST['m'].'&Y='.$_REQUEST['Y'].'&ee=s1s&d='.$_REQUEST['d'].'&trt=1f&tt=345&dd=truevalu&fals=truefalse" class="prn" rel="nofollow" title="go to page '.$i.'">&lt; Previous</a>&nbsp;';
echo '<span class="prn">...</span>&nbsp;';
}
if($start > 1) {
$i = 1;
echo '<a href="'.$thepage.'?page='.$i.$query.'&ls='.$_REQUEST['ls'].'&wer=123grtd&se=reew&w=ee102&m='.$_REQUEST['m'].'&Y='.$_REQUEST['Y'].'&ee=s1s&d='.$_REQUEST['d'].'&trt=1f&tt=345&dd=truevalu&fals=truefalse" title="go to page '.$i.'">'.$i.'</a>&nbsp;';
}
for ($i = $start; $i <= $end && $i <= $total_pages; $i++){
if($i==$current) {
echo '<span>'.$i.'</span>&nbsp;';
} else {
echo '<a href="'.$thepage.'?page='.$i.$query.'&ls='.$_REQUEST['ls'].'&wer=123grtd&se=reew&w=ee102&m='.$_REQUEST['m'].'&Y='.$_REQUEST['Y'].'&ee=s1s&d='.$_REQUEST['d'].'&trt=1f&tt=345&dd=truevalu&fals=truefalse" title="go to page '.$i.'">'.$i.'</a>&nbsp;';
}
}
if($total_pages > $end){
$i = $total_pages;
echo '<a href="'.$thepage.'?page='.$i.$query.'&ls='.$_REQUEST['ls'].'&wer=123grtd&se=reew&w=ee102&m='.$_REQUEST['m'].'&Y='.$_REQUEST['Y'].'&ee=s1s&d='.$_REQUEST['d'].'&trt=1f&tt=345&dd=truevalu&fals=truefalse" title="go to page '.$i.'">'.$i.'</a>&nbsp;';
}
if($current < $total_pages) {
$i = $current+1;
echo '<span class="prn">...</span>&nbsp;';
echo '<a href="'.$thepage.'?page='.$i.$query.'&ls='.$_REQUEST['ls'].'&wer=123grtd&se=reew&w=ee102&m='.$_REQUEST['m'].'&Y='.$_REQUEST['Y'].'&ee=s1s&d='.$_REQUEST['d'].'&trt=1f&tt=345&dd=truevalu&fals=truefalse" class="prn" rel="nofollow" title="go to page '.$i.'">Next &gt;</a>&nbsp;';
} else {
echo '<span class="prn">Next &gt;</span>&nbsp;';
}
if ($total != 0){
//prints the total result count just below the paging
echo '&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ee4545"<h4>(Total '.$total.' Records)</h></div>';
}
}
?> 