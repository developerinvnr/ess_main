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
<?php if($_REQUEST['G']=='M3' OR $_REQUEST['G']=='M4' OR $_REQUEST['G']=='M5'){$Cond=' (Approval based)';}
 elseif($_REQUEST['G']=='L1' OR $_REQUEST['G']=='L2' OR $_REQUEST['G']=='L3'){$Cond=' (Need based)';}
 else{$Cond=' (Need based)';} ?>
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
 <?php if($ResEligEmp['DA_Outside_Hq']!='' AND $ResEligEmp['DA_Outside_Hq']!=' '){ ?>
 <tr>
  <td class="tdd1"><b>*</b>&nbsp;&nbsp;<?php if($ResE['DepartmentId']==2){echo 'Fooding Expense'; }else{ echo 'DA Outside HQ'; } ?> :</td>
  <td class="tdd2">: <?php if($ResEligEmp['DA_Outside_Hq']!='' AND $ResEligEmp['DA_Outside_Hq']!=' '){echo '&nbsp;'.$ResEligEmp['DA_Outside_Hq']; }else{ echo '&nbsp;NA';} ?></td>  
 </tr>
 <?php } if($ResEligEmp['DA_Inside_Hq']!='' AND $ResEligEmp['DA_Inside_Hq']!=' '){ ?>
 <tr>
  <td class="tdd1"><b>*</b>&nbsp;&nbsp;DA @ HQ <?php if($ResE['DepartmentId']==3){ echo 'DA at HQ on minimum travel of 40 kms/day'; }elseif($ResE['DepartmentId']==4){ echo 'if the work needs touring for more than 6 hours in a day & as per the applicability of the seasons'; }elseif($ResE['DepartmentId']==24 OR $ResE['DepartmentId']==25){ echo 'if the work needs touring for more than 6 hours in a day'; }elseif($ResE['DepartmentId']==6){ echo 'DA at HQ on minimum travel of 60 kms/day'; } ?> :</td>
  <td class="tdd2">: <?php if($ResEligEmp['DA_Inside_Hq']!='' AND $ResEligEmp['DA_Inside_Hq']!=' '){ echo '&nbsp;'.$ResEligEmp['DA_Inside_Hq'];}else{echo '&nbsp;NA';} ?></td>  
 </tr>
 <?php } ?>
 
 
 <?php //if($ResE['DepartmentId']!=2){ //11 ?>
 
 <?php if($ResEligEmp['Travel_TwoWeeKM']!='' OR $ResEligEmp['LessKm']=='Y' OR ($ResEligEmp['Travel_FourWeeKM']!='' AND $ResEligEmp['Travel_FourWeeKM']!=' ' AND $ResEligEmp['Travel_FourWeeKM']!='0' AND $ResEligEmp['Travel_FourWeeKM']!='NA' AND $ResEligEmp['Travel_FourWeeKM']!=' NA' AND $ResEligEmp['Travel_FourWeeKM']!='NA Per KM' AND $ResEligEmp['Travel_FourWeeKM']!=' NA Per KM' AND $ResEligEmp['Travel_FourWeeKM']!='NA ' AND $ResEligEmp['Travel_FourWeeKM']!='NA  ' AND $ResEligEmp['Travel_FourWeeKM']!='  NA' AND $ResEligEmp['Travel_FourWeeKM']!=' NA ')){ //22?>
 
 <tr>
  <td colspan="2"><b>*</b>&nbsp;&nbsp;Travel Eligibility <font size="4"><b>*</b></font> (For Official Purpose Only)</td>   
 </tr>
 <?php //if($ResEligEmp['Travel_TwoWeeKM']!='' AND ($ResEligEmp['Travel_FourWeeKM']=='' OR $ResEligEmp['Travel_FourWeeKM']==' ' OR $ResEligEmp['Travel_FourWeeKM']=='0' OR $ResEligEmp['Travel_FourWeeKM']=='NA' OR $ResEligEmp['Travel_FourWeeKM']==' NA' OR $ResEligEmp['Travel_FourWeeKM']=='NA Per KM' OR $ResEligEmp['Travel_FourWeeKM']==' NA Per KM' OR $ResEligEmp['Travel_FourWeeKM']=='NA ' OR $ResEligEmp['Travel_FourWeeKM']=='NA  ' OR $ResEligEmp['Travel_FourWeeKM']=='  NA' OR $ResEligEmp['Travel_FourWeeKM']==' NA ')) ?>
 
 <?php if($ResE['DepartmentId']==2 AND ($ResEligEmp['VehiclePolicy']==9 OR $ResEligEmp['VehiclePolicy']==10)){ 
 $sEg=mysql_query("select GradeId from hrm_employee_general where EmployeeID=".$_REQUEST['E'],$con); $rEg=mysql_fetch_assoc($sEg);
 
 $sqPt=mysql_query("select Fn6 from hrm_master_eligibility_policy_tbl".$ResEligEmp['VehiclePolicy']." AND GradeId=".$rEg['GradeId'],$con);
 $rqPt=mysql_fetch_assoc($sqPt);  
 if($rqPt['Fn6']!='' && $rqPt['Fn6']!='.'){ ?>
 <tr>
  <td class="tdd1">&nbsp;&nbsp;a) 2 Wheeler (<?php echo $rqPt['Fn6']; ?>)</td>
  <td class="tdd2"> : &nbsp;Applicable</td>  
 </tr>
 <?php } //if($rqPt['Fn6']!='' && $rqPt['Fn6']!='.') ?>
 <?php }else{ ?>
 
 <?php if($ResEligEmp['Travel_TwoWeeKM']!='' AND $ResEligEmp['Travel_TwoWeeKM']!='0' AND $ResEligEmp['Travel_TwoWeeKM']!='NA'){ ?>
 <tr>
  <td class="tdd1">&nbsp;&nbsp;a) 2 Wheeler (<?php if($ResE['DepartmentId']==2){echo 'As per R&D vehicle policy';}else{?><?php echo '<b>Rs&nbsp;'.$ResEligEmp['Travel_TwoWeeKM'].'/KM';?> <?php if($ResEligEmp['Travel_TwoWeeLimitPerDay']!='' AND $ResEligEmp['Travel_TwoWeeLimitPerDay']!=0 AND $ResEligEmp['Travel_TwoWeeLimitPerDay']!='NA'){ echo '&nbsp;-&nbsp;'; if($ResE['DepartmentId']!=4){ if($ResE['DepartmentId']==2 OR ($ResE['DepartmentId']==5 AND ($_REQUEST['G']=='M4' OR $_REQUEST['G']=='M5')) OR $_REQUEST['G']=='L1' OR $_REQUEST['G']=='L2' OR $_REQUEST['G']=='L3' OR $_REQUEST['G']=='L4' OR $_REQUEST['G']=='L5' OR $_REQUEST['G']=='MG'){echo 'Min';}else{echo 'Max'; echo ':&nbsp;'.$ResEligEmp['Travel_TwoWeeLimitPerDay'].'KM/Day'; } ?> <?php echo '&nbsp;-&nbsp;'.$ResEligEmp['Travel_TwoWeeLimitPerMonth'].'KM/Month'; } echo '</b>'; } ?><?php } ?>)</td>
  <td class="tdd2"> : <?php if($ResEligEmp['Travel_TwoWeeKM']!=''){echo '&nbsp;Applicable';} else {echo '&nbsp;NA';}?></td>  
 </tr>
 <?php } ?>
 
 <?php } //else ?>
 
 
 <?php /*if($ResEligEmp['LessKm']=='Y'){ ?>
 <tr>
  <td class="tdd1">&nbsp;&nbsp;b) <?php if($ResEligEmp['CostOfVehicle']=='0.65 Lacs'){echo '2';}else{echo '4';} ?> Wheeler (<font style="font-size:12px;">Fuel expense reimbursement on Actual on submission of bill</font>)</td>
  <td class="tdd2"> : <?php echo '&nbsp;Applicable'; ?></td>  
 </tr>
 <?php }else{ */?>
 
 <?php if($ResEligEmp['Travel_FourWeeKM']!='' AND $ResEligEmp['Travel_FourWeeKM']!=' ' AND $ResEligEmp['Travel_FourWeeKM']!='0' AND $ResEligEmp['Travel_FourWeeKM']!='NA' AND $ResEligEmp['Travel_FourWeeKM']!=' NA' AND $ResEligEmp['Travel_FourWeeKM']!='NA Per KM' AND $ResEligEmp['Travel_FourWeeKM']!=' NA Per KM' AND $ResEligEmp['Travel_FourWeeKM']!='NA ' AND $ResEligEmp['Travel_FourWeeKM']!='NA  ' AND $ResEligEmp['Travel_FourWeeKM']!='  NA' AND $ResEligEmp['Travel_FourWeeKM']!=' NA '){ ?>
 <tr>
  <td class="tdd1">&nbsp;&nbsp;b) 4 Wheeler (<?php if($ResE['DepartmentId']==2){echo 'As per R&D vehicle policy';}else{?><?php if($ResEligEmp['Travel_FourWeeKM']!='' AND $ResEligEmp['Travel_FourWeeKM']!=' ' AND $ResEligEmp['Travel_FourWeeKM']!='0' AND $ResEligEmp['Travel_FourWeeKM']!='NA' AND $ResEligEmp['Travel_FourWeeKM']!=' NA' AND $ResEligEmp['Travel_FourWeeKM']!='NA Per KM' AND $ResEligEmp['Travel_FourWeeKM']!=' NA Per KM' AND $ResEligEmp['Travel_FourWeeKM']!='NA ' AND $ResEligEmp['Travel_FourWeeKM']!='NA  ' AND $ResEligEmp['Travel_FourWeeKM']!='  NA' AND $ResEligEmp['Travel_FourWeeKM']!=' NA '){echo '<b>Rs&nbsp;'.$ResEligEmp['Travel_FourWeeKM'].'/KM';?> 
  <?php if($ResEligEmp['Travel_FourWeeLimitPerMonth']!='' AND $ResEligEmp['Travel_FourWeeLimitPerMonth']!=0 AND $ResEligEmp['Travel_FourWeeLimitPerMonth']!='NA'){ echo '&nbsp;-&nbsp;'; if($ResE['DepartmentId']==2 OR ($ResE['DepartmentId']==5 AND ($_REQUEST['G']=='M4' OR $_REQUEST['G']=='M5')) OR $_REQUEST['G']=='L1' OR $_REQUEST['G']=='L2' OR $_REQUEST['G']=='L3' OR $_REQUEST['G']=='L4' OR $_REQUEST['G']=='L5' OR $_REQUEST['G']=='MG'){echo 'Min';}else{echo 'Max';} ?> <?php echo ':&nbsp;'; if($ResEligEmp['Travel_FourWeeLimitPerMonth']>0){$PerAnnum=$ResEligEmp['Travel_FourWeeLimitPerMonth']*12;}elseif($ResEligEmp['Travel_FourWeeLimitPerMonth']=='Actual'){$PerAnnum='Actual';}elseif($ResEligEmp['Travel_FourWeeLimitPerMonth']==''){$PerAnnum='';}echo '<b>'.$ResEligEmp['Travel_FourWeeLimitPerMonth'].'KM/Month'; } if($ResE['DepartmentId']==2 OR ($ResE['DepartmentId']==5 AND ($_REQUEST['G']=='M4' OR $_REQUEST['G']=='M5')) OR $_REQUEST['G']=='L1' OR $_REQUEST['G']=='L2' OR $_REQUEST['G']=='L3' OR $_REQUEST['G']=='L4' OR $_REQUEST['G']=='L5' OR $_REQUEST['G']=='MG'){echo '';}else{ echo '&nbsp;-&nbsp;'.$PerAnnum.'KM/Annum';} } ?><?php } ?>)</td>
  <td class="tdd2"> : <?php if($ResEligEmp['Travel_FourWeeKM']!='' AND $ResEligEmp['Travel_FourWeeKM']!=' ' AND $ResEligEmp['Travel_FourWeeKM']!='0' AND $ResEligEmp['Travel_FourWeeKM']!='NA' AND $ResEligEmp['Travel_FourWeeKM']!=' NA' AND $ResEligEmp['Travel_FourWeeKM']!='NA Per KM' AND $ResEligEmp['Travel_FourWeeKM']!=' NA Per KM' AND $ResEligEmp['Travel_FourWeeKM']!='NA ' AND $ResEligEmp['Travel_FourWeeKM']!='NA  ' AND $ResEligEmp['Travel_FourWeeKM']!='  NA' AND $ResEligEmp['Travel_FourWeeKM']!=' NA '){echo '&nbsp;Applicable';} else {echo '&nbsp;NA';}?></td>  
 </tr>
 <?php } ?>
 
 <?php //} ?>
 <?php } //22 ?>
 <?php //} //11 ?>
 
 <?php if($ResEligEmp['Mode_Travel_Outside_Hq']!=''){ ?>
 <tr>
  <td class="tdd1"><b>*</b>&nbsp;&nbsp;Mode of Travel outside HQ</td>
  <td class="tdd2"> : &nbsp;<?php echo $ResEligEmp['Mode_Travel_Outside_Hq'];
  
  //if(trim($ResEligEmp['Mode_Travel_Outside_Hq'])=='Flight'){echo $ResEligEmp['Mode_Travel_Outside_Hq'].''.$Cond;}elseif($ResEligEmp['Mode_Travel_Outside_Hq']!=''){echo $ResEligEmp['Mode_Travel_Outside_Hq'];}else{echo 'NA';}
  
  //if($ResEligEmp['Mode_Travel_Outside_Hq']!=''){echo $ResEligEmp['Mode_Travel_Outside_Hq'];}else{echo 'NA';}?></td>  
 </tr>
 <?php } if($ResEligEmp['Mode_Travel_Outside_Hq']!=''){ ?>
 <tr>
  <td class="tdd1"><b>*</b>&nbsp;&nbsp;Travel Class</td>
  <td class="tdd2"> : &nbsp;<?php if($ResEligEmp['Mode_Travel_Outside_Hq']!=''){echo $ResEligEmp['TravelClass_Outside_Hq'];}else{echo 'NA';}?></td>  
 </tr>
 <?php } if($ResEligEmp['Mobile_Exp_Rem_Rs']!=''){ ?>
 <tr>
  <td class="tdd1"><b>*</b>&nbsp;&nbsp;Mobile expenses Reimbursement :</td>
  <td class="tdd2"> : &nbsp;<?php if($ResEligEmp['Mobile_Exp_Rem_Rs']!=''){ if($ResEligEmp['Mobile_Exp_Rem_Rs']!='Actual'){echo 'Rs.&nbsp;';} echo $ResEligEmp['Mobile_Exp_Rem_Rs'].'/-';if($ResEligEmp['Prd']=='Mnt'){echo 'Monthly';}elseif($ResEligEmp['Prd']=='Qtr'){echo 'Quarter';}elseif($ResEligEmp['Prd']=='1/2 Yearly'){echo '1/2 Yearly';}elseif($ResEligEmp['Prd']=='Yearly'){echo 'Yearly';} }else{echo 'NA';}?></td>
 </tr>
 <?php } if($ResEligEmp['Mobile_Company_Hand']=='Y' OR ($ResEligEmp['Mobile_Hand_Elig_Rs']!='' AND $ResEligEmp['Mobile_Hand_Elig_Rs']!='NA')){ 
 
 $sE=mysql_query("select CompanyId,DepartmentId,GradeId from hrm_employee e inner join hrm_employee_general g on e.EmployeeID=g.EmployeeID where e.EmployeeID=".$_REQUEST['E'],$con); $rE=mysql_fetch_assoc($sE);
 $sqlGp=mysql_query("select Mobile,Mobile_WithGPS from hrm_master_eligibility where DepartmentId=".$rE['DepartmentId']." AND CompanyId=".$rE['CompanyId']." AND GradeId=".$rE['GradeId']."",$con); $resGp=mysql_fetch_assoc($sqlGp);
 ?>
 <tr>
  <td class="tdd1"><b>*</b>&nbsp;&nbsp;Mobile Handset Eligibility (<?php if($ResEligEmp['GPSSet']=='Y'){echo 'Once in 2 yrs';}elseif($resGp['Mobile']!=$resGp['Mobile_WithGPS'] AND $resGp['Mobile_WithGPS']==$ResEligEmp['Mobile_Hand_Elig_Rs']){echo 'Once in 2 yrs';}else{echo 'Once in 3 yrs';}?>)</td>
  <td class="tdd2"> : &nbsp;<?php if($ResEligEmp['Mobile_Company_Hand']=='Y'){ echo 'Company Handset';} elseif($ResEligEmp['Mobile_Company_Hand']=='N' AND $ResEligEmp['Mobile_Hand_Elig_Rs']!=''){ if($ResEligEmp['Mobile_Hand_Elig_Rs']!='Actual' AND $ResEligEmp['Mobile_Hand_Elig_Rs']!='Actual/ blackberry') {echo 'Rs.&nbsp;';} echo $ResEligEmp['Mobile_Hand_Elig_Rs']; if($ResEligEmp['Mobile_Hand_Elig_Rs']!='Actual' AND $ResEligEmp['Mobile_Hand_Elig_Rs']!='Actual/ blackberry') {echo '/-';}}else{echo 'NA';} ?></td>  
 </tr>
 <?php } ?>
 
 <?php /*?><tr>
  <td class="tdd1"><b>*</b>&nbsp;&nbsp;Misc. expenses(like stationery/photocopy/fax/e-mail/etc) </td>
  <td class="tdd2"> : &nbsp;<?php if($ResEligEmp['Misc_Expenses']=='Y'){echo 'Actual';}else{echo 'NA';}?></td>  
 </tr><?php */?>
 
