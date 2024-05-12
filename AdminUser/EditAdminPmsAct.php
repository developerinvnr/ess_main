<?php require_once('config/config.php'); 

if($_POST['act']=='hodcal')
{ $sqlup=mysql_query("update hrm_employee_pms set Hod_TotalFinalScore=".$_POST['s'].", Hod_TotalFinalRating=".$_POST['r'].", Hod_EmpGrade=".$_POST['g'].", Hod_EmpDesignation=".$_POST['d'].", Hod_ProIncSalary=".$_POST['pis'].", Hod_Percent_ProIncSalary=".$_POST['ppis'].", Hod_ProCorrSalary=".$_POST['pcs'].", Hod_Percent_ProCorrSalary=".$_POST['ppcs'].", Hod_IncNetMonthalySalary=".$_POST['inms'].", Hod_Percent_IncNetMonthalySalary=".$_POST['pinms'].", Hod_GrossMonthlySalary=".$_POST['gms']." where EmpPmsId=".$_POST['pmsid']." AND EmployeeID=".$_POST['eid'],$con); 
  if($sqlup){ echo '<input type="hidden" id="hodsn" value="'.$_POST['sn'].'"/>';  echo ''; } 
}

elseif($_POST['act']=='hrcal')
{ ;$sqlup=mysql_query("update hrm_employee_pms set HR_Score=".$_POST['s'].", HR_Rating=".$_POST['r'].", HR_GradeId=".$_POST['g'].", HR_DesigId=".$_POST['d'].", HR_ProIncSalary=".$_POST['pis'].", HR_Percent_ProIncSalary=".$_POST['ppis'].", HR_ProCorrSalary=".$_POST['pcs'].", HR_Percent_ProCorrSalary=".$_POST['ppcs'].", HR_IncNetMonthalySalary=".$_POST['inms'].", HR_Percent_IncNetMonthalySalary=".$_POST['pinms'].", HR_GrossMonthlySalary=".$_POST['gms']." where EmpPmsId=".$_POST['pmsid']." AND EmployeeID=".$_POST['eid'],$con); 
  if($sqlup){ echo '<input type="hidden" id="hrsn" value="'.$_POST['sn'].'"/>'; echo ''; } 
}

elseif($_POST['act']=='appcal')
{ $sqlup=mysql_query("update hrm_employee_pms set Appraiser_TotalFinalScore=".$_POST['s'].", Appraiser_TotalFinalRating=".$_POST['r'].", Appraiser_EmpGrade=".$_POST['g'].", Appraiser_EmpDesignation=".$_POST['d']." where EmpPmsId=".$_POST['pmsid']." AND EmployeeID=".$_POST['eid'],$con); 
  if($sqlup){ echo '<input type="hidden" id="asn" value="'.$_POST['sn'].'"/>';  echo ''; } 
}

elseif($_POST['act']=='revcal')
{ $sqlup=mysql_query("update hrm_employee_pms set Reviewer_TotalFinalScore=".$_POST['s'].", Reviewer_TotalFinalRating=".$_POST['r'].", Reviewer_EmpGrade=".$_POST['g'].", Reviewer_EmpDesignation=".$_POST['d']." where EmpPmsId=".$_POST['pmsid']." AND EmployeeID=".$_POST['eid'],$con); 
  if($sqlup){ echo '<input type="hidden" id="rsn" value="'.$_POST['sn'].'"/>'; echo ''; } 
}


?>