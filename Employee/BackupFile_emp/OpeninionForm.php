<?php 
require_once('../AdminUser/config/config.php');
date_default_timezone_set('Asia/Kolkata');
$EmployeeId=$_REQUEST['ei']; $CompanyId=$_REQUEST['ci'];
?>
<html><font color="#FD0000"></font>
<head>
<title>Opinion</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<script type="text/javascript" src="js/Prototype.js"></script>
<script type="text/javascript" language="javascript">
self.resizeTo(screen.width,screen.height);
self.moveTo(0,0);
function OpeChk()
{
 if(document.getElementById('chkbp').checked==true)
 {
  document.getElementById("tdyes").style.color='#FD0000'; 
  document.getElementById("tdyes1").style.color='#000000'; 
  document.getElementById("y1").disabled=false;
  document.getElementById("tdno").style.color='#FD0000'; 
  document.getElementById("tdno1").style.color='#000000'; 
  document.getElementById("n1").disabled=false;
 }
 else
 {
  document.getElementById("tdyes").style.color='#FFA6A6'; 
  document.getElementById("tdyes1").style.color='#C3C3C3'; 
  document.getElementById("y1").disabled=true;
  document.getElementById("tdno").style.color='#FFA6A6'; 
  document.getElementById("tdno1").style.color='#C3C3C3'; 
  document.getElementById("n1").disabled=true;
 }
}

function FunOpi(v,ei,ci)
{ 
 var agree=confirm("Are you sure?")
 if(agree)
 { 
   var url = 'Opinion.php'; var pars = 'action=resultopn&v='+v+'&ei='+ei+'&ci='+ci;	
   var myAjax = new Ajax.Request( url, { method: 'post', parameters: pars, onComplete: show_OpnRes }); 
 }
 else{return false;}
}
function show_OpnRes(originalRequest)
{ document.getElementById('SpanOpninon').innerHTML = originalRequest.responseText; 
  if(document.getElementById('opnreslt').value==1)
  { alert("Thank you for your vote!"); 
    document.getElementById('y1').disabled=true; document.getElementById('n1').disabled=true;
    document.getElementById('chkbp').disabled=true;
	window.close();
  }
  else{ alert("Error...!"); }
}


</SCRIPT>
</head>
<body class="body"> 
<center>
<?php $sqlE=mysql_query("select Gender,DOB,Married,MarriageDate,HusWifeName,ProfileCertify from hrm_employee_general INNER JOIN hrm_employee_personal ON hrm_employee_general.EmployeeID=hrm_employee_personal.EmployeeID INNER JOIN hrm_employee_family ON hrm_employee_general.EmployeeID=hrm_employee_family.EmployeeID INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee_general.EmployeeID=".$EmployeeId, $con); $resE=mysql_fetch_assoc($sqlE); 
?> 
<table>
<tr>
 <td valign="top" align="center">
 <table border="0" style="width:100%;float:none;" cellpadding="0">
  <tr>
   <td valign="top" style="width:100%;"> 
   <table style="width:100%;" border="0">
    <tr>
<?php //******************** Main Body Main Body Open Open *************************** ?>
<td style="width:100%;" valign="top">
<!---------------------------------------------------------------------------->
<!---------------------------------------------------------------------------->
 <table style="width:100%;font-family:Times New Roman;font-size:16px;">
  <tr>
   <td align="center" style="width:100%;">
    <div class="col-md-10 well" align="center" style="box-shadow: 5px 10px 30px #888888;">
<legend class="bgc" style="color:#fff;padding-top:10px;padding-bottom:10px;border-top-left-radius:10px; width:100%; border-top-right-radius:10px;vertical-align:middle;"><span style="color:#008A00;font-size:20px;font-weight:bold;">Opinion Poll</span></legend></div>
   </td>
  </tr>
  <tr><td style="height:10px;"></td></tr>
  <tr>
   <td align="center" style="width:100%;font-size:20px;color:#CA0000;height:35px;vertical-align:middle;">
   <b>
   Do you want to migrate to New PF contribution structure ?<br>
   <font style="font-size:17px;">क्या आप पी एफ योगदान की नई सरंचना में  स्थानांतरित करना चाहते हैं ?</font>
   </b>
   </td>
  </tr>
  <tr>
   <td align="center" style="width:100%;font-size:18px;color:#000;">
   Below here are your comparative CTC structure<br>
   <font style="font-size:14px;">नीचे यहाँ आपकी तुलनात्मक सीटीसी संरचना है |</font>
   </td>
  </tr> 
  <tr>
   <td align="center">
 <!-------------------------- CTC OPEN CTC OPEN -------------------------------->
 
