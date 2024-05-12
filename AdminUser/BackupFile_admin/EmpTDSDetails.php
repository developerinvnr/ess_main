<?php require_once('../AdminUser/config/config.php');  ?>
<?php //if($_REQUEST['E']!='' AND $_REQUEST['M']!='' AND $_REQUEST['YI']!=''){  } ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title><?php include_once('../Title.php'); ?>&nbsp;TDS Details</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style>
.Des{font-family:Times New Roman;font-size:12px;width:240px;}.Amt{font-family:Times New Roman;font-size:12px;width:80px;}
.TaxF{font-family:Times New Roman;font-size:12px;width:80px;}
</style>
<script language="javascript" type="text/javascript">
function IFS()
{document.getElementById("IncFSal").style.display='block'; document.getElementById("IncFOtherS").style.display='none';}
function IFOS()
{document.getElementById("IncFSal").style.display='none'; document.getElementById("IncFOtherS").style.display='block';}
function Sal()
{document.getElementById("IncSal").style.display='block'; document.getElementById("IncAllow").style.display='none';}
function Allow()
{document.getElementById("IncSal").style.display='none'; document.getElementById("IncAllow").style.display='block';}
function DUCVI(E,M,Y,C)
{window.open("EmpDuductVISal.php?E="+E+"&M="+M+"&Y="+Y+"&C="+C,"PtForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=620,height=400");}
function TDSD(E,M,Y,C)
{window.open("EmpTDSSal.php?E="+E+"&M="+M+"&Y="+Y+"&C="+C,"PtForm","menubar=no,scrollbars=no,resizable=no,directories=no,width=320,height=360");}
function EduCess(E,M,Y,C)
{window.open("EmpEducationCess.php?E="+E+"&M="+M+"&Y="+Y+"&C="+C,"PtForm","menubar=no,scrollbars=no,resizable=no,directories=no,width=230,height=360");}





function PTax(E,M,Y)
{window.open("EmpPtMonth.php?E="+E+"&M="+M+"&Y="+Y,"PtForm","menubar=no,scrollbars=no,resizable=no,directories=no,width=420,height=230");}
function BasicSal(E,M,Y)
{window.open("EmpBSMonth.php?E="+E+"&M="+M+"&Y="+Y,"PtForm","menubar=no,scrollbars=no,resizable=no,directories=no,width=420,height=360");}
function ArrSal(E,M,Y)
{window.open("EmpArrSal.php?E="+E+"&M="+M+"&Y="+Y,"PtForm","menubar=no,scrollbars=no,resizable=no,directories=no,width=420,height=360");}
function LeEnSal(E,M,Y)
{window.open("EmpLeEnSal.php?E="+E+"&M="+M+"&Y="+Y,"PtForm","menubar=no,scrollbars=no,resizable=no,directories=no,width=420,height=360");}
function BonSal(E,M,Y)
{window.open("EmpBonSal.php?E="+E+"&M="+M+"&Y="+Y,"PtForm","menubar=no,scrollbars=no,resizable=no,directories=no,width=420,height=360");}
function HraSal(E,M,Y)
{window.open("EmpHraSal.php?E="+E+"&M="+M+"&Y="+Y,"PtForm","menubar=no,scrollbars=no,resizable=no,directories=no,width=600,height=400");}
function SpecialSal(E,M,Y)
{window.open("EmpSpecialSal.php?E="+E+"&M="+M+"&Y="+Y,"PtForm","menubar=no,scrollbars=no,resizable=no,directories=no,width=420,height=360");}
function TransPortSal(E,M,Y)
{window.open("EmpTransPortSal.php?E="+E+"&M="+M+"&Y="+Y,"PtForm","menubar=no,scrollbars=no,resizable=no,directories=no,width=420,height=360");}
function DASal(E,M,Y)
{window.open("EmpDASal.php?E="+E+"&M="+M+"&Y="+Y,"PtForm","menubar=no,scrollbars=no,resizable=no,directories=no,width=420,height=360");}
function IncentiveSal(E,M,Y)
{window.open("EmpIncentiveSal.php?E="+E+"&M="+M+"&Y="+Y,"PtForm","menubar=no,scrollbars=no,resizable=no,directories=no,width=420,height=360");}


