<?php
session_start();

if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}

include("../function.php");

if(check_user()==false){header('Location:../index.php');}

require_once('logcheck.php');

if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}

if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}

if($_SESSION['login'] = true){require_once('PhpFile/QueryP.php'); } else {$msg= "Session Expiry..............."; }
$check = array('Y'=>'SUBMITTED','N'=>'PENDING');

/*************************************************************************************************************/
if ($_REQUEST['action'] = 'export') {


    #  Create the Column Headings
    $csv_output .= '"SNo.",';
    $csv_output .= '"EC",';
    $csv_output .= '"Name",';
    $csv_output .= '"Department",';
    $csv_output .= '"Resignation Date",';
    $csv_output .= '"Relieving Date",';
    $csv_output .= '"Employee",';
    $csv_output .= '"Reporting",';
    $csv_output .= '"Departmental",';
    $csv_output .= '"Logistics",';
    $csv_output .= '"IT",';
    $csv_output .= '"HR",';
    $csv_output .= '"Account",';
    $csv_output .= "\n";

  if($_REQUEST['value']=='All'){
$sql = mysql_query("select e.EmpCode,CONCAT(e.Fname,' ', e.Sname,' ',e.Lname)as Name,d.DepartmentCode,es.Emp_ResignationDate,es.HR_RelievingDate,es.Emp_ExitInt,es.Rep_ExitIntForm,es.Rep_NOC,es.Log_NOC,es.IT_NOC,es.HR_NOC,es.Acc_NOC 
from hrm_employee_separation es
INNER JOIN hrm_employee e ON e.EmployeeID=es.EmployeeID 
INNER JOIN hrm_employee_general g ON g.EmployeeID = e.EmployeeID
INNER JOIN hrm_department d ON d.DepartmentId = g.DepartmentId
where es.ResignationStatus=4 
AND e.CompanyId=".$CompanyId." order by es.Emp_ResignationDate DESC", $con);}
else{
  $sql = mysql_query("select e.EmpCode,CONCAT(e.Fname,' ', e.Sname,' ',e.Lname)as Name,d.DepartmentCode,es.Emp_ResignationDate,es.HR_RelievingDate,es.Emp_ExitInt,es.Rep_ExitIntForm,es.Rep_NOC,es.Log_NOC,es.IT_NOC,es.HR_NOC,es.Acc_NOC 
from hrm_employee_separation es
INNER JOIN hrm_employee e ON e.EmployeeID=es.EmployeeID 
INNER JOIN hrm_employee_general g ON g.EmployeeID = e.EmployeeID
INNER JOIN hrm_department d ON d.DepartmentId = g.DepartmentId
where es.ResignationStatus=4 
AND e.CompanyId=".$CompanyId." AND g.DepartmentId = '".$_REQUEST['value']."' order by es.Emp_ResignationDate DESC", $con);  
}
   
    $row=mysql_num_rows($sql); 
    if($row>0) {
        $Sno=1; 
        while($res=mysql_fetch_array($sql)) { 
         
       

        $csv_output .= '"' . str_replace('"', '""', $Sno) . '",';
        $csv_output .= '"' . str_replace('"', '""', strtoupper($res['EmpCode'])) . '",';
        $csv_output .= '"' . str_replace('"', '""', strtoupper($res['Name'])) . '",';
        $csv_output .= '"' . str_replace('"', '""', strtoupper($res['DepartmentCode'])) . '",';
        $csv_output .= '"' . str_replace('"', '""', strtoupper($res['Emp_ResignationDate'])) . '",';
        $csv_output .= '"' . str_replace('"', '""', strtoupper($res['HR_RelievingDate'])) . '",';
        $csv_output .= '"' . str_replace('"', '""', $check[$res['Emp_ExitInt']]) . '",';
        $csv_output .= '"' . str_replace('"', '""', $check[$res['Rep_ExitIntForm']]) . '",';
        $csv_output .= '"' . str_replace('"', '""', $check[$res['Rep_NOC']]) . '",';
        $csv_output .= '"' . str_replace('"', '""', $check[$res['Log_NOC']]) . '",';
        $csv_output .= '"' . str_replace('"', '""', $check[$res['IT_NOC']]) . '",';
        $csv_output .= '"' . str_replace('"', '""', $check[$res['HR_NOC']]) . '",';
        $csv_output .= '"' . str_replace('"', '""', $check[$res['Acc_NOC']]) . '",';
  

        $csv_output .= "\n";
        $Sno++;
    }
    }
    # Close the MySql connection
    mysql_close($con);
    # Set the headers so the file downloads
    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
    header('Content-Length: ' . strlen($csv_output));
    header('Content-type: text/x-csv');
    header('Content-Disposition: attachment; filename=PendingClearance.csv');
    echo $csv_output;
    exit();
}
?>
