 <?php /******************* Start ***************************/ ?>
 <?php /******************* Start ***************************/ ?>
 
 <tr>
  <td>
  <table border="1" style="width:800px; border-top:hidden; border-bottom:hidden;" cellspacing="0">
  <tr style="height:23px;">
   <td class="td13c" style='width:120px;'>&nbsp;EC</td>
   <td class="td13"  style='width:150px;'>&nbsp;<?php echo $EC; ?></td>
   <td class="td13c" style='width:150px;'>&nbsp;NAME</td>
   <td class="td13" style='width:410px;' colspan="3">&nbsp;<?php echo $Ename; ?></td>
  </tr>
   <tr style="height:23px;">
   <td class="td13c">&nbsp;COSTCENTER</td>
   <td class="td13">&nbsp;<?php echo strtoupper($resE['StateName']); ?></td>
   <td class="td13c">&nbsp;DEPARTMENT</td>
   <td class="td13" colspan="3">&nbsp;<?php echo strtoupper($ResPay['DepartmentName']); ?></td>
  </tr>
  <tr style="height:23px;">
   <td class="td13c" style='width:100px;'>&nbsp;GRADE</td>
   <td class="td13" style='width:120px;'>&nbsp;<?php echo strtoupper($GradeValue); ?></td>
   <td class="td13c">&nbsp;DESIGNATION</td>
   <td class="td13" colspan="3">&nbsp;<?php echo strtoupper($ResPay['DesigName']); ?></td>
  </tr>
  <tr style="height:23px;">
   <td class="td13c">&nbsp;HEADQUARTER</td>
   <td class="td13">&nbsp;<?php echo strtoupper($resE['HqName']); ?></td>
   <td class="td13c">&nbsp;GENDER</td>
   <td class="td13" colspan="3">&nbsp;<?php if($resE['Gender']=='M'){echo 'MALE';}else {echo 'FEMALE'; } ?></td>
  </tr>
  <tr style="height:23px;">
   <td class="td13c">&nbsp;DATE-OF-BIRTH</td>
   <td class="td13">&nbsp;<?php echo date("d-m-Y", strtotime($resE['DOB'])); ?></td>
   <td class="td13c">&nbsp;DATE-OF-JOINING</td>
   <td class="td13">&nbsp;<?php echo date("d-m-Y", strtotime($resE['DateJoining'])); ?></td>
   <td class="td13c">&nbsp;PF NO.</td>
   <td class="td13">&nbsp;<?php echo strtoupper($resE['PfAccountNo']); ?></td>
  </tr>
  <tr style="height:23px;">
   <td class="td13c">&nbsp;BANK A/C NO.</td>
   <td class="td13">&nbsp;<?php echo $resE['AccountNo']; ?></td>
   <td class="td13c">&nbsp;BANK NAME</td>
   <td class="td13">&nbsp;<?php echo $resE['BankName']; ?></td>
   <td class="td13c">&nbsp;PAN NO.</td>
   <td class="td13">&nbsp;<?php echo $resE['PanNo']; ?></td>
  </tr>
  <tr style="height:23px;">
   <td class="td13c">&nbsp;TOTAL DAYS</td>
   <td class="td14">&nbsp;<?php echo $ResPay['TotalDay']; ?></td>
   <td class="td13c">&nbsp;PAID DAYS</td>
   <td class="td14">&nbsp;<?php echo $ResPay['PaidDay']; ?></td>
   <td class="td13c">&nbsp;ABSENT</td>
   <td class="td14">&nbsp;<?php echo $ResPay['Absent']; ?></td>
  </tr>
  </tr>
  </table>
  </td>
 </tr>
 
 
 
 <tr>
  <td>
  <table style="width:800px;" border="0" >
  
  <tr>
   <td class="td14ce" style='width:350px;vertical-align:top;'>
    <table border="1"  style="width:100%;"  cellspacing="0">
	 <tr style="height:24px;">
	  <td colspan="2" class="td14ce" style='width:350px; text-align:center; background-color:#DFD0E6;'><b>Earnings</b></td>
	 </tr>
	 <tr style="height:24px;">
	  <td class="td14ce" style='width:250px;text-align:center;background-color:#DFD0E6;'><b>Components</b></td>
      <td class="td14ce" style='width:100px;text-align:center;background-color:#DFD0E6;'><b>Amount</b></td>
	 </tr>
	 <?php if($ResPay['Basic']>0){ ?>
	 <tr style="height:23px;">
	  <td class="td13">&nbsp;BASIC</td>
      <td class="td14r"><?php echo intval($ResPay['Basic']); ?>&nbsp;</td>
	 </tr>
	 <?php } if($ResPay['Hra']>0){ ?>
	 <tr style="height:23px;">
	  <td class="td13">&nbsp;HOUSE RENT ALLOWANCE</td>
      <td class="td14r"><?php echo intval($ResPay['Hra']); ?>&nbsp;</td>
	 </tr>
	 <?php } if($ResPay['Bonus_Month']>0){ ?>
	 <tr style="height:23px;">
	  <td class="td13">&nbsp;BONUS</td>
      <td class="td14r"><?php echo intval($ResPay['Bonus_Month']); ?>&nbsp;</td>
	 </tr>
	 <?php } if($ResPay['Special']>0){ ?>
	 <tr style="height:23px;">
	  <td class="td13">&nbsp;SPECIAL ALLOWANCE</td>
      <td class="td14r"><?php echo intval($ResPay['Special']); ?>&nbsp;</td>
	 </tr>
	 <?php } if($ResPay['Convance']>0){ ?>
	 <tr style="height:23px;">
	  <td class="td13">&nbsp;CONVEYANCE ALLOWANCE</td>
      <td class="td14r"><?php echo intval($ResPay['Convance']); ?>&nbsp;</td>
	 </tr>
	 <?php } if($ResPay['TA']>0){ ?>
	 <tr style="height:23px;">
	  <td class="td13">&nbsp;TRANSPORT ALLOWANCE</td>
      <td class="td14r"><?php echo intval($ResPay['TA']);?>&nbsp;</td>
	 </tr>
	 <?php } if($ResPay['DA']>0){ ?>
	 <tr style="height:23px;">
	  <td class="td13">&nbsp;DA</td>
      <td class="td14r"><?php echo intval($ResPay['DA']); ?>&nbsp;</td>
	 </tr>
	 <?php } if($ResPay['Bonus']>0){ ?>
	 <tr style="height:23px;">
	  <td class="td13">&nbsp;BONUS</td>
      <td class="td14r"><?php echo intval($ResPay['Bonus']);?>&nbsp;</td>
	 </tr>
	 <?php } if($ResPay['LeaveEncash']>0){ ?>
	 <tr style="height:23px;">
	  <td class="td13">&nbsp;LEAVE ENCASH</td>
      <td class="td14r"><?php echo intval($ResPay['LeaveEncash']); ?>&nbsp;</td>
	 </tr>
	 <?php } if($ResPay['Arreares']>0){ ?>
	 <tr style="height:23px;">
	  <td class="td13">&nbsp;ARREARS</td>
      <td class="td14r"><?php echo intval($ResPay['Arreares']); ?>&nbsp;</td>
	 </tr>
	 <?php } if($ResPay['Incentive']>0){ ?>
	 <tr style="height:23px;">
	  <td class="td13">&nbsp;INCENTIVE</td>
      <td class="td14r"><?php echo intval($ResPay['Incentive']); ?>&nbsp;</td>
	 </tr>
	 <?php } if($ResPay['VariableAdjustment']>0){ ?>
	 <tr style="height:23px;">
	  <td class="td13">&nbsp;VARIABLE ADJUSTMENT</td>
      <td class="td14r"><?php echo intval($ResPay['VariableAdjustment']); ?>&nbsp;</td>
	 </tr>
	 <?php } if($ResPay['PerformancePay']>0){ ?>
	 <tr style="height:23px;">
	  <td class="td13">&nbsp;PERFORMANCE PAY</td>
      <td class="td14r"><?php echo intval($ResPay['PerformancePay']); ?>&nbsp;</td>
     </tr>
	 <?php } if($ResPay['CCA']>0){ ?>
	 <tr style="height:23px;">
      <td class="td13">&nbsp;CITY COMPENSATORY ALLOWANCE</td>
      <td class="td14r"><?php echo intval($ResPay['CCA']); ?>&nbsp;</td>
     </tr>
	 <?php } if($ResPay['RA']>0){ ?>
	 <tr style="height:23px;">
      <td class="td13">&nbsp;RELOCATION ALLOWANCE</td>
      <td class="td14r"><?php echo intval($ResPay['RA']); ?>&nbsp;</td>
     </tr>
	 <?php } if($ResPay['VarRemburmnt']>0){ ?>
	 <tr style="height:23px;">
      <td class="td13">&nbsp;VARIABLE REIMBURSEMENT</td>
      <td class="td14r"><?php echo intval($ResPay['VarRemburmnt']); ?>&nbsp;</td>
     </tr>
	 <?php } if($ResPay['Car_Allowance']>0){ ?>
	 <tr style="height:23px;">
      <td class="td13">&nbsp;CAR ALLOWANCE</td>
      <td class="td14r"><?php echo intval($ResPay['Car_Allowance']); ?>&nbsp;</td>
     </tr>
	 <?php } if($ResPay['Car_Allowance_Arr']!=0){ ?>
	 <tr style="height:23px;">
      <td class="td13">&nbsp;ARREAR FOR CAR ALLOWANCE</td>
      <td class="td14r"><?php echo intval($ResPay['Car_Allowance_Arr']); ?>&nbsp;</td>
     </tr>
	 <?php } if($ResPay['Arr_Basic']!=0){ ?>
	 <tr style="height:23px;">
      <td class="td13">&nbsp;ARREAR FOR BASIC</td>
      <td class="td14r"><?php echo intval($ResPay['Arr_Basic']); ?>&nbsp;</td>
     </tr>
	 <?php } if($ResPay['Arr_Hra']!=0){ ?>
	 <tr style="height:23px;">
      <td class="td13">&nbsp;ARREAR FOR HOUSE RENT ALLOWANCE</td>
      <td class="td14r"><?php echo intval($ResPay['Arr_Hra']); ?>&nbsp;</td>
     </tr>
	 <?php } if($ResPay['Arr_Spl']!=0){ ?>
	 <tr style="height:23px;">
      <td class="td13">&nbsp;ARREAR FOR SPECIAL ALLOWANCE</td>
      <td class="td14r"><?php echo intval($ResPay['Arr_Spl']); ?>&nbsp;</td>
	 </tr>
	 <?php } if($ResPay['Arr_Conv']!=0){ ?>
	 <tr style="height:23px;">
	  <td class="td13">&nbsp;ARREAR FOR CONVEYANCE</td>
      <td class="td14r"><?php echo intval($ResPay['Arr_Conv']); ?>&nbsp;</td>
     </tr>
	 <?php } if($ResPay['Arr_Bonus']!=0){ ?>
	 <tr style="height:23px;">
      <td class="td13">&nbsp;ARREAR FOR BONUS</td>
      <td class="td14r"><?php echo intval($ResPay['Arr_Bonus']); ?>&nbsp;</td>
     </tr>
	 <?php } if($ResPay['Arr_LTARemb']!=0){ ?>
	 <tr style="height:23px;">
      <td class="td13">&nbsp;ARREAR FOR LTA REIMBU.</td>
      <td class="td14r"><?php echo intval($ResPay['Arr_LTARemb']); ?>&nbsp;</td>
     </tr>
	 <?php } if($ResPay['Arr_RA']!=0){ ?>
	 <tr style="height:23px;">
      <td class="td13">&nbsp;ARREAR FOR RELOCATION ALLOWANCE</td>
      <td class="td14r"><?php echo intval($ResPay['Arr_RA']); ?>&nbsp;</td>
     </tr>
	 <?php } if($ResPay['Arr_PP']!=0){ ?>
	 <tr style="height:23px;">
      <td class="td13">&nbsp;ARREAR FOR PERFORMANCE PAY</td>
      <td class="td14r"><?php echo intval($ResPay['Arr_PP']); ?>&nbsp;</td>
     </tr>
	 <?php } if($ResPay['Arr_LvEnCash']!=0){ ?>
	 <tr style="height:23px;">
      <td class="td13">&nbsp;ARREAR FOR LV-ENCASH</td>
      <td class="td14r"><?php echo intval($ResPay['Arr_LvEnCash']); ?>&nbsp;</td>
     </tr>
	 <?php } if($ResPay['YCea']>0){ ?>
	 <tr style="height:23px;">
      <td class="td13">&nbsp;CHILD EDUCATION ALLOWANCE</td>
      <td class="td14r"><?php echo intval($ResPay['YCea']); ?>&nbsp;</td>
     </tr>
	 <?php } if($ResPay['YMr']>0){ ?>
	 <tr style="height:23px;">
      <td class="td13">&nbsp;MEDICAL REIMBURSEMENT</td>
      <td class="td14r"><?php echo intval($ResPay['YMr']); ?>&nbsp;</td>
     </tr>
	 <?php } if($ResPay['YLta']>0){ ?>
	 <tr style="height:23px;">
      <td class="td13">&nbsp;LEAVE TRAVEL ALLOWANCE</td>
      <td class="td14r"><?php echo intval($ResPay['YLta']); ?>&nbsp;</td>
	 </tr>
	 <?php } ?>
	</table>
   </td>
   <td class="td14ce" style='width:350px;vertical-align:top;'>
    <table border="1"  style="width:100%;"  cellspacing="0">
	 <tr style="height:24px;">
	  <td colspan="2" class="td14ce" style='width:350px; text-align:center;background-color:#DFD0E6;'><b>Deductions</b></td>
	 </tr>
	 <tr style="height:24px;">
	  <td class="td14ce" style='width:250px;text-align:center;background-color:#DFD0E6;'><b>Components</b></td>
      <td class="td14ce" style='width:100px;text-align:center;background-color:#DFD0E6;'><b>Amount</b></td>
	 </tr>
	 <tr style="height:23px;">
      <td class="td13">&nbsp;PROVIDENT FUND</td>
      <td class="td14r"><?php echo intval($ResPay['EPF_Employee']); ?>&nbsp;</td>
     </tr> 
	 <?php if($ResPay['TDS']>0 OR $ResTds['Tds']>0){ ?>  
     <tr style="height:23px;">
     <td class="td13">&nbsp;TDS</td>
     <td class="td14r"><?php echo intval($ResPay['TDS']); ?>&nbsp;</td>
    </tr>
    <?php } if($ResPay['ESCI_Employee']>0){ ?>  
    <tr style="height:23px;">
     <td class="td13">&nbsp;ESIC</td>
     <td class="td14r"><?php echo intval($ResPay['ESCI_Employee']); ?>&nbsp;</td>
    </tr>
    <?php } if($ResPay['Arr_Pf']>0){ ?>  
    <tr style="height:23px;">
     <td class="td13">&nbsp;ARREAR PF</td>
     <td class="td14r"><?php echo intval($ResPay['Arr_Pf']); ?>&nbsp;</td>
    </tr>
    <?php } if($ResPay['Arr_Esic']>0){ ?>  
    <tr style="height:23px;">
     <td class="td13">&nbsp;ARREAR ESIC</td>
     <td class="td14r">&nbsp;<?php echo intval($ResPay['Arr_Esic']); ?></td> 
    </tr>   
    <?php } if($ResPay['VolContrib']>0){ ?>   
    <tr style="height:23px;">
     <td class="td13">&nbsp;VOLUNTARY CONTRIBUTION</td>
     <td class="td14r">&nbsp;<?php echo intval($ResPay['VolContrib']); ?></td>
    </tr>
    <?php } if($ResPay['DeductAdjmt']>0){ ?>  
    <tr style="height:23px;">
     <td class="td13">&nbsp;DEDUCTION ADJUSTMENT</td>
     <td class="td14r">&nbsp;<?php echo intval($ResPay['DeductAdjmt']); ?></td>  
    </tr>
    <?php } if($ResPay['RecConAllow']>0) { ?>  
    <tr style="height:23px;">
     <td class="td13">&nbsp;<?php if($ResPay['RecConAllow']>0){ ?>RECOVERY CONVENYANCE ALLOWANCE<?php } ?></td>
     <td class="td14r">&nbsp;<?php if($ResPay['RecConAllow']>0){ echo intval($ResPay['RecConAllow']); } ?></td>
    </tr>
    <?php } if($ResPay['RA_Recover']>0) { ?>  
    <tr style="height:23px;">
     <td class="td13">&nbsp;<?php if($ResPay['RA_Recover']>0){ ?>RELOCATION ALLOWANCE RECOVERY<?php } ?></td>
     <td class="td14r">&nbsp;<?php if($ResPay['RA_Recover']>0){ echo intval($ResPay['RA_Recover']); } ?></td>
    </tr>
    <?php } ?>    
	</table>
   </td>
  </tr>

