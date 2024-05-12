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
$csv_output .= '"Year",';
$csv_output .= '"EC",'; 
$csv_output .= '"Name",';
$csv_output .= '"Current_Department",';
$csv_output .= '"Current_Designation",';
$csv_output .= '"Current_Grade",';
$csv_output .= '"New_Department",';
$csv_output .= '"New_Designation",';
$csv_output .= '"New_Grade",';
$csv_output .= "\n";		

if($_REQUEST['value']!='All'){ $sqlDP = mysql_query("SELECT hrm_restructuring.*,EmpCode,Fname,Sname,Lname,Gender,Married,DR FROM hrm_restructuring INNER JOIN hrm_employee ON hrm_employee.EmployeeID=hrm_restructuring.EmployeeID INNER JOIN hrm_employee_personal ON hrm_restructuring.EmployeeID=hrm_employee_personal.EmployeeID WHERE hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$_REQUEST['C']." AND hrm_restructuring.Current_DepartmentId=".$_REQUEST['value']." order by hrm_restructuring.EmployeeID ASC", $con); }
      if($_REQUEST['value']=='All'){ $sqlDP=mysql_query("select hrm_restructuring.*,EmpCode,Fname,Sname,Lname,Gender,Married,DR from hrm_restructuring INNER JOIN hrm_employee ON hrm_employee.EmployeeID=hrm_restructuring.EmployeeID INNER JOIN hrm_employee_personal ON hrm_restructuring.EmployeeID=hrm_employee_personal.EmployeeID WHERE hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$_REQUEST['C']." order by hrm_restructuring.EmployeeID ASC", $con); }
$Sno=1;  while($resDP = mysql_fetch_assoc($sqlDP)){ 
if($resDP['DR']=='Y'){$MS='Dr.';} elseif($resDP['Gender']=='M'){$MS='Mr.';} elseif($resDP['Gender']=='F' AND $resDP['Married']=='Y'){$MS='Mrs.';} elseif($resDP['Gender']=='F' AND $resDP['Married']=='N'){$MS='Miss.';}  $Name=$MS.' '.$resDP['Fname'].' '.$resDP['Sname'].' '.$resDP['Lname'];
$LEC=strlen($resDP['EmpCode']); 
if($LEC==1){$EC='000'.$resDP['EmpCode'];} if($LEC==2){$EC='00'.$resDP['EmpCode'];} if($LEC==3){$EC='0'.$resDP['EmpCode'];} if($LEC>=4){$EC=$resDP['EmpCode'];}
$sqlDept = mysql_query("SELECT DepartmentCode FROM hrm_department WHERE DepartmentId=".$resDP['Current_DepartmentId'], $con); $resDept=mysql_fetch_assoc($sqlDept);
$sqlDesig = mysql_query("SELECT DesigName FROM hrm_designation WHERE DesigId=".$resDP['Current_DesigId'], $con); $resDesig=mysql_fetch_assoc($sqlDesig);
$sqlGrade = mysql_query("SELECT GradeValue FROM hrm_grade WHERE GradeId=".$resDP['Current_GradeId'], $con); $resGrade=mysql_fetch_assoc($sqlGrade);
$sqlDept2 = mysql_query("SELECT DepartmentCode FROM hrm_department WHERE DepartmentId=".$resDP['New_DepartmentId'], $con); $resDept2=mysql_fetch_assoc($sqlDept2);
$sqlDesig2 = mysql_query("SELECT DesigName FROM hrm_designation WHERE DesigId=".$resDP['New_DesigId'], $con); $resDesig2=mysql_fetch_assoc($sqlDesig2); 
$sqlGrade2 = mysql_query("SELECT GradeValue FROM hrm_grade WHERE GradeId=".$resDP['New_GradeId'], $con); $resGrade2=mysql_fetch_assoc($sqlGrade2);

$csv_output .= '"'.str_replace('"', '""', $Sno).'",';
$csv_output .= '"'.str_replace('"', '""', $resDP['Year']).'",';
$csv_output .= '"'.str_replace('"', '""', $EC).'",';
$csv_output .= '"'.str_replace('"', '""', $Name).'",';
$csv_output .= '"'.str_replace('"', '""', strtoupper($resDept['DepartmentCode'])).'",';
$csv_output .= '"'.str_replace('"', '""', strtoupper($resDesig['DesigName'])).'",';
$csv_output .= '"'.str_replace('"', '""', $resGrade['GradeValue']).'",';
$csv_output .= '"'.str_replace('"', '""', strtoupper($resDept2['DepartmentCode'])).'",';
$csv_output .= '"'.str_replace('"', '""', strtoupper($resDesig2['DesigName'])).'",';	
$csv_output .= '"'.str_replace('"', '""', strtoupper($resGrade2['GradeValue'])).'",'; 
$csv_output .= "\n";
$Sno++; }

# Close the MySql connection
mysql_close($con);
# Set the headers so the file downloads
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Content-Length: " . strlen($csv_output));
header("Content-type: text/x-csv");
header("Content-Disposition: attachment; filename=Employee_ReStucture_".$DeptV.".csv");
echo $csv_output;
exit;
}
?>