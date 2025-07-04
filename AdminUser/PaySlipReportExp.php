<?php require_once('config/config.php');
date_default_timezone_set('Asia/Calcutta');
$xls_filename = 'PayReports_'.date("F-Y",strtotime($_REQUEST['Y']."-".$_REQUEST['m']."-01")).'.xls'; 

header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=$xls_filename");
header("Pragma: no-cache");
header("Expires: 0");
$sep = "\t"; 

echo "Sn\tEC\tName\tPaid Day\tBasic\tHra";	
if($_REQUEST['con']>0){echo "\tConveyance";}
if($_REQUEST['car']>0){echo "\tCar Allow";} echo "\tBonus\tSpecial\tDA";
if($_REQUEST['inc']>0){echo "\tIncentive";}	
if($_REQUEST['arr']>0){echo "\tArrear";}
if($_REQUEST['va']>0){echo "\tVariable Adjust";}	
if($_REQUEST['pp']>0){echo "\tPerform Pay";}
if($_REQUEST['ppy']>0){echo "\tPP_Year";}
if($_REQUEST['NtP']>0){echo "\tNotice Pay";}
if($_REQUEST['PP_Inc']>0){echo "\tPerformance Incentive";}
if($_REQUEST['cca']>0){echo "\tCCA";}	
if($_REQUEST['ra']>0){echo "\tRA";}
if($_REQUEST['vr']>0){echo "\tVariable Reim.";}
if($_REQUEST['ta']>0){echo "\tTA";}
if($_REQUEST['arrbas']>0){echo "\tArr Basic";}
if($_REQUEST['arrhr']>0){echo "\tArr HRA";}
if($_REQUEST['arrcar']>0){echo "\tArr CarAllow";}
if($_REQUEST['arrsp']>0){echo "\tArr Spl";}
if($_REQUEST['arrcon']>0){echo "\tArr Conv";}
if($_REQUEST['Deputation_Allow']>0){echo "\tDeputation Allow";}

if($_REQUEST['Arr_Bonus']>0){echo "\tArr Bonus";}
if($_REQUEST['BA']>0){echo "\tBonus_Adjustment";}
if($_REQUEST['Arr_LTARemb']>0){echo "\tArr LTARemb";}
if($_REQUEST['Arr_RA']>0){echo "\tArr RA";}
if($_REQUEST['Arr_PerformPay']>0){echo "\tArr PP";}


if($_REQUEST['arrencash']>0){echo "\tArr LV-Encash";}
if($_REQUEST['arrpf']>0){echo "\tArr PF";}
if($_REQUEST['arresic']>0){echo "\tArr ESIC";}

if($_REQUEST['arrcomm_allow']>0){echo "\tArr Communication Allow";}


if($_REQUEST['bonus']>0){echo "\tBonus";}
if($_REQUEST['lenc']>0){echo "\tLeave EnCash";}
if($_REQUEST['taxcea']>0){echo "\tTaxSv CEA";}
if($_REQUEST['taxmr']>0){echo "\tTaxSv MR";}
if($_REQUEST['taxlta']>0){echo "\tTaxSv LTA";} 
if($_REQUEST['NPSS']>0){echo "\tNational pension scheme";}

echo "\tCommunication Allow";
echo "\tCar Allow";

echo "\tTotal Earning\tPF\tESIC\tTDS";
if($_REQUEST['dedvc']>0){echo "\tVC";}	
if($_REQUEST['dedadj']>0){echo "\tDeduct Adjmnt";}
if($_REQUEST['dedca']>0){echo "\tRec Conveyance Allow";} 
if($_REQUEST['RecSplAllow']>0){echo "\tRecovery Special Allow";} 
if($_REQUEST['RAR']>0){echo "\tRecovery RA";}
if($_REQUEST['IDCard_Recovery']>0){echo "\tID Card Recovery";}

if($_REQUEST['NPS']>0){echo "\tNPS";} echo "\tTotal Deduct\tNet Amount";
print("\n");

$BY=date("Y")-1;
if($_REQUEST['Y']>=date("Y")){ $PayTable='hrm_employee_monthlypayslip'; }
elseif($_REQUEST['Y']==$BY AND date("m")=='01' AND $_REQUEST['m']==12)
{ $PayTable='hrm_employee_monthlypayslip'; }
elseif($_REQUEST['Y']==$BY AND $_REQUEST['m']<12)
{ $PayTable='hrm_employee_monthlypayslip_'.$_REQUEST['Y']; }
else
{ $PayTable='hrm_employee_monthlypayslip_'.$_REQUEST['Y'];  }

