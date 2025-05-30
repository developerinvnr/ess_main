<?php require_once('../AdminUser/config/config.php'); ?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style>.th{color:#FFF;font-family:Times New Roman;font-size:12px;font-weight:bold;text-align:center;}
.td{color:#000;font-family:Times New Roman;font-size:12px;text-align:left;}
.tdc{color:#000;font-family:Times New Roman;font-size:12px;text-align:center;}
.tdr{color:#000;font-family:Times New Roman;font-size:12px;text-align:right;}
.input{color:#000;font-family:Times New Roman;font-size:12px;text-align:left;width:100%;}
</style>
</head>
<body class="body">
<table class="table">
<tr>
 <td>
 
<?php $SqlE=mysql_query("SELECT Fname, Sname, Lname, EmpCode, GradeId, DesigId, DepartmentId, EmpAddBenifit_MediInsu_value, CompanyId FROM hrm_employee_general g INNER JOIN hrm_employee_ctc c ON g.EmployeeID=c.EmployeeID inner join hrm_employee e on e.EmployeeID=g.EmployeeID WHERE g.EmployeeID=".$_REQUEST['id'], $con); $ResE=mysql_fetch_assoc($SqlE); 
$CompanyId=$ResE['CompanyId'];

$sqlGrade=mysql_query("select grade_name as GradeValue from core_grades where id=".$ResE['GradeId'], $con); 
$resGrade=mysql_fetch_assoc($sqlGrade);

$SqlCtc=mysql_query("SELECT ESCI FROM hrm_employee_ctc WHERE Status='A' AND EmployeeID=".$_REQUEST['id'], $con); $ResCtc=mysql_fetch_assoc($SqlCtc); 

/* --------------------------------------------------------------*/
/* --------------------------------------------------------------*/
$OGradeId=$ResE['GradeId']-1; $O2GradeId=$ResE['GradeId']-2;

$sGrade=mysql_query("select grade_name as GradeValue from core_grades where id=".$OGradeId, $con); $rGrade=mysql_fetch_assoc($sGrade);
$s2Grade=mysql_query("select grade_name as GradeValue from core_grades where id=".$O2GradeId, $con); $r2Grade=mysql_fetch_assoc($s2Grade);

$Cmnt=intval(date("m")); $Oldy=date("Y")-1;
if($Cmnt==4 || $Cmnt==5 || $Cmnt==6){ $LDate=date("Y").'-04-01'; }
elseif($Cmnt==7){ $LDate=date("Y").'-05-01'; }
elseif($Cmnt==8){ $LDate=date("Y").'-06-01'; }
elseif($Cmnt==9){ $LDate=date("Y").'-07-01'; }
elseif($Cmnt==10){ $LDate=date("Y").'-08-01'; }
elseif($Cmnt==11){ $LDate=date("Y").'-09-01'; }
elseif($Cmnt==12){ $LDate=date("Y").'-10-01'; }
elseif($Cmnt==1){ $LDate=$Oldy.'-11-01'; }
elseif($Cmnt==2){ $LDate=$Oldy.'-12-01'; }
elseif($Cmnt==3){ $LDate=date("Y").'-01-01'; }

$OGrade=0; $OGradeName='';
$schk = mysql_query("SELECT Current_Grade, Proposed_Grade,SalaryChange_Date FROM hrm_pms_appraisal_history where SalaryChange_Date>='".$LDate."' AND SalaryChange_Date<='".date("Y-m-d")."' AND Current_Grade='".$rGrade['GradeValue']."' AND Proposed_Grade='".$resGrade['GradeValue']."' AND EmpCode=".$ResE['EmpCode']." AND CompanyId=".$CompanyId." order by SalaryChange_Date", $con); 
$rowchk = mysql_num_rows($schk); $reschk = mysql_fetch_assoc($schk);

if($rowchk>0){ $OGrade=$OGradeId; $OGradeName=$reschk['Current_Grade']; $OGradeDate=date("d-m-Y",strtotime($reschk['SalaryChange_Date'])); }
else
{
$schk = mysql_query("SELECT Current_Grade, Proposed_Grade, SalaryChange_Date FROM hrm_pms_appraisal_history where SalaryChange_Date>='".$LDate."' AND SalaryChange_Date<='".date("Y-m-d")."' AND Current_Grade='".$r2Grade['GradeValue']."' AND Proposed_Grade='".$resGrade['GradeValue']."' AND EmpCode=".$ResE['EmpCode']." AND CompanyId=".$CompanyId." order by SalaryChange_Date", $con); 
$rowchk = mysql_num_rows($schk); $reschk = mysql_fetch_assoc($schk);
if($rowchk>0){ $OGrade=$O2GradeId; $OGradeName=$reschk['Current_Grade']; $OGradeDate=date("d-m-Y",strtotime($reschk['SalaryChange_Date'])); }
}

if($OGrade>0)
{
    /******************/
    $SqlEv = mysql_query("SELECT EmpVertical,DepartmentId FROM hrm_employee_general WHERE EmployeeID=".$_REQUEST['id'], $con); $Resv=mysql_fetch_assoc($SqlEv); 
 
    $sElig=mysql_query("select * from hrm_master_eligibility where DepartmentId='".$Resv['DepartmentId']."' AND GradeId='".$OGrade."' AND VerticalId=".$Resv['EmpVertical']." AND CompanyId=".$ResE['CompanyId'], $con); $rowElig=mysql_num_rows($sElig); 
 
 
    if($rowElig>0){ $rElig=mysql_fetch_assoc($sElig); }
    else
    {
     
      $sElig2=mysql_query("select * from hrm_master_eligibility where DepartmentId='".$Resv['DepartmentId']."' AND GradeId='".$OGrade."' AND VerticalId>0 AND CompanyId=".$ResE['CompanyId'], $con);  $rowElig2=mysql_num_rows($sElig2);
      if($rowElig2>0){ $rElig=mysql_fetch_assoc($sElig2); }
      else{ $sElig3=mysql_query("select * from hrm_master_eligibility where DepartmentId='".$Resv['DepartmentId']."' AND GradeId='".$OGrade."' AND VerticalId=0 AND CompanyId=".$ResE['CompanyId'], $con);  $rElig=mysql_fetch_assoc($sElig3); }
    }
    /******************/
}
/* --------------------------------------------------------------*/
/* --------------------------------------------------------------*/


/*
if($resGrade['GradeValue']!='')
{
 $sqlLod=mysql_query("select * from hrm_lodentitle where GradeValue='".$resGrade['GradeValue']."'", $con); 
 $resLod=mysql_fetch_assoc($sqlLod); 
 $sqlDaily=mysql_query("select * from hrm_dailyallow where GradeValue='".$resGrade['GradeValue']."'", $con); 
 $resDaily=mysql_fetch_assoc($sqlDaily);
 $sqlEnt=mysql_query("select * from hrm_travelentitle where GradeValue='".$resGrade['GradeValue']."'", $con); 
 $resEnt=mysql_fetch_assoc($sqlEnt);
 $sqlElig=mysql_query("select * from hrm_traveleligibility where GradeValue='".$resGrade['GradeValue']."'", $con);
 $resElig=mysql_fetch_assoc($sqlElig); 
}*/ 	  

$SqlEligEmp = mysql_query("SELECT * FROM hrm_employee_eligibility WHERE EmployeeID=".$_REQUEST['id']." AND Status='A'", $con) or die(mysql_error());  $ResEligEmp=mysql_fetch_assoc($SqlEligEmp); 

$SqlEligEmp_old = mysql_query("SELECT * FROM hrm_employee_eligibility WHERE EmployeeID=".$_REQUEST['id']." AND EligibilityId=(SELECT Max(EligibilityId) as EligibilityId FROM hrm_employee_eligibility WHERE EmployeeID=".$_REQUEST['id']." AND Status!='A')", $con);  $ResEligEmp_old=mysql_fetch_assoc($SqlEligEmp_old); 

?> 
 
  <table width="100%" style="margin-top:0px;">
	 <tr>
	  <td valign="top">
	     <table border="0" style="width:100%;float:none;" cellpadding="0">
		  <?php $sqlDesig=mysql_query("select designation_name as DesigName from core_designation where id=".$ResE['DesigId'],$con); $resDesig=mysql_fetch_assoc($sqlDesig); ?>   
<tr><td align="center" style="font-size:18px;font-family:Times New Roman;color:#000000; border:hidden;"><b><?php echo $ResE['EmpCode'].' - '.$ResE['Fname'].' '.$ResE['Sname'].' '.$ResE['Lname']; ?><br>
<?php echo 'Grade:- <font color="#0080FF">'.$resGrade['GradeValue'].'</font>&nbsp;&nbsp;&nbsp;Designation:- <font color="#0080FF">'.ucwords(strtolower($resDesig['DesigName'])).'</font>';?></b></td></tr>
<?php if($OGrade>0){ ?>
<tr><td align="center" style="font-size:18px;font-family:Times New Roman;border:hidden;color:#000000;"><b>
<?php echo 'Old Grade:- <font color="#FF0000">'.$OGradeName.'</font>&nbsp;&nbsp;&nbsp;Change Date:- <font color="#FF0000">'.$OGradeDate.'</font>';?></b></td></tr>
<?php } ?>
         
		  <tr>
		   <td valign="top" align="center"> 	   
<?php //***************************************************************************** ?>
			<table border="1">
<input type="hidden" id="DeId" class="All_100" value="<?php echo $ResE['DepartmentId']; ?>"/> 	


<?php 
if(!isset($_REQUEST['typeT']) && !isset($_REQUEST['m']))
{
?>

<?php //if($resMK['Elig']=='Y'){ ?>

<!------------------------------------------------------------------------->
<!------------------------------------------------------------------------->

<tr>
 <td style="text-align:center;background-color:#FFFFFF;">
<style>
 .tdd1{width:550px;font-size:16px;height:16px;text-align:left;}
 .tdd2{width:205px;font-size:16px;text-align:left;}
</style>
<table style="border-style:outset;border-color:#75A633;background-color:#FFFFFF; font-family:Times New Roman; text-align:center;" border="0" cellpadding="2" cellspacing="2">


<?php //Lodging Entitlements Lodging Entitlements Lodging Entitlements Lodging Entitlements ?>
<?php //Lodging Entitlements Lodging Entitlements Lodging Entitlements Lodging Entitlements ?>
<tr>
 <td colspan="3" style="width:680px;font-size:14px;height:16px;" align="left"><b>*&nbsp;&nbsp;Lodging Entitlements :</b>&nbsp;(Actual with upper limits per day).</td>
</tr>
<tr>
 <td colspan="3" style="width:100%;">
 <table border="1" style="width:100%;" cellpadding="1" cellspacing="0">
 <tr>
  <td style="width:150px;font-size:16px;" align="center">City Category</td>
  <td style="width:150px;font-size:16px;" align="center"><b>A</b></td>
  <td style="width:150px;font-size:16px;" align="center"><b>B</b></td>
  <td style="width:150px;font-size:16px;" align="center"><b>C</b></td>
 </tr>
 <?php /*
 <tr>
  <td style="width:150px;font-size:16px;" align="center">Year 2024-25</td>
  <td style="width:155px;" align="center">
  <?php if($ResEligEmp['old_Lodging_CategoryA']!=''){echo intval($ResEligEmp['old_Lodging_CategoryA']);}?></td>
  <td style="width:155px;" align="center">
  <?php if($ResEligEmp['old_Lodging_CategoryB']!=''){echo intval($ResEligEmp['old_Lodging_CategoryB']);}?></td>
  <td style="width:155px;" align="center">
  <?php if($ResEligEmp['old_Lodging_CategoryC']!=''){echo intval($ResEligEmp['old_Lodging_CategoryC']);}?></td>
 </tr>
 */?>
 <tr>
  <td style="width:150px;font-size:16px;" align="center">New</td>
  <td style="width:155px;" align="center">
  <?php if($ResEligEmp['Lodging_CategoryA']!=''){echo intval($ResEligEmp['Lodging_CategoryA']);}?></td>
  <td style="width:155px;" align="center">
  <?php if($ResEligEmp['Lodging_CategoryB']!=''){echo intval($ResEligEmp['Lodging_CategoryB']);}?></td>
  <td style="width:155px;" align="center">
  <?php if($ResEligEmp['Lodging_CategoryC']!=''){echo intval($ResEligEmp['Lodging_CategoryC']);}?></td>
 </tr>
 <?php if($OGrade>0){ ?>
 <tr>
  <td style="width:150px;font-size:16px;color:#FF0000;" align="center">Old</td>
  <td style="width:155px;color:#FF0000;" align="center">
  <?php if($rElig['CategoryA']!=''){echo intval($rElig['CategoryA']);}?></td>
  <td style="width:155px;color:#FF0000;" align="center">
  <?php if($rElig['CategoryB']!=''){echo intval($rElig['CategoryB']);}?></td>
  <td style="width:155px;color:#FF0000;" align="center">
  <?php if($rElig['CategoryC']!=''){echo intval($rElig['CategoryC']);}?></td>
 </tr>
 <?php } ?>
 </table>
 </td>
</tr>
<tr><td style="height:10px;"></td></tr>


<?php //DA DA DA DA DA DA DA DA DA DA DA DA DA DA DA DA DA DA DA DA DA DA DA DA DA DA ?>
<?php //DA DA DA DA DA DA DA DA DA DA DA DA DA DA DA DA DA DA DA DA DA DA DA DA DA DA ?>

<?php if(($ResEligEmp['DA_Outside_Hq']!='' AND $ResEligEmp['DA_Outside_Hq']!='NA') OR ($ResEligEmp['DA_Inside_Hq']!='' AND $ResEligEmp['DA_Inside_Hq']!='NA')){ ?>
<tr>
 <td colspan="3" style="width:680px;font-size:14px;height:16px;" align="left"><b>*&nbsp;&nbsp;Daily Allowances :</b></td>
</tr>

<tr>
 <td colspan="3" style="width:100%;">
 <table border="1" style="width:100%;" cellpadding="1" cellspacing="0">
 <?php if($ResEligEmp['DA_Inside_Hq']!='' AND $ResEligEmp['DA_Inside_Hq']!='NA' AND $ResEligEmp['DA_Inside_Hq']!=' '){ ?>
 <tr>
  <td style="width:65%;font-size:16px;">&nbsp;DA@HQ : <?=$ResEligEmp['DA_Inside_Hq_Rmk']?></td>
  <td style="width:35%;" align="center">&nbsp;<?=$ResEligEmp['DA_Inside_Hq']?></td>
 </tr>
 <?php } 
 if($ResEligEmp['DA_Outside_Hq']!='' AND $ResEligEmp['DA_Outside_Hq']!='NA' AND $ResEligEmp['DA_Outside_Hq']!=' '){ ?>
 <tr>
  <td style="width:65%;font-size:16px;">&nbsp;<?php if($ResE['DepartmentId']==2){echo 'Fooding Expense (For outside HQ travel with night halt)'; }else{ echo 'DA OutsideHQ '.$ResEligEmp['DA_Outside_Hq_Rmk']; } ?> : </td>
  <td style="width:35%;" align="center">&nbsp;<?=$ResEligEmp['DA_Outside_Hq']?></td>
 </tr>
 <?php } ?>
 
 <?php if($OGrade>0){ ?>
 
 <?php if($rElig['DA_InSiteHQ']!='' AND $rElig['DA_InSiteHQ']!='NA' AND $rElig['DA_InSiteHQ']!=' '){ ?>
 <tr>
  <td style="width:65%;font-size:16px;color:#FF0000;">&nbsp;DA@HQ <font color="#FF0000">Old</font> : <?=$rElig['DA_InSiteHQ_Rmk']?></td>
  <td style="width:35%;color:#FF0000;" align="center">&nbsp;<?=$rElig['DA_InSiteHQ']?></td>
 </tr>
 <?php } 
 if($rElig['DA_OutSiteHQ']!='' AND $rElig['DA_OutSiteHQ']!='NA' AND $rElig['DA_OutSiteHQ']!=' '){ ?>
 <tr>
  <td style="width:65%;font-size:16px;color:#FF0000;">&nbsp;<?php if($ResE['DepartmentId']==2){echo 'Fooding Expense (For outside HQ travel with night halt)'; }else{ echo 'DA OutsideHQ '.$rElig['DA_OutSiteHQ_Rmk']; } ?> <font color="#FF0000">Old</font> : </td>
  <td style="width:35%;color:#FF0000;" align="center">&nbsp;<?=$rElig['DA_OutSiteHQ']?></td>
 </tr>
 <?php } ?>
 
 <?php } ?>
 
 
 </table>
 </td>
</tr>
<tr><td style="height:10px;"></td></tr>
<?php } ?>



<?php //Travel Eligibility Travel Eligibility Travel Eligibility Travel Eligibility ?>
<?php //Travel Eligibility Travel Eligibility Travel Eligibility Travel Eligibility ?>
<?php if(($ResEligEmp['Travel_TwoWeeKM']!='' AND $ResEligEmp['Travel_TwoWeeKM']!='NA' AND $ResEligEmp['Travel_TwoWeeKM']!=' ') OR ($ResEligEmp['Travel_FourWeeKM']!='' AND $ResEligEmp['Travel_FourWeeKM']!='NA' AND $ResEligEmp['Travel_FourWeeKM']!=' ')){ ?>
<tr>
 <td colspan="3" style="width:680px;font-size:14px;height:16px;" align="left"><b>*&nbsp;&nbsp;Travel Eligibility :</b> (For Official Purpose Only)</td>
</tr>
 <tr>
  <td colspan="3" style="width:100%;">
  <table border="1" style="width:100%;" cellpadding="1" cellspacing="0">
  <?php if($ResEligEmp['Travel_TwoWeeKM']!='' AND $ResEligEmp['Travel_TwoWeeKM']!='NA' AND $ResEligEmp['Travel_TwoWeeKM']!=' '){?>
  <tr>
  <td style="width:40%;font-size:16px;">&nbsp;2 Wheeler :</td>
  <td style="width:60%;" align="center">&nbsp;<?='Rs. '.$ResEligEmp['Travel_TwoWeeKM'].'/Km '.$ResEligEmp['Travel_TwoWeeKM_Rmk']?></td>
 </tr>
 <?php } ?>
 <?php if($ResEligEmp['Travel_FourWeeKM']!='' AND $ResEligEmp['Travel_FourWeeKM']!='NA' AND $ResEligEmp['Travel_FourWeeKM']!=' '){?>
  <tr>
  <td style="width:40%;font-size:16px;">&nbsp;4 Wheeler :</td>
  <td style="width:60%;" align="center">&nbsp;<?php if($ResEligEmp['VehiclePolicy']!='' AND $ResEligEmp['VehiclePolicy']!='0'){ echo $ResEligEmp['Travel_FourWeeKM_Rmk']; }else{ echo 'Rs. '.$ResEligEmp['Travel_FourWeeKM'].'/Km '.$ResEligEmp['Travel_FourWeeKM_Rmk']; }?></td>
 </tr>
 <?php } ?>
 
<?php } ?>
 
 <?php if($ResEligEmp['CostOfVehicle']!='' AND $ResEligEmp['CostOfVehicle']!=0 AND $ResEligEmp['CostOfVehicle']!='NA'){ ?>
 <tr>
  <td style="width:40%;font-size:16px; vertical-align:middle;">&nbsp;Vehicle Entitlement value :</td>
  <td style="width:60%;" align="center">&nbsp;<?='Rs. '.$ResEligEmp['CostOfVehicle']?></td>
 </tr>
 <?php } if($ResEligEmp['Flight_Allow']=='Y' OR $ResEligEmp['Train_Allow']=='Y'){ ?>
 <tr>
  <td style="width:40%;font-size:16px;">&nbsp;Mode/Class of Travel outside HQ :</td>
  <td style="width:60%;" align="center">&nbsp;<?php if($ResEligEmp['Flight_Allow']=='Y'){ echo '<b>Flight</b> - '.$ResEligEmp['Flight_Class'].' '.$ResEligEmp['Flight_Rmk'].'<br>'; } if($ResEligEmp['Train_Allow']=='Y'){ echo '<b>Train/Bus</b> - '.$ResEligEmp['Train_Class'].' '.$ResEligEmp['Train_Rmk']; }?></td>
 </tr>
 <?php } ?>
 
 </table>
 </td>
</tr>
<tr><td style="height:10px;"></td></tr>





<br />
<?php //Mobile Eligibility Mobile Eligibility Mobile Eligibility Mobile Eligibility ?>
<?php //Mobile Eligibility Mobile Eligibility Mobile Eligibility Mobile Eligibility ?>

<?php if(($ResEligEmp['Mobile_Hand_Elig']=='Y' AND $ResEligEmp['Mobile_Hand_Elig_Rs']!='' AND $ResEligEmp['Mobile_Hand_Elig_Rs']!='NA') OR ($ResEligEmp['Mobile_Exp_Rem']=='Y' AND $ResEligEmp['Mobile_Exp_Rem_Rs']!='' AND $ResEligEmp['Mobile_Exp_Rem_Rs']!='NA')){ ?>
<tr>
 <td colspan="3" style="width:680px;font-size:14px;height:16px;" align="left"><b>*&nbsp;Mobile Eligibility :</b></td>
</tr>

<tr>
 <td colspan="3" style="width:100%;">
 <table border="1" style="width:100%;" cellpadding="1" cellspacing="0">
 <?php if(($ResEligEmp_old['Mobile_Exp_Rem']=='Y' AND $ResEligEmp_old['Mobile_Exp_Rem_Rs']!='' AND $ResEligEmp_old['Mobile_Exp_Rem_Rs']!='NA' AND $ResEligEmp_old['Prd']!='') OR ($ResEligEmp_old['Mobile_Exp_RemPost_Rs']!='' AND $ResEligEmp_old['Mobile_Exp_RemPost_Rs']!='NA' AND $ResEligEmp_old['PrdPost']!='')){ ?>
 <tr>
  <td style="width:40%;font-size:16px;">&nbsp;Mobile expenses Reimbursement<br>&nbsp;<b>(2024-25)</b> : </td>
  <td style="width:60%;" align="center">&nbsp;<?php if($ResEligEmp_old['Mobile_Exp_Rem']=='Y' AND $ResEligEmp_old['Mobile_Exp_Rem_Rs']!='' AND $ResEligEmp_old['Mobile_Exp_Rem_Rs']!='NA' AND $ResEligEmp_old['Prd']!=''){ if($ResE['DepartmentId']!=2){echo '<b>Prepaid:</b>';} echo ' Rs. '.$ResEligEmp_old['Mobile_Exp_Rem_Rs']; if($ResEligEmp_old['Prd']=='Mnt'){echo '/Month.';}elseif($ResEligEmp_old['Prd']=='Qtr'){echo '/Quarter.';}elseif($ResEligEmp_old['Prd']=='1/2 Yearly'){echo '/half Yearly.';}elseif($ResEligEmp_old['Prd']=='Yearly.'){echo '/Year';}  if($ResEligEmp_old['Mobile_Exp_Rem_Rmk']!=''){ echo ' '.$ResEligEmp_old['Mobile_Exp_Rem_Rmk']; } echo '<br>'; } ?>
  
  <?php if($ResEligEmp_old['Mobile_Exp_RemPost_Rs']!='' AND $ResEligEmp_old['Mobile_Exp_RemPost_Rs']!='NA' AND $ResEligEmp_old['PrdPost']!=''){ if($ResE['DepartmentId']!=2){echo '<b>Postpaid:</b>';} echo ' Rs. '.$ResEligEmp_old['Mobile_Exp_RemPost_Rs']; if($ResEligEmp_old['PrdPost']=='Mnt'){echo '/Month.';}elseif($ResEligEmp_old['PrdPost']=='Qtr'){echo '/Quarter.';}elseif($ResEligEmp_old['PrdPost']=='1/2 Yearly'){echo '/Half Yearly.';}elseif($ResEligEmp_old['PrdPost']=='Yearly'){echo '/Year.';} if($ResEligEmp_old['Mobile_Exp_RemPost_Rmk']!=''){ echo ' '.$ResEligEmp_old['Mobile_Exp_RemPost_Rmk']; }  } ?>
  
  </td>
 </tr>
 <?php } if($ResEligEmp['Mobile_Hand_Elig']=='Y' AND $ResEligEmp['Mobile_Hand_Elig_Rs']!='' AND $ResEligEmp['Mobile_Hand_Elig_Rs']!='NA'){ ?>
 <tr>
  <td style="width:40%;font-size:16px;">&nbsp;Mobile Handset Eligibility : </td>
  <td style="width:60%;" align="center">&nbsp;<?='Rs. '.$ResEligEmp['Mobile_Hand_Elig_Rs']?> &nbsp;&nbsp;<b><?=$ResEligEmp['Mobile_Hand_Elig_Rmk']?></b></td>
 </tr>
 <?php } ?>
 </table>
 </td>
</tr>
<tr><td style="height:10px;"></td></tr>
<?php } ?>




<?php //Insurance Insurance Insurance Insurance Insurance Insurance Insurance Insurance ?>
<?php //Insurance Insurance Insurance Insurance Insurance Insurance Insurance Insurance ?>
<?php if($ResCtc['ESCI']==0 OR $ResCtc['ESCI']=='' OR $ResEligEmp['HelthCheck']=='Y'){ ?>
<tr>
 <td colspan="3" style="width:680px;font-size:14px;height:16px;" align="left"><b>*&nbsp;Insurance :</b></td>
</tr>

<tr>
 <td colspan="3" style="width:100%;">
 <table border="1" style="width:100%;" cellpadding="1" cellspacing="0">
 <?php if($ResCtc['ESCI']>0){ echo ''; } else { ?>
 <?php if($ResEligEmp['Health_Insurance']!='' AND $ResEligEmp['Health_Insurance']!='NA'){ ?>
 <tr>
  <td style="width:75%;font-size:16px;">&nbsp;Health Insurance (Sum Insured) : </td>
  <td style="width:25%;" align="center">&nbsp;<?='Rs. '.$ResEligEmp['Health_Insurance']?></td>
 </tr>
 <?php } ?>
 <?php } 
 
 if($CompanyId==1 AND $ResEligEmp['Term_Insurance']!=''){ ?>
 <tr>
  <td style="width:75%;font-size:16px;">&nbsp;Group Term Life Insurance (Sum Insured) :  </td>
  <td style="width:25%;" align="center">&nbsp;<?='Rs. '.$ResEligEmp['Term_Insurance']?></td>
 </tr>
 <?php } //if($CompanyId==1) ?>
 
 <?php if($ResEligEmp['HelthCheck']=='Y' AND $ResEligEmp['HelthCheck_Amt']!=''){ ?>
 <tr>
  <td style="width:75%;font-size:16px;">&nbsp;Executive Health Check-up : <b><?=$ResEligEmp['HelthCheck_Rmk']?></b></td>
  <td style="width:25%;" align="center">&nbsp;<?='Rs. '.$ResEligEmp['HelthCheck_Amt']?></td>
 </tr>
 <?php } ?> 
 
 <?php if($CompanyId==3){ ?>
 <tr>
  <td style="width:75%;font-size:16px;">&nbsp;Group Term Life Insurance (Sum Insured) :  </td>
  <td style="width:25%;" align="center">&nbsp;<?php 
                    if($ResE['GradeId']==31){ echo '05 Lakhs';}
					elseif($ResE['GradeId']=32){ echo '10 Lakhs';}
					elseif($ResE['GradeId']==33 || $ResE['GradeId']==34){ echo '25 Lakhs';}
					elseif($ResE['GradeId']==35){ echo '50 Lakhs'; }?>
					</td>
 </tr>
 <?php } //if($CompanyId==3) ?>
 
 </table>
 </td>
</tr>
<tr><td style="height:10px;"></td></tr>
<?php } ?>
<tr>
 <td colspan="3" style="width:100%;">
 <table border="1" style="width:100%;" cellpadding="1" cellspacing="0">
 <tr>
  <td style="width:75%;font-size:16px;">&nbsp;Gratuity :</td>
  <td style="width:25%;" align="center">&nbsp;AS per Law</td>
 </tr>
 <tr>
  <td style="width:75%;font-size:16px;">&nbsp;Deduction :(Provident Fund/ ESIC/ Tax on Employment/ Income Tax/ Any dues to company(if any)/ Advances)</td>
  <td style="width:25%;" align="center">&nbsp;AS per Law</td>
 </tr>
 </table>
 </td>
</tr>  




<?php //Other Other Other Other Other Other Other Other Other Other Other Other Other Other ?>
<?php //Other Other Other Other Other Other Other Other Other Other Other Other Other Other ?>



<?php //Note Note Note Note Note Note Note Note Note Note Note Note ?>
<?php //Note Note Note Note Note Note Note Note Note Note Note Note ?>

 <tr><td colspan="2" style="width:680px;font-size:12px;height:14px;" align="left"><b>Note:</b></td></tr>
 <tr>
  <td colspan="2" style="width:680px;font-size:12px;height:14px;">
  <table>
  <?php if(($ResE['DepartmentId']==6 OR $ResE['DepartmentId']==3) AND ($ResE['GradeValue']=='J3' OR $ResE['GradeValue']=='J4')){ ?>
  <?php if($ResE['GradeValue']=='J3'){ ?>
  <tr>
   <td style="width:30px;font-size:16px;height:14px;" align="center" valign="top">[a]</td>
   <td style="width:630px;font-size:16px;height:14px;" align="left">Four wheeler entitlements are applicable for personal vehicle or equivalent allowed amount (Rs. 22000/month) can be claimed for hired vehicle. Overall travel by four wheeler & two wheeler should not exceed by more than 3000 km/month.</td>
  </tr>
  <?php }elseif($ResE['GradeValue']=='J4'){ ?>
  <tr>
   <td style="width:30px;font-size:16px;height:16px;" align="center" valign="top">[a]</td>
   <td style="width:630px;font-size:16px;height:16px;" align="left">Four wheeler entitlements are applicable for personal vehicle or equivalent allowed amount (Rs. 27500/month) can be claimed for hired vehicle. Overall travel by four wheeler & two wheeler should not exceed by more than 3000 km/month.</td>
  </tr>
  <?php } ?>
  <tr>
   <td style="width:30px;font-size:16px;height:14px;" align="center" valign="top">[b]</td>
   <td style="width:630px;font-size:16px;height:14px;" align="left">The changed entitlements will be effective from 1st March <?=date("Y")?>.</td>
   <?php //echo '1st April '.date("Y");//$SeteD; the policy release date ?>
  </tr>
  <tr>
   <td style="width:30px;font-size:16px;height:14px;" align="center" valign="top">[c]</td>
   <td style="width:630px;font-size:16px;height:14px;" align="left">The expense claims on 2 wheeler/4 wheeler is subject to the employee having a valid driving license. The photocopy should be provided to HR.</td>
  </tr>
<?php } else { ?>
  <tr>
   <td style="width:30px;font-size:16px;height:14px;" align="center" valign="top">[a]</td>
   <td style="width:630px;font-size:16px;height:14px;" align="left">The changed entitlements will be effective from 1st March <?=date("Y")?>.</td>
  </tr>
  <tr>
   <td style="width:30px;font-size:16px;height:14px;" align="center" valign="top">[b]</td>
   <td style="width:630px;font-size:16px;height:14px;" align="left">The expenses claim on 2 wheeler/4 wheeler is subject to the employee having a valid driving license. The photocopy of which shall be provided to HR.</td>
  </tr>
<?php } ?>  


  <tr>
   <td style="width:30px;font-size:16px;height:14px;" align="center" valign="top">[c]</td>
   <td style="width:630px;font-size:16px;height:14px;" align="left">The change in insurance coverage slab shall be effective from the next insurance policy renewal date.</td>
  </tr>	
  <tr>
   <td style="width:30px;font-size:16px;height:14px;" align="center" valign="top">[d]</td>
   <td style="width:630px;font-size:16px;height:14px;" align="left">For those covered in vehicle policy may refer to the HR manual in ESS for further details.</td>
  </tr>	  
  <tr><td style="height:50px;">&nbsp;</td></tr>	   
  </table>
  </td>
 </tr>
 </table>
 </td>
</tr>
 </td>
 
  </table>
 </td> 
 
<tr>
<!------------------------------------------------------------------------->
<!------------------------------------------------------------------------->
	
<?php //} //if($resMK['Elig']=='Y') ?>

<?php } //if(!isset($_REQUEST['typeT']) && !isset($_REQUEST['mn']))

else
{
?>

<style>.fontH {font-family:Times New Roman;font-size:16px;}.font {font-family:Times New Roman;font-size:13px;}
.calendar { color:black;margin-left:0px;;width:100%;border:1px solid #CDCDCD; }
.weekday { text-align:center;width:14%;height:30px;border:1px solid #CCCCCC;font-style:oblique;font-family:Times New Roman; font-weight:bold; background-color:#FFFF9F; color:#000000; }
.day { border:1px solid #CCCCCC;width:15%;height:100px;vertical-align:top;font-style:oblique;font-family:Times New Roman; font-size:18px;} 
.leave { text-align:center;width:100%;height:30px;font-style:oblique;font-family:Times New Roman; font-weight:bold; background-color:#FFFF9F; color:#000000; }
.thead { width:25%;vertical-align:top;font-style:oblique;font-family:Times New Roman; font-size:18px; text-align:center;background-color:#FFFF9F; color:#000000;} 
.tbody { width:25%;vertical-align:middle;font-style:oblique;font-family:Times New Roman; font-size:16px; text-align:center;background-color:#FFFFFF; color:#000000; height:22px;} 
.Ld { color:black;margin-left:0px;;width:60%;border:1px solid #CDCDCD; }
.ttbody { width:25%;vertical-align:middle;font-family:Times New Roman;font-size:16px;text-align:center;color:#000000; height:22px;font-weight:bold;} 
.tt2body { width:75%;vertical-align:middle;font-family:Times New Roman;font-size:16px;color:#000000;height:22px; font-weight:bold;}
.tt2b { vertical-align:middle;font-family:Times New Roman;font-size:16px;color:#000000;height:22px; font-weight:bold;}
</style>
<br><br>
<tr>
<?php if($_REQUEST['m']==1){$SelM='January';} if($_REQUEST['m']==2){$SelM='February';} if($_REQUEST['m']==3){$SelM='March';}if($_REQUEST['m']==4){$SelM='April';} if($_REQUEST['m']==5){$SelM='May';} if($_REQUEST['m']==6){$SelM='June';} if($_REQUEST['m']==7){$SelM='July';} if($_REQUEST['m']==8){$SelM='August';} 
if($_REQUEST['m']==9){$SelM='September';} if($_REQUEST['m']==10){$SelM='October';} if($_REQUEST['m']==11){$SelM='November';} if($_REQUEST['m']==12){$SelM='December';} 

$mn=date("m"); $m=date("F",strtotime(date("Y-m-d"))); 
if((date("m")==01 OR date("m")==03 OR date("m")==05 OR date("m")==07 OR date("m")==08 OR date("m")==10) AND date("d")==31){$Lmn=date("m")-1;}
elseif(date("m")==12 AND date("d")==31){$Lmn=11;}
else{ $Lmn=date('m',strtotime("-1 months",strtotime(date("Y-m-d")))); } 
$Lm=date('F',strtotime("-1 months",strtotime(date("Y-m-d")))); 
?>				 
<?php /****************************** Start *************************************/ ?>

<?php $sqle=mysql_query("select DateJoining from hrm_employee_general where EmployeeID=".$_REQUEST['id'],$con); $rese=mysql_fetch_assoc($sqle); ?>

<td align="left" width="100%" valign="top">
 <table border="0" width="100%">
   <tr style="height:29px;">
	<td width="100%">
    <table width="100%" border="0">
    <tr>
     <td align="center"><font color="#006200" class="fontH"><b><i>Attendance Details</i></b></font>&nbsp;&nbsp;&nbsp;&nbsp;<font color="#000000" class="fontH"><b>Month:&nbsp;<i><?php echo $SelM; ?></i></b></font>&nbsp;&nbsp;&nbsp;&nbsp;<font color="#000000" class="fontH"><b>[24 hour format]</b></font></td>
	</tr>
	</table>
	</td> 
   </tr>	
<?php $cm=date("m"); if($cm==1){$pm=12;}else{$pm=date("m")-1;} //echo  $cm.'-'.$pm; 

//if($_REQUEST['m']==$cm OR $_REQUEST['m']==$pm){ ?>    
<?php /*********************** Open ***********************/ ?> 		  	 
   <tr style="height:50px;">
	<td style="width:100%;">
    <table width="100%" border="0">
    <tr>
     <td style="width:100%;">
<?php $m=$_REQUEST['m']; 
      //if(date("m")==1 AND $m==12){$y=date("Y")-1;}else{$y=date("Y");}
      $y=$_REQUEST['y'];
$mkdate = mktime(0,0,0, $m, 1, $y); $FDay = date('w',$mkdate); $pwkDay = date('w',$mkdate);
$days = date('t',$mkdate); $sieve = $_REQUEST['y'].$_REQUEST['m'].'01'; $day = '1';  $showBtn=1; ?>	
 
<?php /******* Calander Open *******/ ?>
<table class="calendar" style="width:100%;" cellpadding="2" cellspacing="0" border="0">
 <tr>
  <td class="weekday">Sunday</td><td class="weekday">Monday</td><td class="weekday">Tuesday</td>
  <td class="weekday">Wednesday</td><td class="weekday">Thursday</td><td class="weekday">Friday</td>
  <td class="weekday">Saturday</td>
 </tr>
 <tr>
<?php $weeks = '1'; $loopCount ='1'; while($loopCount<=$FDay){ ?>
	  <td class="day" style="height:60px;width:10%;"><img src="images/something.gif" alt="0"/></td>
<?php $loopCount++; } $FDay++; ?>
	  
<?php $nan=1; 
      while($day<=$days)
      { //While-Open
      
      $len=strlen($day); if($len==1){ $day='0'.$day; }
      
	  $sE=mysql_query("SELECT * FROM hrm_employee_attendance WHERE EmployeeID=".$_REQUEST['id']." AND AttDate='".date($y."-".$m."-".$day)."'", $con); $rowE=mysql_num_rows($sE); 
	  if($rowE==0)
	  {
	   $sE=mysql_query("SELECT * FROM hrm_employee_attendance_".$y." WHERE EmployeeID=".$_REQUEST['id']." AND AttDate='".date($y."-".$m."-".$day)."'", $con); $rowE=mysql_num_rows($sE);
	  }
	  $rE=mysql_fetch_array($sE); 
	  ?>
	  
      <td class="day" style="height:60px;width:10%;" bgcolor="<?php if(date("w",strtotime(date($y."-".$m."-".$day)))==0){echo '#428400';} else{ echo '#FFFFFF'; }?>" >
<?php /*** Disply Records Open *****/?>					  
	  <?php if($day>0){echo $day;}else{echo '';} ?>
	  &nbsp;&nbsp;<b><?=$rE['AttValue']?></b>
	  <font style="margin-left:35px;font-style:normal;font-size:18px;font-weight:bold;"></font>
	  
	  <?php 
	  if(date("w",strtotime(date($y."-".$m."-".$day)))!=0)
	  {
	  if(strlen($_REQUEST['m'])==1){$mm='0'.$_REQUEST['m']; }else{$mm=$_REQUEST['m']; } 
	  $sqlRpt=mysql_query("select MorReports from hrm_employee_moreve_report_".$_REQUEST['y']." where EmployeeID=".$_REQUEST['id']." AND MorEveDate='".$_REQUEST['y']."-".$mm."-".$day."' AND MorReports!=''",$con);
		$rDetl2l=mysql_fetch_assoc($sqlRpt); echo '<font style="font-size:12px;font-style:normal;">'.$rDetl2l['MorReports'].'</font>'; 
	  }
	  ?>
<?php /** Disply Records Close *****/ ?>
		
	    </td> 
<?php if($FDay == '7'){ echo '</tr><tr>'; $FDay='0'; $weeks++;} $day++; $sieve++; $FDay++; 
      } //While-Close ?>
	  
<?php $dim=$weeks*7; $lastdays=$dim-($days+$pwkDay); $lc=1; while($lc<=$lastdays){ ?>
        <td class="day" style="height:60px;width:10%;"><img src="images/something.gif" alt="0"/></td><?php $lc++; } ?>
 
 </tr>
</table>
<?php /******* Calander Close *******/ ?>
</td>
</tr>
<?php //} //if($_REQUEST['m']==$cm OR $_REQUEST['m']==$pm) ?>


<?php
} //else
?>
</table>


			
<?php //***************************************************************************** ?>
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