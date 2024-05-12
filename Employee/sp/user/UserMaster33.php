<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');}
include("../function.php");
include('codeEncDec.php');
if(check_user()==false){header('Location:../../../index.php');}
if($_SESSION['login'] = true){require_once('UserMenuSession.php');}

if(isset($_POST['SaveUser']))  
{                         					
 $SqlUpdate = mysql_query("UPDATE hrm_sales_useremp SET UserEmpId=".$_POST['username'].", Status='".$_POST['status']."', UserEmpType='".$_POST['type']."', UEAdd='".$_POST['eadd']."', UEEdit='".$_POST['eedit']."', UEView='".$_POST['eview']."', Master='".$_POST['Master']."', CMaster='".$_POST['CMaster']."', SMaster='".$_POST['SMaster']."', PMaster='".$_POST['PMaster']."', UMaster='".$_POST['UMaster']."', Import='".$_POST['Import']."', Logistic='".$_POST['Logistic']."', LogAchi='".$_POST['LogAchi']."', LogTest='".$_POST['LogTest']."', FwdNote='".$_POST['FwdNote']."', FwdEdit='".$_POST['FwdEdit']."', FaEdit='".$_POST['FaEdit']."', FaApproval='".$_POST['FaApproval']."', FaReports='".$_POST['FaReports']."', Production='".$_POST['Production']."', ProdStock='".$_POST['ProdStock']."', Reports='".$_POST['Reports']."', ProdRep='".$_POST['ProdRep']."', SalesRep='".$_POST['SalesRep']."' WHERE SUserEmpId=".$_POST['sid'], $con);
if($SqlUpdate){ $msg = "Data has been updated successfully..."; } 
}

if(isset($_POST['NewSaveUser']))
{
 $SqlNewInseartUser = mysql_query("INSERT INTO hrm_sales_useremp(UserEmpId, Status, UserEmpType, UEAdd, UEEdit, UEView, Master, CMaster, SMaster, PMaster, UMaster, Import, Logistic, LogAchi, LogTest, FwdNote, FwdEdit, FaEdit, FaApproval, FaReports, Production, ProdStock, Reports, ProdRep, SalesRep, CDate) VALUES(".$_POST['username'].", '".$_POST['status']."', '".$_POST['type']."', '".$_POST['eadd']."', '".$_POST['eedit']."', '".$_POST['eview']."', '".$_POST['Master']."', '".$_POST['CMaster']."', '".$_POST['SMaster']."', '".$_POST['PMaster']."', '".$_POST['UMaster']."', '".$_POST['Import']."', '".$_POST['Logistic']."', '".$_POST['LogAchi']."', '".$_POST['LogTest']."', '".$_POST['FwdNote']."', '".$_POST['FwdEdit']."', '".$_POST['FaEdit']."', '".$_POST['FaApproval']."', '".$_POST['FaReports']."', '".$_POST['Production']."', '".$_POST['ProdStock']."', '".$_POST['Reports']."', '".$_POST['ProdRep']."', '".$_POST['SalesRep']."', '".date("Y-m-d")."')", $con);
}

if(isset($_REQUEST['action']) && $_REQUEST['action']=="delete")
{
$SqlDelete=mysql_query("UPDATE hrm_sales_useremp SET Status='De' WHERE SUserEmpId=".$_REQUEST['did'], $con) or die(mysql_error());
if($SqlDelete) { $msg = "Data has been deleted successfully..."; }
}

