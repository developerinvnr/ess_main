<?php session_start();
if($_SESSION['login'] = true){require_once('../AdminUser/config/config.php');}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('../AdminUser/logcheck.php');
if($_SESSION['logCheckEmp']!=$logemp){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('EmpMenuSession.php');}

if($_REQUEST['GR_Reason'] AND $_REQUEST['GR_Reason']!='')
{ $sqlIns=mysql_query("update hrm_employee set EmpGen_Status='N', EmpGen_Reason='".$_REQUEST['GR_Reason']."', EmpGen_Noc='Y' where EmployeeID=".$EmployeeId, $con); }
if($_REQUEST['PR_Reason'] AND $_REQUEST['PR_Reason']!='')
{ $sqlIns=mysql_query("update hrm_employee set EmpPer_Status='N', EmpPer_Reason='".$_REQUEST['PR_Reason']."', EmpPer_Noc='Y' where EmployeeID=".$EmployeeId, $con); }
if($_REQUEST['CR_Reason'] AND $_REQUEST['CR_Reason']!='')
{ $sqlIns=mysql_query("update hrm_employee set EmpCon_Status='N', EmpCon_Reason='".$_REQUEST['CR_Reason']."', EmpCon_Noc='Y' where EmployeeID=".$EmployeeId, $con); }
if($_REQUEST['ER_Reason'] AND $_REQUEST['ER_Reason']!='')
{ $sqlIns=mysql_query("update hrm_employee set EmpEdu_Status='N', EmpEdu_Reason='".$_REQUEST['ER_Reason']."', EmpEdu_Noc='Y' where EmployeeID=".$EmployeeId, $con); }
if($_REQUEST['ExR_Reason'] AND $_REQUEST['ExR_Reason']!='')
{ $sqlIns=mysql_query("update hrm_employee set EmpExp_Status='N', EmpExp_Reason='".$_REQUEST['ExR_Reason']."', EmpExp_Noc='Y' where EmployeeID=".$EmployeeId, $con); }
if($_REQUEST['FR_Reason'] AND $_REQUEST['FR_Reason']!='')
{ $sqlIns=mysql_query("update hrm_employee set EmpFam_Status='N', EmpFam_Reason='".$_REQUEST['FR_Reason']."', EmpFam_Noc='Y' where EmployeeID=".$EmployeeId, $con); }
if($_REQUEST['LR_Reason'] AND $_REQUEST['LR_Reason']!='')
{ $sqlIns=mysql_query("update hrm_employee set EmpLang_Status='N', EmpLang_Reason='".$_REQUEST['LR_Reason']."', EmpLang_Noc='Y' where EmployeeID=".$EmployeeId, $con); }


if($_REQUEST['GR_Agree'] AND $_REQUEST['GR_Agree']!='')
{ $sqlIns=mysql_query("update hrm_employee set EmpGen_Status='YY', EmpGen_Noc='Y' where EmployeeID=".$EmployeeId, $con); }
if($_REQUEST['PR_Agree'] AND $_REQUEST['PR_Agree']!='')
{ $sqlIns=mysql_query("update hrm_employee set EmpPer_Status='YY', EmpPer_Noc='Y' where EmployeeID=".$EmployeeId, $con); }
if($_REQUEST['CR_Agree'] AND $_REQUEST['CR_Agree']!='')
{ $sqlIns=mysql_query("update hrm_employee set EmpCon_Status='YY', EmpCon_Noc='Y' where EmployeeID=".$EmployeeId, $con); }
if($_REQUEST['ER_Agree'] AND $_REQUEST['ER_Agree']!='')
{ $sqlIns=mysql_query("update hrm_employee set EmpEdu_Status='YY', EmpEdu_Noc='Y' where EmployeeID=".$EmployeeId, $con); }
if($_REQUEST['ExR_Agree'] AND $_REQUEST['ExR_Agree']!='')
{ $sqlIns=mysql_query("update hrm_employee set EmpExp_Status='YY', EmpExp_Noc='Y' where EmployeeID=".$EmployeeId, $con); }
if($_REQUEST['FR_Agree'] AND $_REQUEST['FR_Agree']!='')
{ $sqlIns=mysql_query("update hrm_employee set EmpFam_Status='YY', EmpFam_Noc='Y' where EmployeeID=".$EmployeeId, $con); }
if($_REQUEST['LR_Agree'] AND $_REQUEST['LR_Agree']!='')
{ $sqlIns=mysql_query("update hrm_employee set EmpLang_Status='YY', EmpLang_Noc='Y' where EmployeeID=".$EmployeeId, $con); }

if($_REQUEST['Extra_Reason'] AND $_REQUEST['Extra_Reason']!='')
{ $sqlIns=mysql_query("update hrm_employee set ExtraChangeStatus='Y', ExtraChange='".$_REQUEST['Extra_Reason']."' where EmployeeID=".$EmployeeId, $con); 
  if($sqlIns){echo '<script>alert("Successfully send....")</script>';}
}

if($_REQUEST['action']=='Certify')
{ $sqlUp=mysql_query("update hrm_employee set ProfileCertify='Y' where EmployeeID=".$EmployeeId, $con); 
  if($sqlUp){echo '<script>alert("Done....!")</script>';}
}

