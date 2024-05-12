<script type="text/javascript" language="javascript">
/******************************************************* Eligibility ************************************/
/******************************************************* Eligibility ************************************/
/******************************************************* Eligibility ************************************/
function EditElig()
{
 document.getElementById("TDFirst").style.display = 'none'; document.getElementById("TDSecond").style.display = 'block';
 document.getElementById("LodgingCatA").readOnly = false; document.getElementById("LodgingCatB").readOnly = false; 
 document.getElementById("LodgingCatC").readOnly = false; document.getElementById("DaOutSide_HQ").disabled = false; 
 document.getElementById("DaOutSide_HQSales").disabled=false; document.getElementById("DaOutSide_HQRs").readOnly=false; 
 document.getElementById("DaOutSide_HQSalesRs").readOnly=false; document.getElementById("DaOutSide_HQPD").disabled=false; 
 document.getElementById("DaOutSide_HQPDRs").readOnly = false; document.getElementById("TwoWheelerKM").readOnly = false;
 document.getElementById("TwoWRestrict_PD").readOnly = false; document.getElementById("TwoWRestrict").readOnly = false; 
 document.getElementById("TwoWRestrict_OutSite").readOnly=false; document.getElementById("FourWheelerKM").readOnly=false; 
 document.getElementById("FourWRestrict_PD").readOnly = false; document.getElementById("FourWRestrict").readOnly = false;
 document.getElementById("FourWRestrict_OutSite").readOnly=false; document.getElementById("MiscExp").disabled = false;
 document.getElementById("ModeTraOutSide_HQ").disabled=false; document.getElementById("MoExpeReim").disabled = false; 
 document.getElementById("MoComHandSet").disabled = false; document.getElementById("MoHandSet").disabled = false;   
 document.getElementById("HealthInsu").readOnly = false;  document.getElementById("MobileExpRs").readOnly = false; 
 document.getElementById("MobileHandRs").readOnly = false; 
}

function DAOutSite(value)
{ 
 var A1=document.getElementById("A1").value; 
 if(value=='N'){document.getElementById("DaOutSide_HQRs").value = '';}
 else if(value=='Y'){document.getElementById("DaOutSide_HQRs").value = A1;}
}

function DAOutSiteSales(value)
{ 
 var B1=document.getElementById("B1").value;
 if(value=='N'){document.getElementById("DaOutSide_HQSalesRs").value = '';}
 else if(value=='Y'){document.getElementById("DaOutSide_HQSalesRs").value = B1;}
}

function ModeTravel(value)
{ 
 if(value=='N'){document.getElementById("TraMode").disabled = true; }
 else if(value=='Y'){document.getElementById("TraMode").disabled = false; }
} 

function DAOutSitePD(value)
{ 
 var B1=document.getElementById("B1").value;
 if(value=='N'){document.getElementById("DaOutSide_HQPDRs").value = '';}
 else if(value=='Y'){document.getElementById("DaOutSide_HQPDRs").value = B1;}
}
  
function ClickGPRS()
{ 
 if(document.getElementById("GPCheck").checked==true){document.getElementById("MobileHandRs").value=document.getElementById("MH_GPRS").value;}else if(document.getElementById("GPCheck").checked==false){document.getElementById("MobileHandRs").value=document.getElementById("MobileHand").value; }
}   

function SelectMoExpeReim(value)
{ 
 var D2=document.getElementById("D2").value; var P2=document.getElementById("P2").value; 
 var DeId=document.getElementById("DeId").value; 
 var ME1=document.getElementById("ME1").value;  var ME2=document.getElementById("ME2").value;
 var ME3=document.getElementById("ME3").value; var prd3=document.getElementById("prd3").value;
 var prd1=document.getElementById("prd1").value;  var prd2=document.getElementById("prd2").value;
 if(value=='N'){document.getElementById("MobileExpRs").value = '';}
 //else if(value=='Y' && (DeId==D2 || DeId==P2 || DeId==27))
 else if(value=='Y' && (DeId==3 || DeId==4 || DeId==6 || DeId==12 || DeId==25 || DeId==27))
 {document.getElementById("MobileExpRs").value = ME1; document.getElementById("Prdd").value = prd1;  }
 else if(value=='Y' && DeId==2)
 {document.getElementById("MobileExpRs").value = ME3; document.getElementById("Prdd").value = prd3;  }
 //else if(value=='Y' && DeId!=D2 && DeId!=P2 && DeId!=27)
 else if(value=='Y' && (DeId==1 || DeId==5 || DeId==7 || DeId==8 || DeId==9 || DeId==10 || DeId==11 || DeId==24))
 {document.getElementById("MobileExpRs").value = ME2; document.getElementById("Prdd").value = prd2; }
}

function SelectMoHandSet(value)
{ 
 var MobileHand=document.getElementById("MobileHand").value;  
 if(value=='N'){document.getElementById("MobileHandRs").value = '';}
 else if(value=='Y'){document.getElementById("MobileHandRs").value = MobileHand;} 
}
  
function HRSaveElig(E,P,Y,C,U)
{ 
  var ModeTraOutSide_HQ = document.getElementById("ModeTraOutSide_HQ").value;  
  var TraMode = document.getElementById("TraMode").value; 
  if (ModeTraOutSide_HQ == 'Y' && TraMode == 0) { alert("Please Select Travel Mode.");  return false; }
  var LodgingCatA = document.getElementById("LodgingCatA").value;  
  var ModeTraOutSide_HQ = document.getElementById("ModeTraOutSide_HQ").value;   
  var LodgingCatB = document.getElementById("LodgingCatB").value; 
  var LodgingCatC = document.getElementById("LodgingCatC").value;  
  var DaOutSide_HQRs = document.getElementById("DaOutSide_HQRs").value; 
  var DaOutSide_HQSales = document.getElementById("DaOutSide_HQSales").value; 
  var DaOutSide_HQPDRs = document.getElementById("DaOutSide_HQPDRs").value; 
  var DaOutSide_HQSalesRs = document.getElementById("DaOutSide_HQSalesRs").value; 
  var TwoWheelerKM = document.getElementById("TwoWheelerKM").value; 
  var TwoWRestrict = document.getElementById("TwoWRestrict").value; 
  var TwoWRestrict_PD = document.getElementById("TwoWRestrict_PD").value;
  var FourWRestrict = document.getElementById("FourWRestrict").value;
  var FourWheelerKM = document.getElementById("FourWheelerKM").value; 
  var TraMode = document.getElementById("TraMode").value; 
  var TraClass = document.getElementById("TraClass").value; 
  var MoExpeReim = document.getElementById("MoExpeReim").value;
  var MobileExpRs = document.getElementById("MobileExpRs").value; 
  var MobileHandRs = document.getElementById("MobileHandRs").value;  
  var MoHandSet = document.getElementById("MoHandSet").value; 
  var MoComHandSet = document.getElementById("MoComHandSet").value; 
  var MiscExp = document.getElementById("MiscExp").value; 
  var HealthInsu = document.getElementById("HealthInsu").value; 
  var Bonus = document.getElementById("BonusElig").value;   
  var Gratuity = document.getElementById("GratuityElig").value; 
  var CHDate = document.getElementById("CHDate").value;
  var TwoWRestrict_OutSite = document.getElementById("TwoWRestrict_OutSite").value; 
  var FourWRestrict_OutSite = document.getElementById("FourWRestrict_OutSite").value;
  
  var HelthChekUp = document.getElementById("HelthChekUp").value; 
  var Car2Policy = document.getElementById("Car2Policy").value; 
  var VehicleCost = document.getElementById("VehicleCost").value; 
  var With2Driver = document.getElementById("With2Driver").value; 
  var Advance2Com = document.getElementById("Advance2Com").value; 
  var DateOfEPolicy = document.getElementById("DateOfEPolicy").value;
  var LessKm = document.getElementById("Less2Km").value;
  var Prd = document.getElementById("Prdd").value; 
  
  var agree=confirm("Are you sure you want to save Employee Eligibility?"); 
  if(agree) 
  { 
   var url = 'HRNormalizedInc.php'; var pars = 'LodgingCatA='+LodgingCatA+'&LodgingCatB='+LodgingCatB+'&LodgingCatC='+LodgingCatC+'&DaOutSide_HQRs='+DaOutSide_HQRs+'&DaOutSide_HQSalesRs='+DaOutSide_HQSalesRs+'&TwoWheelerKM='+TwoWheelerKM+'&FourWheelerKM='+FourWheelerKM+'&TraMode='+TraMode+'&TraClass='+TraClass+'&MoExpeReim='+MoExpeReim+'&MiscExp='+MiscExp+'&HealthInsu='+HealthInsu+'&Bonus='+Bonus+'&Gratuity='+Gratuity+'&CHDate='+CHDate+'&E='+E+'&P='+P+'&Y='+Y+'&C='+C+'&U='+U+'&ModeTraOutSide_HQ='+ModeTraOutSide_HQ+'&MobileExpRs='+MobileExpRs+'&MobileHandRs='+MobileHandRs+'&MoHandSet='+MoHandSet+'&TwoWRestrict='+TwoWRestrict+'&TwoWRestrict_PD='+TwoWRestrict_PD+'&FourWRestrict='+FourWRestrict+'&MoComHandSet='+MoComHandSet+'&DaOutSide_HQPDRs='+DaOutSide_HQPDRs+'&TwoWRestrict_OutSite='+TwoWRestrict_OutSite+'&FourWRestrict_OutSite='+FourWRestrict_OutSite+'&HelthChekUp='+HelthChekUp+'&Car2Policy='+Car2Policy+'&VehicleCost='+VehicleCost+'&With2Driver='+With2Driver+'&Advance2Com='+Advance2Com+'&DateOfEPolicy='+DateOfEPolicy+'&LessKm='+LessKm+'&Prd='+Prd; 
   var myAjax = new Ajax.Request(  url, { method: 'post', parameters: pars, onComplete: show_HREmpElig});
   return true; 
  }else{ return false; }
}
function show_HREmpElig(originalRequest)
{ document.getElementById("msgElig").innerHTML = originalRequest.responseText; }
</script>

<form enctype="multipart/form-data" name="formEelig" method="post" onSubmit="return validate(this)">
<?php $sqlD2=mysql_query("select DepartmentId from hrm_department where DepartmentName='Sales' AND DepartmentCode='SALES' AND CompanyId=".$ComId, $con); $sqlP2=mysql_query("select DepartmentId from hrm_department where DepartmentName='Production' AND DepartmentCode='PRODUCTION' AND CompanyId=".$ComId, $con);$sqlPD2=mysql_query("select DepartmentId from hrm_department where DepartmentCode='PD' AND CompanyId=".$ComId, $con);
      $resD2=mysql_fetch_assoc($sqlD2); $resP2=mysql_fetch_assoc($sqlP2); $resPD2=mysql_fetch_assoc($sqlPD2); ?>
