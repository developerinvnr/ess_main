<?php 
require_once('config/config.php');
date_default_timezone_set('Asia/Calcutta');
$sY=mysql_query("select * from hrm_year where YearId=".$_REQUEST['YI']."", $con); $rY=mysql_fetch_assoc($sY); 
$FD=date("Y",strtotime($rY['FromDate'])); $TD=date("Y",strtotime($rY['ToDate'])); $MY=$FD-1;  $PRD=$FD.'-'.$TD;
/*************************************************************************************************************/
if($_REQUEST['YI']==1){$Y=2012;}elseif($_REQUEST['YI']==2){$Y=2013;}elseif($_REQUEST['YI']==3){$Y=2014;}elseif($_REQUEST['YI']==4){$Y=2015;}elseif($_REQUEST['YI']==5){$Y=2016;}elseif($_REQUEST['YI']==6){$Y=2017;}elseif($_REQUEST['YI']==7){$Y=2018;}elseif($_REQUEST['YI']==8){$Y=2019;}elseif($_REQUEST['YI']==9){$Y=2020;}elseif($_REQUEST['YI']==10){$Y=2021;}elseif($_REQUEST['YI']==11){$Y=2022;}elseif($_REQUEST['YI']==12){$Y=2023;}elseif($_REQUEST['YI']==13){$Y=2024;}elseif($_REQUEST['YI']==14){$Y=2025;}elseif($_REQUEST['YI']==15){$Y=2026;}elseif($_REQUEST['YI']==16){$Y=2027;}elseif($_REQUEST['YI']==18){$Y=2029;}elseif($_REQUEST['YI']==19){$Y=2030;}

