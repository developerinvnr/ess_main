<?php session_start();
if($_SESSION['login'] = true){require_once('../AdminUser/config/config.php');}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('../AdminUser/logcheck.php');
if($_SESSION['logCheckEmp']!=$logemp){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('EmpMenuSession.php');}else{header('Location:../index.php');}
//include("SetKraPmsy.php");
?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<link type="text/css" href="css/mycss.css" rel="stylesheet"/>
<script src="../AdminUser/js/jquery-1.9.1.js"></script>
<script type="text/javascript" src="../AdminUser/js/jquery.freezeheader.js"></script>
<script>$(document).ready(function () { $("#table1").freezeHeader({ 'height':'500px' }); })</script>
<script type="text/javascript" language="javascript">
function ExportReport(v,v1,v2) 
{ window.open ("HodExportPmsIncReport.php?e="+v+"&y="+v1+"&c="+v2,"Export","menubar=yes,scrollbars=yes,resizable=1,width=20,height=20");}
</script>
</head>
<body class="body"> 
<table class="table">
<tr><td><table class="menutable"><tr><td><?php if($_SESSION['login'] = true){ require_once("EMenu.php"); } ?></td></tr></table></td></tr>
<tr>
 <td>
 <table width="100%" style="margin-top:0px;">
  <tr><td valign="top"><?php if($_SESSION['login'] = true){ require_once("EWelcome.php"); } ?></td></tr>
  <tr>
   <td valign="top" style="background-image:url(images/pmsback.png);width:100%;">
   <table border="0" style="width:100%;height:500px;float:none;" cellpadding="0">
   <tr>
    <td valign="top" style="width:100%;">      
    <table border="0" id="Activity" style="width:100%;">
	<tr>
     <td style="width:100%;" valign="top">
	 <table border="0" style="width:100%;">
<?php //*************************************** Start ********************************************* ?>	
<?php //*************************************** Start ********************************************* ?>
					
<tr>
 <td>	 
 <table style="width:100%;">
<!--  Head Parts Open Open Open  --> 
<!--  Head Parts Open Open Open  --> 
 <tr>
  <td>
   <table>
    <tr>
<?php if($_SESSION['EmpType']=='E'){ ?>
<td align="center" valign="top"><a href="pms.php?log=<?php echo $_SESSION['logCheckEmp']; ?>&ee=0&aa=1&rr=1&hh=1&sh=1&hp=1&rr2=1&fr=1&kr=1&fq=1&prt=1&msg=1&pd=0&mt=1&mts=1&scr=1&prom=1&inc=1&incr=1&pmsr=1&rg=1&h=1&fachiv=1&fa=1&fb=1&ffeedb=1&org=1"><img id="Img_emp1" style="display:<?php if($_REQUEST['ee']==1){echo 'block';}else{echo 'none';} ?>;" src="images/emp1.png" border="0"/></a></td>

<?php } if($_SESSION['BtnApp']>0) { ?>
<td align="center" valign="top"><a href="ManagerPms.php?ee=1&aa=0&rr=1&rr2=1&hh=1&sh=1&hp=1&fr=1&kr=1&fq=1&prt=1&msg=1&pd=1&mt=0&mts=1&scr=1&prom=1&inc=1&incr=1&pmsr=1&rg=1&h=1&fachiv=1&fa=1&fb=1&ffeedb=1&org=1"><img id="Img_manager1" style="display:<?php if($_REQUEST['aa']==1){echo 'block';}else{echo 'none';} ?>;" src="images/manager1.png" border="0"/></a></td></td>
		   
<?php } if($_SESSION['BtnRev']>0) { ?>
<td align="center" valign="top"><a href="HodPms.php?ee=1&aa=1&rr2=1&rr=0&hh=1&sh=1&hp=1&fr=1&kr=1&fq=1&prt=1&msg=1&pd=1&mt=0&mts=1&scr=1&prom=1&inc=1&incr=1&pmsr=1&rg=1&h=1&fachiv=1&fa=1&fb=1&ffeedb=1&org=1"><img id="Img_hod1" src="images/hod1.png" border="0"/></a></td>

<?php } if($_SESSION['BtnRev2']>0) { ?>
<td align="center" valign="top"><a href="Rev2HodPms.php?ee=1&rr2=0&aa=1&rr=1&hh=0&sh=1&hp=1&fr=1&kr=1&fq=1&prt=1&msg=1&pd=1&mt=1&mts=0&scr=1&prom=1&inc=1&incr=1&pmsr=1&rg=1&h=1&fachiv=1&fa=1&fb=1&ffeedb=1&org=1"><img id="Img_hod1" src="images/RevHod1.png" border="0"/></a></td>	
		   
<?php } if($_SESSION['BtnHod']>0) { ?>
<td align="center" valign="top"><img id="Img_hod1" src="images/m.png" border="0"/></td><?php } ?>

