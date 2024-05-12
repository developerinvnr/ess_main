<?php 
if($chke==1){ $eei=$ENew; }else{ $eei=$_REQUEST['E']; }
$sqlMx = mysql_query("SELECT MAX(CtcCreatedDate) as SalDate FROM hrm_employee_ctc where EmployeeID=".$eei." AND CtcCreatedDate='".date("Y-01-01")."'", $con); $resMx = mysql_fetch_assoc($sqlMx); 
$Sql2Ctc=mysql_query("SELECT * FROM hrm_employee_ctc WHERE EmployeeID=".$eei." AND CtcCreatedDate='".$resMx['SalDate']."'", $con); $Res2Ctc=mysql_fetch_assoc($Sql2Ctc); $rowchk = mysql_num_rows($Sql2Ctc);

$sql2chk = mysql_query("SELECT * FROM hrm_employee_ctc where EmployeeID=".$eei." AND CtcCreatedDate='".date("Y-01-02")."'", $con); $row2chk = mysql_num_rows($sql2chk); 

?>

<table border="0">
 <tr><td style="width:50px;">&nbsp;</td>
  <td style="width:685px;font-size:18px;text-align:justify;">
<table border="1" width="685" id="TEmp" cellspacing="1">
<tr>
  <td align="left" style="width:600px;font-size:17px; height:18px;" colspan="<?php if($rowchk>0 && $row2chk==0){ echo 3;}else{echo 0;}?>">&nbsp;<b>[A] Monthly Components</b></td>
  <?php /************/ if($rowchk>0 && $row2chk>0){ ?>
  <td align="center">&nbsp;<b>Increased CTC Structure<br>(X)</b></td>
  <td align="center" style="width:180px;">&nbsp;<b>CTC Structure Post PF Changs<br>(Y) </b></td>
  <?php /************/ } ?>
</tr>
<tr>
  <td align="left" style="width:300px;font-size:16px;">&nbsp;<span id="BasSti"><input type="hidden" value="B" name="Basic"/><?php if($ResCtc['BAS']=='Y' AND $ResCtc['BAS_Value']>0) { echo 'Basic'; } elseif($ResCtc['STIPEND']=='Y' AND $ResCtc['STIPEND_Value']>0) { echo 'Stipend'; }?></span> :
  </td>
  <?php /************/  if($rowchk>0 && $row2chk>0){ ?>
   <td align="left" style="width:180px;font-size:16px;">&nbsp;Rs. &nbsp;<?php echo intval($Res2Ctc['BAS_Value']);?></td>  
  <?php /************/  } ?>
<td align="left" style="width:180px;font-size:16px;">&nbsp;Rs. &nbsp;<?php if($ResCtc['BAS']=='Y' AND $ResCtc['BAS_Value']>0) { echo intval($ResCtc['BAS_Value']); } elseif($ResCtc['STIPEND']=='Y' AND $ResCtc['STIPEND_Value']>0) { echo intval($ResCtc['STIPEND_Value']); }?></td>

</tr>
<tr>
  <td align="left" style="width:300px;font-size:16px;" id="hraA">&nbsp;HRA :</td>
  <?php /************/  if($rowchk>0 && $row2chk>0){ ?>
  <td align="left" style="width:180px;font-size:16px;" id="hraB">&nbsp;Rs. &nbsp;<?php echo intval($Res2Ctc['HRA_Value']); ?>
  </td>
  <?php /************/  } ?>
  <td align="left" style="width:180px;font-size:16px;" id="hraB">&nbsp;Rs. &nbsp;<?php echo intval($ResCtc['HRA_Value']); ?>
  </td>
