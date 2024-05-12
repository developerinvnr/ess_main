<?php session_start();
if($_SESSION['login'] = true){require_once('../AdminUser/config/config.php');}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('../AdminUser/logcheck.php');
if($_SESSION['logCheckEmp']!=$logemp){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('EmpMenuSession.php');}

if($_REQUEST['lid'] AND $_REQUEST['lid']!='')
{ $Fday=date("d",strtotime($_REQUEST['FD'])); $Fmonth=date("m",strtotime($_REQUEST['FD'])); $Fyear=date("Y",strtotime($_REQUEST['FD']));
  $Tday=date("d",strtotime($_REQUEST['TD'])); $Tmonth=date("m",strtotime($_REQUEST['TD'])); $Tyear=date("Y",strtotime($_REQUEST['TD']));
  $startTimeStamp = strtotime($_REQUEST['FD']); $endTimeStamp = strtotime($_REQUEST['TD']);
  if($Fmonth==01){$DateFmonth=31;} 
  elseif($Fmonth==02){ if($Fyear==2012 OR $Fyear==2016 OR $Fyear==2020 OR $Fyear==2024 OR $Fyear==2028 OR $Fyear==2032) {$DateFmonth=29;}else{$DateFmonth=28;}} 
  elseif($Fmonth==03){$DateFmonth=31;}  elseif($Fmonth=04){$DateFmonth=30;}  elseif($Fmonth==05){$DateFmonth=31;}   elseif($Fmonth==06){$DateFmonth=30;}
  elseif($Fmonth==07){$DateFmonth=31;}  elseif($Fmonth=08){$DateFmonth=31;}  elseif($Fmonth==09){$DateFmonth=30;}   elseif($Fmonth==10){$DateFmonth=31;}
  elseif($Fmonth==11){$DateFmonth=30;}  elseif($Fmonth=12){$DateFmonth=31;} 
  
  if($_REQUEST['v']==2)
  {  
/*********************************************************************************/ 
//____________________________  Open ______________________________________________//	

  if($Fmonth==$Tmonth) 
  { for($i=$Fday; $i<=$Tday; $i++) 
    { if(date("w",strtotime(date($Fyear.'-'.$Fmonth.'-'.$i)))!=0) 
	  { 
	   $Sql=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$_REQUEST['EI']." and AttDate='".date($Fyear."-".$Fmonth."-".$i)."'", $con); $row=mysql_num_rows($Sql);
       if($row==0) { $sIns=mysql_query("insert into hrm_employee_attendance(EmployeeID,AttValue,AttDate,Year,YearId)values(".$_REQUEST['EI'].",'".$_REQUEST['LT']."','".date($Fyear.'-'.$Fmonth.'-'.$i)."','".$Fyear."',".$YearId.")", $con); }
       elseif($row>0) { $sIns=mysql_query("UPDATE hrm_employee_attendance SET AttValue='".$_REQUEST['LT']."' where EmployeeID=".$_REQUEST['EI']." AND AttDate='".date($Fyear.'-'.$Fmonth.'-'.$i)."' AND YearId=".$YearId, $con); }
	  } 
    }  
  }
  
  elseif($Fmonth!=$Tmonth AND $Fyear==$Tyear)
  { for($i=$Fday; $i<=$DateFmonth; $i++) 
	{ if(date("w",strtotime(date($Fyear.'-'.$Fmonth.'-'.$i)))!=0) 
	  { 
	   $Sql=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$_REQUEST['EI']." and AttDate='".date($Fyear."-".$Fmonth."-".$i)."'", $con); $row=mysql_num_rows($Sql);
       if($row==0) { $sIns=mysql_query("insert into hrm_employee_attendance(EmployeeID,AttValue,AttDate,Year,YearId)values(".$_REQUEST['EI'].",'".$_REQUEST['LT']."','".date($Fyear.'-'.$Fmonth.'-'.$i)."','".$Fyear."',".$YearId.")", $con); }
       elseif($row>0) { $sIns=mysql_query("UPDATE hrm_employee_attendance SET AttValue='".$_REQUEST['LT']."' where EmployeeID=".$_REQUEST['EI']." AND AttDate='".date($Fyear.'-'.$Fmonth.'-'.$i)."' AND YearId=".$YearId, $con); }
	  }     
	} 
	for($i=1; $i<=$Tday; $i++) 
	{ if(date("w",strtotime(date($Fyear.'-'.$Tmonth.'-'.$i)))!=0) 
	  { 
	   $Sql=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$_REQUEST['EI']." and AttDate='".date($Fyear."-".$Tmonth."-".$i)."'", $con); $row=mysql_num_rows($Sql);
       if($row==0) { $sIns=mysql_query("insert into hrm_employee_attendance(EmployeeID,AttValue,AttDate,Year,YearId)values(".$_REQUEST['EI'].",'".$_REQUEST['LT']."','".date($Fyear.'-'.$Tmonth.'-'.$i)."','".$Fyear."',".$YearId.")", $con); }
       elseif($row>0) { $sIns=mysql_query("UPDATE hrm_employee_attendance SET AttValue='".$_REQUEST['LT']."' where EmployeeID=".$_REQUEST['EI']." AND AttDate='".date($Fyear.'-'.$Tmonth.'-'.$i)."' AND YearId=".$YearId, $con); }
	  } 
	}     
  }
	 
  elseif($Fmonth!=$Tmonth AND $Fyear!=$Tyear)
  { for($i=$Fday; $i<=$DateFmonth; $i++) 
    { if(date("w",strtotime(date($Fyear.'-'.$Fmonth.'-'.$i)))!=0) 
	  { 
	   $Sql=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$_REQUEST['EI']." and AttDate='".date($Fyear."-".$Fmonth."-".$i)."'", $con); $row=mysql_num_rows($Sql);
       if($row==0) { $sIns=mysql_query("insert into hrm_employee_attendance(EmployeeID,AttValue,AttDate,Year,YearId)values(".$_REQUEST['EI'].",'".$_REQUEST['LT']."','".date($Fyear.'-'.$Fmonth.'-'.$i)."','".$Fyear."',".$YearId.")", $con); }
       elseif($row>0) { $sIns=mysql_query("UPDATE hrm_employee_attendance SET AttValue='".$_REQUEST['LT']."' where EmployeeID=".$_REQUEST['EI']." AND AttDate='".date($Fyear.'-'.$Fmonth.'-'.$i)."' AND YearId=".$YearId, $con); }
	  } 
	}     
	for($i=1; $i<=$Tday; $i++) 
	{ if(date("w",strtotime(date($Tyear.'-'.$Tmonth.'-'.$i)))!=0) 
	  { 
	   $Sql=mysql_query("select * from hrm_employee_attendance where EmployeeID=".$_REQUEST['EI']." and AttDate='".date($Tyear."-".$Tmonth."-".$i)."'", $con); $row=mysql_num_rows($Sql);
       if($row==0) { $sIns=mysql_query("insert into hrm_employee_attendance(EmployeeID,AttValue,AttDate,Year,YearId)values(".$_REQUEST['EI'].",'".$_REQUEST['LT']."','".date($Tyear.'-'.$Tmonth.'-'.$i)."','".$Tyear."',".$YearId.")", $con); }
       elseif($row>0) { $sIns=mysql_query("UPDATE hrm_employee_attendance SET AttValue='".$_REQUEST['LT']."' where EmployeeID=".$_REQUEST['EI']." AND AttDate='".date($Tyear.'-'.$Tmonth.'-'.$i)."' AND YearId=".$YearId, $con); }
	  }  
	}    
  }
