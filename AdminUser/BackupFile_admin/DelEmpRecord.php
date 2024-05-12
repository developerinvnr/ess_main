<?php
require_once('config/config.php');
if(isset($_POST['id']) && $_POST['id']!="")
{ $id = $_POST['id']; 
  $SqlUpdate=mysql_query("UPDATE hrm_employee SET EmpStatus ='De' where EmployeeID=".$id, $con); 
      if($SqlUpdate) 
      { echo "Successfull........."; 
      }	else echo "<font color='#9D0000' style='font-family:Georgia; font-size:14px;'>try Again</font>";
     } 
 ?>	
