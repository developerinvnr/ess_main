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
             <?php if($resMK['Ctc']=='Y') { ?>
             <td align="center"><a href="MyCtc.php"><img id="Img_ctc11" style="display:none;" src="images/ctc1.png" border="0"/></a>
		     <img id="Img_ctc" style="display:block;" src="images/ctc.png" border="0"/></td><?php } ?>
             <?php if($resMK['Elig']=='Y'){ ?>
             <td align="center"><a href="MyElig.php"><img id="Img_elig1" style="display:block;" src="images/elig1.png" border="0"/></a>
		     <img id="Img_elig" style="display:none;" src="images/elig.png" border="0"/></td><?php } ?>
			 <td>&nbsp;</td>
			 <td style="width:200px;font-family:Times New Roman;" valign="top">
			 <a href="#" onClick="SalaryHelpDoc()"><font color="#000099" size="3" ><b>Help Document</b></font></font></a>
             </td>
			 </tr></table></td>
			</tr>
			<tr>
			 <td>
			<table border="1">
<?php $SqlCtc=mysql_query("SELECT * FROM hrm_employee_ctc WHERE EmployeeID=".$EmployeeId." AND Status='A'", $con); $ResCtc=mysql_fetch_assoc($SqlCtc); 
$SqlStat=mysql_query("select hrm_company_statutory_lumpsum.*,hrm_company_statutory_taxsaving.*,hrm_company_statutory_pf.* from hrm_company_statutory_lumpsum INNER JOIN hrm_company_statutory_taxsaving ON hrm_company_statutory_lumpsum.CompanyId=hrm_company_statutory_taxsaving.CompanyId INNER JOIN hrm_company_statutory_pf ON hrm_company_statutory_lumpsum.CompanyId=hrm_company_statutory_pf.CompanyId where hrm_company_statutory_lumpsum.CompanyId=".$CompanyId, $con); $ResStat=mysql_fetch_assoc($SqlStat);
?> 		
<?php if($resMK['Ctc']=='Y') { //if($DepartmentId!=4 AND $DepartmentId!=25) { ?>	
<tr>
		  <td style="font-family:Times New Roman;color:#000000;width:685px;font-size:18px;text-align:justify;" align="center" bgcolor="#7a6189">
<table border="1" width="685" id="TEmp" cellpadding="1" cellspacing="2" bgcolor="#FFFFFF">
<tr>
  <td align="left" style="width:600px;font-size:17px; height:18px;" colspan="3">&nbsp;<b>[A] Monthly Components</b></td>
</tr>
<tr>
  <td align="left" style="width:300px;font-size:16px;">&nbsp;<span id="BasSti"><input type="hidden" value="B" name="Basic"/><?php if($ResCtc['BAS']=='Y' AND $ResCtc['BAS_Value']>0) { echo 'Basic'; } elseif($ResCtc['STIPEND']=='Y' AND $ResCtc['STIPEND_Value']>0) { echo 'Stipend'; }?></span> :
  </td>
<td align="left" style="width:180px;font-size:16px;">&nbsp;Rs. &nbsp;<?php if($ResCtc['BAS']=='Y' AND $ResCtc['BAS_Value']>0) { echo intval($ResCtc['BAS_Value']); } elseif($ResCtc['STIPEND']=='Y' AND $ResCtc['STIPEND_Value']>0) { echo intval($ResCtc['STIPEND_Value']); }?></td>
</tr>
<tr>
  <td align="left" style="width:300px;font-size:16px;" id="hraA">&nbsp;HRA :</td>
  <td align="left" style="width:180px;font-size:16px;" id="hraB">&nbsp;Rs. &nbsp;<?php echo intval($ResCtc['HRA_Value']); ?>
  </td>
</tr>
<?php if($ResCtc['CONV_Value']>0){ ?>
<tr>
  <td align="left" style="width:300px;font-size:16px;" id="caA">&nbsp;Conveyance Allowance :</td>
  <td align="left" style="width:180px;font-size:16px;" id="caB">&nbsp;Rs. &nbsp;<?php echo intval($ResCtc['CONV_Value']); ?></td>
</tr>
<?php } if($ResCtc['CAR_ALL_Value']>0){ ?>
<tr>
  <td align="left" style="width:300px;font-size:16px;" id="saA">&nbsp;Car Allowance :</td>
  <td align="left" style="width:180px;font-size:16px;" id="saB">&nbsp;Rs. &nbsp;<?php echo intval($ResCtc['CAR_ALL_Value']); ?></td>
</tr>
<?php } ?>
<tr>
  <td align="left" style="width:300px;font-size:16px;" id="saA">&nbsp;Special Allowance :</td>
  <td align="left" style="width:180px;font-size:16px;" id="saB">&nbsp;Rs. &nbsp;<?php echo intval($ResCtc['SPECIAL_ALL_Value']); ?></td>
</tr>
<tr>
  <td align="left" style="width:300px;font-size:16px;">&nbsp;Gross Monthly Salary :</td>
  <td align="left" style="width:180px;font-size:16px;">&nbsp;Rs. &nbsp;<?php echo intval($ResCtc['Tot_GrossMonth']); ?></td>
</tr>

<?php if($ResCtc['Tot_GrossMonth']!=$ResCtc['GrossSalary_PostAnualComponent_Value'] AND $ResCtc['GrossSalary_PostAnualComponent_Value']>0) { ?>
<tr>
  <td align="left" style="width:300px;font-size:16px;">&nbsp;Gross Monthly Salary (Post Annual Components) :</td>
  <td align="left" style="width:180px;font-size:16px;">&nbsp;Rs. &nbsp;<?php echo intval($ResCtc['GrossSalary_PostAnualComponent_Value']); ?></td>
</tr>
<?php } ?>

<?php if($CompanyId==1 OR $CompanyId==3) { ?>
<tr>
  <td align="left" style="width:300px;font-size:16px;" id="pfA">&nbsp;Provident Fund :</td>
  <td align="left" style="width:180px;font-size:16px;" id="pfB">&nbsp;Rs. &nbsp;<?php echo intval($ResCtc['PF_Employee_Contri_Value']); ?></td>
</tr>
<?php if($ResCtc['ESCI']>0){ ?>
<tr>
  <td align="left" style="width:300px;font-size:16px;" id="pfA">&nbsp;ESIC :</td>
  <td align="left" style="width:180px;font-size:16px;" id="pfB">&nbsp;Rs. &nbsp;<?php echo intval($ResCtc['ESCI']); ?></td>
</tr>
<?php } ?>
<tr>
  <td align="left" style="width:300px;font-size:16px;">&nbsp;Net Monthly Salary :</td>
  <td align="left" style="width:180px;font-size:16px;">&nbsp;Rs. &nbsp;<?php echo intval($ResCtc['NetMonthSalary_Value']); ?></td>
</tr>
<?php } if($CompanyId==1 OR $CompanyId==3) {?>
<tr>
  <td align="left" style="width:650px;font-size:17px; height:18px;" colspan="3">&nbsp;<b>[B] Annual Components (Tax saving components which shall be reimbursed on production of documents)</b></td>
</tr>
<?php if($ResCtc['MED_REM_Value']>0){ ?>
<tr>
  <td align="left" style="width:300px;font-size:16px;" id="mrA">&nbsp;Medical Reimbursement :</td>
  <td align="left" style="width:180px;font-size:16px;" id="mrB">&nbsp;Rs. &nbsp;<?php echo intval($ResCtc['MED_REM_Value']); ?></td>
</tr>
<?php } ?>
<tr>
  <td align="left" style="width:300px;font-size:16px;" id="ltaA">&nbsp;Leave Travel Allowance :</td>
  <td align="left" style="width:180px;font-size:16px;" id="ltaB">&nbsp;Rs. &nbsp;<?php echo intval($ResCtc['LTA_Value']); ?></td>
</tr>
<tr>
  <td align="left" style="width:300px;font-size:16px;" id="ceaA">&nbsp;Children Education Allow. :&nbsp;&nbsp;<?php $OneChild=$ResStat['CEA_PerChildMonth']*12; $TwoChild=$OneChild*2;?>
                                                   Child1 :<input type="checkbox" name="CheckC1" id="CheckC1" onClick="FunChild1()" disabled <?php if($ResCtc['CHILD_EDU_ALL_Value']==$OneChild OR $ResCtc['CHILD_EDU_ALL_Value']==$TwoChild){echo 'checked';} ?> />&nbsp;
                                                   Child2 :<input type="checkbox" name="CheckC2" id="CheckC2" onClick="FunChild2()" disabled <?php if($ResCtc['CHILD_EDU_ALL_Value']==$TwoChild){echo 'checked';} ?> /></td>
  <td align="left" style="width:180px;font-size:16px;" id="ceaB">&nbsp;Rs. &nbsp;<?php echo intval($ResCtc['CHILD_EDU_ALL_Value']); ?></td>
</tr>
<tr>
  <td align="left" style="width:300px;font-size:16px;">&nbsp;Annual Gross Salary :</td>
  <td align="left" style="width:180px;font-size:16px;">&nbsp;Rs. &nbsp;<?php echo intval($ResCtc['Tot_Gross_Annual']); ?></td>
</tr>
<?php } if($CompanyId==1) { ?>
<tr>
  <td align="left" style="width:650px;font-size:17px; height:18px;" colspan="3">&nbsp;<b>[C] Other Annual Components (Statutory components)
</tr>
<?php if($ResCtc['BONUS_Value']>0){ ?>
<tr>
  <td align="left" style="width:300px;font-size:16px;" id="bonusA">&nbsp;Bonus/Exgretia :</td>
  <td align="left" style="width:180px;font-size:16px;" id="bonusB">&nbsp;Rs. &nbsp;<?php echo intval($ResCtc['BONUS_Value']); ?></td>
</tr>
<?php } ?>
<tr>
  <td align="left" style="width:300px;font-size:16px;" id="gratuityA">&nbsp;Estimated Gratuity :</td>
  <td align="left" style="width:180px;font-size:16px;" id="gratuityB">&nbsp;Rs. &nbsp;<?php echo intval($ResCtc['GRATUITY_Value']); ?></td>
</tr>
<tr>
  <td align="left" style="width:300px;font-size:16px;" id="pfcontriA">&nbsp;Employer's PF Contribustion :</td>
  <td align="left" style="width:180px;font-size:16px;" id="pfcontriB">&nbsp;Rs. &nbsp;<?php echo intval($ResCtc['PF_Employer_Contri_Annul']); ?></td>
</tr>
<?php } if($CompanyId==1 OR $CompanyId==3) {?>
<?php if($ResCtc['AnnualESCI']>0){ ?>
<tr>
  <td align="left" style="width:300px;font-size:16px;" id="mppA">&nbsp;Employer's ESCI Contribustion :</td>
  <td align="left" style="width:180px;font-size:16px;" id="mppB">&nbsp;Rs. &nbsp;<?php echo intval($ResCtc['AnnualESCI']); ?></td>
</tr>
<?php } if($ResCtc['Mediclaim_Policy']>0){ ?>
<tr>
  <td align="left" style="width:300px;font-size:16px;" id="mppA">&nbsp;Mediclaim Policy Premium :</td>
  <td align="left" style="width:180px;font-size:16px;" id="mppB">&nbsp;Rs. &nbsp;<?php echo intval($ResCtc['Mediclaim_Policy']); ?></td>
</tr>
<?php } ?>
<?php } ?>
<tr>
  <td align="left" style="width:300px;font-size:16px;">&nbsp;Total Cost to Company :</td>
  <td align="left" style="width:180px;font-size:16px;">&nbsp;Rs. &nbsp;<b><?php echo intval($ResCtc['Tot_CTC']); ?></b></td>
</tr>
<?php if($CompanyId==1 OR $CompanyId==3) { ?>
<input type="hidden" id="MCS" value="<?php echo $resDaily['MCS']; ?>"/><input type="hidden" id="MCSSP" value="<?php echo $resDaily['MCSSP']; ?>"/>
<?php if($ResCtc['EmpAddBenifit_MediInsu_value']>0 OR $ResCtc['Car_Entitlement']>0){ ?>
<tr>
  <td align="left" style="width:650px;font-size:17px; height:18px;" colspan="3">&nbsp;<b>Additional Benifit</b>
</tr>
<?php if($ResCtc['EmpAddBenifit_MediInsu_value']>0){?>
<tr>
  <td align="left" style="width:320px;font-size:16px;" id="micA">&nbsp;Mediclaim insurance coverage for Employee, Spouse 2 children :
  </td>
  <td align="left" style="width:180px;font-size:16px;" id="micB">&nbsp;Rs. &nbsp;<?php echo intval($ResCtc['EmpAddBenifit_MediInsu_value']); ?></td>
</tr>
<?php } if($ResCtc['Car_Entitlement']>0) { ?>
<tr>
  <td align="left" class="All_300" id="micA">&nbsp;Car entitlement as per car policy : </td>
  <td align="left" class="All_180" id="micB">&nbsp;Rs. &nbsp;<?php echo intval($ResCtc['Car_Entitlement']); ?></td>
</tr>

<?php } ?>
<?php } ?>
<tr>  

<?php if($EmployeeId==7){ ?>
<tr>
  <td align="left" colspan="3" style="width:320px;font-size:16px;" id="micA">&nbsp;<b>*</b> Variable Remuneration@ 7.5% of NRV less production cost ( on revenue generated out of your breeding efforts). 	
  </td>
</tr>
<?php } ?>

<?php } ?>
   <td align="" class="fontButton" colspan="6"><table border="0" align="right" class="fontButton">
	<tr>
	  <td style="width:450px;color:#FFFFFF;font-weight:bold;font-family:Times New Roman; font-size:15px;"><span id="msgCTC">&nbsp;</span></td>	 
	</tr></table>  
	</td>
	</tr>
	</table>
		</tr>
		</table>
	  </td>
	 </tr>	
   <tr>
     <td>
	   <table><tr><td style="width:685px;font-size:14px; font-family:Times New Roman;"><b><u>Pls note</u>  :</b>This is a confidential page not to be discussed openly with others. You shall be personally responsible for any leakage of information regarding your compensation .</td></tr></table>
	 </td>
   </tr>		
 <?php } //} ?>			    
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

