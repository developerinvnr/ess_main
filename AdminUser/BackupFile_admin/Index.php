<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');}
include("../function.php");
include('codeEncDec.php');
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_REQUEST['log']!=$logadmin){header('Location:../index.php');} else {$_SESSION['logCheckUser']=$_REQUEST['log'];}
if($_SESSION['login'] == true){require_once('AdminMenuSession.php');}
if($_SESSION['login'] == true){require_once('MailScalete.php');}
if($_SESSION['login']!= true){header('Location:../index.php');} 
?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style type="text/css">
.blink_me { animation: blinker 1s linear infinite; }
@keyframes blinker {  40% { opacity: 0; } }
</style>
<script type="text/javascript" src="js/stuHover.js" ></script>
<Script type="text/javascript">window.history.forward(1);</Script>
<SCRIPT>

function ClickEvent(v,c)
{ window.open("CompanyEmpEvent.php?v="+v+"&c="+c,"HelpDoc","menubar=no,scrollbars=yes,resizable=no,directories=no,width=990,height=480");}


<!--
function doBlink() {
	var blink = document.all.tags("BLINK")
	for (var i=0; i<blink.length; i++)
		blink[i].style.visibility = blink[i].style.visibility == "" ? "hidden" : "" 
}
function startBlink() {
	if (document.all)
		setInterval("doBlink()",1000)
}
window.onload = startBlink;
// -->
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
<?php /****************************************************************** /////////  *********************************************/ ?>	
 <td align="center">
  <table width="100%" style="margin-top:0px;" border="0">
    <tr>
	  <td valign="top"><?php if($_SESSION['login'] = true){ require_once("AWelcome.php"); } ?></td>
	</tr>
	
	 <tr>
	  <td align="center" width="100%" id="MainWindow" valign="top">
	    <table border="0" align="center" style="margin-top:0px; width:100%; height:400px;">
				<tr>
				  <?php if($UserId!=12 AND $UserId!=13) { ?>
				  <td align="center" valign="top" width="330" align="left" bgcolor="#FFFFFF">
				    <table border="0">
		 <tr><td valign="top" align="center" bgcolor="#7a6189">&nbsp;<font color="#FFFFFF" style='font-family:Times New Roman;' size="4">Notification</font></td></tr>
		 <tr><td valign="top" style="width:295px;font-family:Times New Roman;font-size:14px;padding:4px;height:180px; overflow:scroll;">
<?php $sql2=mysql_query("select * from hrm_upnotification_admin where NotiSts='A' AND CompanyId=".$CompanyId, $con); 
      $sn=1; while($res2=mysql_fetch_array($sql2)){  
$StrDate=date('Y-m-d', strtotime("-1 months", strtotime($res2['Clsate']))); $EndDate=$res2['Clsate']; 
if(date("Y-m-d")>=$StrDate && date("Y-m-d")<=$EndDate){ ?>
 <font style="color:#B30059;"><b>(<?php echo $sn;?>)</b></font>&nbsp;<font style="color:#0033FF;"><b>Tit:</b></font>&nbsp;<font><?php echo $res2['Tital']; ?></font> <br><font style="color:#0033FF;"><b>Desc:</b></font>&nbsp;<font><?php echo $res2['Description']; ?></font><br><font style="color:#0033FF;"><b>Closing Date:</b></font>&nbsp;<font><span class="blink_me" style="color:#FF0000;"><?php echo date("d-M y",strtotime($res2['Clsate'])); ?></span></font><p>
<?php $sn++; } } ?>
			    </td>
		      </tr>
			  <tr><td>&nbsp;</td></tr>
              <tr>
			  <td>
<?php /* Corporate Ann Open*/ ?>
<?php $Y=date("Y");
 //if(date("m")==01 OR date("m")==03 OR date("m")==05 OR date("m")==07 OR date("m")==08 OR date("m")==10 OR date("m")==12){$day=31;}
 //elseif(date("m")==02){if($Y==2012 OR $Y==2016 OR $Y==2020 OR $Y==2024 OR $Y==2028 OR $Y==2032 OR $Y==2036 OR $Y==2040) { $day=29; } else { $day=28;} }
 //elseif(date("m")==04 OR date("m")==06 OR date("m")==09 OR date("m")==11){$day=30;}
 $Be_7D_1 = date("Y-m-01",strtotime('-2555 day'));  $Be_7D_2 = date("Y-m-31",strtotime('-2555 day'));
 $Be_5D_1 = date("Y-m-01",strtotime('-1825 day')); $Be_5D_2 = date("Y-m-31",strtotime('-1825 day'));
 $Be_3D_1 = date("Y-m-01",strtotime('-1095 day')); $Be_3D_2 = date("Y-m-31",strtotime('-1095 day'));
 $Be_1D_1 = date("Y-m-01",strtotime('-365 day')); $Be_1D_2 = date("Y-m-31",strtotime('-365 day'));
 
 $S7=mysql_query("select hrm_employee.EmployeeID,Fname,Sname,Lname,Gender,DepartmentId,DesigId,HqId,Married,DateJoining,DR from hrm_employee INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee_general.DateJoining>='".$Be_7D_1."' AND hrm_employee_general.DateJoining<='".$Be_7D_2."' AND hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND hrm_employee_general.DepartmentId!=17 AND hrm_employee_general.DepartmentId!=18 AND hrm_employee_general.DepartmentId!=23 order by DateJoining ASC", $con); 
 $S5=mysql_query("select hrm_employee.EmployeeID,Fname,Sname,Lname,Gender,DepartmentId,DesigId,HqId,Married,DateJoining,DR from hrm_employee INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee_general.DateJoining>='".$Be_5D_1."' AND hrm_employee_general.DateJoining<='".$Be_5D_2."' AND hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND hrm_employee_general.DepartmentId!=17 AND hrm_employee_general.DepartmentId!=18 AND hrm_employee_general.DepartmentId!=23 order by DateJoining ASC", $con); 
 $S3=mysql_query("select hrm_employee.EmployeeID,Fname,Sname,Lname,Gender,DepartmentId,DesigId,HqId,Married,DateJoining,DR from hrm_employee INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee_general.DateJoining>='".$Be_3D_1."' AND hrm_employee_general.DateJoining<='".$Be_3D_2."' AND hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND hrm_employee_general.DepartmentId!=17 AND hrm_employee_general.DepartmentId!=18 AND hrm_employee_general.DepartmentId!=23 order by DateJoining ASC", $con); 
 $S1=mysql_query("select hrm_employee.EmployeeID,Fname,Sname,Lname,Gender,DepartmentId,DesigId,HqId,Married,DateJoining,DR from hrm_employee INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee_general.DateJoining>='".$Be_1D_1."' AND hrm_employee_general.DateJoining<='".$Be_1D_2."' AND hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND hrm_employee_general.DepartmentId!=17 AND hrm_employee_general.DepartmentId!=18 AND hrm_employee_general.DepartmentId!=23 order by DateJoining ASC", $con); 
 //$Ro2=mysql_num_rows($S2);  $Ro4=mysql_num_rows($S4); $Ro6=mysql_num_rows($S6);  $Ro8=mysql_num_rows($S8); $Ro9=mysql_num_rows($S9); 
 $Ro1=mysql_num_rows($S1); $Ro3=mysql_num_rows($S3); $Ro5=mysql_num_rows($S5); $Ro7=mysql_num_rows($S7);?>	  
<table>
<tr bgcolor="#7a6189"> 
    <td align="center" valign="middle" style="width:20px;"><a href="#" onClick="ClickEvent('C',<?php echo $CompanyId; ?>)"><img src="images/details.png" border="0" /></a></td>
 <td valign="top" style='font-family:Times New Roman;width:280px;' align="center" bgcolor="#7a6189">&nbsp;<font color="#FFFFFF" size="4">* Corporate Anniversary *</font></td>
</tr>
 <tr>
   <td colspan="2" style="background-color:#D7CCE3;" valign="top">
	<table border="0">
<?php if($Ro7>0 OR $Ro5>0 OR $Ro3>0 OR $Ro1>0) { ?>	
     <tr><td style="font-family:Georgia;font-size:12px;color:#006400;width:280px;" align="center"><b>Congratulations on completion of milestone (7, 5, 3, 1) years in VNR.</b></td></tr>
	 <tr>
	   <td style="font-family:Georgia; font-size:12px; overflow:hidden; width:280px;" align="justify" valign="top">
<marquee behavior="scroll" direction="up" scrollamount="2" width="284" height="146" style="margin-left:5px; margin-right:5px;" onMouseOver="this.setAttribute('scrollamount', 0, 0);" onMouseOut="this.setAttribute('scrollamount', 3, 0);">	  
<?php  while($RS7=mysql_fetch_array($S7)) { 
$srelv7=mysql_query("select HR_Approved,HR_RelievingDate from hrm_employee_separation where Rep_Approved!='C' AND Hod_Approved!='C' AND HR_Approved!='C' AND EmployeeID=".$RS7['EmployeeID'], $con); 
$rowrelv7=mysql_num_rows($srelv7); $resrelv7=mysql_fetch_assoc($srelv7);
if($rowrelv7==0 OR ($rowrelv7>0 AND $resrelv7['HR_Approved']=='N') OR ($rowrelv7>0 AND $resrelv7['HR_Approved']=='Y' AND date("Y-m-d")<$resrelv7['HR_RelievingDate'])){

if($RS7['DR']=='Y'){$M='Dr.';}elseif($RS7['Gender']=='M'){$M='Mr.';} elseif($RS7['Gender']=='F' AND $RS7['Married']=='Y'){$M='Mrs.';} elseif($RS7['Gender']=='F' AND $RS7['Married']=='N'){$M='Miss.';} $EmpName=$M.' '.$RS7['Fname'].' '.$RS7['Sname'].' '.$RS7['Lname']; 
		  $sqlDept=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$RS7['DepartmentId'], $con); $resDept=mysql_fetch_assoc($sqlDept); 
		  $sqlDesig=mysql_query("select DesigName from hrm_designation where DesigId=".$RS7['DesigId'], $con); $resDesig=mysql_fetch_assoc($sqlDesig);
		  $sqlHq=mysql_query("select HqName from hrm_headquater where HqId=".$RS7['HqId'], $con); $resHq=mysql_fetch_assoc($sqlHq);?>	
		  <table>
		   <tr>
		    <td valign="top"><img src="../images/Shield/7.png" style="width:70px;height:70px;" border="0"></td>
		    <td valign="top" style="font-family:Georgia; font-size:12px; overflow:hidden;">
			<font color="#3535FF"><b><?php echo date("d-M-y",strtotime($RS7['DateJoining'])); ?></b></font><br>
		    <?php echo $EmpName; ?><br>
		    Dept - <font color="#AA0000" style="font-family:Georgia; font-size:12px;"><?php echo $resDept['DepartmentCode']; ?></font><br>
		    Desig - <font color="#AA0000" style="font-family:Georgia; font-size:12px;"><?php echo $resDesig['DesigName']; ?></font><br>
		    HQ - <font color="#AA0000" style="font-family:Georgia; font-size:12px;"><?php echo $resHq['HqName']; ?></font>
		   </td>
		   </tr>
	     </table>  
<?php } } while($RS5=mysql_fetch_array($S5)) { 
$srelv5=mysql_query("select HR_Approved,HR_RelievingDate from hrm_employee_separation where Rep_Approved!='C' AND Hod_Approved!='C' AND HR_Approved!='C' AND EmployeeID=".$RS5['EmployeeID'], $con); 
$rowrelv5=mysql_num_rows($srelv5); $resrelv5=mysql_fetch_assoc($srelv5);
if($rowrelv5==0 OR ($rowrelv5>0 AND $resrelv5['HR_Approved']=='N') OR ($rowrelv5>0 AND $resrelv5['HR_Approved']=='Y' AND date("Y-m-d")<$resrelv5['HR_RelievingDate'])){

if($RS5['DR']=='Y'){$M='Dr.';}elseif($RS5['Gender']=='M'){$M='Mr.';} elseif($RS5['Gender']=='F' AND $RS5['Married']=='Y'){$M='Mrs.';} elseif($RS5['Gender']=='F' AND $RS5['Married']=='N'){$M='Miss.';} $EmpName=$M.' '.$RS5['Fname'].' '.$RS5['Sname'].' '.$RS5['Lname']; 
		  $sqlDept=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$RS5['DepartmentId'], $con); $resDept=mysql_fetch_assoc($sqlDept); 
		  $sqlDesig=mysql_query("select DesigName from hrm_designation where DesigId=".$RS5['DesigId'], $con); $resDesig=mysql_fetch_assoc($sqlDesig);
		  $sqlHq=mysql_query("select HqName from hrm_headquater where HqId=".$RS5['HqId'], $con); $resHq=mysql_fetch_assoc($sqlHq);?>	
		  <table>
		   <tr>
		    <td valign="top"><img src="../images/Shield/5.png" style="width:70px;height:70px;" border="0"></td>
		    <td valign="top" style="font-family:Georgia; font-size:12px; overflow:hidden;">
			<font color="#3535FF"><b><?php echo date("d-M-y",strtotime($RS5['DateJoining'])); ?></b></font><br>
		    <?php echo $EmpName; ?><br>
		    Dept - <font color="#AA0000" style="font-family:Georgia; font-size:12px;"><?php echo $resDept['DepartmentCode']; ?></font><br>
		    Desig - <font color="#AA0000" style="font-family:Georgia; font-size:12px;"><?php echo $resDesig['DesigName']; ?></font><br>
		    HQ - <font color="#AA0000" style="font-family:Georgia; font-size:12px;"><?php echo $resHq['HqName']; ?></font>
		   </td>
		   </tr>
	     </table>  
<?php } } while($RS3=mysql_fetch_array($S3)) { 
$srelv3=mysql_query("select HR_Approved,HR_RelievingDate from hrm_employee_separation where Rep_Approved!='C' AND Hod_Approved!='C' AND HR_Approved!='C' AND EmployeeID=".$RS3['EmployeeID'], $con); 
$rowrelv3=mysql_num_rows($srelv3); $resrelv3=mysql_fetch_assoc($srelv3);
if($rowrelv3==0 OR ($rowrelv3>0 AND $resrelv3['HR_Approved']=='N') OR ($rowrelv3>0 AND $resrelv3['HR_Approved']=='Y' AND date("Y-m-d")<$resrelv3['HR_RelievingDate'])){

if($RS3['DR']=='Y'){$M='Dr.';}elseif($RS3['Gender']=='M'){$M='Mr.';} elseif($RS3['Gender']=='F' AND $RS3['Married']=='Y'){$M='Mrs.';} elseif($RS3['Gender']=='F' AND $RS3['Married']=='N'){$M='Miss.';} $EmpName=$M.' '.$RS3['Fname'].' '.$RS3['Sname'].' '.$RS3['Lname']; 
		  $sqlDept=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$RS3['DepartmentId'], $con); $resDept=mysql_fetch_assoc($sqlDept); 
		  $sqlDesig=mysql_query("select DesigName from hrm_designation where DesigId=".$RS3['DesigId'], $con); $resDesig=mysql_fetch_assoc($sqlDesig);
		  $sqlHq=mysql_query("select HqName from hrm_headquater where HqId=".$RS3['HqId'], $con); $resHq=mysql_fetch_assoc($sqlHq);?>	
		  <table>
		   <tr>
		    <td valign="top"><img src="../images/Shield/3.png" style="width:70px;height:70px;" border="0"></td>
		    <td valign="top" style="font-family:Georgia; font-size:12px; overflow:hidden;">
			<font color="#3535FF"><b><?php echo date("d-M-y",strtotime($RS3['DateJoining'])); ?></b></font><br>
		    <?php echo $EmpName; ?><br>
		    Dept - <font color="#AA0000" style="font-family:Georgia; font-size:12px;"><?php echo $resDept['DepartmentCode']; ?></font><br>
		    Desig - <font color="#AA0000" style="font-family:Georgia; font-size:12px;"><?php echo $resDesig['DesigName']; ?></font><br>
		    HQ - <font color="#AA0000" style="font-family:Georgia; font-size:12px;"><?php echo $resHq['HqName']; ?></font>
		   </td>
		   </tr>
	     </table>  
<?php } }  while($RS1=mysql_fetch_array($S1)) { 
$srelv=mysql_query("select HR_Approved,HR_RelievingDate from hrm_employee_separation where Rep_Approved!='C' AND Hod_Approved!='C' AND HR_Approved!='C' AND EmployeeID=".$RS1['EmployeeID'], $con); 
$rowrelv=mysql_num_rows($srelv); $resrelv=mysql_fetch_assoc($srelv);
if($rowrelv==0 OR ($rowrelv>0 AND $resrelv['HR_Approved']=='N') OR ($rowrelv>0 AND $resrelv['HR_Approved']=='Y' AND date("Y-m-d")<$resrelv['HR_RelievingDate'])){

if($RS1['DR']=='Y'){$M='Dr.';}elseif($RS1['Gender']=='M'){$M='Mr.';} elseif($RS1['Gender']=='F' AND $RS1['Married']=='Y'){$M='Mrs.';} elseif($RS1['Gender']=='F' AND $RS1['Married']=='N'){$M='Miss.';} $EmpName=$M.' '.$RS1['Fname'].' '.$RS1['Sname'].' '.$RS1['Lname']; 
		  $sqlDept=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$RS1['DepartmentId'], $con); $resDept=mysql_fetch_assoc($sqlDept); 
		  $sqlDesig=mysql_query("select DesigName from hrm_designation where DesigId=".$RS1['DesigId'], $con); $resDesig=mysql_fetch_assoc($sqlDesig);
		  $sqlHq=mysql_query("select HqName from hrm_headquater where HqId=".$RS1['HqId'], $con); $resHq=mysql_fetch_assoc($sqlHq);?>	
		  <table>
		   <tr>
		    <td valign="top"><img src="../images/Shield/1.png" style="width:70px;height:70px;" border="0"></td>
		    <td valign="top" style="font-family:Georgia; font-size:12px; overflow:hidden;">
			<font color="#3535FF"><b><?php echo date("d-M-y",strtotime($RS1['DateJoining'])); ?></b></font><br>
		    <?php echo $EmpName; ?><br>
		    Dept - <font color="#AA0000" style="font-family:Georgia; font-size:12px;"><?php echo $resDept['DepartmentCode']; ?></font><br>
		    Desig - <font color="#AA0000" style="font-family:Georgia; font-size:12px;"><?php echo $resDesig['DesigName']; ?></font><br>
		    HQ - <font color="#AA0000" style="font-family:Georgia; font-size:12px;"><?php echo $resHq['HqName']; ?></font>
		   </td>
		   </tr>
	     </table>  
<?php } } ?>
</marquee>
        </td>
	  </tr>
