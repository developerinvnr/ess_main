<?php session_start();
if($_SESSION['login'] = true){require_once('../AdminUser/config/config.php');}
include("../function.php");
include('../AdminUser/codeEncDec.php');
if(check_user()==false){header('Location:../index.php');}
require_once('../AdminUser/logcheck.php');
if($_SESSION['logCheckEmp']!=$logemp){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('EmpMenuSession.php');}


/******************************************************************************/
if(isset($_POST['SentRes']))
{ $AfterFiveDay=date("Y-m-d",strtotime('+5 day')); $After30Day=date("Y-m-d",strtotime('+30 day'));
  $sqlE=mysql_query("select AppraiserId,HodId from hrm_employee_reporting where EmployeeID=".$EmployeeId, $con); $resE=mysql_fetch_assoc($sqlE);
  $sqlEmp=mysql_query("select Fname,Sname,Lname,DepartmentId,EmailId_Vnr,CostCenter,GradeId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee_general.EmployeeID=".$EmployeeId, $con); $resEmp=mysql_fetch_assoc($sqlEmp); $Ename=$resEmp['Fname'].' '.$resEmp['Sname'].' '.$resEmp['Lname'];
  
  $sqlDept=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$resEmp['DepartmentId'],$con);
  $resDept=mysql_fetch_assoc($sqlDept); //$resDept['DepartmentCode']
  
  if($resEmp['DepartmentId']==6)
  {
   $sEI=mysql_query("select * from hrm_employee_state where StateId=".$resEmp['CostCenter']." AND CompanyId=".$CompanyId, $con); $rEI=mysql_fetch_array($sEI);
   if($rEI['LOGISTICS_EId']!=0 OR $rEI['LOGISTICS_EId']!=''){$logEmp=$rEI['LOGISTICS_EId'];}else{$logEmp=0;}
  }
  else
  {
   //$sqlLog=mysql_query("select EmployeeID from hrm_employee_separation_nocdept_emp where DepartmentId=7 AND Status='A'", $con); $resLog=mysql_fetch_assoc($sqlLog); 
   //if($resLog['EmployeeID']!=0 OR $resLog['EmployeeID']!=''){$logEmp=$resLog['EmployeeID'];}else{$logEmp=0;}
   $logEmp=0;
  } 
  
  $sqlch=mysql_query("select * from hrm_employee_separation where EmployeeID=".$EmployeeId." AND Rep_Approved!='C' AND Hod_Approved!='C' AND HR_Approved!='C'", $con); $rowch=mysql_num_rows($sqlch);
  if($rowch==0){
      
      
      $sqlIns=mysql_query("insert IGNORE into hrm_employee_separation(EmployeeID, Emp_ResignationDate, Emp_RelievingDate, Emp_Reason, RetainQAns1, RetainQAns2, RetainQAns3, NoticeDay, Emp_Resignation_Status, Emp_SaveDate, Rep_EmployeeID, Log_EmployeeID, HOD_Date, Hod_EmployeeID, HR_Date, ResignationStatus, YearId) values(".$EmployeeId.", '".date("Y-m-d", strtotime($_POST['ResDate']))."', '".date("Y-m-d", strtotime($_POST['RelDate']))."', '".addslashes($_POST['Reason'])."', '".addslashes($_POST['RetainQAns1'])."', '".addslashes($_POST['RetainQAns2'])."', '".addslashes($_POST['RetainQAns3'])."', ".$_POST['NoticeDay'].", 'Y', '".date("Y-m-d H:i:s")."', ".$resE['AppraiserId'].", ".$logEmp.", '".$AfterFiveDay."', ".$resE['HodId'].", '".$After30Day."', 1, ".$YearId.")", $con); }
  if($sqlIns)
  { 
   $sqlRep=mysql_query("select EmailId_Vnr from hrm_employee_general where EmployeeID=".$resE['AppraiserId'], $con); $resRep=mysql_fetch_assoc($sqlRep);
   $sqlHod=mysql_query("select EmailId_Vnr from hrm_employee_general where EmployeeID=".$resE['HodId'], $con); $resHod=mysql_fetch_assoc($sqlHod);
   
/************************************************ Reporting ***********************************************/   


if($resRep['EmailId_Vnr']!='')
{
//$email_to = $resRep['EmailId_Vnr'];
//$email_from = 'admin@vnrseeds.co.in';
$email_subject = "Apply For Resignation";
//$headers = "From: $email_from ". "\r\n"; 
$email_message .=$Ename." has submitted resignation application that needs to be approved within 5 working days. For more details Kindly log on to ESS. \n\n";
$email_message .="Thanks & Regards\n";
$email_message .="HR\n\n";
//$ok = @mail($email_to, $email_subject, $email_message, $headers);

      $subject=$email_subject;
      $body=$email_message;
      $email_to=$resRep['EmailId_Vnr'];
      require 'vendor/mail_admin.php';
} 

/************************************************ HR ***********************************************/ 
//$email_to2 = 'vspl.hr@vnrseeds.com';
//$email_from2 = 'admin@vnrseeds.co.in';
$email_subject2 = "Apply For Resignation";
//$headers2 = "From: $email_from2 ". "\r\n";
$email_message2 .=$Ename." (".$resDept['DepartmentCode'].") has submitted resignation application, for more details kindly log on to ESS.\n\n";
$email_message2 .="Thanks & Regards\n";
$email_message2 .="HR\n\n";
//$ok = @mail($email_to2, $email_subject2, $email_message2, $headers2);

      $subject=$email_subject2;
      $body=$email_message2;
      $email_to='vspl.hr@vnrseeds.com';
      require 'vendor/mail_admin.php';

//$email_toH = 'parul.parmar@vnrseeds.com';
//$email_fromH = 'admin@vnrseeds.co.in';
$email_subjectH = "Apply For Resignation";
//$headersH = "From: $email_fromH ". "\r\n";
$email_messageH .=$Ename." (".$resDept['DepartmentCode'].") has submitted resignation application, for more details kindly log on to ESS.\n\n";
$email_messageH .="Thanks & Regards\n";
$email_messageH .="HR\n\n";
//$ok = @mail($email_toH, $email_subjectH, $email_messageH, $headersH);

      $subject=$email_subjectH;
      $body=$email_messageH;
      $email_to='parul.parmar@vnrseeds.com';
      require 'vendor/mail_admin.php';


//>=67 && <=77 Up to M1

if($resEmp['GradeId']>=67 && $resEmp['GradeId']<=77)
{
 //$email_toM = 'fd@vnrseeds.com';
 //$email_fromM = 'admin@vnrseeds.co.in';
 $email_subjectM = "Apply For Resignation";
 //$headersM = "From: $email_fromM ". "\r\n";
 $email_messageM .=$Ename." (".$resDept['DepartmentCode'].") has submitted resignation application.\n\n";
 $email_messageM .="Thanks & Regards\n";
 $email_messageM .="HR\n\n";
 //$ok = @mail($email_toM, $email_subjectM, $email_messageM, $headersM);
 
      $subject=$email_subjectM;
      $body=$email_messageM;
      $email_to='fd@vnrseeds.com';
      require 'vendor/mail_admin.php';
}


/************************************************ HOD ***********************************************/   
if($resHod['EmailId_Vnr']!='')
{
//$email_to = $resHod['EmailId_Vnr'];
//$email_from = 'admin@vnrseeds.co.in';
$email_subject = "Apply For Resignation";
$headers = "From: $email_from ". "\r\n";
$email_message3 .=$Ename." (".$resDept['DepartmentCode'].") has submitted resignation application, for more details kindly log on to ESS.\n\n";
$email_message3 .="Thanks & Regards\n";
$email_message3 .="HR\n\n";
//$ok = @mail($email_to, $email_subject, $email_message3, $headers);

      $subject=$email_subject;
      $body=$email_message3;
      $email_to=$resHod['EmailId_Vnr'];
      require 'vendor/mail_admin.php';
      
} 
      
      $sqlStatusChange =mysql_query("UPDATE hrm_employee SET EmpStatus='D' WHERE EmployeeID='".$EmployeeId."'",$con);

   $msg="your resignation request sent successfully.";
  
  }
}



if(isset($_POST['SaveExitInt']))
{ 
  $search =  '!"#$%&/\'-:_' ; $search = str_split($search);
  $Q11=str_replace($search, "", $_POST['Q1_1']); $Q12=str_replace($search, "", $_POST['Q1_2']);
  $Q21=str_replace($search, "", $_POST['Q2_1']); $Q22=str_replace($search, "", $_POST['Q2_2']);
  $Q31=str_replace($search, "", $_POST['Q3_1']); $Q32=str_replace($search, "", $_POST['Q3_2']);
  $Q41=str_replace($search, "", $_POST['Q4_1']); $Q42=str_replace($search, "", $_POST['Q4_2']);
  $Q51=str_replace($search, "", $_POST['Q5_1']); $Q52=str_replace($search, "", $_POST['Q5_2']);
  $ComName=str_replace($search, "", $_POST['ComName']); $Location=str_replace($search, "", $_POST['Location']); $Designation=str_replace($search, "", $_POST['Designation']);
  $hike=str_replace($search, "", $_POST['hike']); $OthBefit=str_replace($search, "", $_POST['OthBefit']);
  
  $sql22=mysql_query("select EmpSepId from hrm_employee_separation where EmployeeID=".$EmployeeId." AND Rep_Approved!='C' AND Hod_Approved!='C' AND HR_Approved!='C'", $con); $res22=mysql_fetch_assoc($sql22);
  $sql=mysql_query("select ExitIntId from hrm_employee_separation_exitint INNER JOIN hrm_employee_separation ON hrm_employee_separation_exitint.EmpSepId=hrm_employee_separation.EmpSepId where hrm_employee_separation.EmployeeID=".$EmployeeId." AND Rep_Approved!='C' AND Hod_Approved!='C' AND HR_Approved!='C'", $con); $row=mysql_num_rows($sql);
  if($row==0)
  { $sqlIns=mysql_query("insert into hrm_employee_separation_exitint(EmpSepId, FormSubmitDate, FRI, HP, OB, PGR, LOC, LPO, JANM, BJBP, HS, LOCOP, IAU, LOCOM, DIDM, UTP, US, HJ, WH, JITM, NFOC, IPI, IIAB, AR, NCIR, OTH, Q1_1, Q1_2, Q2_1, Q2_2, Q3_1, Q3_2, Q4_1, Q4_2, Q5_1, Q5_2, Q6, Q7, ComName, Location, Designation, hike, OthBefit) values(".$res22['EmpSepId'].", '".date("Y-m-d")."', ".$_POST['FRI'].", ".$_POST['HP'].", ".$_POST['OB'].", ".$_POST['PGR'].", ".$_POST['LOC'].", ".$_POST['LPO'].", ".$_POST['JANM'].", ".$_POST['BJBP'].", ".$_POST['HS'].", ".$_POST['LOCOP'].", ".$_POST['IAU'].", ".$_POST['LOCOM'].", ".$_POST['DIDM'].", ".$_POST['UTP'].", ".$_POST['US'].", ".$_POST['HJ'].", ".$_POST['WH'].", ".$_POST['JITM'].", ".$_POST['NFOC'].", ".$_POST['IPI'].", ".$_POST['IIAB'].", ".$_POST['AR'].", ".$_POST['NCIR'].", ".$_POST['OTH'].", '".$Q11."', '".$Q12."', '".$Q21."', '".$Q22."', '".$Q31."', '".$Q32."', '".$Q41."', '".$Q42."', '".$Q51."', '".$Q52."', '".$_POST['Q6_Ans']."', '".$_POST['Q7_Ans']."', '".$ComName."', '".$Location."', '".$Designation."', '".$hike."', '".$OthBefit."')", $con); }
  elseif($row>0)
  { $sqlIns=mysql_query("update hrm_employee_separation_exitint set FormSubmitDate='".date("Y-m-d")."', FRI=".$_POST['FRI'].", HP=".$_POST['HP'].", OB=".$_POST['OB'].", PGR=".$_POST['PGR'].", LOC=".$_POST['LOC'].", LPO=".$_POST['LPO'].", JANM=".$_POST['JANM'].", BJBP=".$_POST['BJBP'].", HS=".$_POST['HS'].", LOCOP=".$_POST['LOCOP'].", IAU=".$_POST['IAU'].", LOCOM=".$_POST['LOCOM'].", DIDM=".$_POST['DIDM'].", UTP=".$_POST['UTP'].", US=".$_POST['US'].", HJ=".$_POST['HJ'].", WH=".$_POST['WH'].", JITM=".$_POST['JITM'].", NFOC=".$_POST['NFOC'].", IPI=".$_POST['IPI'].", IIAB=".$_POST['IIAB'].", AR=".$_POST['AR'].", NCIR=".$_POST['NCIR'].", OTH=".$_POST['OTH'].", Q1_1='".$Q11."', Q1_2='".$Q12."', Q2_1='".$Q21."', Q2_2='".$Q22."', Q3_1='".$Q31."', Q3_2='".$Q32."', Q4_1='".$Q41."', Q4_2='".$Q42."', Q5_1='".$Q51."', Q5_2='".$Q52."', Q6='".$_POST['Q6_Ans']."', Q7='".$_POST['Q7_Ans']."', ComName='".$ComName."', Location='".$Location."', Designation='".$Designation."', hike='".$hike."', OthBefit='".$OthBefit."' where EmpSepId=".$res22['EmpSepId'], $con);}
  
   $msg="your exit interview form save successfully, please submit for complete process.";
}