<input type="hidden" id="D2" class="All_100" value="<?php echo $resD2['DepartmentId']; ?>"/>  
<input type="hidden" id="P2" class="All_100" value="<?php echo $resP2['DepartmentId']; ?>"/>
<input type="hidden" id="DeId" class="All_100" value="<?php echo $ResCtc['DepartmentId']; ?>"/>


 <?php /////////////////////////////////// First Table Data Open //////////////////////////////?>
 <?php /////////////////////////////////// First Table Data Open //////////////////////////////?>
 <?php /////////////////////////////////// First Table Data Open //////////////////////////////?>
 
<td class="td3" id="TDFirst">
<input type="hidden" id="ComId" value="<?php echo $CompanyId; ?>" />
<table class="td3" border="0" width="100%" id="TEmp" cellpadding="2" cellspacing="0">
<tr>
 <td class="td3" style="width:2%;"></td>
 <td class="td3" style="width:98%;">
 <table border="0" width="100%">
 <tr>
  <td class="td3" width="25%">Lodging :</td>
  <td class="td2" width="20%">Category A</td>
  <td class="td2" width="20%">Category B</td>
  <td class="td2" width="20%">Category C</td>
  <td class="td2" width="15%"></td>
 </tr>
 <tr>
  <td class="td3">&nbsp;</td>
  <td class="td2"><input class="td2" style="width:100px;" readonly value="<?php if($ResEligEmp['Lodging_CategoryA']>0){echo floatval($ResEligEmp['Lodging_CategoryA']);}elseif($ResEligEmp['Lodging_CategoryA']!=''){echo $ResEligEmp['Lodging_CategoryA'];} ?>"/></td>
  <td class="td2"><input class="td2" style="width:100px;" readonly value="<?php if($ResEligEmp['Lodging_CategoryB']>0){echo floatval($ResEligEmp['Lodging_CategoryB']);}elseif($ResEligEmp['Lodging_CategoryB']!=''){echo $ResEligEmp['Lodging_CategoryB'];} ?>"/></td>
  <td class="td2"><input class="td2" style="width:100px;" readonly value="<?php if($ResEligEmp['Lodging_CategoryC']>0){echo floatval($ResEligEmp['Lodging_CategoryC']);}elseif($ResEligEmp['Lodging_CategoryC']!=''){echo $ResEligEmp['Lodging_CategoryC'];} ?>"/></td>
  <td class="td2"></td>
 </tr>
 </table>
 </td>
</tr>
<tr>
 <td class="td2"></td>
 <td>
 <table border="0">
  <tr>
   <td class="td3" style="width:350px;">DA Outside H.Q. :</td>
   <td class="td3" align="right" style="width:52px;"><select Name="DaOutSide_HQ" class="td3" style="width:50px;" onChange="DAOutSite(this.value)" disabled><option value="<?php if($ResEligEmp['Lodging_CategoryA']>0){ if($ResEligEmp['DA_Outside_Hq']!='') echo 'Y'; else echo 'N'; } else { if($resDaily['OutSiteHQ']!='') echo 'Y'; else echo 'N'; } ?>">&nbsp;<?php if($ResEligEmp['Lodging_CategoryA']>0){if($ResEligEmp['DA_Outside_Hq']!='') echo 'Yes'; else echo 'No'; } else { if($resDaily['OutSiteHQ']!='') echo 'Yes'; else echo 'No'; } ?></option><option value="<?php if($ResEligEmp['Lodging_CategoryA']>0){ if($ResEligEmp['DA_Outside_Hq']!='') echo 'N'; else echo 'Y'; } else { if($resDaily['OutSiteHQ']!='') echo 'N'; else echo 'Y'; } ?>">&nbsp;<?php if($ResEligEmp['Lodging_CategoryA']>0){if($ResEligEmp['DA_Outside_Hq']!='') echo 'No'; else echo 'Yes'; } else { if($resDaily['OutSiteHQ']!='') echo 'No'; else echo 'Yes'; } ?></option></select></td>
   <td class="td3" style="width:140px;">&nbsp;Rs. :&nbsp;<input Name="DaOutSide_HQRs" class="td2" style="width:100px;" value="<?php if($ResEligEmp['Lodging_CategoryA']>0){ echo $ResEligEmp['DA_Outside_Hq']; } else { echo $resDaily['OutSiteHQ']; } ?>" readonly/></td>
   <td class="td3" style="width:60px;">Per Day</td>
  </tr>
  <tr>
   <td class="td3">DA @ H.Q.(Only For Sales Staff) :
   <input type="hidden" Name="A1" id="A1" value="<?php echo $resDaily['OutSiteHQ']; ?>"/><input type="hidden" Name="B1" id="B1" value="<?php echo $resDaily['OutSiteHQ_Sales']; ?>"/><input type="hidden" Name="MH" id="MH" value="<?php echo $resDaily['MH']; ?>"/><input type="hidden" Name="MRSP" id="MRSP" value="<?php echo $resDaily['MRSP']; ?>"/><input type="hidden" Name="MRNS" id="MRNS" value="<?php echo $resDaily['MRNS']; ?>"/><input type="hidden" Name="MCS" id="MCS" value="<?php echo $resDaily['MCS']; ?>"/><input type="hidden" Name="MCSSP" id="MCSSP" value="<?php echo $resDaily['MCSSP']; ?>"/></td>
   <td class="td3" align="right"><select Name="DaOutSide_HQSales" class="td3" style="width:50px;" onChange="DAOutSiteSales(this.value)" disabled><option value="<?php if($ResEligEmp['Lodging_CategoryA']>0){ if($ResEligEmp['DA_Outside_HqSal']!='') echo 'Y'; else echo 'N'; } else { if($resDaily['OutSiteHQ_Sales']!='' AND $resD2['DepartmentId']==$ResCtc['DepartmentId']) echo 'Y'; else echo 'N'; } ?>">&nbsp;<?php if($ResEligEmp['Lodging_CategoryA']>0){ if($ResEligEmp['DA_Outside_HqSal']!='') echo 'Yes'; else echo 'No'; } else { if($resDaily['OutSiteHQ_Sales']!='' AND $resD2['DepartmentId']==$ResCtc['DepartmentId']) echo 'Yes'; else echo 'No'; } ?></option><option value="<?php if($ResEligEmp['Lodging_CategoryA']>0){ if($ResEligEmp['DA_Outside_HqSal']!='') echo 'N'; else echo 'Y'; } else { if($resDaily['OutSiteHQ_Sales']!='' AND $resD2['DepartmentId']==$ResCtc['DepartmentId']) echo 'N'; else echo 'Y'; } ?>">&nbsp;<?php if($ResEligEmp['Lodging_CategoryA']>0){ if($ResEligEmp['DA_Outside_HqSal']!='') echo 'No'; else echo 'Yes'; } else { if($resDaily['OutSiteHQ_Sales']!='' AND $resD2['DepartmentId']==$ResCtc['DepartmentId']) echo 'No'; else echo 'Yes'; } ?></option></select></td>
   <td class="td3">&nbsp;Rs. :&nbsp;<input Name="DaOutSide_HQSalesRs" class="td2" style="width:100px;" value="<?php if($ResEligEmp['Lodging_CategoryA']>0){ echo $ResEligEmp['DA_Outside_HqSal']; } elseif($resDaily['OutSiteHQ_Sales']!='' AND $resD2['DepartmentId']==$ResCtc['DepartmentId']) { echo $resDaily['OutSiteHQ_Sales']; } ?>" readonly/></td>
   <td class="td3">Per Day<input type="hidden" Name="DaOutSide_HQRs_WithNH" id="DaOutSide_HQRs_WithNH" class="All_100" value="0" readonly/><input type="hidden" Name="DaOutSide_HQRs_WithOutNH" id="DaOutSide_HQRs_WithOutNH" class="All_100" value="0" readonly/></td>
  </tr>

  <?php /****** PD Open ********/ ?>
  <tr>
   <td class="td3">DA @ H.Q.(Only For PD Staff) in case of day tour involving more than 60 kms. travel :</td>
   <td class="td3" align="right"><select Name="DaOutSide_HQPD" class="td3" style="width:50px;" onChange="DAOutSitePD(this.value)" disabled><option value="<?php if($ResEligEmp['Lodging_CategoryA']>0){ if($ResEligEmp['DA_Outside_HqPD']!='') echo 'Y'; else echo 'N'; } else { if($resDaily['OutSiteHQ_Sales']!='' AND $resD2['DepartmentId']==$ResCtc['DepartmentId']) echo 'Y'; else echo 'N'; } ?>">&nbsp;<?php if($ResEligEmp['Lodging_CategoryA']>0){ if($ResEligEmp['DA_Outside_HqPD']!='') echo 'Yes'; else echo 'No'; } else { if($resDaily['OutSiteHQ_Sales']!='' AND $resD2['DepartmentId']==$ResCtc['DepartmentId']) echo 'Yes'; else echo 'No'; } ?></option><option value="<?php if($ResEligEmp['Lodging_CategoryA']>0){ if($ResEligEmp['DA_Outside_HqPD']!='') echo 'N'; else echo 'Y'; } else { if($resDaily['OutSiteHQ_Sales']!='' AND $resD2['DepartmentId']==$ResCtc['DepartmentId']) echo 'N'; else echo 'Y'; } ?>">&nbsp;<?php if($ResEligEmp['Lodging_CategoryA']>0){ if($ResEligEmp['DA_Outside_HqPD']!='') echo 'No'; else echo 'Yes'; } else { if($resDaily['OutSiteHQ_Sales']!='' AND $resD2['DepartmentId']==$ResCtc['DepartmentId']) echo 'No'; else echo 'Yes'; } ?></option></select></td>
   <td class="td3">&nbsp;Rs. :&nbsp;<input Name="DaOutSide_HQPDRs" class="td2" style="width:100px;" value="<?php if($ResEligEmp['Lodging_CategoryA']>0){ echo $ResEligEmp['DA_Outside_HqPD']; } elseif($resDaily['OutSiteHQ_Sales']!='' AND $resD2['DepartmentId']==$ResCtc['DepartmentId']) { echo $resDaily['OutSiteHQ_Sales']; } ?>" readonly/></td>
   <td class="td3">Per Day<input type="hidden" Name="DaOutSide_HQRs_WithNH_PD" id="" class="All_100" value="0" readonly/> <input type="hidden" Name="DaOutSide_HQRs_WithOutNH_PD" id="" class="All_100" value="0" readonly/></td>
  </tr>
  <?php /******* PD Close *******/ ?>
 </table>
 </td>
