<?php session_start();
require_once('../AdminUser/config/config.php');
$sqlSY=mysql_query("select * from hrm_pms_setting where CompanyId=".$_REQUEST['c']." AND Process='KRA'", $con); $resSY=mysql_fetch_array($sqlSY); $spms = mysql_query("select UnLckKRA from hrm_employee_pms where EmployeeID=".$_REQUEST['e']." AND AssessmentYear=".$resSY['CurrY'],$con); $rpms=mysql_fetch_assoc($spms);

if($_REQUEST['n']==1){ $fn='FormBId'; $sqlk=mysql_query("select Skill,SkillComment from hrm_employee_pms_behavioralformb efb inner join hrm_pms_formb fb on efb.FormBId=fb.FormBId where efb.FormBId=".$_REQUEST['fbid'],$con); }elseif($_REQUEST['n']==2){ $fn='FormBSubId'; $sqlk=mysql_query("select Skill,SkillComment from hrm_employee_pms_behavioralformb_sub efbs inner join hrm_pms_formbsub fbs on efbs.FormBSubId=fbs.FormBSubId where efbs.FormBSubId=".$_REQUEST['fbid'],$con); } $resk=mysql_fetch_assoc($sqlk);

$sqlDept=mysql_query("select DepartmentId,DateJoining from hrm_employee_general where EmployeeID=".$_REQUEST['e'],$con);
$resDept=mysql_fetch_assoc($sqlDept); 
$DojY=date("Y",strtotime($resDept['DateJoining'])); $DojM=date("m",strtotime($resDept['DateJoining']));
if($DojY<date("Y")){$Mnt_cal=12; $Qtr_cal=4; $Hlf_cal=2;}
else
{ //echo 'aa='.$DojM;
 if($DojM==01 OR $DojM==1){$Mnt_cal=12; $Qtr_cal=4; $Hlf_cal=2;}
 elseif($DojM==02 OR $DojM==2){$Mnt_cal=11; $Qtr_cal=4; $Hlf_cal=2;}
 elseif($DojM==03 OR $DojM==3){$Mnt_cal=10; $Qtr_cal=4; $Hlf_cal=2;}
 elseif($DojM==04 OR $DojM==4){$Mnt_cal=9; $Qtr_cal=3; $Hlf_cal=2;}
 elseif($DojM==05 OR $DojM==5){$Mnt_cal=8; $Qtr_cal=3; $Hlf_cal=2;}
 elseif($DojM==06 OR $DojM==6){$Mnt_cal=7; $Qtr_cal=3; $Hlf_cal=2;}
 elseif($DojM==07 OR $DojM==7){$Mnt_cal=6; $Qtr_cal=2; $Hlf_cal=1;}
 elseif($DojM==08 OR $DojM==8){$Mnt_cal=5; $Qtr_cal=2; $Hlf_cal=1;}
 elseif($DojM==09 OR $DojM==9){$Mnt_cal=4; $Qtr_cal=2; $Hlf_cal=1;}
 elseif($DojM==10){$Mnt_cal=3; $Qtr_cal=1; $Hlf_cal=1;}
 elseif($DojM==11){$Mnt_cal=2; $Qtr_cal=1; $Hlf_cal=1;}
 elseif($DojM==12){$Mnt_cal=1; $Qtr_cal=1; $Hlf_cal=1;}
}

if($_REQUEST['prd']=='Monthly')
{ $countrow=12; $tit='Month'; $num=12; 
  $tgt=round(($_REQUEST['tgt']/$Mnt_cal),2); $wgt=round(($_REQUEST['wgt']/$Mnt_cal),2); }
elseif($_REQUEST['prd']=='Quarter')
{ $countrow=4; $tit='Quarter'; $num=4; 
  $tgt=round($_REQUEST['tgt']/$Qtr_cal); $wgt=round(($_REQUEST['wgt']/$Qtr_cal),2); }