</tr>
<?php if($ResCtc['CONV_Value']>0){?>
<tr>
  <td align="left" style="width:300px;font-size:16px;" id="caA">&nbsp;Conveyance Allowance :</td>
  <?php /************/  if($rowchk>0 && $row2chk>0){ ?>
  <td align="left" style="width:180px;font-size:16px;" id="caB">&nbsp;Rs. &nbsp;<?php echo intval($Res2Ctc['CONV_Value']); ?>
  <?php /************/  } ?>
  <td align="left" style="width:180px;font-size:16px;" id="caB">&nbsp;Rs. &nbsp;<?php echo intval($ResCtc['CONV_Value']); ?></td> 
</tr>
<?php }if($ResCtc['TA_Value']>0){ ?>
<tr>
  <td align="left" style="width:300px;font-size:16px;" id="caA">&nbsp;TA :</td>
  <?php /************/  if($rowchk>0 && $row2chk>0){ ?>
  <td align="left" style="width:180px;font-size:16px;" id="caB">&nbsp;Rs. &nbsp;<?php echo intval($Res2Ctc['TA_Value']); ?></td>
  <?php /************/  } ?>
  <td align="left" style="width:180px;font-size:16px;" id="caB">&nbsp;Rs. &nbsp;<?php echo intval($ResCtc['TA_Value']); ?></td>
</tr>
<?php } ?>

<?php if($ResCtc['CAR_ALL_Value']>0){ ?>
<tr>
  <td align="left" style="width:300px;font-size:16px;" id="caA">&nbsp;Car Allowance :</td>
  <?php /************/  if($rowchk>0 && $row2chk>0){ ?>
  <td align="left" style="width:180px;font-size:16px;" id="caB">&nbsp;Rs. &nbsp;<?php echo intval($Res2Ctc['CAR_ALL_Value']); ?></td>
  <?php /************/  } ?>
  <td align="left" style="width:180px;font-size:16px;" id="caB">&nbsp;Rs. &nbsp;<?php echo intval($ResCtc['CAR_ALL_Value']); ?></td>
</tr>
<?php } ?>

<?php if($ResCtc['Bonus_Month']>0){?>
<tr>
  <td align="left" style="width:300px;font-size:16px;" id="saA">&nbsp;Bonus :</td>
  <?php /************/  if($rowchk>0 && $row2chk>0){ ?>
  <td align="left" style="width:180px;font-size:16px;" id="saB">&nbsp;Rs. &nbsp;<?php echo intval($Res2Ctc['Bonus_Month']); ?></td>
  <?php /************/  } ?>
  <td align="left" style="width:180px;font-size:16px;" id="saB">&nbsp;Rs. &nbsp;<?php echo intval($ResCtc['Bonus_Month']); ?></td>
</tr>
<?php } ?>

<tr>
  <td align="left" style="width:300px;font-size:16px;" id="saA">&nbsp;Special Allowance :</td>
  <?php /************/  if($rowchk>0 && $row2chk>0){ ?>
  <td align="left" style="width:180px;font-size:16px;" id="saB">&nbsp;Rs. &nbsp;<?php echo intval($Res2Ctc['SPECIAL_ALL_Value']); ?></td>
  <?php /************/  } ?>
  <td align="left" style="width:180px;font-size:16px;" id="saB">&nbsp;Rs. &nbsp;<?php echo intval($ResCtc['SPECIAL_ALL_Value']); ?></td>
</tr>
<tr>
  <td align="left" style="width:300px;font-size:16px;">&nbsp;Gross Monthly Salary :</td>
  <?php /************/  if($rowchk>0 && $row2chk>0){ ?>
  <td align="left" style="width:180px;font-size:16px;">&nbsp;Rs. &nbsp;<?php echo intval($Res2Ctc['Tot_GrossMonth']); ?></td>
  <?php /************/  } ?>
  <td align="left" style="width:180px;font-size:16px;">&nbsp;Rs. &nbsp;<?php echo intval($ResCtc['Tot_GrossMonth']); ?></td>
</tr>
<?php if($ResCtc['Tot_GrossMonth']!=$ResCtc['GrossSalary_PostAnualComponent_Value'] AND $ResCtc['GrossSalary_PostAnualComponent_Value']>0) { ?>
<tr>
  <td align="left" style="width:300px;font-size:16px;">&nbsp;Gross Monthly Salary (Post Annual Components) :</td>
  <?php /************/  if($rowchk>0 && $row2chk>0){ ?>
  <td align="left" style="width:180px;font-size:16px;">&nbsp;Rs. &nbsp;<?php echo intval($Res2Ctc['GrossSalary_PostAnualComponent_Value']); ?></td>
  <?php /************/  } ?>
  <td align="left" style="width:180px;font-size:16px;">&nbsp;Rs. &nbsp;<?php echo intval($ResCtc['GrossSalary_PostAnualComponent_Value']); ?></td>
</tr>
<?php } ?>
<tr>
  <td align="left" style="width:300px;font-size:16px;" id="pfA">&nbsp;Provident Fund :</td>
  <?php /************/  if($rowchk>0 && $row2chk>0){ ?>
  <td align="left" style="width:180px;font-size:16px;" id="pfB">&nbsp;Rs. &nbsp;<?php echo intval($Res2Ctc['PF_Employee_Contri_Value']); ?></td>
  <?php /************/  } ?>
  <td align="left" style="width:180px;font-size:16px;" id="pfB">&nbsp;Rs. &nbsp;<?php echo intval($ResCtc['PF_Employee_Contri_Value']); ?></td>
