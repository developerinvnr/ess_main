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

 
if($_REQUEST['value'] == 'Apply_Leave' && $_REQUEST['empid']>0 && $_REQUEST['FromDate']!='' && $_REQUEST['ToDate']!='' && $_REQUEST['LeaveType']!='' && $_REQUEST['ContactNo']!='' && $_REQUEST['DuAdd']!='' && $_REQUEST['Reason']!='' && $_REQUEST['BalCL']!='' && $_REQUEST['BalSL']!='' && $_REQUEST['BalPL']!='' && $_REQUEST['BalEL']!='' && $_REQUEST['BalFL']!='' && $_REQUEST['AavailSL']!='')
{  //&& $_REQUEST['OpHo']!='' 

    $eid=$_REQUEST['empid']; $LevType=$_REQUEST['LeaveType'];
    $FrDate=date("Y-m-d",strtotime($_REQUEST['FromDate'])); $AppFromMonth=date("m",strtotime($_REQUEST['FromDate']));  
    $ToDate=date("Y-m-d",strtotime($_REQUEST['ToDate'])); $AppToMonth=date("m",strtotime($_REQUEST['ToDate']));   
    
    $AppFromDate=date("Y-m-d",strtotime($_REQUEST['FromDate']));
    $AppToDate=date("Y-m-d",strtotime($_REQUEST['ToDate']));
	
/**************************************************************************************************/
/**************************************************************************************************/
    
  //**************************** Back Date *********************************// 
  //**************************** Back Date *********************************// 
  $P1=date("Y-m-d",strtotime('-1 day', strtotime($FrDate))); $P2=date("Y-m-d",strtotime('-2 day', strtotime($FrDate))); 
  $P3=date("Y-m-d",strtotime('-3 day', strtotime($FrDate))); $P4=date("Y-m-d",strtotime('-4 day', strtotime($FrDate))); 
  $P5=date("Y-m-d",strtotime('-5 day', strtotime($FrDate))); 
  $PNum1=date("N",strtotime($P1)); $PNum2=date("N",strtotime($P2)); $PNum3=date("N",strtotime($P3));
	
  $P1HOa=mysqli_query($con, "select AttId from hrm_employee_attendance where AttValue='HO' AND EmployeeID=".$eid." AND AttDate='".$P1."'"); 
  $P2HOa=mysqli_query($con, "select AttId from hrm_employee_attendance where AttValue='HO' AND EmployeeID=".$eid." AND AttDate='".$P2."'"); 
  $P3HOa=mysqli_query($con, "select AttId from hrm_employee_attendance where AttValue='HO' AND EmployeeID=".$eid." AND AttDate='".$P3."'"); 
  $rP1HOa=mysqli_num_rows($P1HOa); $rP2HOa=mysqli_num_rows($P2HOa); $rP3HOa=mysqli_num_rows($P3HOa); 
  
  $P1CLa=mysqli_query($con, "select AttId from hrm_employee_attendance where AttValue='CL' AND EmployeeID=".$eid." AND AttDate='".$P1."'"); 
  $P2CLa=mysqli_query($con, "select AttId from hrm_employee_attendance where AttValue='CL' AND EmployeeID=".$eid." AND AttDate='".$P2."'"); 
  $P3CLa=mysqli_query($con, "select AttId from hrm_employee_attendance where AttValue='CL' AND EmployeeID=".$eid." AND AttDate='".$P3."'"); 
  $P4CLa=mysqli_query($con, "select AttId from hrm_employee_attendance where AttValue='CL' AND EmployeeID=".$eid." AND AttDate='".$P4."'"); 
  $P5CLa=mysqli_query($con, "select AttId from hrm_employee_attendance where AttValue='CL' AND EmployeeID=".$eid." AND AttDate='".$P5."'"); 
  $rP1CLa=mysqli_num_rows($P1CLa); $rP2CLa=mysqli_num_rows($P2CLa); $rP3CLa=mysqli_num_rows($P3CLa); 
  $rP4CLa=mysqli_num_rows($P4CLa); $rP5CLa=mysqli_num_rows($P5CLa);
  
  
  $P1CHa=mysqli_query($con, "select AttId from hrm_employee_attendance where AttValue='CH' AND EmployeeID=".$eid." AND AttDate='".$P1."'"); 
  $P2CHa=mysqli_query($con, "select AttId from hrm_employee_attendance where AttValue='CH' AND EmployeeID=".$eid." AND AttDate='".$P2."'"); 
  $P3CHa=mysqli_query($con, "select AttId from hrm_employee_attendance where AttValue='CH' AND EmployeeID=".$eid." AND AttDate='".$P3."'"); 
  $P4CHa=mysqli_query($con, "select AttId from hrm_employee_attendance where AttValue='CH' AND EmployeeID=".$eid." AND AttDate='".$P4."'"); 
  $P5CHa=mysqli_query($con, "select AttId from hrm_employee_attendance where AttValue='CH' AND EmployeeID=".$eid." AND AttDate='".$P5."'"); 
  $rP1CHa=mysqli_num_rows($P1CHa); $rP2CHa=mysqli_num_rows($P2CHa); $rP3CHa=mysqli_num_rows($P3CHa); 
  $rP4CHa=mysqli_num_rows($P4CHa); $rP5CHa=mysqli_num_rows($P5CHa);
   
  $P1CLp=mysqli_query($con, "select ApplyLeaveId from hrm_employee_applyleave where Leave_Type='CL' AND LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$eid." AND Apply_ToDate='".$P1."'"); 
  $P2CLp=mysqli_query($con, "select ApplyLeaveId from hrm_employee_applyleave where Leave_Type='CL' AND LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$eid." AND Apply_ToDate='".$P2."'"); 
  $P3CLp=mysqli_query($con, "select ApplyLeaveId from hrm_employee_applyleave where Leave_Type='CL' AND LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$eid." AND Apply_ToDate='".$P3."'"); 
  $P4CLp=mysqli_query($con, "select ApplyLeaveId from hrm_employee_applyleave where Leave_Type='CL' AND LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$eid." AND Apply_ToDate='".$P4."'"); 
  $P5CLp=mysqli_query($con, "select ApplyLeaveId from hrm_employee_applyleave where Leave_Type='CL' AND LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$eid." AND Apply_ToDate='".$P5."'"); 
  $rP1CLp=mysqli_num_rows($P1CLp); $rP2CLp=mysqli_num_rows($P2CLp); $rP3CLp=mysqli_num_rows($P3CLp);  
  $rP4CLp=mysqli_num_rows($P4CLp); $rP5CLp=mysqli_num_rows($P5CLp);
  
  $P1CHp=mysqli_query($con, "select ApplyLeaveId from hrm_employee_applyleave where Leave_Type='CH' AND LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$eid." AND Apply_ToDate='".$P1."'"); 
  $P2CHp=mysqli_query($con, "select ApplyLeaveId from hrm_employee_applyleave where Leave_Type='CH' AND LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$eid." AND Apply_ToDate='".$P2."'"); 
  $P3CHp=mysqli_query($con, "select ApplyLeaveId from hrm_employee_applyleave where Leave_Type='CH' AND LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$eid." AND Apply_ToDate='".$P3."'"); 
  $P4CHp=mysqli_query($con, "select ApplyLeaveId from hrm_employee_applyleave where Leave_Type='CH' AND LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$eid." AND Apply_ToDate='".$P4."'"); 
  $P5CHp=mysqli_query($con, "select ApplyLeaveId from hrm_employee_applyleave where Leave_Type='CH' AND LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$eid." AND Apply_ToDate='".$P5."'"); 
  $rP1CHp=mysqli_num_rows($P1CHp); $rP2CHp=mysqli_num_rows($P2CHp); $rP3CHp=mysqli_num_rows($P3CHp); 
  $rP4CHp=mysqli_num_rows($P4CHp); $rP5CHp=mysqli_num_rows($P5CHp);
  
   $P1CLp1=mysqli_query($con, "select ApplyLeaveId from hrm_employee_applyleave where Leave_Type='CL' AND Apply_TotalDay=2 AND LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$eid." AND Apply_ToDate='".$P1."'"); 
   $P1CLp2=mysqli_query($con, "select ApplyLeaveId from hrm_employee_applyleave where Leave_Type='CL' AND Apply_TotalDay=2 AND LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$eid." AND Apply_ToDate='".$P2."'"); 
   $P1CLp3=mysqli_query($con, "select ApplyLeaveId from hrm_employee_applyleave where Leave_Type='CL' AND Apply_TotalDay=2 AND LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$eid." AND Apply_ToDate='".$P3."'"); 
  $rP1CLp1=mysqli_num_rows($P1CLp1); $rP1CLp2=mysqli_num_rows($P1CLp2); $rP1CLp3=mysqli_num_rows($P1CLp3);
  
   //AttValue='SL' OR AttValue='SH' OR AttValue='ASH' OR 
  $P1OTa=mysqli_query($con, "select AttId from hrm_employee_attendance where (AttValue='PL' OR AttValue='APH' OR AttValue='EL' OR AttValue='FL' OR AttValue='TL') AND EmployeeID=".$eid." AND AttDate='".$P1."'"); 
  $P2OTa=mysqli_query($con, "select AttId from hrm_employee_attendance where (AttValue='PL' OR AttValue='APH' OR AttValue='EL' OR AttValue='FL' OR AttValue='TL') AND EmployeeID=".$eid." AND AttDate='".$P2."'"); 
  $P3OTa=mysqli_query($con, "select AttId from hrm_employee_attendance where (AttValue='PL' OR AttValue='APH' OR AttValue='EL' OR AttValue='FL' OR AttValue='TL') AND EmployeeID=".$eid." AND AttDate='".$P3."'"); 
  $P4OTa=mysqli_query($con, "select AttId from hrm_employee_attendance where (AttValue='PL' OR AttValue='APH' OR AttValue='EL' OR AttValue='FL' OR AttValue='TL') AND EmployeeID=".$eid." AND AttDate='".$P4."'"); 
  $rP1OTa=mysqli_num_rows($P1OTa); $rP2OTa=mysqli_num_rows($P2OTa); $rP3OTa=mysqli_num_rows($P3OTa); 
  $rP4OTa=mysqli_num_rows($P4OTa);
  
  $P1OTp=mysqli_query($con, "select ApplyLeaveId from hrm_employee_applyleave where (Leave_Type!='CL' AND Leave_Type!='CH' AND Leave_Type!='SL' AND Leave_Type!='SH') AND LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$eid." AND Apply_ToDate='".$P1."'"); 
  $P2OTp=mysqli_query($con, "select ApplyLeaveId from hrm_employee_applyleave where (Leave_Type!='CL' AND Leave_Type!='CH' AND Leave_Type!='SL' AND Leave_Type!='SH') AND LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$eid." AND Apply_ToDate='".$P2."'"); 
  $P3OTp=mysqli_query($con, "select ApplyLeaveId from hrm_employee_applyleave where (Leave_Type!='CL' AND Leave_Type!='CH' AND Leave_Type!='SL' AND Leave_Type!='SH') AND LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$eid." AND Apply_ToDate='".$P3."'"); 
  $P4OTp=mysqli_query($con, "select ApplyLeaveId from hrm_employee_applyleave where (Leave_Type!='CL' AND Leave_Type!='CH' AND Leave_Type!='SL' AND Leave_Type!='SH') AND LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$eid." AND Apply_ToDate='".$P4."'"); 
  $rP1OTp=mysqli_num_rows($P1OTp); $rP2OTp=mysqli_num_rows($P2OTp); $rP3OTp=mysqli_num_rows($P3OTp);  $rP4OTp=mysqli_num_rows($P4OTp);

  //**************************** Next Date *********************************// 
  //**************************** Next Date *********************************//
  $N1=date("Y-m-d",strtotime('+1 day', strtotime($ToDate))); $N2=date("Y-m-d",strtotime('+2 day', strtotime($ToDate))); 
  $N3=date("Y-m-d",strtotime('+3 day', strtotime($ToDate))); $N4=date("Y-m-d",strtotime('+4 day', strtotime($ToDate))); 
  $N5=date("Y-m-d",strtotime('+5 day', strtotime($ToDate))); 
  $NNum1=date("N",strtotime($N1)); $NNum2=date("N",strtotime($N2)); $NNum3=date("N",strtotime($N3)); 
   
  $N1HOa=mysqli_query($con, "select AttId from hrm_employee_attendance where AttValue='HO' AND EmployeeID=".$eid." AND AttDate='".$N1."'"); 
  $N2HOa=mysqli_query($con, "select AttId from hrm_employee_attendance where AttValue='HO' AND EmployeeID=".$eid." AND AttDate='".$N2."'"); 
  $N3HOa=mysqli_query($con, "select AttId from hrm_employee_attendance where AttValue='HO' AND EmployeeID=".$eid." AND AttDate='".$N3."'");  
  $rN1HOa=mysqli_num_rows($N1HOa); $rN2HOa=mysqli_num_rows($N2HOa); $rN3HOa=mysqli_num_rows($N3HOa);
  
  $N1CLa=mysqli_query($con, "select AttId from hrm_employee_attendance where AttValue='CL' AND EmployeeID=".$eid." AND AttDate='".$N1."'"); 
  $N2CLa=mysqli_query($con, "select AttId from hrm_employee_attendance where AttValue='CL' AND EmployeeID=".$eid." AND AttDate='".$N2."'"); 
  $N3CLa=mysqli_query($con, "select AttId from hrm_employee_attendance where AttValue='CL' AND EmployeeID=".$eid." AND AttDate='".$N3."'"); 
  $N4CLa=mysqli_query($con, "select AttId from hrm_employee_attendance where AttValue='CL' AND EmployeeID=".$eid." AND AttDate='".$N4."'"); 
  $N5CLa=mysqli_query($con, "select AttId from hrm_employee_attendance where AttValue='CL' AND EmployeeID=".$eid." AND AttDate='".$N5."'"); 
  $rN1CLa=mysqli_num_rows($N1CLa); $rN2CLa=mysqli_num_rows($N2CLa); $rN3CLa=mysqli_num_rows($N3CLa); 
  $rN4CLa=mysqli_num_rows($N4CLa); $rN5CLa=mysqli_num_rows($N5CLa);
  
  $N1CHa=mysqli_query($con, "select AttId from hrm_employee_attendance where (AttValue='CH' OR AttValue='ACH') AND EmployeeID=".$eid." AND AttDate='".$N1."'"); 
  $N2CHa=mysqli_query($con, "select AttId from hrm_employee_attendance where (AttValue='CH' OR AttValue='ACH') AND EmployeeID=".$eid." AND AttDate='".$N2."'"); 
  $N3CHa=mysqli_query($con, "select AttId from hrm_employee_attendance where (AttValue='CH' OR AttValue='ACH') AND EmployeeID=".$eid." AND AttDate='".$N3."'"); 
  $N4CHa=mysqli_query($con, "select AttId from hrm_employee_attendance where (AttValue='CH' OR AttValue='ACH') AND EmployeeID=".$eid." AND AttDate='".$N4."'"); 
  $N5CHa=mysqli_query($con, "select AttId from hrm_employee_attendance where (AttValue='CH' OR AttValue='ACH') AND EmployeeID=".$eid." AND AttDate='".$N5."'"); 
  $rN1CHa=mysqli_num_rows($N1CHa); $rN2CHa=mysqli_num_rows($N2CHa); $rN3CHa=mysqli_num_rows($N3CHa); 
  $rN4CHa=mysqli_num_rows($N4CHa); $rN5CHa=mysqli_num_rows($N5CHa);
  
  $N1CLp=mysqli_query($con, "select ApplyLeaveId from hrm_employee_applyleave where Leave_Type='CL' AND LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$eid." AND Apply_FromDate='".$N1."'"); 
  $N2CLp=mysqli_query($con, "select ApplyLeaveId from hrm_employee_applyleave where Leave_Type='CL' AND LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$eid." AND Apply_FromDate='".$N2."'"); 
  $N3CLp=mysqli_query($con, "select ApplyLeaveId from hrm_employee_applyleave where Leave_Type='CL' AND LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$eid." AND Apply_FromDate='".$N3."'"); 
  $N4CLp=mysqli_query($con, "select ApplyLeaveId from hrm_employee_applyleave where Leave_Type='CL' AND LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$eid." AND Apply_FromDate='".$N4."'"); 
  $N5CLp=mysqli_query($con, "select ApplyLeaveId from hrm_employee_applyleave where Leave_Type='CL' AND LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$eid." AND Apply_FromDate='".$N5."'"); 
  $rN1CLp=mysqli_num_rows($N1CLp); $rN2CLp=mysqli_num_rows($N2CLp); $rN3CLp=mysqli_num_rows($N3CLp);  
  $rN4CLp=mysqli_num_rows($N4CLp); $rN5CLp=mysqli_num_rows($N5CLp);
  
  $N1CHp=mysqli_query($con, "select ApplyLeaveId from hrm_employee_applyleave where Leave_Type='CH' AND LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$eid." AND Apply_FromDate='".$N1."'"); 
  $N2CHp=mysqli_query($con, "select ApplyLeaveId from hrm_employee_applyleave where Leave_Type='CH' AND LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$eid." AND Apply_FromDate='".$N2."'"); 
  $N3CHp=mysqli_query($con, "select ApplyLeaveId from hrm_employee_applyleave where Leave_Type='CH' AND LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$eid." AND Apply_FromDate='".$N3."'"); 
  $N4CHp=mysqli_query($con, "select ApplyLeaveId from hrm_employee_applyleave where Leave_Type='CH' AND LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$eid." AND Apply_FromDate='".$N4."'"); 
  $N5CHp=mysqli_query($con, "select ApplyLeaveId from hrm_employee_applyleave where Leave_Type='CH' AND LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$eid." AND Apply_FromDate='".$N5."'"); 
  $rN1CHp=mysqli_num_rows($N1CHp); $rN2CHp=mysqli_num_rows($N2CHp); $rN3CHp=mysqli_num_rows($N3CHp); 
  $rN4CHp=mysqli_num_rows($N4CHp); $rN5CHp=mysqli_num_rows($N5CHp);
  
  $N1CLp1=mysqli_query($con, "select ApplyLeaveId from hrm_employee_applyleave where Leave_Type='CL' AND Apply_TotalDay=2 AND LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$eid." AND Apply_FromDate='".$N1."'"); 
  $N1CLp2=mysqli_query($con, "select ApplyLeaveId from hrm_employee_applyleave where Leave_Type='CL' AND Apply_TotalDay=2 AND LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$eid." AND Apply_FromDate='".$N2."'"); 
  $N1CLp3=mysqli_query($con, "select ApplyLeaveId from hrm_employee_applyleave where Leave_Type='CL' AND Apply_TotalDay=2 AND LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$eid." AND Apply_FromDate='".$N3."'"); 
  $rN1CLp1=mysqli_num_rows($N1CLp1); $rN1CLp2=mysqli_num_rows($N1CLp2); $rN1CLp3=mysqli_num_rows($N1CLp3);
  
  //AttValue='SL' OR AttValue='SH' OR AttValue='ASH' OR 
  $N1OTa=mysqli_query($con, "select AttId from hrm_employee_attendance where (AttValue='PL' OR AttValue='APH' OR AttValue='EL' OR AttValue='FL' OR AttValue='TL') AND EmployeeID=".$eid." AND AttDate='".$N1."'"); 
  $N2OTa=mysqli_query($con, "select AttId from hrm_employee_attendance where (AttValue='PL' OR AttValue='APH' OR AttValue='EL' OR AttValue='FL' OR AttValue='TL') AND EmployeeID=".$eid." AND AttDate='".$N2."'"); 
  $N3OTa=mysqli_query($con, "select AttId from hrm_employee_attendance where (AttValue='PL' OR AttValue='APH' OR AttValue='EL' OR AttValue='FL' OR AttValue='TL') AND EmployeeID=".$eid." AND AttDate='".$N3."'"); 
  $N4OTa=mysqli_query($con, "select AttId from hrm_employee_attendance where (AttValue='PL' OR AttValue='APH' OR AttValue='EL' OR AttValue='FL' OR AttValue='TL') AND EmployeeID=".$eid." AND AttDate='".$N4."'"); 
  $rN1OTa=mysqli_num_rows($N1OTa); $rN2OTa=mysqli_num_rows($N2OTa); $rN3OTa=mysqli_num_rows($N3OTa); 
  $rN4OTa=mysqli_num_rows($N4OTa);
  
  $N1OTp=mysqli_query($con, "select ApplyLeaveId from hrm_employee_applyleave where (Leave_Type!='CL' AND Leave_Type!='CH' AND Leave_Type!='SL' AND Leave_Type!='SH') AND LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$eid." AND Apply_FromDate='".$N1."'"); 
  $N2OTp=mysqli_query($con, "select ApplyLeaveId from hrm_employee_applyleave where (Leave_Type!='CL' AND Leave_Type!='CH' AND Leave_Type!='SL' AND Leave_Type!='SH') AND LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$eid." AND Apply_FromDate='".$N2."'"); 
  $N3OTp=mysqli_query($con, "select ApplyLeaveId from hrm_employee_applyleave where (Leave_Type!='CL' AND Leave_Type!='CH' AND Leave_Type!='SL' AND Leave_Type!='SH') AND LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$eid." AND Apply_FromDate='".$N3."'"); 
  $N4OTp=mysqli_query($con, "select ApplyLeaveId from hrm_employee_applyleave where (Leave_Type!='CL' AND Leave_Type!='CH' AND Leave_Type!='SL' AND Leave_Type!='SH') AND LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$eid." AND Apply_FromDate='".$N4."'"); 
  $rN1OTp=mysqli_num_rows($N1OTp); $rN2OTp=mysqli_num_rows($N2OTp); $rN3OTp=mysqli_num_rows($N3OTp);  
  $rN4OTp=mysqli_num_rows($N4OTp);   

  $sqlH=mysqli_query($con, "select * from hrm_employee_attendance where EmployeeID=".$eid." AND AttValue='HO' AND AttDate>='".$FrDate."' AND AttDate<='".$ToDate."'"); 
  
  $sqlFD=mysqli_query($con, "select * from hrm_employee_applyleave where EmployeeID=".$eid." AND '".$FrDate."'>=Apply_FromDate AND '".$FrDate."'<=Apply_ToDate AND LeaveStatus!=3 AND LeaveStatus!=4"); 
  $sqlTD=mysqli_query($con, "select * from hrm_employee_applyleave where EmployeeID=".$eid." AND '".$ToDate."'>=Apply_FromDate AND '".$ToDate."'<=Apply_ToDate AND LeaveStatus!=3 AND LeaveStatus!=4"); 
  $rowH=mysqli_num_rows($sqlH); $rowFD=mysqli_num_rows($sqlFD); $rowTD=mysqli_num_rows($sqlTD);

  /* EL Combination Query Open*/
  $sqlp_a=mysqli_query($con, "select AttId from hrm_employee_attendance where (AttValue='SL' OR AttValue='SH' OR AttValue='ASH' OR AttValue='PL' OR AttValue='APH' OR AttValue='FL' OR AttValue='TL') AND EmployeeID=".$eid." AND AttDate='".$P1."'"); 
  $sqlp_a2=mysqli_query($con, "select AttId from hrm_employee_attendance where (AttValue='SL' OR AttValue='SH' OR AttValue='ASH' OR AttValue='PL' OR AttValue='APH' OR AttValue='FL' OR AttValue='TL') AND EmployeeID=".$eid." AND AttDate='".$P2."'"); 
  $rowp_a=mysqli_num_rows($sqlp_a);  $rowp_a2=mysqli_num_rows($sqlp_a2);
 
  $sqlp_l=mysqli_query($con, "select ApplyLeaveId from hrm_employee_applyleave where (Leave_Type='SL' OR Leave_Type='SH' OR Leave_Type='PL' OR Leave_Type='FL' OR Leave_Type='TL') AND LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$eid." AND Apply_ToDate='".$P1."'"); $rowp_l=mysqli_num_rows($sqlp_l);
 
  $sqln_a=mysqli_query($con, "select AttId from hrm_employee_attendance where (AttValue='SL' OR AttValue='SH' OR AttValue='ASH' OR AttValue='PL' OR AttValue='APH' OR AttValue='FL' OR AttValue='TL') AND EmployeeID=".$eid." AND AttDate='".$N1."'");  
  $sqln_a2=mysqli_query($con, "select AttId from hrm_employee_attendance where (AttValue='SL' OR AttValue='SH' OR AttValue='ASH' OR AttValue='PL' OR AttValue='APH' OR AttValue='FL' OR AttValue='TL') AND EmployeeID=".$eid." AND AttDate='".$N2."'");  
  $sqln_l=mysqli_query($con, "select ApplyLeaveId from hrm_employee_applyleave where (Leave_Type='SL' OR Leave_Type='SH' OR Leave_Type='PL' OR Leave_Type='FL' OR Leave_Type='TL') AND LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$eid." AND Apply_FromDate='".$N1."'"); 
  $rown_a=mysqli_num_rows($sqln_a); $rown_a2=mysqli_num_rows($sqln_a2); $rown_l=mysqli_num_rows($sqln_l); 
  
  $sqlp_ea=mysqli_query($con, "select AttId from hrm_employee_attendance where AttValue='EL' AND EmployeeID=".$eid." AND AttDate='".$P2."'"); 
  $sqlp_el=mysqli_query($con, "select ApplyLeaveId from hrm_employee_applyleave where Leave_Type='EL' AND LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$eid." AND Apply_ToDate='".$P2."'"); 
  $sqlp_ea2=mysqli_query($con, "select AttId from hrm_employee_attendance where AttValue='EL' AND EmployeeID=".$eid." AND AttDate='".$P3."'"); 
  $sqlp_el2=mysqli_query($con, "select ApplyLeaveId from hrm_employee_applyleave where Leave_Type='EL' AND LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$eid." AND Apply_ToDate='".$P2."'"); 
  $sqln_ea=mysqli_query($con, "select AttId from hrm_employee_attendance where AttValue='EL' AND EmployeeID=".$eid." AND AttDate='".$N2."'"); 
  $sqln_el=mysqli_query($con, "select ApplyLeaveId from hrm_employee_applyleave where Leave_Type='EL' AND LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$eid." AND Apply_FromDate='".$N2."'"); 
  $sqln_ea2=mysqli_query($con, "select AttId from hrm_employee_attendance where AttValue='EL' AND EmployeeID=".$eid." AND AttDate='".$N3."'"); 
  $sqln_el2=mysqli_query($con, "select ApplyLeaveId from hrm_employee_applyleave where Leave_Type='EL' AND LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$eid." AND Apply_FromDate='".$N3."'");
  $rowp_ea=mysqli_num_rows($sqlp_ea); $rowp_el=mysqli_num_rows($sqlp_el); $rowp_ea2=mysqli_num_rows($sqlp_ea2); 
  $rowp_el2=mysqli_num_rows($sqlp_el2); $rown_ea=mysqli_num_rows($sqln_ea); $rown_el=mysqli_num_rows($sqln_el);
  $rown_ea2=mysqli_num_rows($sqln_ea2); $rown_el2=mysqli_num_rows($sqln_el2);
  /* EL Combination Query Close*/

  /* FL with PL Combination Check*/
  $P1PLa=mysqli_query($con, "select AttId from hrm_employee_attendance where (AttValue='PL' OR AttValue='FL') AND EmployeeID=".$eid." AND AttDate='".$P1."'"); 
  $P2PLa=mysqli_query($con, "select AttId from hrm_employee_attendance where (AttValue='PL' OR AttValue='FL') AND EmployeeID=".$eid." AND AttDate='".$P2."'"); 
  $P3PLa=mysqli_query($con, "select AttId from hrm_employee_attendance where (AttValue='PL' OR AttValue='FL') AND EmployeeID=".$eid." AND AttDate='".$P3."'"); 
  $P4PLa=mysqli_query($con, "select AttId from hrm_employee_attendance where (AttValue='PL' OR AttValue='FL') AND EmployeeID=".$eid." AND AttDate='".$P4."'"); 
  $rP1PLa=mysqli_num_rows($P1PLa); $rP2PLa=mysqli_num_rows($P2PLa); $rP3PLa=mysqli_num_rows($P3PLa); 
  $rP4PLa=mysqli_num_rows($P4PLa);

  $P1PLp=mysqli_query($con, "select ApplyLeaveId from hrm_employee_applyleave where (Leave_Type='PL' OR Leave_Type='FL') AND LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$eid." AND '".$P1."'>=Apply_FromDate AND '".$P1."'<=Apply_ToDate"); 
  $P2PLp=mysqli_query($con, "select ApplyLeaveId from hrm_employee_applyleave where (Leave_Type='PL' OR Leave_Type='FL') AND LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$eid." AND '".$P2."'>=Apply_FromDate AND '".$P2."'<=Apply_ToDate"); 
  $P3PLp=mysqli_query($con, "select ApplyLeaveId from hrm_employee_applyleave where (Leave_Type='PL' OR Leave_Type='FL') AND LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$eid." AND '".$P3."'>=Apply_FromDate AND '".$P3."'<=Apply_ToDate"); 
  $P4PLp=mysqli_query($con, "select ApplyLeaveId from hrm_employee_applyleave where (Leave_Type='PL' OR Leave_Type='FL') AND LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$eid." AND '".$P4."'>=Apply_FromDate AND '".$P4."'<=Apply_ToDate");    
  $rP1PLp=mysqli_num_rows($P1PLp); $rP2PLp=mysqli_num_rows($P2PLp); $rP3PLp=mysqli_num_rows($P3PLp); 
  $rP4PLp=mysqli_num_rows($P4PLp);

  $N1PLa=mysqli_query($con, "select AttId from hrm_employee_attendance where (AttValue='PL' OR AttValue='FL') AND EmployeeID=".$eid." AND AttDate='".$N1."'"); 
  $N2PLa=mysqli_query($con, "select AttId from hrm_employee_attendance where (AttValue='PL' OR AttValue='FL') AND EmployeeID=".$eid." AND AttDate='".$N2."'"); 
  $N3PLa=mysqli_query($con, "select AttId from hrm_employee_attendance where (AttValue='PL' OR AttValue='FL') AND EmployeeID=".$eid." AND AttDate='".$N3."'"); 
  $N4PLa=mysqli_query($con, "select AttId from hrm_employee_attendance where (AttValue='PL' OR AttValue='FL') AND EmployeeID=".$eid." AND AttDate='".$N4."'"); 
  $rN1PLa=mysqli_num_rows($N1PLa); $rN2PLa=mysqli_num_rows($N2PLa); $rN3PLa=mysqli_num_rows($N3PLa); 
  $rN4PLa=mysqli_num_rows($N4PLa);

  $N1PLp=mysqli_query($con, "select ApplyLeaveId from hrm_employee_applyleave where (Leave_Type='PL' OR Leave_Type='FL') AND LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$eid." AND '".$N1."'>=Apply_FromDate AND '".$N1."'<=Apply_ToDate"); 
  $N2PLp=mysqli_query($con, "select ApplyLeaveId from hrm_employee_applyleave where (Leave_Type='PL' OR Leave_Type='FL') AND LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$eid." AND '".$N2."'>=Apply_FromDate AND '".$N2."'<=Apply_ToDate"); 
  $N3PLp=mysqli_query($con, "select ApplyLeaveId from hrm_employee_applyleave where (Leave_Type='PL' OR Leave_Type='FL') AND LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$eid." AND '".$N3."'>=Apply_FromDate AND '".$N3."'<=Apply_ToDate"); 
  $N4PLp=mysqli_query($con, "select ApplyLeaveId from hrm_employee_applyleave where (Leave_Type='PL' OR Leave_Type='FL') AND LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$eid." AND '".$N4."'>=Apply_FromDate AND '".$N4."'<=Apply_ToDate");  
  $rN1PLp=mysqli_num_rows($N1PLp); $rN2PLp=mysqli_num_rows($N2PLp); $rN3PLp=mysqli_num_rows($N3PLp); 
  $rN4PLp=mysqli_num_rows($N4PLp);
  /* FL with PL Combination Check Close */  
   
  $Ctime = date("H:i:s");
  $FFDate=date("Y-m-d H:i:s".$Ctime,strtotime($_REQUEST['FromDate'])); 
  $TodayDate=date("Y-m-d 09:30:00");
  
  //echo "vv";
  
  if($FrDate<date("Y-m-d") && $LevType!='SL'){ echo json_encode( array("Code" => "100", "Msg" => "You can apply only current or future date.!") ); }
  elseif($FrDate<date("Y-m-d") && ($LevType=='SL' OR $LevType=='SH')){ echo json_encode( array("Code" => "100", "Msg" => "You can apply only curren.!") ); }
  elseif($FrDate<date("Y-m-d") && $LevType!='SL' && $LevType!='SH'){ echo json_encode( array("Code" => "100", "Msg" => "Leave can be apply only current or future days.!") ); }
  elseif($FrDate==date("Y-m-d") && $FFDate>$TodayDate && $LevType!='SH' && $LevType!='CH' && $LevType!='HF'){ echo json_encode( array("Code" => "100", "Msg" => "You can apply only before 9:30 AM") ); }   
  elseif($FrDate<date("Y-m-d") AND $AppFromMonth!=date("m")){ echo json_encode( array("Code" => "100", "Msg" => "Please check your apply date.!") ); }
  elseif($FrDate==$ToDate AND $rowH>0){ echo json_encode( array("Code" => "100", "Msg" => "Please check your apply date.!") ); }  
  elseif($rowFD>0 OR $rowTD>0){ echo json_encode( array("Code" => "100", "Msg" => "Leave already applied for given date.!") ); $Code='300'; }
  elseif($LevType=='SL' AND $FrDate>date("Y-m-d")){ echo json_encode( array("Code" => "100", "Msg" => "SL can be apply only previous & current days.!") ); }
    
  /************************************ Sunday Combined With Previous Day **********************************/
  elseif(($LevType=='CL' OR $LevType=='CH') AND $rP1CLa>0 AND ($PNum2==7 OR $rP2HOa>0) AND $rP3CLa>0){ echo json_encode( array("Code" => "100", "Msg" => "CL can be taken maximum for 2 days.") ); }
  elseif(($LevType=='CL' OR $LevType=='CH') AND $rP1CLp>0 AND ($PNum2==7 OR $rP2HOa>0) AND $rP3CLp>0){ echo json_encode( array("Code" => "100", "Msg" => "CL can be taken maximum for 2 days.") ); }
  elseif(($LevType=='CL' OR $LevType=='CH') AND $rP1CLp1>0){ echo json_encode( array("Code" => "100", "Msg" => "CL can be taken maximum for 2 days.") ); }
  elseif(($LevType=='CL' OR $LevType=='CH') AND $rP1CLa>0 AND ($PNum2==7 OR $rP2HOa>0) AND $rP3CHa>0 AND $rP4CHa>0){ echo json_encode( array("Code" => "100", "Msg" => "CL can be taken maximum for 2 days.") ); }
  elseif(($LevType=='CL' OR $LevType=='CH') AND $rP1CLp>0 AND ($PNum2==7 OR $rP2HOa>0) AND $rP3CHp>0 AND $rP4CHp>0){ echo json_encode( array("Code" => "100", "Msg" => "CL can be taken maximum for 2 days.") ); }
  elseif(($LevType=='CL' OR $LevType=='CH') AND $rP1CHa>0 AND $rP2CHa>0 AND ($PNum3==7 OR $rP3HOa>0) AND $rP4CHa>0 AND $rP5CHa>0){ echo json_encode( array("Code" => "100", "Msg" => "CL can be taken maximum for 2 days.") ); }
  elseif(($LevType=='CL' OR $LevType=='CH') AND $rP1CHp>0 AND $rP2CHp>0 AND ($PNum3==7 OR $rP3HOa>0) AND $rP4CHp>0 AND $rP5CHp>0){ echo json_encode( array("Code" => "100", "Msg" => "CL can be taken maximum for 2 days.") ); }
  elseif(($LevType=='CL' OR $LevType=='CH') AND $rP1CHa>0 AND $rP2CLa>0 AND ($PNum3==7 OR $rP3HOa>0) AND $rP4CHa>0){ echo json_encode( array("Code" => "100", "Msg" => "CL can be taken maximum for 2 days.") ); }
  elseif(($LevType=='CL' OR $LevType=='CH') AND $rP1CHp>0 AND $rP2CLp>0 AND ($PNum3==7 OR $rP3HOa>0) AND $rP4CHp>0){ echo json_encode( array("Code" => "100", "Msg" => "CL can be taken maximum for 2 days.") ); }
  elseif(($LevType=='CL' OR $LevType=='CH') AND $rP1CHa>0 AND ($PNum2==7 OR $rP2HOa>0) AND $rP3CLa>0 AND $rP4CHa>0){ echo json_encode( array("Code" => "100", "Msg" => "CL can be taken maximum for 2 days.") ); }
  elseif(($LevType=='CL' OR $LevType=='CH') AND $rP1CHp>0 AND ($PNum2==7 OR $rP2HOa>0) AND $rP3CLp>0 AND $rP4CHp>0){ echo json_encode( array("Code" => "100", "Msg" => "CL can be taken maximum for 2 days.") ); }
  elseif(($LevType=='CL') AND $rP1CHa>0 AND ($PNum2==7 OR $rP2HOa>0) AND $rP3CHa>0 AND $rP4CHa>0){ echo json_encode( array("Code" => "100", "Msg" => "CL can be taken maximum for 2 days.") ); }
  elseif(($LevType=='CL') AND $rP1CHp>0 AND ($PNum2==7 OR $rP2HOa>0) AND $rP3CHp>0 AND $rP4CHp>0){ echo json_encode( array("Code" => "100", "Msg" => "CL can be taken maximum for 2 days.") ); }
  elseif($LevType=='CL' AND ($PNum1==7 OR $rP1HOa>0) AND $rP2CLa>0 AND $rP3CHa>0){ echo json_encode( array("Code" => "100", "Msg" => "CL can be taken maximum for 2 days.") ); }
  elseif($LevType=='CL' AND ($PNum1==7 OR $rP1HOa>0) AND $rP2CLp>0 AND $rP3CHp>0){ echo json_encode( array("Code" => "100", "Msg" => "CL can be taken maximum for 2 days.") ); }
  elseif($LevType=='CL' AND ($PNum1==7 OR $rP1HOa>0) AND $rP2CHa>0 AND $rP3CLa>0){ echo json_encode( array("Code" => "100", "Msg" => "CL can be taken maximum for 2 days.") ); }
  elseif($LevType=='CL' AND ($PNum1==7 OR $rP1HOa>0) AND $rP2CHp>0 AND $rP3CLp>0){ echo json_encode( array("Code" => "100", "Msg" => "CL can be taken maximum for 2 days.") ); }
  elseif(($LevType=='CL' OR $LevType=='CH') AND $rP1CLa>0 AND $rP2CLa>0){ echo json_encode( array("Code" => "100", "Msg" => "CL can be taken maximum for 2 days.") ); }
  elseif(($LevType=='CL' OR $LevType=='CH') AND $rP1CLp>0 AND $rP2CLp>0){ echo json_encode( array("Code" => "100", "Msg" => "CL can be taken maximum for 2 days.") ); }
  elseif(($LevType=='CL' OR $LevType=='CH') AND ($PNum1==7 OR $rP1HOa>0) AND $rP2CLa>0 AND $rP3CLa>0){ echo json_encode( array("Code" => "100", "Msg" => "CL can be taken maximum for 2 days.") ); }
  elseif(($LevType=='CL' OR $LevType=='CH') AND ($PNum1==7 OR $rP1HOa>0) AND $rP2CLp>0 AND $rP3CLp>0){ echo json_encode( array("Code" => "100", "Msg" => "CL can be taken maximum for 2 days.") ); }
  elseif(($LevType=='CL' OR $LevType=='CH') AND ($PNum1==7 OR $rP1HOa>0) AND ($PNum2==7 OR $rP2HOa>0) AND $rP3CLa>0 AND $rP4CLa>0){ echo json_encode( array("Code" => "100", "Msg" => "CL can be taken maximum for 2 days.") ); }
  elseif(($LevType=='CL' OR $LevType=='CH') AND ($PNum1==7 OR $rP1HOa>0) AND ($PNum2==7 OR $rP2HOa>0) AND $rP3CLp>0 AND $rP4CLp>0){ echo json_encode( array("Code" => "100", "Msg" => "CL can be taken maximum for 2 days.") ); }
  elseif(($LevType=='CL' OR $LevType=='CH') AND ($PNum1==7 OR $rP1HOa>0) AND ($PNum2==7 OR $rP2HOa>0) AND ($PNum3==7 OR $rP3HOa>0) AND $rP4CLa>0 AND $rP5CLa>0){ echo json_encode( array("Code" => "100", "Msg" => "CL can be taken maximum for 2 days.") ); }
  elseif(($LevType=='CL' OR $LevType=='CH') AND ($PNum1==7 OR $rP1HOa>0) AND ($PNum2==7 OR $rP2HOa>0) AND ($PNum3==7 OR $rP3HOa>0) AND $rP4CLp>0 AND $rP5CLp>0){ echo json_encode( array("Code" => "100", "Msg" => "CL can be taken maximum for 2 days.") ); }
  elseif(($LevType=='CL' OR $LevType=='CH') AND $rP1CLp1>0){ echo json_encode( array("Code" => "100", "Msg" => "CL can be taken maximum for 2 days.") ); }
  elseif(($LevType=='CL' OR $LevType=='CH') AND ($PNum1==7 OR $rP1HOa>0) AND $rP1CLp2>0){ echo json_encode( array("Code" => "100", "Msg" => "CL can be taken maximum for 2 days.") ); }
  elseif(($LevType=='CL' OR $LevType=='CH') AND ($PNum1==7 OR $rP1HOa>0) AND ($PNum2==7 OR $rP2HOa>0) AND $rP1CLp3>0){ $Code='300'; $msg='CL can be taken maximum for 2 days.!'; }
  
  elseif($LevType!='CL' AND $LevType!='CH' AND $LevType!='SL' AND $LevType!='SH' AND ($rP1CLa>0 OR $rP1CHa>0)){ echo json_encode( array("Code" => "100", "Msg" => "CL can not be combined with any other leave!") ); }
  elseif($LevType!='CL' AND $LevType!='CH' AND $LevType!='SL' AND $LevType!='SH' AND ($rP1CLp>0 OR $rP1CHp>0)){ echo json_encode(array("Code" => "100", "Msg" => "CL can not be combined with any other leave!") ); }
  elseif($LevType!='CL' AND $LevType!='CH' AND $LevType!='SL' AND $LevType!='SH' AND ($PNum1==7 OR $rP1HOa>0) AND ($rP2CHa>0 OR $rP2CLa>0)){ echo json_encode(array("Code" => "100", "Msg" => "CL can not be combined with any other leave!") ); }
  elseif($LevType!='CL' AND $LevType!='CH' AND $LevType!='SL' AND $LevType!='SH' AND ($PNum1==7 OR $rP1HOa>0) AND ($rP2CHp>0 OR $rP2CLp>0)){ echo json_encode(array("Code" => "100", "Msg" => "CL can not be combined with any other leave!") ); }
  elseif($LevType!='CL' AND $LevType!='CH' AND $LevType!='SL' AND $LevType!='SH' AND ($PNum1==7 OR $rP1HOa>0) AND ($PNum2==7 OR $rP2HOa>0) AND ($rP3CLa>0 OR $rP3CHa>0)){ echo json_encode(array("Code" => "100", "Msg" => "CL can not be combined with any other leave!") ); }
  elseif($LevType!='CL' AND $LevType!='CH' AND $LevType!='SL' AND $LevType!='SH' AND ($PNum1==7 OR $rP1HOa>0) AND ($PNum2==7 OR $rP2HOa>0) AND ($rP3CLp>0 OR $rP3CHp>0)){ echo json_encode(array("Code" => "100", "Msg" => "CL can not be combined with any other leave!") ); }
  elseif($LevType!='CL' AND $LevType!='CH' AND $LevType!='SL' AND $LevType!='SH' AND ($PNum1==7 OR $rP1HOa>0) AND ($PNum2==7 OR $rP2HOa>0) AND ($PNum3==7 OR $rP3HOa>0) AND ($rP4CLa>0 OR $rP4CHa>0)){ echo json_encode(array("Code" => "100", "Msg" => "CL can not be combined with any other leave!") ); }
  elseif($LevType!='CL' AND $LevType!='CH' AND $LevType!='SL' AND $LevType!='SH' AND ($PNum1==7 OR $rP1HOa>0) AND ($PNum2==7 OR $rP2HOa>0) AND ($PNum3==7 OR $rP3HOa>0) AND ($rP4CLp>0 OR $rP4CHp>0)){ echo json_encode(array("Code" => "100", "Msg" => "CL can not be combined with any other leave!") ); }
  elseif(($LevType=='CL' OR $LevType=='CH') AND $rP1OTa>0){ echo json_encode(array("Code" => "100", "Msg" => "CL can not be combined with any other leave!") ); }
  elseif(($LevType=='CL' OR $LevType=='CH') AND $rP1OTp>0){ echo json_encode(array("Code" => "100", "Msg" => "CL can not be combined with any other leave!") ); }
  elseif(($LevType=='CL' OR $LevType=='CH') AND ($PNum1==7 OR $rP1HOa>0) AND $rP2OTa>0){ echo json_encode(array("Code" => "100", "Msg" => "CL can not be combined with any other leave!") ); }
  elseif(($LevType=='CL' OR $LevType=='CH') AND ($PNum1==7 OR $rP1HOa>0) AND $rP2OTp>0){ echo json_encode(array("Code" => "100", "Msg" => "CL can not be combined with any other leave!") ); }
  elseif(($LevType=='CL' OR $LevType=='CH') AND ($PNum1==7 OR $rP1HOa>0) AND ($PNum2==7 OR $rP2HOa>0) AND $rP3OTa>0){ echo json_encode(array("Code" => "100", "Msg" => "CL can not be combined with any other leave!") ); }
  elseif(($LevType=='CL' OR $LevType=='CH') AND ($PNum1==7 OR $rP1HOa>0) AND ($PNum2==7 OR $rP2HOa>0) AND $rP3OTp>0){ echo json_encode(array("Code" => "100", "Msg" => "CL can not be combined with any other leave!") ); } 
  elseif(($LevType=='CL' OR $LevType=='CH') AND ($PNum1==7 OR $rP1HOa>0) AND ($PNum2==7 OR $rP2HOa>0) AND ($PNum3==7 OR $rP3HOa>0) AND $rP4OTa>0){ echo json_encode(array("Code" => "100", "Msg" => "CL can not be combined with any other leave!") ); }
  elseif(($LevType=='CL' OR $LevType=='CH') AND ($PNum1==7 OR $rP1HOa>0) AND ($PNum2==7 OR $rP2HOa>0) AND ($PNum3==7 OR $rP3HOa>0) AND $rP4OTp>0){ echo json_encode(array("Code" => "100", "Msg" => "CL can not be combined with any other leave!") ); }

  /* EL Combination Query Open*/
  elseif(($LevType=='EL') AND ($rowp_a>0 OR $rowp_l>0) AND ($rowp_ea>0 OR $rowp_el>0)){ echo json_encode(array("Code" => "100", "Msg" => "EL can not be combined with continuously any other leave!") ); }
  elseif(($LevType=='EL') AND ($rown_a>0 OR $rown_l>0) AND ($rown_ea>0 OR $rown_el>0)){ echo json_encode(array("Code" => "100", "Msg" => "EL can not be combined with continuously any other leave!") ); }
  elseif(($LevType=='EL') AND $rowp_a>0 AND $rowp_a2>0 AND ($rowp_ea2>0 OR $rowp_el2>0)){ echo json_encode(array("Code" => "100", "Msg" => "EL can not be combined with continuously any other leave!") ); }
  elseif(($LevType=='EL') AND ($rown_ea2>0 OR $rown_el2>0)){ echo json_encode(array("Code" => "100", "Msg" => "EL can not be combined with continuously any other leave!") ); }
  /* EL Combination Query Close*/

  /************************************ Sunday Combined With Next Day **********************************/  
  elseif(($LevType=='CL' OR $LevType=='CH') AND $rN1CLa>0 AND ($NNum2==7 OR $rN2HOa>0) AND $rN3CLa>0){ echo json_encode(array("Code" => "100", "Msg" => "CL can be taken maximum for 2 days.") ); }
  elseif(($LevType=='CL' OR $LevType=='CH') AND $rN1CLp>0 AND ($NNum2==7 OR $rN2HOa>0) AND $rN3CLp>0){ echo json_encode(array("Code" => "100", "Msg" => "CL can be taken maximum for 2 days.") ); }
  elseif(($LevType=='CL' OR $LevType=='CH') AND $rN1CLp1>0){ echo json_encode(array("Code" => "100", "Msg" => "CL can be taken maximum for 2 days.") ); }
  elseif(($LevType=='CL' OR $LevType=='CH') AND $rN1CLa>0 AND ($NNum2==7 OR $rN2HOa>0) AND $rN3CHa>0 AND $rN4CHa>0){ echo json_encode(array("Code" => "100", "Msg" => "CL can be taken maximum for 2 days.") ); }
  elseif(($LevType=='CL' OR $LevType=='CH') AND $rN1CLp>0 AND ($NNum2==7 OR $rN2HOa>0) AND $rN3CHp>0 AND $rN4CHp>0){ echo json_encode(array("Code" => "100", "Msg" => "CL can be taken maximum for 2 days.") ); }
  elseif(($LevType=='CL' OR $LevType=='CH') AND $rN1CHa>0 AND $rN2CHa>0 AND ($NNum3==7 OR $rN3HOa>0) AND $rN4CHa>0 AND $rN5CHa>0){ echo json_encode(array("Code" => "100", "Msg" => "CL can be taken maximum for 2 days.") ); }
  elseif(($LevType=='CL' OR $LevType=='CH') AND $rN1CHp>0 AND $rN2CHp>0 AND ($NNum3==7 OR $rN3HOa>0) AND $rN4CHp>0 AND $rN5CHp>0){ echo json_encode(array("Code" => "100", "Msg" => "CL can be taken maximum for 2 days.") ); }
  elseif(($LevType=='CL' OR $LevType=='CH') AND $rN1CHa>0 AND $rN2CLa>0 AND ($NNum3==7 OR $rN3HOa>0) AND $rN4CHa>0){ echo json_encode(array("Code" => "100", "Msg" => "CL can be taken maximum for 2 days.") ); }
  elseif(($LevType=='CL' OR $LevType=='CH') AND $rN1CHp>0 AND $rN2CLp>0 AND ($NNum3==7 OR $rN3HOa>0) AND $rN4CHp>0){ echo json_encode(array("Code" => "100", "Msg" => "CL can be taken maximum for 2 days.") ); }
  elseif(($LevType=='CL' OR $LevType=='CH') AND $rN1CHa>0 AND ($NNum2==7 OR $rN2HOa>0) AND $rN3CLa>0 AND $rN4CHa>0){ echo json_encode(array("Code" => "100", "Msg" => "CL can be taken maximum for 2 days.") ); }
  elseif(($LevType=='CL' OR $LevType=='CH') AND $rN1CHp>0 AND ($NNum2==7 OR $rN2HOa>0) AND $rN3CLp>0 AND $rN4CHp>0){ echo json_encode(array("Code" => "100", "Msg" => "CL can be taken maximum for 2 days.") ); }
  elseif(($LevType=='CL') AND $rN1CHa>0 AND ($NNum2==7 OR $rN2HOa>0) AND $rN3CHa>0 AND $rN4CHa>0){ echo json_encode(array("Code" => "100", "Msg" => "CL can be taken maximum for 2 days.") ); }
  elseif(($LevType=='CL') AND $rN1CHp>0 AND ($NNum2==7 OR $rN2HOa>0) AND $rN3CLHp>0 AND $rN4CHp>0){ echo json_encode(array("Code" => "100", "Msg" => "CL can be taken maximum for 2 days.") ); }
  elseif($LevType=='CL' AND ($NNum1==7 OR $rN1HOa>0) AND $rN2CLa>0 AND $rN3CHa>0){ echo json_encode(array("Code" => "100", "Msg" => "CL can be taken maximum for 2 days.") ); }
  elseif($LevType=='CL' AND ($NNum1==7 OR $rN1HOa>0) AND $rN2CLp>0 AND $rN3CHp>0){ echo json_encode(array("Code" => "100", "Msg" => "CL can be taken maximum for 2 days.") ); }
  elseif($LevType=='CL' AND ($NNum1==7 OR $rN1HOa>0) AND $rN2CHa>0 AND $rN3CLa>0){ echo json_encode(array("Code" => "100", "Msg" => "CL can be taken maximum for 2 days.") ); } 
  elseif($LevType=='CL' AND ($NNum1==7 OR $rN1HOa>0) AND $rN2CHp>0 AND $rN3CLp>0){ echo json_encode(array("Code" => "100", "Msg" => "CL can be taken maximum for 2 days.") ); }
  elseif(($LevType=='CL' OR $LevType=='CH') AND $rN1CLa>0 AND $rN2CLa>0){ echo json_encode(array("Code" => "100", "Msg" => "CL can be taken maximum for 2 days.") ); }
  elseif(($LevType=='CL' OR $LevType=='CH') AND $rN1CLp>0 AND $rN2CLp>0){ echo json_encode(array("Code" => "100", "Msg" => "CL can be taken maximum for 2 days.") ); }
  elseif(($LevType=='CL' OR $LevType=='CH') AND ($NNum1==7 OR $rN1HOa>0) AND $rN2CLa>0 AND $rN3CLa>0){ echo json_encode(array("Code" => "100", "Msg" => "CL can be taken maximum for 2 days.") ); }
  elseif(($LevType=='CL' OR $LevType=='CH') AND ($NNum1==7 OR $rN1HOa>0) AND $rN2CLp>0 AND $rN3CLp>0){ echo json_encode(array("Code" => "100", "Msg" => "CL can be taken maximum for 2 days.") ); }
  elseif(($LevType=='CL' OR $LevType=='CH') AND ($NNum1==7 OR $rN1HOa>0) AND ($NNum2==7 OR $rN2HOa>0) AND $rN3CLa>0 AND $rN4CLa>0){ echo json_encode(array("Code" => "100", "Msg" => "CL can be taken maximum for 2 days.") ); }
  elseif(($LevType=='CL' OR $LevType=='CH') AND ($NNum1==7 OR $rN1HOa>0) AND ($NNum2==7 OR $rN2HOa>0) AND $rN3CLp>0 AND $rN4CLp>0){ echo json_encode(array("Code" => "100", "Msg" => "CL can be taken maximum for 2 days.") ); }
  elseif(($LevType=='CL' OR $LevType=='CH') AND ($NNum1==7 OR $rN1HOa>0) AND ($NNum2==7 OR $rN2HOa>0) AND ($NNum3==7 OR $rN3HOa>0) AND $rN4CLa>0 AND $rN5CLa>0){ echo json_encode(array("Code" => "100", "Msg" => "CL can be taken maximum for 2 days.") ); }
  elseif(($LevType=='CL' OR $LevType=='CH') AND ($NNum1==7 OR $rN1HOa>0) AND ($NNum2==7 OR $rN2HOa>0) AND ($NNum3==7 OR $rN3HOa>0) AND $rN4CLp>0 AND $rN5CLp>0){ echo json_encode(array("Code" => "100", "Msg" => "CL can be taken maximum for 2 days.") ); }
  elseif(($LevType=='CL' OR $LevType=='CH') AND $rN1CLp1>0){ echo json_encode(array("Code" => "100", "Msg" => "CL can be taken maximum for 2 days.") ); }
  elseif(($LevType=='CL' OR $LevType=='CH') AND ($NNum1==7 OR $rN1HOa>0) AND $rN1CLp2>0){ echo json_encode(array("Code" => "100", "Msg" => "CL can be taken maximum for 2 days.") ); }
  elseif(($LevType=='CL' OR $LevType=='CH') AND ($NNum1==7 OR $rN1HOa>0) AND ($NNum2==7 OR $rN2HOa>0) AND $rN1CLp3>0){ echo json_encode(array("Code" => "100", "Msg" => "CL can be taken maximum for 2 days.") ); }
 
  elseif(($LevType!='CL' AND $LevType!='CH' AND $LevType!='SL' AND $LevType!='SH') AND ($rN1CLa>0 OR $rN1CHa>0)){ echo json_encode(array("Code" => "100", "Msg" => "CL can not be combined with any other leave!") ); }
  elseif(($LevType!='CL' AND $LevType!='CH' AND $LevType!='SL' AND $LevType!='SH') AND ($rN1CLp>0 OR $rN1CHp>0)){ echo json_encode(array("Code" => "100", "Msg" => "CL can not be combined with any other leave!") ); }
  elseif(($LevType!='CL' AND $LevType!='CH' AND $LevType!='SL' AND $LevType!='SH') AND ($NNum1==7 OR $rN1HOa>0) AND ($rN2CHa>0 OR $rN2CLa>0)){ echo json_encode(array("Code" => "100", "Msg" => "CL can not be combined with any other leave!") ); }
  elseif(($LevType!='CL' AND $LevType!='CH' AND $LevType!='SL' AND $LevType!='SH') AND ($NNum1==7 OR $rN1HOa>0) AND ($rN2CHp>0 OR $rN2CLp>0)){ echo json_encode(array("Code" => "100", "Msg" => "CL can not be combined with any other leave!") ); }
  elseif(($LevType!='CL' AND $LevType!='CH' AND $LevType!='SL' AND $LevType!='SH') AND ($NNum1==7 OR $rN1HOa>0) AND ($NNum2==7 OR $rN2HOa>0) AND ($rN3CLa>0 OR $rN3CHa>0)){ echo json_encode(array("Code" => "100", "Msg" => "CL can not be combined with any other leave!") ); }
  elseif(($LevType!='CL' AND $LevType!='CH' AND $LevType!='SL' AND $LevType!='SH') AND ($NNum1==7 OR $rN1HOa>0) AND ($NNum2==7 OR $rN2HOa>0) AND ($rN3CLp>0 OR $rN3CHp>0)){ echo json_encode(array("Code" => "100", "Msg" => "CL can not be combined with any other leave!") ); }
  elseif(($LevType!='CL' AND $LevType!='CH' AND $LevType!='SL' AND $LevType!='SH') AND ($NNum1==7 OR $rN1HOa>0) AND ($NNum2==7 OR $rN2HOa>0) AND ($NNum3==7 OR $rN3HOa>0) AND ($rN4CLa>0 OR $rN4CHa>0)){ echo json_encode(array("Code" => "100", "Msg" => "CL can not be combined with any other leave!") ); }
  elseif(($LevType!='CL' AND $LevType!='CH' AND $LevType!='SL' AND $LevType!='SH') AND ($NNum1==7 OR $rN1HOa>0) AND ($NNum2==7 OR $rN2HOa>0) AND ($NNum3==7 OR $rN3HOa>0) AND ($rN4CLp>0 OR $rN4CHp>0)){ echo json_encode(array("Code" => "100", "Msg" => "CL can not be combined with any other leave!") ); }
  elseif(($LevType=='CL' OR $LevType=='CH') AND $rN1OTa>0){ echo json_encode(array("Code" => "100", "Msg" => "CL can not be combined with any other leave!") ); }
  elseif(($LevType=='CL' OR $LevType=='CH') AND $rN1OTp>0){ echo json_encode(array("Code" => "100", "Msg" => "CL can not be combined with any other leave!") ); }
  elseif(($LevType=='CL' OR $LevType=='CH') AND ($NNum1==7 OR $rN1HOa>0) AND $rN2OTa>0){ echo json_encode(array("Code" => "100", "Msg" => "CL can not be combined with any other leave!") ); }
  elseif(($LevType=='CL' OR $LevType=='CH') AND ($NNum1==7 OR $rN1HOa>0) AND $rN2OTp>0){ echo json_encode(array("Code" => "100", "Msg" => "CL can not be combined with any other leave!") ); }
  elseif(($LevType=='CL' OR $LevType=='CH') AND ($NNum1==7 OR $rN1HOa>0) AND ($NNum2==7 OR $rN2HOa>0) AND $rN3OTa>0){ echo json_encode(array("Code" => "100", "Msg" => "CL can not be combined with any other leave!") ); }
  elseif(($LevType=='CL' OR $LevType=='CH') AND ($NNum1==7 OR $rN1HOa>0) AND ($NNum2==7 OR $rN2HOa>0) AND $rN3OTp>0){ echo json_encode(array("Code" => "100", "Msg" => "CL can not be combined with any other leave!") ); }
  elseif(($LevType=='CL' OR $LevType=='CH') AND ($NNum1==7 OR $rN1HOa>0) AND ($NNum2==7 OR $rN2HOa>0) AND ($NNum3==7 OR $rN3HOa>0) AND $rN4OTa>0){ echo json_encode(array("Code" => "100", "Msg" => "CL can not be combined with any other leave!") ); }
  elseif(($LevType=='CL' OR $LevType=='CH') AND ($NNum1==7 OR $rN1HOa>0) AND ($NNum2==7 OR $rN2HOa>0) AND ($NNum3==7 OR $rN3HOa>0) AND $rN4OTp>0){ echo json_encode(array("Code" => "100", "Msg" => "CL can not be combined with any other leave!") ); }
  else
  { 
    //echo "aa";
   $startTimeStamp = strtotime($AppFromDate); //echo 's='.$AppFromDate.'<br>'; 
   $endTimeStamp = strtotime($AppToDate);     //echo 'e='.$AppToDate;
   
   // Count day between two days
   if ($LevType=='CL' OR $LevType=='EL' OR $LevType=='PL' OR $LevType=='SL' OR $LevType=='FL' OR $LevType=='TL')
   { 
    $timeDiff = abs($endTimeStamp - $startTimeStamp); 
    // 86400 seconds in one day  // and you might want to convert to integer $numberDays = intval($numberDays); 
    $days = $timeDiff/86400;  
    if($LevType=='EL'){$totaldays=$days+1;}
    if($LevType!='EL')
    { 
	  $Fday=date("d",strtotime($FrDate)); $Fmonth=date("m",strtotime($FrDate)); $Fyear=date("Y",strtotime($FrDate));
      $Tday=date("d",strtotime($ToDate)); $Tmonth=date("m",strtotime($ToDate)); $Tyear=date("Y",strtotime($ToDate));
	  $m=$_REQUEST['month']; $y=$_REQUEST['year']; 
      $mkdate = mktime(0,0,0, $Fmonth, 1, $Fyear); 
      $DateFmonth = date('t',$mkdate);
	  
	  if($Fmonth==$Tmonth){ $sunday=0;  for($i=$Fday; $i<=$Tday; $i++) { if(date("w",strtotime(date($Fyear.'-'.$Fmonth.'-'.$i)))==0) { $sunday++;}} $TotSunday=$sunday; }
	  elseif($Fmonth!=$Tmonth AND $Fyear==$Tyear)
	  { $Y1sunday=0; $Y2sunday=0;
	    for($i=$Fday; $i<=$DateFmonth; $i++) { if(date("w",strtotime(date($Fyear.'-'.$Fmonth.'-'.$i)))==0) { $Y1sunday++;} }
	    for($i=1; $i<=$Tday; $i++) { if(date("w",strtotime(date($Fyear.'-'.$Tmonth.'-'.$i)))==0) { $Y2sunday++;} } 
	    $TotSunday=$Y1sunday+$Y2sunday; 
	  }
	  elseif($Fmonth!=$Tmonth AND $Fyear!=$Tyear)
	  { $Y11sunday=0; $Y22sunday=0;
	    for($i=$Fday; $i<=$DateFmonth; $i++) { if(date("w",strtotime(date($Fyear.'-'.$Fmonth.'-'.$i)))==0) { $Y11sunday++;} }
	    for($i=1; $i<=$Tday; $i++) { if(date("w",strtotime(date($Tyear.'-'.$Tmonth.'-'.$i)))==0) { $Y22sunday++;} }  
	    $TotSunday=$Y11sunday+$Y22sunday;  
	  }
	  if($TotSunday==0){$totaldays=$days+1;} elseif($TotSunday==1){$totaldays=$days;} elseif($TotSunday==2){$totaldays=$days-1;}
	  elseif($TotSunday==3){$totaldays=$days-2;} elseif($TotSunday==4){$totaldays=$days-3;}
     }
   }
   else{ $timeDiff = abs($endTimeStamp - $startTimeStamp); $days = $timeDiff/86400; $totaldays=($days+1)/2; }
   // Close Close Count day between two days 
   
   
   $qTAppCL=mysqli_query($con, "select sum(Apply_TotalDay) as Total from hrm_employee_applyleave where (Leave_Type='CL' OR Leave_Type='CH') AND LeaveStatus!=4 AND LeaveStatus!=3 AND LeaveStatus!=2 AND EmployeeID=".$eid." AND Apply_FromDate>='".date("Y-01-01")."' AND Apply_ToDate<='".date("Y-12-31")."'"); $rTAppCL=mysqli_fetch_assoc($qTAppCL); 
   
   $totalLV=0;
   if($rTAppCL['Total']!=''){$totalLV=$rTAppCL['Total'];}
   
   if($totalLV==0){ $finalBal=$_REQUEST['BalCL']; }
   elseif($totalLV>$_REQUEST['BalCL']){ $finalBal=0; }
   elseif($totalLV<=$_REQUEST['BalCL']){ $finalBal=$_REQUEST['BalCL']-$totalLV; }
   
   //$finalBal=$totalLV-$_REQUEST['BalCL'];
   
   
   

   if($LevType=='EL'){ $TotDays=$totaldays; }else{ $TotDays=$totaldays-$rowH; } 
   if($TotDays==0){ echo json_encode(array("Code" => "100", "Msg" => "Please check your apply day.") ); }
   elseif(($LevType=='CL' OR $LevType=='CH') AND $TotDays>$_REQUEST['BalCL']){ echo json_encode(array("Code" => "100", "Msg" => "Please check apply no of day CL.") ); }
   elseif(($LevType=='CL' OR $LevType=='CH') AND $TotDays>$finalBal){ echo json_encode(array("Code" => "100", "Msg" => "Please check apply no of day CL.") );  }
   elseif(($LevType=='CL' OR $LevType=='CH') AND ($PNum1==7 OR $rP1HOa>0) AND ($rP2CLa>0 OR $rP2CHa>0) AND $TotDays>=2){ echo json_encode(array("Code" => "100", "Msg" => "CL can be taken maximum for 2 days.") ); }
   elseif(($LevType=='CL' OR $LevType=='CH') AND ($PNum1==7 OR $rP1HOa>0) AND $rP2CLa>0 AND $rP3CLa>0){ echo json_encode(array("Code" => "100", "Msg" => "CL can be taken maximum for 2 days.") ); }
   elseif(($LevType=='CL' OR $LevType=='CH') AND ($PNum1==7 OR $rP1HOa>0) AND ($rP2CLp>0 OR $rP2CHp>0) AND $TotDays==2){ echo json_encode(array("Code" => "100", "Msg" => "CL can be taken maximum for 2 days.") ); }
   elseif(($LevType=='CL' OR $LevType=='CH') AND ($PNum1==7 OR $rP1HOa>0) AND ($rP2CLa>0 OR $rP2CHa>0) AND $TotDays==2){ echo json_encode(array("Code" => "100", "Msg" => "CL can be taken maximum for 2 days.") ); }
   elseif(($LevType=='CL' OR $LevType=='CH') AND ($NNum1==7 OR $rN1HOa>0) AND ($rN2CLp>0 OR $rN2CHp>0) AND $TotDays==2){ echo json_encode(array("Code" => "100", "Msg" => "CL can be taken maximum for 2 days.") ); }
   elseif(($LevType=='CL' OR $LevType=='CH') AND ($NNum1==7 OR $rN1HOa>0) AND ($rN2CLa>0 OR $rN2CHa>0) AND $TotDays==2){ echo json_encode(array("Code" => "100", "Msg" => "CL can be taken maximum for 2 days.") ); }
   elseif(($LevType=='CL' OR $LevType=='CH') AND ($NNum1==7 OR $rN1HOa>0) AND $rP2CLp>0 AND ($NNum3==7 OR $rN3HOa>0) AND $rP4CLp>0){ echo json_encode(array("Code" => "100", "Msg" => "CL can be taken maximum for 2 days.") ); }
   elseif(($LevType=='CL' OR $LevType=='CH') AND ($NNum1==7 OR $rN1HOa>0) AND $rP2CLa>0 AND ($NNum3==7 OR $rN3HOa>0) AND $rP4CLa>0){ echo json_encode(array("Code" => "100", "Msg" => "CL can be taken maximum for 2 days.") ); }
   elseif($LevType=='CL' AND $TotDays>2){ echo json_encode(array("Code" => "100", "Msg" => "CL can be taken maximum for 2 days.") ); }
   elseif($LevType=='CH' AND $TotDays>0.5){ echo json_encode(array("Code"=>"100", "Msg" => "Half Day of CL can be taken maximum for 1/2 days.") ); }
   elseif(($LevType=='SL' OR $LevType=='SH') AND $TotDays>$_REQUEST['BalSL']){ echo json_encode(array("Code" => "100", "Msg" => "Please check apply no of day SL.") ); }
   elseif($LevType=='SH' AND $TotDays>0.5){ echo json_encode(array("Code" => "100", "Msg" => "Please check apply no of day SL.") ); }
   elseif($LevType=='PL' AND $TotDays>$_REQUEST['BalPL']){ echo json_encode(array("Code" => "100", "Msg" => "Please check apply no of day PL.") ); }
   elseif($LevType=='EL' AND $TotDays>$_REQUEST['BalEL']){ echo json_encode(array("Code" => "100", "Msg" => "Please check apply no of day EL.") ); }
   elseif($LevType=='FL' AND $TotDays>$_REQUEST['BalFL']){ echo json_encode(array("Code" => "100", "Msg" => "Please check apply no of day FL.") ); }
   elseif($LevType=='EL' AND $TotDays<3){ echo json_encode(array("Code" => "100", "Msg" => "EL can be taken minimum for 3 days.") ); }
   elseif($LevType=='EL' AND $TotDays==3 AND (date("w",strtotime(date($FrDate)))==0 OR date("w",strtotime(date($ToDate)))==0)){ echo json_encode(array("Code" => "100", "Msg" => "EL can`t combined any holiday, sunday if apply total number of day leave is 3") ); }
  
   elseif($LevType=='FL' AND $_REQUEST['OpHo']=='' AND $rP1PLa==0 AND $rP2PLa==0 AND $rP3PLa==0 AND $rP4PLa==0 AND $rP1PLp==0 AND $rP2PLp==0 AND $rP3PLp==0 AND $rP4PLp==0 AND $rN1PLa==0 AND $rN2PLa==0 AND $rN3PLa==0 AND $rN4PLa==0 AND $rN1PLp==0 AND $rN2PLp==0 AND $rN3PLp==0 AND $rN4PLp==0)
   { echo json_encode(array("Code" => "100", "Msg" => "FL combined only with prefix or suffix from PL") ); }
  
   else
   {  
     //echo "bb";
     $sqlApp=mysqli_query($con, "select * from hrm_employee_reporting where EmployeeID='".$eid."'"); 
     $resApp=mysqli_fetch_assoc($sqlApp);
	 if($resApp['AppraiserId']==''){ $AppId=0; }else{ $AppId=$resApp['AppraiserId']; }
	 if($resApp['ReviewerId']==''){ $RevId=0; }else{ $RevId=$resApp['ReviewerId']; }
	 if($resApp['HodId']==''){ $HodId=0; }else{ $HodId=$resApp['HodId']; }
	
     $TotsSL=$TotDays+$_REQUEST['AavailSL'];
     if(($LevType=='SL' OR $LevType=='SH') AND $TotsSL>10){$SLHodApp='Y';}else{$SLHodApp='N';}
     $search =  '*"#$%@~/\':'; $search = str_split($search); $Reason=str_replace($search, "", $_REQUEST['Reason']);
   
     
     $result=mysqli_query($con,"INSERT INTO hrm_employee_applyleave(EmployeeID,Apply_Date,Leave_Type,Apply_FromDate,Apply_ToDate,Apply_TotalDay,Apply_Reason,Apply_ContactNo,Apply_DuringAddress,Apply_SentToApp,Apply_SentToRev,Apply_SentToHOD,SLHodApp) VALUES(".$eid.",'".date('Y-m-d')."','".$LevType."','".$FrDate."','".$ToDate."','".$TotDays."','".$Reason."',".$_REQUEST['ContactNo'].",'".$_REQUEST['DuAdd']."',".$AppId.",".$RevId.",".$HodId.",'".$SLHodApp."')");
     
	 
     if($result) 
     {  
	 
	  $sqlRep=mysqli_query($con, "select EmailId_Vnr, tokenid,tokenid_ios from hrm_employee_general g inner join hrm_employee e on g.EmployeeID=e.EmployeeID where g.EmployeeID=".$AppId); 
	  //$sqlRep=mysqli_query($con, "select EmailId_Vnr from hrm_employee_general where EmployeeID=".$AppId); 
      $sqlHod=mysqli_query($con, "select EmailId_Vnr from hrm_employee_general where EmployeeID=".$HodId);  
	  $sqlSelf=mysqli_query($con, "select Fname, Sname, Lname, DepartmentId, Gender, Married, DR, EmailId_Vnr from hrm_employee_general g inner join hrm_employee e on g.EmployeeID=e.EmployeeID inner join hrm_employee_personal p on g.EmployeeID=p.EmployeeID where g.EmployeeID=".$eid); 
	  $resRep=mysqli_fetch_assoc($sqlRep); $resHod=mysqli_fetch_assoc($sqlHod); $resSelf=mysqli_fetch_assoc($sqlSelf);
	  if($resSelf['DR']=='Y'){$MS='Dr.';} elseif($resSelf['Gender']=='M'){$MS='Mr.';} elseif($resSelf['Gender']=='F' AND $resSelf['Married']=='Y'){$MS='Mrs.';} elseif($resSelf['Gender']=='F' AND $resSelf['Married']=='N'){$MS='Miss.';}  
	  $Ename=$MS.' '.$resSelf['Fname'].' '.$resSelf['Sname'].' '.$resSelf['Lname'];
	 
      if(($resRep['EmailId_Vnr']!='' AND $LevType!='SL') OR ($resRep['EmailId_Vnr']!='' AND $LevType=='SL' AND $TotsSL<=10))
      {
       //$email_to = $resRep['EmailId_Vnr']; 
       //$email_from='admin@vnrseeds.co.in';
       $email_subject = "Leave Application";
       //$headers = "From: $email_from ". "\r\n";
       $email_message .=$Ename." has submitted leave application for ".$LevType." from ".date("d-m-Y",strtotime($_REQUEST['FromDate']))." to ".date("d-m-Y",strtotime($_REQUEST['ToDate'])).", for any action, kindly check on to ESS.\n\n";
	  //$ok = @mail($email_to, $email_subject, $email_message, $headers);
	  
	  $subject=$email_subject;
      $body=$email_message;
      $email_to=$resRep['EmailId_Vnr'];
      require 'vendor/mail_admin.php';
	  
      }
      
      /************ Firbase *******************/
      /************ Firbase *******************/
      if($resRep['tokenid']!='')
      {  
         include "firebase_api.php";
         $user_token = $resRep['tokenid']; 
      }
      elseif($resRep['tokenid_ios']!='')
      {  
         include "firebase_ios_api.php"; 
         $user_token = $resRep['tokenid_ios'];
      }
      
      //$user_token=[];
      //$user_token[] = $resRep['tokenid'];
      $data1['subject'] = 'Leave Application';
      
      $data1['msg_body'] = $Ename." has submitted leave application for ".$LevType." from ".date("d-m-Y",strtotime($_REQUEST['FromDate']))." to ".date("d-m-Y",strtotime($_REQUEST['ToDate'])).".";
	  android($data1,$user_token);
	  /************ Firbase *******************/
	  /************ Firbase *******************/
      
      
      
      
	  if($LevType=='SL' AND $TotsSL>10 AND $_POST['EmailHod']!='')
      {
       //$email_toa = $resHod['EmailId_Vnr'];
       //$email_from='admin@vnrseeds.co.in';
       $email_subjecta = "Leave Application: Approval for SL for critical illness/long sickness"; 
       //$headers = "From: $email_from ". "\r\n";
       $email_messagea .=$Ename." has applied SL from ".$_REQUEST['FromDate']." to ".$_REQUEST['ToDate']." for critical illness/long sickness. for any action, kindly log on to ESS.\n\n";
	   //$ok = @mail($email_toa, $email_subjecta, $email_messagea, $headers);
	   
	   $subject=$email_subjecta;
       $body=$email_messagea;
       $email_to=$resHod['EmailId_Vnr'];
       require 'vendor/mail_admin.php';
       
	  
	   //$email2_toa = 'vspl.attendance@gmail.com';  //vspl.hr@vnrseeds.com
       //$email2_from='admin@vnrseeds.co.in';
       $email2_subjecta = "Leave Application: Approval for SL for critical illness/long sickness";
       //$headers = "From: $email_from ". "\r\n";
       $email2_messagea .=$Ename." has applied SL from ".$_REQUEST['FromDate']." to ".$_REQUEST['ToDate']." for critical illness/long sickness. for any action, kindly log on to ESS.\n\n";
	   //$ok = @mail($email2_toa, $email2_subjecta, $email2_messagea, $headers); 
	   $subject=$email2_subjecta;
       $body=$email2_messagea;
       $email_to='vspl.attendance@gmail.com';
       require 'vendor/mail_admin.php';
	   
      }   
	 
      //********************************************************************// 
      $sqlDept=mysqli_query($con, "select DepartmentCode from hrm_department where DepartmentId=".$resSelf['DepartmentId']); 
	  $resDept=mysqli_fetch_assoc($sqlDept);
      //$email_to = 'vspl.attendance@gmail.com'; //vspl.hr@vnrseeds.com
      //$email_from='admin@vnrseeds.co.in';
	  $email_subject = "Leave Application";
      //$headers = "From: $email_from ". "\r\n";
      $email_message4 .=$Ename." (".$resDept['DepartmentCode'].") has submitted leave application for ".$LevType." from ".$_REQUEST['FromDate']." to ".$_REQUEST['ToDate'].", for any action, kindly log on to ESS.\n\n";
      //$ok = @mail($email_to, $email_subject, $email_message4, $headers);
      
       $subject=$email_subject;
       $body=$email_message4;
       $email_to='vspl.attendance@gmail.com';
       require 'vendor/mail_admin.php';
	
	  //********************************************************************// 
      if($resSelf['DepartmentId']==2)
      {
       //$email_to = 'dsmanta11@gmail.com'; //seshi.reddy@vnrseeds.com:to- 26-09-2017
       //$email_from='admin@vnrseeds.co.in';
       $email_subject = "Leave Application";
       //$headers = "From: $email_from ". "\r\n";
       $email_message5 .=$Ename." has submitted leave application for ".$LevType." from ".$_REQUEST['FromDate']." to ".$_REQUEST['ToDate'].".\n\n";
       //$ok = @mail($email_to, $email_subject, $email_message5, $headers);
       
       $subject=$email_subject;
       $body=$email_message5;
       $email_to='dsmanta11@gmail.com';
       require 'vendor/mail_admin.php';
       
	  } 
      
	  echo json_encode( array("Code" => "300", "Msg" => "Your leave request has been submitted succesfully.!") );
	  
   
    } //if($result) 
    else { echo json_encode( array("Code" => "100", "Msg" => "Your leave request not to be sent!") ); }
   
   } //else
  
  }	//else
/**************************************************************************************************/
/**************************************************************************************************/
			  
}



//Team Apply Leave Draft
elseif($_REQUEST['value'] == 'TLeave_Drf' && $_REQUEST['empid']>0 && $_REQUEST['year']!='')
{ 
    
  $nodinm = date("t",strtotime(date("Y-m-d")));  
  //Number of days in the given month (28-31)    
    
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
 
 $sql=mysqli_query($con, "select ApplyLeaveId, al.EmployeeID, EmpCode, Fname, Sname, Lname, Apply_Date, Leave_Type, Apply_FromDate, Apply_ToDate, Apply_TotalDay, Apply_Reason, Apply_ContactNo, Apply_DuringAddress, Apply_SentToApp, Apply_SentToRev, Apply_SentToHOD, LeaveEmpCancelStatus as ApplyForCancel, LeaveCancelStatus as StatusForCancel from hrm_employee_applyleave al inner join hrm_employee e on al.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND al.Apply_SentToApp=".$_REQUEST['empid']." AND al.SLHodApp='N' AND (al.LeaveStatus=0 OR al.LeaveStatus=1 OR (al.LeaveEmpCancelStatus='Y' AND LeaveCancelStatus='N')) AND al.Apply_FromDate>='".$cFDate."' AND al.Apply_ToDate<='".$cTDate."' order by Apply_Date DESC"); 
 
 //(al.Apply_SentToApp=".$_REQUEST['empid']." OR Apply_SentToHOD=".$_REQUEST['empid'].")
 
 $row=mysqli_num_rows($sql); $DLary=array();
 if($row>0)
 {
   while($res=mysqli_fetch_assoc($sql)){ $DLary[]=$res; }
   echo json_encode(array("Code"=>"300", "Draft_Leave"=>$DLary) );
 }
 else{ echo json_encode(array("Code" => "100", "msg" => "Data not found!") ); }
}


//Team Apply Leave Pending
elseif($_REQUEST['value'] == 'TLeave_Pnd' && $_REQUEST['empid']>0 && $_REQUEST['year']!='')
{ 
    
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
 
 $cFDate=date($_REQUEST['year']."-".date("m")."-01"); $cTDate=date($_REQUEST['year']."-".date("m")."-31");
    
 
 $sql=mysqli_query($con, "select ApplyLeaveId, al.EmployeeID, EmpCode, Fname, Sname, Lname, Apply_Date, Leave_Type, Apply_FromDate, Apply_ToDate, Apply_TotalDay, Apply_Reason, Apply_ContactNo, Apply_DuringAddress, Apply_SentToApp, Apply_SentToRev, Apply_SentToHOD, LeaveEmpCancelStatus as ApplyForCancel, LeaveCancelStatus as StatusForCancel from hrm_employee_applyleave al inner join hrm_employee e on al.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND al.Apply_SentToApp=".$_REQUEST['empid']." AND al.SLHodApp='N' AND al.LeaveStatus=1 AND al.LeaveEmpCancelStatus='N' AND al.Apply_FromDate>='".$cFDate."' AND al.Apply_ToDate<='".$cTDate."' order by Apply_Date DESC"); 
 
 //(al.Apply_SentToApp=".$_REQUEST['empid']." OR Apply_SentToHOD=".$_REQUEST['empid'].")
 
 $row=mysqli_num_rows($sql); $PLary=array();
 if($row>0)
 {
   while($res=mysqli_fetch_assoc($sql)){ $PLary[]=$res; }
   echo json_encode(array("Code"=>"300", "Pending_Leave"=>$PLary) );
 }
 else{ echo json_encode(array("Code" => "100", "msg" => "Data not found!") ); }
}

//Team Apply Leave Approved
elseif($_REQUEST['value'] == 'TLeave_Aprvd' && $_REQUEST['empid']>0 && $_REQUEST['year']!='' && $_REQUEST['M']>0)
{ 
    
 if($_REQUEST['M']>0)
 {
  
   $cFDate=date($_REQUEST['year']."-".$_REQUEST['M']."-01"); $cTDate=date($_REQUEST['year']."-".$_REQUEST['M']."-31");
 }
 else
 {
   $cFDate=date($_REQUEST['year']."-01-01"); $cTDate=date($_REQUEST['year']."-12-31");  
 }  
 
 
 
 $sql=mysqli_query($con, "select ApplyLeaveId, al.EmployeeID, EmpCode, Fname, Sname, Lname, Apply_Date, Leave_Type, Apply_FromDate, Apply_ToDate, Apply_TotalDay, Apply_Reason, Apply_ContactNo, Apply_DuringAddress, Apply_SentToApp, Apply_SentToRev, Apply_SentToHOD, LeaveAppStatus as LeaveStatus, LeaveEmpCancelStatus as ApplyForCancel, LeaveCancelStatus as StatusForCancel, LeaveEmpCancelReason as ReasonForCancel from hrm_employee_applyleave al inner join hrm_employee e on al.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND al.Apply_SentToApp=".$_REQUEST['empid']." AND al.SLHodApp='N' AND (al.LeaveStatus=2 OR al.LeaveAppStatus=2 OR al.LeaveStatus=3 OR al.LeaveAppStatus=3 OR (al.LeaveEmpCancelStatus='Y' AND LeaveCancelStatus='Y')) AND al.Apply_FromDate>='".$cFDate."' AND al.Apply_ToDate<='".$cTDate."' order by Apply_Date DESC"); 
 
 //(al.Apply_SentToApp=".$_REQUEST['empid']." OR Apply_SentToHOD=".$_REQUEST['empid'].")
 
 $row=mysqli_num_rows($sql); $ALary=array();
 if($row>0)
 {
   while($res=mysqli_fetch_assoc($sql)){ $ALary[]=$res; }
   echo json_encode(array("Code"=>"300", "Approved_Leave"=>$ALary) );
 }
 else{ echo json_encode(array("Code" => "100", "msg" => "Data not found!") ); }
}


//Team Apply Leave Action
elseif($_REQUEST['value'] == 'TLeave_Req_Action' AND $_REQUEST['ApplyLeaveId']>0 AND $_REQUEST['v']!='' AND $_REQUEST['FromDate']!='' AND $_REQUEST['ToDate']!='' AND $_REQUEST['empid']!='' AND $_REQUEST['LeaveType']!='' AND $_REQUEST['App']!='' AND $_REQUEST['Rev']!='' AND $_REQUEST['Hod']!='')
{ 
  $LvId=$_REQUEST['ApplyLeaveId']; 
  $FDate=date("Y-m-d",strtotime($_REQUEST['FromDate'])); $TDate=date("Y-m-d",strtotime($_REQUEST['ToDate']));
  $FromDate=date("d-m-Y",strtotime($_REQUEST['FromDate'])); $ToDate=date("d-m-Y",strtotime($_REQUEST['ToDate']));
  $Fday=date("d",strtotime($FromDate)); $Fmonth=date("m",strtotime($FromDate)); $Fyear=date("Y",strtotime($FromDate));
  $Tday=date("d",strtotime($ToDate));   $Tmonth=date("m",strtotime($ToDate));   $Tyear=date("Y",strtotime($ToDate));
  $startTimeStamp = strtotime($FromDate); $endTimeStamp = strtotime($ToDate);
  $day=date("t",strtotime(date($FDate))); $DateFmonth=date("t",strtotime(date($FDate)));
  
  $sqlE=mysqli_query($con, "select Fname,Sname,Lname,EmailId_Vnr,Gender,DR,Married,tokenid,tokenid_ios from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_personal p ON e.EmployeeID=p.EmployeeID where e.EmployeeID=".$_REQUEST['empid']); $resE=mysqli_fetch_assoc($sqlE);
  if($resE['DR']=='Y'){$M='Dr.';} elseif($resE['Gender']=='M'){$M='Mr.';} elseif($resE['Gender']=='F' AND $resE['Married']=='Y'){$M='Mrs.';} elseif($resE['Gender']=='F' AND $resE['Married']=='N'){$M='Miss.';}  $NameE=$M.' '.$resE['Fname'].' '.$resE['Sname'].' '.$resE['Lname'];

  if($_REQUEST['v']==2)
  { 
      
    /*  
    if($_REQUEST['LeaveType']=='PL' AND $_REQUEST['App']!=$_REQUEST['Rev'])
    { 
      $sqlUp=mysqli_query($con, "update hrm_employee_applyleave set LeaveStatus=2, LeaveAppStatus=".$_REQUEST['v'].", LeaveAppUpDate='".date("Y-m-d")."', LeaveHodStatus=".$_REQUEST['v'].", LeaveHodUpDate='".date("Y-m-d")."' where ApplyLeaveId=".$_REQUEST['ApplyLeaveId']);  
	  $sqlHod=mysqli_query($con, "select EmailId_Vnr from hrm_employee_general where EmployeeID=".$_REQUEST['Rev']); 
      $resHod=mysqli_fetch_assoc($sqlHod);
	 
	  /*
      if($_REQUEST['LeaveType']=='PL' AND $resHod['EmailId_Vnr']!='')
      {
       $email_to = $resHod['EmailId_Vnr'];
       $email_from='admin@vnrseeds.co.in';
       $email_subject = "Leave Application";
       $headers = "From: $email_from ". "\r\n";
       $email_message .= $NameE." has submitted leave application for ".$_REQUEST['LeaveType']." from ".$FromDate." to ".$ToDate.", for your approval kindly log on to ESS.\n\n\n";
       $email_message .= "From <br><b>ADMIN ESS</b><br>";
       $ok = @mail($email_to, $email_subject, $email_message, $headers);
      } 
      */ /*
      if($sqlUp){ echo json_encode(array("Code" => "300", "msg" => "Leave Approved Successfully!") ); }
    }
    else
    {  */
   /**************************----------****************************/  
   /**************************----------****************************/
 
   //____________________________  Open ______________________________________________//
   //____________________________  Open ______________________________________________//
   
   $subQry="select * from hrm_employee_attendance where EmployeeID=".$_REQUEST['empid']." and";	
   $subQry2="select * from hrm_employee_attendance where EmployeeID=".$_REQUEST['empid']." and AttValue='HO' and";
  
  
   if($Fmonth==$Tmonth) 
   { 
	for($i=$Fday; $i<=$Tday; $i++) 
    { 
	 if(date("w",strtotime(date($Fyear.'-'.$Fmonth.'-'.$i)))!=0) 
	 { 
	  $Sql=mysqli_query($con, $subQry." AttDate='".date($Fyear."-".$Fmonth."-".$i)."'"); $row=mysqli_num_rows($Sql);
	  $Sql2=mysqli_query($con, $subQry2." AttDate='".date($Fyear."-".$Fmonth."-".$i)."'"); $row2=mysqli_num_rows($Sql2); 
	  
      if($row==0){ $sIns=mysqli_query($con, "insert into hrm_employee_attendance(EmployeeID,AttValue,AttDate,Year)values(".$_REQUEST['empid'].",'".$_REQUEST['LeaveType']."','".date($Fyear.'-'.$Fmonth.'-'.$i)."','".$Fyear."')"); }
      elseif($row>0 AND $row2==0){ $sIns=mysqli_query($con, "UPDATE hrm_employee_attendance SET AttValue='".$_REQUEST['LeaveType']."' where EmployeeID=".$_REQUEST['empid']." AND AttDate='".date($Fyear.'-'.$Fmonth.'-'.$i)."'"); }
	 } 
	 elseif(date("w",strtotime(date($Fyear.'-'.$Fmonth.'-'.$i)))==0 AND $_REQUEST['LeaveType']=='EL') 
	 { 
	  $Sql=mysqli_query($con, $subQry." AttDate='".date($Fyear."-".$Fmonth."-".$i)."'"); $row=mysqli_num_rows($Sql);
	  $Sql2=mysqli_query($con, $subQry2." AttDate='".date($Fyear."-".$Fmonth."-".$i)."'"); $row2=mysqli_num_rows($Sql2);
	  if($row==0) { $sIns=mysqli_query($con, "insert into hrm_employee_attendance(EmployeeID,AttValue,AttDate,CheckSunday,Year)values(".$_REQUEST['empid'].",'".$_REQUEST['LeaveType']."','".date($Fyear.'-'.$Fmonth.'-'.$i)."','Y','".$Fyear."')"); }
      elseif($row>0 AND $row2==0){ $sIns=mysqli_query($con, "UPDATE hrm_employee_attendance SET AttValue='".$_REQUEST['LeaveType']."',CheckSunday='Y' where EmployeeID=".$_REQUEST['empid']." AND AttDate='".date($Fyear.'-'.$Fmonth.'-'.$i)."'"); }
	 } 
	} //for($i=$Fday; $i<=$Tday; $i++) 
   } //if($Fmonth==$Tmonth)
  
   elseif($Fmonth!=$Tmonth AND $Fyear==$Tyear)
   { 
    for($i=$Fday; $i<=$DateFmonth; $i++) 
	{ 
	 if(date("w",strtotime(date($Fyear.'-'.$Fmonth.'-'.$i)))!=0) 
	 { 
	  $Sql=mysqli_query($con, $subQry." AttDate='".date($Fyear."-".$Fmonth."-".$i)."'"); $row=mysqli_num_rows($Sql);
	  $Sql2=mysqli_query($con, $subQry2." AttDate='".date($Fyear."-".$Fmonth."-".$i)."'"); $row2=mysqli_num_rows($Sql2);
      if($row==0){ $sIns=mysqli_query($con, "insert into hrm_employee_attendance(EmployeeID,AttValue,AttDate,Year)values(".$_REQUEST['empid'].",'".$_REQUEST['LeaveType']."','".date($Fyear.'-'.$Fmonth.'-'.$i)."','".$Fyear."')"); }
      elseif($row>0 AND $row2==0){ $sIns=mysqli_query($con, "UPDATE hrm_employee_attendance SET AttValue='".$_REQUEST['LeaveType']."' where EmployeeID=".$_REQUEST['empid']." AND AttDate='".date($Fyear.'-'.$Fmonth.'-'.$i)."'"); }
	 }     
	 elseif(date("w",strtotime(date($Fyear.'-'.$Fmonth.'-'.$i)))==0 AND $_REQUEST['LeaveType']=='EL') 
	 { 
	  $Sql=mysqli_query($con, $subQry." AttDate='".date($Fyear."-".$Fmonth."-".$i)."'"); $row=mysqli_num_rows($Sql);
	  $Sql2=mysqli_query($con, $subQry2." AttDate='".date($Fyear."-".$Fmonth."-".$i)."'"); $row2=mysqli_num_rows($Sql2); 
      if($row==0){ $sIns=mysqli_query($con, "insert into hrm_employee_attendance(EmployeeID, AttValue, AttDate, CheckSunday, Year)values(".$_REQUEST['empid'].",'".$_REQUEST['LeaveType']."','".date($Fyear.'-'.$Fmonth.'-'.$i)."','Y','".$Fyear."')"); }
      elseif($row>0 AND $row2==0){ $sIns=mysqli_query($con, "UPDATE hrm_employee_attendance SET AttValue='".$_REQUEST['LeaveType']."',CheckSunday='Y' where EmployeeID=".$_REQUEST['empid']." AND AttDate='".date($Fyear.'-'.$Fmonth.'-'.$i)."'"); }
	 }     
	} //for($i=$Fday; $i<=$DateFmonth; $i++)  
	
	for($i=1; $i<=$Tday; $i++) 
	{ 
	 if(date("w",strtotime(date($Fyear.'-'.$Tmonth.'-'.$i)))!=0) 
	 { 
	  $Sql=mysqli_query($con, $subQry." AttDate='".date($Fyear."-".$Fmonth."-".$i)."'"); $row=mysqli_num_rows($Sql);
	  $Sql2=mysqli_query($con, $subQry2." AttDate='".date($Fyear."-".$Fmonth."-".$i)."'"); $row2=mysqli_num_rows($Sql2); 
      if($row==0){ $sIns=mysqli_query($con, "insert into hrm_employee_attendance(EmployeeID,AttValue,AttDate,Year)values(".$_REQUEST['empid'].",'".$_REQUEST['LeaveType']."','".date($Fyear.'-'.$Tmonth.'-'.$i)."','".$Fyear."')"); }
      elseif($row>0 AND $row2==0){ $sIns=mysqli_query($con, "UPDATE hrm_employee_attendance SET AttValue='".$_REQUEST['LeaveType']."' where EmployeeID=".$_REQUEST['empid']." AND AttDate='".date($Fyear.'-'.$Tmonth.'-'.$i)."'"); }
	 } 
	 elseif(date("w",strtotime(date($Fyear.'-'.$Tmonth.'-'.$i)))==0 AND $_REQUEST['LeaveType']=='EL') 
	 { 
	  $Sql=mysqli_query($con, $subQry." AttDate='".date($Fyear."-".$Fmonth."-".$i)."'"); $row=mysqli_num_rows($Sql);
	  $Sql2=mysqli_query($con, $subQry2." AttDate='".date($Fyear."-".$Fmonth."-".$i)."'"); $row2=mysqli_num_rows($Sql2); 
      if($row==0){ $sIns=mysqli_query($con, "insert into hrm_employee_attendance(EmployeeID, AttValue, AttDate, CheckSunday, Year)values(".$_REQUEST['empid'].",'".$_REQUEST['LeaveType']."','".date($Fyear.'-'.$Tmonth.'-'.$i)."','Y','".$Fyear."')"); }
      elseif($row>0 AND $row2==0){ $sIns=mysqli_query($con, "UPDATE hrm_employee_attendance SET AttValue='".$_REQUEST['LeaveType']."',CheckSunday='Y' where EmployeeID=".$_REQUEST['empid']." AND AttDate='".date($Fyear.'-'.$Tmonth.'-'.$i)."'"); }
	 } 
	} //for($i=1; $i<=$Tday; $i++)  
   } //elseif($Fmonth!=$Tmonth AND $Fyear==$Tyear)
	 
   elseif($Fmonth!=$Tmonth AND $Fyear!=$Tyear)
   {
    for($i=$Fday; $i<=$DateFmonth; $i++) 
    { 
	 if(date("w",strtotime(date($Fyear.'-'.$Fmonth.'-'.$i)))!=0) 
	 { 
	  $Sql=mysqli_query($con, $subQry." AttDate='".date($Fyear."-".$Fmonth."-".$i)."'"); $row=mysqli_num_rows($Sql);
	  $Sql2=mysqli_query($con, $subQry2." AttDate='".date($Fyear."-".$Fmonth."-".$i)."'"); $row2=mysqli_num_rows($Sql2);
      if($row==0){ $sIns=mysqli_query($con, "insert into hrm_employee_attendance(EmployeeID,AttValue,AttDate,Year)values(".$_REQUEST['empid'].",'".$_REQUEST['LeaveType']."','".date($Fyear.'-'.$Fmonth.'-'.$i)."','".$Fyear."')"); }
       elseif($row>0 AND $row2==0){ $sIns=mysqli_query($con, "UPDATE hrm_employee_attendance SET AttValue='".$_REQUEST['LeaveType']."' where EmployeeID=".$_REQUEST['empid']." AND AttDate='".date($Fyear.'-'.$Fmonth.'-'.$i)."'"); }
	  } 
	  elseif(date("w",strtotime(date($Fyear.'-'.$Fmonth.'-'.$i)))==0 AND $_REQUEST['LeaveType']=='EL') 
	  { 
	   $Sql=mysqli_query($con, $subQry." AttDate='".date($Fyear."-".$Fmonth."-".$i)."'"); $row=mysqli_num_rows($Sql);
	   $Sql2=mysqli_query($con, $subQry2." AttDate='".date($Fyear."-".$Fmonth."-".$i)."'"); $row2=mysqli_num_rows($Sql2);
       if($row==0){ $sIns=mysqli_query($con, "insert into hrm_employee_attendance(EmployeeID, AttValue, AttDate, CheckSunday, Year)values(".$_REQUEST['empid'].",'".$_REQUEST['LeaveType']."','".date($Fyear.'-'.$Fmonth.'-'.$i)."','Y','".$Fyear."')"); }
       elseif($row>0 AND $row2==0){ $sIns=mysqli_query($con, "UPDATE hrm_employee_attendance SET AttValue='".$_REQUEST['LeaveType']."',CheckSunday='Y' where EmployeeID=".$_REQUEST['empid']." AND AttDate='".date($Fyear.'-'.$Fmonth.'-'.$i)."'"); }
	  } 
	} //for($i=$Fday; $i<=$DateFmonth; $i++) 
	    
	for($i=1; $i<=$Tday; $i++) 
	{ 
	 if(date("w",strtotime(date($Tyear.'-'.$Tmonth.'-'.$i)))!=0) 
	 { 
	  $Sql=mysqli_query($con, $subQry." AttDate='".date($Fyear."-".$Fmonth."-".$i)."'"); $row=mysqli_num_rows($Sql);
	  $Sql2=mysqli_query($con, $subQry2." AttDate='".date($Fyear."-".$Fmonth."-".$i)."'"); $row2=mysqli_num_rows($Sql2); 
      if($row==0){ $sIns=mysqli_query($con, "insert into hrm_employee_attendance(EmployeeID,AttValue,AttDate,Year)values(".$_REQUEST['empid'].",'".$_REQUEST['LeaveType']."','".date($Tyear.'-'.$Tmonth.'-'.$i)."','".$Tyear."')"); }
      elseif($row>0 AND $row2==0){ $sIns=mysqli_query($con, "UPDATE hrm_employee_attendance SET AttValue='".$_REQUEST['LeaveType']."' where EmployeeID=".$_REQUEST['empid']." AND AttDate='".date($Tyear.'-'.$Tmonth.'-'.$i)."'"); }
	 }  
	 else if(date("w",strtotime(date($Tyear.'-'.$Tmonth.'-'.$i)))==0 AND $_REQUEST['LeaveType']=='EL') 
	 { 
	  $Sql=mysqli_query($con, $subQry." AttDate='".date($Fyear."-".$Fmonth."-".$i)."'"); $row=mysqli_num_rows($Sql);
	  $Sql2=mysqli_query($con, $subQry2." AttDate='".date($Fyear."-".$Fmonth."-".$i)."'"); $row2=mysqli_num_rows($Sql2); 
      if($row==0){ $sIns=mysqli_query($con, "insert into hrm_employee_attendance(EmployeeID, AttValue, AttDate, CheckSunday, Year)values(".$_REQUEST['empid'].",'".$_REQUEST['LeaveType']."','".date($Tyear.'-'.$Tmonth.'-'.$i)."','Y','".$Tyear."')"); }
      elseif($row>0 AND $row2==0){ $sIns=mysqli_query($con, "UPDATE hrm_employee_attendance SET AttValue='".$_REQUEST['LeaveType']."',CheckSunday='Y' where EmployeeID=".$_REQUEST['empid']." AND AttDate='".date($Tyear.'-'.$Tmonth.'-'.$i)."'"); }
	 }  
	} //for($i=1; $i<=$Tday; $i++)     
   } //elseif($Fmonth!=$Tmonth AND $Fyear!=$Tyear)
  
   //____________________________  Close ______________________________________________//
   //____________________________  Close ______________________________________________//
  

 //**************** Update hrm_employee_leave Table OPEN*********************// 
 //**************** Update hrm_employee_leave Table OPEN*********************//  
 if($sIns)
 { 
  $m=date("m");	$id=$_REQUEST['empid']; $day=date("t",strtotime(date($FDate)));
  $Q1="from hrm_employee_attendance where";
  $Q2="EmployeeID=".$id." AND AttDate between '".date("Y-".$m."-1")."' AND '".date("Y-".$m."-".$day)."' ";
  
  $SqlCL=mysqli_query($con, "select count(AttValue)as CL ".$Q1." AttValue='CL' AND ".$Q2);  
  $SqlCH=mysqli_query($con, "select count(AttValue)as CH from hrm_employee_attendance where AttValue='CH' AND ".$Q2);
  $SqlSL=mysqli_query($con, "select count(AttValue)as SL from hrm_employee_attendance where AttValue='SL' AND ".$Q2);
  $SqlSH=mysqli_query($con, "select count(AttValue)as SH from hrm_employee_attendance where AttValue='SH' AND ".$Q2);
  $SqlPL=mysqli_query($con, "select count(AttValue)as PL from hrm_employee_attendance where AttValue='PL' AND ".$Q2);
  $SqlEL=mysqli_query($con, "select count(AttValue)as EL from hrm_employee_attendance where AttValue='EL' AND ".$Q2);
  $SqlFL=mysqli_query($con, "select count(AttValue)as FL from hrm_employee_attendance where AttValue='FL' AND ".$Q2);
  $SqlTL=mysqli_query($con, "select count(AttValue)as TL from hrm_employee_attendance where AttValue='TL' AND ".$Q2);
  $SqlHf=mysqli_query($con, "select count(AttValue)as Hf from hrm_employee_attendance where AttValue='HF' AND ".$Q2);
  $SqlPresent=mysqli_query($con, "select count(AttValue)as Present ".$Q1." AttValue='P' ".$Q2);
  $SqlAbsent=mysqli_query($con, "select count(AttValue)as Absent ".$Q1." AttValue='A' ".$Q2);
  $SqlOnDuties=mysqli_query($con, "select count(AttValue)as OnDuties ".$Q1." AttValue='OD' ".$Q2);
  $SqlHoliday=mysqli_query($con, "select count(AttValue)as Holiday ".$Q1." AttValue='HO' ".$Q2); 
  $SqlELSun=mysqli_query($con, "select count(CheckSunday)as SUN ".$Q1." CheckSunday='Y' ".$Q2); 

  $ResCL=mysqli_fetch_array($SqlCL); $ResCH=mysqli_fetch_array($SqlCH); $ResSL=mysqli_fetch_array($SqlSL); 
  $ResSH=mysqli_fetch_array($SqlSH); $ResPL=mysqli_fetch_array($SqlPL); $ResEL=mysqli_fetch_array($SqlEL); 
  $ResFL=mysqli_fetch_array($SqlFL); $ResTL=mysqli_fetch_array($SqlTL); $ResHf=mysqli_fetch_array($SqlHf); 
  $ResPresent=mysqli_fetch_array($SqlPresent); $ResAbsent=mysqli_fetch_array($SqlAbsent); 
  $ResOnDuties=mysqli_fetch_array($SqlOnDuties); $ResHoliday=mysqli_fetch_array($SqlHoliday); 
  $ResELSun=mysqli_fetch_array($SqlELSun);

  $CountCL=$ResCL['CL']; $CountCH=$ResCH['CH']/2; $TotalCL=$CountCL+$CountCH; $CountSL=$ResSL['SL']; 
  $CountSH=$ResSH['SH']/2; $TotalSL=$CountSL+$CountSH; $TotalPL=$ResPL['PL']; $TotalEL=$ResEL['EL']; 
  $TotalFL=$ResFL['FL']; $TotalTL=$ResTL['TL']; $TotalLeaveCount=$TotalCL+$TotalSL+$TotalPL+$TotalEL+$TotalFL+$TotalTL; 
  $TotELSun=$ResELSun['SUN']; $CountHf=$ResHf['Hf']/2;  
  $TotalPR=$ResPresent['Present']+$CountCH+$CountSH+$CountHf; //$TotalPR=$ResPresent['Present']+$CountHf;  
  $TotalAbsent=$ResAbsent['Absent']+$CountHf;
  $TotalOnDuties=$ResOnDuties['OnDuties']; $TotalHoliday=$ResHoliday['Holiday']; 
  $TotalDayWithSunEL=$TotalPR+$TotalLeaveCount+$TotalOnDuties+$TotalHoliday;
  $TotalPaidDay=$TotalDayWithSunEL-$TotELSun;
  $TotalWorkingDay=26;
  
  /**************** hrm_employee_monthlyleave_balance open************************/ 
  /**************** hrm_employee_monthlyleave_balance open************************/
  $SL=mysqli_query($con, "select * from hrm_employee_monthlyleave_balance where EmployeeID=".$id." AND Month='".$m."' AND Year='".date("Y")."'"); $RowL=mysqli_num_rows($SL);
  if($RowL>0)
  { 
   $RL=mysqli_fetch_assoc($SL);   
   if($m!=1){ $TotBalCL=$RL['OpeningCL']-$TotalCL; $TotBalSL=$RL['OpeningSL']-$TotalSL; $TotBalPL=$RL['OpeningPL']-$TotalPL;  $TotBalEL=$RL['OpeningEL']-$TotalEL; $TotBalFL=$RL['OpeningOL']-$TotalFL; }  
   if($m==1){ $TotBalCL=$RL['TotCL']-$TotalCL;  $TotBalSL=$RL['TotSL']-$TotalSL; $TotBalPL=$RL['TotPL']-$TotalPL;  $TotBalEL=$RL['TotEL']-$TotalEL; $TotBalFL=$RL['TotOL']-$TotalFL; }
	                
   $sUpL=mysqli_query($con, "UPDATE hrm_employee_monthlyleave_balance set AvailedCL='".$TotalCL."', AvailedSL='".$TotalSL."', AvailedPL='".$TotalPL."', AvailedEL='".$TotalEL."', AvailedOL='".$TotalFL."', AvailedTL='".$TotalTL."', BalanceCL='".$TotBalCL."', BalanceSL='".$TotBalSL."', BalancePL='".$TotBalPL."', BalanceEL='".$TotBalEL."', BalanceOL='".$TotBalFL."' where EmployeeID=".$id." AND Month='".$m."' AND Year='".date("Y")."'"); }
  /**************** hrm_employee_monthlyleave_balance open************************/ 
  /**************** hrm_employee_monthlyleave_balance open************************/
  
  if($_REQUEST['App']!=$_REQUEST['Rev'])
  { $sqlUp=mysqli_query($con, "update hrm_employee_applyleave set LeaveStatus=".$_REQUEST['v'].", LeaveAppStatus=".$_REQUEST['v'].", LeaveAppUpDate='".date("Y-m-d")."' where ApplyLeaveId=".$_REQUEST['ApplyLeaveId']); }
  elseif($_REQUEST['App']==$_REQUEST['Rev']) { $sqlUp=mysqli_query($con, "update hrm_employee_applyleave set LeaveStatus=".$_REQUEST['v'].", LeaveAppStatus=".$_REQUEST['v'].", LeaveAppUpDate='".date("Y-m-d")."', LeaveHodStatus=".$_REQUEST['v'].", LeaveHodUpDate='".date("Y-m-d")."' where ApplyLeaveId=".$_REQUEST['ApplyLeaveId']); }
   if($sqlUp)
   {
     if($_REQUEST['v']==2 AND $resE['EmailId_Vnr']!='')
     {
      //$email_to = $resE['EmailId_Vnr'];
      //$email_from='admin@vnrseeds.co.in';
      $email_subject = "Leave Approved"; 
      //$headers = "From: $email_from ". "\r\n"; 
      //$semi_rand = md5(time()); 
      //$headers .= "MIME-Version: 1.0\r\n";
      //$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
      $email_message .="<html><head></head><body>";
      $email_message .= "Dear <b>".$NameE."</b> <br><br>\n\n\n";
      $email_message .=" Your leave request for ".$_REQUEST['LeaveType'].", from date ".$FromDate." to ".$ToDate." approved, for details, go to ESS.<br><br>\n\n";
      $email_message .= "From <br><b>ADMIN ESS</b><br>";
      $email_message .="</body></html>";	      
      //$ok = @mail($email_to, $email_subject, $email_message, $headers);
      
       $subject=$email_subject;
       $body=$email_message;
       $email_to=$resE['EmailId_Vnr'];
       require 'vendor/mail_admin.php';
      
     }  
     
	 echo json_encode(array("Code" => "300", "msg" => "Leave Approved Successfully!") );
	 
	 /************ Firbase *******************/
      /************ Firbase *******************/
      if($resE['tokenid']!='')
      {  
         include "firebase_api.php";
         $user_token = $resE['tokenid']; 
      }
      elseif($resE['tokenid_ios']!='')
      {  
         
         include "firebase_ios_api.php"; 
         $user_token = $resE['tokenid_ios'];
      }
      
      //$user_token=[];
      //$user_token[] = $resE['tokenid'];
      $data1['subject'] = 'Leave Approved';
      
      $data1['msg_body'] = " Your leave request for ".$_REQUEST['LeaveType'].", from date ".$FromDate." to ".$ToDate." approved.";
	  android($data1,$user_token);
	  /************ Firbase *******************/
	  /************ Firbase *******************/
	 
   }
 }
 else {$msg='Error...';}

 //**************** Update hrm_employee_leave Table CLOSE *********************// 
 //**************** Update hrm_employee_leave Table CLOSE *********************//  
   
    /**************************----------****************************/  
    /**************************----------****************************/
   /* } */ //else
   
   
   
   
  } //if($_REQUEST['v']==2)
  
  elseif($_REQUEST['v']==3)
  {
    if($_REQUEST['App']!=$_REQUEST['Rev'])
    { $sqlUpPen=mysqli_query($con, "update hrm_employee_applyleave set LeaveStatus=".$_REQUEST['v'].", LeaveAppStatus=".$_REQUEST['v'].", LeaveAppUpDate='".date("Y-m-d")."' where ApplyLeaveId=".$_REQUEST['ApplyLeaveId']); }
	elseif($_REQUEST['App']==$_REQUEST['Rev']) { $sqlUpPen=mysqli_query($con, "update hrm_employee_applyleave set LeaveStatus=".$_REQUEST['v'].", LeaveAppStatus=".$_REQUEST['v'].", LeaveAppUpDate='".date("Y-m-d")."', LeaveHodStatus=".$_REQUEST['v'].", LeaveHodUpDate='".date("Y-m-d")."' where ApplyLeaveId=".$_REQUEST['ApplyLeaveId']); }
    if($sqlUpPen)
	{ 
	 if($_REQUEST['v']==2 AND $resE['EmailId_Vnr']!='')
     {
      //$email_to = $resE['EmailId_Vnr'];
      //$email_from='admin@vnrseeds.co.in';
      $email_subject = "Leave Rejected"; 
      //$headers = "From: $email_from ". "\r\n";
      //$semi_rand = md5(time()); 
      //$headers .= "MIME-Version: 1.0\r\n";
      //$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
      $email_message .="<html><head></head><body>";
      $email_message .= "Dear <b>".$NameE."</b> <br><br>\n\n\n";
      $email_message .=" Your leave request for ".$_REQUEST['LeaveType'].", from date ".$FromDate." to ".$ToDate." rejected, for details, go to ESS.<br><br>\n\n";
      $email_message .= "From <br><b>ADMIN ESS</b><br>";
      $email_message .="</body></html>";	      
      //$ok = @mail($email_to, $email_subject, $email_message, $headers);
      
       $subject=$email_subject;
       $body=$email_message;
       $email_to=$resE['EmailId_Vnr'];
       require 'vendor/mail_admin.php';
      
     }  
	 echo json_encode(array("Code" => "300", "msg" => "Leave Rejected Successfully!") ); 
	 
	 /************ Firbase *******************/
      /************ Firbase *******************/
      if($resE['tokenid']!='')
      {  
         
         include "firebase_api.php";
         $user_token = $resE['tokenid']; 
      }
      elseif($resE['tokenid_ios']!='')
      {  
         
         include "firebase_ios_api.php"; 
         $user_token = $resE['tokenid_ios'];
      }
      
      //$user_token=[];
      //$user_token[] = $resE['tokenid'];
      $data1['subject'] = 'Leave Rejected';
      
      $data1['msg_body'] = " Your leave request for ".$_REQUEST['LeaveType'].", from date ".$FromDate." to ".$ToDate." rejected.";
	  android($data1,$user_token);
	  /************ Firbase *******************/
	  /************ Firbase *******************/
	 
	 
	}
  }
   
}



//Leave Delete Request
elseif($_REQUEST['value'] == 'TLeave_Req_Delete' AND $_REQUEST['ApplyLeaveId']>0 AND $_REQUEST['empid']!='' AND $_REQUEST['empid']>0 AND $_REQUEST['FromDate']!='' AND $_REQUEST['ToDate']!='' AND $_REQUEST['LeaveType']!='' AND $_REQUEST['App']!='')
{ 
 
  $SqlDelete=mysqli_query($con, "delete from hrm_employee_applyleave where ApplyLeaveId=".$_REQUEST['ApplyLeaveId']);
  if($SqlDelete)
  {
    $sqlEmp=mysqli_query($con,"select Fname,Sname,Lname from hrm_employee where EmployeeID=".$_REQUEST['empid']);    
	$resEmp=mysqli_fetch_assoc($sqlEmp); $emp=$resEmp['Fname'].' '.$resEmp['Sname'].' '.$resEmp['Lname'];
    //$email_to = 'vspl.attendance@gmail.com'; //vspl.hr@vnrseeds.com
    //$email_from='admin@vnrseeds.co.in';
    $email_subject = "Delete Leave Application";
    //$headers = "From: $email_from ". "\r\n"; 
    $email_message .=$emp." has deleted leave application for ".$_REQUEST['LeaveType'].", from ".date("d-m-Y",strtotime($_REQUEST['FromDate']))." to ".date("d-m-Y",strtotime($_REQUEST['ToDate'])).". \n\n";
    //$ok = @mail($email_to, $email_subject, $email_message, $headers);
    
       $subject=$email_subject;
       $body=$email_message;
       $email_to='vspl.attendance@gmail.com';
       require 'vendor/mail_admin.php';
  
    echo json_encode(array("Code" => "300", "msg" => "Leave Deleted Successfully!") ); 
  }
  else
  {
    echo json_encode(array("Code" => "100", "msg" => "Error!") ); 
  }
 
}


//Leave Cancel Request
elseif($_REQUEST['value'] == 'TLeave_Req_Cancel' AND $_REQUEST['ApplyLeaveId']>0 AND $_REQUEST['empid']!='' AND $_REQUEST['empid']>0 AND $_REQUEST['FromDate']!='' AND $_REQUEST['ToDate']!='' AND $_REQUEST['LeaveType']!='' AND $_REQUEST['CancelReason']!='' AND $_REQUEST['App']!='')
{ 
 
  $sqlUpRep=mysqli_query($con, "update hrm_employee_applyleave set LeaveEmpCancelStatus='Y', LeaveEmpCancelDate='".date("Y-m-d")."', LeaveEmpCancelReason='".$_REQUEST['CancelReason']."' where ApplyLeaveId=".$_REQUEST['ApplyLeaveId']); 
  if($sqlUpRep)
  {   
    $sqlEmp=mysqli_query($con,"select Fname,Sname,Lname from hrm_employee where EmployeeID=".$_REQUEST['empid']);    
    $resEmp=mysqli_fetch_assoc($sqlEmp); $emp=$resEmp['Fname'].' '.$resEmp['Sname'].' '.$resEmp['Lname'];
    $sqlRep=mysqli_query($con,"select EmailId_Vnr,tokenid,tokenid_ios from hrm_employee_general g inner join hrm_employee e on g.EmployeeID=e.EmployeeID where g.EmployeeID=".$_REQUEST['App']);    
    $resRep=mysqli_fetch_assoc($sqlRep);
    if($resRep['EmailId_Vnr']!='')
    {
    // $email_to = $resRep['EmailId_Vnr'];
    // $email_from='admin@vnrseeds.co.in';
     $email_subject = "Cancel Leave Application";
     //$headers = "From: $email_from ". "\r\n";
     $email_message .= $emp." has submitted cancel leave application for ".$_REQUEST['LeaveType']." from ".$_REQUEST['FromDate']." to ".$_REQUEST['ToDate'].", for your approval kindly log on to ESS. \n\n"; 
     //$ok = @mail($email_to, $email_subject, $email_message, $header);
     
       $subject=$email_subject;
       $body=$email_message;
       $email_to=$resRep['EmailId_Vnr'];
       require 'vendor/mail_admin.php';
     
    }
    
     /************ Firbase *******************/
      /************ Firbase *******************/
      if($resRep['tokenid']!='')
      {  
         
         include "firebase_api.php";
         $user_token = $resRep['tokenid']; 
      }
      elseif($resRep['tokenid_ios']!='')
      {  
         
         include "firebase_ios_api.php"; 
         $user_token = $resRep['tokenid_ios'];
      }
      
      //$user_token=[];
      //$user_token[] = $resRep['tokenid'];
      $data1['subject'] = 'Cancel Leave Application';
      
      $data1['msg_body'] = $emp." has submitted cancel leave application for ".$_REQUEST['LeaveType']." from ".$_REQUEST['FromDate']." to ".$_REQUEST['ToDate']."";
	  android($data1,$user_token);
	  /************ Firbase *******************/
	  /************ Firbase *******************/
    
    

     //$email_to2 = 'vspl.hr@vnrseeds.com';
     //$email_from='admin@vnrseeds.co.in';
     $email_subject2 = "Cancel Leave Application";
     //$headers = "From: $email_from ". "\r\n";
     $email_message2 .= $_REQUEST['Ename']." has submitted cancel leave application for ".$_REQUEST['LeaveType']." from ".$_REQUEST['FromDate']." to ".$_REQUEST['ToDate'].", for your details kindly log on to ESS. \n\n";
     //$ok = @mail($email_to2, $email_subject2, $email_message2, $headers);
     
       $subject=$email_subject2;
       $body=$email_message2;
       $email_to='vspl.hr@vnrseeds.com';
       require 'vendor/mail_admin.php';
	 
	 echo json_encode(array("Code" => "300", "msg" => "Request Sent Successfully!") ); 
   
  }
  else
  {
     echo json_encode(array("Code" => "100", "msg" => "Error!") ); 
  } 
  
 
}



//Approval/Reject For Leave cancel request
elseif($_REQUEST['value'] == 'TLeave_CancelReq_Action' AND $_REQUEST['ApplyLeaveId'] AND $_REQUEST['ApplyLeaveId']!='' AND $_REQUEST['empid']!='' AND $_REQUEST['empid']>0 AND $_REQUEST['FromDate']!='' AND $_REQUEST['ToDate']!='' AND $_REQUEST['LeaveType']!='')
{

 $Fday=date("d",strtotime($_REQUEST['FromDate'])); $Fmonth=date("m",strtotime($_REQUEST['FromDate'])); 
 $Fyear=date("Y",strtotime($_REQUEST['FromDate']));
 $Tday=date("d",strtotime($_REQUEST['ToDate'])); $Tmonth=date("m",strtotime($_REQUEST['ToDate'])); 
 $Tyear=date("Y",strtotime($_REQUEST['ToDate']));
 $startTimeStamp = strtotime($_REQUEST['FromDate']); $endTimeStamp = strtotime($_REQUEST['ToDate']);
 $DateFmonth=date("t",strtotime($_REQUEST['FromDate'])); $day=date("t",strtotime($_REQUEST['FromDate']));
  
 $sql=mysqli_query($con, "select LeaveStatus from hrm_employee_applyleave where ApplyLeaveId=".$_REQUEST['ApplyLeaveId']); 
 $res=mysqli_fetch_assoc($sql);
 if($res['LeaveStatus']!=2)
 { 
   $sqlUp=mysqli_query($con, "update hrm_employee_applyleave set LeaveCancelStatus='Y', LeaveStatus=4 where ApplyLeaveId=".$_REQUEST['ApplyLeaveId']); 
   if($sqlUp)
   { 
    echo json_encode(array("Code" => "300", "msg" => "Leave canceled successfully!") );
   }
   else{ echo json_encode(array("Code" => "100", "msg" => "Error-1!") ); }
 }
 elseif($res['LeaveStatus']==2) 
 {
     
  $sqlUp=mysqli_query($con, "update hrm_employee_applyleave set LeaveCancelStatus='Y' where ApplyLeaveId=".$_REQUEST['ApplyLeaveId']);   
     
 /********************************************************************************/
 /********************************************************************************/
  
  //____________________________  Open ______________________________________________//
  //____________________________  Open ______________________________________________//	
  if($Fmonth==$Tmonth) 
  { for($i=$Fday; $i<=$Tday; $i++) 
    { if(date("w",strtotime(date($Fyear.'-'.$Fmonth.'-'.$i)))!=0) 
	  { 
       $sIns=mysqli_query($con, "delete from hrm_employee_attendance where AttValue='".$_REQUEST['LeaveType']."' AND EmployeeID=".$_REQUEST['empid']." AND AttDate='".date($Fyear.'-'.$Fmonth.'-'.$i)."'");
	  } 
	  elseif(date("w",strtotime(date($Fyear.'-'.$Fmonth.'-'.$i)))==0 AND $_REQUEST['LeaveType']=='EL') 
	  { 
       $sIns=mysqli_query($con, "delete from hrm_employee_attendance where AttValue='".$_REQUEST['LeaveType']."' AND EmployeeID=".$_REQUEST['empid']." AND AttDate='".date($Fyear.'-'.$Fmonth.'-'.$i)."'");
	  } 
    }  
  }
  
  elseif($Fmonth!=$Tmonth AND $Fyear==$Tyear)
  { for($i=$Fday; $i<=$DateFmonth; $i++) 
	{ if(date("w",strtotime(date($Fyear.'-'.$Fmonth.'-'.$i)))!=0) 
	  { 
        $sIns=mysqli_query($con, "delete from hrm_employee_attendance where AttValue='".$_REQUEST['LeaveType']."' AND EmployeeID=".$_REQUEST['empid']." AND AttDate='".date($Fyear.'-'.$Fmonth.'-'.$i)."'"); 
	  }    
	  elseif(date("w",strtotime(date($Fyear.'-'.$Fmonth.'-'.$i)))==0 AND $_REQUEST['LeaveType']=='EL') 
	  { 
        $sIns=mysqli_query($con, "delete from hrm_employee_attendance where AttValue='".$_REQUEST['LeaveType']."' AND EmployeeID=".$_REQUEST['empid']." AND AttDate='".date($Fyear.'-'.$Fmonth.'-'.$i)."'"); 
	  }  
	} 
	for($i=1; $i<=$Tday; $i++) 
	{ if(date("w",strtotime(date($Fyear.'-'.$Tmonth.'-'.$i)))!=0) 
	  { 
	   $sIns=mysqli_query($con, "delete from hrm_employee_attendance where AttValue='".$_REQUEST['LeaveType']."' AND EmployeeID=".$_REQUEST['empid']." AND AttDate='".date($Fyear.'-'.$Tmonth.'-'.$i)."'"); 
	  } 
	  elseif(date("w",strtotime(date($Fyear.'-'.$Tmonth.'-'.$i)))==0 AND $_REQUEST['LeaveType']=='EL') 
	  { 
	   $sIns=mysqli_query($con, "delete from hrm_employee_attendance where AttValue='".$_REQUEST['LeaveType']."' AND EmployeeID=".$_REQUEST['empid']." AND AttDate='".date($Fyear.'-'.$Tmonth.'-'.$i)."'"); 
	  } 
	}     
  }
	 
  elseif($Fmonth!=$Tmonth AND $Fyear!=$Tyear)
  { for($i=$Fday; $i<=$DateFmonth; $i++) 
    { if(date("w",strtotime(date($Fyear.'-'.$Fmonth.'-'.$i)))!=0) 
	  { 
	   $sIns=mysqli_query($con, "delete from hrm_employee_attendance where AttValue='".$_REQUEST['LeaveType']."' AND EmployeeID=".$_REQUEST['empid']." AND AttDate='".date($Fyear.'-'.$Fmonth.'-'.$i)."'"); 
	  } 
	  elseif(date("w",strtotime(date($Fyear.'-'.$Fmonth.'-'.$i)))==0 AND $_REQUEST['LeaveType']=='EL') 
	  { 
	   $sIns=mysqli_query($con, "delete from hrm_employee_attendance where AttValue='".$_REQUEST['LeaveType']."' AND EmployeeID=".$_REQUEST['empid']." AND AttDate='".date($Fyear.'-'.$Fmonth.'-'.$i)."'"); 
	  } 
	}     
	for($i=1; $i<=$Tday; $i++) 
	{ if(date("w",strtotime(date($Tyear.'-'.$Tmonth.'-'.$i)))!=0) 
	  { 
        $sIns=mysqli_query($con, "delete from hrm_employee_attendance where AttValue='".$_REQUEST['LeaveType']."' AND EmployeeID=".$_REQUEST['empid']." AND AttDate='".date($Tyear.'-'.$Tmonth.'-'.$i)."'"); 
	  }  
	  elseif(date("w",strtotime(date($Tyear.'-'.$Tmonth.'-'.$i)))==0 AND $_REQUEST['LeaveType']=='EL') 
	  { 
        $sIns=mysqli_query($con, "delete from hrm_employee_attendance where AttValue='".$_REQUEST['LeaveType']."' AND EmployeeID=".$_REQUEST['empid']." AND AttDate='".date($Tyear.'-'.$Tmonth.'-'.$i)."'"); 
	  }  
	}    
  }
 //____________________________  Close ______________________________________________//	
 //____________________________  Close ______________________________________________//	


 //*************** Update hrm_employee_leave Table OPEN******************************//  
 if($sIns)
 {

  $m=date("m");	$id=$_REQUEST['empid']; $day=date("t",strtotime($_REQUEST['FromDate']));
  
  $Q1="from hrm_employee_attendance where";
  $Q2="EmployeeID=".$id." AND (AttDate between '".date("Y-".$m."-1")."' AND '".date("Y-".$m."-".$day)."')";

  $SqlCL=mysqli_query($con, "select count(AttValue)as CL ".$Q1." AttValue='CL' AND ".$Q2);
  $SqlCH=mysqli_query($con, "select count(AttValue)as CH ".$Q1." AttValue='CH' AND ".$Q2);
  $SqlSL=mysqli_query($con, "select count(AttValue)as SL ".$Q1." AttValue='SL' AND ".$Q2);
  $SqlSH=mysqli_query($con, "select count(AttValue)as SH ".$Q1." AttValue='SH' AND ".$Q2);
  $SqlPL=mysqli_query($con, "select count(AttValue)as PL ".$Q1." AttValue='PL' AND ".$Q2);
  $SqlEL=mysqli_query($con, "select count(AttValue)as EL ".$Q1." AttValue='EL' AND ".$Q2);
  $SqlFL=mysqli_query($con, "select count(AttValue)as FL ".$Q1." AttValue='FL' AND ".$Q2);
  $SqlTL=mysqli_query($con, "select count(AttValue)as TL ".$Q1." AttValue='TL' AND ".$Q2);
  $SqlHf=mysqli_query($con, "select count(AttValue)as Hf ".$Q1." AttValue='HF' AND ".$Q2);
  $SqlPresent=mysqli_query($con, "select count(AttValue)as Present ".$Q1." AttValue='P' AND ".$Q2);
  $SqlAbsent=mysqli_query($con, "select count(AttValue)as Absent ".$Q1." AttValue='A' AND ".$Q2);
  $SqlOnDuties=mysqli_query($con, "select count(AttValue)as OnDuties ".$Q1." AttValue='OD' AND ".$Q2);
  $SqlHoliday=mysqli_query($con, "select count(AttValue)as Holiday ".$Q1." AttValue='HO' AND ".$Q2); 
  $SqlELSun=mysqli_query($con, "select count(CheckSunday)as SUN ".$Q1." CheckSunday='Y' AND ".$Q2); 

  $ResCL=mysqli_fetch_array($SqlCL); $ResCH=mysqli_fetch_array($SqlCH); $ResSL=mysqli_fetch_array($SqlSL); 
  $ResSH=mysqli_fetch_array($SqlSH); $ResPL=mysqli_fetch_array($SqlPL); $ResEL=mysqli_fetch_array($SqlEL); 
  $ResFL=mysqli_fetch_array($SqlFL); $ResTL=mysqli_fetch_array($SqlTL); $ResHf=mysqli_fetch_array($SqlHf); 
  $ResPresent=mysqli_fetch_array($SqlPresent); $ResAbsent=mysqli_fetch_array($SqlAbsent); 
  $ResOnDuties=mysqli_fetch_array($SqlOnDuties); $ResHoliday=mysqli_fetch_array($SqlHoliday); 
  $ResELSun=mysqli_fetch_array($SqlELSun);

  $CountCL=$ResCL['CL']; $CountCH=$ResCH['CH']/2; $TotalCL=$CountCL+$CountCH; 
  $CountSL=$ResSL['SL']; $CountSH=$ResSH['SH']/2; $TotalSL=$CountSL+$CountSH;
  $TotalPL=$ResPL['PL']; $TotalEL=$ResEL['EL']; $TotalFL=$ResFL['FL']; $TotalTL=$ResTL['TL']; 
  $TotalLeaveCount=$TotalCL+$TotalSL+$TotalPL+$TotalEL+$TotalFL+$TotalTL; 
  $TotELSun=$ResELSun['SUN'];
  $CountHf=$ResHf['Hf']/2;  
  $TotalPR=$ResPresent['Present']+$CountCH+$CountSH+$CountHf; //$TotalPR=$ResPresent['Present']+$CountHf;  
  $TotalAbsent=$ResAbsent['Absent']+$CountHf;
  $TotalOnDuties=$ResOnDuties['OnDuties']; $TotalHoliday=$ResHoliday['Holiday']; 
  $TotalDayWithSunEL=$TotalPR+$TotalLeaveCount+$TotalOnDuties+$TotalHoliday;
  $TotalPaidDay=$TotalDayWithSunEL-$TotELSun;
  $TotalWorkingDay=26;
   
  /****************** hrm_employee_monthlyleave_balance open*********************************/
  $SL=mysqli_query($con, "select * from hrm_employee_monthlyleave_balance where EmployeeID=".$id." AND Month='".$m."' AND Year='".date("Y")."'");  $RowL=mysqli_num_rows($SL);
  if($RowL>0) 
  { 
    $RL=mysqli_fetch_assoc($SL);
	if($m!=1){ $TotBalCL=$RL['OpeningCL']-$TotalCL;  $TotBalSL=$RL['OpeningSL']-$TotalSL; 
	           $TotBalPL=$RL['OpeningPL']-$TotalPL;  $TotBalEL=$RL['OpeningEL']-$TotalEL;
	           $TotBalFL=$RL['OpeningOL']-$TotalFL; }  
    if($m==1){ $TotBalCL=$RL['TotCL']-$TotalCL;  $TotBalSL=$RL['TotSL']-$TotalSL; $TotBalPL=$RL['TotPL']-$TotalPL;  
	           $TotBalEL=$RL['TotEL']-$TotalEL;  $TotBalFL=$RL['TotOL']-$TotalFL; }
				  
	$sUpL=mysqli_query($con, "UPDATE hrm_employee_monthlyleave_balance set AvailedCL='".$TotalCL."', AvailedSL='".$TotalSL."', AvailedPL='".$TotalPL."', AvailedEL='".$TotalEL."', AvailedOL='".$TotalFL."', AvailedTL='".$TotalTL."', BalanceCL='".$TotBalCL."', BalanceSL='".$TotBalSL."', BalancePL='".$TotBalPL."', BalanceEL='".$TotBalEL."', BalanceOL='".$TotBalFL."' where EmployeeID=".$id." AND Month='".$m."' AND Year='".date("Y")."'"); }
   /***************** hrm_employee_monthlyleave_balance close ********************************/

    $sqlUp=mysqli_query($con, "update hrm_employee_applyleave set LeaveCancelStatus='Y', LeaveStatus=4 where ApplyLeaveId=".$_REQUEST['ApplyLeaveId']); 
	if($sqlUp)
	{
	 echo json_encode(array("Code" => "300", "msg" => "Leave canceled successfully!") ); 
	 
	 
	 $sqlE=mysqli_query($con, "select tokenid,tokenid_ios from hrm_employee where EmployeeID=".$_REQUEST['empid']); $resE=mysqli_fetch_assoc($sqlE);
	 
	  /************ Firbase *******************/
      /************ Firbase *******************/
      if($resE['tokenid']!='')
      {  
         
         include "firebase_api.php";
         $user_token = $resE['tokenid']; 
      }
      elseif($resE['tokenid_ios']!='')
      {  
         
         include "firebase_ios_api.php"; 
         $user_token = $resE['tokenid_ios'];
      }
      
      //$user_token=[];
      //$user_token[] = $resE['tokenid'];
      $data1['subject'] = 'Leave Cancellation Approved';
      $data1['msg_body'] = "Your leave cancellation request is Approved";
	  android($data1,$user_token);
	  /************ Firbase *******************/
	  /************ Firbase *******************/
	 
	}
	else
	{
	 echo json_encode(array("Code" => "100", "msg" => "Error-2!") );
	}
 
 }
 else{ echo json_encode(array("Code" => "100", "msg" => "Error-3!") ); }
 //*************************************** Update hrm_employee_leave Table CLOSE*****************// 
 //*************************************** Update hrm_employee_leave Table CLOSE*****************// 
   
 }
}




else
{
  echo json_encode( array("Code" => "100", "Msg" => "value missing!") );
}
  
 
 
 /******************************* Joining Employee Close *************************************/
 /******************************* Joining Employee Close *************************************/

?>
