<?php
require_once ('config.php');

$jsonData = file_get_contents('php://input');
$json = json_decode($jsonData, true);

if ($json != null)
{
    $i='';
    foreach($json['language_info'] as $res){
        $i .= "('".$res['EmpCode']."','".$res['Company']."','".$res['language']."','".$res['read']."','".$res['write']."','".$res['speak']."'),";
    }
    
$val = rtrim($i,',');

$EmpCode = $json['language_info'][0]['EmpCode'];
$CompanyId = $json['language_info'][0]['Company'];

$check = mysql_query("SELECT `language` FROM `EmployeeLanguage_demo` WHERE EmpCode =".$EmpCode." AND CompanyId ='".$CompanyId."'",$con);

$row = mysql_num_rows($check);
if($row>0){
    //Delete then Insert
$up = mysql_query("DELETE FROM `EmployeeLanguage_demo` WHERE EmpCode ='".$EmpCode."' AND CompanyId ='".$CompanyId."'",$con);
     $up = mysql_query("INSERT INTO `EmployeeLanguage_demo`(`EmpCode`, `CompanyId`, `language`, `read`, `write`, `speak`)  VALUES $val", $con);

}else{
    //Insert
    $up =  mysql_query("INSERT INTO `EmployeeLanguage_demo`(`EmpCode`, `CompanyId`, `language`, `read`, `write`, `speak`)  VALUES $val", $con);
}
    if ($up > 0)
    {
        echo json_encode(array(
            "EmpCode" => $EmpCode,
            "Status" => "Joined",
            "msg" => "Success!"
        ));
    }
    else
    {
        echo json_encode(array(
            "EmpCode" => $EmpCode,
            "Status" => "Error",
            "msg" => "Query Error!"
        ));
    }
    /*****************************************************************************/

}
else
{
    echo json_encode(array(
        "Status" => "Error",
        "msg" => "Parameter Missing!"
    ));
}

/******************************* Joining Employee Close *************************************/
/******************************* Joining Employee Close *************************************/
?>