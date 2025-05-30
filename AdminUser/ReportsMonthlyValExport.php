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
  { $sqlD=mysql_query("select department_name as DepartmentCode from core_departments where id=".$_REQUEST['d'], $con); $resD=mysql_fetch_assoc($sqlD); $Dept=$resD['DepartmentCode']; }
  else { $Dept=''; }

$csv_output .= '"SNo",'; 
$csv_output .= '"Components",';
for($i=4; $i<=15; $i++)
{ if($i==4){$mn='APR-'.$ffd;}elseif($i==5){$mn='MAY-'.$ffd;}elseif($i==6){$mn='JUN-'.$ffd;}elseif($i==7){$mn='JUL-'.$ffd;}elseif($i==8){$mn='AUG-'.$ffd;}elseif($i==9){$mn='SEP-'.$ffd;}elseif($i==10){$mn='OCT-'.$ffd;}elseif($i==11){$mn='NOV-'.$ffd;}elseif($i==12){$mn='DEC-'.$ffd;}elseif($i==13){$mn='JAN-'.$ttd;}elseif($i==14){$mn='FEB-'.$ttd;}elseif($i==15){$mn='MAR-'.$ttd;}
$csv_output .= '"'.$mn.'",';
}
$csv_output .= '"Total",';
$csv_output .= "\n";		

$Selstar='SUM(Basic) as Bas,SUM(Hra) as Hra,SUM(Convance) as Con, SUM(Car_Allowance) as CarAll, SUM(Bonus_Month) as BonusM, SUM(VarRemburmnt) as VarRemburmnt, SUM(TA) as Ta, SUM(Special) as Spe,SUM(Bonus) as Bon,SUM(DA) as Da,SUM(Arreares) as Arr,SUM(LeaveEncash) as Lea,SUM(Incentive) as Inc,SUM(VariableAdjustment) as Var,SUM(PerformancePay) as Per,SUM(CCA) as Cca,SUM(RA) as Ra,SUM(Arr_Basic) as ArrBas,SUM(Arr_Hra) as ArrHra,SUM(Arr_Spl) as ArrSpl,SUM(Arr_Conv) as ArrCon,SUM(YCea) as Ycea,SUM(YMr) as Ymr,SUM(YLta) as Ylta,SUM(Tot_Pf_Employee) as TotPfEmp,SUM(TDS) as Tds,SUM(ESCI_Employee) as Esic,SUM(Arr_Pf) as ArrPf,SUM(Arr_Esic) as ArrEsic,SUM(VolContrib) as ValCon,SUM(DeductAdjmt) as DedAduj,SUM(CEA_Ded) as Dedcea,SUM(MA_Ded) as dedma,SUM(LTA_Ded) as Dedlta, SUM(Arr_LvEnCash) as ArrLvEncash, SUM(Arr_Bonus) as ArrBonus, SUM(Arr_RA) as ArrRA, SUM(Bonus_Adjustment) as Bonus_Adjustment, SUM(PP_Inc) as PP_Inc, SUM(NPS_Value) as NPS, SUM(RecSplAllow) as RecSplAllow, SUM(PP_year) as PPy, SUM(Deputation_Allow)as Deputation_Allow, SUM(IDCard_Recovery)as IDCard_Recovery, SUM(Communication_Allow) as Communication_Allow, SUM(Car_Allow) as Car_Allow, SUM(Arr_Communication_Allow) as Arr_Communication_Allow,'; 

$con4="(e.EmpStatus='A' OR (e.EmpStatus='D' AND (e.DateOfSepration='0000-00-00' OR e.DateOfSepration>='".$FD."-04-01')))";
    $con5="(e.EmpStatus='A' OR (e.EmpStatus='D' AND (e.DateOfSepration='0000-00-00' OR e.DateOfSepration>='".$FD."-05-01')))";
    $con6="(e.EmpStatus='A' OR (e.EmpStatus='D' AND (e.DateOfSepration='0000-00-00' OR e.DateOfSepration>='".$FD."-06-01')))";
    $con7="(e.EmpStatus='A' OR (e.EmpStatus='D' AND (e.DateOfSepration='0000-00-00' OR e.DateOfSepration>='".$FD."-07-01')))";
    $con8="(e.EmpStatus='A' OR (e.EmpStatus='D' AND (e.DateOfSepration='0000-00-00' OR e.DateOfSepration>='".$FD."-08-01')))";
    $con9="(e.EmpStatus='A' OR (e.EmpStatus='D' AND (e.DateOfSepration='0000-00-00' OR e.DateOfSepration>='".$FD."-09-01')))";
    $con10="(e.EmpStatus='A' OR (e.EmpStatus='D' AND (e.DateOfSepration='0000-00-00' OR e.DateOfSepration>='".$FD."-10-01')))";
    $con11="(e.EmpStatus='A' OR (e.EmpStatus='D' AND (e.DateOfSepration='0000-00-00' OR e.DateOfSepration>='".$FD."-11-01')))";
    $con12="(e.EmpStatus='A' OR (e.EmpStatus='D' AND (e.DateOfSepration='0000-00-00' OR e.DateOfSepration>='".$FD."-12-01')))";
    $con1="(e.EmpStatus='A' OR (e.EmpStatus='D' AND (e.DateOfSepration='0000-00-00' OR e.DateOfSepration>='".$TD."-01-01')))";
    $con2="(e.EmpStatus='A' OR (e.EmpStatus='D' AND (e.DateOfSepration='0000-00-00' OR e.DateOfSepration>='".$TD."-02-01')))";
    $con3="(e.EmpStatus='A' OR (e.EmpStatus='D' AND (e.DateOfSepration='0000-00-00' OR e.DateOfSepration>='".$TD."-03-01')))";

