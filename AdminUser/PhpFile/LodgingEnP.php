<?php 
if(isset($_POST['SaveEdit']))
{
 $Sql2=mysql_query("Select * from hrm_lodentitle WHERE LodEntitleId='".$_POST['EditId']."' AND CompanyId=".$CompanyId, $con); $Result2 = mysql_fetch_assoc($Sql2); 
 $SqlInsert2 = mysql_query("INSERT INTO hrm_lodentitle_event(LodEntitleId,GradeValue,CategoryA_City,CategoryB_City,CategoryC_City,CompanyId,CreatedBy,CreatedDate,YearId)VALUES('".$Result2['LodEntitleId']."', '".$Result2['GradeValue']."', '".$Result2['CategoryA_City']."', '".$Result2['CategoryB_City']."', '".$Result2['CategoryC_City']."', '".$Result2['CompanyId']."', ".$Result2['CreatedBy'].", '".$Result2['CreatedDate']."', ".$Result2['YearId'].")", $con); 
  if($SqlInsert2)
    {
	 $SqlUpdate = mysql_query("UPDATE hrm_lodentitle SET CategoryA_City='".$_POST['CategoryA']."', CategoryB_City='".$_POST['CategoryB']."', CategoryC_City='".$_POST['CategoryC']."', CreatedBy=".$UserId.", CreatedDate='".date("Y-m-d")."', YearId=".$YearId." WHERE LodEntitleId=".$_POST['EditId'], $con) or die(mysql_error());
     if($SqlUpdate){ $msg = "Data has been Updeted successfully...";}
	}   
}
?>
