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
    
    
    //$ec_s = $json->NAME;
    $ec_s = $json->EmployeeID;
    $com_s = $json->companyId; 
	$attv_s = $json->ATTENDANCE; 
	$attd_s = $json->DATE;
	$attd_rmk = $json->ReportingRemark;
	
	
	//$ec=$ec_s;
	$ec=str_replace(array( '"', '"' ), '', $ec_s);
	$com=0; if($com_s==845){ $com=1; }
	$attv=''; if($attv_s=='Present'){ $attv='P'; }elseif($attv_s=='Absent'){ $attv='A'; }
	$attd=date("Y-m-d",strtotime($attd_s));
	$attdEv=date("Y-m-d H:i:s",strtotime($attd_s));
    
	/*****************************************************************************/
	$sY=mysqli_query($con, "select YearId from hrm_year where Company".$com."Status='A'");
	
	$rY=mysqli_fetch_assoc($sY);
	
	$sqlE=mysqli_query($con, "select EmployeeID from hrm_employee where EmpCode=".$ec." AND CompanyId=".$com); 
	$rowE=mysqli_num_rows($sqlE); $resE=mysqli_fetch_assoc($sqlE); 
	
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
		  $sqlm=mysqli_query($con, "Select MorEveRepId from hrm_employee_moreve_report WHERE EmployeeID=".$resE['EmployeeID']." AND MorEveDate='".$attd."'"); $rowsm = mysqli_num_rows($sqlm);  
	      if($rowsm>0)
	      { $resm=mysqli_fetch_assoc($sqlm); 
		    if($resm['Att']!='CL' AND $resm['Att']!='CH' AND $resm['Att']!='SL' AND $resm['Att']!='SH' AND $resm['Att']!='PL' AND $resm['Att']!='PH' AND $resm['Att']!='EL' AND $resm['Att']!='FL' AND $resm['Att']!='TL')
			{ 
			    
			    if($resm['MorReports']!=''){ $MERep='EveReports'; $MEDate='EveDateTime'; }
			  else{ $MERep='MorReports'; $MEDate='MorDateTime'; }
			  $sqlUp = mysqli_query($con, "UPDATE hrm_employee_moreve_report SET ".$MEDate."='".$attdEv."', ".$MERep."='".$attd_rmk."', Att='".$attv."', UpAtt='Y' WHERE EmployeeID=".$resE['EmployeeID']." AND MorEveRepId=".$resm['MorEveRepId']."");
			    
			    //$sqlUp = mysqli_query($con, "UPDATE hrm_employee_moreve_report SET MorDateTime='".$attd."', MorReports='".$attd_rmk."', Att='".$attv."', UpAtt='Y' WHERE EmployeeID=".$resE['EmployeeID']." AND MorEveDate='".$attd."'"); 
			    
			}
	      } 
	      elseif($rowsm==0 AND date("w",strtotime($attd))!=0)
	      { 
	       $sqlUp = mysqli_query($con, "insert into hrm_employee_moreve_report(EmployeeID, MorEveDate, MorDateTime, MorReports, Att, UpAtt) values(".$resE['EmployeeID'].", '".$attd."', '".$attd."', '".$attd_rmk."', '".$attv."', 'Y')"); 
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
	 
   
  }else{

    echo json_encode( array("Error" => "True", "ErrorDesc" => "value missing!") );

  }
  
 
 
 /******************************* Joining Employee Close *************************************/
 /******************************* Joining Employee Close *************************************/

?>