</tr>
<tr>
 <td class="td2"></td>
 <td>
 <table border="0">
 <tr>
  <td class="td3" style="width:90px;">TwoWheeler:</td>
  <td class="td3" style="width:75px;"><input Name="TwoWheelerKM" class="td3" style="width:70px;" value="<?php if($ResEligEmp['Travel_TwoWeeKM']!='' AND $ResEligEmp['Travel_TwoWeeKM']!='NA' AND $ResEligEmp['Travel_TwoWeeKM']!='0'){echo $ResEligEmp['Travel_TwoWeeKM'].'&nbsp;Per KM';}else{echo 'NA';} ?>" readonly/></td>
  <td class="td3" style="width:40px;">Maxi :</td>
  <td class="td3" style="width:150px;"><input class="td3" style="width:150px;" value="<?php if($ResEligEmp['Travel_TwoWeeLimitPerMonth']!='' AND $ResEligEmp['Travel_TwoWeeLimitPerMonth']!='NA'){echo $ResEligEmp['Travel_TwoWeeLimitPerDay'].'&nbsp;KM PD&nbsp;/&nbsp;'.$ResEligEmp['Travel_TwoWeeLimitPerMonth'].'&nbsp;KM PM'; }else{echo 'NA';} ?>" readonly/></td>
  <td class="td3" style="width:80px;">OutSite HQ :</td>
  <td class="td3" style="width:62px;"><input class="td3" style="width:100px;" value="<?php echo $ResEligEmp['TwoWeeOutSide_Restric']; ?>" readonly/></td>
 </tr>
 
 <?php if($ResEligEmp['LessKm']=='Y'){ ?>
 <tr>
  <td class="td3">FourWheeler:</td>
  <td class="td3" colspan="5">Fuel expense reimbursement on Actual on submission of bill</td>
 </tr>
 <?php }else{ ?>
  <tr>
  <td class="td3">FourWheeler:</td>
  <td class="td3"><input class="td3" style="width:70px;" value="<?php if($ResEligEmp['Travel_FourWeeKM']!='' AND $ResEligEmp['Travel_FourWeeKM']!='NA' AND $ResEligEmp['Travel_FourWeeKM']!='0'){echo $ResEligEmp['Travel_FourWeeKM'].'&nbsp;Per KM';}else{echo 'NA';} ?>" readonly/></td>
  <td class="td3">Maxi :</td>
  <td class="td3"><input class="td3" style="width:150px;" value="<?php if($ResEligEmp['Travel_FourWeeLimitPerMonth']!='' AND $ResEligEmp['Travel_FourWeeLimitPerMonth']!='NA' AND $ResEligEmp['Travel_FourWeeLimitPerMonth']!='0'){if($ResEligEmp['Travel_FourWeeLimitPerMonth']>0){$PerA=$ResEligEmp['Travel_FourWeeLimitPerMonth']*12; $PerAnnum=$PerA.'&nbsp;KM PA';}elseif($ResEligEmp['Travel_FourWeeLimitPerMonth']=='Actual'){$PerAnnum='Actual&nbsp;KM PA';} else{$PerAnnum='';} echo $ResEligEmp['Travel_FourWeeLimitPerMonth'].'&nbsp;KM PM&nbsp;/&nbsp;'.$PerAnnum;}else{echo 'NA';}?>" readonly/></td>
  <td class="td3" style="width:80px;">OutSite HQ :</td>
  <td style="width:62px;"><input class="td3" style="width:100px;" value="<?php echo $ResEligEmp['FourWeeOutSide_Restric']; ?>" readonly/></td>
 </tr>
 <?php } ?>
 
 </table>
 </td>
</tr>
<?php if($resEnt['ModeTravel_Flight']=='Y' AND $resEnt['ModeTravel_Train']=='Y'){$Mode='Flight'.$Cond.'/Train'; $Class=$resEnt['TravelClass_Flight'].'/'.$resEnt['TravelClass_Train'];} elseif($resEnt['ModeTravel_Flight']=='Y' AND $resEnt['ModeTravel_Train']=='N') {$Mode='Flight'.$Cond; $Class=$resEnt['TravelClass_Flight'];} elseif($resEnt['ModeTravel_Flight']=='N' AND $resEnt['ModeTravel_Train']=='Y') {$Mode='Train'; $Class=$resEnt['TravelClass_Train'];} ?>

<tr>
 <td class="td2"></td>
 <td>
 <table border="0">
 <tr>
  <td class="td3" style="width:213px;">Mode of Travels OutSide H.Q. :</td>
  <td class="td3" style="width:50px;"><select Name="ModeTraOutSide_HQ" class="td3" style="width:50px;" onChange="ModeTravel(this.value)" disabled><option value="" selected><?php if($ResEligEmp['Mode_Travel_Outside_Hq']!=''){echo '&nbsp;Yes';}else{echo '&nbsp;No';} ?></option><option value="<?php if(($resEnt['ModeTravel_Flight']=='Y' AND $resEnt['ModeTravel_Train']=='Y') OR ($resEnt['ModeTravel_Flight']=='Y' AND $resEnt['ModeTravel_Train']=='N') OR ($resEnt['ModeTravel_Flight']=='N' AND $resEnt['ModeTravel_Train']=='Y')) echo 'Y'; else echo 'N'; ?>">&nbsp;<?php if(($resEnt['ModeTravel_Flight']=='Y' AND $resEnt['ModeTravel_Train']=='Y') OR ($resEnt['ModeTravel_Flight']=='Y' AND $resEnt['ModeTravel_Train']=='N') OR ($resEnt['ModeTravel_Flight']=='N' AND $resEnt['ModeTravel_Train']=='Y')) echo 'Yes'; else echo 'No'; ?></option><option value="<?php if(($resEnt['ModeTravel_Flight']=='Y' AND $resEnt['ModeTravel_Train']=='Y') OR ($resEnt['ModeTravel_Flight']=='Y' AND $resEnt['ModeTravel_Train']=='N') OR ($resEnt['ModeTravel_Flight']=='N' AND $resEnt['ModeTravel_Train']=='Y')) echo 'N'; else echo 'Y'; ?>">&nbsp;<?php if(($resEnt['ModeTravel_Flight']=='Y' AND $resEnt['ModeTravel_Train']=='Y') OR ($resEnt['ModeTravel_Flight']=='Y' AND $resEnt['ModeTravel_Train']=='N') OR ($resEnt['ModeTravel_Flight']=='N' AND $resEnt['ModeTravel_Train']=='Y')) echo 'No'; else echo 'Yes'; ?></option></select></td>
  <td class="td3" style="width:96px;"><select Name="TraMode" class="td3" style="width:96px;" disabled onChange="Selectmode(this.value)"/><option value="<?php echo $ResEligEmp['Mode_Travel_Outside_Hq']; ?>" selected><?php echo $ResEligEmp['Mode_Travel_Outside_Hq']; ?></option><option value="<?php if(($resEnt['ModeTravel_Flight']=='Y' AND $resEnt['ModeTravel_Train']=='Y') OR ($resEnt['ModeTravel_Flight']=='Y' AND $resEnt['ModeTravel_Train']=='N') OR ($resEnt['ModeTravel_Flight']=='N' AND $resEnt['ModeTravel_Train']=='Y')) echo $Mode; ?>">&nbsp;<?php if(($resEnt['ModeTravel_Flight']=='Y' AND $resEnt['ModeTravel_Train']=='Y') OR ($resEnt['ModeTravel_Flight']=='Y' AND $resEnt['ModeTravel_Train']=='N') OR ($resEnt['ModeTravel_Flight']=='N' AND $resEnt['ModeTravel_Train']=='Y')) echo $Mode; ?></option><option value="Train">&nbsp;Train</option><option value="Flight">&nbsp;Flight</option></select></td>
  <td class="td3" style="width:80px;">Class :</td>
  <td class="td3" style="width:100px;"><span id="ModeClassSpan"><select Name="TraClass" id="" class="All_100" disabled>  <option value="<?php echo $ResEligEmp['TravelClass_Outside_Hq']; ?>" selected><?php echo $ResEligEmp['TravelClass_Outside_Hq']; ?></option><option value="<?php if(($resEnt['ModeTravel_Flight']=='Y' AND $resEnt['ModeTravel_Train']=='Y') OR ($resEnt['ModeTravel_Flight']=='Y' AND $resEnt['ModeTravel_Train']=='N') OR ($resEnt['ModeTravel_Flight']=='N' AND $resEnt['ModeTravel_Train']=='Y')) echo $Class; ?>">&nbsp;<?php if(($resEnt['ModeTravel_Flight']=='Y' AND $resEnt['ModeTravel_Train']=='Y') OR ($resEnt['ModeTravel_Flight']=='Y' AND $resEnt['ModeTravel_Train']=='N') OR ($resEnt['ModeTravel_Flight']=='N' AND $resEnt['ModeTravel_Train']=='Y')) echo $Class; ?></option><option value="General">General</option><option value="Sleeper">Sleeper</option><option value="AC-I">AC-I</option><option value="AC-II">AC-II</option><option value="AC-III" class>AC-III</option></select></span></td>
 </tr>
 </table>
 </td>
</tr>
<?php if($resD2['DepartmentId']==$ResCtc['DepartmentId'] OR $resP2['DepartmentId']==$ResCtc['DepartmentId']) $MR=$resDaily['MRSP']; if($resD2['DepartmentId']!=$ResCtc['DepartmentId'] AND $resP2['DepartmentId']!=$ResCtc['DepartmentId']) $MR=$resDaily['MRNS']; ?>

