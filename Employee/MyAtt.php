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
<link rel="stylesheet" type="text/css" href="src/css/jscal2.css"/>
<link rel="stylesheet" type="text/css" href="src/css/border-radius.css"/>
<link rel="stylesheet" type="text/css" href="src/css/steel/steel.css"/>
<script type="text/javascript" src="src/js/jscal2.js"></script>
<script type="text/javascript" src="src/js/lang/en.js"></script>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>

<style>.font { color:#ffffff; font-family:Times New Roman; font-size:13px; width:200px;} .font1 { font-family:Times New Roman; font-size:13px; height:14px; } 
.font2 { font-size:13px;width:260px;height:18px;}.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;} .TableHead { font-family:Times New Roman; color:#FFFFFF; font-size:15px; }
.TableHead1 { font-family:Times New Roman; color:#000000; background-color:#FFFFFF; font-size:13px; overflow:hidden; } .InputText {font-family:Times New Roman; font-size:12px; width:100px; height:19px; }
.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}</style>
<Script type="text/javascript">window.history.forward(1);</Script>
<script type="text/javascript" language="javascript">
function AttHelpDoc()
{ window.open("AttHelpDoc.php?action=help","HelpDoc","menubar=no,scrollbars=yes,resizable=no,directories=no,width=720,height=600");}

function SelMonth(v){ var x = "MyAtt.php?rr=123&rtr=34&est=rrtru&mmm=10&and=%false%&echo=val&est=rrtru&mmm=10&m2m=12&w=133&d=201&m="+v+"&ee=rtt&w=133&d=201&vt=t@t";  window.location=x;}

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
	<tr><td>&nbsp;</td></tr>
	 <tr>
	  <td valign="top">
	     <table border="0" style="width:100%; height:380px; float:none;" cellpadding="0">
		  <tr>
		   <td valign="top"> 
		   
<?php //*************************************************************************************************************************************************** ?>	   
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
				 
<?php /************************************************************** Start *************************************/ ?>				 
				  <td align="left" width="1000" valign="top">
	     <table border="0" width="1100">
		 <tr style="height:29px;">
		  <td align=""><font color="#006200" style='font-family:Times New Roman;' size="4"><b><i>My Attendance</i></b></font>
		  &nbsp;&nbsp;&nbsp;&nbsp;<font color="#000000" style='font-family:Times New Roman;' size="3">
		  <b>Month :&nbsp;</font>
<?php if($_REQUEST['m']==1){$SelM='January';} if($_REQUEST['m']==2){$SelM='February';} if($_REQUEST['m']==3){$SelM='March';}if($_REQUEST['m']==4){$SelM='April';} 
if($_REQUEST['m']==5){$SelM='May';} if($_REQUEST['m']==6){$SelM='June';} if($_REQUEST['m']==7){$SelM='July';} if($_REQUEST['m']==8){$SelM='August';} 
if($_REQUEST['m']==9){$SelM='September';} if($_REQUEST['m']==10){$SelM='October';} if($_REQUEST['m']==11){$SelM='November';} if($_REQUEST['m']==12){$SelM='December';} ?>			
<select style="font-family:Times New Roman; font-size:14px; width:90px;" onChange="SelMonth(this.value)">
<option value="" selected>Select</option>
<?php if(date("m")==1) { ?><option value="1">January</option><option value="12">Last Month</option><?php } ?>
<?php if(date("m")==2) { ?><option value="2">February</option><option value="1">Last Month</option><?php } ?>			
<?php if(date("m")==3) { ?><option value="3">March</option><option value="2">Last Month</option><?php } ?>	
<?php if(date("m")==4) { ?><option value="4">April</option><option value="3">Last Month</option><?php } ?>					
<?php if(date("m")==5) { ?><option value="5">May</option><option value="4">Last Month</option><?php } ?>	
<?php if(date("m")==6) { ?><option value="6">June</option><option value="5">Last Month</option><?php } ?>	
<?php if(date("m")==7) { ?><option value="7">July</option><option value="6">Last Month</option><?php } ?>	
<?php if(date("m")==8) { ?><option value="8">August</option><option value="7">Last Month</option><?php } ?>	
<?php if(date("m")==9) { ?><option value="9">September</option><option value="8">Last Month</option><?php } ?>	
<?php if(date("m")==10) { ?><option value="10">October</option><option value="9">Last Month</option><?php } ?>	
<?php if(date("m")==11) { ?><option value="11">November</option><option value="10">Last Month</option><?php } ?>	
<?php if(date("m")==12) { ?><option value="12">December</option><option value="11">Last Month</option><?php } ?>	
</select>
		  </td>
		 </tr>
		 
<?php $cm=date("m"); if($cm==1){$pm=12;}else{$pm=date("m")-1;} //echo  $cm.'-'.$pm; 

if($_REQUEST['m']==$cm OR $_REQUEST['m']==$pm){ ?> 		 
		 
		 <tr><td align="center"><font color="#006200" style='font-family:Times New Roman;' size="4"><b><?php echo $SelM; ?></b></font></tr>
		 <tr>
<?php //******************************************************** Open ***********************************************************************// ?> 		  	 
<td valign="top">
<?php 
if(date("m")==1 AND $_REQUEST['m']==12){$Y=date("Y")-1;}else{$Y=date("Y");}
if($_REQUEST['m']==1){ $day=31;} 
elseif($_REQUEST['m']==2){ if(date("Y")==2012 OR date("Y")==2016 OR date("Y")==2020 OR date("Y")==2024 OR date("Y")==2028 OR date("Y")==2032 OR date("Y")==2036 OR date("Y")==2040){$day=29;}                      else { $day=28;}}
elseif($_REQUEST['m']==3){ $day=31;} elseif($_REQUEST['m']==4){ $day=30;} elseif($_REQUEST['m']==5){ $day=31;} elseif($_REQUEST['m']==6){ $day=30;} 
elseif($_REQUEST['m']==7){ $day=31;} elseif($_REQUEST['m']==8){ $day=31;} elseif($_REQUEST['m']==9){ $day=30;} elseif($_REQUEST['m']==10){ $day=31;} 
elseif($_REQUEST['m']==11){ $day=30;} elseif($_REQUEST['m']==12){ $day=31;}

$m=$_REQUEST['m']; 
?> 
<table border="1" style="width:420px; height:250px; font-family:Times New Roman; background-color:#D7CCE3; color:#400040;"> 
 <tr style="height:25px; background-color:#7a6189; font-family:Times New Roman; font-weight:bold;" >
   <td align="center" style="color:#FFFFFF;width:60px;">Sun</td><td align="center" style="color:#FFFFFF;width:60px;">Mon</td>
   <td align="center" style="color:#FFFFFF;width:60px;">Tue</td><td align="center" style="color:#FFFFFF;width:60px;">Wed</td>
   <td align="center" style="color:#FFFFFF;width:60px;">Thu</td><td align="center" style="color:#FFFFFF;width:60px;">Fri</td>
   <td align="center" style="color:#FFFFFF;width:60px;">Sat</td>
 </tr>	
<?php require_once('LeaveCalander.php'); ?> 	 
</table>
</td>
<td valign="bottom">
<table border="0" style='font-family:Times New Roman; font-size:15px; font-weight:bold;'>
<?php 
      if($m==1 OR $m==3 OR $m==5 OR $m==7 OR $m==8 OR $m==10 OR $m==12){ $NoD=31; } 
elseif($m==4 OR $m==6 OR $m==9 OR $m==11){ $NoD=30; }
elseif($m==2){ if($Y==2012 OR $Y==2016 OR $Y==2020 OR $Y==2024 OR $Y==2028 OR $Y==2032 OR $Y==2036 OR $Y==2040){$NoD=29;}else{$NoD=28;} }

$SqlFull=mysql_query("select count(AttValue)as FullDayLeave from hrm_employee_attendance where (AttValue='CL' OR AttValue='SL' OR AttValue='PL' OR AttValue='EL' OR AttValue='FL' OR AttValue='TL' OR AttValue='ML' OR AttValue='COV') AND EmployeeID=".$EmployeeId." AND (AttDate between '".date($Y."-".$m."-1")."' AND '".date($Y."-".$m."-".$NoD)."')", $con); 
$SqlHalf=mysql_query("select count(AttValue)as HalfDayLeave from hrm_employee_attendance where (AttValue='CH' OR AttValue='SH' OR AttValue='PH') AND EmployeeID=".$EmployeeId." AND (AttDate between '".date($Y."-".$m."-1")."' AND '".date($Y."-".$m."-".$NoD)."')", $con);
$SqlHf=mysql_query("select count(AttDate)as Hf from hrm_employee_attendance where AttValue='HF' AND EmployeeID=".$EmployeeId." AND (AttDate between '".date($Y."-".$m."-1")."' AND '".date($Y."-".$m."-".$NoD)."')", $con);

$SqlAch=mysql_query("select count(AttValue)as ACH from hrm_employee_attendance where AttValue='ACH' AND EmployeeID=".$EmployeeId." AND (AttDate between '".date($Y."-".$m."-1")."' AND '".date($Y."-".$m."-".$NoD)."')", $con);
$SqlAsh=mysql_query("select count(AttValue)as ASH from hrm_employee_attendance where AttValue='ASH' AND EmployeeID=".$EmployeeId." AND (AttDate between '".date($Y."-".$m."-1")."' AND '".date($Y."-".$m."-".$NoD)."')", $con);
$SqlAph=mysql_query("select count(AttValue)as APH from hrm_employee_attendance where AttValue='APH' AND EmployeeID=".$EmployeeId." AND (AttDate between '".date($Y."-".$m."-1")."' AND '".date($Y."-".$m."-".$NoD)."')", $con);

$SqlPresent=mysql_query("select count(AttValue)as Present from hrm_employee_attendance where (AttValue='P' OR AttValue='WFH') AND EmployeeID=".$EmployeeId." AND (AttDate between '".date($Y."-".$m."-1")."' AND '".date($Y."-".$m."-".$NoD)."')", $con);
$SqlAbsent=mysql_query("select count(AttValue)as Absent from hrm_employee_attendance where AttValue='A' AND EmployeeID=".$EmployeeId." AND (AttDate between '".date($Y."-".$m."-1")."' AND '".date($Y."-".$m."-".$NoD)."')", $con);
$SqlOnDuties=mysql_query("select count(AttValue)as OnDuties from hrm_employee_attendance where AttValue='OD' AND EmployeeID=".$EmployeeId." AND (AttDate between '".date($Y."-".$m."-1")."' AND '".date($Y."-".$m."-".$NoD)."')", $con);
$SqlHoliday=mysql_query("select count(AttValue)as Holiday from hrm_employee_attendance where AttValue='HO' AND EmployeeID=".$EmployeeId." AND (AttDate between '".date($Y."-".$m."-1")."' AND '".date($Y."-".$m."-".$NoD)."')", $con); 

$ResFull=mysql_fetch_array($SqlFull); $ResHalf=mysql_fetch_array($SqlHalf); $ResHf=mysql_fetch_array($SqlHf); $ResPresent=mysql_fetch_array($SqlPresent); 
$ResAbsent=mysql_fetch_array($SqlAbsent); $ResOnDuties=mysql_fetch_array($SqlOnDuties); $ResHoliday=mysql_fetch_array($SqlHoliday); 

$ResAch=mysql_fetch_array($SqlAch); $ResAsh=mysql_fetch_array($SqlAsh); $ResAph=mysql_fetch_array($SqlAph);
$CountAch=$ResAch['ACH']/2; $CountAsh=$ResAsh['ASH']/2; $CountAph=$ResAph['APH']/2;
 
  $CountHf=$ResHf['Hf']/2;  
  $TotalAbsent=$ResAbsent['Absent']+$CountHf+$CountAch+$CountAsh+$CountAph;    
  $TotalLeaveFull=$ResFull['FullDayLeave'];
  $TotalLeaveHalf=$ResHalf['HalfDayLeave']/2;  $TotalPR=$ResPresent['Present']+$CountHf+$TotalLeaveHalf; 
  $TotalLeaveCount=$TotalLeaveFull+$TotalLeaveHalf+$CountAch+$CountAsh+$CountAph;  
  $TotalOnDuties=$ResOnDuties['OnDuties'];
  $TotalHoliday=$ResHoliday['Holiday']; $TotalPaidDay=$TotalPR+$TotalLeaveCount+$TotalOnDuties+$TotalHoliday;
  
?> 			
<tr>
 <td colspan="23">
   <table border="0" cellspacing="0" style="width:200px;font-size:15px;font-family:Times New Roman;font-weight:bold;">
	 <tr><td style="width:200px;font-family:Times New Roman;" valign="top">
	 <a href="#" onClick="AttHelpDoc()"><font color="#000099" size="3" ><b>Help Document</b></font></font></a>
	 </td></tr>
   </table>
 </td>
</tr>
<tr style="height:100px;"><td>&nbsp;</td></tr>
<tr>
 <td colspan="23">
   <table border="1" cellspacing="0" style="width:200px;font-size:15px;font-family:Times New Roman;font-weight:bold;">
	 <tr><td colspan="2" align="center" bgcolor="#7a6189" style="color:#FFFFFF;">Details</td></tr>
	 <tr style="background-color:#0079F2;"><td align="center"><?php echo $TotalLeaveCount; ?></td><td>- Leave</td></tr>
	 <tr style="background-color:#ADFF5B;"><td align="center"><?php echo $TotalHoliday; ?></td><td>- Holiday</td></tr>
	 <tr style="background-color:#FF80FF;"><td align="center"><?php echo $TotalOnDuties; ?></td><td>- Outdoor Duties</td></tr>
	 <tr style="background-color:#FFFFFF;"><td align="center"><?php echo $TotalPR; ?></td><td>- Present</td></tr>
	 <tr style="background-color:#FF7171;"><td align="center"><?php echo $TotalAbsent; ?></td><td>- Absent</td></tr>
   </table>
 </td>
</tr>
<tr><td>&nbsp;</td></tr>
<tr>
<td bgcolor="#009100" width="10">&nbsp;</td><td>:</td><td class="cell">Sunday</td><td width="10">&nbsp;</td>
<td bgcolor="#ADFF5B" width="10">&nbsp;</td><td>:</td><td class="cell">Holiday</td><td width="10">&nbsp;</td>
<td bgcolor="#0079F2" width="10">&nbsp;</td><td>:</td><td class="cell">Leave</td><td width="10">&nbsp;</td>
<td bgcolor="#FF7171" width="10">&nbsp;</td><td>:</td><td class="cell">Absent</td><td width="10">&nbsp;</td>
<td bgcolor="#FFFFFF" width="10">&nbsp;</td><td>:</td><td class="cell">Present</td><td width="10">&nbsp;</td>
<td bgcolor="#FF80FF" width="10">&nbsp;</td><td>:</td><td class="cell">Outdoor Duties</td>
</tr>
</table>
</td>	     
<?php //******************************************************** Close ***********************************************************************// ?> 	
<?php $sG=mysql_query("select Gender from hrm_employee_personal where EmployeeID=".$EmployeeId, $con); $rG=mysql_fetch_assoc($sG); ?>	   
		</tr>  
		<tr>
		 <td valign="bottom" colspan="2">
		  <table border="0" style='font-family:Times New Roman; font-size:15px; font-weight:bold;'>
		        <tr>
				   <td width="10" align="">P</td><td>:</td><td class="cell" style="color:#0052A4;">Present,</td><td width="10">&nbsp;</td>
				   <td width="10" align="">A</td><td>:</td><td class="cell" style="color:#0052A4;">Absent,</td><td width="10">&nbsp;</td>
				   <td width="10" align="">CH</td><td>:</td><td class="cell" style="color:#0052A4;">Half day CL,</td><td width="10">&nbsp;</td>
				   <td width="10" align="">SH</td><td>:</td><td class="cell" style="color:#0052A4;">Half day SL,</td><td width="10">&nbsp;</td>
				   <td width="10" align="">PH</td><td>:</td><td class="cell" style="color:#0052A4;">Half day PL,</td><td width="10">&nbsp;</td>
				 </tr>
				  <tr>
				   <td width="10" align="">HO</td><td>:</td><td class="cell" style="color:#0052A4;">Holiday,</td><td width="10">&nbsp;</td>
				   <td width="10" align="">OD</td><td>:</td><td class="cell" style="color:#0052A4;">Outdoor Duties,</td><td width="10">&nbsp;</td>
				   <td width="10" align="">FL</td><td>:</td><td class="cell" style="color:#0052A4;">Festival Leave,</td><td width="10">&nbsp;</td>
				   <td width="10" align="">TL</td><td>:</td><td class="cell" style="color:#0052A4;">Transfer Leave</td><td width="10">&nbsp;</td>
<?php if($rG['Gender']=='F'){ ?><td width="10" align="">ML</td><td>:</td><td class="cell" style="color:#0052A4;">Maternity Leave</td><td width="10">&nbsp;</td><?php } ?>
				 </tr>
			   </table>
			 </td>
		</tr>
       </table> 
		         </td> 
<?php /************************************************************** Close *************************************/ ?>					 
		 </tr>
		 
<?php } ?> 

		 </table>
	           </td>
    </tr>
</table>

			
<?php //*************************************************************************************************************************************************** ?>
		   </td>
		    <td valign="top">
		    <table align="right" border="0" style="margin-top:0px; width:10%; height:380px;">
		    <tr><td align="center" valign="top" width="100">&nbsp;</td></tr>
	        </table>
		   </td>
		    <td valign="top">
		    <table align="right" border="0" style="margin-top:0px; width:10%; height:380px;"><tr><td align="center" valign="top">&nbsp;&nbsp;</td></tr></table>
		   </td>
		  </tr>
		</table>
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