</script>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" bgcolor="#D9D1E7">	
<?php $sqlE = mysql_query("SELECT EmpCode,Fname,Sname,Lname,DR,Gender,Married,DesigId,DepartmentId FROM hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID WHERE hrm_employee.EmployeeID=".$_REQUEST['E'], $con);  $ResE = mysql_fetch_assoc($sqlE); 
$sqlDesig=mysql_query("select DesigName from hrm_designation where DesigId=".$ResE['DesigId'], $con); $resDesig=mysql_fetch_assoc($sqlDesig);
$sqlD=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$ResE['DepartmentId'], $con); $resD=mysql_fetch_assoc($sqlD);
if($ResE['DR']=='Y'){$M='Dr.';} elseif($ResE['Gender']=='M'){$M='Mr.';} elseif($ResE['Gender']=='F' AND $ResE['Married']=='Y'){$M='Mrs.';} elseif($ResE['Gender']=='F' AND $ResE['Married']=='N'){$M='Miss.';}  
$Ename=$M.' '.$ResE['Fname'].' '.$ResE['Sname'].' '.$ResE['Lname']; $LEC=strlen($ResE['EmpCode']); 
if($LEC==1){$EC='000'.$ResE['EmpCode'];} if($LEC==2){$EC='00'.$ResE['EmpCode'];} if($LEC==3){$EC='0'.$ResE['EmpCode'];} if($LEC>=4){$EC=$ResE['EmpCode'];}
if($_REQUEST['M']==1){$month='January';}if($_REQUEST['M']==2){$month='February';}if($_REQUEST['M']==3){$month='March';}if($_REQUEST['M']==4){$month='April';}
if($_REQUEST['M']==5){$month='May';}if($_REQUEST['M']==6){$month='June';}if($_REQUEST['M']==7){$month='July';}if($_REQUEST['M']==8){$month='August';}
if($_REQUEST['M']==9){$month='September';}if($_REQUEST['M']==10){$month='October';}if($_REQUEST['M']==11){$month='November';}if($_REQUEST['M']==12){$month='December';}
?>
<table style="vertical-align:top;" width="830" align="center" border="1">
<tr>
<td colspan="3" style="font-family:Times New Roman;font-size:14px;width:830px; font-weight:bold;background-color:#BCB198; color:#000;" valign="top">
&nbsp;<font color="#00FFFF"><?php echo $month; ?> :</font>&nbsp;<font color="#800000">EC:</font>&nbsp;<?php echo $EC.'&nbsp;&nbsp;&nbsp;<font color="#800000">Name:</font>&nbsp;'.$Ename.'&nbsp;&nbsp;&nbsp;<font color="#800000">Department:</font>&nbsp;'.$resD['DepartmentCode'].'&nbsp;&nbsp;&nbsp;<font color="#800000">Desig:</font>&nbsp;'.$resDesig['DesigName']; ?>
</td>
</tr>
<?php $sql = mysql_query("SELECT * FROM hrm_emplyee_tds_maincompo WHERE EmployeeID=".$_REQUEST['E']." AND Month=".$_REQUEST['M']." AND YearId=".$_REQUEST['YI'], $con); 
      $res = mysql_fetch_array($sql); ?>
