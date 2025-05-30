<?php
define('HOST','localhost'); //localhost  //1_144.76.110.39  //2_148.251.83.156  //159.69.73.26
	define('USER','vnrseed2_hrims'); 
	define('PASS','5Az*hcHimJkE');
	define('DATABASE1','hrims');
	
	$con=mysql_connect(HOST,USER,PASS);
	if(!$con) die("Failed to connect to database!");
	$db=mysql_select_db(DATABASE1, $con);
	if(!$db) die("Failed to select database!");

       //$con=mysql_connect('localhost','vnrseed2_hr','vnrhrims321');
       //$db=mysql_select_db('vnrseed2_hrims', $con);
       //if(!$db) die("Failed to select database!");
       
    header ("Expires: ".gmdate("D, d M Y H:i:s", time())." GMT");  
    header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");  
    header ("Cache-Control: no-cache, must-revalidate");  
    header ("Pragma: no-cache");   
    
    mysql_query("SET SESSION sql_mode = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION'");
    
    date_default_timezone_set('Asia/Calcutta');
session_start();

// Function to fetch Year information based on company
function getYearInfo($companyId, $con) {
    $query = "SELECT YearId, FromDate, ToDate, Company1Status, Company2Status, Company3Status, Company4Status 
              FROM hrm_year WHERE Company{$companyId}Status='A'";
    return mysql_query($query, $con);
}

// Set year info based on companyadmin
if ($_POST['companyadmin']) {
    $companyadmin = $_POST['companyadmin'];
    $result = getYearInfo($companyadmin, $con);
    $res = mysql_fetch_array($result);

    $_SESSION['YearId'] = $res['YearId'];
    $_SESSION['fromdate'] = $res['FromDate'];
    $_SESSION['todate'] = $res['ToDate'];
    $_SESSION['Company1Status'] = $res['Company1Status'];
    $_SESSION['Company2Status'] = $res['Company2Status'];
    $_SESSION['Company3Status'] = $res['Company3Status'];
    $_SESSION['Company4Status'] = $res['Company4Status'];
}

// If empid is set, handle employee login and session setup
if (isset($_GET['empid'])) {
    $empid = $_GET['empid'];
    date_default_timezone_set('Asia/Kolkata');
    $DateTime = date("Y-m-d h:i:s");

    // Fetch employee details
    $employee_details = mysql_query("SELECT * FROM hrm_employee WHERE EmployeeID=$empid", $con);
    $employee = mysql_fetch_array($employee_details);

    // Set employee session variables
    $_SESSION['login'] = true;
    $_SESSION['EmpCode'] = $employee['EmpCode'];
    $_SESSION['EmployeeID'] = $employee['EmployeeID'];
    $_SESSION['CompanyId'] = $employee['CompanyId'];
    $_SESSION['eFND'] = $employee['EmpPass'];
    $_SESSION['EmpType'] = $employee['EmpType'];
    $_SESSION['EmpStatus'] = $employee['EmpStatus'];

    // Fetch year info based on employee's company
    $result = getYearInfo($employee['CompanyId'], $con);
    $res = mysql_fetch_array($result);

    $_SESSION['YearId'] = $res['YearId'];
    $_SESSION['fromdate'] = $res['FromDate'];
    $_SESSION['todate'] = $res['ToDate'];
    $_SESSION['Company1Status'] = $res['Company1Status'];
    $_SESSION['Company2Status'] = $res['Company2Status'];
    $_SESSION['Company3Status'] = $res['Company3Status'];
    $_SESSION['Company4Status'] = $res['Company4Status'];

    // Log user login
    $SqlULog = mysql_query("INSERT INTO hrm_logbook_emp(EmployeeID, EDateTime, CompanyId) 
                            VALUES(" . $_SESSION['EmployeeID'] . ", '" . $DateTime . "', " . $_SESSION['CompanyId'] . ")");
    
    // Optional: Debugging step
  

    // Redirect after login
    header('Location: Employee/EmpHome.php?log=ase987ujhygtfplkjfremhdieaaeewwggtt45634');
}
?>