if($_REQUEST['action']='ScoreExport') 
{ 
 if($_REQUEST['ee']=='Dept')
{ $name='Department Wise'; 
  if($_REQUEST['value']!=0)
  { $sqlA=mysql_query("select department_code as DepartmentName from core_departments where id=".$_REQUEST['value'], $con); $resA=mysql_fetch_assoc($sqlA); $name2=$resA['DepartmentName']; }else{$name2='All_Department';}
}
elseif($_REQUEST['ee']=='App')
{ $name='Apraiser_Wise';
  $sqlA=mysql_query("select Fname,Sname,Lname from hrm_employee where EmployeeId=".$_REQUEST['value'], $con); $resA=mysql_fetch_assoc($sqlA); $name2=$resA['Fname'].'_'.$resA['Sname'].'_'.$resA['Lname'];
}
elseif($_REQUEST['ee']=='Rev')
{ $name='Reviewer_Wise';
  $sqlA=mysql_query("select Fname,Sname,Lname from hrm_employee where EmployeeId=".$_REQUEST['value'], $con); $resA=mysql_fetch_assoc($sqlA); $name2=$resA['Fname'].'_'.$resA['Sname'].'_'.$resA['Lname'];
}
elseif($_REQUEST['ee']=='Hod')
{ $name='HOD_Wise';
  $sqlA=mysql_query("select Fname,Sname,Lname from hrm_employee where EmployeeId=".$_REQUEST['value'], $con); $resA=mysql_fetch_assoc($sqlA); $name2=$resA['Fname'].'_'.$resA['Sname'].'_'.$resA['Lname'];
}
elseif($_REQUEST['ee']=='Rev2')
{ $name='HOD_Wise';
  $sqlA=mysql_query("select Fname,Sname,Lname from hrm_employee where EmployeeId=".$_REQUEST['value'], $con); $resA=mysql_fetch_assoc($sqlA); $name2=$resA['Fname'].'_'.$resA['Sname'].'_'.$resA['Lname'];
}

$xls_filename = 'Emp_PMS_Score/Rating_'.$PRD.'-'.$name2.'.xls';
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=$xls_filename");
header("Pragma: no-cache");
header("Expires: 0");
$sep = "\t"; 
echo "Sn\tEmpCode\tName\tDepartment\tDesignation\tGrade\tState\tHQ\tEmployee Score\tEmployee Rating\tAppraiser Score\tAppraiser Rating\tAppraiser Grade\tAppraiser Designation\tReviewer Score\tReviewer Rating\tReviewer Grade\tReviewer Designation\tHOD Score\tHOD Rating\tHOD Grade\tHOD Designation\tFinal Score\tFinal Rating\tFinal Grade\tFinal Designation";
print("\n");

$qry="e.EmployeeID, EmpCode, Fname, Sname, Lname, g.HqId, g.TerrId, department_name, designation_name, grade_name, state_name, city_village_name, territory_name, EmpPmsId, Kra_filename, Kra_ext, Emp_TotalFinalScore, Emp_TotalFinalRating, Appraiser_TotalFinalScore, Appraiser_TotalFinalRating, Appraiser_EmpDesignation, Appraiser_EmpGrade, Reviewer_EmpDesignation, Reviewer_EmpGrade, Reviewer_TotalFinalScore, Reviewer_TotalFinalRating, Hod_TotalFinalScore, Hod_TotalFinalRating, Hod_EmpDesignation, Hod_EmpGrade, HR_DesigId, HR_GradeId, HR_CurrDesigId, HR_CurrGradeId, HR_Curr_DepartmentId, HR_Score, HR_Rating from hrm_employee_general g INNER JOIN hrm_employee e ON g.EmployeeID=e.EmployeeID INNER JOIN hrm_employee_pms p ON e.EmployeeID=p.EmployeeID 
  left join core_departments dept on g.DepartmentId=dept.id
  left join core_designation desig on g.DesigId=desig.id
  left join core_grades gr on g.GradeId=gr.id
  left join core_city_village_by_state vlg on g.HqId=vlg.id
  left join core_territory Tr on g.TerrId=Tr.id
  left join core_states st on g.CostCenter=st.id";

if($_REQUEST['ee']=='Dept')
{  
  if($_REQUEST['value']==0)
  { $sql=mysql_query("select ".$qry." where e.CompanyId=".$_REQUEST['c']." AND e.EmpStatus='A' AND g.DateJoining<='".$Y."-06-30' AND p.AssessmentYear=".$_REQUEST['YI']." AND p.Appraiser_EmployeeID!=0 order by e.ECode ASC", $con); }
  else{ $sql=mysql_query("select ".$qry." where e.CompanyId=".$_REQUEST['c']." AND e.EmpStatus='A' AND g.DateJoining<='".$Y."-06-30' AND p.AssessmentYear=".$_REQUEST['YI']." AND p.Appraiser_EmployeeID!=0 AND p.HR_Curr_DepartmentId=".$_REQUEST['value']." order by e.ECode ASC", $con); }
}
elseif($_REQUEST['ee']=='App')
{ $sql=mysql_query("select ".$qry." where e.CompanyId=".$_REQUEST['c']." AND e.EmpStatus='A' AND g.DateJoining<='".$Y."-06-30' AND p.Appraiser_EmployeeID=".$_REQUEST['value']." AND p.AssessmentYear=".$_REQUEST['YI']." AND p.Appraiser_EmployeeID!=0 order by e.ECode ASC", $con); 
}
elseif($_REQUEST['ee']=='Rev')
{ $sql=mysql_query("select ".$qry." where e.CompanyId=".$_REQUEST['c']." AND e.EmpStatus='A' AND g.DateJoining<='".$Y."-06-30' AND p.Reviewer_EmployeeID=".$_REQUEST['value']." AND p.AssessmentYear=".$_REQUEST['YI']." AND p.Appraiser_EmployeeID!=0 order by e.ECode ASC", $con); 
}
elseif($_REQUEST['ee']=='Hod')
{ $sql=mysql_query("select ".$qry." where e.CompanyId=".$_REQUEST['c']." AND e.EmpStatus='A' AND g.DateJoining<='".$Y."-06-30' AND p.HOD_EmployeeID=".$_REQUEST['value']." AND p.AssessmentYear=".$_REQUEST['YI']." AND p.Appraiser_EmployeeID!=0 order by e.ECode ASC", $con); 
}
elseif($_REQUEST['ee']=='Rev2')
{ $sql=mysql_query("select ".$qry." where e.CompanyId=".$_REQUEST['c']." AND e.EmpStatus='A' AND g.DateJoining<='".$Y."-06-30' AND p.Rev2_EmployeeID=".$_REQUEST['value']." AND p.AssessmentYear=".$_REQUEST['YI']." AND p.Appraiser_EmployeeID!=0 order by e.ECode ASC", $con); 
}

 $Sno=1; while($res=mysql_fetch_array($sql))
 { 
 
  $schema_insert = "";
  $schema_insert .= $Sno.$sep;
  $schema_insert .= $res['EmpCode'].$sep;
  $schema_insert .= $res['Fname'].' '.$res['Sname'].' '.$res['Lname'].$sep;		
  $schema_insert .= $res['department_name'].$sep;
  $schema_insert .= $res['designation_name'].$sep;
  $schema_insert .= $res['grade_name'].$sep;
  $schema_insert .= $res['state_name'].$sep;
  if($res['TerrId']>0){$Hq=$res['territory_name'];}else{$Hq=$res['city_village_name']; }
  $schema_insert .= $Hq.$sep;
  $schema_insert .= $res['Emp_TotalFinalScore'].$sep;			  
  $schema_insert .= $res['Emp_TotalFinalRating'].$sep;
  
  $schema_insert .= $res['Appraiser_TotalFinalScore'].$sep;
  $schema_insert .= $res['Appraiser_TotalFinalRating'].$sep;
if($res['Appraiser_EmpDesignation']!=$res['HR_CurrDesigId']){ $sqlDesigA=mysql_query("select DesigName,DesigCode from hrm_designation where DesigId=".$res['Appraiser_EmpDesignation']." AND CompanyId=".$_REQUEST['c'],$con); $resDesig=mysql_fetch_assoc($sqlDesigA); $DesigA=$resDesig['DesigName']; }else{$DesigA='';}
if($res['Appraiser_EmpGrade']!=$res['HR_CurrGradeId']){ $sqlGA=mysql_query("select GradeValue from hrm_grade where GradeId=".$res['Appraiser_EmpGrade'], $con); $resGA=mysql_fetch_assoc($sqlGA); $GradeA=$resGA['GradeValue']; }else{$GradeA='';}
  $schema_insert .= $GradeA.$sep;
  $schema_insert .= $DesigA.$sep;
  
  $schema_insert .= $res['Reviewer_TotalFinalScore'].$sep;
  $schema_insert .= $res['Reviewer_TotalFinalRating'].$sep;
if($res['Reviewer_EmpDesignation']!=$res['HR_CurrDesigId']){ $sqlDesigR=mysql_query("select designation_name as DesigName,designation_code as DesigCode from core_designation where id=".$res['Reviewer_EmpDesignation']." AND CompanyId=".$_REQUEST['c'], $con); $resDesigR=mysql_fetch_assoc($sqlDesigR); $DesigR=$resDesigR['DesigName']; }else{$DesigR='';}
if($res['Reviewer_EmpGrade']!=$res['HR_CurrGradeId']){ $sqlGR=mysql_query("select grade_name as GradeValue from core_grade where id=".$res['Reviewer_EmpGrade'], $con); $resGR=mysql_fetch_assoc($sqlGR); $GradeR=$resGR['GradeValue']; }else{$GradeR='';}
  $schema_insert .= $GradeR.$sep;
  $schema_insert .= $DesigR.$sep;
  
  $schema_insert .= $res['Hod_TotalFinalScore'].$sep;
  $schema_insert .= $res['Hod_TotalFinalRating'].$sep;
if($res['Hod_EmpDesignation']!=$res['HR_CurrDesigId']){ $sqlDesigH=mysql_query("select designation_name as DesigName,designation_code as DesigCode from core_designation where id=".$res['Hod_EmpDesignation']." AND CompanyId=".$_REQUEST['c'], $con); $resDesigH=mysql_fetch_assoc($sqlDesigH); $DesigH=$resDesigH['DesigName']; }else{$DesigH='';}
if($res['Hod_EmpGrade']!=$res['HR_CurrGradeId']){ $sqlGH=mysql_query("select grade_name as GradeValue from core_grade where id=".$res['Hod_EmpGrade'], $con); $resGH=mysql_fetch_assoc($sqlGH); $GradeH=$resGH['GradeValue']; }else{$GradeH='';}  
  $schema_insert .= $GradeH.$sep;
  $schema_insert .= $DesigH.$sep;
  
  $schema_insert .= $res['HR_Score'].$sep;
  $schema_insert .= $res['HR_Rating'].$sep;
if($res['HR_DesigId']!=$res['HR_CurrDesigId']){ $sqlDesigHR=mysql_query("select designation_name as DesigName,designation_code as DesigCode from core_designation where id=".$res['HR_DesigId']." AND CompanyId=".$_REQUEST['c'], $con); $resDesigHR=mysql_fetch_assoc($sqlDesigHR); $DesigHR=$resDesigHR['DesigName']; }else{$DesigHR='';}
if($res['HR_GradeId']!=$res['HR_CurrGradeId']){ $sqlGHR=mysql_query("select grade_name as GradeValue from core_grade where id=".$res['HR_GradeId'], $con); $resGHR=mysql_fetch_assoc($sqlGHR); $GradeHR=$resGHR['GradeValue']; }else{$GradeHR='';}
  $schema_insert .= $GradeHR.$sep;
  $schema_insert .= $DesigHR.$sep;
  
  $schema_insert = str_replace($sep."$", "", $schema_insert);
  $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
  $schema_insert .= "\t";
  print(trim($schema_insert));
  print "\n";
  $Sno++;
 }

}
?>