$month=$_REQUEST['m']; $EmpMgmtId="e.EmployeeID!=223 AND e.EmployeeID!=224 AND e.EmployeeID!=233 AND e.EmployeeID!=234 AND e.EmployeeID!=235 AND e.EmployeeID!=259 AND e.EmployeeID!=259";
if($_REQUEST['D']!='All'){ $SqlEmp=mysql_query("select e.EmployeeID,EmpCode,Fname,Sname,Lname from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID where e.EmpStatus!='De' AND g.DepartmentId=".$_REQUEST['D']." AND e.CompanyId=".$_REQUEST['C']." AND (e.DateOfSepration='0000-00-00' OR e.DateOfSepration='1970-01-01' OR e.DateOfSepration>='".date($_REQUEST['Y']."-".$_REQUEST['m']."-01")."') AND g.DateJoining<='".date($_REQUEST['Y']."-".$_REQUEST['m']."-31")."' order by e.ECode ASC", $con); }
if($_REQUEST['D']=='All'){ $SqlEmp=mysql_query("select e.EmployeeID,EmpCode,Fname,Sname,Lname from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID where e.EmpStatus!='De' AND e.CompanyId=".$_REQUEST['C']." AND ".$EmpMgmtId." AND g.DepartmentId!=0 AND (e.DateOfSepration='0000-00-00' OR e.DateOfSepration='1970-01-01' OR e.DateOfSepration>='".date($_REQUEST['Y']."-".$_REQUEST['m']."-01")."') AND g.DateJoining<='".date($_REQUEST['Y']."-".$_REQUEST['m']."-31")."' order by e.ECode ASC", $con); }

