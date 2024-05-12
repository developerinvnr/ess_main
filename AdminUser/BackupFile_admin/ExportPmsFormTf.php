<?php 
require_once('config/config.php');
date_default_timezone_set('Asia/Calcutta');
$sY=mysql_query("select * from hrm_year where YearId=".$_REQUEST['YI']."", $con); $rY=mysql_fetch_assoc($sY); 
$FD=date("Y",strtotime($rY['FromDate'])); $TD=date("Y",strtotime($rY['ToDate'])); $MY=$FD-1;  $PRD=$MY.'-'.$FD;
/*************************************************************************************************************/
if($_REQUEST['YI']==1){$Y=2012;}elseif($_REQUEST['YI']==2){$Y=2013;}elseif($_REQUEST['YI']==3){$Y=2014;}elseif($_REQUEST['YI']==4){$Y=2015;}elseif($_REQUEST['YI']==5){$Y=2016;}elseif($_REQUEST['YI']==6){$Y=2017;}elseif($_REQUEST['YI']==7){$Y=2018;}elseif($_REQUEST['YI']==8){$Y=2019;}elseif($_REQUEST['YI']==9){$Y=2020;}elseif($_REQUEST['YI']==10){$Y=2021;}


if($_REQUEST['action']='FormTfExport') 
{ 
 if($_REQUEST['ee']=='Dept')
{ $name='Department Wise'; 
  if($_REQUEST['value']!=0)
  { $sqlA=mysql_query("select DepartmentName from hrm_department where DepartmentId=".$_REQUEST['value'], $con); $resA=mysql_fetch_assoc($sqlA); $name2=$resA['DepartmentName']; }else{$name2='All_Department';}
}
  
$xls_filename = 'Employee_Trainig/Conference_'.$PRD.'-'.$name2.'.xls';
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=$xls_filename");
header("Pragma: no-cache");
header("Expires: 0");
$sep = "\t"; 
echo "Sn\tEmpCode\tName\tAppraiser Soft Skill\tAppraiser Technincal Skill\tReviewer Soft Skill\tReviewer Technincal Skill";
print("\n");   
  	

# Get Users Details form the DB #$result = mysql_query("SELECT * from formResults WHERE formID = '$formID'" );
if($_REQUEST['ee']=='Dept' AND $_REQUEST['a']==0)
{  
  if($_REQUEST['value']==0)
  { $sql=mysql_query("SELECT EmpCode,Fname,Sname,Lname,Appraiser_SoftSkill_1,Appraiser_SoftSkill_2,Appraiser_TechSkill_1,Appraiser_TechSkill_2,Reviewer_SoftSkill_1, Reviewer_SoftSkill_2, Reviewer_TechSkill_1, Reviewer_TechSkill_2 from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID INNER JOIN hrm_employee_general g ON p.EmployeeID=g.EmployeeID WHERE p.CompanyId=".$_REQUEST['c']." AND p.AssessmentYear=".$_REQUEST['YI']." AND g.DateJoining<='".$Y."-06-30' AND e.EmpCode<=11000 order by p.EmployeeID ASC", $con); }
  else{ $sql=mysql_query("SELECT EmpCode,Fname,Sname,Lname,Appraiser_SoftSkill_1,Appraiser_SoftSkill_2,Appraiser_TechSkill_1,Appraiser_TechSkill_2,Reviewer_SoftSkill_1, Reviewer_SoftSkill_2,Reviewer_TechSkill_1,Reviewer_TechSkill_2 from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID INNER JOIN hrm_employee_general g ON p.EmployeeID=g.EmployeeID WHERE p.CompanyId=".$_REQUEST['c']." AND p.AssessmentYear=".$_REQUEST['YI']." AND g.DateJoining<='".$Y."-06-30' AND e.EmpCode<=11000 AND p.HR_Curr_DepartmentId=".$_REQUEST['value']." order by p.EmployeeID ASC", $con); }

}
 $Sno=1; while($res=mysql_fetch_array($sql)){ 
 
  $schema_insert = "";
  $schema_insert .= $Sno.$sep;	
  $schema_insert .= $res['EmpCode'].$sep;
  $schema_insert .= $res['Fname'].' '.$res['Sname'].' '.$res['Lname'].$sep;	
  $schema_insert .= $res['Appraiser_SoftSkill_1'].', '.$res['Appraiser_SoftSkill_2'].$sep;	
  $schema_insert .= $res['Appraiser_TechSkill_1'].', '.$res['Appraiser_TechSkill_2'].$sep;	
  $schema_insert .= $res['Reviewer_SoftSkill_1'].', '.$res['Reviewer_SoftSkill_2'].$sep;	
  $schema_insert .= $res['Reviewer_TechSkill_1'].', '.$res['Reviewer_TechSkill_2'].$sep;	
			  
  $schema_insert = str_replace($sep."$", "", $schema_insert);
  $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
  $schema_insert .= "\t";
  print(trim($schema_insert));
  print "\n";
  $Sno++; 

}


}
?>