if(isset($_POST['SubmitExitInt']))
{ 
  $search =  '!"#$%&/\'-:_' ; $search = str_split($search);
  $Q11=str_replace($search, "", $_POST['Q1_1']); $Q12=str_replace($search, "", $_POST['Q1_2']);
  $Q21=str_replace($search, "", $_POST['Q2_1']); $Q22=str_replace($search, "", $_POST['Q2_2']);
  $Q31=str_replace($search, "", $_POST['Q3_1']); $Q32=str_replace($search, "", $_POST['Q3_2']);
  $Q41=str_replace($search, "", $_POST['Q4_1']); $Q42=str_replace($search, "", $_POST['Q4_2']);
  $Q51=str_replace($search, "", $_POST['Q5_1']); $Q52=str_replace($search, "", $_POST['Q5_2']);
  $ComName=str_replace($search, "", $_POST['ComName']); $Location=str_replace($search, "", $_POST['Location']); $Designation=str_replace($search, "", $_POST['Designation']);
  $hike=str_replace($search, "", $_POST['hike']); $OthBefit=str_replace($search, "", $_POST['OthBefit']);
  
  $sql22=mysql_query("select EmpSepId from hrm_employee_separation where EmployeeID=".$EmployeeId." AND Rep_Approved!='C' AND Hod_Approved!='C' AND HR_Approved!='C'", $con); $res22=mysql_fetch_assoc($sql22);
 $sql=mysql_query("select ExitIntId from hrm_employee_separation_exitint INNER JOIN hrm_employee_separation ON hrm_employee_separation_exitint.EmpSepId=hrm_employee_separation.EmpSepId where hrm_employee_separation.EmployeeID=".$EmployeeId." AND Rep_Approved!='C' AND Hod_Approved!='C' AND HR_Approved!='C'", $con); $row=mysql_num_rows($sql);
  if($row==0)
  { $sqlIns=mysql_query("insert into hrm_employee_separation_exitint(EmpSepId, FormSubmitDate, FRI, HP, OB, PGR, LOC, LPO, JANM, BJBP, HS, LOCOP, IAU, LOCOM, DIDM, UTP, US, HJ, WH, JITM, NFOC, IPI, IIAB, AR, NCIR, OTH, Q1_1, Q1_2, Q2_1, Q2_2, Q3_1, Q3_2, Q4_1, Q4_2, Q5_1, Q5_2, Q6, Q7, ComName, Location, Designation, hike, OthBefit) values(".$res22['EmpSepId'].", '".date("Y-m-d")."', ".$_POST['FRI'].", ".$_POST['HP'].", ".$_POST['OB'].", ".$_POST['PGR'].", ".$_POST['LOC'].", ".$_POST['LPO'].", ".$_POST['JANM'].", ".$_POST['BJBP'].", ".$_POST['HS'].", ".$_POST['LOCOP'].", ".$_POST['IAU'].", ".$_POST['LOCOM'].", ".$_POST['DIDM'].", ".$_POST['UTP'].", ".$_POST['US'].", ".$_POST['HJ'].", ".$_POST['WH'].", ".$_POST['JITM'].", ".$_POST['NFOC'].", ".$_POST['IPI'].", ".$_POST['IIAB'].", ".$_POST['AR'].", ".$_POST['NCIR'].", ".$_POST['OTH'].", '".$Q11."', '".$Q12."', '".$Q21."', '".$Q22."', '".$Q31."', '".$Q32."', '".$Q41."', '".$Q42."', '".$Q51."', '".$Q52."', '".$_POST['Q6_Ans']."', '".$_POST['Q7_Ans']."', '".$ComName."', '".$Location."', '".$Designation."', '".$hike."', '".$OthBefit."')", $con); }
  elseif($row>0)
  { $sqlIns=mysql_query("update hrm_employee_separation_exitint set FormSubmitDate='".date("Y-m-d")."', FRI=".$_POST['FRI'].", HP=".$_POST['HP'].", OB=".$_POST['OB'].", PGR=".$_POST['PGR'].", LOC=".$_POST['LOC'].", LPO=".$_POST['LPO'].", JANM=".$_POST['JANM'].", BJBP=".$_POST['BJBP'].", HS=".$_POST['HS'].", LOCOP=".$_POST['LOCOP'].", IAU=".$_POST['IAU'].", LOCOM=".$_POST['LOCOM'].", DIDM=".$_POST['DIDM'].", UTP=".$_POST['UTP'].", US=".$_POST['US'].", HJ=".$_POST['HJ'].", WH=".$_POST['WH'].", JITM=".$_POST['JITM'].", NFOC=".$_POST['NFOC'].", IPI=".$_POST['IPI'].", IIAB=".$_POST['IIAB'].", AR=".$_POST['AR'].", NCIR=".$_POST['NCIR'].", OTH=".$_POST['OTH'].", Q1_1='".$Q11."', Q1_2='".$Q12."', Q2_1='".$Q21."', Q2_2='".$Q22."', Q3_1='".$Q31."', Q3_2='".$Q32."', Q4_1='".$Q41."', Q4_2='".$Q42."', Q5_1='".$Q51."', Q5_2='".$Q52."', Q6='".$_POST['Q6_Ans']."', Q7='".$_POST['Q7_Ans']."', ComName='".$ComName."', Location='".$Location."', Designation='".$Designation."', hike='".$hike."', OthBefit='".$OthBefit."' where EmpSepId=".$res22['EmpSepId'], $con);}
  
  if($sqlIns){$sqlUp2=mysql_query("update hrm_employee_separation set Emp_ExitInt='Y' where EmployeeID=".$EmployeeId." AND Rep_Approved!='C' AND Hod_Approved!='C' AND HR_Approved!='C'", $con);}
  if($sqlUp2)
  {
   $sqlEmp=mysql_query("select Fname,Sname,Lname from hrm_employee where EmployeeID=".$EmployeeId, $con); $resEmp=mysql_fetch_assoc($sqlEmp); 
   $Ename=$resEmp['Fname'].' '.$resEmp['Sname'].' '.$resEmp['Lname'];
   //$email_to = 'vspl.hr@vnrseeds.com';
   //$email_from = 'admin@vnrseeds.co.in';
   $email_subject = "Saved successfully exit interview form.";
   //$email_txt = "Saved successfully exit interview form";
   //$headers = "From: $email_from ". "\r\n";
   $email_message .=$Ename." has successfully submitted the exit interview form, for more details kindly log on to ESS.\n\n";
   $email_message .="Thanks & Regards\n";
   $email_message .="HR\n\n";
   //$ok = @mail($email_to, $email_subject, $email_message, $headers);
   
      $subject=$email_subject;
      $body=$email_message;
      $email_to='vspl.hr@vnrseeds.com';
      require 'vendor/mail_admin.php';
   
   $msg="your exit interview form submitted successfully.";
  }
  
}


if(isset($_POST['SaveCan']))
{       
   $sqlUp=mysql_query("update hrm_employee_separation set Emp_CanDate='".date("Y-m-d", strtotime($_POST['Emp_CanDate']))."', Emp_CanReason='".$_POST['Emp_CanReason']."', Emp_CancelResig=1 where EmpSepId=".$_POST['EmpSepId']." AND EmployeeID=".$EmployeeId." AND Rep_Approved!='C' AND Hod_Approved!='C' AND HR_Approved!='C'", $con);
}

if(isset($_POST['SubmitCan']))
{  $AfterFiveDay=date("Y-m-d",strtotime('+5 day')); $After20Day=date("Y-m-d",strtotime('+20 day'));     
   $sqlUp=mysql_query("update hrm_employee_separation set Emp_CanDate='".date("Y-m-d", strtotime($_POST['Emp_CanDate']))."', Emp_CanReason='".$_POST['Emp_CanReason']."', Emp_CancelResig=2, HOD_CanDate='".$AfterFiveDay."', HR_CanDate='".$After20Day."' where EmpSepId=".$_POST['EmpSepId']." AND EmployeeID=".$EmployeeId." AND Rep_Approved!='C' AND Hod_Approved!='C' AND HR_Approved!='C'", $con);
   
  if($sqlUp)
  { 
    $sqlE=mysql_query("select AppraiserId,HodId from hrm_employee_reporting where EmployeeID=".$EmployeeId, $con); $resE=mysql_fetch_assoc($sqlE);
    $sqlEmp=mysql_query("select Fname,Sname,Lname,DepartmentId,EmailId_Vnr,CostCenter from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee_general.EmployeeID=".$EmployeeId, $con); $resEmp=mysql_fetch_assoc($sqlEmp); $Ename=$resEmp['Fname'].' '.$resEmp['Sname'].' '.$resEmp['Lname'];
     $sqlRep=mysql_query("select EmailId_Vnr from hrm_employee_general where EmployeeID=".$resE['AppraiserId'], $con); $resRep=mysql_fetch_assoc($sqlRep);
     $sqlHod=mysql_query("select EmailId_Vnr from hrm_employee_general where EmployeeID=".$resE['HodId'], $con); $resHod=mysql_fetch_assoc($sqlHod);
   
/************************************************ Reporting ***********************************************/   
if($resRep['EmailId_Vnr']!='')
{
//$email_to = $resRep['EmailId_Vnr'];
//$email_from = 'admin@vnrseeds.co.in';
$email_subject = "Apply For Cancal Resignation";
//$email_txt = "Apply For Cancal Resignation";
//$headers = "From: $email_from ". "\r\n";
$email_message .=$Ename." has submitted cancel resignation application that needs to be accept, Kindly log on to ESS. \n\n";
$email_message .="Thanks & Regards\n";
$email_message .="HR\n\n";
//$ok = @mail($email_to, $email_subject, $email_message, $headers);

      $subject=$email_subject;
      $body=$email_message;
      $email_to=$resRep['EmailId_Vnr'];
      require 'vendor/mail_admin.php';
      
} 

/************************************************ HR ***********************************************/ 
//$email_to = 'vspl.hr@vnrseeds.com';
//$email_from = 'admin@vnrseeds.co.in';
$email_subject = "Apply For Cancal Resignation";
//$email_txt = "Apply For Cancal Resignation";
//$headers = "From: $email_from ". "\r\n";
$email_message2 .=$Ename." has submitted cancel resignation application that needs to be accept, Kindly log on to ESS. \n\n";
$email_message2 .="Thanks & Regards\n";
$email_message2 .="HR\n\n";
//$ok = @mail($email_to, $email_subject, $email_message2, $headers);

      $subject=$email_subject;
      $body=$email_message2;
      $email_to='vspl.hr@vnrseeds.com';
      require 'vendor/mail_admin.php';

/************************************************ HOD ***********************************************/   
if($resHod['EmailId_Vnr']!='')
{
//$email_to = $resHod['EmailId_Vnr'];
//$email_from = 'admin@vnrseeds.co.in';
$email_subject = "Apply For Cancal Resignation";
//$email_txt = "Apply For Cancal Resignation";
//$headers = "From: $email_from ". "\r\n"; 
$email_message3 .=$Ename." has submitted cancel resignation application, for more details kindly log on to ESS.\n\n";
$email_message3 .="Thanks & Regards\n";
$email_message3 .="HR\n\n";
//$ok = @mail($email_to, $email_subject, $email_message3, $headers);

      $subject=$email_subject;
      $body=$email_message3;
      $email_to=$resHod['EmailId_Vnr'];
      require 'vendor/mail_admin.php';

} 
  }
}


