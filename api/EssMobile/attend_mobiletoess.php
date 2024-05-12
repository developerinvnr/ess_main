<?php 
//require_once('../../AdminUser/config/config.php');

$con=mysqli_connect('localhost','hrims_user','hrims@192');
if(!$con) die("Failed to connect to database!");
mysqli_select_db($con, "hrims");
date_default_timezone_set('Asia/Calcutta');

//include "firebase_api.php";

if($_REQUEST['empid'] >0){
$run_qry=mysqli_query($con,"select * from hrm_employee where EmployeeID =".$_REQUEST['empid']." AND EmpStatus = 'A'");
$num=mysqli_num_rows($run_qry); 
if($num == 0){
    echo json_encode(array("Code" => "404") ); 
    die;
}}


//if($_REQUEST['empid']==1305){ echo $_REQUEST['value'].' - '.$_REQUEST['empid'].' - '.$_REQUEST['Att_Value'].' - '.$_REQUEST['Att_Date'].' - '.$_REQUEST['In_Remark'].' - '.$_REQUEST['InTime'].' - '.$_REQUEST['InLocation'].' - '.$_REQUEST['InLat'].' - '.$_REQUEST['InLong']; }

$data=$_REQUEST['value'].'-'.$_REQUEST['empid'].'-'.$_REQUEST['Att_Value'].'-'.$_REQUEST['Att_Date'].'-'.$_REQUEST['InTime'].'-'.$_REQUEST['InLocation'].'-'.$_REQUEST['InLat'].'-'.$_REQUEST['InLong'];

//Punch_In_Attendance 
if($_REQUEST['value'] == 'Punch_In_Attendance' && $_REQUEST['empid']>0 && $_REQUEST['Att_Value']!='' && $_REQUEST['Att_Date']!='' && $_REQUEST['InTime']!='' && $_REQUEST['InLocation']!='' && $_REQUEST['InLat']!='' && $_REQUEST['InLong']!='')
{  
    
    
    $eid=$_REQUEST['empid']; 
	$attv=$_REQUEST['Att_Value']; 
	$attd=date("Y-m-d",strtotime($_REQUEST['Att_Date']));
	$attTime=date("H:i:s",strtotime($_REQUEST['InTime']));
	$attdEv=$attd.' '.$attTime;
	$atty=date("Y",strtotime($attd));
	$attd_rmk=$_REQUEST['In_Remark'];
	$inLoc=$_REQUEST['InLocation'];
	$inLat=$_REQUEST['InLat'];
	$inLong=$_REQUEST['InLong'];
	
	$sE=mysqli_query($con, "select CompanyId from hrm_employee where EmployeeID=".$eid);
	$rE=mysqli_fetch_assoc($sE); $com=$rE['CompanyId'];
	$sY=mysqli_query($con, "select YearId from hrm_year where Company".$com."Status='A'");
	$rY=mysqli_fetch_assoc($sY); 
	
	$sql=mysqli_query($con, "select Leave_Type,LeaveStatus from hrm_employee_applyleave WHERE EmployeeID=".$eid." AND ('".$attd."'>=Apply_FromDate AND '".$attd."'<=Apply_ToDate) AND LeaveStatus!=3 AND LeaveCancelStatus!='Y'"); 
	$row=mysqli_num_rows($sql);
	
	//if($_REQUEST['empid']==1305){ echo 'aa'; }
	
	if($row==0)
	{  
	 /*------------------ 111111111111111111 ---------------- */
	 /*------------------ 111111111111111111 ---------------- */
	 
	 if($attv=='P' OR $attv=='A' OR $attv=='OD')
	 {
	  
	  $sql2=mysqli_query($con, "select * from hrm_employee_attendance WHERE EmployeeID=".$eid." AND AttDate='".$attd."'"); 
	  $row2=mysqli_num_rows($sql2); 
	  if($row2>0)
	  {  
	    $res2=mysqli_fetch_assoc($sql2); 
	    if($res2['AttValue']!='CL' AND $res2['AttValue']!='CH' AND $res2['AttValue']!='SL' AND $res2['AttValue']!='SH' AND $res2['AttValue']!='PL' AND $res2['AttValue']!='PH' AND $res2['AttValue']!='EL' AND $res2['AttValue']!='FL' AND $res2['AttValue']!='TL'){ $sqlUp=mysqli_query($con, "update hrm_employee_attendance set AttValue='".$attv."' WHERE EmployeeID=".$eid." AND AttDate='".$attd."'"); } 
      }
	  elseif($row2==0 AND date("w",strtotime($attd))!=0)
	  {
	    
        $sqlUp = mysqli_query($con, "insert into hrm_employee_attendance(EmployeeID, AttValue, AttDate, Year, YearId) values(".$eid.",'".$attv."', '".$attd."', '".date("Y")."', ".$rY['YearId'].")");  
	  }else{ echo json_encode( array("Code" => "100", "Msg" => "Error!") ); }
		
	   if($sqlUp)
	   {    
	   
		/*********************************************/
		/*********************************************/
		
		
		
		$sqlm=mysqli_query($con, "Select MorEveRepId from hrm_employee_moreve_report_".$atty." WHERE EmployeeID=".$eid." AND MorEveDate='".$attd."'"); $rowsm = mysqli_num_rows($sqlm);  
	    if($rowsm>0)
	    { $resm=mysqli_fetch_assoc($sqlm); 
		  if($resm['Att']!='CL' AND $resm['Att']!='CH' AND $resm['Att']!='SL' AND $resm['Att']!='SH' AND $resm['Att']!='PL' AND $resm['Att']!='PH' AND $resm['Att']!='EL' AND $resm['Att']!='FL' AND $resm['Att']!='TL')
		  {   
		   if($resm['MorReports']!=''){ $MERep='EveReports'; $MEDate='EveDateTime'; }
		   else{ $MERep='MorReports'; $MEDate='MorDateTime'; }
		   
		   $sqlUp = mysqli_query($con, "UPDATE hrm_employee_moreve_report_".$atty." SET ".$MEDate."='".$attdEv."', ".$MERep."='".$attd_rmk."', Att='".$attv."', UpAtt='Y', SignIn_Time='".$attdEv."', SignIn_Loc='".$inLoc."', SignIn_Lat='".$inLat."', SignIn_Long='".$inLong."', In_withoutLocation='".$_REQUEST['withoutLocation']."' WHERE EmployeeID=".$eid." AND MorEveRepId=".$resm['MorEveRepId']."");  
		  }
	    } 
	    elseif($rowsm==0 AND date("w",strtotime($attd))!=0)
	    { 
	          
	      $sqlUp = mysqli_query($con, "insert into hrm_employee_moreve_report_".$atty." (EmployeeID, MorEveDate, MorDateTime, MorReports, Att, SignIn_Time, SignIn_Loc, SignIn_Lat, SignIn_Long, UpAtt, In_withoutLocation) values(".$eid.", '".$attd."', '".$attdEv."', '".$attd_rmk."', '".$attv."', '".$attdEv."', '".$inLoc."', '".$inLat."', '".$inLong."', 'Y', '".$_REQUEST['withoutLocation']."')");   
	        
	      //echo "insert into hrm_employee_moreve_report_".$atty." (EmployeeID, MorEveDate, MorDateTime, MorReports, Att, SignIn_Time, SignIn_Loc, SignIn_Lat, SignIn_Long, UpAtt) values(".$eid.", '".$attd."', '".$attdEv."', '".$attd_rmk."', '".$attv."', '".$attdEv."', '".$inLoc."', '".$inLat."', '".$inLong."', 'Y')";     
	    }  
		/*********************************************/
		/*********************************************/ 
		echo json_encode( array("Code" => "300", "Msg" => "In Data Inserted") );

	   } //if($sqlUp)
	   else{ echo json_encode( array("Code" => "100", "Msg" => "Procees in error - 3!") ); }
		
		
		
	 } //if($attv=='P' OR $attv=='A' OR $attv=='OD')
	 else{ echo json_encode( array("Code" => "100", "Msg" => "Procees in error - 2!") ); } 
	 
	/*------------------ 111111111111111111 -----------------*/
	/*------------------ 111111111111111111 ---------------- */
	} //if($row==0)
	else{ echo json_encode( array("Code" => "100", "Msg" => "Procees in error - 1!") ); }
   
}


//Punch_Out_Attendance
elseif($_REQUEST['value'] == 'Punch_Out_Attendance' && $_REQUEST['empid']>0 && $_REQUEST['Att_Date']!='' && $_REQUEST['Out_Remark']!='' && $_REQUEST['OutTime']!='' && $_REQUEST['OutLocation']!='' && $_REQUEST['OutLat']!='' && $_REQUEST['OutLong']!='')
{  
  
 $eid=$_REQUEST['empid']; 
 $attd=date("Y-m-d",strtotime($_REQUEST['Att_Date']));
 $attTime=date("H:i:s",strtotime($_REQUEST['OutTime']));
 $attdEv=$attd.' '.$attTime;
 $atty=date("Y",strtotime($attd));
 $attd_rmk=$_REQUEST['Out_Remark'];
 $OutLoc=$_REQUEST['OutLocation'];
 $OutLat=$_REQUEST['OutLat'];
 $OutLong=$_REQUEST['OutLong'];
 
  $sql=mysqli_query($con, "Select * from hrm_employee_moreve_report_".$atty." WHERE EmployeeID=".$eid." AND MorEveDate='".$attd."'"); $rows = mysqli_num_rows($sql); 
  if($rows>0)
  { 
    $sqlUp = mysqli_query($con, "UPDATE hrm_employee_moreve_report_".$atty." SET EveDateTime='".$attdEv."', EveReports='".$attd_rmk."', SignOut_Time='".$attdEv."', SignOut_Loc='".$OutLoc."', SignOut_Lat='".$OutLat."', SignOut_Long='".$OutLong."', Out_withoutLocation='".$_REQUEST['withoutLocation']."' WHERE EmployeeID=".$eid." AND MorEveDate='".$attd."'"); 
  }
  else
  { 
	$sqlUp = mysqli_query($con, "insert into hrm_employee_moreve_report_".$atty."(EmployeeID, MorEveDate, EveDateTime, EveReports, SignOut_Time, SignOut_Loc, SignOut_Lat, SignOut_Long, Out_withoutLocation) values(".$eid.", '".$attd."', '".$attdEv."', '".$attd_rmk."', '".$attdEv."', '".$OutLoc."', '".$OutLat."', '".$OutLong."', '".$_REQUEST['withoutLocation']."')"); 
  }
  if($sqlUp){ echo json_encode( array("Code" => "300", "Msg" => "Out Data Inserted") ); }  
	   
}






