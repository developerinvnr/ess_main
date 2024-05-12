<?php
require_once ('config.php');

$jsonData = file_get_contents('php://input');
$json = json_decode($jsonData, true);

if ($json != null)
{
    $i='';
    foreach($json['family_info'] as $res){
        $i .= "('".$res['EmpCode']."','".$res['Company']."','".$res['relation']."','".$res['name']."','".$res['dob']."','".$res['qualification']."','".$res['occupation']."'),";
    }
    
$val = rtrim($i,',');

$EmpCode = $json['family_info'][0]['EmpCode'];
$CompanyId = $json['family_info'][0]['Company'];

$check = mysql_query("SELECT name FROM `EmployeeFamily_demo` WHERE EmpCode =".$EmpCode." AND CompanyId ='".$CompanyId."'",$con);

$row = mysql_num_rows($check);
if($row>0){
    //Delete then Insert
$up = mysql_query("DELETE FROM `EmployeeFamily_demo` WHERE EmpCode ='".$EmpCode."' AND CompanyId ='".$CompanyId."'",$con);
     $up = mysql_query("INSERT INTO `EmployeeFamily_demo`(`EmpCode`, `CompanyId`, `Relation`, `Name`, `Dob`, `Qualification`, `Occupation`) VALUES $val", $con);

}else{
    //Insert
    $up = mysql_query("INSERT INTO `EmployeeFamily_demo`(`EmpCode`, `CompanyId`, `Relation`, `Name`, `Dob`, `Qualification`, `Occupation`) VALUES $val", $con);
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