if($_REQUEST['d']>0){
 $sql4=mysql_query("select ".$Selstar." from ".$PayTable1." mp INNER JOIN hrm_employee e ON mp.EmployeeID=e.EmployeeID INNER JOIN hrm_employee_general g ON mp.EmployeeID=g.EmployeeID where g.DepartmentId=".$_REQUEST['d']." AND e.CompanyId=".$_REQUEST['c']." AND ".$con4." AND Month=4 AND Year=".$FD, $con); 
 $sql5=mysql_query("select ".$Selstar." from ".$PayTable1." mp INNER JOIN hrm_employee e ON mp.EmployeeID=e.EmployeeID INNER JOIN hrm_employee_general g ON mp.EmployeeID=g.EmployeeID where g.DepartmentId=".$_REQUEST['d']." AND e.CompanyId=".$_REQUEST['c']." AND ".$con5." AND Month=5 AND Year=".$FD, $con); 
 $sql6=mysql_query("select ".$Selstar." from ".$PayTable1." mp INNER JOIN hrm_employee e ON mp.EmployeeID=e.EmployeeID INNER JOIN hrm_employee_general g ON mp.EmployeeID=g.EmployeeID where g.DepartmentId=".$_REQUEST['d']." AND e.CompanyId=".$_REQUEST['c']." AND ".$con6." AND Month=6 AND Year=".$FD, $con); 
 $sql7=mysql_query("select ".$Selstar." from ".$PayTable1." mp INNER JOIN hrm_employee e ON mp.EmployeeID=e.EmployeeID INNER JOIN hrm_employee_general g ON mp.EmployeeID=g.EmployeeID where g.DepartmentId=".$_REQUEST['d']." AND e.CompanyId=".$_REQUEST['c']." AND ".$con7." AND Month=7 AND Year=".$FD, $con); 
 $sql8=mysql_query("select ".$Selstar." from ".$PayTable1." mp INNER JOIN hrm_employee e ON mp.EmployeeID=e.EmployeeID INNER JOIN hrm_employee_general g ON mp.EmployeeID=g.EmployeeID where g.DepartmentId=".$_REQUEST['d']." AND e.CompanyId=".$_REQUEST['c']." AND ".$con8." AND Month=8 AND Year=".$FD, $con); 
 $sql9=mysql_query("select ".$Selstar." from ".$PayTable1." mp INNER JOIN hrm_employee e ON mp.EmployeeID=e.EmployeeID INNER JOIN hrm_employee_general g ON mp.EmployeeID=g.EmployeeID where g.DepartmentId=".$_REQUEST['d']." AND e.CompanyId=".$_REQUEST['c']." AND ".$con9." AND Month=9 AND Year=".$FD, $con); 
 $sql10=mysql_query("select ".$Selstar." from ".$PayTable1." mp INNER JOIN hrm_employee e ON mp.EmployeeID=e.EmployeeID INNER JOIN hrm_employee_general g ON mp.EmployeeID=g.EmployeeID where g.DepartmentId=".$_REQUEST['d']." AND e.CompanyId=".$_REQUEST['c']." AND ".$con10." AND Month=10 AND Year=".$FD, $con); 
 $sql11=mysql_query("select ".$Selstar." from ".$PayTable1." mp INNER JOIN hrm_employee e ON mp.EmployeeID=e.EmployeeID INNER JOIN hrm_employee_general g ON mp.EmployeeID=g.EmployeeID where g.DepartmentId=".$_REQUEST['d']." AND e.CompanyId=".$_REQUEST['c']." AND ".$con11." AND Month=11 AND Year=".$FD, $con); 
 $sql12=mysql_query("select ".$Selstar." from ".$PayTable1." mp INNER JOIN hrm_employee e ON mp.EmployeeID=e.EmployeeID INNER JOIN hrm_employee_general g ON mp.EmployeeID=g.EmployeeID where g.DepartmentId=".$_REQUEST['d']." AND e.CompanyId=".$_REQUEST['c']." AND ".$con12." AND Month=12 AND Year=".$FD, $con); 
 $sql1=mysql_query("select ".$Selstar." from ".$PayTable2." mp INNER JOIN hrm_employee e ON mp.EmployeeID=e.EmployeeID INNER JOIN hrm_employee_general g ON mp.EmployeeID=g.EmployeeID where g.DepartmentId=".$_REQUEST['d']." AND e.CompanyId=".$_REQUEST['c']." AND ".$con1." AND Month=1 AND Year=".$TD, $con); 
 $sql2=mysql_query("select ".$Selstar." from ".$PayTable2." mp INNER JOIN hrm_employee e ON mp.EmployeeID=e.EmployeeID INNER JOIN hrm_employee_general g ON mp.EmployeeID=g.EmployeeID where g.DepartmentId=".$_REQUEST['d']." AND e.CompanyId=".$_REQUEST['c']." AND ".$con2." AND Month=2 AND Year=".$TD, $con); 
 $sql3=mysql_query("select ".$Selstar." from ".$PayTable2." mp INNER JOIN hrm_employee e ON mp.EmployeeID=e.EmployeeID INNER JOIN hrm_employee_general g ON mp.EmployeeID=g.EmployeeID where g.DepartmentId=".$_REQUEST['d']." AND e.CompanyId=".$_REQUEST['c']." AND ".$con3." AND Month=3 AND Year=".$TD, $con); 
} elseif($_REQUEST['d']==0){
 $sql4=mysql_query("select ".$Selstar." from ".$PayTable1." mp INNER JOIN hrm_employee e ON mp.EmployeeID=e.EmployeeID where e.CompanyId=".$_REQUEST['c']." AND ".$con4." AND Month=4 AND Year=".$FD, $con); 
 $sql5=mysql_query("select ".$Selstar." from ".$PayTable1." mp INNER JOIN hrm_employee e ON mp.EmployeeID=e.EmployeeID where e.CompanyId=".$_REQUEST['c']." AND ".$con5." AND Month=5 AND Year=".$FD, $con); 
 $sql6=mysql_query("select ".$Selstar." from ".$PayTable1." mp INNER JOIN hrm_employee e ON mp.EmployeeID=e.EmployeeID where e.CompanyId=".$_REQUEST['c']." AND ".$con6." AND Month=6 AND Year=".$FD, $con); 
 $sql7=mysql_query("select ".$Selstar." from ".$PayTable1." mp INNER JOIN hrm_employee e ON mp.EmployeeID=e.EmployeeID where e.CompanyId=".$_REQUEST['c']." AND ".$con7." AND Month=7 AND Year=".$FD, $con); 
 $sql8=mysql_query("select ".$Selstar." from ".$PayTable1." mp INNER JOIN hrm_employee e ON mp.EmployeeID=e.EmployeeID where e.CompanyId=".$_REQUEST['c']." AND ".$con8." AND Month=8 AND Year=".$FD, $con); 
 $sql9=mysql_query("select ".$Selstar." from ".$PayTable1." mp INNER JOIN hrm_employee e ON mp.EmployeeID=e.EmployeeID where e.CompanyId=".$_REQUEST['c']." AND ".$con9." AND Month=9 AND Year=".$FD, $con); 
 $sql10=mysql_query("select ".$Selstar." from ".$PayTable1." mp INNER JOIN hrm_employee e ON mp.EmployeeID=e.EmployeeID where e.CompanyId=".$_REQUEST['c']." AND ".$con10." AND Month=10 AND Year=".$FD, $con); 
 $sql11=mysql_query("select ".$Selstar." from ".$PayTable1." mp INNER JOIN hrm_employee e ON mp.EmployeeID=e.EmployeeID where e.CompanyId=".$_REQUEST['c']." AND ".$con11." AND Month=11 AND Year=".$FD, $con); 
 $sql12=mysql_query("select ".$Selstar." from ".$PayTable1." mp INNER JOIN hrm_employee e ON mp.EmployeeID=e.EmployeeID where e.CompanyId=".$_REQUEST['c']." AND ".$con12." AND Month=12 AND Year=".$FD, $con); 
 $sql1=mysql_query("select ".$Selstar." from ".$PayTable2." mp INNER JOIN hrm_employee e ON mp.EmployeeID=e.EmployeeID where e.CompanyId=".$_REQUEST['c']." AND ".$con1." AND Month=1 AND Year=".$TD, $con); 
 $sql2=mysql_query("select ".$Selstar." from ".$PayTable2." mp INNER JOIN hrm_employee e ON mp.EmployeeID=e.EmployeeID where e.CompanyId=".$_REQUEST['c']." AND ".$con2." AND Month=2 AND Year=".$TD, $con); 
 $sql3=mysql_query("select ".$Selstar." from ".$PayTable2." mp INNER JOIN hrm_employee e ON mp.EmployeeID=e.EmployeeID where e.CompanyId=".$_REQUEST['c']." AND ".$con3." AND Month=3 AND Year=".$TD, $con); }
 $res4=mysql_fetch_assoc($sql4); $res5=mysql_fetch_assoc($sql5); $res6=mysql_fetch_assoc($sql6); $res7=mysql_fetch_assoc($sql7); $res8=mysql_fetch_assoc($sql8);
 $res9=mysql_fetch_assoc($sql9); $res10=mysql_fetch_assoc($sql10); $res11=mysql_fetch_assoc($sql11); $res12=mysql_fetch_assoc($sql12); $res1=mysql_fetch_assoc($sql1); 
 $res2=mysql_fetch_assoc($sql2); $res3=mysql_fetch_assoc($sql3);
 
$csv_output .= '"'.str_replace('"', '""', '1').'",';
$csv_output .= '"'.str_replace('"', '""', 'BASIC').'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res4['Bas']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res5['Bas']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res6['Bas']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res7['Bas']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res8['Bas']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res9['Bas']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res10['Bas']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res11['Bas']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res12['Bas']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res1['Bas']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res2['Bas']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res3['Bas']))).'",';
$TotBas=$res4['Bas']+$res5['Bas']+$res6['Bas']+$res7['Bas']+$res8['Bas']+$res9['Bas']+$res10['Bas']+$res11['Bas']+$res12['Bas']+$res1['Bas']+$res2['Bas']+$res3['Bas'];
$csv_output .= '"'.str_replace('"', '""', number_format($TotBas)).'",';	
$csv_output .= "\n";

$csv_output .= '"'.str_replace('"', '""', '2').'",';
$csv_output .= '"'.str_replace('"', '""', 'HRA').'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res4['Hra']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res5['Hra']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res6['Hra']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res7['Hra']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res8['Hra']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res9['Hra']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res10['Hra']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res11['Hra']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res12['Hra']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res1['Hra']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res2['Hra']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res3['Hra']))).'",';
$TotHra=$res4['Hra']+$res5['Hra']+$res6['Hra']+$res7['Hra']+$res8['Hra']+$res9['Hra']+$res10['Hra']+$res11['Hra']+$res12['Hra']+$res1['Hra']+$res2['Hra']+$res3['Hra'];
$csv_output .= '"'.str_replace('"', '""', number_format($TotHra)).'",';	
$csv_output .= "\n";

$csv_output .= '"'.str_replace('"', '""', '3').'",';
$csv_output .= '"'.str_replace('"', '""', 'CONVEYANCE').'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res4['Con']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res5['Con']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res6['Con']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res7['Con']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res8['Con']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res9['Con']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res10['Con']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res11['Con']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res12['Con']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res1['Con']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res2['Con']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res3['Con']))).'",';
$TotCon=$res4['Con']+$res5['Con']+$res6['Con']+$res7['Con']+$res8['Con']+$res9['Con']+$res10['Con']+$res11['Con']+$res12['Con']+$res1['Con']+$res2['Con']+$res3['Con'];
$csv_output .= '"'.str_replace('"', '""', number_format($TotCon)).'",';	
$csv_output .= "\n";

$csv_output .= '"'.str_replace('"', '""', '4').'",';
$csv_output .= '"'.str_replace('"', '""', 'TRANSPORT').'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res4['Ta']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res5['Ta']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res6['Ta']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res7['Ta']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res8['Ta']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res9['Ta']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res10['Ta']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res11['Ta']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res12['Ta']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res1['Ta']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res2['Ta']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res3['Ta']))).'",';
$TotTa=$res4['Ta']+$res5['Ta']+$res6['Ta']+$res7['Ta']+$res8['Ta']+$res9['Ta']+$res10['Ta']+$res11['Ta']+$res12['Ta']+$res1['Ta']+$res2['Ta']+$res3['Ta'];
$csv_output .= '"'.str_replace('"', '""', number_format($TotTa)).'",';	
$csv_output .= "\n";

$csv_output .= '"'.str_replace('"', '""', '5').'",';
$csv_output .= '"'.str_replace('"', '""', 'CAR ALLOWANCE').'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res4['CarAll']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res5['CarAll']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res6['CarAll']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res7['CarAll']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res8['CarAll']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res9['CarAll']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res10['CarAll']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res11['CarAll']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res12['CarAll']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res1['CarAll']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res2['CarAll']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res3['CarAll']))).'",';
$TotCarAll=$res4['CarAll']+$res5['CarAll']+$res6['CarAll']+$res7['CarAll']+$res8['CarAll']+$res9['CarAll']+$res10['CarAll']+$res11['CarAll']+$res12['CarAll']+$res1['CarAll']+$res2['CarAll']+$res3['CarAll'];
$csv_output .= '"'.str_replace('"', '""', number_format($TotCarAll)).'",';	
$csv_output .= "\n";


$csv_output .= '"'.str_replace('"', '""', '6').'",';
$csv_output .= '"'.str_replace('"', '""', 'MONTHLY BONUS').'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res4['BonusM']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res5['BonusM']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res6['BonusM']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res7['BonusM']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res8['BonusM']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res9['BonusM']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res10['BonusM']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res11['BonusM']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res12['BonusM']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res1['BonusM']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res2['BonusM']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res3['BonusM']))).'",';
$TotBonusM=$res4['BonusM']+$res5['BonusM']+$res6['BonusM']+$res7['BonusM']+$res8['BonusM']+$res9['BonusM']+$res10['BonusM']+$res11['BonusM']+$res12['BonusM']+$res1['BonusM']+$res2['BonusM']+$res3['BonusM'];
$csv_output .= '"'.str_replace('"', '""', number_format($TotBonusM)).'",';	
$csv_output .= "\n";