<?php /******************** Msg Msg Msg Msg Msg Msg Msg Msg Msg Msg Msg Msg OPEN************/ ?>
<?php if($_SESSION['eMsg']=='Y'){ ?>
 <td>
 <?php $CuDate=date("Y-m-d"); if(($_SESSION['eAppform']=='Y' OR $_SESSION['eMidform']=='Y') AND $CuDate>=$_SESSION['hFrom'] AND $CuDate<=$_SESSION['hTo'] AND $_SESSION['hSts']=='A'){ $LastDate=$_SESSION['hTo']; $CurrentDate=date("Y-m-d");
		 $diff = abs(strtotime($LastDate) - strtotime($CurrentDate));
         $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/(60*60*24)); ?>
 <font class="msg_r"><font color="#00366C">&nbsp;&nbsp;PMS :</font><span class="blink_me"> <?php echo $days;?> Days Remaining! Last date : <?php echo date("d-F",strtotime($_SESSION['hTo'])); ?> </span></font>
 <?php } ?>
 </td>
<?php } ?>
<?php /******************** Msg Msg Msg Msg Msg Msg Msg Msg Msg Msg Msg Msg CLOSE************/ ?>
 
	</tr>
   </table>
  </td>
 </tr>
 
 <tr><td style="vertical-align:top;width:100%;"><?php include("SetKraPmsmh.php"); ?></td></tr>
<!--  Head Parts Close Close Close  --> 
<!--  Head Parts Close Close Close  --> 
 
  <tr>
    <td style="width:100%;">
	  <table border="0" style="width:100%;">
	    <tr>
        <?php /****************************************** Form Start **************************/ ?>
		<?php /****************************************** Form Start **************************/ ?>
				
<input type="hidden" id="FormAMin5" value="" /><input type="hidden" id="FormAMax5" value="" />
<input type="hidden" id="FormBMin5" value="" /><input type="hidden" id="FormBMax5" value="" />
<input type="hidden" id="YearId" value="<?php echo $YearId; ?>" />
<input type="hidden" id="EmployeeId" value="<?php echo $EmployeeId; ?>" />
<input type="hidden" id="EmpId" value="" /> <input type="hidden" id="PmsId" value="" />	
<?php /***************** PersonalDetails **************************/ ?>



 		  <td id="TeamDetails" style="display:block;width:100%;">
		  <table border="0" style="width:100%;">
<tr>
 <td style="width:100%;">
  <table border="0" style="width:100%;" cellspacing="0">
   <tr>
    <td class="formh" style="width:220px;">(<i>Team Increment Reports</i>) :&nbsp;</td>
	<td style="font-family:Times New Roman;font-size:15px;font-weight:bold;">
	<?php /*<font color="#FFFF9D">PGSPM :&nbsp;</font><font color="#004600">Proposed Gross Salary PM,&nbsp;&nbsp;</font>
	<font color="#FFFF9D">PIS :&nbsp;</font><font color="#004600">Proposed Increment Salary,&nbsp;&nbsp;</font>
	<font color="#FFFF9D">SC :&nbsp;</font><font color="#004600">Salary Correction,&nbsp;&nbsp;</font>
	<font color="#FFFF9D">TIGSPM :&nbsp;</font><font color="#004600">Total Increment Gross Salary PM,&nbsp;&nbsp;</font>*/ ?>
    </td>
   </tr>
  </table>
 </td>
