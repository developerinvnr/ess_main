<?php session_start(); require_once('../AdminUser/config/config.php');
if(isset($_POST['reqSubmit']))
{
 $search =  '!"#$%/\':_' ; $search = str_split($search);
 if($_POST['Atct']==1)
 { $RemarkI=str_replace($search, "", $_POST['remarkI']); $RemarkO=''; $Remark=''; $InR='Y'; $OutR='N'; 
   $AllRemark=$RemarkI; }
 
 elseif($_POST['Atct']==2)
 { $RemarkO=str_replace($search, "", $_POST['remarkO']); $RemarkI=''; $Remark=''; $InR='N'; $OutR='Y'; 
   $AllRemark=$RemarkO;}
 
 elseif($_POST['Atct']==12)
 { $RemarkI=str_replace($search, "", $_POST['remarkI']); $RemarkO=str_replace($search, "", $_POST['remarkO']); $Remark='';
   $InR='Y'; $OutR='Y'; $AllRemark=$RemarkI.' & '.$RemarkO; }
 
 elseif($_POST['Atct']==3)
 { $Remark=str_replace($search, "", $_POST['remark']); $RemarkI=''; $RemarkO=''; $InR='N'; $OutR='N'; 
   $AllRemark=$Remark; }
  
 if($_POST['RId']!=''){$RId=$_POST['RId'];}else{$RId=0;}
 if($_POST['HId']!=''){$HId=$_POST['HId'];}else{$HId=0;}
 if($_POST['HtId']!=''){$HtId=$_POST['HtId'];}else{$HtId=0;}
 
 $Ins=mysql_query("insert into hrm_employee_attendance_req(EmployeeID, AttDate, InReason, InRemark, OutReason, OutRemark, Reason, Remark, RId, HId, HtId, InR, OutR, ReqDate) values(".$_POST['EId'].", '".$_POST['AttDate']."', '".$_POST['reasonI']."', '".$RemarkI."', '".$_POST['reasonO']."', '".$RemarkO."', '".$_POST['reason']."', '".$Remark."', ".$RId.", ".$HId.", ".$HtId.", '".$InR."', '".$OutR."', '".date("Y-m-d")."')",$con);
 if($Ins)
 { 
 
/******************* Checking Checking Open **********/
/******************* Checking Checking Open **********/
if(($_POST['Atct']==1 AND ($_POST['reasonI']=='OD' OR $_POST['reasonI']=='Tour' OR $_POST['reasonI']=='Meeting')) OR ($_POST['Atct']==2 AND ($_POST['reasonO']=='OD' OR $_POST['reasonO']=='Tour' OR $_POST['reasonO']=='Meeting')) OR ($_POST['Atct']==12 AND ($_POST['reasonI']=='OD' OR $_POST['reasonI']=='Tour' OR $_POST['reasonI']=='Meeting') AND ($_POST['reasonO']=='OD' OR $_POST['reasonO']=='Tour' OR $_POST['reasonO']=='Meeting')) OR ($_POST['Atct']==3 AND ($_POST['reason']=='OD' OR $_POST['reason']=='Tour' OR $_POST['reason']=='Meeting')))
{

 if($_POST['Atct']==1 AND ($_POST['reasonI']=='OD' OR $_POST['reasonI']=='Tour' OR $_POST['reasonI']=='Meeting'))
 { $Up=mysql_query("update hrm_employee_attendance_req set InStatus=2, Status=1 where EmployeeID=".$_POST['EId']." AND AttDate='".$_POST['AttDate']."'",$con); if($Up){ if($_POST['CountAtt']==1){ $sUp=mysql_query("UPDATE hrm_employee_attendance SET AttValue='OD', InnCnt='N', OuttCnt='N' where AttDate='".$_POST['AttDate']."' AND EmployeeID=".$_POST['EId'], $con);}else{$sUp=mysql_query("insert into hrm_employee_attendance(EmployeeID, AttValue, AttDate) values(".$_POST['EId'].", 'OD', '".$_POST['AttDate']."')",$con);} } }

 elseif($_POST['Atct']==2 AND ($_POST['reasonO']=='OD' OR $_POST['reasonO']=='Tour' OR $_POST['reasonO']=='Meeting'))
 { $Up=mysql_query("update hrm_employee_attendance_req set OutStatus=2, Status=1 where EmployeeID=".$_POST['EId']." AND AttDate='".$_POST['AttDate']."'",$con); if($Up){ if($_POST['CountAtt']==1){ $sUp=mysql_query("UPDATE hrm_employee_attendance SET AttValue='OD', InnCnt='N', OuttCnt='N' where AttDate='".$_POST['AttDate']."' AND EmployeeID=".$_POST['EId'], $con);}else{$sUp=mysql_query("insert into hrm_employee_attendance(EmployeeID, AttValue, AttDate) values(".$_POST['EId'].", 'OD', '".$_POST['AttDate']."')",$con);} } }

 elseif($_POST['Atct']==12)
 {
  if($_POST['reasonI']=='OD' OR $_POST['reasonI']=='Tour' OR $_POST['reasonI']=='Meeting'){$InS=2;}else{$InS=0;}
  if($_POST['reasonO']=='OD' OR $_POST['reasonO']=='Tour' OR $_POST['reasonO']=='Meeting'){$OtS=2;}else{$OtS=0;}
  $Up=mysql_query("update hrm_employee_attendance_req set InStatus=".$InS.", OutStatus=".$OtS.", Status=1 where EmployeeID=".$_POST['EId']." AND AttDate='".$_POST['AttDate']."'",$con);
  if($Up AND $InS==2 AND $OtS==2){ if($_POST['CountAtt']==1){ $sUp=mysql_query("UPDATE hrm_employee_attendance SET AttValue='OD', InnCnt='N', OuttCnt='N' where AttDate='".$_POST['AttDate']."' AND EmployeeID=".$_POST['EId'], $con);}else{$sUp=mysql_query("insert into hrm_employee_attendance(EmployeeID, AttValue, AttDate) values(".$_POST['EId'].", 'OD', '".$_POST['AttDate']."')",$con);} } }

 elseif($_POST['Atct']==3 AND ($_POST['reason']=='OD' OR $_POST['reason']=='Tour' OR $_POST['reason']=='Meeting'))
 { $Up=mysql_query("update hrm_employee_attendance_req set SStatus=2, Status=1 where EmployeeID=".$_POST['EId']." AND AttDate='".$_POST['AttDate']."'",$con); if($Up){ if($_POST['CountAtt']==1){ $sUp=mysql_query("UPDATE hrm_employee_attendance SET AttValue='OD', InnCnt='N', OuttCnt='N' where AttDate='".$_POST['AttDate']."' AND EmployeeID=".$_POST['EId'], $con);}else{$sUp=mysql_query("insert into hrm_employee_attendance(EmployeeID, AttValue, AttDate) values(".$_POST['EId'].", 'OD', '".$_POST['AttDate']."')",$con);} } }

 
/*********** AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA ************************************/
  $dd=intval(date("d",strtotime($_POST['AttDate']))); 
  $mm=date("m",strtotime($_POST['AttDate'])); $yy=date("Y",strtotime($_POST['AttDate']));
  $mkdate = mktime(0,0,0, $mm, 1, $yy);
  $nodinm = date('t',$mkdate);  //Number of days in the given month (28-31)

 $NextDate=date("Y-m-d",strtotime('+1 day', strtotime($_POST['AttDate'])));
/************************************************/ 	 
 for($i=$NextDate; $i<=date(date("Y",strtotime($_POST['AttDate']))."-".date("m",strtotime($_POST['AttDate']))."-d"); $i++)
 { 
   $d2d=intval(date("d",strtotime($i)));
   $sE=mysql_query("select AttValue,Inn,Outt,InnCnt,OuttCnt,InnLate,OuttLate,Late,Af15 from hrm_employee_attendance where EmployeeID=".$_POST['EId']." AND AttDate='".$_POST['AttDate']."'", $con); $rowE=mysql_num_rows($sE); $rE=mysql_fetch_assoc($sE);
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
     $IIn=mysql_query("select SUM(InnLate) as ILate from hrm_employee_attendance where EmployeeID=".$_POST['EId']." AND AttDate>='".date("Y-m-01",strtotime($_POST['AttDate']))."' AND AttDate<'".$i."' AND InnCnt='Y' AND Af15=0",$con); 
     $OOut=mysql_query("select SUM(OuttLate) as OLate from hrm_employee_attendance where EmployeeID=".$_POST['EId']." AND AttDate>='".date("Y-m-01",strtotime($_POST['AttDate']))."' AND AttDate<'".$i."' AND OuttCnt='Y' AND Af15=0",$con); $rrIn=mysql_fetch_assoc($IIn); $rrOut=mysql_fetch_assoc($OOut);
     $tLate=$rrIn['ILate']+$rrOut['OLate']+$tt;	   
     
	 if($rE['AttValue']!='CL' AND $rE['AttValue']!='PL' AND $rE['AttValue']!='SL' AND $rE['AttValue']!='EL' AND $rE['AttValue']!='OD' AND $rE['AttValue']!='A')
	{
/************/
    //Check Total CL Availed in month 
	$sCL=mysql_query("select SUM(Apply_TotalDay) as aCL from hrm_employee_applyleave where LeaveStatus!=4 AND LeaveStatus!=3 AND LeaveStatus!=2 AND EmployeeID=".$_POST['EId']." AND Apply_FromDate>='".date("Y-m-01",strtotime($_POST['AttDate']))."' AND Apply_ToDate<='".date("Y-m-31",strtotime($_POST['AttDate']))."' AND (Leave_Type='CL' OR Leave_Type='CH')", $con); 
	$ssCL=mysql_query("select Count(AttValue) as aaCL from hrm_employee_attendance where EmployeeID=".$_POST['EId']." AND AttDate between '".date("Y-m-01",strtotime($_POST['AttDate']))."' AND '".date("Y-m-31",strtotime($_POST['AttDate']))."' AND AttDate!='".$i."' AND AttValue='CL'", $con); $rCL=mysql_fetch_array($sCL); $rrCL=mysql_fetch_array($ssCL);
	$ssCH=mysql_query("select Count(AttValue) as aaCH from hrm_employee_attendance where EmployeeID=".$_POST['EId']." AND AttDate between '".date("Y-m-01",strtotime($_POST['AttDate']))."' AND '".date("Y-m-31",strtotime($_POST['AttDate']))."' AND AttDate!='".$i."' AND AttValue='CH'", $con); $rrCH=mysql_fetch_array($ssCH); $CountCH=$rrCH['aaCH']/2; $tCL=$rCL['aCL']+$rrCL['aaCL']+$CountCH;
	//Check Total PL Availed in month
	$sPL=mysql_query("select SUM(Apply_TotalDay) as aPL from hrm_employee_applyleave where LeaveStatus!=4 AND LeaveStatus!=3 AND LeaveStatus!=2 AND EmployeeID=".$_POST['EId']." AND Apply_FromDate>='".date("Y-m-01",strtotime($_POST['AttDate']))."' AND Apply_ToDate<='".date("Y-m-31",strtotime($_POST['AttDate']))."' AND (Leave_Type='PL' OR Leave_Type='PH')", $con); 
	$ssPL=mysql_query("select Count(AttValue) as aaPL from hrm_employee_attendance where EmployeeID=".$_POST['EId']." AND AttDate between '".date("Y-m-01",strtotime($_POST['AttDate']))."' AND '".date("Y-m-31",strtotime($_POST['AttDate']))."' AND AttDate!='".$i."' AND AttValue='PL'", $con); $rPL=mysql_fetch_array($sPL); $rrPL=mysql_fetch_array($ssPL);
	$ssPH=mysql_query("select Count(AttValue) as aaPH from hrm_employee_attendance where EmployeeID=".$_POST['EId']." AND AttDate between '".date("Y-m-01",strtotime($_POST['AttDate']))."' AND '".date("Y-m-31",strtotime($_POST['AttDate']))."' AND AttDate!='".$i."' AND AttValue='PH'", $con); $rrPH=mysql_fetch_array($ssPH); $CountPH=$rrPH['aaPH']/2; $tPL=$rPL['aPL']+$rrPL['aaPL']+$CountPH;
        //Check Total SL Availed in month 
	  $sSL=mysql_query("select SUM(Apply_TotalDay) as aSL from hrm_employee_applyleave where LeaveStatus!=4 AND LeaveStatus!=3 AND LeaveStatus!=2 AND EmployeeID=".$_POST['EId']." AND Apply_FromDate>='".date("Y-m-01",strtotime($_POST['AttDate']))."' AND Apply_ToDate<='".date("Y-m-31",strtotime($_POST['AttDate']))."' AND (Leave_Type='SL' OR Leave_Type='SH')", $con); $rSL=mysql_fetch_array($sSL);
	  $ssSL=mysql_query("select Count(AttValue) as aaSL from hrm_employee_attendance where EmployeeID=".$_POST['EId']." AND AttDate>='".date("Y-m-01",strtotime($_POST['AttDate']))."' AND AttDate<='".date("Y-m-31",strtotime($_POST['AttDate']))."' AND AttValue='SL'", $con); $rrSL=mysql_fetch_array($ssSL);
	  $ssSH=mysql_query("select Count(AttValue) as aaSH from hrm_employee_attendance where EmployeeID=".$_POST['EId']." AND AttDate>='".date("Y-m-01",strtotime($_POST['AttDate']))."' AND AttDate<='".date("Y-m-31",strtotime($_POST['AttDate']))."' AND AttValue='SH'", $con); $rrSH=mysql_fetch_array($ssSH);
	  $CountSH=$rrSH['aaSH']/2; $tSL=$rSL['aSL']+$rrSL['aaSL']+$CountSH;

	//Check Balce CL & PL in month
	$op=mysql_query("select OpeningCL,OpeningPL,OpeningSL,CreditedCL,CreditedPL,,CreditedSL from hrm_employee_monthlyleave_balance where EmployeeID=".$_POST['EId']." AND Month='".date("m",strtotime($_POST['AttDate']))."' AND Year='".date("Y",strtotime($_POST['AttDate']))."'", $con); $rowp=mysql_num_rows($op); $rop=mysql_fetch_array($op); 
	//$balCL=$rop['OpeningCL']-$tCL; $balPL=$rop['OpeningPL']-$tPL;
	if($rowp>0){ $balCL=($rop['OpeningCL']+$rop['CreditedCL'])-$tCL; $balPL=($rop['OpeningPL']+$rop['CreditedPL'])-$tPL; $balSL=($rop['OpeningSL']+$rop['CreditedSL'])-$tSL; }
    else { $Pmm=date('m', strtotime("-1 months", strtotime($_POST['AttDate']))); 
	       $Pyy=date('Y', strtotime("-1 months", strtotime($_POST['AttDate']))); 
	       $op2=mysql_query("select BalanceCL,BalancePL,BalanceSL from hrm_employee_monthlyleave_balance where EmployeeID=".$_POST['EId']." AND Month='".$Pmm."' AND Year='".$Pyy."'", $con); $rop2=mysql_fetch_array($op2);
	       $balCL=$rop2['BalanceCL']-$tCL; $balPL=$rop2['BalancePL']-$tPL; $balSL=$rop2['BalanceSL']-$tSL; }	 	  
	
	$schk=mysql_query("select Leave_Type from hrm_employee_applyleave where LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$_POST['EId']." AND Apply_FromDate='".$i."' AND Apply_ToDate='".$i."' AND (Leave_Type='SH' OR Leave_Type='CH' OR Leave_Type='PH')", $con); $rowchk=mysql_num_rows($schk); $rchk=mysql_fetch_array($schk);
	
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
  
     $UpAtt=mysql_query("update hrm_employee_attendance set AttValue='".$Att."', Relax='".$Relax."', Allow='".$Allow."' WHERE EmployeeID=".$_POST['ei']." AND AttDate='".$i."'", $con);
/******************* 111111111111 Close **************/    
    } 
   } 
 } //for
/*********** AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA ************************************/
	 
}   


elseif($_POST['Atct']==3 AND $_POST['reason']=='Other')
{
 if($_POST['CountAtt']==1){ $sUp=mysql_query("UPDATE hrm_employee_attendance SET InnCnt='N', OuttCnt='N' where AttDate='".$_POST['AttDate']."' AND EmployeeID=".$_POST['EId'], $con);}else{$sUp=mysql_query("insert into hrm_employee_attendance(EmployeeID, AttDate) values(".$_POST['EId'].", '".$_POST['AttDate']."')",$con); }
}


/******************* Checking Checking Close **********/ 
/******************* Checking Checking Close **********/ 
 
  if($_POST['Rname']!='' AND $_POST['Rmail']!='')  //Reporting
  {
   $eto = $_POST['Rmail'];
   $efrom = 'admin@vnrseeds.co.in';
   $esub = 'For authorisation of Attendance';
   $headers = "From: ".$efrom."\r\n"; 
   $headers .= "MIME-Version: 1.0\r\n";
   $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
   $emsg .= "<html><head></head><body>";
   $emsg .= "Dear <b>".$_POST['Rname'].",</b><br><br>\n\n\n";
   
   if(($_POST['Atct']==1 AND ($_POST['reasonI']=='OD' OR $_POST['reasonI']=='Tour' OR $_POST['reasonI']=='Meeting')) OR ($_POST['Atct']==2 AND ($_POST['reasonO']=='OD' OR $_POST['reasonO']=='Tour' OR $_POST['reasonO']=='Meeting')) OR ($_POST['Atct']==12 AND ($_POST['reasonI']=='OD' OR $_POST['reasonI']=='Tour' OR $_POST['reasonI']=='Meeting') AND ($_POST['reasonO']=='OD' OR $_POST['reasonO']=='Tour' OR $_POST['reasonO']=='Meeting')) OR ($_POST['Atct']==3 AND ($_POST['reason']=='OD' OR $_POST['reason']=='Tour' OR $_POST['reason']=='Meeting'))){ $emsg="Your team member ".$_POST['Ename']." has applied for OD/tour/meeting for attendance authorisation for dated ".date('d-m-Y',strtotime($_POST['AttDate']))." with remark (".$AllRemark.") in ESS. Please log-in in ESS to review. This is an auto-approval request. You may reject the application if found unauthorised.<br><br>\n\n"; }else{ $emsg .= "Your team member ".$_POST['Ename']." has requested for attendance authorisation for dated ".date("d-m-Y",strtotime($_POST['AttDate']))." with remark (".$AllRemark.") in ESS, Please log-in in ESS for taking necessary action.<br><br>\n\n"; }
   
   $emsg .= "From <br><b>ADMIN ESS</b><br>";
   $emsg .= "</body></html>";	      
   $ok=@mail($eto, $esub, $emsg, $headers);
  }
  
  if($_POST['Hname']!='' AND $_POST['Hmail']!='' AND ($_POST['reasonI']=='Other' OR $_POST['reasonO']=='Other' OR $_POST['reason']=='Other'))  //HOD
  {
   $eto2 = $_POST['Hmail'];
   $efrom2 = 'admin@vnrseeds.co.in';
   $esub2 = 'For authorisation of Attendance';
   $headers2 = "From: ".$efrom2."\r\n"; 
   $headers2 .= "MIME-Version: 1.0\r\n";
   $headers2 .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
   $emsg2 .= "<html><head></head><body>";
   $emsg2 .= "Dear <b>".$_POST['Hname'].",</b><br><br>\n\n\n";
   
   if(($_POST['Atct']==1 AND ($_POST['reasonI']=='OD' OR $_POST['reasonI']=='Tour' OR $_POST['reasonI']=='Meeting')) OR ($_POST['Atct']==2 AND ($_POST['reasonO']=='OD' OR $_POST['reasonO']=='Tour' OR $_POST['reasonO']=='Meeting')) OR ($_POST['Atct']==12 AND ($_POST['reasonI']=='OD' OR $_POST['reasonI']=='Tour' OR $_POST['reasonI']=='Meeting') AND ($_POST['reasonO']=='OD' OR $_POST['reasonO']=='Tour' OR $_POST['reasonO']=='Meeting')) OR ($_POST['Atct']==3 AND ($_POST['reason']=='OD' OR $_POST['reason']=='Tour' OR $_POST['reason']=='Meeting'))){ $emsg2="Your team member ".$_POST['Ename']." reporting to ".$_POST['Rname']." has applied for OD/tour/meeting as attendance authorisation for dated ".date('d-m-Y',strtotime($_POST['AttDate']))." with remark (".$AllRemark.") in ESS. Please log-in in ESS for more details.<br><br>\n\n"; }else{ $emsg2 .= "Your team member ".$_POST['Ename']." reporting to ".$_POST['Rname']." has requested for attendance authorisation for dated ".date("d-m-Y",strtotime($_POST['AttDate']))." with remark (".$AllRemark.") in ESS, Please log-in in ESS for more details.<br><br>\n\n"; }
   
   $emsg2 .= "From <br><b>ADMIN ESS</b><br>";
   $emsg2 .= "</body></html>";	      
   $ok=@mail($eto2, $esub2, $emsg2, $headers2);
  }
  
  
  if($_POST['HrEname']!='' AND $_POST['HrEmail']!='')  //HrEmp
  {
   $eto3 = $_POST['HrEmail'];
   $efrom3 = 'admin@vnrseeds.co.in';
   $esub3 = 'For authorisation of Attendance';
   $headers3 = "From: ".$efrom3."\r\n"; 
   $headers3 .= "MIME-Version: 1.0\r\n";
   $headers3 .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
   $emsg3 .= "<html><head></head><body>";
   $emsg3 .= "Dear <b>".$_POST['HrEname'].",</b><br><br>\n\n\n";
   
   if(($_POST['Atct']==1 AND ($_POST['reasonI']=='OD' OR $_POST['reasonI']=='Tour' OR $_POST['reasonI']=='Meeting')) OR ($_POST['Atct']==2 AND ($_POST['reasonO']=='OD' OR $_POST['reasonO']=='Tour' OR $_POST['reasonO']=='Meeting')) OR ($_POST['Atct']==12 AND ($_POST['reasonI']=='OD' OR $_POST['reasonI']=='Tour' OR $_POST['reasonI']=='Meeting') AND ($_POST['reasonO']=='OD' OR $_POST['reasonO']=='Tour' OR $_POST['reasonO']=='Meeting')) OR ($_POST['Atct']==3 AND ($_POST['reason']=='OD' OR $_POST['reason']=='Tour' OR $_POST['reason']=='Meeting'))){ $emsg3=$_POST['Ename']." applied for OD/tour/meeting for attendance authorisation for dated ".date("d-m-Y",strtotime($_POST['AttDate']))." with remark (".$AllRemark.") in ESS. This is an auto-approval request. for details, kindly log on to ESS.<br><br>\n\n"; }else{ $emsg3 .= $_POST['Ename']." has requested for attendance authorisation for dated ".date("d-m-Y",strtotime($_POST['AttDate']))." with remark (".$AllRemark.") in ESS, for details, kindly log on to ESS.<br><br>\n\n"; }

   $emsg3 .= "From <br><b>ADMIN ESS</b><br>";
   $emsg3 .= "</body></html>";	      
   $ok=@mail($eto3, $esub3, $emsg3, $headers3);
  }
  
  /*HR*/                                              //HR
   $eto4 = 'vspl.attendance@gmail.com';  //vspl.hr@vnrseeds.com
   $efrom4 = 'admin@vnrseeds.co.in';
   $esub4 = 'For authorisation of Attendance';
   $headers4 = "From: ".$efrom4."\r\n"; 
   $headers4 .= "MIME-Version: 1.0\r\n";
   $headers4 .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
   $emsg4 .= "<html><head></head><body>";
   $emsg4 .= "Dear <b>Sir/Mam, </b> <br><br>\n\n\n";
   
   if(($_POST['Atct']==1 AND ($_POST['reasonI']=='OD' OR $_POST['reasonI']=='Tour' OR $_POST['reasonI']=='Meeting')) OR ($_POST['Atct']==2 AND ($_POST['reasonO']=='OD' OR $_POST['reasonO']=='Tour' OR $_POST['reasonO']=='Meeting')) OR ($_POST['Atct']==12 AND ($_POST['reasonI']=='OD' OR $_POST['reasonI']=='Tour' OR $_POST['reasonI']=='Meeting') AND ($_POST['reasonO']=='OD' OR $_POST['reasonO']=='Tour' OR $_POST['reasonO']=='Meeting')) OR ($_POST['Atct']==3 AND ($_POST['reason']=='OD' OR $_POST['reason']=='Tour' OR $_POST['reason']=='Meeting')))
   { $emsg4 .= $_POST['Ename']." applied for OD/tour/meeting for attendance authorisation for dated ".date("d-m-Y",strtotime($_POST['AttDate']))." with remark (".$AllRemark.") in ESS. This is an auto-approval request. for details, kindly log on to ESS.<br><br>\n\n"; }else{ $emsg4 .= $_POST['Ename']." has requested for attendance authorisation for dated ".date("d-m-Y",strtotime($_POST['AttDate']))." with remark (".$AllRemark.") in ESS, for details, kindly log on to ESS.<br><br>\n\n"; }

   $emsg4 .= "From <br><b>ADMIN ESS</b><br>";
   $emsg4 .= "</body></html>";	      
   $ok=@mail($eto4, $esub4, $emsg4, $headers4);
  /*HR*/  
  
 /* 
  if($_POST['Htname']!='' AND $_POST['Htmail']!='')  //HOD -top level
  {
   $eto5 = $_POST['Htmail'];
   $efrom5 = 'admin@vnrseeds.co.in';
   $esub5 = 'For authorisation of Attendance';
   $headers5 = "From: ".$efrom5."\r\n"; 
   $headers5 .= "MIME-Version: 1.0\r\n";
   $headers5 .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
   $emsg5 .= "<html><head></head><body>";
   $emsg5 .= "Dear <b>".$_POST['Hname'].",</b><br><br>\n\n\n";
   $emsg5 .= "Your team member ".$_POST['Ename']." reporting to ".$_POST['Rname']." has requested for attendance authorisation for dated ".date("d-m-Y",strtotime($_POST['AttDate']))." with remark (".$AllRemark.") in ESS, Please log-in in ESS for more details.<br><br>\n\n";
   $emsg5 .= "From <br><b>ADMIN ESS</b><br>";
   $emsg5 .= "</body></html>";	      
   $ok=@mail($eto5, $esub5, $emsg5, $headers5);
  }
 */
  

/**** Leave Update Open ****/
   $SqlCL=mysql_query("select count(AttValue)as CL from hrm_employee_attendance where AttValue='CL' AND EmployeeID=".$_POST['EId']." AND AttDate between '".$yy."-".$mm."-01' AND '".$yy."-".$mm."-31'", $con); $SqlCH=mysql_query("select count(AttValue)as CH from hrm_employee_attendance where AttValue='CH' AND EmployeeID=".$_POST['EId']." AND AttDate between '".$yy."-".$mm."-01' AND '".$yy."-".$mm."-31'", $con); $SqlSL=mysql_query("select count(AttValue)as SL from hrm_employee_attendance where AttValue='SL' AND EmployeeID=".$_POST['EId']." AND AttDate between '".$yy."-".$mm."-01' AND '".$yy."-".$mm."-31'", $con); $SqlSH=mysql_query("select count(AttValue)as SH from hrm_employee_attendance where AttValue='SH' AND EmployeeID=".$_POST['EId']." AND AttDate between '".$yy."-".$mm."-01' AND '".$yy."-".$mm."-31'", $con); $SqlPL=mysql_query("select count(AttValue)as PL from hrm_employee_attendance where AttValue='PL' AND EmployeeID=".$_POST['EId']." AND AttDate between '".$yy."-".$mm."-01' AND '".$yy."-".$mm."-31'", $con); $SqlPH=mysql_query("select count(AttValue)as PH from hrm_employee_attendance where AttValue='PH' AND EmployeeID=".$_POST['EId']." AND AttDate between '".$yy."-".$mm."-01' AND '".$yy."-".$mm."-31'", $con); $SqlEL=mysql_query("select count(AttValue)as EL from hrm_employee_attendance where AttValue='EL' AND EmployeeID=".$_POST['EId']." AND AttDate between '".$yy."-".$mm."-01' AND '".$yy."-".$mm."-31'", $con); $SqlFL=mysql_query("select count(AttValue)as FL from hrm_employee_attendance where AttValue='FL' AND EmployeeID=".$_POST['EId']." AND AttDate between '".$yy."-".$mm."-01' AND '".$yy."-".$mm."-31'", $con); $SqlTL=mysql_query("select count(AttValue)as TL from hrm_employee_attendance where AttValue='TL' AND EmployeeID=".$_POST['EId']." AND AttDate between '".$yy."-".$mm."-01' AND '".$yy."-".$mm."-31'", $con); $SqlHf=mysql_query("select count(AttValue)as Hf from hrm_employee_attendance where AttValue='HF' AND EmployeeID=".$_POST['EId']." AND AttDate between '".$yy."-".$mm."-01' AND '".$yy."-".$mm."-31'", $con); $SqlPresent=mysql_query("select count(AttValue)as Present from hrm_employee_attendance where AttValue='P' AND EmployeeID=".$_POST['EId']." AND AttDate between '".$yy."-".$mm."-01' AND '".$yy."-".$mm."-31'", $con); $SqlAbsent=mysql_query("select count(AttValue)as Absent from hrm_employee_attendance where AttValue='A' AND EmployeeID=".$_POST['EId']." AND AttDate between '".$yy."-".$mm."-01' AND '".$yy."-".$mm."-31'", $con); $SqlOnDuties=mysql_query("select count(AttValue)as OnDuties from hrm_employee_attendance where AttValue='OD' AND EmployeeID=".$_POST['EId']." AND AttDate between '".$yy."-".$mm."-01' AND '".$yy."-".$mm."-31'", $con); $SqlHoliday=mysql_query("select count(AttValue)as Holiday from hrm_employee_attendance where AttValue='HO' AND EmployeeID=".$_POST['EId']." AND AttDate between '".$yy."-".$mm."-01' AND '".$yy."-".$mm."-31'", $con); $SqlELSun=mysql_query("select count(CheckSunday)as SUN from hrm_employee_attendance where CheckSunday='Y' AND EmployeeID=".$_POST['EId']." AND AttDate between '".$yy."-".$mm."-01' AND '".$yy."-".$mm."-31'", $con);  
   
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
   
   $SL=mysql_query("select * from hrm_employee_monthlyleave_balance where EmployeeID=".$_POST['EId']." AND Month='".$mm."' AND Year='".$yy."'", $con);  $RowL=mysql_num_rows($SL);
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
   
   $sUpL=mysql_query("UPDATE hrm_employee_monthlyleave_balance set AvailedCL='".$TotalCL."', AvailedSL='".$TotalSL."', AvailedPL='".$TotalPL."', AvailedOL='".$TotalFL."', AvailedTL='".$TotalTL."', BalanceCL='".$TotBalCL."', BalanceSL='".$TotBalSL."', BalancePL='".$TotBalPL."', BalanceOL='".$TotBalFL."' where EmployeeID=".$_POST['EId']." AND Month='".$mm."' AND Year='".$yy."'", $con);
   }
/**** Leave update Close ****/

  echo '<script>alert("Request sent successfully...!!"); </script>';
  
 }
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Attendance Request Form</title>
<style>
.font{ font-style:normal;text-align:center;font-family:Times New Roman;font-size:20px;font-weight:bold;}
.font2{ font-style:oblique;font-family:Times New Roman;font-size:16px;}
</style>
<script type="text/javascript" language="javascript">
function FunChk(v)
{
 if(v==1)
 {
  if(document.getElementById("check1").checked==true){document.getElementById("reasonI").disabled=false;document.getElementById("remarkI").disabled=false;}else{document.getElementById("reasonI").disabled=true;document.getElementById("remarkI").disabled=true;}
 }
 if(v==2)
 {
  if(document.getElementById("check2").checked==true){document.getElementById("reasonO").disabled=false;document.getElementById("remarkO").disabled=false;}else{document.getElementById("reasonO").disabled=true;document.getElementById("remarkO").disabled=true;} 
 }
 if(v==3)
 {
  if(document.getElementById("check3").checked==true){document.getElementById("reason").disabled=false;document.getElementById("remark").disabled=false; document.getElementById("reqSubmit").disabled=false;}else{document.getElementById("reason").disabled=true;document.getElementById("remark").disabled=true; document.getElementById("reqSubmit").disabled=true;} 
 }
 
  if(document.getElementById("Inn").value==1 && document.getElementById("Outt").value==1)
  {
   if(document.getElementById("check1").checked==true || document.getElementById("check2").checked==true)
   {document.getElementById("reqSubmit").disabled=false;}else{document.getElementById("reqSubmit").disabled=true;}
  }
  else if(document.getElementById("Inn").value==1 && document.getElementById("Outt").value==0)
  {
   if(document.getElementById("check1").checked==true){document.getElementById("reqSubmit").disabled=false;}
   else{document.getElementById("reqSubmit").disabled=true;}
  }
  else if(document.getElementById("Inn").value==0 && document.getElementById("Outt").value==1)
  {
   if(document.getElementById("check2").checked==true){document.getElementById("reqSubmit").disabled=false;}
   else{document.getElementById("reqSubmit").disabled=true;}
  }
 
 
 //else if(document.getElementById("check1").checked==false && document.getElementById("check2").checked==false)
 //{document.getElementById("reqSubmit").disabled=true;}
 
}

