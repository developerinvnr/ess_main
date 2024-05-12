<?php
require_once('config/config.php');
$m=$_REQUEST['m'];
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
$csv_output .= '"CEA",';
$csv_output .= '"MR",';
$csv_output .= '"LTA",';
$csv_output .= '"GROSS",';
$csv_output .= "\n";		

if($_REQUEST['m']==4){$s=date($FD.'-04-30'); $y=$FD;}elseif($_REQUEST['m']==5){$s=date($FD.'-05-31'); $y=$FD;}elseif($_REQUEST['m']==6){$s=date($FD.'-06-30'); $y=$FD;}elseif($_REQUEST['m']==7){$s=date($FD.'-07-31'); $y=$FD;}elseif($_REQUEST['m']==8){$s=date($FD.'-08-31'); $y=$FD;}elseif($_REQUEST['m']==9){$s=date($FD.'-09-30'); $y=$FD;}elseif($_REQUEST['m']==10){$s=date($FD.'-10-31'); $y=$FD;}elseif($_REQUEST['m']==11){$s=date($FD.'-11-30'); $y=$FD;}elseif($_REQUEST['m']==12){$s=date($FD.'-12-31'); $y=$FD;}elseif($_REQUEST['m']==1){$s=date($TD.'-01-31'); $y=$TD;}elseif($_REQUEST['m']==2){$s=date($TD.'-02-29'); $y=$TD;}elseif($_REQUEST['m']==3){$s=date($TD.'-03-31'); $y=$TD;}

if($_REQUEST['d']>0){ $sql=mysql_query("select hrm_employee.EmployeeID,EmpCode,Fname,Sname,Lname,DepartmentId from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee_general.DepartmentId=".$_REQUEST['d']." AND hrm_employee_general.DateJoining<'".$s."' AND hrm_employee.CompanyId=".$_REQUEST['c']." order by EmpCode ASC", $con); }
elseif($_REQUEST['d']==0){ $sql=mysql_query("select hrm_employee.EmployeeID,EmpCode,Fname,Sname,Lname,DepartmentId from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee_general.DateJoining<'".$s."' AND hrm_employee.CompanyId=".$_REQUEST['c']." order by EmpCode ASC", $con); }
 $sn=1; while($res=mysql_fetch_assoc($sql)){ 

$sql1=mysql_query("select * from hrm_employee_ctc c INNER JOIN ".$PayTable." mp ON c.EmployeeID=mp.EmployeeID where c.EmployeeID=".$res['EmployeeID']." AND CtcCreatedDate<='".$s."' AND Month=".$_REQUEST['m']." AND Year=".$y." AND Tot_Gross>0 AND CtcId=(select MAX(CtcId) from hrm_employee_ctc where hrm_employee_ctc.EmployeeID=".$res['EmployeeID']." AND CtcCreatedDate<='".$s."')", $con); 

  $res1=mysql_fetch_assoc($sql1);
  $sqlD=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$res['DepartmentId'], $con); $resD=mysql_fetch_assoc($sqlD);
  
if($res1['Basic']!=0 OR $res1['Hra']!=0 OR $res1['Convance']!=0 OR $res1['Special']!=0){ 
 
$csv_output .= '"'.str_replace('"', '""', $sn).'",';
$csv_output .= '"'.str_replace('"', '""', $res['EmpCode']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['Fname'].' '.$res['Sname'].' '.$res['Lname']).'",';
$csv_output .= '"'.str_replace('"', '""', $resD['DepartmentCode']).'",';
$csv_output .= '"'.str_replace('"', '""', $res1['BAS_Value']).'",';
$csv_output .= '"'.str_replace('"', '""', $res1['HRA_Value']).'",';
$csv_output .= '"'.str_replace('"', '""', $res1['CONV_Value']).'",';
$csv_output .= '"'.str_replace('"', '""', $res1['SPECIAL_ALL_Value']).'",';
$CEA=floatval($res1['CHILD_EDU_ALL_Value']/12);  $MR=floatval($res1['MED_REM_Value']/12);  $LTA=floatval($res1['LTA_Value']/12);
$csv_output .= '"'.str_replace('"', '""', $CEA).'",';
$csv_output .= '"'.str_replace('"', '""', $MR).'",';
$csv_output .= '"'.str_replace('"', '""', $LTA).'",';
$Gross=$res1['BAS_Value']+$res1['HRA_Value']+$res1['CONV_Value']+$res1['SPECIAL_ALL_Value']+$CEA+$MR+$LTA;
$csv_output .= '"'.str_replace('"', '""', $Gross).'",';
$csv_output .= "\n";
} $sn++; }

# Close the MySql connection
mysql_close($con);
# Set the headers so the file downloads
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Content-Length: " . strlen($csv_output));
header("Content-type: text/x-csv");
header("Content-Disposition: attachment; filename=EmpActualSalaryValuesEmpWise_".$PRD."_".$Dept."_Month".$_REQUEST['m'].".csv");
echo $csv_output;
exit;
}



?>