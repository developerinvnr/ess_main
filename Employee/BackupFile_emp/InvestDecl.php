<?php session_start();
if($_SESSION['login'] = true){require_once('../AdminUser/config/config.php');}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('../AdminUser/logcheck.php');
if($_SESSION['logCheckEmp']!=$logemp){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('EmpMenuSession.php');}
$sqlE=mysql_query("select Fname,Sname,Lname,EmpCode,DesigId,DepartmentId,Gender,PanNo from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee.EmployeeID=".$EmployeeId, $con); $resE=mysql_fetch_assoc($sqlE); 
$sqlDesig=mysql_query("select DesigName from hrm_designation where DesigId=".$resE['DesigId'], $con); $resDesig=mysql_fetch_assoc($sqlDesig);
$sqlD=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$resE['DepartmentId'], $con); $resD=mysql_fetch_assoc($sqlD);
$Ename=$resE['Fname'].' '.$resE['Sname'].' '.$resE['Lname']; $LEC=strlen($resE['EmpCode']); 
if($LEC==1){$EC='000'.$resE['EmpCode'];} if($LEC==2){$EC='00'.$resE['EmpCode'];} if($LEC==3){$EC='0'.$resE['EmpCode'];} if($LEC>=4){$EC=$resE['EmpCode'];}?>
<?php 
if(isset($_POST['SaveInvstDec']))
{ 
  $sql=mysql_query("select * from hrm_employee_investment_declaration where EmployeeID=".$EmployeeId." AND Period='".$_POST['Period']."' AND Month=".$_POST['YMonth'], $con);
  $row=mysql_num_rows($sql);
  if($row>0){ $sqlUp=mysql_query("update hrm_employee_investment_declaration set Regime='".$_POST['Regime']."', FormSubmit='Y', HRA='".$_POST['HRA']."', Curr_Medical='".$_POST['MaxMedical']."', Curr_LTA='".$_POST['MaxLTA']."', Curr_CEA='".$_POST['MaxCEA']."', Medical='".$_POST['Medical']."', LTA='".$_POST['LTA']."', CEA='".$_POST['CEA']."', MIP='".$_POST['MIP']."', MTI='".$_POST['MTI']."', MTS='".$_POST['MTS']."', ROL='".$_POST['ROL']."', Handi='".$_POST['Handi']."', 80G_Per='".$_POST['80GPer']."', DTC='".$_POST['DTC']."', RP='".$_POST['RP']."', DFS='".$_POST['DFS']."', PenFun='".$_POST['PenFun']."', LIP='".$_POST['LIP']."', DA='".$_POST['DA']."', PPF='".$_POST['PPF']."', PostOff='".$_POST['PostOff']."', ULIP='".$_POST['ULIP']."', HL='".$_POST['HL']."', MF='".$_POST['MF']."', IB='".$_POST['IB']."', CTF='".$_POST['CTF']."', NHB='".$_POST['NHB']."', NSC='".$_POST['NSC']."', SukS='".$_POST['SukS']."', NPS='".$_POST['NPS']."', CorNPS='".$_POST['CorNPS']."', EPF='".$_POST['EPF']."', Form16='".$_POST['Form16']."', SPE='".$_POST['SPE']."', PT='".$_POST['PT']."', PFD='".$_POST['PFD']."', IT='".$_POST['IT']."', IHL='".$_POST['IHL']."', IL='".$_POST['IL']."', Inv_Date='".date("Y-m-d",strtotime($_POST['Inv_Date']))."', Place='".$_POST['Place']."' where EmployeeID=".$EmployeeId." AND Period='".$_POST['Period']."' AND Month=".$_POST['YMonth'], $con);}
  if($row==0){ $sqlUp=mysql_query("insert into hrm_employee_investment_declaration(EmployeeID, EC, Regime, Period, Month, Status, FormSubmit, HRA, Curr_Medical, Curr_LTA, Curr_CEA, Medical, LTA, CEA, MIP, MTI, MTS, ROL, Handi, 80G_Per, DTC, RP, DFS, PenFun, LIP, DA, PPF, PostOff, ULIP, HL, MF, IB, CTF, NHB, NSC, SukS, NPS, CorNPS, EPF, Form16, SPE, PT, PFD, IT, IHL, IL, Inv_Date, Place, YearId) values(".$EmployeeId.", '".$resE['EmpCode']."', '".$_POST['Regime']."', '".$_POST['Period']."', ".$_POST['YMonth'].", 'A', 'Y', '".$_POST['HRA']."', '".$_POST['MaxMedical']."', '".$_POST['MaxLTA']."', '".$_POST['MaxCEA']."', '".$_POST['Medical']."', '".$_POST['LTA']."', '".$_POST['CEA']."', '".$_POST['MIP']."', '".$_POST['MTI']."', '".$_POST['MTS']."', '".$_POST['ROL']."', '".$_POST['Handi']."', '".$_POST['80GPer']."', '".$_POST['DTC']."', '".$_POST['RP']."', '".$_POST['DFS']."', '".$_POST['PenFun']."', '".$_POST['LIP']."', '".$_POST['DA']."', '".$_POST['PPF']."', '".$_POST['PostOff']."', '".$_POST['ULIP']."', '".$_POST['HL']."', '".$_POST['MF']."', '".$_POST['IB']."', '".$_POST['CTF']."', '".$_POST['NHB']."', '".$_POST['NSC']."', '".$_POST['SukS']."', '".$_POST['NPS']."', '".$_POST['CorNPS']."', '".$_POST['EPF']."', '".$_POST['Form16']."', '".$_POST['SPE']."', '".$_POST['PT']."', '".$_POST['PFD']."', '".$_POST['IT']."', '".$_POST['IHL']."', '".$_POST['IL']."', '".date("Y-m-d",strtotime($_POST['Inv_Date']))."', '".$_POST['Place']."', ".$YearId.")", $con);}
  
  $sqlC=mysql_query("select * from hrm_investdecl_ym where CompanyId=".$CompanyId." AND Period='".$_POST['Period']."' AND Month=".$_POST['YMonth'], $con); 
  $rowC=mysql_num_rows($sqlC);
  if($rowC==0){$sqlI=mysql_query("insert into hrm_investdecl_ym(CompanyId, Period, Month) values(".$CompanyId.", '".$_POST['Period']."', ".$_POST['YMonth'].")", $con);}
  
  //$sqlU=mysql_query("update hrm_employee_investment_declaration set Action=2 where EmployeeID=".$EmployeeId." AND Action=1 AND Period='".$_POST['Period']."' AND YearId=".$YearId." AND Status='D'", $con);
  if($sqlUp){echo '<script>alert("Investment Declaration Form Saved!, For Final Submission Please Click to Submit Button.");</script>';}
}

if(isset($_POST['SubmitInvstDec']))
{ $sql=mysql_query("select * from hrm_employee_investment_declaration where EmployeeID=".$EmployeeId." AND Period='".$_POST['Period']."' AND Month=".$_POST['YMonth'], $con);
  $row=mysql_num_rows($sql);
  if($row>0){$sqlUp=mysql_query("update hrm_employee_investment_declaration set Regime='".$_POST['Regime']."', FormSubmit='YY', HRA='".$_POST['HRA']."', Curr_Medical='".$_POST['MaxMedical']."', Curr_LTA='".$_POST['MaxLTA']."', Curr_CEA='".$_POST['MaxCEA']."', Medical='".$_POST['Medical']."', LTA='".$_POST['LTA']."', CEA='".$_POST['CEA']."', MIP='".$_POST['MIP']."', MTI='".$_POST['MTI']."', MTS='".$_POST['MTS']."', ROL='".$_POST['ROL']."', Handi='".$_POST['Handi']."', 80G_Per='".$_POST['80GPer']."', DTC='".$_POST['DTC']."', RP='".$_POST['RP']."', DFS='".$_POST['DFS']."', PenFun='".$_POST['PenFun']."', LIP='".$_POST['LIP']."', DA='".$_POST['DA']."', PPF='".$_POST['PPF']."', PostOff='".$_POST['PostOff']."', ULIP='".$_POST['ULIP']."', HL='".$_POST['HL']."', MF='".$_POST['MF']."', IB='".$_POST['IB']."', CTF='".$_POST['CTF']."', NHB='".$_POST['NHB']."', NSC='".$_POST['NSC']."', SukS='".$_POST['SukS']."', NPS='".$_POST['NPS']."', CorNPS='".$_POST['CorNPS']."', EPF='".$_POST['EPF']."', Form16='".$_POST['Form16']."', SPE='".$_POST['SPE']."', PT='".$_POST['PT']."', PFD='".$_POST['PFD']."', IT='".$_POST['IT']."', IHL='".$_POST['IHL']."', IL='".$_POST['IL']."', Inv_Date='".date("Y-m-d",strtotime($_POST['Inv_Date']))."',SubmittedDate='".date("Y-m-d")."', Place='".$_POST['Place']."' where EmployeeID=".$EmployeeId." AND Period='".$_POST['Period']."' AND Month=".$_POST['YMonth'], $con);}
  if($row==0){$sqlUp=mysql_query("insert into hrm_employee_investment_declaration(EmployeeID, EC, Regime, Period, Month, FormSubmit, HRA, Curr_Medical, Curr_LTA, Curr_CEA, Medical, LTA, CEA, MIP, MTI, MTS, ROL, Handi, 80G_Per, DTC, RP, DFS, PenFun, LIP, DA, PPF, PostOff, ULIP, HL, MF, IB, CTF, NHB, NSC, SukS, NPS, CorNPS, EPF, Form16, SPE, PT, PFD, IT, IHL, IL, Inv_Date, SubmittedDate, Place, YearId) values(".$EmployeeId.", '".$resE['EmpCode']."', '".$_POST['Regime']."', '".$_POST['Period']."', ".$_POST['YMonth'].", 'YY', '".$_POST['HRA']."', '".$_POST['MaxMedical']."', '".$_POST['MaxLTA']."', '".$_POST['MaxCEA']."', '".$_POST['Medical']."', '".$_POST['LTA']."', '".$_POST['CEA']."', '".$_POST['MIP']."', '".$_POST['MTI']."', '".$_POST['MTS']."', '".$_POST['ROL']."', '".$_POST['Handi']."', '".$_POST['80GPer']."', '".$_POST['DTC']."', '".$_POST['RP']."', '".$_POST['DFS']."', '".$_POST['PenFun']."', '".$_POST['LIP']."', '".$_POST['DA']."', '".$_POST['PPF']."', '".$_POST['PostOff']."', '".$_POST['ULIP']."', '".$_POST['HL']."', '".$_POST['MF']."', '".$_POST['IB']."', '".$_POST['CTF']."', '".$_POST['NHB']."', '".$_POST['NSC']."', '".$_POST['SukS']."', '".$_POST['NPS']."', '".$_POST['CorNPS']."', '".$_POST['EPF']."', '".$_POST['Form16']."', '".$_POST['SPE']."', '".$_POST['PT']."', '".$_POST['PFD']."', '".$_POST['IT']."', '".$_POST['IHL']."', '".$_POST['IL']."', '".date("Y-m-d",strtotime($_POST['Inv_Date']))."', '".date("Y-m-d")."', '".$_POST['Place']."', ".$YearId.")", $con);}
  //$sqlU=mysql_query("update hrm_employee_investment_declaration set Action=2 where EmployeeID=".$EmployeeId." AND Action=1 AND Period='".$_POST['Period']."' AND YearId=".$YearId." AND Status='D'", $con);
  if($sqlUp)
  { 
  
   if($_POST['YMonth']==1){$SelM='January';}elseif($_POST['YMonth']==2){$SelM='February';}elseif($_POST['YMonth']==3){$SelM='March';}elseif($_POST['YMonth']==4){$SelM='April';}elseif($_POST['YMonth']==5){$SelM='May';}elseif($_POST['YMonth']==6){$SelM='June';}elseif($_POST['YMonth']==7){$SelM='July';}elseif($_POST['YMonth']==8){$SelM='August';}elseif($_POST['YMonth']==9){$SelM='September';}elseif($_POST['YMonth']==10){$SelM='October';}elseif($_POST['YMonth']==11){$SelM='November';}elseif($_POST['YMonth']==12){$SelM='December';}
  
   $sqlEmp=mysql_query("select Fname,Sname,Lname,EmailId_Vnr,DR,Married,Gender from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee.EmployeeID=".$EmployeeId, $con); $resEmp=mysql_fetch_assoc($sqlEmp);
   if($resEmp['DR']=='Y'){$M='Dr.';} elseif($resEmp['Gender']=='M'){$M='Mr.';} elseif($resEmp['Gender']=='F' AND $resEmp['Married']=='Y'){$M='Mrs.';} elseif($resEmp['Gender']=='F' AND $resEmp['Married']=='N'){$M='Miss.';} $NameE=$M.' '.$Ename;
   $sqlSt=mysql_query("select FormSubmit from hrm_employee_investment_declaration where EmployeeID=".$EmployeeId." AND Period='".$_POST['Period']."' AND Month=".$_POST['YMonth'], $con); $resSt=mysql_fetch_assoc($sqlSt);
   
     if($resEmp['EmailId_Vnr']!='' AND $resSt['FormSubmit']=='YY')
     {
	  //$email_to = 'ajaykumar.dewangan@vnrseeds.in';
      $email_to = $resEmp['EmailId_Vnr'];
      $email_from='admin@vnrseeds.co.in';
      $email_subject = "Your Investment declaration form status";
      $email_txt = "Your Investment declaration form status"; 
      $headers = "From: $email_from ". "\r\n";
      $email_message .="<html><head></head><body>";
      $email_message .= "Dear <b>".$NameE."</b> <br><br>\n\n\n";
      $email_message .="You have successfully submitted investment declaration form in period-".$SelM."-(".$_POST['Period'].").<br><br>\n\n";
	  $email_message .= "From <br><b>ADMIN ESS</b><br>";
      $email_message .="</body></html>";	      
	  $ok = @mail($email_to, $email_subject, $email_message, $headers);
	  
	  //$email_to22 = 'ajaykumar.dewangan@vnrseeds.in';
	  //$email_to22 = 'vspl.hr@vnrseeds.com';
      $email_from='admin@vnrseeds.co.in';
      $email_subject22 = $NameE." has successfully submitted investment declaration form in period-".$SelM."-(".$_POST['Period'].")";
      $email_txt = $NameE." has successfully submitted investment declaration form in period-".$SelM."-(".$_POST['Period'].")";
      $headers22 = "From: $email_from ". "\r\n";
	  $email_message22 .="<html><head></head><body>";
      $email_message22 .=$NameE." has successfully submitted investment declaration form in period-".$SelM."-(".$_POST['Period'].") \n\n";
	  $email_message22 .= "From <br><b>ADMIN ESS</b><br>";
      $email_message22 .="</body></html>";	      
      //$ok = @mail($email_to22, $email_subject22, $email_message22, $headers22); 
     }   
   
   echo '<script>alert("Investment Declaration Form Submitted Successfully. Please Submit a Signed Copy Of The declaration To Accounts Which Will Be The Final Submission");</script>';
  }
}

