<?php session_start();
$EmployeeId=$_SESSION['EmployeeID']; $UserId=$_SESSION['EmployeeID'];
$Sp=mysql_query("select * from hrm_sales_useremp where UserEmpId=".$EmployeeId, $con); $resSp=mysql_fetch_assoc($Sp); 
$UserType=$resSp['UserEmpType']; $Sts=$resSp['Status']; 
$SpEmp=mysql_query("select CompanyId from hrm_employee where EmployeeId=".$EmployeeId, $con); $resSpEmp=mysql_fetch_assoc($SpEmp); $CompanyId=$resSpEmp['CompanyId'];
$sqly=mysql_query("select YearId,FromDate,ToDate from hrm_year where Company".$CompanyId."Status='A'", $con); $resy=mysql_fetch_assoc($sqly);
$SqlCom=mysql_query("select CompanyName from hrm_company_basic where CompanyId=".$CompanyId, $con); $resCom=mysql_fetch_assoc($SqlCom);
$YearId=$resy['YearId']; $fromdate=date("Y",strtotime($resy['FromDate'])); $todate=date("Y",strtotime($resy['ToDate']));
if(date("m")==4 OR date("m")==5 OR date("m")==6){$qtr=1;}elseif(date("m")==7 OR date("m")==8 OR date("m")==9){$qtr=2;}
elseif(date("m")==10 OR date("m")==11 OR date("m")==12){$qtr=3;}elseif(date("m")==1 OR date("m")==2 OR date("m")==3){$qtr=4;}
$login=$_SESSION['login'];

/*
 $UserId=$_SESSION['userid']; $CompanyId=1; $UserName=$_SESSION['username']; 
$UserStatus=$_SESSION['UserStatus']; $UserType=$_SESSION['User_type'];
$sql=mysql_query("select * from hrm_sales_user where SalesUserId=".$UserId, $con); $res=mysql_fetch_assoc($sql);
$sqly=mysql_query("select YearId,FromDate,ToDate from hrm_sales_year where Company1='A'", $con); $resy=mysql_fetch_assoc($sqly);
$fromdate=date("Y",strtotime($resy['FromDate'])); $todate=date("Y",strtotime($resy['ToDate']));
$YearId=$resy['YearId'];
*/
?>
