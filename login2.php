<?php
//Admin Login
if($_SESSION['login'] = false){ unset($_SESSION['login']); unset($_SESSION['AXAUESRUserId']);unset($_SESSION['UserName']); unset($_SESSION['UserStatus']); unset($_SESSION['login']);
unset($_SESSION['EmpCode']); unset($_SESSION['EmpStatus']);}

if(isset($_POST['Admin']) OR isset($_POST['Emp']))
{ 
  $result=mysql_query("select YearId, FromDate, ToDate from hrm_year where Status='A'", $con); 
   { $_SESSION['YearId']=$res['YearId']; $_SESSION['fromdate']=$res['FromDate']; $_SESSION['todate']=$res['ToDate']; $_SESSION['status']=$res['status'];}
}
if(isset($_POST['Admin']))
{ 
if($_POST['companyadmin']=="1"){ $result=mysql_query("select YearId, FromDate, ToDate from hrm_year where Company1Status='A'", $con);}
elseif($_POST['companyadmin']=="2"){ $result=mysql_query("select YearId, FromDate, ToDate from hrm_year where Company2Status='A'", $con);}
elseif($_POST['companyadmin']=="3"){ $result=mysql_query("select YearId, FromDate, ToDate from hrm_year where Company3Status='A'", $con);}
elseif($_POST['companyadmin']=="4"){ $result=mysql_query("select YearId, FromDate, ToDate from hrm_year where Company4Status='A'", $con);}
elseif($_POST['companyadmin']=="5"){ $result=mysql_query("select YearId, FromDate, ToDate from hrm_year where Company5Status='A'", $con);}
elseif($_POST['companyadmin']=="6"){ $result=mysql_query("select YearId, FromDate, ToDate from hrm_year where Company6Status='A'", $con);}
$res=mysql_fetch_array($result); $_SESSION['YearId']=$res['YearId']; $_SESSION['fromdate']=$res['FromDate']; $_SESSION['todate']=$res['ToDate']; 
$_SESSION['Company1Status']=$res['Company1Status']; $_SESSION['Company2Status']=$res['Company2Status']; $_SESSION['Company3Status']=$res['Company3Status'];
$_SESSION['Company4Status']=$res['Company4Status']; $_SESSION['Company5Status']=$res['Company5Status']; $_SESSION['Company6Status']=$res['Company6Status'];

$sql = mysql_query("SELECT * from hrm_user WHERE User_name='".$_POST['username']."' AND CompanyId='".$_POST['companyadmin']."' AND User_status='A' AND (User_type='M' OR User_type='S' OR User_type='A' OR User_type='U')", $con); 
   $row = mysql_fetch_assoc($sql); 
   if(mysql_num_rows($sql)>0)
     { $EncUserPass=decrypt($row['User_pass']); //$EncUserPass=decrypt($row['User_pass']);
          
	   $_SESSION['login'] = true; $_SESSION['AXAUESRUserId']=$row['AXAUESRUser_Id']; $_SESSION['CompanyId']=$row['CompanyId']; 
	   $_SESSION['uFND']=$row['User_pass']; 
    
       if(($row['User_name']==$_POST['username']) AND ($EncUserPass==$_POST['userpass']) AND ($row['User_status']=='A') AND ($row['User_type']=='M' OR $row['User_type']=='S' OR $row['User_type']=='A' OR $row['User_type']=='U'))
          { 
	$SqlULog=mysql_query("insert into hrm_logbook_user(UserId, UDateTime, CompanyId) values(".$_SESSION['AXAUESRUserId'].", '".date("Y-m-d h:i:s")."', ".$_SESSION['CompanyId'].")");
	header('Location:AdminUser/Index.php?log='.$_POST['Login']);
		  }
	 }
   elseif(($row['User_name']!=$_POST['username'] AND $EncUserPass!=$_POST['userpass'] AND $row['CompanyId']!=$_POST['companyadmin']) OR ($row['User_name']==$_POST['username'] AND $EncUserPass!=$_POST['userpass'] AND $row['CompanyId']!=$_POST['companyadmin']) OR ($row['User_name']!=$_POST['username'] AND $EncUserPass==$_POST['userpass'] AND $row['CompanyId']!=$_POST['companyadmin']) OR ($row['User_name']==$_POST['username'] AND $EncUserPass==$_POST['userpass'] AND $row['CompanyId']!=$_POST['companyadmin']) OR ($row['User_name']==$_POST['username'] AND $EncUserPass==$_POST['userpass'] AND $row['CompanyId']==$_POST['companyadmin'] AND $row['User_status']=='D'))
   {echo "<div style='position:absolute; top:180px; left:450px;  height:85px;'><hi><font color=ffffff size=4>You are not authorized to enter this site...</font></hi></div>";}
}

