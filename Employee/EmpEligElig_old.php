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
  <table width="100%" style="margin-top:0px;">
	 <tr>
	  <td valign="top">
	     <table border="0" style="width:100%;float:none;" cellpadding="0">
		   <td valign="top" align="center"> 	   
<?php //***************************************************************************** ?>	   
<table border="1">
<?php $SqlE=mysql_query("SELECT Fname,Sname,Lname,EmpCode,GradeId,DesigId,EmpAddBenifit_MediInsu_value,CompanyId FROM hrm_employee_general g INNER JOIN hrm_employee e ON g.EmployeeID=e.EmployeeID INNER JOIN hrm_employee_ctc c ON g.EmployeeID=c.EmployeeID WHERE g.EmployeeID=".$_REQUEST['id'], $con); $ResE=mysql_fetch_assoc($SqlE); 

$sqlGrade=mysql_query("select GradeValue from hrm_grade where GradeId=".$ResE['GradeId'], $con); $resGrade=mysql_fetch_assoc($sqlGrade);
      if($resGrade['GradeValue']!='')
	  {
      $sqlLod=mysql_query("select * from hrm_lodentitle where GradeValue='".$resGrade['GradeValue']."'", $con); $resLod=mysql_fetch_assoc($sqlLod); 
	  $sqlDaily=mysql_query("select * from hrm_dailyallow where GradeValue='".$resGrade['GradeValue']."'", $con); $resDaily=mysql_fetch_assoc($sqlDaily);
	  $sqlEnt=mysql_query("select * from hrm_travelentitle where GradeValue='".$resGrade['GradeValue']."'", $con); $resEnt=mysql_fetch_assoc($sqlEnt);
	  $sqlElig=mysql_query("select * from hrm_traveleligibility where GradeValue='".$resGrade['GradeValue']."'", $con); $resElig=mysql_fetch_assoc($sqlElig); 
	  } 	  
$SqlEligEmp = mysql_query("SELECT * FROM hrm_employee_eligibility WHERE EmployeeID=".$_REQUEST['id']." AND Status='A'", $con) or die(mysql_error());  $ResEligEmp=mysql_fetch_assoc($SqlEligEmp); 

$SqlCtc = mysql_query("SELECT ESCI FROM hrm_employee_ctc WHERE EmployeeID=".$_REQUEST['id']." AND Status='A'", $con); $ResCtc=mysql_fetch_assoc($SqlCtc);
?>
<?php $sqlD2=mysql_query("select DepartmentId from hrm_department where DepartmentName='Sales' AND DepartmentCode='SALES'", $con); $resD2=mysql_fetch_assoc($sqlD2);
      $sqlP2=mysql_query("select DepartmentId from hrm_department where DepartmentName='Production' AND DepartmentCode='PRODUCTION'", $con); $resP2=mysql_fetch_assoc($sqlP2);
?>
  <input type="hidden" id="D2" class="All_100" value="<?php echo $resD2['DepartmentId']; ?>"/>  
  <input type="hidden" id="P2" class="All_100" value="<?php echo $resP2['DepartmentId']; ?>"/>
  <input type="hidden" id="DeId" class="All_100" value="<?php echo $ResE['DepartmentId']; ?>"/> 
