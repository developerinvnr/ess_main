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
  elseif($Fmonth==03){$DateFmonth=31;}  elseif($Fmonth==04){$DateFmonth=30;}  elseif($Fmonth==05){$DateFmonth=31;}   elseif($Fmonth==06){$DateFmonth=30;}
  elseif($Fmonth==07){$DateFmonth=31;}  elseif($Fmonth==08){$DateFmonth=31;}  elseif($Fmonth==09){$DateFmonth=30;}   elseif($Fmonth==10){$DateFmonth=31;}
  elseif($Fmonth==11){$DateFmonth=30;}  elseif($Fmonth==12){$DateFmonth=31;} 
   
  if($_REQUEST['LS']!=2)
   { $sqlUp=mysql_query("update hrm_employee_applyleave set LeaveCancelStatus='Y' where ApplyLeaveId=".$_REQUEST['lid'], $con); 
     if($sqlUp){$msg='Leave cancelation successfully...';}
   }
  elseif($_REQUEST['LS']==2) 
  {
/***************************************************************************************************************************/ 
//____________________________  Open ______________________________________________//	
  if($Fmonth==$Tmonth) 
  { for($i=$Fday; $i<=$Tday; $i++) 
    { if(date("w",strtotime(date($Fyear.'-'.$Fmonth.'-'.$i)))!=0) 
	  { 
       $sIns=mysql_query("delete from hrm_employee_attendance where AttValue='".$_REQUEST['LeT']."' AND EmployeeID=".$_REQUEST['EI']." AND AttDate='".date($Fyear.'-'.$Fmonth.'-'.$i)."' AND YearId=".$YearId, $con);
	  } 
	  elseif(date("w",strtotime(date($Fyear.'-'.$Fmonth.'-'.$i)))==0 AND $_REQUEST['LeT']=='EL') 
	  { 
       $sIns=mysql_query("delete from hrm_employee_attendance where AttValue='".$_REQUEST['LeT']."' AND EmployeeID=".$_REQUEST['EI']." AND AttDate='".date($Fyear.'-'.$Fmonth.'-'.$i)."' AND YearId=".$YearId, $con);
	  } 
    }  
  }
  
  elseif($Fmonth!=$Tmonth AND $Fyear==$Tyear)
  { for($i=$Fday; $i<=$DateFmonth; $i++) 
	{ if(date("w",strtotime(date($Fyear.'-'.$Fmonth.'-'.$i)))!=0) 
	  { 
        $sIns=mysql_query("delete from hrm_employee_attendance where AttValue='".$_REQUEST['LeT']."' AND EmployeeID=".$_REQUEST['EI']." AND AttDate='".date($Fyear.'-'.$Fmonth.'-'.$i)."' AND YearId=".$YearId, $con); 
	  }     
	  elseif(date("w",strtotime(date($Fyear.'-'.$Fmonth.'-'.$i)))==0 AND $_REQUEST['LeT']=='EL') 
	  { 
        $sIns=mysql_query("delete from hrm_employee_attendance where AttValue='".$_REQUEST['LeT']."' AND EmployeeID=".$_REQUEST['EI']." AND AttDate='".date($Fyear.'-'.$Fmonth.'-'.$i)."' AND YearId=".$YearId, $con); 
	  }   
	} 
	for($i=1; $i<=$Tday; $i++) 
	{ if(date("w",strtotime(date($Fyear.'-'.$Tmonth.'-'.$i)))!=0) 
	  { 
	   $sIns=mysql_query("delete from hrm_employee_attendance where AttValue='".$_REQUEST['LeT']."' AND EmployeeID=".$_REQUEST['EI']." AND AttDate='".date($Fyear.'-'.$Tmonth.'-'.$i)."' AND YearId=".$YearId, $con); 
	  } 
	  elseif(date("w",strtotime(date($Fyear.'-'.$Tmonth.'-'.$i)))==0 AND $_REQUEST['LeT']=='EL') 
	  { 
	   $sIns=mysql_query("delete from hrm_employee_attendance where AttValue='".$_REQUEST['LeT']."' AND EmployeeID=".$_REQUEST['EI']." AND AttDate='".date($Fyear.'-'.$Tmonth.'-'.$i)."' AND YearId=".$YearId, $con); 
	  } 
	}     
  }
	 
  elseif($Fmonth!=$Tmonth AND $Fyear!=$Tyear)
  { for($i=$Fday; $i<=$DateFmonth; $i++) 
    { if(date("w",strtotime(date($Fyear.'-'.$Fmonth.'-'.$i)))!=0) 
	  { 
	   $sIns=mysql_query("delete from hrm_employee_attendance where AttValue='".$_REQUEST['LeT']."' AND EmployeeID=".$_REQUEST['EI']." AND AttDate='".date($Fyear.'-'.$Fmonth.'-'.$i)."' AND YearId=".$YearId, $con); 
	  } 
	  if(date("w",strtotime(date($Fyear.'-'.$Fmonth.'-'.$i)))==0 AND $_REQUEST['LeT']=='EL') 
	  { 
	   $sIns=mysql_query("delete from hrm_employee_attendance where AttValue='".$_REQUEST['LeT']."' AND EmployeeID=".$_REQUEST['EI']." AND AttDate='".date($Fyear.'-'.$Fmonth.'-'.$i)."' AND YearId=".$YearId, $con); 
	  } 
	}     
	for($i=1; $i<=$Tday; $i++) 
	{ if(date("w",strtotime(date($Tyear.'-'.$Tmonth.'-'.$i)))!=0) 
	  { 
        $sIns=mysql_query("delete from hrm_employee_attendance where AttValue='".$_REQUEST['LeT']."' AND EmployeeID=".$_REQUEST['EI']." AND AttDate='".date($Tyear.'-'.$Tmonth.'-'.$i)."' AND YearId=".$YearId, $con); 
	  }  
	  elseif(date("w",strtotime(date($Tyear.'-'.$Tmonth.'-'.$i)))==0 AND $_REQUEST['LeT']=='EL') 
	  { 
        $sIns=mysql_query("delete from hrm_employee_attendance where AttValue='".$_REQUEST['LeT']."' AND EmployeeID=".$_REQUEST['EI']." AND AttDate='".date($Tyear.'-'.$Tmonth.'-'.$i)."' AND YearId=".$YearId, $con); 
	  } 
	}    
  }
//____________________________  Close ______________________________________________//	
//*************** Update hrm_employee_leave Table OPEN********************//  
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
$SqlFL=mysql_query("select count(AttValue)as FL from hrm_employee_attendance where AttValue='FL' AND EmployeeID=".$id." AND (AttDate between '".date("Y-".$m."-1")."' AND '".date("Y-".$m."-".$day)."')");
$SqlTL=mysql_query("select count(AttValue)as TL from hrm_employee_attendance where AttValue='TL' AND EmployeeID=".$id." AND (AttDate between '".date("Y-".$m."-1")."' AND '".date("Y-".$m."-".$day)."')");
$SqlHf=mysql_query("select count(AttValue)as Hf from hrm_employee_attendance where AttValue='HF' AND EmployeeID=".$id." AND (AttDate between '".date("Y-".$m."-1")."' AND '".date("Y-".$m."-".$day)."')");
$SqlPresent=mysql_query("select count(AttValue)as Present from hrm_employee_attendance where AttValue='P' AND EmployeeID=".$id." AND (AttDate between '".date("Y-".$m."-1")."' AND '".date("Y-".$m."-".$day)."')");
$SqlAbsent=mysql_query("select count(AttValue)as Absent from hrm_employee_attendance where AttValue='A' AND EmployeeID=".$id." AND (AttDate between '".date("Y-".$m."-1")."' AND '".date("Y-".$m."-".$day)."')");
$SqlOnDuties=mysql_query("select count(AttValue)as OnDuties from hrm_employee_attendance where AttValue='OD' AND EmployeeID=".$id." AND (AttDate between '".date("Y-".$m."-1")."' AND '".date("Y-".$m."-".$day)."')");
$SqlHoliday=mysql_query("select count(AttValue)as Holiday from hrm_employee_attendance where AttValue='HO' AND EmployeeID=".$id." AND (AttDate between '".date("Y-".$m."-1")."' AND '".date("Y-".$m."-".$day)."')"); 
$SqlELSun=mysql_query("select count(CheckSunday)as SUN from hrm_employee_attendance where CheckSunday='Y' AND EmployeeID=".$id." AND (AttDate between '".date("Y-".$m."-1")."' AND '".date("Y-".$m."-".$day)."')", $con); 

   $ResCL=mysql_fetch_array($SqlCL); $ResCH=mysql_fetch_array($SqlCH); $ResSL=mysql_fetch_array($SqlSL); $ResSH=mysql_fetch_array($SqlSH);
   $ResPL=mysql_fetch_array($SqlPL); $ResEL=mysql_fetch_array($SqlEL); $ResFL=mysql_fetch_array($SqlFL); $ResTL=mysql_fetch_array($SqlTL); $ResHf=mysql_fetch_array($SqlHf); 
   $ResPresent=mysql_fetch_array($SqlPresent); $ResAbsent=mysql_fetch_array($SqlAbsent); $ResOnDuties=mysql_fetch_array($SqlOnDuties); $ResHoliday=mysql_fetch_array($SqlHoliday); 
   $ResELSun=mysql_fetch_array($SqlELSun);

   $CountCL=$ResCL['CL']; $CountCH=$ResCH['CH']/2; $TotalCL=$CountCL+$CountCH; $CountSL=$ResSL['SL']; $CountSH=$ResSH['SH']/2; $TotalSL=$CountSL+$CountSH;
   $TotalPL=$ResPL['PL']; $TotalEL=$ResEL['EL']; $TotalFL=$ResFL['FL']; $TotalTL=$ResTL['TL']; $TotalLeaveCount=$TotalCL+$TotalSL+$TotalPL+$TotalEL+$TotalFL+$TotalTL; 
   $TotELSun=$ResELSun['SUN'];
   $CountHf=$ResHf['Hf']/2;  
   $TotalPR=$ResPresent['Present']+$CountCH+$CountSH+$CountHf; //$TotalPR=$ResPresent['Present']+$CountHf;  
   $TotalAbsent=$ResAbsent['Absent']+$CountHf;
   $TotalOnDuties=$ResOnDuties['OnDuties']; $TotalHoliday=$ResHoliday['Holiday']; 
   
   $TotalDayWithSunEL=$TotalPR+$TotalLeaveCount+$TotalOnDuties+$TotalHoliday;

   $TotalPaidDay=$TotalDayWithSunEL-$TotELSun;
   $TotalWorkingDay=26;
   
    /**************** hrm_employee_monthlyleave_balance open***********************************************/
	  $SL=mysql_query("select * from hrm_employee_monthlyleave_balance where EmployeeID=".$id." AND Month='".$m."' AND Year='".date("Y")."'");  
	  $RowL=mysql_num_rows($SL);
	  if($RowL>0) { $RL=mysql_fetch_assoc($SL);   
	  if($m!=1) { $TotBalCL=$RL['OpeningCL']-$TotalCL;  $TotBalSL=$RL['OpeningSL']-$TotalSL; $TotBalPL=$RL['OpeningPL']-$TotalPL;  $TotBalEL=$RL['OpeningEL']-$TotalEL;
	              $TotBalFL=$RL['OpeningOL']-$TotalFL; }  
      if($m==1) { $TotBalCL=$RL['TotCL']-$TotalCL;  $TotBalSL=$RL['TotSL']-$TotalSL; $TotBalPL=$RL['TotPL']-$TotalPL;  $TotBalEL=$RL['TotEL']-$TotalEL;
	              $TotBalFL=$RL['TotOL']-$TotalFL; }
	  $sUpL=mysql_query("UPDATE hrm_employee_monthlyleave_balance set AvailedCL='".$TotalCL."', AvailedSL='".$TotalSL."', AvailedPL='".$TotalPL."', AvailedEL='".$TotalEL."', AvailedOL='".$TotalFL."', AvailedTL='".$TotalTL."', BalanceCL='".$TotBalCL."', BalanceSL='".$TotBalSL."', BalancePL='".$TotBalPL."', BalanceEL='".$TotBalEL."', BalanceOL='".$TotBalFL."' where EmployeeID=".$id." AND Month='".$m."' AND Year='".date("Y")."'", $con); }
	  /*************** hrm_employee_monthlyleave_balance close *************************/


  $sqlUp=mysql_query("update hrm_employee_applyleave set LeaveCancelStatus='Y', LeaveStatus=4 where ApplyLeaveId=".$_REQUEST['lid'], $con); 
  if($sqlUp){$msg='Leave cancelation successfully...';}
}
else {$msg='Error...';}
//*************************************** Update hrm_employee_leave Table CLOSE*******************************************// 
/***************************************************************************************************************************/  
 }
}