<tr>
<td style="width:400px;">
<table border="0">
 <tr>
 <td bgcolor="#D9D1E7">
 <table border="1">
 <tr><td colspan="3" align="center" style="font-family:Times New Roman;font-size:12px;width:400px;background-color:#7a6189;color:#FFFFFF;"><b>Main Components</b></td></tr> 
 <tr>
   <td align="center" class="Des" style="background-color:#BCB198;">Description</td>
   <td align="center" class="Amt" style="background-color:#BCB198;">Amount</td>
   <td align="center" class="TaxF" style="background-color:#BCB198;">TaxFree</td>
 </tr>
 <tr>
   <td class="Des" style="background-color:#FFFFFF;"><a href="#" onClick="IFS()" style="text-decoration:none;color:#000000;">&nbsp;Income Form Salary</a></td>
   <td align="right" class="Amt" style="background-color:#FFFFFF;"><?php echo intval($res['IncFromSalary_Amt']); ?>&nbsp;</td>
   <td align="right" class="TaxF" style="background-color:#FFFFFF;"><?php echo intval($res['IncFromSalary_TaxFree']); ?>&nbsp;</td>
 </tr>
 <tr>
   <td class="Des" style="background-color:#FFFFFF;"><a href="#" onClick="IFOS()" style="text-decoration:none;color:#000000;">&nbsp;Income From Other Source</a></td>
   <td align="right" class="Amt" style="background-color:#FFFFFF;"><?php echo intval($res['IncFromOtherSource_Amt']); ?>&nbsp;</td>
   <td align="right" class="TaxF" style="background-color:#FFFFFF;"><?php echo intval($res['IncFromOtherSource_TaxFree']); ?>&nbsp;</td>
 </tr>
 <tr>
   <td class="Des" style="background-color:#FFFFFF;"><a href="#" onClick="DUCVI(<?php echo $_REQUEST['E'].', '.$_REQUEST['M'].', '.$_REQUEST['YI'].', '.$_REQUEST['C']; ?>)" style="text-decoration:none;color:#000000;">&nbsp;Deduction Under Chapter VI A</a></td>
   <td align="right" class="Amt" style="background-color:#FFFFFF;"><?php echo intval($res['DeductVIA_Amt']); ?>&nbsp;</td>
   <td align="right" class="TaxF" style="background-color:#FFFFFF;"><?php echo intval($res['DeductVIA_TaxFree']); ?>&nbsp;</td>
 </tr>
 <tr>
   <td class="Des" style="background-color:#B5B5B5;">&nbsp;Net Taxble Income</td>
   <td align="right" class="Amt" style="background-color:#B5B5B5;"><?php echo intval($res['NetTaxableIncome_Amt']); ?>&nbsp;</td>
   <td align="right" class="TaxF" style="background-color:#B5B5B5;"><?php echo intval($res['NetTaxableIncome_TaxFree']); ?>&nbsp;</td>
 </tr>
 <tr>
   <td class="Des" style="background-color:#B5B5B5;">&nbsp;Gross Tax</td>
   <td align="right" class="Amt" style="background-color:#B5B5B5;"><?php echo intval($res['GrossTax_Amt']); ?>&nbsp;</td>
   <td align="right" class="TaxF" style="background-color:#B5B5B5;"><?php echo intval($res['GrossTax_TaxFree']); ?>&nbsp;</td>
 </tr>
 <tr>
   <td class="Des" style="background-color:#FFFFFF;">&nbsp;Relief U/s 89</td>
   <td align="right" class="Amt" style="background-color:#FFFFFF;"><?php echo intval($res['Relif89_Amt']); ?>&nbsp;</td>
   <td align="right" class="TaxF" style="background-color:#FFFFFF;"><?php echo intval($res['Relif89_TaxFree']); ?>&nbsp;</td>
 </tr>
 <tr>
   <td class="Des" style="background-color:#FFFFFF;"><a href="#" onClick="EduCess(<?php echo $_REQUEST['E'].', '.$_REQUEST['M'].', '.$_REQUEST['YI'].', '.$_REQUEST['C']; ?>)" style="text-decoration:none;color:#000000;">&nbsp;Education Cess</a></td>
   <td align="right" class="Amt" style="background-color:#FFFFFF;"><?php echo intval($res['EduCess_Amt']); ?>&nbsp;</td>
   <td align="right" class="TaxF" style="background-color:#FFFFFF;"><?php echo intval($res['EduCess_TaxFree']); ?>&nbsp;</td>
 </tr>
 <tr>
   <td class="Des" style="background-color:#FFFFFF;">&nbsp;Surcharge</td>
   <td align="right" class="Amt" style="background-color:#FFFFFF;"><?php echo intval($res['SurCharge_Amt']); ?>&nbsp;</td>
   <td align="right" class="TaxF" style="background-color:#FFFFFF;"><?php echo intval($res['SurCharge_TaxFree']); ?>&nbsp;</td>
 </tr>
 <tr>
   <td class="Des" style="background-color:#B5B5B5;">&nbsp;Total</td>
   <td align="right" class="Amt" style="background-color:#B5B5B5;"><?php echo intval($res['Payble_Amt']); ?>&nbsp;</td>
   <td align="right" class="TaxF" style="background-color:#B5B5B5;"><?php echo intval($res['Payble_TaxFree']); ?>&nbsp;</td>
 </tr>
 <tr>
   <td class="Des" style="background-color:#FFFFFF;">&nbsp;Rebate</td>
   <td align="right" class="Amt" style="background-color:#FFFFFF;"><?php echo intval($res['Rebate_Amt']); ?>&nbsp;</td>
   <td align="right" class="TaxF" style="background-color:#FFFFFF;"><?php echo intval($res['Rebate_TaxFree']); ?>&nbsp;</td>
 </tr>
 <tr>
   <td class="Des" style="background-color:#B5B5B5;">&nbsp;Net Tax Payble</td>
   <td align="right" class="Amt" style="background-color:#B5B5B5;"><?php echo intval($res['NetTaxPayble_Amt']); ?>&nbsp;</td>
   <td align="right" class="TaxF" style="background-color:#B5B5B5;"><?php echo intval($res['NetTaxPayble_TaxFree']); ?>&nbsp;</td>
 </tr>
  <tr>
   <td class="Des" style="background-color:#FFFFFF;"><a href="#" onClick="TDSD(<?php echo $_REQUEST['E'].', '.$_REQUEST['M'].', '.$_REQUEST['YI'].', '.$_REQUEST['C']; ?>)" style="text-decoration:none;color:#000000;">&nbsp;TDS Deduction</a></td>
   <td align="right" class="Amt" style="background-color:#FFFFFF;"><?php echo intval($res['TDSDeduction_Amt']); ?>&nbsp;</td>
   <td align="right" class="TaxF" style="background-color:#FFFFFF;">&nbsp;</td>
 </tr>
 <tr>
   <td class="Des" style="background-color:#B5B5B5;">&nbsp;Balance Tax</td>
   <td align="right" class="Amt" style="background-color:#B5B5B5;"><?php echo intval($res['Balance_TaxFree']); ?>&nbsp;</td>
   <td align="right" class="TaxF" style="background-color:#B5B5B5;">&nbsp;</td>
 </tr>
 </table>
 </td>
 </tr>
 <tr><td></td></tr>