<?php 
$TotGross=$ResPay['Tot_Gross']+$ResPay['Bonus']+$ResPay['DA']+$ResPay['Arreares']+$ResPay['LeaveEncash']+$ResPay['Incentive']+$ResPay['VariableAdjustment']+$ResPay['PerformancePay']+$ResPay['CCA']+$ResPay['RA']+$ResPay['Arr_Basic']+$ResPay['Arr_Hra']+$ResPay['Arr_Spl']+$ResPay['Arr_Conv']+$ResPay['Arr_Bonus']+$ResPay['Arr_LTARemb']+$ResPay['Arr_RA']+$ResPay['Arr_PP']+$ResPay['YCea']+$ResPay['YMr']+$ResPay['YLta']+$ResPay['Car_Allowance']+$ResPay['Car_Allowance_Arr']+$ResPay['VarRemburmnt']+$ResPay['TA']+$ResPay['Arr_LvEnCash'];
$TotDeduct=$ResPay['TDS']+$ResPay['Tot_Deduct']+$ResPay['Arr_Pf']+$ResPay['VolContrib']+$ResPay['Arr_Esic']+$ResPay['DeductAdjmt']+$ResPay['RecConAllow']+$ResPay['RA_Recover'];
$TotNetAmount=$TotGross-$TotDeduct; 
$TotAnnGross=$ResGross['Gross']+$ResBon['Bon']+$ResDa['Da']+$ResArr['Arr']+$ResLeEn['LeEn']+$ResInc['Inc']+$ResVarA['VarA']+$ResPerP['PerP']+$ResCcA['CcA']+$ResRaS['RaS'];
$TotAnnDeduct=$ResTds['Tds']+$ResDed['Ded'];
?> 
  
  <tr>
   <td class="td14ce" style='width:350px;vertical-align:top;'>
    <table border="1"  style="width:100%;"  cellspacing="0">
	 <tr bgcolor="#B0FFB0" style="height:24px;">
	  <td class="td14" style="width:250px;">&nbsp;<b>Total Earnings :</b></td>
      <td class="td14r" style="width:100px;"><b><?php echo intval($TotGross); ?></b>&nbsp;</td>
	 </tr>
	 </table>
	</td>
	<td>
	 <table border="1"  style="width:100%;"  cellspacing="0">
	 <tr  bgcolor="#B0FFB0" style="height:24px;">
	  <td class="td14" style="width:250px;">&nbsp;<b>Total Deductions :</b></td>
     <td class="td14r" style="width:100px;"><b><?php echo intval($TotDeduct); ?></b>&nbsp;</td>
	 </tr>
	 </table>
	 </td>
	 </tr>
  
  </table>
  </td>
  </tr>

 
