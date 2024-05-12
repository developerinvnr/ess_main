<?php
require_once('config/config.php');
$sY=mysql_query("select * from hrm_year where YearId=".$_REQUEST['Y']."", $con); $rY=mysql_fetch_assoc($sY); 
$FD=date("Y",strtotime($rY['FromDate'])); $TD=date("Y",strtotime($rY['ToDate'])); $MY=$FD-1;  $PRD=$MY.'-'.$FD;
date_default_timezone_set('Asia/Calcutta');

if($_REQUEST['action']='LeaveTotExport') 
{ 
 if($_REQUEST['value']=='All') {$DeptV='All_Employee';}
 else{ $sqlDeptV=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$_REQUEST['value'], $con); $resDeptV=mysql_fetch_assoc($sqlDeptV); $DeptV=$resDeptV['DepartmentCode'];}
$xls_filename = 'EmpTotal_Availed_Leave_'.$DeptV.''.$_REQUEST['Y'].'.xls';

$BY=date("Y")-1;
if($_REQUEST['Y']>=date("Y"))
{ $AttTable='hrm_employee_attendance'; $AttReport='hrm_employee_attreport'; 
  $LeaveTable='hrm_employee_monthlyleave_balance'; }
elseif($_REQUEST['Y']==$BY AND date("m")=='01')
{ $AttTable='hrm_employee_attendance'; $AttReport='hrm_employee_attreport'; 
  $LeaveTable='hrm_employee_monthlyleave_balance'; }
elseif($_REQUEST['Y']==$BY AND date("m")>1)
{ $AttTable='hrm_employee_attendance_'.$_REQUEST['Y']; $AttReport='hrm_employee_attreport_'.$_REQUEST['Y']; 
  $LeaveTable='hrm_employee_monthlyleave_balance_'.$_REQUEST['Y']; }
else
{$AttTable='hrm_employee_attendance_'.$_REQUEST['Y']; $AttReport='hrm_employee_attreport_'.$_REQUEST['Y']; 
  $LeaveTable='hrm_employee_monthlyleave_balance_'.$_REQUEST['Y']; } 

header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=$xls_filename");
header("Pragma: no-cache");
header("Expires: 0");
 
$sep = "\t"; 
echo "Sn\tEmpCode\tName\tDepartment\tCL-Crd-Jan\tCL-Avl-Jan\tCL-Bal-Jan\tPL-Crd-Jan\tPL-Avl-Jan\tPL-Bal-Jan\tFL-Crd-Jan\tFL-Avl-Jan\tFL-Bal-Jan\tSL-Ope-Jan\tSL-Crd-Jan\tSL-Tot-Jan\tSL-Avl-Jan\tSL-Bal-Jan\tEL-Ope-Jan\tEL-Crd-Jan\tEL-Tot-Jan\tEL-Enc-Jan\tEL-Avl-Jan\tEL-Bal-Jan";

for($i=1; $i<=11; $i++){ if($i==1){$mn='Feb';}elseif($i==2){$mn='Mar';}elseif($i==3){$mn='Apr';}elseif($i==4){$mn='May';}elseif($i==5){$mn='Jun';}elseif($i==6){$mn='Jul';}elseif($i==7){$mn='Aug';}elseif($i==8){$mn='Sep';}elseif($i==9){$mn='Oct';}elseif($i==10){$mn='Nov';}elseif($i==11){$mn='Dec';}
echo "\tCL-Ope-".$mn."\tCL-Avl-".$mn."\tCL-Bal-".$mn."\tPL-Ope-".$mn."\tPL-Avl-".$mn."\tPL-Bal-".$mn."\tFL-Ope-".$mn."\tFL-Avl-".$mn."\tFL-Bal-".$mn."\tSL-Ope-".$mn."\tSL-Avl-".$mn."\tSL-Bal-".$mn."\tEL-Ope-".$mn."\tEL-Avl-".$mn."\tEL-Bal-".$mn."";
}

echo "\tLv-Jan\tLv-Feb\tLv-Mar\tLv-Apr\tLv-May\tLv-Jun\tLv-Jul\tLv-Aug\tLv-Sep\tLv-Oct\tLv-Nov\tLv-Dec\tTotal-CL\tTotal-PL \tTotal-FL\tTotal-SL\tTotal-EL\tTot-Leave\tTot-HO\tTot-WD\tTot-(HO+WD)";

