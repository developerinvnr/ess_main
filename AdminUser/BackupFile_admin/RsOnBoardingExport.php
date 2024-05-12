<?php 
require_once('config/config.php');
if($_REQUEST['y']!=0){ $sY=mysql_query("select * from hrm_year where YearId=".$_REQUEST['y']."", $con); $rY=mysql_fetch_assoc($sY);  
$FD=date("Y",strtotime($rY['FromDate'])); $TD=date("Y",strtotime($rY['ToDate'])); $PRD=$FD.'-'.$TD; } else {$PRD='ALL'; }
/*************************************************************************************************************/

if($_REQUEST['action']='RsOnBoardingExport') 
{ 
 
$csv_output .= '"Month",';
$csv_output .= '"SN",'; 
$csv_output .= '"EC",'; 
$csv_output .= '"Name",'; 
$csv_output .= '"Department",'; 
$csv_output .= '"Designation",'; 
$csv_output .= '"DOJ",'; 
$csv_output .= '"State",'; 
$csv_output .= '"HQ",'; 
$csv_output .= "\n";		

if($_REQUEST['y']!=0){ $sql=mysql_query("select hrm_employee.EmpCode,Fname,Sname,Lname,DepartmentId,DesigId,DateJoining,HqId from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where DateJoining>='".$FD."-04-01' AND DateJoining<='".$TD."-03-31' AND hrm_employee.CompanyId=".$_REQUEST['c']." AND hrm_employee.EmpStatus='A' order by DateJoining DESC", $con);
} else { $sql=mysql_query("select hrm_employee.EmpCode,Fname,Sname,Lname,DepartmentId,DesigId,DateJoining,HqId from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee.CompanyId=".$_REQUEST['c']." AND hrm_employee.EmpStatus='A' order by DateJoining DESC", $con); } 
$SNo=1; while($res=mysql_fetch_array($sql)){ 
$m=date('m',strtotime($res['DateJoining'])); if($m==4){$mn='APR';}elseif($m==5){$mn='MAY';}elseif($m==6){$mn='JUN';}elseif($m==7){$mn='JUL';}elseif($m==8){$mn='AUG';}elseif($m==9){$mn='SEP';}elseif($m==10){$mn='OCT';}elseif($m==11){$mn='NOV';}elseif($m==12){$mn='DEC';}elseif($m==1){$mn='JAN';}elseif($m==2){$mn='FEB';}elseif($m==3){$mn='MAR';}

$sqlD=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$res['DepartmentId'],$con); $resD=mysql_fetch_assoc($sqlD);
$sqlDe=mysql_query("select DesigCode,DesigName from hrm_designation where DesigId=".$res['DesigId'],$con); $resDe=mysql_fetch_assoc($sqlDe);
$sqlSH=mysql_query("select HqName,StateName from hrm_headquater INNER JOIN hrm_state ON hrm_headquater.StateId=hrm_state.StateId where HqId=".$res['HqId'],$con); 
$resSH=mysql_fetch_assoc($sqlSH);
	  
$csv_output .= '"'.str_replace('"', '""', $mn).'",';
$csv_output .= '"'.str_replace('"', '""', $SNo).'",';
$csv_output .= '"'.str_replace('"', '""', $res['EmpCode']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['Fname'].' '.$res['Sname'].' '.$res['Lname']).'",';
$csv_output .= '"'.str_replace('"', '""', $resD['DepartmentCode']).'",';
$csv_output .= '"'.str_replace('"', '""', $resDe['DesigName']).'",';
$csv_output .= '"'.str_replace('"', '""', date("d-m-Y", strtotime($res['DateJoining']))).'",';
$csv_output .= '"'.str_replace('"', '""', $resSH['HqName']).'",';
$csv_output .= '"'.str_replace('"', '""', $resSH['StateName']).'",';
$csv_output .= "\n";
$SNo++; }

# Close the MySql connection
mysql_close($con);
# Set the headers so the file downloads
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Content-Length: " . strlen($csv_output));
header("Content-type: text/x-csv");
header("Content-Disposition: attachment; filename=On-Boarding_".$PRD.".csv");
echo $csv_output;
exit; 
}
?>