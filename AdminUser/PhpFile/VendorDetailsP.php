<?php 
if(isset($_POST['AddNewVtype']))
{ $SqlInsertType = mysql_query("INSERT INTO hrm_vendortype(VendorsTypeName,CompanyId,CreatedBy,CreatedDate,YearId) VALUES('".$_POST['VTypeName']."', '".$CompanyId."','".$UserId."','".date('Y-m-d')."','".$YearId."')"); 
   if($SqlInsertType){ $msg = "Data has been inserted successfully...";}
}
if(isset($_POST['ChangeVtype']))
{ 
   $SqlUpdateType = mysql_query("UPDATE hrm_vendortype SET VendorsTypeName='".$_POST['VTypeName']."', CreatedBy='".$UserId."', CreatedDate='".date('Y-m-d')."' WHERE VendorTypeId='".$_POST['VTypeNameId']."'", $con) or die(mysql_error());
   if($SqlUpdateType){ $msg = "Data has been updated successfully...";}
}
if($_REQUEST['action']=='deleteType' && $_REQUEST['didType'])
{
 $SqlDeleteType = mysql_query("UPDATE hrm_vendortype SET VendorsTypeStatus='De', CreatedBy='".$UserId."', CreatedDate='".date('Y-m-d')."' WHERE VendorTypeId='".$_REQUEST['didType']."'", $con) or die(mysql_error());
 if($SqlDeleteType){ $msg = "Data has been deleted successfully..."; }
}

if(isset($_POST['AddNewVname']))
{ $SqlInsertName = mysql_query("INSERT INTO hrm_vendorname(VendorTypeId,VendorsName,CreatedBy,CreatedDate,YearId) VALUES('".$_POST['VTypeSelect2']."','".$_POST['VNameS']."','".$UserId."','".date('Y-m-d')."','".$YearId."')", $con); 
   if($SqlInsertName){ $msg = "Data has been inserted successfully...";}
}
if(isset($_POST['ChangeVname']))
{ 
  $SqlUpdateName = mysql_query("UPDATE hrm_vendorname SET VendorsName='".$_POST['VNameS']."', CreatedBy='".$UserId."', CreatedDate='".date('Y-m-d')."' WHERE VendorNameId='".$_POST['VNameSId']."'", $con) or die(mysql_error());
  if($SqlUpdateName){ $msg = "Data has been updated successfully...";}
}
if($_REQUEST['action']=='deleteName' && $_REQUEST['didName'])
{
 $SqlDeleteName = mysql_query("UPDATE hrm_vendorname SET VendorsNameStatus='De', CreatedBy='".$UserId."', CreatedDate='".date('Y-m-d')."' WHERE VendorNameId='".$_REQUEST['didName']."'", $con) or die(mysql_error());
 if($SqlDeleteName){ $msg = "Data has been deleted successfully..."; }
}

if(isset($_POST['UpdateVdetails']))
{ 
if($_POST['VendorDetailId']==0)
{ 
$SqlInsDetails=mysql_query("INSERT INTO hrm_vendordetail(VendorNameId,VCompanyName,VPolicyNo,VPolicyName,VPolicyDate,VVaildFrom,VVaildTo,CityId,VAddress,VPersonName1,VPersonNo1,VPersonDesig1,VPersonName2,VPersonNo2,VPersonDesig2,VPersonName3,VPersonNo3,VPersonDesig3,CompanyId,VCreatedBy,VCreatedDate,VYearId)VALUES('".$_POST['VendorNameId']."','".$_POST['VCompanyName']."','".$_POST['VPolicyNo']."','".$_POST['VPolicyName']."','".$_POST['']."','".$_POST['VValidfrom']."','".$_POST['VValidto']."','".$_POST['VCity']."','".$_POST['VAddrress']."','".$_POST['Contact1_Name']."','".$_POST['Contact1_No']."','".$_POST['Contact1_Desig']."','".$_POST['Contact2_Name']."','".$_POST['Contact2_No']."','".$_POST['Contact2_Desig']."','".$_POST['Contact3_Name']."','".$_POST['Contact3_No']."','".$_POST['Contact3_Desig']."','".$CompanyId."','".$UserId."','".date('Y-m-d')."','".$YearId."')", $con);
 if($SqlInsDetails){ $msg = "Data has been updated successfully...";}
}
else
{
 $SqlUpdateName = mysql_query("UPDATE hrm_vendordetail SET VCompanyName='".$_POST['VCompanyName']."', VPolicyNo='".$_POST['VPolicyNo']."', VPolicyName='".$_POST['VPolicyName']."', VPolicyDate='".$_POST['VPolicyDate']."', VVaildFrom='".$_POST['VValidfrom']."', VVaildTo='".$_POST['VValidto']."', CityId='".$_POST['VCity']."', VAddress='".$_POST['VAddrress']."', VPersonName1='".$_POST['Contact1_Name']."', VPersonNo1=".$_POST['Contact1_No'].", VPersonDesig1='".$_POST['Contact1_Desig']."', VPersonName2='".$_POST['Contact2_Name']."', VPersonNo2=".$_POST['Contact2_No'].", VPersonDesig2='".$_POST['Contact2_Desig']."', VPersonName3='".$_POST['Contact3_Name']."', VPersonNo3=".$_POST['Contact3_No'].", VPersonDesig3='".$_POST['Contact3_Desig']."', CompanyId=".$CompanyId.", VCreatedBy=".$UserId.", VCreatedDate='".date('Y-m-d')."',VYearId=".$YearId." WHERE VendorDetailId=".$_POST['VendorDetailId']."", $con) or die(mysql_error());
 if($SqlUpdateName){ $msg = "Data has been updated successfully...";}
}
  
}
?>