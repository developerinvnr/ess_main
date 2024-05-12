<?php 
session_start();  
require_once('config/config.php');
mysql_query("SET SESSION sql_mode = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION'");


$chkWishM=mysql_query("select * from hrm_wishmail_checker where WDate='".date("Y-m-d")."' AND WCheck=1 AND CompanyId=3",$con); 
$rowWishM=mysql_num_rows($chkWishM);

if($rowWishM>0)
{

$sqlE=mysql_query("select e.EmployeeID,e.EmpCode,Fname,Sname,Lname,Gender,Married,DR,DepartmentCode,HqName from hrm_employee_general g inner join hrm_employee e on g.EmployeeID=e.EmployeeID inner join hrm_employee_personal p on g.EmployeeID=p.EmployeeID inner join hrm_department d on g.DepartmentId=d.DepartmentId inner join hrm_headquater hq on g.HqId=hq.HqId where e.EmpStatus='A' AND e.CompanyId=3 AND e.EmployeeID!=6 AND e.EmployeeID!=914 AND g.DOB_dm='".date("0000-m-d")."' order by g.GradeId DESC",$con); $rowE=mysql_num_rows($sqlE);
while($resE=mysql_fetch_assoc($sqlE))
{
    
  $chkSp=mysql_query("select * from hrm_employee_separation where EmployeeID=".$resE['EmployeeID']." AND Rep_Approved!='C' AND Hod_Approved!='C' AND HR_Approved!='C'",$con); $RowchkSp=mysql_num_rows($chkSp);
 
  if($RowchkSp==0)
  {    
  if($resE['DR']=='Y'){$MS='Dr.';} elseif($resE['Gender']=='M'){$MS='Mr.';} elseif($resE['Gender']=='F' AND $resE['Married']=='Y'){$MS='Mrs.';} elseif($resE['Gender']=='F' AND $resE['Married']=='N'){$MS='Miss.';}  
  if($resE['Sname']==''){ $Name = $MS.' '.ucwords(strtolower($resE['Fname'].' '.$resE['Lname'])); }
  else{ $Name = $MS.' '.ucwords(strtolower($resE['Fname'].' '.$resE['Sname'].' '.$resE['Lname'])); }
  //$Empname = $Name.' ('.$resE['DepartmentCode'].') '.$resE['HqName'];
  $array_emp[]=$Name.' ('.$resE['DepartmentCode'].', HQ-'.ucwords(strtolower($resE['HqName'])).')';

  }      
}  
$EmpBirth = implode(', ', $array_emp);

$sqlEa=mysql_query("select e.EmployeeID, e.EmpCode,Fname,Sname,Lname,Gender,Married,DR,DepartmentCode,HqName from hrm_employee_general g inner join hrm_employee e on g.EmployeeID=e.EmployeeID inner join hrm_employee_personal p on g.EmployeeID=p.EmployeeID inner join hrm_department d on g.DepartmentId=d.DepartmentId inner join hrm_headquater hq on g.HqId=hq.HqId where e.EmpStatus='A' AND e.CompanyId=3 AND e.EmployeeID!=6 AND e.EmployeeID!=914 AND p.Married='Y' AND p.MarriageDate_dm='".date("0000-m-d")."' order by g.GradeId DESC",$con); $rowEa=mysql_num_rows($sqlEa);
while($resEa=mysql_fetch_assoc($sqlEa))
{
  $chkSp=mysql_query("select * from hrm_employee_separation where EmployeeID=".$resEa['EmployeeID']." AND Rep_Approved!='C' AND Hod_Approved!='C' AND HR_Approved!='C'",$con); $RowchkSp=mysql_num_rows($chkSp);
 
  if($RowchkSp==0)
  {    
  if($resEa['DR']=='Y' AND $resEa['Gender']=='M'){$MSa='Mrs. & Dr.';} 
  elseif($resEa['DR']=='Y' AND $resEa['Gender']=='F'){$MSa='Mr. & Dr.';}
  elseif($resEa['Gender']=='M'){$MSa='Mrs. & Mr.';}
  elseif($resEa['Gender']=='F'){$MSa='Mr. & Mrs.';}   
  if($resEa['Sname']==''){ $NameAnn = $MSa.' '.ucwords(strtolower($resEa['Fname'].' '.$resEa['Lname'])); }
  else{ $NameAnn = $MSa.' '.ucwords(strtolower($resEa['Fname'].' '.$resEa['Sname'].' '.$resEa['Lname'])); }
  //$Empname = $Name.' ('.$resEa['DepartmentCode'].') '.$resEa['HqName'];
  $array_empAnn[]=$NameAnn.' ('.$resEa['DepartmentCode'].', HQ-'.ucwords(strtolower($resEa['HqName'])).')';
  }
}  
$EmpAnn = implode(', ', $array_empAnn);

$dy=date("w",strtotime(date("Y-m-d")));
if($dy==0){ $ImgA='https://www.vnrseeds.co.in/hrims/AdminUser/AnnBirth/AA_7.jpg'; $ImgB='https://www.vnrseeds.co.in/hrims/AdminUser/AnnBirth/BB_7.jpg'; }
else{ $ImgA='https://www.vnrseeds.co.in/hrims/AdminUser/AnnBirth/AA_'.$dy.'.jpg'; $ImgB='https://www.vnrseeds.co.in/hrims/AdminUser/AnnBirth/BB_'.$dy.'.jpg'; }

$email_message .= "<html><head><body><br>\n";
if($rowE>0)
{  
 //$email_message .= "<b>Birthday:</b><br> ";
 $email_message .= "<font style='font-size:16px;'><i>Dear</i><b> ".$EmpBirth."</b></font><br><br>";
 $email_message .= "<font style='font-size:16px;'><i>Our warm wishes on occasion of your Birthday! We wish for a wonderful year full of happiness and success.</i></font><br><br>";
 $email_message .= "<img src='".$ImgB."' style='width:400px;height:300px;'/><br><br><br>\n"; 
}

if($rowEa>0)
{ 
 //$email_message .= "<b>Wedding Anniversary:</b><br> ";
 $email_message .= "<font style='font-size:16px;'><i>Dear</i> <b>".$EmpAnn."</b></font><br><br>";
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

 $sql=mysql_query("select g.EmployeeID,EmailId_Vnr from hrm_employee_general g inner join hrm_employee e on g.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=3 AND g.EmailId_Vnr!='' order by e.EmployeeID ASC limit 0,90",$con); //AND (g.DepartmentId=1 OR g.EmployeeID=169) AND (g.DepartmentId=1 OR g.DepartmentId=9)
 while($res=mysql_fetch_assoc($sql))
 { 

 
  if($res['EmailId_Vnr']!='')
  {
      $email_to = $res['EmailId_Vnr'];   
      $email_from='vspl.hr@vnrseeds.com';
      $email_subject = $Sub;
      $headers = "From: ".$email_from."\r\n"; 
      $semi_rand = md5(time()); 
      $headers .= "MIME-Version: 1.0\r\n";
      $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
	  $ok = @mail($email_to, $email_subject, $email_message, $headers);
  }
  
 }
 
} //if($rowE>0 || $rowEa>0) 


} //if($rowWishM>0)

?>
