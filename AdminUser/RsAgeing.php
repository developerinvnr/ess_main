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
function SelectYear(v){window.location='RsAgeing.php?y='+v;}

function PrintAgeing(y,c)
{ window.open("RsAgeingPrint.php?action=PrintAgeing&y="+y+"&c="+c,"PrintForm","menubar=yes,scrollbars=yes,resizable=no,directories=no,width=50,height=50");}

function ExportAgeing(y,c)
{ window.open("RsAgeingExport.php?action=RsAgeingExport&y="+y+"&c="+c,"ExportForm","menubar=yes,scrollbars=yes,resizable=no,directories=no,width=20,height=20");}

function FucChk(sn)
{ if(document.getElementById("Chk"+sn).checked==true){document.getElementById("TR"+sn).style.background='#9BEF47'; }
  else if(document.getElementById("Chk"+sn).checked==false){document.getElementById("TR"+sn).style.background='#FFFFFF'; }
}

</SCRIPT> 
</head>
<body class="body">
<table class="table">
<tr>
 <td>
  <table class="menutable"><tr><td><?php if($_SESSION['login'] = true){ require_once("AMenu.php"); } ?></td></tr></table>
 </td>
</tr>
<tr>
 <td valign="top">
  <table width="100%" style="margin-top:0px;" border="0">
    <tr>
	  <td valign="top"><?php if($_SESSION['login'] = true){ require_once("AWelcome.php"); } ?></td>
	</tr>
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
	  <td class="heading" valign="top" style="width:250px;">Ageing(Experience Slab)&nbsp;</td>
<?php if($_REQUEST['y']!=0){ $sY=mysql_query("select * from hrm_year where YearId=".$_REQUEST['y']."", $con); $rY=mysql_fetch_assoc($sY); } 
      $FD=date("Y",strtotime($rY['FromDate'])); $TD=date("Y",strtotime($rY['ToDate'])); $PRD=$FD.'-'.$TD; ?>	     
    <td class="td1" style="font-size:14px;width:2000px;font-family:Times New Roman;" valign="top">&nbsp;&nbsp;
<a href="#" onClick="PrintAgeing(<?php echo $_REQUEST['y'].', '.$CompanyId; ?>)" style="font-size:12px;">Print</a>&nbsp;&nbsp;<a href="#" onClick="ExportAgeing(<?php echo $_REQUEST['y'].', '.$CompanyId; ?>)" style="font-size:12px;">Export Excel</a></td>
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
   <td align="center" class="font" style="width:60px;"><3 Month</td>
   <td align="center" class="font" style="width:60px;">>3M < 1Y</td>
   <td align="center" class="font" style="width:60px;">1-2 Year</td>
   <td align="center" class="font" style="width:60px;">2-3 Year</td>
   <td align="center" class="font" style="width:60px;">3-4 Year</td>
   <td align="center" class="font" style="width:60px;">4-5 Year</td>
   <td align="center" class="font" style="width:60px;">5-6 Year</td>
   <td align="center" class="font" style="width:60px;">6-7 Year</td>
   <td align="center" class="font" style="width:60px;">>7 Year</td>
   <td align="center" class="font" style="width:60px;">TOTAL</td>
   <td align="center" class="font" style="width:60px;">%</td>
  </tr>
