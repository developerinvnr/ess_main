<?php require_once('../AdminUser/config/config.php'); 
if(isset($_POST['submitItNoc']))
{ 
  $search =  '!"#$%&/\'-:_' ; $search = str_split($search);
  $ItSS_R=str_replace($search, "", $_POST['ItSS_Remark']); $ItCHS_R=str_replace($search, "", $_POST['ItCHS_Remark']);
  $ItLDH_R=str_replace($search, "", $_POST['ItLDH_Remark']); $ItCS_R=str_replace($search, "", $_POST['ItCS_Remark']);
  $ItDC_R=str_replace($search, "", $_POST['ItDC_Remark']); $ItEAB_R=str_replace($search, "", $_POST['ItEAB_Remark']);
  $ItMND_R=str_replace($search, "", $_POST['ItMND_Remark']); 

  $AOTxt8=''; $AOTxt9=''; $AOTxt10=''; $AOTxt11=''; $AOTxt12=''; $AOTxt13=''; $AOTxt14=''; $AOTxt15=''; 
  $AOR8=''; $AOR9=''; $AOR10=''; $AOR11=''; $AOR12=''; $AOR13=''; $AOR14=''; $AOR15=''; 
  
  if($_POST['ItAO_Txt8']!=''){$AOTxt8=str_replace($search, "", $_POST['ItAO_Txt8']);}
  if($_POST['ItAO_Txt9']!=''){$AOTxt9=str_replace($search, "", $_POST['ItAO_Txt9']);}
  if($_POST['ItAO_Txt10']!=''){$AOTxt10=str_replace($search, "", $_POST['ItAO_Txt10']);}
  if($_POST['ItAO_Txt11']!=''){$AOTxt11=str_replace($search, "", $_POST['ItAO_Txt11']);}
  if($_POST['ItAO_Txt12']!=''){$AOTxt12=str_replace($search, "", $_POST['ItAO_Txt12']);}
  if($_POST['ItAO_Txt13']!=''){$AOTxt13=str_replace($search, "", $_POST['ItAO_Txt13']);}
  if($_POST['ItAO_Txt14']!=''){$AOTxt14=str_replace($search, "", $_POST['ItAO_Txt14']);}
  if($_POST['ItAO_Txt15']!=''){$AOTxt15=str_replace($search, "", $_POST['ItAO_Txt15']);}
  
  if($_POST['ItAO_Remark8']!=''){$AOR8=str_replace($search, "", $_POST['ItAO_Remark8']);}
  if($_POST['ItAO_Remark9']!=''){$AOR9=str_replace($search, "", $_POST['ItAO_Remark9']);}
  if($_POST['ItAO_Remark10']!=''){$AOR10=str_replace($search, "", $_POST['ItAO_Remark10']);}
  if($_POST['ItAO_Remark11']!=''){$AOR11=str_replace($search, "", $_POST['ItAO_Remark11']);}
  if($_POST['ItAO_Remark12']!=''){$AOR12=str_replace($search, "", $_POST['ItAO_Remark12']);}
  if($_POST['ItAO_Remark13']!=''){$AOR13=str_replace($search, "", $_POST['ItAO_Remark13']);}
  if($_POST['ItAO_Remark14']!=''){$AOR14=str_replace($search, "", $_POST['ItAO_Remark14']);}
  if($_POST['ItAO_Remark15']!=''){$AOR15=str_replace($search, "", $_POST['ItAO_Remark15']);}
  $ItROth=''; if($_POST['ItOth_Remark']!=''){$ItROth=str_replace($search, "", $_POST['ItOth_Remark']);}
 
  $sqlNoc=mysql_query("select NocItId from hrm_employee_separation_nocit where EmpSepId=".$_POST['si'], $con); $rowNoc=mysql_num_rows($sqlNoc); 
 if($rowNoc>0) 
  { $sqlIns=mysql_query("update hrm_employee_separation_nocit set NocSubmitDate='".date("Y-m-d")."', ItSS='".$_POST['ItSS_YN']."', ItSS_Amt='".$_POST['ItSS_Amt']."', ItSS_Remark='".$ItSS_R."', ItCHS='".$_POST['ItCHS_YN']."', ItCHS_Amt='".$_POST['ItCHS_Amt']."', ItCHS_Remark='".$ItCHS_R."', ItLDH='".$_POST['ItLDH_YN']."', ItLDH_Amt='".$_POST['ItLDH_Amt']."', ItLDH_Remark='".$ItLDH_R."', ItCS='".$_POST['ItCS_YN']."', ItCS_Amt='".$_POST['ItCS_Amt']."', ItCS_Remark='".$ItCS_R."', ItDC='".$_POST['ItDC_YN']."', ItDC_Amt='".$_POST['ItDC_Amt']."', ItDC_Remark='".$ItDC_R."', ItEAB='".$_POST['ItEAB_YN']."', ItEAB_Amt='".$_POST['ItEAB_Amt']."', ItEAB_Remark='".$ItEAB_R."', ItMND='".$_POST['ItMND_YN']."', ItMND_Amt='".$_POST['ItMND_Amt']."', ItMND_Remark='".$ItMND_R."', ItAO8='".$_POST['ItAO_YN8']."', ItAO_Txt8='".$AOTxt8."', ItAO_Amt8='".$_POST['ItAO_Amt8']."', ItAO_Remark8='".$AOR8."', ItAO9='".$_POST['ItAO_YN9']."', ItAO_Txt9='".$AOTxt9."', ItAO_Amt9='".$_POST['ItAO_Amt9']."', ItAO_Remark9='".$AOR9."', ItAO10='".$_POST['ItAO_YN10']."', ItAO_Txt10='".$AOTxt10."', ItAO_Amt10='".$_POST['ItAO_Amt10']."', ItAO_Remark10='".$AOR10."', ItAO11='".$_POST['ItAO_YN11']."', ItAO_Txt11='".$AOTxt11."', ItAO_Amt11='".$_POST['ItAO_Amt11']."', ItAO_Remark11='".$AOR11."', ItAO12='".$_POST['ItAO_YN12']."', ItAO_Txt12='".$AOTxt12."', ItAO_Amt12='".$_POST['ItAO_Amt12']."', ItAO_Remark12='".$AOR12."', ItAO13='".$_POST['ItAO_YN13']."', ItAO_Txt13='".$AOTxt13."', ItAO_Amt13='".$_POST['ItAO_Amt13']."', ItAO_Remark13='".$AOR13."', ItAO14='".$_POST['ItAO_YN14']."', ItAO_Txt14='".$AOTxt14."', ItAO_Amt14='".$_POST['ItAO_Amt14']."', ItAO_Remark14='".$AOR14."', ItAO15='".$_POST['ItAO_YN15']."', ItAO_Txt15='".$AOTxt15."', ItAO_Amt15='".$_POST['ItAO_Amt15']."', ItAO_Remark15='".$AOR15."', TotItAmt='".$_POST['TotAmt']."', ItOth_Remark='".$ItROth."' where EmpSepId=".$_POST['si'], $con); } 
  else
  { $sqlIns=mysql_query("insert into hrm_employee_separation_nocit(EmpSepId, NocSubmitDate, ItSS, ItSS_Amt, ItSS_Remark, ItCHS, ItCHS_Amt, ItCHS_Remark, ItLDH, ItLDH_Amt, ItLDH_Remark, ItCS, ItCS_Amt, ItCS_Remark, ItDC, ItDC_Amt, ItDC_Remark, ItEAB, ItEAB_Amt, ItEAB_Remark, ItMND, ItMND_Amt, ItMND_Remark, ItAO8, ItAO_Txt8, ItAO_Amt8, ItAO_Remark8, ItAO9, ItAO_Txt9, ItAO_Amt9, ItAO_Remark9, ItAO10, ItAO_Txt10, ItAO_Amt10, ItAO_Remark10, ItAO11, ItAO_Txt11, ItAO_Amt11, ItAO_Remark11, ItAO12, ItAO_Txt12, ItAO_Amt12, ItAO_Remark12, ItAO13, ItAO_Txt13, ItAO_Amt13, ItAO_Remark13, ItAO14, ItAO_Txt14, ItAO_Amt14, ItAO_Remark14, ItAO15, ItAO_Txt15, ItAO_Amt15, ItAO_Remark15, TotItAmt, ItOth_Remark) values(".$_POST['si'].", '".date("Y-m-d")."', '".$_POST['ItSS_YN']."', '".$_POST['ItSS_Amt']."', '".$ItSS_R."', '".$_POST['ItCHS_YN']."', '".$_POST['ItCHS_Amt']."', '".$ItCHS_R."', '".$_POST['ItLDH_YN']."', '".$_POST['ItLDH_Amt']."', '".$ItLDH_R."', '".$_POST['ItCS_YN']."', '".$_POST['ItCS_Amt']."', '".$ItCS_R."', '".$_POST['ItDC_YN']."', '".$_POST['ItDC_Amt']."', '".$ItDC_R."', '".$_POST['ItEAB_YN']."', '".$_POST['ItEAB_Amt']."', '".$ItEAB_R."', '".$_POST['ItMND_YN']."', '".$_POST['ItMND_Amt']."', '".$ItMND_R."', '".$_POST['ItAO_YN8']."', '".$AOTxt8."', '".$_POST['ItAO_Amt8']."', '".$AOR8."', '".$_POST['ItAO_YN9']."', '".$AOTxt9."', '".$_POST['ItAO_Amt9']."', '".$AOR9."', '".$_POST['ItAO_YN10']."', '".$AOTxt10."', '".$_POST['ItAO_Amt10']."', '".$AOR10."', '".$_POST['ItAO_YN11']."', '".$AOTxt11."', '".$_POST['ItAO_Amt11']."', '".$AOR11."', '".$_POST['ItAO_YN12']."', '".$AOTxt12."', '".$_POST['ItAO_Amt12']."', '".$AOR12."', '".$_POST['ItAO_YN13']."', '".$AOTxt13."', '".$_POST['ItAO_Amt13']."', '".$AOR13."', '".$_POST['ItAO_YN14']."', '".$AOTxt14."', '".$_POST['ItAO_Amt14']."', '".$AOR14."', '".$_POST['ItAO_YN115']."', '".$AOTxt15."', '".$_POST['ItAO_Amt15']."', '".$AOR15."', '".$_POST['TotAmt']."', '".$ItROth."')", $con); }
  
  if($sqlIns){$sqlUp=mysql_query("update hrm_employee_separation set IT_NOC='Y' where EmpSepId=".$_POST['si'], $con);}
  if($sqlUp){ $msg='<b>data save successfully.</b>'; }
}  


