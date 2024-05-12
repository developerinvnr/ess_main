<?php require_once('../AdminUser/config/config.php');  ?>
<?php  $sqlE = mysql_query("SELECT hrm_employee_applyleave.*,EmpCode,Fname,Sname,Lname FROM hrm_employee_applyleave INNER JOIN hrm_employee ON hrm_employee_applyleave.EmployeeID=hrm_employee.EmployeeID WHERE hrm_employee_applyleave.ApplyLeaveId=".$_REQUEST['LId'], $con) or die(mysql_error());  
       $resE=mysql_fetch_assoc($sqlE); $EmpName=$resE['Fname'].' '.$resE['Sname'].' '.$resE['Lname']; ?>								
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Leave Details With Balance :&nbsp;<?php echo $EmpName; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="../AdminUser/css/body.css" rel="stylesheet"/>
<link type="text/css" href="../AdminUser/css/pro_dropdown_3.css" rel="stylesheet"/>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" bgcolor="#E0DBE3">	
<table style="vertical-align:top; width:550px;" align="center" border="0">
 <tr>
  <td style="vertical-align:top;width:540px;">
   <table border="0">
   <tr><td style="width:540px;" align="left" valign="top"><b>EmpCode :</b>&nbsp;<font color="#0033FF"><?php echo $resE['EmpCode']; ?></font>&nbsp;&nbsp;<b> Name :</b>&nbsp;<font color="#0033FF"><?php echo $EmpName; ?></font></td></tr>
   <tr><td style="width:540px;" align="left" valign="top"><b>Leave :</b>&nbsp;<font color="#EA0000"><?php echo date("d-M-Y",strtotime($resE['Apply_FromDate'])).'</font> to <font color="#EA0000">'.date("d-M-Y",strtotime($resE['Apply_ToDate'])); ?></font>&nbsp;&nbsp;<b> Total day :</b>&nbsp;<font color="#EA0000"><?php echo $resE['Apply_TotalDay']; ?></font>&nbsp;&nbsp;<b>Contact no. :</b>&nbsp;<font color="#EA0000"><?php echo $resE['Apply_ContactNo']; ?></font></td></tr>
   <tr><td style="width:540px;" align="left" valign="top"><b> Address :</b>&nbsp;<?php echo $resE['Apply_DuringAddress']; ?></td></tr>
   <tr><td style="width:540px;" align="left" valign="top"><b>Reason :</b>&nbsp;<?php echo $resE['Apply_Reason']; ?></td></tr>
 </table>
 </td>
 </tr>
 <tr>
<?php $sqlA=mysql_query("select * from hrm_employee_monthlyleave_balance where EmployeeID=".$_REQUEST['id']." AND Month=".date("m")." AND Year='".date("Y")."'", $con); 
      $resA=mysql_fetch_array($sqlA); 
	  
if(date("m")==12){$NextMonth=date("m");} else {$NextMonth=date("m")+1;}
$Sdate=date("Y-".$NextMonth."-01"); $Y=date("Y");
$sqlSNextCL=mysql_query("select count(AttValue) as SNextCL from hrm_employee_attendance where AttValue='CL' AND EmployeeID=".$_REQUEST['id']." AND AttDate>='".$Sdate."' AND Year=".$Y, $con); while($resSNextCL=mysql_fetch_array($sqlSNextCL)){$SumNextCL=$resSNextCL['SNextCL'];}
$sqlSNextCH=mysql_query("select count(AttValue) as SNextCH from hrm_employee_attendance where AttValue='CH' AND EmployeeID=".$_REQUEST['id']." AND AttDate>='".$Sdate."' AND Year=".$Y, $con); while($resSNextCH=mysql_fetch_array($sqlSNextCH)){$SumNextCH=$resSNextCH['SNextCH']/2;}
$sqlSNextSL=mysql_query("select count(AttValue) as SNextSL from hrm_employee_attendance where AttValue='SL' AND EmployeeID=".$_REQUEST['id']." AND AttDate>='".$Sdate."' AND Year=".$Y, $con); while($resSNextSL=mysql_fetch_array($sqlSNextSL)){$SumNextSL=$resSNextSL['SNextSL'];}

