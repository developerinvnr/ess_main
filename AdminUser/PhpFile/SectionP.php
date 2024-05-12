<?php 
if(isset($_POST['AddNewSection']))
{ 
   $SqlInseart = mysql_query("INSERT INTO hrm_section(SectionName,CompanyId,SectionStatus,CreatedBy,CreatedDate,YearId) VALUES('".$_POST['SectionName']."', '".$CompanyId."', 'A', '".$UserId."','".date('Y-m-d')."','".$YearId."')", $con); 
   if($SqlInseart){ $msg = "Data has been Inserted successfully..."; }
}
if(isset($_POST['ChangeSection']))
{
 	 $SqlUpdate = mysql_query("UPDATE hrm_section SET SectionName='".$_POST['SectionName']."' WHERE SectionId=".$_POST['SectionId'], $con) or die(mysql_error()); 
     if($SqlUpdate){ $msg = "Data has been Updeted successfully...";}
}
if(isset($_REQUEST['action']) && $_REQUEST['action']=="delete")
{ 
  $SqlDelete=mysql_query("UPDATE hrm_section SET SectionStatus='De' WHERE SectionId=".$_REQUEST['did'], $con) or die(mysql_error());
  if($SqlDelete) { $msg = "Data has been deleted successfully..."; }
}
?>
