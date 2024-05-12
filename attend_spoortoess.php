<?php 
require_once('AdminUser/config/config.php');

 
 /******************************* Joining Employee Open *************************************/
 /******************************* Joining Employee Open *************************************/
  
  //$jsonCont = file_get_contents('studJson.json');
  //$jsonData = json_decode(file_get_contents('php://input'), true);
  
  
  $jsonData = file_get_contents('php://input');
  $json = json_decode($jsonData);  //, true
  
  //echo 'aa='.$_REQUEST['EmployeeID'].'-'.$_REQUEST['companyId'].'-'.$_REQUEST['ATTENDANCE'].'-'.$_REQUEST['DATE'];
  //echo $json; die();
  
  if($json!=null)
  //if($_REQUEST['EmployeeID']!='' && $_REQUEST['companyId']!='' && $_REQUEST['ATTENDANCE']!='' && $_REQUEST['DATE']!='')
  {
    
    /*
    $ec_s = $_REQUEST['EmployeeID'];
    $com_s = $_REQUEST['companyId']; 
	$attv_s = $_REQUEST['ATTENDANCE']; 
	$attd_s = $_REQUEST['DATE'];
    */
    
    
    //$ec_s = $json->NAME;
    $ec_s = $json->EmployeeID;
    $com_s = $json->companyId; 
	$attv_s = $json->ATTENDANCE; 
	$attd_s = $json->DATE;
	
	/*
	$ec_s = $json['NAME'];
    $com_s = $json['companyId']; 
	$attv_s = $json['ATTENDANCE']; 
	$attd_s = $json['DATE'];
	*/
	
	//$ec=$ec_s;
	$ec=str_replace(array( '"', '"' ), '', $ec_s);
	$com=0; if($com_s==845){ $com=1; }
	$attv=''; if($attv_s=='Present'){ $attv='P'; }
	$attd=date("Y-m-d",strtotime($attd_s));
    
	/*****************************************************************************/
	$sY=mysql_query("select YearId from hrm_year where Company".$com."Status='A'", $con);
	
	$rY=mysql_fetch_assoc($sY);
	
	$sqlE=mysql_query("select EmployeeID from hrm_employee where EmpCode=".$ec." AND CompanyId=".$com, $con); 
	$rowE=mysql_num_rows($sqlE); $resE=mysql_fetch_assoc($sqlE); 
	
	if($rowE>0){
	  
	  $sql=mysql_query("select Leave_Type,LeaveStatus from hrm_employee_applyleave WHERE EmployeeID=".$resE['EmployeeID']." AND ('".$attd."'>=Apply_FromDate AND '".$attd."'<=Apply_ToDate) AND LeaveStatus!=3 AND LeaveCancelStatus!='Y'", $con); 
	  $row=mysql_num_rows($sql);
	 
	  if($row==0){

	   if($attv=='P'){
	    
		/*************************/
		$sql2=mysql_query("select * from hrm_employee_attendance WHERE EmployeeID=".$resE['EmployeeID']." AND AttDate='".$attd."'", $con); $row2=mysql_num_rows($sql2);
	     
		if($row2>0){ 

			$res2=mysql_fetch_assoc($sql2); 

			if($res2['AttValue']!='CL' AND $res2['AttValue']!='CH' AND $res2['AttValue']!='SL' AND $res2['AttValue']!='SH' AND $res2['AttValue']!='PL' AND $res2['AttValue']!='PH' AND $res2['AttValue']!='EL' AND $res2['AttValue']!='FL' AND $res2['AttValue']!='TL'){ 

			$sqlUp=mysql_query("update hrm_employee_attendance set AttValue='".$attv."' WHERE EmployeeID=".$resE['EmployeeID']." AND AttDate='".$attd."'", $con); 


			} 


	    }elseif($row2==0 AND date("w",strtotime($attd))!=0){

			$sqlUp = mysql_query("insert into hrm_employee_attendance(EmployeeID, AttValue, AttDate, Year, YearId) values(".$resE['EmployeeID'].",'".$attv."', '".$attd."', '".date("Y")."', ".$rY['YearId'].")", $con); 
	     
	     
	    }else{ 

	    	echo json_encode( array("Error" => "True", "ErrorDesc" => "not inserted!") );

	    }
		
		if($sqlUp){

			echo json_encode( array("Error" => "False", "ErrorDesc" => "") ); 

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
