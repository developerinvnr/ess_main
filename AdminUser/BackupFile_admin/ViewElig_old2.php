<style>
.tdd1{width:550px;font-size:16px;height:16px;text-align:left;}
.tdd2{width:205px;font-size:16px;text-align:left;}
</style>
<table style="border-style:outset;border-color:#75A633;" border="0" cellpadding="0" cellspacing="8">
<tr>
 <td style="width:5px;" align="center"></td>
 <td>
 <table border="0">
 <tr>
  <td colspan="3" style="width:680px;font-size:16px;height:18px;" align="left"><b>*</b>&nbsp;&nbsp;Lodging :&nbsp;&nbsp; Actual with upper limit Per day as mentioned in the table.</td>
 </tr>
 </table>
 </td>
</tr>
<tr>
 <td style="width:5px;" align="center">&nbsp;</td>
 <td>
 <table border="1">
 <tr>
  <td style="width:150px;font-size:16px;" align="">&nbsp;</td>
  <td style="width:150px;font-size:16px;" align="center">Category A</td>
  <td style="width:150px;font-size:16px;" align="center">Category B</td>
  <td style="width:150px;font-size:16px;" align="center">Category C</td>
 </tr>
 <tr>
  <td style="width:150px;font-size:16px;" align="center">&nbsp;<b>Rs.</b></td>
  <td style="width:155px;" align="center">
  <?php if($ResEligEmp['Lodging_CategoryA']>0){echo intval($ResEligEmp['Lodging_CategoryA']);}elseif($ResEligEmp['Lodging_CategoryA']=='Actual'){echo 'Actual';}  ?></td>
  <td style="width:155px;" align="center">
  <?php if($ResEligEmp['Lodging_CategoryB']>0){echo intval($ResEligEmp['Lodging_CategoryB']);}elseif($ResEligEmp['Lodging_CategoryB']=='Actual'){echo 'Actual';}  ?></td>
  <td style="width:155px;" align="center">
  <?php if($ResEligEmp['Lodging_CategoryC']>0){echo intval($ResEligEmp['Lodging_CategoryC']);}elseif($ResEligEmp['Lodging_CategoryC']=='Actual'){echo 'Actual';}  ?></td>
 </tr>
 </table>
 </td>
</tr>
<tr>
<td style="width:5px;" align="center"></td>
 <td>
 <table border="0">
 <tr>
  <td class="tdd1"><b>*</b>&nbsp;&nbsp;DA Outside H.Q. :</td>
  <td class="tdd2">: <?php if($ResEligEmp['DA_Outside_Hq']!='' AND $ResEligEmp['DA_Outside_Hq']!=' '){echo '&nbsp;'.$ResEligEmp['DA_Outside_Hq']; }else{ echo '&nbsp;NA';} ?></td>  
 </tr>
 <tr>
  <td class="tdd1"><b>*</b>&nbsp;&nbsp;DA @ H.Q.<?php if($ResE['DepartmentId']==3){ echo '(Only For PD Staff) in case of day tour involving more than 60 kms. travel'; }elseif($ResE['DepartmentId']==4){ echo '(Only For Production Staff) if the work needs touring for more than 6 hours in a day & as per the applicability of the seasons'; }elseif($ResE['DepartmentId']==6){ echo '(Only For Sales Staff)'; } ?> :</td>
  <td class="tdd2">: <?php if($ResEligEmp['DA_Inside_Hq']!='' AND $ResEligEmp['DA_Inside_Hq']!=' '){ echo '&nbsp;'.$ResEligEmp['DA_Inside_Hq'].'&nbsp;&nbsp;Per day';}else{echo '&nbsp;NA';} ?></td>  
 </tr>