$csv_output .= '"'.str_replace('"', '""', '7').'",';
$csv_output .= '"'.str_replace('"', '""', 'SPECIAL').'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res4['Spe']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res5['Spe']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res6['Spe']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res7['Spe']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res8['Spe']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res9['Spe']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res10['Spe']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res11['Spe']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res12['Spe']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res1['Spe']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res2['Spe']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res3['Spe']))).'",';
$TotSpe=$res4['Spe']+$res5['Spe']+$res6['Spe']+$res7['Spe']+$res8['Spe']+$res9['Spe']+$res10['Spe']+$res11['Spe']+$res12['Spe']+$res1['Spe']+$res2['Spe']+$res3['Spe'];
$csv_output .= '"'.str_replace('"', '""', number_format($TotSpe)).'",';	
$csv_output .= "\n";

$csv_output .= '"'.str_replace('"', '""', '8').'",';
$csv_output .= '"'.str_replace('"', '""', 'DA').'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res4['Da']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res5['Da']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res6['Da']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res7['Da']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res8['Da']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res9['Da']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res10['Da']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res11['Da']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res12['Da']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res1['Da']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res2['Da']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res3['Da']))).'",';
$TotDa=$res4['Da']+$res5['Da']+$res6['Da']+$res7['Da']+$res8['Da']+$res9['Da']+$res10['Da']+$res11['Da']+$res12['Da']+$res1['Da']+$res2['Da']+$res3['Da'];
$csv_output .= '"'.str_replace('"', '""', number_format($TotDa)).'",';	
$csv_output .= "\n";

$csv_output .= '"'.str_replace('"', '""', '9').'",';
$csv_output .= '"'.str_replace('"', '""', 'INCENTIVE').'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res4['Inc']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res5['Inc']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res6['Inc']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res7['Inc']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res8['Inc']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res9['Inc']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res10['Inc']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res11['Inc']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res12['Inc']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res1['Inc']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res2['Inc']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res3['Inc']))).'",';
$TotInc=$res4['Inc']+$res5['Inc']+$res6['Inc']+$res7['Inc']+$res8['Inc']+$res9['Inc']+$res10['Inc']+$res11['Inc']+$res12['Inc']+$res1['Inc']+$res2['Inc']+$res3['Inc'];
$csv_output .= '"'.str_replace('"', '""', number_format($TotInc)).'",';	
$csv_output .= "\n";

$csv_output .= '"'.str_replace('"', '""', '10').'",';
$csv_output .= '"'.str_replace('"', '""', 'PERFORMANCE_PAY').'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res4['Per']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res5['Per']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res6['Per']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res7['Per']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res8['Per']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res9['Per']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res10['Per']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res11['Per']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res12['Per']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res1['Per']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res2['Per']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res3['Per']))).'",';
$TotPer=$res4['Per']+$res5['Per']+$res6['Per']+$res7['Per']+$res8['Per']+$res9['Per']+$res10['Per']+$res11['Per']+$res12['Per']+$res1['Per']+$res2['Per']+$res3['Per'];
$csv_output .= '"'.str_replace('"', '""', number_format($TotPer)).'",';	
$csv_output .= "\n";


$csv_output .= '"'.str_replace('"', '""', '10').'",';
$csv_output .= '"'.str_replace('"', '""', 'PP - Yearly').'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res4['PPy']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res5['PPy']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res6['PPy']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res7['PPy']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res8['PPy']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res9['PPy']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res10['PPy']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res11['PPy']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res12['PPy']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res1['PPy']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res2['PPy']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res3['PPy']))).'",';
$TotPPy=$res4['PPy']+$res5['PPy']+$res6['PPy']+$res7['PPy']+$res8['PPy']+$res9['PPy']+$res10['PPy']+$res11['PPy']+$res12['PPy']+$res1['PPy']+$res2['PPy']+$res3['PPy'];
$csv_output .= '"'.str_replace('"', '""', number_format($TotPPy)).'",';	
$csv_output .= "\n";


$csv_output .= '"'.str_replace('"', '""', '10').'",';
$csv_output .= '"'.str_replace('"', '""', 'PERFORMANCE_INCENTIVE').'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res4['PP_Inc']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res5['PP_Inc']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res6['PP_Inc']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res7['PP_Inc']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res8['PP_Inc']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res9['PP_Inc']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res10['PP_Inc']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res11['PP_Inc']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res12['PP_Inc']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res1['PP_Inc']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res2['PP_Inc']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res3['PP_Inc']))).'",';
$TotPP_Inc=$res4['PP_Inc']+$res5['PP_Inc']+$res6['PP_Inc']+$res7['PP_Inc']+$res8['PP_Inc']+$res9['PP_Inc']+$res10['PP_Inc']+$res11['PP_Inc']+$res12['PP_Inc']+$res1['PP_Inc']+$res2['PP_Inc']+$res3['PP_Inc'];
$csv_output .= '"'.str_replace('"', '""', number_format($TotPP_inc)).'",';	
$csv_output .= "\n";

$csv_output .= '"'.str_replace('"', '""', '11').'",';
$csv_output .= '"'.str_replace('"', '""', 'LEAVE ENCASH').'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res4['Lea']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res5['Lea']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res6['Lea']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res7['Lea']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res8['Lea']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res9['Lea']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res10['Lea']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res11['Lea']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res12['Lea']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res1['Lea']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res2['Lea']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res3['Lea']))).'",';
$TotLea=$res4['Lea']+$res5['Lea']+$res6['Lea']+$res7['Lea']+$res8['Lea']+$res9['Lea']+$res10['Lea']+$res11['Lea']+$res12['Lea']+$res1['Lea']+$res2['Lea']+$res3['Lea'];
$csv_output .= '"'.str_replace('"', '""', number_format($TotLea)).'",';	
$csv_output .= "\n";

$csv_output .= '"'.str_replace('"', '""', '12').'",';
$csv_output .= '"'.str_replace('"', '""', 'VAR ADJUST').'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res4['Var']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res5['Var']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res6['Var']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res7['Var']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res8['Var']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res9['Var']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res10['Var']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res11['Var']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res12['Var']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res1['Var']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res2['Var']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res3['Var']))).'",';
$TotVar=$res4['Var']+$res5['Var']+$res6['Var']+$res7['Var']+$res8['Var']+$res9['Var']+$res10['Var']+$res11['Var']+$res12['Var']+$res1['Var']+$res2['Var']+$res3['Var'];
$csv_output .= '"'.str_replace('"', '""', number_format($TotVar)).'",';	
$csv_output .= "\n";


$csv_output .= '"'.str_replace('"', '""', '13').'",';
$csv_output .= '"'.str_replace('"', '""', 'VARIABLE REIMBURSEMENT').'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res4['VarRemburmnt']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res5['VarRemburmnt']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res6['VarRemburmnt']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res7['VarRemburmnt']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res8['VarRemburmnt']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res9['VarRemburmnt']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res10['VarRemburmnt']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res11['VarRemburmnt']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res12['VarRemburmnt']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res1['VarRemburmnt']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res2['VarRemburmnt']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res3['VarRemburmnt']))).'",';
$TotVar=$res4['VarRemburmnt']+$res5['VarRemburmnt']+$res6['VarRemburmnt']+$res7['VarRemburmnt']+$res8['VarRemburmnt']+$res9['VarRemburmnt']+$res10['VarRemburmnt']+$res11['VarRemburmnt']+$res12['VarRemburmnt']+$res1['VarRemburmnt']+$res2['VarRemburmnt']+$res3['VarRemburmnt'];
$csv_output .= '"'.str_replace('"', '""', number_format($TotVar)).'",';	
$csv_output .= "\n";

$csv_output .= '"'.str_replace('"', '""', '14').'",';
$csv_output .= '"'.str_replace('"', '""', 'CCA').'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res4['Cca']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res5['Cca']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res6['Cca']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res7['Cca']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res8['Cca']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res9['Cca']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res10['Cca']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res11['Cca']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res12['Cca']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res1['Cca']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res2['Cca']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res3['Cca']))).'",';
$TotCca=$res4['Cca']+$res5['Cca']+$res6['Cca']+$res7['Cca']+$res8['Cca']+$res9['Cca']+$res10['Cca']+$res11['Cca']+$res12['Cca']+$res1['Cca']+$res2['Cca']+$res3['Cca'];
$csv_output .= '"'.str_replace('"', '""', number_format($TotCca)).'",';	
$csv_output .= "\n";

$csv_output .= '"'.str_replace('"', '""', '15').'",';
$csv_output .= '"'.str_replace('"', '""', 'RA').'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res4['Ra']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res5['Ra']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res6['Ra']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res7['Ra']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res8['Ra']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res9['Ra']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res10['Ra']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res11['Ra']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res12['Ra']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res1['Ra']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res2['Ra']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res3['Ra']))).'",';
$TotRa=$res4['Ra']+$res5['Ra']+$res6['Ra']+$res7['Ra']+$res8['Ra']+$res9['Ra']+$res10['Ra']+$res11['Ra']+$res12['Ra']+$res1['Ra']+$res2['Ra']+$res3['Ra'];
$csv_output .= '"'.str_replace('"', '""', number_format($TotRa)).'",';	
$csv_output .= "\n";

