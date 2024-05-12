<?php 
require_once('config/config.php');
$sY=mysql_query("select * from hrm_year where YearId=".$_REQUEST['Y']."", $con); $rY=mysql_fetch_assoc($sY); 
$FD=date("Y",strtotime($rY['FromDate'])); $TD=date("Y",strtotime($rY['ToDate'])); $MY=$FD-1;  $PRD=$MY.'-'.$FD;
/*************************************************************************************************************/

if($_REQUEST['action']='EligExport') 
{ 
 if($_REQUEST['value']=='All') {$DeptV='All_Employee';}
  else{ $sqlDeptV=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$_REQUEST['value'], $con); $resDeptV=mysql_fetch_assoc($sqlDeptV); 
        $DeptV=$resDeptV['DepartmentCode'];}
  
#  Create the Column Headings
$csv_output .= '"Sn",';
$csv_output .= '"EmpCode",'; 
$csv_output .= '"Name",';
$csv_output .= '"Department",';
$csv_output .= '"Designation",';
$csv_output .= '"Grade",';
$csv_output .= '"CategoryA",';
$csv_output .= '"CategoryB",';	
$csv_output .= '"CategoryC",';

$csv_output .= '"DA OutsideHQ",';	
$csv_output .= '"DA InsideHQ",';

$csv_output .= '"Travel (TW)",';
$csv_output .= '"Travel (FW)",';
$csv_output .= '"Travel Mode",';
$csv_output .= '"Travel Class",';
$csv_output .= '"Mobile Exp. Reim",';
$csv_output .= '"Mobile Hand. Elig",';
$csv_output .= '"Validity",';
$csv_output .= '"Misc Expenses",';
$csv_output .= '"Health Insu",';
$csv_output .= '"Bonus",'; 
$csv_output .= '"Gratuity",'; 
$csv_output .= "\n";		

# Get Users Details form the DB #$result = mysql_query("SELECT * from formResults WHERE formID = '$formID'" );
if($_REQUEST['value']=='All') {$result=mysql_query("select hrm_employee.*,DepartmentId,DesigId,GradeId,hrm_employee_eligibility.* from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_eligibility ON hrm_employee_general.EmployeeID=hrm_employee_eligibility.EmployeeID where hrm_employee.CompanyId=".$_REQUEST['C']." AND hrm_employee.EmpStatus='A' AND hrm_employee_eligibility.Status='A' order by EmpCode ASC", $con); }
else {$result=mysql_query("select hrm_employee.*,DepartmentId,DesigId,GradeId,hrm_employee_eligibility.* from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_eligibility ON hrm_employee_general.EmployeeID=hrm_employee_eligibility.EmployeeID where hrm_employee_general.DepartmentId=".$_REQUEST['value']." AND hrm_employee.CompanyId=".$_REQUEST['C']." AND hrm_employee.EmpStatus='A' AND hrm_employee_eligibility.Status='A' order by EmpCode ASC", $con); } 
$Sno=1; while($res=mysql_fetch_array($result)){ $Ename=$res['Fname'].' '.$res['Sname'].' '.$res['Lname']; 
$sqlDept=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$res['DepartmentId'], $con); $resDept=mysql_fetch_assoc($sqlDept);
$sqlDesig=mysql_query("select DesigName from hrm_designation where DesigId=".$res['DesigId'], $con); $resDesig=mysql_fetch_assoc($sqlDesig);
$sqlGrade=mysql_query("select GradeValue from hrm_grade where GradeId=".$res['GradeId'], $con); $resGrade=mysql_fetch_assoc($sqlGrade);

$csv_output .= '"'.str_replace('"', '""', $Sno).'",';
$csv_output .= '"'.str_replace('"', '""', $res['EmpCode']).'",';
$csv_output .= '"'.str_replace('"', '""', $Ename).'",';
$csv_output .= '"'.str_replace('"', '""', $resDept['DepartmentCode']).'",';
$csv_output .= '"'.str_replace('"', '""', $resDesig['DesigName']).'",';
$csv_output .= '"'.str_replace('"', '""', $resGrade['GradeValue']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['Lodging_CategoryA']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['Lodging_CategoryB']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['Lodging_CategoryC']).'",';
 
$csv_output .= '"'.str_replace('"', '""', $res['DA_Outside_Hq']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['DA_Inside_Hq']).'",'; 

$csv_output .= '"'.str_replace('"', '""', $res['Travel_TwoWeeKM']).'",';	
$csv_output .= '"'.str_replace('"', '""', $res['Travel_FourWeeKM']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['Mode_Travel_Outside_Hq']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['TravelClass_Outside_Hq']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['Mobile_Exp_Rem_Rs']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['Mobile_Hand_Elig_Rs']).'",';

$GpsSetYN=''; if($res['Mobile_Hand_Elig_Rs']>0){ $sqlGp=mysql_query("select Mobile,Mobile_WithGPS from hrm_master_eligibility where DepartmentId=".$res['DepartmentId']." AND CompanyId=".$_REQUEST['C']." AND GradeId=".$res['GradeId']."",$con); $resGp=mysql_fetch_assoc($sqlGp);
	if($res['GPSSet']=='Y'){$GpsSetYN='Once in 2 yrs';}elseif($resGp['Mobile']!=$resGp['Mobile_WithGPS'] AND $resGp['Mobile_WithGPS']==$res['Mobile_Hand_Elig_Rs']){$GpsSetYN='Once in 2 yrs';}else{$GpsSetYN='Once in 3 yrs';}  }

$csv_output .= '"'.str_replace('"', '""', $GpsSetYN).'",';
$csv_output .= '"'.str_replace('"', '""', $res['Misc_Expenses']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['Health_Insurance']).'",';
$csv_output .= '"'.str_replace('"', '""', 'As per law').'",';
$csv_output .= '"'.str_replace('"', '""', 'As per law').'",';
$csv_output .= "\n";
$Sno++; }

# Close the MySql connection
mysql_close($con);
# Set the headers so the file downloads
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Content-Length: " . strlen($csv_output));
header("Content-type: text/x-csv");
header("Content-Disposition: attachment; filename=Employee_Eligibility_".$DeptV.".csv");
echo $csv_output;
exit;
}
?>