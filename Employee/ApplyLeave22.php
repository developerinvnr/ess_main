<?php session_start();
if($_SESSION['login'] = true){require_once('../AdminUser/config/config.php');}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('../AdminUser/logcheck.php');
if($_SESSION['logCheckEmp']!=$logemp){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('EmpMenuSession.php');}
/******************************************************************************/
if(isset($_POST['AppLeave']))
 { $AppFromDate=date("Y-m-d",strtotime($_POST['FromDate']));  $FrDate=date("Y-m-d",strtotime($_POST['FromDate'])); $AppFromMonth=date("m",strtotime($_POST['FromDate']));  
   $AppToDate=date("Y-m-d",strtotime($_POST['ToDate'])); $ToDate=date("Y-m-d",strtotime($_POST['ToDate'])); $AppToMonth=date("m",strtotime($_POST['ToDate'])); 
   
//**************************** Previous *********************************//   
   $P1=date("Y-m-d",strtotime('-1 day', strtotime($FrDate))); $P2=date("Y-m-d",strtotime('-2 day', strtotime($FrDate))); $P3=date("Y-m-d",strtotime('-3 day', strtotime($FrDate)));
   $P4=date("Y-m-d",strtotime('-4 day', strtotime($FrDate))); $P5=date("Y-m-d",strtotime('-5 day', strtotime($FrDate))); 
   $PNum1=date("N",strtotime($P1)); $PNum2=date("N",strtotime($P2)); $PNum3=date("N",strtotime($P3)); 
  $P1HOa=mysql_query("select AttId from hrm_employee_attendance where AttValue='HO' AND EmployeeID=".$EmployeeId." AND AttDate='".$P1."'", $con); $rP1HOa=mysql_num_rows($P1HOa);
  $P2HOa=mysql_query("select AttId from hrm_employee_attendance where AttValue='HO' AND EmployeeID=".$EmployeeId." AND AttDate='".$P2."'", $con); $rP2HOa=mysql_num_rows($P2HOa);
  $P3HOa=mysql_query("select AttId from hrm_employee_attendance where AttValue='HO' AND EmployeeID=".$EmployeeId." AND AttDate='".$P3."'", $con); $rP3HOa=mysql_num_rows($P3HOa); 
  
  $P1CLa=mysql_query("select AttId from hrm_employee_attendance where AttValue='CL' AND EmployeeID=".$EmployeeId." AND AttDate='".$P1."'", $con); $rP1CLa=mysql_num_rows($P1CLa);
  $P2CLa=mysql_query("select AttId from hrm_employee_attendance where AttValue='CL' AND EmployeeID=".$EmployeeId." AND AttDate='".$P2."'", $con); $rP2CLa=mysql_num_rows($P2CLa);
  $P3CLa=mysql_query("select AttId from hrm_employee_attendance where AttValue='CL' AND EmployeeID=".$EmployeeId." AND AttDate='".$P3."'", $con); $rP3CLa=mysql_num_rows($P3CLa);
  $P4CLa=mysql_query("select AttId from hrm_employee_attendance where AttValue='CL' AND EmployeeID=".$EmployeeId." AND AttDate='".$P4."'", $con); $rP4CLa=mysql_num_rows($P4CLa);
  $P5CLa=mysql_query("select AttId from hrm_employee_attendance where AttValue='CL' AND EmployeeID=".$EmployeeId." AND AttDate='".$P5."'", $con); $rP5CLa=mysql_num_rows($P5CLa);
  $P1CHa=mysql_query("select AttId from hrm_employee_attendance where AttValue='CH' AND EmployeeID=".$EmployeeId." AND AttDate='".$P1."'", $con); $rP1CHa=mysql_num_rows($P1CHa);
  $P2CHa=mysql_query("select AttId from hrm_employee_attendance where AttValue='CH' AND EmployeeID=".$EmployeeId." AND AttDate='".$P2."'", $con); $rP2CHa=mysql_num_rows($P2CHa);
  $P3CHa=mysql_query("select AttId from hrm_employee_attendance where AttValue='CH' AND EmployeeID=".$EmployeeId." AND AttDate='".$P3."'", $con); $rP3CHa=mysql_num_rows($P3CHa);
  $P4CHa=mysql_query("select AttId from hrm_employee_attendance where AttValue='CH' AND EmployeeID=".$EmployeeId." AND AttDate='".$P4."'", $con); $rP4CHa=mysql_num_rows($P4CHa);
  $P5CHa=mysql_query("select AttId from hrm_employee_attendance where AttValue='CH' AND EmployeeID=".$EmployeeId." AND AttDate='".$P5."'", $con); $rP5CHa=mysql_num_rows($P5CHa);
  
  $P1CLp=mysql_query("select ApplyLeaveId from hrm_employee_applyleave where Leave_Type='CL' AND LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$EmployeeId." AND Apply_ToDate='".$P1."'", $con); $P2CLp=mysql_query("select ApplyLeaveId from hrm_employee_applyleave where Leave_Type='CL' AND LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$EmployeeId." AND Apply_ToDate='".$P2."'", $con); $P3CLp=mysql_query("select ApplyLeaveId from hrm_employee_applyleave where Leave_Type='CL' AND LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$EmployeeId." AND Apply_ToDate='".$P3."'", $con); $P4CLp=mysql_query("select ApplyLeaveId from hrm_employee_applyleave where Leave_Type='CL' AND LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$EmployeeId." AND Apply_ToDate='".$P4."'", $con); $P5CLp=mysql_query("select ApplyLeaveId from hrm_employee_applyleave where Leave_Type='CL' AND LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$EmployeeId." AND Apply_ToDate='".$P5."'", $con); 
	$rP1CLp=mysql_num_rows($P1CLp); $rP2CLp=mysql_num_rows($P2CLp); $rP3CLp=mysql_num_rows($P3CLp);  $rP4CLp=mysql_num_rows($P4CLp); $rP5CLp=mysql_num_rows($P5CLp);
  $P1CHp=mysql_query("select ApplyLeaveId from hrm_employee_applyleave where Leave_Type='CH' AND LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$EmployeeId." AND Apply_ToDate='".$P1."'", $con); $P2CHp=mysql_query("select ApplyLeaveId from hrm_employee_applyleave where Leave_Type='CH' AND LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$EmployeeId." AND Apply_ToDate='".$P2."'", $con); $P3CHp=mysql_query("select ApplyLeaveId from hrm_employee_applyleave where Leave_Type='CH' AND LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$EmployeeId." AND Apply_ToDate='".$P3."'", $con); $P4CHp=mysql_query("select ApplyLeaveId from hrm_employee_applyleave where Leave_Type='CH' AND LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$EmployeeId." AND Apply_ToDate='".$P4."'", $con); $P5CHp=mysql_query("select ApplyLeaveId from hrm_employee_applyleave where Leave_Type='CH' AND LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$EmployeeId." AND Apply_ToDate='".$P5."'", $con); 
  $rP1CHp=mysql_num_rows($P1CHp); $rP2CHp=mysql_num_rows($P2CHp); $rP3CHp=mysql_num_rows($P3CHp); $rP4CHp=mysql_num_rows($P4CHp); $rP5CHp=mysql_num_rows($P5CHp);
   $P1CLp1=mysql_query("select ApplyLeaveId from hrm_employee_applyleave where Leave_Type='CL' AND Apply_TotalDay=2 AND LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$EmployeeId." AND Apply_ToDate='".$P1."'", $con); $P1CLp2=mysql_query("select ApplyLeaveId from hrm_employee_applyleave where Leave_Type='CL' AND Apply_TotalDay=2 AND LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$EmployeeId." AND Apply_ToDate='".$P2."'", $con); $P1CLp3=mysql_query("select ApplyLeaveId from hrm_employee_applyleave where Leave_Type='CL' AND Apply_TotalDay=2 AND LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$EmployeeId." AND Apply_ToDate='".$P3."'", $con); 
  $rP1CLp1=mysql_num_rows($P1CLp1); $rP1CLp2=mysql_num_rows($P1CLp2); $rP1CLp3=mysql_num_rows($P1CLp3);
  
  $P1OTa=mysql_query("select AttId from hrm_employee_attendance where (AttValue='SL' OR AttValue='SH' OR AttValue='PL' OR AttValue='EL' OR AttValue='FL' OR AttValue='TL') AND EmployeeID=".$EmployeeId." AND AttDate='".$P1."'", $con);
  $P2OTa=mysql_query("select AttId from hrm_employee_attendance where (AttValue='SL' OR AttValue='SH' OR AttValue='PL' OR AttValue='EL' OR AttValue='FL' OR AttValue='TL') AND EmployeeID=".$EmployeeId." AND AttDate='".$P2."'", $con); 
  $P3OTa=mysql_query("select AttId from hrm_employee_attendance where (AttValue='SL' OR AttValue='SH' OR AttValue='PL' OR AttValue='EL' OR AttValue='FL' OR AttValue='TL') AND EmployeeID=".$EmployeeId." AND AttDate='".$P3."'", $con); 
  $P4OTa=mysql_query("select AttId from hrm_employee_attendance where (AttValue='SL' OR AttValue='SH' OR AttValue='PL' OR AttValue='EL' OR AttValue='FL' OR AttValue='TL') AND EmployeeID=".$EmployeeId." AND AttDate='".$P4."'", $con); 
  $rP1OTa=mysql_num_rows($P1OTa); $rP2OTa=mysql_num_rows($P2OTa); $rP3OTa=mysql_num_rows($P3OTa); $rP4OTa=mysql_num_rows($P4OTa);
  $P1OTp=mysql_query("select ApplyLeaveId from hrm_employee_applyleave where (Leave_Type!='CL' AND Leave_Type!='CH') AND LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$EmployeeId." AND Apply_ToDate='".$P1."'", $con); $P2OTp=mysql_query("select ApplyLeaveId from hrm_employee_applyleave where (Leave_Type!='CL' AND Leave_Type!='CH') AND LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$EmployeeId." AND Apply_ToDate='".$P2."'", $con); $P3OTp=mysql_query("select ApplyLeaveId from hrm_employee_applyleave where (Leave_Type!='CL' AND Leave_Type!='CH') AND LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$EmployeeId." AND Apply_ToDate='".$P3."'", $con); $P4OTp=mysql_query("select ApplyLeaveId from hrm_employee_applyleave where (Leave_Type!='CL' AND Leave_Type!='CH') AND LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$EmployeeId." AND Apply_ToDate='".$P4."'", $con); 
  $rP1OTp=mysql_num_rows($P1OTp); $rP2OTp=mysql_num_rows($P2OTp); $rP3OTp=mysql_num_rows($P3OTp);  $rP4OTp=mysql_num_rows($P4OTp);

//**************************** Next *********************************// 
   $N1=date("Y-m-d",strtotime('+1 day', strtotime($ToDate))); $N2=date("Y-m-d",strtotime('+2 day', strtotime($ToDate))); $N3=date("Y-m-d",strtotime('+3 day', strtotime($ToDate)));
   $N4=date("Y-m-d",strtotime('+4 day', strtotime($ToDate))); $N5=date("Y-m-d",strtotime('+5 day', strtotime($ToDate))); 
   $NNum1=date("N",strtotime($N1)); $NNum2=date("N",strtotime($N2)); $NNum3=date("N",strtotime($N3)); 
   
  $N1HOa=mysql_query("select AttId from hrm_employee_attendance where AttValue='HO' AND EmployeeID=".$EmployeeId." AND AttDate='".$N1."'", $con); $rN1HOa=mysql_num_rows($N1HOa);
  $N2HOa=mysql_query("select AttId from hrm_employee_attendance where AttValue='HO' AND EmployeeID=".$EmployeeId." AND AttDate='".$N2."'", $con); $rN2HOa=mysql_num_rows($N2HOa);
  $N3HOa=mysql_query("select AttId from hrm_employee_attendance where AttValue='HO' AND EmployeeID=".$EmployeeId." AND AttDate='".$N3."'", $con); $rN3HOa=mysql_num_rows($N3HOa); 
  
  $N1CLa=mysql_query("select AttId from hrm_employee_attendance where AttValue='CL' AND EmployeeID=".$EmployeeId." AND AttDate='".$N1."'", $con); $rN1CLa=mysql_num_rows($N1CLa);
  $N2CLa=mysql_query("select AttId from hrm_employee_attendance where AttValue='CL' AND EmployeeID=".$EmployeeId." AND AttDate='".$N2."'", $con); $rN2CLa=mysql_num_rows($N2CLa);
  $N3CLa=mysql_query("select AttId from hrm_employee_attendance where AttValue='CL' AND EmployeeID=".$EmployeeId." AND AttDate='".$N3."'", $con); $rN3CLa=mysql_num_rows($N3CLa);
  $N4CLa=mysql_query("select AttId from hrm_employee_attendance where AttValue='CL' AND EmployeeID=".$EmployeeId." AND AttDate='".$N4."'", $con); $rN4CLa=mysql_num_rows($N4CLa);
  $N5CLa=mysql_query("select AttId from hrm_employee_attendance where AttValue='CL' AND EmployeeID=".$EmployeeId." AND AttDate='".$N5."'", $con); $rN5CLa=mysql_num_rows($N5CLa);
  $N1CHa=mysql_query("select AttId from hrm_employee_attendance where AttValue='CH' AND EmployeeID=".$EmployeeId." AND AttDate='".$N1."'", $con); $rN1CHa=mysql_num_rows($N1CHa);
  $N2CHa=mysql_query("select AttId from hrm_employee_attendance where AttValue='CH' AND EmployeeID=".$EmployeeId." AND AttDate='".$N2."'", $con); $rN2CHa=mysql_num_rows($N2CHa);
  $N3CHa=mysql_query("select AttId from hrm_employee_attendance where AttValue='CH' AND EmployeeID=".$EmployeeId." AND AttDate='".$N3."'", $con); $rN3CHa=mysql_num_rows($N3CHa);
  $N4CHa=mysql_query("select AttId from hrm_employee_attendance where AttValue='CH' AND EmployeeID=".$EmployeeId." AND AttDate='".$N4."'", $con); $rN4CHa=mysql_num_rows($N4CHa);
  $N5CHa=mysql_query("select AttId from hrm_employee_attendance where AttValue='CH' AND EmployeeID=".$EmployeeId." AND AttDate='".$N5."'", $con); $rN5CHa=mysql_num_rows($N5CHa);
  
  $N1CLp=mysql_query("select ApplyLeaveId from hrm_employee_applyleave where Leave_Type='CL' AND LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$EmployeeId." AND Apply_FromDate='".$N1."'", $con); $N2CLp=mysql_query("select ApplyLeaveId from hrm_employee_applyleave where Leave_Type='CL' AND LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$EmployeeId." AND Apply_FromDate='".$N2."'", $con); $N3CLp=mysql_query("select ApplyLeaveId from hrm_employee_applyleave where Leave_Type='CL' AND LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$EmployeeId." AND Apply_FromDate='".$N3."'", $con); $N4CLp=mysql_query("select ApplyLeaveId from hrm_employee_applyleave where Leave_Type='CL' AND LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$EmployeeId." AND Apply_FromDate='".$N4."'", $con); $N5CLp=mysql_query("select ApplyLeaveId from hrm_employee_applyleave where Leave_Type='CL' AND LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$EmployeeId." AND Apply_FromDate='".$N5."'", $con); 
	$rN1CLp=mysql_num_rows($N1CLp); $rN2CLp=mysql_num_rows($N2CLp); $rN3CLp=mysql_num_rows($N3CLp);  $rN4CLp=mysql_num_rows($N4CLp); $rN5CLp=mysql_num_rows($N5CLp);
  $N1CHp=mysql_query("select ApplyLeaveId from hrm_employee_applyleave where Leave_Type='CH' AND LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$EmployeeId." AND Apply_FromDate='".$N1."'", $con); $N2CHp=mysql_query("select ApplyLeaveId from hrm_employee_applyleave where Leave_Type='CH' AND LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$EmployeeId." AND Apply_FromDate='".$N2."'", $con); $N3CHp=mysql_query("select ApplyLeaveId from hrm_employee_applyleave where Leave_Type='CH' AND LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$EmployeeId." AND Apply_FromDate='".$N3."'", $con); $N4CHp=mysql_query("select ApplyLeaveId from hrm_employee_applyleave where Leave_Type='CH' AND LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$EmployeeId." AND Apply_FromDate='".$N4."'", $con); $N5CHp=mysql_query("select ApplyLeaveId from hrm_employee_applyleave where Leave_Type='CH' AND LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$EmployeeId." AND Apply_FromDate='".$N5."'", $con); 
  $rN1CHp=mysql_num_rows($N1CHp); $rN2CHp=mysql_num_rows($N2CHp); $rN3CHp=mysql_num_rows($N3CHp); $rN4CHp=mysql_num_rows($N4CHp); $rN5CHp=mysql_num_rows($N5CHp);
  $N1CLp1=mysql_query("select ApplyLeaveId from hrm_employee_applyleave where Leave_Type='CL' AND Apply_TotalDay=2 AND LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$EmployeeId." AND Apply_FromDate='".$N1."'", $con); $N1CLp2=mysql_query("select ApplyLeaveId from hrm_employee_applyleave where Leave_Type='CL' AND Apply_TotalDay=2 AND LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$EmployeeId." AND Apply_FromDate='".$N2."'", $con); $N1CLp3=mysql_query("select ApplyLeaveId from hrm_employee_applyleave where Leave_Type='CL' AND Apply_TotalDay=2 AND LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$EmployeeId." AND Apply_FromDate='".$N3."'", $con); 
  $rN1CLp1=mysql_num_rows($N1CLp1); $rN1CLp2=mysql_num_rows($N1CLp2); $rN1CLp3=mysql_num_rows($N1CLp3);
  
  $N1OTa=mysql_query("select AttId from hrm_employee_attendance where (AttValue='SL' OR AttValue='SH' OR AttValue='PL' OR AttValue='EL' OR AttValue='FL' OR AttValue='TL') AND EmployeeID=".$EmployeeId." AND AttDate='".$N1."'", $con);
  $N2OTa=mysql_query("select AttId from hrm_employee_attendance where (AttValue='SL' OR AttValue='SH' OR AttValue='PL' OR AttValue='EL' OR AttValue='FL' OR AttValue='TL') AND EmployeeID=".$EmployeeId." AND AttDate='".$N2."'", $con); 
  $N3OTa=mysql_query("select AttId from hrm_employee_attendance where (AttValue='SL' OR AttValue='SH' OR AttValue='PL' OR AttValue='EL' OR AttValue='FL' OR AttValue='TL') AND EmployeeID=".$EmployeeId." AND AttDate='".$N3."'", $con); 
  $N4OTa=mysql_query("select AttId from hrm_employee_attendance where (AttValue='SL' OR AttValue='SH' OR AttValue='PL' OR AttValue='EL' OR AttValue='FL' OR AttValue='TL') AND EmployeeID=".$EmployeeId." AND AttDate='".$N4."'", $con); 
  $rN1OTa=mysql_num_rows($N1OTa); $rN2OTa=mysql_num_rows($N2OTa); $rN3OTa=mysql_num_rows($N3OTa); $rN4OTa=mysql_num_rows($N4OTa);
  $N1OTp=mysql_query("select ApplyLeaveId from hrm_employee_applyleave where (Leave_Type!='CL' AND Leave_Type!='CH') AND LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$EmployeeId." AND Apply_FromDate='".$N1."'", $con); $N2OTp=mysql_query("select ApplyLeaveId from hrm_employee_applyleave where (Leave_Type!='CL' AND Leave_Type!='CH') AND LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$EmployeeId." AND Apply_FromDate='".$N2."'", $con); $N3OTp=mysql_query("select ApplyLeaveId from hrm_employee_applyleave where (Leave_Type!='CL' AND Leave_Type!='CH') AND LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$EmployeeId." AND Apply_FromDate='".$N3."'", $con); $N4OTp=mysql_query("select ApplyLeaveId from hrm_employee_applyleave where (Leave_Type!='CL' AND Leave_Type!='CH') AND LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$EmployeeId." AND Apply_FromDate='".$N4."'", $con); 
  $rN1OTp=mysql_num_rows($N1OTp); $rN2OTp=mysql_num_rows($N2OTp); $rN3OTp=mysql_num_rows($N3OTp);  $rN4OTp=mysql_num_rows($N4OTp);   

$sqlH=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$EmployeeId." AND AttValue='HO' AND AttDate>='".$AppFromDate."' AND AttDate<='".$AppToDate."'", $con);
$sqlFD=mysql_query("select * from hrm_employee_applyleave where EmployeeID=".$EmployeeId." AND '".$AppFromDate."'>=Apply_FromDate AND '".$AppFromDate."'<=Apply_ToDate AND LeaveStatus!=3 AND LeaveStatus!=4", $con); $sqlTD=mysql_query("select * from hrm_employee_applyleave where EmployeeID=".$EmployeeId." AND '".$AppToDate."'>=Apply_FromDate AND '".$AppToDate."'<=Apply_ToDate AND LeaveStatus!=3 AND LeaveStatus!=4", $con); $rowH=mysql_num_rows($sqlH); $rowFD=mysql_num_rows($sqlFD); $rowTD=mysql_num_rows($sqlTD);

/* EL Combination Query Open*/
 $sqlp_a=mysql_query("select AttId from hrm_employee_attendance where (AttValue='SL' OR AttValue='SH' OR AttValue='PL' OR AttValue='FL' OR AttValue='TL') AND EmployeeID=".$EmployeeId." AND AttDate='".$P1."'", $con); $rowp_a=mysql_num_rows($sqlp_a);
  $sqlp_a2=mysql_query("select AttId from hrm_employee_attendance where (AttValue='SL' OR AttValue='SH' OR AttValue='PL' OR AttValue='FL' OR AttValue='TL') AND EmployeeID=".$EmployeeId." AND AttDate='".$P2."'", $con); $rowp_a2=mysql_num_rows($sqlp_a2);
  $sqlp_l=mysql_query("select ApplyLeaveId from hrm_employee_applyleave where (Leave_Type='SL' OR Leave_Type='SH' OR Leave_Type='PL' OR Leave_Type='FL' OR Leave_Type='TL') AND LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$EmployeeId." AND Apply_ToDate='".$P1."'", $con); $rowp_l=mysql_num_rows($sqlp_l);
  //$sqlp_l2=mysql_query("select ApplyLeaveId from hrm_employee_applyleave where (Leave_Type='SL' OR Leave_Type='SH' OR Leave_Type='PL' OR Leave_Type='FL' OR Leave_Type='TL') AND LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$EmployeeId." AND Apply_ToDate='".$P2."'", $con); $rowp_l2=mysql_num_rows($sqlp_l2);
  $sqln_a=mysql_query("select AttId from hrm_employee_attendance where (AttValue='SL' OR AttValue='SH' OR AttValue='PL' OR AttValue='FL' OR AttValue='TL') AND EmployeeID=".$EmployeeId." AND AttDate='".$N1."'", $con); $rown_a=mysql_num_rows($sqln_a);
  $sqln_a2=mysql_query("select AttId from hrm_employee_attendance where (AttValue='SL' OR AttValue='SH' OR AttValue='PL' OR AttValue='FL' OR AttValue='TL') AND EmployeeID=".$EmployeeId." AND AttDate='".$N2."'", $con); $rown_a2=mysql_num_rows($sqln_a2);
  $sqln_l=mysql_query("select ApplyLeaveId from hrm_employee_applyleave where (Leave_Type='SL' OR Leave_Type='SH' OR Leave_Type='PL' OR Leave_Type='FL' OR Leave_Type='TL') AND LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$EmployeeId." AND Apply_FromDate='".$N1."'", $con); $rown_l=mysql_num_rows($sqln_l);
  //$sqln_l2=mysql_query("select ApplyLeaveId from hrm_employee_applyleave where (Leave_Type='SL' OR Leave_Type='SH' OR Leave_Type='PL' OR Leave_Type='FL' OR Leave_Type='TL') AND LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$EmployeeId." AND Apply_FromDate='".$N2."'", $con); $rown_l2=mysql_num_rows($sqln_l2);

  $sqlp_ea=mysql_query("select AttId from hrm_employee_attendance where AttValue='EL' AND EmployeeID=".$EmployeeId." AND AttDate='".$P2."'", $con); 
  $sqlp_el=mysql_query("select ApplyLeaveId from hrm_employee_applyleave where Leave_Type='EL' AND LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$EmployeeId." AND Apply_ToDate='".$P2."'", $con); $rowp_ea=mysql_num_rows($sqlp_ea); $rowp_el=mysql_num_rows($sqlp_el);
  $sqlp_ea2=mysql_query("select AttId from hrm_employee_attendance where AttValue='EL' AND EmployeeID=".$EmployeeId." AND AttDate='".$P3."'", $con); 
  $sqlp_el2=mysql_query("select ApplyLeaveId from hrm_employee_applyleave where Leave_Type='EL' AND LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$EmployeeId." AND Apply_ToDate='".$P2."'", $con); $rowp_ea2=mysql_num_rows($sqlp_ea2); $rowp_el2=mysql_num_rows($sqlp_el2);
  $sqln_ea=mysql_query("select AttId from hrm_employee_attendance where AttValue='EL' AND EmployeeID=".$EmployeeId." AND AttDate='".$N2."'", $con); 
  $sqln_el=mysql_query("select ApplyLeaveId from hrm_employee_applyleave where Leave_Type='EL' AND LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$EmployeeId." AND Apply_FromDate='".$N2."'", $con); $rown_ea=mysql_num_rows($sqln_ea); $rown_el=mysql_num_rows($sqln_el);
  $sqln_ea2=mysql_query("select AttId from hrm_employee_attendance where AttValue='EL' AND EmployeeID=".$EmployeeId." AND AttDate='".$N3."'", $con); 
  $sqln_el2=mysql_query("select ApplyLeaveId from hrm_employee_applyleave where Leave_Type='EL' AND LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$EmployeeId." AND Apply_FromDate='".$N3."'", $con); $rown_ea2=mysql_num_rows($sqln_ea2); $rown_el2=mysql_num_rows($sqln_el2);
/* EL Combination Query Close*/

   
if($AppFromDate<date("Y-m-d") AND $AppFromMonth!=$_POST['Month']){$msg='Error : Please check your apply date.!'; }
elseif($AppFromDate==$AppToDate AND $rowH>0){ $msg='Error : Please check your apply date.!'; }  
elseif($rowFD>0 OR $rowTD>0){$msg='Error!.. Leave already applied for given date.!';}
elseif($_POST['LeaveType']=='SL' AND $AppFromDate>date("Y-m-d")){ $msg='Error!.. SL can be apply only previous & current days.!'; }
/************************************ Sunday Combined With Previous Day **********************************/  
elseif(($_POST['LeaveType']=='CL' OR $_POST['LeaveType']=='CH') AND $rP1CLa>0 AND ($PNum2==7 OR $rP2HOa>0) AND $rP3CLa>0){ $msg='Error!.. CL can be taken maximum for 2 days.'; }
elseif(($_POST['LeaveType']=='CL' OR $_POST['LeaveType']=='CH') AND $rP1CLp>0 AND ($PNum2==7 OR $rP2HOa>0) AND $rP3CLp>0){ $msg='Error!.. CL can be taken maximum for 2 days.'; }
elseif(($_POST['LeaveType']=='CL' OR $_POST['LeaveType']=='CH') AND $rP1CLp1>0){ $msg='Error!.. CL can be taken maximum for 2 days.!'; }
elseif(($_POST['LeaveType']=='CL' OR $_POST['LeaveType']=='CH') AND $rP1CLa>0 AND ($PNum2==7 OR $rP2HOa>0) AND $rP3CHa>0 AND $rP4CHa>0)
{$msg='Error!.. CL can be taken maximum for 2 days.!'; }
elseif(($_POST['LeaveType']=='CL' OR $_POST['LeaveType']=='CH') AND $rP1CLp>0 AND ($PNum2==7 OR $rP2HOa>0) AND $rP3CHp>0 AND $rP4CHp>0)
{$msg='Error!.. CL can be taken maximum for 2 days.!'; }
elseif(($_POST['LeaveType']=='CL' OR $_POST['LeaveType']=='CH') AND $rP1CHa>0 AND $rP2CHa>0 AND ($PNum3==7 OR $rP3HOa>0) AND $rP4CHa>0 AND $rP5CHa>0)
{$msg='Error!.. CL can be taken maximum for 2 days.!'; }
elseif(($_POST['LeaveType']=='CL' OR $_POST['LeaveType']=='CH') AND $rP1CHp>0 AND $rP2CHp>0 AND ($PNum3==7 OR $rP3HOa>0) AND $rP4CHp>0 AND $rP5CHp>0)
{$msg='Error!.. CL can be taken maximum for 2 days.!'; }
elseif(($_POST['LeaveType']=='CL' OR $_POST['LeaveType']=='CH') AND $rP1CHa>0 AND $rP2CLa>0 AND ($PNum3==7 OR $rP3HOa>0) AND $rP4CHa>0)
{$msg='Error!.. CL can be taken maximum for 2 days.!'; }
elseif(($_POST['LeaveType']=='CL' OR $_POST['LeaveType']=='CH') AND $rP1CHp>0 AND $rP2CLp>0 AND ($PNum3==7 OR $rP3HOa>0) AND $rP4CHp>0)
{$msg='Error!.. CL can be taken maximum for 2 days.!'; }
elseif(($_POST['LeaveType']=='CL' OR $_POST['LeaveType']=='CH') AND $rP1CHa>0 AND ($PNum2==7 OR $rP2HOa>0) AND $rP3CLa>0 AND $rP4CHa>0)
{$msg='Error!.. CL can be taken maximum for 2 days.!'; }
elseif(($_POST['LeaveType']=='CL' OR $_POST['LeaveType']=='CH') AND $rP1CHp>0 AND ($PNum2==7 OR $rP2HOa>0) AND $rP3CLp>0 AND $rP4CHp>0)
{$msg='Error!.. CL can be taken maximum for 2 days.!'; }
elseif(($_POST['LeaveType']=='CL') AND $rP1CHa>0 AND ($PNum2==7 OR $rP2HOa>0) AND $rP3CHa>0 AND $rP4CHa>0){$msg='Error!.. CL can be taken maximum for 2 days.!'; }
elseif(($_POST['LeaveType']=='CL') AND $rP1CHp>0 AND ($PNum2==7 OR $rP2HOa>0) AND $rP3CHp>0 AND $rP4CHp>0){$msg='Error!.. CL can be taken maximum for 2 days.!'; }
elseif($_POST['LeaveType']=='CL' AND ($PNum1==7 OR $rP1HOa>0) AND $rP2CLa>0 AND $rP3CHa>0){ $msg='Error!.. CL can be taken maximum for 2 days.!'; }
elseif($_POST['LeaveType']=='CL' AND ($PNum1==7 OR $rP1HOa>0) AND $rP2CLp>0 AND $rP3CHp>0){ $msg='Error!.. CL can be taken maximum for 2 days.!'; }
elseif($_POST['LeaveType']=='CL' AND ($PNum1==7 OR $rP1HOa>0) AND $rP2CHa>0 AND $rP3CLa>0){ $msg='Error!.. CL can be taken maximum for 2 days.!'; }
elseif($_POST['LeaveType']=='CL' AND ($PNum1==7 OR $rP1HOa>0) AND $rP2CHp>0 AND $rP3CLp>0){ $msg='Error!.. CL can be taken maximum for 2 days.!'; }
elseif(($_POST['LeaveType']=='CL' OR $_POST['LeaveType']=='CH') AND $rP1CLa>0 AND $rP2CLa>0){ $msg='Error!.. CL can be taken maximum for 2 days.!'; }
elseif(($_POST['LeaveType']=='CL' OR $_POST['LeaveType']=='CH') AND $rP1CLp>0 AND $rP2CLp>0){ $msg='Error!.. CL can be taken maximum for 2 days.!'; }
elseif(($_POST['LeaveType']=='CL' OR $_POST['LeaveType']=='CH') AND ($PNum1==7 OR $rP1HOa>0) AND $rP2CLa>0 AND $rP3CLa>0){ $msg='Error!.. CL can be taken maximum for 2 days.!'; }
elseif(($_POST['LeaveType']=='CL' OR $_POST['LeaveType']=='CH') AND ($PNum1==7 OR $rP1HOa>0) AND $rP2CLp>0 AND $rP3CLp>0){ $msg='Error!.. CL can be taken maximum for 2 days.!'; }
elseif(($_POST['LeaveType']=='CL' OR $_POST['LeaveType']=='CH') AND ($PNum1==7 OR $rP1HOa>0) AND ($PNum2==7 OR $rP2HOa>0) AND $rP3CLa>0 AND $rP4CLa>0)
{ $msg='Error!.. CL can be taken maximum for 2 days.!'; }
elseif(($_POST['LeaveType']=='CL' OR $_POST['LeaveType']=='CH') AND ($PNum1==7 OR $rP1HOa>0) AND ($PNum2==7 OR $rP2HOa>0) AND $rP3CLp>0 AND $rP4CLp>0)
{ $msg='Error!.. CL can be taken maximum for 2 days.!'; }
elseif(($_POST['LeaveType']=='CL' OR $_POST['LeaveType']=='CH') AND ($PNum1==7 OR $rP1HOa>0) AND ($PNum2==7 OR $rP2HOa>0) AND ($PNum3==7 OR $rP3HOa>0) AND $rP4CLa>0 AND $rP5CLa>0)
{ $msg='Error!.. CL can be taken maximum for 2 days.!'; }
elseif(($_POST['LeaveType']=='CL' OR $_POST['LeaveType']=='CH') AND ($PNum1==7 OR $rP1HOa>0) AND ($PNum2==7 OR $rP2HOa>0) AND ($PNum3==7 OR $rP3HOa>0) AND $rP4CLp>0 AND $rP5CLp>0)
{ $msg='Error!.. CL can be taken maximum for 2 days.!'; }
elseif(($_POST['LeaveType']=='CL' OR $_POST['LeaveType']=='CH') AND $rP1CLp1>0){ $msg='Error!.. CL can be taken maximum for 2 days.!'; }
elseif(($_POST['LeaveType']=='CL' OR $_POST['LeaveType']=='CH') AND ($PNum1==7 OR $rP1HOa>0) AND $rP1CLp2>0){ $msg='Error!.. CL can be taken maximum for 2 days.!'; }
elseif(($_POST['LeaveType']=='CL' OR $_POST['LeaveType']=='CH') AND ($PNum1==7 OR $rP1HOa>0) AND ($PNum2==7 OR $rP2HOa>0) AND $rP1CLp3>0)
{ $msg='Error!.. CL can be taken maximum for 2 days.!'; }
elseif(($_POST['LeaveType']!='CL' AND $_POST['LeaveType']!='CH') AND ($rP1CLa>0 OR $rP1CHa>0)){ $msg='Error : CL can not be combined with any other leave!'; }
elseif(($_POST['LeaveType']!='CL' AND $_POST['LeaveType']!='CH') AND ($rP1CLp>0 OR $rP1CHp>0)){ $msg='Error : CL can not be combined with any other leave!'; }
elseif(($_POST['LeaveType']!='CL' AND $_POST['LeaveType']!='CH') AND ($PNum1==7 OR $rP1HOa>0) AND ($rP2CHa>0 OR $rP2CLa>0)){$msg='Error:CL can not be combined with any other leave!'; }
elseif(($_POST['LeaveType']!='CL' AND $_POST['LeaveType']!='CH') AND ($PNum1==7 OR $rP1HOa>0) AND ($rP2CHp>0 OR $rP2CLp>0)){$msg='Error:CL can not be combined with any other leave!'; }
elseif(($_POST['LeaveType']!='CL' AND $_POST['LeaveType']!='CH') AND ($PNum1==7 OR $rP1HOa>0) AND ($PNum2==7 OR $rP2HOa>0) AND ($rP3CLa>0 OR $rP3CHa>0))
{ $msg='Error : CL can not be combined with any other leave!'; }
elseif(($_POST['LeaveType']!='CL' AND $_POST['LeaveType']!='CH') AND ($PNum1==7 OR $rP1HOa>0) AND ($PNum2==7 OR $rP2HOa>0) AND ($rP3CLp>0 OR $rP3CHp>0))
{ $msg='Error : CL can not be combined with any other leave!'; }
elseif(($_POST['LeaveType']!='CL' AND $_POST['LeaveType']!='CH') AND ($PNum1==7 OR $rP1HOa>0) AND ($PNum2==7 OR $rP2HOa>0) AND ($PNum3==7 OR $rP3HOa>0) AND ($rP4CLa>0 OR $rP4CHa>0))
{ $msg='Error : CL can not be combined with any other leave!'; }
elseif(($_POST['LeaveType']!='CL' AND $_POST['LeaveType']!='CH') AND ($PNum1==7 OR $rP1HOa>0) AND ($PNum2==7 OR $rP2HOa>0) AND ($PNum3==7 OR $rP3HOa>0) AND ($rP4CLp>0 OR $rP4CHp>0))
{ $msg='Error : CL can not be combined with any other leave!'; }
elseif(($_POST['LeaveType']=='CL' OR $_POST['LeaveType']=='CH') AND $rP1OTa>0){ $msg='Error : CL can not be combined with any other leave!'; }
elseif(($_POST['LeaveType']=='CL' OR $_POST['LeaveType']=='CH') AND $rP1OTp>0){ $msg='Error : CL can not be combined with any other leave!'; }
elseif(($_POST['LeaveType']=='CL' OR $_POST['LeaveType']=='CH') AND ($PNum1==7 OR $rP1HOa>0) AND $rP2OTa>0){$msg='Error:CL can not be combined with any other leave!'; }
elseif(($_POST['LeaveType']=='CL' OR $_POST['LeaveType']=='CH') AND ($PNum1==7 OR $rP1HOa>0) AND $rP2OTp>0){$msg='Error:CL can not be combined with any other leave!'; }
elseif(($_POST['LeaveType']=='CL' OR $_POST['LeaveType']=='CH') AND ($PNum1==7 OR $rP1HOa>0) AND ($PNum2==7 OR $rP2HOa>0) AND $rP3OTa>0)
{ $msg='Error : CL can not be combined with any other leave!'; }
elseif(($_POST['LeaveType']=='CL' OR $_POST['LeaveType']=='CH') AND ($PNum1==7 OR $rP1HOa>0) AND ($PNum2==7 OR $rP2HOa>0) AND $rP3OTp>0)
{ $msg='Error : CL can not be combined with any other leave!'; }
elseif(($_POST['LeaveType']=='CL' OR $_POST['LeaveType']=='CH') AND ($PNum1==7 OR $rP1HOa>0) AND ($PNum2==7 OR $rP2HOa>0) AND ($PNum3==7 OR $rP3HOa>0) AND $rP4OTa>0)
{ $msg='Error : CL can not be combined with any other leave!'; }
elseif(($_POST['LeaveType']=='CL' OR $_POST['LeaveType']=='CH') AND ($PNum1==7 OR $rP1HOa>0) AND ($PNum2==7 OR $rP2HOa>0) AND ($PNum3==7 OR $rP3HOa>0) AND $rP4OTp>0)
{ $msg='Error : CL can not be combined with any other leave!'; }

/* EL Combination Query Open*/
elseif(($_POST['LeaveType']=='EL') AND ($rowp_a>0 OR $rowp_l>0) AND ($rowp_ea>0 OR $rowp_el>0)){$msg='Error : EL can not be combined with continuously any other leave!';}
elseif(($_POST['LeaveType']=='EL') AND ($rown_a>0 OR $rown_l>0) AND ($rown_ea>0 OR $rown_el>0)){$msg='Error : EL can not be combined with continuously any other leave!';}
elseif(($_POST['LeaveType']=='EL') AND $rowp_a>0 AND $rowp_a2>0 AND ($rowp_ea2>0 OR $rowp_el2>0)){$msg='Error : EL can not be combined with continuously any other leave!';}
elseif(($_POST['LeaveType']=='EL') AND ($rown_ea2>0 OR $rown_el2>0)){$msg='Error : EL can not be combined with continuously any other leave!';}
/* EL Combination Query Close*/

/************************************ Sunday Combined With Next Day **********************************/  
elseif(($_POST['LeaveType']=='CL' OR $_POST['LeaveType']=='CH') AND $rN1CLa>0 AND ($NNum2==7 OR $rN2HOa>0) AND $rN3CLa>0){ $msg='Error!.. CL can be taken maximum for 2 days.'; }
elseif(($_POST['LeaveType']=='CL' OR $_POST['LeaveType']=='CH') AND $rN1CLp>0 AND ($NNum2==7 OR $rN2HOa>0) AND $rN3CLp>0){ $msg='Error!.. CL can be taken maximum for 2 days.'; }
elseif(($_POST['LeaveType']=='CL' OR $_POST['LeaveType']=='CH') AND $rN1CLp1>0){ $msg='Error!.. CL can be taken maximum for 2 days.!'; }
elseif(($_POST['LeaveType']=='CL' OR $_POST['LeaveType']=='CH') AND $rN1CLa>0 AND ($NNum2==7 OR $rN2HOa>0) AND $rN3CHa>0 AND $rN4CHa>0)
{$msg='Error!.. CL can be taken maximum for 2 days.!'; }
elseif(($_POST['LeaveType']=='CL' OR $_POST['LeaveType']=='CH') AND $rN1CLp>0 AND ($NNum2==7 OR $rN2HOa>0) AND $rN3CHp>0 AND $rN4CHp>0)
{$msg='Error!.. CL can be taken maximum for 2 days.!'; }
elseif(($_POST['LeaveType']=='CL' OR $_POST['LeaveType']=='CH') AND $rN1CHa>0 AND $rN2CHa>0 AND ($NNum3==7 OR $rN3HOa>0) AND $rN4CHa>0 AND $rN5CHa>0)
{$msg='Error!.. CL can be taken maximum for 2 days.!'; }
elseif(($_POST['LeaveType']=='CL' OR $_POST['LeaveType']=='CH') AND $rN1CHp>0 AND $rN2CHp>0 AND ($NNum3==7 OR $rN3HOa>0) AND $rN4CHp>0 AND $rN5CHp>0)
{$msg='Error!.. CL can be taken maximum for 2 days.!'; }
elseif(($_POST['LeaveType']=='CL' OR $_POST['LeaveType']=='CH') AND $rN1CHa>0 AND $rN2CLa>0 AND ($NNum3==7 OR $rN3HOa>0) AND $rN4CHa>0)
{$msg='Error!.. CL can be taken maximum for 2 days.!'; }
elseif(($_POST['LeaveType']=='CL' OR $_POST['LeaveType']=='CH') AND $rN1CHp>0 AND $rN2CLp>0 AND ($NNum3==7 OR $rN3HOa>0) AND $rN4CHp>0)
{$msg='Error!.. CL can be taken maximum for 2 days.!'; }
elseif(($_POST['LeaveType']=='CL' OR $_POST['LeaveType']=='CH') AND $rN1CHa>0 AND ($NNum2==7 OR $rN2HOa>0) AND $rN3CLa>0 AND $rN4CHa>0)
{$msg='Error!.. CL can be taken maximum for 2 days.!'; }
elseif(($_POST['LeaveType']=='CL' OR $_POST['LeaveType']=='CH') AND $rN1CHp>0 AND ($NNum2==7 OR $rN2HOa>0) AND $rN3CLp>0 AND $rN4CHp>0)
{$msg='Error!.. CL can be taken maximum for 2 days.!'; }
elseif(($_POST['LeaveType']=='CL') AND $rN1CHa>0 AND ($NNum2==7 OR $rN2HOa>0) AND $rN3CHa>0 AND $rN4CHa>0){$msg='Error!.. CL can be taken maximum for 2 days.!'; }
elseif(($_POST['LeaveType']=='CL') AND $rN1CHp>0 AND ($NNum2==7 OR $rN2HOa>0) AND $rN3CLHp>0 AND $rN4CHp>0){$msg='Error!.. CL can be taken maximum for 2 days.!'; }
elseif($_POST['LeaveType']=='CL' AND ($NNum1==7 OR $rN1HOa>0) AND $rN2CLa>0 AND $rN3CHa>0){ $msg='Error!.. CL can be taken maximum for 2 days.!'; }
elseif($_POST['LeaveType']=='CL' AND ($NNum1==7 OR $rN1HOa>0) AND $rN2CLp>0 AND $rN3CHp>0){ $msg='Error!.. CL can be taken maximum for 2 days.!'; }
elseif($_POST['LeaveType']=='CL' AND ($NNum1==7 OR $rN1HOa>0) AND $rN2CHa>0 AND $rN3CLa>0){ $msg='Error!.. CL can be taken maximum for 2 days.!'; }
elseif($_POST['LeaveType']=='CL' AND ($NNum1==7 OR $rN1HOa>0) AND $rN2CHp>0 AND $rN3CLp>0){ $msg='Error!.. CL can be taken maximum for 2 days.!'; }
elseif(($_POST['LeaveType']=='CL' OR $_POST['LeaveType']=='CH') AND $rN1CLa>0 AND $rN2CLa>0){ $msg='Error!.. CL can be taken maximum for 2 days.!'; }
elseif(($_POST['LeaveType']=='CL' OR $_POST['LeaveType']=='CH') AND $rN1CLp>0 AND $rN2CLp>0){ $msg='Error!.. CL can be taken maximum for 2 days.!'; }
elseif(($_POST['LeaveType']=='CL' OR $_POST['LeaveType']=='CH') AND ($NNum1==7 OR $rN1HOa>0) AND $rN2CLa>0 AND $rN3CLa>0){ $msg='Error!.. CL can be taken maximum for 2 days.!'; }
elseif(($_POST['LeaveType']=='CL' OR $_POST['LeaveType']=='CH') AND ($NNum1==7 OR $rN1HOa>0) AND $rN2CLp>0 AND $rN3CLp>0){ $msg='Error!.. CL can be taken maximum for 2 days.!'; }
elseif(($_POST['LeaveType']=='CL' OR $_POST['LeaveType']=='CH') AND ($NNum1==7 OR $rN1HOa>0) AND ($NNum2==7 OR $rN2HOa>0) AND $rN3CLa>0 AND $rN4CLa>0)
{ $msg='Error!.. CL can be taken maximum for 2 days.!'; }
elseif(($_POST['LeaveType']=='CL' OR $_POST['LeaveType']=='CH') AND ($NNum1==7 OR $rN1HOa>0) AND ($NNum2==7 OR $rN2HOa>0) AND $rN3CLp>0 AND $rN4CLp>0)
{ $msg='Error!.. CL can be taken maximum for 2 days.!'; }
elseif(($_POST['LeaveType']=='CL' OR $_POST['LeaveType']=='CH') AND ($NNum1==7 OR $rN1HOa>0) AND ($NNum2==7 OR $rN2HOa>0) AND ($NNum3==7 OR $rN3HOa>0) AND $rN4CLa>0 AND $rN5CLa>0)
{ $msg='Error!.. CL can be taken maximum for 2 days.!'; }
elseif(($_POST['LeaveType']=='CL' OR $_POST['LeaveType']=='CH') AND ($NNum1==7 OR $rN1HOa>0) AND ($NNum2==7 OR $rN2HOa>0) AND ($NNum3==7 OR $rN3HOa>0) AND $rN4CLp>0 AND $rN5CLp>0)
{ $msg='Error!.. CL can be taken maximum for 2 days.!'; }
elseif(($_POST['LeaveType']=='CL' OR $_POST['LeaveType']=='CH') AND $rN1CLp1>0){ $msg='Error!.. CL can be taken maximum for 2 days.!'; }
elseif(($_POST['LeaveType']=='CL' OR $_POST['LeaveType']=='CH') AND ($NNum1==7 OR $rN1HOa>0) AND $rN1CLp2>0){ $msg='Error!.. CL can be taken maximum for 2 days.!'; }
elseif(($_POST['LeaveType']=='CL' OR $_POST['LeaveType']=='CH') AND ($NNum1==7 OR $rN1HOa>0) AND ($NNum2==7 OR $rN2HOa>0) AND $rN1CLp3>0)
{ $msg='Error!.. CL can be taken maximum for 2 days.!'; }
elseif(($_POST['LeaveType']!='CL' AND $_POST['LeaveType']!='CH') AND ($rN1CLa>0 OR $rN1CHa>0)){ $msg='Error : CL can not be combined with any other leave!'; }
elseif(($_POST['LeaveType']!='CL' AND $_POST['LeaveType']!='CH') AND ($rN1CLp>0 OR $rN1CHp>0)){ $msg='Error : CL can not be combined with any other leave!'; }
elseif(($_POST['LeaveType']!='CL' AND $_POST['LeaveType']!='CH') AND ($NNum1==7 OR $rN1HOa>0) AND ($rN2CHa>0 OR $rN2CLa>0)){$msg='Error:CL can not be combined with any other leave!'; }
elseif(($_POST['LeaveType']!='CL' AND $_POST['LeaveType']!='CH') AND ($NNum1==7 OR $rN1HOa>0) AND ($rN2CHp>0 OR $rN2CLp>0)){$msg='Error:CL can not be combined with any other leave!'; }
elseif(($_POST['LeaveType']!='CL' AND $_POST['LeaveType']!='CH') AND ($NNum1==7 OR $rN1HOa>0) AND ($NNum2==7 OR $rN2HOa>0) AND ($rN3CLa>0 OR $rN3CHa>0))
{ $msg='Error : CL can not be combined with any other leave!'; }
elseif(($_POST['LeaveType']!='CL' AND $_POST['LeaveType']!='CH') AND ($NNum1==7 OR $rN1HOa>0) AND ($NNum2==7 OR $rN2HOa>0) AND ($rN3CLp>0 OR $rN3CHp>0))
{ $msg='Error : CL can not be combined with any other leave!'; }
elseif(($_POST['LeaveType']!='CL' AND $_POST['LeaveType']!='CH') AND ($NNum1==7 OR $rN1HOa>0) AND ($NNum2==7 OR $rN2HOa>0) AND ($NNum3==7 OR $rN3HOa>0) AND ($rN4CLa>0 OR $rN4CHa>0))
{ $msg='Error : CL can not be combined with any other leave!'; }
elseif(($_POST['LeaveType']!='CL' AND $_POST['LeaveType']!='CH') AND ($NNum1==7 OR $rN1HOa>0) AND ($NNum2==7 OR $rN2HOa>0) AND ($NNum3==7 OR $rN3HOa>0) AND ($rN4CLp>0 OR $rN4CHp>0))
{ $msg='Error : CL can not be combined with any other leave!'; }
elseif(($_POST['LeaveType']=='CL' OR $_POST['LeaveType']=='CH') AND $rN1OTa>0){ $msg='Error : CL can not be combined with any other leave!'; }
elseif(($_POST['LeaveType']=='CL' OR $_POST['LeaveType']=='CH') AND $rN1OTp>0){ $msg='Error : CL can not be combined with any other leave!'; }
elseif(($_POST['LeaveType']=='CL' OR $_POST['LeaveType']=='CH') AND ($NNum1==7 OR $rN1HOa>0) AND $rN2OTa>0){$msg='Error:CL can not be combined with any other leave!'; }
elseif(($_POST['LeaveType']=='CL' OR $_POST['LeaveType']=='CH') AND ($NNum1==7 OR $rN1HOa>0) AND $rN2OTp>0){$msg='Error:CL can not be combined with any other leave!'; }
elseif(($_POST['LeaveType']=='CL' OR $_POST['LeaveType']=='CH') AND ($NNum1==7 OR $rN1HOa>0) AND ($NNum2==7 OR $rN2HOa>0) AND $rN3OTa>0)
{ $msg='Error : CL can not be combined with any other leave!'; }
elseif(($_POST['LeaveType']=='CL' OR $_POST['LeaveType']=='CH') AND ($NNum1==7 OR $rN1HOa>0) AND ($NNum2==7 OR $rN2HOa>0) AND $rN3OTp>0)
{ $msg='Error : CL can not be combined with any other leave!'; }
elseif(($_POST['LeaveType']=='CL' OR $_POST['LeaveType']=='CH') AND ($NNum1==7 OR $rN1HOa>0) AND ($NNum2==7 OR $rN2HOa>0) AND ($NNum3==7 OR $rN3HOa>0) AND $rN4OTa>0)
{ $msg='Error : CL can not be combined with any other leave!'; }
elseif(($_POST['LeaveType']=='CL' OR $_POST['LeaveType']=='CH') AND ($NNum1==7 OR $rN1HOa>0) AND ($NNum2==7 OR $rN2HOa>0) AND ($NNum3==7 OR $rN3HOa>0) AND $rN4OTp>0)
{ $msg='Error : CL can not be combined with any other leave!'; }
else
{ $startTimeStamp = strtotime($AppFromDate); $endTimeStamp = strtotime($AppToDate);  
  // Count day between two days
  if ($_POST['LeaveType']=='CL' OR $_POST['LeaveType']=='EL' OR $_POST['LeaveType']=='PL' OR $_POST['LeaveType']=='SL' OR $_POST['LeaveType']=='FL' OR $_POST['LeaveType']=='TL')
  { $timeDiff = abs($endTimeStamp - $startTimeStamp); 
    // 86400 seconds in one day  // and you might want to convert to integer $numberDays = intval($numberDays); 
    $days = $timeDiff/86400;  
    if($_POST['LeaveType']=='EL'){$totaldays=$days+1;}
    if($_POST['LeaveType']!='EL')
    { $Fday=date("d",strtotime($AppFromDate)); $Fmonth=date("m",strtotime($AppFromDate)); $Fyear=date("Y",strtotime($AppFromDate));
      $Tday=date("d",strtotime($AppToDate)); $Tmonth=date("m",strtotime($AppToDate)); $Tyear=date("Y",strtotime($AppToDate));
	  if($Fmonth==01){$DateFmonth=31;} 
	  elseif($Fmonth==02){ if($Fyear==2012 OR $Fyear==2016 OR $Fyear==2020 OR $Fyear==2024 OR $Fyear==2028 OR $Fyear==2032){$DateFmonth=29;}else{$DateFmonth=28;}}elseif($Fmonth==03){$DateFmonth=31;}elseif($Fmonth==04){$DateFmonth=30;}elseif($Fmonth==05){$DateFmonth=31;}elseif($Fmonth==06){$DateFmonth=30;}elseif($Fmonth==07){$DateFmonth=31;}elseif($Fmonth==08){$DateFmonth=31;}elseif($Fmonth==09){$DateFmonth=30;}elseif($Fmonth==10){$DateFmonth=31;}elseif($Fmonth==11){$DateFmonth=30;}elseif($Fmonth==12){$DateFmonth=31;}
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
/*************************************************************/

  if($_POST['LeaveType']=='EL'){$TotDays=$totaldays;} else {$TotDays=$totaldays-$rowH;} 
  if($TotDays==0){$msg='Error : Please check your apply day.!'; }
  elseif(($_POST['LeaveType']=='CL' OR $_POST['LeaveType']=='CH') AND $TotDays>$_POST['BalCL']){ $msg='Error!.. Please check apply no of day CL.!'; }

  elseif(($_POST['LeaveType']=='CL' OR $_POST['LeaveType']=='CH') AND ($PNum1==7 OR $rP1HOa>0) AND ($rP2CLa>0 OR $rP2CHa>0) AND $TotDays>=2){ $msg='Error!.. CL can be taken maximum for 2 days.!'; }
  elseif(($_POST['LeaveType']=='CL' OR $_POST['LeaveType']=='CH') AND ($PNum1==7 OR $rP1HOa>0) AND $rP2CLa>0 AND $rP3CLa>0){$msg='Error!.. CL can be taken maximum for 2 days.!';}
/**********************/
elseif(($_POST['LeaveType']=='CL' OR $_POST['LeaveType']=='CH') AND ($PNum1==7 OR $rP1HOa>0) AND ($rP2CLp>0 OR $rP2CHp>0) AND $TotDays==2){ $msg='Error!.. CL can be taken maximum for 2 days.!...'; }
elseif(($_POST['LeaveType']=='CL' OR $_POST['LeaveType']=='CH') AND ($PNum1==7 OR $rP1HOa>0) AND ($rP2CLa>0 OR $rP2CHa>0) AND $TotDays==2){ $msg='Error!.. CL can be taken maximum for 2 days.!...'; }
elseif(($_POST['LeaveType']=='CL' OR $_POST['LeaveType']=='CH') AND ($NNum1==7 OR $rN1HOa>0) AND ($rN2CLp>0 OR $rN2CHp>0) AND $TotDays==2){ $msg='Error!.. CL can be taken maximum for 2 days.!...'; }
elseif(($_POST['LeaveType']=='CL' OR $_POST['LeaveType']=='CH') AND ($NNum1==7 OR $rN1HOa>0) AND ($rN2CLa>0 OR $rN2CHa>0) AND $TotDays==2){ $msg='Error!.. CL can be taken maximum for 2 days.!..'; }
elseif(($_POST['LeaveType']=='CL' OR $_POST['LeaveType']=='CH') AND ($NNum1==7 OR $rN1HOa>0) AND $rP2CLp>0 AND ($NNum3==7 OR $rN3HOa>0) AND $rP4CLp>0){ $msg='Error!.. CL can be taken maximum for 2 days.!...'; }
elseif(($_POST['LeaveType']=='CL' OR $_POST['LeaveType']=='CH') AND ($NNum1==7 OR $rN1HOa>0) AND $rP2CLa>0 AND ($NNum3==7 OR $rN3HOa>0) AND $rP4CLa>0){ $msg='Error!.. CL can be taken maximum for 2 days.!...'; }
/**********************/

  elseif($_POST['LeaveType']=='CL' AND $TotDays>2){ $msg='Error!.. CL can be taken maximum for 2 days.!'; }
  elseif($_POST['LeaveType']=='CH' AND $TotDays>0.5){ $msg='Error!.. Half Day of CL can be taken maximum for 1/2 days.!'; }
  elseif(($_POST['LeaveType']=='SL' OR $_POST['LeaveType']=='SH') AND $TotDays>$_POST['BalSL']){ $msg='Error!.. Please check apply no of day SL.!'; }
  elseif($_POST['LeaveType']=='SH' AND $TotDays>0.5){ $msg='Error!.. Half Day of SL can be taken maximum for 1/2 days.!'; }
  elseif($_POST['LeaveType']=='PL' AND $TotDays>$_POST['BalPL']){ $msg='Error!.. Please check apply no of day PL.!'; }
  elseif($_POST['LeaveType']=='EL' AND $TotDays>$_POST['BalEL']){ $msg='Error!.. Please check apply no of day EL.!'; }
  elseif($_POST['LeaveType']=='FL' AND $TotDays>$_POST['BalOL']){ $msg='Error!.. Please check apply no of day FL.!'; }
  elseif($_POST['LeaveType']=='EL' AND $TotDays<3){ $msg='Error!.. EL can be taken minimum for 3 days.'; }
  else
  { $result=mysql_query("INSERT INTO hrm_employee_applyleave(EmployeeID,Apply_Date,Leave_Type,Apply_FromDate,Apply_ToDate,Apply_TotalDay,Apply_Reason,Apply_ContactNo,Apply_DuringAddress,Apply_SentToApp,Apply_SentToRev,Apply_SentToHOD) VALUES(".$EmployeeId.",'".date('Y-m-d')."','".$_POST['LeaveType']."','".$AppFromDate."','".$AppToDate."','".$TotDays."','".$_POST['Reason']."',".$_POST['ContactNo'].",'".$_POST['DuAdd']."',".$_POST['AppId'].",".$_POST['RevId'].",".$_POST['HodId'].")", $con);
    if($result) 
    {  
     if($_POST['LeaveType']!='PL' AND $_POST['EmailRep']!='')
     {
      $email_to = $_POST['EmailRep'];
      $email_from='admin@vnrseeds.co.in';
      $email_subject = "Leave Application";
      $email_txt = "Leave Application"; 
      $headers = "From: ".$email_from."\r\n"; 
      $semi_rand = md5(time()); 
      $headers .= "MIME-Version: 1.0\r\n";
      $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
      $email_message .=$_POST['Ename']." has submitted leave application for ".$_POST['LeaveType']." from ".$_POST['FromDate']." to ".$_POST['ToDate'].", for your approval kindly log on to ESS <a href='https://www.vnrseeds.co.in'>www.vnrseeds.co.in</a> to approve.\n\n";
	  $ok = @mail($email_to, $email_subject, $email_message, $headers);
     }   
    //********************************************************************//  
    if($_POST['LeaveType']=='PL' AND $_POST['EmailRep']!='')
    {
     $email_to = $_POST['EmailRep'];
     $email_from='admin@vnrseeds.co.in';
	 $email_subject = "Leave Application";
     $email_txt = "Leave Application";
     $headers = "From: ".$email_from."\r\n"; 
     $semi_rand = md5(time()); 
     $headers .= "MIME-Version: 1.0\r\n";
     $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
     $email_message2 .=$_POST['Ename']." has submitted leave application for ".$_POST['LeaveType']." from ".$_POST['FromDate']." to ".$_POST['ToDate'].", for your approval kindly log on to ESS <a href='https://www.vnrseeds.co.in'>www.vnrseeds.co.in</a> to approve.\n\n";
     $ok = @mail($email_to, $email_subject, $email_message2, $headers);
    }   
   //********************************************************************// 
    $sqlDept=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$DepartmentId, $con); $resDept=mysql_fetch_assoc($sqlDept);
    $email_to = 'vspl.hr@vnrseeds.com';
    $email_from='admin@vnrseeds.co.in';
	$email_subject = "Leave Application";
    $email_txt = "Leave Application";
    $headers = "From: ".$email_from."\r\n"; 
    $semi_rand = md5(time()); 
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
    $email_message4 .=$_POST['Ename']." (".$resDept['DepartmentCode'].") has submitted leave application for ".$_POST['LeaveType']." from ".$_POST['FromDate']." to ".$_POST['ToDate'].", for your approval kindly log on to ESS <a href='https://www.vnrseeds.co.in'>www.vnrseeds.co.in</a> to approve\n\n";
    $ok = @mail($email_to, $email_subject, $email_message4, $headers);
	//********************************************************************// 
    if($DepartmentId==2)
    {
     $email_to = 'seshi.reddy@vnrseeds.com';
     $email_from='admin@vnrseeds.co.in';
     $email_subject = "Leave Application";
     $email_txt = "Leave Application";
     $headers = "From: ".$email_from."\r\n";  
     $semi_rand = md5(time()); 
     $headers .= "MIME-Version: 1.0\r\n";
     $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
     $email_message5 .=$_POST['Ename']." has submitted leave application for ".$_POST['LeaveType']." from ".$_POST['FromDate']." to ".$_POST['ToDate'].".\n\n";
     $ok = @mail($email_to, $email_subject, $email_message5, $headers);
    } 
   $msg = "Your leave request has been submitted succesfully.....!";
   } 
   else { $msg='Your leave request not to be sent!'; }
   }
  } 
}


if(isset($_REQUEST['action']) && $_REQUEST['action']=="delete")
{
  $SqlDelete=mysql_query("delete from hrm_employee_applyleave where ApplyLeaveId=".$_REQUEST['did'], $con) or die(mysql_error());
  if($SqlDelete)
  {
    $sqlEmp=mysql_query("select Fname,Sname,Lname from hrm_employee where EmployeeID=".$_REQUEST['e'], $con);    $resEmp=mysql_fetch_assoc($sqlEmp); $emp=$resEmp['Fname'].' '.$resEmp['Sname'].' '.$resEmp['Lname'];
    $email_to = 'vspl.hr@vnrseeds.com';
    $email_from='admin@vnrseeds.co.in';
    $email_subject = "Delete Leave Application";
    $email_txt = "Delete Leave Application";
    $headers = "From: ".$email_from."\r\n"; 
    $semi_rand = md5(time()); 
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
    $email_message .=$emp." has deleted leave application for ".$_REQUEST['l'].", from ".$_REQUEST['f']." to ".$_REQUEST['t'].". \n\n";
    $ok = @mail($email_to, $email_subject, $email_message, $headers);
  }
}

?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<link rel="stylesheet" type="text/css" href="src/css/jscal2.css"/>
<link rel="stylesheet" type="text/css" href="src/css/border-radius.css"/>
<link rel="stylesheet" type="text/css" href="src/css/steel/steel.css"/>
<script type="text/javascript" src="src/js/jscal2.js"></script>
<script type="text/javascript" src="src/js/lang/en.js"></script>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<style>.font { color:#ffffff; font-family:Georgia; font-size:11px; width:200px;} .font1 { font-family:Georgia; font-size:11px; height:14px; } 
.font2 { font-size:11px;width:260px;height:18px;}.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;} .TableHead { font-family:Times New Roman; color:#FFFFFF; font-size:15px; }
.TableHead1 { font-family:Times New Roman; color:#000000; background-color:#FFFFFF; font-size:13px; overflow:hidden; } .InputText {font-family:Times New Roman; font-size:12px; width:90px; height:19px; }
.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}</style>
<Script type="text/javascript">window.history.forward(1);</Script>
<script type="text/javascript" language="javascript">
function CheckHoliD2(v) 
{ if(v=='FL')
  { document.getElementById("OpHTD1").style.display='block';document.getElementById("OpHTD2").style.display='block';
    document.getElementById("FD").value=document.getElementById("FromDate").value; document.getElementById("TD").value=document.getElementById("ToDate").value;
	document.getElementById("f_btn1").disabled=true; document.getElementById("f_btn2").disabled=true;
  }
  else 
  { document.getElementById("OpHTD1").style.display='none';document.getElementById("OpHTD2").style.display='none';
    document.getElementById("OpHo").value=0;
    if(document.getElementById("FD").value!='' && document.getElementById("TD").value!='')
	{document.getElementById("FromDate").value=document.getElementById("FD").value; document.getElementById("ToDate").value=document.getElementById("TD").value;}
	document.getElementById("f_btn1").disabled=false; document.getElementById("f_btn2").disabled=false;
  }
  var fromD=document.getElementById("FromDate").value; var toD=document.getElementById("ToDate").value; var EmpId=document.getElementById("EmpId").value; 
  var ContNo=document.getElementById("ContactNo").value;
  if(ContNo.length>=9){
  var url = 'CheckEmpHoliD.php'; var pars = 'FromD='+fromD+'&ToD='+toD+'&EmpId='+EmpId;	var myAjax = new Ajax.Request(
  url, { method: 'post', parameters: pars, onComplete: show_EmpHoliD }); }
}
function show_EmpHoliD(originalRequest)
{ document.getElementById('SpanHoliCheck').innerHTML = originalRequest.responseText; }

function CheckOpHoId(v)
{ if(v!=0)
  {
  var url = 'CheckEmpHoliDate.php';	var pars = 'Action=CheckDate&v='+v;	var myAjax = new Ajax.Request(
  url, { method: 'post', parameters: pars, onComplete: show_EmpHoliDate }); 
  }
  else
  {document.getElementById("FromDate").value=document.getElementById("FD").value; 
   document.getElementById("ToDate").value=document.getElementById("TD").value;
   document.getElementById("OpHoDate").value='00-00-0000';
  }
}
function show_EmpHoliDate(originalRequest)
{ document.getElementById('SpanOpHoDate').innerHTML = originalRequest.responseText; 
  document.getElementById("FromDate").value=document.getElementById("OpHoDate").value;
  document.getElementById("ToDate").value=document.getElementById("OpHoDate").value;
  CheckHoliD();
}


function CheckHoliD()
{ var fromD=document.getElementById("FromDate").value; var toD=document.getElementById("ToDate").value; var EmpId=document.getElementById("EmpId").value; 
  var ContNo=document.getElementById("ContactNo").value;
  if(ContNo.length>=9){
  var url = 'CheckEmpHoliD.php';	var pars = 'FromD='+fromD+'&ToD='+toD+'&EmpId='+EmpId;	var myAjax = new Ajax.Request(
  url, { method: 'post', parameters: pars, onComplete: show_EmpHoliD }); }
}
function show_EmpHoliD(originalRequest)
{ document.getElementById('SpanHoliCheck').innerHTML = originalRequest.responseText; }


function validate(AskQform) 
{ var d1 = AskQform.FromDate.value; var d2 = AskQform.ToDate.value; 
  var ContactNo = AskQform.ContactNo.value; var LeaveType = AskQform.LeaveType.value; var OpHo = AskQform.OpHo.value;
  var DuAdd = AskQform.DuAdd.value; var Reason = AskQform.Reason.value; var Numfilter=/^[0-9 ]+$/;  var filter=/^[a-zA-Z. /]+$/; 
  var Month = AskQform.Month.value; 

  if(d1.length == 0){ alert('Please enter from date field');  return false; }
  if(d2.length == 0){ alert('Please enter to date field');  return false; }
  if(ContactNo.length == 0){ alert('Please enter contact number');  return false; }
  var test_num = Numfilter.test(ContactNo);
  if(test_num==false) { alert('Please enter only number in the contact number field');  return false; }
  if(ContactNo.length<10){ alert('check contact number field');  return false; }
  if(LeaveType==0){alert('Please select leave');  return false;}
  if(LeaveType=='FL' && OpHo==0){alert('Please select festival leave');  return false;}
  if(DuAdd.length == 0){ alert('Please enter duration address in apply leave');  return false; }
  var filter=/^[0-9 /]+$/; var filterNum=/^[0-9a-zA-Z. /]+$/; var test_bool = filter.test(DuAdd); var test_boolNum = filterNum.test(DuAdd); 
  if(test_bool==true) { alert('Please check address duration leave');  return false; }
  if(Reason.length == 0){ alert('Please enter reason of leave');  return false; }
  var BalCL = parseFloat(document.getElementById("BalCL").value); var BalSL = parseFloat(document.getElementById("BalSL").value);
  var BalPL = parseFloat(document.getElementById("BalPL").value); var BalEL = parseFloat(document.getElementById("BalEL").value);  
  var ApplyTotCL = parseFloat(document.getElementById("SumCL").value); var ApplyTotSL = parseFloat(document.getElementById("SumSL").value); 
  var ApplyTotPL = parseFloat(document.getElementById("SumPL").value); var ApplyTotEL = parseFloat(document.getElementById("SumEL").value);
  var AP_CL = parseFloat(document.getElementById("ASumCL").value); var AP_SL = parseFloat(document.getElementById("ASumSL").value); 
  var AP_PL = parseFloat(document.getElementById("ASumPL").value); var AP_EL = parseFloat(document.getElementById("ASumEL").value);
  var Next_CL = parseFloat(document.getElementById("Next_CL").value); var Next_SL = parseFloat(document.getElementById("Next_SL").value); 
  var Next_PL = parseFloat(document.getElementById("Next_PL").value); var Next_EL = parseFloat(document.getElementById("Next_EL").value);
  var TotCL_Availed=Math.round((AP_CL+Next_CL)*100)/100; var TotSL_Availed=Math.round((AP_SL+Next_SL)*100)/100;
  var TotPL_Availed=Math.round((AP_PL+Next_PL)*100)/100; var TotEL_Availed=Math.round((AP_EL+Next_EL)*100)/100;
  var BalOL = parseFloat(document.getElementById("BalOL").value); var ApplyTotOL = parseFloat(document.getElementById("SumOL").value);
  var AP_OL = parseFloat(document.getElementById("ASumOL").value); var Next_OL = parseFloat(document.getElementById("Next_OL").value);
  var TotOL_Availed=Math.round((AP_OL+Next_OL)*100)/100;
  //Count no of DAY beetween two day... 
  var DMY=d1.split('-');     //splits the date string by '-' and stores in a array.
  var DMY2=d2.split('-');
  var day=DMY[0];  var month=DMY[1];  var year=DMY[2];
  var day1=DMY2[0];  var month1=DMY2[1];  var year1=DMY2[2];
  var dateTemp1=month+'/'+day+'/'+year;  
  var dateTemp2=month1+'/'+day1+'/'+year1;
  var date1 = new Date(dateTemp1);//mm/dd/yy 
  var date2 = new Date(dateTemp2); //mm/dd/yy
  var Timed1=date1.getTime(); var Timed2=date2.getTime();
  if(Timed1>Timed2){alert('Error : Please check your apply date!'); return false;}	
  var timeDiff = Math.abs(date2.getTime() - date1.getTime());
  var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24));
  var TotDay = diffDays+1;
  var CheckHoliD=document.getElementById("TotCheckHoliD").value; //Conut Holiday
  //alert(CheckHoliD);

  //Count no of SUNDAY beetween two day...
  if(date2 < date1) return; //avoid infinite loop;
  for(var count=0; date1 <= date2; date1.setDate(date1.getDate() + 1)){
  if(date1.getDay() == 0) count++;} 

  if(count==0)
  { if(LeaveType=='EL') { var ActualDays = TotDay; } if(LeaveType!='EL') { var ActualDays = TotDay-CheckHoliD; } } 
  if(count>0) 
  { if(LeaveType=='EL') { var ActualDays = TotDay; } if(LeaveType!='EL') { var ActualDays = (TotDay-count)-CheckHoliD; } }  

  if(LeaveType=='CL') 
  { if(BalCL>=TotCL_Availed) {var allowCL=BalCL-TotCL_Availed;} else {var allowCL=TotCL_Availed-BalCL;} //alert(allowCL);
    if(ActualDays>allowCL){alert('Please check.. your apply no of day CL');  return false; }
    if(ActualDays>BalCL){alert('Please check balance of CL');  return false; } 
  }

  if(LeaveType=='SL') 
  { if(BalSL>=TotSL_Availed) {var allowSL=BalSL-TotSL_Availed;} else {var allowSL=TotSL_Availed-BalSL;} //alert(allowSL);
    if(ActualDays>allowSL){alert('Please check.. your apply no of day SL');  return false; }
    if(ActualDays>BalSL){alert('Please check balance of SL');  return false; } 
  }

  if(LeaveType=='PL') 
  { if(BalPL>=TotPL_Availed) {var allowPL=BalPL-TotPL_Availed;} else {var allowPL=TotPL_Availed-BalPL;} //alert(allowPL);
    if(ActualDays>allowPL){alert('Please check.. your apply no of day PL');  return false; }
    if(ActualDays>BalPL){alert('Please check balance of PL');  return false; } 
  }

  if(LeaveType=='EL') 
  { if(BalEL>=TotEL_Availed) {var allowEL=BalEL-TotEL_Availed;} else { var allowEL=TotEL_Availed-BalEL;} 
    if(ActualDays>allowEL){alert('Please check.. your apply no of day EL');  return false; }
    if(ActualDays>BalEL){alert('Please check balance of EL');  return false; } 
  }

  
  if(LeaveType=='FL') 
  { //alert("BalOL="+BalOL+"/ApplyTotOL="+ApplyTotOL+"/AP_OL="+AP_OL+"/Next_OL="+Next_OL+"/TotOL_Availed="+TotOL_Availed);
    var allowOL=0;
    if(BalOL>=TotOL_Availed) {allowOL=BalOL-TotOL_Availed;} else {allowOL=TotOL_Availed-BalOL;} 
    if(ActualDays>allowOL){alert('Please check.. your apply no of day FL');  return false; }
    if(ActualDays>BalOL){alert('Please check balance of FL');  return false; } 
  }		


  if(LeaveType=='TL') 
  {  
    alert("TL can be apply only should be communicate information received to HR");
    if(ActualDays>3){alert('Please check.. TL apply maximum 3 day only');  return false; } 
  }		

 
  var AppNOTimePL = document.getElementById("AppPL").value; var AppNOTimeEL = document.getElementById("AppEL").value;
  var LastAppL = document.getElementById("MaxLeaveType").value; var LastAppLFromDate = document.getElementById("MaxLeaveFrom").value;
  var LastAppLToDate = document.getElementById("MaxLeaveTo").value; var LastAppLTotDay = document.getElementById("MaxLeaveTotDay").value; 
  var NextAppLDate = document.getElementById("NextDay").value; var CurrYear = parseFloat(document.getElementById("Year").value);
  var NextDMY =NextAppLDate.split('-'); 
  var Nextday= NextDMY[0];  var Nextmonth=NextDMY[1];  var Nextyear=NextDMY[2];
  var NextTempDate=Nextmonth+'/'+Nextday+'/'+Nextyear;
  var NextDate = Date.parse(NextTempDate); //mm/dd/yy
  var New_date1 = Date.parse(dateTemp1); //mm/dd/yy
  //alert(New_date1+"-"+NextDate);

  
  var NextYear=Math.round((CurrYear+1)*100)/100; 
  if(LeaveType=='CL')
  { if(New_date1==NextDate)
    { if(LastAppL=='SL' || LastAppL=='PL' || LastAppL=='EL' || LastAppL=='SH' || LastAppL=='PH' || LastAppL=='FL') { alert("Error!.. CL can't be combined with any other leave."); return false; }
	  if(LastAppL=='CL' && LastAppLTotDay>=2) { alert("Error!.. Leave already applied for given dates."); return false; }
	} 
      if(year==NextYear || year1==NextYear) { alert("Error!.. CL can be apply only to current calendar year."); return false; }
	  //if(ActualDays>2) { alert("Error!.. CL can be taken maximum for 2 days."); return false; }
  }
  if(LeaveType=='CH')
  { 
  if(New_date1==NextDate)
    { if(LastAppL=='SH' || LastAppL=='SL' || LastAppL=='PL' || LastAppL=='EL' || LastAppL=='PH' || LastAppL=='FL') { alert("Error!.. Half Day of CL can't be combined with any other leave."); return false; }
	  if(LastAppL=='CL' && LastAppLTotDay>=2) { alert("Error!.. Leave already applied for given dates."); return false; }
	} 
      if(year==NextYear || year1==NextYear) { alert("Error!.. Half Day of CL can be apply only to current calendar year."); return false; }
  }

  if(LeaveType=='SL')
  { if(New_date1==NextDate){ if(LastAppL=='CL' || LastAppL=='CH') { alert("Error!.. SL can't be combined with CL."); return false; }}
    if(ActualDays>=3){alert("Please submit medical certificate for applied SL.");} 
  }
  if(LeaveType=='SH')
  { if(New_date1==NextDate){ if(LastAppL=='CL' || LastAppL=='CH') { alert("Error!.. Half Day of SL can't be combined with CL."); return false; }}
  }

  if(LeaveType=='PL')
  { if(AppNOTimePL>=2) { alert("PL cannot be applied more then twice"); return false;}
    if(New_date1==NextDate){ if(LastAppL=='CL' || LastAppL=='CH') { alert("Error!.. PL can't be combined with CL."); return false; }}
    if(year==NextYear || year1==NextYear) { alert("Error!.. PL can be apply only to current calendar year."); return false;}

  }

  if(LeaveType=='EL')
  { if(AppNOTimeEL>=3) { alert("EL cannot be applied more then thrice"); return false;}
    if(ActualDays<3){alert("Error!.. EL can be taken minimum for 3 days."); return false; }
    if(New_date1==NextDate){ if(LastAppL=='CL' || LastAppL=='CH') { alert("Error!.. EL can't be combined with CL."); return false; }}
  }

  if(LeaveType=='FL')
  { if(New_date1==NextDate)
    { if(LastAppL=='CH' || LastAppL=='CL') 
	 { alert("Error!.. FL can't be combined with CL."); return false; }
	} 
     if(year==NextYear || year1==NextYear) { alert("Error!.. FL can be apply only to current calendar year."); return false; }
  }

  if(LeaveType=='TL')
  { if(New_date1==NextDate)
    { if(LastAppL=='CH' || LastAppL=='CL') 
	  { alert("Error!.. TL can't be combined with CL."); return false; }
	} 
      if(year==NextYear || year1==NextYear) { alert("Error!.. TL can be apply only to current calendar year."); return false; }
  }

}

function ShowAppLeave(EId)
{document.getElementById("LeaveStatusTD").style.display='block'; document.getElementById("Leave2StatusTD").style.display='block';}

function HideAppLeave(EId)
{document.getElementById("LeaveStatusTD").style.display='none'; document.getElementById("Leave2StatusTD").style.display='none';}

function OpenWindow(LId)
{window.open("LeaveDetails.php?id="+LId,"leaveForm","menubar=yes,scrollbars=yes,resizable=no,directories=no,width=350,height=350");}

function DelAppLeave(LId,EI,f,t,l)
{ var agree=confirm("Are you sure you want to delete this apply leave?"); 
  if (agree) { var x = "ApplyLeave.php?action=delete&did="+LId+"&e="+EI+"&de=678&ww=2323&st=true&f="+f+"&t="+t+"&l="+l;  window.location=x;}
}


function CancelAppLeave(LId)
{ var agree=confirm("Are you sure you want to cancel leaves?");
  if (agree) 
  { var win=window.open("LeaveCancel.php?id="+LId,"CancelLeaveForm","menubar=yes,scrollbars=yes,resizable=no,directories=no,width=450,height=300");
    var timer = setInterval( function() { if(win.closed) {  clearInterval(timer);  window.location="ApplyLeave.php"; } }, 1000);
  }
}

<!--
function doBlink() {
	var blink = document.all.tags("BLINK")
	for (var i=0; i<blink.length; i++)
		blink[i].style.visibility = blink[i].style.visibility == "" ? "hidden" : "" 
}
function startBlink() {
	if (document.all)
		setInterval("doBlink()",1000)
}
window.onload = startBlink;
// -->

function OpenLDetails(EI,LT)
{window.open("EmpLDetails.php?EI="+EI+"&LT="+LT,"LDForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=700,height=350");}

function HelpDocleave()
{ window.open("LeaveHelpDoc.php?action=help","HelpDoc","menubar=no,scrollbars=yes,resizable=no,directories=no,width=720,height=600");}

function LeaveHelpDoc()
{ window.open("HelpDocLeave.php?action=help","HelpDoc","menubar=no,scrollbars=yes,resizable=no,directories=no,width=720,height=600");}


function SelMonth(v)
{ if(v==1){ 
  document.getElementById("JanDT").style.display='block'; document.getElementById("FebDT").style.display='none'; document.getElementById("MarDT").style.display='none';
  document.getElementById("AprDT").style.display='none'; document.getElementById("MayDT").style.display='none'; document.getElementById("JunDT").style.display='none';
  document.getElementById("JulDT").style.display='none'; document.getElementById("AugDT").style.display='none'; document.getElementById("SepDT").style.display='none';
  document.getElementById("OctDT").style.display='none'; document.getElementById("NovDT").style.display='none'; document.getElementById("DecDT").style.display='none';}
  else if(v==2){ 
  document.getElementById("JanDT").style.display='none'; document.getElementById("FebDT").style.display='block'; document.getElementById("MarDT").style.display='none';
  document.getElementById("AprDT").style.display='none'; document.getElementById("MayDT").style.display='none'; document.getElementById("JunDT").style.display='none';
  document.getElementById("JulDT").style.display='none'; document.getElementById("AugDT").style.display='none'; document.getElementById("SepDT").style.display='none';
  document.getElementById("OctDT").style.display='none'; document.getElementById("NovDT").style.display='none'; document.getElementById("DecDT").style.display='none';}
  else if(v==3){ 
  document.getElementById("JanDT").style.display='none'; document.getElementById("FebDT").style.display='none'; document.getElementById("MarDT").style.display='block';
  document.getElementById("AprDT").style.display='none'; document.getElementById("MayDT").style.display='none'; document.getElementById("JunDT").style.display='none';
  document.getElementById("JulDT").style.display='none'; document.getElementById("AugDT").style.display='none'; document.getElementById("SepDT").style.display='none';
  document.getElementById("OctDT").style.display='none'; document.getElementById("NovDT").style.display='none'; document.getElementById("DecDT").style.display='none';}
  else if(v==4){ 
  document.getElementById("JanDT").style.display='none'; document.getElementById("FebDT").style.display='none'; document.getElementById("MarDT").style.display='none';
  document.getElementById("AprDT").style.display='block'; document.getElementById("MayDT").style.display='none'; document.getElementById("JunDT").style.display='none';
  document.getElementById("JulDT").style.display='none'; document.getElementById("AugDT").style.display='none'; document.getElementById("SepDT").style.display='none';
  document.getElementById("OctDT").style.display='none'; document.getElementById("NovDT").style.display='none'; document.getElementById("DecDT").style.display='none';}
  else if(v==5){ 
  document.getElementById("JanDT").style.display='none'; document.getElementById("FebDT").style.display='none'; document.getElementById("MarDT").style.display='none';
  document.getElementById("AprDT").style.display='none'; document.getElementById("MayDT").style.display='block'; document.getElementById("JunDT").style.display='none';
  document.getElementById("JulDT").style.display='none'; document.getElementById("AugDT").style.display='none'; document.getElementById("SepDT").style.display='none';
  document.getElementById("OctDT").style.display='none'; document.getElementById("NovDT").style.display='none'; document.getElementById("DecDT").style.display='none';}
  else if(v==6){ 
  document.getElementById("JanDT").style.display='none'; document.getElementById("FebDT").style.display='none'; document.getElementById("MarDT").style.display='none';
  document.getElementById("AprDT").style.display='none'; document.getElementById("MayDT").style.display='none'; document.getElementById("JunDT").style.display='block';
  document.getElementById("JulDT").style.display='none'; document.getElementById("AugDT").style.display='none'; document.getElementById("SepDT").style.display='none';
  document.getElementById("OctDT").style.display='none'; document.getElementById("NovDT").style.display='none'; document.getElementById("DecDT").style.display='none';}
  else if(v==7){ 
  document.getElementById("JanDT").style.display='none'; document.getElementById("FebDT").style.display='none'; document.getElementById("MarDT").style.display='none';
  document.getElementById("AprDT").style.display='none'; document.getElementById("MayDT").style.display='none'; document.getElementById("JunDT").style.display='none';
  document.getElementById("JulDT").style.display='block'; document.getElementById("AugDT").style.display='none'; document.getElementById("SepDT").style.display='none';
  document.getElementById("OctDT").style.display='none'; document.getElementById("NovDT").style.display='none'; document.getElementById("DecDT").style.display='none';}
  else if(v==8){ 
  document.getElementById("JanDT").style.display='none'; document.getElementById("FebDT").style.display='none'; document.getElementById("MarDT").style.display='none';
  document.getElementById("AprDT").style.display='none'; document.getElementById("MayDT").style.display='none'; document.getElementById("JunDT").style.display='none';
  document.getElementById("JulDT").style.display='none'; document.getElementById("AugDT").style.display='block'; document.getElementById("SepDT").style.display='none';
  document.getElementById("OctDT").style.display='none'; document.getElementById("NovDT").style.display='none'; document.getElementById("DecDT").style.display='none';}
  else if(v==9){ 
  document.getElementById("JanDT").style.display='none'; document.getElementById("FebDT").style.display='none'; document.getElementById("MarDT").style.display='none';
  document.getElementById("AprDT").style.display='none'; document.getElementById("MayDT").style.display='none'; document.getElementById("JunDT").style.display='none';
  document.getElementById("JulDT").style.display='none'; document.getElementById("AugDT").style.display='none'; document.getElementById("SepDT").style.display='block';
  document.getElementById("OctDT").style.display='none'; document.getElementById("NovDT").style.display='none'; document.getElementById("DecDT").style.display='none';}
  else if(v==10){ 
  document.getElementById("JanDT").style.display='none'; document.getElementById("FebDT").style.display='none'; document.getElementById("MarDT").style.display='none';
  document.getElementById("AprDT").style.display='none'; document.getElementById("MayDT").style.display='none'; document.getElementById("JunDT").style.display='none';
  document.getElementById("JulDT").style.display='none'; document.getElementById("AugDT").style.display='none'; document.getElementById("SepDT").style.display='none';
  document.getElementById("OctDT").style.display='block'; document.getElementById("NovDT").style.display='none'; document.getElementById("DecDT").style.display='none';}
  else if(v==11){ 
  document.getElementById("JanDT").style.display='none'; document.getElementById("FebDT").style.display='none'; document.getElementById("MarDT").style.display='none';
  document.getElementById("AprDT").style.display='none'; document.getElementById("MayDT").style.display='none'; document.getElementById("JunDT").style.display='none';
  document.getElementById("JulDT").style.display='none'; document.getElementById("AugDT").style.display='none'; document.getElementById("SepDT").style.display='none';
  document.getElementById("OctDT").style.display='none'; document.getElementById("NovDT").style.display='block'; document.getElementById("DecDT").style.display='none';}
  else if(v==12){ 
  document.getElementById("JanDT").style.display='none'; document.getElementById("FebDT").style.display='none'; document.getElementById("MarDT").style.display='none';
  document.getElementById("AprDT").style.display='none'; document.getElementById("MayDT").style.display='none'; document.getElementById("JunDT").style.display='none';
  document.getElementById("JulDT").style.display='none'; document.getElementById("AugDT").style.display='none'; document.getElementById("SepDT").style.display='none';
  document.getElementById("OctDT").style.display='none'; document.getElementById("NovDT").style.display='none'; document.getElementById("DecDT").style.display='block';}
}
</script>
</head>
<body class="body">
<table class="table">

<tr>

 <td><span id="SpanHoliCheck"></span>

  <table class="menutable"><tr><td><?php if($_SESSION['login'] = true){ require_once("EMenu.php"); } ?></td></tr></table>

 </td>

</tr>

<tr>

 <td>

  <table width="100%" style="margin-top:0px;">

    <tr>

	  <td valign="top"><?php if($_SESSION['login'] = true){ require_once("EWelcome.php"); } ?></td>

	</tr>

	<tr><td>&nbsp;</td></tr>

	 <tr>

	  <td valign="top">

	     <table border="0" style="width:100%; height:300px; float:none;" cellpadding="0">

		  <tr>

		   <td valign="top" style="width:650px;"> 

<?php //*************************************************************************************************************************************************** ?>	   

		     <table border="0" id="Activity">

			  <tr>

			     <td id="Anni" valign="top">

				    <table border="0">

						  <tr height="20">

						    <td align="left" valign="top" width="150">
<?php include("EmpImgEmp.php"); ?>
<?php //echo "<img width=105px height=125px src=\"show_images.php?id=".$EmployeeId."\">\n";?></td>

						  </tr>

					 </table>

				 </td>

				  <form name="AskQform" method="post" onSubmit="return validate(this)"/>

				 <td style="width:525px;" valign="top">

<?php $CFromDate=date("Y").'-01-01'; $CToDate=date("Y").'-12-31'; 

      $sqlCheck=mysql_query("select * from hrm_employee_applyleave where EmployeeID=".$EmployeeId." AND (Apply_Date>='".$CFromDate."' AND Apply_Date<='".$CToDate."') order by Apply_Date DESC", $con); $rowCheck=mysql_num_rows($sqlCheck); 

	  

$sqlPL=mysql_query("select * from hrm_employee_applyleave where Leave_Type='PL' AND LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$EmployeeId." AND (Apply_Date>='".$CFromDate."' AND Apply_Date<='".$CToDate."')", $con);

$sqlEL=mysql_query("select * from hrm_employee_applyleave where Leave_Type='EL' AND LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$EmployeeId." AND (Apply_Date>='".$CFromDate."' AND Apply_Date<='".$CToDate."')", $con);

$rowPL=mysql_num_rows($sqlPL);  $rowEL=mysql_num_rows($sqlEL); 



$sqlSumCL=mysql_query("select SUM(Apply_TotalDay) as SumCL from hrm_employee_applyleave where LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$EmployeeId." AND (Apply_Date>='".$CFromDate."' AND Apply_Date<='".$CToDate."') AND (Leave_Type='CL' OR Leave_Type='CH')", $con); while($resSumCL=mysql_fetch_array($sqlSumCL)){$SumCL=$resSumCL['SumCL'];}

$sqlSumSL=mysql_query("select SUM(Apply_TotalDay) as SumSL from hrm_employee_applyleave where LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$EmployeeId." AND (Apply_Date>='".$CFromDate."' AND Apply_Date<='".$CToDate."') AND (Leave_Type='SL' OR Leave_Type='SH')", $con); while($resSumSL=mysql_fetch_array($sqlSumSL)){$SumSL=$resSumSL['SumSL'];}

$sqlSumPL=mysql_query("select SUM(Apply_TotalDay) as SumPL from hrm_employee_applyleave where Leave_Type='PL' AND LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$EmployeeId." AND (Apply_Date>='".$CFromDate."' AND Apply_Date<='".$CToDate."')", $con); while($resSumPL=mysql_fetch_array($sqlSumPL)){$SumPL=$resSumPL['SumPL'];}

$sqlSumEL=mysql_query("select SUM(Apply_TotalDay) as SumEL from hrm_employee_applyleave where Leave_Type='EL' AND LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$EmployeeId." AND (Apply_Date>='".$CFromDate."' AND Apply_Date<='".$CToDate."')", $con); while($resSumEL=mysql_fetch_array($sqlSumEL)){$SumEL=$resSumEL['SumEL'];}

$sqlSumOL=mysql_query("select SUM(Apply_TotalDay) as SumOL from hrm_employee_applyleave where Leave_Type='FL' AND LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$EmployeeId." AND (Apply_Date>='".$CFromDate."' AND Apply_Date<='".$CToDate."')", $con); while($resSumOL=mysql_fetch_array($sqlSumOL)){$SumOL=$resSumOL['SumOL'];}



$sqlASumCL=mysql_query("select SUM(Apply_TotalDay) as ASumCL from hrm_employee_applyleave where LeaveStatus!=4 AND LeaveStatus!=3 AND LeaveStatus!=2 AND EmployeeID=".$EmployeeId." AND (Apply_Date>='".$CFromDate."' AND Apply_Date<='".$CToDate."') AND (Leave_Type='CL' OR Leave_Type='CH')", $con); while($resASumCL=mysql_fetch_array($sqlASumCL)){$ASumCL=$resASumCL['ASumCL'];}

$sqlASumSL=mysql_query("select SUM(Apply_TotalDay) as ASumSL from hrm_employee_applyleave where LeaveStatus!=4 AND LeaveStatus!=3 AND LeaveStatus!=2 AND EmployeeID=".$EmployeeId." AND (Apply_Date>='".$CFromDate."' AND Apply_Date<='".$CToDate."') AND (Leave_Type='SL' OR Leave_Type='SH')", $con); while($resASumSL=mysql_fetch_array($sqlASumSL)){$ASumSL=$resASumSL['ASumSL'];}

$sqlASumPL=mysql_query("select SUM(Apply_TotalDay) as ASumPL from hrm_employee_applyleave where Leave_Type='PL' AND LeaveStatus!=4 AND LeaveStatus!=3 AND LeaveStatus!=2 AND EmployeeID=".$EmployeeId." AND (Apply_Date>='".$CFromDate."' AND Apply_Date<='".$CToDate."')", $con); while($resASumPL=mysql_fetch_array($sqlASumPL)){$ASumPL=$resASumPL['ASumPL'];}

$sqlASumEL=mysql_query("select SUM(Apply_TotalDay) as ASumEL from hrm_employee_applyleave where Leave_Type='EL' AND LeaveStatus!=4 AND LeaveStatus!=3 AND LeaveStatus!=2 AND EmployeeID=".$EmployeeId." AND (Apply_Date>='".$CFromDate."' AND Apply_Date<='".$CToDate."')", $con); while($resASumEL=mysql_fetch_array($sqlASumEL)){$ASumEL=$resASumEL['ASumEL'];}

$sqlASumOL=mysql_query("select SUM(Apply_TotalDay) as ASumOL from hrm_employee_applyleave where Leave_Type='FL' AND LeaveStatus!=4 AND LeaveStatus!=3 AND LeaveStatus!=2 AND EmployeeID=".$EmployeeId." AND (Apply_Date>='".$CFromDate."' AND Apply_Date<='".$CToDate."')", $con); while($resASumOL=mysql_fetch_array($sqlASumOL)){$ASumOL=$resASumOL['ASumOL'];}





 if(date("m")==12)

 { $TotN_CL=0; $TotN_SL=0; $TotN_PL=0; $TotN_EL=0; $TotN_OL=0;} 

 else 

 { $NextMonth=date("m")+1;

$Sdate=date("Y-".$NextMonth."-01"); $Y=date("Y");

$sqlSNextCL=mysql_query("select count(AttValue) as SNextCL from hrm_employee_attendance where AttValue='CL' AND EmployeeID=".$EmployeeId." AND AttDate>='".$Sdate."' AND Year=".$Y, $con); while($resSNextCL=mysql_fetch_array($sqlSNextCL)){$SumNextCL=$resSNextCL['SNextCL'];}

$sqlSNextCH=mysql_query("select count(AttValue) as SNextCH from hrm_employee_attendance where AttValue='CH' AND EmployeeID=".$EmployeeId." AND AttDate>='".$Sdate."' AND Year=".$Y, $con); while($resSNextCH=mysql_fetch_array($sqlSNextCH)){$SumNextCH=$resSNextCH['SNextCH']/2;}

$sqlSNextSL=mysql_query("select count(AttValue) as SNextSL from hrm_employee_attendance where AttValue='SL' AND EmployeeID=".$EmployeeId." AND AttDate>='".$Sdate."' AND Year=".$Y, $con); while($resSNextSL=mysql_fetch_array($sqlSNextSL)){$SumNextSL=$resSNextSL['SNextSL'];}



$sqlSNextSH=mysql_query("select count(AttValue) as SNextSH from hrm_employee_attendance where AttValue='SH' AND EmployeeID=".$EmployeeId." AND AttDate>='".$Sdate."' AND Year=".$Y, $con); while($resSNextSH=mysql_fetch_array($sqlSNextSH)){$SumNextSH=$resSNextSH['SNextSH']/2;}

$sqlSNextPL=mysql_query("select count(AttValue) as SNextPL from hrm_employee_attendance where AttValue='PL' AND EmployeeID=".$EmployeeId." AND AttDate>='".$Sdate."' AND Year=".$Y, $con); while($resSNextPL=mysql_fetch_array($sqlSNextPL)){$SumNextPL=$resSNextPL['SNextPL'];}

$sqlSNextEL=mysql_query("select count(AttValue) as SNextEL from hrm_employee_attendance where AttValue='EL' AND EmployeeID=".$EmployeeId." AND AttDate>='".$Sdate."' AND Year=".$Y, $con); while($resSNextEL=mysql_fetch_array($sqlSNextEL)){$SumNextEL=$resSNextEL['SNextEL'];}

$sqlSNextOL=mysql_query("select count(AttValue) as SNextOL from hrm_employee_attendance where AttValue='FL' AND EmployeeID=".$EmployeeId." AND AttDate>='".$Sdate."' AND Year=".$Y, $con); while($resSNextOL=mysql_fetch_array($sqlSNextOL)){$SumNextOL=$resSNextOL['SNextOL'];}



$TotN_CL=$SumNextCL+$SumNextCH; 

$TotN_SL=$SumNextSL+$SumNextSH; 

$TotN_PL=$SumNextPL; 

$TotN_EL=$SumNextEL;

$TotN_OL=$SumNextOL;



 }

//echo 'c='.$TotN_CL=$SumNextCL+$SumNextCH.'<br>'; 

//echo 's='.$TotN_SL=$SumNextSL+$SumNextSH.'<br>'; 

//echo 'p='.$TotN_PL=$SumNextPL.'<br>'; 

//echo'e='. $TotN_EL=$SumNextEL.'<br>';



$sMax = mysql_query("SELECT * FROM hrm_employee_applyleave where EmployeeID=".$EmployeeId."  AND LeaveStatus!=4 AND LeaveStatus!=3 AND (Apply_Date>='".$CFromDate."' AND Apply_Date<='".$CToDate."')", $con); $rMax=mysql_num_rows($sMax);

$sqlMax = mysql_query("SELECT MAX(ApplyLeaveId) as MaxLeaveId FROM hrm_employee_applyleave where EmployeeID=".$EmployeeId." AND LeaveStatus!=4 AND LeaveStatus!=3 AND (Apply_Date>='".$CFromDate."' AND Apply_Date<='".$CToDate."')", $con); if($rMax>0){ $resMax = mysql_fetch_assoc($sqlMax);

$sqlLMax = mysql_query("SELECT * FROM hrm_employee_applyleave where ApplyLeaveId=".$resMax['MaxLeaveId'], $con); $resLMax = mysql_fetch_assoc($sqlLMax); } 

//$dTo=date("d",strtotime($resLMax['Apply_ToDate'])); $NextDay=$dTo+1; $DayNext=date($NextDay."-m-Y",strtotime($resLMax['Apply_ToDate'])); 

$DayNext1=date("d-m-Y",strtotime($resLMax['Apply_ToDate'].'+1 day')); $DayNext2=date("Y-m-d",strtotime($resLMax['Apply_ToDate'].'+1 day'));   

$DayNext_2=date("Y-m-d",strtotime($resLMax['Apply_ToDate'].'+2 day')); $DayNext_3=date("Y-m-d",strtotime($resLMax['Apply_ToDate'].'+3 day'));
$DayNext_4=date("Y-m-d",strtotime($resLMax['Apply_ToDate'].'+4 day'));

?>		 

<input type="hidden" id="AppPL" value="<?php if($rowPL!=''){echo $rowPL; } else {echo 0;}?>" />

<input type="hidden" id="AppEL" value="<?php if($rowEL!=''){echo $rowEL; } else {echo 0;}?>" />

<input type="hidden" id="SumCL" value="<?php if($SumCL!=''){echo $SumCL; } else {echo 0;}?>" />

<input type="hidden" id="SumSL" value="<?php if($SumSL!=''){echo $SumSL; } else {echo 0;}?>" />

<input type="hidden" id="SumPL" value="<?php if($SumPL!=''){echo $SumPL; } else {echo 0;}?>" />

<input type="hidden" id="SumEL" value="<?php if($SumEL!=''){echo $SumEL; } else {echo 0;} ?>" />

<input type="hidden" id="SumOL" value="<?php if($SumOL!=''){echo $SumOL; } else {echo 0;} ?>" />

<input type="hidden" id="ASumCL" value="<?php if($ASumCL!=''){echo $ASumCL; } else {echo 0;} ?>" />

<input type="hidden" id="ASumSL" value="<?php if($ASumSL!=''){echo $ASumSL;} else {echo 0;} ?>" />

<input type="hidden" id="ASumPL" value="<?php if($ASumPL!=''){echo $ASumPL; } else {echo 0;}?>" />

<input type="hidden" id="ASumEL" value="<?php if($ASumEL!=''){echo $ASumEL; } else {echo 0;}?>" />

<input type="hidden" id="ASumOL" value="<?php if($ASumOL!=''){echo $ASumOL; } else {echo 0;}?>" />



<input type="hidden" id="Next_CL" value="<?php if($TotN_CL!=''){echo $TotN_CL; } else {echo 0;} ?>" />

<input type="hidden" id="Next_SL" value="<?php if($TotN_SL!=''){echo $TotN_SL;} else {echo 0;} ?>" />

<input type="hidden" id="Next_PL" value="<?php if($TotN_PL!=''){echo $TotN_PL; } else {echo 0;}?>" />

<input type="hidden" id="Next_EL" value="<?php if($TotN_EL!=''){echo $TotN_EL; } else {echo 0;}?>" />

<input type="hidden" id="Next_OL" value="<?php if($TotN_OL!=''){echo $TotN_OL; } else {echo 0;}?>" />



<input type="hidden" id="MaxLeaveType" name="MaxLeaveType" value="<?php echo $resLMax['Leave_Type']; ?>" />

<input type="hidden" id="MaxLeaveFrom" name="MaxLeaveFrom" value="<?php echo $resLMax['Apply_FromDate']; ?>" />

<input type="hidden" id="MaxLeaveTo" name="MaxLeaveTo" value="<?php echo $resLMax['Apply_ToDate']; ?>" />

<input type="hidden" id="MaxLeaveTotDay" name="MaxLeaveTotDay" value="<?php echo $resLMax['Apply_TotalDay']; ?>" />

<input type="hidden" id="NextDay" name="NextDay" value="<?php echo $DayNext1; ?>" /><input type="hidden" id="NextDay2" name="NextDay2" value="<?php echo $DayNext2; ?>" />

<input type="hidden" id="NextDay_2" name="NextDay_2" value="<?php echo $DayNext_2; ?>" /><input type="hidden" id="NextDay_3" name="NextDay_3" value="<?php echo $DayNext_3; ?>" />
<input type="hidden" id="NextDay_4" name="NextDay_4" value="<?php echo $DayNext_4; ?>" />

<input type="hidden" id="Year" name="Year" value="<?php echo date("Y"); ?>" />

<?php $sqlRep=mysql_query("select ReportingEmailId from hrm_employee_general where EmployeeID=".$EmployeeId, $con); $resRep=mysql_fetch_assoc($sqlRep);

      $sqlHod=mysql_query("select EmailId_Vnr from hrm_employee_general INNER JOIN hrm_employee_reporting ON hrm_employee_general.EmployeeID=hrm_employee_reporting.HodId where hrm_employee_reporting.EmployeeID=".$EmployeeId, $con); $resHod=mysql_fetch_assoc($sqlHod);

	  $sqlSelf=mysql_query("select EmailId_Vnr from hrm_employee_general where EmployeeID=".$EmployeeId, $con); $resSelf=mysql_fetch_assoc($sqlSelf);

?>

<input type="hidden" name="EmailRep" value="<?php echo $resRep['ReportingEmailId']; ?>" />

<input type="hidden" name="EmailHod" value="<?php echo $resHod['EmailId_Vnr']; ?>" />

<input type="hidden" name="EmailSelf" value="<?php echo $resSelf['EmailId_Vnr']; ?>" />

<input type="hidden" name="Ename" value="<?php echo $M.' '.$Ename; ?>" />

<input type="hidden" name="EmpId" id="EmpId" value="<?php echo $EmployeeId; ?>" />

<table border="0">

<tr><td colspan="5">&nbsp;<font color="#106809" style='font-family:Times New Roman;font-size:15px;'><b>Leave Application</b>

	   &nbsp;&nbsp;&nbsp; <font color="#FF0000" style='font-family:Times New Roman;font-size:15px;'>

	   <b id="span"><?php echo $msg; ?></b></font></td></tr>

<tr><td height="5" colspan="5">&nbsp;</td></tr>

<tr height="20">

<td style='font-family:Times New Roman;font-size:14px; width:180px;'><font color="#620000" ><b>Date From <b><font color="#FF0000" size="2">*</font></b> :</b></td>

<td style='width:113px;'><input name="FromDate" id="FromDate" class="InputText" readonly>&nbsp;<button id="f_btn1" class="CalenderButton"></button>

<script type="text/javascript">  var cal = Calendar.setup({ onSelect:  function(cal) { cal.hide()}, showTime: true }); 

cal.manageFields("f_btn1", "FromDate", "%d-%m-%Y");</script></td>

<td width="4">&nbsp;</td>   

<td style='font-family:Times New Roman;font-size:14px; width:100px;'><font color="#620000" ><b>Date To <b><font color="#FF0000" size="2">*</font></b> :</b></td>

<td style='width:113px;'><input name="ToDate" id="ToDate" class="InputText" readonly>&nbsp;<button id="f_btn2" class="CalenderButton"></button>

<script type="text/javascript">  var cal = Calendar.setup({ onSelect:  function(cal) { cal.hide()}, showTime: true }); 

cal.manageFields("f_btn2", "ToDate", "%d-%m-%Y");</script></td>

</tr>

<tr height="20">

<td style='font-family:Times New Roman;font-size:14px; width:180px;'><font color="#620000" ><b>Contact No. <b><font color="#FF0000" size="2">*</font></b> :</b></td>

<td style='width:113px;'><input name="ContactNo" id="ContactNo" class="InputText" style="width:112px;" maxlength="12" onKeyDown="CheckHoliD()"></td>

<td width="4">&nbsp;</td>

<td style='font-family:Times New Roman;font-size:14px; width:100px;'><font color="#620000" ><b>Leave Type<b><font color="#FF0000" size="2">*</font></b> :</b></td>

<td style='width:113px;'><select name="LeaveType" id="LeaveType" class="InputText" style="width:112px;" onChange="CheckHoliD2(this.value)">

<option style="background-color:#009F9F;" value="0" selected>Select</option>

<option value="CL">CL-(Casual)</option>

<option value="SL">SL-(Sick Leave)</option></option>

<option value="PL">PL-(Privilege)</option></option>

<option value="EL">EL-(Earned)</option>

<option value="FL">FL-(Festival Leave)</option>

<option value="TL">TL-(Transfer Leave)</option>

<option value="CH">Half Day of CL</option>

<option value="SH">Half Day of SL</option>

</select>

<input type="hidden" id="Month" name="Month" value="<?php echo date("m"); ?>" />

<span id="SpanOpHoDate"><input type="hidden" name="OpHoDate" id="OpHoDate" value="" /></span>

<input type="hidden" name="FD" id="FD" value="" /><input type="hidden" name="TD" id="TD" value="" /></td>

</tr>

<?php // ?>

<tr>

<td style='font-family:Times New Roman;font-size:14px;width:180px;color:#620000;'>

<div id="OpHTD1" style="display:none;"><b>Festival Leave <b><font color="#FF0000" size="2">*</font></b> :</b></div></td>

<td colspan="4" style='width:230px;'><div id="OpHTD2" style="display:none;"><select name="OpHo" id="OpHo" class="InputText" style="width:230px;" onChange="CheckOpHoId(this.value)">

<option style="background-color:#009F9F;" value="0" selected>Select</option><?php $sqlOpH=mysql_query("select HoOpId,HoOpName,HoOpDate,HoOpDay from hrm_holiday_optional where Year='".date("Y")."' AND HoOpStatus!='De' AND CompanyId=".$CompanyId." order by HoOpDate ASC", $con); while($resOpH=mysql_fetch_assoc($sqlOpH)){ ?>

<option value="<?php echo $resOpH['HoOpId']; ?>"><?php echo $resOpH['HoOpName'].' - '.$resOpH['HoOpDay'].' - '.date("d M y",strtotime($resOpH['HoOpDate'])); ?></option><?php } ?></select></div>

</td>

</tr>

<?php // ?>

<tr>

<td style='font-family:Times New Roman;font-size:14px;width:180px;'><font color="#620000"><b>Address During Leave <b><font color="#FF0000" size="2">*</font></b> :</b></td>

<td colspan="4" valign="top"><input name="DuAdd" id="DuAdd" class="InputText" style="width:343px;" maxlength="50"></td>   

</tr>	

<tr>

<td style='font-family:Times New Roman;font-size:14px;width:180px;' valign="top"><font color="#620000"><b>Reason For Leave <b><font color="#FF0000" size="2">*</font></b> :</b><br>(Please ignore special characters.)</td>

<td colspan="4"><textarea name="Reason" id="Reason" cols="40" rows="5"></textarea></td>   

</tr>		

</table>

</td>

</tr>

<?php $sqlApp=mysql_query("select * from hrm_employee_reporting where EmployeeID='".$EmployeeId."'", $con); $resApp=mysql_fetch_assoc($sqlApp); ?>			 

<tr>

<td>&nbsp;<input type="hidden" name="AppId" id="AppId" value="<?php if($resApp['AppraiserId']==''){ echo '0'; } else {echo $resApp['AppraiserId'];} ?>" />

	   <input type="hidden" name="RevId" id="RevId" value="<?php if($resApp['ReviewerId']==''){ echo '0'; } else {echo $resApp['ReviewerId'];} ?>" /> 

	   <input type="hidden" name="HodId" id="HodId" value="<?php if($resApp['HodId']==''){ echo '0'; } else {echo $resApp['HodId'];} ?>" /> 



<?php $sqlL=mysql_query("select * from hrm_employee_monthlyleave_balance where EmployeeID=".$EmployeeId." AND Month='".date("m")."' AND Year='".date("Y")."'", $con); 

      $resL=mysql_fetch_array($sqlL); ?>





<input type="hidden" name="BalCL" id="BalCL" value="<?php if($resL['BalanceCL']!=''){echo $resL['BalanceCL'];}else{echo 0;} ?>"/>

<input type="hidden" name="BalSL" id="BalSL" value="<?php if($resL['BalanceSL']!=''){echo $resL['BalanceSL'];}else{echo 0;} ?>" />	

<input type="hidden" name="BalPL" id="BalPL" value="<?php if($resL['BalancePL']!=''){echo $resL['BalancePL'];}else{echo 0;} ?>" /> 

<input type="hidden" name="BalEL" id="BalEL" value="<?php if($resL['BalanceEL']!=''){echo $resL['BalanceEL'];}else{echo 0;} ?>" />	  

<input type="hidden" name="BalOL" id="BalOL" value="<?php if($resL['BalanceOL']!=''){echo $resL['BalanceOL'];}else{echo 0;} ?>" />	



</td>

<td align="Right" class="fontButton" width="480">

<table border="0" width="480">

 <tr>

  <td style="font-family:Times New Roman; color:#FFFFFF; font-size:15px;width:300px;">

<?php if($rowCheck>0) { ?><a href="#" onClick="ShowAppLeave(<?php echo $EmployeeId; ?>)"><b style="color:#FFFFFF;">Previous Apply Leave Status</b></a><?php } ?>

  </td>
<?php 
if(date("m")==1 OR date("m")==3 OR date("m")==5 OR date("m")==7 OR date("m")==8 OR date("m")==10 OR date("m")==12){$date=31;}
elseif(date("m")==4 OR date("m")==6 OR date("m")==9 OR date("m")==11){$date=30;}
elseif(date("m")==2)
{
  if(date("Y")==2012 OR date("Y")==2016 OR date("Y")==2020 OR date("Y")==2024 OR date("Y")==2028 OR date("Y")==2032 OR date("Y")==2036 OR date("Y")==2040){$date=29;}
  else{$date=28;}
}
if(date("d")!=$date){
?>
  <td align="right"><input type="submit" name="AppLeave" id="AppLeave" style="width:90px;" value="Send"></td>
  <td align="right" style="width:70px;"><input type="button" name="Refresh" id="Refresh" style="width:90px;" value="Refresh" onClick="javascript:window.location='ApplyLeave.php'"/></td>
<?php } ?>
</tr>

</form>
</table>
</td>
</tr>
<?php if(date("d")==$date){ ?>
<tr>
  <td></td>
  <td colspan="3" style="font-family:Times New Roman;color:#FF0000;font-size:18px;"><?php echo 'Please apply through mail, blocked for salary processing.!'; ?></td>
</tr>
<?php } ?>
</table>

			

<?php //*************************************************************************************************************************************************** ?>

	</td>

		   

<?php /********************************* Leave Details ************************************/?>	

    <td align="left" style="width:400px;" valign="top">

	  <table border="0">

	    <tr>

		 <td>

		   <table border="0">

		     <tr>

			  <td style="width:100px; font-family:Times New Roman; font-size:14px;">Select Month:&nbsp;</td>

			  <td style="width:100px;">

<?php if($_REQUEST['m']==1){$SelM='January';}elseif($_REQUEST['m']==2){$SelM='February';}elseif($_REQUEST['m']==3){$SelM='March';}elseif($_REQUEST['m']==4){$SelM='April';}elseif($_REQUEST['m']==5){$SelM='May';}elseif($_REQUEST['m']==6){$SelM='June';}elseif($_REQUEST['m']==7){$SelM='July';}elseif($_REQUEST['m']==8){$SelM='August';}elseif($_REQUEST['m']==9){$SelM='September';}elseif($_REQUEST['m']==10){$SelM='October';}elseif($_REQUEST['m']==11){$SelM='November';}elseif($_REQUEST['m']==12){$SelM='December';} ?>			

			               <select style="font-family:Times New Roman; font-size:14px; width:90px;" onChange="SelMonth(this.value)">

<?php if(date("m")==1) { ?><option value="1">January</option><?php } ?>

<?php if(date("m")==2) { ?><option value="2">February</option><option value="1">January</option><?php } ?>			

<?php if(date("m")==3) { ?><option value="3">March</option><option value="2">February</option><option value="1">January</option><?php } ?>	       

<?php if(date("m")==4) { ?><option value="4">April</option><option value="3">March</option><option value="2">February</option><option value="1">January</option><?php } ?>				

<?php if(date("m")==5) { ?><option value="5">May</option><option value="4">April</option><option value="3">March</option><option value="2">February</option><option value="1">January</option><?php } ?>	

<?php if(date("m")==6) { ?><option value="6">June</option><option value="5">May</option><option value="4">April</option><option value="3">March</option><option value="2">February</option><option value="1">January</option><?php } ?>	

<?php if(date("m")==7) { ?><option value="7">July</option><option value="6">June</option><option value="5">May</option><option value="4">April</option><option value="3">March</option><option value="2">February</option><option value="1">January</option><?php } ?>	

<?php if(date("m")==8) { ?><option value="8">August</option><option value="7">July</option><option value="6">June</option><option value="5">May</option><option value="4">April</option><option value="3">March</option><option value="2">February</option><option value="1">January</option><?php } ?>

<?php if(date("m")==9) { ?><option value="9">September</option><option value="8">August</option><option value="7">July</option><option value="6">June</option><option value="5">May</option><option value="4">April</option><option value="3">March</option><option value="2">February</option><option value="1">January</option><?php } ?>

<?php if(date("m")==10) { ?><option value="10">October</option><option value="9">September</option><option value="8">August</option><option value="7">July</option><option value="6">June</option><option value="5">May</option><option value="4">April</option><option value="3">March</option><option value="2">February</option><option value="1">January</option><?php } ?>

<?php if(date("m")==11) { ?><option value="11">November</option><option value="10">October</option><option value="9">September</option><option value="8">August</option><option value="7">July</option><option value="6">June</option><option value="5">May</option><option value="4">April</option><option value="3">March</option><option value="2">February</option><option value="1">January</option><?php } ?>	

<?php if(date("m")==12) { ?><option value="12">December</option><option value="11">November</option><option value="10">October</option><option value="9">September</option><option value="8">August</option><option value="7">July</option><option value="6">June</option><option value="5">May</option><option value="4">April</option><option value="3">March</option><option value="2">February</option><option value="1">January</option><?php } ?>	

			      </select>

			  </td>

	          <td style="width:200px;font-family:Times New Roman;" align="center">

		      &nbsp;<a href="#" onClick="HelpDocleave()"><font color="#000099" size="3" ><b>Leave Rules</b></font></font></a>

		      &nbsp;&nbsp;&nbsp;<a href="#" onClick="LeaveHelpDoc()"><font color="#000099" size="3" ><b>Help Doc</b></font></font></a>

			  </td>

			 </tr>

		   </table>

		 </td>

	   </tr>

<?php $sqlL=mysql_query("select * from hrm_employee_monthlyleave_balance where EmployeeID=".$EmployeeId." AND Month='".date("m")."' AND Year='".date("Y")."'", $con); 

      $resL=mysql_fetch_array($sqlL); ?> 

	   <tr> 

<?php //************ Start Start Start *************************** ?>		    

<?php //********************************************* Jan ****************************// ?>	

<?php $sqlJ=mysql_query("select * from hrm_employee_monthlyleave_balance where EmployeeID=".$EmployeeId." AND Month=1 AND Year='".date("Y")."'", $con); 

      $resJ=mysql_fetch_array($sqlJ); 

	  	  

$NextMonth_1='02'; $Sdate_1=date("Y-".$NextMonth_1."-01"); $Y=date("Y");

$sqlSNextCL_1=mysql_query("select count(AttValue) as SNextCL_1 from hrm_employee_attendance where AttValue='CL' AND EmployeeID=".$EmployeeId." AND AttDate>='".$Sdate_1."' AND Year=".$Y, $con); while($resSNextCL_1=mysql_fetch_array($sqlSNextCL_1)){$SumNextCL_1=$resSNextCL_1['SNextCL_1'];}

$sqlSNextCH_1=mysql_query("select count(AttValue) as SNextCH_1 from hrm_employee_attendance where AttValue='CH' AND EmployeeID=".$EmployeeId." AND AttDate>='".$Sdate_1."' AND Year=".$Y, $con); while($resSNextCH_1=mysql_fetch_array($sqlSNextCH_1)){$SumNextCH_1=$resSNextCH_1['SNextCH_1']/2;}

$sqlSNextSL_1=mysql_query("select count(AttValue) as SNextSL_1 from hrm_employee_attendance where AttValue='SL' AND EmployeeID=".$EmployeeId." AND AttDate>='".$Sdate_1."' AND Year=".$Y, $con); while($resSNextSL_1=mysql_fetch_array($sqlSNextSL_1)){$SumNextSL_1=$resSNextSL_1['SNextSL_1'];}

$sqlSNextSH_1=mysql_query("select count(AttValue) as SNextSH_1 from hrm_employee_attendance where AttValue='SH' AND EmployeeID=".$EmployeeId." AND AttDate>='".$Sdate_1."' AND Year=".$Y, $con); while($resSNextSH_1=mysql_fetch_array($sqlSNextSH_1)){$SumNextSH_1=$resSNextSH_1['SNextSH_1']/2;}

$sqlSNextPL_1=mysql_query("select count(AttValue) as SNextPL_1 from hrm_employee_attendance where AttValue='PL' AND EmployeeID=".$EmployeeId." AND AttDate>='".$Sdate_1."' AND Year=".$Y, $con); while($resSNextPL_1=mysql_fetch_array($sqlSNextPL_1)){$SumNextPL_1=$resSNextPL_1['SNextPL_1'];}

$sqlSNextEL_1=mysql_query("select count(AttValue) as SNextEL_1 from hrm_employee_attendance where AttValue='EL' AND EmployeeID=".$EmployeeId." AND AttDate>='".$Sdate_1."' AND Year=".$Y, $con); while($resSNextEL_1=mysql_fetch_array($sqlSNextEL_1)){$SumNextEL_1=$resSNextEL_1['SNextEL_1'];}

$sqlSNextOL_1=mysql_query("select count(AttValue) as SNextOL_1 from hrm_employee_attendance where AttValue='FL' AND EmployeeID=".$EmployeeId." AND AttDate>='".$Sdate_1."' AND Year=".$Y, $con); while($resSNextOL_1=mysql_fetch_array($sqlSNextOL_1)){$SumNextOL_1=$resSNextOL_1['SNextOL_1'];}



$TotN_CL_1=$SumNextCL_1+$SumNextCH_1; 

$TotN_SL_1=$SumNextSL_1+$SumNextSH_1; 

$TotN_PL_1=$SumNextPL_1; 

$TotN_EL_1=$SumNextEL_1;	

$TotN_OL_1=$SumNextOL_1;  



?>   

<td id="JanDT" style="display:<?php if(date("m")==1){echo 'block';} else {echo 'none';} ?>;width:520px;" valign="top">

<table style="width:<?php if($TotN_CL_1>0 OR $TotN_SL_1>0 OR $TotN_PL_1>0 OR $TotN_EL_1>0 OR $TotN_OL_1>0) { echo '520px'; } else { echo '400px';}?>;" border="1" bgcolor="#FFFFFF">

<tr bgcolor="#7a6189">

 <td colspan="7" bgcolor="#0080FF" align="center" style="font-family:Times New Roman; color:#FFFFFF; font-size:15px; height:25px; width:400px;">

 <b><blink>My Leave </blink>(Month - <font color="#FFFF00">January</font>)</b></td>

 <?php if($TotN_CL_1>0 OR $TotN_SL_1>0 OR $TotN_PL_1>0 OR $TotN_EL_1>0 OR $TotN_OL_1>0) { ?>

 <td colspan="2" bgcolor="#0080FF" align="center" style="font-family:Times New Roman; color:#FFFFFF; font-size:15px; height:25px; width:120px;">

 <b>Future Leave</b></td><?php } ?>

</tr>

<tr bgcolor="#7a6189">

 <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:50px;" valign="top" align="center"><b>LV</b></td>

 <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:50px;" valign="top" align="center"><b>Opening</b></td>

 <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:60px;" valign="top" align="center"><b>Credit</b></td>

 <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:60px;" valign="top" align="center"><b>Total</b></td>

 <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:60px;" valign="top" align="center"><b>EnCash</b></td>

 <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:60px;" valign="top" align="center"><b>Availed</b></td>

 <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:60px;" valign="top" align="center"><b>Balance</b></td>

<?php if($TotN_CL_1>0 OR $TotN_SL_1>0 OR $TotN_PL_1>0 OR $TotN_EL_1>0 OR $TotN_OL_1>0) { ?> 

 <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:60px;" valign="top" align="center"><b>Availed</b></td>

 <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:60px;" valign="top" align="center"><b>Final Balance</b></td><?php } ?>

</tr>

<tr>

 <td class="font1" align="center">CL</td>

 <td class="font1" align="center"><?php if($resJ['OpeningCL']!=''){echo $resJ['OpeningCL'];}else{echo 0;} ?></td>

 <td class="font1" align="center"><?php if($resJ['CreditedCL']!=''){echo $resJ['CreditedCL'];}else{echo 0;} ?></td>

 <td class="font1" align="center"><?php if($resJ['TotCL']!=''){echo $resJ['TotCL'];}else{echo 0;} ?></td>

 <td class="font1" align="center"><?php if($resJ['EnCashCL']!=''){echo $resJ['EnCashCL'];}else{echo 0;} ?></td>

 <td class="font1" align="center"><?php if($resJ['AvailedCL']!=''){echo $resJ['AvailedCL'];}else{echo 0;} ?></td>

 <td class="font1" align="center"><?php if($resJ['BalanceCL']!=''){echo $resJ['BalanceCL'];}else{echo 0;} ?></td>

 <?php if($TotN_CL_1>0 OR $TotN_SL_1>0 OR $TotN_PL_1>0 OR $TotN_EL_1>0 OR $TotN_OL_1>0) { ?>

 <td class="font1" align="center"><?php if($TotN_CL_1!=''){echo $TotN_CL_1;}else{echo 0;} ?></td>

 <?php $FinBalCL_1=$resJ['BalanceCL']-$TotN_CL_1; ?>

 <td class="font1" align="center" bgcolor="#00D200"><b><?php if($FinBalCL_1!=''){echo $FinBalCL_1;}else{echo 0;} ?></b></td><?php } ?>

</tr>

<tr>

 <td class="font1" align="center">SL</td>

 <td class="font1" align="center"><?php if($resJ['OpeningSL']!=''){echo $resJ['OpeningSL'];}else{echo 0;} ?></td>

 <td class="font1" align="center"><?php if($resJ['CreditedSL']!=''){echo $resJ['CreditedSL'];}else{echo 0;} ?></td>

 <td class="font1" align="center"><?php if($resJ['TotSL']!=''){echo $resJ['TotSL'];}else{echo 0;} ?></td>

 <td class="font1" align="center"><?php if($resJ['EnCashSL']!=''){echo $resJ['EnCashSL'];}else{echo 0;} ?></td>

 <td class="font1" align="center"><?php if($resJ['AvailedSL']!=''){echo $resJ['AvailedSL'];}else{echo 0;} ?></td>

 <td class="font1" align="center"><?php if($resJ['BalanceSL']!=''){echo $resJ['BalanceSL'];}else{echo 0;} ?></td>

 <?php if($TotN_CL_1>0 OR $TotN_SL_1>0 OR $TotN_PL_1>0 OR $TotN_EL_1>0 OR $TotN_OL_1>0) { ?>

 <td class="font1" align="center"><?php if($TotN_SL_1!=''){echo $TotN_SL_1;}else{echo 0;}?></td>

 <?php $FinBalSL_1=$resJ['BalanceSL']-$TotN_SL_1; ?>

 <td class="font1" align="center" bgcolor="#00D200"><b><?php if($FinBalSL_1!=''){echo $FinBalSL_1;}else{echo 0;} ?></b></td><?php } ?>

</tr>

<tr>

 <td class="font1" align="center">PL</td>

 <td class="font1" align="center"><?php if($resJ['OpeningPL']!=''){echo $resJ['OpeningPL'];}else{echo 0;} ?></td>

 <td class="font1" align="center"><?php if($resJ['CreditedPL']!=''){echo $resJ['CreditedPL'];}else{echo 0;} ?></td>

 <td class="font1" align="center"><?php if($resJ['TotPL']!=''){echo $resJ['TotPL'];}else{echo 0;} ?></td>

 <td class="font1" align="center"><?php if($resJ['EnCashPL']!=''){echo $resJ['EnCashPL'];}else{echo 0;} ?></td>

 <td class="font1" align="center"><?php if($resJ['AvailedPL']!=''){echo $resJ['AvailedPL'];}else{echo 0;} ?></td>

 <td class="font1" align="center"><?php if($resJ['BalancePL']!=''){echo $resJ['BalancePL'];}else{echo 0;} ?></td>

 <?php if($TotN_CL_1>0 OR $TotN_SL_1>0 OR $TotN_PL_1>0 OR $TotN_EL_1>0 OR $TotN_OL_1>0) { ?>

 <td class="font1" align="center"><?php if($TotN_PL_1!=''){echo $TotN_PL_1;}else{echo 0;} ?></td>

 <?php $FinBalPL_1=$resJ['BalancePL']-$TotN_PL_1; ?>

 <td class="font1" align="center" bgcolor="#00D200"><b><?php if($FinBalPL_1!=''){echo $FinBalPL_1;}else{echo 0;} ?></b></td><?php } ?>

</tr>

<tr>

 <td class="font1" align="center">EL</td>

 <td class="font1" align="center"><?php if($resJ['OpeningEL']!=''){echo $resJ['OpeningEL'];}else{echo 0;} ?></td>

 <td class="font1" align="center"><?php if($resJ['CreditedEL']!=''){echo $resJ['CreditedEL'];}else{echo 0;} ?></td>

 <td class="font1" align="center"><?php if($resJ['TotEL']!=''){echo $resJ['TotEL'];}else{echo 0;} ?></td>

 <td class="font1" align="center"><?php if($resJ['EnCashEL']!=''){echo $resJ['EnCashEL'];}else{echo 0;} ?></td>

 <td class="font1" align="center"><?php if($resJ['AvailedEL']!=''){echo $resJ['AvailedEL'];}else{echo 0;} ?></td>

 <td class="font1" align="center"><?php if($resJ['BalanceEL']!=''){echo $resJ['BalanceEL'];}else{echo 0;} ?></td>

 <?php if($TotN_CL_1>0 OR $TotN_SL_1>0 OR $TotN_PL_1>0 OR $TotN_EL_1>0 OR $TotN_OL_1>0) { ?>

 <td class="font1" align="center"><?php if($TotN_EL_1!=''){echo $TotN_EL_1;}else{echo 0;} ?></td>

 <?php $FinBalEL_1=$resJ['BalanceEL']-$TotN_EL_1; ?>

 <td class="font1" align="center" bgcolor="#00D200"><b><?php if($FinBalEL_1!=''){echo $FinBalEL_1;}else{echo 0;} ?></b></td><?php } ?>

</tr>

<tr>

 <td class="font1" align="center">FL</td>

 <td class="font1" align="center"><?php if($resJ['OpeningOL']!=''){echo $resJ['OpeningOL'];}else{echo 0;} ?></td>

 <td class="font1" align="center"><?php if($resJ['CreditedOL']!=''){echo $resJ['CreditedOL'];}else{echo 0;} ?></td>

 <td class="font1" align="center"><?php if($resJ['TotOL']!=''){echo $resJ['TotOL'];}else{echo 0;} ?></td>

 <td class="font1" align="center"><?php if($resJ['EnCashOL']!=''){echo $resJ['EnCashOL'];}else{echo 0;} ?></td>

 <td class="font1" align="center"><?php if($resJ['AvailedOL']!=''){echo $resJ['AvailedOL'];}else{echo 0;} ?></td>

 <td class="font1" align="center"><?php if($resJ['BalanceOL']!=''){echo $resJ['BalanceOL'];}else{echo 0;} ?></td>

 <?php if($TotN_CL_1>0 OR $TotN_SL_1>0 OR $TotN_PL_1>0 OR $TotN_EL_1>0 OR $TotN_OL_1>0) { ?>

 <td class="font1" align="center"><?php if($TotN_OL_1!=''){echo $TotN_OL_1;}else{echo 0;} ?></td>

 <?php $FinBalOL_1=$resJ['BalanceOL']-$TotN_OL_1; ?>

 <td class="font1" align="center" bgcolor="#00D200"><b><?php if($FinBalOL_1!=''){echo $FinBalOL_1;}else{echo 0;} ?></b></td><?php } ?>

</tr>

</table>

</td>

<?php //********************************************* Feb ****************************// ?>	

<?php $sqlF=mysql_query("select * from hrm_employee_monthlyleave_balance where EmployeeID=".$EmployeeId." AND Month=2 AND Year='".date("Y")."'", $con); 

      $resF=mysql_fetch_array($sqlF); 

	  

$NextMonth_2='03'; $Sdate_2=date("Y-".$NextMonth_2."-01"); $Y=date("Y");

$sqlSNextCL_2=mysql_query("select count(AttValue) as SNextCL_2 from hrm_employee_attendance where AttValue='CL' AND EmployeeID=".$EmployeeId." AND AttDate>='".$Sdate_2."' AND Year=".$Y, $con); while($resSNextCL_2=mysql_fetch_array($sqlSNextCL_2)){$SumNextCL_2=$resSNextCL_2['SNextCL_2'];}

$sqlSNextCH_2=mysql_query("select count(AttValue) as SNextCH_2 from hrm_employee_attendance where AttValue='CH' AND EmployeeID=".$EmployeeId." AND AttDate>='".$Sdate_2."' AND Year=".$Y, $con); while($resSNextCH_2=mysql_fetch_array($sqlSNextCH_2)){$SumNextCH_2=$resSNextCH_2['SNextCH_2']/2;}

$sqlSNextSL_2=mysql_query("select count(AttValue) as SNextSL_2 from hrm_employee_attendance where AttValue='SL' AND EmployeeID=".$EmployeeId." AND AttDate>='".$Sdate_2."' AND Year=".$Y, $con); while($resSNextSL_2=mysql_fetch_array($sqlSNextSL_2)){$SumNextSL_2=$resSNextSL_2['SNextSL_2'];}

$sqlSNextSH_2=mysql_query("select count(AttValue) as SNextSH_2 from hrm_employee_attendance where AttValue='SH' AND EmployeeID=".$EmployeeId." AND AttDate>='".$Sdate_2."' AND Year=".$Y, $con); while($resSNextSH_2=mysql_fetch_array($sqlSNextSH_2)){$SumNextSH_2=$resSNextSH_2['SNextSH_2']/2;}

$sqlSNextPL_2=mysql_query("select count(AttValue) as SNextPL_2 from hrm_employee_attendance where AttValue='PL' AND EmployeeID=".$EmployeeId." AND AttDate>='".$Sdate_2."' AND Year=".$Y, $con); while($resSNextPL_2=mysql_fetch_array($sqlSNextPL_2)){$SumNextPL_2=$resSNextPL_2['SNextPL_2'];}

$sqlSNextEL_2=mysql_query("select count(AttValue) as SNextEL_2 from hrm_employee_attendance where AttValue='EL' AND EmployeeID=".$EmployeeId." AND AttDate>='".$Sdate_2."' AND Year=".$Y, $con); while($resSNextEL_2=mysql_fetch_array($sqlSNextEL_2)){$SumNextEL_2=$resSNextEL_2['SNextEL_2'];}

$sqlSNextOL_2=mysql_query("select count(AttValue) as SNextOL_2 from hrm_employee_attendance where AttValue='FL' AND EmployeeID=".$EmployeeId." AND AttDate>='".$Sdate_2."' AND Year=".$Y, $con); while($resSNextOL_2=mysql_fetch_array($sqlSNextOL_2)){$SumNextOL_2=$resSNextOL_2['SNextOL_2'];}



$TotN_CL_2=$SumNextCL_2+$SumNextCH_2; 

$TotN_SL_2=$SumNextSL_2+$SumNextSH_2; 

$TotN_PL_2=$SumNextPL_2; 

$TotN_EL_2=$SumNextEL_2;

$TotN_OL_2=$SumNextOL_2;	  

	  ?>   

<td id="FebDT" style="display:<?php if(date("m")==2){echo 'block';} else {echo 'none';} ?>;width:540px;" valign="top">

<table style="width:<?php if($TotN_CL_2>0 OR $TotN_SL_2>0 OR $TotN_PL_2>0 OR $TotN_EL_2>0 OR $TotN_OL_2>0) { echo '540px'; } else { echo '360px';}?>;" border="1" bgcolor="#FFFFFF">

<tr bgcolor="#7a6189">

 <td colspan="4" bgcolor="#0080FF" align="center" style="font-family:Times New Roman; color:#FFFFFF; font-size:15px; height:25px; width:360px;">

 <b><blink>My Leave </blink>(Month - <font color="#FFFF00">February</font>)</b></td>

 <?php if($TotN_CL_2>0 OR $TotN_SL_2>0 OR $TotN_PL_2>0 OR $TotN_EL_2>0 OR $TotN_OL_2>0) { ?>

  <td colspan="2" bgcolor="#0080FF" align="center" style="font-family:Times New Roman; color:#FFFFFF; font-size:15px; height:25px; width:180px;">

 <b>Future Leave</b></td><?php } ?>

</tr>

<tr bgcolor="#7a6189">

 <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:90px;" valign="top" align="center"><b>Leave</b></td> 

 <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:90px;" valign="top" align="center"><b>Opening</b></td>

 <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:90px;" valign="top" align="center"><b>Availed</b></td>

 <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:90px;" valign="top" align="center"><b>Balance</b></td>

 <?php if($TotN_CL_2>0 OR $TotN_SL_2>0 OR $TotN_PL_2>0 OR $TotN_EL_2>0 OR $TotN_OL_2>0) { ?>

 <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:90px;" valign="top" align="center"><b>Availed</b></td>

 <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:90px;" valign="top" align="center"><b>Final Balance</b></td><?php } ?>

</tr>

<tr>

 <td class="font1" align="center">CL</td>

 <td class="font1" align="center"><?php echo $resF['OpeningCL']; ?></td>

 <td class="font1" align="center"><?php echo $resF['AvailedCL']; ?></td>

 <td class="font1" align="center"><?php echo $resF['BalanceCL']; ?></td>

 <?php if($TotN_CL_2>0 OR $TotN_SL_2>0 OR $TotN_PL_2>0 OR $TotN_EL_2>0 OR $TotN_OL_2>0) { ?>

 <td class="font1" align="center"><?php echo $TotN_CL_2; ?></td>

 <?php $FinBalCL_2=$resF['BalanceCL']-$TotN_CL_2; ?>

 <td class="font1" align="center" bgcolor="#00D200"><b><?php echo $FinBalCL_2; ?></b></td><?php } ?>

</tr>

<tr>

 <td class="font1" align="center">SL</td>

 <td class="font1" align="center"><?php echo $resF['OpeningSL']; ?></td>

 <td class="font1" align="center"><?php echo $resF['AvailedSL']; ?></td>

 <td class="font1" align="center"><?php echo $resF['BalanceSL']; ?></td>

 <?php if($TotN_CL_2>0 OR $TotN_SL_2>0 OR $TotN_PL_2>0 OR $TotN_EL_2>0 OR $TotN_OL_2>0) { ?>

 <td class="font1" align="center"><?php echo $TotN_SL_2; ?></td>

 <?php $FinBalSL_2=$resF['BalanceSL']-$TotN_SL_2; ?>

 <td class="font1" align="center" bgcolor="#00D200"><b><?php echo $FinBalSL_2; ?></b></td><?php } ?>

</tr>

<tr>

 <td class="font1" align="center">PL</td>

 <td class="font1" align="center"><?php echo $resF['OpeningPL']; ?></td>

 <td class="font1" align="center"><?php echo $resF['AvailedPL']; ?></td>

 <td class="font1" align="center"><?php echo $resF['BalancePL']; ?></td>

 <?php if($TotN_CL_2>0 OR $TotN_SL_2>0 OR $TotN_PL_2>0 OR $TotN_EL_2>0 OR $TotN_OL_2>0) { ?>

 <td class="font1" align="center"><?php echo $TotN_PL_2; ?></td>

 <?php $FinBalPL_2=$resF['BalancePL']-$TotN_PL_2; ?>

 <td class="font1" align="center" bgcolor="#00D200"><b><?php echo $FinBalPL_2; ?></b></td><?php } ?>

</tr>

<tr>

 <td class="font1" align="center">EL</td>

 <td class="font1" align="center"><?php echo $resF['OpeningEL']; ?></td>

 <td class="font1" align="center"><?php echo $resF['AvailedEL']; ?></td>

 <td class="font1" align="center"><?php echo $resF['BalanceEL']; ?></td>

 <?php if($TotN_CL_2>0 OR $TotN_SL_2>0 OR $TotN_PL_2>0 OR $TotN_EL_2>0 OR $TotN_OL_2>0) { ?>

 <td class="font1" align="center"><?php echo $TotN_EL_2; ?></td>

 <?php $FinBalEL_2=$resF['BalanceEL']-$TotN_EL_2; ?>

 <td class="font1" align="center" bgcolor="#00D200"><b><?php echo $FinBalEL_2; ?></b></td><?php } ?>

</tr>

<tr>

 <td class="font1" align="center">FL</td>

 <td class="font1" align="center"><?php echo $resF['OpeningOL']; ?></td>

 <td class="font1" align="center"><?php echo $resF['AvailedOL']; ?></td>

 <td class="font1" align="center"><?php echo $resF['BalanceOL']; ?></td>

 <?php if($TotN_CL_2>0 OR $TotN_SL_2>0 OR $TotN_PL_2>0 OR $TotN_EL_2>0 OR $TotN_OL_2>0) { ?>

 <td class="font1" align="center"><?php echo $TotN_OL_2; ?></td>

 <?php $FinBalOL_2=$resF['BalanceOL']-$TotN_OL_2; ?>

 <td class="font1" align="center" bgcolor="#00D200"><b><?php echo $FinBalOL_2; ?></b></td><?php } ?>

</tr>

</table>

</td>

<?php //********************************************* March ****************************// ?>	

<?php $sqlM=mysql_query("select * from hrm_employee_monthlyleave_balance where EmployeeID=".$EmployeeId." AND Month=3 AND Year='".date("Y")."'", $con); 

      $resM=mysql_fetch_array($sqlM); 

	  

$NextMonth_3='04'; $Sdate_3=date("Y-".$NextMonth_3."-01"); $Y=date("Y");

$sqlSNextCL_3=mysql_query("select count(AttValue) as SNextCL_3 from hrm_employee_attendance where AttValue='CL' AND EmployeeID=".$EmployeeId." AND AttDate>='".$Sdate_3."' AND Year=".$Y, $con); while($resSNextCL_3=mysql_fetch_array($sqlSNextCL_3)){$SumNextCL_3=$resSNextCL_3['SNextCL_3'];}

$sqlSNextCH_3=mysql_query("select count(AttValue) as SNextCH_3 from hrm_employee_attendance where AttValue='CH' AND EmployeeID=".$EmployeeId." AND AttDate>='".$Sdate_3."' AND Year=".$Y, $con); while($resSNextCH_3=mysql_fetch_array($sqlSNextCH_3)){$SumNextCH_3=$resSNextCH_3['SNextCH_3']/2;}

$sqlSNextSL_3=mysql_query("select count(AttValue) as SNextSL_3 from hrm_employee_attendance where AttValue='SL' AND EmployeeID=".$EmployeeId." AND AttDate>='".$Sdate_3."' AND Year=".$Y, $con); while($resSNextSL_3=mysql_fetch_array($sqlSNextSL_3)){$SumNextSL_3=$resSNextSL_3['SNextSL_3'];}

$sqlSNextSH_3=mysql_query("select count(AttValue) as SNextSH_3 from hrm_employee_attendance where AttValue='SH' AND EmployeeID=".$EmployeeId." AND AttDate>='".$Sdate_3."' AND Year=".$Y, $con); while($resSNextSH_3=mysql_fetch_array($sqlSNextSH_3)){$SumNextSH_3=$resSNextSH_3['SNextSH_3']/2;}

$sqlSNextPL_3=mysql_query("select count(AttValue) as SNextPL_3 from hrm_employee_attendance where AttValue='PL' AND EmployeeID=".$EmployeeId." AND AttDate>='".$Sdate_3."' AND Year=".$Y, $con); while($resSNextPL_3=mysql_fetch_array($sqlSNextPL_3)){$SumNextPL_3=$resSNextPL_3['SNextPL_3'];}

$sqlSNextEL_3=mysql_query("select count(AttValue) as SNextEL_3 from hrm_employee_attendance where AttValue='EL' AND EmployeeID=".$EmployeeId." AND AttDate>='".$Sdate_3."' AND Year=".$Y, $con); while($resSNextEL_3=mysql_fetch_array($sqlSNextEL_3)){$SumNextEL_3=$resSNextEL_3['SNextEL_3'];}

$sqlSNextOL_3=mysql_query("select count(AttValue) as SNextOL_3 from hrm_employee_attendance where AttValue='FL' AND EmployeeID=".$EmployeeId." AND AttDate>='".$Sdate_3."' AND Year=".$Y, $con); while($resSNextOL_3=mysql_fetch_array($sqlSNextOL_3)){$SumNextOL_3=$resSNextOL_3['SNextOL_3'];}



$TotN_CL_3=$SumNextCL_3+$SumNextCH_3; 

$TotN_SL_3=$SumNextSL_3+$SumNextSH_3; 

$TotN_PL_3=$SumNextPL_3; 

$TotN_EL_3=$SumNextEL_3;

$TotN_OL_3=$SumNextOL_3;	  

	  

	  ?>   

<td id="MarDT" style="display:<?php if(date("m")==3){echo 'block';} else {echo 'none';} ?>;width:540px;" valign="top">

<table style="width:<?php if($TotN_CL_3>0 OR $TotN_SL_3>0 OR $TotN_PL_3>0 OR $TotN_EL_3>0 OR $TotN_OL_3>0) { echo '540px'; } else { echo '360px';}?>;" border="1" bgcolor="#FFFFFF">

<tr bgcolor="#7a6189">

 <td colspan="4" bgcolor="#0080FF" align="center" style="font-family:Times New Roman; color:#FFFFFF; font-size:15px; height:25px; width:360px;">

 <b><blink>My Leave </blink>(Month - <font color="#FFFF00">March</font>)</b></td>

 <?php if($TotN_CL_3>0 OR $TotN_SL_3>0 OR $TotN_PL_3>0 OR $TotN_EL_3>0 OR $TotN_OL_3>0) { ?>

 <td colspan="2" bgcolor="#0080FF" align="center" style="font-family:Times New Roman; color:#FFFFFF; font-size:15px; height:25px; width:180px;">

 <b>Future Leave</b></td><?php } ?>

</tr>

<tr bgcolor="#7a6189">

 <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:90px;" valign="top" align="center"><b>Leave</b></td> 

 <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:90px;" valign="top" align="center"><b>Opening</b></td>

 <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:90px;" valign="top" align="center"><b>Availed</b></td>

 <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:90px;" valign="top" align="center"><b>Balance</b></td>

 <?php if($TotN_CL_3>0 OR $TotN_SL_3>0 OR $TotN_PL_3>0 OR $TotN_EL_3>0 OR $TotN_OL_3>0) { ?>

 <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:90px;" valign="top" align="center"><b>Availed</b></td>

 <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:90px;" valign="top" align="center"><b>Final Balance</b></td><?php } ?>

</tr>

<tr>

 <td class="font1" align="center">CL</td>

 <td class="font1" align="center"><?php echo $resM['OpeningCL']; ?></td>

 <td class="font1" align="center"><?php echo $resM['AvailedCL']; ?></td>

 <td class="font1" align="center"><?php echo $resM['BalanceCL']; ?></td>

 <?php if($TotN_CL_3>0 OR $TotN_SL_3>0 OR $TotN_PL_3>0 OR $TotN_EL_3>0 OR $TotN_OL_3>0) { ?>

 <td class="font1" align="center"><?php echo $TotN_CL_3; ?></td>

 <?php $FinBalCL_3=$resM['BalanceCL']-$TotN_CL_3; ?>

 <td class="font1" align="center" bgcolor="#00D200"><b><?php echo $FinBalCL_3; ?></b></td><?php } ?>

</tr>

<tr>

 <td class="font1" align="center">SL</td>

 <td class="font1" align="center"><?php echo $resM['OpeningSL']; ?></td>

 <td class="font1" align="center"><?php echo $resM['AvailedSL']; ?></td>

 <td class="font1" align="center"><?php echo $resM['BalanceSL']; ?></td>

 <?php if($TotN_CL_3>0 OR $TotN_SL_3>0 OR $TotN_PL_3>0 OR $TotN_EL_3>0 OR $TotN_OL_3>0) { ?>

  <td class="font1" align="center"><?php echo $TotN_SL_3; ?></td>

 <?php $FinBalSL_3=$resM['BalanceSL']-$TotN_SL_3; ?>

 <td class="font1" align="center" bgcolor="#00D200"><b><?php echo $FinBalSL_3; ?></b></td><?php } ?>

</tr>

<tr>

 <td class="font1" align="center">PL</td>

 <td class="font1" align="center"><?php echo $resM['OpeningPL']; ?></td>

 <td class="font1" align="center"><?php echo $resM['AvailedPL']; ?></td>

 <td class="font1" align="center"><?php echo $resM['BalancePL']; ?></td>

 <?php if($TotN_CL_3>0 OR $TotN_SL_3>0 OR $TotN_PL_3>0 OR $TotN_EL_3>0 OR $TotN_OL_3>0) { ?>

  <td class="font1" align="center"><?php echo $TotN_PL_3; ?></td>

 <?php $FinBalPL_3=$resM['BalancePL']-$TotN_PL_3; ?>

 <td class="font1" align="center" bgcolor="#00D200"><b><?php echo $FinBalPL_3; ?></b></td><?php } ?>

</tr>

<tr>

 <td class="font1" align="center">EL</td>

 <td class="font1" align="center"><?php echo $resM['OpeningEL']; ?></td>

 <td class="font1" align="center"><?php echo $resM['AvailedEL']; ?></td>

 <td class="font1" align="center"><?php echo $resM['BalanceEL']; ?></td>

 <?php if($TotN_CL_3>0 OR $TotN_SL_3>0 OR $TotN_PL_3>0 OR $TotN_EL_3>0 OR $TotN_OL_3>0) { ?>

  <td class="font1" align="center"><?php echo $TotN_EL_3; ?></td>

 <?php $FinBalEL_3=$resM['BalanceEL']-$TotN_EL_3; ?>

 <td class="font1" align="center" bgcolor="#00D200"><b><?php echo $FinBalEL_3; ?></b></td><?php } ?>

</tr>

<tr>

 <td class="font1" align="center">FL</td>

 <td class="font1" align="center"><?php echo $resM['OpeningOL']; ?></td>

 <td class="font1" align="center"><?php echo $resM['AvailedOL']; ?></td>

 <td class="font1" align="center"><?php echo $resM['BalanceOL']; ?></td>

 <?php if($TotN_CL_3>0 OR $TotN_SL_3>0 OR $TotN_PL_3>0 OR $TotN_EL_3>0 OR $TotN_OL_3>0) { ?>

  <td class="font1" align="center"><?php echo $TotN_OL_3; ?></td>

 <?php $FinBalOL_3=$resM['BalanceOL']-$TotN_OL_3; ?>

 <td class="font1" align="center" bgcolor="#00D200"><b><?php echo $FinBalOL_3; ?></b></td><?php } ?>

</tr>

</table>

</td>

<?php //********************************************* April ****************************// ?>	

<?php $sqlA=mysql_query("select * from hrm_employee_monthlyleave_balance where EmployeeID=".$EmployeeId." AND Month=4 AND Year='".date("Y")."'", $con); 

      $resA=mysql_fetch_array($sqlA); 

	  

$NextMonth_4='05'; $Sdate_4=date("Y-".$NextMonth_4."-01"); $Y=date("Y");

$sqlSNextCL_4=mysql_query("select count(AttValue) as SNextCL_4 from hrm_employee_attendance where AttValue='CL' AND EmployeeID=".$EmployeeId." AND AttDate>='".$Sdate_4."' AND Year=".$Y, $con); while($resSNextCL_4=mysql_fetch_array($sqlSNextCL_4)){$SumNextCL_4=$resSNextCL_4['SNextCL_4'];}

$sqlSNextCH_4=mysql_query("select count(AttValue) as SNextCH_4 from hrm_employee_attendance where AttValue='CH' AND EmployeeID=".$EmployeeId." AND AttDate>='".$Sdate_4."' AND Year=".$Y, $con); while($resSNextCH_4=mysql_fetch_array($sqlSNextCH_4)){$SumNextCH_4=$resSNextCH_4['SNextCH_4']/2;}

$sqlSNextSL_4=mysql_query("select count(AttValue) as SNextSL_4 from hrm_employee_attendance where AttValue='SL' AND EmployeeID=".$EmployeeId." AND AttDate>='".$Sdate_4."' AND Year=".$Y, $con); while($resSNextSL_4=mysql_fetch_array($sqlSNextSL_4)){$SumNextSL_4=$resSNextSL_4['SNextSL_4'];}

$sqlSNextSH_4=mysql_query("select count(AttValue) as SNextSH_4 from hrm_employee_attendance where AttValue='SH' AND EmployeeID=".$EmployeeId." AND AttDate>='".$Sdate_4."' AND Year=".$Y, $con); while($resSNextSH_4=mysql_fetch_array($sqlSNextSH_4)){$SumNextSH_4=$resSNextSH_4['SNextSH_4']/2;}

$sqlSNextPL_4=mysql_query("select count(AttValue) as SNextPL_4 from hrm_employee_attendance where AttValue='PL' AND EmployeeID=".$EmployeeId." AND AttDate>='".$Sdate_4."' AND Year=".$Y, $con); while($resSNextPL_4=mysql_fetch_array($sqlSNextPL_4)){$SumNextPL_4=$resSNextPL_4['SNextPL_4'];}

$sqlSNextEL_4=mysql_query("select count(AttValue) as SNextEL_4 from hrm_employee_attendance where AttValue='EL' AND EmployeeID=".$EmployeeId." AND AttDate>='".$Sdate_4."' AND Year=".$Y, $con); while($resSNextEL_4=mysql_fetch_array($sqlSNextEL_4)){$SumNextEL_4=$resSNextEL_4['SNextEL_4'];}

$sqlSNextOL_4=mysql_query("select count(AttValue) as SNextOL_4 from hrm_employee_attendance where AttValue='FL' AND EmployeeID=".$EmployeeId." AND AttDate>='".$Sdate_4."' AND Year=".$Y, $con); while($resSNextOL_4=mysql_fetch_array($sqlSNextOL_4)){$SumNextOL_4=$resSNextOL_4['SNextOL_4'];}



$TotN_CL_4=$SumNextCL_4+$SumNextCH_4; 

$TotN_SL_4=$SumNextSL_4+$SumNextSH_4; 

$TotN_PL_4=$SumNextPL_4; 

$TotN_EL_4=$SumNextEL_4;	

$TotN_OL_4=$SumNextOL_4;  

	  

	  ?>   

<td id="AprDT" style="display:<?php if(date("m")==4){echo 'block';} else {echo 'none';} ?>;width:540px;" valign="top">

<table style="width:<?php if($TotN_CL_4>0 OR $TotN_SL_4>0 OR $TotN_PL_4>0 OR $TotN_EL_4>0 OR $TotN_OL_4>0) { echo '540px'; } else { echo '360px';}?>;" border="1" bgcolor="#FFFFFF">

<tr bgcolor="#7a6189">

 <td colspan="4" bgcolor="#0080FF" align="center" style="font-family:Times New Roman; color:#FFFFFF; font-size:15px; height:25px; width:360px;">

 <b><blink>My Leave </blink>(Month - <font color="#FFFF00">April</font>)</b></td>

 <?php if($TotN_CL_4>0 OR $TotN_SL_4>0 OR $TotN_PL_4>0 OR $TotN_EL_4>0 OR $TotN_OL_4>0) { ?>

 <td colspan="2" bgcolor="#0080FF" align="center" style="font-family:Times New Roman; color:#FFFFFF; font-size:15px; height:25px; width:180px;">

 <b>Future Leave</b></td><?php } ?>

</tr>

<tr bgcolor="#7a6189">

 <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:90px;" valign="top" align="center"><b>Leave</b></td> 

 <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:90px;" valign="top" align="center"><b>Opening</b></td>

 <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:90px;" valign="top" align="center"><b>Availed</b></td>

 <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:90px;" valign="top" align="center"><b>Balance</b></td>

 <?php if($TotN_CL_4>0 OR $TotN_SL_4>0 OR $TotN_PL_4>0 OR $TotN_EL_4>0 OR $TotN_OL_4>0) { ?>

 <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:90px;" valign="top" align="center"><b>Availed</b></td>

 <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:90px;" valign="top" align="center"><b>Final Balance</b></td><?php } ?>

</tr>

<tr>

 <td class="font1" align="center">CL</td>

 <td class="font1" align="center"><?php echo $resA['OpeningCL']; ?></td>

 <td class="font1" align="center"><?php echo $resA['AvailedCL']; ?></td>

 <td class="font1" align="center"><?php echo $resA['BalanceCL']; ?></td>

 <?php if($TotN_CL_4>0 OR $TotN_SL_4>0 OR $TotN_PL_4>0 OR $TotN_EL_4>0 OR $TotN_OL_4>0) { ?>

 <td class="font1" align="center"><?php echo $TotN_CL_4; ?></td>

 <?php $FinBalCL_4=$resA['BalanceCL']-$TotN_CL_4; ?>

 <td class="font1" align="center" bgcolor="#00D200"><b><?php echo $FinBalCL_4; ?></b></td><?php } ?>

 

</tr>

<tr>

 <td class="font1" align="center">SL</td>

 <td class="font1" align="center"><?php echo $resA['OpeningSL']; ?></td>

 <td class="font1" align="center"><?php echo $resA['AvailedSL']; ?></td>

 <td class="font1" align="center"><?php echo $resA['BalanceSL']; ?></td>

 <?php if($TotN_CL_4>0 OR $TotN_SL_4>0 OR $TotN_PL_4>0 OR $TotN_EL_4>0 OR $TotN_OL_4>0) { ?>

 <td class="font1" align="center"><?php echo $TotN_SL_4; ?></td>

 <?php $FinBalSL_4=$resA['BalanceSL']-$TotN_SL_4; ?>

 <td class="font1" align="center" bgcolor="#00D200"><b><?php echo $FinBalSL_4; ?></b></td><?php } ?>

</tr>

<tr>

 <td class="font1" align="center">PL</td>

 <td class="font1" align="center"><?php echo $resA['OpeningPL']; ?></td>

 <td class="font1" align="center"><?php echo $resA['AvailedPL']; ?></td>

 <td class="font1" align="center"><?php echo $resA['BalancePL']; ?></td>

 <?php if($TotN_CL_4>0 OR $TotN_SL_4>0 OR $TotN_PL_4>0 OR $TotN_EL_4>0 OR $TotN_OL_4>0) { ?>

 <td class="font1" align="center"><?php echo $TotN_PL_4; ?></td>

 <?php $FinBalPL_4=$resA['BalancePL']-$TotN_PL_4; ?>

 <td class="font1" align="center" bgcolor="#00D200"><b><?php echo $FinBalPL_4; ?></b></td><?php } ?>

</tr>

<tr>

 <td class="font1" align="center">EL</td>

 <td class="font1" align="center"><?php echo $resA['OpeningEL']; ?></td>

 <td class="font1" align="center"><?php echo $resA['AvailedEL']; ?></td>

 <td class="font1" align="center"><?php echo $resA['BalanceEL']; ?></td>

 <?php if($TotN_CL_4>0 OR $TotN_SL_4>0 OR $TotN_PL_4>0 OR $TotN_EL_4>0 OR $TotN_OL_4>0) { ?>

 <td class="font1" align="center"><?php echo $TotN_EL_4; ?></td>

 <?php $FinBalEL_4=$resA['BalanceEL']-$TotN_EL_4; ?>

 <td class="font1" align="center" bgcolor="#00D200"><b><?php echo $FinBalEL_4; ?></b></td><?php } ?>

</tr>

<tr>

 <td class="font1" align="center">FL</td>

 <td class="font1" align="center"><?php echo $resA['OpeningOL']; ?></td>

 <td class="font1" align="center"><?php echo $resA['AvailedOL']; ?></td>

 <td class="font1" align="center"><?php echo $resA['BalanceOL']; ?></td>

 <?php if($TotN_CL_4>0 OR $TotN_SL_4>0 OR $TotN_PL_4>0 OR $TotN_EL_4>0 OR $TotN_OL_4>0) { ?>

 <td class="font1" align="center"><?php echo $TotN_OL_4; ?></td>

 <?php $FinBalOL_4=$resA['BalanceOL']-$TotN_OL_4; ?>

 <td class="font1" align="center" bgcolor="#00D200"><b><?php echo $FinBalOL_4; ?></b></td><?php } ?>

</tr>

</table>

</td>

<?php //********************************************* May ****************************// ?>	

<?php $sqlMay=mysql_query("select * from hrm_employee_monthlyleave_balance where EmployeeID=".$EmployeeId." AND Month=5 AND Year='".date("Y")."'", $con); 

      $resMay=mysql_fetch_array($sqlMay); 

	  

$NextMonth_5='06'; $Sdate_5=date("Y-".$NextMonth_5."-01"); $Y=date("Y");

$sqlSNextCL_5=mysql_query("select count(AttValue) as SNextCL_5 from hrm_employee_attendance where AttValue='CL' AND EmployeeID=".$EmployeeId." AND AttDate>='".$Sdate_5."' AND Year=".$Y, $con); while($resSNextCL_5=mysql_fetch_array($sqlSNextCL_5)){$SumNextCL_5=$resSNextCL_5['SNextCL_5'];}

$sqlSNextCH_5=mysql_query("select count(AttValue) as SNextCH_5 from hrm_employee_attendance where AttValue='CH' AND EmployeeID=".$EmployeeId." AND AttDate>='".$Sdate_5."' AND Year=".$Y, $con); while($resSNextCH_5=mysql_fetch_array($sqlSNextCH_5)){$SumNextCH_5=$resSNextCH_5['SNextCH_5']/2;}

$sqlSNextSL_5=mysql_query("select count(AttValue) as SNextSL_5 from hrm_employee_attendance where AttValue='SL' AND EmployeeID=".$EmployeeId." AND AttDate>='".$Sdate_5."' AND Year=".$Y, $con); while($resSNextSL_5=mysql_fetch_array($sqlSNextSL_5)){$SumNextSL_5=$resSNextSL_5['SNextSL_5'];}

$sqlSNextSH_5=mysql_query("select count(AttValue) as SNextSH_5 from hrm_employee_attendance where AttValue='SH' AND EmployeeID=".$EmployeeId." AND AttDate>='".$Sdate_5."' AND Year=".$Y, $con); while($resSNextSH_5=mysql_fetch_array($sqlSNextSH_5)){$SumNextSH_5=$resSNextSH_5['SNextSH_5']/2;}

$sqlSNextPL_5=mysql_query("select count(AttValue) as SNextPL_5 from hrm_employee_attendance where AttValue='PL' AND EmployeeID=".$EmployeeId." AND AttDate>='".$Sdate_5."' AND Year=".$Y, $con); while($resSNextPL_5=mysql_fetch_array($sqlSNextPL_5)){$SumNextPL_5=$resSNextPL_5['SNextPL_5'];}

$sqlSNextEL_5=mysql_query("select count(AttValue) as SNextEL_5 from hrm_employee_attendance where AttValue='EL' AND EmployeeID=".$EmployeeId." AND AttDate>='".$Sdate_5."' AND Year=".$Y, $con); while($resSNextEL_5=mysql_fetch_array($sqlSNextEL_5)){$SumNextEL_5=$resSNextEL_5['SNextEL_5'];}

$sqlSNextOL_5=mysql_query("select count(AttValue) as SNextOL_5 from hrm_employee_attendance where AttValue='FL' AND EmployeeID=".$EmployeeId." AND AttDate>='".$Sdate_5."' AND Year=".$Y, $con); while($resSNextOL_5=mysql_fetch_array($sqlSNextOL_5)){$SumNextOL_5=$resSNextOL_5['SNextOL_5'];}



$TotN_CL_5=$SumNextCL_5+$SumNextCH_5; 

$TotN_SL_5=$SumNextSL_5+$SumNextSH_5; 

$TotN_PL_5=$SumNextPL_5; 

$TotN_EL_5=$SumNextEL_5;	 

$TotN_OL_5=$SumNextOL_5;	 

	  

	  ?>   

<td id="MayDT" style="display:<?php if(date("m")==5){echo 'block';} else {echo 'none';} ?>;width:540px;" valign="top">

<table style="width:<?php if($TotN_CL_5>0 OR $TotN_SL_5>0 OR $TotN_PL_5>0 OR $TotN_EL_5>0 OR $TotN_OL_5>0) { echo '540px'; } else { echo '360px';}?>;" border="1" bgcolor="#FFFFFF">

<tr bgcolor="#7a6189">

 <td colspan="4" bgcolor="#0080FF" align="center" style="font-family:Times New Roman; color:#FFFFFF; font-size:15px; height:25px; width:360px;">

 <b><blink>My Leave </blink>(Month - <font color="#FFFF00">May</font>)</b></td>

 <?php if($TotN_CL_5>0 OR $TotN_SL_5>0 OR $TotN_PL_5>0 OR $TotN_EL_5>0 OR $TotN_OL_5>0) { ?>

 <td colspan="2" bgcolor="#0080FF" align="center" style="font-family:Times New Roman; color:#FFFFFF; font-size:15px; height:25px; width:180px;">

 <b>Future Leave</b></td><?php } ?>

</tr>

<tr bgcolor="#7a6189">

 <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:90px;" valign="top" align="center"><b>Leave</b></td> 

 <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:90px;" valign="top" align="center"><b>Opening</b></td>

 <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:90px;" valign="top" align="center"><b>Availed</b></td>

 <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:90px;" valign="top" align="center"><b>Balance</b></td>

 <?php if($TotN_CL_5>0 OR $TotN_SL_5>0 OR $TotN_PL_5>0 OR $TotN_EL_5>0 OR $TotN_OL_5>0) { ?>

 <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:90px;" valign="top" align="center"><b>Availed</b></td>

 <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:90px;" valign="top" align="center"><b>Final Balance</b></td><?php } ?>

</tr>

<tr>

 <td class="font1" align="center">CL</td>

 <td class="font1" align="center"><?php echo $resMay['OpeningCL']; ?></td>

 <td class="font1" align="center"><?php echo $resMay['AvailedCL']; ?></td>

 <td class="font1" align="center"><?php echo $resMay['BalanceCL']; ?></td>

 <?php if($TotN_CL_5>0 OR $TotN_SL_5>0 OR $TotN_PL_5>0 OR $TotN_EL_5>0 OR $TotN_OL_5>0) { ?>

 <td class="font1" align="center"><?php echo $TotN_CL_5; ?></td>

 <?php $FinBalCL_5=$resMay['BalanceCL']-$TotN_CL_5; ?>

 <td class="font1" align="center" bgcolor="#00D200"><b><?php echo $FinBalCL_5; ?></b></td><?php } ?>

</tr>

<tr>

 <td class="font1" align="center">SL</td>

 <td class="font1" align="center"><?php echo $resMay['OpeningSL']; ?></td>

 <td class="font1" align="center"><?php echo $resMay['AvailedSL']; ?></td>

 <td class="font1" align="center"><?php echo $resMay['BalanceSL']; ?></td>

 <?php if($TotN_CL_5>0 OR $TotN_SL_5>0 OR $TotN_PL_5>0 OR $TotN_EL_5>0 OR $TotN_OL_5>0) { ?>

 <td class="font1" align="center"><?php echo $TotN_SL_5; ?></td>

 <?php $FinBalSL_5=$resMay['BalanceSL']-$TotN_SL_5; ?>

 <td class="font1" align="center" bgcolor="#00D200"><b><?php echo $FinBalSL_5; ?></b></td><?php } ?>

</tr>

<tr>

 <td class="font1" align="center">PL</td>

 <td class="font1" align="center"><?php echo $resMay['OpeningPL']; ?></td>

 <td class="font1" align="center"><?php echo $resMay['AvailedPL']; ?></td>

 <td class="font1" align="center"><?php echo $resMay['BalancePL']; ?></td>

 <?php if($TotN_CL_5>0 OR $TotN_SL_5>0 OR $TotN_PL_5>0 OR $TotN_EL_5>0 OR $TotN_OL_5>0) { ?>

 <td class="font1" align="center"><?php echo $TotN_PL_5; ?></td>

 <?php $FinBalPL_5=$resMay['BalancePL']-$TotN_PL_5; ?>

 <td class="font1" align="center" bgcolor="#00D200"><b><?php echo $FinBalPL_5; ?></b></td><?php } ?>

</tr>

<tr>

 <td class="font1" align="center">EL</td>

 <td class="font1" align="center"><?php echo $resMay['OpeningEL']; ?></td>

 <td class="font1" align="center"><?php echo $resMay['AvailedEL']; ?></td>

 <td class="font1" align="center"><?php echo $resMay['BalanceEL']; ?></td>

 <?php if($TotN_CL_5>0 OR $TotN_SL_5>0 OR $TotN_PL_5>0 OR $TotN_EL_5>0 OR $TotN_OL_5>0) { ?>

 <td class="font1" align="center"><?php echo $TotN_EL_5; ?></td>

 <?php $FinBalEL_5=$resMay['BalanceEL']-$TotN_EL_5; ?>

 <td class="font1" align="center" bgcolor="#00D200"><b><?php echo $FinBalEL_5; ?></b></td><?php } ?>

</tr>

<tr>

 <td class="font1" align="center">FL</td>

 <td class="font1" align="center"><?php echo $resMay['OpeningOL']; ?></td>

 <td class="font1" align="center"><?php echo $resMay['AvailedOL']; ?></td>

 <td class="font1" align="center"><?php echo $resMay['BalanceOL']; ?></td>

 <?php if($TotN_CL_5>0 OR $TotN_SL_5>0 OR $TotN_PL_5>0 OR $TotN_EL_5>0 OR $TotN_OL_5>0) { ?>

 <td class="font1" align="center"><?php echo $TotN_OL_5; ?></td>

 <?php $FinBalOL_5=$resMay['BalanceOL']-$TotN_OL_5; ?>

 <td class="font1" align="center" bgcolor="#00D200"><b><?php echo $FinBalOL_5; ?></b></td><?php } ?>

</tr>

</table>

</td>

<?php //********************************************* Jun ****************************// ?>	

<?php $sqlJun=mysql_query("select * from hrm_employee_monthlyleave_balance where EmployeeID=".$EmployeeId." AND Month=6 AND Year='".date("Y")."'", $con); 

      $resJun=mysql_fetch_array($sqlJun); 

	  

$NextMonth_6='07'; $Sdate_6=date("Y-".$NextMonth_6."-01"); $Y=date("Y");

$sqlSNextCL_6=mysql_query("select count(AttValue) as SNextCL_6 from hrm_employee_attendance where AttValue='CL' AND EmployeeID=".$EmployeeId." AND AttDate>='".$Sdate_6."' AND Year=".$Y, $con); while($resSNextCL_6=mysql_fetch_array($sqlSNextCL_6)){$SumNextCL_6=$resSNextCL_6['SNextCL_6'];}

$sqlSNextCH_6=mysql_query("select count(AttValue) as SNextCH_6 from hrm_employee_attendance where AttValue='CH' AND EmployeeID=".$EmployeeId." AND AttDate>='".$Sdate_6."' AND Year=".$Y, $con); while($resSNextCH_6=mysql_fetch_array($sqlSNextCH_6)){$SumNextCH_6=$resSNextCH_6['SNextCH_6']/2;}

$sqlSNextSL_6=mysql_query("select count(AttValue) as SNextSL_6 from hrm_employee_attendance where AttValue='SL' AND EmployeeID=".$EmployeeId." AND AttDate>='".$Sdate_6."' AND Year=".$Y, $con); while($resSNextSL_6=mysql_fetch_array($sqlSNextSL_6)){$SumNextSL_6=$resSNextSL_6['SNextSL_6'];}

$sqlSNextSH_6=mysql_query("select count(AttValue) as SNextSH_6 from hrm_employee_attendance where AttValue='SH' AND EmployeeID=".$EmployeeId." AND AttDate>='".$Sdate_6."' AND Year=".$Y, $con); while($resSNextSH_6=mysql_fetch_array($sqlSNextSH_6)){$SumNextSH_6=$resSNextSH_6['SNextSH_6']/2;}

$sqlSNextPL_6=mysql_query("select count(AttValue) as SNextPL_6 from hrm_employee_attendance where AttValue='PL' AND EmployeeID=".$EmployeeId." AND AttDate>='".$Sdate_6."' AND Year=".$Y, $con); while($resSNextPL_6=mysql_fetch_array($sqlSNextPL_6)){$SumNextPL_6=$resSNextPL_6['SNextPL_6'];}

$sqlSNextEL_6=mysql_query("select count(AttValue) as SNextEL_6 from hrm_employee_attendance where AttValue='EL' AND EmployeeID=".$EmployeeId." AND AttDate>='".$Sdate_6."' AND Year=".$Y, $con); while($resSNextEL_6=mysql_fetch_array($sqlSNextEL_6)){$SumNextEL_6=$resSNextEL_6['SNextEL_6'];}

$sqlSNextOL_6=mysql_query("select count(AttValue) as SNextOL_6 from hrm_employee_attendance where AttValue='FL' AND EmployeeID=".$EmployeeId." AND AttDate>='".$Sdate_6."' AND Year=".$Y, $con); while($resSNextOL_6=mysql_fetch_array($sqlSNextOL_6)){$SumNextOL_6=$resSNextOL_6['SNextOL_6'];}



$TotN_CL_6=$SumNextCL_6+$SumNextCH_6; 

$TotN_SL_6=$SumNextSL_6+$SumNextSH_6; 

$TotN_PL_6=$SumNextPL_6; 

$TotN_EL_6=$SumNextEL_6;	

$TotN_OL_6=$SumNextOL_6;  

	  

	  ?>   

<td id="JunDT" style="display:<?php if(date("m")==6){echo 'block';} else {echo 'none';} ?>;width:540px;" valign="top">

<table style="width:<?php if($TotN_CL_6>0 OR $TotN_SL_6>0 OR $TotN_PL_6>0 OR $TotN_EL_6>0 OR $TotN_OL_6>0) { echo '540px'; } else { echo '360px';}?>;" border="1" bgcolor="#FFFFFF">

<tr bgcolor="#7a6189">

 <td colspan="4" bgcolor="#0080FF" align="center" style="font-family:Times New Roman; color:#FFFFFF; font-size:15px; height:25px; width:360px;">

 <b><blink>My Leave </blink>(Month - <font color="#FFFF00">June</font>)</b></td>

 <?php if($TotN_CL_6>0 OR $TotN_SL_6>0 OR $TotN_PL_6>0 OR $TotN_EL_6>0 OR $TotN_OL_6>0) { ?>

 <td colspan="2" bgcolor="#0080FF" align="center" style="font-family:Times New Roman; color:#FFFFFF; font-size:15px; height:25px; width:180px;">

 <b>Future Leave</b></td><?php } ?>

</tr>

<tr bgcolor="#7a6189">

 <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:90px;" valign="top" align="center"><b>Leave</b></td> 

 <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:90px;" valign="top" align="center"><b>Opening</b></td>

 <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:90px;" valign="top" align="center"><b>Availed</b></td>

 <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:90px;" valign="top" align="center"><b>Balance</b></td>

 <?php if($TotN_CL_6>0 OR $TotN_SL_6>0 OR $TotN_PL_6>0 OR $TotN_EL_6>0 OR $TotN_OL_6>0) { ?>

 <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:90px;" valign="top" align="center"><b>Availed</b></td>

 <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:90px;" valign="top" align="center"><b>Final Balance</b></td><?php } ?>

</tr>

<tr>

 <td class="font1" align="center">CL</td>

 <td class="font1" align="center"><?php echo $resJun['OpeningCL']; ?></td>

 <td class="font1" align="center"><?php echo $resJun['AvailedCL']; ?></td>

 <td class="font1" align="center"><?php echo $resJun['BalanceCL']; ?></td>

 <?php if($TotN_CL_6>0 OR $TotN_SL_6>0 OR $TotN_PL_6>0 OR $TotN_EL_6>0 OR $TotN_OL_6>0) { ?>

 <td class="font1" align="center"><?php echo $TotN_CL_6; ?></td>

 <?php $FinBalCL_6=$resJun['BalanceCL']-$TotN_CL_6; ?>

 <td class="font1" align="center" bgcolor="#00D200"><b><?php echo $FinBalCL_6; ?></b></td><?php } ?>

</tr>

<tr>

 <td class="font1" align="center">SL</td>

 <td class="font1" align="center"><?php echo $resJun['OpeningSL']; ?></td>

 <td class="font1" align="center"><?php echo $resJun['AvailedSL']; ?></td>

 <td class="font1" align="center"><?php echo $resJun['BalanceSL']; ?></td>

 <?php if($TotN_CL_6>0 OR $TotN_SL_6>0 OR $TotN_PL_6>0 OR $TotN_EL_6>0 OR $TotN_OL_6>0) { ?>

 <td class="font1" align="center"><?php echo $TotN_SL_6; ?></td>

 <?php $FinBalSL_6=$resJun['BalanceSL']-$TotN_SL_6; ?>

 <td class="font1" align="center" bgcolor="#00D200"><b><?php echo $FinBalSL_6; ?></b></td><?php } ?>

</tr>

<tr>

 <td class="font1" align="center">PL</td>

 <td class="font1" align="center"><?php echo $resJun['OpeningPL']; ?></td>

 <td class="font1" align="center"><?php echo $resJun['AvailedPL']; ?></td>

 <td class="font1" align="center"><?php echo $resJun['BalancePL']; ?></td>

 <?php if($TotN_CL_6>0 OR $TotN_SL_6>0 OR $TotN_PL_6>0 OR $TotN_EL_6>0 OR $TotN_OL_6>0) { ?>

 <td class="font1" align="center"><?php echo $TotN_PL_6; ?></td>

 <?php $FinBalPL_6=$resJun['BalancePL']-$TotN_PL_6; ?>

 <td class="font1" align="center" bgcolor="#00D200"><b><?php echo $FinBalPL_6; ?></b></td><?php } ?>

</tr>

<tr>

 <td class="font1" align="center">EL</td>

 <td class="font1" align="center"><?php echo $resJun['OpeningEL']; ?></td>

 <td class="font1" align="center"><?php echo $resJun['AvailedEL']; ?></td>

 <td class="font1" align="center"><?php echo $resJun['BalanceEL']; ?></td>

 <?php if($TotN_CL_6>0 OR $TotN_SL_6>0 OR $TotN_PL_6>0 OR $TotN_EL_6>0 OR $TotN_OL_6>0) { ?>

 <td class="font1" align="center"><?php echo $TotN_EL_6; ?></td>

 <?php $FinBalEL_6=$resJun['BalanceEL']-$TotN_EL_6; ?>

 <td class="font1" align="center" bgcolor="#00D200"><b><?php echo $FinBalEL_6; ?></b></td><?php } ?>

</tr>

<tr>

 <td class="font1" align="center">FL</td>

 <td class="font1" align="center"><?php echo $resJun['OpeningOL']; ?></td>

 <td class="font1" align="center"><?php echo $resJun['AvailedOL']; ?></td>

 <td class="font1" align="center"><?php echo $resJun['BalanceOL']; ?></td>

 <?php if($TotN_CL_6>0 OR $TotN_SL_6>0 OR $TotN_PL_6>0 OR $TotN_EL_6>0 OR $TotN_OL_6>0) { ?>

 <td class="font1" align="center"><?php echo $TotN_OL_6; ?></td>

 <?php $FinBalOL_6=$resJun['BalanceOL']-$TotN_OL_6; ?>

 <td class="font1" align="center" bgcolor="#00D200"><b><?php echo $FinBalOL_6; ?></b></td><?php } ?>

</tr>

</table>

</td>

<?php //********************************************* July ****************************// ?>	

<?php $sqlJuly=mysql_query("select * from hrm_employee_monthlyleave_balance where EmployeeID=".$EmployeeId." AND Month=7 AND Year='".date("Y")."'", $con); 

      $resJuly=mysql_fetch_array($sqlJuly); 

	  

$NextMonth_7='08'; $Sdate_7=date("Y-".$NextMonth_7."-01"); $Y=date("Y");

$sqlSNextCL_7=mysql_query("select count(AttValue) as SNextCL_7 from hrm_employee_attendance where AttValue='CL' AND EmployeeID=".$EmployeeId." AND AttDate>='".$Sdate_7."' AND Year=".$Y, $con); while($resSNextCL_7=mysql_fetch_array($sqlSNextCL_7)){$SumNextCL_7=$resSNextCL_7['SNextCL_7'];}

$sqlSNextCH_7=mysql_query("select count(AttValue) as SNextCH_7 from hrm_employee_attendance where AttValue='CH' AND EmployeeID=".$EmployeeId." AND AttDate>='".$Sdate_7."' AND Year=".$Y, $con); while($resSNextCH_7=mysql_fetch_array($sqlSNextCH_7)){$SumNextCH_7=$resSNextCH_7['SNextCH_7']/2;}

$sqlSNextSL_7=mysql_query("select count(AttValue) as SNextSL_7 from hrm_employee_attendance where AttValue='SL' AND EmployeeID=".$EmployeeId." AND AttDate>='".$Sdate_7."' AND Year=".$Y, $con); while($resSNextSL_7=mysql_fetch_array($sqlSNextSL_7)){$SumNextSL_7=$resSNextSL_7['SNextSL_7'];}

$sqlSNextSH_7=mysql_query("select count(AttValue) as SNextSH_7 from hrm_employee_attendance where AttValue='SH' AND EmployeeID=".$EmployeeId." AND AttDate>='".$Sdate_7."' AND Year=".$Y, $con); while($resSNextSH_7=mysql_fetch_array($sqlSNextSH_7)){$SumNextSH_7=$resSNextSH_7['SNextSH_7']/2;}

$sqlSNextPL_7=mysql_query("select count(AttValue) as SNextPL_7 from hrm_employee_attendance where AttValue='PL' AND EmployeeID=".$EmployeeId." AND AttDate>='".$Sdate_7."' AND Year=".$Y, $con); while($resSNextPL_7=mysql_fetch_array($sqlSNextPL_7)){$SumNextPL_7=$resSNextPL_7['SNextPL_7'];}

$sqlSNextEL_7=mysql_query("select count(AttValue) as SNextEL_7 from hrm_employee_attendance where AttValue='EL' AND EmployeeID=".$EmployeeId." AND AttDate>='".$Sdate_7."' AND Year=".$Y, $con); while($resSNextEL_7=mysql_fetch_array($sqlSNextEL_7)){$SumNextEL_7=$resSNextEL_7['SNextEL_7'];}

$sqlSNextOL_7=mysql_query("select count(AttValue) as SNextOL_7 from hrm_employee_attendance where AttValue='FL' AND EmployeeID=".$EmployeeId." AND AttDate>='".$Sdate_7."' AND Year=".$Y, $con); while($resSNextOL_7=mysql_fetch_array($sqlSNextOL_7)){$SumNextOL_7=$resSNextOL_7['SNextOL_7'];}



$TotN_CL_7=$SumNextCL_7+$SumNextCH_7; 

$TotN_SL_7=$SumNextSL_7+$SumNextSH_7; 

$TotN_PL_7=$SumNextPL_7; 

$TotN_EL_7=$SumNextEL_7;	

$TotN_OL_7=$SumNextOL_7;  

	  

	  ?>   

<td id="JulDT" style="display:<?php if(date("m")==7){echo 'block';} else {echo 'none';} ?>;width:540px;" valign="top">

<table style="width:<?php if($TotN_CL_7>0 OR $TotN_SL_7>0 OR $TotN_PL_7>0 OR $TotN_EL_7>0 OR $TotN_OL_7>0) { echo '540px'; } else { echo '360px';}?>;" border="1" bgcolor="#FFFFFF">

<tr bgcolor="#7a6189">

 <td colspan="4" bgcolor="#0080FF" align="center" style="font-family:Times New Roman; color:#FFFFFF; font-size:15px; height:25px; width:360px;">

 <b><blink>My Leave </blink>(Month - <font color="#FFFF00">July</font>)</b></td>

 <?php if($TotN_CL_7>0 OR $TotN_SL_7>0 OR $TotN_PL_7>0 OR $TotN_EL_7>0 OR $TotN_OL_7>0) { ?>

 <td colspan="2" bgcolor="#0080FF" align="center" style="font-family:Times New Roman; color:#FFFFFF; font-size:15px; height:25px; width:180px;">

 <b>Future Leave</b></td><?php } ?>

</tr>

<tr bgcolor="#7a6189">

 <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:90px;" valign="top" align="center"><b>Leave</b></td> 

 <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:90px;" valign="top" align="center"><b>Opening</b></td>

 <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:90px;" valign="top" align="center"><b>Availed</b></td>

 <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:90px;" valign="top" align="center"><b>Balance</b></td>

 <?php if($TotN_CL_7>0 OR $TotN_SL_7>0 OR $TotN_PL_7>0 OR $TotN_EL_7>0 OR $TotN_OL_7>0) { ?>

 <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:90px;" valign="top" align="center"><b>Availed</b></td>

 <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:90px;" valign="top" align="center"><b>Final Balance</b></td><?php } ?>

</tr>

<tr>

 <td class="font1" align="center">CL</td>

 <td class="font1" align="center"><?php echo $resJuly['OpeningCL']; ?></td>

 <td class="font1" align="center"><?php echo $resJuly['AvailedCL']; ?></td>

 <td class="font1" align="center"><?php echo $resJuly['BalanceCL']; ?></td>

 <?php if($TotN_CL_7>0 OR $TotN_SL_7>0 OR $TotN_PL_7>0 OR $TotN_EL_7>0 OR $TotN_OL_7>0) { ?>

 <td class="font1" align="center"><?php echo $TotN_CL_7; ?></td>

 <?php $FinBalCL_7=$resJuly['BalanceCL']-$TotN_CL_7; ?>

 <td class="font1" align="center" bgcolor="#00D200"><b><?php echo $FinBalCL_7; ?></b></td><?php } ?>

</tr>

<tr>

 <td class="font1" align="center">SL</td>

 <td class="font1" align="center"><?php echo $resJuly['OpeningSL']; ?></td>

 <td class="font1" align="center"><?php echo $resJuly['AvailedSL']; ?></td>

 <td class="font1" align="center"><?php echo $resJuly['BalanceSL']; ?></td>

 <?php if($TotN_CL_7>0 OR $TotN_SL_7>0 OR $TotN_PL_7>0 OR $TotN_EL_7>0 OR $TotN_OL_7>0) { ?>

 <td class="font1" align="center"><?php echo $TotN_SL_7; ?></td>

 <?php $FinBalSL_7=$resJuly['BalanceSL']-$TotN_SL_7; ?>

 <td class="font1" align="center" bgcolor="#00D200"><b><?php echo $FinBalSL_7; ?></b></td><?php } ?>

</tr>

<tr>

 <td class="font1" align="center">PL</td>

 <td class="font1" align="center"><?php echo $resJuly['OpeningPL']; ?></td>

 <td class="font1" align="center"><?php echo $resJuly['AvailedPL']; ?></td>

 <td class="font1" align="center"><?php echo $resJuly['BalancePL']; ?></td>

 <?php if($TotN_CL_7>0 OR $TotN_SL_7>0 OR $TotN_PL_7>0 OR $TotN_EL_7>0 OR $TotN_OL_7>0) { ?>

 <td class="font1" align="center"><?php echo $TotN_PL_7; ?></td>

  <?php $FinBalPL_7=$resJuly['BalancePL']-$TotN_PL_7; ?>

 <td class="font1" align="center" bgcolor="#00D200"><b><?php echo $FinBalPL_7; ?></b></td><?php } ?>

</tr>

<tr>

 <td class="font1" align="center">EL</td>

 <td class="font1" align="center"><?php echo $resJuly['OpeningEL']; ?></td>

 <td class="font1" align="center"><?php echo $resJuly['AvailedEL']; ?></td>

 <td class="font1" align="center"><?php echo $resJuly['BalanceEL']; ?></td>

 <?php if($TotN_CL_7>0 OR $TotN_SL_7>0 OR $TotN_PL_7>0 OR $TotN_EL_7>0 OR $TotN_OL_7>0) { ?>

 <td class="font1" align="center"><?php echo $TotN_EL_7; ?></td>

  <?php $FinBalEL_7=$resJuly['BalanceEL']-$TotN_EL_7; ?>

 <td class="font1" align="center" bgcolor="#00D200"><b><?php echo $FinBalEL_7; ?></b></td><?php } ?>

</tr>

<tr>

 <td class="font1" align="center">FL</td>

 <td class="font1" align="center"><?php echo $resJuly['OpeningOL']; ?></td>

 <td class="font1" align="center"><?php echo $resJuly['AvailedOL']; ?></td>

 <td class="font1" align="center"><?php echo $resJuly['BalanceOL']; ?></td>

 <?php if($TotN_CL_7>0 OR $TotN_SL_7>0 OR $TotN_PL_7>0 OR $TotN_EL_7>0 OR $TotN_OL_7>0) { ?>

 <td class="font1" align="center"><?php echo $TotN_OL_7; ?></td>

 <?php $FinBalOL_7=$resJuly['BalanceOL']-$TotN_OL_7; ?>

 <td class="font1" align="center" bgcolor="#00D200"><b><?php echo $FinBalOL_7; ?></b></td><?php } ?>

</tr>

</table>

</td>

<?php //********************************************* Aug ****************************// ?>	

<?php $sqlAug=mysql_query("select * from hrm_employee_monthlyleave_balance where EmployeeID=".$EmployeeId." AND Month=8 AND Year='".date("Y")."'", $con); 

      $resAug=mysql_fetch_array($sqlAug); 

	  

$NextMonth_8='09'; $Sdate_8=date("Y-".$NextMonth_8."-01"); $Y=date("Y");

$sqlSNextCL_8=mysql_query("select count(AttValue) as SNextCL_8 from hrm_employee_attendance where AttValue='CL' AND EmployeeID=".$EmployeeId." AND AttDate>='".$Sdate_8."' AND Year=".$Y, $con); while($resSNextCL_8=mysql_fetch_array($sqlSNextCL_8)){$SumNextCL_8=$resSNextCL_8['SNextCL_8'];}

$sqlSNextCH_8=mysql_query("select count(AttValue) as SNextCH_8 from hrm_employee_attendance where AttValue='CH' AND EmployeeID=".$EmployeeId." AND AttDate>='".$Sdate_8."' AND Year=".$Y, $con); while($resSNextCH_8=mysql_fetch_array($sqlSNextCH_8)){$SumNextCH_8=$resSNextCH_8['SNextCH_8']/2;}

$sqlSNextSL_8=mysql_query("select count(AttValue) as SNextSL_8 from hrm_employee_attendance where AttValue='SL' AND EmployeeID=".$EmployeeId." AND AttDate>='".$Sdate_8."' AND Year=".$Y, $con); while($resSNextSL_8=mysql_fetch_array($sqlSNextSL_8)){$SumNextSL_8=$resSNextSL_8['SNextSL_8'];}

$sqlSNextSH_8=mysql_query("select count(AttValue) as SNextSH_8 from hrm_employee_attendance where AttValue='SH' AND EmployeeID=".$EmployeeId." AND AttDate>='".$Sdate_8."' AND Year=".$Y, $con); while($resSNextSH_8=mysql_fetch_array($sqlSNextSH_8)){$SumNextSH_8=$resSNextSH_8['SNextSH_8']/2;}

$sqlSNextPL_8=mysql_query("select count(AttValue) as SNextPL_8 from hrm_employee_attendance where AttValue='PL' AND EmployeeID=".$EmployeeId." AND AttDate>='".$Sdate_8."' AND Year=".$Y, $con); while($resSNextPL_8=mysql_fetch_array($sqlSNextPL_8)){$SumNextPL_8=$resSNextPL_8['SNextPL_8'];}

$sqlSNextEL_8=mysql_query("select count(AttValue) as SNextEL_8 from hrm_employee_attendance where AttValue='EL' AND EmployeeID=".$EmployeeId." AND AttDate>='".$Sdate_8."' AND Year=".$Y, $con); while($resSNextEL_8=mysql_fetch_array($sqlSNextEL_8)){$SumNextEL_8=$resSNextEL_8['SNextEL_8'];}

$sqlSNextOL_8=mysql_query("select count(AttValue) as SNextOL_8 from hrm_employee_attendance where AttValue='FL' AND EmployeeID=".$EmployeeId." AND AttDate>='".$Sdate_8."' AND Year=".$Y, $con); while($resSNextOL_8=mysql_fetch_array($sqlSNextOL_8)){$SumNextOL_8=$resSNextOL_8['SNextOL_8'];}



$TotN_CL_8=$SumNextCL_8+$SumNextCH_8; 

$TotN_SL_8=$SumNextSL_8+$SumNextSH_8; 

$TotN_PL_8=$SumNextPL_8; 

$TotN_EL_8=$SumNextEL_8;	

$TotN_OL_8=$SumNextOL_8;  

	  

	  ?>   

<td id="AugDT" style="display:<?php if(date("m")==8){echo 'block';} else {echo 'none';} ?>;width:540px;" valign="top">

<table style="width:<?php if($TotN_CL_8>0 OR $TotN_SL_8>0 OR $TotN_PL_8>0 OR $TotN_EL_8>0 OR $TotN_OL_8>0) { echo '540px'; } else { echo '360px';}?>;" border="1" bgcolor="#FFFFFF">

<tr bgcolor="#7a6189">

 <td colspan="4" bgcolor="#0080FF" align="center" style="font-family:Times New Roman; color:#FFFFFF; font-size:15px; height:25px; width:360px;">

 <b><blink>My Leave </blink>(Month - <font color="#FFFF00">August</font>)</b></td>

 <?php if($TotN_CL_8>0 OR $TotN_SL_8>0 OR $TotN_PL_8>0 OR $TotN_EL_8>0 OR $TotN_OL_8>0) { ?>

 <td colspan="2" bgcolor="#0080FF" align="center" style="font-family:Times New Roman; color:#FFFFFF; font-size:15px; height:25px; width:180px;">

 <b>Future Leave</b></td><?php } ?>

</tr>

<tr bgcolor="#7a6189">

 <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:90px;" valign="top" align="center"><b>Leave</b></td> 

 <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:90px;" valign="top" align="center"><b>Opening</b></td>

 <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:90px;" valign="top" align="center"><b>Availed</b></td>

 <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:90px;" valign="top" align="center"><b>Balance</b></td>

 <?php if($TotN_CL_8>0 OR $TotN_SL_8>0 OR $TotN_PL_8>0 OR $TotN_EL_8>0 OR $TotN_OL_8>0) { ?>

 <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:90px;" valign="top" align="center"><b>Availed</b></td>

 <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:90px;" valign="top" align="center"><b>Final Balance</b></td><?php } ?>

</tr>

<tr>

 <td class="font1" align="center">CL</td>

 <td class="font1" align="center"><?php echo $resAug['OpeningCL']; ?></td>

 <td class="font1" align="center"><?php echo $resAug['AvailedCL']; ?></td>

 <td class="font1" align="center"><?php echo $resAug['BalanceCL']; ?></td>

 <?php if($TotN_CL_8>0 OR $TotN_SL_8>0 OR $TotN_PL_8>0 OR $TotN_EL_8>0 OR $TotN_OL_8>0) { ?>

 <td class="font1" align="center"><?php echo $TotN_CL_8; ?></td>

 <?php $FinBalCL_8=$resAug['BalanceCL']-$TotN_CL_8; ?>

 <td class="font1" align="center" bgcolor="#00D200"><b><?php echo $FinBalCL_8; ?></b></td><?php } ?>

</tr>

<tr>

 <td class="font1" align="center">SL</td>

 <td class="font1" align="center"><?php echo $resAug['OpeningSL']; ?></td>

 <td class="font1" align="center"><?php echo $resAug['AvailedSL']; ?></td>

 <td class="font1" align="center"><?php echo $resAug['BalanceSL']; ?></td>

 <?php if($TotN_CL_8>0 OR $TotN_SL_8>0 OR $TotN_PL_8>0 OR $TotN_EL_8>0 OR $TotN_OL_8>0) { ?>

 <td class="font1" align="center"><?php echo $TotN_SL_8; ?></td>

 <?php $FinBalSL_8=$resAug['BalanceSL']-$TotN_SL_8; ?>

 <td class="font1" align="center" bgcolor="#00D200"><b><?php echo $FinBalSL_8; ?></b></td><?php } ?>

</tr>

<tr>

 <td class="font1" align="center">PL</td>

 <td class="font1" align="center"><?php echo $resAug['OpeningPL']; ?></td>

 <td class="font1" align="center"><?php echo $resAug['AvailedPL']; ?></td>

 <td class="font1" align="center"><?php echo $resAug['BalancePL']; ?></td>

 <?php if($TotN_CL_8>0 OR $TotN_SL_8>0 OR $TotN_PL_8>0 OR $TotN_EL_8>0 OR $TotN_OL_8>0) { ?>

 <td class="font1" align="center"><?php echo $TotN_PL_8; ?></td>

 <?php $FinBalPL_8=$resAug['BalancePL']-$TotN_PL_8; ?>

 <td class="font1" align="center" bgcolor="#00D200"><b><?php echo $FinBalPL_8; ?></b></td><?php } ?>

</tr>

<tr>

 <td class="font1" align="center">EL</td>

 <td class="font1" align="center"><?php echo $resAug['OpeningEL']; ?></td>

 <td class="font1" align="center"><?php echo $resAug['AvailedEL']; ?></td>

 <td class="font1" align="center"><?php echo $resAug['BalanceEL']; ?></td>

 <?php if($TotN_CL_8>0 OR $TotN_SL_8>0 OR $TotN_PL_8>0 OR $TotN_EL_8>0 OR $TotN_OL_8>0) { ?>

 <td class="font1" align="center"><?php echo $TotN_EL_8; ?></td>

 <?php $FinBalEL_8=$resAug['BalanceEL']-$TotN_EL_8; ?>

 <td class="font1" align="center" bgcolor="#00D200"><b><?php echo $FinBalEL_8; ?></b></td><?php } ?>

</tr>

<tr>

 <td class="font1" align="center">FL</td>

 <td class="font1" align="center"><?php echo $resAug['OpeningOL']; ?></td>

 <td class="font1" align="center"><?php echo $resAug['AvailedOL']; ?></td>

 <td class="font1" align="center"><?php echo $resAug['BalanceOL']; ?></td>

 <?php if($TotN_CL_8>0 OR $TotN_SL_8>0 OR $TotN_PL_8>0 OR $TotN_EL_8>0 OR $TotN_OL_8>0) { ?>

 <td class="font1" align="center"><?php echo $TotN_OL_8; ?></td>

 <?php $FinBalOL_8=$resAug['BalanceOL']-$TotN_OL_8; ?>

 <td class="font1" align="center" bgcolor="#00D200"><b><?php echo $FinBalOL_8; ?></b></td><?php } ?>

</tr>

</table>

</td>

<?php //********************************************* Sep ****************************// ?>	

<?php $sqlSep=mysql_query("select * from hrm_employee_monthlyleave_balance where EmployeeID=".$EmployeeId." AND Month=9 AND Year='".date("Y")."'", $con); 

      $resSep=mysql_fetch_array($sqlSep); 

	  

$NextMonth_9='10'; $Sdate_9=date("Y-".$NextMonth_9."-01"); $Y=date("Y");

$sqlSNextCL_9=mysql_query("select count(AttValue) as SNextCL_9 from hrm_employee_attendance where AttValue='CL' AND EmployeeID=".$EmployeeId." AND AttDate>='".$Sdate_9."' AND Year=".$Y, $con); while($resSNextCL_9=mysql_fetch_array($sqlSNextCL_9)){$SumNextCL_9=$resSNextCL_9['SNextCL_9'];}

$sqlSNextCH_9=mysql_query("select count(AttValue) as SNextCH_9 from hrm_employee_attendance where AttValue='CH' AND EmployeeID=".$EmployeeId." AND AttDate>='".$Sdate_9."' AND Year=".$Y, $con); while($resSNextCH_9=mysql_fetch_array($sqlSNextCH_9)){$SumNextCH_9=$resSNextCH_9['SNextCH_9']/2;}

$sqlSNextSL_9=mysql_query("select count(AttValue) as SNextSL_9 from hrm_employee_attendance where AttValue='SL' AND EmployeeID=".$EmployeeId." AND AttDate>='".$Sdate_9."' AND Year=".$Y, $con); while($resSNextSL_9=mysql_fetch_array($sqlSNextSL_9)){$SumNextSL_9=$resSNextSL_9['SNextSL_9'];}

$sqlSNextSH_9=mysql_query("select count(AttValue) as SNextSH_9 from hrm_employee_attendance where AttValue='SH' AND EmployeeID=".$EmployeeId." AND AttDate>='".$Sdate_9."' AND Year=".$Y, $con); while($resSNextSH_9=mysql_fetch_array($sqlSNextSH_9)){$SumNextSH_9=$resSNextSH_9['SNextSH_9']/2;}

$sqlSNextPL_9=mysql_query("select count(AttValue) as SNextPL_9 from hrm_employee_attendance where AttValue='PL' AND EmployeeID=".$EmployeeId." AND AttDate>='".$Sdate_9."' AND Year=".$Y, $con); while($resSNextPL_9=mysql_fetch_array($sqlSNextPL_9)){$SumNextPL_9=$resSNextPL_9['SNextPL_9'];}

$sqlSNextEL_9=mysql_query("select count(AttValue) as SNextEL_9 from hrm_employee_attendance where AttValue='EL' AND EmployeeID=".$EmployeeId." AND AttDate>='".$Sdate_9."' AND Year=".$Y, $con); while($resSNextEL_9=mysql_fetch_array($sqlSNextEL_9)){$SumNextEL_9=$resSNextEL_9['SNextEL_9'];}

$sqlSNextOL_9=mysql_query("select count(AttValue) as SNextOL_9 from hrm_employee_attendance where AttValue='FL' AND EmployeeID=".$EmployeeId." AND AttDate>='".$Sdate_9."' AND Year=".$Y, $con); while($resSNextOL_9=mysql_fetch_array($sqlSNextOL_9)){$SumNextOL_9=$resSNextOL_9['SNextOL_9'];}



$TotN_CL_9=$SumNextCL_9+$SumNextCH_9; 

$TotN_SL_9=$SumNextSL_9+$SumNextSH_9; 

$TotN_PL_9=$SumNextPL_9; 

$TotN_EL_9=$SumNextEL_9;	

$TotN_OL_9=$SumNextOL_9;  

	  

	  ?>   

<td id="SepDT" style="display:<?php if(date("m")==9){echo 'block';} else {echo 'none';} ?>;width:540px;" valign="top">

<table style="width:<?php if($TotN_CL_9>0 OR $TotN_SL_9>0 OR $TotN_PL_9>0 OR $TotN_EL_9>0 OR $TotN_OL_9>0) { echo '540px'; } else { echo '360px';}?>;" border="1" bgcolor="#FFFFFF">

<tr bgcolor="#7a6189">

 <td colspan="4" bgcolor="#0080FF" align="center" style="font-family:Times New Roman; color:#FFFFFF; font-size:15px; height:25px; width:360px;">

 <b><blink>My Leave </blink>(Month - <font color="#FFFF00">September</font>)</b></td>

 <?php if($TotN_CL_9>0 OR $TotN_SL_9>0 OR $TotN_PL_9>0 OR $TotN_EL_9>0 OR $TotN_OL_9>0) { ?>

 <td colspan="2" bgcolor="#0080FF" align="center" style="font-family:Times New Roman; color:#FFFFFF; font-size:15px; height:25px; width:180px;">

 <b>Future Leave</b></td><?php } ?>

</tr>

<tr bgcolor="#7a6189">

 <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:90px;" valign="top" align="center"><b>Leave</b></td> 

 <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:90px;" valign="top" align="center"><b>Opening</b></td>

 <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:90px;" valign="top" align="center"><b>Availed</b></td>

 <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:90px;" valign="top" align="center"><b>Balance</b></td>

 <?php if($TotN_CL_9>0 OR $TotN_SL_9>0 OR $TotN_PL_9>0 OR $TotN_EL_9>0 OR $TotN_OL_9>0) { ?>

 <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:90px;" valign="top" align="center"><b>Availed</b></td>

 <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:90px;" valign="top" align="center"><b>Final Balance</b></td><?php } ?>

</tr>

<tr>

 <td class="font1" align="center">CL</td>

 <td class="font1" align="center"><?php echo $resSep['OpeningCL']; ?></td>

 <td class="font1" align="center"><?php echo $resSep['AvailedCL']; ?></td>

 <td class="font1" align="center"><?php echo $resSep['BalanceCL']; ?></td>

 <?php if($TotN_CL_9>0 OR $TotN_SL_9>0 OR $TotN_PL_9>0 OR $TotN_EL_9>0 OR $TotN_OL_9>0) { ?>

 <td class="font1" align="center"><?php echo $TotN_CL_9; ?></td>

 <?php $FinBalCL_9=$resSep['BalanceCL']-$TotN_CL_9; ?>

 <td class="font1" align="center" bgcolor="#00D200"><b><?php echo $FinBalCL_9; ?></b></td><?php } ?>

</tr>

<tr>

 <td class="font1" align="center">SL</td>

 <td class="font1" align="center"><?php echo $resSep['OpeningSL']; ?></td>

 <td class="font1" align="center"><?php echo $resSep['AvailedSL']; ?></td>

 <td class="font1" align="center"><?php echo $resSep['BalanceSL']; ?></td>

 <?php if($TotN_CL_9>0 OR $TotN_SL_9>0 OR $TotN_PL_9>0 OR $TotN_EL_9>0 OR $TotN_OL_9>0) { ?>

 <td class="font1" align="center"><?php echo $TotN_SL_9; ?></td>

 <?php $FinBalSL_9=$resSep['BalanceSL']-$TotN_SL_9; ?>

 <td class="font1" align="center" bgcolor="#00D200"><b><?php echo $FinBalSL_9; ?></b></td><?php } ?>

</tr>

<tr>

 <td class="font1" align="center">PL</td>

 <td class="font1" align="center"><?php echo $resSep['OpeningPL']; ?></td>

 <td class="font1" align="center"><?php echo $resSep['AvailedPL']; ?></td>

 <td class="font1" align="center"><?php echo $resSep['BalancePL']; ?></td>

 <?php if($TotN_CL_9>0 OR $TotN_SL_9>0 OR $TotN_PL_9>0 OR $TotN_EL_9>0 OR $TotN_OL_9>0) { ?>

 <td class="font1" align="center"><?php echo $TotN_PL_9; ?></td>

 <?php $FinBalPL_9=$resSep['BalancePL']-$TotN_PL_9; ?>

 <td class="font1" align="center" bgcolor="#00D200"><b><?php echo $FinBalPL_9; ?></b></td><?php } ?>

</tr>

<tr>

 <td class="font1" align="center">EL</td>

 <td class="font1" align="center"><?php echo $resSep['OpeningEL']; ?></td>

 <td class="font1" align="center"><?php echo $resSep['AvailedEL']; ?></td>

 <td class="font1" align="center"><?php echo $resSep['BalanceEL']; ?></td>

 <?php if($TotN_CL_9>0 OR $TotN_SL_9>0 OR $TotN_PL_9>0 OR $TotN_EL_9>0 OR $TotN_OL_9>0) { ?>

 <td class="font1" align="center"><?php echo $TotN_EL_9; ?></td>

 <?php $FinBalEL_9=$resSep['BalanceEL']-$TotN_EL_9; ?>

 <td class="font1" align="center" bgcolor="#00D200"><b><?php echo $FinBalEL_9; ?></b></td><?php } ?>

</tr>

<tr>

 <td class="font1" align="center">FL</td>

 <td class="font1" align="center"><?php echo $resSep['OpeningOL']; ?></td>

 <td class="font1" align="center"><?php echo $resSep['AvailedOL']; ?></td>

 <td class="font1" align="center"><?php echo $resSep['BalanceOL']; ?></td>

 <?php if($TotN_CL_9>0 OR $TotN_SL_9>0 OR $TotN_PL_9>0 OR $TotN_EL_9>0 OR $TotN_OL_9>0) { ?>

 <td class="font1" align="center"><?php echo $TotN_OL_9; ?></td>

 <?php $FinBalOL_9=$resSep['BalanceOL']-$TotN_OL_9; ?>

 <td class="font1" align="center" bgcolor="#00D200"><b><?php echo $FinBalOL_9; ?></b></td><?php } ?>

</tr>

</table>

</td>

<?php //********************************************* Oct ****************************// ?>	

<?php $sqlOct=mysql_query("select * from hrm_employee_monthlyleave_balance where EmployeeID=".$EmployeeId." AND Month=10 AND Year='".date("Y")."'", $con); 

      $resOct=mysql_fetch_array($sqlOct); 

	  

$NextMonth_10='11'; $Sdate_10=date("Y-".$NextMonth_10."-01"); $Y=date("Y");

$sqlSNextCL_10=mysql_query("select count(AttValue) as SNextCL_10 from hrm_employee_attendance where AttValue='CL' AND EmployeeID=".$EmployeeId." AND AttDate>='".$Sdate_10."' AND Year=".$Y, $con); while($resSNextCL_10=mysql_fetch_array($sqlSNextCL_10)){$SumNextCL_10=$resSNextCL_10['SNextCL_10'];}

$sqlSNextCH_10=mysql_query("select count(AttValue) as SNextCH_10 from hrm_employee_attendance where AttValue='CH' AND EmployeeID=".$EmployeeId." AND AttDate>='".$Sdate_10."' AND Year=".$Y, $con); while($resSNextCH_10=mysql_fetch_array($sqlSNextCH_10)){$SumNextCH_10=$resSNextCH_10['SNextCH_10']/2;}

$sqlSNextSL_10=mysql_query("select count(AttValue) as SNextSL_10 from hrm_employee_attendance where AttValue='SL' AND EmployeeID=".$EmployeeId." AND AttDate>='".$Sdate_10."' AND Year=".$Y, $con); while($resSNextSL_10=mysql_fetch_array($sqlSNextSL_10)){$SumNextSL_10=$resSNextSL_10['SNextSL_10'];}

$sqlSNextSH_10=mysql_query("select count(AttValue) as SNextSH_10 from hrm_employee_attendance where AttValue='SH' AND EmployeeID=".$EmployeeId." AND AttDate>='".$Sdate_10."' AND Year=".$Y, $con); while($resSNextSH_10=mysql_fetch_array($sqlSNextSH_10)){$SumNextSH_10=$resSNextSH_10['SNextSH_10']/2;}

$sqlSNextPL_10=mysql_query("select count(AttValue) as SNextPL_10 from hrm_employee_attendance where AttValue='PL' AND EmployeeID=".$EmployeeId." AND AttDate>='".$Sdate_10."' AND Year=".$Y, $con); while($resSNextPL_10=mysql_fetch_array($sqlSNextPL_10)){$SumNextPL_10=$resSNextPL_10['SNextPL_10'];}

$sqlSNextEL_10=mysql_query("select count(AttValue) as SNextEL_10 from hrm_employee_attendance where AttValue='EL' AND EmployeeID=".$EmployeeId." AND AttDate>='".$Sdate_10."' AND Year=".$Y, $con); while($resSNextEL_10=mysql_fetch_array($sqlSNextEL_10)){$SumNextEL_10=$resSNextEL_10['SNextEL_10'];}

$sqlSNextOL_10=mysql_query("select count(AttValue) as SNextOL_10 from hrm_employee_attendance where AttValue='FL' AND EmployeeID=".$EmployeeId." AND AttDate>='".$Sdate_10."' AND Year=".$Y, $con); while($resSNextOL_10=mysql_fetch_array($sqlSNextOL_10)){$SumNextOL_10=$resSNextOL_10['SNextOL_10'];}



$TotN_CL_10=$SumNextCL_10+$SumNextCH_10; 

$TotN_SL_10=$SumNextSL_10+$SumNextSH_10; 

$TotN_PL_10=$SumNextPL_10; 

$TotN_EL_10=$SumNextEL_10;	 

$TotN_OL_10=$SumNextOL_10; 

	  

	  ?>   

<td id="OctDT" style="display:<?php if(date("m")==10){echo 'block';} else {echo 'none';} ?>;width:540px;" valign="top">

<table style="width:<?php if($TotN_CL_10>0 OR $TotN_SL_10>0 OR $TotN_PL_10>0 OR $TotN_EL_10>0 OR $TotN_OL_10>0) { echo '540px'; } else { echo '360px';}?>;" border="1" bgcolor="#FFFFFF">

<tr bgcolor="#7a6189">

 <td colspan="4" bgcolor="#0080FF" align="center" style="font-family:Times New Roman; color:#FFFFFF; font-size:15px; height:25px; width:360px;">

 <b><blink>My Leave </blink>(Month - <font color="#FFFF00">October</font>)</b></td>

 <?php if($TotN_CL_10>0 OR $TotN_SL_10>0 OR $TotN_PL_10>0 OR $TotN_EL_10>0 OR $TotN_OL_10>0) { ?>

 <td colspan="2" bgcolor="#0080FF" align="center" style="font-family:Times New Roman; color:#FFFFFF; font-size:15px; height:25px; width:180px;">

 <b>Future Leave</b></td><?php } ?>

</tr>

<tr bgcolor="#7a6189">

 <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:90px;" valign="top" align="center"><b>Leave</b></td> 

 <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:90px;" valign="top" align="center"><b>Opening</b></td>

 <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:90px;" valign="top" align="center"><b>Availed</b></td>

 <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:90px;" valign="top" align="center"><b>Balance</b></td>

 <?php if($TotN_CL_10>0 OR $TotN_SL_10>0 OR $TotN_PL_10>0 OR $TotN_EL_10>0 OR $TotN_OL_10>0) { ?>

 <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:90px;" valign="top" align="center"><b>Availed</b></td>

 <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:90px;" valign="top" align="center"><b>Final Balance</b></td><?php } ?>

</tr>

<tr>

 <td class="font1" align="center">CL</td>

 <td class="font1" align="center"><?php echo $resOct['OpeningCL']; ?></td>

 <td class="font1" align="center"><?php echo $resOct['AvailedCL']; ?></td>

 <td class="font1" align="center"><?php echo $resOct['BalanceCL']; ?></td>

 <?php if($TotN_CL_10>0 OR $TotN_SL_10>0 OR $TotN_PL_10>0 OR $TotN_EL_10>0 OR $TotN_OL_10>0) { ?>

 <td class="font1" align="center"><?php echo $TotN_CL_10; ?></td>

 <?php $FinBalCL_10=$resOct['BalanceCL']-$TotN_CL_10; ?>

 <td class="font1" align="center" bgcolor="#00D200"><b><?php echo $FinBalCL_10; ?></b></td><?php } ?>

</tr>

<tr>

 <td class="font1" align="center">SL</td>

 <td class="font1" align="center"><?php echo $resOct['OpeningSL']; ?></td>

 <td class="font1" align="center"><?php echo $resOct['AvailedSL']; ?></td>

 <td class="font1" align="center"><?php echo $resOct['BalanceSL']; ?></td>

 <?php if($TotN_CL_10>0 OR $TotN_SL_10>0 OR $TotN_PL_10>0 OR $TotN_EL_10>0 OR $TotN_OL_10>0) { ?>

 <td class="font1" align="center"><?php echo $TotN_SL_10; ?></td>

 <?php $FinBalSL_10=$resOct['BalanceSL']-$TotN_SL_10; ?>

 <td class="font1" align="center" bgcolor="#00D200"><b><?php echo $FinBalSL_10; ?></b></td><?php } ?>

</tr>

<tr>

 <td class="font1" align="center">PL</td>

 <td class="font1" align="center"><?php echo $resOct['OpeningPL']; ?></td>

 <td class="font1" align="center"><?php echo $resOct['AvailedPL']; ?></td>

 <td class="font1" align="center"><?php echo $resOct['BalancePL']; ?></td>

 <?php if($TotN_CL_10>0 OR $TotN_SL_10>0 OR $TotN_PL_10>0 OR $TotN_EL_10>0 OR $TotN_OL_10>0) { ?>

 <td class="font1" align="center"><?php echo $TotN_PL_10; ?></td>

 <?php $FinBalPL_10=$resOct['BalancePL']-$TotN_PL_10; ?>

 <td class="font1" align="center" bgcolor="#00D200"><b><?php echo $FinBalPL_10; ?></b></td><?php } ?>

</tr>

<tr>

 <td class="font1" align="center">EL</td>

 <td class="font1" align="center"><?php echo $resOct['OpeningEL']; ?></td>

 <td class="font1" align="center"><?php echo $resOct['AvailedEL']; ?></td>

 <td class="font1" align="center"><?php echo $resOct['BalanceEL']; ?></td>

 <?php if($TotN_CL_10>0 OR $TotN_SL_10>0 OR $TotN_PL_10>0 OR $TotN_EL_10>0 OR $TotN_OL_10>0) { ?>

 <td class="font1" align="center"><?php echo $TotN_EL_10; ?></td>

 <?php $FinBalEL_10=$resOct['BalanceEL']-$TotN_EL_10; ?>

 <td class="font1" align="center" bgcolor="#00D200"><b><?php echo $FinBalEL_10; ?></b></td><?php } ?>

</tr>

<tr>

 <td class="font1" align="center">FL</td>

 <td class="font1" align="center"><?php echo $resOct['OpeningOL']; ?></td>

 <td class="font1" align="center"><?php echo $resOct['AvailedOL']; ?></td>

 <td class="font1" align="center"><?php echo $resOct['BalanceOL']; ?></td>

 <?php if($TotN_CL_10>0 OR $TotN_SL_10>0 OR $TotN_PL_10>0 OR $TotN_EL_10>0 OR $TotN_OL_10>0) { ?>

 <td class="font1" align="center"><?php echo $TotN_OL_10; ?></td>

 <?php $FinBalOL_10=$resOct['BalanceOL']-$TotN_OL_10; ?>

 <td class="font1" align="center" bgcolor="#00D200"><b><?php echo $FinBalOL_10; ?></b></td><?php } ?>

</tr>

</table>

</td>

<?php //********************************************* Nov ****************************// ?>	

<?php $sqlNov=mysql_query("select * from hrm_employee_monthlyleave_balance where EmployeeID=".$EmployeeId." AND Month=11 AND Year='".date("Y")."'", $con); 

      $resNov=mysql_fetch_array($sqlNov); 

	  

$NextMonth_11='12'; $Sdate_11=date("Y-".$NextMonth_11."-01"); $Y=date("Y");

$sqlSNextCL_11=mysql_query("select count(AttValue) as SNextCL_11 from hrm_employee_attendance where AttValue='CL' AND EmployeeID=".$EmployeeId." AND AttDate>='".$Sdate_11."' AND Year=".$Y, $con); while($resSNextCL_11=mysql_fetch_array($sqlSNextCL_11)){$SumNextCL_11=$resSNextCL_11['SNextCL_11'];}

$sqlSNextCH_11=mysql_query("select count(AttValue) as SNextCH_11 from hrm_employee_attendance where AttValue='CH' AND EmployeeID=".$EmployeeId." AND AttDate>='".$Sdate_11."' AND Year=".$Y, $con); while($resSNextCH_11=mysql_fetch_array($sqlSNextCH_11)){$SumNextCH_11=$resSNextCH_11['SNextCH_11']/2;}

$sqlSNextSL_11=mysql_query("select count(AttValue) as SNextSL_11 from hrm_employee_attendance where AttValue='SL' AND EmployeeID=".$EmployeeId." AND AttDate>='".$Sdate_11."' AND Year=".$Y, $con); while($resSNextSL_11=mysql_fetch_array($sqlSNextSL_11)){$SumNextSL_11=$resSNextSL_11['SNextSL_11'];}

$sqlSNextSH_11=mysql_query("select count(AttValue) as SNextSH_11 from hrm_employee_attendance where AttValue='SH' AND EmployeeID=".$EmployeeId." AND AttDate>='".$Sdate_11."' AND Year=".$Y, $con); while($resSNextSH_11=mysql_fetch_array($sqlSNextSH_11)){$SumNextSH_11=$resSNextSH_11['SNextSH_11']/2;}

$sqlSNextPL_11=mysql_query("select count(AttValue) as SNextPL_11 from hrm_employee_attendance where AttValue='PL' AND EmployeeID=".$EmployeeId." AND AttDate>='".$Sdate_11."' AND Year=".$Y, $con); while($resSNextPL_11=mysql_fetch_array($sqlSNextPL_11)){$SumNextPL_11=$resSNextPL_11['SNextPL_11'];}

$sqlSNextEL_11=mysql_query("select count(AttValue) as SNextEL_11 from hrm_employee_attendance where AttValue='EL' AND EmployeeID=".$EmployeeId." AND AttDate>='".$Sdate_11."' AND Year=".$Y, $con); while($resSNextEL_11=mysql_fetch_array($sqlSNextEL_11)){$SumNextEL_11=$resSNextEL_11['SNextEL_11'];}

$sqlSNextOL_11=mysql_query("select count(AttValue) as SNextOL_11 from hrm_employee_attendance where AttValue='FL' AND EmployeeID=".$EmployeeId." AND AttDate>='".$Sdate_11."' AND Year=".$Y, $con); while($resSNextOL_11=mysql_fetch_array($sqlSNextOL_11)){$SumNextOL_11=$resSNextOL_11['SNextOL_11'];}



$TotN_CL_11=$SumNextCL_11+$SumNextCH_11; 

$TotN_SL_11=$SumNextSL_11+$SumNextSH_11; 

$TotN_PL_11=$SumNextPL_11; 

$TotN_EL_11=$SumNextEL_11;	

$TotN_OL_11=$SumNextOL_11;  

	  

	  ?>   

<td id="NovDT" style="display:<?php if(date("m")==11){echo 'block';} else {echo 'none';} ?>;width:540px;" valign="top">

<table style="width:<?php if($TotN_CL_11>0 OR $TotN_SL_11>0 OR $TotN_PL_11>0 OR $TotN_EL_11>0 OR $TotN_OL_11>0) { echo '540px'; } else { echo '360px';}?>;" border="1" bgcolor="#FFFFFF">

<tr bgcolor="#7a6189">

 <td colspan="4" bgcolor="#0080FF" align="center" style="font-family:Times New Roman; color:#FFFFFF; font-size:15px; height:25px; width:360px;">

 <b><blink>My Leave </blink>(Month - <font color="#FFFF00">November</font>)</b></td>

 <?php if($TotN_CL_11>0 OR $TotN_SL_11>0 OR $TotN_PL_11>0 OR $TotN_EL_11>0 OR $TotN_OL_11>0) { ?>

 <td colspan="2" bgcolor="#0080FF" align="center" style="font-family:Times New Roman; color:#FFFFFF; font-size:15px; height:25px; width:180px;">

 <b>Future Leave</b></td><?php } ?>

</tr>

<tr bgcolor="#7a6189">

 <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:90px;" valign="top" align="center"><b>Leave</b></td> 

 <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:90px;" valign="top" align="center"><b>Opening</b></td>

 <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:90px;" valign="top" align="center"><b>Availed</b></td>

 <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:90px;" valign="top" align="center"><b>Balance</b></td>

 <?php if($TotN_CL_11>0 OR $TotN_SL_11>0 OR $TotN_PL_11>0 OR $TotN_EL_11>0 OR $TotN_OL_11>0) { ?>

 <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:90px;" valign="top" align="center"><b>Availed</b></td>

 <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:90px;" valign="top" align="center"><b>Final Balance</b></td><?php } ?>

</tr>

<tr>

 <td class="font1" align="center">CL</td>

 <td class="font1" align="center"><?php echo $resNov['OpeningCL']; ?></td>

 <td class="font1" align="center"><?php echo $resNov['AvailedCL']; ?></td>

 <td class="font1" align="center"><?php echo $resNov['BalanceCL']; ?></td>

 <?php if($TotN_CL_11>0 OR $TotN_SL_11>0 OR $TotN_PL_11>0 OR $TotN_EL_11>0 OR $TotN_OL_11>0) { ?>

 <td class="font1" align="center"><?php echo $TotN_CL_11; ?></td>

 <?php $FinBalCL_11=$resNov['BalanceCL']-$TotN_CL_11; ?>

 <td class="font1" align="center" bgcolor="#00D200"><b><?php echo $FinBalCL_11; ?></b></td><?php } ?>

</tr>

<tr>

 <td class="font1" align="center">SL</td>

 <td class="font1" align="center"><?php echo $resNov['OpeningSL']; ?></td>

 <td class="font1" align="center"><?php echo $resNov['AvailedSL']; ?></td>

 <td class="font1" align="center"><b><?php echo $resNov['BalanceSL']; ?></b></td>

 <?php if($TotN_CL_11>0 OR $TotN_SL_11>0 OR $TotN_PL_11>0 OR $TotN_EL_11>0 OR $TotN_OL_11>0) { ?>

 <td class="font1" align="center"><?php echo $TotN_SL_11; ?></td>

 <?php $FinBalSL_11=$resNov['BalanceSL']-$TotN_SL_11; ?>

 <td class="font1" align="center" bgcolor="#00D200"><b><?php echo $FinBalSL_11; ?></b></td><?php } ?>

</tr>

<tr>

 <td class="font1" align="center">PL</td>

 <td class="font1" align="center"><?php echo $resNov['OpeningPL']; ?></td>

 <td class="font1" align="center"><?php echo $resNov['AvailedPL']; ?></td>

 <td class="font1" align="center"><?php echo $resNov['BalancePL']; ?></td>

 <?php if($TotN_CL_11>0 OR $TotN_SL_11>0 OR $TotN_PL_11>0 OR $TotN_EL_11>0 OR $TotN_OL_11>0) { ?>

 <td class="font1" align="center"><?php echo $TotN_PL_11; ?></td>

 <?php $FinBalPL_11=$resNov['BalancePL']-$TotN_PL_11; ?>

 <td class="font1" align="center" bgcolor="#00D200"><b><?php echo $FinBalPL_11; ?></b></td><?php } ?>

</tr>

<tr>

 <td class="font1" align="center">EL</td>

 <td class="font1" align="center"><?php echo $resNov['OpeningEL']; ?></td>

 <td class="font1" align="center"><?php echo $resNov['AvailedEL']; ?></td>

 <td class="font1" align="center"><?php echo $resNov['BalanceEL']; ?></td>

 <?php if($TotN_CL_11>0 OR $TotN_SL_11>0 OR $TotN_PL_11>0 OR $TotN_EL_11>0 OR $TotN_OL_11>0) { ?>

 <td class="font1" align="center"><?php echo $TotN_EL_11; ?></td>

 <?php $FinBalEL_11=$resNov['BalanceEL']-$TotN_EL_11; ?>

 <td class="font1" align="center" bgcolor="#00D200"><b><?php echo $FinBalEL_11; ?></b></td><?php } ?>

</tr>

<tr>

 <td class="font1" align="center">FL</td>

 <td class="font1" align="center"><?php echo $resNov['OpeningOL']; ?></td>

 <td class="font1" align="center"><?php echo $resNov['AvailedOL']; ?></td>

 <td class="font1" align="center"><?php echo $resNov['BalanceOL']; ?></td>

 <?php if($TotN_CL_11>0 OR $TotN_SL_11>0 OR $TotN_PL_11>0 OR $TotN_EL_11>0 OR $TotN_OL_11>0) { ?>

 <td class="font1" align="center"><?php echo $TotN_OL_11; ?></td>

 <?php $FinBalOL_11=$resNov['BalanceOL']-$TotN_OL_11; ?>

 <td class="font1" align="center" bgcolor="#00D200"><b><?php echo $FinBalOL_11; ?></b></td><?php } ?>

</tr>

</table>

</td>

<?php //********************************************* Dec ****************************// ?>	

<?php $sqlDec=mysql_query("select * from hrm_employee_monthlyleave_balance where EmployeeID=".$EmployeeId." AND Month=12 AND Year='".date("Y")."'", $con); 

      $resDec=mysql_fetch_array($sqlDec); 

      $TotN_CL_12=0; 

	  $TotN_SL_12=0; 

	  $TotN_PL_12=0; 

	  $TotN_EL_12=0;

	  $TotN_OL_12=0;		  	    

	  ?>   

<td id="DecDT" style="display:<?php if(date("m")==12){echo 'block';} else {echo 'none';} ?>;width:540px;" valign="top">

<table style="width:<?php if($TotN_CL_12>0 OR $TotN_SL_12>0 OR $TotN_PL_12>0 OR $TotN_EL_12>0 OR $TotN_OL_12>0) { echo '540px'; } else { echo '360px';}?>;" border="1" bgcolor="#FFFFFF">

<tr bgcolor="#7a6189">

 <td colspan="4" bgcolor="#0080FF" align="center" style="font-family:Times New Roman; color:#FFFFFF; font-size:15px; height:25px; width:360px;">

 <b><blink>My Leave </blink>(Month - <font color="#FFFF00">December</font>)</b></td>

 <?php if($TotN_CL_12>0 OR $TotN_SL_12>0 OR $TotN_PL_12>0 OR $TotN_EL_12>0 OR $TotN_OL_12>0) { ?>

 <td colspan="2" bgcolor="#0080FF" align="center" style="font-family:Times New Roman; color:#FFFFFF; font-size:15px; height:25px; width:180px;">

 <b>Future Leave</b></td><?php } ?>

</tr>

<tr bgcolor="#7a6189">

 <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:90px;" valign="top" align="center"><b>Leave</b></td>

 <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:90px;" valign="top" align="center"><b>Opening</b></td>

 <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:90px;" valign="top" align="center"><b>Availed</b></td>

 <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:90px;" valign="top" align="center"><b>Balance</b></td>

 <?php if($TotN_CL_12>0 OR $TotN_SL_12>0 OR $TotN_PL_12>0 OR $TotN_EL_12>0 OR $TotN_OL_12>0) { ?>

 <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:90px;" valign="top" align="center"><b>Availed</b></td>

 <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:90px;" valign="top" align="center"><b>Final Balance</b></td><?php } ?>

</tr>

<tr>

 <td class="font1" align="center">CL</td>

 <td class="font1" align="center"><?php echo $resDec['OpeningCL']; ?></td>

 <td class="font1" align="center"><?php echo $resDec['AvailedCL']; ?></td>

 <td class="font1" align="center"><?php echo $resDec['BalanceCL']; ?></td>

 <?php if($TotN_CL_12>0 OR $TotN_SL_12>0 OR $TotN_PL_12>0 OR $TotN_EL_12>0 OR $TotN_OL_12>0) { ?>

 <td class="font1" align="center"><?php echo $TotN_CL_12; ?></td>

 <?php $FinBalCL_12=$resDec['BalanceCL']-$TotN_CL_12; ?>

 <td class="font1" align="center" bgcolor="#00D200"><b><?php echo $FinBalCL_12; ?></b></td><?php } ?>

</tr>

<tr>

 <td class="font1" align="center">SL</td>

 <td class="font1" align="center"><?php echo $resDec['OpeningSL']; ?></td>

 <td class="font1" align="center"><?php echo $resDec['AvailedSL']; ?></td>

 <td class="font1" align="center"><?php echo $resDec['BalanceSL']; ?></td>

 <?php if($TotN_CL_12>0 OR $TotN_SL_12>0 OR $TotN_PL_12>0 OR $TotN_EL_12>0 OR $TotN_OL_12>0) { ?>

  <td class="font1" align="center"><?php echo $TotN_SL_12; ?></td>

 <?php $FinBalSL_12=$resDec['BalanceSL']-$TotN_SL_12; ?>

 <td class="font1" align="center" bgcolor="#00D200"><b><?php echo $FinBalSL_12; ?></b></td><?php } ?>

</tr>

<tr>

 <td class="font1" align="center">PL</td>

 <td class="font1" align="center"><?php echo $resDec['OpeningPL']; ?></td>

 <td class="font1" align="center"><?php echo $resDec['AvailedPL']; ?></td>

 <td class="font1" align="center"><?php echo $resDec['BalancePL']; ?></td>

 <?php if($TotN_CL_12>0 OR $TotN_SL_12>0 OR $TotN_PL_12>0 OR $TotN_EL_12>0 OR $TotN_OL_12>0) { ?>

  <td class="font1" align="center"><?php echo $TotN_PL_12; ?></td>

 <?php $FinBalPL_12=$resDec['BalancePL']-$TotN_PL_12; ?>

 <td class="font1" align="center" bgcolor="#00D200"><b><?php echo $FinBalPL_12; ?></b></td><?php } ?>

</tr>

<tr>

 <td class="font1" align="center">EL</td>

 <td class="font1" align="center"><?php echo $resDec['OpeningEL']; ?></td>

 <td class="font1" align="center"><?php echo $resDec['AvailedEL']; ?></td>

 <td class="font1" align="center"><?php echo $resDec['BalanceEL']; ?></td>

 <?php if($TotN_CL_12>0 OR $TotN_SL_12>0 OR $TotN_PL_12>0 OR $TotN_EL_12>0 OR $TotN_OL_12>0) { ?>

  <td class="font1" align="center"><?php echo $TotN_EL_12; ?></td>

 <?php $FinBalEL_12=$resDec['BalanceEL']-$TotN_EL_12; ?>

 <td class="font1" align="center" bgcolor="#00D200"><b><?php echo $FinBalEL_12; ?></b></td><?php } ?>

</tr>

<tr>

 <td class="font1" align="center">FL</td>

 <td class="font1" align="center"><?php echo $resDec['OpeningOL']; ?></td>

 <td class="font1" align="center"><?php echo $resDec['AvailedOL']; ?></td>

 <td class="font1" align="center"><?php echo $resDec['BalanceOL']; ?></td>

 <?php if($TotN_CL_12>0 OR $TotN_SL_12>0 OR $TotN_PL_12>0 OR $TotN_EL_12>0 OR $TotN_OL_12>0) { ?>

  <td class="font1" align="center"><?php echo $TotN_OL_12; ?></td>

 <?php $FinBalOL_12=$resDec['BalanceOL']-$TotN_OL_12; ?>

 <td class="font1" align="center" bgcolor="#00D200"><b><?php echo $FinBalOL_12; ?></b></td><?php } ?>

</tr>

</table>

</td>

<?php //************ Close Close Close *************************** ?>		 

	   </tr>

	  </table>

	 </td>	   

<?php /********************************** Leave Details ***********************************/?>			   

		       <td width="100">&nbsp;</td>

		   

		  </tr>

		</table>

	  </td>

	</tr>

	

	<tr>

	  <td valign="top">

	    <table border="0" style="margin-top:0px;">

				<tr>

				  <td width="155" align="right" valign="top">

				   <table>

				    <tr>

					  <td id="Leave2StatusTD" style="font-family:Times New Roman; color:#FFFFFF; font-size:15px;width:100px; display:none;" align="right" valign="top">

					  &nbsp;<a href="#" onClick="HideAppLeave(<?php echo $EmployeeId; ?>)"><b>Hide</b></a>

				     </td>

					</tr>

				   </table>

				  </td>			  

	              <td align="center" id="LeaveStatusTD" style="display:none;width:880px;">

				    <table border="1">

					  <tr bgcolor="#7a6189" style="height:22px;">

		   <td align="center" style="font:Georgia; color:#FFFFFF; font-size:11px; width:50px;"><b>SNo</b></td>

		   <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:100px;" align="center"><b>Apply Date</b></td>

		   <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:100px;" align="center"><b>Leave</b></td>

		   <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:100px;" align="center"><b>From</b></td>

 		   <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:100px;" align="center"><b>To</b></td>

		   <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:100px;" align="center"><b>Total Day</b></td>

		   <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:80px;" align="center"><b>Details</b></td>

		   <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:120px;" align="center"><b>Status</b></td>

		   <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:150px;" align="center"><b>Action</b></td>

		             </tr>	

<?php if($rowCheck>0) { $Sn=1; while($resCheck=mysql_fetch_array($sqlCheck)) { ?>

           <tr bgcolor="#FFFFFF" style="height:22px;">

		   <td align="center" style="font:Georgia; font-size:11px; width:50px;"><?php echo $Sn; ?></td>

		   <td style="font-family:Times New Roman; font-size:12px; width:100px;" align="center"><?php echo date("d-m-y", strtotime($resCheck['Apply_Date'])); ?></td>

		   <td style="font-family:Georgia; font-size:11px; width:100px;" align="center"><?php if($resCheck['Leave_Type']=='CH'){echo 'Half day CL';} elseif($resCheck['Leave_Type']=='SH'){echo 'Half day SL';} else {echo $resCheck['Leave_Type'];} ?></td>

		   <td style="font-family:Times New Roman; font-size:12px; width:100px;" align="center"><?php echo date("d-m-y", strtotime($resCheck['Apply_FromDate'])); ?></td>

 		   <td style="font-family:Times New Roman; font-size:12px; width:100px;" align="center"><?php echo date("d-m-y", strtotime($resCheck['Apply_ToDate'])); ?></td>

		   <td style="font-family:Times New Roman; font-size:12px; width:100px; background-color:#CCFFCC;" align="center"><?php echo $resCheck['Apply_TotalDay']; ?></td>

		   <td style="font-family:Georgia; font-size:11px; width:80px;" align="center">

		   <a href="javascript:OpenWindow(<?php echo $resCheck['ApplyLeaveId']; ?>)">Details</a></td>

		   <td style="font-family:Georgia; font-size:11px; width:120px;" align="center"><?php if($resCheck['LeaveStatus']==0){echo 'Draft';} if($resCheck['LeaveStatus']==1){echo 'Pending';} if($resCheck['LeaveStatus']==2){echo 'Approved';} if($resCheck['LeaveStatus']==3){echo 'DisApproved';} if($resCheck['LeaveStatus']==4){echo 'Canceled';}?></td>

		   <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:150px;" align="center">

			<?php if($resCheck['LeaveStatus']==0){?>

			<a href="#" onClick="DelAppLeave(<?php echo $resCheck['ApplyLeaveId'].', '.$EmployeeId; ?>, '<?php echo date("d-m-y", strtotime($resCheck['Apply_FromDate'])); ?>', '<?php echo date("d-m-y", strtotime($resCheck['Apply_ToDate'])); ?>', '<?php echo $resCheck['Leave_Type']; ?>')"><font color="#FF0000">Delete</font></a>

			<?php } if(($resCheck['LeaveStatus']==2 OR $resCheck['LeaveStatus']==1 OR $resCheck['LeaveStatus']==4) AND date("m")==date("m", strtotime($resCheck['Apply_FromDate'])) AND date("m")==date("m", strtotime($resCheck['Apply_ToDate']))){?>

			<?php if($resCheck['LeaveEmpCancelStatus']=='N'){ ?><a href="#" onClick="CancelAppLeave(<?php echo $resCheck['ApplyLeaveId']; ?>)">Apply Cancelation</a>

			<?php } elseif($resCheck['LeaveEmpCancelStatus']=='Y' AND $resCheck['LeaveCancelStatus']=='N'){?><font color="#FF8000">Apply Cancelation</font> 

			<?php } elseif($resCheck['LeaveEmpCancelStatus']=='Y' AND $resCheck['LeaveCancelStatus']=='Y'){?><font color="#FF8000">Leave Canceled</font> <?php } ?>

			<?php } ?>

		  </td>

		             </tr>	

<?php $Sn++;} } ?>				 			 

					</table>

				 </td>

			  </tr>

	    </table>

	  </td>

	</tr>

	

	<tr>

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

	</tr>

  </table>

 </td>

</tr>

</table>

</body>

</html>



