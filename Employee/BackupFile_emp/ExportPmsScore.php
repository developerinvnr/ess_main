<?php 
require_once('../AdminUser/config/config.php');
date_default_timezone_set('Asia/Calcutta');
$sY=mysql_query("select * from hrm_year where YearId=".$_REQUEST['YI']."", $con); $rY=mysql_fetch_assoc($sY); 
$FD=date("Y",strtotime($rY['FromDate'])); $TD=date("Y",strtotime($rY['ToDate'])); $MY=$FD-1;  $PRD=$FD.'-'.$TD;
/*************************************************************************************************************/
if($_REQUEST['YI']==1){$Y=2012; $yy=12;}elseif($_REQUEST['YI']==2){$Y=2013; $yy=13;}elseif($_REQUEST['YI']==3){$Y=2014; $yy=14;}elseif($_REQUEST['YI']==4){$Y=2015; $yy=15;}elseif($_REQUEST['YI']==5){$Y=2016; $yy=16;}elseif($_REQUEST['YI']==6){$Y=2017; $yy=17;}elseif($_REQUEST['YI']==7){$Y=2018; $yy=18;}elseif($_REQUEST['YI']==8){$Y=2019; $yy=19;}elseif($_REQUEST['YI']==9){$Y=2020; $yy=20;}elseif($_REQUEST['YI']==10){$Y=2021; $yy=21;}elseif($_REQUEST['YI']==11){$Y=2022; $yy=22;}
if($_REQUEST['YI']==1){$Y=2012; $Y2=2013;}elseif($_REQUEST['YI']==2){$Y=2013; $Y2=2014;}elseif($_REQUEST['YI']==3){$Y=2014; $Y2=2015;}elseif($_REQUEST['YI']==4){$Y=2015; $Y2=2016;}elseif($_REQUEST['YI']==5){$Y=2016; $Y2=2017;}elseif($_REQUEST['YI']==6){$Y=2017; $Y2=2018;}elseif($_REQUEST['YI']==7){$Y=2018; $Y2=2019;}elseif($_REQUEST['YI']==8){$Y=2019; $Y2=2020;}elseif($_REQUEST['YI']==9){$Y=2020; $Y2=2021;}elseif($_REQUEST['YI']==10){$Y=2021; $Y2=2022;}elseif($_REQUEST['YI']==11){$Y=2022; $Y2=2023;}