<?php $sqlDesig=mysql_query("select DesigName from hrm_designation where DesigId=".$ResE['DesigId'],$con); $resDesig=mysql_fetch_assoc($sqlDesig); ?>   
<tr><td align="center" style="font-size:18px;font-family:Times New Roman;color:#000000; border:hidden;"><b><?php echo $ResE['EmpCode'].' - '.$ResE['Fname'].' '.$ResE['Sname'].' '.$ResE['Lname']; ?><br>
<?php echo 'Grade:- <font color="#0080FF">'.$resGrade['GradeValue'].'</font>&nbsp;&nbsp;&nbsp;Designation:- <font color="#0080FF">'.ucwords(strtolower($resDesig['DesigName'])).'</font>';?></b></td></tr>
<tr>
 <td align="center" bgcolor="#7a6189">
   <table border="1" width="685" bgcolor="#ffffff">
		  <td style="width:685px;font-size:18px;font-family:Times New Roman;color:#000000;" align="center">
		  
		<?php /***** Start ******/ ?>			
			 <table style="width:685px;" border="0">
			  <tr><td colspan="2" style="width:685px;"><b>*.&nbsp;&nbsp;</b>&nbsp;Lodging :&nbsp;&nbsp; Actual with upper limit Per day as mentioned in the table.</td></tr>
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
			    <td style="width:485px;font-size:16px;height:22px;" align="left"><b>*.&nbsp;&nbsp;</b>&nbsp;DA Outside H.Q. :</td>
				<td style="width:200px;">: <?php if($ResEligEmp['DA_Outside_Hq']!='' AND $ResEligEmp['DA_Outside_Hq']!=' '){echo $ResEligEmp['DA_Outside_Hq'].'&nbsp;&nbsp;Per day';}else{echo 'NA';} ?></td>
			  </tr>
			   <tr>
			    <td style="width:485px;font-size:16px;height:22px;" align="left"><b>*.&nbsp;&nbsp;</b>&nbsp;DA @ H.Q. <?php if($ResE['DepartmentId']==3){ echo 'In case of day tour involving more than 40 kms. travel'; }elseif($ResE['DepartmentId']==4){ echo 'If the work needs touring for more than 6 hours in a day & as per the applicability of the seasons'; }elseif($ResE['DepartmentId']==6){ echo '(Only For Sales Staff)'; }elseif($ResE['DepartmentId']==24 OR $ResE['DepartmentId']==25){ echo 'If the work needs touring for more than 6 hours in a day'; } ?> :</td>
				<td style="width:200px;">: <?php if($ResEligEmp['DA_Inside_Hq']!='' AND $ResEligEmp['DA_Inside_Hq']!=' '){ echo $ResEligEmp['DA_Inside_Hq'];}else{echo 'NA';} //.'&nbsp;&nbsp;Per day' ?></td>
			  </tr>
<?php //if($ResE['DepartmentId']!=2){ ?>
			  <tr>
			    <td style="width:485px;font-size:16px;height:22px;" align="left"><b>*.&nbsp;&nbsp;</b>&nbsp;Travel Eligibility <font size="4"><b>*</b></font> (For Official Purpose Only)</td>
				<td style="width:200px;">&nbsp;</td>
			  </tr>
			  
			  <?php if($ResEligEmp['Travel_TwoWeeKM']!='' && $ResEligEmp['Travel_TwoWeeKM']!='NA'){ ?>
			  <tr>
			    <td style="width:485px;font-size:16px;height:22px;" align="left">&nbsp;&nbsp;* 2 Wheeler (<?php if($DepartmentId==2){ echo 'As per R&D vehicle policy';}else{ ?><?php echo '<b>Rs&nbsp;'.$ResEligEmp['Travel_TwoWeeKM'].'/KM&nbsp;-&nbsp;';?> <?php if($ResE['DepartmentId']==2 OR ($ResE['DepartmentId']==5 AND ($ResE['GradeId']=='70' OR $ResE['GradeId']=='71')) OR $ResE['GradeId']>72){echo 'Min';}else{echo 'Max'; echo ':&nbsp;'.$ResEligEmp['Travel_TwoWeeLimitPerDay'].'/Day&nbsp;-'; }?> <?php echo '&nbsp;'.$ResEligEmp['Travel_TwoWeeLimitPerMonth'].'/Month</b>'; ?><?php } ?>)</td>
				<td style="width:200px;">: <?php if($ResEligEmp['Travel_TwoWeeKM']!=''){echo 'Applicable';} else {echo 'NA';}?></td>
			  </tr>
			  <?php } ?>
			  
			  <tr>
  <td style="width:485px;font-size:16px;height:22px;" align="left">&nbsp;&nbsp;* 4 Wheeler (<?php if($DepartmentId==2){ echo 'As per R&D vehicle policy';}else{ ?><?php if($ResEligEmp['Travel_FourWeeKM']!='' AND $ResEligEmp['Travel_FourWeeKM']!='NA'){echo '<b>Rs&nbsp;'.$ResEligEmp['Travel_FourWeeKM'].'/KM&nbsp;-&nbsp;';?> <?php if($ResE['DepartmentId']==2 OR ($ResE['DepartmentId']==5 AND ($ResE['GradeId']=='70' OR $ResE['GradeId']=='71')) OR $ResE['GradeId']>72){echo 'Min';}else{echo 'Max';}?> <?php echo ':&nbsp;'; if($ResEligEmp['Travel_FourWeeLimitPerMonth']>0){$PerAnnum=$ResEligEmp['Travel_FourWeeLimitPerMonth']*12;}elseif($ResEligEmp['Travel_FourWeeLimitPerMonth']=='Actual'){$PerAnnum='Actual';}elseif($ResEligEmp['Travel_FourWeeLimitPerMonth']==''){$PerAnnum='';}echo '<b>'.$ResEligEmp['Travel_FourWeeLimitPerMonth'].'KM/Month'; if($_REQUEST['G']!='J4'){ if($ResE['DepartmentId']==2 OR ($ResE['DepartmentId']==5 AND ($ResE['GradeId']=='70' OR $ResE['GradeId']=='71')) OR $ResE['GradeId']>72){echo '';}else{echo '&nbsp;-&nbsp;'.$PerAnnum.'KM/Annum';} } } ?><?php } ?>)</td>
  <td style="width:200px;"> : <?php if($ResEligEmp['Travel_FourWeeKM']!='' AND $ResEligEmp['Travel_FourWeeKM']!='0' AND $ResEligEmp['Travel_FourWeeKM']!='NA'){echo 'Applicable';} else {echo '&nbsp;NA';}?></td>  
 </tr>
