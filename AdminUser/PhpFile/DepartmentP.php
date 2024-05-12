<?php 
if(isset($_POST['AddNewDept']))
{ 
   $SqlInseart = mysql_query("INSERT INTO hrm_department(DepartmentName, DepartmentCode, CompanyId, DeptStatus, CreatedBy,CreatedDate,YearId) VALUES('".$_POST['DeptName']."', '".$_POST['DeptCode']."', '".$CompanyId."', 'A', '".$UserId."','".date('Y-m-d')."','".$YearId."')", $con); 
   if($SqlInseart){ $msg = "Data has been Inserted successfully..."; }
}
if(isset($_POST['ChangeDept']))
{
 $Sql2=mysql_query("Select * from hrm_department WHERE DepartmentId='".$_POST['DeptId']."' AND CompanyId=".$CompanyId, $con); $Result2 = mysql_fetch_assoc($Sql2); 
 $SqlInsert2 = mysql_query("INSERT INTO hrm_department_event(DepartmentId, DepartmentName, DepartmentCode, CompanyId, DeptStatus, CreatedBy,CreatedDate,YearId) VALUES('".$Result2['DepartmentId']."', '".$Result2['DepartmentName']."', '".$Result2['DepartmentCode']."', '".$Result2['CompanyId']."', '".$Result2['DeptStatus']."', ".$Result2['CreatedBy'].", '".$Result2['CreatedDate']."', ".$Result2['YearId'].")", $con); 
  if($SqlInsert2)
    {
	 $SqlUpdate = mysql_query("UPDATE hrm_department SET DepartmentName='".$_POST['DeptName']."', DepartmentCode='".$_POST['DeptCode']."' WHERE DepartmentId='".$_POST['DeptId']."'", $con); 
     if($SqlUpdate){ $msg = "Data has been Updeted successfully...";}
	}   
}
if(isset($_REQUEST['action']) && $_REQUEST['action']=="delete")
{
  $SqlDelete=mysql_query("UPDATE hrm_department SET DeptStatus='De' WHERE DepartmentId=".$_REQUEST['did'], $con) or die(mysql_error());
  if($SqlDelete) { $msg = "Data has been deleted successfully..."; }
}
?>