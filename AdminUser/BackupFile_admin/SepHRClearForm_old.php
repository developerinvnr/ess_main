<?php require_once('../AdminUser/config/config.php'); 
if(isset($_POST['saveHRNoc']))
{ 
  $search =  '!"#$%&/\'-:_' ; $search = str_split($search);
  $BEP_R=str_replace($search, "", $_POST['BEP_Remark']); $BPP_R=str_replace($search, "", $_POST['BPP_Remark']);
  $BExP_R=str_replace($search, "", $_POST['BExP_Remark']); $AdminIC_R=str_replace($search, "", $_POST['AdminIC_Remark']);
  $AdminVC_R=str_replace($search, "", $_POST['AdminVC_Remark']); $CV_R=str_replace($search, "", $_POST['CV_Remark']);
  $HrRemark=str_replace($search, "", $_POST['HrRemark']);
 
  $sqlNoc=mysql_query("select NocHRId from hrm_employee_separation_nochr where EmpSepId=".$_POST['si'], $con); $rowNoc=mysql_num_rows($sqlNoc); 
  if($rowNoc>0)
  { $sqlIns=mysql_query("update hrm_employee_separation_nochr set NocSubmitDate='".date("Y-m-d")."', BEP='".$_POST['BEP_YN']."', BEP_Amt='".$_POST['BEP_Amt']."', BEP_Remark='".$BEP_R."', BPP='".$_POST['BPP_YN']."', BPP_Amt='".$_POST['BPP_Amt']."', BPP_Remark='".$BPP_R."', BExP='".$_POST['BExP_YN']."', BExP_Amt='".$_POST['BExP_Amt']."', BExP_Remark='".$BExP_R."', AdminIC='".$_POST['AdminIC_YN']."', AdminIC_Amt='".$_POST['AdminIC_Amt']."', AdminIC_Remark='".$AdminIC_R."', AdminVC='".$_POST['AdminVC_YN']."', AdminVC_Amt='".$_POST['AdminVC_Amt']."', AdminVC_Remark='".$AdminVC_R."', CV='".$_POST['CV_YN']."', CV_Amt='".$_POST['CV_Amt']."', CV_Remark='".$CV_R."', WorkDay=".$_POST['WorkDay'].", NoticeDay=".$_POST['NoticeDay'].", TotWorkDay=".$_POST['TotWorkDay'].", ServedDay=".$_POST['ServedDay'].", RecoveryDay=".$_POST['RecoveryDay'].", TotEL=".$_POST['TotEL'].", EnCashEL=".$_POST['EnCashEL'].", Basic='".$_POST['Basic']."', HRA='".$_POST['HRA']."', CarAllow='".$_POST['Car']."', CA='".$_POST['CA']."', SA='".$_POST['SA']."', DA='".$_POST['DA']."', Arrear='".$_POST['Arrear']."', Incen='".$_POST['Incen']."', PP='".$_POST['PP']."', VA='".$_POST['VA']."', CCA='".$_POST['CCA']."', RA='".$_POST['RA']."', Gross='".$_POST['Gross']."', LTA='".$_POST['LTA']."', MA='".$_POST['MA']."', CEA='".$_POST['CEA']."', LE='".$_POST['LE']."', Bonus='".$_POST['Bonus']."', Gratuity='".$_POST['Gratuity']."', Mediclaim='".$_POST['Mediclaim']."', RTSB='".$_POST['RTSB']."', Exgredia='".$_POST['Exgredia']."', NoticePay='".$_POST['NoticePay']."', TotEar='".$_POST['TotEar']."', PF='".$_POST['PF']."', NPR='".$_POST['NPR']."', NPR_Actual='".$_POST['NPR_Actual']."', PAP='".$_POST['PAP']."', ESIC='".$_POST['ESIC']."', ARR_ESIC='".$_POST['ARRESIC']."', VolC='".$_POST['VolC']."', HrRemark='".$HrRemark."', TotDeduct='".$_POST['TotAmt']."' where EmpSepId=".$_POST['si'], $con);} 
  else
  { $sqlIns=mysql_query("insert into hrm_employee_separation_nochr(EmpSepId, NocSubmitDate, BEP, BEP_Amt, BEP_Remark, BPP, BPP_Amt, BPP_Remark, BExP, BExP_Amt, BExP_Remark, AdminIC, AdminIC_Amt, AdminIC_Remark, AdminVC, AdminVC_Amt, AdminVC_Remark, CV, CV_Amt, CV_Remark, WorkDay, NoticeDay, TotWorkDay, ServedDay, RecoveryDay, TotEL, EnCashEL, Basic, HRA, CarAllow, CA, SA, DA, Arrear, Incen, PP, VA, CCA, RA, Gross, LTA, MA, CEA, LE, Bonus, Gratuity, Mediclaim, RTSB, Exgredia, NoticePay, TotEar, PF, NPR, NPR_Actual, PAP, ESIC, ARR_ESIC, VolC, HrRemark, TotDeduct) values(".$_POST['si'].", '".date("Y-m-d")."', '".$_POST['BEP_YN']."', '".$_POST['BEP_Amt']."', '".$BEP_R."', '".$_POST['BPP_YN']."', '".$_POST['BPP_Amt']."', '".$BPP_R."', '".$_POST['BExP_YN']."', '".$_POST['BExP_Amt']."', '".$BExP_R."', '".$_POST['AdminIC_YN']."', '".$_POST['AdminIC_Amt']."', '".$AdminIC_R."', '".$_POST['AdminVC_YN']."', '".$_POST['AdminVC_Amt']."', '".$AdminVC_R."', '".$_POST['CV_YN']."', '".$_POST['CV_Amt']."', '".$CV_R."', ".$_POST['WorkDay'].", ".$_POST['NoticeDay'].", ".$_POST['TotWorkDay'].", ".$_POST['ServedDay'].", ".$_POST['RecoveryDay'].", ".$_POST['TotEL'].", ".$_POST['EnCashEL'].", '".$_POST['Basic']."', '".$_POST['HRA']."', '".$_POST['Car']."', '".$_POST['CA']."', '".$_POST['SA']."', '".$_POST['DA']."', '".$_POST['Arrear']."', '".$_POST['Incen']."', '".$_POST['PP']."', '".$_POST['VA']."', '".$_POST['CCA']."', '".$_POST['RA']."', '".$_POST['Gross']."', '".$_POST['LTA']."', '".$_POST['MA']."', '".$_POST['CEA']."', '".$_POST['LE']."', '".$_POST['Bonus']."', '".$_POST['Gratuity']."', '".$_POST['Mediclaim']."', '".$_POST['RTSB']."', '".$_POST['Exgredia']."', '".$_POST['NoticePay']."', '".$_POST['TotEar']."', '".$_POST['PF']."', '".$_POST['NPR']."', '".$_POST['NPR_Actual']."', '".$_POST['PAP']."', '".$_POST['ESIC']."', '".$_POST['ARRESIC']."', '".$_POST['VolC']."', '".$HrRemark."', '".$_POST['TotAmt']."')", $con); }
  
  if($sqlIns){$sqlUp=mysql_query("update hrm_employee_separation set HR_Earn='".$_POST['TotEar']."', HR_Deduct='".$_POST['TotAmt']."' where EmpSepId=".$_POST['si'], $con);}
  if($sqlUp){$msg='<b>data saved successfully.</b>';} 
}  