?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<link rel="stylesheet" type="text/css" href="src/css/jscal2.css"/>
<link rel="stylesheet" type="text/css" href="src/css/border-radius.css"/>
<link rel="stylesheet" type="text/css" href="src/css/steel/steel.css"/>
<script type="text/javascript" src="src/js/jscal2.js"></script>
<script type="text/javascript" src="src/js/lang/en.js"></script>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<style> .font { color:#ffffff; font-family:Georgia; font-size:12px;} .font5 { color:#000066; font-family:Georgia; font-size:16px;}
.font2 { color:#thrthr; font-family:Georgia; font-size:13px;}.font4 { color:#1FAD34; font-family:Georgia; font-size:15px;}
.input { background-color:#F9F2FF; width:90px;text-align:center;height:20px;vertical-align:middle;}
.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;} .TableHead { font-family:Times New Roman; color:#FFFFFF; font-size:15px; }
.TableHead1 { font-family:Times New Roman; color:#000000; background-color:#FFFFFF; font-size:13px; overflow:hidden; } .InputText {font-family:Times New Roman; font-size:12px; width:100px; height:19px; }
.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}.All{font-size:11px; height:20px;} .All_30{font-size:14px;height:20px;width:30px;font-family:Times New Roman;}.All_40{font-size:14px;height:20px;width:40px;font-family:Times New Roman;} .All_60{font-size:14px;height:20px;width:50px;font-family:Times New Roman;} .All_50{font-size:14px;height:20px;width:70px;font-family:Times New Roman;} .All_500{font-size:15px;height:20px;width:500px;font-family:Times New Roman;}</style>
<Script type="text/javascript">window.history.forward(1);</Script>
<script type="text/javascript" language="javascript">
function Resedit()
{ document.getElementById("editRes").style.display='none'; document.getElementById("SentRes").style.display='block';
  document.getElementById("f_btn2").disabled=false; 
  document.getElementById("Reason").disabled=false; document.getElementById("Reason").style.background='#FFFFFF';
  document.getElementById("RetainQAns1").disabled=false; document.getElementById("RetainQAns1").style.background='#FFFFFF';
  document.getElementById("RetainQAns2").disabled=false; document.getElementById("RetainQAns2").style.background='#FFFFFF';
  document.getElementById("RetainQAns3").disabled=false; document.getElementById("RetainQAns3").style.background='#FFFFFF';
  
  //document.getElementById("ComName").disabled=false; document.getElementById("ComName").style.background='#FFFFFF';
  //document.getElementById("Designation").disabled=false; document.getElementById("Designation").style.background='#FFFFFF';
  //document.getElementById("Hike").disabled=false; document.getElementById("Hike").style.background='#FFFFFF';
  //document.getElementById("Salary").disabled=false; document.getElementById("Salary").style.background='#FFFFFF';
  //document.getElementById("Location").disabled=false; document.getElementById("Location").style.background='#FFFFFF';  
}

function validate(formname)
{ var filter=/^[a-zA-Z. /]+$/; var Numfilter=/^[0-9. ]+$/;
  var RelDate = formname.RelDate.value;  var Reason = formname.Reason.value; var RelDate = formname.RelDate.value;
  if(RelDate.length === 0){ alert("Please add relieving date.");  return false; }
  var d1 = formname.ResDate.value; var d2 = formname.RelDate.value;
  var DMY=d1.split('-');     //splits the date string by '-' and stores in a array.
  var DMY2=d2.split('-');
  var day=DMY[0];  var month=DMY[1];  var year=DMY[2];
  var day1=DMY2[0];  var month1=DMY2[1];  var year1=DMY2[2];
  var dateTemp1=month+'/'+day+'/'+year;  
  var dateTemp2=month1+'/'+day1+'/'+year1;
  var date1 = new Date(dateTemp1);//mm/dd/yy 
  var date2 = new Date(dateTemp2); //mm/dd/yy
  var Timed1=date1.getTime(); var Timed2=date2.getTime();
  if(Timed1>Timed2){alert('Error : Please check resignation & relieving date!'); return false;}	
  
  var timeDiff = Math.abs(date2.getTime() - date1.getTime());
  var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24));
  var TotDay = diffDays; // var TotDay = diffDays+1;
  document.getElementById("NoticeDay").value=TotDay;
  var Rel2Date=parseFloat(document.getElementById("Rel2Date").value);
  
  if(TotDay<Rel2Date){ var RecoveryDate=Math.round(Rel2Date-TotDay); alert("Please note, you are not serving the required notice period of "+Rel2Date+" days. Shortfall shall be recovered in full and final settlement");  }
  
  //if(TotDay<30){ var RecoveryDate=30-TotDay; alert("Please note, you are not serving the required notice period of 30 days. Shortfall shall be recovered in full and final settlement");  }
  //if(TotDay>30){ alert("Kindly note! the notice period to be served cannot exceed more than 30 days.");  return false;  }
  
  
  if(Reason.length === 0){ alert("Please type resignation reason.");  return false; }
  if(Reason.length<10){ alert("Please type minimum 10 character to resignation reason.");  return false; }
  var RetainQAns1 = formname.RetainQAns1.value; var RetainQAns2 = formname.RetainQAns2.value; var RetainQAns3 = formname.RetainQAns3.value;
  if(RetainQAns1.length===0 && RetainQAns2.length===0 && RetainQAns3.length===0){ alert('Please type minimum one answer');  return false; }

  var agree=confirm("Are you sure you want to submit resignation application?");
  if(agree){ return true; }else{ return false; }
  
}


function validate2(form2name)
{ 
  var FRI = form2name.FRI.value; var HP = form2name.HP.value; var OB = form2name.OB.value; var PGR = form2name.PGR.value; var LOC = form2name.LOC.value;
  var LPO = form2name.LPO.value; var JANM = form2name.JANM.value; var BJBP = form2name.BJBP.value; var HS = form2name.HS.value; var LOCOP = form2name.LOCOP.value;
  var IAU = form2name.IAU.value; var LOCOM = form2name.LOCOM.value; var DIDM = form2name.DIDM.value; var UTP = form2name.UTP.value; var US = form2name.US.value;
  var HJ = form2name.HJ.value; var WH = form2name.WH.value; var JITM = form2name.JITM.value; var NFOC = form2name.NFOC.value; var IPI = form2name.IPI.value;
  var IIAB = form2name.IIAB.value; var AR = form2name.AR.value; var NCIR = form2name.NCIR.value; 
  if(FRI==0){ alert("Please assign number for reason Rank I(a)."); return false;} if(HP==0){ alert("Please assign number for reason Rank I(b)."); return false; } if(OB==0){ alert("Please assign number for reason Rank I(c)."); return false; } if(PGR==0){ alert("Please assign number for reason Rank II(a)."); return false;} if(LOC==0){ alert("Please assign number for reason Rank II(b)."); return false;} if(LPO==0){ alert("Please assign number for reason Rank II(c)."); return false;} if(JANM==0){ alert("Please assign number for reason Rank II(d)."); return false;} if(BJBP==0){ alert("Please assign number for reason Rank II(e)."); return false;} if(HS==0){ alert("Please assign number for reason Rank II(f)."); return false;} if(LOCOP==0){ alert("Please assign number for reason Rank III(a)."); return false;} if(IAU==0){ alert("Please assign number for reason Rank III(b)."); return false;} if(LOCOM==0){ alert("Please assign number for reason Rank III(c)."); return false;} if(DIDM==0){ alert("Please assign number for reason Rank III(d)."); return false;} if(UTP==0){ alert("Please assign number for reason Rank III(e)."); return false;} if(US==0){ alert("Please assign number for reason Rank IV(a)."); return false;} if(HJ==0){ alert("Please assign number for reason Rank IV(b)."); return false;} if(WH==0){ alert("Please assign number for reason Rank IV(c)."); return false;} if(JITM==0){ alert("Please assign number for reason Rank IV(d)."); return false;} if(NFOC==0){ alert("Please assign number for reason Rank IV(e)."); return false;} if(IPI==0){ alert("Please assign number for reason Rank V(a)."); return false;} if(IIAB==0){ alert("Please assign number for reason Rank V(b)."); return false;} if(AR==0){ alert("Please assign number for reason Rank VI(a)."); return false;} if(NCIR==0){ alert("Please assign number for reason Rank VI(b)."); return false;}

  var Q1_1 = form2name.Q1_1.value;  var Q1_2 = form2name.Q1_2.value; var Q2_1 = form2name.Q2_1.value;  var Q2_2 = form2name.Q2_2.value;
  var Q3_1 = form2name.Q3_1.value;  var Q3_2 = form2name.Q3_2.value; var Q4_1 = form2name.Q4_1.value;  var Q4_2 = form2name.Q4_2.value;
  var Q5_1 = form2name.Q5_1.value;  var Q5_2 = form2name.Q5_2.value; var Q6 = form2name.Q6_Ans.value; var Q7 = form2name.Q7_Ans.value;
  if(Q1_1.length === 0 && Q1_2.length === 0){ alert("Please type answer in Q1.");  return false; }
  if(Q2_1.length === 0 && Q2_2.length === 0){ alert("Please type answer in Q2.");  return false; }
  if(Q3_1.length === 0 && Q3_2.length === 0){ alert("Please type answer in Q3.");  return false; }
  if(Q4_1.length === 0 && Q4_2.length === 0){ alert("Please type answer in Q4.");  return false; }
  if(Q5_1.length === 0 && Q5_2.length === 0){ alert("Please type answer in Q5.");  return false; }
  if(Q6==''){ alert("Please select option in Q6.");  return false; }
  if(Q7==''){ alert("Please select option in Q7.");  return false; }
  
  var ComName = form2name.ComName.value; var Location = form2name.Location.value; var Designation = form2name.Designation.value; 
  var hike = form2name.hike.value; var OthBefit = form2name.OthBefit.value; 
  
  if(ComName.length === 0){ alert("Please type company name.");  return false; }
  if(Location.length === 0){ alert("Please type location name.");  return false; }  
  if(Designation.length === 0){ alert("Please type designation name.");  return false; }
  if(hike.length === 0){ alert("Please type hike in compensation .");  return false; }  
  //if(OthBefit.length === 0){ alert("Please type other benifit.");  return false; }  

  var agree=confirm("Are you sure you ?");
  if(agree){ return true; }else{ return false; }
  
}

function HelpDocSep(value){ window.open("HelpFile.php?a=SepOpen&v="+value,"HelpFile","width=800,height=650"); }


function Vvalidate3(form3name)
{ var Emp_CanReason = form3name.Emp_CanReason.value; 
  if(Emp_CanReason.length === 0){ alert("Please type reason for cancel resignation.");  return false; }
  var agree=confirm("Are you sure you want to submit cancel resignation application?");
  if(agree){ return true; }else{ return false; }
}


<!--
function doBlink() {
	var blink = document.all.tags("BLINK")
	for (var i=0; i<blink.length; i++)
		blink[i].style.visibility = blink[i].style.visibility == "" ? "hidden" : "" 
}
function startBlink() {
	if (document.all)
		setInterval("doBlink()",1000)
}
window.onload = startBlink;
// -->
</script>
</head>
<body class="body">
<table class="table">
<tr>
 <td>
 <table class="menutable"><tr><td><?php if($_SESSION['login'] = true){ require_once("EMenu.php"); } ?></td></tr></table> 
 </td>
</tr>
<tr>
 <td>
  <table width="100%" style="margin-top:0px; ">
    <tr>
	  <td valign="top"><?php if($_SESSION['login'] = true){ require_once("EWelcome.php"); } ?></td>
	</tr>
	<tr><td>&nbsp;</td></tr>
	 <tr>
	  <td valign="top">
	     <table border="0" style="width:100%; height:380px; float:none;" cellpadding="0">
		  <tr>
		   <td valign="top"> 
		   
<?php //*************************************************************************************************************************************************** ?>	 
<?php $sqlch=mysql_query("select * from hrm_employee_separation where EmployeeID=".$EmployeeId." AND Rep_Approved!='C' AND Hod_Approved!='C' AND HR_Approved!='C'", $con); $rowch=mysql_num_rows($sqlch); $resch=mysql_fetch_assoc($sqlch);
      //$sqlch2=mysql_query("select Resig_Permission from hrm_employee where EmployeeID=".$EmployeeId, $con); $resch2=mysql_fetch_assoc($sqlch2);
?>   
<table border="0" id="Activity"> 
 <tr>
  <td id="Anni" valign="top">
	<table border="0">
	  <tr height="20"><td align="left" valign="top" width="120">
<?php include("EmpImgEmp.php"); ?>
<?php //echo "<img width=105px height=125px src=\"show_images.php?id=".$EmployeeId."\">\n";?></td></td></tr>
	</table>
  </td>
  <td width="1000" valign="top">
<form enctype="multipart/form-data" name="formname" method="post" onSubmit="return validate(this)">
<table border="0" cellspacing="5">
 <tr>
  <td colspan="2" class="heading">
    Resignation Form&nbsp;&nbsp;
   <input type="button" value="Resignation form" style="background-color:<?php if($_REQUEST['a']=='f'){echo '#FFFFFF';}else{echo '#2D96FF';}?>;color:<?php if($_REQUEST['a']=='f'){echo '#C7C7C7';}else{echo '#FFFFFF';}?>;font-weight:bold;font-family:Geneva, Arial, Helvetica, sans-serif;" <?php if($_REQUEST['a']=='f'){echo 'disabled';} ?> onClick="javascript:window.location='EmpSprtion.php?e=4e&w=234&y=10234&a=f&e=4e2&e=4e&w=234&y=110022344&retd=ee&wwrew=t%T@sed818&d=101'"/>
   
   <?php if($resch['ResignationStatus']==4) { ?>
   <input type="button" value="Exit interview" style="background-color:<?php if($_REQUEST['a']=='e'){echo '#FFFFFF';}else{echo '#2D96FF';}?>;color:<?php if($_REQUEST['a']=='e'){echo '#C7C7C7';}else{echo '#FFFFFF';}?>;font-weight:bold;font-family:Geneva, Arial, Helvetica, sans-serif;" <?php if($_REQUEST['a']=='e'){echo 'disabled';} ?> onClick="javascript:window.location='EmpSprtion.php?e=44e&w=254&y=10234&a=e&e=5e2&e=4e&w=234&y=1022344&retd=ee&wwrew=t%T@#+aa+sed818&d=101'"/>
   <?php } ?>
  
   <?php if($resch['HR_Approved']=='Y') { ?>
   <input type="button" value="Cancel Resignation" style="background-color:<?php if($_REQUEST['a']=='c'){echo '#FFFFFF';}else{echo '#2D96FF';}?>;color:<?php if($_REQUEST['a']=='c'){echo '#C7C7C7';}else{echo '#FFFFFF';}?>;font-weight:bold;font-family:Geneva, Arial, Helvetica, sans-serif;" <?php if($_REQUEST['a']=='c'){echo 'disabled';} ?> onClick="javascript:window.location='EmpSprtion.php?e=44e&w=254&y=10234&a=c&e=5e2&e=4e&w=234&y=1022344&retd=ee&wwrew=t%T@#+aa+sed818&d=101'"/>
   <?php } ?>
   &nbsp;&nbsp;
    <font style="width:200px;font-family:Times New Roman;color:#000099;" size="3"><a href="#" onClick="HelpDocSep('HelpSep')"><b>HelpDoc</b></a></font>
   &nbsp;&nbsp;<font style="color:#EC0000;font-size:16px;font-family:Times New Roman;font-weight:bold;"><blink>
   <?php if($rowch>0 AND $resch['Extend']=='N' AND $resch['HR_Approved']=='N' AND $resch['Emp_ExitInt']=='N' AND $resch['Emp_CancelResig']==0){ echo 'your resignation request is under process.'; }
         elseif($rowch>0 AND $resch['Extend']=='N' AND $resch['HR_Approved']=='Y' AND $resch['Emp_ExitInt']=='N' AND $resch['Emp_CancelResig']==0){ echo 'please fill <u>exit interview</u> form for further process. (Your Resignation application is under process by HR)'; }
		 elseif($rowch>0 AND $resch['Extend']=='N' AND $resch['HR_Approved']=='Y' AND $resch['Emp_ExitInt']=='Y' AND $resch['Emp_CancelResig']==0){ echo 'The exit interview form has been submitted. Your departmental clearance has been initiated; kindly submit all your assets and documents to the reporting manager before the relieving date. (Your Resignation application is under process by HR)'; }
		 elseif($rowch>0 AND $resch['Extend']=='N' AND $resch['HR_Approved']=='C'){ echo 'Your resignation request is rejected.'; }
         elseif($rowch>0 AND $resch['Extend']=='N' AND $resch['HR_Approved']=='Y' AND $resch['Emp_CancelResig']==2 AND ($resch['Rep_CancelResig']=='N' AND $resch['HOD_CancelResig']=='N' AND $resch['HR_CancelResig']=='N')){ echo 'Your cancel resignation request sent successfully.'; }
		 elseif($rowch>0 AND $resch['Extend']=='N' AND $resch['HR_Approved']=='Y' AND $resch['Emp_CancelResig']==2 AND ($resch['Rep_CancelResig']=='Y' OR $resch['HOD_CancelResig']=='Y' OR $resch['HR_CancelResig']=='Y')){ echo 'Your cancel resignation request accepted successfully.'; }
		 
   ?>
   </blink></font>  
   
  </td>
 </tr>
 
 <tr>
<td style="display:<?php if($_REQUEST['a']=='f'){echo 'block';}elseif($_REQUEST['a']=='e' OR $_REQUEST['a']=='c'){echo 'none';}?>;">
 <table border="0">
 <tr><td colspan="7" valign="top" style='font-family:Times New Roman; font-size:17px; color:#008800' align="right">
	 <font color="#014E05" style='font-family:Times New Roman;' size="3"><b><?php echo $msg; ?></b></font></td>
 </tr>
  <tr>
  <td align="left" class="font2" style="width:120px;">&nbsp;&nbsp;Resignation Date</td><td style="width:10px;"><b>&nbsp;:&nbsp;</b></td>
  <td><input class="input" name="ResDate" id="ResDate" value="<?php if($rowch>0){echo date("d-m-Y", strtotime($resch['Emp_ResignationDate']));}else{echo date("d-m-Y"); } ?>" readonly>&nbsp;<button id="f_btn1" class="CalenderButton" disabled></button>
      <script type="text/javascript">  var cal = Calendar.setup({ onSelect:  function(cal) { cal.hide()}, showTime: true }); 
      cal.manageFields("f_btn1", "ResDate", "%d-%m-%Y");</script></td>
  <td style="width:10px; ">&nbsp;</td>
  
  <?php
  $sqlEmp=mysql_query("select EmpCode,DepartmentId,DateConfirmationYN,ConfirmHR from hrm_employee_general g INNER JOIN hrm_employee e ON g.EmployeeID=e.EmployeeID where g.EmployeeID=".$EmployeeId, $con); $resEmp=mysql_fetch_assoc($sqlEmp); 
  $After15Day=date("Y-m-d",strtotime('+15 day'));
  $After30Day=date("Y-m-d",strtotime('+30 day'));
  $After90Day=date("Y-m-d",strtotime('+90 day'));
  
  if($resEmp['DateConfirmationYN']=='N' && $resEmp['ConfirmHR']=='N')
  {
   if($resEmp['EmpCode']>=711 AND ($resEmp['DepartmentId']==6 OR $resEmp['DepartmentId']==3 OR $resEmp['DepartmentId']==12))
   {$RelDate=$After30Day; echo '<input type="hidden" id="Rel2Date" value="30" />'; }
   else{$RelDate=$After15Day; echo '<input type="hidden" id="Rel2Date" value="15" />';}
  }
  else
  {
   if($resEmp['EmpCode']>=711 AND ($resEmp['DepartmentId']==6 OR $resEmp['DepartmentId']==3 OR $resEmp['DepartmentId']==12))
   {$RelDate=$After90Day; echo '<input type="hidden" id="Rel2Date" value="90" />'; }
   else{$RelDate=$After30Day; echo '<input type="hidden" id="Rel2Date" value="30" />';}
  }
  
  
  //if($resEmp['EmpCode']>=711 AND ($resEmp['DepartmentId']==6 OR $resEmp['DepartmentId']==3 OR $resEmp['DepartmentId']==12))
  //{$RelDate=$After90Day; echo '<input type="hidden" id="Rel2Date" value="90" />'; }
  //else{$RelDate=$After30Day; echo '<input type="hidden" id="Rel2Date" value="30" />';}
   ?>
  
  <td align="left" class="font2" style="width:120px;">&nbsp;&nbsp;Expected Relieving Date (By Employee)</td><td style="width:10px;"><b>&nbsp;:&nbsp;</b></td>
  <td><input class="input" name="RelDate" id="RelDate" readonly value="<?php if($rowch>0){echo date("d-m-Y", strtotime($resch['Emp_RelievingDate']));}else{echo date("d-m-Y",strtotime($RelDate)); } ?>">&nbsp;<button id="f_btn2" class="CalenderButton" disabled></button>
      <script type="text/javascript">  var cal = Calendar.setup({ onSelect:  function(cal) { cal.hide()}, showTime: true }); 
      cal.manageFields("f_btn2", "RelDate", "%d-%m-%Y");</script>
	  <input type="hidden" id="NoticeDay" name="NoticeDay" value="<?php echo $resch['NoticeDay']; ?>" />
	  </td>
	  
 </tr>
 <tr>
  <td align="left" class="font2" style="width:120px;" valign="top">&nbsp;&nbsp;Reason</td><td style="width:10px;" valign="top"><b>&nbsp;:&nbsp;</b></td>
  <td colspan="5" valign="top"><textarea name="Reason" id="Reason" style="width:400px;border-bottom-color:#000000;background-color:#E0DBE3;" cols="47" rows="6" disabled><?php if($rowch>0){echo $resch['Emp_Reason'];}else{echo ''; } ?></textarea></td>
 </tr>
 <tr><td colspan="7" style="font-family:Times New Roman;font-size:16px;" align="">&nbsp;&nbsp;<b>Q.&nbsp;What can company do to retain you?</b></td></tr>
 <tr>
  <td colspan="7" style="font-family:Times New Roman;font-size:16px;" valign="top">&nbsp;&nbsp;<b>(1)</b>&nbsp;<input name="RetainQAns1" id="RetainQAns1" style="width:514px;border-bottom-color:#000000;background-color:#E0DBE3;" maxlength="200" value="<?php if($rowch>0){echo $resch['RetainQAns1'];}else{echo ''; } ?>" disabled/></td>
 </tr>
 <tr>
  <td colspan="7" style="font-family:Times New Roman;font-size:16px;" valign="top">&nbsp;&nbsp;<b>(2)</b>&nbsp;<input name="RetainQAns2" id="RetainQAns2" style="width:514px;border-bottom-color:#000000;background-color:#E0DBE3;" maxlength="200" value="<?php if($rowch>0){echo $resch['RetainQAns2'];}else{echo ''; } ?>" disabled/></td>
 </tr>
 <tr>
  <td colspan="7" style="font-family:Times New Roman;font-size:16px;" valign="top">&nbsp;&nbsp;<b>(3)</b>&nbsp;<input name="RetainQAns3" id="RetainQAns3" style="width:514px;border-bottom-color:#000000;background-color:#E0DBE3;" maxlength="200" value="<?php if($rowch>0){echo $resch['RetainQAns3'];}else{echo ''; } ?>" disabled/></td>
 </tr>
 
 
  <td colspan="7" align="Right" class="fontButton">
   
   <?php //if($EmployeeId==1305){ ?>
   
   <table>
	<tr> 
	 <td>
	 <input type="button" id="editRes" name="editRes" value="edit" style="display:block;" onClick="Resedit()" <?php if($rowch>0){echo 'disabled';} ?>/>
	 <input type="submit" id="SentRes" name="SentRes" value="send" style="display:none;"/>
	 </td>
	 <td>
	 <input type="button" name="Refrash" value="refresh" onClick="javascript:window.location='EmpSprtion.php?e=4e&w=234&y=10234&a=f&e=4e2&e=4e&w=234&y=110022344&retd=ee&wwrew=t%T@sed818&d=101'" <?php if($rowch>0){echo 'disabled';} ?>/>
	 <input type="button" value="back" onClick="javascript:window.location='Index.php?log=<?php echo $_SESSION['logCheckEmp']; ?>'" <?php if($rowch>0){echo 'disabled';} ?>/>
     </td>
	</tr>
   </table>
   <?php //} ?>
   
  </td>
 </tr>
   </table>
  </td>
</form>
<form name="form3name" method="post" onSubmit="return Vvalidate3(this)">
<td style="display:<?php if($_REQUEST['a']=='c'){echo 'block';}elseif($_REQUEST['a']=='e' OR $_REQUEST['a']=='f'){echo 'none';}?>;">
 <table border="0">
 <tr><td colspan="7" valign="top" style='font-family:Times New Roman; font-size:17px; color:#008800' align="right">
	 <font color="#014E05" style='font-family:Times New Roman;' size="3"><b><?php echo $msg; ?></b></font></td>
 </tr>
  <tr>
  <td align="left" class="font2" style="width:120px;">&nbsp;&nbsp; Date</td><td style="width:10px;"><b>&nbsp;:&nbsp;</b></td>
  <td><input class="input" name="Emp_CanDate" id="Emp_CanDate" value="<?php if($resch['Emp_CancelResig']==1 OR $resch['Emp_CancelResig']==2){echo date("d-m-Y", strtotime($resch['Emp_CanDate']));}else{echo date("d-m-Y"); } ?>" readonly>&nbsp;<button id="f_btnCan" class="CalenderButton" disabled></button>
      <script type="text/javascript">  var cal = Calendar.setup({ onSelect:  function(cal) { cal.hide()}, showTime: true }); 
      cal.manageFields("f_btnCan", "CanDate", "%d-%m-%Y");</script></td>
  <td align="left" class="font2" style="width:120px;" colspan="3"><input type="hidden" name="EmpSepId" value=<?php echo $resch['EmpSepId']; ?> /></td>
	
 </tr>
 <tr>
  <td align="left" class="font2" style="width:120px;" valign="top">&nbsp;&nbsp;Cancel Reason</td><td style="width:10px;" valign="top"><b>&nbsp;:&nbsp;</b></td>
  <td colspan="5" valign="top"><textarea name="Emp_CanReason" id="Emp_CanReason" style="width:400px;border-bottom-color:#000000;" cols="47" rows="6" <?php if($resch['Emp_CancelResig']==2){ echo 'disabled'; }?>><?php if($rowch>0){echo $resch['Emp_CanReason'];}else{echo ''; } ?></textarea></td>
 </tr>
  <td colspan="7" align="Right" class="fontButton">
   <table>
 <tr>
  <td colspan="7" align="Right" class="fontButton">
   <?php if($resch['HR_Approved']=='Y' AND $resch['Emp_CancelResig']==1){ ?><input type="submit" id="SubmitCan" name="SubmitCan" value="submit"/><?php } ?>
   <?php if($resch['HR_Approved']=='Y' AND $resch['Emp_CancelResig']==0){ ?><input type="submit" id="SaveCan" name="SaveCan" value="save"/><?php } ?>
   <input type="button" name="Back" value="back" onClick="javascript:window.location='Index.php?log=<?php echo $_SESSION['logCheckEmp']; ?>'"/>
  </td>
 </tr>
   </table>
  </td>
 </tr>
   </table>
  </td>
</form>
<form enctype="multipart/form-data" name="form2name" method="post" onSubmit="return validate2(this)">  
  <td style="display:<?php if($_REQUEST['a']=='e'){echo 'block';}elseif($_REQUEST['a']=='f' OR $_REQUEST['a']=='c'){echo 'none';}?>;">
   <table>
     <tr><td align="center" colspan="7" valign="top" class="heading">Exit Interview Form
	 <font color="#014E05" style='font-family:Times New Roman;' size="3"><b><?php echo $msg; ?></b></font>
	</td>
 </tr>
 <tr><td style="height:2px;"></td></tr>
  <tr><td align="center" colspan="7" valign="bottom"><font color="#4B315B" style='font-family:Times New Roman;' size="3"><b>4 - High relevance/ 3 - Some relevance/ 2 - Little relevance/ 1- No relevance</b></font>
	</td>
 </tr>
 <tr>
  <td>
   <table border="1">
    <tr bgcolor="#7a6189">
      <td align="center" style="color:#FFFFFF;" class="All_30"><b>Rank</b></td>
	  <td align="center" style="color:#FFFFFF;" class="All_500"><b>Reason</b></td>
	  <td align="center" style="color:#FFFFFF;" class="All_40"><b>4</b></td>
	  <td align="center" style="color:#FFFFFF;" class="All_40"><b>3</b></td>
	  <td align="center" style="color:#FFFFFF;" class="All_40"><b>2</b></td>	
	  <td align="center" style="color:#FFFFFF;" class="All_40"><b>1</b></td>	
    </tr>
<?php $sql=mysql_query("select hrm_employee_separation_exitint.*, Emp_ExitInt from hrm_employee_separation_exitint INNER JOIN hrm_employee_separation ON hrm_employee_separation_exitint.EmpSepId=hrm_employee_separation.EmpSepId where hrm_employee_separation.EmployeeID=".$EmployeeId." AND Rep_Approved!='C' AND Hod_Approved!='C' AND HR_Approved!='C'", $con); $row=mysql_num_rows($sql); if($row>0){$res=mysql_fetch_assoc($sql);} ?>	

<script language="javascript" type="text/javascript">
function FunFRI(v)
{ if(v==1)
  { if(document.getElementById("FRI_1").checked==true){document.getElementById("FRI").value=1; document.getElementById("FRI_2").checked=false; 
    document.getElementById("FRI_3").checked=false; document.getElementById("FRI_4").checked=false;}else{document.getElementById("FRI").value=0;} }
  else if(v==2)
  { if(document.getElementById("FRI_2").checked==true){document.getElementById("FRI").value=2; document.getElementById("FRI_3").checked=false; 
    document.getElementById("FRI_4").checked=false; document.getElementById("FRI_1").checked=false;}else{document.getElementById("FRI").value=0;} }	
  else if(v==3)
  { if(document.getElementById("FRI_3").checked==true){document.getElementById("FRI").value=3; document.getElementById("FRI_4").checked=false; 
    document.getElementById("FRI_1").checked=false; document.getElementById("FRI_2").checked=false;}else{document.getElementById("FRI").value=0;} }
  else if(v==4)
  { if(document.getElementById("FRI_4").checked==true){document.getElementById("FRI").value=4; document.getElementById("FRI_1").checked=false; 
    document.getElementById("FRI_2").checked=false; document.getElementById("FRI_3").checked=false;}else{document.getElementById("FRI").value=0;} }
}
function FunHP(v)
{ if(v==1)
  { if(document.getElementById("HP_1").checked==true){document.getElementById("HP").value=1; document.getElementById("HP_2").checked=false; 
    document.getElementById("HP_3").checked=false; document.getElementById("HP_4").checked=false;}else{document.getElementById("HP").value=0;} }
  else if(v==2)
  { if(document.getElementById("HP_2").checked==true){document.getElementById("HP").value=2; document.getElementById("HP_3").checked=false; 
    document.getElementById("HP_4").checked=false; document.getElementById("HP_1").checked=false;}else{document.getElementById("HP").value=0;} }	
  else if(v==3)
  { if(document.getElementById("HP_3").checked==true){document.getElementById("HP").value=3; document.getElementById("HP_4").checked=false; 
    document.getElementById("HP_1").checked=false; document.getElementById("HP_2").checked=false;}else{document.getElementById("HP").value=0;} }
  else if(v==4)
  { if(document.getElementById("HP_4").checked==true){document.getElementById("HP").value=4; document.getElementById("HP_1").checked=false; 
    document.getElementById("HP_2").checked=false; document.getElementById("HP_3").checked=false;}else{document.getElementById("HP").value=0;} }
}
function FunOB(v)
{ if(v==1)
  { if(document.getElementById("OB_1").checked==true){document.getElementById("OB").value=1; document.getElementById("OB_2").checked=false; 
    document.getElementById("OB_3").checked=false; document.getElementById("OB_4").checked=false;}else{document.getElementById("OB").value=0;} }
  else if(v==2)
  { if(document.getElementById("OB_2").checked==true){document.getElementById("OB").value=2; document.getElementById("OB_3").checked=false; 
    document.getElementById("OB_4").checked=false; document.getElementById("OB_1").checked=false;}else{document.getElementById("OB").value=0;} }	
  else if(v==3)
  { if(document.getElementById("OB_3").checked==true){document.getElementById("OB").value=3; document.getElementById("OB_4").checked=false; 
    document.getElementById("OB_1").checked=false; document.getElementById("OB_2").checked=false;}else{document.getElementById("OB").value=0;} }
  else if(v==4)
  { if(document.getElementById("OB_4").checked==true){document.getElementById("OB").value=4; document.getElementById("OB_1").checked=false; 
    document.getElementById("OB_2").checked=false; document.getElementById("OB_3").checked=false;}else{document.getElementById("OB").value=0;} }
}
</script>	
	<tr bgcolor="#FFFFFF">
      <td align="center" style="" class="All_30" bgcolor="#FFFFD7"><b>I</b></td>
	  <td colspan="6" align="" style="font-size:14px;height:20px;width:660px;font-family:Times New Roman;" bgcolor="#FFFFD7">&nbsp;<b>PERSONAL&nbsp;<font color="#FF0000">*</font></b></td>
    </tr>
	<tr bgcolor="#FFFFFF">
      <td align="center" style="" class="All_30">&nbsp;</td>
	  <td align="" style="" class="All_500">&nbsp;a)&nbsp;Family related issues<input type="hidden" name="FRI" id="FRI" value="<?php if($row>0){echo $res['FRI'];}else{echo 0;} ?>"/></td>
	  <td align="center"><input type="checkbox" id="FRI_4" onClick="FunFRI(4)" <?php if($res['FRI']==4){echo 'checked';} ?>/></td>
	  <td align="center"><input type="checkbox" id="FRI_3" onClick="FunFRI(3)" <?php if($res['FRI']==3){echo 'checked';} ?>/></td>
	  <td align="center"><input type="checkbox" id="FRI_2" onClick="FunFRI(2)" <?php if($res['FRI']==2){echo 'checked';} ?>/></td>	
	  <td align="center"><input type="checkbox" id="FRI_1" onClick="FunFRI(1)" <?php if($res['FRI']==1){echo 'checked';} ?>/></td>	
    </tr>
	<tr bgcolor="#FFFFFF">
      <td align="center" style="" class="All_30">&nbsp;</td>
	  <td align="" style="" class="All_500">&nbsp;b)&nbsp;Health problems<input type="hidden" name="HP" id="HP" value="<?php if($row>0){echo $res['HP'];}else{echo 0;} ?>"/></td>
	  <td align="center"><input type="checkbox" id="HP_4" onClick="FunHP(4)" <?php if($res['HP']==4){echo 'checked';} ?>/></td>
	  <td align="center"><input type="checkbox" id="HP_3" onClick="FunHP(3)" <?php if($res['HP']==3){echo 'checked';} ?>/></td>
	  <td align="center"><input type="checkbox" id="HP_2" onClick="FunHP(2)" <?php if($res['HP']==2){echo 'checked';} ?>/></td>	
	  <td align="center"><input type="checkbox" id="HP_1" onClick="FunHP(1)" <?php if($res['HP']==1){echo 'checked';} ?>/></td>	
    </tr>
	<tr bgcolor="#FFFFFF">
      <td align="center" style="" class="All_30">&nbsp;</td>
	  <td align="" style="" class="All_500">&nbsp;c)&nbsp;Own business<input type="hidden" name="OB" id="OB" value="<?php if($row>0){echo $res['OB'];}else{echo 0;} ?>"/></td>
	  <td align="center"><input type="checkbox" id="OB_4" onClick="FunOB(4)" <?php if($res['OB']==4){echo 'checked';} ?>/></td>
	  <td align="center"><input type="checkbox" id="OB_3" onClick="FunOB(3)" <?php if($res['OB']==3){echo 'checked';} ?>/></td>
	  <td align="center"><input type="checkbox" id="OB_2" onClick="FunOB(2)" <?php if($res['OB']==2){echo 'checked';} ?>/></td>	
	  <td align="center"><input type="checkbox" id="OB_1" onClick="FunOB(1)" <?php if($res['OB']==1){echo 'checked';} ?>/></td>	
    </tr>
