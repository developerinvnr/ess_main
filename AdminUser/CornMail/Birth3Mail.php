<?php 
require_once('../config/config.php');

mysql_query("SET SESSION sql_mode = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION'");

$sqlE=mysql_query("select e.EmpCode,Fname,Sname,Lname,Gender,Married,DR,DepartmentCode,HqName from hrm_employee_general g inner join hrm_employee e on g.EmployeeID=e.EmployeeID inner join hrm_employee_personal p on g.EmployeeID=p.EmployeeID inner join hrm_department d on g.DepartmentId=d.DepartmentId inner join hrm_headquater hq on g.HqId=hq.HqId where e.EmpStatus='A' AND e.CompanyId=1 AND g.DOB_dm='".date("0000-m-d")."' order by g.GradeId DESC",$con); $rowE=mysql_num_rows($sqlE);
while($resE=mysql_fetch_assoc($sqlE))
{
  if($resE['DR']=='Y'){$MS='Dr.';} elseif($resE['Gender']=='M'){$MS='Mr.';} elseif($resE['Gender']=='F' AND $resE['Married']=='Y'){$MS='Mrs.';} elseif($resE['Gender']=='F' AND $resE['Married']=='N'){$MS='Miss.';}  
  if($resE['Sname']==''){ $Name = $MS.' '.$resE['Fname'].' '.$resE['Lname']; }
  else{ $Name = $MS.' '.$resE['Fname'].' '.$resE['Sname'].' '.$resE['Lname']; }
  //$Empname = $Name.' ('.$resE['DepartmentCode'].') '.$resE['HqName'];
  $array_emp[]=$Name.' ('.$resE['DepartmentCode'].', HQ-'.$resE['HqName'].')';
}  
$EmpBirth = implode(', ', $array_emp);

$sqlEa=mysql_query("select e.EmpCode,Fname,Sname,Lname,Gender,Married,DR,DepartmentCode,HqName from hrm_employee_general g inner join hrm_employee e on g.EmployeeID=e.EmployeeID inner join hrm_employee_personal p on g.EmployeeID=p.EmployeeID inner join hrm_department d on g.DepartmentId=d.DepartmentId inner join hrm_headquater hq on g.HqId=hq.HqId where e.EmpStatus='A' AND e.CompanyId=1 AND p.Married='Y' AND p.MarriageDate_dm='".date("0000-m-d")."' order by g.GradeId DESC",$con); $rowEa=mysql_num_rows($sqlEa);
while($resEa=mysql_fetch_assoc($sqlEa))
{
  if($resEa['DR']=='Y' AND $resEa['Gender']=='M'){$MSa='Ms. & Dr.';} 
  elseif($resEa['DR']=='Y' AND $resEa['Gender']=='F'){$MSa='Mr. & Dr.';}
  elseif($resEa['Gender']=='M'){$MSa='Ms. & Mr.';}
  elseif($resEa['Gender']=='F'){$MSa='Mr. & Ms.';}   
  if($resEa['Sname']==''){ $NameAnn = $MSa.' '.$resEa['Fname'].' '.$resEa['Lname']; }
  else{ $NameAnn = $MSa.' '.$resEa['Fname'].' '.$resEa['Sname'].' '.$resEa['Lname']; }
  //$Empname = $Name.' ('.$resEa['DepartmentCode'].') '.$resEa['HqName'];
  $array_empAnn[]=$NameAnn.' ('.$resEa['DepartmentCode'].', HQ-'.$resEa['HqName'].')';
}  
$EmpAnn = implode(', ', $array_empAnn);

$dy=date("w",strtotime(date("Y-m-d")));
if($dy==0){ $ImgA='https://www.vnrseeds.co.in/hrims/AdminUser/AnnBirth/AA_7.jpg'; $ImgB='https://www.vnrseeds.co.in/hrims/AdminUser/AnnBirth/BB_7.jpg'; }
else{ $ImgA='https://www.vnrseeds.co.in/hrims/AdminUser/AnnBirth/AA_'.$dy.'.jpg'; $ImgB='https://www.vnrseeds.co.in/hrims/AdminUser/AnnBirth/BB_'.$dy.'.jpg'; }

$email_message .= "<html><head><body><br>\n";
if($rowE>0)
{  
 //$email_message .= "<b>Birthday:</b><br> ";
 $email_message .= "<font style='font-size:16px;'><i>Dear</i></font> <b>".$EmpBirth."</b><br><br>";
 $email_message .= "<font style='font-size:16px;'><i>Our warm wishes on occasion of your Birthday! We wish for a wonderful year full of happiness and success.</i></font><br><br>";
 $email_message .= "<img src='".$ImgB."' style='width:400px;height:300px;'/><br><br><br>\n"; 
}

if($rowEa>0)
{ 
 //$email_message .= "<b>Wedding Anniversary:</b><br> ";
 $email_message .= "<font style='font-size:16px;'><i>Dear</i></font> <b>".$EmpAnn."</b><br><br>";
 $email_message .= "<font style='font-size:16px;'><i>Our warm wishes to both on your Happy Wedding Anniversary! May all your days be filled with love, joy & happiness.</i></font><br><br>";
 $email_message .= "<img src=".$ImgA." style='width:400px;height:300px;'/><br><br><br>\n"; 
}
 $email_message .= "</body></head></html>";


if($rowE>0 && $rowEa>0){ $Sub="Birthday & Wedding Anniversary Wishes"; }
elseif($rowE>0 && $rowEa==0){ $Sub="Birthday Wishes"; }
elseif($rowE==0 && $rowEa>0){ $Sub="Wedding Anniversary Wishes"; }
elseif($rowE==0 && $rowEa==0){ $Sub=""; }

if($rowE>0 || $rowEa>0)
{

 $sql=mysql_query("select g.EmployeeID,EmailId_Vnr from hrm_employee_general g inner join hrm_employee e on g.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=1 AND g.EmailId_Vnr!='' AND (g.DepartmentId=1 OR g.EmployeeID=169) order by e.EmployeeID ASC limit 180,90",$con); //AND (g.DepartmentId=1 OR g.DepartmentId=9)
 while($res=mysql_fetch_assoc($sql))
 { 

 
  if($res['EmailId_Vnr']!='')
  {
      $email_to = $res['EmailId_Vnr'];   
      $email_from='admin@vnrseeds.co.in';
      $email_subject = $Sub;
      $headers = "From: ".$email_from."\r\n"; 
      $semi_rand = md5(time()); 
      $headers .= "MIME-Version: 1.0\r\n";
      $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
	  $ok = @mail($email_to, $email_subject, $email_message, $headers);
  }
  
 }
 
} //if($rowE>0 || $rowEa>0)  


?>
