<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}
date_default_timezone_set('Asia/Kolkata');



if(isset($_POST['SaveImport_Gps1']))  //Import_Gps Attendance
{ 

 if($_FILES['Import_Gps1']['error']>0){echo "Error: " . $_FILES['Import_Gps1']['error'] . "<br />";}
 else
 {  
  if(($handle = fopen($_FILES['Import_Gps1']['tmp_name'], "r"))!== FALSE) 
  {
   $ctr = 1; // used to exclude the CSV header
   while(($data = fgetcsv($handle, 1000, ",")) !== FALSE)
   { 
    $c0=mysql_real_escape_string($data[0]); $c1=mysql_real_escape_string($data[1]); $c2=mysql_real_escape_string($data[2]); $c3=mysql_real_escape_string($data[3]); $c4=mysql_real_escape_string($data[4]); $c5=mysql_real_escape_string($data[5]); $c6=mysql_real_escape_string($data[6]); $c7=mysql_real_escape_string($data[7]); $c8=mysql_real_escape_string($data[8]); $c9=mysql_real_escape_string($data[9]); $c10=mysql_real_escape_string($data[10]); $c11=mysql_real_escape_string($data[11]); 
	  
  //$c3-Date, $c5-EC, $c6-Leave, $c7-NoOfDay	
  $search =  '"!#$%_' ; $search = str_split($search); $MrRep=str_replace($search, "", $c8); 	  
  if ($ctr>1 AND $c3!='' AND $c5!=0 AND $c7!=0) //AND $c6!=''
  { 
   if($c7==1){$sDate=date('Y-m-d', strtotime($c3)); $eDate=date('Y-m-d', strtotime($c3));}
   elseif($c7>1){$sDate=date('Y-m-d', strtotime($c3)); $ed=$c7-1; $eDate=date('Y-m-d', strtotime("+".$ed." days", strtotime($c3)));}
   
   $curMday=date("t",strtotime($_POST['Year'].'-'.$_POST['Monthh'].'-01'));
   
   if(strlen($_POST['Monthh'])==1){ $mm='0'.$_POST['Monthh'];}
   else{ $mm=$_POST['Monthh']; }
   
   $ffd=$_POST['Year'].'-'.$mm.'-01'; 
   $ttd=$_POST['Year'].'-'.$mm.'-'.$curMday;
   
   
   
   $sqlE=mysql_query("select EmployeeID,EmpCode from hrm_employee where EmpCode=".$c5." AND CompanyId=".$CompanyId, $con); $rowE=mysql_num_rows($sqlE); $resE=mysql_fetch_assoc($sqlE); 
   if($rowE>0 AND ($c6=='A' OR $c6=='P' OR $c6=='OD' OR $c6=='WFH' OR $c6=='')) //AND ($c5==96 OR $c5==106)
   {  
   $sql=mysql_query("select Leave_Type,LeaveStatus from hrm_employee_applyleave WHERE EmployeeID=".$resE['EmployeeID']." AND ('".$sDate."'>=Apply_FromDate AND '".$eDate."'<=Apply_ToDate) AND LeaveStatus!=3 AND LeaveCancelStatus!='Y'", $con); $row=mysql_num_rows($sql);
   
   
    if($row==0)
    { 
////////////////<<<<<<<<<<<<<<<<<<<////////////
    //echo 'cc='.$i.'/'.$sDate.'/'.$eDate;
    for($i=$sDate; $i<=$eDate; $i++)
	{  
	    //echo 'if('.$i.'>='.$ffd.' AND '.$i.'<='.$ttd.')<br>';
	    
	    
	   
	  if($i>=$ffd AND $i<=$ttd) //if($i>=$ffd AND $i<=$ttd)
	  {  
	  
	   $sql2=mysql_query("select * from hrm_employee_attendance WHERE EmployeeID=".$resE['EmployeeID']." AND AttDate='".$i."'", $con); $row2=mysql_num_rows($sql2);
	   
	   //echo "select * from hrm_employee_attendance WHERE EmployeeID=".$resE['EmployeeID']." AND AttDate='".$i."'";
	   
	   
	   if($row2>0)
	   { $res2=mysql_fetch_assoc($sql2); 
		 if($res2['AttValue']!='CL' AND $res2['AttValue']!='CH' AND $res2['AttValue']!='SL' AND $res2['AttValue']!='SH' AND $res2['AttValue']!='PL' AND $res2['AttValue']!='PH' AND $res2['AttValue']!='EL' AND $res2['AttValue']!='FL' AND $res2['AttValue']!='TL')
		 { $sqlUp=mysql_query("update hrm_employee_attendance set AttValue='".$c6."' WHERE EmployeeID=".$resE['EmployeeID']." AND AttDate='".$i."'", $con); 
		 
		 //echo "update hrm_employee_attendance set AttValue='".$c6."' WHERE EmployeeID=".$resE['EmployeeID']." AND AttDate='".$i."'";
		 
		 } 
	   }
	   
	   elseif($row2==0 AND $c6!='CL' AND $c6!='CH' AND $c6!='SL' AND $c6!='SH' AND $c6!='PL' AND $c6!='PH' AND $c6!='EL' AND $c6!='FL' AND $c6!='TL' AND date("w",strtotime($i))!=0)	
	   {   
	        
	    $sqlUp = mysql_query("insert into hrm_employee_attendance(EmployeeID, AttValue, AttDate, Year, YearId) values(".$resE['EmployeeID'].",'".$c6."', '".$i."', '".$_POST['Year']."', ".$YearId.")", $con); 
	    
	    //echo "insert into hrm_employee_attendance(EmployeeID, AttValue, AttDate, Year, YearId) values(".$resE['EmployeeID'].",'".$c6."', '".$i."', '".$_POST['Year']."', ".$YearId.")";
	    
	   } 
	   
	   
	  } 

          $sqlm=mysql_query("Select MorEveRepId from hrm_employee_moreve_report WHERE EmployeeID=".$resE['EmployeeID']." AND MorEveDate='".$i."'",$con); $rowsm = mysql_num_rows($sqlm);  
	  if($rowsm>0)
	  { $resm=mysql_fetch_assoc($sqlm); if($resm['Att']!='CL' AND $resm['Att']!='CH' AND $resm['Att']!='SL' AND $resm['Att']!='SH' AND $resm['Att']!='PL' AND $resm['Att']!='PH' AND $resm['Att']!='EL' AND $resm['Att']!='FL' AND $resm['Att']!='TL'){ $sqlUp = mysql_query("UPDATE hrm_employee_moreve_report SET MorDateTime='".$c1."', MorReports='".$MrRep."', Att='".$c6."', UpAtt='Y' WHERE EmployeeID=".$resE['EmployeeID']." AND MorEveDate='".$i."'", $con); }
	  } 
	  elseif($rowsm==0 AND $c6!='CL' AND $c6!='CH' AND $c6!='SL' AND $c6!='SH' AND $c6!='PL' AND $c6!='PH' AND $c6!='EL' AND $c6!='FL' AND $c6!='TL' AND date("w",strtotime($i))!=0)
	  { 
	    $sqlUp = mysql_query("insert into hrm_employee_moreve_report(EmployeeID, MorEveDate, MorDateTime, MorReports, Att, UpAtt) values(".$resE['EmployeeID'].", '".$i."', '".$c1."', '".$MrRep."', '".$c6."', 'Y')", $con); 
	  }  
	  
	} 
////////////////<<<<<<<<<<<<<<<<<<<//////////// 
     }
    }
   }
   else { $ctr++; }
  }

   fclose($handle);
   if($sqlUp){ $MsgImpGps= 'Employee GPS attendance details uploaded successfully...';}
  }
 }
}




