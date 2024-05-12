<?php
require_once('config/config.php');
$today=date("Y-m-d"); $timestamp = strtotime($today);
if($_REQUEST['y']!=0)
{ 
 $sY=mysql_query("select * from hrm_year where YearId=".$_REQUEST['y']."",$con); $rY=mysql_fetch_assoc($sY); 
 $FD=date("Y",strtotime($rY['FromDate'])); $TD=date("Y",strtotime($rY['ToDate'])); $PRD=$FD.'-'.$TD; 
 $ffd=date("y",strtotime($rY['FromDate'])); $ttd=date("y",strtotime($rY['ToDate']));
 $prevY=date("Y")-1; $nextY=date("Y")+1;
 if($FD==date("Y") AND $TD==$nextY)
 {
  if(date("m")==1)
  { $PayTable1='hrm_employee_monthlypayslip'; $PayTable2='hrm_employee_monthlypayslip'; }
  elseif(date("m")==2 OR date("m")==3)
  { $PayTable1='hrm_employee_monthlypayslip_'.$FD; $PayTable2='hrm_employee_monthlypayslip'; }
  else{ $PayTable1='hrm_employee_monthlypayslip'; $PayTable2='hrm_employee_monthlypayslip'; }
 }
 elseif($FD==$prevY AND $TD==date("Y"))
 {
  if(date("m")==1)
  { $PayTable1='hrm_employee_monthlypayslip'; $PayTable2='hrm_employee_monthlypayslip'; }
  else{ $PayTable1='hrm_employee_monthlypayslip_'.$FD; $PayTable2='hrm_employee_monthlypayslip'; }
 }
 else
 {
  $PayTable1='hrm_employee_monthlypayslip_'.$FD;
  $PayTable2='hrm_employee_monthlypayslip_'.$TD;
 }

}

/*************************************************************************************************************/
if($_REQUEST['action']='ReportsMonthlyValExport') 
{ 

  if($_REQUEST['d']>0)
  { $sqlD=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$_REQUEST['d'], $con); $resD=mysql_fetch_assoc($sqlD); $Dept=$resD['DepartmentCode']; }
  else { $Dept=''; }

$csv_output .= '"SNo",'; 
$csv_output .= '"EC",';
$csv_output .= '"NAME",';
for($i=4; $i<=15; $i++)
{ if($i==4){$mn='APR-'.$ffd;}elseif($i==5){$mn='MAY-'.$ffd;}elseif($i==6){$mn='JUN-'.$ffd;}elseif($i==7){$mn='JUL-'.$ffd;}elseif($i==8){$mn='AUG-'.$ffd;}elseif($i==9){$mn='SEP-'.$ffd;}elseif($i==10){$mn='OCT-'.$ffd;}elseif($i==11){$mn='NOV-'.$ffd;}elseif($i==12){$mn='DEC-'.$ffd;}elseif($i==13){$mn='JAN-'.$ttd;}elseif($i==14){$mn='FEB-'.$ttd;}elseif($i==15){$mn='MAR-'.$ttd;}
$csv_output .= '"'.$mn.'",';
}
$csv_output .= '"Total",';
$csv_output .= "\n";		