<?php } ?>		  
   </table>
   </td></tr>
</table> 
<?php /* Corporate Ann Close*/ ?>	   			  
			  </td>
			  </tr>	
	      </table>
		</td>
		<?php } ?>
		
<?php //Center// ?>		
		<td align="center" style="width:680px;" valign="top">
		 <table border="0">
		  <tr>
		   <td style="width:680px;" valign="top" align="center">
<?php /**************************************************** Open *************/ ?>
<table border="0" bgcolor="#FFFFFF">
 <tr><td style="width:600px;font-family:Times New Roman;font-size:16px;background-color:#7a6189;color:#FFFFFF;" align="center"><b>Pan Card Not Available</b></td></tr>
 <tr>
  <td style="width:600px;" valign="top" align="center">
   <select style="width:599px;background-color:#ABF3A9;">
<?php $sqlEP=mysql_query("select EmpCode,Fname,Sname,Lname,DepartmentId,DesigId,PanNo from hrm_employee_personal INNER JOIN hrm_employee ON hrm_employee_personal.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_general ON hrm_employee_personal.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee.CompanyId=".$CompanyId." AND hrm_employee.EmpStatus='A' AND hrm_employee_personal.PanNo_YN='Y' AND hrm_employee.EmpCode!=114 AND hrm_employee.EmpCode!=118 AND hrm_employee.EmpCode!=119 AND hrm_employee.EmpCode!=120 AND hrm_employee.EmpCode!=122 AND hrm_employee.EmpCode!=123 AND hrm_employee_general.DepartmentId!=17 AND hrm_employee_general.DepartmentId!=18 AND hrm_employee_general.DepartmentId!=23 order by EmpCode ASC", $con); $sn=1; while($resEP=mysql_fetch_assoc($sqlEP)){   
$sqlD=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$resEP['DepartmentId'], $con); $resD=mysql_fetch_assoc($sqlD);
$sqlDe=mysql_query("select DesigName from hrm_designation where DesigId=".$resEP['DesigId'], $con); $resDe=mysql_fetch_assoc($sqlDe);
$En=$resEP['EmpCode'].' - '.$resEP['Fname'].' '.$resEP['Sname'].' '.$resEP['Lname'].' - ('.$resD['DepartmentCode'].') - '.$resDe['DesigName']; 
if($resEP['PanNo']=='NA' OR $resEP['PanNo']=='' OR $resEP['PanNo']=='0'){ ?><option><?php echo $En; ?></option><?php }?>
<?php } ?>   
   </select>
  </td>
 </tr> 
 <tr><td style="width:600px;font-family:Times New Roman;font-size:16px;background-color:#7a6189;color:#FFFFFF;" align="center"><b>Driving License Not Available</b></td></tr>
 <tr>
  <td style="width:600px;" valign="top" align="center">
 <select style="width:599px;background-color:#ABF3A9;">