/************************* Time Attendance ***************************/
if(isset($_POST['SaveImport_TimeEntry']))  //SaveImport_TimeEntry Attendance
{ 
 $mkdate = mktime(0,0,0, $_REQUEST['Month2'], 1, $_REQUEST['Year2']);
 $nodinm = date('t',$mkdate);  //Number of days in the given month (28-31)

 if($_FILES['Import_TimeEntry']['error']>0){echo "Error: " . $_FILES['Import_TimeEntry']['error'] . "<br />";}
 else{  
  if(($handle = fopen($_FILES['Import_TimeEntry']['tmp_name'], "r"))!== FALSE) {
  $ctr = 1; // used to exclude the CSV header
  while(($data = fgetcsv($handle, 1000, ",")) !== FALSE){ 

  $c0=mysql_real_escape_string($data[0]); $c1=mysql_real_escape_string($data[1]); 
  $c2=mysql_real_escape_string($data[2]); $c3=mysql_real_escape_string($data[3]); 
  $c4=mysql_real_escape_string($data[4]); $c5=mysql_real_escape_string($data[5]); 
  $c66=mysql_real_escape_string($data[6]); $c77=mysql_real_escape_string($data[7]); 
  $c8=mysql_real_escape_string($data[8]); $c9=mysql_real_escape_string($data[9]);  
	  	 	  
  if ($ctr>5 AND $c1!='' AND ($c66!='' OR $c77!='')) //Check Main-1 Open 
  { 
   $sE=mysql_query("select EmployeeID,TimeApply,InTime,OutTime from hrm_employee where EmpCode=".$c1." AND CompanyId=".$CompanyId,$con); $rowE=mysql_num_rows($sE); $rE=mysql_fetch_assoc($sE); 
   if($rowE>0) //Check 1 Open
   {
	if($rE['TimeApply']=='Y' AND (($c66!='' AND $c66!='00:00' AND $c66!='00:00:00') OR ($c77!='' AND $c77!='00:00' AND $c77!='00:00:00')))  //Check 2 Open
	{
	
/************* ******************* *************/	
  $AtTD=$_POST['Year2']."-".$_POST['Month2']."-".$_POST['Day2'];
  $sEAtt=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$rE['EmployeeID']." AND AttDate='".$AtTD."'",$con); $rowEAtt=mysql_num_rows($sEAtt);
  if($rowEAtt>0)
  { $rEAtt=mysql_fetch_assoc($sEAtt); 
    $i=strtotime($rEAtt['Inn']); $o=strtotime($rEAtt['Outt']); $c666=strtotime($c66); $c777=strtotime($c77);
  
	if($rEAtt['Inn']!='00:00:00' AND $c66!='00:00:00' AND $c66!='00:00' AND $c66!='')
	{ if($i<$c666){$c6=$rEAtt['Inn'];}else{$c6=$c66;} }
	elseif($rEAtt['Inn']!='00:00:00' AND ($c66=='00:00:00' OR $c66=='00:00' OR $c66=='')){$c6=$rEAtt['Inn'];}
	elseif($c66!='00:00:00' AND $c66!='00:00' AND $c66!='' AND ($rEAtt['Inn']=='00:00:00' OR $rEAtt['Inn']=='00:00' OR $rEAtt['Inn']=='')){$c6=$c66;}
	
	if($rEAtt['Outt']!='00:00:00' AND $c77!='00:00:00' AND $c77!='00:00' AND $c77!='')
	{ if($o>$c777){$c7=$rEAtt['Outt'];}else{$c7=$c77;} }
	elseif($rEAtt['Outt']!='00:00:00' AND ($c77=='00:00:00' OR $c77=='00:00' OR $c77=='')){$c7=$rEAtt['Outt'];}
	elseif($c77!='00:00:00' AND $c77!='00:00' AND $c77!='' AND ($rEAtt['Outt']=='00:00:00' OR $rEAtt['Outt']=='00:00' OR $rEAtt['Outt']=='')){$c7=$c77;}
  }
  else{ $c6=$c66; $c7=$c77; }
/************* ******************* *************/  

	  $dv = intval($_POST['Day2']);
	  $s2E=mysql_query("select S".$dv.", I".$dv.", O".$dv." from hrm_employee_attendance_settime where EmployeeID=".$rE['EmployeeID'],$con); 
	  $row2E=mysql_num_rows($s2E); $r2E=mysql_fetch_assoc($s2E);
	  
	  if($row2E>0) //Check 3 Open
	  {
	  $Inexp=date($c6); $Outexp=date($c7);
	  $In=date("H:i",strtotime($r2E['I'.$dv])); 
	  $In_15 = strtotime(date($r2E['I'.$dv])) + (15 * 60); $nI15=date('H:i',$In_15); 
	  $Out=date("H:i",strtotime($r2E['O'.$dv])); 
	  $Out_15 = strtotime(date($r2E['O'.$dv])) - (15 * 60); $nO15=date('H:i',$Out_15);
	  	
/**************************** Check Leave Query O ******************************/ 	
	  //Check Total CL Availed in month 
	  $sCL=mysql_query("select SUM(Apply_TotalDay) as aCL from hrm_employee_applyleave where LeaveStatus!=4 AND LeaveStatus!=3 AND LeaveStatus!=2 AND EmployeeID=".$rE['EmployeeID']." AND Apply_FromDate>='".$_POST['Year2']."-".$_POST['Month2']."-01' AND Apply_ToDate<='".$_POST['Year2']."-".$_POST['Month2']."-".$nodinm."' AND (Leave_Type='CL' OR Leave_Type='CH')", $con); $rCL=mysql_fetch_array($sCL);
	  $ssCL=mysql_query("select Count(AttValue) as aaCL from hrm_employee_attendance where EmployeeID=".$rE['EmployeeID']." AND AttDate between '".$_POST['Year2']."-".$_POST['Month2']."-01' AND '".$_POST['Year2']."-".$_POST['Month2']."-".$nodinm."' AND AttValue='CL' group by AttDate", $con); $rrCL=mysql_fetch_array($ssCL);
	  $ssCH=mysql_query("select Count(AttValue) as aaCH from hrm_employee_attendance where EmployeeID=".$rE['EmployeeID']." AND AttDate between '".$_POST['Year2']."-".$_POST['Month2']."-01' AND '".$_POST['Year2']."-".$_POST['Month2']."-".$nodinm."' AND AttValue='CH' group by AttDate", $con); $rrCH=mysql_fetch_array($ssCH);
	    $CountCH=$rrCH['aaCH']/2; $tCL=$rCL['aCL']+$rrCL['aaCL']+$CountCH;
	  //Check Total PL Availed in month
	  $sPL=mysql_query("select SUM(Apply_TotalDay) as aPL from hrm_employee_applyleave where LeaveStatus!=4 AND LeaveStatus!=3 AND LeaveStatus!=2 AND EmployeeID=".$rE['EmployeeID']." AND Apply_FromDate>='".$_POST['Year2']."-".$_POST['Month2']."-01' AND Apply_ToDate<='".$_POST['Year2']."-".$_POST['Month2']."-".$nodinm."' AND (Leave_Type='PL' OR Leave_Type='PH')", $con); $rPL=mysql_fetch_array($sPL);
	  $ssPL=mysql_query("select Count(AttValue) as aaPL from hrm_employee_attendance where EmployeeID=".$rE['EmployeeID']." AND AttDate between '".$_POST['Year2']."-".$_POST['Month2']."-01' AND '".$_POST['Year2']."-".$_POST['Month2']."-".$nodinm."' AND AttValue='PL' group by AttDate", $con); $rrPL=mysql_fetch_array($ssPL);
	  $ssPH=mysql_query("select Count(AttValue) as aaPH from hrm_employee_attendance where EmployeeID=".$rE['EmployeeID']." AND AttDate between '".$_POST['Year2']."-".$_POST['Month2']."-01' AND '".$_POST['Year2']."-".$_POST['Month2']."-".$nodinm."' AND AttValue='PH' group by AttDate", $con); $rrPH=mysql_fetch_array($ssPH); 
	    $CountPH=$rrPH['aaPH']/2; $tPL=$rPL['aPL']+$rrPL['aaPL']+$CountPH;

	  //Check Balce CL & PL & SL in month
	  $op=mysql_query("select OpeningCL,OpeningPL,OpeningSL,CreditedCL,CreditedPL,CreditedSL from hrm_employee_monthlyleave_balance where EmployeeID=".$rE['EmployeeID']." AND Month='".$_POST['Month2']."' AND Year='".$_POST['Year2']."'", $con); 
	  $rowp=mysql_num_rows($op); $rop=mysql_fetch_array($op);
	  if($rowp>0)
	  { $balCL=($rop['OpeningCL']+$rop['CreditedCL'])-$tCL; $balPL=($rop['OpeningPL']+$rop['CreditedPL'])-$tPL; $balSL=($rop['OpeningSL']+$rop['CreditedSL'])-$tSL; }
      else { $Pmm=date('m', strtotime("-1 months", strtotime(date($_POST['Year2']."-".$_POST['Month2']."-".$_POST['Day2'])))); $Pyy=date('Y', strtotime("-1 months", strtotime(date($_POST['Year2']."-".$_POST['Month2']."-".$_POST['Day2'])))); 
	   $op2=mysql_query("select BalanceCL,BalancePL,BalanceSL from hrm_employee_monthlyleave_balance where EmployeeID=".$rE['EmployeeID']." AND Month='".$Pmm."' AND Year='".$Pyy."'", $con); $rop2=mysql_fetch_array($op2);
	   $balCL=$rop2['BalanceCL']-$tCL; $balPL=$rop2['BalancePL']-$tPL; $balSL=$rop2['BalanceSL']-$tSL;
	  }	  
       
	  
	  $schk=mysql_query("select Leave_Type from hrm_employee_applyleave where LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$rE['EmployeeID']." AND Apply_FromDate='".$_POST['Year2']."-".$_POST['Month2']."-".$_POST['Day2']."' AND Apply_ToDate='".$_POST['Year2']."-".$_POST['Month2']."-".$_POST['Day2']."' AND (Leave_Type='SH' OR Leave_Type='CH' OR Leave_Type='PH')", $con); $rowchk=mysql_num_rows($schk); $rchk=mysql_fetch_array($schk);
	  
	  if($rowchk>0){$Lv=$rchk['Leave_Type'];}
	  elseif($balCL>0){$Lv='CH';}
	  elseif($balPL>0){$Lv='PH';}
	  else{$Lv='HF';}
	  
/**************************** Check Leave Query C ******************************/	
   if(($c6=='' OR $c6=='00:00' OR $c6=='00:00:00') AND ($c7=='' OR $c7=='00:00' OR $c7=='00:00:00'))
   {$Att='A'; $Inncnt='Y'; $Outtcnt='Y'; $Innlate=0; $Outtlate=0; $Late=0; $Relax='N'; $Allow='N'; $Af15=0;}	
   elseif(strtotime($c6)<=strtotime($In) AND strtotime($c7)>=strtotime($Out))
   {$Att='P'; $Inncnt='Y'; $Outtcnt='Y'; $Innlate=0; $Outtlate=0; $Late=0; $Relax='N'; $Allow='N'; $Af15=0;}
   elseif(strtotime($c6)>strtotime($nI15) OR strtotime($c7)<strtotime($nO15) OR ($c6!='' AND $c7=='') OR ($c6=='' AND $c7!=''))
   { 
	$Att=$Lv; $Inncnt='Y'; $Outtcnt='Y';
	if(strtotime($c6)>strtotime($nI15) OR $c6==''){$Innlate=1;}else{$Innlate=0;}
	if(strtotime($c7)<strtotime($nO15) OR $c7==''){$Outtlate=1;}else{$Outtlate=0;}
    $Late=$Innlate+$Outtlate;
    $Relax='N'; $Allow='Y'; $Af15=1;
   }
   elseif((strtotime($c6)>strtotime($In) AND strtotime($c6)<=strtotime($nI15)) OR (strtotime($c7)>=strtotime($nO15) AND strtotime($c7)<strtotime($Out)))
   { 
    if(strtotime($c6)>strtotime($In) AND strtotime($c6)<=strtotime($nI15)){$Innlate=1;}else{$Innlate=0;}
    if(strtotime($c7)>=strtotime($nO15) AND strtotime($c7)<strtotime($Out)){$Outtlate=1;}else{$Outtlate=0;}   
    $tt=$Innlate+$Outtlate; if($tt==1){$Late=1;}elseif($tt==2){$Late=2;}else{$Late=0;}
    $Inncnt='Y'; $Outtcnt='Y'; $Af15=0;
  	   
    //Check between 15 minute late in IN/OUT
    $Innn=mysql_query("select SUM(InnLate) as ILate from hrm_employee_attendance where EmployeeID=".$rE['EmployeeID']." AND AttDate>='".$_POST['Year2']."-".$_POST['Month2']."-01' AND AttDate<'".$_POST['Year2']."-".$_POST['Month2']."-".$_POST['Day2']."' AND InnCnt='Y' AND Af15=0 group by AttDate",$con); $rIn=mysql_fetch_assoc($Innn);
    $Outtt=mysql_query("select SUM(OuttLate) as OLate from hrm_employee_attendance where EmployeeID=".$rE['EmployeeID']." AND AttDate>='".$_POST['Year2']."-".$_POST['Month2']."-01' AND AttDate<'".$_POST['Year2']."-".$_POST['Month2']."-".$_POST['Day2']."' AND OuttCnt='Y' AND Af15=0 group by AttDate",$con); $rOut=mysql_fetch_assoc($Outtt);
    $tLate=$rIn['ILate']+$rOut['OLate']+$tt;	   
  
    if($_POST['Day2']!=$nodinm)
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
	elseif($_POST['Day2']==$nodinm)
	{
	 if($tLate<=2){$Att='P'; $Relax='Y'; $Allow='N';}
     elseif($tLate>2){$Att=$Lv; $Relax='N'; $Allow='Y';}
	}
  
   
   }
   else{$Att='A'; $Inncnt='Y'; $Outtcnt='Y'; $Innlate=0; $Outtlate=0; $Late=0; $Relax='N'; $Allow='N'; $Af15=0;}

if(($c6!='' AND $c6!='00:00' AND $c6!='00:00:00') OR ($c7!='' AND $c7!='00:00' AND $c7!='00:00:00'))
{  ////////////ififopen	  

   $chk=mysql_query("select * from hrm_employee_attendance WHERE EmployeeID=".$rE['EmployeeID']." AND AttDate='".$_POST['Year2']."-".$_POST['Month2']."-".$_POST['Day2']."'", $con); $rowchk=mysql_num_rows($chk);
   
   if($rowchk>0){ $reschk=mysql_fetch_assoc($chk); if($reschk['AttValue']=='CL' OR $reschk['AttValue']=='PL' OR $reschk['AttValue']=='SL' OR $reschk['AttValue']=='EL' OR $reschk['AttValue']=='OD' OR $reschk['AttValue']=='P'){ $ltv=$reschk['AttValue']; }else{$ltv=$Att;} 

   $Up=mysql_query("update hrm_employee_attendance set AttValue='".$ltv."', II='".$In.":00', OO='".$Out.":00', Inn='".$c6."', InnCnt='".$Inncnt."', InnLate=".$Innlate.", Outt='".$c7."', OuttCnt='".$Outtcnt."', OuttLate=".$Outtlate.", Late=".$Late.", Relax='".$Relax."', Allow='".$Allow."', Af15=".$Af15." WHERE EmployeeID=".$rE['EmployeeID']." AND AttDate='".$_POST['Year2']."-".$_POST['Month2']."-".$_POST['Day2']."'", $con); 
	} 
   elseif($rowchk==0){ $Up = mysql_query("insert into hrm_employee_attendance(EmployeeID, AttValue, AttDate, Year, YearId, II, OO, Inn, InnCnt, InnLate, Outt, OuttCnt, OuttLate, Late, Relax, Allow, Af15) values(".$rE['EmployeeID'].", '".$Att."', '".$_POST['Year2']."-".$_POST['Month2']."-".$_POST['Day2']."', '".$_POST['Year2']."', ".$YearId.", '".$In.":00', '".$Out.":00', '".$c6."', '".$Inncnt."', ".$Innlate.", '".$c7."', '".$Outtcnt."', ".$Outtlate.", ".$Late.", '".$Relax."', '".$Allow."', ".$Af15.")", $con);
    }

} ////////////ififclose  
  
/**** Leave Update Open ****/
$SqlCL=mysql_query("select count(DISTINCT AttDate)as CL from hrm_employee_attendance where AttValue='CL' AND EmployeeID=".$rE['EmployeeID']." AND (AttDate between '".$_POST['Year2']."-".$_POST['Month2']."-01' AND '".$_POST['Year2']."-".$_POST['Month2']."-".$nodinm."')", $con); 
 $SqlCH=mysql_query("select count(DISTINCT AttDate)as CH from hrm_employee_attendance where AttValue='CH' AND EmployeeID=".$rE['EmployeeID']." AND (AttDate between '".$_POST['Year2']."-".$_POST['Month2']."-01' AND '".$_POST['Year2']."-".$_POST['Month2']."-".$nodinm."')", $con); 
 $SqlSL=mysql_query("select count(DISTINCT AttDate)as SL from hrm_employee_attendance where AttValue='SL' AND EmployeeID=".$rE['EmployeeID']." AND (AttDate between '".$_POST['Year2']."-".$_POST['Month2']."-01' AND '".$_POST['Year2']."-".$_POST['Month2']."-".$nodinm."')", $con); 
 $SqlSH=mysql_query("select count(DISTINCT AttDate)as SH from hrm_employee_attendance where AttValue='SH' AND EmployeeID=".$rE['EmployeeID']." AND (AttDate between '".$_POST['Year2']."-".$_POST['Month2']."-01' AND '".$_POST['Year2']."-".$_POST['Month2']."-".$nodinm."')", $con); 
 $SqlPH=mysql_query("select count(DISTINCT AttDate)as PH from hrm_employee_attendance where AttValue='PH' AND EmployeeID=".$rE['EmployeeID']." AND (AttDate between '".$_POST['Year2']."-".$_POST['Month2']."-01' AND '".$_POST['Year2']."-".$_POST['Month2']."-".$nodinm."')", $con); 
 $SqlPL=mysql_query("select count(DISTINCT AttDate)as PL from hrm_employee_attendance where AttValue='PL' AND EmployeeID=".$rE['EmployeeID']." AND (AttDate between '".$_POST['Year2']."-".$_POST['Month2']."-01' AND '".$_POST['Year2']."-".$_POST['Month2']."-".$nodinm."')", $con); 
 $SqlEL=mysql_query("select count(DISTINCT AttDate)as EL from hrm_employee_attendance where AttValue='EL' AND EmployeeID=".$rE['EmployeeID']." AND (AttDate between '".$_POST['Year2']."-".$_POST['Month2']."-01' AND '".$_POST['Year2']."-".$_POST['Month2']."-".$nodinm."')", $con); 
 $SqlHf=mysql_query("select count(DISTINCT AttDate)as Hf from hrm_employee_attendance where AttValue='HF' AND EmployeeID=".$rE['EmployeeID']." AND (AttDate between '".$_POST['Year2']."-".$_POST['Month2']."-01' AND '".$_POST['Year2']."-".$_POST['Month2']."-".$nodinm."')", $con); 
 $SqlPresent=mysql_query("select count(DISTINCT AttDate)as Present from hrm_employee_attendance where AttValue='P' AND EmployeeID=".$rE['EmployeeID']." AND (AttDate between '".$_POST['Year2']."-".$_POST['Month2']."-01' AND '".$_POST['Year2']."-".$_POST['Month2']."-".$nodinm."')", $con); 
 $SqlAbsent=mysql_query("select count(DISTINCT AttDate)as Absent from hrm_employee_attendance where AttValue='A' AND EmployeeID=".$rE['EmployeeID']." AND (AttDate between '".$_POST['Year2']."-".$_POST['Month2']."-01' AND '".$_POST['Year2']."-".$_POST['Month2']."-".$nodinm."')", $con); 
 $SqlOnDuties=mysql_query("select count(DISTINCT AttDate)as OnDuties from hrm_employee_attendance where AttValue='OD' AND EmployeeID=".$rE['EmployeeID']." AND (AttDate between '".$_POST['Year2']."-".$_POST['Month2']."-01' AND '".$_POST['Year2']."-".$_POST['Month2']."-".$nodinm."')", $con); 
 $SqlHoliday=mysql_query("select count(DISTINCT AttDate)as Holiday from hrm_employee_attendance where AttValue='HO' AND EmployeeID=".$rE['EmployeeID']." AND (AttDate between '".$_POST['Year2']."-".$_POST['Month2']."-01' AND '".$_POST['Year2']."-".$_POST['Month2']."-".$nodinm."')", $con); 
 $SqlELSun=mysql_query("select count(CheckSunday)as SUN from hrm_employee_attendance where CheckSunday='Y' AND EmployeeID=".$rE['EmployeeID']." AND (AttDate between '".$_POST['Year2']."-".$_POST['Month2']."-01' AND '".$_POST['Year2']."-".$_POST['Month2']."-".$nodinm."')", $con); 
 $SqlFL=mysql_query("select count(DISTINCT AttDate)as FL from hrm_employee_attendance where AttValue='FL' AND EmployeeID=".$rE['EmployeeID']." AND (AttDate between '".$_POST['Year2']."-".$_POST['Month2']."-01' AND '".$_POST['Year2']."-".$_POST['Month2']."-".$nodinm."')", $con); 
 $SqlTL=mysql_query("select count(DISTINCT AttDate)as TL from hrm_employee_attendance where AttValue='TL' AND EmployeeID=".$rE['EmployeeID']." AND (AttDate between '".$_POST['Year2']."-".$_POST['Month2']."-01' AND '".$_POST['Year2']."-".$_POST['Month2']."-".$nodinm."')", $con); 
 $SqlML=mysql_query("select count(DISTINCT AttDate)as ML from hrm_employee_attendance where AttValue='ML' AND EmployeeID=".$rE['EmployeeID']." AND (AttDate between '".$_POST['Year2']."-".$_POST['Month2']."-01' AND '".$_POST['Year2']."-".$_POST['Month2']."-".$nodinm."')", $con);
      $ResCL=mysql_fetch_array($SqlCL); $ResCH=mysql_fetch_array($SqlCH); $ResSL=mysql_fetch_array($SqlSL); $ResSH=mysql_fetch_array($SqlSH); $ResPH=mysql_fetch_array($SqlPH); $ResPL=mysql_fetch_array($SqlPL); $ResEL=mysql_fetch_array($SqlEL); $ResFL=mysql_fetch_array($SqlFL); $ResHf=mysql_fetch_array($SqlHf); $ResPresent=mysql_fetch_array($SqlPresent); $ResAbsent=mysql_fetch_array($SqlAbsent); $ResOnDuties=mysql_fetch_array($SqlOnDuties); $ResHoliday=mysql_fetch_array($SqlHoliday); $ResELSun=mysql_fetch_array($SqlELSun); $ResTL=mysql_fetch_array($SqlTL); $ResML=mysql_fetch_array($SqlML);

   $CountCL=$ResCL['CL']; $CountCH=$ResCH['CH']/2; $TotalCL=$CountCL+$CountCH; $CountSL=$ResSL['SL']; 
   $CountSH=$ResSH['SH']/2; $TotalSL=$CountSL+$CountSH; 
   $CountPH=$ResPH['PH']/2; $TotalPL=$ResPL['PL']+$CountPH; $TotalEL=$ResEL['EL']; $TotalFL=$ResFL['FL'];
   $TotalTL=$ResTL['TL']; $TotalML=$ResML['ML']; 
   $TotalLeaveCount=$TotalCL+$TotalSL+$TotalPL+$TotalEL+$TotalFL+$TotalTL+$TotalML; 
   $CountHf=$ResHf['Hf']/2; $TotELSun=$ResELSun['SUN'];
   $TotalPR=$ResPresent['Present']+$CountCH+$CountSH+$CountPH+$CountHf;  
   $TotalAbsent=$ResAbsent['Absent']+$CountHf; $TotalOnDuties=$ResOnDuties['OnDuties']; 
   $TotalHoliday=$ResHoliday['Holiday']; 
   $TotalDayWithSunEL=$TotalPR+$TotalLeaveCount+$TotalOnDuties+$TotalHoliday;
   $TotalPaidDay=$TotalDayWithSunEL-$TotELSun; $TotalWorkingDay=26;
   
/********************************************** Open 1 ***********/
   $SL=mysql_query("select * from hrm_employee_monthlyleave_balance where EmployeeID=".$rE['EmployeeID']." AND Month='".$_POST['Month2']."' AND Year='".$_POST['Year2']."'", $con);  $RowL=mysql_num_rows($SL);
   if($RowL>0)
   { 
    $RL=mysql_fetch_assoc($SL); 
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

    $sUpL=mysql_query("UPDATE hrm_employee_monthlyleave_balance set AvailedCL='".$TotalCL."', AvailedSL='".$TotalSL."', AvailedPL='".$TotalPL."', AvailedEL='".$TotalEL."', AvailedML='".$TotalML."', AvailedOL='".$TotalFL."', AvailedTL='".$TotalTL."', BalanceCL='".$TotBalCL."', BalanceSL='".$TotBalSL."', BalancePL='".$TotBalPL."', BalanceEL='".$TotBalEL."', BalanceML='".$TotBalML."', BalanceOL='".$TotBalFL."', MonthAtt_TotLeave='".$TotalLeaveCount."', MonthAtt_TotOD='".$TotalOnDuties."', MonthAtt_TotHO='".$TotalHoliday."', MonthAtt_TotPR='".$TotalPR."', MonthAtt_TotAP='".$TotalAbsent."', MonthAtt_TotWorkDay='".$TotalWorkingDay."', MonthAtt_TotPaidDay='".$TotalPaidDay."' where EmployeeID=".$rE['EmployeeID']." AND Month='".$_POST['Month2']."' AND Year='".$_POST['Year2']."'", $con); 
   }

/*
   $SqlCL=mysql_query("select count(AttValue)as CL from hrm_employee_attendance where AttValue='CL' AND EmployeeID=".$rE['EmployeeID']." AND AttDate between '".$_POST['Year2']."-".$_POST['Month2']."-01' AND '".$_POST['Year2']."-".$_POST['Month2']."-".$nodinm."' group by AttDate", $con); 
   $SqlCH=mysql_query("select count(AttValue)as CH from hrm_employee_attendance where AttValue='CH' AND EmployeeID=".$rE['EmployeeID']." AND AttDate between '".$_POST['Year2']."-".$_POST['Month2']."-01' AND '".$_POST['Year2']."-".$_POST['Month2']."-".$nodinm."' group by AttDate", $con); 
   $SqlSL=mysql_query("select count(AttValue)as SL from hrm_employee_attendance where AttValue='SL' AND EmployeeID=".$rE['EmployeeID']." AND AttDate between '".$_POST['Year2']."-".$_POST['Month2']."-01' AND '".$_POST['Year2']."-".$_POST['Month2']."-".$nodinm."' group by AttDate", $con); 
   $SqlSH=mysql_query("select count(AttValue)as SH from hrm_employee_attendance where AttValue='SH' AND EmployeeID=".$rE['EmployeeID']." AND AttDate between '".$_POST['Year2']."-".$_POST['Month2']."-01' AND '".$_POST['Year2']."-".$_POST['Month2']."-".$nodinm."' group by AttDate", $con); 
   $SqlPL=mysql_query("select count(AttValue)as PL from hrm_employee_attendance where AttValue='PL' AND EmployeeID=".$rE['EmployeeID']." AND AttDate between '".$_POST['Year2']."-".$_POST['Month2']."-01' AND '".$_POST['Year2']."-".$_POST['Month2']."-".$nodinm."' group by AttDate", $con); 
   $SqlPH=mysql_query("select count(AttValue)as PH from hrm_employee_attendance where AttValue='PH' AND EmployeeID=".$rE['EmployeeID']." AND AttDate between '".$_POST['Year2']."-".$_POST['Month2']."-01' AND '".$_POST['Year2']."-".$_POST['Month2']."-".$nodinm."' group by AttDate", $con); 
   $SqlEL=mysql_query("select count(AttValue)as EL from hrm_employee_attendance where AttValue='EL' AND EmployeeID=".$rE['EmployeeID']." AND AttDate between '".$_POST['Year2']."-".$_POST['Month2']."-01' AND '".$_POST['Year2']."-".$_POST['Month2']."-".$nodinm."' group by AttDate", $con); 
   $SqlFL=mysql_query("select count(AttValue)as FL from hrm_employee_attendance where AttValue='FL' AND EmployeeID=".$rE['EmployeeID']." AND AttDate between '".$_POST['Year2']."-".$_POST['Month2']."-01' AND '".$_POST['Year2']."-".$_POST['Month2']."-".$nodinm."' group by AttDate", $con); 
   $SqlTL=mysql_query("select count(AttValue)as TL from hrm_employee_attendance where AttValue='TL' AND EmployeeID=".$rE['EmployeeID']." AND AttDate between '".$_POST['Year2']."-".$_POST['Month2']."-01' AND '".$_POST['Year2']."-".$_POST['Month2']."-".$nodinm."' group by AttDate", $con); 
   $SqlHf=mysql_query("select count(AttValue)as Hf from hrm_employee_attendance where AttValue='HF' AND EmployeeID=".$rE['EmployeeID']." AND AttDate between '".$_POST['Year2']."-".$_POST['Month2']."-01' AND '".$_POST['Year2']."-".$_POST['Month2']."-".$nodinm."' group by AttDate", $con); 
   $SqlPresent=mysql_query("select count(AttValue)as Present from hrm_employee_attendance where AttValue='P' AND EmployeeID=".$rE['EmployeeID']." AND AttDate between '".$_POST['Year2']."-".$_POST['Month2']."-01' AND '".$_POST['Year2']."-".$_POST['Month2']."-".$nodinm."' group by AttDate", $con); 
   $SqlAbsent=mysql_query("select count(AttValue)as Absent from hrm_employee_attendance where AttValue='A' AND EmployeeID=".$rE['EmployeeID']." AND AttDate between '".$_POST['Year2']."-".$_POST['Month2']."-01' AND '".$_POST['Year2']."-".$_POST['Month2']."-".$nodinm."' group by AttDate", $con); 
   $SqlOnDuties=mysql_query("select count(AttValue)as OnDuties from hrm_employee_attendance where AttValue='OD' AND EmployeeID=".$rE['EmployeeID']." AND AttDate between '".$_POST['Year2']."-".$_POST['Month2']."-01' AND '".$_POST['Year2']."-".$_POST['Month2']."-".$nodinm."' group by AttDate", $con); 
   $SqlHoliday=mysql_query("select count(AttValue)as Holiday from hrm_employee_attendance where AttValue='HO' AND EmployeeID=".$rE['EmployeeID']." AND AttDate between '".$_POST['Year2']."-".$_POST['Month2']."-01' AND '".$_POST['Year2']."-".$_POST['Month2']."-".$nodinm."' group by AttDate", $con); 
   $SqlELSun=mysql_query("select count(CheckSunday)as SUN from hrm_employee_attendance where CheckSunday='Y' AND EmployeeID=".$rE['EmployeeID']." AND AttDate between '".$_POST['Year2']."-".$_POST['Month2']."-01' AND '".$_POST['Year2']."-".$_POST['Month2']."-".$nodinm."' group by AttDate", $con);  
   
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
   $TotalEL=$ResEL['EL'];
   $TotalFL=$ResFL['FL'];
   $TotalTL=$ResTL['TL'];
    
   $TotalLeaveCount=$TotalCL+$TotalSL+$TotalPL+$ResEL['EL']+$ResFL['FL']+$ResTL['TL']; 
   $TotalPR=$ResPresent['Present']+$CountCH+$CountSH+$CountPH+$CountHf;   
   $TotalAbsent=$ResAbsent['Absent']+$CountHf;
   $TotalOnDuties=$ResOnDuties['OnDuties']; $TotalHoliday=$ResHoliday['Holiday']; 
   $TotalDayWithSunEL=$TotalPR+$TotalLeaveCount+$TotalOnDuties+$TotalHoliday;
   $TotalPaidDay=$TotalDayWithSunEL-$ResELSun['SUN'];
   
   $SL=mysql_query("select * from hrm_employee_monthlyleave_balance where EmployeeID=".$rE['EmployeeID']." AND Month='".$_POST['Month2']."' AND Year='".$_POST['Year2']."'", $con);  $RowL=mysql_num_rows($SL);
   if($RowL>0)
   { $RL=mysql_fetch_assoc($SL); 
     if($_POST['Month2']!=1)
	 { $TotBalCL=$RL['OpeningCL']-$TotalCL; $TotBalSL=$RL['OpeningSL']-$TotalSL; 
	   $TotBalPL=$RL['OpeningPL']-$TotalPL; $TotBalEL=$RL['OpeningEL']-$TotalEL; 
	   $TotBalFL=$RL['OpeningOL']-$TotalFL;
	 }  
     elseif($_POST['Month2']==1)
	 { $TotBalCL=$RL['TotCL']-$TotalCL; $TotBalSL=$RL['TotSL']-$TotalSL; $TotBalPL=$RL['TotPL']-$TotalPL;  
	   $TotBalEL=$RL['TotEL']-($TotalEL+$RL['EnCashEL']); $TotBalFL=$RL['TotOL']-$TotalFL;
	 }  
   
   $sUpL=mysql_query("UPDATE hrm_employee_monthlyleave_balance set AvailedCL='".$TotalCL."', AvailedSL='".$TotalSL."', AvailedPL='".$TotalPL."', AvailedOL='".$TotalFL."', AvailedTL='".$TotalTL."', BalanceCL='".$TotBalCL."', BalanceSL='".$TotBalSL."', BalancePL='".$TotBalPL."', BalanceOL='".$TotBalFL."' where EmployeeID=".$rE['EmployeeID']." AND Month='".$_POST['Month2']."' AND Year='".$_POST['Year2']."'", $con);
   }
   
*/

/**** Leave update Close ****/
  
  } //Check 2 Close
	
  } //Check 3 close	

  }  ////Check 1 Close
		
 }  ////Check Main-1 Close 
 else { $ctr++; }
}

   fclose($handle);
   if($sUpL)
   { 
   
///********************* Revised New Calculation Open ****************************///
if(date("w",strtotime(date($_POST['Year2']."-".$_POST['Month2']."-".$nodinm)))>0){$Ld=$nodinm;}
else{$Ld=$nodinm-1;}

/*
if($_POST['Day2']==$Ld) //date("d")==$Ld
{
 $rev=mysql_query("select EmployeeID,TimeApply,InTime,OutTime from hrm_employee where EmpStatus='A' AND TimeApply='Y' AND CompanyId=".$CompanyId,$con); //$nodinm 
 while($resrev=mysql_fetch_assoc($rev))
 {
  $chk=mysql_query("select Max(AttId) as MxId from hrm_employee_attendance where EmployeeID=".$resrev['EmployeeID']." AND ((Innlate=1 AND InnCnt='Y') OR (OuttLate=1 AND OuttCnt='Y')) AND AttDate between '".$_POST['Year2']."-".$_POST['Month2']."-01' AND '".$_POST['Year2']."-".$_POST['Month2']."-".$nodinm."' AND Af15=0 AND Relax='N'",$con); //AND AttValue='P'
  $rowchk=mysql_num_rows($chk);
  $reschk=mysql_fetch_assoc($chk);
  if($reschk['MxId']!='' && $reschk['MxId']>0)
  { 
   /**************************** Check Leave Query O ******************************	
	  //Check Total CL Availed in month 
	  $sCL=mysql_query("select SUM(Apply_TotalDay) as aCL from hrm_employee_applyleave where LeaveStatus!=4 AND LeaveStatus!=3 AND LeaveStatus!=2 AND EmployeeID=".$resrev['EmployeeID']." AND Apply_FromDate>='".$_POST['Year2']."-".$_POST['Month2']."-01' AND Apply_ToDate<='".$_POST['Year2']."-".$_POST['Month2']."-".$nodinm."' AND (Leave_Type='CL' OR Leave_Type='CH')", $con); $rCL=mysql_fetch_array($sCL);
	  $ssCL=mysql_query("select Count(AttValue) as aaCL from hrm_employee_attendance where EmployeeID=".$resrev['EmployeeID']." AND AttDate between '".$_POST['Year2']."-".$_POST['Month2']."-01' AND '".$_POST['Year2']."-".$_POST['Month2']."-".$nodinm."' AND AttValue='CL' group by AttDate", $con); $rrCL=mysql_fetch_array($ssCL);
	  $ssCH=mysql_query("select Count(AttValue) as aaCH from hrm_employee_attendance where EmployeeID=".$resrev['EmployeeID']." AND AttDate between '".$_POST['Year2']."-".$_POST['Month2']."-01' AND '".$_POST['Year2']."-".$_POST['Month2']."-".$nodinm."' AND AttValue='CH' group by AttDate", $con); $rrCH=mysql_fetch_array($ssCH);
	    $CountCH=$rrCH['aaCH']/2; $tCL=$rCL['aCL']+$rrCL['aaCL']+$CountCH;
	  //Check Total PL Availed in month
	  $sPL=mysql_query("select SUM(Apply_TotalDay) as aPL from hrm_employee_applyleave where LeaveStatus!=4 AND LeaveStatus!=3 AND LeaveStatus!=2 AND EmployeeID=".$resrev['EmployeeID']." AND Apply_FromDate>='".$_POST['Year2']."-".$_POST['Month2']."-01' AND Apply_ToDate<='".$_POST['Year2']."-".$_POST['Month2']."-".$nodinm."' AND (Leave_Type='PL' OR Leave_Type='PH')", $con); $rPL=mysql_fetch_array($sPL);
	  $ssPL=mysql_query("select Count(AttValue) as aaPL from hrm_employee_attendance where EmployeeID=".$resrev['EmployeeID']." AND AttDate between '".$_POST['Year2']."-".$_POST['Month2']."-01' AND '".$_POST['Year2']."-".$_POST['Month2']."-".$nodinm."' AND AttValue='PL' group by AttDate", $con); $rrPL=mysql_fetch_array($ssPL);
	  $ssPH=mysql_query("select Count(AttValue) as aaPH from hrm_employee_attendance where EmployeeID=".$resrev['EmployeeID']." AND AttDate between '".$_POST['Year2']."-".$_POST['Month2']."-01' AND '".$_POST['Year2']."-".$_POST['Month2']."-".$nodinm."' AND AttValue='PH' group by AttDate", $con); $rrPH=mysql_fetch_array($ssPH); 
	    $CountPH=$rrPH['aaPH']/2; $tPL=$rPL['aPL']+$rrPL['aaPL']+$CountPH;
	    
	  
	  //Check Balce CL & PL in month
	  $op=mysql_query("select OpeningCL,OpeningPL,OpeningSL,CreditedCL,CreditedPL,CreditedSL from hrm_employee_monthlyleave_balance where EmployeeID=".$resrev['EmployeeID']." AND Month='".$_POST['Month2']."' AND Year='".$_POST['Year2']."'", $con); 
	  $rowp=mysql_num_rows($op); $rop=mysql_fetch_array($op);
	  if($rowp>0)
	  { $balCL=($rop['OpeningCL']+$rop['CreditedCL'])-$tCL; $balPL=($rop['OpeningPL']+$rop['CreditedPL'])-$tPL; $balSL=($rop['OpeningSL']+$rop['CreditedSL'])-$tSL; }
      else { $Pmm=date('m', strtotime("-1 months", strtotime(date($_POST['Year2']."-".$_POST['Month2']."-".$dv)))); $Pyy=date('Y', strtotime("-1 months", strtotime(date($_POST['Year2']."-".$_POST['Month2']."-".$dv)))); 
	   $op2=mysql_query("select BalanceCL,BalancePL,BalanceSL from hrm_employee_monthlyleave_balance where EmployeeID=".$resrev['EmployeeID']." AND Month='".$Pmm."' AND Year='".$Pyy."'", $con); $rop2=mysql_fetch_array($op2);
	   $balCL=$rop2['BalanceCL']-$tCL; $balPL=$rop2['BalancePL']-$tPL; $balSL=$rop2['BalanceSL']-$tSL;
	  }	  
	  
	   if($balCL>0){$Lvv='CH';}
	   elseif($balPL>0){$Lvv='PH';}
	   else{$Lvv='HF';}
	   
	   //elseif($balSL>0){$Lvv='SH';}
	   //else{$Lvv='HF';} 
   /**************************** Check Leave Query C ****************************** 
   $Up=mysql_query("update hrm_employee_attendance set AttValue='".$Lvv."' WHERE AttId=".$reschk['MxId']." AND EmployeeID=".$resrev['EmployeeID'], $con);

/**** Leave Update Open ****
   $SqlCL=mysql_query("select count(AttValue)as CL from hrm_employee_attendance where AttValue='CL' AND EmployeeID=".$resrev['EmployeeID']." AND AttDate between '".$_POST['Year2']."-".$_POST['Month2']."-01' AND '".$_POST['Year2']."-".$_POST['Month2']."-".$nodinm."' group by AttDate", $con); 
   $SqlCH=mysql_query("select count(AttValue)as CH from hrm_employee_attendance where AttValue='CH' AND EmployeeID=".$resrev['EmployeeID']." AND AttDate between '".$_POST['Year2']."-".$_POST['Month2']."-01' AND '".$_POST['Year2']."-".$_POST['Month2']."-".$nodinm."' group by AttDate", $con); 
   $SqlSL=mysql_query("select count(AttValue)as SL from hrm_employee_attendance where AttValue='SL' AND EmployeeID=".$resrev['EmployeeID']." AND AttDate between '".$_POST['Year2']."-".$_POST['Month2']."-01' AND '".$_POST['Year2']."-".$_POST['Month2']."-".$nodinm."' group by AttDate", $con); 
   $SqlSH=mysql_query("select count(AttValue)as SH from hrm_employee_attendance where AttValue='SH' AND EmployeeID=".$resrev['EmployeeID']." AND AttDate between '".$_POST['Year2']."-".$_POST['Month2']."-01' AND '".$_POST['Year2']."-".$_POST['Month2']."-".$nodinm."' group by AttDate", $con); 
   $SqlPL=mysql_query("select count(AttValue)as PL from hrm_employee_attendance where AttValue='PL' AND EmployeeID=".$resrev['EmployeeID']." AND AttDate between '".$_POST['Year2']."-".$_POST['Month2']."-01' AND '".$_POST['Year2']."-".$_POST['Month2']."-".$nodinm."' group by AttDate", $con); 
   $SqlPH=mysql_query("select count(AttValue)as PH from hrm_employee_attendance where AttValue='PH' AND EmployeeID=".$resrev['EmployeeID']." AND AttDate between '".$_POST['Year2']."-".$_POST['Month2']."-01' AND '".$_POST['Year2']."-".$_POST['Month2']."-".$nodinm."' group by AttDate", $con);  
   $ResCL=mysql_fetch_array($SqlCL); $ResCH=mysql_fetch_array($SqlCH); $ResSL=mysql_fetch_array($SqlSL); 
   $ResSH=mysql_fetch_array($SqlSH); $ResPH=mysql_fetch_array($SqlPH); $ResPL=mysql_fetch_array($SqlPL); 
  
   $CountCL=$ResCL['CL']; $CountCH=$ResCH['CH']/2; $TotalCL=$CountCL+$CountCH; 
   $CountSL=$ResSL['SL']; $CountSH=$ResSH['SH']/2; $TotalSL=$CountSL+$CountSH;
   $CountPH=$ResPH['PH']/2; $TotalPL=$ResPL['PL']+$CountPH;   
   
   $SL=mysql_query("select * from hrm_employee_monthlyleave_balance where EmployeeID=".$resrev['EmployeeID']." AND Month='".$_POST['Month2']."' AND Year='".$_POST['Year2']."'", $con);  $RowL=mysql_num_rows($SL);
   if($RowL>0)
   { $RL=mysql_fetch_assoc($SL); 
     if($_POST['Month2']!=1)
	 { $TotBalCL=$RL['OpeningCL']-$TotalCL; $TotBalSL=$RL['OpeningSL']-$TotalSL; 
	   $TotBalPL=$RL['OpeningPL']-$TotalPL; }  
     elseif($_POST['Month2']==1)
	 { $TotBalCL=$RL['TotCL']-$TotalCL; $TotBalSL=$RL['TotSL']-$TotalSL; 
	   $TotBalPL=$RL['TotPL']-$TotalPL; }  
   
   $sUpL=mysql_query("UPDATE hrm_employee_monthlyleave_balance set AvailedCL='".$TotalCL."', AvailedSL='".$TotalSL."', AvailedPL='".$TotalPL."', BalanceCL='".$TotBalCL."', BalanceSL='".$TotBalSL."', BalancePL='".$TotBalPL."' where EmployeeID=".$resrev['EmployeeID']." AND Month='".$_POST['Month2']."' AND Year='".$_POST['Year2']."'", $con);
   }
/**** Leave update Close ****
  
  }  
 }
}
*/
///********************* Revised New Calculation Close ****************************///

    $MsgImpTime= 'Employee time attendance details uploaded successfully...';
   }
  }
 }
}

