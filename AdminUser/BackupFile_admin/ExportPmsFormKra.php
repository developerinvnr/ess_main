<?php 
require_once('config/config.php');
date_default_timezone_set('Asia/Calcutta');
$sY=mysql_query("select * from hrm_year where YearId=".$_REQUEST['YI']."", $con); $rY=mysql_fetch_assoc($sY); 
$FD=date("Y",strtotime($rY['FromDate'])); $TD=date("Y",strtotime($rY['ToDate'])); $MY=$FD-1;  $PRD=$FD.'-'.$TD;
/*************************************************************************************************************/
if($_REQUEST['YI']==1){$Y=2012;}elseif($_REQUEST['YI']==2){$Y=2013;}elseif($_REQUEST['YI']==3){$Y=2014;}elseif($_REQUEST['YI']==4){$Y=2015;}elseif($_REQUEST['YI']==5){$Y=2016;}elseif($_REQUEST['YI']==6){$Y=2017;}elseif($_REQUEST['YI']==7){$Y=2018;}elseif($_REQUEST['YI']==8){$Y=2019;}elseif($_REQUEST['YI']==9){$Y=2020;}elseif($_REQUEST['YI']==10){$Y=2021;}

if($_REQUEST['action']='FormKraExport') 
{ 
 if($_REQUEST['ee']=='Dept')
{ $name='Department Wise'; 
  if($_REQUEST['value']!=0)
  { $sqlA=mysql_query("select DepartmentName from hrm_department where DepartmentId=".$_REQUEST['value'], $con); $resA=mysql_fetch_assoc($sqlA); $name2=$resA['DepartmentName']; }
  else{$name2='All_Department';}
}

$xls_filename = 'PMS_KRA_'.$PRD.'-'.$name2.'.xls';
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=$xls_filename");
header("Pragma: no-cache");
header("Expires: 0");
$sep = "\t"; 
echo "Sn";
if($_REQUEST['a']==1){ echo "\tEmpCode\tName\tDepartment\tDesignation\tGarde"; }
echo "\tKra\tDescrition\tMeasure\tUnit";
print("\n"); 
  		

# Get Users Details form the DB #$result = mysql_query("SELECT * from formResults WHERE formID = '$formID'" );
if($_REQUEST['ee']=='Dept' AND $_REQUEST['a']==0)
{  
  if($_REQUEST['value']==0)
  { $sql=mysql_query("SELECT * from hrm_pms_kra WHERE (KRAStatus='A' OR KRAStatus='R') AND CompanyId=".$_REQUEST['c']." AND YearId=".$_REQUEST['YI'], $con); }
  else{ $sql=mysql_query("SELECT * from hrm_pms_kra WHERE (KRAStatus='A' OR KRAStatus='R') AND CompanyId=".$_REQUEST['c']." AND YearId=".$_REQUEST['YI']." AND DepartmentId=".$_REQUEST['value'], $con); }
}
if($_REQUEST['ee']=='Dept' AND $_REQUEST['a']==1)
{  
  if($_REQUEST['value']==0)
  { $sql=mysql_query("SELECT EmpCode,Fname,Sname,Lname,DesigId,hrm_employee_general.DepartmentId,hrm_employee_general.GradeId,KRA,KRA_Description,Measure,Unit,Weightage,Target FROM hrm_pms_kra INNER JOIN hrm_employee ON hrm_pms_kra.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_general ON hrm_pms_kra.EmployeeID=hrm_employee_general.EmployeeID WHERE hrm_pms_kra.YearId=".$_REQUEST['YI']."  AND hrm_pms_kra.CompanyId=".$_REQUEST['c']." AND (hrm_pms_kra.KRAStatus='A' OR hrm_pms_kra.KRAStatus='R') AND hrm_employee_general.DateJoining<='".$Y."-06-30' AND hrm_employee.EmpCode<=11000 order by hrm_employee.EmpCode ASC, hrm_pms_kra.KRAId ASC", $con); }
  else{ $sql=mysql_query("SELECT EmpCode,Fname,Sname,Lname,DesigId,hrm_employee_general.DepartmentId,hrm_employee_general.GradeId,KRA,KRA_Description,Measure,Unit,Weightage,Target FROM hrm_pms_kra INNER JOIN hrm_employee ON hrm_pms_kra.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_general ON hrm_pms_kra.EmployeeID=hrm_employee_general.EmployeeID WHERE hrm_pms_kra.DepartmentId=".$_REQUEST['value']." AND hrm_pms_kra.YearId=".$_REQUEST['YI']."  AND hrm_pms_kra.CompanyId=".$_REQUEST['c']." AND (hrm_pms_kra.KRAStatus='A' OR hrm_pms_kra.KRAStatus='R') AND hrm_employee_general.DateJoining<='".$Y."-06-30' AND hrm_employee.EmpCode<=11000 order by hrm_employee.EmpCode ASC, hrm_pms_kra.KRAId ASC", $con); }
}

 $Sno=1; while($res=mysql_fetch_array($sql))
 { 
 if($_REQUEST['a']==1){
 $sqlDept=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$res['DepartmentId'], $con); 
 $sqlDesig=mysql_query("select DesigName,DesigCode from hrm_designation where DesigId=".$res['DesigId'], $con); 
 $sqlG=mysql_query("select GradeValue from hrm_grade where GradeId=".$res['GradeId'], $con);  
 $resDept=mysql_fetch_assoc($sqlDept);  $resDesig=mysql_fetch_assoc($sqlDesig); $resG=mysql_fetch_assoc($sqlG);
 }
 
  $schema_insert = "";
  $schema_insert .= $no.$sep;
  if($_REQUEST['a']==1)
  {
  $schema_insert .= $res['EmpCode'].$sep;
  $schema_insert .= $res['Fname'].' '.$res['Sname'].' '.$res['Lname'].$sep;
  $schema_insert .= $resDept['DepartmentCode'].$sep;
  $schema_insert .= $resDesig['DesigName'].$sep;
  $schema_insert .= $resG['GradeValue'].$sep;
  }		
  $schema_insert .= $res['KRA'].$sep;
  $schema_insert .= $res['KRA_Description'].$sep;
  $schema_insert .= $res['Measure'].$sep;
  $schema_insert .= $res['Unit'].$sep;
			  
  $schema_insert = str_replace($sep."$", "", $schema_insert);
  $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
  $schema_insert .= "\t";
  print(trim($schema_insert));
  print "\n";
  $no++;
 }
 

}
?>