<tr>
 <td class="td2"></td>
 <td>
 <table border="0">
 <tr>
  <td class="td3" style="width:395px;">Mobile expenses Reimbursement :</td>
  <td class="td3" style="width:52px;"><select Name="MoExpeReim" class="td3" style="width:50px;" onChange="SelectMoExpeReim(this.value)" disabled><option value="<?php if($ResEligEmp['Lodging_CategoryA']>0){if($ResEligEmp['Mobile_Exp_Rem']=='Y') echo 'Y'; else echo 'N';} else { echo 'Y'; } ?>">&nbsp;<?php if($ResEligEmp['Lodging_CategoryA']>0){if($ResEligEmp['Mobile_Exp_Rem']=='Y') echo 'Yes'; else echo 'No';} else { echo 'Yes'; } ?></option><option value="<?php if($ResEligEmp['Lodging_CategoryA']>0){if($ResEligEmp['Mobile_Exp_Rem']=='Y') echo 'N'; else echo 'Y';} else { echo 'N'; } ?>">&nbsp;<?php if($ResEligEmp['Lodging_CategoryA']>0){if($ResEligEmp['Mobile_Exp_Rem']=='Y') echo 'No'; else echo 'Yes';} else { echo 'No'; } ?></option></select></td>
  <td class="td3">
  <input type="hidden" id="ME1" class="All_100" value="<?php echo $resDaily['MRSP']; ?>"/>
  <input type="hidden" id="ME2" class="All_100" value="<?php echo $resDaily['MRNS']; ?>"/>
  <input type="hidden" id="ME3" class="All_100" value="<?php echo $resDaily['MRNS_RD']; ?>"/>
  <input type="hidden" id="prd1" value="<?php echo $resDaily['prd_1']; ?>"/>
  <input type="hidden" id="prd2" value="<?php echo $resDaily['prd_2']; ?>"/>
  <input type="hidden" id="prd3" value="<?php echo $resDaily['prd_3']; ?>"/>
  <input Name="MobileExpRs" class="td3" style="width:50px; text-align:center;" value="<?php if($ResEligEmp['Mobile_Exp_Rem_Rs']!=''){echo $ResEligEmp['Mobile_Exp_Rem_Rs'];} else {echo ''; }?>" readonly maxlength="10"/>
  <input class="td3" style="width:40px;" value="<?php if($ResEligEmp['Prd']!=''){echo $ResEligEmp['Prd'];} else {echo ''; }?>" readonly maxlength="10"/>
  
  </td>						 </tr>
 </table>
 </td>
</tr>
<tr>
 <td class="td3"></td>
 <td>
 <table border="0">
 <tr>
  <td class="td3" style="width:179px;">Mobile Handset :</td>
  <td class="td3" style="width:202px;" align="right">Company Handset:&nbsp;
  <select Name="MoComHandSet" class="td3" style="width:50px;" onChange="SelectComMoHandSet(this.value)" disabled>
  <option value="<?php if($ResEligEmp['Mobile_Company_Hand']=='Y'){echo 'Y';} else{echo 'N';} ?>">&nbsp;<?php if($ResEligEmp['Mobile_Company_Hand']=='Y'){echo 'Yes';} else{echo 'No';} ?></option><option value="<?php if($ResEligEmp['Mobile_Company_Hand']=='Y'){echo 'N';} else{echo 'Y';} ?>">&nbsp;<?php if($ResEligEmp['Mobile_Company_Hand']=='Y'){echo 'No';} else{echo 'Yes';} ?></option></select></td>
  <td class="td3" style="width:6px;"></td>
  <td class="td3" style="width:52px;"><select Name="MoHandSet" class="td3" style="width:50px;" onChange="SelectMoHandSet(this.value)" disabled><option value="<?php if($ResEligEmp['Lodging_CategoryA']>0){if(($ResEligEmp['Mobile_Hand_Elig_Rs']>0 OR $ResEligEmp['Mobile_Hand_Elig_Rs']!='') AND $ResEligEmp['Mobile_Hand_Elig']=='Y') echo 'Y'; else echo 'N';} else { echo 'Y'; } ?>">&nbsp;<?php if($ResEligEmp['Lodging_CategoryA']>0){if(($ResEligEmp['Mobile_Hand_Elig_Rs']>0 OR $ResEligEmp['Mobile_Hand_Elig_Rs']!='') AND $ResEligEmp['Mobile_Hand_Elig']=='Y') echo 'Yes'; else echo 'No';} else { echo 'Yes'; } ?></option><option value="<?php if($ResEligEmp['Lodging_CategoryA']>0){if(($ResEligEmp['Mobile_Hand_Elig_Rs']>0 OR $ResEligEmp['Mobile_Hand_Elig_Rs']!='') AND $ResEligEmp['Mobile_Hand_Elig']=='Y') echo 'N'; else echo 'Y';} else { echo 'N'; } ?>">&nbsp;<?php if($ResEligEmp['Lodging_CategoryA']>0){if(($ResEligEmp['Mobile_Hand_Elig_Rs']>0 OR $ResEligEmp['Mobile_Hand_Elig_Rs']!='') AND $ResEligEmp['Mobile_Hand_Elig']=='Y') echo 'No'; else echo 'Yes';} else { echo 'No';} ?></option></select></td>
  <td class="td3" style="width:100px;"><input Name="MobileHandRs" class="td3" style="width:50px;" value="<?php if($ResEligEmp['Lodging_CategoryA']>0){echo $ResEligEmp['Mobile_Hand_Elig_Rs'];} else { if($resDaily['MH']!='') echo $resDaily['MH']; }?>" readonly maxlength="10"/>
      <input type="checkbox" <?php if($ResEligEmp['Mobile_Hand_Elig_Rs']==$resDaily['MH_GPRS'] AND $ResEligEmp['Mobile_Hand_Elig_Rs']!='' AND $ResEligEmp['Mobile_Hand_Elig_Rs']!='0'){echo 'checked';} ?> disabled /><font size="1">GPRS</font></td>
 </tr>
 </table>
 </td>
</tr>
<tr>
<tr>
 <td class="td3"></td>
 <td>
 <table border="0">
  <tr>
   <td class="td3" style="width:395px;">Misc. expenses(like stationery/photocopy/fax/e-mail/etc) :</td>
   <td class="td3" style="width:52px;"><select Name="MiscExp" class="td3" style="width:50px;" disabled><option value="<?php if($ResEligEmp['Lodging_CategoryA']>0){ echo $ResEligEmp['Misc_Expenses']; } elseif($resD2['DepartmentId']==$ResCtc['DepartmentId'] OR $resP2['DepartmentId']==$ResCtc['DepartmentId']) echo 'Y'; else 'N'; ?>">&nbsp;<?php if($ResEligEmp['Lodging_CategoryA']>0){ if($ResEligEmp['Misc_Expenses']=='Y') echo 'Yes'; else echo 'No'; } elseif($resD2['DepartmentId']==$ResCtc['DepartmentId'] OR $resP2['DepartmentId']==$ResCtc['DepartmentId']) echo 'Yes'; else echo 'No'; ?></option><option value="<?php if($ResEligEmp['Lodging_CategoryA']>0){ if($ResEligEmp['Misc_Expenses']=='Y') echo 'N'; else echo 'Y'; } elseif($resD2['DepartmentId']==$ResCtc['DepartmentId'] OR $resP2['DepartmentId']==$ResCtc['DepartmentId']) echo 'N'; else echo 'Y'; ?>">&nbsp;<?php if($ResEligEmp['Lodging_CategoryA']>0){ if($ResEligEmp['Misc_Expenses']=='Y') echo 'No'; else echo 'Yes'; } elseif($resD2['DepartmentId']==$ResCtc['DepartmentId'] OR $resP2['DepartmentId']==$ResCtc['DepartmentId']) echo 'No'; else echo 'Yes'; ?></option></select></td>														   
  </tr>
 </table>
 </td>
</tr>
<tr>
 <td class="td3"></td>
 <td>
 <table border="0">
  <tr>
   <td class="td3" style="width:452px;">Health Insurance(Premium Paid by Company) :</td>
   <td class="td3" style="width:52px;"><input Name="HealthInsu" class="td3" style="width:100px;" value="<?php if($ResEligEmp['Health_Insurance']>0){echo intval($ResEligEmp['Health_Insurance']);}else {echo intval($ResCtc['EmpAddBenifit_MediInsu_value']); }?><?php //echo $ResEligEmp['Health_Insurance']; ?>" readonly/></td>
  </tr>
 </table>
 </td>
</tr>

<?php /******* New * New * New * New * New * New * New 2222  ********/ ?>
<tr>
 <td class="td3"></td>
 <td>
 <table border="0">
  <tr>
   <td class="td3" style="width:452px;">Executive Health Check-up (Once in 2 yrs) :</td>
   <td class="td3" style="width:100px;"><input class="td3" style="width:100px;" value="<?php if($ResEligEmp['HelthChekUp']!=''){echo $resDaily['HelthChekUp'];}else{echo 'NA'; }?>" readonly/></td>
  </tr>
 </table>
 </td>
</tr>
<?php if($ResEligEmp['CostOfVehicle']>0 AND $ResEligEmp['CostOfVehicle']!=''){?>
<tr>
 <td class="td3"></td>
 <td>
 <table border="0">
  <tr>
   <td class="td3" style="width:452px;">Vehicle entitlement value :</td>
   <td class="td3" style="width:52px;"><input Name="HealthInsu" class="td3" style="width:100px;" value="<?php if($ResEligEmp['CostOfVehicle']>0){echo $ResEligEmp['CostOfVehicle']; } ?>" readonly/></td>
  </tr>
 </table>
 </td>
</tr>
<?php } ?>
<?php /******* New * New * New * New * New * New * New 2222  ********/ ?>

<tr>
 <td class="td3"></td>
 <td>
 <table border="0">
  <tr>
   <td class="td3" style="width:452px;">Bonus/Exgretia(yearly) :</td>
   <td class="td3" style="width:52px;"><input Name="BonusElig" id="BonusElig" class="td3" style="width:100px;" value="As per law" readonly/></td>
  </tr>
  </table>
 </td>
</tr>
<tr>
 <td class="td3"></td>
 <td>
 <table border="0">
  <tr>
   <td class="td3" style="width:452px;">Gratuity :</td>
   <td class="td3" style="width:52px;"><input Name="GratuityElig" id="GratuityElig" class="td3" style="width:100px;" value="As per law" readonly/></td>
  </tr>
  </table>
 </td>
</tr>
<tr>
 <td class="td3"></td>
 <td>
 <table border="0">
 <tr>
  <td class="td3" style="width:196px;">Deduction :</td>
  <td class="td3" style="width:280px;"></td>
 </tr>
 </table>
 </td>
</tr>
<tr>
 <td class="td3"></td>
 <td>
 <table border="0">
 <tr>
  <td class="td3" style="width:196px;">* Deduction - As Per law :</td>
  <td class="td3" style="width:350px;">Provident Fund/ ESCI/ Tax on Employment/ Income Tax</td>
 </tr>
 </table>
 </td>
</tr>
<tr>
 <td class="td3"></td>
 <td>
 <table border="0">
 <tr>
  <td class="td3" style="width:196px;">* Deduction - Actual :</td>
  <td class="td3" style="width:350px;">Any dues to company(if any)/ Advances</td>
 </tr>
 </table>
 </td>
</tr>
<tr>
 <td align="Right" class="fontButton" colspan="6">
  <table border="0" align="right" class="fontButton">
   <tr>	 
	<td class="td3" align="right" style="width:90px;"><input type="button" name="ChangeElig" id="ChangeElig" style="width:90px; display:block;" value="edit" onClick="EditElig()" <?php if($ResP['HR_PmsStatus']!=2) { echo 'disabled'; } ?>></td>
   </tr>
  </table>
 </td>
