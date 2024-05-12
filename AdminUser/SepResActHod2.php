<?php require_once('../AdminUser/config/config.php'); ?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Action for Resignation</title>
<link rel="stylesheet" type="text/css" href="src/css/jscal2.css"/>
<link rel="stylesheet" type="text/css" href="src/css/border-radius.css"/>
<link rel="stylesheet" type="text/css" href="src/css/steel/steel.css"/>
<script type="text/javascript" src="src/js/jscal2.js"></script>
<script type="text/javascript" src="src/js/lang/en.js"></script>
<style> .InputText {font-family:Geneva, Arial, Helvetica, sans-serif;font-size:13px;width:80px;background-color:#FFFFD9;}
.InputText2 {font-family:Geneva, Arial, Helvetica, sans-serif;font-size:13px;width:80px;background-color:#E1FFE1;border-style:groove;}
.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}
.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;}</style>
</head>
<body bgcolor="#E0DBE3">
<center>
<table border="0" style="width:590px;">
<tr>
   <td style="width:590px;" valign="top" align="center">
<?php if($_REQUEST['act']!='' AND $_REQUEST['act']=='acthod')  { ?>	
<?php $sqlSE=mysql_query("select * from hrm_employee_separation where EmpSepId=".$_REQUEST['i'], $con); $resSE=mysql_fetch_assoc($sqlSE);
$sqlE=mysql_query("select EmpCode,Fname,Sname,Lname,DesigId,DepartmentId,DR,Gender,Married from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee.EmployeeID=".$resSE['EmployeeID'], $con); $resE=mysql_fetch_assoc($sqlE); 
$sqlDept=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$resE['DepartmentId'], $con); $resDept=mysql_fetch_assoc($sqlDept);
if($resE['DR']=='Y'){$M='Dr.';} elseif($resE['Gender']=='M'){$M='Mr.';} elseif($resE['Gender']=='F' AND $resE['Married']=='Y'){$M='Mrs.';} elseif($resE['Gender']=='F' AND $resE['Married']=='N'){$M='Miss.';}  $NameE=$M.' '.$resE['Fname'].' '.$resE['Sname'].' '.$resE['Lname']; 
?>	
<table border="0">
<tr>
  <td colspan="5" style="font-family:Geneva, Arial, Helvetica, sans-serif;color:#400000;font-size:16px;width:590px;" align="center">
  <b><?php if($_REQUEST['v']=='A'){echo 'RESIGNATION APPROVAL';}elseif($_REQUEST['v']=='C'){echo 'RESIGNATION REJECT';} ?></b>
  </td> 
