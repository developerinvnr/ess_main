<?php 
if(isset($_POST['SaveChange']))
{ 
$Sql=mysql_query("Select * from hrm_company_basic WHERE BasicId=".$_POST['ComBasicId']." AND CompanyId=".$_POST['ComId'], $con); $Result = mysql_fetch_assoc($Sql);
  if($Sql)
   {
    $SqlInseart = mysql_query("INSERT INTO hrm_company_basic_event(BasicId,CompanyId,CompanyName,NoOfEmp,TaxId,PhoneNo1,PhoneNo2,FaxNo,WebSite,EmailId1,EmailId2,CountryId,StateId,CityId,PinNo,AdminOffice,AdminOffice_Address,RegisOffice,RegisOffice_Address,Comment,Status,CreatedBy,CreatedDate,YearId) VALUES(".$Result['BasicId'].",".$Result['CompanyId'].",'".$Result['CompanyName']."',".$Result['NoOfEmp'].",".$Result['TaxId'].",".$Result['PhoneNo1'].",".$Result['PhoneNo2'].",".$Result['FaxNo'].",'".$Result['WebSite']."','".$Result['EmailId1']."','".$Result['EmailId2']."',".$Result['CountryId'].",".$Result['StateId'].",".$Result['CityId'].",".$Result['PinNo'].",'".$Result['AdminOffice']."','".$Result['AdminOffice_Address']."','".$Result['RegisOffice']."','".$Result['RegisOffice_Address']."','".$Result['Comment']."','".$Result['Status']."',".$Result['CreatedBy'].",'".$Result['CreatedDate']."',".$Result['YearId'].")", $con) or die(mysql_error()); 
	
	 if($SqlInseart)
	 {
	   $SqlUpdate = mysql_query("UPDATE hrm_company_basic SET CompanyName='".$_POST['ComName']."',NoOfEmp=".$_POST['ComNoOfEmp'].",PhoneNo1=".$_POST['ComPhone1'].",PhoneNo2=".$_POST['ComPhone2'].",FaxNo=".$_POST['ComFaxNo'].",WebSite='".$_POST['ComWebsite']."',EmailId1='".$_POST['ComEmail1']."',EmailId2='".$_POST['ComEmail2']."',CountryId=".$_POST['ComCountry'].",StateId=".$_POST['ComState'].",CityId=".$_POST['ComCity'].",PinNo=".$_POST['ComPinNo'].",AdminOffice='".$_POST['Addoffice']."',AdminOffice_Address='".$_POST['Addoffice_Add']."',RegisOffice='".$_POST['Regoffice']."',RegisOffice_Address='".$_POST['Regoffice_Add']."',Comment='".$_POST['ComComment']."' WHERE BasicId=".$_POST['ComBasicId']." AND CompanyId=".$_POST['ComId'], $con) or die(mysql_error());
	    if($SqlUpdate){ $msg = "Data has been updated successfully..."; }
	 }
   }
}
?>