<table border="0">
<?php 
$SqlCtc=mysql_query("SELECT * FROM hrm_employee_ctc WHERE EmployeeID=".$EmployeeId." AND Status='A'",$con); $ResCtc=mysql_fetch_assoc($SqlCtc); 
$SqlStat=mysql_query("select hrm_company_statutory_lumpsum.*,hrm_company_statutory_taxsaving.*,hrm_company_statutory_pf.* from hrm_company_statutory_lumpsum INNER JOIN hrm_company_statutory_taxsaving ON hrm_company_statutory_lumpsum.CompanyId=hrm_company_statutory_taxsaving.CompanyId INNER JOIN hrm_company_statutory_pf ON hrm_company_statutory_lumpsum.CompanyId=hrm_company_statutory_pf.CompanyId where hrm_company_statutory_lumpsum.CompanyId=".$CompanyId, $con); $ResStat=mysql_fetch_assoc($SqlStat);
?> 		
	
<tr>
		  <td style="font-family:Times New Roman;color:#000000;width:750px;font-size:18px;text-align:justify;" align="center" bgcolor="#7a6189">
<table border="1" width="750" id="TEmp" cellpadding="1" cellspacing="2" bgcolor="#FFFFFF">
<tr>
  <td align="left" style="width:600px;font-size:17px; height:18px;">&nbsp;<b>[A] Monthly Components</b></td>
  <td align="center">&nbsp;<b>Present Salary<br>(Rs.)</b></td>
  <td align="center" style="width:180px;">&nbsp;<b>Proposed Salary<br>(Rs.) </b></td>
</tr>
<tr>
  <td align="left" style="width:300px;font-size:16px;">&nbsp;<span id="BasSti"><input type="hidden" value="B" name="Basic"/><?php if($ResCtc['BAS']=='Y' AND $ResCtc['BAS_Value']>0) { echo 'Basic'; } elseif($ResCtc['STIPEND']=='Y' AND $ResCtc['STIPEND_Value']>0) { echo 'Stipend'; }?></span> :
  </td>
<td align="right" style="width:180px;font-size:16px;"><?php if($ResCtc['BAS']=='Y' AND $ResCtc['BAS_Value']>0) { echo intval($ResCtc['BAS_Value']); } elseif($ResCtc['STIPEND']=='Y' AND $ResCtc['STIPEND_Value']>0) { echo intval($ResCtc['STIPEND_Value']); }?>&nbsp;&nbsp;</td>
<td align="right" style="width:180px;font-size:16px;background-color:#D8FB97;"><?php if($ResCtc['BAS']=='Y' AND $ResCtc['BAS_Value']>0) { echo intval($ResCtc['BAS_Value']); } elseif($ResCtc['STIPEND']=='Y' AND $ResCtc['STIPEND_Value']>0) { echo intval($ResCtc['STIPEND_Value']); }?>&nbsp;&nbsp;</td>
</tr>
<tr>
  <td align="left" style="width:300px;font-size:16px;" id="hraA">&nbsp;HRA :</td>
  <td align="right" style="width:180px;font-size:16px;" id="hraB"><?php echo intval($ResCtc['HRA_Value']); ?>&nbsp;&nbsp;</td>
  <td align="right" style="width:180px;font-size:16px;background-color:#D8FB97;" id="hraB"><?php echo intval($ResCtc['HRA_Value']); ?>&nbsp;&nbsp;</td>
</tr>
<tr>
  <td align="left" style="width:300px;font-size:16px;" id="caA">&nbsp;Conveyance Allowance :</td>
  <td align="right" style="width:180px;font-size:16px;" id="caB"><?php echo intval($ResCtc['CONV_Value']); ?>&nbsp;&nbsp;</td>
  <td align="right" style="width:180px;font-size:16px;background-color:#D8FB97;" id="caB"><?php echo intval($ResCtc['CONV_Value']); ?>&nbsp;&nbsp;</td>
</tr>

<?php /*************************** For Proposal **************/

