<?php require_once('../AdminUser/config/config.php'); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Resignation Reason</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet"/>
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<script>function printage() { document.getElementById("printspan").style.display='none'; window.print(); }</script>

<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" bgcolor="#D9D1E7">	
    
    <span id="printspan">
    <font style="font-size:12px;";>&nbsp;&nbsp;<a href="#" onClick="printage()"><font style="font-family:Times New Roman; font-size:12px;">Print</font></a></font>
    </span>
    <table style="vertical-align:top;" width="450" align="center" border="0">
	 <tr>
	  <td>
	  <table border="0">
<?php $sql=mysql_query("select Emp_ResignationDate,Emp_RelievingDate,Emp_Reason,EmpCode,Fname,Sname,Lname,DepartmentName,DesigName from hrm_employee_separation s INNER JOIN hrm_employee e ON s.EmployeeID=e.EmployeeID INNER JOIN hrm_employee_general g ON s.EmployeeID=g.EmployeeID INNER JOIN hrm_department d ON g.DepartmentId=d.DepartmentId INNER JOIN hrm_designation de ON g.DesigId=de.DesigId where s.EmpSepId=".$_REQUEST['id'], $con); $res=mysql_fetch_assoc($sql); 
?>		   
	   <tr><td colspan="2" width="450" align="center" valign="top" style="font-family:Times New Roman;font-size:16px;"><b>Resignation Reason/Details</b></td></tr>
	   <tr><td>&nbsp;</td></tr>
	   <tr>
	    <td style="margin-left:5px;font-family:Times New Roman;font-size:15px;">
		 <b>Code:</b>&nbsp;&nbsp;<?php echo $res['EmpCode'];?><br>
		 <b>Name:</b>&nbsp;&nbsp;<?php echo $res['Fname'].' '.$res['Sname'].' '.$res['Lname'];?><br>
		 <b>Department:</b>&nbsp;&nbsp;<?php echo $res['DepartmentName'];?><br>
		 <b>Designation:</b>&nbsp;&nbsp;<?php echo $res['DesigName'];?><br>
		 <b>Resignation Date:</b>&nbsp;&nbsp;<?php echo date("d-m-Y",strtotime($res['Emp_ResignationDate']));?><br>
		 <b>Expected Relieving Date:</b>&nbsp;&nbsp;<?php echo date("d-m-Y",strtotime($res['Emp_RelievingDate'])); ?>
		</td>
	   </tr>
	   <tr><td>&nbsp;</td></tr>
	   <tr><td colspan="2" style="width:450px; margin-left:5px; margin-right:5px;font-family:Times New Roman;color:#0D3039;font-size:15px; vertical-align:top;">
	   <b>Reason:</b>&nbsp;&nbsp;<?php echo $res['Emp_Reason']; ?></td></tr>
	 </table>
	  </td>
	</tr>
  </table>
</body>
</html>
