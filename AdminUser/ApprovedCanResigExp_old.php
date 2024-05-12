<?php 
require_once('config/config.php');

if($_REQUEST['action']='export') 
{ 
  
 $xls_filename = 'Approved_Resignation.xls';
 header("Content-Type: application/xls");
 header("Content-Disposition: attachment; filename=$xls_filename");
 header("Pragma: no-cache"); header("Expires: 0"); $sep = "\t"; 
 echo "Sn\tEmpCode\tName\tDepartment\tGarde\tDesignation\tTermination\tResignation Date\tRelieving Date\tType of Exit\tEmp Apply\tRep Approved\tRep Approval Deviation\tHOD Approved\tHOD Approval Deviation\tHR Approved\tHR Approval Deviation\tEmp Clearance Date\tRepExit Date\tRepExit Deviation \tRep\Departmental Clearance Date\tRep\Department Clearance Deviation\tLogistic Clearance Date\tLogistic Clearance Deviation \tIT Clearance Date\tIT Clearance Deviation\tHR Clearance Date\tHR Clearance Deviation\tAccount Clearance Date\tAccount Clearance Deviation\tTotal Deviation";
 print("\n");
if($_REQUEST['value'] == 'All'){
    $sql=mysql_query("select s.*,EmpCode,Fname,Sname,Lname,GradeValue,DesigName,DepartmentName from hrm_employee_separation s 
INNER JOIN hrm_employee e ON s.EmployeeID=e.EmployeeID 
INNER JOIN hrm_employee_general g on s.EmployeeID=g.EmployeeID 
inner join hrm_grade gr on g.GradeId=gr.GradeId 
inner join hrm_department d on g.DepartmentId=d.DepartmentId 
inner join hrm_designation de on g.DesigId=de.DesigId 
where s.ResignationStatus=4 
order by s.Emp_ResignationDate DESC", $con);
}else{
$sql=mysql_query("select s.*,EmpCode,Fname,Sname,Lname,GradeValue,DesigName,DepartmentName from hrm_employee_separation s 
INNER JOIN hrm_employee e ON s.EmployeeID=e.EmployeeID 
INNER JOIN hrm_employee_general g on s.EmployeeID=g.EmployeeID 
inner join hrm_grade gr on g.GradeId=gr.GradeId 
inner join hrm_department d on g.DepartmentId=d.DepartmentId 
inner join hrm_designation de on g.DesigId=de.DesigId 
where s.ResignationStatus=4 
AND g.DepartmentId=".$_REQUEST['value']." 
order by s.Emp_ResignationDate DESC", $con); 
} 
$row=mysql_num_rows($sql);
 if($row>0) 
 { 
  $no=1; 
  while($res=mysql_fetch_array($sql))
  {
   
   $HRev3=' '; $HRev2=' '; $HRev=' ';      
   $Difference=0; $DifferenceL=0; $IT_Difference=0; $HR_Difference=0;
   $Acc_Difference=0; $total=0;      
   $schema_insert = "";
   $schema_insert .= $no.$sep;
   $schema_insert .= $res['EmpCode'].$sep;	
   $schema_insert .= $res['Fname'].' '.$res['Sname'].' '.$res['Lname'].$sep;
   $schema_insert .= $res['DepartmentName'].$sep;	
   $schema_insert .= $res['GradeValue'].$sep;
   $schema_insert .= $res['DesigName'].$sep;	
   
   if($res['TerMination']=='Y'){ $schema_insert .= 'Yes'.$sep;}
   else{ $schema_insert .= 'No'.$sep; }
   $empResigD=date("Y-m-d",strtotime($res['Emp_ResignationDate']));
   $schema_insert .= $empResigD.$sep;	
   
   if($res['HR_RelievingDate3']!='' AND $res['HR_RelievingDate3']!='0000-00-00' AND $res['HR_RelievingDate3']!='1970-01-01')
   { $HRev=date("Y-m-d",strtotime($res['HR_RelievingDate3'])); } 
   elseif($res['HR_RelievingDate2']!='' AND $res['HR_RelievingDate2']!='0000-00-00' AND $res['HR_RelievingDate2']!='1970-01-01')
   { $HRev=date("Y-m-d",strtotime($res['HR_RelievingDate2'])); } 
   elseif($res['HR_RelievingDate']!='' AND $res['HR_RelievingDate']!='0000-00-00' AND $res['HR_RelievingDate']!='1970-01-01')
   { $HRev=date("Y-m-d",strtotime($res['HR_RelievingDate'])); }
   else{ $HRev= '0000-00-00'; }
   $schema_insert .= $HRev.$sep;	

   if($res['TypeOfExit']=='D'){$schema_insert .= 'Desired by Company'.$sep; }
   else{ $schema_insert .= 'Voluntary by Employee'.$sep; }
   
   $EmpSave=date("Y-m-d",strtotime($res['Emp_SaveDate']));
   $schema_insert .= $EmpSave.$sep;
   
   $rep_deviation=0; $rep_deviation=0;
   if($res['Rep_SaveDate']!='' AND $res['Rep_SaveDate']!='1970-01-01' AND $res['Rep_SaveDate']!='0000-00-00')
   {
    $RepSave=date("Y-m-d",strtotime($res['Rep_SaveDate']));
    $schema_insert .= $RepSave.$sep;  
    $emp_earlier = new DateTime($EmpSave); $rep_later = new DateTime($RepSave); 
    $rep_deviation = $rep_later->diff($emp_earlier)->format("%a"); 
    if($rep_deviation <= 3){ $schema_insert .='0'.$sep; }
    else{ $rep_diff = $rep_deviation - 3; $schema_insert .= $rep_diff.$sep; }   
   }
   else
   {
    $schema_insert .= ' '.$sep;  
    $schema_insert .= ' '.$sep;
   }
   
   $hod_deviation=0; $hod_diff=0;
   if($res['Hod_SaveDate']!='' AND $res['Hod_SaveDate']!='1970-01-01' AND $res['Hod_SaveDate']!= '0000-00-00')
   {
     $HodSave=date("Y-m-d",strtotime($res['Hod_SaveDate']));  
     $schema_insert .= $HodSave.$sep;  
     $emp_earlierH = new DateTime($EmpSave); 
     $hod_later = new DateTime($HodSave);
     $hod_deviation = $hod_later->diff($emp_earlierH)->format("%a");
     if($hod_deviation <= 6){ $schema_insert .='0'.$sep; }
     else{ $hod_diff = $hod_deviation-6; $schema_insert .= $hod_diff.$sep; }
   }
   else
   {
    $schema_insert .= ''.$sep;  
    $schema_insert .= ''.$sep; 
   }
   
   $hr_deviation=0; $hr_diff=0; 
   if($res['HR_SaveDate']!='' AND $res['HR_SaveDate']!='1970-01-01' AND $res['HR_SaveDate']!='0000-00-00')
   {
    $HRSave=date("Y-m-d",strtotime($res['HR_SaveDate']));    
    $schema_insert .= $HRSave.$sep;  
    
     if($res['Rep_SaveDate']!='' AND $res['Rep_SaveDate']!='1970-01-01' AND $res['Rep_SaveDate']!= '0000-00-00')
     { 
      $RepS=date("Y-m-d",strtotime($res['Rep_SaveDate']));    
      $earlier1 = new DateTime($RepS); 
     }
     elseif($res['Hod_SaveDate']!='' AND $res['Hod_SaveDate']!='1970-01-01' AND $res['Hod_SaveDate'] != '0000-00-00')
     {
      $HodS=date("Y-m-d",strtotime($res['Hod_SaveDate']));     
      $earlier1 = new DateTime($HodS); 
     }
     
    $HRS=date("Y-m-d",strtotime($res['HR_SaveDate']));
    $later1 = new DateTime($HRS);
    $hr_deviation = $later1->diff($earlier1)->format("%a");
    if($hr_deviation <= 3){ $schema_insert .= '0'.$sep; }
    else{ $hr_diff = $hr_deviation - 3; $schema_insert .= $hr_diff.$sep; }      
   }
   else
   {
       
    $schema_insert .= ''.$sep;  
    $schema_insert .= ''.$sep;   
   }
   

$ne=mysql_query("select FormSubmitDate from hrm_employee_separation_exitint where EmpSepId=".$res['EmpSepId'],$con); 
$rowe=mysql_num_rows($ne); $rese=mysql_fetch_assoc($ne);
$nr=mysql_query("select NocSubmitDate from hrm_employee_separation_nocrep where EmpSepId=".$res['EmpSepId'],$con); 
$rowr=mysql_num_rows($nr);  $resr=mysql_fetch_assoc($nr); 
$ni=mysql_query("select NocSubmitDate from hrm_employee_separation_nocit where EmpSepId=".$res['EmpSepId'],$con); 
$rowi=mysql_num_rows($ni); $resi=mysql_fetch_assoc($ni); 
$nh=mysql_query("select NocSubmitDate from hrm_employee_separation_nochr where EmpSepId=".$res['EmpSepId'],$con); 
$rowh=mysql_num_rows($nh); $resh=mysql_fetch_assoc($nh);
$na=mysql_query("select NocSubmAccDate from hrm_employee_separation_nocacc where EmpSepId=".$res['EmpSepId'],$con); 
$rowa=mysql_num_rows($na); $resa=mysql_fetch_assoc($na);
$logistic=mysql_query("SELECT Logistic_Noc_Submit_Date FROM `hrm_employee_separation_nocrep` EmpSepId=".$res['EmpSepId'],$con); 
$rowLog = mysql_num_rows($resLogistic);  $resLogistic = mysql_fetch_assoc($logistic);

  //===============Reporting Exit Interview=====================// 
  $deviationExt=0; $DifferenceExt=0;
  if($rese['FormSubmitDate']!='' AND $rese['FormSubmitDate']!='1970-01-01' AND $rese['FormSubmitDate']!= '0000-00-00')
  {
   $FrmSub=date("Y-m-d",strtotime($rese['FormSubmitDate']));      
   $schema_insert .= $FrmSub.$sep;  
  }
  else{ $schema_insert .= ''.$sep; }
  
  if($rese['RepExtSubmit']!='' AND $rese['RepExtSubmit']!='1970-01-01' AND $rese['RepExtSubmit']!= '0000-00-00' AND $rese['RepExtSubmit']!= 'NULL')
  {
   $RepExitSub=date("Y-m-d",strtotime($rese['RepExtSubmit']));      
   $schema_insert .= $RepExitSub.$sep;  
  
   if($rowr>0 AND $res['HR_SaveDate']!='' AND $res['HR_SaveDate']!='0000-00-00' AND $res['HR_SaveDate']!='1970-01-01')
    {
      $HRSaveD=date("Y-m-d",strtotime($res['HR_SaveDate']));      
      $HR_SaveDate = new DateTime($HRSaveD); 
      $RepExt_Clear = new DateTime($RepExitSub); 
      $deviationExt = $RepExt_Clear->diff($HR_SaveDate)->format("%a"); 
      if($deviationExt<=3){ $schema_insert .='0'.$sep; }
      else
      { 
        $DifferenceExt = $deviationExt - 3; 
        $schema_insert .= $DifferenceExt.$sep; 
      }
    }
    else{ $schema_insert .= ''.$sep; }     
      
  }
  else
  { 
    $schema_insert .= ''.$sep; 
    $schema_insert .= ''.$sep;  
  }
  
  
   
  //===============Reporting Clearance=====================//
  $deviation=0; $Difference=0;
  if($resr['NocSubmitDate']!='' AND $resr['NocSubmitDate']!='1970-01-01' AND $resr['NocSubmitDate']!= '0000-00-00')
  {
    $NocSub=date("Y-m-d",strtotime($resr['NocSubmitDate']));  
    $schema_insert .= $NocSub.$sep;  
     
    if($rowr>0 AND $res['HR_SaveDate']!='' AND $res['HR_SaveDate']!='0000-00-00' AND $res['HR_SaveDate']!='1970-01-01')
    {
      $HRSaveD=date("Y-m-d",strtotime($res['HR_SaveDate']));      
      $HR_SaveDate = new DateTime($HRSaveD); 
      $Rep_Clear = new DateTime($NocSub); 
      $deviation = $Rep_Clear->diff($HR_SaveDate)->format("%a"); 
      if($deviation<=3){ $schema_insert .='0'.$sep; }
      else{ $Difference = $deviation - 3; $schema_insert .= $Difference.$sep; }
    }
    else{ $schema_insert .= ''.$sep; }     
  }
  else
  {
    $schema_insert .= ''.$sep;  
    $schema_insert .= ''.$sep;   
  }


  //===============Logistic Clearance=====================//
  $Ldeviation=0; $DifferenceL=0; 
  if($resLogistic['Logistic_Noc_Submit_Date']!='' AND $resLogistic['Logistic_Noc_Submit_Date']!='1970-01-01' AND $resLogistic['Logistic_Noc_Submit_Date']!= '0000-00-00')
  {
    $LogSub=date("Y-m-d",strtotime($resLogistic['Logistic_Noc_Submit_Date']));
    $schema_insert .= $LogSub.$sep;  
     
    if($rowLog>0 AND $res['HR_SaveDate']!='' AND $res['HR_SaveDate']!='0000-00-00' AND $res['HR_SaveDate']!='1970-01-01')
    {
     $HRSaveD=date("Y-m-d",strtotime($res['HR_SaveDate']));      
     $HR_SaveDate = new DateTime($HRSaveD); 
     $log_clear = new DateTime($LogSub); 
     $Ldeviation = $log_clear->diff($HR_SaveDate)->format("%a"); 
      if($Ldeviation <= 3){ $schema_insert .='0'.$sep; }
      else{ $DifferenceL = $Ldeviation-3; $schema_insert .= $DifferenceL.$sep; }
     }
     else{ $schema_insert .= ''.$sep;  }        
  }
  else
  {
    $schema_insert .= ''.$sep;  
    $schema_insert .= ''.$sep;      
  }
   
   
   
  //===============IT Clearance=====================//
  $It_deviation=0; $IT_Difference=0;
  if($resi['NocSubmitDate']!='' AND $resi['NocSubmitDate']!='1970-01-01' AND $resi['NocSubmitDate']!= '0000-00-00')
  {
     $ITSub=date("Y-m-d",strtotime($resi['NocSubmitDate']));  
     $schema_insert .= $ITSub.$sep;  
     
     if($rowi > 0 AND $res['HR_SaveDate']!='' AND $res['HR_SaveDate']!='0000-00-00' AND $res['HR_SaveDate']!='1970-01-01')
     {
      $HRSaveD=date("Y-m-d",strtotime($res['HR_SaveDate']));      
      $HR_SaveDate = new DateTime($HRSaveD); 
      $it_clear = new DateTime($ITSub); 
      $It_deviation = $it_clear->diff($HR_SaveDate)->format("%a"); 
      if($It_deviation <= 3){$schema_insert .='0'.$sep; }
      else
      { 
       $IT_Difference = $It_deviation-3; 
       $schema_insert .= $IT_Difference.$sep;
      }
     }
     else{ $schema_insert .= ''.$sep;  }     
  }
  else
  {
    $schema_insert .= ''.$sep;  
    $schema_insert .= ''.$sep;   
  }

  //===============HR Clearance=====================//
  $HR_deviation=0; $HR_Difference=0;
  if($resh['NocSubmitDate']!='' AND $resh['NocSubmitDate']!='1970-01-01' AND $resh['NocSubmitDate']!='0000-00-00')
  {
     $HRSub=date("Y-m-d",strtotime($resh['NocSubmitDate']));  
     $schema_insert .= $HRSub.$sep;  
     
     if($rowh > 0 AND $res['HR_SaveDate']!='' AND $res['HR_SaveDate']!='0000-00-00' AND $res['HR_SaveDate']!='1970-01-01')
     {
      $HRSaveD=date("Y-m-d",strtotime($res['HR_SaveDate']));      
      $HR_SaveDate = new DateTime($HRSaveD); 
      $HR_Clear = new DateTime($HRSub); 
      $HR_deviation = $HR_Clear->diff($HR_SaveDate)->format("%a"); 
      if($HR_deviation <= 3){ $schema_insert .='0'.$sep; }
      else
      {
        $HR_Difference = $HR_deviation - 3;
        $schema_insert .= $HR_Difference.$sep;
      }
     }else{ $schema_insert .= ''.$sep;  }  
  }
  else
  {
    $schema_insert .= ''.$sep;  
    $schema_insert .= ''.$sep;
  }
   
   
  //===============Account Clearance=====================//
  $Acc_deviation=0; $Acc_Difference=0;
  if($resa['NocSubmAccDate']!='' AND $resa['NocSubmAccDate']!='1970-01-01' AND $resa['NocSubmAccDate']!='0000-00-00')
  {
    $AccSub=date("Y-m-d",strtotime($resa['NocSubmAccDate']));
    $schema_insert .= $AccSub.$sep;
       
    if($rowa > 0 AND $resh['NocSubmitDate']!='' AND $resh['NocSubmitDate']!='0000-00-00' AND $resh['NocSubmitDate']!='1970-01-00')
    {
      $HRSub=date("Y-m-d",strtotime($resh['NocSubmitDate'])); 
      $HR_Clear = new DateTime($HRSub); 
      $Acc_Clear = new DateTime($AccSub);
      $Acc_deviation = $Acc_Clear->diff($HR_Clear)->format("%a"); 
      if($Acc_deviation<=3){ $schema_insert .='0'.$sep; }
      else
      { 
        $Acc_Difference = $Acc_deviation - 3;
        $schema_insert .= $Acc_Difference.$sep;
      }
    }else{  $schema_insert .= ''.$sep; }     
  }
  else
  {
     $schema_insert .= ''.$sep;  
     $schema_insert .= ''.$sep;
  }
    
    
   //=========================Total Deviation =================
   $total=0;
   if($resa['NocSubmAccDate']!='' AND $resa['NocSubmAccDate']!='1970-01-01' AND $resa['NocSubmAccDate']!= '0000-00-00')
   {
        
     if($rowa>0)
     {
      $reliving_date = new DateTime($HRev);
      $Acc_Clear = new DateTime($resa['NocSubmAccDate']);
      $total = $Acc_Clear->diff($reliving_date)->format("%a");
      $schema_insert .= $total.$sep;
     }    
          
   }
   else{ $schema_insert .= ''.$sep; }

 
   
   $schema_insert = str_replace($sep."$", "", $schema_insert);
   $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
   $schema_insert .= "\t";
   print(trim($schema_insert)); print "\n"; 
   $no++;
  }
 }//if($row>0)
 
}
