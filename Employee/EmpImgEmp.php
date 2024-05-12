<?php 
if($CompanyId!=''){ $ComId=$CompanyId; }else{ $ComId=$resE['CompanyId']; }

$SqlE=mysql_query("SELECT EmpCode FROM hrm_employee WHERE EmployeeID=".$EmployeeId." AND Companyid=".$ComId,$con);
$Emp=mysql_fetch_assoc($SqlE); 

if($EmployeeId!=944 AND $EmployeeId!=945)
{ 
 echo '<img width="105px" height="125px" src="../AdminUser/EmpImg'.$CompanyId.'Emp/'.$Emp['EmpCode'].'.jpg" border="1" />'; 
}
elseif($EmployeeId==944 OR $EmployeeId==945)
{
 echo '<img width="105px" height="125px" src="../AdminUser/EmpImg'.$CompanyId.'Emp/'.$Emp['EmpCode'].'_NewEmp.jpg" border="1" />';
}

/*
$SqlE=mysql_query("SELECT EmpCode FROM hrm_employee WHERE EmployeeID=".$EmployeeId." AND Companyid=".$ComId,$con);
$Emp=mysql_fetch_assoc($SqlE); 
echo '<img width="105px" height="125px" src="../AdminUser/EmpImg'.$CompanyId.'Emp/'.$Emp['EmpCode'].'.jpg" border="1" />'; 
*/
?>
  