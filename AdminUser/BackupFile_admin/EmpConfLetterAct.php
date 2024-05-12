<?php require_once('config/config.php');

if($_POST['act']=='UpdPerm')
{
 if($_POST['n']==1)
 {
 $up=mysql_query("update hrm_employee_confletter set EmpShow='".$_POST['value']."' where ConfLetterId=".$_POST['id']." AND EmployeeID=".$_POST['e'],$con);
 }
 elseif($_POST['n']==2)
 {
 $up=mysql_query("update hrm_employee_confletter set EmpShow_Trr='".$_POST['value']."' where ConfLetterId=".$_POST['id']." AND EmployeeID=".$_POST['e'],$con);
 }
 elseif($_POST['n']==3)
 {
 $up=mysql_query("update hrm_employee_confletter set EmpShow_Ext='".$_POST['value']."' where ConfLetterId=".$_POST['id']." AND EmployeeID=".$_POST['e'],$con);
 }
 
 
 
 if($up AND $_POST['value']=='Y')
 {
  
  $sql=mysql_query("select Fname, Sname, Lname, Married, DR, Gender, EmailId_Vnr from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_personal p ON e.EmployeeID=p.EmployeeID where e.EmployeeID=".$_POST['e'],$con); $res=mysql_fetch_assoc($sql); 
if($res['Sname']!=''){$Ename=$res['Fname'].' '.$res['Sname'].' '.$res['Lname'];}else{$Ename=$res['Fname'].' '.$res['Lname'];}
if($res['DR']=='Y'){$M='Dr.';}elseif($res['Gender']=='M'){$M='Mr.';} elseif($res['Gender']=='F' AND $res['Married']=='Y'){$M='Mrs.';} elseif($res['Gender']=='F' AND $res['Married']=='N'){$M='Miss.';} $NameE=$M.' '.$Ename;
  
  if($res['EmailId_Vnr']!='')
  {
   $email_to = $res['EmailId_Vnr'];
   $email_from='admin@vnrseeds.co.in';
   if($_POST['n']==1 OR $_POST['n']==2){  $email_subject = "E-Confirmation Letter";  $email_txt = "E-Confirmation Letter"; } 
   elseif($_POST['n']==3){ $email_subject = "E-Confirmation Postponement Letter";  $email_txt = "E-Confirmation Postponement Letter"; }
   $headers = "From: $email_from ". "\r\n";
   if($_POST['n']==1 OR $_POST['n']==2){  $email_message .="Dear". $NameE.",<br><br> We are glad to confirm your services. You can view your e-confirmation letter in ESS (Home page).<br><br><br>ADMIN ESS\n\n"; }
   elseif($_POST['n']==3){ $email_message .="Dear". $NameE.",<br><br> We regret to inform that your confirmation is postponed. You can view your e-confirmation postponement letter in ESS (Home page).<br><br><br>ADMIN ESS\n\n"; }
   $ok = @mail($email_to, $email_subject, $email_message, $headers); 
   
   
   $email2_to = 'vspl.hr@vnrseeds.com';
   $email_from='admin@vnrseeds.co.in';
   if($_POST['n']==1 OR $_POST['n']==2){  $email2_subject = "E-Confirmation Letter";  $email2_txt = "E-Confirmation Letter"; } 
   elseif($_POST['n']==3){ $email2_subject = "E-Confirmation Postponement Letter";  $email2_txt = "E-Confirmation Postponement Letter"; }
   $headers = "From: $email_from ". "\r\n";
   if($_POST['n']==1 OR $_POST['n']==2){  $email2_message .="Dear". $NameE.",<br><br> We are glad to confirm your services. You can view your e-confirmation letter in ESS (Home page).<br><br><br>ADMIN ESS\n\n"; }
   elseif($_POST['n']==3){ $email2_message .="Dear". $NameE.",<br><br> We regret to inform that your confirmation is postponed. You can view your e-confirmation postponement letter in ESS (Home page).<br><br><br>ADMIN ESS\n\n"; }
   $ok = @mail($email2_to, $email2_subject, $email2_message, $headers);
  }
  
  echo '<input type="hidden" id="actid" value="'.$_POST['id'].'">';
  echo '<input type="hidden" id="actvlu" value="yes">';
  echo '<input type="hidden" id="nnum" value="'.$_POST['n'].'">';
 }
 else 
 { 
  echo '<input type="hidden" id="actid" value="'.$_POST['id'].'">';
  echo '<input type="hidden" id="actvlu" value="no">';
  echo '<input type="hidden" id="nnum" value="'.$_POST['n'].'">';
 }
}

?>
