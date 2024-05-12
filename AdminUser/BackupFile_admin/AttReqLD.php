<?php session_start(); require_once('config/config.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Attendance Request Form</title>
<style>
.font{ font-style:normal;text-align:center;font-family:Times New Roman;font-size:18px;font-weight:bold;}
.font2{ font-style:oblique;font-family:Times New Roman;font-size:16px;}
</style>
</head>
<body>
<center>
<?php 

$BY=date("Y")-1;
if($_REQUEST['y']>=date("Y")){ $AttTable='hrm_employee_attendance'; }
elseif($_REQUEST['y']==$BY AND date("m")=='01' AND $_REQUEST['m']==12){ $AttTable='hrm_employee_attendance'; }
elseif($_REQUEST['y']==$BY AND $_REQUEST['m']<12){ $AttTable='hrm_employee_attendance_'.$_REQUEST['y']; }
else{$AttTable='hrm_employee_attendance_'.$_REQUEST['y']; }

$sE=mysql_query("SELECT * FROM hrm_employee_attendance_req WHERE EmployeeID=".$_REQUEST['ei']." AND AttDate='".$_REQUEST['y']."-".$_REQUEST['m']."-".$_REQUEST['d']."'", $con); 
$rowE=mysql_num_rows($sE); $rE=mysql_fetch_array($sE); 

$sql=mysql_query("select Fname,Sname,Lname,Gender,Married,DR,TimeApply,InTime,OutTime from hrm_employee e inner join hrm_employee_general g on e.EmployeeID=g.EmployeeID inner join hrm_employee_personal p on g.EmployeeID=p.EmployeeID where e.EmployeeID=".$rE['EmployeeID'], $con); $res=mysql_fetch_assoc($sql); if($res['DR']=='Y'){$me='Dr.';} elseif($res['Gender']=='M'){$me='Mr.';} elseif($res['Gender']=='F' AND $res['Married']=='Y'){$me='Mrs.';} elseif($res['Gender']=='F' AND $res['Married']=='N'){$me='Miss.';} 

$saE=mysql_query("SELECT * FROM ".$AttTable." WHERE EmployeeID=".$rE['EmployeeID']." AND AttDate='".$rE['AttDate']."' ", $con); $rowaE=mysql_num_rows($saE); $raE=mysql_fetch_assoc($saE);
?>


<table style="margin-top:10px;width:100%;">
<tr><td colspan="3" class="font">Attendance Authorisation Request Details<br />
<b style="font-size:12px;"><?php echo $me.' '.$res['Fname'].' '.$res['Sname'].' '.$res['Lname']; ?></b></td></tr>
<tr><td>&nbsp;</td></tr>
<tr>
<td class="font2" style="width:25%;">Request Date</td>
<td class="font2" style="width:2%;">:</td>
<td class="font2" style="width:73%;"><?php echo date("d-m-Y", strtotime($rE['AttDate'])); ?></td>
</tr>
<tr>
<td class="font2">Time</td><td class="font2">:</td>
<td class="font2"><b><?php if($rowE>0){ ?><font color="#004080">In:</font>&nbsp;<font style="color:<?php if($raE['InnLate']==1){echo '#FF0000';}?>;"><?php if($raE['Inn']=='00:00:00' OR $raE['Inn']==''){echo '00:00';}else{echo date("h:i",strtotime($raE['Inn']));} ?>&nbsp;<?php if($raE['InnLate']==1){echo '- Late';}?></font><?php } ?><?php if($rowE>0){ ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <font color="#004080">Out:</font>&nbsp;<font style="color:<?php if($raE['OuttLate']==1){echo '#FF0000';}?>;"><?php if($raE['Outt']=='00:00:00' OR $raE['Outt']==''){echo '00:00';}else{echo date("h:i",strtotime($raE['Outt']));} ?>&nbsp;<?php if($raE['OuttLate']==1){echo '- Early Going';}?></font><?php } ?></b></td>
</tr>
<tr><td style="height:10px;"></td></tr>
<?php if($rowE>0 AND $rE['InReason']!='' AND $rE['InRemark']!=''){ ?>
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
<?php if($rE['R_Remark']!='' OR $rE['H_Remark']!=''){ ?>
<tr>
<td class="font2" valign="top">In Status</td>
<td class="font2" valign="top">:</td>
<td class="font2"><?php if($rE['InStatus']==2){echo 'Approved';}elseif($rE['InStatus']==3){echo 'Rejected';} ?></td>
</tr>
<?php } ?>
<?php } ?>
<?php if($rowE>0 AND $rE['OutReason']!='' AND $rE['OutRemark']!=''){ ?>
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
<?php if($rE['R_Remark']!='' OR $rE['H_Remark']!=''){ ?>
<tr>
<td class="font2" valign="top">Out Status</td>
<td class="font2" valign="top">:</td>
<td class="font2"><?php if($rE['OutStatus']==2){echo 'Approved';}elseif($rE['InStatus']==3){echo 'Rejected';} ?></td>
</tr>
<?php } ?>
<?php } ?>

<?php if($rowE>0 AND $rE['Reason']!='' AND $rE['Remark']!=''){ ?>
<tr>
<td class="font2" colspan="2"></td>
<td class="font2" style="color:#000099;"><u><b>Request for Attendance</b></u></td>
</tr>
<tr>
<td class="font2">Reason</td>
<td class="font2">:</td>
<td class="font2"><?php if($rowE>0 AND $rE['Reason']!=''){ echo $rE['Reason']; } ?></td>
</tr>
<tr>
<td class="font2" valign="top">Remark</td>
<td class="font2" valign="top">:</td>
<td class="font2"><?php echo $rE['Remark']; ?></td>
</tr>
<?php if($rE['R_Remark']!='' OR $rE['H_Remark']!=''){ ?>
<tr>
<td class="font2" valign="top">Status</td>
<td class="font2" valign="top">:</td>
<td class="font2"><?php if($rE['SStatus']==2){echo 'Approved';}elseif($rE['SStatus']==3){echo 'Rejected';} ?></td>
</tr>
<?php } ?>
<?php } ?>

<?php if($rE['R_Remark']!=''){ ?>
<tr><td>&nbsp;</td></tr>
<tr>
<td class="font2" valign="top"><table style="width:100%;" bgcolor="#8CC6FF"><tr><td><b>Mgr Remark</b></td></tr></table></td>
<td class="font2" valign="top">:</td>
<td class="font2"><textarea class="font2" id="myremark" name="myremark" cols="50" rows="2"><?php echo $rE['R_Remark']; ?></textarea></td>
</tr>
<?php } if($rE['H_Remark']!=''){ ?>
<tr>
<td class="font2" valign="top"><table style="width:100%;" bgcolor="#8CC6FF"><tr><td><b>HR Remark</b></td></tr></table></td>
<td class="font2" valign="top">:</td>
<td class="font2"><textarea class="font2" id="myremark" name="myremark" cols="50" rows="2"><?php echo $rE['H_Remark']; ?></textarea></td>
</tr>
<?php } ?>
</table>
</form>
</center>
</body>
</html>
