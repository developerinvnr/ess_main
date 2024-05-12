<?php 
require_once('config/config.php');
$sY=mysql_query("select * from hrm_year where YearId=".$_REQUEST['Y']."", $con); $rY=mysql_fetch_assoc($sY); 
$FD=date("Y",strtotime($rY['FromDate'])); $TD=date("Y",strtotime($rY['ToDate'])); $MY=$FD-1;  $PRD=$MY.'-'.$FD;
 if($_REQUEST['Y']==1){$Y=2012; $yy=12;}elseif($_REQUEST['Y']==2){$Y=2013; $yy=13;}elseif($_REQUEST['Y']==3){$Y=2014; $yy=14;}elseif($_REQUEST['Y']==4){$Y=2015; $yy=15;}elseif($_REQUEST['Y']==5){$Y=2016; $yy=16;}elseif($_REQUEST['Y']==6){$Y=2017; $yy=17;}elseif($_REQUEST['Y']==7){$Y=2018; $yy=18;}elseif($_REQUEST['Y']==8){$Y=2019; $yy=19;}elseif($_REQUEST['Y']==9){$Y=2020; $yy=20;}
/*************************************************************************************************************/
if($_REQUEST['action']='ExportHistoryInc') 
{
$csv_output .= '"SNo",'; 
$csv_output .= '"EC",'; 
$csv_output .= '"Name",'; 
$csv_output .= '"Current Grade",'; 
$csv_output .= '"Proposed Grade",'; 
$csv_output .= '"Department",'; 
$csv_output .= '"Curr. Designation",'; 
$csv_output .= '"Pro. Designation",'; 
$csv_output .= '"Change Date",'; 
$csv_output .= '"Basic",'; 
$csv_output .= '"Stipend",'; 
$csv_output .= '"HRA",'; 
$csv_output .= '"CA",'; 
$csv_output .= '"VA",'; 
$csv_output .= '"SA",'; 
$csv_output .= '"PI",'; 
$csv_output .= '"IBM",'; 
$csv_output .= '"Pre. GrossPM",'; 
$csv_output .= '"Curr. GrossPM",'; 
$csv_output .= '"Pro. GrossPM",'; 	
$csv_output .= '"Bonus",'; 
$csv_output .= '"Percent Pro. GrossPM",'; 
$csv_output .= '"Correction",'; 
$csv_output .= '"(%)Total Pro. GrossPM",'; 
$csv_output .= '"(%)Total Pro. GrossPM",'; 
$csv_output .= '"Incentive",'; 
$csv_output .= '"Score",'; 
$csv_output .= '"Rating",'; 
$csv_output .= "\n";		

# Get Users Details form the DB #$result = mysql_query("SELECT * from formResults WHERE formID = '$formID'" );
$sql=mysql_query("select * from hrm_pms_appraisal_history where CompanyId=".$_REQUEST['C']." order by EmpCode ASC, SalaryChange_Date ASC", $con); 
       $Sno=1; while($res=mysql_fetch_array($sql)){ 
	   $sqlCheck=mysql_query("select EmpStatus from hrm_employee where EmpCode=".$res['EmpCode'], $con); $resCheck=mysql_fetch_assoc($sqlCheck);
	   if($resCheck['EmpStatus']=='A'){
if($res['SalaryChange_Date']<$Y.'-10-01'){   
$sqlE=mysql_query("select Fname, Sname, Lname from hrm_employee where EmpCode=".$res['EmpCode'], $con); $resE=mysql_fetch_assoc($sqlE);
$csv_output .= '"'.str_replace('"', '""', $Sno).'",';
$csv_output .= '"'.str_replace('"', '""', $res['EmpCode']).'",';

if($resE['Sname']==''){ $Ename=trim($resE['Fname']).' '.trim($resE['Lname']); }
else{ $Ename=trim($resE['Fname']).' '.trim($resE['Sname']).' '.trim($resE['Lname']); }
$csv_output .= '"'.str_replace('"', '""', $Ename).'",';
//$csv_output .= '"'.str_replace('"', '""', $resE['Fname'].' '.$resE['Sname'].' '.$resE['Lname']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['Current_Grade']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['Proposed_Grade']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['Department']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['Current_Designation']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['Proposed_Designation']).'",';
$csv_output .= '"'.str_replace('"', '""', date("d-M-y",strtotime($res['SalaryChange_Date']))).'",';	
$csv_output .= '"'.str_replace('"', '""', $res['Salary_Basic']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['Salary_Stipend']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['Salary_HRA']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['Salary_CA']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['Salary_VA']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['Salary_SA']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['Salary_PI']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['Industry_Bench_Markinge']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['Previous_GrossSalaryPM']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['Current_GrossSalaryPM']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['Proposed_GrossSalaryPM']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['BonusAnnual_September']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['Prop_PeInc_GSPM']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['PropSalary_Correction']).'",';	
$csv_output .= '"'.str_replace('"', '""', $res['TotalProp_GSPM']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['TotalProp_PerInc_GSPM']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['Incentive']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['Score']).'",';	
$csv_output .= '"'.str_replace('"', '""', $res['Rating']).'",';
$csv_output .= "\n";
}
if($res['SalaryChange_Date']>=$Y.'-10-01'){   
$sqlE=mysql_query("select Fname, Sname, Lname from hrm_employee where EmpCode=".$res['EmpCode'], $con); $resE=mysql_fetch_assoc($sqlE);
$csv_output .= '"'.str_replace('"', '""', $Sno).'",';
$csv_output .= '"'.str_replace('"', '""', $res['EmpCode']).'",';
$csv_output .= '"'.str_replace('"', '""', $resE['Fname'].' '.$resE['Sname'].' '.$resE['Lname']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['Current_Grade']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['Proposed_Grade']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['Department']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['Current_Designation']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['Proposed_Designation']).'",';
$csv_output .= '"'.str_replace('"', '""', date("d-M-y",strtotime($res['SalaryChange_Date']))).'",';	
$csv_output .= '"'.str_replace('"', '""', $res['Salary_Basic']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['Salary_Stipend']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['Salary_HRA']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['Salary_CA']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['Salary_VA']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['Salary_SA']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['Salary_PI']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['Industry_Bench_Markinge']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['Previous_GrossSalaryPM']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['Current_GrossSalaryPM']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['Proposed_GrossSalaryPM']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['BonusAnnual_September']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['Prop_PeInc_GSPM']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['PropSalary_Correction']).'",';	
$csv_output .= '"'.str_replace('"', '""', $res['TotalProp_GSPM']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['TotalProp_PerInc_GSPM']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['Incentive']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['Score']).'",';	
$csv_output .= '"'.str_replace('"', '""', $res['Rating']).'",';
$csv_output .= "\n";
}
if($res['SalaryChange_Date']>=$Y.'-10-01'){$csv_output .= "\n";}
} $Sno++;}


# Close the MySql connection
mysql_close($con);
# Set the headers so the file downloads
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Content-Length: " . strlen($csv_output));
header("Content-type: text/x-csv");
header("Content-Disposition: attachment; filename=Emp_Increment_History.csv");
echo $csv_output;
exit;
}

?>
