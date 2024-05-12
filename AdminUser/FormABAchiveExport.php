<?php
require_once('config/config.php');
date_default_timezone_set('Asia/Calcutta');
$xls_filename = $_REQUEST['a'].'_Form_A_B_Achivement_'.date('Y-m-d').'.xls'; 

header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=$xls_filename");
header("Pragma: no-cache");
header("Expires: 0");

if($_REQUEST['a']=='form-A'){$head='KRA'; }elseif($_REQUEST['a']=='form-A (SubKRA)'){$head='Sub-KRA'; }else{$head='Skill';} 
 
$sep = "\t"; 
echo "Sn\tEC\tName\tDepartment\t".$head."\tSchedule\tWeightage\tTarget\tEmp_Ach\tEmp_Remark\tApp_Ach\tApp_Remark";
print("\n");


if($_REQUEST['y']>0 AND $_REQUEST['d']>0 AND $_REQUEST['a']!='')
{ 

if($_REQUEST['d']==999)
{

if($_REQUEST['a']=='form-A')
{ $sql=mysql_query("select Tital,Wgt,Tgt,Ach,Remark,Cmnt,AppAch,AppCmnt,EmpCode,Fname,Sname,Lname,DepartmentCode from hrm_pms_kra_tgtdefin k inner join hrm_pms_kra kr on k.KRAId=kr.KRAId inner join hrm_employee e on kr.EmployeeID=e.EmployeeID inner join hrm_employee_general g on kr.EmployeeID=g.EmployeeID inner join hrm_department d on g.DepartmentId=d.DepartmentId where kr.YearId=".$_REQUEST['y']." AND e.EmpStatus='A' order by e.EmpCode ASC, k.KRAId ASC, Ldate ASC",$con); }
elseif($_REQUEST['a']=='form-A (SubKRA)')
{ $sql=mysql_query("select Tital,Wgt,Tgt,Ach,Remark,Cmnt,AppAch,AppCmnt,EmpCode,Fname,Sname,Lname,DepartmentCode from hrm_pms_kra_tgtdefin k inner join hrm_pms_krasub krs on k.KRASubId=krs.KRASubId inner join hrm_pms_kra kr on krs.KRAId=kr.KRAId inner join hrm_employee e on kr.EmployeeID=e.EmployeeID inner join hrm_employee_general g on kr.EmployeeID=g.EmployeeID inner join hrm_department d on g.DepartmentId=d.DepartmentId where kr.YearId=".$_REQUEST['y']." AND e.EmpStatus='A' order by e.EmpCode ASC, k.KRASubId ASC, Ldate ASC",$con); }
elseif($_REQUEST['a']=='form-B')
{ $sql=mysql_query("select Tital,Wgt,Tgt,Ach,Remark,Cmnt,AppAch,AppCmnt,EmpCode,Fname,Sname,Lname,DepartmentCode from hrm_pms_formb_tgtdefin k inner join hrm_employee e on k.EmployeeID=e.EmployeeID inner join hrm_employee_general g on k.EmployeeID=g.EmployeeID inner join hrm_department d on g.DepartmentId=d.DepartmentId where k.YearId=".$_REQUEST['y']." AND e.EmpStatus='A' order by e.EmpCode ASC, k.FormBId ASC, Ldate ASC",$con); }		  

}
else
{

if($_REQUEST['a']=='form-A')
{ $sql=mysql_query("select Tital,Wgt,Tgt,Ach,Remark,Cmnt,AppAch,AppCmnt,EmpCode,Fname,Sname,Lname,DepartmentCode from hrm_pms_kra_tgtdefin k inner join hrm_pms_kra kr on k.KRAId=kr.KRAId inner join hrm_employee e on kr.EmployeeID=e.EmployeeID inner join hrm_employee_general g on kr.EmployeeID=g.EmployeeID inner join hrm_department d on g.DepartmentId=d.DepartmentId where kr.YearId=".$_REQUEST['y']." AND g.DepartmentId=".$_REQUEST['d']." AND e.EmpStatus='A' order by e.EmpCode ASC, k.KRAId ASC, Ldate ASC",$con); }
elseif($_REQUEST['a']=='form-A (SubKRA)')
{ $sql=mysql_query("select Tital,Wgt,Tgt,Ach,Remark,Cmnt,AppAch,AppCmnt,EmpCode,Fname,Sname,Lname,DepartmentCode from hrm_pms_kra_tgtdefin k inner join hrm_pms_krasub krs on k.KRASubId=krs.KRASubId inner join hrm_pms_kra kr on krs.KRAId=kr.KRAId inner join hrm_employee e on kr.EmployeeID=e.EmployeeID inner join hrm_employee_general g on kr.EmployeeID=g.EmployeeID inner join hrm_department d on g.DepartmentId=d.DepartmentId where kr.YearId=".$_REQUEST['y']." AND g.DepartmentId=".$_REQUEST['d']." AND e.EmpStatus='A' order by e.EmpCode ASC, k.KRASubId ASC, Ldate ASC",$con); }
elseif($_REQUEST['a']=='form-B')
{ $sql=mysql_query("select Tital,Wgt,Tgt,Ach,Remark,Cmnt,AppAch,AppCmnt,EmpCode,Fname,Sname,Lname,DepartmentCode from hrm_pms_formb_tgtdefin k inner join hrm_employee e on k.EmployeeID=e.EmployeeID inner join hrm_employee_general g on k.EmployeeID=g.EmployeeID inner join hrm_department d on g.DepartmentId=d.DepartmentId where k.YearId=".$_REQUEST['y']." AND g.DepartmentId=".$_REQUEST['d']." AND e.EmpStatus='A' order by e.EmpCode ASC, k.FormBId ASC, Ldate ASC",$con); }

}

$sn=1;
while($res=mysql_fetch_array($sql))
{
  $schema_insert = "";
  $schema_insert .= $sn.$sep;
  $schema_insert .= $res['EmpCode'].$sep;
  $schema_insert .= ucwords(strtolower($res['Fname'].' '.$res['Sname'].' '.$res['Lname'])).$sep;
  $schema_insert .= $res['DepartmentCode'].$sep;
  $schema_insert .= $res['Remark'].$sep;
  $schema_insert .= $res['Tital'].$sep;
  $schema_insert .= $res['Wgt'].$sep;
  $schema_insert .= $res['Tgt'].$sep;
  $schema_insert .= $res['Ach'].$sep;
  $schema_insert .= $res['Cmnt'].$sep;
  $schema_insert .= $res['AppAch'].$sep;
  $schema_insert .= $res['AppCmnt'].$sep;
  			  
  $schema_insert = str_replace($sep."$", "", $schema_insert);
  $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
  $schema_insert .= "\t";
  print(trim($schema_insert));
  print "\n";
$sn++;  
}
}
?>