/*********************************************************************************/
/*********************************************************************************/

if(isset($_POST['Save22InvstDec']))
{ 
  $sql=mysql_query("select * from hrm_employee_investment_declaration where EmployeeID=".$EmployeeId." AND Period='".$_POST['Period']."' AND Month=".$_POST['YMonth'], $con);
  $row=mysql_num_rows($sql);
  if($row>0){ $sqlUp=mysql_query("update hrm_employee_investment_declaration set Regime='".$_POST['Regime']."', FormSubmit='Y', NPS='".$_POST['NPS22']."', CorNPS='".$_POST['CorNPS22']."', Inv_Date='".date("Y-m-d",strtotime($_POST['Inv22_Date']))."', Place='".$_POST['Place22']."' where EmployeeID=".$EmployeeId." AND Period='".$_POST['Period']."' AND Month=".$_POST['YMonth'], $con);}
  if($row==0){ $sqlUp=mysql_query("insert into hrm_employee_investment_declaration(Regime, EmployeeID, EC, Period, Month, Status, FormSubmit, NPS, CorNPS, Inv_Date, Place, YearId) values('".$_POST['Regime']."', ".$EmployeeId.", '".$resE['EmpCode']."', '".$_POST['Period']."', ".$_POST['YMonth'].", 'A', 'Y', '".$_POST['NPS22']."', '".$_POST['CorNPS22']."', '".date("Y-m-d",strtotime($_POST['Inv22_Date']))."', '".$_POST['Place22']."', ".$YearId.")", $con);}
  
  $sqlC=mysql_query("select * from hrm_investdecl_ym where CompanyId=".$CompanyId." AND Period='".$_POST['Period']."' AND Month=".$_POST['YMonth'], $con); 
  $rowC=mysql_num_rows($sqlC);
  if($rowC==0){$sqlI=mysql_query("insert into hrm_investdecl_ym(CompanyId, Period, Month) values(".$CompanyId.", '".$_POST['Period']."', ".$_POST['YMonth'].")", $con);}
  
  //$sqlU=mysql_query("update hrm_employee_investment_declaration set Action=2 where EmployeeID=".$EmployeeId." AND Action=1 AND Period='".$_POST['Period']."' AND YearId=".$YearId." AND Status='D'", $con);
  if($sqlUp){echo '<script>alert("Investment Declaration Form Saved!, For Final Submission Please Click to Submit Button.");</script>';}
}