<?php $sqlIFS = mysql_query("SELECT * FROM hrm_emplyee_tds_incfromsalary WHERE EmployeeID=".$_REQUEST['E']." AND Month=".$_REQUEST['M']." AND YearId=".$_REQUEST['YI'], $con); 
      $resIFS = mysql_fetch_array($sqlIFS);  ?> 
 <tr>
<?php /***************************** Open Income From Salary ***************************************/ ?> 
 <td id="IncFSal" style="display:none;" bgcolor="#D9D1E7">
 <table border="1">
  <tr><td colspan="3" align="center" style="font-family:Times New Roman;font-size:12px;width:400px;background-color:#7a6189;color:#FFFFFF;"><b>Income From Salary</b></td></tr> 
  <tr>
   <td align="center" class="Des" style="background-color:#BCB198;">Description</td>
   <td align="center" class="Amt" style="background-color:#BCB198;">Amount</td>
   <td align="center" class="TaxF" style="background-color:#BCB198;">TaxFree</td>
  </tr>
 <tr>
   <td class="Des" style="background-color:#FFFFFF;"><a href="#" onClick="Sal()" style="text-decoration:none;color:#000000;">&nbsp;Salary</a></td>
   <td align="right" class="Amt" style="background-color:#FFFFFF;"><?php echo intval($resIFS['Salary_Amt']); ?>&nbsp;</td>
   <td align="right" class="TaxF" style="background-color:#FFFFFF;"><?php echo intval($resIFS['Salary_TaxFree']); ?>&nbsp;</td>
 </tr>
 <tr>
   <td class="Des" style="background-color:#FFFFFF;"><a href="#" onClick="Allow()" style="text-decoration:none;color:#000000;">&nbsp;Allowance</a></td>
   <td align="right" class="Amt" style="background-color:#FFFFFF;"><?php echo intval($resIFS['Allowance_Amt']); ?>&nbsp;</td>
   <td align="right" class="TaxF" style="background-color:#FFFFFF;"><?php echo intval($resIFS['Allowance_TaxFree']); ?>&nbsp;</td>
 </tr>
 <tr>
   <td class="Des" style="background-color:#FFFFFF;"><a href="#" onClick="Perqui()" style="text-decoration:none;color:#000000;">&nbsp;Perquistes</a></td>
   <td align="right" class="Amt" style="background-color:#FFFFFF;"><?php echo intval($resIFS['Perquistes_Amt']); ?>&nbsp;</td>
   <td align="right" class="TaxF" style="background-color:#FFFFFF;"><?php echo intval($resIFS['Perquistes_TaxFree']); ?>&nbsp;</td>
 </tr>
 <tr>
   <td class="Des" style="background-color:#B5B5B5;">&nbsp;Gross Salary</td>
   <td align="right" class="Amt" style="background-color:#B5B5B5;"><?php echo intval($resIFS['GrossSalary_Amt']); ?>&nbsp;</td>
   <td align="right" class="TaxF" style="background-color:#B5B5B5;"><?php echo intval($resIFS['GrossSalary_TaxFree']); ?>&nbsp;</td>
 </tr>
 <tr>
   <td class="Des" style="background-color:#FFFFFF;">&nbsp;Standard Deductions</td>
   <td align="right" class="Amt" style="background-color:#FFFFFF;"><?php echo intval($resIFS['StandDeduction_Amt']); ?>&nbsp;</td>
   <td align="right" class="TaxF" style="background-color:#FFFFFF;"><?php echo intval($resIFS['StandDeduction_TaxFree']); ?>&nbsp;</td>
 </tr>
 <tr>
