<?php 
if(isset($_POST['AddNewHQ']))
{ 
   $SqlInseart = mysql_query("INSERT INTO hrm_headquater(HqName, StateId, CompanyId, HQStatus, CreatedBy,CreatedDate,YearId) VALUES('".$_POST['HQName']."', '".$_POST['HQState']."', '".$CompanyId."', 'A', '".$UserId."','".date('Y-m-d')."','".$YearId."')", $con); 
   if($SqlInseart){ $msg = "Data has been Inserted successfully..."; }
}
if(isset($_POST['ChangeHQ']))
{
 $Sql2=mysql_query("Select * from hrm_headquater WHERE HqId='".$_POST['HQId']."' AND CompanyId=".$CompanyId, $con); $Result2 = mysql_fetch_assoc($Sql2); 
 $SqlInsert2 = mysql_query("INSERT INTO hrm_headquater_event(HqId, HqName, StateId, CompanyId, HQStatus, CreatedBy,CreatedDate,YearId) VALUES('".$Result2['HqId']."', '".$Result2['HqName']."', '".$Result2['StateId']."', '".$Result2['CompanyId']."', '".$Result2['HQStatus']."', ".$Result2['CreatedBy'].", '".$Result2['CreatedDate']."', ".$Result2['YearId'].")", $con); 
  if($SqlInsert2)
    {
	 $SqlUpdate = mysql_query("UPDATE hrm_headquater SET HqName='".$_POST['HQName']."', StateId='".$_POST['HQState']."', CreatedBy=".$UserId.", CreatedDate='".date("Y-m-d")."', YearId='".$YearId."' WHERE HqId='".$_POST['HQId']."'", $con); 
     if($SqlUpdate){ $msg = "Data has been Updeted successfully...";}
	}   
}
if(isset($_REQUEST['action']) && $_REQUEST['action']=="delete")
{
  $SqlDelete=mysql_query("UPDATE hrm_headquater SET HQStatus='De' WHERE HqId=".$_REQUEST['did'], $con) or die(mysql_error());
  if($SqlDelete) { $msg = "Data has been deleted successfully..."; }
}
?>
