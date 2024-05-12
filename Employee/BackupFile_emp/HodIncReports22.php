<?php session_start();

if($_SESSION['login'] = true){require_once('../AdminUser/config/config.php');}

include("../function.php");

if(check_user()==false){header('Location:../index.php');}

require_once('../AdminUser/logcheck.php');

if($_SESSION['logCheckEmp']!=$logemp){header('Location:../index.php');}

if($_SESSION['login'] = true){require_once('EmpMenuSession.php');}

/******************************************************************************/

/* $sql22=mysql_query("select hrm_employee.EmpCode, hrm_employee.EmployeeID from hrm_employee INNER JOIN hrm_employee_pms ON hrm_employee.EmployeeID=hrm_employee_pms.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$YearId." AND hrm_employee.CompanyId=".$CompanyId." AND hrm_employee_pms.HOD_EmployeeID=".$EmployeeId, $con); 

while($res22=mysql_fetch_array($sql22)){    				

$sqlM = mysql_query("SELECT MAX(SalaryChange_Date) as SalaryChDate FROM hrm_pms_appraisal_history where SalaryChange_Date!='".date("Y-10-01")."' AND EmpCode=".$res22['EmpCode']." AND CompanyId=".$CompanyId, $con); $resM = mysql_fetch_assoc($sqlM);

$sqlAmt=mysql_query("select Previous_GrossSalaryPM from hrm_pms_appraisal_history where SalaryChange_Date='".$resM['SalaryChDate']."' AND EmpCode=".$res22['EmpCode']." AND CompanyId=".$CompanyId, $con); $resAmt=mysql_fetch_assoc($sqlAmt);

$sqlUp=mysql_query("update hrm_employee_pms set EmpCurrGrossPM=".$resAmt['Previous_GrossSalaryPM']." where EmployeeID=".$res22['EmployeeID']." AND CompanyId=".$CompanyId." AND AssessmentYear=".$YearId, $con); 

} */

$Incentive=mysql_query("select SUM(Incentive) as TEAMINC from hrm_pms_appraisal_history where CompanyId=".$CompanyId." AND HOD_EmployeeID=".$EmployeeId." AND SalaryChange_Date!='".date("Y-10-01")."'", $con); $resINCTV=mysql_fetch_array($Incentive);{ $INCTV=$resINCTV['TEAMINC']; } 



$SqlCount=mysql_query("select SUM(EmpCurrGrossPM) as TEGSPM, SUM(EmpCurrIncentivePM) as TEAMINC, SUM(Hod_IncNetMonthalySalary) as TINMS, SUM(Hod_GrossMonthlySalary) as TEPGS, SUM(Hod_Incentive) as HINCentv from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND hrm_employee_pms.AssessmentYear=".$YearId." AND hrm_employee_pms.HOD_EmployeeID=".$EmployeeId, $con); $sno=1; while($ResCount=mysql_fetch_array($SqlCount))

{ $TTeamPreGPM=$ResCount['TEGSPM']; $INCTV=$ResCount['TEAMINC']; $TTeamProGPM=$ResCount['TEPGS']; $Inc=$ResCount['TINMS']; 

  $HINCentv=number_format($ResCount['HINCentv'], 2, '.', '');}

$TPreGrossSalary=$TTeamPreGPM+$INCTV; $TotalTeamPriGrossPM=number_format($TPreGrossSalary, 2, '.', '');

$TProGrossSalary=$TTeamProGPM+$HINCentv; $TotalTeamProposedGrossPM=number_format($TProGrossSalary, 2, '.', '');

$OnePerPre=($TotalTeamPriGrossPM*1)/100; //$OnePerPre=number_format($One, 2, '.', '');

if($HINCentv>0){$Increment=number_format($Inc+$HINCentv, 2, '.', ''); $HINIncenPer=$HINCentv/$OnePerPre; $HINInc=number_format($HINIncenPer, 2, '.', '');}

else{$Increment=number_format($Inc, 2, '.', ''); } 

