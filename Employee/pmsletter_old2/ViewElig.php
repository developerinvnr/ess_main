<style>
.tdd1{width:550px;font-size:16px;height:16px;text-align:left;}
.tdd2{width:205px;font-size:16px;text-align:left;}
</style>
<table style="border-style:outset;border-color:#75A633;" border="0" cellpadding="0" cellspacing="8">


<?php //Lodging Entitlements Lodging Entitlements Lodging Entitlements Lodging Entitlements ?>
<?php //Lodging Entitlements Lodging Entitlements Lodging Entitlements Lodging Entitlements ?>
<tr>
 <td colspan="3" style="width:680px;font-size:16px;height:18px;" align="left"><b>*&nbsp;&nbsp;Lodging Entitlements :</b>&nbsp;(Actual with upper limits per day).</td>
</tr>
<?php if($_REQUEST['G']=='M1' OR $_REQUEST['G']=='M2' OR $_REQUEST['G']=='M3' OR $_REQUEST['G']=='M4' OR $_REQUEST['G']=='M5'){$Cond=' (Approval based)';}
 elseif($_REQUEST['G']=='L1' OR $_REQUEST['G']=='L2' OR $_REQUEST['G']=='L3'){$Cond=' (Need based)';}
 else{$Cond=' (Need based)';} ?>
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
  <?php if($ResEligEmp['Lodging_CategoryA']>0){echo intval($ResEligEmp['Lodging_CategoryA']);}elseif($ResEligEmp['Lodging_CategoryA']=='Actual'){echo 'Actual';}  ?></td>
  <td style="width:155px;" align="center">
  <?php if($ResEligEmp['Lodging_CategoryB']>0){echo intval($ResEligEmp['Lodging_CategoryB']);}elseif($ResEligEmp['Lodging_CategoryB']=='Actual'){echo 'Actual';}  ?></td>
  <td style="width:155px;" align="center">
  <?php if($ResEligEmp['Lodging_CategoryC']>0){echo intval($ResEligEmp['Lodging_CategoryC']);}elseif($ResEligEmp['Lodging_CategoryC']=='Actual'){echo 'Actual';}  ?></td>
 </tr>
 </table>
 </td>
</tr>
<tr><td style="height:10px;"></td></tr>


<?php //DA DA DA DA DA DA DA DA DA DA DA DA DA DA DA DA DA DA DA DA DA DA DA DA DA DA ?>
<?php //DA DA DA DA DA DA DA DA DA DA DA DA DA DA DA DA DA DA DA DA DA DA DA DA DA DA ?>

