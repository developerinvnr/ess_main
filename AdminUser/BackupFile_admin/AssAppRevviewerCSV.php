<?php 
require_once('config/config.php');
date_default_timezone_set('Asia/Calcutta');
$sY=mysql_query("select * from hrm_year where YearId=".$_REQUEST['Y']."", $con); $rY=mysql_fetch_assoc($sY); 
$FD=date("Y",strtotime($rY['FromDate'])); $TD=date("Y",strtotime($rY['ToDate'])); $MY=$FD-1;  $PRD=$MY.'-'.$FD;
/*************************************************************************************************************/
if($_REQUEST['action']='ExportDeptAR') 
{
if($_REQUEST['Y']==1){$Y=2012;}elseif($_REQUEST['Y']==2){$Y=2013;}elseif($_REQUEST['Y']==3){$Y=2014;}elseif($_REQUEST['Y']==4){$Y=2015;}elseif($_REQUEST['Y']==5){$Y=2016;}elseif($_REQUEST['Y']==6){$Y=2017;}elseif($_REQUEST['Y']==7){$Y=2018;}elseif($_REQUEST['Y']==8){$Y=2019;}elseif($_REQUEST['Y']==9){$Y=2020;}elseif($_REQUEST['Y']==10){$Y=2021;}elseif($_REQUEST['Y']==11){$Y=2022;}elseif($_REQUEST['Y']==12){$Y=2023;}elseif($_REQUEST['Y']==13){$Y=2024;} 

$sqlDeptV=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$_REQUEST['value'], $con); $resDeptV=mysql_fetch_assoc($sqlDeptV); 
$DeptV=$resDeptV['DepartmentCode'];

$xls_filename = 'Emp_AppRevHod_'.$PRD.'-'.$DeptV.'.xls'; 
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=$xls_filename");
header("Pragma: no-cache");
header("Expires: 0");
 
$sep = "\t"; 

 if($_REQUEST['C']==1)
 {  
  if($_REQUEST['tp']==1 AND $_REQUEST['tk']==0){ $sql = mysql_query("SELECT e.EmployeeID,EmpCode,Fname,Sname,Lname,DateJoining,EmpPmsId,Reviewer_EmployeeID,Rev2_EmployeeID,HOD_EmployeeID,Appraiser_EmployeeID,DesigCode FROM hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_pms pms ON e.EmployeeID=pms.EmployeeID inner join hrm_designation de on g.DesigId=de.DesigId WHERE e.EmpStatus='A' AND e.EmpType='E' AND e.CompanyId=".$_REQUEST['C']." AND pms.AssessmentYear=".$_REQUEST['Y']." AND (g.DateJoining<='".$JoiningDate."' OR pms.Appraiser_EmployeeID>0) AND g.DepartmentId=".$_REQUEST['value']." order by e.EmpCode ASC", $con); }
  elseif($_REQUEST['tp']==0 AND $_REQUEST['tk']==1){ $sql = mysql_query("SELECT e.EmployeeID,EmpCode,Fname,Sname,Lname,DateJoining,EmpPmsId,Reviewer_EmployeeID,Rev2_EmployeeID,HOD_EmployeeID,Appraiser_EmployeeID,DesigCode FROM hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_pms pms ON e.EmployeeID=pms.EmployeeID inner join hrm_designation de on g.DesigId=de.DesigId WHERE e.EmpStatus='A' AND e.EmpType='E' AND e.CompanyId=".$_REQUEST['C']." AND pms.AssessmentYear=".$_REQUEST['Y']." AND g.DateJoining<='".date("Y-m-d")."' AND g.DepartmentId=".$_REQUEST['value']." order by e.EmpCode ASC", $con); }
 }
 else
 { 
  $sql = mysql_query("SELECT e.EmployeeID,EmpCode,Fname,Sname,Lname,DateJoining,EmpPmsId,Reviewer_EmployeeID,Rev2_EmployeeID,HOD_EmployeeID,Appraiser_EmployeeID,DesigCode FROM hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_pms pms ON e.EmployeeID=pms.EmployeeID inner join hrm_designation de on g.DesigId=de.DesigId WHERE e.EmpStatus='A' AND e.EmpType='E' AND e.CompanyId=".$_REQUEST['C']." AND pms.AssessmentYear=".$_REQUEST['Y']." AND g.DepartmentId=".$_REQUEST['value']." order by e.EmpCode ASC", $con); 
 }


