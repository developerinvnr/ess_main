<?php

$con=mysqli_connect('localhost','hrims_user','hrims@192');
if(!$con) die("Failed to connect to database!");
$db=mysqli_select_db( $con, 'hrims');
if(!$db) die("Failed to select database!");


// Assuming $con is your mysqli connection object
$employee = mysqli_query($con, "SELECT hrm_employee.EmployeeID, hrm_employee.EmpCode, hrm_employee.EmpStatus,  CONCAT(Fname, 
        IF(Sname <> '', CONCAT('_', Sname), ''), 
        IF(Lname <> '', CONCAT('_', Lname), '')) AS FullName, hrm_department.DepartmentCode, hrm_employee_general.GradeId,hrm_grade.GradeValue FROM hrm_employee  JOIN hrm_employee_general ON hrm_employee_general.EmployeeID = hrm_employee.EmployeeID  JOIN hrm_grade ON hrm_grade.GradeId = hrm_employee_general.GradeId JOIN hrm_department ON hrm_department.DepartmentId = hrm_employee_general.DepartmentId WHERE hrm_employee.CompanyId=1");

if (!$employee) {
    // Handle query error here
    die("Error: " . mysqli_error($con));
}

while ($row = $employee->fetch_assoc()) {
    
    $EmpCode = $row['EmpCode'];
    $Name = $row['FullName'];
    $Grade = $row['GradeValue'];
    $DepartmentCode = $row['DepartmentCode'];
    
    $gradeDirectory = "EmployeeImage/$Grade";
    if (!is_dir($gradeDirectory)) {
        mkdir($gradeDirectory, 0777, true); // Recursive directory creation
    }
    
     $departmentDirectory = "$gradeDirectory/$DepartmentCode"; // Create directory path for department
    if (!is_dir($departmentDirectory)) {
        mkdir($departmentDirectory, 0777, true); // Recursive directory creation for department
    }
    
    if($row['EmpStatus'] !='A'){
         $newFileName = 'ex_'.$EmpCode.'_'.$Name;
    }else{
        $newFileName = $EmpCode.'_'.$Name;
    }
  
    $originalImage = "EmployeeImage/$EmpCode.jpg";
    
    $newImage = "$departmentDirectory/$newFileName.jpg";
    
    rename($originalImage,$newImage);
}




?>