<?php require_once('config/config.php');  ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Leave Details & Balance</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet"/>
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" bgcolor="#D9D1E7">	
<?php $sql = mysql_query("SELECT * FROM hrm_employee_applyleave WHERE ApplyLeaveId=".$_REQUEST['id'], $con) or die(mysql_error()); $res = mysql_fetch_array($sql); 
$sqlE=mysql_query("select Gender,Married,DR,hrm_employee.* from hrm_employee INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee.EmployeeID=".$res['EmployeeID'], $con); $resE=mysql_fetch_assoc($sqlE);
if($resE['DR']=='Y'){$M='Dr.';} elseif($resE['Gender']=='M'){$M='Mr.';} elseif($resE['Gender']=='F' AND $resE['Married']=='Y'){$M='Mrs.';} elseif($resE['Gender']=='F' AND $resE['Married']=='N'){$M='Miss.';}  $NameE=$M.' '.$resE['Fname'].' '.$resE['Sname'].' '.$resE['Lname']; ?>
   
    <table style="vertical-align:top;" width="550" align="center" border="0">
	 <tr>
	  <td>
	  <table border="0">
	   <tr>
	    <td width="120" align="left" valign="top" style="font-family:Times New Roman;font-size:14px;"><b>Emp Name :</b></td>
		<td width="300" align="left" valign="top" style="font-family:Times New Roman;font-size:14px;">&nbsp;<?php echo $NameE; ?></td>
	   </tr>    
<?php $sqlRep=mysql_query("select Gender,Married,DR,DepartmentId,hrm_employee.* from hrm_employee INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee.EmployeeID=".$res['Apply_SentToApp'], $con); $resRep=mysql_fetch_assoc($sqlRep);
if($resRep['DR']=='Y'){$M='Dr.';} elseif($resRep['Gender']=='M'){$M='Mr.';} elseif($resRep['Gender']=='F' AND $resRep['Married']=='Y'){$M='Mrs.';} elseif($resRep['Gender']=='F' AND $resRep['Married']=='N'){$M='Miss.';}  $NameRep=$M.' '.$resRep['Fname'].' '.$resRep['Sname'].' '.$resRep['Lname'];
$sqlDR=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$resRep['DepartmentId'], $con); $resDR=mysql_fetch_assoc($sqlDR); ?>	
        <tr>	
        <td width="120" align="left" valign="top" style="font-family:Times New Roman;font-size:14px;"><b>REP-MGR :</b></td>
		<td width="300" align="left" valign="top" style="font-family:Times New Roman;font-size:14px;">
		&nbsp;<?php echo $NameRep.' <font color="#005500">('.$resDR['DepartmentCode'].')</font>'; ?></td>
	   </tr>
<?php $sqlHod=mysql_query("select Gender,Married,DR,DepartmentId,hrm_employee.* from hrm_employee INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee.EmployeeID=".$res['Apply_SentToHOD'], $con); $resHod=mysql_fetch_assoc($sqlHod);
if($resHod['DR']=='Y'){$M='Dr.';} elseif($resHod['Gender']=='M'){$M='Mr.';} elseif($resHod['Gender']=='F' AND $resHod['Married']=='Y'){$M='Mrs.';} elseif($resHod['Gender']=='F' AND $resHod['Married']=='N'){$M='Miss.';}  $NameHod=$M.' '.$resHod['Fname'].' '.$resHod['Sname'].' '.$resHod['Lname']; 
$sqlDH=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$resHod['DepartmentId'], $con); $resDH=mysql_fetch_assoc($sqlDH); ?>		   
	   <tr>
	    <td width="120" align="left" valign="top" style="font-family:Times New Roman;font-size:14px;"><b>HOD :</b></td>
		<td width="400" align="left" valign="top" style="font-family:Times New Roman;font-size:14px;">
		&nbsp;<?php echo $NameHod.' <font color="#005500">('.$resDH['DepartmentCode'].')</font>'; ?></td>
	   </tr>
	   <tr><td>&nbsp;</td></tr>
	   <tr>
	    <td width="120" align="left" valign="top" style="font-family:Times New Roman;font-size:14px;"><b>Contact :</b></td>
		<td width="400" align="left" valign="top" style="font-family:Times New Roman;font-size:14px;">
		&nbsp;<?php echo $res['Apply_ContactNo']; ?></td>
	   </tr>
	    <tr>
	    <td width="120" align="left" valign="top" style="font-family:Times New Roman;font-size:14px;"><b>During Address :</b></td>
		<td width="400" align="left" valign="top" style="font-family:Times New Roman;font-size:14px;">
		&nbsp;<?php echo $res['Apply_DuringAddress']; ?></td>
	   </tr>
	   <tr>
	    <td width="120" align="left" valign="top" style="font-family:Times New Roman;font-size:14px;"><b>Leave Reason :</b></td>
		<td width="400" align="left" valign="top" style="font-family:Times New Roman;font-size:14px;">
		&nbsp;<?php echo $res['Apply_Reason']; ?></td>
	   </tr>

	 </table>
	  </td>
	</tr>