<?php $sqlEP2=mysql_query("select EmpCode,Fname,Sname,Lname,DepartmentId,DesigId,DrivingLicNo from hrm_employee_personal INNER JOIN hrm_employee ON hrm_employee_personal.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_general ON hrm_employee_personal.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee.CompanyId=".$CompanyId." AND hrm_employee.EmpStatus='A' AND hrm_employee_personal.DrivingLicNo_YN='Y' AND hrm_employee.EmpCode!=114 AND hrm_employee.EmpCode!=118 AND hrm_employee.EmpCode!=119 AND hrm_employee.EmpCode!=120 AND hrm_employee.EmpCode!=122 AND hrm_employee.EmpCode!=123 AND hrm_employee_general.DepartmentId!=17 AND hrm_employee_general.DepartmentId!=18 AND hrm_employee_general.DepartmentId!=23 order by DepartmentId ASC", $con); $sn=1; while($resEP2=mysql_fetch_assoc($sqlEP2)){  
$sqlD2=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$resEP2['DepartmentId'], $con); $resD2=mysql_fetch_assoc($sqlD2);
$sqlDe2=mysql_query("select DesigName from hrm_designation where DesigId=".$resEP2['DesigId'], $con); $resDe2=mysql_fetch_assoc($sqlDe2);
$En2=$resEP2['EmpCode'].' - '.$resEP2['Fname'].' '.$resEP2['Sname'].' '.$resEP2['Lname'].' - ('.$resD2['DepartmentCode'].') - '.$resDe2['DesigName']; 
if($resEP2['DrivingLicNo']=='NA' OR $resEP2['DrivingLicNo']=='' OR $resEP2['DrivingLicNo']=='0'){ ?><option><?php echo $En2; ?></option><?php }?>
<?php } ?>   
   </select>
  </td>
 </tr>  
 <tr><td style="width:600px;font-family:Times New Roman;font-size:16px;background-color:#7a6189;color:#FFFFFF;" align="center"><b>To Expiry/Expired Driving License/ Passport</b></td></tr>
 <tr>
  <td style="width:600px;" valign="top" align="center">
   <select style="width:599px;background-color:#ABF3A9;">