<script language="javascript" type="text/javascript">
function FunPGR(v)
{ if(v==1)
  { if(document.getElementById("PGR_1").checked==true){document.getElementById("PGR").value=1; document.getElementById("PGR_2").checked=false; 
    document.getElementById("PGR_3").checked=false; document.getElementById("PGR_4").checked=false;}else{document.getElementById("PGR").value=0;} }
  else if(v==2)
  { if(document.getElementById("PGR_2").checked==true){document.getElementById("PGR").value=2; document.getElementById("PGR_3").checked=false; 
    document.getElementById("PGR_4").checked=false; document.getElementById("PGR_1").checked=false;}else{document.getElementById("PGR").value=0;} }	
  else if(v==3)
  { if(document.getElementById("PGR_3").checked==true){document.getElementById("PGR").value=3; document.getElementById("PGR_4").checked=false; 
    document.getElementById("PGR_1").checked=false; document.getElementById("PGR_2").checked=false;}else{document.getElementById("PGR").value=0;} }
  else if(v==4)
  { if(document.getElementById("PGR_4").checked==true){document.getElementById("PGR").value=4; document.getElementById("PGR_1").checked=false; 
    document.getElementById("PGR_2").checked=false; document.getElementById("PGR_3").checked=false;}else{document.getElementById("PGR").value=0;} }
}
function FunLOC(v)
{ if(v==1)
  { if(document.getElementById("LOC_1").checked==true){document.getElementById("LOC").value=1; document.getElementById("LOC_2").checked=false; 
    document.getElementById("LOC_3").checked=false; document.getElementById("LOC_4").checked=false;}else{document.getElementById("LOC").value=0;} }
  else if(v==2)
  { if(document.getElementById("LOC_2").checked==true){document.getElementById("LOC").value=2; document.getElementById("LOC_3").checked=false; 
    document.getElementById("LOC_4").checked=false; document.getElementById("LOC_1").checked=false;}else{document.getElementById("LOC").value=0;} }	
  else if(v==3)
  { if(document.getElementById("LOC_3").checked==true){document.getElementById("LOC").value=3; document.getElementById("LOC_4").checked=false; 
    document.getElementById("LOC_1").checked=false; document.getElementById("LOC_2").checked=false;}else{document.getElementById("LOC").value=0;} }
  else if(v==4)
  { if(document.getElementById("LOC_4").checked==true){document.getElementById("LOC").value=4; document.getElementById("LOC_1").checked=false; 
    document.getElementById("LOC_2").checked=false; document.getElementById("LOC_3").checked=false;}else{document.getElementById("LOC").value=0;} }
}
function FunLPO(v)
{ if(v==1)
  { if(document.getElementById("LPO_1").checked==true){document.getElementById("LPO").value=1; document.getElementById("LPO_2").checked=false; 
    document.getElementById("LPO_3").checked=false; document.getElementById("LPO_4").checked=false;}else{document.getElementById("LPO").value=0;} }
  else if(v==2)
  { if(document.getElementById("LPO_2").checked==true){document.getElementById("LPO").value=2; document.getElementById("LPO_3").checked=false; 
    document.getElementById("LPO_4").checked=false; document.getElementById("LPO_1").checked=false;}else{document.getElementById("LPO").value=0;} }	
  else if(v==3)
  { if(document.getElementById("LPO_3").checked==true){document.getElementById("LPO").value=3; document.getElementById("LPO_4").checked=false; 
    document.getElementById("LPO_1").checked=false; document.getElementById("LPO_2").checked=false;}else{document.getElementById("LPO").value=0;} }
  else if(v==4)
  { if(document.getElementById("LPO_4").checked==true){document.getElementById("LPO").value=4; document.getElementById("LPO_1").checked=false; 
    document.getElementById("LPO_2").checked=false; document.getElementById("LPO_3").checked=false;}else{document.getElementById("LPO").value=0;} }
}
function FunJANM(v)
{ if(v==1)
  { if(document.getElementById("JANM_1").checked==true){document.getElementById("JANM").value=1; document.getElementById("JANM_2").checked=false; 
    document.getElementById("JANM_3").checked=false; document.getElementById("JANM_4").checked=false;}else{document.getElementById("JANM").value=0;} }
  else if(v==2)
  { if(document.getElementById("JANM_2").checked==true){document.getElementById("JANM").value=2; document.getElementById("JANM_3").checked=false; 
    document.getElementById("JANM_4").checked=false; document.getElementById("JANM_1").checked=false;}else{document.getElementById("JANM").value=0;} }	
  else if(v==3)
  { if(document.getElementById("JANM_3").checked==true){document.getElementById("JANM").value=3; document.getElementById("JANM_4").checked=false; 
    document.getElementById("JANM_1").checked=false; document.getElementById("JANM_2").checked=false;}else{document.getElementById("JANM").value=0;} }
  else if(v==4)
  { if(document.getElementById("JANM_4").checked==true){document.getElementById("JANM").value=4; document.getElementById("JANM_1").checked=false; 
    document.getElementById("JANM_2").checked=false; document.getElementById("JANM_3").checked=false;}else{document.getElementById("JANM").value=0;} }
}
function FunBJBP(v)
{ if(v==1)
  { if(document.getElementById("BJBP_1").checked==true){document.getElementById("BJBP").value=1; document.getElementById("BJBP_2").checked=false; 
    document.getElementById("BJBP_3").checked=false; document.getElementById("BJBP_4").checked=false;}else{document.getElementById("BJBP").value=0;} }
  else if(v==2)
  { if(document.getElementById("BJBP_2").checked==true){document.getElementById("BJBP").value=2; document.getElementById("BJBP_3").checked=false; 
    document.getElementById("BJBP_4").checked=false; document.getElementById("BJBP_1").checked=false;}else{document.getElementById("BJBP").value=0;} }	
  else if(v==3)
  { if(document.getElementById("BJBP_3").checked==true){document.getElementById("BJBP").value=3; document.getElementById("BJBP_4").checked=false; 
    document.getElementById("BJBP_1").checked=false; document.getElementById("BJBP_2").checked=false;}else{document.getElementById("BJBP").value=0;} }
  else if(v==4)
  { if(document.getElementById("BJBP_4").checked==true){document.getElementById("BJBP").value=4; document.getElementById("BJBP_1").checked=false; 
    document.getElementById("BJBP_2").checked=false; document.getElementById("BJBP_3").checked=false;}else{document.getElementById("BJBP").value=0;} }
}
function FunHS(v)
{ if(v==1)
  { if(document.getElementById("HS_1").checked==true){document.getElementById("HS").value=1; document.getElementById("HS_2").checked=false; 
    document.getElementById("HS_3").checked=false; document.getElementById("HS_4").checked=false;}else{document.getElementById("HS").value=0;} }
  else if(v==2)
  { if(document.getElementById("HS_2").checked==true){document.getElementById("HS").value=2; document.getElementById("HS_3").checked=false; 
    document.getElementById("HS_4").checked=false; document.getElementById("HS_1").checked=false;}else{document.getElementById("HS").value=0;} }	
  else if(v==3)
  { if(document.getElementById("HS_3").checked==true){document.getElementById("HS").value=3; document.getElementById("HS_4").checked=false; 
    document.getElementById("HS_1").checked=false; document.getElementById("HS_2").checked=false;}else{document.getElementById("HS").value=0;} }
  else if(v==4)
  { if(document.getElementById("HS_4").checked==true){document.getElementById("HS").value=4; document.getElementById("HS_1").checked=false; 
    document.getElementById("HS_2").checked=false; document.getElementById("HS_3").checked=false;}else{document.getElementById("HS").value=0;} }
}
</script>	
	<tr bgcolor="#FFFFFF">
      <td align="center" style="" class="All_30" bgcolor="#FFFFD7"><b>II</b></td>
	  <td colspan="6" align="" style="font-size:14px;height:20px;width:660px;font-family:Times New Roman;" bgcolor="#FFFFD7">&nbsp;<b>PROFESSIONAL GROWTH RELATED&nbsp;<font color="#FF0000">*</font></b></td>
    </tr>
	<tr bgcolor="#FFFFFF">
      <td align="center" style="" class="All_30">&nbsp;</td>
	  <td align="" style="" class="All_500">&nbsp;a)&nbsp;Inadequate training and development activities.<input type="hidden" name="PGR" id="PGR" value="<?php if($row>0){echo $res['PGR'];}else{echo 0;} ?>"/></td>
	  <td align="center"><input type="checkbox" id="PGR_4" onClick="FunPGR(4)" <?php if($res['PGR']==4){echo 'checked';} ?>/></td>
	  <td align="center"><input type="checkbox" id="PGR_3" onClick="FunPGR(3)" <?php if($res['PGR']==3){echo 'checked';} ?>/></td>
	  <td align="center"><input type="checkbox" id="PGR_2" onClick="FunPGR(2)" <?php if($res['PGR']==2){echo 'checked';} ?>/></td>	
	  <td align="center"><input type="checkbox" id="PGR_1" onClick="FunPGR(1)" <?php if($res['PGR']==1){echo 'checked';} ?>/></td>	
    </tr>
	<tr bgcolor="#FFFFFF">
      <td align="center" style="" class="All_30">&nbsp;</td>
	  <td align="" style="" class="All_500">&nbsp;b)&nbsp;Lack of challenge in the work.<input type="hidden" name="LOC" id="LOC" value="<?php if($row>0){echo $res['LOC'];}else{echo 0;} ?>"/></td>
	  <td align="center"><input type="checkbox" id="LOC_4" onClick="FunLOC(4)" <?php if($res['LOC']==4){echo 'checked';} ?>/></td>
	  <td align="center"><input type="checkbox" id="LOC_3" onClick="FunLOC(3)" <?php if($res['LOC']==3){echo 'checked';} ?>/></td>
	  <td align="center"><input type="checkbox" id="LOC_2" onClick="FunLOC(2)" <?php if($res['LOC']==2){echo 'checked';} ?>/></td>	
	  <td align="center"><input type="checkbox" id="LOC_1" onClick="FunLOC(1)" <?php if($res['LOC']==1){echo 'checked';} ?>/></td>	
    </tr>
	<tr bgcolor="#FFFFFF">
      <td align="center" style="" class="All_30">&nbsp;</td>
	  <td align="" style="" class="All_500">&nbsp;c)&nbsp;Low Promotional opportunities.<input type="hidden" name="LPO" id="LPO" value="<?php if($row>0){echo $res['LPO'];}else{echo 0;} ?>"/></td>
	  <td align="center"><input type="checkbox" id="LPO_4" onClick="FunLPO(4)" <?php if($res['LPO']==4){echo 'checked';} ?>/></td>
	  <td align="center"><input type="checkbox" id="LPO_3" onClick="FunLPO(3)" <?php if($res['LPO']==3){echo 'checked';} ?>/></td>
	  <td align="center"><input type="checkbox" id="LPO_2" onClick="FunLPO(2)" <?php if($res['LPO']==2){echo 'checked';} ?>/></td>	
	  <td align="center"><input type="checkbox" id="LPO_1" onClick="FunLPO(1)" <?php if($res['LPO']==1){echo 'checked';} ?>/></td>		
    </tr>
		<tr bgcolor="#FFFFFF">
      <td align="center" style="" class="All_30">&nbsp;</td>
	  <td align="" style="" class="All_500">&nbsp;d)&nbsp;Job allotted not matching with job aspirations.<input type="hidden" name="JANM" id="JANM" value="<?php if($row>0){echo $res['JANM'];}else{echo 0;} ?>"/></td>
	  <td align="center"><input type="checkbox" id="JANM_4" onClick="FunJANM(4)" <?php if($res['JANM']==4){echo 'checked';} ?>/></td>
	  <td align="center"><input type="checkbox" id="JANM_3" onClick="FunJANM(3)" <?php if($res['JANM']==3){echo 'checked';} ?>/></td>
	  <td align="center"><input type="checkbox" id="JANM_2" onClick="FunJANM(2)" <?php if($res['JANM']==2){echo 'checked';} ?>/></td>	
	  <td align="center"><input type="checkbox" id="JANM_1" onClick="FunJANM(1)" <?php if($res['JANM']==1){echo 'checked';} ?>/></td>	
    </tr>
	<tr bgcolor="#FFFFFF">
      <td align="center" style="" class="All_30">&nbsp;</td>
	  <td align="" style="" class="All_500">&nbsp;e)&nbsp;Better job/ better prospects<input type="hidden" name="BJBP" id="BJBP" value="<?php if($row>0){echo $res['BJBP'];}else{echo 0;} ?>"/></td>
	  <td align="center"><input type="checkbox" id="BJBP_4" onClick="FunBJBP(4)" <?php if($res['BJBP']==4){echo 'checked';} ?>/></td>
	  <td align="center"><input type="checkbox" id="BJBP_3" onClick="FunBJBP(3)" <?php if($res['BJBP']==3){echo 'checked';} ?>/></td>
	  <td align="center"><input type="checkbox" id="BJBP_2" onClick="FunBJBP(2)" <?php if($res['BJBP']==2){echo 'checked';} ?>/></td>	
	  <td align="center"><input type="checkbox" id="BJBP_1" onClick="FunBJBP(1)" <?php if($res['BJBP']==1){echo 'checked';} ?>/></td>	
    </tr>
	<tr bgcolor="#FFFFFF">
      <td align="center" style="" class="All_30">&nbsp;</td>
	  <td align="" style="" class="All_500">&nbsp;f)&nbsp;Higher studies<input type="hidden" name="HS" id="HS" value="<?php if($row>0){echo $res['HS'];}else{echo 0;} ?>"/></td>
	  <td align="center"><input type="checkbox" id="HS_4" onClick="FunHS(4)" <?php if($res['HS']==4){echo 'checked';} ?>/></td>
	  <td align="center"><input type="checkbox" id="HS_3" onClick="FunHS(3)" <?php if($res['HS']==3){echo 'checked';} ?>/></td>
	  <td align="center"><input type="checkbox" id="HS_2" onClick="FunHS(2)" <?php if($res['HS']==2){echo 'checked';} ?>/></td>	
	  <td align="center"><input type="checkbox" id="HS_1" onClick="FunHS(1)" <?php if($res['HS']==1){echo 'checked';} ?>/></td>		
    </tr>	