if($_REQUEST['action']=='ItResend')
{ 
  $sql=mysql_query("update hrm_employee_separation set IT_NOC='N' where EmpSepId=".$_REQUEST['si'], $con); 
  if($sql)
  {
    $sqlIt=mysql_query("select Fname,Sname,Lname,EmailId_Vnr from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_separation_nocit ON hrm_employee_general.EmployeeID=hrm_employee_separation_nocit.ItId where hrm_employee_separation_nocit.EmpSepId=".$_REQUEST['si'], $con); 
	$resIt=mysql_fetch_assoc($sqlIt); $EnameIt=$resTt['Fname'].' '.$resIt['Sname'].' '.$resIt['Lname'];
	if($resIt['EmailId_Vnr'])
	{
	//$email_to2 = $resIt['EmailId_Vnr'];
    //$email_from = 'admin@vnrseeds.co.in';
    //$email_subject2 = "Resent IT NOC clearance form";
	//$email_txt2 = "Resent IT NOC clearance form";
	//$headers = "From: ".$email_from."\r\n"; 
	//$semi_rand = md5(time()); 
	//$headers .= "MIME-Version: 1.0\r\n";
	//$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
	$email_message2 .="HR has resent the clearance form of ".$_POST['Ename']." for corrections. Please log on to ESS for more details <a href='https://www.vnrseeds.co.in'>www.vnrseeds.co.in</a>. \n\n";
	$email_message2 .="Thanks & Regards\n";
    $email_message2 .="HR\n\n";
	//$ok = @mail($email_to2, $email_subject2, $email_message2, $headers);
	
	$subject="Resent IT NOC clearance form";
    $body=$email_message2;
    $email_to=$resIt['EmailId_Vnr'];
    require 'vendor/mail_admin.php';
	
	}
    $msg='Clearance form send it back to IT successfully';
  }
}

