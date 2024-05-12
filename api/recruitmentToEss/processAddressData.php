<?php
require_once ('config.php');

$jsonData = file_get_contents('php://input');
$json = json_decode($jsonData, true);

if ($json != null)
{

   

    $CompanyId = $json['address_detail'][0]['Company'];
    $EmpCode = $json['address_detail'][0]['EmpCode'];
    $pre_address = $json['address_detail'][0]['pre_address'];
    $pre_state = $json['address_detail'][0]['pre_state'];
    $pre_dist = $json['address_detail'][0]['pre_dist'];
    $pre_city = $json['address_detail'][0]['pre_city'];
    $pre_pin = $json['address_detail'][0]['pre_pin'];
    $perm_address = $json['address_detail'][0]['perm_address'];
    $perm_state = $json['address_detail'][0]['perm_state'];
    $perm_dist = $json['address_detail'][0]['perm_dist'];
    $perm_city = $json['address_detail'][0]['perm_city'];
    $perm_pin = $json['address_detail'][0]['perm_pin'];


$check = mysql_query("SELECT * FROM `employee_address` WHERE EmpCode = ".$EmpCode." AND CompanyId ='".$CompanyId."'",$con);

$row = mysql_num_rows($check);
if($row>0){
    //Update
$up = mysql_query("UPDATE `employee_address` SET `pre_address`='".$pre_address."',`pre_state`='".$pre_state."',`pre_dist`='".$pre_dist."',`pre_city`='".$pre_city."',`pre_pin`='".$pre_pin."',`perm_address`='".$perm_address."',`perm_state`='".$perm_state."',`perm_dist`='".$perm_dist."',`perm_city`='".$perm_city."',`perm_pin`='".$perm_pin."' WHERE `EmpCode`='".$EmpCode."' AND `CompanyId`='".$CompanyId."'",$con);
     

}else{
    //Insert
    $up = mysql_query("INSERT INTO `employee_address`(`EmpCode`, `CompanyId`, `pre_address`, `pre_state`, `pre_dist`, `pre_city`, `pre_pin`, `perm_address`, `perm_state`, `perm_dist`, `perm_city`, `perm_pin`) VALUES ('".$EmpCode."','".$CompanyId."','".$pre_address."','".$pre_state."','".$pre_dist."','".$pre_city."','".$pre_pin."','".$perm_address."','".$perm_state."','".$perm_dist."','".$perm_city."','".$perm_pin."')", $con);
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