<?php /* onClick="PTax(<?php echo $_REQUEST['E'].', '.$_REQUEST['M'].', '.$_REQUEST['YI']; ?>)" */ ?> 
   <td class="Des" style="background-color:#FFFFFF;"><a href="#" style="text-decoration:none;color:#000000;">&nbsp;Professional Tax Payble</a></td>
   <td align="right" class="Amt" style="background-color:#FFFFFF;"><?php echo intval($resIFS['PTax_Amt']); ?>&nbsp;</td>
   <td align="right" class="TaxF" style="background-color:#FFFFFF;"><?php echo intval($resIFS['PTax_TaxFree']); ?>&nbsp;</td>
 </tr>
 <tr>
   <td class="Des" style="background-color:#B5B5B5;">&nbsp;Income From Salary</td>
   <td align="right" class="Amt" style="background-color:#B5B5B5;"><?php echo intval($resIFS['IncomeFromSal_Amt']); ?>&nbsp;</td>
   <td align="right" class="TaxF" style="background-color:#B5B5B5;"><?php echo intval($resIFS['IncomeFromSal_TaxFree']); ?>&nbsp;</td>
 </tr>
 </table>
 </td>
<?php /***************************** Close Income From Salary ***************************************/ ?>  
<?php $sqlIFOS = mysql_query("SELECT * FROM hrm_emplyee_tds_otherincome WHERE EmployeeID=".$_REQUEST['E']." AND YearId=".$_REQUEST['YI'], $con); 
      $resIFOS = mysql_fetch_array($sqlIFOS);  ?> 
