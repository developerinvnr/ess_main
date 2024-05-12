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
<Script type="text/javascript">window.history.forward(1);</Script>
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
	  <td class="heading" valign="top" style="width:250px;">Ageing(ManPower Slab)&nbsp;</td>	     
   </tr>
   </table>
  </td>
 </tr>
<?php if($_SESSION['login']=true){ ?>	
 <tr>
<?php //*********************************************** Open Department******************************************************?> 
<td align="left" id="type" valign="top" style="display:block; width:100%">             
<input type="hidden" id="ey" name="ey" value="<?php echo $_REQUEST['y']; ?>" />  
<table border="0" style="width:1000px;">

<tr>
 <td align="left">
  <table border="1" border="1" bgcolor="#FFFFFF">
  <tr bgcolor="#7a6189">
   <td colspan="2" align="center" class="font" style="width:200px;">DEPARTMENT</td>
   <td align="center" class="font" style="width:60px;">18-20 Yrs</td>
   <td align="center" class="font" style="width:60px;">20-25 Yrs</td>
   <td align="center" class="font" style="width:60px;">25-30 Yrs</td>
   <td align="center" class="font" style="width:60px;">30-35 Yrs</td>
   <td align="center" class="font" style="width:60px;">35-40 Year</td>
   <td align="center" class="font" style="width:60px;">40-45 Yrs</td>
   <td align="center" class="font" style="width:60px;">45-50 Yrs</td>
   <td align="center" class="font" style="width:60px;">50-55 Yrs</td>
   <td align="center" class="font" style="width:60px;">55-60 Yrs</td>
   <td align="center" class="font" style="width:60px;">>60 Yrs</td>
   <td align="center" class="font" style="width:60px;">TOTAL</td>
   <td align="center" class="font" style="width:60px;">%</td>
  </tr>
<?php $today=date("Y-m-d"); $timestamp = strtotime($today); 
      $date=date_create($today); $date1=date_create($today); $date2=date_create($today); $date3=date_create($today); $date4=date_create($today);
	  $date5=date_create($today); $date6=date_create($today); $date7=date_create($today); $date8=date_create($today); $date9=date_create($today);
      $d18=date_add($date, date_interval_create_from_date_string('-18 years')); $y18=date_format($d18, 'Y-m-d'); //echo 'aa='.$y18.'<br>';
	  $d20=date_add($date1, date_interval_create_from_date_string('-20 years')); $y20=date_format($d20, 'Y-m-d'); //echo 'aa='.$y20.'<br>';
	  $d25=date_add($date2, date_interval_create_from_date_string('-25 years')); $y25=date_format($d25, 'Y-m-d'); //echo 'aa='.$y25.'<br>';
	  $d30=date_add($date3, date_interval_create_from_date_string('-30 years')); $y30=date_format($d30, 'Y-m-d'); //echo 'aa='.$y30.'<br>';
	  $d35=date_add($date4, date_interval_create_from_date_string('-35 years')); $y35=date_format($d35, 'Y-m-d'); //echo 'aa='.$y35.'<br>';
	  $d40=date_add($date5, date_interval_create_from_date_string('-40 years')); $y40=date_format($d40, 'Y-m-d'); //echo 'aa='.$y40.'<br>';
	  $d45=date_add($date6, date_interval_create_from_date_string('-45 years')); $y45=date_format($d45, 'Y-m-d'); //echo 'aa='.$y45.'<br>';
	  $d50=date_add($date7, date_interval_create_from_date_string('-50 years')); $y50=date_format($d50, 'Y-m-d'); //echo 'aa='.$y50.'<br>';
	  $d55=date_add($date8, date_interval_create_from_date_string('-55 years')); $y55=date_format($d55, 'Y-m-d'); //echo 'aa='.$y55.'<br>';
	  $d60=date_add($date9, date_interval_create_from_date_string('-60 years')); $y60=date_format($d60, 'Y-m-d'); //echo 'aa='.$y60.'<br>';
 $sql=mysql_query("select DepartmentId,DepartmentName from hrm_department where DeptStatus='A' AND CompanyId=".$CompanyId." order by DepartmentName ASC",$con); 
 $SNo=1; while($res=mysql_fetch_array($sql)){ 
?>
<tr id="TR<?php echo $SNo; ?>">
   <td align="center" style="width:50px;"><input type="checkbox" id="Chk<?php echo $SNo; ?>" onClick="FucChk(<?php echo $SNo; ?>)" /></td>
   <td align="" class="font1">&nbsp;<?php echo $res['DepartmentName']; ?></td>
<?php $sql1=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND hrm_employee_general.DepartmentId=".$res['DepartmentId']." AND hrm_employee_general.DOB>='".$y20."' AND hrm_employee_general.DOB<'".$y18."' ",$con); $row1=mysql_num_rows($sql1); ?><td align="center" class="font1"><?php if($row1>0){echo $row1;} ?></td>
<?php $sql2=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND hrm_employee_general.DepartmentId=".$res['DepartmentId']." AND hrm_employee_general.DOB>='".$y25."' AND hrm_employee_general.DOB<'".$y20."' ",$con); $row2=mysql_num_rows($sql2); ?><td align="center" class="font1"><?php if($row2>0){echo $row2;} ?></td>
<?php $sql3=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND hrm_employee_general.DepartmentId=".$res['DepartmentId']." AND hrm_employee_general.DOB>='".$y30."' AND hrm_employee_general.DOB<'".$y25."' ",$con); $row3=mysql_num_rows($sql3); ?><td align="center" class="font1"><?php if($row3>0){echo $row3;} ?></td>
<?php $sql4=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND hrm_employee_general.DepartmentId=".$res['DepartmentId']." AND hrm_employee_general.DOB>='".$y35."' AND hrm_employee_general.DOB<'".$y30."' ",$con); $row4=mysql_num_rows($sql4); ?><td align="center" class="font1"><?php if($row4>0){echo $row4;} ?></td>
<?php $sql5=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND hrm_employee_general.DepartmentId=".$res['DepartmentId']." AND hrm_employee_general.DOB>='".$y40."' AND hrm_employee_general.DOB<'".$y35."' ",$con); $row5=mysql_num_rows($sql5); ?><td align="center" class="font1"><?php if($row5>0){echo $row5;} ?></td>
<?php $sql6=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND hrm_employee_general.DepartmentId=".$res['DepartmentId']." AND hrm_employee_general.DOB>='".$y45."' AND hrm_employee_general.DOB<'".$y40."' ",$con); $row6=mysql_num_rows($sql6); ?><td align="center" class="font1"><?php if($row6>0){echo $row6;} ?></td>
<?php $sql7=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND hrm_employee_general.DepartmentId=".$res['DepartmentId']." AND hrm_employee_general.DOB>='".$y50."' AND hrm_employee_general.DOB<'".$y45."' ",$con); $row7=mysql_num_rows($sql7); ?><td align="center" class="font1"><?php if($row7>0){echo $row7;} ?></td>
<?php $sql8=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND hrm_employee_general.DepartmentId=".$res['DepartmentId']." AND hrm_employee_general.DOB>='".$y55."' AND hrm_employee_general.DOB<'".$y50."' ",$con); $row8=mysql_num_rows($sql8); ?><td align="center" class="font1"><?php if($row8>0){echo $row8;} ?></td>
<?php $sql9=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND hrm_employee_general.DepartmentId=".$res['DepartmentId']." AND hrm_employee_general.DOB>='".$y60."' AND hrm_employee_general.DOB<'".$y55."'",$con); $row9=mysql_num_rows($sql9); ?><td align="center" class="font1"><?php if($row9>0){echo $row9;} ?></td>
<?php $sql10=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND hrm_employee_general.DepartmentId=".$res['DepartmentId']." AND hrm_employee_general.DOB<'".$y60."'",$con); $row10=mysql_num_rows($sql10); ?> <td align="center" class="font1"><?php if($row10>0){echo $row10;} ?></td>
<?php $sql11=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND hrm_employee_general.DepartmentId=".$res['DepartmentId'],$con); $row11=mysql_num_rows($sql11); ?> 
   <td align="center" class="font1" bgcolor="#FFB0FF"><?php if($row11>0){echo $row11;} ?></td>
<?php $sqlt=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId."",$con); $rowt=mysql_num_rows($sqlt); ?>    
   <td align="center" class="font1" bgcolor="#9BCDFF"><?php echo round(($row11*100)/$rowt,2); ?></td>
  </tr>
 <?php $SNo++;} ?>
  <tr bgcolor="#FFB0FF">
   <td colspan="2" class="font1" align="right"><b>TOTAL:</b>&nbsp;</td>