</tr>
<?php

//$SqlCount=mysql_query("select SUM(EmpCurrGrossPM) as Old_GROSS, SUM(EmpCurrIncentivePM) as Old_Inc, SUM(Hod_ProIncSalary) as H_IS, SUM(Hod_ProCorrSalary) as H_SC, SUM(Hod_Incentive) as H_Inc, SUM(Hod_IncNetMonthalySalary) as Tinc from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.HOD_EmployeeID=".$EmployeeId, $con); 


$SqlCount=mysql_query("select SUM(EmpCurrCtc) as Old_GROSS, SUM(Hod_ProIncCTC) as H_IS, SUM(Hod_ProCorrCTC) as H_SC, SUM(Hod_IncNetCTC) as Tinc from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.HOD_EmployeeID=".$EmployeeId, $con); 
$sno=1; $ResCount=mysql_fetch_array($SqlCount);

$TotEGross=$ResCount['Old_GROSS']; //Total Old Gross //+$ResCount['Old_Inc']
$One=($TotEGross*1)/100; $OnePerPre=number_format($One, 2, '.', ''); //One Percent from Old Gross
$TotHIS=$ResCount['H_IS']+$ResCount['H_SC']; //Total Proposed Increment  //+$ResCount['H_Inc']

//if($TotHIS>$TotEGross){ $Diff=$TotHIS-$TotEGross; }else{ $Diff=$TotEGross-$TotHIS; } //Total Increment
$Diff=$ResCount['Tinc']; //OR

$TotOldGrossPM=number_format($TotEGross, 2, '.', '');
$TotNewGrossPM=number_format($TotHIS, 2, '.', '');
$Increment=number_format($Diff, 2, '.', '');
$IncPer=$Diff/$OnePerPre; $PerInc=number_format($IncPer, 2, '.', ''); //Total % Increment
$TotalPerPIS=($ResCount['H_IS'])/$OnePerPre; $TotalTPerPIS=number_format($TotalPerPIS, 2, '.', ''); //$ResCount['H_Inc']
$TotalPerPSC=$ResCount['H_SC']/$OnePerPre; $TotalTPerPSC=number_format($TotalPerPSC, 2, '.', ''); //Total % PSC
?>
<tr>
 <td style="width:100%;background-color:#FFFF91;">
  <table border="0" style="width:100%;">
   <tr>
    <td class="tdl" style="width:100%;vertical-align:bottom;font-size:15px;">
	&nbsp;&nbsp;
	
	<?php /*<u>Total Previous CTC</u>&nbsp;:&nbsp;<input class="rinput" style="width:100px;" id="MyTTPreGross" value="<?php echo $TotOldGrossPM; ?>" />&nbsp;&nbsp; */ ?>
	
	&nbsp;&nbsp;<u>Total Proposed CTC</u>&nbsp;:&nbsp;<input class="rinput" style="width:100px;" id="MyTTProGross" value="<?php echo $TotNewGrossPM; ?>" />&nbsp;&nbsp;&nbsp;&nbsp;<u>Total Increment</u>&nbsp;:&nbsp;<input class="rinput" style="width:100px;" id="MyTTIncGross" value="<?php echo $Increment; ?>"/>&nbsp;<input class="rinput" style="width:60px;" id="MyTTIncGrossPercent" value="<?php echo $PerInc; ?>"/>&nbsp;%&nbsp;&nbsp;&nbsp;&nbsp;<u>Total SC</u>&nbsp;:&nbsp;<input class="rinput" style="width:100px;" value="<?php echo $ResCount['H_SC']; ?>"/>&nbsp;<input class="rinput" style="width:60px;" id="MyTTSCPercent" value="<?php echo $TotalTPerPSC; ?>" />&nbsp;%
	&nbsp;&nbsp;&nbsp;&nbsp;
	
	<?php /*<a href="#" onClick="ExportReport(<?php echo $EmployeeId.','.$_SESSION['PmsYId'].','.$CompanyId; ?>)">Export_Reports</a> */ ?>
	</td>
   </tr>
  </table>
 </td>
