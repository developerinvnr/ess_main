<?php
require_once('config/config.php');
date_default_timezone_set('Asia/Calcutta');
$sY=mysql_query("select * from hrm_year where YearId=".$_REQUEST['Y']."", $con); $rY=mysql_fetch_assoc($sY); 
$FD=date("Y",strtotime($rY['FromDate'])); $TD=date("Y",strtotime($rY['ToDate'])); $PRD=$FD.'-'.$TD;
$Y=date("Y"); $PY=date("Y")-1; if($_REQUEST['C']==1 OR $_REQUEST['C']==2){$YYear=$Y;}elseif($_REQUEST['C']==3){$YYear=$PY;}
$xls_filename = 'PMS_Status_'.$PRD.'-'.$DeptV.'.xls';

if($_REQUEST['value']=='All') {$DeptV='All_Employee';}else{ $sqlDeptV=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$_REQUEST['value'], $con); $resDeptV=mysql_fetch_assoc($sqlDeptV); $DeptV=$resDeptV['DepartmentCode'];} 

header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=$xls_filename");
header("Pragma: no-cache");
header("Expires: 0");
 
$sep = "\t"; 
echo "Sn\tEmpCode\tDepartment\tEmployee\tAppraiser\tReviewer\tHOD\tManagement\tSts Employee\tSts Appraiser\tSts Reviewer\tSts HOD\tSts Management\tSts HR";
print("\n");

if($_REQUEST['value']=='All'){ $sql = mysql_query("SELECT e.EmployeeID, EmpCode, Fname, Sname, Lname, DepartmentCode, Appraiser_EmployeeID, Reviewer_EmployeeID, HOD_EmployeeID, Emp_PmsStatus, Appraiser_PmsStatus, Reviewer_PmsStatus, Rev2_EmployeeID, Rev2_PmsStatus, HodSubmit_IncStatus, HR_PmsStatus, ExtraAllowPMS FROM hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_pms p ON e.EmployeeID=p.EmployeeID INNER JOIN hrm_department d ON g.DepartmentId=d.DepartmentId WHERE (e.EmpStatus='A' OR p.Appraiser_TotalFinalScore>0) AND g.DateJoining<='".$YYear."-06-30' AND p.AssessmentYear=".$_REQUEST['Y']." AND e.CompanyId=".$_REQUEST['C']." AND p.Appraiser_EmployeeID!=0 order by e.EmpCode ASC", $con); }
else { $sql = mysql_query("SELECT e.EmployeeID, EmpCode, Fname, Sname, Lname, DepartmentCode, Appraiser_EmployeeID, Reviewer_EmployeeID, HOD_EmployeeID, Emp_PmsStatus, Appraiser_PmsStatus, Reviewer_PmsStatus, Rev2_EmployeeID, Rev2_PmsStatus, HodSubmit_IncStatus, HR_PmsStatus, ExtraAllowPMS FROM hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_pms p ON e.EmployeeID=p.EmployeeID INNER JOIN hrm_department d ON g.DepartmentId=d.DepartmentId WHERE (e.EmpStatus='A' OR p.Appraiser_TotalFinalScore>0) AND g.DateJoining<='".$YYear."-06-30' AND p.AssessmentYear=".$_REQUEST['Y']." AND e.CompanyId=".$_REQUEST['C']." AND g.DepartmentId=".$_REQUEST['value']." AND p.Appraiser_EmployeeID!=0 order by e.EmpCode ASC", $con); }
$no=1;
while($res=mysql_fetch_array($sql))
{
  $sqlA = mysql_query("SELECT * from hrm_employee where EmployeeID=".$res['Appraiser_EmployeeID'], $con); 
  $sqlR = mysql_query("SELECT * from hrm_employee where EmployeeID=".$res['Reviewer_EmployeeID'], $con); 
  $sqlH = mysql_query("SELECT * from hrm_employee where EmployeeID=".$res['HOD_EmployeeID'], $con); 
  $resA=mysql_fetch_assoc($sqlA); $resR=mysql_fetch_assoc($sqlR); $resH=mysql_fetch_assoc($sqlH);
  $sqlR2 = mysql_query("SELECT * from hrm_employee where EmployeeID=".$res['Rev2_EmployeeID'], $con); 
  $resR2=mysql_fetch_assoc($sqlR2);
 
  if($res['Emp_PmsStatus']==0){$ES='Draft';}if($res['Emp_PmsStatus']==1){$ES='Pending';} if($res['Emp_PmsStatus']==2){$ES='Submited';}
if($res['Appraiser_PmsStatus']==0){$AS='Draft';}if($res['Appraiser_PmsStatus']==1){$AS='Pending';} if($res['Appraiser_PmsStatus']==2){$AS='Approved';}if($res['Appraiser_PmsStatus']==3){$AS='Resend Employee';}
if($res['Reviewer_PmsStatus']==0){$RS='Draft';}if($res['Reviewer_PmsStatus']==1){$RS='Pending';} if($res['Reviewer_PmsStatus']==2){$RS='Approved';}if($res['Reviewer_PmsStatus']==3){$RS='Resend Appraiser';}

if($res['Rev2_PmsStatus']==0){$R2S='Draft';}if($res['Rev2_PmsStatus']==1){$R2S='Pending';} if($res['Rev2_PmsStatus']==2){$R2S='Approved';}if($res['Rev2_PmsStatus']==3){$R2S='Resend Reviewer';}

if($res['HodSubmit_IncStatus']==0){$HS='Draft';}if($res['HodSubmit_IncStatus']==1){$HS='Pending';}if($res['HodSubmit_IncStatus']==2){$HS='Approved';}
if($res['HR_PmsStatus']==0){$HRS='Draft';}if($res['HR_PmsStatus']==1){$HRS='Pending';} if($res['HR_PmsStatus']==2){$HRS='Approved';}
  
  $schema_insert = "";
  $schema_insert .= $no.$sep;
  $schema_insert .= $res['EmpCode'].$sep;
  $schema_insert .= $res['DepartmentCode'].$sep;	
  $schema_insert .= $res['Fname'].' '.$res['Sname'].' '.$res['Lname'].$sep;	
  $schema_insert .= $resA['Fname'].' '.$resA['Sname'].' '.$resA['Lname'].$sep;	
  $schema_insert .= $resR['Fname'].' '.$resR['Sname'].' '.$resR['Lname'].$sep;	
  $schema_insert .= $resR2['Fname'].' '.$resR2['Sname'].' '.$resR2['Lname'].$sep;
  $schema_insert .= $resH['Fname'].' '.$resH['Sname'].' '.$resH['Lname'].$sep;	
  $schema_insert .= $ES.$sep;	
  $schema_insert .= $AS.$sep;	
  $schema_insert .= $RS.$sep;
  if($res['Rev2_EmployeeID']>0){ $schema_insert .= $R2S.$sep; }
  else { $schema_insert .= ''.$sep; }	
  $schema_insert .= $HS.$sep;	
  $schema_insert .= $HRS.$sep;	
				  
  $schema_insert = str_replace($sep."$", "", $schema_insert);
  $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
  $schema_insert .= "\t";
  print(trim($schema_insert));
  print "\n";
  $no++;
}

?>
