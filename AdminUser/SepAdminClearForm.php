<?php require_once('../AdminUser/config/config.php'); 
if(isset($_POST['submitAdminNoc']))
{ 
  $search =  '!"#$%&/\'-:_' ; $search = str_split($search);
  $AdminIC_R=str_replace($search, "", $_POST['AdminIC_Remark']); $AdminVC_R=str_replace($search, "", $_POST['AdminVC_Remark']);
  $AOTxt3=''; $AOTxt4=''; $AOTxt5=''; $AOTxt6=''; $AOTxt7=''; $AOTxt8=''; $AOTxt9=''; $AOTxt10=''; 
  $AOR3=''; $AOR4=''; $AOR5=''; $AOR6=''; $AOR7=''; $AOR8=''; $AOR9=''; $AOR10=''; 
  
  if($_POST['AdminAO_Txt3']!=''){$AOTxt3=str_replace($search, "", $_POST['AdminAO_Txt3']);}
  if($_POST['AdminAO_Txt4']!=''){$AOTxt4=str_replace($search, "", $_POST['AdminAO_Txt4']);}
  if($_POST['AdminAO_Txt5']!=''){$AOTxt5=str_replace($search, "", $_POST['AdminAO_Txt5']);}
  if($_POST['AdminAO_Txt6']!=''){$AOTxt6=str_replace($search, "", $_POST['AdminAO_Txt6']);}
  if($_POST['AdminAO_Txt7']!=''){$AOTxt7=str_replace($search, "", $_POST['AdminAO_Txt7']);}
  if($_POST['AdminAO_Txt8']!=''){$AOTxt8=str_replace($search, "", $_POST['AdminAO_Txt8']);}
  if($_POST['AdminAO_Txt9']!=''){$AOTxt9=str_replace($search, "", $_POST['AdminAO_Txt9']);}
  if($_POST['AdminAO_Txt10']!=''){$AOTxt10=str_replace($search, "", $_POST['AdminAO_Txt10']);}
  
  if($_POST['AdminAO_Remark3']!=''){$AOR3=str_replace($search, "", $_POST['AdminAO_Remark3']);}
  if($_POST['AdminAO_Remark4']!=''){$AOR4=str_replace($search, "", $_POST['AdminAO_Remark4']);}
  if($_POST['AdminAO_Remark5']!=''){$AOR5=str_replace($search, "", $_POST['AdminAO_Remark5']);}
  if($_POST['AdminAO_Remark6']!=''){$AOR6=str_replace($search, "", $_POST['AdminAO_Remark6']);}
  if($_POST['AdminAO_Remark7']!=''){$AOR7=str_replace($search, "", $_POST['AdminAO_Remark7']);}
  if($_POST['AdminAO_Remark8']!=''){$AOR8=str_replace($search, "", $_POST['AdminAO_Remark8']);}
  if($_POST['AdminAO_Remark9']!=''){$AOR9=str_replace($search, "", $_POST['AdminAO_Remark9']);}
  if($_POST['AdminAO_Remark10']!=''){$AOR10=str_replace($search, "", $_POST['AdminAO_Remark10']);}
  $AdminROth=''; if($_POST['AdminOth_Remark']!=''){$AdminROth=str_replace($search, "", $_POST['AdminOth_Remark']);}
 
  $sqlNoc=mysql_query("select NocAdminId from hrm_employee_separation_nocadmin where EmpSepId=".$_POST['si'], $con); $rowNoc=mysql_num_rows($sqlNoc); 
  if($rowNoc>0)
  { $sqlIns=mysql_query("update hrm_employee_separation_nocadmin set NocSubmitDate='".date("Y-m-d")."', AdminIC='".$_POST['AdminIC_YN']."', AdminIC_Amt='".$_POST['AdminIC_Amt']."', AdminIC_Remark='".$AdminIC_R."', AdminVC='".$_POST['AdminVC_YN']."', AdminVC_Amt='".$_POST['AdminVC_Amt']."', AdminVC_Remark='".$AdminVC_R."', AdminAO3='".$_POST['AdminAO_YN3']."', AdminAO_Txt3='".$AOTxt3."', AdminAO_Amt3='".$_POST['AdminAO_Amt3']."', AdminAO_Remark3='".$AOR3."', AdminAO4='".$_POST['AdminAO_YN4']."', AdminAO_Txt4='".$AOTxt4."', AdminAO_Amt4='".$_POST['AdminAO_Amt4']."', AdminAO_Remark4='".$AOR4."', AdminAO5='".$_POST['AdminAO_YN5']."', AdminAO_Txt5='".$AOTxt5."', AdminAO_Amt5='".$_POST['AdminAO_Amt5']."', AdminAO_Remark5='".$AOR5."', AdminAO6='".$_POST['AdminAO_YN6']."', AdminAO_Txt6='".$AOTxt6."', AdminAO_Amt6='".$_POST['AdminAO_Amt6']."', AdminAO_Remark6='".$AOR6."', AdminAO7='".$_POST['AdminAO_YN7']."', AdminAO_Txt7='".$AOTxt7."', AdminAO_Amt7='".$_POST['AdminAO_Amt7']."', AdminAO_Remark7='".$AOR7."', AdminAO8='".$_POST['AdminAO_YN8']."', AdminAO_Txt8='".$AOTxt8."', AdminAO_Amt8='".$_POST['AdminAO_Amt8']."', AdminAO_Remark8='".$AOR8."', AdminAO9='".$_POST['AdminAO_YN9']."', AdminAO_Txt9='".$AOTxt9."', AdminAO_Amt9='".$_POST['AdminAO_Amt9']."', AdminAO_Remark9='".$AOR9."', AdminAO10='".$_POST['AdminAO_YN10']."', AdminAO_Txt10='".$AOTxt10."', AdminAO_Amt10='".$_POST['AdminAO_Amt10']."', AdminAO_Remark10='".$AOR10."', TotAdminAmt='".$_POST['TotAmt']."', AdminOth_Remark='".$AdminROth."' where EmpSepId=".$_POST['si'], $con);} 
  else
  { $sqlIns=mysql_query("insert into hrm_employee_separation_nocadmin(EmpSepId, NocSubmitDate, AdminIC, AdminIC_Amt, AdminIC_Remark, AdminVC, AdminVC_Amt, AdminVC_Remark, AdminAO3, AdminAO_Txt3, AdminAO_Amt3, AdminAO_Remark3, AdminAO4, AdminAO_Txt4, AdminAO_Amt4, AdminAO_Remark4, AdminAO5, AdminAO_Txt5, AdminAO_Amt5, AdminAO_Remark5, AdminAO6, AdminAO_Txt6, AdminAO_Amt6, AdminAO_Remark6, AdminAO7, AdminAO_Txt7, AdminAO_Amt7, AdminAO_Remark7, AdminAO8, AdminAO_Txt8, AdminAO_Amt8, AdminAO_Remark8, AdminAO9, AdminAO_Txt9, AdminAO_Amt9, AdminAO_Remark9, AdminAO10, AdminAO_Txt10, AdminAO_Amt10, AdminAO_Remark10, TotAdminAmt, AdminOth_Remark) values(".$_POST['si'].", '".date("Y-m-d")."', '".$_POST['AdminIC_YN']."', '".$_POST['AdminIC_Amt']."', '".$AdminIC_R."', '".$_POST['AdminVC_YN']."', '".$_POST['AdminVC_Amt']."', '".$AdminVC_R."', '".$_POST['AdminAO_YN3']."', '".$AOTxt3."', '".$_POST['AdminAO_Amt3']."', '".$AOR3."', '".$_POST['AdminAO_YN4']."', '".$AOTxt4."', '".$_POST['AdminAO_Amt4']."', '".$AOR4."', '".$_POST['AdminAO_YN5']."', '".$AOTxt5."', '".$_POST['AdminAO_Amt5']."', '".$AOR5."', '".$_POST['AdminAO_YN6']."', '".$AOTxt6."', '".$_POST['AdminAO_Amt6']."', '".$AOR6."', '".$_POST['AdminAO_YN7']."', '".$AOTxt7."', '".$_POST['AdminAO_Amt7']."', '".$AOR7."', '".$_POST['AdminAO_YN8']."', '".$AOTxt8."', '".$_POST['AdminAO_Amt8']."', '".$AOR8."', '".$_POST['AdminAO_YN9']."', '".$_POST['Prtis_YN9']."', '".$AOTxt9."', '".$AOR9."', '".$_POST['AdminAO_YN10']."', '".$AOTxt10."', '".$_POST['AdminAO_Amt10']."', '".$AOR10."', '".$_POST['TotAmt']."', '".$AdminROth."')", $con); }
  
  if($sqlIns){$sqlUp=mysql_query("update hrm_employee_separation set Admin_NOC='Y' where EmpSepId=".$_POST['si'], $con);}
  if($sqlUp){ $msg='<b>data save successfully.</b>'; }
}  