<script language="javascript" type="text/javascript">
function FunLOCOP(v)
{ if(v==1)
  { if(document.getElementById("LOCOP_1").checked==true){document.getElementById("LOCOP").value=1; document.getElementById("LOCOP_2").checked=false; 
    document.getElementById("LOCOP_3").checked=false; document.getElementById("LOCOP_4").checked=false;}else{document.getElementById("LOCOP").value=0;} }
  else if(v==2)
  { if(document.getElementById("LOCOP_2").checked==true){document.getElementById("LOCOP").value=2; document.getElementById("LOCOP_3").checked=false; 
    document.getElementById("LOCOP_4").checked=false; document.getElementById("LOCOP_1").checked=false;}else{document.getElementById("LOCOP").value=0;} }	
  else if(v==3)
  { if(document.getElementById("LOCOP_3").checked==true){document.getElementById("LOCOP").value=3; document.getElementById("LOCOP_4").checked=false; 
    document.getElementById("LOCOP_1").checked=false; document.getElementById("LOCOP_2").checked=false;}else{document.getElementById("LOCOP").value=0;} }
  else if(v==4)
  { if(document.getElementById("LOCOP_4").checked==true){document.getElementById("LOCOP").value=4; document.getElementById("LOCOP_1").checked=false; 
    document.getElementById("LOCOP_2").checked=false; document.getElementById("LOCOP_3").checked=false;}else{document.getElementById("LOCOP").value=0;} }
}
function FunIAU(v)
{ if(v==1)
  { if(document.getElementById("IAU_1").checked==true){document.getElementById("IAU").value=1; document.getElementById("IAU_2").checked=false; 
    document.getElementById("IAU_3").checked=false; document.getElementById("IAU_4").checked=false;}else{document.getElementById("IAU").value=0;} }
  else if(v==2)
  { if(document.getElementById("IAU_2").checked==true){document.getElementById("IAU").value=2; document.getElementById("IAU_3").checked=false; 
    document.getElementById("IAU_4").checked=false; document.getElementById("IAU_1").checked=false;}else{document.getElementById("IAU").value=0;} }	
  else if(v==3)
  { if(document.getElementById("IAU_3").checked==true){document.getElementById("IAU").value=3; document.getElementById("IAU_4").checked=false; 
    document.getElementById("IAU_1").checked=false; document.getElementById("IAU_2").checked=false;}else{document.getElementById("IAU").value=0;} }
  else if(v==4)
  { if(document.getElementById("IAU_4").checked==true){document.getElementById("IAU").value=4; document.getElementById("IAU_1").checked=false; 
    document.getElementById("IAU_2").checked=false; document.getElementById("IAU_3").checked=false;}else{document.getElementById("IAU").value=0;} }
}
function FunLOCOM(v)
{ if(v==1)
  { if(document.getElementById("LOCOM_1").checked==true){document.getElementById("LOCOM").value=1; document.getElementById("LOCOM_2").checked=false; 
    document.getElementById("LOCOM_3").checked=false; document.getElementById("LOCOM_4").checked=false;}else{document.getElementById("LOCOM").value=0;} }
  else if(v==2)
  { if(document.getElementById("LOCOM_2").checked==true){document.getElementById("LOCOM").value=2; document.getElementById("LOCOM_3").checked=false; 
    document.getElementById("LOCOM_4").checked=false; document.getElementById("LOCOM_1").checked=false;}else{document.getElementById("LOCOM").value=0;} }	
  else if(v==3)
  { if(document.getElementById("LOCOM_3").checked==true){document.getElementById("LOCOM").value=3; document.getElementById("LOCOM_4").checked=false; 
    document.getElementById("LOCOM_1").checked=false; document.getElementById("LOCOM_2").checked=false;}else{document.getElementById("LOCOM").value=0;} }
  else if(v==4)
  { if(document.getElementById("LOCOM_4").checked==true){document.getElementById("LOCOM").value=4; document.getElementById("LOCOM_1").checked=false; 
    document.getElementById("LOCOM_2").checked=false; document.getElementById("LOCOM_3").checked=false;}else{document.getElementById("LOCOM").value=0;} }
}
function FunDIDM(v)
{ if(v==1)
  { if(document.getElementById("DIDM_1").checked==true){document.getElementById("DIDM").value=1; document.getElementById("DIDM_2").checked=false; 
    document.getElementById("DIDM_3").checked=false; document.getElementById("DIDM_4").checked=false;}else{document.getElementById("DIDM").value=0;} }
  else if(v==2)
  { if(document.getElementById("DIDM_2").checked==true){document.getElementById("DIDM").value=2; document.getElementById("DIDM_3").checked=false; 
    document.getElementById("DIDM_4").checked=false; document.getElementById("DIDM_1").checked=false;}else{document.getElementById("DIDM").value=0;} }	
  else if(v==3)
  { if(document.getElementById("DIDM_3").checked==true){document.getElementById("DIDM").value=3; document.getElementById("DIDM_4").checked=false; 
    document.getElementById("DIDM_1").checked=false; document.getElementById("DIDM_2").checked=false;}else{document.getElementById("DIDM").value=0;} }
  else if(v==4)
  { if(document.getElementById("DIDM_4").checked==true){document.getElementById("DIDM").value=4; document.getElementById("DIDM_1").checked=false; 
    document.getElementById("DIDM_2").checked=false; document.getElementById("DIDM_3").checked=false;}else{document.getElementById("DIDM").value=0;} }
}
function FunUTP(v)
{ if(v==1)
  { if(document.getElementById("UTP_1").checked==true){document.getElementById("UTP").value=1; document.getElementById("UTP_2").checked=false; 
    document.getElementById("UTP_3").checked=false; document.getElementById("UTP_4").checked=false;}else{document.getElementById("UTP").value=0;} }
  else if(v==2)
  { if(document.getElementById("UTP_2").checked==true){document.getElementById("UTP").value=2; document.getElementById("UTP_3").checked=false; 
    document.getElementById("UTP_4").checked=false; document.getElementById("UTP_1").checked=false;}else{document.getElementById("UTP").value=0;} }	
  else if(v==3)
  { if(document.getElementById("UTP_3").checked==true){document.getElementById("UTP").value=3; document.getElementById("UTP_4").checked=false; 
    document.getElementById("UTP_1").checked=false; document.getElementById("UTP_2").checked=false;}else{document.getElementById("UTP").value=0;} }
  else if(v==4)
  { if(document.getElementById("UTP_4").checked==true){document.getElementById("UTP").value=4; document.getElementById("UTP_1").checked=false; 
    document.getElementById("UTP_2").checked=false; document.getElementById("UTP_3").checked=false;}else{document.getElementById("UTP").value=0;} }
}
</script>	
	<tr bgcolor="#FFFFFF">
      <td align="center" style="" class="All_30" bgcolor="#FFFFD7"><b>III</b></td>
	  <td colspan="6" align="" style="font-size:14px;height:20px;width:660px;font-family:Times New Roman;" bgcolor="#FFFFD7">&nbsp;<b>PROFESSIONAL ATMOSPHERE CONDITIONS&nbsp;<font color="#FF0000">*</font></b></td>
    </tr>
	<tr bgcolor="#FFFFFF">
      <td align="center" style="" class="All_30">&nbsp;</td>
	  <td align="" style="" class="All_500">&nbsp;a)&nbsp;Lack of clarity on policies<input type="hidden" name="LOCOP" id="LOCOP" value="<?php if($row>0){echo $res['LOCOP'];}else{echo 0;} ?>"/></td>
	  <td align="center"><input type="checkbox" id="LOCOP_4" onClick="FunLOCOP(4)" <?php if($res['LOCOP']==4){echo 'checked';} ?>/></td>
	  <td align="center"><input type="checkbox" id="LOCOP_3" onClick="FunLOCOP(3)" <?php if($res['LOCOP']==3){echo 'checked';} ?>/></td>
	  <td align="center"><input type="checkbox" id="LOCOP_2" onClick="FunLOCOP(2)" <?php if($res['LOCOP']==2){echo 'checked';} ?>/></td>	
	  <td align="center"><input type="checkbox" id="LOCOP_1" onClick="FunLOCOP(1)" <?php if($res['LOCOP']==1){echo 'checked';} ?>/></td>	
    </tr>
	<tr bgcolor="#FFFFFF">
      <td align="center" style="" class="All_30">&nbsp;</td>
	  <td align="" style="" class="All_500">&nbsp;b)&nbsp;Insecurity and uncertainty in day-to-day working<input type="hidden" name="IAU" id="IAU" value="<?php if($row>0){echo $res['IAU'];}else{echo 0;} ?>"/></td>
	  <td align="center"><input type="checkbox" id="IAU_4" onClick="FunIAU(4)" <?php if($res['IAU']==4){echo 'checked';} ?>/></td>
	  <td align="center"><input type="checkbox" id="IAU_3" onClick="FunIAU(3)" <?php if($res['IAU']==3){echo 'checked';} ?>/></td>
	  <td align="center"><input type="checkbox" id="IAU_2" onClick="FunIAU(2)" <?php if($res['IAU']==2){echo 'checked';} ?>/></td>	
	  <td align="center"><input type="checkbox" id="IAU_1" onClick="FunIAU(1)" <?php if($res['IAU']==1){echo 'checked';} ?>/></td>	
    </tr>
	<tr bgcolor="#FFFFFF">
      <td align="center" style="" class="All_30">&nbsp;</td>
	  <td align="" style="" class="All_500">&nbsp;c)&nbsp;Lack of communication<input type="hidden" name="LOCOM" id="LOCOM" value="<?php if($row>0){echo $res['LOCOM'];}else{echo 0;} ?>"/></td>
	  <td align="center"><input type="checkbox" id="LOCOM_4" onClick="FunLOCOM(4)" <?php if($res['LOCOM']==4){echo 'checked';} ?>/></td>
	  <td align="center"><input type="checkbox" id="LOCOM_3" onClick="FunLOCOM(3)" <?php if($res['LOCOM']==3){echo 'checked';} ?>/></td>
	  <td align="center"><input type="checkbox" id="LOCOM_2" onClick="FunLOCOM(2)" <?php if($res['LOCOM']==2){echo 'checked';} ?>/></td>	
	  <td align="center"><input type="checkbox" id="LOCOM_1" onClick="FunLOCOM(1)" <?php if($res['LOCOM']==1){echo 'checked';} ?>/></td>		
    </tr>
		<tr bgcolor="#FFFFFF">
      <td align="center" style="" class="All_30">&nbsp;</td>
	  <td align="" style="" class="All_500">&nbsp;d)&nbsp;Delays in decision-making<input type="hidden" name="DIDM" id="DIDM" value="<?php if($row>0){echo $res['DIDM'];}else{echo 0;} ?>"/></td>
	  <td align="center"><input type="checkbox" id="DIDM_4" onClick="FunDIDM(4)" <?php if($res['DIDM']==4){echo 'checked';} ?>/></td>
	  <td align="center"><input type="checkbox" id="DIDM_3" onClick="FunDIDM(3)" <?php if($res['DIDM']==3){echo 'checked';} ?>/></td>
	  <td align="center"><input type="checkbox" id="DIDM_2" onClick="FunDIDM(2)" <?php if($res['DIDM']==2){echo 'checked';} ?>/></td>	
	  <td align="center"><input type="checkbox" id="DIDM_1" onClick="FunDIDM(1)" <?php if($res['DIDM']==1){echo 'checked';} ?>/></td>	
    </tr>
	<tr bgcolor="#FFFFFF">
      <td align="center" style="" class="All_30">&nbsp;</td>
	  <td align="" style="" class="All_500">&nbsp;e)&nbsp;Unfair treatment, partiality<input type="hidden" name="UTP" id="UTP" value="<?php if($row>0){echo $res['UTP'];}else{echo 0;} ?>"/></td>
	  <td align="center"><input type="checkbox" id="UTP_4" onClick="FunUTP(4)" <?php if($res['UTP']==4){echo 'checked';} ?>/></td>
	  <td align="center"><input type="checkbox" id="UTP_3" onClick="FunUTP(3)" <?php if($res['UTP']==3){echo 'checked';} ?>/></td>
	  <td align="center"><input type="checkbox" id="UTP_2" onClick="FunUTP(2)" <?php if($res['UTP']==2){echo 'checked';} ?>/></td>	
	  <td align="center"><input type="checkbox" id="UTP_1" onClick="FunUTP(1)" <?php if($res['UTP']==1){echo 'checked';} ?>/></td>	
    </tr>