if($_REQUEST['action']=='ItApproved')
{ 
  $sql=mysql_query("update hrm_employee_separation set HR_ItNocConf='Y' where EmpSepId=".$_REQUEST['si'], $con); 
  if($sql)
  {
	/******** 8-Finance ************/
    $sqlNoc=mysql_query("select EmployeeID from hrm_employee_separation_nocdept_emp where DepartmentId=8 AND Status='A'", $con); $rowNoc=mysql_num_rows($sqlNoc); 
    if($rowNoc>0)
    { $resNoc=mysql_fetch_assoc($sqlNoc);
      $sqlE=mysql_query("select EmailId_Vnr from hrm_employee_general where EmployeeID=".$resNoc['EmployeeID'], $con); $resE=mysql_fetch_assoc($sqlE); 
      if($resE['EmailId_Vnr']!='')
      {
      //$email_to = $resE['EmailId_Vnr'];
      //$email_from = 'admin@vnrseeds.co.in';
      //$email_subject = "IT NOC clearance approved by HR";
      //$email_txt = "IT NOC clearance approved by HR";
      //$headers = "From: ".$email_from."\r\n"; 
      //$semi_rand = md5(time()); 
      //$headers .= "MIME-Version: 1.0\r\n";
      //$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
      $email_message3 .="HR has submitted the IT clearance form of ".$_REQUEST['En']." for further action. Log on to ESS for further details. <a href='https://www.vnrseeds.co.in'>www.vnrseeds.co.in</a>. \n\n";
	  $email_message3 .="Thanks & Regards\n";
      $email_message3 .="HR\n\n";
      //$ok = @mail($email_to, $email_subject, $email_message, $headers);
      
      $subject="IT NOC clearance approved by HR";
      $body=$email_message3;
      $email_to=$resE['EmailId_Vnr'];
      require 'vendor/mail_admin.php';
      
      }     
    }	  
	
    $msg='Clearance form approved successfully';
  }
}

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Action for Resignation</title>
<link rel="stylesheet" type="text/css" href="src/css/jscal2.css"/>
<link rel="stylesheet" type="text/css" href="src/css/border-radius.css"/>
<link rel="stylesheet" type="text/css" href="src/css/steel/steel.css"/>
<script type="text/javascript" src="src/js/jscal2.js"></script>
<script type="text/javascript" src="src/js/lang/en.js"></script>
<style> .Text {font-family:Geneva, Arial, Helvetica, sans-serif;font-size:13px;}
.Text2 {font-family:Geneva, Arial, Helvetica, sans-serif;font-size:15px;}
.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}
.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;}</style>
<script language="javascript" type="text/javascript">
function FunSS(v)
{ if(v=='Y'){document.getElementById("ItSS_Y").checked=true;document.getElementById("ItSS_N").checked=false; document.getElementById("ItSS_A").checked=false;
  document.getElementById("ItSS_YN").value='Y'; document.getElementById("ItSS_Amt").readOnly=true; document.getElementById("ItSS_Amt").style.background='#EAEAEA';
  document.getElementById("ItSS_Amt").value=0;}
  else if(v=='N'){document.getElementById("ItSS_Y").checked=false; document.getElementById("ItSS_N").checked=true; document.getElementById("ItSS_A").checked=false;
  document.getElementById("ItSS_YN").value='N'; document.getElementById("ItSS_Amt").readOnly=true; document.getElementById("ItSS_Amt").style.background='#EAEAEA';}
  else if(v=='A'){document.getElementById("ItSS_Y").checked=false; document.getElementById("ItSS_N").checked=false; document.getElementById("ItSS_A").checked=true;
  document.getElementById("ItSS_YN").value='A'; document.getElementById("ItSS_Amt").readOnly=true; document.getElementById("ItSS_Amt").style.background='#EAEAEA';}
}
function FunCHS(v)
{ if(v=='Y'){document.getElementById("ItCHS_Y").checked=true;document.getElementById("ItCHS_N").checked=false; document.getElementById("ItCHS_A").checked=false;
document.getElementById("ItCHS_YN").value='Y'; document.getElementById("ItCHS_Amt").readOnly=true; document.getElementById("ItCHS_Amt").style.background='#EAEAEA';
  document.getElementById("ItCHS_Amt").value=0;}
  else if(v=='N'){document.getElementById("ItCHS_N").checked=true;document.getElementById("ItCHS_Y").checked=false; document.getElementById("ItCHS_A").checked=false;
  document.getElementById("ItCHS_YN").value='N'; document.getElementById("ItCHS_Amt").readOnly=true; document.getElementById("ItCHS_Amt").style.background='#EAEAEA';}
   else if(v=='A'){document.getElementById("ItCHS_Y").checked=false; document.getElementById("ItCHS_N").checked=false; document.getElementById("ItCHS_A").checked=true;
  document.getElementById("ItCHS_YN").value='A'; document.getElementById("ItCHS_Amt").readOnly=true; document.getElementById("ItCHS_Amt").style.background='#EAEAEA';}  
}
function FunLDH(v)
{ if(v=='Y'){document.getElementById("ItLDH_Y").checked=true;document.getElementById("ItLDH_N").checked=false; document.getElementById("ItLDH_A").checked=false;
document.getElementById("ItLDH_YN").value='Y'; document.getElementById("ItLDH_Amt").readOnly=true; document.getElementById("ItLDH_Amt").style.background='#EAEAEA';
  document.getElementById("ItLDH_Amt").value=0;}
  else if(v=='N'){document.getElementById("ItLDH_N").checked=true;document.getElementById("ItLDH_Y").checked=false; document.getElementById("ItLDH_A").checked=false;
  document.getElementById("ItLDH_YN").value='N'; document.getElementById("ItLDH_Amt").readOnly=true; document.getElementById("ItLDH_Amt").style.background='#EAEAEA';}
   else if(v=='A'){document.getElementById("ItLDH_Y").checked=false; document.getElementById("ItLDH_N").checked=false; document.getElementById("ItLDH_A").checked=true;
  document.getElementById("ItLDH_YN").value='A'; document.getElementById("ItLDH_Amt").readOnly=true; document.getElementById("ItLDH_Amt").style.background='#EAEAEA';}
}
function FunCS(v)
{ if(v=='Y'){document.getElementById("ItCS_Y").checked=true;document.getElementById("ItCS_N").checked=false; document.getElementById("ItCS_A").checked=false;
document.getElementById("ItCS_YN").value='Y'; document.getElementById("ItCS_Amt").readOnly=true; document.getElementById("ItCS_Amt").style.background='#EAEAEA';
  document.getElementById("ItCS_Amt").value=0;}
  else if(v=='N'){document.getElementById("ItCS_N").checked=true;document.getElementById("ItCS_Y").checked=false; document.getElementById("ItCS_A").checked=false;
  document.getElementById("ItCS_YN").value='N'; document.getElementById("ItCS_Amt").readOnly=true; document.getElementById("ItCS_Amt").style.background='#EAEAEA';}
  else if(v=='A'){document.getElementById("ItCS_Y").checked=false; document.getElementById("ItCS_N").checked=false; document.getElementById("ItCS_A").checked=true;
  document.getElementById("ItCS_YN").value='A'; document.getElementById("ItCS_Amt").readOnly=true; document.getElementById("ItCS_Amt").style.background='#EAEAEA';}
}
function FunDC(v)
{ if(v=='Y'){document.getElementById("ItDC_Y").checked=true;document.getElementById("ItDC_N").checked=false; document.getElementById("ItDC_A").checked=false;
document.getElementById("ItDC_YN").value='Y'; document.getElementById("ItDC_Amt").readOnly=true; document.getElementById("ItDC_Amt").style.background='#EAEAEA';
  document.getElementById("ItDC_Amt").value=0;}
  else if(v=='N'){document.getElementById("ItDC_N").checked=true;document.getElementById("ItDC_Y").checked=false; document.getElementById("ItDC_A").checked=false;
  document.getElementById("ItDC_YN").value='N'; document.getElementById("ItDC_Amt").readOnly=true; document.getElementById("ItDC_Amt").style.background='#EAEAEA';}
  else if(v=='A'){document.getElementById("ItDC_Y").checked=false; document.getElementById("ItDC_N").checked=false; document.getElementById("ItDC_A").checked=true;
  document.getElementById("ItDC_YN").value='A'; document.getElementById("ItDC_Amt").readOnly=true; document.getElementById("ItDC_Amt").style.background='#EAEAEA';}
}
function FunEAB(v)
{ if(v=='Y'){document.getElementById("ItEAB_Y").checked=true;document.getElementById("ItEAB_N").checked=false; document.getElementById("ItEAB_A").checked=false;
document.getElementById("ItEAB_YN").value='Y'; document.getElementById("ItEAB_Amt").readOnly=true; document.getElementById("ItEAB_Amt").style.background='#EAEAEA';
  document.getElementById("ItEAB_Amt").value=0;}
  else if(v=='N'){document.getElementById("ItEAB_N").checked=true;document.getElementById("ItEAB_Y").checked=false; document.getElementById("ItEAB_A").checked=false;
  document.getElementById("ItEAB_YN").value='N'; document.getElementById("ItEAB_Amt").readOnly=true; document.getElementById("ItEAB_Amt").style.background='#EAEAEA';}
  else if(v=='A'){document.getElementById("ItEAB_Y").checked=false; document.getElementById("ItEAB_N").checked=false; document.getElementById("ItEAB_A").checked=true;
  document.getElementById("ItEAB_YN").value='A'; document.getElementById("ItEAB_Amt").readOnly=true; document.getElementById("ItEAB_Amt").style.background='#EAEAEA';}
}
function FunMND(v)
{ if(v=='Y'){document.getElementById("ItMND_Y").checked=true;document.getElementById("ItMND_N").checked=false; document.getElementById("ItMND_A").checked=false;
 document.getElementById("ItMND_YN").value='Y'; document.getElementById("ItMND_Amt").readOnly=true; document.getElementById("ItMND_Amt").style.background='#EAEAEA';
  document.getElementById("ItMND_Amt").value='';}
  else if(v=='N'){document.getElementById("ItMND_N").checked=true;document.getElementById("ItMND_Y").checked=false; document.getElementById("ItMND_A").checked=false;
  document.getElementById("ItMND_YN").value='N'; document.getElementById("ItMND_Amt").readOnly=true; document.getElementById("ItMND_Amt").style.background='#EAEAEA';}
  else if(v=='A'){document.getElementById("ItMND_Y").checked=false; document.getElementById("ItMND_N").checked=false; document.getElementById("ItMND_A").checked=true;
  document.getElementById("ItMND_YN").value='A'; document.getElementById("ItMND_Amt").readOnly=true; document.getElementById("ItMND_Amt").style.background='#EAEAEA';}
}

function FunItAO(i,v)
{ if(v=='Y'){document.getElementById("ItAO_Y"+i).checked=true;document.getElementById("ItAO_N"+i).checked=false; document.getElementById("ItAO_A"+i).checked=false;
 document.getElementById("ItAO_YN"+i).value='Y'; document.getElementById("ItAO_Amt"+i).readOnly=true; document.getElementById("ItAO_Amt"+i).style.background='#EAEAEA';
  document.getElementById("ItAO_Amt"+i).value=0;}
  else if(v=='N'){document.getElementById("ItAO_N"+i).checked=true;document.getElementById("ItAO_Y"+i).checked=false; document.getElementById("ItAO_A"+i).checked=false;
  document.getElementById("ItAO_YN"+i).value='N'; document.getElementById("ItAO_Amt"+i).readOnly=true; document.getElementById("ItAO_Amt"+i).style.background='#EAEAEA';}
  else if(v=='A'){document.getElementById("ItAO_Y"+i).checked=false; document.getElementById("ItAO_N"+i).checked=false; document.getElementById("ItAO_A"+i).checked=true;
  document.getElementById("ItAO_YN"+i).value='A'; document.getElementById("ItAO_Amt"+i).readOnly=true; document.getElementById("ItAO_Amt"+i).style.background='#EAEAEA';}
}

