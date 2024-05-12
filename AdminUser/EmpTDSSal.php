<?php require_once('../AdminUser/config/config.php');  ?>
<?php //if($_REQUEST['E']!='' AND $_REQUEST['M']!='' AND $_REQUEST['YI']!=''){  } ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title><?php include_once('../Title.php'); ?>&nbsp;Sal TDS</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style>
.Des{font-family:Times New Roman;font-size:12px;width:130px;}.Amt{font-family:Times New Roman;font-size:12px;width:80px;}
.TaxF{font-family:Times New Roman;font-size:12px;width:90px;}
</style>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" bgcolor="#D9D1E7">	
<?php $sqlE = mysql_query("SELECT EmpCode,Fname,Sname,Lname,DR,Gender,Married,DesigId,DepartmentId FROM hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID WHERE hrm_employee.EmployeeID=".$_REQUEST['E'], $con);  $ResE = mysql_fetch_assoc($sqlE); 
$sqlDesig=mysql_query("select DesigName from hrm_designation where DesigId=".$ResE['DesigId'], $con); $resDesig=mysql_fetch_assoc($sqlDesig);
$sqlD=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$ResE['DepartmentId'], $con); $resD=mysql_fetch_assoc($sqlD);
if($ResE['DR']=='Y'){$M='Dr.';} elseif($ResE['Gender']=='M'){$M='Mr.';} elseif($ResE['Gender']=='F' AND $ResE['Married']=='Y'){$M='Mrs.';} elseif($ResE['Gender']=='F' AND $ResE['Married']=='N'){$M='Miss.';}  
$Ename=$M.' '.$ResE['Fname'].' '.$ResE['Sname'].' '.$ResE['Lname']; $LEC=strlen($ResE['EmpCode']); 
if($LEC==1){$EC='000'.$ResE['EmpCode'];} if($LEC==2){$EC='00'.$ResE['EmpCode'];} if($LEC==3){$EC='0'.$ResE['EmpCode'];} if($LEC>=4){$EC=$ResE['EmpCode'];}
?>
<table style="vertical-align:top;" width="310" align="center" border="1">
<?php /*
<tr>
<td colspan="3" style="font-family:Times New Roman;font-size:14px;width:320px; font-weight:bold;background-color:#BCB198; color:#000;">
&nbsp;<font color="#800000">EC:</font>&nbsp;<?php echo $EC.'&nbsp;&nbsp;&nbsp;<font color="#800000">Name:</font>&nbsp;'.$Ename; ?>
</td>
</tr>
*/ ?>
<?php 
$sqlY=mysql_query("select FromDate,ToDate from hrm_year where YearId=".$_REQUEST['Y'], $con);  $resY = mysql_fetch_assoc($sqlY);
$FD=date("Y",strtotime($resY['FromDate'])); $TD=date("Y",strtotime($resY['ToDate']));
$sql1 = mysql_query("SELECT TDSDeduction_Amt FROM hrm_emplyee_tds_maincompo WHERE EmployeeID=".$_REQUEST['E']." AND Month=1 AND YearId=".$_REQUEST['Y'], $con);  
$row1 = mysql_num_rows($sql1); if($row1>0){ $res1 = mysql_fetch_assoc($sql1);}
$sql2 = mysql_query("SELECT TDSDeduction_Amt FROM hrm_emplyee_tds_maincompo WHERE EmployeeID=".$_REQUEST['E']." AND Month=2 AND YearId=".$_REQUEST['Y'], $con);  
$row2 = mysql_num_rows($sql2); if($row2>0){ $res2 = mysql_fetch_assoc($sql2);}     
$sql3 = mysql_query("SELECT TDSDeduction_Amt FROM hrm_emplyee_tds_maincompo WHERE EmployeeID=".$_REQUEST['E']." AND Month=3 AND YearId=".$_REQUEST['Y'], $con);  
$row3 = mysql_num_rows($sql3); if($row3>0){ $res3 = mysql_fetch_assoc($sql3);}
$sql4 = mysql_query("SELECT TDSDeduction_Amt FROM hrm_emplyee_tds_maincompo WHERE EmployeeID=".$_REQUEST['E']." AND Month=4 AND YearId=".$_REQUEST['Y'], $con);  
$row4 = mysql_num_rows($sql4); if($row4>0){ $res4 = mysql_fetch_assoc($sql4);}
$sql5 = mysql_query("SELECT TDSDeduction_Amt FROM hrm_emplyee_tds_maincompo WHERE EmployeeID=".$_REQUEST['E']." AND Month=5 AND YearId=".$_REQUEST['Y'], $con);  
$row5 = mysql_num_rows($sql5); if($row5>0){ $res5 = mysql_fetch_assoc($sql5);}
$sql6 = mysql_query("SELECT TDSDeduction_Amt FROM hrm_emplyee_tds_maincompo WHERE EmployeeID=".$_REQUEST['E']." AND Month=6 AND YearId=".$_REQUEST['Y'], $con);  
$row6 = mysql_num_rows($sql6); if($row6>0){ $res6 = mysql_fetch_assoc($sql6);}
$sql7 = mysql_query("SELECT TDSDeduction_Amt FROM hrm_emplyee_tds_maincompo WHERE EmployeeID=".$_REQUEST['E']." AND Month=7 AND YearId=".$_REQUEST['Y'], $con);  
$row7 = mysql_num_rows($sql7); if($row7>0){ $res7 = mysql_fetch_assoc($sql7);}
$sql8 = mysql_query("SELECT TDSDeduction_Amt FROM hrm_emplyee_tds_maincompo WHERE EmployeeID=".$_REQUEST['E']." AND Month=8 AND YearId=".$_REQUEST['Y'], $con);  
$row8 = mysql_num_rows($sql8); if($row8>0){ $res8 = mysql_fetch_assoc($sql8);}
$sql9 = mysql_query("SELECT TDSDeduction_Amt FROM hrm_emplyee_tds_maincompo WHERE EmployeeID=".$_REQUEST['E']." AND Month=9 AND YearId=".$_REQUEST['Y'], $con);  
$row9 = mysql_num_rows($sql9); if($row9>0){ $res9 = mysql_fetch_assoc($sql9);}
$sql10 = mysql_query("SELECT TDSDeduction_Amt FROM hrm_emplyee_tds_maincompo WHERE EmployeeID=".$_REQUEST['E']." AND Month=10 AND YearId=".$_REQUEST['Y'], $con);  
$row10 = mysql_num_rows($sql10); if($row10>0){ $res10 = mysql_fetch_assoc($sql10);}
$sql11 = mysql_query("SELECT TDSDeduction_Amt FROM hrm_emplyee_tds_maincompo WHERE EmployeeID=".$_REQUEST['E']." AND Month=11 AND YearId=".$_REQUEST['Y'], $con);  
$row11 = mysql_num_rows($sql11); if($row11>0){ $res11 = mysql_fetch_assoc($sql11);}
$sql12 = mysql_query("SELECT TDSDeduction_Amt FROM hrm_emplyee_tds_maincompo WHERE EmployeeID=".$_REQUEST['E']." AND Month=12 AND YearId=".$_REQUEST['Y'], $con);  
$row12 = mysql_num_rows($sql12); if($row12>0){ $res12 = mysql_fetch_assoc($sql12);}