<?php if($ResCtc['ESCI']>0){ echo ''; } else {?>
 <tr>
  <td class="tdd1"><b>*</b>&nbsp;&nbsp;Mediclaim Policy Premium  </td>
  <td class="tdd2"> : &nbsp;<?php if($ResEligEmp['Health_Insurance']>0 AND $ResEligEmp['Health_Insurance']!=''){ if($ResEligEmp['Health_Insurance']==100000.00){echo '1 Lakh';}elseif($ResEligEmp['Health_Insurance']==200000.00){echo '2 Lakhs';}elseif($ResEligEmp['Health_Insurance']==300000.00){echo '3 Lakhs';} elseif($ResEligEmp['Health_Insurance']==500000.00){echo '5 Lakhs';} elseif($ResEligEmp['Health_Insurance']==500000.00){echo '5 Lakhs';} elseif($ResEligEmp['Health_Insurance']==600000.00){echo '6 Lakhs';} elseif($ResEligEmp['Health_Insurance']==800000.00){echo '8 Lakhs';} elseif($ResEligEmp['Health_Insurance']==900000.00){echo '9 Lakhs';} elseif($ResEligEmp['Health_Insurance']==1000000.00){echo '10 Lakhs';} } else {echo 'NA';}?></td>  
 </tr>
<?php } ?>


