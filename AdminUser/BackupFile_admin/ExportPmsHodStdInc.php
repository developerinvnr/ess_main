<?php 
require_once('config/config.php');
date_default_timezone_set('Asia/Calcutta');
$sY=mysql_query("select * from hrm_year where YearId=".$_REQUEST['YI']."", $con); $rY=mysql_fetch_assoc($sY); 
$FD=date("Y",strtotime($rY['FromDate'])); $TD=date("Y",strtotime($rY['ToDate'])); $MY=$FD-1;  $PRD=$FD.'-'.$TD;
$FD1=$FD-1; $PRD1=$FD1.'-'.$FD; $PRD2=$FD.'-'.$TD;
/*************************************************************************************************************/
if($_REQUEST['YI']==1){$Y=2012;}elseif($_REQUEST['YI']==2){$Y=2013;}elseif($_REQUEST['YI']==3){$Y=2014;}elseif($_REQUEST['YI']==4){$Y=2015;}elseif($_REQUEST['YI']==5){$Y=2016;}elseif($_REQUEST['YI']==6){$Y=2017;}elseif($_REQUEST['YI']==7){$Y=2018;}elseif($_REQUEST['YI']==8){$Y=2019;}elseif($_REQUEST['YI']==9){$Y=2020;}elseif($_REQUEST['YI']==10){$Y=2021;}elseif($_REQUEST['YI']==11){$Y=2022;}