<?php $sqlA=mysql_query("select * from hrm_employee_monthlyleave_balance where EmployeeID=".$res['EmployeeID']." AND Month=".date("m")." AND Year='".date("Y")."'", $con); 
      $resA=mysql_fetch_array($sqlA); 
	  
if(date("m")==12){$NextMonth=date("m");} else {$NextMonth=date("m")+1;}
$Sdate=date("Y-".$NextMonth."-01"); $Y=date("Y");
$sqlSNextCL=mysql_query("select count(AttValue) as SNextCL from hrm_employee_attendance where AttValue='CL' AND EmployeeID=".$res['EmployeeID']." AND AttDate>='".$Sdate."' AND Year=".$Y, $con); while($resSNextCL=mysql_fetch_array($sqlSNextCL)){$SumNextCL=$resSNextCL['SNextCL'];}
$sqlSNextCH=mysql_query("select count(AttValue) as SNextCH from hrm_employee_attendance where AttValue='CH' AND EmployeeID=".$res['EmployeeID']." AND AttDate>='".$Sdate."' AND Year=".$Y, $con); while($resSNextCH=mysql_fetch_array($sqlSNextCH)){$SumNextCH=$resSNextCH['SNextCH']/2;}
$sqlSNextSL=mysql_query("select count(AttValue) as SNextSL from hrm_employee_attendance where AttValue='SL' AND EmployeeID=".$res['EmployeeID']." AND AttDate>='".$Sdate."' AND Year=".$Y, $con); while($resSNextSL=mysql_fetch_array($sqlSNextSL)){$SumNextSL=$resSNextSL['SNextSL'];}

$sqlSNextSH=mysql_query("select count(AttValue) as SNextSH from hrm_employee_attendance where AttValue='SH' AND EmployeeID=".$res['EmployeeID']." AND AttDate>='".$Sdate."' AND Year=".$Y, $con); while($resSNextSH=mysql_fetch_array($sqlSNextSH)){$SumNextSH=$resSNextSH['SNextSH']/2;}
$sqlSNextPL=mysql_query("select count(AttValue) as SNextPL from hrm_employee_attendance where AttValue='PL' AND EmployeeID=".$res['EmployeeID']." AND AttDate>='".$Sdate."' AND Year=".$Y, $con); while($resSNextPL=mysql_fetch_array($sqlSNextPL)){$SumNextPL=$resSNextPL['SNextPL'];}
$sqlSNextEL=mysql_query("select count(AttValue) as SNextEL from hrm_employee_attendance where AttValue='EL' AND EmployeeID=".$res['EmployeeID']." AND AttDate>='".$Sdate."' AND Year=".$Y, $con); while($resSNextEL=mysql_fetch_array($sqlSNextEL)){$SumNextEL=$resSNextEL['SNextEL'];}
$sqlSNextFL=mysql_query("select count(AttValue) as SNextFL from hrm_employee_attendance where AttValue='FL' AND EmployeeID=".$res['EmployeeID']." AND AttDate>='".$Sdate."' AND Year=".$Y, $con); while($resSNextFL=mysql_fetch_array($sqlSNextFL)){$SumNextFL=$resSNextFL['SNextFL'];}

$TotN_CL=$SumNextCL+$SumNextCH; 
$TotN_SL=$SumNextSL+$SumNextSH; 
$TotN_PL=$SumNextPL; 
$TotN_EL=$SumNextEL;	
$TotN_FL=$SumNextFL;
$m=date("m");  
?>
<tr>
<td id="AprDT" style="width:540px;">
<table style="width:540px;" border="1" bgcolor="#FFFFFF">
<tr bgcolor="#7a6189">
 <td colspan="<?php if($m==1){echo 5;}else{echo 4;}?>" bgcolor="#0080FF" align="center" style="font-family:Times New Roman; color:#FFFFFF; font-size:15px; height:25px; width:360px;">
 <b><?php echo $EmpName; ?>&nbsp;&nbsp;&nbsp;(Month - <font color="#FFFF00"><?php echo date("F"); ?></font>)</b></td>
 <td colspan="2" bgcolor="#0080FF" align="center" style="font-family:Times New Roman; color:#FFFFFF; font-size:15px; height:25px; width:180px;">
 <b>Future Leaves</b></td>
</tr>
<tr bgcolor="#7a6189">
 <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:90px;" valign="top" align="center"><b>Leave</b></td>
 <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:90px;" valign="top" align="center"><b>Opening</b></td>
 <?php if($m==1){ ?><td style="color:#ffffff; font-family:Georgia; font-size:11px; width:90px;" valign="top" align="center"><b>Credited</b></td><?php } ?>
 <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:90px;" valign="top" align="center"><b>Availed</b></td>
 <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:90px;" valign="top" align="center"><b>Balance</b></td>
 <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:90px;" valign="top" align="center"><b>Availed</b></td>
 <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:90px;" valign="top" align="center"><b>Final Balance</b></td>
