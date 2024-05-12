<?php
require_once ('config.php');

$jsonData = file_get_contents('php://input');
$json = json_decode($jsonData, true);

if ($json != null)
{
    $i='';
    foreach($json['work_experience'] as $res){
        $i .= "('".$res['EmpCode']."','".$res['CompanyId']."','".$res['company']."','".$res['desgination']."','".$res['job_start']."','".$res['job_end']."','".$res['gross_mon_sal']."','".$res['annual_ctc']."'),";
    }
    
$val = rtrim($i,',');

$EmpCode = $json['work_experience'][0]['EmpCode'];
$CompanyId = $json['work_experience'][0]['CompanyId'];

$check = mysql_query("SELECT * FROM `EmployeeWorkExp_demo` WHERE EmpCode =".$EmpCode." AND CompanyId ='".$CompanyId."'",$con);

$row = mysql_num_rows($check);
if($row>0){
    //Delete then Insert
$up = mysql_query("DELETE FROM `EmployeeWorkExp_demo` WHERE EmpCode ='".$EmpCode."' AND CompanyId ='".$CompanyId."'",$con);
     $up = mysql_query("INSERT INTO `EmployeeWorkExp_demo`(`EmpCode`, `CompanyId`, `company`, `desgination`, `job_start`, `job_end`, `gross_mon_sal`, `annual_ctc`) VALUES $val", $con);

}else{
    //Insert
     $up = mysql_query("INSERT INTO `EmployeeWorkExp_demo`(`EmpCode`, `CompanyId`, `company`, `desgination`, `job_start`, `job_end`, `gross_mon_sal`, `annual_ctc`) VALUES $val", $con);
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