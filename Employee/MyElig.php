<?php session_start();
if($_SESSION['login'] = true){require_once('../AdminUser/config/config.php');}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('../AdminUser/logcheck.php');
if($_SESSION['logCheckEmp']!=$logemp){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('EmpMenuSession.php');}
?>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php include_once('../Title.php'); ?></title>

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
.TableHead1 { font-family:Times New Roman; color:#000000; background-color:#FFFFFF; font-size:13px; overflow:hidden; } .InputText {font-family:Times New Roman; font-size:12px; width:100px; height:19px; }
.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}</style>
<Script type="text/javascript">window.history.forward(1);</Script>
<script type="text/javascript" language="javascript">
function SalaryHelpDoc()
{window.open("SalaryHelpDoc.php?action=help","HelpDoc","menubar=no,scrollbars=yes,resizable=no,directories=no,width=720,height=600");}
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
						    <td align="left" valign="top" width="150">
<?php include("EmpImgEmp.php"); ?>
<?php //echo "<img width=105px height=125px src=\"show_images.php?id=".$EmployeeId."\">\n";?></td>
						  </tr>
					 </table>
				 </td>
				  <td align="left" width="850" valign="top">
	     <table border="0" width="1000">
		    <tr>
			 <td colspan="10"><table border="0"><tr>
		     <?php if($resMK['Ctc']=='Y' AND $CompanyId==1) { ?>
             <td align="center"><a href="MyCtc.php?mnt=89we&p=345&ok=tt&r=101&prp=false_res##ius&log=%true%t&oo=4e&p=g&ok=trt"><img id="Img_ctc11" style="display:block;" src="images/ctc1.png" border="0"/></a>
		     <img id="Img_ctc" style="display:none;" src="images/ctc.png" border="0"/></td>
			 <?php } elseif($resMK['Ctc']=='Y' AND $CompanyId!=1) { ?>
             <td align="center"><a href="MyCtc.php?mnt=89we&p=345&ok=tt&r=101&prp=false_res##ius&log=%true%t&oo=4e&p=g&ok=trt"><img id="Img_ctc11" style="display:block;" src="images/ctc1.png" border="0"/></a>
		     <img id="Img_ctc" style="display:none;" src="images/ctc.png" border="0"/></td><?php } ?>
		     
		     
		     
		     
             <?php if($resMK['Elig']=='Y'){ ?> 
             <td align="center"><a href="MyElig.php"><img id="Img_elig1" style="display:none;" src="images/elig1.png" border="0"/></a>
		     <img id="Img_elig" style="display:block;" src="images/elig.png" border="0"/></td><?php } ?>
			 <td>&nbsp;</td>
			 <td style="width:200px;font-family:Times New Roman;" valign="top">
			 <a href="#" onClick="SalaryHelpDoc()"><font color="#000099" size="3" ><b>Help Document</b></font></font></a>
             </td>
			 </tr></table></td>
			</tr>
			<tr>
			 <td>
			<table border="1">
<?php $SqlE=mysql_query("SELECT GradeId, DepartmentId, EmpAddBenifit_MediInsu_value FROM hrm_employee_general g INNER JOIN hrm_employee_ctc c ON g.EmployeeID=c.EmployeeID WHERE g.EmployeeID=".$EmployeeId, $con); $ResE=mysql_fetch_assoc($SqlE); 

$SqlCtc=mysql_query("SELECT ESCI FROM hrm_employee_ctc WHERE Status='A' AND EmployeeID=".$EmployeeId, $con); $ResCtc=mysql_fetch_assoc($SqlCtc); 

$sqlGrade=mysql_query("select GradeValue from hrm_grade where GradeId=".$ResE['GradeId'], $con); 
$resGrade=mysql_fetch_assoc($sqlGrade);
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
} 	  

$SqlEligEmp = mysql_query("SELECT * FROM hrm_employee_eligibility WHERE EmployeeID=".$EmployeeId." AND Status='A'", $con) or die(mysql_error());  $ResEligEmp=mysql_fetch_assoc($SqlEligEmp); 

