<?php session_start();
require_once('../AdminUser/config/config.php');
$_SESSION['Sent']=$_REQUEST['action']; $_SESSION['P']=$_REQUEST['P']; $_SESSION['E']=$_REQUEST['E']; $_SESSION['Y']=$_REQUEST['Y'];
$sqlEC=mysql_query("select * from hrm_employee where EmployeeID=".$_SESSION['E'], $con); $resEC=mysql_fetch_assoc($sqlEC);
$sqlSt=mysql_query("select Appraiser_NoOfResend, Reviewer_NoOfResend, Rev2_NoOfResend, Hod_NoOfResend from hrm_employee_pms where AssessmentYear=".$_SESSION['Y']." AND EmployeeID=".$_SESSION['E']." AND EmpPmsId=".$_SESSION['P'], $con); $resSt=mysql_fetch_assoc($sqlSt);
?>

<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
</head>
<style>
.st{font-family:Times New Roman;color:#FFFFFF;font-size:14px;text-align:center;background-color:#6D65BE;}
.st2{font-family:Times New Roman;color:#000000;font-size:14px;background-color:#FFFFFF;}
.st3{font-family:Times New Roman;color:#000000;font-size:14px;background-color:#FFFF9F;}
.tit{font-family:Times New Roman; font-weight:bold; font-size:20px;color:#FFFFFF;text-decoration:underline;}
.tit2{font-family:Times New Roman; font-weight:bold; font-size:16px; color:#2020FF;}
</style>
<script type="text/javascript" language="javascript">
function OpenMyfile(v1,v2)
{window.open("MyFile.php?a=open&File="+v1+"&Ext="+v2,"MyFile","width=900,height=650"); }
</script>
<body class="body" background="images/pmsback.png">  
<center> 
<table class="table" border="0" width="95%">
<tr><td colspan="3" align="center" class="tit">Appraisal Form Resent</td></tr>
<tr><td colspan="3">&nbsp;</td></tr>
<tr><td colspan="3" class="tit2">&nbsp;<font color="#000000">EmpCode :&nbsp;</font><?php echo $resEC['EmpCode']; ?>&nbsp;&nbsp;<font color="#000000">Name :&nbsp;</font><?php echo $resEC['Fname'].' '.$resEC['Sname'].' '.$resEC['Lname']; ?></td></tr>
<tr>
<td align="center">
 <table>
   <tr bgcolor="#6D65BE" style="height:22px;">
     <td class="st" style="width:40px;"><b>Sno.</b></td>
	 <td class="st" style="width:120px;"><b>Resent By</b></td> 
	 <td class="st" style="width:80px;"><b>Resent Date</b></td> 
	 <td class="st" style="width:300px;"><b>Reason</b></td>
	 <td class="st" style="width:60px;"><b>Form A<br>Score</b></td>
	 <td class="st" style="width:60px;"><b>Form B<br>Score</b></td>
	 <td class="st" style="width:60px;"><b>Total<br>Score</b></td>
	 <td class="st" style="width:60px;"><b>Rating</b></td>
	 
   </tr>
<?php if($resSt['Appraiser_NoOfResend']>0)
{ $sqlR=mysql_query("select * from hrm_employee_pms_resend where App_Reason!='' AND EmployeeID=".$_SESSION['E']." AND EmpPmsId=".$_SESSION['P'], $con); 
 $no=1; while($resR=mysql_fetch_assoc($sqlR)) {
?>
   <tr style="height:22px;">
    <td class="st2" align="center"><?php echo $no; ?></td>
	<td class="st2" align="left">&nbsp;Appraiser</td>
	<td class="st2" align="center"><?php echo date("d-M-y",strtotime($resR['App_SendReasonDate'])); ?></td>
	<td class="st2" align="left" valign="top"><?php echo $resR['App_Reason']; ?></td> 
	<td class="st2" align="center"><?php echo $resR['EmpFinallyFormA_Score']; ?></td>
	<td class="st2" align="center"><?php echo $resR['EmpFinallyFormB_Score']; ?></td>
	<td class="st2" align="center"><?php echo $resR['Emp_TotalFinalScore']; ?></td>
	<td class="st2" align="center"><?php echo $resR['Emp_TotalFinalRating']; ?></td>
   </tr>
 <?php $no++; } }?>  
 <?php if($resSt['Reviewer_NoOfResend']>0)
{$sqlR2=mysql_query("select * from hrm_employee_pms_resend where Rev_Reason!='' AND EmployeeID=".$_SESSION['E']." AND EmpPmsId=".$_SESSION['P'], $con); 
 $no2=$no; while($resR2=mysql_fetch_assoc($sqlR2)) {
?>
   <tr style="height:22px;">
    <td class="st3" align="center"><?php echo $no2; ?></td>
	<td class="st3" align="left">&nbsp;Reviewer</td>
	<td class="st3" align="center"><?php echo date("d-M-y",strtotime($resR2['Rev_SendReasonDate'])); ?></td>
	<td class="st3" align="left" valign="top"><?php echo $resR2['Rev_Reason']; ?></td>
	<td class="st3" align="center"><?php echo $resR2['AppFinallyFormA_Score']; ?></td>
	<td class="st3" align="center"><?php echo $resR2['AppFinallyFormB_Score']; ?></td>
	<td class="st3" align="center"><?php echo $resR2['App_TotalFinalScore']; ?></td>
	<td class="st3" align="center"><?php echo $resR2['App_TotalFinalRating']; ?></td> 
   </tr>
 <?php $no2++; } }?>  
 <?php if($resSt['Rev2_NoOfResend']>0)
{$sqlR4=mysql_query("select * from hrm_employee_pms_resend where Rev2_Reason!='' AND EmployeeID=".$_SESSION['E']." AND EmpPmsId=".$_SESSION['P'], $con); 
 $no4=$no2; while($resR4=mysql_fetch_assoc($sqlR4)) {
?>
   <tr style="height:22px;">
    <td class="st2" align="center"><?php echo $no4; ?></td>
	<td class="st2" align="left">&nbsp;HOD</td>
	<td class="st2" align="center"><?php echo date("d-M-y",strtotime($resR4['Rev2_SendReasonDate'])); ?></td>
	<td class="st2" align="left" valign="top"><?php echo $resR4['Rev_Reason']; ?></td>
	<td class="st2" align="center"><?php echo $resR4['AppFinallyFormA_Score']; ?></td>
	<td class="st2" align="center"><?php echo $resR4['AppFinallyFormB_Score']; ?></td>
	<td class="st2" align="center"><?php echo $resR4['App_TotalFinalScore']; ?></td>
	<td class="st2" align="center"><?php echo $resR4['App_TotalFinalRating']; ?></td> 
   </tr>
 <?php $no4++; } }?>  
  <?php if($resSt['Hod_NoOfResend']>0)
{$sqlR3=mysql_query("select * from hrm_employee_pms_resend where Hod_Reason!='' AND EmployeeID=".$_SESSION['E']." AND EmpPmsId=".$_SESSION['P'], $con); 
 $no3=$no4; while($resR3=mysql_fetch_assoc($sqlR3)) {
?>
   <tr style="height:22px;">
    <td class="st3" align="center"><?php echo $no3; ?></td>
	<td class="st3" align="left">&nbsp;Management</td>
	<td class="st3" align="center"><?php echo date("d-M-y",strtotime($resR3['Hod_SendReasonDate'])); ?></td>
	<td class="st3" align="left" valign="top"><?php echo $resR3['Hod_Reason']; ?></td> 
	<td class="st3" align="center"><?php echo $resR3['RevFinallyFormA_Score']; ?></td>
	<td class="st3" align="center"><?php echo $resR3['RevFinallyFormB_Score']; ?></td>
	<td class="st3" align="center"><?php echo $resR3['Rev_TotalFinalScore']; ?></td>
	<td class="st3" align="center"><?php echo $resR3['Rev_TotalFinalRating']; ?></td>
   </tr>
 <?php $no3++; } }?>  
 </table>
</td>
</tr>
</table>
</center>  
</body>
</html>