<?php //} ?>			  
			   <tr>
			    <td style="width:485px;font-size:16px;height:22px;" align="left"><b>*.&nbsp;&nbsp;</b>&nbsp;Mode of Travel outside HQ</td>
				<td style="width:200px;">: <?php if($ResEligEmp['Mode_Travel_Outside_Hq']!=''){echo $ResEligEmp['Mode_Travel_Outside_Hq'];}else{echo 'NA';}?></td>
			  </tr>
			   <tr>
			    <td style="width:485px;font-size:16px;height:22px;" align="left"><b>*.&nbsp;&nbsp;</b>&nbsp;Travel Class</td>
				<td style="width:200px;">: <?php if($ResEligEmp['Mode_Travel_Outside_Hq']!=''){echo $ResEligEmp['TravelClass_Outside_Hq'];}else{echo 'NA';}?></td>
			  </tr>
			   <tr>
			    <td style="width:485px;font-size:16px;height:22px;" align="left"><b>*.&nbsp;&nbsp;</b>&nbsp;Mobile expenses Reimbursement :</td>
				<td style="width:200px;">: <?php if($ResEligEmp['Mobile_Exp_Rem_Rs']!=''){ if($ResEligEmp['Mobile_Exp_Rem_Rs']!='Actual'){echo 'Rs.&nbsp;';} echo $ResEligEmp['Mobile_Exp_Rem_Rs'].'/- '; if($ResEligEmp['Prd']=='Mnt'){echo 'Monthly';}elseif($ResEligEmp['Prd']=='Qtr'){echo 'Quarter';}elseif($ResEligEmp['Prd']=='1/2 Yearly'){echo '1/2 Yearly';}elseif($ResEligEmp['Prd']=='Yearly'){echo 'Yearly';} }else{echo 'NA';}?></td>
			  </tr>
			  
			  
<?php $sE=mysql_query("select CompanyId,DepartmentId,GradeId from hrm_employee e inner join hrm_employee_general g on e.EmployeeID=g.EmployeeID where e.EmployeeID=".$EmployeeId,$con); $rE=mysql_fetch_assoc($sE);
 $sqlGp=mysql_query("select Mobile,Mobile_WithGPS from hrm_master_eligibility where DepartmentId=".$rE['DepartmentId']." AND CompanyId=".$rE['CompanyId']." AND GradeId=".$rE['GradeId']."",$con); $resGp=mysql_fetch_assoc($sqlGp); ?>				  
			   <tr>
			    <td style="width:485px;font-size:16px;height:22px;" align="left"><b>*.&nbsp;&nbsp;</b>&nbsp;Mobile Handset Eligibility (<?php if($ResEligEmp['GPSSet']=='Y'){echo 'Once in 2 yrs';}elseif($resGp['Mobile']!=$resGp['Mobile_WithGPS'] AND $resGp['Mobile_WithGPS']==$ResEligEmp['Mobile_Hand_Elig_Rs']){echo 'Once in 2 yrs';}else{echo 'Once in 3 yrs';}?>)</td>
								
				<td style="width:200px;">: <?php if($ResEligEmp['Mobile_Company_Hand']=='Y'){ echo 'Company Handset';} elseif($ResEligEmp['Mobile_Company_Hand']=='N' AND $ResEligEmp['Mobile_Hand_Elig_Rs']!=''){ if($ResEligEmp['Mobile_Hand_Elig_Rs']!='Actual' AND $ResEligEmp['Mobile_Hand_Elig_Rs']!='Actual/ blackberry') {echo 'Rs.&nbsp;';} echo $ResEligEmp['Mobile_Hand_Elig_Rs']; if($ResEligEmp['Mobile_Hand_Elig_Rs']!='Actual' AND $ResEligEmp['Mobile_Hand_Elig_Rs']!='Actual/ blackberry') {echo '/-';}}else{echo 'NA';}?></td>
			  </tr>
			  
			  <?php /*
			  <tr>
			    <td style="width:485px;font-size:16px;height:22px;" align="left"><b>*.</b>&nbsp;Misc. expenses(like stationery/photocopy/fax/e-mail/etc) </td>
				<td style="width:200px;">: <?php if($ResEligEmp['Misc_Expenses']=='Y'){echo 'Actual';}else{echo 'NA';}?></td>
			  </tr>
			  */ ?>
			  