$sqlTot = mysql_query("SELECT SUM(TDSDeduction_Amt) as TotTDSAmt FROM hrm_emplyee_tds_maincompo WHERE EmployeeID=".$_REQUEST['E']." AND Period='".$FD."-".$TD."' AND YearId=".$_REQUEST['Y'], $con);  $rowTot = mysql_num_rows($sqlTot); if($rowTot>0){ $resTot = mysql_fetch_assoc($sqlTot);}

?>
<tr>
<td style="width:300px;">
<table border="0">
 <tr>
 <td bgcolor="#D9D1E7">
 <table border="1">
 <tr><td colspan="3" align="center" style="font-family:Times New Roman;font-size:12px;width:300px;background-color:#7a6189;color:#FFFFFF;"><b>TDS Amount (Year:&nbsp;<?php echo $FD."-".$TD; ?> )</b></td></tr> 
 <tr>
   <td align="center" class="Des" style="background-color:#BCB198;">Month</td>
   <td align="center" class="Amt" style="background-color:#BCB198;">Amount</td>
   <td align="center" class="TaxF" style="background-color:#BCB198;">Challan No</td>
 </tr>
 <tr style="background-color:<?php if($_REQUEST['M']==4){echo '#60BF00';}else{echo '#FFFFFF';} ?>;">
   <td class="Des">&nbsp;April</td>
   <td align="right" class="Amt"><?php if($row4>0){ echo intval($res4['TDSDeduction_Amt']); }?>&nbsp;</td>
   <td align="right" class="TaxF">&nbsp;</td>
 </tr>
 <tr style="background-color:<?php if($_REQUEST['M']==5){echo '#60BF00';}else{echo '#FFFFFF';} ?>;">
   <td class="Des">&nbsp;May</td>
   <td align="right" class="Amt"><?php if($row5>0){ echo intval($res5['TDSDeduction_Amt']); } ?>&nbsp;</td>
   <td align="right" class="TaxF">&nbsp;</td> 
 </tr>
 <tr style="background-color:<?php if($_REQUEST['M']==6){echo '#60BF00';}else{echo '#FFFFFF';} ?>;">
   <td class="Des">&nbsp;Jun</td>
   <td align="right" class="Amt"><?php if($row6>0){ echo intval($res6['TDSDeduction_Amt']); } ?>&nbsp;</td>
   <td align="right" class="TaxF">&nbsp;</td>
 </tr>
 <tr style="background-color:<?php if($_REQUEST['M']==7){echo '#60BF00';}else{echo '#FFFFFF';} ?>;">
   <td class="Des">&nbsp;July</td>
   <td align="right" class="Amt"><?php if($row7>0){ echo intval($res7['TDSDeduction_Amt']); } ?>&nbsp;</td>
   <td align="right" class="TaxF">&nbsp;</td>
 </tr>
  <tr style="background-color:<?php if($_REQUEST['M']==8){echo '#60BF00';}else{echo '#FFFFFF';} ?>;">
   <td class="Des">&nbsp;August</td>
   <td align="right" class="Amt"><?php if($row8>0){ echo intval($res8['TDSDeduction_Amt']); } ?>&nbsp;</td>
   <td align="right" class="TaxF">&nbsp;</td>
 </tr>
  <tr style="background-color:<?php if($_REQUEST['M']==9){echo '#60BF00';}else{echo '#FFFFFF';} ?>;">
   <td class="Des">&nbsp;September</td>
   <td align="right" class="Amt"><?php if($row9>0){ echo intval($res9['TDSDeduction_Amt']); } ?>&nbsp;</td>
   <td align="right" class="TaxF">&nbsp;</td>
 </tr>
  <tr style="background-color:<?php if($_REQUEST['M']==10){echo '#60BF00';}else{echo '#FFFFFF';} ?>;">
   <td class="Des">&nbsp;October</td>
   <td align="right" class="Amt"><?php if($row10>0){ echo intval($res10['TDSDeduction_Amt']); } ?>&nbsp;</td>
   <td align="right" class="TaxF">&nbsp;</td>
 </tr>
  <tr style="background-color:<?php if($_REQUEST['M']==11){echo '#60BF00';}else{echo '#FFFFFF';} ?>;">
   <td class="Des">&nbsp;November</td>
   <td align="right" class="Amt"><?php if($row11>0){ echo intval($res11['TDSDeduction_Amt']); } ?>&nbsp;</td>
   <td align="right" class="TaxF">&nbsp;</td>
 </tr>
  <tr style="background-color:<?php if($_REQUEST['M']==12){echo '#60BF00';}else{echo '#FFFFFF';} ?>;">
   <td class="Des">&nbsp;December</td>
   <td align="right" class="Amt"><?php if($row12>0){ echo intval($res12['TDSDeduction_Amt']); } ?>&nbsp;</td>
   <td align="right" class="TaxF">&nbsp;</td>
 </tr>
  <tr style="background-color:<?php if($_REQUEST['M']==1){echo '#60BF00';}else{echo '#FFFFFF';} ?>;">
   <td class="Des">&nbsp;January</td>
   <td align="right" class="Amt"><?php if($row1>0){ echo intval($res1['TDSDeduction_Amt']); } ?>&nbsp;</td>
   <td align="right" class="TaxF">&nbsp;</td>
 </tr>
  <tr style="background-color:<?php if($_REQUEST['M']==2){echo '#60BF00';}else{echo '#FFFFFF';} ?>;">
   <td class="Des">&nbsp;February</td>
   <td align="right" class="Amt"><?php if($row2>0){ echo intval($res2['TDSDeduction_Amt']); } ?>&nbsp;</td>
   <td align="right" class="TaxF">&nbsp;</td>
 </tr>
  <tr style="background-color:<?php if($_REQUEST['M']==3){echo '#60BF00';}else{echo '#FFFFFF';} ?>;">
   <td class="Des">&nbsp;March</td>
   <td align="right" class="Amt"><?php if($row3>0){ echo intval($res3['TDSDeduction_Amt']); } ?>&nbsp;</td>
   <td align="right" class="TaxF">&nbsp;</td>
 </tr>
 <tr>
   <td class="Des" align="right" style="background-color:#BCB198;">&nbsp;Total&nbsp;</td>
   <td align="right" class="Amt" style="background-color:#D1D1D1;"><?php if($rowTot>0){ echo intval($resTot['TotTDSAmt']); } ?>&nbsp;</td>
   <td align="right" class="TaxF" style="background-color:#D1D1D1;">&nbsp;</td>
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