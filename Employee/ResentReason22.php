<?php session_start();
require_once('../AdminUser/config/config.php');
$_SESSION['Sent']=$_REQUEST['action']; $_SESSION['P']=$_REQUEST['P']; $_SESSION['E']=$_REQUEST['E']; $_SESSION['Y']=$_REQUEST['Y'];
$sqlEC=mysql_query("select * from hrm_employee where EmployeeID=".$_SESSION['E'], $con); $resEC=mysql_fetch_assoc($sqlEC);
$sqlSt=mysql_query("select Appraiser_NoOfResend, Reviewer_NoOfResend, Hod_NoOfResend from hrm_employee_pms where AssessmentYear=".$_SESSION['Y']." AND EmployeeID=".$_SESSION['E']." AND EmpPmsId=".$_SESSION['P'], $con); $resSt=mysql_fetch_assoc($sqlSt);
?>

<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
</head>
<script type="text/javascript" language="javascript">
function OpenMyfile(v1,v2)
{window.open("MyFile.php?a=open&File="+v1+"&Ext="+v2,"MyFile","width=900,height=650"); }
</script>
<body class="body" background="images/pmsback.png">  
<center> 
<table class="table" border="0" width="800">
<tr><td colspan="3" align="center" style="font-family:Times New Roman; font-weight:bold; font-size:18px; color:#FFFFFF;">Appraisal Form Resent</td></tr>
<tr><td colspan="3" align="" style="font-family:Times New Roman; font-weight:bold; font-size:16px; color:#2020FF;">

    &nbsp;<font color="#000000">EmpCode :&nbsp;</font><?php echo $resEC['EmpCode']; ?>&nbsp;&nbsp;<font color="#000000">Name :&nbsp;</font><?php echo $resEC['Fname'].' '.$resEC['Sname'].' '.$resEC['Lname']; ?>

	</td></tr>
<tr>
<td>
 <table>
   <tr bgcolor="#6D65BE" style="height:21px; ">
     <td style="width:40px; font-family:Times New Roman; color:#FFFFFF; font-size:12px;" align="center"><b>Sno.</b></td>
	 <td style="width:120px; font-family:Times New Roman; color:#FFFFFF; font-size:12px;" align="center"><b>Resent By</b></td> 
	 <td style="width:80px; font-family:Times New Roman; color:#FFFFFF; font-size:12px;" align="center"><b>Resent Date</b></td> 
	 <td style="width:520px; font-family:Times New Roman; color:#FFFFFF; font-size:12px;" align="center"><b>Reason</b></td>
   </tr>
<?php if($resSt['Appraiser_NoOfResend']>0)
{$sqlR=mysql_query("select * from hrm_employee_pms_resend where App_Reason!='' AND EmployeeID=".$_SESSION['E']." AND EmpPmsId=".$_SESSION['P'], $con); 
 $no=1; while($resR=mysql_fetch_assoc($sqlR)) {
?>
   <tr style="height:21px; background-color:#FFFFFF;">
    <td style="width:40px; font-family:Times New Roman; font-size:12px;" align="center"><?php echo $no; ?></td>
	<td style="width:120px; font-family:Times New Roman; font-size:12px;" align="">&nbsp;Appraiser</td>
	<td style="width:80px; font-family:Times New Roman; font-size:12px;" align="center"><?php echo date("d-M-y",strtotime($resR['App_SendReasonDate'])); ?></td>
	<td style="width:620px; font-family:Times New Roman; font-size:12px;" align="">&nbsp;<?php echo $resR['App_Reason']; ?></td> 
   </tr>
 <?php $no++; } }?>  
 <?php if($resSt['Reviewer_NoOfResend']>0)
{$sqlR2=mysql_query("select * from hrm_employee_pms_resend where Rev_Reason!='' AND EmployeeID=".$_SESSION['E']." AND EmpPmsId=".$_SESSION['P'], $con); 
 $no2=$no; while($resR2=mysql_fetch_assoc($sqlR2)) {
?>
   <tr style="height:21px; background-color:#FFEAEA;">
    <td style="width:40px; font-family:Times New Roman; font-size:12px;" align="center"><?php echo $no2; ?></td>
	<td style="width:120px; font-family:Times New Roman; font-size:12px;" align="">&nbsp;Reviewer</td>
	<td style="width:80px; font-family:Times New Roman; font-size:12px;" align="center"><?php echo date("d-M-y",strtotime($resR2['Rev_SendReasonDate'])); ?></td>
	<td style="width:620px; font-family:Times New Roman; font-size:12px;" align="">&nbsp;<?php echo $resR2['Rev_Reason']; ?></td> 
   </tr>
 <?php $no2++; } }?>  
  <?php if($resSt['Hod_NoOfResend']>0)
{$sqlR3=mysql_query("select * from hrm_employee_pms_resend where Hod_Reason!='' AND EmployeeID=".$_SESSION['E']." AND EmpPmsId=".$_SESSION['P'], $con); 
 $no3=$no2; while($resR3=mysql_fetch_assoc($sqlR3)) {
?>
   <tr style="height:21px; background-color:#FFFFFF;">
    <td style="width:40px; font-family:Times New Roman; font-size:12px;" align="center"><?php echo $no3; ?></td>
	<td style="width:120px; font-family:Times New Roman; font-size:12px;" align="">&nbsp;HOD</td>
	<td style="width:80px; font-family:Times New Roman; font-size:12px;" align="center"><?php echo date("d-M-y",strtotime($resR3['Hod_SendReasonDate'])); ?></td>
	<td style="width:620px; font-family:Times New Roman; font-size:12px;" align="">&nbsp;<?php echo $resR3['Hod_Reason']; ?></td> 
   </tr>
 <?php $no3++; } }?>  
 </table>
</td>
</tr>
</table>
</center>  
</body>
</html>