print("\n");

if($_REQUEST['D']!='All' AND $_REQUEST['st']!='A'){ $SqlEmp=mysql_query("select e.*,DepartmentId,DateJoining from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID where g.DepartmentId=".$_REQUEST['D']." AND e.CompanyId=".$_REQUEST['C']." AND (e.DateOfSepration='0000-00-00' OR e.DateOfSepration='1970-01-01' OR e.DateOfSepration>='".date($_REQUEST['Y']."-01-01")."') AND g.DateJoining<='".date($_REQUEST['Y']."-12-31")."' order by e.EmpCode ASC", $con); }
      if($_REQUEST['D']=='All' AND $_REQUEST['st']!='A'){ $SqlEmp=mysql_query("select e.*,DepartmentId,DateJoining from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID where e.CompanyId=".$_REQUEST['C']." AND g.DepartmentId!=17 AND g.DepartmentId!=18 AND g.DepartmentId!=23 AND g.DepartmentId!=0 AND (e.DateOfSepration='0000-00-00' OR e.DateOfSepration='1970-01-01' OR e.DateOfSepration>='".date($_REQUEST['Y']."-01-01")."') AND g.DateJoining<='".date($_REQUEST['Y']."-12-31")."' order by e.EmpCode ASC", $con); }
	  if($_REQUEST['D']!='All' AND $_REQUEST['st']=='A'){ $SqlEmp=mysql_query("select e.*,DepartmentId,DateJoining from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID where e.EmpStatus='".$_REQUEST['st']."' AND g.DepartmentId=".$_REQUEST['D']." AND e.CompanyId=".$_REQUEST['C']." AND g.DateJoining<='".date($_REQUEST['Y']."-12-31")."' order by e.EmpCode ASC", $con); }
      if($_REQUEST['D']=='All' AND $_REQUEST['st']=='A'){ $SqlEmp=mysql_query("select e.*,DepartmentId,DateJoining from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID where e.EmpStatus='".$_REQUEST['st']."' AND e.CompanyId=".$_REQUEST['C']." AND g.DepartmentId!=17 AND g.DepartmentId!=18 AND g.DepartmentId!=23 AND g.DepartmentId!=0 AND g.DateJoining<='".date($_REQUEST['Y']."-12-31")."' order by e.EmpCode ASC", $con); }
	  