if(isset($_POST['submitHRNoc']))
{ 
   $search =  '!"#$%&/\'-:_' ; $search = str_split($search);
   $BEP_R=str_replace($search, "", $_POST['BEP_Remark']); $BPP_R=str_replace($search, "", $_POST['BPP_Remark']);
   $BExP_R=str_replace($search, "", $_POST['BExP_Remark']); $CV_R=str_replace($search, "", $_POST['CV_Remark']);
   $HrRemark=str_replace($search, "", $_POST['HrRemark']);
 
  $sqlNoc=mysql_query("select NocHRId from hrm_employee_separation_nochr where EmpSepId=".$_POST['si'], $con); $rowNoc=mysql_num_rows($sqlNoc); 
  if($rowNoc>0)
  { $sqlIns=mysql_query("update hrm_employee_separation_nochr set NocSubmitDate='".date("Y-m-d")."', BEP='".$_POST['BEP_YN']."', BEP_Amt='".$_POST['BEP_Amt']."', BEP_Remark='".$BEP_R."', BPP='".$_POST['BPP_YN']."', BPP_Amt='".$_POST['BPP_Amt']."', BPP_Remark='".$BPP_R."', BExP='".$_POST['BExP_YN']."', BExP_Amt='".$_POST['BExP_Amt']."', BExP_Remark='".$BExP_R."', AdminIC='".$_POST['AdminIC_YN']."', AdminIC_Amt='".$_POST['AdminIC_Amt']."', AdminIC_Remark='".$AdminIC_R."', AdminVC='".$_POST['AdminVC_YN']."', AdminVC_Amt='".$_POST['AdminVC_Amt']."', AdminVC_Remark='".$AdminVC_R."', CV='".$_POST['CV_YN']."', CV_Amt='".$_POST['CV_Amt']."', CV_Remark='".$CV_R."', WorkDay=".$_POST['WorkDay'].", NoticeDay=".$_POST['NoticeDay'].", TotWorkDay=".$_POST['TotWorkDay'].", ServedDay=".$_POST['ServedDay'].", RecoveryDay=".$_POST['RecoveryDay'].", TotEL=".$_POST['TotEL'].", EnCashEL=".$_POST['EnCashEL'].", Basic='".$_POST['Basic']."', HRA='".$_POST['HRA']."', CA='".$_POST['CA']."', SA='".$_POST['SA']."', DA='".$_POST['DA']."', Arrear='".$_POST['Arrear']."', Incen='".$_POST['Incen']."', PP='".$_POST['PP']."', VA='".$_POST['VA']."', CCA='".$_POST['CCA']."', RA='".$_POST['RA']."', Gross='".$_POST['Gross']."', LTA='".$_POST['LTA']."', MA='".$_POST['MA']."', CEA='".$_POST['CEA']."', LE='".$_POST['LE']."', Bonus='".$_POST['Bonus']."', Gratuity='".$_POST['Gratuity']."', Mediclaim='".$_POST['Mediclaim']."', RTSB='".$_POST['RTSB']."', Exgredia='".$_POST['Exgredia']."', NoticePay='".$_POST['NoticePay']."', TotEar='".$_POST['TotEar']."', PF='".$_POST['PF']."', NPR='".$_POST['NPR']."', NPR_Actual='".$_POST['NPR_Actual']."', ESIC='".$_POST['ESIC']."', ARR_ESIC='".$_POST['ARRESIC']."', VolC='".$_POST['VolC']."', HrRemark='".$HrRemark."', TotDeduct='".$_POST['TotAmt']."' where EmpSepId=".$_POST['si'], $con);} 
  else
  { $sqlIns=mysql_query("insert into hrm_employee_separation_nochr(EmpSepId, NocSubmitDate, BEP, BEP_Amt, BEP_Remark, BPP, BPP_Amt, BPP_Remark, BExP, BExP_Amt, BExP_Remark, AdminIC, AdminIC_Amt, AdminIC_Remark, AdminVC, AdminVC_Amt, AdminVC_Remark, CV, CV_Amt, CV_Remark, WorkDay, NoticeDay, TotWorkDay, ServedDay, RecoveryDay, TotEL, EnCashEL, Basic, HRA, CA, SA, DA, Arrear, Incen, PP, VA, CCA, RA, Gross, LTA, MA, CEA, LE, Bonus, Gratuity, Mediclaim, RTSB, Exgredia, NoticePay, TotEar, PF, NPR, NPR_Actual, ESIC, ARR_ESIC, VolC, HrRemark, TotDeduct) values(".$_POST['si'].", '".date("Y-m-d")."', '".$_POST['BEP_YN']."', '".$_POST['BEP_Amt']."', '".$BEP_R."', '".$_POST['BPP_YN']."', '".$_POST['BPP_Amt']."', '".$BPP_R."', '".$_POST['BExP_YN']."', '".$_POST['BExP_Amt']."', '".$BExP_R."', '".$_POST['AdminIC_YN']."', '".$_POST['AdminIC_Amt']."', '".$AdminIC_R."', '".$_POST['AdminVC_YN']."', '".$_POST['AdminVC_Amt']."', '".$AdminVC_R."', '".$_POST['CV_YN']."', '".$_POST['CV_Amt']."', '".$CV_R."', ".$_POST['WorkDay'].", ".$_POST['NoticeDay'].", ".$_POST['TotWorkDay'].", ".$_POST['ServedDay'].", ".$_POST['RecoveryDay'].", ".$_POST['TotEL'].", ".$_POST['EnCashEL'].", '".$_POST['Basic']."', '".$_POST['HRA']."', '".$_POST['CA']."', '".$_POST['SA']."', '".$_POST['DA']."', '".$_POST['Arrear']."', '".$_POST['Incen']."', '".$_POST['PP']."', '".$_POST['VA']."', '".$_POST['CCA']."', '".$_POST['RA']."', '".$_POST['Gross']."', '".$_POST['LTA']."', '".$_POST['MA']."', '".$_POST['CEA']."', '".$_POST['LE']."', '".$_POST['Bonus']."', '".$_POST['Gratuity']."', '".$_POST['Mediclaim']."', '".$_POST['RTSB']."', '".$_POST['Exgredia']."', '".$_POST['NoticePay']."', '".$_POST['TotEar']."', '".$_POST['PF']."', '".$_POST['NPR']."', '".$_POST['NPR_Actual']."', '".$_POST['ESIC']."', '".$_POST['ARRESIC']."', '".$_POST['VolC']."', '".$HrRemark."', '".$_POST['TotAmt']."')", $con); }
  
  if($sqlIns){$sqlUp=mysql_query("update hrm_employee_separation set HR_NOC='Y', Acc_HrNOC='N', HR_Earn='".$_POST['TotEar']."', HR_Deduct='".$_POST['TotAmt']."' where EmpSepId=".$_POST['si'], $con);}
  if($sqlUp)
  {
    $sqlNoc=mysql_query("select EmployeeID from hrm_employee_separation_nocdept_emp where DepartmentId=8 AND Status='A'", $con); $rowNoc=mysql_num_rows($sqlNoc); 
/******** 8-Finance ************/
  if($rowNoc>0)
  { $resNoc=mysql_fetch_assoc($sqlNoc);
    $sqlE=mysql_query("select EmailId_Vnr from hrm_employee_general where EmployeeID=".$resNoc['EmployeeID'], $con); $resE=mysql_fetch_assoc($sqlE); 
    if($resE['EmailId_Vnr']!='')
    {
     $email_to = $resE['EmailId_Vnr'];
     $email_from = 'admin@vnrseeds.co.in';
     $email_subject = "NOC clearance by HR";
     $email_txt = "NOC clearance by HR";
     $headers = "From: ".$email_from."\r\n"; 
     $semi_rand = md5(time()); 
     $headers .= "MIME-Version: 1.0\r\n";
     $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
     $email_message3 .="HR has submitted the HR clearance form of ".$_POST['Ename']." for further action. Log on to ESS for further details <a href='https://www.vnrseeds.co.in'>www.vnrseeds.co.in</a>. \n\n";
	 $email_message3 .="Thanks & Regards\n";
     $email_message3 .="HR\n\n";
    $ok = @mail($email_to, $email_subject, $email_message, $headers);
    }     
  }	  
  
/************* 8-Finance ***************/
$sqlCheck=mysql_query("select * from hrm_employee_separation where HR_RepMgrNocConf='Y' AND HR_ItNocConf='Y' AND HR_NOC='Y' AND EmpSepId=".$_POST['si'], $con); 
$rowCheck=mysql_num_rows($sqlCheck);
$sqlNoc=mysql_query("select EmployeeID from hrm_employee_separation_nocdept_emp where DepartmentId=8 AND Status='A'", $con); $rowNoc=mysql_num_rows($sqlNoc);
if($rowCheck>0 AND $rowNoc>0)
{
    $resNoc=mysql_fetch_assoc($sqlNoc); 
    $sqlE=mysql_query("select EmailId_Vnr from hrm_employee_general where EmployeeID=".$resNoc['EmployeeID'], $con); $resE=mysql_fetch_assoc($sqlE); 
    if($resE['EmailId_Vnr']!='')
    {
     $email_to2 = $resE['EmailId_Vnr'];
     $email_from = 'admin@vnrseeds.co.in';
     $email_subject2 = "NOC clearance by all department";
     $email_txt = "NOC clearance by all department";
     $headers = "From: ".$email_from."\r\n"; 
     $semi_rand = md5(time()); 
     $headers .= "MIME-Version: 1.0\r\n";
     $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
     $email_message2 .="All departments have provided NOC for ".$_POST['Ename'].". Kindly process further and provide the final accounts statement. Log on to ESS for further details <a href='https://www.vnrseeds.co.in'>www.vnrseeds.co.in</a>. \n\n";
	 $email_message2 .="Thanks & Regards\n";
     $email_message2 .="HR\n\n";
     $ok = @mail($email_to2, $email_subject2, $email_message2, $headers);
    }     
} 
  
  
/********************************/  
   //$sqlHod=mysql_query("select Fname,Sname,Lname,EmailId_Vnr from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee_general.EmployeeID=".$_POST['HodId'], $con); $resHod=mysql_fetch_assoc($sqlHod); $Hname=$resHod['Fname'].' '.$resHod['Sname'].' '.$resHod['Lname'];
	/************************************************ HOD ***********************************************/ 
/*	  
     if($resHod['EmailId_Vnr']!='')
     {
	 $email_to6 = $resHod['EmailId_Vnr'];
	 $email_from = 'admin@vnrseeds.co.in';
	 $email_subject6 = "HR NOC clearance submitted";
	 $email_txt = "HR NOC clearance submitted";
	 $headers = "From: ".$email_from."\r\n";
	 $semi_rand = md5(time()); 
	 $headers .= "MIME-Version: 1.0\r\n";
	 $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n"; 
	 $email_message6 .= "<b>".$_POST['Ename']."</b> HR clearance submitted by HR department. \n\n";
	 $email_message6 .="Thanks & Regards\n";
     $email_message6 .="HR\n\n";

	 //$ok = @mail($email_to6, $email_subject6, $email_message6, $headers);
	 } 
*/


   $msg='<b>data submitted successfully.</b>';
  }
}  
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<title>Action for Resignation</title>
<link rel="stylesheet" type="text/css" href="src/css/jscal2.css"/>
<link rel="stylesheet" type="text/css" href="src/css/border-radius.css"/>
<link rel="stylesheet" type="text/css" href="src/css/steel/steel.css"/>
<script type="text/javascript" src="src/js/jscal2.js"></script>
<script type="text/javascript" src="src/js/lang/en.js"></script>
<style> .Text {font-family:Geneva, Arial, Helvetica, sans-serif;font-size:13px;} .DIT{width:50px;background-color:#E4E4E4;text-align:center; height:14px;}
.Text2 {font-family:Geneva, Arial, Helvetica, sans-serif;font-size:15px;} .AIT{width:80px;background-color:#E4E4E4;text-align:right; height:14px;}
.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}
.fontButton {background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;}</style>
<script language="javascript" type="text/javascript">
function edit(n)
{ 
 var HrRowNOC=document.getElementById("HrRowNOC").value;
 document.getElementById("EditHRNoc").style.display='none'; document.getElementById("saveHRNoc").style.display='block';
 if(n>0){document.getElementById("submitHRNoc").style.display='block';}
 document.getElementById("BEP_Y").disabled=false; document.getElementById("BEP_N").disabled=false; document.getElementById("BEP_Remark").readOnly=false;
  document.getElementById("BEP_A").disabled=false; document.getElementById("BEP_Remark").style.background='#FFFFFF'; document.getElementById("BPP_Y").disabled=false; document.getElementById("BPP_N").disabled=false; document.getElementById("BPP_A").disabled=false; document.getElementById("BPP_Remark").readOnly=false; document.getElementById("BPP_Remark").style.background='#FFFFFF'; document.getElementById("BExP_Y").disabled=false; document.getElementById("BExP_A").disabled=false; document.getElementById("BExP_N").disabled=false; document.getElementById("BExP_Remark").readOnly=false; document.getElementById("BExP_Remark").style.background='#FFFFFF'; document.getElementById("AdminIC_Y").disabled=false; document.getElementById("AdminIC_N").disabled=false; document.getElementById("AdminIC_Remark").readOnly=false; document.getElementById("AdminIC_A").disabled=false; document.getElementById("AdminIC_Remark").style.background='#FFFFFF'; document.getElementById("AdminVC_Y").disabled=false; document.getElementById("AdminVC_N").disabled=false; document.getElementById("AdminVC_A").disabled=false; document.getElementById("AdminVC_Remark").readOnly=false; document.getElementById("AdminVC_Remark").style.background='#FFFFFF'; document.getElementById("CV_Y").disabled=false; document.getElementById("CV_N").disabled=false; document.getElementById("CV_Remark").readOnly=false; document.getElementById("CV_A").disabled=false;
 document.getElementById("CV_Remark").style.background='#FFFFFF'; document.getElementById("WorkDay").readOnly=false; document.getElementById("WorkDay").style.background='#FFFFFF'; 
document.getElementById("ServedDay").readOnly=false; document.getElementById("ServedDay").style.background='#FFFFFF'; 
document.getElementById("RecoveryDay").readOnly=false; document.getElementById("RecoveryDay").style.background='#FFFFFF';
document.getElementById("TotEL").readOnly=false; 
 document.getElementById("TotEL").style.background='#FFFFFF'; document.getElementById("EnCashEL").readOnly=false; document.getElementById("EnCashEL").style.background='#FFFFFF';
 document.getElementById("DA").readOnly=false; document.getElementById("DA").style.background='#FFFFFF'; document.getElementById("Arrear").readOnly=false; 
 document.getElementById("Arrear").style.background='#FFFFFF'; document.getElementById("Incen").readOnly=false; document.getElementById("Incen").style.background='#FFFFFF';
 document.getElementById("Bonus").readOnly=false; document.getElementById("Bonus").style.background='#FFFFFF'; document.getElementById("Gratuity").readOnly=false; 
 document.getElementById("Gratuity").style.background='#FFFFFF'; document.getElementById("RTSB").readOnly=false; document.getElementById("RTSB").style.background='#FFFFFF';
 document.getElementById("NoticePay").readOnly=false; document.getElementById("NoticePay").style.background='#FFFFFF';
 document.getElementById("Exgredia").readOnly=false; document.getElementById("Exgredia").style.background='#FFFFFF';
 document.getElementById("HrRemark").disabled=false; document.getElementById("HrRemark").style.background='#FFFFFF';
 document.getElementById("LE").readOnly=false; document.getElementById("LE").style.background='#FFFFFF'; 
 document.getElementById("NoticeDay").readOnly=false; document.getElementById("NoticeDay").style.background='#FFFFFF';
 document.getElementById("PF").readOnly=false; document.getElementById("PF").style.background='#FFFFFF'; 
 document.getElementById("NPR").readOnly=false; document.getElementById("NPR").style.background='#FFFFFF'; document.getElementById("NPR_Actual").readOnly=false; document.getElementById("NPR_Actual").style.background='#FFFFFF';

 document.getElementById("LTA").readOnly=false; document.getElementById("LTA").style.background='#FFFFFF'; 
 document.getElementById("MA").readOnly=false; document.getElementById("MA").style.background='#FFFFFF'; 
 document.getElementById("CEA").readOnly=false; document.getElementById("CEA").style.background='#FFFFFF';
 document.getElementById("TotEar").readOnly=false; document.getElementById("TotEar").style.background='#FFFFFF'; 
 document.getElementById("Mediclaim").readOnly=false; document.getElementById("Mediclaim").style.background='#FFFFFF';
 document.getElementById("PP").readOnly=false; document.getElementById("PP").style.background='#FFFFFF';
 document.getElementById("PAP").readOnly=false; document.getElementById("PAP").style.background='#FFFFFF';
 document.getElementById("VA").readOnly=false; document.getElementById("VA").style.background='#FFFFFF';
 document.getElementById("CCA").readOnly=false; document.getElementById("CCA").style.background='#FFFFFF';
 document.getElementById("RA").readOnly=false; document.getElementById("RA").style.background='#FFFFFF';
 
 document.getElementById("ESIC").readOnly=false; document.getElementById("ESIC").style.background='#FFFFFF';
 document.getElementById("ARRESIC").readOnly=false; document.getElementById("ARRESIC").style.background='#FFFFFF';
 document.getElementById("VolC").readOnly=false; document.getElementById("VolC").style.background='#FFFFFF';
 document.getElementById("Basic").readOnly=false; document.getElementById("HRA").readOnly=false;
 document.getElementById("Car").readOnly=false;
 document.getElementById("CA").readOnly=false; document.getElementById("SA").readOnly=false; 
 
 
 if(document.getElementById("Gross").value==0)
 {
   
 var SNoticeDay=parseFloat(document.getElementById("SNoticeDay").value); 
 var NoticeDay=parseFloat(document.getElementById("NoticeDay").value);
 

 document.getElementById("RecoveryDay").value=Math.round((NoticeDay-SNoticeDay)*100)/100; 
 if(HrRowNOC==0){document.getElementById("ServedDay").value=SNoticeDay;}
 
 
 var BalEL=parseFloat(document.getElementById("BalEL").value); document.getElementById("TotEL").value=BalEL; document.getElementById("EnCashEL").value=BalEL;
 var WorkDay=parseFloat(document.getElementById("WorkDay").value); var ServedDay=document.getElementById("ServedDay").value;
 document.getElementById("TotWorkDay").value=Math.round((WorkDay+ServedDay)*100)/100;
 
//Open Calculation  if(HrRowNOC==0)
 var WorkDay = parseFloat(document.getElementById("WorkDay").value); var NoticeDay = parseFloat(document.getElementById("NoticeDay").value);
 var ServedDay = parseFloat(document.getElementById("ServedDay").value); var RecoveryDay = parseFloat(document.getElementById("RecoveryDay").value);
 var TotWorkDay = parseFloat(document.getElementById("TotWorkDay").value); 
 var RDay = document.getElementById("RecoveryDay").value=Math.round((NoticeDay-ServedDay)*100)/100; 
 var TWDay = document.getElementById("TotWorkDay").value=Math.round((WorkDay+ServedDay)*100)/100;  
 var Basic_R = parseFloat(document.getElementById("BasicRate").value); var HRA_R = parseFloat(document.getElementById("HRARate").value);
 var CA_R = parseFloat(document.getElementById("CARate").value); var SA_R = parseFloat(document.getElementById("SARate").value);
 var DA = parseFloat(document.getElementById("DA").value); var Arrear = parseFloat(document.getElementById("Arrear").value); 
 var Incen = parseFloat(document.getElementById("Incen").value); var PP = parseFloat(document.getElementById("PP").value);
 var LTA_R = parseFloat(document.getElementById("LTA_R").value); 
 var MA_R = parseFloat(document.getElementById("MA_R").value); var CEA_R = parseFloat(document.getElementById("CEA_R").value); 
 var LTA = parseFloat(document.getElementById("LTA").value); var MA = parseFloat(document.getElementById("MA").value); var CEA = parseFloat(document.getElementById("CEA").value);
 var CEA_Value = parseFloat(document.getElementById("CHILD_EDU_ALL_Value").value); var MA_Value = parseFloat(document.getElementById("MED_REM_Value").value); 
 var LTA_Value = parseFloat(document.getElementById("LTA_Value").value); var CEA_PerChildMonth = parseFloat(document.getElementById("CEA_PerChildMonth").value); 
 var MR_PerMonth = parseFloat(document.getElementById("MR_PerMonth").value); var Pf_MaxSalPf = parseFloat(document.getElementById("Pf_MaxSalPf").value); 
 var VA = parseFloat(document.getElementById("VA").value);
 var CCA = parseFloat(document.getElementById("CCA").value); var RA = parseFloat(document.getElementById("RA").value);
 


 var MonthWD=26; 
 var TotWorkDay = parseFloat(document.getElementById("TotWorkDay").value);
 
 var Car=parseFloat(document.getElementById("Car").value);
 var CarRate=parseFloat(document.getElementById("CarRate").value);
 document.getElementById("Car").value=document.getElementById("CarRate").value;
 var CarAmt=parseFloat(document.getElementById("Car").value);
 
 
 if(Basic_R>0){var OneDay_Basic = Basic_R/MonthWD; var Basic = document.getElementById("Basic").value=Math.round(OneDay_Basic*TotWorkDay);}
 else{var Basic = document.getElementById("Basic").value=0;}
 if(HRA_R>0){var OneDay_Hra=HRA_R/MonthWD; var HRA = document.getElementById("HRA").value=Math.round(OneDay_Hra*TotWorkDay); }
 else{var HRA = document.getElementById("HRA").value=0;}
 
 if(CA_R>0){var OneDay_Con=CA_R/MonthWD; var CA = document.getElementById("CA").value=Math.round(OneDay_Con*TotWorkDay); }
 else{var CA = document.getElementById("CA").value=0;}
 if(SA_R>0){var OneDay_Spe=SA_R/MonthWD; var SA = document.getElementById("SA").value=Math.round(OneDay_Spe*TotWorkDay); }
 else{var SA = document.getElementById("SA").value=0;}
 var Gross = document.getElementById("Gross").value=Math.round(Basic+HRA+CA+SA+DA+Arrear+Incen+PP+VA+CCA+RA+CarAmt);
 
 var GrossEsic = Math.round(Basic+HRA+CA+SA);
 if(GrossEsic>0)
 {
   var EmpESIC=parseFloat(document.getElementById("EmpESIC").value); 
   if(EmpESIC>0)
   {
     var ESIC = document.getElementById("ESIC").value=Math.round((((GrossEsic*1.75)/100)*100)/100,0); 
   }
 }
 

if(HrRowNOC==0)
{ 
 if(CEA_R>0){var OneDay_CEA = CEA_R/MonthWD; var CEA_V = document.getElementById("CEA").value=Math.round(OneDay_CEA*TotWorkDay);}
 else{var CEA_V = document.getElementById("CEA").value=0;}
 if(MA_R>0){var OneDay_MA=MA_R/MonthWD; var MA_V = document.getElementById("MA").value=Math.round(OneDay_MA*TotWorkDay); }
 else{var MA_V = document.getElementById("MA").value=0;}
 if(LTA_R>0){var OneDay_LTA=LTA_R/MonthWD; var LTA_V = document.getElementById("LTA").value=Math.round(OneDay_LTA*TotWorkDay); }
 else{var LTA_V = document.getElementById("LTA").value=0;} 
} 

 var EnCashEL = parseFloat(document.getElementById("EnCashEL").value); 
 if(EnCashEL>0)
 { var MonthWD=26; var Basic_R = parseFloat(document.getElementById("BasicRate").value); var LE = parseFloat(document.getElementById("LE").value); 
   if(Basic_R>0){var OneDay_Basic = Basic_R/MonthWD; var LE_V = document.getElementById("LE").value=Math.round(OneDay_Basic*EnCashEL);}
   else{var LE_V = document.getElementById("LE").value=0;}
 }
 
 
 
if(HrRowNOC==0)
{
 var VNRExp = parseFloat(document.getElementById("VNRExp").value); 
 
 if(VNRExp>=5)
 {  
   var VNRExpMonth = parseFloat(document.getElementById("VNRExpMonth").value);
   var MaxGratuity = parseFloat(document.getElementById("Lumpsum_MaxGratuity").value); var GratuityDay = parseFloat(document.getElementById("Lumpsum_GratuityDay").value); 
   var YearOfGratuity=Math.round(OneDay_Basic*GratuityDay); 
   
   //if(YearOfGratuity>MaxGratuity){var GratuityValue=MaxGratuity;}else{var GratuityValue=YearOfGratuity;} 
   //var MonthOfGratuityValue=Math.round(GratuityValue/12); 
   //var TotGratuity = document.getElementById("Gratuity").value=Math.round(MonthOfGratuityValue*VNRExpMonth);
   
   var VNRExpYear = parseFloat(document.getElementById("VNRExpYear").value);
   if(VNRExpMonth>=6){ var VnrExpMain=VNRExpYear+1; }
   else{ var VnrExpMain=VNRExpYear; }
   var GratuityValue=YearOfGratuity;
   var TotGratuity = document.getElementById("Gratuity").value=Math.round(GratuityValue*VnrExpMain);
   
   
    
 }
 else { var TotGratuity = document.getElementById("Gratuity").value=0; }
}

 
 //if(CEA_Value>0)
 //{ if(CEA_Value==1200){var CEA_V=document.getElementById("CEA").value=CEA_PerChildMonth;}
 //  if(CEA_Value==2400){var CEA_V=document.getElementById("CEA").value=CEA_PerChildMonth*2;} 
 //}else{var CEA_V=document.getElementById("CEA").value==0;}
 //if(MA_Value>0){var MA_V = document.getElementById("MA").value=MR_PerMonth;}else{var MA_V = document.getElementById("MA").value=0;}  
 //if(LTA_Value>0){var LTA_V = document.getElementById("LTA").value=Math.round(LTA_Value/12);}else{var LTA = document.getElementById("LTA").value=0;}  
 
 var LE = parseFloat(document.getElementById("LE").value); var Bonus = parseFloat(document.getElementById("Bonus").value); 
 var Gratuity = parseFloat(document.getElementById("Gratuity").value); 
 var Mediclaim = parseFloat(document.getElementById("Mediclaim").value);
 var RTSB = parseFloat(document.getElementById("RTSB").value);
if(HrRowNOC==0){ var TotEar = document.getElementById("TotEar").value=Math.round(Gross+CEA_V+MA_V+LTA_V+LE+Bonus+Gratuity+Mediclaim+RTSB); }
 
 var TotWorkDay = parseFloat(document.getElementById("TotWorkDay").value);

var pf1 = document.getElementById("CalPf1").value;
var pf2 = document.getElementById("CalPf2").value;
var pf3 = document.getElementById("CalPf3").value;
var SA = parseFloat(document.getElementById("SA").value);
var Basic = parseFloat(document.getElementById("Basic").value);
var Basic_R = parseFloat(document.getElementById("BasicRate").value); 
var SA_R = parseFloat(document.getElementById("SARate").value);
var Pf_MaxSalPf = parseFloat(document.getElementById("Pf_MaxSalPf").value); 

if(HrRowNOC==0)
{ 
/**********************************************/
/**********************************************/

if(pf1=='Y' || pf2=='Y'){ var PF = document.getElementById("PF").value=Math.round((Basic*12)/100); } 
else if(pf3=='Y' && Basic_R<=Pf_MaxSalPf)
{ 
  
  if(TotWorkDay<=MonthWD)
  { 
   var PFBas=Math.round(Basic+SA); 
   if(PFBas<=Pf_MaxSalPf){ var PF = document.getElementById("PF").value=Math.round((PFBas*12)/100); }
   else{ var PF = document.getElementById("PF").value=Math.round((Pf_MaxSalPf*12)/100); }
  }
  else if(TotWorkDay>MonthWD)
  {
   var PFBas=Math.round(Basic_R+SA_R);
   if(PFBas<=Pf_MaxSalPf){ var Pf1=Math.round((PFBas*12)/100); }
   else{ var Pf1=Math.round((Pf_MaxSalPf*12)/100); }
   
   var ExtBas=Math.round(Basic-Basic_R);  var ExtSpl=Math.round(SA-SA_R); 
   var PFBas2=Math.round(ExtBas+ExtSpl);
   if(PFBas2<=Pf_MaxSalPf){ var Pf2=Math.round((PFBas2*12)/100); }
   else{ var Pf2=Math.round((Pf_MaxSalPf*12)/100); }
   
   var PF = document.getElementById("PF").value=Math.round(Pf1+Pf2);
  }
  
  
}
else
{
  if(Basic_R<=Pf_MaxSalPf){ var PF = document.getElementById("PF").value=Math.round((Basic*12)/100); }
  else if(Basic_R>Pf_MaxSalPf)
  { 
   if(TotWorkDay<=MonthWD){var PF = document.getElementById("PF").value=Math.round((Pf_MaxSalPf*12)/100);}
   else if(TotWorkDay>MonthWD)
   { var ExtBas=Math.round(Basic-Basic_R); 
     var Pf1=Math.round((Pf_MaxSalPf*12)/100);
	 if(ExtBas<=Pf_MaxSalPf){var Pf2=Math.round((ExtBas*12)/100);}else{var Pf2=Math.round((Pf_MaxSalPf*12)/100);}
	 var PF = document.getElementById("PF").value=Math.round(Pf1+Pf2);
   }
  }
}

/**********************************************/
/**********************************************/ 
} //if(HrRowNOC==0)


/*if(HrRowNOC==0)
{ 
 
 if(Basic_R<=Pf_MaxSalPf){var PF = document.getElementById("PF").value=Math.round((Basic*12)/100);}
 if(Basic_R>Pf_MaxSalPf)
 { 
  if(TotWorkDay<=MonthWD){var PF = document.getElementById("PF").value=Math.round((Pf_MaxSalPf*12)/100);}
  else if(TotWorkDay>MonthWD)
  { var ExtBas=Math.round(Basic-Basic_R); 
    var Pf1=Math.round((Pf_MaxSalPf*12)/100);
	if(ExtBas<=Pf_MaxSalPf){var Pf2=Math.round((ExtBas*12)/100);}else{var Pf2=Math.round((Pf_MaxSalPf*12)/100);}
	var PF = document.getElementById("PF").value=Math.round(Pf1+Pf2);
  }
 }
 
} */
 
 var RecoveryDay = parseFloat(document.getElementById("RecoveryDay").value); var GrossRate = parseFloat(document.getElementById("GrossRate").value);
if(HrRowNOC==0)
{ 
 if(RecoveryDay>0)
 {
  //if(GrossRate>0){var OneDay_Gross = GrossRate/MonthWD; var Gross_R = document.getElementById("NPR").value=Math.round(OneDay_Gross*RecoveryDay);}
  //else{var Gross_R = document.getElementById("NPR").value=0;}
  if(Basic_R>0){var Basic_R = Math.round(OneDay_Basic*RecoveryDay);}else{var BasicR=0;}
  if(HRA_R>0){var HRA_R = Math.round(OneDay_Hra*RecoveryDay);}else{var HRA_R=0;}
  if(CA_R>0){var CA_R = Math.round(OneDay_Con*RecoveryDay);}else{var CA_R=0;}
  if(SA_R>0){var SA_R = Math.round(OneDay_Spe*RecoveryDay);}else{var SA_R=0;}
  var Gross_R = document.getElementById("NPR").value=Math.round(Basic_R+HRA_R+CA_R+SA_R); 
  var Gross_RA = document.getElementById("NPR_Actual").value=Math.round(Basic_R+HRA_R+CA_R+SA_R);
 }
 else{var Gross_R = document.getElementById("NPR").value=0;}
} 
//Close Calculation 
 
 
 //document.getElementById("Basic").readOnly=false; document.getElementById("Basic").style.background='#FFFFFF';
 //document.getElementById("HRA").readOnly=false; document.getElementById("HRA").style.background='#FFFFFF';
 //document.getElementById("CA").readOnly=false; document.getElementById("CA").style.background='#FFFFFF';
 //document.getElementById("SA").readOnly=false; document.getElementById("SA").style.background='#FFFFFF';
 //document.getElementById("LTA").readOnly=false; document.getElementById("LTA").style.background='#FFFFFF';
 //document.getElementById("MA").readOnly=false; document.getElementById("MA").style.background='#FFFFFF';
 //document.getElementById("CEA").readOnly=false; document.getElementById("CEA").style.background='#FFFFFF';
 //document.getElementById("LE").readOnly=false; document.getElementById("LE").style.background='#FFFFFF';

 } //if(document.getElementById("Gross").value==0)

}


function FunCar()
{
 var Car=parseFloat(document.getElementById("Car").value);
 var Gross = parseFloat(document.getElementById("Gross").value);
 var TotEar = parseFloat(document.getElementById("TotEar").value);
 if(Car>=0 && Gross>=0)
 { 
  document.getElementById("Gross").value=Math.round((Car+Gross)*100)/100;
  document.getElementById("TotEar").value=Math.round((Car+TotEar)*100)/100; 
 }

}


function FunBEP(v)
{ if(v=='Y'){document.getElementById("BEP_Y").checked=true;document.getElementById("BEP_N").checked=false;document.getElementById("BEP_YN").value='Y';
  document.getElementById("BEP_Amt").readOnly=true; document.getElementById("BEP_Amt").style.background='#EAEAEA'; document.getElementById("BEP_A").checked=false;
  document.getElementById("BEP_Amt").value='';}
  else if(v=='N'){document.getElementById("BEP_Y").checked=false; document.getElementById("BEP_N").checked=true;document.getElementById("BEP_YN").value='N';
  document.getElementById("BEP_Amt").readOnly=false; document.getElementById("BEP_Amt").style.background='#FFFFFF'; document.getElementById("BEP_A").checked=false;}
  else if(v=='A'){document.getElementById("BEP_Y").checked=false; document.getElementById("BEP_N").checked=false;document.getElementById("BEP_YN").value='A';
  document.getElementById("BEP_Amt").readOnly=true; document.getElementById("BEP_Amt").style.background='#EAEAEA'; document.getElementById("BEP_A").checked=true;}

}
function FunBPP(v)
{ if(v=='Y'){document.getElementById("BPP_Y").checked=true;document.getElementById("BPP_N").checked=false;document.getElementById("BPP_YN").value='Y';
  document.getElementById("BPP_Amt").readOnly=true; document.getElementById("BPP_Amt").style.background='#EAEAEA'; document.getElementById("BPP_A").checked=false;
  document.getElementById("BPP_Amt").value='';}
  else if(v=='N'){document.getElementById("BPP_Y").checked=false; document.getElementById("BPP_N").checked=true;document.getElementById("BPP_YN").value='N';
  document.getElementById("BPP_Amt").readOnly=false; document.getElementById("BPP_Amt").style.background='#FFFFFF'; document.getElementById("BPP_A").checked=false;}
  else if(v=='A'){document.getElementById("BPP_Y").checked=false; document.getElementById("BPP_N").checked=false;document.getElementById("BPP_YN").value='A';
  document.getElementById("BPP_Amt").readOnly=true; document.getElementById("BPP_Amt").style.background='#EAEAEA'; document.getElementById("BPP_A").checked=true;}

}
function FunBExP(v)
{ if(v=='Y'){document.getElementById("BExP_Y").checked=true;document.getElementById("BExP_N").checked=false;document.getElementById("BExP_YN").value='Y';
  document.getElementById("BExP_Amt").readOnly=true; document.getElementById("BExP_Amt").style.background='#EAEAEA'; document.getElementById("BExP_A").checked=false;
  document.getElementById("BExP_Amt").value='';}
  else if(v=='N'){document.getElementById("BExP_Y").checked=false; document.getElementById("BExP_N").checked=true;document.getElementById("BExP_YN").value='N';
  document.getElementById("BExP_Amt").readOnly=false; document.getElementById("BExP_Amt").style.background='#FFFFFF'; document.getElementById("BExP_A").checked=false;}
  else if(v=='A'){document.getElementById("BExP_Y").checked=false; document.getElementById("BExP_N").checked=false;document.getElementById("BExP_YN").value='A';
  document.getElementById("BExP_Amt").readOnly=true; document.getElementById("BExP_Amt").style.background='#EAEAEA'; document.getElementById("BExP_A").checked=true;}
}
function FunIC(v)
{ if(v=='Y'){document.getElementById("AdminIC_Y").checked=true;document.getElementById("AdminIC_N").checked=false;document.getElementById("AdminIC_YN").value='Y';
  document.getElementById("AdminIC_Amt").readOnly=true; document.getElementById("AdminIC_Amt").style.background='#EAEAEA'; document.getElementById("AdminIC_A").checked=false;
  document.getElementById("AdminIC_Amt").value='';}
  else if(v=='N'){document.getElementById("AdminIC_Y").checked=false; document.getElementById("AdminIC_N").checked=true;document.getElementById("AdminIC_YN").value='N';
  document.getElementById("AdminIC_Amt").readOnly=false; document.getElementById("AdminIC_Amt").style.background='#FFFFFF'; document.getElementById("AdminIC_A").checked=false;}
  else if(v=='A'){document.getElementById("AdminIC_Y").checked=false; document.getElementById("AdminIC_N").checked=false;document.getElementById("AdminIC_YN").value='A';
  document.getElementById("AdminIC_Amt").readOnly=true; document.getElementById("AdminIC_Amt").style.background='#EAEAEA'; document.getElementById("AdminIC_A").checked=true;}
}
function FunVC(v)
{ if(v=='Y'){document.getElementById("AdminVC_Y").checked=true;document.getElementById("AdminVC_N").checked=false;document.getElementById("AdminVC_YN").value='Y';
  document.getElementById("AdminVC_Amt").readOnly=true; document.getElementById("AdminVC_Amt").style.background='#EAEAEA'; document.getElementById("AdminVC_A").checked=false;
  document.getElementById("AdminVC_Amt").value='';}
  else if(v=='N'){document.getElementById("AdminVC_Y").checked=false; document.getElementById("AdminVC_N").checked=true;document.getElementById("AdminVC_YN").value='N';
  document.getElementById("AdminVC_Amt").readOnly=false; document.getElementById("AdminVC_Amt").style.background='#FFFFFF'; document.getElementById("AdminVC_A").checked=false;}
  else if(v=='A'){document.getElementById("AdminVC_Y").checked=false; document.getElementById("AdminVC_N").checked=false;document.getElementById("AdminVC_YN").value='A';
  document.getElementById("AdminVC_Amt").readOnly=true; document.getElementById("AdminVC_Amt").style.background='#EAEAEA'; document.getElementById("AdminVC_A").checked=true;}

}
function FunCV(v)
{ if(v=='Y'){document.getElementById("CV_Y").checked=true;document.getElementById("CV_N").checked=false;document.getElementById("CV_YN").value='Y';
  document.getElementById("CV_Amt").readOnly=true; document.getElementById("CV_Amt").style.background='#EAEAEA'; document.getElementById("CV_A").checked=false;
  document.getElementById("CV_Amt").value='';}
  else if(v=='N'){document.getElementById("CV_Y").checked=false; document.getElementById("CV_N").checked=true;document.getElementById("CV_YN").value='N';
  document.getElementById("CV_Amt").readOnly=false; document.getElementById("CV_Amt").style.background='#FFFFFF'; document.getElementById("CV_A").checked=false;}
  else if(v=='A'){document.getElementById("CV_Y").checked=false; document.getElementById("CV_N").checked=false;document.getElementById("CV_YN").value='A';
  document.getElementById("CV_Amt").readOnly=true; document.getElementById("CV_Amt").style.background='#EAEAEA'; document.getElementById("CV_A").checked=true;}
}

function FunWorkDay()
{var HrRowNOC=document.getElementById("HrRowNOC").value;
 var WorkDay = parseFloat(document.getElementById("WorkDay").value); var NoticeDay = parseFloat(document.getElementById("NoticeDay").value);
 var ServedDay = parseFloat(document.getElementById("ServedDay").value); var RecoveryDay = parseFloat(document.getElementById("RecoveryDay").value);
 var TotWorkDay = parseFloat(document.getElementById("TotWorkDay").value); 
 var RDay = document.getElementById("RecoveryDay").value=Math.round((NoticeDay-ServedDay)*100)/100; 
 var TWDay = document.getElementById("TotWorkDay").value=Math.round((WorkDay+ServedDay)*100)/100;  
 var Basic_R = parseFloat(document.getElementById("BasicRate").value); var HRA_R = parseFloat(document.getElementById("HRARate").value);
 var CA_R = parseFloat(document.getElementById("CARate").value); var SA_R = parseFloat(document.getElementById("SARate").value);
 var DA = parseFloat(document.getElementById("DA").value); var Arrear = parseFloat(document.getElementById("Arrear").value); 
 var Incen = parseFloat(document.getElementById("Incen").value); var PP = parseFloat(document.getElementById("PP").value);
var LTA_R = parseFloat(document.getElementById("LTA_R").value); 
 var MA_R = parseFloat(document.getElementById("MA_R").value); var CEA_R = parseFloat(document.getElementById("CEA_R").value); 
 var LTA = parseFloat(document.getElementById("LTA").value); var MA = parseFloat(document.getElementById("MA").value); var CEA = parseFloat(document.getElementById("CEA").value);
 var CEA_Value = parseFloat(document.getElementById("CHILD_EDU_ALL_Value").value); var MA_Value = parseFloat(document.getElementById("MED_REM_Value").value); 
 var LTA_Value = parseFloat(document.getElementById("LTA_Value").value); var CEA_PerChildMonth = parseFloat(document.getElementById("CEA_PerChildMonth").value); 
 var MR_PerMonth = parseFloat(document.getElementById("MR_PerMonth").value); var Pf_MaxSalPf = parseFloat(document.getElementById("Pf_MaxSalPf").value); var VA = parseFloat(document.getElementById("VA").value);
 var CCA = parseFloat(document.getElementById("CCA").value); var RA = parseFloat(document.getElementById("RA").value);
 var MonthWD=26; 
 var TotWorkDay = parseFloat(document.getElementById("TotWorkDay").value);
 
 var Car=parseFloat(document.getElementById("Car").value);
 var CarRate=parseFloat(document.getElementById("CarRate").value);
 document.getElementById("Car").value=document.getElementById("CarRate").value;
 var CarAmt=parseFloat(document.getElementById("Car").value);
 
 if(Basic_R>0){var OneDay_Basic = Basic_R/MonthWD; var Basic = document.getElementById("Basic").value=Math.round(OneDay_Basic*TotWorkDay);}
 else{var Basic = document.getElementById("Basic").value=0;} 
 if(HRA_R>0){var OneDay_Hra=HRA_R/MonthWD; var HRA = document.getElementById("HRA").value=Math.round(OneDay_Hra*TotWorkDay); }
 else{var HRA = document.getElementById("HRA").value=0;}
 if(CA_R>0){var OneDay_Con=CA_R/MonthWD; var CA = document.getElementById("CA").value=Math.round(OneDay_Con*TotWorkDay); }
 else{var CA = document.getElementById("CA").value=0;}
 if(SA_R>0){var OneDay_Spe=SA_R/MonthWD; var SA = document.getElementById("SA").value=Math.round(OneDay_Spe*TotWorkDay); }
 else{var SA = document.getElementById("SA").value=0;}
 var Gross = document.getElementById("Gross").value=Math.round(Basic+HRA+CA+SA+DA+Arrear+Incen+PP+VA+CCA+RA+CarAmt);
 if(CEA_R>0){var OneDay_CEA = CEA_R/MonthWD; var CEA_V = document.getElementById("CEA").value=Math.round(OneDay_CEA*TotWorkDay);}
 else{var CEA_V = document.getElementById("CEA").value=0;}
 if(MA_R>0){var OneDay_MA=MA_R/MonthWD; var MA_V = document.getElementById("MA").value=Math.round(OneDay_MA*TotWorkDay); }
 else{var MA_V = document.getElementById("MA").value=0;}
 if(LTA_R>0){var OneDay_LTA=LTA_R/MonthWD; var LTA_V = document.getElementById("LTA").value=Math.round(OneDay_LTA*TotWorkDay); }
 else{var LTA_V = document.getElementById("LTA").value=0;} 
 
 var GrossEsic = Math.round(Basic+HRA+CA+SA);
 if(GrossEsic>0)
 {
   var EmpESIC=parseFloat(document.getElementById("EmpESIC").value); 
   if(EmpESIC>0)
   {
     var ESIC = document.getElementById("ESIC").value=Math.round((((GrossEsic*1.75)/100)*100)/100,0); 
   }
 }
 
 
 
if(HrRowNOC==0)
{
 var VNRExp = parseFloat(document.getElementById("VNRExp").value); 
 if(VNRExp>=5)
 { 
   var VNRExpMonth = parseFloat(document.getElementById("VNRExpMonth").value);
   var MaxGratuity = parseFloat(document.getElementById("Lumpsum_MaxGratuity").value); var GratuityDay = parseFloat(document.getElementById("Lumpsum_GratuityDay").value); 
   var YearOfGratuity=Math.round(OneDay_Basic*GratuityDay);
   
   //if(YearOfGratuity>MaxGratuity){var GratuityValue=MaxGratuity;}else{var GratuityValue=YearOfGratuity;} 
  // var MonthOfGratuityValue=Math.round(GratuityValue/12); 
  // var TotGratuity = document.getElementById("Gratuity").value=Math.round(MonthOfGratuityValue*VNRExpMonth);
  
  var VNRExpYear = parseFloat(document.getElementById("VNRExpYear").value);
   if(VNRExpMonth>=6){ var VnrExpMain=VNRExpYear+1; }
   else{ var VnrExpMain=VNRExpYear; }
   var GratuityValue=YearOfGratuity;
   var TotGratuity = document.getElementById("Gratuity").value=Math.round(GratuityValue*VnrExpMain);
  
 }
 else { var TotGratuity = document.getElementById("Gratuity").value=0; }
}
 
 //if(CEA_Value>0)
 //{ if(CEA_Value==1200){var CEA_V=document.getElementById("CEA").value=CEA_PerChildMonth;}
 //  if(CEA_Value==2400){var CEA_V=document.getElementById("CEA").value=CEA_PerChildMonth*2;} 
 //}else{var CEA_V=document.getElementById("CEA").value==0;}
 //if(MA_Value>0){var MA_V = document.getElementById("MA").value=MR_PerMonth;}else{var MA_V = document.getElementById("MA").value=0;}  
 //if(LTA_Value>0){var LTA_V = document.getElementById("LTA").value=Math.round(LTA_Value/12);}else{var LTA = document.getElementById("LTA").value=0;}  
 
 var LE = parseFloat(document.getElementById("LE").value); var Bonus = parseFloat(document.getElementById("Bonus").value); 
 var Gratuity = parseFloat(document.getElementById("Gratuity").value); 
 var Mediclaim = parseFloat(document.getElementById("Mediclaim").value);
 var RTSB = parseFloat(document.getElementById("RTSB").value);
 var TotEar = document.getElementById("TotEar").value=Math.round(Gross+CEA_V+MA_V+LTA_V+LE+Bonus+Gratuity+Mediclaim+RTSB);
 
 var TotWorkDay = parseFloat(document.getElementById("TotWorkDay").value);
/*******************/
/*******************/
var pf1 = document.getElementById("CalPf1").value;
var pf2 = document.getElementById("CalPf2").value;
var pf3 = document.getElementById("CalPf3").value;
var SA = parseFloat(document.getElementById("SA").value);
var Basic = parseFloat(document.getElementById("Basic").value);
var Basic_R = parseFloat(document.getElementById("BasicRate").value); 
var SA_R = parseFloat(document.getElementById("SARate").value);
var Pf_MaxSalPf = parseFloat(document.getElementById("Pf_MaxSalPf").value);
if(pf1=='Y' || pf2=='Y'){ var PF = document.getElementById("PF").value=Math.round((Basic*12)/100); } 
else if(pf3=='Y' && Basic_R<=Pf_MaxSalPf)
{ 
  
  if(TotWorkDay<=MonthWD)
  { 
   var PFBas=Math.round(Basic+SA); 
   if(PFBas<=Pf_MaxSalPf){ var PF = document.getElementById("PF").value=Math.round((PFBas*12)/100); }
   else{ var PF = document.getElementById("PF").value=Math.round((Pf_MaxSalPf*12)/100); }
  }
  else if(TotWorkDay>MonthWD)
  {
   var PFBas=Math.round(Basic_R+SA_R);
   if(PFBas<=Pf_MaxSalPf){ var Pf1=Math.round((PFBas*12)/100); }
   else{ var Pf1=Math.round((Pf_MaxSalPf*12)/100); }
   
   var ExtBas=Math.round(Basic-Basic_R);  var ExtSpl=Math.round(SA-SA_R); 
   var PFBas2=Math.round(ExtBas+ExtSpl);
   if(PFBas2<=Pf_MaxSalPf){ var Pf2=Math.round((PFBas2*12)/100); }
   else{ var Pf2=Math.round((Pf_MaxSalPf*12)/100); }
   
   var PF = document.getElementById("PF").value=Math.round(Pf1+Pf2);
  }
  
  
}
else
{
      
  if(Basic_R<=Pf_MaxSalPf){ var PF = document.getElementById("PF").value=Math.round((Basic*12)/100); }
  else if(Basic_R>Pf_MaxSalPf)
  { 
   if(TotWorkDay<=MonthWD){var PF = document.getElementById("PF").value=Math.round((Pf_MaxSalPf*12)/100);}
   else if(TotWorkDay>MonthWD)
   { var ExtBas=Math.round(Basic-Basic_R); 
     var Pf1=Math.round((Pf_MaxSalPf*12)/100);
	 if(ExtBas<=Pf_MaxSalPf){var Pf2=Math.round((ExtBas*12)/100);}else{var Pf2=Math.round((Pf_MaxSalPf*12)/100);}
	 var PF = document.getElementById("PF").value=Math.round(Pf1+Pf2); alert(PF);
   }
  }
}
/*******************/
/*******************/
 
 /*if(Basic_R<=Pf_MaxSalPf){var PF = document.getElementById("PF").value=Math.round((Basic*12)/100);}
 if(Basic_R>Pf_MaxSalPf)
 { 
  if(TotWorkDay<=MonthWD){var PF = document.getElementById("PF").value=Math.round((Pf_MaxSalPf*12)/100);}
  else if(TotWorkDay>MonthWD)
  { var ExtBas=Math.round(Basic-Basic_R); 
    var Pf1=Math.round((Pf_MaxSalPf*12)/100);
	if(ExtBas<=Pf_MaxSalPf){var Pf2=Math.round((ExtBas*12)/100);}else{var Pf2=Math.round((Pf_MaxSalPf*12)/100);}
	var PF = document.getElementById("PF").value=Math.round(Pf1+Pf2);
  }
 }*/
 
 var RecoveryDay = parseFloat(document.getElementById("RecoveryDay").value); var GrossRate = parseFloat(document.getElementById("GrossRate").value);
 if(RecoveryDay>0)
 {
  //if(GrossRate>0){var OneDay_Gross = GrossRate/MonthWD; var Gross_R = document.getElementById("NPR").value=Math.round(OneDay_Gross*RecoveryDay);}
  //else{var Gross_R = document.getElementById("NPR").value=0;}
  if(Basic_R>0){var Basic_R = Math.round(OneDay_Basic*RecoveryDay);}else{var BasicR=0;}
  if(HRA_R>0){var HRA_R = Math.round(OneDay_Hra*RecoveryDay);}else{var HRA_R=0;}
  if(CA_R>0){var CA_R = Math.round(OneDay_Con*RecoveryDay);}else{var CA_R=0;}
  if(SA_R>0){var SA_R = Math.round(OneDay_Spe*RecoveryDay);}else{var SA_R=0;}
  var Gross_R = document.getElementById("NPR").value=Math.round(Basic_R+HRA_R+CA_R+SA_R);
  var Gross_RA = document.getElementById("NPR_Actual").value=Math.round(Basic_R+HRA_R+CA_R+SA_R);
 }
 else{var Gross_R = document.getElementById("NPR").value=0;}
 
}


function FunServedDay()
{ var HrRowNOC=document.getElementById("HrRowNOC").value;
 var WorkDay = parseFloat(document.getElementById("WorkDay").value); var NoticeDay = parseFloat(document.getElementById("NoticeDay").value);
 var ServedDay = parseFloat(document.getElementById("ServedDay").value); var RecoveryDay = parseFloat(document.getElementById("RecoveryDay").value);
 var TotWorkDay = parseFloat(document.getElementById("TotWorkDay").value);
 var RDay = document.getElementById("RecoveryDay").value=Math.round((NoticeDay-ServedDay)*100)/100; 
 var TWDay = document.getElementById("TotWorkDay").value=Math.round((WorkDay+ServedDay)*100)/100;
 var Basic_R = parseFloat(document.getElementById("BasicRate").value); var HRA_R = parseFloat(document.getElementById("HRARate").value);
 var CA_R = parseFloat(document.getElementById("CARate").value); var SA_R = parseFloat(document.getElementById("SARate").value);
 var DA = parseFloat(document.getElementById("DA").value); var Arrear = parseFloat(document.getElementById("Arrear").value); 
 var Incen = parseFloat(document.getElementById("Incen").value); var PP = parseFloat(document.getElementById("PP").value);
var LTA_R = parseFloat(document.getElementById("LTA_R").value); 
 var MA_R = parseFloat(document.getElementById("MA_R").value); var CEA_R = parseFloat(document.getElementById("CEA_R").value);
 var LTA = parseFloat(document.getElementById("LTA").value); var MA = parseFloat(document.getElementById("MA").value); var CEA = parseFloat(document.getElementById("CEA").value);
 var CEA_Value = parseFloat(document.getElementById("CHILD_EDU_ALL_Value").value); var MA_Value = parseFloat(document.getElementById("MED_REM_Value").value); 
 var LTA_Value = parseFloat(document.getElementById("LTA_Value").value); var CEA_PerChildMonth = parseFloat(document.getElementById("CEA_PerChildMonth").value); 
 var MR_PerMonth = parseFloat(document.getElementById("MR_PerMonth").value); var Pf_MaxSalPf = parseFloat(document.getElementById("Pf_MaxSalPf").value); var VA = parseFloat(document.getElementById("VA").value);
 var CCA = parseFloat(document.getElementById("CCA").value); var RA = parseFloat(document.getElementById("RA").value);
 var MonthWD=26; 
 var TotWorkDay = parseFloat(document.getElementById("TotWorkDay").value);
 
 var Car=parseFloat(document.getElementById("Car").value);
 var CarRate=parseFloat(document.getElementById("CarRate").value);
 document.getElementById("Car").value=document.getElementById("CarRate").value;
 var CarAmt=parseFloat(document.getElementById("Car").value);
 
 if(Basic_R>0){var OneDay_Basic = Basic_R/MonthWD; var Basic = document.getElementById("Basic").value=Math.round(OneDay_Basic*TotWorkDay);}
 else{var Basic = document.getElementById("Basic").value=0;}
 if(HRA_R>0){var OneDay_Hra=HRA_R/MonthWD; var HRA = document.getElementById("HRA").value=Math.round(OneDay_Hra*TotWorkDay); }
 else{var HRA = document.getElementById("HRA").value=0;}
 if(CA_R>0){var OneDay_Con=CA_R/MonthWD; var CA = document.getElementById("CA").value=Math.round(OneDay_Con*TotWorkDay); }
 else{var CA = document.getElementById("CA").value=0;}
 if(SA_R>0){var OneDay_Spe=SA_R/MonthWD; var SA = document.getElementById("SA").value=Math.round(OneDay_Spe*TotWorkDay); }
 else{var SA = document.getElementById("SA").value=0;}
 var Gross = document.getElementById("Gross").value=Math.round(Basic+HRA+CA+SA+DA+Arrear+Incen+PP+VA+CCA+RA+CarAmt);
 if(CEA_R>0){var OneDay_CEA = CEA_R/MonthWD; var CEA_V = document.getElementById("CEA").value=Math.round(OneDay_CEA*TotWorkDay);}
 else{var CEA_V = document.getElementById("CEA").value=0;}
 if(MA_R>0){var OneDay_MA=MA_R/MonthWD; var MA_V = document.getElementById("MA").value=Math.round(OneDay_MA*TotWorkDay); }
 else{var MA_V = document.getElementById("MA").value=0;}
 if(LTA_R>0){var OneDay_LTA=LTA_R/MonthWD; var LTA_V = document.getElementById("LTA").value=Math.round(OneDay_LTA*TotWorkDay); }
 else{var LTA_V = document.getElementById("LTA").value=0;}
 
 var GrossEsic = Math.round(Basic+HRA+CA+SA);
 if(GrossEsic>0)
 {
   var EmpESIC=parseFloat(document.getElementById("EmpESIC").value); 
   if(EmpESIC>0)
   {
     var ESIC = document.getElementById("ESIC").value=Math.round((((GrossEsic*1.75)/100)*100)/100,0); 
   }
 }
 
 
if(HrRowNOC==0)
{
 var VNRExp = parseFloat(document.getElementById("VNRExp").value); 
 if(VNRExp>=5)
 { 
   var VNRExpMonth = parseFloat(document.getElementById("VNRExpMonth").value);
   var MaxGratuity = parseFloat(document.getElementById("Lumpsum_MaxGratuity").value); var GratuityDay = parseFloat(document.getElementById("Lumpsum_GratuityDay").value); 
   var YearOfGratuity=Math.round(OneDay_Basic*GratuityDay); 
   
   //if(YearOfGratuity>MaxGratuity){var GratuityValue=MaxGratuity;}else{var GratuityValue=YearOfGratuity;} 
   //var MonthOfGratuityValue=Math.round(GratuityValue/12); 
   //var TotGratuity = document.getElementById("Gratuity").value=Math.round(MonthOfGratuityValue*VNRExpMonth);
   
   var VNRExpYear = parseFloat(document.getElementById("VNRExpYear").value);
   if(VNRExpMonth>=6){ var VnrExpMain=VNRExpYear+1; }
   else{ var VnrExpMain=VNRExpYear; }
   var GratuityValue=YearOfGratuity;
   var TotGratuity = document.getElementById("Gratuity").value=Math.round(GratuityValue*VnrExpMain);
   
 }
 else { var TotGratuity = document.getElementById("Gratuity").value=0; }
}
 
 var LE = parseFloat(document.getElementById("LE").value); var Bonus = parseFloat(document.getElementById("Bonus").value); 
 var Gratuity = parseFloat(document.getElementById("Gratuity").value); 
 var Mediclaim = parseFloat(document.getElementById("Mediclaim").value);
 var RTSB = parseFloat(document.getElementById("RTSB").value);
 var TotEar = document.getElementById("TotEar").value=Math.round(Gross+CEA_V+MA_V+LTA_V+LE+Bonus+Gratuity+Mediclaim+RTSB);

 var TotWorkDay = parseFloat(document.getElementById("TotWorkDay").value);
/*******************/
/*******************/
var pf1 = document.getElementById("CalPf1").value;
var pf2 = document.getElementById("CalPf2").value;
var pf3 = document.getElementById("CalPf3").value;
var SA = parseFloat(document.getElementById("SA").value);
var Basic = parseFloat(document.getElementById("Basic").value);
var Basic_R = parseFloat(document.getElementById("BasicRate").value); 
var SA_R = parseFloat(document.getElementById("SARate").value);
var Pf_MaxSalPf = parseFloat(document.getElementById("Pf_MaxSalPf").value);
if(pf1=='Y' || pf2=='Y'){ var PF = document.getElementById("PF").value=Math.round((Basic*12)/100); } 
else if(pf3=='Y' && Basic_R<=Pf_MaxSalPf)
{ 
  
  if(TotWorkDay<=MonthWD)
  { 
   var PFBas=Math.round(Basic+SA); 
   if(PFBas<=Pf_MaxSalPf){ var PF = document.getElementById("PF").value=Math.round((PFBas*12)/100); }
   else{ var PF = document.getElementById("PF").value=Math.round((Pf_MaxSalPf*12)/100); }
  }
  else if(TotWorkDay>MonthWD)
  {
   var PFBas=Math.round(Basic_R+SA_R);
   if(PFBas<=Pf_MaxSalPf){ var Pf1=Math.round((PFBas*12)/100); }
   else{ var Pf1=Math.round((Pf_MaxSalPf*12)/100); }
   
   var ExtBas=Math.round(Basic-Basic_R);  var ExtSpl=Math.round(SA-SA_R); 
   var PFBas2=Math.round(ExtBas+ExtSpl);
   if(PFBas2<=Pf_MaxSalPf){ var Pf2=Math.round((PFBas2*12)/100); }
   else{ var Pf2=Math.round((Pf_MaxSalPf*12)/100); }
   
   var PF = document.getElementById("PF").value=Math.round(Pf1+Pf2);
  }
  
  
}
else
{
  if(Basic_R<=Pf_MaxSalPf){ var PF = document.getElementById("PF").value=Math.round((Basic*12)/100); }
  else if(Basic_R>Pf_MaxSalPf)
  { 
   if(TotWorkDay<=MonthWD){var PF = document.getElementById("PF").value=Math.round((Pf_MaxSalPf*12)/100);}
   else if(TotWorkDay>MonthWD)
   { var ExtBas=Math.round(Basic-Basic_R); 
     var Pf1=Math.round((Pf_MaxSalPf*12)/100);
	 if(ExtBas<=Pf_MaxSalPf){var Pf2=Math.round((ExtBas*12)/100);}else{var Pf2=Math.round((Pf_MaxSalPf*12)/100);}
	 var PF = document.getElementById("PF").value=Math.round(Pf1+Pf2);
   }
  }
}
/*******************/
/*******************/
 
 /*if(Basic_R<=Pf_MaxSalPf){var PF = document.getElementById("PF").value=Math.round((Basic*12)/100);}
 if(Basic_R>Pf_MaxSalPf)
 { 
  if(TotWorkDay<=MonthWD){var PF = document.getElementById("PF").value=Math.round((Pf_MaxSalPf*12)/100);}
  else if(TotWorkDay>MonthWD)
  { var ExtBas=Math.round(Basic-Basic_R); 
    var Pf1=Math.round((Pf_MaxSalPf*12)/100);
	if(ExtBas<=Pf_MaxSalPf){var Pf2=Math.round((ExtBas*12)/100);}else{var Pf2=Math.round((Pf_MaxSalPf*12)/100);}
	var PF = document.getElementById("PF").value=Math.round(Pf1+Pf2);
  }
 }*/
 
 var RecoveryDay = parseFloat(document.getElementById("RecoveryDay").value); var GrossRate = parseFloat(document.getElementById("GrossRate").value);
 
 if(RecoveryDay>0)
 {
  //if(GrossRate>0){var OneDay_Gross = GrossRate/MonthWD; var Gross_R = document.getElementById("NPR").value=Math.round(OneDay_Gross*RecoveryDay);}
  //else{var Gross_R = document.getElementById("NPR").value=0;}
  if(Basic_R>0){var Basic_R = Math.round(OneDay_Basic*RecoveryDay);}else{var BasicR=0;}
  if(HRA_R>0){var HRA_R = Math.round(OneDay_Hra*RecoveryDay);}else{var HRA_R=0;}
  if(CA_R>0){var CA_R = Math.round(OneDay_Con*RecoveryDay);}else{var CA_R=0;}
  if(SA_R>0){var SA_R = Math.round(OneDay_Spe*RecoveryDay);}else{var SA_R=0;}
  var Gross_R = document.getElementById("NPR").value=Math.round(Basic_R+HRA_R+CA_R+SA_R);
  var Gross_RA = document.getElementById("NPR_Actual").value=Math.round(Basic_R+HRA_R+CA_R+SA_R);
 }
 else{var Gross_R = document.getElementById("NPR").value=0;}
 
}

function FunEnCash()
{
 var TotEL = parseFloat(document.getElementById("TotEL").value); var EnCashEL = parseFloat(document.getElementById("EnCashEL").value);
 if(TotEL==0 && EnCashEL>0){alert("Please Check Available EL");}
 var EnCashEL = parseFloat(document.getElementById("EnCashEL").value); 
 if(EnCashEL>0)
 { var MonthWD=26; var Basic_R = parseFloat(document.getElementById("BasicRate").value); var LE = parseFloat(document.getElementById("LE").value); 
   if(Basic_R>0){var OneDay_Basic = Basic_R/MonthWD; var LE_V = document.getElementById("LE").value=Math.round(OneDay_Basic*EnCashEL);}
   else{var LE_V = document.getElementById("LE").value=0;}
 }
 var Gross = parseFloat(document.getElementById("Gross").value); var LTA = parseFloat(document.getElementById("LTA").value); 
 var MA = parseFloat(document.getElementById("MA").value); var CEA = parseFloat(document.getElementById("CEA").value); 
 var LE = parseFloat(document.getElementById("LE").value); var Bonus = parseFloat(document.getElementById("Bonus").value); 
 var Gratuity = parseFloat(document.getElementById("Gratuity").value); 
 var Mediclaim = parseFloat(document.getElementById("Mediclaim").value);
 var RTSB = parseFloat(document.getElementById("RTSB").value);
 var Exgredia = parseFloat(document.getElementById("Exgredia").value);
 var NoticePay = parseFloat(document.getElementById("NoticePay").value);
 var TotEar = document.getElementById("TotEar").value=Math.round(Gross+LTA+MA+CEA+LE+Bonus+Gratuity+Mediclaim+RTSB+Exgredia+NoticePay);
 
 /*
 if(Gross>0)
 {
   var EmpESIC=parseFloat(document.getElementById("EmpESIC").value); 
   if(EmpESIC>0)
   {
     var ESIC = document.getElementById("ESIC").value=Math.round((((Gross*1.75)/100)*100)/100,0); 
   }
 }
 */
 
}

function FunTotEL()
{
 var TotEL = parseFloat(document.getElementById("TotEL").value); var EnCashEL = parseFloat(document.getElementById("EnCashEL").value); 
 if(EnCashEL>TotEL){alert("Please Check Available EL");}
}


function funCalcyVal()
{
 var Basic = parseFloat(document.getElementById("Basic").value); var HRA = parseFloat(document.getElementById("HRA").value);
 var CA = parseFloat(document.getElementById("CA").value); var SA = parseFloat(document.getElementById("SA").value);
 var DA = parseFloat(document.getElementById("DA").value); var Arrear = parseFloat(document.getElementById("Arrear").value); var CarAmt = parseFloat(document.getElementById("Car").value);
 var Incen = parseFloat(document.getElementById("Incen").value); var PP = parseFloat(document.getElementById("PP").value);
 var VA = parseFloat(document.getElementById("VA").value);
  var CCA = parseFloat(document.getElementById("CCA").value); var RA = parseFloat(document.getElementById("RA").value);
 var Gross = document.getElementById("Gross").value=Math.round(Basic+HRA+CA+SA+DA+Arrear+Incen+PP+VA+CCA+RA+CarAmt); 
 var LTA = parseFloat(document.getElementById("LTA").value); var MA = parseFloat(document.getElementById("MA").value); 
 var CEA = parseFloat(document.getElementById("CEA").value); var LE = parseFloat(document.getElementById("LE").value); 
 var Bonus = parseFloat(document.getElementById("Bonus").value); var Gratuity = parseFloat(document.getElementById("Gratuity").value); var Mediclaim = parseFloat(document.getElementById("Mediclaim").value); 
 var RTSB = parseFloat(document.getElementById("RTSB").value);
 var Exgredia = parseFloat(document.getElementById("Exgredia").value);
 var NoticePay = parseFloat(document.getElementById("NoticePay").value);
 var TotEar = document.getElementById("TotEar").value=Math.round(Gross+LTA+MA+CEA+LE+Bonus+Gratuity+Mediclaim+RTSB+Exgredia+NoticePay);
 
 var GrossEsic = Math.round(Basic+HRA+CA+SA);
 if(GrossEsic>0)
 {
   var EmpESIC=parseFloat(document.getElementById("EmpESIC").value); 
   if(EmpESIC>0)
   {
     var ESIC = document.getElementById("ESIC").value=Math.round((((GrossEsic*1.75)/100)*100)/100,0); 
   }
 }
 
 
}


function funBonus()
{
 var Gross = parseFloat(document.getElementById("Gross").value);
 var LTA = parseFloat(document.getElementById("LTA").value); var MA = parseFloat(document.getElementById("MA").value); 
 var CEA = parseFloat(document.getElementById("CEA").value); var LE = parseFloat(document.getElementById("LE").value); 
 var Bonus = parseFloat(document.getElementById("Bonus").value); var Gratuity = parseFloat(document.getElementById("Gratuity").value); var Mediclaim = parseFloat(document.getElementById("Mediclaim").value); 
 var RTSB = parseFloat(document.getElementById("RTSB").value);
 var Exgredia = parseFloat(document.getElementById("Exgredia").value);
 var NoticePay = parseFloat(document.getElementById("NoticePay").value);
 var TotEar = document.getElementById("TotEar").value=Math.round(Gross+LTA+MA+CEA+LE+Bonus+Gratuity+Mediclaim+RTSB+Exgredia+NoticePay);
 
 /*
 if(Gross>0)
 {
   var EmpESIC=parseFloat(document.getElementById("EmpESIC").value); 
   if(EmpESIC>0)
   {
     var ESIC = document.getElementById("ESIC").value=Math.round((((Gross*1.75)/100)*100)/100,0); 
   }
 }
 */
 
}

function funGratuity()
{
 var Gross = parseFloat(document.getElementById("Gross").value);
 var LTA = parseFloat(document.getElementById("LTA").value); var MA = parseFloat(document.getElementById("MA").value); 
 var CEA = parseFloat(document.getElementById("CEA").value); var LE = parseFloat(document.getElementById("LE").value); 
 var Bonus = parseFloat(document.getElementById("Bonus").value); var Gratuity = parseFloat(document.getElementById("Gratuity").value); var Mediclaim = parseFloat(document.getElementById("Mediclaim").value); 
 var RTSB = parseFloat(document.getElementById("RTSB").value);
 var Exgredia = parseFloat(document.getElementById("Exgredia").value);
 var NoticePay = parseFloat(document.getElementById("NoticePay").value);
 var TotEar = document.getElementById("TotEar").value=Math.round(Gross+LTA+MA+CEA+LE+Bonus+Gratuity+Mediclaim+RTSB+Exgredia+NoticePay);
 
 /*
 if(Gross>0)
 {
   var EmpESIC=parseFloat(document.getElementById("EmpESIC").value); 
   if(EmpESIC>0)
   {
     var ESIC = document.getElementById("ESIC").value=Math.round((((Gross*1.75)/100)*100)/100,0); 
   }
 }
 */
 
}

function funMediclaim()
{
 var Gross = parseFloat(document.getElementById("Gross").value);
 var LTA = parseFloat(document.getElementById("LTA").value); var MA = parseFloat(document.getElementById("MA").value); 
 var CEA = parseFloat(document.getElementById("CEA").value); var LE = parseFloat(document.getElementById("LE").value); 
 var Bonus = parseFloat(document.getElementById("Bonus").value); var Gratuity = parseFloat(document.getElementById("Gratuity").value); 
 var Mediclaim = parseFloat(document.getElementById("Mediclaim").value); var RTSB = parseFloat(document.getElementById("RTSB").value);
 var Exgredia = parseFloat(document.getElementById("Exgredia").value);
 var NoticePay = parseFloat(document.getElementById("NoticePay").value);
 var TotEar = document.getElementById("TotEar").value=Math.round(Gross+LTA+MA+CEA+LE+Bonus+Gratuity+Mediclaim+RTSB+Exgredia+NoticePay);
 
 /*
 if(Gross>0)
 {
   var EmpESIC=parseFloat(document.getElementById("EmpESIC").value); 
   if(EmpESIC>0)
   {
     var ESIC = document.getElementById("ESIC").value=Math.round((((Gross*1.75)/100)*100)/100,0); 
   }
 }
 */
 
 
}

function funRtsb()
{
 var Gross = parseFloat(document.getElementById("Gross").value);
 var LTA = parseFloat(document.getElementById("LTA").value); var MA = parseFloat(document.getElementById("MA").value); 
 var CEA = parseFloat(document.getElementById("CEA").value); var LE = parseFloat(document.getElementById("LE").value); 
 var Bonus = parseFloat(document.getElementById("Bonus").value); var Gratuity = parseFloat(document.getElementById("Gratuity").value); var Mediclaim = parseFloat(document.getElementById("Mediclaim").value); 
 var RTSB = parseFloat(document.getElementById("RTSB").value);
 var Exgredia = parseFloat(document.getElementById("Exgredia").value);
 var NoticePay = parseFloat(document.getElementById("NoticePay").value);
 var TotEar = document.getElementById("TotEar").value=Math.round(Gross+LTA+MA+CEA+LE+Bonus+Gratuity+Mediclaim+RTSB+Exgredia+NoticePay);
 
 /*
 if(Gross>0)
 {
   var EmpESIC=parseFloat(document.getElementById("EmpESIC").value); 
   if(EmpESIC>0)
   {
     var ESIC = document.getElementById("ESIC").value=Math.round((((Gross*1.75)/100)*100)/100,0); 
   }
 }
 */
 
}

function funExgredia()
{
 var Gross = parseFloat(document.getElementById("Gross").value); var LTA = parseFloat(document.getElementById("LTA").value); var MA = parseFloat(document.getElementById("MA").value); var CEA = parseFloat(document.getElementById("CEA").value); var LE = parseFloat(document.getElementById("LE").value); var Bonus = parseFloat(document.getElementById("Bonus").value); var Gratuity = parseFloat(document.getElementById("Gratuity").value); var Mediclaim = parseFloat(document.getElementById("Mediclaim").value); var RTSB = parseFloat(document.getElementById("RTSB").value); var Exgredia = parseFloat(document.getElementById("Exgredia").value);
 var NoticePay = parseFloat(document.getElementById("NoticePay").value);
 var TotEar = document.getElementById("TotEar").value=Math.round(Gross+LTA+MA+CEA+LE+Bonus+Gratuity+Mediclaim+RTSB+Exgredia+NoticePay);
}


function funNoticePay()
{
var Gross = parseFloat(document.getElementById("Gross").value); var LTA = parseFloat(document.getElementById("LTA").value); var MA = parseFloat(document.getElementById("MA").value); var CEA = parseFloat(document.getElementById("CEA").value); var LE = parseFloat(document.getElementById("LE").value); var Bonus = parseFloat(document.getElementById("Bonus").value); var Gratuity = parseFloat(document.getElementById("Gratuity").value); var Mediclaim = parseFloat(document.getElementById("Mediclaim").value); var RTSB = parseFloat(document.getElementById("RTSB").value); var Exgredia = parseFloat(document.getElementById("Exgredia").value); var NoticePay = parseFloat(document.getElementById("NoticePay").value);
 var TotEar = document.getElementById("TotEar").value=Math.round(Gross+LTA+MA+CEA+LE+Bonus+Gratuity+Mediclaim+RTSB+Exgredia+NoticePay);
}

  
function validate(formname)
{ 
 var Numfilter=/^[0-9. ]+$/;
 var BEP_YN = formname.BEP_YN.value; var BEP_Amt = formname.BEP_Amt.value; 
 var BEP_Remark = formname.BEP_Remark.value; var test_numA = Numfilter.test(BEP_Amt);
 if(BEP_YN==''){alert("Please select option(yes/no) in block ESS password clearance.");  return false; }
 if(BEP_YN=='N' && test_numA==false && BEP_Amt!=''){alert('Please enter only number in block ESS password amount field'); return false; }	
 if(BEP_YN!='' && BEP_YN=='N' && BEP_Remark==''){alert("please enter block ESS password remark"); return false;}
 
 var BPP_YN = formname.BPP_YN.value; var BPP_Amt = formname.BPP_Amt.value; 
 var BPP_Remark = formname.BPP_Remark.value; var test_numB = Numfilter.test(BPP_Amt);
 if(BPP_YN==''){alert("Please select option(yes/no) in block paypac password clearance.");  return false; }
 if(BPP_YN=='N' && test_numB==false && BPP_Amt!=''){alert('Please enter only number in block paypac password amount field'); return false; }	
 if(BPP_YN!='' && BPP_YN=='N' && BPP_Remark==''){alert("please enter block paypac password remark"); return false;}
 
 var BExP_YN = formname.BExP_YN.value; var BExP_Amt = formname.BExP_Amt.value; 
 var BExP_Remark = formname.BExP_Remark.value; var test_numC = Numfilter.test(BExP_Amt);
 if(BExP_YN==''){alert("Please select option(yes/no) in block expro password clearance.");  return false; }
 if(BExP_YN=='N' && test_numC==false && BExP_Amt!=''){alert('Please enter only number in block expro password amount field'); return false; }	
 if(BExP_YN!='' && BExP_YN=='N' && BExP_Remark==''){alert("please enter block expro password remark"); return false;}

 var CV_YN = formname.CV_YN.value; var CV_Amt = formname.CV_Amt.value; 
 var CV_Remark = formname.CV_Remark.value; var test_num = Numfilter.test(CV_Amt);
 if(CV_YN==''){alert("Please select option(yes/no) in company vehicle clearance.");  return false; }
 if(CV_YN!='' && CV_YN=='N' && CV_Amt=='' && CV_Remark==''){alert("please enter company vehicle recovery amount & remark"); return false;}
 if(CV_YN!='' && CV_YN=='N' && CV_Amt==''){alert("please enter company vehicle recovery amount"); return false;}
 if(CV_YN=='N' && test_num==false && CV_Amt!=''){alert('Please enter only number in company vehicle amount field'); return false; }	
 if(CV_YN!='' && CV_YN=='N' && CV_Remark==''){alert("please enter company vehicle remark"); return false;}

 var WorkDay = formname.WorkDay.value; var test_num = Numfilter.test(WorkDay);
 if(WorkDay==''){alert("please check workday"); return false;}
 if(test_num==false){alert('Please enter only number in work day field'); return false; }	
 var ServedDay = formname.ServedDay.value; var test_num1 = Numfilter.test(ServedDay);
 if(ServedDay==''){alert("please check served day"); return false;}
 if(test_num1==false){alert('Please enter only number in served day field'); return false; }
 var TotEL = formname.TotEL.value; var test_num2 = Numfilter.test(TotEL);
 if(TotEL==''){alert("please check available EL"); return false;}
 if(test_num2==false){alert('Please enter only number in available EL field'); return false; }
 var EnCashEL = formname.EnCashEL.value; var test_num3 = Numfilter.test(EnCashEL);
 if(EnCashEL==''){alert("please check encashabled EL"); return false;}
 if(test_num3==false){alert('Please enter only number in encashabled EL field'); return false; }
 var DA = formname.DA.value; var test_num4 = Numfilter.test(DA);
 if(DA==''){alert("please check DA"); return false;}
 if(test_num4==false){alert('Please enter only number in DA field'); return false; }
 var Arrear = formname.Arrear.value; var test_num5 = Numfilter.test(Arrear);
 if(Arrear==''){alert("please check arrear"); return false;}
 if(test_num5==false){alert('Please enter only number in arrear field'); return false; }
 var Incen = formname.Incen.value; var test_num6 = Numfilter.test(Incen);
 if(Incen==''){alert("please check incentive"); return false;}
 if(test_num6==false){alert('Please enter only number in incentive field'); return false; }
 var PP = formname.PP.value; var test_numPP = Numfilter.test(PP);
 if(PP==''){alert("please check performance pay"); return false;}
 if(test_numPP==false){alert('Please enter only number in performance pay field'); return false; }
 var Bonus = formname.Bonus.value; var test_num7 = Numfilter.test(Bonus);
 if(Bonus==''){alert("please check bonus"); return false;}
 if(test_num7==false){alert('Please enter only number in bonus field'); return false; }
 var Gratuity = formname.Gratuity.value; var test_num8 = Numfilter.test(Gratuity);
 if(Gratuity==''){alert("please check gratuity"); return false;}
 if(test_num8==false){alert('Please enter only number in gratuity field'); return false; }
 var RTSB = formname.RTSB.value; var test_num9 = Numfilter.test(RTSB);
 if(RTSB==''){alert("please check recovery towards service bond"); return false;}
 if(test_num9==false){alert('Please enter only number in recovery towards service bond field'); return false; }
 
 var BEP_t = parseFloat(document.getElementById("BEP_Amt").value); var BPP_t = parseFloat(document.getElementById("BPP_Amt").value);
 var BExP_t = parseFloat(document.getElementById("BExP_Amt").value); var CV_t = parseFloat(document.getElementById("CV_Amt").value);
 var AdminIC_t = parseFloat(document.getElementById("AdminIC_Amt").value); 
 var AdminVC_t = parseFloat(document.getElementById("AdminVC_Amt").value);
 var PF = parseFloat(document.getElementById("PF").value); var NPR = parseFloat(document.getElementById("NPR").value);
 var ESIC = parseFloat(document.getElementById("ESIC").value); var ARRESIC = parseFloat(document.getElementById("ARRESIC").value);
 var VolC = parseFloat(document.getElementById("VolC").value);
 var DeductAmt = Math.round((BEP_t+BPP_t+BExP_t+CV_t+AdminIC_t+AdminVC_t)*100)/100;
 var TotDeductAmt = document.getElementById("TotAmt").value=Math.round((DeductAmt+PF+NPR+ESIC+ARRESIC+VolC)*100)/100; 
 
 var agree=confirm("Are you sure..?");
 if(agree){ return true; }else{ return false; }
}    
</script>
</head>
<body bgcolor="#E0DBE3">
<center>
<table border="0" style="width:790px;" align="center">
<tr>
  <td style="width:790px;" valign="top" align="center">
<?php if($_REQUEST['act']!='')  { ?>	
<?php $sqlSE=mysql_query("select * from hrm_employee_separation where EmpSepId=".$_REQUEST['si'], $con); $resSE=mysql_fetch_assoc($sqlSE);
$sqlE=mysql_query("select EmpCode,Fname,Sname,Lname,DesigId,DepartmentId,DR,Gender,Married,DateJoining from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee.EmployeeID=".$resSE['EmployeeID'], $con); $resE=mysql_fetch_assoc($sqlE); 
$sqlDept=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$resE['DepartmentId'], $con); $resDept=mysql_fetch_assoc($sqlDept);
if($resE['DR']=='Y'){$M='Dr.';} elseif($resE['Gender']=='M'){$M='Mr.';} elseif($resE['Gender']=='F' AND $resE['Married']=='Y'){$M='Mrs.';} elseif($resE['Gender']=='F' AND $resE['Married']=='N'){$M='Miss.';}  $NameE=$M.' '.$resE['Fname'].' '.$resE['Sname'].' '.$resE['Lname']; //echo 'aa'.$resSE['HR_RelievingDate'];

//$timestamp_start = strtotime($resE['DateJoining']);  $timestamp_end = strtotime($resSE['HR_RelievingDate']); $difference = abs($timestamp_end - $timestamp_start); 
//$days = floor($difference/(60*60*24)); $months = floor($difference/(60*60*24*30)); $years = $difference/(60*60*24*365); /* $Y2=$years*12;  $M2=$months-$Y2; */ 
//$VNRExpMain=number_format($years, 1);

$date1 = $resE['DateJoining'];
$date2 = $resSE['HR_RelievingDate'];
$diff = abs(strtotime($date2) - strtotime($date1));
$years = floor($diff/(365*60*60*24));
$months = floor(($diff-$years*365*60*60*24)/(30*60*60*24));
$days = floor(($diff-$years*365*60*60*24-$months*30*60*60*24)/(60*60*24)); 
$VNRExpMain=$years.'.'.$months;

$sqlNOC=mysql_query("select * from hrm_employee_separation_nochr where EmpSepId=".$_REQUEST['si'], $con); 
$rowNOC=mysql_num_rows($sqlNOC); if($rowNOC>0){$res=mysql_fetch_assoc($sqlNOC);}

$SqlCtc = mysql_query("SELECT * FROM hrm_employee_ctc WHERE EmployeeID=".$resSE['EmployeeID']." AND Status='A'", $con);  $ResCtc=mysql_fetch_assoc($SqlCtc); 
$SqlLumSum=mysql_query("select hrm_company_statutory_lumpsum.*,hrm_company_statutory_taxsaving.*,hrm_company_statutory_pf.* from hrm_company_statutory_lumpsum INNER JOIN hrm_company_statutory_taxsaving ON hrm_company_statutory_lumpsum.CompanyId=hrm_company_statutory_taxsaving.CompanyId INNER JOIN hrm_company_statutory_pf ON hrm_company_statutory_lumpsum.CompanyId=hrm_company_statutory_pf.CompanyId where hrm_company_statutory_lumpsum.CompanyId=".$_REQUEST['ci'], $con); $ResLumSum=mysql_fetch_assoc($SqlLumSum);

$sqlMax=mysql_query("SELECT MAX(MonthlyLeaveId) as MaxIdLeave FROM hrm_employee_monthlyleave_balance where EmployeeID=".$resSE['EmployeeID'], $con); $resMax=mysql_fetch_assoc($sqlMax); 
$sqlEL = mysql_query("SELECT BalanceEL FROM hrm_employee_monthlyleave_balance where MonthlyLeaveId=".$resMax['MaxIdLeave'], $con); $resEL=mysql_fetch_assoc($sqlEL);
?> 
<form enctype="multipart/form-data" name="formname" method="post" onSubmit="return validate(this)">
<input type="hidden" name="HodId" id="HodId" value="<?php echo $resSE['Hod_EmployeeID']; ?>" /> 
<input type="hidden" id="Pf_MaxSalPf" value="<?php echo $ResLumSum['Pf_MaxSalPf']; ?>" />
<input type="hidden" id="LTA_Value" value="<?php echo $ResCtc['LTA_Value']; ?>" />
<input type="hidden" id="MED_REM_Value" value="<?php echo $ResCtc['MED_REM_Value']; ?>" />
<input type="hidden" id="CHILD_EDU_ALL_Value" value="<?php echo $ResCtc['CHILD_EDU_ALL_Value']; ?>" />
<input type="hidden" id="CEA_PerChildMonth" value="<?php echo $ResLumSum['CEA_PerChildMonth']; ?>" />
<input type="hidden" id="MR_PerMonth" value="<?php echo $ResLumSum['MR_PerMonth']; ?>" />
<input type="hidden" id="si" name="si" value="<?php echo $_REQUEST['si']; ?>" /><input type="hidden" id="ui" name="ui" value="<?php echo $_REQUEST['ui']; ?>" />
<input type="hidden" id="ci" name="ci" value="<?php echo $_REQUEST['ci']; ?>" /><input type="hidden" name="Ename" id="Ename" value="<?php echo $NameE; ?>" />
<input type="hidden" id="TotAmt" name="TotAmt" value="<?php echo $res['TotHRAmt']; ?>" />
<input type="hidden" id="VNRExp" name="VNRExp" value="<?php echo $VNRExpMain; ?>" /> 
<input type="hidden" id="VNRExpMonth" name="VNRExpMonth" value="<?php echo $months; ?>" /> 
<input type="hidden" id="VNRExpYear" name="VNRExpYear" value="<?php echo $years; ?>" />
<input type="hidden" id="Lumpsum_MaxGratuity" name="Lumpsum_MaxGratuity" value="<?php echo $ResLumSum['Lumpsum_MaxGratuity']; ?>" />
<input type="hidden" id="Lumpsum_GratuityDay" name="Lumpsum_GratuityDay" value="<?php echo $ResLumSum['Lumpsum_GratuityDay']; ?>" />
<input type="hidden" id="SNoticeDay" name="SNoticeDay" value="<?php echo $resSE['NoticeDay']; ?>" />
<input type="hidden" id="BalEL" name="BalEL" value="<?php echo $resEL['BalanceEL']; ?>" />
<input type="hidden" id="HrRowNOC" name="HrRowNOC" value="<?php echo $rowNOC; ?>" />
<input type="hidden" id="EmpESIC" name="EmpESIC" value="<?php echo $ResCtc['ESCI']; ?>" />

<input type="hidden" id="CalPf1" name="CalPf1" value="<?php echo $ResCtc['EmpActPf']; ?>" />
<input type="hidden" id="CalPf2" name="CalPf2" value="<?php echo $ResCtc['EmpComActPf']; ?>" />
<input type="hidden" id="CalPf3" name="CalPf3" value="<?php echo $ResCtc['EmpBSActPf']; ?>" />
<table border="0">
 <tr>
<td style="display:;width:790px;"> <?php //if($_REQUEST['Dept']=='Ad'){echo 'block';}else{echo 'block';}?>
<table border="0" cellpadding="0">
<tr><td>&nbsp;</td><td class="Text" style="">&nbsp;<b>EC :&nbsp;<?php echo $resE['EmpCode']; ?>/&nbsp;&nbsp;Name :&nbsp;<?php echo $NameE; ?></b></td></tr>
<tr><td>&nbsp;</td><td class="Text2" style="color:#006200;" align="center"><b>HR CLEARANCE FORM</b></td></tr>
<tr>
   <td style="width:30px;">&nbsp;</td>
   <td>
    <table border="1" style="width:810px; ">
	  <tr bgcolor="#7a6189">
       <td class="Text" style="width:30px;color:#FFFFFF;" align="center"><b>Sn</b></td>
       <td class="Text" style="width:230px;color:#FFFFFF;" align="center"><b>Particular</b></td>
	   <td class="Text" style="width:150px;color:#FFFFFF;" align="center"><b>NA /Yes /No</b></td>
	   <td class="Text" style="width:80px;color:#FFFFFF;" align="center" valign="top"><b>Recovery Amount</b></td>
	   <td class="Text" style="width:320px;color:#FFFFFF;" align="center"><b>Remark</b></td>
     </tr>
	 <tr bgcolor="#FFFFFF">
       <td class="Text" style="width:30px;" align="center">1</td>
       <td class="Text" style="width:230px;" align="">&nbsp;Block ESS Password</td>
	   <td class="Text" style="width:150px;" align="center" valign="top">
	    NA<input type="checkbox" id="BEP_A" onClick="FunBEP('A')" <?php if($res['BEP']=='A'){echo 'checked';} ?> disabled/>
	    Yes<input type="checkbox" id="BEP_Y" onClick="FunBEP('Y')" <?php if($res['BEP']=='Y'){echo 'checked';} ?> disabled/>
		No<input type="checkbox" id="BEP_N" onClick="FunBEP('N')" <?php if($res['BEP']=='N'){echo 'checked';} ?> disabled/>
		<input type="hidden" id="BEP_YN" name="BEP_YN" value="<?php echo $res['BEP']; ?>" />
	   </td>
	   <td class="Text" style="width:80px;" align="center" valign="top">
	    <input style="width:78px;background-color:#EAEAEA;text-align:right;" id="BEP_Amt" name="BEP_Amt" value="<?php echo $res['BEP_Amt']; ?>" readonly/>
	   </td>
	   <td class="Text" style="width:320px;" align="center" valign="top">
	    <input id="BEP_Remark" name="BEP_Remark" style="width:318px;background-color:#EAEAEA;" value="<?php echo $res['BEP_Remark'] ?>" readOnly/>
	   </td>
     </tr>
	  <tr bgcolor="#FFFFFF"> 
       <td class="Text" style="width:30px;" align="center">2</td>
       <td class="Text" style="width:230px;" align="">&nbsp;Block Paypac Password</td>
	   <td class="Text" style="width:150px;" align="center" valign="top">
	    NA<input type="checkbox" id="BPP_A" onClick="FunBPP('A')" <?php if($res['BPP']=='A'){echo 'checked';} ?> disabled/>
	    Yes<input type="checkbox" id="BPP_Y" onClick="FunBPP('Y')" <?php if($res['BPP']=='Y'){echo 'checked';} ?> disabled/>
		No<input type="checkbox" id="BPP_N" onClick="FunBPP('N')" <?php if($res['BPP']=='N'){echo 'checked';} ?> disabled/>
		<input type="hidden" id="BPP_YN" name="BPP_YN" value="<?php echo $res['BPP']; ?>" />
	   </td>
	   <td class="Text" style="width:80px;" align="center" valign="top">
	    <input style="width:78px;background-color:#EAEAEA;text-align:right;" id="BPP_Amt" name="BPP_Amt" value="<?php echo $res['BPP_Amt'];?>" readonly/>
	   </td>
	   <td class="Text" style="width:320px;" align="center" valign="top">
	    <input id="BPP_Remark" name="BPP_Remark" style="width:318px;background-color:#EAEAEA;" value="<?php echo $res['BPP_Remark'] ?>" readOnly/>
	   </td>
     </tr>
	 <tr bgcolor="#FFFFFF">
       <td class="Text" style="width:30px;" align="center">3</td>
       <td class="Text" style="width:230px;" align="">&nbsp;Block Expro Password</td>
	   <td class="Text" style="width:150px;" align="center" valign="top">
	   NA<input type="checkbox" id="BExP_A" onClick="FunBExP('A')" <?php if($res['BExP']=='A'){echo 'checked';} ?> disabled/>
	    Yes<input type="checkbox" id="BExP_Y" onClick="FunBExP('Y')" <?php if($res['BExP']=='Y'){echo 'checked';} ?> disabled/>
		No<input type="checkbox" id="BExP_N" onClick="FunBExP('N')" <?php if($res['BExP']=='N'){echo 'checked';} ?> disabled/>
		<input type="hidden" id="BExP_YN" name="BExP_YN" value="<?php echo $res['BExP']; ?>" />
	   </td>
	   <td class="Text" style="width:80px;" align="center" valign="top">
	    <input style="width:78px;background-color:#EAEAEA;text-align:right;" id="BExP_Amt" name="BExP_Amt" value="<?php echo $res['BExP_Amt']; ?>" readonly/>
	   </td>
	   <td class="Text" style="width:320px;" align="center" valign="top">
	    <input id="BExP_Remark" name="BExP_Remark" style="width:318px;background-color:#EAEAEA;" value="<?php echo $res['BExP_Remark'] ?>" readOnly/>
	   </td>
     </tr>
	 <tr bgcolor="#FFFFFF">
       <td class="Text" style="width:30px;" align="center">4</td>
       <td class="Text" style="width:230px;" align="">&nbsp;ID Card Submitted</td>
	   <td class="Text" style="width:100px;" align="center" valign="top">
	   NA<input type="checkbox" id="AdminIC_A" onClick="FunIC('A')" <?php if($res['AdminIC']=='A'){echo 'checked';} ?> disabled/>
	   Yes<input type="checkbox" id="AdminIC_Y" onClick="FunIC('Y')" <?php if($res['AdminIC']=='Y'){echo 'checked';} ?> disabled/>
	   No<input type="checkbox" id="AdminIC_N" onClick="FunIC('N')" <?php if($res['AdminIC']=='N'){echo 'checked';} ?> disabled/>
		<input type="hidden" id="AdminIC_YN" name="AdminIC_YN" value="<?php echo $res['AdminIC']; ?>" />
	   </td>
	   <td class="Text" style="width:80px;" align="center" valign="top">
	    <input style="width:78px;background-color:#EAEAEA;text-align:right;" id="AdminIC_Amt" name="AdminIC_Amt" value="<?php echo $res['AdminIC_Amt']; ?>" readonly/>
	   </td>
	   <td class="Text" style="width:320px;" align="center" valign="top">
	    <input id="AdminIC_Remark" name="AdminIC_Remark" style="width:318px;" value="<?php echo $res['AdminIC_Remark'] ?>" readonly/>
	   </td>
     </tr>
	 <tr bgcolor="#FFFFFF"> 
       <td class="Text" style="width:30px;" align="center">5</td>
       <td class="Text" style="width:230px;" align="">&nbsp;Visiting Cards Submitted</td>
	   <td class="Text" style="width:100px;" align="center" valign="top">
	   NA<input type="checkbox" id="AdminVC_A" onClick="FunVC('A')" <?php if($res['AdminVC']=='A'){echo 'checked';} ?> disabled/>
	    Yes<input type="checkbox" id="AdminVC_Y" onClick="FunVC('Y')" <?php if($res['AdminVC']=='Y'){echo 'checked';} ?> disabled/>
		No<input type="checkbox" id="AdminVC_N" onClick="FunVC('N')" <?php if($res['AdminVC']=='N'){echo 'checked';} ?> disabled/>
		<input type="hidden" id="AdminVC_YN" name="AdminVC_YN" value="<?php echo $res['AdminVC']; ?>" />
	   </td>
	   <td class="Text" style="width:80px;" align="center" valign="top">
	    <input style="width:78px;background-color:#EAEAEA;text-align:right;" id="AdminVC_Amt" name="AdminVC_Amt" value="<?php echo $res['AdminVC_Amt'];?>" readonly/>
	   </td>
	   <td class="Text" style="width:320px;" align="center" valign="top">
	    <input id="AdminVC_Remark" name="AdminVC_Remark" style="width:318px;" value="<?php echo $res['AdminVC_Remark'] ?>" readonly/>
	   </td>
     </tr>
	  <tr bgcolor="#FFFFFF"> 
       <td class="Text" style="width:30px;" align="center">6</td>
       <td class="Text" style="width:230px;" align="">&nbsp;Company Vehicle Return</td>
	   <td class="Text" style="width:100px;" align="center" valign="top">
	   NA<input type="checkbox" id="CV_A" onClick="FunCV('A')" <?php if($res['CV']=='A'){echo 'checked';} ?> disabled/>
	    Yes<input type="checkbox" id="CV_Y" onClick="FunCV('Y')" <?php if($res['CV']=='Y'){echo 'checked';} ?> disabled/>
		No<input type="checkbox" id="CV_N" onClick="FunCV('N')" <?php if($res['CV']=='N'){echo 'checked';} ?> disabled/>
		<input type="hidden" id="CV_YN" name="CV_YN" value="<?php echo $res['CV']; ?>" />
	   </td>
	   <td class="Text" style="width:80px;" align="center" valign="top">
	    <input style="width:78px;background-color:#EAEAEA;text-align:right;" id="CV_Amt" name="CV_Amt" value="<?php echo $res['CV_Amt'];?>" readonly/>
	   </td>
	   <td class="Text" style="width:320px;" align="center" valign="top">
	    <input id="CV_Remark" name="CV_Remark" style="width:318px;background-color:#EAEAEA;" value="<?php echo $res['CV_Remark'] ?>" readOnly/>
	   </td>
     </tr>
	</table>
   </td>
  </tr>
<tr>
<td style="width:30px;">&nbsp;</td>
<td><input type="hidden" name="ui" id="ui" value="<?php echo $_REQUEST['ui']; ?>" />
<table border="0" style="width:760px;">
 <tr bgcolor="">
  <td class="Text" style="width:300px;" align="">&nbsp;Worked Days Without Notice Period </td>
  <td style="width:50px;" align="center"><input class="DIT" id="WorkDay" name="WorkDay" onChange="FunWorkDay()" onBlur="FunWorkDay()" onClick="FunWorkDay()" value="<?php if($res['WorkDay']>0){echo $res['WorkDay'];}else{echo 0;} ?>" maxlength="4" readonly/></td>
  <td style="width:60px; ">&nbsp;</td>
  <td class="Text" style="width:300px;" align="">&nbsp;Actual Notice Period (Days)</td>
  <td style="width:50px;" align="center"><input class="DIT" id="NoticeDay" name="NoticeDay" value="<?php if($rowNOC>0){echo $res['NoticeDay'];}else{echo 26;} ?>" onChange="FunNoticeDay()" onClick="FunNoticeDay()" maxlength="4" readonly/></td>
 </tr>
 <tr bgcolor="">
  <td class="Text" style="width:300px;" align="">&nbsp;Served Notice Period(Days)</td>
  <td style="width:50px;" align="center"><input class="DIT" id="ServedDay" name="ServedDay" onChange="FunServedDay()" onBlur="FunServedDay()" onClick="FunServedDay()" value="<?php if($res['ServedDay']>0){echo $res['ServedDay'];}else{echo 0;} ?>" maxlength="4" readonly/></td>
  <td style="width:60px; ">&nbsp;</td>
  <td class="Text" style="width:300px;" align="">&nbsp;Recoverable Notice Period(Days)</td>
  <td style="width:50px;" align="center"><input class="DIT" id="RecoveryDay" name="RecoveryDay" onChange="FunRecovery()" value="<?php if($res['RecoveryDay']>0){echo $res['RecoveryDay'];}else{echo 0;} ?>" maxlength="4" readonly/></td>
 </tr>
 <tr bgcolor="">
  <td class="Text" style="width:300px;" align="">&nbsp;Available EL(Days)</td>
  <td style="width:50px;" align="center"><input class="DIT" id="TotEL" name="TotEL" onChange="FunTotEL()" value="<?php if($res['TotEL']>0){echo $res['TotEL'];}else{echo 0;} ?>" maxlength="4" readonly/></td>
  <td style="width:60px; ">&nbsp;</td>
  <td class="Text" style="width:300px;" align="">&nbsp;Encashable EL(Days)</td>
  <td style="width:50px;" align="center"><input class="DIT" id="EnCashEL" name="EnCashEL" onChange="FunEnCash()" onBlur="FunEnCash()" onClick="FunEnCash()" value="<?php if($res['EnCashEL']>0){echo $res['EnCashEL'];}else{echo 0;} ?>" maxlength="4" readonly/></td>
 </tr>
 <tr bgcolor="">
  <td bgcolor="#0080FF" class="Text" style="width:300px;color:#FFFFFF;">&nbsp;<b>Total Number Of Worked(Salaried Days)&nbsp;:</b></td>
  <td style="width:50px;background-color:#7a6189;" align="center"><input class="DIT" id="TotWorkDay" name="TotWorkDay" value="<?php if($res['TotWorkDay']>0){echo $res['TotWorkDay'];}else{echo 0;} ?>" style="font-weight:bold;" maxlength="4" readonly/></td>
  <td>&nbsp;</td>
  <td bgcolor="#FFFFFF" class="Text">&nbsp;Partially Amount Paid</td>
  <td bgcolor="#FFFFFF" class="Text" align="center"><input class="DIT" id="PAP" name="PAP" value="<?php if($res['PAP']>0){echo intval($res['PAP']);}else{echo 0;} ?>" readonly/></td>
 </tr>
 <tr bgcolor="">
  <td colspan="3" class="Text" style="width:410px;" align="center"><b>Earnings(Rs.)</b></td>
  <td colspan="2" class="Text" style="width:350px;" align="center"><b>Deduction(Rs.)</b></td>
 </tr>
 <tr>
  <td colspan="3" valign="top">
   <table border="1">
    <tr bgcolor="#7a6189">
	 <td class="Text" style="width:250px;color:#FFFFFF;" align="center"><b>Components</b></td>
	 <td class="Text" style="width:80px;color:#FFFFFF;" align="center"><b>Rate</b></td>
	 <td class="Text" style="width:80px;color:#FFFFFF;" align="center"><b>Amount</b></td>
	</tr>
	<tr bgcolor="#FFFFFF">
	 <td class="Text">&nbsp;Basic</td>
	 <td class="Text" align="center"><input class="AIT" id="BasicRate" name="BasicRate" value="<?php if($ResCtc['BAS']=='Y' AND $ResCtc['STIPEND']=='N') { echo intval($ResCtc['BAS_Value']); } if($ResCtc['BAS']=='N' AND $ResCtc['STIPEND']=='Y') { echo intval($ResCtc['STIPEND_Value']); }?>" readonly/></td>
	 <td class="Text" align="center"><input class="AIT" id="Basic" name="Basic" value="<?php if($res['Basic']>0){echo intval($res['Basic']);}else{echo 0;} ?>" readonly/></td>
	</tr>
	<tr bgcolor="#FFFFFF">
	 <td class="Text">&nbsp;HRA</td>
	 <td class="Text" align="center"><input class="AIT" id="HRARate" name="HRARate" value="<?php echo intval($ResCtc['HRA_Value']); ?>" readonly/></td>
	 <td class="Text" align="center"><input class="AIT" id="HRA" name="HRA" value="<?php if($res['HRA']>0){echo intval($res['HRA']);}else{echo 0;} ?>" readonly/></td>
	</tr>
	
	<tr bgcolor="#FFFFFF">
	 <td class="Text">&nbsp;Car Allowance</td>
	 <td class="Text" align="center"><input class="AIT" id="CarRate" name="CarRate" value="<?php echo intval($ResCtc['CAR_ALL_Value']); ?>" readonly/></td>
	 <td class="Text" align="center"><input class="AIT" id="Car" name="Car" onChange="FunCar()" value="<?php if($res['CarAllow']>0){echo intval($res['CarAllow']);}else{echo 0;} ?>" readonly/></td>
	</tr>
	
	<tr bgcolor="#FFFFFF">
	 <td class="Text">&nbsp;Conveyance Allowance</td>
	 <td class="Text" align="center"><input class="AIT" id="CARate" name="CARate" value="<?php echo intval($ResCtc['CONV_Value']); ?>" readonly/></td>
	 <td class="Text" align="center"><input class="AIT" id="CA" name="CA" value="<?php if($res['CA']>0){echo intval($res['CA']);}else{echo 0;} ?>" readonly/></td>
	</tr>
	<tr bgcolor="#FFFFFF">
	 <td class="Text">&nbsp;Special Allowance</td>
	 <td class="Text" align="center"><input class="AIT" id="SARate" name="SARate" value="<?php echo intval($ResCtc['SPECIAL_ALL_Value']); ?>" readonly/></td>
	 <td class="Text" align="center"><input class="AIT" id="SA" name="SA" value="<?php if($res['SA']>0){echo intval($res['SA']);}else{echo 0;} ?>" readonly/></td>
	</tr>
	<tr bgcolor="#FFFFFF">
	 <td colspan="2" class="Text">&nbsp;Daily Allowance</td>
	 <td class="Text" align="center"><input class="AIT" id="DA" name="DA" onChange="funCalcyVal()" onBlur="funCalcyVal()" value="<?php if($res['DA']>0){echo intval($res['DA']);}else{echo 0;} ?>" readonly/></td>
	</tr>
	<tr bgcolor="#FFFFFF"> 
	 <td colspan="2" class="Text">&nbsp;Arrear</td>
	 <td class="Text" align="center"><input class="AIT" id="Arrear" name="Arrear" onChange="funCalcyVal()" onBlur="funCalcyVal()" value="<?php if($res['Arrear']>0){echo intval($res['Arrear']);}else{echo 0;} ?>"readonly/></td>
	</tr>
	<tr bgcolor="#FFFFFF">
	 <td colspan="2" class="Text">&nbsp;Incentive</b></td>
	 <td class="Text" align="center"><input class="AIT" id="Incen" name="Incen" onChange="funCalcyVal()" onBlur="funCalcyVal()" value="<?php if($res['Incen']>0){echo intval($res['Incen']);}else{echo 0;} ?>" readonly/></td>
	</tr>
        <tr bgcolor="#FFFFFF" class="Text">
	 <td colspan="2" class="Text">&nbsp;Performance Pay</td>
<td class="Text" align="center"><input class="AIT" id="PP" name="PP" onChange="funCalcyVal()" onBlur="funCalcyVal()" value="<?php if($res['PP']>0){echo intval($res['PP']);}else{echo 0;} ?>" readonly/></td>
	</tr>
	<tr bgcolor="#FFFFFF">
	 <td colspan="2" class="Text">&nbsp;Variable Adjustment</td>
	 <td class="Text" align="center"><input class="AIT" id="VA" name="VA" value="<?php if($res['VA']>0){echo intval($res['VA']);}else{echo 0;} ?>" onChange="funCalcyVal()" onBlur="funCalcyVal()" readonly/></td>
	</tr>
	<tr bgcolor="#FFFFFF">
	 <td colspan="2" class="Text">&nbsp;City Compensatory Allowance</td>
	 <td class="Text" align="center"><input class="AIT" id="CCA" name="CCA" value="<?php if($res['CCA']>0){echo intval($res['CCA']);}else{echo 0;} ?>" onChange="funCalcyVal()" onBlur="funCalcyVal()" readonly/></td>
	</tr>
	<tr bgcolor="#FFFFFF">
	 <td colspan="2" class="Text">&nbsp;Relocation Allowance</td>
	 <td class="Text" align="center"><input class="AIT" id="RA" name="RA" value="<?php if($res['RA']>0){echo intval($res['RA']);}else{echo 0;} ?>" onChange="funCalcyVal()" onBlur="funCalcyVal()" readonly/></td>
	</tr>
	<tr bgcolor="#FFFFFF">
	 <td class="Text">&nbsp;<b>Monthly Gross Earnings :</b></td>
	 <td class="Text" align="center"><input class="AIT" id="GrossRate" name="GrossRate" style="font-weight:bold;" value="<?php echo intval($ResCtc['GrossSalary_PostAnualComponent_Value']); ?>" readonly/></td>
	 <td class="Text" align="center"><input class="AIT" id="Gross" name="Gross" style="font-weight:bold;" value="<?php if($res['Gross']>0){echo intval($res['Gross']);}else{echo 0;} ?>" readonly/></td>
	</tr>
	<tr bgcolor="#FFFFFF">
	 <td class="Text">&nbsp;LTA</td>
	 <td class="Text" align="center"><input class="AIT" id="LTA_R" name="LTA_R" value="<?php echo round($ResCtc['LTA_Value']/12); ?>" readonly/></td>
	 <td class="Text" align="center"><input class="AIT" id="LTA" name="LTA" value="<?php if($res['LTA']>0){echo intval($res['LTA']);}else{echo 0;} ?>" onChange="funLta()" readonly/></td>
	</tr>
	<tr bgcolor="#FFFFFF">
	 <td class="Text">&nbsp;Medical Allowance</td>
	 <td class="Text" align="center"><input class="AIT" id="MA_R" name="MA_R" value="<?php echo round($ResCtc['MED_REM_Value']/12); ?>" readonly/></td>
	 <td class="Text" align="center"><input class="AIT" id="MA" name="MA" value="<?php if($res['MA']>0){echo intval($res['MA']);}else{echo 0;} ?>" onChange="funMa()" readonly/></td>
	</tr>
	<tr bgcolor="#FFFFFF">
	 <td class="Text">&nbsp;Child Education Allowance</td>
	 <td class="Text" align="center"><input class="AIT" id="CEA_R" name="CEA_R" value="<?php echo round($ResCtc['CHILD_EDU_ALL_Value']/12); ?>" /></td>
	 <td class="Text" align="center"><input class="AIT" id="CEA" name="CEA" value="<?php if($res['CEA']>0){echo intval($res['CEA']);}else{echo 0;} ?>" onChange="funCea()" readonly/></td>
	</tr>
	<tr bgcolor="#DDDDFF"><td colspan="3" class="Text">&nbsp;<b>Annual Components </b></b></td></tr>
	<tr bgcolor="#FFFFFF">
	 <td colspan="2" class="Text">&nbsp;Leave Encashment</td>
	 <td class="Text" align="center"><input class="AIT" id="LE" name="LE" value="<?php if($res['LE']>0){echo intval($res['LE']);}else{echo 0;} ?>" readonly/></td>
	</tr>
	<tr bgcolor="#FFFFFF"> 
	 <td colspan="2" class="Text">&nbsp;Bonus</td>
	 <td class="Text" align="center"><input class="AIT" id="Bonus" name="Bonus" value="<?php if($res['Bonus']>0){echo intval($res['Bonus']);}else{echo 0;} ?>" onChange="funBonus()" onBlur="funBonus()" readonly/></td>
	</tr>
	<tr bgcolor="#FFFFFF">
	 <td colspan="2" class="Text">&nbsp;Gratuity&nbsp;&nbsp;<b>(VNR Experience :&nbsp;<?php echo $VNRExpMain.' years'; ?>)</b></td>
	 <td class="Text" align="center"><input class="AIT" id="Gratuity" name="Gratuity" value="<?php if($res['Gratuity']>0){echo intval($res['Gratuity']);}else{echo 0;} ?>" onChange="funGratuity()" onBlur="funGratuity()" readonly/></td>
	</tr>
        <tr bgcolor="#FFFFFF">
	 <td colspan="2" class="Text">&nbsp;Mediclaim Expense&nbsp;&nbsp;</td>
	 <td class="Text" align="center"><input class="AIT" id="Mediclaim" name="Mediclaim" value="<?php if($res['Mediclaim']>0){echo intval($res['Mediclaim']);}else{echo 0;} ?>" onChange="funMediclaim()" onBlur="funMediclaim()" readonly/></td>
	</tr>
	<tr bgcolor="#FFFFFF">
	 <td colspan="2" class="Text">&nbsp;Recovery Towards Service Bond</td>
	 <td class="Text" align="center"><input class="AIT" id="RTSB" name="RTSB" value="<?php if($res['RTSB']>0){echo intval($res['RTSB']);}else{echo 0;} ?>" onChange="funRtsb()" onBlur="funRtsb()" readonly/></td>
	</tr>
	<tr bgcolor="#FFFFFF">
	 <td colspan="2" class="Text">&nbsp;Exgretia</td>
	 <td class="Text" align="center"><input class="AIT" id="Exgredia" name="Exgredia" value="<?php if($res['Exgredia']>0){echo intval($res['Exgredia']);}else{echo 0;} ?>" onChange="funExgredia()" onBlur="funExgredia()" readonly/></td>
	</tr>
	<tr bgcolor="#FFFFFF">
	 <td colspan="2" class="Text">&nbsp;Notice Pay</td>
	 <td class="Text" align="center"><input class="AIT" id="NoticePay" name="NoticePay" value="<?php if($res['NoticePay']>0){echo intval($res['NoticePay']);}else{echo 0;} ?>" onKeyDown="funNoticePay()" onChange="funNoticePay()" onBlur="funNoticePay()" readonly/></td>
	</tr>
	<tr bgcolor="#FFFFFF">
	 <td colspan="2" class="Text">&nbsp;<b>Total :</b></b></td>
	 <td class="Text" align="center"><input class="AIT" id="TotEar" name="TotEar" style="font-weight:bold;" value="<?php if($res['TotEar']>0){echo intval($res['TotEar']);}else{echo 0;} ?>" readonly/></td>
	</tr>
   </table>
  </td>
  <td colspan="2" valign="top">
   <table border="1">
    <tr bgcolor="#7a6189">
	 <td class="Text" style="width:270px;color:#FFFFFF;" align="center"><b>Components</b></td>
	 <td class="Text" style="width:80px;color:#FFFFFF;" align="center"><b>Amounts</b></td>
	</tr>
	 <tr bgcolor="#FFFFFF">
	 <td class="Text">&nbsp;PF</td>
	 <td class="Text" align="center"><input class="AIT" id="PF" name="PF" value="<?php if($res['PF']>0){echo intval($res['PF']);}else{echo 0;} ?>" readonly/></td>
	</tr>
	 <tr bgcolor="#FFFFFF">
	 <td class="Text">&nbsp;ESIC</td>
	 <td class="Text" align="center"><input class="AIT" id="ESIC" name="ESIC" value="<?php if($res['ESIC']>0){echo intval($res['ESIC']);}else{echo 0;} ?>" readonly/></td>
	</tr>
	 <tr bgcolor="#FFFFFF">
	 <td class="Text">&nbsp;Arrear For ESIC</td>
	 <td class="Text" align="center"><input class="AIT" id="ARRESIC" name="ARRESIC" value="<?php if($res['ARR_ESIC']>0){echo intval($res['ARR_ESIC']);}else{echo 0;} ?>" readonly/></td>
	</tr>
	<tr bgcolor="#FFFFFF">
	 <td class="Text">&nbsp;Notice Period Recovery</td>
	 <td class="Text" align="center"><input class="AIT" id="NPR" name="NPR" value="<?php if($res['NPR']>0){echo intval($res['NPR']);}else{echo 0;} ?>" readonly/></td>
	</tr>
	<tr bgcolor="#FFFFFF">
	 <td class="Text">&nbsp;Notice Period Amount</td>
	 <td class="Text" align="center"><input class="AIT" id="NPR_Actual" name="NPR_Actual" value="<?php if($res['NPR_Actual']>0){echo intval($res['NPR_Actual']);}else{echo 0;} ?>" readonly/></td>
	</tr>
        <tr bgcolor="#FFFFFF">
	 <td class="Text">&nbsp;Voluntary Contribution</td>
	 <td class="Text" align="center"><input class="AIT" id="VolC" name="VolC" value="<?php if($res['VolC']>0){echo intval($res['VolC']);}else{echo 0;} ?>" readonly/></td>
	</tr>
	<tr><td colspan="2" style="height:50px;">&nbsp;</td></tr>
	<tr bgcolor="#FFFFFF">
	  <td colspan="2" valign="top">
	   <table>
	    <tr>
		 <td class="Text" valign="top" style="width:80px;">Remark :&nbsp;</td><td class="Text" valign="top" style="width:270px;"><textarea name="HrRemark" id="HrRemark" cols="31" rows="5" style="background-color:#E4E4E4;" disabled><?php echo $res['HrRemark']; ?></textarea></td>
		</tr>
	   </table>
	  </td>
	</tr>
	<tr>
	 <td colspan="2">&nbsp;<font size="3" color="#008000"><?php echo $msg.'&nbsp;'; ?></font>
	 
	 <?php if($rowNoc>0){ ?>
      <font color="#FFFFA6">Save Date:</font>&nbsp;
      <font style="color:#FFF;"><?=date("d-m-Y",strtotime($res['NocSubmitDate']));?></font><?php } ?>
      &nbsp;&nbsp;
	 
	 </td>
	</tr>
	<tr bgcolor="#FFFFFF">
	 <td colspan="2">
<?php if($resSE['HR_NOC']=='N') {?>
<table border="0" class="fontButton">
 <tr>
  <td style="width:400px;"></td>
  <td><?php if($rowNOC>0){ ?><input type="submit" id="submitHRNoc" name="submitHRNoc" value="submit" style="display:none;"/><?php } ?></td>
  <td><input type="button" id="EditHRNoc" value="edit" onClick="edit(<?php echo $rowNOC; ?>)" style="width:60px;"/></td>
  <td><input type="submit" id="saveHRNoc" name="saveHRNoc" value="save" style="display:none;width:60px;"/></td>
  <td><input type="button" name="Refrash" value="refresh" onClick="javascript:window.location='SepHRClearForm.php?act=act&v=v&ss=vty&cc=it@~t~1212&p=value&a=app&true=false&si=<?php echo $_REQUEST['si']; ?>&ui=<?php echo $_REQUEST['ui']; ?>&ci=<?php echo $_REQUEST['ci']; ?>'"/></td>
 </tr>
</table>
<?php } ?>
	 </td>
	</tr>
   </table>
  </td>
 </tr>
</table>
</td>
</tr>
</table>
</td>


 </tr>
</table>
</form>
<?php } ?>	  
  </td>
</tr>
</table>
</center>
</body>
</html>