//Employee Login

if(isset($_POST['Emp']))
{  
if($_POST['companyemp']=="1"){ $result=mysql_query("select YearId, FromDate, ToDate from hrm_year where Company1Status='A'", $con);}
elseif($_POST['companyemp']=="2"){ $result=mysql_query("select YearId, FromDate, ToDate from hrm_year where Company2Status='A'", $con);}
elseif($_POST['companyemp']=="3"){ $result=mysql_query("select YearId, FromDate, ToDate from hrm_year where Company3Status='A'", $con);}
elseif($_POST['companyemp']=="4"){ $result=mysql_query("select YearId, FromDate, ToDate from hrm_year where Company4Status='A'", $con);}
elseif($_POST['companyemp']=="5"){ $result=mysql_query("select YearId, FromDate, ToDate from hrm_year where Company5Status='A'", $con);}
elseif($_POST['companyemp']=="6"){ $result=mysql_query("select YearId, FromDate, ToDate from hrm_year where Company6Status='A'", $con);}
$res=mysql_fetch_array($result); $_SESSION['YearId']=$res['YearId']; $_SESSION['fromdate']=$res['FromDate']; $_SESSION['todate']=$res['ToDate']; 
$_SESSION['Company1Status']=$res['Company1Status']; $_SESSION['Company2Status']=$res['Company2Status']; $_SESSION['Company3Status']=$res['Company3Status'];
$_SESSION['Company4Status']=$res['Company4Status']; $_SESSION['Company5Status']=$res['Company5Status']; $_SESSION['Company6Status']=$res['Company6Status'];

$sql = mysql_query("SELECT * FROM hrm_employee WHERE EmpCode='".$_POST['empcode']."' AND CompanyId='".$_POST['companyemp']."' AND EmpStatus='A' AND (EmpType='E' OR EmpType='M')", $con);
   $row2 = mysql_fetch_assoc($sql); 
   if(mysql_num_rows($sql)==1)
     { $EncPass=decrypt($row2['EmpPass']); //$EncPass=decrypt($row2['EmpPass']);
	   $_SESSION['login'] = true; $_SESSION['EmpCode']=$row2['EmpCode'];  $_SESSION['EmployeeID']=$row2['EmployeeID']; $_SESSION['CompanyId']=$row2['CompanyId'];
	   $_SESSION['eFND']=$row2['EmpPass'];
	   
      if($row2['EmpCode']==$_POST['empcode'] AND $EncPass==$_POST['emppass'] AND ($row2['EmpType']=='E' OR $row2['EmpType']=='M')  AND $row2['EmpStatus']=='A')
      { 
	$SqlULog=mysql_query("insert into hrm_logbook_emp(EmployeeID, EDateTime, CompanyId) values(".$_SESSION['EmployeeID'].", '".date("Y-m-d h:i:s")."', ".$_SESSION['CompanyId'].")"); 
	header('Location:Employee/EmpHome.php?log='.$_POST['Login']); 
	  }
    }   
   elseif(($row2['EmpCode']!=$_POST['empcode'] AND  $EncPass!=$_POST['emppass'] AND $row2['CompanyId']!=$_POST['companyemp']) OR ($row2['EmpCode']==$_POST['empcode'] AND $EncPass!=$_POST['emppass'] AND $row2['CompanyId']!=$_POST['companyemp']) OR ($row2['EmpCode']!=$_POST['empcode'] AND $EncPass==$_POST['emppass'] AND $row2['CompanyId']!=$_POST['companyemp']) OR ($row2['EmpCode']==$_POST['empcode'] AND $EncPass==$_POST['emppass'] AND $row2['CompanyId']!=$_POST['companyemp']) OR ($row2['EmpCode']==$_POST['empcode'] AND $EncPass==$_POST['emppass'] AND $row2['CompanyId']==$_POST['companyemp'] AND $row2['EmpStatus']=='D'))
   { echo "<div style='position:absolute; top:180px; left:450px;  height:85px;'><hi><font color=ffffff size=4>You are not authorized to enter this site...</font></h1></div>"; }
}	 
?>