if($_REQUEST['action']='ExportScore') 
{ 
  $name='HOD_Wise';
  $sqlA=mysql_query("select Fname,Sname,Lname from hrm_employee where EmployeeId=".$_REQUEST['ee'], $con); $resA=mysql_fetch_assoc($sqlA); $name2=$resA['Fname'].'_'.$resA['Sname'].'_'.$resA['Lname'];


$xls_filename = 'Appraisal_Score/Rating_'.$PRD.'-'.$name2.'.xls';
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=$xls_filename");
header("Pragma: no-cache");
header("Expires: 0");
$sep = "\t"; 
echo "Sn\tEmpCode\tName\tDepartment\tDesignation\tGrade\tState\tHQ\tAppraiser\tReviewer\tHOD\tEmployee Score\tEmployee Rating\tAppraiser Score\tAppraiser Rating\tAppraiser Grade\tAppraiser Designation\tReviewer Score\tReviewer Rating\tReviewer Grade\tReviewer Designation\tManagement Score\tManagement Rating\tManagement Grade\tManagement Designation";
print("\n");

$sql=mysql_query("select e.EmployeeID, EmpCode, Fname, Sname, Lname, DepartmentCode, DesigName, DesigCode, GradeValue, HqName, g.HqId, EmpPmsId, Kra_filename, Kra_ext, Appraiser_EmployeeID, Reviewer_EmployeeID, Rev2_EmployeeID, Emp_TotalFinalScore, Emp_TotalFinalRating, Appraiser_TotalFinalScore, Appraiser_TotalFinalRating, Appraiser_EmpDesignation, Appraiser_EmpGrade, Reviewer_EmpDesignation, Reviewer_EmpGrade, Reviewer_TotalFinalScore, Reviewer_TotalFinalRating, Hod_TotalFinalScore, Hod_TotalFinalRating, Hod_EmpDesignation, Hod_EmpGrade, HR_DesigId, HR_GradeId, HR_CurrDesigId, HR_CurrGradeId, HR_Curr_DepartmentId, HR_Score, HR_Rating from hrm_employee_general g INNER JOIN hrm_employee e ON g.EmployeeID=e.EmployeeID INNER JOIN hrm_employee_pms p ON e.EmployeeID=p.EmployeeID INNER JOIN hrm_department d ON g.DepartmentId=d.DepartmentId INNER JOIN hrm_designation de ON g.DesigId=de.DesigId INNER JOIN hrm_grade gr ON g.GradeId=gr.GradeId INNER JOIN hrm_headquater hq ON g.HqId=hq.HqId 
    where e.EmpStatus='A' AND e.CompanyId=".$_REQUEST['c']." AND p.AssessmentYear=".$_REQUEST['YI']." AND p.HOD_EmployeeID=".$_REQUEST['ee']." order by e.EmpCode ASC", $con); 


 $Sno=1; while($res=mysql_fetch_array($sql))
 { 
 $sqlS=mysql_query("select StateName from hrm_state INNER JOIN hrm_headquater ON hrm_state.StateId=hrm_headquater.StateId where HqId=".$res['HqId'], $con); $resS=mysql_fetch_assoc($sqlS);
 
  $schema_insert = "";
  $schema_insert .= $Sno.$sep;
  $schema_insert .= $res['EmpCode'].$sep;
  $schema_insert .= $res['Fname'].' '.$res['Sname'].' '.$res['Lname'].$sep;		
  $schema_insert .= $res['DepartmentCode'].$sep;
  $schema_insert .= $res['DesigName'].$sep;
  $schema_insert .= $res['GradeValue'].$sep;
  $schema_insert .= $resS['StateName'].$sep;
  $schema_insert .= $res['HqName'].$sep;
  
  $sql3=mysql_query("select * from hrm_employee where EmployeeID=".$res['Appraiser_EmployeeID'], $con); 
  $sql4=mysql_query("select * from hrm_employee where EmployeeID=".$res['Reviewer_EmployeeID'], $con); 
  $sql5=mysql_query("select * from hrm_employee where EmployeeID=".$res['Rev2_EmployeeID'], $con); 
  $res3=mysql_fetch_assoc($sql3); $res4=mysql_fetch_assoc($sql4); $res5=mysql_fetch_assoc($sql5);
  
  $schema_insert .= strtoupper($res3['Fname'].' '.$res3['Sname'].' '.$res3['Lname']).$sep;		
  $schema_insert .= strtoupper($res4['Fname'].' '.$res4['Sname'].' '.$res4['Lname']).$sep;		
  $schema_insert .= strtoupper($res5['Fname'].' '.$res5['Sname'].' '.$res5['Lname']).$sep;
  
  $schema_insert .= $res['Emp_TotalFinalScore'].$sep;			  
  $schema_insert .= $res['Emp_TotalFinalRating'].$sep;
  
  $schema_insert .= $res['Appraiser_TotalFinalScore'].$sep;
  $schema_insert .= $res['Appraiser_TotalFinalRating'].$sep;
if($res['Appraiser_EmpDesignation']!=$res['HR_CurrDesigId']){ $sqlDesigA=mysql_query("select DesigName,DesigCode from hrm_designation where DesigId=".$res['Appraiser_EmpDesignation']." AND CompanyId=".$_REQUEST['c'],$con); $resDesig=mysql_fetch_assoc($sqlDesigA); $DesigA=$resDesig['DesigName']; }else{$DesigA='';}
if($res['Appraiser_EmpGrade']!=$res['HR_CurrGradeId']){ $sqlGA=mysql_query("select GradeValue from hrm_grade where GradeId=".$res['Appraiser_EmpGrade']." AND CompanyId=".$_REQUEST['c'], $con); $resGA=mysql_fetch_assoc($sqlGA); $GradeA=$resGA['GradeValue']; }else{$GradeA='';}
  $schema_insert .= $GradeA.$sep;
  $schema_insert .= $DesigA.$sep;
  
  $schema_insert .= $res['Reviewer_TotalFinalScore'].$sep;
  $schema_insert .= $res['Reviewer_TotalFinalRating'].$sep;
if($res['Reviewer_EmpDesignation']!=$res['HR_CurrDesigId']){ $sqlDesigR=mysql_query("select DesigName,DesigCode from hrm_designation where DesigId=".$res['Reviewer_EmpDesignation']." AND CompanyId=".$_REQUEST['c'], $con); $resDesigR=mysql_fetch_assoc($sqlDesigR); $DesigR=$resDesigR['DesigName']; }else{$DesigR='';}
if($res['Reviewer_EmpGrade']!=$res['HR_CurrGradeId']){ $sqlGR=mysql_query("select GradeValue from hrm_grade where GradeId=".$res['Reviewer_EmpGrade']." AND CompanyId=".$_REQUEST['c'], $con); $resGR=mysql_fetch_assoc($sqlGR); $GradeR=$resGR['GradeValue']; }else{$GradeR='';}
  $schema_insert .= $GradeR.$sep;
  $schema_insert .= $DesigR.$sep;
  
  $schema_insert .= $res['Hod_TotalFinalScore'].$sep;
  $schema_insert .= $res['Hod_TotalFinalRating'].$sep;
if($res['Hod_EmpDesignation']!=$res['HR_CurrDesigId']){ $sqlDesigH=mysql_query("select DesigName,DesigCode from hrm_designation where DesigId=".$res['Hod_EmpDesignation']." AND CompanyId=".$_REQUEST['c'], $con); $resDesigH=mysql_fetch_assoc($sqlDesigH); $DesigH=$resDesigH['DesigName']; }else{$DesigH='';}
if($res['Hod_EmpGrade']!=$res['HR_CurrGradeId']){ $sqlGH=mysql_query("select GradeValue from hrm_grade where GradeId=".$res['Hod_EmpGrade']." AND CompanyId=".$_REQUEST['c'], $con); $resGH=mysql_fetch_assoc($sqlGH); $GradeH=$resGH['GradeValue']; }else{$GradeH='';}  
  $schema_insert .= $GradeH.$sep;
  $schema_insert .= $DesigH.$sep;
  
  $schema_insert = str_replace($sep."$", "", $schema_insert);
  $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
  $schema_insert .= "\t";
  print(trim($schema_insert));
  print "\n";
  $Sno++;
 }

}
?>