$sqlSNextSH=mysql_query("select count(AttValue) as SNextSH from hrm_employee_attendance where AttValue='SH' AND EmployeeID=".$_REQUEST['id']." AND AttDate>='".$Sdate."' AND Year=".$Y, $con); while($resSNextSH=mysql_fetch_array($sqlSNextSH)){$SumNextSH=$resSNextSH['SNextSH']/2;}
$sqlSNextPL=mysql_query("select count(AttValue) as SNextPL from hrm_employee_attendance where AttValue='PL' AND EmployeeID=".$_REQUEST['id']." AND AttDate>='".$Sdate."' AND Year=".$Y, $con); while($resSNextPL=mysql_fetch_array($sqlSNextPL)){$SumNextPL=$resSNextPL['SNextPL'];}
$sqlSNextEL=mysql_query("select count(AttValue) as SNextEL from hrm_employee_attendance where AttValue='EL' AND EmployeeID=".$_REQUEST['id']." AND AttDate>='".$Sdate."' AND Year=".$Y, $con); while($resSNextEL=mysql_fetch_array($sqlSNextEL)){$SumNextEL=$resSNextEL['SNextEL'];}

$TotN_CL=$SumNextCL+$SumNextCH; 
$TotN_SL=$SumNextSL+$SumNextSH; 
$TotN_PL=$SumNextPL; 
$TotN_EL=$SumNextEL;	  
?>
<td id="AprDT" style="width:540px;">
<table style="width:540px;" border="1" bgcolor="#FFFFFF">
<tr bgcolor="#7a6189">
 <td colspan="4" bgcolor="#0080FF" align="center" style="font-family:Times New Roman; color:#FFFFFF; font-size:15px; height:25px; width:360px;">
 <b>(Month - <font color="#FFFF00"><?php echo date("F"); ?></font>)</b></td>
 <td colspan="2" bgcolor="#0080FF" align="center" style="font-family:Times New Roman; color:#FFFFFF; font-size:15px; height:25px; width:180px;">
 <b>Future Leaves</b></td>
</tr>
<tr bgcolor="#7a6189">
 <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:90px;" valign="top" align="center"><b>Leave</b></td>
 <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:90px;" valign="top" align="center"><b>Opening</b></td>
 <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:90px;" valign="top" align="center"><b>Availed</b></td>
 <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:90px;" valign="top" align="center"><b>Balance</b></td>
 <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:90px;" valign="top" align="center"><b>Availed</b></td>
 <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:90px;" valign="top" align="center"><b>Final Balance</b></td>
</tr>
<tr>
 <td class="font1" align="center">CL</td>
 <td class="font1" align="center"><?php echo $resA['OpeningCL']; ?></td>
 <td class="font1" align="center"><?php echo $resA['AvailedCL']; ?></td>
 <td class="font1" align="center"><?php echo $resA['BalanceCL']; ?></td>
 
 <td class="font1" align="center"><?php echo $TotN_CL; ?></td>
 <?php $FinBalCL=$resA['BalanceCL']-$TotN_CL; ?>
 <td class="font1" align="center" bgcolor="#CEFF9D"><b><?php echo $FinBalCL; ?></b></td>
</tr>
<tr>
 <td class="font1" align="center">SL</td>
 <td class="font1" align="center"><?php echo $resA['OpeningSL']; ?></td>
 <td class="font1" align="center"><?php echo $resA['AvailedSL']; ?></td>
 <td class="font1" align="center"><?php echo $resA['BalanceSL']; ?></td>
 
 <td class="font1" align="center"><?php echo $TotN_SL; ?></td>
 <?php $FinBalSL=$resA['BalanceSL']-$TotN_SL; ?>
 <td class="font1" align="center" bgcolor="#CEFF9D"><b><?php echo $FinBalSL; ?></b></td>
</tr>
<tr>
 <td class="font1" align="center">PL</td>
 <td class="font1" align="center"><?php echo $resA['OpeningPL']; ?></td>
 <td class="font1" align="center"><?php echo $resA['AvailedPL']; ?></td>
 <td class="font1" align="center"><?php echo $resA['BalancePL']; ?></td>
 
 <td class="font1" align="center"><?php echo $TotN_PL; ?></td>
 <?php $FinBalPL=$resA['BalancePL']-$TotN_PL; ?>
 <td class="font1" align="center" bgcolor="#CEFF9D"><b><?php echo $FinBalPL; ?></b></td>
</tr>
<tr>
 <td class="font1" align="center">EL</td>
 <td class="font1" align="center"><?php echo $resA['OpeningEL']; ?></td>
 <td class="font1" align="center"><?php echo $resA['AvailedEL']; ?></td>
 <td class="font1" align="center"><?php echo $resA['BalanceEL']; ?></td>
 
 <td class="font1" align="center"><?php echo $TotN_EL; ?></td>
 <?php $FinBalEL=$resA['BalanceEL']-$TotN_EL; ?>
 <td class="font1" align="center" bgcolor="#CEFF9D"><b><?php echo $FinBalEL; ?></b></td>
</tr>
</table>
</td>  
	</tr>
  </table>
</body>
</html>