/************************* Time Attendance Close *********************/




/*** Open Open for Second format xls import time attendance ***/
                 
if(isset($_POST['SaveImport2_TimeEntry']))  //SaveImport_TimeEntry Attendance
{ 

 $mkdate = mktime(0,0,0, $_POST['Month3'], 1, $_POST['Year3']);
 $nodinm = date('t',$mkdate);  //Number of days in the given month (28-31)
 $dv='';
 if($_FILES['Import2_TimeEntry']['error']>0){echo "Error: " . $_FILES['Import2_TimeEntry']['error'] . "<br />";}
 else{  
  if(($handle = fopen($_FILES['Import2_TimeEntry']['tmp_name'], "r"))!== FALSE) {
  $ctr = 1; // used to exclude the CSV header
  while(($data = fgetcsv($handle, 1000, ",")) !== FALSE){ 

  $c0=mysql_real_escape_string($data[0]); $c1=mysql_real_escape_string($data[1]); 
  $c2=mysql_real_escape_string($data[2]); $c3=mysql_real_escape_string($data[3]); 
  $c4=mysql_real_escape_string($data[4]); $c5=mysql_real_escape_string($data[5]); 
  $c6=mysql_real_escape_string($data[6]); $c7=mysql_real_escape_string($data[7]); 
  $c8=mysql_real_escape_string($data[8]); $c9=mysql_real_escape_string($data[9]); 
  $c10=mysql_real_escape_string($data[10]); $c11=mysql_real_escape_string($data[11]); 
  $c12=mysql_real_escape_string($data[12]); $c13=mysql_real_escape_string($data[13]);
  $c14=mysql_real_escape_string($data[14]); $c15=mysql_real_escape_string($data[15]); 
  $c16=mysql_real_escape_string($data[16]); $c17=mysql_real_escape_string($data[17]);  
	  
  if ($ctr>1 AND $c0!='' AND $c1!='') //Check Main-1 Open  //EmpCode=".$c1."
  { 
   
   $sE=mysql_query("select EmployeeID,TimeApply,InTime,OutTime from hrm_employee where EmpCode=".$c1." AND CompanyId=".$CompanyId,$con); $rowE=mysql_num_rows($sE); $rE=mysql_fetch_assoc($sE); 
   if($rowE>0) //Check 1 Open
   {
     
	if($rE['TimeApply']=='Y' AND (($c10!='' AND $c10!='00:00' AND $c10!='00:00:00') OR ($c11!='' AND $c11!='00:00' AND $c11!='00:00:00')))  //Check 2 Open
	{
	  $dv = intval(date("d",strtotime($c0)));
	  $s2E=mysql_query("select S".$dv.", I".$dv.", O".$dv." from hrm_employee_attendance_settime where EmployeeID=".$rE['EmployeeID'],$con); 
	  $row2E=mysql_num_rows($s2E); $r2E=mysql_fetch_assoc($s2E);
	  
	  if($row2E>0) //Check 3 Open
	  {
	  
	  $Inexp=date($c10); $Outexp=date($c11);
	  $In=date("H:i",strtotime($r2E['I'.$dv])); 
	  $In_15 = strtotime(date($r2E['I'.$dv])) + (15 * 60); $nI15=date('H:i',$In_15); 
	  $Out=date("H:i",strtotime($r2E['O'.$dv])); 
	  $Out_15 = strtotime(date($r2E['O'.$dv])) - (15 * 60); $nO15=date('H:i',$Out_15);
	
/**************************** Check Leave Query O ******************************/ 	
	  //Check Total CL Availed in month 
	  $sCL=mysql_query("select SUM(Apply_TotalDay) as aCL from hrm_employee_applyleave where LeaveStatus!=4 AND LeaveStatus!=3 AND LeaveStatus!=2 AND EmployeeID=".$rE['EmployeeID']." AND Apply_FromDate>='".$_POST['Year3']."-".$_POST['Month3']."-01' AND Apply_ToDate<='".$_POST['Year3']."-".$_POST['Month3']."-".$nodinm."' AND (Leave_Type='CL' OR Leave_Type='CH')", $con); $rCL=mysql_fetch_array($sCL);
	  $ssCL=mysql_query("select Count(AttValue) as aaCL from hrm_employee_attendance where EmployeeID=".$rE['EmployeeID']." AND AttDate between '".$_POST['Year3']."-".$_POST['Month3']."-01' AND '".$_POST['Year3']."-".$_POST['Month3']."-".$nodinm."' AND AttValue='CL' group by AttDate", $con); $rrCL=mysql_fetch_array($ssCL);
	  $ssCH=mysql_query("select Count(AttValue) as aaCH from hrm_employee_attendance where EmployeeID=".$rE['EmployeeID']." AND AttDate between '".$_POST['Year3']."-".$_POST['Month3']."-01' AND '".$_POST['Year3']."-".$_POST['Month3']."-".$nodinm."' AND AttValue='CH' group by AttDate", $con); $rrCH=mysql_fetch_array($ssCH);
	    $CountCH=$rrCH['aaCH']/2; $tCL=$rCL['aCL']+$rrCL['aaCL']+$CountCH;
	  //Check Total PL Availed in month
	  $sPL=mysql_query("select SUM(Apply_TotalDay) as aPL from hrm_employee_applyleave where LeaveStatus!=4 AND LeaveStatus!=3 AND LeaveStatus!=2 AND EmployeeID=".$rE['EmployeeID']." AND Apply_FromDate>='".$_POST['Year3']."-".$_POST['Month3']."-01' AND Apply_ToDate<='".$_POST['Year3']."-".$_POST['Month3']."-".$nodinm."' AND (Leave_Type='PL' OR Leave_Type='PH')", $con); $rPL=mysql_fetch_array($sPL);
	  $ssPL=mysql_query("select Count(AttValue) as aaPL from hrm_employee_attendance where EmployeeID=".$rE['EmployeeID']." AND AttDate between '".$_POST['Year3']."-".$_POST['Month3']."-01' AND '".$_POST['Year3']."-".$_POST['Month3']."-".$nodinm."' AND AttValue='PL' group by AttDate", $con); $rrPL=mysql_fetch_array($ssPL);
	  $ssPH=mysql_query("select Count(AttValue) as aaPH from hrm_employee_attendance where EmployeeID=".$rE['EmployeeID']." AND AttDate between '".$_POST['Year3']."-".$_POST['Month3']."-01' AND '".$_POST['Year3']."-".$_POST['Month3']."-".$nodinm."' AND AttValue='PH' group by AttDate", $con); $rrPH=mysql_fetch_array($ssPH); 
	    $CountPH=$rrPH['aaPH']/2; $tPL=$rPL['aPL']+$rrPL['aaPL']+$CountPH;

	  //Check Balce CL & PL & SL in month
	  $op=mysql_query("select OpeningCL,OpeningPL,OpeningSL,CreditedCL,CreditedPL,CreditedSL from hrm_employee_monthlyleave_balance where EmployeeID=".$rE['EmployeeID']." AND Month='".$_POST['Month3']."' AND Year='".$_POST['Year3']."'", $con); 
	  $rowp=mysql_num_rows($op); $rop=mysql_fetch_array($op);
	  if($rowp>0)
	  { $balCL=($rop['OpeningCL']+$rop['CreditedCL'])-$tCL; $balPL=($rop['OpeningPL']+$rop['CreditedPL'])-$tPL; $balSL=($rop['OpeningSL']+$rop['CreditedSL'])-$tSL; }
      else { $Pmm=date('m', strtotime("-1 months", strtotime(date($_POST['Year3']."-".$_POST['Month3']."-".$dv)))); $Pyy=date('Y', strtotime("-1 months", strtotime(date($_POST['Year3']."-".$_POST['Month3']."-".$dv)))); 
	   $op2=mysql_query("select BalanceCL,BalancePL,BalanceSL from hrm_employee_monthlyleave_balance where EmployeeID=".$rE['EmployeeID']." AND Month='".$Pmm."' AND Year='".$Pyy."'", $con); $rop2=mysql_fetch_array($op2);
	   $balCL=$rop2['BalanceCL']-$tCL; $balPL=$rop2['BalancePL']-$tPL; $balSL=$rop2['BalanceSL']-$tSL;
	  }	  
       
	  
	  $schk=mysql_query("select Leave_Type from hrm_employee_applyleave where LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$rE['EmployeeID']." AND Apply_FromDate='".$_POST['Year3']."-".$_POST['Month3']."-".$dv."' AND Apply_ToDate='".$_POST['Year3']."-".$_POST['Month3']."-".$dv."' AND (Leave_Type='SH' OR Leave_Type='CH' OR Leave_Type='PH')", $con); $rowchk=mysql_num_rows($schk); $rchk=mysql_fetch_array($schk);
	  
	  if($rowchk>0){$Lv=$rchk['Leave_Type'];}
	  elseif($balCL>0){$Lv='CH';}
	  elseif($balPL>0){$Lv='PH';}
	  else{$Lv='HF';}
	  
/**************************** Check Leave Query C ******************************/	
	
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
    $Innn=mysql_query("select SUM(InnLate) as ILate from hrm_employee_attendance where EmployeeID=".$rE['EmployeeID']." AND AttDate>='".$_POST['Year3']."-".$_POST['Month3']."-01' AND AttDate<'".$_POST['Year3']."-".$_POST['Month3']."-".$dv."' AND InnCnt='Y' AND Af15=0 group by AttDate",$con); 
    $Outtt=mysql_query("select SUM(OuttLate) as OLate from hrm_employee_attendance where EmployeeID=".$rE['EmployeeID']." AND AttDate>='".$_POST['Year3']."-".$_POST['Month3']."-01' AND AttDate<'".$_POST['Year3']."-".$_POST['Month3']."-".$dv."' AND OuttCnt='Y' AND Af15=0 group by AttDate",$con); 
	$rIn=mysql_fetch_assoc($Innn); $rOut=mysql_fetch_assoc($Outtt);
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
 
   $chk=mysql_query("select * from hrm_employee_attendance WHERE EmployeeID=".$rE['EmployeeID']." AND AttDate='".$_POST['Year3']."-".$_POST['Month3']."-".$dv."'", $con); $rowchk=mysql_num_rows($chk);
   
   if($rowchk>0){ $reschk=mysql_fetch_assoc($chk); if($reschk['AttValue']=='CL' OR $reschk['AttValue']=='PL' OR $reschk['AttValue']=='SL' OR $reschk['AttValue']=='EL' OR $reschk['AttValue']=='OD' OR $reschk['AttValue']=='P'){ $ltv=$reschk['AttValue']; }else{$ltv=$Att;}
    

   $Up=mysql_query("update hrm_employee_attendance set AttValue='".$ltv."', II='".$In.":00', OO='".$Out.":00', Inn='".$c10."', InnCnt='".$Inncnt."', InnLate=".$Innlate.", Outt='".$c11."', OuttCnt='".$Outtcnt."', OuttLate=".$Outtlate.", Late=".$Late.", Relax='".$Relax."', Allow='".$Allow."', Af15=".$Af15." WHERE EmployeeID=".$rE['EmployeeID']." AND AttDate='".$_POST['Year3']."-".$_POST['Month3']."-".$dv."'", $con); 
	} 
   elseif($rowchk==0){
    $Up = mysql_query("insert into hrm_employee_attendance(EmployeeID, AttValue, AttDate, Year, YearId, II, OO, Inn, InnCnt, InnLate, Outt, OuttCnt, OuttLate, Late, Relax, Allow, Af15) values(".$rE['EmployeeID'].", '".$Att."', '".$_POST['Year3']."-".$_POST['Month3']."-".$dv."', '".$_POST['Year3']."', ".$YearId.", '".$In.":00', '".$Out.":00', '".$c10."', '".$Inncnt."', ".$Innlate.", '".$c11."', '".$Outtcnt."', ".$Outtlate.", ".$Late.", '".$Relax."', '".$Allow."', ".$Af15.")", $con);
    }

} //////////ififclose
    
  
/**** Leave Update Open ****/ 
   $SqlCL=mysql_query("select count(DISTINCT AttDate)as CL from hrm_employee_attendance where AttValue='CL' AND EmployeeID=".$rE['EmployeeID']." AND AttDate between '".$_POST['Year3']."-".$_POST['Month3']."-01' AND '".$_POST['Year3']."-".$_POST['Month3']."-".$nodinm."'", $con); 
   $SqlCH=mysql_query("select count(DISTINCT AttDate)as CH from hrm_employee_attendance where AttValue='CH' AND EmployeeID=".$rE['EmployeeID']." AND AttDate between '".$_POST['Year3']."-".$_POST['Month3']."-01' AND '".$_POST['Year3']."-".$_POST['Month3']."-".$nodinm."'", $con); 
   $SqlSL=mysql_query("select count(DISTINCT AttDate)as SL from hrm_employee_attendance where AttValue='SL' AND EmployeeID=".$rE['EmployeeID']." AND AttDate between '".$_POST['Year3']."-".$_POST['Month3']."-01' AND '".$_POST['Year3']."-".$_POST['Month3']."-".$nodinm."'", $con); 
   $SqlSH=mysql_query("select count(DISTINCT AttDate)as SH from hrm_employee_attendance where AttValue='SH' AND EmployeeID=".$rE['EmployeeID']." AND AttDate between '".$_POST['Year3']."-".$_POST['Month3']."-01' AND '".$_POST['Year3']."-".$_POST['Month3']."-".$nodinm."'", $con); 
   $SqlPL=mysql_query("select count(DISTINCT AttDate)as PL from hrm_employee_attendance where AttValue='PL' AND EmployeeID=".$rE['EmployeeID']." AND AttDate between '".$_POST['Year3']."-".$_POST['Month3']."-01' AND '".$_POST['Year3']."-".$_POST['Month3']."-".$nodinm."'", $con); 
   $SqlPH=mysql_query("select count(DISTINCT AttDate)as PH from hrm_employee_attendance where AttValue='PH' AND EmployeeID=".$rE['EmployeeID']." AND AttDate between '".$_POST['Year3']."-".$_POST['Month3']."-01' AND '".$_POST['Year3']."-".$_POST['Month3']."-".$nodinm."'", $con); 
   $SqlEL=mysql_query("select count(DISTINCT AttDate)as EL from hrm_employee_attendance where AttValue='EL' AND EmployeeID=".$rE['EmployeeID']." AND AttDate between '".$_POST['Year3']."-".$_POST['Month3']."-01' AND '".$_POST['Year3']."-".$_POST['Month3']."-".$nodinm."'", $con); 
   $SqlFL=mysql_query("select count(DISTINCT AttDate)as FL from hrm_employee_attendance where AttValue='FL' AND EmployeeID=".$rE['EmployeeID']." AND AttDate between '".$_POST['Year3']."-".$_POST['Month3']."-01' AND '".$_POST['Year3']."-".$_POST['Month3']."-".$nodinm."'", $con); 
   $SqlTL=mysql_query("select count(DISTINCT AttDate)as TL from hrm_employee_attendance where AttValue='TL' AND EmployeeID=".$rE['EmployeeID']." AND AttDate between '".$_POST['Year3']."-".$_POST['Month3']."-01' AND '".$_POST['Year3']."-".$_POST['Month3']."-".$nodinm."'", $con); 
   $SqlHf=mysql_query("select count(DISTINCT AttDate)as Hf from hrm_employee_attendance where AttValue='HF' AND EmployeeID=".$rE['EmployeeID']." AND AttDate between '".$_POST['Year3']."-".$_POST['Month3']."-01' AND '".$_POST['Year3']."-".$_POST['Month3']."-".$nodinm."'", $con); 
   $SqlPresent=mysql_query("select count(DISTINCT AttDate)as Present from hrm_employee_attendance where AttValue='P' AND EmployeeID=".$rE['EmployeeID']." AND AttDate between '".$_POST['Year3']."-".$_POST['Month3']."-01' AND '".$_POST['Year3']."-".$_POST['Month3']."-".$nodinm."'", $con); 
   $SqlAbsent=mysql_query("select count(DISTINCT AttDate)as Absent from hrm_employee_attendance where AttValue='A' AND EmployeeID=".$rE['EmployeeID']." AND AttDate between '".$_POST['Year3']."-".$_POST['Month3']."-01' AND '".$_POST['Year3']."-".$_POST['Month3']."-".$nodinm."'", $con); 
   $SqlOnDuties=mysql_query("select count(DISTINCT AttDate)as OnDuties from hrm_employee_attendance where AttValue='OD' AND EmployeeID=".$rE['EmployeeID']." AND AttDate between '".$_POST['Year3']."-".$_POST['Month3']."-01' AND '".$_POST['Year3']."-".$_POST['Month3']."-".$nodinm."'", $con);
   $SqlHoliday=mysql_query("select count(DISTINCT AttDate)as Holiday from hrm_employee_attendance where AttValue='HO' AND EmployeeID=".$rE['EmployeeID']." AND AttDate between '".$_POST['Year3']."-".$_POST['Month3']."-01' AND '".$_POST['Year3']."-".$_POST['Month3']."-".$nodinm."'", $con); 
   $SqlELSun=mysql_query("select count(DISTINCT AttDate)as SUN from hrm_employee_attendance where CheckSunday='Y' AND EmployeeID=".$rE['EmployeeID']." AND AttDate between '".$_POST['Year3']."-".$_POST['Month3']."-01' AND '".$_POST['Year3']."-".$_POST['Month3']."-".$nodinm."'", $con);  
   
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
   $TotalEL=$ResEL['EL'];
   $TotalFL=$ResFL['FL'];
   $TotalTL=$ResTL['TL'];
    
   $TotalLeaveCount=$TotalCL+$TotalSL+$TotalPL+$ResEL['EL']+$ResFL['FL']+$ResTL['TL']; 
   $TotalPR=$ResPresent['Present']+$CountCH+$CountSH+$CountPH+$CountHf;   
   $TotalAbsent=$ResAbsent['Absent']+$CountHf;
   $TotalOnDuties=$ResOnDuties['OnDuties']; $TotalHoliday=$ResHoliday['Holiday']; 
   $TotalDayWithSunEL=$TotalPR+$TotalLeaveCount+$TotalOnDuties+$TotalHoliday;
   $TotalPaidDay=$TotalDayWithSunEL-$ResELSun['SUN'];
   
   $SL=mysql_query("select * from hrm_employee_monthlyleave_balance where EmployeeID=".$rE['EmployeeID']." AND Month='".$_POST['Month3']."' AND Year='".$_POST['Year3']."'", $con);  $RowL=mysql_num_rows($SL);
   if($RowL>0)
   { $RL=mysql_fetch_assoc($SL); 
     if($_POST['Month3']!=1)
	 { $TotBalCL=$RL['OpeningCL']-$TotalCL; $TotBalSL=$RL['OpeningSL']-$TotalSL; 
	   $TotBalPL=$RL['OpeningPL']-$TotalPL; $TotBalEL=$RL['OpeningEL']-$TotalEL; 
	   $TotBalFL=$RL['OpeningOL']-$TotalFL; 
	 }  
     elseif($_POST['Month3']==1)
	 { $TotBalCL=$RL['TotCL']-$TotalCL; $TotBalSL=$RL['TotSL']-$TotalSL; $TotBalPL=$RL['TotPL']-$TotalPL;  
	   $TotBalEL=$RL['TotEL']-($TotalEL+$RL['EnCashEL']); $TotBalFL=$RL['TotOL']-$TotalFL;
	   
	 }  
   
     $sUpL=mysql_query("UPDATE hrm_employee_monthlyleave_balance set AvailedCL='".$TotalCL."', AvailedSL='".$TotalSL."', AvailedPL='".$TotalPL."', AvailedEL='".$TotalEL."', AvailedOL='".$TotalFL."', AvailedTL='".$TotalTL."', BalanceCL='".$TotBalCL."', BalanceSL='".$TotBalSL."', BalancePL='".$TotBalPL."', BalanceEL='".$TotBalEL."', BalanceOL='".$TotBalFL."' where EmployeeID=".$rE['EmployeeID']." AND Month='".$_POST['Month3']."' AND Year='".$_POST['Year3']."'", $con);
   }
/**** Leave update Close ****/
  
  } //Check 3 Close
	
  } //Check 2 close	

  }  ////Check 1 Close
		
 }  ////Check Main-1 Close 
 else { $ctr++; }
}

   fclose($handle);
   if($sUpL)
   { 
    
///********************* Revised New Calculation Open ****************************///
if(date("w",strtotime(date($_POST['Year3']."-".$_POST['Month3']."-".$nodinm)))>0){$Ld=$nodinm;}
else{$Ld=$nodinm-1;}

/*
if($dv==$Ld)
{
 $rev=mysql_query("select EmployeeID,TimeApply,InTime,OutTime from hrm_employee where EmpStatus='A' AND TimeApply='Y' AND CompanyId=".$CompanyId,$con); //$nodinm 
 while($resrev=mysql_fetch_assoc($rev))
 { 
  $chk=mysql_query("select Max(AttId) as MxId from hrm_employee_attendance where EmployeeID=".$resrev['EmployeeID']." AND ((Innlate=1 AND InnCnt='Y') OR (OuttLate=1 AND OuttCnt='Y')) AND AttDate between '".$_POST['Year3']."-".$_POST['Month3']."-01' AND '".$_POST['Year3']."-".$_POST['Month3']."-".$nodinm."' AND Af15=0 AND Relax='N' AND AttValue = 'P'",$con); $rowchk=mysql_num_rows($chk); 
  $reschk=mysql_fetch_assoc($chk);
  if($reschk['MxId']!='')
  { 
  
   /**************************** Check Leave Query O ****************************** 	
	  //Check Total CL Availed in month 
	  $sCL=mysql_query("select SUM(Apply_TotalDay) as aCL from hrm_employee_applyleave where LeaveStatus!=4 AND LeaveStatus!=3 AND LeaveStatus!=2 AND EmployeeID=".$resrev['EmployeeID']." AND Apply_FromDate>='".$_POST['Year3']."-".$_POST['Month3']."-01' AND Apply_ToDate<='".$_POST['Year3']."-".$_POST['Month3']."-".$nodinm."' AND (Leave_Type='CL' OR Leave_Type='CH')", $con); $rCL=mysql_fetch_array($sCL);
	  $ssCL=mysql_query("select Count(AttValue) as aaCL from hrm_employee_attendance where EmployeeID=".$resrev['EmployeeID']." AND AttDate between '".$_POST['Year3']."-".$_POST['Month3']."-01' AND '".$_POST['Year3']."-".$_POST['Month3']."-".$nodinm."' AND AttValue='CL' group by AttDate", $con); $rrCL=mysql_fetch_array($ssCL);
	  $ssCH=mysql_query("select Count(AttValue) as aaCH from hrm_employee_attendance where EmployeeID=".$resrev['EmployeeID']." AND AttDate between '".$_POST['Year3']."-".$_POST['Month3']."-01' AND '".$_POST['Year3']."-".$_POST['Month3']."-".$nodinm."' AND AttValue='CH' group by AttDate", $con); $rrCH=mysql_fetch_array($ssCH);
	    $CountCH=$rrCH['aaCH']/2; $tCL=$rCL['aCL']+$rrCL['aaCL']+$CountCH;
	  //Check Total PL Availed in month
	  $sPL=mysql_query("select SUM(Apply_TotalDay) as aPL from hrm_employee_applyleave where LeaveStatus!=4 AND LeaveStatus!=3 AND LeaveStatus!=2 AND EmployeeID=".$resrev['EmployeeID']." AND Apply_FromDate>='".$_POST['Year3']."-".$_POST['Month3']."-01' AND Apply_ToDate<='".$_POST['Year3']."-".$_POST['Month3']."-".$nodinm."' AND (Leave_Type='PL' OR Leave_Type='PH')", $con); $rPL=mysql_fetch_array($sPL);
	  $ssPL=mysql_query("select Count(AttValue) as aaPL from hrm_employee_attendance where EmployeeID=".$resrev['EmployeeID']." AND AttDate between '".$_POST['Year3']."-".$_POST['Month3']."-01' AND '".$_POST['Year3']."-".$_POST['Month3']."-".$nodinm."' AND AttValue='PL' group by AttDate", $con); $rrPL=mysql_fetch_array($ssPL);
	  $ssPH=mysql_query("select Count(AttValue) as aaPH from hrm_employee_attendance where EmployeeID=".$resrev['EmployeeID']." AND AttDate between '".$_POST['Year3']."-".$_POST['Month3']."-01' AND '".$_POST['Year3']."-".$_POST['Month3']."-".$nodinm."' AND AttValue='PH' group by AttDate", $con); $rrPH=mysql_fetch_array($ssPH); 
	    $CountPH=$rrPH['aaPH']/2; $tPL=$rPL['aPL']+$rrPL['aaPL']+$CountPH;
	  
	  //Check Balce CL & PL in month
	  $op=mysql_query("select OpeningCL,OpeningPL,OpeningSL,CreditedCL,CreditedPL,CreditedSL from hrm_employee_monthlyleave_balance where EmployeeID=".$resrev['EmployeeID']." AND Month='".$_POST['Month3']."' AND Year='".$_POST['Year3']."'", $con); 
	  $rowp=mysql_num_rows($op); $rop=mysql_fetch_array($op);
	  if($rowp>0)
	  { $balCL=($rop['OpeningCL']+$rop['CreditedCL'])-$tCL; $balPL=($rop['OpeningPL']+$rop['CreditedPL'])-$tPL; $balSL=($rop['OpeningSL']+$rop['CreditedSL'])-$tSL; }
      else { $Pmm=date('m', strtotime("-1 months", strtotime(date($_POST['Year3']."-".$_POST['Month3']."-".$dv)))); $Pyy=date('Y', strtotime("-1 months", strtotime(date($_POST['Year3']."-".$_POST['Month3']."-".$dv)))); 
	   $op2=mysql_query("select BalanceCL,BalancePL,BalanceSL from hrm_employee_monthlyleave_balance where EmployeeID=".$resrev['EmployeeID']." AND Month='".$Pmm."' AND Year='".$Pyy."'", $con); $rop2=mysql_fetch_array($op2);
	   $balCL=$rop2['BalanceCL']-$tCL; $balPL=$rop2['BalancePL']-$tPL; $balSL=$rop2['BalanceSL']-$tSL;
	  }	  
	   if($balCL>0){$Lvv='CH';}
	   elseif($balPL>0){$Lvv='PH';}
	   else{$Lvv='HF';}
	   
	   //elseif($balSL>0){$Lvv='SH';}
	   //else{$Lvv='HF';} 
   /**************************** Check Leave Query C ******************************
   $Up=mysql_query("update hrm_employee_attendance set AttValue='".$Lvv."' WHERE AttId=".$reschk['MxId']." AND EmployeeID=".$resrev['EmployeeID'], $con);

/**** Leave Update Open ****
   $SqlCL=mysql_query("select count(AttValue)as CL from hrm_employee_attendance where AttValue='CL' AND EmployeeID=".$resrev['EmployeeID']." AND AttDate between '".$_POST['Year3']."-".$_POST['Month3']."-01' AND '".$_POST['Year3']."-".$_POST['Month3']."-".$nodinm."' group by AttDate", $con); 
   $SqlCH=mysql_query("select count(AttValue)as CH from hrm_employee_attendance where AttValue='CH' AND EmployeeID=".$resrev['EmployeeID']." AND AttDate between '".$_POST['Year3']."-".$_POST['Month3']."-01' AND '".$_POST['Year3']."-".$_POST['Month3']."-".$nodinm."' group by AttDate", $con); 
   $SqlSL=mysql_query("select count(AttValue)as SL from hrm_employee_attendance where AttValue='SL' AND EmployeeID=".$resrev['EmployeeID']." AND AttDate between '".$_POST['Year3']."-".$_POST['Month3']."-01' AND '".$_POST['Year3']."-".$_POST['Month3']."-".$nodinm."' group by AttDate", $con); 
   $SqlSH=mysql_query("select count(AttValue)as SH from hrm_employee_attendance where AttValue='SH' AND EmployeeID=".$resrev['EmployeeID']." AND AttDate between '".$_POST['Year3']."-".$_POST['Month3']."-01' AND '".$_POST['Year3']."-".$_POST['Month3']."-".$nodinm."' group by AttDate", $con); 
   $SqlPL=mysql_query("select count(AttValue)as PL from hrm_employee_attendance where AttValue='PL' AND EmployeeID=".$resrev['EmployeeID']." AND AttDate between '".$_POST['Year3']."-".$_POST['Month3']."-01' AND '".$_POST['Year3']."-".$_POST['Month3']."-".$nodinm."' group by AttDate", $con); 
   $SqlPH=mysql_query("select count(AttValue)as PH from hrm_employee_attendance where AttValue='PH' AND EmployeeID=".$resrev['EmployeeID']." AND AttDate between '".$_POST['Year3']."-".$_POST['Month3']."-01' AND '".$_POST['Year3']."-".$_POST['Month3']."-".$nodinm."' group by AttDate", $con);  
   $ResCL=mysql_fetch_array($SqlCL); $ResCH=mysql_fetch_array($SqlCH); $ResSL=mysql_fetch_array($SqlSL); 
   $ResSH=mysql_fetch_array($SqlSH); $ResPH=mysql_fetch_array($SqlPH); $ResPL=mysql_fetch_array($SqlPL);   
   $CountCL=$ResCL['CL']; $CountCH=$ResCH['CH']/2; $TotalCL=$CountCL+$CountCH; 
   $CountSL=$ResSL['SL']; $CountSH=$ResSH['SH']/2; $TotalSL=$CountSL+$CountSH;
   $CountPH=$ResPH['PH']/2; $TotalPL=$ResPL['PL']+$CountPH;   
   
   $SL=mysql_query("select * from hrm_employee_monthlyleave_balance where EmployeeID=".$resrev['EmployeeID']." AND Month='".$_POST['Month3']."' AND Year='".$_POST['Year3']."'", $con);  $RowL=mysql_num_rows($SL);
   if($RowL>0)
   { $RL=mysql_fetch_assoc($SL); 
     if($_POST['Month3']!=1)
	 { $TotBalCL=$RL['OpeningCL']-$TotalCL; $TotBalSL=$RL['OpeningSL']-$TotalSL; 
	   $TotBalPL=$RL['OpeningPL']-$TotalPL; }  
     elseif($_POST['Month3']==1)
	 { $TotBalCL=$RL['TotCL']-$TotalCL; $TotBalSL=$RL['TotSL']-$TotalSL; 
	   $TotBalPL=$RL['TotPL']-$TotalPL; }  
   
   $sUpL=mysql_query("UPDATE hrm_employee_monthlyleave_balance set AvailedCL='".$TotalCL."', AvailedSL='".$TotalSL."', AvailedPL='".$TotalPL."', BalanceCL='".$TotBalCL."', BalanceSL='".$TotBalSL."', BalancePL='".$TotBalPL."' where EmployeeID=".$resrev['EmployeeID']." AND Month='".$_POST['Month3']."' AND Year='".$_POST['Year3']."'", $con);
   }
/**** Leave update Close ****
  
  }  
 }
} 
*/
///********************* Revised New Calculation Close ****************************///	
		
    $MsgImpTime2= 'Employee time attendance details uploaded successfully...';
   }
  }
 }
}