function validate(attreqform) 
{
 if(document.getElementById("Atct").value==1 || document.getElementById("Atct").value==12)
 {
  if(document.getElementById("check1").checked==true)
  {
   if(document.getElementById("reasonI").value==0){alert("Please select reason for In-Time request"); return false; }
   else if(document.getElementById("remarkI").value==''){alert("Please type remark for In-Time request"); return false; }
  }
 }
 
 if(document.getElementById("Atct").value==2 || document.getElementById("Atct").value==12)
 {
  if(document.getElementById("check2").checked==true)
  {
   if(document.getElementById("reasonO").value==0){alert("Please select reason for Out-Time request"); return false; }
   else if(document.getElementById("remarkO").value==''){alert("Please type remark for Out-Time request"); return false; }
  }
 }
 
 if(document.getElementById("Atct").value==3)
 {
  if(document.getElementById("check3").checked==true)
  {
   if(document.getElementById("reason").value==0){alert("Please select reason for request"); return false; }
   else if(document.getElementById("remark").value==''){alert("Please type remark for request"); return false; }
  }
 }
 
  var agree=confirm("Are you sure?");
  if(agree)
  {
    getId("reqSubmit").style.display="none";
    getId("wait_tip").style.display="";
    return true;
  }
  else{return false;}
}