//Attendance_Authorization
elseif($_REQUEST['value'] == 'Attendance_Authorization' && $_REQUEST['empid']>0 && $_REQUEST['AttDate']!='' && ($_REQUEST['reasonI']!='' || $_REQUEST['reasonO']!='' || $_REQUEST['reason']!='') && ($_REQUEST['remarkI']!='' || $_REQUEST['remarkO']!='' || $_REQUEST['remark']!=''))
{ 
  $eid=$_REQUEST['empid'];
  
  
  if($_REQUEST['AttDate']>date("Y-m-d") AND ($_REQUEST['reasonI']=='WFH' OR $_REQUEST['reasonO']=='WFH' OR $_REQUEST['reason']=='WFH')){ echo json_encode( array("Code" => "100", "Msg" => "WFH attendance, accepted to only current or back date!") ); }
  else
  {
  
  $search =  '!"#$%/\':_' ; $search = str_split($search);
  if($_REQUEST['remarkI']!='' && $_REQUEST['remarkO']=='')
  { $RemarkI=str_replace($search, "", $_REQUEST['remarkI']); $RemarkO=''; $Remark=''; $InR='Y'; $OutR='N'; 
    $AllRemark=$RemarkI; }
 
  elseif($_REQUEST['remarkI']=='' && $_REQUEST['remarkO']!='')
  { $RemarkO=str_replace($search, "", $_REQUEST['remarkO']); $RemarkI=''; $Remark=''; $InR='N'; $OutR='Y'; 
    $AllRemark=$RemarkO;}
 
  elseif($_REQUEST['remarkI']!='' && $_REQUEST['remarkO']!='')
  { $RemarkI=str_replace($search, "", $_REQUEST['remarkI']); $RemarkO=str_replace($search, "", $_REQUEST['remarkO']); 
    $Remark=''; $InR='Y'; $OutR='Y'; $AllRemark=$RemarkI.' & '.$RemarkO; }
 
  elseif($_REQUEST['remark']!='')
  { $Remark=str_replace($search, "", $_REQUEST['remark']); $RemarkI=''; $RemarkO=''; $InR='N'; $OutR='N'; 
    $AllRemark=$Remark; }
  
  $sqlApp=mysqli_query($con, "select * from hrm_employee_reporting where EmployeeID='".$eid."'"); 
  $resApp=mysqli_fetch_assoc($sqlApp);
  if($resApp['AppraiserId']==''){ $RId=0; }else{ $RId=$resApp['AppraiserId']; }
  if($resApp['ReviewerId']==''){ $HId=0; }else{ $HId=$resApp['ReviewerId']; }
  if($resApp['HodId']==''){ $HtId=0; }else{ $HtId=$resApp['HodId']; }
  
  $ReqTime=date("H:i:00"); $InTime='00:00:00';
  
  $chkAtt=mysqli_query($con, "select * from hrm_employee_attendance where AttDate='".date("Y-m-d",strtotime($_REQUEST['AttDate']))."' AND EmployeeID=".$eid); $CountAtt=mysqli_num_rows($chkAtt);
  
  
  $dv = intval(date("d"));
  $s2E=mysqli_query($con, "select I".$dv." from hrm_employee_attendance_settime where EmployeeID=".$eid); 
  $row2E=mysqli_num_rows($s2E); $r2E=mysqli_fetch_assoc($s2E);
  if($row2E>0){ $InTime=date("H:i:00",strtotime($r2E['I'.$dv])); } 
 
  $Ins=mysqli_query($con, "insert into hrm_employee_attendance_req(EmployeeID, AttDate, InReason, InRemark, OutReason, OutRemark, Reason, Remark, RId, HId, HtId, InR, OutR, InLat, InLong, ReqDate, ReqTime, CrDate, CrTime) values('".$eid."', '".$_REQUEST['AttDate']."', '".$_REQUEST['reasonI']."', '".$RemarkI."', '".$_REQUEST['reasonO']."', '".$RemarkO."', '".$_REQUEST['reason']."', '".$Remark."', '".$RId."', '".$HId."', '".$HtId."', '".$InR."', '".$OutR."', '".$_REQUEST['InLat']."', '".$_REQUEST['InLong']."', '".date("Y-m-d")."', '".$ReqTime."', '".date("Y-m-d")."', '".date("H:i:S")."')");
  
  
  
  /********************************************************************************************/
  /********************************************************************************************/
  if($Ins)
  {
    
   
 
/******************* Checking Checking Open **********/
/******************* Checking Checking Open **********/
if(($_REQUEST['remarkI']!='' AND $_REQUEST['remarkO']=='' AND ($_REQUEST['reasonI']=='OD' OR $_REQUEST['reasonI']=='WFH' OR $_REQUEST['reasonI']=='Tour' OR $_REQUEST['reasonI']=='Meeting')) OR ($_REQUEST['remarkI']=='' AND $_REQUEST['remarkO']!='' AND ($_REQUEST['reasonO']=='OD' OR $_REQUEST['reasonO']=='WFH' OR $_REQUEST['reasonO']=='Tour' OR $_REQUEST['reasonO']=='Meeting')) OR ($_REQUEST['remarkI']!='' AND $_REQUEST['remarkO']!='' AND ($_REQUEST['reasonI']=='OD' OR $_REQUEST['reasonI']=='WFH' OR $_REQUEST['reasonI']=='Tour' OR $_REQUEST['reasonI']=='Meeting') AND ($_REQUEST['reasonO']=='OD' OR $_REQUEST['reasonO']=='WFH' OR $_REQUEST['reasonO']=='Tour' OR $_REQUEST['reasonO']=='Meeting')) OR ($_REQUEST['remark']!='' AND ($_REQUEST['reason']=='OD' OR $_REQUEST['reason']=='WFH' OR $_REQUEST['reason']=='Tour' OR $_REQUEST['reason']=='Meeting')))
{

 if($_REQUEST['remarkI']!='' AND $_REQUEST['remarkO']=='' AND ($_REQUEST['reasonI']=='OD' OR ($_REQUEST['reasonI']=='WFH' AND $_REQUEST['AttDate']==date("Y-m-d") AND $InTime!='00:00:00' AND strtotime($ReqTime)<=strtotime($InTime)) OR $_REQUEST['reasonI']=='Tour' OR $_REQUEST['reasonI']=='Meeting'))
 { $Up=mysqli_query($con, "update hrm_employee_attendance_req set InStatus=2, Status=1 where EmployeeID=".$eid." AND AttDate='".$_REQUEST['AttDate']."'"); if($Up){ if($_REQUEST['reasonI']=='WFH'){$attv='WFH';}else{$attv='OD';} if($CountAtt==1){ $sUp=mysqli_query($con, "UPDATE hrm_employee_attendance SET AttValue='".$attv."', InnCnt='N', OuttCnt='N' where AttDate='".$_REQUEST['AttDate']."' AND EmployeeID=".$eid);}else{$sUp=mysqli_query($con, "insert into hrm_employee_attendance(EmployeeID, AttValue, AttDate) values(".$eid.", '".$attv."', '".$_REQUEST['AttDate']."')");} } }

 elseif($_REQUEST['remarkI']=='' AND $_REQUEST['remarkO']!='' AND ($_REQUEST['reasonO']=='OD' OR ($_REQUEST['reasonO']=='WFH' AND $_REQUEST['AttDate']==date("Y-m-d") AND $InTime!='00:00:00' AND strtotime($ReqTime)<=strtotime($InTime)) OR $_REQUEST['reasonO']=='Tour' OR $_REQUEST['reasonO']=='Meeting'))
 { $Up=mysqli_query($con, "update hrm_employee_attendance_req set OutStatus=2, Status=1 where EmployeeID=".$eid." AND AttDate='".$_REQUEST['AttDate']."'"); if($Up){ if($_REQUEST['reasonO']=='WFH'){$attv='WFH';}else{$attv='OD';} if($CountAtt==1){ $sUp=mysqli_query($con, "UPDATE hrm_employee_attendance SET AttValue='".$attv."', InnCnt='N', OuttCnt='N' where AttDate='".$_REQUEST['AttDate']."' AND EmployeeID=".$eid);}else{$sUp=mysqli_query($con, "insert into hrm_employee_attendance(EmployeeID, AttValue, AttDate) values(".$eid.", '".$attv."', '".$_REQUEST['AttDate']."')");} } }

 elseif($_REQUEST['remarkI']!='' AND $_REQUEST['remarkO']!='')
 {
  if($_REQUEST['reasonI']=='OD' OR ($_REQUEST['reasonI']=='WFH' AND $_REQUEST['AttDate']==date("Y-m-d") AND $InTime!='00:00:00' AND strtotime($ReqTime)<=strtotime($InTime)) OR $_REQUEST['reasonI']=='Tour' OR $_REQUEST['reasonI']=='Meeting'){$InS=2;}else{$InS=0;}
  if($_REQUEST['reasonO']=='OD' OR ($_REQUEST['reasonO']=='WFH' AND $_REQUEST['AttDate']==date("Y-m-d") AND $InTime!='00:00:00' AND strtotime($ReqTime)<=strtotime($InTime)) OR $_REQUEST['reasonO']=='Tour' OR $_REQUEST['reasonO']=='Meeting'){$OtS=2;}else{$OtS=0;}
  
  $Up=mysqli_query($con, "update hrm_employee_attendance_req set InStatus=".$InS.", OutStatus=".$OtS.", Status=1 where EmployeeID=".$eid." AND AttDate='".$_REQUEST['AttDate']."'");
  if($Up AND $InS==2 AND $OtS==2){ if($_REQUEST['reasonI']=='WFH' AND $_REQUEST['reasonO']=='WFH'){$attv='WFH';}else{$attv='OD';} if($CountAtt==1){ $sUp=mysqli_query($con, "UPDATE hrm_employee_attendance SET AttValue='".$attv."', InnCnt='N', OuttCnt='N' where AttDate='".$_REQUEST['AttDate']."' AND EmployeeID=".$eid);}else{$sUp=mysqli_query($con, "insert into hrm_employee_attendance(EmployeeID, AttValue, AttDate) values(".$eid.", '".$attv."', '".$_REQUEST['AttDate']."')");} } }

 elseif($_REQUEST['remark']!='' AND ($_REQUEST['reason']=='OD' OR ($_REQUEST['reason']=='WFH' AND $_REQUEST['AttDate']==date("Y-m-d") AND $InTime!='00:00:00' AND strtotime($ReqTime)<=strtotime($InTime)) OR $_REQUEST['reason']=='Tour' OR $_REQUEST['reason']=='Meeting'))
 { $Up=mysqli_query($con, "update hrm_employee_attendance_req set SStatus=2, Status=1 where EmployeeID=".$eid." AND AttDate='".$_REQUEST['AttDate']."'"); if($Up){ if($_REQUEST['reason']=='WFH'){$attv='WFH';}else{$attv='OD';} if($CountAtt==1){ $sUp=mysqli_query($con, "UPDATE hrm_employee_attendance SET AttValue='".$attv."', InnCnt='N', OuttCnt='N' where AttDate='".$_REQUEST['AttDate']."' AND EmployeeID=".$eid);}else{$sUp=mysqli_query($con, "insert into hrm_employee_attendance(EmployeeID, AttValue, AttDate) values(".$eid.", '".$attv."', '".$_REQUEST['AttDate']."')");} } }
 
 elseif($_REQUEST['reason']=='WFH' AND ($_REQUEST['AttDate']!=date("Y-m-d") OR ($_REQUEST['AttDate']==date("Y-m-d") AND $InTime!='00:00:00' AND strtotime($ReqTime)>strtotime($InTime))))
 {
 
  if($CountAtt==1){ $sUp=mysqli_query($con, "UPDATE hrm_employee_attendance SET InnCnt='N', OuttCnt='N' where AttDate='".$_REQUEST['AttDate']."' AND EmployeeID=".$eid);}else{$sUp=mysqli_query($con, "insert into hrm_employee_attendance(EmployeeID, AttDate) values(".$eid.", '".$_REQUEST['AttDate']."')"); }
 
 }

 
/*********** AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA ************************************/
/*********** AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA ************************************/
  $dd=intval(date("d",strtotime($_REQUEST['AttDate']))); 
  $mm=date("m",strtotime($_REQUEST['AttDate'])); $yy=date("Y",strtotime($_REQUEST['AttDate']));
  $mkdate = mktime(0,0,0, $mm, 1, $yy);
  $nodinm = date('t',$mkdate);  //Number of days in the given month (28-31)

 $NextDate=date("Y-m-d",strtotime('+1 day', strtotime($_REQUEST['AttDate'])));
/************************************************/ 	 
 for($i=$NextDate; $i<=date(date("Y",strtotime($_REQUEST['AttDate']))."-".date("m",strtotime($_REQUEST['AttDate']))."-d"); $i++)
 { 
   $d2d=intval(date("d",strtotime($i)));
   $sE=mysqli_query($con, "select AttValue,Inn,Outt,InnCnt,OuttCnt,InnLate,OuttLate,Late,Af15 from hrm_employee_attendance where EmployeeID=".$eid." AND AttDate='".$_REQUEST['AttDate']."'"); $rowE=mysqli_num_rows($sE); $rE=mysqli_fetch_assoc($sE);
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
     $IIn=mysqli_query($con, "select SUM(InnLate) as ILate from hrm_employee_attendance where EmployeeID=".$eid." AND AttDate>='".date("Y-m-01",strtotime($_REQUEST['AttDate']))."' AND AttDate<'".$i."' AND InnCnt='Y' AND Af15=0"); 
     $OOut=mysqli_query($con, "select SUM(OuttLate) as OLate from hrm_employee_attendance where EmployeeID=".$eid." AND AttDate>='".date("Y-m-01",strtotime($_REQUEST['AttDate']))."' AND AttDate<'".$i."' AND OuttCnt='Y' AND Af15=0"); $rrIn=mysqli_fetch_assoc($IIn); $rrOut=mysqli_fetch_assoc($OOut);
     $tLate=$rrIn['ILate']+$rrOut['OLate']+$tt;	   
     
	 if($rE['AttValue']!='CL' AND $rE['AttValue']!='PL' AND $rE['AttValue']!='SL' AND $rE['AttValue']!='EL' AND $rE['AttValue']!='OD' AND $rE['AttValue']!='WFH' AND $rE['AttValue']!='A')
	{
/************/
    //Check Total CL Availed in month 
	$sCL=mysqli_query($con, "select SUM(Apply_TotalDay) as aCL from hrm_employee_applyleave where LeaveStatus!=4 AND LeaveStatus!=3 AND LeaveStatus!=2 AND EmployeeID=".$eid." AND Apply_FromDate>='".date("Y-m-01",strtotime($_REQUEST['AttDate']))."' AND Apply_ToDate<='".date("Y-m-31",strtotime($_REQUEST['AttDate']))."' AND (Leave_Type='CL' OR Leave_Type='CH')"); 
	$ssCL=mysqli_query($con, "select Count(AttValue) as aaCL from hrm_employee_attendance where EmployeeID=".$eid." AND AttDate between '".date("Y-m-01",strtotime($_REQUEST['AttDate']))."' AND '".date("Y-m-31",strtotime($_REQUEST['AttDate']))."' AND AttDate!='".$i."' AND AttValue='CL'"); $rCL=mysqli_fetch_array($sCL); $rrCL=mysqli_fetch_array($ssCL);
	$ssCH=mysqli_query($con, "select Count(AttValue) as aaCH from hrm_employee_attendance where EmployeeID=".$eid." AND AttDate between '".date("Y-m-01",strtotime($_REQUEST['AttDate']))."' AND '".date("Y-m-31",strtotime($_REQUEST['AttDate']))."' AND AttDate!='".$i."' AND AttValue='CH'"); $rrCH=mysqli_fetch_array($ssCH); $CountCH=$rrCH['aaCH']/2; $tCL=$rCL['aCL']+$rrCL['aaCL']+$CountCH;
	//Check Total PL Availed in month
	$sPL=mysqli_query($con, "select SUM(Apply_TotalDay) as aPL from hrm_employee_applyleave where LeaveStatus!=4 AND LeaveStatus!=3 AND LeaveStatus!=2 AND EmployeeID=".$eid." AND Apply_FromDate>='".date("Y-m-01",strtotime($_REQUEST['AttDate']))."' AND Apply_ToDate<='".date("Y-m-31",strtotime($_REQUEST['AttDate']))."' AND (Leave_Type='PL' OR Leave_Type='PH')"); 
	$ssPL=mysqli_query($con, "select Count(AttValue) as aaPL from hrm_employee_attendance where EmployeeID=".$eid." AND AttDate between '".date("Y-m-01",strtotime($_REQUEST['AttDate']))."' AND '".date("Y-m-31",strtotime($_REQUEST['AttDate']))."' AND AttDate!='".$i."' AND AttValue='PL'"); $rPL=mysqli_fetch_array($sPL); $rrPL=mysqli_fetch_array($ssPL);
	$ssPH=mysqli_query($con, "select Count(AttValue) as aaPH from hrm_employee_attendance where EmployeeID=".$eid." AND AttDate between '".date("Y-m-01",strtotime($_REQUEST['AttDate']))."' AND '".date("Y-m-31",strtotime($_REQUEST['AttDate']))."' AND AttDate!='".$i."' AND AttValue='PH'"); $rrPH=mysqli_fetch_array($ssPH); $CountPH=$rrPH['aaPH']/2; $tPL=$rPL['aPL']+$rrPL['aaPL']+$CountPH;
        //Check Total SL Availed in month 
	  $sSL=mysqli_query($con, "select SUM(Apply_TotalDay) as aSL from hrm_employee_applyleave where LeaveStatus!=4 AND LeaveStatus!=3 AND LeaveStatus!=2 AND EmployeeID=".$eid." AND Apply_FromDate>='".date("Y-m-01",strtotime($_REQUEST['AttDate']))."' AND Apply_ToDate<='".date("Y-m-31",strtotime($_REQUEST['AttDate']))."' AND (Leave_Type='SL' OR Leave_Type='SH')"); $rSL=mysqli_fetch_array($sSL);
	  $ssSL=mysqli_query($con, "select Count(AttValue) as aaSL from hrm_employee_attendance where EmployeeID=".$eid." AND AttDate>='".date("Y-m-01",strtotime($_REQUEST['AttDate']))."' AND AttDate<='".date("Y-m-31",strtotime($_REQUEST['AttDate']))."' AND AttValue='SL'"); $rrSL=mysqli_fetch_array($ssSL);
	  $ssSH=mysqli_query($con, "select Count(AttValue) as aaSH from hrm_employee_attendance where EmployeeID=".$eid." AND AttDate>='".date("Y-m-01",strtotime($_REQUEST['AttDate']))."' AND AttDate<='".date("Y-m-31",strtotime($_REQUEST['AttDate']))."' AND AttValue='SH'"); $rrSH=mysqli_fetch_array($ssSH);
	  $CountSH=$rrSH['aaSH']/2; $tSL=$rSL['aSL']+$rrSL['aaSL']+$CountSH;

	//Check Balce CL & PL in month
	$op=mysqli_query($con, "select OpeningCL,OpeningPL,OpeningSL,CreditedCL,CreditedPL,,CreditedSL from hrm_employee_monthlyleave_balance where EmployeeID=".$eid." AND Month='".date("m",strtotime($_REQUEST['AttDate']))."' AND Year='".date("Y",strtotime($_REQUEST['AttDate']))."'"); $rowp=mysqli_num_rows($op); $rop=mysqli_fetch_array($op); 
	//$balCL=$rop['OpeningCL']-$tCL; $balPL=$rop['OpeningPL']-$tPL;
	if($rowp>0){ $balCL=($rop['OpeningCL']+$rop['CreditedCL'])-$tCL; $balPL=($rop['OpeningPL']+$rop['CreditedPL'])-$tPL; $balSL=($rop['OpeningSL']+$rop['CreditedSL'])-$tSL; }
    else { $Pmm=date('m', strtotime("-1 months", strtotime($_REQUEST['AttDate']))); 
	       $Pyy=date('Y', strtotime("-1 months", strtotime($_REQUEST['AttDate']))); 
	       $op2=mysqli_query($con, "select BalanceCL,BalancePL,BalanceSL from hrm_employee_monthlyleave_balance where EmployeeID=".$eid." AND Month='".$Pmm."' AND Year='".$Pyy."'"); $rop2=mysqli_fetch_array($op2);
	       $balCL=$rop2['BalanceCL']-$tCL; $balPL=$rop2['BalancePL']-$tPL; $balSL=$rop2['BalanceSL']-$tSL; }	 	  
	
	$schk=mysqli_query($con, "select Leave_Type from hrm_employee_applyleave where LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$eid." AND Apply_FromDate='".$i."' AND Apply_ToDate='".$i."' AND (Leave_Type='SH' OR Leave_Type='CH' OR Leave_Type='PH')"); $rowchk=mysqli_num_rows($schk); $rchk=mysqli_fetch_array($schk);
	
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
  
     $UpAtt=mysqli_query($con, "update hrm_employee_attendance set AttValue='".$Att."', Relax='".$Relax."', Allow='".$Allow."' WHERE EmployeeID=".$eid." AND AttDate='".$i."'");
/******************* 111111111111 Close **************/    
    } 
   } 
 } //for
/*********** AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA ************************************/
/*********** AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA ************************************/
	 
}   

elseif($_REQUEST['remark']!='' AND $_REQUEST['reason']=='Other')
{
 if($CountAtt==1){ $sUp=mysqli_query($con, "UPDATE hrm_employee_attendance SET InnCnt='N', OuttCnt='N' where AttDate='".$_REQUEST['AttDate']."' AND EmployeeID=".$eid);}else{$sUp=mysqli_query($con, "insert into hrm_employee_attendance(EmployeeID, AttDate) values(".$eid.", '".$_REQUEST['AttDate']."')"); }
}


/******************* Checking Checking Close **********/ 
/******************* Checking Checking Close **********/ 


/* Employee */
$sE=mysqli_query($con, "select Fname,Sname,Lname,EmailId_Vnr,Gender,Married,DR from hrm_employee e inner join hrm_employee_general g on e.EmployeeID=g.EmployeeID inner join hrm_employee_personal p on g.EmployeeID=p.EmployeeID where e.EmployeeID=".$eid); $rE=mysqli_fetch_assoc($sE); if($rE['DR']=='Y'){$mE='Dr.';} elseif($rE['Gender']=='M'){$mE='Mr.';} elseif($rE['Gender']=='F' AND $rE['Married']=='Y'){$mE='Mrs.';} elseif($rE['Gender']=='F' AND $rE['Married']=='N'){$mE='Miss.';}

/* Reporting */
$sR=mysqli_query($con, "select Fname,Sname,Lname,EmailId_Vnr,Gender,Married,DR,tokenid,tokenid_ios from hrm_employee e inner join hrm_employee_general g on e.EmployeeID=g.EmployeeID inner join hrm_employee_personal p on g.EmployeeID=p.EmployeeID where e.EmployeeID=".$RId); $rR=mysqli_fetch_assoc($sR); if($rR['DR']=='Y'){$mR='Dr.';} elseif($rR['Gender']=='M'){$mR='Mr.';} elseif($rR['Gender']=='F' AND $rR['Married']=='Y'){$mR='Mrs.';} elseif($rR['Gender']=='F' AND $rR['Married']=='N'){$mR='Miss.';}

/* HOD */
$sH=mysqli_query($con, "select Fname,Sname,Lname,EmailId_Vnr,Gender,Married,DR from hrm_employee e inner join hrm_employee_general g on e.EmployeeID=g.EmployeeID inner join hrm_employee_personal p on g.EmployeeID=p.EmployeeID where e.EmployeeID=".$HId); $rH=mysqli_fetch_assoc($sH); if($rH['DR']=='Y'){$mH='Dr.';} elseif($rH['Gender']=='M'){$mH='Mr.';} elseif($rH['Gender']=='F' AND $rH['Married']=='Y'){$mH='Mrs.';} elseif($rH['Gender']=='F' AND $rH['Married']=='N'){$mH='Miss.';}

/* krishna */
$sHr=mysqli_query($con, "select Fname,Sname,Lname,EmailId_Vnr,Gender,Married,DR from hrm_employee e inner join hrm_employee_general g on e.EmployeeID=g.EmployeeID inner join hrm_employee_personal p on g.EmployeeID=p.EmployeeID where e.EmployeeID=83"); $rHr=mysqli_fetch_assoc($sHr); if($rHr['DR']=='Y'){$mHr='Dr.';} elseif($rHr['Gender']=='M'){$mHr='Mr.';} elseif($rHr['Gender']=='F' AND $rHr['Married']=='Y'){$mHr='Mrs.';} elseif($rHr['Gender']=='F' AND $rHr['Married']=='N'){$mHr='Miss.';}


  if($rR['EmailId_Vnr']!='')  //Reporting
  {
  // $eto = $rR['EmailId_Vnr'];
  // $efrom = 'admin@vnrseeds.co.in';
   $esub = 'For authorisation of Attendance';
   //$headers = "From: ".$efrom."\r\n"; 
   //$headers = "From: $efrom ". "\r\n";
   //$headers .= "MIME-Version: 1.0\r\n";
   //$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
   $emsg .= "<html><head></head><body>";
   $emsg .= "Dear <b>".$rR['Fname']." ".$rR['Sname']." ".$rR['Lname'].",</b><br><br>\n\n\n";
   
   if(($_REQUEST['remarkI']!='' AND $_REQUEST['remarkO']=='' AND ($_REQUEST['reasonI']=='OD' OR ($_REQUEST['reasonI']=='WFH' AND $_REQUEST['AttDate']==date("Y-m-d") AND $InTime!='00:00:00' AND strtotime($ReqTime)<=strtotime($InTime)) OR $_REQUEST['reasonI']=='Tour' OR $_REQUEST['reasonI']=='Meeting')) OR ($_REQUEST['remarkI']=='' AND $_REQUEST['remarkO']!='' AND ($_REQUEST['reasonO']=='OD' OR ($_REQUEST['reasonO']=='WFH' AND $_REQUEST['AttDate']==date("Y-m-d") AND $InTime!='00:00:00' AND strtotime($ReqTime)<=strtotime($InTime)) OR $_REQUEST['reasonO']=='Tour' OR $_REQUEST['reasonO']=='Meeting')) OR ($_REQUEST['remarkI']!='' AND $_REQUEST['remarkO']!='' AND ($_REQUEST['reasonI']=='OD' OR ($_REQUEST['reasonI']=='WFH' AND $_REQUEST['AttDate']==date("Y-m-d") AND $InTime!='00:00:00' AND strtotime($ReqTime)<=strtotime($InTime)) OR $_REQUEST['reasonI']=='Tour' OR $_REQUEST['reasonI']=='Meeting') AND ($_REQUEST['reasonO']=='OD' OR ($_REQUEST['reasonO']=='WFH' AND $_REQUEST['AttDate']==date("Y-m-d") AND $InTime!='00:00:00' AND strtotime($ReqTime)<=strtotime($InTime)) OR $_REQUEST['reasonO']=='Tour' OR $_REQUEST['reasonO']=='Meeting')) OR ($_REQUEST['remark']!='' AND ($_REQUEST['reason']=='OD' OR ($_REQUEST['reason']=='WFH' AND $_REQUEST['AttDate']==date("Y-m-d") AND $InTime!='00:00:00' AND strtotime($ReqTime)<=strtotime($InTime)) OR $_REQUEST['reason']=='Tour' OR $_REQUEST['reason']=='Meeting'))){ $emsg="Your team member ".$rE['Fname']." ".$rE['Sname']." ".$rE['Lname']." has applied for ".$_REQUEST['reason']." for attendance authorisation for ".date('d-m-Y',strtotime($_REQUEST['AttDate']))." with remark (".$AllRemark.") in ESS. Please log-in in ESS to review. This is an auto-approval application. You may reject the application if found unauthorised.<br><br>\n\n"; }else{ $emsg .= "Your team member ".$rE['Fname']." ".$rE['Sname']." ".$rE['Lname']." has requested for attendance authorisation for dated ".date("d-m-Y",strtotime($_REQUEST['AttDate']))." with remark (".$AllRemark.") in ESS, Please log-in in ESS for taking necessary action.<br><br>\n\n"; }
   
   $emsg .= "From <br><b>ADMIN ESS</b><br>";
   $emsg .= "</body></html>";	      
   //$ok=@mail($eto, $esub, $emsg, $headers);
   
    $subject=$esub;
    $body=$emsg;
    $email_to=$rR['EmailId_Vnr'];
    require 'vendor/mail_admin.php';
   
  }
  
  
      /************ Firbase *******************/
      /************ Firbase *******************/
      if($rR['tokenid']!='')
      {  
         
         include "firebase_api.php";
         $user_token = $rR['tokenid']; 
      }
      elseif($rR['tokenid_ios']!='')
      {  
         
         include "firebase_ios_api.php"; 
         $user_token = $rR['tokenid_ios'];
      }
      
      //$user_token=[];
      //$user_token[] = $rR['tokenid'];
      $data1['subject'] = 'For authorisation of Attendance';
      
      if(($_REQUEST['remarkI']!='' AND $_REQUEST['remarkO']=='' AND ($_REQUEST['reasonI']=='OD' OR ($_REQUEST['reasonI']=='WFH' AND $_REQUEST['AttDate']==date("Y-m-d") AND $InTime!='00:00:00' AND strtotime($ReqTime)<=strtotime($InTime)) OR $_REQUEST['reasonI']=='Tour' OR $_REQUEST['reasonI']=='Meeting')) OR ($_REQUEST['remarkI']=='' AND $_REQUEST['remarkO']!='' AND ($_REQUEST['reasonO']=='OD' OR ($_REQUEST['reasonO']=='WFH' AND $_REQUEST['AttDate']==date("Y-m-d") AND $InTime!='00:00:00' AND strtotime($ReqTime)<=strtotime($InTime)) OR $_REQUEST['reasonO']=='Tour' OR $_REQUEST['reasonO']=='Meeting')) OR ($_REQUEST['remarkI']!='' AND $_REQUEST['remarkO']!='' AND ($_REQUEST['reasonI']=='OD' OR ($_REQUEST['reasonI']=='WFH' AND $_REQUEST['AttDate']==date("Y-m-d") AND $InTime!='00:00:00' AND strtotime($ReqTime)<=strtotime($InTime)) OR $_REQUEST['reasonI']=='Tour' OR $_REQUEST['reasonI']=='Meeting') AND ($_REQUEST['reasonO']=='OD' OR ($_REQUEST['reasonO']=='WFH' AND $_REQUEST['AttDate']==date("Y-m-d") AND $InTime!='00:00:00' AND strtotime($ReqTime)<=strtotime($InTime)) OR $_REQUEST['reasonO']=='Tour' OR $_REQUEST['reasonO']=='Meeting')) OR ($_REQUEST['remark']!='' AND ($_REQUEST['reason']=='OD' OR ($_REQUEST['reason']=='WFH' AND $_REQUEST['AttDate']==date("Y-m-d") AND $InTime!='00:00:00' AND strtotime($ReqTime)<=strtotime($InTime)) OR $_REQUEST['reason']=='Tour' OR $_REQUEST['reason']=='Meeting'))){ $emsgg="Your team member ".$rE['Fname']." ".$rE['Sname']." ".$rE['Lname']." has applied ".$_REQUEST['reason']." for attendance authorisation for ".date('d-m-Y',strtotime($_REQUEST['AttDate']))." with remark (".$AllRemark.") in ESS. Please log-in in ESS to review. This is an auto-approval application. You may reject the application if found unauthorised."; }else{ $emsgg .= "Your team member ".$rE['Fname']." ".$rE['Sname']." ".$rE['Lname']." has requested for attendance authorisation for dated ".date("d-m-Y",strtotime($_REQUEST['AttDate']))." with remark (".$AllRemark.") in ESS, Please log-in in ESS for taking necessary action."; }
      
      $data1['msg_body'] = $emsgg;
	  android($data1,$user_token);
	  /************ Firbase *******************/
	  /************ Firbase *******************/
  
  
  
  if($rH['EmailId_Vnr']!='' AND ($_REQUEST['reasonI']=='Other' OR $_REQUEST['reasonO']=='Other' OR $_REQUEST['reason']=='Other'))  //HOD
  {
   //$eto2 = $rH['EmailId_Vnr'];
   //$efrom2 = 'admin@vnrseeds.co.in';
   $esub2 = 'For authorisation of Attendance';
   //$headers2 = "From: ".$efrom2."\r\n"; 
   //$headers2 = "From: $efrom2 ". "\r\n";
  // $headers2 .= "MIME-Version: 1.0\r\n";
   //$headers2 .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
   $emsg2 .= "<html><head></head><body>";
   $emsg2 .= "Dear <b>".$rH['Fname']." ".$rH['Sname']." ".$rH['Lname'].",</b><br><br>\n\n\n";
   
   if(($_REQUEST['remarkI']!='' AND $_REQUEST['remarkO']=='' AND ($_REQUEST['reasonI']=='OD' OR ($_REQUEST['reasonI']=='WFH' AND $_REQUEST['AttDate']==date("Y-m-d") AND $InTime!='00:00:00' AND strtotime($ReqTime)<=strtotime($InTime)) OR $_REQUEST['reasonI']=='Tour' OR $_REQUEST['reasonI']=='Meeting')) OR ($_REQUEST['remarkI']=='' AND $_REQUEST['remarkO']!='' AND ($_REQUEST['reasonO']=='OD' OR ($_REQUEST['reasonO']=='WFH' AND $_REQUEST['AttDate']==date("Y-m-d") AND $InTime!='00:00:00' AND strtotime($ReqTime)<=strtotime($InTime)) OR $_REQUEST['reasonO']=='Tour' OR $_REQUEST['reasonO']=='Meeting')) OR ($_REQUEST['remarkI']!='' AND $_REQUEST['remarkO']!='' AND ($_REQUEST['reasonI']=='OD' OR ($_REQUEST['reasonI']=='WFH' AND $_REQUEST['AttDate']==date("Y-m-d") AND $InTime!='00:00:00' AND strtotime($ReqTime)<=strtotime($InTime)) OR $_REQUEST['reasonI']=='Tour' OR $_REQUEST['reasonI']=='Meeting') AND ($_REQUEST['reasonO']=='OD' OR ($_REQUEST['reasonO']=='WFH' AND $_REQUEST['AttDate']==date("Y-m-d") AND $InTime!='00:00:00' AND strtotime($ReqTime)<=strtotime($InTime)) OR $_REQUEST['reasonO']=='Tour' OR $_REQUEST['reasonO']=='Meeting')) OR ($_REQUEST['remark']!='' AND ($_REQUEST['reason']=='OD' OR ($_REQUEST['reason']=='WFH' AND $_REQUEST['AttDate']==date("Y-m-d") AND $InTime!='00:00:00' AND strtotime($ReqTime)<=strtotime($InTime)) OR $_REQUEST['reason']=='Tour' OR $_REQUEST['reason']=='Meeting'))){ $emsg2="Your team member ".$rE['Fname']." ".$rE['Sname']." ".$rE['Lname']." reporting to ".$rR['Fname']." ".$rR['Sname']." ".$rR['Lname']." has applied ".$_REQUEST['reason']." as attendance authorisation for ".date('d-m-Y',strtotime($_REQUEST['AttDate']))." with remark (".$AllRemark.") in ESS. Please log-in in ESS for more details.<br><br>\n\n"; }else{ $emsg2 .= "Your team member ".$rE['Fname']." ".$rE['Sname']." ".$rE['Lname']." reporting to ".$rR['Fname']." ".$rR['Sname']." ".$rR['Lname']." has requested for attendance authorisation for dated ".date("d-m-Y",strtotime($_REQUEST['AttDate']))." with remark (".$AllRemark.") in ESS, Please log-in in ESS for more details.<br><br>\n\n"; }
   
   $emsg2 .= "From <br><b>ADMIN ESS</b><br>";
   $emsg2 .= "</body></html>";	      
   //$ok=@mail($eto2, $esub2, $emsg2, $headers2);
   
    $subject=$esub2;
    $body=$emsg2;
    $email_to=$rH['EmailId_Vnr'];
    require 'vendor/mail_admin.php';
   
  }
  
  
  
  if($rHr['EmailId_Vnr']!='')  //HrEmp
  {
   //$eto3 = $rHr['EmailId_Vnr'];
   //$efrom3 = 'admin@vnrseeds.co.in';
   $esub3 = 'For authorisation of Attendance';
   //$headers3 = "From: ".$efrom3."\r\n"; 
   //$headers3 = "From: $efrom3 ". "\r\n";
   //$headers3 .= "MIME-Version: 1.0\r\n";
   //$headers3 .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
   $emsg3 .= "<html><head></head><body>";
   $emsg3 .= "Dear <b>".$rHr['Fname']." ".$rHr['Sname']." ".$rHr['Lname'].",</b><br><br>\n\n\n";
   
   if(($_REQUEST['remarkI']!='' AND $_REQUEST['remarkO']=='' AND ($_REQUEST['reasonI']=='OD' OR ($_REQUEST['reasonI']=='WFH' AND $_REQUEST['AttDate']==date("Y-m-d") AND $InTime!='00:00:00' AND strtotime($ReqTime)<=strtotime($InTime)) OR $_REQUEST['reasonI']=='Tour' OR $_REQUEST['reasonI']=='Meeting')) OR ($_REQUEST['remarkI']=='' AND $_REQUEST['remarkO']!='' AND ($_REQUEST['reasonO']=='OD' OR ($_REQUEST['reasonO']=='WFH' AND $_REQUEST['AttDate']==date("Y-m-d") AND $InTime!='00:00:00' AND strtotime($ReqTime)<=strtotime($InTime)) OR $_REQUEST['reasonO']=='Tour' OR $_REQUEST['reasonO']=='Meeting')) OR ($_REQUEST['remarkI']!='' AND $_REQUEST['remarkO']!='' AND ($_REQUEST['reasonI']=='OD' OR ($_REQUEST['reasonI']=='WFH' AND $_REQUEST['AttDate']==date("Y-m-d") AND $InTime!='00:00:00' AND strtotime($ReqTime)<=strtotime($InTime)) OR $_REQUEST['reasonI']=='Tour' OR $_REQUEST['reasonI']=='Meeting') AND ($_REQUEST['reasonO']=='OD' OR ($_REQUEST['reasonO']=='WFH' AND $_REQUEST['AttDate']==date("Y-m-d") AND $InTime!='00:00:00' AND strtotime($ReqTime)<=strtotime($InTime)) OR $_REQUEST['reasonO']=='Tour' OR $_REQUEST['reasonO']=='Meeting')) OR ($_REQUEST['remark']!='' AND ($_REQUEST['reason']=='OD' OR ($_REQUEST['reason']=='WFH' AND $_REQUEST['AttDate']==date("Y-m-d") AND $InTime!='00:00:00' AND strtotime($ReqTime)<=strtotime($InTime)) OR $_REQUEST['reason']=='Tour' OR $_REQUEST['reason']=='Meeting'))){ $emsg3=$rE['Fname']." ".$rE['Sname']." ".$rE['Lname']." applied ".$_REQUEST['reason']." for attendance authorisation for ".date("d-m-Y",strtotime($_REQUEST['AttDate']))." with remark (".$AllRemark.") in ESS. This is an auto-approval application. for details, kindly log on to ESS.<br><br>\n\n"; }else{ $emsg3 .= $_REQUEST['Ename']." has requested for attendance authorisation for dated ".date("d-m-Y",strtotime($_REQUEST['AttDate']))." with remark (".$AllRemark.") in ESS, for details, kindly log on to ESS.<br><br>\n\n"; }

   $emsg3 .= "From <br><b>ADMIN ESS</b><br>";
   $emsg3 .= "</body></html>";	      
   //$ok=@mail($eto3, $esub3, $emsg3, $headers3);
   
    $subject=$esub3;
    $body=$emsg3;
    $email_to=$rHr['EmailId_Vnr'];
    require 'vendor/mail_admin.php';
   
  }
  
  /*HR*/                                              //HR
   //$eto4 = 'vspl.attendance@gmail.com';  //vspl.hr@vnrseeds.com
   //$efrom4 = 'admin@vnrseeds.co.in';
   $esub4 = 'For authorisation of Attendance';
   //$headers4 = "From: ".$efrom4."\r\n"; 
  // $headers4 = "From: $efrom4 ". "\r\n";
   //$headers4 .= "MIME-Version: 1.0\r\n";
   //$headers4 .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
   $emsg4 .= "<html><head></head><body>";
   $emsg4 .= "Dear <b>Sir/Mam, </b> <br><br>\n\n\n";
   
   if(($_REQUEST['remarkI']!='' AND $_REQUEST['remarkO']=='' AND ($_REQUEST['reasonI']=='OD' OR ($_REQUEST['reasonI']=='WFH' AND $_REQUEST['AttDate']==date("Y-m-d") AND $InTime!='00:00:00' AND strtotime($ReqTime)<=strtotime($InTime)) OR $_REQUEST['reasonI']=='Tour' OR $_REQUEST['reasonI']=='Meeting')) OR ($_REQUEST['remarkI']=='' AND $_REQUEST['remarkO']!='' AND ($_REQUEST['reasonO']=='OD' OR ($_REQUEST['reasonO']=='WFH' AND $_REQUEST['AttDate']==date("Y-m-d") AND $InTime!='00:00:00' AND strtotime($ReqTime)<=strtotime($InTime)) OR $_REQUEST['reasonO']=='Tour' OR $_REQUEST['reasonO']=='Meeting')) OR ($_REQUEST['remarkI']!='' AND $_REQUEST['remarkO']!='' AND ($_REQUEST['reasonI']=='OD' OR ($_REQUEST['reasonI']=='WFH' AND $_REQUEST['AttDate']==date("Y-m-d") AND $InTime!='00:00:00' AND strtotime($ReqTime)<=strtotime($InTime)) OR $_REQUEST['reasonI']=='Tour' OR $_REQUEST['reasonI']=='Meeting') AND ($_REQUEST['reasonO']=='OD' OR ($_REQUEST['reasonO']=='WFH' AND $_REQUEST['AttDate']==date("Y-m-d") AND $InTime!='00:00:00' AND strtotime($ReqTime)<=strtotime($InTime)) OR $_REQUEST['reasonO']=='Tour' OR $_REQUEST['reasonO']=='Meeting')) OR ($_REQUEST['remark']!='' AND ($_REQUEST['reason']=='OD' OR ($_REQUEST['reason']=='WFH' AND $_REQUEST['AttDate']==date("Y-m-d") AND $InTime!='00:00:00' AND strtotime($ReqTime)<=strtotime($InTime)) OR $_REQUEST['reason']=='Tour' OR $_REQUEST['reason']=='Meeting')))
   { 
       $emsg4 .= $rE['Fname']." ".$rE['Sname']." ".$rE['Lname']." applied ".$_REQUEST['reason']." for attendance authorisation for ".date("d-m-Y",strtotime($_REQUEST['AttDate']))." with remark (".$AllRemark.") in ESS. This is an auto-approval application. for details, kindly log on to ESS.<br><br>\n\n"; }else{ $emsg4 .= $rE['Fname']." ".$rE['Sname']." ".$rE['Lname']." has requested for attendance authorisation for dated ".date("d-m-Y",strtotime($_REQUEST['AttDate']))." with remark (".$AllRemark.") in ESS, for details, kindly log on to ESS.<br><br>\n\n"; }

   $emsg4 .= "From <br><b>ADMIN ESS</b><br>";
   $emsg4 .= "</body></html>";	      
   //$ok=@mail($eto4, $esub4, $emsg4, $headers4);
   
    $subject=$esub4;
    $body=$emsg4;
    $email_to='vspl.attendance@gmail.com'; 
    require 'vendor/mail_admin.php';

  /*HR*/  
   

/**** Leave Update Open ****/
   $SqlCL=mysqli_query($con, "select count(AttValue)as CL from hrm_employee_attendance where AttValue='CL' AND EmployeeID=".$eid." AND AttDate between '".$yy."-".$mm."-01' AND '".$yy."-".$mm."-31'"); $SqlCH=mysqli_query($con, "select count(AttValue)as CH from hrm_employee_attendance where AttValue='CH' AND EmployeeID=".$eid." AND AttDate between '".$yy."-".$mm."-01' AND '".$yy."-".$mm."-31'"); $SqlSL=mysqli_query($con, "select count(AttValue)as SL from hrm_employee_attendance where AttValue='SL' AND EmployeeID=".$eid." AND AttDate between '".$yy."-".$mm."-01' AND '".$yy."-".$mm."-31'"); $SqlSH=mysqli_query($con, "select count(AttValue)as SH from hrm_employee_attendance where AttValue='SH' AND EmployeeID=".$eid." AND AttDate between '".$yy."-".$mm."-01' AND '".$yy."-".$mm."-31'"); $SqlPL=mysqli_query($con, "select count(AttValue)as PL from hrm_employee_attendance where AttValue='PL' AND EmployeeID=".$eid." AND AttDate between '".$yy."-".$mm."-01' AND '".$yy."-".$mm."-31'"); $SqlPH=mysqli_query($con, "select count(AttValue)as PH from hrm_employee_attendance where AttValue='PH' AND EmployeeID=".$eid." AND AttDate between '".$yy."-".$mm."-01' AND '".$yy."-".$mm."-31'"); $SqlEL=mysqli_query($con, "select count(AttValue)as EL from hrm_employee_attendance where AttValue='EL' AND EmployeeID=".$eid." AND AttDate between '".$yy."-".$mm."-01' AND '".$yy."-".$mm."-31'"); $SqlFL=mysqli_query($con, "select count(AttValue)as FL from hrm_employee_attendance where AttValue='FL' AND EmployeeID=".$eid." AND AttDate between '".$yy."-".$mm."-01' AND '".$yy."-".$mm."-31'"); $SqlTL=mysqli_query($con, "select count(AttValue)as TL from hrm_employee_attendance where AttValue='TL' AND EmployeeID=".$eid." AND AttDate between '".$yy."-".$mm."-01' AND '".$yy."-".$mm."-31'"); 
   
   $SqlHf=mysqli_query($con, "select count(AttValue)as Hf from hrm_employee_attendance where AttValue='HF' AND EmployeeID=".$eid." AND AttDate between '".$yy."-".$mm."-01' AND '".$yy."-".$mm."-31'"); 
   
   $SqlAch=mysqli_query($con, "select count(AttValue)as ACH from hrm_employee_attendance where AttValue='ACH' AND EmployeeID=".$eid." AND AttDate between '".$yy."-".$mm."-01' AND '".$yy."-".$mm."-31'");
$SqlAsh=mysqli_query($con, "select count(AttValue)as ASH from hrm_employee_attendance where AttValue='ASH' AND EmployeeID=".$eid." AND AttDate between '".$yy."-".$mm."-01' AND '".$yy."-".$mm."-31'");
$SqlAph=mysqli_query($con, "select count(AttValue)as APH from hrm_employee_attendance where AttValue='APH' AND EmployeeID=".$eid." AND AttDate between '".$yy."-".$mm."-01' AND '".$yy."-".$mm."-31'");
   
   $SqlPresent=mysqli_query($con, "select count(AttValue)as Present from hrm_employee_attendance where (AttValue='P' OR AttValue='WFH') AND EmployeeID=".$eid." AND AttDate between '".$yy."-".$mm."-01' AND '".$yy."-".$mm."-31'");
   
   $SqlAbsent=mysqli_query($con, "select count(AttValue)as Absent from hrm_employee_attendance where AttValue='A' AND EmployeeID=".$eid." AND AttDate between '".$yy."-".$mm."-01' AND '".$yy."-".$mm."-31'"); 
   
   $SqlOnDuties=mysqli_query($con, "select count(AttValue)as OnDuties from hrm_employee_attendance where AttValue='OD' AND EmployeeID=".$eid." AND AttDate between '".$yy."-".$mm."-01' AND '".$yy."-".$mm."-31'"); $SqlHoliday=mysqli_query($con, "select count(AttValue)as Holiday from hrm_employee_attendance where AttValue='HO' AND EmployeeID=".$eid." AND AttDate between '".$yy."-".$mm."-01' AND '".$yy."-".$mm."-31'"); $SqlELSun=mysqli_query($con, "select count(CheckSunday)as SUN from hrm_employee_attendance where CheckSunday='Y' AND EmployeeID=".$eid." AND AttDate between '".$yy."-".$mm."-01' AND '".$yy."-".$mm."-31'");  
   
   $ResCL=mysqli_fetch_array($SqlCL); $ResCH=mysqli_fetch_array($SqlCH); $ResSL=mysqli_fetch_array($SqlSL); 
   $ResSH=mysqli_fetch_array($SqlSH); $ResPH=mysqli_fetch_array($SqlPH); $ResPL=mysqli_fetch_array($SqlPL); 
   $ResEL=mysqli_fetch_array($SqlEL); $ResFL=mysqli_fetch_array($SqlFL); $ResTL=mysqli_fetch_array($SqlTL); 
   $ResHf=mysqli_fetch_array($SqlHf); $ResPresent=mysqli_fetch_array($SqlPresent); 
   $ResAbsent=mysqli_fetch_array($SqlAbsent); $ResOnDuties=mysqli_fetch_array($SqlOnDuties); 
   $ResHoliday=mysqli_fetch_array($SqlHoliday); $ResELSun=mysqli_fetch_array($SqlELSun);
   
   $ResAch=mysqli_fetch_array($SqlAch); $ResAsh=mysqli_fetch_array($SqlAsh); $ResAph=mysqli_fetch_array($SqlAph); 
   $CountAch=$ResAch['ACH']/2; $CountAsh=$ResAsh['ASH']/2; $CountAph=$ResAph['APH']/2;
   
   $CountCL=$ResCL['CL']; $CountCH=$ResCH['CH']/2; //$TotalCL=$CountCL+$CountCH; 
   $CountSL=$ResSL['SL']; $CountSH=$ResSH['SH']/2; //$TotalSL=$CountSL+$CountSH;
   $CountPH=$ResPH['PH']/2; 
   $CountHf=$ResHf['Hf']/2;
   
   $TotalCL=$CountCL+$CountCH+$CountAch;
   $TotalSL=$CountSL+$CountSH+$CountAsh;   
   $TotalPL=$ResPL['PL']+$CountPH+$CountAph; 
    
   $TotalLeaveCount=$TotalCL+$TotalSL+$TotalPL+$ResEL['EL']+$ResFL['FL']+$ResTL['TL']; 
   $TotalPR=$ResPresent['Present']+$CountCH+$CountSH+$CountPH+$CountHf;   
   $TotalAbsent=$ResAbsent['Absent']+$CountHf+$CountAch+$CountAsh+$CountAph;
   $TotalOnDuties=$ResOnDuties['OnDuties']; $TotalHoliday=$ResHoliday['Holiday']; 
   $TotalDayWithSunEL=$TotalPR+$TotalLeaveCount+$TotalOnDuties+$TotalHoliday;
   $TotalPaidDay=$TotalDayWithSunEL-$ResELSun['SUN'];
   
   $SL=mysqli_query($con, "select * from hrm_employee_monthlyleave_balance where EmployeeID=".$eid." AND Month='".$mm."' AND Year='".$yy."'");  $RowL=mysqli_num_rows($SL);
   if($RowL>0)
   { $RL=mysqli_fetch_assoc($SL); 
     if($mm!=1)
	 { $TotBalCL=$RL['OpeningCL']-$TotalCL; $TotBalSL=$RL['OpeningSL']-$TotalSL; 
	   $TotBalPL=$RL['OpeningPL']-$TotalPL; $TotBalEL=$RL['OpeningEL']-$TotalEL; 
	   $TotBalFL=$RL['OpeningOL']-$TotalFL;
	 }  
     elseif($mm==1)
	 { $TotBalCL=$RL['TotCL']-$TotalCL; $TotBalSL=$RL['TotSL']-$TotalSL; $TotBalPL=$RL['TotPL']-$TotalPL;  
	   $TotBalEL=$RL['TotEL']-($TotalEL+$RL['EnCashEL']); $TotBalFL=$RL['TotOL']-$TotalFL;
	 }  
   
   $sUpL=mysqli_query($con, "UPDATE hrm_employee_monthlyleave_balance set AvailedCL='".$TotalCL."', AvailedSL='".$TotalSL."', AvailedPL='".$TotalPL."', AvailedOL='".$TotalFL."', AvailedTL='".$TotalTL."', BalanceCL='".$TotBalCL."', BalanceSL='".$TotBalSL."', BalancePL='".$TotBalPL."', BalanceOL='".$TotBalFL."' where EmployeeID=".$eid." AND Month='".$mm."' AND Year='".$yy."'");
   }
/**** Leave update Close ****/

  echo json_encode( array("Code" => "300", "Msg" => "Request sent successfully...!!") );
  }
  else{ echo json_encode( array("Code" => "100", "Msg" => "Error!") ); }
  /********************************************************************************************/
  /********************************************************************************************/

 } //if($_REQUEST['AttDate']>date("Y-m-d") AND ($_REQUEST['reasonI']=='WFH' OR $_REQUEST['reasonO']=='WFH' OR $_REQUEST['reason']=='WFH'))


}



