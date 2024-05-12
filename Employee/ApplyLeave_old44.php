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
  
  $P1OTa=mysql_query("select AttId from hrm_employee_attendance where (AttValue='SL' OR AttValue='SH' OR AttValue='ASH' OR AttValue='PL' OR AttValue='APH' OR AttValue='EL' OR AttValue='FL' OR AttValue='TL') AND EmployeeID=".$EmployeeId." AND AttDate='".$P1."'", $con);
  $P2OTa=mysql_query("select AttId from hrm_employee_attendance where (AttValue='SL' OR AttValue='SH' OR AttValue='ASH' OR AttValue='PL' OR AttValue='APH' OR AttValue='EL' OR AttValue='FL' OR AttValue='TL') AND EmployeeID=".$EmployeeId." AND AttDate='".$P2."'", $con); 
  $P3OTa=mysql_query("select AttId from hrm_employee_attendance where (AttValue='SL' OR AttValue='SH' OR AttValue='ASH' OR AttValue='PL' OR AttValue='APH' OR AttValue='EL' OR AttValue='FL' OR AttValue='TL') AND EmployeeID=".$EmployeeId." AND AttDate='".$P3."'", $con); 
  $P4OTa=mysql_query("select AttId from hrm_employee_attendance where (AttValue='SL' OR AttValue='SH' OR AttValue='ASH' OR AttValue='PL' OR AttValue='APH' OR AttValue='EL' OR AttValue='FL' OR AttValue='TL') AND EmployeeID=".$EmployeeId." AND AttDate='".$P4."'", $con); 
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
  $N1CHa=mysql_query("select AttId from hrm_employee_attendance where (AttValue='CH' OR AttValue='ACH') AND EmployeeID=".$EmployeeId." AND AttDate='".$N1."'", $con); $rN1CHa=mysql_num_rows($N1CHa);
  $N2CHa=mysql_query("select AttId from hrm_employee_attendance where (AttValue='CH' OR AttValue='ACH') AND EmployeeID=".$EmployeeId." AND AttDate='".$N2."'", $con); $rN2CHa=mysql_num_rows($N2CHa);
  $N3CHa=mysql_query("select AttId from hrm_employee_attendance where (AttValue='CH' OR AttValue='ACH') AND EmployeeID=".$EmployeeId." AND AttDate='".$N3."'", $con); $rN3CHa=mysql_num_rows($N3CHa);
  $N4CHa=mysql_query("select AttId from hrm_employee_attendance where (AttValue='CH' OR AttValue='ACH') AND EmployeeID=".$EmployeeId." AND AttDate='".$N4."'", $con); $rN4CHa=mysql_num_rows($N4CHa);
  $N5CHa=mysql_query("select AttId from hrm_employee_attendance where (AttValue='CH' OR AttValue='ACH') AND EmployeeID=".$EmployeeId." AND AttDate='".$N5."'", $con); $rN5CHa=mysql_num_rows($N5CHa);
  
  $N1CLp=mysql_query("select ApplyLeaveId from hrm_employee_applyleave where Leave_Type='CL' AND LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$EmployeeId." AND Apply_FromDate='".$N1."'", $con); $N2CLp=mysql_query("select ApplyLeaveId from hrm_employee_applyleave where Leave_Type='CL' AND LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$EmployeeId." AND Apply_FromDate='".$N2."'", $con); $N3CLp=mysql_query("select ApplyLeaveId from hrm_employee_applyleave where Leave_Type='CL' AND LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$EmployeeId." AND Apply_FromDate='".$N3."'", $con); $N4CLp=mysql_query("select ApplyLeaveId from hrm_employee_applyleave where Leave_Type='CL' AND LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$EmployeeId." AND Apply_FromDate='".$N4."'", $con); $N5CLp=mysql_query("select ApplyLeaveId from hrm_employee_applyleave where Leave_Type='CL' AND LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$EmployeeId." AND Apply_FromDate='".$N5."'", $con); 
	$rN1CLp=mysql_num_rows($N1CLp); $rN2CLp=mysql_num_rows($N2CLp); $rN3CLp=mysql_num_rows($N3CLp);  $rN4CLp=mysql_num_rows($N4CLp); $rN5CLp=mysql_num_rows($N5CLp);
  $N1CHp=mysql_query("select ApplyLeaveId from hrm_employee_applyleave where Leave_Type='CH' AND LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$EmployeeId." AND Apply_FromDate='".$N1."'", $con); $N2CHp=mysql_query("select ApplyLeaveId from hrm_employee_applyleave where Leave_Type='CH' AND LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$EmployeeId." AND Apply_FromDate='".$N2."'", $con); $N3CHp=mysql_query("select ApplyLeaveId from hrm_employee_applyleave where Leave_Type='CH' AND LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$EmployeeId." AND Apply_FromDate='".$N3."'", $con); $N4CHp=mysql_query("select ApplyLeaveId from hrm_employee_applyleave where Leave_Type='CH' AND LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$EmployeeId." AND Apply_FromDate='".$N4."'", $con); $N5CHp=mysql_query("select ApplyLeaveId from hrm_employee_applyleave where Leave_Type='CH' AND LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$EmployeeId." AND Apply_FromDate='".$N5."'", $con); 
  $rN1CHp=mysql_num_rows($N1CHp); $rN2CHp=mysql_num_rows($N2CHp); $rN3CHp=mysql_num_rows($N3CHp); $rN4CHp=mysql_num_rows($N4CHp); $rN5CHp=mysql_num_rows($N5CHp);
  $N1CLp1=mysql_query("select ApplyLeaveId from hrm_employee_applyleave where Leave_Type='CL' AND Apply_TotalDay=2 AND LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$EmployeeId." AND Apply_FromDate='".$N1."'", $con); $N1CLp2=mysql_query("select ApplyLeaveId from hrm_employee_applyleave where Leave_Type='CL' AND Apply_TotalDay=2 AND LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$EmployeeId." AND Apply_FromDate='".$N2."'", $con); $N1CLp3=mysql_query("select ApplyLeaveId from hrm_employee_applyleave where Leave_Type='CL' AND Apply_TotalDay=2 AND LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$EmployeeId." AND Apply_FromDate='".$N3."'", $con); 
  $rN1CLp1=mysql_num_rows($N1CLp1); $rN1CLp2=mysql_num_rows($N1CLp2); $rN1CLp3=mysql_num_rows($N1CLp3);
  
  $N1OTa=mysql_query("select AttId from hrm_employee_attendance where (AttValue='SL' OR AttValue='SH' OR AttValue='ASH' OR AttValue='PL' OR AttValue='APH' OR AttValue='EL' OR AttValue='FL' OR AttValue='TL') AND EmployeeID=".$EmployeeId." AND AttDate='".$N1."'", $con);
  $N2OTa=mysql_query("select AttId from hrm_employee_attendance where (AttValue='SL' OR AttValue='SH' OR AttValue='ASH' OR AttValue='PL' OR AttValue='APH' OR AttValue='EL' OR AttValue='FL' OR AttValue='TL') AND EmployeeID=".$EmployeeId." AND AttDate='".$N2."'", $con); 
  $N3OTa=mysql_query("select AttId from hrm_employee_attendance where (AttValue='SL' OR AttValue='SH' OR AttValue='ASH' OR AttValue='PL' OR AttValue='APH' OR AttValue='EL' OR AttValue='FL' OR AttValue='TL') AND EmployeeID=".$EmployeeId." AND AttDate='".$N3."'", $con); 
  $N4OTa=mysql_query("select AttId from hrm_employee_attendance where (AttValue='SL' OR AttValue='SH' OR AttValue='ASH' OR AttValue='PL' OR AttValue='APH' OR AttValue='EL' OR AttValue='FL' OR AttValue='TL') AND EmployeeID=".$EmployeeId." AND AttDate='".$N4."'", $con); 
  $rN1OTa=mysql_num_rows($N1OTa); $rN2OTa=mysql_num_rows($N2OTa); $rN3OTa=mysql_num_rows($N3OTa); $rN4OTa=mysql_num_rows($N4OTa);
  $N1OTp=mysql_query("select ApplyLeaveId from hrm_employee_applyleave where (Leave_Type!='CL' AND Leave_Type!='CH') AND LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$EmployeeId." AND Apply_FromDate='".$N1."'", $con); $N2OTp=mysql_query("select ApplyLeaveId from hrm_employee_applyleave where (Leave_Type!='CL' AND Leave_Type!='CH') AND LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$EmployeeId." AND Apply_FromDate='".$N2."'", $con); $N3OTp=mysql_query("select ApplyLeaveId from hrm_employee_applyleave where (Leave_Type!='CL' AND Leave_Type!='CH') AND LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$EmployeeId." AND Apply_FromDate='".$N3."'", $con); $N4OTp=mysql_query("select ApplyLeaveId from hrm_employee_applyleave where (Leave_Type!='CL' AND Leave_Type!='CH') AND LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$EmployeeId." AND Apply_FromDate='".$N4."'", $con); 
  $rN1OTp=mysql_num_rows($N1OTp); $rN2OTp=mysql_num_rows($N2OTp); $rN3OTp=mysql_num_rows($N3OTp);  $rN4OTp=mysql_num_rows($N4OTp);   

$sqlH=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$EmployeeId." AND AttValue='HO' AND AttDate>='".$AppFromDate."' AND AttDate<='".$AppToDate."'", $con);
$sqlFD=mysql_query("select * from hrm_employee_applyleave where EmployeeID=".$EmployeeId." AND '".$AppFromDate."'>=Apply_FromDate AND '".$AppFromDate."'<=Apply_ToDate AND LeaveStatus!=3 AND LeaveStatus!=4", $con); $sqlTD=mysql_query("select * from hrm_employee_applyleave where EmployeeID=".$EmployeeId." AND '".$AppToDate."'>=Apply_FromDate AND '".$AppToDate."'<=Apply_ToDate AND LeaveStatus!=3 AND LeaveStatus!=4", $con); $rowH=mysql_num_rows($sqlH); $rowFD=mysql_num_rows($sqlFD); $rowTD=mysql_num_rows($sqlTD);

/* EL Combination Query Open*/
 $sqlp_a=mysql_query("select AttId from hrm_employee_attendance where (AttValue='SL' OR AttValue='SH' OR AttValue='ASH' OR AttValue='PL' OR AttValue='APH' OR AttValue='FL' OR AttValue='TL') AND EmployeeID=".$EmployeeId." AND AttDate='".$P1."'", $con); $rowp_a=mysql_num_rows($sqlp_a);
  $sqlp_a2=mysql_query("select AttId from hrm_employee_attendance where (AttValue='SL' OR AttValue='SH' OR AttValue='ASH' OR AttValue='PL' OR AttValue='APH' OR AttValue='FL' OR AttValue='TL') AND EmployeeID=".$EmployeeId." AND AttDate='".$P2."'", $con); $rowp_a2=mysql_num_rows($sqlp_a2);
  $sqlp_l=mysql_query("select ApplyLeaveId from hrm_employee_applyleave where (Leave_Type='SL' OR Leave_Type='SH' OR Leave_Type='PL' OR Leave_Type='FL' OR Leave_Type='TL') AND LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$EmployeeId." AND Apply_ToDate='".$P1."'", $con); $rowp_l=mysql_num_rows($sqlp_l);
  //$sqlp_l2=mysql_query("select ApplyLeaveId from hrm_employee_applyleave where (Leave_Type='SL' OR Leave_Type='SH' OR Leave_Type='PL' OR Leave_Type='FL' OR Leave_Type='TL') AND LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$EmployeeId." AND Apply_ToDate='".$P2."'", $con); $rowp_l2=mysql_num_rows($sqlp_l2);
  $sqln_a=mysql_query("select AttId from hrm_employee_attendance where (AttValue='SL' OR AttValue='SH' OR AttValue='ASH' OR AttValue='PL' OR AttValue='APH' OR AttValue='FL' OR AttValue='TL') AND EmployeeID=".$EmployeeId." AND AttDate='".$N1."'", $con); $rown_a=mysql_num_rows($sqln_a);
  $sqln_a2=mysql_query("select AttId from hrm_employee_attendance where (AttValue='SL' OR AttValue='SH' OR AttValue='ASH' OR AttValue='PL' OR AttValue='APH' OR AttValue='FL' OR AttValue='TL') AND EmployeeID=".$EmployeeId." AND AttDate='".$N2."'", $con); $rown_a2=mysql_num_rows($sqln_a2);
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

/* FL with PL Combination Check*/
$P1PLa=mysql_query("select AttId from hrm_employee_attendance where (AttValue='PL' OR AttValue='FL') AND EmployeeID=".$EmployeeId." AND AttDate='".$P1."'", $con); $rP1PLa=mysql_num_rows($P1PLa);
$P2PLa=mysql_query("select AttId from hrm_employee_attendance where (AttValue='PL' OR AttValue='FL') AND EmployeeID=".$EmployeeId." AND AttDate='".$P2."'", $con); $rP2PLa=mysql_num_rows($P2PLa);
$P3PLa=mysql_query("select AttId from hrm_employee_attendance where (AttValue='PL' OR AttValue='FL') AND EmployeeID=".$EmployeeId." AND AttDate='".$P3."'", $con); $rP3PLa=mysql_num_rows($P3PLa);
$P4PLa=mysql_query("select AttId from hrm_employee_attendance where (AttValue='PL' OR AttValue='FL') AND EmployeeID=".$EmployeeId." AND AttDate='".$P4."'", $con); $rP4PLa=mysql_num_rows($P4PLa);

$P1PLp=mysql_query("select ApplyLeaveId from hrm_employee_applyleave where (Leave_Type='PL' OR Leave_Type='FL') AND LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$EmployeeId." AND '".$P1."'>=Apply_FromDate AND '".$P1."'<=Apply_ToDate", $con); $rP1PLp=mysql_num_rows($P1PLp);
$P2PLp=mysql_query("select ApplyLeaveId from hrm_employee_applyleave where (Leave_Type='PL' OR Leave_Type='FL') AND LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$EmployeeId." AND '".$P2."'>=Apply_FromDate AND '".$P2."'<=Apply_ToDate", $con); $rP2PLp=mysql_num_rows($P2PLp);
$P3PLp=mysql_query("select ApplyLeaveId from hrm_employee_applyleave where (Leave_Type='PL' OR Leave_Type='FL') AND LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$EmployeeId." AND '".$P3."'>=Apply_FromDate AND '".$P3."'<=Apply_ToDate", $con); $rP3PLp=mysql_num_rows($P3PLp);

$P4PLp=mysql_query("select ApplyLeaveId from hrm_employee_applyleave where (Leave_Type='PL' OR Leave_Type='FL') AND LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$EmployeeId." AND '".$P4."'>=Apply_FromDate AND '".$P4."'<=Apply_ToDate", $con); $rP4PLp=mysql_num_rows($P4PLp);

  
$N1PLa=mysql_query("select AttId from hrm_employee_attendance where (AttValue='PL' OR AttValue='FL') AND EmployeeID=".$EmployeeId." AND AttDate='".$N1."'", $con); $rN1PLa=mysql_num_rows($N1PLa);
$N2PLa=mysql_query("select AttId from hrm_employee_attendance where (AttValue='PL' OR AttValue='FL') AND EmployeeID=".$EmployeeId." AND AttDate='".$N2."'", $con); $rN2PLa=mysql_num_rows($N2PLa);
$N3PLa=mysql_query("select AttId from hrm_employee_attendance where (AttValue='PL' OR AttValue='FL') AND EmployeeID=".$EmployeeId." AND AttDate='".$N3."'", $con); $rN3PLa=mysql_num_rows($N3PLa);
$N4PLa=mysql_query("select AttId from hrm_employee_attendance where (AttValue='PL' OR AttValue='FL') AND EmployeeID=".$EmployeeId." AND AttDate='".$N4."'", $con); $rN4PLa=mysql_num_rows($N4PLa);

$N1PLp=mysql_query("select ApplyLeaveId from hrm_employee_applyleave where (Leave_Type='PL' OR Leave_Type='FL') AND LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$EmployeeId." AND '".$N1."'>=Apply_FromDate AND '".$N1."'<=Apply_ToDate", $con); $rN1PLp=mysql_num_rows($N1PLp);
$N2PLp=mysql_query("select ApplyLeaveId from hrm_employee_applyleave where (Leave_Type='PL' OR Leave_Type='FL') AND LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$EmployeeId." AND '".$N2."'>=Apply_FromDate AND '".$N2."'<=Apply_ToDate", $con); $rN2PLp=mysql_num_rows($N2PLp);
$N3PLp=mysql_query("select ApplyLeaveId from hrm_employee_applyleave where (Leave_Type='PL' OR Leave_Type='FL') AND LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$EmployeeId." AND '".$N3."'>=Apply_FromDate AND '".$N3."'<=Apply_ToDate", $con); $rN3PLp=mysql_num_rows($N3PLp);
$N4PLp=mysql_query("select ApplyLeaveId from hrm_employee_applyleave where (Leave_Type='PL' OR Leave_Type='FL') AND LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$EmployeeId." AND '".$N4."'>=Apply_FromDate AND '".$N4."'<=Apply_ToDate", $con); $rN4PLp=mysql_num_rows($N4PLp);

/* FL with PL Combination Check Close */  
   
$Ctime = date("H:i:s");
$FFDate=date("Y-m-d ".$Ctime,strtotime($_POST['FromDate'])); $TodayDate=date("Y-m-d 09:30:00");

if($AppFromDate==date("Y-m-d") && $FFDate>$TodayDate && $_POST['LeaveType']!='SH' && $_POST['LeaveType']!='SL' && $_POST['LeaveType']!='CH' && $_POST['LeaveType']!='HF'){ $msg='You can apply only before 9:30 AM'; }   

elseif($AppFromDate<date("Y-m-d") AND $AppFromMonth!=$_POST['Month']){$msg='Error : Please check your apply date.!'; }
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

  $qTAppCL=mysql_query("select sum(Apply_TotalDay) as Total from hrm_employee_applyleave where (Leave_Type='CL' OR Leave_Type='CH') AND LeaveStatus!=4 AND LeaveStatus!=3 AND LeaveStatus!=2 AND EmployeeID=".$EmployeeId." AND Apply_FromDate>='".date("Y-01-01")."' AND Apply_ToDate<='".date("Y-12-31")."'",$con); $rTAppCL=mysql_fetch_assoc($qTAppCL); 
   
   $totalLV=0;
   if($rTAppCL['Total']!=''){$totalLV=$rTAppCL['Total'];}
   
   if($totalLV==0){ $finalBal=$_REQUEST['BalCL']; }
   elseif($totalLV>$_REQUEST['BalCL']){ $finalBal=0; }
   elseif($totalLV<=$_REQUEST['BalCL']){ $finalBal=$_REQUEST['BalCL']-$totalLV; }
   
   //$finalBal=$rTAppCL['Total']-$_POST['BalCL'];

  if($_POST['LeaveType']=='EL'){$TotDays=$totaldays;} else {$TotDays=$totaldays-$rowH;} 
  if($TotDays==0){$msg='Error : Please check your apply day.!'; }
  elseif(($_POST['LeaveType']=='CL' OR $_POST['LeaveType']=='CH') AND $TotDays>$_POST['BalCL']){ $msg='Error!.. Please check apply no of day CL.!'; }
  
  elseif(($LevType=='CL' OR $LevType=='CH') AND $TotDays>$finalBal)
   { $msg='Please check apply no of day CL'; }

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
  elseif($_POST['LeaveType']=='EL' AND $TotDays<3){ $msg='Error!.. EL can be taken minimum for 3 days.'; }                           // OR date("w",strtotime(date($N1)))==0 
  elseif($_POST['LeaveType']=='EL' AND $TotDays==3 AND (date("w",strtotime(date($FrDate)))==0 OR date("w",strtotime(date($ToDate)))==0)){ $msg='Error!.. EL can`t combined any holiday, sunday if apply total number of day leave is 3'; }
  /*
   elseif($_POST['LeaveType']=='FL' AND $_POST['OpHo']==0 AND $PNum1!=7 AND $rP1PLa==0 AND $rP1PLp==0 AND $NNum1!=7 AND $rN1PLa==0 AND $rN1PLp==0)
  { $msg='1Error!.. FL combined only with prefix or suffix from PL'; }
  elseif($_POST['LeaveType']=='FL' AND $_POST['OpHo']==0 AND ((($PNum1==7 OR $rP1HOa>0) AND $rP2PLa==0 AND $rP2PLp==0) AND (($NNum1==7 OR $rN1HOa>0) AND $rN2PLa==0 AND $rN2PLp==0))){ $msg='2Error!.. FL combined only with prefix or suffix from PL'; }
  elseif($_POST['LeaveType']=='FL' AND $_POST['OpHo']==0 AND ((($PNum1==7 OR $rP1HOa>0) AND ($PNum2==7 OR $rP2HOa>0) AND $rP3PLa==0 AND $rP3PLp==0) OR (($NNum1==7 OR $rN1HOa>0) AND ($NNum2==7 OR $rN2HOa>0) AND $rN3PLa==0 AND $rN3PLp==0))){ $msg='3Error!.. FL combined only with prefix or suffix from PL'; }
  */
  
  elseif($_POST['LeaveType']=='FL' AND $_POST['OpHo']==0 AND $rP1PLa==0 AND $rP2PLa==0 AND $rP3PLa==0 AND $rP4PLa==0 AND $rP1PLp==0 AND $rP2PLp==0 AND $rP3PLp==0 AND $rP4PLp==0 AND $rN1PLa==0 AND $rN2PLa==0 AND $rN3PLa==0 AND $rN4PLa==0 AND $rN1PLp==0 AND $rN2PLp==0 AND $rN3PLp==0 AND $rN4PLp==0)
  { $msg='Error!.. FL combined only with prefix or suffix from PL'; }
  
  else
  { 
    $TotsSL=$TotDays+$_POST['AavailSL'];
    if(($_POST['LeaveType']=='SL' OR $_POST['LeaveType']=='SH') AND $TotsSL>10){$SLHodApp='Y';}else{$SLHodApp='N';}
   
   $search =  '*"#$%@~/\':'; $search = str_split($search); $Reason=str_replace($search, "", $_POST['Reason']);
   
   //if($EmployeeId==541 OR $EmployeeId==169){ echo "INSERT INTO hrm_employee_applyleave(EmployeeID,Apply_Date,Leave_Type,Apply_FromDate,Apply_ToDate,Apply_TotalDay,Apply_Reason,Apply_ContactNo,Apply_DuringAddress,Apply_SentToApp,Apply_SentToRev,Apply_SentToHOD,SLHodApp) VALUES(".$EmployeeId.",'".date('Y-m-d')."','".$_POST['LeaveType']."','".$AppFromDate."','".$AppToDate."','".$TotDays."','".$_POST['Reason']."',".$_POST['ContactNo'].",'".$_POST['DuAdd']."',".$_POST['AppId'].",".$_POST['RevId'].",".$_POST['HodId'].",'".$SLHodApp."')"; }
   $result=mysql_query("INSERT INTO hrm_employee_applyleave(EmployeeID,Apply_Date,Leave_Type,Apply_FromDate,Apply_ToDate,Apply_TotalDay,Apply_Reason,Apply_ContactNo,Apply_DuringAddress,Apply_SentToApp,Apply_SentToRev,Apply_SentToHOD,SLHodApp) VALUES(".$EmployeeId.",'".date('Y-m-d')."','".$_POST['LeaveType']."','".$AppFromDate."','".$AppToDate."','".$TotDays."','".$Reason."',".$_POST['ContactNo'].",'".$_POST['DuAdd']."',".$_POST['AppId'].",".$_POST['RevId'].",".$_POST['HodId'].",'".$SLHodApp."')", $con);
    if($result) 
    {  
     if(($_POST['EmailRep']!='' AND $_POST['LeaveType']!='SL') OR ($_POST['EmailRep']!='' AND $_POST['LeaveType']=='SL' AND $TotsSL<=10))
     {
      //$email_to = $_POST['EmailRep'];
      //$email_from='admin@vnrseeds.co.in';
      $email_subject = "Leave Application";
      //$email_txt = "Leave Application"; 
      //$headers = "From: $email_from ". "\r\n";
      $email_message .=$_POST['Ename']." has submitted leave application for ".$_POST['LeaveType']." from ".$_POST['FromDate']." to ".$_POST['ToDate'].", for your approval kindly log on to ESS <a href='https://www.vnrseeds.co.in'>www.vnrseeds.co.in</a> to approve.\n\n";
	  //$ok = @mail($email_to, $email_subject, $email_message, $headers);
	  
	  $subject=$email_subject;
      $body=$email_message;
      $email_to=$_POST['EmailRep'];
      require 'vendor/mail_admin.php';
	  
     }
	 if($_POST['LeaveType']=='SL' AND $TotsSL>10 AND $_POST['EmailHod']!='')
     {
      //$email_toa = $_POST['EmailHod'];
      //$email_froma='admin@vnrseeds.co.in';
      $email_subjecta = "Leave Application: Approval for SL for critical illness/long sickness";
      //$email_txta = "Leave Application: Approval for SL for critical illness/long sickness"; 
      //$headersa = "From: ".$email_froma."\r\n";
      $email_messagea .=$_POST['Ename']." has applied SL from ".$_POST['FromDate']." to ".$_POST['ToDate']." for critical illness/long sickness. for your approval kindly log on to ESS <a href='https://www.vnrseeds.co.in'>www.vnrseeds.co.in</a> to approve.\n\n";
	  //$ok = @mail($email_toa, $email_subjecta, $email_messagea, $headersa);
	  
	  $subject=$email_subjecta;
      $body=$email_messagea;
      $email_to=$_POST['EmailHod'];
      require 'vendor/mail_admin.php';
	  
	  //$email2_toa = 'vspl.attendance@gmail.com';  //vspl.hr@vnrseeds.com
      //$email2_froma='admin@vnrseeds.co.in';
      $email2_subjecta = "Leave Application: Approval for SL for critical illness/long sickness";
      //$email2_txta = "Leave Application: Approval for SL for critical illness/long sickness"; 
      //$headersa2 = "From: ".$email_froma."\r\n";
      $email2_messagea .=$_POST['Ename']." has applied SL from ".$_POST['FromDate']." to ".$_POST['ToDate']." for critical illness/long sickness. for your approval kindly log on to ESS <a href='https://www.vnrseeds.co.in'>www.vnrseeds.co.in</a> to approve.\n\n";
	  //$ok = @mail($email2_toa, $email2_subjecta, $email2_messagea, $headersa2);
	  
	  $subject=$email2_subjecta;
      $body=$email2_messagea;
      $email_to='vspl.attendance@gmail.com';
      require 'vendor/mail_admin.php';
	  
     }   
	 
   //********************************************************************// 
    $sqlDept=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$DepartmentId, $con); $resDept=mysql_fetch_assoc($sqlDept);
    //$email_to = 'vspl.attendance@gmail.com'; //vspl.hr@vnrseeds.com
    //$email_from='admin@vnrseeds.co.in';
	$email_subject = "Leave Application";
    //$email_txt = "Leave Application";
    //$headers = "From: ".$email_from."\r\n";
    //$headers = "From: $email_from ". "\r\n";
    $email_message4 .=$_POST['Ename']." (".$resDept['DepartmentCode'].") has submitted leave application for ".$_POST['LeaveType']." from ".$_POST['FromDate']." to ".$_POST['ToDate'].", for your approval kindly log on to ESS <a href='https://www.vnrseeds.co.in'>www.vnrseeds.co.in</a> to approve\n\n";
    //$ok = @mail($email_to, $email_subject, $email_message4, $headers);
    
      $subject=$email_subject;
      $body=$email_message4;
      $email_to='vspl.attendance@gmail.com';
      require 'vendor/mail_admin.php';
    
	//********************************************************************// 
    if($DepartmentId==2)
    {
     //$email_to = 'dsmanta11@gmail.com'; //seshi.reddy@vnrseeds.com:to- 26-09-2017
     //$email_from='admin@vnrseeds.co.in';
     $email_subject = "Leave Application";
     //$email_txt = "Leave Application";
     //$headers = "From: $email_from ". "\r\n";
     $email_message5 .=$_POST['Ename']." has submitted leave application for ".$_POST['LeaveType']." from ".$_POST['FromDate']." to ".$_POST['ToDate'].".\n\n";
     //$ok = @mail($email_to, $email_subject, $email_message5, $headers);
     
      $subject=$email_subject;
      $body=$email_message5;
      $email_to='dsmanta11@gmail.com';
      require 'vendor/mail_admin.php';
     
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
    //$email_to = 'vspl.attendance@gmail.com'; //vspl.hr@vnrseeds.com
    //$email_from='admin@vnrseeds.co.in';
    $email_subject = "Delete Leave Application";
    //$email_txt = "Delete Leave Application";
    //$headers = "From: $email_from ". "\r\n";
    $email_message .=$emp." has deleted leave application for ".$_REQUEST['l'].", from ".$_REQUEST['f']." to ".$_REQUEST['t'].". \n\n";
    //$ok = @mail($email_to, $email_subject, $email_message, $headers);
    
      $subject=$email_subject;
      $body=$email_message;
      $email_to='vspl.attendance@gmail.com';
      require 'vendor/mail_admin.php';
    
  }
}

?>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php include_once('../Title.php'); ?></title>

<!---->
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
{ 
 if(v=='FL')
 { 
  document.getElementById("OpHTD1").style.display='block';document.getElementById("OpHTD2").style.display='block';
  document.getElementById("FD").value=document.getElementById("FromDate").value; 
  document.getElementById("TD").value=document.getElementById("ToDate").value;
  document.getElementById("f_btn1").disabled=false; document.getElementById("f_btn2").disabled=false; 
 }
 else 
 { 
  document.getElementById("OpHTD1").style.display='none'; document.getElementById("OpHTD2").style.display='none';
  document.getElementById("OpHo").value=0;
  if(document.getElementById("FD").value!='' && document.getElementById("TD").value!='')
  {
   document.getElementById("FromDate").value=document.getElementById("FD").value; 
   document.getElementById("ToDate").value=document.getElementById("TD").value;}
   document.getElementById("f_btn1").disabled=false; document.getElementById("f_btn2").disabled=false;
  }
  var fromD=document.getElementById("FromDate").value; var toD=document.getElementById("ToDate").value;
  var EmpId=document.getElementById("EmpId").value; var ContNo=document.getElementById("ContactNo").value;
  if(ContNo.length>=9)
  {
   var url = 'CheckEmpHoliD.php'; var pars = 'FromD='+fromD+'&ToD='+toD+'&EmpId='+EmpId;	
   var myAjax = new Ajax.Request( url, { method: 'post', parameters: pars, onComplete: show_EmpHoliD }); 
  }
}
function show_EmpHoliD(originalRequest)
{ document.getElementById('SpanHoliCheck').innerHTML = originalRequest.responseText; }

function CheckOpHoId(v)
{ 
 if(v!=0)
 {
  document.getElementById("f_btn1").disabled=true; document.getElementById("f_btn2").disabled=true;
  var url = 'CheckEmpHoliDate.php';	var pars = 'Action=CheckDate&v='+v;	var myAjax = new Ajax.Request(
  url, { method: 'post', parameters: pars, onComplete: show_EmpHoliDate }); 
 }
 else
 {
  document.getElementById("FromDate").value=document.getElementById("FD").value; 
  document.getElementById("ToDate").value=document.getElementById("TD").value;
  document.getElementById("OpHoDate").value='00-00-0000';
  document.getElementById("f_btn1").disabled=false; document.getElementById("f_btn2").disabled=false;
 }
}
function show_EmpHoliDate(originalRequest)
{ 
 document.getElementById('SpanOpHoDate').innerHTML = originalRequest.responseText; 
 document.getElementById("FromDate").value=document.getElementById("OpHoDate").value;
 document.getElementById("ToDate").value=document.getElementById("OpHoDate").value;
 CheckHoliD();
}


function CheckHoliD()
{ 
 var fromD=document.getElementById("FromDate").value; var toD=document.getElementById("ToDate").value; 
 var EmpId=document.getElementById("EmpId").value; var ContNo=document.getElementById("ContactNo").value;
  if(ContNo.length>=9)
  {
   var url = 'CheckEmpHoliD.php'; var pars = 'FromD='+fromD+'&ToD='+toD+'&EmpId='+EmpId;	
   var myAjax = new Ajax.Request( url, { method: 'post', parameters: pars, onComplete: show_EmpHoliD }); 
  }
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
  //if(LeaveType=='FL' && OpHo==0){alert('Please select festival leave');  return false;}
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
  
  /**************************************************/
  var today = new Date();   
  var y = today.getFullYear(); var m=(today.getMonth()+1);  var d=today.getDate();
  var hr = today.getHours(); var mn = today.getMinutes(); var sec=today.getSeconds();
  
  
  var aDDate =  new Date(year+'-'+month+'-'+day);  
  var cDDate = new Date(y+'-'+m+'-'+d);
  
  var aDate =  new Date(year+'-'+month+'-'+day+' '+hr+':'+mn+':'+sec);  
  var cDate = new Date(y+'-'+m+'-'+d+' 09:30:00'); 
  
  var ApplyDate = aDate.getTime();   var CurrDate = cDate.getTime();
  var Apply2Date = aDDate.getTime();   var Curr2Date = cDDate.getTime(); 
  
  //alert(ApplyDate+"-"+CurrDate); return false; 
  
  var OnlyDate=new Date(m+'/'+d+'/'+y); 
  var OnlyDateTime = OnlyDate.getTime();
  
  
  if(Timed1==OnlyDateTime && ApplyDate>CurrDate && LeaveType!='SL' && LeaveType!='SH' && LeaveType!='CH' && LeaveType!='HF'){ alert("You can apply only before 9:30 AM."); return false; } 
  
  if(Curr2Date>Apply2Date && LeaveType!='SL' && LeaveType!='SH'){ alert("You can apply only current or future leave."); return false; } 
  
  var Todate=new Date(dateTemp2); var TodateTime=Todate.getTime();
  if((LeaveType=='SL' || LeaveType=='SH') && TodateTime>OnlyDateTime){ alert ("SL, can be apply between leave day or last day of leave"); return false; }
  /**************************************************/


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
	var AavailSL=parseFloat(document.getElementById("AavailSL").value); var TotsSL=ActualDays+AavailSL;
    if(TotsSL>10){ alert('You have exceeded the SL balance of 10. As per policy you can avail further SL only for critical sickness, special approval shall be required for using further SL balance.'); return true; }
  }
  if(LeaveType=='SH')
  { if(New_date1==NextDate){ if(LastAppL=='CL' || LastAppL=='CH') { alert("Error!.. Half Day of SL can't be combined with CL."); return false; }}
    var AavailSL=parseFloat(document.getElementById("AavailSL").value); var TotsSL=ActualDays+AavailSL;
    if(TotsSL>10){ alert('You have exceeded the SL balance of 10. As per policy, special approval shall be required for using further SL balance.'); return true; }
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
{ 
 for(var i=1; i<=12; i++)
 {
  if(i==v){ document.getElementById("DT"+i).style.display='block'; }
  else { document.getElementById("DT"+i).style.display='none'; }
 }
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
    <tr><td valign="top"><?php if($_SESSION['login'] = true){ require_once("EWelcome.php"); } ?></td></tr>
	<tr><td>&nbsp;</td></tr>
	<tr>
	 <td valign="top">
	  <table border="0" style="width:100%;height:300px;float:none;" cellpadding="0">
      <tr>
       <td valign="top" style="width:650px;"> 
<?php //********************************************************************************************* ?>	
<?php //********************************************************************************************* ?>	   
<table border="0" id="Activity">
 <tr>
  <td id="Anni" valign="top">
   <table border="0">
    <tr height="20"><td align="left" valign="top" width="150"><?php include("EmpImgEmp.php"); ?></tr>
</table>
  </td>

<form name="AskQform" method="post" onSubmit="return validate(this)"/>

				 <td style="width:525px;" valign="top">

<?php $CFromDate=date("Y").'-01-01'; $CToDate=date("Y").'-12-31'; 
      
$sqlCheck=mysql_query("select * from hrm_employee_applyleave where EmployeeID=".$EmployeeId." AND (Apply_Date>='".$CFromDate."' AND Apply_Date<='".$CToDate."') order by Apply_Date DESC", $con); $rowCheck=mysql_num_rows($sqlCheck); 

$sqlPL=mysql_query("select * from hrm_employee_applyleave where Leave_Type='PL' AND LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$EmployeeId." AND (Apply_Date>='".$CFromDate."' AND Apply_Date<='".$CToDate."')", $con);
$sqlEL=mysql_query("select * from hrm_employee_applyleave where Leave_Type='EL' AND LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$EmployeeId." AND (Apply_Date>='".$CFromDate."' AND Apply_Date<='".$CToDate."')", $con);
$rowPL=mysql_num_rows($sqlPL);  $rowEL=mysql_num_rows($sqlEL); 

$sqlSumCL=mysql_query("select SUM(Apply_TotalDay) as SumCL from hrm_employee_applyleave where LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$EmployeeId." AND (Apply_Date>='".$CFromDate."' AND Apply_Date<='".$CToDate."') AND (Leave_Type='CL' OR Leave_Type='CH')", $con); $resSumCL=mysql_fetch_array($sqlSumCL); $SumCL=$resSumCL['SumCL'];
$sqlSumSL=mysql_query("select SUM(Apply_TotalDay) as SumSL from hrm_employee_applyleave where LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$EmployeeId." AND (Apply_Date>='".$CFromDate."' AND Apply_Date<='".$CToDate."') AND (Leave_Type='SL' OR Leave_Type='SH')", $con); $resSumSL=mysql_fetch_array($sqlSumSL); $SumSL=$resSumSL['SumSL'];
$sqlSumPL=mysql_query("select SUM(Apply_TotalDay) as SumPL from hrm_employee_applyleave where Leave_Type='PL' AND LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$EmployeeId." AND (Apply_Date>='".$CFromDate."' AND Apply_Date<='".$CToDate."')", $con); $resSumPL=mysql_fetch_array($sqlSumPL); $SumPL=$resSumPL['SumPL'];
$sqlSumEL=mysql_query("select SUM(Apply_TotalDay) as SumEL from hrm_employee_applyleave where Leave_Type='EL' AND LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$EmployeeId." AND (Apply_Date>='".$CFromDate."' AND Apply_Date<='".$CToDate."')", $con); $resSumEL=mysql_fetch_array($sqlSumEL); $SumEL=$resSumEL['SumEL'];
$sqlSumOL=mysql_query("select SUM(Apply_TotalDay) as SumOL from hrm_employee_applyleave where Leave_Type='FL' AND LeaveStatus!=4 AND LeaveStatus!=3 AND EmployeeID=".$EmployeeId." AND (Apply_Date>='".$CFromDate."' AND Apply_Date<='".$CToDate."')", $con); $resSumOL=mysql_fetch_array($sqlSumOL); $SumOL=$resSumOL['SumOL'];

$sqlASumCL=mysql_query("select SUM(Apply_TotalDay) as ASumCL from hrm_employee_applyleave where LeaveStatus!=4 AND LeaveStatus!=3 AND LeaveStatus!=2 AND EmployeeID=".$EmployeeId." AND (Apply_Date>='".$CFromDate."' AND Apply_Date<='".$CToDate."') AND (Leave_Type='CL' OR Leave_Type='CH')", $con); 
$resASumCL=mysql_fetch_array($sqlASumCL); $ASumCL=$resASumCL['ASumCL'];
$sqlASumSL=mysql_query("select SUM(Apply_TotalDay) as ASumSL from hrm_employee_applyleave where LeaveStatus!=4 AND LeaveStatus!=3 AND LeaveStatus!=2 AND EmployeeID=".$EmployeeId." AND (Apply_Date>='".$CFromDate."' AND Apply_Date<='".$CToDate."') AND (Leave_Type='SL' OR Leave_Type='SH')", $con); 
$resASumSL=mysql_fetch_array($sqlASumSL); $ASumSL=$resASumSL['ASumSL'];
$sqlASumPL=mysql_query("select SUM(Apply_TotalDay) as ASumPL from hrm_employee_applyleave where Leave_Type='PL' AND LeaveStatus!=4 AND LeaveStatus!=3 AND LeaveStatus!=2 AND EmployeeID=".$EmployeeId." AND (Apply_Date>='".$CFromDate."' AND Apply_Date<='".$CToDate."')", $con); $resASumPL=mysql_fetch_array($sqlASumPL); $ASumPL=$resASumPL['ASumPL'];
$sqlASumEL=mysql_query("select SUM(Apply_TotalDay) as ASumEL from hrm_employee_applyleave where Leave_Type='EL' AND LeaveStatus!=4 AND LeaveStatus!=3 AND LeaveStatus!=2 AND EmployeeID=".$EmployeeId." AND (Apply_Date>='".$CFromDate."' AND Apply_Date<='".$CToDate."')", $con); $resASumEL=mysql_fetch_array($sqlASumEL); $ASumEL=$resASumEL['ASumEL'];
$sqlASumOL=mysql_query("select SUM(Apply_TotalDay) as ASumOL from hrm_employee_applyleave where Leave_Type='FL' AND LeaveStatus!=4 AND LeaveStatus!=3 AND LeaveStatus!=2 AND EmployeeID=".$EmployeeId." AND (Apply_Date>='".$CFromDate."' AND Apply_Date<='".$CToDate."')", $con); $resASumOL=mysql_fetch_array($sqlASumOL); $ASumOL=$resASumOL['ASumOL'];

if(date("m")==12){ $TotN_CL=0; $TotN_SL=0; $TotN_PL=0; $TotN_EL=0; $TotN_OL=0; }
else 
{ 
  $NextMonth=date("m")+1; $Sdate=date("Y-".$NextMonth."-01"); $Y=date("Y");
  $sqlSNextCL=mysql_query("select count(AttValue) as SNextCL from hrm_employee_attendance where AttValue='CL' AND EmployeeID=".$EmployeeId." AND AttDate>='".$Sdate."' AND Year=".$Y, $con); 
  $resSNextCL=mysql_fetch_array($sqlSNextCL); $SumNextCL=$resSNextCL['SNextCL'];

  $sqlSNextCH=mysql_query("select count(AttValue) as SNextCH from hrm_employee_attendance where AttValue='CH' AND EmployeeID=".$EmployeeId." AND AttDate>='".$Sdate."' AND Year=".$Y, $con); 
  $resSNextCH=mysql_fetch_array($sqlSNextCH); $SumNextCH=$resSNextCH['SNextCH']/2;

  $sqlSNextSL=mysql_query("select count(AttValue) as SNextSL from hrm_employee_attendance where AttValue='SL' AND EmployeeID=".$EmployeeId." AND AttDate>='".$Sdate."' AND Year=".$Y, $con); 
  $resSNextSL=mysql_fetch_array($sqlSNextSL); $SumNextSL=$resSNextSL['SNextSL'];

  $sqlSNextSH=mysql_query("select count(AttValue) as SNextSH from hrm_employee_attendance where AttValue='SH' AND EmployeeID=".$EmployeeId." AND AttDate>='".$Sdate."' AND Year=".$Y, $con); 
  $resSNextSH=mysql_fetch_array($sqlSNextSH); $SumNextSH=$resSNextSH['SNextSH']/2;

  $sqlSNextPL=mysql_query("select count(AttValue) as SNextPL from hrm_employee_attendance where AttValue='PL' AND EmployeeID=".$EmployeeId." AND AttDate>='".$Sdate."' AND Year=".$Y, $con); 
  $resSNextPL=mysql_fetch_array($sqlSNextPL); $SumNextPL=$resSNextPL['SNextPL'];

  $sqlSNextEL=mysql_query("select count(AttValue) as SNextEL from hrm_employee_attendance where AttValue='EL' AND EmployeeID=".$EmployeeId." AND AttDate>='".$Sdate."' AND Year=".$Y, $con); 
  $resSNextEL=mysql_fetch_array($sqlSNextEL); $SumNextEL=$resSNextEL['SNextEL'];

  $sqlSNextOL=mysql_query("select count(AttValue) as SNextOL from hrm_employee_attendance where AttValue='FL' AND EmployeeID=".$EmployeeId." AND AttDate>='".$Sdate."' AND Year=".$Y, $con); 
  $resSNextOL=mysql_fetch_array($sqlSNextOL); $SumNextOL=$resSNextOL['SNextOL'];

  $TotN_CL=$SumNextCL+$SumNextCH; $TotN_SL=$SumNextSL+$SumNextSH; 
  $TotN_PL=$SumNextPL; $TotN_EL=$SumNextEL; $TotN_OL=$SumNextOL;
}

  $sMax = mysql_query("SELECT * FROM hrm_employee_applyleave where EmployeeID=".$EmployeeId."  AND LeaveStatus!=4 AND LeaveStatus!=3 AND (Apply_Date>='".$CFromDate."' AND Apply_Date<='".$CToDate."')", $con); $rMax=mysql_num_rows($sMax);
  $sqlMax = mysql_query("SELECT MAX(ApplyLeaveId) as MaxLeaveId FROM hrm_employee_applyleave where EmployeeID=".$EmployeeId." AND LeaveStatus!=4 AND LeaveStatus!=3 AND (Apply_Date>='".$CFromDate."' AND Apply_Date<='".$CToDate."')", $con); 
  if($rMax>0)
  { $resMax = mysql_fetch_assoc($sqlMax);$sqlLMax = mysql_query("SELECT * FROM hrm_employee_applyleave where ApplyLeaveId=".$resMax['MaxLeaveId'], $con); $resLMax = mysql_fetch_assoc($sqlLMax); } 

  $DayNext1=date("d-m-Y",strtotime($resLMax['Apply_ToDate'].'+1 day')); 
  $DayNext2=date("Y-m-d",strtotime($resLMax['Apply_ToDate'].'+1 day'));   
  $DayNext_2=date("Y-m-d",strtotime($resLMax['Apply_ToDate'].'+2 day')); 
  $DayNext_3=date("Y-m-d",strtotime($resLMax['Apply_ToDate'].'+3 day'));
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

<input type="hidden" id="NextDay" name="NextDay" value="<?php echo $DayNext1; ?>" />
<input type="hidden" id="NextDay2" name="NextDay2" value="<?php echo $DayNext2; ?>" />
<input type="hidden" id="NextDay_2" name="NextDay_2" value="<?php echo $DayNext_2; ?>" />
<input type="hidden" id="NextDay_3" name="NextDay_3" value="<?php echo $DayNext_3; ?>" />
<input type="hidden" id="NextDay_4" name="NextDay_4" value="<?php echo $DayNext_4; ?>" />

<input type="hidden" id="Year" name="Year" value="<?php echo date("Y"); ?>" />

<?php $sqlRep=mysql_query("select ReportingEmailId from hrm_employee_general where EmployeeID=".$EmployeeId, $con); 
      $resRep=mysql_fetch_assoc($sqlRep);
      $sqlHod=mysql_query("select EmailId_Vnr from hrm_employee_general g INNER JOIN hrm_employee_reporting r ON g.EmployeeID=r.HodId where r.EmployeeID=".$EmployeeId, $con); $resHod=mysql_fetch_assoc($sqlHod);
	  $sqlSelf=mysql_query("select EmailId_Vnr from hrm_employee_general where EmployeeID=".$EmployeeId, $con); 
	  $resSelf=mysql_fetch_assoc($sqlSelf);?>

<input type="hidden" name="EmailRep" value="<?php echo $resRep['ReportingEmailId']; ?>" />
<input type="hidden" name="EmailHod" value="<?php echo $resHod['EmailId_Vnr']; ?>" />
<input type="hidden" name="EmailSelf" value="<?php echo $resSelf['EmailId_Vnr']; ?>" />
<input type="hidden" name="Ename" value="<?php echo $M.' '.$Ename; ?>" />
<input type="hidden" name="EmpId" id="EmpId" value="<?php echo $EmployeeId; ?>" />

<?php $sqlApp=mysql_query("select * from hrm_employee_reporting where EmployeeID='".$EmployeeId."'", $con); 
      $resApp=mysql_fetch_assoc($sqlApp); $sqlERev=mysql_query("select EmailId_Vnr from hrm_employee_general where EmployeeID=".$resApp['ReviewerId'], $con); $resERev=mysql_fetch_assoc($sqlERev); ?>

<input type="hidden" name="AppId" id="AppId" value="<?php if($resApp['AppraiserId']==''){ echo '0'; } else {echo $resApp['AppraiserId'];} ?>" /><input type="hidden" name="RevId" id="RevId" value="<?php if($resApp['ReviewerId']==''){ echo '0'; } else {echo $resApp['ReviewerId'];} ?>" /><input type="hidden" name="EmailRev" value="<?php echo $resERev['EmailId_Vnr']; ?>" /><input type="hidden" name="HodId" id="HodId" value="<?php if($resApp['HodId']==''){ echo '0'; } else {echo $resApp['HodId'];} ?>" /> 

<?php $sqlL=mysql_query("select * from hrm_employee_monthlyleave_balance where EmployeeID=".$EmployeeId." AND Month='".date("m")."' AND Year='".date("Y")."'", $con); $resL=mysql_fetch_array($sqlL); ?>

<input type="hidden" name="BalCL" id="BalCL" value="<?php if($resL['BalanceCL']!=''){echo $resL['BalanceCL'];}else{echo 0;} ?>"/><input type="hidden" name="BalSL" id="BalSL" value="<?php if($resL['BalanceSL']!=''){echo $resL['BalanceSL'];}else{echo 0;} ?>" /><input type="hidden" name="BalPL" id="BalPL" value="<?php if($resL['BalancePL']!=''){echo $resL['BalancePL'];}else{echo 0;} ?>" /><input type="hidden" name="BalEL" id="BalEL" value="<?php if($resL['BalanceEL']!=''){echo $resL['BalanceEL'];}else{echo 0;} ?>" /><input type="hidden" name="BalOL" id="BalOL" value="<?php if($resL['BalanceOL']!=''){echo $resL['BalanceOL'];}else{echo 0;} ?>" />


<?php 
$sSL=mysql_query("select SUM(Apply_TotalDay) as aSL from hrm_employee_applyleave where LeaveStatus!=4 AND LeaveStatus!=3 AND LeaveStatus!=2 AND EmployeeID=".$EmployeeId." AND (Apply_Date>='".$CFromDate."' AND Apply_Date<='".$CToDate."') AND (Leave_Type='SL' OR Leave_Type='SH')", $con ); $resaSL=mysql_fetch_array($sSL); 
$saSL=mysql_query("select count(AttValue) as saSL from hrm_employee_attendance where AttValue='SL' AND EmployeeID=".$EmployeeId." AND (AttDate>='".$CFromDate."' AND AttDate<='".$CToDate."')", $con); $ressaSL=mysql_fetch_array($saSL); $saSH=mysql_query("select count(AttValue) as saSH from hrm_employee_attendance where AttValue='SH' AND EmployeeID=".$EmployeeId." AND (AttDate>='".$CFromDate."' AND AttDate<='".$CToDate."')", $con); $ressaSH=mysql_fetch_array($saSH);  

$t1aSL=$resaSL['aSL']; $t2aSL=$ressaSL['saSL']; $t3aSH=$ressaSH['saSH']/2; $TotaSL=$t1aSL+$t2aSL+$t3aSH;
echo '<input type="hidden" name="AavailSL" id="AavailSL" value="'.$TotaSL.'" />';
?>


 <table border="0">
  <tr><td colspan="5">&nbsp;<font color="#106809" style='font-family:Times New Roman;font-size:15px;'><b>Leave Application</b>&nbsp;&nbsp;&nbsp; <font color="#FF0000" style='font-family:Times New Roman;font-size:15px;'>
  <b id="span"><?php echo $msg; ?></b></font></td></tr>

  <tr><td height="5" colspan="5">&nbsp;</td></tr>
  <tr height="20">
   <td style='font-family:Times New Roman;font-size:14px;width:180px;color:#620000;'><b>Date From <b><font color="#FF0000" size="2">*</font></b> :</b></td>
   <td style='width:113px;'><input name="FromDate" id="FromDate" class="InputText" style="width:90px;text-align:center;height:22px;" readonly><button id="f_btn1" class="CalenderButton"></button><script type="text/javascript">  var cal = Calendar.setup({ onSelect:  function(cal) { cal.hide()}, showTime: true }); cal.manageFields("f_btn1", "FromDate", "%d-%m-%Y");</script></td>
   <td width="4">&nbsp;</td>   
   <td style='font-family:Times New Roman;font-size:14px;width:100px;color:#620000;'><b>Date To<b><font color="#FF0000" size="2">*</font></b> :</b></td>
   <td style='width:113px;'><input name="ToDate" id="ToDate" class="InputText" style="width:90px;text-align:center;height:22px;" readonly><button id="f_btn2" class="CalenderButton"></button>
<script type="text/javascript">  var cal = Calendar.setup({ onSelect:  function(cal) { cal.hide()}, showTime: true }); 
cal.manageFields("f_btn2", "ToDate", "%d-%m-%Y");</script></td>
  </tr>

  <tr height="20">
   <td style='font-family:Times New Roman;font-size:14px;width:180px;color:#620000;'><b>Contact No. <b><font color="#FF0000" size="2">*</font></b> :</b></td>
   <td style='width:113px;'><input name="ContactNo" id="ContactNo" class="InputText" style="width:112px;height:22px;" maxlength="12" onKeyDown="CheckHoliD()"></td>
   <td width="4">&nbsp;</td>
   <td style='font-family:Times New Roman;font-size:14px;width:100px;color:#620000;'><b>Leave Type<b><font color="#FF0000" size="2">*</font></b> :</b></td>
   <td style='width:113px;'><select name="LeaveType" id="LeaveType" class="InputText" style="width:112px;height:22px;" onChange="CheckHoliD2(this.value)"><option style="background-color:#009F9F;" value="0" selected>Select</option>
  <?php if($resL['BalanceCL']>=1){?><option value="CL">CL-(Casual)</option><?php }  ?>
  <?php if($resL['BalanceSL']>=1){?><option value="SL">SL-(Sick Leave)</option></option><?php } ?>
  <?php if($resL['BalancePL']>=1){?><option value="PL">PL-(Privilege)</option></option><?php } ?>
  <?php if($resL['BalanceEL']>=3){?><option value="EL">EL-(Earned)</option><?php } ?>
  <?php if($resL['BalanceOL']>=1){?><option value="FL">FL-(Festival Leave)</option><?php } ?>
  <option value="TL">TL-(Transfer Leave)</option>
  <?php if($resL['BalanceCL']>0){?><option value="CH">Half Day of CL</option><?php } ?>
  <?php if($resL['BalanceSL']>0){?><option value="SH">Half Day of SL</option><?php } ?> 
  <?php /* 
  <option value="CL">CL-(Casual)</option>
  <option value="SL">SL-(Sick Leave)</option></option>
  <option value="PL">PL-(Privilege)</option></option>
  <option value="EL">EL-(Earned)</option>
  <option value="FL">FL-(Festival Leave)</option>
  <option value="TL">TL-(Transfer Leave)</option>
  <option value="CH">Half Day of CL</option>
  <option value="SH">Half Day of SL</option>
  */ ?>
   </select>

   <input type="hidden" id="Month" name="Month" value="<?php echo date("m"); ?>" />
   <span id="SpanOpHoDate"><input type="hidden" name="OpHoDate" id="OpHoDate" value="" /></span>
   <input type="hidden" name="FD" id="FD" value="" /><input type="hidden" name="TD" id="TD" value="" /></td>
  </tr>

  <tr>
    <td style='font-family:Times New Roman;font-size:14px;width:180px;color:#620000;'><div id="OpHTD1" style="display:none;"><b>Festival Leave <b><font color="#FF0000" size="2">*</font></b> :</b></div></td>
    <td colspan="4" style='width:230px;'><div id="OpHTD2" style="display:none;"><select name="OpHo" id="OpHo" class="InputText" style="width:230px;" onChange="CheckOpHoId(this.value)"><option style="background-color:#009F9F;" value="0" selected>Select</option><?php $sqlOpH=mysql_query("select HoOpId,HoOpName,HoOpDate,HoOpDay from hrm_holiday_optional where Year='".date("Y")."' AND HoOpStatus!='De' AND CompanyId=".$CompanyId." order by HoOpDate ASC", $con); while($resOpH=mysql_fetch_assoc($sqlOpH)){ ?><option value="<?php echo $resOpH['HoOpId']; ?>"><?php echo $resOpH['HoOpName'].' - '.$resOpH['HoOpDay'].' - '.date("d M y",strtotime($resOpH['HoOpDate'])); ?></option><?php } ?></select></div></td>
   </tr>

   <tr>
    <td style='font-family:Times New Roman;font-size:14px;width:180px;'><font color="#620000"><b>Address During Leave <b><font color="#FF0000" size="2">*</font></b> :</b></td>
    <td colspan="4" valign="top"><input name="DuAdd" id="DuAdd" class="InputText" style="width:343px;height:22px;" maxlength="50"></td>   
   </tr>	

   <tr>
    <td style='font-family:Times New Roman;font-size:14px;width:180px;' valign="top"><font color="#620000"><b>Reason For Leave <b><font color="#FF0000" size="2">*</font></b> :</b><br>(Please ignore special characters.)</td>
<td colspan="4"><textarea name="Reason" id="Reason" cols="40" rows="5"></textarea></td>   
   </tr>		
  </table>
 </td>

 </tr>

 <tr>
  <td>&nbsp;</td>
  <td align="Right" class="fontButton" width="480">
   <table border="0" width="480">
   <tr>
       
<?php
$ExpMonthDate=date('Y-m-d', strtotime("-2 months", strtotime(date("Y-m-d")))); $pp=strtotime($ExpMonthDate);
$ExpMonth=date('m', strtotime("-2 months", strtotime(date("Y-m-d"))));
$ExpYear=date('Y', strtotime("-2 months", strtotime(date("Y-m-d"))));

$sqlChk2=mysql_query("select * from hrm_employee_attendance_".date("Y")." where EmployeeID=".$EmployeeId." AND AttDate>='".date("Y")."-01-01' AND AttDate<'".$ExpMonthDate."' AND AttValue!='P' AND AttValue!='WFH' AND AttValue!='A' AND AttValue!='OD' AND AttValue!='HO' AND AttValue!='HF' order by AttDate ASC", $con); $rowChk2=mysql_num_rows($sqlChk2); 
?>       
    <td style="font-family:Times New Roman; color:#FFFFFF; font-size:15px;width:300px;"><?php if($rowCheck>0 OR $rowChk2>0) { ?><a href="#" onClick="ShowAppLeave(<?php echo $EmployeeId; ?>)"><b style="color:#FFFFFF;">Previous Apply Leave Status</b></a><?php } ?></td>

<?php if(date("m")==1 OR date("m")==3 OR date("m")==5 OR date("m")==7 OR date("m")==8 OR date("m")==10 OR date("m")==12)
{$date=30; $date2=31;}elseif(date("m")==4 OR date("m")==6 OR date("m")==9 OR date("m")==11){$date=29; $date2=30;}
elseif(date("m")==2)
{
  if(date("Y")==2012 OR date("Y")==2016 OR date("Y")==2020 OR date("Y")==2024 OR date("Y")==2028 OR date("Y")==2032 OR date("Y")==2036 OR date("Y")==2040){$date=28; $date2=29;}else{$date=27; $date2=28; }
}
if(date("d")!=$date AND date("d")!=$date2){ ?>
    <td align="right"><input type="submit" name="AppLeave" id="AppLeave" style="width:90px;" value="Send"></td>
    <td align="right" style="width:70px;"><input type="button" name="Refresh" id="Refresh" style="width:90px;" value="Refresh" onClick="javascript:window.location='ApplyLeave.php'"/></td>
<?php  }  ?>
   </tr>
 </form>
  </table>
  </td>
</tr>
<?php if(date("d")==$date OR date("d")==$date2 OR date("Y-m-d")=='2017-09-29'){ ?>
<tr>
  <td></td>
  <td colspan="3" style="font-family:Times New Roman;color:#FF0000;font-size:18px;"><?php echo 'Please apply through mail, blocked for salary processing.!'; ?></td>
</tr>
<?php } ?>
</table>

<?php //********************************************************************************************* ?>	
<?php //********************************************************************************************* ?>
       </td>

		   	

    <td align="left" style="width:400px;" valign="top">
<?php /********************************* Leave Details ************************************/?>
<?php /********************************* Leave Details ************************************/?>	
<table border="0">
 <tr>
  <td>
   <table border="0">
    <tr>
	 <td style="width:100px; font-family:Times New Roman; font-size:14px;">Select Month:&nbsp;</td>
	 <td style="width:100px;">

<?php $mt=date("m"); ?>			

<select style="font-family:Times New Roman; font-size:14px; width:90px;" onChange="SelMonth(this.value)">
<?php if($mt==12){ ?><option value="12" <?php if($mt==12){echo 'selected';}?>>December</option><?php } ?>
<?php if($mt==11 OR $mt==12){ ?><option value="11" <?php if($mt==11){echo 'selected';}?>>November</option><?php } ?>
<?php if($mt==10 OR $mt==11 OR $mt==12){ ?><option value="10" <?php if($mt==10){echo 'selected';}?>>October</option><?php } ?>
<?php if($mt==9 OR $mt==10 OR $mt==11 OR $mt==12){ ?><option value="9" <?php if($mt==9){echo 'selected';}?>>September</option><?php } ?>
<?php if($mt==8 OR $mt==9 OR $mt==10 OR $mt==11 OR $mt==12){ ?><option value="8" <?php if($mt==8){echo 'selected';}?>>August</option><?php } ?>
<?php if($mt==7 OR $mt==8 OR $mt==9 OR $mt==10 OR $mt==11 OR $mt==12){ ?><option value="7" <?php if($mt==7){echo 'selected';}?>>July</option><?php } ?>
<?php if($mt==6 OR $mt==7 OR $mt==8 OR $mt==9 OR $mt==10 OR $mt==11 OR $mt==12){ ?><option value="6" <?php if($mt==6){echo 'selected';}?>>June</option><?php } ?>
<?php if($mt==5 OR $mt==6 OR $mt==7 OR $mt==8 OR $mt==9 OR $mt==10 OR $mt==11 OR $mt==12){ ?><option value="5" <?php if($mt==5){echo 'selected';}?>>May</option><?php } ?>
<?php if($mt==4 OR $mt==5 OR $mt==6 OR $mt==7 OR $mt==8 OR $mt==9 OR $mt==10 OR $mt==11 OR $mt==12){ ?><option value="4" <?php if($mt==4){echo 'selected';}?>>April</option><?php } ?>
<?php if($mt==3 OR $mt==4 OR $mt==5 OR $mt==6 OR $mt==7 OR $mt==8 OR $mt==9 OR $mt==10 OR $mt==11 OR $mt==12){ ?><option value="3" <?php if($mt==3){echo 'selected';}?>>March</option><?php } ?>
<?php if($mt==2 OR $mt==3 OR $mt==4 OR $mt==5 OR $mt==6 OR $mt==7 OR $mt==8 OR $mt==9 OR $mt==10 OR $mt==11 OR $mt==12){ ?><option value="2" <?php if($mt==2){echo 'selected';}?>>February</option><?php } ?>
<?php if($mt==1 OR $mt==2 OR $mt==3 OR $mt==4 OR $mt==5 OR $mt==6 OR $mt==7 OR $mt==8 OR $mt==9 OR $mt==10 OR $mt==11 OR $mt==12){ ?><option value="1" <?php if($mt==1){echo 'selected';}?>>January</option><?php } ?>
</select>
	 </td>
     <td style="width:200px;font-family:Times New Roman;" align="center">
     &nbsp;<a href="#" onClick="HelpDocleave()"><font color="#000099" size="3" ><b>Leave Rules</b></font></font></a>
     &nbsp;&nbsp;&nbsp;<a href="#" onClick="LeaveHelpDoc()"><font color="#000099" size="3"><b>Help Doc</b></font></font></a>
     </td>
	</tr>
   </table>
  </td>
 </tr>

<?php $sqlL=mysql_query("select * from hrm_employee_monthlyleave_balance where EmployeeID=".$EmployeeId." AND Month='".date("m")."' AND Year='".date("Y")."'", $con); $resL=mysql_fetch_array($sqlL); ?> 
 <tr> 

<?php //************ Start Start Start *************************** ?>
<?php //************ Start Start Start *************************** ?>		    

<?php /************************** Leave Balance Open ***********************************/ ?>
<?php /************************** Leave Balance Open ***********************************/ ?>
<?php for($i=1; $i<=12; $i++){ ?>

<?php $sqlLv=mysql_query("select * from hrm_employee_monthlyleave_balance where EmployeeID=".$EmployeeId." AND Month=".$i." AND Year='".date("Y")."'", $con); $resLv=mysql_fetch_array($sqlLv); 


if($i==1){$j='02'; $Y=date("Y");}elseif($i==2){$j='03'; $Y=date("Y");}elseif($i==3){$j='04'; $Y=date("Y");}elseif($i==4){$j='05'; $Y=date("Y");}elseif($i==5){$j='06'; $Y=date("Y");}elseif($i==6){$j='07'; $Y=date("Y");}elseif($i==7){$j='08'; $Y=date("Y");}elseif($i==8){$j='09'; $Y=date("Y");}elseif($i==9){$j='10'; $Y=date("Y");}elseif($i==10){$j='11'; $Y=date("Y");}elseif($i==11){$j='12'; $Y=date("Y");}elseif($i==12){$j='01'; $Y=date("Y")+1;}

$NextMonth=$j; $Sdate=date($Y."-".$NextMonth."-01");  


$sqlSNextCL=mysql_query("select count(AttValue) as SNextCL from hrm_employee_attendance where AttValue='CL' AND EmployeeID=".$EmployeeId." AND AttDate>='".$Sdate."' AND Year=".$Y, $con); $resSNextCL=mysql_fetch_array($sqlSNextCL);
$sqlSNextCH=mysql_query("select count(AttValue) as SNextCH from hrm_employee_attendance where (AttValue='CH' OR AttValue='ACH') AND EmployeeID=".$EmployeeId." AND AttDate>='".$Sdate."' AND Year=".$Y, $con); $resSNextCH=mysql_fetch_array($sqlSNextCH); 
$sqlSNextSL=mysql_query("select count(AttValue) as SNextSL from hrm_employee_attendance where AttValue='SL' AND EmployeeID=".$EmployeeId." AND AttDate>='".$Sdate."' AND Year=".$Y, $con); $resSNextSL=mysql_fetch_array($sqlSNextSL);
$sqlSNextSH=mysql_query("select count(AttValue) as SNextSH from hrm_employee_attendance where (AttValue='SH' OR AttValue='ASH') AND EmployeeID=".$EmployeeId." AND AttDate>='".$Sdate."' AND Year=".$Y, $con); $resSNextSH=mysql_fetch_array($sqlSNextSH); 
$sqlSNextPL=mysql_query("select count(AttValue) as SNextPL from hrm_employee_attendance where AttValue='PL' AND EmployeeID=".$EmployeeId." AND AttDate>='".$Sdate."' AND Year=".$Y, $con); $resSNextPL=mysql_fetch_array($sqlSNextPL); 
$sqlSNextEL=mysql_query("select count(AttValue) as SNextEL from hrm_employee_attendance where AttValue='EL' AND EmployeeID=".$EmployeeId." AND AttDate>='".$Sdate."' AND Year=".$Y, $con); $resSNextEL=mysql_fetch_array($sqlSNextEL); 
$sqlSNextOL=mysql_query("select count(AttValue) as SNextOL from hrm_employee_attendance where AttValue='FL' AND EmployeeID=".$EmployeeId." AND AttDate>='".$Sdate."' AND Year=".$Y, $con); $resSNextOL=mysql_fetch_array($sqlSNextOL);

$SumNextCL=$resSNextCL['SNextCL']; $SumNextCH=$resSNextCH['SNextCH']/2; $SumNextSL=$resSNextSL['SNextSL'];
$SumNextSH=$resSNextSH['SNextSH']/2; $SumNextPL=$resSNextPL['SNextPL']; $SumNextEL=$resSNextEL['SNextEL'];
$SumNextOL=$resSNextOL['SNextOL']; $TotN_CL=$SumNextCL+$SumNextCH; $TotN_SL=$SumNextSL+$SumNextSH; 
$TotN_PL=$SumNextPL; $TotN_EL=$SumNextEL; $TotN_OL=$SumNextOL;  
?>   

<td id="DT<?=$i;?>" style="display:<?php if(date("m")==$i){echo 'block';}else{echo 'none';}?>;width:520px;" valign="top">

 <table style="width:<?php if($TotN_CL>0 OR $TotN_SL>0 OR $TotN_PL>0 OR $TotN_EL>0 OR $TotN_OL>0){ echo '520px'; }else{ echo '400px';}?>;" border="1" bgcolor="#FFFFFF" cellspacing="1">

  <tr bgcolor="#7a6189">
   <td colspan="<?php if($i==1){echo 7;}else{echo 4;}?>" bgcolor="#0080FF" align="center" style="font-family:Times New Roman;color:#FFFFFF;font-size:15px;height:25px;width:<?php if($i==1){echo 400;}else{echo 360;}?>px;">
  <?php if($i==1){$SeM='January';}elseif($i==2){$SeM='February';}elseif($i==3){$SeM='March';}elseif($i==4){$SeM='April';}elseif($i==5){$SeM='May';}elseif($i==6){$SeM='June';}elseif($i==7){$SeM='July';}elseif($i==8){$SeM='August';}elseif($i==9){$SeM='September';}elseif($i==10){$SeM='October';}elseif($i==11){$SeM='November';}elseif($i==12){$SeM='December';} ?>
   <b><blink>My Leave </blink>(Month - <font color="#FFFF00"><?php echo $SeM; ?></font>)</b></td>

   <?php if($TotN_CL>0 OR $TotN_SL>0 OR $TotN_PL>0 OR $TotN_EL>0 OR $TotN_OL>0){ ?>
   <td colspan="2" bgcolor="#0080FF" align="center" style="font-family:Times New Roman; color:#FFFFFF; font-size:15px; height:25px; width:<?php if($i==1){echo 120;}else{echo 180;}?>px;"><b>Future Leave</b></td><?php } ?>
  </tr>
  <?php if($i==1){$ww=60;}else{$ww=90;} ?>
  <style>.thed{ color:#ffffff;font-family:Georgia;font-size:11px;height:22px;text-align:center; }</style>
  <tr bgcolor="#7a6189">
   <td class="thed" style="width:<?=$ww;?>px;"><b>LV</b></td>
   <td class="thed" style="width:<?=$ww;?>px;"><b>Opening</b></td>
   <?php if($i==1){ ?>
   <td class="thed" style="width:<?=$ww;?>px;"><b>Credit</b></td>
   <td class="thed" style="width:<?=$ww;?>px;"><b>Total</b></td>
   <td class="thed" style="width:<?=$ww;?>px;"><b>EnCash</b></td>
   <?php } ?>
   <td class="thed" style="width:<?=$ww;?>px;"><b>Availed</b></td>
   <td class="thed" style="width:<?=$ww;?>px;"><b>Balance</b></td>

   <?php if($TotN_CL>0 OR $TotN_SL>0 OR $TotN_PL>0 OR $TotN_EL>0 OR $TotN_OL>0) { ?> 
    <td class="thed" style="width:<?=$ww;?>px;"><b>Availed</b></td>
    <td class="thed" style="width:<?=$ww;?>px;"><b>Final Balance</b></td>
   <?php } ?>
  </tr>

  <tr style="height:20px;">
   <td class="font1" align="center">CL</td>
   <td class="font1" align="center"><?php if($resLv['OpeningCL']!=''){echo $resLv['OpeningCL'];}else{echo 0;} ?></td>
   <?php if($i==1){ ?>
   <td class="font1" align="center"><?php if($resLv['CreditedCL']!=''){echo $resLv['CreditedCL'];}else{echo 0;} ?></td>
   <td class="font1" align="center"><?php if($resLv['TotCL']!=''){echo $resLv['TotCL'];}else{echo 0;} ?></td>
   <td class="font1" align="center"><?php if($resLv['EnCashCL']!=''){echo $resLv['EnCashCL'];}else{echo 0;} ?></td>
   <?php } ?>
   <td class="font1" align="center"><?php if($resLv['AvailedCL']!=''){echo $resLv['AvailedCL'];}else{echo 0;} ?></td>
   <td class="font1" align="center"><?php if($resLv['BalanceCL']!=''){echo $resLv['BalanceCL'];}else{echo 0;} ?></td>
   <?php if($TotN_CL>0 OR $TotN_SL>0 OR $TotN_PL>0 OR $TotN_EL>0 OR $TotN_OL>0) { ?>
   <td class="font1" align="center"><?php if($TotN_CL!=''){echo $TotN_CL;}else{echo 0;} ?></td>
   <?php $FinBalCL=$resLv['BalanceCL']-$TotN_CL; ?>
   <td class="font1" align="center" bgcolor="#00D200"><b><?php if($FinBalCL!=''){echo $FinBalCL;}else{echo 0;} ?></b></td>   <?php } ?>
  </tr>
  <tr style="height:20px;">
   <td class="font1" align="center">SL</td>
   <td class="font1" align="center"><?php if($resLv['OpeningSL']!=''){echo $resLv['OpeningSL'];}else{echo 0;} ?></td>
   <?php if($i==1){ ?>
   <td class="font1" align="center"><?php if($resLv['CreditedSL']!=''){echo $resLv['CreditedSL'];}else{echo 0;} ?></td>
   <td class="font1" align="center"><?php if($resLv['TotSL']!=''){echo $resLv['TotSL'];}else{echo 0;} ?></td>
   <td class="font1" align="center"><?php if($resLv['EnCashSL']!=''){echo $resLv['EnCashSL'];}else{echo 0;} ?></td>
   <?php } ?>
   <td class="font1" align="center"><?php if($resLv['AvailedSL']!=''){echo $resLv['AvailedSL'];}else{echo 0;} ?></td>
   <td class="font1" align="center"><?php if($resLv['BalanceSL']!=''){echo $resLv['BalanceSL'];}else{echo 0;} ?></td>
   <?php if($TotN_CL>0 OR $TotN_SL>0 OR $TotN_PL>0 OR $TotN_EL>0 OR $TotN_OL>0) { ?>
   <td class="font1" align="center"><?php if($TotN_SL!=''){echo $TotN_SL;}else{echo 0;} ?></td>
   <?php $FinBalSL=$resLv['BalanceSL']-$TotN_SL; ?>
   <td class="font1" align="center" bgcolor="#00D200"><b><?php if($FinBalSL!=''){echo $FinBalSL;}else{echo 0;} ?></b></td>   <?php } ?>
  </tr>
  <tr style="height:20px;">
   <td class="font1" align="center">PL</td>
   <td class="font1" align="center"><?php if($resLv['OpeningPL']!=''){echo $resLv['OpeningPL'];}else{echo 0;} ?></td>
   <?php if($i==1){ ?>
   <td class="font1" align="center"><?php if($resLv['CreditedPL']!=''){echo $resLv['CreditedPL'];}else{echo 0;} ?></td>
   <td class="font1" align="center"><?php if($resLv['TotPL']!=''){echo $resLv['TotPL'];}else{echo 0;} ?></td>
   <td class="font1" align="center"><?php if($resLv['EnCashPL']!=''){echo $resLv['EnCashPL'];}else{echo 0;} ?></td>
   <?php } ?>
   <td class="font1" align="center"><?php if($resLv['AvailedPL']!=''){echo $resLv['AvailedPL'];}else{echo 0;} ?></td>
   <td class="font1" align="center"><?php if($resLv['BalancePL']!=''){echo $resLv['BalancePL'];}else{echo 0;} ?></td>
   <?php if($TotN_CL>0 OR $TotN_SL>0 OR $TotN_PL>0 OR $TotN_EL>0 OR $TotN_OL>0) { ?>
   <td class="font1" align="center"><?php if($TotN_PL!=''){echo $TotN_PL;}else{echo 0;} ?></td>
   <?php $FinBalPL=$resLv['BalancePL']-$TotN_PL; ?>
   <td class="font1" align="center" bgcolor="#00D200"><b><?php if($FinBalPL!=''){echo $FinBalPL;}else{echo 0;} ?></b></td> 
   <?php } ?>
  </tr>
  <tr style="height:20px;">
   <td class="font1" align="center">EL</td>
   <td class="font1" align="center"><?php if($resLv['OpeningEL']!=''){echo $resLv['OpeningEL'];}else{echo 0;} ?></td>
   <?php if($i==1){ ?>
   <td class="font1" align="center"><?php if($resLv['CreditedEL']!=''){echo $resLv['CreditedEL'];}else{echo 0;} ?></td>
   <td class="font1" align="center"><?php if($resLv['TotEL']!=''){echo $resLv['TotEL'];}else{echo 0;} ?></td>
   <td class="font1" align="center"><?php if($resLv['EnCashEL']!=''){echo $resLv['EnCashEL'];}else{echo 0;} ?></td>
   <?php } ?>
   <td class="font1" align="center"><?php if($resLv['AvailedEL']!=''){echo $resLv['AvailedEL'];}else{echo 0;} ?></td>
   <td class="font1" align="center"><?php if($resLv['BalanceEL']!=''){echo $resLv['BalanceEL'];}else{echo 0;} ?></td>
   <?php if($TotN_CL>0 OR $TotN_SL>0 OR $TotN_PL>0 OR $TotN_EL>0 OR $TotN_OL>0) { ?>
   <td class="font1" align="center"><?php if($TotN_EL!=''){echo $TotN_EL;}else{echo 0;} ?></td>
   <?php $FinBalEL=$resLv['BalanceEL']-$TotN_EL; ?>
   <td class="font1" align="center" bgcolor="#00D200"><b><?php if($FinBalEL!=''){echo $FinBalEL;}else{echo 0;} ?></b></td> 
   <?php } ?>
  </tr>
  <tr style="height:20px;">
   <td class="font1" align="center">FL</td>
   <td class="font1" align="center"><?php if($resLv['OpeningOL']!=''){echo $resLv['OpeningOL'];}else{echo 0;} ?></td>
   <?php if($i==1){ ?>
   <td class="font1" align="center"><?php if($resLv['CreditedOL']!=''){echo $resLv['CreditedOL'];}else{echo 0;} ?></td>
   <td class="font1" align="center"><?php if($resLv['TotOL']!=''){echo $resLv['TotOL'];}else{echo 0;} ?></td>
   <td class="font1" align="center"><?php if($resLv['EnCashOL']!=''){echo $resLv['EnCashOL'];}else{echo 0;} ?></td>
   <?php } ?>
   <td class="font1" align="center"><?php if($resLv['AvailedOL']!=''){echo $resLv['AvailedOL'];}else{echo 0;} ?></td>
   <td class="font1" align="center"><?php if($resLv['BalanceOL']!=''){echo $resLv['BalanceOL'];}else{echo 0;} ?></td>
   <?php if($TotN_CL>0 OR $TotN_SL>0 OR $TotN_PL>0 OR $TotN_EL>0 OR $TotN_OL>0) { ?>
   <td class="font1" align="center"><?php if($TotN_OL!=''){echo $TotN_OL;}else{echo 0;} ?></td>
   <?php $FinBalOL=$resLv['BalanceOL']-$TotN_OL; ?>
   <td class="font1" align="center" bgcolor="#00D200"><b><?php if($FinBalOL!=''){echo $FinBalOL;}else{echo 0;} ?></b></td> 
   <?php } ?>
  </tr>

 </table>

</td>

<?php } ?>
<?php /************************** Leave Balance Close ***********************************/ ?>
<?php /************************** Leave Balance Close ***********************************/ ?>	 

	</tr>
   </table>

<?php /********************************* Leave Details ************************************/?>
<?php /********************************* Leave Details ************************************/?>
       </td>
	   
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
<style>.th2{color:#ffffff;font-family:Georgia;font-size:11px;text-align:center;}
.th3{color:#000000;font-family:Times New Roman;font-size:12px;text-align:center;}
</style>	  	  
	  <td align="center" id="LeaveStatusTD" style="display:none;width:880px;">
		<table border="1">
		  <tr bgcolor="#7a6189" style="height:22px;">
           <td class="th2" style="width:50px;"><b>SNo</b></td>
           <td class="th2" style="width:100px;"><b>Apply Date</b></td>
           <td class="th2" style="width:100px;"><b>Leave</b></td>
           <td class="th2" style="width:100px;"><b>From</b></td>
           <td class="th2" style="width:100px;"><b>To</b></td>
           <td class="th2" style="width:100px;"><b>Total Day</b></td>
           <td class="th2" style="width:80px;"><b>Details</b></td>
           <td class="th2" style="width:120px;"><b>Status</b></td>
           <td class="th2" style="width:150px;"><b>Action</b></td>
		 </tr>	

<?php if($rowCheck>0) { $Sn=1; while($resCheck=mysql_fetch_array($sqlCheck)) { ?>

         <tr bgcolor="#FFFFFF" style="height:22px;">
           <td class="th3"><?php echo $Sn; ?></td>
           <td class="th3"><?php echo date("d-m-y", strtotime($resCheck['Apply_Date'])); ?></td>
           <td class="th3"><?php if($resCheck['Leave_Type']=='CH'){echo 'Half day CL';} elseif($resCheck['Leave_Type']=='SH'){echo 'Half day SL';} else {echo $resCheck['Leave_Type'];} ?></td>
           <td class="th3"><?php echo date("d-m-y", strtotime($resCheck['Apply_FromDate'])); ?></td>
           <td class="th3"><?php echo date("d-m-y", strtotime($resCheck['Apply_ToDate'])); ?></td>
           <td class="th3" style="background-color:#CCFFCC;"><?php echo $resCheck['Apply_TotalDay']; ?></td>
           <td class="th3"><a href="javascript:OpenWindow(<?php echo $resCheck['ApplyLeaveId']; ?>)">Details</a></td>
           <td class="th3"><?php if($resCheck['LeaveStatus']==0){echo 'Draft';} if($resCheck['LeaveStatus']==1){echo 'Pending';} if($resCheck['LeaveStatus']==2){echo 'Approved';} if($resCheck['LeaveStatus']==3){echo 'DisApproved';} if($resCheck['LeaveStatus']==4){echo 'Canceled';}?></td>
           <td class="th3">
           <?php if($resCheck['LeaveStatus']==0){ ?>
           <a href="#" onClick="DelAppLeave(<?php echo $resCheck['ApplyLeaveId'].', '.$EmployeeId; ?>, '<?php echo date("d-m-y", strtotime($resCheck['Apply_FromDate'])); ?>', '<?php echo date("d-m-y", strtotime($resCheck['Apply_ToDate'])); ?>', '<?php echo $resCheck['Leave_Type']; ?>')"><font color="#FF0000">Delete</font></a>

           <?php } if(($resCheck['LeaveStatus']==2 OR $resCheck['LeaveStatus']==1 OR $resCheck['LeaveStatus']==4) AND date("m", strtotime($resCheck['Apply_FromDate']))>=date("m"))
		   {  
		    if($resCheck['LeaveEmpCancelStatus']=='N'){ ?><a href="#" onClick="CancelAppLeave(<?php echo $resCheck['ApplyLeaveId']; ?>)">Apply Cancelation</a><?php } elseif($resCheck['LeaveEmpCancelStatus']=='Y' AND $resCheck['LeaveCancelStatus']=='N'){?><font color="#FF8000">Applied For Cancelation</font><?php }elseif($resCheck['LeaveEmpCancelStatus']=='Y' AND $resCheck['LeaveCancelStatus']=='Y'){?><font color="#FF8000">Leave Canceled</font><?php } 
		   } ?>
           </td>
		 </tr>	
<?php $Sn++;} } ?>	

<?php /*********************** OPEN *********************************/ ?>
<?php /*********************** OPEN *********************************/ ?>
<tr bgcolor="#7a6189" style="height:22px;">
<td colspan="9" style="font-family:Times New Roman;color:#FFFFFF;font-size:15px;">&nbsp;<b>Manually Added Leave</b></td>
</tr>
<?php
$ExpMonthDate=date('Y-m-d', strtotime("-2 months", strtotime(date("Y-m-d")))); $pp=strtotime($ExpMonthDate);
$ExpMonth=date('m', strtotime("-2 months", strtotime(date("Y-m-d"))));
$ExpYear=date('Y', strtotime("-2 months", strtotime(date("Y-m-d"))));
?>
<tr>
<td colspan="9" valign="top">
<table cellpadding="0" cellspacing="2">
<tr bgcolor="#FFFFFF" style="height:22px;">
<?php $sqlChk2=mysql_query("select * from hrm_employee_attendance_".date("Y")." where EmployeeID=".$EmployeeId." AND AttDate>='".date("Y")."-01-01' AND AttDate<'".$ExpMonthDate."' AND AttValue!='P' AND AttValue!='WFH' AND AttValue!='A' AND AttValue!='OD' AND AttValue!='HO' AND AttValue!='HF' order by AttDate ASC", $con); $rowChk2=mysql_num_rows($sqlChk2); 
if($rowChk2>0){ $counter=0; while($resChk2=mysql_fetch_array($sqlChk2)){ 
$chk3=mysql_query("select * from hrm_employee_applyleave where '".$resChk2['AttDate']."'>=Apply_FromDate AND '".$resChk2['AttDate']."'<=Apply_ToDate AND Leave_Type='".$resChk2['AttValue']."' AND EmployeeID=".$EmployeeId,$con); $rowchk3=mysql_num_rows($chk3);
if($rowchk3==0){ $counter=$counter+1; ?>

<td style="font-family:Times New Roman;font-size:12px;width:90px;" align="center">
<?php echo date("d-m-y", strtotime($resChk2['AttDate'])).'&nbsp;/<b style="color:#004891;font-size:12px;">'; 
if($resChk2['AttValue']=='CH'){echo 'Half day CL';} elseif($resChk2['AttValue']=='SH'){echo 'Half day SL';} else {echo $resChk2['AttValue'];}
echo '</b>'; ?>
</td><?php  ?>
<?php if($counter%10==0){ ?></tr><tr bgcolor="#FFFFFF" style="height:22px;"><?php } } } }?>

<tr bgcolor="#FFFFFF" style="height:22px;">
<?php $sqlChk2=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$EmployeeId." AND AttDate>='".$ExpMonthDate."' AND AttDate<='".date("Y")."-12-31' AND AttValue!='P' AND AttValue!='WFH' AND AttValue!='A' AND AttValue!='OD' AND AttValue!='HO' AND AttValue!='HF' order by AttDate ASC", $con); $rowChk2=mysql_num_rows($sqlChk2); 
if($rowChk2>0){ $counter=0; while($resChk2=mysql_fetch_array($sqlChk2)){ 
$chk3=mysql_query("select * from hrm_employee_applyleave where '".$resChk2['AttDate']."'>=Apply_FromDate AND '".$resChk2['AttDate']."'<=Apply_ToDate AND Leave_Type='".$resChk2['AttValue']."' AND EmployeeID=".$EmployeeId,$con); $rowchk3=mysql_num_rows($chk3);
if($rowchk3==0){ $counter=$counter+1; ?>

<td style="font-family:Times New Roman;font-size:12px;width:90px;" align="center">
<?php echo date("d-m-y", strtotime($resChk2['AttDate'])).'&nbsp;/<b style="color:#004891;font-size:12px;">'; 
if($resChk2['AttValue']=='CH'){echo 'Half day CL';} elseif($resChk2['AttValue']=='SH'){echo 'Half day SL';} else {echo $resChk2['AttValue'];}
echo '</b>'; ?>
</td><?php  ?>
<?php if($counter%10==0){ ?></tr><tr bgcolor="#FFFFFF" style="height:22px;"><?php } } } }?>
</table>
</td>
</tr>	
<?php /*********************** CLOSE *********************************/ ?>
<?php /*********************** CLOSE *********************************/ ?>
			 

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


