<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');}
include("../function.php");
include('codeEncDec.php');
if(check_user()==false){header('Location:../../../index.php');}
if($_SESSION['login'] = true){require_once('UserMenuSession.php');}

if(isset($_POST['SaveUser']))  
{                         					
 $SqlUpdate = mysql_query("UPDATE hrm_sales_useremp SET UserEmpId=".$_POST['username'].", Status='".$_POST['status']."', UserEmpType='".$_POST['type']."', UEAdd='".$_POST['eadd']."', UEEdit='".$_POST['eedit']."', UEView='".$_POST['eview']."' WHERE SUserEmpId=".$_POST['sid'], $con);
if($SqlUpdate){ $msg = "Data has been updated successfully..."; } 
}

if(isset($_POST['NewSaveUser']))
{
 $SqlNewInseartUser = mysql_query("INSERT INTO hrm_sales_useremp(UserEmpId, Status, UserEmpType, UEAdd, UEEdit, UEView, CDate) VALUES(".$_POST['username'].", '".$_POST['status']."', '".$_POST['type']."', '".$_POST['eadd']."', '".$_POST['eedit']."', '".$_POST['eview']."', '".date("Y-m-d")."')", $con);
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

function EPerm(id)
{ window.open("UPerOpen.php?id="+id,"pf","menubar=no,scrollbars=yes,resizable=no,directories=no,width=800,height=600"); }
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
		<td valign="top">
		   <table border="0" style="width:900px;">
		     <tr><td align="left" class="heading">Master User<font class="font4"><b>&nbsp;&nbsp;<?php echo $msg; ?></b></font></td></tr>
			 <tr>
			   <td> 
			    <table border="1" bgcolor="#FFFFFF" style="width:900px;">
				 <tr bgcolor="#808000"> 
				    <td align="center" class="font" style="width:50px;"><b>&nbsp;SN&nbsp;</b></td>
					<td align="center" class="font" style="width:250px;"><b>User Name</b></td>
					<td align="center" class="font" style="width:80px;"><b>Status</b></td>
					<td align="center" class="font" style="width:80px;"><b>Type</b></td>
					<td align="center" class="font" style="width:50px;"><b>Add</b></td>
					<td align="center" class="font" style="width:50px;"><b>Edit</b></td>
					<td align="center" class="font" style="width:50px;"><b>View</b></td>
					<td align="center" class="font" style="width:100px;"><b>Action</b></td>
					<td align="center" class="font" style="width:50px;"><b>Access</b></td>
 			     </tr>
<?php $SqlUser=mysql_query("Select * from hrm_sales_useremp where UserEmpType!='S' AND Status!='De'", $con); $Sno=1; while($ResultUser=mysql_fetch_array($SqlUser)) {
 if(isset($_REQUEST['action']) && $_REQUEST['action']=="edit" && $_REQUEST['eid']==$ResultUser['SUserEmpId']){ ?>  
				  <tr> 
<form name="formUserEdit" method="post" onSubmit="return validateEdit(this)">
					<td align="center" class="font1"><?php echo $Sno; ?></td>
					<td style="color:#ffffff; font-family:Georgia;font-size:11px;">
<?php $sqlUn=mysql_query("select Fname,Sname,Lname from hrm_employee where EmployeeID=".$ResultUser['UserEmpId'], $con); $resUn=mysql_fetch_assoc($sqlUn); ?>					
					<select class="EditInput" name="username" id="username" style="width:250px;">
					<option value="<?php echo $ResultUser['UserEmpId'];?>"><?php echo ucwords(strtolower($resUn['Fname'].' '.$resUn['Sname'].' '.$resUn['Lname']));?></option>
<?php /* $sqlUn2=mysql_query("select hrm_employee.EmployeeID,Fname,Sname,Lname from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND (hrm_employee_general.DepartmentId=7 OR hrm_employee_general.DepartmentId=17 OR hrm_employee_general.DepartmentId=12 OR hrm_employee.EmployeeID=331) order by Fname ASC", $con); while($resUn2=mysql_fetch_assoc($sqlUn2)){ ?>					
					<option value="<?php echo $resUn2['EmployeeID']; ?>"><?php echo $resUn2['Fname'].' '.$resUn2['Sname'].' '.$resUn2['Lname'];?></option><?php } */ ?></select></td>
					<td align="center" class="font1"><select class="EditInput" name="status" id="status" style="width:80px;">
                    <?php if($ResultUser['Status']=='A'){ ?><option value="A" selected>&nbsp;Active</option><option value="D">&nbsp;Block</option><?php } ?>
                    <?php if($ResultUser['Status']=='D'){ ?><option value="D" selected>&nbsp;Block</option><option value="A">&nbsp;Active</option><?php } ?></select></td>
					<td align="center" class="font1"><select class="EditInput" name="type" id="type" style="width:80px;">
                    <?php if($ResultUser['UserEmpType']=='A'){ ?><option value="A" selected>&nbsp;Admin</option><option value="U">&nbsp;User</option><?php } ?>
                    <?php if($ResultUser['UserEmpType']=='U'){ ?><option value="U" selected>&nbsp;User</option><option value="A">&nbsp;Admin</option><?php } ?></select></td>			
					
					<td align="center" class="font1"><select class="EditInput" name="eadd" id="eadd" style="width:50px;">
                    <?php if($ResultUser['UEAdd']=='Y'){ ?><option value="Y" selected>&nbsp;Yes</option><option value="N">&nbsp;No</option><?php } ?>
                    <?php if($ResultUser['UEAdd']=='N'){ ?><option value="N" selected>&nbsp;No</option><option value="Y">&nbsp;Yes</option><?php } ?></select></td>
					<td align="center" class="font1"><select class="EditInput" name="eedit" id="eedit" style="width:50px;">
                    <?php if($ResultUser['UEEdit']=='Y'){ ?><option value="Y" selected>&nbsp;Yes</option><option value="N">&nbsp;No</option><?php } ?>
                    <?php if($ResultUser['UEEdit']=='N'){ ?><option value="N" selected>&nbsp;No</option><option value="Y">&nbsp;Yes</option><?php } ?></select></td>
					<td align="center" class="font1"><select class="EditInput" name="eview" id="eview" style="width:50px;">
                    <?php if($ResultUser['UEView']=='Y'){ ?><option value="Y" selected>&nbsp;Yes</option><option value="N">&nbsp;No</option><?php } ?>
                    <?php if($ResultUser['UEView']=='N'){ ?><option value="N" selected>&nbsp;No</option><option value="Y">&nbsp;Yes</option><?php } ?></select></td>
					<td align="center" valign="middle" class="font2">&nbsp;<input type="hidden" name="sid" id="sid" value="<?php echo $ResultUser['SUserEmpId']; ?>" />
					<input type="submit" name="SaveUser"  value="" class="SaveButton">&nbsp;</td>
					<td>&nbsp;</td>
					</form>
					</tr>
				 <?php } else { ?>
				 <tr> 
					<td align="center" class="font1"><?php echo $Sno; ?></td>
					<td style="font-family:Georgia;font-size:11px;">&nbsp;
<?php $sqlUn=mysql_query("select Fname,Sname,Lname from hrm_employee where EmployeeID=".$ResultUser['UserEmpId'], $con); $resUn=mysql_fetch_assoc($sqlUn); ?>					
					<?php echo ucwords(strtolower($resUn['Fname'].' '.$resUn['Sname'].' '.$resUn['Lname']));?></td>
					<td align="center" class="font1">&nbsp;<?php if($ResultUser['Status']=='A'){echo 'Active';}else{echo 'Block';}?></td>
					<td align="center" class="font1">&nbsp;<?php if($ResultUser['UserEmpType']=='A'){echo 'Admin';}else{echo 'User';} ?></td>									
					
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
					
					<td align="center" style="font-family:Times New Roman;font-size:14px;"><a href="#" onClick="EPerm(<?php echo $ResultUser['SUserEmpId']; ?>)">click</a></td>
 			     </tr>
				<?php } $Sno++; } ?> 
				<tr><td bgcolor="#B6E9E2" colspan="28"></td></tr>
				<?php //-----------------------------------------Add New User--------------------------------------------------------------- ?>
				<?php if(isset($_REQUEST['action']) && $_REQUEST['action']=="newsave"){ ?>
				<form name="formUserNew" method="post" onSubmit="return validateNew(this)">
				 <tr> 
				  <td align="center" class="font1"><?php echo $Sno; ?></td>
					<td style="color:#ffffff; font-family:Georgia;font-size:11px;">	
					<select class="EditInput" name="username" id="username" style="width:250px;">
<?php $sqlUn2=mysql_query("select e.EmployeeID,Fname,Sname,Lname from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND (g.DepartmentId=1 OR g.DepartmentId=5 OR g.DepartmentId=7 OR g.DepartmentId=17 OR g.DepartmentId=11 OR g.DepartmentId=12 OR g.DepartmentId=8 OR g.DepartmentId=9 OR e.EmployeeID=331 OR e.EmployeeID=84) order by Fname ASC", $con); while($resUn2=mysql_fetch_assoc($sqlUn2)){ ?>					
					<option value="<?php echo $resUn2['EmployeeID']; ?>"><?php echo ucwords(strtolower($resUn2['Fname'].' '.$resUn2['Sname'].' '.$resUn2['Lname']));?></option><?php } ?></select></td>
					<td align="center" class="font1"><select class="EditInput" name="status" id="status" style="width:80px;">
                    <option value="A" selected>&nbsp;Active</option><option value="D">&nbsp;Block</option></select></td>
					<td align="center" class="font1"><select class="EditInput" name="type" id="type" style="width:80px;">
                    <option value="U" selected>&nbsp;User</option><option value="A">&nbsp;Admin</option></select></td>					
					<td align="center" class="font1"><select class="EditInput" name="eadd" id="eadd" style="width:50px;">
                    <option value="N" selected>&nbsp;No</option><option value="Y">&nbsp;Yes</option></select></td>
					<td align="center" class="font1"><select class="EditInput" name="eedit" id="eedit" style="width:50px;">
                    <option value="N" selected>&nbsp;No</option><option value="Y">&nbsp;Yes</option></select></td>
					<td align="center" class="font1"><select class="EditInput" name="eview" id="eview" style="width:50px;">
                    <option value="N" selected>&nbsp;No</option><option value="Y">&nbsp;Yes</option></select></td>
					<td align="center" valign="middle" class="font2">&nbsp;
					 <input type="submit" name="NewSaveUser"  value="" class="SaveButton">&nbsp;
					</td>
					<td>&nbsp;</td>
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
