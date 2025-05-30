<?php 
require_once('config/config.php');
date_default_timezone_set('Asia/Calcutta');

$xls_filename = 'Employee_New_Change_Details.xls';
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=$xls_filename");
header("Pragma: no-cache");
header("Expires: 0");
$sep = "\t"; 
echo "Sn\tEC\tName\tDepartment_Name\tGrade\tLodgingA\tLodgingB\tLodgingC\tNew_LodgingA\tNew_LodgingB\tNew_LodgingC\tMobile_Rem\tMobile(PaidFromSalary)\tOld_Policy\tNew_Policy"; 
print("\n"); 
	
$sql = mysql_query("SELECT e.EmployeeID, EmpCode, concat(Fname, ' ', Sname, ' ', Lname) as Name, Gender, Married, g.DepartmentId, department_name, g.DesigId, designation_name, g.GradeId, grade_name, ep.PolicyName as PolicyOld, epN.PolicyName as PolicyNew, Lodging_CategoryA, Lodging_CategoryB, Lodging_CategoryC, Up_Lodging_CategoryA, Up_Lodging_CategoryB, Up_Lodging_CategoryC, Mobile_Exp_Rem_Rs, Prd, Up_Mobile_Exp_Rem_Rs, Up_Prd, Status_Approved,
CASE 
WHEN DR = 'Y' THEN 'Dr.'
WHEN Gender = 'M' THEN 'Mr.'
WHEN Gender = 'F' AND Married = 'Y' THEN 'Mrs.'
WHEN Gender = 'F' AND Married = 'N' THEN 'Miss.'
ELSE '' 
END as Greeting FROM hrm_employee_general g 
left join hrm_employee e ON g.EmployeeID=e.EmployeeID 
left join hrm_employee_personal p on g.EmployeeID=p.EmployeeID
left join core_departments d on g.DepartmentId=d.id
left join core_designation de on g.DesigId=de.id
left join core_grades gr on g.GradeId=gr.id 
left join hrm_employee_eligibility_update el on g.EmployeeID=el.EmployeeID
left join hrm_master_eligibility_policy ep on el.VehiclePolicy=ep.PolicyId
left join hrm_master_eligibility_policy epN on el.Up_VehiclePolicy=epN.PolicyId
WHERE e.EmpStatus='A' AND e.CompanyId=".$_REQUEST['C']." order by e.ECode ASC", $con);
$no=1; 
while($res = mysql_fetch_assoc($sql))
{  
  $EC = str_pad($res['EmpCode'], 4, '0', STR_PAD_LEFT);
  $C=$CompanyId; $YI=$YearId; $U=$UserId;	  

  $schema_insert = "";
  $schema_insert .= $no.$sep;
  $schema_insert .= $EC.$sep;
  $schema_insert .= $res['Name'].$sep;
  $schema_insert .= $res['department_name'].$sep;
  $schema_insert .= $res['grade_name'].$sep;
  $schema_insert .= $res['Lodging_CategoryA'].$sep;
  $schema_insert .= $res['Lodging_CategoryB'].$sep;
  $schema_insert .= $res['Lodging_CategoryC'].$sep;	
  $schema_insert .= $res['Up_Lodging_CategoryA'].$sep;
  $schema_insert .= $res['Up_Lodging_CategoryB'].$sep;
  $schema_insert .= $res['Up_Lodging_CategoryC'].$sep;	
  if($res['Mobile_Exp_Rem_Rs']!=''){ $schema_insert .= $res['Mobile_Exp_Rem_Rs'].'/'.$res['Prd'].$sep; }
  else{ $schema_insert .= ' '.$sep; }
  if($res['Mobile_Exp_Rem_Rs']!=''){ $schema_insert .= $res['Up_Mobile_Exp_Rem_Rs'].' /'.$res['Up_Prd'].$sep; }
  else{ $schema_insert .= ' '.$sep; }

  $schema_insert .= $res['PolicyOld'].$sep;
  $schema_insert .= $res['PolicyNew'].$sep;

  $schema_insert = str_replace($sep."$", "", $schema_insert);
  $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
  $schema_insert .= "\t";
  print(trim($schema_insert));
  print "\n";
  $no++;
 }
 
?>