<?php $sqlEP3=mysql_query("select EmpCode,Fname,Sname,Lname,DepartmentId,DesigId,DrivingLicNo,Driv_ExpiryDateTo,PassportNo,Passport_ExpiryDateTo from hrm_employee_personal INNER JOIN hrm_employee ON hrm_employee_personal.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_general ON hrm_employee_personal.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee.CompanyId=".$CompanyId." AND hrm_employee.EmpStatus='A' AND hrm_employee.EmpCode!=114 AND hrm_employee.EmpCode!=118 AND hrm_employee.EmpCode!=119 AND hrm_employee.EmpCode!=120 AND hrm_employee.EmpCode!=122 AND hrm_employee.EmpCode!=123 AND hrm_employee_general.DepartmentId!=17 AND hrm_employee_general.DepartmentId!=18 AND hrm_employee_general.DepartmentId!=23 order by EmpCode ASC", $con); $sn=1; while($resEP3=mysql_fetch_assoc($sqlEP3)){  
$sqlD3=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$resEP3['DepartmentId'], $con); $resD3=mysql_fetch_assoc($sqlD3);
$sqlDe3=mysql_query("select DesigName from hrm_designation where DesigId=".$resEP3['DesigId'], $con); $resDe3=mysql_fetch_assoc($sqlDe3);
$En3=$resEP3['EmpCode'].' - '.$resEP3['Fname'].' '.$resEP3['Sname'].' '.$resEP3['Lname'].' - ('.$resD3['DepartmentCode'].') - '.$resDe3['DesigName']; 
if($resEP3['DrivingLicNo']!='NA' AND $resEP3['DrivingLicNo']!='' AND $resEP3['DrivingLicNo']!='0')
{ $BeforDriv_Month = date("Y-m-d",strtotime($resEP3['Driv_ExpiryDateTo'].'-30 day')); $DrLicTo=date("d-M-Y",strtotime($resEP3['Driv_ExpiryDateTo'])); 
if(date("Y-m-d")>=$BeforDriv_Month AND date("Y-m-d")<date("Y-m-d",strtotime($resEP3['Driv_ExpiryDateTo']))) {?><option><?php echo $En3.' : TO EXPIRY ('.$DrLicTo.')-DL'; ?></option><?php } elseif(date("Y-m-d")>date("Y-m-d",strtotime($resEP3['Driv_ExpiryDateTo']))){?><option><?php echo $En3.' : EXPIRED ('.$DrLicTo.')-DL'; ?></option><?php } } 
if($resEP3['PassportNo']!='NA' AND $resEP3['PassportNo']!='' AND $resEP3['PassportNo']!='0')
{ $BeforPassport_Month = date("Y-m-d",strtotime($resEP3['Passport_ExpiryDateTo'].'-180 day')); $PassPortTo=date("d-M-Y",strtotime($resEP3['Passport_ExpiryDateTo'])); 
if(date("Y-m-d")>=$BeforPassport_Month AND date("Y-m-d")<date("Y-m-d",strtotime($resEP3['Passport_ExpiryDateTo']))) {?><option><?php echo $En3.' : TO EXPIRY ('.$PassPortTo.')-PP'; ?></option><?php } elseif(date("Y-m-d")>date("Y-m-d",strtotime($resEP3['Passport_ExpiryDateTo']))){?><option><?php echo $En3.' : EXPIRED ('.$PassPortTo.')-PP'; ?></option><?php } } ?>