<?php $sql=mysql_query("select DepartmentId,DepartmentName from hrm_department where DeptStatus='A' AND CompanyId=".$CompanyId." order by DepartmentName ASC",$con); 
      $SNo=1; while($res=mysql_fetch_array($sql)){ $Today=date("Y-m-d"); ?>
<tr id="TR<?php echo $SNo; ?>">
   <td align="center" style="width:50px;"><input type="checkbox" id="Chk<?php echo $SNo; ?>" onClick="FucChk(<?php echo $SNo; ?>)" /></td>
   <td align="" class="font1">&nbsp;<?php echo $res['DepartmentName']; ?></td>
<?php $BeFore3M=date("Y-m-d",strtotime('-3 month')); $sql1=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND hrm_employee_general.DepartmentId=".$res['DepartmentId']." AND hrm_employee_general.DateJoining>='".$BeFore3M."' ",$con); $row1=mysql_num_rows($sql1); ?>  
   <td align="center" class="font1"><?php if($row1>0){echo $row1;} ?></td>
<?php $BeFore1Y=date("Y-m-d",strtotime('-1 year')); $sql2=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND hrm_employee_general.DepartmentId=".$res['DepartmentId']." AND hrm_employee_general.DateJoining>='".$BeFore1Y."' AND hrm_employee_general.DateJoining<'".$BeFore3M."' ",$con); $row2=mysql_num_rows($sql2); ?>
   <td align="center" class="font1"><?php if($row2>0){echo $row2;} ?></td>
<?php $BeFore2Y=date("Y-m-d",strtotime('-2 year')); $sql3=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND hrm_employee_general.DepartmentId=".$res['DepartmentId']." AND hrm_employee_general.DateJoining>='".$BeFore2Y."' AND hrm_employee_general.DateJoining<'".$BeFore1Y."' ",$con); $row3=mysql_num_rows($sql3); ?>  
   <td align="center" class="font1"><?php if($row3>0){echo $row3;} ?></td>
<?php $BeFore3Y=date("Y-m-d",strtotime('-3 year'));; $sql4=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND hrm_employee_general.DepartmentId=".$res['DepartmentId']." AND hrm_employee_general.DateJoining>='".$BeFore3Y."' AND hrm_employee_general.DateJoining<'".$BeFore2Y."' ",$con); $row4=mysql_num_rows($sql4); ?>   
   <td align="center" class="font1"><?php if($row4>0){echo $row4;} ?></td>
<?php $BeFore4Y=date("Y-m-d",strtotime('-4 year')); $sql5=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND hrm_employee_general.DepartmentId=".$res['DepartmentId']." AND hrm_employee_general.DateJoining>='".$BeFore4Y."' AND hrm_employee_general.DateJoining<'".$BeFore3Y."' ",$con); $row5=mysql_num_rows($sql5); ?>   
   <td align="center" class="font1"><?php if($row5>0){echo $row5;} ?></td>
<?php $BeFore5Y=date("Y-m-d",strtotime('-5 year'));  $sql6=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND hrm_employee_general.DepartmentId=".$res['DepartmentId']." AND hrm_employee_general.DateJoining>='".$BeFore5Y."' AND hrm_employee_general.DateJoining<'".$BeFore4Y."' ",$con); $row6=mysql_num_rows($sql6); ?>   
   <td align="center" class="font1"><?php if($row6>0){echo $row6;} ?></td>
<?php $BeFore6Y=date("Y-m-d",strtotime('-6 year')); $sql7=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND hrm_employee_general.DepartmentId=".$res['DepartmentId']." AND hrm_employee_general.DateJoining>='".$BeFore6Y."' AND hrm_employee_general.DateJoining<'".$BeFore5Y."' ",$con); $row7=mysql_num_rows($sql7); ?>   
   <td align="center" class="font1"><?php if($row7>0){echo $row7;} ?></td>
<?php $BeFore7Y=date("Y-m-d",strtotime('-7 year')); $sql8=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND hrm_employee_general.DepartmentId=".$res['DepartmentId']." AND hrm_employee_general.DateJoining>='".$BeFore7Y."' AND hrm_employee_general.DateJoining<'".$BeFore6Y."' ",$con); $row8=mysql_num_rows($sql8); ?>   
   <td align="center" class="font1"><?php if($row8>0){echo $row8;} ?></td>
<?php $sql9=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND hrm_employee_general.DepartmentId=".$res['DepartmentId']." AND hrm_employee_general.DateJoining<'".$BeFore7Y."'",$con); $row9=mysql_num_rows($sql9); ?> <td align="center" class="font1"><?php if($row9>0){echo $row9;} ?></td>
<?php $sql10=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND hrm_employee_general.DepartmentId=".$res['DepartmentId'],$con); $row10=mysql_num_rows($sql10); ?> 
   <td align="center" class="font1" bgcolor="#FFB0FF"><?php if($row10>0){echo $row10;} ?></td>
<?php $sqlt=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId."",$con); $rowt=mysql_num_rows($sqlt); ?>    
   <td align="center" class="font1" bgcolor="#9BCDFF"><?php echo round(($row10*100)/$rowt,2); ?></td>
  </tr>
 <?php $SNo++;} ?>
  <tr bgcolor="#FFB0FF">
   <td colspan="2" class="font1" align="right"><b>TOTAL:</b>&nbsp;</td>
