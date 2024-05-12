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

<?php if($ResCtc['CONV_Value']>0){?>
<tr>
  <td align="left" style="width:300px;font-size:16px;" id="caA">&nbsp;Conveyance Allowance :</td>
  <td align="left" style="width:180px;font-size:16px;" id="caB">&nbsp;Rs. &nbsp;<?php echo intval($ResCtc['CONV_Value']); ?></td>
</tr>
<?php }if($ResCtc['TA_Value']>0){ ?>
<tr>
  <td align="left" style="width:300px;font-size:16px;" id="caA">&nbsp;TA :</td>
  <td align="left" style="width:180px;font-size:16px;" id="caB">&nbsp;Rs. &nbsp;<?php echo intval($ResCtc['TA_Value']); ?></td>
</tr>
<?php } ?>

<?php if($ResCtc['CAR_ALL_Value']>0){ ?>
<tr>
  <td align="left" style="width:300px;font-size:16px;" id="caA">&nbsp;Car Allowance :</td>
  <td align="left" style="width:180px;font-size:16px;" id="caB">&nbsp;Rs. &nbsp;<?php echo intval($ResCtc['CAR_ALL_Value']); ?></td>
</tr>
<?php } ?>
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

<?php if($ResCtc['BONUS_Value']>0){?>
<tr>
  <td align="left" style="width:300px;font-size:16px;" id="bonusA">&nbsp;Bonus/Exgretia :</td>
  <td align="left" style="width:180px;font-size:16px;" id="bonusB">&nbsp;Rs. &nbsp;<?php echo intval($ResCtc['BONUS_Value']); ?></td>
</tr>
<?php } ?>

<tr>
  <td align="left" style="width:300px;font-size:16px;" id="gratuityA">&nbsp;Estimated Gratuity :</td>
  <td align="left" style="width:180px;font-size:16px;" id="gratuityB">&nbsp;Rs. &nbsp;<?php echo intval($ResCtc['GRATUITY_Value']); ?></td>
</tr>
<tr>
  <td align="left" style="width:300px;font-size:16px;" id="pfcontriA">&nbsp;Employer's PF Contribution :</td>
  <td align="left" style="width:180px;font-size:16px;" id="pfcontriB">&nbsp;Rs. &nbsp;<?php echo intval($ResCtc['PF_Employer_Contri_Annul']); ?></td>
</tr>

<?php if($ResCtc['AnnualESCI']>0){ ?>
<tr>
  <td align="left" style="width:300px;font-size:16px;" id="pfcontriA">&nbsp;Employer's ESIC Contribution :</td>
  <td align="left" style="width:180px;font-size:16px;" id="pfcontriB">&nbsp;Rs. &nbsp;<?php echo intval($ResCtc['AnnualESCI']); ?></td>
</tr>
<?php } if($ResCtc['Mediclaim_Policy']>0){ ?>
<tr>
  <td align="left" style="width:300px;font-size:16px;" id="mppA">&nbsp;Mediclaim Policy Premium :</td>
  <td align="left" style="width:180px;font-size:16px;" id="mppB">&nbsp;Rs. &nbsp;<?php echo intval($ResCtc['Mediclaim_Policy']); ?></td>
</tr>
<?php } ?>
<tr>
  <td align="left" style="width:300px;font-size:16px;">&nbsp;Total Cost to Company :</td>
  <td align="left" style="width:180px;font-size:16px;">&nbsp;Rs. &nbsp;<?php echo intval($ResCtc['Tot_CTC']); ?></td>
</tr>
<?php if($ResCtc['EmpAddBenifit_MediInsu_value']>0 OR $ResCtc['Car_Entitlement']>0) { ?>
<tr>
  <td align="left" style="width:650px;font-size:17px; height:18px;" colspan="3">&nbsp;<b>Additional Benefit</b>
</tr>
<?php } ?>

<?php if($ResCtc['EmpAddBenifit_MediInsu_value']>0) { ?>
<tr>
  <td align="left" style="width:320px;font-size:16px;" id="micA">&nbsp;Mediclaim insurance coverage for Employee, Spouse 2 children :
  <input type="hidden" id="MCS" value="<?php echo $resDaily['MCS']; ?>"/><input type="hidden" id="MCSSP" value="<?php echo $resDaily['MCSSP']; ?>"/> 	
  </td>
  <td align="left" style="width:180px;font-size:16px;" id="micB">&nbsp;Rs. &nbsp;<?php echo intval($ResCtc['EmpAddBenifit_MediInsu_value']); ?></td>
</tr>

<?php } if($ResCtc['Car_Entitlement']>0) { ?>
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