if($_REQUEST['d']>0){ $sql=mysql_query("select e.EmployeeID,EmpCode,Fname,Sname,Lname from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID where g.DepartmentId=".$_REQUEST['d']." AND g.DateJoining<'".$TD.'-03-31'."' AND e.CompanyId=".$_REQUEST['c']." order by e.EmpCode ASC", $con); }
elseif($_REQUEST['d']==0){ $sql=mysql_query("select e.EmployeeID,EmpCode,Fname,Sname,Lname from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID where g.DateJoining<'".$TD.'-03-31'."' AND e.CompanyId=".$_REQUEST['c']." order by e.EmpCode ASC", $con); }

 $sn=1; while($res=mysql_fetch_assoc($sql)){ 


$sql1=mysql_query("select Tot_GrossMonth from hrm_employee_ctc c INNER JOIN ".$PayTable1." mp ON c.EmployeeID=mp.EmployeeID where c.EmployeeID=".$res['EmployeeID']." AND CtcCreatedDate<='".date($FD.'-04-30')."' AND Month=04 AND Year=".$FD." AND Tot_Gross>0 AND CtcId=(select MAX(CtcId) from hrm_employee_ctc where hrm_employee_ctc.EmployeeID=".$res['EmployeeID']." AND CtcCreatedDate<='".date($FD.'-04-30')."')", $con); 
$sql2=mysql_query("select Tot_GrossMonth from hrm_employee_ctc c INNER JOIN ".$PayTable1." mp ON c.EmployeeID=mp.EmployeeID where c.EmployeeID=".$res['EmployeeID']." AND CtcCreatedDate<='".date($FD.'-05-31')."' AND Month=05 AND Year=".$FD." AND Tot_Gross>0 AND CtcId=(select MAX(CtcId) from hrm_employee_ctc where hrm_employee_ctc.EmployeeID=".$res['EmployeeID']." AND CtcCreatedDate<='".date($FD.'-05-31')."')", $con); 
$sql3=mysql_query("select Tot_GrossMonth from hrm_employee_ctc c INNER JOIN ".$PayTable1." mp ON c.EmployeeID=mp.EmployeeID where c.EmployeeID=".$res['EmployeeID']." AND CtcCreatedDate<='".date($FD.'-06-30')."' AND Month=06 AND Year=".$FD." AND Tot_Gross>0 AND CtcId=(select MAX(CtcId) from hrm_employee_ctc where hrm_employee_ctc.EmployeeID=".$res['EmployeeID']." AND CtcCreatedDate<='".date($FD.'-06-30')."')", $con); 
$sql4=mysql_query("select Tot_GrossMonth from hrm_employee_ctc c INNER JOIN ".$PayTable1." mp ON c.EmployeeID=mp.EmployeeID where c.EmployeeID=".$res['EmployeeID']." AND CtcCreatedDate<='".date($FD.'-07-31')."' AND Month=07 AND Year=".$FD." AND Tot_Gross>0 AND CtcId=(select MAX(CtcId) from hrm_employee_ctc where hrm_employee_ctc.EmployeeID=".$res['EmployeeID']." AND CtcCreatedDate<='".date($FD.'-07-31')."')", $con); 
$sql5=mysql_query("select Tot_GrossMonth from hrm_employee_ctc c INNER JOIN ".$PayTable1." mp ON c.EmployeeID=mp.EmployeeID where c.EmployeeID=".$res['EmployeeID']." AND CtcCreatedDate<='".date($FD.'-08-31')."' AND Month=08 AND Year=".$FD." AND Tot_Gross>0 AND CtcId=(select MAX(CtcId) from hrm_employee_ctc where hrm_employee_ctc.EmployeeID=".$res['EmployeeID']." AND CtcCreatedDate<='".date($FD.'-08-31')."')", $con); 
$sql6=mysql_query("select Tot_GrossMonth from hrm_employee_ctc c INNER JOIN ".$PayTable1." mp ON c.EmployeeID=mp.EmployeeID where c.EmployeeID=".$res['EmployeeID']." AND CtcCreatedDate<='".date($FD.'-09-30')."' AND Month=09 AND Year=".$FD." AND Tot_Gross>0 AND CtcId=(select MAX(CtcId) from hrm_employee_ctc where hrm_employee_ctc.EmployeeID=".$res['EmployeeID']." AND CtcCreatedDate<='".date($FD.'-09-30')."')", $con); 
$sql7=mysql_query("select Tot_GrossMonth from hrm_employee_ctc c INNER JOIN ".$PayTable1." mp ON c.EmployeeID=mp.EmployeeID where c.EmployeeID=".$res['EmployeeID']." AND CtcCreatedDate<='".date($FD.'-10-31')."' AND Month=10 AND Year=".$FD." AND Tot_Gross>0 AND CtcId=(select MAX(CtcId) from hrm_employee_ctc where hrm_employee_ctc.EmployeeID=".$res['EmployeeID']." AND CtcCreatedDate<='".date($FD.'-10-31')."')", $con); 
$sql8=mysql_query("select Tot_GrossMonth from hrm_employee_ctc c INNER JOIN ".$PayTable1." mp ON c.EmployeeID=mp.EmployeeID where c.EmployeeID=".$res['EmployeeID']." AND CtcCreatedDate<='".date($FD.'-11-30')."' AND Month=11 AND Year=".$FD." AND Tot_Gross>0 AND CtcId=(select MAX(CtcId) from hrm_employee_ctc where hrm_employee_ctc.EmployeeID=".$res['EmployeeID']." AND CtcCreatedDate<='".date($FD.'-11-30')."')", $con); 
$sql9=mysql_query("select Tot_GrossMonth from hrm_employee_ctc c INNER JOIN ".$PayTable1." mp ON c.EmployeeID=mp.EmployeeID where c.EmployeeID=".$res['EmployeeID']." AND CtcCreatedDate<='".date($FD.'-12-31')."' AND Month=12 AND Year=".$FD." AND Tot_Gross>0 AND CtcId=(select MAX(CtcId) from hrm_employee_ctc where hrm_employee_ctc.EmployeeID=".$res['EmployeeID']." AND CtcCreatedDate<='".date($FD.'-12-31')."')", $con); 
$sql10=mysql_query("select Tot_GrossMonth from hrm_employee_ctc c INNER JOIN ".$PayTable2." mp ON c.EmployeeID=mp.EmployeeID where c.EmployeeID=".$res['EmployeeID']." AND CtcCreatedDate<='".date($TD.'-01-31')."' AND Month=01 AND Year=".$TD." AND Tot_Gross>0 AND CtcId=(select MAX(CtcId) from hrm_employee_ctc where hrm_employee_ctc.EmployeeID=".$res['EmployeeID']." AND CtcCreatedDate<='".date($TD.'-01-31')."')", $con); 
$sql11=mysql_query("select Tot_GrossMonth from hrm_employee_ctc c INNER JOIN ".$PayTable2." mp ON c.EmployeeID=mp.EmployeeID where c.EmployeeID=".$res['EmployeeID']." AND CtcCreatedDate<='".date($TD.'-02-29')."' AND Month=02 AND Year=".$TD." AND Tot_Gross>0 AND CtcId=(select MAX(CtcId) from hrm_employee_ctc where hrm_employee_ctc.EmployeeID=".$res['EmployeeID']." AND CtcCreatedDate<='".date($TD.'-02-29')."')", $con); 
$sql12=mysql_query("select Tot_GrossMonth from hrm_employee_ctc c INNER JOIN ".$PayTable2." mp ON c.EmployeeID=mp.EmployeeID where c.EmployeeID=".$res['EmployeeID']." AND CtcCreatedDate<='".date($TD.'-03-31')."' AND Month=03 AND Year=".$TD." AND Tot_Gross>0 AND CtcId=(select MAX(CtcId) from hrm_employee_ctc where hrm_employee_ctc.EmployeeID=".$res['EmployeeID']." AND CtcCreatedDate<='".date($TD.'-03-31')."')", $con); 
 
 
$res2=mysql_fetch_assoc($sql2); $res1=mysql_fetch_assoc($sql1); $res3=mysql_fetch_assoc($sql3);
$res4=mysql_fetch_assoc($sql4); $res5=mysql_fetch_assoc($sql5); $res6=mysql_fetch_assoc($sql6);
$res7=mysql_fetch_assoc($sql7); $res8=mysql_fetch_assoc($sql8); $res9=mysql_fetch_assoc($sql9);
$res10=mysql_fetch_assoc($sql10); $res11=mysql_fetch_assoc($sql11); $res12=mysql_fetch_assoc($sql12);

 
if($res1['Tot_GrossMonth']>0 OR $res2['Tot_GrossMonth']>0 OR $res3['Tot_GrossMonth']>0 OR $res4['Tot_GrossMonth']>0 OR $res5['Tot_GrossMonth']>0 OR $res6['Tot_GrossMonth']>0 OR $res7['Tot_GrossMonth']>0 OR $res8['Tot_GrossMonth']>0 OR $res9['Tot_GrossMonth']>0 OR $res10['Tot_GrossMonth']>0 OR $res11['Tot_GrossMonth']>0 OR $res12['Tot_GrossMonth']>0){
 
$csv_output .= '"'.str_replace('"', '""', $sn).'",';
$csv_output .= '"'.str_replace('"', '""', $res['EmpCode']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['Fname'].' '.$res['Sname'].' '.$res['Lname']).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res1['Tot_GrossMonth']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res2['Tot_GrossMonth']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res3['Tot_GrossMonth']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res4['Tot_GrossMonth']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res5['Tot_GrossMonth']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res6['Tot_GrossMonth']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res7['Tot_GrossMonth']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res8['Tot_GrossMonth']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res9['Tot_GrossMonth']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res10['Tot_GrossMonth']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res11['Tot_GrossMonth']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res12['Tot_GrossMonth']))).'",';
$TotGrossMonth=$res1['Tot_GrossMonth']+$res2['Tot_GrossMonth']+$res3['Tot_GrossMonth']+$res4['Tot_GrossMonth']+$res5['Tot_GrossMonth']+$res6['Tot_GrossMonth']+$res7['Tot_GrossMonth']+$res8['Tot_GrossMonth']+$res9['Tot_GrossMonth']+$res10['Tot_GrossMonth']+$res11['Tot_GrossMonth']+$res12['Tot_GrossMonth'];
$csv_output .= '"'.str_replace('"', '""', number_format($TotGrossMonth)).'",';	
$csv_output .= "\n";
} $sn++; }