<script language="javascript" type="text/javascript">
function FunUS(v)
{ if(v==1)
  { if(document.getElementById("US_1").checked==true){document.getElementById("US").value=1; document.getElementById("US_2").checked=false; 
    document.getElementById("US_3").checked=false; document.getElementById("US_4").checked=false;}else{document.getElementById("US").value=0;} }
  else if(v==2)
  { if(document.getElementById("US_2").checked==true){document.getElementById("US").value=2; document.getElementById("US_3").checked=false; 
    document.getElementById("US_4").checked=false; document.getElementById("US_1").checked=false;}else{document.getElementById("US").value=0;} }	
  else if(v==3)
  { if(document.getElementById("US_3").checked==true){document.getElementById("US").value=3; document.getElementById("US_4").checked=false; 
    document.getElementById("US_1").checked=false; document.getElementById("US_2").checked=false;}else{document.getElementById("US").value=0;} }
  else if(v==4)
  { if(document.getElementById("US_4").checked==true){document.getElementById("US").value=4; document.getElementById("US_1").checked=false; 
    document.getElementById("US_2").checked=false; document.getElementById("US_3").checked=false;}else{document.getElementById("US").value=0;} }
}
function FunHJ(v)
{ if(v==1)
  { if(document.getElementById("HJ_1").checked==true){document.getElementById("HJ").value=1; document.getElementById("HJ_2").checked=false; 
    document.getElementById("HJ_3").checked=false; document.getElementById("HJ_4").checked=false;}else{document.getElementById("HJ").value=0;} }
  else if(v==2)
  { if(document.getElementById("HJ_2").checked==true){document.getElementById("HJ").value=2; document.getElementById("HJ_3").checked=false; 
    document.getElementById("HJ_4").checked=false; document.getElementById("HJ_1").checked=false;}else{document.getElementById("HJ").value=0;} }	
  else if(v==3)
  { if(document.getElementById("HJ_3").checked==true){document.getElementById("HJ").value=3; document.getElementById("HJ_4").checked=false; 
    document.getElementById("HJ_1").checked=false; document.getElementById("HJ_2").checked=false;}else{document.getElementById("HJ").value=0;} }
  else if(v==4)
  { if(document.getElementById("HJ_4").checked==true){document.getElementById("HJ").value=4; document.getElementById("HJ_1").checked=false; 
    document.getElementById("HJ_2").checked=false; document.getElementById("HJ_3").checked=false;}else{document.getElementById("HJ").value=0;} }
}
function FunWH(v)
{ if(v==1)
  { if(document.getElementById("WH_1").checked==true){document.getElementById("WH").value=1; document.getElementById("WH_2").checked=false; 
    document.getElementById("WH_3").checked=false; document.getElementById("WH_4").checked=false;}else{document.getElementById("WH").value=0;} }
  else if(v==2)
  { if(document.getElementById("WH_2").checked==true){document.getElementById("WH").value=2; document.getElementById("WH_3").checked=false; 
    document.getElementById("WH_4").checked=false; document.getElementById("WH_1").checked=false;}else{document.getElementById("WH").value=0;} }	
  else if(v==3)
  { if(document.getElementById("WH_3").checked==true){document.getElementById("WH").value=3; document.getElementById("WH_4").checked=false; 
    document.getElementById("WH_1").checked=false; document.getElementById("WH_2").checked=false;}else{document.getElementById("WH").value=0;} }
  else if(v==4)
  { if(document.getElementById("WH_4").checked==true){document.getElementById("WH").value=4; document.getElementById("WH_1").checked=false; 
    document.getElementById("WH_2").checked=false; document.getElementById("WH_3").checked=false;}else{document.getElementById("WH").value=0;} }
}
function FunJITM(v)
{ if(v==1)
  { if(document.getElementById("JITM_1").checked==true){document.getElementById("JITM").value=1; document.getElementById("JITM_2").checked=false; 
    document.getElementById("JITM_3").checked=false; document.getElementById("JITM_4").checked=false;}else{document.getElementById("JITM").value=0;} }
  else if(v==2)
  { if(document.getElementById("JITM_2").checked==true){document.getElementById("JITM").value=2; document.getElementById("JITM_3").checked=false; 
    document.getElementById("JITM_4").checked=false; document.getElementById("JITM_1").checked=false;}else{document.getElementById("JITM").value=0;} }	
  else if(v==3)
  { if(document.getElementById("JITM_3").checked==true){document.getElementById("JITM").value=3; document.getElementById("JITM_4").checked=false; 
    document.getElementById("JITM_1").checked=false; document.getElementById("JITM_2").checked=false;}else{document.getElementById("JITM").value=0;} }
  else if(v==4)
  { if(document.getElementById("JITM_4").checked==true){document.getElementById("JITM").value=4; document.getElementById("JITM_1").checked=false; 
    document.getElementById("JITM_2").checked=false; document.getElementById("JITM_3").checked=false;}else{document.getElementById("JITM").value=0;} }
}
function FunNFOC(v)
{ if(v==1)
  { if(document.getElementById("NFOC_1").checked==true){document.getElementById("NFOC").value=1; document.getElementById("NFOC_2").checked=false; 
    document.getElementById("NFOC_3").checked=false; document.getElementById("NFOC_4").checked=false;}else{document.getElementById("NFOC").value=0;} }
  else if(v==2)
  { if(document.getElementById("NFOC_2").checked==true){document.getElementById("NFOC").value=2; document.getElementById("NFOC_3").checked=false; 
    document.getElementById("NFOC_4").checked=false; document.getElementById("NFOC_1").checked=false;}else{document.getElementById("NFOC").value=0;} }	
  else if(v==3)
  { if(document.getElementById("NFOC_3").checked==true){document.getElementById("NFOC").value=3; document.getElementById("NFOC_4").checked=false; 
    document.getElementById("NFOC_1").checked=false; document.getElementById("NFOC_2").checked=false;}else{document.getElementById("NFOC").value=0;} }
  else if(v==4)
  { if(document.getElementById("NFOC_4").checked==true){document.getElementById("NFOC").value=4; document.getElementById("NFOC_1").checked=false; 
    document.getElementById("NFOC_2").checked=false; document.getElementById("NFOC_3").checked=false;}else{document.getElementById("NFOC").value=0;} }
}
</script>	
	<tr bgcolor="#FFFFFF">
      <td align="center" style="" class="All_30" bgcolor="#FFFFD7"><b>IV</b></td>
	  <td colspan="6" align="" style="font-size:14px;height:20px;width:660px;font-family:Times New Roman;" bgcolor="#FFFFD7">&nbsp;<b>PROFESSIONAL WORKING CONDITIONS&nbsp;<font color="#FF0000">*</font></b></td>
    </tr>
	<tr bgcolor="#FFFFFF">
      <td align="center" style="" class="All_30">&nbsp;</td>
	  <td align="" style="" class="All_500">&nbsp;a)&nbsp;Unclean Surroundings<input type="hidden" name="US" id="US" value="<?php if($row>0){echo $res['US'];}else{echo 0;} ?>"/></td>
	  <td align="center"><input type="checkbox" id="US_4" onClick="FunUS(4)" <?php if($res['US']==4){echo 'checked';} ?>/></td>
	  <td align="center"><input type="checkbox" id="US_3" onClick="FunUS(3)" <?php if($res['US']==3){echo 'checked';} ?>/></td>
	  <td align="center"><input type="checkbox" id="US_2" onClick="FunUS(2)" <?php if($res['US']==2){echo 'checked';} ?>/></td>	
	  <td align="center"><input type="checkbox" id="US_1" onClick="FunUS(1)" <?php if($res['US']==1){echo 'checked';} ?>/></td>	
    </tr>
	<tr bgcolor="#FFFFFF">
      <td align="center" style="" class="All_30">&nbsp;</td>
	  <td align="" style="" class="All_500">&nbsp;b)&nbsp;Hardship/ Job is too stressful<input type="hidden" name="HJ" id="HJ" value="<?php if($row>0){echo $res['HJ'];}else{echo 0;} ?>"/></td>
	  <td align="center"><input type="checkbox" id="HJ_4" onClick="FunHJ(4)" <?php if($res['HJ']==4){echo 'checked';} ?>/></td>
	  <td align="center"><input type="checkbox" id="HJ_3" onClick="FunHJ(3)" <?php if($res['HJ']==3){echo 'checked';} ?>/></td>
	  <td align="center"><input type="checkbox" id="HJ_2" onClick="FunHJ(2)" <?php if($res['HJ']==2){echo 'checked';} ?>/></td>	
	  <td align="center"><input type="checkbox" id="HJ_1" onClick="FunHJ(1)" <?php if($res['HJ']==1){echo 'checked';} ?>/></td>	
    </tr>
	<tr bgcolor="#FFFFFF">
      <td align="center" style="" class="All_30">&nbsp;</td>
	  <td align="" style="" class="All_500">&nbsp;c)&nbsp;Working hours<input type="hidden" name="WH" id="WH" value="<?php if($row>0){echo $res['WH'];}else{echo 0;} ?>"/></td>
	  <td align="center"><input type="checkbox" id="WH_4" onClick="FunWH(4)" <?php if($res['WH']==4){echo 'checked';} ?>/></td>
	  <td align="center"><input type="checkbox" id="WH_3" onClick="FunWH(3)" <?php if($res['WH']==3){echo 'checked';} ?>/></td>
	  <td align="center"><input type="checkbox" id="WH_2" onClick="FunWH(2)" <?php if($res['WH']==2){echo 'checked';} ?>/></td>	
	  <td align="center"><input type="checkbox" id="WH_1" onClick="FunWH(1)" <?php if($res['WH']==1){echo 'checked';} ?>/></td>		
    </tr>
		<tr bgcolor="#FFFFFF">
      <td align="center" style="" class="All_30">&nbsp;</td>
	  <td align="" style="" class="All_500">&nbsp;d)&nbsp;Job involves too much of travel<input type="hidden" name="JITM" id="JITM" value="<?php if($row>0){echo $res['JITM'];}else{echo 0;} ?>"/></td>
	  <td align="center"><input type="checkbox" id="JITM_4" onClick="FunJITM(4)" <?php if($res['JITM']==4){echo 'checked';} ?>/></td>
	  <td align="center"><input type="checkbox" id="JITM_3" onClick="FunJITM(3)" <?php if($res['JITM']==3){echo 'checked';} ?>/></td>
	  <td align="center"><input type="checkbox" id="JITM_2" onClick="FunJITM(2)" <?php if($res['JITM']==2){echo 'checked';} ?>/></td>	
	  <td align="center"><input type="checkbox" id="JITM_1" onClick="FunJITM(1)" <?php if($res['JITM']==1){echo 'checked';} ?>/></td>	
    </tr>
	<tr bgcolor="#FFFFFF">
      <td align="center" style="" class="All_30">&nbsp;</td>
	  <td align="" style="" class="All_500">&nbsp;e)&nbsp;Non Fulfillment of commitments by the company<input type="hidden" name="NFOC" id="NFOC" value="<?php if($row>0){echo $res['NFOC'];}else{echo 0;} ?>"/></td>
	  <td align="center"><input type="checkbox" id="NFOC_4" onClick="FunNFOC(4)" <?php if($res['NFOC']==4){echo 'checked';} ?>/></td>
	  <td align="center"><input type="checkbox" id="NFOC_3" onClick="FunNFOC(3)" <?php if($res['NFOC']==3){echo 'checked';} ?>/></td>
	  <td align="center"><input type="checkbox" id="NFOC_2" onClick="FunNFOC(2)" <?php if($res['NFOC']==2){echo 'checked';} ?>/></td>	
	  <td align="center"><input type="checkbox" id="NFOC_1" onClick="FunNFOC(1)" <?php if($res['NFOC']==1){echo 'checked';} ?>/></td>	
    </tr>