</tr>
</table>
</td>

 <?php /////////////////////////////////// First Table Data Close //////////////////////////////?>
 <?php /////////////////////////////////// First Table Data Close //////////////////////////////?>
 <?php /////////////////////////////////// First Table Data Close //////////////////////////////?>
 
 <?php /////////////////////////////////// Second Table Data Open //////////////////////////////?>
 <?php /////////////////////////////////// Second Table Data Open //////////////////////////////?>
 <?php /////////////////////////////////// Second Table Data Open //////////////////////////////?>

<td class="td3" id="TDSecond" style="display:none;">
<input type="hidden" id="ComId" value="<?php echo $CompanyId; ?>" />
<table border="0" width="100%" id="TEmp" cellpadding="2" cellspacing="0">
<tr>
 <td class="td3" style="width:2%;"></td>
 <td class="td3" style="width:98%;">
 <table border="0" width="100%">
 <tr>
  <td class="td3" width="25%">Lodging :</td>
  <td class="td2" width="20%">Category A</td>
  <td class="td2" width="20%">Category B</td>
  <td class="td2" width="20%">Category C</td>
  <td class="td2" width="15%"></td>
 </tr>
 <tr>
  <td class="td3">&nbsp;</td>
  <td class="td2"><input class="td2" style="width:100px;" Name="LodgingCatA" id="LodgingCatA" readonly value="<?php echo $resLod['CategoryA_City']; ?>"/></td>
  <td class="td2"><input class="td2" style="width:100px;" Name="LodgingCatB" id="LodgingCatB" readonly value="<?php echo $resLod['CategoryB_City']; ?>"/></td>
  <td class="td2"><input class="td2" style="width:100px;" Name="LodgingCatC" id="LodgingCatC" readonly value="<?php echo $resLod['CategoryC_City']; ?>"/></td>
  <td class="td2"></td>
 </tr>
 </table>
 </td>
</tr>
<tr>
 <td class="td3"></td>
 <td>
 <table border="0">
  <tr>
   <td class="td3" style="width:350px;">DA Outside H.Q. :</td>
   <td class="td3" style="width:52px;" align="right"><select Name="DaOutSide_HQ" id="DaOutSide_HQ" class="td3" style="width:50px;" onChange="DAOutSite(this.value)" disabled><option value="<?php if($resDaily['OutSiteHQ']!='') echo 'Y'; else echo 'N'; ?>">&nbsp;<?php if($resDaily['OutSiteHQ']!='') echo 'Yes'; else echo 'No'; ?></option><option value="<?php if($resDaily['OutSiteHQ']!='') echo 'N'; else echo 'Y'; ?>">&nbsp;<?php if($resDaily['OutSiteHQ']!='') echo 'No'; else echo 'Yes'; ?></option></select></td>
  <td class="td3" style="width:140px;">&nbsp;Rs. :&nbsp;<input Name="DaOutSide_HQRs" id="DaOutSide_HQRs" class="td2" style="width:100px;" value="<?php echo $resDaily['OutSiteHQ']; ?>" readonly/></td>
  <td class="td3" style="width:60px;">Per Day</td>
 </tr>
 <tr>
  <td class="td3">DA @ H.Q.(Only For Sales Staff) :
  <input type="hidden" Name="A1" id="A1" value="<?php echo $resDaily['OutSiteHQ']; ?>"/><input type="hidden" Name="B1" id="B1" value="<?php echo $resDaily['OutSiteHQ_Sales']; ?>"/><input type="hidden" Name="MH" id="MH" value="<?php echo $resDaily['MH']; ?>"/><input type="hidden" Name="MRSP" id="MRSP" value="<?php echo $resDaily['MRSP']; ?>"/><input type="hidden" Name="MRNS" id="MRNS" value="<?php echo $resDaily['MRNS']; ?>"/><input type="hidden" Name="MCS" id="MCS" value="<?php echo $resDaily['MCS']; ?>"/><input type="hidden" Name="MCSSP" id="MCSSP" value="<?php echo $resDaily['MCSSP']; ?>"/></td>
  <td class="td3" align="right"><select Name="DaOutSide_HQSales" id="DaOutSide_HQSales" class="td3" style="width:50px;" onChange="DAOutSiteSales(this.value)" disabled><option value="<?php if($resDaily['OutSiteHQ_Sales']!='' AND $resD2['DepartmentId']==$ResCtc['DepartmentId']) echo 'Y'; else echo 'N';  ?>">&nbsp;<?php if($resDaily['OutSiteHQ_Sales']!='' AND $resD2['DepartmentId']==$ResCtc['DepartmentId']) echo 'Yes'; else echo 'No'; ?></option><option value="<?php if($resDaily['OutSiteHQ_Sales']!='' AND $resD2['DepartmentId']==$ResCtc['DepartmentId']) echo 'N'; else echo 'Y'; ?>">&nbsp;<?php if($resDaily['OutSiteHQ_Sales']!='' AND $resD2['DepartmentId']==$ResCtc['DepartmentId']) echo 'No'; else echo 'Yes';?></option>								    </select></td>
  <td class="td3">&nbsp;Rs. :&nbsp;<input Name="DaOutSide_HQSalesRs" id="DaOutSide_HQSalesRs" class="td2" style="width:100px;" value="<?php if($resDaily['OutSiteHQ_Sales']!='' AND $resD2['DepartmentId']==$ResCtc['DepartmentId']) { echo $resDaily['OutSiteHQ_Sales']; } ?>" readonly/></td>
  <td class="td3">Per Day<input type="hidden" Name="DaOutSide_HQRs_WithNH" id="DaOutSide_HQRs_WithNH" class="All_100" value="0" readonly/><input type="hidden" Name="DaOutSide_HQRs_WithOutNH" id="DaOutSide_HQRs_WithOutNH" class="All_100" value="0" readonly/></td>
 </tr>
 <?php /****** PD ********/ ?>
 <tr>
  <td class="td3">DA @ H.Q.(Only For PD Staff) in case of day tour involving more than 60 kms. travel :</td>
  <td class="td3" align="right"><select Name="DaOutSide_HQPD" id="DaOutSide_HQPD" class="td3" style="width:50px;" onChange="DAOutSitePD(this.value)" disabled><option value="<?php if($resDaily['OutSiteHQ_Sales']!='' AND $resPD2['DepartmentId']==$ResCtc['DepartmentId']) echo 'Y'; else echo 'N'; ?>"  selected>&nbsp;<?php if($resDaily['OutSiteHQ_Sales']!='' AND $resPD2['DepartmentId']==$ResCtc['DepartmentId']) echo 'Yes'; else echo 'No'; ?></option><option value="<?php if($resDaily['OutSiteHQ_Sales']!='' AND $resPD2['DepartmentId']==$ResCtc['DepartmentId']) echo 'N'; else echo 'Y';  ?>">&nbsp;<?php if($resDaily['OutSiteHQ_Sales']!='' AND $resPD2['DepartmentId']==$ResCtc['DepartmentId']) echo 'No'; else echo 'Yes'; ?></option></select></td>
  <td class="td3">&nbsp;Rs. :&nbsp;<input Name="DaOutSide_HQPDRs" id="DaOutSide_HQPDRs" class="td2" style="width:100px;" value="<?php if($resDaily['OutSiteHQ_Sales']!='' AND $resPD2['DepartmentId']==$ResCtc['DepartmentId']) { echo $resDaily['OutSiteHQ_Sales']; } ?>" readonly/></td>
  <td class="td3">Per Day <input type="hidden" Name="DaOutSide_HQRs_WithNH_PD" id="DaOutSide_HQRs_WithNH_PD" class="All_100" value="0" readonly/><input type="hidden" Name="DaOutSide_HQRs_WithOutNH_PD" id="DaOutSide_HQRs_WithOutNH_PD" class="All_100" value="0" readonly/></td>
 </tr>
 <?php /******* PD *******/ ?>
 </table>
 </td>
</tr>


<?php /******* New * New * New * New * New * New * New ********/ ?>
<script type="text/javascript" language="javascript">
function FunCPolicy()
{
  if(document.getElementById("CarPolicy").checked==true)
  { 
   document.getElementById("Car2Policy").value='Y'; document.getElementById("VehicleCost").disabled=false; document.getElementById("WithDriver").disabled=false; document.getElementById("AdvanceCom").disabled=false; document.getElementById("DateOfEPolicy").disabled=false; document.getElementById("FourWheelerKM").value=document.getElementById("oWt2").value; document.getElementById("VehicleCost").value=document.getElementById("FwLimit").value; document.getElementById("DateOfEPolicy").value=document.getElementById("CDate").value;
  }
  else
  { 
   document.getElementById("Car2Policy").value='N'; document.getElementById("VehicleCost").value=0; document.getElementById("VehicleCost").disabled=true; document.getElementById("WithDriver").checked=false; document.getElementById("WithDriver").disabled=true; document.getElementById("AdvanceCom").checked=false; document.getElementById("AdvanceCom").disabled=true; document.getElementById("DateOfEPolicy").value=''; document.getElementById("DateOfEPolicy").disabled=true; document.getElementById("FourWheelerKM").value=document.getElementById("Wy").value; document.getElementById("VehicleCost").value=0;
  } 
}

function FunAdvanceCom(d)
{
 if(document.getElementById("AdvanceCom").checked==true)
 { 
   document.getElementById("Advance2Com").value='Y'; 
   if(document.getElementById("WithDriver").checked==true)
   { document.getElementById("FourWheelerKM").value=document.getElementById("nW2").value; }
   else
   { document.getElementById("FourWheelerKM").value=document.getElementById("nWt2").value; }
 }
 else
 { 
   document.getElementById("Advance2Com").value='N'; 
   if(document.getElementById("WithDriver").checked==true)
   { document.getElementById("FourWheelerKM").value=document.getElementById("oW2").value; }
   else
   { document.getElementById("FourWheelerKM").value=document.getElementById("oWt2").value; }
 }
}


function FunWDriver(d) 
{
  if(document.getElementById("WithDriver").checked==true)
  {
    document.getElementById("With2Driver").value='Y'; 
	if(document.getElementById("AdvanceCom").checked==true)
    { document.getElementById("FourWheelerKM").value=document.getElementById("nW2").value; }
    else
    { document.getElementById("FourWheelerKM").value=document.getElementById("oW2").value; }
  }
  else
  {
    document.getElementById("With2Driver").value='N'; 
	if(document.getElementById("AdvanceCom").checked==true)
    { document.getElementById("FourWheelerKM").value=document.getElementById("nWt2").value; }
    else
    { document.getElementById("FourWheelerKM").value=document.getElementById("oWt2").value; }
  }
}