<?php if($ResE['DepartmentId']!=2){ ?>
 <tr>
  <td colspan="2"><b>*</b>&nbsp;&nbsp;Travel Eligibility <font size="4"><b>*</b></font> (For Official Purpose Only)</td>   
 </tr>
 <tr>
  <td class="tdd1">&nbsp;&nbsp;a) 2 Wheeler (<font style="font-size:12px;"><?php echo '<b>Rs&nbsp;'.$ResEligEmp['Travel_TwoWeeKM'].'/KM&nbsp;-&nbsp;Max:&nbsp;'.$ResEligEmp['Travel_TwoWeeLimitPerDay'].'KM/Day'; echo '&nbsp;-&nbsp;'.$ResEligEmp['Travel_TwoWeeLimitPerMonth'].'KM/Month'; echo '</b>'; ?></font>)</td>
  <td class="tdd2"> : <?php if($ResEligEmp['Travel_TwoWeeKM']!=''){echo '&nbsp;Applicable';} else {echo '&nbsp;NA';}?></td>  
 </tr>
 
 <?php if($ResEligEmp['LessKm']=='Y'){ ?>
 <tr>
  <td class="tdd1">&nbsp;&nbsp;b) 4 Wheeler (<font style="font-size:12px;">Fuel expense reimbursement on Actual on submission of bill</font>)</td>
  <td class="tdd2"> : <?php echo '&nbsp;Applicable'; ?></td>  
 </tr>
 <?php }else{?>
 <tr>
  <td class="tdd1">&nbsp;&nbsp;b) 4 Wheeler (<font style="font-size:12px;"><?php if($ResEligEmp['Travel_FourWeeKM']!='' AND $ResEligEmp['Travel_FourWeeKM']!='NA'){echo '<b>Rs&nbsp;'.$ResEligEmp['Travel_FourWeeKM'].'/KM&nbsp;-&nbsp;Max:&nbsp;'; if($ResEligEmp['Travel_FourWeeLimitPerMonth']>0){$PerAnnum=$ResEligEmp['Travel_FourWeeLimitPerMonth']*12;}elseif($ResEligEmp['Travel_FourWeeLimitPerMonth']=='Actual'){$PerAnnum='Actual';}elseif($ResEligEmp['Travel_FourWeeLimitPerMonth']==''){$PerAnnum='';}echo '<b>'.$ResEligEmp['Travel_FourWeeLimitPerMonth'].'KM/Month'; if($_REQUEST['G']!='J4'){ echo '&nbsp;-&nbsp;'.$PerAnnum.'KM/Annum'; } } ?></font>)</td>
  <td class="tdd2"> : <?php if($ResEligEmp['Travel_FourWeeKM']!='' AND $ResEligEmp['Travel_FourWeeKM']!='0' AND $ResEligEmp['Travel_FourWeeKM']!='NA'){echo '&nbsp;Applicable';} else {echo '&nbsp;NA';}?></td>  
 </tr>
 <?php } ?>
 <?php } //if($ResE['DepartmentId']!=2) ?>
 
 <tr>
  <td class="tdd1"><b>*</b>&nbsp;&nbsp;Mode of Travel outside HQ</td>
  <td class="tdd2"> : &nbsp;<?php if($ResEligEmp['Mode_Travel_Outside_Hq']!=''){echo $ResEligEmp['Mode_Travel_Outside_Hq'];}else{echo 'NA';}?></td>  
 </tr>
 <tr>
  <td class="tdd1"><b>*</b>&nbsp;&nbsp;Travel Class</td>
  <td class="tdd2"> : &nbsp;<?php if($ResEligEmp['Mode_Travel_Outside_Hq']!=''){echo $ResEligEmp['TravelClass_Outside_Hq'];}else{echo 'NA';}?></td>  
 </tr>
 <tr>
  <td class="tdd1"><b>*</b>&nbsp;&nbsp;Mobile expenses Reimbursement :</td>
  <td class="tdd2"> : &nbsp;<?php if($ResEligEmp['Mobile_Exp_Rem_Rs']!=''){ if($ResEligEmp['Mobile_Exp_Rem_Rs']!='Actual'){echo 'Rs.&nbsp;';} echo $ResEligEmp['Mobile_Exp_Rem_Rs'].'/-'.$ResEligEmp['Prd'];}else{echo 'NA';}?></td>
 </tr>
 <tr>
  <td class="tdd1"><b>*</b>&nbsp;&nbsp;Mobile Handset Eligibility </td>
  <td class="tdd2"> : &nbsp;<?php if($ResEligEmp['Mobile_Company_Hand']=='Y'){ echo 'Company Handset';} elseif($ResEligEmp['Mobile_Company_Hand']=='N' AND $ResEligEmp['Mobile_Hand_Elig_Rs']!=''){ if($ResEligEmp['Mobile_Hand_Elig_Rs']!='Actual' AND $ResEligEmp['Mobile_Hand_Elig_Rs']!='Actual/ blackberry') {echo 'Rs.&nbsp;';} echo $ResEligEmp['Mobile_Hand_Elig_Rs']; if($ResEligEmp['Mobile_Hand_Elig_Rs']!='Actual' AND $ResEligEmp['Mobile_Hand_Elig_Rs']!='Actual/ blackberry') {echo '/-';}}else{echo 'NA';} ?></td>  
 </tr>
 
 <?php /*?><tr>
  <td class="tdd1"><b>*</b>&nbsp;&nbsp;Misc. expenses(like stationery/photocopy/fax/e-mail/etc) </td>
  <td class="tdd2"> : &nbsp;<?php if($ResEligEmp['Misc_Expenses']=='Y'){echo 'Actual';}else{echo 'NA';}?></td>  
 </tr><?php */?>
 