</tr>

<?php if($ResCtc['ESCI']>0){ ?>
<tr>
  <td align="left" style="width:300px;font-size:16px;" id="pfA">&nbsp;ESIC :</td>
  <?php /************/  if($rowchk>0 && $row2chk>0){ ?>
  <td align="left" style="width:180px;font-size:16px;" id="pfB">&nbsp;Rs. &nbsp;<?php echo intval($Res2Ctc['ESCI']); ?></td>
  <?php /************/  } ?>
  <td align="left" style="width:180px;font-size:16px;" id="pfB">&nbsp;Rs. &nbsp;<?php echo intval($ResCtc['ESCI']); ?></td>
</tr>
<?php } ?>


<?php if($ResCtc['NPS_Value']>0){ ?>
<tr>
  <td align="left" style="width:300px;font-size:16px;" id="pfA">&nbsp;NPS Contribution :</td>
  <?php /************/  if($rowchk>0 && $row2chk>0){ ?>
  <td align="left" style="width:180px;font-size:16px;" id="pfB">&nbsp;Rs. &nbsp;<?php echo intval($Res2Ctc['NPS_Value']); ?></td>
  <?php /************/  } ?>
  <td align="left" style="width:180px;font-size:16px;" id="pfB">&nbsp;Rs. &nbsp;<?php echo intval($ResCtc['NPS_Value']); ?></td>
</tr>
<?php } ?>

<tr>
  <td align="left" style="width:300px;font-size:16px;">&nbsp;Net Monthly Salary :</td>
  <?php /************/  if($rowchk>0 && $row2chk>0){ ?>
  <td align="left" style="width:180px;font-size:16px;">&nbsp;Rs. &nbsp;<?php echo intval($Res2Ctc['NetMonthSalary_Value']); ?>
  <?php /************/  } ?>
  <td align="left" style="width:180px;font-size:16px;">&nbsp;Rs. &nbsp;<?php echo intval($ResCtc['NetMonthSalary_Value']); ?></td>
</tr>
<tr>
  <td align="left" style="width:650px;font-size:17px; height:18px;" colspan="3">&nbsp;<b>[B] Annual Components (Tax saving components which shall be reimbursed on production of documents)</b></td>
</tr>
<?php if($ResCtc['MED_REM_Value']>0){ ?>
<tr>
  <td align="left" style="width:300px;font-size:16px;" id="mrA">&nbsp;Medical Reimbursement :</td>
  <?php /************/  if($rowchk>0 && $row2chk>0){ ?>
  <td align="left" style="width:180px;font-size:16px;" id="mrB">&nbsp;Rs. &nbsp;<?php echo intval($Res2Ctc['MED_REM_Value']); ?></td>
  <?php /************/  } ?>
  <td align="left" style="width:180px;font-size:16px;" id="mrB">&nbsp;Rs. &nbsp;<?php echo intval($ResCtc['MED_REM_Value']); ?></td>
</tr>
<?php } ?>
<tr>
  <td align="left" style="width:300px;font-size:16px;" id="ltaA">&nbsp;Leave Travel Allowance :</td>
  <?php /************/  if($rowchk>0 && $row2chk>0){ ?>
  <td align="left" style="width:180px;font-size:16px;" id="ltaB">&nbsp;Rs. &nbsp;<?php echo intval($Res2Ctc['LTA_Value']); ?></td>
  <?php /************/  } ?>
  <td align="left" style="width:180px;font-size:16px;" id="ltaB">&nbsp;Rs. &nbsp;<?php echo intval($ResCtc['LTA_Value']); ?></td>
