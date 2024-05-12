<?php require_once('../AdminUser/config/config.php');  ?>
<?php //if($_REQUEST['E']!='' AND $_REQUEST['M']!='' AND $_REQUEST['YI']!=''){  } ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title><?php include_once('../Title.php'); ?>&nbsp;House Rent Allowance</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style>
.Des{font-family:Times New Roman;font-size:12px;width:380px;}.Amt{font-family:Times New Roman;font-size:12px;width:100px;}
.TaxF{font-family:Times New Roman;font-size:12px;width:80px;}
</style>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" bgcolor="#D9D1E7">	
<?php $sqlE = mysql_query("SELECT EmpCode,Fname,Sname,Lname,DR,Gender,Married,DesigId,DepartmentId FROM hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID WHERE hrm_employee.EmployeeID=".$_REQUEST['E'], $con);  $ResE = mysql_fetch_assoc($sqlE); 
$sqlDesig=mysql_query("select DesigName from hrm_designation where DesigId=".$ResE['DesigId'], $con); $resDesig=mysql_fetch_assoc($sqlDesig);
$sqlD=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$ResE['DepartmentId'], $con); $resD=mysql_fetch_assoc($sqlD);
if($ResE['DR']=='Y'){$M='Dr.';} elseif($ResE['Gender']=='M'){$M='Mr.';} elseif($ResE['Gender']=='F' AND $ResE['Married']=='Y'){$M='Mrs.';} elseif($ResE['Gender']=='F' AND $ResE['Married']=='N'){$M='Miss.';}  
$Ename=$M.' '.$ResE['Fname'].' '.$ResE['Sname'].' '.$ResE['Lname']; $LEC=strlen($ResE['EmpCode']); 
if($LEC==1){$EC='000'.$ResE['EmpCode'];} if($LEC==2){$EC='00'.$ResE['EmpCode'];} if($LEC==3){$EC='0'.$ResE['EmpCode'];} if($LEC>=4){$EC=$ResE['EmpCode'];}
?>
<table style="vertical-align:top;" width="600" align="center" border="1">
<tr>
<td colspan="3" style="font-family:Times New Roman;font-size:14px;width:400px; font-weight:bold;background-color:#BCB198; color:#000;">
&nbsp;<font color="#800000">EC:</font>&nbsp;<?php echo $EC.'&nbsp;&nbsp;&nbsp;<font color="#800000">Name:</font>&nbsp;'.$Ename; ?>
</td>
</tr>
<?php $sqlY=mysql_query("select FromDate,ToDate from hrm_year where YearId=".$_REQUEST['Y'], $con);  $resY = mysql_fetch_assoc($sqlY);
$FD=date("Y",strtotime($resY['FromDate'])); $TD=date("Y",strtotime($resY['ToDate'])); 
$SqlInv=mysql_query("select * from hrm_employee_investment_declaration where EmployeeID=".$_REQUEST['E']." AND Period='".$FD."-".$TD."'", $con); 
$rowInv=mysql_num_rows($SqlInv); if($rowInv>0){$resInv=mysql_fetch_assoc($SqlInv); } 

$PenFun=$resInv['PenFun']; $LIP=$resInv['LIP']; $DA=$resInv['DA']; $PPF=$resInv['PPF']; $PostOff=$resInv['PostOff']; $ULIP=$resInv['ULIP']; 
$HL=$resInv['HL']; $MF=$resInv['MF']; $IB=$resInv['IB']; $CTF=$resInv['CTF']; $NHB=$resInv['NHB']; $DNSC=$resInv['NSC']; $EPF=$resInv['EPF'];
$sqlMax80c=mysql_query("select * from hrm_company_statutory_tds where CompanyId=".$_REQUEST['C']." AND Status='A'", $con);	$resMax80c=mysql_fetch_assoc($sqlMax80c); 
$max80c= $resMax80c['TDSMax80C'];
$LessDed80c=$PenFun+$LIP+$DA+$PPF+$PostOff+$ULIP+$HL+$MF+$IB+$CTF+$NHB+$DNSC+$EPF;
if($LessDed80c<=$max80c){$Less80C=$LessDed80c;}else{$Less80C=$max80c;}
$TotalIncom_2=$GrossTotIncome-$Less80C;
$DTC=($resInv['DTC']*$resInv['80G_Per'])/100; //$DTC=$resInv['DTC']; 
$MIP=$resInv['MIP']; $MTI=$resInv['MTI']; $MTS=$resInv['MTS']; $ROL=$resInv['ROL']; $Handi=$resInv['Handi']; $DFS=$resInv['DFS']; 
$LessVI=$MIP+$MTI+$MTS+$ROL+$Handi+$DTC+$DFS;
$TotAmt=$LessDed80c+$LessVI;
$TotDeduct=$Less80C+$LessVI;
?>
<tr>
<td style="width:400px;">
<table border="0">
 <tr>
 <td bgcolor="#D9D1E7">
 <table border="1">
 <tr><td colspan="6" align="center" style="font-family:Times New Roman;font-size:12px;width:600px;background-color:#7a6189;color:#FFFFFF;"><b>Deduction Under Chapter VI A</b></td></tr> 
 <tr>
   <td align="center" class="Des" style="background-color:#BCB198;">Section</td>
   <td align="center" class="Amt" style="background-color:#BCB198;">Amount</td>
   <td align="center" class="Amt" style="background-color:#BCB198;">Net Deduct</td>
 </tr>
 <tr>
   <td align="Right" class="Des" style="background-color:#D1D1D1;"><b>Total (A+B) :</b>&nbsp;</td>
   <td align="right" class="Amt" style="background-color:#D5FFD5;"><b><?php echo intval($TotAmt); ?></b>&nbsp;</td>
   <td align="right" class="Amt" style="background-color:#D5FFD5;"><b><?php echo intval($TotDeduct); ?></b>&nbsp;</td>
 </tr>
 <tr>
   <td align="left" class="Des" style="background-color:#D1D1D1;">&nbsp;<b>(A)</b> Deduction Under Section 80C (Maximum Allow:&nbsp;<?php echo intval($max80c); ?>)</td>
   <td align="right" class="Amt" style="background-color:#AED7FF;"><b><?php echo intval($LessDed80c); ?></b>&nbsp;</td>
   <td align="right" class="Amt" style="background-color:#AED7FF;"><b><?php echo intval($Less80C); ?></b>&nbsp;</td>
 </tr>