<?php $sql1=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND hrm_employee_general.DOB>='".$y20."' AND hrm_employee_general.DOB<'".$y18."' ",$con); 
$row1=mysql_num_rows($sql1); ?><td align="center" class="font1"><?php if($row1>0){echo $row1;} ?></td>
<?php $sql2=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND hrm_employee_general.DOB>='".$y25."' AND hrm_employee_general.DOB<'".$y20."' ",$con); 
$row2=mysql_num_rows($sql2); ?><td align="center" class="font1"><?php if($row2>0){echo $row2;} ?></td>
<?php $sql3=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND hrm_employee_general.DOB>='".$y30."' AND hrm_employee_general.DOB<'".$y25."' ",$con); 
$row3=mysql_num_rows($sql3); ?><td align="center" class="font1"><?php if($row3>0){echo $row3;} ?></td>
<?php $sql4=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND hrm_employee_general.DOB>='".$y35."' AND hrm_employee_general.DOB<'".$y30."' ",$con); 
$row4=mysql_num_rows($sql4); ?><td align="center" class="font1"><?php if($row4>0){echo $row4;} ?></td>
<?php $sql5=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND hrm_employee_general.DOB>='".$y40."' AND hrm_employee_general.DOB<'".$y35."' ",$con); 
$row5=mysql_num_rows($sql5); ?><td align="center" class="font1"><?php if($row5>0){echo $row5;} ?></td>
<?php $sql6=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND hrm_employee_general.DOB>='".$y45."' AND hrm_employee_general.DOB<'".$y40."' ",$con); 
$row6=mysql_num_rows($sql6); ?><td align="center" class="font1"><?php if($row6>0){echo $row6;} ?></td>
<?php $sql7=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND hrm_employee_general.DOB>='".$y50."' AND hrm_employee_general.DOB<'".$y45."' ",$con); 
$row7=mysql_num_rows($sql7); ?><td align="center" class="font1"><?php if($row7>0){echo $row7;} ?></td>
<?php $sql8=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND hrm_employee_general.DOB>='".$y55."' AND hrm_employee_general.DOB<'".$y50."' ",$con); 
$row8=mysql_num_rows($sql8); ?><td align="center" class="font1"><?php if($row8>0){echo $row8;} ?></td>
<?php $sql9=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND hrm_employee_general.DOB>='".$y60."' AND hrm_employee_general.DOB<'".$y55."'",$con); 
$row9=mysql_num_rows($sql9); ?><td align="center" class="font1"><?php if($row9>0){echo $row9;} ?></td>
<?php $sql10=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND hrm_employee_general.DOB<'".$y60."'",$con); $row10=mysql_num_rows($sql10); ?> 
   <td align="center" class="font1"><?php if($row10>0){echo $row10;} ?></td>