if(isset($_POST['Submit22InvstDec']))
{ $sql=mysql_query("select * from hrm_employee_investment_declaration where EmployeeID=".$EmployeeId." AND Period='".$_POST['Period']."' AND Month=".$_POST['YMonth'], $con);
  $row=mysql_num_rows($sql);
  if($row>0){$sqlUp=mysql_query("update hrm_employee_investment_declaration set Regime='".$_POST['Regime']."', FormSubmit='YY', NPS='".$_POST['NPS22']."', CorNPS='".$_POST['CorNPS22']."', Inv_Date='".date("Y-m-d",strtotime($_POST['Inv22_Date']))."',SubmittedDate='".date("Y-m-d")."', Place='".$_POST['Place22']."' where EmployeeID=".$EmployeeId." AND Period='".$_POST['Period']."' AND Month=".$_POST['YMonth'], $con);}
  if($row==0){$sqlUp=mysql_query("insert into hrm_employee_investment_declaration(EmployeeID, EC, Regime, Period, Month, FormSubmit, NPS, CorNPS, Inv_Date, SubmittedDate, Place, YearId) values(".$EmployeeId.", '".$resE['EmpCode']."', '".$_POST['Regime']."', '".$_POST['Period']."', ".$_POST['YMonth'].", 'YY', '".$_POST['NPS22']."', '".$_POST['CorNPS22']."', '".date("Y-m-d",strtotime($_POST['Inv22_Date']))."', '".date("Y-m-d")."', '".$_POST['Place22']."', ".$YearId.")", $con);}
  
  if($sqlUp)
  { 
  
   if($_POST['YMonth']==1){$SelM='January';}elseif($_POST['YMonth']==2){$SelM='February';}elseif($_POST['YMonth']==3){$SelM='March';}elseif($_POST['YMonth']==4){$SelM='April';}elseif($_POST['YMonth']==5){$SelM='May';}elseif($_POST['YMonth']==6){$SelM='June';}elseif($_POST['YMonth']==7){$SelM='July';}elseif($_POST['YMonth']==8){$SelM='August';}elseif($_POST['YMonth']==9){$SelM='September';}elseif($_POST['YMonth']==10){$SelM='October';}elseif($_POST['YMonth']==11){$SelM='November';}elseif($_POST['YMonth']==12){$SelM='December';}
  
   $sqlEmp=mysql_query("select Fname,Sname,Lname,EmailId_Vnr,DR,Married,Gender from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee.EmployeeID=".$EmployeeId, $con); $resEmp=mysql_fetch_assoc($sqlEmp);
   if($resEmp['DR']=='Y'){$M='Dr.';} elseif($resEmp['Gender']=='M'){$M='Mr.';} elseif($resEmp['Gender']=='F' AND $resEmp['Married']=='Y'){$M='Mrs.';} elseif($resEmp['Gender']=='F' AND $resEmp['Married']=='N'){$M='Miss.';} $NameE=$M.' '.$Ename;
   $sqlSt=mysql_query("select FormSubmit from hrm_employee_investment_declaration where EmployeeID=".$EmployeeId." AND Period='".$_POST['Period']."' AND Month=".$_POST['YMonth'], $con); $resSt=mysql_fetch_assoc($sqlSt);
   
     if($resEmp['EmailId_Vnr']!='' AND $resSt['FormSubmit']=='YY')
     {
	  //$email_to = 'ajaykumar.dewangan@vnrseeds.in';
      $email_to = $resEmp['EmailId_Vnr'];
      $email_from='admin@vnrseeds.co.in';
      $email_subject = "Your Investment declaration form status";
      $email_txt = "Your Investment declaration form status"; 
      $headers = "From: $email_from ". "\r\n";
      $semi_rand = md5(time()); 
      $headers .= "MIME-Version: 1.0\r\n";
      $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
      $email_message .="<html><head></head><body>";
      $email_message .= "Dear <b>".$NameE."</b> <br><br>\n\n\n";
      $email_message .="You have successfully submitted investment declaration form in period-".$SelM."-(".$_POST['Period'].").<br><br>\n\n";
	  $email_message .= "From <br><b>ADMIN ESS</b><br>";
      $email_message .="</body></html>";	      
	  $ok = @mail($email_to, $email_subject, $email_message, $headers);
	  
	  //$email_to22 = 'ajaykumar.dewangan@vnrseeds.in';
	  //$email_to22 = 'vspl.hr@vnrseeds.com';
      $email_from22='admin@vnrseeds.co.in';
      $email_subject22 = $NameE." has successfully submitted investment declaration form in period-".$SelM."-(".$_POST['Period'].")";
      $email_txt = $NameE." has successfully submitted investment declaration form in period-".$SelM."-(".$_POST['Period'].")";
      $headers22 = "From: $email_from22 ". "\r\n"; 
      $semi_rand = md5(time()); 
      $headers .= "MIME-Version: 1.0\r\n";
      $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
	  $email_message22 .="<html><head></head><body>";
      $email_message22 .=$NameE." has successfully submitted investment declaration form in period-".$SelM."-(".$_POST['Period'].") \n\n";
	  $email_message22 .= "From <br><b>ADMIN ESS</b><br>";
      $email_message22 .="</body></html>";	      
      //$ok = @mail($email_to22, $email_subject22, $email_message22, $headers22); 
     }   
   
   echo '<script>alert("Investment Declaration Form Submitted Successfully. Please Submit a Signed Copy Of The declaration To Accounts Which Will Be The Final Submission");</script>';
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

<style>.font { color:#ffffff; font-family:Georgia; font-size:11px; width:200px;} .font1 { font-family:Georgia; font-size:11px; height:14px; } 
.font2 { font-size:11px;width:260px;height:18px;}.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;} .TableHead { font-family:Times New Roman; color:#FFFFFF; font-size:15px; }
.TableHead1 { font-family:Times New Roman; color:#000000; background-color:#FFFFFF; font-size:13px; overflow:hidden; } .InputText {font-family:Times New Roman; font-size:12px; width:100px; height:19px; }.textBox{width:108px;height:21px;background-color:#D6D6D6;}
.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}</style>
<Script type="text/javascript">window.history.forward(1);</Script>
<script type="text/javascript" language="javascript">
function Edit()
{ 
  document.getElementById("HRA").readOnly=false; document.getElementById("HRA").style.backgroundColor='#F0F8FF'; document.getElementById("Medical").readOnly=true; document.getElementById("Medical").style.backgroundColor='#E0DBE3'; document.getElementById("LTA").readOnly=true; document.getElementById("LTA").style.backgroundColor='#E0DBE3'; document.getElementById("CEA").readOnly=true; document.getElementById("CEA").style.backgroundColor='#E0DBE3'; document.getElementById("MIP").readOnly=false; document.getElementById("MIP").style.backgroundColor='#F0F8FF'; document.getElementById("MTI").readOnly=false; document.getElementById("MTI").style.backgroundColor='#F0F8FF'; document.getElementById("MTS").readOnly=false; document.getElementById("MTS").style.backgroundColor='#F0F8FF'; document.getElementById("ROL").readOnly=false; document.getElementById("ROL").style.backgroundColor='#F0F8FF'; document.getElementById("Handi").readOnly=false; document.getElementById("Handi").style.backgroundColor='#F0F8FF'; document.getElementById("80GPer").disabled=false; document.getElementById("DTC").readOnly=false; document.getElementById("DTC").style.backgroundColor='#F0F8FF';document.getElementById("RP").readOnly=false; document.getElementById("RP").style.backgroundColor='#F0F8FF';document.getElementById("DFS").readOnly=false; document.getElementById("DFS").style.backgroundColor='#F0F8FF'; document.getElementById("PenFun").readOnly=false; document.getElementById("PenFun").style.backgroundColor='#F0F8FF'; document.getElementById("LIP").readOnly=false; document.getElementById("LIP").style.backgroundColor='#F0F8FF'; document.getElementById("DA").readOnly=false; document.getElementById("DA").style.backgroundColor='#F0F8FF'; document.getElementById("PPF").readOnly=false; document.getElementById("PPF").style.backgroundColor='#F0F8FF'; document.getElementById("PostOff").readOnly=false; document.getElementById("PostOff").style.backgroundColor='#F0F8FF'; document.getElementById("ULIP").readOnly=false; document.getElementById("ULIP").style.backgroundColor='#F0F8FF'; document.getElementById("HL").readOnly=false; document.getElementById("HL").style.backgroundColor='#F0F8FF'; document.getElementById("MF").readOnly=false; document.getElementById("MF").style.backgroundColor='#F0F8FF'; document.getElementById("IB").readOnly=false; document.getElementById("IB").style.backgroundColor='#F0F8FF'; document.getElementById("CTF").readOnly=false; document.getElementById("CTF").style.backgroundColor='#F0F8FF'; document.getElementById("NHB").readOnly=false; document.getElementById("NHB").style.backgroundColor='#F0F8FF'; document.getElementById("NSC").readOnly=false; document.getElementById("NSC").style.backgroundColor='#F0F8FF';
document.getElementById("SukS").readOnly=false; document.getElementById("SukS").style.backgroundColor='#F0F8FF';
document.getElementById("NPS").readOnly=false; document.getElementById("NPS").style.backgroundColor='#F0F8FF';
document.getElementById("CorNPS").readOnly=false; document.getElementById("CorNPS").style.backgroundColor='#F0F8FF';

document.getElementById("EPF").readOnly=false; document.getElementById("EPF").style.backgroundColor='#F0F8FF'; document.getElementById("Form16").readOnly=false; document.getElementById("Form16").style.backgroundColor='#F0F8FF'; document.getElementById("SPE").readOnly=false; document.getElementById("SPE").style.backgroundColor='#F0F8FF'; document.getElementById("PT").readOnly=false; document.getElementById("PT").style.backgroundColor='#F0F8FF'; document.getElementById("PFD").readOnly=false; document.getElementById("PFD").style.backgroundColor='#F0F8FF'; document.getElementById("IT").readOnly=false; document.getElementById("IT").style.backgroundColor='#F0F8FF'; document.getElementById("IHL").readOnly=false; document.getElementById("IHL").style.backgroundColor='#F0F8FF'; document.getElementById("IL").readOnly=false; document.getElementById("IL").style.backgroundColor='#F0F8FF'; document.getElementById("Place").readOnly=false; document.getElementById("Place").style.backgroundColor='#F0F8FF'; 

if(document.getElementById("Mnt").value==4 || document.getElementById("Mnt").value==5)
{
document.getElementById("LtaCheck").disabled=false; document.getElementById("CeaCheck1").disabled=false; document.getElementById("CeaCheck2").disabled=false;
}

//if(document.getElementById("Check_LTA").value=='Y'){document.getElementById("LtaCheck").disabled=true;} 
//if(document.getElementById("Check_CEA").value=='Y'){document.getElementById("CeaCheck1").disabled=true; document.getElementById("CeaCheck2").disabled=true;}
//if(document.getElementById("Check_Medical").value=='Y'){document.getElementById("MedicalCheck").disabled=true;} 
//document.getElementById("Attach").disabled=false;

document.getElementById("EditInvstDec").style.display='none';
document.getElementById("SubmitInvstDec").style.display='block';
document.getElementById("SaveInvstDec").style.display='block';
document.getElementById("SubmitInvstDec").disabled=false; 
document.getElementById("SaveInvstDec").disabled=false;
 
}


function Edit22()
{   
document.getElementById("NPS22").readOnly=false; document.getElementById("NPS22").style.backgroundColor='#F0F8FF';
document.getElementById("CorNPS22").readOnly=false; document.getElementById("CorNPS22").style.backgroundColor='#F0F8FF';
document.getElementById("Place22").readOnly=false; document.getElementById("Place22").style.backgroundColor='#F0F8FF'; 
document.getElementById("Edit22InvstDec").style.display='none';
document.getElementById("Submit22InvstDec").style.display='block';
document.getElementById("Save22InvstDec").style.display='block';
document.getElementById("Submit22InvstDec").disabled=false; 
document.getElementById("Save22InvstDec").disabled=false;
 
}


function AttachSign(EI,YI)
{ var win=window.open("EmpSignImg.php?EI="+EI+"&YI="+YI,"SignForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=500,height=150"); 
  var timer = setInterval( function() { if(win.closed) {  clearInterval(timer);  window.location="InvestDecl.php"; } }, 1000);
}

function validate(InvstDecForm) 
{ 
  var Regime = InvstDecForm.Regime.value;
  if(Regime=='old')
  {
  var Numfilter=/^[0-9. ]+$/;  
  var HRA = parseFloat(InvstDecForm.HRA.value); var MaxHRA = parseFloat(InvstDecForm.MaxHRA.value); var testN_HRA = Numfilter.test(HRA); 
  if(HRA!='') { if(testN_HRA==false) { alert('Please Enter Only Number In The HRA Value..');  return false; } } 
  //if(HRA>MaxHRA) {alert("Error..Please Check Max. Limit Of HRA Value..!"); return false;}
  var Medical = parseFloat(InvstDecForm.Medical.value); var MaxMedical = parseFloat(InvstDecForm.MaxMedical.value); var testN_Medical = Numfilter.test(Medical); 
  if(Medical!='') { if(testN_Medical==false) { alert('Please Enter Only Number In The Medical Bills Value..');  return false; } } 
  if(Medical>MaxMedical) {alert("Error..Please Check Max. Limit Of Medical Bills Value..!"); return false;}
  
  var LTA = parseFloat(InvstDecForm.LTA.value); var MaxLTA = parseFloat(InvstDecForm.MaxLTA.value); var testN_LTA = Numfilter.test(LTA); 
  if(LTA!='') { if(testN_LTA==false) { alert('Please Enter Only Number In The LTA Value..');  return false; } } 
  if(LTA>MaxLTA) {alert("Error..Please Check Max. Limit Of LTA Value..!"); return false;}
  
  var CEA = parseFloat(InvstDecForm.CEA.value); var MaxCEA = parseFloat(InvstDecForm.MaxCEA.value); var testN_CEA = Numfilter.test(CEA); 
  if(CEA!='') { if(testN_CEA==false) { alert('Please Enter Only Number In The CEA Value..');  return false; } } 
  if(CEA>MaxCEA) {alert("Error..Please Check Max. Limit Of CEA Value..!"); return false;}
  
  
  
  var MIP = parseFloat(InvstDecForm.MIP.value); var MaxMIP = parseFloat(InvstDecForm.MaxMIP.value); var testN_MIP = Numfilter.test(MIP);
  if(MIP!='') { if(testN_MIP==false) { alert('Please Enter Only Number In The Medical Insurance Premium Value..');  return false; } }
  if(MIP>MaxMIP) {alert("Error..Please Check Max. Limit Of Medical Insurance Premium Value..!"); return false;} 
  var MTI = parseFloat(InvstDecForm.MTI.value); var MaxMTI = parseFloat(InvstDecForm.MaxMTI.value); var testN_MTI = Numfilter.test(MTI);
  if(MTI!='') { if(testN_MTI==false) { alert('Please Enter Only Number In The Medical Treatment/Insurance Value..');  return false; } }  
  if(MTI>MaxMTI) {alert("Error..Please Check Max. Limit Of Medical Treatment/Insurance value..!"); return false;}
  var MTS = parseFloat(InvstDecForm.MTS.value); var MaxMTS = parseFloat(InvstDecForm.MaxMTS.value); var testN_MTS = Numfilter.test(MTS);
  if(MTS!='') { if(testN_MTS==false) { alert('Please Enter Only Number In The Medical Treatment Value..');  return false; } } 
  if(MTS>MaxMTS) {alert("Error..Please Check Max. Limit Of Medical Treatment Value..!"); return false;}
  
  var ROL = parseFloat(InvstDecForm.ROL.value); var MaxROL = parseFloat(InvstDecForm.MaxROL.value); var testN_ROL = Numfilter.test(ROL);
  if(ROL!='') { if(testN_ROL==false) { alert('Please Enter Only Number In TheRepayment of Loan Value..');  return false; }  }
  
  var Handi = parseFloat(InvstDecForm.Handi.value); var MaxHandi = parseFloat(InvstDecForm.MaxHandi.value); var testN_Handi = Numfilter.test(Handi);
  if(Handi!='') { if(testN_Handi==false) { alert('Please Enter Only Number In The Handicapped Value..');  return false; }  }
  if(Handi>MaxHandi) {alert("Error..Please Check Max. Limit Of Handicapped Value..!"); return false;}
  
  var DTC = parseFloat(InvstDecForm.DTC.value); var MaxDTC = parseFloat(InvstDecForm.MaxDTC.value); var testN_DTC = Numfilter.test(DTC);
  if(DTC!='') { if(testN_DTC==false) { alert('Please Enter Only Number In The Donation to certain funds Value..');  return false; }  }
  //if(DTC>MaxDTC) {alert("Error..Please Check Max. Limit Of Donation to certain funds Value..!"); return false;}
  
  var RP = parseFloat(InvstDecForm.RP.value); var MaxRP = parseFloat(InvstDecForm.MaxRP.value); var testN_RP = Numfilter.test(RP);
  if(RP!='') { if(testN_RP==false) { alert('Please Enter Only Number In The Rent Paid Value..');  return false; }  }
  if(RP>MaxRP) {alert("Error..Please Check Max. Limit Of Rent Paid Value..!"); return false;}
  
  var DFS = parseFloat(InvstDecForm.DFS.value); var MaxDFS = parseFloat(InvstDecForm.MaxDFS.value); var testN_DFS = Numfilter.test(DFS);
  
  var PenFun = parseFloat(InvstDecForm.PenFun.value); var MaxPenFun = parseFloat(InvstDecForm.MaxPenFun.value); var testN_PenFun = Numfilter.test(PenFun);
  if(PenFun!='') { if(testN_PenFun==false) { alert('Please Enter Only Number In The Pension Fund (Jeevan Suraksha) Value..');  return false; } }  
  if(PenFun>MaxPenFun) {alert("Error..Please Check Max. Limit Of Pension Fund (Jeevan Suraksha) Value..!"); return false;}
  var LIP = parseFloat(InvstDecForm.LIP.value); var MaxLIP = parseFloat(InvstDecForm.MaxLIP.value); var testN_LIP = Numfilter.test(LIP);
  if(LIP!='') { if(testN_LIP==false) { alert('Please Enter Only Number In The Life Insurance Premium Value..');  return false; } }  
  if(LIP>MaxLIP) {alert("Error..Please Check Max. Limit Of Life Insurance Premium Value..!"); return false;}
  var DA = parseFloat(InvstDecForm.DA.value); var MaxDA = parseFloat(InvstDecForm.MaxDA.value); var testN_DA = Numfilter.test(DA);
  if(DA!='') { if(testN_DA==false) { alert('Please Enter Only Number In The Defferred Annuity Value..');  return false; }  }
  if(DA>MaxDA) {alert("Error..Please Check Max. Limit Of Defferred Annuity Value..!"); return false;}
  var PPF = parseFloat(InvstDecForm.PPF.value); var MaxPPF = parseFloat(InvstDecForm.MaxPPF.value); var testN_PPF = Numfilter.test(PPF);
  if(PPF!='') { if(testN_PPF==false) { alert('Please Enter Only Number In The Public Provident Fund Value..');  return false; }  }
  if(PPF>MaxPPF) {alert("Error..Please Check Max. Limit Of Public Provident Fund Value..!"); return false;}
  var PostOff = parseFloat(InvstDecForm.PostOff.value); var MaxPostOff = parseFloat(InvstDecForm.MaxPostOff.value); var testN_PostOff = Numfilter.test(PostOff);
  if(PostOff!='') { if(testN_PostOff==false) { alert('Please Enter Only Number In The Time Deposit In Post Office / Bank Value..');  return false; } }  
  if(PostOff>MaxPostOff) {alert("Error..Please Check Max. Limit Of Time Deposit In Post Office / Bank Value..!"); return false;}
  var ULIP = parseFloat(InvstDecForm.ULIP.value); var MaxULIP = parseFloat(InvstDecForm.MaxULIP.value); var testN_ULIP = Numfilter.test(ULIP);
  if(ULIP!='') { if(testN_ULIP==false) { alert('Please Enter Only Number In The ULIP of UTI/LIC Value..');  return false; }  }
  if(ULIP>MaxULIP) {alert("Error..Please Check Max. Limit Of ULIP of UTI/LIC Value..!"); return false;}
  var HL = parseFloat(InvstDecForm.HL.value); var MaxHL = parseFloat(InvstDecForm.MaxHL.value); var testN_HL = Numfilter.test(HL);
  if(HL!='') { if(testN_HL==false) { alert('Please Enter Only Number In The Principal Loan (Housing Loan) Repayment Value..');  return false; } }  
  if(HL>MaxHL) {alert("Error..Please Check Max. Limit Of Principal Loan (Housing Loan) Repayment Value..!"); return false;}
  var MF = parseFloat(InvstDecForm.MF.value); var MaxMF = parseFloat(InvstDecForm.MaxMF.value); var testN_MF = Numfilter.test(MF);
  if(MF!='') { if(testN_MF==false) { alert('Please Enter Only Number In The Mutual Funds Value..');  return false; }  }
  if(MF>MaxMF) {alert("Error..Please Check Max. Limit Of Mutual Funds Value..!"); return false;}
  var IB = parseFloat(InvstDecForm.IB.value); var MaxIB = parseFloat(InvstDecForm.MaxIB.value); var testN_IB = Numfilter.test(IB);
  if(IB!='') { if(testN_IB==false) { alert('Please Enter Only Number In The Investment In Infrastructure Bonds Value..');  return false; } }  
  if(IB>MaxIB) {alert("Error..Please Check Max. Limit Of Investment In Infrastructure Bonds Value..!"); return false;}
  var CTF = parseFloat(InvstDecForm.CTF.value); var MaxCTF = parseFloat(InvstDecForm.MaxCTF.value); var testN_CTF = Numfilter.test(CTF);
  if(CTF!='') { if(testN_CTF==false) { alert('Please Enter Only Number In The Children- Tution Fee Value..');  return false; } }  
  if(CTF>MaxCTF) {alert("Error..Please Check Max. Limit Of Children- Tution Fee Value..!"); return false;}
  var NHB = parseFloat(InvstDecForm.NHB.value); var MaxNHB = parseFloat(InvstDecForm.MaxNHB.value); var testN_NHB = Numfilter.test(NHB);
  if(NHB!='') { if(testN_NHB==false) { alert('Please Enter Only Number In The Deposit In NHB Value..');  return false; }  }
  if(NHB>MaxNHB) {alert("Error..Please Check Max. Limit Of Deposit In NHB Value..!"); return false;}
  
  var NSC = parseFloat(InvstDecForm.NSC.value); var MaxNSC = parseFloat(InvstDecForm.MaxNSC.value); var testN_NSC = Numfilter.test(NSC);
  if(NSC!='') { if(testN_NSC==false) { alert('Please Enter Only Number In The Deposit In NSC Value..');  return false; }  }
  //alert(NSC+"-"+MaxNSC);
  if(NSC>MaxNSC) {alert("Error..Please Check Max. Limit Of Deposit In NSC Value..!"); return false;}
  
  var SukS = parseFloat(InvstDecForm.SukS.value); var MaxSukS = parseFloat(InvstDecForm.MaxSukS.value); var testN_SukS = Numfilter.test(SukS);
  if(SukS!='') { if(testN_SukS==false) { alert('Please Enter Only Number In Sukanya Samriddhi Value..');  return false; }  }
  if(SukS>MaxSukS) {alert("Error..Please Check Max. Limit Of Sukanya Samriddhi Value..!"); return false;}
  
  var NPS = parseFloat(InvstDecForm.NPS.value); var MaxNPS = parseFloat(InvstDecForm.MaxNPS.value); var testN_NPS = Numfilter.test(NPS);
  if(NPS!='') { if(testN_NPS==false) { alert('Please Enter Only Number In NPS(National Pension Scheme) Value..');  return false; }  }
  if(NPS>MaxNPS) {alert("Error..Please Check Max. Limit Of NPS(National Pension Scheme) Value..!"); return false;}

  var EPF = parseFloat(InvstDecForm.EPF.value); var MaxEPF = parseFloat(InvstDecForm.MaxEPF.value); var testN_EPF = Numfilter.test(EPF);
  if(EPF!='') { if(testN_EPF==false) { alert('Please Enter Only Number In The Employee Provident Fund Value..');  return false; }  }
  if(EPF>MaxEPF) {alert("Error..Please Check Max. Limit Of Employee Provident Fund Value..!"); return false;}
  
  var Form16 = parseFloat(InvstDecForm.Form16.value); var MaxForm16 = parseFloat(InvstDecForm.MaxForm16.value); var testN_Form16 = Numfilter.test(Form16);
  var SPE = parseFloat(InvstDecForm.SPE.value); var MaxSPE = parseFloat(InvstDecForm.MaxSPE.value); var testN_SPE = Numfilter.test(SPE);
  var PT = parseFloat(InvstDecForm.PT.value); var MaxPT = parseFloat(InvstDecForm.MaxPT.value); var testN_PT = Numfilter.test(PT);
  var PFD = parseFloat(InvstDecForm.PFD.value); var MaxPFD = parseFloat(InvstDecForm.MaxPFD.value); var testN_PFD = Numfilter.test(PFD);
  var IT = parseFloat(InvstDecForm.IT.value); var MaxIT = parseFloat(InvstDecForm.MaxIT.value); var testN_IT = Numfilter.test(IT);
   
  var IHL = parseFloat(InvstDecForm.IHL.value); var MaxIHL = parseFloat(InvstDecForm.MaxIHL.value); var testN_IHL = Numfilter.test(IHL);
  if(IHL!='') { if(testN_IHL==false) { alert('Please Enter Only Number In The Interest On Housing Loan Value..');  return false; }  }
  if(IHL>MaxIHL) {alert("Error..Please Check Max. Limit Of Interest On Housing Loan Value..!"); return false;}
  var IL = parseFloat(InvstDecForm.IL.value); var MaxIL = parseFloat(InvstDecForm.MaxIL.value); var testN_IL = Numfilter.test(IL);  
  if(IL!='') { if(testN_IL==false) { alert('Please Enter Only Number In The Interest If The Loan Is Taken Before 01/04/99 Value..');  return false; } } 
  if(IL>MaxIL) {alert("Error..Please Check Max. Limit Of Interest If The Loan Is Taken Before 01/04/99 Value..!"); return false;}  
 
  var Inv_Date = InvstDecForm.Inv_Date.value; 
  if(Inv_Date.length === 0) { alert("Please Enter Investment Date!.");  return false; } 
  var Place = InvstDecForm.Place.value; var filter=/^[a-zA-Z. /]+$/; var test_bool = filter.test(Place); 
  if(Place.length === 0) { alert("Please Enter Place!.");  return false; }
  if(test_bool==false) { alert('Please Enter Only Alphabets In The Place Name Field..!'); return false; } 
  
  } //if(Regime=='old')
  else if(Regime=='new')
  {
   var Inv22_Date = InvstDecForm.Inv22_Date.value; 
   if(Inv22_Date.length === 0) { alert("Please Enter Investment Date!.");  return false; } 
   var Place22 = InvstDecForm.Place22.value; var filter=/^[a-zA-Z. /]+$/; var test_bool = filter.test(Place22); 
   if(Place22.length === 0) { alert("Please Enter Place!.");  return false; }
   if(test_bool==false) { alert('Please Enter Only Alphabets In The Place Name Field..!'); return false; } 
  }
  
}

function PrintInvestDel(P,EI,M)
{ var YI=document.getElementById("YearId").value; var CI=document.getElementById("ComId").value;
  window.open("PrintInvatDecl.php?action=Print&EI="+EI+"&YI="+YI+"&CI="+CI+"&P="+P+"&M="+M,"PrintForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=900,height=650");
}

function OpenOld(P,EI,M)
{ var CI=document.getElementById("ComId").value; var YI=document.getElementById("YearId").value;
  window.open("OldInvatDecl.php?action=Print&EI="+EI+"&YI="+YI+"&CI="+CI+"&P="+P+"&M="+M,"PrintForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=900,height=650");
}


</script>
</head>
<body class="body">
<input type="hidden" id="YearId" value="<?php echo $YearId; ?>" />
<input type="hidden" id="ComId" value="<?php echo $CompanyId; ?>" />
<input type="hidden" id="Mnt" value="<?php echo date("m"); ?>" />
<table class="table">
<tr>
 <td>
  <table class="menutable"><tr><td><?php if($_SESSION['login'] = true){ require_once("EMenu.php"); } ?></td></tr></table>
 </td>
</tr>
<tr>
 <td>
  <table width="100%" style="margin-top:0px;">
    <tr>
	  <td valign="top"><?php if($_SESSION['login'] = true){ require_once("EWelcome.php"); } ?></td>
	</tr>
	 <tr>
	  <td valign="top">
	     <table border="0" style="width:100%; height:380px; float:none;" cellpadding="0">
		  <tr>
		   <td valign="top"> 
		   
<?php //*************************************************************************************************************************************************** ?>	
<?php $sql=mysql_query("select * from hrm_investdecl_setting where CompanyId=".$CompanyId." AND Status='A'", $con); $res=mysql_fetch_array($sql); 
      $sqlBy=mysql_query("select FromDate,ToDate from hrm_year where YearId=".$res['B_YearId'], $con); $resBy=mysql_fetch_array($sqlBy);
	  $sqlCy=mysql_query("select FromDate,ToDate from hrm_year where YearId=".$res['C_YearId'], $con); $resCy=mysql_fetch_array($sqlCy);
	  $fb=date("Y",strtotime($resBy['FromDate'])); $tb=date("Y",strtotime($resBy['ToDate']));
	  $fc=date("Y",strtotime($resCy['FromDate'])); $tc=date("Y",strtotime($resCy['ToDate']));
	  $PrdBack=$fb.'-'.$tb;
	  $PrdCurr=$fc.'-'.$tc;
?>   
<input type="hidden" id="Check_HRA" value="<?php echo $res['HRA']; ?>" /><input type="hidden" id="Check_Medical" value="<?php echo $res['Medical']; ?>" />
<input type="hidden" id="Check_LTA" value="<?php echo $res['LTA']; ?>" /><input type="hidden" id="Check_CEA" value="<?php echo $res['CEA']; ?>" />
		     <table border="0" id="Activity">
			  <tr>
			     <td id="Anni" valign="top">
				    <table border="0">
						  <tr height="20">
						    <td align="left" valign="top" width="150">
<?php include("EmpImgEmp.php"); ?>
<?php //echo "<img width=105px height=125px src=\"show_images.php?id=".$EmployeeId."\">\n";?></td>
						  </tr>
					 </table>
				 </td>				 
				  <td align="left" width="850" valign="top">
	     <table border="0" width="850">
<?php $Check=mysql_query("select * from hrm_employee_investment_declaration where EmployeeID=".$EmployeeId." AND Period='".$PrdCurr."' AND Month=".$res['C_Month'], $con);
      $rowCheck=mysql_num_rows($Check); 
	  if($rowCheck==0 AND $res['ShowB_Form']=='Y')
	  { 
	   $sqlMax=mysql_query("select MAX(IvstDecId) as MaxId from hrm_employee_investment_declaration where EmployeeID=".$EmployeeId, $con); $resMax=mysql_fetch_assoc($sqlMax);
	   if($resMax['MaxId']>0)
	   { 
	    $SqlIvst=mysql_query("select * from hrm_employee_investment_declaration where IvstDecId=".$resMax['MaxId']." AND EmployeeID=".$EmployeeId, $con);
	    //$SqlIvst=mysql_query("select * from hrm_employee_investment_declaration where EmployeeID=".$EmployeeId." AND Period='".$PrdBack."' AND Month=".$res['B_Month'], $con);
	    $resIvst=mysql_fetch_assoc($SqlIvst); 
	   } 
	  }
	  elseif($rowCheck>0){ $resIvst=mysql_fetch_assoc($Check); }	  
?> 	


<?php /* $Check=mysql_query("select * from hrm_employee_investment_declaration where EmployeeID=".$EmployeeId." AND Period='".$PrdCurr."' AND Month=".$res['C_Month'], $con);
      $rowCheck=mysql_num_rows($Check); 
	  if($rowCheck==0 AND $res['ShowB_Form']=='Y'){ $SqlIvst=mysql_query("select * from hrm_employee_investment_declaration where EmployeeID=".$EmployeeId." AND Period='".$PrdBack."' AND Month=".$res['B_Month'], $con); $resIvst=mysql_fetch_assoc($SqlIvst); }
	  elseif($rowCheck>0){ $resIvst=mysql_fetch_assoc($Check); }
	*/  
?> 		 
		    <tr>
			 <td><table border="0"><tr>
			 <td align="right" style="width:110px;"><?php if($rowCheck>0 AND ($resIvst['FormSubmit']=='Y' OR $resIvst['FormSubmit']=='YY')){ ?><font style="color:#FF0DFF;font-size:14px;font-family:Times New Roman;"><b>[View & Print]</b></font><a href="#" onClick="PrintInvestDel('<?php echo $PrdCurr; ?>', <?php echo $EmployeeId.', '.$res['C_Month']; ?>)" style="font-size:14px;font-family:Times New Roman;"><b><?php //Current Invest. Decl. ?></b></a><?php } ?>

<?php /* if($res['PrintB_Form']=='Y')
{ $SqlCheck=mysql_query("select * from hrm_employee_investment_declaration where EmployeeID=".$EmployeeId." AND Period='".$PrdBack."' AND Month=".$res['B_Month'], $con); 
$row2Check=mysql_num_rows($SqlCheck); if($row2Check>0) { if($res['B_Month']==1){$Bm='Jan';}elseif($res['B_Month']==2){$Bm='Feb';}elseif($res['B_Month']==3){$Bm='Mar';}elseif($res['B_Month']==4){$Bm='Apr';}elseif($res['B_Month']==5){$Bm='May';}elseif($res['B_Month']==6){$Bm='Jun';}elseif($res['B_Month']==7){$Bm='Jul';}elseif($res['B_Month']==8){$Bm='Aug';}elseif($res['B_Month']==9){$Bm='Sep';}elseif($res['B_Month']==10){$Bm='Oct';}elseif($res['B_Month']==11){$Bm='Nov';}elseif($res['B_Month']==12){$Bm='Dec';} */ ?>

<?php if($res['PrintB_Form']=='Y')
{ $SqlCheck=mysql_query("select * from hrm_employee_investment_declaration where EmployeeID=".$EmployeeId." AND YearId=".$YearId, $con); 
  while($resECheck=mysql_fetch_assoc($SqlCheck)){   
  if($res['Month']==1){$Bm='Jan';}elseif($resECheck['Month']==2){$Bm='Feb';}elseif($resECheck['Month']==3){$Bm='Mar';}elseif($resECheck['Month']==4){$Bm='Apr';}elseif($resECheck['Month']==5){$Bm='May';}elseif($resECheck['Month']==6){$Bm='Jun';}elseif($resECheck['Month']==7){$Bm='Jul';}elseif($resECheck['Month']==8){$Bm='Aug';}elseif($resECheck['Month']==9){$Bm='Sep';}elseif($resECheck['Month']==10){$Bm='Oct';}elseif($resECheck['Month']==11){$Bm='Nov';}elseif($resECheck['Month']==12){$Bm='Dec';} ?>&nbsp;&nbsp;<a href="#" onClick="OpenOld('<?php echo $resECheck['Period']; ?>', <?php echo $EmployeeId.', '.$resECheck['Month']; ?>)" style="font-size:14px;font-family:Times New Roman;"><b>Invest. Decl. <?php echo $resECheck['Period'].'-'.$Bm; ?></b></a> <?php } } ?>

			 </td>
			 </tr>
			 <tr>
			 <td align="center" style="width:740px;">
			 <font color="#106809" style='font-family:Times New Roman;' size="4"><b>Investment Declaration Form <?php echo $PrdCurr; ?></b></font></td>
			 </tr>
			 <tr>
             <td colspan="2" style="width:850px;font-size:14px; font-family:Times New Roman;" valign="top">
	   <b><u>Please remember the following points while filling up the form</u>  :</b><br>
	   <b>(a)</b> Do not forget to mention you Employee Id , Name & Pan.<br>
	   <b>(b)</b> Only Declared Amount needs to be filled. Donot change the figures mentioned in Max. limit Column.<br>
	   <b>(c)</b> In case of Housing Loan Interest, only mention the interest component of the Housing Loan. Make sure you mention the amount only if the Loan has already commenced and you have taken the posession of the house.<br>
	   <b>(d)</b> You are requested to submit the required investment declaration up to <?php echo date("d.m.Y",strtotime($res['LastDateTime'])); ?>,failing which will be assumed that the employee does not have any Tax Saving  and income other than salary,and the Income Tax will be recomputed and tax will be deducted accordingly.<br>
	 </td>
</tr> 		
			 
			 </table></td>
			</tr>
			<tr>

			 <td>
			<table border="1">		
<tr>


		  <td style="font-family:Times New Roman;color:#000000;width:685px;font-size:18px;text-align:justify;" align="center" bgcolor="#7a6189">
<script type="text/javascript">
function FunChkR(v,t,n,m)
{
 if(document.getElementById(v).checked==true){ document.getElementById("Regime").value=t; 
 document.getElementById("block"+n).style.display='block'; document.getElementById("block"+m).style.display='none';
 }
}
</script>		  
 <table border="1" width="850" id="TEmp" cellpadding="1" cellspacing="2" bgcolor="#FFFFFF">
  <tr>
   <td align="center" style="width:850px;font-size:15px; height:30px; background-color:#FFFF75;" colspan="5">&nbsp;
   <b>
    <input type="radio" id="r1" name="chkrgm" style="cursor:pointer;" onClick="FunChkR('r1','old',1,2)" <?php if($resIvst['Regime']=='old'){echo 'checked';}?>/>
	Old Regime 
	&nbsp;&nbsp;&nbsp;
	<input type="radio" id="r2" name="chkrgm" style="cursor:pointer;" onClick="FunChkR('r2','new',2,1)" <?php if($resIvst['Regime']=='new'){echo 'checked';}?>/> 
    New Regime
   </b>
   </td>
  </tr>
 </table>  
<form name="InvstDecForm" method="post" enctype="multipart/form-data" onSubmit="return validate(this)">
<input type="hidden" id="Regime" name="Regime" value="<?php echo $resIvst['Regime']; ?>" />
<input type="hidden" id="Period" name="Period" value="<?php echo $PrdCurr; ?>"  readonly/>
<input type="hidden" id="YMonth" name="YMonth" value="<?php echo $res['C_Month']; ?>" readonly/>

<div id="block1" style="display:<?php if($resIvst['YearId']>8 && $resIvst['Regime']=='old'){echo 'block';}else{echo 'none';}?>;;">
<!-- 1111111111111111111111111111 --------------- 11111111111111111111 ----------------- Open ---->
<!-- 1111111111111111111111111111 --------------- 11111111111111111111 ----------------- Open ---->
<!-- 1111111111111111111111111111 --------------- 11111111111111111111 ----------------- Open ---->	
  		  

<table border="1" width="850" id="TEmp" cellpadding="1" cellspacing="2" bgcolor="#FFFFFF">
<tr>
  <td align="center" style="width:850px;font-size:15px; height:18px;" colspan="5">&nbsp;<b>(To be used to declare investment for income Tax that will be made during the period <?php echo $PrdCurr; ?>)</b></td>
</tr>
<?php if($res['LTA']=='N'){ ?><input type="hidden" name="LTA" id="LTA" value="0" /><?php } ?>
<?php if($res['CEA']=='N'){ ?><input type="hidden" name="CEA" id="CEA" value="0" /><?php } ?>
<?php if($res['Medical']=='N'){ ?><input type="hidden" name="Medical" id="Medical" value="0" /><?php } ?>
<tr>
<td align="center" valign="top" style="width:20px;font-size:15px;">1</td>
<td align="left" valign="top" style="width:100px;font-size:15px;">&nbsp;Company</td>
<?php $SqlCom=mysql_query("select CompanyName from hrm_company_basic where CompanyId=".$CompanyId."", $con); $resCom=mysql_fetch_assoc($SqlCom); ?> 
<td align="left" valign="top" style="width:550px;font-size:15px; color:#003700;">&nbsp;<b><?php echo strtoupper($resCom['CompanyName']); ?></b></td>
<td align="center" valign="top" style="width:90px;font-size:15px;">&nbsp;EmployeeID</td>
<td align="center" valign="top" style="width:110px;font-size:15px;">&nbsp;<?php echo $EC; ?></td>
</tr>

<tr>
<td align="center" valign="top" style="width:20px;font-size:15px;">2</td>
<td align="left" valign="top" style="width:100px;font-size:15px;">&nbsp;Employee</td>
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;<?php echo strtoupper($Ename); ?></td>
<td align="left" valign="top" style="width:200px;font-size:15px;" colspan="2">&nbsp;</td>
</tr>
<tr>
<td align="center" valign="top" style="width:20px;font-size:15px;">3</td>
<td align="left" valign="top" style="width:100px;font-size:15px;">&nbsp;PAN Number </td>
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;<?php echo strtoupper($resE['PanNo']); ?></td>
<td align="center" valign="top" style="width:200px;font-size:15px;" colspan="2">&nbsp;</td>
</tr>
<tr style="background-color:#0080FF;">
<td align="center" valign="top" style="width:20px;font-size:15px; background-color:#0080FF; color:#FFFFFF;"></td>
<td align="center" valign="top" style="width:100px;font-size:15px;color:#FFFFFF;"><b>Item</b></td>
<td align="center" valign="top" style="width:550px;font-size:15px;color:#FFFFFF;"><b>Particulars</b></td>
<td align="center" valign="top" style="width:90px;font-size:15px;color:#FFFFFF;"><b>Max. Limit</b></td>
<td align="center" valign="top" style="width:110px;font-size:15px;color:#FFFFFF;"><b>Declared_Amt</b></td>
</tr>
<tr bgcolor="#CEFFCE">
<td align="left" colspan="5" valign="top" style="width:850px;font-size:15px;">&nbsp;<b>Deduction Under Section 10</b></td>
</tr>
<?php $SqlHRA=mysql_query("select HRA_Value,BAS_Value from hrm_employee_ctc where EmployeeID=".$EmployeeId." AND Status='A'", $con); $resHRA=mysql_fetch_assoc($SqlHRA);
$LTA=$resHRA['BAS_Value']*2; $HRA=$resHRA['HRA_Value']*12;?> 
<input type="hidden" id="MaxHRA" name="MaxHRA" value="<?php echo $HRA;  ?>" readonly/>
<tr>
<td align="center" valign="top" style="width:20px;font-size:15px;">4</td>
<td align="left" valign="top" style="width:100px;font-size:15px;">&nbsp;House Rent Sec 10(13A)</td>
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;I am staying in a house and I egree to submit rent receipts when required. The Rent paid is (Rs._______ Per Month) & the house is located in Non-Metro</td>
<td align="center" valign="top" style="width:90px;font-size:15px;">&nbsp;</td>
<td align="center" valign="top" style="width:110px;font-size:15px;">
<input id="HRA" name="HRA" class="textBox" value="<?php if($resIvst['HRA']==''){echo 0;}else { echo $resIvst['HRA']; }?>" readonly maxlength="8"/></td>
</tr>
<script language="javascript" type="text/javascript">
function FunLtaCheck() 
{ 
  var Lta=document.getElementById("MaxLTA").value; 
  if(document.getElementById("LtaCheck").checked==true){document.getElementById("LTA").value=Lta;}
  else if(document.getElementById("LtaCheck").checked==false){document.getElementById("LTA").value=0;}
}
function FunCeaCheck() //getElementById("CeaCheck1").disabled=false
{
  var Cea=parseFloat(document.getElementById("MaxCEA").value); CeaHalf=Math.round((Cea/2)*100)/100;
  if(document.getElementById("CeaCheck1").checked==true){document.getElementById("CeaCheck2").disabled=false}
  if(document.getElementById("CeaCheck1").checked==false){document.getElementById("CeaCheck2").checked=false; document.getElementById("CeaCheck2").disabled=true;}
  if(document.getElementById("CeaCheck1").checked==true && document.getElementById("CeaCheck2").checked==false){document.getElementById("CEA").value=CeaHalf;}
  else if(document.getElementById("CeaCheck1").checked==false && document.getElementById("CeaCheck2").checked==true){document.getElementById("CEA").value=CeaHalf;}
  else if(document.getElementById("CeaCheck1").checked==true && document.getElementById("CeaCheck2").checked==true){document.getElementById("CEA").value=Cea;}
  else if(document.getElementById("CeaCheck1").checked==false && document.getElementById("CeaCheck2").checked==false){document.getElementById("CEA").value=0;}
}
function FunMedicalCheck()
{
  var Medical=document.getElementById("MaxMedical").value; 
  if(document.getElementById("MedicalCheck").checked==true){document.getElementById("Medical").value=Medical;}
  else if(document.getElementById("MedicalCheck").checked==false){document.getElementById("Medical").value=0;}
}
</script>
<input type="hidden" id="MaxLTA" name="MaxLTA" value="<?php echo $LTA; ?>" readonly=""/> 
<?php if($res['LTA']=='Y'){ ?>
<tr>
<td align="center" valign="top" style="width:20px;font-size:15px;">5</td>
<td align="left" valign="top" style="width:100px;font-size:15px;">&nbsp;LTA Sec 10(5)</td>
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;I will provide the tickets/ Travels bills in original as per(twice basic monthly) the LTA policy or else the company can consider amount as taxable.</td>
<td align="center" valign="top" style="width:90px;font-size:15px;"><?php echo $LTA; ?><br>
<input type="checkbox" id="LtaCheck" onClick="FunLtaCheck()" <?php if($resIvst['LTA']>0){echo 'checked';} ?> disabled/></td>
<td align="center" valign="top" style="width:110px;font-size:15px;">
<input id="LTA" name="LTA" class="textBox" value="<?php if($resIvst['LTA']==''){echo 0;}else {echo $resIvst['LTA']; } ?>" readonly maxlength="8"/></td>
</tr>
<?php }else{ ?><input type="hidden" id="LtaCheck" name="LtaCheck" value="0" readonly=""/><?php } ?>

<input type="hidden" id="MaxCEA" name="MaxCEA" value="2400" readonly=""/>
<?php if($res['CEA']=='Y'){ ?>
<tr>
<td align="center" valign="top" style="width:20px;font-size:15px;">6</td>
<td align="left" valign="top" style="width:100px;font-size:15px;">&nbsp;CEA Sec 10(14)</td>
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;I will provide the copy of tution fees reciept as per CEA policy or else the company can consider amount as taxable.(Rs100/- per month per child upto max of two children)</td>
<td align="center" valign="top" style="width:90px;font-size:15px;">2400<br>Child 1<input type="checkbox" id="CeaCheck1" onClick="FunCeaCheck()" <?php if($resIvst['CEA']>0 AND ($resIvst['CEA']==1200 OR $resIvst['CEA']==2400)){echo 'checked';} ?> disabled/><br>Child 2<input type="checkbox" id="CeaCheck2" onClick="FunCeaCheck()" <?php if($resIvst['CEA']>0 AND $resIvst['CEA']==2400){echo 'checked';} ?> disabled/></td>
<td align="center" valign="top" style="width:110px;font-size:15px;"><input type="hidden" id="MaxCEA" name="MaxCEA" value="2400" readonly=""/>
<input id="CEA" name="CEA" class="textBox" value="<?php if($resIvst['CEA']==''){echo 0;}else {echo $resIvst['CEA']; } ?>" readonly maxlength="8"/></td>
</tr>
<?php }else{ ?><input type="hidden" id="CeaCheck1" name="CeaCheck1" value="0" readonly=""/><input type="hidden" id="CeaCheck2" name="CeaCheck2" value="0" readonly=""/><?php } ?>

<input type="hidden" id="MaxMedical" name="MaxMedical" value="15000" readonly=""/>
<?php if($res['Medical']=='Y'){  ?>
<tr>
<td align="center" valign="top" style="width:20px;font-size:15px;">7</td>
<td align="left" valign="top" style="width:100px;font-size:15px;">&nbsp;Medical Sec 17(2)</td>
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;I will produce the Medical Bills to the Satisfacton of the company for my eligibility of Rs. 15000/- as per Income Tax Act of else the company can consider the amount paid as taxable</td>
<td align="center" valign="top" style="width:90px;font-size:15px;">15000<br>
<input type="checkbox" id="MedicalCheck" onClick="FunMedicalCheck()" <?php if($resIvst['Medical']>0){echo 'checked';} ?> disabled/></td>
<td align="center" valign="top" style="width:110px;font-size:15px;">
<input id="Medical" name="Medical" class="textBox" value="<?php if($resIvst['Medical']==''){echo 0;}else { echo $resIvst['Medical']; }?>" readonly maxlength="8"/></td>
</tr>
<?php } ?>
<tr bgcolor="#CEFFCE">
<td align="left" colspan="5" valign="top" style="width:850px;font-size:15px;">&nbsp;<b>** If you have opted for the medical reimbursements ( being Medical expenses part of your CTC)</b></td>
</tr>
<tr style="background-color:#0080FF;">
<td align="center" valign="top" colspan="3" style="width:20px;font-size:15px; background-color:#0080FF; color:#FFFFFF;"></td>
<td align="center" valign="top" style="width:100px;font-size:15px;color:#FFFFFF;"><b>Max. Limit</b></td>
<td align="center" valign="top" style="width:100px;font-size:15px;color:#FFFFFF;"><b>Declared_Amt</b></td>
</tr>
<input type="hidden" id="MaxMIP" name="MaxMIP" value="<?php echo $res['MIP_Limit']; ?>" readonly=""/>
<tr>
<td align="center" valign="top" rowspan="5" style="width:20px;font-size:15px;"><?php if($res['LTA']=='N' AND $res['CEA']=='N' AND $res['Medical']=='N'){echo 5;}else {echo 7;} ?></td>
<td align="Center" valign="middle" rowspan="5" style="width:100px;font-size:15px;">&nbsp;Deductions Under Chapeter VI A </td>
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;Sec.80D - Medical Insurance Premium (If the policy covers a senior Citizen then additional deduction of Rs.5000/- is available & deduction on account of expenditure on preventive Health Check-Up (for Self, Spouse, Dependant Children & Parents )Shall not exceed in the aggregate Rs 5000/-.) </td>
<td align="center" valign="top" style="width:90px;font-size:15px;"><?php if($res['MIP_Limit']>0){echo intval($res['MIP_Limit']);}else{ echo '&nbsp;'; } ?></td>
<td align="center" valign="top" style="width:110px;font-size:15px;">
<input id="MIP" name="MIP" class="textBox" value="<?php if($resIvst['MIP']==''){echo 0;}else { echo $resIvst['MIP']; } ?>" readonly maxlength="8"/></td>
</tr>
<input type="hidden" id="MaxMTI" name="MaxMTI" value="<?php echo $res['MIT_Limit']; ?>" readonly=""/>
<tr>
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;"Sec. 80DD - Medical treatment/insurance of Handicapped Dependant
A higher deduction of Rs. 100,000 is available, where such dependent is with severe disability of > 80%" </td>
<td align="center" valign="top" style="width:90px;font-size:15px;"><?php if($res['MTI_Limit']>0){echo intval($res['MTI_Limit']);}else{ echo '&nbsp;'; } ?></td>
<td align="center" valign="top" style="width:110px;font-size:15px;">
<input id="MTI" name="MTI" class="textBox" value="<?php if($resIvst['MTI']==''){echo 0;}else { echo $resIvst['MTI']; } ?>" readonly maxlength="8"/></td>
</tr>
<input type="hidden" id="MaxMTS" name="MaxMTS" value="<?php echo $res['MTS_Limit']; ?>" readonly=""/>
<tr>
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;"Sec 80DDB - Medical treatment (specified diseases only)
(medical treatment in respect of a senior Citizen then additional deduction of Rs.20,000/- is available)" </td>
<td align="center" valign="top" style="width:90px;font-size:15px;"><?php if($res['MTS_Limit']>0){echo intval($res['MTS_Limit']);}else{ echo '&nbsp;'; } ?></td>
<td align="center" valign="top" style="width:110px;font-size:15px;">
<input id="MTS" name="MTS" class="textBox" value="<?php if($resIvst['MTS']==''){echo 0;}else { echo $resIvst['MTS']; } ?>" readonly maxlength="8"/></td>
</tr>
<input type="hidden" id="MaxROL" name="MaxROL" value="<?php echo $res['ROL_Limit']; ?>" readonly=""/>
<tr>
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;Sec 80E - Repayment of Loan for higher education (only interest) </td>
<td align="center" valign="top" style="width:90px;font-size:15px;"><?php if($res['ROL_Limit']>0){echo intval($res['ROL_Limit']);}else{ echo '&nbsp;'; } ?></td>
<td align="center" valign="top" style="width:110px;font-size:15px;">
<input id="ROL" name="ROL" class="textBox" value="<?php if($resIvst['ROL']==''){echo 0;}else { echo $resIvst['ROL']; } ?>" readonly maxlength="8"/></td>
</tr>
<input type="hidden" id="MaxHandi" name="MaxHandi" value="<?php echo $res['Handi_Limit']; ?>" readonly=""/>
<tr>
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;Sec 80U - Handicapped </td>
<td align="center" valign="top" style="width:90px;font-size:15px;"><?php if($res['Handi_Limit']>0){echo intval($res['Handi_Limit']);}else{ echo '&nbsp;'; } ?></td>
<td align="center" valign="top" style="width:110px;font-size:15px;">
<input id="Handi" name="Handi" class="textBox" value="<?php if($resIvst['Handi']==''){echo 0;}else { echo $resIvst['Handi']; }?>" readonly maxlength="8"/></td>
</tr>
<input type="hidden" id="MaxDTC" name="MaxDTC" value="" readonly=""/>
<tr style="display:none;">
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;Sec 80G - Donation to certain funds </td>
<td align="center" valign="top" style="width:90px;font-size:15px;"><select id="80GPer" name="80GPer" style="height:20px; width:85px; background-color:#AAD5FF;" disabled><option value="<?php if($resIvst['80G_Per']==0){echo 0;}else {echo $resIvst['80G_Per']; } ?>"><?php if($resIvst['80G_Per']==0){echo 'Select';} else{echo $resIvst['80G_Per'].'%'; } ?></option><option value="50">50%</option><option value="100">100%</option>
</select></td>
<td align="center" valign="top" style="width:110px;font-size:15px;">
<input id="DTC" name="DTC" class="textBox" value="<?php if($resIvst['DTC']==''){echo 0;}else { echo $resIvst['DTC']; }?>" readonly maxlength="8"/></td>
</tr>

<input type="hidden" id="MaxRP" name="MaxRP" value="24000" readonly=""/>
<input type="hidden" id="RP" name="RP" class="textBox" value="<?php if($resIvst['RP']==''){echo 0;}else { echo $resIvst['RP']; }?>" readonly maxlength="8"/>
<input type="hidden" id="MaxDFS" name="MaxDFS" value="" readonly=""/>
<tr style="display:none;">
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;Sec 80GGA - Donation for scientific research</td>
<td align="center" valign="top" style="width:90px;font-size:15px;">&nbsp;</td>
<td align="center" valign="top" style="width:110px;font-size:15px;">
<input id="DFS" name="DFS" class="textBox" value="<?php if($resIvst['DFS']==''){echo 0;}else { echo $resIvst['DFS']; }?>" readonly maxlength="8"/></td>
</tr>

<tr style="background-color:#0080FF;">
<td align="center" valign="top" colspan="3" style="width:20px;font-size:15px; background-color:#0080FF; color:#FFFFFF;"></td>
<td align="center" valign="top" style="width:100px;font-size:15px;color:#FFFFFF;"><b>Max. Limit</b></td>
<td align="center" valign="top" style="width:100px;font-size:15px;color:#FFFFFF;"><b>Declared_Amt</b></td>
</tr>
<input type="hidden" id="MaxPenFun" name="MaxPenFun" value="<?php echo $res['PenFun_Limit']; ?>" readonly=""/>
<tr>
<td align="center" valign="top" rowspan="14" style="width:20px;font-size:15px;"><?php if($res['LTA']=='N' AND $res['CEA']=='N' AND $res['Medical']=='N'){echo 6;}else {echo 8;} ?></td>
<td align="Center" valign="middle" rowspan="14" style="width:100px;font-size:15px;">&nbsp;Deduction Under Section 80C</td>
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;Sec 80CCC - Contribution to Pension Fund (Jeevan Suraksha)</td>
<td rowspan="14" align="center" valign="middle" style="width:90px;font-size:15px;"><?php if($res['PenFun_Limit']>0){echo intval($res['PenFun_Limit']);}else{ echo '&nbsp;'; } ?></td>
<td align="center" valign="top" style="width:110px;font-size:15px;">
<input id="PenFun" name="PenFun" class="textBox" value="<?php if($resIvst['PenFun']==''){echo 0;}else { echo $resIvst['PenFun']; } ?>" readonly maxlength="8"/></td>
</tr>
<input type="hidden" id="MaxLIP" name="MaxLIP" value="<?php echo $res['LIP_Limit']; ?>" readonly=""/>
<tr>
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;Life Insurance Premium </td>
<?php /* <td align="center" valign="top" style="width:90px;font-size:15px;"><?php if($res['LIP_Limit']>0){echo intval($res['LIP_Limit']);}else{ echo '&nbsp;'; } ?></td> */?>
<td align="center" valign="top" style="width:110px;font-size:15px;">
<input id="LIP" name="LIP" class="textBox" value="<?php if($resIvst['LIP']==''){echo 0;}else {echo $resIvst['LIP']; } ?>" readonly maxlength="8"/></td>
</tr>
<input type="hidden" id="MaxDA" name="MaxDA" value="<?php echo $res['DA_Limit']; ?>" readonly=""/>
<tr>
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;Defferred Annuity</td>
<?php /*<td align="center" valign="top" style="width:90px;font-size:15px;"><?php if($res['DA_Limit']>0){echo intval($res['DA_Limit']);}else{ echo '&nbsp;'; } ?></td> */?>
<td align="center" valign="top" style="width:110px;font-size:15px;">
<input id="DA" name="DA" class="textBox" value="<?php if($resIvst['DA']==''){echo 0;}else {echo $resIvst['DA'];} ?>" readonly maxlength="8"/></td>
</tr>
<input type="hidden" id="MaxPPF" name="MaxPPF" value="<?php echo $res['PPF_Limit']; ?>" readonly=""/> 
<tr>
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;Public Provident Fund</td>
<?php /*<td align="center" valign="top" style="width:90px;font-size:15px;"><?php if($res['PPF_Limit']>0){echo intval($res['PPF_Limit']);}else{ echo '&nbsp;'; } ?></td> */?>
<td align="center" valign="top" style="width:110px;font-size:15px;">
<input id="PPF" name="PPF" class="textBox" value="<?php if($resIvst['PPF']==''){echo 0;}else { echo $resIvst['PPF']; } ?>"  readonly maxlength="8"/></td>
</tr>
<input type="hidden" id="MaxPostOff" name="MaxPostOff" value="<?php echo $res['PostOff_Limit']; ?>" readonly=""/>
<tr>
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;Time Deposit in Post Office / Bank for 5 year & above</td>
<?php /*<td align="center" valign="top" style="width:90px;font-size:15px;"><?php if($res['PostOff_Limit']>0){echo intval($res['PostOff_Limit']);}else{ echo '&nbsp;'; } ?></td> */?>
<td align="center" valign="top" style="width:110px;font-size:15px;">
<input id="PostOff" name="PostOff" class="textBox" value="<?php if($resIvst['PostOff']==''){echo 0;}else { echo $resIvst['PostOff']; } ?>" readonly maxlength="8"/></td>
</tr>
<input type="hidden" id="MaxULIP" name="MaxULIP" value="<?php echo $res['ULIP_Limit']; ?>" readonly=""/>
<tr>
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;ULIP of UTI/LIC	</td>
<?php /*<td align="center" valign="top" style="width:90px;font-size:15px;"><?php if($res['ULIP_Limit']>0){echo intval($res['ULIP_Limit']);}else{ echo '&nbsp;'; } ?></td> */?>
<td align="center" valign="top" style="width:110px;font-size:15px;">
<input id="ULIP" name="ULIP" class="textBox" value="<?php if($resIvst['ULIP']==''){echo 0;}else {echo $resIvst['ULIP']; }?>" readonly maxlength="8"/></td>
</tr>
<input type="hidden" id="MaxHL" name="MaxHL" value="<?php echo $res['HL_Limit']; ?>" readonly=""/>
<tr>
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;Principal Loan (Housing Loan) Repayment </td>
<?php /*<td align="center" valign="top" style="width:90px;font-size:15px;"><?php if($res['HL_Limit']>0){echo intval($res['HL_Limit']);}else{ echo '&nbsp;'; } ?></td> */?>
<td align="center" valign="top" style="width:110px;font-size:15px;">
<input id="HL" name="HL" class="textBox" value="<?php if($resIvst['HL']==''){echo 0;}else { echo $resIvst['HL']; }?>" readonly maxlength="8"/></td>
</tr>
<input type="hidden" id="MaxMF" name="MaxMF" value="<?php echo $res['MF_Limit']; ?>" readonly=""/>
<tr>
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;Mutual Funds</td>
<?php /*<td align="center" valign="top" style="width:90px;font-size:15px;"><?php if($res['MF_Limit']>0){echo intval($res['MF_Limit']);}else{ echo '&nbsp;'; } ?></td> */?>
<td align="center" valign="top" style="width:110px;font-size:15px;">
<input id="MF" name="MF" class="textBox" value="<?php if($resIvst['MF']==''){echo 0;}else {echo $resIvst['MF']; } ?>"  readonly maxlength="8"/></td>
</tr>
<input type="hidden" id="MaxIB" name="MaxIB" value="<?php echo $res['IB_Limit']; ?>" readonly=""/>
<tr>
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;Investment in infrastructure Bonds</td>
<?php /*<td align="center" valign="top" style="width:90px;font-size:15px;"><?php if($res['IB_Limit']>0){echo intval($res['IB_Limit']);}else{ echo '&nbsp;'; } ?></td> */?>
<td align="center" valign="top" style="width:110px;font-size:15px;">
<input id="IB" name="IB" class="textBox" value="<?php if($resIvst['IB']==''){echo 0;}else { echo $resIvst['IB']; } ?>"  readonly maxlength="8"/></td>
</tr>
<input type="hidden" id="MaxCTF" name="MaxCTF" value="<?php echo $res['CTF_Limit']; ?>" readonly=""/>
<tr>
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;Children- Tution Fee restricted to max.of 2 children</td>
<?php /*<td align="center" valign="top" style="width:90px;font-size:15px;"><?php if($res['CTF_Limit']>0){echo intval($res['CTF_Limit']);}else{ echo '&nbsp;'; } ?></td> */?>
<td align="center" valign="top" style="width:110px;font-size:15px;">
<input id="CTF" name="CTF" class="textBox" value="<?php if($resIvst['CTF']==''){echo 0;}else { echo $resIvst['CTF']; } ?>"  readonly maxlength="8"/></td>
</tr>
<input type="hidden" id="MaxNHB" name="MaxNHB" value="<?php echo $res['NHB_Limit']; ?>" readonly=""/>
<tr>
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;Deposit in NHB</td>
<?php /*<td align="center" valign="top" style="width:90px;font-size:15px;"><?php if($res['NHB_Limit']>0){echo intval($res['NHB_Limit']);}else{ echo '&nbsp;'; } ?></td> */?>
<td align="center" valign="top" style="width:110px;font-size:15px;">
<input id="NHB" name="NHB" class="textBox" value="<?php if($resIvst['NHB']==''){echo 0;}else { echo $resIvst['NHB']; }?>"  readonly maxlength="8"/></td>
</tr>
<input type="hidden" id="MaxNSC" name="MaxNSC" value="<?php echo $res['NSC_Limit']; ?>" readonly=""/>
<tr>
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;Deposit In NSC</td>
<?php /*<td align="center" valign="top" style="width:90px;font-size:15px;"><?php if($res['NSC_Limit']>0){echo intval($res['NSC_Limit']);}else{ echo '&nbsp;'; } ?></td> */?>
<td align="center" valign="top" style="width:110px;font-size:15px;">
<input id="NSC" name="NSC" class="textBox"  value="<?php if($resIvst['NSC']==''){echo 0;}else { echo $resIvst['NSC']; }?>" readonly maxlength="8"/></td>
</tr>
<input type="hidden" id="MaxSukS" name="MaxSukS" value="<?php echo $res['SukS_Limit']; ?>" readonly=""/>
<tr>
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;Sukanya Samriddhi</td>
<td align="center" valign="top" style="width:110px;font-size:15px;">
<input id="SukS" name="SukS" class="textBox"  value="<?php if($resIvst['SukS']==''){echo 0;}else { echo $resIvst['SukS']; }?>" readonly maxlength="8"/></td>
</tr>

<input type="hidden" id="MaxEPF" name="MaxEPF" value="<?php echo $res['EPF_Limit']; ?>" readonly=""/>
<tr>
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;Others (please specify) Employee Provident Fund	</td>
<?php /*<td align="center" valign="top" style="width:90px;font-size:15px;"><?php if($res['EPF_Limit']>0){echo intval($res['EPF_Limit']);}else{ echo '&nbsp;'; } ?></td> */?>
<td align="center" valign="top" style="width:110px;font-size:15px;">
<input id="EPF" name="EPF" class="textBox" value="<?php if($resIvst['EPF']==''){echo 0;}else {echo $resIvst['EPF']; }?>"  readonly maxlength="8"/></td>
</tr>

<tr style="background-color:#0080FF;">
<td align="center" valign="top" colspan="3" style="width:20px;font-size:15px; background-color:#0080FF; color:#FFFFFF;"></td>
<td align="center" valign="top" style="width:100px;font-size:15px;color:#FFFFFF;"><b>Max. Limit</b></td>
<td align="center" valign="top" style="width:100px;font-size:15px;color:#FFFFFF;"><b>Declared_Amt</b></td>
</tr>

<input type="hidden" id="MaxNPS" name="MaxNPS" value="<?php echo $res['NPS_Limit']; ?>" readonly=""/>
<tr>
<td align="center" valign="top" style="width:20px;font-size:15px;"><?php if($res['LTA']=='N' AND $res['CEA']=='N' AND $res['Medical']=='N'){echo 7;}else {echo 9;} ?></td>
<td align="Center" valign="middle" style="width:100px;font-size:15px;">&nbsp;Sec. 80CCD(1B)</td>
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;NPS (National Pension Scheme)/ Atal Pension Yojna(APY) </td>
<td align="center" valign="top" style="width:90px;font-size:15px;"><?php if($res['NPS_Limit']>0){echo intval($res['NPS_Limit']);}else{ echo '&nbsp;'; } ?></td>
<td align="center" valign="top" style="width:110px;font-size:15px;">
<input id="NPS" name="NPS" class="textBox"  value="<?php if($resIvst['NPS']==''){echo 0;}else { echo $resIvst['NPS']; }?>" readonly maxlength="8"/></td>
</tr>

<?php /********************************************/ ?>
<tr>
<td align="center" valign="top" style="width:20px;font-size:15px;"><?php if($res['LTA']=='N' AND $res['CEA']=='N' AND $res['Medical']=='N'){echo 8;}else {echo 10;} ?></td>
<td align="Center" valign="middle" style="width:100px;font-size:15px;">&nbsp;Sec. 80CCD(2)</td>
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;Corporate NPS Scheme</td>
<td align="center" valign="top" style="width:90px;font-size:15px;">10% Of Basic Salary</td>
<td align="center" valign="top" style="width:110px;font-size:15px;">
<input id="CorNPS" name="CorNPS" class="textBox"  value="<?php if($resIvst['CorNPS']==''){echo 0;}else { echo $resIvst['CorNPS']; }?>" readonly maxlength="8"/></td>
</tr>
<?php /********************************************/ ?>




<input type="hidden" id="MaxForm16" name="MaxForm16" value="<?php echo $res['Form16_Limit']; ?>" readonly=""/>
<tr>
<td align="center" valign="top" rowspan="5" style="width:20px;font-size:15px;"><?php if($res['LTA']=='N' AND $res['CEA']=='N' AND $res['Medical']=='N'){echo 9;}else {echo 11;} ?></td>
<td align="Center" valign="middle" rowspan="5" style="width:100px;font-size:15px;">&nbsp;Previous Employment Salary (Salary earened from 01/04/12 till date of joining) </td>
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;If yes, Form 16 from previous employer or Form 12 B with tax computation statement</td>
<td align="center" valign="top" style="width:90px;font-size:15px;"><?php if($res['Form16_Limit']>0){echo intval($res['Form16_Limit']);}else{ echo '&nbsp;'; } ?></td>
<td align="center" valign="top" style="width:110px;font-size:15px;">
<input id="Form16" name="Form16" class="textBox" value="<?php if($resIvst['Form16']==''){echo 0;}else { echo $resIvst['Form16']; }?>" readonly maxlength="8"/></td>
</tr>
<input type="hidden" id="MaxSPE" name="MaxSPE" value="<?php echo $res['SPE_Limit']; ?>" readonly=""/>
<tr>
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;Salary paid by the Previous Employer after Sec.10 Exemption	</td>
<td align="center" valign="top" style="width:90px;font-size:15px;"><?php if($res['SPE_Limit']>0){echo intval($res['SPE_Limit']);}else{ echo '&nbsp;'; } ?></td>
<td align="center" valign="top" style="width:110px;font-size:15px;">
<input id="SPE" name="SPE" class="textBox" value="<?php if($resIvst['SPE']==''){echo 0;}else { echo $resIvst['SPE']; } ?>" readonly maxlength="8"/></td>
</tr>
<input type="hidden" id="MaxPT" name="MaxPT" value="<?php echo $res['PT_Limit']; ?>" readonly=""/>
<tr>
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;PROFESSIOAL TAX deducted by the Previous Employer </td>
<td align="center" valign="top" style="width:90px;font-size:15px;"><?php if($res['PT_Limit']>0){echo intval($res['PT_Limit']);}else{ echo '&nbsp;'; } ?></td>
<td align="center" valign="top" style="width:110px;font-size:15px;">
<input id="PT" name="PT" class="textBox" value="<?php if($resIvst['PT']==''){echo 0;}else {echo $resIvst['PT']; }?>" readonly maxlength="8"/></td>
</tr>
<input type="hidden" id="MaxPFD" name="MaxPFD" value="<?php echo $res['PFD_Limit']; ?>" readonly=""/>
<tr>
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;PROVIDENT FUND deducted by the Previous Employer </td>
<td align="center" valign="top" style="width:90px;font-size:15px;"><?php if($res['PFD_Limit']>0){echo intval($res['PFD_Limit']);}else{ echo '&nbsp;'; } ?></td>
<td align="center" valign="top" style="width:110px;font-size:15px;">
<input id="PFD" name="PFD" class="textBox" value="<?php if($resIvst['PFD']==''){echo 0;}else { echo $resIvst['PFD']; } ?>" readonly maxlength="8"/></td>
</tr>
<input type="hidden" id="MaxIT" name="MaxIT" value="<?php echo $res['IT_Limit']; ?>" readonly=""/>
<tr>
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;INCOME TAX deducted by the Previous Employer</td>
<td align="center" valign="top" style="width:90px;font-size:15px;"><?php if($res['IT_Limit']>0){echo intval($res['IT_Limit']);}else{ echo '&nbsp;'; } ?></td>
<td align="center" valign="top" style="width:110px;font-size:15px;">
<input id="IT" name="IT" class="textBox" value="<?php if($resIvst['IT']==''){echo 0;}else { echo $resIvst['IT']; }?>" readonly maxlength="8"/></td>
</tr>
<tr>
<td align="left" valign="top" colspan="5" style="width:550px;font-size:15px;">&nbsp;</td>
</tr>
<tr>
<td align="center" valign="top" style="width:20px;font-size:15px;"><?php if($res['LTA']=='N' AND $res['CEA']=='N' AND $res['Medical']=='N'){echo 10;}else {echo 12;} ?></td>
<td align="Center" valign="top" style="width:100px;font-size:15px;">&nbsp;Income other then Salary Income</td>
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;If yes, then Form 12C detailing other income is attached(only interest)</td>
<td align="center" valign="top" style="width:90px;font-size:15px;">&nbsp;</td>
<td align="center" valign="top" style="width:110px;font-size:15px;">&nbsp;</td>
</tr>
<tr style="background-color:#0080FF;">
<td align="center" valign="top" colspan="3" style="width:20px;font-size:15px; background-color:#0080FF; color:#FFFFFF;"></td>
<td align="center" valign="top" style="width:100px;font-size:15px;color:#FFFFFF;"><b>Max. Limit</b></td>
<td align="center" valign="top" style="width:100px;font-size:15px;color:#FFFFFF;"><b>Declared_Amt</b></td>
</tr>
<input type="hidden" id="MaxIHL" name="MaxIHL" value="<?php echo $res['IHL_Limit']; ?>" readonly=""/>
<tr>
<td align="center" valign="top" rowspan="2" style="width:20px;font-size:15px;"><?php if($res['LTA']=='N' AND $res['CEA']=='N' AND $res['Medical']=='N'){echo 11;}else{echo 13;} ?></td>
<td align="Center" valign="middle" rowspan="2" style="width:100px;font-size:15px;">&nbsp;Deduction under Section 24 </td>
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;Interest on Housing Loan</td>
<td align="center" valign="top" style="width:90px;font-size:15px;"><?php if($res['IHL_Limit']>0){echo intval($res['IHL_Limit']);}else{ echo '&nbsp;'; } ?></td>
<td align="center" valign="top" style="width:110px;font-size:15px;">
<input id="IHL" name="IHL" class="textBox" value="<?php if($resIvst['IHL']==''){echo 0;}else { echo $resIvst['IHL']; }?>" readonly maxlength="10"/></td>
</tr>
<input type="hidden" id="MaxIL" name="MaxIL" value="<?php echo $res['IL_Limit']; ?>" readonly=""/>
<tr>
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;Interest if the loan is taken before 01/04/99</td>
<td align="center" valign="top" style="width:90px;font-size:15px;"><?php if($res['IL_Limit']>0){echo intval($res['IL_Limit']);}else{ echo '&nbsp;'; } ?></td>
<td align="center" valign="top" style="width:110px;font-size:15px;">
<input id="IL" name="IL" class="textBox" value="<?php if($resIvst['IL']==''){echo 0;}else { echo $resIvst['IL']; } ?>" readonly maxlength="10"/></td>
</tr>
<tr bgcolor="#CEFFCE">
<td align="left" colspan="5" valign="top" style="width:850px;font-size:15px;">&nbsp;<b>Note: Form 12C along with the calculation of loss on house property heeds to be attached for considering the above</b></td>
</tr>
<tr><td align="left" colspan="5" valign="top" style="width:850px;font-size:15px;">&nbsp;<b><u>Declaration:</u></b></td></tr>
<tr><td align="left" colspan="5" valign="top" style="width:850px;font-size:15px;">&nbsp;1) I hereby declare that the information given above is correct and true in all respects.</td></tr>
<tr><td align="left" colspan="5" valign="top" style="width:850px;font-size:15px;">&nbsp;2) I also undertake to indemnify the company for any loss/liability that may arise in the event of the above information being incorrect.</td></tr>
<tr>
<td align="left" valign="top" colspan="3" style="width:550px;font-size:15px;">&nbsp;</td>

<?php /*
<td align="center" valign="bottom" rowspan="2" colspan="2" style="width:200px;font-size:15px;">
<?php echo "<img width=195px height=45px src=\"show_SignImg.php?YId=".$YearId."&id=".$EmployeeId."\" border=0>\n";?>
</td>
</tr>
<tr>
<td align="" colspan="2" valign="top" style="width:100px;font-size:15px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Date :</b> </td>
<td align="left" valign="top" style="width:550px;font-size:15px;">
<input id="Inv_Date" name="Inv_Date" class="textBox"  value="<?php echo $resIvst['Inv_Date']; ?>" readonly/><button id="f_btn1" class="CalenderButton"></button>
		                       <script type="text/javascript">  var cal = Calendar.setup({ onSelect:  function(cal) { cal.hide()}, showTime: true }); 
                               cal.manageFields("f_btn1", "Inv_Date", "%d-%m-%Y");</script></td>
</tr>
<tr>
<td align="" colspan="2" valign="top" style="width:100px;font-size:15px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Place : </b></td>
<td align="left" valign="top" style="width:550px;font-size:15px;">
<input id="Place" name="Place" style="width:200px;height:21px;background-color:#D6D6D6;" value="<?php echo $resIvst['Place']; ?>" readonly maxlength="50" /></td>
<td align="center" valign="middle" colspan="2" valign="top" style="width:200px;font-size:15px;"><b>Signature</b>&nbsp;
<?php if($resIvst['FormSubmit']=='Y') { ?>
<a href="#" style="text-decoration:none;"><input type="button" id="Attach" value="Attach" onClick="AttachSign(<?php echo $EmployeeId.', '.$YearId; ?>)" alt="Attach signature" style="background-color:#B9DCFF;" disabled/></a><?php } ?></td>
</tr>
<tr>
*/ ?>
<td align="center" valign="bottom" rowspan="2" colspan="2" style="width:200px;font-size:15px;">&nbsp;

</td>
</tr>
<?php $sqlEdit=mysql_query("select * from hrm_employee_investment_declaration where EmployeeID=".$EmployeeId." AND Period='".$PrdCurr."' AND Month=".$res['C_Month'], $con);
	  $rowEdit=mysql_num_rows($sqlEdit);  $resEdit=mysql_fetch_assoc($sqlEdit); ?>
<tr>
<td align="" colspan="2" valign="top" style="width:100px;font-size:15px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Date :</b> </td>
<td align="left" valign="top" style="width:550px;font-size:15px;">
<input id="Inv_Date" name="Inv_Date" class="textBox"  value="<?php if($rowEdit==0){echo '';}elseif($rowEdit>0){if($resEdit['Inv_Date']!='' AND $resEdit['Inv_Date']!='0000-00-00' AND $resEdit['Inv_Date']!='1970-01-01'){echo date("d-M-Y", strtotime($resEdit['Inv_Date'])); } }?>" readonly/>
<?php //if($resIvst['FormSubmit']!='YY'){ ?><button id="f_btn1" class="CalenderButton"></button> <?php //} ?>
		                       <script type="text/javascript">  var cal = Calendar.setup({ onSelect:  function(cal) { cal.hide()}, showTime: true }); 
                               cal.manageFields("f_btn1", "Inv_Date", "%d-%m-%Y");</script></td>

</tr>
<tr>
<td align="" colspan="2" valign="top" style="width:100px;font-size:15px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Place : </b></td>
<td align="left" valign="top" style="width:550px;font-size:15px;">
<input id="Place" name="Place" style="width:200px;height:21px;background-color:#D6D6D6;" value="<?php echo $resIvst['Place']; ?>" readonly maxlength="50" /></td>
<td align="center" valign="middle" colspan="2" valign="top" style="width:200px;font-size:15px;"><b>Signature</b></td>
</tr>
<tr>

<td align="left" valign="top" colspan="5" style="width:550px;font-size:15px;">&nbsp;</td>
</tr>
   <td align="" class="fontButton" colspan="6"><table border="0" align="right" class="fontButton">

   <tr>
<td style="width:450px;color:#FFFFFF;font-weight:bold;font-family:Times New Roman; font-size:15px;"><span id="msgCTC">&nbsp;</span></td>
<td align="center"><input type="submit" name="SubmitInvstDec" id="SubmitInvstDec" style="width:90px; display:<?php if($rowEdit==0 OR $resEdit['FormSubmit']=='YY'){echo 'none';} ?>;" value="submit" disabled></td>

<td align="center"><input type="submit" name="SaveInvstDec" id="SaveInvstDec" style="width:90px; display:<?php if($rowEdit==0 OR $resEdit['FormSubmit']=='YY'){echo 'none';} ?>;" value="save" disabled></td>
	  
<td align="center"><?php if($rowEdit==0 OR ($rowEdit>0 AND $resEdit['FormSubmit']=='Y')) { ?>
<input type="button" name="EditInvstDec" id="EditInvstDec" style="width:90px;" value="edit" onClick="Edit()" <?php if(date("Y-m-d H:i:s")>$res['LastDateTime']){echo 'disabled';}?>><?php } ?>


</td>

<td align="center" style="width:90px;"><input type="button" name="Refresh" id="Refresh" style="width:90px;" value="Refresh" onClick="javascript:window.location='InvestDecl.php'" <?php if(date("Y-m-d H:i:s")>$res['LastDateTime']){echo 'disabled';}?> /></td>
   </tr>

</table>

	</td>
	</tr>
	</table>

<!-- 1111111111111111111111111111 --------------- 11111111111111111111 ----------------- Close ---->
<!-- 1111111111111111111111111111 --------------- 11111111111111111111 ----------------- Close ---->
<!-- 1111111111111111111111111111 --------------- 11111111111111111111 ----------------- Close ---->  
</div>

<div id="block2" style="display:<?php if($resIvst['YearId']>8 && $resIvst['Regime']=='new'){echo 'block';}else{echo 'none';}?>;">
<!-- 2222222222222222222222222222 --------------- 22222222222222222222 ----------------- Open ---->
<!-- 2222222222222222222222222222 --------------- 22222222222222222222 ----------------- Open ---->
<!-- 2222222222222222222222222222 --------------- 22222222222222222222 ----------------- Open ---->	 		  
<table border="1" width="850" id="TEmp" cellpadding="1" cellspacing="2" bgcolor="#FFFFFF">
<tr>
  <td align="center" style="width:850px;font-size:15px; height:18px;" colspan="5">&nbsp;<b>(To be used to declare investment for income Tax that will be made during the period <?php echo $PrdCurr; ?>)</b></td>
</tr>
<tr>
<td align="center" valign="top" style="width:20px;font-size:15px;">1</td>
<td align="left" valign="top" style="width:100px;font-size:15px;">&nbsp;Company</td>
<?php $SqlCom=mysql_query("select CompanyName from hrm_company_basic where CompanyId=".$CompanyId."", $con); $resCom=mysql_fetch_assoc($SqlCom); ?> 
<td align="left" valign="top" style="width:550px;font-size:15px; color:#003700;">&nbsp;<b><?php echo strtoupper($resCom['CompanyName']); ?></b></td>
<td align="center" valign="top" style="width:90px;font-size:15px;">&nbsp;EmployeeID</td>
<td align="center" valign="top" style="width:110px;font-size:15px;">&nbsp;<?php echo $EC; ?></td>
</tr>

<tr>
<td align="center" valign="top" style="width:20px;font-size:15px;">2</td>
<td align="left" valign="top" style="width:100px;font-size:15px;">&nbsp;Employee</td>
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;<?php echo strtoupper($Ename); ?></td>
<td align="left" valign="top" style="width:200px;font-size:15px;" colspan="2">&nbsp;</td>
</tr>
<tr>
<td align="center" valign="top" style="width:20px;font-size:15px;">3</td>
<td align="left" valign="top" style="width:100px;font-size:15px;">&nbsp;PAN Number </td>
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;<?php echo strtoupper($resE['PanNo']); ?></td>
<td align="center" valign="top" style="width:200px;font-size:15px;" colspan="2">&nbsp;</td>
</tr>
<tr style="background-color:#0080FF;">
<td align="center" valign="top" style="width:20px;font-size:15px; background-color:#0080FF; color:#FFFFFF;"></td>
<td align="center" valign="top" style="width:100px;font-size:15px;color:#FFFFFF;"><b>Item</b></td>
<td align="center" valign="top" style="width:550px;font-size:15px;color:#FFFFFF;"><b>Particulars</b></td>
<td align="center" valign="top" style="width:90px;font-size:15px;color:#FFFFFF;"><b>Max. Limit</b></td>
<td align="center" valign="top" style="width:110px;font-size:15px;color:#FFFFFF;"><b>Declared_Amt</b></td>
</tr>

<?php /*
<input type="hidden" id="MaxNPS" name="MaxNPS" value="<?php echo $res['NPS_Limit']; ?>" readonly=""/>
<tr>
<td align="center" valign="top" style="width:20px;font-size:15px;"></td>
<td align="Center" valign="middle" style="width:100px;font-size:15px;">&nbsp;Sec. 80CCD(1B)</td>
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;NPS (National Pension Scheme)/ Atal Pension Yojna(APY)</td>
<td align="center" valign="top" style="width:90px;font-size:15px;"><?php if($res['NPS_Limit']>0){echo intval($res['NPS_Limit']);}else{ echo '&nbsp;'; } ?></td>
<td align="center" valign="top" style="width:110px;font-size:15px;">
<input type="hidden" id="NPS22" name="NPS22" class="textBox"  value="<?php if($resIvst['NPS']==''){echo 0;}else { echo $resIvst['NPS']; }?>" readonly maxlength="8"/></td>
</tr>
*/?>

<?php /********************************************/ ?>
<tr>
<td align="center" valign="top" style="width:20px;font-size:15px;">
<input type="hidden" id="MaxNPS" name="MaxNPS" value="<?php echo $res['NPS_Limit']; ?>" readonly=""/>
<input type="hidden" id="NPS22" name="NPS22" class="textBox"  value="<?php if($resIvst['NPS']==''){echo 0;}else { echo $resIvst['NPS']; }?>" readonly maxlength="8"/>

</td>
<td align="Center" valign="middle" style="width:100px;font-size:15px;">&nbsp;Sec. 80CCD(2)</td>
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;Corporate NPS Scheme</td>
<td align="center" valign="top" style="width:90px;font-size:15px;">10% Of Basic Salary</td>
<td align="center" valign="top" style="width:110px;font-size:15px;">
<input id="CorNPS22" name="CorNPS22" class="textBox"  value="<?php if($resIvst['CorNPS']==''){echo 0;}else { echo $resIvst['CorNPS']; }?>" readonly maxlength="8"/></td>
</tr>
<?php /********************************************/ ?>




<tr><td align="left" colspan="5" valign="top" style="width:850px;font-size:15px;">&nbsp;<b><u>Declaration:</u></b></td></tr>
<tr><td align="left" colspan="5" valign="top" style="width:850px;font-size:15px;">&nbsp;1) I hereby declare that the information given above is correct and true in all respects.</td></tr>
<tr><td align="left" colspan="5" valign="top" style="width:850px;font-size:15px;">&nbsp;2) I also undertake to indemnify the company for any loss/liability that may arise in the event of the above information being incorrect.</td></tr>
<tr>
<td align="left" valign="top" colspan="3" style="width:550px;font-size:15px;">&nbsp;</td>


