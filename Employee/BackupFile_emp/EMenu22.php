<script language="javascript" type="text/javascript"> 
stuHover = function() { var cssRule; var newSelector; for (var i = 0; i < document.styleSheets.length; i++) for (var x = 0; x < document.styleSheets[i].rules.length ; x++)
 { cssRule = document.styleSheets[i].rules[x]; if (cssRule.selectorText.indexOf("LI:hover") != -1) { newSelector = cssRule.selectorText.replace(/LI:hover/gi, "LI.iehover");
	 document.styleSheets[i].addRule(newSelector , cssRule.style.cssText);  } } var getElm = document.getElementById("nav").getElementsByTagName("LI"); for (var i=0; i<getElm.length; i++) { getElm[i].onmouseover=function() { this.className+=" iehover"; } getElm[i].onmouseout=function() { this.className=this.className.replace(new RegExp(" iehover\\b"), ""); } } } if (window.attachEvent) window.attachEvent("onload", stuHover);
</script>
<span class="preload1"></span><span class="preload2"></span>
<?php 
$sqlReti=mysql_query("select RetiStatus,RetiDate from hrm_employee where EmployeeID=".$EmployeeId, $con); $resReti=mysql_fetch_assoc($sqlReti);
$sqlMK=mysql_query("select * from hrm_employee_key where CompanyId=".$CompanyId, $con); $SNo=1; $resMK=mysql_fetch_assoc($sqlMK); 
$sqlCer=mysql_query("select * from hrm_employee where EmployeeId=".$EmployeeId, $con); $resCer=mysql_fetch_assoc($sqlCer);
$Dept=mysql_query("select DepartmentId from hrm_employee_general where EmployeeId=".$EmployeeId, $con); $resDept=mysql_fetch_assoc($Dept); $DepartmentId=$resDept['DepartmentId'];
$sqlApp=mysql_query("select * from hrm_employee_reporting where AppraiserId=".$EmployeeId, $con); $rowApp=mysql_num_rows($sqlApp); 
$sqlHod=mysql_query("select * from hrm_employee_reporting where HodId=".$EmployeeId, $con); $rowHod=mysql_num_rows($sqlHod);
$sqlResig=mysql_query("select EmpSepId from hrm_employee_separation where EmployeeID=".$EmployeeId." AND HR_Approved='Y'", $con); $rowResig=mysql_num_rows($sqlResig);
$sqlContt=mysql_query("select Emg_Contact1 from hrm_employee_contact where EmployeeID=".$EmployeeId, $con); $resContt=mysql_fetch_assoc($sqlContt);
$sqlInvSb=mysql_query("select OpenYN from hrm_investdecl_setting_submission where CompanyId=".$CompanyId, $con); $resInvSb=mysql_fetch_assoc($sqlInvSb);

$sqlps2=mysql_query("select * from hrm_employee_procertify_setting where CompanyId=".$CompanyId, $con); $resps2=mysql_fetch_array($sqlps2);
if($resps2['Open']=='Y'){ $sqlpse=mysql_query("select * from hrm_employee_procertify_noc where EmployeeID=".$EmployeeId." AND Month=".$resps2['Month']." AND Year=".$resps2['Year'], $con); $rowpse=mysql_num_rows($sqlpse); $respse=mysql_fetch_array($sqlpse); } 