# Close the MySql connection
mysql_close($con);
# Set the headers so the file downloads
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Content-Length: " . strlen($csv_output));
header("Content-type: text/x-csv");
header("Content-Disposition: attachment; filename=EmpActualSalaryValues_".$PRD."_".$Dept.".csv");
echo $csv_output;
exit;
}






if($_REQUEST['action']='ReportsEmpMonthlyValExport') 
{ 

  if($_REQUEST['d']>0)
  { $sqlD=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$_REQUEST['d'], $con); $resD=mysql_fetch_assoc($sqlD); $Dept=$resD['DepartmentCode']; }
  else { $Dept=''; }

$csv_output .= '"SNo",'; 
$csv_output .= '"EC",';
$csv_output .= '"NAME",';
$csv_output .= '"DEPARTMENT",';
$csv_output .= '"BASIC",';
$csv_output .= '"HRA",';
$csv_output .= '"CONV",';
$csv_output .= '"SPECIAL",';
$csv_output .= '"DA",';
$csv_output .= '"INCENT",';
$csv_output .= '"PP",';
$csv_output .= '"LEAVE ENCASH",';
$csv_output .= '"VAR ADJUST",';
$csv_output .= '"CCA",';
$csv_output .= '"RA",';
$csv_output .= '"BONUS",';
$csv_output .= '"CEA",';
$csv_output .= '"MR",';
$csv_output .= '"LTA",';
$csv_output .= '"ARR BASIC",';
$csv_output .= '"ARR HRA",';
$csv_output .= '"ARR CONV",';
$csv_output .= '"ARR SPECIAL",';
$csv_output .= '"GROSS",';
$csv_output .= '"PF",';
$csv_output .= '"ARR PF",';
$csv_output .= '"ESIC",';
$csv_output .= '"ARR ESIC",';
$csv_output .= '"TDS",';
$csv_output .= '"DEDCT CEA",';
$csv_output .= '"DEDCT MR",';
$csv_output .= '"DEDCT LTA",';
$csv_output .= '"VAL CONT",';
$csv_output .= '"DEDCT ADJUST",';
$csv_output .= '"TOTAL DEDUCT",';
$csv_output .= '"TOTAL NET AMOUNT",';
$csv_output .= "\n";		