function getId(id)
{ return document.getElementById(id); }
   
</script>
</head>
<body>
<center>
<?php 
if($_REQUEST['ei']>0 AND $_REQUEST['d']>0 AND $_REQUEST['m']>0 AND $_REQUEST['y']>0)  //open open
{ 
 $d=sprintf('%02d',$_REQUEST['d']); $m=sprintf('%02d',$_REQUEST['m']); $y=sprintf('%02d',$_REQUEST['y']);
 $sE=mysql_query("SELECT * FROM hrm_employee_attendance WHERE EmployeeID=".$_REQUEST['ei']." AND AttDate='".date($y."-".$m."-".$d)."'", $con); $rowE=mysql_num_rows($sE); $rE=mysql_fetch_array($sE); 
 $ck=mysql_query("select * from hrm_employee_attendance_req where EmployeeID=".$_REQUEST['ei']." AND AttDate='".date($y."-".$m."-".$d)."'",$con); $rowchk=mysql_num_rows($ck); $rchk=mysql_fetch_assoc($ck);
 $sql=mysql_query("select Fname,Sname,Lname,RepEmployeeID,EmailId_Vnr,Gender,Married,DR from hrm_employee e inner join hrm_employee_general g on e.EmployeeID=g.EmployeeID inner join hrm_employee_personal p on g.EmployeeID=p.EmployeeID where e.EmployeeID=".$_REQUEST['ei'], $con); $res=mysql_fetch_assoc($sql); if($res['DR']=='Y'){$me='Dr.';} elseif($res['Gender']=='M'){$me='Mr.';} elseif($res['Gender']=='F' AND $res['Married']=='Y'){$me='Mrs.';} elseif($res['Gender']=='F' AND $res['Married']=='N'){$me='Miss.';}
 
//Chk Reporting open 
if($res['RepEmployeeID']!=0 AND $res['RepEmployeeID']!='')
{
 $sqlR=mysql_query("select Fname,Sname,Lname,RepEmployeeID,EmailId_Vnr,Gender,Married,DR from hrm_employee e inner join hrm_employee_general g on e.EmployeeID=g.EmployeeID inner join hrm_employee_personal p on g.EmployeeID=p.EmployeeID where e.EmployeeID=".$res['RepEmployeeID'], $con); $resR=mysql_fetch_assoc($sqlR); if($resR['DR']=='Y'){$mr='Dr.';} elseif($resR['Gender']=='M'){$mr='Mr.';} elseif($resR['Gender']=='F' AND $resR['Married']=='Y'){$mr='Mrs.';} elseif($resR['Gender']=='F' AND $resR['Married']=='N'){$mr='Miss.';}

 if($resR['RepEmployeeID']!=0 AND $resR['RepEmployeeID']!='')  
 {
  $sqlH=mysql_query("select Fname,Sname,Lname,EmailId_Vnr,Gender,Married,DR,RepEmployeeID from hrm_employee e inner join hrm_employee_general g on e.EmployeeID=g.EmployeeID inner join hrm_employee_personal p on g.EmployeeID=p.EmployeeID where e.EmployeeID=".$resR['RepEmployeeID'], $con); $resH=mysql_fetch_assoc($sqlH); if($resH['DR']=='Y'){$mh='Dr.';} elseif($resH['Gender']=='M'){$mh='Mr.';} elseif($resH['Gender']=='F' AND $resH['Married']=='Y'){$mh='Mrs.';} elseif($resH['Gender']=='F' AND $resH['Married']=='N'){$mh='Miss.';}
  
  if($resH['RepEmployeeID']!=0 AND $resH['RepEmployeeID']!='')
  {
   $sqltH=mysql_query("select Fname,Sname,Lname,EmailId_Vnr,Gender,Married,DR from hrm_employee e inner join hrm_employee_general g on e.EmployeeID=g.EmployeeID inner join hrm_employee_personal p on g.EmployeeID=p.EmployeeID where e.EmployeeID=".$resH['RepEmployeeID'], $con); $restH=mysql_fetch_assoc($sqltH); if($restH['DR']=='Y'){$mht='Dr.';} elseif($restH['Gender']=='M'){$mht='Mr.';} elseif($restH['Gender']=='F' AND $restH['Married']=='Y'){$mht='Mrs.';} elseif($restH['Gender']=='F' AND $restH['Married']=='N'){$mht='Miss.';}
  } 
 }
}  
//Chk Reporting close

/* krishna */
$sqlHrE=mysql_query("select Fname,Sname,Lname,EmailId_Vnr,Gender,Married,DR from hrm_employee e inner join hrm_employee_general g on e.EmployeeID=g.EmployeeID inner join hrm_employee_personal p on g.EmployeeID=p.EmployeeID where e.EmployeeID=83",$con); $resHrE=mysql_fetch_assoc($sqlHrE); if($resHrE['DR']=='Y'){$mHrE='Dr.';} elseif($resHrE['Gender']=='M'){$mHrE='Mr.';} elseif($resHrE['Gender']=='F' AND $resHrE['Married']=='Y'){$mHrE='Mrs.';} elseif($resHrE['Gender']=='F' AND $resHrE['Married']=='N'){$mHrE='Miss.';}

} //close close
?>