function FunLessKm()
{
  if(document.getElementById("LessKm").checked==true)
  { document.getElementById("Less2Km").value='Y'; document.getElementById("VehicleCost").disabled=false; }
  else{ document.getElementById("Less2Km").value='N'; }
}

</script>
<?php $DptId=$ResCtc['DepartmentId']; 
	  if($DptId==4 OR $DptId==25)  //Prod && FS
	  { $FwLimit=$resVehp['LimitsPrd']; $nWy=$resElig['FourWheeler'];
	    $nW2y=$resVehp['nWDr_2yPrd'];   $nW35y=$resVehp['nWDr_35yPrd']; 
	    $nWt2y=$resVehp['nWtDr_2yPrd']; $nWt35y=$resVehp['nWtDr_35yPrd']; 
		$oW2y=$resVehp['oWDr_2yPrd'];   $oW35y=$resVehp['oWDr_35yPrd'];
		$oWt2y=$resVehp['oWtDr_2yPrd']; $oWt35y=$resVehp['oWtDr_35yPrd'];
	  }
	  elseif($DptId==6 OR $DptId==3)  //Sal && PD
	  { $FwLimit=$resVehp['LimitsSal']; $nWy=$resElig['FourWheeler'];
	    $nW2y=$resVehp['nWDr_2ySal'];   $nW35y=$resVehp['nWDr_35ySal']; 
	    $nWt2y=$resVehp['nWtDr_2ySal']; $nWt35y=$resVehp['nWtDr_35ySal']; 
		$oW2y=$resVehp['oWDr_2ySal'];   $oW35y=$resVehp['oWDr_35ySal'];
		$oWt2y=$resVehp['oWtDr_2ySal']; $oWt35y=$resVehp['oWtDr_35ySal'];
	  } 
	  else
	  { $FwLimit=0; $nWy=$resElig['FourWheeler']; 
	    $nW2y=0; $nW35y=0; $nWt2y=0; $nWt35y=0; $oW2y=0; $oW35y=0; $oWt2y=0; $oWt35y=0;
	  }
	  
echo '<input type="hidden" id="FwLimit" value="'.$FwLimit.'"/><input type="hidden" id="Wy" value="'.$nWy.'"/>';
echo '<input type="hidden" id="nW2" value="'.$nW2y.'"/><input type="hidden" id="nW35" value="'.$nW35y.'"/>';
echo '<input type="hidden" id="nWt2" value="'.$nWt2y.'"/><input type="hidden" id="nWt35" value="'.$nWt35y.'"/>';
echo '<input type="hidden" id="oW2" value="'.$oW2y.'"/><input type="hidden" id="oW35" value="'.$oW35y.'"/>';
echo '<input type="hidden" id="oWt2" value="'.$oWt2y.'"/><input type="hidden" id="oWt35" value="'.$oWt35y.'"/>';
echo '<input type="hidden" id="DptId" value="'.$DptId.'"/>';
echo '<input type="hidden" id="CDate" value="'.date("d-m-Y").'"/>';
?>


<tr>
 <td class="td3"></td>
 <td>
 <table border="0">
  <tr>
   <td class="td3" style="width:300px;"><b>Own Your Car Policy Eligibility:</b>&nbsp;<input type="checkbox" id="CarPolicy" <?php if($ResEligEmp['FourWElig']=='Y'){echo 'checked';} ?> onClick="FunCPolicy()" /><input type="hidden" id="Car2Policy" name="Car2Policy" value="<?php echo $ResEligEmp['FourWElig']; ?>" /></td>
   <td class="td3" style="width:200px;"><b>Less Km run:</b>&nbsp;<input type="checkbox" id="LessKm" <?php if($ResEligEmp['LessKm']=='Y'){echo 'checked';} ?> onClick="FunLessKm()" /><input type="hidden" id="Less2Km" name="Less2Km" value="<?php echo $ResEligEmp['LessKm']; ?>" /></td>
  </tr>
 </table>
 </td>
</tr>
<tr>
 <td class="td3"></td>
 <td>
 <table border="1" cellspacing="1" style="background-color:#D6F46C;">
   <tr>
   <td class="td3" style="width:250px;">&nbsp;Policy Entry Date :&nbsp;<input id="DateOfEPolicy" name="DateOfEPolicy" value="<?php if($ResEligEmp['FourWElig']=='Y'){ if($ResEligEmp['DateOfEntryPolicy']!='0000-00-00' AND $ResEligEmp['DateOfEntryPolicy']!='1970-01-01'){ echo date("d-m-Y",strtotime($ResEligEmp['DateOfEntryPolicy'])); }else { echo date("d-m-Y"); } } ?>" <?php if($ResEligEmp['FourWElig']=='N'){echo 'disabled';} ?> style="width:100px; text-align:center;" class="td3" readonly /><script type="text/javascript">  var cal = Calendar.setup({ onSelect:  function(cal) { cal.hide()}, showTime: true }); cal.manageFields("DateOfEPolicy", "DateOfEPolicy", "%d-%m-%Y");</script></td>
   <td class="td3" style="width:200px;">&nbsp;Cost Of Vehicle:&nbsp;<select id="VehicleCost" name="VehicleCost" style="width:80px;" class="td3" <?php if($ResEligEmp['FourWElig']=='N'){echo 'disabled';} ?>><option value="<?php if($ResEligEmp['CostOfVehicle']!=''){echo $ResEligEmp['CostOfVehicle'];}else{echo 0;} ?>"><?php if($ResEligEmp['CostOfVehicle']!=''){echo $ResEligEmp['CostOfVehicle'];}else{echo 'select';} ?></option><option value="6 Lacs">6 Lacs</option><option value="7.5 Lacs">7.5 Lacs</option><option value="9 Lacs">9 Lacs</option><option value="10 Lacs">10 Lacs</option><option value="12 Lacs">12 Lacs</option></select></td>
   
  </tr>
  <tr>
   <td class="td3">&nbsp;Advance Of Company:&nbsp;<input type="checkbox" id="AdvanceCom" <?php if($ResEligEmp['AdvanceCom']=='Y'){echo 'checked';} ?> onClick="FunAdvanceCom(<?php echo $DptId; ?>)" <?php if($ResEligEmp['FourWElig']=='N'){echo 'disabled';} ?> /><input type="hidden" id="Advance2Com" name="Advance2Com" value="<?php echo $ResEligEmp['AdvanceCom']; ?>" /></td>
   <td class="td3">&nbsp;With Driver:&nbsp;<input type="checkbox" id="WithDriver" <?php if($ResEligEmp['WithDriver']=='Y'){echo 'checked';} ?> onClick="FunWDriver(<?php echo $DptId; ?>)" <?php if($ResEligEmp['FourWElig']=='N'){echo 'disabled';} ?> /><input type="hidden" id="With2Driver" name="With2Driver" value="<?php echo $ResEligEmp['WithDriver']; ?>" /></td>
   
   
  </tr>
 </table>
 </td>
</tr>
<?php /******* New * New * New * New * New * New * New ********/ ?>

<tr>
 <td class="td3"></td>
 <td>
  <table border="0">
  <?php /************* Open **********************/ ?>
  <tr>
   <td class="td3" style="width:90px;">TwoWheeler:</td>
   <td class="td3" style="width:75px;"><input Name="TwoWheelerKM" id="TwoWheelerKM" class="td3" style="width:30px;" value="<?php echo $resElig['TwoWheeler'];?>" readonly/>&nbsp;Per KM</td>
   <td class="td3" style="width:40px;">Maxi :</td>
   <td class="td3" style="width:150px;"><input Name="TwoWRestrict_PD" id="TwoWRestrict_PD" class="td3" style="width:50px;" value="<?php if($resD2['DepartmentId']==$ResCtc['DepartmentId'] AND $resElig['TwoWheeler_Restric_Sales_PD']!=''){ echo $resElig['TwoWheeler_Restric_Sales_PD'];} elseif($resD2['DepartmentId']!=$ResCtc['DepartmentId'] AND $resElig['TwoWheeler_Restric_PD']!=''){echo $resElig['TwoWheeler_Restric_PD'];}?>" readonly/>&nbsp;PD<input Name="TwoWRestrict" id="TwoWRestrict" class="td3" style="width:50px;" value="<?php if($resD2['DepartmentId']==$ResCtc['DepartmentId'] AND $resElig['TwoWheeler_Restric_Sales']!=''){ echo $resElig['TwoWheeler_Restric_Sales'];} elseif($resD2['DepartmentId']!=$ResCtc['DepartmentId'] AND $resElig['TwoWheeler_Restric']!=''){echo $resElig['TwoWheeler_Restric'];}?>" readonly/>&nbsp;PM</td>
   <td class="td3" style="width:80px;">OutSite HQ :</td>
   <td class="td3" style="width:62px;"><input class="td3" style="width:100px;" Name="TwoWRestrict_OutSite" id="TwoWRestrict_OutSite" value="<?php if($resD2['DepartmentId']==$ResCtc['DepartmentId'] AND $resElig['TwoWheeler_Restric_OutSite_Sales']!=''){echo $resElig['TwoWheeler_Restric_OutSite_Sales'].'&nbsp;KM PM';}elseif($resD2['DepartmentId']!=$ResCtc['DepartmentId'] AND $resElig['TwoWheeler_Restric_OutSite']!=''){echo $resElig['TwoWheeler_Restric_OutSite'].'&nbsp;KM PM';} else {echo 'NA';} ?>" readonly/></td>
  </tr>
  <tr>
   <td class="td3" style="width:90px;">FourWheeler:</td>
   <td class="td3" style="width:75px;"><input Name="FourWheelerKM" id="FourWheelerKM" class="td3" style="width:30px;" value="<?php if($ResEligEmp['FourWElig']=='Y'){ echo $ResEligEmp['Travel_FourWeeKM']; }else{ if($ResCtc['DepartmentId']==2 && $resElig['FourWheeler_Restric_Resrch']!=''){ echo $resElig['FourWheeler'];}elseif($ResCtc['DepartmentId']!=2){echo $resElig['FourWheeler']; }else{echo $resElig['FourWheeler'];} } ?>" readonly/>&nbsp;Per KM</td>
   <?php /*<td class="td3" style="width:75px;"><input Name="FourWheelerKM" id="FourWheelerKM" class="td3" style="width:30px;" value="<?php if($ResEligEmp['FourWElig']=='Y'){ echo $ResEligEmp['Travel_FourWeeKM']; }else{echo $resElig['FourWheeler'];}?>" readonly/>&nbsp;Per KM</td>*/?>
   <td class="td3" style="width:40px;">Maxi :</td>
   <td class="td3" style="width:150px;"><input Name="FourWRestrict" id="FourWRestrict" class="td3" style="width:50px;" value="<?php if($resD2['DepartmentId']==$ResCtc['DepartmentId'] AND $resElig['FourWheeler_Restric_Sales']!=''){ echo $resElig['FourWheeler_Restric_Sales'];} elseif($resD2['DepartmentId']!=$ResCtc['DepartmentId'] AND $resElig['FourWheeler_Restric']!=''){echo $resElig['FourWheeler_Restric'];}?>" readonly/>&nbsp;PM<input Name="FourWRestrict_PD" id="FourWRestrict_PD" class="td3" style="width:50px;" value="<?php if($resD2['DepartmentId']==$ResCtc['DepartmentId']){if($resElig['FourWheeler_Restric_Sales']!='Actual' AND $resElig['FourWheeler_Restric_Sales']!=''){$PerAnnum=$resElig['FourWheeler_Restric_Sales']*12; echo $PerAnnum;}elseif($resElig['FourWheeler_Restric_Sales']=='Actual'){$PerAnnum='Actual'; echo $PerAnnum;}else{echo 'NA';}}elseif($resD2['DepartmentId']!=$ResCtc['DepartmentId']){if($resElig['FourWheeler_Restric']!='Actual' AND $resElig['FourWheeler_Restric']!=''){$PerAnnum=$resElig['FourWheeler_Restric']*12; echo $PerAnnum;}elseif($resElig['FourWheeler_Restric']=='Actual'){$PerAnnum='Actual'; echo $PerAnnum;}else{echo 'NA';}}?>" readonly/>&nbsp;PA</td>
   <td class="td3" style="width:80px;">OutSite HQ :</td> 
   <td class="td3" style="width:62px;"><input class="td3" style="width:100px;" Name="FourWRestrict_OutSite" id="FourWRestrict_OutSite" value="<?php if($resD2['DepartmentId']==$ResCtc['DepartmentId'] AND $resElig['FourWheeler_Restric_OutSite_Sales']!=''){echo $resElig['FourWheeler_Restric_OutSite_Sales'].'&nbsp;KM PM';}elseif($resD2['DepartmentId']!=$ResCtc['DepartmentId'] AND $resElig['FourWheeler_Restric_OutSite']!=''){echo $resElig['FourWheeler_Restric_OutSite'].'&nbsp;KM PM';} else {echo 'NA';} ?>" readonly/></td>
 </tr>
 <?php /************** Close ********************/  ?>
 </table>

 </td>
