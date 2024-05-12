<?php 
require_once('../AdminUser/config/config.php');


 if($_REQUEST['EmpCode'] == ''){ echo json_encode(array("Status" => "Error", "msg" => "Parameter Missing!") ); }
 
 /******************************* Joining Employee Open *************************************/
 /******************************* Joining Employee Open *************************************/
  
 if($_REQUEST['EmpCode']>0)
 {  
    $EmpCode=$_REQUEST['EmpCode'];
    $FName=$_REQUEST['FName']; $MName=$_REQUEST['MName']; $LName=$_REQUEST['LName'];
	$FatherName=$_REQUEST['FatherName']; $DOB=$_REQUEST['DOB']; $Gender=$_REQUEST['Gender'];
	$Aadhar=$_REQUEST['Aadhar']; $Email1=$_REQUEST['Email1']; $Email2=$_REQUEST['Email2'];
	$Contact1=$_REQUEST['Contact1']; $Contact2=$_REQUEST['Contact2']; $CompanyId=$_REQUEST['CompanyId'];
	$DepartmentId=$_REQUEST['DepartmentId']; $DesigId=$_REQUEST['DesigId']; $PositionId=$_REQUEST['PositionId'];
	$JoinOnDt=$_REQUEST['JoinOnDt']; 
    
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
   else{ echo json_encode(array("EmpCode" => $EmpCode, "Status" => "Error", "msg" => "Error!") ); }  
 
 }
 
 
 /***************************/
 
 /***************************/
 
 
  
 /******************************* Joining Employee Close *************************************/
 /******************************* Joining Employee Close *************************************/

 