<script language="javascript" type="text/javascript">
function FunIPI(v)
{ if(v==1)
  { if(document.getElementById("IPI_1").checked==true){document.getElementById("IPI").value=1; document.getElementById("IPI_2").checked=false; 
    document.getElementById("IPI_3").checked=false; document.getElementById("IPI_4").checked=false;}else{document.getElementById("IPI").value=0;} }
  else if(v==2)
  { if(document.getElementById("IPI_2").checked==true){document.getElementById("IPI").value=2; document.getElementById("IPI_3").checked=false; 
    document.getElementById("IPI_4").checked=false; document.getElementById("IPI_1").checked=false;}else{document.getElementById("IPI").value=0;} }	
  else if(v==3)
  { if(document.getElementById("IPI_3").checked==true){document.getElementById("IPI").value=3; document.getElementById("IPI_4").checked=false; 
    document.getElementById("IPI_1").checked=false; document.getElementById("IPI_2").checked=false;}else{document.getElementById("IPI").value=0;} }
  else if(v==4)
  { if(document.getElementById("IPI_4").checked==true){document.getElementById("IPI").value=4; document.getElementById("IPI_1").checked=false; 
    document.getElementById("IPI_2").checked=false; document.getElementById("IPI_3").checked=false;}else{document.getElementById("IPI").value=0;} }
}
function FunIIAB(v)
{ if(v==1)
  { if(document.getElementById("IIAB_1").checked==true){document.getElementById("IIAB").value=1; document.getElementById("IIAB_2").checked=false; 
    document.getElementById("IIAB_3").checked=false; document.getElementById("IIAB_4").checked=false;}else{document.getElementById("IIAB").value=0;} }
  else if(v==2)
  { if(document.getElementById("IIAB_2").checked==true){document.getElementById("IIAB").value=2; document.getElementById("IIAB_3").checked=false; 
    document.getElementById("IIAB_4").checked=false; document.getElementById("IIAB_1").checked=false;}else{document.getElementById("IIAB").value=0;} }	
  else if(v==3)
  { if(document.getElementById("IIAB_3").checked==true){document.getElementById("IIAB").value=3; document.getElementById("IIAB_4").checked=false; 
    document.getElementById("IIAB_1").checked=false; document.getElementById("IIAB_2").checked=false;}else{document.getElementById("IIAB").value=0;} }
  else if(v==4)
  { if(document.getElementById("IIAB_4").checked==true){document.getElementById("IIAB").value=4; document.getElementById("IIAB_1").checked=false; 
    document.getElementById("IIAB_2").checked=false; document.getElementById("IIAB_3").checked=false;}else{document.getElementById("IIAB").value=0;} }
}
</script>	
	<tr bgcolor="#FFFFFF">
      <td align="center" style="" class="All_30" bgcolor="#FFFFD7"><b>V</b></td>
	  <td colspan="6" align="" style="font-size:14px;height:20px;width:660px;font-family:Times New Roman;" bgcolor="#FFFFD7">&nbsp;<b>PROFESSIONAL COMPENSATION RELATED&nbsp;<font color="#FF0000">*</font></b></td>
    </tr>
	<tr bgcolor="#FFFFFF">
      <td align="center" style="" class="All_30">&nbsp;</td>
	  <td align="" style="" class="All_500">&nbsp;a)&nbsp;Inadequate pay & Increments in relation to the industry<input type="hidden" name="IPI" id="IPI" value="<?php if($row>0){echo $res['IPI'];}else{echo 0;} ?>"/></td>
	  <td align="center"><input type="checkbox" id="IPI_4" onClick="FunIPI(4)" <?php if($res['IPI']==4){echo 'checked';} ?>/></td>
	  <td align="center"><input type="checkbox" id="IPI_3" onClick="FunIPI(3)" <?php if($res['IPI']==3){echo 'checked';} ?>/></td>
	  <td align="center"><input type="checkbox" id="IPI_2" onClick="FunIPI(2)" <?php if($res['IPI']==2){echo 'checked';} ?>/></td>	
	  <td align="center"><input type="checkbox" id="IPI_1" onClick="FunIPI(1)" <?php if($res['IPI']==1){echo 'checked';} ?>/></td>	
    </tr>
	<tr bgcolor="#FFFFFF">
      <td align="center" style="" class="All_30">&nbsp;</td>
	  <td align="" style="" class="All_500">&nbsp;b)&nbsp;Inadequate incentives and bonus<input type="hidden" name="IIAB" id="IIAB" value="<?php if($row>0){echo $res['IIAB'];}else{echo 0;} ?>"/></td>
	  <td align="center"><input type="checkbox" id="IIAB_4" onClick="FunIIAB(4)" <?php if($res['IIAB']==4){echo 'checked';} ?>/></td>
	  <td align="center"><input type="checkbox" id="IIAB_3" onClick="FunIIAB(3)" <?php if($res['IIAB']==3){echo 'checked';} ?>/></td>
	  <td align="center"><input type="checkbox" id="IIAB_2" onClick="FunIIAB(2)" <?php if($res['IIAB']==2){echo 'checked';} ?>/></td>	
	  <td align="center"><input type="checkbox" id="IIAB_1" onClick="FunIIAB(1)" <?php if($res['IIAB']==1){echo 'checked';} ?>/></td>	
    </tr>
<script language="javascript" type="text/javascript">
function FunAR(v)
{ if(v==1)
  { if(document.getElementById("AR_1").checked==true){document.getElementById("AR").value=1; document.getElementById("AR_2").checked=false; 
    document.getElementById("AR_3").checked=false; document.getElementById("AR_4").checked=false;}else{document.getElementById("AR").value=0;} }
  else if(v==2)
  { if(document.getElementById("AR_2").checked==true){document.getElementById("AR").value=2; document.getElementById("AR_3").checked=false; 
    document.getElementById("AR_4").checked=false; document.getElementById("AR_1").checked=false;}else{document.getElementById("AR").value=0;} }	
  else if(v==3)
  { if(document.getElementById("AR_3").checked==true){document.getElementById("AR").value=3; document.getElementById("AR_4").checked=false; 
    document.getElementById("AR_1").checked=false; document.getElementById("AR_2").checked=false;}else{document.getElementById("AR").value=0;} }
  else if(v==4)
  { if(document.getElementById("AR_4").checked==true){document.getElementById("AR").value=4; document.getElementById("AR_1").checked=false; 
    document.getElementById("AR_2").checked=false; document.getElementById("AR_3").checked=false;}else{document.getElementById("AR").value=0;} }
}
function FunNCIR(v)
{ if(v==1)
  { if(document.getElementById("NCIR_1").checked==true){document.getElementById("NCIR").value=1; document.getElementById("NCIR_2").checked=false; 
    document.getElementById("NCIR_3").checked=false; document.getElementById("NCIR_4").checked=false;}else{document.getElementById("NCIR").value=0;} }
  else if(v==2)
  { if(document.getElementById("NCIR_2").checked==true){document.getElementById("NCIR").value=2; document.getElementById("NCIR_3").checked=false; 
    document.getElementById("NCIR_4").checked=false; document.getElementById("NCIR_1").checked=false;}else{document.getElementById("NCIR").value=0;} }	
  else if(v==3)
  { if(document.getElementById("NCIR_3").checked==true){document.getElementById("NCIR").value=3; document.getElementById("NCIR_4").checked=false; 
    document.getElementById("NCIR_1").checked=false; document.getElementById("NCIR_2").checked=false;}else{document.getElementById("NCIR").value=0;} }
  else if(v==4)
  { if(document.getElementById("NCIR_4").checked==true){document.getElementById("NCIR").value=4; document.getElementById("NCIR_1").checked=false; 
    document.getElementById("NCIR_2").checked=false; document.getElementById("NCIR_3").checked=false;}else{document.getElementById("NCIR").value=0;} }
}
</script>	
	<tr bgcolor="#FFFFFF">
      <td align="center" style="" class="All_30" bgcolor="#FFFFD7"><b>VI</b></td>
	  <td colspan="6" align="" style="font-size:14px;height:20px;width:660px;font-family:Times New Roman;" bgcolor="#FFFFD7">&nbsp;<b>PROFESSIONAL ROLE RELATED&nbsp;<font color="#FF0000">*</font></b></td>
    </tr>
	<tr bgcolor="#FFFFFF">
      <td align="center" style="" class="All_30">&nbsp;</td>
	  <td align="" style="" class="All_500">&nbsp;a)&nbsp;Ambiguous role<input type="hidden" name="AR" id="AR" value="<?php if($row>0){echo $res['AR'];}else{echo 0;} ?>"/></td>
	  <td align="center"><input type="checkbox" id="AR_4" onClick="FunAR(4)" <?php if($res['AR']==4){echo 'checked';} ?>/></td>
	  <td align="center"><input type="checkbox" id="AR_3" onClick="FunAR(3)" <?php if($res['AR']==3){echo 'checked';} ?>/></td>
	  <td align="center"><input type="checkbox" id="AR_2" onClick="FunAR(2)" <?php if($res['AR']==2){echo 'checked';} ?>/></td>	
	  <td align="center"><input type="checkbox" id="AR_1" onClick="FunAR(1)" <?php if($res['AR']==1){echo 'checked';} ?>/></td>	
    </tr>
	<tr bgcolor="#FFFFFF">
      <td align="center" style="" class="All_30">&nbsp;</td>
	  <td align="" style="" class="All_500">&nbsp;b)&nbsp;No clarity in reporting relations<input type="hidden" name="NCIR" id="NCIR" value="<?php if($row>0){echo $res['NCIR'];}else{echo 0;} ?>"/></td>
	  <td align="center"><input type="checkbox" id="NCIR_4" onClick="FunNCIR(4)" <?php if($res['NCIR']==4){echo 'checked';} ?>/></td>
	  <td align="center"><input type="checkbox" id="NCIR_3" onClick="FunNCIR(3)" <?php if($res['NCIR']==3){echo 'checked';} ?>/></td>
	  <td align="center"><input type="checkbox" id="NCIR_2" onClick="FunNCIR(2)" <?php if($res['NCIR']==2){echo 'checked';} ?>/></td>	
	  <td align="center"><input type="checkbox" id="NCIR_1" onClick="FunNCIR(1)" <?php if($res['NCIR']==1){echo 'checked';} ?>/></td>	
    </tr>	