if($ResCtc['BAS']=='Y' AND $ResCtc['BAS_Value']>0){ $bs=$ResCtc['BAS_Value']; }elseif($ResCtc['STIPEND']=='Y' AND $ResCtc['STIPEND_Value']>0){ $bs=$ResCtc['STIPEND_Value']; }
 $Ac_Pf=round(($bs*12)/100); 
 if($Ac_Pf>$ResCtc['PF_Employee_Contri_Value'])
 {
  $diff_pf=$Ac_Pf-$ResCtc['PF_Employee_Contri_Value'];
  $Ac_Sp=$ResCtc['SPECIAL_ALL_Value']-$diff_pf;
  $Ac_GrossS=$ResCtc['Tot_GrossMonth']-$diff_pf;
  $Ac_Prop_GrossS=$ResCtc['GrossSalary_PostAnualComponent_Value']-$diff_pf;
  $Ac_NetSal=$ResCtc['NetMonthSalary_Value']-($diff_pf*2);
  $Ac_GrossS_Annual=$Ac_GrossS*12;

  $Ac_Com_PfContb=$ResCtc['PF_Employer_Contri_Annul']+($diff_pf*12);
  
  
  //$Ac_Nms=$ResCtc['NetMonthSalary_Value']-$diff_pf;
 }
 else
 {
  $diff_pf=$ResCtc['PF_Employee_Contri_Value'];
  $Ac_Sp=$ResCtc['SPECIAL_ALL_Value'];
  $Ac_GrossS=$ResCtc['Tot_GrossMonth'];
  $Ac_Prop_GrossS=$ResCtc['GrossSalary_PostAnualComponent_Value'];
  $Ac_NetSal=$ResCtc['NetMonthSalary_Value'];
  $Ac_GrossS_Annual=$ResCtc['Tot_Gross_Annual'];
  
  $Ac_Com_PfContb=$ResCtc['PF_Employer_Contri_Annul'];
  
 } 
 

/*************************** For Proposal **************/ ?>



<tr>
  <td align="left" style="width:300px;font-size:16px;" id="saA">&nbsp;Special Allowance :</td>
  <td align="right" style="width:180px;font-size:16px;" id="saB"><?php echo intval($ResCtc['SPECIAL_ALL_Value']); ?>&nbsp;&nbsp;</td>
  <td align="right" style="width:180px;font-size:16px;background-color:#D8FB97;" id="saB"><?php echo intval($Ac_Sp); ?>&nbsp;&nbsp;</td>
</tr>
<tr>
  <td align="left" style="width:300px;font-size:16px;">&nbsp;Gross Monthly Salary :</td>
  <td align="right" style="width:180px;font-size:16px;"><?php echo intval($ResCtc['Tot_GrossMonth']); ?>&nbsp;&nbsp;</td>
  <td align="right" style="width:180px;font-size:16px;background-color:#D8FB97;"><?php echo intval($Ac_GrossS); ?>&nbsp;&nbsp;</td>
</tr>

<?php if($ResCtc['Tot_GrossMonth']!=$ResCtc['GrossSalary_PostAnualComponent_Value'] AND $ResCtc['GrossSalary_PostAnualComponent_Value']>0) { ?>
<tr>
  <td align="left" style="width:300px;font-size:16px;">&nbsp;Gross Monthly Salary (Post Annual Components) :</td>
  <td align="right" style="width:180px;font-size:16px;"><?php echo intval($ResCtc['GrossSalary_PostAnualComponent_Value']); ?>&nbsp;&nbsp;</td>
  <td align="right" style="width:180px;font-size:16px;background-color:#D8FB97;"><?php echo intval($Ac_Prop_GrossS); ?>&nbsp;&nbsp;</td>
</tr>
<?php } ?>