<form name="attreqform" method="post" onsubmit="return validate(this)">
<input type="hidden" name="Ename" value="<?php echo $me.' '.$res['Fname'].' '.$res['Sname'].' '.$res['Lname']; ?>" />
<input type="hidden" name="Email" value="<?php echo $res['EmailId_Vnr']; ?>" />
<input type="hidden" name="Rname" value="<?php echo $mr.' '.$resR['Fname'].' '.$resR['Sname'].' '.$resR['Lname']; ?>" />
<input type="hidden" name="Rmail" value="<?php echo $resR['EmailId_Vnr']; ?>" />
<input type="hidden" name="Hname" value="<?php echo $mh.' '.$resH['Fname'].' '.$resH['Sname'].' '.$resH['Lname']; ?>" />
<input type="hidden" name="Hmail" value="<?php echo $resH['EmailId_Vnr']; ?>" />
<input type="hidden" name="Htname" value="<?php echo $mht.' '.$restH['Fname'].' '.$restH['Sname'].' '.$restH['Lname']; ?>" />
<input type="hidden" name="Htmail" value="<?php echo $restH['EmailId_Vnr']; ?>" />
<input type="hidden" name="HrEname" value="<?php echo $mHrE.' '.$resHrE['Fname'].' '.$resHrE['Sname'].' '.$resHrE['Lname']; ?>" />
<input type="hidden" name="HrEmail" value="<?php echo $resHrE['EmailId_Vnr']; ?>" />
<input type="hidden" name="EId" Id="EId" value="<?php echo $_REQUEST['ei']; ?>" />
<input type="hidden" name="RId" value="<?php echo $res['RepEmployeeID']; ?>" />
<input type="hidden" name="HId" value="<?php echo $resR['RepEmployeeID']; ?>" />
<input type="hidden" name="HtId" value="<?php echo $resH['RepEmployeeID']; ?>" />

