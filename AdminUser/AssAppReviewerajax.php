<?php
require_once('config/config.php');

if(isset($_POST['For']) && $_POST['For']=='UpReporting' && $_POST['ei']!='')
{
	
	$Sql=mysql_query("update hrm_employee_pms set Appraiser_EmployeeID=".$_POST['app'].", AppraiserType='E', Reviewer_EmployeeID=".$_POST['rev'].", ReviewerType='E', Rev2_EmployeeID=".$_POST['hod'].", HOD_EmployeeID=".$_POST['mng']." where AssessmentYear=".$_POST['yi']." AND CompanyId=".$_POST['ci']." AND EmployeeID=".$_POST['ei'], $con);
  
    $Sql2=mysql_query("update hrm_employee_reporting_pmskra set AppraiserId=".$_POST['app'].", ReviewerId=".$_POST['rev'].", Reviewer2Id=".$_POST['hod'].", HodId=".$_POST['mng']." where EmployeeID=".$_POST['ei'], $con);
	
	echo '<input type="hidden" name="SnV" id="SnV" value="'.$_POST['i'].'"/>';
    if($Sql || $Sql2)
	{
	 echo '<input type="hidden" name="ChkV" id="ChkV" value="1"/>';
	}	
	else
	{
	 echo '<input type="hidden" name="ChkV" id="ChkV" value="0"/>';
	}
	   
} 
?>