?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style>.fontButton { background-color:#E3DCED; color:#009393; font-family:Georgia; font-size:13px;}</style>
<Script type="text/javascript">window.history.forward(1);</Script>
<Script type="text/javascript">
function GeneralBtn()
{var x = "Profile.php?C=G"; window.location=x;}
function PersonalBtn()
{var x = "Profile.php?C=P"; window.location=x;}
function ContactBtn()
{var x = "Profile.php?C=C"; window.location=x;}
function EducationBtn()
{var x = "Profile.php?C=E"; window.location=x;}
function FamilyBtn()
{var x = "Profile.php?C=F"; window.location=x;}
function ExperienceBtn()
{var x = "Profile.php?C=Ex"; window.location=x;}
function LangBtn()
{var x = "Profile.php?C=L"; window.location=x;}

function ProfileHelpDoc()
{window.open("ProfileHelpDoc.php?action=help","HelpDoc","menubar=no,scrollbars=yes,resizable=no,directories=no,width=720,height=600");}

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
</Script>
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
						    <td align="left" valign="top" width="150"><?php echo "<img width=105px height=125px src=\"show_images.php?id=".$EmployeeId."\">\n";?></td>
						  </tr>
					 </table>
				 </td>
				  <form name="AskQform" method="post" />
				 <td width="900" height="400" valign="top">
<?php //*****************************************Profile Open****************************************************?>		
<?php $sqlPS=mysql_query("select * from hrm_employee where EmployeeID=".$EmployeeId, $con); $resPS=mysql_fetch_assoc($sqlPS); ?>		 
<table border="0">
 <tr>
   <td valign="top">
    <table border="0">
	  <tr>
        <td valign="top">
		 <font style="font-family:Times New Roman; font-size:20px; color:#005B00; font-weight:bold; width:100px;" align="">My Profile</font>	
		 &nbsp;&nbsp;
		 <a href="#" onClick="ProfileHelpDoc()"><font color="#000099" style="width:200px;font-family:Times New Roman;" size="3" ><b>Help Document</b></font></font></a>
		 <?php if($resPS['ProfileCertify']=='N') { ?>
         <table border="0"><tr><td style="font-family:Times New Roman;font-size:16px; color:#800000; font-weight:bold; width:880px; display:<?php if($_REQUEST['C']=='G'){echo 'block';} else {echo 'none';} ?>;" align="justify">Certify your data by viewing on each page, providing details of blank field, if applicable, by notifying incorrect data to HR. Provide supporting documents wherever required.....</td></tr></table><?php } ?>
       </td>	 
     </tr>
	  <tr>
	    <td valign="top"><input type="hidden" id="ClickValue" value="<?php echo $_REQUEST['C']; ?>" />
		  <table border="0">
		    <tr>		
<td align="center"><a href="#"><img id="Img_general1" style="display:<?php if($_REQUEST['C']=='G'){echo 'none';} else {echo 'block';} ?>;" src="images/Egeneral1.png" border="0" onClick="GeneralBtn()"/></a><img id="Img_general" src="images/Egeneral.png" border="0" style="display:<?php if($_REQUEST['C']=='G'){echo 'block';} else {echo 'none';} ?>;"/></td>

<td align="center"><a href="#"><img id="Img_personal1" style="display:<?php if($_REQUEST['C']=='P'){echo 'none';} else {echo 'block';} ?>;" src="images/Epersonal1.png" border="0" onClick="PersonalBtn()"/></a><img src="images/Epersonal.png" id="Img_personal" border="0" style="display:<?php if($_REQUEST['C']=='P'){echo 'block';} else {echo 'none';} ?>;"/></td>	
				  
<td align="center"><a href="#"><img id="Img_contact1" style="display:<?php if($_REQUEST['C']=='C'){echo 'none';} else {echo 'block';} ?>;" src="images/Econtact1.png" border="0" onClick="ContactBtn()"/></a><img src="images/Econtact.png" id="Img_contact" border="0" style="display:<?php if($_REQUEST['C']=='C'){echo 'block';} else {echo 'none';} ?>;"/></td>
				  
<td align="center"><a href="#"><img id="Img_education1" style="display:<?php if($_REQUEST['C']=='E'){echo 'none';} else {echo 'block';} ?>;" src="images/Eeducation1.png" border="0" onClick="EducationBtn()"/></a><img src="images/Eeducation.png" border="0" style="display:<?php if($_REQUEST['C']=='E'){echo 'block';} else {echo 'none';} ?>;" id="Img_education"/></td>

<td align="center"><a href="#"><img id="Img_experience1" style="display:<?php if($_REQUEST['C']=='Ex'){echo 'none';} else {echo 'block';} ?>;" src="images/Experience1.png" border="0" onClick="ExperienceBtn()"/></a><img src="images/Experience.png" border="0" style="display:<?php if($_REQUEST['C']=='Ex'){echo 'block';} else {echo 'none';} ?>;" id="Img_experience"/></td>				
				  		
<td align="center"><a href="#"><img id="Img_family1" style="display:<?php if($_REQUEST['C']=='F'){echo 'none';} else {echo 'block';} ?>;" src="images/Efamily1.png" border="0" onClick="FamilyBtn()"/></a><img src="images/Efamily.png" border="0" style="display:<?php if($_REQUEST['C']=='F'){echo 'block';} else {echo 'none';} ?>;" id="Img_family"/></td>

<td align="center"><a href="#"><img id="Img_lang1" style="display:<?php if($_REQUEST['C']=='L'){echo 'none';} else {echo 'block';} ?>;" src="images/Elanguage1.png" border="0" onClick="LangBtn()"/></a><img src="images/Elanguage.png" border="0" style="display:<?php if($_REQUEST['C']=='L'){echo 'block';} else {echo 'none';} ?>;" id="Img_lang"/></td>
		   </tr>		 		
	     </table>
		</td>
	  </tr>
	   
	   <tr>
<?php $LEC=strlen($EmpCode); 
      if($LEC==1){$EC='000'.$EmpCode;} if($LEC==2){$EC='00'.$EmpCode;} if($LEC==3){$EC='0'.$EmpCode;} if($LEC>=4){$EC=$EmpCode;} 
?>	   
<?php //---------------------------------------------------------General-----------------------------------------------------------------------------------?>
<?php $sqlE=mysql_query("select DateJoining,DOB,EmailId_Vnr,MobileNo_Vnr,InsuCardNo,PfAccountNo,EsicNo,BankName,BranchName,AccountNo,RepEmployeeID,ReportingName,ReportingDesigId,VNRExpYear,PreviousExpYear from hrm_employee_general where EmployeeID=".$EmployeeId, $con); $resE=mysql_fetch_assoc($sqlE); ?>	  	  
	     <td valign="top" id="DTGen" style="font-family:Times New Roman;size:12px; display:<?php if($_REQUEST['C']=='G'){echo 'block';} else {echo 'none';} ?>;">
		   <table border="1" style="background-color:#7a6189;">		   
<tr style="background-color:#E3DCED;"> 
<td valign="top" style="width:100px;color:#FFFFFF; background-color:#7a6189;">Name :</td>
<td valign="top" style="width:265px;color:#000;font-size:12px;" align="justify"><?php echo $NameE; ?></td>
<td valign="top" style="width:100px;color:#FFFFFF;background-color:#7a6189;">Code :</td>
<td valign="top" style="width:80px;color:#000;"><?php echo $EC; ?></td>
<td valign="top" style="width:105px;color:#FFFFFF;background-color:#7a6189;">Department :</td>
<?php $sqlD=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$DepartmentId, $con); $resD=mysql_fetch_assoc($sqlD); ?>
<td valign="top" style="width:240px;color:#000;font-size:12px;" align="justify"><?php echo strtoupper($resD['DepartmentCode']); ?></td>
</tr>
<tr style="background-color:#E3DCED;">
<td valign="top" style="width:90px;color:#FFFFFF;background-color:#7a6189;">Designation :</td>
<?php $sqlDe=mysql_query("select DesigName from hrm_designation where DesigId=".$DesigId, $con); $resDe=mysql_fetch_assoc($sqlDe); ?>		
<td valign="top" style="width:0px;color:#000;font-size:12px;" align="justify"><?php echo strtoupper($resDe['DesigName']); ?></td>
<td valign="top" style="width:65px;color:#FFFFFF;background-color:#7a6189;">Grade :</td>
<?php $sqlG=mysql_query("select GradeValue from hrm_grade where GradeId=".$GradeId, $con); $resG=mysql_fetch_assoc($sqlG); ?>			
<td valign="top" style="width:80px;color:#000;"><?php echo $resG['GradeValue']; ?></td>
<td valign="top" style="width:105px;color:#FFFFFF;background-color:#7a6189;">HQ:</td>
<?php $sqlH=mysql_query("select HqName from hrm_headquater where HqId=".$HqId, $con); $resH=mysql_fetch_assoc($sqlH); ?>
<td valign="top" style="width:240px;color:#000;font-size:12px;" align="justify"><?php echo strtoupper($resH['HqName']); ?></td>
</tr>	
<tr style="background-color:#E3DCED;">
<td valign="top" style="width:90px;color:#FFFFFF;background-color:#7a6189;">Email-Id :</td>	
<td valign="top" style="width:0px;color:#000;" align="justify"><?php echo $resE['EmailId_Vnr']; ?></td>
<td valign="top" style="width:65px;color:#FFFFFF;background-color:#7a6189;">Official Mobile No :</td>		
<td valign="top" style="width:100px;color:#000;"><?php echo $resE['MobileNo_Vnr']; ?></td>
<td valign="top" style="width:105px;color:#FFFFFF;background-color:#7a6189;">DOJ :</td>
<td valign="top" style="width:240px;color:#000;" align="justify"><?php echo date("d-m-y",strtotime($resE['DateJoining'])); ?></td>
</tr>	
<tr style="background-color:#E3DCED;">
<td valign="top" style="width:90px;color:#FFFFFF;background-color:#7a6189;">Bank :</td>	
<td valign="top" style="width:0px;color:#000;font-size:12px;" align=""><?php echo strtoupper($resE['BankName']); ?></td>	
<td valign="top" style="width:65px;color:#FFFFFF;background-color:#7a6189;">A/C No :</td>
<td valign="top" style="width:100px;color:#000;" align=""><?php echo '00'.$resE['AccountNo']; ?></td>
<td valign="top" style="width:105px;color:#FFFFFF;background-color:#7a6189;">Branch :</td>
<td valign="top" style="width:240px;color:#000;font-size:12px;" align=""><?php echo strtoupper($resE['BranchName']); ?></td>
</tr>
<?php //$SqlReG=mysql_query("select Gender from hrm_employee_general where EmployeeID=".$resE['RepEmployeeID'], $con); $resReG=mysql_fetch_assoc($SqlReG);
      $SqlReP=mysql_query("select Gender,Married,DR from hrm_employee_personal where EmployeeID=".$resE['RepEmployeeID'], $con); $resReP=mysql_fetch_assoc($SqlReP);
 if($resReP['DR']=='Y'){$M='Dr.';}elseif($resReP['Gender']=='M'){$M='Mr.';} elseif($resReP['Gender']=='F' AND $resReP['Married']=='Y'){$M='Mrs.';} elseif($resReP['Gender']=='F' AND $resReP['Married']=='N'){$M='Miss.';} 
 ?>
<tr style="background-color:#E3DCED;">
<td valign="top" style="width:90px;color:#FFFFFF;background-color:#7a6189;">Reporting :</td>	
<td valign="top" style="width:0px;color:#000;font-size:12px;" align="justify"><?php echo $M.' '.strtoupper($resE['ReportingName']); ?></td>
<td valign="top" style="width:65px;color:#FFFFFF;background-color:#7a6189;">Designation :</td>
<?php $sqlDe2=mysql_query("select DesigName from hrm_designation where DesigId=".$resE['ReportingDesigId'], $con); $resDe2=mysql_fetch_assoc($sqlDe2); ?>				
<td valign="top" style="width:240px;color:#000;font-size:12px;"><?php echo strtoupper($resDe2['DesigName']); ?></td>
<td valign="top" style="width:105px;color:#FFFFFF;background-color:#7a6189;">PF No. :</td>
<td valign="top" style="width:240px;color:#000;"><?php echo strtoupper($resE['PfAccountNo']); ?></td>
</tr>
<?php $timestamp_start = strtotime($resE['DateJoining']);  $timestamp_end = strtotime(date("Y-m-d")); $difference = abs($timestamp_end - $timestamp_start); 
      $days = floor($difference/(60*60*24)); $months = floor($difference/(60*60*24*30)); $years2 = $difference/(60*60*24*365); 
	  //$Y2=$years2*12; $M22=$months-$Y2;
	  $ExpVNRMain=number_format($years2, 1);  
