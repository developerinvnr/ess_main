<?php 
require_once('../AdminUser/config/config.php');


 if($_REQUEST['value'] == ''){ echo json_encode(array("msg" => "Parameter Missing!") ); }
 elseif($_REQUEST['value'] == 'userlist')
 {
   
   $run_qry=mysql_query("select e.EmpCode,e.Fname,e.Sname,e.Lname, d.DepartmentId,d.DepartmentName,de.DesigId,de.DesigName, EmailId_Vnr as EmailId, MobileNo_Vnr as MobileNo from hrm_employee e inner join hrm_employee_general g on e.EmployeeID=g.EmployeeID inner join hrm_department d on g.DepartmentId=d.DepartmentId inner join hrm_designation de on g.DesigId=de.DesigId where e.CompanyId=1 and e.EmpStatus='A' order by e.EmpCode asc");
   $num=mysql_num_rows($run_qry);
   if($num>0)
   {
     while($res=mysql_fetch_assoc($run_qry)){ $farray[]=$res; }
     echo json_encode(array("user_list" => $farray) ); 
   }
   else{ echo json_encode(array("msg" => "Invalid value for user!") ); }  
 
 }
 
