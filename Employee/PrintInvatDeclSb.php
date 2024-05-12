<?php require_once('../AdminUser/config/config.php'); ?>
<html>
<head>
<title>Investment Declaration Form</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style>.font { color:#ffffff; font-family:Georgia; font-size:11px; width:200px;} .font1 { font-family:Georgia; font-size:11px; height:14px; } 
.font2 { font-size:11px;width:260px;height:18px;}.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;} .TableHead { font-family:Times New Roman; color:#FFFFFF; font-size:15px; }
.TableHead1 { font-family:Times New Roman; color:#000000; background-color:#FFFFFF; font-size:13px; overflow:hidden; } .InputText {font-family:Times New Roman; font-size:12px; width:100px; height:19px; }.textBox{width:108px;height:21px;}
.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}</style>
<script language="javascript" type="text/javascript">
function PrintIvestDecl(P,EI,M,CI,YI){ window.print(); }
</script>
</head>
<body>
<?php if($_REQUEST['action']=='Print') { ?>
<table>
<tr><td style="font-family:Times New Roman;color:#000000;font-size:15px;width:785;" align="right">
<a href="#" onClick="PrintIvestDecl('<?php echo $_REQUEST['P']; ?>',<?php echo $_REQUEST['EI'].','.$_REQUEST['M'].','.$_REQUEST['CI'].','.$_REQUEST['YI']; ?>)">Print</a>&nbsp;&nbsp;</td></tr>
<?php 
$EI=$_REQUEST['EI']; $YI=$_REQUEST['YI']; $CI=$_REQUEST['CI'];
$sqlE=mysql_query("select Fname,Sname,Lname,EmpCode,DesigId,DepartmentId,Gender,PanNo from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee.EmployeeID=".$EI, $con); $resE=mysql_fetch_assoc($sqlE); 
$sqlDesig=mysql_query("select DesigName from hrm_designation where DesigId=".$resE['DesigId'], $con); $resDesig=mysql_fetch_assoc($sqlDesig);
$sqlD=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$resE['DepartmentId'], $con); $resD=mysql_fetch_assoc($sqlD);
if($ResE['DR']=='Y'){$M='Dr.';} elseif($ResE['Gender']=='M'){$M='Mr.';} elseif($ResE['Gender']=='F' AND $ResE['Married']=='Y'){$M='Mrs.';} elseif($ResE['Gender']=='F' AND $ResE['Married']=='N'){$M='Miss.';}  
$Ename=$resE['Fname'].' '.$resE['Sname'].' '.$resE['Lname']; $LEC=strlen($resE['EmpCode']); 
if($LEC==1){$EC='000'.$resE['EmpCode'];} if($LEC==2){$EC='00'.$resE['EmpCode'];} if($LEC==3){$EC='0'.$resE['EmpCode'];} if($LEC>=4){$EC=$resE['EmpCode'];}

$sqlEdit=mysql_query("select * from hrm_employee_investment_submission where EmployeeID=".$_REQUEST['EI']." AND Period='".$_REQUEST['P']."' AND Month=".$_REQUEST['M'], $con);
$rowEdit=mysql_num_rows($sqlEdit); $resIvst2=mysql_fetch_assoc($sqlEdit);
	  
$SqlIvst=mysql_query("select * from hrm_employee_investment_declaration where EmployeeID=".$_REQUEST['EI']." AND Period='".$_REQUEST['P']."' AND Month=".$_REQUEST['M'], $con); 
$resIvst=mysql_fetch_assoc($SqlIvst); 

$sql=mysql_query("select * from hrm_investdecl_setting_limit where CompanyId=".$_REQUEST['CI']." AND Period='".$_REQUEST['P']."' AND Month=".$_REQUEST['M'], $con); 
$res=mysql_fetch_array($sql); 

?>	
<tr>
 <td align="center">
   <?php //*************************************************************************************************************************************************** ?>	   
		     <table border="0" id="Activity">
			  <tr>		 
				  <td align="left" width="850" valign="top">
	     <table border="0" width="850">	 
		    <tr>
             <td colspan="10" align="center" align="center">&nbsp;
			 <font color="#106809" style='font-family:Times New Roman;' size="4"><b>Investment Submission Form <?php echo $_REQUEST['P']; ?></b></font>
			 </td>
			</tr>
			<tr>
			 <td>
			<table border="0">		
<tr>
		  <td style="font-family:Times New Roman;color:#000000;width:685px;font-size:18px;text-align:justify;" align="center" bgcolor="#7a6189">
<table border="1" width="850" id="TEmp" cellpadding="1" cellspacing="2" bgcolor="#FFFFFF">
<tr>
  <td align="center" style="width:850px;font-size:15px; height:18px;" colspan="5"><b>(To be used to declare investment for income Tax that will be made during the period <?php echo $PrdCurr; ?>)</b></td>
</tr>
<tr>
<td align="left" valign="top" style="width:100px;font-size:15px;">&nbsp;Company</td>
<?php $SqlCom=mysql_query("select CompanyName from hrm_company_basic where CompanyId=".$_REQUEST['CI']."", $con); $resCom=mysql_fetch_assoc($SqlCom); ?> 
<td align="left" valign="top" style="width:550px;font-size:15px; color:#003700;">&nbsp;<b><?php echo strtoupper($resCom['CompanyName']); ?></b></td>
<td align="center" valign="top" style="width:90px;font-size:15px;">&nbsp;EmployeeID</td>
<td align="center" valign="top" colspan="2" style="width:100px;font-size:15px;">&nbsp;<?php echo $EC; ?></td>
</tr>
<tr>
<td align="left" valign="top" style="width:100px;font-size:15px;">&nbsp;Employee</td>
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;<?php echo strtoupper($Ename); ?></td>
<td align="left" valign="top" style="width:200px;font-size:15px;" colspan="3">&nbsp;</td>
</tr>
<tr>
<td align="left" valign="top" style="width:100px;font-size:15px;">&nbsp;PAN Number </td>
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;<?php echo strtoupper($resE['PanNo']); ?></td>
<td align="center" valign="top" style="width:200px;font-size:15px;" colspan="3">&nbsp;</td>
</tr>
<tr style="background-color:#0080FF;">
<td align="center" valign="top" style="width:100px;font-size:15px;color:#FFFFFF;"><b>Item</b></td>
<td align="center" valign="top" style="width:550px;font-size:15px;color:#FFFFFF;"><b>Particulars</b></td>
<td align="center" valign="top" style="width:90px;font-size:15px;color:#FFFFFF;"><b>Max. Limit</b></td>
<td align="center" valign="top" style="width:100px;font-size:15px;color:#FFFFFF;"><b>Declared_Amt</b></td>
<td align="center" valign="top" style="width:100px;font-size:15px;color:#FFFFFF;"><b>Submiss<sup>n</sup>_Amt</b></td>
</tr>
<tr bgcolor="#CEFFCE">
<td align="left" colspan="5" valign="top" style="width:850px;font-size:15px;">&nbsp;<b>Deduction Under Section 10</b></td>
</tr>
<?php $SqlHRA=mysql_query("select HRA_Value,BAS_Value from hrm_employee_ctc where EmployeeID=".$_REQUEST['EI']." AND Status='A'", $con); $resHRA=mysql_fetch_assoc($SqlHRA);
$LTA=$resHRA['BAS_Value']*2; $HRA=$resHRA['HRA_Value']*12;?> 
<tr>
<td align="left" valign="top" style="width:100px;font-size:15px;">&nbsp;House Rent Sec 10(13A)</td>
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;I am staying in a house and I egree to submit rent receipts when required. The Rent paid is (Rs._______ Per Month) & the house is located in Non-Metro</td>
<td align="center" valign="top" style="width:90px;font-size:15px;">&nbsp;</td>
<td align="center" valign="top" style="width:100px;font-size:15px;"><?php if($resIvst['HRA']==''){echo 0;}else { echo $resIvst['HRA']; }?></td>
<td align="center" valign="top" style="width:100px;font-size:15px;"><?php if($resIvst2['HRA']==''){echo 0;}else { echo $resIvst2['HRA']; }?></td>
</tr> 
<?php if($resIvst['LTA']>0){ ?>
<tr>
<td align="left" valign="top" style="width:100px;font-size:15px;">&nbsp;LTA Sec 10(5)</td>
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;I will provide the tickets/ Travels bills in original as per(twice basic monthly) the LTA policy or else the company can consider amount as taxable.</td>
<td align="center" valign="top" style="width:90px;font-size:15px;"><?php echo $LTA; ?><br>
<input type="checkbox" id="LtaCheck" onClick="FunLtaCheck()" <?php if($resIvst['LTA']>0){echo 'checked';} ?> disabled/></td>
<td align="center" valign="top" style="width:100px;font-size:15px;"><?php if($resIvst['LTA']==''){echo 0;}else {echo $resIvst['LTA']; } ?></td>
<td align="center" valign="top" style="width:100px;font-size:15px;"><?php if($resIvst2['LTA']==''){echo 0;}else {echo $resIvst2['LTA']; } ?></td>
</tr>
<?php } if($resIvst['CEA']>0){ ?>
<tr>
<td align="left" valign="top" style="width:100px;font-size:15px;">&nbsp;CEA Sec 10(14)</td>
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;I will provide the copy of tution fees reciept as per CEA policy or else the company can consider amount as taxable.(Rs100/- per month per child upto max of two children)</td>
<td align="center" valign="top" style="width:90px;font-size:15px;">2400<br>Child 1<input type="checkbox" id="CeaCheck1" onClick="FunCeaCheck()" <?php if($resIvst['CEA']>0 AND ($resIvst['CEA']==1200 OR $resIvst['CEA']==2400)){echo 'checked';} ?> disabled/><br>Child 2<input type="checkbox" id="CeaCheck2" onClick="FunCeaCheck()" <?php if($resIvst['CEA']>0 AND $resIvst['CEA']==2400){echo 'checked';} ?> disabled/></td>
<td align="center" valign="top" style="width:100px;font-size:15px;"><?php if($resIvst['CEA']==''){echo 0;}else {echo $resIvst['CEA']; } ?></td>
<td align="center" valign="top" style="width:100px;font-size:15px;"><?php if($resIvst2['CEA']==''){echo 0;}else {echo $resIvst2['CEA']; } ?></td>
</tr>
<?php } if($resIvst['Medical']>0){ ?>
<tr>
<td align="left" valign="top" style="width:100px;font-size:15px;">&nbsp;Medical Sec 17(2)</td>
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;I will produce the Medical Bills to the Satisfacton of the company for my eligibility of Rs. 15000/- as per Income Tax Act of else the company can consider the amount paid as taxable</td>
<td align="center" valign="top" style="width:90px;font-size:15px;">15000<br>
<input type="checkbox" id="MedicalCheck" onClick="FunMedicalCheck()" <?php if($resIvst['Medical']>0){echo 'checked';} ?> disabled/></td>
<td align="center" valign="top" style="width:100px;font-size:15px;"><?php if($resIvst['Medical']==''){echo 0;}else { echo $resIvst['Medical']; }?></td>
<td align="center" valign="top" style="width:100px;font-size:15px;"><?php if($resIvst2['Medical']==''){echo 0;}else { echo $resIvst2['Medical']; }?></td>
</tr>
<?php } ?>
<tr bgcolor="#CEFFCE">
<td align="left" colspan="5" valign="top" style="width:850px;font-size:15px;">&nbsp;<b>** If you have opted for the medical reimbursements ( being Medical expenses part of your CTC)</b></td>
</tr>
<tr style="background-color:#0080FF;">
<td align="center" valign="top" colspan="2" style="width:20px;font-size:15px; background-color:#0080FF; color:#FFFFFF;"></td>
<td align="center" valign="top" style="width:100px;font-size:15px;color:#FFFFFF;"><b>Max. Limit</b></td>
<td align="center" valign="top" style="width:100px;font-size:15px;color:#FFFFFF;"><b>Declared_Amt</b></td>
<td align="center" valign="top" style="width:100px;font-size:15px;color:#FFFFFF;"><b>Submiss<sup>n</sup>_Amt</b></td>
</tr>
<tr>
<td align="Center" valign="middle" rowspan="5" style="width:100px;font-size:15px;">&nbsp;Deductions Under Chapeter VI A </td>
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;Sec.80D - Medical Insurance Premium (If the policy covers a senior Citizen then additional deduction of Rs.5000/- is available & deduction on account of expenditure on preventive Health Check-Up (for Self, Spouse, Dependant Children & Parents )Shall not exceed in the aggregate Rs 5000/-.) </td>
<td align="center" valign="top" style="width:90px;font-size:15px;"><?php if($res['MIP_Limit']>0){echo intval($res['MIP_Limit']);}else{ echo '&nbsp;'; } ?></td>
<td align="center" valign="top" style="width:100px;font-size:15px;"><?php if($resIvst['MIP']==''){echo 0;}else { echo $resIvst['MIP']; } ?></td>
<td align="center" valign="top" style="width:100px;font-size:15px;"><?php if($resIvst2['MIP']==''){echo 0;}else { echo $resIvst2['MIP']; } ?></td>
</tr>
<tr>
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;"Sec. 80DD - Medical treatment/insurance of Handicapped Dependant
A higher deduction of Rs. 100,000 is available, where such dependent is with severe disability of > 80%" </td>
<td align="center" valign="top" style="width:90px;font-size:15px;"><?php if($res['MTI_Limit']>0){echo intval($res['MTI_Limit']);}else{ echo '&nbsp;'; } ?></td>
<td align="center" valign="top" style="width:100px;font-size:15px;"><?php if($resIvst['MTI']==''){echo 0;}else { echo $resIvst['MTI']; } ?></td>
<td align="center" valign="top" style="width:100px;font-size:15px;"><?php if($resIvst2['MTI']==''){echo 0;}else { echo $resIvst2['MTI']; } ?></td>
</tr>
<tr>
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;"Sec 80DDB - Medical treatment (specified diseases only)
(medical treatment in respect of a senior Citizen then additional deduction of Rs.20,000/- is available)" </td>
<td align="center" valign="top" style="width:90px;font-size:15px;"><?php if($res['MTS_Limit']>0){echo intval($res['MTS_Limit']);}else{ echo '&nbsp;'; } ?></td>
<td align="center" valign="top" style="width:100px;font-size:15px;"><?php if($resIvst['MTS']==''){echo 0;}else { echo $resIvst['MTS']; } ?></td>
<td align="center" valign="top" style="width:100px;font-size:15px;"><?php if($resIvst2['MTS']==''){echo 0;}else { echo $resIvst2['MTS']; } ?></td>
</tr>
<tr>
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;Sec 80E - Repayment of Loan for higher education (only interest) </td>
<td align="center" valign="top" style="width:90px;font-size:15px;"><?php if($res['ROL_Limit']>0){echo intval($res['ROL_Limit']);}else{ echo '&nbsp;'; } ?></td>
<td align="center" valign="top" style="width:100px;font-size:15px;"><?php if($resIvst['ROL']==''){echo 0;}else { echo $resIvst['ROL']; } ?></td>
<td align="center" valign="top" style="width:100px;font-size:15px;"><?php if($resIvst2['ROL']==''){echo 0;}else { echo $resIvst2['ROL']; } ?></td>
</tr>
<tr>
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;Sec 80U - Handicapped </td>
<td align="center" valign="top" style="width:90px;font-size:15px;"><?php if($res['Handi_Limit']>0){echo intval($res['Handi_Limit']);}else{ echo '&nbsp;'; } ?></td>
<td align="center" valign="top" style="width:100px;font-size:15px;"><?php if($resIvst['Handi']==''){echo 0;}else { echo $resIvst['Handi']; }?></td>
<td align="center" valign="top" style="width:100px;font-size:15px;"><?php if($resIvst2['Handi']==''){echo 0;}else { echo $resIvst2['Handi']; }?></td>
</tr>
<tr style="display:none;">
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;Sec 80G - Donation to certain funds </td>
<td align="center" valign="top" style="width:90px;font-size:15px;"><select id="80GPer" name="80GPer" style="height:20px; width:85px; background-color:#AAD5FF;" disabled><option value="<?php if($resIvst['80G_Per']==0){echo 0;}else {echo $resIvst['80G_Per']; } ?>"><?php if($resIvst['80G_Per']==0){echo 'Select';} else{echo $resIvst['80G_Per'].'%'; } ?></option><option value="50">50%</option><option value="100">100%</option>
</select></td>
<td align="center" valign="top" style="width:100px;font-size:15px;"><?php if($resIvst['DTC']==''){echo 0;}else { echo $resIvst['DTC']; }?></td>
<td align="center" valign="top" style="width:100px;font-size:15px;"><?php if($resIvst2['DTC']==''){echo 0;}else { echo $resIvst2['DTC']; }?></td>
</tr>
<tr style="display:none;">
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;Sec 80GGA - Donation for scientific research</td>
<td align="center" valign="top" style="width:90px;font-size:15px;">&nbsp;</td>
<td align="center" valign="top" style="width:100px;font-size:15px;"><?php if($resIvst['DFS']==''){echo 0;}else { echo $resIvst['DFS']; }?></td>
<td align="center" valign="top" style="width:100px;font-size:15px;"><?php if($resIvst2['DFS']==''){echo 0;}else { echo $resIvst2['DFS']; }?></td>
</tr>
<tr style="background-color:#0080FF;">
<td align="center" valign="top" colspan="2" style="width:20px;font-size:15px; background-color:#0080FF; color:#FFFFFF;"></td>
<td align="center" valign="top" style="width:100px;font-size:15px;color:#FFFFFF;"><b>Max. Limit</b></td>
<td align="center" valign="top" style="width:100px;font-size:15px;color:#FFFFFF;"><b>Declared_Amt</b></td>
<td align="center" valign="top" style="width:100px;font-size:15px;color:#FFFFFF;"><b>Submiss<sup>n</sup>_Amt</b></td>
</tr>
<tr>
<td align="Center" valign="middle" rowspan="14" style="width:100px;font-size:15px;">&nbsp;Deduction Under Section 80C</td>
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;Sec 80CCC - Contribution to Pension Fund (Jeevan Suraksha)</td>
<td rowspan="14" align="center" valign="middle" style="width:90px;font-size:15px;"><?php if($res['PenFun_Limit']>0){echo intval($res['PenFun_Limit']);}else{echo '&nbsp;';}?></td>
<td align="center" valign="top" style="width:100px;font-size:15px;"><?php if($resIvst['PenFun']==''){echo 0;}else { echo $resIvst['PenFun']; } ?></td>
<td align="center" valign="top" style="width:100px;font-size:15px;"><?php if($resIvst2['PenFun']==''){echo 0;}else { echo $resIvst2['PenFun']; } ?></td>
</tr>
<tr>
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;Life Insurance Premium </td>
<td align="center" valign="top" style="width:100px;font-size:15px;"><?php if($resIvst['LIP']==''){echo 0;}else {echo $resIvst['LIP']; } ?></td>
<td align="center" valign="top" style="width:100px;font-size:15px;"><?php if($resIvst2['LIP']==''){echo 0;}else {echo $resIvst2['LIP']; } ?></td>
</tr>
<tr>
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;Defferred Annuity</td>
<td align="center" valign="top" style="width:100px;font-size:15px;"><?php if($resIvst['DA']==''){echo 0;}else {echo $resIvst['DA'];} ?></td>
<td align="center" valign="top" style="width:100px;font-size:15px;"><?php if($resIvst2['DA']==''){echo 0;}else {echo $resIvst2['DA'];} ?></td>
</tr>
<tr>
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;Public Provident Fund</td>
<td align="center" valign="top" style="width:100px;font-size:15px;"><?php if($resIvst['PPF']==''){echo 0;}else { echo $resIvst['PPF']; } ?></td>
<td align="center" valign="top" style="width:100px;font-size:15px;"><?php if($resIvst2['PPF']==''){echo 0;}else { echo $resIvst2['PPF']; } ?></td>
</tr>
<tr>
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;Time Deposit in Post Office / Bank for 5 year & above</td>
<td align="center" valign="top" style="width:100px;font-size:15px;"><?php if($resIvst['PostOff']==''){echo 0;}else { echo $resIvst['PostOff']; } ?></td>
<td align="center" valign="top" style="width:100px;font-size:15px;"><?php if($resIvst2['PostOff']==''){echo 0;}else { echo $resIvst2['PostOff']; } ?></td>
</tr>
<tr>
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;ULIP of UTI/LIC	</td>
<td align="center" valign="top" style="width:100px;font-size:15px;"><?php if($resIvst['ULIP']==''){echo 0;}else {echo $resIvst['ULIP']; }?></td>
<td align="center" valign="top" style="width:100px;font-size:15px;"><?php if($resIvst2['ULIP']==''){echo 0;}else {echo $resIvst2['ULIP']; }?></td>
</tr>
<tr>
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;Principal Loan (Housing Loan) Repayment </td>
<td align="center" valign="top" style="width:100px;font-size:15px;"><?php if($resIvst['HL']==''){echo 0;}else { echo $resIvst['HL']; }?></td>
<td align="center" valign="top" style="width:100px;font-size:15px;"><?php if($resIvst2['HL']==''){echo 0;}else { echo $resIvst2['HL']; }?></td>
</tr>
<tr>
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;Mutual Funds</td>
<td align="center" valign="top" style="width:100px;font-size:15px;"><?php if($resIvst['MF']==''){echo 0;}else {echo $resIvst['MF']; } ?></td>
<td align="center" valign="top" style="width:100px;font-size:15px;"><?php if($resIvst2['MF']==''){echo 0;}else {echo $resIvst2['MF']; } ?></td>
</tr>
<tr>
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;Investment in infrastructure Bonds</td>
<td align="center" valign="top" style="width:100px;font-size:15px;"><?php if($resIvst['IB']==''){echo 0;}else { echo $resIvst['IB']; } ?></td>
<td align="center" valign="top" style="width:100px;font-size:15px;"><?php if($resIvst2['IB']==''){echo 0;}else { echo $resIvst2['IB']; } ?></td>
</tr>
<tr>
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;Children- Tution Fee restricted to max.of 2 children</td>
<td align="center" valign="top" style="width:100px;font-size:15px;"><?php if($resIvst['CTF']==''){echo 0;}else { echo $resIvst['CTF']; } ?></td>
<td align="center" valign="top" style="width:100px;font-size:15px;"><?php if($resIvst2['CTF']==''){echo 0;}else { echo $resIvst2['CTF']; } ?></td>
</tr>
<tr>
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;Deposit in NHB</td>
<td align="center" valign="top" style="width:100px;font-size:15px;"><?php if($resIvst['NHB']==''){echo 0;}else { echo $resIvst['NHB']; }?></td>
<td align="center" valign="top" style="width:100px;font-size:15px;"><?php if($resIvst2['NHB']==''){echo 0;}else { echo $resIvst2['NHB']; }?></td>
</tr>
<tr>
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;Deposit In NSC</td>
<td align="center" valign="top" style="width:100px;font-size:15px;"><?php if($resIvst['NSC']==''){echo 0;}else { echo $resIvst['NSC']; }?></td>
<td align="center" valign="top" style="width:100px;font-size:15px;"><?php if($resIvst2['NSC']==''){echo 0;}else { echo $resIvst2['NSC']; }?></td>
</tr>
<tr>
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;Sukanya Samriddhi</td>
<td align="center" valign="top" style="width:100px;font-size:15px;"><?php if($resIvst['SukS']==''){echo 0;}else { echo $resIvst['SukS']; }?></td>
<td align="center" valign="top" style="width:100px;font-size:15px;"><?php if($resIvst2['SukS']==''){echo 0;}else { echo $resIvst2['SukS']; }?></td>
</tr>
<tr>
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;Others (please specify) Employee Provident Fund	</td>
<td align="center" valign="top" style="width:100px;font-size:15px;"><?php if($resIvst['EPF']==''){echo 0;}else {echo $resIvst['EPF']; }?></td>
<td align="center" valign="top" style="width:100px;font-size:15px;"><?php if($resIvst2['EPF']==''){echo 0;}else {echo $resIvst2['EPF']; }?></td>
</tr>
<tr style="background-color:#0080FF;">
<td align="center" valign="top" colspan="2" style="width:20px;font-size:15px; background-color:#0080FF; color:#FFFFFF;"></td>
<td align="center" valign="top" style="width:100px;font-size:15px;color:#FFFFFF;"><b>Max. Limit</b></td>
<td align="center" valign="top" style="width:100px;font-size:15px;color:#FFFFFF;"><b>Declared_Amt</b></td>
<td align="center" valign="top" style="width:100px;font-size:15px;color:#FFFFFF;"><b>Submiss<sup>n</sup>_Amt</b></td>
</tr>
<tr>
<td align="Center" valign="middle" style="width:100px;font-size:15px;">&nbsp;Sec. 80CCD(1B)</td>
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;NPS (National Pension Scheme)/ Atal Pension Yojna(APY)</td>
<td align="center" valign="top" style="width:90px;font-size:15px;"><?php if($res['NPS_Limit']>0){echo intval($res['NPS_Limit']);}else{ echo '&nbsp;'; } ?></td>
<td align="center" valign="top" style="width:100px;font-size:15px;"><?php if($resIvst['NPS']==''){echo 0;}else { echo $resIvst['NPS']; }?></td>
<td align="center" valign="top" style="width:100px;font-size:15px;"><?php if($resIvst2['NPS']==''){echo 0;}else { echo $resIvst2['NPS']; }?></td>
</tr>
<tr>
<td align="Center" valign="middle" style="width:100px;font-size:15px;">&nbsp;Sec. 80CCD(2)</td>
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;Corporate NPS Scheme</td>
<td align="center" valign="top" style="width:90px;font-size:15px;">10% Of Basic Salary</td>
<td align="center" valign="top" style="width:100px;font-size:15px;"><?php if($resIvst['CorNPS']==''){echo 0;}else { echo $resIvst['CorNPS']; }?></td>
<td align="center" valign="top" style="width:100px;font-size:15px;"><?php if($resIvst2['CorNPS']==''){echo 0;}else { echo $resIvst2['CorNPS']; }?></td>
</tr>
<tr>
<td align="Center" valign="middle" rowspan="5" style="width:100px;font-size:15px;">&nbsp;Previous Employment Salary (Salary earened from 01/04/12 till date of joining) </td>
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;If yes, Form 16 from previous employer or Form 12 B with tax computation statement</td>
<td align="center" valign="top" style="width:90px;font-size:15px;"><?php if($res['Form16_Limit']>0){echo intval($res['Form16_Limit']);}else{ echo '&nbsp;'; } ?></td>
<td align="center" valign="top" style="width:100px;font-size:15px;"><?php if($resIvst['Form16']==''){echo 0;}else { echo $resIvst['Form16']; }?></td>
<td align="center" valign="top" style="width:100px;font-size:15px;"><?php if($resIvst2['Form16']==''){echo 0;}else { echo $resIvst2['Form16']; }?></td>
</tr>
<tr>
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;Salary paid by the Previous Employer after Sec.10 Exemption	</td>
<td align="center" valign="top" style="width:90px;font-size:15px;"><?php if($res['SPE_Limit']>0){echo intval($res['SPE_Limit']);}else{ echo '&nbsp;'; } ?></td>
<td align="center" valign="top" style="width:100px;font-size:15px;"><?php if($resIvst['SPE']==''){echo 0;}else { echo $resIvst['SPE']; } ?></td>
<td align="center" valign="top" style="width:100px;font-size:15px;"><?php if($resIvst2['SPE']==''){echo 0;}else { echo $resIvst2['SPE']; } ?></td>
</tr>
<tr>
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;PROFESSIOAL TAX deducted by the Previous Employer </td>
<td align="center" valign="top" style="width:90px;font-size:15px;"><?php if($res['PT_Limit']>0){echo intval($res['PT_Limit']);}else{ echo '&nbsp;'; } ?></td>
<td align="center" valign="top" style="width:100px;font-size:15px;"><?php if($resIvst['PT']==''){echo 0;}else {echo $resIvst['PT']; }?></td>
<td align="center" valign="top" style="width:100px;font-size:15px;"><?php if($resIvst2['PT']==''){echo 0;}else {echo $resIvst2['PT']; }?></td>
</tr>
<tr>
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;PROVIDENT FUND deducted by the Previous Employer </td>
<td align="center" valign="top" style="width:90px;font-size:15px;"><?php if($res['PFD_Limit']>0){echo intval($res['PFD_Limit']);}else{ echo '&nbsp;'; } ?></td>
<td align="center" valign="top" style="width:100px;font-size:15px;"><?php if($resIvst['PFD']==''){echo 0;}else { echo $resIvst['PFD']; } ?></td>
<td align="center" valign="top" style="width:100px;font-size:15px;"><?php if($resIvst2['PFD']==''){echo 0;}else { echo $resIvst2['PFD']; } ?></td>
</tr>
<tr>
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;INCOME TAX deducted by the Previous Employer</td>
<td align="center" valign="top" style="width:90px;font-size:15px;"><?php if($res['IT_Limit']>0){echo intval($res['IT_Limit']);}else{ echo '&nbsp;'; } ?></td>
<td align="center" valign="top" style="width:100px;font-size:15px;"><?php if($resIvst['IT']==''){echo 0;}else { echo $resIvst['IT']; }?></td>
<td align="center" valign="top" style="width:100px;font-size:15px;"><?php if($resIvst2['IT']==''){echo 0;}else { echo $resIvst2['IT']; }?></td>
</tr>
<tr>
<td align="left" valign="top" colspan="5" style="width:550px;font-size:15px;">&nbsp;</td>
</tr>
<tr>
<td align="Center" valign="top" style="width:100px;font-size:15px;">&nbsp;Income other then Salary Income</td>
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;If yes, then Form 12C detailing other income is attached(only interest)</td>
<td align="center" valign="top" style="width:90px;font-size:15px;">&nbsp;</td>
<td align="center" valign="top" style="width:100px;font-size:15px;">&nbsp;</td>
<td align="center" valign="top" style="width:100px;font-size:15px;">&nbsp;</td>
</tr>
<tr style="background-color:#0080FF;">
<td align="center" valign="top" colspan="2" style="width:20px;font-size:15px; background-color:#0080FF; color:#FFFFFF;"></td>
<td align="center" valign="top" style="width:100px;font-size:15px;color:#FFFFFF;"><b>Max. Limit</b></td>
<td align="center" valign="top" style="width:100px;font-size:15px;color:#FFFFFF;"><b>Declared_Amt</b></td>
<td align="center" valign="top" style="width:100px;font-size:15px;color:#FFFFFF;"><b>Submiss<sup>n</sup>_Amt</b></td>
</tr>
<tr>
<td align="Center" valign="middle" rowspan="2" style="width:100px;font-size:15px;">&nbsp;Deduction under Section 24 </td>
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;Interest on Housing Loan</td>
<td align="center" valign="top" style="width:90px;font-size:15px;"><?php if($res['IHL_Limit']>0){echo intval($res['IHL_Limit']);}else{ echo '&nbsp;'; } ?></td>
<td align="center" valign="top" style="width:100px;font-size:15px;"><?php if($resIvst['IHL']==''){echo 0;}else { echo $resIvst['IHL']; }?></td>
<td align="center" valign="top" style="width:100px;font-size:15px;"><?php if($resIvst2['IHL']==''){echo 0;}else { echo $resIvst2['IHL']; }?></td>
</tr>
<tr>
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;Interest if the loan is taken before 01/04/99</td>
<td align="center" valign="top" style="width:90px;font-size:15px;"><?php if($res['IL_Limit']>0){echo intval($res['IL_Limit']);}else{ echo '&nbsp;'; } ?></td>
<td align="center" valign="top" style="width:100px;font-size:15px;"><?php if($resIvst['IL']==''){echo 0;}else { echo $resIvst['IL']; } ?></td>
<td align="center" valign="top" style="width:100px;font-size:15px;"><?php if($resIvst2['IL']==''){echo 0;}else { echo $resIvst2['IL']; } ?></td>
</tr>
<tr bgcolor="#CEFFCE">
<td align="left" colspan="5" valign="top" style="width:850px;font-size:15px;">&nbsp;<b>Note: Form 12C along with the calculation of loss on house property heeds to be attached for considering the above</b></td>
</tr>
<tr><td align="left" colspan="5" valign="top" style="width:850px;font-size:15px;">&nbsp;<b><u>Declaration:</u></b></td></tr>
<tr><td align="left" colspan="5" valign="top" style="width:850px;font-size:15px;">&nbsp;1) I hereby declare that the information given above is correct and true in all respects.</td></tr>
<tr><td align="left" colspan="5" valign="top" style="width:850px;font-size:15px;">&nbsp;2) I also undertake to indemnify the company for any loss/liability that may arise in the event of the above information being incorrect.</td></tr>
<tr>
<td align="left" valign="top" colspan="2" style="width:550px;font-size:15px;">&nbsp;</td>
<td align="center" valign="bottom" rowspan="2" colspan="3" style="width:200px;font-size:15px;">&nbsp;
</td>
</tr>

<tr>
<td align="" colspan="1" valign="top" style="width:100px;font-size:15px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Date :</b> </td>
<td align="left" valign="top" style="width:550px;font-size:15px;"><?php if($rowEdit==0){echo '';}elseif($rowEdit>0){if($resIvst2['Inv_Date']!='' AND $resIvst2['Inv_Date']!='0000-00-00' AND $resIvst2['Inv_Date']!='1970-01-01'){echo date("d-M-Y", strtotime($resIvst2['Inv_Date'])); } }?></td>
</tr>
<tr>
<td align="" colspan="1" valign="top" style="width:100px;font-size:15px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Place : </b></td>
<td align="left" valign="top" style="width:550px;font-size:15px;"><?php echo $resIvst2['Place']; ?></td>
<td align="center" valign="middle" colspan="3" valign="top" style="width:200px;font-size:15px;"><b>Signature</b></td>
</tr>
		</table>
	  </td>
	 </tr>	
</table>

			
<?php //*************************************************************************************************************************************************** ?>

 </td>
</tr> 
</table>  
<?php } ?>
</body>
</html>

