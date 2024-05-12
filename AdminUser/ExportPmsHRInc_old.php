<?php 
require_once('config/config.php');
date_default_timezone_set('Asia/Calcutta');
$sY=mysql_query("select * from hrm_year where YearId=".$_REQUEST['YI']."", $con); $rY=mysql_fetch_assoc($sY); 
$FD=date("Y",strtotime($rY['FromDate'])); $TD=date("Y",strtotime($rY['ToDate'])); $MY=$FD-1;  $PRD=$FD.'-'.$TD;
/*************************************************************************************************************/
if($_REQUEST['YI']==1){$Y=2012;}elseif($_REQUEST['YI']==2){$Y=2013;}elseif($_REQUEST['YI']==3){$Y=2014;}elseif($_REQUEST['YI']==4){$Y=2015;}elseif($_REQUEST['YI']==5){$Y=2016;}elseif($_REQUEST['YI']==6){$Y=2017;}elseif($_REQUEST['YI']==7){$Y=2018;}elseif($_REQUEST['YI']==8){$Y=2019;}elseif($_REQUEST['YI']==9){$Y=2020;}elseif($_REQUEST['YI']==10){$Y=2021;}elseif($_REQUEST['YI']==11){$Y=2022;}


if($_REQUEST['action']='HRIncExport') 
{ 
 if($_REQUEST['ee']=='Dept')
{ $name='Department_Wise'; 
  if($_REQUEST['value']!=0)
  { $sqlA=mysql_query("select DepartmentName from hrm_department where DepartmentId=".$_REQUEST['value'], $con); $resA=mysql_fetch_assoc($sqlA); $name2=$resA['DepartmentName']; }
  else{$name2='All_Department';}
}
elseif($_REQUEST['ee']=='App')
{ $name='Apraiser_Wise';
  $sqlA=mysql_query("select Fname,Sname,Lname from hrm_employee where EmployeeId=".$_REQUEST['value'], $con); $resA=mysql_fetch_assoc($sqlA); 
  $name2=$resA['Fname'].'_'.$resA['Sname'].'_'.$resA['Lname'];
}
elseif($_REQUEST['ee']=='Rev')
{ $name='Reviewer_Wise';
  $sqlA=mysql_query("select Fname,Sname,Lname from hrm_employee where EmployeeId=".$_REQUEST['value'], $con); $resA=mysql_fetch_assoc($sqlA); 
  $name2=$resA['Fname'].'_'.$resA['Sname'].'_'.$resA['Lname'];
}
elseif($_REQUEST['ee']=='Hod')
{ $name='HOD_Wise';
  $sqlA=mysql_query("select Fname,Sname,Lname from hrm_employee where EmployeeId=".$_REQUEST['value'], $con); $resA=mysql_fetch_assoc($sqlA); 
  $name2=$resA['Fname'].'_'.$resA['Sname'].'_'.$resA['Lname'];
}


$xls_filename = 'Full&Final_Increment_'.$PRD.'-'.$name2.'.xls';
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=$xls_filename");
header("Pragma: no-cache");
header("Expires: 0");
$sep = "\t"; 
echo "Sn\tEmpCode\tName\tDepartment\tGrade\tDesignation\tEmployee Score\tEmployee Rating\tPrevious Gross\tHR Score\tHR Rating\tHR Grade\tHR Designation\tPGSPM\t% PIS\tPSC\t% PSC\tTISPM\t% TISPM\tTPGSPM\tExtra Arrear";
print("\n");


if($_REQUEST['ee']=='Dept')
{  
  if($_REQUEST['value']==0)
  { $sql=mysql_query("select hrm_employee.*,Extra3Month,DateJoining,EmpPmsId,Emp_TotalFinalScore,Emp_TotalFinalRating,EmpCurrGrossPM,HR_CurrDesigId,HR_CurrGradeId,HR_Curr_DepartmentId,HR_Score,HR_Rating,HR_DepartmentId,HR_DesigId,HR_GradeId,HR_ProIncSalary,HR_Percent_ProIncSalary,HR_ProCorrSalary,HR_Percent_ProCorrSalary,HR_IncNetMonthalySalary,HR_Percent_IncNetMonthalySalary,HR_GrossMonthlySalary,HR_GrossAnnualSalary,HR_CTC from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_pms ON hrm_employee.EmployeeID=hrm_employee_pms.EmployeeID where hrm_employee.CompanyId=".$_REQUEST['c']." AND hrm_employee.EmpStatus='A' AND hrm_employee_general.DateJoining<='".$Y."-06-30' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.Appraiser_EmployeeID!=0 order by EmpCode ASC", $con); }
  else{ $sql=mysql_query("select hrm_employee.*,Extra3Month,DateJoining,EmpPmsId,Emp_TotalFinalScore,Emp_TotalFinalRating,EmpCurrGrossPM,HR_CurrDesigId,HR_CurrGradeId,HR_Curr_DepartmentId,HR_Score,HR_Rating,HR_DepartmentId,HR_DesigId,HR_GradeId,HR_ProIncSalary,HR_Percent_ProIncSalary,HR_ProCorrSalary,HR_Percent_ProCorrSalary,HR_IncNetMonthalySalary,HR_Percent_IncNetMonthalySalary,HR_GrossMonthlySalary,HR_GrossAnnualSalary,HR_CTC from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_pms ON hrm_employee.EmployeeID=hrm_employee_pms.EmployeeID where hrm_employee.CompanyId=".$_REQUEST['c']." AND hrm_employee.EmpStatus='A' AND hrm_employee_general.DateJoining<='".$Y."-06-30' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_general.DepartmentId=".$_REQUEST['value']." AND hrm_employee_pms.Appraiser_EmployeeID!=0 order by EmpCode ASC", $con); }
}
elseif($_REQUEST['ee']=='App')
{ $sql=mysql_query("select hrm_employee.*,Extra3Month,DateJoining,EmpPmsId,Emp_TotalFinalScore,Emp_TotalFinalRating,EmpCurrGrossPM,HR_CurrDesigId,HR_CurrGradeId,HR_Curr_DepartmentId,HR_Score,HR_Rating,HR_DepartmentId,HR_DesigId,HR_GradeId,HR_ProIncSalary,HR_Percent_ProIncSalary,HR_ProCorrSalary,HR_Percent_ProCorrSalary,HR_IncNetMonthalySalary,HR_Percent_IncNetMonthalySalary,HR_GrossMonthlySalary,HR_GrossAnnualSalary,HR_CTC from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_pms ON hrm_employee.EmployeeID=hrm_employee_pms.EmployeeID where hrm_employee.CompanyId=".$_REQUEST['c']." AND hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.Appraiser_EmployeeID=".$_REQUEST['value']." AND hrm_employee_pms.Appraiser_EmployeeID!=0 order by EmpCode ASC", $con);
}
elseif($_REQUEST['ee']=='Rev')
{ $sql=mysql_query("select hrm_employee.*,Extra3Month,DateJoining,EmpPmsId,Emp_TotalFinalScore,Emp_TotalFinalRating,EmpCurrGrossPM,HR_CurrDesigId,HR_CurrGradeId,HR_Curr_DepartmentId,HR_Score,HR_Rating,HR_DepartmentId,HR_DesigId,HR_GradeId,HR_ProIncSalary,HR_Percent_ProIncSalary,HR_ProCorrSalary,HR_Percent_ProCorrSalary,HR_IncNetMonthalySalary,HR_Percent_IncNetMonthalySalary,HR_GrossMonthlySalary,HR_GrossAnnualSalary,HR_CTC from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_pms ON hrm_employee.EmployeeID=hrm_employee_pms.EmployeeID where hrm_employee.CompanyId=".$_REQUEST['c']." AND hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.Reviewer_EmployeeID=".$_REQUEST['value']." AND hrm_employee_pms.Appraiser_EmployeeID!=0 order by EmpCode ASC", $con);
}
elseif($_REQUEST['ee']=='Hod')
{ $sql=mysql_query("select hrm_employee.*,Extra3Month,DateJoining,EmpPmsId,Emp_TotalFinalScore,Emp_TotalFinalRating,EmpCurrGrossPM,HR_CurrDesigId,HR_CurrGradeId,HR_Curr_DepartmentId,HR_Score,HR_Rating,HR_DepartmentId,HR_DesigId,HR_GradeId,HR_ProIncSalary,HR_Percent_ProIncSalary,HR_ProCorrSalary,HR_Percent_ProCorrSalary,HR_IncNetMonthalySalary,HR_Percent_IncNetMonthalySalary,HR_GrossMonthlySalary,HR_GrossAnnualSalary,HR_CTC from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_pms ON hrm_employee.EmployeeID=hrm_employee_pms.EmployeeID where hrm_employee.CompanyId=".$_REQUEST['c']." AND hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.HOD_EmployeeID=".$_REQUEST['value']." AND hrm_employee_pms.Appraiser_EmployeeID!=0 order by EmpCode ASC", $con);
}
 $Sno=1; while($res=mysql_fetch_array($sql)){ 
 $sqlDept=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$res['HR_Curr_DepartmentId'], $con); $resDept=mysql_fetch_assoc($sqlDept); 
 $sqlDesig=mysql_query("select DesigName,DesigCode from hrm_designation where DesigId=".$res['HR_CurrDesigId'], $con); $resDesig=mysql_fetch_assoc($sqlDesig);
 $sqlG=mysql_query("select GradeValue from hrm_grade where GradeId=".$res['HR_CurrGradeId'], $con);  $resG=mysql_fetch_assoc($sqlG);


  $schema_insert = "";
  $schema_insert .= $Sno.$sep;
  $schema_insert .= $res['EmpCode'].$sep;
  $schema_insert .= $res['Fname'].' '.$res['Sname'].' '.$res['Lname'].$sep;
  $schema_insert .= $resDept['DepartmentCode'].$sep; 
  $schema_insert .= $resG['GradeValue'].$sep; 
  $schema_insert .= $resDesig['DesigName'].$sep; 
  $schema_insert .= $res['Emp_TotalFinalScore'].$sep;
  $schema_insert .= $res['Emp_TotalFinalRating'].$sep; 
  $schema_insert .= $res['EmpCurrGrossPM'].$sep; 
  $schema_insert .= $res['HR_Score'].$sep;
  $schema_insert .= $res['HR_Rating'].$sep;
  if($res['HR_DesigId']!=$res['HR_CurrDesigId']){ $sqlDesigH=mysql_query("select DesigName,DesigCode from hrm_designation where DesigId=".$res['HR_DesigId']." AND CompanyId=".$_REQUEST['c'], $con); $resDesigH=mysql_fetch_assoc($sqlDesigH); $DesigH=$resDesigH['DesigName']; }else{$DesigH='';}
if($res['HR_GradeId']!=$res['HR_CurrGradeId']){ $sqlGH=mysql_query("select GradeValue from hrm_grade where GradeId=".$res['HR_GradeId']." AND CompanyId=".$_REQUEST['c'], $con); $resGH=mysql_fetch_assoc($sqlGH); $GradeH=$resGH['GradeValue']; }else{$GradeH='';}
  $schema_insert .= $GradeH.$sep; 
  $schema_insert .= $DesigH.$sep; 
  $schema_insert .= $res['HR_ProIncSalary'].$sep; 
  $schema_insert .= $res['HR_Percent_ProIncSalary'].$sep;
  $schema_insert .= $res['HR_ProCorrSalary'].$sep; 
  $schema_insert .= $res['HR_Percent_ProCorrSalary'].$sep; 
  $schema_insert .= $res['HR_IncNetMonthalySalary'].$sep; 
  $schema_insert .= $res['HR_Percent_IncNetMonthalySalary'].$sep;	
  $schema_insert .= $res['HR_GrossMonthlySalary'].$sep;
  $schema_insert .= $res['Extra3Month'].$sep;
			  
  $schema_insert = str_replace($sep."$", "", $schema_insert);
  $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
  $schema_insert .= "\t";
  print(trim($schema_insert));
  print "\n";
  $Sno++;
 }


 
}
?>