<?php
    function no_to_words($no)
    {
    $words = array('0'=> '' ,'1'=> 'one' ,'2'=> 'two' ,'3' => 'three','4' => 'four','5' => 'five','6' => 'six','7' => 'seven','8' => 'eight','9' => 'nine','10' => 'ten','11' => 'eleven','12' => 'twelve','13' => 'thirteen','14' => 'fouteen','15' => 'fifteen','16' => 'sixteen','17' => 'seventeen','18' => 'eighteen','19' => 'nineteen','20' => 'twenty','30' => 'thirty','40' => 'fourty','50' => 'fifty','60' => 'sixty','70' => 'seventy','80' => 'eighty','90' => 'ninty','100' => 'hundred &','1000' => 'thousand','100000' => 'lakh','10000000' => 'crore');
    if($no == 0)
    return ' ';
    else { $novalue=''; $highno=$no; $remainno=0; $value=100;  $value1=1000;  
	while($no>=100) 
	{
     if(($value <= $no) &&($no < $value1)) {
     $novalue=$words["$value"];
     $highno = (int)($no/$value);
     $remainno = $no % $value;
     break;
    }
    $value= $value1;  $value1 = $value * 100;
    }
    if(array_key_exists("$highno",$words))
    return $words["$highno"]." ".$novalue." ".no_to_words($remainno);
    else {
    $unit=$highno%10;
    $ten =(int)($highno/10)*10;
    return $words["$ten"]." ".$words["$unit"]." ".$novalue." ".no_to_words($remainno);
    }
    }
    }
	$InWorld=no_to_words($TotNetAmount);
    //echo no_to_words(123);
?>
 <tr>
  <td>
  <table style="width:800px;border-top:hidden;border-bottom:hidden; padding:1px;" border="1" cellspacing="0">
  <tr>
   <td class="td14" style='width:800px;height:25px;'><b style="color:#B70000;">Net Pay :</b><b>&nbsp;Rs. <?php echo intval($TotNetAmount).'/-'; ?></b></td>
  </tr>
  <tr>
   <td class="td14" style='width:800px;height:25px;'><b style="color:#B70000;">In Words :</b><b>&nbsp; <?php echo strtoupper($InWorld).' RUPEES ONLY'; ?></b></td>
  </tr>
  
   <?php /******************* Close ***************************/ ?>
   <?php /******************* Close ***************************/ ?>