function ShowRowIt(v)
{ if(v==8){var a=v+1; var m=v}
  else if(v>8 && v<15){var a=v+1; var m=v-1;}
  else if(v==15){var a=v; var m=v-1;}
  document.getElementById("addImg"+v).style.display = 'none'; document.getElementById("minusImg"+v).style.display = 'block'; document.getElementById("Row"+v).style.display = 'block';  document.getElementById("img"+a).style.display = 'block'; 
  if(v>8){document.getElementById("minusImg"+m).style.display = 'none';} 
  if(v<15){document.getElementById("addImg"+a).style.display = 'block';}
}
function HideRowIt(v)
{ if(v==8){var a=v+1; var m=v}
  else if(v>8 && v<15){var a=v+1; var m=v-1;}
  else if(v==15){var a=v; var m=v-1;}
  document.getElementById("addImg"+v).style.display = 'block'; document.getElementById("minusImg"+v).style.display = 'none'; document.getElementById("Row"+v).style.display = 'none';
  if(v>8){document.getElementById("minusImg"+m).style.display = 'block';} 
  if(v<15){document.getElementById("addImg"+a).style.display = 'none';}
  document.getElementById("ItAO_Txt"+v).value = ""; 
  document.getElementById("ItAO_Y"+v).checked = false; document.getElementById("ItAO_N"+v).checked = false; document.getElementById("ItAO_A"+v).checked = false;
  document.getElementById("ItAO_YN"+v).value = "";  document.getElementById("ItAO_Amt"+v).value = ""; document.getElementById("ItAO_Remark"+v).value = "";
}

