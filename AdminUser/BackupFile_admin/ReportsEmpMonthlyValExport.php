<?php
require_once('config/config.php');
$m=$_REQUEST['m'];
if($_REQUEST['y']!=0)
{ 
 $sY=mysql_query("select * from hrm_year where YearId=".$_REQUEST['y']."",$con); $rY=mysql_fetch_assoc($sY); 
 $FD=date("Y",strtotime($rY['FromDate'])); $TD=date("Y",strtotime($rY['ToDate'])); $PRD=$FD.'-'.$TD; 
 $ffd=date("y",strtotime($rY['FromDate'])); $ttd=date("y",strtotime($rY['ToDate']));
 $prevY=date("Y")-1; $nextY=date("Y")+1;
 if($FD==date("Y") AND $TD==$nextY)
 {
  if(date("m")==1)
  { 
   if($m==4 OR $m==5 OR $m==6 OR $m==7 OR $m==8 OR $m==9 OR $m==10 OR $m==11){ $PayTable='hrm_employee_monthlypayslip_'.$FD; }else{ $PayTable='hrm_employee_monthlypayslip'; }
  }
  elseif(date("m")==2 OR date("m")==3)
  { 
   if($m==4 OR $m==5 OR $m==6 OR $m==7 OR $m==8 OR $m==9 OR $m==10 OR $m==11 OR $m==12){ $PayTable='hrm_employee_monthlypayslip_'.$FD; }else{ $PayTable='hrm_employee_monthlypayslip'; }
  }
  else
  {
   $PayTable='hrm_employee_monthlypayslip'; 
  }
 }
 elseif($FD==$prevY AND $TD==date("Y"))
 {
  if(date("m")==1)
  { $PayTable='hrm_employee_monthlypayslip'; }
  else
  { 
    if($m==4 OR $m==5 OR $m==6 OR $m==7 OR $m==8 OR $m==9 OR $m==10 OR $m==11 OR $m==12){ $PayTable='hrm_employee_monthlypayslip_'.$FD; }else{ $PayTable='hrm_employee_monthlypayslip'; }
  }
 }
 else
 {
  if($m==4 OR $m==5 OR $m==6 OR $m==7 OR $m==8 OR $m==9 OR $m==10 OR $m==11 OR $m==12){ $PayTable='hrm_employee_monthlypayslip_'.$FD; }else{ $PayTable='hrm_employee_monthlypayslip_'.$TD; }
 }

}
/*************************************************************************************************************/
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

if($_REQUEST['d']>0){ $sql=mysql_query("select mp.*,EmpCode,Fname,Sname,Lname from ".$PayTable." mp INNER JOIN hrm_employee e ON mp.EmployeeID=e.EmployeeID INNER JOIN hrm_employee_general g ON mp.EmployeeID=g.EmployeeID where e.CompanyId=".$_REQUEST['c']." AND Month=".$m." AND Year=".$y." AND g.DepartmentId=".$_REQUEST['d']." order by EmpCode ASC", $con); } 
   elseif($_REQUEST['d']==0){ $sql=mysql_query("select mp.*,EmpCode,Fname,Sname,Lname from ".$PayTable." mp INNER JOIN hrm_employee e ON mp.EmployeeID=e.EmployeeID where e.CompanyId=".$_REQUEST['c']." AND Month=".$m." AND Year=".$y." order by EmpCode ASC, DepartmentId ASC", $con); }
   
   //AND DepartmentId!=17 AND DepartmentId!=18 AND DepartmentId!=23
   
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

$TotalNetAmt=$Gross-$TotDeduct;
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