?> 
<tr style="background-color:#E3DCED;">
<td valign="top" style="width:90px;color:#FFFFFF;background-color:#7a6189;">Mediclaim PolicyNo :</td>	
<td valign="top" style="width:0px;color:#000;" align=""><?php echo strtoupper($resE['InsuCardNo']); ?></td>
<td valign="top" style="width:65px;color:#FFFFFF;background-color:#7a6189;">VNR Experience :</td>				
<td valign="top" style="width:240px;color:#000;"><?php echo $ExpVNRMain.'&nbsp;Year'; ?></td>
<td valign="top" style="width:105px;color:#FFFFFF;background-color:#7a6189;">Previous Experience :</td>
<td valign="top" style="width:240px;color:#000;"><?php echo $resE['PreviousExpYear'].'&nbsp;Year'; ?></td>
</tr>
		   </table>
         </td>
<?php //---------------------------------------------------------Personal-----------------------------------------------------------------------------------?>
<?php $sqlEP=mysql_query("select * from hrm_employee_personal where EmployeeID=".$EmployeeId, $con); $resEP=mysql_fetch_assoc($sqlEP);   ?>
<?php //if($resEP['BloodGroup']=='O+'){$BG='O Positive';} if($resEP['BloodGroup']=='A+'){$BG='A Positive';} if($resEP['BloodGroup']=='B+'){$BG='B Positive';} 
//if($resEP['BloodGroup']=='AB+'){$BG='AB Positive';} if($resEP['BloodGroup']=='O-'){$BG='O Negative';} if($resEP['BloodGroup']=='A-'){$BG='A Negative';}
//if($resEP['BloodGroup']=='B-'){$BG='B Negative';}if($resEP['BloodGroup']=='AB-'){$BG='AB Negative';}?>		 
		  <td valign="top" id="DTPer" style="font-family:Times New Roman;size:12px; display:<?php if($_REQUEST['C']=='P'){echo 'block';} else {echo 'none';} ?>;">
		   <table border="1" style="background-color:#7a6189;">
<tr style="background-color:#E3DCED;">
<td valign="top" style="width:120px;color:#FFFFFF;background-color:#7a6189;">DOB :</td>
<td valign="top" style="width:250px;color:#000;" align="justify"><?php if($resE['DOB']!='0000-00-00' AND $resE['DOB']!='1970-01-01'){ echo date("d-m-Y",strtotime($resE['DOB'])); } else {echo '';}?></td>
<td valign="top" style="width:100px;color:#FFFFFF;background-color:#7a6189;">Gender :</td>
<td valign="top" style="width:150px;color:#000;font-size:12px;"><?php if($resEP['Gender']=='M') {echo 'MALE';} else {echo 'FEMALE';} ?></td>
<td valign="top" style="width:100px;color:#FFFFFF;background-color:#7a6189;">Blood Group :</td>
<td valign="top" style="width:150px;color:#000;font-size:12px;" align="justify"><?php echo strtoupper($resEP['BloodGroup']); ?></td>
</tr>
<tr style="background-color:#E3DCED;">
<td valign="top" style="width:100px;color:#FFFFFF;background-color:#7a6189;">Email-Id :</td>
<td valign="top" style="width:250px;color:#000;" align="justify"><?php echo $resEP['EmailId_Self']; ?></td>
<td valign="top" style="width:100px;color:#FFFFFF;background-color:#7a6189;">Mobile :</td>
<td valign="top" style="width:150px;color:#000;"><?php echo $resEP['MobileNo']; ?></td>
<td valign="top" style="width:100px;color:#FFFFFF;background-color:#7a6189;">Qualification :</td>
<td valign="top" style="width:150px;color:#000;font-size:12px;" align="justify"><?php echo strtoupper($resEP['Qualification']); ?></td>
</tr>
<tr style="background-color:#E3DCED;">
<td valign="top" style="width:100px;color:#FFFFFF;background-color:#7a6189;">Pancard No :</td>
<td valign="top" style="width:250px;color:#000;font-size:12px;" align="justify"><?php echo strtoupper($resEP['PanNo']); ?></td>
<td valign="top" style="width:100px;color:#FFFFFF;background-color:#7a6189;">Marital Status :</td>
<td valign="top" style="width:150px;color:#000;font-size:12px;"><?php if($resEP['Married']=='N'){echo 'UNMARRIED'; } else {echo 'MARRIED';} ?></td>
<td valign="top" style="width:100px;color:#FFFFFF;background-color:#7a6189;">Anniversary :</td>
<td valign="top" style="width:150px;color:#000;font-size:12px;" align="justify"><?php if($resEP['Married']=='N'){echo '';} if($resEP['Married']=='Y') { echo date("d-F", strtotime($resEP['MarriageDate']));}; ?></td>
</tr>
<tr style="background-color:#E3DCED;">
<td valign="top" style="width:100px;color:#FFFFFF;background-color:#7a6189;">Passport No :</td>
<td valign="top" style="width:250px;color:#000;font-size:12px;" align="justify"><?php echo strtoupper($resEP['PassportNo']); ?></td>
<td valign="top" style="width:100px;color:#FFFFFF;background-color:#7a6189;">Valid From :</td>
<td valign="top" style="width:150px;color:#000;"><?php if($resEP['PassportNo']=='NA' OR $resEP['PassportNo']==''){echo '';} else {echo date("d-m-Y", strtotime($resEP['Passport_ExpiryDateFrom']));}; ?></td>
<td valign="top" style="width:100px;color:#FFFFFF;background-color:#7a6189;">Valid To :</td>
<td valign="top" style="width:150px;color:#000;" align="justify"><?php if($resEP['PassportNo']=='NA' OR $resEP['PassportNo']==''){echo '';} else {echo date("d-m-Y", strtotime($resEP['Passport_ExpiryDateTo']));}; ?></td>
</tr>
<tr style="background-color:#E3DCED;">
<td valign="top" style="width:100px;color:#FFFFFF;background-color:#7a6189;">Dri. Lic. No :</td>
<td valign="top" style="width:250px;color:#000;font-size:12px;" align="justify"><?php echo strtoupper($resEP['DrivingLicNo']); ?></td>
<td valign="top" style="width:100px;color:#FFFFFF;background-color:#7a6189;">Valid From :</td>
<td valign="top" style="width:150px;color:#000;"><?php if($resEP['DrivingLicNo']=='NA' OR $resEP['DrivingLicNo']==''){echo '';} else {echo date("d-m-Y", strtotime($resEP['Driv_ExpiryDateFrom']));}; ?></td>
<td valign="top" style="width:100px;color:#FFFFFF;background-color:#7a6189;">Valid To :</td>
<td valign="top" style="width:150px;color:#000;" align="justify"><?php if($resEP['DrivingLicNo']=='NA' OR $resEP['DrivingLicNo']==''){echo '';} else {echo date("d-m-Y", strtotime($resEP['Driv_ExpiryDateTo']));}; ?></td>
</tr>	  	   
		   </table>
         </td>
<?php //---------------------------------------------------------Contact-----------------------------------------------------------------------------------?>
<?php $sqlEC=mysql_query("select * from hrm_employee_contact where EmployeeID=".$EmployeeId, $con); $resEC=mysql_fetch_assoc($sqlEC);   ?>		 
		 <td valign="top" id="DTCon" style="font-family:Times New Roman;size:12px; display:<?php if($_REQUEST['C']=='C'){echo 'block';} else {echo 'none';} ?>;">
		   <table border="1" style="background-color:#7a6189;">
