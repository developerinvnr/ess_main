<?php 

	$con=mysqli_connect('localhost','vnrseed2_hr','vnrhrims321');
	if(!$con) die("Failed to connect to database!");
	mysqli_select_db($con, "vnrseed2_hrims");

 
 /******************************* Joining Employee Open *************************************/
 /******************************* Joining Employee Open *************************************/
  
  
  $jsonData = file_get_contents('php://input');
  $json = json_decode($jsonData);  //, true
  
  
  if($json!=null)
  {
    
	/******************** 1111111 Start Start 1111111 *****************************/
	/******************** 1111111 Start Start 1111111 *****************************/
	if($json->EmployeeID!='' && $json->ATTENDANCE!='')
	{
    
    //$ec_s = $json->NAME;
    $ec_s = $json->EmployeeID;
    $com_s = $json->companyId; 
	$attv_s = $json->ATTENDANCE; 
	$attd_s = $json->DATE;
	$attd_rmk = $json->ReportingRemark;
	
	
	//$ec=$ec_s;
	$ec=str_replace(array( '"', '"' ), '', $ec_s);
	$ec=str_replace(array( '(', ')' ), '', $ec);
	$ec = preg_replace("/[^0-9]/", "", $ec);
	$com=0; if($com_s==845){ $com=1; }
	$attv=''; if($attv_s=='Present'){ $attv='P'; }elseif($attv_s=='Absent'){ $attv='A'; }
	$attd=date("Y-m-d",strtotime($attd_s));
	$attdEv=date("Y-m-d H:i:s",strtotime($attd_s));
	$atty=date("Y",strtotime($attd_s));
    
	/*****************************************************************************/
	$sY=mysqli_query($con, "select YearId from hrm_year where Company".$com."Status='A'");
	
	$rY=mysqli_fetch_assoc($sY);
	
	$sqlE=mysqli_query($con, "select EmployeeID from hrm_employee where EmpCode=".$ec." AND CompanyId=".$com); 
	$rowE=mysqli_num_rows($sqlE); $resE=mysqli_fetch_assoc($sqlE); 
	
	$ins=mysqli_query($con,"insert into hrm_attendance_spoors(EmployeeID, EmpCode, CompanyId, Attend, AttDate, Remark, InTime, InLoc, InLat, InLong, OutTime, OutLoc, OutLat, OutLong, CrDate) values(".$resE['EmployeeID'].", '".$ec."', '".$com."', '".$attv_s."', '".$attd_s."', '".$attd_rmk."', '".$inTime."', '".$inLoc."', '".$inLat."', '".$inLong."', '".$outTime."', '".$outLoc."', '".$outLat."', '".$outLong."', '".date("Y-m-d")."')");   
	
	if($rowE>0){
	  
	  $sql=mysqli_query($con, "select Leave_Type,LeaveStatus from hrm_employee_applyleave WHERE EmployeeID=".$resE['EmployeeID']." AND ('".$attd."'>=Apply_FromDate AND '".$attd."'<=Apply_ToDate) AND LeaveStatus!=3 AND LeaveCancelStatus!='Y'"); 
	  
	  $row=mysqli_num_rows($sql);
	 
	  if($row==0){

	   if($attv=='P'){
	    
		/*************************/
		$sql2=mysqli_query($con, "select * from hrm_employee_attendance WHERE EmployeeID=".$resE['EmployeeID']." AND AttDate='".$attd."'"); $row2=mysqli_num_rows($sql2);
	     
		if($row2>0){ 

			$res2=mysqli_fetch_assoc($sql2); 

			if($res2['AttValue']!='CL' AND $res2['AttValue']!='CH' AND $res2['AttValue']!='SL' AND $res2['AttValue']!='SH' AND $res2['AttValue']!='PL' AND $res2['AttValue']!='PH' AND $res2['AttValue']!='EL' AND $res2['AttValue']!='FL' AND $res2['AttValue']!='TL'){ 

			$sqlUp=mysqli_query($con, "update hrm_employee_attendance set AttValue='".$attv."' WHERE EmployeeID=".$resE['EmployeeID']." AND AttDate='".$attd."'"); 


			} 


	    }elseif($row2==0 AND date("w",strtotime($attd))!=0){

			$sqlUp = mysqli_query($con, "insert into hrm_employee_attendance(EmployeeID, AttValue, AttDate, Year, YearId) values(".$resE['EmployeeID'].",'".$attv."', '".$attd."', '".date("Y")."', ".$rY['YearId'].")");
	     
	     
	    }else{ 

	    	echo json_encode( array("Error" => "True", "ErrorDesc" => "not inserted!") );

	    }
		
		if($sqlUp){
		    
		    
		  /*********************************************/
		  /*********************************************/
		  $sqlm=mysqli_query($con, "Select MorEveRepId from hrm_employee_moreve_report_".$atty." WHERE EmployeeID=".$resE['EmployeeID']." AND MorEveDate='".$attd."'"); $rowsm = mysqli_num_rows($sqlm);  
	      if($rowsm>0)
	      { $resm=mysqli_fetch_assoc($sqlm); 
		    if($resm['Att']!='CL' AND $resm['Att']!='CH' AND $resm['Att']!='SL' AND $resm['Att']!='SH' AND $resm['Att']!='PL' AND $resm['Att']!='PH' AND $resm['Att']!='EL' AND $resm['Att']!='FL' AND $resm['Att']!='TL')
			{ 
			    
			    if($resm['MorReports']!=''){ $MERep='EveReports'; $MEDate='EveDateTime'; }
			  else{ $MERep='MorReports'; $MEDate='MorDateTime'; }
			  $sqlUp = mysqli_query($con, "UPDATE hrm_employee_moreve_report_".$atty." SET ".$MEDate."='".$attdEv."', ".$MERep."='".$attd_rmk."', Att='".$attv."', UpAtt='Y' WHERE EmployeeID=".$resE['EmployeeID']." AND MorEveRepId=".$resm['MorEveRepId']."");
			    
			    //$sqlUp = mysqli_query($con, "UPDATE hrm_employee_moreve_report SET MorDateTime='".$attd."', MorReports='".$attd_rmk."', Att='".$attv."', UpAtt='Y' WHERE EmployeeID=".$resE['EmployeeID']." AND MorEveDate='".$attd."'"); 
			    
			}
	      } 
	      elseif($rowsm==0 AND date("w",strtotime($attd))!=0)
	      { 
	       $sqlUp = mysqli_query($con, "insert into hrm_employee_moreve_report_".$atty." (EmployeeID, MorEveDate, MorDateTime, MorReports, Att, UpAtt) values(".$resE['EmployeeID'].", '".$attd."', '".$attd."', '".$attd_rmk."', '".$attv."', 'Y')"); 
	      }  
		  /*********************************************/
		  /*********************************************/

			echo json_encode( array("Error" => "False", "ErrorDesc" => "Data Inserted") ); 

		}
		
		
		
	   } //if($attv=='A' OR $attv=='P' OR $attv=='OD' OR $attv=='WFH')
	   else{
	   	echo json_encode( array("Error" => "True", "ErrorDesc" => "not inserted!") );
	   }
	   
      } //if($row==0)
	  else{ 
	  	echo json_encode( array("Error" => "True", "ErrorDesc" => "not inserted!") ); 
	  }
	
    }
	//if($rowE>0)
	/*****************************************************************************/
  
  } //if($json->EmployeeID!='' && $json->ATTENDANCE!='')
  /******************** 1111111 Close Close 1111111 *****************************/
  /******************** 1111111 Close Close 1111111 *****************************/
  
  
  
  /******************** 2222222 Open Open 2222222 *****************************/
  /******************** 2222222 Open Open 2222222 *****************************/
  //if($json->empNo!='' && $json->signInTime!='' && $json->signOutTime!='')
  if($json->empNo!='')
  {
  
    $ec = $json->empNo;
    //$ec = $json->empId;
	$inTime = $json->signInTime;
    $inLoc = $json->signInLocation; 
	$inLong = $json->signInLong; 
	$inLat = $json->signInLat;
	$outTime = $json->signOutTime;
    $outLoc = $json->signOutLocation; 
	$outLong = $json->signOutLong; 
	$outLat = $json->signOutLat;
	
	$ec=str_replace(array( '"', '"' ), '', $ec);
	$ec=str_replace(array( '(', ')' ), '', $ec);
	$ec = preg_replace("/[^0-9]/", "", $ec);
	$com=1; 
	$y=date("Y",strtotime($inTime));
	$attd=date("Y-m-d",strtotime($inTime));
	$inDT=date("Y-m-d H:i:s",strtotime($inTime));
	$outDT=date("Y-m-d H:i:s",strtotime($outTime));
	
	$sqlE=mysqli_query($con, "select EmployeeID from hrm_employee where EmpCode=".$ec." AND CompanyId=".$com); 
	$rowE=mysqli_num_rows($sqlE); $resE=mysqli_fetch_assoc($sqlE); 
	
	$ins=mysqli_query($con,"insert into hrm_attendance_spoors(EmployeeID, EmpCode, CompanyId, Attend, AttDate, Remark, InTime, InLoc, InLat, InLong, OutTime, OutLoc, OutLat, OutLong, CrDate) values(".$resE['EmployeeID'].", '".$ec."', '".$com."', '".$attv_s."', '".$attd_s."', '".$attd_rmk."', '".$inTime."', '".$inLoc."', '".$inLat."', '".$inLong."', '".$outTime."', '".$outLoc."', '".$outLat."', '".$outLong."', '".date("Y-m-d")."')");
	
	if($rowE>0)
	{
	  
	  $sql=mysqli_query($con, "Select * from hrm_employee_moreve_report_".$y." WHERE EmployeeID=".$resE['EmployeeID']." AND MorEveDate='".$attd."'"); $rows = mysqli_num_rows($sql); 
      if($rows>0)
      { 
	   $sqlUp = mysqli_query($con, "UPDATE hrm_employee_moreve_report_".$y." SET SignIn_Time='".$inDT."', SignIn_Loc='".$inLoc."', SignIn_Long='".$inLong."', SignIn_Lat='".$inLat."', SignOut_Time='".$outDT."', SignOut_Loc='".$outLoc."', SignOut_Long='".$outLong."', SignOut_Lat='".$outLat."' WHERE EmployeeID=".$resE['EmployeeID']." AND MorEveDate='".$attd."'"); 
	  }
      else
      { 
	   $sqlUp = mysqli_query($con, "insert into hrm_employee_moreve_report_".$y."(EmployeeID, MorEveDate, SignIn_Time, SignIn_Loc, SignIn_Long, SignIn_Lat, SignOut_Time, SignOut_Loc, SignOut_Long, SignOut_Lat) values(".$resE['EmployeeID'].", '".$attd."', '".$inDT."', '".$inLoc."', '".$inLong."', '".$inLat."', '".$outDT."', '".$outLoc."', '".$outLong."', '".$outLat."')"); 
	  }
	  
	  if($sqlUp){ echo json_encode( array("Error" => "False", "ErrorDesc" => "Data In-Out Details Inserted") ); }
 
	}//if($rowE>0)
	
   
  }
  /******************** 2222222 Close Close 2222222 *****************************/
  /******************** 2222222 Close Close 2222222 *****************************/	 
   
  }else{

    echo json_encode( array("Error" => "True", "ErrorDesc" => "value missing!") );

  }
  
 
 
 /******************************* Joining Employee Close *************************************/
 /******************************* Joining Employee Close *************************************/

?>