</tr>
<tr>
  <td align="left" style="width:300px;font-size:16px;" id="ceaA">&nbsp;Children Education Allow. :&nbsp;&nbsp;<?php $OneChild=$ResStat['CEA_PerChildMonth']*12; $TwoChild=$OneChild*2;?>
                                                   Child1 :<input type="checkbox" name="CheckC1" id="CheckC1" onClick="FunChild1()" disabled <?php if($ResCtc['CHILD_EDU_ALL_Value']==$OneChild OR $ResCtc['CHILD_EDU_ALL_Value']==$TwoChild){echo 'checked';} ?> />&nbsp;
                                                   Child2 :<input type="checkbox" name="CheckC2" id="CheckC2" onClick="FunChild2()" disabled <?php if($ResCtc['CHILD_EDU_ALL_Value']==$TwoChild){echo 'checked';} ?> /></td>
  <?php /************/  if($rowchk>0 && $row2chk>0){ ?>
  <td align="left" style="width:180px;font-size:16px;" id="ceaB">&nbsp;Rs. &nbsp;<?php echo intval($Res2Ctc['CHILD_EDU_ALL_Value']); ?></td>
  <?php /************/  } ?>
  <td align="left" style="width:180px;font-size:16px;" id="ceaB">&nbsp;Rs. &nbsp;<?php echo intval($ResCtc['CHILD_EDU_ALL_Value']); ?></td>
</tr>
<tr>
  <td align="left" style="width:300px;font-size:16px;">&nbsp;Annual Gross Salary :</td>
  <?php /************/  if($rowchk>0 && $row2chk>0){ ?>
  <td align="left" style="width:180px;font-size:16px;">&nbsp;Rs. &nbsp;<?php echo intval($Res2Ctc['Tot_Gross_Annual']); ?></td>
  <?php /************/  } ?>
  <td align="left" style="width:180px;font-size:16px;">&nbsp;Rs. &nbsp;<?php echo intval($ResCtc['Tot_Gross_Annual']); ?></td>
</tr>
<tr>
  <td align="left" style="width:650px;font-size:17px; height:18px;" colspan="3">&nbsp;<b>[C] Other Annual Components (Statutory components)
</tr>

<tr>
  <td align="left" style="width:300px;font-size:16px;" id="gratuityA">&nbsp;Estimated Gratuity :</td>
  <?php /************/  if($rowchk>0 && $row2chk>0){ ?>
  <td align="left" style="width:180px;font-size:16px;" id="gratuityB">&nbsp;Rs. &nbsp;<?php echo intval($Res2Ctc['GRATUITY_Value']); ?></td>
  <?php /************/  } ?>
  <td align="left" style="width:180px;font-size:16px;" id="gratuityB">&nbsp;Rs. &nbsp;<?php echo intval($ResCtc['GRATUITY_Value']); ?></td>
</tr>
<tr>
  <td align="left" style="width:300px;font-size:16px;" id="pfcontriA">&nbsp;Employer's PF Contribution :</td>
  <?php /************/  if($rowchk>0 && $row2chk>0){ ?>
  <td align="left" style="width:180px;font-size:16px;" id="pfcontriB">&nbsp;Rs. &nbsp;<?php echo intval($Res2Ctc['PF_Employer_Contri_Annul']); ?></td>
  <?php /************/  } ?>
  <td align="left" style="width:180px;font-size:16px;" id="pfcontriB">&nbsp;Rs. &nbsp;<?php echo intval($ResCtc['PF_Employer_Contri_Annul']); ?></td>
</tr>