$csv_output .= '"'.str_replace('"', '""', '16').'",';
$csv_output .= '"'.str_replace('"', '""', 'BONUS').'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res4['Bon']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res5['Bon']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res6['Bon']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res7['Bon']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res8['Bon']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res9['Bon']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res10['Bon']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res11['Bon']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res12['Bon']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res1['Bon']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res2['Bon']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res3['Bon']))).'",';
$TotBon=$res4['Bon']+$res5['Bon']+$res6['Bon']+$res7['Bon']+$res8['Bon']+$res9['Bon']+$res10['Bon']+$res11['Bon']+$res12['Bon']+$res1['Bon']+$res2['Bon']+$res3['Bon'];
$csv_output .= '"'.str_replace('"', '""', number_format($TotBon)).'",';	
$csv_output .= "\n";

$csv_output .= '"'.str_replace('"', '""', '17').'",';
$csv_output .= '"'.str_replace('"', '""', 'CEA').'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res4['Ycea']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res5['Ycea']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res6['Ycea']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res7['Ycea']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res8['Ycea']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res9['Ycea']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res10['Ycea']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res11['Ycea']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res12['Ycea']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res1['Ycea']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res2['Ycea']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res3['Ycea']))).'",';
$TotYcea=$res4['Ycea']+$res5['Ycea']+$res6['Ycea']+$res7['Ycea']+$res8['Ycea']+$res9['Ycea']+$res10['Ycea']+$res11['Ycea']+$res12['Ycea']+$res1['Ycea']+$res2['Ycea']+$res3['Ycea'];
$csv_output .= '"'.str_replace('"', '""', number_format($TotYcea)).'",';	
$csv_output .= "\n";

$csv_output .= '"'.str_replace('"', '""', '18').'",';
$csv_output .= '"'.str_replace('"', '""', 'MR').'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res4['Ymr']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res5['Ymr']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res6['Ymr']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res7['Ymr']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res8['Ymr']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res9['Ymr']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res10['Ymr']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res11['Ymr']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res12['Ymr']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res1['Ymr']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res2['Ymr']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res3['Ymr']))).'",';
$TotYmr=$res4['Ymr']+$res5['Ymr']+$res6['Ymr']+$res7['Ymr']+$res8['Ymr']+$res9['Ymr']+$res10['Ymr']+$res11['Ymr']+$res12['Ymr']+$res1['Ymr']+$res2['Ymr']+$res3['Ymr'];
$csv_output .= '"'.str_replace('"', '""', number_format($TotYmr)).'",';	
$csv_output .= "\n";

$csv_output .= '"'.str_replace('"', '""', '19').'",';
$csv_output .= '"'.str_replace('"', '""', 'LTA'.$res3['Ylta']).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res4['Ylta']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res5['Ylta']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res6['Ylta']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res7['Ylta']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res8['Ylta']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res9['Ylta']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res10['Ylta']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res11['Ylta']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res12['Ylta']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res1['Ylta']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res2['Ylta']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res3['Ylta']))).'",';
$TotYlta=$res4['Ylta']+$res5['Ylta']+$res6['Ylta']+$res7['Ylta']+$res8['Ylta']+$res9['Ylta']+$res10['Ylta']+$res11['Ylta']+$res12['Ylta']+$res1['Ylta']+$res2['Ylta']+$res3['Ylta'];
$csv_output .= '"'.str_replace('"', '""', number_format($TotYlta)).'",';	
$csv_output .= "\n";

$csv_output .= '"'.str_replace('"', '""', '20').'",';
$csv_output .= '"'.str_replace('"', '""', 'ARR_BASIC').'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res4['ArrBas']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res5['ArrBas']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res6['ArrBas']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res7['ArrBas']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res8['ArrBas']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res9['ArrBas']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res10['ArrBas']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res11['ArrBas']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res12['ArrBas']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res1['ArrBas']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res2['ArrBas']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res3['ArrBas']))).'",';
$TotArrBas=$res4['ArrBas']+$res5['ArrBas']+$res6['ArrBas']+$res7['ArrBas']+$res8['ArrBas']+$res9['ArrBas']+$res10['ArrBas']+$res11['ArrBas']+$res12['ArrBas']+$res1['ArrBas']+$res2['ArrBas']+$res3['ArrBas'];
$csv_output .= '"'.str_replace('"', '""', number_format($TotArrBas)).'",';	
$csv_output .= "\n";

$csv_output .= '"'.str_replace('"', '""', '21').'",';
$csv_output .= '"'.str_replace('"', '""', 'ARR_HRA').'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res4['ArrHra']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res5['ArrHra']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res6['ArrHra']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res7['ArrHra']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res8['ArrHra']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res9['ArrHra']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res10['ArrHra']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res11['ArrHra']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res12['ArrHra']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res1['ArrHra']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res2['ArrHra']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res3['ArrHra']))).'",';
$TotArrHra=$res4['ArrHra']+$res5['ArrHra']+$res6['ArrHra']+$res7['ArrHra']+$res8['ArrHra']+$res9['ArrHra']+$res10['ArrHra']+$res11['ArrHra']+$res12['ArrHra']+$res1['ArrHra']+$res2['ArrHra']+$res3['ArrHra'];
$csv_output .= '"'.str_replace('"', '""', number_format($TotArrHra)).'",';	
$csv_output .= "\n";

$csv_output .= '"'.str_replace('"', '""', '22').'",';
$csv_output .= '"'.str_replace('"', '""', 'ARR_CONV').'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res4['ArrCon']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res5['ArrCon']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res6['ArrCon']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res7['ArrCon']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res8['ArrCon']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res9['ArrCon']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res10['ArrCon']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res11['ArrCon']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res12['ArrCon']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res1['ArrCon']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res2['ArrCon']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res3['ArrCon']))).'",';
$TotArrCon=$res4['ArrCon']+$res5['ArrCon']+$res6['ArrCon']+$res7['ArrCon']+$res8['ArrCon']+$res9['ArrCon']+$res10['ArrCon']+$res11['ArrCon']+$res12['ArrCon']+$res1['ArrCon']+$res2['ArrCon']+$res3['ArrCon'];
$csv_output .= '"'.str_replace('"', '""', number_format($TotArrCon)).'",';	
$csv_output .= "\n";

$csv_output .= '"'.str_replace('"', '""', '23').'",';
$csv_output .= '"'.str_replace('"', '""', 'ARR_SPECIAL').'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res4['ArrSpl']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res5['ArrSpl']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res6['ArrSpl']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res7['ArrSpl']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res8['ArrSpl']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res9['ArrSpl']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res10['ArrSpl']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res11['ArrSpl']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res12['ArrSpl']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res1['ArrSpl']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res2['ArrSpl']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res3['ArrSpl']))).'",';
$TotArrSpl=$res4['ArrSpl']+$res5['ArrSpl']+$res6['ArrSpl']+$res7['ArrSpl']+$res8['ArrSpl']+$res9['ArrSpl']+$res10['ArrSpl']+$res11['ArrSpl']+$res12['ArrSpl']+$res1['ArrSpl']+$res2['ArrSpl']+$res3['ArrSpl'];
$csv_output .= '"'.str_replace('"', '""', number_format($TotArrSpl)).'",';	
$csv_output .= "\n";



$csv_output .= '"'.str_replace('"', '""', '24').'",';
$csv_output .= '"'.str_replace('"', '""', 'ARR_LEAVE_ENCASH').'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res4['ArrLvEncash']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res5['ArrLvEncash']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res6['ArrLvEncash']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res7['ArrLvEncash']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res8['ArrLvEncash']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res9['ArrLvEncash']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res10['ArrLvEncash']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res11['ArrLvEncash']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res12['ArrLvEncash']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res1['ArrLvEncash']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res2['ArrLvEncash']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res3['ArrLvEncash']))).'",';
$TotArrLvEncash=$res4['ArrLvEncash']+$res5['ArrLvEncash']+$res6['ArrLvEncash']+$res7['ArrLvEncash']+$res8['ArrLvEncash']+$res9['ArrLvEncash']+$res10['ArrLvEncash']+$res11['ArrLvEncash']+$res12['ArrLvEncash']+$res1['ArrLvEncash']+$res2['ArrLvEncash']+$res3['ArrLvEncash']; 
$csv_output .= '"'.str_replace('"', '""', number_format($TotArrLvEncash)).'",';	
$csv_output .= "\n";



$csv_output .= '"'.str_replace('"', '""', '25').'",';
$csv_output .= '"'.str_replace('"', '""', 'ARR_BONUS').'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res4['ArrBonus']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res5['ArrBonus']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res6['ArrBonus']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res7['ArrBonus']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res8['ArrBonus']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res9['ArrBonus']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res10['ArrBonus']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res11['ArrBonus']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res12['ArrBonus']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res1['ArrBonus']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res2['ArrBonus']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res3['ArrBonus']))).'",';
$TotArrBonus=$res4['ArrBonus']+$res5['ArrBonus']+$res6['ArrBonus']+$res7['ArrBonus']+$res8['ArrBonus']+$res9['ArrBonus']+$res10['ArrBonus']+$res11['ArrBonus']+$res12['ArrBonus']+$res1['ArrBonus']+$res2['ArrBonus']+$res3['ArrBonus'];
$csv_output .= '"'.str_replace('"', '""', number_format($TotArrBonus)).'",';	
$csv_output .= "\n";



$csv_output .= '"'.str_replace('"', '""', '26').'",';
$csv_output .= '"'.str_replace('"', '""', 'ARR_RELOCATION_ALLOWANCE').'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res4['ArrRA']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res5['ArrRA']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res6['ArrRA']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res7['ArrRA']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res8['ArrRA']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res9['ArrRA']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res10['ArrRA']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res11['ArrRA']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res12['ArrRA']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res1['ArrRA']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res2['ArrSpl']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res3['ArrRA']))).'",';
$TotArrRA=$res4['ArrRA']+$res5['ArrRA']+$res6['ArrRA']+$res7['ArrRA']+$res8['ArrRA']+$res9['ArrRA']+$res10['ArrRA']+$res11['ArrRA']+$res12['ArrRA']+$res1['ArrRA']+$res2['ArrRA']+$res3['ArrRA'];
$csv_output .= '"'.str_replace('"', '""', number_format($TotArrRA)).'",';	
$csv_output .= "\n";


