<?php 
if(isset($_POST['SaveNew']))
{ 
   $SqlInseart = mysql_query("INSERT INTO hrm_citycategory(CategoryA_City,CategoryB_City,CategoryC_City,CompanyId,CreatedBy,CreatedDate,YearId) VALUES('".$_POST['CategoryA']."', '".$_POST['CategoryB']."','".$_POST['CategoryC']."','".$CompanyId."', '".$UserId."','".date('Y-m-d')."','".$YearId."')", $con); 
   if($SqlInseart){ $msg = "Data has been Inserted successfully..."; }
}
if(isset($_POST['SaveEdit']))
{
 $Sql2=mysql_query("Select * from hrm_citycategory WHERE CityCategoryId='".$_POST['CityClassId']."' AND CompanyId=".$CompanyId, $con); $Result2 = mysql_fetch_assoc($Sql2); 
 $SqlInsert2 = mysql_query("INSERT INTO hrm_citycategory_event(CityCategoryId,CategoryA_City,CategoryB_City,CategoryC_City,CompanyId,CityCategoryStatus,CreatedBy,CreatedDate,YearId) VALUES('".$Result2['CityCategoryId']."', '".$Result2['CategoryA_City']."', '".$Result2['CategoryB_City']."', '".$Result2['CategoryC_City']."', '".$Result2['CompanyId']."', '".$Result2['CityCategoryStatus']."', ".$Result2['CreatedBy'].", '".$Result2['CreatedDate']."', ".$Result2['YearId'].")", $con); 
  if($SqlInsert2)
    {
	 $SqlUpdate = mysql_query("UPDATE hrm_citycategory SET CategoryA_City='".$_POST['CategoryA']."', CategoryB_City='".$_POST['CategoryB']."', CategoryC_City='".$_POST['CategoryC']."', CreatedBy=".$UserId.", CreatedDate='".date("Y-m-d")."', YearId=".$YearId." WHERE CityCategoryId=".$_POST['CityClassId'], $con) or die(mysql_error());
     if($SqlUpdate){ $msg = "Data has been Updeted successfully...";}
	}   
}
if(isset($_REQUEST['action']) && $_REQUEST['action']=="delete")
{
  $SqlDelete=mysql_query("UPDATE hrm_citycategory SET CityCategoryStatus='De' WHERE CityCategoryId=".$_REQUEST['did'], $con) or die(mysql_error());
  if($SqlDelete) { $msg = "Data has been deleted successfully..."; }
}
?>
