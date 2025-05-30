<?php
if(isset($_POST['LoginAdminEmp']) AND $_POST['username']!='' && $_POST['userpass']!='')
{ 
if($_POST['companyadmin']=="1"){ $result=mysql_query("select YearId, FromDate, ToDate from hrm_year where Company1Status='A'", $con);}
elseif($_POST['companyadmin']=="2"){ $result=mysql_query("select YearId, FromDate, ToDate from hrm_year where Company2Status='A'", $con);}
elseif($_POST['companyadmin']=="3"){ $result=mysql_query("select YearId, FromDate, ToDate from hrm_year where Company3Status='A'", $con);}
elseif($_POST['companyadmin']=="4"){ $result=mysql_query("select YearId, FromDate, ToDate from hrm_year where Company4Status='A'", $con);}
$res=mysql_fetch_array($result); $_SESSION['YearId']=$res['YearId']; $_SESSION['fromdate']=$res['FromDate']; $_SESSION['todate']=$res['ToDate']; 
$_SESSION['Company1Status']=$res['Company1Status']; $_SESSION['Company2Status']=$res['Company2Status']; 
$_SESSION['Company3Status']=$res['Company3Status']; $_SESSION['Company4Status']=$res['Company4Status'];
date_default_timezone_set('Asia/Kolkata'); $DateTime=date("Y-m-d h:i:s");


//Employee
$u = $_POST['username'];
$username = ltrim($u,$u[0]);

if($u[0]=='V'){ $UsName=$_POST['username']; }
else
{ $UsName=(int) filter_var($_POST['username'], FILTER_SANITIZE_NUMBER_INT); }

//Employee
 if(($_POST['username']>0 AND is_numeric($_POST['username'])) OR ($u[0]=='V' AND is_numeric($username)))
 {
     
if($_POST['username']=='329' OR $_POST['username']==329 OR $_POST['username']=='1014' OR $_POST['username']=='896' OR $_POST['username']==1152 OR $_POST['username']==244 OR $_POST['username']==590)
{
  $sql = mysql_query("SELECT * FROM hrm_employee WHERE EmpCode='".$UsName."' AND CompanyId='".$_POST['companyadmin']."' AND EmpStatus='A' AND (EmpType='E' OR EmpType='M')", $con); $row2 = mysql_fetch_assoc($sql); 
  if(mysql_num_rows($sql)==1)
  { $EncPass=decrypt($row2['EmpPass']); $_SESSION['login'] = true; 
    $_SESSION['EmpCode']=$row2['EmpCode'];  $_SESSION['EmployeeID']=$row2['EmployeeID']; $_SESSION['CompanyId']=$row2['CompanyId']; $_SESSION['eFND']=$row2['EmpPass']; 
    $_SESSION['EmpType']=$row2['EmpType']; $_SESSION['EmpStatus']=$row2['EmpStatus'];
	if($row2['EmpCode']==$UsName AND $EncPass==$_POST['userpass'] AND ($row2['EmpType']=='E' OR $row2['EmpType']=='M')  AND $row2['EmpStatus']=='A')
    { 
	  $SqlULog=mysql_query("insert into hrm_logbook_emp(EmployeeID, EDateTime, CompanyId) values(".$_SESSION['EmployeeID'].", '".$DateTime."', ".$_SESSION['CompanyId'].")"); 
	  header('Location:Employee/EmpHome.php?log='.$_POST['LoginEmp']); 
	}
   }   
   elseif(($row2['EmpCode']!=$UsName AND  $EncPass!=$_POST['userpass'] AND $row2['CompanyId']!=$_POST['companyadmin']) OR ($row2['EmpCode']==$UsName AND $EncPass!=$_POST['userpass'] AND $row2['CompanyId']!=$_POST['companyadmin']) OR ($row2['EmpCode']!=$UsName AND $EncPass==$_POST['userpass'] AND $row2['CompanyId']!=$_POST['companyadmin']) OR ($row2['EmpCode']==$UsName AND $EncPass==$_POST['userpass'] AND $row2['CompanyId']!=$_POST['companyadmin']) OR ($row2['EmpCode']==$UsName AND $EncPass==$_POST['userpass'] AND $row2['CompanyId']==$_POST['companyadmin'] AND $row2['EmpStatus']=='D'))
   { echo "<div style='position:absolute;top:350px;left:450px;height:85px;'><hi><font color=#910000 size=5>You are not authorized to enter this site...</font></h1></div>"; }
   
} //if($_POST['username']=='329' OR $_POST['username']==329)   
    
 }
//Admin
 else
 {  
  $sql = mysql_query("SELECT * from hrm_user WHERE User_name='".$_POST['username']."' AND CompanyId='".$_POST['companyadmin']."' AND User_status='A' AND (User_type='M' OR User_type='S' OR User_type='A' OR User_type='U')", $con); $row = mysql_fetch_assoc($sql); 
  if(mysql_num_rows($sql)>0)
  { $EncUserPass=decrypt($row['User_pass']); $_SESSION['login'] = true; 
    $_SESSION['AXAUESRUserId']=$row['AXAUESRUser_Id']; $_SESSION['CompanyId']=$row['CompanyId']; $_SESSION['uFND']=$row['User_pass']; 
    if(($row['User_name']==$_POST['username']) AND ($EncUserPass==$_POST['userpass']) AND ($row['User_status']=='A') AND ($row['User_type']=='M' OR $row['User_type']=='S' OR $row['User_type']=='A' OR $row['User_type']=='U'))
    { $SqlULog=mysql_query("insert into hrm_logbook_user(UserId, UDateTime, CompanyId) values(".$_SESSION['AXAUESRUserId'].", '".$DateTime."', ".$_SESSION['CompanyId'].")");
	  header('Location:AdminUser/Index.php?log='.$_POST['LoginAdmin']);
    }
  }
  elseif(($row['User_name']!=$_POST['username'] AND $EncUserPass!=$_POST['userpass'] AND $row['CompanyId']!=$_POST['companyadmin']) OR ($row['User_name']==$_POST['username'] AND $EncUserPass!=$_POST['userpass'] AND $row['CompanyId']!=$_POST['companyadmin']) OR ($row['User_name']!=$_POST['username'] AND $EncUserPass==$_POST['userpass'] AND $row['CompanyId']!=$_POST['companyadmin']) OR ($row['User_name']==$_POST['username'] AND $EncUserPass==$_POST['userpass'] AND $row['CompanyId']!=$_POST['companyadmin']) OR ($row['User_name']==$_POST['username'] AND $EncUserPass==$_POST['userpass'] AND $row['CompanyId']==$_POST['companyadmin'] AND $row['User_status']=='D'))
   {echo "<div style='position:absolute; top:350px; left:450px;  height:85px;'><hi><font color=#910000 size=5>You are not authorized to enter this site.11..</font></hi></div>";}
 }

}

?>