<tr style="background-color:#E3DCED;">
<td valign="top" style="width:140px;color:#000;font-size:14px;"><b>Current </b></td>
<td valign="top" style="width:100px;color:#FFFFFF;background-color:#7a6189;">Address:</td>		
<td colspan="5" valign="top" style="width:300px;color:#000;font-size:12px;" align="justify"><?php echo strtoupper($resEC['CurrAdd']); ?></td>
</tr>
<tr style="background-color:#E3DCED;">
<td valign="top" style="width:110px;color:#000;font-size:14px;"></td>
<td valign="top" style="width:100px;color:#FFFFFF;background-color:#7a6189;">State :</td>
<?php $sqlS=mysql_query("select StateName from hrm_state where StateId=".$resEC['CurrAdd_State'], $con); $resS=mysql_fetch_assoc($sqlS);   ?>	
<td valign="top" style="width:300px;color:#000;font-size:12px;" align="justify"><?php echo strtoupper($resS['StateName']); ?></td>
<td valign="top" style="width:100px;color:#FFFFFF;background-color:#7a6189;">City :</td>
<?php $sqlC=mysql_query("select CityName from hrm_city where CityId=".$resEC['CurrAdd_City'], $con); $resC=mysql_fetch_assoc($sqlC);   ?>
<td valign="top" style="width:150px;color:#000;font-size:12px;"><?php echo strtoupper($resC['CityName']); ?></td>
<td valign="top" style="width:100px;color:#FFFFFF;background-color:#7a6189;">Pin no. : </td>
<td valign="top" style="width:150px;color:#000;" align="justify"><?php echo $resEC['CurrAdd_PinNo']; ?></td>
</tr>
<tr style="background-color:#E3DCED;">
<td valign="top" style="width:140px;color:#000;font-size:14px;"><b>Permanent </b></td>		
<td valign="top" style="width:100px;color:#FFFFFF;background-color:#7a6189;">Address:</td>		
<td colspan="5" valign="top" style="width:300px;color:#000;font-size:12px;" align="justify"><?php echo strtoupper($resEC['ParAdd']); ?></td>
</tr>
<tr style="background-color:#E3DCED;">
<td valign="top" style="width:110px;color:#000;font-size:14px;"></td>
<td valign="top" style="width:100px;color:#FFFFFF;background-color:#7a6189;">State :</td>
<?php $sqlS2=mysql_query("select StateName from hrm_state where StateId=".$resEC['ParAdd_State'], $con); $resS2=mysql_fetch_assoc($sqlS2);   ?>
<td valign="top" style="width:300px;color:#000;font-size:12px;" align="justify"><?php echo strtoupper($resS2['StateName']); ?></td>
<td valign="top" style="width:100px;color:#FFFFFF;background-color:#7a6189;">City :</td>
<?php $sqlC2=mysql_query("select CityName from hrm_city where CityId=".$resEC['ParAdd_City'], $con); $resC2=mysql_fetch_assoc($sqlC2); ?>	
<td valign="top" style="width:150px;color:#000;font-size:12px;"><?php echo strtoupper($resC2['CityName']); ?></td>
<td valign="top" style="width:100px;color:#FFFFFF;background-color:#7a6189;">Pin no. : </td>
<td valign="top" style="width:150px;color:#000;" align="justify"><?php echo $resEC['ParAdd_PinNo']; ?></td>
</tr>
<tr style="background-color:#E3DCED;">
<td valign="top" style="width:140px;color:#000;font-size:14px;"><b>Reference Per </b></td>	
<td valign="top" style="width:100px;color:#FFFFFF;background-color:#7a6189;">Email-Id :</td>
<td valign="top" style="width:300px;color:#000;" align="justify"><?php echo $resEC['Personal_RefEmailId']; ?></td>
<td valign="top" style="width:100px;color:#FFFFFF;background-color:#7a6189;">Name :</td>
<td valign="top" style="width:250px;color:#000;font-size:12px;" align="justify"><?php echo strtoupper($resEC['Personal_RefName']); ?></td>
<td valign="top" style="width:100px;color:#FFFFFF;background-color:#7a6189;">Contact :</td>	
<td valign="top" style="width:150px;color:#000;"><?php echo $resEC['Personal_RefContactNo']; ?></td>
</tr>
<tr style="background-color:#E3DCED;">
<td valign="top" style="width:140px;color:#000;font-size:14px;"><b>Reference Prof </b></td>	
<td valign="top" style="width:100px;color:#FFFFFF;background-color:#7a6189;">Name</td>
<td valign="top" style="width:300px;color:#000;font-size:12px;" align="justify"><?php echo strtoupper($resEC['Prof_RefName']); ?></td>
<td valign="top" style="width:100px;color:#FFFFFF;background-color:#7a6189;">Contact :</td>	
<td valign="top" style="width:150px;color:#000;"><?php echo strtolower($resEC['Prof_RefContactNo']); ?></td>
<td valign="top" style="width:100px;color:#FFFFFF;background-color:#7a6189;">Designation : </td>
<td valign="top" style="width:150px;color:#000;font-size:12px;" align="justify"><?php echo strtoupper($resEC['Prof_RefDesig']); ?></td>
</tr>
<tr style="background-color:#E3DCED;">
<td valign="top" style="width:110px;color:#000;font-size:14px;"></td>
<td valign="top" style="width:100px;color:#FFFFFF;background-color:#7a6189;">Email-Id :</td>
<td valign="top" style="width:300px;color:#000;" align="justify"><?php echo $resEC['Prof_RefEmailId']; ?></td>
<td valign="top" style="width:100px;color:#FFFFFF;background-color:#7a6189;">Company : </td>	
<td colspan="3" valign="top" style="width:400px;color:#000;font-size:12px;"><?php echo strtoupper($resEC['Prof_RefCompany']); ?></td>
</tr>	
<tr style="background-color:#E3DCED;">
<td valign="top" style="width:140px;color:#000;font-size:14px;"><b>Emergency </b></td>	
<td valign="top" style="width:100px;color:#FFFFFF;background-color:#7a6189;">Name :</td>
<td valign="top" style="width:300px;color:#000;font-size:12px;" align="justify"><?php echo strtoupper($resEC['EmgName']); ?></td>
<td valign="top" style="width:100px;color:#FFFFFF;background-color:#7a6189;">Contact :</td>	
<td valign="top" style="width:150px;color:#000;"><?php echo $resEC['EmgContactNo']; ?></td>
<td valign="top" style="width:100px;color:#FFFFFF;background-color:#7a6189;">Relation :</td>
<td valign="top" style="width:150px;color:#000;font-size:12px;" align="justify"><?php echo strtoupper($resEC['EmgRelation']); ?></td>
</tr>
<?php /*
<tr style="background-color:#E3DCED;">
<td valign="top" style="width:110px;color:#000;font-size:14px;"></td>
<td valign="top" style="width:100px;color:#FFFFFF;background-color:#7a6189;">Email-Id :</td>
<td valign="top" style="width:300px;color:#000;" align="justify"><?php echo $resEC['EmgEmailId']; ?></td>
<td valign="top" style="width:100px;color:#FFFFFF;background-color:#7a6189;">Address :</td>	
<td valign="top" colspan="3" style="width:400px;color:#000;font-size:12px;"><?php echo strtoupper($resEC['CurrAdd']); ?></td>
</tr>		
*/ ?>  
		   </table>
         </td>

<?php //---------------------------------------------------------Education-----------------------------------------------------------------------------------?>	
<?php 
$sqlEQ=mysql_query("select * from hrm_employee_qualification where EmployeeID=".$EmployeeId." order by QualificationId ASC", $con); $rowEQ=mysql_num_rows($sqlEQ); ?>		 
		 <td valign="top" id="DTEdu" style="font-family:Times New Roman;size:12px; display:<?php if($_REQUEST['C']=='E'){echo 'block';} else {echo 'none';} ?>;">
		   <table border="1" style="background-color:#7a6189;">
<tr style="background-color:#E3DCED;">
<td valign="top" style="width:120px;color:#FFFFFF;background-color:#7a6189;" align="center"><b>Qualification</b></td>
<td valign="top" style="width:100px;color:#FFFFFF;background-color:#7a6189;" align="center"><b>Specialization</b></td>
<td valign="top" style="width:350px;color:#FFFFFF;background-color:#7a6189;" align="center"><b>Institute/ University</b></td>
<td valign="top" style="width:250px;color:#FFFFFF;background-color:#7a6189;" align="center"><b>Subject</b></td>
<td valign="top" style="width:80px;color:#FFFFFF;background-color:#7a6189;" align="center"><b>Grade/ Per.</b></td>
<td valign="top" style="width:90px;color:#FFFFFF;background-color:#7a6189;" align="center"><b>PassOut</b></td>
</tr>
<?php if($rowEQ>0) { while($resEQ=mysql_fetch_array($sqlEQ)) { ?>	  	  	
<tr style="background-color:#E3DCED;">
<td valign="top" style="width:120px;color:#000;font-size:12px;" align=""><?php echo strtoupper($resEQ['Qualification']); ?></td>
<td valign="top" style="width:100px;color:#000;font-size:12px;" align=""><?php echo strtoupper($resEQ['Specialization']); ?></td>
<td valign="top" style="width:350px;color:#000;font-size:12px;" align=""><?php echo strtoupper($resEQ['Institute']); ?></td>
<td valign="top" style="width:250px;color:#000;font-size:12px;" align=""><?php echo strtoupper($resEQ['Subject']); ?></td>
<td valign="top" style="width:80px;color:#000;font-size:12px;" align="center"><?php echo strtoupper($resEQ['Grade_Per']); ?></td>
<td valign="top" style="width:90px;color:#000;" align="center"><?php echo $resEQ['PassOut']; ?></td>
</tr>	
<?php } }?>	    
		   </table>
         </td>