if($_REQUEST['m']<=12){$m=$_REQUEST['m']; $y=$FD;}elseif($_REQUEST['m']==13){$m=1; $y=$TD;}elseif($_REQUEST['m']==14){$m=2; $y=$TD;}elseif($_REQUEST['m']==15){$m=3; $y=$TD;}
if($_REQUEST['d']>0){ $sql=mysql_query("select hrm_employee_monthlypayslip.*,EmpCode,Fname,Sname,Lname from hrm_employee_monthlypayslip INNER JOIN hrm_employee ON hrm_employee_monthlypayslip.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_general ON hrm_employee_monthlypayslip.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee.CompanyId=".$_REQUEST['c']." AND Month=".$m." AND Year=".$y." AND hrm_employee_general.DepartmentId=".$_REQUEST['d']." order by EmpCode ASC", $con); } 
elseif($_REQUEST['d']==0){ $sql=mysql_query("select hrm_employee_monthlypayslip.*,EmpCode,Fname,Sname,Lname from hrm_employee_monthlypayslip INNER JOIN hrm_employee ON hrm_employee_monthlypayslip.EmployeeID=hrm_employee.EmployeeID where hrm_employee.CompanyId=".$_REQUEST['c']." AND Month=".$m." AND Year=".$y." AND DepartmentId!=17 AND DepartmentId!=18 AND DepartmentId!=23 order by EmpCode ASC, DepartmentId ASC", $con); }
   
