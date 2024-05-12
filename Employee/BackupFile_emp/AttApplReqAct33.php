<?php session_start(); require_once('../AdminUser/config/config.php'); 

if(isset($_POST['ReqSubmit']))
{ 
  $search =  '!"#$%/\':_' ; $search = str_split($search); $Remark=str_replace($search, "", $_POST['myremark']); 
  if($_POST['Inchk']==1 AND $_POST['Outchk']==1)
  { if($_POST['MyActIn']==2){$InCnt='N';}elseif($_POST['MyActIn']==3){$InCnt='Y';}else{$InCnt='Y';}
    if($_POST['MyActOut']==2){$OutCnt='N';}elseif($_POST['MyActOut']==3){$OutCnt='Y';}else{$OutCnt='Y';}
  }
  elseif($_POST['Inchk']==1 AND $_POST['Outchk']==0)
  { if($_POST['MyActIn']==2){$InCnt='N';}elseif($_POST['MyActIn']==3){$InCnt='Y';}else{$InCnt='Y';}
    $OutCnt='Y';
  }
  elseif($_POST['Inchk']==0 AND $_POST['Outchk']==1)
  {
   if($_POST['MyActOut']==2){$OutCnt='N';}elseif($_POST['MyActOut']==3){$OutCnt='Y';}else{$OutCnt='Y';}
   $InCnt='Y';
  }
 
 $Up=mysql_query("update hrm_employee_attendance_req set InStatus=".$_POST['MyActIn'].", OutStatus=".$_POST['MyActOut'].", R_Remark='".$Remark."', Status=1 where EmployeeID=".$_POST['ei']." AND AttDate='".$_POST['RDate']."'",$con);
 
 if($Up) 
 { 
/************ Calculation Open ******/ 
  $dd=intval(date("d",strtotime($_POST['RDate']))); 
  $mm=date("m",strtotime($_POST['RDate'])); $yy=date("Y",strtotime($_POST['RDate']));
  $mkdate = mktime(0,0,0, $mm, 1, $yy);
  $nodinm = date('t',$mkdate);  //Number of days in the given month (28-31)

  if($_POST['InLate']>0){ if($InCnt=='N'){$InL=0;}else{$InL=1;} }else{ $InL=0; } 
  if($_POST['OutLate']>0){ if($OutCnt=='N'){$OutL=0;}else{$OutL=1;} }else{ $OutL=0; }
  $Late=$InL+$OutL; 
  
/*********************************** AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA **/
if($Late==0 OR $Late==1)
{   
    //$In=$_POST['inn']; $Out=$_POST['outt']; $aIn=$_POST['aIn']; $aOut=$_POST['aOut'];
    //$In_15 = strtotime(date($_POST['inn'])) + (15 * 60); $nI15=date('H:i:s',$In_15); 
    //$Out_15 = strtotime(date($_POST['outt'])) - (15 * 60); $nO15=date('H:i:s',$Out_15);
	
	
	$aIn=date("H:i",$_POST['aIn']); $aOut=date("H:i",$_POST['aOut']);
	$In=date("H:i",strtotime($_POST['inn'])); 
	$In_15 = strtotime(date($_POST['inn'])) + (15 * 60); $nI15=date('H:i',$In_15); 
	$Out=date("H:i",strtotime($_POST['outt'])); 
	$Out_15 = strtotime(date($_POST['outt'])) - (15 * 60); $nO15=date('H:i',$Out_15);
	
    //Check Total CL Availed in month 
	$sCL=mysql_query("select SUM(Apply_TotalDay) as aCL from hrm_employee_applyleave where LeaveStatus!=4 AND LeaveStatus!=3 AND LeaveStatus!=2 AND EmployeeID=".$_POST['ei']." AND Apply_FromDate>='".date("Y-m-01",strtotime($_POST['RDate']))."' AND Apply_ToDate<='".date("Y-m-31",strtotime($_POST['RDate']))."' AND (Leave_Type='CL' OR Leave_Type='CH')", $con); 
	$ssCL=mysql_query("select Count(AttValue) as aaCL from hrm_employee_attendance where EmployeeID=".$_POST['ei']." AND AttDate between '".date("Y-m-01",strtotime($_POST['RDate']))."' AND '".date("Y-m-31",strtotime($_POST['RDate']))."' AND AttDate!='".$_POST['RDate']."' AND AttValue='CL'", $con); $rCL=mysql_fetch_array($sCL); $rrCL=mysql_fetch_array($ssCL);
	$ssCH=mysql_query("select Count(AttValue) as aaCH from hrm_employee_attendance where EmployeeID=".$_POST['ei']." AND AttDate between '".date("Y-m-01",strtotime($_POST['RDate']))."' AND '".date("Y-m-31",strtotime($_POST['RDate']))."' AND AttDate!='".$_POST['RDate']."' AND AttValue='CH'", $con); $rrCH=mysql_fetch_array($ssCH); $CountCH=$rrCH['aaCH']/2; $tCL=$rCL['aCL']+$rrCL['aaCL']+$CountCH;
	//Check Total PL Availed in month
	$sPL=mysql_query("select SUM(Apply_TotalDay) as aPL from hrm_employee_applyleave where LeaveStatus!=4 AND LeaveStatus!=3 AND LeaveStatus!=2 AND EmployeeID=".$_POST['ei']." AND Apply_FromDate>='".date("Y-m-01",strtotime($_POST['RDate']))."' AND Apply_ToDate<='".date("Y-m-31",strtotime($_POST['RDate']))."' AND (Leave_Type='PL' OR Leave_Type='PH')", $con); 
	$ssPL=mysql_query("select Count(AttValue) as aaPL from hrm_employee_attendance where EmployeeID=".$_POST['ei']." AND AttDate between '".date("Y-m-01",strtotime($_POST['RDate']))."' AND '".date("Y-m-31",strtotime($_POST['RDate']))."' AND AttDate!='".$_POST['RDate']."' AND AttValue='PL'", $con); $rPL=mysql_fetch_array($sPL); $rrPL=mysql_fetch_array($ssPL);
	$ssPH=mysql_query("select Count(AttValue) as aaPH from hrm_employee_attendance where EmployeeID=".$_POST['ei']." AND AttDate between '".date("Y-m-01",strtotime($_POST['RDate']))."' AND '".date("Y-m-31",strtotime($_POST['RDate']))."' AND AttDate!='".$_POST['RDate']."' AND AttValue='PH'", $con); $rrPH=mysql_fetch_array($ssPH); $CountPH=$rrPH['aaPH']/2; $tPL=$rPL['aPL']+$rrPL['aaPL']+$CountPH;
         //Check Total SL Availed in month 
	  $sSL=mysql_query("select SUM(Apply_TotalDay) as aSL from hrm_employee_applyleave where LeaveStatus!=4 AND LeaveStatus!=3 AND LeaveStatus!=2 AND EmployeeID=".$_POST['ei']." AND Apply_FromDate>='".date("Y-m-01",strtotime($_POST['RDate']))."' AND Apply_ToDate<='".date("Y-m-31",strtotime($_POST['RDate']))."' AND (Leave_Type='SL' OR Leave_Type='SH')", $con); $rSL=mysql_fetch_array($sSL);
	  $ssSL=mysql_query("select Count(AttValue) as aaSL from hrm_employee_attendance where EmployeeID=".$_POST['ei']." AND Apply_FromDate>='".date("Y-m-01",strtotime($_POST['RDate']))."' AND Apply_ToDate<='".date("Y-m-31",strtotime($_POST['RDate']))."' AND AttValue='SL'", $con); $rrSL=mysql_fetch_array($ssSL);
	  $ssSH=mysql_query("select Count(AttValue) as aaSH from hrm_employee_attendance where EmployeeID=".$_POST['ei']." AND Apply_FromDate>='".date("Y-m-01",strtotime($_POST['RDate']))."' AND Apply_ToDate<='".date("Y-m-31",strtotime($_POST['RDate']))."' AND AttValue='SH'", $con); $rrSH=mysql_fetch_array($ssSH);
	  $CountSH=$rrSH['aaSH']/2; $tSL=$rSL['aSL']+$rrSL['aaSL']+$CountSH;
	//Check Balce CL & PL in month
	$op=mysql_query("select OpeningCL,OpeningPL,OpeningSL,CreditedCL,CreditedPL,CreditedSL from hrm_employee_monthlyleave_balance where EmployeeID=".$_POST['ei']." AND Month='".date("m",strtotime($_POST['RDate']))."' AND Year='".date("Y",strtotime($_POST['RDate']))."'", $con); $rowp=mysql_num_rows($op); $rop=mysql_fetch_array($op); 
	//$balCL=$rop['OpeningCL']-$tCL; $balPL=$rop['OpeningPL']-$tPL;
	if($rowp>0){ $balCL=($rop['OpeningCL']+$rop['CreditedCL'])-$tCL; $balPL=($rop['OpeningPL']+$rop['CreditedPL'])-$tPL; $balSL=($rop['OpeningSL']+$rop['CreditedSL'])-$tSL; }
    else { $Pmm=date('m', strtotime("-1 months", strtotime($_POST['RDate']))); 
	       $Pyy=date('Y', strtotime("-1 months", strtotime($_POST['RDate']))); 
	       $op2=mysql_query("select BalanceCL,BalancePL,BalanceSL from hrm_employee_monthlyleave_balance where EmployeeID=".$_POST['ei']." AND Month='".$Pmm."' AND Year='".$Pyy."'", $con); $rop2=mysql_fetch_array($op2);
	       $balCL=$rop2['BalanceCL']-$tCL; $balPL=$rop2['BalancePL']-$tPL; $balSL=$rop2['BalanceSL']-$tSL; }
	
	$schk=mysql_query("select Leave_Type from hrm_employee_applyleave where LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$_POST['ei']." AND Apply_FromDate='".$_POST['RDate']."' AND Apply_ToDate='".$_POST['RDate']."' AND (Leave_Type='SH' OR Leave_Type='CH' OR Leave_Type='PH')", $con); $rowchk=mysql_num_rows($schk); $rchk=mysql_fetch_array($schk);
	
	if($rowchk>0){$Lv=$rchk['Leave_Type'];}
	elseif($balCL>0){$Lv='CH';}
	elseif($balPL>0){$Lv='PH';}
        elseif($balSL>0){$Lv='SH';}else{$Lv='HF';}
	
	$sIn=mysql_query("select SUM(InnLate) as ILate from hrm_employee_attendance where EmployeeID=".$_POST['ei']." AND AttDate>='".date("Y-m-01",strtotime($_POST['RDate']))."' AND AttDate<'".$_POST['RDate']."' AND InnCnt='Y' AND Af15=0",$con);
    $sOut=mysql_query("select SUM(OuttLate) as OLate from hrm_employee_attendance where EmployeeID=".$_POST['ei']." AND AttDate>='".date("Y-m-01",strtotime($_POST['RDate']))."' AND AttDate<'".$_POST['RDate']."' AND OuttCnt='Y' AND Af15=0",$con);    $rIn=mysql_fetch_assoc($sIn); $rOut=mysql_fetch_assoc($sOut); $tLate=$rIn['ILate']+$rOut['OLate']+$Late;
}
/************************************/
	 if($Late==0){ $Att='P'; $Relax='N'; $Allow='N'; $Af15=0;}
     elseif($Late==2){ $Att=$_POST['attv']; $Relax=$_POST['relax']; $Allow=$_POST['allow']; $Af15=$_POST['Af15']; }
     elseif($Late==1 AND $_POST['InLate']==1 AND $_POST['OutLate']==1) //A open
     {
      if($InCnt=='Y' AND $OutCnt=='N') //1 Open
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
	  if($InCnt=='N' AND $OutCnt=='Y') //2 Open
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

 $sUp=mysql_query("UPDATE hrm_employee_attendance SET AttValue='".$Att."', II='".$In.":00', OO='".$Out.":00', InnCnt='".$InCnt."', OuttCnt='".$OutCnt."', Relax='".$Relax."', Allow='".$Allow."', Af15=".$Af15." where AttId=".$_POST['AttId']." AND EmployeeID=".$_POST['ei'], $con);
 
 $NextDate=date("Y-m-d",strtotime('+1 day', strtotime($_POST['RDate'])));
/************************************************/ 	 
 for($i=$NextDate; $i<=date(date("Y",strtotime($_POST['RDate']))."-".date("m",strtotime($_POST['RDate']))."-d"); $i++)
 { 
   $d2d=intval(date("d",strtotime($i)));
   
   $sE=mysql_query("select AttValue,Inn,Outt,InnCnt,OuttCnt,InnLate,OuttLate,Late,Af15 from hrm_employee_attendance where EmployeeID=".$_POST['ei']." AND AttDate='".$i."'", $con); $rowE=mysql_num_rows($sE); $rE=mysql_fetch_assoc($sE);
   if($rowE>0 AND $rE['Late']>0 AND $rE['Af15']==0)
   { 
    if(($rE['InnCnt']=='Y' AND $rE['InnLate']==1) OR ($rE['OuttCnt']=='Y' AND $rE['OuttLate']==1))
    {
     $c5=$rE['Inn']; $c7=$rE['Outt'];
/******************* 111111111111 Open ***************/
     if($rE['InnCnt']=='Y' AND $rE['InnLate']==1){$Innlate=1;}else{$Innlate=0;}
	 if($rE['OuttCnt']=='Y' AND $rE['OuttLate']==1){$Outtlate=1;}else{$Outtlate=0;}
	 $tt=$Innlate+$Outtlate; if($tt==1){$Late=1;}elseif($tt==2){$Late=2;}else{$Late=0;}
 
     //Check between 15 minute late in IN/OUT
     $IIn=mysql_query("select SUM(InnLate) as ILate from hrm_employee_attendance where EmployeeID=".$_POST['ei']." AND AttDate>='".date("Y-m-01",strtotime($_POST['RDate']))."' AND AttDate<'".$i."' AND InnCnt='Y' AND Af15=0",$con); 
     $OOut=mysql_query("select SUM(OuttLate) as OLate from hrm_employee_attendance where EmployeeID=".$_POST['ei']." AND AttDate>='".date("Y-m-01",strtotime($_POST['RDate']))."' AND AttDate<'".$i."' AND OuttCnt='Y' AND Af15=0",$con); $rrIn=mysql_fetch_assoc($IIn); $rrOut=mysql_fetch_assoc($OOut);
     $tLate=$rrIn['ILate']+$rrOut['OLate']+$tt;	   
     
	if($rE['AttValue']!='CL' AND $rE['AttValue']!='PL' AND $rE['AttValue']!='SL' AND $rE['AttValue']!='EL' AND $rE['AttValue']!='OD' AND $rE['AttValue']!='A')
	{
/************/
    //Check Total CL Availed in month 
	$sCL=mysql_query("select SUM(Apply_TotalDay) as aCL from hrm_employee_applyleave where LeaveStatus!=4 AND LeaveStatus!=3 AND LeaveStatus!=2 AND EmployeeID=".$_POST['ei']." AND Apply_FromDate>='".date("Y-m-01",strtotime($_POST['RDate']))."' AND Apply_ToDate<='".date("Y-m-31",strtotime($_POST['RDate']))."' AND (Leave_Type='CL' OR Leave_Type='CH')", $con); 
	$ssCL=mysql_query("select Count(AttValue) as aaCL from hrm_employee_attendance where EmployeeID=".$_POST['ei']." AND AttDate between '".date("Y-m-01",strtotime($_POST['RDate']))."' AND '".date("Y-m-31",strtotime($_POST['RDate']))."' AND AttDate!='".$i."' AND AttValue='CL'", $con); $rCL=mysql_fetch_array($sCL); $rrCL=mysql_fetch_array($ssCL);
	$ssCH=mysql_query("select Count(AttValue) as aaCH from hrm_employee_attendance where EmployeeID=".$_POST['ei']." AND AttDate between '".date("Y-m-01",strtotime($_POST['RDate']))."' AND '".date("Y-m-31",strtotime($_POST['RDate']))."' AND AttDate!='".$i."' AND AttValue='CH'", $con); $rrCH=mysql_fetch_array($ssCH); $CountCH=$rrCH['aaCH']/2; $tCL=$rCL['aCL']+$rrCL['aaCL']+$CountCH;
	//Check Total PL Availed in month
	$sPL=mysql_query("select SUM(Apply_TotalDay) as aPL from hrm_employee_applyleave where LeaveStatus!=4 AND LeaveStatus!=3 AND LeaveStatus!=2 AND EmployeeID=".$_POST['ei']." AND Apply_FromDate>='".date("Y-m-01",strtotime($_POST['RDate']))."' AND Apply_ToDate<='".date("Y-m-31",strtotime($_POST['RDate']))."' AND (Leave_Type='PL' OR Leave_Type='PH')", $con); 
	$ssPL=mysql_query("select Count(AttValue) as aaPL from hrm_employee_attendance where EmployeeID=".$_POST['ei']." AND AttDate between '".date("Y-m-01",strtotime($_POST['RDate']))."' AND '".date("Y-m-31",strtotime($_POST['RDate']))."' AND AttDate!='".$i."' AND AttValue='PL'", $con); $rPL=mysql_fetch_array($sPL); $rrPL=mysql_fetch_array($ssPL);
	$ssPH=mysql_query("select Count(AttValue) as aaPH from hrm_employee_attendance where EmployeeID=".$_POST['ei']." AND AttDate between '".date("Y-m-01",strtotime($_POST['RDate']))."' AND '".date("Y-m-31",strtotime($_POST['RDate']))."' AND AttDate!='".$i."' AND AttValue='PH'", $con); $rrPH=mysql_fetch_array($ssPH); $CountPH=$rrPH['aaPH']/2; $tPL=$rPL['aPL']+$rrPL['aaPL']+$CountPH;
        //Check Total SL Availed in month 
	  $sSL=mysql_query("select SUM(Apply_TotalDay) as aSL from hrm_employee_applyleave where LeaveStatus!=4 AND LeaveStatus!=3 AND LeaveStatus!=2 AND EmployeeID=".$_POST['ei']." AND Apply_FromDate>='".date("Y-m-01",strtotime($_POST['RDate']))."' AND Apply_ToDate<='".date("Y-m-31",strtotime($_POST['RDate']))."' AND (Leave_Type='SL' OR Leave_Type='SH')", $con); $rSL=mysql_fetch_array($sSL);
	  $ssSL=mysql_query("select Count(AttValue) as aaSL from hrm_employee_attendance where EmployeeID=".$_POST['ei']." AND Apply_FromDate>='".date("Y-m-01",strtotime($_POST['RDate']))."' AND Apply_ToDate<='".date("Y-m-31",strtotime($_POST['RDate']))."' AND AttValue='SL'", $con); $rrSL=mysql_fetch_array($ssSL);
	  $ssSH=mysql_query("select Count(AttValue) as aaSH from hrm_employee_attendance where EmployeeID=".$_POST['ei']." AND Apply_FromDate>='".date("Y-m-01",strtotime($_POST['RDate']))."' AND Apply_ToDate<='".date("Y-m-31",strtotime($_POST['RDate']))."' AND AttValue='SH'", $con); $rrSH=mysql_fetch_array($ssSH);
	  $CountSH=$rrSH['aaSH']/2; $tSL=$rSL['aSL']+$rrSL['aaSL']+$CountSH;

	//Check Balce CL & PL in month
	$op=mysql_query("select OpeningCL,OpeningPL,OpeningSL,CreditedCL,CreditedPL,,CreditedSL from hrm_employee_monthlyleave_balance where EmployeeID=".$_POST['ei']." AND Month='".date("m",strtotime($_POST['RDate']))."' AND Year='".date("Y",strtotime($_POST['RDate']))."'", $con); $rowp=mysql_num_rows($op); $rop=mysql_fetch_array($op); 
	//$balCL=$rop['OpeningCL']-$tCL; $balPL=$rop['OpeningPL']-$tPL;
	if($rowp>0){ $balCL=($rop['OpeningCL']+$rop['CreditedCL'])-$tCL; $balPL=($rop['OpeningPL']+$rop['CreditedPL'])-$tPL; $balSL=($rop['OpeningSL']+$rop['CreditedSL'])-$tSL; }
    else { $Pmm=date('m', strtotime("-1 months", strtotime($_POST['RDate']))); 
	       $Pyy=date('Y', strtotime("-1 months", strtotime($_POST['RDate']))); 
	       $op2=mysql_query("select BalanceCL,BalancePL,BalanceSL from hrm_employee_monthlyleave_balance where EmployeeID=".$_POST['ei']." AND Month='".$Pmm."' AND Year='".$Pyy."'", $con); $rop2=mysql_fetch_array($op2);
	       $balCL=$rop2['BalanceCL']-$tCL; $balPL=$rop2['BalancePL']-$tPL; $balSL=$rop2['BalanceSL']-$tSL; }	 	  
	
	$schk=mysql_query("select Leave_Type from hrm_employee_applyleave where LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$_POST['ei']." AND Apply_FromDate='".$i."' AND Apply_ToDate='".$i."' AND (Leave_Type='SH' OR Leave_Type='CH' OR Leave_Type='PH')", $con); $rowchk=mysql_num_rows($schk); $rchk=mysql_fetch_array($schk);
	
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
  
     $UpAtt=mysql_query("update hrm_employee_attendance set AttValue='".$Att."', Relax='".$Relax."', Allow='".$Allow."' WHERE EmployeeID=".$_POST['ei']." AND AttDate='".$i."'", $con);
/******************* 111111111111 Close **************/    
    } //if(($rE['InnCnt']=='Y' AND $rE['InnLate']==1) OR ($rE['OuttCnt']=='Y' AND $rE['OuttLate']==1))
   } //if($rowE>0 AND $rE['Late']>0 AND $rE['Af15']==0)  
 } //for
/********************************************** AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA **/

/************ Calculation Close ******/ 
 
 if($sUp)
 {
  /**************** Mail Mail Open **/
  
  if($_POST['Ename']!='' AND $_POST['Email']!='')  //Employee
  {
   $eto = $_POST['Email'];
   $efrom = 'admin@vnrseeds.co.in';
   $esub = 'For authorisation of Attendance';
   $headers = "From: ".$efrom."\r\n"; 
   $headers .= "MIME-Version: 1.0\r\n";
   $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
   $emsg .= "<html><head></head><body>";
   $emsg .= "Dear <b>".$_POST['Ename'].",</b><br><br>\n\n\n";
   $emsg .= "Your reporting manager has taken action on your attendance authorization request in ESS, Please login into ESS for taking necessary action.<br><br>\n\n";
   $emsg .= "From <br><b>ADMIN ESS</b><br>";
   $emsg .= "</body></html>";	      
   $ok=@mail($eto, $esub, $emsg, $headers);
  }
  
  if($_POST['Hname']!='' AND $_POST['Hmail']!='')  //HOD
  {
   $eto2 = $_POST['Hmail'];
   $efrom2 = 'admin@vnrseeds.co.in';
   $esub2 = 'For authorisation of Attendance';
   $headers2 = "From: ".$efrom2."\r\n"; 
   $headers2 .= "MIME-Version: 1.0\r\n";
   $headers2 .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
   $emsg2 .= "<html><head></head><body>";
   $emsg2 .= "Dear <b>".$_POST['Hname'].",</b><br><br>\n\n\n";
   $emsg2 .= $_POST['Rname']." has taken action on the attendance authorisation request of your team member ".$_POST['Ename']." in ESS, Please login into ESS for more details.<br><br>\n\n";
   $emsg2 .= "From <br><b>ADMIN ESS</b><br>";
   $emsg2 .= "</body></html>";	      
   $ok=@mail($eto2, $esub2, $emsg2, $headers2);
  }
  
  if($_POST['HrEname']!='' AND $_POST['HrEmail']!='')  //HrEmp
  {
   $eto3 = $_POST['HrEmail'];
   $efrom3 = 'admin@vnrseeds.co.in';
   $esub3 = 'Taken Action For Authorisation of Attendance';
   $headers3 = "From: ".$efrom3."\r\n"; 
   $headers3 .= "MIME-Version: 1.0\r\n";
   $headers3 .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
   $emsg3 .= "<html><head></head><body>";
   $emsg3 .= "Dear <b>".$_POST['HrEname'].",</b><br><br>\n\n\n";
   $emsg3 .= $_POST['Rname']." has taken action on the attendance authorisation request of ".$_POST['Ename']." in ESS, for details, kindly login into ESS.<br><br>\n\n";
   $emsg3 .= "From <br><b>ADMIN ESS</b><br>";
   $emsg3 .= "</body></html>";	      
   $ok=@mail($eto3, $esub3, $emsg3, $headers3);
  }
  
  /*HR*/                                              //HR
   $eto4 = 'vspl.hr@vnrseeds.com';
   $efrom4 = 'admin@vnrseeds.co.in';
   $esub4 = 'Taken Action For Authorisation of Attendance';
   $headers4 = "From: ".$efrom4."\r\n"; 
   $headers4 .= "MIME-Version: 1.0\r\n";
   $headers4 .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
   $emsg4 .= "<html><head></head><body>";
   $emsg4 .= "Dear <b>Sir/Mam, </b> <br><br>\n\n\n";
   $emsg4 .= $_POST['Rname']." has taken action on the attendance authorisation request of ".$_POST['Ename']." in ESS, for details, kindly login into ESS.<br><br>\n\n";
   $emsg4 .= "From <br><b>ADMIN ESS</b><br>";
   $emsg4 .= "</body></html>";	      
   $ok=@mail($eto4, $esub4, $emsg4, $headers4);
  /*HR*/  
  
  /**************** Mail Mail close **/
  
  $mm=date("m",strtotime($_POST['RDate'])); $yy=date("Y",strtotime($_POST['RDate']));
  
/**** Leave Update Open ****/
   $SqlCL=mysql_query("select count(AttValue)as CL from hrm_employee_attendance where AttValue='CL' AND EmployeeID=".$_POST['ei']." AND AttDate between '".$yy."-".$mm."-01' AND '".$yy."-".$mm."-31'", $con); $SqlCH=mysql_query("select count(AttValue)as CH from hrm_employee_attendance where AttValue='CH' AND EmployeeID=".$_POST['ei']." AND AttDate between '".$yy."-".$mm."-01' AND '".$yy."-".$mm."-31'", $con); $SqlSL=mysql_query("select count(AttValue)as SL from hrm_employee_attendance where AttValue='SL' AND EmployeeID=".$_POST['ei']." AND AttDate between '".$yy."-".$mm."-01' AND '".$yy."-".$mm."-31'", $con); $SqlSH=mysql_query("select count(AttValue)as SH from hrm_employee_attendance where AttValue='SH' AND EmployeeID=".$_POST['ei']." AND AttDate between '".$yy."-".$mm."-01' AND '".$yy."-".$mm."-31'", $con); $SqlPL=mysql_query("select count(AttValue)as PL from hrm_employee_attendance where AttValue='PL' AND EmployeeID=".$_POST['ei']." AND AttDate between '".$yy."-".$mm."-01' AND '".$yy."-".$mm."-31'", $con); $SqlPH=mysql_query("select count(AttValue)as PH from hrm_employee_attendance where AttValue='PH' AND EmployeeID=".$_POST['ei']." AND AttDate between '".$yy."-".$mm."-01' AND '".$yy."-".$mm."-31'", $con); $SqlEL=mysql_query("select count(AttValue)as EL from hrm_employee_attendance where AttValue='EL' AND EmployeeID=".$_POST['ei']." AND AttDate between '".$yy."-".$mm."-01' AND '".$yy."-".$mm."-31'", $con); $SqlFL=mysql_query("select count(AttValue)as FL from hrm_employee_attendance where AttValue='FL' AND EmployeeID=".$_POST['ei']." AND AttDate between '".$yy."-".$mm."-01' AND '".$yy."-".$mm."-31'", $con); $SqlTL=mysql_query("select count(AttValue)as TL from hrm_employee_attendance where AttValue='TL' AND EmployeeID=".$_POST['ei']." AND AttDate between '".$yy."-".$mm."-01' AND '".$yy."-".$mm."-31'", $con); $SqlHf=mysql_query("select count(AttValue)as Hf from hrm_employee_attendance where AttValue='HF' AND EmployeeID=".$_POST['ei']." AND AttDate between '".$yy."-".$mm."-01' AND '".$yy."-".$mm."-31'", $con); $SqlPresent=mysql_query("select count(AttValue)as Present from hrm_employee_attendance where AttValue='P' AND EmployeeID=".$_POST['ei']." AND AttDate between '".$yy."-".$mm."-01' AND '".$yy."-".$mm."-31'", $con); $SqlAbsent=mysql_query("select count(AttValue)as Absent from hrm_employee_attendance where AttValue='A' AND EmployeeID=".$_POST['ei']." AND AttDate between '".$yy."-".$mm."-01' AND '".$yy."-".$mm."-31'", $con); $SqlOnDuties=mysql_query("select count(AttValue)as OnDuties from hrm_employee_attendance where AttValue='OD' AND EmployeeID=".$_POST['ei']." AND AttDate between '".$yy."-".$mm."-01' AND '".$yy."-".$mm."-31'", $con); $SqlHoliday=mysql_query("select count(AttValue)as Holiday from hrm_employee_attendance where AttValue='HO' AND EmployeeID=".$_POST['ei']." AND AttDate between '".$yy."-".$mm."-01' AND '".$yy."-".$mm."-31'", $con); $SqlELSun=mysql_query("select count(CheckSunday)as SUN from hrm_employee_attendance where CheckSunday='Y' AND EmployeeID=".$_POST['ei']." AND AttDate between '".$yy."-".$mm."-01' AND '".$yy."-".$mm."-31'", $con);  
   
   $ResCL=mysql_fetch_array($SqlCL); $ResCH=mysql_fetch_array($SqlCH); $ResSL=mysql_fetch_array($SqlSL); 
   $ResSH=mysql_fetch_array($SqlSH); $ResPH=mysql_fetch_array($SqlPH); $ResPL=mysql_fetch_array($SqlPL); 
   $ResEL=mysql_fetch_array($SqlEL); $ResFL=mysql_fetch_array($SqlFL); $ResTL=mysql_fetch_array($SqlTL); 
   $ResHf=mysql_fetch_array($SqlHf); $ResPresent=mysql_fetch_array($SqlPresent); 
   $ResAbsent=mysql_fetch_array($SqlAbsent); $ResOnDuties=mysql_fetch_array($SqlOnDuties); 
   $ResHoliday=mysql_fetch_array($SqlHoliday); $ResELSun=mysql_fetch_array($SqlELSun);
   $CountCL=$ResCL['CL']; $CountCH=$ResCH['CH']/2; $TotalCL=$CountCL+$CountCH; 
   $CountSL=$ResSL['SL']; $CountSH=$ResSH['SH']/2; $TotalSL=$CountSL+$CountSH;
   $CountPH=$ResPH['PH']/2; $TotalPL=$ResPL['PL']+$CountPH;   
   $CountHf=$ResHf['Hf']/2;
    
   $TotalLeaveCount=$TotalCL+$TotalSL+$TotalPL+$ResEL['EL']+$ResFL['FL']+$ResTL['TL']; 
   $TotalPR=$ResPresent['Present']+$CountCH+$CountSH+$CountPH+$CountHf;   
   $TotalAbsent=$ResAbsent['Absent']+$CountHf;
   $TotalOnDuties=$ResOnDuties['OnDuties']; $TotalHoliday=$ResHoliday['Holiday']; 
   $TotalDayWithSunEL=$TotalPR+$TotalLeaveCount+$TotalOnDuties+$TotalHoliday;
   $TotalPaidDay=$TotalDayWithSunEL-$ResELSun['SUN'];
   
   $SL=mysql_query("select * from hrm_employee_monthlyleave_balance where EmployeeID=".$_POST['ei']." AND Month='".$mm."' AND Year='".$yy."'", $con);  $RowL=mysql_num_rows($SL);
   if($RowL>0)
   { $RL=mysql_fetch_assoc($SL); 
     if($mm!=1)
	 { $TotBalCL=$RL['OpeningCL']-$TotalCL; $TotBalSL=$RL['OpeningSL']-$TotalSL; 
	   $TotBalPL=$RL['OpeningPL']-$TotalPL; $TotBalEL=$RL['OpeningEL']-$TotalEL; 
	   $TotBalFL=$RL['OpeningOL']-$TotalFL;
	 }  
     elseif($mm==1)
	 { $TotBalCL=$RL['TotCL']-$TotalCL; $TotBalSL=$RL['TotSL']-$TotalSL; $TotBalPL=$RL['TotPL']-$TotalPL;  
	   $TotBalEL=$RL['TotEL']-$TotalEL; $TotBalFL=$RL['TotOL']-$TotalFL;
	 }  
   
   $sUpL=mysql_query("UPDATE hrm_employee_monthlyleave_balance set AvailedCL='".$TotalCL."', AvailedSL='".$TotalSL."', AvailedPL='".$TotalPL."', AvailedOL='".$TotalFL."', AvailedTL='".$TotalTL."', BalanceCL='".$TotBalCL."', BalanceSL='".$TotBalSL."', BalancePL='".$TotBalPL."', BalanceOL='".$TotBalFL."' where EmployeeID=".$_POST['ei']." AND Month='".$mm."' AND Year='".$yy."'", $con);
   }
/**** Leave update Close ****/

  echo '<script>alert("Data submitted successfully.."); window.close(); </script>'; 
 }  
    
 } // If($up) Close
 
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Attendance Request Form</title>
<style>
.font{ font-style:normal;text-align:center;font-family:Times New Roman;font-size:18px;font-weight:bold;}
.font2{ font-style:oblique;font-family:Times New Roman;font-size:16px;}
</style>
<script type="text/javascript" language="javascript">
function validate(reqform) 
{
 if(document.getElementById("InIn").value==1)
 {
  if(document.getElementById("MyActIn").value==0){alert("Please select my action for In-Time request"); return false;}
 }
 
 if(document.getElementById("OutOut").value==1)
 {
  if(document.getElementById("MyActOut").value==0){alert("Please select my action for Out-Time request"); return false;}
 }
 if(document.getElementById("myremark").value==''){alert("Please type remark"); return false;} 
 var agree=confirm("Are you sure?"); 
 if(agree)
 {
  getId("ReqSubmit").style.display="none";
  getId("wait_tip").style.display="";
  return true;
 }
 else{return false;}
}

function getId(id){return document.getElementById(id);}

</script>
</head>
<body>
<center>
<?php 
$sE=mysql_query("SELECT * FROM hrm_employee_attendance_req WHERE AttRqId=".$_REQUEST['id'], $con); 
$rowE=mysql_num_rows($sE); $rE=mysql_fetch_array($sE); 

$sql=mysql_query("select Fname,Sname,Lname,RepEmployeeID,EmailId_Vnr,Gender,Married,DR,TimeApply,InTime,OutTime from hrm_employee e inner join hrm_employee_general g on e.EmployeeID=g.EmployeeID inner join hrm_employee_personal p on g.EmployeeID=p.EmployeeID where e.EmployeeID=".$rE['EmployeeID'], $con); $res=mysql_fetch_assoc($sql); if($res['DR']=='Y'){$me='Dr.';} elseif($res['Gender']=='M'){$me='Mr.';} elseif($res['Gender']=='F' AND $res['Married']=='Y'){$me='Mrs.';} elseif($res['Gender']=='F' AND $res['Married']=='N'){$me='Miss.';}

$sqlR=mysql_query("select Fname,Sname,Lname,RepEmployeeID,EmailId_Vnr,Gender,Married,DR from hrm_employee e inner join hrm_employee_general g on e.EmployeeID=g.EmployeeID inner join hrm_employee_personal p on g.EmployeeID=p.EmployeeID where e.EmployeeID=".$rE['RId'], $con); $resR=mysql_fetch_assoc($sqlR); if($resR['DR']=='Y'){$mr='Dr.';} elseif($resR['Gender']=='M'){$mr='Mr.';} elseif($resR['Gender']=='F' AND $resR['Married']=='Y'){$mr='Mrs.';} elseif($resR['Gender']=='F' AND $resR['Married']=='N'){$mr='Miss.';}

$sqlH=mysql_query("select Fname,Sname,Lname,RepEmployeeID,EmailId_Vnr,Gender,Married,DR from hrm_employee e inner join hrm_employee_general g on e.EmployeeID=g.EmployeeID inner join hrm_employee_personal p on g.EmployeeID=p.EmployeeID where e.EmployeeID=".$rE['HId'], $con); $resH=mysql_fetch_assoc($sqlH); if($resH['DR']=='Y'){$mh='Dr.';} elseif($resH['Gender']=='M'){$mh='Mr.';} elseif($resH['Gender']=='F' AND $resH['Married']=='Y'){$mh='Mrs.';} elseif($resH['Gender']=='F' AND $resH['Married']=='N'){$mh='Miss.';}
?>

<form name="reqform" method="post" onsubmit="return validate(this)">
<input type="hidden" name="Ename" value="<?php echo $me.' '.$res['Fname'].' '.$res['Sname'].' '.$res['Lname']; ?>" />
<input type="hidden" name="Email" value="<?php echo $res['EmailId_Vnr']; ?>" />
<input type="hidden" name="Rname" value="<?php echo $mr.' '.$resR['Fname'].' '.$resR['Sname'].' '.$resR['Lname']; ?>" />
<input type="hidden" name="Rmail" value="<?php echo $resR['EmailId_Vnr']; ?>" />
<input type="hidden" name="Hname" value="<?php echo $mh.' '.$resH['Fname'].' '.$resH['Sname'].' '.$resH['Lname']; ?>" />
<input type="hidden" name="Hmail" value="<?php echo $resH['EmailId_Vnr']; ?>" />

<input type="hidden" name="ei" Id="ei" value="<?php echo $rE['EmployeeID']; ?>" />
<input type="hidden" name="RId" value="<?php echo $rE['RId']; ?>" />
<input type="hidden" name="HId" value="<?php echo $rE['HId']; ?>" />
<input type="hidden" name="RDate" Id="RDate" value="<?php echo date("Y-m-d", strtotime($rE['AttDate'])); ?>" />
<?php $saE=mysql_query("SELECT * FROM hrm_employee_attendance WHERE EmployeeID=".$rE['EmployeeID']." AND AttDate='".$rE['AttDate']."' ", $con); $rowaE=mysql_num_rows($saE); $raE=mysql_fetch_assoc($saE); ?>
<input type="hidden" name="InLate" Id="InLate" value="<?php echo $raE['InnLate']; ?>" />
<input type="hidden" name="OutLate" Id="OutLate" value="<?php echo $raE['OuttLate']; ?>" />
<input type="hidden" name="Af15" Id="Af15" value="<?php echo $raE['Af15']; ?>" />
<input type="hidden" name="AttId" Id="AttId" value="<?php echo $raE['AttId']; ?>" />
<input type="hidden" name="InnCnt" Id="InnCnt" value="<?php echo $raE['InnCnt']; ?>" />
<input type="hidden" name="OuttCnt" Id="OuttCnt" value="<?php echo $raE['OuttCnt']; ?>" />
<?php $dd=intval(date("d", strtotime($rE['AttDate']))); $s2E=mysql_query("select S".$dd.", I".$dd.", O".$dd." from hrm_employee_attendance_settime where EmployeeID=".$rE['EmployeeID'],$con); $r2E=mysql_fetch_assoc($s2E); ?>
<input type="hidden" name="inn" Id="inn" value="<?php echo $r2E['I'.$dd]; ?>" />
<input type="hidden" name="outt" Id="outt" value="<?php echo $r2E['O'.$dd]; ?>" />

<input type="hidden" name="aIn" Id="aIn" value="<?php echo $raE['Inn']; ?>" />
<input type="hidden" name="aOut" Id="aOut" value="<?php echo $raE['Outt']; ?>" />
<input type="hidden" name="tapply" Id="tapply" value="<?php echo $res['TimeApply']; ?>" />
<input type="hidden" name="attv" Id="attv" value="<?php echo $raE['AttValue']; ?>" />
<input type="hidden" name="relax" Id="relax" value="<?php echo $raE['Relax']; ?>" />
<input type="hidden" name="allow" Id="allow" value="<?php echo $raE['Allow']; ?>" />

<input type="hidden" Id="InIn" value="<?php if($rowE>0 AND $rE['InReason']!='' AND $rE['InRemark']!=''){ echo 1;}else{echo 0;} ?>" /><input type="hidden" Id="OutOut" value="<?php if($rowE>0 AND $rE['OutReason']!='' AND $rE['OutRemark']!=''){ echo 1;}else{echo 0;} ?>" />



<table style="margin-top:10px;width:100%;">
<tr><td colspan="3" class="font">Attendance Authorisation Request Details</td></tr>
<div style="position:absolute;top:120px;left:150px;">
<span id="wait_tip" style="display:none;"><img src="images/loading.gif" id="loading_img"/> Please wait...</span>
</div>
<tr><td>&nbsp;</td></tr>
<tr>
<td class="font2" style="width:25%;">Request Date</td>
<td class="font2" style="width:2%;">:</td>
<td class="font2" style="width:73%;"><?php echo date("d-m-Y", strtotime($raE['AttDate'])); ?></td>
</tr>
<tr>
<td class="font2">Time</td><td class="font2">:</td>
<td class="font2"><b><?php if($rowE>0 AND $rE['InReason']!='' AND $rE['InRemark']!=''){ ?><font color="#004080">In:</font>&nbsp;<font style="color:<?php if($raE['InnLate']==1){echo '#FF0000';}?>;"><?php if($raE['Inn']=='00:00:00' OR $raE['Inn']==''){echo '00:00';}else{echo date("h:i",strtotime($raE['Inn']));} ?>&nbsp;<?php if($raE['InnLate']==1){echo '- Late';}?></font><?php } ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php if($rowE>0 AND $rE['OutReason']!='' AND $rE['OutRemark']!=''){ ?> <font color="#004080">Out:</font>&nbsp;<font style="color:<?php if($raE['OuttLate']==1){echo '#FF0000';}?>;"><?php if($raE['Outt']=='00:00:00' OR $raE['Outt']==''){echo '00:00';}else{echo date("h:i",strtotime($raE['Outt']));} ?>&nbsp;<?php if($raE['OuttLate']==1){echo '- Early Going';}?></font><?php } ?></b></td>
</tr>
<tr><td style="height:10px;"></td></tr>
<?php if($rowE>0 AND $rE['InReason']!='' AND $rE['InRemark']!=''){ echo '<input type="hidden" name="Inchk" value="1" />';?>
<tr>
<td class="font2" colspan="2"></td>
<td class="font2" style="color:#000099;"><u><b>Request for In-Time Attendance</b></u></td>
</tr>
<tr>
<td class="font2">Reason</td>
<td class="font2">:</td>
<td class="font2"><?php if($rowE>0 AND $rE['InReason']!=''){ echo $rE['InReason']; } ?></td>
</tr>
<tr>
<td class="font2" valign="top">Remark</td>
<td class="font2" valign="top">:</td>
<td class="font2"><?php echo $rE['InRemark']; ?></td>
</tr>
<tr>
<td class="font2" valign="top" bgcolor="#8CC6FF"><b>My Action</b></td>
<td class="font2" valign="top">:</td>
<td class="font2"><select id="MyActIn" name="MyActIn" class="font2" style="border:hidden;width:100px;background-color:#8FFF20;" ><?php if($rE['InStatus']==0){$StI='Select';}elseif($rE['InStatus']==1){$StI='Pending';}elseif($rE['InStatus']==2){$StI='Approved';}elseif($rE['InStatus']==3){$StI='Rejected';}?>?><option value="<?php echo $rE['InStatus']; ?>" selected><?php echo $StI; ?></option>
<?php /* if($rE['InStatus']!=1){?><option value="1">Pending</option><?php } */ ?>
<?php if($rE['InStatus']!=2){?><option value="2">Approve</option><?php } ?>
<?php if($rE['InStatus']!=3){?><option value="3">Reject</option><?php } ?>
</select></td>
</tr>
<?php } else { echo '<input type="hidden" name="Inchk" value="0" />'; echo '<input type="hidden" id="MyActIn" name="MyActIn" value="'.$rE['InStatus'].'"/>'; } ?>


<?php if($rowE>0 AND $rE['OutReason']!='' AND $rE['OutRemark']!=''){ echo '<input type="hidden" name="Outchk" value="1" />'; ?>
<tr>
<td class="font2" colspan="2"></td>
<td class="font2" style="color:#000099;"><u><b>Request for Out-Time Attendance</b></u></td>
</tr>
<tr>
<td class="font2">Reason</td>
<td class="font2">:</td>
<td class="font2"><?php if($rowE>0 AND $rE['OutReason']!=''){ echo $rE['OutReason']; } ?></td>
</tr>
<tr>
<td class="font2" valign="top">Remark</td>
<td class="font2" valign="top">:</td>
<td class="font2"><?php echo $rE['OutRemark']; ?></td>
</tr>
<tr>
<td class="font2" valign="top" bgcolor="#8CC6FF"><b>My Action</b></td>
<td class="font2" valign="top">:</td>
<td class="font2"><select id="MyActOut" name="MyActOut" class="font2" style="border:hidden;width:100px;background-color:#8FFF20;" ><?php if($rE['OutStatus']==0){$StO='Select';}elseif($rE['OutStatus']==1){$StO='Pending';}elseif($rE['OutStatus']==2){$StO='Approved';}elseif($rE['OutStatus']==3){$StO='Rejected';}?><option value="<?php echo $rE['OutStatus']; ?>" selected><?php echo $StO; ?></option>
<?php /* if($rE['OutStatus']!=1){?><option value="1">Pending</option><?php } */ ?>
<?php if($rE['OutStatus']!=2){?><option value="2">Approve</option><?php } ?>
<?php if($rE['OutStatus']!=3){?><option value="3">Reject</option><?php } ?>
</select></td>
</tr>
<?php } else { echo '<input type="hidden" name="Outchk" value="0" />'; echo '<input type="hidden" id="MyActOut" name="MyActOut" value="'.$rE['InStatus'].'"/>'; }

if($rowE>0){ ?>
<tr><td>&nbsp;</td></tr>
<tr>
<td class="font2" valign="top"><table style="width:100%;" bgcolor="#8CC6FF"><tr><td><b>My Remark</b></td></tr></table></td>
<td class="font2" valign="top">:</td>
<td class="font2"><textarea class="font2" id="myremark" name="myremark" cols="50" rows="2"><?php echo $rE['R_Remark']; ?></textarea></td>
</tr>
<?php if($rE['Status']==0 AND date("m")==date("m",strtotime($rE['AttDate']))){ ?>
<tr>
<td colspan="2" class="font2" valign="top"></td>
<td class="font2"><input class="font2" type="button" value="Refresh" onClick="javascript:window.location='AttApplReqAct.php?id=<?php echo $_REQUEST['id']; ?>'"/><input class="font2" type="submit" name="ReqSubmit" id="ReqSubmit" value="ReqSubmit"/></td>
</tr>
<?php } if($rE['Status']>0){ ?>
<tr>
<td colspan="2" class="font2" valign="top"></td>
<td class="font2">Status: <b style="color:#008000;">Submitted...</b></td>
</tr>
<?php } ?>
<?php } ?>
<tr>
<td colspan="2" class="font2" valign="top"></td>
<td class="font2" style="color:#509F00;font-size:18px;"><b><?php echo $msg; ?></b></td>
</tr>
</table>
</form>
</center>
</body>
</html>
