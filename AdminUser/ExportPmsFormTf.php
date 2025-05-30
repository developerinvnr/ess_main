<?php 
require_once('config/config.php');
date_default_timezone_set('Asia/Calcutta');
$sY=mysql_query("select * from hrm_year where YearId=".$_REQUEST['YI']."", $con); $rY=mysql_fetch_assoc($sY); 
$FD=date("Y",strtotime($rY['FromDate'])); $TD=date("Y",strtotime($rY['ToDate'])); $PRD=$FD.'-'.$TD;
/*************************************************************************************************************/
if($_REQUEST['YI']==1){$Y=2012;}elseif($_REQUEST['YI']==2){$Y=2013;}elseif($_REQUEST['YI']==3){$Y=2014;}elseif($_REQUEST['YI']==4){$Y=2015;}elseif($_REQUEST['YI']==5){$Y=2016;}elseif($_REQUEST['YI']==6){$Y=2017;}elseif($_REQUEST['YI']==7){$Y=2018;}elseif($_REQUEST['YI']==8){$Y=2019;}elseif($_REQUEST['YI']==9){$Y=2020;}elseif($_REQUEST['YI']==10){$Y=2021;}elseif($_REQUEST['YI']==11){$Y=2022;}elseif($_REQUEST['YI']==12){$Y=2023;}elseif($_REQUEST['YI']==13){$Y=2024;}elseif($_REQUEST['YI']==14){$Y=2025;}elseif($_REQUEST['YI']==15){$Y=2025;}


