<?php 
//require_once('../../AdminUser/config/config.php');


/******************/	
//$con = mysqli_connect("localhost","vnrseed2_demo","vnrseed2_demo","vnrseed2_demo");

$con=mysqli_connect('localhost','hrims_user','hrims@192');
if(!$con) die("Failed to connect to database!");
$db=mysqli_select_db( $con, 'hrims');
if(!$db) die("Failed to select database!");
/******************/
date_default_timezone_set('Asia/Calcutta');

if($_REQUEST['empid'] >0){
$run_qry=mysqli_query($con,"select * from hrm_employee where EmployeeID =".$_REQUEST['empid']." AND (EmpStatus = 'A' OR (EmpStatus = 'D' AND DateOfSepration!='0000-00-00' AND DateOfSepration!='1970-01-01' AND DateOfSepration>='".date("Y-m-d")."'))");    
//$run_qry=mysqli_query($con,"select * from hrm_employee where EmployeeID =".$_REQUEST['empid']." AND EmpStatus = 'A'");
$num=mysqli_num_rows($run_qry); 
if($num == 0){
    echo json_encode(array("Code" => "404") ); 
    die;
}}



if($_REQUEST['value'] == ''){ echo json_encode(array("msg" => "Parameter Missing!") ); }
 
//Company
elseif($_REQUEST['value'] == 'companylist')
{
    
 $run_qry=mysqli_query($con,"select CompanyId,CompanyName from hrm_company_basic where Status='A' order by CompanyId asc");
 $num=mysqli_num_rows($run_qry); $carray = array();
 if($num>0)
 {
  while($res=mysqli_fetch_assoc($run_qry)){ $carray[]=$res; }
  echo json_encode(array("Code" => "300", "company_list" => $carray) ); 
 }
 else{ echo json_encode(array("Code" => "100", "msg" => "Error!") ); }  
}


//DateTime
elseif($_REQUEST['value'] == 'DateTime')
{
  echo json_encode(array("Code" => "300", "Date" => date("Y-m-d"), "Time" => date("H:i:s")) ); 
}