<?php $BeFore3M=date("Y-m-d",strtotime('-3 month')); $sql1t=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND hrm_employee_general.DateJoining>='".$BeFore3M."' ",$con); $row1t=mysql_num_rows($sql1t);?><td align="center" class="font1"><?php echo $row1t; ?></td>
<?php $BeFore1Y=date("Y-m-d",strtotime('-1 year')); $sql2t=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND hrm_employee_general.DateJoining>='".$BeFore1Y."' AND hrm_employee_general.DateJoining<'".$BeFore3M."' ",$con); $row2t=mysql_num_rows($sql2t); ?>
   <td align="center" class="font1"><?php echo $row2t; ?></td>
<?php $BeFore2Y=date("Y-m-d",strtotime('-2 year')); $sql3t=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND hrm_employee_general.DateJoining>='".$BeFore2Y."' AND hrm_employee_general.DateJoining<'".$BeFore1Y."' ",$con); $row3t=mysql_num_rows($sql3t); ?>  
   <td align="center" class="font1"><?php echo $row3t; ?></td>
<?php $BeFore3Y=date("Y-m-d",strtotime('-3 year'));; $sql4t=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND hrm_employee_general.DateJoining>='".$BeFore3Y."' AND hrm_employee_general.DateJoining<'".$BeFore2Y."' ",$con); $row4t=mysql_num_rows($sql4t); ?>   
   <td align="center" class="font1"><?php echo $row4t; ?></td>
<?php $BeFore4Y=date("Y-m-d",strtotime('-4 year')); $sql5t=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND hrm_employee_general.DateJoining>='".$BeFore4Y."' AND hrm_employee_general.DateJoining<'".$BeFore3Y."' ",$con); $row5t=mysql_num_rows($sql5t); ?>   
   <td align="center" class="font1"><?php echo $row5t; ?></td>
<?php $BeFore5Y=date("Y-m-d",strtotime('-5 year')); $sql6t=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND hrm_employee_general.DateJoining>='".$BeFore5Y."' AND hrm_employee_general.DateJoining<'".$BeFore4Y."' ",$con); $row6t=mysql_num_rows($sql6t); ?>   
   <td align="center" class="font1"><?php echo $row6t; ?></td>
<?php $BeFore6Y=date("Y-m-d",strtotime('-6 year')); $sql7t=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND hrm_employee_general.DateJoining>='".$BeFore6Y."' AND hrm_employee_general.DateJoining<'".$BeFore5Y."' ",$con); $row7t=mysql_num_rows($sql7t); ?>   
   <td align="center" class="font1"><?php echo $row7t; ?></td>
<?php $BeFore7Y=date("Y-m-d",strtotime('-7 year')); $sql8t=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND hrm_employee_general.DateJoining>='".$BeFore7Y."' AND hrm_employee_general.DateJoining<'".$BeFore6Y."' ",$con); $row8t=mysql_num_rows($sql8t); ?>   
   <td align="center" class="font1"><?php echo $row8t; ?></td>
<?php $sql9t=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND hrm_employee_general.DateJoining<'".$BeFore7Y."'",$con); $row9t=mysql_num_rows($sql9t); ?> 
   <td align="center" class="font1"><?php echo $row9t; ?></td>