<?php $sEG=mysql_query("select HR_GradeId,HR_CurrGradeId,CompanyId from hrm_employee_pms where EmpPmsId=".$_REQUEST['P'],$con); $rEG=mysql_fetch_assoc($sEG);

if($rEG['CompanyId']==1)
{ 
if($rEG['HR_GradeId']>0){ $ggId=$rEG['HR_GradeId']; }else{ $ggId=$rEG['HR_CurrGradeId']; }

?>
 <tr>
  <td class="tdd1"><b>*</b>&nbsp;&nbsp;Group Personal Accident Insurance  </td>
  <td class="tdd2"> : &nbsp;<?php if($ggId==61 || $ggId==62 ){echo '05 Lakhs';}elseif($ggId==63 || $ggId==64 || $ggId==65 || $ggId==66){echo '10 Lakhs';}elseif($ggId==67 || $ggId==68 || $ggId==69 || $ggId==70|| $ggId==71){ echo '25 Lakhs';}elseif($ggId==72 || $ggId==73 || $ggId==74 || $ggId==75|| $ggId==76){ echo '50 Lakhs';} ?></td>  
 </tr>
<?php } ?>




<?php if($ResEligEmp['HelthCheck']=='Y'){ ?>
 <tr>
  <td class="tdd1"><b>*</b>&nbsp;&nbsp;Executive Health Check-up (Once in 2 yrs)</td>
  <td class="tdd2"> : &nbsp;<?php if($resDaily['HelthChekUp']!=''){echo 'Rs.&nbsp;'.$resDaily['HelthChekUp'].'/-';}else{echo 'NA';}?></td>  
 </tr>
<?php } ?> 