<?php if($ResCtc['ESCI']>0){ echo ''; } else {?>
 <tr>
  <td class="tdd1"><b>*</b>&nbsp;&nbsp;Health Insurance(Premium Paid by Company)  </td>
  <td class="tdd2"> : &nbsp;<?php if($ResEligEmp['Health_Insurance']>0 AND $ResEligEmp['Health_Insurance']!=''){ if($ResEligEmp['Health_Insurance']==100000.00){echo '1 Lakh';}elseif($ResEligEmp['Health_Insurance']==200000.00){echo '2 Lakhs';}elseif($ResEligEmp['Health_Insurance']==300000.00){echo '3 Lakhs';} elseif($ResEligEmp['Health_Insurance']==500000.00){echo '5 Lakhs';} elseif($ResEligEmp['Health_Insurance']==500000.00){echo '5 Lakhs';} elseif($ResEligEmp['Health_Insurance']==600000.00){echo '6 Lakhs';} elseif($ResEligEmp['Health_Insurance']==800000.00){echo '8 Lakhs';} elseif($ResEligEmp['Health_Insurance']==900000.00){echo '9 Lakhs';} elseif($ResEligEmp['Health_Insurance']==1000000.00){echo '10 Lakhs';} } else {echo 'NA';}?></td>  
 </tr>
<?php } ?>
<?php if($ResEligEmp['HelthCheck']=='Y'){ ?>
 <tr>
  <td class="tdd1"><b>*</b>&nbsp;&nbsp;Executive Health Check-up (Once in 2 yrs)</td>
  <td class="tdd2"> : &nbsp;<?php if($resDaily['HelthChekUp']!=''){echo 'Rs.&nbsp;'.$resDaily['HelthChekUp'].'/-';}else{echo 'NA';}?></td>  
 </tr>
<?php } ?> 
<?php if($ResEligEmp['CostOfVehicle']!='' AND $ResEligEmp['CostOfVehicle']>0){ ?>
 <tr>
  <td class="tdd1"><b>*</b>&nbsp;&nbsp;Vehicle entitlement value : </td>
  <td class="tdd2"> : &nbsp;<?php echo $ResEligEmp['CostOfVehicle']; ?></td>
 </tr>
<?php } ?> 
<?php $sCtc=mysql_query("SELECT BONUS_Value FROM hrm_employee_ctc WHERE EmployeeID=".$_REQUEST['E']." AND Status='A'",$con);      $rCtc=mysql_fetch_assoc($sCtc); if($rCtc['BONUS_Value']>0){ ?>
 <tr>
  <td class="tdd1"><b>*</b>&nbsp;&nbsp;Bonus(yearly)</td>
  <td class="tdd2"> : &nbsp;As Per Law</td>  
 </tr>
<?php } ?> 
 <tr>
  <td class="tdd1"><b>*</b>&nbsp;&nbsp;Gratuity </td>
  <td class="tdd2"> : &nbsp;As Per Law</td>  
 </tr>
 <tr><td colspan="2" style="width:400px;font-size:16px;height:18px;" align="left"><b>*</b>&nbsp;&nbsp;Deduction</td> </tr>
 <tr>
  <td colspan="2">
  <table>
   <tr>
    <td style="width:250px;font-size:16px; height:18px;" align="left">&nbsp;&nbsp;&nbsp;a) Deduction - As Per Law</td>
    <td style="width:50px;font-size:15px;" align="center"></td>
    <td style="width:370px;font-size:16px;" align="left"> : &nbsp;Provident Fund/ ESIC</td>  
   </tr>
  </table>
  </td> 
  </tr>
  <tr>
  <td colspan="2">
  <table>
   <tr>
    <td style="width:250px;font-size:16px; height:18px;" align="left">&nbsp;&nbsp;&nbsp;b) Deduction - Actual</td>
    <td style="width:50px;font-size:15px;" align="center"></td>
    <td style="width:370px;font-size:16px;" align="left"> : &nbsp;Any dues to company(if any)/ Advances</td>  
   </tr>
  </table>
  </td>
 </tr>
 <tr><td colspan="2">&nbsp;</td></tr>
 <tr><td colspan="2" style="width:680px;font-size:16px;height:18px;" align="left"><b>Note:</b></td></tr>
 <tr>
  <td colspan="2" style="width:680px;font-size:16px;height:18px;">
  <table>
  <?php if($ResE['DepartmentId']==6 AND ($_REQUEST['G']=='J3' OR $_REQUEST['G']=='J4')){ ?>
  <?php if($_REQUEST['G']=='J3'){ ?>
  <tr>
   <td style="width:30px;font-size:16px;height:18px;" align="center" valign="top">[a]</td>
   <td style="width:630px;font-size:16px;height:18px;" align="left">Four wheeler entitlements are applicable for personal vehicle or equivalent allowed amount (Rs. 16000/month) can be claimed for hired vehicle. Overall travel by four wheeler & two wheeler should not exceed by more then 3000 km/month.</td>
  </tr>
  <?php }elseif($_REQUEST['G']=='J4'){ ?>
  <tr>
   <td style="width:30px;font-size:16px;height:18px;" align="center" valign="top">[a]</td>
   <td style="width:630px;font-size:16px;height:18px;" align="left">Four wheeler entitlements are applicable for personal vehicle or equivalent allowed amount (Rs. 16000/month) can be claimed for hired vehicle. Overall travel by four wheeler & two wheeler should not exceed by more then 3000 km/month.</td>
  </tr>
  <?php } ?>
  <tr>
   <td style="width:30px;font-size:16px;height:18px;" align="center" valign="top">[b]</td>
   <td style="width:630px;font-size:16px;height:18px;" align="left">The changed entitlements will be effective from <?php echo $SeteD; ?>.</td>
  </tr>
  <tr>
   <td style="width:30px;font-size:16px;height:18px;" align="center" valign="top">[c]</td>
   <td style="width:630px;font-size:16px;height:18px;" align="left">The expense claims on 2 wheeler/4 wheeler is subject to the employee having a valid driving license. The photocopy should be provided to HR.</td>
  </tr>
<?php } else { ?>
  <tr>
   <td style="width:30px;font-size:16px;height:18px;" align="center" valign="top">[a]</td>
   <td style="width:630px;font-size:16px;height:18px;" align="left">The changed entitlements will be effective from <?php echo '1st March 2019';//$SeteD; ?>.</td>
  </tr>
  <tr>
   <td style="width:30px;font-size:16px;height:18px;" align="center" valign="top">[b]</td>
   <td style="width:630px;font-size:16px;height:18px;" align="left">The expenses claim on 2 wheeler/4 wheeler is subject to the employee having a valid driving license. The photocopy of which shall be provided to HR.</td>
  </tr>
<?php } ?>  

<?php $sPms=mysql_query("select HR_CurrGradeId,HR_GradeId from hrm_employee_pms where EmpPmsId=".$_REQUEST['P']." AND EmployeeID=".$_REQUEST['E'], $con); $rPms=mysql_fetch_assoc($sPms);
      if(($rPms['HR_CurrGradeId']==66 AND $rPms['HR_GradeId']==67) OR ($rPms['HR_CurrGradeId']==71 AND $rPms['HR_GradeId']==72)){ ?>
  <tr>
   <td style="width:30px;font-size:16px;height:18px;" align="center" valign="top">[c]</td>
   <td style="width:630px;font-size:16px;height:18px;" align="left">Mediclaim insurance limit change will be affected from the next mediclaim policy renewal due in Nov <?php echo date("y") ?>. Till then the coverage will be equivalent to old limits.</td>
  </tr>	  
<?php } ?>	   



  </table>
  </td>
 </tr>
 </table>
 </td>
</tr>
 </td>
  </table>