echo "SNo\tEmpCode\tName\tDesignation\tDOJ\tAppraiser\tReviewer\tHOD\tManagement";

print("\n");
$Sno=1;
while($row = mysql_fetch_array($sql))
{

  $schema_insert = "";
  $schema_insert .= $Sno.$sep;
  $schema_insert .= $row['EmpCode'].$sep;
  $schema_insert .= $row['Fname'].' '.$row['Sname'].' '.$row['Lname'].$sep;
  $schema_insert .= $row['DesigCode'].$sep;	
  $schema_insert .= date("d-m-Y",strtotime($row['DateJoining'])).$sep;
  
if($row['Appraiser_EmployeeID']!=0){$sqlR = mysql_query("SELECT e.*,DesigId2,Gender,Married,DesigCode from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_personal p ON e.EmployeeID=p.EmployeeID inner join hrm_designation de on g.DesigId=de.DesigId where e.EmpStatus='A' AND e.EmployeeID=".$row['Appraiser_EmployeeID'], $con); $resR=mysql_fetch_assoc($sqlR); 
$Name=$resR['Fname'].' '.$resR['Sname'].' '.$resR['Lname'].'-'.$resR['EmpCode'].' ('.$resR['DesigCode'].')'; 
  $schema_insert .= $Name.$sep; }else{ $schema_insert .= ''.$sep; }
  
if($row['Reviewer_EmployeeID']!=0){$sqlR = mysql_query("SELECT e.*,DesigId2,Gender,Married,DesigCode from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_personal p ON e.EmployeeID=p.EmployeeID inner join hrm_designation de on g.DesigId=de.DesigId where e.EmpStatus='A' AND e.EmployeeID=".$row['Reviewer_EmployeeID'], $con); $resR=mysql_fetch_assoc($sqlR); 
$Name2=$resR['Fname'].' '.$resR['Sname'].' '.$resR['Lname'].'-'.$resR['EmpCode'].' ('.$resR['DesigCode'].')';      
  $schema_insert .= $Name2.$sep ; }else{ $schema_insert .= ''.$sep; }
  
if($row['Rev2_EmployeeID']!=0){$sqlR = mysql_query("SELECT e.*,DesigId2,Gender,Married,DesigCode from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_personal p ON e.EmployeeID=p.EmployeeID inner join hrm_designation de on g.DesigId=de.DesigId where e.EmpStatus='A' AND e.EmployeeID=".$row['Rev2_EmployeeID'], $con); $resR=mysql_fetch_assoc($sqlR); $Name3=$resR['Fname'].' '.$resR['Sname'].' '.$resR['Lname'].'-'.$resR['EmpCode'].' ('.$resR['DesigCode'].')';  
  $schema_insert .= $Name3.$sep; }else{ $schema_insert .= ''.$sep; }
  
if($row['HOD_EmployeeID']!=0){$sqlR = mysql_query("SELECT e.*,DesigId2,Gender,Married,DesigCode from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_personal p ON e.EmployeeID=p.EmployeeID inner join hrm_designation de on g.DesigId=de.DesigId where e.EmpStatus='A' AND e.EmployeeID=".$row['HOD_EmployeeID'], $con);$resR=mysql_fetch_assoc($sqlR); 
$Name4=$resR['Fname'].' '.$resR['Sname'].' '.$resR['Lname'].'-'.$resR['EmpCode'].' ('.$resR['DesigCode'].')';   
  $schema_insert .= $Name4.$sep; }else{ $schema_insert .= ''.$sep; }
  
  $schema_insert = str_replace($sep."$", "", $schema_insert);
  $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
  $schema_insert .= "\t";
  print(trim($schema_insert));
  print "\n";
  
$Sno++;  
}

}

?>