<td align="center" valign="bottom" rowspan="2" colspan="2" style="width:200px;font-size:15px;">&nbsp;

</td>
</tr>
<?php $sqlEdit=mysql_query("select * from hrm_employee_investment_declaration where EmployeeID=".$EmployeeId." AND Period='".$PrdCurr."' AND Month=".$res['C_Month'], $con);
	  $rowEdit=mysql_num_rows($sqlEdit);  $resEdit=mysql_fetch_assoc($sqlEdit); ?>
<tr>
<td align="" colspan="2" valign="top" style="width:100px;font-size:15px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Date :</b> </td>
<td align="left" valign="top" style="width:550px;font-size:15px;">
<input id="Inv22_Date" name="Inv22_Date" class="textBox"  value="<?php if($rowEdit==0){echo '';}elseif($rowEdit>0){if($resEdit['Inv_Date']!='' AND $resEdit['Inv_Date']!='0000-00-00' AND $resEdit['Inv_Date']!='1970-01-01'){echo date("d-M-Y", strtotime($resEdit['Inv_Date'])); } }?>" readonly/>
<?php //if($resIvst['FormSubmit']!='YY'){ ?><button id="f_btn2" class="CalenderButton"></button> <?php //} ?>
		                       <script type="text/javascript">  var cal = Calendar.setup({ onSelect:  function(cal) { cal.hide()}, showTime: true }); 
                               cal.manageFields("f_btn2", "Inv22_Date", "%d-%m-%Y");</script></td>

