<?php require_once('../AdminUser/config/config.php');  ?>
<?php  $sqlE=mysql_query("select EmpCode, Fname, Sname, Lname from hrm_employee where EmployeeID=".$_REQUEST['id'], $con); 
       $resE=mysql_fetch_assoc($sqlE); $EmpName=$resE['EmpCode'].'-'.$resE['Fname'].' '.$resE['Sname'].' '.$resE['Lname']; ?>								
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Leave Balance :&nbsp;<?php echo $EmpName; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="../AdminUser/css/body.css" rel="stylesheet"/>
<link type="text/css" href="../AdminUser/css/pro_dropdown_3.css" rel="stylesheet"/>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" bgcolor="#E0DBE3">	
     <table style="vertical-align:top;" width="550" align="center" border="0">
	 <tr>
<?php $sqlA=mysql_query("select * from hrm_employee_monthlyleave_balance where EmployeeID=".$_REQUEST['id']." AND Month=".date("m")." AND Year='".date("Y")."'", $con); 
      $resA=mysql_fetch_array($sqlA); 
	  
$i=date("m");

if($i==1){$j='02'; $Y=date("Y");}elseif($i==2){$j='03'; $Y=date("Y");}elseif($i==3){$j='04'; $Y=date("Y");}elseif($i==4){$j='05'; $Y=date("Y");}elseif($i==5){$j='06'; $Y=date("Y");}elseif($i==6){$j='07'; $Y=date("Y");}elseif($i==7){$j='08'; $Y=date("Y");}elseif($i==8){$j='09'; $Y=date("Y");}elseif($i==9){$j='10'; $Y=date("Y");}elseif($i==10){$j='11'; $Y=date("Y");}elseif($i==11){$j='12'; $Y=date("Y");}elseif($i==12){$j='01'; $Y=date("Y")+1;}

$NextMonth=$j; $Sdate=date($Y."-".$NextMonth."-01");

//if(date("m")==12){$NextMonth=date("m");} else {$NextMonth=date("m")+1;}
//$Sdate=date("Y-".$NextMonth."-01"); $Y=date("Y");

$sqlSNextCL=mysql_query("select count(AttValue) as SNextCL from hrm_employee_attendance where AttValue='CL' AND EmployeeID=".$_REQUEST['id']." AND AttDate>='".$Sdate."' AND Year=".$Y, $con); while($resSNextCL=mysql_fetch_array($sqlSNextCL)){$SumNextCL=$resSNextCL['SNextCL'];}
$sqlSNextCH=mysql_query("select count(AttValue) as SNextCH from hrm_employee_attendance where AttValue='CH' AND EmployeeID=".$_REQUEST['id']." AND AttDate>='".$Sdate."' AND Year=".$Y, $con); while($resSNextCH=mysql_fetch_array($sqlSNextCH)){$SumNextCH=$resSNextCH['SNextCH']/2;}
$sqlSNextSL=mysql_query("select count(AttValue) as SNextSL from hrm_employee_attendance where AttValue='SL' AND EmployeeID=".$_REQUEST['id']." AND AttDate>='".$Sdate."' AND Year=".$Y, $con); while($resSNextSL=mysql_fetch_array($sqlSNextSL)){$SumNextSL=$resSNextSL['SNextSL'];}

$sqlSNextSH=mysql_query("select count(AttValue) as SNextSH from hrm_employee_attendance where AttValue='SH' AND EmployeeID=".$_REQUEST['id']." AND AttDate>='".$Sdate."' AND Year=".$Y, $con); while($resSNextSH=mysql_fetch_array($sqlSNextSH)){$SumNextSH=$resSNextSH['SNextSH']/2;}
$sqlSNextPL=mysql_query("select count(AttValue) as SNextPL from hrm_employee_attendance where AttValue='PL' AND EmployeeID=".$_REQUEST['id']." AND AttDate>='".$Sdate."' AND Year=".$Y, $con); while($resSNextPL=mysql_fetch_array($sqlSNextPL)){$SumNextPL=$resSNextPL['SNextPL'];}
$sqlSNextEL=mysql_query("select count(AttValue) as SNextEL from hrm_employee_attendance where AttValue='EL' AND EmployeeID=".$_REQUEST['id']." AND AttDate>='".$Sdate."' AND Year=".$Y, $con); while($resSNextEL=mysql_fetch_array($sqlSNextEL)){$SumNextEL=$resSNextEL['SNextEL'];}
$sqlSNextFL=mysql_query("select count(AttValue) as SNextFL from hrm_employee_attendance where AttValue='FL' AND EmployeeID=".$_REQUEST['id']." AND AttDate>='".$Sdate."' AND Year=".$Y, $con); while($resSNextFL=mysql_fetch_array($sqlSNextFL)){$SumNextFL=$resSNextFL['SNextFL'];}

$TotN_CL=$SumNextCL+$SumNextCH; 
$TotN_SL=$SumNextSL+$SumNextSH; 
$TotN_PL=$SumNextPL; 
$TotN_EL=$SumNextEL;
$TotN_FL=$SumNextFL;	
$m=date("m");  
?>
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