$csv_output .= '"'.str_replace('"', '""', '36').'",';
$csv_output .= '"'.str_replace('"', '""', 'BONUS ADJUSTMENT ').'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res4['Bonus_Adjustment']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res5['Bonus_Adjustment']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res6['Bonus_Adjustment']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res7['Bonus_Adjustment']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res8['Bonus_Adjustment']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res9['Bonus_Adjustment']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res10['Bonus_Adjustment']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res11['Bonus_Adjustment']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res12['Bonus_Adjustment']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res1['Bonus_Adjustment']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res2['Bonus_Adjustment']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res3['Bonus_Adjustment']))).'",';
$TotBonus_Adjustment=$res4['Bonus_Adjustment']+$res5['Bonus_Adjustment']+$res6['Bonus_Adjustment']+$res7['Bonus_Adjustment']+$res8['Bonus_Adjustment']+$res9['Bonus_Adjustment']+$res10['Bonus_Adjustment']+$res11['Bonus_Adjustment']+$res12['Bonus_Adjustment']+$res1['Bonus_Adjustment']+$res2['Bonus_Adjustment']+$res3['Bonus_Adjustment'];
$csv_output .= '"'.str_replace('"', '""', number_format($TotBonus_Adjustment)).'",';	
$csv_output .= "\n";

$csv_output .= '"'.str_replace('"', '""', '37').'",';
$csv_output .= '"'.str_replace('"', '""', 'DEPUTATION ALLOWANCE ').'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res4['Deputation_Allow']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res5['Deputation_Allow']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res6['Deputation_Allow']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res7['Deputation_Allow']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res8['Deputation_Allow']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res9['Deputation_Allow']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res10['Deputation_Allow']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res11['Deputation_Allow']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res12['Deputation_Allow']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res1['Deputation_Allow']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res2['Deputation_Allow']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res3['Deputation_Allow']))).'",';
$TotDeputation_Allow=$res4['Deputation_Allow']+$res5['Deputation_Allow']+$res6['Deputation_Allow']+$res7['Deputation_Allow']+$res8['Deputation_Allow']+$res9['Deputation_Allow']+$res10['Deputation_Allow']+$res11['Deputation_Allow']+$res12['Deputation_Allow']+$res1['Deputation_Allow']+$res2['Deputation_Allow']+$res3['Deputation_Allow'];
$csv_output .= '"'.str_replace('"', '""', number_format($TotDeputation_Allow)).'",';	
$csv_output .= "\n";

$csv_output .= '"'.str_replace('"', '""', '37').'",';
$csv_output .= '"'.str_replace('"', '""', 'COMMUNICATION ALLOWANCE ').'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res4['Communication_Allow']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res5['Communication_Allow']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res6['Communication_Allow']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res7['Communication_Allow']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res8['Communication_Allow']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res9['Communication_Allow']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res10['Communication_Allow']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res11['Communication_Allow']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res12['Communication_Allow']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res1['Communication_Allow']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res2['Communication_Allow']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res3['Communication_Allow']))).'",';
$TotCommunication_Allow=$res4['Communication_Allow']+$res5['Communication_Allow']+$res6['Communication_Allow']+$res7['Communication_Allow']+$res8['Communication_Allow']+$res9['Communication_Allow']+$res10['Communication_Allow']+$res11['Communication_Allow']+$res12['Communication_Allow']+$res1['Communication_Allow']+$res2['Communication_Allow']+$res3['Communication_Allow'];
$csv_output .= '"'.str_replace('"', '""', number_format($TotCommunication_Allow)).'",';	
$csv_output .= "\n";

$csv_output .= '"'.str_replace('"', '""', '37').'",';
$csv_output .= '"'.str_replace('"', '""', 'CAR ALLOWANCE ').'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res4['Car_Allow']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res5['Car_Allow']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res6['Car_Allow']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res7['Car_Allow']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res8['Car_Allow']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res9['Car_Allow']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res10['Car_Allow']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res11['Car_Allow']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res12['Car_Allow']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res1['Car_Allow']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res2['Car_Allow']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res3['Car_Allow']))).'",';
$TotCar_Allow=$res4['Car_Allow']+$res5['Car_Allow']+$res6['Car_Allow']+$res7['Car_Allow']+$res8['Car_Allow']+$res9['Car_Allow']+$res10['Car_Allow']+$res11['Car_Allow']+$res12['Car_Allow']+$res1['Car_Allow']+$res2['Car_Allow']+$res3['Car_Allow'];
$csv_output .= '"'.str_replace('"', '""', number_format($TotCar_Allow)).'",';	
$csv_output .= "\n";

$csv_output .= '"'.str_replace('"', '""', '37').'",';
$csv_output .= '"'.str_replace('"', '""', 'ARR. COMMUNICATION ALLOWANCE ').'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res4['Arr_Communication_Allow']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res5['Arr_Communication_Allow']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res6['Arr_Communication_Allow']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res7['Arr_Communication_Allow']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res8['Arr_Communication_Allow']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res9['Arr_Communication_Allow']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res10['Arr_Communication_Allow']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res11['Arr_Communication_Allow']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res12['Arr_Communication_Allow']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res1['Arr_Communication_Allow']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res2['Arr_Communication_Allow']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res3['Arr_Communication_Allow']))).'",';
$TotArr_Communication_Allow=$res4['Arr_Communication_Allow']+$res5['Arr_Communication_Allow']+$res6['Arr_Communication_Allow']+$res7['Arr_Communication_Allow']+$res8['Arr_Communication_Allow']+$res9['Arr_Communication_Allow']+$res10['Arr_Communication_Allow']+$res11['Arr_Communication_Allow']+$res12['Arr_Communication_Allow']+$res1['Arr_Communication_Allow']+$res2['Arr_Communication_Allow']+$res3['Arr_Communication_Allow'];
$csv_output .= '"'.str_replace('"', '""', number_format($TotArr_Communication_Allow)).'",';	
$csv_output .= "\n";