?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet"/>
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style> .font { color:#ffffff; font-family:Georgia; font-size:12px;} .font1 { font-family:Georgia; font-size:12px; }
.font2 { color:#ffffff; font-family:Georgia; font-size:12px;}.font4 { color:#00D700; font-family:Georgia; font-size:15px;}
.font5 { color:#400000; font-family:Georgia; font-size:12px;}
.EditInput { font-family:Georgia; font-size:12px;height:18px;} .EditSelect { font-family:Georgia; font-size:12px; width:89px; height:18px;}
.SaveButton {background-image:url(images/save.gif); width:20px; height:20px; background-repeat:no-repeat; background-color:#FFFFFF; border-color:#FFFFFF; border-bottom:inherit; border-right:inherit;}
</style>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/MasterAUValid.js" ></script>
<Script type="text/javascript">window.history.forward(1);
function edit(value) { var agree=confirm("Are you sure you want to edit this record?");
if (agree) { var x = "UserMaster.php?action=edit&eid="+value;  window.location=x;}}
function del(value) { var agree=confirm("Are you sure you want to delete this record?");
if (agree) { var x = "UserMaster.php?action=delete&did="+value;  window.location=x;}}
function newsave() { var x = "UserMaster.php?action=newsave";  window.location=x;}

function validate(form)
{ //var currpass = form.currpass.value;  var filter=/^[0-9a-zA-Z%@$#]+$/;  var test_bool = filter.test(currpass);
var pass1 = form.pass1.value;  var filter1=/^[0-9a-zA-Z%@$#]+$/;  var test_bool1 = filter1.test(pass1);  var pass2 = form.pass2.value;  var filter2=/^[0-9a-z]+$/;
var test_bool2 = filter1.test(pass2);
  
   //if (currpass.length === 0) { alert("You must enter a Current Password.");  return false; }
if (pass1.length === 0){ alert("Please Enter a new password  ");  return false; }	
if(test_bool1==false)  { alert('Please Enter Only numeric and Alphabets in the new password Field'); return false; }	
}
</SCRIPT>     
</head>
<body class="body">
<table class="table">
<tr>
 <td>
  <table class="menutable"><tr><td><?php if($_SESSION['login'] = true){ require_once("EMenu.php"); } ?></td></tr></table>
 </td>
</tr>
<tr>
 <td>
  <table width="100%" style="margin-top:0px;" border="0">
    <tr>
	  <td valign="top"><?php if($_SESSION['login'] = true){ require_once("EWelcome.php"); } ?></td>
	</tr>
	 <tr>
	  <td valign="top" align="center"  width="100%" id="MainWindow"><br>
<?php //******************************************************************************?>
<?php //*******************START*****START*****START******START******START************************?>
<?php //******************************************************************************?>  
<table border="0" style="margin-top:0px;height:400px;">
	<tr>
		<?php //--------------------Update ---------------------------------------------------- ?>
		<?php if(($UserType=='S' OR $UserType=='A') AND $_SESSION['login'] = true) { ?>
		<td align="center" valign="top">
		   <table border="0" style="width:1570px;">
		     <tr><td align="left" class="heading">Master User<font class="font4"><b>&nbsp;&nbsp;<?php echo $msg; ?></b></font></td></tr>
			 <tr>
			   <td> 
			    <table border="1" bgcolor="#FFFFFF" style="width:1570px;">
				  <tr bgcolor="#808000"> 
				    <td rowspan="2" align="center" class="font" style="width:30px;"><b>&nbsp;SN&nbsp;</b></td>
					<td rowspan="2" align="center" class="font" style="width:150px;"><b>User Name</b></td>
					<td rowspan="2" align="center" class="font" style="width:50px;"><b>Status</b></td>
					<td rowspan="2" align="center" class="font" style="width:50px;"><b>Type</b></td>
					<td colspan="22" align="center" class="font"><b>Permission to Access</b></td>
					<td rowspan="2" align="center" class="font" style="width:100px;"><b>Action</b></td>
 			     </tr>
				 <tr bgcolor="#808000"> 
					<td align="center" class="font" style="width:45px;"><b>Master</b></td> 
					<td align="center" class="font" style="width:45px;"><b>Crop Master</b></td>
					<td align="center" class="font" style="width:45px;"><b>Sales Master</b></td>
					<td align="center" class="font" style="width:45px;"><b>Prod<sup>n</sup> Master</b></td>
					<td align="center" class="font" style="width:45px;"><b>User Master</b></td>
					<td align="center" class="font" style="width:45px;"><b>Import</b></td>
					<td align="center" class="font" style="width:45px;"><b>Logistic</b></td>
					<td align="center" class="font" style="width:45px;"><b>Log<sup>t</sup> Achi</b></td>
					<td align="center" class="font" style="width:45px;"><b>Log<sup>t</sup> Test</b></td>
                    <td align="center" class="font" style="width:45px;"><b>Fwd Note</b></td>
                    <td align="center" class="font" style="width:45px;"><b>Fwd Edit</b></td>
					<td align="center" class="font" style="width:45px;"><b>Prod<sup>t</sup></b></td>
					<td align="center" class="font" style="width:45px;"><b>Prod<sup>n</sup> Stock</b></b></td>
					<td align="center" class="font" style="width:45px;"><b>Reports</b></td>
					<td align="center" class="font" style="width:45px;"><b>Prod<sup>n</sup> Reports</b></td>
					<td align="center" class="font" style="width:45px;"><b>Sales Reports</b></td>
					<td align="center" class="font" style="width:45px;"><b>FA Edit</b></td>
					<td align="center" class="font" style="width:45px;"><b>FA Approv</b></td>
					<td align="center" class="font" style="width:45px;"><b>FA Reports</b></td>
					<td align="center" class="font" style="width:45px;"><b>Add</b></td>
					<td align="center" class="font" style="width:45px;"><b>Edit</b></td>
					<td align="center" class="font" style="width:45px;"><b>View</b></td>
 			     </tr>
<?php $SqlUser=mysql_query("Select * from hrm_sales_useremp where UserEmpType!='S' AND Status!='De'", $con); $Sno=1; while($ResultUser=mysql_fetch_array($SqlUser)) {
 if(isset($_REQUEST['action']) && $_REQUEST['action']=="edit" && $_REQUEST['eid']==$ResultUser['SUserEmpId']){ ?>  
				  <tr> 
<form name="formUserEdit" method="post" onSubmit="return validateEdit(this)">
					<td align="center" class="font1"><?php echo $Sno; ?></td>
					<td style="color:#ffffff; font-family:Georgia;font-size:11px;">
<?php $sqlUn=mysql_query("select Fname,Sname,Lname from hrm_employee where EmployeeID=".$ResultUser['UserEmpId'], $con); $resUn=mysql_fetch_assoc($sqlUn); ?>					
					<select class="EditInput" name="username" id="username" style="width:148px;">
					<option value="<?php echo $ResultUser['UserEmpId'];?>"><?php echo $resUn['Fname'].' '.$resUn['Sname'].' '.$resUn['Lname'];?></option>
<?php /* $sqlUn2=mysql_query("select hrm_employee.EmployeeID,Fname,Sname,Lname from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND (hrm_employee_general.DepartmentId=7 OR hrm_employee_general.DepartmentId=17 OR hrm_employee_general.DepartmentId=12 OR hrm_employee.EmployeeID=331) order by Fname ASC", $con); while($resUn2=mysql_fetch_assoc($sqlUn2)){ ?>					
					<option value="<?php echo $resUn2['EmployeeID']; ?>"><?php echo $resUn2['Fname'].' '.$resUn2['Sname'].' '.$resUn2['Lname'];?></option><?php } */ ?></select></td>
					<td align="center" class="font1"><select class="EditInput" name="status" id="status" style="width:50px;">
                    <?php if($ResultUser['Status']=='A'){ ?><option value="A" selected>&nbsp;Active</option><option value="D">&nbsp;Block</option><?php } ?>
                    <?php if($ResultUser['Status']=='D'){ ?><option value="D" selected>&nbsp;Block</option><option value="A">&nbsp;Active</option><?php } ?></select></td>
					<td align="center" class="font1"><select class="EditInput" name="type" id="type" style="width:50px;">
                    <?php if($ResultUser['UserEmpType']=='A'){ ?><option value="A" selected>&nbsp;Admin</option><option value="U">&nbsp;User</option><?php } ?>
                    <?php if($ResultUser['UserEmpType']=='U'){ ?><option value="U" selected>&nbsp;User</option><option value="A">&nbsp;Admin</option><?php } ?></select></td>
					<td align="center" class="font1"><select class="EditInput" name="Master" id="Master" style="width:45px;">
                    <?php if($ResultUser['Master']=='Y'){ ?><option value="Y" selected>&nbsp;Yes</option><option value="N">&nbsp;No</option><?php } ?>
                    <?php if($ResultUser['Master']=='N'){ ?><option value="N" selected>&nbsp;No</option><option value="Y">&nbsp;Yes</option><?php } ?></select></td>
					<td align="center" class="font1"><select class="EditInput" name="CMaster" id="CMaster" style="width:45px;">
                    <?php if($ResultUser['CMaster']=='Y'){ ?><option value="Y" selected>&nbsp;Yes</option><option value="N">&nbsp;No</option><?php } ?>
                    <?php if($ResultUser['CMaster']=='N'){ ?><option value="N" selected>&nbsp;No</option><option value="Y">&nbsp;Yes</option><?php } ?></select></td>
					<td align="center" class="font1"><select class="EditInput" name="SMaster" id="SMaster" style="width:45px;">
                    <?php if($ResultUser['SMaster']=='Y'){ ?><option value="Y" selected>&nbsp;Yes</option><option value="N">&nbsp;No</option><?php } ?>
                    <?php if($ResultUser['SMaster']=='N'){ ?><option value="N" selected>&nbsp;No</option><option value="Y">&nbsp;Yes</option><?php } ?></select></td>
					<td align="center" class="font1"><select class="EditInput" name="PMaster" id="PMaster" style="width:45px;">
                    <?php if($ResultUser['PMaster']=='Y'){ ?><option value="Y" selected>&nbsp;Yes</option><option value="N">&nbsp;No</option><?php } ?>
                    <?php if($ResultUser['PMaster']=='N'){ ?><option value="N" selected>&nbsp;No</option><option value="Y">&nbsp;Yes</option><?php } ?></select></td>
					<td align="center" class="font1"><select class="EditInput" name="UMaster" id="UMaster" style="width:45px;">
                    <?php if($ResultUser['UMaster']=='Y'){ ?><option value="Y" selected>&nbsp;Yes</option><option value="N">&nbsp;No</option><?php } ?>
                    <?php if($ResultUser['UMaster']=='N'){ ?><option value="N" selected>&nbsp;No</option><option value="Y">&nbsp;Yes</option><?php } ?></select></td>
					<td align="center" class="font1"><select class="EditInput" name="Import" id="Import" style="width:45px;">
                    <?php if($ResultUser['Import']=='Y'){ ?><option value="Y" selected>&nbsp;Yes</option><option value="N">&nbsp;No</option><?php } ?>
                    <?php if($ResultUser['Import']=='N'){ ?><option value="N" selected>&nbsp;No</option><option value="Y">&nbsp;Yes</option><?php } ?></select></td>
					<td align="center" class="font1"><select class="EditInput" name="Logistic" id="Logistic" style="width:45px;">
                    <?php if($ResultUser['Logistic']=='Y'){ ?><option value="Y" selected>&nbsp;Yes</option><option value="N">&nbsp;No</option><?php } ?>
                    <?php if($ResultUser['Logistic']=='N'){ ?><option value="N" selected>&nbsp;No</option><option value="Y">&nbsp;Yes</option><?php } ?></select></td>
					<td align="center" class="font1"><select class="EditInput" name="LogAchi" id="LogAchi" style="width:45px;">
                    <?php if($ResultUser['LogAchi']=='Y'){ ?><option value="Y" selected>&nbsp;Yes</option><option value="N">&nbsp;No</option><?php } ?>
                    <?php if($ResultUser['LogAchi']=='N'){ ?><option value="N" selected>&nbsp;No</option><option value="Y">&nbsp;Yes</option><?php } ?></select></td>
					<td align="center" class="font1"><select class="EditInput" name="LogTest" id="LogTest" style="width:45px;">
                    <?php if($ResultUser['LogTest']=='Y'){ ?><option value="Y" selected>&nbsp;Yes</option><option value="N">&nbsp;No</option><?php } ?>
                    <?php if($ResultUser['LogTest']=='N'){ ?><option value="N" selected>&nbsp;No</option><option value="Y">&nbsp;Yes</option><?php } ?></select></td>


<td align="center" class="font1"><select class="EditInput" name="FwdNote" id="FwdNote" style="width:45px;">
<?php if($ResultUser['FwdNote']=='Y'){ ?><option value="Y" selected>&nbsp;Yes</option><option value="N">&nbsp;No</option><?php } ?><?php if($ResultUser['FwdNote']=='N'){ ?><option value="N" selected>&nbsp;No</option><option value="Y">&nbsp;Yes</option><?php } ?></select></td>
<td align="center" class="font1"><select class="EditInput" name="FwdEdit" id="FwdEdit" style="width:45px;">
<?php if($ResultUser['FwdEdit']=='Y'){ ?><option value="Y" selected>&nbsp;Yes</option><option value="N">&nbsp;No</option><?php } ?><?php if($ResultUser['FwdEdit']=='N'){ ?><option value="N" selected>&nbsp;No</option><option value="Y">&nbsp;Yes</option><?php } ?></select></td>


					<td align="center" class="font1"><select class="EditInput" name="Production" id="Production" style="width:45px;">
                    <?php if($ResultUser['Production']=='Y'){ ?><option value="Y" selected>&nbsp;Yes</option><option value="N">&nbsp;No</option><?php } ?>
                    <?php if($ResultUser['Production']=='N'){ ?><option value="N" selected>&nbsp;No</option><option value="Y">&nbsp;Yes</option><?php } ?></select></td>
					<td align="center" class="font1"><select class="EditInput" name="ProdStock" id="ProdStock" style="width:45px;">
                    <?php if($ResultUser['ProdStock']=='Y'){ ?><option value="Y" selected>&nbsp;Yes</option><option value="N">&nbsp;No</option><?php } ?>
                    <?php if($ResultUser['ProdStock']=='N'){ ?><option value="N" selected>&nbsp;No</option><option value="Y">&nbsp;Yes</option><?php } ?></select></td>
					<td align="center" class="font1"><select class="EditInput" name="Reports" id="Reports" style="width:45px;">
                    <?php if($ResultUser['Reports']=='Y'){ ?><option value="Y" selected>&nbsp;Yes</option><option value="N">&nbsp;No</option><?php } ?>
                    <?php if($ResultUser['Reports']=='N'){ ?><option value="N" selected>&nbsp;No</option><option value="Y">&nbsp;Yes</option><?php } ?></select></td>
					<td align="center" class="font1"><select class="EditInput" name="ProdRep" id="ProdRep" style="width:45px;">
                    <?php if($ResultUser['ProdRep']=='Y'){ ?><option value="Y" selected>&nbsp;Yes</option><option value="N">&nbsp;No</option><?php } ?>
                    <?php if($ResultUser['ProdRep']=='N'){ ?><option value="N" selected>&nbsp;No</option><option value="Y">&nbsp;Yes</option><?php } ?></select></td>
					<td align="center" class="font1"><select class="EditInput" name="SalesRep" id="SalesRep" style="width:45px;">
                    <?php if($ResultUser['SalesRep']=='Y'){ ?><option value="Y" selected>&nbsp;Yes</option><option value="N">&nbsp;No</option><?php } ?>
                    <?php if($ResultUser['SalesRep']=='N'){ ?><option value="N" selected>&nbsp;No</option><option value="Y">&nbsp;Yes</option><?php } ?></select></td>
					
					
<td align="center" class="font1"><select class="EditInput" name="FaEdit" id="FaEdit" style="width:45px;">
<?php if($ResultUser['FaEdit']=='Y'){ ?><option value="Y" selected>&nbsp;Yes</option><option value="N">&nbsp;No</option><?php } ?><?php if($ResultUser['FaEdit']=='N'){ ?><option value="N" selected>&nbsp;No</option><option value="Y">&nbsp;Yes</option><?php } ?></select></td>

<td align="center" class="font1"><select class="EditInput" name="FaApproval" id="FaApproval" style="width:45px;">
<?php if($ResultUser['FaApproval']=='Y'){ ?><option value="Y" selected>&nbsp;Yes</option><option value="N">&nbsp;No</option><?php } ?><?php if($ResultUser['FaApproval']=='N'){ ?><option value="N" selected>&nbsp;No</option><option value="Y">&nbsp;Yes</option><?php } ?></select></td>

<td align="center" class="font1"><select class="EditInput" name="FaReports" id="FaReports" style="width:45px;">
<?php if($ResultUser['FaReports']=='Y'){ ?><option value="Y" selected>&nbsp;Yes</option><option value="N">&nbsp;No</option><?php } ?><?php if($ResultUser['FaReports']=='N'){ ?><option value="N" selected>&nbsp;No</option><option value="Y">&nbsp;Yes</option><?php } ?></select></td>					
					
					<td align="center" class="font1"><select class="EditInput" name="eadd" id="eadd" style="width:45px;">
                    <?php if($ResultUser['UEAdd']=='Y'){ ?><option value="Y" selected>&nbsp;Yes</option><option value="N">&nbsp;No</option><?php } ?>
                    <?php if($ResultUser['UEAdd']=='N'){ ?><option value="N" selected>&nbsp;No</option><option value="Y">&nbsp;Yes</option><?php } ?></select></td>
					<td align="center" class="font1"><select class="EditInput" name="eedit" id="eedit" style="width:45px;">
                    <?php if($ResultUser['UEEdit']=='Y'){ ?><option value="Y" selected>&nbsp;Yes</option><option value="N">&nbsp;No</option><?php } ?>
                    <?php if($ResultUser['UEEdit']=='N'){ ?><option value="N" selected>&nbsp;No</option><option value="Y">&nbsp;Yes</option><?php } ?></select></td>
					<td align="center" class="font1"><select class="EditInput" name="eview" id="eview" style="width:45px;">
                    <?php if($ResultUser['UEView']=='Y'){ ?><option value="Y" selected>&nbsp;Yes</option><option value="N">&nbsp;No</option><?php } ?>
                    <?php if($ResultUser['UEView']=='N'){ ?><option value="N" selected>&nbsp;No</option><option value="Y">&nbsp;Yes</option><?php } ?></select></td>
					<td align="center" valign="middle" class="font2">&nbsp;<input type="hidden" name="sid" id="sid" value="<?php echo $ResultUser['SUserEmpId']; ?>" />
					<input type="submit" name="SaveUser"  value="" class="SaveButton">&nbsp;</td>
					</form>
					</tr>
				 <?php } else { ?>
				 <tr> 
					<td align="center" class="font1"><?php echo $Sno; ?></td>
					<td style="font-family:Georgia;font-size:11px;">&nbsp;
<?php $sqlUn=mysql_query("select Fname,Sname,Lname from hrm_employee where EmployeeID=".$ResultUser['UserEmpId'], $con); $resUn=mysql_fetch_assoc($sqlUn); ?>					
					<?php echo $resUn['Fname'].' '.$resUn['Sname'].' '.$resUn['Lname'];?></td>
					<td align="center" class="font1">&nbsp;<?php if($ResultUser['Status']=='A'){echo 'Active';}else{echo 'Block';}?></td>
					<td align="center" class="font1">&nbsp;<?php if($ResultUser['UserEmpType']=='A'){echo 'Admin';}else{echo 'User';} ?></td>					
					<td align="center" class="font1" style="background-color:<?php if($ResultUser['Master']=='Y'){ echo '#9AFF35'; }?>;"><?php if($ResultUser['Master']=='Y'){echo 'Yes';}else{echo 'No';}?></td>
					<td align="center" class="font1" style="background-color:<?php if($ResultUser['CMaster']=='Y'){ echo '#9AFF35'; }?>;"><?php if($ResultUser['CMaster']=='Y'){echo 'Yes';}else{echo 'No';} ?></td>
					<td align="center" class="font1" style="background-color:<?php if($ResultUser['SMaster']=='Y'){ echo '#9AFF35'; }?>;"><?php if($ResultUser['SMaster']=='Y'){echo 'Yes';}else{echo 'No';}?></td>
					<td align="center" class="font1" style="background-color:<?php if($ResultUser['PMaster']=='Y'){ echo '#9AFF35'; }?>;"><?php if($ResultUser['PMaster']=='Y'){echo 'Yes';}else{echo 'No';} ?></td>
					<td align="center" class="font1" style="background-color:<?php if($ResultUser['UMaster']=='Y'){ echo '#9AFF35'; }?>;"><?php if($ResultUser['UMaster']=='Y'){echo 'Yes';}else{echo 'No';} ?></td>
					<td align="center" class="font1" style="background-color:<?php if($ResultUser['Import']=='Y'){ echo '#9AFF35'; }?>;"><?php if($ResultUser['Import']=='Y'){echo 'Yes';}else{echo 'No';} ?></td>
					<td align="center" class="font1" style="background-color:<?php if($ResultUser['Logistic']=='Y'){ echo '#9AFF35'; }?>;"><?php if($ResultUser['Logistic']=='Y'){echo 'Yes';}else{echo 'No';}?></td>
					<td align="center" class="font1" style="background-color:<?php if($ResultUser['LogAchi']=='Y'){ echo '#9AFF35'; }?>;"><?php if($ResultUser['LogAchi']=='Y'){echo 'Yes';}else{echo 'No';} ?></td>
					<td align="center" class="font1" style="background-color:<?php if($ResultUser['LogTest']=='Y'){ echo '#9AFF35'; }?>;"><?php if($ResultUser['LogTest']=='Y'){echo 'Yes';}else{echo 'No';}?></td>

<td align="center" class="font1" style="background-color:<?php if($ResultUser['FwdNote']=='Y'){ echo '#9AFF35'; }?>;"><?php if($ResultUser['FwdNote']=='Y'){echo 'Yes';}else{echo 'No';}?></td>
<td align="center" class="font1" style="background-color:<?php if($ResultUser['FwdEdit']=='Y'){ echo '#9AFF35'; }?>;"><?php if($ResultUser['FwdEdit']=='Y'){echo 'Yes';}else{echo 'No';}?></td>

				       <td align="center" class="font1" style="background-color:<?php if($ResultUser['Production']=='Y'){ echo '#9AFF35'; }?>;"><?php if($ResultUser['Production']=='Y'){echo 'Yes';}else{echo 'No';} ?></td>
					<td align="center" class="font1" style="background-color:<?php if($ResultUser['ProdStock']=='Y'){ echo '#9AFF35'; }?>;"><?php if($ResultUser['ProdStock']=='Y'){echo 'Yes';}else{echo 'No';} ?></td>
					<td align="center" class="font1" style="background-color:<?php if($ResultUser['Reports']=='Y'){ echo '#9AFF35'; }?>;"><?php if($ResultUser['Reports']=='Y'){echo 'Yes';}else{echo 'No';} ?></td>
					<td align="center" class="font1" style="background-color:<?php if($ResultUser['ProdRep']=='Y'){ echo '#9AFF35'; }?>;"><?php if($ResultUser['ProdRep']=='Y'){echo 'Yes';}else{echo 'No';} ?></td>
					<td align="center" class="font1" style="background-color:<?php if($ResultUser['SalesRep']=='Y'){ echo '#9AFF35'; }?>;"><?php if($ResultUser['SalesRep']=='Y'){echo 'Yes';}else{echo 'No';} ?></td>
					
<td align="center" class="font1" style="background-color:<?php if($ResultUser['FaEdit']=='Y'){ echo '#9AFF35'; }?>;"><?php if($ResultUser['FaEdit']=='Y'){echo 'Yes';}else{echo 'No';} ?></td>
<td align="center" class="font1" style="background-color:<?php if($ResultUser['FaApproval']=='Y'){ echo '#9AFF35'; }?>;"><?php if($ResultUser['FaApproval']=='Y'){echo 'Yes';}else{echo 'No';} ?></td>
<td align="center" class="font1" style="background-color:<?php if($ResultUser['FaReports']=='Y'){ echo '#9AFF35'; }?>;"><?php if($ResultUser['FaReports']=='Y'){echo 'Yes';}else{echo 'No';} ?></td>					
					
					<td align="center" class="font1" style="background-color:<?php if($ResultUser['UEAdd']=='Y'){ echo '#9AFF35'; }?>;"><?php if($ResultUser['UEAdd']=='Y'){echo 'Yes';}else{echo 'No';} ?></td>
					<td align="center" class="font1" style="background-color:<?php if($ResultUser['UEEdit']=='Y'){ echo '#9AFF35'; }?>;"><?php if($ResultUser['UEEdit']=='Y'){echo 'Yes';}else{echo 'No';} ?></td>
					<td align="center" class="font1" style="background-color:<?php if($ResultUser['UEView']=='Y'){ echo '#9AFF35'; }?>;"><?php if($ResultUser['UEView']=='Y'){echo 'Yes';}else{echo 'No';} ?></td>
					<td align="center" valign="middle" class="font2">
					<?php if($UserType=='S' OR $UserType=='A') { ?>
					    <a href="#"><img src="images/edit.png" border="0" alt="Edit" onClick="edit(<?php echo $ResultUser['SUserEmpId']; ?>)"></a>
						&nbsp;&nbsp;<a href="#"><img src="images/delete.png" alt="Delete" border="0" onClick="del(<?php echo $ResultUser['SUserEmpId']; ?>)"></a>
						&nbsp;&nbsp;<a href="#"><img src="images/key.png" alt="LogKey" border="0" onClick="Logkey(<?php echo $ResultUser['SUserEmpId']; ?>)"></a>
					<?php } ?>
					</td>
 			     </tr>
				<?php } $Sno++; } ?> 
				<tr><td bgcolor="#B6E9E2" colspan="28"></td></tr>
				<?php //-----------------------------------------Add New User--------------------------------------------------------------- ?>
				<?php if(isset($_REQUEST['action']) && $_REQUEST['action']=="newsave"){ ?>
				<form name="formUserNew" method="post" onSubmit="return validateNew(this)">
				 <tr> 
				  <td align="center" class="font1"><?php echo $Sno; ?></td>
					<td style="color:#ffffff; font-family:Georgia;font-size:11px;">	
					<select class="EditInput" name="username" id="username" style="width:148px;">
<?php $sqlUn2=mysql_query("select hrm_employee.EmployeeID,Fname,Sname,Lname from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND (hrm_employee_general.DepartmentId=7 OR hrm_employee_general.DepartmentId=17 OR hrm_employee_general.DepartmentId=12 OR hrm_employee.EmployeeID=331) order by Fname ASC", $con); while($resUn2=mysql_fetch_assoc($sqlUn2)){ ?>					
					<option value="<?php echo $resUn2['EmployeeID']; ?>"><?php echo $resUn2['Fname'].' '.$resUn2['Sname'].' '.$resUn2['Lname'];?></option><?php } ?></select></td>
					<td align="center" class="font1"><select class="EditInput" name="status" id="status" style="width:50px;">
                    <option value="A" selected>&nbsp;Active</option><option value="D">&nbsp;Block</option></select></td>
					<td align="center" class="font1"><select class="EditInput" name="type" id="type" style="width:50px;">
                    <option value="U" selected>&nbsp;User</option><option value="A">&nbsp;Admin</option></select></td>
					<td align="center" class="font1"><select class="EditInput" name="Master" id="Master" style="width:45px;">
                    <option value="N" selected>&nbsp;No</option><option value="Y">&nbsp;Yes</option></select></td>
					<td align="center" class="font1"><select class="EditInput" name="CMaster" id="CMaster" style="width:45px;">
                    <option value="N" selected>&nbsp;No</option><option value="Y">&nbsp;Yes</option></select></td>
					<td align="center" class="font1"><select class="EditInput" name="SMaster" id="SMaster" style="width:45px;">
					<option value="N" selected>&nbsp;No</option><option value="Y">&nbsp;Yes</option></select></td>
					<td align="center" class="font1"><select class="EditInput" name="PMaster" id="PMaster" style="width:45px;">
                    <option value="N" selected>&nbsp;No</option><option value="Y">&nbsp;Yes</option></select></td>
					<td align="center" class="font1"><select class="EditInput" name="UMaster" id="UMaster" style="width:45px;">
                    <option value="N" selected>&nbsp;No</option><option value="Y">&nbsp;Yes</option></select></td>
					<td align="center" class="font1"><select class="EditInput" name="Import" id="Import" style="width:45px;">
                    <option value="N" selected>&nbsp;No</option><option value="Y">&nbsp;Yes</option></select></td>
                    <td align="center" class="font1"><select class="EditInput" name="Logistic" id="Logistic" style="width:45px;">
                    <option value="N" selected>&nbsp;No</option><option value="Y">&nbsp;Yes</option></select></td>
					<td align="center" class="font1"><select class="EditInput" name="LogAchi" id="LogAchi" style="width:45px;">
                    <option value="N" selected>&nbsp;No</option><option value="Y">&nbsp;Yes</option></select></td>
					<td align="center" class="font1"><select class="EditInput" name="LogTest" id="LogTest" style="width:45px;">
					<option value="N" selected>&nbsp;No</option><option value="Y">&nbsp;Yes</option></select></td>

<td align="center" class="font1"><select class="EditInput" name="FwdNote" id="FwdNote" style="width:45px;">
<option value="N" selected>&nbsp;No</option><option value="Y">&nbsp;Yes</option></select></td>
<td align="center" class="font1"><select class="EditInput" name="FwdEdit" id="FwdEdit" style="width:45px;">
<option value="N" selected>&nbsp;No</option><option value="Y">&nbsp;Yes</option></select></td>	

					<td align="center" class="font1"><select class="EditInput" name="Production" id="Production" style="width:45px;">
                    <option value="N" selected>&nbsp;No</option><option value="Y">&nbsp;Yes</option></select></td>
					<td align="center" class="font1"><select class="EditInput" name="ProdStock" id="ProdStock" style="width:45px;">
                    <option value="N" selected>&nbsp;No</option><option value="Y">&nbsp;Yes</option></select></td>
					<td align="center" class="font1"><select class="EditInput" name="Reports" id="Reports" style="width:45px;">
                    <option value="N" selected>&nbsp;No</option><option value="Y">&nbsp;Yes</option></select></td>
					<td align="center" class="font1"><select class="EditInput" name="ProdRep" id="ProdRep" style="width:45px;">
                    <option value="N" selected>&nbsp;No</option><option value="Y">&nbsp;Yes</option></select></td>
					<td align="center" class="font1"><select class="EditInput" name="SalesRep" id="SalesRep" style="width:45px;">
                    <option value="N" selected>&nbsp;No</option><option value="Y">&nbsp;Yes</option></select></td>
					
<td align="center" class="font1"><select class="EditInput" name="FaEdit" id="FaEdit" style="width:45px;">
<option value="N" selected>&nbsp;No</option><option value="Y">&nbsp;Yes</option></select></td>
<td align="center" class="font1"><select class="EditInput" name="FaApproval" id="FaApproval" style="width:45px;">
<option value="N" selected>&nbsp;No</option><option value="Y">&nbsp;Yes</option></select></td>
<td align="center" class="font1"><select class="EditInput" name="FaReports" id="FaReports" style="width:45px;">
<option value="N" selected>&nbsp;No</option><option value="Y">&nbsp;Yes</option></select></td>					
					
					<td align="center" class="font1"><select class="EditInput" name="eadd" id="eadd" style="width:45px;">
                    <option value="N" selected>&nbsp;No</option><option value="Y">&nbsp;Yes</option></select></td>
					<td align="center" class="font1"><select class="EditInput" name="eedit" id="eedit" style="width:45px;">
                    <option value="N" selected>&nbsp;No</option><option value="Y">&nbsp;Yes</option></select></td>
					<td align="center" class="font1"><select class="EditInput" name="eview" id="eview" style="width:45px;">
                    <option value="N" selected>&nbsp;No</option><option value="Y">&nbsp;Yes</option></select></td>
					<td align="center" valign="middle" class="font2">&nbsp;
					 <input type="submit" name="NewSaveUser"  value="" class="SaveButton">&nbsp;
					</td>
 			     </tr>
				 </form>
				 <?php } ?>
			 <tr>
			    </table>
			   </td>
			 </tr>
				 <td align="right">
				    <input type="button" name="NewSave" id="NewSave" value="New" onClick="newsave()" <?php if($_REQUEST['action']=="newsave" OR $_REQUEST['action']=="edit"){ echo "style=display:none;"; }?>/>
					<input type="button" name="Back" value="Back" onClick="javascript:window.location='Index.php'"/>
					<input type="button" name="Refresh" value="Refresh" onClick="javascript:window.location='UserMaster.php'"/>&nbsp;
			     </td>
			</tr>
		   </table>  		
		</td>
		
        <?php } ?>
		<?php //-------------------------------------------------------------------------------------------------------- ?>
		
		<td align="left" width="20%">&nbsp;</td>
	</tr>
</table>
		
<?php //******************************************************?>
<?php //****************END*****END*****END******END******END********************?>
<?php //************************************************?>
		
	  </td>
	</tr>
  </table>
 </td>
</tr>
</table>
</body>
</html>