$Sno=1; $SqlRows=mysql_num_rows($SqlEmp); while($ResEmp=mysql_fetch_array($SqlEmp)) { 
$Ename=$ResEmp['Fname'].' '.$ResEmp['Sname'].' '.$ResEmp['Lname']; $Y=$_REQUEST['Y']; 
$sqlDept=mysql_query("select DepartmentCode,DepartmentName from hrm_department where DepartmentId=".$ResEmp['DepartmentId'], $con); $resDept=mysql_fetch_assoc($sqlDept);

  $schema_insert = "";
  $schema_insert .= $Sno.$sep;
  $schema_insert .= $ResEmp['EmpCode'].$sep;
  $schema_insert .= $Ename.$sep;
  $schema_insert .= $resDept['DepartmentCode'].$sep;
$Lv=mysql_query("select * from ".$LeaveTable." where EmployeeID=".$ResEmp['EmployeeID']." AND Month=01 AND Year='".$_REQUEST['Y']."'", $con); $rLv=mysql_fetch_array($Lv);
  $schema_insert .= floatval($rLv['CreditedCL']).$sep;
  $schema_insert .= floatval($rLv['AvailedCL']).$sep;
  $schema_insert .= floatval($rLv['BalanceCL']).$sep;
  $schema_insert .= floatval($rLv['CreditedPL']).$sep;
  $schema_insert .= floatval($rLv['AvailedPL']).$sep;
  $schema_insert .= floatval($rLv['BalancePL']).$sep;
  $schema_insert .= floatval($rLv['CreditedOL']).$sep;
  $schema_insert .= floatval($rLv['AvailedOL']).$sep;
  $schema_insert .= floatval($rLv['BalanceOL']).$sep;

  $schema_insert .= floatval($rLv['OpeningSL']).$sep;
  $schema_insert .= floatval($rLv['CreditedSL']).$sep;
  $schema_insert .= floatval($rLv['TotSL']).$sep;
  $schema_insert .= floatval($rLv['AvailedSL']).$sep;
  $schema_insert .= floatval($rLv['BalanceSL']).$sep;

  $schema_insert .= floatval($rLv['OpeningEL']).$sep;
  $schema_insert .= floatval($rLv['CreditedEL']).$sep;
  $schema_insert .= floatval($rLv['TotEL']).$sep;
  $schema_insert .= floatval($rLv['EnCashEL']).$sep;
  $schema_insert .= floatval($rLv['AvailedEL']).$sep;
  $schema_insert .= floatval($rLv['BalanceEL']).$sep;

for($i=2; $i<=12; $i++){ 
 $Lvv=mysql_query("select * from ".$LeaveTable." where EmployeeID=".$ResEmp['EmployeeID']." AND Month=".$i." AND Year='".$_REQUEST['Y']."'", $con); $rLvv=mysql_fetch_array($Lvv);
 
  $schema_insert .= floatval($rLvv['OpeningCL']).$sep;
  $schema_insert .= floatval($rLvv['AvailedCL']).$sep;
  $schema_insert .= floatval($rLvv['BalanceCL']).$sep;
 
  $schema_insert .= floatval($rLvv['OpeningPL']).$sep;
  $schema_insert .= floatval($rLvv['AvailedPL']).$sep;
  $schema_insert .= floatval($rLvv['BalancePL']).$sep;

  $schema_insert .= floatval($rLvv['OpeningOL']).$sep;
  $schema_insert .= floatval($rLvv['AvailedOL']).$sep;
  $schema_insert .= floatval($rLvv['BalanceOL']).$sep; 
 
  $schema_insert .= floatval($rLvv['OpeningSL']).$sep;
  $schema_insert .= floatval($rLvv['AvailedSL']).$sep;
  $schema_insert .= floatval($rLvv['BalanceSL']).$sep;
 
  $schema_insert .= floatval($rLvv['OpeningEL']).$sep;
  $schema_insert .= floatval($rLvv['AvailedEL']).$sep;
  $schema_insert .= floatval($rLvv['BalanceEL']).$sep;
 
}   
  
for($i=1; $i<=12; $i++) { $yfT=$Y."-01-01"; $ytT=$Y."-12-31"; 
$TotL=mysql_query("select MonthAtt_TotLeave from ".$LeaveTable." where EmployeeID=".$ResEmp['EmployeeID']." AND Month=".$i." AND Year=".$Y, $con);
$resTotL=mysql_fetch_array($TotL); if($resTotL['MonthAtt_TotLeave']!='' AND $resTotL['MonthAtt_TotLeave']!=0){$TotMonthL=$resTotL['MonthAtt_TotLeave'];}else{$TotMonthL='';}
  $schema_insert .= $TotMonthL.$sep;
}

$TotL=mysql_query("select SUM(AvailedCL)as TotCL, SUM(AvailedSL)as TotSL, SUM(AvailedPL)as TotPL, SUM(AvailedEL)as TotEL, SUM(AvailedOL)as TotOL, SUM(MonthAtt_TotLeave)as TotLeave, SUM(MonthAtt_TotPR) as PR, SUM(MonthAtt_TotOD) as OD, SUM(MonthAtt_TotHO) as HO from ".$LeaveTable." where EmployeeID=".$ResEmp['EmployeeID']." AND Year=".$Y, $con); 
/*$TotSL=mysql_query("select SUM(MonthAtt_TotSL)as TotSL from hrm_employee_monthatt where EmployeeID=".$ResEmp['EmployeeID']." AND Year=".$Y, $con);
$TotPL=mysql_query("select SUM(MonthAtt_TotPL)as TotPL from hrm_employee_monthatt where EmployeeID=".$ResEmp['EmployeeID']." AND Year=".$Y, $con);
$TotEL=mysql_query("select SUM(MonthAtt_TotEL)as TotEL from hrm_employee_monthatt where EmployeeID=".$ResEmp['EmployeeID']." AND Year=".$Y, $con);
$TotFL=mysql_query("select SUM(MonthAtt_TotOL)as TotOL from hrm_employee_monthatt where EmployeeID=".$ResEmp['EmployeeID']." AND Year=".$Y, $con);*/
$resTotL=mysql_fetch_array($TotL); /*$resTotSL=mysql_fetch_array($TotSL); $resTotPL=mysql_fetch_array($TotPL); $resTotEL=mysql_fetch_array($TotEL);
$resTotFL=mysql_fetch_array($TotFL);*/
  $schema_insert .= $resTotL['TotCL'].$sep;
  $schema_insert .= $resTotL['TotPL'].$sep;
  $schema_insert .= $resTotL['TotOL'].$sep;
  $schema_insert .= $resTotL['TotSL'].$sep;
  $schema_insert .= $resTotL['TotEL'].$sep;


$yfT=$Y."-01-01"; $ytT=$Y."-12-31";  
//$TW=mysql_query("select * from ".$AttTable." where EmployeeID=".$ResEmp['EmployeeID']." AND AttValue='P' AND AttDate>='".$yfT."' AND AttDate<='".$ytT."' group by AttDate", $con); $TOD=mysql_query("select * from ".$AttTable." where EmployeeID=".$ResEmp['EmployeeID']." AND AttValue='OD' AND AttDate>='".$yfT."' AND AttDate<='".$ytT."' group by AttDate", $con); $THO=mysql_query("select * from ".$AttTable." where EmployeeID=".$ResEmp['EmployeeID']." AND AttValue='HO' AND AttDate>='".$yfT."' AND AttDate<='".$ytT."' AND CheckSunday!='Y' group by AttDate", $con);
//$TC_W=mysql_num_rows($TW); $TC_OD=mysql_num_rows($TOD); $TC_HO=mysql_num_rows($THO); 

$TCH=mysql_query("select * from ".$AttTable." where EmployeeID=".$ResEmp['EmployeeID']." AND (AttValue='CH' OR AttValue='ACH') AND AttDate>='".$yfT."' AND AttDate<='".$ytT."' group by AttDate", $con); $TSH=mysql_query("select * from ".$AttTable." where EmployeeID=".$ResEmp['EmployeeID']." AND (AttValue='SH' OR AttValue='ASH') AND AttDate>='".$yfT."' AND AttDate<='".$ytT."' group by AttDate", $con); $TPH=mysql_query("select * from ".$AttTable." where EmployeeID=".$ResEmp['EmployeeID']." AND (AttValue='PH' OR AttValue='APH') AND AttDate>='".$yfT."' AND AttDate<='".$ytT."' group by AttDate", $con); $THF=mysql_query("select * from ".$AttTable." where EmployeeID=".$ResEmp['EmployeeID']." AND AttValue='HF' AND AttDate>='".$yfT."' AND AttDate<='".$ytT."' group by AttDate", $con);  

//$TC_W=mysql_num_rows($TW); $TC_OD=mysql_num_rows($TOD); $TC_HO=mysql_num_rows($THO); 
//$TCountW=$TC_W; $TCountOD=$TC_OD; $TCountHO=$TC_HO;

$TC_CH=mysql_num_rows($TCH); $TC_SH=mysql_num_rows($TSH); $TC_PH=mysql_num_rows($TPH); 
$TC_HF=mysql_num_rows($THF); 
$TCountCH=$TC_CH/2; $TCountSH=$TC_SH/2; $TCountPH=$TC_PH/2; $TCountHF=$TC_HF/2; 

//$TTotW=$TCountW+$TCountOD+$TCountCH+$TCountSH+$TCountPH+$TCountHF; 
//$TotWDWithHo=$TTotW+$TCountHO;

$TTotW=$resTotL['PR']+$resTotL['OD']+$TCountCH+$TCountSH+$TCountPH+$TCountHF; 
$TotWDWithHo=$TTotW+$resTotL['HO'];

/*$TotLL=mysql_query("select SUM(MonthAtt_TotLeave)as TotLeave from hrm_employee_monthatt where EmployeeID=".$ResEmp['EmployeeID']." AND Year=".$Y, $con); 
$resTotLL=mysql_fetch_array($TotLL);*/

  $schema_insert .= $resTotL['TotLeave'].$sep;
  $schema_insert .= $resTotL['HO'].$sep;
  $schema_insert .= $TTotW.$sep;
  $schema_insert .= $TotWDWithHo.$sep;
   					  
  $schema_insert = str_replace($sep."$", "", $schema_insert);
  $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
  $schema_insert .= "\t";
  print(trim($schema_insert));
  print "\n";
 }


}
?>