$TotG4=$res4['Bas']+$res4['Hra']+$res4['Con']+$res4['Ta']+$res4['Spe']+$res4['BonusM']+$res4['Da']+$res4['Inc']+$res4['Per']+$res4['Lea']+$res4['Var']+$res4['VarRemburmnt']+$res4['Cca']+$res4['Ra']+$res4['Bon']+$res4['Ycea']+$res4['Ymr']+$res4['Ylta']+$res4['ArrBas']+$res4['ArrHra']+$res4['ArrCon']+$res4['ArrSpl']+$res4['CarAll']+$res4['ArrLvEncash']+$res4['ArrBonus']+$res4['ArrRA']+$res4['Bonus_Adjustment']+$res4['PP_Inc']+$res4['PPy']+$res4['Deputation_Allow']+$res4['Communication_Allow']+$res4['Car_Allow']+$res4['Arr_Communication_Allow'];
$TotG5=$res5['Bas']+$res5['Hra']+$res5['Con']+$res5['Ta']+$res5['Spe']+$res5['BonusM']+$res5['Da']+$res5['Inc']+$res5['Per']+$res5['Lea']+$res5['Var']+$res5['VarRemburmnt']+$res5['Cca']+$res5['Ra']+$res5['Bon']+$res5['Ycea']+$res5['Ymr']+$res5['Ylta']+$res5['ArrBas']+$res5['ArrHra']+$res5['ArrCon']+$res5['ArrSpl']+$res5['CarAll']+$res5['ArrLvEncash']+$res5['ArrBonus']+$res5['ArrRA']+$res5['Bonus_Adjustment']+$res5['PP_Inc']+$res5['PPy']+$res5['Deputation_Allow']+$res5['Communication_Allow']+$res5['Car_Allow']+$res5['Arr_Communication_Allow'];
$TotG6=$res6['Bas']+$res6['Hra']+$res6['Con']+$res6['Ta']+$res6['Spe']+$res6['BonusM']+$res6['Da']+$res6['Inc']+$res6['Per']+$res6['Lea']+$res6['Var']+$res6['VarRemburmnt']+$res6['Cca']+$res6['Ra']+$res6['Bon']+$res6['Ycea']+$res6['Ymr']+$res6['Ylta']+$res6['ArrBas']+$res6['ArrHra']+$res6['ArrCon']+$res6['ArrSpl']+$res6['CarAll']+$res6['ArrLvEncash']+$res6['ArrBonus']+$res6['ArrRA']+$res6['Bonus_Adjustment']+$res6['PP_Inc']+$res6['PPy']+$res6['Deputation_Allow']+$res6['Communication_Allow']+$res6['Car_Allow']+$res6['Arr_Communication_Allow'];
$TotG7=$res7['Bas']+$res7['Hra']+$res7['Con']+$res7['Ta']+$res7['Spe']+$res7['BonusM']+$res7['Da']+$res7['Inc']+$res7['Per']+$res7['Lea']+$res7['Var']+$res7['VarRemburmnt']+$res7['Cca']+$res7['Ra']+$res7['Bon']+$res7['Ycea']+$res7['Ymr']+$res7['Ylta']+$res7['ArrBas']+$res7['ArrHra']+$res7['ArrCon']+$res7['ArrSpl']+$res7['CarAll']+$res7['ArrLvEncash']+$res7['ArrBonus']+$res7['ArrRA']+$res7['Bonus_Adjustment']+$res7['PP_Inc']+$res7['PPy']+$res7['Deputation_Allow']+$res7['Communication_Allow']+$res7['Car_Allow']+$res7['Arr_Communication_Allow'];
$TotG8=$res8['Bas']+$res8['Hra']+$res8['Con']+$res8['Ta']+$res8['Spe']+$res8['BonusM']+$res8['Da']+$res8['Inc']+$res8['Per']+$res8['Lea']+$res8['Var']+$res8['VarRemburmnt']+$res8['Cca']+$res8['Ra']+$res8['Bon']+$res8['Ycea']+$res8['Ymr']+$res8['Ylta']+$res8['ArrBas']+$res8['ArrHra']+$res8['ArrCon']+$res8['ArrSpl']+$res8['CarAll']+$res8['ArrLvEncash']+$res8['ArrBonus']+$res8['ArrRA']+$res8['Bonus_Adjustment']+$res8['PP_Inc']+$res8['PPy']+$res8['Deputation_Allow']+$res8['Communication_Allow']+$res8['Car_Allow']+$res8['Arr_Communication_Allow'];
$TotG9=$res9['Bas']+$res9['Hra']+$res9['Con']+$res9['Ta']+$res9['Spe']+$res9['BonusM']+$res9['Da']+$res9['Inc']+$res9['Per']+$res9['Lea']+$res9['Var']+$res9['VarRemburmnt']+$res9['Cca']+$res9['Ra']+$res9['Bon']+$res9['Ycea']+$res9['Ymr']+$res9['Ylta']+$res9['ArrBas']+$res9['ArrHra']+$res9['ArrCon']+$res9['ArrSpl']+$res9['CarAll']+$res9['ArrLvEncash']+$res9['ArrBonus']+$res9['ArrRA']+$res9['Bonus_Adjustment']+$res9['PP_Inc']+$res9['PPy']+$res9['Deputation_Allow']+$res9['Communication_Allow']+$res9['Car_Allow']+$res9['Arr_Communication_Allow']; 
$TotG10=$res10['Bas']+$res10['Hra']+$res10['Con']+$res10['Ta']+$res10['Spe']+$res10['BonusM']+$res10['Da']+$res10['Inc']+$res10['Per']+$res10['Lea']+$res10['Var']+$res10['VarRemburmnt']+$res10['Cca']+$res10['Ra']+$res10['Bon']+$res10['Ycea']+$res10['Ymr']+$res10['Ylta']+$res10['ArrBas']+$res10['ArrHra']+$res10['ArrCon']+$res10['ArrSpl']+$res10['CarAll']+$res10['ArrLvEncash']+$res10['ArrBonus']+$res10['ArrRA']+$res10['Bonus_Adjustment']+$res10['PP_Inc']+$res10['PPy']+$res10['Deputation_Allow']+$res10['Communication_Allow']+$res10['Car_Allow']+$res10['Arr_Communication_Allow'];
$TotG11=$res11['Bas']+$res11['Hra']+$res11['Con']+$res11['Ta']+$res11['Spe']+$res11['BonusM']+$res11['Da']+$res11['Inc']+$res11['Per']+$res11['Lea']+$res11['Var']+$res11['VarRemburmnt']+$res11['Cca']+$res11['Ra']+$res11['Bon']+$res11['Ycea']+$res11['Ymr']+$res11['Ylta']+$res11['ArrBas']+$res11['ArrHra']+$res11['ArrCon']+$res11['ArrSpl']+$res11['CarAll']+$res11['ArrLvEncash']+$res11['ArrBonus']+$res11['ArrRA']+$res11['Bonus_Adjustment']+$res11['PP_Inc']+$res11['PPy']+$res11['Deputation_Allow']+$res11['Communication_Allow']+$res11['Car_Allow']+$res11['Arr_Communication_Allow'];
$TotG12=$res12['Bas']+$res12['Hra']+$res12['Con']+$res12['Ta']+$res12['Spe']+$res12['BonusM']+$res12['Da']+$res12['Inc']+$res12['Per']+$res12['Lea']+$res12['Var']+$res12['VarRemburmnt']+$res12['Cca']+$res12['Ra']+$res12['Bon']+$res12['Ycea']+$res12['Ymr']+$res12['Ylta']+$res12['ArrBas']+$res12['ArrHra']+$res12['ArrCon']+$res12['ArrSpl']+$res12['CarAll']+$res12['ArrLvEncash']+$res12['ArrBonus']+$res12['ArrRA']+$res12['Bonus_Adjustment']+$res12['PP_Inc']+$res12['PPy']+$res12['Deputation_Allow']+$res12['Communication_Allow']+$res12['Car_Allow']+$res12['Arr_Communication_Allow'];
$TotG1=$res1['Bas']+$res1['Hra']+$res1['Con']+$res1['Ta']+$res1['Spe']+$res1['BonusM']+$res1['Da']+$res1['Inc']+$res1['Per']+$res1['Lea']+$res1['Var']+$res1['VarRemburmnt']+$res1['Cca']+$res1['Ra']+$res1['Bon']+$res1['Ycea']+$res1['Ymr']+$res1['Ylta']+$res1['ArrBas']+$res1['ArrHra']+$res1['ArrCon']+$res1['ArrSpl']+$res1['CarAll']+$res1['ArrLvEncash']+$res1['ArrBonus']+$res1['ArrRA']+$res1['Bonus_Adjustment']+$res1['PP_Inc']+$res1['PPy']+$res1['Deputation_Allow']+$res1['Communication_Allow']+$res1['Car_Allow']+$res1['Arr_Communication_Allow']; 
$TotG2=$res2['Bas']+$res2['Hra']+$res2['Con']+$res2['Ta']+$res2['Spe']+$res2['BonusM']+$res2['Da']+$res2['Inc']+$res2['Per']+$res2['Lea']+$res2['Var']+$res2['VarRemburmnt']+$res2['Cca']+$res2['Ra']+$res2['Bon']+$res2['Ycea']+$res2['Ymr']+$res2['Ylta']+$res2['ArrBas']+$res2['ArrHra']+$res2['ArrCon']+$res2['ArrSpl']+$res2['CarAll']+$res2['ArrLvEncash']+$res2['ArrBonus']+$res2['ArrRA']+$res2['Bonus_Adjustment']+$res2['PP_Inc']+$res2['PPy']+$res2['Deputation_Allow']+$res2['Communication_Allow']+$res2['Car_Allow']+$res2['Arr_Communication_Allow']; 
$TotG3=$res3['Bas']+$res3['Hra']+$res3['Con']+$res3['Ta']+$res3['Spe']+$res3['BonusM']+$res3['Da']+$res3['Inc']+$res3['Per']+$res3['Lea']+$res3['Var']+$res3['VarRemburmnt']+$res3['Cca']+$res3['Ra']+$res3['Bon']+$res3['Ycea']+$res3['Ymr']+$res3['Ylta']+$res3['ArrBas']+$res3['ArrHra']+$res3['ArrCon']+$res3['ArrSpl']+$res3['CarAll']+$res3['ArrLvEncash']+$res3['ArrBonus']+$res3['ArrRA']+$res3['Bonus_Adjustment']+$res3['PP_Inc']+$res3['PPy']+$res3['Deputation_Allow']+$res3['Communication_Allow']+$res3['Car_Allow']+$res3['Arr_Communication_Allow']; 


$csv_output .= '"'.str_replace('"', '""', '27').'",';
$csv_output .= '"'.str_replace('"', '""', 'GROSS').'",';
$csv_output .= '"'.str_replace('"', '""', number_format($TotG4)).'",';
$csv_output .= '"'.str_replace('"', '""', number_format($TotG5)).'",';
$csv_output .= '"'.str_replace('"', '""', number_format($TotG6)).'",';
$csv_output .= '"'.str_replace('"', '""', number_format($TotG7)).'",';
$csv_output .= '"'.str_replace('"', '""', number_format($TotG8)).'",';
$csv_output .= '"'.str_replace('"', '""', number_format($TotG9)).'",';
$csv_output .= '"'.str_replace('"', '""', number_format($TotG10)).'",';
$csv_output .= '"'.str_replace('"', '""', number_format($TotG11)).'",';
$csv_output .= '"'.str_replace('"', '""', number_format($TotG12)).'",';
$csv_output .= '"'.str_replace('"', '""', number_format($TotG1)).'",';
$csv_output .= '"'.str_replace('"', '""', number_format($TotG2)).'",';
$csv_output .= '"'.str_replace('"', '""', number_format($TotG3)).'",';
$TotalGross=$TotG4+$TotG5+$TotG6+$TotG7+$TotG8+$TotG9+$TotG10+$TotG11+$TotG12+$TotG1+$TotG2+$TotG3;
$csv_output .= '"'.str_replace('"', '""', number_format($TotalGross)).'",';	
$csv_output .= "\n";

$csv_output .= '"'.str_replace('"', '""', '28').'",';
$csv_output .= '"'.str_replace('"', '""', 'PF').'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res4['TotPfEmp']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res5['TotPfEmp']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res6['TotPfEmp']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res7['TotPfEmp']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res8['TotPfEmp']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res9['TotPfEmp']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res10['TotPfEmp']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res11['TotPfEmp']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res12['TotPfEmp']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res1['TotPfEmp']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res2['TotPfEmp']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res3['TotPfEmp']))).'",';
$TotTotPfEmp=$res4['TotPfEmp']+$res5['TotPfEmp']+$res6['TotPfEmp']+$res7['TotPfEmp']+$res8['TotPfEmp']+$res9['TotPfEmp']+$res10['TotPfEmp']+$res11['TotPfEmp']+$res12['TotPfEmp']+$res1['TotPfEmp']+$res2['TotPfEmp']+$res3['TotPfEmp'];
$csv_output .= '"'.str_replace('"', '""', number_format($TotTotPfEmp)).'",';	
$csv_output .= "\n";

$csv_output .= '"'.str_replace('"', '""', '29').'",';
$csv_output .= '"'.str_replace('"', '""', 'ARREAR PF').'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res4['ArrPf']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res5['ArrPf']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res6['ArrPf']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res7['ArrPf']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res8['ArrPf']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res9['ArrPf']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res10['ArrPf']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res11['ArrPf']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res12['ArrPf']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res1['ArrPf']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res2['ArrPf']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res3['ArrPf']))).'",';
$TotArrPf=$res4['ArrPf']+$res5['ArrPf']+$res6['ArrPf']+$res7['ArrPf']+$res8['ArrPf']+$res9['ArrPf']+$res10['ArrPf']+$res11['ArrPf']+$res12['ArrPf']+$res1['ArrPf']+$res2['ArrPf']+$res3['ArrPf'];
$csv_output .= '"'.str_replace('"', '""', number_format($TotArrPf)).'",';	
$csv_output .= "\n";

