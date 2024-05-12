<?php 
require_once('config/config.php');
date_default_timezone_set('Asia/Calcutta');
$sY=mysql_query("select * from hrm_year where YearId=".$_REQUEST['Y']."", $con); $rY=mysql_fetch_assoc($sY); 
$FD=date("Y",strtotime($rY['FromDate'])); $TD=date("Y",strtotime($rY['ToDate'])); $MY=$FD-1;  $PRD=$MY.'-'.$FD;
/*************************************************************************************************************/
if($_REQUEST['action']='ExportDeptAR') 
{
if($_REQUEST['Y']==1){$Y=2012;}elseif($_REQUEST['Y']==2){$Y=2013;}elseif($_REQUEST['Y']==3){$Y=2014;}elseif($_REQUEST['Y']==4){$Y=2015;}elseif($_REQUEST['Y']==5){$Y=2016;}elseif($_REQUEST['Y']==6){$Y=2017;}elseif($_REQUEST['Y']==7){$Y=2018;}elseif($_REQUEST['Y']==8){$Y=2019;}elseif($_REQUEST['Y']==9){$Y=2020;}elseif($_REQUEST['Y']==10){$Y=2021;}elseif($_REQUEST['Y']==11){$Y=2022;}elseif($_REQUEST['Y']==12){$Y=2023;}elseif($_REQUEST['Y']==13){$Y=2024;} elseif($_REQUEST['Y']==14){$Y=2025;} elseif($_REQUEST['Y']==15){$Y=2026;} 

$sqlDeptV=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$_REQUEST['value'], $con); $resDeptV=mysql_fetch_assoc($sqlDeptV); 
$DeptV=$resDeptV['DepartmentCode'];

$xls_filename = 'Emp_AppRevHod_'.$PRD.'-'.$DeptV.'.xls'; 
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=$xls_filename");
header("Pragma: no-cache");
header("Expires: 0");
 
$sep = "\t"; 
 
 $y1=$Y; $y2=$Y-1;
 if($_REQUEST['value']!=9999){ $subQD='g.DepartmentId='.$_REQUEST['value']; }else{ $subQD='1=1'; }
 if($_REQUEST['C']==1)
 {  
  if($_REQUEST['tp']==1 AND $_REQUEST['tk']==0){ $sql = mysql_query("SELECT e.EmployeeID,EmpCode,Fname,Sname,Lname,DateJoining,EmpPmsId,Reviewer_EmployeeID,Rev2_EmployeeID,HOD_EmployeeID,Appraiser_EmployeeID,DesigCode FROM hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_pms pms ON e.EmployeeID=pms.EmployeeID inner join hrm_designation de on g.DesigId=de.DesigId WHERE e.EmpStatus='A' AND e.EmpType='E' AND e.CompanyId=".$_REQUEST['C']." AND pms.AssessmentYear=".$_REQUEST['Y']." AND (g.DateJoining<='".$Y."-06-30' OR pms.Appraiser_EmployeeID>0) AND ".$subQD." order by e.EmpCode ASC", $con); }
  elseif($_REQUEST['tp']==0 AND $_REQUEST['tk']==1){ $sql = mysql_query("SELECT e.EmployeeID,EmpCode,Fname,Sname,Lname,DateJoining,EmpPmsId,Reviewer_EmployeeID,Rev2_EmployeeID,HOD_EmployeeID,Appraiser_EmployeeID,DesigCode FROM hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_pms pms ON e.EmployeeID=pms.EmployeeID inner join hrm_designation de on g.DesigId=de.DesigId WHERE e.EmpStatus='A' AND e.EmpType='E' AND e.CompanyId=".$_REQUEST['C']." AND pms.AssessmentYear=".$_REQUEST['Y']." AND g.DateJoining<='".date("Y-m-d")."' AND ".$subQD." order by e.EmpCode ASC", $con); }
 }
 else
 { 
  $sql = mysql_query("SELECT e.EmployeeID,EmpCode,Fname,Sname,Lname,DateJoining,EmpPmsId,Reviewer_EmployeeID,Rev2_EmployeeID,HOD_EmployeeID,Appraiser_EmployeeID,DesigCode FROM hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_pms pms ON e.EmployeeID=pms.EmployeeID inner join hrm_designation de on g.DesigId=de.DesigId WHERE e.EmpStatus='A' AND e.EmpType='E' AND e.CompanyId=".$_REQUEST['C']." AND pms.AssessmentYear=".$_REQUEST['Y']." AND ".$subQD." order by e.EmpCode ASC", $con); 
 }


echo "SNo\tEmpCode\tName\tDesignation\tDOJ\tWorkingDay\tAppraiser\tReviewer\tHOD\tManagement";

print("\n");
$Sno=1;
while($row = mysql_fetch_array($sql))
{

  $schema_insert = "";
  $schema_insert .= $Sno.$sep;
  $schema_insert .= $row['EmpCode'].$sep;
  
  if($row['Sname']==''){ $Ename=trim($row['Fname']).' '.trim($row['Lname']); }
else{ $Ename=trim($row['Fname']).' '.trim($row['Sname']).' '.trim($row['Lname']); }
  
  $schema_insert .= $Ename.$sep;
  $schema_insert .= $row['DesigCode'].$sep;	
  $schema_insert .= date("d-m-Y",strtotime($row['DateJoining'])).$sep;
  
  $TotW=0;
  if($row['DateJoining']>=date($y2."-07-01") AND $row['DateJoining']<=date($y1."-30-06"))
  {
  $CountWL=0; $Count2WL=0;
  $sW=mysql_query("select * from hrm_employee_attendance_".$y2." where EmployeeID=".$row['EmployeeID']." AND (AttValue='P' OR AttValue='WFH' OR AttValue='OD') AND AttDate>='".$y2."-07-01' AND AttDate<='".$y2."-12-31' GROUP BY AttDate", $con);
  $sL=mysql_query("select * from hrm_employee_attendance_".$y2." where EmployeeID=".$row['EmployeeID']." AND (AttValue='CH' OR AttValue='ACH' OR AttValue='SH' OR AttValue='ASH' OR AttValue='PH' OR AttValue='APH' OR AttValue='HF') AND AttDate>='".$y2."-07-01' AND AttDate<='".$y2."-12-31' GROUP BY AttDate", $con); 
  $rowW=mysql_num_rows($sW); $rL=mysql_num_rows($sL); $rowL=$rL/2; 
  $CountWL=$rowW+$rowL;
  
  $s2W=mysql_query("select * from hrm_employee_attendance_".$y1." where EmployeeID=".$row['EmployeeID']." AND (AttValue='P' OR AttValue='WFH' OR AttValue='OD') AND AttDate>='".$y1."-01-01' AND AttDate<='".$y1."-06-30' GROUP BY AttDate", $con);
  $s2L=mysql_query("select * from hrm_employee_attendance_".$y1." where EmployeeID=".$row['EmployeeID']." AND (AttValue='CH' OR AttValue='ACH' OR AttValue='SH' OR AttValue='ASH' OR AttValue='PH' OR AttValue='APH' OR AttValue='HF') AND AttDate>='".$y1."-01-01' AND AttDate<='".$y1."-06-30' GROUP BY AttDate", $con); 
  $row2W=mysql_num_rows($s2W); $r2L=mysql_num_rows($s2L); $row2L=$r2L/2; 
  $Count2WL=$row2W+$row2L;
  $TotW=$CountWL+$Count2WL;
  $TotW; 
  }
  $schema_insert .= $TotW.$sep;
  
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