</tr>
<tr>
 <td class="font1" align="center">CL</td>
 <td class="font1" align="center"><?php echo $resA['OpeningCL']; ?></td>
 <?php if($m==1){ ?><td class="font1" align="center"><?php echo $resA['CreditedCL']; ?></td><?php } ?>
 <td class="font1" align="center"><?php echo $resA['AvailedCL']; ?></td>
 <td class="font1" align="center"><?php echo $resA['BalanceCL']; ?></td>
 
 <td class="font1" align="center"><?php if($NextMonth!=12){echo $TotN_CL;}else{echo 0;} ?></td>
 <?php if($NextMonth!=12){$FinBalCL=$resA['BalanceCL']-$TotN_CL;}else{$FinBalCL=$resA['BalanceCL'];} ?>
 <td class="font1" align="center" bgcolor="#CEFF9D"><b><?php echo $FinBalCL; ?></b></td>
</tr>
<tr>
 <td class="font1" align="center">SL</td>
 <td class="font1" align="center"><?php echo $resA['OpeningSL']; ?></td>
 <?php if($m==1){ ?><td class="font1" align="center"><?php echo $resA['CreditedSL']; ?></td><?php } ?>
 <td class="font1" align="center"><?php echo $resA['AvailedSL']; ?></td>
 <td class="font1" align="center"><?php echo $resA['BalanceSL']; ?></td>
 
 <td class="font1" align="center"><?php if($NextMonth!=12){echo $TotN_SL;}else{echo 0;} ?></td>
 <?php if($NextMonth!=12){$FinBalSL=$resA['BalanceSL']-$TotN_SL;}else{$FinBalSL=$resA['BalanceSL'];} ?>
 <td class="font1" align="center" bgcolor="#CEFF9D"><b><?php echo $FinBalSL; ?></b></td>
</tr>
<tr>
 <td class="font1" align="center">PL</td>
 <td class="font1" align="center"><?php echo $resA['OpeningPL']; ?></td>
 <?php if($m==1){ ?><td class="font1" align="center"><?php echo $resA['CreditedPL']; ?></td><?php } ?>
 <td class="font1" align="center"><?php echo $resA['AvailedPL']; ?></td>
 <td class="font1" align="center"><?php echo $resA['BalancePL']; ?></td>
 
 <td class="font1" align="center"><?php if($NextMonth!=12){echo $TotN_PL;}else{echo 0;} ?></td>
 <?php if($NextMonth!=12){$FinBalPL=$resA['BalancePL']-$TotN_PL;}else{$FinBalPL=$resA['BalancePL'];} ?>
 <td class="font1" align="center" bgcolor="#CEFF9D"><b><?php echo $FinBalPL; ?></b></td>
</tr>
<tr>
 <td class="font1" align="center">EL</td>
 <td class="font1" align="center"><?php echo $resA['OpeningEL']; ?></td>
 <?php if($m==1){ ?><td class="font1" align="center"><?php echo $resA['CreditedEL']; ?></td><?php } ?>
 <td class="font1" align="center"><?php echo $resA['AvailedEL']; ?></td>
 <td class="font1" align="center"><?php echo $resA['BalanceEL']; ?></td>
 
 <td class="font1" align="center"><?php if($NextMonth!=12){echo $TotN_EL;}else{echo 0;} ?></td>
 <?php if($NextMonth!=12){$FinBalEL=$resA['BalanceEL']-$TotN_EL;}else{$FinBalEL=$resA['BalanceEL'];} ?>
 <td class="font1" align="center" bgcolor="#CEFF9D"><b><?php echo $FinBalEL; ?></b></td>
</tr>
<tr>
 <td class="font1" align="center">FL</td>
 <td class="font1" align="center"><?php echo $resA['OpeningOL']; ?></td>
 <?php if($m==1){ ?><td class="font1" align="center"><?php echo $resA['CreditedOL']; ?></td><?php } ?>
 <td class="font1" align="center"><?php echo $resA['AvailedOL']; ?></td>
 <td class="font1" align="center"><?php echo $resA['BalanceOL']; ?></td>
 <td class="font1" align="center"><?php if($NextMonth!=12){echo $TotN_FL;}else{echo 0;} ?></td>
 <?php if($NextMonth!=12){$FinBalFL=$resA['BalanceOL']-$TotN_FL;}else{$FinBalFL=$resA['BalanceOL'];} ?>
 <td class="font1" align="center" bgcolor="#CEFF9D"><b><?php echo $FinBalFL; ?></b></td>
</tr>
</table>
</td>  
</tr>	
  </table>
</body>
</html>