$IncPer=$Increment/$OnePerPre;

$PerInc=number_format($IncPer, 4, '.', '');



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

<style>.font {color:#000; font-family:Times New Roman; font-size:15px; font-weight:bold;} 

.Input{font-family:"Times New Roman", Times, serif; font-size:14px; height:22px;border-style:hidden; border-bottom-color:#FFFFFF; border-left-color:#FFFFFF; border-right-color:#FFFFFF; border-top-color:#FFFFFF; border:0;}.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;} .font1 { font-family:Georgia; font-size:11px; height:14px; } .font2 { font-size:11px;width:260px;height:18px;}.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;} .TableHead { font-family:Times New Roman; color:#FFFFFF; font-size:15px; }.TableHead1 { font-family:Times New Roman; color:#000000; background-color:#FFFFFF; font-size:13px; overflow:hidden; } .InputText {font-family:Times New Roman; font-size:12px; width:100px; height:19px; }

</style>

<Script type="text/javascript">window.history.forward(1);</Script>

<script type="text/javascript" language="javascript">

function SelectStateEmp(value1,value2){ 

    document.getElementById('MyTeam').style.display='none'; var YI=document.getElementById('YearId').value;

	var url = 'HodIncStateEmp.php';	var pars = 'StHQid='+value1+'&EmpId='+value2+'&YI='+YI;	var myAjax = new Ajax.Request(

	url, { 	method: 'post', parameters: pars, onComplete: show_HQEmp });

} 

function show_HQEmp(originalRequest)

{ document.getElementById('MyTeamSpan').innerHTML = originalRequest.responseText; }



function ReportOpen(v,v1)

{window.open("HodPmsReports.php?e="+v+"&y="+v1,"Schedule","menubar=no,scrollbars=yes,resizable=no,directories=no,width=1100,height=650");}



function OpenWindow(v,v1)

{window.open("HodScoreHistory.php?a="+v+"&b="+v1,"AppraisalForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=1100,height=650");}



function PrintReport(E,Y,C) 

{ window.open ("HodPrintIncReport.php?e="+E+"&y="+Y+"&c="+C,"HodIncReport","menubar=yes,scrollbars=yes,resizable=1,width=1200,height=600");}

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

			     <td id="Anni" valign="top">&nbsp;</td>

				 <td width="1200" valign="top">

				  <table border="0">

				    

<?php //*************************************************************** Start ******************************************************************************** ?>					

<tr>

 <td colspan="5" width="1200" style="background-image:url(images/pmsback.png); ">

<?php $sqlSch=mysql_query("select * from hrm_pms_appdate where AssessmentYear=".$YearId." AND CompanyId=".$CompanyId, $con); 

      $resSch=mysql_fetch_assoc($sqlSch); $CuDate=date("Y-m-d");?> 	

  <table>

<?php //******************************************** ?>  

   <tr>

    <td width="1400">

<input type="hidden" id="FormAMin5" value="" /><input type="hidden" id="FormAMax5" value="" />

<input type="hidden" id="FormBMin5" value="" /><input type="hidden" id="FormBMax5" value="" />

<input type="hidden" id="YearId" value="<?php echo $YearId; ?>" />

<input type="hidden" id="EmployeeId" value="<?php echo $EmployeeId; ?>" />

<input type="hidden" id="EmpId" value="" /> <input type="hidden" id="PmsId" value="" />	

	  <table>

	    <tr>

        <?php if($_SESSION['EmpType']=='E') {?> 

		 <td align="center"><a href="pms.php?log=<?php echo $_SESSION['logCheckEmp']; ?>"><img id="Img_emp1" style="display:block;" src="images/emp1.png" border="0"/></a>

		   <img id="Img_emp" style="display:none;" src="images/emp.png" border="0"/></td>        

<?php } $sqlApp=mysql_query("select Appraiser_EmployeeID from hrm_employee_pms where AssessmentYear=".$YearId." AND Appraiser_EmployeeID=".$EmployeeId, $con); $rowApp=mysql_num_rows($sqlApp); 

      if($rowApp>0) { ?>  

		 <td align="center"><a href="ManagerPms.php"><img id="Img_manager1" style="display:block;" src="images/manager1.png" border="0"/></a>

		   <img id="Img_manager" style="display:none;" src="images/manager.png" border="0"/></td>

<?php } $sqlRev=mysql_query("select Reviewer_EmployeeID from hrm_employee_pms where AssessmentYear=".$YearId." AND Reviewer_EmployeeID=".$EmployeeId, $con); $rowRev=mysql_num_rows($sqlRev); 

      if($rowRev>0) { ?>		   

		 <td align="center"><a href="HodPms.php"><img id="Img_hod1" style="display:block;" src="images/hod1.png" border="0"/></a>

		   <img id="Img_hod" style="display:none;" src="images/hod.png" border="0"/></td>

<?php }  $sqlHod=mysql_query("select HOD_EmployeeID from hrm_employee_pms where AssessmentYear=".$YearId." AND HOD_EmployeeID=".$EmployeeId, $con); $rowHod=mysql_num_rows($sqlHod); 

      if($rowHod>0) { ?> 			   

		 <td align="center"><a href="RevHodPms.php"><img id="Img_hod1" style="display:none;" src="images/RevHod1.png" border="0"/></a>

		   <img id="Img_hod" style="display:block;" src="images/RevHod.png" border="0"/></td>		     

<?php } ?>		

         <td style="width:10px;">&nbsp;</td>

		 <td style="width:20px;"><font color="#014E05" style='font-family:Times New Roman; font-weight:bold;' size="3"><span id="MsgSpan">&nbsp;<b><?php echo $msg; ?></b></span></font></td>	  


			

	  </table>

	</td>

   </tr>

   <tr>

    <td width="1500">

	  <table>

	    <tr> 

		 <td align="center" style="font-family:Times New Roman; font-size:14px; font-weight:bold;width:80px;">
		 <a href="Indexpms.php?log=<?php echo $_SESSION['logCheckEmp']; ?>"><img src="images/Home.png" border="0" /></a></td>
		 <td align="center" style="font-family:Times New Roman; font-size:14px; font-weight:bold;width:90px;">
		 <a href="RevHodPms.php"><img src="images/TeamStatus1.png" border="0" /></a></td>    			   
		 <td align="center" style="font-family:Times New Roman; font-size:14px; font-weight:bold;width:70px;">
<?php $sqlCh = mysql_query("select * from hrm_pms_allow where HOD_EmployeeID=".$EmployeeId." AND CompanyId=".$CompanyId." AND AssesmentYear=".$YearId, $con); 
      $rowCh=mysql_num_rows($sqlCh);	 
		 if(($CuDate>=$resSch['HodFromDate'] AND $CuDate<=$resSch['HodToDate'] AND $resSch['HodDateStatus']=='A') OR $rowCh>0) { ?> 	
         <a href="HodPmsScore.php"><img src="images/Score1.png" border="0" /></a></td> 
		 <td align="center" style="font-family:Times New Roman; font-size:14px; font-weight:bold;width:80px;">	
         <a href="HodPmsPromotion.php"><img src="images/promotion1.png" border="0" /></a></td> 
		 <td align="center" style="font-family:Times New Roman; font-size:14px; font-weight:bold;width:80px;">	
         <a href="HodPmsIncrement.php"><img src="images/Increment1.png" border="0" /></a><?php } ?></td>
		 <td align="center" style="font-family:Times New Roman; font-size:14px; font-weight:bold;width:100px;">	
         <a href="HodPmsReports.php"><img src="images/pmsreports1.png" border="0" /></a></td> 
		 <td align="center" style="font-family:Times New Roman; font-size:14px; font-weight:bold;width:100px;">	
         <a href="HodIncReports.php"><img src="images/IncrementReports.png" border="0" /></a></td>
		 <td align="center" style="font-family:Times New Roman; font-size:14px; font-weight:bold;width:100px;">	
         <a href="RatingGraph.php"><img src="images/ratinggraph1.png" border="0" /></a></td> 
		 <td align="center" style="font-family:Times New Roman; font-size:14px; font-weight:bold;width:100px;">	
         <a href="CompliteRatingGraph.php"><img src="images/OveallRatingGraph1.png" border="0" /></a></td>   	
 <td>&nbsp;</td>
  <td style="font-family:Times New Roman; font-size:16px; font-weight:bold;width:400px; color:#E10000;" >

		  <?php if($CuDate>=$resSch['HodFromDate'] AND $CuDate<=$resSch['HodToDate'] AND $resSch['HodDateStatus']=='A') { 

		   $LastDate=$resSch['HodToDate']; $CurrentDate=date("Y-m-d");

		  $diff = abs(strtotime($LastDate) - strtotime($CurrentDate));

          //$years = floor($diff / (365*60*60*24));

          //$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));

          $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24)); ?>

		  <b><blink><?php echo $days; ?> Days Remaining! Last date : 

		  <font color="#5B0000"><?php echo date("d-F",strtotime($resSch['HodToDate'])); ?></font></blink></b><?php } ?>

		 </td> 	   	 

 <td class="td1" style="font-family:Times New Roman; font-size:15px; width:50px; font-weight:bold;" align="right"><?php /* State : */ ?></td>

 <td class="td1" style="font-family:Times New Roman; font-size:15px; width:170px; font-weight:bold;"> 

