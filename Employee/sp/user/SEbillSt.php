<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');}
include("../function.php");
include('codeEncDec.php');
if(check_user()==false){header('Location:../../../index.php');}
if($_SESSION['login'] = true){require_once('UserMenuSession.php');}
//**********************************************************************************************************************
if(isset($_REQUEST['action']) && $_REQUEST['action']=="ChangeEmpState")
{ $sql=mysql_query("select * from hrm_sales_ebillstate WHERE StateId=".$_REQUEST['si'], $con); $row=mysql_num_rows($sql);
  if($row==1){ $sqlUp=mysql_query("update hrm_sales_ebillstate set EmployeeID=".$_REQUEST['ei']." where StateId=".$_REQUEST['si'], $con);}
  elseif($row==0){$sqlUp=mysql_query("insert into hrm_sales_ebillstate(StateId,EmployeeID) values(".$_REQUEST['si'].",".$_REQUEST['ei'].")", $con);}
}
if(isset($_REQUEST['action']) && $_REQUEST['action']=="ChangeEmp2State")
{ $sql=mysql_query("select * from hrm_sales_ebillstate WHERE StateId=".$_REQUEST['si'], $con); $row=mysql_num_rows($sql);
  if($row==1){ $sqlUp=mysql_query("update hrm_sales_ebillstate set EmployeeID2=".$_REQUEST['ei']." where StateId=".$_REQUEST['si'], $con);}
  elseif($row==0){$sqlUp=mysql_query("insert into hrm_sales_ebillstate(StateId,EmployeeID2) values(".$_REQUEST['si'].",".$_REQUEST['ei'].")", $con);}
}
if(isset($_REQUEST['action']) && $_REQUEST['action']=="ChangeEmp3State")
{ $sql=mysql_query("select * from hrm_sales_ebillstate WHERE StateId=".$_REQUEST['si'], $con); $row=mysql_num_rows($sql);
  if($row==1){ $sqlUp=mysql_query("update hrm_sales_ebillstate set EmployeeID3=".$_REQUEST['ei']." where StateId=".$_REQUEST['si'], $con);}
  elseif($row==0){$sqlUp=mysql_query("insert into hrm_sales_ebillstate(StateId,EmployeeID3) values(".$_REQUEST['si'].",".$_REQUEST['ei'].")", $con);}
}
if(isset($_REQUEST['action']) && $_REQUEST['action']=="ChangeEmp4State")
{ $sql=mysql_query("select * from hrm_sales_ebillstate WHERE StateId=".$_REQUEST['si'], $con); $row=mysql_num_rows($sql);
  if($row==1){ $sqlUp=mysql_query("update hrm_sales_ebillstate set EmployeeID4=".$_REQUEST['ei']." where StateId=".$_REQUEST['si'], $con);}
  elseif($row==0){$sqlUp=mysql_query("insert into hrm_sales_ebillstate(StateId,EmployeeID4) values(".$_REQUEST['si'].",".$_REQUEST['ei'].")", $con);}
}