//Team Auth Attendance Draft
elseif($_REQUEST['value'] == 'TAtt_Drf' && $_REQUEST['empid']>0 && $_REQUEST['year']!='')
{ 
  
  $nodinm = date("t",strtotime(date("Y-m-d")));    
    
 /*    
 if($_REQUEST['M']>0)
 {
   $cFDate=date($_REQUEST['year']."-".$_REQUEST['M']."-01"); $cTDate=date($_REQUEST['year']."-".$_REQUEST['M']."-31");  
 }
 else
 {
   $cFDate=date($_REQUEST['year']."-01-01"); $cTDate=date($_REQUEST['year']."-12-31");  
 }
 */
 
 $cFDate=date($_REQUEST['year']."-".date("m")."-01"); $cTDate=date($_REQUEST['year']."-".date("m")."-".$nodinm);
    
 $sql=mysqli_query($con, "select AttRqId, al.EmployeeID, EmpCode, Fname, Sname, Lname, al.AttDate, InReason, InRemark, InStatus, OutReason, OutRemark, OutStatus, Reason, Remark, SStatus, CrDate, CrTime, Inn, Outt from hrm_employee_attendance_req al inner join hrm_employee e on al.EmployeeID=e.EmployeeID inner join hrm_employee_attendance att on (al.EmployeeID=att.EmployeeID AND al.AttDate=att.AttDate) where e.EmpStatus='A' AND al.RId=".$_REQUEST['empid']." AND al.Status=0 AND al.AttDate>='".$cFDate."' AND al.AttDate<='".$cTDate."' order by AttDate DESC"); $row=mysqli_num_rows($sql); $DLary=array();
 if($row>0)
 {
   while($res=mysqli_fetch_assoc($sql))
   { 
       $DLary[]=$res; 
   }
   echo json_encode(array("Code"=>"300", "Draft_Attend"=>$DLary) );
 }
 else{ echo json_encode(array("Code" => "100", "msg" => "Data not found!") ); }
}


