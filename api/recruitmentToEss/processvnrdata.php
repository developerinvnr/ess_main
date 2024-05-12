<?php
require_once ('config.php');

$jsonData = file_get_contents('php://input');
$json = json_decode($jsonData, true);

if ($json != null)
{
    $i='';
    foreach($json['vnr_reference'] as $res){
        $i .= "('".$res['EmpCode']."','".$res['CompanyId']."','".$res['name']."','".$res['company']."','".$res['designation']."','".$res['email']."','".$res['contact']."','".$res['rel_with_person']."'),";
    }
    
$val = rtrim($i,',');

$EmpCode = $json['vnr_reference'][0]['EmpCode'];
$CompanyId = $json['vnr_reference'][0]['CompanyId'];

$check = mysql_query("SELECT `name` FROM `EmployeeVnrRef_demo` WHERE EmpCode =".$EmpCode." AND CompanyId ='".$CompanyId."'",$con);

$row = mysql_num_rows($check);
if($row>0){
    //Delete then Insert
$up = mysql_query("DELETE FROM `EmployeeVnrRef_demo` WHERE EmpCode ='".$EmpCode."' AND CompanyId ='".$CompanyId."'",$con);
     $up = mysql_query("INSERT INTO `EmployeeVnrRef_demo`(`EmpCode`, `CompanyId`, `name`, `company`, `designation`, `email`, `contact`, `rel_with_person`)  VALUES $val", $con);

}else{
    //Insert
    $up = mysql_query("INSERT INTO `EmployeeVnrRef_demo`(`EmpCode`, `CompanyId`, `name`, `company`, `designation`, `email`, `contact`, `rel_with_person`)  VALUES $val", $con);
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