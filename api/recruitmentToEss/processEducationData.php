<?php
require_once ('config.php');

$jsonData = file_get_contents('php://input');
$json = json_decode($jsonData, true);

if ($json != null)
{
    $i='';
    foreach($json['education_info'] as $res){
        $i .= "('".$res['EmpCode']."','".$res['Company']."','".$res['Qualification']."','".$res['Course']."','".$res['Specialization']."','".$res['Institute']."','".$res['YearOfPassing']."','".$res['CGPA']."'),";
    }
    
$val = rtrim($i,',');

$EmpCode = $json['education_info'][0]['EmpCode'];
$CompanyId = $json['education_info'][0]['Company'];

$check = mysql_query("SELECT Qualification FROM `EmployeeEducation_demo` WHERE EmpCode =".$EmpCode." AND CompanyId ='".$CompanyId."'",$con);

$row = mysql_num_rows($check);
if($row>0){
    //Delete then Insert
$up = mysql_query("DELETE FROM `EmployeeEducation_demo` WHERE EmpCode ='".$EmpCode."' AND CompanyId ='".$CompanyId."'",$con);
     $up = mysql_query("INSERT INTO `EmployeeEducation_demo`(`EmpCode`, `CompanyId`, `Qualification`, `Course`, `Specialization`, `Institute`, `YearOfPassing`,`CGPA`) VALUES $val", $con);

}else{
    //Insert
    $up = mysql_query("INSERT INTO `EmployeeEducation_demo`(`EmpCode`, `CompanyId`, `Qualification`, `Course`, `Specialization`, `Institute`, `YearOfPassing`,`CGPA`) VALUES $val", $con);
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