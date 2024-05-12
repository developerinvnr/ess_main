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
<style> .font { color:#ffffff;font-family:Times New Roman;height:22px;font-size:11px;font-weight:bold;} 
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
function ExportVal(y,c,d,m)
{ window.open("ReportsEmpMonthActualValExport.php?action=ReportsEmpMonthlyValExport&y="+y+"&c="+c+"&d="+d+"&m="+m,"ExportForm","menubar=yes,scrollbars=yes,resizable=no,directories=no,width=20,height=20"); }

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
<?php //*********************************************************************************************?>
<?php //****************START*****START*****START******START******START************************?>
<?php //************************************************************************************?>
<table border="0" style="margin-top:0px; width:100%; height:300px;">
 <tr>
  <td align="left" height="20" valign="top" colspan="3">
   <table border="0">
    <tr>
	  <td class="heading" valign="top" style="width:1150px;">Monthly Values (Employee Wise)
<?php $m=$_REQUEST['m'];
$today=date("Y-m-d"); $timestamp = strtotime($today);
if($_REQUEST['y']!=0)
{ 
 $sY=mysql_query("select * from hrm_year where YearId=".$_REQUEST['y']."",$con); $rY=mysql_fetch_assoc($sY); 
 $FD=date("Y",strtotime($rY['FromDate'])); $TD=date("Y",strtotime($rY['ToDate'])); $PRD=$FD.'-'.$TD; 
 $ffd=date("y",strtotime($rY['FromDate'])); $ttd=date("y",strtotime($rY['ToDate']));
 $prevY=date("Y")-1; $nextY=date("Y")+1;
 if($FD==date("Y") AND $TD==$nextY)
 {
  if(date("m")==1)
  { 
   if($m==4 OR $m==5 OR $m==6 OR $m==7 OR $m==8 OR $m==9 OR $m==10 OR $m==11){ $PayTable='hrm_employee_monthlypayslip_'.$FD; }else{ $PayTable='hrm_employee_monthlypayslip'; }
  }
  elseif(date("m")==2 OR date("m")==3)
  { 
   if($m==4 OR $m==5 OR $m==6 OR $m==7 OR $m==8 OR $m==9 OR $m==10 OR $m==11 OR $m==12){ $PayTable='hrm_employee_monthlypayslip_'.$FD; }else{ $PayTable='hrm_employee_monthlypayslip'; }
  }
  else
  {
   $PayTable='hrm_employee_monthlypayslip'; 
  }
 }
 elseif($FD==$prevY AND $TD==date("Y"))
 {
  if(date("m")==1)
  { $PayTable='hrm_employee_monthlypayslip'; }
  else
  { 
    if($m==4 OR $m==5 OR $m==6 OR $m==7 OR $m==8 OR $m==9 OR $m==10 OR $m==11 OR $m==12){ $PayTable='hrm_employee_monthlypayslip_'.$FD; }else{ $PayTable='hrm_employee_monthlypayslip'; }
  }
 }
 else
 {
  if($m==4 OR $m==5 OR $m==6 OR $m==7 OR $m==8 OR $m==9 OR $m==10 OR $m==11 OR $m==12){ $PayTable='hrm_employee_monthlypayslip_'.$FD; }else{ $PayTable='hrm_employee_monthlypayslip_'.$TD; }
 }

}
if($_REQUEST['d']>0){ $sqlD=mysql_query("select DepartmentName from hrm_department where DepartmentId=".$_REQUEST['d'], $con); $resD=mysql_fetch_assoc($sqlD); }
?>	     
       <b style="color:#3A7500">[ Year:&nbsp;<?php echo $PRD; ?> ]</b>&nbsp; 
	  <?php if($_REQUEST['d']>0){ ?><b style="color:#3A7500">[ Department:&nbsp;<?php echo $resD['DepartmentName']; ?> ]</b>&nbsp;  <?php } ?>
	  <?php if($_REQUEST['m']>0){ ?><b style="color:#3A7500">[ Month:&nbsp;<?php if($_REQUEST['m']==4){echo 'APRIL';}elseif($_REQUEST['m']==5){echo 'MAY';}elseif($_REQUEST['m']==6){echo 'JUNE';}elseif($_REQUEST['m']==7){echo 'JULY';}elseif($_REQUEST['m']==8){echo 'AUGUST';}elseif($_REQUEST['m']==9){echo 'SEPTEMBER';}elseif($_REQUEST['m']==10){echo 'OCTOBER';}elseif($_REQUEST['m']==11){echo 'NOVEMBER';}elseif($_REQUEST['m']==12){echo 'DECEMBER';}elseif($_REQUEST['m']==13){echo 'JANUARY';}elseif($_REQUEST['m']==14){echo 'FEBRUARY';}elseif($_REQUEST['m']==15){echo 'MARCH';} ?> ]</b> <?php } ?>
	  
	  &nbsp;&nbsp;
      <a href="#" onClick="ExportVal(<?php echo $_REQUEST['y'].', '.$_REQUEST['c'].', '.$_REQUEST['d'].', '.$_REQUEST['m']; ?>)" style="font-size:12px;">Export Excel</a>
	 </td> 
   </tr>
   </table>
  </td>
 </tr> 
<?php if($_SESSION['login']=true){ ?>	
 <tr>
<?php //***************** Open Department ***********************************?> 
<td align="left" id="type" valign="top" style="display:block;width:100%">             
<input type="hidden" id="ey" name="ey" value="<?php echo $_REQUEST['y']; ?>" />  
<table border="0" style="width:1000px;">
<tr>
 <td align="left">
  <table border="1" border="1" bgcolor="#FFFFFF">
  <tr bgcolor="#7a6189">
   <td align="center" class="font" style="width:40px;">SN</td>
   <td align="center" class="font" style="width:50px;">EC</td>
   <td align="center" class="font" style="width:250px;">NAME</td>
   <td align="center" class="font" style="width:50px;">DEPT</td>
   <td align="center" class="font" style="width:50px;">BASIC</td>
   <td align="center" class="font" style="width:50px;">HRA</td>
   <td align="center" class="font" style="width:50px;">CONV</td>
   <td align="center" class="font" style="width:50px;">SPECL</td>
   <td align="center" class="font" style="width:50px;">CEA</td>
   <td align="center" class="font" style="width:50px;">MR</td>
   <td align="center" class="font" style="width:50px;">LTA</td>
   <td align="center" class="font" style="width:50px;">GROSS</td>
  </tr>
<?php

if($_REQUEST['m']==4){$s=date($FD.'-04-30'); $y=$FD;}elseif($_REQUEST['m']==5){$s=date($FD.'-05-31'); $y=$FD;}elseif($_REQUEST['m']==6){$s=date($FD.'-06-30'); $y=$FD;}elseif($_REQUEST['m']==7){$s=date($FD.'-07-31'); $y=$FD;}elseif($_REQUEST['m']==8){$s=date($FD.'-08-31'); $y=$FD;}elseif($_REQUEST['m']==9){$s=date($FD.'-09-30'); $y=$FD;}elseif($_REQUEST['m']==10){$s=date($FD.'-10-31'); $y=$FD;}elseif($_REQUEST['m']==11){$s=date($FD.'-11-30'); $y=$FD;}elseif($_REQUEST['m']==12){$s=date($FD.'-12-31'); $y=$FD;}elseif($_REQUEST['m']==1){$s=date($TD.'-01-31'); $y=$TD;}elseif($_REQUEST['m']==2){$s=date($TD.'-02-29'); $y=$TD;}elseif($_REQUEST['m']==3){$s=date($TD.'-03-31'); $y=$TD;}

if($_REQUEST['d']>0){ $sql=mysql_query("select hrm_employee.EmployeeID,EmpCode,Fname,Sname,Lname,DepartmentId from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee_general.DepartmentId=".$_REQUEST['d']." AND hrm_employee_general.DateJoining<'".$s."' AND hrm_employee.CompanyId=".$_REQUEST['c']." order by EmpCode ASC", $con); }
elseif($_REQUEST['d']==0){ $sql=mysql_query("select hrm_employee.EmployeeID,EmpCode,Fname,Sname,Lname,DepartmentId from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee_general.DateJoining<'".$s."' AND hrm_employee.CompanyId=".$_REQUEST['c']." order by EmpCode ASC", $con); }
 $sn=1; while($res=mysql_fetch_assoc($sql)){ 


$sql1=mysql_query("select * from hrm_employee_ctc c INNER JOIN ".$PayTable." mp ON c.EmployeeID=mp.EmployeeID where c.EmployeeID=".$res['EmployeeID']." AND CtcCreatedDate<='".$s."' AND Month=".$_REQUEST['m']." AND Year=".$y." AND Tot_Gross>0 AND CtcId=(select MAX(CtcId) from hrm_employee_ctc where hrm_employee_ctc.EmployeeID=".$res['EmployeeID']." AND CtcCreatedDate<='".$s."')", $con); 

  $res1=mysql_fetch_assoc($sql1);
  $sqlD=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$res['DepartmentId'], $con); $resD=mysql_fetch_assoc($sqlD);
  
if($res1['Basic']!=0 OR $res1['Hra']!=0 OR $res1['Convance']!=0 OR $res1['Special']!=0){ ?>  
<tr id="TR<?php echo $sn; ?>">
   <td align="center"class="font1">&nbsp;<?php echo $sn; ?>&nbsp;</td>
   <td align="center" class="font1">&nbsp;<?php echo $res['EmpCode']; ?></td>
   <td align="" class="font1">&nbsp;<?php echo $res['Fname'].' '.$res['Sname'].' '.$res['Lname']; ?></td>
   <td align="" class="font1">&nbsp;<?php echo $resD['DepartmentCode']; ?></td>
   <td align="right" class="font1"><?php echo floatval($res1['BAS_Value']); ?>&nbsp;</td>
   <td align="right" class="font1"><?php echo floatval($res1['HRA_Value']); ?>&nbsp;</td>
   <td align="right" class="font1"><?php echo floatval($res1['CONV_Value']); ?>&nbsp;</td>
   <td align="right" class="font1"><?php echo floatval($res1['SPECIAL_ALL_Value']); ?>&nbsp;</td>
   <td align="right" class="font1"><?php echo $CEA=floatval($res1['CHILD_EDU_ALL_Value']/12); ?>&nbsp;</td>
   <td align="right" class="font1"><?php echo $MR=floatval($res1['MED_REM_Value']/12); ?>&nbsp;</td>
   <td align="right" class="font1"><?php echo $LTA=floatval($res1['LTA_Value']/12); ?>&nbsp;</td>
   
   
<?php $Gross=$res1['BAS_Value']+$res1['HRA_Value']+$res1['CONV_Value']+$res1['SPECIAL_ALL_Value']+$CEA+$MR+$LTA; ?>   
   <td align="right" class="font1" bgcolor="#FFD9FF"><?php echo floatval($Gross); ?>&nbsp;</td>
</tr>
<?php } $sn++; } ?>
 

	 </table>
	  </td>
    </tr>
  </table>  
</td>
<?php //***************** Close Department*************************************?>    
 </tr>
<?php } ?> 
</table>
<?php //*************************************************************************************?>
<?php //****************END*****END*****END******END******END*******************?>
<?php //*********************************************************************************************?>
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