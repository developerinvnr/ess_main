<?php
require_once ('config.php');

$jsonData = file_get_contents('php://input');
$json = json_decode($jsonData, true);

if ($json != null)
{
    $i='';
    foreach($json['training_exp'] as $res){
        $i .= "('".$res['EmpCode']."','".$res['CompanyId']."','".$res['training']."','".$res['organization']."','".$res['from']."','".$res['to']."'),";
    }
    
$val = rtrim($i,',');

$EmpCode = $json['training_exp'][0]['EmpCode'];
$CompanyId = $json['training_exp'][0]['CompanyId'];

$check = mysql_query("SELECT * FROM `EmployeeTraining_demo` WHERE EmpCode =".$EmpCode." AND CompanyId ='".$CompanyId."'",$con);

$row = mysql_num_rows($check);
if($row>0){
    //Delete then Insert
$del = mysql_query("DELETE FROM `EmployeeTraining_demo` WHERE EmpCode ='".$EmpCode."' AND CompanyId ='".$CompanyId."'",$con);
$up = mysql_query("INSERT INTO `EmployeeTraining_demo`(`EmpCode`, `CompanyId`, `training`, `organization`, `from`, `to`) VALUES $val", $con);

}else{
    //Insert
$up = mysql_query("INSERT INTO `EmployeeTraining_demo`(`EmpCode`, `CompanyId`, `training`, `organization`, `from`, `to`) VALUES $val", $con);
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