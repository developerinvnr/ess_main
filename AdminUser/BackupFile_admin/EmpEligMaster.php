<style>
.th{ font-family:Times New Roman;font-size:12px;height:25px;text-align:center;color:#FFFFFF;font-weight:bold; }
.tdl{ font-family:Times New Roman;font-size:14px;text-align:left; }
.tdr{ font-family:Times New Roman;font-size:12px;text-align:right; }
.tdc{ font-family:Times New Roman;font-size:12px;text-align:center; }
.tdinput{ font-family:Times New Roman;font-size:14px;text-align:center;width:100%; border:hidden; }
.tdinputl{ font-family:Times New Roman;font-size:14px;text-align:left;width:100%; border:hidden; }
.tdsel{ font-family:Times New Roman;font-size:14px;text-align:left; width:100%;}
.h{ text-align:center;font-family:Times New Roman;color:#FFFFFF;font-size:12px;font-weight:bold; }
.hl{ font-family:Times New Roman;color:#FFFFFF;font-size:14px;font-weight:bold; }
.td2{ text-align:center;font-family:Times New Roman;font-size:12px;width:100px; }
.td22{ text-align:center;font-family:Times New Roman;font-size:14px;width:50px; }
.td3{ font-family:Times New Roman;font-size:12px;width:100px; }
.td33{ font-family:Times New Roman;font-size:12px;width:50px; }
.inner_table{height:150px;overflow-y:auto;width:auto;}
</style>

<script language="javascript">
function EditElig()
{
 document.getElementById("EditDiv").style.display = 'none'; document.getElementById("SaveDiv").style.display = 'block';
 document.getElementById("LodgingCatA").disabled = false; 
 document.getElementById("LodgingCatA").value = document.getElementById("H_LodgingCatA").value; 
 document.getElementById("LodgingCatB").disabled = false;
 document.getElementById("LodgingCatB").value = document.getElementById("H_LodgingCatB").value;
 document.getElementById("LodgingCatC").disabled = false; 
 document.getElementById("LodgingCatC").value = document.getElementById("H_LodgingCatC").value;
 document.getElementById("Rw_1").style.display = 'block';
 
 document.getElementById("DaOutSide_HQRs").disabled = false;
 document.getElementById("DaOutSide_HQRs").value = document.getElementById("H_DaOutSide_HQRs").value;
 document.getElementById("DaInSide_HQRs").disabled = false; 
 document.getElementById("DaInSide_HQRs").value = document.getElementById("H_DaInSide_HQRs").value;
 document.getElementById("Rw_2").style.display = 'block';
 
 document.getElementById("TwoWheelerKM").disabled = false;
 document.getElementById("TwoWheelerKM").value = document.getElementById("H_TwoWheelerKM").value;
 document.getElementById("TwoWRestrict_PD").disabled = false; 
 document.getElementById("TwoWRestrict_PD").value = document.getElementById("H_TwoWRestrict_PD").value;
 document.getElementById("TwoWRestrict").disabled = false;
 document.getElementById("TwoWRestrict").value = document.getElementById("H_TwoWRestrict").value;
 document.getElementById("TwoWRestrict_OutSite").disabled = false; 
 document.getElementById("TwoWRestrict_OutSite").value = document.getElementById("H_TwoWRestrict_OutSite").value;
 document.getElementById("Rw_3").style.display = 'block';
 
 document.getElementById("FourWheelerKM").disabled = false;
 document.getElementById("FourWheelerKM").value = document.getElementById("H_FourWheelerKM").value;
 document.getElementById("FourWRestrict").disabled = false; 
 document.getElementById("FourWRestrict").value = document.getElementById("H_FourWRestrict").value;
 document.getElementById("FourWRestrict_PA").disabled = false;
 document.getElementById("FourWRestrict_PA").value = document.getElementById("H_FourWRestrict_PA").value;
 document.getElementById("FourWRestrict_OutSite").disabled = false; 
 document.getElementById("FourWRestrict_OutSite").value = document.getElementById("H_FourWRestrict_OutSite").value;
 document.getElementById("Rw_4").style.display = 'block';
 
 document.getElementById("TraMode").disabled = false;
 document.getElementById("TraClass").disabled = false;
 
 var GradeV=document.getElementById("GradeV").value;
 var modeF=document.getElementById("H_TraModeF").value; 
 var classF=document.getElementById("H_TraClassF").value;
 var modeT=document.getElementById("H_TraModeT").value; 
 var classT=document.getElementById("H_TraClassT").value;
 
 var RmkT=document.getElementById("H_TravelEnt_Rmk").value;
 
 
 if(GradeV=='M1' || GradeV=='M2' || GradeV=='M3' || GradeV=='M4' || GradeV=='M5'){var Cond=' (Approval based)';}
 else if(GradeV=='L1' || GradeV=='L2' || GradeV=='L3'){var Cond=' (Need based)';}
 else if(GradeV=='L4' || GradeV=='L5' || GradeV=='MG'){var Cond='';}
 else{var Cond=' (Need based)';} 
 
 if(modeF=='Y' && modeT=='Y'){ document.getElementById("TraMode").value='Flight'+Cond+'/Train'; document.getElementById("TraClass").value=classF+'/'+classT; }
 if(modeF=='Y' && modeT=='N'){ document.getElementById("TraMode").value='Flight'+Cond; document.getElementById("TraClass").value=classF; }
 if(modeF=='N' && modeT=='Y'){ document.getElementById("TraMode").value='Train'; document.getElementById("TraClass").value=classT; }
 
 
 //if(modeF=='Y'){ document.getElementById("TraMode").value='Flight'+Cond; document.getElementById("TraClass").value=classF;}
 //else if(modeT=='Y'){ document.getElementById("TraMode").value='Train'; document.getElementById("TraClass").value=classT;}

 document.getElementById("Rw_5").style.display = 'block';
 
 document.getElementById("MobileExpRs").disabled = false;
 document.getElementById("MobileExpRs").value = document.getElementById("H_MobileExpRs").value;
 document.getElementById("Prdd").disabled = false; 
 document.getElementById("Prdd").value = document.getElementById("H_Prdd").value;
 document.getElementById("Rw_6").style.display = 'block';
 
 document.getElementById("MobileHandRs").disabled = false;
 document.getElementById("MobileHandRs").value = document.getElementById("H_MobileHandRs").value;
 document.getElementById("GPCheck").disabled = false;
 document.getElementById("Rw_7").style.display = 'block';
  
 document.getElementById("MiscExp").disabled = false;
 document.getElementById("MiscExp").value = 'N';
 document.getElementById("Rw_8").style.display = 'block';
 
 document.getElementById("HealthInsu").disabled = false;
 document.getElementById("HealthInsu").value = document.getElementById("H_HealthInsu").value;
 document.getElementById("Rw_9").style.display = 'block';
  
 document.getElementById("HelthChekUp").disabled = false;
 var Age=document.getElementById("H_Age").value;
 var HelthAmt=document.getElementById("H_HelthChekUp").value;
 if(Age>40 && HelthAmt>0){ document.getElementById("HelthChekUp").value='Y'; }
 else{ document.getElementById("HelthChekUp").value='N'; }
 //document.getElementById("HelthChekUp").value = document.getElementById("H_HelthChekUp").value;
 document.getElementById("Rw_10").style.display = 'block';
 
 document.getElementById("BonusElig").disabled = false;
 document.getElementById("GratuityElig").disabled = false;
 document.getElementById("Rmkk").disabled = false;
 
 document.getElementById("VehiclePolicy").disabled = false;
 document.getElementById("Rw_15").style.display = 'block';
 
} 

</script>

<table border="0" cellspacing="0" cellpadding="0">
 <tr>
 <td>
<?php 

$SqlEv = mysql_query("SELECT EmpVertical FROM hrm_employee_general WHERE EmployeeID=".$ei, $con); $Resv=mysql_fetch_assoc($SqlEv); 
 
 $sElig=mysql_query("select * from hrm_master_eligibility where DepartmentId='".$di."' AND GradeId='".$gi."' AND VerticalId=".$Resv['EmpVertical']." AND CompanyId=".$ci, $con); $rowElig=mysql_num_rows($sElig);
 
 if($rowElig>0){ $rElig=mysql_fetch_assoc($sElig); }
 else{
     
    $sElig2=mysql_query("select * from hrm_master_eligibility where DepartmentId='".$di."' AND GradeId='".$gi."' AND VerticalId>0 AND CompanyId=".$ci, $con);  $rowElig2=mysql_num_rows($sElig2);
    if($rowElig2>0){ $rElig=mysql_fetch_assoc($sElig2); }
    else{
        $sElig3=mysql_query("select * from hrm_master_eligibility where DepartmentId='".$di."' AND GradeId='".$gi."' AND VerticalId=0 AND CompanyId=".$ci, $con);  $rElig=mysql_fetch_assoc($sElig3);
    }
 }

 if($Grade=='M1' OR $Grade=='M2' OR $Grade=='M3' OR $Grade=='M4' OR $Grade=='M5'){$Cond=' (Approval based)';}
 elseif($Grade=='L1' OR $Grade=='L2' OR $Grade=='L3'){$Cond=' (Need based)';}
 elseif($Grade=='L4' OR $Grade=='L5' OR $Grade=='MG'){$Cond='';}
 else{$Cond=' (Need based)';}  
?>
<input type="hidden" id="EmpId" value="<?php echo $ei; ?>" /> 
<input type="hidden" id="ComId" value="<?php echo $ci; ?>" /> 
<input type="hidden" id="GradeV" value="<?php echo $Grade; ?>" /> 

<input type="hidden" Name="H_LodgingCatA" id="H_LodgingCatA" value="<?php echo trim($rElig['CategoryA']); ?>"/>
<input type="hidden" Name="H_LodgingCatB" id="H_LodgingCatB" value="<?php echo trim($rElig['CategoryB']); ?>"/>
<input type="hidden" Name="H_LodgingCatC" id="H_LodgingCatC" value="<?php echo trim($rElig['CategoryC']); ?>"/>

<input type="hidden" Name="H_DaOutSide_HQRs" id="H_DaOutSide_HQRs" value="<?php echo trim($rElig['DA_OutSiteHQ']); ?>"/>
<input type="hidden" Name="H_DaInSide_HQRs" id="H_DaInSide_HQRs" value="<?php echo trim($rElig['DA_InSiteHQ']); ?>"/>

<input type="hidden" Name="H_TwoWheelerKM" id="H_TwoWheelerKM" value="<?php echo trim($rElig['TW_Km']); ?>"/>
<input type="hidden" Name="H_TwoWRestrict_PD" id="H_TwoWRestrict_PD" value="<?php echo trim($rElig['TW_InHQ_D']); ?>"/>
<input type="hidden" Name="H_TwoWRestrict" id="H_TwoWRestrict" value="<?php echo trim($rElig['TW_InHQ_M']); ?>"/>
<input type="hidden" Name="H_TwoWRestrict_OutSite" id="H_TwoWRestrict_OutSite" value="<?php echo trim($rElig['TW_OutHQ_M']); ?>"/>

<input type="hidden" Name="H_FourWheelerKM" id="H_FourWheelerKM" value="<?php echo trim($rElig['FW_Km']); ?>"/>
<input type="hidden" Name="H_FourWRestrict" id="H_FourWRestrict" value="<?php echo trim($rElig['FW_InHQ_M']); ?>"/>
<?php $FAnnul=$rElig['FW_InHQ_M']*12; ?>
<input type="hidden" Name="H_FourWRestrict_PA" id="H_FourWRestrict_PA" value="<?php echo $FAnnul; ?>"/>
<input type="hidden" Name="H_FourWRestrict_OutSite" id="H_FourWRestrict_OutSite" value="<?php echo trim($rElig['FW_OutHQ_M']); ?>"/>

<input type="hidden" Name="H_TraModeF" id="H_TraModeF" value="<?php echo trim($rElig['Flight_YN']); ?>"/>
<input type="hidden" Name="H_TraClassF" id="H_TraClassF" value="<?php echo trim($rElig['Flight_Class']); ?>"/>
<input type="hidden" Name="H_TraModeT" id="H_TraModeT" value="<?php echo trim($rElig['Train_YN']); ?>"/>
<input type="hidden" Name="H_TraClassT" id="H_TraClassT" value="<?php echo trim($rElig['Train_Class']); ?>"/>

<input type="hidden" Name="H_TravelEnt_Rmk" id="H_TravelEnt_Rmk" value="<?php echo trim($rElig['TravelEnt_Rmk']); ?>"/>

<input type="hidden" Name="H_MobileExpRs" id="H_MobileExpRs" value="<?php echo trim($rElig['Mobile_Remb']); ?>"/>
<input type="hidden" Name="H_Prdd" id="H_Prdd" value="<?php echo trim($rElig['Mobile_Remb_Period']); ?>"/>
<input type="hidden" Name="H_MobileHandRs" id="H_MobileHandRs" value="<?php echo trim($rElig['Mobile']); ?>"/>
<input type="hidden" Name="H_GPCheck" id="H_GPCheck" value="<?php echo trim($rElig['Mobile_WithGPS']); ?>"/>

<input type="hidden" Name="H_MiscExp" id="H_MiscExp" value="N"/>
<input type="hidden" Name="H_HealthInsu" id="H_HealthInsu" value="<?php echo trim($rElig['Mediclaim_Coverage_Slabs']); ?>"/>
<input type="hidden" Name="H_HelthChekUp" id="H_HelthChekUp" value="<?php echo trim($rElig['Helth_CheckUp']); ?>"/>

<?php $sqldb=mysql_query("select DOB,GradeId from hrm_employee_general where EmployeeID=".$ei,$con); 
$resdb=mysql_fetch_assoc($sqldb);  
$date1 = $resdb['DOB'];
$date2 = date("Y-m-d");
$diff = abs(strtotime($date2) - strtotime($date1));
$years = floor($diff/(365*60*60*24));
$months = floor(($diff-$years*365*60*60*24)/(30*60*60*24));
$days = floor(($diff-$years*365*60*60*24-$months*30*60*60*24)/(60*60*24)); 
$VNRExpMain=$years.'.'.$months;	
?> 
<input type="hidden" Name="H_Age" id="H_Age" value="<?=$VNRExpMain;?>"/>

  <table style="width:600px;">
   <tr>
    <td class="tdc" style="width:100%;">
     <table style="width:100%;">
      <tr>
	  <td class="tdl" style="width:200px;">&nbsp;* Lodging : (Category)</td>
	  <td class="tdr" style="width:500px;">
	  (A)&nbsp;<input class="td2" Name="LodgingCatA" id="LodgingCatA" value="<?=$rEligE['Lodging_CategoryA']?>" disabled/> &nbsp;&nbsp;
	  (B)&nbsp;<input class="td2" name="LodgingCatB" id="LodgingCatB" value="<?=$rEligE['Lodging_CategoryB']?>" disabled/> &nbsp;&nbsp;
	  (C)&nbsp;<input class="td2" name="LodgingCatC" id="LodgingCatC" value="<?=$rEligE['Lodging_CategoryC']?>" disabled/>
	  </td>
	  </tr>
     </table>
	 
	 <div id="Rw_1" style="display:none;">
	 <table style="width:100%;">
	 <tr>
	  <td class="tdl" style="width:200px;color:#FF8000;">&nbsp;<?php //* Old : ?></td>
	  <td class="tdr" style="width:500px;">
	  <font color="#E0DBE3">(A)</font>&nbsp;<input class="td2" style="background-color:#92D1BD;border:hidden;" value="<?=$rEligE['Lodging_CategoryA']?>" disabled/> &nbsp;&nbsp;
	  <font color="#E0DBE3">(B)</font>&nbsp;<input class="td2" style="background-color:#92D1BD;border:hidden;" value="<?=$rEligE['Lodging_CategoryB']?>" disabled/> &nbsp;&nbsp;
	  <font color="#E0DBE3">(C)</font>&nbsp;<input class="td2" style="background-color:#92D1BD;border:hidden;" readonly value="<?=$rEligE['Lodging_CategoryC']?>" disabled/>
	  </td> 
	 </tr>
	 </table>
	 </div>
	 
    </td>
   </tr>
  </table>
 </td>
  
  
 </tr>
 <tr>
 <td>
  <table style="width:600px;">
   <tr>
    <td class="tdc">
   <table style="width:100%;">
    <tr>
	 <td class="tdl">&nbsp;* DA :</td>
	 <td class="tdr">Outside HQ&nbsp;Rs&nbsp;<input class="td2" Name="DaOutSide_HQRs" id="DaOutSide_HQRs" value="<?=$rEligE['DA_Outside_Hq']?>" disabled/>&nbsp;<!--Day-->&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	 @ Inside HQ&nbsp;Rs&nbsp;<input class="td2" Name="DaInSide_HQRs" id="DaInSide_HQRs" value="<?=$rEligE['DA_Inside_Hq']?>" disabled/> &nbsp;<!--Day--></td>
	</tr>
   </table>
   
   <div id="Rw_2" style="display:none;">
   <table style="width:100%;">
    <tr>
	 <td class="tdl" style="color:#FF8000;">&nbsp;<?php //* Old : ?></td>
	 <td class="tdr"><font color="#E0DBE3">Outside HQ&nbsp;Rs&nbsp;</font><input class="td2" style="background-color:#92D1BD;border:hidden;" value="<?=$rEligE['DA_Outside_Hq']?>" disabled/>&nbsp;<font color="#E0DBE3"><!--Day--></font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	 <font color="#E0DBE3">@ Inside HQ&nbsp;Rs</font>&nbsp;<input class="td2" style="background-color:#92D1BD;border:hidden;" value="<?=$rEligE['DA_Inside_Hq']?>" disabled/>&nbsp;<font color="#E0DBE3"><!--Day--></font></td>
	</tr>
   </table>
   </div>
   
  </td>
   </tr>
  </table>
 </td>
 </tr>

 <tr>
 <td>
  <table style="width:600px;">
   <tr>
    <td class="tdc">
   <table style="width:100%;">
    <tr>
	 <td class="tdl">&nbsp;* Two Wheeler :</td>
	 <td class="tdr"><input class="tdc" Name="TwoWheelerKM" id="TwoWheelerKM" style="width:40px;" value="<?=trim($rEligE['Travel_TwoWeeKM'])?>" disabled/>
	 /Km&nbsp;&nbsp;
	 Max:&nbsp;<input class="tdc" Name="TwoWRestrict_PD" id="TwoWRestrict_PD" style="width:50px;" value="<?=trim($rEligE['Travel_TwoWeeLimitPerDay'])?>" disabled/> Km/D
	 &nbsp;&nbsp;<input class="tdc" Name="TwoWRestrict" id="TwoWRestrict" style="width:50px;" value="<?=trim($rEligE['Travel_TwoWeeLimitPerMonth'])?>" disabled/> Km/M
	 <!--&nbsp;&nbsp;
	 OutSite HQ&nbsp;--><input type="hidden" class="tdc" Name="TwoWRestrict_OutSite" id="TwoWRestrict_OutSite" style="width:50px;" value="<?=trim($rEligE['TwoWeeOutSide_Restric']);?>" disabled/><!-- Km/M-->
	 </td>
	</tr>
   </table>
   
   <div id="Rw_3" style="display:none;">
   <table style="width:100%;">
    <tr>
	 <td class="tdl" style="color:#FF8000;">&nbsp;<?php //* Old : ?></td>
	 <td class="tdr"><input class="tdc" style="width:40px;background-color:#92D1BD;border:hidden;" value="<?=trim($rEligE['Travel_TwoWeeKM'])?>" disabled/>
	 <font color="#E0DBE3">/Km</font>&nbsp;&nbsp;
	 <font color="#E0DBE3">Max:</font>&nbsp;<input class="tdc" style="width:50px;background-color:#92D1BD;border:hidden;" value="<?=trim($rEligE['Travel_TwoWeeLimitPerDay'])?>" disabled/><font color="#E0DBE3"> Km/D</font>
	 &nbsp;&nbsp;<input class="tdc" style="width:50px;background-color:#92D1BD;border:hidden;" value="<?=trim($rEligE['Travel_TwoWeeLimitPerMonth'])?>" disabled/><font color="#E0DBE3"> Km/M</font>
	 <!--&nbsp;&nbsp;
	 <font color="#E0DBE3">OutSite HQ</font>&nbsp;--><input type="hidden" class="tdc" style="width:50px;background-color:#92D1BD;border:hidden;" value="<?=trim($rEligE['TwoWeeOutSide_Restric']);?>" disabled/><!--<font color="#E0DBE3"> Km/M</font>-->
	 </td>
	</tr>
   </table>
   </div>
   
  </td>
   </tr>
  </table>
 </td>
 </tr>
 
 <tr>
 <td>
  <table style="width:600px;">
   <tr>
    <td class="tdc">
   <table style="width:100%;">
    <tr>
	 <td class="tdl">&nbsp;* Four Wheeler :</td>
	 <td class="tdr"><input class="tdc" Name="FourWheelerKM" id="FourWheelerKM" style="width:40px;" value="<?=trim($rEligE['Travel_FourWeeKM'])?>" disabled/>
	 /Km&nbsp;&nbsp;<?php $PerA=$rEligE['Travel_FourWeeLimitPerMonth']*12; ?>
	 <?php if($di==2 AND $gi>72){echo 'Min';}else{echo 'Max';}?>:&nbsp;<input class="tdc" Name="FourWRestrict" id="FourWRestrict" style="width:50px;" value="<?=trim($rEligE['Travel_FourWeeLimitPerMonth'])?>" disabled/> Km/M
	 &nbsp;&nbsp;<input class="tdc" Name="FourWRestrict_PA" id="FourWRestrict_PA" style="width:50px;" value="<?=$PerA?>" disabled/> Km/A
	 <!--&nbsp;&nbsp;
	 OutSite HQ&nbsp;--><input type="hidden" class="tdc" Name="FourWRestrict_OutSite" id="FourWRestrict_OutSite" style="width:50px;" value="<?=trim($rEligE['FourWeeOutSide_Restric']);?>" disabled/><!-- Km/M-->
	 </td>
	</tr>
   </table>
   
   <div id="Rw_4" style="display:none;">
   <table style="width:100%;">
    <tr>
	 <td class="tdl" style="color:#FF8000;">&nbsp;<?php //* Old : ?></td>
	 <td class="tdr"><input class="tdc" style="width:40px;background-color:#92D1BD;border:hidden;" value="<?=trim($rEligE['Travel_FourWeeKM'])?>" disabled/>
	 <font color="#E0DBE3">/Km</font>&nbsp;&nbsp;<?php $PerA=$rEligE['Travel_FourWeeLimitPerMonth']*12; ?>
	 <font color="#E0DBE3"><?php if($di==2 AND $gi>72){echo 'Min';}else{echo 'Max';}?>:</font>&nbsp;<input class="tdc"  style="width:50px;background-color:#92D1BD;border:hidden;" value="<?=trim($rEligE['Travel_FourWeeLimitPerMonth'])?>" disabled/><font color="#E0DBE3"> Km/M</font>
	 &nbsp;&nbsp;<input class="tdc" style="width:50px;background-color:#92D1BD;border:hidden;" value="<?=$PerA?>" disabled/><font color="#E0DBE3"> Km/A</font>
	 <!--&nbsp;&nbsp;
	 <font color="#E0DBE3">OutSite HQ</font>&nbsp;--><input type="hidden" class="tdc" style="width:50px;background-color:#92D1BD;border:hidden;" value="<?=trim($rEligE['FourWeeOutSide_Restric']);?>" disabled/><font color="#E0DBE3"> <!--Km/M--></font>
	 </td>
	</tr>
   </table>
   </div>
   
  </td>
   </tr>
  </table>
 </td>
 </tr>
 
<?php $sqlD=mysql_query("select * from hrm_master_eligibility_policy_dept where DeptId=".$di." AND Sts=1",$con); $rowD=mysql_num_rows($sqlD); if($rowD>0){ ?>
 <tr>
 <td>
  <table style="width:600px;">
   <tr>
    <td class="tdc">
	 <table style="width:100%;">
	  <tr>
	    <td class="tdl">&nbsp;* Vehicle Policy :</td>
        <td class="tdr"><select class="td3" id="VehiclePolicy" name="VehiclePolicy" style="width:248px;" disabled>
		<option value="" <?php if($rEligE['VehiclePolicy']==''){echo 'selected';}?>>&nbsp;NA</option>
<?php $sqlpl=mysql_query("select pd.PolicyId,PolicyName from hrm_master_eligibility_policy_dept pd inner join hrm_master_eligibility_policy p on pd.PolicyId=p.PolicyId where pd.DeptId=".$di." AND pd.Sts=1",$con);		
	while($respl=mysql_fetch_assoc($sqlpl)){ ?>	<option value="<?=$respl['PolicyId']?>" <?php if($rEligE['VehiclePolicy']==$respl['PolicyId']){echo 'selected';}?>>&nbsp;<?=$respl['PolicyName']?></option><?php } ?>
	
  </select></td>
	  </tr>
	 </table>
	 
     <div id="Rw_15" style="display:none;">
    <table style="width:100%;">
	  <tr>
	    <td class="tdl" style="color:#FF8000;">&nbsp;<?php //* Old : ?></td>
        <td class="tdr"><select class="td3" style="width:248px;background-color:#92D1BD;border:hidden;" disabled>
		<option value="" <?php if($rEligE['VehiclePolicy']==''){echo 'selected';}?>>&nbsp;NA</option>
<?php $sqlpl=mysql_query("select pd.PolicyId,PolicyName from hrm_master_eligibility_policy_dept pd inner join hrm_master_eligibility_policy p on pd.PolicyId=p.PolicyId where pd.DeptId=".$di." AND pd.Sts=1",$con);		
	while($respl=mysql_fetch_assoc($sqlpl)){ ?>	<option value="<?=$respl['PolicyId']?>" <?php if($rEligE['VehiclePolicy']==$respl['PolicyId']){echo 'selected';}?>>&nbsp;<?=$respl['PolicyName']?></option><?php } ?>
	
  </select></td>
	  </tr>
	 </table>
     </div>
   
	</td>
   </tr>
  </table>
 </td>
 </tr>
<?php }else{ ?><input type="hidden" id="VehiclePolicy" name="VehiclePolicy" value=""/><?php } ?>
 
 <?php if($resEnt['ModeTravel_Flight']=='Y' AND $resEnt['ModeTravel_Train']=='Y'){$Mode='Flight'.$Cond.'/Train'; $Class=$resEnt['TravelClass_Flight'].'/'.$resEnt['TravelClass_Train'];} elseif($resEnt['ModeTravel_Flight']=='Y' AND $resEnt['ModeTravel_Train']=='N') {$Mode='Flight'.$Cond; $Class=$resEnt['TravelClass_Flight'];} elseif($resEnt['ModeTravel_Flight']=='N' AND $resEnt['ModeTravel_Train']=='Y') {$Mode='Train'; $Class=$resEnt['TravelClass_Train'];} ?>
 <tr>
 <td>
  <table style="width:600px;">
   <tr>
    <td class="tdc">
	 <table style="width:100%;">
	  <tr>
	   <td class="tdl">&nbsp;* Mode of Travels OutSide HQ :</td>
       <td class="tdr"><select class="td3" Name="TraMode" id="TraMode" disabled/>
  <option value="Train" <?php if($rEligE['Mode_Travel_Outside_Hq']=='Train'){echo 'selected';}?>>&nbsp;Train</option>
  
  <option value="Flight<?=$Cond?>" <?php if($rEligE['Mode_Travel_Outside_Hq']=='Flight'.$Cond){echo 'selected';}?>>&nbsp;Flight<?=$Cond?></option>
  <option value="Flight<?=$Cond?>/Train" <?php if($rEligE['Mode_Travel_Outside_Hq']=='Flight'.$Cond.'/Train'){echo 'selected';}?>>&nbsp;Flight<?=$Cond?>/Train</option>
  
  <option value="" <?php if($rEligE['Mode_Travel_Outside_Hq']==''){echo 'selected';}?>>&nbsp;NA</option>
  </select>
  &nbsp;&nbsp; Class :&nbsp;<select class="td3" Name="TraClass" id="TraClass" disabled>
  <option value="General" <?php if($rEligE['TravelClass_Outside_Hq']=='General'){echo 'selected';}?>>General</option>
  <option value="Sleeper" <?php if($rEligE['TravelClass_Outside_Hq']=='Sleeper'){echo 'selected';}?>>Sleeper</option>
  <option value="AC-I" <?php if($rEligE['TravelClass_Outside_Hq']=='AC-I'){echo 'selected';}?>>AC-I</option>
  <option value="AC-II" <?php if($rEligE['TravelClass_Outside_Hq']=='AC-II'){echo 'selected';}?>>AC-II</option>
  <option value="AC-III" <?php if($rEligE['TravelClass_Outside_Hq']=='AC-III'){echo 'selected';}?>>AC-III</option>
  <option value="Economy" <?php if($rEligE['TravelClass_Outside_Hq']=='Economy'){echo 'selected';}?>>Economy</option>
  <option value="Economy/AC-I" <?php if($rEligE['TravelClass_Outside_Hq']=='Economy/AC-I'){echo 'selected';}?>>Economy/AC-I</option>
  <option value="Economy/AC-II" <?php if($rEligE['TravelClass_Outside_Hq']=='Economy/AC-II'){echo 'selected';}?>>Economy/AC-II</option>
  <option value="" <?php if($rEligE['TravelClass_Outside_Hq']==''){echo 'selected';}?>>&nbsp;NA</option>
  </select>  
       </td> 
	  </tr>
	 </table>
	 
   <div id="Rw_5" style="display:none;">
   <table style="width:100%;">
	  <tr>
	   <td class="tdl" style="color:#FF8000;">&nbsp;<?php //* Old : ?></td>
       <td class="tdr"><select class="td3" style="background-color:#92D1BD;border:hidden;" disabled/>
  <option value="Train" <?php if($rEligE['Mode_Travel_Outside_Hq']=='Train'){echo 'selected';}?>>&nbsp;Train</option>
  <option value="Flight" <?php if($rEligE['Mode_Travel_Outside_Hq']=='Flight'){echo 'selected';}?>>&nbsp;Flight</option>
  <option value="Flight<?=$Cond?>/Train" <?php if($rEligE['Mode_Travel_Outside_Hq']=='Flight'.$Cond.'/Train'){echo 'selected';}?>>&nbsp;Flight<?=$Cond?>/Train</option>
  <option value="" <?php if($rEligE['Mode_Travel_Outside_Hq']==''){echo 'selected';}?>>&nbsp;NA</option>
  </select>
  &nbsp;&nbsp; <font color="#E0DBE3">Class :</font>&nbsp;<select class="td3" style="background-color:#92D1BD;border:hidden;" disabled>
  <option value="General" <?php if($rEligE['TravelClass_Outside_Hq']=='General'){echo 'selected';}?>>General</option>
  <option value="Sleeper" <?php if($rEligE['TravelClass_Outside_Hq']=='Sleeper'){echo 'selected';}?>>Sleeper</option>
  <option value="AC-I" <?php if($rEligE['TravelClass_Outside_Hq']=='AC-I'){echo 'selected';}?>>AC-I</option>
  <option value="AC-II" <?php if($rEligE['TravelClass_Outside_Hq']=='AC-II'){echo 'selected';}?>>AC-II</option>
  <option value="AC-III" <?php if($rEligE['TravelClass_Outside_Hq']=='AC-III'){echo 'selected';}?>>AC-III</option>
  <option value="Economy" <?php if($rEligE['TravelClass_Outside_Hq']=='Economy'){echo 'selected';}?>>Economy</option>
  <option value="Economy/AC-I" <?php if($rEligE['TravelClass_Outside_Hq']=='Economy/AC-I'){echo 'selected';}?>>Economy/AC-I</option>
  <option value="Economy/AC-II" <?php if($rEligE['TravelClass_Outside_Hq']=='Economy/AC-II'){echo 'selected';}?>>Economy/AC-II</option>
  <option value="" <?php if($rEligE['TravelClass_Outside_Hq']==''){echo 'selected';}?>>&nbsp;NA</option>
  </select>  
       </td> 
	  </tr>
	 </table>
   </div>
   
	</td>
   </tr>
  </table>
 </td>
 </tr>
 

 <tr>
 <td>
  <table style="width:600px;">
   <tr>
    <td class="tdc">
	 <table style="width:100%;">
	  <tr>
	    <td class="tdl">&nbsp;* Mobile expenses Reimbursement :</td>
        <td class="tdr"><input class="td3" id="MobileExpRs" name="MobileExpRs" style="text-align:center;" value="<?=$rEligE['Mobile_Exp_Rem_Rs']?>" disabled/>
  &nbsp;&nbsp; Period :&nbsp;
  <select class="td3" Name="Prdd" id="Prdd" style="width:91px;" disabled>
  <option value="Mnt" <?php if($rEligE['Prd']=='Mnt'){echo 'selected';}?>>Month</option>
  <option value="Qtr" <?php if($rEligE['Prd']=='Qtr'){echo 'selected';}?>>Qtr</option>
  <option value="1/2 Yearly" <?php if($rEligE['Prd']=='1/2 Yearly'){echo 'selected';}?>>1/2 Yearly</option>
  <option value="Yearly" <?php if($rEligE['Prd']=='Yearly'){echo 'selected';}?>>Yearly</option>
  <option value="" <?php if($rEligE['Prd']==''){echo 'selected';}?>>&nbsp;NA</option>
  </select></td>
	  </tr>
	 </table>
	 
     <div id="Rw_6" style="display:none;">
	 <table style="width:100%;">
	  <tr>
	    <td class="tdl" style="color:#FF8000;">&nbsp;<?php //* Old : ?></td>
        <td class="tdr"><input class="td3" style="text-align:center;background-color:#92D1BD;border:hidden;" value="<?=$rEligE['Mobile_Exp_Rem_Rs']?>" disabled/>
  &nbsp;&nbsp; <font color="#E0DBE3">Period :</font>&nbsp;
  <select class="td3" style="width:91px;;background-color:#92D1BD;border:hidden;" disabled>
  <option value="Mnt" <?php if($rEligE['Prd']=='Mnt'){echo 'selected';}?>>Month</option>
  <option value="Qtr" <?php if($rEligE['Prd']=='Qtr'){echo 'selected';}?>>Qtr</option>
  <option value="Annual" <?php if($rEligE['Prd']=='Annual'){echo 'selected';}?>>Annual</option>
  <option value="" <?php if($rEligE['Prd']==''){echo 'selected';}?>>&nbsp;NA</option>
  </select></td>
	  </tr>
	 </table>
     </div>
   
	</td>
   </tr>
  </table>
 </td>
 </tr>
 
 <script>
 function ClickGPRS()
 { 
 if(document.getElementById("GPCheck").checked==true){document.getElementById("MobileHandRs").value=document.getElementById("H_GPCheck").value; document.getElementById("GPSSet").value='Y';}else if(document.getElementById("GPCheck").checked==false){document.getElementById("MobileHandRs").value=document.getElementById("H_MobileHandRs").value; document.getElementById("GPSSet").value='N'; }
 } 
 </script>
 <tr>
 <td>
  <table style="width:600px;">
   <tr>
    <td class="tdc">
	 <table style="width:100%;">
	  <tr>
	    <td class="tdl">&nbsp;* Mobile Handset :</td>
        <td class="tdr">Amount :&nbsp;&nbsp;<input Name="MobileHandRs" id="MobileHandRs" class="tdc" value="<?=$rEligE['Mobile_Hand_Elig_Rs']?>" style="width:100px;" disabled/>
  &nbsp;&nbsp;
  <input type="checkbox" name="GPCheck" id="GPCheck" onClick="ClickGPRS()" <?php if($rEligE['GPSSet']=='Y'){echo 'checked';}elseif($rEligE['Mobile_Hand_Elig_Rs']==trim($rElig['Mobile_WithGPS']) AND $rEligE['Mobile_Hand_Elig_Rs']!='' AND $rEligE['Mobile_Hand_Elig_Rs']!='0'){echo 'checked';} ?> disabled/>GPRS
  <input type="hidden" id="GPSSet" name="GPSSet" value="<?=$rEligE['GPSSet']?>" />
  </td>
	  </tr>
	 </table>
	 
     <div id="Rw_7" style="display:none;">
	 <table style="width:100%;">
	  <tr>
	    <td class="tdl" style="color:#FF8000;">&nbsp;<?php //* Old : ?></td>
        <td class="tdr"><font color="#E0DBE3">Amount :</font>&nbsp;&nbsp;<input class="tdc" value="<?=$rEligE['Mobile_Hand_Elig_Rs']?>" style="width:100px;background-color:#92D1BD;border:hidden;" disabled/>
  &nbsp;&nbsp;
  <input type="checkbox" style="background-color:#92D1BD;border:hidden;" <?php if($rEligE['GPSSet']=='Y'){echo 'checked';}elseif(trim($rEligE['Mobile_Hand_Elig_Rs'])==trim($rElig['Mobile_WithGPS']) AND $rEligE['Mobile_Hand_Elig_Rs']!='' AND $rEligE['Mobile_Hand_Elig_Rs']!='0'){echo 'checked';} ?> disabled/><font color="#E0DBE3">GPRS</font></td>
	  </tr>
	 </table>
     </div>
   
	</td>
   </tr>
  </table>
 </td>
 </tr>
 
 <tr>
 <td>
  <table style="width:600px;">
   <tr>
    <td class="tdc">
	 <table style="width:100%;">
	  <tr>
	   <td class="tdl">&nbsp;* Misc. expenses(like stationery/photocopy/fax/e-mail/etc) :</td>
       <td class="tdr"><select Name="MiscExp" id="MiscExp" class="td3" style="width:100px;" disabled>
  <option value="Y" <?php if($rEligE['Misc_Expenses']=='Y'){echo 'selected';} ?>>Yes</option>
  <option value="N" <?php if($rEligE['Misc_Expenses']=='N'){echo 'selected';} ?>>No</option>
  <option value="" <?php if($rEligE['Misc_Expenses']==''){echo 'selected';} ?>>NA</option>
  </select></td>
	  </tr>
	 </table>
	 
     <div id="Rw_8" style="display:none;">
     <table style="width:100%;">
	  <tr>
	   <td class="tdl" style="color:#FF8000;">&nbsp;<?php //* Old : ?></td>
       <td class="tdr"><select class="td3" style="width:100px;background-color:#92D1BD;border:hidden;" disabled>
  <option value="Y" <?php if($rEligE['Misc_Expenses']=='Y'){echo 'selected';} ?>>Yes</option>
  <option value="N" <?php if($rEligE['Misc_Expenses']=='N'){echo 'selected';} ?>>No</option>
  <option value="" <?php if($rEligE['Misc_Expenses']==''){echo 'selected';} ?>>NA</option>
  </select></td>
	  </tr>
	 </table>
     </div>
   
	</td>
   </tr>
  </table>
 </td>
 </tr>
 
 <tr>
 <td>
  <table style="width:600px;">
   <tr>
    <td class="tdc">
	 <table style="width:100%;">
	  <tr>
	   <td class="tdl">&nbsp;* Health Insurance(Premium Paid by Company) :</td>
       <td class="tdr"><input Name="HealthInsu" id="HealthInsu" class="tdc" style="width:100px;" value="<?=trim($rEligE['Health_Insurance'])?>" disabled/></td>
	  </tr>
	 </table>
	 
     <div id="Rw_9" style="display:none;">
	 <table style="width:100%;">
	  <tr>
	   <td class="tdl" style="color:#FF8000;">&nbsp;<?php //* Old : ?></td>
       <td class="tdr"><input class="tdc" style="width:100px;background-color:#92D1BD;border:hidden;" value="<?=trim($rEligE['Health_Insurance'])?>" disabled/></td>
	  </tr>
	 </table>
     </div>
   
	</td>
   </tr>
  </table>
 </td>
 </tr>
 
 
<?php if($ci==1){ ?>
 <tr>
 <td>
  <table style="width:600px;">
   <tr>
    <td class="tdc">
	 <table style="width:100%;">
	  <tr>
	   <td class="tdl">&nbsp;* Group Personal Accident Insurance :</td>
       <td class="tdr"><input Name="" id="" class="tdc" style="width:100px;" value="<?php if($resdb['GradeId']==61 || $resdb['GradeId']==62 ){echo '05 Lakhs';}elseif($resdb['GradeId']==63 || $resdb['GradeId']==64 || $resdb['GradeId']==65 || $resdb['GradeId']==66){echo '10 Lakhs';}elseif($resdb['GradeId']==67 || $resdb['GradeId']==68 || $resdb['GradeId']==69 || $resdb['GradeId']==70|| $resdb['GradeId']==71){ echo '25 Lakhs';}elseif($resdb['GradeId']==72 || $resdb['GradeId']==73 || $resdb['GradeId']==74 || $resdb['GradeId']==75|| $resdb['GradeId']==76){ echo '50 Lakhs';} ?>" disabled/></td>
	  </tr>
	 </table>
	 
     <div id="" style="display:none;">
	 <table style="width:100%;">
	  <tr>
	   <td class="tdl" style="color:#FF8000;">&nbsp;<?php //* Old : ?></td>
       <td class="tdr"><input class="tdc" style="width:100px;background-color:#92D1BD;border:hidden;" value="<?php if($resdb['GradeId']==61 || $resdb['GradeId']==62 ){echo '05 Lakhs';}elseif($resdb['GradeId']==63 || $resdb['GradeId']==64 || $resdb['GradeId']==65 || $resdb['GradeId']==66){echo '10 Lakhs';}elseif($resdb['GradeId']==67 || $resdb['GradeId']==68 || $resdb['GradeId']==69 || $resdb['GradeId']==70|| $resdb['GradeId']==71){ echo '25 Lakhs';}elseif($resdb['GradeId']==72 || $resdb['GradeId']==73 || $resdb['GradeId']==74 || $resdb['GradeId']==75|| $resdb['GradeId']==76){ echo '50 Lakhs';} ?>" disabled/></td>
	  </tr>
	 </table>
     </div>
   
	</td>
   </tr>
  </table>
 </td>
 </tr>
<?php } ?>
 
<?php /******* New * New * New * New * New * New * New 2222  ********/ ?>
 <tr>
 <td>
  <table style="width:600px;">
   <tr>
    <td class="tdc">
	 <table style="width:100%;">
	  <tr>
	   <td class="tdl">&nbsp;* Executive Health Check-up (Once in 2 yrs) :</td>
       <td class="tdr"><select Name="HelthChekUp" id="HelthChekUp" class="td3" style="width:100px;" disabled>
       <option value="Y" <?php if($rEligE['HelthCheck']=='Y'){echo 'selected';} ?>>Yes</option>
       <option value="N" <?php if($rEligE['HelthCheck']=='N' OR $rEligE['HelthCheck']==''){echo 'selected';} ?>>No</option>
       </select></td>
	  </tr>
	 </table>
	 
     <div id="Rw_10" style="display:none;">
	 <table style="width:100%;">
	  <tr>
	   <td class="tdl" style="color:#FF8000;">&nbsp;<?php //* Old : ?></td>
       <td class="tdr"><select  class="td3" style="width:100px;background-color:#92D1BD;border:hidden;" disabled>
       <option value="Y" <?php if($rEligE['HelthCheck']=='Y'){echo 'selected';} ?>>Yes</option>
       <option value="N" <?php if($rEligE['HelthCheck']=='N'){echo 'selected';} ?>>No</option>
       <option value="" <?php if($rEligE['HelthCheck']==''){echo 'selected';} ?>>NA</option>
       </select></td>
	  </tr>
	 </table>
     </div>
   
	</td>
   </tr>
  </table>
 </td>
 </tr>
 
 <tr>
 <td>
  <table style="width:600px;">
   <tr>
    <td class="tdc">
	 <table style="width:100%;">
	  <tr>
	   <td class="tdl">&nbsp;* Bonus/Exgretia(Monthly) :</td>
       <td class="tdr"><input Name="BonusElig" id="BonusElig" class="td3" style="width:100px;" value="As per law" disabled readonly/></td>
	  </tr>
	 </table>
	</td>
   </tr>
  </table>
 </td>
 </tr>
 
 <tr>
 <td>
  <table style="width:600px;">
   <tr>
    <td class="tdc">
	 <table style="width:100%;">
	  <tr>
	    <td class="tdl">&nbsp;* Gratuity :</td>
        <td class="tdr"><input Name="GratuityElig" id="GratuityElig" class="td3" style="width:100px;" value="As per law" disabled readonly/></td>
	  </tr>
	 </table>
	</td>
   </tr>
  </table>
 </td>
 </tr>
 
 <tr>
 <td>
  <table style="width:600px;">
   <tr>
    <td class="tdc">
	 <table style="width:100%;">
	  <tr>
	    <td class="tdl">&nbsp;* Remark :</td>
        <td class="tdr"><input class="td3" Name="Rmkk" id="Rmkk" style="width:400px;" value="<?php echo $rEligE['Remark'];?>" disabled/></td>
	  </tr>
	 </table>
	</td> 
   </tr>
  </table>
 </td>
 </tr>

 <tr>
 <td align="Right" class="fontButton" colspan="6">
 
 <div id="EditDiv" style="display:block;">
  <table border="0" align="right" class="fontButton">
   <tr>	 
     
	 <?php if($_REQUEST['action']!='approve'){ ?>
	 <td class="td33" style="color:#fff;" align="right"><b>&nbsp;Date :</b></td>
     <td class="td33" style="color:#fff;"><input class="td22" style="width:100px;font-weight:bold;background-color:#CCFFCC;" value="<?php echo date("d-m-Y",strtotime($rEligE['EligCreatedDate'])); ?>" readonly/></td>
	 <?php } ?>
	<td class="td3" align="right" style="width:90px;"><input type="button" name="ChangeElig" id="ChangeElig" style="width:90px; display:block;" value="edit" onClick="EditElig()" <?php if($_REQUEST['action']=='approve'){ if($ResP['HR_PmsStatus']!=2) { echo 'disabled'; } } ?>></td>
	</tr>
  </table>
  </div> 
   <div id="SaveDiv" style="display:none;">
   <table border="0" align="right" class="fontButton">
   <tr>
    <td class="td3" style="color:#FFFFFF;font-weight:bold;font-size:14px;width:290px;">
	<span id="msgElig">&nbsp;</span>
	</td>	 
	<?php if($_REQUEST['action']!='approve'){ ?>
   <td class="td33" style="color:#fff;"><input class="td22" style="width:100px;font-weight:bold;background-color:#CCFFCC;" id="CHDate" name="CHDate" value="<?php echo date("d-m-Y"); ?>" /><script type="text/javascript">  var cal = Calendar.setup({ onSelect:  function(cal) { cal.hide()}, showTime: true }); cal.manageFields("CHDate", "CHDate", "%d-%m-%Y");</script></td>
   <?php } ?>
   
   <td class="td3" style="width:90px;" align="right"><input type="button" name="EditEligE" id="EditEligE" style="width:90px;" value="save" onClick="return HRSaveElig(<?php echo $ei.', '.$pi.', '.$YearId.', '.$ci.', '.$ui; ?>)" /></td>
                                    
   <?php if($_REQUEST['action']!='approve'){ ?>
   <td class="td3" style="width:90px;" align="right"><input type="button" name="RefreshEligE" id="RefreshEligE" style="width:90px;" value="refresh"  onClick="javascript:window.location='EmpElig.php?ID=<?php echo $EMPID; ?>&Event=Edit'"/></td>
   <?php } ?>	
    </tr>
   </table>
   </div>
   	
 </td>
</tr>

</table>