$csv_output .= '"'.str_replace('"', '""', '30').'",';
$csv_output .= '"'.str_replace('"', '""', 'ESIC').'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res4['Esic']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res5['Esic']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res6['Esic']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res7['Esic']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res8['Esic']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res9['Esic']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res10['Esic']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res11['Esic']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res12['Esic']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res1['Esic']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res2['Esic']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res3['Esic']))).'",';
$TotEsic=$res4['Esic']+$res5['Esic']+$res6['Esic']+$res7['Esic']+$res8['Esic']+$res9['Esic']+$res10['Esic']+$res11['Esic']+$res12['Esic']+$res1['Esic']+$res2['Esic']+$res3['Esic'];
$csv_output .= '"'.str_replace('"', '""', number_format($TotEsic)).'",';	
$csv_output .= "\n";

$csv_output .= '"'.str_replace('"', '""', '31').'",';
$csv_output .= '"'.str_replace('"', '""', 'ARREAR ESIC').'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res4['ArrEsic']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res5['ArrEsic']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res6['ArrEsic']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res7['ArrEsic']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res8['ArrEsic']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res9['ArrEsic']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res10['ArrEsic']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res11['ArrEsic']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res12['ArrEsic']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res1['ArrEsic']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res2['ArrEsic']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res3['ArrEsic']))).'",';
$TotArrEsic=$res4['ArrEsic']+$res5['ArrEsic']+$res6['ArrEsic']+$res7['ArrEsic']+$res8['ArrEsic']+$res9['ArrEsic']+$res10['ArrEsic']+$res11['ArrEsic']+$res12['ArrEsic']+$res1['ArrEsic']+$res2['ArrEsic']+$res3['ArrEsic'];
$csv_output .= '"'.str_replace('"', '""', number_format($TotArrEsic)).'",';	
$csv_output .= "\n";

$csv_output .= '"'.str_replace('"', '""', '32').'",';
$csv_output .= '"'.str_replace('"', '""', 'TDS').'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res4['Tds']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res5['Tds']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res6['Tds']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res7['Tds']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res8['Tds']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res9['Tds']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res10['Tds']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res11['Tds']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res12['Tds']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res1['Tds']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res2['Tds']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res3['Tds']))).'",';
$TotTds=$res4['Tds']+$res5['Tds']+$res6['Tds']+$res7['Tds']+$res8['Tds']+$res9['Tds']+$res10['Tds']+$res11['Tds']+$res12['Tds']+$res1['Tds']+$res2['Tds']+$res3['Tds'];
$csv_output .= '"'.str_replace('"', '""', number_format($TotTds)).'",';	
$csv_output .= "\n";

$csv_output .= '"'.str_replace('"', '""', '33').'",';
$csv_output .= '"'.str_replace('"', '""', 'DEDUCT_CEA').'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res4['Dedcea']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res5['Dedcea']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res6['Dedcea']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res7['Dedcea']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res8['Dedcea']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res9['Dedcea']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res10['Dedcea']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res11['Dedcea']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res12['Dedcea']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res1['Dedcea']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res2['Dedcea']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res3['Dedcea']))).'",';
$TotDedcea=$res4['Dedcea']+$res5['Dedcea']+$res6['Dedcea']+$res7['Dedcea']+$res8['Dedcea']+$res9['Dedcea']+$res10['Dedcea']+$res11['Dedcea']+$res12['Dedcea']+$res1['Dedcea']+$res2['Dedcea']+$res3['Dedcea'];
$csv_output .= '"'.str_replace('"', '""', number_format($TotDedcea)).'",';	
$csv_output .= "\n";

$csv_output .= '"'.str_replace('"', '""', '34').'",';
$csv_output .= '"'.str_replace('"', '""', 'DEDUCT_MR').'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res4['Dedma']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res5['Dedma']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res6['Dedma']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res7['Dedma']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res8['Dedma']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res9['Dedma']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res10['Dedma']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res11['Dedma']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res12['Dedma']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res1['Dedma']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res2['Dedma']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res3['Dedma']))).'",';
$TotDedma=$res4['Dedma']+$res5['Dedma']+$res6['Dedma']+$res7['Dedma']+$res8['Dedma']+$res9['Dedma']+$res10['Dedma']+$res11['Dedma']+$res12['Dedma']+$res1['Dedma']+$res2['Dedma']+$res3['Dedma'];
$csv_output .= '"'.str_replace('"', '""', number_format($TotDedma)).'",';	
$csv_output .= "\n";

$csv_output .= '"'.str_replace('"', '""', '35').'",';
$csv_output .= '"'.str_replace('"', '""', 'DEDUCT_LTA').'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res4['Dedlta']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res5['Dedlta']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res6['Dedlta']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res7['Dedlta']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res8['Dedlta']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res9['Dedlta']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res10['Dedlta']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res11['Dedlta']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res12['Dedlta']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res1['Dedlta']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res2['Dedlta']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res3['Dedlta']))).'",';
$TotDedlta=$res4['Dedlta']+$res5['Dedlta']+$res6['Dedlta']+$res7['Dedlta']+$res8['Dedlta']+$res9['Dedlta']+$res10['Dedlta']+$res11['Dedlta']+$res12['Dedlta']+$res1['Dedlta']+$res2['Dedlta']+$res3['Dedlta'];
$csv_output .= '"'.str_replace('"', '""', number_format($TotDedlta)).'",';	
$csv_output .= "\n";

$csv_output .= '"'.str_replace('"', '""', '36').'",';
$csv_output .= '"'.str_replace('"', '""', 'VAL_CONTRIBUSTION').'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res4['ValCon']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res5['ValCon']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res6['ValCon']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res7['ValCon']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res8['ValCon']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res9['ValCon']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res10['ValCon']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res11['ValCon']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res12['ValCon']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res1['ValCon']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res2['ValCon']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res3['ValCon']))).'",';
$TotValCon=$res4['ValCon']+$res5['ValCon']+$res6['ValCon']+$res7['ValCon']+$res8['ValCon']+$res9['ValCon']+$res10['ValCon']+$res11['ValCon']+$res12['ValCon']+$res1['ValCon']+$res2['ValCon']+$res3['ValCon'];
$csv_output .= '"'.str_replace('"', '""', number_format($TotValCon)).'",';	
$csv_output .= "\n";

$csv_output .= '"'.str_replace('"', '""', '37').'",';
$csv_output .= '"'.str_replace('"', '""', 'NATIONAL PENSION SCHEME').'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res4['NPS']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res5['NPS']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res6['NPS']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res7['NPS']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res8['NPS']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res9['NPS']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res10['NPS']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res11['NPS']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res12['NPS']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res1['NPS']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res2['NPS']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res3['NPS']))).'",';
$NPSS=$res4['NPS']+$res5['NPS']+$res6['NPS']+$res7['NPS']+$res8['NPS']+$res9['NPS']+$res10['NPS']+$res11['NPS']+$res12['NPS']+$res1['NPS']+$res2['NPS']+$res3['NPS'];
$csv_output .= '"'.str_replace('"', '""', number_format($NPSS)).'",';	
$csv_output .= "\n";

$csv_output .= '"'.str_replace('"', '""', '37').'",';
$csv_output .= '"'.str_replace('"', '""', 'DEDUCT_ADJUST').'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res4['DedAduj']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res5['DedAduj']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res6['DedAduj']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res7['DedAduj']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res8['DedAduj']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res9['DedAduj']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res10['DedAduj']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res11['DedAduj']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res12['DedAduj']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res1['DedAduj']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res2['DedAduj']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res3['DedAduj']))).'",';
$TotDedAduj=$res4['DedAduj']+$res5['DedAduj']+$res6['DedAduj']+$res7['DedAduj']+$res8['DedAduj']+$res9['DedAduj']+$res10['DedAduj']+$res11['DedAduj']+$res12['DedAduj']+$res1['DedAduj']+$res2['DedAduj']+$res3['DedAduj'];
$csv_output .= '"'.str_replace('"', '""', number_format($TotDedAduj)).'",';	
$csv_output .= "\n";


$csv_output .= '"'.str_replace('"', '""', '38').'",';
$csv_output .= '"'.str_replace('"', '""', 'RECOVERY FOR SPECIAL ALLOW').'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res4['RecSplAllow']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res5['RecSplAllow']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res6['RecSplAllow']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res7['RecSplAllow']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res8['RecSplAllow']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res9['RecSplAllow']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res10['RecSplAllow']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res11['RecSplAllow']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res12['RecSplAllow']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res1['RecSplAllow']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res2['RecSplAllow']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res3['RecSplAllow']))).'",';
$TotRecSplAllow=$res4['RecSplAllow']+$res5['RecSplAllow']+$res6['RecSplAllow']+$res7['RecSplAllow']+$res8['RecSplAllow']+$res9['RecSplAllow']+$res10['RecSplAllow']+$res11['RecSplAllow']+$res12['RecSplAllow']+$res1['RecSplAllow']+$res2['RecSplAllow']+$res3['RecSplAllow'];
$csv_output .= '"'.str_replace('"', '""', number_format($TotRecSplAllow)).'",';	
$csv_output .= "\n";