function validate(formname)
{ 
 var Numfilter=/^[0-9. ]+$/;
 var ItSS_YN = formname.ItSS_YN.value; var ItSS_Amt = formname.ItSS_Amt.value; 
 var ItSS_Remark = formname.ItSS_Remark.value; var test_num = Numfilter.test(ItSS_Amt);
 if(ItSS_YN==''){alert("Please select option(yes/no) in sim submitted clearance.");  return false; }
 //if(ItSS_YN!='' && ItSS_YN=='N' && ItSS_Amt=='' && ItSS_Remark==''){alert("please enter sim submitted recovery amount & remark"); return false;}
 //if(ItSS_YN!='' && ItSS_YN=='N' && ItSS_Amt==''){alert("please enter sim submitted recovery amount"); return false;}
 if(ItSS_YN=='N' && test_num==false && ItSS_Amt!=''){alert('Please enter only number in sim submitted amount field'); return false; }	
 if(ItSS_YN!='' && ItSS_YN=='N' && ItSS_Remark==''){alert("please enter sim submitted remark"); return false;}
 
 var ItCHS_YN = formname.ItCHS_YN.value; var ItCHS_Amt = formname.ItCHS_Amt.value; 
 var ItCHS_Remark = formname.ItCHS_Remark.value; var test_num = Numfilter.test(ItCHS_Amt);
 if(ItCHS_YN==''){alert("Please select option(yes/no) in company handset submitted clearance.");  return false; }
 //if(ItCHS_YN!='' && ItCHS_YN=='N' && ItCHS_Amt=='' && ItCHS_Remark==''){alert("please enter company handset submitted recovery amount & remark"); return false;}
 //if(ItCHS_YN!='' && ItCHS_YN=='N' && ItCHS_Amt==''){alert("please enter company handset submitted recovery amount"); return false;}
 if(ItCHS_YN=='N' && test_num==false && ItCHS_Amt!=''){alert('Please enter only number in company handset submitted amount field'); return false; }	
 if(ItCHS_YN!='' && ItCHS_YN=='N' && ItCHS_Remark==''){alert("please enter company handset submitted remark"); return false;}
 
 var ItLDH_YN = formname.ItLDH_YN.value; var ItLDH_Amt = formname.ItLDH_Amt.value; 
 var ItLDH_Remark = formname.ItLDH_Remark.value; var test_num = Numfilter.test(ItLDH_Amt);
 if(ItLDH_YN==''){alert("Please select option(yes/no) in laptop/ desktop handour clearance.");  return false; }
 //if(ItLDH_YN!='' && ItLDH_YN=='N' && ItLDH_Amt=='' && ItLDH_Remark==''){alert("please enter laptop/ desktop handour recovery amount & remark"); return false;}
 //if(ItLDH_YN!='' && ItLDH_YN=='N' && ItLDH_Amt==''){alert("please enter laptop/ desktop handour recovery amount"); return false;}
 if(ItLDH_YN=='N' && test_num==false && ItLDH_Amt!=''){alert('Please enter only number in laptop/ desktop handour amount field'); return false; }	
 if(ItLDH_YN!='' && ItLDH_YN=='N' && ItLDH_Remark==''){alert("please enter laptop/ desktop handour remark"); return false;}

 var ItCS_YN = formname.ItCS_YN.value; var ItCS_Amt = formname.ItCS_Amt.value; 
 var ItCS_Remark = formname.ItCS_Remark.value; var test_num = Numfilter.test(ItCS_Amt);
 if(ItCS_YN==''){alert("Please select option(yes/no) in camera submitted clearance.");  return false; }
 //if(ItCS_YN!='' && ItCS_YN=='N' && ItCS_Amt=='' && ItCS_Remark==''){alert("please enter camera submitted recovery amount & remark"); return false;}
 //if(ItCS_YN!='' && ItCS_YN=='N' && ItCS_Amt==''){alert("please enter camera submitted recovery amount"); return false;}
 if(ItCS_YN=='N' && test_num==false && ItCS_Amt!=''){alert('Please enter only number in camera submitted amount field'); return false; }	
 if(ItCS_YN!='' && ItCS_YN=='N' && ItCS_Remark==''){alert("please enter camera submitted remark"); return false;}
 
 var ItDC_YN = formname.ItDC_YN.value; var ItDC_Amt = formname.ItDC_Amt.value; 
 var ItDC_Remark = formname.ItDC_Remark.value; var test_num = Numfilter.test(ItDC_Amt);
 if(ItDC_YN==''){alert("Please select option(yes/no) in datacard submitted clearance.");  return false; }
 //if(ItDC_YN!='' && ItDC_YN=='N' && ItDC_Amt=='' && ItDC_Remark==''){alert("please enter datacard submitted recovery amount & remark"); return false;}
 //if(ItDC_YN!='' && ItDC_YN=='N' && ItDC_Amt==''){alert("please enter datacard submitted recovery amount"); return false;}
 if(ItDC_YN=='N' && test_num==false && ItDC_Amt!=''){alert('Please enter only number in datacard submitted amount field'); return false; }	
 if(ItDC_YN!='' && ItDC_YN=='N' && ItDC_Remark==''){alert("please enter datacard submitted remark"); return false;}

 var ItEAB_YN = formname.ItEAB_YN.value; var ItEAB_Amt = formname.ItEAB_Amt.value; 
 var ItEAB_Remark = formname.ItEAB_Remark.value; var test_num = Numfilter.test(ItEAB_Amt);
 if(ItEAB_YN==''){alert("Please select option(yes/no) in email account blocked clearance.");  return false; }
 //if(ItEAB_YN!='' && ItEAB_YN=='N' && ItEAB_Amt=='' && ItEAB_Remark==''){alert("please enter email account blocked recovery amount & remark"); return false;}
 //if(ItEAB_YN!='' && ItEAB_YN=='N' && ItEAB_Amt==''){alert("please enter email account blocked recovery amount"); return false;}
 if(ItEAB_YN=='N' && test_num==false && ItEAB_Amt!=''){alert('Please enter only number in email account blocked amount field'); return false; }	
 if(ItEAB_YN!='' && ItEAB_YN=='N' && ItEAB_Remark==''){alert("please enter email account blocked remark"); return false;}
 
 var ItMND_YN = formname.ItMND_YN.value; var ItMND_Amt = formname.ItMND_Amt.value; 
 var ItMND_Remark = formname.ItMND_Remark.value; var test_num = Numfilter.test(ItMND_Amt);
 if(ItMND_YN==''){alert("Please select option(yes/no) in mobile number disabled clearance.");  return false; }
 //if(ItMND_YN!='' && ItMND_YN=='N' && ItMND_Amt=='' && ItMND_Remark==''){alert("please enter mobile number disabled recovery amount & remark"); return false;}
 //if(ItMND_YN!='' && ItMND_YN=='N' && ItMND_Amt==''){alert("please enter mobile number disabled recovery amount"); return false;}
 if(ItMND_YN=='N' && test_num==false && ItMND_Amt!=''){alert('Please enter only number in mobile number disabled amount field'); return false; }	
 if(ItMND_YN!='' && ItMND_YN=='N' && ItMND_Remark==''){alert("please enter mobile number disabled remark"); return false;}
 
 var ItAO_Txt8 = formname.ItAO_Txt8.value; var ItAO_YN8 = formname.ItAO_YN8.value; var ItAO_Amt8 = formname.ItAO_Amt8.value; 
 var ItAO_Remark8 = formname.ItAO_Remark8.value; var ItAO_num8 = Numfilter.test(ItAO_Amt8);
 if(ItAO_Txt8!='' || ItAO_YN8!='')
 {
  if(ItAO_Txt8==''){alert("Please enter particular 8 name.");  return false; }
  if(ItAO_YN8==''){alert("Please select option(yes/no) in particular 8 clearance.");  return false; }
  //if(ItAO_YN8!='' && ItAO_YN8=='N' && ItAO_Amt8=='' && ItAO_Remark8==''){alert("please enter particular 8 recovery amount & remark"); return false;}
  //if(ItAO_YN8!='' && ItAO_YN8=='N' && ItAO_Amt8==''){alert("please enter particular 8 recovery amount"); return false;}
  if(ItAO_YN8=='N' && ItAO_num8==false && ItAO_Amt8!=''){alert('Please enter only number in particular 8 amount field'); return false; }	
  if(ItAO_YN8!='' && ItAO_YN8=='N' && ItAO_Remark8==''){alert("please enter particular 8 remark"); return false;}
 }
 
 var ItAO_Txt9 = formname.ItAO_Txt9.value; var ItAO_YN9 = formname.ItAO_YN9.value; var ItAO_Amt9 = formname.ItAO_Amt9.value; 
 var ItAO_Remark9 = formname.ItAO_Remark9.value; var ItAO_num9 = Numfilter.test(ItAO_Amt9);
 if(ItAO_Txt9!='' || ItAO_YN9!='')
 {
  if(ItAO_Txt9==''){alert("Please enter particular 9 name.");  return false; }
  if(ItAO_YN9==''){alert("Please select option(yes/no) in particular 9 clearance.");  return false; }
  //if(ItAO_YN9!='' && ItAO_YN9=='N' && ItAO_Amt9=='' && ItAO_Remark9==''){alert("please enter particular 9 recovery amount & remark"); return false;}
  //if(ItAO_YN9!='' && ItAO_YN9=='N' && ItAO_Amt9==''){alert("please enter particular 9 recovery amount"); return false;}
  if(ItAO_YN9=='N' && ItAO_num9==false && ItAO_Amt9!=''){alert('Please enter only number in particular 9 amount field'); return false; }	
  if(ItAO_YN9!='' && ItAO_YN9=='N' && ItAO_Remark9==''){alert("please enter particular 9 remark"); return false;}
 } 
 
 var ItAO_Txt10 = formname.ItAO_Txt10.value; var ItAO_YN10 = formname.ItAO_YN10.value; var ItAO_Amt10 = formname.ItAO_Amt10.value; 
 var ItAO_Remark10 = formname.ItAO_Remark10.value; var ItAO_num10 = Numfilter.test(ItAO_Amt10);
 if(ItAO_Txt10!='' || ItAO_YN10!='')
 {
  if(ItAO_Txt10==''){alert("Please enter particular 10 name.");  return false; }
  if(ItAO_YN10==''){alert("Please select option(yes/no) in particular 10 clearance.");  return false; }
  //if(ItAO_YN10!='' && ItAO_YN10=='N' && ItAO_Amt10=='' && ItAO_Remark10==''){alert("please enter particular 10 recovery amount & remark"); return false;}
  //if(ItAO_YN10!='' && ItAO_YN10=='N' && ItAO_Amt10==''){alert("please enter particular 10 recovery amount"); return false;}
  if(ItAO_YN10=='N' && ItAO_num10==false && ItAO_Amt10!=''){alert('Please enter only number in particular 10 amount field'); return false; }	
  if(ItAO_YN10!='' && ItAO_YN10=='N' && ItAO_Remark10==''){alert("please enter particular 10 remark"); return false;}
 } 
 
 var ItAO_Txt11 = formname.ItAO_Txt11.value; var ItAO_YN11 = formname.ItAO_YN11.value; var ItAO_Amt11 = formname.ItAO_Amt11.value; 
 var ItAO_Remark11 = formname.ItAO_Remark11.value; var ItAO_num11 = Numfilter.test(ItAO_Amt11);
 if(ItAO_Txt11!='' || ItAO_YN11!='')
 {
  if(ItAO_Txt11==''){alert("Please enter particular 11 name.");  return false; }
  if(ItAO_YN11==''){alert("Please select option(yes/no) in particular 11 clearance.");  return false; }
  //if(ItAO_YN11!='' && ItAO_YN11=='N' && ItAO_Amt11=='' && ItAO_Remark11==''){alert("please enter particular 11 recovery amount & remark"); return false;}
  //if(ItAO_YN11!='' && ItAO_YN11=='N' && ItAO_Amt11==''){alert("please enter particular 11 recovery amount"); return false;}
  if(ItAO_YN11=='N' && ItAO_num11==false && ItAO_Amt11!=''){alert('Please enter only number in particular 11 amount field'); return false; }	
  if(ItAO_YN11!='' && ItAO_YN11=='N' && ItAO_Remark11==''){alert("please enter particular 11 remark"); return false;}
 }
 
 var ItAO_Txt12 = formname.ItAO_Txt12.value; var ItAO_YN12 = formname.ItAO_YN12.value; var ItAO_Amt12 = formname.ItAO_Amt12.value; 
 var ItAO_Remark12 = formname.ItAO_Remark12.value; var ItAO_num12 = Numfilter.test(ItAO_Amt12);
 if(ItAO_Txt12!='' || ItAO_YN12!='')
 {
  if(ItAO_Txt12==''){alert("Please enter particular 12 name.");  return false; }
  if(ItAO_YN12==''){alert("Please select option(yes/no) in particular 12 clearance.");  return false; }
  //if(ItAO_YN12!='' && ItAO_YN12=='N' && ItAO_Amt12=='' && ItAO_Remark12==''){alert("please enter particular 12 recovery amount & remark"); return false;}
  //if(ItAO_YN12!='' && ItAO_YN12=='N' && ItAO_Amt12==''){alert("please enter particular 12 recovery amount"); return false;}
  if(ItAO_YN12=='N' && ItAO_num12==false && ItAO_Amt12!=''){alert('Please enter only number in particular 12 amount field'); return false; }	
  if(ItAO_YN12!='' && ItAO_YN12=='N' && ItAO_Remark12==''){alert("please enter particular 12 remark"); return false;}
 }
 
 var ItAO_Txt13 = formname.ItAO_Txt13.value; var ItAO_YN13 = formname.ItAO_YN13.value; var ItAO_Amt13 = formname.ItAO_Amt13.value; 
 var ItAO_Remark13 = formname.ItAO_Remark13.value; var ItAO_num13 = Numfilter.test(ItAO_Amt13);
 if(ItAO_Txt13!='' || ItAO_YN13!='')
 {
  if(ItAO_Txt13==''){alert("Please enter particular 13 name.");  return false; }
  if(ItAO_YN13==''){alert("Please select option(yes/no) in particular 13 clearance.");  return false; }
  //if(ItAO_YN13!='' && ItAO_YN13=='N' && ItAO_Amt13=='' && ItAO_Remark13==''){alert("please enter particular 13 recovery amount & remark"); return false;}
  //if(ItAO_YN13!='' && ItAO_YN13=='N' && ItAO_Amt13==''){alert("please enter particular 13 recovery amount"); return false;}
  if(ItAO_YN13=='N' && ItAO_num13==false && ItAO_Amt13!=''){alert('Please enter only number in particular 13 amount field'); return false; }	
  if(ItAO_YN13!='' && ItAO_YN13=='N' && ItAO_Remark13==''){alert("please enter particular 13 remark"); return false;}
 }
 
 var ItAO_Txt14 = formname.ItAO_Txt14.value; var ItAO_YN14 = formname.ItAO_YN14.value; var ItAO_Amt14 = formname.ItAO_Amt14.value; 
 var ItAO_Remark14 = formname.ItAO_Remark14.value; var ItAO_num14 = Numfilter.test(ItAO_Amt14);
 if(ItAO_Txt14!='' || ItAO_YN14!='')
 {
  if(ItAO_Txt14==''){alert("Please enter particular 14 name.");  return false; }
  if(ItAO_YN14==''){alert("Please select option(yes/no) in particular 14 clearance.");  return false; }
  //if(ItAO_YN14!='' && ItAO_YN14=='N' && ItAO_Amt14=='' && ItAO_Remark14==''){alert("please enter particular 14 recovery amount & remark"); return false;}
  //if(ItAO_YN14!='' && ItAO_YN14=='N' && ItAO_Amt14==''){alert("please enter particular 14 recovery amount"); return false;}
  if(ItAO_YN14=='N' && ItAO_num14==false && ItAO_Amt14!=''){alert('Please enter only number in particular 14 amount field'); return false; }	
  if(ItAO_YN14!='' && ItAO_YN14=='N' && ItAO_Remark14==''){alert("please enter particular 14 remark"); return false;}
 }
 
 var ItAO_Txt15 = formname.ItAO_Txt15.value; var ItAO_YN15 = formname.ItAO_YN15.value; var ItAO_Amt15 = formname.ItAO_Amt15.value; 
 var ItAO_Remark15 = formname.ItAO_Remark15.value; var ItAO_num15 = Numfilter.test(ItAO_Amt15);
 if(ItAO_Txt15!='' || ItAO_YN15!='')
 {
  if(ItAO_Txt15==''){alert("Please enter particular 15 name.");  return false; }
  if(ItAO_YN15==''){alert("Please select option(yes/no) in particular 15 clearance.");  return false; }
  //if(ItAO_YN15!='' && ItAO_YN15=='N' && ItAO_Amt15=='' && ItAO_Remark15==''){alert("please enter particular 15 recovery amount & remark"); return false;}
  //if(ItAO_YN15!='' && ItAO_YN15=='N' && ItAO_Amt15==''){alert("please enter particular 15 recovery amount"); return false;}
  if(ItAO_YN15=='N' && ItAO_num15==false && ItAO_Amt15!=''){alert('Please enter only number in particular 15 amount field'); return false; }	
  if(ItAO_YN15!='' && ItAO_YN15=='N' && ItAO_Remark15==''){alert("please enter particular 15 remark"); return false;}
 }
 
 var ItSS_t = parseFloat(document.getElementById("ItSS_Amt").value); var ItCHS_t = parseFloat(document.getElementById("ItCHS_Amt").value);
 var ItLDH_t = parseFloat(document.getElementById("ItLDH_Amt").value); var ItCS_t = parseFloat(document.getElementById("ItCS_Amt").value);
 var ItDC_t = parseFloat(document.getElementById("ItDC_Amt").value); var ItEAB_t = parseFloat(document.getElementById("ItEAB_Amt").value);
 var ItMND_t = parseFloat(document.getElementById("ItMND_Amt").value); 
 var ItAO_8t = parseFloat(document.getElementById("ItAO_Amt8").value); var ItAO_9t = parseFloat(document.getElementById("ItAO_Amt9").value);
 var ItAO_10t = parseFloat(document.getElementById("ItAO_Amt10").value); var ItAO_11t = parseFloat(document.getElementById("ItAO_Amt11").value);
 var ItAO_12t = parseFloat(document.getElementById("ItAO_Amt12").value); var ItAO_13t = parseFloat(document.getElementById("ItAO_Amt13").value);
 var ItAO_14t = parseFloat(document.getElementById("ItAO_Amt14").value); var ItAO_15t = parseFloat(document.getElementById("ItAO_Amt15").value);
 var TotAmt = document.getElementById("TotAmt").value=Math.round((ItSS_t+ItCHS_t+ItLDH_t+ItCS_t+ItDC_t+ItEAB_t+ItMND_t+ItAO_8t+ItAO_9t+ItAO_10t+ItAO_11t+ItAO_12t+ItAO_13t+ItAO_14t+ItAO_15t)*100)/100; 
  var agree=confirm("Are you sure..?");
  if(agree){ return true; }else{ return false; }
}