//____________________________  Close ______________________________________________//	
//************* Update hrm_employee_leave Table OPEN*************************//  
if($sIns)
{
 
$m=date("m");	$id=$_REQUEST['EI'];	
if($m==1 OR $m==3 OR $m==5 OR $m==7 OR $m==8 OR $m==10 OR $m==12){ $day=31; }
elseif($m==2){ if(date("Y")==2012 OR date("Y")==2016 OR date("Y")==2020 OR date("Y")==2024 OR date("Y")==2028 OR date("Y")==2032 OR date("Y")==2036 OR date("Y")==2040) { $day=29; } }
elseif($m==4 OR $m==6 OR $m==9 OR $m==11){ $day=30; }

$SqlCL=mysql_query("select count(AttValue)as CL from hrm_employee_attendance where AttValue='CL' AND EmployeeID=".$id." AND (AttDate between '".date("Y-".$m."-1")."' AND '".date("Y-".$m."-".$day)."')");
$SqlCH=mysql_query("select count(AttValue)as CH from hrm_employee_attendance where AttValue='CH' AND EmployeeID=".$id." AND (AttDate between '".date("Y-".$m."-1")."' AND '".date("Y-".$m."-".$day)."')");
$SqlSL=mysql_query("select count(AttValue)as SL from hrm_employee_attendance where AttValue='SL' AND EmployeeID=".$id." AND (AttDate between '".date("Y-".$m."-1")."' AND '".date("Y-".$m."-".$day)."')");
$SqlSH=mysql_query("select count(AttValue)as SH from hrm_employee_attendance where AttValue='SH' AND EmployeeID=".$id." AND (AttDate between '".date("Y-".$m."-1")."' AND '".date("Y-".$m."-".$day)."')");
$SqlPL=mysql_query("select count(AttValue)as PL from hrm_employee_attendance where AttValue='PL' AND EmployeeID=".$id." AND (AttDate between '".date("Y-".$m."-1")."' AND '".date("Y-".$m."-".$day)."')");
$SqlEL=mysql_query("select count(AttValue)as EL from hrm_employee_attendance where AttValue='EL' AND EmployeeID=".$id." AND (AttDate between '".date("Y-".$m."-1")."' AND '".date("Y-".$m."-".$day)."')");
$SqlHf=mysql_query("select count(AttValue)as Hf from hrm_employee_attendance where AttValue='CH' AND EmployeeID=".$id." AND (AttDate between '".date("Y-".$m."-1")."' AND '".date("Y-".$m."-".$day)."')");
$SqlPresent=mysql_query("select count(AttValue)as Present from hrm_employee_attendance where AttValue='P' AND EmployeeID=".$id." AND (AttDate between '".date("Y-".$m."-1")."' AND '".date("Y-".$m."-".$day)."')");
$SqlAbsent=mysql_query("select count(AttValue)as Absent from hrm_employee_attendance where AttValue='A' AND EmployeeID=".$id." AND (AttDate between '".date("Y-".$m."-1")."' AND '".date("Y-".$m."-".$day)."')");
$SqlOnDuties=mysql_query("select count(AttValue)as OnDuties from hrm_employee_attendance where AttValue='OD' AND EmployeeID=".$id." AND (AttDate between '".date("Y-".$m."-1")."' AND '".date("Y-".$m."-".$day)."')");
$SqlHoliday=mysql_query("select count(AttValue)as Holiday from hrm_employee_attendance where AttValue='HO' AND EmployeeID=".$id." AND (AttDate between '".date("Y-".$m."-1")."' AND '".date("Y-".$m."-".$day)."')");  

   $ResCL=mysql_fetch_array($SqlCL); $ResCH=mysql_fetch_array($SqlCH); $ResSL=mysql_fetch_array($SqlSL); $ResSH=mysql_fetch_array($SqlSH);
   $ResPL=mysql_fetch_array($SqlPL); $ResEL=mysql_fetch_array($SqlEL); $ResHf=mysql_fetch_array($SqlHf); $ResPresent=mysql_fetch_array($SqlPresent); 
   $ResAbsent=mysql_fetch_array($SqlAbsent); $ResOnDuties=mysql_fetch_array($SqlOnDuties); $ResHoliday=mysql_fetch_array($SqlHoliday); 

   $CountCL=$ResCL['CL']; $CountCH=$ResCH['CH']/2; $TotalCL=$CountCL+$CountCH; $CountSL=$ResSL['SL']; $CountSH=$ResSH['SH']/2; $TotalSL=$CountSL+$CountSH;
   $TotalPL=$ResPL['PL']; $TotalEL=$ResEL['EL']; $TotalLeaveCount=$TotalCL+$TotalSL+$TotalPL+$TotalEL;
   $CountHf=$ResHf['Hf']/2;  $TotalPR=$ResPresent['Present']+$CountHf;  $TotalAbsent=$ResAbsent['Absent']+$CountHf;
   $TotalOnDuties=$ResOnDuties['OnDuties']; $TotalHoliday=$ResHoliday['Holiday']; $TotalPaidDay=$TotalPR+$TotalLeaveCount+$TotalOnDuties+$TotalHoliday;
   $TotalWorkingDay=26;
   
   /************* hrm_employee_monthlyleave_balance open*******************************/
	  $SL=mysql_query("select * from hrm_employee_monthlyleave_balance where EmployeeID=".$id." AND Month='".$m."' AND Year='".date("Y")."'");  
	  $RowL=mysql_num_rows($SL);
	  if($RowL>0) { $RL=mysql_fetch_assoc($SL);   
	                $TotBalCL=$RL['OpeningCL']-$TotalCL;  $TotBalSL=$RL['OpeningSL']-$TotalSL;  
	                $TotBalPL=$RL['OpeningPL']-$TotalPL;  $TotBalEL=$RL['OpeningEL']-$TotalEL;
	  $sUpL=mysql_query("UPDATE hrm_employee_monthlyleave_balance set AvailedCL='".$TotalCL."', AvailedSL='".$TotalSL."', AvailedPL='".$TotalPL."', AvailedEL='".$TotalEL."', BalanceCL='".$TotBalCL."', BalanceSL='".$TotBalSL."', BalancePL='".$TotBalPL."', BalanceEL='".$TotBalEL."' where EmployeeID=".$id." AND Month='".$m."' AND Year='".date("Y")."'", $con); }
	  /*********** hrm_employee_monthlyleave_balance close ****************************/


 $sqlUp=mysql_query("update hrm_employee_applyleave set LeaveStatus=".$_REQUEST['v'].", LeaveHodStatus=".$_REQUEST['v'].", LeaveHodUpDate='".date("Y-m-d")."', ApplyLeave_UpdatedYearId=".$YearId." where ApplyLeaveId=".$_REQUEST['lid'], $con); 
  if($sqlUp){$msg='Leave approved successfully...';}
  
}
else {$msg='Error...';}
//*************************************** Update hrm_employee_leave Table CLOSE*******************************************// 
/***************************************************************************************************************************/  
  }
  if($_REQUEST['v']!=2)
  {$sqlUp=mysql_query("update hrm_employee_applyleave set LeaveStatus=".$_REQUEST['v'].", LeaveHodStatus=".$_REQUEST['v'].", LeaveHodUpDate='".date("Y-m-d")."', ApplyLeave_UpdatedYearId=".$YearId." where ApplyLeaveId=".$_REQUEST['lid'], $con);}
}

