<?php
require_once 'config/config.php';

/*************************************************************************************************************/
if ($_REQUEST['action'] = 'export') {
    
    $companyId = $_REQUEST['C'];
    $departmentId = $_REQUEST['value'];

    #  Create the Column Headings
    $csv_output .= '"SNo.",';
    $csv_output .= '"EmpCode",';
    $csv_output .= '"Name",';
    $csv_output .= '"Designation",';
    $csv_output .= '"Reporting",';
    $csv_output .= '"Reporting2",';
    $csv_output .= '"Reporting3",';

    $csv_output .= "\n";


$result = mysql_query("SELECT hrm_employee_reporting.*, hrm_employee.EmpCode,concat(hrm_employee.Fname,' ',hrm_employee.Sname,' ',hrm_employee.Lname) as name,core_designation.designation_name as DesigName,concat(e1.EmpCode,' - ',e1.Fname,' ',e1.Sname,' ',e1.Lname) as Reporting,concat(e2.EmpCode,' - ',e2.Fname,' ',e2.Sname,' ',e2.Lname) as Reporting2,concat(e3.EmpCode,' - ',e3.Fname,' ',e3.Sname,' ',e3.Lname) as Reporting3 FROM hrm_employee_reporting 
left JOIN hrm_employee_general ON hrm_employee_reporting.EmployeeID=hrm_employee_general.EmployeeID 
left JOIN hrm_employee ON hrm_employee_reporting.EmployeeID=hrm_employee.EmployeeID 
LEFT JOIN hrm_employee e1 ON e1.EmployeeID = hrm_employee_reporting.AppraiserId
LEFT JOIN hrm_employee e2 ON e2.EmployeeID = hrm_employee_reporting.ReviewerId
LEFT JOIN hrm_employee e3 ON e3.EmployeeID = hrm_employee_reporting.HodId
left JOIN hrm_employee_personal ON hrm_employee_reporting.EmployeeID=hrm_employee_personal.EmployeeID
LEFT JOIN core_designation ON core_designation.id = hrm_employee_general.DesigId
WHERE hrm_employee.EmpStatus='A' AND hrm_employee.EmpType='E' AND hrm_employee.CompanyId=".$companyId." AND hrm_employee_general.DepartmentId=".$departmentId." order by hrm_employee.ECode ASC;", $con);
       

    $Sno = 1;
    while ($res = mysql_fetch_array($result)) {
        $csv_output .= '"'.str_replace('"', '""', $Sno).'",'; 
        $csv_output .= '"'.str_replace('"', '""', $res['EmpCode']).'",'; 
        $csv_output .= '"'.str_replace('"', '""', $res['name']).'",'; 
        $csv_output .= '"'.str_replace('"', '""', $res['DesigName']).'",'; 
        $csv_output .= '"'.str_replace('"', '""', $res['Reporting']).'",'; 
        $csv_output .= '"'.str_replace('"', '""', $res['Reporting2']).'",'; 
        $csv_output .= '"'.str_replace('"', '""', $res['Reporting3']).'",'; 
        $csv_output .= "\n";
        $Sno++;
    }
    # Close the MySql connection
    mysql_close($con);
    # Set the headers so the file downloads
    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
    header('Content-Length: ' . strlen($csv_output));
    header('Content-type: text/x-csv');
    header('Content-Disposition: attachment; filename=LeaveReporting_' . $DeptV . '.csv');
    echo $csv_output;
    exit();
}
?>
