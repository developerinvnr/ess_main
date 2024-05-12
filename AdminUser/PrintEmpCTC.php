<?php require_once('config/config.php'); ?>
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
<script language="javascript" type="text/javascript">
function PrintCTC(E,Y,C,G,D) 
{var DateP=document.getElementById("DatePrint").value;
 window.open("PrintEmpCTCPrint.php?action=Ctc&E="+E+"&Y="+Y+"&C="+C+"&G="+G+"&D="+D+"&DP="+DateP,"AppLetter","location=no,scrollbars=no,resizable=no,menubar=no,width=820,height=750");}
</script>
</head>
<body>
<table>
<tr><td style="font-family:Times New Roman;color:#000000;font-size:13px;width:785;" align="right"><a href="#" onClick="PrintCTC(<?php echo $_REQUEST['E'].','.$_REQUEST['Y'].','.$_REQUEST['C'].','.$_REQUEST['G'].','.$_REQUEST['D']; ?>)">Print</a>&nbsp;&nbsp;</td></tr>
<?php if($_REQUEST['action']=='Ctc') { $SqlCtc=mysql_query("SELECT hrm_employee.*, hrm_employee_ctc.*, Gender, DR, Married FROM hrm_employee INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID INNER JOIN hrm_employee_ctc ON hrm_employee.EmployeeID=hrm_employee_ctc.EmployeeID WHERE hrm_employee.EmployeeID=".$_REQUEST['E']." AND hrm_employee_ctc.Status='A' AND hrm_employee.CompanyId=".$_REQUEST['C'], $con); $ResCtc=mysql_fetch_assoc($SqlCtc); 
if($ResCtc['DR']=='Y'){$M='Dr.';} elseif($ResCtc['Gender']=='M'){$M='Mr.';} elseif($ResCtc['Gender']=='F' AND $ResCtc['Married']=='Y'){$M='Mrs.';} elseif($ResCtc['Gender']=='F' AND $ResCtc['Married']=='N'){$M='Miss.';}  
$NameE=$M.' '.$ResCtc['Fname'].'&nbsp;'.$ResCtc['Sname'].'&nbsp;'.$ResCtc['Lname'];
$SqlY=mysql_query("select FromDate,ToDate from hrm_year where YearId=".$_REQUEST['Y'], $con); $ResY=mysql_fetch_assoc($SqlY);
$From=date("Y",strtotime($ResY['FromDate'])); $To=date("Y",strtotime($ResY['ToDate'])); $ToTo=$From-1; $AssYear=$ToTo.'-'.date("y",strtotime($ResY['FromDate']));

$SqlStat=mysql_query("select hrm_company_statutory_lumpsum.*,hrm_company_statutory_taxsaving.*,hrm_company_statutory_pf.* from hrm_company_statutory_lumpsum INNER JOIN hrm_company_statutory_taxsaving ON hrm_company_statutory_lumpsum.CompanyId=hrm_company_statutory_taxsaving.CompanyId INNER JOIN hrm_company_statutory_pf ON hrm_company_statutory_lumpsum.CompanyId=hrm_company_statutory_pf.CompanyId where hrm_company_statutory_lumpsum.CompanyId=".$_REQUEST['C'], $con); $ResStat=mysql_fetch_assoc($SqlStat);
?> 			
<tr>
 <td align="center">
   <table border="0" width="790">
   
     <tr><td align="center" valign="top" style="font-size:20px; color:#000000; font-family:Times New Roman; font-weight:bold;"><u>CTC(Annexure-A)</u></td></tr>
	 <tr><td>&nbsp;</td></tr>
	 <tr><td>&nbsp;</td></tr>
	 <tr><td>&nbsp;</td></tr>
	 <tr>
	  <td style="font-family:Times New Roman;color:#000000; width:785;" align="center">
	    <table border="0">
		  <tr>
		    <td style="width:50px;">&nbsp;</td>
		    <td style="width:385px;font-size:18px;font-weight:bold;"><?php echo $NameE; ?> / EC No:&nbsp;<?php echo $ResCtc['EmpCode'];  ?></td>
			<td style="width:100px;">&nbsp;</td>
			<td style="width:200px;font-size:18px;font-weight:bold;" align="right">Date:&nbsp;<input name="DatePrint" id="DatePrint" class="All_100" value="<?php echo date("d-m-Y",strtotime($ResCtc['CtcCreatedDate'])); ?>" readonly><button id="f_btn1" class="CalenderButton"></button><script type="text/javascript">  var cal = Calendar.setup({ onSelect:  function(cal) { cal.hide()}, showTime: true }); 
  cal.manageFields("f_btn1", "DatePrint", "%d-%m-%Y"); </script></td>
			<td style="width:50px;">&nbsp;</td>
		  </tr>
		</table>
	  </td>
	 </tr>
	 <tr>
	  <td style="font-family:Times New Roman;color:#000000; width:785;" align="center">
	    <table border="0">
		  <tr><td style="width:50px;">&nbsp;</td>
		  <td style="width:685px;font-size:18px;text-align:justify;">
<table border="1" width="685" id="TEmp" cellpadding="1" cellspacing="2">
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
<tr>
  <td align="left" style="width:300px;font-size:16px;" id="caA">&nbsp;Conveyance Allowance :</td>
  <td align="left" style="width:180px;font-size:16px;" id="caB">&nbsp;Rs. &nbsp;<?php echo intval($ResCtc['CONV_Value']); ?></td>
</tr>
<tr>
  <td align="left" style="width:300px;font-size:16px;" id="caA">&nbsp;Bonus<sup>1</sup> :</td>
  <td align="left" style="width:180px;font-size:16px;" id="caB">&nbsp;Rs. &nbsp;<?php echo intval($ResCtc['Bonus_Month']); ?></td>
</tr>
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



<tr>
  <td align="left" style="width:300px;font-size:16px;" id="pfA">&nbsp;Provident Fund :</td>
  <td align="left" style="width:180px;font-size:16px;" id="pfB">&nbsp;Rs. &nbsp;<?php echo intval($ResCtc['PF_Employee_Contri_Value']); ?></td>
</tr>

<?php if($ResCtc['ESCI']>0){ ?>
<tr>
  <td align="left" style="width:300px;font-size:16px;" id="pfA">&nbsp;ESIC :</td>
  <td align="left" style="width:180px;font-size:16px;" id="pfB">&nbsp;Rs. &nbsp;<?php echo intval($ResCtc['ESCI']); ?></td>
</tr>
<?php } if($ResCtc['NPS_Value']>0){ ?>
<tr>
  <td align="left" style="width:300px;font-size:16px;" id="pfA">&nbsp;NPS Contribution :</td>
  <td align="left" style="width:180px;font-size:16px;" id="pfB">&nbsp;Rs. &nbsp;<?php echo intval($ResCtc['NPS_Value']); ?></td>
</tr>
<?php } ?>



<tr>
  <td align="left" style="width:300px;font-size:16px;">&nbsp;Net Monthly Salary :</td>
  <td align="left" style="width:180px;font-size:16px;">&nbsp;Rs. &nbsp;<?php echo intval($ResCtc['NetMonthSalary_Value']); ?></td>
</tr>
<tr>
  <td align="left" style="width:650px;font-size:17px; height:18px;" colspan="3">&nbsp;<b>[B] Annual Components (Tax saving components which shall be reimbursed on production of documents)</b></td>
</tr>
<tr>
  <td align="left" style="width:300px;font-size:16px;" id="mrA">&nbsp;Medical Reimbursement :</td>
  <td align="left" style="width:180px;font-size:16px;" id="mrB">&nbsp;Rs. &nbsp;<?php echo intval($ResCtc['MED_REM_Value']); ?></td>
</tr>
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
<tr>
  <td align="left" style="width:650px;font-size:17px; height:18px;" colspan="3">&nbsp;<b>[C] Other Annual Components (Statutory components)
</tr>
<tr>
  <td align="left" style="width:300px;font-size:16px;" id="bonusA">&nbsp;Bonus/Exgretia :</td>
  <td align="left" style="width:180px;font-size:16px;" id="bonusB">&nbsp;Rs. &nbsp;<?php echo intval($ResCtc['BONUS_Value']); ?></td>
</tr>
<tr>
  <td align="left" style="width:300px;font-size:16px;" id="gratuityA">&nbsp;Estimated Gratuity<sup>2</sup> :</td>
  <td align="left" style="width:180px;font-size:16px;" id="gratuityB">&nbsp;Rs. &nbsp;<?php echo intval($ResCtc['GRATUITY_Value']); ?></td>
</tr>
<tr>
  <td align="left" style="width:300px;font-size:16px;" id="pfcontriA">&nbsp;Employer's PF Contribustion :</td>
  <td align="left" style="width:180px;font-size:16px;" id="pfcontriB">&nbsp;Rs. &nbsp;<?php echo intval($ResCtc['PF_Employer_Contri_Annul']); ?></td>
</tr>
<tr>
  <td align="left" style="width:300px;font-size:16px;" id="mppA">&nbsp;Mediclaim Policy Premium :</td>
  <td align="left" style="width:180px;font-size:16px;" id="mppB">&nbsp;Rs. &nbsp;<?php echo intval($ResCtc['Mediclaim_Policy']); ?></td>
</tr>
<tr>
  <td align="left" style="width:300px;font-size:16px;">&nbsp;Fixed CTC :</td>
  <td align="left" style="width:180px;font-size:16px;">&nbsp;Rs. &nbsp;<b><?php echo intval($ResCtc['Tot_CTC']); ?></b></td>
</tr>

<?php /**************** Variable Pay & CTC ***************/ ?>
<tr>
   <td align="left" style="width:300px;font-size:16px;" id="mppA">&nbsp;Performance Pay<sup>3</sup> :</td>
   <td align="left" style="width:180px;font-size:16px;" id="mppB">&nbsp;Rs. &nbsp;<?php if($ResCtc['VariablePay']>0){ echo $ResCtc['VariablePay']; } ?></td> 
</tr>
<tr>
  <td align="left" style="width:300px;font-size:16px;">&nbsp;Total CTC :</td>
  <td align="left" style="width:180px;font-size:16px;">&nbsp;Rs. &nbsp;<b><?php if($ResCtc['TotCtc']>0){ echo $ResCtc['TotCtc']; }  ?></b></td>
</tr>
<?php /**************** Variable Pay & CTC ***************/ ?>
<tr>
  <td align="left" style="width:650px;font-size:17px; height:18px;" colspan="3">&nbsp;<b>Additional Benifit</b>
</tr>
<tr>
  <td align="left" style="width:320px;font-size:16px;" id="micA">&nbsp;Mediclaim insurance coverage for Employee, Spouse 2 children :
  <input type="hidden" id="MCS" value="<?php echo $resDaily['MCS']; ?>"/><input type="hidden" id="MCSSP" value="<?php echo $resDaily['MCSSP']; ?>"/> 	
  </td>
  <td align="left" style="width:180px;font-size:16px;" id="micB">&nbsp;Rs. &nbsp;<?php echo intval($ResCtc['EmpAddBenifit_MediInsu_value']); ?></td>
</tr>
<?php if($ResCtc['Car_Entitlement']>0) { ?>
<tr>
  <td align="left" style="width:320px;font-size:16px;" id="micA">&nbsp;Car entitlement as per car policy :
  <input type="hidden" id="MCS" value="<?php echo $resDaily['MCS']; ?>"/><input type="hidden" id="MCSSP" value="<?php echo $resDaily['MCSSP']; ?>"/> 	
  </td>
  <td align="left" style="width:180px;font-size:16px;" id="micB">&nbsp;Rs. &nbsp;<?php echo intval($ResCtc['Car_Entitlement']); ?></td>
</tr>
<?php } ?>
<tr>  
   <td align="" class="fontButton" colspan="6"><table border="0" align="right" class="fontButton">
	<tr>
	  <td style="width:450px;color:#FFFFFF;font-weight:bold;font-family:Times New Roman; font-size:15px;"><span id="msgCTC">&nbsp;</span></td>	 
	</tr></table>  
	</td>
	</tr>
	</table>
		  </td><td style="width:50px;">&nbsp;</td></tr>
		</table>
	  </td>
	 </tr>	
   <tr>
     <td>
	   <table>
	        <tr> <td style="width:50px;">&nbsp;</td>
	            <td style="width:685px;font-size:14px; font-family:Times New Roman;"><b>Notes:</b></td>
	        </tr>
	       <tr>
	           <td style="width:50px;">&nbsp;</td>
	            <td style="width:685px;font-size:14px; font-family:Times New Roman;">
	               <ol type="1">
	                   <li>Bonus shall be paid as per The Code of Wages Act,2019</li>
	                   <li>The Gratuity to be paid as per The Code on Social Security,2020.</li>
	                   <li>Performance Pay</li>
	                   
	               </ol>
	               <ul type="none">
	                   <li>
	                       <ol type="a">
	                           <li>Performance Pay is an annually paid variable component of CTC, paid in July salary.</li>
	                       <li>This amount is indicative of the target variable pay, actual pay-out will vary based on the performance of Company and Individual.</li>
	                       <li>It is linked with Company performance (as per fiscal year) and Individual Performance (as per appraisal period for minimum 6 months working, pro-rata basis if <1 year working).</li>
	                       <li>The calculation shall be based on the pre-defined performance measures at both, Company & Individual level.</li>
	                       </ol>
	                   </li>
	                   For more details refer to the Company’s Performance Pay policy.
	               </ul>
	           </td>
	       </tr>
	       <tr>
	           <td style="width:50px;">&nbsp;</td>
	           <td style="width:685px;font-size:14px;">
	               <b><u>Important</u>  :</b>
	               This is a confidential document not to be discussed openly with others. You shall be personally responsible for any leakage of information regarding your compensation .
	           </td>
	       </tr>
	   </table>
	 </td>
   </tr>		 
   <tr>
	  <td style="font-family:Times New Roman;color:#000000; width:785;" align="center">
	    <table border="0">
		  <tr><td style="width:50px;">&nbsp;</td><td style="width:685px;font-size:18px;font-weight:bold;">&nbsp;</td><td style="width:50px;">&nbsp;</td></tr>
		  <tr><td style="width:50px;">&nbsp;</td><td style="width:685px;font-size:18px;font-weight:bold;">&nbsp;</td><td style="width:50px;">&nbsp;</td></tr>
		  <tr><td style="width:50px;">&nbsp;</td><td style="width:685px;font-size:18px;font-weight:bold;">&nbsp;</td><td style="width:50px;">&nbsp;</td></tr>
		  <tr><td style="width:50px;">&nbsp;</td>
		  <td>

<?php if($_REQUEST['C']==1){ ?>
		   <table><tr>
		   <td style="width:343px;font-size:18px;font-weight:bold;">
		   <?php if($_REQUEST['D']!=98) {echo 'Human Resource'; } ?>
		   </td>
		   <td style="width:342px;font-size:18px;font-weight:bold;" align="right">
		   <?php if($_REQUEST['D']==98 OR $_REQUEST['D']==115 OR $_REQUEST['D']==116 OR $_REQUEST['D']==117) { ?>Director<?php } ?>
		   </td>
		   </tr></table>	
<?php } elseif($_REQUEST['C']==3){ ?>
                  <table><tr>
		   <td style="width:343px;font-size:18px;font-weight:bold;">
		   <?php if($_REQUEST['D']!=98) {echo 'Authorized Signatory'; } ?>
		   </td>
		   <td style="width:342px;font-size:18px;font-weight:bold;" align="right">
		   <?php if($_REQUEST['D']==98 OR $_REQUEST['D']==115 OR $_REQUEST['D']==116 OR $_REQUEST['D']==117) { ?>Director<?php } ?>
		   </td>
		   </tr></table>	
<?php } ?>	   
		   </td>
		  <td style="width:50px;">&nbsp;</td></tr>
		</table>
	  </td>
	 </tr>	 	 
   </table>
 </td>
</tr> 
<?php } ?>

</table>  
 
</body>
</html>