</tr>
<?php if($resEnt['ModeTravel_Flight']=='Y' AND $resEnt['ModeTravel_Train']=='Y'){$Mode='Flight'.$Cond.'/Train'; $Class=$resEnt['TravelClass_Flight'].'/'.$resEnt['TravelClass_Train'];} elseif($resEnt['ModeTravel_Flight']=='Y' AND $resEnt['ModeTravel_Train']=='N') {$Mode='Flight'.$Cond; $Class=$resEnt['TravelClass_Flight'];} elseif($resEnt['ModeTravel_Flight']=='N' AND $resEnt['ModeTravel_Train']=='Y') {$Mode='Train'; $Class=$resEnt['TravelClass_Train'];}?>
<tr>
 <td class="td3"></td>
 <td>
  <table border="0"><tr>
   <td class="td3" style="width:213px;">Mode of Travels OutSide H.Q. :</td>
   <td class="td3" style="width:50px;"><select Name="ModeTraOutSide_HQ" id="ModeTraOutSide_HQ" class="td3" style="width:50px;" onChange="ModeTravel(this.value)" disabled><option value="<?php if($ResEligEmp['Mode_Travel_Outside_Hq']!='' AND $ResEligEmp['Mode_Travel_Outside_Hq']!='NA'){echo 'Y';}else{ echo 'N';} ?>">&nbsp;<?php if($ResEligEmp['Mode_Travel_Outside_Hq']!='' AND $ResEligEmp['Mode_Travel_Outside_Hq']!='NA'){echo 'Yes';}else{ echo 'No';} ?></option>  <option value="<?php if($ResEligEmp['Mode_Travel_Outside_Hq']!='' AND $ResEligEmp['Mode_Travel_Outside_Hq']!='NA'){echo 'N';}else{ echo 'Y';} ?>">&nbsp;<?php if($ResEligEmp['Mode_Travel_Outside_Hq']!='' AND $ResEligEmp['Mode_Travel_Outside_Hq']!='NA'){echo 'No';}else{ echo 'Yes';} ?></option></select></td>
   <td class="td3" style="width:96px;"><select Name="TraMode" id="TraMode" class="td3" style="width:96px;" onChange="Selectmode(this.value)"/><option value="<?php if(($resEnt['ModeTravel_Flight']=='Y' AND $resEnt['ModeTravel_Train']=='Y') OR ($resEnt['ModeTravel_Flight']=='Y' AND $resEnt['ModeTravel_Train']=='N') OR ($resEnt['ModeTravel_Flight']=='N' AND $resEnt['ModeTravel_Train']=='Y')) echo $Mode; ?>" selected>&nbsp;<?php if(($resEnt['ModeTravel_Flight']=='Y' AND $resEnt['ModeTravel_Train']=='Y') OR ($resEnt['ModeTravel_Flight']=='Y' AND $resEnt['ModeTravel_Train']=='N') OR ($resEnt['ModeTravel_Flight']=='N' AND $resEnt['ModeTravel_Train']=='Y')) echo $Mode; ?></option><option value="Flight">&nbsp;Flight</option><option value="Train">&nbsp;Train</option><option value="Flight/Train">&nbsp;Flight/Train</option></select></td>
   <td class="td3" style="width:80px;">Class :</td>
   <td class="td3" style="width:100px;"><span id="ModeClassSpan"><select Name="TraClass" id="TraClass" class="td3" style="width:100px;"><option value="<?php if(($resEnt['ModeTravel_Flight']=='Y' AND $resEnt['ModeTravel_Train']=='Y') OR ($resEnt['ModeTravel_Flight']=='Y' AND $resEnt['ModeTravel_Train']=='N') OR ($resEnt['ModeTravel_Flight']=='N' AND $resEnt['ModeTravel_Train']=='Y')) echo $Class; ?>" selected><?php if(($resEnt['ModeTravel_Flight']=='Y' AND $resEnt['ModeTravel_Train']=='Y') OR ($resEnt['ModeTravel_Flight']=='Y' AND $resEnt['ModeTravel_Train']=='N') OR ($resEnt['ModeTravel_Flight']=='N' AND $resEnt['ModeTravel_Train']=='Y')) echo $Class; ?></option><option value="General">General</option><option value="Sleeper">Sleeper</option><option value="Economy/AC">Economy/AC</option><option value="AC">AC</option><option value="AC-I">AC-I</option><option value="AC-II">AC-II</option><option value="AC-III" class>AC-III</option><option value="Economy">Economy</option></select></span></td>
  </tr>
 </table>
 </td>
</tr>
<?php if($ResCtc['DepartmentId']==6 OR $ResCtc['DepartmentId']==4 OR $ResCtc['DepartmentId']==3 OR $ResCtc['DepartmentId']==25){ $MR=$resDaily['MRSP'];} else{ $MR=$resDaily['MRNS']; }
//if($resD2['DepartmentId']==$ResCtc['DepartmentId'] OR $resP2['DepartmentId']==$ResCtc['DepartmentId']) $MR=$resDaily['MRSP']; if($resD2['DepartmentId']!=$ResCtc['DepartmentId'] AND $resP2['DepartmentId']!=$ResCtc['DepartmentId']) $MR=$resDaily['MRNS']; ?>
<tr>
 <td class="td3"></td>
 <td>
 <table border="0">
 <tr>
  <td class="td3" style="width:395px;">Mobile expenses Reimbursement :</td>
  <td class="td3" style="width:52px;"><select Name="MoExpeReim" id="MoExpeReim" class="td3" style="width:50px;" onChange="SelectMoExpeReim(this.value)" disabled><option value="<?php if($ResEligEmp['Lodging_CategoryA']>0){if($ResEligEmp['Mobile_Exp_Rem']=='Y') echo 'Y'; else echo 'N';} else { echo 'Y'; } ?>">&nbsp;<?php if($ResEligEmp['Lodging_CategoryA']>0){if($ResEligEmp['Mobile_Exp_Rem']=='Y') echo 'Yes'; else echo 'No';} else { echo 'Yes'; } ?></option><option value="<?php if($ResEligEmp['Lodging_CategoryA']>0){if($ResEligEmp['Mobile_Exp_Rem']=='Y') echo 'N'; else echo 'Y';} else { echo 'N'; } ?>">&nbsp;<?php if($ResEligEmp['Lodging_CategoryA']>0){if($ResEligEmp['Mobile_Exp_Rem']=='Y') echo 'No'; else echo 'Yes';} else { echo 'No'; } ?></option></select></td>
  <td class="td3" style="width:100px;">
  <input type="hidden" id="ME1" class="All_100" value="<?php echo $resDaily['MRSP']; ?>"/>
  <input type="hidden" id="ME2" class="All_100" value="<?php echo $resDaily['MRNS']; ?>"/>
  <input type="hidden" id="ME3" class="All_100" value="<?php echo $resDaily['MRNS_RD']; ?>"/>
  <input type="hidden" id="prd1" value="<?php echo $resDaily['prd_1']; ?>"/>
  <input type="hidden" id="prd2" value="<?php echo $resDaily['prd_2']; ?>"/>
  <input type="hidden" id="prd3" value="<?php echo $resDaily['prd_3']; ?>"/>
  
  <input Name="MobileExpRs" id="MobileExpRs" class="td3" style="width:50px;" value="<?php if($ResEligEmp['Lodging_CategoryA']>0){echo $ResEligEmp['Mobile_Exp_Rem_Rs'];} else { if($MR!='') echo $MR; }?>" readonly maxlength="10"/>
  <select Name="Prdd" id="Prdd" class="td3" style="width:40px;"><?php if($ResEligEmp['Prd']!=''){ ?><option value="<?php echo $ResEligEmp['Prd']; ?>"><?php echo $ResEligEmp['Prd']; ?></option><?php }else{?><option value=""></option><?php } ?><option value="Month">Mnt</option><option value="Qtr">Qtr</option><option value="Annual">Annual</option></select>
  
  </td>														
 </tr>
 </table>
 </td>