//Team Auth Attendance Submitted
elseif($_REQUEST['value'] == 'TAtt_Submit' && $_REQUEST['empid']>0 && $_REQUEST['year']!='' && $_REQUEST['M']>0)
{ 
    
 if($_REQUEST['M']>0)
 {
   $cFDate=date($_REQUEST['year']."-".$_REQUEST['M']."-01"); $cTDate=date($_REQUEST['year']."-".$_REQUEST['M']."-31");
 }
 else
 {
   $cFDate=date($_REQUEST['year']."-01-01"); $cTDate=date($_REQUEST['year']."-12-31");  
 }    
    
 $sql=mysqli_query($con, "select AttRqId, al.EmployeeID, EmpCode, Fname, Sname, Lname, al.AttDate, InReason, InRemark, InStatus, OutReason, OutRemark, OutStatus, Reason, Remark, SStatus, R_Remark, CrDate, CrTime, Inn, Outt from hrm_employee_attendance_req al inner join hrm_employee e on al.EmployeeID=e.EmployeeID inner join hrm_employee_attendance att on (al.EmployeeID=att.EmployeeID AND al.AttDate=att.AttDate) where e.EmpStatus='A' AND al.RId=".$_REQUEST['empid']." AND al.Status=1 AND al.AttDate>='".$cFDate."' AND al.AttDate<='".$cTDate."' order by AttDate DESC"); 
 $row=mysqli_num_rows($sql); $ALary=array();
 if($row>0)
 {
   while($res=mysqli_fetch_assoc($sql))
   { 
       if(($res['InReason']=='OD' AND $res['InStatus']==2) OR ($res['OutReason']=='OD' AND $res['OutStatus']==2) OR ($res['Reason']=='OD' AND $res['SStatus']==2)){ $att_Sts='Approved'; }
       elseif($res['Reason']!='' AND $res['SStatus']==2){ $att_Sts='Approved'; }
       elseif($res['Reason']!='' AND $res['SStatus']==3){ $att_Sts='Rejected'; }
       elseif($res['Reason']!='' AND $res['SStatus']==0){ $att_Sts='Draft'; }
       elseif($res['InReason']!='' AND $res['InStatus']==2 AND $res['OutReason']==''){ $att_Sts='Approved'; }
       elseif($res['InReason']!='' AND $res['InStatus']==3 AND $res['OutReason']==''){ $att_Sts='Rejected'; }
       elseif($res['InReason']!='' AND $res['InStatus']==0 AND $res['OutReason']==''){ $att_Sts='Draft'; }
       elseif($res['OutReason']!='' AND $res['OutStatus']==2 AND $res['InReason']==''){ $att_Sts='Approved'; }
       elseif($res['OutReason']!='' AND $res['OutStatus']==3 AND $res['InReason']==''){ $att_Sts='Rejected'; }
       elseif($res['OutReason']!='' AND $res['OutStatus']==0 AND $res['InReason']==''){ $att_Sts='Draft'; }
       elseif($res['InReason']!='' AND $res['OutReason']!='')
       { 
         if($res['InStatus']==2){$att_i='Aprroved'; }
         elseif($res['InStatus']==3){$att_i='Rejected'; }
         elseif($res['InStatus']==3){$att_i='Draft'; }
         if($res['OutStatus']==2){$att_o='Aprroved'; }
         elseif($res['OutStatus']==3){$att_o='Rejected'; }
         elseif($res['OutStatus']==3){$att_o='Draft'; }
         $att_Sts='IN-'.$att_i.'/Out-'.$att_o; 
       }
       else{ $att_Sts=''; }
       
       $res['Final_Status']=$att_Sts;
       $ALary[]=$res; 
       
   }
   echo json_encode(array("Code"=>"300", "Submit_Attend"=>$ALary) );
 }
 else{ echo json_encode(array("Code" => "100", "msg" => "Data not found!") ); }
}