$sn=1; while($res=mysql_fetch_assoc($sql)){ 
$sqlD=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$res['DepartmentId'], $con); $resD=mysql_fetch_assoc($sqlD);
  
if($res['Basic']!=0 OR $res['Hra']!=0 OR $res['Convance']!=0 OR $res['Special']!=0 OR $res['DA']!=0 OR $res['Incentive']!=0 OR $res['PerformancePay']!=0 OR $res['LeaveEncash']!=0 OR $res['VariableAdjustment']!=0 OR $res['CCA']!=0 OR $res['RA']!=0 OR $res['Bonus']!=0 OR $res['YCea']!=0 OR $res['YMr']!=0 OR $res['YLta']!=0 OR $res['Arr_Basic']!=0 OR $res['Arr_Hra']!=0 OR $res['Arr_Conv']!=0 OR $res['Arr_Spl']!=0 OR $res['Tot_Pf_Employee']!=0 OR $res['Arr_Pf']!=0 OR $res['ESCI_Employee']!=0 OR $res['Arr_Esic']!=0 OR $res['TDS']!=0 OR $res['CEA_Ded']!=0 OR $res['MA_Ded']!=0 OR $res['LTA_Ded']!=0 OR $res['VolContrib']!=0 OR $res['DeductAdjmt']!=0){    
 
$csv_output .= '"'.str_replace('"', '""', $sn).'",';
$csv_output .= '"'.str_replace('"', '""', $res['EmpCode']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['Fname'].' '.$res['Sname'].' '.$res['Lname']).'",';
$csv_output .= '"'.str_replace('"', '""', $resD['DepartmentCode']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['Basic']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['Hra']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['Convance']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['Special']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['DA']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['Incentive']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['PerformancePay']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['LeaveEncash']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['VariableAdjustment']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['CCA']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['RA']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['Bonus']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['YCea']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['YMr']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['YLta']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['Arr_Basic']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['Arr_Hra']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['Arr_Conv']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['Arr_Spl']).'",';
$Gross=$res['Basic']+$res['Hra']+$res['Convance']+$res['Special']+$res['DA']+$res['Incentive']+$res['PerformancePay']+$res['LeaveEncash']+$res['VariableAdjustment']+$res['CCA']+$res['RA']+$res['Bonus']+$res['YCea']+$res['YMr']+$res['YLta']+$res['Arr_Basic']+$res['Arr_Hra']+$res['Arr_Conv']+$res['Arr_Spl'];

$csv_output .= '"'.str_replace('"', '""', $Gross).'",';
$csv_output .= '"'.str_replace('"', '""', $res['Tot_Pf_Employee']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['Arr_Pf']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['ESCI_Employee']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['Arr_Esic']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['TDS']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['CEA_Ded']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['MA_Ded']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['LTA_Ded']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['VolContrib']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['DeductAdjmt']).'",';
$TotDeduct=$res['Tot_Pf_Employee']+$res['Arr_Pf']+$res['ESCI_Employee']+$res['Arr_Esic']+$res['TDS']+$res['CEA_Ded']+$res['MA_Ded']+$res['LTA_Ded']+$res['VolContrib']+$res['DeductAdjmt'];

$csv_output .= '"'.str_replace('"', '""', $TotDeduct).'",';
$csv_output .= '"'.str_replace('"', '""', $TotalNetAmt).'",';
$csv_output .= "\n";
} $sn++; }

# Close the MySql connection
mysql_close($con);
# Set the headers so the file downloads
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Content-Length: " . strlen($csv_output));
header("Content-type: text/x-csv");
header("Content-Disposition: attachment; filename=EmpSalaryValuesEmpWise_".$PRD."_".$Dept.".csv");
echo $csv_output;
exit;
}



?>