<?php
require_once ('config.php');

$jsonData = file_get_contents('php://input');
$json = json_decode($jsonData, true);

if ($json != null)
{

   $CompanyId = $json['ctc_detail'][0]['CompanyId'];
   $EmpCode = $json['ctc_detail'][0]['EmpCode'];
   $basic = $json['ctc_detail'][0]['basic'];    
   $hra = $json['ctc_detail'][0]['hra'];    
   $bonus = $json['ctc_detail'][0]['bonus'];    
   $special_alw = $json['ctc_detail'][0]['special_alw'];    
   $emplyPF = $json['ctc_detail'][0]['emplyPF'];   
   $emplyESIC = $json['ctc_detail'][0]['emplyESIC'];   
   $lta = $json['ctc_detail'][0]['lta'];    
   $childedu = $json['ctc_detail'][0]['childedu'];   
   $gratuity = $json['ctc_detail'][0]['gratuity'];   
   $emplyerPF = $json['ctc_detail'][0]['emplyerPF'];   
   $emplyerESIC = $json['ctc_detail'][0]['emplyerESIC'];  
   $medical = $json['ctc_detail'][0]['medical'];   
   $netMonth = $json['ctc_detail'][0]['netMonth'];
   $grsM_salary = $json['ctc_detail'][0]['grsM_salary'];
   $anualgrs = $json['ctc_detail'][0]['anualgrs'];
   $total_ctc = $json['ctc_detail'][0]['total_ctc'];

$check = mysql_query("SELECT * FROM `EmployeeCTC` WHERE EmpCode = ".$EmpCode." AND CompanyId ='".$CompanyId."'",$con);

$row = mysql_num_rows($check);
if($row>0){
    //Update
$up = mysql_query("UPDATE `EmployeeCTC` SET `basic`='".$basic."',`hra`='".$hra."',`bonus`='".$bonus."',`special_alw`='".$special_alw."',`grsM_salary`='".$grsM_salary."',`emplyPF`='".$emplyPF."',`emplyESIC`='".$emplyESIC."',`netMonth`='".$netMonth."',`lta`='".$lta."',`childedu`='".$childedu."',`anualgrs`='".$anualgrs."',`gratuity`='".$gratuity."',`emplyerPF`='".$emplyerPF."',`emplyerESIC`='".$emplyerESIC."',`medical`='".$medical."',`total_ctc`='".$total_ctc."' WHERE `EmpCode`='".$EmpCode."' AND `CompanyId`='".$CompanyId."'",$con);
     

}else{
    //Insert
    $up = mysql_query("INSERT INTO `EmployeeCTC`(`EmpCode`, `CompanyId`, `basic`, `hra`, `bonus`, `special_alw`, `grsM_salary`, `emplyPF`, `emplyESIC`, `netMonth`, `lta`, `childedu`, `anualgrs`, `gratuity`, `emplyerPF`, `emplyerESIC`, `medical`, `total_ctc`) VALUES ('".$EmpCode."','".$CompanyId."','".$basic."','".$hra."','".$bonus."','".$special_alw."','".$grsM_salary."','".$emplyPF."','".$emplyESIC."','".$netMonth."','".$lta."','".$childedu."','".$anualgrs."','".$gratuity."','".$emplyerPF."','".$emplyerESIC."','".$medical."','".$total_ctc."')", $con);
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