function FunResendIt(si)
{ var Ename=document.getElementById("Ename").value; var agree=confirm("Are you sure, you want resend form to IT.");
  if(agree)
  { window.location="SepItClearForm.php?act=act&action=ItResend&v=v&ss=vty&v=v&ss=vty&cc=it@~t~1212&p=value&a=app&true=false&si="+si+"&En="+Ename;  }
}

function FunApprovedIt(si)
{ var Ename=document.getElementById("Ename").value; var agree=confirm("Are you sure, you want approve NOC form to IT.");
  if(agree) 
  { window.location="SepItClearForm.php?act=act&action=ItApproved&v=v&ss=vty&v=v&ss=vty&cc=it@~t~1212&p=value&a=app&true=false&si="+si+"&En="+Ename;  }
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
$sqlE=mysql_query("select EmpCode,Fname,Sname,Lname,DesigId,DepartmentId,DR,Gender,Married from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee.EmployeeID=".$resSE['EmployeeID'], $con); $resE=mysql_fetch_assoc($sqlE); 
$sqlDept=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$resE['DepartmentId'], $con); $resDept=mysql_fetch_assoc($sqlDept);
if($resE['DR']=='Y'){$M='Dr.';} elseif($resE['Gender']=='M'){$M='Mr.';} elseif($resE['Gender']=='F' AND $resE['Married']=='Y'){$M='Mrs.';} elseif($resE['Gender']=='F' AND $resE['Married']=='N'){$M='Miss.';}  $NameE=$M.' '.$resE['Fname'].' '.$resE['Sname'].' '.$resE['Lname']; 

$sqlNoc=mysql_query("select * from hrm_employee_separation_nocit where EmpSepId=".$_REQUEST['si'], $con); 
$rowNoc=mysql_num_rows($sqlNoc); if($rowNoc>0){$res=mysql_fetch_assoc($sqlNoc);}
?>	
<form enctype="multipart/form-data" name="formname" method="post" onSubmit="return validate(this)">
<table border="0">
 <tr>
