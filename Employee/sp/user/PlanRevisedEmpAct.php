<?php require_once('config/config.php');
if($_POST['action']=='checkRev')
{ 
 $sql=mysql_query("select * from hrm_sales_revised_employee where EmployeeID=".$_POST['e']." AND Year=".$_POST['y']." AND Month=".$_POST['m']." AND Quarter=".$_POST['q'],$con); $row=mysql_num_rows($sql);
 if($row>0)
 {
  if($_POST['v']==1){ $sqlUp=mysql_query("update hrm_sales_revised_employee set Status='A' where EmployeeID=".$_POST['e']." AND Year=".$_POST['y']." AND Month=".$_POST['m']." AND Quarter=".$_POST['q'],$con); }
  if($_POST['v']==0){ $sqlUp=mysql_query("update hrm_sales_revised_employee set Status='D' where EmployeeID=".$_POST['e']." AND Year=".$_POST['y']." AND Month=".$_POST['m']." AND Quarter=".$_POST['q'],$con); } 
 }
 
 elseif($row==0 AND $_POST['v']==1)
 { 
   $sqlUp=mysql_query("insert into hrm_sales_revised_employee(EmployeeID,Month,Quarter,Year,Status) values(".$_POST['e'].", ".$_POST['m'].", ".$_POST['q'].", ".$_POST['y'].", 'A')",$con); 
 }
 
 if($sqlUp){ echo '<input type="hidden" id="sn" value="'.$_POST['sn'].'" /><input type="hidden" id="valuec" value="'.$_POST['v'].'" />'; }
 
}

?>