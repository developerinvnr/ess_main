<?php
require_once 'config/config.php';
$sY = mysql_query('select * from hrm_year where YearId=' . $_REQUEST['Y'] . '', $con);
$rY = mysql_fetch_assoc($sY);
$FD = date('Y', strtotime($rY['FromDate']));
$TD = date('Y', strtotime($rY['ToDate']));
$PRD = $FD . '-' . $TD;
/*************************************************************************************************************/
if ($_REQUEST['action'] = 'ExportReportAll') {
    if ($_REQUEST['value'] == 'All') {
        $DeptV = 'All_Employee';
    } else {
        $sqlDeptV = mysql_query('select DepartmentCode from hrm_department where DepartmentId=' . $_REQUEST['value'], $con);
        $resDeptV = mysql_fetch_assoc($sqlDeptV);
        $DeptV = $resDeptV['DepartmentCode'];
    }

    #  Create the Column Headings
    $csv_output .= '"SNo.",';
    $csv_output .= '"Name",';
    $csv_output .= '"Department",';
    $csv_output .= '"Designation",';
    $csv_output .= '"Father Name",';
    $csv_output .= '"Parmanent Address",';
    $csv_output .= '"State",';
    $csv_output .= '"City",';
    $csv_output .= '"PinNo",';
    $csv_output .= '"Aadhar",';
    $csv_output .= '"Mobile",';
    $csv_output .= '"Cast",';
    $csv_output .= '"Marital Status",';

    $csv_output .= '"DOJ",';
    $csv_output .= '"Status",';
    $csv_output .= '"CostCenter",';
    $csv_output .= '"HQ",';
 
    $csv_output .= '"Bank Name",';
    $csv_output .= '"A/C No",';
    $csv_output .= '"IFSC",';
    $csv_output .= '"Branch",';
    $csv_output .= '"Branch Address",';
    $csv_output .= '"Basic",';
    $csv_output .= "\n";

    # Get Users Details form the DB #$result = mysql_query("SELECT * from formResults WHERE formID = '$formID'" );
    if ($_REQUEST['value'] == 'All') {
        if ($_REQUEST['s'] == 'AD') {
            $result = mysql_query('select e.*, p.*,g.*,c.*,f.*,ct.*,el.* from hrm_employee_general g INNER JOIN hrm_employee e ON g.EmployeeID=e.EmployeeID INNER JOIN hrm_employee_personal p ON g.EmployeeID=p.EmployeeID INNER JOIN hrm_employee_contact c ON g.EmployeeID=c.EmployeeID INNER JOIN hrm_employee_family f ON g.EmployeeID=f.EmployeeID INNER JOIN hrm_employee_ctc ct ON g.EmployeeID=ct.EmployeeID INNER JOIN hrm_employee_eligibility el ON g.EmployeeID=el.EmployeeID where e.CompanyId=' . $_REQUEST['C'] . " AND (e.EmpStatus='A' OR e.EmpStatus='D') AND ct.Status='A' AND el.Status='A'  group by e.EmpCode order by e.EmpCode ASC", $con);
        } else {
            $result = mysql_query('select e.*, p.*,g.*,c.*,f.*,ct.*,el.* from hrm_employee_general g INNER JOIN hrm_employee e ON g.EmployeeID=e.EmployeeID INNER JOIN hrm_employee_personal p ON g.EmployeeID=p.EmployeeID INNER JOIN hrm_employee_contact c ON g.EmployeeID=c.EmployeeID INNER JOIN hrm_employee_family f ON g.EmployeeID=f.EmployeeID INNER JOIN hrm_employee_ctc ct ON g.EmployeeID=ct.EmployeeID INNER JOIN hrm_employee_eligibility el ON g.EmployeeID=el.EmployeeID where e.CompanyId=' . $_REQUEST['C'] . " AND e.EmpStatus='" . $_REQUEST['s'] . "' AND ct.Status='A' AND el.Status='A'  group by e.EmpCode order by e.EmpCode ASC", $con);
        }
    } else {
        if ($_REQUEST['s'] == 'AD') {
            $result = mysql_query('select e.*, p.*,g.*,c.*,f.*,ct.*,el.* from hrm_employee_general g INNER JOIN hrm_employee e ON g.EmployeeID=e.EmployeeID INNER JOIN hrm_employee_personal p ON g.EmployeeID=p.EmployeeID INNER JOIN hrm_employee_contact c ON g.EmployeeID=c.EmployeeID INNER JOIN hrm_employee_family f ON g.EmployeeID=f.EmployeeID INNER JOIN hrm_employee_ctc ct ON g.EmployeeID=ct.EmployeeID INNER JOIN hrm_employee_eligibility el ON g.EmployeeID=el.EmployeeID where g.DepartmentId=' . $_REQUEST['value'] . ' AND e.CompanyId=' . $_REQUEST['C'] . " AND (e.EmpStatus='A' OR e.EmpStatus='D') AND ct.Status='A' AND el.Status='A'  group by e.EmpCode order by e.EmpCode ASC", $con);
        } else {
            $result = mysql_query('select e.*, p.*,g.*,c.*,f.*,ct.*,el.* from hrm_employee_general g INNER JOIN hrm_employee e ON g.EmployeeID=e.EmployeeID INNER JOIN hrm_employee_personal p ON g.EmployeeID=p.EmployeeID INNER JOIN hrm_employee_contact c ON g.EmployeeID=c.EmployeeID INNER JOIN hrm_employee_family f ON g.EmployeeID=f.EmployeeID INNER JOIN hrm_employee_ctc ct ON g.EmployeeID=ct.EmployeeID INNER JOIN hrm_employee_eligibility el ON g.EmployeeID=el.EmployeeID where g.DepartmentId=' . $_REQUEST['value'] . ' AND e.CompanyId=' . $_REQUEST['C'] . " AND e.EmpStatus='" . $_REQUEST['s'] . "' AND ct.Status='A' AND el.Status='A'  group by e.EmpCode order by e.EmpCode ASC", $con);
        }
    }

    $Sno = 1;
    while ($res = mysql_fetch_array($result)) {
        $Ename = $res['Fname'] . ' ' . $res['Sname'] . ' ' . $res['Lname'];
        $sqlDept = mysql_query('select DepartmentCode from hrm_department where DepartmentId=' . $res['DepartmentId'], $con);
        $resDept = mysql_fetch_assoc($sqlDept);
        $sqlDesig = mysql_query('select DesigCode,DesigName from hrm_designation where DesigId=' . $res['DesigId'], $con);
        $resDesig = mysql_fetch_assoc($sqlDesig);
        $sqlGrade = mysql_query('select GradeValue from hrm_grade where GradeId=' . $res['GradeId'], $con);
        $resGrade = mysql_fetch_assoc($sqlGrade);
        $sqlCC = mysql_query('select StateName from hrm_state where StateId=' . $res['CostCenter'], $con);
        $resCC = mysql_fetch_assoc($sqlCC);
        $sqlHQ = mysql_query('select HqName from hrm_headquater where HqId=' . $res['HqId'], $con);
        $resHQ = mysql_fetch_assoc($sqlHQ);

        if ($res['RepEmployeeID'] > 0) {
            $sqlRn = mysql_query('select DesigId from hrm_employee_general where EmployeeID=' . $res['RepEmployeeID'], $con);
            $resRn = mysql_fetch_assoc($sqlRn);
            $sqlDesigR = mysql_query('select DesigCode from hrm_designation where DesigId=' . $resRn['DesigId'], $con);
            $resDesigR = mysql_fetch_assoc($sqlDesigR);
        }
 
        $sqlS1 = mysql_query('select StateName from hrm_state where StateId=' . $res['CurrAdd_State'], $con);
        $resS1 = mysql_fetch_assoc($sqlS1);
        $sqlC1 = mysql_query('select CityName from hrm_city where CityId=' . $res['CurrAdd_City'], $con);
        $resC1 = mysql_fetch_assoc($sqlC1);
        $sqlS2 = mysql_query('select StateName from hrm_state where StateId=' . $res['ParAdd_State'], $con);
        $resS2 = mysql_fetch_assoc($sqlS2);
        $sqlC2 = mysql_query('select CityName from hrm_city where CityId=' . $res['ParAdd_City'], $con);
        $resC2 = mysql_fetch_assoc($sqlC2);
       
        $sqlF = mysql_query('select * from hrm_employee_family2 where EmployeeID=' . $res['EmployeeID'], $con);
        $csv_output .= '"' . str_replace('"', '""', $Sno) . '",';
        $csv_output .= '"' . str_replace('"', '""', strtoupper($Ename)) . '",';
        $csv_output .= '"' . str_replace('"', '""', strtoupper($resDept['DepartmentCode'])) . '",';
        $csv_output .= '"' . str_replace('"', '""', strtoupper($resDesig['DesigName'])) . '",';
        $csv_output .= '"' . str_replace('"', '""', strtoupper($res['FatherName'])) . '",';
        $csv_output .= '"' . str_replace('"', '""', strtoupper($res['ParAdd'])) . '",';
        $csv_output .= '"' . str_replace('"', '""', strtoupper($resS2['StateName'])) . '",';
        $csv_output .= '"' . str_replace('"', '""', strtoupper($resC2['CityName'])) . '",';
        $csv_output .= '"' . str_replace('"', '""', strtoupper($res['ParAdd_PinNo'])) . '",';
        $csv_output .= '"' . str_replace('"', '""', strtoupper($res['AadharNo'])) . '",';
        $csv_output .= '"' . str_replace('"', '""', $res['MobileNo_Vnr']) . '",';
        $csv_output .= '"' . str_replace('"', '""', strtoupper($res['Categoryy'])) . '",';
        if ($res['Married'] == 'Y') {
            $Marr = 'Married';
        } else {
            $Marr = 'Single';
        }
   
        $csv_output .= '"' . str_replace('"', '""', strtoupper($Marr)) . '",';

        $DOJ = '';
        if ($res['DateJoining'] != '1970-01-01' and $res['DateJoining'] != '0000-00-00') {
            if ($res['RetiStatus'] == 'Y') {
                $DOJ = date('d-M-y', strtotime($res['RetiDate']));
            } else {
                $DOJ = date('d-M-y', strtotime($res['DateJoining']));
            }
        } else {
            $DOJ = '';
        }
        $csv_output .= '"' . str_replace('"', '""', $DOJ) . '",';
        $csv_output .= '"' . str_replace('"', '""', $res['EmpStatus']) . '",';
        $csv_output .= '"' . str_replace('"', '""', strtoupper($resCC['StateName'])) . '",';
        $csv_output .= '"' . str_replace('"', '""', strtoupper($resHQ['HqName'])) . '",';
      
        $csv_output .= '"' . str_replace('"', '""', strtoupper($res['BankName'])) . '",';
        $csv_output .= '"' . str_replace('"', '""', strtoupper($res['AccountNo'])) . '",';
        $csv_output .= '"' . str_replace('"', '""', strtoupper($res['BankIfscCode'])) . '",';
        $csv_output .= '"' . str_replace('"', '""', strtoupper($res['BranchName'])) . '",';
        $csv_output .= '"' . str_replace('"', '""', strtoupper($res['BranchAdd'])) . '",';
        $csv_output .= '"' . str_replace('"', '""', $res['BAS_Value']) . '",';

        $csv_output .= "\n";
        $Sno++;
    }
    # Close the MySql connection
    mysql_close($con);
    # Set the headers so the file downloads
    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
    header('Content-Length: ' . strlen($csv_output));
    header('Content-type: text/x-csv');
    header('Content-Disposition: attachment; filename=LabourWelfareReport_' . $DeptV . '.csv');
    echo $csv_output;
    exit();
}
?>