<?php //---------------------------------------------------------Exeperience-----------------------------------------------------------------------------------?>	
<?php $sqlEx=mysql_query("select * from hrm_employee_experience where EmployeeID=".$EmployeeId." order by ExpFromDate ASC", $con); $rowEx=mysql_num_rows($sqlEx); ?>		 
		 <td valign="top" id="DTEdu" style="font-family:Times New Roman;size:12px; display:<?php if($_REQUEST['C']=='Ex'){echo 'block';} else {echo 'none';} ?>;">
		   <table border="1" style="background-color:#7a6189;">
<tr style="background-color:#E3DCED;">
<td valign="top" style="width:100px;color:#FFFFFF;background-color:#7a6189;" align="center"><b>From</b></td>
<td valign="top" style="width:100px;color:#FFFFFF;background-color:#7a6189;" align="center"><b>To</b></td>
<td valign="top" style="width:280px;color:#FFFFFF;background-color:#7a6189;" align="center"><b>Company</b></td>
<td valign="top" style="width:260px;color:#FFFFFF;background-color:#7a6189;" align="center"><b>Designation</b></td>
<td valign="top" style="width:100px;color:#FFFFFF;background-color:#7a6189;" align="center"><b>Duration</b></td>
</tr>
<?php if($rowEx>0) { while($resEx=mysql_fetch_array($sqlEx)) { ?>	  	  	
<tr style="background-color:#E3DCED;">
<td valign="top" style="width:100px;color:#000;" align="center"><?php if($resEx['ExpFromDate']!='0000-00-00' AND $resEx['ExpFromDate']!='1970-01-01'){echo date("M-Y",strtotime($resEx['ExpFromDate'])); } ?></td>
<td valign="top" style="width:100px;color:#000;" align="center"><?php if($resEx['ExpToDate']!='0000-00-00' AND $resEx['ExpToDate']!='1970-01-01'){ echo date("M-Y",strtotime($resEx['ExpToDate'])); } ?></td>
<td valign="top" style="width:280px;color:#000;font-size:12px;" align=""><?php echo strtoupper($resEx['ExpComName']); ?></td>
<td valign="top" style="width:260px;color:#000;font-size:12px;" align=""><?php echo strtoupper($resEx['ExpDesignation']); ?></td>
<td valign="top" style="width:100px;color:#000;" align="center"><?php echo $resEx['ExpTotalYear'].'&nbsp; Year'; ?></td>
</tr>	
<?php } }?>	    
		   </table>
         </td>


<?php //---------------------------------------------------------Family-----------------------------------------------------------------------------------?>		 
<?php $sqlEF=mysql_query("select * from hrm_employee_family where EmployeeID=".$EmployeeId, $con); $rowEF=mysql_num_rows($sqlEF); $resEF=mysql_fetch_assoc($sqlEF);?>		 
		 <td valign="top" id="DTFam" style="font-family:Times New Roman;size:12px; display:<?php if($_REQUEST['C']=='F'){echo 'block';} else {echo 'none';} ?>;">
		   <table border="1" style="background-color:#7a6189;">
<tr style="background-color:#E3DCED;">
<td valign="top" style="width:100px;color:#FFFFFF;background-color:#7a6189;" align="center"><b>Relation</b></td>
<td valign="top" style="width:350px;color:#FFFFFF;background-color:#7a6189;" align="center"><b>Name</b></td>
<td valign="top" style="width:150px;color:#FFFFFF;background-color:#7a6189;" colspan="2" align="center"><b>Qualification</b></td>
<td valign="top" style="width:90px;color:#FFFFFF;background-color:#7a6189;" align="center"><b>DOB</b></td>
<td valign="top" style="width:150px;color:#FFFFFF;background-color:#7a6189;" align="center"><b>Occupation</b></td>
</tr> 	
<tr style="background-color:#E3DCED;">
<td valign="top" style="width:100px;color:#000;font-size:12px;" align=""><?php echo 'FATHER'; ?></td>
<td valign="top" style="width:350px;color:#000;font-size:12px;" align=""><?php echo $resEF['Fa_SN'].'. '.strtoupper($resEF['FatherName']); ?></td>
<td valign="top" style="width:150px;color:#000;font-size:12px;" colspan="2" align=""><?php echo strtoupper($resEF['FatherQuali']); ?></td>
<td valign="top" style="width:90px;color:#000;" align="center"><?php if($resEF['FatherDOB']!='0000-00-00' AND $resEF['FatherDOB']!='1970-01-01'){echo date("d-m-Y", strtotime($resEF['FatherDOB'])); } else {echo '';} ?></td>
<td valign="top" style="width:150px;color:#000;font-size:12px;" align=""><?php echo strtoupper($resEF['FatherOccupation']); ?></td>
</tr>
<tr style="background-color:#E3DCED;">
<td valign="top" style="width:100px;color:#000;font-size:12px;" align=""><?php echo 'MOTHER'; ?></td>
<td valign="top" style="width:350px;color:#000;font-size:12px;" align=""><?php echo $resEF['Mo_SN'].'. '.strtoupper($resEF['MotherName']); ?></td>
<td valign="top" style="width:150px;color:#000;font-size:12px;" colspan="2" align=""><?php echo strtoupper($resEF['MotherQuali']); ?></td>
<td valign="top" style="width:90px;color:#000;" align="center"><?php if($resEF['MotherDOB']!='0000-00-00' AND $resEF['MotherDOB']!='1970-01-01'){echo date("d-m-Y", strtotime($resEF['MotherDOB'])); } else {echo '';} ?></td>
<td valign="top" style="width:150px;color:#000;font-size:12px;" align=""><?php echo strtoupper($resEF['MotherOccupation']); ?></td>
</tr>
<?php if($resEP['Married']=='Y') { ?> 	
<tr style="background-color:#E3DCED;">
<td valign="top" style="width:100px;color:#000;font-size:12px;" align=""><?php if($resEP['Gender']=='M'){echo 'WIFE';} else{echo 'HUSBAND';} ?></td>
<td valign="top" style="width:350px;color:#000;font-size:12px;" align=""><?php echo $resEF['HW_SN'].'. '.strtoupper($resEF['HusWifeName']); ?></td>
<td valign="top" style="width:150px;color:#000;font-size:12px;" colspan="2" align=""><?php echo strtoupper($resEF['HusWifeQuali']); ?></td>
<td valign="top" style="width:90px;color:#000;" align="center"><?php if($resEF['HusWifeDOB']!='0000-00-00' AND $resEF['HusWifeDOB']!='1970-01-01'){echo date("d-m-Y", strtotime($resEF['HusWifeDOB'])); } else {echo '';} ?></td>
<td valign="top" style="width:150px;color:#000;font-size:12px;" align=""><?php echo strtoupper($resEF['HusWifeOccupation']); ?></td>
</tr>			
<?php } $sqlEF2=mysql_query("select * from hrm_employee_family2 where EmployeeID=".$EmployeeId, $con); 
$rowEF2=mysql_num_rows($sqlEF2); if($rowEF2>0) { while($resEF2=mysql_fetch_array($sqlEF2)) {?> 
<tr style="background-color:#E3DCED;">
<td valign="top" style="width:100px;color:#000;font-size:12px;" align=""><?php echo strtoupper($resEF2['FamilyRelation']); ?></td>
<td valign="top" style="width:350px;color:#000;font-size:12px;" align=""><?php echo $resEF2['Fa2_SN'].'. '.strtoupper($resEF2['FamilyName']); ?></td>
<td valign="top" style="width:150px;color:#000;font-size:12px;" colspan="2" align=""><?php echo strtoupper($resEF2['FamilyQualification']); ?></td>
<td valign="top" style="width:90px;color:#000;" align="center"><?php if($resEF2['FamilyDOB']!='0000-00-00' AND $resEF2['FamilyDOB']!='1970-01-01'){echo date("d-m-Y", strtotime($resEF2['FamilyDOB'])); } else {echo '';} ?></td>
<td valign="top" style="width:150px;color:#000;font-size:12px;" align=""><?php echo strtoupper($resEF2['FamilyOccupation']); ?></td>
</tr>		
<?php } }?>		   
		   </table>
         </td>
		 