</tr>
<tr>
<td align="" colspan="2" valign="top" style="width:100px;font-size:15px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Place : </b></td>
<td align="left" valign="top" style="width:550px;font-size:15px;">
<input id="Place22" name="Place22" style="width:200px;height:21px;background-color:#D6D6D6;" value="<?php echo $resIvst['Place']; ?>" readonly maxlength="50" /></td>
<td align="center" valign="middle" colspan="2" valign="top" style="width:200px;font-size:15px;"><b>Signature</b></td>
</tr>
<tr>

<td align="left" valign="top" colspan="5" style="width:550px;font-size:15px;">&nbsp;</td>
</tr>
   <td align="" class="fontButton" colspan="6"><table border="0" align="right" class="fontButton">

   <tr>
<td style="width:450px;color:#FFFFFF;font-weight:bold;font-family:Times New Roman; font-size:15px;"><span id="msgCTC">&nbsp;</span></td>
<td align="center"><input type="submit" name="Submit22InvstDec" id="Submit22InvstDec" style="width:90px; display:<?php if($rowEdit==0 OR $resEdit['FormSubmit']=='YY'){echo 'none';} ?>;" value="submit" disabled></td>

<td align="center"><input type="submit" name="Save22InvstDec" id="Save22InvstDec" style="width:90px; display:<?php if($rowEdit==0 OR $resEdit['FormSubmit']=='YY'){echo 'none';} ?>;" value="save" disabled></td>
	  
