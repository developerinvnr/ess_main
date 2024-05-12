<?php
require_once('config/config.php');
include('codeEncDec.php');
if(isset($_POST['id']) && $_POST['id']!="")
{ $id = $_POST['id']; 
  if($_POST['p1']==$_POST['p2']) 
     {$CHpass=encrypt($_POST['p1']); 
	  $SqlUpdate=mysql_query("UPDATE hrm_employee SET EmpPass ='".$CHpass."' where EmployeeID=".$id, $con); 
      if($SqlUpdate) 
      { 
       $SqlSelect=mysql_query("select Fname,Sname,Lname from hrm_employee where EmployeeID=".$id, $con);  $ResSelect=mysql_fetch_assoc($SqlSelect); 
	   $ename=$ResSelect['Fname'].' '.$ResSelect['Sname'].' '.$ResSelect['Lname']; 	  
	   echo "Congratulations! You have successfully changed <font color='#2439CE'>".$ename." </font>password."; 
      }	else echo "<font color='#9D0000' style='font-family:Georgia; font-size:14px;'>try Again</font>";
     } 
} ?>	