<?php /*   <select style="font-size:11px; width:150px; height:18px; background-color:#DDFFBB; display:block;" name="StE" id="StE" onChange="SelectStateEmp(this.value,<?php echo $EmployeeId; ?>)"><option value="" style="margin-left:0px; background-color:#84D9D5;" selected>State</option><?php $SqlSt=mysql_query("select * from hrm_state order by StateName ASC"); while($ResSt=mysql_fetch_array($SqlSt)) { ?><option value="<?php echo $ResSt['StateId']; ?>"><?php echo '&nbsp;'.$ResSt['StateName'];?></option><?php } ?>

   <option value="All">&nbsp;All</option>

   </select> */ ?>

 </td>		       

	  </table>

	</td>

   </tr>

   <tr>

    <td>

	  <table border="0">

	    <tr>

		 <td style="width:5px;">&nbsp;</td>

<?php /****************************************** Form Start **************************/ ?>

<?php /***************** PersonalDetails **************************/ ?>			 

		 <td id="PersonalDetails" style="width:1500px;display:block;">		 	 

		   <table border="0">

 <tr>

  <td>

    <table border="0">

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

  <td>

    <table border="0">

	<tr><td style="font-family:Times New Roman; width:360px; color:#FFFFFF; font-size:15px; font-weight:bold;">

	 My Team Total Previous Gross Salary Per Month &nbsp;:</td>

	 <td align="right" style="font-family:Times New Roman; width:94px; color:#000000; font-size:15px; font-weight:bold;">

	 <?php echo $TotalTeamPriGrossPM; ?>&nbsp;/-</font>&nbsp;</td></tr>

   <tr><td style="font-family:Times New Roman; width:360px; color:#FFFFFF; font-size:15px; font-weight:bold;">

   My Team Total Proposed Gross Salary Per Month :</td>

	 <td align="right" style="font-family:Times New Roman; width:94px; color:#000000; font-size:15px; font-weight:bold;">

	 <?php echo $TotalTeamProposedGrossPM; ?>&nbsp;/-</font>&nbsp; </td>

	 <td>&nbsp;&nbsp;</td>

	 <td style="font-family:Times New Roman; width:400px; color:#FFFFFF; font-size:15px; font-weight:bold;">My Team Total Increment&nbsp;:<font color="#C10000"> Rs.&nbsp;

	 <?php echo $Increment; ?>&nbsp;/-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $PerInc; ?>&nbsp;%</td>

	 <td style="font-family:Times New Roman; width:170px; font-size:15px; font-weight:bold;" align="right">

	 <a href="#" onClick="PrintReport(<?php echo $EmployeeId.','.$YearId.','.$CompanyId; ?>)">Print</a></td>

	 </tr>

  </table>

  </td>

 </tr>	     

 <tr>

   <td style="width:1500px;">

     <table border="0">

	  <tr>

	  <?php //************************************************ Start ******************************// ?>

	   <td style="width:1500px;" id="" style="display:block;">

       <span id="MyTeamSpan"></span>	   

	   <span id="MyTeam">

		<table border="">

		 <tr bgcolor="#7a6189" style="height:20px;" valign="middle">

	        <td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:40px;"><b>SNo.</b></td>

	        <td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:80px;"><b>EmpCode</b></td>

	        <td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:220px;"><b>Name</b></td>

	        <td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:120px;"><b>Department</b></td>

			<td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:150px;"><b>Designation</b></td>

			<td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:80px;"><b>Grade</b></td>

	        <td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:150px;"><b>Pro. Designation</b></td>	

	        <td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:80px;"><b>Pro. Grade</b></td>				

			<td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:120px;"><b>Pre Gross Salary</b></td>	

			<td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:80px;"><b>PGSPM</b></td>

			<td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:80px;"><b>PIS</b></td>

			<td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:80px;"><b>% PIS</b></td>

            <td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:80px;"><b>SC</b></td>

			<td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:80px;"><b>% SC</b></td>

			<td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:110px;"><b>TIGSPM</b></td>

			<td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:80px;"><b>% TIGSPM</b></td>

		 </tr>