//Login
elseif($_REQUEST['value'] == 'elogin' && $_REQUEST['ucompany']>0 && $_REQUEST['uname']!='' && $_REQUEST['upwd']!='')
{
    
 
$u = $_REQUEST['uname'];
$username = ltrim($u,$u[0]);

if($u[0]=='V'){ $UsName=$_REQUEST['uname']; }
else
{ $UsName=(int) filter_var($_REQUEST['uname'], FILTER_SANITIZE_NUMBER_INT); }
     
 $run_qry = mysqli_query($con,"SELECT EmployeeID,EmpCode,EmpStatus,EmpPass,UseApps,DateOfSepration FROM hrm_employee WHERE EmpCode='".$UsName."' AND CompanyId=".$_REQUEST['ucompany']." AND EmpStatus='A'"); 
 $num=mysqli_num_rows($run_qry); $earray = array();  
  if($num>0)
  {
    $res = mysqli_fetch_assoc($run_qry);
    if($res['UseApps']=='Y')
    {
      
      require_once('../../AdminUser/codeEncDec.php');
	  $EncPass=decrypt($res['EmpPass']); 
	  
	  //echo $res['EmpCode'].'=='.$_REQUEST['uname'].'<br>'; 
	  //echo $EncPass.'==ajaymca#%empemp<br>';
	  //echo $res['EmpStatus'];
	  
	  if($res['EmpCode']==$UsName && $EncPass==$_REQUEST['upwd'] && $res['EmpStatus']=='A')
      {
          
          
	 
	 
	   if($_REQUEST['tokenid']!='' && $_REQUEST['platform']!='ios')
	   {
	    if($_REQUEST['tokenid']!='dWvrW7kUSe-BXizkzDtY_G:APA91bFVbleBtinshLs38i8kdIvQv5S-KcBmOdyehC5z4wOkHNhpkT3EZoft186645O0sGTa7eTjrW8Bje8TFz8sv8BdBEBD0aMtjQLqZ9l8LXv1gQZAZpRXiqISgst9lZEZhx0CIII2')
	    {
	     $sqUp=mysqli_query($con,"update hrm_employee set tokenid='".$_REQUEST['tokenid']."' where EmployeeID=".$res['EmployeeID']);
	    } 
	   }
	   
	   if($_REQUEST['platform']=='ios')
	   {
	     $sqUp=mysqli_query($con,"update hrm_employee set tokenid_ios='".$_REQUEST['tokenid']."' where EmployeeID=".$res['EmployeeID']);  
	   }
	 
	   $sqle=mysqli_query($con,"select e.EmployeeID as empid, EmpCode, Fname, Sname, Lname, EmpStatus, e.CompanyId, e.DateOfSepration, ProfileCertify, Gender, Married, DR, g.DepartmentId, DepartmentCode, g.DesigId, DesigName, 
	   g.GradeId, GradeValue, g.HqId, HqName, RepEmployeeID, ReportingName, DateJoining, DOB, CostCenter as StateId, StateName, EmailId_Vnr as email,
	   MobileNo_Vnr as mobile, MobileNo2_Vnr as mobile2, PF_UAN, EsicNo, InsuCardNo, AadharNo, BloodGroup, PanNo, PassportNo from hrm_employee e 
	   left join hrm_employee_general g on e.EmployeeID=g.EmployeeID 
	   left join hrm_employee_personal p on e.EmployeeID=p.EmployeeID 
	   left join hrm_department d on g.DepartmentId=d.DepartmentId 
	   left join hrm_designation de on g.DesigId=de.DesigId 
	   left join hrm_headquater hq on g.HqId=hq.HqId 
	   left join hrm_grade gr on g.GradeId=gr.GradeId 
	   left join hrm_state s on g.CostCenter=s.StateId where e.EmployeeID=".$res['EmployeeID']);
	 
	 
	   while($rese=mysqli_fetch_assoc($sqle))
	   { 
	    /*   
	    $qcon=mysql_query($con,"select CurrAdd, StateName, CityName, CurrAdd_PinNo from hrm_employee_contact where EmployeeID=".$res['EmployeeID']);
	    $rcon=mysql_fetch_assoc( $qcon);
	  
	    $qs=mysql_query("select StateName from hrm_state where StateId=".$rcon['CurrAdd_State'],$con); $rs=mysqli_fetch_assoc($qs);
	    $qc=mysqli_query("select CityName from hrm_city where CityId=".$rcon['CurrAdd_City'],$con); $rc=mysql_fetch_assoc($qc);
	   
	    $rese['Address']=$rcon;
	    $rese['CurrAdd_State']=$rs;
	    $rese['CurrAdd_City']=$rc;
	    */
	    $earray[]=$rese; 
	   } 
	   echo json_encode(array("Code"=>"300", "msg"=>"Login success", "EmployeeDetails"=>$earray) );
	   } 
	   else{ echo json_encode(array("Code" => "100", "msg" => "Please check username & password!") ); }
	
    } //if($res['UseApps']=='Y')
    else{ echo json_encode(array("Code" => "100", "msg" => "Currently not allowed!") ); }
	
  }
  /***********************/
  elseif($num==0)
  { 
    $run_qry = mysqli_query($con,"SELECT EmployeeID,EmpCode,EmpStatus,EmpPass,UseApps,DateOfSepration FROM hrm_employee WHERE EmpCode='".$UsName."' AND CompanyId=".$_REQUEST['ucompany']." AND EmpStatus='D' AND DateOfSepration>='2010-01-01'"); 
    $num2=mysqli_num_rows($run_qry); $earray = array();   
    $res = mysqli_fetch_assoc($run_qry);
    //echo $num2.', '.$res['DateOfSepration'].'-'.$res['UseApps'];
    if($num2>0 AND '".date("Y-m-d")."'<=$res['DateOfSepration'] AND $res['UseApps']=='Y')
    {
      
      require_once('../../AdminUser/codeEncDec.php');
	  $EncPass=decrypt($res['EmpPass']); 
	  
	  if($res['EmpCode']==$UsName && $EncPass==$_REQUEST['upwd'] && $res['EmpStatus']=='D')
      {
	 
	   if($_REQUEST['tokenid']!='')
	   {
	    $sqUp=mysqli_query($con,"update hrm_employee set tokenid='".$_REQUEST['tokenid']."' where EmployeeID=".$res['EmployeeID']);
	   }
	 
	   $sqle=mysqli_query($con,"select e.EmployeeID as empid, EmpCode, Fname, Sname, Lname, EmpStatus, e.CompanyId, e.DateOfSepration, ProfileCertify, Gender, Married, DR, g.DepartmentId, DepartmentCode, g.DesigId, DesigName, 
	   g.GradeId, GradeValue, g.HqId, HqName, RepEmployeeID, ReportingName, DateJoining, DOB, CostCenter as StateId, StateName, EmailId_Vnr as email,
	   MobileNo_Vnr as mobile, MobileNo2_Vnr as mobile2, PF_UAN, EsicNo, InsuCardNo, AadharNo, BloodGroup, PanNo, PassportNo from hrm_employee e 
	   left join hrm_employee_general g on e.EmployeeID=g.EmployeeID 
	   left join hrm_employee_personal p on e.EmployeeID=p.EmployeeID 
	   left join hrm_department d on g.DepartmentId=d.DepartmentId 
	   left join hrm_designation de on g.DesigId=de.DesigId 
	   left join hrm_headquater hq on g.HqId=hq.HqId 
	   left join hrm_grade gr on g.GradeId=gr.GradeId 
	   left join hrm_state s on g.CostCenter=s.StateId where e.EmployeeID=".$res['EmployeeID']);
	 
	   while($rese=mysqli_fetch_assoc($sqle))
	   { 
	     $earray[]=$rese; 
	   } 
	   echo json_encode(array("Code"=>"300", "msg"=>"Login success", "EmployeeDetails"=>$earray) );
	   } 
	   else{ echo json_encode(array("Code" => "100", "msg" => "Please check username & password!") ); }
	
    } //if($res['UseApps']=='Y')
    else{ echo json_encode(array("Code" => "100", "msg" => "Currently not allowed!") ); }
	
  }
  /***********************/
  else{ echo json_encode(array("Code" => "100", "msg" => "Please check username & password!") ); }
}




//Profile
elseif($_REQUEST['value'] == 'eprofile' && $_REQUEST['empid']>0)
{
  $sqle=mysqli_query($con,"select e.EmployeeID as empid, EmpCode, Fname, Sname, Lname, EmpStatus, e.CompanyId, e.DateOfSepration, ProfileCertify, Gender, Married, DR, g.DepartmentId, DepartmentCode, FunName, g.DesigId, DesigName, g.GradeId, GradeValue, g.HqId, HqName, RepEmployeeID, ReportingName, DateJoining, DOB, CostCenter as StateId, StateName, EmailId_Vnr as email, MobileNo_Vnr as mobile, MobileNo2_Vnr as mobile2, PF_UAN, EsicNo, InsuCardNo, AadharNo, BloodGroup, PanNo, PassportNo from hrm_employee e inner join hrm_employee_general g on e.EmployeeID=g.EmployeeID inner join hrm_employee_personal p on e.EmployeeID=p.EmployeeID inner join hrm_department d on g.DepartmentId=d.DepartmentId inner join hrm_designation de on g.DesigId=de.DesigId inner join hrm_headquater hq on g.HqId=hq.HqId inner join hrm_grade gr on g.GradeId=gr.GradeId inner join hrm_state s on g.CostCenter=s.StateId where e.EmployeeID=".$_REQUEST['empid']);
  
  $num=mysqli_num_rows($sqle); $earray = array();  
  if($num>0)
  {
   $rese=mysqli_fetch_assoc($sqle); $earray[]=$rese; 
   echo json_encode(array("Code"=>"300", "Employee_Profile"=>$earray) );
  } 
  else{ echo json_encode(array("Code" => "100", "msg" => "Data not find!") ); }
  
}





//Attendance
elseif($_REQUEST['value'] == 'attendance' && $_REQUEST['empid']!= '' && $_REQUEST['empid']>0 && $_REQUEST['month']>0 && $_REQUEST['year']>0)
{
 $m=$_REQUEST['month']; $y=$_REQUEST['year']; 
 $mkdate = mktime(0,0,0, $_REQUEST['month'], 1, $_REQUEST['year']); 
 $days = date('t',$mkdate); 
 
 $sE=mysqli_query($con,"SELECT AttDate,AttValue,Inn,InnLate,InnCnt,Outt,OuttLate,OuttCnt FROM hrm_employee_attendance WHERE EmployeeID=".$_REQUEST['empid']." AND AttDate between '".date($y."-".$m."-01")."' AND '".date($y."-".$m."-".$days)."' group by AttDate"); 
  $rowE=mysqli_num_rows($sE); $Ettarray=array();
  
  if($rowE>0)
  {
    while($rE=mysqli_fetch_assoc($sE))
    { 
     $att_auth = array();    
     $sE2=mysqli_query($con,"SELECT InReason,InRemark,InStatus,OutReason,OutRemark,OutStatus,Reason,Remark,SStatus FROM hrm_employee_attendance_req WHERE EmployeeID=".$_REQUEST['empid']." AND AttDate='".$rE['AttDate']."' "); 
	 $resE2=mysqli_fetch_assoc($sE2); $att_auth=$resE2;
      
      
     $sL=mysqli_query($con,"select * from hrm_employee_applyleave where EmployeeID=".$_REQUEST['empid']." AND Apply_FromDate>='".$rE['AttDate']."' AND Apply_ToDate<='".$rE['AttDate']."' AND LeaveStatus=2 AND LeaveEmpCancelStatus!='Y'");  $rowL=mysqli_num_rows($sL); 
     if($rowL>0 OR $rE['AttValue']=='OD'){ $LeaveApply='Y'; }else{ $LeaveApply='N'; } 
     
     $rE['Req_Details']=$att_auth;
     $rE['LeaveApply']=$LeaveApply; 
     $Ettarray[]=$rE; 
        
    }
    echo json_encode(array("Code"=>"300", "Employee_Attendance"=>$Ettarray) );
  }
  
  else{ echo json_encode(array("Code" => "100", "msg" => "Error!") ); }
 
}





//Team Attendance
elseif($_REQUEST['value'] == 'Team_attendance' && $_REQUEST['empid']>0 && $_REQUEST['month']>0 && $_REQUEST['year']>0 && $_REQUEST['teamid']>0)
{
 $m=$_REQUEST['month']; $y=$_REQUEST['year']; 
 $mkdate = mktime(0,0,0, $_REQUEST['month'], 1, $_REQUEST['year']); 
 $days = date('t',$mkdate); 
 
 $sE=mysqli_query($con,"SELECT AttDate,AttValue,Inn,InnLate,InnCnt,Outt,OuttLate,OuttCnt FROM hrm_employee_attendance WHERE EmployeeID=".$_REQUEST['teamid']." AND AttDate between '".date($y."-".$m."-01")."' AND '".date($y."-".$m."-".$days)."' group by AttDate"); 
  $rowE=mysqli_num_rows($sE); $Ettarray=array();
  
  if($rowE>0)
  {
    while($rE=mysqli_fetch_assoc($sE))
    { 
     $att_auth = array();    
     $sE2=mysqli_query($con,"SELECT InReason,InRemark,InStatus,OutReason,OutRemark,OutStatus,Reason,Remark,SStatus FROM hrm_employee_attendance_req WHERE EmployeeID=".$_REQUEST['teamid']." AND AttDate='".$rE['AttDate']."' "); 
	 $resE2=mysqli_fetch_assoc($sE2); $att_auth=$resE2;
	 
	 $sL=mysqli_query($con,"select * from hrm_employee_applyleave where EmployeeID=".$_REQUEST['teamid']." AND Apply_FromDate>='".$rE['AttDate']."' AND Apply_ToDate<='".$rE['AttDate']."' AND LeaveStatus=2 AND LeaveEmpCancelStatus!='Y'");  $rowL=mysqli_num_rows($sL); 
     if($rowL>0 OR $rE['AttValue']=='OD'){ $LeaveApply='Y'; }else{ $LeaveApply='N'; } 
	 
	 $rE['Req_Details']=$att_auth;
     $rE['LeaveApply']=$LeaveApply; 
     $Ettarray[]=$rE;
     
	 //$rE['Req_Details']=$att_auth;
     //$Ettarray[]=$rE; 
        
    }
    echo json_encode(array("Code"=>"300", "Team_Attendance"=>$Ettarray) );
  }
  
  else{ echo json_encode(array("Code" => "100", "msg" => "Error!") ); }
 
}




//Leave
elseif($_REQUEST['value'] == 'leave' && $_REQUEST['empid']!= '' && $_REQUEST['empid']>0 && $_REQUEST['year']>0)
{
  $y=$_REQUEST['year']; 
  $CFromDate=$y.'-01-01'; $CToDate=$y.'-12-31'; 
      
  $sE=mysqli_query($con,"select ApplyLeaveId, Apply_Date,Leave_Type,Apply_FromDate,Apply_ToDate, Apply_TotalDay, Apply_Reason, LeaveStatus as Status, LeaveEmpCancelStatus as ApplyForCancel, LeaveCancelStatus as StatusForCancel, Apply_SentToApp, Apply_SentToRev, Apply_SentToHOD from hrm_employee_applyleave where EmployeeID=".$_REQUEST['empid']." AND (Apply_Date>='".$CFromDate."' AND Apply_Date<='".$CToDate."') order by Apply_Date DESC");  
  
  $rowE=mysqli_num_rows($sE); $Elvarray=array();
  
  if($rowE>0)
  {
    while($rE=mysqli_fetch_assoc($sE)){ $Elvarray[]=$rE; }
    echo json_encode(array("Code"=>"300", "Employee_Leave"=>$Elvarray) );
  }
  
  else{ echo json_encode(array("Code" => "100", "msg" => "Data Not Found!") ); }
 
}



//Leave Balance
elseif($_REQUEST['value'] == 'leave_balance' && $_REQUEST['empid']!= '' && $_REQUEST['empid']>0 && $_REQUEST['month']>0 && $_REQUEST['year']>0)
{
  $m=$_REQUEST['month']; $y=$_REQUEST['year']; 
      
  $sEL=mysqli_query($con,"select OpeningCL, CreditedCL, TotCL, AvailedCL, BalanceCL, OpeningSL, CreditedSL, TotSL, AvailedSL, BalanceSL, OpeningPL, CreditedPL, TotPL, AvailedPL, BalancePL, OpeningEL, CreditedEL, TotEL, EnCashEL, AvailedEL, BalanceEL, OpeningOL as OpeningFL, CreditedOL as CreditedFL, TotOL as TotFL, AvailedOL as AvailedFL, BalanceOL as BalanceFL from hrm_employee_monthlyleave_balance where EmployeeID=".$_REQUEST['empid']." AND Month='".$m."' AND Year='".$y."'");  
  $rowEL=mysqli_num_rows($sEL); $ElvBarray=array();
  
  if($rowEL>0)
  {
    while($rEL=mysqli_fetch_assoc($sEL)){ $ElvBarray[]=$rEL; }
    echo json_encode(array("Code"=>"300", "Employee_Leave_Balance"=>$ElvBarray) );
  }
  
  else{ echo json_encode(array("Code" => "100", "msg" => "Data Not Found!") ); }
 
}


//Holiday
elseif($_REQUEST['value'] == 'holiday' && $_REQUEST['empid']!= '' && $_REQUEST['empid']>0 && $_REQUEST['year']>0)
{
  $y=$_REQUEST['year'];  
  $sH=mysqli_query($con,"select HolidayName,HolidayDate,Day,State_1,State_2,State_3,State_4 from hrm_holiday where Year='".$y."' AND status='A' order by HolidayDate ASC");  
  $rowH=mysqli_num_rows($sH); $Harray=array();
  
  if($rowH>0)
  {
    while($rH=mysqli_fetch_assoc($sH)){ $Harray[]=$rH; }
    echo json_encode(array("Code"=>"300", "Holiday_Details"=>$Harray) );
  }
  
  else{ echo json_encode(array("Code" => "100", "msg" => "Data Not Found!") ); }
 
}



//Option_Holiday
elseif($_REQUEST['value'] == 'option_holiday' && $_REQUEST['empid']!= '' && $_REQUEST['empid']>0 && $_REQUEST['year']>0)
{
  $y=$_REQUEST['year'];    
  
  $sC=mysqli_query($con,"select CompanyId from hrm_employee where EmployeeID=".$_REQUEST['empid']);
  $rC=mysqli_fetch_assoc($sC);

  $sH=mysqli_query($con,"select HoOpName,HoOpDate,HoOpDay from hrm_holiday_optional where Year='".$y."' AND HoOpStatus!='De' AND CompanyId=".$rC['CompanyId']." order by HoOpDate ASC");  
  $rowH=mysqli_num_rows($sH); $Harray=array();
  
  if($rowH>0)
  {
    while($rH=mysqli_fetch_assoc($sH)){ $Harray[]=$rH; }
    echo json_encode(array("Code"=>"300", "Option_Holiday_Details"=>$Harray) );
  }
  
  else{ echo json_encode(array("Code" => "100", "msg" => "Data Not Found!") ); }
 
}



//punch Time
elseif($_REQUEST['value'] == 'Punch_Time' && $_REQUEST['empid']!= '' && $_REQUEST['comid']>0)
{
  
  $sD=mysqli_query($con,"select DepartmentId from hrm_employee_general where EmployeeID=".$_REQUEST['empid']);
  $rD=mysqli_fetch_assoc($sD);
  //$sT=mysqli_query($con,"select InTime from hrm_api_punch_time where CompanyId=".$_REQUEST['comid']." and Sts='Y'");
  $sT=mysqli_query($con,"select InTime from hrm_api_punch_department where DepartmentId=".$rD['DepartmentId']);
  $rowT=mysqli_num_rows($sT); 
  //$Tarray=array();
  
  $sqlm=mysqli_query($con, "Select SignIn_Time, SignIn_Loc, SignIn_Lat, SignIn_Long, SignOut_Time, SignOut_Loc, SignOut_Lat, SignOut_Long from hrm_employee_moreve_report_".date("Y")." WHERE EmployeeID=".$_REQUEST['empid']." AND MorEveDate='".date("Y-m-d")."'"); $rowsm = mysqli_num_rows($sqlm);
  if($rowsm>0)
  {
   $resm=mysqli_fetch_assoc($sqlm);
   if($resm['SignIn_Time']!='0000-00-00 00:00:00' && $resm['SignIn_Loc']!='' && $resm['SignIn_Lat']!='' && $resm['SignIn_Long']!=''){ $InStatus='Y'; }else{ $InStatus='N'; }
   if($resm['SignOut_Time']!='0000-00-00 00:00:00' && $resm['SignOut_Loc']!='' && $resm['SignOut_Lat']!='' && $resm['SignOut_Long']!=''){ $OutStatus='Y'; }else{ $OutStatus='N'; }
  }
  else{ $InStatus='N'; $OutStatus='N'; }
  
  if($rowT>0)
  {
    //while($rT=mysqli_fetch_assoc($sT)){ $Tarray[]=$rT; }
    $rT=mysqli_fetch_assoc($sT);
	if($rT['InTime']!='' OR $rT['InTime']!='00:00:00'){ $InTime=$rT['InTime']; }
	else
	{
	  $sT2=mysqli_query($con,"select InTime from hrm_api_punch_time where CompanyId=".$_REQUEST['comid']." and Sts='Y'");
	  $rT2=mysqli_fetch_assoc($sT2); $InTime=$rT2['InTime']; 
	}
	
	if($InTime<='date("H:i:s")'){$allowPunchIn='Y';}else{$allowPunchIn='N';}
	
    echo json_encode(array("Code"=>"300", "AllowInPunch"=>$allowPunchIn, "In_PunchTime"=>$InTime, "In_Status"=>$InStatus, "Out_Status"=>$OutStatus) );
  }
  
  else{ echo json_encode(array("Code" => "100", "msg" => "Data Not Found!") ); }
 
}



//punch Department

elseif($_REQUEST['value'] == 'Punch_Department' && $_REQUEST['empid']!= '')
{
  $sTd=mysqli_query($con,"select DepartmentId from hrm_api_punch_department where Sts='Y'");
  $rowTd=mysqli_num_rows($sTd); 
  $Tdarray=array();
  
  if($rowTd>0)
  {
    while($rTd=mysqli_fetch_assoc($sTd)){ $Tdarray[]=$rTd; }
    echo json_encode(array("Code"=>"300", "Punch_Department"=>$Tdarray) );
  }
  else{ echo json_encode(array("Code" => "100", "msg" => "Data Not Found!") ); }
}





elseif($_REQUEST['value'] == 'Punch_Department_emp' && $_REQUEST['empid']!= '')
{
  
  $sqlE=mysqli_query($con,"select DepartmentId,UseApps_Punch,UseApps_GpsTracking from hrm_employee_general g inner join hrm_employee e on g.EmployeeID=e.EmployeeID where g.EmployeeID=".$_REQUEST['empid']); 
  $rE=mysqli_fetch_assoc($sqlE);
  
  $sTd=mysqli_query($con,"select * from hrm_api_punch_department where DepartmentId=".$rE['DepartmentId']." AND Sts='Y'");
  $rowTd=mysqli_num_rows($sTd); 
  if($rE['UseApps_Punch']=='Y' OR $rowTd>0){ $AllowPunch='Yes'; }else{ $AllowPunch='No'; }
  
   $sGp=mysqli_query($con,"select Gps_Tracking from hrm_api_punch_department where DepartmentId=".$rE['DepartmentId']);
   $resGp=mysqli_fetch_assoc($sGp); 
   if($resGp['Gps_Tracking']==1 OR $rE['UseApps_GpsTracking']==1){ $Allow_GpsTracking='Yes'; }else{ $Allow_GpsTracking='No'; }
  
  echo json_encode(array("Code"=>"300", "Allow_Punch"=>$AllowPunch, "Allow_GpsTracking"=>$Allow_GpsTracking) );
 
}


/*
elseif($_REQUEST['value'] == 'Punch_Department_emp' && $_REQUEST['empid']!= '')
{
  
  $sqlE=mysqli_query($con,"select DepartmentId,UseApps_Punch from hrm_employee_general g inner join hrm_employee e on g.EmployeeID=e.EmployeeID where g.EmployeeID=".$_REQUEST['empid']); $rE=mysqli_fetch_assoc($sqlE);
  
  $sTd=mysqli_query($con,"select * from hrm_api_punch_department where DepartmentId=".$rE['DepartmentId']." AND Sts='Y'");
  $rowTd=mysqli_num_rows($sTd); 
  if($rE['UseApps_Punch']=='Y' OR $rowTd>0){ $AllowPunch='Yes'; }else{ $AllowPunch='No'; }
  echo json_encode(array("Code"=>"300", "Allow_Punch"=>$AllowPunch) );
 
}

*/








//Punch ON-Off
elseif($_REQUEST['value'] == 'Service_OnOff' && $_REQUEST['empid']!= '' && $_REQUEST['Sdate']!= '')
{

  
  if(!isset($_REQUEST['GOn']) && !isset($_REQUEST['GOff']))
  {
    /*
    $sqlEc_Old=mysqli_query($con,"select GpsPOn,GpsPOff from hrm_api_emp_gpspunch where EmployeeID=".$_REQUEST['empid']." and GpsPDate='".date("Y-m-d",strtotime('-1 day', strtotime($_REQUEST['Sdate'])))."'");
     $rowEc_Old=mysqli_num_rows($sqlEc_Old); $resEc_Old=mysqli_fetch_assoc($sqlEc_Old); $OldService='Off'; 
	 if($rowEc_Old>0 && $resEc_Old['GpsPOff']==0){ $OldService='On'; } 
    */  
    $sqlEc_Old=mysqli_query($con,"select GpsPOff from hrm_api_emp_gpspunch where EmployeeID=".$_REQUEST['empid']." and GpsPOff=0 and GpsPDate!='".date("Y-m-d",strtotime($_REQUEST['Sdate']))."'");
     $rowEc_Old=mysqli_num_rows($sqlEc_Old); $OldService='Off'; 
	 if($rowEc_Old>0){ $OldService='On'; }  
      
      
    $sqlEc=mysqli_query($con,"select GpsPOn,GpsPOff from hrm_api_emp_gpspunch where EmployeeID=".$_REQUEST['empid']." and GpsPDate='".date("Y-m-d",strtotime($_REQUEST['Sdate']))."'"); $rowEc=mysqli_num_rows($sqlEc);
    if($rowEc==0)
    {
     $insEc=mysqli_query($con,"insert into hrm_api_emp_gpspunch(EmployeeID,GpsPDate,GpsPOn,GpsPOff) values(".$_REQUEST['empid'].",'".date("Y-m-d",strtotime($_REQUEST['Sdate']))."',0,0)");
   
     $sqlEc=mysqli_query($con,"select GpsPOn,GpsPOff from hrm_api_emp_gpspunch where EmployeeID=".$_REQUEST['empid']." and GpsPDate='".date("Y-m-d",strtotime($_REQUEST['Sdate']))."'");
     $resEc=mysqli_fetch_assoc($sqlEc);
     echo json_encode(array("Code"=>"300", "GOn"=>$resEc['GpsPOn'], "GOff"=>$resEc['GpsPOff'], "Old_Service" =>$OldService) );
    }
    else
    {
     $resEc=mysqli_fetch_assoc($sqlEc);
     echo json_encode(array("Code"=>"300", "GOn"=>$resEc['GpsPOn'], "GOff"=>$resEc['GpsPOff'], "Old_Service" =>$OldService) );
    }
  
  }
  
  
  if($_REQUEST['GOn']>0 OR $_REQUEST['GOff']>0)
  {
    if($_REQUEST['GOn']>0 && $_REQUEST['GOff']>0)
    {
     $UpEc=mysqli_query($con,"update hrm_api_emp_gpspunch set GpsPOff=".$_REQUEST['GOff']." where EmployeeID=".$_REQUEST['empid']." and GpsPDate!='".date("Y-m-d")."'");
    }
    elseif($_REQUEST['GOn']>0)
    {
     $UpEc=mysqli_query($con,"update hrm_api_emp_gpspunch set GpsPOn=".$_REQUEST['GOn']." where EmployeeID=".$_REQUEST['empid']." and GpsPDate='".date("Y-m-d",strtotime($_REQUEST['Sdate']))."'");
    }
    elseif($_REQUEST['GOff']>0)
    {
     $UpEc=mysqli_query($con,"update hrm_api_emp_gpspunch set GpsPOff=".$_REQUEST['GOff']." where EmployeeID=".$_REQUEST['empid']." and GpsPDate='".date("Y-m-d",strtotime($_REQUEST['Sdate']))."'");
    }
    
    
	
	if($UpEc){ echo json_encode(array("Code"=>"300", "Msg"=>"Success") ); }
    else{ echo json_encode(array("Code"=>"100", "Msg"=>"Error") ); }
  }	
   
}



//Version Check
elseif($_REQUEST['value'] == 'version')
{
 
 $schkr=mysqli_query($con, "SELECT * FROM hrm_api_version"); $rowchkr=mysqli_num_rows($schkr); 
 if($rowchkr>0)
 {
   $rchkr=mysqli_fetch_assoc($schkr); 
   echo json_encode(array( "data" => "300", "version_no" => $rchkr['VersionD'], "version_no_ios" => $rchkr['VersionD_ios'], "Sink_IntervalTime"=>$rchkr['Sink_Interval'], "Sink_StartTime"=>$rchkr['SinkTime_Start'], "Sink_EndTime"=>$rchkr['SinkTime_end'], "Sink_StartTime"=>$rchkr['SinkTime_Start'], "Apps_Link"=>$rchkr['Apps_Link'], "Mrk_Link"=>$rchkr['Mrk_Link']) );
 }
 else 
 {
    echo json_encode(array( "data" => "100", "msg" => "Data Not Found!") );
 } 
 
}




//Get_Link
elseif($_REQUEST['value'] == 'get_link')
{
 
 $schkr=mysqli_query($con, "SELECT sno,app_link FROM hrm_api_iosapk_link where status=0 order by sno asc"); 
 $rowchkr=mysqli_num_rows($schkr); 
 
 if($rowchkr>0)
 {
   $rchkr=mysqli_fetch_assoc($schkr); 
   echo json_encode(array( "data" => "300", "app_link" => $rchkr['app_link']) );
   $up=mysqli_query($con,"update hrm_api_iosapk_link set status=1 where sno=".$rchkr['sno']);
 }
 else 
 {
    echo json_encode(array( "data" => "100", "msg" => "Error!") );
 } 
 
}



//Apps Support
elseif($_REQUEST['value'] == 'Support_Details' && $_REQUEST['empid']!= '' && $_REQUEST['comid']!= '')
{
  $sqlEsp=mysqli_query($con,"select * from hrm_api_support where CompanyId=".$_REQUEST['comid']." AND Sts='Y' order by Name ASC"); $rowEsp=mysqli_num_rows($sqlEsp); $Sarray=array();
  
  if($rowEsp>0)
  {
    while($rEsp=mysqli_fetch_assoc($sqlEsp)){ $Sarray[]=$rEsp; }
    echo json_encode(array("Code"=>"300", "Apps_Support_Details"=>$Sarray) );
  } 
  else{ echo json_encode(array("Code" => "100", "msg" => "Data Not Found!") ); }
  
}




//Reporting & Hod Check
elseif($_REQUEST['value'] == 'AppHodCheck' && $_REQUEST['empid']!= '')
{
 
 $qry = "hrm_employee_reporting r inner join hrm_employee e on r.EmployeeID=e.EmployeeID where e.EmpStatus='A'";
 $sqlApp=mysqli_query($con, "select * from ".$qry." AND r.AppraiserId=".$_REQUEST['empid']); 
 
 $sqlHod=mysqli_query($con, "select * from ".$qry." AND r.HodId=".$_REQUEST['empid']);
 
 
 $rowApp=mysqli_num_rows($sqlApp); if($rowApp>0){ $App='Y'; }else{ $App='N'; }  
 $rowHod=mysqli_num_rows($sqlHod); if($rowHod>0){ $Hod='Y'; }else{ $Hod='N'; }   
 echo json_encode(array( "Code" => "300", "data" => "300", "Rep" => $App, "Hod"=>$Hod) );
 
}




//My Team (Reporting) Check
elseif(($_REQUEST['value'] == 'MyTeam_Rep' || $_REQUEST['value'] == 'MyTeam_Hod') && $_REQUEST['empid']!='' && $_REQUEST['comid']>0)
{
  if($_REQUEST['value'] == 'MyTeam_Rep'){ $subQ="r.AppraiserId=".$_REQUEST['empid']; $Tital="Rep_Team_Details"; }
  elseif($_REQUEST['value'] == 'MyTeam_Hod'){ $subQ="r.HodId=".$_REQUEST['empid']; $Tital="Hod_Team_Details"; }
  
  $sqlT=mysqli_query($con, "select r.EmployeeID, EmpCode,
  
  CASE
WHEN DR ='Y' THEN 'Dr.'
WHEN (Gender ='F' AND Married ='Y') THEN 'Mrs.'
WHEN (Gender ='F' AND Married ='N') THEN 'Ms.'
ELSE 'Mr.'
END as Title,
  
  CONCAT(Fname , ' ' , Sname , ' ' , Lname) as name,
  
  Fname, Sname, Lname, DepartmentCode, DesigName, GradeValue, EmailId_Vnr, MobileNo_Vnr FROM hrm_employee_reporting r INNER JOIN hrm_employee e ON r.EmployeeID=e.EmployeeID INNER JOIN hrm_employee_general g ON r.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_personal p ON r.EmployeeID=p.EmployeeID INNER JOIN hrm_designation de on g.DesigId=de.DesigId INNER JOIN hrm_department d ON g.DepartmentId=d.DepartmentId INNER JOIN hrm_grade gr ON g.GradeId=gr.GradeId WHERE ".$subQ." AND e.EmpStatus='A' AND e.CompanyId=".$_REQUEST['comid']." order by e.EmpCode ASC");  
  $rowT=mysqli_num_rows($sqlT); $TeamDetails=array(); 
  if($rowT>0)
  {
    while($resT=mysqli_fetch_assoc($sqlT)){ $TeamDetails[]=$resT; }
    echo json_encode(array("Code"=>"300", $Tital=>$TeamDetails) );
  }
  else{ echo json_encode(array("Code" => "100", "msg" => "Data Not Found!") ); }
}





//Tool Show OR Not
elseif($_REQUEST['value'] == 'Tool_HideShow' && $_REQUEST['comid']>0)
{
 
 $sqlKey=mysqli_query($con, "select * from hrm_employee_key where CompanyId=".$_REQUEST['comid']);  
 $rowKey=mysqli_num_rows($sqlKey); 
 if($rowKey>0)
 {
   $resKey=mysqli_fetch_assoc($sqlKey);  
   echo json_encode(array( "data" => "300", "Profile" => $resKey['Profile'], "Att" => $resKey['Att'], "LV"=>$resKey['LV'], "Holiday"=>$resKey['Holiday'], "Ctc"=>$resKey['Ctc'], "Elig"=>$resKey['Elig'], "Payslip"=>$resKey['Payslip'], "InvestDecl"=>$resKey['InvestDecl'], "Query"=>$resKey['Query'], "WarmWelCome"=>$resKey['WarmWelCome']) );
 }
 else 
 {
    echo json_encode(array( "data" => "100", "msg" => "Error!!") );
 } 
 
}


/*
//Tool Show OR Not New API
elseif($_REQUEST['value'] == 'Tool_HideShow_new' && $_REQUEST['comid']>0)
{
 
 $sTd=mysqli_query($con, "select ToolId,TName,Permission from hrm_api_toolperm where ComId=".$_REQUEST['comid']." order by ToolId");  
 $rowKey=mysqli_num_rows($sTd);  
 $Tdarray=array();
  
  if($rowKey>0)
  {
    while($rTd=mysqli_fetch_assoc($sTd)){ $Tdarray[]=$rTd; }
    echo json_encode(array("Code"=>"300", "Tool_Permission"=>$Tdarray) );
  }
  else{ echo json_encode(array("Code" => "100", "msg" => "Data Not Found!") ); }
 
}
*/


//Tool Show OR Not New API
elseif($_REQUEST['value'] == 'Tool_HideShow_new' && $_REQUEST['comid']>0)
{
 
 $sTd=mysqli_query($con, "select ToolId,TName,Permission from hrm_api_toolperm where ComId=".$_REQUEST['comid']." order by ToolId");  
 $rowKey=mysqli_num_rows($sTd);  
  
  if($rowKey>0)
  {
    $Punch='N'; $MyTeam='N'; $InOut='N'; $Attend='N'; $Leave='N'; $Approval='N'; $Query='N'; $Calender='N'; 
	$Travel='N'; $Expense='N'; $InvestDecl='N'; $Salary='N'; $Support='N';
	
	while($rTd=mysqli_fetch_assoc($sTd))
	{ 
	 if($rTd['TName']=='Punch' && $rTd['Permission']=='Y'){ $Punch='Y'; }
	 elseif($rTd['TName']=='MyTeam' && $rTd['Permission']=='Y'){ $MyTeam='Y'; }
	 elseif($rTd['TName']=='InOut' && $rTd['Permission']=='Y'){ $InOut='Y'; }
	 elseif($rTd['TName']=='Attend' && $rTd['Permission']=='Y'){ $Attend='Y'; }
	 elseif($rTd['TName']=='Leave' && $rTd['Permission']=='Y'){ $Leave='Y'; }
	 elseif($rTd['TName']=='Approval' && $rTd['Permission']=='Y'){ $Approval='Y'; }
	 elseif($rTd['TName']=='Query' && $rTd['Permission']=='Y'){ $Query='Y'; }
	 elseif($rTd['TName']=='Calender' && $rTd['Permission']=='Y'){ $Calender='Y'; }
	 elseif($rTd['TName']=='Travel' && $rTd['Permission']=='Y'){ $Travel='Y'; }
	 elseif($rTd['TName']=='Expense' && $rTd['Permission']=='Y'){ $Expense='Y'; }
	 elseif($rTd['TName']=='InvestDecl' && $rTd['Permission']=='Y'){ $InvestDecl='Y'; }
	 elseif($rTd['TName']=='Salary' && $rTd['Permission']=='Y'){ $Salary='Y'; }
	 elseif($rTd['TName']=='Support' && $rTd['Permission']=='Y'){ $Support='Y'; }
	}
    echo json_encode(array("Code"=>"300", "Punch"=>$Punch, "MyTeam"=>$MyTeam, "InOut"=>$InOut, "Attend"=>$Attend, "Leave"=>$Leave, "Approval"=>$Approval, "Query"=>$Query, "Calender"=>$Calender, "Travel"=>$Travel, "Expense"=>$Expense, "InvestDecl"=>$InvestDecl, "Salary"=>$Salary, "Support"=>$Support) );
  }
  else{ echo json_encode(array("Code" => "100", "msg" => "Data Not Found!") ); }
 
}






/* //Apps_Notification
elseif($_REQUEST['value'] == 'Apps_Notification' && $_REQUEST['comid']>0)
{
 
 $sTd=mysqli_query($con, "select NotiId,Tital as Title,Notification,Fdate,Tdate from hrm_api_notification where Sts='Y' AND CompanyId=".$_REQUEST['comid']." order by Fdate DESC");  
 $rowKey=mysqli_num_rows($sTd);  
 $Narray=array();
  
  if($rowKey>0)
  {
    while($rTd=mysqli_fetch_assoc($sTd)){ $Narray[]=$rTd; }
    echo json_encode(array("Code"=>"300", "Count"=>$rowKey, "Notification_List"=>$Narray) );
  }
  else{ echo json_encode(array("Code" => "100", "msg" => "Data Not Found!") ); }
 
}
*/


//Apps_Notification
elseif($_REQUEST['value'] == 'Apps_Notification' && $_REQUEST['empid']>0 && $_REQUEST['comid']>0)
{
 
 /******************************************/
 /******************************************/
 
  $sqlE=mysqli_query($con,"select DepartmentId,UseApps_Punch from hrm_employee_general g inner join hrm_employee e on g.EmployeeID=e.EmployeeID where g.EmployeeID=".$_REQUEST['empid']); $rE=mysqli_fetch_assoc($sqlE);
  $sTd=mysqli_query($con,"select * from hrm_api_punch_department where DepartmentId=".$rE['DepartmentId']." AND Sts='Y'");
  $rowTd=mysqli_num_rows($sTd); 
  
  $PunchMiss=0;
  if($rE['UseApps_Punch']=='Y' OR $rowTd>0)
  {
   $days=date("t");
   for($i=1; $i<=$days; $i++)
   {
       $len=strlen($i);
       if($len==1){$i='0'.$i;}
       
      
	 $sch1=mysqli_query($con,"select * from hrm_employee_applyleave where LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$_REQUEST['empid']." AND Apply_Date>='".date("Y-m-".$i)."' AND Apply_Date<='".date("Y-m-".$i)."'"); 
	 $rch1=mysqli_num_rows($sch1); 
     $sch2=mysqli_query($con,"select * from hrm_employee_attendance where EmployeeID=".$_REQUEST['empid']." AND AttDate>='".date("Y-m-".$i)."' AND AttDate<='".date("Y-m-".$i)."' AND AttValue!=''"); $rch2=mysqli_num_rows($sch2); 
     $sch3=mysqli_query($con,"select * from hrm_employee_attendance_req where EmployeeID=".$_REQUEST['empid']." AND AttDate='".date("Y-m-".$i)."' "); $rch3=mysqli_num_rows($sch3); 
     
     //echo $rch1.'-'.$rch2.'-'.date("Y-m-".$i)<=date("Y-m-d");
     
     if(date("w",strtotime(date("Y-m-".$i)))!=0 && $rch1==0 && $rch2==0 && $rch3==0 && date("Y-m-".$i)<=date("Y-m-d"))
	 {
	     
	   $sql=mysqli_query($con,"select MorEveDate from hrm_employee_moreve_report_".date("Y")." where EmployeeID=".$_REQUEST['empid']." AND MorEveDate='".date("Y-m-".$i)."' AND MorReports!=''"); $row=mysqli_num_rows($sql);
	   
	   if($row==0){ $nn=1; $Absent += $nn; $Noti=1; }else{ $Noti=0; }
	   
	 }
	 
   } //for($i=1; $i<=$days; $i++)
   
   //echo 'aa='.$Absent;
   if($Absent>0){ $PunchMiss=$Absent; }else{ $PunchMiss=0; }
   
  } //if($rE['UseApps_Punch']=='Y' OR $rowTd>0)
 
 /******************************************/
 /******************************************/
 
 $ssTd=mysqli_query($con, "select Ndate from hrm_api_notification_emp where EmployeeID=".$_REQUEST['empid']);   $rrowTd=mysqli_num_rows($ssTd); 
 if($rrowTd>0){ $rrTd=mysqli_fetch_assoc($ssTd);  $ConQ="Fdate>'".$rrTd['Ndate']."'"; }
 else{ $ConQ="1=1"; }
 
 $sCTd=mysqli_query($con, "select count(*) as TotCnt from hrm_api_notification where Sts='Y' AND CompanyId=".$_REQUEST['comid']." AND ".$ConQ." AND '".date("Y-m-d")."'>=Fdate AND '".date("Y-m-d")."'<=Tdate order by Fdate DESC"); $rCTd=mysqli_fetch_assoc($sCTd); 
 
 
 $sTd=mysqli_query($con, "select NotiId,Tital as Title,Notification,Fdate,Tdate,
 
 CASE
WHEN Fdate<='".$rrTd['Ndate']."' THEN '0'
WHEN Fdate>'".$rrTd['Ndate']."' THEN '1'
END as Chk
 
 from hrm_api_notification where Sts='Y' AND CompanyId=".$_REQUEST['comid']." AND '".date("Y-m-d")."'>=Fdate AND '".date("Y-m-d")."'<=Tdate order by Fdate DESC");  
 $rowKey=mysqli_num_rows($sTd);  
 $Narray=array();
  
  if($rowKey>0 OR $PunchMiss>0)
  {
    while($rTd=mysqli_fetch_assoc($sTd)){ $Narray[]=$rTd; }
    echo json_encode(array("Code"=>"300", "Count"=>$rCTd['TotCnt'], "Notification_List"=>$Narray, "PunchMiss" => $PunchMiss) );
  }
  else{ echo json_encode(array("Code" => "100", "msg" => "Data Not Found!", "PunchMiss" => 0) ); }
 
}



//Apps_Notification Flag
elseif($_REQUEST['value'] == 'EmpNoti' && $_REQUEST['empid']>0 && $_REQUEST['date']!='')
{
 
 $sTd=mysqli_query($con, "select * from hrm_api_notification_emp where EmployeeID=".$_REQUEST['empid']);  
 $rowKey=mysqli_num_rows($sTd);  
  if($rowKey>0)
  {
    $sTd=mysqli_query($con, "update hrm_api_notification_emp set Ndate='".date("Y-m-d",strtotime($_REQUEST['date']))."' where EmployeeID=".$_REQUEST['empid']);   
  }
  else
  {  
    $sTd=mysqli_query($con, "insert into hrm_api_notification_emp(EmployeeID,Ndate) values(".$_REQUEST['empid'].", '".date("Y-m-d",strtotime($_REQUEST['date']))."')");  
  }
  
  if($sTd){ echo json_encode(array("Code"=>"300", "msg"=>"Success") ); }
  else{ echo json_encode(array("Code" => "100", "msg" => "Data Not Found!") ); }
 
}




//PunchMiss_Value
elseif($_REQUEST['value'] == 'PunchMiss_Value' && $_REQUEST['empid']>0)
{
  
 /******************************************/
 /******************************************/
  $Punarray=array();
  $sqlE=mysqli_query($con,"select DepartmentId,UseApps_Punch from hrm_employee_general g inner join hrm_employee e on g.EmployeeID=e.EmployeeID where g.EmployeeID=".$_REQUEST['empid']); $rE=mysqli_fetch_assoc($sqlE);
  $sTd=mysqli_query($con,"select * from hrm_api_punch_department where DepartmentId=".$rE['DepartmentId']." AND Sts='Y'");
  $rowTd=mysqli_num_rows($sTd); 
  
  if($rE['UseApps_Punch']=='Y' OR $rowTd>0)
  {
   $days=date("t");
   for($i=1; $i<=$days; $i++)
   {
     $len=strlen($i);
     if($len==1){$i='0'.$i;} 
       
	 $sch1=mysqli_query($con,"select * from hrm_employee_applyleave where LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$_REQUEST['empid']." AND Apply_Date>='".date("Y-m-".$i)."' AND Apply_Date<='".date("Y-m-".$i)."'"); 
	 $rch1=mysqli_num_rows($sch1); 
     $sch2=mysqli_query($con,"select * from hrm_employee_attendance where EmployeeID=".$_REQUEST['empid']." AND AttDate>='".date("Y-m-".$i)."' AND AttDate<='".date("Y-m-".$i)."' AND AttValue!=''"); $rch2=mysqli_num_rows($sch2); 
     $sch3=mysqli_query($con,"select * from hrm_employee_attendance_req where EmployeeID=".$_REQUEST['empid']." AND AttDate='".date("Y-m-".$i)."' "); $rch3=mysqli_num_rows($sch3);
     
     //echo $rch1.'-'.$rch2.'-'.date("Y-m-".$i)<=date("Y-m-d");
     
     if(date("w",strtotime(date("Y-m-".$i)))!=0 && $rch1==0 && $rch2==0 && $rch3==0 && date("Y-m-".$i)<=date("Y-m-d"))
	 {
	     
	   $sql=mysqli_query($con,"select MorEveDate from hrm_employee_moreve_reports_".date("Y")." where EmployeeID=".$_REQUEST['empid']." AND MorEveDate='".date("Y-m-".$i)."' AND MorReports!=''"); $row=mysqli_num_rows($sql);
	   
	   if($row==0){ $nn=date("Y-m-".$i); } $Punarray[]=$nn;
	   
	 }
	 
   } //for($i=1; $i<=$days; $i++)
   
   if($Punarray!='')
   { 
     echo json_encode(array("Code"=>"300", "PunchMissed_Date"=>$Punarray) );
   }
   else
   { 
     echo json_encode(array("Code" => "100", "msg" => "Data Not Found!") );
   }
   
  } //if($rE['UseApps_Punch']=='Y' OR $rowTd>0)
 
 /******************************************/
 /******************************************/
 
 
}




//Change password
elseif($_REQUEST['value'] == 'changepassword' && $_REQUEST['empid']>0 && $_REQUEST['cPass']!='' && $_REQUEST['nPass']!='')
{
 
 include('../../AdminUser/codeEncDec.php');
 $SqlQ=mysqli_query($con,"SELECT EmpPass FROM hrm_employee WHERE EmployeeID=".$_REQUEST['empid']); 
 $row=mysqli_num_rows($SqlQ);
 
 if($row==0){ echo json_encode(array("Code" => "100", "msg" => "Error: Your ID does not exist!") ); }
 else
 { 
   $res=mysqli_fetch_assoc($SqlQ); $pass=decrypt($res['EmpPass']); 
   if($_REQUEST['cPass']!=$pass)
   { echo json_encode(array("Code" => "100", "msg" => "Error: You have entered an incorrect password!") ); }  
   else
   { $CHpass=encrypt($_REQUEST['nPass']);
     $SqlU=mysqli_query($con,"UPDATE hrm_employee SET EmpPass='".$CHpass."' where EmployeeID=".$_REQUEST['empid']); 
     if($SqlU){ echo json_encode(array("Code"=>"300", "msg"=>"Password change successfully") ); } 
	 else{ echo json_encode(array("Code" => "100", "msg" => "Error: Try Again!") ); }
   }	 
 }  
  
}


//***********************************************************//
//***********************************************************//

//My Document
elseif($_REQUEST['value'] == 'document' && $_REQUEST['empid']>0 && $_REQUEST['comid']!='')
{
 
 
 $SqlQ=mysqli_query($con,"SELECT EmpCode,PanNo FROM hrm_employee e inner join hrm_employee_personal p on e.EmployeeID=p.EmployeeID WHERE e.EmployeeID=".$_REQUEST['empid']); 
 $res=mysqli_fetch_assoc($SqlQ);
 
 $filename = '../../Employee/HealthIDCard/'.$_REQUEST['comid'].'/'.$res['EmpCode'].'/'.$res['EmpCode'].'_A.pdf';
 if(file_exists($filename))
 { $HelthCard='Y'; $HelthCardURL='https://www.vnrseeds.co.in/Employee/MyHelthFile.php?a=open&File='.$res['EmpCode'].'&c='.$_REQUEST['comid'].'&n=1'; }
 else{ $HelthCard='N'; $HelthCardURL=''; }
  
 $filename2 = '../../Employee/CoronaKavach'.$_REQUEST['comid'].'_2020/'.$res['EmpCode'].'.pdf';
 if(file_exists($filename2))
 { $CoronaF='Y'; $CoronaURL='https://www.vnrseeds.co.in/Employee/CoronaKavach'.$_REQUEST['comid'].'_2020/'.$res['EmpCode'].'.pdf'; }
 else{ $CoronaF='N'; $CoronaURL=''; }
 
 $esic = '../../Employee/ESIC_Card/'.$res['EmpCode'].'.pdf';
 if(file_exists($esic))
 { $esicF='Y'; $esicURL='https://www.vnrseeds.co.in/Employee/ESIC_Card/'.$res['EmpCode'].'.pdf'; }
 else{ $esicF='N'; $esicURL=''; }
 
 $filename3A = '../../Employee/ImgTds'.$_REQUEST['comid'].'202021/'.$res['PanNo'].'_2021-22.pdf';
 if(file_exists($filename3A))
 { $Form16_A='Y'; $Form16_AURL='https://www.vnrseeds.co.in/Employee/ImgTds'.$_REQUEST['comid'].'202021/'.$res['PanNo'].'_2021-22.pdf'; }
 else{ $Form16_A='N'; $Form16_AURL=''; }
 
 $filename3B = '../../Employee/ImgTds'.$_REQUEST['comid'].'202021/'.$res['PanNo'].'_PARTB_2021-22.pdf';
 if(file_exists($filename3B))
 { $Form16_B='Y'; $Form16_BURL='https://www.vnrseeds.co.in/Employee/ImgTds'.$_REQUEST['comid'].'202021/'.$res['PanNo'].'_PARTB_2021-22.pdf'; }
 else{ $Form16_B='N'; $Form16_BURL=''; }

 echo json_encode(array("Code"=>"300", "msg"=>"MyDocument", "HealthCard"=>$HelthCard, "HealthCard_URL"=>$HelthCardURL, "CoronaInsuCard"=>$CoronaF, "CoronaInsuCard_URL"=>$CoronaURL, "ESIC"=>$esicF, "ESIC_URL"=>$esicURL, "Form16_A"=>$Form16_A, "Form16_A_URL"=>$Form16_AURL, "Form16_B"=>$Form16_B, "Form16_B_URL"=>$Form16_BURL) );  
  
}


//WarmWelCome
elseif($_REQUEST['value'] == 'warmwelcome' && $_REQUEST['empid']>0 && $_REQUEST['comid']!='')
{
 
 $sqlMK=mysqli_query($con,"select WarmWelCome from hrm_employee_key where CompanyId=".$_REQUEST['comid']); 
 $resMK=mysqli_fetch_assoc($sqlMK); 

 if(date("m")>=2 && date("m")<=12){ $PrevMnt=date("m")-1; $PrevYer=date("Y"); }
 else{ $PrevMnt=12; $PrevYer=date("Y")-1;} 
 $mkdate = mktime(0,0,0, $PrevMnt, 1, $PrevYer); 
 $days = date('t',$mkdate);

 $WrmChk=mysqli_query($con,"select * from hrm_employee e inner join hrm_employee_general g ON e.EmployeeID=g.EmployeeID where g.DateJoining between '".date($PrevYer."-".$PrevMnt."-01")."' and '".date($PrevYer."-".$PrevMnt."-".$days)."' and e.EmpStatus='A' and e.CompanyId=".$_REQUEST['comid']); $RowWrmChk=mysqli_num_rows($WrmChk); 

 if($RowWrmChk>0 && $resMK['WarmWelCome']=='Y' && (date("d")>=15 OR $_REQUEST['v']=='test'))
 {
  $WarmWelcomeURL="https://www.vnrseeds.co.in/WarmWelCome.php";
 }
 else
 {
  $WarmWelcomeURL='';
 }
 
 echo json_encode(array("Code"=>"300", "msg"=>"WarmWelcome", "LinkURL"=>$WarmWelcomeURL) ); 
  
}




//VNR Impact
elseif($_REQUEST['value'] == 'VNR_Impact' && $_REQUEST['empid']>0 && $_REQUEST['comid']!='')
{ 
  $svE=mysqli_query($con, "select * from hrm_impact_document where ISts='Y' order by IVal DESC limit 0,1"); 
  $vE=mysqli_fetch_assoc($svE);

  if($vE['IUrl']!=''){ $Dir=$vE['IUrl']; }
  elseif($vE['IDocName']!=''){ $Dir="https://www.vnrseeds.co.in/AdminUser/VnrImpact/".$vE['IDocName']; }
  else{ $Dir=''; }
  
  $Dir="https://www.vnrseeds.co.in/AdminUser/VnrImpact/".$vE['IDocName'];
  
  echo json_encode(array("Code"=>"300", "msg"=>"VNRImpact", "LinkURL"=>$Dir) ); 
  
}



//BirthDay/Anniversary
elseif($_REQUEST['value'] == 'BirthDay_Anniversary' && $_REQUEST['empid']>0 && $_REQUEST['comid']!='')
{ 
  $chkWishM=mysqli_query($con, "select * from hrm_wishmail_checker where WDate='".date("Y-m-d")."' AND WCheck=1 AND CompanyId=".$_REQUEST['comid']); 
  $rowWishM=mysqli_num_rows($chkWishM);
  
  $array_emp='';  $array_empAnn='';

  if($rowWishM>0)
  {

   $sqlE=mysqli_query($con, "select e.EmployeeID,e.EmpCode,
   
   CASE WHEN DR ='Y' THEN 'Dr.'
WHEN (Gender ='F' AND Married ='Y') THEN 'Mrs.'
WHEN (Gender ='F' AND Married ='N') THEN 'Ms.'
ELSE 'Mr.'
END as Title,

  CONCAT(Fname , ' ' , Sname , ' ' , Lname) as name,
   
    DepartmentCode,HqName from hrm_employee_general g inner join hrm_employee e on g.EmployeeID=e.EmployeeID inner join hrm_employee_personal p on g.EmployeeID=p.EmployeeID inner join hrm_department d on g.DepartmentId=d.DepartmentId inner join hrm_headquater hq on g.HqId=hq.HqId where e.EmpStatus='A' AND e.CompanyId=1 AND g.DOB_dm='".date("0000-m-d")."' order by g.GradeId DESC"); 
	
	//Fname,Sname,Lname,Gender,Married,DR,DepartmentCode,HqName
	
   $rowE=mysqli_num_rows($sqlE); $array_emp=array();
   while($resE=mysqli_fetch_assoc($sqlE))
   {
     $chkSp=mysqli_query($con, "select * from hrm_employee_separation where EmployeeID=".$resE['EmployeeID']." AND Rep_Approved!='C' AND Hod_Approved!='C' AND HR_Approved!='C'"); $RowchkSp=mysqli_num_rows($chkSp);
 
     if($RowchkSp==0)
     {
       //if($resE['DR']=='Y'){$MS='Dr.';} elseif($resE['Gender']=='M'){$MS='Mr.';} elseif($resE['Gender']=='F' AND $resE['Married']=='Y'){$MS='Mrs.';} elseif($resE['Gender']=='F' AND $resE['Married']=='N'){$MS='Miss.';}  
       //if($resE['Sname']==''){ $Name = $MS.' '.ucwords(strtolower($resE['Fname'].' '.$resE['Lname'])); }
      // else{ $Name = $MS.' '.ucwords(strtolower($resE['Fname'].' '.$resE['Sname'].' '.$resE['Lname'])); }
       $array_emp[]=$resE;
     }
   } //While 
   //$EmpBirth = implode(', ', $array_emp);

   $sqlEa=mysqli_query($con, "select e.EmployeeID,e.EmpCode,
   
   CASE WHEN DR ='Y' THEN 'Dr.'
WHEN (Gender ='F' AND Married ='Y') THEN 'Mrs.'
WHEN (Gender ='F' AND Married ='N') THEN 'Ms.'
ELSE 'Mr.'
END as Title,

  CONCAT(Fname , ' ' , Sname , ' ' , Lname) as name,
  
   DepartmentCode,HqName from hrm_employee_general g inner join hrm_employee e on g.EmployeeID=e.EmployeeID inner join hrm_employee_personal p on g.EmployeeID=p.EmployeeID inner join hrm_department d on g.DepartmentId=d.DepartmentId inner join hrm_headquater hq on g.HqId=hq.HqId where e.EmpStatus='A' AND e.CompanyId=1 AND p.Married='Y' AND p.MarriageDate_dm='".date("0000-m-d")."' order by g.GradeId DESC"); //Fname,Sname,Lname,Gender,Married,DR,DepartmentCode,HqName
   
   $rowEa=mysqli_num_rows($sqlEa); $array_empAnn=array();
   while($resEa=mysqli_fetch_assoc($sqlEa))
   {
     $chkSp=mysqli_query($con, "select * from hrm_employee_separation where EmployeeID=".$resEa['EmployeeID']." AND Rep_Approved!='C' AND Hod_Approved!='C' AND HR_Approved!='C'"); $RowchkSp=mysqli_num_rows($chkSp);
 
     if($RowchkSp==0)
     {    
      //if($resEa['DR']=='Y' AND $resEa['Gender']=='M'){$MSa='Mrs. & Dr.';} 
      //elseif($resEa['DR']=='Y' AND $resEa['Gender']=='F'){$MSa='Mr. & Dr.';}
      //elseif($resEa['Gender']=='M'){$MSa='Mrs. & Mr.';}
      //elseif($resEa['Gender']=='F'){$MSa='Mr. & Mrs.';}   
      //if($resEa['Sname']==''){ $NameAnn = $MSa.' '.ucwords(strtolower($resEa['Fname'].' '.$resEa['Lname'])); }
      //else{ $NameAnn = $MSa.' '.ucwords(strtolower($resEa['Fname'].' '.$resEa['Sname'].' '.$resEa['Lname'])); }
      $array_empAnn[]=$resEa;
     }
   } //while 
   //$EmpAnn = implode(', ', $array_empAnn);

   if($rowE>0 || $rowEa>0)
   {
     echo json_encode(array("Code"=>"300", "msg"=>"Result", "BirthDay_Emp"=>$array_emp, "Anni_Emp"=>$array_empAnn) );
   } 
   else
   {
     echo json_encode(array("Code"=>"300", "msg"=>"Result", "BirthDay_Emp"=>$array_emp, "Anni_Emp"=>$array_empAnn) );
   }

  } //if($rowWishM>0) 
  else
   {
     echo json_encode(array("Code"=>"100", "msg"=>"Result", "BirthDay_Emp"=>$array_emp, "Anni_Emp"=>$array_empAnn) );
   }
  
}

//***********************************************************//
//***********************************************************//




//Payslip-Overall  Payslip-Overall  Payslip-Overall  Payslip-Overall
elseif($_REQUEST['value'] == 'payslip_overall' && $_REQUEST['empid']!= '' && $_REQUEST['comid']>0)
{
  
 $ei=$_REQUEST['empid']; $ci=$_REQUEST['comid'];
 /*******************************************************************/
 /*******************************************************************/
 
 $sqlPayM=mysqli_query($con, "select * from hrm_employee_key_paymonth where CompanyId=".$ci);  $resPayM=mysqli_fetch_array($sqlPayM); 

 if($resPayM['Jan']=='N'){ $q1=" AND Month!=1"; } 
 if($resPayM['Feb']=='N'){ $q2=" AND Month!=2"; } 
 if($resPayM['Mar']=='N'){ $q3=" AND Month!=3"; } 
 if($resPayM['Apr']=='N'){ $q4=" AND Month!=4"; } 
 if($resPayM['May']=='N'){ $q5=" AND Month!=5"; } 
 if($resPayM['Jun']=='N'){ $q6=" AND Month!=6"; } 
 if($resPayM['Jul']=='N'){ $q7=" AND Month!=7"; } 
 if($resPayM['Aug']=='N'){ $q8=" AND Month!=8"; } 
 if($resPayM['Sep']=='N'){ $q9=" AND Month!=9"; } 
 if($resPayM['Oct']=='N'){ $q10=" AND Month!=10"; } 
 if($resPayM['Nov']=='N'){ $q11=" AND Month!=11"; } 
 if($resPayM['Decm']=='N'){ $q12=" AND Month!=12"; }
 
 //$q9=' AND 1=1';
 
 $Qp1 = $q1.''.$q2.''.$q3.''.$q4.''.$q5.''.$q6.''.$q7.''.$q8.''.$q9.''.$q10.''.$q11.''.$q12;
 
 
 if(date("m")==1)
 { $y=date("Y")-1; 
   $tbl1="hrm_employee_monthlypayslip_".$y; $mIn1=" Month in (4,5,6,7,8,9,10) AND (Year=".$y." OR Year=".date("Y").")";
   $tbl2="hrm_employee_monthlypayslip";     $mIn2=" Month in (11,12) AND (Year=".$y." OR Year=".date("Y").")"; 
 }
 elseif(date("m")==2)
 { $y=date("Y")-1; 
   $tbl1="hrm_employee_monthlypayslip_".$y; $mIn1=" Month in (4,5,6,7,8,9,10,11) AND (Year=".$y." OR Year=".date("Y").")";
   $tbl2="hrm_employee_monthlypayslip";     $mIn2=" Month in (12,1) AND (Year=".$y." OR Year=".date("Y").")"; 
 }
 elseif(date("m")==3)
 { $y=date("Y")-1; 
   $tbl1="hrm_employee_monthlypayslip_".$y; $mIn1=" Month in (4,5,6,7,8,9,10,11,12) AND Year=".$y;
   $tbl2="hrm_employee_monthlypayslip";     $mIn2=" Month in (1,2) AND Year=".date("Y"); 
 }
 elseif(date("m")==4)
 { $y=date("Y")-1; 
   $tbl1="hrm_employee_monthlypayslip_".$y; $mIn1=" Month in (5,6,7,8,9,10,11,12) AND (Year=".$y." OR Year=".date("Y").")";
   $tbl2="hrm_employee_monthlypayslip";     $mIn2=" Month in (1,2,3) AND (Year=".$y." OR Year=".date("Y").")"; 
 }
 elseif(date("m")==5)
 { $y=date("Y")-1; 
   $tbl1="hrm_employee_monthlypayslip_".$y; $mIn1=" Month in (6,7,8,9,10,11,12) AND (Year=".$y." OR Year=".date("Y").")";
   $tbl2="hrm_employee_monthlypayslip";     $mIn2=" Month in (1,2,3,4) AND (Year=".$y." OR Year=".date("Y").")"; 
 }
 elseif(date("m")==6)
 { $y=date("Y")-1; 
   $tbl1="hrm_employee_monthlypayslip_".$y; $mIn1=" Month in (7,8,9,10,11,12) AND (Year=".$y." OR Year=".date("Y").")";
   $tbl2="hrm_employee_monthlypayslip";     $mIn2=" Month in (1,2,3,4,5) AND (Year=".$y." OR Year=".date("Y").")"; 
 }
 elseif(date("m")==7)
 { $y=date("Y")-1; 
   $tbl1="hrm_employee_monthlypayslip_".$y; $mIn1=" Month in (8,9,10,11,12) AND (Year=".$y." OR Year=".date("Y").")";
   $tbl2="hrm_employee_monthlypayslip";     $mIn2=" Month in (1,2,3,4,5,6) AND (Year=".$y." OR Year=".date("Y").")"; 
 }
 elseif(date("m")==8)
 { $y=date("Y")-1; 
   $tbl1="hrm_employee_monthlypayslip_".$y; $mIn1=" Month in (9,10,11,12) AND (Year=".$y." OR Year=".date("Y").")";
   $tbl2="hrm_employee_monthlypayslip";     $mIn2=" Month in (1,2,3,4,5,6,7) AND (Year=".$y." OR Year=".date("Y").")"; 
 }
 elseif(date("m")==9)
 { $y=date("Y")-1; 
   $tbl1="hrm_employee_monthlypayslip_".$y; $mIn1=" Month in (10,11,12) AND (Year=".$y." OR Year=".date("Y").")";
   $tbl2="hrm_employee_monthlypayslip";     $mIn2=" Month in (1,2,3,4,5,6,7,8) AND (Year=".$y." OR Year=".date("Y").")"; 
 }
 elseif(date("m")==10)
 { $y=date("Y")-1; 
   $tbl1="hrm_employee_monthlypayslip_".$y; $mIn1=" Month in (11,12) AND (Year=".$y." OR Year=".date("Y").")";
   $tbl2="hrm_employee_monthlypayslip";     $mIn2=" Month in (1,2,3,4,5,6,7,8,9) AND (Year=".$y." OR Year=".date("Y").")"; 
 }
 elseif(date("m")==11)
 { $y=date("Y")-1; 
   $tbl1="hrm_employee_monthlypayslip_".$y; $mIn1=" Month in (12) AND (Year=".$y." OR Year=".date("Y").")";
   $tbl2="hrm_employee_monthlypayslip";     $mIn2=" Month in (1,2,3,4,5,6,7,8,9,10) AND (Year=".$y." OR Year=".date("Y").")"; 
 }
 elseif(date("m")==12)
 { $y=date("Y")-1; 
   $tbl1=""; $mIn1="";
   $tbl2="hrm_employee_monthlypayslip"; $mIn2=" Month in (1,2,3,4,5,6,7,8,9,10,11) AND (Year=".$y." OR Year=".date("Y").")"; 
 }

 $sqlPayM=mysqli_query($con, "select * from hrm_employee_key_paymonth where CompanyId=".$ci);  
 $sqlKey=mysqli_query($con, "select Payslip from hrm_employee_key where CompanyId=".$ci);  
 $resPayM=mysqli_fetch_array($sqlPayM); $resKey=mysqli_fetch_array($sqlKey);
 
 if($resKey['Payslip']=='Y')
 {
 
 if(intval(date("m"))==1){ $m=12; }
 else{$m=intval(date("m"))-1;}
 
 if(($m==1 AND $resPayM['Jan']=='Y') OR ($m==2 AND $resPayM['Feb']=='Y') OR ($m==3 AND $resPayM['Mar']=='Y') OR ($m==4 AND $resPayM['Apr']=='Y') OR ($m==5 AND $resPayM['May']=='Y') OR ($m==6 AND $resPayM['Jun']=='Y') OR ($m==7 AND $resPayM['Jul']=='Y') OR ($m==8 AND $resPayM['Aug']=='Y') OR ($m==9 AND $resPayM['Sep']=='Y') OR ($m==10 AND $resPayM['Oct']=='Y') OR ($m==11 AND $resPayM['Nov']=='Y') OR ($m==12 AND $resPayM['Decm']=='Y')) 
 { $subQ='1=1'; }else{ $subQ='Month!='.$m;}
  
  /*** ---------------------------------------- ***/
  /*** ---------------------------------------- ***/
  $selQ="Month, Year, (Tot_Gross + Bonus + DA + Arreares + LeaveEncash + Incentive + VariableAdjustment + PerformancePay + NoticePay + PP_Inc + CCA + RA + Arr_Basic + Arr_Hra + Arr_Spl + Arr_Conv + Arr_Bonus + Arr_LTARemb + Arr_RA + Arr_PP + YCea+YMr + YLta + Car_Allowance + Car_Allowance_Arr + VarRemburmnt + TA + Arr_LvEnCash) as Earning, (TDS + Tot_Deduct + Arr_Pf + VolContrib + Arr_Esic + DeductAdjmt + RecConAllow + RA_Recover) as Deduction, ((Tot_Gross + Bonus + DA + Arreares + LeaveEncash + Incentive + VariableAdjustment + PerformancePay + PP_Inc + CCA + RA + Arr_Basic + Arr_Hra + Arr_Spl + Arr_Conv + Arr_Bonus + Arr_LTARemb + Arr_RA + Arr_PP + YCea+YMr + YLta + Car_Allowance + Car_Allowance_Arr + VarRemburmnt + TA + Arr_LvEnCash) - (TDS + Tot_Deduct + Arr_Pf + VolContrib + Arr_Esic + DeductAdjmt + RecConAllow + RA_Recover)) as NetAmount";
  
  
  if($tbl1!='' && $mIn1!=''){ $qry="SELECT ".$selQ." FROM ".$tbl1." WHERE EmployeeID=".$ei." AND ".$mIn1." $Qp1 UNION SELECT ".$selQ." FROM ".$tbl2." WHERE EmployeeID=".$ei." AND ".$mIn2." $Qp1 AND ".$subQ." order by Year DESC, Month Desc"; }
  else{ $qry="SELECT ".$selQ." FROM ".$tbl2." WHERE EmployeeID=".$ei." AND ".$mIn2." $Qp1 AND ".$subQ." order by Year DESC, Month Desc"; }
  
  //echo $qry;
  
  $SqlPay=mysqli_query($con, $qry);
  $RowPay=mysqli_num_rows($SqlPay);
  if($RowPay>0)
  { 
    $PayList=array(); 
    while($ResPay=mysqli_fetch_assoc($SqlPay))
	{
	 $ResPay['Month_Name']=date("F",strtotime(date("Y-".$ResPay['Month']."-01")));   
	 $PayList[]=$ResPay;
	}
	echo json_encode(array("Code" => "300", "PaySlip_List" => $PayList) );
  }
  else{ echo json_encode(array("Code" => "100", "msg" => "Data not found!") ); }
  /*** ---------------------------------------- ***/
  /*** ---------------------------------------- ***/
  
 } //if($resKey['Payslip']=='Y')
 else
 {
  echo json_encode(array("Code" => "100", "msg" => "Currently not allowed!") );
 }
  
 /*******************************************************************/
 /*******************************************************************/
  
}






//Payslip  Payslip  Payslip  Payslip
elseif($_REQUEST['value'] == 'payslip' && $_REQUEST['empid']!= '' && $_REQUEST['month']>0 && $_REQUEST['year']>0 && $_REQUEST['comid']>0)
{
 
 $ei=$_REQUEST['empid']; $m=$_REQUEST['month']; $y=$_REQUEST['year']; $ci=$_REQUEST['comid'];
 /*******************************************************************/
 /*******************************************************************/
 $sqlE=mysqli_query($con, "select Fname,Sname,Lname,EmpCode,StateName,HqName,Gender,PanNo,CostCenter,AccountNo,BankName,PfAccountNo,DOB,DateJoining,DR,Married,DepartmentId,GradeId,DesigId from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_personal p ON e.EmployeeID=p.EmployeeID INNER JOIN hrm_headquater hq ON g.HqId=hq.HqId INNER JOIN hrm_state s ON g.CostCenter=s.StateId where e.EmployeeID=".$ei); $resE=mysqli_fetch_assoc($sqlE); 

 if($resE['DR']=='Y'){$M='Dr.';} elseif($resE['Gender']=='M'){$M='Mr.';} elseif($resE['Gender']=='F' AND $resE['Married']=='Y'){$M='Mrs.';} elseif($resE['Gender']=='F' AND $resE['Married']=='N'){$M='Miss.';}  
 $Ename=$M.' '.$resE['Fname'].' '.$resE['Sname'].' '.$resE['Lname']; $LEC=strlen($resE['EmpCode']); 
 if($LEC==1){$EC='000'.$resE['EmpCode'];}elseif($LEC==2){$EC='00'.$resE['EmpCode'];}
 elseif($LEC==3){$EC='0'.$resE['EmpCode'];}elseif( $LEC>=4){$EC=$resE['EmpCode'];}
 
 $BY=date("Y")-1;
 if($y>=date("Y") OR ($y==$BY AND date("m")=='01' AND $m==12)){ $PayTable='hrm_employee_monthlypayslip'; }
 elseif($y==$BY AND $m<12){ $PayTable='hrm_employee_monthlypayslip_'.$y; }
 else{ $PayTable='hrm_employee_monthlypayslip_'.$y; }

 $sqlPayM=mysqli_query($con, "select * from hrm_employee_key_paymonth where CompanyId=".$ci);  
 $sqlKey=mysqli_query($con, "select Payslip from hrm_employee_key where CompanyId=".$ci);  
 $resPayM=mysqli_fetch_array($sqlPayM); $resKey=mysqli_fetch_array($sqlKey);

 if($resKey['Payslip']=='Y' AND (($m==1 AND $resPayM['Jan']=='Y') OR ($m==2 AND $resPayM['Feb']=='Y') OR ($m==3 AND $resPayM['Mar']=='Y') OR ($m==4 AND $resPayM['Apr']=='Y') OR ($m==5 AND $resPayM['May']=='Y') OR ($m==6 AND $resPayM['Jun']=='Y') OR ($m==7 AND $resPayM['Jul']=='Y') OR ($m==8 AND $resPayM['Aug']=='Y') OR ($m==9 AND $resPayM['Sep']=='Y') OR ($m==10 AND $resPayM['Oct']=='Y') OR ($m==11 AND $resPayM['Nov']=='Y') OR ($m==12 AND $resPayM['Decm']=='Y'))) 
 { 
  
  /*** ---------------------------------------- ***/
  /*** ---------------------------------------- ***/
  $SqlPay=mysqli_query($con, "SELECT * FROM ".$PayTable." WHERE EmployeeID=".$ei." AND Month=".$m." AND Year=".$y.""); 
  $RowPay=mysqli_num_rows($SqlPay);
  if($RowPay==0)
  { 
   $pTbl='hrm_employee_monthlypayslip';
   $SqlPay=mysqli_query($con, "SELECT * FROM ".$pTbl." WHERE EmployeeID=".$ei." AND Month=".$m." AND Year=".$y.""); 
   $ResPay=mysqli_fetch_assoc($SqlPay);
  
  }
  else{ $pTbl=$PayTable; $ResPay=mysqli_fetch_assoc($SqlPay);  }
 
  if($ResPay['GradeId']>0)
  {
    $SqlG=mysqli_query($con, "SELECT GradeValue FROM hrm_grade WHERE GradeId=".$ResPay['GradeId']); 
	$ResG=mysqli_fetch_assoc($SqlG); $GradeValue=$ResG['GradeValue'];
  }
  else { $SqlG=mysqli_query($con, "SELECT GradeValue FROM hrm_grade WHERE GradeId=".$resE['GradeId']); 
         $ResG=mysqli_fetch_assoc($SqlG); $GradeValue=$ResG['GradeValue']; }
   
  
    if($ResPay['DepartmentId']>0)
    {
     $SqlD=mysqli_query($con,"SELECT DepartmentName,FunName FROM hrm_department WHERE DepartmentId=".$ResPay['DepartmentId']); $ResD=mysqli_fetch_assoc($SqlD); 
     $DeptValue=$ResD['DepartmentName']; $FunValue=$ResD['FunName'];
    }
    else 
    { $SqlD=mysqli_query($con,"SELECT DepartmentName,FunName FROM hrm_department WHERE DepartmentId=".$resE['DepartmentId']); $ResD=mysqli_fetch_assoc($SqlD); 
     $DeptValue=$ResD['DepartmentName']; $FunValue=$ResD['FunName'];
    } 
   
  /*  
  if($ResPay['DepartmentId']>0)
  {
    $SqlD=mysqli_query($con, "SELECT DepartmentName FROM hrm_department WHERE DepartmentId=".$ResPay['DepartmentId']); 
	$ResD=mysqli_fetch_assoc($SqlD); 
    $DeptValue=$ResD['DepartmentName'];
  }
  else { $SqlD=mysqli_query($con, "SELECT DepartmentName FROM hrm_department WHERE DepartmentId=".$resE['DepartmentId']); 
         $ResD=mysqli_fetch_assoc($SqlD); $DeptValue=$ResD['DepartmentName']; }
  */         
         
     
  if($ResPay['DesigId']>0)
  {
    $SqlDe=mysqli_query($con, "SELECT DesigName FROM hrm_designation WHERE DesigId=".$ResPay['DesigId']); 
	$ResDe=mysqli_fetch_assoc($SqlDe); $DesigValue=$ResDe['DesigName'];
  }
  else { $SqlDe=mysqli_query($con, "SELECT DesigName FROM hrm_designation WHERE DesigId=".$resE['DesigId']); 
         $ResDe=mysqli_fetch_assoc($SqlDe); $DesigValue=$ResDe['DesigName']; }
  
  /* ------------------------------------------------------------------------------------------------- */
  $SqlCom=mysqli_query($con, "select cb.*,StateName from hrm_company_basic cb inner join hrm_state s on cb.StateId=s.StateId where cb.CompanyId=".$ci); $resCom=mysqli_fetch_assoc($SqlCom);
  $SelM=strtoupper(date("F",strtotime(date("Y-".$m."-01")))).'-'.$y;
  if($resE['Gender']=='M'){ $Gender='MALE'; }else{ $Gender='FEMALE'; }
  
  $TotGross=$ResPay['Tot_Gross']+$ResPay['Bonus']+$ResPay['DA']+$ResPay['Arreares']+$ResPay['LeaveEncash']+$ResPay['Incentive']+$ResPay['VariableAdjustment']+$ResPay['PerformancePay']+$ResPay['NoticePay']+$ResPay['PP_Inc']+$ResPay['CCA']+$ResPay['RA']+$ResPay['Arr_Basic']+$ResPay['Arr_Hra']+$ResPay['Arr_Spl']+$ResPay['Arr_Conv']+$ResPay['Arr_Bonus']+$ResPay['Bonus_Adjustment']+$ResPay['Arr_LTARemb']+$ResPay['Arr_RA']+$ResPay['Arr_PP']+$ResPay['YCea']+$ResPay['YMr']+$ResPay['YLta']+$ResPay['Car_Allowance']+$ResPay['Car_Allowance_Arr']+$ResPay['VarRemburmnt']+$ResPay['TA']+$ResPay['Arr_LvEnCash'];
  $TotDeduct=$ResPay['TDS']+$ResPay['Tot_Deduct']+$ResPay['Arr_Pf']+$ResPay['VolContrib']+$ResPay['Arr_Esic']+$ResPay['DeductAdjmt']+$ResPay['RecConAllow']+$ResPay['RA_Recover'];
  $TotNetAmount=$TotGross-$TotDeduct;
  
  function no_to_words($no)
  {
    $words = array('0'=> '' ,'1'=> 'one' ,'2'=> 'two' ,'3' => 'three','4' => 'four','5' => 'five','6' => 'six','7' => 'seven','8' => 'eight','9' => 'nine','10' => 'ten','11' => 'eleven','12' => 'twelve','13' => 'thirteen','14' => 'fouteen','15' => 'fifteen','16' => 'sixteen','17' => 'seventeen','18' => 'eighteen','19' => 'nineteen','20' => 'twenty','30' => 'thirty','40' => 'fourty','50' => 'fifty','60' => 'sixty','70' => 'seventy','80' => 'eighty','90' => 'ninty','100' => 'hundred &','1000' => 'thousand','100000' => 'lakh','10000000' => 'crore');
    if($no == 0) return ' ';
    else 
	{ 
	 $novalue=''; $highno=$no; $remainno=0; $value=100;  $value1=1000;  
	 while($no>=100) 
	 {
      if(($value <= $no) &&($no < $value1))
	  { $novalue=$words["$value"]; $highno = (int)($no/$value); $remainno = $no % $value; break; }
      $value= $value1;  $value1 = $value * 100;
     }
     if(array_key_exists("$highno",$words))
     return $words["$highno"]." ".$novalue." ".no_to_words($remainno);
     else { $unit=$highno%10; $ten =(int)($highno/10)*10;
     return $words["$ten"]." ".$words["$unit"]." ".$novalue." ".no_to_words($remainno); }
    } //else
  }
	$InWorld=no_to_words($TotNetAmount);
    $NetWord=strtoupper($InWorld).' RUPEES ONLY';
  
  $sqlEr=mysqli_query($con, "SELECT Basic, Hra, Bonus_Month as Bonus, Special, Convance, TA, DA, LeaveEncash, Arreares, Incentive, VariableAdjustment, PerformancePay, NoticePay, PP_Inc as Performance_Incentive, CCA, RA, VarRemburmnt, Car_Allowance, Car_Allowance_Arr as Arr_CarAllow, Arr_Basic, Arr_Hra, Arr_Spl, Arr_Conv, Arr_Bonus, Bonus_Adjustment, Arr_LTARemb, Arr_RA, Arr_PP, Arr_LvEnCash, YCea, YMr, YLta FROM ".$pTbl." WHERE EmployeeID=".$ei." AND Month=".$m." AND Year=".$y.""); 
  $resEr=mysqli_fetch_assoc($sqlEr); $ErArry=array(); $ErArry[]=$resEr;
  
  $sqlDd=mysqli_query($con, "SELECT EPF_Employee as PF, TDS, ESCI_Employee as ESIC, NPS_Value as NPS, Arr_Pf, Arr_Esic, VolContrib, DeductAdjmt, RecConAllow, RA_Recover FROM ".$pTbl." WHERE EmployeeID=".$ei." AND Month=".$m." AND Year=".$y.""); 
  $resDd=mysqli_fetch_assoc($sqlDd); $DdArry=array(); $DdArry[]=$resDd;
  /* ------------------------------------------------------------------------------------------------- */
  
  if(date($_REQUEST['year']."-".$_REQUEST['month']."-d")>='2022-04-01')
  {
      $DevtV=$FunValue;
      $Lable='Function';
  }
  else
  {
      $DevtV=$DeptValue;  
      $Lable='Department';
  }
  
  echo json_encode(array("Code" => "300", "Company" => $resCom['CompanyName'], "Address" => $resCom['AdminOffice']." (".$resCom['PinNo'].") [".$resCom['StateName']."]", "Month_Year" => $SelM, "Code" => $EC, "Name" => $Ename, "State" => strtoupper($resE['StateName']), "Department" => strtoupper($DevtV), "DFun" => strtoupper($Lable), "Grade" => strtoupper($GradeValue), "Designation" => strtoupper($DesigValue), "HeadQuarter" => strtoupper($resE['HqName']), "Gender" => $Gender, "DOB" => date("d-m-Y", strtotime($resE['DOB'])), "DOJ" => date("d-m-Y", strtotime($resE['DateJoining'])), "PF_Ac_No." => strtoupper($resE['PfAccountNo']), "Bank_Ac_No." => $resE['AccountNo'], "BankName" => $resE['BankName'], "PAN No" => $resE['PanNo'], "TotalDay" => $ResPay['TotalDay'], "PaidDay" => $ResPay['PaidDay'], "Absent" => $ResPay['Absent'], "Earn" => $Earn, "Tot_Earn" => $TotGross, "Tot_Deduct" => $TotDeduct, "Tot_NetAmount" => $TotNetAmount, "NetAmt_InWords" => $NetWord, "ListOfEarnings" => $ErArry, "ListOfDeductions" => $DdArry) );      		   
  
  /*** ---------------------------------------- ***/
  /*** ---------------------------------------- ***/
  }
  else
  {
    echo json_encode(array("Code" => "100", "msg" => "Currently not allowed!") );
  }
 
 /*******************************************************************/
 /*******************************************************************/
 
}




//CTC CTC CTC CTC CTC CTC CTC CTC CTC CTC
elseif($_REQUEST['value'] == 'CTC' && $_REQUEST['empid']>0)
{
 
 $sqlCtc=mysqli_query($con, "select * from hrm_employee_ctc WHERE EmployeeID=".$_REQUEST['empid']." AND Status='A'");  
 $rowCtc=mysqli_num_rows($sqlCtc); 
 
 if($_REQUEST['empid']==7){$rmk="Variable Remuneration@ 7.5% of NRV less production cost (on revenue generated out of your breeding efforts)";}else{$rmk='';}
 
 if($rowCtc>0)
 {
      
   $resCtc=mysqli_fetch_assoc($sqlCtc);  
   echo json_encode(array( "data" => "300", "Basic" => $resCtc['BAS_Value'], "HRA" => $resCtc['HRA_Value'], "Bonus"=>$resCtc['Bonus_Month'], "Special"=>$resCtc['SPECIAL_ALL_Value'], "Gross"=>$resCtc['Tot_GrossMonth'], "PAC_Gross"=>$resCtc['GrossSalary_PostAnualComponent_Value'], "PF"=>$resCtc['PF_Employee_Contri_Value'], "ESIC"=>$resCtc['ESCI'], "NPS"=>$resCtc['NPS_Value'], "NetMonthlySalary"=>$resCtc['NetMonthSalary_Value'], "LTA"=>$resCtc['LTA_Value'], "CEA"=>$resCtc['CHILD_EDU_ALL_Value'], "AnnualGross"=>$resCtc['Tot_Gross_Annual'], "Gratuity"=>$resCtc['GRATUITY_Value'], "EmployerPF_Contribution"=>$resCtc['PF_Employer_Contri_Annul'], "EmployerESIC_Contribution"=>$resCtc['AnnualESCI'], "MediclaimPolicyPremium"=>$resCtc['Mediclaim_Policy'], "Ctc"=>$resCtc['Tot_CTC'], "VariablePay"=>$resCtc['VariablePay'], "TotCtc"=>$resCtc['TotCtc'], "MedicalInsu_Coverage"=>$resCtc['EmpAddBenifit_MediInsu_value'], "Car_Entitlement" => $resCtc['Car_Entitlement'], "Rmk" => $rmk, "Rmk2" => "This is a confidential page not to be discussed openly with others. You shall be personally responsible for any leakage of information regarding your compensation") );
   
 }
 else 
 {
    echo json_encode(array( "data" => "100", "msg" => "Error!!") );
 } 
 
}



//Eligibilty Eligibilty Eligibilty Eligibilty Eligibilty Eligibilty
elseif($_REQUEST['value'] == 'Eligibilty' && $_REQUEST['empid']>0 && $_REQUEST['comid']>0)
{
 
 
  
 $sqlCtc=mysqli_query($con, "select ESCI from hrm_employee_ctc WHERE EmployeeID=".$_REQUEST['empid']." AND Status='A'");  
 $resCtc=mysqli_fetch_assoc($sqlCtc); 
 
 
 $SqlE=mysqli_query($con, "SELECT GradeId, DepartmentId, EmpAddBenifit_MediInsu_value, ESCI FROM hrm_employee_general g INNER JOIN hrm_employee_ctc c ON g.EmployeeID=c.EmployeeID WHERE g.EmployeeID=".$_REQUEST['empid']." AND Status='A'"); 
 $ResE=mysqli_fetch_assoc($SqlE); 

  $sqlGrade=mysqli_query($con,"select GradeValue from hrm_grade where GradeId=".$ResE['GradeId']); 
  $resGrade=mysqli_fetch_assoc($sqlGrade);
  if($resGrade['GradeValue']!='')
  {
   $sqlDaily=mysqli_query($con,"select * from hrm_dailyallow where GradeValue='".$resGrade['GradeValue']."'"); 
  $resDaily=mysqli_fetch_assoc($sqlDaily);
  } 	
 
 
  $rese=$ResE['GradeId'];       
  if($rese==61 || $rese==62){ $limit='05 Lakhs'; }
  elseif($rese==63 || $rese==64 || $rese==65 || $rese==66)
  { $limit='10 Lakhs'; }
  elseif($rese==67 || $rese==68 || $rese==69 || $rese==70|| $rese==71)
  { $limit='25 Lakhs'; }
  elseif($rese==72 || $rese==73 || $rese==74 || $rese==75|| $rese==76)
  { $limit='50 Lakhs'; }
  else{ $limit=''; }
 
 
 if($ResE['DepartmentId']==3){$DaRmk="(In case of day tour involving more than 40 kms. travel)";}
 elseif($ResE['DepartmentId']==6){$DaRmk="(If the work needs touring for more than 6 hours in a day & as per the applicability of the seasons)";}
 elseif($ResE['DepartmentId']==6){$DaRmk="(Only For Sales Staff)";}
 elseif($ResE['DepartmentId']==24 OR $ResE['DepartmentId']==25){$DaRmk="(If the work needs touring for more than 6 hours in a day)";}
 
 $sqlElig=mysqli_query($con,"select * from hrm_employee_eligibility WHERE EmployeeID=".$_REQUEST['empid']." AND Status='A'"); 
 $rowElig=mysqli_num_rows($sqlElig); 
 if($rowElig>0)
 {
        
   $resElig=mysqli_fetch_assoc($sqlElig);  
   $Rate2Km=$resElig['Travel_TwoWeeKM'];
   /***************************************/
   if($resElig['VehiclePolicy']>0)
   { 
   
    if($resElig['VehiclePolicy']==9){ $Rate2Km='Two Wheeler policy - R&D, upto J2 for Field'; }
	 
    $sqpf=mysqli_query($con, "select * from hrm_master_eligibility_mapping_tblfield where PolicyId=".$resElig['VehiclePolicy']." and FieldId=2 AND sts=1 AND ComId=".$_REQUEST['comid']); $rowpf=mysql_num_rows($sqpf);
    if($rowpf>0)
    {
     $respf=mysqli_fetch_assoc($sqpf);
     $sqpfv=mysqli_query($con,"select Fn2 from hrm_master_eligibility_policy_tbl".$resElig['VehiclePolicy']." where GradeId=".$GrdId); $rowqpfv=mysqli_num_rows($sqpfv);
     if($rowqpfv>0){ $resqpfv=mysqli_fetch_assoc($sqpfv); $vehiclaCose=$resqpfv['Fn2']; }
     else{ $vehiclaCose=0; }
    }
    else
    {
     $sqpf2=mysqli_query($con,"select * from hrm_master_eligibility_mapping_tblfield where PolicyId=".$resElig['VehiclePolicy']." and FieldId=14 AND sts=1 AND ComId=".$_REQUEST['comid']); $rowpf2=mysql_num_rows($sqpf2);
     if($rowpf2>0)
     {
      $respf2=mysqli_fetch_assoc($sqpf2);
      $sqpfv2=mysqli_query($con, "select Fn14 from hrm_master_eligibility_policy_tbl".$resElig['VehiclePolicy']." where GradeId=".$ResE['GradeId']." ",$con); $rowqpfv2=mysqli_num_rows($sqpfv2);
      if($rowqpfv2>0){ $resqpfv2=mysqli_fetch_assoc($sqpfv2); $vehiclaCose=$resqpfv2['Fn2']; }
      else{ $vehiclaCose=0; }
     }
     else{ $vehiclaCose=0; }
    } //if($rowpf>0)
	//else { $vehiclaCose=0; }
  }	//if($resElig['VehiclePolicy']>0)
  else { $vehiclaCose=0; }
   /***************************************/
   
   
   if($resCtc['ESCI']>0){ $HealthInsu=''; }
   else{ $HealthInsu=$resElig['Health_Insurance']; }
   
   echo json_encode(array( "data" => "300", "Lodging_CategoryA" => $resElig['Lodging_CategoryA'], "Lodging_CategoryB" => $resElig['Lodging_CategoryB'], "Lodging_CategoryC"=>$resElig['Lodging_CategoryC'], "DA_Outside_Hq"=>$resElig['DA_Outside_Hq'], "DA_@_Hq"=>$resElig['DA_Inside_Hq'], "DARmk" => $DaRmk, "Travel_TwoWeeKM"=>$Rate2Km, "Travel_TwoWeeLimitPerDay"=>$resElig['Travel_TwoWeeLimitPerDay'], "Travel_TwoWeeLimitPerMonth"=>$resElig['Travel_TwoWeeLimitPerMonth'], "Travel_FourWeeKM"=>$resElig['Travel_FourWeeKM'], "Travel_FourWeeLimitPerMonth"=>$resElig['Travel_FourWeeLimitPerMonth'], "TravelMode"=>$resElig['Mode_Travel_Outside_Hq'], "TravelClass"=>$resElig['TravelClass_Outside_Hq'], "Mobile_expenses_Reimbursement"=>$resElig['Mobile_Exp_Rem_Rs'], "Period"=>$resElig['Prd'], "MobileHandSet"=>$resElig['Mobile_Hand_Elig_Rs'], "GPSSet"=>$resElig['GPSSet'], "Misc_Expenses"=>$resElig['Misc_Expenses'], "Health_Insurance"=>$HealthInsu, "HelthCheck"=>$resElig['HelthCheck'], "HelthChekAmt" => $resDaily['HelthChekUp'], "VehicalEntValue" => $vehiclaCose, "Gratuity" =>"As Per Law", "Deduction" => "As Per Law", "Msg" => "Group Personal Accident Insurance", "Limit" => $limit) );
 }
 else 
 {
    echo json_encode(array( "data" => "100", "msg" => "Error!!") );
 } 
 
}


//Investment Declaration
elseif($_REQUEST['value'] == 'Investment_Decl_Details' && $_REQUEST['empid']>0 && $_REQUEST['comid']>0)
{
    
 $sInvSb=mysqli_query($con, "select OpenYN from hrm_investdecl_setting_submission where CompanyId=".$_REQUEST['comid']); 
 $rInvSb=mysqli_fetch_assoc($sInvSb);
 $sql=mysqli_query($con,"select * from hrm_investdecl_setting where CompanyId=".$_REQUEST['comid']." AND Status='A'"); 
 $res=mysqli_fetch_array($sql); 
 $sqlBy=mysqli_query($con,"select FromDate,ToDate from hrm_year where YearId=".$res['B_YearId']); 
 $resBy=mysqli_fetch_array($sqlBy);
 $sqlCy=mysqli_query($con,"select FromDate,ToDate from hrm_year where YearId=".$res['C_YearId']); 
 $resCy=mysqli_fetch_array($sqlCy);
 $fb=date("Y",strtotime($resBy['FromDate'])); $tb=date("Y",strtotime($resBy['ToDate']));
 $fc=date("Y",strtotime($resCy['FromDate'])); $tc=date("Y",strtotime($resCy['ToDate']));
 $PrdBack=$fb.'-'.$tb; $PrdCurr=$fc.'-'.$tc;


 $Check=mysqli_query($con,"select * from hrm_employee_investment_declaration where EmployeeID=".$_REQUEST['empid']." AND Period='".$PrdCurr."' AND Month=".$res['C_Month']); $rowCheck=mysqli_num_rows($Check); 
 if($rowCheck==0 AND $res['ShowB_Form']=='Y')
 { 
   $sqlMax=mysqli_query($con,"select MAX(IvstDecId) as MaxId from hrm_employee_investment_declaration where EmployeeID=".$_REQUEST['empid']); $resMax=mysqli_fetch_assoc($sqlMax);
   if($resMax['MaxId']>0)
   { 
	 $SqlIvst=mysqli_query($con,"select * from hrm_employee_investment_declaration where IvstDecId=".$resMax['MaxId']." AND EmployeeID=".$_REQUEST['empid']); $resIvst=mysqli_fetch_assoc($SqlIvst); 
   } 
 }
 elseif($rowCheck>0){ $resIvst=mysqli_fetch_assoc($Check); }
 
  $sqlEdit=mysqli_query($con, "select count(*) as tot, FormSubmit from hrm_employee_investment_declaration where EmployeeID=".$_REQUEST['empid']." AND Period='".$PrdCurr."' AND Month=".$res['C_Month']); 
  $rowEdit=mysqli_num_rows($sqlEdit); 
  
 if($rowEdit==0 OR $rowEdit=='null'){ $rowEdit='0'; $resEdit=''; }
 else { $resEdit=mysqli_fetch_assoc($sqlEdit); $rowEdit=$resEdit['tot']; $resEdit=$resEdit['FormSubmit']; }
 
 if($resIvst>0)
 {  
   echo json_encode(array( "Code" => "300", "data" => "300", "SubOpen"=>$rInvSb['OpenYN'], "Count"=>$rowEdit, "FormSubmit"=>$resEdit, "LastDatTime" => $res['LastDateTime'], "OldPeriod"=>$PrdBack, "NewPeriod"=>$PrdCurr, "OldMonth"=>$res['B_Month'], "NewMonth"=>$res['C_Month'], "Regime" => $resIvst['Regime'], "Year"=>$PrdCurr, "HRA"=>$resIvst['HRA'], "LTA"=>$resIvst['LTA'], "CEA"=>$resIvst['CEA'], "MIP"=>$resIvst['MIP'], "MIP_Limit" => $res['MIP_Limit'], "MTI"=>$resIvst['MTI'], "MTI_Limit"=>$res['MIT_Limit'], "MTS"=>$resIvst['MTS'], "MTS_Limit"=>$res['MTS_Limit'], "ROL"=>$resIvst['ROL'], "ROL_Limit"=>$res['ROL_Limit'], "Handicapped"=>$resIvst['Handi'], "Handi_Limit"=>$res['Handi_Limit'], "DTC"=>$resIvst['DTC'], "DFS"=>$resIvst['DFS'], "PenFun"=>$resIvst['PenFun'], "LIP"=>$resIvst['LIP'], "DA"=>$resIvst['DA'], "PPF"=>$resIvst['PPF'], "PostOff"=>$resIvst['PostOff'], "ULIP"=>$resIvst['ULIP'], "HL"=>$resIvst['HL'], "MF"=>$resIvst['MF'], "IB"=>$resIvst['IB'], "CTF"=>$resIvst['CTF'], "NHB"=>$resIvst['NHB'], "NSC"=>$resIvst['NSC'], "SukS"=>$resIvst['SukS'], "EPF"=>$resIvst['EPF'], "NPS"=>$resIvst['NPS'], "CorNPS"=>$resIvst['CorNPS'], "Form16"=>$resIvst['Form16'], "SPE"=>$resIvst['SPE'], "PT"=>$resIvst['PT'], "PFD"=>$resIvst['PFD'], "IT"=>$resIvst['IT'], "IHL"=>$resIvst['IHL'], "IL"=>$resIvst['IL'], "Inv_Date"=>$resIvst['Inv_Date'], "Inv_Place"=>$resIvst['Place']) );
 }
 else 
 {
    echo json_encode(array( "Code" => "100", "data" => "100", "msg" => "Error!!") );
 } 
 
}




//Password Verify
elseif($_REQUEST['value'] == 'epass_verify' && $_REQUEST['empid']>0 && $_REQUEST['epass']!='')
{
    
  $run_qry = mysqli_query($con,"SELECT EmpPass FROM hrm_employee WHERE EmployeeID=".$_REQUEST['empid']); 
  $num=mysqli_num_rows($run_qry);  
  if($num>0)
  {
    $res = mysqli_fetch_assoc($run_qry);
    require_once('../../AdminUser/codeEncDec.php');
    $EncPass=decrypt($res['EmpPass']); 
	  
	if($EncPass==$_REQUEST['epass'])
    { 
	 echo json_encode(array("Code" => "300", "msg" => "Verified!") );
	} 
	else{ echo json_encode(array("Code" => "100", "msg" => "Not Verified!") ); }
  }
  else{ echo json_encode(array("Code" => "100", "msg" => "Something went wrong, please try again later") ); }
}



//Help Document
elseif($_REQUEST['value'] == 'help_document' && $_REQUEST['empid']>0)
{
    
  //$filename = '../EssMob_Help.pdf';
  //if(file_exists($filename))  
  //{
     echo json_encode(array("Code" => "300", "msg" => "File Available", "HelpDoc_Link" => 'https://drive.google.com/file/d/1OEmNNAAt-asjWLMq6keshqMqVcghTma8/view') );  
  //}  
  //else
  //{
     //echo json_encode(array("Code" => "300", "msg" => "File Not Found") ); 
  //}
    
}



//APK File Link
elseif($_REQUEST['value'] == 'apkfile_link' && $_REQUEST['empid']>0)
{
    
  //Version    
  echo json_encode(array("Code" => "300", "msg" => "File Available", "ApkFile_Link" => '') );  
    
}



//APK File Link
elseif($_REQUEST['value'] == 'xeasy_link' && $_REQUEST['empid']>0)
{
    
  echo json_encode(array("Code" => "300", "pass" => "0") );  
    
}



//Group Personal Accident Insurance
elseif($_REQUEST['value'] == 'Accident_Insurance' && $_REQUEST['empid']>0)
{
  
  $sqle=mysqli_query($con,"select GradeId from hrm_employee_general where EmployeeID=".$_REQUEST['empid']);
  $reseQ=mysqli_fetch_assoc($sqle); $rese=$reseQ['GradeId'];    
    
  if($rese==61 || $rese==62){ $limit='05 Lakhs'; }
  elseif($rese==63 || $rese==64 || $ResE['GradeId']==65 || $rese==66)
  { $limit='10 Lakhs'; }
  elseif($rese==67 || $rese==68 || $rese==69 || $rese==70 || $rese==71)
  { $limit='25 Lakhs'; }
  elseif($rese==72 || $rese==73 || $rese==74 || $rese==75 || $rese==76)
  { $limit='50 Lakhs'; } 
  
  elseif($rese==31){ $limit='5 Lakhs'; } 
  elseif($rese==32){ $limit='10 Lakhs'; } 
  elseif($rese==33 || $rese==34){ $limit='25 Lakhs'; } 
  elseif($rese==35){ $limit='50 Lakhs'; } 
 
  
  
  echo json_encode(array("Code" => "300", "Msg" => "Group Personal Accident Insurance", "Limit" => $limit) );  
    
}






//Last
else
{
 echo json_encode(array("Code" => "100", "msg" => "Invalid value!") );
}

 
