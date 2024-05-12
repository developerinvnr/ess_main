<?php require_once('config/config.php'); ?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
</head>
<script language="javascript" type="text/javascript">
function AnnxAClickPrint(EI,CI)
{window.open("VeiwReStrAnnxAPrint.php?action=ReStrAnnxA&e="+EI+"&c="+CI,"REStr","scrollbars=yes,resizable=no,width=820,height=750,menubar=no,location=no,directories=no");}
</script>
<body>
<table>
<tr><td style="font-family:Times New Roman;color:#000000;font-size:13px;width:785;" align="right">
<a href="#" onClick="AnnxAClickPrint(<?php echo $_REQUEST['e'].','.$_REQUEST['c']; ?>)" style="text-decoration:none;"><font id="FonPC" style="color:#000099;">Print</font></a>&nbsp;&nbsp;</td></tr>
<?php if($_REQUEST['action']=='ReStrAnnxA') { $SqlE=mysql_query("SELECT hrm_employee.*,Gender,DR,Married FROM hrm_employee INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID WHERE hrm_employee.EmployeeID=".$_REQUEST['e'], $con); $ResE=mysql_fetch_assoc($SqlE); 
if($ResE['DR']=='Y'){$M='Dr.';} elseif($ResE['Gender']=='M'){$M='Mr.';} elseif($ResE['Gender']=='F'){$M='Ms.';} 
$NameE=$M.' '.$ResE['Fname'].'&nbsp;'.$ResE['Sname'].'&nbsp;'.$ResE['Lname'];
 			
$sqlDP = mysql_query("SELECT * from hrm_restructuring where Year=2014 AND EmployeeID=".$_REQUEST['e'], $con); $resDP = mysql_fetch_assoc($sqlDP); 
$sqlGrade=mysql_query("select GradeValue from hrm_grade where GradeId=".$resDP['New_GradeId'], $con); $resGrade=mysql_fetch_assoc($sqlGrade);
      if($resGrade['GradeValue']!='')
	  {
      $sqlLod=mysql_query("select * from hrm_lodentitle where GradeValue='".$resGrade['GradeValue']."'", $con); $resLod=mysql_fetch_assoc($sqlLod); 
	  $sqlDaily=mysql_query("select * from hrm_dailyallow where GradeValue='".$resGrade['GradeValue']."'", $con); $resDaily=mysql_fetch_assoc($sqlDaily);
	  $sqlEnt=mysql_query("select * from hrm_travelentitle where GradeValue='".$resGrade['GradeValue']."'", $con); $resEnt=mysql_fetch_assoc($sqlEnt);
	  $sqlElig=mysql_query("select * from hrm_traveleligibility where GradeValue='".$resGrade['GradeValue']."'", $con); $resElig=mysql_fetch_assoc($sqlElig); 
	  } 	  
$SqlEligEmp = mysql_query("SELECT * FROM hrm_employee_eligibility WHERE EmployeeID=".$_REQUEST['e']." AND Status='A'", $con) or die(mysql_error());  
$ResEligEmp = mysql_fetch_assoc($SqlEligEmp); 
?>
<?php $sqlD2=mysql_query("select DepartmentId from hrm_department where DepartmentName='Sales' AND DepartmentCode='SALES'", $con); $resD2=mysql_fetch_assoc($sqlD2);
      $sqlP2=mysql_query("select DepartmentId from hrm_department where DepartmentName='Production' AND DepartmentCode='PRODUCTION'", $con); $resP2=mysql_fetch_assoc($sqlP2);
?>
  <input type="hidden" id="D2" class="All_100" value="<?php echo $resD2['DepartmentId']; ?>"/>  
  <input type="hidden" id="P2" class="All_100" value="<?php echo $resP2['DepartmentId']; ?>"/>
  <input type="hidden" id="DeId" class="All_100" value="<?php echo $ResE['DepartmentId']; ?>"/> 			
<tr>
 <td align="center">
   <table border="0" width="790">
	  <td style="width:785;" align="center">
	    <table border="0" style="width:785;">
		  <tr>
		    <td colspan="4" align="center" valign="top" style="font-size:20px;font-family:Times New Roman;font-weight:bold;"><u>Entitlements(Annexure-A)</u></td>
		  </tr>
		  <tr><td style="height:50px;">&nbsp;</td></tr>
		  <tr>
		    <td style="width:50px;">&nbsp;</td><td style="width:485px;font-size:18px;font-weight:bold;"><?php echo $NameE; ?></td>
			<td style="width:200px;font-size:18px;font-weight:bold;" align="right">Date:&nbsp;<b><?php echo date("d").'<sup>'.date("S").'</sup>'.date("M Y"); ?></b></td>
			<td style="width:50px;">&nbsp;</td>
		  </tr>
		  <tr>
		    <td style="width:50px;">&nbsp;</td>
		    <td colspan="3" style="width:685px;font-size:18px;font-weight:bold;">EC No:&nbsp;<?php echo $ResE['EmpCode'];  ?></td>
		  </tr>
		  <tr>
		    <td style="width:50px;">&nbsp;</td>
		    <td colspan="3" style="width:685px;font-size:18px;font-weight:bold;">Grade : <?php echo $resGrade['GradeValue']; ?></td>
		  </tr>
		  <tr><td style="height:50px;">&nbsp;</td></tr>
		  <tr>
		    <td style="width:50px;">&nbsp;</td>
		    <td colspan="2" style="width:685px;">
<?php /***** Start ******/ ?>			
			 <table style="width:685px;" border="0">
			  <tr><td colspan="2" style="width:685px;"><b>1.&nbsp;&nbsp;</b>&nbsp;Lodging :&nbsp;&nbsp; Actual with upper limit Per day as mentioned in the table.</td></tr>
			  <tr>
			   <td style="width:685px;" colspan="2">
			    <table border="1" style="width:685px;">
				<tr>
				<td style="width:175px;font-size:16px;" align="">&nbsp;</td>
				<td style="width:170px;font-size:16px;" align="center">Category A</td>
				<td style="width:170px;font-size:16px;" align="center">Category B</td>
				<td style="width:170px;font-size:16px;" align="center">Category C</td>
				</tr>
                <tr>
                <td style="width:175px;font-size:16px;" align="center">&nbsp;<b>Rs.</b></td>
                 <td style="width:170px;" align="center">
  				<?php if($ResEligEmp['Lodging_CategoryA']>0){echo intval($ResEligEmp['Lodging_CategoryA']);}elseif($ResEligEmp['Lodging_CategoryA']!=''){echo $ResEligEmp['Lodging_CategoryA'];} ?></td>
  				<td style="width:170px;" align="center">
  				<?php if($ResEligEmp['Lodging_CategoryB']>0){echo intval($ResEligEmp['Lodging_CategoryB']);}elseif($ResEligEmp['Lodging_CategoryB']!=''){echo $ResEligEmp['Lodging_CategoryA'];} ?></td>
 			    <td style="width:170px;" align="center">
  				<?php if($ResEligEmp['Lodging_CategoryC']>0){echo intval($ResEligEmp['Lodging_CategoryC']);}elseif($ResEligEmp['Lodging_CategoryC']!=''){echo $ResEligEmp['Lodging_CategoryC'];} ?></td>
				</tr>
				</table>
			   </td>
			  </tr>
			  <tr>
			    <td style="width:485px;font-size:16px;height:22px;" align="left"><b>2.&nbsp;&nbsp;</b>&nbsp;DA Outside H.Q. :</td>
				<td style="width:200px;">: <?php if($ResEligEmp['DA_Outside_Hq']!='' AND $ResEligEmp['DA_Outside_Hq']=='Actual') {echo $ResEligEmp['DA_Outside_Hq'].'&nbsp;&nbsp;Per day';}elseif($ResEligEmp['DA_Outside_Hq']!='' AND $ResEligEmp['DA_Outside_Hq']!='Actual') {echo 'Rs.&nbsp;'.$ResEligEmp['DA_Outside_Hq'].'&nbsp;&nbsp;/-Per day'; }else{echo 'NA';} ?></td>
			  </tr>
			   <tr>
			    <td style="width:485px;font-size:16px;height:22px;" align="left"><b>3.&nbsp;&nbsp;</b>&nbsp;DA @ H.Q.(Only For Sales Staff) :</td>
				<td style="width:200px;">: <?php if($ResEligEmp['DA_Outside_HqSal']!='' AND $ResEligEmp['DA_Outside_HqSal']=='Actual'){ echo $ResEligEmp['DA_Outside_HqSal'].'&nbsp;&nbsp;Per day';} elseif($ResEligEmp['DA_Outside_HqSal']!='' AND $ResEligEmp['DA_Outside_HqSal']!='Actual'){ echo 'Rs.&nbsp;'.$ResEligEmp['DA_Outside_HqSal'].'&nbsp;&nbsp;/-Per day';} else {echo 'NA';} ?></td>
			  </tr>
			  <tr>
			    <td style="width:485px;font-size:16px;height:22px;" align="left"><b>4.&nbsp;&nbsp;</b>&nbsp;Travel Eligibility <font size="4"><b>*</b></font> (For Official Purpose Only)</td>
				<td style="width:200px;">&nbsp;</td>
			  </tr>
			  <tr>
			    <td style="width:485px;font-size:16px;height:22px;" align="left">&nbsp;&nbsp;a) 2 Wheeler (<?php if($ResEligEmp['Travel_TwoWeeKM']!='' AND $ResEligEmp['Travel_TwoWeeKM']!='NA' AND $ResEligEmp['Travel_TwoWeeKM']!='0'){ echo '<b>Rs&nbsp;'.$ResEligEmp['Travel_TwoWeeKM'].'/KM&nbsp;-&nbsp;Maxi:&nbsp;'.$ResEligEmp['Travel_TwoWeeLimitPerDay'].'/Day&nbsp;-&nbsp;'.$ResEligEmp['Travel_TwoWeeLimitPerMonth'].'/Month</b>'; } ?>)</td>
				<td style="width:200px;">: <?php if($ResEligEmp['Travel_TwoWeeKM']!='' AND $ResEligEmp['Travel_TwoWeeKM']!='NA' AND $ResEligEmp['Travel_TwoWeeKM']!='0'){echo 'Applicable';} else {echo 'NA';}?></td>
			  </tr>
			   <tr>
			    <td style="width:485px;font-size:16px;height:22px;" align="left">&nbsp;&nbsp;a) 4 Wheeler (<?php if($ResEligEmp['Travel_FourWeeKM']!='' AND $ResEligEmp['Travel_FourWeeKM']!='NA' AND $ResEligEmp['Travel_FourWeeLimitPerMonth']!=''){ if($ResEligEmp['Travel_FourWeeLimitPerMonth']>0){$PerA=$ResEligEmp['Travel_FourWeeLimitPerMonth']*12; $PerAnnum=$PerA.'&nbsp;KM PA';}elseif($ResEligEmp['Travel_FourWeeLimitPerMonth']=='Actual'){$PerAnnum='Actual&nbsp;KM PA';} else{$PerAnnum='';} echo '<b>Rs&nbsp;'.$ResEligEmp['Travel_FourWeeKM'].'/KM&nbsp;-&nbspMaxi:&nbsp<b>'.$ResEligEmp['Travel_FourWeeLimitPerMonth'].'/Month&nbsp;-&nbsp;'.$PerAnnum;} ?>)</td>
				<td style="width:200px;">: <?php if($ResEligEmp['Travel_FourWeeKM']!='' AND $ResEligEmp['Travel_FourWeeKM']!='NA' AND $ResEligEmp['Travel_FourWeeLimitPerMonth']!='' AND $ResEligEmp['Travel_FourWeeLimitPerMonth']!='NA'){echo 'Applicable';} else {echo 'NA';}?></td>
			  </tr>
			   <tr>
			    <td style="width:485px;font-size:16px;height:22px;" align="left"><b>5.&nbsp;&nbsp;</b>&nbsp;Mode of Travel outside HQ</td>
				<td style="width:200px;">: <?php if($ResEligEmp['Mode_Travel_Outside_Hq']!=''){echo $ResEligEmp['Mode_Travel_Outside_Hq'];}else{echo 'NA';}?></td>
			  </tr>
			   <tr>
			    <td style="width:485px;font-size:16px;height:22px;" align="left"><b>6.&nbsp;&nbsp;</b>&nbsp;Travel Class</td>
				<td style="width:200px;">: <?php if($ResEligEmp['Mode_Travel_Outside_Hq']!=''){echo $ResEligEmp['TravelClass_Outside_Hq'];}else{echo 'NA';}?></td>
			  </tr>
			   <tr>
			    <td style="width:485px;font-size:16px;height:22px;" align="left"><b>7.&nbsp;&nbsp;</b>&nbsp;Mobile expenses Reimbursement :</td>
				<td style="width:200px;">: <?php if($ResEligEmp['Mobile_Exp_Rem_Rs']!=''){ if($ResEligEmp['Mobile_Exp_Rem_Rs']!='Actual'){echo 'Rs.&nbsp;';} echo $ResEligEmp['Mobile_Exp_Rem_Rs'].'/-Month';}else{echo 'NA';}?></td>
			  </tr>
			   <tr>
			    <td style="width:485px;font-size:16px;height:22px;" align="left"><b>8.&nbsp;&nbsp;</b>&nbsp;Mobile Handset Eligibility </td>
				<td style="width:200px;">: <?php if($ResEligEmp['Mobile_Company_Hand']=='Y'){ echo 'Company Handset';} elseif($ResEligEmp['Mobile_Company_Hand']=='N' AND $ResEligEmp['Mobile_Hand_Elig_Rs']!=''){ if($ResEligEmp['Mobile_Hand_Elig_Rs']!='Actual' AND $ResEligEmp['Mobile_Hand_Elig_Rs']!='Actual/ blackberry') {echo 'Rs.&nbsp;';} echo $ResEligEmp['Mobile_Hand_Elig_Rs']; if($ResEligEmp['Mobile_Hand_Elig_Rs']!='Actual' AND $ResEligEmp['Mobile_Hand_Elig_Rs']!='Actual/ blackberry') {echo '/-';}}else{echo 'NA';}?></td>
			  </tr>
			  <tr>
			    <td style="width:485px;font-size:16px;height:22px;" align="left"><b>9.&nbsp;&nbsp;</b>&nbsp;Misc. expenses(like stationery/photocopy/fax/e-mail/etc) </td>
				<td style="width:200px;">: <?php if($ResEligEmp['Misc_Expenses']=='Y'){echo 'Actual';}else{echo 'NA';}?></td>
			  </tr>
			  <tr>
			    <td style="width:485px;font-size:16px;height:22px;" align="left"><b>10.</b>&nbsp;Health Insurance(Premium Paid by Company)  </td>
				<td style="width:200px;">: <?php if($ResEligEmp['Health_Insurance']>0 AND $ResEligEmp['Health_Insurance']!=''){ if($ResEligEmp['Health_Insurance']==100000.00){echo '1 Lakhs';}elseif($ResEligEmp['Health_Insurance']==200000.00){echo '2 Lakhs';}elseif($ResEligEmp['Health_Insurance']==300000.00){echo '3 Lakhs';} elseif($ResEligEmp['Health_Insurance']==500000.00){echo '5 Lakhs';} elseif($ResEligEmp['Health_Insurance']==500000.00){echo '5 Lakhs';} elseif($ResEligEmp['Health_Insurance']==600000.00){echo '6 Lakhs';} elseif($ResEligEmp['Health_Insurance']==800000.00){echo '8 Lakhs';} elseif($ResEligEmp['Health_Insurance']==900000.00){echo '9 Lakhs';} elseif($ResEligEmp['Health_Insurance']==1000000.00){echo '10 Lakhs';} } else {echo 'NA';}?></td>
			  </tr>
			  <tr>
			    <td style="width:485px;font-size:16px;height:22px;" align="left"><b>11.</b>&nbsp;Bonus/Exgretia(yearly)</td>
				<td style="width:200px;">: As Per Law</td>
			  </tr>
			  <tr>
			    <td style="width:485px;font-size:16px;height:22px;" align="left"><b>12.</b>&nbsp;Gratuity </td>
				<td style="width:200px;">: As Per Law</td>
			  </tr>
			  <tr>
			    <td style="width:485px;font-size:16px;height:22px;" align="left"><b>13.</b>&nbsp;Deduction</td>
				<td style="width:200px;">&nbsp;</td>
			  </tr>
			  <tr>
			   <td colspan="2" style="width:685px;">
			    <table>
				 <tr>
				  <td style="width:285px;font-size:16px;height:22px;" align="left">&nbsp;&nbsp;&nbsp;&nbsp;* Deduction - As Per Law</td>
				  <td style="width:400px;">: Provident Fund/ Tax on Employment/ Income Tax</td>
				 </tr>
				 <tr>
				  <td style="width:285px;font-size:16px;height:22px;" align="left">&nbsp;&nbsp;&nbsp;&nbsp;* Deduction - Actual</td>
				  <td style="width:400px;">: Any dues to company(if any)/ Advances</td>
				 </tr>
				</table>
			   </td>
			  </tr>
			  <tr><td colspan="2" style="width:685px;background-color:#000000;height:5px;"></td></tr>
			  <tr><td colspan="2" style="width:685px;"><b style="font-size:18px;text-align:justify;">*</b>&nbsp;The expenses claims on 2 wheeler/4 wheeler is subject to the employee having a valid driving license. </td></tr>
			  <tr><td colspan="2" style="width:685px;">&nbsp;&nbsp;&nbsp;The photocopy should be provided to HR.</td></tr>
			  <tr><td>&nbsp;</td></tr>
			  <tr><td>&nbsp;</td></tr>
			  <tr><td>&nbsp;</td></tr>
			  <tr><td>&nbsp;</td></tr>
			  <tr><td>&nbsp;</td></tr>
			  <tr><td style="width:343px;font-size:18px;font-weight:bold;">Human Resource</td></tr>
			  
			 </table>
<?php /***** Close ******/ ?>			 
			</td>
			<td style="width:50px;">&nbsp;</td>
		  </tr>
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