<?php /***************************** Open Income From other Source ***************************************/ ?> 
<td id="IncFOtherS" style="display:none;" bgcolor="#D9D1E7">
 <table border="1">
  <tr><td colspan="3" align="center" style="font-family:Times New Roman;font-size:12px;width:400px;background-color:#7a6189;color:#FFFFFF;"><b>Income From Other Source</b></td></tr> 
  <tr>
   <td align="center" class="Des" style="background-color:#BCB198;">Description</td>
   <td align="center" class="Amt" style="background-color:#BCB198;">Amount</td>
   <td align="center" class="TaxF" style="background-color:#BCB198;">TaxFree</td>
  </tr>
  <tr>
   <td class="Des" style="background-color:#FFFFFF;">&nbsp;Income From House Property</td>
   <td align="right" class="Amt" style="background-color:#FFFFFF;"><?php echo intval($resIFOS['HouseProperty']); ?>&nbsp;</td>
   <td align="right" class="TaxF" style="background-color:#FFFFFF;">0&nbsp;</td>
 </tr>
 <tr>
   <td class="Des" style="background-color:#FFFFFF;">&nbsp;Income From Dividend</td>
   <td align="right" class="Amt" style="background-color:#FFFFFF;"><?php echo intval($resIFOS['Divident']); ?>&nbsp;</td>
   <td align="right" class="TaxF" style="background-color:#FFFFFF;">0&nbsp;</td>
 </tr>
 <tr>
   <td class="Des" style="background-color:#FFFFFF;">&nbsp;Capital Gain</td>
   <td align="right" class="Amt" style="background-color:#FFFFFF;"><?php echo intval($resIFOS['CapitalGain']); ?>&nbsp;</td>
   <td align="right" class="TaxF" style="background-color:#FFFFFF;">0&nbsp;</td>
 </tr>
 <tr>
   <td class="Des" style="background-color:#FFFFFF;" valign="top">&nbsp;Income From Interest (Bank/ NSC/ PostOffice/ SavingBond/ Kishan Vikas patra)</td>
   <td align="right" class="Amt" style="background-color:#FFFFFF;" valign="top"><?php echo intval($resIFOS['Interest']); ?>&nbsp;</td>
   <td align="right" class="TaxF" style="background-color:#FFFFFF;" valign="top">0&nbsp;</td>
 </tr>
 <tr>
   <td class="Des" style="background-color:#FFFFFF;">&nbsp;Profit/Loss Bussiness</td>
   <td align="right" class="Amt" style="background-color:#FFFFFF;"><?php echo intval($resIFOS['ProfitLossBussi']); ?>&nbsp;</td>
   <td align="right" class="TaxF" style="background-color:#FFFFFF;">0&nbsp;</td>
 </tr>
 <tr>
   <td class="Des" style="background-color:#FFFFFF;">&nbsp;Any Other Income</td>
   <td align="right" class="Amt" style="background-color:#FFFFFF;"><?php echo intval($resIFOS['AnyOther1']); ?>&nbsp;</td>
   <td align="right" class="TaxF" style="background-color:#FFFFFF;">0&nbsp;</td>
 </tr>
 <tr>
   <td class="Des" style="background-color:#B5B5B5;">&nbsp;Total Income</td>
   <td align="right" class="Amt" style="background-color:#B5B5B5;"><?php echo intval($resIFOS['TotalAnyAmt']); ?>&nbsp;</td>
   <td align="right" class="TaxF" style="background-color:#B5B5B5;">0&nbsp;</td>
 </tr>
 </table>
 </td>
<?php /***************************** Close Income From other Source ***************************************/ ?>  
 </tr>
</table>
</td>
<td style="width:5px;">&nbsp;</td>
<td style="width:400px;" valign="top" >
<table border="0">
<?php $sqlSal = mysql_query("SELECT * FROM hrm_emplyee_tds_salary WHERE EmployeeID=".$_REQUEST['E']." AND Month=".$_REQUEST['M']." AND YearId=".$_REQUEST['YI'], $con); 
      $resSal = mysql_fetch_array($sqlSal);  ?> 
 <tr>
