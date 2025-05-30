<?php 
require_once('config/config.php');
$sY=mysql_query("select * from hrm_year where YearId=".$_REQUEST['Y']."", $con); $rY=mysql_fetch_assoc($sY); 
$FD=date("Y",strtotime($rY['FromDate'])); $TD=date("Y",strtotime($rY['ToDate'])); $MY=$FD-1;  $PRD=$MY.'-'.$FD;
/*************************************************************************************************************/

if($_REQUEST['action']='CtcExport') 
{ 
 if($_REQUEST['value']=='All') {$DeptV='All_Employee';}
  else{ $sqlDeptV=mysql_query("select department_code as DepartmentCode from core_departments where id=".$_REQUEST['value'], $con); $resDeptV=mysql_fetch_assoc($sqlDeptV); 
        $DeptV=$resDeptV['DepartmentCode'];}
  
#  Create the Column Headings
$csv_output .= '"Sn",';
$csv_output .= '"EmpCode",'; 
$csv_output .= '"Name",';
$csv_output .= '"Department",';
$csv_output .= '"Designation",';
$csv_output .= '"Basic",';
$csv_output .= '"Stipend",';	
$csv_output .= '"Incentive",';	
$csv_output .= '"HRA",';
$csv_output .= '"Conv",';
$csv_output .= '"Bonus",';
$csv_output .= '"TA",';
$csv_output .= '"Special",';
$csv_output .= '"Gross Monthly",';
$csv_output .= '"Gross Monthly (PAC)",';
$csv_output .= '"PF",';
$csv_output .= '"ESIC",';
$csv_output .= '"NPS",';
$csv_output .= '"Net Monthaly",';
$csv_output .= '"Medical Reim.",';
$csv_output .= '"LTA",'; 
$csv_output .= '"CEA",'; 
$csv_output .= '"Annual Gross",';
/*$csv_output .= '"Bonus",';*/
$csv_output .= '"Gratuity",';
$csv_output .= '"PF Contri",';
$csv_output .= '"ESIC Contri",';
$csv_output .= '"MPP",';
$csv_output .= '"Fixed CTC",';
$csv_output .= '"Variable Pay",';
$csv_output .= '"Total CTC",';
$csv_output .= '"Communication Allow",';
$csv_output .= '"Car Allow",';
$csv_output .= '"Total Gross CTC",';

$csv_output .= '"MIC",'; 
$csv_output .= '"Car Allowance",'; 
$csv_output .= "\n";		

# Get Users Details form the DB #$result = mysql_query("SELECT * from formResults WHERE formID = '$formID'" );
if($_REQUEST['value']=='All') { $sql=mysql_query("select hrm_employee.*,DepartmentId,DesigId,hrm_employee_ctc.* from hrm_employee_ctc INNER JOIN hrm_employee ON hrm_employee_ctc.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_general ON hrm_employee_ctc.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee.CompanyId=".$_REQUEST['C']." AND hrm_employee.EmpStatus='A' AND hrm_employee_ctc.Status='A' order by ECode ASC", $con); }
else {$sql=mysql_query("select hrm_employee.*,DepartmentId,DesigId,hrm_employee_ctc.* from hrm_employee_ctc INNER JOIN hrm_employee ON hrm_employee_ctc.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_general ON hrm_employee_ctc.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee_general.DepartmentId=".$_REQUEST['value']." AND hrm_employee.CompanyId=".$_REQUEST['C']." AND hrm_employee.EmpStatus='A' AND hrm_employee_ctc.Status='A' order by ECode ASC", $con); } 
$Sno=1; while($res=mysql_fetch_array($sql)){ 
    if($res['Sname']==''){ $Ename=trim($res['Fname']).' '.trim($res['Lname']); }
else{ $Ename=trim($res['Fname']).' '.trim($res['Sname']).' '.trim($res['Lname']); }
    //$Ename=$res['Fname'].' '.$res['Sname'].' '.$res['Lname']; 
$sqlDept=mysql_query("select department_name as DepartmentCode from core_departments where id=".$res['DepartmentId'], $con); $resDept=mysql_fetch_assoc($sqlDept);
$sqlDesig=mysql_query("select designation_name as DesigName from core_designation where id=".$res['DesigId'], $con); $resDesig=mysql_fetch_assoc($sqlDesig);

$csv_output .= '"'.str_replace('"', '""', $Sno).'",';
$csv_output .= '"'.str_replace('"', '""', $res['EmpCode']).'",';
$csv_output .= '"'.str_replace('"', '""', $Ename).'",';
$csv_output .= '"'.str_replace('"', '""', $resDept['DepartmentCode']).'",';
$csv_output .= '"'.str_replace('"', '""', $resDesig['DesigName']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['BAS_Value']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['STIPEND_Value']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['INCENTIVE_Value']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['HRA_Value']).'",';	
$csv_output .= '"'.str_replace('"', '""', $res['CONV_Value']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['Bonus_Month']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['TA_Value']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['SPECIAL_ALL_Value']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['Tot_GrossMonth']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['GrossSalary_PostAnualComponent_Value']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['PF_Employee_Contri_Value']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['ESCI']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['NPS_Value']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['NetMonthSalary_Value']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['MED_REM_Value']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['LTA_Value']).'",';	
$csv_output .= '"'.str_replace('"', '""', $res['CHILD_EDU_ALL_Value']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['Tot_Gross_Annual']).'",';
/*$csv_output .= '"'.str_replace('"', '""', $res['BONUS_Value']).'",';*/
$csv_output .= '"'.str_replace('"', '""', $res['GRATUITY_Value']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['PF_Employer_Contri_Annul']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['AnnualESCI']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['Mediclaim_Policy']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['Tot_CTC']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['VariablePay']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['TotCtc']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['Communication_Allowance']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['Car_Allowance']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['Total_Gross_CTC']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['EmpAddBenifit_MediInsu_value']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['CAR_ALL_Value']).'",';

$csv_output .= "\n";
$Sno++; }

# Close the MySql connection
mysql_close($con);
# Set the headers so the file downloads
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Content-Length: " . strlen($csv_output));
header("Content-type: text/x-csv");
header("Content-Disposition: attachment; filename=Employee_CTC_".$DeptV.".csv");
echo $csv_output;
exit;
}
?>