<?php if($ResE['ESCI']>0){ echo ''; } else {?>			  
			  <tr>
			    <td style="width:485px;font-size:16px;height:22px;" align="left"><b>*.</b>&nbsp;Health Insurance(Premium Paid by Company)  </td>
				<td style="width:200px;">: <?php if($ResEligEmp['Health_Insurance']>0 AND $ResEligEmp['Health_Insurance']!=''){ if($ResEligEmp['Health_Insurance']==100000.00){echo '1 Lakhs';}elseif($ResEligEmp['Health_Insurance']==200000.00){echo '2 Lakhs';}elseif($ResEligEmp['Health_Insurance']==300000.00){echo '3 Lakhs';} elseif($ResEligEmp['Health_Insurance']==500000.00){echo '5 Lakhs';} elseif($ResEligEmp['Health_Insurance']==500000.00){echo '5 Lakhs';} elseif($ResEligEmp['Health_Insurance']==600000.00){echo '6 Lakhs';} elseif($ResEligEmp['Health_Insurance']==800000.00){echo '8 Lakhs';} elseif($ResEligEmp['Health_Insurance']==900000.00){echo '9 Lakhs';} elseif($ResEligEmp['Health_Insurance']==1000000.00){echo '10 Lakhs';} } else {echo 'NA';}?></td>
			  </tr>
<?php } ?>			

<?php if($ResE['CompanyId']==1) { ?>  
              <tr>
			    <td style="width:485px;font-size:16px;height:22px;" align="left"><b>*.</b>&nbsp;Group Personal Accident Insurance </td>
				<td style="width:200px;">: 
				    <?php
                    if($ResE['GradeId']==61 || $ResE['GradeId']==62){
                        echo '05 Lakhs';
                    }elseif($ResE['GradeId']==63 || $ResE['GradeId']==64 || $ResE['GradeId']==65 || $ResE['GradeId']==66){
                        echo '10 Lakhs';
                    }elseif($ResE['GradeId']==67 || $ResE['GradeId']==68 || $ResE['GradeId']==69 || $ResE['GradeId']==70|| $ResE['GradeId']==71){
                        echo '25 Lakhs';
                    }elseif($ResE['GradeId']==72 || $ResE['GradeId']==73 || $ResE['GradeId']==74 || $ResE['GradeId']==75|| $ResE['GradeId']==76){
                        echo '50 Lakhs';
                    }
                    ?>
                </td>
			  </tr>
<?php } ?>
<?php if($ResE['CompanyId']==3) { ?>  
              <tr>
			    <td style="width:485px;font-size:16px;height:22px;" align="left"><b>*.</b>&nbsp;Group Personal Accident Insurance </td>
				<td style="width:200px;">: 
				    <?php
                    if($ResE['GradeId']==31){
                        echo '05 Lakhs';
                    }elseif($ResE['GradeId']=32){
                        echo '10 Lakhs';
                    }elseif($ResE['GradeId']==33 || $ResE['GradeId']==34){
                        echo '25 Lakhs';
                    }elseif($ResE['GradeId']==35){
                        echo '50 Lakhs';
                    }
                    ?>
                </td>
			  </tr>
<?php } ?>


               <?php if($ResEligEmp['HelthCheck']=='Y'){ ?>
              <tr>
			   <td style="width:485px;font-size:16px;height:22px;" align="left"><b><?php if($ResE['ESCI']>0){ echo '*'; } else {echo '*';} ?>.</b>&nbsp;Executive Health Check-up (Once in 2 yrs)</td>
				<td style="width:200px;">: <?php if($ResEligEmp['HelthCheck']=='Y'){echo $resDaily['HelthChekUp'];} ?></td>
			  </tr>
			  <?php } ?>
			  
			  