<?php if(($ResEligEmp['DA_Outside_Hq']!='' AND $ResEligEmp['DA_Outside_Hq']!=' ') OR ($ResEligEmp['DA_Inside_Hq']!='' AND $ResEligEmp['DA_Inside_Hq']!=' ')){ ?>
<tr>
 <td colspan="3" style="width:680px;font-size:16px;height:18px;" align="left"><b>*&nbsp;&nbsp;Daily Allowances :</b></td>
</tr>

<tr>
 <td colspan="3" style="width:100%;">
 <table border="1" style="width:100%;" cellpadding="1" cellspacing="0">
 <?php if($ResEligEmp['DA_Inside_Hq']!='' AND $ResEligEmp['DA_Inside_Hq']!=' '){ ?>
 <tr>
  <td style="width:75%;font-size:16px;">&nbsp;Daily Allowances at HQ : <?php if($ResE['DepartmentId']==3){ echo '(DA at HQ on minimum travel of 40 kms/day)'; }elseif($ResE['DepartmentId']==4){ echo '(if the work needs touring for more than 6 hours in a day & as per the applicability of the seasons)'; }elseif($ResE['DepartmentId']==24 OR $ResE['DepartmentId']==25){ echo '(if the work needs touring for more than 6 hours in a day)'; }elseif($ResE['DepartmentId']==6){ echo '(DA at HQ on minimum travel of 50 kms/day)'; } ?></td>
  <td style="width:25%;" align="center">&nbsp;<?php if($ResEligEmp['DA_Inside_Hq']!='' AND $ResEligEmp['DA_Inside_Hq']!=' '){ echo '&nbsp;'.$ResEligEmp['DA_Inside_Hq'];}else{echo '&nbsp;NA';} ?></td>
 </tr>
 <?php } 
 if($ResEligEmp['DA_Outside_Hq']!='' AND $ResEligEmp['DA_Outside_Hq']!=' '){ ?>
 <tr>
  <td style="width:75%;font-size:16px;">&nbsp;<?php if($ResE['DepartmentId']==2){echo 'Fooding Expense (For outside HQ travel with night halt)'; }else{ echo 'Daily Allowances outside HQ'; } ?> : </td>
  <td style="width:25%;" align="center">&nbsp;<?php if($ResEligEmp['DA_Outside_Hq']!='' AND $ResEligEmp['DA_Outside_Hq']!=' '){echo '&nbsp;'.$ResEligEmp['DA_Outside_Hq']; }else{ echo '&nbsp;NA';} ?></td>
 </tr>
 <?php } ?>
 </table>
 </td>
</tr>
<tr><td style="height:10px;"></td></tr>
<?php } ?>




<?php //Travel Eligibility Travel Eligibility Travel Eligibility Travel Eligibility ?>
<?php //Travel Eligibility Travel Eligibility Travel Eligibility Travel Eligibility ?>

