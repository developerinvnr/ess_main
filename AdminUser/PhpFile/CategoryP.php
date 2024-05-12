<?php 
if(isset($_POST['AddNewCategory']))
{ 
   $SqlInseart = mysql_query("INSERT INTO hrm_category(CategoryName,CompanyId,CategoryStatus,CreatedBy,CreatedDate,YearId) VALUES('".$_POST['CategoryName']."', '".$CompanyId."', 'A', '".$UserId."','".date('Y-m-d')."','".$YearId."')", $con); 
   if($SqlInseart){ $msg = "Data has been Inserted successfully..."; }
}
if(isset($_POST['ChangeCategory']))
{
 	 $SqlUpdate = mysql_query("UPDATE hrm_category SET CategoryName='".$_POST['CategoryName']."' WHERE CategoryId=".$_POST['CategoryId'], $con) or die(mysql_error()); 
     if($SqlUpdate){ $msg = "Data has been Updeted successfully...";}
}
if(isset($_REQUEST['action']) && $_REQUEST['action']=="delete")
{ 
  $SqlDelete=mysql_query("UPDATE hrm_category SET CategoryStatus='De' WHERE CategoryId=".$_REQUEST['did'], $con) or die(mysql_error());
  if($SqlDelete) { $msg = "Data has been deleted successfully..."; }
}
?>