$sn=1; 
while($ResEmp=mysql_fetch_array($SqlEmp))
{
 $sqlSlip=mysql_query("select * from ".$PayTable." where EmployeeID=".$ResEmp['EmployeeID']." AND Month=".$_REQUEST['m']." AND YEar=".$_REQUEST['Y']."", $con); $resSlip=mysql_fetch_assoc($sqlSlip);


  $schema_insert = "";
  $schema_insert .= $sn.$sep;
  $schema_insert .= $ResEmp['EmpCode'].$sep;
  $schema_insert .= ucwords(strtolower($ResEmp['Fname'].' '.$ResEmp['Sname'].' '.$ResEmp['Lname'])).$sep;	
  
  $schema_insert .= floatval($resSlip['PaidDay']).$sep;
  $schema_insert .= floatval($resSlip['Basic']).$sep;
  $schema_insert .= floatval($resSlip['Hra']).$sep;
  
if($_REQUEST['con']>0){ $schema_insert .= floatval($resSlip['Convance']).$sep; }
if($_REQUEST['car']>0){$schema_insert .= floatval($resSlip['Car_Allowance']).$sep; }
  $schema_insert .= floatval($resSlip['Bonus_Month']).$sep;
  $schema_insert .= floatval($resSlip['Special']).$sep;
  $schema_insert .= floatval($resSlip['DA']).$sep;
	
	
if($_REQUEST['inc']>0){ $schema_insert .= floatval($resSlip['Incentive']).$sep; }	
if($_REQUEST['arr']>0){ $schema_insert .= floatval($resSlip['Arreares']).$sep; }
if($_REQUEST['va']>0){ $schema_insert .= floatval($resSlip['VariableAdjustment']).$sep; }	
if($_REQUEST['pp']>0){ $schema_insert .= floatval($resSlip['PerformancePay']).$sep; }
if($_REQUEST['ppy']>0){ $schema_insert .= floatval($resSlip['PP_year']).$sep; }
if($_REQUEST['NtP']>0){ $schema_insert .= floatval($resSlip['NoticePay']).$sep; }
if($_REQUEST['PP_Inc']>0){ $schema_insert .= floatval($resSlip['PP_Inc']).$sep; }
if($_REQUEST['cca']>0){ $schema_insert .= floatval($resSlip['CCA']).$sep; }	
if($_REQUEST['ra']>0){ $schema_insert .= floatval($resSlip['RA']).$sep; }
if($_REQUEST['vr']>0){ $schema_insert .= floatval($resSlip['VarRemburmnt']).$sep; }
if($_REQUEST['ta']>0){ $schema_insert .= floatval($resSlip['TA']).$sep; }	
	
if($_REQUEST['arrbas']>0){ $schema_insert .= floatval($resSlip['Arr_Basic']).$sep; }
if($_REQUEST['arrhr']>0){ $schema_insert .= floatval($resSlip['Arr_Hra']).$sep; }
if($_REQUEST['arrcar']>0){ $schema_insert .= floatval($resSlip['Car_Allowance_Arr']).$sep; }
if($_REQUEST['arrsp']>0){ $schema_insert .= floatval($resSlip['Arr_Spl']).$sep; }
if($_REQUEST['arrcon']>0){ $schema_insert .= floatval($resSlip['Arr_Conv']).$sep; }
if($_REQUEST['Deputation_Allow']>0){ $schema_insert .= floatval($resSlip['Deputation_Allow']).$sep; }

if($_REQUEST['Arr_Bonus']>0){ $schema_insert .= floatval($resSlip['Arr_Bonus']).$sep; }
if($_REQUEST['BA']>0){ $schema_insert .= floatval($resSlip['Bonus_Adjustment']).$sep; }
if($_REQUEST['Arr_LTARemb']>0){ $schema_insert .= floatval($resSlip['Arr_LTARemb']).$sep; }
if($_REQUEST['Arr_RA']>0){ $schema_insert .= floatval($resSlip['Arr_RA']).$sep; }
if($_REQUEST['Arr_PerformPay']>0){ $schema_insert .= floatval($resSlip['Arr_PP']).$sep; }


if($_REQUEST['arrencash']>0){ $schema_insert .= floatval($resSlip['Arr_LvEnCash']).$sep; }
if($_REQUEST['arrpf']>0){ $schema_insert .= floatval($resSlip['Arr_Pf']).$sep; }
if($_REQUEST['arresic']>0){ $schema_insert .= floatval($resSlip['Arr_Esic']).$sep; }
if($_REQUEST['arrcomm_allow']>0){ $schema_insert .= floatval($resSlip['Arr_Communication_Allow']).$sep; }
    
if($_REQUEST['bonus']>0){ $schema_insert .= floatval($resSlip['Bonus']).$sep; }
if($_REQUEST['lenc']>0){ $schema_insert .= floatval($resSlip['LeaveEncash']).$sep; }
		
if($_REQUEST['taxcea']>0){ $schema_insert .= floatval($resSlip['YCea']).$sep; }
if($_REQUEST['taxmr']>0){ $schema_insert .= floatval($resSlip['YMr']).$sep; }
if($_REQUEST['taxlta']>0){ $schema_insert .= floatval($resSlip['YLta']).$sep; }

if($_REQUEST['NPSS']>0){ $schema_insert .= floatval($resSlip['NPS']).$sep; }

$schema_insert .= floatval($resSlip['Communication_Allow']).$sep;
$schema_insert .= floatval($resSlip['Car_Allow']).$sep;
 
$TotGross=$resSlip['Tot_Gross']+$resSlip['Bonus']+$resSlip['DA']+$resSlip['Arreares']+$resSlip['LeaveEncash']+$resSlip['Incentive']+$resSlip['VariableAdjustment']+$resSlip['PerformancePay']+$resSlip['PP_year']+$resSlip['CCA']+$resSlip['RA']+$resSlip['Arr_Basic']+$resSlip['Arr_Hra']+$resSlip['Arr_Spl']+$resSlip['Arr_Conv']+$resSlip['Arr_Bonus']+$resSlip['Bonus_Adjustment']+$resSlip['Arr_LTARemb']+$resSlip['Arr_RA']+$resSlip['Arr_PP']+$resSlip['YCea']+$resSlip['YMr']+$resSlip['YLta']+$resSlip['Car_Allowance']+$resSlip['Car_Allowance_Arr']+$resSlip['VarRemburmnt']+$resSlip['TA']+$resSlip['Arr_LvEnCash']+$resSlip['PP_Inc']+$resSlip['NoticePay']+$resSlip['NPS']+$resSlip['Deputation_Allow']+$resSlip['Communication_Allow']+$resSlip['Car_Allow']+$resSlip['Arr_Communication_Allow'];
$TotDeduct=$resSlip['TDS']+$resSlip['Tot_Deduct']+$resSlip['Arr_Pf']+$resSlip['VolContrib']+$resSlip['Arr_Esic']+$resSlip['DeductAdjmt']+$resSlip['RecConAllow']+$resSlip['RecSplAllow']+$resSlip['RA_Recover']+$resSlip['IDCard_Recovery']; $TotNetAmount=$TotGross-$TotDeduct;
  $schema_insert .= floatval($TotGross).$sep;
  $schema_insert .= floatval($resSlip['EPF_Employee']).$sep;
  $schema_insert .= floatval($resSlip['ESCI_Employee']).$sep;
  $schema_insert .= floatval($resSlip['TDS']).$sep;
if($_REQUEST['dedvc']>0){ $schema_insert .= floatval($resSlip['VolContrib']).$sep; }	
if($_REQUEST['dedadj']>0){ $schema_insert .= floatval($resSlip['DeductAdjmt']).$sep; }
if($_REQUEST['dedca']>0){ $schema_insert .= floatval($resSlip['RecConAllow']).$sep; }
if($_REQUEST['RecSplAllow']>0){ $schema_insert .= floatval($resSlip['RecSplAllow']).$sep; }
if($_REQUEST['RAR']>0){ $schema_insert .= floatval($resSlip['RA_Recover']).$sep; }

if($_REQUEST['IDCard_Recovery']>0){ $schema_insert .= floatval($resSlip['IDCard_Recovery']).$sep; }

if($_REQUEST['NPS']>0){ $schema_insert .= floatval($resSlip['NPS_Value']).$sep; }	



  $schema_insert .= floatval($TotDeduct).$sep;
  $schema_insert .= floatval($TotNetAmount).$sep;
  				  
  $schema_insert = str_replace($sep."$", "", $schema_insert);
  $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
  $schema_insert .= "\t";
  print(trim($schema_insert));
  print "\n";

  $sn++;    
}

?>