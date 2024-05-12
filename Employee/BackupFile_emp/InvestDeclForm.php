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
//function Printpage() 
//{ window.print(); window.close(); } 
</script>
<style> printLink{display : none;}</style>
</head>
<body"> <?php //onLoad="Printpage()" ?>
<?php if($_REQUEST['action']=='Print') { ?>
<table>
<?php 
$EI=$_REQUEST['EI']; $CI=$_REQUEST['CI'];
$sqlE=mysql_query("select Fname,Sname,Lname,EmpCode,DesigId,DepartmentId,Gender,PanNo from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee.EmployeeID=".$_REQUEST['EI'], $con); $resE=mysql_fetch_assoc($sqlE); 
$sqlDesig=mysql_query("select DesigName from hrm_designation where DesigId=".$resE['DesigId'], $con); $resDesig=mysql_fetch_assoc($sqlDesig);
$sqlD=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$resE['DepartmentId'], $con); $resD=mysql_fetch_assoc($sqlD);
if($ResE['DR']=='Y'){$M='Dr.';} elseif($ResE['Gender']=='M'){$M='Mr.';} elseif($ResE['Gender']=='F' AND $ResE['Married']=='Y'){$M='Mrs.';} elseif($ResE['Gender']=='F' AND $ResE['Married']=='N'){$M='Miss.';}  
$Ename=$resE['Fname'].' '.$resE['Sname'].' '.$resE['Lname']; $LEC=strlen($resE['EmpCode']); 
if($LEC==1){$EC='000'.$resE['EmpCode'];} if($LEC==2){$EC='00'.$resE['EmpCode'];} if($LEC==3){$EC='0'.$resE['EmpCode'];} if($LEC>=4){$EC=$resE['EmpCode'];}

$SqlIvst=mysql_query("select * from hrm_employee_investment_declaration where IvstDecId=".$_REQUEST['ID']." AND EmployeeID=".$_REQUEST['EI'], $con); 
$resIvst=mysql_fetch_assoc($SqlIvst);

$sql=mysql_query("select * from hrm_investdecl_setting where CompanyId=".$_REQUEST['CI']." AND Status='A'", $con); $res=mysql_fetch_array($sql); 
$sql2=mysql_query("select * from hrm_investdecl_setting_limit where CompanyId=".$_REQUEST['CI']." AND Period='".$resIvst['Period']."' AND Month=".$resIvst['Month'], $con); 
$res2=mysql_fetch_array($sql2); 


?>	
<tr>
 <td align="center">
   <?php //*************************************************************************************************************************************************** ?>	   
		     <table border="0" id="Activity">
			  <tr>		 
				  <td align="left" width="900" valign="top">
	     <table border="0" width="900">	
		 <?php /* 
		    <tr>
             <td colspan="10" align="center" align="center">&nbsp;
			 <font color="#106809" style='font-family:Times New Roman;' size="4"><b>Investment Declaration Form <?php echo $_REQUEST['P']; ?></b></font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" onClick="Printpage()">Print</a>
			 </td>
			</tr>
		*/ ?>	
			<tr>
			 <td>
			<table border="0">		
<tr>
		  <td style="font-family:Times New Roman;color:#000000;width:685px;font-size:18px;text-align:justify;" align="center" bgcolor="#7a6189">
<table border="1" width="900" id="TEmp" cellpadding="1" cellspacing="2" bgcolor="#FFFFFF">
<tr>
  <td align="center" style="width:900px;font-size:15px; height:18px;" colspan="4">&nbsp;<b>(To be used to declare investment for income Tax that will be made during the period <?php echo $_REQUEST['P']; ?>)</b></td>
