<?php
require_once('config/config.php');
date_default_timezone_set('Asia/Calcutta');

if($_REQUEST['YI']==1){$Y=2012;}elseif($_REQUEST['YI']==2){$Y=2013;}elseif($_REQUEST['YI']==3){$Y=2014;}elseif($_REQUEST['YI']==4){$Y=2015;}elseif($_REQUEST['YI']==5){$Y=2016;}elseif($_REQUEST['YI']==6){$Y=2017;}elseif($_REQUEST['YI']==7){$Y=2018;}elseif($_REQUEST['YI']==8){$Y=2019;}elseif($_REQUEST['YI']==9){$Y=2020;}elseif($_REQUEST['YI']==10){$Y=2021;}elseif($_REQUEST['YI']==11){$Y=2022;}
$sY=mysql_query("select * from hrm_year where YearId=".$_REQUEST['YI']."", $con); $rY=mysql_fetch_assoc($sY); 
$FD=date("Y",strtotime($rY['FromDate'])); $TD=date("Y",strtotime($rY['ToDate'])); $MY=$FD-1;  $PRD=$FD.'-'.$TD;

if($_REQUEST['ee']=='Dept')
 { 
  $name='Department Wise'; 
  if($_REQUEST['value']>0){ $sqlA=mysql_query("select DepartmentName from hrm_department where DepartmentId=".$_REQUEST['value'], $con); $resA=mysql_fetch_assoc($sqlA); $name2=$resA['DepartmentName']; }else{$name2='All_Department';}
 }

$xls_filename = 'Employee_Reporting_'.$PRD.'-'.$name2.'.xls';
 

header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=$xls_filename");
header("Pragma: no-cache");
header("Expires: 0");
$sep = "\t"; 
echo "Sn\tEmpCode\tName\tDepartment\tDesignation\tGrade\tAppraiser\tReviewer\tHOD";
print("\n");

if($_REQUEST['ee']=='Dept')
{  
  if($_REQUEST['value']==0)
  { $sql=mysql_query("select e.EmployeeID, EmpCode, Fname, Sname, Lname, g.DepartmentId, g.DesigId, g.HqId, g.GradeId, EmpPmsId, Appraiser_EmployeeID, Reviewer_EmployeeID, HOD_EmployeeID, HR_CurrDesigId, HR_CurrGradeId, HR_Curr_DepartmentId from hrm_employee_general g INNER JOIN hrm_employee e ON g.EmployeeID=e.EmployeeID INNER JOIN hrm_employee_pms p ON e.EmployeeID=p.EmployeeID where e.CompanyId=".$_REQUEST['c']." AND e.EmpStatus='A' AND (p.Appraiser_EmployeeID!='' OR p.Appraiser_EmployeeID!=0) AND g.DateJoining<='".$Y."-06-30' AND p.AssessmentYear=".$_REQUEST['YI']." order by e.EmpCode ASC", $con); }
  else{ $sql=mysql_query("select e.EmployeeID, EmpCode, Fname, Sname, Lname, g.DepartmentId, g.DesigId, g.HqId, g.GradeId, EmpPmsId, Appraiser_EmployeeID, Reviewer_EmployeeID, HOD_EmployeeID, HR_CurrDesigId, HR_CurrGradeId, HR_Curr_DepartmentId from hrm_employee_general g INNER JOIN hrm_employee e ON g.EmployeeID=e.EmployeeID INNER JOIN hrm_employee_pms p ON e.EmployeeID=p.EmployeeID where e.CompanyId=".$_REQUEST['c']." AND e.EmpStatus='A' AND (p.Appraiser_EmployeeID!='' OR p.Appraiser_EmployeeID!=0) AND g.DateJoining<='".$Y."-06-30' AND p.AssessmentYear=".$_REQUEST['YI']." AND p.HR_Curr_DepartmentId=".$_REQUEST['value']." order by e.EmpCode ASC", $con); }
}

$no=1;
 while($res=mysql_fetch_array($sql))
 {
  $sqlDept=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$res['HR_Curr_DepartmentId'], $con); 
  $sqlDesig=mysql_query("select DesigName,DesigCode from hrm_designation where DesigId=".$res['HR_CurrDesigId'], $con); 
  $sqlG=mysql_query("select GradeValue from hrm_grade where GradeId=".$res['HR_CurrGradeId'], $con);  
  $resDept=mysql_fetch_assoc($sqlDept);  $resDesig=mysql_fetch_assoc($sqlDesig); $resG=mysql_fetch_assoc($sqlG);
  $sqlE1=mysql_query("select Fname, Sname, Lname from hrm_employee where EmployeeID=".$res['Appraiser_EmployeeID'], $con); 
  $sqlE2=mysql_query("select Fname, Sname, Lname from hrm_employee where EmployeeID=".$res['Reviewer_EmployeeID'], $con); 
  $sqlE3=mysql_query("select Fname, Sname, Lname from hrm_employee where EmployeeID=".$res['HOD_EmployeeID'], $con); 
  $resE1=mysql_fetch_assoc($sqlE1); $resE2=mysql_fetch_assoc($sqlE2);  $resE3=mysql_fetch_assoc($sqlE3);
 
  $schema_insert = "";
  $schema_insert .= $no.$sep;
  $schema_insert .= $res['EmpCode'].$sep;
  $schema_insert .= $res['Fname'].' '.$res['Sname'].' '.$res['Lname'].$sep;
  $schema_insert .= $resDept['DepartmentCode'].$sep;		
  $schema_insert .= $resDesig['DesigName'].$sep;
  $schema_insert .= $resG['GradeValue'].$sep;
  $schema_insert .= $resE1['Fname'].' '.$resE1['Sname'].' '.$resE1['Lname'].$sep;
  $schema_insert .= $resE2['Fname'].' '.$resE2['Sname'].' '.$resE2['Lname'].$sep;
  $schema_insert .= $resE3['Fname'].' '.$resE3['Sname'].' '.$resE3['Lname'].$sep;	
				  
  $schema_insert = str_replace($sep."$", "", $schema_insert);
  $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
  $schema_insert .= "\t";
  print(trim($schema_insert));
  print "\n";
  $no++;
}

?>