//Action for Attendance Authorization
elseif($_REQUEST['value'] == 'TAtt_Req_Action' && $_REQUEST['empid']>0 && $_REQUEST['AttRqId']>0 && $_REQUEST['RDate']!='' && $_REQUEST['myremark']!='' && ($_REQUEST['MyActIn']!='' || $_REQUEST['MyActOut']!='' || $_REQUEST['MyAct']!=''))
{ 
  $search =  '!"#$%/\':_' ; $search = str_split($search); $Remark=str_replace($search, "", $_REQUEST['myremark']); 
  $sE=mysqli_query($con,"SELECT * FROM hrm_employee_attendance_req WHERE AttRqId=".$_REQUEST['AttRqId']); 
  $saE=mysqli_query($con,"SELECT * FROM hrm_employee_attendance WHERE EmployeeID=".$_REQUEST['empid']." AND AttDate='".$_REQUEST['RDate']."' "); $rE=mysqli_fetch_array($sE); $raE=mysqli_fetch_assoc($saE);
  
  
  $MyActIn=0; $MyActOut=0; $MyAct=0;
  
  if($_REQUEST['MyActIn']!=''){ $MyActIn=$_REQUEST['MyActIn']; }
  if($_REQUEST['MyActOut']!=''){ $MyActOut=$_REQUEST['MyActOut']; }
  if($_REQUEST['MyAct']!=''){ $MyAct=$_REQUEST['MyAct']; }
  
  
  if($rE['InReason']!='' AND $rE['OutReason']!='' AND $rE['Reason']=='')
  { if($MyActIn==2){$InCnt='N';}elseif($MyActIn==3){$InCnt='Y';}else{$InCnt='Y';}
    if($MyActOut==2){$OutCnt='N';}elseif($MyActOut==3){$OutCnt='Y';}else{$OutCnt='Y';}
  }
  elseif($rE['InReason']!='' AND $rE['OutReason']=='' AND $rE['Reason']=='')
  { if($MyActIn==2){$InCnt='N';}elseif($MyActIn==3){$InCnt='Y';}else{$InCnt='Y';}
    $OutCnt='Y';
  }
  elseif($rE['InReason']=='' AND $rE['OutReason']!='' AND $rE['Reason']=='')
  {
   if($MyActOut==2){$OutCnt='N';}elseif($MyActOut==3){$OutCnt='Y';}else{$OutCnt='Y';}
   $InCnt='Y';
  }
  elseif($rE['Reason']!='')
  {
   
   if($MyAct==2)
   {  
     if($rE['Reason']=='WFH'){ $chkAtt='WFH'; }
	 elseif($rE['Reason']=='OD'){ $chkAtt='OD'; }
	 elseif($rE['Reason']=='Other' OR $rE['Reason']=='Tour' OR $rE['Reason']=='Official'){ $chkAtt='P'; }
	 //elseif($raE['AttValue']=='A' OR $raE['AttValue']=='OD'){$chkAtt='OD';}elseif($raE['AttValue']=='WFH'){$chkAtt='WFH';}else{$chkAtt='P';} 
   }
   elseif($MyAct==3)
   { if($raE['AttValue']!='P' AND $raE['AttValue']!='A' AND $raE['AttValue']!='' AND $raE['AttValue']!='OD' AND $raE['AttValue']!='WFH'){$chkAtt=$raE['AttValue'];}
     else
	 {
	  //Check Total CL Availed in month 
	  $sCL=mysqli_query($con, "select SUM(Apply_TotalDay) as aCL from hrm_employee_applyleave where LeaveStatus!=4 AND LeaveStatus!=3 AND LeaveStatus!=2 AND EmployeeID=".$_REQUEST['empid']." AND Apply_FromDate>='".date("Y-m-01",strtotime($_REQUEST['RDate']))."' AND Apply_ToDate<='".date("Y-m-31",strtotime($_REQUEST['RDate']))."' AND (Leave_Type='CL' OR Leave_Type='CH')"); 
	$ssCL=mysqli_query($con, "select Count(AttValue) as aaCL from hrm_employee_attendance where EmployeeID=".$_REQUEST['empid']." AND AttDate between '".date("Y-m-01",strtotime($_REQUEST['RDate']))."' AND '".date("Y-m-31",strtotime($_REQUEST['RDate']))."' AND AttDate!='".$_REQUEST['RDate']."' AND AttValue='CL'"); $rCL=mysqli_fetch_array($sCL); $rrCL=mysqli_fetch_array($ssCL);
	$ssCH=mysqli_query($con, "select Count(AttValue) as aaCH from hrm_employee_attendance where EmployeeID=".$_REQUEST['empid']." AND AttDate between '".date("Y-m-01",strtotime($_REQUEST['RDate']))."' AND '".date("Y-m-31",strtotime($_REQUEST['RDate']))."' AND AttDate!='".$_REQUEST['RDate']."' AND AttValue='CH'"); $rrCH=mysqli_fetch_array($ssCH); $CountCH=$rrCH['aaCH']/2; $tCL=$rCL['aCL']+$rrCL['aaCL']+$CountCH;
	//Check Total PL Availed in month
	$sPL=mysqli_query($con, "select SUM(Apply_TotalDay) as aPL from hrm_employee_applyleave where LeaveStatus!=4 AND LeaveStatus!=3 AND LeaveStatus!=2 AND EmployeeID=".$_REQUEST['empid']." AND Apply_FromDate>='".date("Y-m-01",strtotime($_REQUEST['RDate']))."' AND Apply_ToDate<='".date("Y-m-31",strtotime($_REQUEST['RDate']))."' AND (Leave_Type='PL' OR Leave_Type='PH')"); 
	$ssPL=mysqli_query($con, "select Count(AttValue) as aaPL from hrm_employee_attendance where EmployeeID=".$_REQUEST['empid']." AND AttDate between '".date("Y-m-01",strtotime($_REQUEST['RDate']))."' AND '".date("Y-m-31",strtotime($_REQUEST['RDate']))."' AND AttDate!='".$_REQUEST['RDate']."' AND AttValue='PL'"); $rPL=mysqli_fetch_array($sPL); $rrPL=mysqli_fetch_array($ssPL);
	$ssPH=mysqli_query($con, "select Count(AttValue) as aaPH from hrm_employee_attendance where EmployeeID=".$_REQUEST['empid']." AND AttDate between '".date("Y-m-01",strtotime($_REQUEST['RDate']))."' AND '".date("Y-m-31",strtotime($_REQUEST['RDate']))."' AND AttDate!='".$_REQUEST['RDate']."' AND AttValue='PH'"); $rrPH=mysqli_fetch_array($ssPH); $CountPH=$rrPH['aaPH']/2; $tPL=$rPL['aPL']+$rrPL['aaPL']+$CountPH;
   
	//Check Balce CL & PL in month
	$op=mysqli_query($con, "select OpeningCL,OpeningPL,OpeningSL,CreditedCL,CreditedPL,CreditedSL from hrm_employee_monthlyleave_balance where EmployeeID=".$_REQUEST['empid']." AND Month='".date("m",strtotime($_REQUEST['RDate']))."' AND Year='".date("Y",strtotime($_REQUEST['RDate']))."'"); $rowp=mysqli_num_rows($op); $rop=mysqli_fetch_array($op); 
	//$balCL=$rop['OpeningCL']-$tCL; $balPL=$rop['OpeningPL']-$tPL;
	if($rowp>0){ $balCL=($rop['OpeningCL']+$rop['CreditedCL'])-$tCL; $balPL=($rop['OpeningPL']+$rop['CreditedPL'])-$tPL; }
    else { $Pmm=date('m', strtotime("-1 months", strtotime($_REQUEST['RDate']))); 
	       $Pyy=date('Y', strtotime("-1 months", strtotime($_REQUEST['RDate']))); 
	       $op2=mysqli_query($con, "select BalanceCL,BalancePL from hrm_employee_monthlyleave_balance where EmployeeID=".$_REQUEST['empid']." AND Month='".$Pmm."' AND Year='".$Pyy."'"); $rop2=mysqli_fetch_array($op2);
	       $balCL=$rop2['BalanceCL']-$tCL; $balPL=$rop2['BalancePL']-$tPL; }
	
	 if($balCL>0){$chkAtt='CL';}
	 elseif($balPL>0){$chkAtt='PL';}
	 else{$chkAtt='A';}
	 
	 } 
   }
   
   
   $InCnt='Y'; $OutCnt='Y';
  }
  
 $Up=mysqli_query($con, "update hrm_employee_attendance_req set InStatus=".$MyActIn.", OutStatus=".$MyActOut.", SStatus=".$MyAct.", R_Remark='".$Remark."', Status=1 where EmployeeID=".$_REQUEST['empid']." AND AttDate='".$_REQUEST['RDate']."'"); 
 
 $dd=intval(date("d",strtotime($_REQUEST['RDate']))); $s2E=mysqli_query($con,"select S".$dd.", I".$dd.", O".$dd." from hrm_employee_attendance_settime where EmployeeID=".$_REQUEST['empid']); $r2E=mysqli_fetch_assoc($s2E);
 
 
  
 if($Up AND $rE['Reason']=='') 
 { 
/************ Calculation Open ******/ 
   
  $mm=date("m",strtotime($_REQUEST['RDate'])); $yy=date("Y",strtotime($_REQUEST['RDate']));
  $mkdate = mktime(0,0,0, $mm, 1, $yy);
  $nodinm = date('t',$mkdate);  //Number of days in the given month (28-31)

  if($raE['InnLate']>0){ if($InCnt=='N'){$InL=0;}else{$InL=1;} }else{ $InL=0; } 
  if($raE['OuttLate']>0){ if($OutCnt=='N'){$OutL=0;}else{$OutL=1;} }else{ $OutL=0; }
  $Late=$InL+$OutL; 
  
/*********************************** AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA **/
if($Late==0 OR $Late==1)
{   
	
	$aIn=date("H:i",$raE['Inn']); $aOut=date("H:i",$raE['Outt']);
	$In=date("H:i",strtotime($r2E['I'.$dd])); 
	$In_15 = strtotime(date($r2E['I'.$dd])) + (15 * 60); $nI15=date('H:i',$In_15); 
	$Out=date("H:i",strtotime($r2E['O'.$dd])); 
	$Out_15 = strtotime(date($r2E['O'.$dd])) - (15 * 60); $nO15=date('H:i',$Out_15);
	
    //Check Total CL Availed in month 
	$sCL=mysqli_query($con, "select SUM(Apply_TotalDay) as aCL from hrm_employee_applyleave where LeaveStatus!=4 AND LeaveStatus!=3 AND LeaveStatus!=2 AND EmployeeID=".$_REQUEST['empid']." AND Apply_FromDate>='".date("Y-m-01",strtotime($_REQUEST['RDate']))."' AND Apply_ToDate<='".date("Y-m-31",strtotime($_REQUEST['RDate']))."' AND (Leave_Type='CL' OR Leave_Type='CH')"); 
	$ssCL=mysqli_query($con, "select Count(AttValue) as aaCL from hrm_employee_attendance where EmployeeID=".$_REQUEST['empid']." AND AttDate between '".date("Y-m-01",strtotime($_REQUEST['RDate']))."' AND '".date("Y-m-31",strtotime($_REQUEST['RDate']))."' AND AttDate!='".$_REQUEST['RDate']."' AND AttValue='CL'"); $rCL=mysqli_fetch_array($sCL); $rrCL=mysqli_fetch_array($ssCL);
	$ssCH=mysqli_query($con, "select Count(AttValue) as aaCH from hrm_employee_attendance where EmployeeID=".$_REQUEST['empid']." AND AttDate between '".date("Y-m-01",strtotime($_REQUEST['RDate']))."' AND '".date("Y-m-31",strtotime($_REQUEST['RDate']))."' AND AttDate!='".$_REQUEST['RDate']."' AND AttValue='CH'"); $rrCH=mysqli_fetch_array($ssCH); $CountCH=$rrCH['aaCH']/2; $tCL=$rCL['aCL']+$rrCL['aaCL']+$CountCH;
	//Check Total PL Availed in month
	$sPL=mysqli_query($con, "select SUM(Apply_TotalDay) as aPL from hrm_employee_applyleave where LeaveStatus!=4 AND LeaveStatus!=3 AND LeaveStatus!=2 AND EmployeeID=".$_REQUEST['empid']." AND Apply_FromDate>='".date("Y-m-01",strtotime($_REQUEST['RDate']))."' AND Apply_ToDate<='".date("Y-m-31",strtotime($_REQUEST['RDate']))."' AND (Leave_Type='PL' OR Leave_Type='PH')"); 
	$ssPL=mysqli_query($con, "select Count(AttValue) as aaPL from hrm_employee_attendance where EmployeeID=".$_REQUEST['empid']." AND AttDate between '".date("Y-m-01",strtotime($_REQUEST['RDate']))."' AND '".date("Y-m-31",strtotime($_REQUEST['RDate']))."' AND AttDate!='".$_REQUEST['RDate']."' AND AttValue='PL'"); $rPL=mysqli_fetch_array($sPL); $rrPL=mysqli_fetch_array($ssPL);
	$ssPH=mysqli_query($con, "select Count(AttValue) as aaPH from hrm_employee_attendance where EmployeeID=".$_REQUEST['empid']." AND AttDate between '".date("Y-m-01",strtotime($_REQUEST['RDate']))."' AND '".date("Y-m-31",strtotime($_REQUEST['RDate']))."' AND AttDate!='".$_REQUEST['RDate']."' AND AttValue='PH'"); $rrPH=mysqli_fetch_array($ssPH); $CountPH=$rrPH['aaPH']/2; $tPL=$rPL['aPL']+$rrPL['aaPL']+$CountPH;
        
	//Check Balce CL & PL in month
	$op=mysqli_query($con, "select OpeningCL,OpeningPL,OpeningSL,CreditedCL,CreditedPL,CreditedSL from hrm_employee_monthlyleave_balance where EmployeeID=".$_REQUEST['empid']." AND Month='".date("m",strtotime($_REQUEST['RDate']))."' AND Year='".date("Y",strtotime($_REQUEST['RDate']))."'"); $rowp=mysqli_num_rows($op); $rop=mysqli_fetch_array($op); 
	//$balCL=$rop['OpeningCL']-$tCL; $balPL=$rop['OpeningPL']-$tPL;
	if($rowp>0){ $balCL=($rop['OpeningCL']+$rop['CreditedCL'])-$tCL; $balPL=($rop['OpeningPL']+$rop['CreditedPL'])-$tPL;  }
    else { $Pmm=date('m', strtotime("-1 months", strtotime($_REQUEST['RDate']))); 
	       $Pyy=date('Y', strtotime("-1 months", strtotime($_REQUEST['RDate']))); 
	       $op2=mysqli_query($con, "select BalanceCL,BalancePL from hrm_employee_monthlyleave_balance where EmployeeID=".$_REQUEST['empid']." AND Month='".$Pmm."' AND Year='".$Pyy."'"); $rop2=mysqli_fetch_array($op2);
	       $balCL=$rop2['BalanceCL']-$tCL; $balPL=$rop2['BalancePL']-$tPL; }
	
	$schk=mysqli_query($con, "select Leave_Type from hrm_employee_applyleave where LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$_REQUEST['empid']." AND Apply_FromDate='".$_REQUEST['RDate']."' AND Apply_ToDate='".$_REQUEST['RDate']."' AND (Leave_Type='SH' OR Leave_Type='CH' OR Leave_Type='PH')"); $rowchk=mysqli_num_rows($schk); $rchk=mysqli_fetch_array($schk);
	
	if($rowchk>0){$Lv=$rchk['Leave_Type'];}
	elseif($balCL>0){$Lv='CH';}
	elseif($balPL>0){$Lv='PH';}
    else{$Lv='HF';}
	
	$sIn=mysqli_query($con, "select SUM(InnLate) as ILate from hrm_employee_attendance where EmployeeID=".$_REQUEST['empid']." AND AttDate>='".date("Y-m-01",strtotime($_REQUEST['RDate']))."' AND AttDate<'".$_REQUEST['RDate']."' AND InnCnt='Y' AND Af15=0");
    $sOut=mysqli_query($con, "select SUM(OuttLate) as OLate from hrm_employee_attendance where EmployeeID=".$_REQUEST['empid']." AND AttDate>='".date("Y-m-01",strtotime($_REQUEST['RDate']))."' AND AttDate<'".$_REQUEST['RDate']."' AND OuttCnt='Y' AND Af15=0");    $rIn=mysqli_fetch_assoc($sIn); $rOut=mysqli_fetch_assoc($sOut); $tLate=$rIn['ILate']+$rOut['OLate']+$Late;
}
/************************************/
	 if($Late==0){ $Att='P'; $Relax='N'; $Allow='N'; $Af15=0;}
     elseif($Late==2){ $Att=$raE['AttValue']; $Relax=$raE['Relax']; $Allow=$raE['Allow']; $Af15=$raE['Af15']; }
     elseif($Late==1 AND $raE['InnLate']==1 AND $raE['OuttLate']==1) //A open
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
		
	   } 
	  } //2 Close
	 
	 } ////A close
	 elseif($Late==1 AND (($raE['InnLate']==1 AND $raE['OuttLate']==0) OR ($raE['InnLate']==0 AND $raE['OuttLate']==1))) 
     { // B open
	   $Att=$raE['AttValue']; $Relax=$raE['Relax']; $Allow=$raE['Allow']; $Af15=$raE['Af15']; 
	 } // B close

 $sUp=mysqli_query($con, "UPDATE hrm_employee_attendance SET AttValue='".$Att."', II='".$In.":00', OO='".$Out.":00', InnCnt='".$InCnt."', OuttCnt='".$OutCnt."', Relax='".$Relax."', Allow='".$Allow."', Af15=".$Af15." where AttId=".$raE['AttId']." AND EmployeeID=".$_REQUEST['empid']);
 
 $NextDate=date("Y-m-d",strtotime('+1 day', strtotime($_REQUEST['RDate'])));
