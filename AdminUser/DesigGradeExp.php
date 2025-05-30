<?php
require_once('config/config.php');

if ($_REQUEST['action'] == 'export') {
    $xls_filename = 'Designation_Grade_Summary.xls';

    // Set headers for Excel file download
    header("Content-Type: application/xls");
    header("Content-Disposition: attachment; filename=$xls_filename");
    header("Pragma: no-cache");
    header("Expires: 0");

    $sep = "\t";

    // Fetch up to 4 active grades
    $grade_query = mysql_query(
        "SELECT id, grade_name 
         FROM core_grades 
         WHERE is_active = '1' AND company_id = " . $_REQUEST['company_id'] . " 
         ORDER BY id ASC ", 
        $con
    );

    $grades = [];
    while ($grade = mysql_fetch_assoc($grade_query)) {
        $grades[] = $grade;
    }

    // Build header dynamically
    echo "SNo" . $sep . "Department" . $sep . "Designation".$sep . "Bonus Wage Category";
    foreach ($grades as $grade) {
        echo $sep . $grade['grade_name'];
    }
    echo "\n";

    // Build department condition
    $department_condition = ($_REQUEST['value'] == 'All') ? "" : " AND hrm_deptgradedesig.DepartmentId=" . $_REQUEST['value'];

    // Main query to fetch designations and departments
    $sql = mysql_query(
        "SELECT 
            core_designation.id, 
            core_designation.designation_name, 
            core_departments.department_name, 
            hrm_deptgradedesig.DepartmentId ,
            hrm_bonus_category.Category
        FROM 
            core_designation 
        INNER JOIN 
            hrm_deptgradedesig ON core_designation.id = hrm_deptgradedesig.DesigId 
        INNER JOIN 
            core_departments ON hrm_deptgradedesig.DepartmentId = core_departments.id 
            LEFT JOIN hrm_bonus_category ON hrm_bonus_category.BWageId = hrm_deptgradedesig.MW
        WHERE 
            hrm_deptgradedesig.DGDStatus = 'A' 
            AND hrm_deptgradedesig.CompanyId = " . $_REQUEST['company_id'] . 
            $department_condition . " 
        GROUP BY 
            core_designation.id 
        ORDER BY 
            department_name, core_designation.designation_name ASC", 
        $con
    );

    $row = mysql_num_rows($sql);

    if ($row > 0) {
        $sno = 1;

        while ($res = mysql_fetch_array($sql)) {
            $schema_insert = "";
            $schema_insert .= $sno . $sep;
            $schema_insert .= $res['department_name'] . $sep;
            $schema_insert .= strtoupper($res['designation_name']).$sep;
            $schema_insert .= $res['Category'];
            foreach ($grades as $grade) {
                $grade_id = $grade['id'];

                // Check if grade is linked to this designation in any of the 5 columns
                $grade_check = mysql_query(
                    "SELECT DeptGradeDesigId 
                     FROM hrm_deptgradedesig 
                     WHERE 
                         DesigId = " . $res['id'] . " 
                         AND DepartmentId = " . $res['DepartmentId'] . " 
                         AND (
                             GradeId = $grade_id OR 
                             GradeId_2 = $grade_id OR 
                             GradeId_3 = $grade_id OR 
                             GradeId_4 = $grade_id OR 
                             GradeId_5 = $grade_id
                         )", 
                    $con
                );

                $schema_insert .= $sep . (mysql_num_rows($grade_check) > 0 ? "Yes" : "");
            }

            $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
            $schema_insert .= "\t";
            print $schema_insert . "\n";

            $sno++;
        }
    }
}
?>