if(($_SESSION['EmpType']=='E' OR $_SESSION['EmpType']=='M') AND $_SESSION['EmpStatus']=='A'){ ?>
<ul id="nav">

 <li class="top"><?php if($_SESSION['login']=true){echo '<img src="../images/VNR_ico.png" style="height:33px;width:30px;" border="0">';} ?></li>
 <li class="top"><a href="Index.php?log=<?php echo $_SESSION['logCheckEmp']; ?>" class="top_link"><span>Home</span></a></li>
 
<?php if($rowResig==0){ /******************** Check Resignation Open 11 **********************/ ?>
 <?php if($resMK['Profile']=='Y'){ ?><li class="top"><a href="Profile.php?C=G" class="top_link"><span>Profile</span></a></li>
 <?php } else { ?><li class="top"><a href="#" class="top_link"><span>Profile</span></a></li><?php } ?>

<?php if($resCer['ProfileCertify']=='Y' OR $EmployeeId==223 OR $EmployeeId==224 OR $EmployeeId==233 OR $EmployeeId==234 OR $EmployeeId==235 OR $EmployeeId==259 OR $EmployeeId==260 OR $CompanyId==2 OR $CompanyId==3) {  //********* Check Certify 11 OPEN *********/ ?>
<?php if(($resps2['Open']=='Y' AND $respse['ProfileCertify']=='Y') OR $resps2['Open']=='N' OR $EmployeeId==223 OR $EmployeeId==224 OR $EmployeeId==233 OR $EmployeeId==234 OR $EmployeeId==235 OR $EmployeeId==259 OR $EmployeeId==260 OR $CompanyId==2 OR $CompanyId==3) {  //********* Check Profile Certify-BB 11 OPEN *********/ ?>

<?php //if(($resContt['Emg_Contact1']!='' AND $resContt['Emg_Contact1']!=0) OR ($EmployeeId==6 OR $EmployeeId==7 OR $EmployeeId==51 OR $EmployeeId==223 OR $EmployeeId==224 OR $EmployeeId==233 OR $EmployeeId==234 OR $EmployeeId==235 OR $EmployeeId==259 OR $EmployeeId==260 OR $CompanyId==2 OR $CompanyId==3)){ //********* Check Update Emegency Contact Open 11 **********// ?>	

 <?php if($resMK['Att']=='Y'){ ?><li class="top"><a href="MyAtt.php?m=<?php echo date("m"); ?>&ee=rtr&w=123&d=200&vt=t@t" class="top_link"><span>Attendance</span></a></li>
 <?php } else { ?><li class="top"><a href="#" class="top_link"><span>Attendance</span></a></li><?php } ?>
 <li class="top"><a href="#nogo22" class="top_link"><span class="down">Leave</span></a>
  <ul class="sub">
   <?php if($resMK['LV']=='Y' OR $EmployeeId==169){ ?><li><a href="ApplyLeave.php">My Leave</a></li><?php } else { ?><li><a href="#">My Leave</a></li><?php } ?>
   <?php if($resMK['Holiday']=='Y'){ ?><li><a href="PaidHoliday.php">Holiday List</a></li><?php } else { ?><li><a href="#">Holiday List</a></li><?php } ?>
   </ul>
 </li>
 <li class="top"><a href="Indexpms.php" class="top_link"><span>PMS</span></a></li>
 <?php if(date("m")==01){$Mpay=12;}else{$Mpay=date("m")-1;} ?>
 <?php if($resReti['RetiStatus']=='N'){	/* Start */?>
 <li class="top"><a href="#nogo22" class="top_link"><span class="down">Salary</span></a>
   <ul class="sub">
    <?php if($resMK['Ctc']=='Y' AND $EmployeeId!=279){ ?><li><a href="MyCtc.php">CTC</a></li><?php } else { ?><li><a href="#">CTC</a></li><?php } ?>
	<?php if($resMK['Elig']=='Y' AND $EmployeeId!=279){ ?><li><a href="MyElig.php">Eligibility</a></li><?php } else { ?><li><a href="#">Eligibility</a></li><?php } ?>
	<?php if($resMK['Payslip']=='Y' OR $resDept['DepartmentId']==1 OR $EmployeeId==169){ ?><li><a href="PaySlip.php?act=true&mm=sas&ask=false&ww=rightProtect&we=12345&mm=er4e&r=t5t%t5s&yy=eloi&gosto=false&rigt=checkessue&mailto=promt&wew=e%e@er%rdd=012&m=<?php echo $Mpay; ?>">PaySlip</a></li><?php } else { ?><li><a href="#">PaySlip</a></li><?php } ?>
	<?php if($resMK['InvestDecl']=='Y'){ ?><li><a href="InvestDecl.php">Investment Declaration</a></li>

<?php if($resInvSb['OpenYN']=='Y'){ ?><li><a href="InvestsDecl.php?act=true&mm=sas&ask=false&ww=rightProtect&we=12345&mm=er4e&r=t5t%t5s&yy=eloi&gosto=false&rigt=checkessue&mailto=promt&wew=e%e@er%rdd=012&m=<?php echo $Mpay; ?>">Investment Submission</a></li><?php } ?>

        <?php } else { ?><li><a href="#">Investment Declaration</a></li><?php } ?>


   </ul>
 </li>
<?php } /* Close */?>
<?php /* Asset Open Asset Open Asset Open Asset Open Asset Open Asset Open Asset Open ////////////////////////////////////*/ ?>
<?php //if($resDept['DepartmentId']==9 OR $resDept['DepartmentId']==1){ ?>
 <li class="top"><a href="#nogo22" class="top_link"><span class="down">Assets</span></a>
  <ul class="sub">
   <li><a href="MyAsset.php?act=true&mm=sas&ask=false&ww=rightProtect&we=12345&mm=er4e&r=t5t%t5s&yy=eloi&gosto=false&rigt=checkessue&mailto=promt&wew=e%e@er%rdd=012&page=1">My Asset</a></li>
   <li><a href="MyAssetReq.php?act=true&mm=sas&ask=false&ww=rightProtect&we=12345&mm=er4e&r=t5t%t5s&yy=eloi&gosto=false&rigt=checkessue&mailto=promt&wew=e%e@er%rdd=012&page=1">My Asset Request</a></li>					
<?php if(($rowApp>0 AND $rowHod>0) OR ($rowApp==0 AND $rowHod>0)){ ?><li><a href="MyAssetTeamReq.php?act=true&mm=sas&ask=false&ww=rightProtect&we=12345&mm=er4e&r=t5t%t5s&yy=eloi&gosto=false&rigt=checkessue&mailto=promt&wew=e%e@er%rdd=012&page=1">My Team Asset Request</a></li><?php } ?>
<?php if($rowApp>0 AND $rowHod==0){ ?><li><a href="MyAssetTeamrepReq.php?act=true&mm=sas&ask=false&ww=rightProtect&we=12345&mm=er4e&r=t5t%t5s&yy=eloi&gosto=false&rigt=checkessue&mailto=promt&wew=e%e@er%rdd=012&page=1">My Team Asset Request</a></li><?php } ?>
<?php $sqlcr=mysql_query("select * from hrm_asset_employee_request where FwdEmpId=".$EmployeeId, $con);  
	  $sqlcrd=mysql_query("select * from hrm_asset_employee_request where (FwdApprovalStatus=0 OR FwdApprovalStatus=1) AND FwdEmpId=".$EmployeeId, $con);
	  $rowcr=mysql_num_rows($sqlcr); $rowcrd=mysql_num_rows($sqlcrd); if($rowcr>0){?>			
   <li><a href="MyAssetFwdReq.php?act=true&mm=sas&ask=false&ww=rightProtect&we=12345&mm=er4e&r=t5t%t5s&yy=eloi&gosto=false&rigt=checkessue&mailto=promt&wew=e%e@er%rdd=012&page=1">Delegate Request&nbsp;<font style="color:#CCFF00; font-weight:bold;">(<?php echo $rowcrd; ?>)</font></a></li>	
<?php } ?>	
<?php $sqlIt=mysql_query("select * from hrm_asset_employee_request where (HODApprovalStatus=2 OR FwdApprovalStatus=2) AND (ITApprovalStatus=0 OR ITApprovalStatus=1)", $con);
      $rowIt=mysql_num_rows($sqlIt);
$sqlIT2=mysql_query("select EmployeeID,EmployeeID2 from hrm_asset_dept_access where DepartmentId=9", $con); $resIT2=mysql_fetch_assoc($sqlIT2); 
if($resIT2['EmployeeID']==$EmployeeId OR $resIT2['EmployeeID2']==$EmployeeId){ ?>
   <li style="text-align:center;"><b>IT</b></li>
   <li><a href="MyAssetNextitLevel.php?act=true&mm=sas&ask=false&ww=rightProtect&we=12345&mm=er4e&r=t5t%t5s&yy=eloi&gosto=false&rigt=checkessue&mailto=promt&wew=e%e@er%rdd=012&page=1&chk=<?php echo $resIT2['EmployeeID']; ?>&chk2=<?php echo $resIT2['EmployeeID2']; ?>">Pending Request&nbsp;<font style="color:#CCFF00; font-weight:bold;">(<?php echo $rowIt; ?>)</font></a></li>
   <li><a href="MyAssetNextitLevelAct.php?act=true&mm=sas&ask=false&ww=rightProtect&we=12345&mm=er4e&r=t5t%t5s&yy=eloi&gosto=false&rigt=checkessue&mailto=promt&wew=e%e@er%rdd=012&page=1&chk=<?php echo $resIT2['EmployeeID']; ?>&chk2=<?php echo $resIT2['EmployeeID2']; ?>">Approval - Rejected</a></li>
   <li><a href="MyAssetitemp.php?act=true&mm=sas&ask=false&ww=rightProtect&we=12345&mm=er4e&r=t5t%t5s&yy=eloi&gosto=false&rigt=checkessue&mailto=promt&wew=e%e@er%rdd=012&page=1&chk=<?php echo $resIT2['EmployeeID']; ?>&d=0&ss=89&f=0i&wer=true&c=<?php echo $CompanyId; ?>&chk2=<?php echo $resIT2['EmployeeID2']; ?>">Employee Asset</a></li>
   <li><a href="MyAssetitreports.php?act=true&mm=sas&ask=false&ww=rightProtect&we=12345&mm=er4e&r=t5t%t5s&yy=eloi&gosto=false&rigt=checkessue&mailto=promt&wew=e%e@er%rdd=012&page=1&chk=<?php echo $resIT2['EmployeeID']; ?>&allot=0&reqt=0&all=0&d=0&ast=0&yer=<?php echo $YearId; ?>&ss=89&f=0i&wer=true&c=<?php echo $CompanyId; ?>&chk2=<?php echo $resIT2['EmployeeID2']; ?>">Reports</a></li>
<?php } ?>
<?php $sqlAc=mysql_query("select * from hrm_asset_employee_request where ITApprovalStatus=2 AND (AccPayStatus=0 OR AccPayStatus=1)", $con); $rowAc=mysql_num_rows($sqlAc);
$sqlAc2=mysql_query("select EmployeeID,EmployeeID2 from hrm_asset_dept_access where DepartmentId=8", $con); $resAc2=mysql_fetch_assoc($sqlAc2); 
if($resAc2['EmployeeID']==$EmployeeId OR $resAc2['EmployeeID2']==$EmployeeId){ ?>
   <li style="text-align:center;"><b>Finance</b></li>
   <li><a href="MyAssetNextacLevel.php?act=true&mm=sas&ask=false&ww=rightProtect&we=12345&mm=er4e&r=t5t%t5s&yy=eloi&gosto=false&rigt=checkessue&mailto=promt&wew=e%e@er%rdd=012&page=1&chk=<?php echo $resAc2['EmployeeID']; ?>&chk2=<?php echo $resAc2['EmployeeID2']; ?>">Pending Request&nbsp;<font style="color:#CCFF00; font-weight:bold;">(<?php echo $rowAc; ?>)</font></a></li>
   <li><a href="MyAssetNextacLevelAct.php?act=true&mm=sas&ask=false&ww=rightProtect&we=12345&mm=er4e&r=t5t%t5s&yy=eloi&gosto=false&rigt=checkessue&mailto=promt&wew=e%e@er%rdd=012&page=1&chk=<?php echo $resAc2['EmployeeID']; ?>&chk2=<?php echo $resAc2['EmployeeID2']; ?>">Paid - Rejected</a></li>
   <li><a href="MyAssetacreports.php?act=true&mm=sas&ask=false&ww=rightProtect&we=12345&mm=er4e&r=t5t%t5s&yy=eloi&gosto=false&rigt=checkessue&mailto=promt&wew=e%e@er%rdd=012&page=1&chk=<?php echo $resAc2['EmployeeID']; ?>&allot=0&reqt=0&all=0&d=0&ast=0&yer=<?php echo $YearId; ?>&ss=89&f=0i&wer=true&c=<?php echo $CompanyId; ?>&chk2=<?php echo $resAc2['EmployeeID2']; ?>">Reports</a></li>
<?php } ?>
  </ul>
 </li>
<?php //} ?>
<?php /* Asset Close Asset Close Asset CLose Asset Close Asset Close Asset Close Asset CLose ////////////////////////////////////*/ ?>

<?php /* Query OPEN Query OPEN Query OPEN Query OPEN Query OPEN Query OPEN Query OPEN Query OPEN ////////////////////////////////////*/ ?>
<?php if($resMK['Query']=='Y'){ 
$CurrDate=date('Y-m-d h:i:s'); $sqlQuery = mysql_query("select * from hrm_employee_queryemp where Level_1ID=".$EmployeeId." AND (QStatus=0 OR QStatus=1) AND (Level_1QStatus=0 OR Level_1QStatus=1) AND QueryStatus_Emp!=3 AND QueryStatus_Emp!=4 AND '".$CurrDate."'>=Level_1QToDT AND '".$CurrDate."'<Level_2QToDT order by QueryDT DESC", $con); $rowQuery = mysql_num_rows($sqlQuery); //if($_SESSION['DepartmentId']==1 OR $EmployeeId==169) {?>
 <li class="top"><a href="#nogo22" class="top_link"><span class="down">Query</span></a>
  <ul class="sub">
	<li><a href="AskQuery.php?page=1">Post Query</a></li>
<?php if($_SESSION['EmpType']=='E'){ $sqlQuery = mysql_query("select * from hrm_employee_queryemp where Level_1ID=".$EmployeeId." AND (QStatus=0 OR QStatus=1) AND (Level_1QStatus=0 OR Level_1QStatus=1) AND QueryStatus_Emp!=3 AND QueryStatus_Emp!=4 AND '".$CurrDate."'>=Level_1QToDT AND '".$CurrDate."'<Level_2QToDT order by QueryDT DESC", $con); $rowQuery = mysql_num_rows($sqlQuery); ?><li><a href="EmpDraftQ.php?page=1">Employee Query&nbsp;&nbsp;<font style="font-weight:bold;color:#FF860D; font-size:12px;"><?php echo '('.$rowQuery.')'; ?></font></a></li><?php } elseif($_SESSION['EmpType']=='M'){ $sqlQuery = mysql_query("select * from hrm_employee_queryemp where Mngmt_ID=".$EmployeeId." AND (QStatus=0 OR QStatus=1) AND (Mngmt_QStatus=0 OR Mngmt_QStatus=1) AND QueryStatus_Emp!=3 AND QueryStatus_Emp!=4 AND '".$CurrDate."'>Mngmt_QToDT order by QueryDT DESC", $con); $rowQuery = mysql_num_rows($sqlQuery); ?><li><a href="MngmtEmpDraftQ.php?page=1">Employee Query&nbsp;&nbsp;<font style="font-weight:bold;color:#FF860D; font-size:12px;"><?php echo '('.$rowQuery.')'; ?></font></a></li><?php } ?>
<?php if($rowApp>0 AND $rowHod>0) { $sqlQA=mysql_query("select * from hrm_employee_queryemp where Level_2ID=".$EmployeeId." AND (QStatus=0 OR QStatus=1) AND (Level_2QStatus=0 OR Level_2QStatus=1) AND '".date('Y-m-d h:i:s')."'>=Level_2QToDT AND '".date('Y-m-d h:i:s')."'<Level_3QToDT", $con);  $rowQA=mysql_num_rows($sqlQA); 
$sqlQH=mysql_query("select * from hrm_employee_queryemp where Level_3ID=".$EmployeeId." AND (QStatus=0 OR QStatus=1) AND (Level_3QStatus=0 OR Level_3QStatus=1) AND '".date('Y-m-d h:i:s')."'>=Level_3QToDT AND '".date('Y-m-d h:i:s')."'<Mngmt_QToDT", $con);  $rowQH=mysql_num_rows($sqlQH); $QAH=$rowQA+$rowQH; } 
elseif($rowApp>0 AND $rowHod==0) { $sqlQA=mysql_query("select * from hrm_employee_queryemp where Level_2ID=".$EmployeeId." AND (QStatus=0 OR QStatus=1) AND (Level_2QStatus=0 OR Level_2QStatus=1) AND '".date('Y-m-d h:i:s')."'>=Level_2QToDT AND '".date('Y-m-d h:i:s')."'<Level_3QToDT", $con);  $rowQA=mysql_num_rows($sqlQA); }
elseif($rowApp==0 AND $rowHod>0) { $sqlQH=mysql_query("select * from hrm_employee_queryemp where Level_3ID=".$EmployeeId." AND (QStatus=0 OR QStatus=1) AND (Level_3QStatus=0 OR Level_3QStatus=1) AND '".date('Y-m-d h:i:s')."'>=Level_3QToDT AND '".date('Y-m-d h:i:s')."'<Mngmt_QToDT", $con);  $rowQH=mysql_num_rows($sqlQH); $QAH=$rowQA+$rowQH; }
?>
<?php if($rowApp>0 OR $rowHod>0){ ?>
    <li><a href="<?php if($rowApp>0 AND $rowHod>0){echo 'AppMyTeamDraftQ.php?page=1';} elseif($rowApp>0 AND $rowHod==0){echo 'AppMyTeamDraftQ.php?page=1';} elseif($rowApp==0 AND $rowHod>0){echo 'HodMyTeamDraftQ.php?page=1';} //MyTeamDraftQ.php?>">Escalated Query&nbsp;&nbsp;<font style="font-weight:bold;color:#FF860D; font-size:12px;">(<?php if($rowApp>0 AND $rowHod>0){echo $QAH;} elseif($rowApp>0 AND $rowHod==0){echo $rowQA;} elseif($rowApp==0 AND $rowHod>0){echo $rowQH;} ?>)</font></a></li>
    <li><a href="<?php if($rowApp>0 AND $rowHod>0){echo 'AppMyTeamPostQuery.php?page=1';} elseif($rowApp>0 AND $rowHod==0){echo 'AppMyTeamPostQuery.php?page=1';} elseif($rowApp==0 AND $rowHod>0){echo 'HodMyTeamPostQuery.php?page=1';} ?>">View Team Query</a></li>
<?php } ?>
    <li><a href="EmpQueryLog.php?page=1">Query Log</a></li>
  </ul>
 </li><?php } else { ?><li class="top"><a href="#" class="top_link"><span>Query</span></a></li><?php } ?>
<?php /* Query CLOSE Query CLOSE Query CLOSE Query CLOSE Query CLOSE Query CLOSE Query CLOSE Query CLOSE ////////////////////////////////////*/ ?>

<?php /* OPEN TEAMDETAILS OPEN TEAMDETAILS OPEN TEAMDETAILS OPEN TEAMDETAILS OPEN TEAMDETAILS OPEN TEAMDETAILS*************************** */ ?>
<?php if($rowApp>0 OR $rowHod>0) { ?>
<?php $CFromDate='2013-04-01'; $CToDate=date("Y").'-12-31';
  $sqlD_A=mysql_query("select * from hrm_employee_applyleave where Apply_SentToApp=".$EmployeeId." AND (LeaveStatus=0 OR LeaveStatus=1) AND (LeaveAppStatus=0 OR LeaveAppStatus=1) AND (Apply_Date>='".$CFromDate."' AND Apply_Date<='".$CToDate."') AND LeaveEmpCancelStatus='N'", $con); $rowDP_A=mysql_num_rows($sqlD_A);
  $sqlD_H=mysql_query("select * from hrm_employee_applyleave where Apply_SentToHOD=".$EmployeeId." AND (LeaveStatus=0 OR LeaveStatus=1) AND (LeaveHodStatus=0 OR LeaveHodStatus=1) AND (Apply_Date>='".$CFromDate."' AND Apply_Date<='".$CToDate."') AND Leave_Type='PL' AND LeaveEmpCancelStatus='N'", $con); $rowDP_H=mysql_num_rows($sqlD_H); 
  $sqlC_A=mysql_query("select * from hrm_employee_applyleave where Apply_SentToApp=".$EmployeeId." AND LeaveEmpCancelStatus='Y' AND LeaveCancelStatus='N' AND (Apply_Date>='".$CFromDate."' AND Apply_Date<='".$CToDate."')", $con); $rowC_A=mysql_num_rows($sqlC_A);
  $sqlC_H=mysql_query("select * from hrm_employee_applyleave where Apply_SentToHOD=".$EmployeeId." AND LeaveEmpCancelStatus='Y' AND LeaveCancelStatus='N' AND (Apply_Date>='".$CFromDate."' AND Apply_Date<='".$CToDate."')", $con); $rowC_H=mysql_num_rows($sqlC_H); //$AHL=$rowDP_A+$rowDP_H; ?> 	
	
 <li class="top"><a href="#nogo22" class="top_link"><span class="down">Team Details</span></a>
  <ul class="sub">
   <?php if($rowApp>0 AND $rowHod>0){?><li><a href="AppMyTeam.php">My Team</a></li><?php } elseif($rowApp>0 AND $rowHod==0) { ?> <li><a href="AppMyTeam.php">My Team</a></li><?php } elseif($rowApp==0 AND $rowHod>0){ ?> <li><a href="HodMyTeam.php">My Team</a></li><?php } ?>
   <li><a href="#" class="fly">Leave Application</a>
    <ul>
	<?php if($rowApp>0 AND $rowHod>0) { ?>
	<li><a href="DLeave.php">Draft/ Pending Leave&nbsp;&nbsp;<font style="font-weight:bold;color:#FF860D; font-size:12px;">(<?php if(($rowApp>0 AND $rowHod==0) OR ($rowApp>0 AND $rowHod>0)){echo $rowDP_A;} if($rowApp==0 AND $rowHod>0){echo $rowDP_H;} ?>)</font></a></li>
	<li><a href="ALeave.php">Approved Leave</a></li>
	<li><a href="DisLeave.php">Dis-approved Leave</a></li> 
	<li><a href="CLeave.php">Cancelled Leave&nbsp;&nbsp;<font style="font-weight:bold;color:#FF860D; font-size:12px;"><?php echo '('.$rowC_A.')'; ?></font></a></li> 
	<?php } if($rowApp>0 AND $rowHod==0) { ?>
	<li><a href="DLeave.php">Draft/ Pending Leave&nbsp;&nbsp;<font style="font-weight:bold;color:#FF860D; font-size:12px;"><?php echo '('.$rowDP_A.')'; ?></a></li>
	<li><a href="ALeave.php">Approved Leave</a></li>
	<li><a href="DisLeave.php">Dis-approved Leave</a></li>
	<li><a href="CLeave.php">Cancelled Leave&nbsp;&nbsp;<font style="font-weight:bold;color:#FF860D; font-size:12px;"><?php echo '('.$rowC_A.')'; ?></font></a></li> 
	<?php } if($rowApp==0 AND $rowHod>0) { ?>
	<li><a href="DLeaveToHOD.php">Draft/ Pending Leave&nbsp;&nbsp;<font style="font-weight:bold;color:#FF860D; font-size:12px;"><?php echo '('.$rowDP_H.')'; ?></a></li>
	<li><a href="ALeaveToHOD.php">Approved Leave</a></li>
	<li><a href="DisLeaveToHOD.php">Dis-approved Leave</a></li>
	<li><a href="CLeaveToHOD.php">Cancelled Leave&nbsp;&nbsp;<font style="font-weight:bold;color:#FF860D; font-size:12px;"><?php echo '('.$rowC_H.')'; ?></font></a></li>
	<?php } ?>
	</ul>
   </li>	
<?php if($rowApp>0 AND $rowHod>0) { ?> <li><a href="AttMyTeam.php?m=<?php echo date("m"); ?>&Y=<?php echo date("Y"); ?>&e=4e&w=234&tt=10234&a=f&e=4e2&e=4e&w=234&tt=110022344&retd=ee&wwrew=t%T@sed818&d=101">Attendance Reports</a></li><?php } ?>
<?php if($rowApp>0 AND $rowHod==0) { ?> <li><a href="AttMyTeam.php?m=<?php echo date("m"); ?>&Y=<?php echo date("Y"); ?>&e=4e&w=234&tt=10234&a=f&e=4e2&e=4e&w=234&tt=110022344&retd=ee&wwrew=t%T@sed818&d=101">Attendance Reports</a></li><?php } ?>
<?php if($rowApp==0 AND $rowHod>0) { ?> <li><a href="AttHodMyTeam.php?m=<?php echo date("m"); ?>&Y=<?php echo date("Y"); ?>&e=4e&w=234&tt=10234&a=f&e=4e2&e=4e&w=234&tt=110022344&retd=ee&wwrew=t%T@sed818&d=101">Attendance Reports</a></li><?php } ?>
<?php $sqlDept=mysql_query("select DepartmentId from hrm_employee_general where EmployeeID=".$EmployeeId, $con); $resDept=mysql_fetch_assoc($sqlDept);
if($resDept['DepartmentId']==4 OR $resDept['DepartmentId']==6 OR $resDept['DepartmentId']==11){ ?>
<?php if($rowApp>0 AND $rowHod>0) { ?> <li><a href="AttAppMorEve.php?m=<?php echo date("m"); ?>&da=<?php echo date("d"); ?>&Y=<?php echo date("Y"); ?>&e=4e&w=234&tt=10234&a=f&e=4e2&e=4e&w=234&tt=110022344&retd=ee&wwrew=t%T@sed818&d=101">Morning-Evening Reports</a></li><?php } ?>
<?php if($rowApp>0 AND $rowHod==0) { ?> <li><a href="AttAppMorEve.php?m=<?php echo date("m"); ?>&da=<?php echo date("d"); ?>&Y=<?php echo date("Y"); ?>&e=4e&w=234&tt=10234&a=f&e=4e2&e=4e&w=234&tt=110022344&retd=ee&wwrew=t%T@sed818&d=101">Morning-Evening Reports</a></li><?php } ?>
<?php if($rowApp==0 AND $rowHod>0) { ?> <li><a href="AttHodMorEve.php?m=<?php echo date("m"); ?>&da=<?php echo date("d"); ?>&Y=<?php echo date("Y"); ?>&e=4e&w=234&tt=10234&a=f&e=4e2&e=4e&w=234&tt=110022344&retd=ee&wwrew=t%T@sed818&d=101">Morning-Evening Reports</a></li><?php } ?>
<?php } ?>
<?php if($rowApp>0 AND $rowHod>0) { ?> <li><a href="EmpPendingConfLetter.php">Pending Confirmation</a></li><?php } ?>
<?php if($rowApp>0 AND $rowHod==0) { ?> <li><a href="EmpPendingConfLetter.php">Pending Confirmation</a></li><?php } ?>
<?php if($rowApp==0 AND $rowHod>0) { ?> <li><a href="EmpHodPendingConfLetter.php">>Confirmation Form</a></li><?php } ?>
  </ul>
 </li>
<?php } ?>
<?php /* CLOSE TEAMDETAILS CLOSE TEAMDETAILS CLOSE TEAMDETAILS CLOSE TEAMDETAILS CLOSE TEAMDETAILS CLOSE TEAMDETAILS CLOSE TEAMDETAILS */ ?>
<?php //} //********* Check Update Emegency Contact Open 11 **********// ?>
<?php } //******** Check Profil Certify-BB 11 Close*************************//?> 
<?php } //********* Check Certify 11 CLOSE ********** ?>
<?php } /******************** Check Resignation Close 11 **********************/?>	   

<?php /* OPEN SEPARATION OPEN SEPARATION OPEN SEPARATION OPEN SEPARATION OPEN SEPARATION OPEN SEPARATION **********************************/ ?>
<?php if($resCer['ProfileCertify']=='Y' OR $EmployeeId==223 OR $EmployeeId==224 OR $EmployeeId==233 OR $EmployeeId==234 OR $EmployeeId==235 OR $EmployeeId==259 OR $EmployeeId==260) {  //********* Check Certify 22 OPEN *********/ ?>
<?php if(($resps2['Open']=='Y' AND $respse['ProfileCertify']=='Y') OR $resps2['Open']=='N' OR $EmployeeId==223 OR $EmployeeId==224 OR $EmployeeId==233 OR $EmployeeId==234 OR $EmployeeId==235 OR $EmployeeId==259 OR $EmployeeId==260) {  //********* Check Profile Certify-BB 22 OPEN *********/ ?>
<?php //if(($resContt['Emg_Contact1']!='' AND $resContt['Emg_Contact1']!=0) OR ($EmployeeId==6 OR $EmployeeId==7 OR $EmployeeId==51 OR $EmployeeId==223 OR $EmployeeId==224 OR $EmployeeId==233 OR $EmployeeId==234 OR $EmployeeId==235 OR $EmployeeId==259 OR $EmployeeId==260)){ //********* Check Update Emegency Contact Open 22 **********// ?>	

 <li class="top"><a href="#nogo22" class="top_link"><span class="down">Separation</span></a>
  <ul class="sub">
<?php if($resReti['RetiStatus']=='N'){	/* Start */?>
   <li><a href="EmpSprtion.php?e=4e&w=234&y=10234&a=f&e=4e2&e=4e&w=234&y=110022344&retd=ee&wwrew=t%T@sed818&d=101">Resignation Form</a></li>
<?php $sqlch=mysql_query("select * from hrm_employee_separation where EmployeeID=".$EmployeeId, $con); $rowch=mysql_num_rows($sqlch); 
   if($rowch>0){ $resch=mysql_fetch_assoc($sqlch); if($resch['ResignationStatus']==4){ ?><li><a href="EmpSprtion.php?e=4e&w=234&y=10234&a=e&e=4e2&e=4e&w=234&y=110022344&retd=ee&wwrew=t%T@sed818&d=101">Exit-interview</a></li><?php } 
   if($resch['HR_Approved']=='Y') { ?><li><a href="EmpSprtion.php?e=4e&w=234&y=10234&a=c&e=4e2&e=4e&w=234&y=110022344&retd=ee&wwrew=t%T@sed818&d=101">Cancel Resignation</a></li><?php } ?>
<?php } ?>
<?php } /* Close */ ?>	
<?php if($rowApp>0 OR $rowHod>0) { ?>
 <li><a href="#" class="fly">Team Resignation</a>
   <ul>
	<li><a href="TeamSprtion.php?e=4e&w=234&y=10234&a=<?php if(($rowApp>0 AND $rowHod>0) OR ($rowApp>0 AND $rowHod==0)){ echo 'app';}elseif($rowApp==0 AND $rowHod>0){ echo 'hod';} ?>&e=4e2&e=4e&w=234&y=110022344&retd=ee&rr=09drfGe&S=eewwqq&wwrew=t%T@sed818&d=101">Apply Resignation</a></li>
	<li><a href="TeamCancelSprtion.php?e=4e&w=234&y=10234&a=<?php if(($rowApp>0 AND $rowHod>0) OR ($rowApp>0 AND $rowHod==0)){ echo 'app';}elseif($rowApp==0 AND $rowHod>0){ echo 'hod';} ?>&e=4e2&e=4e&w=234&y=110022344&retd=ee&rr=09drfGe&S=eewwqq&wwrew=t%T@sed818&d=101">Apply Cancel Resignation</a></li>
   </ul>   
  </li>
<?php } ?>   
<?php if($rowApp>0) {?>
  <li><a href="EmpNOCSeparation.php?e=4e&w=234&y=10234&e=4e2&e=4e&w=234&y=110022344&retd=ee&rr=09drfGe&S=eewwqq&wwrew=t%T@sed818&d=101">Reporting Clearance</a></li><?php } ?>
<?php $sqlLog=mysql_query("select EmpSepId from hrm_employee_separation where Log_EmployeeID=".$EmployeeId." AND Log_NOC='N'", $con); 
      $rowLog=mysql_num_rows($sqlLog); if($rowLog>0){ $resLog=mysql_fetch_assoc($sqlLog); ?>			
  <li><a href="EmpNOCLogSeparation.php?e=4e&w=234&y=10234&e=4e2&e=4e&w=234&y=110022344&retd=ee&rr=09drfGe&S=eewwqq&wwrew=t%T@sed818&d=101">Logistic Clearance</a></li>
<?php } ?>						
<?php $sqlNoc=mysql_query("select DepartmentId from hrm_employee_separation_nocdept_emp where EmployeeID=".$EmployeeId." AND Status='A'", $con); $rowNoc=mysql_num_rows($sqlNoc); 
      if($rowNoc>0){ $resNoc=mysql_fetch_assoc($sqlNoc); ?>			
  <li><a href="EmpDeptNOC.php?e=4e&w=234&d=<?php echo $resNoc['DepartmentId']; ?>&y=10234&e=4e2&e=4e&w=234&y=110022344&retd=ee&rr=09drfGe&S=eewwqq&wwrew=t%T@sed818&ede=101">Department Clearance</a></li>
<?php } ?>		
  </ul>
 </li>

<?php //} //********* Check Update Emegency Contact Open 22 **********// ?> 
<?php } //********* Check Profile Certify-BB 22 CLOSE *********/ ?>
<?php } //********* Check Certify 22 CLOSE ********** ?>
<?php /* CLOSE SEPARATION CLOSE SEPARATION CLOSE SEPARATION CLOSE SEPARATION CLOSE SEPARATION CLOSE SEPARATION **********************************/ ?>

 
<?php if($rowResig==0){ /******************** Check Resignation Open 22 **********************/ ?>
<?php if($resCer['ProfileCertify']=='Y' OR $EmployeeId==223 OR $EmployeeId==224 OR $EmployeeId==233 OR $EmployeeId==234 OR $EmployeeId==235 OR $EmployeeId==259 OR $EmployeeId==260) {  //********* Check Certify 22 OPEN *********/ ?>
<?php if(($resps2['Open']=='Y' AND $respse['ProfileCertify']=='Y') OR $resps2['Open']=='N' OR $EmployeeId==223 OR $EmployeeId==224 OR $EmployeeId==233 OR $EmployeeId==234 OR $EmployeeId==235 OR $EmployeeId==259 OR $EmployeeId==260) {  //********* Check Profile Certify-BB 22 OPEN *********/ ?>
<?php //if(($resContt['Emg_Contact1']!='' AND $resContt['Emg_Contact1']!=0) OR ($EmployeeId==6 OR $EmployeeId==7 OR $EmployeeId==51 OR $EmployeeId==223 OR $EmployeeId==224 OR $EmployeeId==233 OR $EmployeeId==234 OR $EmployeeId==235 OR $EmployeeId==259 OR $EmployeeId==260)){ //********* Check Update Emegency Contact Open 22 **********// ?>	

<?php /* OPEN SALESPLAN OPEN SALESPLAN OPEN SALESPLAN OPEN SALESPLAN OPEN SALESPLAN OPEN SALESPLAN OPEN SALESPLAN OPEN SALESPLAN **************/ ?>
<script language="javascript" type="text/javascript">
function OpenSEmpPlan(ei)
{window.open("sp/employee/Index.php?ei="+ei+"&Event=Edit&oo=we&p=g&ok=true&rslt=y&pp=qw_res##ius&log=true", '_blank'); window.focus();}
function OpenSUserPlan(ei)
{window.open("sp/user/Index.php?ei="+ei+"&Event=Edit&oo=we&p=g&ok=true&rslt=y&pp=qw_res##ius&log=true", '_blank'); window.focus();}
</script>
<?php $sdept=mysql_query("select DepartmentId from hrm_employee_general where EmployeeID=".$EmployeeId, $con); $rdept=mysql_fetch_assoc($sdept);
      $Lch=mysql_query("select * from hrm_sales_useremp where UserEmpId=".$EmployeeId." AND Status='A'", $con); $rowLch=mysql_num_rows($Lch); ?>
<?php if($rdept['DepartmentId']==7 AND $rowLch>0){ ?>
 <li class="top"><a href="#" onclick="OpenSUserPlan(<?php echo $EmployeeId; ?>)" class="top_link">Sales Plan</a></li>
 <?php } elseif($rdept['DepartmentId']==6 AND $EmployeeId!=51){ ?>
 <li class="top"><a href="#" onclick="OpenSEmpPlan(<?php echo $EmployeeId; ?>)" class="top_link">Sales Plan</a></li> 
 <?php } elseif($rdept['DepartmentId']==6 AND $EmployeeId==51 AND $rowLch>0){ ?> 
 <li class="top"><a href="#nogo22" class="top_link"><span class="down">Sales Plan</span></a>
  <ul class="sub">
   <li><a href="#" onclick="OpenSUserPlan(<?php echo $EmployeeId; ?>)">User</a></li>
   <li><a href="#" onclick="OpenSEmpPlan(<?php echo $EmployeeId; ?>)">Employee</a></li>
  </ul>
 </li>
<?php } elseif(($EmployeeId==223 OR $EmployeeId==224 OR $EmployeeId==169) AND $rowLch>0) { ?>
 <li class="top"><a href="#" onclick="OpenSUserPlan(<?php echo $EmployeeId; ?>)" class="top_link">Sales Plan</a></li> 
<?php } ?>
<?php /* CLOSE SALESPLAN CLOSE SALESPLAN CLOSE SALESPLAN CLOSE SALESPLAN CLOSE SALESPLAN CLOSE SALESPLAN CLOSE SALESPLAN CLOSE SALESPLAN **************/ ?>

<?php //} //********* Check Update Emegency Contact Open 22 **********// ?> 
<?php } //********* Check Profile Certify-BB 22 CLOSE *********/ ?>
<?php } //********* Check Certify 22 CLOSE ********** ?>
<?php } /******************** Check Resignation Close 22 **********************/?>

<?php if($EmployeeId==142 OR $EmployeeId==169 OR $EmployeeId==223) { ?>
<li class="top"><a href="MyTeamCost.php?YI=<?php echo $YearId; ?>&action=Over" class="top_link">Cost Of Team</a></li>
<?php } ?>
<?php if($EmployeeId==371){ ?>
<script language="javascript" type="text/javascript">
function OpenSEmpPlan(ei)
{window.open("sp/employee/Index.php?ei="+ei+"&Event=Edit&oo=we&p=g&ok=true&rslt=y&pp=qw_res##ius&log=true", '_blank'); window.focus();}
function OpenSUserPlan(ei)
{window.open("sp/user/Index.php?ei="+ei+"&Event=Edit&oo=we&p=g&ok=true&rslt=y&pp=qw_res##ius&log=true", '_blank'); window.focus();}
</script>

<li class="top"><a href="#" onclick="OpenSEmpPlan(<?php echo 371; ?>)" class="top_link">Sales Plan</a></li>
<?php } ?>
 
</ul>
<?php } ?>