</tr>
<form name="InvstDecForm" method="post" enctype="multipart/form-data" onSubmit="return validate(this)">
<tr>
<td align="left" valign="top" style="width:100px;font-size:15px;">&nbsp;Company</td>
<?php $SqlCom=mysql_query("select CompanyName from hrm_company_basic where CompanyId=".$_REQUEST['CI']."", $con); $resCom=mysql_fetch_assoc($SqlCom); ?> 
<td align="left" valign="top" style="width:600px;font-size:15px; color:#003700;">&nbsp;<b><?php echo strtoupper($resCom['CompanyName']); ?></b></td>
<td align="center" valign="top" style="width:90px;font-size:15px;">&nbsp;EmployeeID</td>
<td align="center" valign="top" style="width:110px;font-size:15px;">&nbsp;<?php echo $EC; ?></td>
</tr>
<tr>
<td align="left" valign="top" style="width:100px;font-size:15px;">&nbsp;Employee</td>
<td align="left" valign="top" style="width:600px;font-size:15px;">&nbsp;<?php echo strtoupper($Ename); ?></td>
<td align="left" valign="top" style="width:200px;font-size:15px;" colspan="2">&nbsp;</td>
</tr>
<tr>
<td align="left" valign="top" style="width:100px;font-size:15px;">&nbsp;PAN Number </td>
<td align="left" valign="top" style="width:600px;font-size:15px;">&nbsp;<?php echo strtoupper($resE['PanNo']); ?></td>
<td align="center" valign="top" style="width:200px;font-size:15px;" colspan="2">&nbsp;</td>
</tr>
<tr style="background-color:#0080FF;">
<td align="center" valign="top" style="width:100px;font-size:15px;color:#FFFFFF;"><b>Item</b></td>
<td align="center" valign="top" style="width:600px;font-size:15px;color:#FFFFFF;"><b>Particulars</b></td>
<td align="center" valign="top" style="width:90px;font-size:15px;color:#FFFFFF;"><b>Max. Limit</b></td>
<td align="center" valign="top" style="width:110px;font-size:15px;color:#FFFFFF;"><b>Declared_Amt</b></td>
</tr>
<?php $SqlHRA=mysql_query("select HRA_Value,BAS_Value from hrm_employee_ctc where EmployeeID=".$EI." AND Status='A'", $con); $resHRA=mysql_fetch_assoc($SqlHRA);
$LTA=$resHRA['BAS_Value']*2; $HRA=$resHRA['HRA_Value']*12;?> 
<tr>
<td align="left" valign="top" style="width:100px;font-size:15px;">&nbsp;House Rent Sec 10(13A)</td>
<td align="left" valign="top" style="width:600px;font-size:15px;">&nbsp;I am staying in a house and I egree to submit rent receipts when required. The Rent paid is (Rs._______ Per Month) & the house is located in Non-Metro</td>
<td align="center" valign="top" style="width:90px;font-size:15px;">&nbsp;</td>
<td align="center" valign="top" style="width:110px;font-size:15px;"><?php if($resIvst['HRA']==''){echo 0;} else {echo $resIvst['HRA'];} ?></td>
</tr>
<?php if($res['LTA']=='Y'){ ?>
<tr>
<td align="left" valign="top" style="width:100px;font-size:15px;">&nbsp;LTA Sec 10(5)</td>
<td align="left" valign="top" style="width:600px;font-size:15px;">&nbsp;I will provide the tickets/ Travels bills in original as per(twice basic monthly) the LTA policy or else the company can consider amount as taxable.</td>
<td align="center" valign="top" style="width:90px;font-size:15px;"><?php if($resIvst['Curr_LTA']>0){echo $resIvst['Curr_LTA']; } ?></td>
<td align="center" valign="top" style="width:110px;font-size:15px;"><?php if($resIvst['LTA']==''){echo 0;}else {echo $resIvst['LTA']; } ?></td>
</tr>
<?php } if($res['CEA']=='Y'){ ?>
<tr>
<td align="left" valign="top" style="width:100px;font-size:15px;">&nbsp;CEA Sec 10(14)</td>
<td align="left" valign="top" style="width:600px;font-size:15px;">&nbsp;I will provide the copy of tution fees reciept as per CEA policy or else the company can consider amount as taxable.(Rs100/- per month per child upto max of two children)</td>
<td align="center" valign="top" style="width:90px;font-size:15px;"><?php if($resIvst['Curr_CEA']>0){echo $resIvst['Curr_CEA']; } ?></td>
<td align="center" valign="top" style="width:110px;font-size:15px;"><?php if($resIvst['CEA']==''){echo 0;}else {echo $resIvst['CEA']; } ?></td>
</tr>
<?php } if($res['Medical']=='Y'){ ?>
<tr>
<td align="left" valign="top" style="width:100px;font-size:15px;">&nbsp;Medical Sec 17(2)</td>
<td align="left" valign="top" style="width:600px;font-size:15px;">&nbsp;I will produce the Medical Bills to the Satisfacton of the company for my eligibility of Rs. 15000/- as per Income Tax Act of else the company can consider the amount paid as taxable</td>
<td align="center" valign="top" style="width:90px;font-size:15px;"><?php if($resIvst['Curr_Medical']>0){echo $resIvst['Curr_Medical']; } ?></td>
<td align="center" valign="top" style="width:110px;font-size:15px;"><?php echo $resIvst['Medical']; ?></td>
</tr>
<?php } ?>
<tr>
<td align="Center" valign="middle" rowspan="5" style="width:100px;font-size:15px;">&nbsp;Deductions Under Chapeter VI A </td>
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;Sec.80D - Medical Insurance Premium (If the policy covers a senior Citizen then additional deduction of Rs.5000/- is available & deduction on account of expenditure on preventive Health Check-Up (for Self, Spouse, Dependant Children & Parents )Shall not exceed in the aggregate Rs 5000/-.) </td>
<td align="center" valign="top" style="width:90px;font-size:15px;"><?php if($res2['MIP_Limit']>0){echo intval($res2['MIP_Limit']);}else{ echo '&nbsp;'; } ?></td>
<td align="center" valign="top" style="width:110px;font-size:15px;"><?php echo $resIvst['MIP']; ?></td>
</tr>
<tr>
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;"Sec. 80DD - Medical treatment/insurance of Handicapped Dependant
A higher deduction of Rs. 100,000 is available, where such dependent is with severe disability of > 80%" </td>
<td align="center" valign="top" style="width:90px;font-size:15px;"><?php if($res2['MTI_Limit']>0){echo intval($res2['MTI_Limit']);}else{ echo '&nbsp;'; } ?></td>
<td align="center" valign="top" style="width:110px;font-size:15px;"><?php echo $resIvst['MTI']; ?></td>
</tr>
<tr>
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;"Sec 80DDB - Medical treatment (specified diseases only)
(medical treatment in respect of a senior Citizen then additional deduction of Rs.20,000/- is available)" </td>