<?php /***************************** Open Salary ***************************************/ ?> 
 <td id="IncSal" style="display:none;" bgcolor="#D9D1E7">
 <table border="1">
  <tr><td colspan="3" align="center" style="font-family:Times New Roman;font-size:12px;width:400px;background-color:#7a6189;color:#FFFFFF;"><b>Salary</b></td></tr> 
  <tr>
   <td align="center" class="Des" style="background-color:#BCB198;">Description</td>
   <td align="center" class="Amt" style="background-color:#BCB198;">Amount</td>
   <td align="center" class="TaxF" style="background-color:#BCB198;">TaxFree</td>
  </tr>
 <tr>
   <td class="Des" style="background-color:#FFFFFF;"><a href="#" onClick="BasicSal(<?php echo $_REQUEST['E'].', '.$_REQUEST['M'].', '.$_REQUEST['YI']; ?>)" style="text-decoration:none;color:#000000;">&nbsp;Basic Salary</a></td>
   <td align="right" class="Amt" style="background-color:#FFFFFF;"><?php echo intval($resSal['BasicSalary_Amt']); ?>&nbsp;</td>
   <td align="right" class="TaxF" style="background-color:#FFFFFF;"><?php echo intval($resSal['BasicSalary_TaxFree']); ?>&nbsp;</td>
 </tr>
 <tr>
   <td class="Des" style="background-color:#FFFFFF;"><a href="#" onClick="ArrSal(<?php echo $_REQUEST['E'].', '.$_REQUEST['M'].', '.$_REQUEST['YI']; ?>)" style="text-decoration:none;color:#000000;">&nbsp;Arrear</a></td>
   <td align="right" class="Amt" style="background-color:#FFFFFF;"><?php echo intval($resSal['Arrear_Amt']); ?>&nbsp;</td>
   <td align="right" class="TaxF" style="background-color:#FFFFFF;"><?php echo intval($resSal['Arrear_TaxFree']); ?>&nbsp;</td>
 </tr>
 <tr>
   <td class="Des" style="background-color:#FFFFFF;"><a href="#" onClick="LeEnSal(<?php echo $_REQUEST['E'].', '.$_REQUEST['M'].', '.$_REQUEST['YI']; ?>)" style="text-decoration:none;color:#000000;">&nbsp;Leave Encash</a></td>
   <td align="right" class="Amt" style="background-color:#FFFFFF;"><?php echo intval($resSal['LeaveEncash_Amt']); ?>&nbsp;</td>
   <td align="right" class="TaxF" style="background-color:#FFFFFF;"><?php echo intval($resSal['LeaveEncash_TaxFree']); ?>&nbsp;</td>
 </tr>
 <tr>
   <td class="Des" style="background-color:#FFFFFF;">&nbsp;Conveyance</td>
   <td align="right" class="Amt" style="background-color:#FFFFFF;"><?php echo intval($resSal['Convey_Amt']); ?>&nbsp;</td>
   <td align="right" class="TaxF" style="background-color:#FFFFFF;"><?php echo intval($resSal['Convey_TaxFree']); ?>&nbsp;</td>
 </tr>
 <tr>
   <td class="Des" style="background-color:#FFFFFF;"><a href="#" onClick="BonSal(<?php echo $_REQUEST['E'].', '.$_REQUEST['M'].', '.$_REQUEST['YI']; ?>)" style="text-decoration:none;color:#000000;">&nbsp;Bonus</a></td>
   <td align="right" class="Amt" style="background-color:#FFFFFF;"><?php echo intval($resSal['Bonus_Amt']); ?>&nbsp;</td>
   <td align="right" class="TaxF" style="background-color:#FFFFFF;"><?php echo intval($resSal['Bonus_TaxFree']); ?>&nbsp;</td>
 </tr>
 <tr>
   <td class="Des" style="background-color:#FFFFFF;">&nbsp;Medical Allowance</td>
   <td align="right" class="Amt" style="background-color:#FFFFFF;"><?php echo intval($resSal['MedicalAllow_Amt']); ?>&nbsp;</td>
   <td align="right" class="TaxF" style="background-color:#FFFFFF;"><?php echo intval($resSal['MedicalAllow_TaxFree']); ?>&nbsp;</td>
 </tr>
 </table>
 </td>
<?php /***************************** Close Salary ***************************************/ ?>  
<?php $sqlAll = mysql_query("SELECT * FROM hrm_emplyee_tds_allowance WHERE EmployeeID=".$_REQUEST['E']." AND Month=".$_REQUEST['M']." AND YearId=".$_REQUEST['YI'], $con); 
      $resAll = mysql_fetch_array($sqlAll);  ?> 