<input type="hidden" name="Inn" Id="Inn" value="<?php echo $rE['InnLate']; ?>" />
<input type="hidden" name="Outt" Id="Outt" value="<?php echo $rE['OuttLate']; ?>" />
<input type="hidden" name="AttDate" Id="AttDate" value="<?php echo date($y."-".$m."-".$d); ?>" />

<?php if($rE['InnLate']==1 AND $rE['OuttLate']==0){$Atct=1;} 
elseif($rE['InnLate']==0 AND $rE['OuttLate']==1){$Atct=2;}
elseif($rE['InnLate']==1 AND $rE['OuttLate']==1){$Atct=12;}
elseif(($rE['InnLate']==0 OR $rE['InnLate']=='') AND ($rE['OuttLate']==0 OR $rE['OuttLate']=='')){$Atct=3;} ?>
<input type="hidden" name="Atct" Id="Atct" value="<?php echo $Atct; ?>" />
<?php $chkAtt=mysql_query("select * from hrm_employee_attendance where AttDate='".date($y."-".$m."-".$d)."' AND EmployeeID=".$_REQUEST['ei'],$con); $rowchkAtt=mysql_num_rows($chkAtt); ?>
<input type="hidden" name="CountAtt" Id="CountAtt" value="<?php echo $rowchkAtt; ?>" />