<td align="center" valign="top" style="width:90px;font-size:15px;"><?php if($res2['MTS_Limit']>0){echo intval($res2['MTS_Limit']);}else{ echo '&nbsp;'; } ?></td>
<td align="center" valign="top" style="width:110px;font-size:15px;"><?php echo $resIvst['MTS']; ?></td>
</tr>
<tr>
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;Sec 80E - Repayment of Loan for higher education (only interest) </td>
<td align="center" valign="top" style="width:90px;font-size:15px;"><?php if($res2['ROL_Limit']>0){echo intval($res2['ROL_Limit']);}else{ echo '&nbsp;'; } ?></td>
<td align="center" valign="top" style="width:110px;font-size:15px;"><?php echo $resIvst['ROL']; ?></td>
</tr>
<tr>
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;Sec 80U - Handicapped </td>
<td align="center" valign="top" style="width:90px;font-size:15px;"><?php if($res2['Handi_Limit']>0){echo intval($res2['Handi_Limit']);}else{ echo '&nbsp;'; } ?></td>
<td align="center" valign="top" style="width:110px;font-size:15px;"><?php echo $resIvst['Handi']; ?></td>
</tr>
<tr style="display:none;">
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;Sec 80G - Donation to certain funds </td>
<td align="center" valign="top" style="width:90px;font-size:15px;"><?php if($resIvst['80G_Per']==0){echo '&nbsp;';} else {echo $resIvst['80G_Per'].' %'; } ?></td>
<td align="center" valign="top" style="width:110px;font-size:15px;"><?php echo $resIvst['DTC']; ?></td>
</tr>
<tr style="display:none;">
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;Sec 80GGA - Donation for scientific research</td>
<td align="center" valign="top" style="width:90px;font-size:15px;">&nbsp;</td>
<td align="center" valign="top" style="width:110px;font-size:15px;"><?php echo $resIvst['DFS']; ?></td>
</tr>
<tr>
<td align="Center" valign="middle" rowspan="14" style="width:100px;font-size:15px;">&nbsp;Deduction Under Section 80C</td>
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;Sec 80CCC - Contribution to Pension Fund (Jeevan Suraksha)</td>
<td align="center" rowspan="14" valign="middle" style="width:90px;font-size:15px;"><?php if($res2['PenFun_Limit']>0){echo intval($res2['PenFun_Limit']);}else{ echo '&nbsp;'; } ?></td>
<td align="center" valign="top" style="width:110px;font-size:15px;"><?php echo $resIvst['PenFun']; ?></td>
</tr>
<tr>
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;Life Insurance Premium </td>
<?php /*<td align="center" valign="top" style="width:90px;font-size:15px;"><?php if($res2['LIP_Limit']>0){echo intval($res2['LIP_Limit']);}else{ echo '&nbsp;'; } ?></td>*/ ?>
<td align="center" valign="top" style="width:110px;font-size:15px;"><?php echo $resIvst['LIP']; ?></td>
</tr>
<tr>
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;Defferred Annuity</td>
<?php /*<td align="center" valign="top" style="width:90px;font-size:15px;"><?php if($res2['DA_Limit']>0){echo intval($res2['DA_Limit']);}else{ echo '&nbsp;'; } ?></td>*/ ?>
<td align="center" valign="top" style="width:110px;font-size:15px;"><?php echo $resIvst['DA']; ?></td>
</tr>
<tr>
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;Public Provident Fund</td>
<?php /*<td align="center" valign="top" style="width:90px;font-size:15px;"><?php if($res2['PPF_Limit']>0){echo intval($res2['PPF_Limit']);}else{ echo '&nbsp;'; } ?></td>*/ ?>
<td align="center" valign="top" style="width:110px;font-size:15px;"><?php echo $resIvst['PPF']; ?></td>
</tr>
<tr>
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;Time Deposit in Post Office / Bank for 5 year & above</td>
<?php /*<td align="center" valign="top" style="width:90px;font-size:15px;"><?php if($res2['PostOff_Limit']>0){echo intval($res2['PostOff_Limit']);}else{ echo '&nbsp;'; } ?></td>*/ ?>
<td align="center" valign="top" style="width:110px;font-size:15px;"><?php echo $resIvst['PostOff']; ?></td>
</tr>
<tr>
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;ULIP of UTI/LIC	</td>
<?php /*<td align="center" valign="top" style="width:90px;font-size:15px;"><?php if($res2['ULIP_Limit']>0){echo intval($res2['ULIP_Limit']);}else{ echo '&nbsp;'; } ?></td>*/ ?>
<td align="center" valign="top" style="width:110px;font-size:15px;"><?php echo $resIvst['ULIP']; ?></td>
</tr>
<tr>
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;Principal Loan (Housing Loan) Repayment </td>
<?php /*<td align="center" valign="top" style="width:90px;font-size:15px;"><?php if($res2['HL_Limit']>0){echo intval($res2['HL_Limit']);}else{ echo '&nbsp;'; } ?></td>*/ ?>
<td align="center" valign="top" style="width:110px;font-size:15px;"><?php echo $resIvst['HL']; ?></td>
</tr>
<tr>
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;Mutual Funds</td>
<?php /*<td align="center" valign="top" style="width:90px;font-size:15px;"><?php if($res2['MF_Limit']>0){echo intval($res2['MF_Limit']);}else{ echo '&nbsp;'; } ?></td>*/ ?>
<td align="center" valign="top" style="width:110px;font-size:15px;"><?php echo $resIvst['MF']; ?></td>
</tr>
<tr>
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;Investment in infrastructure Bonds</td>
<?php /*<td align="center" valign="top" style="width:90px;font-size:15px;"><?php if($res2['IB_Limit']>0){echo intval($res2['IB_Limit']);}else{ echo '&nbsp;'; } ?></td>*/ ?>
<td align="center" valign="top" style="width:110px;font-size:15px;"><?php echo $resIvst['IB']; ?></td>
</tr>
<tr>
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;Children- Tution Fee restricted to max.of 2 children</td>
<?php /*<td align="center" valign="top" style="width:90px;font-size:15px;"><?php if($res2['CTF_Limit']>0){echo intval($res2['CTF_Limit']);}else{ echo '&nbsp;'; } ?></td>*/ ?>
<td align="center" valign="top" style="width:110px;font-size:15px;"><?php echo $resIvst['CTF']; ?></td>
</tr>
<tr>
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;Deposit in NHB</td>
<?php /*<td align="center" valign="top" style="width:90px;font-size:15px;"><?php if($res2['NHB_Limit']>0){echo intval($res2['NHB_Limit']);}else{ echo '&nbsp;'; } ?></td>*/ ?>
<td align="center" valign="top" style="width:110px;font-size:15px;"><?php echo $resIvst['NHB']; ?></td>
</tr>
<tr>
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;Deposit In NSC</td>
<?php /*<td align="center" valign="top" style="width:90px;font-size:15px;"><?php if($res2['NSC_Limit']>0){echo intval($res2['NSC_Limit']);}else{ echo '&nbsp;'; } ?></td>*/ ?>
<td align="center" valign="top" style="width:110px;font-size:15px;"><?php echo $resIvst['NSC']; ?></td>
</tr>
<tr>
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;Sukanya Samriddhi</td>
<td align="center" valign="top" style="width:110px;font-size:15px;"><?php echo $resIvst['SukS']; ?></td>
</tr>
<tr>
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;Others (please specify) Employee Provident Fund	</td>
<?php /*<td align="center" valign="top" style="width:90px;font-size:15px;"><?php if($res2['EPF_Limit']>0){echo intval($res2['EPF_Limit']);}else{ echo '&nbsp;'; } ?></td>*/ ?>
<td align="center" valign="top" style="width:110px;font-size:15px;"><?php echo $resIvst['EPF']; ?></td>
</tr>
<tr>
<td align="Center" valign="middle" style="width:100px;font-size:15px;">&nbsp;Sec. 80CCD(1B)</td>
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;NPS (National Pension Scheme)/ Atal Pension Yojna(APY)</td>
<td align="center" valign="top" style="width:90px;font-size:15px;"><?php if($res2['NPS_Limit']>0){echo intval($res2['NPS_Limit']);}else{ echo '&nbsp;'; } ?></td>
<td align="center" valign="top" style="width:110px;font-size:15px;"><?php echo $resIvst['NPS']; ?></td>
</tr>
<tr>
<td align="Center" valign="middle" style="width:100px;font-size:15px;">&nbsp;Sec. 80CCD(2)</td>
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;Corporate NPS Scheme</td>
<td align="center" valign="top" style="width:90px;font-size:15px;">10% Of Basic Salary</td>
<td align="center" valign="top" style="width:110px;font-size:15px;"><?php echo $resIvst['CorNPS']; ?></td>
</tr>




