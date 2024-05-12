<?php session_start();
if($_SESSION['login'] = true){require_once('../AdminUser/config/config.php');}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('../AdminUser/logcheck.php');
if($_SESSION['logCheckEmp']!=$logemp){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('EmpMenuSession.php');}
?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>

<style>.fontH {font-family:Times New Roman;font-size:16px;}.font {font-family:Times New Roman;font-size:13px;}
.calendar { color:black;margin-left:0px;;width:100%;border:1px solid #CDCDCD; }
.weekday { text-align:center;width:14%;height:30px;border:1px solid #CCCCCC;font-style:oblique;font-family:Times New Roman; font-weight:bold; background-color:#FFFF9F; color:#000000; }
.day { border:1px solid #CCCCCC;width:14%;height:80px;vertical-align:top;font-style:oblique;font-family:Times New Roman; font-size:18px;} 
.leave { text-align:center;width:100%;height:30px;font-style:oblique;font-family:Times New Roman; font-weight:bold; background-color:#FFFF9F; color:#000000; }
.thead { width:25%;vertical-align:top;font-style:oblique;font-family:Times New Roman; font-size:18px; text-align:center;background-color:#FFFF9F; color:#000000;} 
.tbody { width:25%;vertical-align:middle;font-style:oblique;font-family:Times New Roman; font-size:16px; text-align:center;background-color:#FFFFFF; color:#000000; height:22px;} 
.Ld { color:black;margin-left:0px;;width:60%;border:1px solid #CDCDCD; }
.ttbody { width:25%;vertical-align:middle;font-family:Times New Roman;font-size:16px;text-align:center;color:#000000; height:22px;font-weight:bold;} 
.tt2body { width:75%;vertical-align:middle;font-family:Times New Roman;font-size:16px;color:#000000;height:22px; font-weight:bold;}
.tt2b { vertical-align:middle;font-family:Times New Roman;font-size:16px;color:#000000;height:22px; font-weight:bold;}
</style>
<script type="text/javascript" language="javascript">
function AttHelpDoc()
{ window.open("AttHelpDoc.php?action=help","HelpDoc","menubar=no,scrollbars=yes,resizable=no,directories=no,width=720,height=600");}

function SelMonth(v){ var x = "MytAttt.php?rr=123&rtr=34&est=rrtru&mmm=10&and=%false%&echo=val&est=rrtru&mmm=10&m2m=12&w=133&d=201&m="+v+"&ee=rtt&w=133&d=201&vt=t@t";  window.location=x;}

function AttReq(Id,In,Out)
{ if(In==1 && Out==1){var hgt=500;}else{var hgt=350;}
  window.open("AttReqForLate.php?id="+Id,"Attform","menubar=no,scrollbars=yes,resizable=no,directories=no,width=600,height="+hgt+""); } 

</script>
</head>
<body class="body">
<table class="table">
<tr>
 <td>
  <table class="menutable"><tr><td><?php if($_SESSION['login'] = true){ require_once("EMenu.php"); } ?></td></tr></table>
 </td>
</tr>
<tr>
 <td>
  <table width="100%" style="margin-top:0px; ">
    <tr>
	  <td valign="top"><?php if($_SESSION['login'] = true){ require_once("EWelcome.php"); } ?></td>
	</tr>
	 <tr>
	  <td valign="top">
	     <table border="0" style="width:100%; height:380px; float:none;" cellpadding="0">
		  <tr>
		   <td valign="top"> 
		   
<?php //*************************************************************** ?>	   
		     <table border="0" id="Activity">
			  <tr>
			     <td id="Anni" valign="top">
				    <table border="0">
						  <tr height="20">
						    <td align="left" valign="top" width="150">
<?php include("EmpImgEmp.php"); ?>
<?php //echo "<img width=105px height=125px src=\"show_images.php?id=".$EmployeeId."\">\n";?></td>
						  </tr>
					 </table>
				 </td>
<?php if($_REQUEST['m']==1){$SelM='January';} if($_REQUEST['m']==2){$SelM='February';} if($_REQUEST['m']==3){$SelM='March';}if($_REQUEST['m']==4){$SelM='April';} if($_REQUEST['m']==5){$SelM='May';} if($_REQUEST['m']==6){$SelM='June';} if($_REQUEST['m']==7){$SelM='July';} if($_REQUEST['m']==8){$SelM='August';} 
if($_REQUEST['m']==9){$SelM='September';} if($_REQUEST['m']==10){$SelM='October';} if($_REQUEST['m']==11){$SelM='November';} if($_REQUEST['m']==12){$SelM='December';} 

$mn=date("m"); $m=date("F",strtotime(date("Y-m-d"))); 
if((date("m")==01 OR date("m")==03 OR date("m")==05 OR date("m")==07 OR date("m")==08 OR date("m")==10) AND date("d")==31){$Lmn=date("m")-1;}
elseif(date("m")==12 AND date("d")==31){$Lmn=11;}
else{ $Lmn=date('m',strtotime("-1 months",strtotime(date("Y-m-d")))); } 
$Lm=date('F',strtotime("-1 months",strtotime(date("Y-m-d")))); 
?>				 
<?php /****************************** Start *************************************/ ?>				 
<td align="left" width="100%" valign="top">
 <table border="0" width="100%">
   <tr style="height:29px;">
	<td>
    <table width="100%" border="0">
    <tr>
     <td align=""><font color="#006200" class="fontH"><b><i>My Attendance</i></b></font>&nbsp;&nbsp;&nbsp;&nbsp;<select style="font-family:Times New Roman; font-size:14px; width:110px;" onChange="SelMonth(this.value)"><option value="" selected>Select Month</option><option value="<?php echo date("m"); ?>"><?php echo ucfirst($m); ?></option><option value="<?php echo $Lmn; ?>"><?php echo 'Last Month';//ucfirst($Lm); ?></option></select>&nbsp;&nbsp;<font color="#000000" class="fontH"><b>Month:&nbsp;<i><?php echo $SelM; ?></i></b></font>&nbsp;&nbsp;&nbsp;&nbsp;<font color="#000000" class="fontH"><b>[24 hour format]</b></font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" onClick="AttHelpDoc()"><font class="fontH" color="#000099" size="3" ><b>Help Document</b></font></font></a></td>
	</tr>
	</table>
	</td> 
   </tr>	
<?php /*********************** Open ***********************/ ?> 		  	 
   <tr style="height:29px;">
	<td>
    <table width="100%" border="0">
    <tr>
     <td style="width:72%;">
<?php $m=$_REQUEST['m']; if(date("m")==1 AND $m==12){$y=date("Y")-1;}else{$y=date("Y");} 
$mkdate = mktime(0,0,0, $m, 1, $y); $FDay = date('w',$mkdate); $pwkDay = date('w',$mkdate);
$days = date('t',$mkdate); $sieve = $_REQUEST['y'].$_REQUEST['m'].'01'; $day = '1';  $showBtn=1; ?>	
 
<?php /******* Calander Open *******/ ?>
<table class="calendar" cellpadding="2" cellspacing="0" border="0">
 <tr>
  <td class="weekday">Sunday</td><td class="weekday">Monday</td><td class="weekday">Tuesday</td>
  <td class="weekday">Wednesday</td><td class="weekday">Thursday</td><td class="weekday">Friday</td>
  <td class="weekday">Saturday</td>
 </tr>
 <tr>
<?php $weeks = '1'; $loopCount ='1'; while($loopCount<=$FDay){ ?>
	  <td class="day"><img src="images/something.gif" alt="0"/></td>
<?php $loopCount++; } $FDay++; ?>
	  
<?php while($day<=$days)
      { //While-Open
	  $sE=mysql_query("SELECT * FROM hrm_employee_attendance WHERE EmployeeID=".$EmployeeId." AND AttDate='".date($y."-".$m."-".$day)."'", $con); $rowE=mysql_num_rows($sE); $rE=mysql_fetch_array($sE); ?>
	  
      <td class="day" bgcolor="<?php 
	  if(date("w",strtotime(date($y."-".$m."-".$day)))==0){echo '#428400';} 
	  elseif($rE['AttValue']=='P' OR $rE['AttValue']=='HF'){echo '#FFFFFF';}
	  elseif($rE['AttValue']=='CL' OR $rE['AttValue']=='SL' OR $rE['AttValue']=='PL' OR $rE['AttValue']=='EL' OR $rE['AttValue']=='ML' OR $rE['AttValue']=='CH' OR $rE['AttValue']=='SH' OR $rE['AttValue']=='PH' OR $rE['AttValue']=='FL' OR $rE['AttValue']=='TL'){echo '#64B1FF';}
	  elseif($rE['AttValue']=='OD'){echo '#FF80FF';}
	  elseif($rE['AttValue']=='HO'){echo '#ADFF5B';}
	  elseif($rE['AttValue']=='A'){echo '#FF7171';}
	  ?>" >
	  
<?php /*** Disply Records Open *****/?>				
<?php $lday=sprintf('%02d',$day); 
      
	  if($showBtn==1 AND ($rE['InnLate']==1 OR $rE['OuttLate']==1)){ ?><a style="float:right;" href="#" onClick="AttReq(<?php echo $rE['AttId'].','.$rE['InnLate'].','.$rE['OuttLate']; ?>)"><img src="images/control.png" style="width:12px;height:12px;" style="margin-right:3px;"/></a><?php } ?>
	  
	  <?php if($day>0){echo $day;}else{echo '';}?>
	  <font style="margin-left:<?php $l1=strlen($day); $l2=strlen($rE['AttValue']); if($l1==1 AND $l2==1){echo '45';}elseif($l1==1 AND $l2==2){echo '40';}elseif($l1==2 AND $l2==1){echo '40';}else{echo '30';}?>px;font-style:normal;font-size:18px;font-weight:bold;"><?php echo $rE['AttValue']; ?></font><br>
	  <table style="font-size:15px;width:100%;" border="0" cellpadding="0" cellspacing="0">
	   <tr>
		<td colspan="2"></td>
		<td style="width:35%; font-size:11px;" align="center"><?php if($rowE>0 AND ($rE['InnLate']==1 OR $rE['OuttLate']==1)){echo '<u>Count</u>';} else {echo '&nbsp;';}?></td>
	  </tr>
	   <tr>
	    <td style="width:30%;"><?php if($rowE>0){echo 'In';}?></td>
		<td style="width:35%;color:<?php if($rE['InnLate']==1 AND $rE['InnCnt']=='Y'){echo '#FF1C1C';} ?>;"><?php if($rowE>0){ if($rE['Inn']=='00:00:00' OR $rE['Inn']==''){echo '00:00';}else{echo date("H:i",strtotime($rE['Inn']));} }?></td>
		<td align="center"><?php if($rowE>0 AND $rE['InnLate']==1){ if($rE['InnCnt']=='Y'){echo 'Yes';}else{echo 'No';} }?></td>
	  </tr>
	   <tr>
	    <td><?php if($rowE>0){echo 'Out';}?></td> 
		<td style="color:<?php if($rE['OuttLate']==1 AND $rE['OuttCnt']=='Y'){echo '#FF1C1C';} ?>;"><?php if($rowE>0){ if($rE['Outt']=='00:00:00' OR $rE['Outt']==''){echo '00:00';}else{echo date("H:i",strtotime($rE['Outt']));} }?></td>
		<td align="center"><?php if($rowE>0 AND $rE['OuttLate']==1){ if($rE['OuttCnt']=='Y'){echo 'Yes';}else{echo 'No';} }?></td>
	   </tr>
	  </table>
<?php /** Disply Records Close *****/ ?>
		
	    </td> 
<?php if($FDay == '7'){echo '</tr><tr>'; $FDay='0'; $weeks++;} $day++; $sieve++; $FDay++; 
      } //While-Close ?>
	  
<?php $dim=$weeks*7; $lastdays=$dim-($days+$pwkDay); $lc=1; while($lc<=$lastdays){ ?>
        <td class="day"><img src="images/something.gif" alt="0"/></td><?php $lc++; } ?>
 
 </tr>
</table>
<?php /******* Calander Close *******/ ?>

	 </td>
	 <td valign="top" style="width:28%;">
	  <table style="width:100%;" valign="top">
	   <tr>
	    <td style="width:100%;" valign="top">
<?php /**/ ?>
<table class="calendar" cellpadding="0" cellspacing="1">
 <tr><td colspan="4" class="Leave">My Leave Table</td></tr>
<?php $sqll=mysql_query("select * from hrm_employee_monthlyleave_balance where EmployeeID=".$EmployeeId." AND Month=".$m." AND Year=".$y, $con); $rl=mysql_fetch_assoc($sqll); ?> 
 <tr>
  <td class="thead">Leave</td>
  <td class="thead">Opening</td>
  <td class="thead">Availed</td>
  <td class="thead">Closing</td>
 </tr>
 <tr>
  <td class="tbody">CL</td>
  <td class="tbody"><?php echo floatval($rl['OpeningCL']+$rl['CreditedCL']); ?></td>
  <td class="tbody"><?php echo floatval($rl['AvailedCL']); ?></td>
  <td class="tbody"><?php echo floatval($rl['BalanceCL']); ?></td>
 </tr>
 <tr>
  <td class="tbody">SL</td>
  <td class="tbody"><?php echo floatval($rl['OpeningSL']+$rl['CreditedSL']); ?></td>
  <td class="tbody"><?php echo floatval($rl['AvailedSL']); ?></td>
  <td class="tbody"><?php echo floatval($rl['BalanceSL']); ?></td>
 </tr>
 <tr>
  <td class="tbody">PL</td>
  <td class="tbody"><?php echo floatval($rl['OpeningPL']+$rl['CreditedPL']); ?></td>
  <td class="tbody"><?php echo floatval($rl['AvailedPL']); ?></td>
  <td class="tbody"><?php echo floatval($rl['BalancePL']); ?></td>
 </tr>
 <tr>
  <td class="tbody">EL</td>
  <td class="tbody"><?php echo floatval($rl['OpeningEL']+$rl['CreditedEL']); ?></td>
  <td class="tbody"><?php echo floatval($rl['AvailedEL']); ?></td>
  <td class="tbody"><?php echo floatval($rl['BalanceEL']); ?></td>
 </tr>
 <tr>
  <td class="tbody">FL</td>
  <td class="tbody"><?php echo floatval($rl['OpeningOL']+$rl['CreditedOL']); ?></td>
  <td class="tbody"><?php echo floatval($rl['AvailedOL']); ?></td>
  <td class="tbody"><?php echo floatval($rl['BalanceOL']); ?></td>
 </tr>
</table>	
<?php /**/ ?>	
		</td>
	   </tr>
	   <tr><td style="height:5px;"></td></tr>
	   
<?php $NoD=$days;
$SqlFull=mysql_query("select count(AttValue)as FullDayLeave from hrm_employee_attendance where (AttValue='CL' OR AttValue='SL' OR AttValue='PL' OR AttValue='EL' OR AttValue='FL' OR AttValue='TL' OR AttValue='ML') AND EmployeeID=".$EmployeeId." AND (AttDate between '".date($y."-".$m."-1")."' AND '".date($y."-".$m."-".$NoD)."')", $con); $SqlHalf=mysql_query("select count(AttValue)as HalfDayLeave from hrm_employee_attendance where (AttValue='CH' OR AttValue='SH' OR AttValue='PH') AND EmployeeID=".$EmployeeId." AND (AttDate between '".date($y."-".$m."-1")."' AND '".date($y."-".$m."-".$NoD)."')", $con); $SqlHf=mysql_query("select count(AttValue)as Hf from hrm_employee_attendance where AttValue='HF' AND EmployeeID=".$EmployeeId." AND (AttDate between '".date($y."-".$m."-1")."' AND '".date($y."-".$m."-".$NoD)."')", $con); $SqlPresent=mysql_query("select count(AttValue)as Present from hrm_employee_attendance where AttValue='P' AND EmployeeID=".$EmployeeId." AND (AttDate between '".date($y."-".$m."-1")."' AND '".date($y."-".$m."-".$NoD)."')", $con); $SqlAbsent=mysql_query("select count(AttValue)as Absent from hrm_employee_attendance where AttValue='A' AND EmployeeID=".$EmployeeId." AND (AttDate between '".date($y."-".$m."-1")."' AND '".date($y."-".$m."-".$NoD)."')", $con); $SqlOnDuties=mysql_query("select count(AttValue)as OnDuties from hrm_employee_attendance where AttValue='OD' AND EmployeeID=".$EmployeeId." AND (AttDate between '".date($y."-".$m."-1")."' AND '".date($y."-".$m."-".$NoD)."')", $con); $SqlHoliday=mysql_query("select count(AttValue)as Holiday from hrm_employee_attendance where AttValue='HO' AND EmployeeID=".$EmployeeId." AND (AttDate between '".date($y."-".$m."-1")."' AND '".date($y."-".$m."-".$NoD)."')", $con); 

$ResFull=mysql_fetch_array($SqlFull); $ResHalf=mysql_fetch_array($SqlHalf); $ResHf=mysql_fetch_array($SqlHf); $ResPresent=mysql_fetch_array($SqlPresent); $ResAbsent=mysql_fetch_array($SqlAbsent); 
$ResOnDuties=mysql_fetch_array($SqlOnDuties); $ResHoliday=mysql_fetch_array($SqlHoliday); 
$CountHf=$ResHf['Hf']/2;  $TotalAbsent=$ResAbsent['Absent']+$CountHf;  $TotalLeaveFull=$ResFull['FullDayLeave'];
$TotalLeaveHalf=$ResHalf['HalfDayLeave']/2;  $TotalPR=$ResPresent['Present']+$CountHf+$TotalLeaveHalf; 
$TotalLeaveCount=$TotalLeaveFull+$TotalLeaveHalf; $TotalOnDuties=$ResOnDuties['OnDuties'];
$TotalHoliday=$ResHoliday['Holiday']; $TotalPaidDay=$TotalPR+$TotalLeaveCount+$TotalOnDuties+$TotalHoliday;
?>  	   
	   
	   <tr>
       <td>
<table class="Ld" cellpadding="0" cellspacing="1">
 <tr><td colspan="4" class="Leave">Details</td></tr>
 <tr bgcolor="#64B1FF"><td class="ttbody"><?php echo $TotalLeaveCount; ?></td>
 <td class="tt2body">&nbsp;&nbsp;Leave</td></tr>
 <tr bgcolor="#ADFF5B"><td class="ttbody"><?php echo $TotalHoliday; ?></td>
 <td class="tt2body">&nbsp;&nbsp;Holiday</td></tr>
 <tr bgcolor="#FF80FF"><td class="ttbody"><?php echo $TotalOnDuties; ?></td>
 <td class="tt2body">&nbsp;&nbsp;Outdoor Duties</td></tr>
 <tr bgcolor="#FFFFFF"><td class="ttbody"><?php echo $TotalPR; ?></td>
 <td class="tt2body">&nbsp;&nbsp;Present</td></tr>
 <tr bgcolor="#FF7171"><td class="ttbody"><?php echo $TotalAbsent; ?></td>
 <td class="tt2body">&nbsp;&nbsp;Absent</td></tr>	 </table>
	 </td>
	</tr>	
	<tr><td style="height:5px;"></td></tr>
	
		
	</table>
	</td> 
   </tr>	
	
   <tr>
    <td valign="bottom" colspan="2">
    <table border="0" style='font-family:Times New Roman; font-size:15px; font-weight:bold;'>
     <tr>
	 <td width="10" align="">P</td><td>:</td><td class="cell" style="color:#0052A4;">Present,</td>
	 <td width="10">&nbsp;</td>
	 <td width="10" align="">A</td><td>:</td><td class="cell" style="color:#0052A4;">Absent,</td>
	 <td width="10">&nbsp;</td>
	 <td width="10" align="">CH</td><td>:</td><td class="cell" style="color:#0052A4;">Half day CL,</td>
	 <td width="10">&nbsp;</td>
	 <td width="10" align="">SH</td><td>:</td><td class="cell" style="color:#0052A4;">Half day SL,</td>
	 <td width="10">&nbsp;</td>
	 <td width="10" align="">PH</td><td>:</td><td class="cell" style="color:#0052A4;">Half day PL,</td>
	 <td width="10">&nbsp;</td>
	 </tr>
	 <tr>
	 <td width="10" align="">HO</td><td>:</td><td class="cell" style="color:#0052A4;">Holiday,</td>
	 <td width="10">&nbsp;</td>
	 <td width="10" align="">OD</td><td>:</td><td class="cell" style="color:#0052A4;">Outdoor Duties,</td>
	 <td width="10">&nbsp;</td>
	 <td width="10" align="">FL</td><td>:</td><td class="cell" style="color:#0052A4;">Festival Leave,</td>
	 <td width="10">&nbsp;</td>
	 <td width="10" align="">TL</td><td>:</td><td class="cell" style="color:#0052A4;">Transfer Leave</td>
	 <td width="10">&nbsp;</td>  
	 </tr>
	</table>
	</td>
   </tr>
<?php /**************** Close ******************************/ ?>					 
   
   </table>
  </td>
 </tr>
</table>	
<?php //********************************************************************************* ?>
		   </td>
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