<?php } ?> 
   </select>
  </td>
 </tr>  
<?php /****************************************** Confirmation Confirmation Open Open ******************************/ ?> 
 <tr><td style="width:600px;font-family:Times New Roman;font-size:15px;background-color:#7a6189;color:#FFFFFF;" align="center"><b>Pending Confirmation Letter</b></td></tr>
 <tr>
  <td style="width:600px;" valign="top" align="center">
  <select style="width:599px;background-color:#FFFFFF;">
<?php $sqlP=mysql_query("SELECT hrm_employee.EmployeeID,EmpCode,Fname,Sname,Lname,DateJoining,DepartmentId,DesigId,ConfirmHR,ConfirmMonth FROM hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID WHERE hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND (hrm_employee_general.ConfirmHR='N' OR hrm_employee_general.ConfirmHR='YY') AND (hrm_employee_general.DateConfirmationYN='N' OR hrm_employee_general.DateConfirmationYN='Y')", $con); $rowP=mysql_num_rows($sqlP); if($rowP>0) { while($resP=mysql_fetch_assoc($sqlP)){
 $sqlD4=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$resP['DepartmentId'], $con); $resD4=mysql_fetch_assoc($sqlD4);
 $sqlDe4=mysql_query("select DesigName from hrm_designation where DesigId=".$resP['DesigId'], $con); $resDe4=mysql_fetch_assoc($sqlDe4);
 $En4=$resP['EmpCode'].' - '.$resP['Fname'].' '.$resP['Sname'].' '.$resP['Lname'].' - ('.$resD4['DepartmentCode'].') - '.$resDe4['DesigName']; 
 
if($resP['ConfirmMonth']==6){$ConfDate=date('Y-m-d', strtotime("+6 months", strtotime($resP['DateJoining']))); }
elseif($resP['ConfirmMonth']==9){$ConfDate=date('Y-m-d', strtotime("+9 months", strtotime($resP['DateJoining']))); } 
elseif($resP['ConfirmMonth']==12){$ConfDate=date('Y-m-d', strtotime("+12 months", strtotime($resP['DateJoining']))); }
elseif($resP['ConfirmMonth']==15){$ConfDate=date('Y-m-d', strtotime("+15 months", strtotime($resP['DateJoining']))); }
elseif($resP['ConfirmMonth']==18){$ConfDate=date('Y-m-d', strtotime("+18 months", strtotime($resP['DateJoining']))); }
elseif($resP['ConfirmMonth']==24){$ConfDate=date('Y-m-d', strtotime("+24 months", strtotime($resP['DateJoining']))); }
$Before15Day_1 = date("Y-m-d",strtotime($ConfDate.'-15 day'));  $ActConfDate=date("d-m-Y",strtotime($ConfDate));
 $sqlRec=mysql_query("select Recommendation,SubmitStatus from hrm_employee_confletter where EmployeeId=".$resP['EmployeeID']." AND Status='A'", $con); $rowRec=mysql_num_rows($sqlRec); if($rowRec>0){ $resRec=mysql_fetch_assoc($sqlRec); }
  
  if($rowRec==0 AND date("Y-m-d")>=$Before15Day_1){ echo '<option>'.$En4.' : Date ('.date("d-M-Y",strtotime($ActConfDate)).')-NOT FILL</option>'; }
  elseif($rowRec>0 AND ($resRec['Recommendation']==1 OR $resRec['Recommendation']==2) AND $resRec['SubmitStatus']=='N' AND date("Y-m-d")>=$Before15Day_1){ echo '<option>'.$En4.' : Date ('.date("d-M-Y",strtotime($ActConfDate)).')-PENDING</option>'; } 
  elseif($rowRec>0 AND ($resRec['Recommendation']==1 OR $resRec['Recommendation']==2) AND $resRec['SubmitStatus']=='Y' AND $resP['ConfirmHR']=='N' AND date("Y-m-d")>=$Before15Day_1){ echo '<option value=1>'.$En4.' : Date ('.date("d-M-Y",strtotime($ActConfDate)).')-PENDING HR</option>'; } 
  elseif($rowRec>0 AND ($resRec['Recommendation']==1 OR $resRec['Recommendation']==2) AND $resRec['SubmitStatus']=='Y' AND ($resP['ConfirmHR']=='N' OR $resP['ConfirmHR']=='YY') AND date("Y-m-d")>=$Before15Day_1){ echo '<option value=1>'.$En4.' : Date ('.date("d-M-Y",strtotime($ActConfDate)).')-PENDING HR</option>'; }
  elseif($rowRec>0 AND $resRec['Recommendation']==2 AND $resP['ConfirmHR']=='YY' AND date("Y-m-d")>=$Before15Day_1){ echo '<option>'.$En4.' : Date ('.date("d-M-Y",strtotime($ActConfDate)).')-PENDING</option>'; } 
  else {echo '';} 
  
  //echo '<option value=1>'.$En4.' : Date ('.$rowRec.'-'.$resRec['Recommendation'].'-'.$resRec['SubmitStatus'].'-'.$resP['ConfirmHR'].')-PENDING HR</option>';
  
  //AND $resRec['SubmitStatus']=='Y'

} } ?> 
  </select>
  </td>
 </tr>  