<tr>
<td align="Center" valign="middle" rowspan="5" style="width:100px;font-size:15px;">&nbsp;Previous Employment Salary (Salary earened from 01/04/12 till date of joining) </td>
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;If yes, Form 16 from previous employer or Form 12 B with tax computation statement</td>
<td align="center" valign="top" style="width:90px;font-size:15px;"><?php if($res2['Form16_Limit']>0){echo intval($res2['Form16_Limit']);}else{ echo '&nbsp;'; } ?></td>
<td align="center" valign="top" style="width:110px;font-size:15px;"><?php echo $resIvst['Form16']; ?></td>
</tr>
<tr>
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;Salary paid by the Previous Employer after Sec.10 Exemption	</td>
<td align="center" valign="top" style="width:90px;font-size:15px;"><?php if($res2['SPE_Limit']>0){echo intval($res2['SPE_Limit']);}else{ echo '&nbsp;'; } ?></td>
<td align="center" valign="top" style="width:110px;font-size:15px;"><?php echo $resIvst['SPE']; ?></td>
</tr>
<tr>
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;PROFESSIOAL TAX deducted by the Previous Employer </td>
<td align="center" valign="top" style="width:90px;font-size:15px;"><?php if($res2['PT_Limit']>0){echo intval($res2['PT_Limit']);}else{ echo '&nbsp;'; } ?></td>
<td align="center" valign="top" style="width:110px;font-size:15px;"><?php echo $resIvst['PT']; ?></td>
</tr>
<tr>
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;PROVIDENT FUND deducted by the Previous Employer </td>
<td align="center" valign="top" style="width:90px;font-size:15px;"><?php if($res2['PFD_Limit']>0){echo intval($res2['PFD_Limit']);}else{ echo '&nbsp;'; } ?></td>
<td align="center" valign="top" style="width:110px;font-size:15px;"><?php echo $resIvst['PFD']; ?></td>
</tr>
<tr>
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;INCOME TAX deducted by the Previous Employer</td>
<td align="center" valign="top" style="width:90px;font-size:15px;"><?php if($res2['IT_Limit']>0){echo intval($res2['IT_Limit']);}else{ echo '&nbsp;'; } ?></td>
<td align="center" valign="top" style="width:110px;font-size:15px;"><?php echo $resIvst['IT']; ?></td>
</tr>
<tr>
<td align="Center" valign="top" style="width:100px;font-size:15px;">&nbsp;Income other then Salary Income</td>
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;If yes, then Form 12C detailing other income is attached(only interest)</td>
<td align="center" valign="top" style="width:90px;font-size:15px;">&nbsp;</td>
<td align="center" valign="top" style="width:110px;font-size:15px;">&nbsp;</td>
</tr>
<tr>
<td align="Center" valign="middle" rowspan="2" style="width:100px;font-size:15px;">&nbsp;Deduction under Section 24 </td>
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;Interest on Housing Loan</td>
<td align="center" valign="top" style="width:90px;font-size:15px;"><?php if($res2['IHL_Limit']>0){echo intval($res2['IHL_Limit']);}else{ echo '&nbsp;'; } ?></td>
<td align="center" valign="top" style="width:110px;font-size:15px;"><?php echo $resIvst['IHL']; ?></td>
</tr>
<tr>
<td align="left" valign="top" style="width:550px;font-size:15px;">&nbsp;Interest if the loan is taken before 01/04/99</td>
<td align="center" valign="top" style="width:90px;font-size:15px;"><?php if($res2['IL_Limit']>0){echo intval($res2['IL_Limit']);}else{ echo '&nbsp;'; } ?></td>
<td align="center" valign="top" style="width:110px;font-size:15px;"><?php echo $resIvst['IL']; ?></td>
</tr>
<tr>
<td align="Center" valign="middle" style="width:100px;font-size:15px;">&nbsp;<b><u>Declaration:</u></b></td>
<td align="left" colspan="3" valign="top" style="width:550px;font-size:15px;">&nbsp;1) I hereby declare that the information given above is correct and true in all respects.</td>
</tr>
<tr>
<td align="Center" valign="middle" style="width:100px;font-size:15px;">&nbsp;</td>
<td align="left" colspan="3" valign="top" style="width:550px;font-size:15px;">&nbsp;2) I also undertake to indemnify the company for any loss/liability that may arise in the event of the above information being incorrect.</td>
</tr>
<td align="left" valign="top" colspan="2" style="width:550px;font-size:15px;">&nbsp;</td>
<td align="center" valign="bottom" rowspan="2" colspan="2" style="width:200px;font-size:15px;">&nbsp;
</td>
</tr>
<tr>
<td align="" valign="top" style="width:100px;font-size:15px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Date :</b> </td>
<td align="left" valign="top" style="width:550px;font-size:15px;"><?php echo date("d-m-Y", strtotime($resIvst['Inv_Date'])); ?></td>
</tr>
<tr>
<td align="" valign="top" style="width:100px;font-size:15px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Place : </b></td>
<td align="left" valign="top" style="width:550px;font-size:15px;"><?php echo $resIvst['Place']; ?></td>
<td align="center" valign="middle" colspan="2" valign="top" style="width:200px;font-size:15px;"><b>Signature</b></td>
</tr>
		</table>
	  </td>
	 </tr>	 
   </table>
 </td>
</tr> 
</form>
</table>

			
<?php //*************************************************************************************************************************************************** ?>

 </td>
</tr> 
</table>  
<?php } ?>
</body>
</html>

