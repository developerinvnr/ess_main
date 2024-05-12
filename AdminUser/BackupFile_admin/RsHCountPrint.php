<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}
?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style> .font { color:#ffffff;font-family:Times New Roman;height:22px;font-size:12px;font-weight:bold;} 
.font1 { font-family:Times New Roman;font-size:12px; color:#000000;} 
.font2 { font-size:11px;width:260px;height:18px;} .font4 { color:#1FAD34; font-family:Georgia; font-size:15px;}
.span {display:none; font-family:Courier New; font-size:14px; }.span1 {display:block; font-family:Courier New; font-size:14px; }
.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;}
.SaveButton {background-image:url(images/save.gif); width:20px; height:20px; background-repeat:no-repeat; background-color:#FFFFFF; border-color:#FFFFFF; border-bottom:inherit;}
.EditSelect { font-family:Georgia; font-size:11px; width:120px; height:18px;}
.InputText {font-family:Times New Roman;font-size:12px;height:20px;color:#000066;}
.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}
</style>
<script type="text/javascript" src="js/stuHover.js" ></script>
<Script>
window.print(); //window.close();
</SCRIPT> 
</head>
<body class="body">
<table class="table">
<tr>
 <td valign="top">
  <table width="100%" style="margin-top:0px;" border="0">
	 <tr>
	  <td valign="top" align="center"  width="100%" id="MainWindow"><br>
<?php //************************************************************************************************************************************************************?>
<?php //**********************************************START*****START*****START******START******START***************************************************************?>
<?php //************************************************************************************************************************************************************?>
<table border="0" style="margin-top:0px; width:100%; height:300px;">
 <tr>
  <td align="left" height="20" valign="top" colspan="3">
   <table border="0">
    <tr>
	  <td class="heading" valign="top" style="width:250px;">Head Count & Attrition&nbsp;</td>
<?php if($_REQUEST['y']!=0){ $BeforeYId=$_REQUEST['y']-1; 
      $sY=mysql_query("select * from hrm_year where YearId=".$_REQUEST['y']."", $con); $rY=mysql_fetch_assoc($sY); } 
      $FD=date("Y",strtotime($rY['FromDate'])); $TD=date("Y",strtotime($rY['ToDate'])); $PRD=$FD.'-'.$TD; 
	   ?>	     
	<td class="td1" style="font-size:14px;font-family:Times New Roman;" valign="top">&nbsp;&nbsp;<b>Year:</b>&nbsp;<select style="font-size:12px; width:100px; background-color:#DDFFBB;" name="YearID" id="YearID" onChange="SelectYear(this.value)">
<?php if($_REQUEST['y']!=0){ ?><option value="<?php echo $_REQUEST['y']; ?>" selected><?php echo $PRD; ?></option><?php } ?>
</select>
   </td>
   </tr>
   </table>
  </td>
 </tr>
<?php if($_SESSION['login']=true){ ?>	
 <tr>
<?php //*********************************************** Open Department******************************************************?> 
<td align="left" id="type" valign="top" style="display:block; width:100%">             
<input type="hidden" id="ey" name="ey" value="<?php echo $_REQUEST['y']; ?>" />  
<table border="0" style="width:2400px;">
<?php if($YearId==$_REQUEST['y']){ $m=date("m");} else {$m=0;} ?>
<tr>
 <td align="left">
  <table border="1" border="1" bgcolor="#FFFFFF">
  <tr bgcolor="#7a6189">
   <td rowspan="2" colspan="2" align="center" class="font" style="width:100px;">SN</td>
   <td rowspan="2" align="center" class="font" style="width:150px;">DEPARTMENT</td>
   <td rowspan="2" align="center" class="font" style="width:50px;">TOTAL</td>
<td colspan="3" align="center" class="font" style="width:150px;">APR</td>  
<?php if($m!=4){ ?><td colspan="3" align="center" class="font" style="width:150px;">MAY</td><?php } ?>
<?php if($m!=4 AND $m!=5){ ?><td colspan="3" align="center" class="font" style="width:150px;">JUN</td><?php } ?>
<?php if($m!=4 AND $m!=5 AND $m!=6){ ?><td colspan="3" align="center" class="font" style="width:150px;">JUL</td><?php } ?>
<?php if($m!=4 AND $m!=5 AND $m!=6 AND $m!=7){ ?><td colspan="3" align="center" class="font" style="width:150px;">AUG</td><?php } ?>
<?php if($m!=4 AND $m!=5 AND $m!=6 AND $m!=7 AND $m!=8){ ?><td colspan="3" align="center" class="font" style="width:150px;">SEP</td><?php } ?>
<?php if($m!=4 AND $m!=5 AND $m!=6 AND $m!=7 AND $m!=8 AND $m!=9){ ?><td colspan="3" align="center" class="font" style="width:150px;">OCT</td><?php } ?>
<?php if($m!=4 AND $m!=5 AND $m!=6 AND $m!=7 AND $m!=8 AND $m!=9 AND $m!=10){ ?><td colspan="3" align="center" class="font" style="width:150px;">NOV</td><?php } ?>
<?php if($m!=4 AND $m!=5 AND $m!=6 AND $m!=7 AND $m!=8 AND $m!=9 AND $m!=10 AND $m!=11){ ?><td colspan="3" align="center" class="font" style="width:150px;">DEC</td><?php } ?>
<?php if($m!=4 AND $m!=5 AND $m!=6 AND $m!=7 AND $m!=8 AND $m!=9 AND $m!=10 AND $m!=11 AND $m!=12){ ?><td colspan="3" align="center" class="font" style="width:150px;">JAN</td><?php } ?>
<?php if($m!=4 AND $m!=5 AND $m!=6 AND $m!=7 AND $m!=8 AND $m!=9 AND $m!=10 AND $m!=11 AND $m!=12 AND $m!=1){ ?><td colspan="3" align="center" class="font" style="width:150px;">FEB</td><?php } ?>
<?php if($m!=4 AND $m!=5 AND $m!=6 AND $m!=7 AND $m!=8 AND $m!=9 AND $m!=10 AND $m!=11 AND $m!=12 AND $m!=1 AND $m!=2){ ?><td colspan="3" align="center" class="font" style="width:150px;">MAR</td><?php } ?>
   <td rowspan="2" align="center" class="font" style="width:50px;">TOTAL APPT</td>
   <td rowspan="2" align="center" class="font" style="width:50px;">TOTAL REGT</td>
   <td rowspan="2" align="center" class="font" style="width:50px;">TOTAL EMP</td>
  </tr>
<?php if($m==4){$j=1;}elseif($m==5){$j=2;}elseif($m==6){$j=3;}elseif($m==7){$j=4;}elseif($m==8){$j=5;}elseif($m==9){$j=6;}elseif($m==10){$j=7;}elseif($m==11){$j=8;}elseif($m==12){$j=9;}elseif($m==1){$j=10;}elseif($m==2){$j=11;}elseif($m==3){$j=12;}else{$j=12;} ?>  
  <tr bgcolor="#7a6189">
  <?php for($i=1; $i<=$j; $i++){ ?>
   <td align="center" class="font" style="width:50px;">Appt</td>
   <td align="center" class="font" style="width:50px;">Regt</td>
   <td align="center" class="font" style="width:50px;">Emp</td>
   <?php } ?>
  </tr>
<?php $today=date("Y-m-d"); $timestamp = strtotime($today); 
 $sql=mysql_query("select DepartmentId,DepartmentName from hrm_department where DeptStatus='A' AND CompanyId=".$CompanyId." order by DepartmentName ASC",$con); 
 $SNo=1; while($res=mysql_fetch_array($sql)){ 
?>
<tr id="TR<?php echo $SNo; ?>">
   <td align="center" style="width:50px;"><input type="checkbox" id="Chk<?php echo $SNo; ?>" onClick="FucChk(<?php echo $SNo; ?>)" /></td>
   <td align="center" style="width:50px;" class="font1">&nbsp;<?php echo $SNo; ?>&nbsp;</td>
   <td align="" class="font1">&nbsp;<?php echo $res['DepartmentName']; ?></td>
<?php $sqlDc=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND DateJoining<='".$FD."-03-31' AND hrm_employee_general.DepartmentId=".$res['DepartmentId'],$con); 
$rowDc=mysql_num_rows($sqlDc); ?><td align="center" class="font1" bgcolor="#C4FF88">&nbsp;<?php echo $rowDc; ?></td>
<?php $sql1=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where DateJoining>='".$FD."-04-01' AND DateJoining<='".$FD."-04-31' AND DepartmentId=".$res['DepartmentId']." AND hrm_employee.CompanyId=".$CompanyId, $con); $row1=mysql_num_rows($sql1);
$sql2=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where EmpStatus!='De' AND DateOfResignation>='".$FD."-04-01' AND DateOfResignation<='".$FD."-04-31' AND DepartmentId=".$res['DepartmentId']." AND hrm_employee.CompanyId=".$CompanyId, $con); 
$row2=mysql_num_rows($sql2); $Tot4=$rowDc+$row1; $TotE4=$Tot4-$row2; ?>   
<td align="center" class="font1"><?php if($row1>0){echo $row1;} ?></td>
<td align="center" class="font1"><?php if($row2>0){echo $row2;} ?></td>
<td align="center" class="font1"><?php if($TotE4>0){echo $TotE4;} ?></td>
<?php $sql1=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where EmpStatus!='De' AND DateJoining>='".$FD."-05-01' AND DateJoining<='".$FD."-05-31' AND DepartmentId=".$res['DepartmentId']." AND hrm_employee.CompanyId=".$CompanyId, $con); $row1=mysql_num_rows($sql1);
$sql2=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where EmpStatus!='De' AND DateOfResignation>='".$FD."-05-01' AND DateOfResignation<='".$FD."-05-31' AND DepartmentId=".$res['DepartmentId']." AND hrm_employee.CompanyId=".$CompanyId, $con); 
$row2=mysql_num_rows($sql2); $Tot5=$TotE4+$row1; $TotE5=$Tot5-$row2; ?>  
<?php if($m!=4){ ?> 
<td align="center" class="font1"><?php if($row1>0){echo $row1;} ?></td>
<td align="center" class="font1"><?php if($row2>0){echo $row2;} ?></td>
<td align="center" class="font1"><?php if($TotE5>0){echo $TotE5;} ?></td>
<?php } ?>
<?php $sql1=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where EmpStatus!='De' AND DateJoining>='".$FD."-06-01' AND DateJoining<='".$FD."-06-31' AND DepartmentId=".$res['DepartmentId']." AND hrm_employee.CompanyId=".$CompanyId, $con); $row1=mysql_num_rows($sql1);
$sql2=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where EmpStatus!='De' AND DateOfResignation>='".$FD."-06-01' AND DateOfResignation<='".$FD."-06-31' AND DepartmentId=".$res['DepartmentId']." AND hrm_employee.CompanyId=".$CompanyId, $con); 
$row2=mysql_num_rows($sql2); $Tot6=$TotE5+$row1; $TotE6=$Tot6-$row2; ?>  
<?php if($m!=4 AND $m!=5){ ?> 
<td align="center" class="font1"><?php if($row1>0){echo $row1;} ?></td>
<td align="center" class="font1"><?php if($row2>0){echo $row2;} ?></td>
<td align="center" class="font1"><?php if($TotE6>0){echo $TotE6;} ?></td>
<?php } ?>
<?php $sql1=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where EmpStatus!='De' AND DateJoining>='".$FD."-07-01' AND DateJoining<='".$FD."-07-31' AND DepartmentId=".$res['DepartmentId']." AND hrm_employee.CompanyId=".$CompanyId, $con); $row1=mysql_num_rows($sql1);
$sql2=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where EmpStatus!='De' AND DateOfResignation>='".$FD."-07-01' AND DateOfResignation<='".$FD."-07-31' AND DepartmentId=".$res['DepartmentId']." AND hrm_employee.CompanyId=".$CompanyId, $con); 
$row2=mysql_num_rows($sql2); $Tot7=$TotE6+$row1; $TotE7=$Tot7-$row2; ?>  
<?php if($m!=4 AND $m!=5 AND $m!=6){ ?> 
<td align="center" class="font1"><?php if($row1>0){echo $row1;} ?></td>
<td align="center" class="font1"><?php if($row2>0){echo $row2;} ?></td>
<td align="center" class="font1"><?php if($TotE7>0){echo $TotE7;} ?></td>
<?php } ?>
<?php $sql1=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where EmpStatus!='De' AND DateJoining>='".$FD."-08-01' AND DateJoining<='".$FD."-08-31' AND DepartmentId=".$res['DepartmentId']." AND hrm_employee.CompanyId=".$CompanyId, $con); $row1=mysql_num_rows($sql1);
$sql2=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where EmpStatus!='De' AND DateOfResignation>='".$FD."-08-01' AND DateOfResignation<='".$FD."-08-31' AND DepartmentId=".$res['DepartmentId']." AND hrm_employee.CompanyId=".$CompanyId, $con); 
$row2=mysql_num_rows($sql2); $Tot8=$TotE7+$row1; $TotE8=$Tot8-$row2; ?> 
<?php if($m!=4 AND $m!=5 AND $m!=6 AND $m!=7){ ?>  
<td align="center" class="font1"><?php if($row1>0){echo $row1;} ?></td>
<td align="center" class="font1"><?php if($row2>0){echo $row2;} ?></td>
<td align="center" class="font1"><?php if($TotE8>0){echo $TotE8;} ?></td>
<?php } ?>
<?php $sql1=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where EmpStatus!='De' AND DateJoining>='".$FD."-09-01' AND DateJoining<='".$FD."-09-31' AND DepartmentId=".$res['DepartmentId']." AND hrm_employee.CompanyId=".$CompanyId, $con); $row1=mysql_num_rows($sql1);
$sql2=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where EmpStatus!='De' AND DateOfResignation>='".$FD."-09-01' AND DateOfResignation<='".$FD."-09-31' AND DepartmentId=".$res['DepartmentId']." AND hrm_employee.CompanyId=".$CompanyId, $con); 
$row2=mysql_num_rows($sql2); $Tot9=$TotE8+$row1; $TotE9=$Tot9-$row2; ?>
<?php if($m!=4 AND $m!=5 AND $m!=6 AND $m!=7 AND $m!=8){ ?>   
<td align="center" class="font1"><?php if($row1>0){echo $row1;} ?></td>
<td align="center" class="font1"><?php if($row2>0){echo $row2;} ?></td>
<td align="center" class="font1"><?php if($TotE9>0){echo $TotE9;} ?></td>
<?php } ?>
<?php $sql1=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where EmpStatus!='De' AND DateJoining>='".$FD."-10-01' AND DateJoining<='".$FD."-10-31' AND DepartmentId=".$res['DepartmentId']." AND hrm_employee.CompanyId=".$CompanyId, $con); $row1=mysql_num_rows($sql1);
$sql2=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where EmpStatus!='De' AND DateOfResignation>='".$FD."-10-01' AND DateOfResignation<='".$FD."-10-31' AND DepartmentId=".$res['DepartmentId']." AND hrm_employee.CompanyId=".$CompanyId, $con); 
$row2=mysql_num_rows($sql2); $Tot10=$TotE9+$row1; $TotE10=$Tot10-$row2; ?> 
<?php if($m!=4 AND $m!=5 AND $m!=6 AND $m!=7 AND $m!=8 AND $m!=9){ ?>  
<td align="center" class="font1"><?php if($row1>0){echo $row1;} ?></td>
<td align="center" class="font1"><?php if($row2>0){echo $row2;} ?></td>
<td align="center" class="font1"><?php if($TotE10>0){echo $TotE10;} ?></td>
<?php } ?>
<?php $sql1=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where EmpStatus!='De' AND DateJoining>='".$FD."-11-01' AND DateJoining<='".$FD."-11-31' AND DepartmentId=".$res['DepartmentId']." AND hrm_employee.CompanyId=".$CompanyId, $con); $row1=mysql_num_rows($sql1);
$sql2=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where EmpStatus!='De' AND DateOfResignation>='".$FD."-11-01' AND DateOfResignation<='".$FD."-11-31' AND DepartmentId=".$res['DepartmentId']." AND hrm_employee.CompanyId=".$CompanyId, $con); 
$row2=mysql_num_rows($sql2); $Tot11=$TotE10+$row1; $TotE11=$Tot11-$row2; ?>
<?php if($m!=4 AND $m!=5 AND $m!=6 AND $m!=7 AND $m!=8 AND $m!=9 AND $m!=10){ ?>   
<td align="center" class="font1"><?php if($row1>0){echo $row1;} ?></td>
<td align="center" class="font1"><?php if($row2>0){echo $row2;} ?></td>
<td align="center" class="font1"><?php if($TotE11>0){echo $TotE11;} ?></td>
<?php } ?>
<?php $sql1=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where EmpStatus!='De' AND DateJoining>='".$FD."-12-01' AND DateJoining<='".$FD."-12-31' AND DepartmentId=".$res['DepartmentId']." AND hrm_employee.CompanyId=".$CompanyId, $con); $row1=mysql_num_rows($sql1);
$sql2=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where EmpStatus!='De' AND DateOfResignation>='".$FD."-12-01' AND DateOfResignation<='".$FD."-12-31' AND DepartmentId=".$res['DepartmentId']." AND hrm_employee.CompanyId=".$CompanyId, $con); 
$row2=mysql_num_rows($sql2); $Tot12=$TotE11+$row1; $TotE12=$Tot12-$row2; ?>   
<?php if($m!=4 AND $m!=5 AND $m!=6 AND $m!=7 AND $m!=8 AND $m!=9 AND $m!=10 AND $m!=11){ ?>
<td align="center" class="font1"><?php if($row1>0){echo $row1;} ?></td>
<td align="center" class="font1"><?php if($row2>0){echo $row2;} ?></td>
<td align="center" class="font1"><?php if($TotE12>0){echo $TotE12;} ?></td>
<?php } ?>
<?php $sql1=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where EmpStatus!='De' AND DateJoining>='".$TD."-01-01' AND DateJoining<='".$TD."-01-31' AND DepartmentId=".$res['DepartmentId']." AND hrm_employee.CompanyId=".$CompanyId, $con); $row1=mysql_num_rows($sql1);
$sql2=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where EmpStatus!='De' AND DateOfResignation>='".$TD."-01-01' AND DateOfResignation<='".$TD."-01-31' AND DepartmentId=".$res['DepartmentId']." AND hrm_employee.CompanyId=".$CompanyId, $con); 
$row2=mysql_num_rows($sql2); $Tot1=$TotE12+$row1; $TotE1=$Tot1-$row2; ?> 
<?php if($m!=4 AND $m!=5 AND $m!=6 AND $m!=7 AND $m!=8 AND $m!=9 AND $m!=10 AND $m!=11 AND $m!=12){ ?>  
<td align="center" class="font1"><?php if($row1>0){echo $row1;} ?></td>
<td align="center" class="font1"><?php if($row2>0){echo $row2;} ?></td>
<td align="center" class="font1"><?php if($TotE1>0){echo $TotE1;} ?></td>
<?php } ?>
<?php $sql1=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where EmpStatus!='De' AND DateJoining>='".$TD."-02-01' AND DateJoining<='".$TD."-02-31' AND DepartmentId=".$res['DepartmentId']." AND hrm_employee.CompanyId=".$CompanyId, $con); $row1=mysql_num_rows($sql1);
$sql2=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where EmpStatus!='De' AND DateOfResignation>='".$TD."-02-01' AND DateOfResignation<='".$TD."-02-31' AND DepartmentId=".$res['DepartmentId']." AND hrm_employee.CompanyId=".$CompanyId, $con); 
$row2=mysql_num_rows($sql2); $Tot2=$TotE1+$row1; $TotE2=$Tot2-$row2; ?>   
<?php if($m!=4 AND $m!=5 AND $m!=6 AND $m!=7 AND $m!=8 AND $m!=9 AND $m!=10 AND $m!=11 AND $m!=12 AND $m!=1){ ?>
<td align="center" class="font1"><?php if($row1>0){echo $row1;} ?></td>
<td align="center" class="font1"><?php if($row2>0){echo $row2;} ?></td>
<td align="center" class="font1"><?php if($TotE2>0){echo $TotE2;} ?></td>
<?php } ?>
<?php $sql1=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where EmpStatus!='De' AND DateJoining>='".$TD."-03-01' AND DateJoining<='".$TD."-03-31' AND DepartmentId=".$res['DepartmentId']." AND hrm_employee.CompanyId=".$CompanyId, $con); $row1=mysql_num_rows($sql1);
$sql2=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where EmpStatus!='De' AND DateOfResignation>='".$TD."-03-01' AND DateOfResignation<='".$TD."-03-31' AND DepartmentId=".$res['DepartmentId']." AND hrm_employee.CompanyId=".$CompanyId, $con); 
$row2=mysql_num_rows($sql2); $Tot3=$TotE2+$row1; $TotE3=$Tot3-$row2; ?>
<?php if($m!=4 AND $m!=5 AND $m!=6 AND $m!=7 AND $m!=8 AND $m!=9 AND $m!=10 AND $m!=11 AND $m!=12 AND $m!=1 AND $m!=2){ ?>   
<td align="center" class="font1"><?php if($row1>0){echo $row1;} ?></td>
<td align="center" class="font1"><?php if($row2>0){echo $row2;} ?></td>
<td align="center" class="font1"><?php if($TotE3>0){echo $TotE3;} ?></td>
<?php } ?>
<?php $sql1t=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where EmpStatus!='De' AND DateJoining>='".$FD."-04-01' AND DateJoining<='".$TD."-03-31' AND DepartmentId=".$res['DepartmentId']." AND hrm_employee.CompanyId=".$CompanyId, $con); 
$row1t=mysql_num_rows($sql1t);
$sql2t=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where EmpStatus!='De' AND DateOfResignation>='".$FD."-04-01' AND DateOfResignation<='".$TD."-03-31' AND DepartmentId=".$res['DepartmentId']." AND hrm_employee.CompanyId=".$CompanyId, $con); 
$row2t=mysql_num_rows($sql2t); $Tott=$rowDc+$row1t; $TotEt=$Tott-$row2t; ?>   
<td align="center" class="font1" bgcolor="#C4FF88"><?php if($row1t>0){echo $row1t;} ?></td>
<td align="center" class="font1" bgcolor="#C4FF88"><?php if($row2t>0){echo $row2t;} ?></td>
<td align="center" class="font1" bgcolor="#C4FF88"><?php if($TotEt>0){echo $TotEt;} ?></td>

  </tr>
 <?php $SNo++;} ?>
 <tr bgcolor="#77BBFF">
   <td align="right" colspan="3" class="font1"><b>&nbsp;TOTAL:&nbsp;</b></td>
<?php $sqlDc=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND DateJoining<='".$FD."-03-31'",$con); 
$rowDc=mysql_num_rows($sqlDc); ?><td align="center" class="font1">&nbsp;<?php echo $rowDc; ?></td>
<?php $sql1=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where DateJoining>='".$FD."-04-01' AND DateJoining<='".$FD."-04-31' AND hrm_employee.CompanyId=".$CompanyId, $con); $row1=mysql_num_rows($sql1);
$sql2=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where EmpStatus!='De' AND DateOfResignation>='".$FD."-04-01' AND DateOfResignation<='".$FD."-04-31' AND hrm_employee.CompanyId=".$CompanyId, $con); 
$row2=mysql_num_rows($sql2); $Tot4=$rowDc+$row1; $TotE4=$Tot4-$row2; ?>  
<td align="center" class="font1"><?php if($row1>0){echo $row1;} ?></td>
<td align="center" class="font1"><?php if($row2>0){echo $row2;} ?></td>
<td align="center" class="font1"><?php if($TotE4>0){echo $TotE4;} ?></td>
<?php $sql1=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where EmpStatus!='De' AND DateJoining>='".$FD."-05-01' AND DateJoining<='".$FD."-05-31' AND hrm_employee.CompanyId=".$CompanyId, $con); $row1=mysql_num_rows($sql1);
$sql2=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where EmpStatus!='De' AND DateOfResignation>='".$FD."-05-01' AND DateOfResignation<='".$FD."-05-31' AND hrm_employee.CompanyId=".$CompanyId, $con); 
$row2=mysql_num_rows($sql2); $Tot5=$TotE4+$row1; $TotE5=$Tot5-$row2; ?>   
<?php if($m!=4){ ?>
<td align="center" class="font1"><?php if($row1>0){echo $row1;} ?></td>
<td align="center" class="font1"><?php if($row2>0){echo $row2;} ?></td>
<td align="center" class="font1"><?php if($TotE5>0){echo $TotE5;} ?></td>
<?php } ?>
<?php $sql1=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where EmpStatus!='De' AND DateJoining>='".$FD."-06-01' AND DateJoining<='".$FD."-06-31' AND hrm_employee.CompanyId=".$CompanyId, $con); $row1=mysql_num_rows($sql1);
$sql2=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where EmpStatus!='De' AND DateOfResignation>='".$FD."-06-01' AND DateOfResignation<='".$FD."-06-31' AND hrm_employee.CompanyId=".$CompanyId, $con); 
$row2=mysql_num_rows($sql2); $Tot6=$TotE5+$row1; $TotE6=$Tot6-$row2; ?> 
<?php if($m!=4 AND $m!=5){ ?>  
<td align="center" class="font1"><?php if($row1>0){echo $row1;} ?></td>
<td align="center" class="font1"><?php if($row2>0){echo $row2;} ?></td>
<td align="center" class="font1"><?php if($TotE6>0){echo $TotE6;} ?></td>
<?php } ?>
<?php $sql1=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where EmpStatus!='De' AND DateJoining>='".$FD."-07-01' AND DateJoining<='".$FD."-07-31' AND hrm_employee.CompanyId=".$CompanyId, $con); $row1=mysql_num_rows($sql1);
$sql2=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where EmpStatus!='De' AND DateOfResignation>='".$FD."-07-01' AND DateOfResignation<='".$FD."-07-31' AND hrm_employee.CompanyId=".$CompanyId, $con); 
$row2=mysql_num_rows($sql2); $Tot7=$TotE6+$row1; $TotE7=$Tot7-$row2; ?>  
<?php if($m!=4 AND $m!=5 AND $m!=6){ ?> 
<td align="center" class="font1"><?php if($row1>0){echo $row1;} ?></td>
<td align="center" class="font1"><?php if($row2>0){echo $row2;} ?></td>
<td align="center" class="font1"><?php if($TotE7>0){echo $TotE7;} ?></td>
<?php } ?>
<?php $sql1=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where EmpStatus!='De' AND DateJoining>='".$FD."-08-01' AND DateJoining<='".$FD."-08-31' AND hrm_employee.CompanyId=".$CompanyId, $con); $row1=mysql_num_rows($sql1);
$sql2=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where EmpStatus!='De' AND DateOfResignation>='".$FD."-08-01' AND DateOfResignation<='".$FD."-08-31' AND hrm_employee.CompanyId=".$CompanyId, $con); 
$row2=mysql_num_rows($sql2); $Tot8=$TotE7+$row1; $TotE8=$Tot8-$row2; ?>  
<?php if($m!=4 AND $m!=5 AND $m!=6 AND $m!=7){ ?> 
<td align="center" class="font1"><?php if($row1>0){echo $row1;} ?></td>
<td align="center" class="font1"><?php if($row2>0){echo $row2;} ?></td>
<td align="center" class="font1"><?php if($TotE8>0){echo $TotE8;} ?></td>
<?php } ?>
<?php $sql1=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where EmpStatus!='De' AND DateJoining>='".$FD."-09-01' AND DateJoining<='".$FD."-09-31' AND hrm_employee.CompanyId=".$CompanyId, $con); $row1=mysql_num_rows($sql1);
$sql2=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where EmpStatus!='De' AND DateOfResignation>='".$FD."-09-01' AND DateOfResignation<='".$FD."-09-31' AND hrm_employee.CompanyId=".$CompanyId, $con); 
$row2=mysql_num_rows($sql2); $Tot9=$TotE8+$row1; $TotE9=$Tot9-$row2; ?> 
<?php if($m!=4 AND $m!=5 AND $m!=6 AND $m!=7 AND $m!=8){ ?>  
<td align="center" class="font1"><?php if($row1>0){echo $row1;} ?></td>
<td align="center" class="font1"><?php if($row2>0){echo $row2;} ?></td>
<td align="center" class="font1"><?php if($TotE9>0){echo $TotE9;} ?></td>
<?php } ?>
<?php $sql1=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where EmpStatus!='De' AND DateJoining>='".$FD."-10-01' AND DateJoining<='".$FD."-10-31' AND hrm_employee.CompanyId=".$CompanyId, $con); $row1=mysql_num_rows($sql1);
$sql2=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where EmpStatus!='De' AND DateOfResignation>='".$FD."-10-01' AND DateOfResignation<='".$FD."-10-31' AND hrm_employee.CompanyId=".$CompanyId, $con); 
$row2=mysql_num_rows($sql2); $Tot10=$TotE9+$row1; $TotE10=$Tot10-$row2; ?>  
<?php if($m!=4 AND $m!=5 AND $m!=6 AND $m!=7 AND $m!=8 AND $m!=9){ ?> 
<td align="center" class="font1"><?php if($row1>0){echo $row1;} ?></td>
<td align="center" class="font1"><?php if($row2>0){echo $row2;} ?></td>
<td align="center" class="font1"><?php if($TotE10>0){echo $TotE10;} ?></td>
<?php } ?>
<?php $sql1=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where EmpStatus!='De' AND DateJoining>='".$FD."-11-01' AND DateJoining<='".$FD."-11-31' AND hrm_employee.CompanyId=".$CompanyId, $con); $row1=mysql_num_rows($sql1);
$sql2=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where EmpStatus!='De' AND DateOfResignation>='".$FD."-11-01' AND DateOfResignation<='".$FD."-11-31' AND hrm_employee.CompanyId=".$CompanyId, $con); 
$row2=mysql_num_rows($sql2); $Tot11=$TotE10+$row1; $TotE11=$Tot11-$row2; ?>   
<?php if($m!=4 AND $m!=5 AND $m!=6 AND $m!=7 AND $m!=8 AND $m!=9 AND $m!=10){ ?>
<td align="center" class="font1"><?php if($row1>0){echo $row1;} ?></td>
<td align="center" class="font1"><?php if($row2>0){echo $row2;} ?></td>
<td align="center" class="font1"><?php if($TotE11>0){echo $TotE11;} ?></td>
<?php } ?>
<?php $sql1=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where EmpStatus!='De' AND DateJoining>='".$FD."-12-01' AND DateJoining<='".$FD."-12-31' AND hrm_employee.CompanyId=".$CompanyId, $con); $row1=mysql_num_rows($sql1);
$sql2=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where EmpStatus!='De' AND DateOfResignation>='".$FD."-12-01' AND DateOfResignation<='".$FD."-12-31' AND hrm_employee.CompanyId=".$CompanyId, $con); 
$row2=mysql_num_rows($sql2); $Tot12=$TotE11+$row1; $TotE12=$Tot12-$row2; ?>  
<?php if($m!=4 AND $m!=5 AND $m!=6 AND $m!=7 AND $m!=8 AND $m!=9 AND $m!=10 AND $m!=11){ ?> 
<td align="center" class="font1"><?php if($row1>0){echo $row1;} ?></td>
<td align="center" class="font1"><?php if($row2>0){echo $row2;} ?></td>
<td align="center" class="font1"><?php if($TotE12>0){echo $TotE12;} ?></td>
<?php } ?>
<?php $sql1=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where EmpStatus!='De' AND DateJoining>='".$TD."-01-01' AND DateJoining<='".$TD."-01-31' AND hrm_employee.CompanyId=".$CompanyId, $con); $row1=mysql_num_rows($sql1);
$sql2=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where EmpStatus!='De' AND DateOfResignation>='".$TD."-01-01' AND DateOfResignation<='".$TD."-01-31' AND hrm_employee.CompanyId=".$CompanyId, $con); 
$row2=mysql_num_rows($sql2); $Tot1=$TotE12+$row1; $TotE1=$Tot1-$row2; ?>   
<?php if($m!=4 AND $m!=5 AND $m!=6 AND $m!=7 AND $m!=8 AND $m!=9 AND $m!=10 AND $m!=11 AND $m!=12){ ?>
<td align="center" class="font1"><?php if($row1>0){echo $row1;} ?></td>
<td align="center" class="font1"><?php if($row2>0){echo $row2;} ?></td>
<td align="center" class="font1"><?php if($TotE1>0){echo $TotE1;} ?></td>
<?php } ?>
<?php $sql1=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where EmpStatus!='De' AND DateJoining>='".$TD."-02-01' AND DateJoining<='".$TD."-02-31' AND hrm_employee.CompanyId=".$CompanyId, $con); $row1=mysql_num_rows($sql1);
$sql2=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where EmpStatus!='De' AND DateOfResignation>='".$TD."-02-01' AND DateOfResignation<='".$TD."-02-31' AND hrm_employee.CompanyId=".$CompanyId, $con); 
$row2=mysql_num_rows($sql2); $Tot2=$TotE1+$row1; $TotE2=$Tot2-$row2; ?>   
<?php if($m!=4 AND $m!=5 AND $m!=6 AND $m!=7 AND $m!=8 AND $m!=9 AND $m!=10 AND $m!=11 AND $m!=12 AND $m!=1){ ?>
<td align="center" class="font1"><?php if($row1>0){echo $row1;} ?></td>
<td align="center" class="font1"><?php if($row2>0){echo $row2;} ?></td>
<td align="center" class="font1"><?php if($TotE2>0){echo $TotE2;} ?></td>
<?php } ?>
<?php $sql1=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where EmpStatus!='De' AND DateJoining>='".$TD."-03-01' AND DateJoining<='".$TD."-03-31' AND hrm_employee.CompanyId=".$CompanyId, $con); $row1=mysql_num_rows($sql1);
$sql2=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where EmpStatus!='De' AND DateOfResignation>='".$TD."-03-01' AND DateOfResignation<='".$TD."-03-31' AND hrm_employee.CompanyId=".$CompanyId, $con); 
$row2=mysql_num_rows($sql2); $Tot3=$TotE2+$row1; $TotE3=$Tot3-$row2; ?>  
<?php if($m!=4 AND $m!=5 AND $m!=6 AND $m!=7 AND $m!=8 AND $m!=9 AND $m!=10 AND $m!=11 AND $m!=12 AND $m!=1 AND $m!=2){ ?> 
<td align="center" class="font1"><?php if($row1>0){echo $row1;} ?></td>
<td align="center" class="font1"><?php if($row2>0){echo $row2;} ?></td>
<td align="center" class="font1"><?php if($TotE3>0){echo $TotE3;} ?></td>
<?php } ?>
<?php $sql1t=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where EmpStatus!='De' AND DateJoining>='".$FD."-04-01' AND DateJoining<='".$TD."-03-31' AND hrm_employee.CompanyId=".$CompanyId, $con); 
$row1t=mysql_num_rows($sql1t);
$sql2t=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where EmpStatus!='De' AND DateOfResignation>='".$FD."-04-01' AND DateOfResignation<='".$TD."-03-31' AND hrm_employee.CompanyId=".$CompanyId, $con); 
$row2t=mysql_num_rows($sql2t); $Tott=$rowDc+$row1t; $TotEt=$Tott-$row2t; ?>   
<td align="center" class="font1"><?php if($row1t>0){echo $row1t;} ?></td>
<td align="center" class="font1"><?php if($row2t>0){echo $row2t;} ?></td>
<td align="center" class="font1"><?php if($TotEt>0){echo $TotEt;} ?></td>
  </tr>
 
 
 
 
	 </table>
	  </td>
    </tr>
  </table>  
</td>
<?php //*********************************************** Close Department******************************************************?>    
 </tr>
<?php } ?> 
</table>
<?php //************************************************************************************************************************************************************?>
<?php //**********************************************END*****END*****END******END******END***************************************************************?>
<?php //************************************************************************************************************************************************************?>
	  </td>
	</tr>
  </table>
 </td>
</tr>
</table>
</body>
</html>