/*** Close Close for Second format xls import time attendance ***/








if($_REQUEST['action']=='MorEveDelete')
{ 
 if($_REQUEST['m6']==1){$Month6='JANUARY';}elseif($_REQUEST['m6']==2){$Month6='FEBRUARY';}elseif($_REQUEST['m6']==3){$Month6='MARCH';}elseif($_REQUEST['m6']==4){$Month6='APRIL';}elseif($_REQUEST['m6']==5){$Month6='MAY';}elseif($_REQUEST['m6']==6){$Month6='JUNE';}elseif($_REQUEST['m6']==7){$Month6='JULY';}elseif($_REQUEST['m6']==8){$Month6='AUGUST';}elseif($_REQUEST['m6']==9){$Month6='SEPTEMBER';}elseif($_REQUEST['m6']==10){$Month6='OCTOBER';}elseif($_REQUEST['m6']==11){$Month6='NOVEMBER';}elseif($_REQUEST['m6']==12){$Month6='DECEMBER';}
$sqlDel=mysql_query("delete from hrm_employee_moreve_report where MorEveDate>='".$_REQUEST['Y6']."-".$_REQUEST['m6']."-01' AND MorEveDate<='".$_REQUEST['Y6']."-".$_REQUEST['m6']."-31'", $con); if($sqlDel){ $MsgEntryDel='Mor-Eve reports of month '.$Month6.' deleted successfully'; }
}