<?php /****************************************** Confirmation Confirmation Close Close ******************************/ ?>
 <tr><td style="width:600px;font-family:Times New Roman;font-size:16px;background-color:#7a6189;color:#FFFFFF;" align="center"><b>Pending Retirement</b></td></tr>
 <tr>
  <td style="width:600px;" valign="top" align="center">
   <select style="width:599px;">
<?php $sqlPr=mysql_query("select EmpCode,Fname,Sname,Lname,DepartmentId,DesigId,DOB from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee.CompanyId=".$CompanyId." AND hrm_employee.EmpStatus='A' AND hrm_employee.EmpCode!=114 AND hrm_employee.EmpCode!=118 AND hrm_employee.EmpCode!=119 AND hrm_employee.EmpCode!=120 AND hrm_employee.EmpCode!=122 AND hrm_employee.EmpCode!=123 AND hrm_employee.EmpCode!=1001 AND hrm_employee.EmpCode!=1002 AND hrm_employee.EmpCode!=1003 AND hrm_employee_general.DepartmentId!=17 AND hrm_employee_general.DepartmentId!=18 AND hrm_employee_general.DepartmentId!=23 order by EmpCode ASC", $con); $sn=1; while($resPr=mysql_fetch_assoc($sqlPr)){ 
$sqlPrD=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$resPr['DepartmentId'], $con); $resPrD=mysql_fetch_assoc($sqlPrD);
$sqlPrDe=mysql_query("select DesigName from hrm_designation where DesigId=".$resPr['DesigId'], $con); $resPrDe=mysql_fetch_assoc($sqlPrDe);
$EnPr=$resPr['EmpCode'].' - '.$resPr['Fname'].' '.$resPr['Sname'].' '.$resPr['Lname'].' - ('.$resPrD['DepartmentCode'].') - '.$resPrDe['DesigName']; 

$date = date_create($resPr['DOB']); date_add($date, date_interval_create_from_date_string('58 years')); $After58yDOB=date_format($date, 'Y-m-d'); 
$date2 = date_create($After58yDOB); date_sub($date2, date_interval_create_from_date_string('90 days')); $Before30y58 = date_format($date2, 'Y-m-d'); 
$date3 = date_create($After58yDOB); date_add($date3, date_interval_create_from_date_string('10 days')); $After10y58=date_format($date3, 'Y-m-d');
if(date('Y-m-d')>=$Before30y58 AND date('Y-m-d')<=$After10y58){ echo '<option>'.$EnPr.' : Date ('.date("d-M-Y",strtotime($After58yDOB)).')</option>'; }
} ?>
   </select>
  </td>
 </tr> 
 
 </table>
 <?php /**************************************************** Close *************/ ?>		    
		   </td>
		  </tr>
		  <tr>
		   <td style="width:500px;" align="center" valign="middle"><?php if($_SESSION['login'] = true){ echo '<img src="images/home.png" style="height:150px;width:130px;">'; } ?></td>
		  </tr>
		 </table>
		</td>