<table style="margin-top:10px;width:100%;">
<tr><td colspan="3" class="font">Attendance Authorisation</td></tr>
<div style="position:absolute;top:120px;left:150px;">
<span id="wait_tip" style="display:none;"><img src="images/loading.gif" id="loading_img"/> Please wait...</span>
</div>
<tr><td colspan="3" valign="top">&nbsp;</td></tr>
<tr>
<td class="font2" style="width:25%;">Request Date</td>
<td class="font2" style="width:2%;">:</td>
<td class="font2" style="width:73%;"><?php echo $d.'-'.$m.'-'.$y; 
//date("d-m-Y", strtotime($rE['AttDate'])) ?></td>
</tr>
<tr>
<td class="font2">Time</td><td class="font2">:</td>
<td class="font2"><b><font color="#004080">In:</font>&nbsp;<font style="color:<?php if($rE['InnLate']==1){echo '#FF0000';}?>;"><?php if($rE['Inn']=='00:00:00' OR $rE['Inn']==''){echo '00:00';}else{echo date("h:i",strtotime($rE['Inn']));} ?>&nbsp;<?php if($rE['InnLate']==1){echo '- Late';}?></font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#004080">Out:</font>&nbsp;<font style="color:<?php if($rE['OuttLate']==1){echo '#FF0000';}?>;"><?php if($rE['Outt']=='00:00:00' OR $rE['Outt']==''){echo '00:00';}else{echo date("h:i",strtotime($rE['Outt']));} ?>&nbsp;<?php if($rE['OuttLate']==1){echo '- Early Going';}?></font></b></td>
</tr>
<tr><td style="height:10px;"></td></tr>
<?php if($rE['InnLate']==1){?>
<tr>
<td class="font2" colspan="2"></td>
<td class="font2" style="color:#000099;"><u><b>Request for In-Time Attendance</b></u>&nbsp;&nbsp;<input type="checkbox" id="check1" onclick="FunChk(1)" <?php if($rowchk>0 AND $rchk['InReason']!='' AND $rchk['InRemark']!=''){echo 'checked';} ?>/>&nbsp;&nbsp;&nbsp;<?php if($rowchk>0 AND $rchk['InReason']!='' AND $rchk['InRemark']!=''){ ?><font style="font-style:normal;font-weight:bold;color:#FF51A8;">[ Status:
<?php if($rchk['InStatus']==0){ echo '<font color="#FF8888">Draft</font>'; }elseif($rchk['InStatus']==1){ echo '<font color="#FF8888">Pending</font>'; }elseif($rchk['InStatus']==2){ echo '<font color="#009100">Approved</font>'; }elseif($rchk['InStatus']==3){ echo '<font color="#FF2D2D">Rejected</font>'; } ?> ]</font><?php } ?>

</td>
</tr>
<tr>
<td class="font2">Reason</td>
<td class="font2">:</td>
<td class="font2"><select class="font2" id="reasonI" name="reasonI" style="width:150px;" disabled>
<?php if($rowchk>0 AND $rchk['InReason']!=''){ ?><option value="<?php echo $rchk['InReason']; ?>"><?php echo $rchk['InReason']; ?></option><?php } else { ?><option value="0">Select</option><?php } if(date("d")!=date("t")){ ?><option value="OD">OD</option><option value="Tour">Tour</option><option value="Meeting">Meeting</option><?php } ?><option value="Other">Other</option></select></td>
</tr>
<tr>
<td class="font2" valign="top">Remark</td>
<td class="font2" valign="top">:</td>
<td class="font2"><textarea class="font2" id="remarkI" name="remarkI" cols="50" rows="2" disabled><?php echo $rchk['InRemark']; ?></textarea></td>
</tr>
<?php } ?>