<?php if(($ResEligEmp['Travel_TwoWeeKM']!='' OR $ResEligEmp['LessKm']=='Y' OR ($ResEligEmp['Travel_FourWeeKM']!='' AND $ResEligEmp['Travel_FourWeeKM']!=' ' AND $ResEligEmp['Travel_FourWeeKM']!='0' AND $ResEligEmp['Travel_FourWeeKM']!='NA' AND $ResEligEmp['Travel_FourWeeKM']!=' NA' AND $ResEligEmp['Travel_FourWeeKM']!='NA Per KM' AND $ResEligEmp['Travel_FourWeeKM']!=' NA Per KM' AND $ResEligEmp['Travel_FourWeeKM']!='NA ' AND $ResEligEmp['Travel_FourWeeKM']!='NA  ' AND $ResEligEmp['Travel_FourWeeKM']!='  NA' AND $ResEligEmp['Travel_FourWeeKM']!=' NA ')) OR ($ResEligEmp['Travel_FourWeeKM']!='' AND $ResEligEmp['Travel_FourWeeKM']!=' ' AND $ResEligEmp['Travel_FourWeeKM']!='0' AND $ResEligEmp['Travel_FourWeeKM']!='NA' AND $ResEligEmp['Travel_FourWeeKM']!=' NA' AND $ResEligEmp['Travel_FourWeeKM']!='NA Per KM' AND $ResEligEmp['Travel_FourWeeKM']!=' NA Per KM' AND $ResEligEmp['Travel_FourWeeKM']!='NA ' AND $ResEligEmp['Travel_FourWeeKM']!='NA  ' AND $ResEligEmp['Travel_FourWeeKM']!='  NA' AND $ResEligEmp['Travel_FourWeeKM']!=' NA ') OR $ResEligEmp['Mode_Travel_Outside_Hq']!='' OR $ResEligEmp['Mode_Travel_Outside_Hq']!=''){ ?>
<tr>
 <td colspan="3" style="width:680px;font-size:16px;height:18px;" align="left"><b>*&nbsp;&nbsp;Travel Eligibility :</b> (For Official Purpose Only)</td>
</tr>

<tr>
 <td colspan="3" style="width:100%;">
 <table border="1" style="width:100%;" cellpadding="1" cellspacing="0">
 <?php if($ResEligEmp['Travel_TwoWeeKM']!='' OR $ResEligEmp['LessKm']=='Y' OR ($ResEligEmp['Travel_FourWeeKM']!='' AND $ResEligEmp['Travel_FourWeeKM']!=' ' AND $ResEligEmp['Travel_FourWeeKM']!='0' AND $ResEligEmp['Travel_FourWeeKM']!='NA' AND $ResEligEmp['Travel_FourWeeKM']!=' NA' AND $ResEligEmp['Travel_FourWeeKM']!='NA Per KM' AND $ResEligEmp['Travel_FourWeeKM']!=' NA Per KM' AND $ResEligEmp['Travel_FourWeeKM']!='NA ' AND $ResEligEmp['Travel_FourWeeKM']!='NA  ' AND $ResEligEmp['Travel_FourWeeKM']!='  NA' AND $ResEligEmp['Travel_FourWeeKM']!=' NA ')){ //22 ?>
 
 
 <?php if($ResEligEmp['Travel_FourWeeKM']=='' OR $ResEligEmp['Travel_FourWeeKM']==' ' OR $ResEligEmp['Travel_FourWeeKM']=='0' OR $ResEligEmp['Travel_FourWeeKM']=='NA' OR $ResEligEmp['Travel_FourWeeKM']==' NA' OR $ResEligEmp['Travel_FourWeeKM']=='NA Per KM' OR $ResEligEmp['Travel_FourWeeKM']==' NA Per KM' OR $ResEligEmp['Travel_FourWeeKM']=='NA ' OR $ResEligEmp['Travel_FourWeeKM']=='NA  ' OR $ResEligEmp['Travel_FourWeeKM']=='  NA' OR $ResEligEmp['Travel_FourWeeKM']==' NA ' OR ($_REQUEST['G']=='S1' OR $_REQUEST['G']=='S2' OR $_REQUEST['G']=='J1' OR $_REQUEST['G']=='J2' OR $_REQUEST['G']=='J3' OR $_REQUEST['G']=='J4')){ ?>
 
 <tr>
  <td style="width:40%;font-size:16px;">&nbsp;2 Wheeler :</td>
  <td style="width:60%;" align="center">&nbsp;<?php if($ResE['DepartmentId']==2 AND ($ResEligEmp['VehiclePolicy']==9 OR $ResEligEmp['VehiclePolicy']==10)){ 
 $sEg=mysql_query("select GradeId from hrm_employee_general where EmployeeID=".$_REQUEST['E'],$con); $rEg=mysql_fetch_assoc($sEg); $sqPt=mysql_query("select Fn6 from hrm_master_eligibility_policy_tbl".$ResEligEmp['VehiclePolicy']." where GradeId=".$rEg['GradeId'],$con); $rqPt=mysql_fetch_assoc($sqPt); 
 if($rqPt['Fn6']!='' && $rqPt['Fn6']!='.'){ echo $rqPt['Fn6']; }
 }
 else
 { 
  if($ResEligEmp['Travel_TwoWeeKM']!='' AND $ResEligEmp['Travel_TwoWeeKM']!='0' AND $ResEligEmp['Travel_TwoWeeKM']!='NA')
  {
    echo 'Rs&nbsp;'.$ResEligEmp['Travel_TwoWeeKM'].'/KM';?> <?php if($ResEligEmp['Travel_TwoWeeLimitPerDay']!='' AND $ResEligEmp['Travel_TwoWeeLimitPerDay']!=0 AND $ResEligEmp['Travel_TwoWeeLimitPerDay']!='NA'){ echo '&nbsp;-&nbsp;'; if($ResE['DepartmentId']!=4){ if($ResE['DepartmentId']==2 OR ($ResE['DepartmentId']==5 AND ($_REQUEST['G']=='M4' OR $_REQUEST['G']=='M5')) OR $_REQUEST['G']=='L1' OR $_REQUEST['G']=='L2' OR $_REQUEST['G']=='L3' OR $_REQUEST['G']=='L4' OR $_REQUEST['G']=='L5' OR $_REQUEST['G']=='MG'){echo 'Min';}else{echo 'Max'; echo ':&nbsp;'.$ResEligEmp['Travel_TwoWeeLimitPerDay'].'KM/Day'; } ?> <?php echo '&nbsp;-&nbsp;'.$ResEligEmp['Travel_TwoWeeLimitPerMonth'].'KM/Month'; } }
  }
 
 } //else ?></td>
 </tr>
 <?php } //if() ?>
 <?php } 
 
 
 if($ResEligEmp['Travel_FourWeeKM']!='' AND $ResEligEmp['Travel_FourWeeKM']!=' ' AND $ResEligEmp['Travel_FourWeeKM']!='0' AND $ResEligEmp['Travel_FourWeeKM']!='NA' AND $ResEligEmp['Travel_FourWeeKM']!=' NA' AND $ResEligEmp['Travel_FourWeeKM']!='NA Per KM' AND $ResEligEmp['Travel_FourWeeKM']!=' NA Per KM' AND $ResEligEmp['Travel_FourWeeKM']!='NA ' AND $ResEligEmp['Travel_FourWeeKM']!='NA  ' AND $ResEligEmp['Travel_FourWeeKM']!='  NA' AND $ResEligEmp['Travel_FourWeeKM']!=' NA '){ //44 ?>
 <tr>
  <td style="width:40%;font-size:16px;">&nbsp;4 Wheeler : </td>
  <td style="width:60%;" align="center">&nbsp;<?php if($ResE['DepartmentId']==2 &&($ResEligEmp['VehiclePolicy']>0)){echo 'As per R&D vehicle policy';}
  else
  {
   if($ResEligEmp['Travel_FourWeeKM']!='' AND $ResEligEmp['Travel_FourWeeKM']!=' ' AND $ResEligEmp['Travel_FourWeeKM']!='0' AND $ResEligEmp['Travel_FourWeeKM']!='NA' AND $ResEligEmp['Travel_FourWeeKM']!=' NA' AND $ResEligEmp['Travel_FourWeeKM']!='NA Per KM' AND $ResEligEmp['Travel_FourWeeKM']!=' NA Per KM' AND $ResEligEmp['Travel_FourWeeKM']!='NA ' AND $ResEligEmp['Travel_FourWeeKM']!='NA  ' AND $ResEligEmp['Travel_FourWeeKM']!='  NA' AND $ResEligEmp['Travel_FourWeeKM']!=' NA '){echo 'Rs&nbsp;'.$ResEligEmp['Travel_FourWeeKM'].'/KM';?> 
  <?php if($ResEligEmp['Travel_FourWeeLimitPerMonth']!='' AND $ResEligEmp['Travel_FourWeeLimitPerMonth']!=0 AND $ResEligEmp['Travel_FourWeeLimitPerMonth']!='NA'){ echo '&nbsp;-&nbsp;'; if($ResE['DepartmentId']==2 OR ($ResE['DepartmentId']==5 AND ($_REQUEST['G']=='M4' OR $_REQUEST['G']=='M5')) OR $_REQUEST['G']=='L1' OR $_REQUEST['G']=='L2' OR $_REQUEST['G']=='L3' OR $_REQUEST['G']=='L4' OR $_REQUEST['G']=='L5' OR $_REQUEST['G']=='MG'){echo 'Min';}else{echo 'Max';} ?> <?php echo ':&nbsp;'; if($ResEligEmp['Travel_FourWeeLimitPerMonth']>0){$PerAnnum=$ResEligEmp['Travel_FourWeeLimitPerMonth']*12;}elseif($ResEligEmp['Travel_FourWeeLimitPerMonth']=='Actual'){$PerAnnum='Actual';}elseif($ResEligEmp['Travel_FourWeeLimitPerMonth']==''){$PerAnnum='';}echo $ResEligEmp['Travel_FourWeeLimitPerMonth'].'KM/Month'; } if($ResE['DepartmentId']==2 OR ($ResE['DepartmentId']==5 AND ($_REQUEST['G']=='M4' OR $_REQUEST['G']=='M5')) OR $_REQUEST['G']=='L1' OR $_REQUEST['G']=='L2' OR $_REQUEST['G']=='L3' OR $_REQUEST['G']=='L4' OR $_REQUEST['G']=='L5' OR $_REQUEST['G']=='MG'){echo '';}else{ echo '&nbsp;-&nbsp;'.$PerAnnum.'KM/Annum'; } }
  } //else ?></td>
 </tr>
 <?php } ?>
 
 
 <?php $vehiclaCose=''; 

if($_REQUEST['P']>0){ $PmsId=$_REQUEST['P']; }
else{ $PmsId=$PNew; } 

 $SeG=mysql_query("select HR_GradeId,HR_CurrGradeId from hrm_employee_pms where EmpPmsId=".$PmsId,$con); 
 $ReG=mysql_fetch_assoc($SeG); if($ReG['HR_GradeId']>0){$GrdId=$ReG['HR_GradeId'];}else{$GrdId=$ReG['HR_CurrGradeId'];}

if($ResEligEmp['VehiclePolicy']>0)
{ 
 $sqpf=mysql_query("select * from hrm_master_eligibility_mapping_tblfield where PolicyId=".$ResEligEmp['VehiclePolicy']." and FieldId=2 AND sts=1 AND ComId=".$_REQUEST['C']); $rowpf=mysql_num_rows($sqpf);
 if($rowpf>0)
 {
  $sqpfv=mysql_query("select Fn2 from hrm_master_eligibility_policy_tbl".$ResEligEmp['VehiclePolicy']." where GradeId=".$GrdId." ",$con); $rowqpfv=mysql_num_rows($sqpfv);
  if($rowqpfv>0){ $resqpfv=mysql_fetch_assoc($sqpfv); $vehiclaCose=$resqpfv['Fn2']; }
  else{ $vehiclaCose=0; }
 }
 else
 {
  $sqpf2=mysql_query("select * from hrm_master_eligibility_mapping_tblfield where PolicyId=".$ResEligEmp['VehiclePolicy']." and FieldId=14 AND sts=1 AND ComId=".$_REQUEST['C']); $rowpf2=mysql_num_rows($sqpf2);
  if($rowpf2>0)
  {
  
   $sqpfv2=mysql_query("select Fn14 from hrm_master_eligibility_policy_tbl".$ResEligEmp['VehiclePolicy']." where GradeId=".$GrdId." ",$con); $rowqpfv2=mysql_num_rows($sqpfv2);
   if($rowqpfv2>0){ $resqpfv2=mysql_fetch_assoc($sqpfv2); $vehiclaCose=$resqpfv2['Fn14']; }
   else{ $vehiclaCose=0; }
  }
  else{ $vehiclaCose=0; }
 
 }

} //if($ResEligEmp['VehiclePolicy']>0) ?>
 
 
 <?php if($vehiclaCose!='' AND $vehiclaCose!='0'){ ?>
 <tr>
  <td style="width:40%;font-size:16px;">&nbsp;Vehicle entitlement value :</td>
  <td style="width:60%;" align="center">&nbsp;<?php echo $vehiclaCose;?></td>
 </tr>
 <?php } if($ResEligEmp['Mode_Travel_Outside_Hq']!=''){ ?>
 <tr>
  <td style="width:40%;font-size:16px;">&nbsp;Mode of Travel outside HQ :</td>
  <td style="width:60%;" align="center">&nbsp;<?php echo $ResEligEmp['Mode_Travel_Outside_Hq'];?></td>
 </tr>
 <?php } if($ResEligEmp['Mode_Travel_Outside_Hq']!=''){ ?>
 <tr>
  <td style="width:40%;font-size:16px;">&nbsp;Travel Class :</td>
  <td style="width:60%;" align="center">&nbsp;<?php echo $ResEligEmp['TravelClass_Outside_Hq'];?></td>
 </tr>
 <?php } ?>
 
 
 </table>
 </td>
</tr>
<tr><td style="height:10px;"></td></tr>
<?php } ?>