<?php $sql10t=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId."",$con); $row10t=mysql_num_rows($sql10t); ?> 
   <td align="center" class="font1" bgcolor="#B0FB4D"><?php echo $row10t; ?></td>
  </tr>
    <tr bgcolor="#9BCDFF">
<?php $sql10t=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId."",$con); $row10t=mysql_num_rows($sql10t); ?> 	
   <td colspan="2" class="font1" align="right"><b>%</b>&nbsp;</td>
<?php $BeFore3M=date("Y-m-d",strtotime('-3 month')); $sql1t=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND hrm_employee_general.DateJoining>='".$BeFore3M."' ",$con); $row1t=mysql_num_rows($sql1t);?><td align="center" class="font1"><?php echo round(($row1t*100)/$row10t,2); ?></td>
<?php $BeFore1Y=date("Y-m-d",strtotime('-1 year')); $sql2t=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND hrm_employee_general.DateJoining>='".$BeFore1Y."' AND hrm_employee_general.DateJoining<'".$BeFore3M."' ",$con); $row2t=mysql_num_rows($sql2t); ?>
   <td align="center" class="font1"><?php echo round(($row2t*100)/$row10t,2); ?></td>
<?php $BeFore2Y=date("Y-m-d",strtotime('-2 year')); $sql3t=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND hrm_employee_general.DateJoining>='".$BeFore2Y."' AND hrm_employee_general.DateJoining<'".$BeFore1Y."' ",$con); $row3t=mysql_num_rows($sql3t); ?>  
   <td align="center" class="font1"><?php echo round(($row3t*100)/$row10t,2); ?></td>
<?php $BeFore3Y=date("Y-m-d",strtotime('-3 year'));; $sql4t=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND hrm_employee_general.DateJoining>='".$BeFore3Y."' AND hrm_employee_general.DateJoining<'".$BeFore2Y."' ",$con); $row4t=mysql_num_rows($sql4t); ?>   
   <td align="center" class="font1"><?php echo round(($row4t*100)/$row10t,2); ?></td>
<?php $BeFore4Y=date("Y-m-d",strtotime('-4 year')); $sql5t=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND hrm_employee_general.DateJoining>='".$BeFore4Y."' AND hrm_employee_general.DateJoining<'".$BeFore3Y."' ",$con); $row5t=mysql_num_rows($sql5t); ?>   
   <td align="center" class="font1"><?php echo round(($row5t*100)/$row10t,2); ?></td>
<?php $BeFore5Y=date("Y-m-d",strtotime('-5 year')); $sql6t=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND hrm_employee_general.DateJoining>='".$BeFore5Y."' AND hrm_employee_general.DateJoining<'".$BeFore4Y."' ",$con); $row6t=mysql_num_rows($sql6t); ?>   
   <td align="center" class="font1"><?php echo round(($row6t*100)/$row10t,2); ?></td>
<?php $BeFore6Y=date("Y-m-d",strtotime('-6 year')); $sql7t=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND hrm_employee_general.DateJoining>='".$BeFore6Y."' AND hrm_employee_general.DateJoining<'".$BeFore5Y."' ",$con); $row7t=mysql_num_rows($sql7t); ?>   
   <td align="center" class="font1"><?php echo round(($row7t*100)/$row10t,2); ?></td>
<?php $BeFore7Y=date("Y-m-d",strtotime('-7 year')); $sql8t=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND hrm_employee_general.DateJoining>='".$BeFore7Y."' AND hrm_employee_general.DateJoining<'".$BeFore6Y."' ",$con); $row8t=mysql_num_rows($sql8t); ?>   
   <td align="center" class="font1"><?php echo round(($row8t*100)/$row10t,2); ?></td>
<?php $sql9t=mysql_query("select GeneralId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND hrm_employee_general.DateJoining<'".$BeFore7Y."'",$con); $row9t=mysql_num_rows($sql9t); ?> 
   <td align="center" class="font1"><?php echo round(($row9t*100)/$row10t,2); ?></td>
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