/************************************************/ 	 
 for($i=$NextDate; $i<=date(date("Y",strtotime($_REQUEST['RDate']))."-".date("m",strtotime($_REQUEST['RDate']))."-d"); $i++)
 { 
   $d2d=intval(date("d",strtotime($i)));
   
   $sE=mysqli_query($con, "select AttValue,Inn,Outt,InnCnt,OuttCnt,InnLate,OuttLate,Late,Af15 from hrm_employee_attendance where EmployeeID=".$_REQUEST['empid']." AND AttDate='".$i."'"); $rowE=mysqli_num_rows($sE); $rE=mysqli_fetch_assoc($sE);
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
     $IIn=mysqli_query($con, "select SUM(InnLate) as ILate from hrm_employee_attendance where EmployeeID=".$_REQUEST['empid']." AND AttDate>='".date("Y-m-01",strtotime($_REQUEST['RDate']))."' AND AttDate<'".$i."' AND InnCnt='Y' AND Af15=0"); 
     $OOut=mysqli_query($con, "select SUM(OuttLate) as OLate from hrm_employee_attendance where EmployeeID=".$_REQUEST['empid']." AND AttDate>='".date("Y-m-01",strtotime($_REQUEST['RDate']))."' AND AttDate<'".$i."' AND OuttCnt='Y' AND Af15=0"); $rrIn=mysqli_fetch_assoc($IIn); $rrOut=mysqli_fetch_assoc($OOut);
     $tLate=$rrIn['ILate']+$rrOut['OLate']+$tt;	   
     
	if($rE['AttValue']!='CL' AND $rE['AttValue']!='PL' AND $rE['AttValue']!='SL' AND $rE['AttValue']!='EL' AND $rE['AttValue']!='OD' AND $rE['AttValue']!='A')
	{
/************/
    //Check Total CL Availed in month 
	$sCL=mysqli_query($con, "select SUM(Apply_TotalDay) as aCL from hrm_employee_applyleave where LeaveStatus!=4 AND LeaveStatus!=3 AND LeaveStatus!=2 AND EmployeeID=".$_REQUEST['empid']." AND Apply_FromDate>='".date("Y-m-01",strtotime($_REQUEST['RDate']))."' AND Apply_ToDate<='".date("Y-m-31",strtotime($_REQUEST['RDate']))."' AND (Leave_Type='CL' OR Leave_Type='CH')"); 
	$ssCL=mysqli_query($con, "select Count(AttValue) as aaCL from hrm_employee_attendance where EmployeeID=".$_REQUEST['empid']." AND AttDate between '".date("Y-m-01",strtotime($_REQUEST['RDate']))."' AND '".date("Y-m-31",strtotime($_REQUEST['RDate']))."' AND AttDate!='".$i."' AND AttValue='CL'"); $rCL=mysqli_fetch_array($sCL); $rrCL=mysqli_fetch_array($ssCL);
	$ssCH=mysqli_query($con, "select Count(AttValue) as aaCH from hrm_employee_attendance where EmployeeID=".$_REQUEST['empid']." AND AttDate between '".date("Y-m-01",strtotime($_REQUEST['RDate']))."' AND '".date("Y-m-31",strtotime($_REQUEST['RDate']))."' AND AttDate!='".$i."' AND AttValue='CH'"); $rrCH=mysqli_fetch_array($ssCH); $CountCH=$rrCH['aaCH']/2; $tCL=$rCL['aCL']+$rrCL['aaCL']+$CountCH;
	//Check Total PL Availed in month
	$sPL=mysqli_query($con, "select SUM(Apply_TotalDay) as aPL from hrm_employee_applyleave where LeaveStatus!=4 AND LeaveStatus!=3 AND LeaveStatus!=2 AND EmployeeID=".$_REQUEST['empid']." AND Apply_FromDate>='".date("Y-m-01",strtotime($_REQUEST['RDate']))."' AND Apply_ToDate<='".date("Y-m-31",strtotime($_REQUEST['RDate']))."' AND (Leave_Type='PL' OR Leave_Type='PH')"); 
	$ssPL=mysqli_query($con, "select Count(AttValue) as aaPL from hrm_employee_attendance where EmployeeID=".$_REQUEST['empid']." AND AttDate between '".date("Y-m-01",strtotime($_REQUEST['RDate']))."' AND '".date("Y-m-31",strtotime($_REQUEST['RDate']))."' AND AttDate!='".$i."' AND AttValue='PL'"); $rPL=mysqli_fetch_array($sPL); $rrPL=mysqli_fetch_array($ssPL);
	$ssPH=mysqli_query($con, "select Count(AttValue) as aaPH from hrm_employee_attendance where EmployeeID=".$_REQUEST['empid']." AND AttDate between '".date("Y-m-01",strtotime($_REQUEST['RDate']))."' AND '".date("Y-m-31",strtotime($_REQUEST['RDate']))."' AND AttDate!='".$i."' AND AttValue='PH'"); $rrPH=mysqli_fetch_array($ssPH); $CountPH=$rrPH['aaPH']/2; $tPL=$rPL['aPL']+$rrPL['aaPL']+$CountPH;

	//Check Balce CL & PL in month
	$op=mysqli_query($con, "select OpeningCL,OpeningPL,OpeningSL,CreditedCL,CreditedPL,CreditedSL from hrm_employee_monthlyleave_balance where EmployeeID=".$_REQUEST['empid']." AND Month='".date("m",strtotime($_REQUEST['RDate']))."' AND Year='".date("Y",strtotime($_REQUEST['RDate']))."'"); $rowp=mysqli_num_rows($op); $rop=mysqli_fetch_array($op); 
	//$balCL=$rop['OpeningCL']-$tCL; $balPL=$rop['OpeningPL']-$tPL;
	if($rowp>0){ $balCL=($rop['OpeningCL']+$rop['CreditedCL'])-$tCL; $balPL=($rop['OpeningPL']+$rop['CreditedPL'])-$tPL; }
    else { $Pmm=date('m', strtotime("-1 months", strtotime($_REQUEST['RDate']))); 
	       $Pyy=date('Y', strtotime("-1 months", strtotime($_REQUEST['RDate']))); 
	       $op2=mysqli_query($con, "select BalanceCL,BalancePL from hrm_employee_monthlyleave_balance where EmployeeID=".$_REQUEST['empid']." AND Month='".$Pmm."' AND Year='".$Pyy."'"); $rop2=mysqli_fetch_array($op2);
	       $balCL=$rop2['BalanceCL']-$tCL; $balPL=$rop2['BalancePL']-$tPL; }	 	  
	
	$schk=mysqli_query($con, "select Leave_Type from hrm_employee_applyleave where LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$_REQUEST['empid']." AND Apply_FromDate='".$i."' AND Apply_ToDate='".$i."' AND (Leave_Type='SH' OR Leave_Type='CH' OR Leave_Type='PH')"); $rowchk=mysqli_num_rows($schk); $rchk=mysqli_fetch_array($schk);
	
	if($rowchk>0){$Lv=$rchk['Leave_Type'];}
	elseif($balCL>0){$Lv='CH';}
	elseif($balPL>0){$Lv='PH';}
    else{$Lv='HF';}
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
  
     $UpAtt=mysqli_query($con, "update hrm_employee_attendance set AttValue='".$Att."', Relax='".$Relax."', Allow='".$Allow."' WHERE EmployeeID=".$_REQUEST['empid']." AND AttDate='".$i."'");
/******************* 111111111111 Close **************/    
    } //if(($rE['InnCnt']=='Y' AND $rE['InnLate']==1) OR ($rE['OuttCnt']=='Y' AND $rE['OuttLate']==1))
   } //if($rowE>0 AND $rE['Late']>0 AND $rE['Af15']==0)  
 } //for