<script language="javascript" type="text/javascript">
function FunOTH(v)
{ if(v==1)
  { if(document.getElementById("OTH_1").checked==true){document.getElementById("OTH").value=1; document.getElementById("OTH_2").checked=false; 
    document.getElementById("OTH_3").checked=false; document.getElementById("OTH_4").checked=false;}else{document.getElementById("OTH").value=0;} }
  else if(v==2)
  { if(document.getElementById("OTH_2").checked==true){document.getElementById("OTH").value=2; document.getElementById("OTH_3").checked=false; 
    document.getElementById("OTH_4").checked=false; document.getElementById("OTH_1").checked=false;}else{document.getElementById("OTH").value=0;} }	
  else if(v==3)
  { if(document.getElementById("OTH_3").checked==true){document.getElementById("OTH").value=3; document.getElementById("OTH_4").checked=false; 
    document.getElementById("OTH_1").checked=false; document.getElementById("OTH_2").checked=false;}else{document.getElementById("OTH").value=0;} }
  else if(v==4)
  { if(document.getElementById("OTH_4").checked==true){document.getElementById("OTH").value=4; document.getElementById("OTH_1").checked=false; 
    document.getElementById("OTH_2").checked=false; document.getElementById("OTH_3").checked=false;}else{document.getElementById("OTH").value=0;} }
}

//document.getElementById("TD_OTH_1").style.backgroundColor='#6FB7FF';
</script>	
	<tr bgcolor="#FFFFFF">
      <td align="center" style="" class="All_30" bgcolor="#FFFFD7"><b>VII</b></td>
	  <td align="" style="" class="All_500" bgcolor="#FFFFD7">&nbsp;<b>OTHERS</b>&nbsp;{state reason not covered above}<input type="hidden" name="OTH" id="OTH" value="<?php if($row>0){echo $res['OTH'];}else{echo 0;} ?>"/></td>
	  <td align="center"><input type="checkbox" id="OTH_4" onClick="FunOTH(4)" <?php if($res['OTH']==4){echo 'checked';} ?>/></td>
	  <td align="center"><input type="checkbox" id="OTH_3" onClick="FunOTH(3)" <?php if($res['OTH']==3){echo 'checked';} ?>/></td>
	  <td align="center"><input type="checkbox" id="OTH_2" onClick="FunOTH(2)" <?php if($res['OTH']==2){echo 'checked';} ?>/></td>	
	  <td align="center"><input type="checkbox" id="OTH_1" onClick="FunOTH(1)" <?php if($res['OTH']==1){echo 'checked';} ?>/></td>	
    </tr>
   </table>
  </td>
 </tr>
 <tr><td style="height:20px;">&nbsp;</td></tr>
 <tr><td style="width:690px;font-family:Times New Roman;font-size:16px;" align="center"><b>Kindly fill in the given questions</b></td></tr>
 <tr bgcolor="#FFFFFF">
   <td style="width:690px;">
    <table style="width:690px;" border="1">
	 <tr><td colspan="2" style="font-size:14px;font-family:Times New Roman;width:690px;" bgcolor="#FFFFD7"><b>1.</b> What are your primary reasons for leaving?&nbsp;<font color="#FF0000">*</font></td></tr> 
	 <tr>
	   <td rowspan="2" style="" class="All_30" bgcolor="#FFFFFF" valign="top"><b>Ans.</b></td>
	   <td style="" bgcolor="#FFFFFF"><input name="Q1_1" style="width:660px; border-style:hidden;" value="<?php echo $res['Q1_1']; ?>" maxlength="250"/></td>
	 </tr>
	 <tr><td style="" bgcolor="#FFFFFF"><input name="Q1_2" style="width:660px; border-style:hidden;" value="<?php echo $res['Q1_2']; ?>" maxlength="250"/></td></tr>
	 <tr><td colspan="2" style="font-size:14px;font-family:Times New Roman;width:690px;" bgcolor="#FFFFD7"><b>2.</b> What did you find most satisfying about your job?&nbsp;<font color="#FF0000">*</font></td></tr> 
	 <tr>
	   <td rowspan="2" style="" class="All_30" bgcolor="#FFFFFF" valign="top"><b>Ans.</b></td>
	   <td style="" bgcolor="#FFFFFF"><input name="Q2_1" style="width:660px; border-style:hidden;" value="<?php echo $res['Q2_1']; ?>" maxlength="250"/></td>
	 </tr>
	 <tr><td style="" bgcolor="#FFFFFF"><input name="Q2_2" style="width:660px; border-style:hidden;" value="<?php echo $res['Q2_2']; ?>" maxlength="250"/></td></tr>
	 <tr><td colspan="2" style="font-size:14px;font-family:Times New Roman;width:690px;" bgcolor="#FFFFD7"><b>3.</b> What did you find most dissatisfying regarding your job?&nbsp;<font color="#FF0000">*</font></td></tr> 
	 <tr>
	   <td rowspan="2" style="" class="All_30" bgcolor="#FFFFFF" valign="top"><b>Ans.</b></td>
	   <td style="" bgcolor="#FFFFFF"><input name="Q3_1" style="width:660px; border-style:hidden;" value="<?php echo $res['Q3_1']; ?>" maxlength="250"/></td>
	 </tr>
	 <tr><td style="" bgcolor="#FFFFFF"><input name="Q3_2" style="width:660px; border-style:hidden;" value="<?php echo $res['Q3_2']; ?>" maxlength="250"/></td></tr>
	 <tr><td colspan="2" style="font-size:14px;font-family:Times New Roman;width:690px;" bgcolor="#FFFFD7"><b>4.</b> Were there any company policies or procedures that made your work more difficult?&nbsp;<font color="#FF0000">*</font></td></tr> 
	 <tr>
	   <td rowspan="2" style="" class="All_30" bgcolor="#FFFFFF" valign="top"><b>Ans.</b></td>
	   <td style="" bgcolor="#FFFFFF"><input name="Q4_1" style="width:660px; border-style:hidden;" value="<?php echo $res['Q4_1']; ?>" maxlength="250"/></td>
	 </tr>
	 <tr><td style="" bgcolor="#FFFFFF"><input name="Q4_2" style="width:660px; border-style:hidden;" value="<?php echo $res['Q4_2']; ?>" maxlength="250"/></td></tr>
	 <tr><td colspan="2" style="font-size:14px;font-family:Times New Roman;width:690px;" bgcolor="#FFFFD7"><b>5.</b> Is there anything the company could have done to prevent you from leaving?&nbsp;<font color="#FF0000">*</font></td></tr> 
	 <tr>
	   <td rowspan="2" style="" class="All_30" bgcolor="#FFFFFF" valign="top"><b>Ans.</b></td>
	   <td style="" bgcolor="#FFFFFF"><input name="Q5_1" style="width:660px; border-style:hidden;" value="<?php echo $res['Q5_1']; ?>" maxlength="250"/></td>
	 </tr>
	 <tr><td style="" bgcolor="#FFFFFF"><input name="Q5_2" style="width:660px; border-style:hidden;" value="<?php echo $res['Q5_2']; ?>" maxlength="250"/></td></tr>
<script language="javascript" type="text/javascript">
function funyn6(v)
{ 
 if(v=='Y')
 { if(document.getElementById("Yes_6").checked==true)
   {document.getElementById("No_6").checked=false; document.getElementById("Q6_Ans").value='Y';}
   else{document.getElementById("Q6_Ans").value='';}
 }
 else if(v=='N')
 { if(document.getElementById("No_6").checked==true)
   {document.getElementById("Yes_6").checked=false; document.getElementById("Q6_Ans").value='N';}
   else{document.getElementById("Q6_Ans").value='';}
 }
}
function funyn7(v)
{ 
 if(v=='Y')
 { if(document.getElementById("Yes_7").checked==true)
   {document.getElementById("No_7").checked=false; document.getElementById("Q7_Ans").value='Y';}
   else{document.getElementById("Q7_Ans").value='';}
 }
 else if(v=='N')
 { if(document.getElementById("No_7").checked==true)
   {document.getElementById("Yes_7").checked=false; document.getElementById("Q7_Ans").value='N';}
   else{document.getElementById("Q7_Ans").value='';}
 }
}
</script>	
     <tr><td colspan="2" style="font-size:14px;font-family:Times New Roman;width:690px;" bgcolor="#FFFFD7"><b>6.</b> Would you recommend this company to a friend as a good place to work?&nbsp;<font color="#FF0000">*</font></td></tr>  	 
	 <tr>
	   <td style="" class="All_30" bgcolor="#FFFFFF" valign="top"><b>Ans.</b></td>
	   <td style="" bgcolor="#FFFFFF" class="All_500">
	   &nbsp;Yes&nbsp;<input type="checkbox" id="Yes_6" onClick="funyn6('Y')" <?php if($res['Q6']=='Y'){echo 'checked';} ?>/>&nbsp;&nbsp;
	   No&nbsp;<input type="checkbox" id="No_6" onClick="funyn6('N')" <?php if($res['Q6']=='N'){echo 'checked';} ?>/>
	   <input type="hidden" id="Q6_Ans" name="Q6_Ans" value="<?php echo $res['Q6']; ?>" />
	   </td>
	 </tr>
	 <tr><td colspan="2" style="font-size:14px;font-family:Times New Roman;width:690px;" bgcolor="#FFFFD7"><b>7.</b> Would you consider returning to this company in the future?&nbsp;<font color="#FF0000">*</font></td></tr> 
	 <tr>
	   <td style="" class="All_30" bgcolor="#FFFFFF" valign="top"><b>Ans.</b></td>
	   <td style="" bgcolor="#FFFFFF" class="All_500">
	   &nbsp;Yes&nbsp;<input type="checkbox" id="Yes_7" onClick="funyn7('Y')" <?php if($res['Q7']=='Y'){echo 'checked';} ?>/>&nbsp;&nbsp;
	   No&nbsp;<input type="checkbox" id="No_7" onClick="funyn7('N')" <?php if($res['Q7']=='N'){echo 'checked';} ?>/>
	   <input type="hidden" id="Q7_Ans" name="Q7_Ans" value="<?php echo $res['Q7']; ?>" />
	   </td>
	 </tr>
	</table>
   </td>
 </tr>
 <tr><td style="height:20px;">&nbsp;</td></tr>
 <tr><td style="width:690px;font-family:Times New Roman;font-size:16px;" align="">&nbsp;<b>About your new job</b></td></tr>
 <tr>
   <td style="width:690px;">
    <table style="width:690px;" border="0">
	 <tr>
	   <td style="width:100px;">&nbsp;</td>
	   <td style="font-size:14px;font-family:Times New Roman;width:200px;">Name of the company&nbsp;<font color="#FF0000">*</font> :</td>
	   <td style="width:390px;"><input name="ComName" style="width:390px;border-style:hidden;border-bottom-style:solid;border-bottom-color:#000000;background-color:#E0DBE3;" value="<?php echo $res['ComName']; ?>" maxlength="50"/>
	   </td>
	 </tr> 
	 <tr>
	   <td style="width:100px;">&nbsp;</td>
	   <td style="font-size:14px;font-family:Times New Roman;width:200px;">Location&nbsp;<font color="#FF0000">*</font> :</td>
	   <td style="width:390px;"><input name="Location" style="width:390px;border-style:hidden;border-bottom-style:solid;border-bottom-color:#000000;background-color:#E0DBE3;" value="<?php echo $res['Location']; ?>" maxlength="100"/>
	   </td>
	 </tr>
	 <tr>
	   <td style="width:100px;">&nbsp;</td>
	   <td style="font-size:14px;font-family:Times New Roman;width:200px;">Designation&nbsp;<font color="#FF0000">*</font> :</td>
	   <td style="width:390px;"><input name="Designation" style="width:390px;border-style:hidden;border-bottom-style:solid;border-bottom-color:#000000;background-color:#E0DBE3;" value="<?php echo $res['Designation']; ?>" maxlength="50"/>
	   </td>
	 </tr> 
	 <tr>
	   <td style="width:100px;">&nbsp;</td>
	   <td style="font-size:14px;font-family:Times New Roman;width:200px;">% hike in compensation&nbsp;<font color="#FF0000">*</font> :</td>
	   <td style="width:390px;"><input name="hike" style="width:390px;border-style:hidden;border-bottom-style:solid;border-bottom-color:#000000;background-color:#E0DBE3;" value="<?php echo $res['hike']; ?>" maxlength="50"/>
	   </td>
	 </tr> 
	 <tr>
	   <td style="width:100px;">&nbsp;</td>
	   <td style="font-size:14px;font-family:Times New Roman;width:200px;">Other benefits :</td>
	   <td style="width:390px;"><input name="OthBefit" style="width:390px;border-style:hidden;border-bottom-style:solid;border-bottom-color:#000000;background-color:#E0DBE3;" value="<?php echo $res['OthBefit']; ?>" maxlength="200"/>
	   </td>
	 </tr>   
	 
	</table>
   </td>
  </tr> 	 

<?php $sql2=mysql_query("select Emp_ExitInt from hrm_employee_separation where EmployeeID=".$EmployeeId." AND Rep_Approved!='C' AND Hod_Approved!='C' AND HR_Approved!='C'", $con); $res2=mysql_fetch_assoc($sql2); ?>  
 <tr>
  <td colspan="7" align="Right" class="fontButton">
   <?php if($res2['Emp_ExitInt']=='N'  AND $row>0){ ?><input type="submit" id="SubmitExitInt" name="SubmitExitInt" value="submit"/><?php } ?>
   
   <?php if($res2['Emp_ExitInt']=='N'){ ?><input type="submit" id="SaveExitInt" name="SaveExitInt" value="save"/><?php } ?>
   
   <input type="button" name="Back" value="back" onClick="javascript:window.location='Index.php?log=<?php echo $_SESSION['logCheckEmp']; ?>'"/>
  </td>
 </tr>
   </table>
  </td>
  
 </tr>
</table>
</form>

		   </td>
		  </tr>
		</table>
<?php //*************************************************************************************************************************************************** ?>

	  </td>
	</tr>
	
	<tr>
	  <td valign="top" align="center">
	    <table border="0" style="margin-top:0px;">
				<tr>
	              <td align="center"><img src="images/home1.png"></td>
				</tr>
	    </table>
	  </td>
	</tr>
	<tr>
	  <td valign="top">
	    <?php require_once("../footer.php"); ?>
	  </td>
	</tr>
  </table>
 </td>
</tr>
</table>
</body>
</html>