$csv_output .= '"'.str_replace('"', '""', '39').'",';
$csv_output .= '"'.str_replace('"', '""', 'ID CARD RECOVERY').'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res4['IDCard_Recovery']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res5['IDCard_Recovery']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res6['IDCard_Recovery']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res7['IDCard_Recovery']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res8['IDCard_Recovery']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res9['IDCard_Recovery']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res10['IDCard_Recovery']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res11['IDCard_Recovery']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res12['IDCard_Recovery']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res1['IDCard_Recovery']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res2['IDCard_Recovery']))).'",';
$csv_output .= '"'.str_replace('"', '""', number_format(floatval($res3['IDCard_Recovery']))).'",';
$TotIDCard_Recovery=$res4['IDCard_Recovery']+$res5['IDCard_Recovery']+$res6['IDCard_Recovery']+$res7['IDCard_Recovery']+$res8['IDCard_Recovery']+$res9['IDCard_Recovery']+$res10['IDCard_Recovery']+$res11['IDCard_Recovery']+$res12['IDCard_Recovery']+$res1['IDCard_Recovery']+$res2['IDCard_Recovery']+$res3['IDCard_Recovery'];
$csv_output .= '"'.str_replace('"', '""', number_format($TotIDCard_Recovery)).'",';	
$csv_output .= "\n";

$TotDed4=$res4['TotPfEmp']+$res4['ArrPf']+$res4['Esic']+$res4['ArrEsic']+$res4['Tds']+$res4['Dedcea']+$res4['Dedma']+$res4['Dedlta']+$res4['ValCon']+$res4['DedAduj']+$res4['NPS']+$res4['RecSplAllow']+$res4['IDCard_Recovery'];
$TotDed5=$res5['TotPfEmp']+$res5['ArrPf']+$res5['Esic']+$res5['ArrEsic']+$res5['Tds']+$res5['Dedcea']+$res5['Dedma']+$res5['Dedlta']+$res5['ValCon']+$res5['DedAduj']+$res5['NPS']+$res5['RecSplAllow']+$res5['IDCard_Recovery'];
$TotDed6=$res6['TotPfEmp']+$res6['ArrPf']+$res6['Esic']+$res6['ArrEsic']+$res6['Tds']+$res6['Dedcea']+$res6['Dedma']+$res6['Dedlta']+$res6['ValCon']+$res6['DedAduj']+$res6['NPS']+$res6['RecSplAllow']+$res6['IDCard_Recovery'];
$TotDed7=$res7['TotPfEmp']+$res7['ArrPf']+$res7['Esic']+$res7['ArrEsic']+$res7['Tds']+$res7['Dedcea']+$res7['Dedma']+$res7['Dedlta']+$res7['ValCon']+$res7['DedAduj']+$res7['NPS']+$res7['RecSplAllow']+$res7['IDCard_Recovery'];
$TotDed8=$res8['TotPfEmp']+$res8['ArrPf']+$res8['Esic']+$res8['ArrEsic']+$res8['Tds']+$res8['Dedcea']+$res8['Dedma']+$res8['Dedlta']+$res8['ValCon']+$res8['DedAduj']+$res8['NPS']+$res8['RecSplAllow']+$res8['IDCard_Recovery'];
$TotDed9=$res9['TotPfEmp']+$res9['ArrPf']+$res9['Esic']+$res9['ArrEsic']+$res9['Tds']+$res9['Dedcea']+$res9['Dedma']+$res9['Dedlta']+$res9['ValCon']+$res9['DedAduj']+$res9['NPS']+$res9['RecSplAllow']+$res9['IDCard_Recovery'];
$TotDed10=$res10['TotPfEmp']+$res10['ArrPf']+$res10['Esic']+$res10['ArrEsic']+$res10['Tds']+$res10['Dedcea']+$res10['Dedma']+$res10['Dedlta']+$res10['ValCon']+$res10['DedAduj']+$res10['NPS']+$res10['RecSplAllow']+$res10['IDCard_Recovery'];
$TotDed11=$res11['TotPfEmp']+$res11['ArrPf']+$res11['Esic']+$res11['ArrEsic']+$res11['Tds']+$res11['Dedcea']+$res11['Dedma']+$res11['Dedlta']+$res11['ValCon']+$res11['DedAduj']+$res11['NPS']+$res11['RecSplAllow']+$res11['IDCard_Recovery'];
$TotDed12=$res12['TotPfEmp']+$res12['ArrPf']+$res12['Esic']+$res12['ArrEsic']+$res12['Tds']+$res12['Dedcea']+$res12['Dedma']+$res12['Dedlta']+$res12['ValCon']+$res12['DedAduj']+$res12['NPS']+$res12['RecSplAllow']+$res12['IDCard_Recovery'];
$TotDed1=$res1['TotPfEmp']+$res1['ArrPf']+$res1['Esic']+$res1['ArrEsic']+$res1['Tds']+$res1['Dedcea']+$res1['Dedma']+$res1['Dedlta']+$res1['ValCon']+$res1['DedAduj']+$res1['NPS']+$res1['RecSplAllow']+$res1['IDCard_Recovery'];
$TotDed2=$res2['TotPfEmp']+$res2['ArrPf']+$res2['Esic']+$res2['ArrEsic']+$res2['Tds']+$res2['Dedcea']+$res2['Dedma']+$res2['Dedlta']+$res2['ValCon']+$res2['DedAduj']+$res2['NPS']+$res2['RecSplAllow']+$res2['IDCard_Recovery'];
$TotDed3=$res3['TotPfEmp']+$res3['ArrPf']+$res3['Esic']+$res3['ArrEsic']+$res3['Tds']+$res3['Dedcea']+$res3['Dedma']+$res3['Dedlta']+$res3['ValCon']+$res3['DedAduj']+$res3['NPS']+$res3['RecSplAllow']+$res3['IDCard_Recovery'];

$csv_output .= '"'.str_replace('"', '""', '38').'",';
$csv_output .= '"'.str_replace('"', '""', 'TOTAL DEDUCT').'",';
$csv_output .= '"'.str_replace('"', '""', number_format($TotDed4)).'",';
$csv_output .= '"'.str_replace('"', '""', number_format($TotDed5)).'",';
$csv_output .= '"'.str_replace('"', '""', number_format($TotDed6)).'",';
$csv_output .= '"'.str_replace('"', '""', number_format($TotDed7)).'",';
$csv_output .= '"'.str_replace('"', '""', number_format($TotDed8)).'",';
$csv_output .= '"'.str_replace('"', '""', number_format($TotDed9)).'",';
$csv_output .= '"'.str_replace('"', '""', number_format($TotDed10)).'",';
$csv_output .= '"'.str_replace('"', '""', number_format($TotDed11)).'",';
$csv_output .= '"'.str_replace('"', '""', number_format($TotDed12)).'",';
$csv_output .= '"'.str_replace('"', '""', number_format($TotDed1)).'",';
$csv_output .= '"'.str_replace('"', '""', number_format($TotDed2)).'",';
$csv_output .= '"'.str_replace('"', '""', number_format($TotDed3)).'",';
$TotalDeduct=$TotDed4+$TotDed5+$TotDed6+$TotDed7+$TotDed8+$TotDed9+$TotDed10+$TotDed11+$TotDed12+$TotDed1+$TotDed2+$TotDed3;
$csv_output .= '"'.str_replace('"', '""', number_format($TotalDeduct)).'",';	
$csv_output .= "\n";

$TotNetAmt4=$TotG4-$TotDed4; $TotNetAmt5=$TotG5-$TotDed5; $TotNetAmt6=$TotG6-$TotDed6; $TotNetAmt7=$TotG7-$TotDed7; $TotNetAmt8=$TotG8-$TotDed8; 
$TotNetAmt9=$TotG9-$TotDed9; $TotNetAmt10=$TotG10-$TotDed10; $TotNetAmt11=$TotG11-$TotDed11; $TotNetAmt12=$TotG12-$TotDed12; $TotNetAmt1=$TotG1-$TotDed1; 
$TotNetAmt2=$TotG2-$TotDed2; $TotNetAmt3=$TotG3-$TotDed3;

$csv_output .= '"'.str_replace('"', '""', '39').'",';
$csv_output .= '"'.str_replace('"', '""', 'TOTAL NET_AMOUNT').'",';
$csv_output .= '"'.str_replace('"', '""', number_format($TotNetAmt4)).'",';
$csv_output .= '"'.str_replace('"', '""', number_format($TotNetAmt5)).'",';
$csv_output .= '"'.str_replace('"', '""', number_format($TotNetAmt6)).'",';
$csv_output .= '"'.str_replace('"', '""', number_format($TotNetAmt7)).'",';
$csv_output .= '"'.str_replace('"', '""', number_format($TotNetAmt8)).'",';
$csv_output .= '"'.str_replace('"', '""', number_format($TotNetAmt9)).'",';
$csv_output .= '"'.str_replace('"', '""', number_format($TotNetAmt10)).'",';
$csv_output .= '"'.str_replace('"', '""', number_format($TotNetAmt11)).'",';
$csv_output .= '"'.str_replace('"', '""', number_format($TotNetAmt12)).'",';
$csv_output .= '"'.str_replace('"', '""', number_format($TotNetAmt1)).'",';
$csv_output .= '"'.str_replace('"', '""', number_format($TotNetAmt2)).'",';
$csv_output .= '"'.str_replace('"', '""', number_format($TotNetAmt3)).'",';
$TotalNetAmount=$TotNetAmt4+$TotNetAmt5+$TotNetAmt6+$TotNetAmt7+$TotNetAmt8+$TotNetAmt9+$TotNetAmt10+$TotNetAmt11+$TotNetAmt12+$TotNetAmt1+$TotNetAmt2+$TotNetAmt3;
$csv_output .= '"'.str_replace('"', '""', number_format($TotalNetAmount)).'",';	
$csv_output .= "\n";

# Close the MySql connection
mysql_close($con);
# Set the headers so the file downloads
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Content-Length: " . strlen($csv_output));
header("Content-type: text/x-csv");
header("Content-Disposition: attachment; filename=EmpPaidSalaryValues_".$PRD."_".$Dept.".csv");
echo $csv_output;
exit;
}


?>