</tr>
<tr>
 <td class="td3"></td>
 <td>
 <table border="0">
  <tr>
   <td class="td3" style="width:179px;">Mobile Handset :</td>
   <td class="td3" style="width:202px;" align="right">Company Handset:&nbsp;<select Name="MoComHandSet" id="MoComHandSet" class="td3" style="width:50px;" onChange="SelectComMoHandSet(this.value)" disabled><option value="<?php if($ResEligEmp['Mobile_Company_Hand']=='Y'){echo 'Y';} else{echo 'N';} ?>">&nbsp;<?php if($ResEligEmp['Mobile_Company_Hand']=='Y'){echo 'Yes';} else{echo 'No';} ?></option><option value="<?php if($ResEligEmp['Mobile_Company_Hand']=='Y'){echo 'N';} else{echo 'Y';} ?>">&nbsp;<?php if($ResEligEmp['Mobile_Company_Hand']=='Y'){echo 'No';} else{echo 'Yes';} ?></option></select></td>
   <td class="td3" style="width:6px;"></td>
   <td class="td3" style="width:52px;"><select Name="MoHandSet" id="MoHandSet" class="td3" style="width:50px;" onChange="SelectMoHandSet(this.value)" disabled><option value="<?php if($ResEligEmp['Lodging_CategoryA']>0){if(($ResEligEmp['Mobile_Hand_Elig_Rs']>0 OR $ResEligEmp['Mobile_Hand_Elig_Rs']!='') AND $ResEligEmp['Mobile_Hand_Elig']=='Y') echo 'Y'; else echo 'N';} else { echo 'Y'; } ?>">&nbsp;<?php if($ResEligEmp['Lodging_CategoryA']>0){if(($ResEligEmp['Mobile_Hand_Elig_Rs']>0 OR $ResEligEmp['Mobile_Hand_Elig_Rs']!='') AND $ResEligEmp['Mobile_Hand_Elig']=='Y') echo 'Yes'; else echo 'No';} else { echo 'Yes'; } ?></option><option value="<?php if($ResEligEmp['Lodging_CategoryA']>0){if(($ResEligEmp['Mobile_Hand_Elig_Rs']>0 OR $ResEligEmp['Mobile_Hand_Elig_Rs']!='') AND $ResEligEmp['Mobile_Hand_Elig']=='Y') echo 'N'; else echo 'Y';} else { echo 'N'; } ?>">&nbsp;<?php if($ResEligEmp['Lodging_CategoryA']>0){if(($ResEligEmp['Mobile_Hand_Elig_Rs']>0 OR $ResEligEmp['Mobile_Hand_Elig_Rs']!='') AND $ResEligEmp['Mobile_Hand_Elig']=='Y') echo 'No'; else echo 'Yes';} else { echo 'No';} ?></option></select></td>
   <td class="td3" style="width:100px;"><input Name="MobileHandRs" id="MobileHandRs" class="td3" style="width:50px;" value="<?php if($ResEligEmp['Lodging_CategoryA']>0){echo $ResEligEmp['Mobile_Hand_Elig_Rs'];} else { if($resDaily['MH']!='') echo $resDaily['MH']; }?>" readonly maxlength="10"/><input type="checkbox" name="GPCheck" id="GPCheck" onClick="ClickGPRS()" <?php if($ResEligEmp['Mobile_Hand_Elig_Rs']==$resDaily['MH_GPRS'] AND $ResEligEmp['Mobile_Hand_Elig_Rs']!='' AND $ResEligEmp['Mobile_Hand_Elig_Rs']!='0'){echo 'checked';} ?> /><font size="1">GPRS</font>
  <input type="hidden" name="MH_GPRS" id="MH_GPRS" value="<?php echo $resDaily['MH_GPRS']; ?>" /><input type="hidden" id="MobileHand" class="td3" style="width:100px;" value="<?php echo $resDaily['MH']; ?>" readonly/></td>
  </tr>
 </table>
 </td>
</tr>
<tr>
 <td class="td3"></td>
 <td>
 <table border="0">
  <tr>
   <td class="td3" style="width:395px;">Misc. expenses(like stationery/photocopy/fax/e-mail/etc) :</td>
   <td class="td3" style="width:52px;"><select Name="MiscExp" id="MiscExp" class="td3" style="width:50px;" disabled>  <option value="<?php if($ResEligEmp['Lodging_CategoryA']>0){ echo $ResEligEmp['Misc_Expenses']; } elseif($ResCtc['DepartmentId']==6 OR $ResCtc['DepartmentId']==4 OR $ResCtc['DepartmentId']==3 OR $ResCtc['DepartmentId']==25 OR $ResCtc['DepartmentId']==27) echo 'Y'; else 'N'; ?>">&nbsp;<?php if($ResEligEmp['Lodging_CategoryA']>0){ if($ResEligEmp['Misc_Expenses']=='Y') echo 'Yes'; else echo 'No'; } elseif($ResCtc['DepartmentId']==6 OR $ResCtc['DepartmentId']==4 OR $ResCtc['DepartmentId']==3 OR $ResCtc['DepartmentId']==25 OR $ResCtc['DepartmentId']==27) echo 'Yes'; else echo 'No'; ?></option><option value="<?php if($ResEligEmp['Lodging_CategoryA']>0){ if($ResEligEmp['Misc_Expenses']=='Y') echo 'N'; else echo 'Y'; } elseif($ResCtc['DepartmentId']==6 OR $ResCtc['DepartmentId']==4 OR $ResCtc['DepartmentId']==3 OR $ResCtc['DepartmentId']==25) echo 'N'; else echo 'Y'; ?>">&nbsp;<?php if($ResEligEmp['Lodging_CategoryA']>0){ if($ResEligEmp['Misc_Expenses']=='Y') echo 'No'; else echo 'Yes'; } elseif($ResCtc['DepartmentId']==6 OR $ResCtc['DepartmentId']==4 OR $ResCtc['DepartmentId']==3 OR $ResCtc['DepartmentId']==25 OR $ResCtc['DepartmentId']==27) echo 'No'; else echo 'Yes'; ?></option></select></td>													  
  </tr>
 </table>
 </td>
</tr>
<tr>
 <td class="td3"></td>
 <td>
 <table border="0">
  <tr>
   <td class="td3" style="width:452px;">Health Insurance(Premium Paid by Company) :</td>
   <td class="td3" style="width:100px;"><input Name="HealthInsu" id="HealthInsu" class="td3" style="width:100px;" value="<?php echo $ResCtc['EmpAddBenifit_MediInsu_value']; //if($resDaily['MCSSP']!='' AND ($resD2['DepartmentId']==$ResCtc['DepartmentId'] OR $resP2['DepartmentId']==$ResCtc['DepartmentId'])){echo intval($resDaily['MCSSP']);}else {echo intval($resDaily['MCS']); }?><?php //echo $ResEligEmp['Health_Insurance']; ?>" readonly/></td>
  </tr>
 </table>
 </td>
</tr>

<?php /******* New * New * New * New * New * New * New 2222  ********/ ?>
<?php $sqldb=mysql_query("select DOB from hrm_employee_general where EmployeeID=".$EmpId,$con); 
$resdb=mysql_fetch_assoc($sqldb);
$date1 = $resdb['DOB'];
$date2 = date("Y-m-d");
$diff = abs(strtotime($date2) - strtotime($date1));
$years = floor($diff/(365*60*60*24));
$months = floor(($diff-$years*365*60*60*24)/(30*60*60*24));
$days = floor(($diff-$years*365*60*60*24-$months*30*60*60*24)/(60*60*24)); 
$VNRExpMain=$years.'.'.$months;	
?>
<tr>
 <td class="td3"></td>
 <td>
 <table border="0">
  <tr>
   <td class="td3" style="width:452px;">Executive Health Check-up (Once in 2 yrs) :</td>
   <td class="td3" style="width:100px;"><input class="td3" style="width:100px;" value="<?php if($resDaily['HelthChekUp']!='' AND $VNRExpMain>40){echo $resDaily['HelthChekUp'];}else{echo 'NA'; }?>" readonly/><input type="hidden" Name="HelthChekUp" id="HelthChekUp" value="<?php if($resDaily['HelthChekUp']!='' AND $VNRExpMain>40){echo 'Y';}else{echo 'N'; }?>" /></td>
  </tr>
 </table>
 </td>
</tr>
<?php /******* New * New * New * New * New * New * New 2222  ********/ ?>

<tr>
 <td class="td3"></td>
 <td>
 <table border="0">
  <tr>
   <td class="td3" style="width:452px;">Bonus/Exgretia(yearly) :</td>
   <td class="td3" style="width:100px;"><input Name="BonusElig" id="BonusElig" class="td3" style="width:100px;" value="As per law" readonly/></td>
  </tr>
 </table>
 </td>
</tr>
<tr>
 <td class="td3"></td>
 <td>
 <table border="0">
  <tr>
   <td class="td3" style="width:452px;">Gratuity :</td>
   <td class="td3" style="width:100px;"><input Name="GratuityElig" id="GratuityElig" class="td3" style="width:100px;" value="As per law" readonly/></td>
  </tr>
 </table>
 </td>
</tr>
<tr>
 <td class="td3"></td>
 <td>
 <table border="0">
 <tr>
  <td class="td3" style="width:196px;">Deduction :</td>
  <td class="td3" style="width:280px;"></td>
 </tr>
 </table>
 </td>
</tr>
<tr>
 <td class="td3"></td>
 <td>
 <table border="0">
 <tr>
  <td class="td3" style="width:196px;">* Deduction - As Per law :</td>
  <td class="td3" style="width:350px;">Provident Fund/ ESCI/ Tax on Employment/ Income Tax</td>
 </tr>
 </table>
 </td>
</tr>
<tr>
 <td class="td3"></td>
 <td>
 <table border="0">
 <tr>
  <td class="td3" style="width:196px;">* Deduction - Actual :</td>
  <td class="td3" style="width:350px;">Any dues to company(if any)/ Advances</td>
 </tr>
 </table>
 </td>
</tr>
<tr>
 <td align="Right" class="fontButton" colspan="6">
  <table border="0" align="right" class="fontButton">
   <tr>		 
   <td class="td3" style="width:450px;color:#FFFFFF;font-weight:bold;font-size:15px;"><span id="msgElig">&nbsp;</span></td>
   <td class="td3" style="width:90px;" align="right"><input type="button" name="EditEligE" id="EditEligE" style="width:90px;" value="save" onClick="return HRSaveElig(<?php echo $EmpId.', '.$PmsId.', '.$YearId.', '.$ComId.', '.$UId; ?>)" /></td>
  </tr>
 </table>
 </td>
</tr>
</table>
</td>
 <?php /////////////////////////////////// Second Table Data Close //////////////////////////////?>
 <?php /////////////////////////////////// Second Table Data Close //////////////////////////////?>
 <?php /////////////////////////////////// Second Table Data Close //////////////////////////////?>