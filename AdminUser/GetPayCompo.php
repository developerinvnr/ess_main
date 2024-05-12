<?php
require_once('config/config.php');
if(isset($_POST['Compoid']) && $_POST['Compoid']!=""){
	$Compoid = $_POST['Compoid'];
	$sqlCompo = mysql_query("select * from hrm_paycomponent where PayCompoId=".$Compoid, $con) or die(mysql_error()); $resCompo = mysql_fetch_assoc($sqlCompo); ?>
<table>
<tr>
   <td class="td1" style="font-size:11px; width:50px;">Name&nbsp;:</td>
   <td><input type="hidden" name="PayCompoId" id="PayCompoId" value="<?php echo $Compoid; ?>" />
   <input name="CompoName1" id="CompoName1" style="font-size:11px; width:150px; height:18px;" value="<?php echo $resCompo['CompoName']; ?>" disabled/></td><td style="width:20px;">&nbsp;</td>
   <td class="td1" style="font-size:11px;width:50px;">Code&nbsp;:</td>
   <td><input name="CompoCode1" id="CompoCode1" style="font-size:11px; width:120px; height:18px;" value="<?php echo $resCompo['CompoCode']; ?>" disabled/></td><td style="width:20px;">&nbsp;</td>
   <td class="td1" style="font-size:11px;width:50px;">Type&nbsp;:</td>
   <td class="td1"><select name="CompoType1" id="CompoType1" style="font-size:11px; width:120px; height:18px;" disabled>
   <option value="<?php echo $resCompo['CompoType']; ?>"><?php echo $resCompo['CompoType']; ?></option>
   <option value="<?php if($resCompo['CompoType']=='Earning'){echo 'Deducted';} else { echo 'Earning'; }?>">&nbsp;<?php if($resCompo['CompoType']=='Earning'){echo 'Deducted';} else { echo 'Earning'; }?></option></select></td>
 </tr>
  <tr>
   <td class="td1" style="font-size:11px; width:50px;"><input type="checkbox" name="ConPF1" id="ConPF1" onClick="Checked_1()" <?php if($resCompo['Con_For_Pf']=='Y'){echo 'checked'; }?> disabled/></td>
   <td style="font-size:11px;">Consider for PF</td><td style="width:20px;">&nbsp;</td>
   <td class="td1" style="font-size:11px;width:50px;"><input type="checkbox" name="Lumpsum1" id="Lumpsum1" onClick="Checked_1()" <?php if($resCompo['Lumpsum']=='Y'){echo 'checked'; }?> disabled/></td>
   <td style="font-size:11px;">Lumpsum</td><td style="width:20px;">&nbsp;</td>
   <td class="td1" style="font-size:11px;width:50px;"><input type="checkbox" name="Prorata1" id="Prorata1" onClick="Checked_1()" <?php if($resCompo['Prorata']=='Y'){echo 'checked'; }?> disabled/></td>
   <td style="font-size:11px;">Pro rata</td>
 </tr>
  <tr>
   <td class="td1" style="font-size:11px; width:50px;"><input type="checkbox" name="ConPTax1" id="ConPTax1" onClick="Checked_1()" <?php if($resCompo['Con_For_Ptax']=='Y'){echo 'checked'; }?> disabled/></td>
   <td style="font-size:11px;">Consider for P-Tax</td><td style="width:20px;">&nbsp;</td>
   <td class="td1" style="font-size:11px;width:50px;"><input type="checkbox" name="ConESIC1" id="ConESIC1" onClick="Checked_1()" <?php if($resCompo['Con_For_Esic']=='Y'){echo 'checked';} ?> disabled/></td>
   <td style="font-size:11px;">Consider for ESIC</td><td style="width:20px;">&nbsp;</td>
   <td class="td1" style="font-size:11px;width:50px;"><input type="checkbox" name="ConTDS1" id="ConTDS1" onClick="Checked_1()" <?php if($resCompo['Con_For_Tds']=='Y'){echo 'checked';} ?> disabled/></td>
   <td style="font-size:11px;">Consider for TDS</td>
 </tr>
 <tr>
   <td class="td1" style="font-size:11px; width:50px;"><input type="checkbox" name="ConArrCalcu1" id="ConArrCalcu1" onClick="Checked_1()" <?php if($resCompo['Con_For_ArrCalcu']=='Y'){echo 'checked'; }?> disabled/></td>
   <td style="font-size:11px;" colspan="3">Consider for arrears calculation</td>
   <td style="font-size:11px;">&nbsp;</td><td style="width:20px;">&nbsp;</td>
   <td class="td1" style="font-size:11px;width:50px;"><input type="checkbox" name="EstimateTDS1" id="EstimateTDS1" onClick="Checked_1()" <?php if($resCompo['Esti_For_Tds']=='Y'){echo 'checked';} ?> disabled/></td>
   <td style="font-size:11px;">Estimate for TDS</td>
 </tr>
  <tr>
   <td class="td1" style="font-size:11px; width:50px;"><input type="checkbox" name="DedIncTax1" id="DedIncTax1" onClick="Checked_1()" <?php if($resCompo['Deduct_In_Tax']=='Y'){echo 'checked'; }?> disabled/></td>
   <td style="font-size:11px;" colspan="3">Deduction Incremental Tax</td>
   <td style="font-size:11px;">&nbsp;</td><td style="width:20px;">&nbsp;</td>
   <td class="td1" style="font-size:11px;width:50px;">&nbsp;</td>
   <td style="font-size:11px;">&nbsp;</td>
 </tr>
</table> 
 <?php } ?>
