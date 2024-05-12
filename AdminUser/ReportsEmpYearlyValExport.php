<?php
require_once('config/config.php');
$sY=mysql_query("select * from hrm_year where YearId=".$_REQUEST['y']."", $con); $rY=mysql_fetch_assoc($sY); 
$FD=date("Y",strtotime($rY['FromDate'])); $TD=date("Y",strtotime($rY['ToDate'])); $PRD=$FD.'-'.$TD;
$ffd=date("y",strtotime($rY['FromDate'])); $ttd=date("y",strtotime($rY['ToDate']));
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

 if($_REQUEST['d']>0){ $sqlE=mysql_query("select distinct(hrm_employee_monthlypayslip.EmployeeID) from hrm_employee_monthlypayslip INNER JOIN hrm_employee ON hrm_employee_monthlypayslip.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_general ON hrm_employee_monthlypayslip.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee.CompanyId=".$_REQUEST['c']." AND hrm_employee_general.DepartmentId=".$_REQUEST['d']." AND ((Month>=4 AND Month<=12 AND Year=".$FD.") OR (Month>=1 AND Month<=3 AND Year=".$TD.")) order by EmployeeID ASC",$con); }
 elseif($_REQUEST['d']==0){ $sqlE=mysql_query("select distinct(hrm_employee_monthlypayslip.EmployeeID) from hrm_employee_monthlypayslip INNER JOIN hrm_employee ON hrm_employee_monthlypayslip.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_general ON hrm_employee_monthlypayslip.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee.CompanyId=".$_REQUEST['c']." AND ((Month>=4 AND Month<=12 AND Year=".$FD.") OR (Month>=1 AND Month<=3 AND Year=".$TD.")) order by EmployeeID ASC",$con); } 
 
 
 //AND hrm_employee_general.DepartmentId!=17 AND hrm_employee_general.DepartmentId!=18 AND hrm_employee_general.DepartmentId!=23
 //AND hrm_employee_general.DepartmentId!=17 AND hrm_employee_general.DepartmentId!=18 AND hrm_employee_general.DepartmentId!=23
 

$sn=1; while($resE=mysql_fetch_assoc($sqlE)){ 
  $sql=mysql_query("select SUM(Basic) as Bas,SUM(Hra) as Hra,SUM(Convance) as Con,SUM(Special) as Spe,SUM(Bonus) as Bon,SUM(DA) as Da,SUM(Arreares) as Arr,SUM(LeaveEncash) as Lea,SUM(Incentive) as Inc,SUM(VariableAdjustment) as Var,SUM(PerformancePay) as Per,SUM(CCA) as Cca,SUM(RA) as Ra,SUM(Arr_Basic) as ArrBas,SUM(Arr_Hra) as ArrHra,SUM(Arr_Spl) as ArrSpl,SUM(Arr_Conv) as ArrCon,SUM(YCea) as Ycea,SUM(YMr) as Ymr,SUM(YLta) as Ylta,SUM(Tot_Pf_Employee) as TotPfEmp,SUM(TDS) as Tds,SUM(ESCI_Employee) as Esic,SUM(Arr_Pf) as ArrPf,SUM(Arr_Esic) as ArrEsic,SUM(VolContrib) as ValCon,SUM(DeductAdjmt) as DedAduj,SUM(CEA_Ded) as Dedcea,SUM(MA_Ded) as dedma,SUM(LTA_Ded) as Dedlta,EmpCode,Fname,Sname,Lname,hrm_employee_general.DepartmentId from hrm_employee_monthlypayslip INNER JOIN hrm_employee ON hrm_employee_monthlypayslip.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_general ON hrm_employee_monthlypayslip.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee.CompanyId=".$_REQUEST['c']." AND hrm_employee_monthlypayslip.EmployeeID=".$resE['EmployeeID']." AND ((Month>=4 AND Month<=12 AND Year=".$FD.") OR (Month>=1 AND Month<=3 AND Year=".$TD."))", $con); $res=mysql_fetch_assoc($sql);

  
  $sqlD=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$res['DepartmentId'], $con); $resD=mysql_fetch_assoc($sqlD);
  
if($res['Bas']!=0 OR $res['Hra']!=0 OR $res['Con']!=0 OR $res['Spe']!=0 OR $res['Da']!=0 OR $res['Inc']!=0 OR $res['Per']!=0 OR $res['Lea']!=0 OR $res['Var']!=0 OR $res['Cca']!=0 OR $res['Ra']!=0 OR $res['Bon']!=0 OR $res['Ycea']!=0 OR $res['Ymr']!=0 OR $res['Ylta']!=0 OR $res['ArrBas']!=0 OR $res['ArrHra']!=0 OR $res['ArrCon']!=0 OR $res['ArrSpl']!=0 OR $res['TotPfEmp']!=0 OR $res['ArrPf']!=0 OR $res['Esic']!=0 OR $res['ArrEsic']!=0 OR $res['Tds']!=0 OR $res['Dedcea']!=0 OR $res['Dedma']!=0 OR $res['Dedlta']!=0 OR $res['VolCon']!=0 OR $res['DedAduj']!=0){ 
 
$csv_output .= '"'.str_replace('"', '""', $sn).'",';
$csv_output .= '"'.str_replace('"', '""', $res['EmpCode']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['Fname'].' '.$res['Sname'].' '.$res['Lname']).'",';
$csv_output .= '"'.str_replace('"', '""', $resD['DepartmentCode']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['Bas']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['Hra']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['Con']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['Spe']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['Da']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['Inc']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['Per']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['Lea']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['Var']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['Cca']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['Ra']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['Bon']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['Ycea']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['Ymr']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['Ylta']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['ArrBas']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['ArrHra']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['ArrCon']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['ArrSpl']).'",';

$Gross=$res['Bas']+$res['Hra']+$res['Con']+$res['Spe']+$res['Da']+$res['Inc']+$res['Per']+$res['Lea']+$res['Var']+$res['Cca']+$res['Ra']+$res['Bon']+$res['Ycea']+$res['Ymr']+$res['Ylta']+$res['ArrBas']+$res['ArrHra']+$res['ArrCon']+$res['ArrSpl'];
$csv_output .= '"'.str_replace('"', '""', $Gross).'",';

$csv_output .= '"'.str_replace('"', '""', $res['TotPfEmp']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['ArrPf']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['Esic']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['ArrEsic']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['Tds']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['Dedcea']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['Dedma']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['Dedlta']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['VolCon']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['DedAduj']).'",';

$TotDeduct=$res['TotPfEmp']+$res['ArrPf']+$res['Esic']+$res['ArrEsic']+$res['Tds']+$res['Dedcea']+$res['Dedma']+$res['Dedlta']+$res['VolCon']+$res['DedAduj'];
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