<?php
require_once ('config.php');

$jsonData = file_get_contents('php://input');
$json = json_decode($jsonData, true);

if ($json != null)
{

    $NameTitle = $json['personal_detail'][0]['NameTitle'];
    $FName = $json['personal_detail'][0]['FName'];
    $MName = $json['personal_detail'][0]['MName'];
    $LName = $json['personal_detail'][0]['LName'];

    $DOB = $json['personal_detail'][0]['DOB'];
    $Gender = $json['personal_detail'][0]['Gender'];
    $Aadhar = $json['personal_detail'][0]['Aadhar'];

    $Email1 = $json['personal_detail'][0]['Email1'];
    $Email2 = $json['personal_detail'][0]['Email2'];

    $Contact1 = $json['personal_detail'][0]['Contact1'];
    $Contact2 = $json['personal_detail'][0]['Contact2'];

    $EmgContName_One = $json['personal_detail'][0]['cont_one_name'];
    $EmgContRelation_One = $json['personal_detail'][0]['cont_one_relation'];
    $EmgContNumber_One = $json['personal_detail'][0]['cont_one_number'];

    $EmgContName_Two = $json['personal_detail'][0]['cont_two_name'];
    $EmgContRelation_Two = $json['personal_detail'][0]['cont_two_relation'];
    $EmgContNumber_Two = $json['personal_detail'][0]['cont_two_number'];

    $CompanyId = $json['personal_detail'][0]['Company'];
    $Grade = $json['personal_detail'][0]['Grade'];
    $DepartmentId = $json['personal_detail'][0]['Department'];
    $DesigId = $json['personal_detail'][0]['Designation'];
    $F_StateHq = $json['personal_detail'][0]['F_StateHq'];
    $F_LocationHq = $json['personal_detail'][0]['F_LocationHq'];
    
    $T_StateHq = $json['personal_detail'][0]['T_StateHq'];
    $T_LocationHq = $json['personal_detail'][0]['T_LocationHq'];
    $F_ReportingManager = $json['personal_detail'][0]['F_ReportingManager'];
    $A_ReportingManager = $json['personal_detail'][0]['A_ReportingManager'];
    $ServiceCondition = $json['personal_detail'][0]['ServiceCondition'];
    $ServiceBond = $json['personal_detail'][0]['ServiceBond'];
    $ServiceBondYears = $json['personal_detail'][0]['ServiceBondYears'];
    $ServiceBondRefund = $json['personal_detail'][0]['ServiceBondRefund'];
    $JoinOnDt = $json['personal_detail'][0]['JoinOnDt'];
    $EmpCode = $json['personal_detail'][0]['EmpCode'];
    $CandidateId = $json['personal_detail'][0]['CandidateId'];
    $AFT_Grade = $json['personal_detail'][0]['AFT_Grade'];
    $AFT_Designation = $json['personal_detail'][0]['AFT_Designation'];
    $OrientationPeriod = $json['personal_detail'][0]['OrientationPeriod'];
    $Stipend = $json['personal_detail'][0]['Stipend'];
    $Religion = $json['personal_detail'][0]['Religion'];
    $Caste = $json['personal_detail'][0]['Caste'];
    $MaritalStatus = $json['personal_detail'][0]['MaritalStatus'];
    $marriage_dt = $json['personal_detail'][0]['marriage_dt'];
    $DrivingLicense = $json['personal_detail'][0]['DrivingLicense'];
    $LValidity = $json['personal_detail'][0]['LValidity'];


$check = mysql_query("SELECT * FROM `hrm_employee_demo` WHERE EmpCode = ".$EmpCode." AND CompanyId ='".$CompanyId."'",$con);

$row = mysql_num_rows($check);
if($row>0){
    //Update
     $up = mysql_query("UPDATE `hrm_employee_demo` SET `NameTitle`='".$NameTitle."',`FName`='".$FName."',`MName`='".$MName."',`LName`='".$LName."', `DOB`='".date("Y-m-d", strtotime($DOB))."',`CandidateId`='".$CandidateId."', `Gender`='".$Gender."',`Aadhar`='". $Aadhar."',`Email1`='". $Email1."',`Email2`='".$Email2."',`Contact1`='".$Contact1."',`Contact2`='".$Contact2."', `EmgContName_One`='".$EmgContName_One."', `EmgContRelation_One`='".$EmgContRelation_One."',`EmgContPhone_One`='".$EmgContNumber_One."',`EmgContName_Two`='".$EmgContName_Two."', `EmgContRelation_Two`='".$EmgContRelation_Two."',`EmgContPhone_Two`='".$EmgContNumber_Two."', `Grade`='".$Grade."', `DepartmentId`='".$DepartmentId."', `DesigId`='".$DesigId."',`T_StateHq`='".$T_StateHq."', `T_LocationHq`='".$T_LocationHq."', `F_StateHq`='".$F_StateHq."', `F_LocationHq`='".$F_LocationHq."',`F_ReportingManager`='".$F_ReportingManager."', `A_ReportingManager`='".$A_ReportingManager."', `ServiceCondition`='".$ServiceCondition."', `OrientationPeriod`='".$OrientationPeriod."', `Stipend`='".$Stipend."', `Religion`='".$Religion."',`AFT_Grade`='".$AFT_Grade."', `AFT_Designation`='".$AFT_Designation."', `ServiceBond`='".$ServiceBond."',`ServiceBondYears`='".$ServiceBondYears."',`ServiceBondRefund`='".$ServiceBondRefund."',`Caste`='".$Caste."',`MaritalStatus`='".$MaritalStatus."',`marriage_dt`='".$marriage_dt."',`DrivingLicense`='".$DrivingLicense."',`LValidity`='".$LValidity."',`JoinOnDt`='". date("Y-m-d", strtotime($JoinOnDt))."',`CreatedDate`='".date("Y-m-d")."' WHERE EmpCode=".$EmpCode." AND CompanyId='".$CompanyId."'",$con);
     

}else{
    //Insert
  
    $up = mysql_query("INSERT INTO `hrm_employee_demo`(`EmpCode`,`CandidateId`,`NameTitle`,`FName`,`MName`,`LName`, `DOB`, `Gender`,`Aadhar`,`Email1`,`Email2`,`Contact1`,`Contact2`, `EmgContName_One`, `EmgContRelation_One`,`EmgContPhone_One`,`EmgContName_Two`, `EmgContRelation_Two`,`EmgContPhone_Two`, `CompanyId`, `Grade`, `DepartmentId`, `DesigId`,`T_StateHq`, `T_LocationHq`, `F_StateHq`, `F_LocationHq`,`F_ReportingManager`, `A_ReportingManager`, `ServiceCondition`, `OrientationPeriod`, `Stipend`, `Religion`,`AFT_Grade`, `AFT_Designation`, `ServiceBond`,`ServiceBondYears`,`ServiceBondRefund`,`JoinOnDt`,`CreatedDate`,`Caste`, `MaritalStatus`, `marriage_dt`, `DrivingLicense`, `LValidity`) VALUES (".$EmpCode.",".$CandidateId.",'".$NameTitle."','".$FName."','".$MName."','".$LName."','".date("Y-m-d", strtotime($DOB))."','".$Gender."','". $Aadhar."','". $Email1."','".$Email2."','".$Contact1."','".$Contact2."','".$EmgContName_One."','".$EmgContRelation_One."','".$EmgContNumber_One."','".$EmgContName_Two."','".$EmgContRelation_Two."','".$EmgContNumber_Two."','".$CompanyId."','".$Grade."','".$DepartmentId."','".$DesigId."','".$T_StateHq."','".$T_LocationHq."','".$F_StateHq."','".$F_LocationHq."','".$F_ReportingManager."','".$A_ReportingManager."','".$ServiceCondition."','".$OrientationPeriod."','".$Stipend."','".$Religion."','".$AFT_Grade."','".$AFT_Designation."','".$ServiceBond."','".$ServiceBondYears."','".$ServiceBondRefund."','". date("Y-m-d", strtotime($JoinOnDt))."','".date("Y-m-d")."','".$Caste."','".$MaritalStatus."','".$marriage_dt."','".$DrivingLicense."','".$LValidity."')", $con);
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