?>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php include_once('../Title.php'); ?></title>

<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style> .font { color:#ffffff; font-family:Times New Roman; font-size:15px; width:200px;} .font1 { font-family:Times New Roman; font-size:12px; height:14px; width:200px; } 
.All_350{font-size:11px; height:18px; width:350px;}
.font2 { font-size:12px;width:260px;height:18px;} .font4 { color:#1FAD34; font-family:Georgia; font-size:15px;} 
.span {display:none; font-family:Courier New; font-size:14px; }.span1 {display:block; font-family:Courier New; font-size:14px; }
.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;}
.SaveButton {background-image:url(images/save.gif); width:20px; height:20px; background-repeat:no-repeat; background-color:#FFFFFF; border-color:#FFFFFF; border-bottom:inherit;}
.EditSelect { font-family:Georgia; font-size:12px; height:18px;}
.EditInput { font-family:Georgia; font-size:12px; height:19px;}
.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}
.tit{color:#2D002D;font-family:Times New Roman;font-size:18px;font-weight:bold;text-align:center;}
.tit2{color:#008000;font-family:Times New Roman;font-size:16px;font-weight:bold;}
.tit3{color:#2D002D;font-family:Times New Roman;font-size:14px;font-weight:bold;text-align:right;}
</style>
<script type="text/javascript" src="js/stuHover.js"></script>
<script type="text/javascript" src="js/MasterAjaxCall.js"></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<script type="text/javascript" language="javascript">
<!-----------Export 1------------->
function FunMonth(mnt)
{ var Dept=document.getElementById("Dept").value; var Dept2=document.getElementById("Dept2").value; var d=document.getElementById("Day").value; var m=document.getElementById("Monthh").value; var Y=document.getElementById("Year").value; var d2=document.getElementById("Day2").value; var m2=document.getElementById("Month2").value; var Y2=document.getElementById("Year2").value; var m3=document.getElementById("Month3").value; var Y3=document.getElementById("Year3").value; var m4=document.getElementById("Month4").value; var Y4=document.getElementById("Year4").value; var m5=document.getElementById("Month5").value; var Y5=document.getElementById("Year5").value; var m6=document.getElementById("Month6").value; var Y6=document.getElementById("Year6").value; var m7=document.getElementById("Month7").value; var Y7=document.getElementById("Year7").value; 
var x="RepActMorEve.php?yy=4%rer&uu=true&rr=false&tt=122&er=wes&false=true&valueMain=23&d="+d+"&m="+mnt+"&Y="+Y+"&d2="+d2+"&m2="+m2+"&Y2="+Y2+"&m3="+m3+"&Y3="+Y3+"&D="+Dept+"&m4="+m4+"&Y4="+Y4+"&m5="+m5+"&Y5="+Y5+"&D2="+Dept2+"&m6="+m6+"&Y6="+Y6+"&m7="+m7+"&Y7="+Y7; window.location=x; }
function FunYear(Yer)
{ var Dept=document.getElementById("Dept").value; var Dept2=document.getElementById("Dept2").value; var d=document.getElementById("Day").value; var m=document.getElementById("Monthh").value; var Y=document.getElementById("Year").value; var d2=document.getElementById("Day2").value; var m2=document.getElementById("Month2").value; var Y2=document.getElementById("Year2").value; var m3=document.getElementById("Month3").value; var Y3=document.getElementById("Year3").value; var m4=document.getElementById("Month4").value; var Y4=document.getElementById("Year4").value; var m5=document.getElementById("Month5").value; var Y5=document.getElementById("Year5").value; var m6=document.getElementById("Month6").value; var Y6=document.getElementById("Year6").value; var m7=document.getElementById("Month7").value; var Y7=document.getElementById("Year7").value;  
var x="RepActMorEve.php?yy=4%rer&uu=true&rr=false&tt=122&er=wes&false=true&valueMain=23&d="+d+"&m="+m+"&Y="+Yer+"&d2="+d2+"&m2="+m2+"&Y2="+Y2+"&m3="+m3+"&Y3="+Y3+"&D="+Dept+"&m4="+m4+"&Y4="+Y4+"&m5="+m5+"&Y5="+Y5+"&D2="+Dept2+"&m6="+m6+"&Y6="+Y6+"&m7="+m7+"&Y7="+Y7; window.location=x; }
function FunEdit(n)
{ document.getElementById("Import_Gps"+n).disabled=false; document.getElementById("EditImport_Gps"+n).style.display='none'; document.getElementById("SaveImport_Gps"+n).style.display='block'; }


function FunDay2(dt)
{ var Dept=document.getElementById("Dept").value; var Dept2=document.getElementById("Dept2").value; var d=document.getElementById("Day").value; var m=document.getElementById("Month").value; var Y=document.getElementById("Year").value; var d2=document.getElementById("Day2").value; var m2=document.getElementById("Month2").value; var Y2=document.getElementById("Year2").value; var m3=document.getElementById("Month3").value; var Y3=document.getElementById("Year3").value; var m4=document.getElementById("Month4").value; var Y4=document.getElementById("Year4").value; var m5=document.getElementById("Month5").value; var Y5=document.getElementById("Year5").value; var m6=document.getElementById("Month6").value; var Y6=document.getElementById("Year6").value; var m7=document.getElementById("Month7").value; var Y7=document.getElementById("Year7").value;
 var x="RepActMorEve.php?yy=4%rer&uu=true&rr=false&tt=122&er=wes&false=true&valueMain=23&d="+d+"&m="+m+"&Y="+Y+"&d2="+dt+"&m2="+m2+"&Y2="+Y2+"&m3="+m3+"&Y3="+Y3+"&D="+Dept+"&m4="+m4+"&Y4="+Y4+"&m5="+m5+"&Y5="+Y5+"&D2="+Dept2+"&m6="+m6+"&Y6="+Y6+"&m7="+m7+"&Y7="+Y7; window.location=x; }
function FunMonth2(mnt)
{ var Dept=document.getElementById("Dept").value; var Dept2=document.getElementById("Dept2").value; var d=document.getElementById("Day").value; var m=document.getElementById("Month").value; var Y=document.getElementById("Year").value; var d2=document.getElementById("Day2").value; var m2=document.getElementById("Month2").value; var Y2=document.getElementById("Year2").value; var m3=document.getElementById("Month3").value; var Y3=document.getElementById("Year3").value; var m4=document.getElementById("Month4").value; var Y4=document.getElementById("Year4").value; var m5=document.getElementById("Month5").value; var Y5=document.getElementById("Year5").value; var m6=document.getElementById("Month6").value; var Y6=document.getElementById("Year6").value; var m7=document.getElementById("Month7").value; var Y7=document.getElementById("Year7").value;
var x="RepActMorEve.php?yy=4%rer&uu=true&rr=false&tt=122&er=wes&false=true&valueMain=23&d="+d+"&m="+m+"&Y="+Y+"&d2="+d2+"&m2="+mnt+"&Y2="+Y2+"&m3="+m3+"&Y3="+Y3+"&D="+Dept+"&m4="+m4+"&Y4="+Y4+"&m5="+m5+"&Y5="+Y5+"&D2="+Dept2+"&m6="+m6+"&Y6="+Y6+"&m7="+m7+"&Y7="+Y7; window.location=x; }
function FunYear2(Yer)
{ var Dept=document.getElementById("Dept").value; var Dept2=document.getElementById("Dept2").value; var d=document.getElementById("Day").value; var m=document.getElementById("Month").value; var Y=document.getElementById("Year").value; var d2=document.getElementById("Day2").value; var m2=document.getElementById("Month2").value; var Y2=document.getElementById("Year2").value; var m3=document.getElementById("Month3").value; var Y3=document.getElementById("Year3").value; var m4=document.getElementById("Month4").value; var Y4=document.getElementById("Year4").value; var m5=document.getElementById("Month5").value; var Y5=document.getElementById("Year5").value; var m6=document.getElementById("Month6").value; var Y6=document.getElementById("Year6").value; var m7=document.getElementById("Month7").value; var Y7=document.getElementById("Year7").value;
var x="RepActMorEve.php?yy=4%rer&uu=true&rr=false&tt=122&er=wes&false=true&valueMain=23&d="+d+"&m="+m+"&Y="+Y+"&d2="+d2+"&m2="+m2+"&Y2="+Yer+"&m3="+m3+"&Y3="+Y3+"&D="+Dept+"&m4="+m4+"&Y4="+Y4+"&m5="+m5+"&Y5="+Y5+"&D2="+Dept2+"&m6="+m6+"&Y6="+Y6+"&m7="+m7+"&Y7="+Y7; window.location=x; }
function FunEdit2(){ document.getElementById("Import_TimeEntry").disabled=false; document.getElementById("EditImport_TimeEntry").style.display='none'; document.getElementById("SaveImport_TimeEntry").style.display='block'; }
function FunTimeENTRYTxls()
{window.open("FormateFile.php?act=TimeEntryFileOpen","MyFile","width=200,height=200");}



function FunMonth3(mnt)
{ var Dept=document.getElementById("Dept").value; var Dept2=document.getElementById("Dept2").value; var d=document.getElementById("Day").value; var m=document.getElementById("Month").value; var Y=document.getElementById("Year").value; var d2=document.getElementById("Day2").value; var m2=document.getElementById("Month2").value; var Y2=document.getElementById("Year2").value; var m3=document.getElementById("Month3").value; var Y3=document.getElementById("Year3").value; var m4=document.getElementById("Month4").value; var Y4=document.getElementById("Year4").value; var m5=document.getElementById("Month5").value; var Y5=document.getElementById("Year5").value; var m6=document.getElementById("Month6").value; var Y6=document.getElementById("Year6").value; var m7=document.getElementById("Month7").value; var Y7=document.getElementById("Year7").value;
var x="RepActMorEve.php?yy=4%rer&uu=true&rr=false&tt=122&er=wes&false=true&valueMain=23&d="+d+"&m="+m+"&Y="+Y+"&d2="+d2+"&m2="+m2+"&Y2="+Y2+"&m3="+mnt+"&Y3="+Y3+"&D="+Dept+"&m4="+m4+"&Y4="+Y4+"&m5="+m5+"&Y5="+Y5+"&D2="+Dept2+"&m6="+m6+"&Y6="+Y6+"&m7="+m7+"&Y7="+Y7; window.location=x; }
function FunYear3(Yer)
{ var Dept=document.getElementById("Dept").value; var Dept2=document.getElementById("Dept2").value; var d=document.getElementById("Day").value; var m=document.getElementById("Month").value; var Y=document.getElementById("Year").value; var d2=document.getElementById("Day2").value; var m2=document.getElementById("Month2").value; var Y2=document.getElementById("Year2").value; var m3=document.getElementById("Month3").value; var Y3=document.getElementById("Year3").value; var m4=document.getElementById("Month4").value; var Y4=document.getElementById("Year4").value; var m5=document.getElementById("Month5").value; var Y5=document.getElementById("Year5").value; var m6=document.getElementById("Month6").value; var Y6=document.getElementById("Year6").value; var m7=document.getElementById("Month7").value; var Y7=document.getElementById("Year7").value;
var x="RepActMorEve.php?yy=4%rer&uu=true&rr=false&tt=122&er=wes&false=true&valueMain=23&d="+d+"&m="+m+"&Y="+Y+"&d2="+d2+"&m2="+m2+"&Y2="+Y+"&m3="+m3+"&Y3="+Yer+"&D="+Dept+"&m4="+m4+"&Y4="+Y4+"&m5="+m5+"&Y5="+Y5+"&D2="+Dept2+"&m6="+m6+"&Y6="+Y6+"&m7="+m7+"&Y7="+Y7; window.location=x; }
function FunEdit3(){ document.getElementById("Import2_TimeEntry").disabled=false; document.getElementById("EditImport2_TimeEntry").style.display='none'; document.getElementById("SaveImport2_TimeEntry").style.display='block'; }
function FunTime2ENTRYTxls()
{window.open("FormateFile.php?act=Time2EntryFileOpen","MyFile","width=200,height=200");}


function FunMonth4(mnt)
{ var Dept=document.getElementById("Dept").value; var Dept2=document.getElementById("Dept2").value; var d=document.getElementById("Day").value; var m=document.getElementById("Month").value; var Y=document.getElementById("Year").value; var d2=document.getElementById("Day2").value; var m2=document.getElementById("Month2").value; var Y2=document.getElementById("Year2").value; var m3=document.getElementById("Month3").value; var Y3=document.getElementById("Year3").value; var m4=document.getElementById("Month4").value; var Y4=document.getElementById("Year4").value; var m5=document.getElementById("Month5").value; var Y5=document.getElementById("Year5").value; var m6=document.getElementById("Month6").value; var Y6=document.getElementById("Year6").value; var m7=document.getElementById("Month7").value; var Y7=document.getElementById("Year7").value;
var x="RepActMorEve.php?yy=4%rer&uu=true&rr=false&tt=122&er=wes&false=true&valueMain=23&d="+d+"&m="+m+"&Y="+Y+"&d2="+d2+"&m2="+m2+"&Y2="+Y2+"&m3="+m3+"&Y3="+Y3+"&D="+Dept+"&m4="+mnt+"&Y4="+Y4+"&m5="+m5+"&Y5="+Y5+"&D2="+Dept2+"&m6="+m6+"&Y6="+Y6+"&m7="+m7+"&Y7="+Y7; window.location=x; }
function FunYear4(Yer)
{ var Dept=document.getElementById("Dept").value; var Dept2=document.getElementById("Dept2").value; var d=document.getElementById("Day").value; var m=document.getElementById("Month").value; var Y=document.getElementById("Year").value; var d2=document.getElementById("Day2").value; var m2=document.getElementById("Month2").value; var Y2=document.getElementById("Year2").value; var m3=document.getElementById("Month3").value; var Y3=document.getElementById("Year3").value; var m4=document.getElementById("Month4").value; var Y4=document.getElementById("Year4").value; var m5=document.getElementById("Month5").value; var Y5=document.getElementById("Year5").value; var m6=document.getElementById("Month6").value; var Y6=document.getElementById("Year6").value; var m7=document.getElementById("Month7").value; var Y7=document.getElementById("Year7").value;
var x="RepActMorEve.php?yy=4%rer&uu=true&rr=false&tt=122&er=wes&false=true&valueMain=23&d="+d+"&m="+m+"&Y="+Y+"&d2="+d2+"&m2="+m2+"&Y2="+Y2+"&m3="+m3+"&Y3="+Y3+"&D="+Dept+"&m4="+m4+"&Y4="+Yer+"&m5="+m5+"&Y5="+Y5+"&D2="+Dept2+"&m6="+m6+"&Y6="+Y6+"&m7="+m7+"&Y7="+Y7; window.location=x; }
function FunDept(Dpt)
{ var Dept=document.getElementById("Dept").value; var Dept2=document.getElementById("Dept2").value; var d=document.getElementById("Day").value; var m=document.getElementById("Month").value; var Y=document.getElementById("Year").value; var d2=document.getElementById("Day2").value; var m2=document.getElementById("Month2").value; var Y2=document.getElementById("Year2").value; var m3=document.getElementById("Month3").value; var Y3=document.getElementById("Year3").value; var m4=document.getElementById("Month4").value; var Y4=document.getElementById("Year4").value; var m5=document.getElementById("Month5").value; var Y5=document.getElementById("Year5").value; var m6=document.getElementById("Month6").value; var Y6=document.getElementById("Year6").value; var m7=document.getElementById("Month7").value; var Y7=document.getElementById("Year7").value;
var x="RepActMorEve.php?yy=4%rer&uu=true&rr=false&tt=122&er=wes&false=true&valueMain=23&d="+d+"&m="+m+"&Y="+Y+"&d2="+d2+"&m2="+m2+"&Y2="+Y2+"&m3="+m3+"&Y3="+Y3+"&D="+Dpt+"&m4="+m4+"&Y4="+Y4+"&m5="+m5+"&Y5="+Y5+"&D2="+Dept2+"&m6="+m6+"&Y6="+Y6+"&m7="+m7+"&Y7="+Y7; window.location=x; }


function FunMonth5(mnt)
{ var Dept=document.getElementById("Dept").value; var Dept2=document.getElementById("Dept2").value; var d=document.getElementById("Day").value; var m=document.getElementById("Month").value; var Y=document.getElementById("Year").value; var d2=document.getElementById("Day2").value; var m2=document.getElementById("Month2").value; var Y2=document.getElementById("Year2").value; var m3=document.getElementById("Month3").value; var Y3=document.getElementById("Year3").value; var m4=document.getElementById("Month4").value; var Y4=document.getElementById("Year4").value; var m5=document.getElementById("Month5").value; var Y5=document.getElementById("Year5").value; var m6=document.getElementById("Month6").value; var Y6=document.getElementById("Year6").value; var m7=document.getElementById("Month7").value; var Y7=document.getElementById("Year7").value;
var x="RepActMorEve.php?yy=4%rer&uu=true&rr=false&tt=122&er=wes&false=true&valueMain=23&d="+d+"&m="+m+"&Y="+Y+"&d2="+d2+"&m2="+m2+"&Y2="+Y2+"&m3="+m3+"&Y3="+Y3+"&D="+Dept+"&m4="+m4+"&Y4="+Y4+"&m5="+mnt+"&Y5="+Y5+"&D2="+Dept2+"&m6="+m6+"&Y6="+Y6+"&m7="+m7+"&Y7="+Y7; window.location=x; }
function FunYear5(Yer)
{ var Dept=document.getElementById("Dept").value; var Dept2=document.getElementById("Dept2").value; var d=document.getElementById("Day").value; var m=document.getElementById("Month").value; var Y=document.getElementById("Year").value; var d2=document.getElementById("Day2").value; var m2=document.getElementById("Month2").value; var Y2=document.getElementById("Year2").value; var m3=document.getElementById("Month3").value; var Y3=document.getElementById("Year3").value; var m4=document.getElementById("Month4").value; var Y4=document.getElementById("Year4").value; var m5=document.getElementById("Month5").value; var Y5=document.getElementById("Year5").value; var m6=document.getElementById("Month6").value; var Y6=document.getElementById("Year6").value; var m7=document.getElementById("Month7").value; var Y7=document.getElementById("Year7").value;
var x="RepActMorEve.php?yy=4%rer&uu=true&rr=false&tt=122&er=wes&false=true&valueMain=23&d="+d+"&m="+m+"&Y="+Y+"&d2="+d2+"&m2="+m2+"&Y2="+Y2+"&m3="+m3+"&Y3="+Y3+"&D="+Dept+"&m4="+m4+"&Y4="+Y4+"&m5="+m5+"&Y5="+Yer+"&D2="+Dept2+"&m6="+m6+"&Y6="+Y6+"&m7="+m7+"&Y7="+Y7; window.location=x; }
function FunDept2(Dpt)
{ var Dept=document.getElementById("Dept").value; var Dept2=document.getElementById("Dept2").value; var d=document.getElementById("Day").value; var m=document.getElementById("Month").value; var Y=document.getElementById("Year").value; var d2=document.getElementById("Day2").value; var m2=document.getElementById("Month2").value; var Y2=document.getElementById("Year2").value; var m3=document.getElementById("Month3").value; var Y3=document.getElementById("Year3").value; var m4=document.getElementById("Month4").value; var Y4=document.getElementById("Year4").value; var m5=document.getElementById("Month5").value; var Y5=document.getElementById("Year5").value; var m6=document.getElementById("Month6").value; var Y6=document.getElementById("Year6").value; var m7=document.getElementById("Month7").value; var Y7=document.getElementById("Year7").value;
var x="RepActMorEve.php?yy=4%rer&uu=true&rr=false&tt=122&er=wes&false=true&valueMain=23&d="+d+"&m="+m+"&Y="+Y+"&d2="+d2+"&m2="+m2+"&Y2="+Y2+"&m3="+m3+"&Y3="+Y3+"&D="+Dept+"&m4="+m4+"&Y4="+Y4+"&m5="+m5+"&Y5="+Y5+"&D2="+Dpt+"&m6="+m6+"&Y6="+Y6+"&m7="+m7+"&Y7="+Y7; window.location=x; }


function FunMonth6(mnt)
{ var Dept=document.getElementById("Dept").value; var Dept2=document.getElementById("Dept2").value; var d=document.getElementById("Day").value; var m=document.getElementById("Month").value; var Y=document.getElementById("Year").value; var d2=document.getElementById("Day2").value; var m2=document.getElementById("Month2").value; var Y2=document.getElementById("Year2").value; var m3=document.getElementById("Month3").value; var Y3=document.getElementById("Year3").value; var m4=document.getElementById("Month4").value; var Y4=document.getElementById("Year4").value; var m5=document.getElementById("Month5").value; var Y5=document.getElementById("Year5").value; var m6=document.getElementById("Month6").value; var Y6=document.getElementById("Year6").value; var m7=document.getElementById("Month7").value; var Y7=document.getElementById("Year7").value;
var x="RepActMorEve.php?yy=4%rer&uu=true&rr=false&tt=122&er=wes&false=true&valueMain=23&d="+d+"&m="+m+"&Y="+Y+"&d2="+d2+"&m2="+m2+"&Y2="+Y2+"&m3="+m3+"&Y3="+Y3+"&D="+Dept+"&m4="+m4+"&Y4="+Y4+"&m5="+m+"&Y5="+Y5+"&D2="+Dept2+"&m6="+mnt+"&Y6="+Y6+"&m7="+m7+"&Y7="+Y7; window.location=x; }
function FunYear6(Yer)
{ var Dept=document.getElementById("Dept").value; var Dept2=document.getElementById("Dept2").value; var d=document.getElementById("Day").value; var m=document.getElementById("Month").value; var Y=document.getElementById("Year").value; var d2=document.getElementById("Day2").value; var m2=document.getElementById("Month2").value; var Y2=document.getElementById("Year2").value; var m3=document.getElementById("Month3").value; var Y3=document.getElementById("Year3").value; var m4=document.getElementById("Month4").value; var Y4=document.getElementById("Year4").value; var m5=document.getElementById("Month5").value; var Y5=document.getElementById("Year5").value; var m6=document.getElementById("Month6").value; var Y6=document.getElementById("Year6").value; var m7=document.getElementById("Month7").value; var Y7=document.getElementById("Year7").value;
var x="RepActMorEve.php?yy=4%rer&uu=true&rr=false&tt=122&er=wes&false=true&valueMain=23&d="+d+"&m="+m+"&Y="+Y+"&d2="+d2+"&m2="+m2+"&Y2="+Y2+"&m3="+m3+"&Y3="+Y3+"&D="+Dept+"&m4="+m4+"&Y4="+Y4+"&m5="+m5+"&Y5="+Y5+"&D2="+Dept2+"&m6="+m6+"&Y6="+Yer+"&m7="+m7+"&Y7="+Y7; window.location=x; }




function FunMonth7(mnt)
{ var Dept=document.getElementById("Dept").value; var Dept2=document.getElementById("Dept2").value; var d=document.getElementById("Day").value; var m=document.getElementById("Month").value; var Y=document.getElementById("Year").value; var d2=document.getElementById("Day2").value; var m2=document.getElementById("Month2").value; var Y2=document.getElementById("Year2").value; var m3=document.getElementById("Month3").value; var Y3=document.getElementById("Year3").value; var m4=document.getElementById("Month4").value; var Y4=document.getElementById("Year4").value; var m5=document.getElementById("Month5").value; var Y5=document.getElementById("Year5").value; var m6=document.getElementById("Month6").value; var Y6=document.getElementById("Year6").value; var m7=document.getElementById("Month7").value; var Y7=document.getElementById("Year7").value;
var x="RepActMorEve.php?yy=4%rer&uu=true&rr=false&tt=122&er=wes&false=true&valueMain=23&d="+d+"&m="+m+"&Y="+Y+"&d2="+d2+"&m2="+m2+"&Y2="+Y2+"&m3="+m3+"&Y3="+Y3+"&D="+Dept+"&m4="+m4+"&Y4="+Y4+"&m5="+m5+"&Y5="+Y5+"&D2="+Dept2+"&m6="+m6+"&Y6="+Y6+"&m7="+mnt+"&Y7="+Y7; window.location=x; }
function FunYear7(Yer)
{ var Dept=document.getElementById("Dept").value; var Dept2=document.getElementById("Dept2").value; var d=document.getElementById("Day").value; var m=document.getElementById("Month").value; var Y=document.getElementById("Year").value; var d2=document.getElementById("Day2").value; var m2=document.getElementById("Month2").value; var Y2=document.getElementById("Year2").value; var m3=document.getElementById("Month3").value; var Y3=document.getElementById("Year3").value; var m4=document.getElementById("Month4").value; var Y4=document.getElementById("Year4").value; var m5=document.getElementById("Month5").value; var Y5=document.getElementById("Year5").value; var m6=document.getElementById("Month6").value; var Y6=document.getElementById("Year6").value; var m7=document.getElementById("Month7").value; var Y7=document.getElementById("Year7").value;
var x = "RepActMorEve.php?yy=4%rer&uu=true&rr=false&tt=122&er=wes&false=true&valueMain=23&d="+d+"&m="+m+"&Y="+Y+"&d2="+d2+"&m2="+m2+"&Y2="+Y2+"&m3="+m3+"&Y3="+Y3+"&D="+Dept+"&m4="+m4+"&Y4="+Y4+"&m5="+m5+"&Y5="+Y5+"&D2="+Dept2+"&m6="+m6+"&Y6="+Y6+"&m7="+m7+"&Y7="+Yer; window.location=x; }


function ExportRep()
{ var ComId=document.getElementById("ComId").value; var Dept = document.getElementById("Dept").value; 
  var m4 = document.getElementById("Month4").value; var Y4 = document.getElementById("Year4").value; 
  window.open("ReportCSVMorEve.php?action=MorEveExport&m="+m4+"&D="+Dept+"&Y="+Y4+"&C="+ComId, "PrintForm","menubar=yes,scrollbars=yes,resizable=no,directories=no,width=20,height=20"); }  

function ExportRepName()
{ var ComId=document.getElementById("ComId").value; var En = document.getElementById("EName").value; 
  var M5 = document.getElementById("Month5").value; var Y5 = document.getElementById("Year4").value; 
  window.open("ReportCSVMorEveAttName.php?action=MorEveExport&m="+M5+"&En="+En+"&Y="+Y5+"&C="+ComId, "PrintForm","menubar=yes,scrollbars=yes,resizable=no,directories=no,width=20,height=20"); }  

function ExportRepAtt()
{ var ComId=document.getElementById("ComId").value; var D2 = document.getElementById("Dept2").value; 
  var m6 = document.getElementById("Month5").value; var Y6 = document.getElementById("Year5").value; 
  window.open("ReportCSVMorEveAtt.php?action=MorEveExport&m="+m6+"&D="+D2+"&Y="+Y6+"&C="+ComId, "PrintForm","menubar=yes,scrollbars=yes,resizable=no,directories=no,width=20,height=20"); }  


function DeleteRep(m7)
{ var Dept=document.getElementById("Dept").value; var Dept2=document.getElementById("Dept2").value; var d=document.getElementById("Day").value; var m=document.getElementById("Month").value; var Y=document.getElementById("Year").value; var d2=document.getElementById("Day2").value; var m2=document.getElementById("Month2").value; var Y2=document.getElementById("Year2").value; var m3=document.getElementById("Month3").value; var Y3=document.getElementById("Year3").value; var m4=document.getElementById("Month4").value; var Y4=document.getElementById("Year4").value; var m5=document.getElementById("Month5").value; var Y5=document.getElementById("Year5").value; var m6=document.getElementById("Month6").value; var Y6=document.getElementById("Year6").value; var m7=document.getElementById("Month7").value; var Y7=document.getElementById("Year7").value; 
if(m7==1){var month7='January'}else if(m7==2){var month7='February'}else if(m7==3){var month7='March'}else if(m7==4){var month7='April'}else if(m7==5){var month7='May'}else if(m7==6){var month7='June'}else if(m7==7){var month7='July'}else if(m7==8){var month7='August'}else if(m7==9){var month7='September'}else if(m7==10){var month7='October'}else if(m7==11){var month7='November'}else if(m7==12){var month7='December'} 
var agree=confirm("Are you sure you want to delete "+month7+" month reports");
 if(agree)
 { var agree2=confirm("If you click ok all reports of month "+month7+" complete deleting");
   if(agree2){ window.location="RepActMorEve.php?action=MorEveDelete&yy=4%rer&uu=true&rr=false&tt=122&er=wes&false=true&valueMain=23&d="+d+"&m="+m+"&Y="+Y+"&d2="+d2+"&m2="+m2+"&Y2="+Y2+"&m3="+m3+"&Y3="+Y3+"&D="+Dept+"&m4="+m4+"&Y4="+Y4+"&m5="+m5+"&Y5="+Y5+"&D2="+Dept2+"&m6="+m6+"&Y6="+Y6+"&m7="+m7+"&Y7="+Y7; }
 }
}      

function FunGpsxls()
{window.open("FormateFile.php?act=GpsFileOpen","MyFile","width=200,height=200");}

</script>   
</head>
<body class="body">
<table class="table" border="0">
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
<?php //************START*****START*****START******START******START*******************?>
<table border="0" style="margin-top:0px; width:100%; height:350px;">
 <tr>
  <td align="left" height="20" valign="top" colspan="3">
<input type="hidden" name="ComId" id="ComId" value="<?php echo $CompanyId; ?>" /> 
<input type="hidden" name="YearId" id="YearId" value="<?php echo $YearId; ?>" />
<input type="hidden" name="Day" id="Day" value="<?php echo $_REQUEST['d']; ?>" />
<input type="hidden" name="RDate" value="<?php echo $_REQUEST['Y'].'-'.$_REQUEST['m'].'-'.$_REQUEST['d']; ?>"/>
<input type="hidden" name="RDate2" value="<?php echo $_REQUEST['Y2'].'-'.$_REQUEST['m2'].'-'.$_REQUEST['d2']; ?>"/> 
<?php if($_REQUEST['m']==1){$Month='JANUARY';}elseif($_REQUEST['m']==2){$Month='FEBRUARY';}elseif($_REQUEST['m']==3){$Month='MARCH';}elseif($_REQUEST['m']==4){$Month='APRIL';}elseif($_REQUEST['m']==5){$Month='MAY';}elseif($_REQUEST['m']==6){$Month='JUNE';}elseif($_REQUEST['m']==7){$Month='JULY';}elseif($_REQUEST['m']==8){$Month='AUGUST';}elseif($_REQUEST['m']==9){$Month='SEPTEMBER';}elseif($_REQUEST['m']==10){$Month='OCTOBER';}elseif($_REQUEST['m']==11){$Month='NOVEMBER';}elseif($_REQUEST['m']==12){$Month='DECEMBER';}

if($_REQUEST['m2']==1){$Month2='JANUARY';}elseif($_REQUEST['m2']==2){$Month2='FEBRUARY';}elseif($_REQUEST['m2']==3){$Month2='MARCH';}elseif($_REQUEST['m2']==4){$Month2='APRIL';}elseif($_REQUEST['m2']==5){$Month2='MAY';}elseif($_REQUEST['m2']==6){$Month2='JUNE';}elseif($_REQUEST['m2']==7){$Month2='JULY';}elseif($_REQUEST['m2']==8){$Month2='AUGUST';}elseif($_REQUEST['m2']==9){$Month2='SEPTEMBER';}elseif($_REQUEST['m2']==10){$Month2='OCTOBER';}elseif($_REQUEST['m2']==11){$Month2='NOVEMBER';}elseif($_REQUEST['m2']==12){$Month2='DECEMBER';}

if($_REQUEST['m3']==1){$Month3='JANUARY';}elseif($_REQUEST['m3']==2){$Month3='FEBRUARY';}elseif($_REQUEST['m3']==3){$Month3='MARCH';}elseif($_REQUEST['m3']==4){$Month3='APRIL';}elseif($_REQUEST['m3']==5){$Month3='MAY';}elseif($_REQUEST['m3']==6){$Month3='JUNE';}elseif($_REQUEST['m3']==7){$Month3='JULY';}elseif($_REQUEST['m3']==8){$Month3='AUGUST';}elseif($_REQUEST['m3']==9){$Month3='SEPTEMBER';}elseif($_REQUEST['m3']==10){$Month3='OCTOBER';}elseif($_REQUEST['m3']==11){$Month3='NOVEMBER';}elseif($_REQUEST['m3']==12){$Month3='DECEMBER';}

if($_REQUEST['m4']==1){$Month4='JANUARY';}elseif($_REQUEST['m4']==2){$Month4='FEBRUARY';}elseif($_REQUEST['m4']==3){$Month4='MARCH';}elseif($_REQUEST['m4']==4){$Month4='APRIL';}elseif($_REQUEST['m4']==5){$Month4='MAY';}elseif($_REQUEST['m4']==6){$Month4='JUNE';}elseif($_REQUEST['m4']==7){$Month4='JULY';}elseif($_REQUEST['m4']==8){$Month4='AUGUST';}elseif($_REQUEST['m4']==9){$Month4='SEPTEMBER';}elseif($_REQUEST['m4']==10){$Month4='OCTOBER';}elseif($_REQUEST['m4']==11){$Month4='NOVEMBER';}elseif($_REQUEST['m4']==12){$Month4='DECEMBER';}

if($_REQUEST['m5']==1){$Month5='JANUARY';}elseif($_REQUEST['m5']==2){$Month5='FEBRUARY';}elseif($_REQUEST['m5']==3){$Month5='MARCH';}elseif($_REQUEST['m5']==4){$Month5='APRIL';}elseif($_REQUEST['m5']==5){$Month5='MAY';}elseif($_REQUEST['m5']==6){$Month5='JUNE';}elseif($_REQUEST['m5']==7){$Month5='JULY';}elseif($_REQUEST['m5']==8){$Month5='AUGUST';}elseif($_REQUEST['m5']==9){$Month5='SEPTEMBER';}elseif($_REQUEST['m5']==10){$Month5='OCTOBER';}elseif($_REQUEST['m5']==11){$Month5='NOVEMBER';}elseif($_REQUEST['m5']==12){$Month5='DECEMBER';}

if($_REQUEST['m6']==1){$m6=11; $Month6='NOVEMBER';}elseif($_REQUEST['m6']==2){$m6=12; $Month6='DECEMBER';}elseif($_REQUEST['m6']==3){$m6=1; $Month6='JANUARY';}elseif($_REQUEST['m6']==4){$m6=4;$Month6='FEBRUARY';}elseif($_REQUEST['m6']==5){$m6=3; $Month6='MARCH';}elseif($_REQUEST['m6']==6){$m6=4; $Month6='APRIL';}elseif($_REQUEST['m6']==7){$m6=5; $Month6='MAY';}elseif($_REQUEST['m6']==8){$m6=6; $Month6='JUNE';}elseif($_REQUEST['m6']==9){$m6=7; $Month6='JULY';}elseif($_REQUEST['m6']==10){$m6=8; $Month6='AUGUST';}elseif($_REQUEST['m6']==11){$m6=9; $Month6='SEPTEMBER';}elseif($_REQUEST['m6']==12){$m6=10; $Month6='OCTOBER';}

 if($_REQUEST['m7']==1){$Month7='JANUARY';}elseif($_REQUEST['m7']==2){$Month7='FEBRUARY';}elseif($_REQUEST['m7']==3){$Month7='MARCH';}elseif($_REQUEST['m7']==4){$Month7='APRIL';}elseif($_REQUEST['m7']==5){$Month7='MAY';}elseif($_REQUEST['m7']==6){$Month7='JUNE';}elseif($_REQUEST['m7']==7){$Month7='JULY';}elseif($_REQUEST['m7']==8){$Month7='AUGUST';}elseif($_REQUEST['m7']==9){$Month7='SEPTEMBER';}elseif($_REQUEST['m7']==10){$Month7='OCTOBER';}elseif($_REQUEST['m7']==11){$Month7='NOVEMBER';}elseif($_REQUEST['m7']==12){$Month7='DECEMBER';} 

?>

<?php $ExMonth='<option value="1">JANUARY</option><option value="2">FEBRUARY</option><option value="3">MARCH</option><option value="4">APRIL</option><option value="5">MAY</option><option value="6">JUNE</option><option value="7">JULY</option><option value="8">AUGUST</option><option value="9">SEPTEMBER</option><option value="10">OCTOBER</option><option value="11">NOVEMBER</option><option value="12">DECEMBER</option>'; ?>

<table border="0">
 <tr><td colspan="5" class="tit"><u>ATTENDANCE IMPORT-EXPORT</u></td></tr>                    
 <tr><td style="height:20px;width:300px;"></td></tr>
 <tr><td class="tit2">&nbsp;&nbsp;IMPORT&nbsp;:</td></tr>
 <tr>
  <td class="tit3">(A)&nbsp;GPS Attandance CSV File&nbsp;&nbsp;</td>
  <td colspan="4">
  <table>
   <tr>	 
	<form name="Form1" method="POST" enctype="multipart/form-data">
	<td class="td1" style="font-size:11px;width:100px;" align="left"><select style="font-size:12px;width:100px;height:20px;background-color:#DDFFBB;display:block;" name="Monthh" id="Monthh" onChange="FunMonth(this.value)"><option value="<?php echo $_REQUEST['m'];?>"><?php echo $Month;?></option><?php echo $ExMonth;?></select></td>
	<td style="width:60px;"><select style="font-size:12px;width:60px;height:20px;background-color:#DDFFBB;" name="Year" id="Year" onChange="FunYear(this.value)"><option value="<?php echo $_REQUEST['Y']; ?>"><?php echo $_REQUEST['Y']; ?></option><?php for($i=date("Y"); $i>=2013; $i--){ ?><?php if($_REQUEST['Y']!=$i){ ?><option value="<?php echo $i; ?>"><?php echo $i; ?></option><?php } ?><?php } ?></select></td>	 
	<td>&nbsp;</td>
	<input type="hidden" name="RDate2" value="<?php echo $_REQUEST['Y'].'-'.$_REQUEST['m']; ?>"/> 
	<td style="width:200px;"><input type="file" name="Import_Gps1" id="Import_Gps1" style="width:200px;" size="30" disabled/></td>
	<td style="width:75px;"><?php if($_SESSION['User_Permission']=='Edit'){?><input type="button" name="EditImport_Gps1" id="EditImport_Gps1" value="Edit" style="display:block;width:80px;" onClick="FunEdit(1)"/><input type="submit" name="SaveImport_Gps1" id="SaveImport_Gps1" value="Upload Gps Attendance" style="display:none;"/>
<?php } ?></td>
	</form>  
	<td style="font-family:Times New Roman;font-size:14px;color:#006F00;"><b><?php echo $MsgImpGps; ?></b></td>
	<td style="width:120px;font-size:12px;"><b><a href="#" onClick="FunGpsxls('xls')">Formate</a></b>&nbsp;</td>
    </tr>
   </table>
  </td>
 </tr>  
  
  
 <tr><td style="height:5px;"></td></tr>
 <tr>
  <td class="tit3">(B)&nbsp;Time Attandance (R&D Department)&nbsp;&nbsp;</td>
  <td colspan="4">
   <table>
	<tr>	 
	 <form name="Form1" method="POST" enctype="multipart/form-data">
	 <td class="td1" style="font-size:11px; width:50px;" align="left"><select style="font-size:12px; width:50px; height:20px; background-color:#DDFFBB; display:block;" name="Day2" id="Day2" onChange="FunDay2(this.value)"><option value="<?php echo $_REQUEST['d2']; ?>"><?php echo $_REQUEST['d2']; ?></option><?php for($i=1; $i<=27; $i++){ echo '<option value='.$i.'>'.$i.'</option>'; } ?><?php if($_REQUEST['m2']==1 OR $_REQUEST['m2']==3 OR $_REQUEST['m2']==5 OR $_REQUEST['m2']==7 OR $_REQUEST['m2']==8 OR $_REQUEST['m2']==10 OR $_REQUEST['m2']==12){ ?><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option><?php } elseif($_REQUEST['m2']==4 OR $_REQUEST['m2']==6 OR $_REQUEST['m2']==9 OR $_REQUEST['m2']==11){ ?><option value="28">28</option><option value="29">29</option><option value="30">30</option><?php } elseif($_REQUEST['m2']==2){ if($_REQUEST['Y2']==2012 OR $_REQUEST['Y2']==2016 OR $_REQUEST['Y2']==2020 OR $_REQUEST['Y2']==2024 OR $_REQUEST['Y2']==2028 OR $_REQUEST['Y2']==2032 OR $_REQUEST['Y2']==2036 OR $_REQUEST['Y2']==2040){ ?><option value="28">28</option><option value="29">29</option><?php } else { ?><option value="28">28</option><?php } }?></select></td>
	 <td class="td1" style="font-size:11px;width:100px;" align="left"><select style="font-size:12px;width:100px;height:20px;background-color:#DDFFBB;display:block;" name="Month2" id="Month2" onChange="FunMonth2(this.value)"><option value="<?php echo $_REQUEST['m2'];?>"><?php echo $Month2;?></option><?php echo $ExMonth;?></select></td>
	 <td style="width:60px;"><select style="font-size:12px;width:60px;height:20px;background-color:#DDFFBB;" name="Year2" id="Year2" onChange="FunYear2(this.value)"><option value="<?php echo $_REQUEST['Y2']; ?>"><?php echo $_REQUEST['Y2']; ?></option><?php for($i=date("Y"); $i>=2013; $i--){ ?><?php if($_REQUEST['Y2']!=$i){ ?><option value="<?php echo $i; ?>"><?php echo $i; ?></option><?php } ?><?php } ?></select></td>	 
	 <td>&nbsp;</td>
	 <input type="hidden" name="RDate2" value="<?php echo $_REQUEST['Y2'].'-'.$_REQUEST['m2'].'-'.$_REQUEST['d2']; ?>"/><td style="width:200px;"><input type="file" name="Import_TimeEntry" id="Import_TimeEntry" style="width:200px;" size="30" disabled/></td>
	 <td style="width:75px;">
<?php if($_SESSION['User_Permission']=='Edit'){ ?>
	  <input type="button" name="EditImport_TimeEntry" id="EditImport_TimeEntry" value="Edit" style="display:block;width:80px;" onClick="FunEdit2()"/>
	  <input type="submit" name="SaveImport_TimeEntry" id="SaveImport_TimeEntry" value="Upload Time Att/Entry" style="display:none;"/>
<?php } ?>
	 </td>
	 </form>  
<td style="font-family:Times New Roman;font-size:14px;color:#006F00;"><b><?php echo $MsgImpTime; ?></b></td>
<td style="width:120px;font-size:12px;"><b><a href="#" onClick="FunTimeENTRYTxls('xls')">Formate</a></b>&nbsp;</td>
    </tr>
   </table>
  </td>
 </tr> 
 
 
 <tr>
  <td class="tit3">(C)&nbsp;Time Attandance CSV File format-2&nbsp;&nbsp;</td>
  <td colspan="4">
   <table>
	 <tr>	 
	 <form name="Form1" method="POST" enctype="multipart/form-data">
	 <td class="td1" style="font-size:11px;width:100px;" align="left"><select style="font-size:12px;width:100px;height:20px;background-color:#DDFFBB;display:block;" name="Month3" id="Month3" onChange="FunMonth3(this.value)"><option value="<?php echo $_REQUEST['m3'];?>"><?php echo $Month3;?></option><?php echo $ExMonth;?></select></td>
	 <td style="width:60px;"><select style="font-size:12px;width:60px;height:20px;background-color:#DDFFBB;" name="Year3" id="Year3" onChange="FunYear3(this.value)"><option value="<?php echo $_REQUEST['Y3']; ?>"><?php echo $_REQUEST['Y3']; ?></option><?php for($i=date("Y"); $i>=2013; $i--){ ?>
<?php if($_REQUEST['Y3']!=$i){ ?><option value="<?php echo $i; ?>"><?php echo $i; ?></option><?php } ?>
<?php } ?></select></td>	 
	 <td>&nbsp;</td> 
	 <td style="width:200px;"><input type="file" name="Import2_TimeEntry" id="Import2_TimeEntry" style="width:200px;" size="30" disabled/></td>
	 <td style="width:75px;">
<?php if($_SESSION['User_Permission']=='Edit'){ ?>
	  <input type="button" name="EditImport2_TimeEntry" id="EditImport2_TimeEntry" value="Edit" style="display:block;width:80px;" onClick="FunEdit3()"/>
	  <input type="submit" name="SaveImport2_TimeEntry" id="SaveImport2_TimeEntry" value="Upload Time Att/Entry" style="display:none;"/>
<?php } ?>
	 </td>
	 </form>  
<td style="font-family:Times New Roman;font-size:14px;color:#006F00;"><b><?php echo $MsgImpTime2; ?></b></td>
<td style="width:120px;font-size:12px;"><b><a href="#" onClick="FunTime2ENTRYTxls('xls')">Formate</a></b>&nbsp;</td>
    </tr>
   </table>
  </td>
 </tr>
 
 <tr><td style="height:30px;width:300px;"></td></tr>
 <tr><td class="tit2">&nbsp;&nbsp;EXPORT&nbsp;:</td></tr>
 
 <tr>
  <td class="tit3"><b>(A)&nbsp;Mor-Eve Reports :</b></font>&nbsp;&nbsp;</td> 
  <td class="td1" style="font-size:11px;width:100px;" align="left"><select style="font-size:12px; width:100px;height:20px;background-color:#DDFFBB;display:block;" name="Month4" id="Month4" onChange="FunMonth4(this.value)"><option value="<?php echo $_REQUEST['m4'];?>"><?php echo $Month4;?></option><?php echo $ExMonth;?></select></td>
	 <td style="width:60px;"><select style="font-size:12px;width:60px;height:20px;background-color:#DDFFBB;" name="Year4" id="Year4" onChange="FunYear4(this.value)"><option value="<?php echo $_REQUEST['Y4']; ?>"><?php echo $_REQUEST['Y4']; ?></option><?php for($i=date("Y"); $i>=2013; $i--){ ?><?php if($_REQUEST['Y4']!=$i){ ?><option value="<?php echo $i; ?>"><?php echo $i; ?></option><?php } ?><?php } ?></select></td> 
	 <td class="td1" style="font-size:11px; width:120px;">			   
	   <select style="font-size:11px; width:120px; height:19px; background-color:#DDFFBB; display:block;" name="Dept" id="Dept" onChange="FunDept(this.value)">
<?php if($_REQUEST['D']!='All') { $sqlD=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$_REQUEST['D'], $con); $resD=mysql_fetch_assoc($sqlD); ?> <option value="<?php echo $_REQUEST['D']; ?>" style="margin-left:0px; background-color:#84D9D5;">&nbsp;<?php echo $resD['DepartmentCode']; ?></option>
<?php } else { ?><option value="All" style="margin-left:0px; background-color:#84D9D5;">&nbsp;All</option><?php } $sqlDept=mysql_query("select * from hrm_department where CompanyId=".$CompanyId." AND DeptStatus='A' order by DepartmentName ASC", $con); while($resDept=mysql_fetch_array($sqlDept)) { ?><option value="<?php echo $resDept['DepartmentId']; ?>"><?php echo '&nbsp;'.$resDept['DepartmentCode'];?></option><?php } ?>
	   <option value="All">&nbsp;All</option></select></td>	<td style="font-size:12px;color:#005BB7;font-family:Georgia;"><a href="#" onClick="ExportRep()"><b>Export Excel</b></a></td>
 </tr>      
 
 <tr><td style="height:5px;"></td></tr>
 <tr>
  <td class="tit3"><b>(B)&nbsp;Mor-Eve Reports(Name Wise) :</b></font>&nbsp;&nbsp;</td>	  
  <td class="td1" style="width:100px;" align="left"><select style="font-size:12px;width:100px;height:20px;background-color:#DDFFBB;display:block;" name="Month5" id="Month5" onChange="FunMonth5(this.value)"><option value="<?php echo $_REQUEST['m5']; ?>"><?php echo $Month5; ?></option><?php echo $ExMonth;?></select></td>
	 <td style="width:60px;"><select style="font-size:12px; width:60px; height:20px; background-color:#DDFFBB;" name="Year5" id="Year5" onChange="FunYear5(this.value)"><option value="<?php echo $_REQUEST['Y5']; ?>"><?php echo $_REQUEST['Y5']; ?></option><?php for($i=date("Y"); $i>=2013; $i--){ ?><?php if($_REQUEST['Y5']!=$i){ ?><option value="<?php echo $i; ?>"><?php echo $i; ?></option><?php } ?><?php } ?></select></td> 
	 <td class="td1"><select style="font-size:11px; width:150px; height:19px; background-color:#DDFFBB; display:block;" name="EName" id="EName"><?php $sqlE=mysql_query("select EmployeeID,EmpCode,Fname,Sname,Lname from hrm_employee where EmpStatus='A' AND CompanyId=".$CompanyId." order by EmpCode ASC", $con); while($resE=mysql_fetch_assoc($sqlE)){ ?> <option value="<?php echo $resE['EmployeeID']; ?>" style="margin-left:0px; background-color:#84D9D5;"><?php echo $resE['Fname'].' '.$resE['Sname'].' '.$resE['Lname']; ?></option>
<?php } ?></select>
	 </td>	 
	 <td style="font-size:12px;color:#005BB7;font-family:Georgia;"><a href="#" onClick="ExportRepName()"><b>Export Excel</b></a></td>
 </tr>      
 
 <tr><td style="height:5px;"></td></tr>
 <tr>
  <td class="tit3"><b>(C)&nbsp;Export Attendance :</b></font>&nbsp;&nbsp;</td>
  <td class="td1" style="font-size:11px; width:100px;" align="left"><select style="font-size:12px; width:100px; height:20px; background-color:#DDFFBB; display:block;" name="Month6" id="Month6" onChange="FunMonth6(this.value)"><option value="<?php echo $_REQUEST['m6']; ?>"><?php echo $Month6; ?></option><?php echo $ExMonth;?></select></td>
	 <td style="width:60px;"><select style="font-size:12px;width:60px;height:20px;background-color:#DDFFBB;" name="Year6" id="Year6" onChange="FunYear6(this.value)"><option value="<?php echo $_REQUEST['Y6']; ?>"><?php echo $_REQUEST['Y6']; ?></option><?php for($i=date("Y"); $i>=2013; $i--){ ?>
<?php if($_REQUEST['Y6']!=$i){ ?><option value="<?php echo $i; ?>"><?php echo $i; ?></option><?php } ?>
<?php } ?></select></td> 
	 <td class="td1" style="font-size:11px;width:120px;"><select style="font-size:11px;width:120px;height:19px;background-color:#DDFFBB;display:block;" name="Dept2" id="Dept2" onChange="FunDept2(this.value)"><?php if($_REQUEST['D2']!='All') { $sqlD2=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$_REQUEST['D2'], $con); $resD2=mysql_fetch_assoc($sqlD2); ?><option value="<?php echo $_REQUEST['D2']; ?>" style="margin-left:0px; background-color:#84D9D5;">&nbsp;<?php echo $resD2['DepartmentCode']; ?></option><?php  } else { ?><option value="All" style="margin-left:0px; background-color:#84D9D5;">&nbsp;All</option><?php } ?>						
<?php $sqlDept2=mysql_query("select * from hrm_department where CompanyId=".$CompanyId." AND DeptStatus='A' order by DepartmentName ASC", $con); while($resDept2=mysql_fetch_array($sqlDept2)){ ?><option value="<?php echo $resDept2['DepartmentId']; ?>"><?php echo '&nbsp;'.$resDept2['DepartmentCode'];?></option><?php } ?><option value="All">&nbsp;All</option></select></td>	 
	<td style="font-size:12px;color:#005BB7;font-family:Georgia;"><a href="#" onClick="ExportRepAtt()"><b>Export Excel</b></a>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<script type="text/javascript" language="javascript">
function ExportRepAttWT()
{ var ComId=document.getElementById("ComId").value; var D2 = document.getElementById("Dept2").value; 
  var m5 = document.getElementById("Month5").value; var Y5 = document.getElementById("Year5").value; 
  window.open("ReportCSVAttWT.php?action=AttWTExport&m="+m5+"&D="+D2+"&Y="+Y5+"&C="+ComId, "PrintForm","menubar=yes,scrollbars=yes,resizable=no,directories=no,width=20,height=20");
}
</script>	
	<a href="#" onClick="ExportRepAttWT()"><b>Export With Time</b></a></td>
  </tr>               
 
 <tr><td style="height:30px;width:300px;"></td></tr>
 <tr><td class="tit2">&nbsp;&nbsp;DELETE&nbsp;:</td></tr>
  
 <tr>
  <td class="tit3"><b>(A)&nbsp;Mor-Eve Reports</b></font>&nbsp;&nbsp;</td>   
  <td class="td1" style="font-size:11px;" align="left"><select style="font-size:12px;width:100px;height:20px;background-color:#DDFFBB;" name="Month7" id="Month7" onChange="FunMonth7(this.value)"><option value="<?php echo $_REQUEST['m7']; ?>"><?php echo $Month7; ?></option><?php echo $ExMonth;?></select></td>
	 <td style="width:60px;"><select style="font-size:12px;width:60px;height:20px;background-color:#DDFFBB;" name="Year7" id="Year7" onChange="FunYear7(this.value)"><option value="<?php echo $_REQUEST['Y7']; ?>"><?php echo $_REQUEST['Y7']; ?></option><?php for($i=date("Y"); $i>=2013; $i--){ ?>
<?php if($_REQUEST['Y7']!=$i){ ?><option value="<?php echo $i; ?>"><?php echo $i; ?></option><?php } ?>
<?php } ?></select></td> 
	 <td style="font-size:12px;color:#005BB7;font-family:Georgia;">
<?php if($_SESSION['User_Permission']=='Edit'){?>
<a href="#" onClick="DeleteRep(<?php echo $m6; ?>)"><b>Delete Reports</b></a>
<?php } ?>
</td> 
<td style="font-family:Times New Roman;font-size:14px;color:#006F00;"><b><?php echo $MsgEntryDel; ?></b></td>
	</tr>
 <tr><td style="height:10px;"></td></tr> 
  
</table>
</body>
</html>