<?php 
if(isset($_POST['AddNewDesig']))
{ 
   $SqlInseart = mysql_query("INSERT INTO hrm_designation(DesigName,DesigCode,Desig_ShortCode,CompanyId,DesigStatus,CreatedBy,CreatedDate,YearId) VALUES('".$_POST['DesigName']."', '".$_POST['DesigCode']."', '".$_POST['Desig_ShortCode']."', '".$CompanyId."', '".$_POST['Desig_Sts']."', '".$UserId."','".date('Y-m-d')."','".$YearId."')", $con); 
   if($SqlInseart){ $msg = "Data has been Inserted successfully..."; }
}
if(isset($_POST['ChangeDesig']))
{
 $Sql2=mysql_query("Select * from hrm_designation WHERE DesigId='".$_POST['DesigId']."' AND CompanyId=".$CompanyId, $con); $Result2 = mysql_fetch_assoc($Sql2); 
 $SqlInsert2 = mysql_query("INSERT INTO hrm_designation_event(DesigId,DesigName,DesigCode,CompanyId,DesigStatus,CreatedBy,CreatedDate,YearId) VALUES('".$Result2['DesigId']."', '".$Result2['DesigName']."', '".$Result2['DesigCode']."', '".$Result2['CompanyId']."', '".$Result2['DesigStatus']."', ".$Result2['CreatedBy'].", '".$Result2['CreatedDate']."', ".$Result2['YearId'].")", $con); 
  if($SqlInsert2)
    {
	 $SqlUpdate = mysql_query("UPDATE hrm_designation SET DesigName='".$_POST['DesigName']."', DesigCode='".$_POST['DesigCode']."', DesigStatus='".$_POST['Desig_Sts']."', Desig_ShortCode='".$_POST['Desig_ShortCode']."' WHERE DesigId='".$_POST['DesigId']."'", $con); 
     if($SqlUpdate){ $msg = "Data has been Updeted successfully...";}
	}   
}
if(isset($_REQUEST['action']) && $_REQUEST['action']=="delete")
{
  $SqlDelete=mysql_query("UPDATE hrm_designation SET DesigStatus='De' WHERE DesigId=".$_REQUEST['did'], $con) or die(mysql_error());
  if($SqlDelete) { $msg = "Data has been deleted successfully..."; }
}
?>
