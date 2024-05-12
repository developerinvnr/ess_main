<?php 
  $YearId=$_SESSION['YearId']; $fromdate=date("Y",strtotime($_SESSION['fromdate'])); $todate=date("Y",strtotime($_SESSION['todate'])); 
  $Status1=$_SESSION['Company1Status']; $Status2=$_SESSION['Company2Status']; $Status3=$_SESSION['Company3Status'];
  $Status4=$_SESSION['Company4Status']; $Status5=$_SESSION['Company5Status']; $Status6=$_SESSION['Company6Status'];
  $EmpCode=$_SESSION['EmpCode'];  $EmployeeId=$_SESSION['EmployeeID']; $CompanyId=$_SESSION['CompanyId'];
   
  $Fname=$_SESSION['Fname']; $Sname=$_SESSION['Sname']; $Lname=$_SESSION['Lname']; $EmpType=$_SESSION['EmpType']; 
  $EmpStatus=$_SESSION['EmpStatus']; $Ename=$_SESSION['Fname'].'&nbsp;'.$_SESSION['Sname'].'&nbsp;'.$_SESSION['Lname']; $HqId=$_SESSION['HqId'];
  $DepartmentId=$_SESSION['DepartmentId']; $DesigId=$_SESSION['DesigId']; $GradeId=$_SESSION['GradeId']; $Gender=$_SESSION['Gender'];
  $DateJoining=$_SESSION['DateJoining']; $DateConfirmation=$_SESSION['DateConfirmation']; $DOB=$_SESSION['DOB'];
  $CostCenter=$_SESSION['CostCenter']; $Married=$_SESSION['Married'];
  if($_SESSION['login']!= true){header('Location:../index.php');} 
?>