<br />
<?php //Mobile Eligibility Mobile Eligibility Mobile Eligibility Mobile Eligibility ?>
<?php //Mobile Eligibility Mobile Eligibility Mobile Eligibility Mobile Eligibility ?>

<?php if($ResEligEmp['Mobile_Exp_Rem_Rs']!='' OR ($ResEligEmp['Mobile_Company_Hand']=='Y' OR ($ResEligEmp['Mobile_Hand_Elig_Rs']!='' AND $ResEligEmp['Mobile_Hand_Elig_Rs']!='NA'))){ ?>
<tr>
 <td colspan="3" style="width:680px;font-size:16px;height:18px;" align="left"><b>*&nbsp;Mobile Eligibility :</b></td>
</tr>

<tr>
 <td colspan="3" style="width:100%;">
 <table border="1" style="width:100%;" cellpadding="1" cellspacing="0">
 <?php if($ResEligEmp['Mobile_Exp_Rem_Rs']!=''){ ?>
 <tr>
  <td style="width:75%;font-size:16px;">&nbsp;Mobile expenses Reimbursement : </td>
  <td style="width:25%;" align="center">&nbsp;<?php if($ResEligEmp['Mobile_Exp_Rem_Rs']!=''){ if($ResEligEmp['Mobile_Exp_Rem_Rs']!='Actual'){echo 'Rs.&nbsp;';} echo $ResEligEmp['Mobile_Exp_Rem_Rs'].'/-';if($ResEligEmp['Prd']=='Mnt'){echo 'Monthly';}elseif($ResEligEmp['Prd']=='Qtr'){echo 'Quarter';}elseif($ResEligEmp['Prd']=='1/2 Yearly'){echo '1/2 Yearly';}elseif($ResEligEmp['Prd']=='Yearly'){echo 'Yearly';} }else{echo 'NA';} ?></td>
 </tr>
 <?php } 
 
 if($ResEligEmp['Mobile_Company_Hand']=='Y' OR ($ResEligEmp['Mobile_Hand_Elig_Rs']!='' AND $ResEligEmp['Mobile_Hand_Elig_Rs']!='NA')){  
 
 $sE=mysql_query("select CompanyId,DepartmentId,GradeId from hrm_employee e inner join hrm_employee_general g on e.EmployeeID=g.EmployeeID where e.EmployeeID=".$_REQUEST['E'],$con); $rE=mysql_fetch_assoc($sE);
 $sqlGp=mysql_query("select Mobile,Mobile_WithGPS from hrm_master_eligibility where DepartmentId=".$rE['DepartmentId']." AND CompanyId=".$rE['CompanyId']." AND GradeId=".$rE['GradeId']."",$con); $resGp=mysql_fetch_assoc($sqlGp);
 
 ?>
 <tr>
  <td style="width:75%;font-size:16px;">&nbsp;Mobile Handset Eligibility : (<?php if($ResEligEmp['GPSSet']=='Y'){echo 'Once in 2 yrs';}elseif($resGp['Mobile']!=$resGp['Mobile_WithGPS'] AND $resGp['Mobile_WithGPS']==$ResEligEmp['Mobile_Hand_Elig_Rs']){echo 'Once in 2 yrs';}else{echo 'Once in 3 yrs';}?>) </td>
  <td style="width:25%;" align="center">&nbsp;<?php if($ResEligEmp['Mobile_Company_Hand']=='Y'){ echo 'Company Handset';} elseif($ResEligEmp['Mobile_Company_Hand']=='N' AND $ResEligEmp['Mobile_Hand_Elig_Rs']!=''){ if($ResEligEmp['Mobile_Hand_Elig_Rs']!='Actual' AND $ResEligEmp['Mobile_Hand_Elig_Rs']!='Actual/ blackberry') {echo 'Rs.&nbsp;';} echo $ResEligEmp['Mobile_Hand_Elig_Rs']; if($ResEligEmp['Mobile_Hand_Elig_Rs']!='Actual' AND $ResEligEmp['Mobile_Hand_Elig_Rs']!='Actual/ blackberry') {echo '/-';}}else{echo 'NA';} ?></td>
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
 <td colspan="3" style="width:680px;font-size:16px;height:18px;" align="left"><b>*&nbsp;Insurance :</b></td>
</tr>

<tr>
 <td colspan="3" style="width:100%;">
 <table border="1" style="width:100%;" cellpadding="1" cellspacing="0">
 <?php if($ResCtc['ESCI']>0){ echo ''; } else { ?>
 <tr>
  <td style="width:75%;font-size:16px;">&nbsp;Health Insurance (Sum Insured) : </td>
  <td style="width:25%;" align="center">&nbsp;<?php if($ResEligEmp['Health_Insurance']>0 AND $ResEligEmp['Health_Insurance']!=''){ if($ResEligEmp['Health_Insurance']==100000.00){echo '1 Lakh';}elseif($ResEligEmp['Health_Insurance']==200000.00){echo '2 Lakhs';}elseif($ResEligEmp['Health_Insurance']==300000.00){echo '3 Lakhs';} elseif($ResEligEmp['Health_Insurance']==500000.00){echo '5 Lakhs';} elseif($ResEligEmp['Health_Insurance']==500000.00){echo '5 Lakhs';} elseif($ResEligEmp['Health_Insurance']==600000.00){echo '6 Lakhs';} elseif($ResEligEmp['Health_Insurance']==800000.00){echo '8 Lakhs';} elseif($ResEligEmp['Health_Insurance']==900000.00){echo '9 Lakhs';} elseif($ResEligEmp['Health_Insurance']==1000000.00){echo '10 Lakhs';} } else {echo 'NA';} ?></td>
 </tr>
 <?php } 
 
 //$sEG=mysql_query("select HR_GradeId,HR_CurrGradeId,CompanyId from hrm_employee_pms where EmpPmsId=".$ResEligEmp['PmsId'],$con); $rEG=mysql_fetch_assoc($sEG); 
 if($rEG['CompanyId']==1){ 
 if($rEG['HR_GradeId']>0){ $ggId=$rEG['HR_GradeId']; }else{ $ggId=$rEG['HR_CurrGradeId']; }
 ?>
 <tr>
  <td style="width:75%;font-size:16px;">&nbsp;Group Term Life Insurance (Sum Insured) :  </td>
  <td style="width:25%;" align="center">&nbsp;<?php if($ggId==61 || $ggId==62 ){echo '5 Lakhs';}elseif($ggId==63 || $ggId==64 || $ggId==65 || $ggId==66){echo '10 Lakhs';}elseif($ggId==67 || $ggId==68 || $ggId==69 || $ggId==70|| $ggId==71){ echo '25 Lakhs';}elseif($ggId==72 || $ggId==73 || $ggId==74 || $ggId==75|| $ggId==76){ echo '50 Lakhs';} ?></td>
 </tr>
 <?php } //if($rEG['CompanyId']==1) ?>
 
 <?php if($ResEligEmp['HelthCheck']=='Y'){ ?>
 <tr>
  <td style="width:75%;font-size:16px;">&nbsp;Executive Health Check-up (Once in 2 yrs) :  </td>
  <td style="width:25%;" align="center">&nbsp;<?php if($resDaily['HelthChekUp']!=''){echo 'Rs.&nbsp;'.$resDaily['HelthChekUp'].'/-';}else{echo 'NA';}?></td>
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

 <tr><td colspan="2" style="width:680px;font-size:16px;height:18px;" align="left"><b>Note:</b></td></tr>
 <tr>
  <td colspan="2" style="width:680px;font-size:16px;height:18px;">
  <table>
  <?php if(($ResE['DepartmentId']==6 OR $ResE['DepartmentId']==3) AND ($_REQUEST['G']=='J3' OR $_REQUEST['G']=='J4')){ ?>
  <?php if($_REQUEST['G']=='J3'){ ?>
  <tr>
   <td style="width:30px;font-size:16px;height:18px;" align="center" valign="top">[a]</td>
   <td style="width:630px;font-size:16px;height:18px;" align="left">Four wheeler entitlements are applicable for personal vehicle or equivalent allowed amount (Rs. 22000/month) can be claimed for hired vehicle. Overall travel by four wheeler & two wheeler should not exceed by more than 3000 km/month.</td>
  </tr>
  <?php }elseif($_REQUEST['G']=='J4'){ ?>
  <tr>
   <td style="width:30px;font-size:16px;height:18px;" align="center" valign="top">[a]</td>
   <td style="width:630px;font-size:16px;height:18px;" align="left">Four wheeler entitlements are applicable for personal vehicle or equivalent allowed amount (Rs. 27500/month) can be claimed for hired vehicle. Overall travel by four wheeler & two wheeler should not exceed by more than 3000 km/month.</td>
  </tr>
  <?php } ?>
  <tr>
   <td style="width:30px;font-size:16px;height:18px;" align="center" valign="top">[b]</td>
   <td style="width:630px;font-size:16px;height:18px;" align="left">The changed entitlements will be effective from the policy release date.<?php //echo '1st April '.date("Y");//$SeteD; ?>.</td>
  </tr>
  <tr>
   <td style="width:30px;font-size:16px;height:18px;" align="center" valign="top">[c]</td>
   <td style="width:630px;font-size:16px;height:18px;" align="left">The expense claims on 2 wheeler/4 wheeler is subject to the employee having a valid driving license. The photocopy should be provided to HR.</td>
  </tr>
<?php } else { ?>
  <tr>
   <td style="width:30px;font-size:16px;height:18px;" align="center" valign="top">[a]</td>
   <td style="width:630px;font-size:16px;height:18px;" align="left">The changed entitlements will be effective from the policy release date.<?php //echo '1st April '.date("Y");//$SeteD; ?>.</td>
  </tr>
  <tr>
   <td style="width:30px;font-size:16px;height:18px;" align="center" valign="top">[b]</td>
   <td style="width:630px;font-size:16px;height:18px;" align="left">The expenses claim on 2 wheeler/4 wheeler is subject to the employee having a valid driving license. The photocopy of which shall be provided to HR.</td>
  </tr>
<?php } ?>  

<?php $sPms=mysql_query("select HR_CurrGradeId,HR_GradeId from hrm_employee_pms where EmpPmsId=".$_REQUEST['P']." AND EmployeeID=".$_REQUEST['E'], $con); $rPms=mysql_fetch_assoc($sPms);
      //if(($rPms['HR_CurrGradeId']==66 AND $rPms['HR_GradeId']==67) OR ($rPms['HR_CurrGradeId']==71 AND $rPms['HR_GradeId']==72)){ ?>
  <tr>
   <td style="width:30px;font-size:16px;height:18px;" align="center" valign="top">[c]</td>
   <td style="width:630px;font-size:16px;height:18px;" align="left">The change in insurance coverage slab shall be effective from the next insurance policy renewal date.</td>
  </tr>	  
<?php //} ?>	   



  </table>
  </td>
 </tr>
 </table>
 </td>
</tr>
 </td>
  </table>