</tr>
	
	
<tr>
 <td style="width:100%;">
 <table border="0" style="width:100%;">
  <tr>
<?php //************************************************ Start ******************************// ?>
   <td style="width:100%;">
   <span id="MyTeamSpan"></span>	   
   <span id="MyTeam">
   <table border="1" id="table1" cellspacing="1" style="width:100%;">
    <div id="thead">
	<thead>
	<tr bgcolor="#7a6189" style="height:24px;">
	 <td class="th" style="width:3%;">Sn</td>
	 <td class="th" style="width:3%;">EC</td>
	 <td class="th" style="width:14%;">Name</td>
	 <td class="th" style="width:8%;">Department</td>
	 <td class="th" style="width:12%;">Designation</td>
	 <td class="th" style="width:3%;">Grade</td>
	 <td class="th" style="width:7%;">State</td>			
	 <?php /*?><td class="th" style="width:4%;">Score</td>
	 <td class="th" style="width:4%;">Rating</td><?php */?>
	 <td class="th" style="width:12%;">Proposed Designation</td>
	 <td class="th" style="width:5%;">PG</td>
	 <td class="th" style="width:5%;">Proposed<br>CTC</td>
	 <td class="th" style="width:5%;">% CTC</td>
	 <td class="th" style="width:5%;">CTC<br>Correction</td>
	 <td class="th" style="width:5%;">%<br>Correction</td>
	 <td class="th" style="width:5%;">Total<br>Increment</td>
	 <td class="th" style="width:5%;">%<br>Total</td>
	 <td class="th" style="width:5%;">Total<br>Proposed</td>
    </tr> 	
	</thead>
	</div>	
<?php 

 $sql=mysql_query("select e.EmployeeID, EmpCode, Fname, Sname, Lname, d.DepartmentId, DateJoining, DepartmentCode, DesigName, GradeValue, EmpPmsId, g.HqId, Reviewer_TotalFinalScore, Reviewer_TotalFinalRating, Reviewer_EmpDesignation, Reviewer_EmpGrade, Hod_TotalFinalScore, Hod_TotalFinalRating, Hod_EmpDesignation, Hod_EmpGrade, Hod_ProIncSalary, Hod_Percent_ProIncSalary, Hod_ProCorrSalary, Hod_Percent_ProCorrSalary, Hod_IncNetMonthalySalary, Hod_Percent_IncNetMonthalySalary, Hod_GrossMonthlySalary, HR_CurrDesigId, HR_CurrGradeId, EmpCurrCtc, Hod_ProIncCTC, Hod_Percent_ProIncCTC, Hod_ProCorrCTC, Hod_Percent_ProCorrCTC, Hod_Proposed_ActualCTC, Hod_IncNetCTC, Hod_Percent_IncNetCTC from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID INNER JOIN hrm_employee_general g ON p.EmployeeID=g.EmployeeID INNER JOIN hrm_department d ON g.DepartmentId=d.DepartmentId INNER JOIN hrm_designation de on p.HR_CurrDesigId=de.DesigId INNER JOIN hrm_grade gr ON p.HR_CurrGradeId=gr.GradeId INNER JOIN hrm_headquater hq ON g.HqId=hq.HqId where e.EmpStatus='A' AND g.DateJoining<='".$_SESSION['AllowDoj']."' AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.HOD_EmployeeID=".$EmployeeId." order by EmpCode ASC", $con);
	 
