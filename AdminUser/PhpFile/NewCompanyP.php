<?php 
if(isset($_POST['SaveNew']))
{
 $SqlSelectMaxComID = mysql_query("SELECT Max(CompanyId) AS MaxCompanyID FROM hrm_company_basic", $con); $ResSelectMaxComID=mysql_fetch_assoc($SqlSelectMaxComID);
 $NewComId=$ResSelectMaxComID['MaxCompanyID']+1;
 $SqlNewInseartCompany = mysql_query("INSERT INTO hrm_company_basic(CompanyId,CompanyName,NoOfEmp,PhoneNo1,PhoneNo2,FaxNo,WebSite,EmailId1,EmailId2,CountryId,StateId,CityId,PinNo,AdminOffice,AdminOffice_Address,RegisOffice,RegisOffice_Address,Comment,CreatedBy,CreatedDate,YearId) VALUES(".$NewComId.",'".$_POST['ComName']."',".$_POST['ComNoOfEmp'].",".$_POST['ComPhone1'].",".$_POST['ComPhone2'].",".$_POST['ComFaxNo'].",'".$_POST['ComWebsite']."','".$_POST['ComEmail1']."','".$_POST['ComEmail2']."','".$_POST['ComCountry']."','".$_POST['ComState']."','".$_POST['ComCity']."',".$_POST['ComPinNo'].",'".$_POST['Addoffice']."','".$_POST['Addoffice_Add']."','".$_POST['Regoffice']."','".$_POST['Regoffice_Add']."','".$_POST['ComComment']."',".$UserId.",'".date("Y-m-d")."',".$YearId.")", $con) or die(mysql_error()); 
 if($SqlNewInseartCompany)  { $msg = "Data has been Insearted successfully...";}
}

if(isset($_POST['SaveNewComUser']))
{ if($_POST['Fname']=="" OR $_POST['Lname']=="" OR $_POST['Uname']=="" OR $_POST['Upass1']=="" OR $_POST['Upass2']=="")
  { echo '<script> alert("please input in text field");</script>';}
  elseif($_POST['Upass1']!==$_POST['Upass2']) 
  { $msg = "<script>alert('The new password and confirm new password fields must be the same, Try Again')</script>"; } 
  elseif($_POST['Upass1']==$_POST['Upass2']) 
  {  $CHpass=encrypt($_POST['Upass1']); $SqlInseart = mysql_query("INSERT INTO hrm_user(CompanyId,User_FirstName,User_SecondName,User_LastName,User_name,User_pass,User_type,User_status,Comment,CreatedBy,CreatedDate,YearId) VALUES('".$_POST['ComId']."','".$_POST['Fname']."','".$_POST['Sname']."','".$_POST['Lname']."','".$_POST['Uname']."','".$CHpass."','".$_POST['Utype']."','".$_POST['Ustatus']."','".$_POST['Comment']."',".$UserId.",'".date("Y-m-d")."',".$YearId.")", $con) or die(mysql_error()); 
    if($SqlInseart)  
	{  
	  $SqlSelectMaxUserID = mysql_query("SELECT Max(AXAUESRUser_Id) AS MaxID FROM hrm_user", $con); $ResSelectMaxUserID=mysql_fetch_assoc($SqlSelectMaxUserID);
      if($SqlSelectMaxUserID)
	   {
	    if($_POST['Utype']=='S')
		 {$SqlNewInseartMenu = mysql_query("INSERT INTO hrm_user_menu(AXAUESRUser_Id,master,processing,report,utility,pms,recruitment,separation,tds) VALUES(".$ResSelectMaxUserID['MaxID'].",1,1,1,1,1,1,1,1)", $con) or die(mysql_error());}
		  else
		  {$SqlNewInseartMenu = mysql_query("INSERT INTO hrm_user_menu(AXAUESRUser_Id) VALUES(".$ResSelectMaxUserID['MaxID'].")", $con) or die(mysql_error());}
		  if($SqlNewInseartMenu)
	      {
		   $SqlNewInseartSubMenu = mysql_query("INSERT INTO hrm_user_submenu(AXAUESRUser_Id) VALUES('".$ResSelectMaxUserID['MaxID']."')", $con) or die(mysql_error());
		   if($SqlNewInseartSubMenu) {echo '<script> alert("successfully creation of new company User data");</script>';}
		  }
	   }	
	}
  }
}

if(isset($_REQUEST['action']) && $_REQUEST['action']=="delete")
{
$SqlDelete=mysql_query("UPDATE hrm_company_basic SET Status='De' WHERE CompanyId=".$_REQUEST['did'], $con) or die(mysql_error());
  if($SqlDelete) { $msg = "Data has been deleted successfully..."; }
}
?>