if($_REQUEST['action']=='AdminResend')
{ 
  $sql=mysql_query("update hrm_employee_separation set Admin_NOC='N' where EmpSepId=".$_REQUEST['si'], $con); 
  if($sql)
  {
    $sqlAdmin=mysql_query("select Fname,Sname,Lname,EmailId_Vnr from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_separation_nocadmin ON hrm_employee_general.EmployeeID=hrm_employee_separation_nocadmin.AdminId where hrm_employee_separation_nocit.EmpSepId=".$_REQUEST['si'], $con); 
	$resAdmin=mysql_fetch_assoc($sqlAdmin); $EnameAdmin=$resAdmin['Fname'].' '.$resAdmin['Sname'].' '.$resAdmin['Lname'];
	if($resAdmin['EmailId_Vnr'])
	{
	//$email_to3 = $resAdmin['EmailId_Vnr'];
    //$email_from = 'admin@vnrseeds.co.in';
    $email_subject3 = "NOC clearance form send it back";
	//$email_txt3 = "NOC clearance form send it back";
	//$headers = "From: ".$email_from."\r\n";
	//$semi_rand = md5(time()); 
	//$headers .= "MIME-Version: 1.0\r\n";
	//$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
	$email_message3 .="HR has send it back to employee  clearance form, please check it. for details kindly log on to ESS <a href='https://www.vnrseeds.co.in'>www.vnrseeds.co.in</a>.\n\n";
	$email_message3 .="Thanks & Regards\n";
    $email_message3 .="HR\n\n";
	//$ok = @mail($email_to3, $email_subject3, $email_message3, $headers);
	
	$subject=$email_subject3;
    $body=$email_message3;
    $email_to=$resAdmin['EmailId_Vnr'];
    require 'vendor/mail_admin.php';
	
	}
    $msg='Clearance form send it back to Admin successfully';
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
function FunIC(v)
{ if(v=='Y'){document.getElementById("AdminIC_Y").checked=true;document.getElementById("AdminIC_N").checked=false;document.getElementById("AdminIC_YN").value='Y';
  document.getElementById("AdminIC_Amt").readOnly=true; document.getElementById("AdminIC_Amt").style.background='#EAEAEA';
  document.getElementById("AdminIC_Amt").value='';}
  else if(v=='N'){document.getElementById("AdminIC_Y").checked=false; document.getElementById("AdminIC_N").checked=true;document.getElementById("AdminIC_YN").value='N';
  document.getElementById("AdminIC_Amt").readOnly=true; document.getElementById("AdminIC_Amt").style.background='#EAEAEA';}
}
function FunVC(v)
{ if(v=='Y'){document.getElementById("AdminVC_Y").checked=true;document.getElementById("AdminVC_N").checked=false;document.getElementById("AdminVC_YN").value='Y';
  document.getElementById("AdminVC_Amt").readOnly=true; document.getElementById("AdminVC_Amt").style.background='#EAEAEA';
  document.getElementById("AdminVC_Amt").value='';}
  else if(v=='N'){document.getElementById("AdminVC_N").checked=true;document.getElementById("AdminVC_Y").checked=false;document.getElementById("AdminVC_YN").value='N';
  document.getElementById("AdminVC_Amt").readOnly=true; document.getElementById("AdminVC_Amt").style.background='#EAEAEA';}
}

function FunAdminAO(i,v)
{ if(v=='Y'){document.getElementById("AdminAO_Y"+i).checked=true;document.getElementById("AdminAO_N"+i).checked=false;document.getElementById("AdminAO_YN"+i).value='Y';
  document.getElementById("AdminAO_Amt"+i).readOnly=true; document.getElementById("AdminAO_Amt"+i).style.background='#EAEAEA';
  document.getElementById("AdminAO_Amt"+i).value='';}
  else if(v=='N'){document.getElementById("AdminAO_N"+i).checked=true;document.getElementById("AdminAO_Y"+i).checked=false;document.getElementById("AdminAO_YN"+i).value='N';
  document.getElementById("AdminAO_Amt"+i).readOnly=true; document.getElementById("AdminAO_Amt"+i).style.background='#EAEAEA';}
}

function ShowRowAdmin(v)
{ if(v==3){var a=v+1; var m=v}
  else if(v>3 && v<10){var a=v+1; var m=v-1;}
  else if(v==10){var a=v; var m=v-1;}
  document.getElementById("addImg"+v).style.display = 'none'; document.getElementById("minusImg"+v).style.display = 'block'; document.getElementById("Row"+v).style.display = 'block';  document.getElementById("img"+a).style.display = 'block'; 
  if(v>3){document.getElementById("minusImg"+m).style.display = 'none';} 
  if(v<10){document.getElementById("addImg"+a).style.display = 'block';}
}
function HideRowAdmin(v)
{ if(v==3){var a=v+1; var m=v}
  else if(v>3 && v<10){var a=v+1; var m=v-1;}
  else if(v==10){var a=v; var m=v-1;}
  document.getElementById("addImg"+v).style.display = 'block'; document.getElementById("minusImg"+v).style.display = 'none'; document.getElementById("Row"+v).style.display = 'none';
  if(v>3){document.getElementById("minusImg"+m).style.display = 'block';} 
  if(v<10){document.getElementById("addImg"+a).style.display = 'none';}
  document.getElementById("AdminAO_Txt"+v).value = ""; document.getElementById("AdminAO_Y"+v).checked = false; document.getElementById("AdminAO_N"+v).checked = false; 
  document.getElementById("AdminAO_YN"+v).value = "";  document.getElementById("AdminAO_Amt"+v).value = ""; document.getElementById("AdminAO_Remark"+v).value = "";
}

function validate(formname)
{ 
 var Numfilter=/^[0-9. ]+$/;
 var AdminIC_YN = formname.AdminIC_YN.value; var AdminIC_Amt = formname.AdminIC_Amt.value; 
 var AdminIC_Remark = formname.AdminIC_Remark.value; var test_num = Numfilter.test(AdminIC_Amt);
 if(AdminIC_YN==''){alert("Please select option(yes/no) in ID card clearance.");  return false; }
 //if(AdminIC_YN!='' && AdminIC_YN=='N' && AdminIC_Amt=='' && AdminIC_Remark==''){alert("please enter ID card recovery amount & remark"); return false;}
 //if(AdminIC_YN!='' && AdminIC_YN=='N' && AdminIC_Amt==''){alert("please enter ID card recovery amount"); return false;}
 if(AdminIC_YN=='N' && test_num==false && AdminIC_Amt!=''){alert('Please enter only number in ID card amount field'); return false; }	
 if(AdminIC_YN!='' && AdminIC_YN=='N' && AdminIC_Remark==''){alert("please enter ID card remark"); return false;}
 
 var AdminVC_YN = formname.AdminVC_YN.value; var AdminVC_Amt = formname.AdminVC_Amt.value; 
 var AdminVC_Remark = formname.AdminVC_Remark.value; var test_num2 = Numfilter.test(AdminVC_Amt);
 if(AdminVC_YN==''){alert("Please select option(yes/no) in visiting cards clearance.");  return false; }
// if(AdminVC_YN!='' && AdminVC_YN=='N' && AdminVC_Amt=='' && AdminVC_Remark==''){alert("please enter visiting cards recovery amount & remark"); return false;}
// if(AdminVC_YN!='' && AdminVC_YN=='N' && AdminVC_Amt==''){alert("please enter visiting cards recovery amount"); return false;}
 if(AdminVC_YN=='N' && test_num2==false && AdminVC_Amt!=''){alert('Please enter only number in visiting cards amount field'); return false; }	
 if(AdminVC_YN!='' && AdminVC_YN=='N' && AdminVC_Remark==''){alert("please enter visiting cards remark"); return false;}
 
 
 var AdminAO_Txt3 = formname.AdminAO_Txt3.value; var AdminAO_YN3 = formname.AdminAO_YN3.value; var AdminAO_Amt3 = formname.AdminAO_Amt3.value; 
 var AdminAO_Remark3 = formname.AdminAO_Remark3.value; var AdminAO_num3 = Numfilter.test(AdminAO_Amt3);
 if(AdminAO_Txt3!='' || AdminAO_YN3!='')
 {
  if(AdminAO_Txt3==''){alert("Please enter particular 3 name.");  return false; }
  if(AdminAO_YN3==''){alert("Please select option(yes/no) in particular 3 clearance.");  return false; }
 // if(AdminAO_YN3!='' && AdminAO_YN3=='N' && AdminAO_Amt3=='' && AdminAO_Remark3==''){alert("please enter particular 3 recovery amount & remark"); return false;}
  //if(AdminAO_YN3!='' && AdminAO_YN3=='N' && AdminAO_Amt3==''){alert("please enter particular 3 recovery amount"); return false;}
  if(AdminAO_YN3=='N' && AdminAO_num3==false && AdminAO_Amt3!=''){alert('Please enter only number in particular 3 amount field'); return false; }	
  if(AdminAO_YN3!='' && AdminAO_YN3=='N' && AdminAO_Remark3==''){alert("please enter particular 3 remark"); return false;}
 }
 
 var AdminAO_Txt4 = formname.AdminAO_Txt4.value; var AdminAO_YN4 = formname.AdminAO_YN4.value; var AdminAO_Amt4 = formname.AdminAO_Amt4.value; 
 var AdminAO_Remark4 = formname.AdminAO_Remark4.value; var AdminAO_num4 = Numfilter.test(AdminAO_Amt4);
 if(AdminAO_Txt4!='' || AdminAO_YN4!='')
 {
  if(AdminAO_Txt4==''){alert("Please enter particular 4 name.");  return false; }
  if(AdminAO_YN4==''){alert("Please select option(yes/no) in particular 4 clearance.");  return false; }
 //if(AdminAO_YN4!='' && AdminAO_YN4=='N' && AdminAO_Amt4=='' && AdminAO_Remark4==''){alert("please enter particular 4 recovery amount & remark"); return false;}
 //if(AdminAO_YN4!='' && AdminAO_YN4=='N' && AdminAO_Amt4==''){alert("please enter particular 4 recovery amount"); return false;}
  if(AdminAO_YN4=='N' && AdminAO_num4==false && AdminAO_Amt4!=''){alert('Please enter only number in particular 4 amount field'); return false; }	
  if(AdminAO_YN4!='' && AdminAO_YN4=='N' && AdminAO_Remark4==''){alert("please enter particular 4 remark"); return false;}
 }
 
 var AdminAO_Txt5 = formname.AdminAO_Txt5.value; var AdminAO_YN5 = formname.AdminAO_YN5.value; var AdminAO_Amt5 = formname.AdminAO_Amt5.value; 
 var AdminAO_Remark5 = formname.AdminAO_Remark5.value; var AdminAO_num5 = Numfilter.test(AdminAO_Amt5);
 if(AdminAO_Txt5!='' || AdminAO_YN5!='')
 {
  if(AdminAO_Txt5==''){alert("Please enter particular 5 name.");  return false; }
  if(AdminAO_YN5==''){alert("Please select option(yes/no) in particular 5 clearance.");  return false; }
  //if(AdminAO_YN5!='' && AdminAO_YN5=='N' && AdminAO_Amt5=='' && AdminAO_Remark5==''){alert("please enter particular 5 recovery amount & remark"); return false;}
  //if(AdminAO_YN5!='' && AdminAO_YN5=='N' && AdminAO_Amt5==''){alert("please enter particular 5 recovery amount"); return false;}
  if(AdminAO_YN5=='N' && AdminAO_num5==false && AdminAO_Amt5!=''){alert('Please enter only number in particular 5 amount field'); return false; }	
  if(AdminAO_YN5!='' && AdminAO_YN5=='N' && AdminAO_Remark5==''){alert("please enter particular 5 remark"); return false;}
 }
 
 var AdminAO_Txt6 = formname.AdminAO_Txt6.value; var AdminAO_YN6 = formname.AdminAO_YN6.value; var AdminAO_Amt6 = formname.AdminAO_Amt6.value; 
 var AdminAO_Remark6 = formname.AdminAO_Remark6.value; var AdminAO_num6 = Numfilter.test(AdminAO_Amt6);
 if(AdminAO_Txt6!='' || AdminAO_YN6!='')
 {
  if(AdminAO_Txt6==''){alert("Please enter particular 6 name.");  return false; }
  if(AdminAO_YN6==''){alert("Please select option(yes/no) in particular 6 clearance.");  return false; }
  //if(AdminAO_YN6!='' && AdminAO_YN6=='N' && AdminAO_Amt6=='' && AdminAO_Remark6==''){alert("please enter particular 6 recovery amount & remark"); return false;}
  //if(AdminAO_YN6!='' && AdminAO_YN6=='N' && AdminAO_Amt6==''){alert("please enter particular 6 recovery amount"); return false;}
  if(AdminAO_YN6=='N' && AdminAO_num6==false && AdminAO_Amt6!=''){alert('Please enter only number in particular 6 amount field'); return false; }	
  if(AdminAO_YN6!='' && AdminAO_YN6=='N' && AdminAO_Remark6==''){alert("please enter particular 6 remark"); return false;}
 }
 
 var AdminAO_Txt7 = formname.AdminAO_Txt7.value; var AdminAO_YN7 = formname.AdminAO_YN7.value; var AdminAO_Amt7 = formname.AdminAO_Amt7.value; 
 var AdminAO_Remark7 = formname.AdminAO_Remark7.value; var AdminAO_num7 = Numfilter.test(AdminAO_Amt7);
 if(AdminAO_Txt7!='' || AdminAO_YN7!='')
 {
  if(AdminAO_Txt7==''){alert("Please enter particular 7 name.");  return false; }
  if(AdminAO_YN7==''){alert("Please select option(yes/no) in particular 7 clearance.");  return false; }
  //if(AdminAO_YN7!='' && AdminAO_YN7=='N' && AdminAO_Amt7=='' && AdminAO_Remark7==''){alert("please enter particular 7 recovery amount & remark"); return false;}
  //if(AdminAO_YN7!='' && AdminAO_YN7=='N' && AdminAO_Amt7==''){alert("please enter particular 7 recovery amount"); return false;}
  if(AdminAO_YN7=='N' && AdminAO_num7==false && AdminAO_Amt7!=''){alert('Please enter only number in particular 7 amount field'); return false; }	
  if(AdminAO_YN7!='' && AdminAO_YN7=='N' && AdminAO_Remark7==''){alert("please enter particular 7 remark"); return false;}
 }
 
 var AdminAO_Txt8 = formname.AdminAO_Txt8.value; var AdminAO_YN8 = formname.AdminAO_YN8.value; var AdminAO_Amt8 = formname.AdminAO_Amt8.value; 
 var AdminAO_Remark8 = formname.AdminAO_Remark8.value; var AdminAO_num8 = Numfilter.test(AdminAO_Amt8);
 if(AdminAO_Txt8!='' || AdminAO_YN8!='')
 {
  if(AdminAO_Txt8==''){alert("Please enter particular 8 name.");  return false; }
  if(AdminAO_YN8==''){alert("Please select option(yes/no) in particular 8 clearance.");  return false; }
  //if(AdminAO_YN8!='' && AdminAO_YN8=='N' && AdminAO_Amt8=='' && AdminAO_Remark8==''){alert("please enter particular 8 recovery amount & remark"); return false;}
  //if(AdminAO_YN8!='' && AdminAO_YN8=='N' && AdminAO_Amt8==''){alert("please enter particular 8 recovery amount"); return false;}
  if(AdminAO_YN8=='N' && AdminAO_num8==false && AdminAO_Amt8!=''){alert('Please enter only number in particular 8 amount field'); return false; }	
  if(AdminAO_YN8!='' && AdminAO_YN8=='N' && AdminAO_Remark8==''){alert("please enter particular 8 remark"); return false;}
 }
 
 var AdminAO_Txt9 = formname.AdminAO_Txt9.value; var AdminAO_YN9 = formname.AdminAO_YN9.value; var AdminAO_Amt9 = formname.AdminAO_Amt9.value; 
 var AdminAO_Remark9 = formname.AdminAO_Remark9.value; var AdminAO_num9 = Numfilter.test(AdminAO_Amt9);
 if(AdminAO_Txt9!='' || AdminAO_YN9!='')
 {
  if(AdminAO_Txt9==''){alert("Please enter particular 9 name.");  return false; }
  if(AdminAO_YN9==''){alert("Please select option(yes/no) in particular 9 clearance.");  return false; }
  //if(AdminAO_YN9!='' && AdminAO_YN9=='N' && AdminAO_Amt9=='' && AdminAO_Remark9==''){alert("please enter particular 9 recovery amount & remark"); return false;}
  //if(AdminAO_YN9!='' && AdminAO_YN9=='N' && AdminAO_Amt9==''){alert("please enter particular 9 recovery amount"); return false;}
  if(AdminAO_YN9=='N' && AdminAO_num9==false && AdminAO_Amt9!=''){alert('Please enter only number in particular 9 amount field'); return false; }	
  if(AdminAO_YN9!='' && AdminAO_YN9=='N' && AdminAO_Remark9==''){alert("please enter particular 9 remark"); return false;}
 }
 
 var AdminAO_Txt10 = formname.AdminAO_Txt10.value; var AdminAO_YN10 = formname.AdminAO_YN10.value; var AdminAO_Amt10 = formname.AdminAO_Amt10.value; 
 var AdminAO_Remark10 = formname.AdminAO_Remark10.value; var AdminAO_num10 = Numfilter.test(AdminAO_Amt10);
 if(AdminAO_Txt10!='' || AdminAO_YN10!='')
 {
  if(AdminAO_Txt10==''){alert("Please enter particular 10 name.");  return false; }
  if(AdminAO_YN10==''){alert("Please select option(yes/no) in particular 10 clearance.");  return false; }
  //if(AdminAO_YN10!='' && AdminAO_YN10=='N' && AdminAO_Amt10=='' && AdminAO_Remark10==''){alert("please enter particular 10 recovery amount & remark"); return false;}
  //if(AdminAO_YN10!='' && AdminAO_YN10=='N' && AdminAO_Amt10==''){alert("please enter particular 10 recovery amount"); return false;}
  if(AdminAO_YN10=='N' && AdminAO_num10==false && AdminAO_Amt10!=''){alert('Please enter only number in particular 10 amount field'); return false; }	
  if(AdminAO_YN10!='' && AdminAO_YN10=='N' && AdminAO_Remark10==''){alert("please enter particular 10 remark"); return false;}
 }
 
 var AdminIC_t = parseFloat(document.getElementById("AdminIC_Amt").value); var AdminVC_t = parseFloat(document.getElementById("AdminVC_Amt").value);
 var AdminAO_3t = parseFloat(document.getElementById("AdminAO_Amt3").value); var AdminAO_4t = parseFloat(document.getElementById("AdminAO_Amt4").value);
 var AdminAO_5t = parseFloat(document.getElementById("AdminAO_Amt5").value); var AdminAO_6t = parseFloat(document.getElementById("AdminAO_Amt6").value);
 var AdminAO_7t = parseFloat(document.getElementById("AdminAO_Amt7").value); var AdminAO_8t = parseFloat(document.getElementById("AdminAO_Amt8").value);
 var AdminAO_9t = parseFloat(document.getElementById("AdminAO_Amt9").value); var AdminAO_10t = parseFloat(document.getElementById("AdminAO_Amt10").value);
 
 var TotAmt = document.getElementById("TotAmt").value=Math.round((AdminIC_t +AdminVC_t+AdminAO_3t+AdminAO_4t+AdminAO_5t+AdminAO_6t+AdminAO_7t+AdminAO_8t+AdminAO_9t+AdminAO_10t)*100)/100; 
 
  var agree=confirm("Are you sure..?");
  if(agree){ return true; }else{ return false; }
}

function FunResendAdmin(si)
{ var agree=confirm("Are you sure, you want resend form to Admin.");
  if(agree)
  { window.location="SepAdminClearForm.php?act=act&action=AdminResend&v=v&ss=vty&v=v&ss=vty&cc=it@~t~1212&p=value&a=app&true=false&si="+si;  }
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

$sqlNoc=mysql_query("select * from hrm_employee_separation_nocadmin where EmpSepId=".$_REQUEST['si'], $con); 
$rowNoc=mysql_num_rows($sqlNoc); if($rowNoc>0){$res=mysql_fetch_assoc($sqlNoc);}
?>	
<form enctype="multipart/form-data" name="formname" method="post" onSubmit="return validate(this)">
<table border="0">
 <tr>
<?php /*************************************** ADMIN *****************************************************/ ?>  
<td style="display:;width:790px;"> <?php //if($_REQUEST['Dept']=='Ad'){echo 'block';}else{echo 'block';}?>
 <table border="0" cellpadding="0">
  <tr><td>&nbsp;</td><td class="Text" style="">&nbsp;<b>EC :&nbsp;<?php echo $resE['EmpCode']; ?>/&nbsp;&nbsp;Name :&nbsp;<?php echo $NameE; ?></b></td></tr>
  <tr><td>&nbsp;</td><td class="Text2" style="color:#006200;" align="center"><b>ADMIN CLEARANCE FORM</b></td></tr>
  <tr>
   <td style="width:30px;">&nbsp;</td>
   <td>
    <table border="1" style="width:760px; ">
	  <tr bgcolor="#7a6189">
       <td class="Text" style="width:30px;color:#FFFFFF;" align="center"><b>Sn</b></td>
       <td class="Text" style="width:230px;color:#FFFFFF;" align="center"><b>Particular</b></td>
	   <td class="Text" style="width:100px;color:#FFFFFF;" align="center"><b>Yes/No</b></td>
	   <td class="Text" style="width:80px;color:#FFFFFF;" align="center" valign="top"><b>Recovery Amount</b></td>
	   <td class="Text" style="width:320px;color:#FFFFFF;" align="center"><b>Remark</b></td>
     </tr>
	 <tr bgcolor="#FFFFFF">
       <td class="Text" style="width:30px;" align="center">1<input type="hidden" id="si" name="si" value="<?php echo $_REQUEST['si']; ?>" />
       <input type="hidden" id="ei" name="ei" value="<?php echo $_REQUEST['ei']; ?>" /><input type="hidden" id="TotAmt" name="TotAmt" value="<?php echo $res['TotAdminAmt']; ?>" />
	   <input type="hidden" name="Ename" id="Ename" value="<?php echo $NameE; ?>" /></td>
       <td class="Text" style="width:230px;" align="">&nbsp;ID Card Submitted</td>
	   <td class="Text" style="width:100px;" align="center" valign="top">
	    Yes<input type="checkbox" id="AdminIC_Y" onClick="FunIC('Y')" <?php if($res['AdminIC']=='Y'){echo 'checked';} ?>/>&nbsp;
		No<input type="checkbox" id="AdminIC_N" onClick="FunIC('N')" <?php if($res['AdminIC']=='N'){echo 'checked';} ?>/>
		<input type="hidden" id="AdminIC_YN" name="AdminIC_YN" value="<?php echo $res['AdminIC']; ?>" />
	   </td>
	   <td class="Text" style="width:80px;" align="center" valign="top">
	    <input style="width:78px;background-color:#EAEAEA;text-align:right;" id="AdminIC_Amt" name="AdminIC_Amt" value="<?php echo $res['AdminIC_Amt']; ?>" readonly/>
	   </td>
	   <td class="Text" style="width:320px;" align="center" valign="top">
	    <input id="AdminIC_Remark" name="AdminIC_Remark" style="width:318px;" value="<?php echo $res['AdminIC_Remark'] ?>" />
	   </td>
     </tr>
	  <tr bgcolor="#FFFFFF"> 
       <td class="Text" style="width:30px;" align="center">2</td>
       <td class="Text" style="width:230px;" align="">&nbsp;Visiting Cards Submitted</td>
	   <td class="Text" style="width:100px;" align="center" valign="top">
	    Yes<input type="checkbox" id="AdminVC_Y" onClick="FunVC('Y')" <?php if($res['AdminVC']=='Y'){echo 'checked';} ?>/>&nbsp;
		No<input type="checkbox" id="AdminVC_N" onClick="FunVC('N')" <?php if($res['AdminVC']=='N'){echo 'checked';} ?>/>
		<input type="hidden" id="AdminVC_YN" name="AdminVC_YN" value="<?php echo $res['AdminVC']; ?>" />
	   </td>
	   <td class="Text" style="width:80px;" align="center" valign="top">
	    <input style="width:78px;background-color:#EAEAEA;text-align:right;" id="AdminVC_Amt" name="AdminVC_Amt" value="<?php echo $res['AdminVC_Amt'];?>" readonly/>
	   </td>
	   <td class="Text" style="width:320px;" align="center" valign="top">
	    <input id="AdminVC_Remark" name="AdminVC_Remark" style="width:318px;" value="<?php echo $res['AdminVC_Remark'] ?>" />
	   </td>
     </tr>
	</table>
   </td>
  </tr>
<?php for($i=3; $i<=10; $i++) { ?>  
  <tr>
   <td style="width:30px;display:<?php if($res['AdminAO'.$i]!=''){echo 'block';}else{echo 'none';}?>;" id="img<?php echo $i; ?>" align="center" align="center">
   <img src="images/Addnew.png" border="0" id="addImg<?php echo $i; ?>" style="display:<?php if($res['AdminAO'.$i]!=''){echo 'none';}else{echo 'block';}?>;" id="img<?php echo $i; ?>" onClick="ShowRowAdmin(<?php echo $i; ?>)"/>
   <img src="images/Minusnew.png" id="minusImg<?php echo $i; ?>" style="display:none;" border="0" onClick="HideRowAdmin(<?php echo $i; ?>)"/>
   </td>
   <td>
    <table style="width:760px;display:<?php if($res['AdminAO'.$i]!=''){echo 'block';}else{echo 'none';}?>;" id="Row<?php echo $i; ?>" border="1" cellspacing="0">
	  <tr bgcolor="#FFFFFF"> 
       <td class="Text" style="width:38px;" align="center"><?php echo $i; ?></td>
       <td class="Text" style="width:202px;" align="" valign="top">
	   <input style="width:202px;" id="AdminAO_Txt<?php echo $i; ?>" name="AdminAO_Txt<?php echo $i; ?>" value="<?php echo $res['AdminAO_Txt'.$i]; ?>"/>
	   </td>
	   <td class="Text" style="width:115px;" align="center" valign="top">
	    Yes<input type="checkbox" id="AdminAO_Y<?php echo $i; ?>" onClick="FunAdminAO(<?php echo $i; ?>,'Y')" <?php if($res['AdminAO'.$i]=='Y'){echo 'checked';} ?>/>&nbsp;
		No<input type="checkbox" id="AdminAO_N<?php echo $i; ?>" onClick="FunAdminAO(<?php echo $i; ?>,'N')" <?php if($res['AdminAO'.$i]=='N'){echo 'checked';} ?>/>
		<input type="hidden" id="AdminAO_YN<?php echo $i; ?>" name="AdminAO_YN<?php echo $i; ?>" value="<?php echo $res['AdminAO'.$i]; ?>" />
	   </td>
	   <td class="Text" style="width:80px;" align="center" valign="top">
	    <input style="width:80px;background-color:#EAEAEA;text-align:right;" id="AdminAO_Amt<?php echo $i; ?>" name="AdminAO_Amt<?php echo $i; ?>" value="<?php echo $res['AdminAO_Amt'.$i]; ?>" readonly/>
	   </td>
	   <td class="Text" style="width:325px;" align="center" valign="top">
	    <input id="AdminAO_Remark<?php echo $i; ?>" name="AdminAO_Remark<?php echo $i; ?>" style="width:321px;" value="<?php echo $res['AdminAO_Remark'.$i] ?>" />
	   </td>
     </tr>
	</table>
   </td>
  </tr>
<?php } ?> 
  <tr>
   <td style="width:30px;" align="center" align="center"></td>
   <td>
    <table style="width:760px;" border="1" cellspacing="0">
	  <tr bgcolor="#FFFFFF"> 
       <td colspan="2" class="Text" style="width:247px;">&nbsp;<b>Any Other Remark</b></td>
	   <td colspan="3" class="Text" style="width:518px;" align="center" valign="top">
	    <input id="AdminOth_Remark" name="AdminOth_Remark" style="width:514px;" value="<?php echo $res['AdminOth_Remark']; ?>" maxlength="190" />
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
	  <td><font size="3" color="#D7FFD7"><b><?php echo $msg.'&nbsp;'; ?></b></font></td>
      <td><?php if($ersSE['Admin_NOC']=='N' AND date("Y-m-d")>=$resSE['HR_Date'] AND date("Y-m-d".$_POST['Admin_ResReport']."h:i:s")<=$resSE['HR_SaveDate ']) { ?>
	  <input type="submit" id="submitAdminNoc" name="submitAdminNoc" value="save" style="display:none;"/><?php } elseif(){ echo '<font color="#GGRRGG" size="3">Not Allowed</font>';} ?></td>
      <td><input type="button" id="ResendAdmin" value="send back" style="background-color:#FFCAFF;display:block;width:80px;" onClick="FunResendAdmin(<?php echo $_REQUEST['si']; ?>)"/></td>
      <td><input type="button" name="Refrash" id="Refrash" value="refresh" style="background-color:#FFCAFF;" onClick="javascript:window.location='SepAdminClearForm.php?act=act&v=v&ss=vty&cc=it@~t~1212&p=value&a=app&true=false&si=<?php echo $_REQUEST['si']; ?>'" style="display:block;"/></td>
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