$sno=1; while($res=mysql_fetch_array($sql)){
$sql5=mysql_query("select StateCode from hrm_state INNER JOIN hrm_headquater ON hrm_state.StateId=hrm_headquater.StateId where hrm_headquater.HqId=".$res['HqId'], $con); $res5=mysql_fetch_assoc($sql5);
?>   
    <div id="tbody">
	<tbody>  				
    <tr style="height:22px;background-color:#FFFFFF;">
     <td class="tdc"><?php echo $sno; ?></td>
	 <td class="tdc"><?php echo $res['EmpCode']; ?></td>
	 <td class="tdl"><?php echo $res['Fname'].' '.$res['Sname'].' '.$res['Lname']; ?></td>
	 <td class="tdl"><?php echo $res['DepartmentCode'];?></td>			
	 <td class="tdl"><?php echo $res['DesigName'];?></td>			
	 <td class="tdc"><?php echo $res['GradeValue'];?></td>			
	 <td class="tdc"><?php echo $res5['StateCode'];?></td>
	 <?php /*?><td class="tdc"><?php if($res['Hod_TotalFinalScore']>0){echo $res['Hod_TotalFinalScore']; } else {echo $res['Reviewer_TotalFinalScore'];} ?></td>	
	 <td class="tdc"><?php  if($res['Hod_TotalFinalRating']>0){echo $res['Hod_TotalFinalRating']; } else {echo $res['Reviewer_TotalFinalRating'];} ?></td><?php */?>

<?php if($res['Hod_EmpDesignation']!=0 AND $res['Hod_EmpDesignation']>0) {$sqlHD=mysql_query("select DesigName from hrm_designation where DesigId=".$res['Hod_EmpDesignation'], $con); $resHD=mysql_fetch_assoc($sqlHD);} 
if($res['Hod_EmpGrade']!=0 AND $res['Hod_EmpGrade']>0) {$sqlHG=mysql_query("select GradeValue from hrm_grade where GradeId=".$res['Hod_EmpGrade'], $con); $resHG=mysql_fetch_assoc($sqlHG);} ?>					
	
	 <td class="tdl"><?php if($res['Hod_EmpDesignation']>0 AND $res['Hod_EmpDesignation']!=$res['HR_CurrDesigId']) { echo $resHD['DesigName'];} ?></td>	
	 <td class="tdc"><?php if($res['Hod_EmpGrade']>0 AND $res['Hod_EmpGrade']!=$res['HR_CurrGradeId']) { echo $resHG['GradeValue'];} ?></td>	
	 <td class="tdr" style="background-color:#BFDFFF;"><?php echo floatval($res['Hod_ProIncCTC']); ?></td>
     <td class="tdc" style="background-color:#BFDFFF;"><?php echo $res['Hod_Percent_ProIncCTC']; ?></td>	
     <td class="tdr" style="background-color:#FFFFB9;"><?php echo floatval($res['Hod_ProCorrCTC']); ?></td>
     <td class="tdc" style="background-color:#FFFFB9;"><?php echo $res['Hod_Percent_ProCorrCTC']; ?></td>	
     <td class="tdr" style="background-color:#DDDDFF;"><?php echo floatval($res['Hod_IncNetCTC']); ?></td>
     <td class="tdc" style="background-color:#DDDDFF;"><?php echo $res['Hod_Percent_IncNetCTC']; ?></td>	
     <td class="tdr" style="background-color:#FFC68C;"><?php echo floatval($res['Hod_Proposed_ActualCTC']);?></td>
    </tr>
	</tbody>
	</div>
<?php $sno++;} ?>		
   </table>
   </span>
   </td>
<?php //************************************************ Close ******************************// ?>	  	   
	
   </tr>
  </table>
 </td>
</tr>
         </table>
		</td>		   
	   </tr>
	  </table>
	 </td>
    </tr>
  
  </table>
 </td>
</tr>					
<?php //******************************** Close ***************************************** ?>					
				  </table>
				 </td>
			  </tr>
			  
			   </form>
			</table>
           </td>
			  </tr>
	        </table
><?php //*************************************************************************** ?>
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
