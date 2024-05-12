<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}
//**********************************************************************************************************************
if($_REQUEST['action'] AND $_REQUEST['action']=='ChangeAccess' AND $_REQUEST['e']!='' AND $_REQUEST['d']!='')
{ $sql=mysql_query("select * from hrm_asset_dept_access where DepartmentId=".$_REQUEST['d'], $con); $rows=mysql_num_rows($sql);
  if($rows>0){$sqlUp=mysql_query("update hrm_asset_dept_access set EmployeeID=".$_REQUEST['e']." where DepartmentId=".$_REQUEST['d'],$con); }
  else
  {
    if($_REQUEST['e']>0)
	{ $sqlUp=mysql_query("insert into hrm_asset_dept_access(DepartmentId,EmployeeID) values(".$_REQUEST['d'].",".$_REQUEST['e'].")", $con); }
  }
  
  if($sqlUp){echo '<script>alert("Data updated successfully")</script>';}
  
}

if($_REQUEST['action22'] AND $_REQUEST['action22']=='ChangeAccess22' AND $_REQUEST['e']!='' AND $_REQUEST['d']!='')
{ $sql=mysql_query("select * from hrm_asset_dept_access where DepartmentId=".$_REQUEST['d'], $con); $rows=mysql_num_rows($sql);
  if($rows>0){$sqlUp=mysql_query("update hrm_asset_dept_access set EmployeeID2=".$_REQUEST['e']." where DepartmentId=".$_REQUEST['d'],$con); }
  else
  {
    if($_REQUEST['e']>0)
	{ $sqlUp=mysql_query("insert into hrm_asset_dept_access(DepartmentId,EmployeeID2) values(".$_REQUEST['d'].",".$_REQUEST['e'].")", $con); }
  }
  
  if($sqlUp){echo '<script>alert("Data updated successfully")</script>';}
  
}

if($_REQUEST['action33'] AND $_REQUEST['action33']=='ChangeAccess33' AND $_REQUEST['e']!='' AND $_REQUEST['d']!='')
{ $sql=mysql_query("select * from hrm_asset_dept_access where DepartmentId=".$_REQUEST['d'], $con); $rows=mysql_num_rows($sql);
  if($rows>0){$sqlUp=mysql_query("update hrm_asset_dept_access set EmployeeID3=".$_REQUEST['e']." where DepartmentId=".$_REQUEST['d'],$con); }
  else
  {
    if($_REQUEST['e']>0)
	{ $sqlUp=mysql_query("insert into hrm_asset_dept_access(DepartmentId,EmployeeID3) values(".$_REQUEST['d'].",".$_REQUEST['e'].")", $con); }
  }
  
  if($sqlUp){echo '<script>alert("Data updated successfully")</script>';}
  
}

