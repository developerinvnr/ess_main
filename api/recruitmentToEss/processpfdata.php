<?php
require_once ('config.php');

$jsonData = file_get_contents('php://input');
$json = json_decode($jsonData, true);

if ($json != null)
{

   

    $CompanyId = $json['pf_esic_detail'][0]['Company'];
    $EmpCode = $json['pf_esic_detail'][0]['EmpCode'];
    $UAN = $json['pf_esic_detail'][0]['UAN'];
    $pf_acc_no = $json['pf_esic_detail'][0]['pf_acc_no'];
    $esic_no = $json['pf_esic_detail'][0]['esic_no'];


$check = mysql_query("SELECT * FROM `EmployeePF_demo` WHERE EmpCode = ".$EmpCode." AND CompanyId ='".$CompanyId."'",$con);

$row = mysql_num_rows($check);
if($row>0){
    //Update
$up = mysql_query("UPDATE `EmployeePF_demo` SET `UAN`='".$UAN."',`pf_acc_no`='".$pf_acc_no."',`esic_no`='".$esic_no."' WHERE `EmpCode`='".$EmpCode."' AND `CompanyId`='".$CompanyId."'",$con);
     

}else{
    //Insert
    $up = mysql_query("INSERT INTO `EmployeePF_demo`(`EmpCode`, `CompanyId`, `UAN`, `pf_acc_no`, `esic_no`) VALUES ('".$EmpCode."','".$CompanyId."','".$UAN."','".$pf_acc_no."','".$esic_no."')", $con);
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