<?php $sql=mysql_query("select hrm_employee.*, EmpPmsId, EmpCurrGrossPM, Reviewer_TotalFinalScore, Reviewer_TotalFinalRating, Reviewer_EmpDesignation, Reviewer_EmpGrade, Hod_TotalFinalScore, Hod_TotalFinalRating, Hod_EmpDesignation, Hod_EmpGrade, Hod_ProIncSalary, Hod_Percent_ProIncSalary, Hod_ProCorrSalary, Hod_Percent_ProCorrSalary, Hod_IncNetMonthalySalary, Hod_Percent_IncNetMonthalySalary, Hod_GrossMonthlySalary, HodPer_PIS_From_PreMyTGrossPM, HodPer_SC_From_PreMyTGrossPM, HodPer_TISPM_From_PreMyTGrossPM, HR_CurrDesigId,HR_CurrGradeId, DepartmentId, DesigId, DesigId2, HqId, GradeId from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_pms ON hrm_employee.EmployeeID=hrm_employee_pms.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$YearId." AND hrm_employee_pms.HOD_EmployeeID=".$EmployeeId, $con); $sno=1; while($res=mysql_fetch_array($sql)){ $IncEmpP=$res['Hod_ProIncSalary']-$res['EmpCurrGrossPM']; $IncPIS=number_format($IncEmpP, 2, '.', '');

if($res['Hod_EmpDesignation']!=0) {$sqlHD=mysql_query("select DesigName from hrm_designation where DesigId=".$res['Hod_EmpDesignation'], $con); $resHD=mysql_fetch_assoc($sqlHD);} 
if($res['Hod_EmpGrade']!=0) {$sqlHG=mysql_query("select GradeValue from hrm_grade where GradeId=".$res['Hod_EmpGrade'], $con); $resHG=mysql_fetch_assoc($sqlHG);} 
?>

  				

		<tr style="height:20px; background-color:#FFFFFF;" valign="middle">

	        <td align="center" style="font:Georgia; font-size:11px; width:50px;"><?php echo $sno; ?></td>

	        <td align="center" style="font:Georgia; font-size:11px; width:80px;"><?php echo $res['EmpCode']; ?></td>

	        <td align="" style="font:Georgia; font-size:11px; width:220px;"><?php echo $res['Fname'].' '.$res['Sname'].' '.$res['Lname']; ?></td>

<?php $sql2=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$res['DepartmentId'], $con); 

      $res2=mysql_fetch_assoc($sql2);?><td align="" style="font:Georgia; font-size:11px; width:120px;">&nbsp;<?php echo $res2['DepartmentCode'];?></td>
	        <td align="" style="font:Georgia; font-size:11px; width:150px;">
