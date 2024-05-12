<?php 

if(isset($_POST['SaveEdit']))

{

 $Sql2=mysql_query("Select * from hrm_traveleligibility WHERE TravelEligibilityId='".$_POST['EditId']."' AND CompanyId=".$CompanyId, $con); $Result2 = mysql_fetch_assoc($Sql2); 

 $SqlInsert2 = mysql_query("INSERT INTO hrm_traveleligibility_event(TravelEligibilityId,GradeValue,TwoWheeler,TwoWheeler_Restric,TwoWheeler_Restric_Sales,TwoWheeler_Restric_OutSite,TwoWheeler_Restric_OutSite_Sales,FourWheeler,FourWheeler_Restric,FourWheeler_Restric_Sales,FourWheeler_Restric_OutSite,FourWheeler_Restric_OutSite_Sales,CompanyId,CreatedBy,CreatedDate,YearId)VALUES('".$Result2['TravelEligibilityId']."', '".$Result2['GradeValue']."', '".$Result2['TwoWheeler']."', '".$Result2['TwoWheeler_Restric']."', '".$Result2['TwoWheeler_Restric_Sales']."', '".$Result2['TwoWheeler_Restric_OutSite']."', '".$Result2['TwoWheeler_Restric_OutSite_Sales']."', '".$Result2['FourWheeler']."', '".$Result2['FourWheeler_Restric']."', '".$Result2['FourWheeler_Restric_Sales']."', '".$Result2['FourWheeler_Restric_OutSite']."', '".$Result2['FourWheeler_Restric_OutSite_Sales']."', '".$Result2['CompanyId']."', ".$Result2['CreatedBy'].", '".$Result2['CreatedDate']."', ".$Result2['YearId'].")", $con); 

  if($SqlInsert2)

    { 

	 $SqlUpdate = mysql_query("UPDATE hrm_traveleligibility SET TwoWheeler='".$_POST['TwoWheeler']."', TwoWheeler_Restric='".$_POST['TwoWheeler_Restric']."', TwoWheeler_Restric_Sales='".$_POST['TwoWheeler_Restric_Sales']."', TwoWheeler_Restric_OutSite='".$_POST['TwoWheeler_Restric_OutSite']."', TwoWheeler_Restric_OutSite_Sales='".$_POST['TwoWheeler_Restric_OutSite_Sales']."', FourWheeler='".$_POST['FourWheeler']."', FourWheeler_Restric='".$_POST['FourWheeler_Restric']."', FourWheeler_Restric_Sales='".$_POST['FourWheeler_Restric_Sales']."', FourWheeler_Restric_OutSite='".$_POST['FourWheeler_Restric_OutSite']."', FourWheeler_Restric_OutSite_Sales='".$_POST['FourWheeler_Restric_OutSite_Sales']."', CreatedBy=".$UserId.", CreatedDate='".date("Y-m-d")."', YearId=".$YearId." WHERE TravelEligibilityId=".$_POST['EditId'], $con) or die(mysql_error());

     if($SqlUpdate){ $msg = "Data has been Updeted successfully...";}

	}   

}

?>

