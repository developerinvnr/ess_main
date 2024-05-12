<?php 
require_once('config/config.php');
date_default_timezone_set('Asia/Calcutta');
$sY=mysql_query("select * from hrm_year where YearId=".$_REQUEST['YI']."", $con); $rY=mysql_fetch_assoc($sY); 
$FD=date("Y",strtotime($rY['FromDate'])); $TD=date("Y",strtotime($rY['ToDate'])); $MY=$FD-1;  $PRD=$MY.'-'.$FD;
/*************************************************************************************************************/
if($_REQUEST['YI']==1){$Y=2012;}elseif($_REQUEST['YI']==2){$Y=2013;}elseif($_REQUEST['YI']==3){$Y=2014;}elseif($_REQUEST['YI']==4){$Y=2015;}elseif($_REQUEST['YI']==5){$Y=2016;}elseif($_REQUEST['YI']==6){$Y=2017;}elseif($_REQUEST['YI']==7){$Y=2018;}elseif($_REQUEST['YI']==8){$Y=2019;}elseif($_REQUEST['YI']==9){$Y=2020;}elseif($_REQUEST['YI']==10){$Y=2021;}


if($_REQUEST['action']='FormFdBckExport') 
{ 
 if($_REQUEST['ee']=='Dept')
{ $name='Department Wise'; 
  if($_REQUEST['value']!=0)
  { $sqlA=mysql_query("select DepartmentName from hrm_department where DepartmentId=".$_REQUEST['value'], $con); $resA=mysql_fetch_assoc($sqlA); $name2=$resA['DepartmentName']; }else{$name2='All_Department';}
}

$xls_filename = 'Employee_FeedbackList_'.$PRD.'-'.$name2.'.xls';
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=$xls_filename");
header("Pragma: no-cache");
header("Expires: 0");
$sep = "\t"; 
if($_REQUEST['a']==0){ echo "Sn\tName\tEnvironment\tFeedBack"; }
elseif($_REQUEST['a']==1){ echo "Sn\tEnvironment\tFeedBack"; }
print("\n"); 


if($_REQUEST['a']==0){  
		
if($_REQUEST['value']==0){ $sql=mysql_query("SELECT w.*,Fname,Sname,Lname,DepartmentCode from hrm_employee_pms_workenvironment w INNER JOIN hrm_employee_pms p ON w.EmpPmsId=p.EmpPmsId INNER JOIN hrm_employee_general g ON p.EmployeeID=g.EmployeeID INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID INNER JOIN hrm_department d ON g.DepartmentId=d.DepartmentId WHERE p.CompanyId=".$_REQUEST['c']." AND p.AssessmentYear=".$_REQUEST['YI']." AND g.DateJoining<='".$Y."-06-30' AND e.EmpCode<=11000 AND w.Answer!='' order by w.WorkEnvironment ASC", $con); }
  else{ $sql=mysql_query("SELECT w.*,Fname,Sname,Lname,DepartmentCode from hrm_employee_pms_workenvironment w INNER JOIN hrm_employee_pms p ON w.EmpPmsId=p.EmpPmsId INNER JOIN hrm_employee_general g ON p.EmployeeID=g.EmployeeID INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID INNER JOIN hrm_department d ON g.DepartmentId=d.DepartmentId WHERE p.CompanyId=".$_REQUEST['c']." AND p.AssessmentYear=".$_REQUEST['YI']." AND g.DateJoining<='".$Y."-06-30' AND e.EmpCode<=11000 AND w.Answer!='' AND p.HR_Curr_DepartmentId=".$_REQUEST['value']." order by w.WorkEnvironment ASC", $con); } 
  $Sno=1; while($res=mysql_fetch_array($sql)){
  
  $schema_insert = "";
  $schema_insert .= $Sno.$sep;	
  $schema_insert .= $res['Fname'].' '.$res['Sname'].' '.$res['Lname'].$sep;
  $schema_insert .= $res['WorkEnvironment'].$sep;
  $schema_insert .= $res['DepartmentCode'].$sep;
  $schema_insert .= $res['Answer'].$sep;
			  
  $schema_insert = str_replace($sep."$", "", $schema_insert);
  $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
  $schema_insert .= "\t";
  print(trim($schema_insert));
  print "\n";
  $Sno++; 
 }

} elseif($_REQUEST['a']==1){

$sqlE=mysql_query("select e.EmployeeID,EmpCode,Fname,Sname,Lname from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID where e.EmpStatus='A' AND g.DateJoining<='".$Y."-06-30' AND g.DepartmentId=".$_REQUEST['value'],$con); 
while($resE=mysql_fetch_array($sqlE))

{ $Ename=$resE['EmpCode'].' - '.$resE['Fname'].' '.$resE['Sname'].' '.$resE['Lname'];

  $schema_insert = "";
  $schema_insert .= $Ename.$sep;
  	
  $schema_insert = str_replace($sep."$", "", $schema_insert);
  $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
  $schema_insert .= "\t";
  print(trim($schema_insert));
  print "\n";

if($_REQUEST['value']==0)
  { $sql=mysql_query("SELECT * from hrm_employee_pms_workenvironment w INNER JOIN hrm_employee_pms p ON w.EmpPmsId=p.EmpPmsId INNER JOIN hrm_employee_general g ON p.EmployeeID=g.EmployeeID WHERE p.CompanyId=".$_REQUEST['c']." AND p.AssessmentYear=".$_REQUEST['YI']." AND g.DateJoining<='".$Y."-06-30' AND p.EmployeeID=".$resE['EmployeeID']." AND w.Answer!='' order by w.WorkEnvironment ASC", $con); }
  else{ $sql=mysql_query("SELECT * from hrm_employee_pms_workenvironment w INNER JOIN hrm_employee_pms p ON w.EmpPmsId=p.EmpPmsId INNER JOIN hrm_employee_general g ON p.EmployeeID=g.EmployeeID WHERE p.CompanyId=".$_REQUEST['c']." AND p.AssessmentYear=".$_REQUEST['YI']." AND g.DateJoining<='".$Y."-06-30' AND p.EmployeeID=".$resE['EmployeeID']." AND w.Answer!='' order by w.WorkEnvironment ASC", $con); }
  $Sno=1; while($res=mysql_fetch_array($sql)){
  
  $schema_insert = "";
  $schema_insert .= $Sno.$sep;	
  $schema_insert .= $res['WorkEnvironment'].$sep;
  $schema_insert .= $res['Answer'].$sep;
			  
  $schema_insert = str_replace($sep."$", "", $schema_insert);
  $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
  $schema_insert .= "\t";
  print(trim($schema_insert));
  print "\n";
  $Sno++; 
  
 } }

}
  

}
?>