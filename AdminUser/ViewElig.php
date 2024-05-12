<style>
.tdd1{width:550px;font-size:16px;height:16px;text-align:left;}
.tdd2{width:205px;font-size:16px;text-align:left;}
</style>
<table style="border-style:outset;border-color:#75A633;" border="0" cellpadding="0" cellspacing="2">


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
  <td style="width:60%;" align="center">&nbsp;<?='Rs. '.$ResEligEmp['Travel_TwoWeeKM'].'/Km '.$ResEligEmp['Travel_TwoWeeKM_Rmk']?></td>
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
<?php $sEG=mysql_query("select HR_GradeId,HR_CurrGradeId,CompanyId from hrm_employee_pms where EmpPmsId=".$ResEligEmp['PmsId'],$con); $rEG=mysql_fetch_assoc($sEG); ?>
<?php if($ResCtc['ESCI']==0 OR $ResCtc['ESCI']=='' OR $rEG['CompanyId']==1 OR $ResEligEmp['HelthCheck']=='Y'){ ?>
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
 
 if($rEG['CompanyId']==1 AND $ResEligEmp['Term_Insurance']!=''){ ?>
 <tr>
  <td style="width:75%;font-size:16px;">&nbsp;Group Term Life Insurance (Sum Insured) :  </td>
  <td style="width:25%;" align="center">&nbsp;<?='Rs. '.$ResEligEmp['Term_Insurance']?></td>
 </tr>
 <?php } //if($rEG['CompanyId']==1) ?>
 
 <?php if($ResEligEmp['HelthCheck']=='Y'){ ?>
 <tr>
  <td style="width:75%;font-size:16px;">&nbsp;Executive Health Check-up : <b><?=$ResEligEmp['HelthCheck_Rmk']?></b></td>
  <td style="width:25%;" align="center">&nbsp;<?='Rs. '.$ResEligEmp['HelthCheck_Amt']?></td>
 </tr>
 <?php } ?> 
 
 </table>
 </td>
</tr>
<tr><td style="height:10px;"></td></tr>
<?php } ?>





<?php //Other Other Other Other Other Other Other Other Other Other Other Other Other Other ?>
<?php //Other Other Other Other Other Other Other Other Other Other Other Other Other Other ?>



<?php //Note Note Note Note Note Note Note Note Note Note Note Note ?>
<?php //Note Note Note Note Note Note Note Note Note Note Note Note ?>

 <tr><td colspan="2" style="width:680px;font-size:12px;height:14px;" align="left"><b>Note:</b></td></tr>
 <tr>
  <td colspan="2" style="width:680px;font-size:12px;height:14px;">
  <table>
  <?php if(($ResE['DepartmentId']==6 OR $ResE['DepartmentId']==3) AND ($_REQUEST['G']=='J3' OR $_REQUEST['G']=='J4')){ ?>
  <?php if($_REQUEST['G']=='J3'){ ?>
  <tr>
   <td style="width:30px;font-size:12px;height:14px;" align="center" valign="top">[a]</td>
   <td style="width:630px;font-size:12px;height:14px;" align="left">Four wheeler entitlements are applicable for personal vehicle or equivalent allowed amount (Rs. 22000/month) can be claimed for hired vehicle. Overall travel by four wheeler & two wheeler should not exceed by more than 3000 km/month.</td>
  </tr>
  <?php }elseif($_REQUEST['G']=='J4'){ ?>
  <tr>
   <td style="width:30px;font-size:12px;height:16px;" align="center" valign="top">[a]</td>
   <td style="width:630px;font-size:12px;height:16px;" align="left">Four wheeler entitlements are applicable for personal vehicle or equivalent allowed amount (Rs. 27500/month) can be claimed for hired vehicle. Overall travel by four wheeler & two wheeler should not exceed by more than 3000 km/month.</td>
  </tr>
  <?php } ?>
  <tr>
   <td style="width:30px;font-size:12px;height:14px;" align="center" valign="top">[b]</td>
   <td style="width:630px;font-size:12px;height:14px;" align="left">The changed entitlements will be effective from 1st March <?=date("Y")?>.</td>
   <?php //echo '1st April '.date("Y");//$SeteD; the policy release date ?>
  </tr>
  <tr>
   <td style="width:30px;font-size:12px;height:14px;" align="center" valign="top">[c]</td>
   <td style="width:630px;font-size:12px;height:14px;" align="left">The expense claims on 2 wheeler/4 wheeler is subject to the employee having a valid driving license. The photocopy should be provided to HR.</td>
  </tr>
<?php } else { ?>
  <tr>
   <td style="width:30px;font-size:12px;height:14px;" align="center" valign="top">[a]</td>
   <td style="width:630px;font-size:12px;height:14px;" align="left">The changed entitlements will be effective from 1st March <?=date("Y")?>.</td>
  </tr>
  <tr>
   <td style="width:30px;font-size:12px;height:14px;" align="center" valign="top">[b]</td>
   <td style="width:630px;font-size:12px;height:14px;" align="left">The expenses claim on 2 wheeler/4 wheeler is subject to the employee having a valid driving license. The photocopy of which shall be provided to HR.</td>
  </tr>
<?php } ?>  


  <tr>
   <td style="width:30px;font-size:12px;height:14px;" align="center" valign="top">[c]</td>
   <td style="width:630px;font-size:12px;height:14px;" align="left">The change in insurance coverage slab shall be effective from the next insurance policy renewal date.</td>
  </tr>	
  <tr>
   <td style="width:30px;font-size:12px;height:14px;" align="center" valign="top">[d]</td>
   <td style="width:630px;font-size:12px;height:14px;" align="left">For those covered in vehicle policy may refer to the HR manual in ESS for further details.</td>
  </tr>	  
	   
  </table>
  </td>
 </tr>
 </table>
 </td>
</tr>
 </td>
  </table>