<?php /***************************** Open Allowance ***************************************/ ?> 
<td id="IncAllow" style="display:none;" bgcolor="#D9D1E7">
 <table border="1">
  <tr><td colspan="3" align="center" style="font-family:Times New Roman;font-size:12px;width:400px;background-color:#7a6189;color:#FFFFFF;"><b>Allowance</b></td></tr> 
  <tr>
   <td align="center" class="Des" style="background-color:#BCB198;">Description</td>
   <td align="center" class="Amt" style="background-color:#BCB198;">Amount</td>
   <td align="center" class="TaxF" style="background-color:#BCB198;">TaxFree</td>
  </tr>
 <tr>
   <td class="Des" style="background-color:#FFFFFF;"><a href="#" onClick="HraSal(<?php echo $_REQUEST['E'].', '.$_REQUEST['M'].', '.$_REQUEST['YI']; ?>)" style="text-decoration:none;color:#000000;">&nbsp;House Rent Allowance</a></td>
   <td align="right" class="Amt" style="background-color:#FFFFFF;"><?php echo intval($resAll['Hra_Amt']); ?>&nbsp;</td>
   <td align="right" class="TaxF" style="background-color:#FFFFFF;"><?php echo intval($resAll['Hra_TaxFree']); ?>&nbsp;</td>
 </tr>
 <tr>
   <td class="Des" style="background-color:#FFFFFF;"><a href="#" onClick="SpecialSal(<?php echo $_REQUEST['E'].', '.$_REQUEST['M'].', '.$_REQUEST['YI']; ?>)" style="text-decoration:none;color:#000000;">&nbsp;Special Allowance</a></td>
   <td align="right" class="Amt" style="background-color:#FFFFFF;"><?php echo intval($resAll['SpeAllow_Amt']); ?>&nbsp;</td>
   <td align="right" class="TaxF" style="background-color:#FFFFFF;"><?php echo intval($resAll['SpeAllow_TaxFree']); ?>&nbsp;</td>
 </tr>
 <tr>
   <td class="Des" style="background-color:#FFFFFF;"><a href="#" onClick="TransPortSal(<?php echo $_REQUEST['E'].', '.$_REQUEST['M'].', '.$_REQUEST['YI']; ?>)" style="text-decoration:none;color:#000000;">&nbsp;Transport Allowance For Reaching</a></td>
   <td align="right" class="Amt" style="background-color:#FFFFFF;"><?php echo intval($resAll['Transport_Amt']); ?>&nbsp;</td>
   <td align="right" class="TaxF" style="background-color:#FFFFFF;"><?php echo intval($resAll['Transport_TaxFree']); ?>&nbsp;</td>
 </tr>
 <tr>
   <td class="Des" style="background-color:#FFFFFF;">&nbsp;Children Education Allowance</td>
   <td align="right" class="Amt" style="background-color:#FFFFFF;"><?php echo intval($resAll['CEA_Amt']); ?>&nbsp;</td>
   <td align="right" class="TaxF" style="background-color:#FFFFFF;"><?php echo intval($resAll['CEA_TaxFree']); ?>&nbsp;</td>
 </tr>
 <tr>
   <td class="Des" style="background-color:#FFFFFF;">&nbsp;Leave Travel Allowance</td>
   <td align="right" class="Amt" style="background-color:#FFFFFF;"><?php echo intval($resAll['LTA_Amt']); ?>&nbsp;</td>
   <td align="right" class="TaxF" style="background-color:#FFFFFF;"><?php echo intval($resAll['LTA_TaxFree']); ?>&nbsp;</td>
 </tr>
 <tr>
   <td class="Des" style="background-color:#FFFFFF;">&nbsp;Medical Reimbursement</td>
   <td align="right" class="Amt" style="background-color:#FFFFFF;"><?php echo intval($resAll['MR_Amt']); ?>&nbsp;</td>
   <td align="right" class="TaxF" style="background-color:#FFFFFF;"><?php echo intval($resAll['MR_TaxFree']); ?>&nbsp;</td>
 </tr>
  <tr>
   <td class="Des" style="background-color:#FFFFFF;"><a href="#" onClick="DASal(<?php echo $_REQUEST['E'].', '.$_REQUEST['M'].', '.$_REQUEST['YI']; ?>)" style="text-decoration:none;color:#000000;">&nbsp;Daily Allowance</a></td>
   <td align="right" class="Amt" style="background-color:#FFFFFF;"><?php echo intval($resAll['DA_Amt']); ?>&nbsp;</td>
   <td align="right" class="TaxF" style="background-color:#FFFFFF;"><?php echo intval($resAll['DA_TaxFree']); ?>&nbsp;</td>
 </tr>
 <tr>
   <td class="Des" style="background-color:#FFFFFF;">&nbsp;Variable Allowance</td>
   <td align="right" class="Amt" style="background-color:#FFFFFF;"><?php echo intval($resAll['VariableAllow_Amt']); ?>&nbsp;</td>
   <td align="right" class="TaxF" style="background-color:#FFFFFF;"><?php echo intval($resAll['VariableAllow_TaxFree']); ?>&nbsp;</td>
 </tr>
 <tr>
   <td class="Des" style="background-color:#FFFFFF;"><a href="#" onClick="IncentiveSal(<?php echo $_REQUEST['E'].', '.$_REQUEST['M'].', '.$_REQUEST['YI']; ?>)" style="text-decoration:none;color:#000000;">&nbsp;Incentive</a></td>
   <td align="right" class="Amt" style="background-color:#FFFFFF;"><?php echo intval($resAll['Incentive_Amt']); ?>&nbsp;</td>
   <td align="right" class="TaxF" style="background-color:#FFFFFF;"><?php echo intval($resAll['Incentive_TaxFree']); ?>&nbsp;</td>
 </tr>
 </table>
 </td>
<?php /***************************** Close Allowance ***************************************/ ?>  
 </tr>
</table>
</td>
</tr>
</table>
</body>
</html>