<?php //---------------------------------------------------------Language-----------------------------------------------------------------------------------?>	
<?php $sqlL=mysql_query("select * from hrm_employee_langproficiency where EmployeeID=".$EmployeeId." order by LangProficiencyId ASC", $con); $rowL=mysql_num_rows($sqlL); ?>		 
		 <td valign="top" id="DTLang" style="font-family:Times New Roman;size:12px; display:<?php if($_REQUEST['C']=='L'){echo 'block';} else {echo 'none';} ?>;">
		   <table border="1" style="background-color:#7a6189;">
<tr style="background-color:#E3DCED;">
<td valign="top" style="width:150px;color:#FFFFFF;background-color:#7a6189;" align="center"><b>Language</b></td>
<td valign="top" style="width:100px;color:#FFFFFF;background-color:#7a6189;" align="center"><b>Write</b></td>
<td valign="top" style="width:100px;color:#FFFFFF;background-color:#7a6189;" align="center"><b>Read</b></td>
<td valign="top" style="width:100px;color:#FFFFFF;background-color:#7a6189;" align="center"><b>Speak</b></td>
</tr>
<?php if($rowL>0) { while($resL=mysql_fetch_array($sqlL)) { ?>	  	  	
<tr style="background-color:#E3DCED;">
<td valign="top" style="width:150px;color:#000;font-size:12px;" align="">&nbsp;<b><?php echo $resL['Language']; ?></b></td>
<td valign="top" style="width:100px;color:#000;font-size:12px;" align="center"><?php if($resL['Write_lang']=='Y'){echo 'YES';} else {echo 'NO';} ?></td>
<td valign="top" style="width:100px;color:#000;font-size:12px;" align="center"><?php if($resL['Read_lang']=='Y'){echo 'YES';} else {echo 'NO';} ?></td>
<td valign="top" style="width:100px;color:#000;font-size:12px;" align="center"><?php if($resL['Speak_lang']=='Y'){echo 'YES';} else {echo 'NO';} ?></td>
</tr>	
<?php } }?>	    
		   </table>
         </td>		 
		 
	   </tr> 
	</table>
   </td>
 </tr>
<script type="text/javascript">
function GenAgree() {var agree=confirm("Are you sure, your general details are correct?");  
if (agree) { var x = "Profile.php?C=G&GR_Agree=Y"; window.location=x; }}
function GenNagree() 
{ var agree=confirm("Are you sure, correction needs to be done to your general profile or is the data incomplete ? if any change is required, specify/submit supporting document to HR");  if (agree) { document.getElementById("TD_GR").style.display='block'; }}
function SaveGR()
{ var Reason = document.getElementById("TextAreaGR"); 
 var GR_TextReason = document.getElementById("TextAreaGR").value; var textLength = Reason.value.length;
 //if(textLength<50){alert("please type minimum 50 charector in reason"); return false; }
 var x = "Profile.php?C=G&GR_Reason="+GR_TextReason; window.location=x;
}

function PerAgree() {var agree=confirm("Are you sure, your personal details are correct?");  
if (agree) { var x = "Profile.php?C=P&PR_Agree=Y"; window.location=x; }}
function PerNagree() 
{ var agree=confirm("Are you sure, correction needs to be done to your personal profile or is the data incomplete ? if any change is required, specify/submit supporting document to HR");  if (agree) { document.getElementById("TD_PR").style.display='block'; }}
function SavePR()
{ var Reason = document.getElementById("TextAreaPR"); 
 var PR_TextReason = document.getElementById("TextAreaPR").value; var textLength = Reason.value.length;
 //if(textLength<50){alert("please type minimum 50 charector in reason"); return false; }
 var x = "Profile.php?C=P&PR_Reason="+PR_TextReason; window.location=x;
}

function ConAgree() {var agree=confirm("Are you sure, your contact details are correct?");  
if (agree) { var x = "Profile.php?C=C&CR_Agree=Y"; window.location=x; }}
function ConNagree() 
{ var agree=confirm("Are you sure, correction needs to be done to your contact profile or is the data incomplete ? if any change is required, specify/submit supporting document to HR");  if (agree) { document.getElementById("TD_CR").style.display='block'; }}
function SaveCR()
{ var Reason = document.getElementById("TextAreaCR"); 
 var CR_TextReason = document.getElementById("TextAreaCR").value; var textLength = Reason.value.length;
 //if(textLength<50){alert("please type minimum 50 charector in reason"); return false; }
 var x = "Profile.php?C=C&CR_Reason="+CR_TextReason; window.location=x;
}

function EduAgree() {var agree=confirm("Are you sure, your education details are correct?");  
if (agree) { var x = "Profile.php?C=E&ER_Agree=Y"; window.location=x; }}
function EduNagree() 
{ var agree=confirm("Are you sure, correction needs to be done to your education profile or is the data incomplete ? if any change is required, specify/submit supporting document to HR");  if (agree) { document.getElementById("TD_ER").style.display='block'; }}
function SaveER()
{ var Reason = document.getElementById("TextAreaER"); 
 var ER_TextReason = document.getElementById("TextAreaER").value; var textLength = Reason.value.length;
 //if(textLength<50){alert("please type minimum 50 charector in reason"); return false; }
 var x = "Profile.php?C=E&ER_Reason="+ER_TextReason; window.location=x;
}

function ExpAgree() {var agree=confirm("Are you sure, your experience details are correct?");  
if (agree) { var x = "Profile.php?C=Ex&ExR_Agree=Y"; window.location=x; }}
function ExpNagree() 
{ var agree=confirm("Are you sure, correction needs to be done to your experience profile or is the data incomplete ? if any change is required, specify/submit supporting document to HR");  if (agree) { document.getElementById("TD_ExR").style.display='block'; }}
function SaveExR()
{ var Reason = document.getElementById("TextAreaExR"); 
 var ExR_TextReason = document.getElementById("TextAreaExR").value; var textLength = Reason.value.length;
 //if(textLength<50){alert("please type minimum 50 charector in reason"); return false; }
 var x = "Profile.php?C=Ex&ExR_Reason="+ExR_TextReason; window.location=x;
}

function FamAgree() {var agree=confirm("Are you sure, your family details are correct?");  
if (agree) { var x = "Profile.php?C=F&FR_Agree=Y"; window.location=x; }}
function FamNagree() 
{ var agree=confirm("Are you sure, correction needs to be done to your family profile or is the data incomplete ? if any change is required, specify/submit supporting document to HR");  if (agree) { document.getElementById("TD_FR").style.display='block'; }}
function SaveFR()
{ var Reason = document.getElementById("TextAreaFR"); 
 var FR_TextReason = document.getElementById("TextAreaFR").value; var textLength = Reason.value.length;
 //if(textLength<50){alert("please type minimum 50 charector in reason"); return false; }
 var x = "Profile.php?C=F&FR_Reason="+FR_TextReason; window.location=x;
}

function LangAgree() {var agree=confirm("Are you sure, your language proficiency details are correct?");  
if (agree) { var x = "Profile.php?C=L&LR_Agree=Y"; window.location=x; }}
function LangNagree() 
{ var agree=confirm("Are you sure, correction needs to be done to your language proficiency profile or is the data incomplete ? if any change is required, specify/submit supporting document to HR");  if (agree) { document.getElementById("TD_LR").style.display='block'; }}
function SaveLR()
{ var Reason = document.getElementById("TextAreaLR"); 
 var LR_TextReason = document.getElementById("TextAreaLR").value; var textLength = Reason.value.length;
 //if(textLength<50){alert("please type minimum 50 charector in reason"); return false; }
 var x = "Profile.php?C=L&LR_Reason="+LR_TextReason; window.location=x;
}


function Certify(C)
{ var agree=confirm("Are you sure...?");  
  if (agree) { var x = "Profile.php?action=Certify&C="+C; window.location=x; }}

function ChangeExtra()
{document.getElementById("Changebtn").style.display='none'; document.getElementById("SubChange").style.display='block';
 document.getElementById("TD_ExtraTextArea").style.display='block';}
function Change(C)
{var Reason = document.getElementById("ExtraChange"); 
 var ExtraChange = document.getElementById("ExtraChange").value; var textLength = Reason.value.length;
 //if(textLength<50){alert("please type minimum 50 charector in reason"); return false; }
 var x = "Profile.php?C="+C+"&Extra_Reason="+ExtraChange; window.location=x;
}
</script> 
   <tr>