<?php if($rE['OuttLate']==1){ ?>
<tr>
<td class="font2" colspan="2"></td>
<td class="font2" style="color:#000099;"><u><b>Request for Out-Time Attendance</b></u>&nbsp;&nbsp;<input type="checkbox" id="check2" onclick="FunChk(2)" <?php if($rowchk>0 AND $rchk['OutReason']!='' AND $rchk['OutRemark']!=''){echo 'checked';} ?>/>
&nbsp;&nbsp;&nbsp;<?php if($rowchk>0 AND $rchk['OutReason']!='' AND $rchk['OutRemark']!=''){ ?><font style="font-style:normal;font-weight:bold;color:#FF51A8;">[ Status:
<?php if($rchk['OutStatus']==0){ echo '<font color="#FF8888">Draft</font>'; }elseif($rchk['OutStatus']==1){ echo '<font color="#FF8888">Pending</font>'; }elseif($rchk['OutStatus']==2){ echo '<font color="#009100">Approved</font>'; }elseif($rchk['OutStatus']==3){ echo '<font color="#FF2D2D">Rejected</font>'; } ?> ]</font><?php } ?>
</td>
</tr>
<tr>
<td class="font2">Reason</td>
<td class="font2">:</td>
<td class="font2"><select class="font2" id="reasonO" name="reasonO" style="width:150px;" disabled>
<?php if($rowchk>0 AND $rchk['OutReason']!=''){ ?><option value="<?php echo $rchk['OutReason']; ?>"><?php echo $rchk['OutReason']; ?></option><?php } else { ?><option value="0">Select</option><?php } if(date("d")!=date("t")){ ?><option value="OD">OD</option><option value="Tour">Tour</option><option value="Meeting">Meeting</option><?php } ?><option value="Other">Other</option></select></td>
</tr>
<tr>
<td class="font2" valign="top">Remark</td>
<td class="font2" valign="top">:</td>
<td class="font2"><textarea class="font2" id="remarkO" name="remarkO" cols="50" rows="2" disabled><?php echo $rchk['OutRemark']; ?></textarea></td>
</tr>
<?php } ?>