<?php /*************************************** It *****************************************************/ ?>  
<td style="display:;width:790px;"> <?php //if($_REQUEST['Dept']=='Ad'){echo 'block';}else{echo 'block';}?>
 <table border="0" cellpadding="0">
  <tr><td>&nbsp;</td><td class="Text" style="">&nbsp;<b>EC :&nbsp;<?php echo $resE['EmpCode']; ?>/&nbsp;&nbsp;Name :&nbsp;<?php echo $NameE; ?></b></td></tr>
  <tr><td>&nbsp;</td><td class="Text2" style="color:#006200;" align="center"><b>IT CLEARANCE FORM</b></td></tr>
  <tr>
   <td style="width:30px;">&nbsp;</td>
   <td>
    <table border="1" style="width:810px; ">
	  <tr bgcolor="#7a6189">
       <td class="Text" style="width:30px;color:#FFFFFF;" align="center"><b>Sn</b></td>
       <td class="Text" style="width:230px;color:#FFFFFF;" align="center"><b>Particular</b></td>
	   <td class="Text" style="width:100px;color:#FFFFFF;" align="center"><b>NA /Yes /No</b></td>
	   <td class="Text" style="width:80px;color:#FFFFFF;" align="center" valign="top"><b>Recovery Amount</b></td>
	   <td class="Text" style="width:320px;color:#FFFFFF;" align="center"><b>Remark</b></td>
     </tr>
	 <tr><td colspan="5" class="Text" style="width:760px;background-color:#FFFFFF;" align="">&nbsp;<b>Assets Submission</b></td></tr>
	 <tr bgcolor="#FFFFFF">
       <td class="Text" style="width:30px;" align="center">1<input type="hidden" id="si" name="si" value="<?php echo $_REQUEST['si']; ?>" />
       <input type="hidden" id="ei" name="ei" value="<?php echo $_REQUEST['ei']; ?>" /><input type="hidden" id="TotAmt" name="TotAmt" value="<?php echo $res['TotItAmt']; ?>" />
	   <input type="hidden" name="Ename" id="Ename" value="<?php echo $NameE; ?>" /></td>
       <td class="Text" style="width:230px;" align="">&nbsp;Sim Submitted</td>
	   <td class="Text" style="width:150px;" align="center" valign="top">
	    NA<input type="checkbox" id="ItSS_A" onClick="FunSS('A')" <?php if($res['ItSS']=='A'){echo 'checked';} ?>/>
	    Yes<input type="checkbox" id="ItSS_Y" onClick="FunSS('Y')" <?php if($res['ItSS']=='Y'){echo 'checked';} ?>/>
		No<input type="checkbox" id="ItSS_N" onClick="FunSS('N')" <?php if($res['ItSS']=='N'){echo 'checked';} ?>/>
		<input type="hidden" id="ItSS_YN" name="ItSS_YN" value="<?php echo $res['ItSS']; ?>" />
	   </td>
	   <td class="Text" style="width:80px;" align="center" valign="top"> 
	    <input style="width:78px;background-color:#EAEAEA;text-align:right;" id="ItSS_Amt" name="ItSS_Amt" value="<?php if($res['ItSS_Amt']>0){echo intval($res['ItSS_Amt']);}else{echo 0;} ?>" readonly/>
	   </td>
	   <td class="Text" style="width:320px;" align="center" valign="top">
	    <input id="ItSS_Remark" name="ItSS_Remark" style="width:318px;" value="<?php echo $res['ItSS_Remark'] ?>" />
	   </td>
     </tr> 
	 <tr bgcolor="#FFFFFF">
       <td class="Text" style="width:30px;" align="center">2</td>
       <td class="Text" style="width:230px;" align="">&nbsp;Company Handset Submitted</td>
	   <td class="Text" style="width:150px;" align="center" valign="top">
	    NA<input type="checkbox" id="ItCHS_A" onClick="FunCHS('A')" <?php if($res['ItCHS']=='A'){echo 'checked';} ?>/>
	    Yes<input type="checkbox" id="ItCHS_Y" onClick="FunCHS('Y')" <?php if($res['ItCHS']=='Y'){echo 'checked';} ?>/>
		No<input type="checkbox" id="ItCHS_N" onClick="FunCHS('N')" <?php if($res['ItCHS']=='N'){echo 'checked';} ?>/>
		<input type="hidden" id="ItCHS_YN" name="ItCHS_YN" value="<?php echo $res['ItCHS']; ?>" />
	   </td>
	   <td class="Text" style="width:80px;" align="center" valign="top">
	    <input style="width:78px;background-color:#EAEAEA;text-align:right;" id="ItCHS_Amt" name="ItCHS_Amt" value="<?php if($res['ItCHS_Amt']>0){echo intval($res['ItCHS_Amt']);}else{echo 0;} ?>" readonly/>
	   </td>
	   <td class="Text" style="width:320px;" align="center" valign="top">
	    <input id="ItCHS_Remark" name="ItCHS_Remark" style="width:318px;" value="<?php echo $res['ItCHS_Remark'] ?>" />
	   </td>
     </tr>
	 <tr bgcolor="#FFFFFF">
       <td class="Text" style="width:30px;" align="center">3</td>
       <td class="Text" style="width:230px;" align="">&nbsp;Laptop/ Desktop Handover</td>
	   <td class="Text" style="width:100px;" align="center" valign="top">
	   NA<input type="checkbox" id="ItLDH_A" onClick="FunLDH('A')" <?php if($res['ItLDH']=='A'){echo 'checked';} ?>/>
	    Yes<input type="checkbox" id="ItLDH_Y" onClick="FunLDH('Y')" <?php if($res['ItLDH']=='Y'){echo 'checked';} ?>/>
		No<input type="checkbox" id="ItLDH_N" onClick="FunLDH('N')" <?php if($res['ItLDH']=='N'){echo 'checked';} ?>/>
		<input type="hidden" id="ItLDH_YN" name="ItLDH_YN" value="<?php echo $res['ItLDH']; ?>" />
	   </td>
	   <td class="Text" style="width:80px;" align="center" valign="top">
	    <input style="width:78px;background-color:#EAEAEA;text-align:right;" id="ItLDH_Amt" name="ItLDH_Amt" value="<?php if($res['ItLDH_Amt']>0){echo intval($res['ItLDH_Amt']);}else{echo 0;} ?>" readonly/>
	   </td>
	   <td class="Text" style="width:320px;" align="center" valign="top">
	    <input id="ItLDH_Remark" name="ItLDH_Remark" style="width:318px;" value="<?php echo $res['ItLDH_Remark'] ?>" />
	   </td>
     </tr> 
	 <tr bgcolor="#FFFFFF"> 
       <td class="Text" style="width:30px;" align="center">4</td>
       <td class="Text" style="width:230px;" align="">&nbsp;Camera Submitted</td>
	   <td class="Text" style="width:100px;" align="center" valign="top">
	   NA<input type="checkbox" id="ItCS_A" onClick="FunCS('A')" <?php if($res['ItCH']=='A'){echo 'checked';} ?>/>
	    Yes<input type="checkbox" id="ItCS_Y" onClick="FunCS('Y')" <?php if($res['ItCS']=='Y'){echo 'checked';} ?>/>
		No<input type="checkbox" id="ItCS_N" onClick="FunCS('N')" <?php if($res['ItCS']=='N'){echo 'checked';} ?>/>
		<input type="hidden" id="ItCS_YN" name="ItCS_YN" value="<?php echo $res['ItCS']; ?>" />
	   </td>
	   <td class="Text" style="width:80px;" align="center" valign="top">
	    <input style="width:78px;background-color:#EAEAEA;text-align:right;" id="ItCS_Amt" name="ItCS_Amt" value="<?php if($res['ItCS_Amt']>0){echo intval($res['ItCS_Amt']);}else{echo 0;} ?>" readonly/>
	   </td>
	   <td class="Text" style="width:320px;" align="center" valign="top">
	    <input id="ItCS_Remark" name="ItCS_Remark" style="width:318px;" value="<?php echo $res['ItCS_Remark'] ?>" />
	   </td>
     </tr>
	  <tr bgcolor="#FFFFFF">
       <td class="Text" style="width:30px;" align="center">5</td>
       <td class="Text" style="width:230px;" align="">&nbsp;Datacard Submitted</td>
	   <td class="Text" style="width:100px;" align="center" valign="top">
	   NA<input type="checkbox" id="ItDC_A" onClick="FunDC('A')" <?php if($res['ItDC']=='A'){echo 'checked';} ?>/>
	    Yes<input type="checkbox" id="ItDC_Y" onClick="FunDC('Y')" <?php if($res['ItDC']=='Y'){echo 'checked';} ?>/>
		No<input type="checkbox" id="ItDC_N" onClick="FunDC('N')" <?php if($res['ItDC']=='N'){echo 'checked';} ?>/>
		<input type="hidden" id="ItDC_YN" name="ItDC_YN" value="<?php echo $res['ItDC']; ?>" />
	   </td>
	   <td class="Text" style="width:80px;" align="center" valign="top">
	    <input style="width:78px;background-color:#EAEAEA;text-align:right;" id="ItDC_Amt" name="ItDC_Amt" value="<?php if($res['ItDC_Amt']>0){echo intval($res['ItDC_Amt']);}else{echo 0;} ?>" readonly/>
	   </td>
	   <td class="Text" style="width:320px;" align="center" valign="top">
	    <input id="ItDC_Remark" name="ItDC_Remark" style="width:318px;" value="<?php echo $res['ItDC_Remark'] ?>" />
	   </td>
     </tr>
	  <tr><td colspan="5" class="Text" style="width:760px;background-color:#FFFFFF;" align="">&nbsp;<b>ID's/ Passwords</b></td></tr>
	  <tr bgcolor="#FFFFFF"> 
       <td class="Text" style="width:30px;" align="center">6</td>
       <td class="Text" style="width:230px;" align="">&nbsp;Email Account Blocked</td>
	   <td class="Text" style="width:100px;" align="center" valign="top">
	   NA<input type="checkbox" id="ItEAB_A" onClick="FunEAB('A')" <?php if($res['ItEAB']=='A'){echo 'checked';} ?>/>
	    Yes<input type="checkbox" id="ItEAB_Y" onClick="FunEAB('Y')" <?php if($res['ItEAB']=='Y'){echo 'checked';} ?>/>
		No<input type="checkbox" id="ItEAB_N" onClick="FunEAB('N')" <?php if($res['ItEAB']=='N'){echo 'checked';} ?>/>
		<input type="hidden" id="ItEAB_YN" name="ItEAB_YN" value="<?php echo $res['ItEAB']; ?>" />
	   </td>
	   <td class="Text" style="width:80px;" align="center" valign="top">
	    <input style="width:78px;background-color:#EAEAEA;text-align:right;" id="ItEAB_Amt" name="ItEAB_Amt" value="<?php if($res['ItEAB_Amt']>0){echo intval($res['ItEAB_Amt']);}else{echo 0;} ?>" readonly/>
	   </td>
	   <td class="Text" style="width:320px;" align="center" valign="top">
	    <input id="ItEAB_Remark" name="ItEAB_Remark" style="width:318px;" value="<?php echo $res['ItEAB_Remark'] ?>" />
	   </td>
     </tr> 
	  <tr bgcolor="#FFFFFF"> 
       <td class="Text" style="width:30px;" align="center">7</td>
       <td class="Text" style="width:230px;" align="">&nbsp;Mobile Number Disabled/ Transfered</td>
	   <td class="Text" style="width:100px;" align="center" valign="top">
	   NA<input type="checkbox" id="ItMND_A" onClick="FunMND('A')" <?php if($res['ItMND']=='A'){echo 'checked';} ?>/>
	    Yes<input type="checkbox" id="ItMND_Y" onClick="FunMND('Y')" <?php if($res['ItMND']=='Y'){echo 'checked';} ?>/>
		No<input type="checkbox" id="ItMND_N" onClick="FunMND('N')" <?php if($res['ItMND']=='N'){echo 'checked';} ?>/>
		<input type="hidden" id="ItMND_YN" name="ItMND_YN" value="<?php echo $res['ItMND']; ?>" />
	   </td>
	   <td class="Text" style="width:80px;" align="center" valign="top">
	    <input style="width:78px;background-color:#EAEAEA;text-align:right;" id="ItMND_Amt" name="ItMND_Amt" value="<?php if($res['ItMND_Amt']>0){echo intval($res['ItMND_Amt']);}else{echo 0;} ?>" readonly/>
	   </td>
	   <td class="Text" style="width:320px;" align="center" valign="top">
	    <input id="ItMND_Remark" name="ItMND_Remark" style="width:318px;" value="<?php echo $res['ItMND_Remark'] ?>" />
	   </td>
     </tr>
	</table>
   </td>
  </tr>
