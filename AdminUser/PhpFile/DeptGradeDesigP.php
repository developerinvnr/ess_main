<?php 
if(isset($_POST['AddNewDeptGradeDesig']))
{ 
   $SqlInseart = mysql_query("INSERT INTO hrm_deptgradedesig(DepartmentId,DesigId,CompanyId,DGDStatus,CreatedBy,CreatedDate,YearId) VALUES( '".$_POST['DeptID']."', '".$_POST['DesigName']."', '".$CompanyId."', 'A', '".$UserId."','".date('Y-m-d')."','".$YearId."')", $con); 
   if($SqlInseart){ $msg = "Data has been Inserted successfully..."; }
}
if(isset($_POST['ChangeDeptGradeDesig']))
{
 $Sql2=mysql_query("Select * from hrm_deptgradedesig WHERE DeptGradeDesigId='".$_POST['DeptGradeDesigId']."' AND CompanyId=".$CompanyId, $con); $Result2 = mysql_fetch_assoc($Sql2); 
 $SqlInsert2 = mysql_query("INSERT INTO hrm_deptgradedesig_event(DeptGradeDesigId,DepartmentId,DesigId,CompanyId,DGDStatus,CreatedBy,CreatedDate,YearId) VALUES('".$Result2['DeptGradeDesigId']."', '".$Result2['DepartmentId']."', '".$Result2['DesigId']."', '".$Result2['CompanyId']."', '".$Result2['DGDStatus']."', ".$Result2['CreatedBy'].", '".$Result2['CreatedDate']."', ".$Result2['YearId'].")", $con); 
  if($SqlInsert2)
    {
	 $SqlUpdate = mysql_query("UPDATE hrm_deptgradedesig SET DesigId='".$_POST['DesigName1']."' WHERE DeptGradeDesigId='".$_POST['DeptGradeDesigId']."'", $con); 
     if($SqlUpdate){ $msg = "Data has been Updeted successfully...";}
	}   
}
if(isset($_REQUEST['action']) && $_REQUEST['action']=="delete")
{
  $SqlDelete=mysql_query("UPDATE hrm_deptgradedesig SET DGDStatus='De' WHERE DeptGradeDesigId=".$_REQUEST['did'], $con) or die(mysql_error());
  if($SqlDelete) { $msg = "Data has been deleted successfully..."; }
}
?>