<?php if($ResCtc['AnnualESCI']>0){ ?>
<tr>
  <td align="left" style="width:300px;font-size:16px;" id="pfcontriA">&nbsp;Employer's ESIC Contribution :</td>
  <?php /************/  if($rowchk>0 && $row2chk>0){ ?>
  <td align="left" style="width:180px;font-size:16px;" id="pfcontriB">&nbsp;Rs. &nbsp;<?php echo intval($Res2Ctc['AnnualESCI']); ?></td>
  <?php /************/  } ?>
  <td align="left" style="width:180px;font-size:16px;" id="pfcontriB">&nbsp;Rs. &nbsp;<?php echo intval($ResCtc['AnnualESCI']); ?></td>
</tr>
<?php } if($ResCtc['Mediclaim_Policy']>0){ ?>
<tr>
  <td align="left" style="width:300px;font-size:16px;" id="mppA">&nbsp;Mediclaim Policy Premium :</td>
  <?php /************/  if($rowchk>0 && $row2chk>0){ ?>
  <td align="left" style="width:180px;font-size:16px;" id="mppB">&nbsp;Rs. &nbsp;<?php echo intval($Res2Ctc['Mediclaim_Policy']); ?></td>
  <?php /************/  } ?>
  <td align="left" style="width:180px;font-size:16px;" id="mppB">&nbsp;Rs. &nbsp;<?php echo intval($ResCtc['Mediclaim_Policy']); ?></td>
</tr>
<?php } ?>
<tr><td colspan="3"></td></tr>
<tr>
  <td align="left" style="width:300px;font-size:16px;">&nbsp;<b>Total Cost to Company :</b></td>
  <?php /************/  if($rowchk>0 && $row2chk>0){ ?>
  <td align="left" style="width:180px;font-size:16px;">&nbsp;Rs. &nbsp;<?php echo intval($Res2Ctc['Tot_CTC']); ?></td>
  <?php /************/  } ?>  
  <td align="left" style="width:180px;font-size:16px;">&nbsp;Rs. &nbsp;<?php echo intval($ResCtc['Tot_CTC']); ?></td>
</tr>
<?php /* if($ResCtc['EmpAddBenifit_MediInsu_value']>0 OR $ResCtc['Car_Entitlement']>0) { ?>
<tr>
  <td align="left" style="width:650px;font-size:17px; height:18px;" colspan="3">&nbsp;<b>Additional Benefit</b></td>
</tr>
<?php } */ ?>

<?php /*if($ResCtc['EmpAddBenifit_MediInsu_value']>0) { ?>
<tr>
  <td align="left" style="width:320px;font-size:16px;" id="micA">&nbsp;Mediclaim insurance coverage for Employee, Spouse 2 children :
  <input type="hidden" id="MCS" value="<?php echo $resDaily['MCS']; ?>"/><input type="hidden" id="MCSSP" value="<?php echo $resDaily['MCSSP']; ?>"/> 	
  </td>
  <?php /************  if($rowchk>0 && $row2chk>0){ ?>
  <td align="left" style="width:180px;font-size:16px;" id="micB">&nbsp;Rs. &nbsp;<?php echo intval($Res2Ctc['EmpAddBenifit_MediInsu_value']); ?></td>
  <?php /************  } ?>  
  <td align="left" style="width:180px;font-size:16px;" id="micB">&nbsp;Rs. &nbsp;<?php echo intval($ResCtc['EmpAddBenifit_MediInsu_value']); ?></td>
</tr>

<?php } */ /*if($ResCtc['Car_Entitlement']>0) { ?>
<tr>
  <td align="left" style="width:320px;font-size:16px;" id="micA">&nbsp;Car entitlement as per car policy :
  <input type="hidden" id="MCS" value="<?php echo $resDaily['MCS']; ?>"/><input type="hidden" id="MCSSP" value="<?php echo $resDaily['MCSSP']; ?>"/> 	
  </td>
  <?php /************  if($rowchk>0 && $row2chk>0){ ?>
  <td align="left" style="width:180px;font-size:16px;" id="micB">&nbsp;Rs. &nbsp;<?php echo intval($Res2Ctc['Car_Entitlement']); ?></td>
  <?php /************  } ?>  
  <td align="left" style="width:180px;font-size:16px;" id="micB">&nbsp;Rs. &nbsp;<?php echo intval($ResCtc['Car_Entitlement']); ?></td>
</tr>
<?php } */?>

<?php if($_REQUEST['E']==7){ ?>
<tr>
  <td align="left" colspan="3" style="width:320px;font-size:16px;" id="micA">&nbsp;<b>*</b> Variable Remuneration@ 7.5% of NRV less production cost ( on revenue generated out of your breeding efforts). 	
  </td>
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