<?php $sql3=mysql_query("select DesigName from hrm_designation where DesigId=".$res['DesigId'], $con); $res3=mysql_fetch_assoc($sql3); echo $res3['DesigName']?></td>
           	<td align="center" style="font:Georgia; font-size:11px; width:80px;">

<?php $sql4=mysql_query("select GradeValue from hrm_grade where GradeId=".$res['GradeId'], $con);  $res4=mysql_fetch_assoc($sql4); echo $res4['GradeValue']; ?></td>

	 <td align="" style="font:Georgia; font-size:11px; width:150px;">
	 <?php if($res['Hod_EmpDesignation']>0 AND $res['Hod_EmpDesignation']!=$res['HR_CurrDesigId']) { echo $resHD['DesigName'];} ?></td>  
	  <td align="center" style="font:Georgia; font-size:11px; width:80px;">
	  <?php if($res['Hod_EmpGrade']>0 AND $res['Hod_EmpGrade']!=$res['HR_CurrGradeId']) { echo $resHG['GradeValue'];} ?></td>

<?php $sqlMax = mysql_query("SELECT MAX(SalaryChange_Date) as SalaryChDate FROM hrm_pms_appraisal_history INNER JOIN hrm_employee ON hrm_pms_appraisal_history.EmpCode=hrm_employee.EmpCode where hrm_employee.EmployeeID=".$res['EmployeeID']." AND SalaryChange_Date!='".date("Y-10-01")."' AND hrm_pms_appraisal_history.CompanyId=".$CompanyId, $con); $resMax = mysql_fetch_assoc($sqlMax); 

      $sqlS = mysql_query("SELECT Previous_GrossSalaryPM FROM hrm_pms_appraisal_history INNER JOIN hrm_employee ON hrm_pms_appraisal_history.EmpCode=hrm_employee.EmpCode  where SalaryChange_Date='".$resMax['SalaryChDate']."' AND hrm_employee.EmployeeID=".$res['EmployeeID']." AND hrm_pms_appraisal_history.CompanyId=".$CompanyId, $con);

	  $resS = mysql_fetch_assoc($sqlS); $PIS=$res['Hod_ProIncSalary']-$res['EmpCurrGrossPM'];?>

	        <td align="center" style="font:Georgia; font-size:11px; width:120px;">&nbsp;<?php echo $res['EmpCurrGrossPM'];?></td>			  

			<td align="center" style="font:Georgia; font-size:11px; width:80px; background-color:#FFFFFF;"><?php echo $res['Hod_ProIncSalary']; ?></td>	

			<td align="center" style="font:Georgia; font-size:11px; width:80px; background-color:#FFFFFF;"><?php echo $PIS; ?></td>

			<td align="center" style="font:Georgia; font-size:11px; width:80px; background-color:#FFEAEA;"><?php echo $res['Hod_Percent_ProIncSalary']; ?></td>	

			<td align="center" style="font:Georgia; font-size:11px; width:80px; background-color:#FFFFFF;"><?php echo $res['Hod_ProCorrSalary']; ?></td>

			<td align="center" style="font:Georgia; font-size:11px; width:80px; background-color:#FFEAEA;"><?php echo $res['Hod_Percent_ProCorrSalary']; ?></td>	

			<td align="center" style="font:Georgia; font-size:11px; width:110px; background-color:#FFFFFF;"><?php echo $res['Hod_IncNetMonthalySalary']; ?></td>

			<td align="center" style="font:Georgia; font-size:11px; width:80px;background-color:#FFEAEA;"><?php echo $res['Hod_Percent_IncNetMonthalySalary']; ?></td>	

		 </tr>		 