<?php //General ?>
<td valign="top" style="font-family:Times New Roman;size:12px; display:<?php if($_REQUEST['C']=='G'){echo 'block';} else {echo 'none';} ?>;">
<?php if($resPS['EmpGen_Status']!='YY') { ?>
<?php if($resPS['EmpGen_Status']=='N') { ?>
  <table border="0"><tr><td style="font-family:Times New Roman; font-size:16px; color:#006F00; font-weight:bold; width:800px;" align="">
	 Your general profile correction will be done shortly.</td></tr></table>
<?php } if($resPS['EmpGen_Status']!='N') { ?> 
  <table border="0"><tr><td style="font-family:Times New Roman; font-size:16px; color:#000000; font-weight:bold; width:880px;" align="">
	  Click Agree if the given general details are correct :<input type="button" style="width:80px;" onClick="GenAgree()" value="Agree" />
	  , Click Disagree if corrections are required :<input type="button" style="width:80px;" onClick="GenNagree()" value="Disagree" />
	 </td></tr><tr><td valign="top" id="TD_GR" style="display:none;"><form name="GR" method="post">
		<table border="0"><tr>
		<td style="font-family:Times New Roman; font-size:16px; color:#A80000; font-weight:bold; width:100px;" align="" valign="top">Type Reason :</td>
		<td style="font-family:Times New Roman; font-size:16px; color:#A80000; font-weight:bold; width:500px;" align="" valign="top">
		<textarea id="TextAreaGR" cols="61" rows="3" style="">.</textarea></td></tr> 
	    <tr><td style="" align="" valign="top"></td><td style="color:#800000; font-size:14px; font-family:Times New Roman;" valign="top" align="right">
	    <input type="button" id="ProfileGR" value="submit" onClick="return SaveGR()"/></td></tr> 			
	    </table>
	   </form></td></tr> 
  </table>
 <?php } } if($resPS['EmpGen_Status']=='YY'  AND $resPS['ProfileCertify']=='N') {?>
  <table border="0"><tr><td style="font-family:Times New Roman; font-size:16px; color:#006F00; font-weight:bold; width:800px;" align="">
	 General details certified....</td></tr></table><?php } ?>
</td>


<?php //Personal ?>
<td valign="top" style="font-family:Times New Roman;size:12px; display:<?php if($_REQUEST['C']=='P'){echo 'block';} else {echo 'none';} ?>;">
<?php if($resPS['EmpPer_Status']!='YY') { ?>
<?php if($resPS['EmpPer_Status']=='N') { ?>
  <table border="0"><tr><td style="font-family:Times New Roman; font-size:16px; color:#006F00; font-weight:bold; width:800px;" align="">
	 Your personal profile correction will be done shortly.</td></tr></table>
<?php } if($resPS['EmpPer_Status']!='N') { ?> 
  <table border="0"><tr><td style="font-family:Times New Roman; font-size:16px; color:#000000; font-weight:bold; width:880px;" align="">
	  Click Agree if the given personal details are correct :<input type="button" style="width:80px;" onClick="PerAgree()" value="Agree" />
	  , Click Disagree if corrections are required :<input type="button" style="width:80px;" onClick="PerNagree()" value="Disagree" />
	 </td></tr><tr><td valign="top" id="TD_PR" style="display:none;"><form name="PR" method="post">
		<table border="0"><tr>
		<td style="font-family:Times New Roman; font-size:16px; color:#A80000; font-weight:bold; width:100px;" align="" valign="top">Type Reason :</td>
		<td style="font-family:Times New Roman; font-size:16px; color:#A80000; font-weight:bold; width:500px;" align="" valign="top">
		<textarea id="TextAreaPR" cols="61" rows="3" style="">.</textarea></td></tr> 
	    <tr><td style="" align="" valign="top"></td><td style="color:#800000; font-size:14px; font-family:Times New Roman;" valign="top" align="right">
	    <input type="button" id="ProfilePR" value="submit" onClick="return SavePR()"/></td></tr> 			
	    </table>
	   </form></td></tr> 
  </table>
 <?php } } if($resPS['EmpPer_Status']=='YY' AND $resPS['ProfileCertify']=='N') {?>
  <table border="0"><tr><td style="font-family:Times New Roman; font-size:16px; color:#006F00; font-weight:bold; width:800px;" align="">
	 Personal details certified....</td></tr></table><?php } ?>
</td>


<?php //Contact ?>
<td valign="top" style="font-family:Times New Roman;size:12px; display:<?php if($_REQUEST['C']=='C'){echo 'block';} else {echo 'none';} ?>;">
<?php if($resPS['EmpCon_Status']!='YY') { ?>
<?php if($resPS['EmpCon_Status']=='N') { ?>
  <table border="0"><tr><td style="font-family:Times New Roman; font-size:16px; color:#006F00; font-weight:bold; width:800px;" align="">
	 Your contact profile correction will be done shortly.</td></tr></table>
<?php } if($resPS['EmpCon_Status']!='N') { ?> 
  <table border="0"><tr><td style="font-family:Times New Roman; font-size:16px; color:#000000; font-weight:bold; width:880px;" align="">
	  Click Agree if the given contact details are correct :<input type="button" style="width:80px;" onClick="ConAgree()" value="Agree" />
	  , Click Disagree if corrections are required :<input type="button" style="width:80px;" onClick="ConNagree()" value="Disagree" />
	 </td></tr><tr><td valign="top" id="TD_CR" style="display:none;"><form name="CR" method="post">
		<table border="0"><tr>
		<td style="font-family:Times New Roman; font-size:16px; color:#A80000; font-weight:bold; width:100px;" align="" valign="top">Type Reason :</td>
		<td style="font-family:Times New Roman; font-size:16px; color:#A80000; font-weight:bold; width:500px;" align="" valign="top">
		<textarea id="TextAreaCR" cols="61" rows="3" style="">.</textarea></td></tr> 
	    <tr><td style="" align="" valign="top"></td><td style="color:#800000; font-size:14px; font-family:Times New Roman;" valign="top" align="right">
	    <input type="button" id="ProfileCR" value="submit" onClick="return SaveCR()"/></td></tr> 			
	    </table>
	   </form></td></tr> 
  </table>
 <?php } } if($resPS['EmpCon_Status']=='YY' AND $resPS['ProfileCertify']=='N') {?>
  <table border="0"><tr><td style="font-family:Times New Roman; font-size:16px; color:#006F00; font-weight:bold; width:800px;" align="">
	 Contact details certified....</td></tr></table><?php } ?>
</td>


<?php //Education ?>
<td valign="top" style="font-family:Times New Roman;size:12px; display:<?php if($_REQUEST['C']=='E'){echo 'block';} else {echo 'none';} ?>;">
<?php if($resPS['EmpEdu_Status']!='YY') { ?>
<?php if($resPS['EmpEdu_Status']=='N') { ?>
  <table border="0"><tr><td style="font-family:Times New Roman; font-size:16px; color:#006F00; font-weight:bold; width:800px;" align="">
	 Your education profile correction will be done shortly.</td></tr></table>
<?php } if($resPS['EmpEdu_Status']!='N') { ?> 
  <table border="0"><tr><td style="font-family:Times New Roman; font-size:16px; color:#000000; font-weight:bold; width:880px;" align="">
	  Click Agree if the given education details are correct :<input type="button" style="width:80px;" onClick="EduAgree()" value="Agree" />
	  , Click Disagree if corrections are required :<input type="button" style="width:80px;" onClick="EduNagree()" value="Disagree" />
	 </td></tr><tr><td valign="top" id="TD_ER" style="display:none;"><form name="ER" method="post">
		<table border="0"><tr>
		<td style="font-family:Times New Roman; font-size:16px; color:#A80000; font-weight:bold; width:100px;" align="" valign="top">Type Reason :</td>
		<td style="font-family:Times New Roman; font-size:16px; color:#A80000; font-weight:bold; width:500px;" align="" valign="top">
		<textarea id="TextAreaER" cols="61" rows="3" style="">.</textarea></td></tr> 
	    <tr><td style="" align="" valign="top"></td><td style="color:#800000; font-size:14px; font-family:Times New Roman;" valign="top" align="right">
	    <input type="button" id="ProfileER" value="submit" onClick="return SaveER()"/></td></tr> 			
	    </table>
	   </form></td></tr> 
  </table>
 <?php } } if($resPS['EmpEdu_Status']=='YY' AND $resPS['ProfileCertify']=='N') {?>
  <table border="0"><tr><td style="font-family:Times New Roman; font-size:16px; color:#006F00; font-weight:bold; width:800px;" align="">
	 Education details certified....</td></tr></table><?php } ?>
</td>


