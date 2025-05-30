<?php require_once('config/config.php');
if(isset($_POST['Act']) && $_POST['Act']=="UpdatePolicy")
{
  
   $InsUp = mysql_query("update hrm_employee_eligibility_update set Status_Approved='Y', EligCreatedBy=".$_POST['uid']." where EmployeeID=".$_POST['empid'], $con);
  
  if($InsUp){ $result=1; }else{ $result=0; }
  echo '<input type="hidden" id="RstVal" value='.$result.' />';
  echo '<input type="hidden" id="TypeVal" value='.$_POST['t'].' />';
}
?>