<?php $vehiclaCose='';

$SeG=mysql_query("select HR_GradeId,HR_CurrGradeId from hrm_employee_pms where EmpPmsId=".$_REQUEST['P'],$con); 
      $ReG=mysql_fetch_assoc($SeG); if($ReG['HR_GradeId']>0){$GrdId=$ReG['HR_GradeId'];}else{$GrdId=$ReG['HR_CurrGradeId'];}
?>
<?php if($ResEligEmp['VehiclePolicy']>0){ 
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

?>

<?php } //if($ResEligEmp['VehiclePolicy']>0)?>


<?php if($vehiclaCose!='' AND $vehiclaCose!='0'){ ?>
 <tr>
  <td class="tdd1"><b>*</b>&nbsp;&nbsp;Vehicle entitlement value (Applicability as per vehicle policy): </td>
  <td class="tdd2"> : &nbsp;<?php echo $vehiclaCose; ?></td>
 </tr>
<?php } ?> 

<?php /*if($ResEligEmp['CostOfVehicle']!='' AND $ResEligEmp['CostOfVehicle']>0){ ?>
 <tr>
  <td class="tdd1"><b>*</b>&nbsp;&nbsp;Vehicle entitlement value : </td>
  <td class="tdd2"> : &nbsp;<?php echo $ResEligEmp['CostOfVehicle']; ?> (Applicability as per vehicle policy)</td>
 </tr>
<?php } */?> 