/********************************************** AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA **/

/************ Calculation Close ******/ 
 
 if($sUp)
 {
  /**************** Mail Mail Open **/
  
  
  $sql=mysqli_query($con,"select Fname,Sname,Lname,RepEmployeeID,EmailId_Vnr,Gender,Married,DR,TimeApply,InTime,OutTime,tokenid,tokenid_ios from hrm_employee e inner join hrm_employee_general g on e.EmployeeID=g.EmployeeID inner join hrm_employee_personal p on g.EmployeeID=p.EmployeeID where e.EmployeeID=".$_REQUEST['empid']); $res=mysqli_fetch_assoc($sql); if($res['DR']=='Y'){$me='Dr.';} elseif($res['Gender']=='M'){$me='Mr.';} elseif($res['Gender']=='F' AND $res['Married']=='Y'){$me='Mrs.';} elseif($res['Gender']=='F' AND $res['Married']=='N'){$me='Miss.';}
  
  if($res['EmailId_Vnr']!='')  //Employee
  {
   //$eto = $res['EmailId_Vnr'];
   //$efrom = 'admin@vnrseeds.co.in';
   $esub = 'For authorisation of Attendance';
   //$headers = "From: ".$efrom."\r\n"; 
   //$headers .= "MIME-Version: 1.0\r\n";
   //$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
   $emsg .= "<html><head></head><body>";
   $emsg .= "Dear <b>".$me.' '.$res['Fname'].' '.$res['Sname'].' '.$res['Lname'].",</b><br><br>\n\n\n";
   $emsg .= "Your reporting manager has taken action on your attendance authorization request in ESS, Please login into ESS for taking necessary action.<br><br>\n\n";
   $emsg .= "From <br><b>ADMIN ESS</b><br>";
   $emsg .= "</body></html>";	      
   //$ok=@mail($eto, $esub, $emsg, $headers);
   
    $subject=$esub;
    $body=$emsg;
    $email_to=$res['EmailId_Vnr'];
    require 'vendor/mail_admin.php';
   
  }
  
  
      /************ Firbase *******************/
      /************ Firbase *******************/
     if($res['tokenid']!='')
      {
         include "firebase_api.php";
         $user_token[] = $res['tokenid']; 
      }
      elseif($res['tokenid_ios']!='')
      {  
         include "firebase_ios_api.php"; 
         $user_token = $res['tokenid_ios'];
      }
     
     
      //$user_token=[];
      //$user_token[] = $res['tokenid'];
      $data1['subject'] = 'For authorisation of Attendance';
      $data1['msg_body'] = "Your reporting manager has taken action on your attendance authorization request in ESS.";
	  android($data1,$user_token);
	  /************ Firbase *******************/
	  /************ Firbase *******************/
  
  
  /*
  
  $sqlR=mysqli_query($con,"select Fname,Sname,Lname,EmailId_Vnr,Gender,Married,DR from hrm_employee e inner join hrm_employee_general g on e.EmployeeID=g.EmployeeID inner join hrm_employee_personal p on g.EmployeeID=p.EmployeeID where e.EmployeeID=".$res['RepEmployeeID']); $resR=mysqli_fetch_assoc($sqlR); if($resR['DR']=='Y'){$mr='Dr.';} elseif($resR['Gender']=='M'){$mr='Mr.';} elseif($resR['Gender']=='F' AND $resR['Married']=='Y'){$mr='Mrs.';} elseif($resR['Gender']=='F' AND $resR['Married']=='N'){$mr='Miss.';}
  
  //HR                                              //HR
   $eto4 = 'vspl.attendance@gmail.com';  //vspl.hr@vnrseeds.com
   $efrom4 = 'admin@vnrseeds.co.in';
   $esub4 = 'Taken Action For Authorisation of Attendance';
   $headers4 = "From: ".$efrom4."\r\n"; 
   $headers4 .= "MIME-Version: 1.0\r\n";
   $headers4 .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
   $emsg4 .= "<html><head></head><body>";
   $emsg4 .= "Dear <b>Sir/Mam, </b> <br><br>\n\n\n";
   $emsg4 .= $mr.' '.$resR['Fname'].' '.$resR['Sname'].' '.$resR['Lname']." has taken action on the attendance authorisation request of ".$me.' '.$res['Fname'].' '.$res['Sname'].' '.$res['Lname']." in ESS, for details, kindly login into ESS.<br><br>\n\n";
   $emsg4 .= "From <br><b>ADMIN ESS</b><br>";
   $emsg4 .= "</body></html>";	      
   $ok=@mail($eto4, $esub4, $emsg4, $headers4);
  //HR  
  
  */ 
  /**************** Mail Mail close **/
  echo json_encode(array("Code" => "300", "msg" => "Data submitted successfully!") );
 }  
    
 } //If($up) Close
 
 elseif($Up AND $rE['Reason']!='') 
 {
  $Attvr=mysqli_query($con, "select AttValue from hrm_employee_attendance where EmployeeID=".$_REQUEST['empid']." AND AttDate='".$_REQUEST['RDate']."'"); $rowAttv=mysqli_num_rows($Attvr);
  if($rowAttv>0)
  {
   $sUp=mysqli_query($con, "UPDATE hrm_employee_attendance SET AttValue='".$chkAtt."' where AttId=".$raE['AttId']." AND EmployeeID=".$_REQUEST['empid']);
  }
  else
  {
   $sUp=mysqli_query($con, "insert into hrm_employee_attendance(EmployeeID, AttValue, AttDate) values(".$_REQUEST['empid'].", '".$chkAtt."', '".$_REQUEST['RDate']."')");
  }
  
  echo json_encode(array("Code" => "300", "msg" => "Data submitted successfully!") );
 }
 else
 {
  echo json_encode(array("Code" => "100", "msg" => "Error!") );
 }