?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<Script type="text/javascript">window.history.forward(1);</Script>
<style> .font { color:#ffffff; font-family:Times New Roman; font-size:15px; width:200px;} .font1 { font-family:Times New Roman; font-size:12px; height:14px; width:200px; } 
.font2 { font-size:12px;width:260px;height:18px;} .font4 { color:#1FAD34; font-family:Georgia; font-size:15px;}
.span {display:none; font-family:Courier New; font-size:14px; }.span1 {display:block; font-family:Courier New; font-size:14px; }
.SaveButton {background-image:url(images/save.gif); width:20px; height:20px; background-repeat:no-repeat; background-color:#FFFFFF; border-color:#FFFFFF; border-bottom:inherit;}
.EditSelect { font-family:Georgia; font-size:12px; height:18px;}
.EditInput { font-family:Georgia; font-size:12px; height:18px;}
.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}
</style>
<Script type="text/javascript" language="javascript">
function FunChangeSEmp(ei,si) 
{
 if(ei==''){alert("please select user!!"); return false;}
 else if(ei!='')
 {
  var agree=confirm("Are you sure you want to update record?"); 
  if(agree){ var x = "SEbillSt.php?action=ChangeEmpState&ei="+ei+"&si="+si;  window.location=x;}
  else{document.getElementById("EStid_"+si).value=0; return false;}
 }
}
function FunChangeSEmp2(ei,si) 
{ 
 if(ei==''){alert("please select user!!"); return false;}
 else if(ei!='')
 {
  var agree=confirm("Are you sure you want to update record?"); 
  if(agree){ var x = "SEbillSt.php?action=ChangeEmp2State&ei="+ei+"&si="+si;  window.location=x;}
  else{document.getElementById("EStid2_"+si).value=0; return false;}
 }
}
function FunChangeSEmp3(ei,si) 
{ 
 if(ei==''){alert("please select user!!"); return false;}
 else if(ei!='')
 {
  var agree=confirm("Are you sure you want to update record?"); 
  if(agree){ var x = "SEbillSt.php?action=ChangeEmp3State&ei="+ei+"&si="+si;  window.location=x;}
  else{document.getElementById("EStid3_"+si).value=0; return false;}
 }
}
function FunChangeSEmp4(ei,si) 
{ 
 if(ei==''){alert("please select user!!"); return false;}
 else if(ei!='')
 {
  var agree=confirm("Are you sure you want to update record?"); 
  if(agree){ var x = "SEbillSt.php?action=ChangeEmp4State&ei="+ei+"&si="+si;  window.location=x;}
  else{document.getElementById("EStid4_"+si).value=0; return false;}
 }
}


</Script> 
</head>
<body class="body">
<table class="table">
<tr><td><table class="menutable"><tr><td><?php if($_SESSION['login'] = true){ require_once("EMenu.php"); } ?></td></tr></table></td></tr>
<tr>
 <td valign="top">
  <table width="100%" style="margin-top:0px;" border="0">
   <tr><td valign="top"><?php if($_SESSION['login'] = true){ require_once("EWelcome.php"); } ?></td></tr>
   <tr>
	<td valign="top" align="center"  width="100%" id="MainWindow"><br>	  
    <table border="0" style="margin-top:0px; width:100%; height:300px;">
    <tr>
    <td width="10">&nbsp;</td>  
    <td align="left" id="type" valign="top" style="display:block; width:50%">             
     <table border="0">
	 <tr><td class="heading">&nbsp;User State </td></tr>
	 <tr>
	 <td align="left" width="1100">
	 <table border="1" width="1100" border="1" bgcolor="#FFFFFF">
<tr bgcolor="#808000">
 <td align="center" style="font:Georgia; color:#FFFFFF; font-size:11px; width:50px;"><b>SNo</b></td>
 <td class="font" align="center" style="width:250;"><b>State</b></td>
 <td class="font" align="center" style="width:200;"><b>User</b></td>
 <td class="font" align="center" style="width:200;"><b>User 2</b></td>
 <td class="font" align="center" style="width:200;"><b>User 3</b></td>
 <td class="font" align="center" style="width:200;"><b>User 4</b></td>
</tr>
<?php $sql = mysql_query("SELECT * from hrm_state where StateStatus='A' order by hrm_state.StateName ASC", $con);      $no=1; while($res = mysql_fetch_array($sql)) { 
$sql2 = mysql_query("SELECT EmployeeID,EmployeeID2,EmployeeID3,EmployeeID4 from hrm_sales_ebillstate where StateId=".$res['StateId'], $con); $res2 = mysql_fetch_array($sql2);

?>
<tr>
 <td align="center" style="font:Times New Roman; font-size:12px;"><?php echo $no; ?></td>	   
 <td class="font2">&nbsp;<?php echo $res['StateName']; ?></td>
 <td class="font2" align="center"><select style="width:200px;font-size:13px;font-family:Georgia;height:22px; background-color:<?php if($res2['EmployeeID']>0){echo '#9DFF3C';} ?>;" id="EStid_<?php echo $res['StateId']; ?>" onChange="FunChangeSEmp(this.value,<?php echo $res['StateId']; ?>)">
<?php if($res2['EmployeeID']>0){ $sqlE1=mysql_query("select hrm_employee.EmployeeID,EmpCode,Fname,Sname,Lname from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee_general.EmployeeID=".$res2['EmployeeID'], $con); $resE1=mysql_fetch_assoc($sqlE1); ?>
<option style="background-color:#A4FFA4;padding:1px; " value="<?php echo $res2['EmployeeID']; ?>" selected><?php echo ucwords(strtolower($resE1['Fname'].' '.$resE1['Sname'].' '.$resE1['Lname'])); ?></option><?php } else { ?><option style="background-color:#FFFFFF;padding:1px;" value="0" selected>&nbsp;SELECT USER</option><?php } ?>
<?php $sqlE=mysql_query("select hrm_employee.EmployeeID,EmpCode,Fname,Sname,Lname from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee_general.DepartmentId=7 order by Fname ASC", $con); while($resE=mysql_fetch_assoc($sqlE)) 
{ ?><option value="<?php echo $resE['EmployeeID']; ?>" style="padding:1px;">&nbsp;<?php echo ucwords(strtolower($resE['Fname'].' '.$resE['Sname'].' '.$resE['Lname'])); ?></option><?php } ?>
<option style="background-color:#FFFFFF;padding:1px;" value="0">&nbsp;None</option></select></td>

 <td class="font2" align="center"><select style="width:200px;font-size:13px;font-family:Georgia;height:22px; background-color:<?php if($res2['EmployeeID2']>0){echo '#9DFF3C';} ?>;" id="EStid2_<?php echo $res['StateId']; ?>" onChange="FunChangeSEmp2(this.value,<?php echo $res['StateId']; ?>)">
<?php if($res2['EmployeeID2']>0){ $sqlE2=mysql_query("select hrm_employee.EmployeeID,EmpCode,Fname,Sname,Lname from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee_general.EmployeeID=".$res2['EmployeeID2'], $con); $resE2=mysql_fetch_assoc($sqlE2); ?>
<option style="background-color:#A4FFA4;padding:1px;" value="<?php echo $res2['EmployeeID']; ?>" selected><?php echo ucwords(strtolower($resE2['Fname'].' '.$resE2['Sname'].' '.$resE2['Lname'])); ?></option><?php } else { ?><option style="background-color:#FFFFFF;padding:1px;" value="0" selected>&nbsp;SELECT USER</option><?php } ?>
<?php $sqlEE=mysql_query("select hrm_employee.EmployeeID,EmpCode,Fname,Sname,Lname from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee_general.DepartmentId=7 order by Fname ASC", $con); while($resEE=mysql_fetch_assoc($sqlEE)) 
{ ?><option value="<?php echo $resEE['EmployeeID']; ?>" style="padding:1px;">&nbsp;<?php echo ucwords(strtolower($resEE['Fname'].' '.$resEE['Sname'].' '.$resEE['Lname'])); ?></option><?php } ?>
<option style="background-color:#FFFFFF;padding:1px;" value="0">&nbsp;None</option></select></td>

<td class="font2" align="center"><select style="width:200px;font-size:13px;font-family:Georgia;height:22px; background-color:<?php if($res2['EmployeeID3']>0){echo '#9DFF3C';} ?>;" id="EStid3_<?php echo $res['StateId']; ?>" onChange="FunChangeSEmp3(this.value,<?php echo $res['StateId']; ?>)">
<?php if($res2['EmployeeID3']>0){ $sqlE3=mysql_query("select hrm_employee.EmployeeID,EmpCode,Fname,Sname,Lname from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee_general.EmployeeID=".$res2['EmployeeID3'], $con); $resE3=mysql_fetch_assoc($sqlE3); ?>
<option style="background-color:#A4FFA4;padding:1px; " value="<?php echo $res3['EmployeeID']; ?>" selected><?php echo ucwords(strtolower($resE3['Fname'].' '.$resE3['Sname'].' '.$resE3['Lname'])); ?></option><?php } else { ?><option style="background-color:#FFFFFF;padding:1px;" value="0" selected>&nbsp;SELECT USER</option><?php } ?>
<?php $sqlEEE=mysql_query("select hrm_employee.EmployeeID,EmpCode,Fname,Sname,Lname from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee_general.DepartmentId=7 order by Fname ASC", $con); while($resEEE=mysql_fetch_assoc($sqlEEE)) 
{ ?><option value="<?php echo $resEEE['EmployeeID']; ?>" style="padding:1px;">&nbsp;<?php echo ucwords(strtolower($resEEE['Fname'].' '.$resEEE['Sname'].' '.$resEEE['Lname'])); ?></option><?php } ?>
<option style="background-color:#FFFFFF;padding:1px;" value="0">&nbsp;None</option></select></td>

<td class="font2" align="center"><select style="width:200px;font-size:13px;font-family:Georgia;height:22px; background-color:<?php if($res2['EmployeeID4']>0){echo '#9DFF3C';} ?>;" id="EStid4_<?php echo $res['StateId']; ?>" onChange="FunChangeSEmp4(this.value,<?php echo $res['StateId']; ?>)">
<?php if($res2['EmployeeID4']>0){ $sqlE4=mysql_query("select hrm_employee.EmployeeID,EmpCode,Fname,Sname,Lname from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee_general.EmployeeID=".$res2['EmployeeID4'], $con); $resE4=mysql_fetch_assoc($sqlE4); ?>
<option style="background-color:#A4FFA4;padding:1px; " value="<?php echo $res4['EmployeeID']; ?>" selected><?php echo ucwords(strtolower($resE4['Fname'].' '.$resE4['Sname'].' '.$resE4['Lname'])); ?></option><?php } else { ?><option style="background-color:#FFFFFF;padding:1px;" value="0" selected>&nbsp;SELECT USER</option><?php } ?>
<?php $sqlEE4=mysql_query("select hrm_employee.EmployeeID,EmpCode,Fname,Sname,Lname from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee_general.DepartmentId=7 order by Fname ASC", $con); while($resEE4=mysql_fetch_assoc($sqlEE4)) 
{ ?><option value="<?php echo $resEE4['EmployeeID']; ?>" style="padding:1px;">&nbsp;<?php echo ucwords(strtolower($resEE4['Fname'].' '.$resEE4['Sname'].' '.$resEE4['Lname'])); ?></option><?php } ?>
<option style="background-color:#FFFFFF;padding:1px;" value="0">&nbsp;None</option></select></td>

</tr>
<?php $no++;} ?>
	  </table>
	 </td>
    </tr>
  </table>  
</td>
</tr>
</table>
	  </td>
	</tr>
  </table>
 </td>
</tr>
</table>
</body>
</html>
