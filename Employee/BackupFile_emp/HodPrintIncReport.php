<?php 
require_once('../AdminUser/config/config.php');
/******************************************************************************/
$SqlCount=mysql_query("select SUM(EmpCurrGrossPM) as Old_GROSS, SUM(EmpCurrIncentivePM) as Old_Inc, SUM(Hod_ProIncSalary) as H_IS, SUM(Hod_ProCorrSalary) as H_SC, SUM(Hod_Incentive) as H_Inc, SUM(Hod_IncNetMonthalySalary) as TINMS from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$_REQUEST['c']." AND hrm_employee_pms.AssessmentYear=".$_REQUEST['y']." AND hrm_employee_pms.HOD_EmployeeID=".$_REQUEST['e'], $con); 
$sno=1; $ResCount=mysql_fetch_array($SqlCount);

$TotEGross=$ResCount['Old_GROSS']+$ResCount['Old_Inc']; 
$TotOldGrossPM=number_format($TotEGross, 2, '.', '');
$TotHIS=$ResCount['H_IS']+$ResCount['H_Inc']; $TotHMonthGS=$TotHIS+$ResCount['H_SC']; 
$TotNewGrossPM=number_format($TotHMonthGS, 2, '.', '');
$Diff=$TotHIS-$TotEGross; $TotHInC=$Diff+$ResCount['H_SC']; 
$One=($TotEGross*1)/100; $OnePerPre=number_format($One, 2, '.', ''); 
$Increment=number_format($TotHInC, 2, '.', '');
$IncPer=$TotHInC/$OnePerPre; $PerInc=number_format($IncPer, 2, '.', '');
$TotalPerPIS=$Diff/$OnePerPre; $TotalTPerPIS=number_format($TotalPerPIS, 2, '.', '');
$TotalPerPSC=$ResCount['H_SC']/$OnePerPre; $TotalTPerPSC=number_format($TotalPerPSC, 2, '.', '');
$INCPer=$ResCount['H_Inc']/$OnePerPre;
?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<style>.font {color:#000; font-family:Times New Roman; font-size:15px; font-weight:bold;} 
.Input{font-family:"Times New Roman", Times, serif; font-size:14px; height:22px;border-style:hidden; border-bottom-color:#FFFFFF; border-left-color:#FFFFFF; border-right-color:#FFFFFF; border-top-color:#FFFFFF; border:0;}.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;} .font1 { font-family:Georgia; font-size:11px; height:14px; } .font2 { font-size:11px;width:260px;height:18px;}.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;} .TableHead { font-family:Times New Roman; color:#FFFFFF; font-size:15px; }.TableHead1 { font-family:Times New Roman; color:#000000; background-color:#FFFFFF; font-size:13px; overflow:hidden; } .InputText {font-family:Times New Roman; font-size:12px; width:100px; height:19px; }
.td1{ text-align:center;font-family:Times New Roman;color:#FFFFFF;font-size:14px;font-weight:bold; }
.td1l{ font-family:Times New Roman;color:#FFFFFF;font-size:14px;font-weight:bold; }
.td2{ text-align:center;font-family:Times New Roman;font-size:12px; }
.td3{ font-family:Times New Roman;font-size:12px; }
.td22{ text-align:center;font-family:Times New Roman;font-size:14px; }
.td33{ font-family:Times New Roman;font-size:14px; }
</style>
<script language="javascript" type="text/javascript">
function Printpage()
 { document.getElementById("pp").style.display='none';  window.print(); window.close(); }
</script>
</head>
<body class="body"> 
<table class="table">
<tr>
 <td>
  <table width="100%" style="margin-top:0px; ">
	 <tr>
	  <td valign="top">
				  <table border="0">
<?php //*************************************************************** Start ******************************************************************************** ?>					
<tr>
 <td colspan="5" width="1350" style="background-image:url(images/pmsback.png); ">
<?php $sqlSch=mysql_query("select * from hrm_pms_appdate where AssessmentYear=".$_REQUEST['y']." AND CompanyId=".$_REQUEST['c'], $con); 
      $resSch=mysql_fetch_assoc($sqlSch); $CuDate=date("Y-m-d");?> 	
  <table>
<?php //******************************************** ?>  
   <tr>
    <td width="1500">
	  <table>
   <tr>
    <td>
	  <table border="0">
	    <tr>
<?php /****************************************** Form Start **************************/ ?>
<?php /***************** PersonalDetails **************************/ ?>			 
		 <td id="PersonalDetails" style="width:1500px;display:block;">		 	 
		   <table border="0">
 <tr>
  <td width="100%">
    <table border="0" >
	<tr>
     <td style="font-family:Times New Roman; font-size:18px; font-weight:bold;"><font color="#00468C">(<i>Increment Reports</i>)</font></td>
	 <td>&nbsp;</td>
	 <td style="font-family:Georgia; font-size:12px; font-weight:bold;">
	<font color="#FFFF9D">PGSPM :&nbsp;</font><font color="#004600">Proposed Gross Salary Per Month,&nbsp;&nbsp;</font>
	<font color="#FFFF9D">PIS :&nbsp;</font><font color="#004600">Proposed Increment Salary,&nbsp;&nbsp;</font>
	<font color="#FFFF9D">SC :&nbsp;</font><font color="#004600">Salary Correction,&nbsp;&nbsp;</font>
	<font color="#FFFF9D">TIGSPM :&nbsp;</font><font color="#004600">Total Increment Gross Salary Per Month,&nbsp;&nbsp;</font>
    </td>
   </tr>
  </table>
  </td>
 </tr>	
  <tr>
  <td width="100%">
    <table border="0">
	<tr><td style="font-family:Times New Roman; width:360px; color:#FFFFFF; font-size:15px; font-weight:bold;">
	 My Team Total Previous Gross Salary Per Month &nbsp;:</td>
	 <td align="right" style="font-family:Times New Roman; width:94px; color:#000000; font-size:15px; font-weight:bold;">
	 <?php echo $TotOldGrossPM; ?>&nbsp;/-</font>&nbsp;</td></tr>
   <tr><td style="font-family:Times New Roman; width:360px; color:#FFFFFF; font-size:15px; font-weight:bold;">
   My Team Total Proposed Gross Salary Per Month :</td>
	 <td align="right" style="font-family:Times New Roman; width:94px; color:#000000; font-size:15px; font-weight:bold;">
	 <?php echo $TotNewGrossPM; ?>&nbsp;/-</font>&nbsp; </td>
	 <td>&nbsp;&nbsp;</td>
	 <td style="font-family:Times New Roman; width:400px; color:#FFFFFF; font-size:15px; font-weight:bold;">My Team Total Increment&nbsp;:<font color="#C10000"> Rs.&nbsp;
	 <?php echo $Increment; ?>&nbsp;/-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $PerInc; ?>&nbsp;%</td>
	 <td class="td1">
	 <span id="pp"><a href="#" onClick="Printpage()">Print</a>&nbsp;<a href="#" onClick="Printpage()"><img src="images/printer.png" border="0" /></a>
    </span>
	</td>
	 </tr>
  </table>
  </td>
 </tr>	     
 <tr>
   <td width="100%">
     <table border="0" width="100%">
	  <tr>
	  <?php //************************************************ Start ******************************// ?>
	 <td width="100%" style="display:block;">
     <span id="MyTeamSpan"></span>	   
	 <span id="MyTeam">
	  <table border="1" cellspacing="1">
	   <tr bgcolor="#7a6189" style="height:20px;" valign="middle">
		<td class="td1" style="width:30px;"><b>SN</b></td>
		<td class="td1" style="width:50px;"><b>EC</b></td>
		<td class="td1" style="width:200px;"><b>Name</b></td>
		<td class="td1" style="width:100px;"><b>Department</b></td>
		<td class="td1" style="width:200px;"><b>Designation</b></td>
		<td class="td1" style="width:50px;"><b>Grade</b></td>
		<td class="td1" style="width:120px;"><b>State</b></td>			
		<?php /*?><td class="td1" style="width:50px;"><b>Score</b></td>
		<td class="td1" style="width:50px;"><b>Rating</b></td><?php */?>
		<td class="td1" style="width:200px;"><b>Proposed Designation</b></td>
		<td class="td1" style="width:50px;"><b>PG</b></td>
		<td class="td1" style="width:80px;"><b>PGSPM</b></td>
		<td class="td1" style="width:50px;"><b>% PIS</b></td>
		<td class="td1" style="width:80px;"><b>SC</b></td>
		<td class="td1" style="width:50px;"><b>% PSC</b></td>
		<td class="td1" style="width:80px;"><b>TPGSPM</b></td>
		<td class="td1" style="width:80px;"><b>TISPM</b></td>
		<td class="td1" style="width:50px;"><b>% TISPM</b></td>
		
	   </tr> 
	    <tr style="background-color:#FFFFFF;">
	      <td colspan="9" class="td33" align="right">&nbsp;<b><?php if($ResCount['H_Inc']>0) { echo '&nbsp;&nbsp;&nbsp;&nbsp;Incentive :&nbsp;&nbsp;'.$ResCount['H_Inc']; } //$TotalNIS=$ResCount['H_Inc']+$ResCount['TINMS']; ?></b>&nbsp;</td> 
		  <td class="td33" align="right"><b><?php echo floatval($ResCount['H_IS']); ?></b></td>
		  <td>&nbsp;</td>
		  <td class="td33" align="right"><b><?php echo floatval($ResCount['H_SC']); ?></b></td>
		  <td>&nbsp;</td>
		  <td class="td33" align="right"><b><?php echo floatval($ResCount['H_IS']+$ResCount['H_SC']); ?></b></td>
		  <td class="td33" align="right"><b><?php echo floatval($ResCount['TINMS']); ?></b></td>
		  <td>&nbsp;</td>
		</tr>	
	   
	   		
<?php $sql=mysql_query("select hrm_employee.*, Reviewer_TotalFinalScore, Reviewer_TotalFinalRating, Reviewer_EmpDesignation, Reviewer_EmpGrade, Hod_TotalFinalScore, Hod_TotalFinalRating, Hod_EmpDesignation, Hod_EmpGrade, Hod_ProIncSalary, Hod_Percent_ProIncSalary, Hod_ProCorrSalary, Hod_Percent_ProCorrSalary, Hod_IncNetMonthalySalary, Hod_Percent_IncNetMonthalySalary, Hod_GrossMonthlySalary, HR_CurrDesigId, HR_CurrGradeId, DepartmentId, DesigId, DesigId2, HqId, GradeId from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_pms ON hrm_employee.EmployeeID=hrm_employee_pms.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['y']." AND hrm_employee_pms.HOD_EmployeeID=".$_REQUEST['e']." order by EmpCode ASC", $con); $sno=1; while($res=mysql_fetch_array($sql)){ 
$sql2=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$res['DepartmentId'], $con); 
$sql3=mysql_query("select DesigName from hrm_designation where DesigId=".$res['HR_CurrDesigId'], $con); 
$sql4=mysql_query("select GradeValue from hrm_grade where GradeId=".$res['HR_CurrGradeId'], $con);  
$res2=mysql_fetch_assoc($sql2);  $res3=mysql_fetch_assoc($sql3); $res4=mysql_fetch_assoc($sql4);
$sql5=mysql_query("select StateName from hrm_state INNER JOIN hrm_headquater ON hrm_state.StateId=hrm_headquater.StateId where hrm_headquater.HqId=".$res['HqId'], $con); $res5=mysql_fetch_assoc($sql5);
?>     				
	   <tr style="height:20px; background-color:<?php if($sno%2==0){echo '#ECFFEC';} else {echo '#FFFFFF';} ?>;">
		<td class="td2"><?php echo $sno; ?></td>
		<td class="td2"><?php echo $res['EmpCode']; ?></td>
		<td class="td3"><?php echo $res['Fname'].' '.$res['Sname'].' '.$res['Lname']; ?></td>
        <td class="td2"><?php echo $res2['DepartmentCode'];?></td>			
		<td class="td3"><?php echo $res3['DesigName'];?></td>			
		<td class="td2"><?php echo $res4['GradeValue'];?></td>			
		<td class="td3"><?php echo $res5['StateName'];?></td>
		<?php /*?><td class="td22" style="background-color:#FFDDDD;"><?php if($res['Hod_TotalFinalScore']>0) {echo $res['Hod_TotalFinalScore']; } else {echo $res['Reviewer_TotalFinalScore'];} ?></td>	
		<td class="td22" style="background-color:#FFDDDD;"><?php  if($res['Hod_TotalFinalRating']>0){echo $res['Hod_TotalFinalRating']; } else {echo $res['Reviewer_TotalFinalRating'];} ?></td><?php */?>
<?php if($res['Hod_EmpDesignation']!=0 AND $res['Hod_EmpDesignation']>0) {$sqlHD=mysql_query("select DesigName from hrm_designation where DesigId=".$res['Hod_EmpDesignation'], $con); $resHD=mysql_fetch_assoc($sqlHD);} 
  if($res['Hod_EmpGrade']!=0 AND $res['Hod_EmpGrade']>0) {$sqlHG=mysql_query("select GradeValue from hrm_grade where GradeId=".$res['Hod_EmpGrade'], $con); $resHG=mysql_fetch_assoc($sqlHG);} ?>					
	    <td align="" style="background-color:#C4FFC4;"><?php if($res['Hod_EmpDesignation']>0 AND $res['Hod_EmpDesignation']!=$res['HR_CurrDesigId']) { echo $resHD['DesigName'];} ?></td>	
		<td class="td2" style="background-color:#C4FFC4;"><?php if($res['Hod_EmpGrade']>0 AND $res['Hod_EmpGrade']!=$res['HR_CurrGradeId']) { echo $resHG['GradeValue'];} ?></td>		
   <td class="td33" align="right" style="background-color:#BFDFFF;"><?php echo floatval($res['Hod_ProIncSalary']); ?></td>
   <td class="td22" style="background-color:#BFDFFF;"><?php echo $res['Hod_Percent_ProIncSalary']; ?></td>	
   <td class="td33" align="right" style="background-color:#FFFFB9;"><?php echo floatval($res['Hod_ProCorrSalary']); ?></td>
   <td class="td22" style="background-color:#FFFFB9;"><?php echo $res['Hod_Percent_ProCorrSalary']; ?></td>	
   <td class="td33" align="right" style="background-color:#FFC68C;"><?php echo floatval($res['Hod_GrossMonthlySalary']);?></td>
   
   <td class="td33" align="right" style="background-color:#DDDDFF;"><?php echo floatval($res['Hod_IncNetMonthalySalary']); ?></td>
   <td class="td22" style="background-color:#DDDDFF;"><?php echo $res['Hod_Percent_IncNetMonthalySalary']; ?></td>	
   
	   </tr>
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
<?php //******************************************** ?>    
  </table>
 </td>
</tr>					
		   </td>
		   
		  </tr>
		</table>
	  </td>
	</tr>
	
	
	
  </table>
 </td>
</tr>
</table>
</body>
</html>

