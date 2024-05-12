<?php 
require_once('../AdminUser/config/config.php');

 
 /******************************* Joining Employee Open *************************************/
 /******************************* Joining Employee Open *************************************/
  
  $jsonData = file_get_contents('php://input');
  $json = json_decode($jsonData, true);
  
  if($json!=null)
  {
  
    $EmpCode = $json['employee_joining'][0]['EmpCode'];
    $FName = $json['employee_joining'][0]['FName']; 
	$MName = $json['employee_joining'][0]['MName']; 
	$LName = $json['employee_joining'][0]['LName'];
	$FatherName = $json['employee_joining'][0]['FatherName']; 
	$DOB = $json['employee_joining'][0]['DOB']; 
	$Gender = $json['employee_joining'][0]['Gender'];
	$Aadhar = $json['employee_joining'][0]['Aadhar']; 
	$Email1 = $json['employee_joining'][0]['Email1']; 
	$Email2 = $json['employee_joining'][0]['Email2'];
	$Contact1 = $json['employee_joining'][0]['Contact1']; 
	$Contact2 = $json['employee_joining'][0]['Contact2']; 
	$CompanyId = $json['employee_joining'][0]['CompanyId'];
	$DepartmentId = $json['employee_joining'][0]['DepartmentId']; 
	$DesigId = $json['employee_joining'][0]['DesigId']; 
	$PositionId = $json['employee_joining'][0]['PositionId']; 
    
	/*****************************************************************************/
	$sql=mysql_query("select * from hrm_employee_demo where EmpCode=".$EmpCode." AND CompanyId=".$CompanyId,$con); 
	$row=mysql_num_rows($sql);
    
	if($row>0)
	{
	 $up=mysql_query("update hrm_employee_demo set FName='".$FName."', MName='".$MName."', LName='".$LName."', FatherName='".$FatherName."', DOB='".date("Y-m-d",strtotime($DOB))."', Gender='".$Gender."', Aadhar='".$Aadhar."', Email1='".$Email1."', Email2='".$Email2."', Contact1='".$Contact1."', Contact2='".$Contact2."', DepartmentId='".$DepartmentId."', DesigId='".$DesigId."', PositionId='".$PositionId."', JoinOnDt='".date("Y-m-d",strtotime($JoinOnDt))."', CreatedDate='".date("Y-m-d")."' where EmpCode=".$EmpCode." AND CompanyId=".$CompanyId,$con);
	}
	else
	{
	 $up=mysql_query("insert into hrm_employee_demo(EmpCode, FName, MName, LName, FatherName, DOB, Gender, Aadhar, Email1, Email2, Contact1, Contact2, CompanyId, DepartmentId, DesigId, PositionId, JoinOnDt, CreatedDate) values(".$EmpCode.", '".$FName."', '".$MName."', '".$LName."', '".$FatherName."', '".date("Y-m-d",strtotime($DOB))."', '".$Gender."', '".$Aadhar."', '".$Email1."', '".$Email2."', '".$Contact1."', '".$Contact2."', '".$CompanyId."', '".$DepartmentId."', '".$DesigId."', '".$PositionId."', '".date("Y-m-d",strtotime($JoinOnDt))."', '".date("Y-m-d")."')",$con);
	}
	
	if($up>0)
    {
     echo json_encode(array("EmpCode" => $EmpCode, "Status" => "Joined", "msg" => "Success!") );
    }
    else{ echo json_encode(array("EmpCode" => $EmpCode, "Status" => "Error", "msg" => "Query Error!") ); }  
	/*****************************************************************************/
	 
   
  }
  else
  {
    echo json_encode(array("EmpCode" => $EmpCode, "Status" => "Error", "msg" => "Parameter Missing!") ); 
  }
  
 
 
 /******************************* Joining Employee Close *************************************/
 /******************************* Joining Employee Close *************************************/

 