if(isset($_POST['BtnDisReason']))
{ $sqlUp=mysql_query("update hrm_employee_applyleave set LeaveStatus=".$_POST['Lvalue'].", LeaveHodStatus=".$_REQUEST['Lvalue'].", LeaveHodReason='".$_POST['DisReason']."', LeaveHodUpDate='".date("Y-m-d")."', ApplyLeave_UpdatedYearId=".$YearId." where ApplyLeaveId=".$_POST['Lid'], $con);
  if($sqlUp){$msg='Leave dis-approved successfully...';}
}
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

<style>.font { color:#ffffff; font-family:Georgia; font-size:11px; width:200px;} .font1 { font-family:Georgia; font-size:11px; height:14px; } 
.font2 { font-size:11px;width:260px;height:18px;}.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;} .TableHead { font-family:Times New Roman; color:#FFFFFF; font-size:15px; }
.TableHead1 { font-family:Times New Roman; color:#000000;  font-size:13px; overflow:hidden; } .InputText {font-family:Times New Roman; font-size:12px; width:100px; height:19px; }
.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}</style>
<Script type="text/javascript">window.history.forward(1);</Script>
<script type="text/javascript" language="javascript">
function OpenWindow(LId)
{window.open("LeaveDetails.php?id="+LId,"leaveForm","menubar=yes,scrollbars=yes,resizable=no,directories=no,width=350,height=350");}

function ChangeLStatus(v,LId,LT,FD,TD,TotD,EI)
{ if(v==1){var agree=confirm("Are you sure you want to pending status this apply leave?"); 
           if (agree) { var x = "PLeaveToHOD.php?AppLeave=yes&lid="+LId+"&v="+v+"&LT="+LT;  window.location=x; }}
  if(v==2){var agree=confirm("Are you sure you want to approved this apply leave?"); 
           if (agree) { var x = "PLeaveToHOD.php?AppLeave=yes&lid="+LId+"&v="+v+"&LT="+LT+"&FD="+FD+"&TD="+TD+"&TotD="+TotD+"&EI="+EI;  window.location=x; }}
  if(v==3){var agree=confirm("Are you sure you want to disapproved status this apply leave?"); 
           if (agree) { var x = "PLeaveToHOD.php?action=Dis&LD="+LId+"&v="+v;  window.location=x; }}		   
}
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
		   
<?php //*************************************************************************************************************************************************** ?>	   
		     <table border="0" id="Activity">
			  <tr>
			     <td id="Anni" valign="top">
				    <table border="0">
						  <tr height="20">
						    <td align="left" valign="top" width="125">
<?php include("EmpImgEmp.php"); ?>
<?php //echo "<img width=105px height=125px src=\"show_images.php?id=".$EmployeeId."\">\n";?></td>
						  </tr>
					 </table>
				 </td>
				  <td align="left" width="950" valign="top">
	     <table border="0" width="950">
		    <tr>
			 <td colspan="10"><table border="0"><tr>
<?php if($rowApp>0) { ?><td align="center"><a href="PLeave.php"><img id="Img_manager1" style="display:block;" src="images/manager1.png" border="0"/></a>
		     <img id="Img_manager" style="display:none;" src="images/manager.png" border="0"/></td><?php } ?>
<?php if($rowHod>0) { ?><td align="center"><a href="PLeaveToHOD.php"><img id="Img_hod1" style="display:none;" src="images/RevHod1.png" border="0"/></a>
		     <img id="Img_hod" style="display:block;" src="images/RevHod.png" border="0"/></td><?php } ?>
			 <td>&nbsp;</td>
			 
			 <td width="800" class="TableHead">
			   <font color="#106809" style='font-family:Times New Roman;' size="4"><i><b>Pending Leave</b></i></font>
			   &nbsp;&nbsp;&nbsp;&nbsp;
			   <font color="#FB0000" style='font-family:Times New Roman;' size="4"><i><b><?php echo $msg; ?></b></i></font>
			 </td>
			 </tr></table></td>
			</tr>
			<tr>
			 <td valign="top" style="display:<?php if($_REQUEST['action']=='Dis') { echo 'block'; } else { echo 'none';}?>;">
			  <table border="0">
			   <tr>
			    <form method="post" name="formDis">
				<td style="width:80px; font-family:Times New Roman; font-size:14px;"><b>Reason :&nbsp;</b></td>
				<td style="width:750px;"><input name="DisReason" style="width:748px; font-family:Times New Roman; font-size:12px; background-color:#FFE8F3;" maxlength="249" /></td>
				<td style="width:100px;">
				<input type="hidden" name="Lid" value="<?php echo $_REQUEST['LD']; ?>" /><input type="hidden" name="Lvalue" value="<?php echo $_REQUEST['v']; ?>" />
				<input type="submit" name="BtnDisReason" style="width:100px; font-family:Times New Roman;" value="Send"/>
				</td>
				</form>
			   </tr>
			  </table>
			 </td>
			</tr>
			<tr>
			 <td>
			   <table border="1">
            <tr bgcolor="#7a6189" style="height:22px;">
		     <td width="40" class="TableHead" align="center"><b>Sno</b></td>
		     <td width="50" class="TableHead" align="center"><b>EC</b></td>
		     <td width="250" class="TableHead" align="center"><b>Name</b></td>
			 <td width="100" class="TableHead" align="center"><b>Apply Date</b></td>
		     <td width="100" class="TableHead" align="center"><b>Leave</b></td>
		     <td width="70" class="TableHead" align="center"><b>From</b></td>
		     <td width="70" class="TableHead" align="center"><b>To</b></td>
			 <td width="40" class="TableHead" align="center"><b>Day</b></td>
		     <td width="60" class="TableHead" align="center"><b>Details</b></td>
			 <td width="80" class="TableHead" align="center"><b>Status</b></td> 
			 <td width="80" class="TableHead" align="center"><b>Appraiser</b></td>
			 <td width="80" class="TableHead" align="center"><b>HOD</b></td>
		     <td width="100" class="TableHead" align="center"><b>Action</b></td>
		   </tr>
<?php $CFromDate=date("Y").'-01-01'; $CToDate=date("Y").'-12-31'; 
	  $sqlCheck=mysql_query("select * from hrm_employee_applyleave where Apply_SentToHOD=".$EmployeeId." AND LeaveStatus=1 AND LeaveEmpCancelStatus='N' AND (Apply_Date>='".$CFromDate."' AND Apply_Date<='".$CToDate."') order by Apply_Date ASC", $con); 
	  $rowCheck=mysql_num_rows($sqlCheck); if($rowCheck>0){ $sno=1; while($resL=mysql_fetch_array($sqlCheck)){	  
	  $sqlE=mysql_query("select EmpCode, Fname, Sname, Lname, DesigId, DepartmentId from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee.EmployeeID=".$resL['EmployeeID'], $con); 
      $resE=mysql_fetch_assoc($sqlE); $EmpName=$resE['Fname'].' '.$resE['Sname'].' '.$resE['Lname']; ?>								  					
		   <tr <?php if($resL['Leave_Type']=='PL'){ echo 'bgcolor="#FFEAD5"'; } else {echo 'bgcolor="#FFFFFF"';}?>>
		    <td width="40" class="TableHead1" align="center"><?php echo $sno; ?></td>
		    <td width="50" class="TableHead1" align="center"><?php echo $resE['EmpCode']; ?></td>
		    <td width="250" class="TableHead1" align="left"><?php echo $EmpName; ?></td>
			<td width="100" class="TableHead1" align="center"><?php echo date("d-m-y", strtotime($resL['Apply_Date'])); ?></td>
		    <td width="100" class="TableHead1" align="center"><?php if($resL['Leave_Type']=='CH'){echo 'Half day CL';} elseif($resL['Leave_Type']=='SH'){echo 'Half day SL';} else {echo $resL['Leave_Type'];} ?></td>
		    <td width="70" class="TableHead1" align="center"><?php echo date("d-m-y",strtotime($resL['Apply_FromDate'])); ?></td>
		    <td width="70" class="TableHead1" align="center"><?php echo date("d-m-y",strtotime($resL['Apply_ToDate'])); ?></td>
			<td width="70" class="TableHead1" align="center"  style="background-color:#B9FFB9;"><?php echo $resL['Apply_TotalDay']; ?></td>
		    <td width="60" class="TableHead1" align="center"><a href="javascript:OpenWindow(<?php echo $resL['ApplyLeaveId']; ?>)">Details</a></td>
			<td width="80" class="TableHead1" align="center">Pending</td>
			<td width="80" class="TableHead1" align="center"><?php if($resL['LeaveAppStatus']==0) {echo 'Draft';} if($resL['LeaveAppStatus']==1) {echo 'Pending';} if($resL['LeaveAppStatus']==2) {echo 'Approved';} if($resL['LeaveAppStatus']==3) {echo 'Disapproved';}?></td>		
			<td width="80" class="TableHead1" align="center">
			<?php if($resL['Leave_Type']=='PL') {?> 
			<?php if($resL['LeaveHodStatus']==0) {echo 'Draft';} if($resL['LeaveHodStatus']==1) {echo 'Pending';} if($resL['LeaveHodStatus']==2) {echo 'Approved';} if($resL['LeaveHodStatus']==3) {echo 'Disapproved';}?><?php } ?></td>
		    <td width="100" class="TableHead1" align="center">
			<?php if($resL['Leave_Type']=='PL') {?> 
<select name="ActionReplyQ" id="ActionReplyQ" style="font-family:Times New Roman; height:20px; width:95px; color:#000000; font-size:13px;" onChange="ChangeLStatus(this.value,<?php echo $resL['ApplyLeaveId']; ?>,'<?php echo $resL['Leave_Type']; ?>','<?php echo $resL['Apply_FromDate']; ?>','<?php echo $resL['Apply_ToDate']; ?>',<?php echo $resL['Apply_TotalDay'].', '.$resL['EmployeeID']; ?>)">
<option value="0">Select</option> 
<option value="2" style="background-color:#FFFFFF;">Approved</option> 
<option value="3" style="background-color:#FFFFFF;">Dis-approved</option> 
</select><?php } ?></td>
		  </tr>  
<?php $sno++; } } ?>					  
              </table>
			 </td>
			</tr>
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