<?php if(($rE['InnLate']==0 OR $rE['InnLate']=='') AND ($rE['OuttLate']==0 OR $rE['OuttLate']=='')){ ?>
<tr>
<td class="font2" colspan="2"></td>
<td class="font2" style="color:#000099;"><u><b>Request for Attendance</b></u>&nbsp;&nbsp;<input type="checkbox" id="check3" onclick="FunChk(3)" <?php if($rowchk>0 AND $rchk['Reason']!='' AND $rchk['Remark']!=''){echo 'checked';} ?>/>
&nbsp;&nbsp;&nbsp;<?php if($rowchk>0 AND $rchk['Reason']!='' AND $rchk['Remark']!=''){ ?><font style="font-style:normal;font-weight:bold;color:#FF51A8;">[ Status:
<?php if($rchk['SStatus']==0){ echo '<font color="#FF8888">Draft</font>'; }elseif($rchk['SStatus']==1){ echo '<font color="#FF8888">Pending</font>'; }elseif($rchk['SStatus']==2){ echo '<font color="#009100">Approved</font>'; }elseif($rchk['SStatus']==3){ echo '<font color="#FF2D2D">Rejected</font>'; } ?> ]</font><?php } ?>
</td>
</tr>
<tr>
<td class="font2">Reason</td>
<td class="font2">:</td>
<td class="font2"><select class="font2" id="reason" name="reason" style="width:150px;" disabled>
<?php if($rowchk>0 AND $rchk['Reason']!=''){ ?><option value="<?php echo $rchk['Reason']; ?>"><?php echo $rchk['Reason']; ?></option><?php } else { ?><option value="0">Select</option><?php } if(date("d")!=date("t")){ ?><option value="OD">OD</option><option value="Tour">Tour</option><option value="Meeting">Meeting</option><?php } ?><option value="Other">Other</option></select></td>
</tr>
<tr>
<td class="font2" valign="top">Remark</td>
<td class="font2" valign="top">:</td>
<td class="font2"><textarea class="font2" id="remark" name="remark" cols="50" rows="2" disabled><?php echo $rchk['Remark']; ?></textarea></td>
</tr>
<?php } ?>

<?php if($rowchk==0){ ?>
<tr>
<td colspan="2" class="font2" valign="top"></td>
<?php if(date("m")==$_REQUEST['m']){?>
<td class="font2"><input class="font2" type="button" value="Refresh" onClick="javascript:window.location='AttReqForLate.php?ei=<?php echo $_REQUEST['ei']; ?>&d=<?php echo $_REQUEST['d']; ?>&m=<?php echo $_REQUEST['m']; ?>&y=<?php echo $_REQUEST['y']; ?>'"/><input class="font2" type="submit" name="reqSubmit" id="reqSubmit" value="Send Request" disabled/>

</td>
<?php } ?>
</tr>
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