?>
<input type="hidden" id="DeId" class="All_100" value="<?php echo $ResE['DepartmentId']; ?>"/> 	
<?php if($resMK['Elig']=='Y'){ ?>

<?php if($CompanyId!=2){ ?>
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
 <tr>
  <td style="width:150px;font-size:16px;" align="center">Amount (in Rs.)</td>
  <td style="width:155px;" align="center">
  <?php if($ResEligEmp['Lodging_CategoryA']!=''){echo intval($ResEligEmp['Lodging_CategoryA']);}?></td>
  <td style="width:155px;" align="center">
  <?php if($ResEligEmp['Lodging_CategoryB']!=''){echo intval($ResEligEmp['Lodging_CategoryB']);}?></td>
  <td style="width:155px;" align="center">
  <?php if($ResEligEmp['Lodging_CategoryC']!=''){echo intval($ResEligEmp['Lodging_CategoryC']);}?></td>
 </tr>
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
  <?php if($ResEligEmp['VehiclePolicy']==9){ ?>
  <td style="width:60%;" align="center">&nbsp;<?='Two Wheeler policy - R&D, upto J2 for Field'?></td>
  <?php }else{ ?>
  <td style="width:60%;" align="center">&nbsp;<?='Rs. '.$ResEligEmp['Travel_TwoWeeKM'].'/Km '.$ResEligEmp['Travel_TwoWeeKM_Rmk']?></td>
  <?php } ?>
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
 <?php if(($ResEligEmp['Mobile_Exp_Rem']=='Y' AND $ResEligEmp['Mobile_Exp_Rem_Rs']!='' AND $ResEligEmp['Mobile_Exp_Rem_Rs']!='NA' AND $ResEligEmp['Prd']!='') OR ($ResEligEmp['Mobile_Exp_RemPost_Rs']!='' AND $ResEligEmp['Mobile_Exp_RemPost_Rs']!='NA' AND $ResEligEmp['PrdPost']!='')){ ?>
 <tr>
  <td style="width:40%;font-size:16px;">&nbsp;Mobile expenses Reimbursement : </td>
  <td style="width:60%;" align="center">&nbsp;<?php if($ResEligEmp['Mobile_Exp_Rem']=='Y' AND $ResEligEmp['Mobile_Exp_Rem_Rs']!='' AND $ResEligEmp['Mobile_Exp_Rem_Rs']!='NA' AND $ResEligEmp['Prd']!=''){ if($ResE['DepartmentId']!=2){echo '<b>Prepaid:</b>';} echo ' Rs. '.$ResEligEmp['Mobile_Exp_Rem_Rs']; if($ResEligEmp['Prd']=='Mnt'){echo '/Month.';}elseif($ResEligEmp['Prd']=='Qtr'){echo '/Quarter.';}elseif($ResEligEmp['Prd']=='1/2 Yearly'){echo '/half Yearly.';}elseif($ResEligEmp['Prd']=='Yearly.'){echo '/Year';}  if($ResEligEmp['Mobile_Exp_Rem_Rmk']!=''){ echo ' '.$ResEligEmp['Mobile_Exp_Rem_Rmk']; } echo '<br>'; } ?>
  
  <?php if($ResEligEmp['Mobile_Exp_RemPost_Rs']!='' AND $ResEligEmp['Mobile_Exp_RemPost_Rs']!='NA' AND $ResEligEmp['PrdPost']!=''){ if($ResE['DepartmentId']!=2){echo '<b>Postpaid:</b>';} echo ' Rs. '.$ResEligEmp['Mobile_Exp_RemPost_Rs']; if($ResEligEmp['PrdPost']=='Mnt'){echo '/Month.';}elseif($ResEligEmp['PrdPost']=='Qtr'){echo '/Quarter.';}elseif($ResEligEmp['PrdPost']=='1/2 Yearly'){echo '/Half Yearly.';}elseif($ResEligEmp['PrdPost']=='Yearly'){echo '/Year.';} if($ResEligEmp['Mobile_Exp_RemPost_Rmk']!=''){ echo ' '.$ResEligEmp['Mobile_Exp_RemPost_Rmk']; }  } ?>
  
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
<?php } //if($CompanyId!=2) ?>
	
<?php } //if($resMK['Elig']=='Y') ?>
</table>
			
<?php //*************************************************************************************************************************************************** ?>
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