<?php $sno++;} $No=$sno-1;?><input type="hidden" id="No" value="<?php echo $No; ?>" />		

<?php $SqlCount=mysql_query("select SUM(Hod_IncNetMonthalySalary)as NIMS from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$YearId." AND hrm_employee_pms.HOD_EmployeeID=".$EmployeeId, $con); $sno=1; while($ResCount=mysql_fetch_array($SqlCount)){ $NIMS=$ResCount['NIMS']; }?> 

          <tr style="height:20px; background-color:#FFFFFF;" valign="middle">

	        <td colspan="8" align="left" style="font:Georgia; font-size:11px;font-weight:bold; width:370px;">&nbsp;</td> 

			<td colspan="6" align="left" style="font:Georgia; font-size:11px;font-weight:bold;background-color:#C4FFC4; width:280px;">

			<?php if($HINCentv>0) { echo '&nbsp;&nbsp;&nbsp;&nbsp;Incentive :&nbsp;&nbsp;'.$HINCentv; } $TotalNIS=$HINInc+$ResCount['NIS']; ?></td> 

			<td align="center" style="font:Georgia; font-size:11px;font-weight:bold;background-color:#C4FFC4;"><?php echo $NIMS; ?></td>

			<td>&nbsp;</td> 

		 </tr>	

<?php /* $SqlCount=mysql_query("select SUM(HodPer_PIS_From_PreMyTGrossPM) as PIS, SUM(HodPer_SC_From_PreMyTGrossPM) as PSC, SUM(HodPer_TISPM_From_PreMyTGrossPM)as NIS, SUM(Hod_IncNetMonthalySalary)as NIMS from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$YearId." AND hrm_employee_pms.HOD_EmployeeID=".$EmployeeId, $con); $sno=1; while($ResCount=mysql_fetch_array($SqlCount)){ ?> 

          <tr style="height:20px; background-color:#FFFFFF;" valign="middle">

	        <td colspan="3" align="left" style="font:Georgia; font-size:11px;font-weight:bold; width:370px;">OVERALL TOTAL MY TEAM INCREMENT PER MONTH:</td> 

			<td colspan="4" align="right" style="font:Georgia; font-size:11px;font-weight:bold;background-color:#C4FFC4; width:280px;">

			<?php if($HINCentv>0) { echo 'Incentive :&nbsp;&nbsp;'.$HINInc.' %'; } $TotalNIS=$HINInc+$ResCount['NIS']; ?>&nbsp;&nbsp;</td> 

			<td align="center" style="font:Georgia; font-size:11px; width:80px;font-weight:bold;  background-color:#C4FFC4;"><?php echo $ResCount['PIS']; ?></td>	

			<td align="center" style="font:Georgia; font-size:11px; width:80px; background-color:#FFFFFF;">&nbsp;</td>

			<td align="center" style="font:Georgia; font-size:11px; width:80px;font-weight:bold;  background-color:#C4FFC4;"><?php echo $ResCount['PSC']; ?></td>	

			<td align="center" style="font:Georgia; font-size:11px; width:80px; font-weight:bold; background-color:#C4FFC4;"><?php echo $ResCount['NIMS']; ?></td>

			<td align="center" style="font:Georgia; font-size:11px; width:80px;font-weight:bold; background-color:#C4FFC4;"><?php echo $TotalNIS; ?></td>	

		 </tr>	

<?php } */ ?>		 	

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

<?php //*************************************************************** Close ******************************************************************************** ?>					

				  </table>

				 </td>

			  </tr>

			 

			  <tr>

			     <td>&nbsp;</td>

			     <td align="Right" class="fontButton" width="1200">

				   </td>

		      </tr>

			   </form>

			</table>

           </td>

			  </tr>

	        </table>

			

<?php //*************************************************************************************************************************************************** ?>

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