<?php for($i=8; $i<=15; $i++) { ?>  
  <tr>
   <td style="width:30px;display:<?php if($res['ItAO_Txt'.$i]!=''){echo 'block';}else{echo 'none';}?>;" id="img<?php echo $i; ?>" align="center" align="center">
   <img src="images/Addnew.png" border="0" id="addImg<?php echo $i; ?>" style="display:<?php if($res['ItAO_Txt'.$i]!=''){echo 'none';}else{echo 'block';}?>;" id="img<?php echo $i; ?>" onClick="ShowRowIt(<?php echo $i; ?>)"/>
   <img src="images/Minusnew.png" id="minusImg<?php echo $i; ?>" style="display:none;" border="0" onClick="HideRowIt(<?php echo $i; ?>)"/>
   </td>
   <td>
    <table style="width:810px;display:<?php if($res['ItAO_Txt'.$i]!=''){echo 'block';}else{echo 'none';}?>;" id="Row<?php echo $i; ?>" border="1" cellspacing="0">
	  <tr bgcolor="#FFFFFF"> 
       <td class="Text" style="width:38px;" align="center"><?php echo $i; ?></td>
       <td class="Text" style="width:202px;" align="" valign="top">
	   <input style="width:202px;" id="ItAO_Txt<?php echo $i; ?>" name="ItAO_Txt<?php echo $i; ?>" value="<?php echo $res['ItAO_Txt'.$i]; ?>"/>
	   </td>
	   <td class="Text" style="width:170px;" align="center" valign="top">
	    NA<input type="checkbox" id="ItAO_A<?php echo $i; ?>" onClick="FunItAO(<?php echo $i; ?>,'A')" <?php if($res['ItAO'.$i]=='A'){echo 'checked';} ?>/>
	    Yes<input type="checkbox" id="ItAO_Y<?php echo $i; ?>" onClick="FunItAO(<?php echo $i; ?>,'Y')" <?php if($res['ItAO'.$i]=='Y'){echo 'checked';} ?>/>
		No<input type="checkbox" id="ItAO_N<?php echo $i; ?>" onClick="FunItAO(<?php echo $i; ?>,'N')" <?php if($res['ItAO'.$i]=='N'){echo 'checked';} ?>/>
		<input type="hidden" id="ItAO_YN<?php echo $i; ?>" name="ItAO_YN<?php echo $i; ?>" value="<?php echo $res['ItAO'.$i]; ?>" />
	   </td>
	   <td class="Text" style="width:80px;" align="center" valign="top">
	    <input style="width:80px;background-color:#EAEAEA;text-align:right;" id="ItAO_Amt<?php echo $i; ?>" name="ItAO_Amt<?php echo $i; ?>" value="<?php echo $res['ItAO_Amt'.$i]; ?>" readonly/>
	   </td>
	   <td class="Text" style="width:325px;" align="center" valign="top">
	    <input id="ItAO_Remark<?php echo $i; ?>" name="ItAO_Remark<?php echo $i; ?>" style="width:321px;" value="<?php echo $res['ItAO_Remark'.$i] ?>" />
	   </td>
     </tr>
	</table>
   </td>
  </tr>
<?php } ?> 
  <tr>
   <td style="width:30px;" align="center" align="center"></td>
   <td>
    <table style="width:810px;" border="1" cellspacing="0">
	  <tr bgcolor="#FFFFFF"> 
       <td colspan="2" class="Text" style="width:247px;">&nbsp;<b>Any Other Remark</b></td>
	   <td colspan="3" class="Text" style="width:518px;" align="center" valign="top">
	    <input id="ItOth_Remark" name="ItOth_Remark" style="width:514px;" value="<?php echo $res['ItOth_Remark']; ?>" maxlength="190" />
	   </td> 
     </tr>
	</table>
   </td>
  </tr>
  <tr>
  <td>&nbsp;</td>
  <td colspan="5" align="Right" class="fontButton">
  <table>
    <tr>
	  <td><font size="3" color="#D7FFD7"><b><?php echo $msg.'&nbsp;'; ?></b></font>&nbsp;
	  
	  <?php if($rowNoc>0){ ?>
      <font color="#FFFFA6">Save Date:</font>&nbsp;
      <font style="color:#FFF;"><?=date("d-m-Y",strtotime($res['NocSubmitDate']));?></font><?php } ?>
      &nbsp;&nbsp;
	  
	  </td>
	  <td><font size="3" color="#D7FFD7"><?php if($resSE['HR_ItNocConf']=='Y'){ echo "HR Approved"; } ?>&nbsp;</td>
      <td><?php if($resSE['IT_NOC']=='N') { ?>
	  <input type="submit" id="submitItNoc" name="submitItNoc" style="background-color:#FFCAFF;display:block;width:80px;" value="save"/><?php } ?></td>
	  <?php if($resSE['IT_NOC']=='Y' AND $resSE['HR_ItNocConf']=='N') { ?>
	  <td><input type="button" id="ResendIt" value="send back" style="background-color:#FFCAFF;display:block;width:80px;" onClick="FunResendIt(<?php echo $_REQUEST['si']; ?>)"/></td>
	 <td><input type="button" id="ApproveIt" value="approved" style="background-color:#FFCAFF;display:block;width:80px;" onClick="FunApprovedIt(<?php echo $_REQUEST['si']; ?>)"/></td>
	  <?php } ?>
     <td><input type="button" name="Refrash" id="Refrash" value="refresh" style="background-color:#FFCAFF;" onClick="javascript:window.location='SepItClearForm.php?act=act&v=v&ss=vty&cc=it@~t~1212&p=value&a=app&true=false&si=<?php echo $_REQUEST['si']; ?>'" style="display:block;"/></td>
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