elseif($_REQUEST['prd']=='1/2 Annual')
{ $countrow=2; $tit='Year'; $num=2; 
  $tgt=round($_REQUEST['tgt']/$Hlf_cal); $wgt=round(($_REQUEST['wgt']/$Hlf_cal),2); }

?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">

<title>Target Define</title>
<style>.h{font-size:16px;font-family:Times New Roman;text-align:center;font-weight:bold;color:#FFF;}
.t{font-size:12px;font-family:Times New Roman;text-align:center;font-weight:bold;color:#FFFFFF;}
.dc{font-size:12px;font-family:Times New Roman;color:#000000;text-align:center;}
.d{font-size:12px;font-family:Times New Roman;color:#000000;}
.input{font-size:12px;font-family:Times New Roman;color:#000000;width:100%;border:hidden;}
.blink_me { animation: blinker 1s linear infinite; }
@keyframes blinker {  50% { opacity: 0; } }
.msg_g{ font-family:Times New Roman;font-size:18px;font-weight:bold;color:#006600;}
.msg_r{ font-family:Times New Roman;font-size:20px;font-weight:bold;color:#FFC1C1;}
.msg_y{ font-family:Times New Roman;font-size:18px;font-weight:bold;color:#FFFF79;}
.msg_b{ font-family:Times New Roman;font-size:18px;font-weight:bold;color:#0075EA;}
</style>
<script type="text/javascript" src="js/Prototype.js"></script><?php /* Ajax */ ?>
<script type="text/javascript" language="javascript">
function FunEdit(i)
{
 document.getElementById("edit_"+i).style.display='none'; document.getElementById("save_"+i).style.display='block';
 document.getElementById("Cmnt"+i).readOnly=false; document.getElementById("Cmnt"+i).style.background='#FFF';
 document.getElementById("TD1"+i).style.background='#FFF';
}

function FunSave(i,id)
{
 var cmnt=document.getElementById("Cmnt"+i).value; 
 var fn=document.getElementById("fn").value; var fbid=document.getElementById("fbid").value;
 if(cmnt==''){ alert("please type remark"); return false;}
 else
 {
  var cmt=cmnt.replace(/[`~!@#$^&*_|+\-=÷¿?;:'"<>\{\}\[\]\\\/]/gi, ''); 
  var url = 'setkrarevtgtformbact.php'; var pars = 'cmnt='+cmt+'&id='+id+'&i='+i+'&fn='+fn+'&fbid='+fbid;
  var myAjax = new Ajax.Request( url, { method: 'post', parameters: pars, onComplete: show_result });
 }
}
function show_result(originalRequest)
{ document.getElementById('ResultSpan').innerHTML = originalRequest.responseText; 
  var i=document.getElementById('ir').value; var rst=document.getElementById('rst').value;
  if(rst==1)
  {
   alert("Data saved successfully!"); 
   document.getElementById("edit_"+i).style.display='block'; document.getElementById("save_"+i).style.display='none'; 
   document.getElementById("Cmnt"+i).readOnly=true; document.getElementById("Cmnt"+i).style.background='#D5FFAA';
   document.getElementById("TD1"+i).style.background='#D5FFAA'; 
   document.getElementById("lockk_"+i).style.display='block';
  }
}


function FunLk(i,id)
{
  var agree=confirm("Do you want to submit?");
  if(agree)
  {
   var url = 'setkrarevtgtformbact.php'; var pars = 'lockk=OkLock&id='+id+'&i='+i;
   var myAjax = new Ajax.Request( url, { method: 'post', parameters: pars, onComplete: show_result2 });
  }
  else{return false;}
}
function show_result2(originalRequest)
{ document.getElementById('ResultSpan').innerHTML = originalRequest.responseText; 
  var i2=document.getElementById('ir2').value; var rst2=document.getElementById('rst2').value;
  if(rst2==1)
  {
   alert("Achivement submitted successfully!"); 
   document.getElementById("edit_"+i2).style.display='none'; 
   document.getElementById("lockk_"+i2).style.display='none'; document.getElementById("ok_"+i2).style.display='block';
  }
}


function isNumberKey(evt)
{
  var charCode = (evt.which) ? evt.which : evt.keyCode;
  if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57))
  return false; return true;
}

</script>
</head>
<body bgcolor="#6C6C00">
<span id="ResultSpan"></span>
<?php for($i=1; $i<=12; $i++){ ?>
<input type="hidden" id="AchScore<?php echo $i; ?>" value="0" />
<input type="hidden" id="KraScore<?php echo $i; ?>" value="0" />
<?php } ?>
<?php $sqle=mysql_query("select EmpCode,Fname,Sname,Lname from hrm_employee where EmployeeID=".$_REQUEST['e'],$con);
      $rese=mysql_fetch_assoc($sqle); ?>
<center>
<table style="width:100%;">
 <tr>
  <td style="width:100%;" valign="top">
   <table align="center" border="0" cellspacing="1">
    <tr><td colspan="15" class="h"><u>Define Target (Form-B)</u></td></tr>
	
	<tr><td>&nbsp;</td></tr>
	<tr><td colspan="16"><font color="#9BFFFF">Name:</font>&nbsp;<font color="#FFFFFF"><?php echo $rese['EmpCode'].': '.$rese['Fname'].' '.$rese['Sname'].' '.$rese['Lname']; ?></font></td></tr>
	<tr><td colspan="16"><font color="#9BFFFF">Logic:</font>&nbsp;<font color="#FFFFFF"><?php echo $_REQUEST['lgc']; ?></font>&nbsp;,&nbsp;<font color="#9BFFFF">Skill:</font>&nbsp;<font color="#FFFFFF"><?php echo $resk['Skill']; ?></font></td></tr><tr><td colspan="16"><font color="#9BFFFF">Description:</font>&nbsp;<font color="#FFFFFF"><?php echo $resk['SkillComment']; ?></td></font></tr>	
    <tr style="background-color:#CC9900;height:25px;">
	 <td rowspan="2" class="t" style="width:40px;">Sn</td>
	 <td rowspan="2" class="t" style="width:80px;"><?php echo $tit; ?></td>
	 <td rowspan="2" class="t" style="width:50px;">Weigh<br>tage</td>
	 <td rowspan="2" class="t" style="width:50px;">Target</td>
	 <td rowspan="2" class="t" style="width:200px;">Activity Performed</td>
	 <td colspan="3" class="t">Employee Rating Deatis</td>
	 <td colspan="3" class="t">Reporting Rating Deatis</td>
	 <td rowspan="2" class="t" style="width:200px;">Reviewer Remark</td>
	 <td rowspan="2" class="t" style="width:50px;">Edit</td>
	 <td rowspan="2" class="t" style="width:50px;">Submit</td>
	</tr>
	<tr style="background-color:#CC9900;height:25px;">
	 <td class="t" style="width:50px;color:#FFF;">Self Rating</td>
	 <td class="t" style="width:200px;color:#FFF;">Remark</td>
	 <!--<td class="t" style="width:50px;color:#FFF;">Allow Logic</td>-->
	 <td class="t" style="width:50px;color:#FFF;">Score</td>
	 <td class="t" style="width:50px;color:#FFF;">Rep Rating</td>
	 <td class="t" style="width:200px;color:#FFF;">Remark</td>
	 <!--<td class="t" style="width:50px;color:#FFF;">Allow Logic</td>-->
	 <td class="t" style="width:50px;color:#FFF;">Score</td>
	</tr>
<form name="TgtForm" method="post" onSubmit="return ValidatCmt(this)">	
<input type="hidden" name="numr" id="numr" value="<?php echo $num; ?>"/>
<input type="hidden" name="fn" id="fn" value="<?php echo $fn; ?>"/>
<input type="hidden" name="fbid" id="fbid" value="<?php echo $_REQUEST['fbid']; ?>"/>
<input type="hidden" name="lgc" id="lgc" value="<?php echo $_REQUEST['lgc']; ?>"/>
<input type="hidden" name="wgt" id="wgt" value="<?php echo $_REQUEST['wgt']; ?>"/>

	<?php for($i=1; $i<=$num; $i++){ ?>
	<tr style="background-color:#FFFFFF;height:24px;">
	 <td class="d" align="center"><?php echo $i; ?></td>
	 <td class="d" align="center">
	  <?php 
	    if($_REQUEST['prd']=='Monthly'){ if($i==1){$t='January'; $ld=date("Y-02-28"); $lm=3; }elseif($i==2){$t='February'; $ld=date("Y-02-28"); $lm=3; }elseif($i==3){$t='March'; $ld=date("Y-03-31"); $lm=3; }elseif($i==4){$t='April';$ld=date("Y-04-30"); $lm=4; }elseif($i==5){$t='May'; $ld=date("Y-05-31"); $lm=5; }elseif($i==6){$t='June'; $ld=date("Y-06-30"); $lm=6; }elseif($i==7){$t='July'; $ld=date("Y-07-31"); $lm=7; }elseif($i==8){$t='August'; $ld=date("Y-08-31"); $lm=8; }elseif($i==9){$t='September'; $ld=date("Y-09-30"); $lm=9; }elseif($i==10){$t='October'; $ld=date("Y-10-31"); $lm=10; }elseif($i==11){$t='November'; $ld=date("Y-11-30"); $lm=11; }elseif($i==12){$t='December'; $ld=date("Y-12-31"); $lm=12; } }	
        elseif($_REQUEST['prd']=='Quarter'){ if($i==1){$t='Quarter 1'; $ld=date("Y-03-31"); $lm=3; }elseif($i==2){$t='Quarter 2'; $ld=date("Y-06-30"); $lm=4; }elseif($i==3){$t='Quarter 3'; $ld=date("Y-09-30"); $lm=7; }elseif($i==4){$t='Quarter 4'; $ld=date("Y-12-31"); $lm=10; } }
        elseif($_REQUEST['prd']=='1/2 Annual'){ if($i==1){$t='Half Year 1'; $ld=date("Y-06-30"); $lm=3; }elseif($i==2){$t='Half Year 2'; $ld=date("Y-12-31"); $lm=7; } }
		
		echo $t; ?><input type="hidden" name="tit<?php echo $i; ?>" value="<?php echo $t; ?>"/>
		<input type="hidden" name="tgt<?php echo $i; ?>" value="<?php echo $tgt; ?>"/>
		<input type="hidden" name="nn<?php echo $i; ?>" value="<?php echo $i; ?>"/>
	 </td>

<?php $sql=mysql_query("select * from hrm_pms_formb_tgtdefin where ".$fn."=".$_REQUEST['fbid']." AND EmployeeID=".$_REQUEST['e']." AND YearId=".$_REQUEST['yid']." AND Tital='".$t."' AND NtgtN='".$i."'",$con); $row=mysql_num_rows($sql); $res=mysql_fetch_assoc($sql); ?>
	 
	 <td class="d" align="center"><?php if($res['Wgt']!=''){echo floatval($res['Wgt']);}else{echo floatval($wgt);} ?></td>
	 <td class="d" align="center"><?php if($res['Tgt']!=''){echo 100;}//else{echo floatval($tgt);} ?>
	 <input type="hidden" id="wgt<?php echo $i; ?>" name="wgt<?php echo $i; ?>" value="<?php if($res['Wgt']!=''){echo floatval($res['Wgt']);}else{echo floatval($wgt);} ?>"/>
	 <input type="hidden" id="tgt<?php echo $i; ?>" name="tgt<?php echo $i; ?>" value="<?php if($res['Tgt']!=''){echo floatval($res['Tgt']);}else{echo floatval($tgt);} ?>"/>
	 <input type="hidden" id="NtgtN<?php echo $i; ?>" name="NtgtN<?php echo $i; ?>" value="<?php echo $i; ?>"/>
	 </td>  

	 <td class="d" id="TDD<?php echo $i; ?>" valign="top"><?php if($res['Remark']!=''){echo $res['Remark'];}else{echo $resk['KRA'];}?>	 
	 <input type="hidden" name="ld<?php echo $i; ?>" value="<?php if($row>0 AND $res['Ldate']!='0000-00-00' AND $res['Ldate']!='1970-01-01'){ echo $res['Ldate']; }else{ echo $ld; } ?>"/>
	 </td>
	 
	 <td class="d" align="center"><?php if($res['Cmnt']!='' || $res['Ach']>0){ echo floatval($res['Ach']); }else{echo '';} ?></td>
	 <td class="d" valign="top"><?php echo $res['Cmnt']; ?></td>
	 
	 <?php /*?><td class="d" align="center"><?php if($res['LogScr']!=''){ echo $res['LogScr'];}else{echo 0;} ?></td><?php */?>
	 
	 <td class="d" align="center"><?php if($res['Cmnt']!='' || $res['Ach']>0){ echo $res['Scor'];}else{echo '';} ?></td>
	 <td class="d" align="center"><?php if($res['AppCmnt']!='' || $res['AppAch']>0){ echo floatval($res['AppAch']); }else{echo '';} ?></td>
	 <td class="d" valign="top"><?php echo $res['AppCmnt']; ?></td>
	 
	 <?php /*?><td class="d" align="center"><?php if($res['AppLogScr']!=''){ echo $res['AppLogScr'];}else{echo 0;} ?></td><?php */?>
	 
	 <td class="d" align="center"><?php if($res['AppCmnt']!='' || $res['AppAch']>0){ echo $res['AppScor'];}else{echo '';} ?></td>
	 <td class="d" bgcolor="#D5FFAA" id="TD1<?php echo $i; ?>" valign="top"><textarea type="text" name="Cmnt<?php echo $i; ?>" id="Cmnt<?php echo $i; ?>" class="d" rows="2" style="width:200px;border:hidden;background-color:#D5FFAA;"><?php echo $res['RevCmnt']; ?></textarea></td> 
	 
	 <td align="center">
	 <?php $Nxt21Day=date("Y-m-d",strtotime('+21 day', strtotime($res['Ldate']))); ?>
	 <?php if($res['Tital']!='' AND $res['Tgt']!=''){ ?>
	  <span style="cursor:pointer"><img src="images/edit.png" border="0" id="edit_<?php echo $i; ?>" style="display:<?php if(($res['Revlockk']==0 AND date("Y-m-d")<=$Nxt21Day) OR ($res['Revlockk']==0 AND $rpms['UnLckKRA']==1)){echo 'block';}else{echo 'none';} ?>" onClick="FunEdit(<?php echo $i; ?>)"/></span>
	  <span style="cursor:pointer"><img src="images/Floppy-Small-icon.png" border="0" id="save_<?php echo $i; ?>" style="display:none;" onClick="FunSave(<?php echo $i.','.$res['TgtFbDefId']; ?>)"/></span>
	 <?php } ?> 
	 </td>
	 <td align="center">
	  <img src="images/ok.png" border="0" id="ok_<?php echo $i; ?>" style="display:<?php if($res['RevCmnt']!=='' AND $res['Revlockk']==1){echo 'block';}else{echo 'none';} ?>;"/>
	  <span style="cursor:pointer"><img src="images/sub.png" border="0" id="lockk_<?php echo $i; ?>" style="display:<?php if($res['RevCmnt']!=='' AND $res['Revlockk']==0  AND date("Y-m-d")<=$Nxt21Day){echo 'block';}else{echo 'none';} ?>;" onClick="FunLk(<?php echo $i.','.$res['TgtFbDefId']; ?>)"/></span>
	 </td>
	 
	</tr>
    <?php } ?>
	<tr style="height:24px;">
	 <td class="d" colspan="2" align="right" bgcolor="#FFFFFF"><b>Total:&nbsp;</b></td>
	 <td class="d" align="center" bgcolor="#FFFFFF"><b><?php echo $_REQUEST['wgt']; ?></b></td>
	 <td class="d" align="center" bgcolor="#FFFFFF"><b><?php //echo $_REQUEST['tgt']; ?></b></td>
	 <td class="d" align="" bgcolor="#FFFFFF"></td>

<?php $sqlt=mysql_query("select SUM(Ach) as tAch, SUM(LogScr) as tLogScr, SUM(Scor) as tScor, SUM(AppAch) as tAppAch, SUM(AppLogScr) as tAppLogScr, SUM(AppScor) as tAppScor from hrm_pms_formb_tgtdefin where ".$fn."=".$_REQUEST['fbid']." AND EmployeeID=".$_REQUEST['e']." AND YearId=".$_REQUEST['yid'],$con); $rest=mysql_fetch_assoc($sqlt); ?>	 
	 	 
	 <td class="d" align="center" bgcolor="#FFFFFF"><b><?php //if($rest['tAch']>0){echo floatval($rest['tAch']);} ?></b></td>
	 <td class="d" align="" bgcolor="#FFFFFF"></td>	 
	 
<?php /*?><td class="d" align="center" bgcolor="#FFFFFF"><b><?php if($rest['tLogScr']>0){echo floatval($rest['tLogScr']);}?></b></td>	<?php */?> 	

<td class="d" align="center" bgcolor="#FFFFFF"><b><?php //if($rest['tScor']>0){echo floatval($rest['tScor']);} ?></b></td>

	 <td class="d" align="center" bgcolor="#FFFFFF"><b><?php //if($rest['tAppAch']>0){echo floatval($rest['tAppAch']);} ?></b></td>
	 <td class="d" align="" bgcolor="#FFFFFF"></td>	
	  
	 <?php /*?><td class="d" align="center" bgcolor="#FFFFFF"><b><?php if($rest['tAppLogScr']>0){echo floatval($rest['tAppLogScr']);} ?></b></td><?php */?>
	 	 	 
	  <td class="d" align="center" bgcolor="#FFFFFF"><b><?php //if($rest['tAppScor']>0){echo floatval($rest['tAppScor']);} ?></b></td>
	 <td colspan="3" class="d" align="right" bgcolor="#FFFFFF">&nbsp;</td>
	</tr>
	<tr>
	 <td colspan="16" style="color:#FFFFFF;" align="right">
	 <input type="hidden" name="TotRow" value="<?php echo $num; ?>" />
	 <input type="hidden" name="Idd" value="<?php echo $_REQUEST['fbid']; ?>" />
	 &nbsp;&nbsp;&nbsp;<img src="images/edit.png" border="0"/>&nbsp;:Edit
	 &nbsp;&nbsp;&nbsp;<img src="images/Floppy-Small-icon.png" border="0"/>&nbsp;:Save
	 &nbsp;&nbsp;&nbsp;<img src="images/sub.png" border="0"/>&nbsp;:Submit
	 &nbsp;&nbsp;&nbsp;<img src="images/ok.png" border="0"/>&nbsp;:Submitted
	 &nbsp;&nbsp;&nbsp;<img src="images/lock.png" border="0"/>&nbsp;:Locked
	 
	 </td>
	</tr>
</form>	
   </table>
  </td>
 </tr>
 <tr><td style="height:20px;">&nbsp;</td></tr>

</table>
</center>
</body>
</html>