<?php if($PenFun>0){ ?> 
 <tr>
   <td class="Des" style="background-color:#FFFFFF;">&nbsp;Sec 80CCC - Contribution to Pension Fund (Jeevan Suraksha)</td>
   <td align="right" class="Amt" style="background-color:#FFFFFF;"><?php echo intval($PenFun); ?>&nbsp;</td>
   <td align="right" class="Amt" style="background-color:#FFFFFF;">&nbsp;</td>
 </tr>
<?php } if($LIP>0){ ?> 
 <tr>
   <td class="Des" style="background-color:#FFFFFF;">&nbsp;Life Insurance Premium </td>
   <td align="right" class="Amt" style="background-color:#FFFFFF;"><?php echo intval($LIP); ?>&nbsp;</td>
   <td align="right" class="Amt" style="background-color:#FFFFFF;">&nbsp;</td>
 </tr>
<?php } if($DA>0){ ?> 
 <tr>
   <td class="Des" style="background-color:#FFFFFF;">&nbsp;Defferred Annuity</td>
   <td align="right" class="Amt" style="background-color:#FFFFFF;"><?php echo intval($DA); ?>&nbsp;</td>
   <td align="right" class="Amt" style="background-color:#FFFFFF;">&nbsp;</td>
 </tr>
<?php } if($PPF>0){ ?> 
 <tr>
   <td class="Des" style="background-color:#FFFFFF;">&nbsp;Public Provident Fund </td>
   <td align="right" class="Amt" style="background-color:#FFFFFF;"><?php echo intval($PPF); ?>&nbsp;</td>
   <td align="right" class="Amt" style="background-color:#FFFFFF;">&nbsp;</td>
 </tr>
<?php } if($PostOff>0){ ?> 
 <tr>
   <td class="Des" style="background-color:#FFFFFF;">&nbsp;Time Deposit in Post Office / Bank for 5 year & above </td>
   <td align="right" class="Amt" style="background-color:#FFFFFF;"><?php echo intval($PostOff); ?>&nbsp;</td>
   <td align="right" class="Amt" style="background-color:#FFFFFF;">&nbsp;</td>
 </tr>
<?php } if($ULIP>0){ ?> 
  <tr>
   <td class="Des" style="background-color:#FFFFFF;">&nbsp;ULIP of UTI/LIC </td>
   <td align="right" class="Amt" style="background-color:#FFFFFF;"><?php echo intval($ULIP); ?>&nbsp;</td>
   <td align="right" class="Amt" style="background-color:#FFFFFF;">&nbsp;</td>
 </tr>
<?php } if($HL>0){ ?> 
  <tr>
   <td class="Des" style="background-color:#FFFFFF;">&nbsp;Principal Loan (Housing Loan) Repayment  </td>
   <td align="right" class="Amt" style="background-color:#FFFFFF;"><?php echo intval($HL); ?>&nbsp;</td>
   <td align="right" class="Amt" style="background-color:#FFFFFF;">&nbsp;</td>
 </tr>
<?php } if($MF>0){ ?> 
  <tr>
   <td class="Des" style="background-color:#FFFFFF;">&nbsp;Mutual Funds</td>
   <td align="right" class="Amt" style="background-color:#FFFFFF;"><?php echo intval($MF); ?>&nbsp;</td>
   <td align="right" class="Amt" style="background-color:#FFFFFF;">&nbsp;</td>
 </tr>
<?php } if($IB>0){ ?> 
  <tr>
   <td class="Des" style="background-color:#FFFFFF;">&nbsp;Investment in infrastructure Bonds </td>
   <td align="right" class="Amt" style="background-color:#FFFFFF;"><?php echo intval($IB); ?>&nbsp;</td>
   <td align="right" class="Amt" style="background-color:#FFFFFF;">&nbsp;</td>
 </tr>
<?php } if($CTF>0){ ?> 
  <tr>
   <td class="Des" style="background-color:#FFFFFF;">&nbsp;Children- Tution Fee restricted to max.of 2 children</td>
   <td align="right" class="Amt" style="background-color:#FFFFFF;"><?php echo intval($CTF); ?>&nbsp;</td>
   <td align="right" class="Amt" style="background-color:#FFFFFF;">&nbsp;</td>
 </tr>
<?php } if($NHB>0){ ?> 
  <tr>
   <td class="Des" style="background-color:#FFFFFF;">&nbsp;Deposit in NHB </td>
   <td align="right" class="Amt" style="background-color:#FFFFFF;"><?php echo intval($NHB); ?>&nbsp;</td>
   <td align="right" class="Amt" style="background-color:#FFFFFF;">&nbsp;</td>
 </tr>
<?php } if($DNSC>0){ ?> 
 <tr>
   <td class="Des" style="background-color:#FFFFFF;">&nbsp;Deposit In NSC </td>
   <td align="right" class="Amt" style="background-color:#FFFFFF;"><?php echo intval($DNSC); ?>&nbsp;</td>
   <td align="right" class="Amt" style="background-color:#FFFFFF;">&nbsp;</td>
 </tr>
<?php } if($EPF>0){ ?> 
 <tr>
   <td class="Des" style="background-color:#FFFFFF;">&nbsp;Others (please specify) Employee Provident Fund </td>
   <td align="right" class="Amt" style="background-color:#FFFFFF;"><?php echo intval($EPF); ?>&nbsp;</td>
   <td align="right" class="Amt" style="background-color:#FFFFFF;">&nbsp;</td>
 </tr>
<?php } ?> 
  <tr>
   <td align="left" class="Des" style="background-color:#D1D1D1;">&nbsp;<b>(B)</b></td>
   <td align="right" class="Amt" style="background-color:#AED7FF;"><b><?php echo intval($LessVI); ?></b>&nbsp;</td>
   <td align="right" class="Amt" style="background-color:#AED7FF;"><b><?php echo intval($LessVI); ?></b>&nbsp;</td>
 </tr>
 <tr>
   <td class="Des" style="background-color:#FFFFFF;">&nbsp;Sec.80D - Medical Insurance Premium </td>
   <td align="right" class="Amt" style="background-color:#FFFFFF;"><?php echo intval($MIP); ?>&nbsp;</td>
   <td align="right" class="Amt" style="background-color:#FFFFFF;">&nbsp;</td>
 </tr>
 <tr>
   <td class="Des" style="background-color:#FFFFFF;">&nbsp;Sec. 80DD - Maintenance Exp of handicapped Dependent </td>
   <td align="right" class="Amt" style="background-color:#FFFFFF;"><?php echo intval($MTI); ?>&nbsp;</td>
   <td align="right" class="Amt" style="background-color:#FFFFFF;">&nbsp;</td>
 </tr>
 <tr>
   <td class="Des" style="background-color:#FFFFFF;">&nbsp;Sec 80DDB - Medical Exp on Specified disease </td>
   <td align="right" class="Amt" style="background-color:#FFFFFF;"><?php echo intval($MTS); ?>&nbsp;</td>
   <td align="right" class="Amt" style="background-color:#FFFFFF;">&nbsp;</td>
 </tr>
 <tr>
   <td class="Des" style="background-color:#FFFFFF;">&nbsp;Sec 80E - Repayment of Loan for higher education </td>
   <td align="right" class="Amt" style="background-color:#FFFFFF;"><?php echo intval($ROL); ?>&nbsp;</td>
   <td align="right" class="Amt" style="background-color:#FFFFFF;">&nbsp;</td>
 </tr>
 <tr>
   <td class="Des" style="background-color:#FFFFFF;">&nbsp;Sec 80U - Handicapped  </td>
   <td align="right" class="Amt" style="background-color:#FFFFFF;"><?php echo intval($Handi); ?>&nbsp;</td>
   <td align="right" class="Amt" style="background-color:#FFFFFF;">&nbsp;</td>
 </tr>
 <tr>
   <td class="Des" style="background-color:#FFFFFF;">&nbsp;Sec 80G - Donation to certain funds  </td>
   <td align="right" class="Amt" style="background-color:#FFFFFF;"><?php echo intval($DTC); ?>&nbsp;</td>
   <td align="right" class="Amt" style="background-color:#FFFFFF;">&nbsp;</td>
 </tr>
  <tr>
   <td class="Des" style="background-color:#FFFFFF;">&nbsp;Sec 80GGA - Donation for scientific research </td>
   <td align="right" class="Amt" style="background-color:#FFFFFF;"><?php echo intval($DFS); ?>&nbsp;</td>
   <td align="right" class="Amt" style="background-color:#FFFFFF;">&nbsp;</td>
 </tr>
 </table>
 </td>
 </tr>
</table>
</td>
</tr>
</table>
</body>
</html>