<?php $sql11=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId,$con); $row11=mysql_num_rows($sql11); ?> 
   <td align="center" class="font1" bgcolor="#B0FB4D"><?php if($row11>0){echo $row11;} ?></td>   
  </tr>  
  <tr bgcolor="#9BCDFF">
<?php $sql11t=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId,$con); $row11t=mysql_num_rows($sql11t); ?> 	
   <td colspan="2" class="font1" align="right"><b>%</b>&nbsp;</td>
<?php $sql1t=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND hrm_employee_general.DOB>='".$y20."' AND hrm_employee_general.DOB<'".$y18."' ",$con); 
$row1t=mysql_num_rows($sql1t); ?><td align="center" class="font1"><?php echo round(($row1t*100)/$row11t,2); ?></td>
<?php $sql2t=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND hrm_employee_general.DOB>='".$y25."' AND hrm_employee_general.DOB<'".$y20."' ",$con); 
$row2t=mysql_num_rows($sql2t); ?><td align="center" class="font1"><?php echo round(($row2t*100)/$row11t,2); ?></td>
<?php $sql3t=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND hrm_employee_general.DOB>='".$y30."' AND hrm_employee_general.DOB<'".$y25."' ",$con); 
$row3t=mysql_num_rows($sql3t); ?><td align="center" class="font1"><?php echo round(($row3t*100)/$row11t,2); ?></td>
<?php $sql4t=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND hrm_employee_general.DOB>='".$y35."' AND hrm_employee_general.DOB<'".$y30."' ",$con); 
$row4t=mysql_num_rows($sql4t); ?><td align="center" class="font1"><?php echo round(($row4t*100)/$row11t,2); ?></td>
<?php $sql5t=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND hrm_employee_general.DOB>='".$y40."' AND hrm_employee_general.DOB<'".$y35."' ",$con); 
$row5t=mysql_num_rows($sql5t); ?><td align="center" class="font1"><?php echo round(($row5t*100)/$row11t,2); ?></td>
<?php $sql6t=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND hrm_employee_general.DOB>='".$y45."' AND hrm_employee_general.DOB<'".$y40."' ",$con); 
$row6t=mysql_num_rows($sql6t); ?><td align="center" class="font1"><?php echo round(($row6t*100)/$row11t,2); ?></td>
<?php $sql7t=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND hrm_employee_general.DOB>='".$y50."' AND hrm_employee_general.DOB<'".$y45."' ",$con); 
$row7t=mysql_num_rows($sql7t); ?><td align="center" class="font1"><?php echo round(($row7t*100)/$row11t,2); ?></td>
<?php $sql8t=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND hrm_employee_general.DOB>='".$y55."' AND hrm_employee_general.DOB<'".$y50."' ",$con); 
$row8t=mysql_num_rows($sql8t); ?><td align="center" class="font1"><?php echo round(($row8t*100)/$row11t,2); ?></td>
<?php $sql9t=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND hrm_employee_general.DOB>='".$y60."' AND hrm_employee_general.DOB<'".$y55."'",$con); 
$row9t=mysql_num_rows($sql9t); ?><td align="center" class="font1"><?php echo round(($row9t*100)/$row11t,2); ?></td>
<?php $sql10t=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND hrm_employee_general.DOB<'".$y60."'",$con); $row10t=mysql_num_rows($sql10t); ?> 
   <td align="center" class="font1"><?php echo round(($row10t*100)/$row11t,2); ?></td>
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
	<tr>
	  <td valign="top" align="center">
	    <table border="0" style="margin-top:0px;">
				<tr>
	              <td align="center"><img src="images/home1.png"></td>
				</tr>
	    </table>
	  </td>
	</tr>
	<tr>
	  <td valign="top">
	    <?php require_once("../footer.php"); ?>
	  </td>
	</tr>
  </table>
 </td>
</tr>
</table>
</body>
</html>