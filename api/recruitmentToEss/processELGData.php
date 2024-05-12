<?php
require_once ('config.php');

$jsonData = file_get_contents('php://input');
$json = json_decode($jsonData, true);

if ($json != null)
{

   $CompanyId = $json['elg_detail'][0]['CompanyId'];
   $EmpCode = $json['elg_detail'][0]['EmpCode'];
   $LoadCityA = $json['elg_detail'][0]['LoadCityA'];    
   $LoadCityB = $json['elg_detail'][0]['LoadCityB'];    
   $LoadCityC = $json['elg_detail'][0]['LoadCityC'];    
   $DAOut = $json['elg_detail'][0]['DAOut'];    
   $DAHq = $json['elg_detail'][0]['DAHq'];   
   $TwoWheel = $json['elg_detail'][0]['TwoWheel'];   
   $FourWheel = $json['elg_detail'][0]['FourWheel'];    
   $TravelMode = $json['elg_detail'][0]['TravelMode'];   
   $TravelClass = $json['elg_detail'][0]['TravelClass'];   
   $Mobile = $json['elg_detail'][0]['Mobile'];   
   $MExpense = $json['elg_detail'][0]['MExpense'];  
   $MTerm = $json['elg_detail'][0]['MTerm'];   
   $GPRS = $json['elg_detail'][0]['GPRS'];
   $Laptop= $json['elg_detail'][0]['Laptop'];
   $HealthIns = $json['elg_detail'][0]['HealthIns'];
 
$check = mysql_query("SELECT * FROM `EmployeeElg` WHERE EmpCode = ".$EmpCode." AND CompanyId ='".$CompanyId."'",$con);

$row = mysql_num_rows($check);
if($row>0){
    //Update
$up = mysql_query("UPDATE `EmployeeElg` SET `LoadCityA`='".$LoadCityA."',`LoadCityB`='".$LoadCityB."',`LoadCityC`='".$LoadCityC."',`DAOut`='".$DAOut."',`DAHq`='".$DAHq."',`TwoWheel`='".$TwoWheel."',`FourWheel`='".$FourWheel."',`TravelMode`='".$TravelMode."',`TravelClass`='".$TravelClass."',`Mobile`='".$Mobile."',`MExpense`='".$MExpense."',`MTerm`='".$MTerm."',`GPRS`='".$GPRS."',`Laptop`='".$Laptop."',`HealthIns`='".$HealthIns."' WHERE `EmpCode`='".$EmpCode."' AND `CompanyId`='".$CompanyId."'",$con);
     

}else{
    //Insert
    $up = mysql_query("INSERT INTO `EmployeeElg`(`EmpCode`, `CompanyId`, `LoadCityA`, `LoadCityB`, `LoadCityC`, `DAOut`, `DAHq`, `TwoWheel`, `FourWheel`, `TravelMode`, `TravelClass`, `Mobile`, `MExpense`, `MTerm`, `GPRS`, `Laptop`, `HealthIns`) VALUES ('".$EmpCode."','".$CompanyId."','".$LoadCityA."','".$LoadCityB."','".$LoadCityC."','".$DAOut."','".$DAHq."','".$TwoWheel."','".$FourWheel."','".$TravelMode."','".$TravelClass."','".$Mobile."','".$MExpense."','".$MTerm."','".$GPRS."','".$Laptop."','".$HealthIns."')", $con);
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