<?php
require_once ('config.php');

$jsonData = file_get_contents('php://input');
$json = json_decode($jsonData, true);

if ($json != null)
{
    $i='';
    foreach($json['previous_reference'] as $res){
        $i .= "('".$res['EmpCode']."','".$res['CompanyId']."','".$res['name']."','".$res['company']."','".$res['designation']."','".$res['email']."','".$res['contact']."'),";
    }
    
$val = rtrim($i,',');

$EmpCode = $json['previous_reference'][0]['EmpCode'];
$CompanyId = $json['previous_reference'][0]['CompanyId'];

$check = mysql_query("SELECT `name` FROM `EmployeePreRef_demo` WHERE EmpCode =".$EmpCode." AND CompanyId ='".$CompanyId."'",$con);

$row = mysql_num_rows($check);
if($row>0){
    //Delete then Insert
$up = mysql_query("DELETE FROM `EmployeePreRef_demo` WHERE EmpCode ='".$EmpCode."' AND CompanyId ='".$CompanyId."'",$con);
     $up = mysql_query("INSERT INTO `EmployeePreRef_demo`(`EmpCode`, `CompanyId`, `name`, `company`, `designation`, `email`, `contact`)  VALUES $val", $con);

}else{
    //Insert
    $up = mysql_query("INSERT INTO `EmployeePreRef_demo`(`EmpCode`, `CompanyId`, `name`, `company`, `designation`, `email`, `contact`)  VALUES $val", $con);
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