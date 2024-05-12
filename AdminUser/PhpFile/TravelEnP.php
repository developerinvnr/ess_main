<?php 
if(isset($_POST['SaveEdit']))
{
 $Sql2=mysql_query("Select * from hrm_travelentitle WHERE TravelEntitleId='".$_POST['EditId']."' AND CompanyId=".$CompanyId, $con); $Result2 = mysql_fetch_assoc($Sql2); 
 $SqlInsert2 = mysql_query("INSERT INTO hrm_travelentitle_event(TravelEntitleId,GradeValue,ModeTravel_Flight,TravelClass_Flight,ModeTravel_Train,TravelClass_Train,ModeTravel_Any,CompanyId,CreatedBy,CreatedDate,YearId)VALUES('".$Result2['TravelEntitleId']."', '".$Result2['GradeValue']."', '".$Result2['ModeTravel_Flight']."', '".$Result2['TravelClass_Flight']."', '".$Result2['ModeTravel_Train']."', '".$Result2['TravelClass_Train']."',  '".$Result2['ModeTravel_Any']."', '".$Result2['CompanyId']."', ".$Result2['CreatedBy'].", '".$Result2['CreatedDate']."', ".$Result2['YearId'].")", $con); 
  if($SqlInsert2)
    {
	 $SqlUpdate = mysql_query("UPDATE hrm_travelentitle SET ModeTravel_Flight='".$_POST['ModeTravel_Flight']."', TravelClass_Flight='".$_POST['TravelClass_Flight']."', ModeTravel_Train='".$_POST['ModeTravel_Train']."', TravelClass_Train='".$_POST['TravelClass_Train']."', ModeTravel_Any='".$_POST['ModeTravel_Any']."', CreatedBy=".$UserId.", CreatedDate='".date("Y-m-d")."', YearId=".$YearId." WHERE TravelEntitleId=".$_POST['EditId'], $con) or die(mysql_error());
     if($SqlUpdate){ $msg = "Data has been Updeted successfully...";}
	}   
}
?>
