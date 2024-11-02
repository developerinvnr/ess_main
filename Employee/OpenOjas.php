<?php
require_once '../AdminUser/config/config.php';
require_once '../vendor/autoload.php'; // Autoload composer dependencies
use \Firebase\JWT\JWT;

function redirectToOjas($employeeId) {
    
    $secretKey = 'v7n90l9uvy';
    $issuedAt = time();
    $expirationTime = $issuedAt + 3600;  // jwt valid for 1 hour

    // Create JWT payload
    $payload = array(
        'iss' => 'https://vnrseeds.com',  // Issuer
        'sub' => $employeeId,            // Subject - Employee ID
        'iat' => $issuedAt,              // Issued at
        'exp' => $expirationTime         // Expiration time
    );

    // Encode JWT token
    $jwt = JWT::encode($payload, $secretKey);
    // Redirect to OJAS login with the token
    header("Location: https://ojas.vnrseeds.co.in/ojas-login?token=$jwt");
    exit();
}

$employeeId = $_REQUEST['ei'];

$sql = mysql_query("select is_ojas_user from hrm_employee where EmployeeID=$employeeId",$con);
$employee = mysql_fetch_assoc($sql);
if ($employee['is_ojas_user'] == 1) {
    redirectToOjas($employeeId);
}
?>
