<?php 
if($_SESSION['login'] = true)
{ $YearId=$_SESSION['YearId']; $fromdate=date("Y",strtotime($_SESSION['fromdate'])); $todate=date("Y",strtotime($_SESSION['todate'])); 
  $Status1=$_SESSION['Company1Status']; $Status2=$_SESSION['Company2Status']; $Status3=$_SESSION['Company3Status'];
  $Status4=$_SESSION['Company4Status']; $Status5=$_SESSION['Company5Status']; $Status6=$_SESSION['Company6Status'];
  $EmpCode=$_SESSION['EmpCode'];  $EmployeeId=$_SESSION['EmployeeID']; $CompanyId=$_SESSION['CompanyId'];
   
  $sql=mysql_query("SELECT Fname,Sname,Lname,EmpType,EmpStatus,hrm_employee_general.*,hrm_employee_personal.*,hrm_employee_photo.* FROM hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID INNER JOIN hrm_employee_photo ON hrm_employee.EmployeeID=hrm_employee_photo.EmployeeID WHERE hrm_employee.EmployeeID=".$EmployeeId." AND EmpCode=".$EmpCode." ", $con); 
  $row = mysql_fetch_assoc($sql);
  
  if(mysql_num_rows($sql)==1) 
  { $_SESSION['Fname']=$row['Fname']; $_SESSION['Sname']=$row['Sname']; $_SESSION['Lname']=$row['Lname']; $_SESSION['EmpType']=$row['EmpType']; 
    $_SESSION['EmpStatus']=$row['EmpStatus']; $Ename=$_SESSION['Fname'].'&nbsp;'.$_SESSION['Sname'].'&nbsp;'.$_SESSION['Lname']; $_SESSION['HqId']=$row['HqId'];
	$_SESSION['DepartmentId']=$row['DepartmentId']; $_SESSION['DesigId']=$row['DesigId']; $_SESSION['GradeId']=$row['GradeId']; $_SESSION['Gender']=$row['Gender'];
	$_SESSION['DateJoining']=$row['DateJoining']; $_SESSION['DateConfirmation']=$row['DateConfirmation']; $_SESSION['DOB']=$row['DOB'];
	$_SESSION['CostCenter']=$row['CostCenter']; $_SESSION['Married']=$row['Married'];
  }
}
?>
