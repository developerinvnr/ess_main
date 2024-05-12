<?php 
require_once('config/config.php');

if($_REQUEST['action']='export') 
{ 
  
 $xls_filename = 'Confirmation_Deviation_Report.xls';
 header("Content-Type: application/xls");
 header("Content-Disposition: attachment; filename=$xls_filename");
 header("Pragma: no-cache"); header("Expires: 0"); $sep = "\t";  
 echo "Sn\tEmpCode\tName\tDepartment\tDesignation\tConfirmation Date\t Reporting Manager\tRep.Fill Date\tReporting Deviation\tHR Fill Date\tHR Deviation";
 print("\n");
 

 
 if($_REQUEST['value']=='all'){
      $sql=mysql_query("SELECT e.EmpCode,e.Fname,e.Sname,e.Lname,d.DepartmentCode,dg.DesigName,g.DateConfirmation,g.ReportingName,ltr.Rep_Fill_Date,ltr.HR_Fill_Date FROM hrm_employee e 
JOIN hrm_employee_general g ON g.EmployeeID = e.EmployeeID
JOIN hrm_department d ON d.DepartmentId = g.DepartmentId
JOIN hrm_designation dg ON dg.DesigId = g.DesigId
LEFT JOIN hrm_employee_confletter ltr ON ltr.EmployeeID = e.EmployeeID
WHERE e.EmpStatus ='A' AND e.CompanyId=1
order by e.EmployeeID ASC", $con);
 }else{
      $sql=mysql_query("SELECT e.VCode,e.EmpCode,e.Fname,e.Sname,e.Lname,d.DepartmentCode,dg.DesigName,g.DateConfirmation,g.ReportingName,ltr.Rep_Fill_Date,ltr.HR_Fill_Date FROM hrm_employee e 
JOIN hrm_employee_general g ON g.EmployeeID = e.EmployeeID
JOIN hrm_department d ON d.DepartmentId = g.DepartmentId
JOIN hrm_designation dg ON dg.DesigId = g.DesigId
LEFT JOIN hrm_employee_confletter ltr ON ltr.EmployeeID = e.EmployeeID
WHERE e.EmpStatus ='A' AND e.CompanyId=1 AND g.DepartmentId=".$_REQUEST['value']." 
order by e.EmployeeID ASC", $con); 
 }
 $row=mysql_num_rows($sql);
  
 if($row>0) 
 { 
      $no=1; 
      while($res=mysql_fetch_array($sql))
      {
           $RFillDate = '';
           $DOC = '';
           $no2OdDay = '';
           $no3OdDay='';
           $schema_insert = "";
           $schema_insert .= $no.$sep;	
           $schema_insert .= $res['EmpCode'].$sep;	
           $schema_insert .= $res['Fname'].' '.$res['Sname'].' '.$res['Lname'].$sep;
           $schema_insert .= $res['DepartmentCode'].$sep;	
           $schema_insert .= $res['DesigName'].$sep;
           if($res['DateConfirmation'] == NULL || $res['DateConfirmation'] == '1970-01-01' || $res['DateConfirmation'] == '0000-00-00'){
                $schema_insert .=''.$sep;
           }else{
                $schema_insert .= $res['DateConfirmation'].$sep;
               
           }
          	
           $schema_insert .= $res['ReportingName'].$sep;
           
           if($res['Rep_Fill_Date'] == NULL || $res['Rep_Fill_Date'] == '1970-01-01' || $res['Rep_Fill_Date'] == '0000-00-00'){
                $schema_insert .=''.$sep;
           }else{
                $schema_insert .= $res['Rep_Fill_Date'].$sep;
               
           }
           
         if($res['Rep_Fill_Date']!='' AND $res['Rep_Fill_Date']!='1970-01-01' AND $res['Rep_Fill_Date']!='0000-00-00' AND $res['DateConfirmation']!='' AND $res['DateConfirmation']!='1970-01-01' AND $res['DateConfirmation']!='0000-00-00')
         {
           $earlier2 = new DateTime($res['DateConfirmation']); 
           $later2 = new DateTime($res['Rep_Fill_Date']); 
           $no2OdDay = $later2->diff($earlier2)->format("%a"); 
           
         }  
         else
         {
             $no2OdDay=' '; 
         }
         $schema_insert .= $no2OdDay.$sep;
         
         if($res['HR_Fill_Date'] == NULL || $res['HR_Fill_Date'] == '1970-01-01' || $res['HR_Fill_Date'] == '0000-00-00'){
                $schema_insert .=''.$sep;
           }else{
                $schema_insert .= $res['HR_Fill_Date'].$sep;
               
           }
         
         if($res['HR_Fill_Date']!='' AND $res['HR_Fill_Date']!='1970-01-01' AND $res['HR_Fill_Date']!='0000-00-00' AND $res['Rep_Fill_Date']!='' AND $res['Rep_Fill_Date']!='1970-01-01' AND $res['Rep_Fill_Date']!='0000-00-00')
         {
           $earlier3 = new DateTime($res['Rep_Fill_Date']); 
           $later3 = new DateTime($res['HR_Fill_Date']); 
           $no3OdDay = $later3->diff($earlier3)->format("%a"); 
           
         }  
         else
         {
             $no3OdDay=' '; 
         }
         $schema_insert .= $no3OdDay.$sep;
           
          
          
           $schema_insert = str_replace($sep."$", "", $schema_insert);
           $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
           $schema_insert .= "\t";
           print(trim($schema_insert)); print "\n"; 
           $no++;
      }
 }
 
}
?>







