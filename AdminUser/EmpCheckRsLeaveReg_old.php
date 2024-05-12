<?php require_once('../AdminUser/config/config.php');  $EmployeeId=$_REQUEST['EI']; $Y=$_REQUEST['Y'];?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="../AdminUser/css/body.css" rel="stylesheet"/>
<link type="text/css" href="../AdminUser/css/pro_dropdown_3.css" rel="stylesheet"/>
<style> .font { color:#ffffff; font-family:Georgia; font-size:11px; width:120px;} .font1 { font-family:"Times New Roman", Times, serif; font-size:11px; width:120px; } 
.font2 { font-size:11px;width:260px;height:18px;} .font4 {color:#1FAD34; font-family:Georgia; font-size:15px;}
.span {display:none; font-family:Courier New; font-size:14px; }.span1 {display:block; font-family:Courier New; font-size:14px; }
.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;}
.SaveButton {background-image:url(images/save.gif); width:20px; height:20px; background-repeat:no-repeat; background-color:#FFFFFF; border-color:#FFFFFF; border-bottom:inherit;}
.TextInput { font-family:"Times New Roman", Times, serif; font-size:11px; width:100px; height:18px;}
</style>
<style>.head{font-family:Times New Roman;font-size:14px;font-weight:bold;}.data{font-family:Times New Roman;font-size:14px;}</style>
<script language="javascript" type="text/javascript">
function SelectYear(v){ var EI=document.getElementById("EI").value; window.location='EmpCheckRsLeaveReg.php?Y='+v+"&EI="+EI;}

//function PrintForm(EI,Y) 
//{window.open("EmpCheckRsLeaveRegPrint.php?action=Form&EI="+EI+"&Y="+Y,"LeaveForm","location=no,scrollbars=no,resizable=no,menubar=no,width=50,height=50");}

</script>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" bgcolor="#E0DBE3">	
<?php $sqlE=mysql_query("select EmpCode, Fname, Sname, Lname, CompanyId, DateOfSepration, DepartmentId, DesigId, GradeId, HqId, Gender, DR, Married, DateJoining, DOB, EmailId_Vnr, VNRExpYear, PreviousExpYear from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee.EmployeeID=".$EmployeeId, $con); $resE=mysql_fetch_assoc($sqlE); 
if($resE['DR']=='Y'){$M='Dr.';} elseif($resE['Gender']=='M'){$M='Mr.';} elseif($resE['Gender']=='F' AND $resE['Married']=='Y'){$M='Mrs.';} elseif($resE['Gender']=='F' AND $resE['Married']=='N'){$M='Miss.';}  $Name=$M.' '.$resE['Fname'].' '.$resE['Sname'].' '.$resE['Lname']; 
$LEC=strlen($resE['EmpCode']); 
if($LEC==1){$EC='000'.$resE['EmpCode'];} if($LEC==2){$EC='00'.$resE['EmpCode'];} if($LEC==3){$EC='0'.$resE['EmpCode'];} if($LEC>=4){$EC=$resE['EmpCode'];}
$sqlC=mysql_query("select CompanyName from hrm_company_basic where CompanyId=".$resE['CompanyId'], $con); $resC=mysql_fetch_assoc($sqlC);

?>
<input type="hidden" name="EI" id="EI" value="<?php echo $_REQUEST['EI']; ?>" />
<table style="vertical-align:top;width:900px;" align="center" border="0">
<tr>
<td>
 <table border="0">
  <tr><td style="width:900px;font-size:15px;font-family:Times New Roman;color:#000000;" valign="top" align="right"><b>Employee Code:&nbsp;<?php echo $EC; ?></b>&nbsp;&nbsp;</td></tr>
  <?php /*
  <tr><td style="width:900px;font-size:20px;font-family:Times New Roman;color:#006A00;" valign="top" align="center"><b>Form-18</b></td></tr>
  <tr><td style="width:900px;font-size:20px;font-family:Times New Roman;color:#006A00;" valign="top" align="center"><b>[See Rule-102]</b></td></tr>
  */ ?>
  <tr><td style="width:900px;font-size:20px;font-family:Times New Roman;color:#006A00;" valign="top" align="center"><b>Leave Register[Year-<?php echo $Y; ?>]</b></td></tr>
  <tr><td>&nbsp;</td></tr>	
  <tr>
   <td style="width:900px;font-size:15px;font-family:Times New Roman;">
    <table border="0">
	 <tr>
	   <td align="" valign="top" style="width:180px;font-size:15px;font-family:Times New Roman;">&nbsp;<b>Name of establishment:</b></td>
	   <td align="" valign="top" style="width:200px;font-size:15px;font-family:Times New Roman;"><b><?php echo $resC['CompanyName']; ?></b></td>
	 </tr>
	  <tr>
	   <td align="" valign="top" style="width:180px;font-size:15px;font-family:Times New Roman;">&nbsp;<b>Name of employee:</b></td>
	   <td align="" valign="top" style="width:300px;font-size:15px;font-family:Times New Roman;"><b><?php echo $Name; ?></b></td>
	 </tr>
	</table>
   </td>
  </tr> 
  <tr>
   <td style="width:900px;font-size:15px;font-family:Times New Roman;">
    <table border="0">
<tr>
<td style="width:140px;font-size:15px;font-family:Times New Roman;">&nbsp;<b><u>Date of joining</u>:</b></td>
 <td>
  <table border="1">
   <tr>
 <td align="center" style="width:100px;font-size:15px;font-family:Times New Roman;background-color:#FFFFFF;"><b><?php echo date("d-m-Y",strtotime($resE['DateJoining'])); ?></b></td>
   </tr>
  </table>
 </td>
<td style="width:10px;">&nbsp;</td>
<td style="width:150px;font-size:15px;font-family:Times New Roman;">&nbsp;<b><u>Date of separation</u>:</b></td>
 <td>
  <table border="1">
   <tr>
 <td align="center" style="width:100px;font-size:15px;font-family:Times New Roman;background-color:#FFFFFF;"><b><?php if($resE['DateOfSepration']!='0000-00-00' AND $resE['DateOfSepration']!='1970-01-01' AND $resE['DateOfSepration']!=''){echo date("d-m-Y",strtotime($resE['DateOfSepration']));} else {echo '&nbsp;';} ?></b></td>
   </tr>
  </table>
 </td>
 <td style="width:300px;" align="right"><b>Select Year:</b>
  <select style="font-size:11px; width:60px; height:18px; background-color:#DDFFBB;" name="YearID" id="YearID" onChange="SelectYear(this.value)"><option value="<?php echo $_REQUEST['Y']; ?>" style="margin-left:0px;" selected>&nbsp;<?php echo $_REQUEST['Y']; ?></option><?php for($i=date("Y"); $i>=2013; $i--){?><option value="<?php echo $i; ?>">&nbsp;<?php echo $i; ?></option><?php } ?></select>
 </td>
</tr>
	</table>
   </td>
  </tr> 
<?php

$ExpMonthDate=date('Y-m-d', strtotime("-2 months", strtotime(date("Y-m-d")))); $pp=strtotime($ExpMonthDate);
$ExpMonth=date('m', strtotime("-2 months", strtotime(date("Y-m-d"))));
$ExpYear=date('Y', strtotime("-2 months", strtotime(date("Y-m-d"))));

$BY=date("Y")-1;
if($_REQUEST['Y']>=date("Y"))
{ $AttTable='hrm_employee_attendance'; $LeaveTable='hrm_employee_monthlyleave_balance'; 
  $AttTable2='hrm_employee_attendance_'.$_REQUEST['Y'];
}
elseif($_REQUEST['Y']==$BY AND date("m")=='01')
{ $AttTable='hrm_employee_attendance'; $LeaveTable='hrm_employee_monthlyleave_balance'; 
  $AttTable2='hrm_employee_attendance_'.$_REQUEST['Y'];
}
elseif($_REQUEST['Y']==$BY AND date("m")>1)
{ $AttTable='hrm_employee_attendance'; $AttTable2='hrm_employee_attendance_'.$_REQUEST['Y']; 
  $LeaveTable='hrm_employee_monthlyleave_balance_'.$_REQUEST['Y']; }
else
{ $AttTable='hrm_employee_attendance'; $AttTable2='hrm_employee_attendance_'.$_REQUEST['Y']; 
  $LeaveTable='hrm_employee_monthlyleave_balance_'.$_REQUEST['Y']; }
?>
  
    
  <tr>
    <td style="vertical-align:top;width:900px;" valign="top">
	  <table border="1" cellspacing="1">
   <tr bgcolor="#7a6189" style="height:22px;">
	<td align="center" class="head" style="color:#FFFFFF;width:100px;">Month</td>
	<td align="center" class="head" style="color:#FFFFFF;width:100px;">No. of Working Days Holidays</td>
	<td align="center" class="head" style="color:#FFFFFF;width:100px;">No. of Lay Day</td>
	<td align="center" class="head" style="color:#FFFFFF;width:100px;">No. of Maternity Leave(not more than 12 week)</td>
	<td align="center" class="head" style="color:#FFFFFF;width:100px;">Earned Leave<br> (EL)</td>
	<td align="center" class="head" style="color:#FFFFFF;width:100px;">Casual Leave<br> (CL)</td>
	<td align="center" class="head" style="color:#FFFFFF;width:100px;">Privilege Leave<br> (PL)</td>
	<td align="center" class="head" style="color:#FFFFFF;width:100px;">Sick Leave<br> (SL)</td>
	<td align="center" class="head" style="color:#FFFFFF;width:100px;">Festival Leave<br> (FL)</td>
	<td align="center" class="head" style="color:#FFFFFF;width:100px;">Maternity Leave<br> (ML)</td>
    <td align="center" class="head" style="color:#FFFFFF;width:100px;">Traveling Leave<br> (TL)</td>
	<td align="center" class="head" style="color:#FFFFFF;width:100px;">Absent</td>
   </tr>
<?php for($i=1; $i<=12; $i++) { ?>	
   <tr bgcolor="#FFFFFF" style="height:22px;">
	<td align="center" class="data" style="width:100px;height:30px;font-weight:bold;">
<?php if($i==1){echo 'January';}elseif($i==2){echo 'February';}elseif($i==3){echo 'March';}elseif($i==4){echo 'April';}elseif($i==5){echo 'May';}elseif($i==6){echo 'June';}elseif($i==7){echo 'July';}elseif($i==8){echo 'August';}elseif($i==9){echo 'September';}elseif($i==10){echo 'October';}elseif($i==11){echo 'November';}elseif($i==12){echo 'December';} ?>				
	</td>
	<td align="center" class="data" style="width:100px;height:30px;">
<?php $yf=$Y."-".$i."-01"; $yt=$Y."-".$i."-31"; $tt=strtotime($yt); 

if($tt<$pp){$tab=$AttTable2; }else{$tab=$AttTable; }

$W=mysql_query("select * from ".$tab." where EmployeeID=".$EmployeeId." AND (AttValue='P' OR AttValue='WFH') AND AttDate>='".$yf."' AND AttDate<='".$yt."' GROUP BY AttDate", $con);
$OD=mysql_query("select * from ".$tab." where EmployeeID=".$EmployeeId." AND AttValue='OD' AND AttDate>='".$yf."' AND AttDate<='".$yt."' GROUP BY AttDate", $con); 
$CH=mysql_query("select * from ".$tab." where EmployeeID=".$EmployeeId." AND (AttValue='CH' OR AttValue='ACH') AND AttDate>='".$yf."' AND AttDate<='".$yt."' GROUP BY AttDate", $con);
$SH=mysql_query("select * from ".$tab." where EmployeeID=".$EmployeeId." AND (AttValue='SH' OR AttValue='ASH') AND AttDate>='".$yf."' AND AttDate<='".$yt."' GROUP BY AttDate", $con);
$PH=mysql_query("select * from ".$tab." where EmployeeID=".$EmployeeId." AND (AttValue='PH' OR AttValue='APH') AND AttDate>='".$yf."' AND AttDate<='".$yt."' GROUP BY AttDate", $con);
$HF=mysql_query("select * from ".$tab." where EmployeeID=".$EmployeeId." AND AttValue='HF' AND AttDate>='".$yf."' AND AttDate<='".$yt."' GROUP BY AttDate", $con);
$HO=mysql_query("select * from ".$tab." where EmployeeID=".$EmployeeId." AND AttValue='HO' AND AttDate>='".$yf."' AND AttDate<='".$yt."' GROUP BY AttDate", $con); 

$C_W=mysql_num_rows($W); $C_OD=mysql_num_rows($OD); $C_CH=mysql_num_rows($CH); $C_SH=mysql_num_rows($SH); 
$C_PH=mysql_num_rows($PH); $C_HF=mysql_num_rows($HF); $C_HO=mysql_num_rows($HO);

$CountW=$C_W; $CountOD=$C_OD; $CountCH=$C_CH/2; $CountSH=$C_SH/2; $CountPH=$C_PH/2; $CountHF=$C_HF/2; 
$CountHO=$C_HO;  

$TotW=$CountW+$CountOD+$CountCH+$CountSH+$CountPH+$CountHF;
?>				
     <table border="1" cellspacing="0">
	  <tr><td style="width:40px;font-size:14px;border-left:hidden;border-top:hidden;" align="center">&nbsp;<b>Wo</b></td>
	  <td style="width:60px;font-weight:<?php if($TotW>0){echo 'bold';}else{echo '';}?>;border-right:hidden;border-top:hidden;" align="center"><?php if($TotW>0){echo $TotW;} ?></td></tr>
	  <tr><td style="width:40px;font-size:14px;border-left:hidden;border-bottom:hidden;" align="center">&nbsp;<b>Ho</b></td>
	  <td style="width:60px;font-weight:<?php if($CountHO>0){echo 'bold';}else{echo '';}?>;border-right:hidden;border-top:bottom;" align="center"><?php if($CountHO>0){echo $CountHO;} ?></td></tr>
	 </table>
	</td>
	<td align="center" class="data" style="width:100px;height:30px;">&nbsp;</td>
	<td align="center" class="data" style="width:100px;height:30px;">&nbsp;</td>
<?php $EL=mysql_query("select * from ".$tab." where EmployeeID=".$EmployeeId." AND AttValue='EL' AND AttDate>='".$yf."' AND AttDate<='".$yt."' GROUP BY AttDate", $con); $C_EL=mysql_num_rows($EL); $CountEL=$C_EL;  ?>		
	<td align="center" class="data" style="width:100px;height:30px;font-weight:<?php if($CountEL>0){echo 'bold';}else{echo '';}?>;"><?php if($CountEL>0){echo $CountEL; ?><br>
<?php $ss_EL2=mysql_query("select AttDate from ".$tab." where EmployeeID=".$EmployeeId." AND AttValue='EL' AND AttDate>='".$Y."-".$i."-01' AND AttDate<='".$Y."-".$i."-31' order by AttDate ASC", $con); while($rr_EL2=mysql_fetch_assoc($ss_EL2)){ echo '<font color="#FF0000">'.date("d",strtotime($rr_EL2['AttDate'])).'</font>/ '; } } ?>
	</td>
	
<?php $CL=mysql_query("select * from ".$tab." where EmployeeID=".$EmployeeId." AND AttValue='CL' AND AttDate>='".$yf."' AND AttDate<='".$yt."' GROUP BY AttDate", $con); $C_CL=mysql_num_rows($CL); $CountCL=$C_CL; $TotCL=$CountCL+$CountCH; ?>		
	<td align="center" class="data" style="width:100px;height:30px;font-weight:<?php if($TotCL>0){echo 'bold';}else{echo '';}?>;"><?php if($TotCL>0){echo $TotCL; ?><br>
<?php $ss_CL2=mysql_query("select AttDate from ".$tab." where EmployeeID=".$EmployeeId." AND (AttValue='CL' OR AttValue='CH') AND AttDate>='".$Y."-".$i."-01' AND AttDate<='".$Y."-".$i."-31' order by AttDate ASC", $con); while($rr_CL2=mysql_fetch_assoc($ss_CL2)){ echo '<font color="#FF0000">'.date("d",strtotime($rr_CL2['AttDate'])).'</font>/ '; } } ?></td>	
	
<?php $PL=mysql_query("select * from ".$tab." where EmployeeID=".$EmployeeId." AND AttValue='PL' AND AttDate>='".$yf."' AND AttDate<='".$yt."' GROUP BY AttDate", $con); $C_PL=mysql_num_rows($PL); $CountPL=$C_PL; $TotPL=$CountPL+$CountPH; ?>		
	<td align="center" class="data" style="width:100px;height:30px;font-weight:<?php if($TotPL>0){echo 'bold';}else{echo '';}?>;"><?php if($TotPL>0){echo $TotPL; ?><br>
<?php $ss_PL2=mysql_query("select AttDate from ".$tab." where EmployeeID=".$EmployeeId." AND (AttValue='PL' OR AttValue='PH') AND AttDate>='".$Y."-".$i."-01' AND AttDate<='".$Y."-".$i."-31' order by AttDate ASC", $con); while($rr_PL2=mysql_fetch_assoc($ss_PL2)){ echo '<font color="#FF0000">'.date("d",strtotime($rr_PL2['AttDate'])).'</font>/ '; } } ?></td>
	
<?php $SL=mysql_query("select * from ".$tab." where EmployeeID=".$EmployeeId." AND AttValue='SL' AND AttDate>='".$yf."' AND AttDate<='".$yt."' GROUP BY AttDate", $con); $C_SL=mysql_num_rows($SL); $CountSL=$C_SL; $TotSL=$CountSL+$CountSH; ?>		
	<td align="center" class="data" style="width:100px;height:30px;font-weight:<?php if($TotSL>0){echo 'bold';}else{echo '';}?>;"><?php if($TotSL>0){echo $TotSL; ?><br>
<?php $ss_SL2=mysql_query("select AttDate from ".$tab." where EmployeeID=".$EmployeeId." AND (AttValue='SL' OR AttValue='SH') AND AttDate>='".$Y."-".$i."-01' AND AttDate<='".$Y."-".$i."-31' order by AttDate ASC", $con); while($rr_SL2=mysql_fetch_assoc($ss_SL2)){ echo '<font color="#FF0000">'.date("d",strtotime($rr_SL2['AttDate'])).'</font>/ '; } } ?></td>

<?php $FL=mysql_query("select * from ".$tab." where EmployeeID=".$EmployeeId." AND AttValue='FL' AND AttDate>='".$yf."' AND AttDate<='".$yt."' GROUP BY AttDate", $con); $C_FL=mysql_num_rows($FL); $CountFL=$C_FL; ?>		
	<td align="center" class="data" style="width:100px;height:30px;font-weight:<?php if($CountFL>0){echo 'bold';}else{echo '';}?>;"><?php if($CountFL>0){echo $CountFL; ?><br>
<?php $ss_FL2=mysql_query("select AttDate from ".$tab." where EmployeeID=".$EmployeeId." AND AttValue='FL' AND AttDate>='".$Y."-".$i."-01' AND AttDate<='".$Y."-".$i."-31' order by AttDate ASC", $con); while($rr_FL2=mysql_fetch_assoc($ss_FL2)){ echo '<font color="#FF0000">'.date("d",strtotime($rr_FL2['AttDate'])).'</font>/ '; } } ?></td>	

<?php $ML=mysql_query("select * from ".$tab." where EmployeeID=".$EmployeeId." AND AttValue='ML' AND AttDate>='".$yf."' AND AttDate<='".$yt."' GROUP BY AttDate", $con); $C_ML=mysql_num_rows($ML); $CountML=$C_ML; ?>
    <td align="center" class="data" style="width:100px;height:30px;font-weight:<?php if($CountML>0){echo 'bold';}else{echo '';}?>;"><?php if($CountML>0){echo $CountML; ?><br>
<?php $ss_ML2=mysql_query("select AttDate from ".$tab." where EmployeeID=".$EmployeeId." AND AttValue='ML' AND AttDate>='".$Y."-".$i."-01' AND AttDate<='".$Y."-".$i."-31' order by AttDate ASC", $con); while($rr_ML2=mysql_fetch_assoc($ss_ML2)){ echo '<font color="#FF0000">'.date("d",strtotime($rr_ML2['AttDate'])).'</font>/ '; } } ?></td>

<?php $TL=mysql_query("select * from ".$tab." where EmployeeID=".$EmployeeId." AND AttValue='TL' AND AttDate>='".$yf."' AND AttDate<='".$yt."' GROUP BY AttDate", $con); $C_TL=mysql_num_rows($TL); $CountTL=$C_TL; ?>
     <td align="center" class="data" style="width:100px;height:30px;font-weight:<?php if($CountTL>0){echo 'bold';}else{echo '';}?>;"><?php if($CountTL>0){echo $CountTL; ?><br>
<?php $ss_TL2=mysql_query("select AttDate from ".$tab." where EmployeeID=".$EmployeeId." AND AttValue='TL' AND AttDate>='".$Y."-".$i."-01' AND AttDate<='".$Y."-".$i."-31' order by AttDate ASC", $con); while($rr_TL2=mysql_fetch_assoc($ss_TL2)){ echo '<font color="#FF0000">'.date("d",strtotime($rr_TL2['AttDate'])).'</font>/ '; } } ?></td>		
	
<?php $Ab=mysql_query("select * from ".$tab." where EmployeeID=".$EmployeeId." AND AttValue='A' AND AttDate>='".$yf."' AND AttDate<='".$yt."' GROUP BY AttDate", $con); $C_Ab=mysql_num_rows($Ab); 

$ACSP=mysql_query("select * from ".$tab." where EmployeeID=".$EmployeeId." AND (AttValue='ACH' OR AttValue='ASH' AttValue='APH') AND AttDate>='".$yf."' AND AttDate<='".$yt."' GROUP BY AttDate", $con); $AC_CSP=mysql_num_rows($ACSP);
$ACSP=$AC_CSP/2; $CountAb=$C_Ab+$ACSP; $TotAb=$CountAb+$CountHf; ?>	
	
	<td align="center" class="data" style="width:100px;height:30px;font-weight:<?php if($TotAb>0){echo 'bold';}else{echo '';}?>;"><?php if($TotAb>0){echo $TotAb; ?><br>
<?php $ss_AbL2=mysql_query("select AttDate from ".$tab." where EmployeeID=".$EmployeeId." AND AttValue='A' AND AttDate>='".$Y."-".$i."-01' AND AttDate<='".$Y."-".$i."-31' order by AttDate ASC", $con); while($rr_AbL2=mysql_fetch_assoc($ss_AbL2)){ echo '<font color="#FF0000">'.date("d",strtotime($rr_AbL2['AttDate'])).'</font>/ '; } } ?></td>
   </tr>
<?php } ?>
<?php /********************************************* Total *******************************************/ ?>  
    <tr bgcolor="#8AFF8A" style="height:22px;">
	<td align="center" class="data" style="width:100px;height:22px;font-weight:bold;color:#FFFFFF; background-color:#2D96FF;">Total(Wo+Ho)</td>
<?php $yfT=$Y."-01-01"; $ytT=$Y."-12-31";   

$TW=mysql_query("select * from ".$AttTable2." where EmployeeID=".$EmployeeId." AND (AttValue='P' OR AttValue='WFH') AND AttDate>='".$yfT."' AND AttDate<'".$ExpMonthDate."' GROUP BY AttDate", $con);
$TOD=mysql_query("select * from ".$AttTable2." where EmployeeID=".$EmployeeId." AND AttValue='OD' AND AttDate>='".$yfT."' AND AttDate<'".$ExpMonthDate."' GROUP BY AttDate", $con); 
$TCH=mysql_query("select * from ".$AttTable2." where EmployeeID=".$EmployeeId." AND (AttValue='CH' OR AttValue='ACH') AND AttDate>='".$yfT."' AND AttDate<'".$ExpMonthDate."' GROUP BY AttDate", $con);
$TSH=mysql_query("select * from ".$AttTable2." where EmployeeID=".$EmployeeId." AND (AttValue='SH' OR AttValue='ASH') AND AttDate>='".$yfT."' AND AttDate<'".$ExpMonthDate."' GROUP BY AttDate", $con);
$TPH=mysql_query("select * from ".$AttTable2." where EmployeeID=".$EmployeeId." AND (AttValue='PH' OR AttValue='APH') AND AttDate>='".$yfT."' AND AttDate<'".$ExpMonthDate."' GROUP BY AttDate", $con);
$THF=mysql_query("select * from ".$AttTable2." where EmployeeID=".$EmployeeId." AND AttValue='HF' AND AttDate>='".$yfT."' AND AttDate<'".$ExpMonthDate."' GROUP BY AttDate", $con);
$THO=mysql_query("select * from ".$AttTable2." where EmployeeID=".$EmployeeId." AND AttValue='HO' AND AttDate>='".$yfT."' AND AttDate<'".$ExpMonthDate."' GROUP BY AttDate", $con);
$TC_W=mysql_num_rows($TW); $TC_OD=mysql_num_rows($TOD); $TC_CH=mysql_num_rows($TCH); 
$TC_SH=mysql_num_rows($TSH); $TC_PH=mysql_num_rows($TPH); $TC_HF=mysql_num_rows($THF); 
$TC_HO=mysql_num_rows($THO);

$TW2=mysql_query("select * from ".$AttTable." where EmployeeID=".$EmployeeId." AND (AttValue='P' OR AttValue='WFH') AND AttDate>='".$ExpMonthDate."' AND AttDate<='".$ytT."' GROUP BY AttDate", $con);
$TOD2=mysql_query("select * from ".$AttTable." where EmployeeID=".$EmployeeId." AND AttValue='OD' AND AttDate>='".$ExpMonthDate."' AND AttDate<='".$ytT."' GROUP BY AttDate", $con); 
$TCH2=mysql_query("select * from ".$AttTable." where EmployeeID=".$EmployeeId." AND (AttValue='CH' OR AttValue='ACH') AND AttDate>='".$ExpMonthDate."' AND AttDate<='".$ytT."' GROUP BY AttDate", $con);
$TSH2=mysql_query("select * from ".$AttTable." where EmployeeID=".$EmployeeId." AND (AttValue='SH' OR AttValue='ASH') AND AttDate>='".$ExpMonthDate."' AND AttDate<='".$ytT."' GROUP BY AttDate", $con);
$TPH2=mysql_query("select * from ".$AttTable." where EmployeeID=".$EmployeeId." AND (AttValue='PH' OR AttValue='APH') AND AttDate>='".$ExpMonthDate."' AND AttDate<='".$ytT."' GROUP BY AttDate", $con);
$THF2=mysql_query("select * from ".$AttTable." where EmployeeID=".$EmployeeId." AND AttValue='HF' AND AttDate>='".$ExpMonthDate."' AND AttDate<='".$ytT."' GROUP BY AttDate", $con);
$THO2=mysql_query("select * from ".$AttTable." where EmployeeID=".$EmployeeId." AND AttValue='HO' AND AttDate>='".$ExpMonthDate."' AND AttDate<='".$ytT."' GROUP BY AttDate", $con); 
$TC2_W=mysql_num_rows($TW2); $TC2_OD=mysql_num_rows($TOD2); $TC2_CH=mysql_num_rows($TCH2); 
$TC2_SH=mysql_num_rows($TSH2); $TC2_PH=mysql_num_rows($TPH2); $TC2_HF=mysql_num_rows($THF2); 
$TC2_HO=mysql_num_rows($THO2); 
$TCountW=($TC_W+$TC2_W); $TCountOD=($TC_OD+$TC2_OD); $TCountCH=($TC_CH+$TC2_CH)/2; $TCountSH=($TC_SH+$TC2_SH)/2; 
$TCountPH=($TC_PH+$TC2_PH)/2; $TCountHF=($TC_HF+$TC2_HF)/2; $TCountHO=($TC_HO+$TC2_HO);
$TTotW=$TCountW+$TCountOD+$TCountCH+$TCountSH+$TCountPH+$TCountHF+$TCountHO;
$TTotW_NoHO=$TCountW+$TCountOD+$TCountCH+$TCountSH+$TCountPH+$TCountHF;
?>	
	<td align="center" class="data" style="width:100px;height:22px;font-weight:<?php if($TTotW_NoHO>0 OR $TCountHO>0){echo 'bold';}else{echo '';}?>;"><?php if($TTotW_NoHO>0 OR $TCountHO>0){echo $TTotW_NoHO.' + '.$TCountHO;}?></td>
	<td align="center" class="data" style="width:100px;height:22px;">&nbsp;</td>
	<td align="center" class="data" style="width:100px;height:22px;">&nbsp;</td>
<?php $TEL=mysql_query("select * from ".$AttTable2." where EmployeeID=".$EmployeeId." AND AttValue='EL' AND AttDate>='".$yfT."' AND AttDate<'".$ExpMonthDate."' GROUP BY AttDate", $con); $TC_EL=mysql_num_rows($TEL);
$TEL2=mysql_query("select * from ".$AttTable." where EmployeeID=".$EmployeeId." AND AttValue='EL' AND AttDate>='".$ExpMonthDate."' AND AttDate<='".$ytT."' GROUP BY AttDate", $con); $TC2_EL=mysql_num_rows($TEL2);
 $TCountEL=$TC_EL+$TC2_EL;  ?>	
	<td align="center" class="data" style="width:100px;height:22px;font-weight:<?php if($TCountEL>0){echo 'bold';}else{echo '';}?>;"><?php if($TCountEL>0){echo $TCountEL;} ?></td>
<?php $TCL=mysql_query("select * from ".$AttTable2." where EmployeeID=".$EmployeeId." AND AttValue='CL' AND AttDate>='".$yfT."' AND AttDate<'".$ExpMonthDate."' GROUP BY AttDate", $con); $TC_CL=mysql_num_rows($TCL);
$TCL2=mysql_query("select * from ".$AttTable." where EmployeeID=".$EmployeeId." AND AttValue='CL' AND AttDate>='".$ExpMonthDate."' AND AttDate<='".$ytT."' GROUP BY AttDate", $con); $TC2_CL=mysql_num_rows($TCL2); $TCountCL=($TC_CL+$TC2_CL); $TTotCL=$TCountCL+$TCountCH; ?>		
	<td align="center" class="data" style="width:100px;height:22px;font-weight:<?php if($TTotCL>0){echo 'bold';}else{echo '';}?>;"><?php if($TTotCL>0){echo $TTotCL;} ?></td>
<?php $TPL=mysql_query("select * from ".$AttTable2." where EmployeeID=".$EmployeeId." AND AttValue='PL' AND AttDate>='".$yfT."' AND AttDate<'".$ExpMonthDate."' GROUP BY AttDate", $con); $TC_PL=mysql_num_rows($TPL);
$TPL2=mysql_query("select * from ".$AttTable." where EmployeeID=".$EmployeeId." AND AttValue='PL' AND AttDate>='".$ExpMonthDate."' AND AttDate<='".$ytT."' GROUP BY AttDate", $con); $TC2_PL=mysql_num_rows($TPL2); $TCountPL=($TC_PL+$TC2_PL); $TTotPL=$TCountPL+$TCountPH; ?>	
	<td align="center" class="data" style="width:100px;height:22px;font-weight:<?php if($TTotPL>0){echo 'bold';}else{echo '';}?>;"><?php if($TTotPL>0){echo $TTotPL;} ?></td>
<?php $TSL=mysql_query("select * from ".$AttTable2." where EmployeeID=".$EmployeeId." AND AttValue='SL' AND AttDate>='".$yfT."' AND AttDate<'".$ExpMonthDate."' GROUP BY AttDate", $con); $TC_SL=mysql_num_rows($TSL);
$TSL2=mysql_query("select * from ".$AttTable." where EmployeeID=".$EmployeeId." AND AttValue='SL' AND AttDate>='".$ExpMonthDate."' AND AttDate<='".$ytT."' GROUP BY AttDate", $con); $TC2_SL=mysql_num_rows($TSL2); $TCountSL=($TC_SL+$TC2_SL); $TTotSL=$TCountSL+$TCountSH; ?>		
	<td align="center" class="data" style="width:100px;height:22px;font-weight:<?php if($TTotSL>0){echo 'bold';}else{echo '';}?>;"><?php if($TTotSL>0){echo $TTotSL;} ?></td>
	
<?php $TFL=mysql_query("select * from ".$AttTable2." where EmployeeID=".$EmployeeId." AND AttValue='FL' AND AttDate>='".$yfT."' AND AttDate<'".$ExpMonthDate."' GROUP BY AttDate", $con); $TC_FL=mysql_num_rows($TFL);
$TFL2=mysql_query("select * from ".$AttTable." where EmployeeID=".$EmployeeId." AND AttValue='FL' AND AttDate>='".$ExpMonthDate."' AND AttDate<='".$ytT."' GROUP BY AttDate", $con); $TC2_FL=mysql_num_rows($TFL2); $TCountFL=($TC_FL+$TC2_FL); ?>		
	<td align="center" class="data" style="width:100px;height:22px;font-weight:<?php if($TCountFL>0){echo 'bold';}else{echo '';}?>;"><?php if($TCountFL>0){echo $TCountFL;} ?></td>	
	
	
<?php $TML=mysql_query("select * from ".$AttTable2." where EmployeeID=".$EmployeeId." AND AttValue='ML' AND AttDate>='".$yfT."' AND AttDate<'".$ExpMonthDate."' GROUP BY AttDate", $con); $TC_ML=mysql_num_rows($TML);
$TML2=mysql_query("select * from ".$AttTable." where EmployeeID=".$EmployeeId." AND AttValue='ML' AND AttDate>='".$ExpMonthDate."' AND AttDate<='".$ytT."' GROUP BY AttDate", $con); $TC2_ML=mysql_num_rows($TML2); $TCountML=($TC_ML+$TC2_ML); ?><td align="center" class="data" style="width:100px;height:22px;font-weight:<?php if($TCountML>0){echo 'bold';}else{echo '';}?>;"><?php if($TCountML>0){echo $TCountML;} ?></td>

<?php $TTL=mysql_query("select * from ".$AttTable2." where EmployeeID=".$EmployeeId." AND AttValue='TL' AND AttDate>='".$yfT."' AND AttDate<'".$ExpMonthDate."' GROUP BY AttDate", $con); $TC_TL=mysql_num_rows($TTL);
$TTL2=mysql_query("select * from ".$AttTable." where EmployeeID=".$EmployeeId." AND AttValue='TL' AND AttDate>='".$ExpMonthDate."' AND AttDate<='".$ytT."' GROUP BY AttDate", $con); $TC2_TL=mysql_num_rows($TTL2); $TCountTL=($TC_TL+$TC2_TL); ?><td align="center" class="data" style="width:100px;height:22px;font-weight:<?php if($TCountTL>0){echo 'bold';}else{echo '';}?>;"><?php if($TCountTL>0){echo $TCountTL;} ?></td>	
	
	
<?php $TAb=mysql_query("select * from ".$AttTable2." where EmployeeID=".$EmployeeId." AND AttValue='A' AND AttDate>='".$yfT."' AND AttDate<'".$ExpMonthDate."' GROUP BY AttDate", $con); $TC_Ab=mysql_num_rows($TAb);

$TAb2=mysql_query("select * from ".$AttTable." where EmployeeID=".$EmployeeId." AND AttValue='A' AND AttDate>='".$ExpMonthDate."' AND AttDate<='".$ytT."' GROUP BY AttDate", $con); $TC2_Ab=mysql_num_rows($TAb2); 

$TCSP=mysql_query("select * from ".$AttTable2." where EmployeeID=".$EmployeeId." AND (AttValue='ACH' OR AttValue='ASH' AttValue='APH') AND AttDate>='".$yfT."' AND AttDate<'".$ExpMonthDate."' GROUP BY AttDate", $con); 
$TC_CSP=mysql_num_rows($TCSP); $CSP=$TC_CSP/2;

$TCSP2=mysql_query("select * from ".$AttTable2." where EmployeeID=".$EmployeeId." AND (AttValue='ACH' OR AttValue='ASH' AttValue='APH') AND AttDate>='".$ExpMonthDate."' AND AttDate<='".$ytT."' GROUP BY AttDate", $con); 
$TC_CSP2=mysql_num_rows($TCSP2); $CSP2=$TC_CSP2/2;

$TCountAb=($TC_Ab+$TC2_Ab+$CSP+$CSP2); $TTotAb=$TCountAb+$TCountHf; ?>			
	<td align="center" class="data" style="width:100px;height:22px;font-weight:<?php if($TTotAb>0){echo 'bold';}else{echo '';}?>;"><?php if($TTotAb>0){echo $TTotAb;} ?></td>
   </tr>
<?php /********************************************* Balance 31st January *******************************************/ ?>     
   <tr bgcolor="#FFFFFF" style="height:22px;">
	<td rowspan="1" align="center" class="data" style="width:100px;height:22px;font-weight:bold;color:#FFFFFF;background-color:#2D96FF;">1<sup>st</sup><br> January</td>
	<td align="" class="data" style="width:100px;height:22px;font-weight:bold;">&nbsp;&nbsp;Balance :</td>
<?php 
$sqlMaxId=mysql_query("select MAX(MonthlyLeaveId) as MaxLvId from ".$LeaveTable." where EmployeeID=".$EmployeeId." AND Year=".$Y, $con);
$resMaxId=mysql_fetch_assoc($sqlMaxId); if($resMaxId['MaxLvId']>0){
$sqlBal=mysql_query("select BalanceCL,BalanceSL,BalancePL,BalanceEL from ".$LeaveTable." where MonthlyLeaveId=".$resMaxId['MaxLvId']." AND Year=".$Y, $con);
$resBal=mysql_fetch_assoc($sqlBal);}
?>	
	<td align="center" class="data" style="width:100px;height:22px;">&nbsp;</td>
	<td align="center" class="data" style="width:100px;height:22px;">&nbsp;</td>
	<td align="center" class="data" style="width:100px;height:22px;font-weight:bold;"><?php if($resBal['BalanceEL']>0){echo $resBal['BalanceEL'];} ?></td>
	<td align="center" class="data" style="width:100px;height:22px;font-weight:bold;"><?php //if($resBal['BalanceCL']>0){echo $resBal['BalanceCL'];} ?></td>
	<td align="center" class="data" style="width:100px;height:22px;font-weight:bold;"><?php //if($resBal['BalancePL']>0){echo $resBal['BalancePL'];} ?></td>
	<td align="center" class="data" style="width:100px;height:22px;font-weight:bold;"><?php if($resBal['BalanceSL']>0){echo $resBal['BalanceSL'];} ?></td>
	<td align="center" class="data" style="width:100px;height:22px;font-weight:bold;"><?php //if($resBal['BalanceFL']>0){echo $resBal['BalanceFL'];} ?></td>	
	<td class="data" style="width:100px;height:22px;">&nbsp;</td>
    <td class="data" style="width:100px;height:22px;">&nbsp;</td>	
	<td align="center" class="data" style="width:100px;height:22px;">&nbsp;</td>
   </tr>
   <tr bgcolor="#FFFFFF" style="width:100px;height:20px;">
	<td colspan="4" align="center" class="data" style="width:100px;height:20px;font-weight:bold;color:#FFFFFF;background-color:#2D96FF;">
	No. of leave availed during the calander year:</td><?php $TotLeave=$TCountEL+$TTotCL+$TTotPL+$TTotSL+$TCountFL; ?>
	<td colspan="8" align="" class="data" style="width:100px;font-weight:<?php if($TotLeave>0){echo 'bold';}else{echo '';}?>;">&nbsp;&nbsp;<?php echo $TotLeave; ?></td>
   </tr>     

	  </table>
	</td>
  </tr>
  <tr><td>&nbsp;</td></tr>
 </table>
</td>
</tr>
</table>
</body>  
</html>