<?php //Experience ?>
<td valign="top" style="font-family:Times New Roman;size:12px; display:<?php if($_REQUEST['C']=='Ex'){echo 'block';} else {echo 'none';} ?>;">
<?php if($resPS['EmpExp_Status']!='YY') { ?>
<?php if($resPS['EmpExp_Status']=='N') { ?>
  <table border="0"><tr><td style="font-family:Times New Roman; font-size:16px; color:#006F00; font-weight:bold; width:800px;" align="">
	 Your experience profile correction will be done shortly.</td></tr></table>
<?php } if($resPS['EmpExp_Status']!='N') { ?> 
  <table border="0"><tr><td style="font-family:Times New Roman; font-size:16px; color:#000000; font-weight:bold; width:880px;" align="">
	  Click Agree if the given experience details are correct :<input type="button" style="width:80px;" onClick="ExpAgree()" value="Agree" />
	  , Click Disagree if corrections are required :<input type="button" style="width:80px;" onClick="ExpNagree()" value="Disagree" />
	 </td></tr><tr><td valign="top" id="TD_ExR" style="display:none;"><form name="ExR" method="post">
		<table border="0"><tr>
		<td style="font-family:Times New Roman; font-size:16px; color:#A80000; font-weight:bold; width:100px;" align="" valign="top">Type Reason :</td>
		<td style="font-family:Times New Roman; font-size:16px; color:#A80000; font-weight:bold; width:500px;" align="" valign="top">
		<textarea id="TextAreaExR" cols="61" rows="3" style="">.</textarea></td></tr> 
	    <tr><td style="" align="" valign="top"></td><td style="color:#800000; font-size:14px; font-family:Times New Roman;" valign="top" align="right">
	    <input type="button" id="ProfileExR" value="submit" onClick="return SaveExR()"/></td></tr> 			
	    </table>
	   </form></td></tr> 
  </table>
 <?php } } if($resPS['EmpExp_Status']=='YY' AND $resPS['ProfileCertify']=='N') {?>
  <table border="0"><tr><td style="font-family:Times New Roman; font-size:16px; color:#006F00; font-weight:bold; width:800px;" align="">
	 Experience details certified....</td></tr></table><?php } ?>
</td>


<?php //Family ?>
<td valign="top" style="font-family:Times New Roman;size:12px; display:<?php if($_REQUEST['C']=='F'){echo 'block';} else {echo 'none';} ?>;">
<?php if($resPS['EmpFam_Status']!='YY') { ?>
<?php if($resPS['EmpFam_Status']=='N') { ?>
  <table border="0"><tr><td style="font-family:Times New Roman; font-size:16px; color:#006F00; font-weight:bold; width:800px;" align="">
	 Your family profile correction will be done shortly.</td></tr></table>
<?php } if($resPS['EmpFam_Status']!='N') { ?> 
  <table border="0"><tr><td style="font-family:Times New Roman; font-size:16px; color:#000000; font-weight:bold; width:880px;" align="">
	  Click Agree if the given family details are correct :<input type="button" style="width:80px;" onClick="FamAgree()" value="Agree" />
	  , Click Disagree if corrections are required :<input type="button" style="width:80px;" onClick="FamNagree()" value="Disagree" />
	 </td></tr><tr><td valign="top" id="TD_FR" style="display:none;"><form name="FR" method="post">
		<table border="0"><tr>
		<td style="font-family:Times New Roman; font-size:16px; color:#A80000; font-weight:bold; width:100px;" align="" valign="top">Type Reason :</td>
		<td style="font-family:Times New Roman; font-size:16px; color:#A80000; font-weight:bold; width:500px;" align="" valign="top">
		<textarea id="TextAreaFR" cols="61" rows="3" style="">.</textarea></td></tr> 
	    <tr><td style="" align="" valign="top"></td><td style="color:#800000; font-size:14px; font-family:Times New Roman;" valign="top" align="right">
	    <input type="button" id="ProfileFR" value="submit" onClick="return SaveFR()"/></td></tr> 			
	    </table>
	   </form></td></tr> 
  </table>
 <?php } } if($resPS['EmpFam_Status']=='YY' AND $resPS['ProfileCertify']=='N') {?>
  <table border="0"><tr><td style="font-family:Times New Roman; font-size:16px; color:#006F00; font-weight:bold; width:800px;" align="">
	 Family details certified....</td></tr></table><?php } ?>
</td>

<?php //Language ?>
<td valign="top" style="font-family:Times New Roman;size:12px; display:<?php if($_REQUEST['C']=='L'){echo 'block';} else {echo 'none';} ?>;">
<?php if($resPS['EmpLang_Status']!='YY') { ?>
<?php if($resPS['EmpLang_Status']=='N') { ?>
  <table border="0"><tr><td style="font-family:Times New Roman; font-size:16px; color:#006F00; font-weight:bold; width:800px;" align="">
	 Your language proficiency profile correction will be done shortly.</td></tr></table>
<?php } if($resPS['EmpLang_Status']!='N') { ?> 
  <table border="0"><tr><td style="font-family:Times New Roman; font-size:16px; color:#000000; font-weight:bold; width:900px;" align="">
	  Click Agree if the given lang. proficiency details are correct :<input type="button" style="width:80px;" onClick="LangAgree()" value="Agree" />
	  , Click Disagree if corrections are required :<input type="button" style="width:80px;" onClick="LangNagree()" value="Disagree" />
	 </td></tr><tr><td valign="top" id="TD_LR" style="display:none;"><form name="LR" method="post">
		<table border="0"><tr>
		<td style="font-family:Times New Roman; font-size:16px; color:#A80000; font-weight:bold; width:100px;" align="" valign="top">Type Reason :</td>
		<td style="font-family:Times New Roman; font-size:16px; color:#A80000; font-weight:bold; width:500px;" align="" valign="top">
		<textarea id="TextAreaLR" cols="61" rows="3" style="">.</textarea></td></tr> 
	    <tr><td style="" align="" valign="top"></td><td style="color:#800000; font-size:14px; font-family:Times New Roman;" valign="top" align="right">
	    <input type="button" id="ProfileFR" value="submit" onClick="return SaveLR()"/></td></tr> 			
	    </table>
	   </form></td></tr> 
  </table>
 <?php } } if($resPS['EmpLang_Status']=='YY' AND $resPS['ProfileCertify']=='N') {?>
  <table border="0"><tr><td style="font-family:Times New Roman; font-size:16px; color:#006F00; font-weight:bold; width:800px;" align="">
	 Language details certified....</td></tr></table><?php } ?>
</td>


   </tr>
   <tr>
        <td valign="top" style="font-family:Times New Roman;size:12px;">
		<?php if($resPS['ProfileCertify']=='N') { ?>
         <table border="0"><tr><td style="font-family:Times New Roman; font-size:16px; color:#000000; font-weight:bold; width:880px;" align="">
		 I here by certify this data to be correct <blink><b style="color:#0076EC;"><u>click</u></b></blink>&nbsp;<input type="button" style="width:80px;" onClick="Certify('<?php echo $_REQUEST['C']; ?>')" value="Certify" <?php if($resPS['EmpGen_Status']=='YY' AND $resPS['EmpPer_Status']=='YY' AND $resPS['EmpCon_Status']=='YY' AND $resPS['EmpEdu_Status']=='YY' AND $resPS['EmpFam_Status']=='YY' AND $resPS['EmpExp_Status']=='YY'){ echo ''; } else {echo 'disabled';} ?>/>
	     </td></tr></table>
		 <?php } if($resPS['ProfileCertify']=='Y') { ?>
         <table border="0"><tr><td style="font-family:Times New Roman; font-size:16px; color:#0076EC; font-weight:bold; width:880px;" align="">
		 For any change in data, notify HR with supporting documents click <input id="Changebtn" type="button" style="width:80px;" onClick="ChangeExtra()" value="Change" /></td></tr>
		 <tr><td id="TD_ExtraTextArea" style="font-family:Times New Roman; font-size:16px; color:#A80000; font-weight:bold; width:500px; display:none;" align="" valign="top">
		 <textarea id="ExtraChange" cols="62" rows="3" style="">Type Reason.....</textarea><br>
		 <input type="button" onClick="Change('<?php echo $_REQUEST['C']; ?>')" id="SubChange" style="width:80px; display:none;" value="Save" /></td></tr> 
		 </table> 
		 <?php } ?>
       </td>	 
   </tr>
</table>
<?php //*****************************************Profile Close****************************************************?> 
				 </td>
				 
			  </tr>
			 
			  <tr>
			     <td>&nbsp;</td>
			     <td align="Right">
				   <table border="0" width="450">
		             <tr>
		              <td align="right"></td>
                      <td align="right" style="width:70px;"></td>
		      </tr>
			   </form>
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

