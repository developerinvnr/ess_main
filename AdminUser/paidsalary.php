<?php session_start();
if($_SESSION['login'] = true){ require_once('config/config.php'); } 
else {$msg= "Session Expiry...............";}


$sql=mysql_query("select mp.*,EmpCode,Fname,Sname,Lname from hrm_employee_monthlypayslip_".$_REQUEST['year']." mp INNER JOIN hrm_employee e ON mp.EmployeeID=e.EmployeeID INNER JOIN hrm_employee_general g ON mp.EmployeeID=g.EmployeeID where e.CompanyId=".$_REQUEST['com']." AND (e.EmpStatus='A' OR e.EmpStatus!='De' AND Month=".$_REQUEST['month']." AND Year=".$_REQUEST['year']." order by ECode ASC", $con); 
   
while($res=mysql_fetch_assoc($sql))
{   
if($res['Basic']!=0 OR $res['Hra']!=0 OR $res['Convance']!=0 OR $res['Special']!=0 OR $res['DA']!=0 OR $res['Incentive']!=0 OR $res['PerformancePay']!=0 OR $res['LeaveEncash']!=0 OR $res['VariableAdjustment']!=0 OR $res['CCA']!=0 OR $res['RA']!=0 OR $res['Bonus']!=0 OR $res['YCea']!=0 OR $res['YMr']!=0 OR $res['YLta']!=0 OR $res['Arr_Basic']!=0 OR $res['Arr_Hra']!=0 OR $res['Arr_Conv']!=0 OR $res['Arr_Spl']!=0 OR $res['Tot_Pf_Employee']!=0 OR $res['Arr_Pf']!=0 OR $res['ESCI_Employee']!=0 OR $res['Arr_Esic']!=0 OR $res['TDS']!=0 OR $res['CEA_Ded']!=0 OR $res['MA_Ded']!=0 OR $res['LTA_Ded']!=0 OR $res['VolContrib']!=0 OR $res['DeductAdjmt']!=0 OR $res['Bonus_Adjustment']!=0 OR $res['Bonus_Month']!=0 OR $res['PP_Inc']!=0){ 
 
$Gross=$res['Basic']+$res['Hra']+$res['Convance']+$res['Bonus_Month']+$res['Special']+$res['DA']+$res['Incentive']+$res['PerformancePay']+$res['LeaveEncash']+$res['VariableAdjustment']+$res['CCA']+$res['RA']+$res['Bonus']+$res['YCea']+$res['YMr']+$res['YLta']+$res['Arr_Basic']+$res['Arr_Hra']+$res['Arr_Conv']+$res['Arr_Spl']+$res['Arr_Bonus']+$res['Arr_RA']+$res['Arr_LvEnCash']+$res['Bonus_Adjustment']+$res['PP_Inc']; 

$TotDeduct=$res['Tot_Pf_Employee']+$res['Arr_Pf']+$res['ESCI_Employee']+$res['Arr_Esic']+$res['TDS']+$res['VolContrib']+$res['DeductAdjmt']+$res['NPS_Value']+$res['RecSplAllow']; 

$sqlck=mysql_query("select * from hrm_paid_salary where month=".$_REQUEST['month']." AND year=".$_REQUEST['year']." AND empid=".$res['EmployeeID']."",$con);  $rowck=mysql_num_rows($sqlck);
if($rowck>0){ $sUp=mysql_query("update hrm_paid_salary set total_paid='".$Gross."', total_deduct='".$TotDeduct."' where month=".$_REQUEST['month']." AND year=".$_REQUEST['year']." AND empid=".$res['EmployeeID']."",$con); }
else{ $sUp=mysql_query("insert into hrm_paid_salary(empid, month, year, fin_year, com, total_paid, total_deduct) values(".$res['EmployeeID'].", ".$_REQUEST['month'].", ".$_REQUEST['year'].", '".$_REQUEST['fin_year']."', ".$_REQUEST['com'].", '".$Gross."', '".$TotDeduct."')",$con) }
   
}

//https://vnrseeds.co.in/AdminUser/paidsalary.php?month=&year=&com=1&fin_year=23-24
?>

