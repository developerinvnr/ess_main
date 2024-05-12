<?php session_start(); require_once('../AdminUser/config/config.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Attendance Request Form</title>
<style>
.font{ font-style:normal;text-align:center;font-family:Times New Roman;font-size:18px;font-weight:bold;}
.font2{ font-style:oblique;font-family:Times New Roman;font-size:16px;}
</style>
<script type="text/javascript" language="javascript">

</script>
</head>
<body>
<center>
<?php 
$sE=mysql_query("SELECT * FROM hrm_employee_attendance_req WHERE AttRqId=".$_REQUEST['id'], $con); 
$rowE=mysql_num_rows($sE); $rE=mysql_fetch_array($sE); 

$sql=mysql_query("select Fname,Sname,Lname,RepEmployeeID,EmailId_Vnr,Gender,Married,DR,TimeApply,InTime,OutTime from hrm_employee e inner join hrm_employee_general g on e.EmployeeID=g.EmployeeID inner join hrm_employee_personal p on g.EmployeeID=p.EmployeeID where e.EmployeeID=".$rE['EmployeeID'], $con); $res=mysql_fetch_assoc($sql); if($res['DR']=='Y'){$me='Dr.';} elseif($res['Gender']=='M'){$me='Mr.';} elseif($res['Gender']=='F' AND $res['Married']=='Y'){$me='Mrs.';} elseif($res['Gender']=='F' AND $res['Married']=='N'){$me='Miss.';}

$sqlR=mysql_query("select Fname,Sname,Lname,RepEmployeeID,EmailId_Vnr,Gender,Married,DR from hrm_employee e inner join hrm_employee_general g on e.EmployeeID=g.EmployeeID inner join hrm_employee_personal p on g.EmployeeID=p.EmployeeID where e.EmployeeID=".$rE['RId'], $con); $resR=mysql_fetch_assoc($sqlR); if($resR['DR']=='Y'){$mr='Dr.';} elseif($resR['Gender']=='M'){$mr='Mr.';} elseif($resR['Gender']=='F' AND $resR['Married']=='Y'){$mr='Mrs.';} elseif($resR['Gender']=='F' AND $resR['Married']=='N'){$mr='Miss.';}

$sqlH=mysql_query("select Fname,Sname,Lname,RepEmployeeID,EmailId_Vnr,Gender,Married,DR from hrm_employee e inner join hrm_employee_general g on e.EmployeeID=g.EmployeeID inner join hrm_employee_personal p on g.EmployeeID=p.EmployeeID where e.EmployeeID=".$rE['HId'], $con); $resH=mysql_fetch_assoc($sqlH); if($resH['DR']=='Y'){$mh='Dr.';} elseif($resH['Gender']=='M'){$mh='Mr.';} elseif($resH['Gender']=='F' AND $resH['Married']=='Y'){$mh='Mrs.';} elseif($resH['Gender']=='F' AND $resH['Married']=='N'){$mh='Miss.';}
?>

<form name="reqform" method="post" onsubmit="return validate(this)">
<input type="hidden" name="Ename" value="<?php echo $me.' '.$res['Fname'].' '.$res['Sname'].' '.$res['Lname']; ?>" />
<input type="hidden" name="Email" value="<?php echo $res['EmailId_Vnr']; ?>" />
<input type="hidden" name="Rname" value="<?php echo $mr.' '.$resR['Fname'].' '.$resR['Sname'].' '.$resR['Lname']; ?>" />
<input type="hidden" name="Rmail" value="<?php echo $resR['EmailId_Vnr']; ?>" />
<input type="hidden" name="Hname" value="<?php echo $mh.' '.$resH['Fname'].' '.$resH['Sname'].' '.$resH['Lname']; ?>" />
<input type="hidden" name="Hmail" value="<?php echo $resH['EmailId_Vnr']; ?>" />

<input type="hidden" name="ei" Id="ei" value="<?php echo $rE['EmployeeID']; ?>" />
<input type="hidden" name="RId" value="<?php echo $rE['RId']; ?>" />
<input type="hidden" name="HId" value="<?php echo $rE['HId']; ?>" />
<input type="hidden" name="RDate" Id="RDate" value="<?php echo date("Y-m-d", strtotime($rE['AttDate'])); ?>" />
<?php $saE=mysql_query("SELECT * FROM hrm_employee_attendance WHERE EmployeeID=".$rE['EmployeeID']." AND AttDate='".$rE['AttDate']."' ", $con); $rowaE=mysql_num_rows($saE); $raE=mysql_fetch_assoc($saE); ?>
<input type="hidden" name="InLate" Id="InLate" value="<?php echo $raE['InnLate']; ?>" />
<input type="hidden" name="OutLate" Id="OutLate" value="<?php echo $raE['OuttLate']; ?>" />
<input type="hidden" name="Af15" Id="Af15" value="<?php echo $raE['Af15']; ?>" />
<input type="hidden" name="AttId" Id="AttId" value="<?php echo $raE['AttId']; ?>" />
<input type="hidden" name="InnCnt" Id="InnCnt" value="<?php echo $raE['InnCnt']; ?>" />
<input type="hidden" name="OuttCnt" Id="OuttCnt" value="<?php echo $raE['OuttCnt']; ?>" />
<input type="hidden" name="inn" Id="inn" value="<?php echo $res['InTime']; ?>" />
<input type="hidden" name="outt" Id="outt" value="<?php echo $res['OutTime']; ?>" />
<input type="hidden" name="aIn" Id="aIn" value="<?php echo $raE['Inn']; ?>" />
<input type="hidden" name="aOut" Id="aOut" value="<?php echo $raE['Outt']; ?>" />
<input type="hidden" name="tapply" Id="tapply" value="<?php echo $res['TimeApply']; ?>" />
<input type="hidden" name="attv" Id="attv" value="<?php echo $raE['AttValue']; ?>" />
<input type="hidden" name="relax" Id="relax" value="<?php echo $raE['Relax']; ?>" />
<input type="hidden" name="allow" Id="allow" value="<?php echo $raE['Allow']; ?>" />

<input type="hidden" Id="InIn" value="<?php if($rowE>0 AND $rE['InReason']!='' AND $rE['InRemark']!=''){ echo 1;}else{echo 0;} ?>" /><input type="hidden" Id="OutOut" value="<?php if($rowE>0 AND $rE['OutReason']!='' AND $rE['OutRemark']!=''){ echo 1;}else{echo 0;} ?>" />



<table style="margin-top:10px;width:100%;">
<tr><td colspan="3" class="font">Attendance Authorisation Request Details</td></tr>
<tr><td>&nbsp;</td></tr>
<tr>
<td class="font2" style="width:25%;">Request Date</td>
<td class="font2" style="width:2%;">:</td>
<td class="font2" style="width:73%;"><?php echo date("d-m-Y", strtotime($raE['AttDate'])); ?></td>
</tr>
<tr>
<td class="font2">Time</td><td class="font2">:</td>
<td class="font2"><b><?php if($rowE>0 AND $rE['InReason']!='' AND $rE['InRemark']!=''){ ?><font color="#004080">In:</font>&nbsp;<font style="color:<?php if($raE['InnLate']==1){echo '#FF0000';}?>;"><?php if($raE['Inn']=='00:00:00' OR $raE['Inn']==''){echo '00:00';}else{echo date("h:i",strtotime($raE['Inn']));} ?>&nbsp;<?php if($raE['InnLate']==1){echo '- Late';}?></font><?php } ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php if($rowE>0 AND $rE['OutReason']!='' AND $rE['OutRemark']!=''){ ?> <font color="#004080">Out:</font>&nbsp;<font style="color:<?php if($raE['OuttLate']==1){echo '#FF0000';}?>;"><?php if($raE['Outt']=='00:00:00' OR $raE['Outt']==''){echo '00:00';}else{echo date("h:i",strtotime($raE['Outt']));} ?>&nbsp;<?php if($raE['OuttLate']==1){echo '- Early Going';}?></font><?php } ?></b></td>
</tr>
<tr><td style="height:10px;"></td></tr>
<?php if($rowE>0 AND $rE['InReason']!='' AND $rE['InRemark']!=''){ echo '<input type="hidden" name="Inchk" value="1" />';?>
<tr>
<td class="font2" colspan="2"></td>
<td class="font2" style="color:#000099;"><u><b>Request for In-Time Attendance</b></u></td>
</tr>
<tr>
<td class="font2">Reason</td>
<td class="font2">:</td>
<td class="font2"><?php if($rowE>0 AND $rE['InReason']!=''){ echo $rE['InReason']; } ?></td>
</tr>
<tr>
<td class="font2" valign="top">Remark</td>
<td class="font2" valign="top">:</td>
<td class="font2"><?php echo $rE['InRemark']; ?></td>
</tr>
<tr>
<td class="font2" valign="top" bgcolor="#8CC6FF"><b>Reporting Action</b></td>
<td class="font2" valign="top">:</td>
<td class="font2"><input id="MyActIn" name="MyActIn" class="font2" style="border:hidden;width:100px;background-color:#8FFF20;" <?php if($rE['InStatus']==0){$StI='Select';}elseif($rE['InStatus']==1){$StI='Pending';}elseif($rE['InStatus']==2){$StI='Approved';}elseif($rE['InStatus']==3){$StI='Rejected';}?> value="<?php echo $StI; ?>" /></td>
</tr>
<?php } else { echo '<input type="hidden" name="Inchk" value="0" />'; echo '<input type="hidden" id="MyActIn" name="MyActIn" value="'.$rE['InStatus'].'"/>'; } ?>


<?php if($rowE>0 AND $rE['OutReason']!='' AND $rE['OutRemark']!=''){ echo '<input type="hidden" name="Outchk" value="1" />'; ?>
<tr>
<td class="font2" colspan="2"></td>
<td class="font2" style="color:#000099;"><u><b>Request for Out-Time Attendance</b></u></td>
</tr>
<tr>
<td class="font2">Reason</td>
<td class="font2">:</td>
<td class="font2"><?php if($rowE>0 AND $rE['OutReason']!=''){ echo $rE['OutReason']; } ?></td>
</tr>
<tr>
<td class="font2" valign="top">Remark</td>
<td class="font2" valign="top">:</td>
<td class="font2"><?php echo $rE['OutRemark']; ?></td>
</tr>
<tr>
<td class="font2" valign="top" bgcolor="#8CC6FF"><b>Reporting Action</b></td>
<td class="font2" valign="top">:</td>
<td class="font2"><input id="MyActOut" name="MyActOut" class="font2" style="border:hidden;width:100px;background-color:#8FFF20;" <?php if($rE['OutStatus']==0){$StO='Draft';}elseif($rE['OutStatus']==1){$StO='Pending';}elseif($rE['OutStatus']==2){$StO='Approved';}elseif($rE['OutStatus']==3){$StO='Rejected';}?> value="<?php echo $StO; ?>" /></td>
</tr>
<?php } else { echo '<input type="hidden" name="Outchk" value="0" />'; echo '<input type="hidden" id="MyActOut" name="MyActOut" value="'.$rE['InStatus'].'"/>'; }

if($rowE>0){ ?>
<tr><td>&nbsp;</td></tr>
<tr>
<td class="font2" valign="top"><table Astyle="width:100%;" bgcolor="#8CC6FF"><tr><td><b>Reporting Remark</b></td></tr></table></td>
<td class="font2" valign="top">:</td>
<td class="font2" valign="top"><?php echo $rE['R_Remark']; ?></td>
</tr>
<?php if($rE['Status']>0){ ?>
<tr>
<td colspan="2" class="font2" valign="top"></td>
<td class="font2">Status: <b style="color:#008000;">Submitted...</b></td>
</tr>
<?php } ?>
<?php } ?>
<tr>
<td colspan="2" class="font2" valign="top"></td>
<td class="font2" style="color:#509F00;font-size:18px;"><b><?php echo $msg; ?></b></td>
</tr>
</table>
</form>
</center>
</body>
</html>