if($_REQUEST['action']='HodStdIncExport') 
{ 
 if($_REQUEST['ee']=='Dept'){ $name='Department_Wise'; 
  if($_REQUEST['value']!=0)
  { $sqlA=mysql_query("select DepartmentName from hrm_department where DepartmentId=".$_REQUEST['value'], $con); $resA=mysql_fetch_assoc($sqlA); $name2=$resA['DepartmentName']; }else{$name2='All_Department';}
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

$xls_filename = 'Emp_PMS_Score/Rating_'.$PRD.'-'.$name2.'.xls';
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=$xls_filename");
header("Pragma: no-cache");
header("Expires: 0");
$sep = "\t"; 
echo "Sn\tEmpCode\tName\tDepartment\tDesignation\tGrade\t".$PRD1."- SALARY\t".$PRD1."- CTC\tSTATUS\t".$PRD2."- SALARY\t".$PRD2."- CTC\tSALARY CHANGE(%)\tCTC CHANGE(%)";
print("\n");	

# Get Users Details form the DB #$result = mysql_query("SELECT * from formResults WHERE formID = '$formID'" );
if($_REQUEST['ee']=='Dept')
{  
  if($_REQUEST['value']==0)
  { $sql=mysql_query("select hrm_employee.EmployeeID,EmpCode,Fname,Sname,Lname,EmpPmsId,EmpCurrGrossPM,HOD_EmployeeID,Hod_ProCorrSalary,HodSubmit_IncStatus,Hod_GrossMonthlySalary,DateJoining,HR_CurrDesigId,HR_CurrGradeId,HR_Curr_DepartmentId from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_pms ON hrm_employee.EmployeeID=hrm_employee_pms.EmployeeID where hrm_employee.CompanyId=".$_REQUEST['c']." AND hrm_employee.EmpStatus='A' AND hrm_employee_general.DateJoining<='".$Y."-06-30' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.Appraiser_EmployeeID!=0 order by EmpCode ASC", $con);
  }
  else
  { $sql=mysql_query("select hrm_employee.EmployeeID,EmpCode,Fname,Sname,Lname,EmpPmsId,EmpCurrGrossPM,HOD_EmployeeID,Hod_ProCorrSalary,HodSubmit_IncStatus,Hod_GrossMonthlySalary,DateJoining,HR_CurrDesigId,HR_CurrGradeId,HR_Curr_DepartmentId from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_pms ON hrm_employee.EmployeeID=hrm_employee_pms.EmployeeID where hrm_employee.CompanyId=".$_REQUEST['c']." AND hrm_employee.EmpStatus='A' AND hrm_employee_general.DateJoining<='".$Y."-06-30' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_general.DepartmentId=".$_REQUEST['value']." AND hrm_employee_pms.Appraiser_EmployeeID!=0 order by EmpCode ASC", $con);
  }
}
elseif($_REQUEST['ee']=='App')
{ $sql=mysql_query("select hrm_employee.EmployeeID,EmpCode,Fname,Sname,Lname,EmpPmsId,EmpCurrGrossPM,HOD_EmployeeID,Hod_ProCorrSalary,HodSubmit_IncStatus,Hod_GrossMonthlySalary,DateJoining,HR_CurrDesigId,HR_CurrGradeId,HR_Curr_DepartmentId from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_pms ON hrm_employee.EmployeeID=hrm_employee_pms.EmployeeID where hrm_employee.CompanyId=".$_REQUEST['c']." AND hrm_employee.EmpStatus='A' AND hrm_employee_general.DateJoining<='".$Y."-06-30' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.Appraiser_EmployeeID=".$_REQUEST['value']." AND hrm_employee_pms.Appraiser_EmployeeID!=0 order by EmpCode ASC", $con);

}
elseif($_REQUEST['ee']=='Rev')
{ $sql=mysql_query("select hrm_employee.EmployeeID,EmpCode,Fname,Sname,Lname,EmpPmsId,EmpCurrGrossPM,HOD_EmployeeID,Hod_ProCorrSalary,HodSubmit_IncStatus,Hod_GrossMonthlySalary,DateJoining,HR_CurrDesigId,HR_CurrGradeId,HR_Curr_DepartmentId from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_pms ON hrm_employee.EmployeeID=hrm_employee_pms.EmployeeID where hrm_employee.CompanyId=".$_REQUEST['c']." AND hrm_employee.EmpStatus='A' AND hrm_employee_general.DateJoining<='".$Y."-06-30' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.Reviewer_EmployeeID=".$_REQUEST['value']." AND hrm_employee_pms.Appraiser_EmployeeID!=0 order by EmpCode ASC", $con);

}
elseif($_REQUEST['ee']=='Hod')
{ $sql=mysql_query("select hrm_employee.EmployeeID,EmpCode,Fname,Sname,Lname,EmpPmsId,EmpCurrGrossPM,HOD_EmployeeID,Hod_ProCorrSalary,HodSubmit_IncStatus,Hod_GrossMonthlySalary,DateJoining,HR_CurrDesigId,HR_CurrGradeId,HR_Curr_DepartmentId from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_pms ON hrm_employee.EmployeeID=hrm_employee_pms.EmployeeID where hrm_employee.CompanyId=".$_REQUEST['c']." AND hrm_employee.EmpStatus='A' AND hrm_employee_general.DateJoining<='".$Y."-06-30' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.HOD_EmployeeID=".$_REQUEST['value']." AND hrm_employee_pms.Appraiser_EmployeeID!=0 order by EmpCode ASC", $con);
}
 $Sno=1; while($res=mysql_fetch_array($sql)){ 
 $sqlDept=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$res['HR_Curr_DepartmentId'], $con); $resDept=mysql_fetch_assoc($sqlDept); 
 $sqlDesig=mysql_query("select DesigName,DesigCode from hrm_designation where DesigId=".$res['HR_CurrDesigId'], $con); $resDesig=mysql_fetch_assoc($sqlDesig);
 $sqlG=mysql_query("select GradeValue from hrm_grade where GradeId=".$res['HR_CurrGradeId'], $con);  $resG=mysql_fetch_assoc($sqlG);
 
 if($FD=='2012'){ $sqlMax = mysql_query("SELECT MAX(CtcId) as MaxCtcId FROM hrm_employee_ctc where EmployeeID=".$res['EmployeeID']." AND CtcCreatedDate<='".date($FD."-10-01")."'", $con); }else{$sqlMax = mysql_query("SELECT MAX(CtcId) as MaxCtcId FROM hrm_employee_ctc where EmployeeID=".$res['EmployeeID']." AND CtcCreatedDate<'".date($FD."-10-01")."'", $con);} $resMax = mysql_fetch_assoc($sqlMax); 
 $sqlCtc = mysql_query("select Tot_CTC FROM hrm_employee_ctc where CtcId=".$resMax['MaxCtcId'], $con); $Ctc = mysql_fetch_assoc($sqlCtc); 
 $sqlTotC=mysql_query("select Tot_CTC from hrm_employee_ctc where EmployeeID=".$res['EmployeeID']." AND (CtcCreatedDate>='".date($FD."-10-01")."' AND CtcCreatedDate<='".date($FD."-12-31")."')", $con); $resTotC=mysql_fetch_assoc($sqlTotC); 	
 if($res['HodSubmit_IncStatus']==2){ $Gross=$res['Hod_GrossMonthlySalary'];} else { $sqlRat=mysql_query("select Reviewer_TotalFinalRating,Hod_TotalFinalRating from hrm_employee_pms where EmployeeID=".$res['EmployeeID']." AND AssessmentYear=".$_REQUEST['YI'], $con); $resRat=mysql_fetch_array($sqlRat); 
  if($resRat['Hod_TotalFinalRating']>0){$RatingHod=$resRat['Hod_TotalFinalRating']; } else {$RatingHod=$resRat['Reviewer_TotalFinalRating'];} 
$sqlMaxMin= mysql_query("SELECT IncDistriFrom,IncDistriTo FROM hrm_pms_increment_dis WHERE Rating=".$RatingHod." AND YearId=".$_REQUEST['YI']." AND CompanyId=".$CompanyId, $con); $resMaxMin = mysql_fetch_assoc($sqlMaxMin); 
	  
/*************************** Calculation **************************************************************/
  
  if($FD1<2017)
  {
  
   if($res['DateJoining']<=$FD1.'-09-30' AND $RatingHod>0)
  { 
	$TotIncAmt=($res['EmpCurrGrossPM']*$resMaxMin['IncDistriFrom'])/100;
	$NewGrossAmt=10*(ceil(($res['EmpCurrGrossPM']+$TotIncAmt)/10));
	$NewGrossAmt2=$res['EmpCurrGrossPM']+$TotIncAmt;  
  }
  elseif($res['DateJoining']>=$FD1.'-10-01' AND $res['DateJoining']<=$FD.'-03-31' AND $RatingHod>0)
  {  
   $date1 = new DateTime($res['DateJoining']);  $date2 = new DateTime($FD."-09-30");
   $interval = date_diff($date2, $date1);
   $Y=$interval->format('%y');  $M=$interval->format('%m');  $D=$interval->format('%d')+1;
   $PerM=$resMaxMin['IncDistriFrom']/12;  $PerD=$PerM/30;
   $Month_Per=round($PerM*$M, 2); $Day_Per=round($PerD*$D, 2);
   $MSal=($res['EmpCurrGrossPM']*$Month_Per)/100; 
   $DSal=($res['EmpCurrGrossPM']*$Day_Per)/100; 
   $TotInc=round($MSal+$DSal);
   $NewGrossAmt=10*(ceil(($res['EmpCurrGrossPM']+$TotInc)/10)); 
   $NewGrossAmt2=$res['EmpCurrGrossPM']+$TotInc; 
  }                                                    
  else
  {
	 $NewGrossAmt=10*(ceil($res['EmpCurrGrossPM']/10));  
	 $NewGrossAmt2=$res['EmpCurrGrossPM'];
  } 
/***************************If Prorata  wise Extra Not allow previous time PMS process **************************************************************/	 
  if($res['DateJoining']>=$FD1.'-04-01' AND $res['DateJoining']<=$FD1.'-09-30' AND $RatingHod>0)
  {  
   $date11 = new DateTime($res['DateJoining']);  $date22 = new DateTime($FD1."-09-30");
   $interval = date_diff($date22, $date11);
   $YY=$interval->format('%y');  $MM=$interval->format('%m');  $DD=$interval->format('%d')+1;
   $PerM2=$resMaxMin['IncDistriFrom']/12;  $PerD2=$PerM2/30;
   $Month_Per2=round($PerM2*$MM, 2); $Day_Per2=round($PerD2*$DD, 2);
   $MSal2=($res['EmpCurrGrossPM']*$Month_Per2)/100; 
   $DSal2=($res['EmpCurrGrossPM']*$Day_Per2)/100; 
   $TotInc2=round($MSal2+$DSal2);    
  }     
  else{ $TotInc2=0; }                              
  if($TotInc2>0){$ActualNewGS=10*(ceil(($NewGrossAmt2+$TotInc2)/10));}
  else{$ActualNewGS=10*(ceil(($NewGrossAmt+$TotInc2)/10));}
  $Gross=$ActualNewGS+$res['Hod_ProCorrSalary'];
  
  }
  else
  {
  
   if($res['DateJoining']<=$FD1.'-12-31' AND $RatingHod>0)
  { 
	$TotIncAmt=($res['EmpCurrGrossPM']*$resMaxMin['IncDistriFrom'])/100;
	$NewGrossAmt=10*(ceil(($res['EmpCurrGrossPM']+$TotIncAmt)/10));
	$NewGrossAmt2=$res['EmpCurrGrossPM']+$TotIncAmt;  
  }
  elseif($res['DateJoining']>=$FD.'-01-01' AND $res['DateJoining']<=$FD.'-06-30' AND $RatingHod>0)
  {  
   $date1 = new DateTime($res['DateJoining']);  $date2 = new DateTime($FD."-12-31");
   $interval = date_diff($date2, $date1);
   $Y=$interval->format('%y');  $M=$interval->format('%m');  $D=$interval->format('%d')+1;
   $PerM=$resMaxMin['IncDistriFrom']/12;  $PerD=$PerM/30;
   $Month_Per=round($PerM*$M, 2); $Day_Per=round($PerD*$D, 2);
   $MSal=($res['EmpCurrGrossPM']*$Month_Per)/100; 
   $DSal=($res['EmpCurrGrossPM']*$Day_Per)/100; 
   $TotInc=round($MSal+$DSal);
   $NewGrossAmt=10*(ceil(($res['EmpCurrGrossPM']+$TotInc)/10)); 
   $NewGrossAmt2=$res['EmpCurrGrossPM']+$TotInc; 
  }                                                    
  else
  {
	 $NewGrossAmt=10*(ceil($res['EmpCurrGrossPM']/10));  
	 $NewGrossAmt2=$res['EmpCurrGrossPM'];
  } 
/***************************If Prorata  wise Extra Not allow previous time PMS process **************************************************************/	 
  if($res['DateJoining']>=$FD1.'-07-01' AND $res['DateJoining']<=$FD1.'-12-31' AND $RatingHod>0)
  {  
   $date11 = new DateTime($res['DateJoining']);  $date22 = new DateTime($FD1."-12-31");
   $interval = date_diff($date22, $date11);
   $YY=$interval->format('%y');  $MM=$interval->format('%m');  $DD=$interval->format('%d')+1;
   $PerM2=$resMaxMin['IncDistriFrom']/12;  $PerD2=$PerM2/30;
   $Month_Per2=round($PerM2*$MM, 2); $Day_Per2=round($PerD2*$DD, 2);
   $MSal2=($res['EmpCurrGrossPM']*$Month_Per2)/100; 
   $DSal2=($res['EmpCurrGrossPM']*$Day_Per2)/100; 
   $TotInc2=round($MSal2+$DSal2);    
  }     
  else{ $TotInc2=0; }                              
  if($TotInc2>0){$ActualNewGS=10*(ceil(($NewGrossAmt2+$TotInc2)/10));}
  else{$ActualNewGS=10*(ceil(($NewGrossAmt+$TotInc2)/10));}
  $Gross=$ActualNewGS+$res['Hod_ProCorrSalary'];
  
  }	 
	 
  
  
  
  
 } 
 
  $schema_insert = "";
  $schema_insert .= $Sno.$sep;
  $schema_insert .= $res['EmpCode'].$sep;
  $schema_insert .= $res['Fname'].' '.$res['Sname'].' '.$res['Lname'].$sep;		
  $schema_insert .= $resDept['DepartmentCode'].$sep;
  $schema_insert .= $resDesig['DesigName'].$sep;
  $schema_insert .= $resG['GradeValue'].$sep;
  $schema_insert .= intval($res['EmpCurrGrossPM']).$sep;
  $schema_insert .= intval($Ctc['Tot_CTC']).$sep;
  if($res['HodSubmit_IncStatus']==2){$SS='F';}else{$SS='T';}
  $schema_insert .= $SS.$sep;
  $schema_insert .= intval($Gross).$sep;
  $schema_insert .= intval($resTotC['Tot_CTC']).$sep;
  $OnePer=($res['EmpCurrGrossPM']*1)/100; $IncGross=$Gross-$res['EmpCurrGrossPM']; $ActPerInc=$IncGross/$OnePer;
  $schema_insert .= round($ActPerInc, 2).$sep;
  $COnePer=($Ctc['Tot_CTC']*1)/100; $CIncGross=$resTotC['Tot_CTC']-$Ctc['Tot_CTC']; $CActPerInc=$CIncGross/$COnePer;
  $schema_insert .= round($CActPerInc, 2).$sep;

  $schema_insert = str_replace($sep."$", "", $schema_insert);
  $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
  $schema_insert .= "\t";
  print(trim($schema_insert));
  print "\n";
  $Sno++;

}

}
?>