<?php $SeG=mysql_query("select GradeId from hrm_employee_general where EmployeeID=".$EmployeeId,$con); 
      $ReG=mysql_fetch_assoc($SeG); $GrdId=$GradeId;
?>
<?php $vehiclaCose='';
if($ResEligEmp['VehiclePolicy']>0){ 
$sqpf=mysql_query("select * from hrm_master_eligibility_mapping_tblfield where PolicyId=".$ResEligEmp['VehiclePolicy']." and FieldId=2 AND sts=1 AND ComId=".$_REQUEST['C']); $rowpf=mysql_num_rows($sqpf);
if($rowpf>0)
{
 $respf=mysql_fetch_assoc($sqpf);
 $sqpfv=mysql_query("select Fn2 from hrm_master_eligibility_policy_tbl".$ResEligEmp['VehiclePolicy']." where GradeId=".$GrdId." ",$con); $rowqpfv=mysql_num_rows($sqpfv);
 if($rowqpfv>0){ $resqpfv=mysql_fetch_assoc($sqpfv); $vehiclaCose=$resqpfv['Fn2']; }
 else{ $vehiclaCose=0; }
}
else
{
 $sqpf2=mysql_query("select * from hrm_master_eligibility_mapping_tblfield where PolicyId=".$ResEligEmp['VehiclePolicy']." and FieldId=14 AND sts=1 AND ComId=".$_REQUEST['C']); $rowpf2=mysql_num_rows($sqpf2);
 if($rowpf2>0)
 {
  $respf2=mysql_fetch_assoc($sqpf2);
  $sqpfv2=mysql_query("select Fn14 from hrm_master_eligibility_policy_tbl".$ResEligEmp['VehiclePolicy']." where GradeId=".$GrdId." ",$con); $rowqpfv2=mysql_num_rows($sqpfv2);
  if($rowqpfv2>0){ $resqpfv2=mysql_fetch_assoc($sqpfv2); $vehiclaCose=$resqpfv2['Fn2']; }
  else{ $vehiclaCose=0; }
 }
 else{ $vehiclaCose=0; }
 
}

?>			  <?php if($vehiclaCose!='' AND $vehiclaCose!=0){ ?> 
	          <tr>
			   <td style="width:485px;font-size:16px;height:22px;" align="left">&nbsp;Vehicle entitlement value (Applicability as per vehicle policy)</td>
				<td style="width:200px;">: <?php echo $vehiclaCose; ?></td>
			  </tr>
			  <?php } ?>
			  		  
<?php } //if($ResEligEmp['VehiclePolicy']>0)?>			  
			  
			  <?php /*
			  <tr>
			   <td style="width:485px;font-size:16px;height:22px;" align="left"><b><?php if($ResE['ESCI']>0){ echo '*'; } else {echo '*';} ?>.</b>&nbsp;Bonus/Exgretia(yearly)</td>
				<td style="width:200px;">: As Per Law</td>
			  </tr>
			  */ ?>
			  <tr>
			    <td style="width:485px;font-size:16px;height:22px;" align="left"><b><?php if($ResE['ESCI']>0){ echo '*'; } else {echo '*';} ?>.</b>&nbsp;Gratuity </td>
				<td style="width:200px;">: As Per Law</td>
			  </tr>
			  <tr>
			    <td style="width:485px;font-size:16px;height:22px;" align="left"><b><?php if($ResE['ESCI']>0){ echo '*'; } else {echo '*';} ?>.</b>&nbsp;Deduction</td>
				<td style="width:200px;">&nbsp;</td>
			  </tr>
			  <tr>
			   <td colspan="2" style="width:685px;">
			    <table>
				 <tr>
				  <td style="width:285px;font-size:16px;height:22px;" align="left">&nbsp;&nbsp;&nbsp;&nbsp;* Deduction - As Per Law</td>
				  <td style="width:400px;">: Provident Fund/ ESIC/ Tax on Employment/ Income Tax</td>
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
			 </table>
<?php /***** Close ******/ ?>			

</td>
</tr>
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