if($_REQUEST['action']='FormTfExport') 
{ 
 if($_REQUEST['ee']=='Dept')
{ $name='Department Wise'; 
  if($_REQUEST['value']!=0)
  { $sqlA=mysql_query("select department_code as DepartmentName from core_departments where id=".$_REQUEST['value'], $con); $resA=mysql_fetch_assoc($sqlA); $name2=$resA['DepartmentName']; }else{$name2='All_Department';}
}
  
$xls_filename = 'Employee_Trainig/Conference_'.$PRD.'-'.$name2.'.xls';
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=$xls_filename");
header("Pragma: no-cache");
header("Expires: 0");
$sep = "\t"; 
echo "Sn\tEmpCode\tName\tDepartment\tAppraiser Soft Skill\tSoft Skill2\tSoft Skill3\tSoft Skill4\tSoft Skill5\tAppraiser Technincal Skill\tTechnincal Skill2\tTechnincal Skill3\tTechnincal Skill4\tTechnincal Skill5\tReviewer Soft Skill\tSoft Skill2\tSoft Skill3\tSoft Skill4\tSoft Skill5\tReviewer Technincal Skill\tTechnincal Skill2\tTechnincal Skill3\tTechnincal Skill4\tTechnincal Skill5";
print("\n");   
  	

# Get Users Details form the DB #$result = mysql_query("SELECT * from formResults WHERE formID = '$formID'" );
if($_REQUEST['ee']=='Dept' AND $_REQUEST['a']==0)
{  
  if($_REQUEST['value']==0)
  { $sql=mysql_query("SELECT EmpCode,Fname,Sname,Lname,HR_Curr_DepartmentId,Appraiser_SoftSkill_1,Appraiser_SoftSkill_2,Appraiser_SoftSkill_3,Appraiser_SoftSkill_4,Appraiser_SoftSkill_5,Appraiser_TechSkill_1,Appraiser_TechSkill_2,Appraiser_TechSkill_3,Appraiser_TechSkill_4,Appraiser_TechSkill_5,Reviewer_SoftSkill_1,Reviewer_SoftSkill_2,Reviewer_SoftSkill_3,Reviewer_SoftSkill_4,Reviewer_SoftSkill_5, Reviewer_TechSkill_1, Reviewer_TechSkill_2,Reviewer_TechSkill_3,Reviewer_TechSkill_4,Reviewer_TechSkill_5, `Appraiser_SoftSkill_Oth`,`Appraiser_TechSkill_Oth`,`Reviewer_SoftSkill_Oth`, `Reviewer_TechSkill_Oth` from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID INNER JOIN hrm_employee_general g ON p.EmployeeID=g.EmployeeID WHERE p.CompanyId=".$_REQUEST['c']." AND p.Appraiser_TotalFinalScore>0 AND p.AssessmentYear=".$_REQUEST['YI']." AND g.DateJoining<='".$Y."-06-30' AND e.EmpCode<=11000 order by p.EmployeeID ASC", $con); }
  else{ $sql=mysql_query("SELECT EmpCode,Fname,Sname,Lname,HR_Curr_DepartmentId,Appraiser_SoftSkill_1,Appraiser_SoftSkill_2,Appraiser_SoftSkill_3,Appraiser_SoftSkill_4,Appraiser_SoftSkill_5,Appraiser_TechSkill_1,Appraiser_TechSkill_2,Appraiser_TechSkill_3,Appraiser_TechSkill_4,Appraiser_TechSkill_5,Reviewer_SoftSkill_1,Reviewer_SoftSkill_2,Reviewer_SoftSkill_3,Reviewer_SoftSkill_4,Reviewer_SoftSkill_5, Reviewer_TechSkill_1, Reviewer_TechSkill_2,Reviewer_TechSkill_3,Reviewer_TechSkill_4,Reviewer_TechSkill_5, `Appraiser_SoftSkill_Oth`,`Appraiser_TechSkill_Oth`,`Reviewer_SoftSkill_Oth`, `Reviewer_TechSkill_Oth` from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID INNER JOIN hrm_employee_general g ON p.EmployeeID=g.EmployeeID WHERE p.CompanyId=".$_REQUEST['c']." AND p.Appraiser_TotalFinalScore>0 AND p.AssessmentYear=".$_REQUEST['YI']." AND g.DateJoining<='".$Y."-06-30' AND e.EmpCode<=11000 AND p.HR_Curr_DepartmentId=".$_REQUEST['value']." order by p.EmployeeID ASC", $con); }

}
 $Sno=1; while($res=mysql_fetch_array($sql)){ 
     
     $sD=mysql_query("select department_name as DepartmentCode from core_departments where id=".$res['HR_Curr_DepartmentId'],$con);
     $rD=mysql_fetch_assoc($sD);
 
  $D1=''; $D2=''; $D3=''; $D4='';
  
  $schema_insert = "";
  $schema_insert .= $Sno.$sep;	
  $schema_insert .= $res['EmpCode'].$sep;
  $schema_insert .= $res['Fname'].' '.$res['Sname'].' '.$res['Lname'].$sep;	
  $schema_insert .= $rD['DepartmentCode'].$sep;
  
  $DD1=' '; $DD2=' '; $DD3=' '; $DD4=' ';
  $D1a=' '; $D1b=' '; $D1c=' '; $D1d=' '; $D1e=' '; $D1f=' ';
  $D2a=' '; $D2b=' '; $D2c=' '; $D2d=' '; $D2e=' '; $D2f=' '; 
  $D3a=' '; $D3b=' '; $D3c=' '; $D3d=' '; $D3e=' '; $D3f=' ';
  $D4a=' '; $D4b=' '; $D4c=' '; $D4d=' '; $D4e=' '; $D4f=' ';
  
  for($i=1; $i<=5; $i++)
  { 
      
		    if($res['Appraiser_SoftSkill_'.$i]>0 && res['Appraiser_SoftSkill_'.$i]!=69)
		    {
		    $sS1 = mysql_query("SELECT Tid,Category,Topic,Description FROM hrm_pms_training WHERE Tid='".$res['Appraiser_SoftSkill_'.$i]."'",$con); $rS1 = mysql_fetch_assoc($sS1); 
		    if($i==1){$D1a=$rS1['Topic'].', '; }elseif($i==2){$D1b=$rS1['Topic'].', '; }elseif($i==3){$D1c=$rS1['Topic'].', '; }elseif($i==4){$D1d=$rS1['Topic'].', '; }elseif($i==5){$D1e=$rS1['Topic']; }
		    }     
		    elseif($res['Appraiser_SoftSkill_'.$i]==69){
		       $D1f = 'Other:'. $res["Appraiser_SoftSkill_Oth"]; 
		    }
  }
  $DD1=$D1a.' '.$D1b.' '.$D1c.' '.$D1d.' '.$D1e.' '.$D1f;
  //$schema_insert .= $DD1.$sep;	
  //App
  $schema_insert .= $D1a.$sep;
  $schema_insert .= $D1b.$sep;
  $schema_insert .= $D1c.$sep;
  $schema_insert .= $D1d.$sep;
  $schema_insert .= $D1e.$sep;
  
 
  for($j=1; $j<=5; $j++)
  { 
    
    if($res['Appraiser_TechSkill_'.$j]>0 && $res['Appraiser_TechSkill_'.$j]!=70)
    {
    
     $sS1 = mysql_query("SELECT Tid,Category,Topic,Description FROM hrm_pms_training WHERE Tid='".$res['Appraiser_TechSkill_'.$j]."'",$con); $rS1 = mysql_fetch_assoc($sS1); 
     if($j==1){$D2a=$rS1['Topic'].', '; }elseif($j==2){$D2b=$rS1['Topic'].', '; }elseif($j==3){$D2c=$rS1['Topic'].', '; }elseif($j==4){$D2d=$rS1['Topic'].', '; }elseif($j==5){$D2e=$rS1['Topic']; }
    }  
     elseif($res['Appraiser_TechSkill_'.$j]==70){
		       $D2f = 'Other: '. $res["Appraiser_TechSkill_Oth"]; 
		    }
        
  }
  $DD2=$D2a.' '.$D2b.' '.$D2c.' '.$D2d.' '.$D2e.' '.$D2f;
  //$schema_insert .= $DD2.$sep;
  //App
  $schema_insert .= $D2a.$sep;
  $schema_insert .= $D2b.$sep;
  $schema_insert .= $D2c.$sep;
  $schema_insert .= $D2d.$sep;
  $schema_insert .= $D2e.$sep;
  
  
  
  for($i=1; $i<=5; $i++)
  { 
      
		    if($res['Reviewer_SoftSkill_'.$i]>0 && res['Reviewer_SoftSkill_'.$i]!=69)
		    {
		    $sS1 = mysql_query("SELECT Tid,Category,Topic,Description FROM hrm_pms_training WHERE Tid='".$res['Reviewer_SoftSkill_'.$i]."'",$con); $rS1 = mysql_fetch_assoc($sS1); 
		     if($i==1){$D3a=$rS1['Topic'].', '; }elseif($i==2){$D3b=$rS1['Topic'].', '; }elseif($i==3){$D3c=$rS1['Topic'].', '; }elseif($i==4){$D3d=$rS1['Topic'].', '; }elseif($i==5){$D3e=$rS1['Topic']; }
		    }     
		     elseif($res['Reviewer_SoftSkill_'.$i]==69){
		       $D3f = 'Other: '. $res["Reviewer_SoftSkill_Oth"]; 
		    }
  }
  $DD3=$D3a.' '.$D3b.' '.$D3c.' '.$D3d.' '.$D3e.' '.$D3f;
  //$schema_insert .= $DD3.$sep;
  //Rev
  $schema_insert .= $D3a.$sep;
  $schema_insert .= $D3b.$sep;
  $schema_insert .= $D3c.$sep;
  $schema_insert .= $D3d.$sep;
  $schema_insert .= $D3e.$sep;
  
  
  for($j=1; $j<=5; $j++)
  { 
		    if($res['Reviewer_TechSkill_'.$j]>0 && $res['Reviewer_TechSkill_'.$j]!=70)
		    {
		    
		    $sS1 = mysql_query("SELECT Tid,Category,Topic,Description FROM hrm_pms_training WHERE Tid='".$res['Reviewer_TechSkill_'.$j]."'",$con); $rS1 = mysql_fetch_assoc($sS1); 
		     if($j==1){$D4a=$rS1['Topic'].', '; }elseif($j==2){$D4b=$rS1['Topic'].', '; }elseif($j==3){$D4c=$rS1['Topic'].', '; }elseif($j==4){$D4d=$rS1['Topic'].', '; }elseif($j==5){$D4e=$rS1['Topic']; } 
		    }   
		    elseif($res['Reviewer_TechSkill_'.$j]==70){
		       $D4f = 'Other: '. $res["Reviewer_TechSkill_Oth"]; 
		    }
		        
  }
  $DD4=$D4a.' '.$D4b.' '.$D4c.' '.$D4d.' '.$D4e.' '.$D4f;
  //$schema_insert .= $DD4.$sep;
  //Rev
  $schema_insert .= $D4a.$sep;
  $schema_insert .= $D4b.$sep;
  $schema_insert .= $D4c.$sep;
  $schema_insert .= $D4d.$sep;
  $schema_insert .= $D4e.$sep;
  
  
			  
  $schema_insert = str_replace($sep."$", "", $schema_insert);
  $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
  $schema_insert .= "\t";
  print(trim($schema_insert));
  print "\n";
  $Sno++; 

}


}
?>