<?php if($CompanyId==1 OR $CompanyId==3) { ?>
<tr>
  <td align="left" style="width:300px;font-size:16px;" id="pfA">&nbsp;Provident Fund :</td>
  <td align="right" style="width:180px;font-size:16px;" id="pfB"><?php echo intval($ResCtc['PF_Employee_Contri_Value']); ?>&nbsp;&nbsp;</td>
  <td align="right" style="width:180px;font-size:16px;background-color:#D8FB97;" id="pfB"><?php echo intval($Ac_Pf); ?>&nbsp;&nbsp;</td>
   
</tr>
<?php if($ResCtc['ESCI']>0){ ?>
<tr>
  <td align="left" style="width:300px;font-size:16px;" id="pfA">&nbsp;ESIC :</td>
  <td align="right" style="width:180px;font-size:16px;" id="pfB"><?php echo intval($ResCtc['ESCI']); ?>&nbsp;&nbsp;</td>
  <td align="right" style="width:180px;font-size:16px;background-color:#D8FB97;" id="pfB"><?php echo intval($ResCtc['ESCI']); ?>&nbsp;&nbsp;</td>
</tr>
<?php } ?>
<tr>
  <td align="left" style="width:300px;font-size:16px;">&nbsp;Net Monthly Salary :</td>
  <td align="right" style="width:180px;font-size:16px;"><b><?php echo intval($ResCtc['NetMonthSalary_Value']); ?></b>&nbsp;&nbsp;</td>
  <td align="right" style="width:180px;font-size:16px;background-color:#D8FB97;"><b><?php echo intval($Ac_NetSal); ?></b>&nbsp;&nbsp;</td>
</tr>
<?php } if($CompanyId==1 OR $CompanyId==3) {?>
<tr>
  <td align="left" style="width:650px;font-size:17px; height:18px;" colspan="3">&nbsp;<b>[B] Annual Components (Tax saving components which shall be reimbursed on production of documents)</b></td>
</tr>
<tr>
  <td align="left" style="width:300px;font-size:16px;" id="mrA">&nbsp;Medical Reimbursement :</td>
  <td align="right" style="width:180px;font-size:16px;" id="mrB"><?php echo intval($ResCtc['MED_REM_Value']); ?>&nbsp;&nbsp;</td>
  <td align="right" style="width:180px;font-size:16px;background-color:#D8FB97;" id="mrB"><?php echo intval($ResCtc['MED_REM_Value']); ?>&nbsp;&nbsp;</td>
</tr>
<tr>
  <td align="left" style="width:300px;font-size:16px;" id="ltaA">&nbsp;Leave Travel Allowance :</td>
  <td align="right" style="width:180px;font-size:16px;" id="ltaB"><?php echo intval($ResCtc['LTA_Value']); ?>&nbsp;&nbsp;</td>
  <td align="right" style="width:180px;font-size:16px;background-color:#D8FB97;" id="ltaB"><?php echo intval($ResCtc['LTA_Value']); ?>&nbsp;&nbsp;</td>
</tr>
<tr>
  <td align="left" style="width:300px;font-size:16px;" id="ceaA">&nbsp;Children Education Allow. :&nbsp;&nbsp;<?php $OneChild=$ResStat['CEA_PerChildMonth']*12; $TwoChild=$OneChild*2;?>
                                                   Child1 :<input type="checkbox" name="CheckC1" id="CheckC1" onClick="FunChild1()" disabled <?php if($ResCtc['CHILD_EDU_ALL_Value']==$OneChild OR $ResCtc['CHILD_EDU_ALL_Value']==$TwoChild){echo 'checked';} ?> />&nbsp;
                                                   Child2 :<input type="checkbox" name="CheckC2" id="CheckC2" onClick="FunChild2()" disabled <?php if($ResCtc['CHILD_EDU_ALL_Value']==$TwoChild){echo 'checked';} ?> /></td>
  <td align="right" style="width:180px;font-size:16px;" id="ceaB"><?php echo intval($ResCtc['CHILD_EDU_ALL_Value']); ?>&nbsp;&nbsp;</td>
  <td align="right" style="width:180px;font-size:16px;background-color:#D8FB97;" id="ceaB"><?php echo intval($ResCtc['CHILD_EDU_ALL_Value']); ?>&nbsp;&nbsp;</td>
</tr>
<tr>
  <td align="left" style="width:300px;font-size:16px;">&nbsp;Annual Gross Salary :</td>
  <td align="right" style="width:180px;font-size:16px;"><?php echo intval($ResCtc['Tot_Gross_Annual']); ?>&nbsp;&nbsp;</td>
  <td align="right" style="width:180px;font-size:16px;background-color:#D8FB97;"><?php echo intval($Ac_GrossS_Annual); ?>&nbsp;&nbsp;</td>
</tr>
<?php } if($CompanyId==1) { ?>
<tr>
  <td align="left" style="width:650px;font-size:17px; height:18px;" colspan="3">&nbsp;<b>[C] Other Annual Components (Statutory components)
</tr>
<?php if($ResCtc['BONUS_Value']>0){ ?>
<tr>
  <td align="left" style="width:300px;font-size:16px;" id="bonusA">&nbsp;Bonus/Exgretia :</td>
  <td align="right" style="width:180px;font-size:16px;" id="bonusB"><?php echo intval($ResCtc['BONUS_Value']); ?>&nbsp;&nbsp;</td>
  <td align="right" style="width:180px;font-size:16px;background-color:#D8FB97;" id="bonusB"><?php echo intval($ResCtc['BONUS_Value']); ?>&nbsp;&nbsp;</td>
</tr>
<?php } ?>
<tr>
  <td align="left" style="width:300px;font-size:16px;" id="gratuityA">&nbsp;Estimated Gratuity :</td>
  <td align="right" style="width:180px;font-size:16px;" id="gratuityB"><?php echo intval($ResCtc['GRATUITY_Value']); ?>&nbsp;&nbsp;</td>
  <td align="right" style="width:180px;font-size:16px;background-color:#D8FB97;" id="gratuityB"><?php echo intval($ResCtc['GRATUITY_Value']); ?>&nbsp;&nbsp;</td>
</tr>
<tr>
  <td align="left" style="width:300px;font-size:16px;" id="pfcontriA">&nbsp;Employer's PF Contribustion :</td>
  <td align="right" style="width:180px;font-size:16px;" id="pfcontriB"><?php echo intval($ResCtc['PF_Employer_Contri_Annul']); ?>&nbsp;&nbsp;</td>
  <td align="right" style="width:180px;font-size:16px;background-color:#D8FB97;" id="pfcontriB"><?php echo intval($Ac_Com_PfContb); ?>&nbsp;&nbsp;</td>
</tr>
<?php } if($CompanyId==1 OR $CompanyId==3) {?>
<?php if($ResCtc['AnnualESCI']>0){ ?>
<tr>
  <td align="left" style="width:300px;font-size:16px;" id="mppA">&nbsp;Employer's ESCI Contribustion :</td>
  <td align="right" style="width:180px;font-size:16px;" id="mppB"><?php echo intval($ResCtc['AnnualESCI']); ?>&nbsp;&nbsp;</td>
  <td align="right" style="width:180px;font-size:16px;background-color:#D8FB97;" id="mppB"><?php echo intval($ResCtc['AnnualESCI']); ?>&nbsp;&nbsp;</td>
</tr>
<?php } if($ResCtc['Mediclaim_Policy']>0){ ?>
<tr>
  <td align="left" style="width:300px;font-size:16px;" id="mppA">&nbsp;Mediclaim Policy Premium :</td>
  <td align="right" style="width:180px;font-size:16px;" id="mppB"><?php echo intval($ResCtc['Mediclaim_Policy']); ?>&nbsp;&nbsp;</td>
  <td align="right" style="width:180px;font-size:16px;background-color:#D8FB97;" id="mppB"><?php echo intval($ResCtc['Mediclaim_Policy']); ?>&nbsp;&nbsp;</td>
</tr>
<?php } ?>
<?php } ?>
<tr>
  <td align="left" style="width:300px;font-size:16px;">&nbsp;Total Cost to Company :</td>
  <td align="right" style="width:180px;font-size:16px;"><b><?php echo intval($ResCtc['Tot_CTC']); ?></b>&nbsp;&nbsp;</td>
  <td align="right" style="width:180px;font-size:16px;background-color:#D8FB97;"><b><?php echo intval($ResCtc['Tot_CTC']); ?></b>&nbsp;&nbsp;</td>
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
  <td align="right" style="width:180px;font-size:16px;" id="micB"><?php echo intval($ResCtc['EmpAddBenifit_MediInsu_value']); ?>&nbsp;&nbsp;</td>
  <td align="right" style="width:180px;font-size:16px;background-color:#D8FB97;" id="micB"><?php echo intval($ResCtc['EmpAddBenifit_MediInsu_value']); ?>&nbsp;&nbsp;</td>