?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>

<style>
.th{color:#ffffff;font-family:Times New Roman;font-size:12px;font-weight:bold;text-align:center;height:24px;} 
.tdl{color:#000000;font-family:Times New Roman;font-size:12px;height:20px;} 
.tdc{color:#000000;font-family:Times New Roman;font-size:12px;text-align:center;height:20px;}
.tdr{color:#000000;font-family:Times New Roman;font-size:12px;text-align:right;height:20px;} 
.inpl{color:#000000;font-family:Times New Roman;font-size:11px;width:99%;height:20px;} 
.inpc{color:#000000;font-family:Times New Roman;font-size:11px;text-align:center;width:99%;height:20px;}
.inpr{color:#000000;font-family:Times New Roman;font-size:11px;text-align:right;width:99%;height:20px;} 
.TableHead { font-family:Times New Roman;color:#000000;font-size:15px;font-weight:bold; }
.CBtn {background-image:url(images/CalenderBtn.jpeg);width:16px;height:16px;background-color:#E0DBE3;border-color:#FFFFFF;}
</style>

<script type="text/javascript" language="javascript">
function OpenWindow(LId)
{window.open("LeaveDWithCancel.php?id="+LId,"leaveForm","menubar=yes,scrollbars=yes,resizable=no,directories=no,width=350,height=350");}

function OpenBalWin(EId)
{window.open("LeaveBalDetails.php?id="+EId,"leaveForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=600,height=220");}

function ActionLC(v,LId,LT,FD,TD,TotD,EI,LS)
{ var agree=confirm("Are you sure you want to cancel OK this apply cancelation leave?"); 
  if (agree) { var x = "CLeaveToHOD.php?AppLeave=yes&lid="+LId+"&v="+v+"&LeT="+LT+"&FD="+FD+"&TD="+TD+"&TotD="+TotD+"&EI="+EI+"&LS="+LS;  window.location=x; }
}

function CloseL(i)
{window.location="CLeaveToHod.php?ac=CloseLeave&LCid="+i;}
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
  <table width="100%" style="margin-top:0px;">
   <tr><td valign="top"><?php if($_SESSION['login'] = true){ require_once("EWelcome.php"); } ?></td></tr>
   <tr>
	<td valign="top">
	<table border="0" style="width:100%;float:none;" cellpadding="0">
     <tr>
	  <td valign="top">    
<?php //********************************************************************************** ?>	   
<table border="0" id="Activity">
 <tr>
  <td id="Anni" valign="top">
	<table border="0">
	  <tr height="20">
	   <td align="left" valign="top" width="150">
       <?php include("EmpImgEmp.php"); ?>
       <?php //echo "<img width=105px height=125px src=\"show_images.php?id=".$EmployeeId."\">\n";?>
	   </td>
	  </tr>
	</table>
  </td>
  <td style="width:100%;">
  
	     <table border="0" style="width:90%;">
		    <tr>
			 <td colspan="10"><table border="0"><tr>
<?php if($rowApp>0) { ?><td align="center"><a href="CLeave.php"><img id="Img_manager1" style="display:block;" src="images/manager1.png" border="0"/></a>
		     <img id="Img_manager" style="display:none;" src="images/manager.png" border="0"/></td><?php } ?>
<?php if($rowHod>0 OR $rowRev>0) { ?><td align="center"><a href="CLeaveToHOD.php"><img id="Img_hod1" style="display:none;" src="images/RevHod1.png" border="0"/></a>
		     <img id="Img_hod" style="display:block;" src="images/RevHod.png" border="0"/></td><?php } ?>
			 <td>&nbsp;</td>
			 
			 <td width="700" class="TableHead">
			   <font color="#106809" style='font-family:Times New Roman;' ><i><b>Cancelation Leave</b></i></font>
			   <?php if($_REQUEST['ac']=='CloseLeave') { ?><font color="#000000"><b>(Accept Cancelation)</b></font><?php } ?>
			   &nbsp;&nbsp;&nbsp;&nbsp;
			   <font color="#FB0000" style='font-family:Times New Roman;' size="4"><i><b><?php echo $msg; ?></b></i></font>
			 </td>
			 <td align="center" style="font-family:Times New Roman; color:#004A00;width:12px; font-size:15px;">
		     <?php $CFromDate='2013-04-01'; $CToDate=date("Y").'-12-31';
		           $sqlLC=mysql_query("select * from hrm_employee_applyleave where Apply_SentToHOD=".$EmployeeId." AND LeaveEmpCancelStatus='Y' AND LeaveCancelStatus='Y' AND (Apply_Date>='".$CFromDate."' AND Apply_Date<='".$CToDate."') order by Apply_Date ASC", $con); $rowLC=mysql_num_rows($sqlLC);?>
		<td valign="top" style="width:260px;" align="right"><?php if($rowLC>0){?>			
             <?php if($_REQUEST['ac']=='CloseLeave') { ?>
		     <a href="#" onClick="javascript:window.location='CLeaveToHOD.php'"><font color="#464600" style='font-family:Times New Roman;' size="3"><b>Refresh</b></font></a>		             <?php } else { ?>
		     <a href="#" onClick="CloseL()"><font color="#464600" style='font-family:Times New Roman;' size="3"><b>Cancelation Ok Leave</b></font></a>
		     <?php } } ?></td>
			 </tr></table></td>
			</tr>
			<tr>
	<td style="width:100%;">
	 <table border="1" style="width:100%;" cellspacing="1">
            <tr bgcolor="#7a6189">
		     <td class="th" style="width:40px;">Sno</td>
		     <td class="th" style="width:50px;">EC</td>
		     <td class="th" style="width:250px;">Name</td>
			 <td class="th" style="width:100px;">Apply Date</td>
		     <td class="th" style="width:100px;">Leave</td>
		     <td class="th" style="width:70px;">From</td>
		     <td class="th" style="width:70px;">To</td>
			 <td class="th" style="width:40px;">Day</td>
		     <td class="th" style="width:60px;">Details</td>
			 <td class="th" style="width:60px;">Balance</td>
			 <td class="th" style="width:80px;">Status</td> 
		     <td class="th" style="width:80px;">Cancel</td>
		   </tr>
<?php $CFromDate=date("Y-01-01"); $CToDate=date("Y").'-12-31'; 

if($rowHod>0 OR $rowRev>0)
{
$sqlCheck=mysql_query("select * from hrm_employee_applyleave where (Leave_Type='PL' OR (Leave_Type='SL' AND SLHodApp='Y')) AND (Apply_SentToHOD=".$EmployeeId." OR Apply_SentToRev=".$EmployeeId.") AND LeaveEmpCancelStatus='Y' AND LeaveCancelStatus='N' AND Apply_FromDate>='".$CFromDate."' order by Apply_Date ASC", $con);
}
elseif($rowRev>0)
{
$sqlCheck=mysql_query("select * from hrm_employee_applyleave where Leave_Type='PL' AND Apply_SentToRev=".$EmployeeId." AND LeaveEmpCancelStatus='Y' AND LeaveCancelStatus='N' AND Apply_FromDate>='".$CFromDate."' order by Apply_Date ASC", $con);
}

	   
	  $rowCheck=mysql_num_rows($sqlCheck); if($rowCheck>0 AND $_REQUEST['ac']!='CloseLeave'){ $sno=1; while($resL=mysql_fetch_array($sqlCheck)){	  
	  $sqlE=mysql_query("select EmpCode, Fname, Sname, Lname, DesigId, DepartmentId from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee.EmployeeID=".$resL['EmployeeID'], $con); 
      $resE=mysql_fetch_assoc($sqlE); $EmpName=$resE['Fname'].' '.$resE['Sname'].' '.$resE['Lname']; 
	  
	  $sqlch=mysql_query("select * from hrm_employee_separation where EmployeeID=".$resL['EmployeeID']." AND Rep_Approved!='C' AND Hod_Approved!='C' AND HR_Approved!='C'", $con); $rowch=mysql_num_rows($sqlch);
	  ?>								  					
		   <tr style="background-color:<?php if($rowch>0){echo '#FFFF6C';}elseif($resL['Leave_Type']=='PL'){echo '#71B8FF';}else{echo '#FFFFFF';} ?>;">
		    <td class="tdc"><?php echo $sno; ?></td>
		    <td class="tdc"><?php echo $resE['EmpCode']; ?></td>
		    <td class="tdl"><?php echo $EmpName; ?></td>
			<td class="tdc"><?php echo date("d-m-y", strtotime($resL['Apply_Date'])); ?></td>
		    <td class="tdc"><?php if($resL['Leave_Type']=='CH'){echo 'Half day CL';} elseif($resL['Leave_Type']=='SH'){echo 'Half day SL';} else {echo $resL['Leave_Type'];} ?></td>
		    <td class="tdc"><?php echo date("d-m-y",strtotime($resL['Apply_FromDate'])); ?></td>
		    <td class="tdc"><?php echo date("d-m-y",strtotime($resL['Apply_ToDate'])); ?></td>
			<td class="tdc" style="background-color:#B9FFB9;"><?php echo $resL['Apply_TotalDay']; ?></td>
		    <td class="tdc"><a href="javascript:OpenWindow(<?php echo $resL['ApplyLeaveId']; ?>)">Details</a></td>
			<td class="tdc"><a href="javascript:OpenBalWin(<?php echo $resL['EmployeeID']; ?>)">Balance</a></td>
			<td class="tdc"><?php if($resL['LeaveStatus']==0) {echo 'Draft';} if($resL['LeaveStatus']==1) {echo 'Pending';} if($resL['LeaveStatus']==2) {echo 'Approved';} if($resL['LeaveStatus']==3) {echo 'Disapproved';}?></td>
		    <td class="tdc">
			 <a href="#" onClick="ActionLC('Y',<?php echo $resL['ApplyLeaveId']; ?>,'<?php echo $resL['Leave_Type']; ?>','<?php echo $resL['Apply_FromDate']; ?>','<?php echo $resL['Apply_ToDate']; ?>',<?php echo $resL['Apply_TotalDay'].', '.$resL['EmployeeID'].', '.$resL['LeaveStatus'] ; ?>)">OK</a></td>
		  </tr>  
<?php $sno++; } } ?>	
<?php if($_REQUEST['ac']=='CloseLeave') { $snoC=1; while($resLC=mysql_fetch_array($sqlLC)) {
 $sqlE=mysql_query("select EmpCode, Fname, Sname, Lname, DesigId, DepartmentId from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee.EmployeeID=".$resLC['EmployeeID'], $con); 
      $resE=mysql_fetch_assoc($sqlE); $EmpName=$resE['Fname'].' '.$resE['Sname'].' '.$resE['Lname']; 
	  
	  $sqlch=mysql_query("select * from hrm_employee_separation where EmployeeID=".$resLC['EmployeeID']." AND Rep_Approved!='C' AND Hod_Approved!='C' AND HR_Approved!='C'", $con); $rowch=mysql_num_rows($sqlch);
	  ?>								  					
		   <tr style="background-color:<?php if($rowch>0){echo '#FFFF6C';}elseif($resLC['Leave_Type']=='PL'){echo '#71B8FF';}else{echo '#FFFFFF';} ?>;">
		    <td class="tdc"><?php echo $snoC; ?></td>
		    <td class="tdc"><?php echo $resE['EmpCode']; ?></td>
		    <td class="tdl"><?php echo $EmpName; ?></td>
			<td class="tdc"><?php echo date("d-m-y", strtotime($resLC['Apply_Date'])); ?></td>
		    <td class="tdc"><?php if($resLC['Leave_Type']=='CH'){echo 'Half day CL';} elseif($resLC['Leave_Type']=='SH'){echo 'Half day SL';} else {echo $resLC['Leave_Type'];} ?></td>
		    <td class="tdc"><?php echo date("d-m-y",strtotime($resLC['Apply_FromDate'])); ?></td>
		    <td class="tdc"><?php echo date("d-m-y",strtotime($resLC['Apply_ToDate'])); ?></td>
			<td class="tdc" style="background-color:#B9FFB9;"><?php echo $resLC['Apply_TotalDay']; ?></td>
		    <td class="tdc"><a href="javascript:OpenWindow(<?php echo $resLC['ApplyLeaveId']; ?>)">Details</a></td>
			<td class="tdc"><a href="javascript:OpenBalWin(<?php echo $resLC['EmployeeID']; ?>)">Balance</a></td>
			<td class="tdc"><?php if($resLC['LeaveStatus']==0) {echo 'Draft';} if($resLC['LeaveStatus']==1) {echo 'Pending';} if($resLC['LeaveStatus']==2) {echo 'Approved';} if($resLC['LeaveStatus']==3) {echo 'Disapproved';}?></td>	
		    <td class="tdc">OK</td>
		  </tr>  
<?php $snoC++; } } ?>					  
              </table>
			 </td>
			</tr>
		 </table>
	           </td>
    </tr>
</table>

			
<?php //***************************************************************************************** ?>
		   </td>
		  </tr>
		</table>
	  </td>
	</tr>	
	<tr><td valign="top" align="center">&nbsp;</td></tr>
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

