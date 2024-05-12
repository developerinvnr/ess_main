<?php
require_once('config/config.php');
if(isset($_POST['EI']) && $_POST['EI']!="") 
{ 
$sqlL=mysql_query("select * from hrm_employee_confletter where Status='A' AND EmployeeID=".$_POST['EI'], $con);  $rowL=mysql_num_rows($sqlL);
if($rowL>0){ $resL=mysql_fetch_assoc($sqlL);
  $sqlUp=mysql_query("update hrm_employee_confletter set ConfDate='".date("Y-m-d", strtotime($_POST['DOC']))."', HrRemark='".$_POST['HRR']."', GradeId='".$_POST['NG']."', DesigId='".$_POST['ND']."', CreatedBy=".$_POST['U']." where Status='A' AND EmployeeID=".$_POST['EI'], $con); }
  if($sqlUp)
  { if($_POST['REC']==1){ $sqlUp2=mysql_query("update hrm_employee_general set DateConfirmation='".date("Y-m-d", strtotime($_POST['DOC']))."', ConfirmHR='Y' where EmployeeID=".$_POST['EI'], $con); }
    elseif($_POST['REC']==2){ $sqlUp2=mysql_query("update hrm_employee_general set ConfirmHR='YY' where EmployeeID=".$_POST['EI'], $con); }
  }
  if($sqlUp2){echo 'Data Save Successfully.....';}
}
?>