<?php /*$sCtc=mysql_query("SELECT BONUS_Value FROM hrm_employee_ctc WHERE EmployeeID=".$_REQUEST['E']." AND Status='A'",$con);      $rCtc=mysql_fetch_assoc($sCtc); if($rCtc['BONUS_Value']>0){ ?>
 <tr>
  <td class="tdd1"><b>*</b>&nbsp;&nbsp;Bonus(yearly)</td>
  <td class="tdd2"> : &nbsp;As Per Law</td>  
 </tr>
<?php } */?> 
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
   <td style="width:630px;font-size:16px;height:18px;" align="left">Four wheeler entitlements are applicable for personal vehicle or equivalent allowed amount (Rs. 17000/month) can be claimed for hired vehicle. Overall travel by four wheeler & two wheeler should not exceed by more then 3000 km/month.</td>
  </tr>
  <?php }elseif($_REQUEST['G']=='J4'){ ?>
  <tr>
   <td style="width:30px;font-size:16px;height:18px;" align="center" valign="top">[a]</td>
   <td style="width:630px;font-size:16px;height:18px;" align="left">Four wheeler entitlements are applicable for personal vehicle or equivalent allowed amount (Rs. 17000/month) can be claimed for hired vehicle. Overall travel by four wheeler & two wheeler should not exceed by more then 3000 km/month.</td>
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