<?php $SD=mysql_query("select DateJoining from hrm_employee_general where EmployeeID=".$EmployeeId,$con); 
$RD=mysql_fetch_assoc($SD); $After31DayDoJ=date("Y-m-d",strtotime($RD['DateJoining'].'+31 day')); ?>	  
	  
<td align="center"><?php if($rowEdit==0 OR date("Y-m-d")<=$After31DayDoJ OR ($rowEdit>0 AND $resEdit['FormSubmit']=='Y')) { ?>
<input type="button" name="EditInvstDec" id="Edit22InvstDec" style="width:90px;" value="edit" onClick="Edit22()" <?php if(date("Y-m-d H:i:s")>$res['LastDateTime']){echo 'disabled';}?>><?php } ?></td>

<td align="center" style="width:90px;"><input type="button" name="Refresh" id="Refresh" style="width:90px;" value="Refresh" onClick="javascript:window.location='InvestDecl.php'" <?php if(date("Y-m-d H:i:s")>$res['LastDateTime']){echo 'disabled';}?> /></td>



   </tr>

</table>

	</td>
	</tr>
	</table>
	
<!-- 2222222222222222222222222222 --------------- 22222222222222222222 ----------------- Close ---->
<!-- 2222222222222222222222222222 --------------- 22222222222222222222 ----------------- Close ---->
<!-- 2222222222222222222222222222 --------------- 22222222222222222222 ----------------- Close ---->
</form>
</div>	
	 </td> 
		</tr>
		</table>
	  </td>
	 </tr>	
</table>

			
<?php //*************************************************************************************************************************************************** ?>
		   </td>
		    <td valign="top">
		    <table align="right" border="0" style="margin-top:0px; width:10%; height:380px;">
		    <tr><td align="center" valign="top" width="100">&nbsp;</td></tr>
	        </table>
		   </td>
		    <td valign="top">
		    <table align="right" border="0" style="margin-top:0px; width:10%; height:380px;"><tr><td align="center" valign="top">&nbsp;&nbsp;</td></tr></table>
		   </td>
		  </tr>
		</table>
	  </td>
	</tr>
	
	<tr><td valign="top" align="center">&nbsp;</td></tr>
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