</tr>
<?php } if($ResCtc['Car_Entitlement']>0) { ?>
<tr>
  <td align="left" class="All_300" id="micA">&nbsp;Car entitlement as per car policy : </td>
  <td align="right" class="All_180" id="micB"><?php echo intval($ResCtc['Car_Entitlement']); ?>&nbsp;&nbsp;</td>
  <td align="right" class="All_180" style="background-color:#D8FB97;" id="micB"><?php echo intval($ResCtc['Car_Entitlement']); ?>&nbsp;&nbsp;</td>
</tr>
<?php } ?>
<?php } ?>
<tr>  
<?php } ?>
   
</tr>
</table>
	 </tr>
    </table>
   </td>
  </tr>					    
</table>  
 
 
 <!-------------------------- CTC CLOSE CTC CLOSE ------------------------------>   
   </td>
  </tr>
  <?php $sql=mysql_query("select * from hrm_opinion where EmployeeID=".$EmployeeId." AND OpenionName='mig_ctc'",$con);  $row=mysql_num_rows($sql); $rop=mysql_fetch_assoc($sql); ?>
  <span id="SpanOpninon"></span>
  
   <?php if(date("Y-m-d H:i:s")<='2018-12-29 23:59:59'){ ?>
   <tr>
   <td align="center" style="width:100%;font-size:20px;color:#00366C;font-family:Times New Roman;">
    <u>I want to submit my vote /<font style="font-size:16px;">मैं अपना वोट करना चाहता हूँ |</font></u>
	<input type="checkbox" id="chkbp" onClick="OpeChk()" <?php if($row>0){ echo 'checked="checked"'; echo 'disabled="disabled"'; } ?>>
   </td>
  </tr>
  <tr>
   <td align="center">
   <table style="width:90%;" border="3">
    <tr>
	 <td style="width:100%;">
	 
    <table style="width:100%;font-size:18px;color:#00366C;font-family:Times New Roman; background-color:#DFE6B5;" border="0">
	 <tr>
	  <td style="color:<?php if($row>0){ echo '#FD0000'; }else{echo '#FFA6A6';}?>;width:80px;" align="center" id="tdyes">Yes<input type="radio" name="yn" id="y1" onClick="FunOpi('y',<?php echo $EmployeeId.','.$CompanyId; ?>)"  <?php if($rop['Openion']=='y'){echo 'checked="checked"';} if($row>0){echo 'disabled="disabled"';} ?> disabled="disabled"></td>
	  <td style="color:<?php if($row>0){ echo '#000000'; }else{echo '#C3C3C3';}?>;" id="tdyes1">I want PF deduction on Actual basic, beyond the Basic ceiling of Rs. 15000/-<br> <font style="font-size:15px;">मैं मूल वेतन पर पीएफ कटौती चाहता हूँ, 15000 रुपये की मूल सीमा से ऊपर । </font></td>
	 </tr>
	  <tr>
	  <td style="color:<?php if($row>0){ echo '#FD0000'; }else{echo '#FFA6A6';}?>;width:80px;" align="center" id="tdno">No<input type="radio" name="yn" id="n1" onClick="FunOpi('n',<?php echo $EmployeeId.','.$CompanyId; ?>)" <?php if($rop['Openion']=='n'){echo 'checked="checked"';} if($row>0){echo 'disabled="disabled"';} ?> disabled="disabled"></td>
	  <td style="color:<?php if($row>0){ echo '#000000'; }else{echo '#C3C3C3';}?>;" id="tdno1">I want to continue as per current procedure<br><font style="font-size:15px;">मैं वर्तमान प्रक्रिया के अनुसार ही जारी रखना चाहता हूँ। </font></td>
	 </tr>
	</table>
	
	 </td>
	</tr>
   </table>
   </td>
  </tr>
   <?php }else{ ?>
   <tr><td>&nbsp;</td></tr>
    <tr>
   <td align="center" style="width:100%;color:#FF3E3E;font-size:24px;font-family:Times New Roman;">
    <b>{ <u>Voting Closed</u> }</b>
   </td>
  </tr>
  <?php } ?>
   <tr><td>&nbsp;</td></tr>
  
  <tr>
   <td align="center" style="width:100%;font-size:18px;color:#000;font-family:Times New Roman;">
    <font color="#FF3E3E"><u>Note</u></font> : For more details refer to the mail sent by HR on this subject.    <font color="#FF2222">Voting closes on 29th Dec 2017 by midnight.</font><br>
	<font style="font-size:16px;color:#FF3E3E;"><u>नोट</u> :</font> <font style="font-size:16px;">इस विषय पर अधिक जानकारी के लिए मानव संसाधन द्वारा मेल को देखें। </font><font style="font-size:16px;color:#FF2222;">वोटिंग 29 दिसंबर, 2017 को आधी रात में बंद हो जाएगी।</font>
   </td>
  </tr> 
 </table>
<!---------------------------------------------------------------------------->
<!---------------------------------------------------------------------------->
</td>

<?php //******************** Main Body Main Body Close Close *************************** ?>
	
	</tr>
	<tr><td style="height:100px;">&nbsp;</td></tr>
   </table>	   
   </td>
  </tr>
 </table> 
 </td>
</tr>
</table>
</center
></body>
</html>