<?php //Center// ?>	

		
		<?php if($UserId!=12 AND $UserId!=13) { ?>
	    <td align="center" valign="top" width="330" bgcolor="#FFFFFF"><?php //Start ?>
		 <table>
          <tr>
<?php /****************************************** Event Open********************************************/ ?>
             <td valign="top" width="250" align="center" valign="top">
               <table border="0" width="250">
                <tr bgcolor="#7a6189"> 
    <td align="center" valign="middle" style="width:20px;"><a href="#" onClick="ClickEvent('M',<?php echo $CompanyId; ?>)"><img src="images/details.png" border="0" /></a></td>
	<td valign="top" align="center" bgcolor="#7a6189">&nbsp;<font color="#FFFFFF" style='font-family:Times New Roman;' size="4">* Marriage Anniversary *</font></td>
		</tr>
	<?php $sqlEventAnn=mysql_query("select hrm_employee.EmployeeID,EmpCode,Fname,Sname,Lname,Gender,DepartmentId,DesigId,HqId,MobileNo_Vnr,MobileNo,Married,MarriageDate from hrm_employee INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee_personal.MarriageDate!='1970-01-01' AND hrm_employee_personal.MarriageDate!='0000-00-00' AND hrm_employee_personal.MarriageDate_dm>='".date("0000-m-1")."' AND hrm_employee_personal.MarriageDate_dm<='".date("0000-m-31")."' AND hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." order by MarriageDate_dm ASC", $con); $rowAnn=mysql_num_rows($sqlEventAnn); ?>  
	           <tr><td colspan="2" style="background-color:#D7CCE3;" valign="top">
	                <table border="0"><tr><td style="font-family:Georgia; font-size:12px; overflow:hidden;" align="justify" valign="top">
<marquee behavior="scroll" direction="up" scrollamount="2" width="284" height="195" style="margin-left:5px; margin-right:5px;" onMouseOver="this.setAttribute('scrollamount', 0, 0);" onMouseOut="this.setAttribute('scrollamount', 3, 0);">	  
<?php  $i=1; while($resEventAnn=mysql_fetch_array($sqlEventAnn)) { 
$sAnnE=mysql_query("select HR_Approved,HR_RelievingDate from hrm_employee_separation where Rep_Approved!='C' AND Hod_Approved!='C' AND HR_Approved!='C' AND EmployeeID=".$resEventAnn['EmployeeID'], $con); 
$rowAnnE=mysql_num_rows($sAnnE); $resAnnE=mysql_fetch_assoc($sAnnE);
if($rowAnnE==0 OR ($rowAnnE>0 AND $resAnnE['HR_Approved']=='N') OR ($rowAnnE>0 AND $resAnnE['HR_Approved']=='Y' AND date("Y-m-d")<$resAnnE['HR_RelievingDate'])){

if($resEventAnn['Gender']=='M'){$M='Mr.';} elseif($resEventAnn['Gender']=='F' AND $resEventAnn['Married']=='Y'){$M='Mrs.';} elseif($resEventAnn['Gender']=='F' AND $resEventAnn['Married']=='N'){$M='Miss.';} $EmpNameAnn=$M.' '.$resEventAnn['Fname'].' '.$resEventAnn['Sname'].' '.$resEventAnn['Lname']; 
		  $sqlDept=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$resEventAnn['DepartmentId'], $con); $resDept=mysql_fetch_assoc($sqlDept); 
		  $sqlDesig=mysql_query("select DesigName from hrm_designation where DesigId=".$resEventAnn['DesigId'], $con); $resDesig=mysql_fetch_assoc($sqlDesig);
		  $sqlHq=mysql_query("select HqName from hrm_headquater where HqId=".$resEventAnn['HqId'], $con); $resHq=mysql_fetch_assoc($sqlHq); ?>	
		           <table>
		             <tr>
		              <td><?php echo '<img width="70px" height="70px" src="EmpImg'.$CompanyId.'Emp/'.$resEventAnn['EmpCode'].'.jpg" border="1" />'; ?>
<?php /*
<img src="../images/Cack/<?php if($i==1){echo 'r1';}if($i==2){echo 'r2';}if($i==3){echo 'r3';}if($i==4){echo 'r4';}if($i==5){echo 'r5';}if($i==6){echo 'r6';}if($i==7){echo 'r7';}if($i==8){echo 'r8';}if($i==9){echo 'r9';}if($i==10){echo 'r10';}if($i==11){echo 'r11';}if($i==12){echo 'r12';}if($i==13){echo 'r1';}if($i==14){echo 'r2';}if($i==15){echo 'r3';}if($i==16){echo 'r4';}if($i==17){echo 'r5';}if($i==18){echo 'r6';}if($i==19){echo 'r7';}if($i==20){echo 'r8';}if($i==21){echo 'r9';}if($i==22){echo 'r10';}if($i==23){echo 'r11';}if($i==24){echo 'r12';}if($i==25){echo 'r1';}if($i==26){echo 'r2';}if($i==27){echo 'r3';}if($i==28){echo 'r4';}if($i==29){echo 'r5';}if($i==30){echo 'r6';}if($i==31){echo 'r7';}if($i==32){echo 'r8';}if($i==33){echo 'r9';}if($i==34){echo 'r10';}if($i==35){echo 'r11';}if($i==36){echo 'r12';}if($i==37){echo 'r1';}if($i==38){echo 'r2';}if($i==39){echo 'r3';}if($i==40){echo 'r4';}if($i==41){echo 'r5';}if($i==42){echo 'r6';}if($i==43){echo 'r7';}if($i==44){echo 'r8';}if($i==45){echo 'r9';}if($i==46){echo 'r10';}if($i==47){echo 'r11';}if($i==48){echo 'r12';}if($i==49){echo 'r1';}if($i==50){echo 'r2';} ?>.png" style="width:70px;height:70px;" border="0">
*/ ?>
</td>
		              <td valign="top" style="font-family:Georgia; font-size:12px; overflow:hidden;">
		              <font color="#3535FF" style="font-family:Georgia; font-size:12px;"><b><?php echo date("d M",strtotime($resEventAnn['MarriageDate'])); ?></b></font><br>
		               <?php echo $EmpNameAnn; ?><br>
		               Dept - <font color="#AA0000" style="font-family:Georgia; font-size:12px;"><?php echo $resDept['DepartmentCode']; ?></font><br>
					   Desig - <font color="#AA0000" style="font-family:Georgia; font-size:12px;"><?php echo $resDesig['DesigName']; ?></font><br>
				       HQ - <font color="#AA0000" style="font-family:Georgia; font-size:12px;"><?php echo $resHq['HqName']; ?></font>
		              </td>
		            </tr>
	             </table>  
<?php } $i++;}?>
</marquee>
                    </td>
				    </tr>
				   </table>
                 </td>
			  </tr>
	          <tr bgcolor="#7a6189"> 
    <td align="center" valign="middle" style="width:20px;"><a href="#" onClick="ClickEvent('B',<?php echo $CompanyId; ?>)"><img src="images/details.png" border="0" /></a></td>
			  <td valign="top" align="center" bgcolor="#7a6189">&nbsp;<font color="#FFFFFF" style='font-family:Times New Roman;' size="4">* Birthday *</font></td>
			  </tr>		
	<?php $sqlEventDOB=mysql_query("select hrm_employee.EmployeeID,EmpCode,Fname,Sname,Lname,Gender,DepartmentId,DesigId,HqId,MobileNo_Vnr,MobileNo,DOB,Married from hrm_employee INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee_general.DOB!='1970-01-01' AND hrm_employee_general.DOB!='0000-00-00' AND hrm_employee_general.DOB_dm>='".date("0000-m-1")."' AND hrm_employee_general.DOB_dm<='".date("0000-m-31")."' AND hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND hrm_employee.EmployeeID!=6 order by DOB_dm ASC", $con); ?>
	         <tr><td colspan="2" style="background-color:#D7CCE3;">
	              <table border="0"><tr><td style="font-family:Georgia; font-size:12px;overflow:hidden;" align="justify">	
<marquee behavior="scroll" direction="up" scrollamount="2" width="284" height="195" style="margin-left:5px; margin-right:5px;" onMouseOver="this.setAttribute('scrollamount', 0, 0);" onMouseOut="this.setAttribute('scrollamount', 3, 0);">		
<?php      $j=1; while($resEventDOB=mysql_fetch_array($sqlEventDOB)){ 
$sDobE=mysql_query("select HR_Approved,HR_RelievingDate from hrm_employee_separation where Rep_Approved!='C' AND Hod_Approved!='C' AND HR_Approved!='C' AND EmployeeID=".$resEventDOB['EmployeeID'], $con); 
$rowDobE=mysql_num_rows($sDobE); $resDobE=mysql_fetch_assoc($sDobE);
if($rowDobE==0 OR ($rowDobE>0 AND $resDobE['HR_Approved']=='N') OR ($rowDobE>0 AND $resDobE['HR_Approved']=='Y' AND date("Y-m-d")<$resDobE['HR_RelievingDate'])){

if($resEventDOB['Gender']=='M'){$M='Mr.';} elseif($resEventDOB['Gender']=='F' AND $resEventDOB['Married']=='Y'){$M='Mrs.';} elseif($resEventDOB['Gender']=='F' AND $resEventDOB['Married']=='N'){$M='Miss.';} $EmpNameDOB=$M.' '.$resEventDOB['Fname'].' '.$resEventDOB['Sname'].' '.$resEventDOB['Lname'];
           $sqlDept2=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$resEventDOB['DepartmentId'], $con); $resDept2=mysql_fetch_assoc($sqlDept2);
		   $sqlDesig2=mysql_query("select DesigName from hrm_designation where DesigId=".$resEventDOB['DesigId'], $con); $resDesig2=mysql_fetch_assoc($sqlDesig2);
		   $sqlHq2=mysql_query("select HqName from hrm_headquater where HqId=".$resEventDOB['HqId'], $con); $resHq2=mysql_fetch_assoc($sqlHq2);?>		
		         <table>
		          <tr>
		           <td><?php echo '<img width="70px" height="70px" src="EmpImg'.$CompanyId.'Emp/'.$resEventDOB['EmpCode'].'.jpg" border="1" />'; ?>
<?php /*
<img src="../images/Cack/<?php if($j==1){echo 'c1';}if($j==2){echo 'c2';}if($j==3){echo 'c3';}if($j==4){echo 'c4';}if($j==5){echo 'c5';}if($j==6){echo 'c6';}if($j==7){echo 'c7';}if($j==8){echo 'c8';}if($j==9){echo 'c9';}if($j==10){echo 'c10';}if($j==11){echo 'c1';}if($j==12){echo 'c2';}if($j==13){echo 'c3';}if($j==14){echo 'c4';}if($j==15){echo 'c5';}if($j==16){echo 'c6';}if($j==17){echo 'c7';}if($j==18){echo 'c8';}if($j==19){echo 'c9';}if($j==20){echo 'c10';}if($j==21){echo 'c1';}if($j==22){echo 'c2';}if($j==23){echo 'c3';}if($j==24){echo 'c4';}if($j==25){echo 'c5';}if($j==26){echo 'c6';}if($j==27){echo 'c7';}if($j==28){echo 'c8';}if($j==29){echo 'c9';}if($j==30){echo 'c10';}if($j==31){echo 'c1';}if($j==32){echo 'c2';}if($j==33){echo 'c3';}if($j==34){echo 'c4';}if($j==35){echo 'c5';}if($j==36){echo 'c6';}if($j==37){echo 'c7';}if($j==38){echo 'c8';}if($j==39){echo 'c9';}if($j==40){echo 'c10';}if($j==41){echo 'c1';}if($j==42){echo 'c2';}if($j==43){echo 'c3';}if($j==44){echo 'c4';}if($j==45){echo 'c5';}if($j==46){echo 'c6';}if($j==47){echo 'c7';}if($j==48){echo 'c8';}if($j==49){echo 'c9';}if($j==50){echo 'c10';} ?>.png" style="width:70px;height:70px;" border="0">
*/ ?>
</td>
		           <td valign="top" style="font-family:Georgia; font-size:12px; overflow:hidden;">
		           <font color="#3535FF" style="font-family:Georgia; font-size:12px;"><b><?php echo date("d M",strtotime($resEventDOB['DOB'])); ?></b></font><br>
		           <?php echo $EmpNameDOB; ?><br>
		           Dept - <font color="#AA0000" style="font-family:Georgia; font-size:12px;"><?php echo $resDept2['DepartmentCode']; ?></font><br>
				   Desig - <font color="#AA0000" style="font-family:Georgia; font-size:12px;"><?php echo $resDesig2['DesigName']; ?></font><br>
				   HQ - <font color="#AA0000" style="font-family:Georgia; font-size:12px;"><?php echo $resHq2['HqName']; ?></font>
		          </td>
		         </tr>
	           </table>  
<?php } $j++; }?>	
</marquee>
                  </td>
				  </tr>
				 </table>
                </td>
			   </tr>		
             </table>
            </td>		
           </tr>
<?php /****************************************** Event Close********************************************/ ?>  
     </table>
			  </td><?php //End ?> 
			  <?php } ?> 
			</tr>
	    </table>
	  </td>
<?php /****************************************************************** /////////  *********************************************/ ?>	  
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