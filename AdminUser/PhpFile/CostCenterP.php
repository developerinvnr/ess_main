<?php 
if(isset($_POST['AddNewCostCenter']))
{ 
   $SqlInseart = mysql_query("INSERT INTO hrm_costcenter(CostCenterName,CompanyId,CostCenterStatus,CreatedBy,CreatedDate,YearId) VALUES('".$_POST['CostCenterName']."', '".$CompanyId."', 'A', '".$UserId."','".date('Y-m-d')."','".$YearId."')", $con); 
   if($SqlInseart){ $msg = "Data has been Inserted successfully..."; }
}
if(isset($_POST['ChangeCostCenter']))
{
 $Sql2=mysql_query("Select * from hrm_costcenter WHERE CostCenterId='".$_POST['CostCenterId']."' AND CompanyId=".$CompanyId); $Result2 = mysql_fetch_assoc($Sql2); 
 $SqlInsert2 = mysql_query("INSERT INTO hrm_costcenter_event(CostCenterId,CostCenterName,CompanyId,CostCenterStatus,CreatedBy,CreatedDate,YearId) VALUES('".$Result2['CostCenterId']."', '".$Result2['CostCenterName']."', '".$Result2['CompanyId']."', '".$Result2['CostCenterStatus']."', ".$Result2['CreatedBy'].", '".$Result2['CreatedDate']."', ".$Result2['YearId'].")", $con); 
  if($SqlInsert2)
    {
	 $SqlUpdate = mysql_query("UPDATE hrm_costcenter SET CostCenterName='".$_POST['CostCenterName']."' WHERE CostCenterId=".$_POST['CostCenterId'], $con) or die(mysql_error());
     if($SqlUpdate){ $msg = "Data has been Updeted successfully...";}
	}   
}
if(isset($_REQUEST['action']) && $_REQUEST['action']=="delete")
{
  $SqlDelete=mysql_query("UPDATE hrm_costcenter SET CostCenterStatus='De' WHERE CostCenterId=".$_REQUEST['did'], $con) or die(mysql_error());
  if($SqlDelete) { $msg = "Data has been deleted successfully..."; }
}
?>
