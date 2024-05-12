<?php
require_once('config/config.php');
$sY=mysql_query("select * from hrm_year where YearId=".$_REQUEST['Y']."", $con); $rY=mysql_fetch_assoc($sY); 
$FD=date("Y",strtotime($rY['FromDate'])); $TD=date("Y",strtotime($rY['ToDate'])); $MY=$FD-1;  $PRD=$MY.'-'.$FD;
/*************************************************************************************************************/
if($_REQUEST['action']='ExportPerHOD') 
{
#  Create the Column Headings
$csv_output .= '"SNo",'; 
$csv_output .= '"HOD",';
$csv_output .= '"No. Of Employee",';
$csv_output .= '"Previous Gross Salary",';
$csv_output .= '"Proposed Salary",';
$csv_output .= '"(%)Proposed Salary",';
$csv_output .= '"Proposed Correction",';
$csv_output .= '"(%)Proposed Correction",';
$csv_output .= '"Total Proposed Gross Salary",';
$csv_output .= '"(%) Total Increment",';
$csv_output .= "\n";		

# Get Users Details form the DB #$result = mysql_query("SELECT * from formResults WHERE formID = '$formID'" );
$sqlEmpHOD=mysql_query("select HOD_EmployeeID from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.HOD_EmployeeID=hrm_employee.EmployeeID where hrm_employee.CompanyId=".$_REQUEST['C']." AND hrm_employee_pms.AssessmentYear=".$_REQUEST['Y']." group by HOD_EmployeeID order by EmpCode ASC", $con);      
$Sno=1; while($ResEmpHOD=mysql_fetch_array($sqlEmpHOD)) { 
$sql=mysql_query("select Fname,Sname,Lname,Gender,DR,Married from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee_general.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee_general.EmployeeID=".$ResEmpHOD['HOD_EmployeeID'], $con); 
$res=mysql_fetch_assoc($sql); if($res['DR']=='Y'){$MHH='Dr.';} elseif($res['Gender']=='M'){$MHH='Mr.';} elseif($res['Gender']=='F' AND $res['Married']=='Y'){$MHH='Mrs.';} elseif($res['Gender']=='F' AND $res['Married']=='N'){$MHH='Miss.';}  $HODName=$MHH.' '.$res['Fname'].' '.$res['Sname'].' '.$res['Lname'];  

$Incentive=mysql_query("select SUM(Incentive) as TEAMINC from hrm_pms_appraisal_history where CompanyId=".$_REQUEST['C']." AND HOD_EmployeeID=".$ResEmpHOD['HOD_EmployeeID']." AND SalaryChange_Date!='".date($FD."-10-01")."'", $con); $resINCTV=mysql_fetch_array($Incentive);{ $INCTV=$resINCTV['TEAMINC']; } 

$sqlEmp=mysql_query("select EmpPmsId from hrm_employee_pms where CompanyId=".$_REQUEST['C']." AND HOD_EmployeeID=".$ResEmpHOD['HOD_EmployeeID']." AND AssessmentYear=".$_REQUEST['Y']."", $con); $NoOfEmp=mysql_num_rows($sqlEmp);

$SqlCount=mysql_query("select SUM(EmpCurrGrossPM) as CGS, SUM(EmpCurrIncentivePM) as TEAMINC, SUM(HR_ProCorrSalary) as PSC, SUM(HR_IncNetMonthalySalary) as NetIncSal, SUM(HR_GrossMonthlySalary) as TPGS, SUM(Hod_Incentive) as HINCentv from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$_REQUEST['C']." AND hrm_employee_pms.AssessmentYear=".$_REQUEST['Y']." AND hrm_employee_pms.HOD_EmployeeID=".$ResEmpHOD['HOD_EmployeeID'], $con); 

while($ResCount=mysql_fetch_array($SqlCount))
{ $CGS=$ResCount['CGS']; $INCTV=$ResCount['TEAMINC']; $TotPre_GrossSalary=$CGS+$INCTV; 
  $Salary_Correction=$ResCount['PSC']; //echo 'SC='.$Salary_Correction.'<br>';
  $Net_IncSal=$ResCount['NetIncSal']; //echo 'Net='.$Net_IncSal.'<br>';
  $Salary_Proposed=$Net_IncSal-$Salary_Correction; //echo 'ProS='.$Salary_Proposed.'<br>';
  $Total_PGS=$ResCount['TPGS'];
  $HINCentv=number_format($ResCount['HINCentv'], 2, '.', '');} $Tot_TPGS=$Total_PGS+$HINCentv;
  
   $Previous_GSPM=number_format($TotPre_GrossSalary, 2, '.', '');
   $Proposed_Salary=number_format($Salary_Proposed, 2, '.', '');
   $Proposed_Correction=number_format($Salary_Correction, 2, '.', '');
   $Proposed_Increment=number_format($Net_IncSal, 2, '.', '');
   $Total_Proposed=number_format($Tot_TPGS, 2, '.', '');
  $OnePer=($Previous_GSPM*1)/100; //$OnePerPre=number_format($One, 2, '.', '');
  if($OnePer>0)
  { $PGS_Per=$Proposed_Salary/$OnePer; $Proposed_PerSal=round($PGS_Per,2);
    $SC_Per=$Proposed_Correction/$OnePer;  $Correction_PerSal=round($SC_Per,2);
	$TotIncPer=$Proposed_Increment/$OnePer; $TotalInc_PerSal=round($TotIncPer,2);
  }
  else { $Proposed_SalaryPer=0; $Correction_SalaryPer=0; $TotalInc_SalaryPer=0;  }
  
$csv_output .= '"'.str_replace('"', '""', $Sno).'",';
$csv_output .= '"'.str_replace('"', '""', $HODName).'",';
$csv_output .= '"'.str_replace('"', '""', $NoOfEmp).'",';
$csv_output .= '"'.str_replace('"', '""', $Previous_GSPM).'",';	
$csv_output .= '"'.str_replace('"', '""', $Proposed_Salary).'",';
$csv_output .= '"'.str_replace('"', '""', $Proposed_PerSal).'",';
$csv_output .= '"'.str_replace('"', '""', $Proposed_Correction).'",';	
$csv_output .= '"'.str_replace('"', '""', $Correction_PerSal).'",';
$csv_output .= '"'.str_replace('"', '""', $Total_Proposed).'",';	
$csv_output .= '"'.str_replace('"', '""', $TotalInc_PerSal).'",';
$csv_output .= "\n";
$Sno++;} 
# Close the MySql connection
mysql_close($con);
# Set the headers so the file downloads
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Content-Length: " . strlen($csv_output));
header("Content-type: text/x-csv");
header("Content-Disposition: attachment; filename=Emp_PMS_Increment(%)_HODWise".$PRD.".csv");
echo $csv_output;
exit;
}
?>