/*
$mm=date("m",strtotime($_REQUEST['RDate'])); $yy=date("Y",strtotime($_REQUEST['RDate']));
//Leave update Open 
   $SqlCL=mysqli_query($con, "select count(AttValue)as CL from hrm_employee_attendance where AttValue='CL' AND EmployeeID=".$_REQUEST['empid']." AND AttDate between '".$yy."-".$mm."-01' AND '".$yy."-".$mm."-31'"); $SqlCH=mysqli_query($con, "select count(AttValue)as CH from hrm_employee_attendance where AttValue='CH' AND EmployeeID=".$_REQUEST['empid']." AND AttDate between '".$yy."-".$mm."-01' AND '".$yy."-".$mm."-31'"); $SqlSL=mysqli_query($con, "select count(AttValue)as SL from hrm_employee_attendance where AttValue='SL' AND EmployeeID=".$_REQUEST['empid']." AND AttDate between '".$yy."-".$mm."-01' AND '".$yy."-".$mm."-31'"); $SqlSH=mysqli_query($con, "select count(AttValue)as SH from hrm_employee_attendance where AttValue='SH' AND EmployeeID=".$_REQUEST['empid']." AND AttDate between '".$yy."-".$mm."-01' AND '".$yy."-".$mm."-31'"); $SqlPL=mysqli_query($con, "select count(AttValue)as PL from hrm_employee_attendance where AttValue='PL' AND EmployeeID=".$_REQUEST['empid']." AND AttDate between '".$yy."-".$mm."-01' AND '".$yy."-".$mm."-31'"); $SqlPH=mysqli_query($con, "select count(AttValue)as PH from hrm_employee_attendance where AttValue='PH' AND EmployeeID=".$_REQUEST['empid']." AND AttDate between '".$yy."-".$mm."-01' AND '".$yy."-".$mm."-31'"); $SqlEL=mysqli_query($con, "select count(AttValue)as EL from hrm_employee_attendance where AttValue='EL' AND EmployeeID=".$_REQUEST['empid']." AND AttDate between '".$yy."-".$mm."-01' AND '".$yy."-".$mm."-31'"); $SqlFL=mysqli_query($con, "select count(AttValue)as FL from hrm_employee_attendance where AttValue='FL' AND EmployeeID=".$_REQUEST['empid']." AND AttDate between '".$yy."-".$mm."-01' AND '".$yy."-".$mm."-31'"); $SqlTL=mysqli_query($con, "select count(AttValue)as TL from hrm_employee_attendance where AttValue='TL' AND EmployeeID=".$_REQUEST['empid']." AND AttDate between '".$yy."-".$mm."-01' AND '".$yy."-".$mm."-31'"); 
   
   $SqlHf=mysqli_query($con, "select count(AttValue)as Hf from hrm_employee_attendance where AttValue='HF' AND EmployeeID=".$_REQUEST['empid']." AND AttDate between '".$yy."-".$mm."-01' AND '".$yy."-".$mm."-31'"); 
   
   $SqlAch=mysqli_query($con, "select count(AttValue)as ACH from hrm_employee_attendance where AttValue='ACH' AND EmployeeID=".$_REQUEST['empid']." AND AttDate between '".$yy."-".$mm."-01' AND '".$yy."-".$mm."-31'");
$SqlAsh=mysqli_query($con, "select count(AttValue)as ASH from hrm_employee_attendance where AttValue='ASH' AND EmployeeID=".$_REQUEST['empid']." AND AttDate between '".$yy."-".$mm."-01' AND '".$yy."-".$mm."-31'");
$SqlAph=mysqli_query($con, "select count(AttValue)as APH from hrm_employee_attendance where AttValue='APH' AND EmployeeID=".$_REQUEST['empid']." AND AttDate between '".$yy."-".$mm."-01' AND '".$yy."-".$mm."-31'");
   
   $SqlPresent=mysqli_query($con, "select count(AttValue)as Present from hrm_employee_attendance where (AttValue='P' OR AttValue='WFH') AND EmployeeID=".$_REQUEST['empid']." AND AttDate between '".$yy."-".$mm."-01' AND '".$yy."-".$mm."-31'"); 
   
   $SqlAbsent=mysqli_query($con, "select count(AttValue)as Absent from hrm_employee_attendance where AttValue='A' AND EmployeeID=".$_REQUEST['empid']." AND AttDate between '".$yy."-".$mm."-01' AND '".$yy."-".$mm."-31'"); $SqlOnDuties=mysqli_query($con, "select count(AttValue)as OnDuties from hrm_employee_attendance where AttValue='OD' AND EmployeeID=".$_REQUEST['empid']." AND AttDate between '".$yy."-".$mm."-01' AND '".$yy."-".$mm."-31'"); $SqlHoliday=mysqli_query($con, "select count(AttValue)as Holiday from hrm_employee_attendance where AttValue='HO' AND EmployeeID=".$_REQUEST['empid']." AND AttDate between '".$yy."-".$mm."-01' AND '".$yy."-".$mm."-31'"); $SqlELSun=mysqli_query($con, "select count(CheckSunday)as SUN from hrm_employee_attendance where CheckSunday='Y' AND EmployeeID=".$_REQUEST['empid']." AND AttDate between '".$yy."-".$mm."-01' AND '".$yy."-".$mm."-31'");  
   
   $ResCL=mysqli_fetch_array($SqlCL); $ResCH=mysqli_fetch_array($SqlCH); $ResSL=mysqli_fetch_array($SqlSL); 
   $ResSH=mysqli_fetch_array($SqlSH); $ResPH=mysqli_fetch_array($SqlPH); $ResPL=mysqli_fetch_array($SqlPL); 
   $ResEL=mysqli_fetch_array($SqlEL); $ResFL=mysqli_fetch_array($SqlFL); $ResTL=mysqli_fetch_array($SqlTL); 
   $ResHf=mysqli_fetch_array($SqlHf); $ResPresent=mysqli_fetch_array($SqlPresent); 
   $ResAbsent=mysqli_fetch_array($SqlAbsent); $ResOnDuties=mysqli_fetch_array($SqlOnDuties); 
   $ResHoliday=mysqli_fetch_array($SqlHoliday); $ResELSun=mysqli_fetch_array($SqlELSun);
   
   $ResAch=mysqli_fetch_array($SqlAch); $ResAsh=mysqli_fetch_array($SqlAsh); $ResAph=mysqli_fetch_array($SqlAph); 
   $CountAch=$ResAch['ACH']/2; $CountAsh=$ResAsh['ASH']/2; $CountAph=$ResAph['APH']/2;
   
   $CountCL=$ResCL['CL']; $CountCH=$ResCH['CH']/2; //$TotalCL=$CountCL+$CountCH; 
   $CountSL=$ResSL['SL']; $CountSH=$ResSH['SH']/2; //$TotalSL=$CountSL+$CountSH;
   $CountPH=$ResPH['PH']/2; //$TotalPL=$ResPL['PL']+$CountPH;   
   $CountHf=$ResHf['Hf']/2;
   
   $TotalCL=$CountCL+$CountCH+$CountAch;
   $TotalSL=$CountSL+$CountSH+$CountAsh;   
   $TotalPL=$ResPL['PL']+$CountPH+$CountAph; 
    
   $TotalLeaveCount=$TotalCL+$TotalSL+$TotalPL+$ResEL['EL']+$ResFL['FL']+$ResTL['TL']; 
   $TotalPR=$ResPresent['Present']+$CountCH+$CountSH+$CountPH+$CountHf;   
   $TotalAbsent=$ResAbsent['Absent']+$CountHf+$CountAch+$CountAsh+$CountAph;
   $TotalOnDuties=$ResOnDuties['OnDuties']; $TotalHoliday=$ResHoliday['Holiday']; 
   $TotalDayWithSunEL=$TotalPR+$TotalLeaveCount+$TotalOnDuties+$TotalHoliday;
   $TotalPaidDay=$TotalDayWithSunEL-$ResELSun['SUN'];
   
   $SL=mysqli_query($con, "select * from hrm_employee_monthlyleave_balance where EmployeeID=".$_REQUEST['empid']." AND Month='".$mm."' AND Year='".$yy."'");  $RowL=mysqli_num_rows($SL);
   if($RowL>0)
   { $RL=mysqli_fetch_assoc($SL); 
     if($mm!=1)
	 { $TotBalCL=$RL['OpeningCL']-$TotalCL; $TotBalSL=$RL['OpeningSL']-$TotalSL; 
	   $TotBalPL=$RL['OpeningPL']-$TotalPL; $TotBalEL=$RL['OpeningEL']-$TotalEL; 
	   $TotBalFL=$RL['OpeningOL']-$TotalFL;
	 }  
     elseif($mm==1)
	 { $TotBalCL=$RL['TotCL']-$TotalCL; $TotBalSL=$RL['TotSL']-$TotalSL; $TotBalPL=$RL['TotPL']-$TotalPL;  
	   $TotBalEL=$RL['TotEL']-$TotalEL; $TotBalFL=$RL['TotOL']-$TotalFL;
	 }  
   
   $sUpL=mysqli_query($con, "UPDATE hrm_employee_monthlyleave_balance set AvailedCL='".$TotalCL."', AvailedSL='".$TotalSL."', AvailedPL='".$TotalPL."', AvailedOL='".$TotalFL."', AvailedTL='".$TotalTL."', BalanceCL='".$TotBalCL."', BalanceSL='".$TotBalSL."', BalancePL='".$TotBalPL."', BalanceOL='".$TotBalFL."' where EmployeeID=".$_REQUEST['empid']." AND Month='".$mm."' AND Year='".$yy."'");
   }
//Leave update Close 
 */
 
}




//In-Out Reports
elseif($_REQUEST['value'] == 'InOutReports' && $_REQUEST['empid']>0 && $_REQUEST['month']>0 && $_REQUEST['year']>0)
{ 
   //if($_REQUEST['month']==12 OR $_REQUEST['month']==11){$year=2021;}
   //else{$year=$_REQUEST['year']=2022;}
   
  $year=$_REQUEST['year']; 
  
  /*
  if($_REQUEST['year']==2023)
   {
     if($_REQUEST['month']==11 OR $_REQUEST['month']==12)
     {
         $year=2022;
     }
       
   }
  */
   
   
   $eid = $_REQUEST['empid']; $m = $_REQUEST['month']; $y = $year; 
   

   
   $day=date("t", strtotime(date($y."-".$m."-01"))); $fd = $y."-".$m."-01"; $td = $y."-".$m."-".$day;
   
   
   
   $sqlRpt=mysqli_query($con, "select MorEveDate, MorDateTime, MorReports, EveDateTime, EveReports, SignIn_Time, SignIn_Loc, SignIn_Long, SignIn_Lat, SignOut_Time, SignOut_Loc, SignOut_Long, SignOut_Lat from hrm_employee_moreve_report_".$y." where EmployeeID=".$eid." AND MorEveDate>='".$fd."' AND MorEveDate<='".$td."' "); 
   $rowRpt=mysqli_num_rows($sqlRpt);
   if($rowRpt)
   {
     $IORarray = array(); 
     while($resRpt=mysqli_fetch_assoc($sqlRpt)){ $IORarray[]=$resRpt; }
	 echo json_encode(array("Code" => "300", "InOutAttd_List" => $IORarray) ); 
   }
   else{ echo json_encode(array("Code" => "100", "msg" => "Empty data!") ); }  
} 


//Att-Authorization Reports
elseif($_REQUEST['value'] == 'AttdAuth_Status_old' && $_REQUEST['empid']>0 && $_REQUEST['month']>0 && $_REQUEST['year']>0)
{ 
   $eid = $_REQUEST['empid']; $m = $_REQUEST['month']; $y = $_REQUEST['year']; 
   $day=date("t", strtotime(date($y."-".$m."-01"))); $fd = $y."-".$m."-01"; $td = $y."-".$m."-".$day;
   
   $sqlRpt=mysqli_query($con, "select AttDate, InReason, InRemark, InStatus, OutReason, OutRemark, OutStatus, Reason, Remark, SStatus, InR, OutR, Status, R_Remark, H_Remark, ReqDate, ReqTime from hrm_employee_attendance_req rq where EmployeeID=".$eid." AND AttDate>='".$fd."' AND AttDate<='".$td."' order by AttDate DESC"); 
   $rowRpt=mysqli_num_rows($sqlRpt); 
   if($rowRpt)
   {
     $AuthRarray = array(); 
     while($resRpt=mysqli_fetch_assoc($sqlRpt)){ 
         $AuthRarray[] = $resRpt; 
     }
	 echo json_encode(array("Code" => "300", "AttdAuth_ReportsList" => $AuthRarray) ); 
   }
   else{ echo json_encode(array("Code" => "100", "msg" => "Empty data!") ); }  
} 




elseif($_REQUEST['value'] == 'AttdAuth_Status' && $_REQUEST['empid']>0 && $_REQUEST['month']>0 && $_REQUEST['year']>0)
{ 
   $eid = $_REQUEST['empid']; $m = $_REQUEST['month']; $y = $_REQUEST['year']; 
   $day=date("t", strtotime(date($y."-".$m."-01"))); $fd = $y."-".$m."-01"; $td = $y."-".$m."-".$day;
   
   $sqlRpt=mysqli_query($con, "select AttDate, InReason, InRemark, InStatus, OutReason, OutRemark, OutStatus, Reason, Remark, SStatus, InR, OutR, Status, R_Remark, H_Remark, ReqDate, ReqTime from hrm_employee_attendance_req rq where EmployeeID=".$eid." AND AttDate>='".$fd."' AND AttDate<='".$td."' order by AttDate DESC"); 
   $rowRpt=mysqli_num_rows($sqlRpt); 
   if($rowRpt)
   {
     $AuthRarray = array(); 
     while($resRpt=mysqli_fetch_assoc($sqlRpt)){ 
         $temp = array();
         $temp = $resRpt;
         
         $temp['nob'] = '0';
         $temp['action'] = '';
         if($temp['Status'] == '1'){
            if($temp['InReason'] != ''){
                $temp['nob'] = $temp['nob'] + 1;       
                $temp['action'] = 'In';
            }
            if($temp['OutReason'] != ''){
                $temp['nob'] = $temp['nob'] + 1;       
                $temp['action'] = 'Out';
            }
         }
         if($temp['nob'] == 0){
             $temp['nob'] = 1;       
             $temp['action'] = 'Reason';
         }
         if($temp['nob'] == 2){
            $temp['action'] = 'In / Out'; 
         }
         $AuthRarray[] = $temp; 
     }
	 echo json_encode(array("Code" => "300", "AttdAuth_ReportsList" => $AuthRarray) ); 
   }
   else{ echo json_encode(array("Code" => "100", "msg" => "Empty data!") ); }  
} 

/*if($rE['SStatus']==0){$St='Select';}
elseif($rE['SStatus']==1){$St='Pending';}
elseif($rE['SStatus']==2){$St='Approved';}
elseif($rE['SStatus']==3){$St='Rejected';}

Status==0 {Pending}
Status==1 {Submitted}
*/



//Att-Authorization Reports
elseif($_REQUEST['value'] == 'MyTeam_InOutReport' && $_REQUEST['empid']>0 && $_REQUEST['month']>0 && $_REQUEST['year']>0 && $_REQUEST['teamid']>0)
{ 
   $eid = $_REQUEST['empid']; $m = $_REQUEST['month']; $y = $_REQUEST['year']; 
   
   $day=date("t", strtotime(date($y."-".$m."-01")));
   $fd = $y."-".$m."-01"; $td = $y."-".$m."-".$day;
   
   //MorDateTime as DateTime, MorReports, SignIn_Time, SignIn_Loc, SignOut_Time, SignOut_Loc
   
   $sqlRpt=mysqli_query($con, "select MorEveDate, MorDateTime, MorReports, EveDateTime, EveReports, SignIn_Time, SignIn_Loc, SignIn_Long, SignIn_Lat, SignOut_Time, SignOut_Loc, SignOut_Long, SignOut_Lat from hrm_employee_moreve_report_".$_REQUEST['year']." r inner join hrm_employee e on r.EmployeeID=e.EmployeeID inner join hrm_employee_general g on r.EmployeeID=g.EmployeeID where g.RepEmployeeID=".$eid." AND e.EmpStatus='A' AND e.EmployeeID=".$_REQUEST['teamid']." AND r.MorEveDate>='".$_REQUEST['year']."-".$_REQUEST['month']."-01' and r.MorEveDate<='".$_REQUEST['year']."-".$_REQUEST['month']."-".$day."' order by EmpCode, MorEveDate"); 
   $rowRpt=mysqli_num_rows($sqlRpt); 
   if($rowRpt)
   {
     $AuthTeamRarray = array(); 
     while($resRpt=mysqli_fetch_assoc($sqlRpt)){ $AuthTeamRarray[]=$resRpt; }
	 echo json_encode(array("Code" => "300", "Team_InOutReport_Details" => $AuthTeamRarray) ); 
   }
   else{ echo json_encode(array("Code" => "100", "msg" => "Empty data!") ); }  
}  




else
{
  echo json_encode( array("Code" => "100", "Msg" => "value missing!", "Data" => $data) );
}
  
 
 
 /******************************* Joining Employee Close *************************************/
 /******************************* Joining Employee Close *************************************/

?>