if($_REQUEST['action44'] AND $_REQUEST['action44']=='ChangeAccess44' AND $_REQUEST['e']!='' AND $_REQUEST['d']!='')
{ $sql=mysql_query("select * from hrm_asset_dept_access where DepartmentId=".$_REQUEST['d'], $con); $rows=mysql_num_rows($sql);
  if($rows>0){$sqlUp=mysql_query("update hrm_asset_dept_access set EmployeeID4=".$_REQUEST['e']." where DepartmentId=".$_REQUEST['d'],$con); }
  else
  {
    if($_REQUEST['e']>0)
	{ $sqlUp=mysql_query("insert into hrm_asset_dept_access(DepartmentId,EmployeeID4) values(".$_REQUEST['d'].",".$_REQUEST['e'].")", $con); }
  }
  
  if($sqlUp){echo '<script>alert("Data updated successfully")</script>';}
  
}
?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<link rel="stylesheet" type="text/css" href="src/css/jscal2.css"/>
<link rel="stylesheet" type="text/css" href="src/css/border-radius.css"/>
<link rel="stylesheet" type="text/css" href="src/css/steel/steel.css"/>
<script type="text/javascript" src="src/js/jscal2.js"></script>
<script type="text/javascript" src="src/js/lang/en.js"></script>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<style> .font { color:#ffffff; font-family:Times New Roman; font-size:12px; width:200px;} .font1 { font-family:Times New Roman; font-size:12px; height:14px; width:200px; } 
.font2 { font-size:12px;width:260px;height:18px;} .font4 { color:#1FAD34; font-family:Georgia; font-size:15px;}
.span {display:none; font-family:Courier New; font-size:14px; }.span1 {display:block; font-family:Courier New; font-size:14px; }
.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;}
.SaveButton {background-image:url(images/save.gif); width:20px; height:20px; background-repeat:no-repeat; background-color:#FFFFFF; border-color:#FFFFFF; border-bottom:inherit;}
.EditSelect { font-family:Times New Roman; font-size:12px; height:18px;}
.EditInput { font-family:Times New Roman; font-size:12px; height:20px;}
.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}
</style>
<Script type="text/javascript">window.history.forward(1);</Script>
<Script>
function ChangeAccessEmp(e,d) { var agree=confirm("Are you sure you want to changed employee-1?");
if(agree){ var x = "AssetDpta.php?action=ChangeAccess&ls=10&wer=123&aa=grtd&er=er%re%tr%rr&trt=equalthen&sys=%tr%tr&se=reew&w=ee102&aa=grtd&er=er%re%tr%rr&trt=equalthen&e="+e+"&d="+d;  window.location=x;}}
function ChangeAccessEmp22(e,d) { var agree=confirm("Are you sure you want to changed employee-2?");
if(agree){ var x = "AssetDpta.php?action22=ChangeAccess22&ls=10&wer=123&aa=grtd&er=er%re%tr%rr&trt=equalthen&sys=%tr%tr&se=reew&w=ee102&aa=grtd&er=er%re%tr%rr&trt=equalthen&e="+e+"&d="+d;  window.location=x;}}
function ChangeAccessEmp33(e,d){ var agree=confirm("Are you sure you want to changed employee-3?");
if(agree){ var x = "AssetDpta.php?action33=ChangeAccess33&ls=10&wer=123&aa=grtd&er=er%re%tr%rr&trt=equalthen&sys=%tr%tr&se=reew&w=ee102&aa=grtd&er=er%re%tr%rr&trt=equalthen&e="+e+"&d="+d;  window.location=x;}}
function ChangeAccessEmp44(e,d){ var agree=confirm("Are you sure you want to changed employee-4?");
if(agree){ var x = "AssetDpta.php?action44=ChangeAccess44&ls=10&wer=123&aa=grtd&er=er%re%tr%rr&trt=equalthen&sys=%tr%tr&se=reew&w=ee102&aa=grtd&er=er%re%tr%rr&trt=equalthen&e="+e+"&d="+d;  window.location=x;}}
</Script> 
</head>
<body class="body">
<table class="table">
<tr><td><table class="menutable"><tr><td><?php if($_SESSION['login'] = true){ require_once("AMenu.php"); } ?></td></tr></table></td></tr>
<tr>
 <td valign="top">
  <table style="margin-top:0px;" border="0">
   <tr><td valign="top"><?php if($_SESSION['login'] = true){ require_once("AWelcome.php"); } ?></td></tr>
   <tr>
	<td valign="top" id="MainWindow"><br>	  
    <table border="0" style="margin-top:0px;height:300px;">
    <tr>
    <td width="10">&nbsp;</td>  
    <td align="left" id="type" valign="top" style="display:block;">             
     <table border="0">
	 <tr><td class="heading">&nbsp;Assets Departmental Access</td></tr>
	 <tr>
	 <td align="left">
	 <table border="1" bgcolor="#FFFFFF">
<tr bgcolor="#7a6189">
 <td align="center" style="font:Georgia;color:#FFFFFF;font-size:11px;width:50px;"><b>SNo</b></td>
 <td class="font" align="center" style="width:150px;"><b>Department</b></td>
 <td class="font" align="center" style="width:150px;"><b>Employee 1</b></td>
 <td class="font" align="center" style="width:150px;"><b>Employee 2</b></td>
 <td class="font" align="center" style="width:150px;"><b>Employee 3</b></td>
 <td class="font" align="center" style="width:150px;"><b>Employee 4</b></td>
</tr>
<?php if($_SESSION['User_Permission']=='Edit'){?>
<form name="OformEdit" method="post" onSubmit="return OvalidateEdit(this)">
<?php $sql=mysql_query("select * from hrm_department where CompanyId=".$CompanyId." AND (DepartmentId=8 OR DepartmentId=9) order by DepartmentName ASC", $con); $SNo=1; while($res=mysql_fetch_array($sql)){ ?>
<tr>
 <td align="center" style="font:Georgia;font-size:12px;" valign="top"><?php echo $SNo; ?></td>
 <td class="font" valign="top"><input name="DeptName" class="EditInput" value="<?php echo $res['DepartmentName']; ?>" style="width:195px;"/></td>
 <td class="font" valign="top" align="center"><select name="DeptEmp" class="EditInput" style="width:200px;height:22px;" onChange="ChangeAccessEmp(this.value,<?php echo $res['DepartmentId']; ?>)">
<?php $sqlch=mysql_query("select hrm_employee.EmployeeID,Fname,Sname,Lname from hrm_employee INNER JOIN hrm_asset_dept_access ON hrm_employee.EmployeeID=hrm_asset_dept_access.EmployeeID where hrm_asset_dept_access.DepartmentId=".$res['DepartmentId']." AND hrm_employee.CompanyId=".$CompanyId, $con); 
$rowch=mysql_num_rows($sqlch); if($rowch>0){ $resch=mysql_fetch_assoc($sqlch);  ?><option value="<?php echo $resch['EmployeeID']; ?>"><?php echo $resch['Fname'].' '.$resch['Sname'].' '.$resch['Lname']; ?></option><?php } else { ?><option value="0" selected>Select</option><?php } ?>
<?php $sqlEmp=mysql_query("select hrm_employee.EmployeeID,Fname,Sname,Lname from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee_general.DepartmentId=".$res['DepartmentId']." AND hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." order by Fname ASC", $con); 
while($resEmp=mysql_fetch_array($sqlEmp)){ ?><option value="<?php echo $resEmp['EmployeeID']; ?>"><?php echo $resEmp['Fname'].' '.$resEmp['Sname'].' '.$resEmp['Lname']; ?></option><?php } ?><option value="0">Blank</option></select>
 </td>
  <td class="font" valign="top" align="center"><select name="DeptEmp2" class="EditInput" style="width:200px;height:22px;" onChange="ChangeAccessEmp22(this.value,<?php echo $res['DepartmentId']; ?>)">
<?php $sqlch2=mysql_query("select hrm_employee.EmployeeID,Fname,Sname,Lname from hrm_employee INNER JOIN hrm_asset_dept_access ON hrm_employee.EmployeeID=hrm_asset_dept_access.EmployeeID2 where hrm_asset_dept_access.DepartmentId=".$res['DepartmentId']." AND hrm_employee.CompanyId=".$CompanyId." order by Fname ASC", $con); 
$rowch2=mysql_num_rows($sqlch2); if($rowch2>0){ $resch2=mysql_fetch_assoc($sqlch2);  ?><option value="<?php echo $resch2['EmployeeID2']; ?>"><?php echo $resch2['Fname'].' '.$resch2['Sname'].' '.$resch2['Lname']; ?></option><?php } else { ?><option value="0" selected>Select</option><?php } ?>
<?php $sqlEmp2=mysql_query("select hrm_employee.EmployeeID,Fname,Sname,Lname from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." order by Fname ASC", $con); 
while($resEmp2=mysql_fetch_array($sqlEmp2)){ ?><option value="<?php echo $resEmp2['EmployeeID']; ?>"><?php echo $resEmp2['Fname'].' '.$resEmp2['Sname'].' '.$resEmp2['Lname']; ?></option><?php } ?><option value="0">Blank</option></select>
 </td>
 <td class="font" valign="top" align="center"><select name="DeptEmp3" class="EditInput" style="width:150px;height:22px;" onChange="ChangeAccessEmp33(this.value,<?php echo $res['DepartmentId']; ?>)">
<?php $sqlch2=mysql_query("select hrm_employee.EmployeeID,Fname,Sname,Lname from hrm_employee INNER JOIN hrm_asset_dept_access ON hrm_employee.EmployeeID=hrm_asset_dept_access.EmployeeID3 where hrm_asset_dept_access.DepartmentId=".$res['DepartmentId']." AND hrm_employee.CompanyId=".$CompanyId." order by Fname ASC", $con); 
$rowch2=mysql_num_rows($sqlch2); if($rowch2>0){ $resch2=mysql_fetch_assoc($sqlch2);  ?><option value="<?php echo $resch2['EmployeeID2']; ?>"><?php echo $resch2['Fname'].' '.$resch2['Sname'].' '.$resch2['Lname']; ?></option><?php } else { ?><option value="0" selected>Select</option><?php } ?>
<?php $sqlEmp2=mysql_query("select hrm_employee.EmployeeID,Fname,Sname,Lname from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." order by Fname ASC", $con); 
while($resEmp2=mysql_fetch_array($sqlEmp2)){ ?><option value="<?php echo $resEmp2['EmployeeID']; ?>"><?php echo $resEmp2['Fname'].' '.$resEmp2['Sname'].' '.$resEmp2['Lname']; ?></option><?php } ?><option value="0">Blank</option></select>
 </td>
 <td class="font" valign="top" align="center"><select name="DeptEmp4" class="EditInput" style="width:150px;height:22px;" onChange="ChangeAccessEmp44(this.value,<?php echo $res['DepartmentId']; ?>)">
<?php $sqlch2=mysql_query("select hrm_employee.EmployeeID,Fname,Sname,Lname from hrm_employee INNER JOIN hrm_asset_dept_access ON hrm_employee.EmployeeID=hrm_asset_dept_access.EmployeeID4 where hrm_asset_dept_access.DepartmentId=".$res['DepartmentId']." AND hrm_employee.CompanyId=".$CompanyId." order by Fname ASC", $con); 
$rowch2=mysql_num_rows($sqlch2); if($rowch2>0){ $resch2=mysql_fetch_assoc($sqlch2);  ?><option value="<?php echo $resch2['EmployeeID2']; ?>"><?php echo $resch2['Fname'].' '.$resch2['Sname'].' '.$resch2['Lname']; ?></option><?php } else { ?><option value="0" selected>Select</option><?php } ?>
<?php $sqlEmp2=mysql_query("select hrm_employee.EmployeeID,Fname,Sname,Lname from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." order by Fname ASC", $con); 
while($resEmp2=mysql_fetch_array($sqlEmp2)){ ?><option value="<?php echo $resEmp2['EmployeeID']; ?>"><?php echo $resEmp2['Fname'].' '.$resEmp2['Sname'].' '.$resEmp2['Lname']; ?></option><?php } ?><option value="0">Blank</option></select>
 </td>
</tr>
</form> 
<?php $SNo++;} ?>
</form>
<?php } ?>
	  </table>
	 </td>
    </tr>
  </table>  
</td>
</tr>
</table>
	  </td>
	</tr>
	
	<tr>
	  <td valign="top" align="center">
	    <table border="0" style="margin-top:0px;">
				<tr>
	              <td align="center"><img src="images/home1.png"></td>
				</tr>
	    </table>
	  </td>
	</tr>
	<tr>
	  <td valign="top">
	    <?php require_once("../footer.php"); ?>
	  </td>
	</tr>
  </table>
 </td>
</tr>
</table>
</body>
</html>