</tr>
<tr>
 <td>
  <table style="width:580px;" border="1">
   <tr bgcolor="#FFFFFF">
    <td style="font-family:Geneva, Arial, Helvetica, sans-serif;font-size:12px;width:80px;">&nbsp;<b>EmpCode</b></td>
	<td align="" style="font-family:Geneva, Arial, Helvetica, sans-serif;font-size:13px;width:100px;">&nbsp;<?php echo $resE['EmpCode']; ?></td>
	<td style="font-family:Geneva, Arial, Helvetica, sans-serif;font-size:12px;width:150px;">&nbsp;<b>Name</b></td>
	<td style="font-family:Geneva, Arial, Helvetica, sans-serif;font-size:13px;width:250px;">&nbsp;<?php echo $NameE; ?></td>
   </tr>
   <tr bgcolor="#FFFFFF">
    <td style="font-family:Geneva, Arial, Helvetica, sans-serif;font-size:12px;width:80px;">&nbsp;<b>Department</b></td>
	<td align="" style="font-family:Geneva, Arial, Helvetica, sans-serif;font-size:13px;width:100px;">&nbsp;<?php echo $resDept['DepartmentCode']; ?></td>
	<td colspan="2" style="font-family:Geneva, Arial, Helvetica, sans-serif;font-size:12px;width:150px;">&nbsp;</td>
   </tr>
   <tr bgcolor="#FFFFFF">
    <td style="font-family:Geneva, Arial, Helvetica, sans-serif;font-size:13px;width:80px;">&nbsp;<b>Resignation</b></td>
	<td align="" style="font-family:Geneva, Arial, Helvetica, sans-serif;font-size:13px;width:100px;">&nbsp;<?php echo date("d-m-Y",strtotime($resSE['Emp_ResignationDate'])); ?></td>
	<td style="font-family:Geneva, Arial, Helvetica, sans-serif;font-size:13px;width:150px;">&nbsp;<b>Emp Relieving Date</b></td>
	<td style="font-family:Geneva, Arial, Helvetica, sans-serif;font-size:13px;width:250px;">&nbsp;<b><?php echo date("d-m-Y",strtotime($resSE['Emp_RelievingDate'])); ?></b></td>
   </tr>
   <tr><td colspan="4">&nbsp;</td></tr>
   <tr bgcolor="#FFFFFF">
    <td colspan="2" style="font-family:Geneva, Arial, Helvetica, sans-serif;font-size:13px;width:80px;">&nbsp;<b>Reporting Relieving Date</b></td>
	<td colspan="2" align="" style="font-family:Geneva, Arial, Helvetica, sans-serif;font-size:13px;width:100px;">&nbsp;<b><?php if($resSE['Rep_RelievingDate']!='' AND $resSE['Rep_RelievingDate']!='0000-00-00' AND $resSE['Rep_RelievingDate']!='1970-01-01'){echo '(1)&nbsp;'.date("d-m-Y",strtotime($resSE['Rep_RelievingDate']));} ?> <?php if($resSE['Rep_RelievingDate2']!='' AND $resSE['Rep_RelievingDate2']!='0000-00-00' AND $resSE['Rep_RelievingDate2']!='1970-01-01'){echo ', &nbsp;(2)&nbsp;'.date("d-m-Y",strtotime($resSE['Rep_RelievingDate2']));} ?> <?php if($resSE['Rep_RelievingDate3']!='' AND $resSE['Rep_RelievingDate3']!='0000-00-00' AND $resSE['Rep_RelievingDate3']!='1970-01-01'){echo ', &nbsp;(3)&nbsp;'.date("d-m-Y",strtotime($resSE['Rep_RelievingDate3']));} ?></b></td>
   </tr>
    <tr bgcolor="#FFFFFF">
    <td colspan="2" style="font-family:Geneva, Arial, Helvetica, sans-serif;font-size:13px;width:80px;">&nbsp;<b>Reporting Remark</b></td>
	<td colspan="2" align="" style="font-family:Geneva, Arial, Helvetica, sans-serif;font-size:13px;width:100px;">&nbsp;<?php echo $resSE['Rep_Remark']; ?></td>
   </tr>
   <tr><td colspan="4">&nbsp;</td></tr>
   <tr bgcolor="#FFFFFF">
    <td colspan="2" style="font-family:Geneva, Arial, Helvetica, sans-serif;font-size:13px;width:80px;">&nbsp;<b>Hod Relieving Date</b></td>
	<td colspan="2" align="" style="font-family:Geneva, Arial, Helvetica, sans-serif;font-size:13px;width:100px;">&nbsp;<b><?php if($resSE['ResignationStatus']>=3){ if($resSE['Hod_RelievingDate']!='' AND $resSE['Hod_RelievingDate']!='0000-00-00' AND $resSE['Hod_RelievingDate']!='1970-01-01'){echo '(1)&nbsp;'.date("d-m-Y",strtotime($resSE['Hod_RelievingDate']));} ?> <?php if($resSE['Hod_RelievingDate2']!='' AND $resSE['Hod_RelievingDate2']!='0000-00-00' AND $resSE['Hod_RelievingDate2']!='1970-01-01'){echo ', &nbsp;(2)&nbsp;'.date("d-m-Y",strtotime($resSE['Hod_RelievingDate2']));} ?> <?php if($resSE['Hod_RelievingDate3']!='' AND $resSE['Hod_RelievingDate3']!='0000-00-00' AND $resSE['Hod_RelievingDate3']!='1970-01-01'){echo ', &nbsp;(3)&nbsp;'.date("d-m-Y",strtotime($resSE['Hod_RelievingDate3']));} } ?></b></td>
   </tr>
    <tr bgcolor="#FFFFFF">
    <td colspan="2" style="font-family:Geneva, Arial, Helvetica, sans-serif;font-size:13px;width:80px;">&nbsp;<b>HOD Remark</b></td>
	<td colspan="2" align="" style="font-family:Geneva, Arial, Helvetica, sans-serif;font-size:13px;width:100px;">&nbsp;<?php echo $resSE['Hod_Remark']; ?></td>
   </tr>
	</table>
	</td>
   </tr>
  </table>
 </td>
</tr>



</table>
<?php } ?>	  
     </td>
</tr>
</table>
</center>
</body>
</html>
