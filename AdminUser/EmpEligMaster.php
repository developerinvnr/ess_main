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
 document.getElementById("DaOutSide_HQRs_Rmk").disabled = false;
 document.getElementById("DaOutSide_HQRs").value = document.getElementById("H_DaOutSide_HQRs").value;
 document.getElementById("DaOutSide_HQRs_Rmk").value = document.getElementById("H_DaOutSide_HQRs_Rmk").value;
 document.getElementById("DaInSide_HQRs").disabled = false; 
 document.getElementById("DaInSide_HQRs_Rmk").disabled = false; 
 document.getElementById("DaInSide_HQRs").value = document.getElementById("H_DaInSide_HQRs").value;
 document.getElementById("DaInSide_HQRs_Rmk").value = document.getElementById("H_DaInSide_HQRs_Rmk").value;
 
 document.getElementById("ExHQ").disabled = false; 
 document.getElementById("ExHQ_Rmk").disabled = false;
 document.getElementById("ExHQ").value = document.getElementById("H_ExHQ").value;
 document.getElementById("ExHQ_Rmk").value = document.getElementById("H_ExHQ_Rmk").value;
 
 document.getElementById("Rw_2").style.display = 'block';
 
 document.getElementById("TwoWheelerKM").disabled = false;
 document.getElementById("TwoWheelerKM").value = document.getElementById("H_TwoWheelerKM").value;
 document.getElementById("TwoWheelerKM_Rmk").disabled = false; 
 document.getElementById("TwoWheelerKM_Rmk").value = document.getElementById("H_TwoWheelerKM_Rmk").value;
 document.getElementById("Rw_3").style.display = 'block';
 
 document.getElementById("FourWheelerKM").disabled = false;
 document.getElementById("FourWheelerKM").value = document.getElementById("H_FourWheelerKM").value;
 document.getElementById("FourWheelerKM_Rmk").disabled = false; 
 document.getElementById("FourWheelerKM_Rmk").value = document.getElementById("H_FourWheelerKM_Rmk").value;
 document.getElementById("Rw_4").style.display = 'block';
 
 document.getElementById("VehicleCost").value = document.getElementById("H_VehicleCost").value;
 
 document.getElementById("Flight_YN").disabled = false; document.getElementById("Flight_Class").disabled = false;
 document.getElementById("Flight_Class_Rmk").disabled = false;
 document.getElementById("Flight_YN").value = document.getElementById("H_Flight_YN").value;
 document.getElementById("Flight_Class").value = document.getElementById("H_Flight_Class").value;
 document.getElementById("Flight_Class_Rmk").value = document.getElementById("H_Flight_Class_Rmk").value;
 document.getElementById("Train_YN").disabled = false; document.getElementById("Train_Class").disabled = false;
 document.getElementById("Train_Class_Rmk").disabled = false;
 document.getElementById("Train_YN").value = document.getElementById("H_Train_YN").value;
 document.getElementById("Train_Class").value = document.getElementById("H_Train_Class").value;
 document.getElementById("Train_Class_Rmk").value = document.getElementById("H_Train_Class_Rmk").value;
 document.getElementById("Rw_5").style.display = 'block';
 
 document.getElementById("Mobile_Remb").disabled = false; document.getElementById("Mobile_Remb_Period").disabled = false;
 document.getElementById("Mobile_Remb_Period_Rmk").disabled = false; 
 document.getElementById("Mobile_Remb").value = document.getElementById("H_Mobile_Remb").value; 
 document.getElementById("Mobile_Remb_Period").value = document.getElementById("H_Mobile_Remb_Period").value;
 document.getElementById("Mobile_Remb_Period_Rmk").value = document.getElementById("H_Mobile_Remb_Period_Rmk").value;
 
 document.getElementById("Mobile_RembPost").disabled = false; 
 document.getElementById("Mobile_RembPost_Period").disabled = false;
 document.getElementById("Mobile_RembPost_Period_Rmk").disabled = false; 
 document.getElementById("prepaid").checked=true; document.getElementById("postpaid").checked=true;
 document.getElementById("Mobile_RembPost").value = document.getElementById("H_Mobile_RembPost").value; 
 document.getElementById("Mobile_RembPost_Period").value = document.getElementById("H_Mobile_RembPost_Period").value;
 document.getElementById("Mobile_RembPost_Period_Rmk").value = document.getElementById("H_Mobile_RembPost_Period_Rmk").value;
 document.getElementById("Rw_6").style.display = 'block';
 //document.getElementById("Rw_66").style.display = 'block';
 
 document.getElementById("Mobile").disabled = false; document.getElementById("Mobile_Rmk").disabled = false;
 document.getElementById("Mobile_WithGPS").disabled = false; document.getElementById("Mobile_WithGPS_Rmk").disabled = false;
 document.getElementById("Mobile").value = document.getElementById("H_Mobile").value;
 document.getElementById("Mobile_Rmk").value = document.getElementById("H_Mobile_Rmk").value;
 document.getElementById("Mobile_WithGPS").value = document.getElementById("H_Mobile_WithGPS").value;
 document.getElementById("Mobile_WithGPS_Rmk").value = document.getElementById("H_Mobile_WithGPS_Rmk").value;
 document.getElementById("GPCheck").disabled = false;
 document.getElementById("MobileHandRs").disabled = false; document.getElementById("MobileHandRs_Rmk").disabled = false;
 
 if(document.getElementById("GPCheck").checked==true)
 {  
  document.getElementById("MobileHandRs").value = document.getElementById("H_Mobile_WithGPS").value;
  document.getElementById("MobileHandRs_Rmk").value = document.getElementById("H_Mobile_WithGPS_Rmk").value;
 }
 else
 {
  document.getElementById("MobileHandRs").value = document.getElementById("H_Mobile").value;
  document.getElementById("MobileHandRs_Rmk").value = document.getElementById("H_Mobile_Rmk").value;
 }
 document.getElementById("Rw_7").style.display = 'block';
 
 document.getElementById("Rw_8").style.display = 'block';
 
 //document.getElementById("HealthInsu").disabled = false;
 document.getElementById("HealthInsu").value = document.getElementById("H_HealthInsu").value;
 document.getElementById("Rw_9").style.display = 'block';
 
 document.getElementById("Term_Insurance").value = document.getElementById("H_Term_Insurance").value;
 document.getElementById("Rw_10").style.display = 'block';
 
 
  
 document.getElementById("HelthChekUp").disabled = false;
 var Age=document.getElementById("H_Age").value;
 var HelthAmt=document.getElementById("H_HelthChekUp").value;
 if(Age>40 && HelthAmt>0)
 { document.getElementById("HelthChekUp").value='Y'; 
   document.getElementById("HelthChekUp_Amt").value = document.getElementById("H_HelthChekUp").value;
   document.getElementById("HelthChekUp_Rmk").value = document.getElementById("H_HelthChekUp_Rmk").value;
 }
 else{ document.getElementById("HelthChekUp").value='N'; 
       document.getElementById("HelthChekUp_Amt").value=0;
	   document.getElementById("HelthChekUp_Rmk").value='';
 }
 
 
 
 document.getElementById("Rw_11").style.display = 'block';
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
<input type="hidden" Name="H_DaOutSide_HQRs_Rmk" id="H_DaOutSide_HQRs_Rmk" value="<?php echo trim($rElig['DA_OutSiteHQ_Rmk']); ?>"/>
<input type="hidden" Name="H_DaInSide_HQRs" id="H_DaInSide_HQRs" value="<?php echo trim($rElig['DA_InSiteHQ']); ?>"/>
<input type="hidden" Name="H_DaInSide_HQRs_Rmk" id="H_DaInSide_HQRs_Rmk" value="<?php echo trim($rElig['DA_InSiteHQ_Rmk']); ?>"/>

<input type="hidden" Name="H_ExHQ" id="H_ExHQ" value="<?php echo trim($rElig['ExHQ']); ?>"/>
<input type="hidden" Name="H_ExHQ_Rmk" id="H_ExHQ_Rmk" value="<?php echo trim($rElig['ExHQ_Rmk']); ?>"/>


<?php if($di==2 OR $gi==72 OR $gi==73 OR $gi==74 OR $gi==75 OR $gi==76 OR $gi==77){ ?>

<input type="hidden" Name="H_TwoWheelerKM" id="H_TwoWheelerKM" value="<?php echo trim($rElig['TW_Km']); ?>"/>
<input type="hidden" Name="H_TwoWheelerKM_Rmk" id="H_TwoWheelerKM_Rmk" value="<?php if(trim($rElig['TW_InHQ_M'])!=''){ echo 'Min:'.trim($rElig['TW_InHQ_M'].'Km/Month'); } if(trim($rElig['TW_InHQ_D'])!=''){ echo ' '.trim($rElig['TW_InHQ_D']); } ?>"/>

<input type="hidden" Name="H_FourWheelerKM" id="H_FourWheelerKM" value="<?php echo trim($rElig['FW_Km']); ?>"/>
<input type="hidden" Name="H_FourWheelerKM_Rmk" id="H_FourWheelerKM_Rmk" value="<?php if(trim($rElig['FW_InHQ_M'])!=''){ echo 'Min:'.trim($rElig['FW_InHQ_M']).'Km/Month'; } if(trim($rElig['FW_InHQ_D'])!=''){ echo ' '.trim($rElig['FW_InHQ_D']); } ?>"/>
<?php $FAnnul=$rElig['FW_InHQ_M']*12; ?>

<?php }else{ ?>
<input type="hidden" Name="H_TwoWheelerKM" id="H_TwoWheelerKM" value="<?php echo trim($rElig['TW_Km']); ?>"/>
<input type="hidden" Name="H_TwoWheelerKM_Rmk" id="H_TwoWheelerKM_Rmk" value="<?php if(trim($rElig['TW_InHQ_M'])!=''){ echo 'Max:'.trim($rElig['TW_InHQ_M'].'Km/Month'); } if(trim($rElig['TW_InHQ_D'])!=''){ echo ' '.trim($rElig['TW_InHQ_D']); } ?>"/>

<input type="hidden" Name="H_FourWheelerKM" id="H_FourWheelerKM" value="<?php echo trim($rElig['FW_Km']); ?>"/>
<input type="hidden" Name="H_FourWheelerKM_Rmk" id="H_FourWheelerKM_Rmk" value="<?php if(trim($rElig['FW_InHQ_M'])!=''){ echo 'Max:'.trim($rElig['FW_InHQ_M']).'Km/Month'; } if(trim($rElig['FW_InHQ_D'])!=''){ echo ' '.trim($rElig['FW_InHQ_D']); } ?>"/>
<?php $FAnnul=$rElig['FW_InHQ_M']*12; ?>
<?php } ?>

<input type="hidden" Name="H_VehicleCost" id="H_VehicleCost" value="<?php echo trim($rElig['Vehicle_Value_Limit']); ?>"/>


<input type="hidden" Name="H_Flight_YN" id="H_Flight_YN" value="<?php echo trim($rElig['Flight_YN']); ?>"/>
<input type="hidden" Name="H_Flight_Class" id="H_Flight_Class" value="<?php echo trim($rElig['Flight_Class']); ?>"/>
<input type="hidden" Name="H_Flight_Class_Rmk" id="H_Flight_Class_Rmk" value="<?php echo trim($rElig['Flight_Class_Rmk']);?>"/>
<input type="hidden" Name="H_Train_YN" id="H_Train_YN" value="<?php echo trim($rElig['Train_YN']); ?>"/>
<input type="hidden" Name="H_Train_Class" id="H_Train_Class" value="<?php echo trim($rElig['Train_Class']); ?>"/>
<input type="hidden" Name="H_Train_Class_Rmk" id="H_Train_Class_Rmk" value="<?php echo trim($rElig['Train_Class_Rmk']);?>"/>


<input type="hidden" Name="H_Mobile" id="H_Mobile" value="<?php echo trim($rElig['Mobile']); ?>"/>
<input type="hidden" Name="H_Mobile_Rmk" id="H_Mobile_Rmk" value="<?php echo trim($rElig['Mobile_Rmk']); ?>"/>
<input type="hidden" Name="H_Mobile_WithGPS" id="H_Mobile_WithGPS" value="<?php echo trim($rElig['Mobile_WithGPS']); ?>"/>
<input type="hidden" Name="H_Mobile_WithGPS_Rmk" id="H_Mobile_WithGPS_Rmk" value="<?php echo trim($rElig['Mobile_WithGPS_Rmk']); ?>"/>
<input type="hidden" Name="H_Mobile_Remb" id="H_Mobile_Remb" value="<?php echo trim($rElig['Mobile_Remb']); ?>"/>
<input type="hidden" Name="H_Mobile_Remb_Period" id="H_Mobile_Remb_Period" value="<?php echo trim($rElig['Mobile_Remb_Period']); ?>"/>
<input type="hidden" Name="H_Mobile_Remb_Period_Rmk" id="H_Mobile_Remb_Period_Rmk" value="<?php echo trim($rElig['Mobile_Remb_Period_Rmk']); ?>"/>

<input type="hidden" Name="H_Mobile_RembPost" id="H_Mobile_RembPost" value="<?php echo trim($rElig['Mobile_RembPost']); ?>"/>
<input type="hidden" Name="H_Mobile_RembPost_Period" id="H_Mobile_RembPost_Period" value="<?php echo trim($rElig['Mobile_RembPost_Period']); ?>"/>
<input type="hidden" Name="H_Mobile_RembPost_Period_Rmk" id="H_Mobile_RembPost_Period_Rmk" value="<?php echo trim($rElig['Mobile_RembPost_Period_Rmk']); ?>"/>



<input type="hidden" Name="H_MiscExp" id="H_MiscExp" value="N"/>

<?php $SqlCtc=mysql_query("SELECT ESCI FROM hrm_employee_ctc WHERE Status='A' AND EmployeeID=".$ei, $con); $ResCtc=mysql_fetch_assoc($SqlCtc); 

if($ResCtc['ESCI']>0){ $HealthInsu1=''; }
else{ $HealthInsu1=$rElig['Mediclaim_Coverage_Slabs']; }
?>

<input type="hidden" Name="H_HealthInsu" id="H_HealthInsu" value="<?php echo trim($HealthInsu1); ?>"/>
<input type="hidden" Name="H_HelthChekUp" id="H_HelthChekUp" value="<?php echo trim($rElig['Helth_CheckUp']); ?>"/>
<input type="hidden" Name="H_HelthChekUp_Rmk" id="H_HelthChekUp_Rmk" value="<?php echo trim($rElig['Helth_CheckUp_Rmk']); ?>"/>

<input type="hidden" Name="H_Term_Insurance" id="H_Term_Insurance" value="<?php echo trim($rElig['Term_Insurance']); ?>"/>
<input type="hidden" Name="H_Term_Insurance_Rmk" id="H_Term_Insurance_Rmk" value="<?php echo trim($rElig['Term_Insurance_Rmk']); ?>"/>

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
	 <table style="width:100%;"><!--Old--->
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
	 <td class="tdr">OutsideHQ&nbsp;Rs&nbsp;<input class="td2" style="width:150px;" Name="DaOutSide_HQRs" id="DaOutSide_HQRs" value="<?=$rEligE['DA_Outside_Hq']?>" disabled/>&nbsp;Rmk:<input class="td2" style="width:150px;" Name="DaOutSide_HQRs_Rmk" id="DaOutSide_HQRs_Rmk" value="<?=$rEligE['DA_Outside_Hq_Rmk']?>" disabled/>
	 <br />
	 @HQ&nbsp;Rs&nbsp;<input class="td2" style="width:150px;" Name="DaInSide_HQRs" id="DaInSide_HQRs" value="<?=$rEligE['DA_Inside_Hq']?>" disabled/>&nbsp;Rmk:<input class="td2" style="width:150px;" Name="DaInSide_HQRs_Rmk" id="DaInSide_HQRs_Rmk" value="<?=$rEligE['DA_Inside_Hq_Rmk']?>" disabled/>
	 <?php if($_REQUEST['C']==3){ ?>
	 <br />
	 ExHQ&nbsp;Rs&nbsp;<input class="td2" style="width:150px;" Name="ExHQ" id="ExHQ" value="<?=$rEligE['ExHQ']?>" disabled/>&nbsp;Rmk:<input class="td2" style="width:150px;" Name="ExHQ_Rmk" id="ExHQ_Rmk" value="<?=$rEligE['ExHQ_Rmk']?>" disabled/>
	 <?php }else{ ?>
	  <input type="hidden" Name="ExHQ" id="ExHQ" value="<?=$rEligE['ExHQ']?>" />
	  <input type="hidden" Name="ExHQ_Rmk" id="ExHQ_Rmk" value="<?=$rEligE['ExHQ_Rmk']?>" />
	 <?php } ?>
	 </td>
	</tr> 
   </table>
   
   <div id="Rw_2" style="display:none;">
   <table style="width:100%;"><!--Old--->
    <tr>
	 <td class="tdl">&nbsp;</td>
	 <td class="tdr">OutsideHQ&nbsp;Rs&nbsp;<input class="td2" style="background-color:#92D1BD;border:hidden;width:150px;" value="<?=$rEligE['DA_Outside_Hq']?>" disabled/>&nbsp;Rmk:<input class="td2" style="background-color:#92D1BD;border:hidden;width:150px;" value="<?=$rEligE['DA_Outside_Hq_Rmk']?>" disabled/>
	 <br />
	 @HQ&nbsp;Rs&nbsp;<input class="td2" style="background-color:#92D1BD;border:hidden;width:150px;" value="<?=$rEligE['DA_Inside_Hq']?>" disabled/>&nbsp;Rmk:<input class="td2" style="background-color:#92D1BD;border:hidden;width:150px;" value="<?=$rEligE['DA_Inside_Hq_Rmk']?>" disabled/>
	 <?php if($_REQUEST['C']==3){ ?>
	 <br />
	 ExHQ&nbsp;Rs&nbsp;<input class="td2" style="background-color:#92D1BD;border:hidden;width:150px;" value="<?=$rEligE['ExHQ']?>" disabled/>&nbsp;Rmk:<input class="td2" style="background-color:#92D1BD;border:hidden;width:150px;" value="<?=$rEligE['ExHQ_Rmk']?>" disabled/>
	 <?php }else{ ?>
	  <input type="hidden" value="<?=$rEligE['ExHQ']?>" />
	  <input type="hidden" value="<?=$rEligE['ExHQ_Rmk']?>" />
	 <?php } ?>
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
	 <td class="tdl">&nbsp;* Two Wheeler :</td>
	 <td class="tdr"><input class="tdc" Name="TwoWheelerKM" id="TwoWheelerKM" style="width:40px;" value="<?=trim($rEligE['Travel_TwoWeeKM'])?>" disabled/>/Km&nbsp;&nbsp; Rmk:&nbsp;<input class="tdc" Name="TwoWheelerKM_Rmk" id="TwoWheelerKM_Rmk" style="width:230px;" value="<?=trim($rEligE['Travel_TwoWeeKM_Rmk'])?>" disabled/>
	 </td>
	</tr>
   </table>
   
   <div id="Rw_3" style="display:none;">
   <table style="width:100%;"><!--Old--->
    <tr>
	 <td class="tdl">&nbsp;</td>
	 <td class="tdr"><input class="tdc" style="width:40px;background-color:#92D1BD;border:hidden;" value="<?=trim($rEligE['Travel_TwoWeeKM'])?>" disabled/>/Km&nbsp;&nbsp; Rmk:&nbsp;<input class="tdc" style="width:230px;background-color:#92D1BD;border:hidden;" value="<?=trim($rEligE['Travel_TwoWeeKM_Rmk'])?>" disabled/>
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
	 <td class="tdr"><input class="tdc" Name="FourWheelerKM" id="FourWheelerKM" style="width:40px;" value="<?=trim($rEligE['Travel_FourWeeKM'])?>" disabled/>/Km&nbsp;&nbsp; Rmk:&nbsp;<input class="tdc" Name="FourWheelerKM_Rmk" id="FourWheelerKM_Rmk" style="width:230px;" value="<?=trim($rEligE['Travel_FourWeeKM_Rmk'])?>" disabled/>
	 </td>
	</tr>
   </table>
   
   <div id="Rw_4" style="display:none;">
   <table style="width:100%;"><!--Old--->
    <tr>
	 <td class="tdl">&nbsp;</td>
	 <td class="tdr"><input class="tdc" style="width:40px;background-color:#92D1BD;border:hidden;" value="<?=trim($rEligE['Travel_FourWeeKM'])?>" disabled/>/Km&nbsp;&nbsp; Rmk:&nbsp;<input class="tdc" style="width:230px;background-color:#92D1BD;border:hidden;" value="<?=trim($rEligE['Travel_FourWeeKM_Rmk'])?>" disabled/>
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
        <td class="tdr"><select class="td3" id="VehiclePolicy" name="VehiclePolicy" style="width:330px;" disabled>
		<option value="" <?php if($rEligE['VehiclePolicy']==''){echo 'selected';}?>>&nbsp;NA</option>
<?php $sqlpl=mysql_query("select pd.PolicyId,PolicyName from hrm_master_eligibility_policy_dept pd inner join hrm_master_eligibility_policy p on pd.PolicyId=p.PolicyId where pd.DeptId=".$di." AND pd.Sts=1",$con);		
	while($respl=mysql_fetch_assoc($sqlpl)){ ?>	<option value="<?=$respl['PolicyId']?>" <?php if($rEligE['VehiclePolicy']==$respl['PolicyId']){echo 'selected';}?>>&nbsp;<?=$respl['PolicyName']?></option><?php } ?>
  </select>
  </td>
	  </tr>
	  <tr>
	    <td class="tdl">&nbsp;* Vehicle Value :</td>
        <td class="tdr"><input class="tdc" Name="VehicleCost" id="VehicleCost" style="width:100px;" value="<?=trim($rEligE['CostOfVehicle'])?>" disabled/>
  </td>
	  </tr>
	 </table>
	 
     <div id="Rw_15" style="display:none;">
    <table style="width:100%;"><!--Old--->
	  <tr>
	    <td class="tdl" style="color:#FF8000;">&nbsp;<?php //* Old : ?></td>
        <td class="tdr"><select class="td3" style="width:330px;background-color:#92D1BD;border:hidden;" disabled>
		<option value="" <?php if($rEligE['VehiclePolicy']==''){echo 'selected';}?>>&nbsp;NA</option>
<?php $sqlpl=mysql_query("select pd.PolicyId,PolicyName from hrm_master_eligibility_policy_dept pd inner join hrm_master_eligibility_policy p on pd.PolicyId=p.PolicyId where pd.DeptId=".$di." AND pd.Sts=1",$con);		
	while($respl=mysql_fetch_assoc($sqlpl)){ ?>	<option value="<?=$respl['PolicyId']?>" <?php if($rEligE['VehiclePolicy']==$respl['PolicyId']){echo 'selected';}?>>&nbsp;<?=$respl['PolicyName']?></option><?php } ?>
	
  </select></td>
	  </tr>
	   <tr>
	    <td class="tdl">&nbsp;</td>
        <td class="tdr"><input class="tdc" style="width:100px;background-color:#92D1BD;border:hidden;" value="<?=trim($rEligE['CostOfVehicle'])?>" disabled/>
  </td>
	  </tr>
	 </table>
     </div>
   
	</td>
   </tr>
  </table>
 </td>
 </tr>
<?php }else{ ?>
 <input type="hidden" id="VehiclePolicy" name="VehiclePolicy" value=""/>
 <input type="hidden" id="VehicleCost" name="VehicleCost" value=""/>
<?php } ?>

 
 <tr>
 <td>
  <table style="width:600px;">
   <tr>
    <td class="tdc">
	 <table style="width:100%;">
	  <tr>
	   <td class="tdl">&nbsp;* Mode of Travels OutSide HQ :</td>
       <td class="tdr">Flight: <select class="td3" Name="Flight_YN" id="Flight_YN" style="width:50px;" disabled/>
	   <option value="" <?php if($rEligE['Flight_Allow']==''){echo 'selected';}?>>Select</option>
       <option value="Y" <?php if($rEligE['Flight_Allow']=='Y'){echo 'selected';}?>>Yes</option>
	   <option value="N" <?php if($rEligE['Flight_Allow']=='N'){echo 'selected';}?>>No</option></select>
	   &nbsp;Cls: <select class="td3" Name="Flight_Class" id="Flight_Class" style="width:80px;" disabled/>
	   <option value="" <?php if($rEligE['Flight_Class']==''){echo 'selected';}?>>Select</option>
       <option value="Economy" <?php if($rEligE['Flight_Class']=='Economy'){echo 'selected';}?>>Economy</option>
	   <option value="Business" <?php if($rEligE['Flight_Class']=='Business'){echo 'selected';}?>>Business</option></select>
	   &nbsp;Rmk: <input Name="Flight_Class_Rmk" id="Flight_Class_Rmk" class="tdc" style="width:100px;" value="<?=trim($rEligE['Flight_Rmk'])?>" disabled/>
	   <br />
	   Train/Bus: <select class="td3" Name="Train_YN" id="Train_YN" style="width:50px;" disabled/>
	   <option value="" <?php if($rEligE['Train_Allow']==''){echo 'selected';}?>>Select</option>
       <option value="Y" <?php if($rEligE['Train_Allow']=='Y'){echo 'selected';}?>>Yes</option>
	   <option value="N" <?php if($rEligE['Train_Allow']=='N'){echo 'selected';}?>>No</option></select>
	   &nbsp;Cls: <select class="td3" Name="Train_Class" id="Train_Class" style="width:80px;" disabled/>
	   <option value="" <?php if($rEligE['Train_Class']==''){echo 'selected';}?>>Select</option>
	   <option value="General" <?php if($rEligE['Train_Class']=='General'){echo 'selected';}?>>General</option>
	   <option value="Sleeper" <?php if($rEligE['Train_Class']=='Sleeper'){echo 'selected';}?>>Sleeper</option>
	   <option value="AC-III" <?php if($rEligE['Train_Class']=='AC-III'){echo 'selected';}?>>AC-III</option>
	   <option value="AC-II" <?php if($rEligE['Train_Class']=='AC-II'){echo 'selected';}?>>AC-II</option> 
	   <option value="AC-I" <?php if($rEligE['Train_Class']=='AC-I'){echo 'selected';}?>>AC-I</option>
	   <option value="AC" <?php if($rEligE['Train_Class']=='AC'){echo 'selected';}?>>AC</option></select>
	   &nbsp;Rmk: <input Name="Train_Class_Rmk" id="Train_Class_Rmk" class="tdc" style="width:100px;" value="<?=trim($rEligE['Train_Rmk'])?>" disabled/>
       </td> 
	  </tr>
	 </table>
	 
   <div id="Rw_5" style="display:none;">
   <table style="width:100%;"><!--Old--->
     <tr>
	   <td class="tdl">&nbsp;</td>
       <td class="tdr">Flight: <select class="td3" style="width:50px;background-color:#92D1BD;border:hidden;" disabled/>
	   <option value="" <?php if($rEligE['Flight_Allow']==''){echo 'selected';}?>>Select</option>
       <option value="Y" <?php if($rEligE['Flight_Allow']=='Y'){echo 'selected';}?>>Yes</option>
	   <option value="N" <?php if($rEligE['Flight_Allow']=='N'){echo 'selected';}?>>No</option></select>
	   &nbsp;Cls: <select class="td3" style="width:80px;background-color:#92D1BD;border:hidden;" disabled/>
	   <option value="" <?php if($rEligE['Flight_Class']==''){echo 'selected';}?>>Select</option>
       <option value="Economy" <?php if($rEligE['Flight_Class']=='Economy'){echo 'selected';}?>>Economy</option>
	   <option value="Business" <?php if($rEligE['Flight_Class']=='Business'){echo 'selected';}?>>Business</option></select>
	   &nbsp;Rmk: <input class="tdc" style="width:100px;background-color:#92D1BD;border:hidden;" value="<?=trim($rEligE['Flight_Rmk'])?>" disabled/>
	   <br />
	   Train/Bus: <select class="td3" style="width:50px;background-color:#92D1BD;border:hidden;" disabled/>
	   <option value="" <?php if($rEligE['Train_Allow']==''){echo 'selected';}?>>Select</option>
       <option value="Y" <?php if($rEligE['Train_Allow']=='Y'){echo 'selected';}?>>Yes</option>
	   <option value="N" <?php if($rEligE['Train_Allow']=='N'){echo 'selected';}?>>No</option></select>
	   &nbsp;Cls: <select class="td3" style="width:80px;background-color:#92D1BD;border:hidden;" disabled/>
	   <option value="" <?php if($rEligE['Train_Class']==''){echo 'selected';}?>>Select</option>
	   <option value="General" <?php if($rEligE['Train_Class']=='General'){echo 'selected';}?>>General</option>
	   <option value="Sleeper" <?php if($rEligE['Train_Class']=='Sleeper'){echo 'selected';}?>>Sleeper</option>
	   <option value="AC-III" <?php if($rEligE['Train_Class']=='AC-III'){echo 'selected';}?>>AC-III</option>
	   <option value="AC-II" <?php if($rEligE['Train_Class']=='AC-II'){echo 'selected';}?>>AC-II</option> 
	   <option value="AC-I" <?php if($rEligE['Train_Class']=='AC-I'){echo 'selected';}?>>AC-I</option>
	   <option value="AC" <?php if($rEligE['Train_Class']=='AC'){echo 'selected';}?>>AC</option></select>
	   &nbsp;Rmk: <input class="tdc" style="width:100px;background-color:#92D1BD;border:hidden;" value="<?=trim($rEligE['Train_Rmk'])?>" disabled/>
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
	    <td class="tdl">&nbsp;* Mobile expenses Reimbursement :
		 <div id="Rw_66" style="display:none;"></div>
<script type="text/javascript">
function FunPrePost(v)
{
 if(v=='post')
 {
  if(document.getElementById("postpaid").checked==true)
  { 
   document.getElementById("Mobile_RembPost").value = document.getElementById("H_Mobile_RembPost").value; 
   document.getElementById("Mobile_RembPost_Period").value = document.getElementById("H_Mobile_RembPost_Period").value;
   document.getElementById("Mobile_RembPost_Period_Rmk").value = document.getElementById("H_Mobile_RembPost_Period_Rmk").value;
  }
  else{ document.getElementById("Mobile_RembPost").value = ''; document.getElementById("Mobile_RembPost_Period").value = '';
        document.getElementById("Mobile_RembPost_Period_Rmk").value = ''; } 
 }
 else if(v=='pre')
 {
  if(document.getElementById("prepaid").checked==true)
  { 
   document.getElementById("Mobile_Remb").value = document.getElementById("H_Mobile_Remb").value; 
   document.getElementById("Mobile_Remb_Period").value = document.getElementById("H_Mobile_Remb_Period").value;
   document.getElementById("Mobile_Remb_Period_Rmk").value = document.getElementById("H_Mobile_Remb_Period_Rmk").value;
  }
  else{ document.getElementById("Mobile_Remb").value = ''; document.getElementById("Mobile_Remb_Period").value = '';
        document.getElementById("Mobile_Remb_Period_Rmk").value = ''; } 
 }
}
</script>
		</td>
        <td class="tdr">Prepaid: <input type="checkbox" id="prepaid" name="prepaid" onchange="FunPrePost('pre')" <?php if($rEligE['Mobile_Exp_Rem_Rs']!=''){ echo 'checked'; } ?>/>
		&nbsp;Rs.:<input class="td3" id="Mobile_Remb" name="Mobile_Remb" style="text-align:center; width:40px;" value="<?=$rEligE['Mobile_Exp_Rem_Rs']?>" disabled/>
		&nbsp; Prd : <select class="td3" Name="Mobile_Remb_Period" id="Mobile_Remb_Period" style="width:60px;" disabled><option value="Mnt" <?php if($rEligE['Prd']=='Mnt'){echo 'selected';}?>>Month</option>
         <option value="Qtr" <?php if($rEligE['Prd']=='Qtr'){echo 'selected';}?>>Qtr</option>
         <option value="1/2 Yearly" <?php if($rEligE['Prd']=='1/2 Yearly'){echo 'selected';}?>>1/2 Yearly</option>
         <option value="Yearly" <?php if($rEligE['Prd']=='Yearly'){echo 'selected';}?>>Yearly</option>
         <option value="" <?php if($rEligE['Prd']==''){echo 'selected';}?>>&nbsp;NA</option>
         </select>
		 &nbsp;Rmk: <input Name="Mobile_Remb_Period_Rmk" id="Mobile_Remb_Period_Rmk" class="tdc" style="width:100px;" value="<?=trim($rEligE['Mobile_Exp_Rem_Rmk'])?>" disabled/>
		 <br />
		 Postpaid: <input type="checkbox" id="postpaid" name="postpaid" onchange="FunPrePost('post')" <?php if($rEligE['Mobile_Exp_RemPost_Rs']!=''){ echo 'checked'; } ?>/>
		&nbsp;Rs.:<input class="td3" id="Mobile_RembPost" name="Mobile_RembPost" style="text-align:center; width:40px;" value="<?=$rEligE['Mobile_Exp_RemPost_Rs']?>" disabled/>
		&nbsp; Prd : <select class="td3" Name="Mobile_RembPost_Period" id="Mobile_RembPost_Period" style="width:60px;" disabled><option value="Mnt" <?php if($rEligE['PrdPost']=='Mnt'){echo 'selected';}?>>Month</option>
         <option value="Qtr" <?php if($rEligE['PrdPost']=='Qtr'){echo 'selected';}?>>Qtr</option>
         <option value="1/2 Yearly" <?php if($rEligE['PrdPost']=='1/2 Yearly'){echo 'selected';}?>>1/2 Yearly</option>
         <option value="Yearly" <?php if($rEligE['PrdPost']=='Yearly'){echo 'selected';}?>>Yearly</option>
         <option value="" <?php if($rEligE['PrdPost']==''){echo 'selected';}?>>&nbsp;NA</option>
         </select>
		 &nbsp;Rmk: <input Name="Mobile_RembPost_Period_Rmk" id="Mobile_RembPost_Period_Rmk" class="tdc" style="width:100px;" value="<?=trim($rEligE['Mobile_Exp_RemPost_Rmk'])?>" disabled/>
		 
		</td>
	  </tr>
	 </table>
	 
     <div id="Rw_6" style="display:none;">
	 <table style="width:100%;"><!--Old--->
	  <tr>
	    <td class="tdl">&nbsp;</td>
        <td class="tdr">Prepaid: <input type="checkbox" <?php if($rEligE['Mobile_Exp_Rem_Rs']!=''){ echo 'checked'; } ?> disabled/>
		&nbsp;Rs.:<input class="td3" style="text-align:center;background-color:#92D1BD;border:hidden;width:40px;" value="<?=$rEligE['Mobile_Exp_Rem_Rs']?>" disabled/>
		&nbsp; Prd : <select class="td3" style="text-align:center;background-color:#92D1BD;border:hidden;width:60px;" disabled><option value="Mnt" <?php if($rEligE['Prd']=='Mnt'){echo 'selected';}?>>Month</option>
         <option value="Qtr" <?php if($rEligE['Prd']=='Qtr'){echo 'selected';}?>>Qtr</option>
         <option value="1/2 Yearly" <?php if($rEligE['Prd']=='1/2 Yearly'){echo 'selected';}?>>1/2 Yearly</option>
         <option value="Yearly" <?php if($rEligE['Prd']=='Yearly'){echo 'selected';}?>>Yearly</option>
         <option value="" <?php if($rEligE['Prd']==''){echo 'selected';}?>>&nbsp;NA</option>
         </select>
		 &nbsp;Rmk: <input class="tdc" style="text-align:center;background-color:#92D1BD;border:hidden;width:100px;" value="<?=trim($rEligE['Mobile_Exp_Rem_Rmk'])?>" disabled/>
		 <br />
		 Postpaid: <input type="checkbox" <?php if($rEligE['Mobile_Exp_RemPost_Rs']!=''){ echo 'checked'; } ?> disabled/>
		&nbsp;Rs.:<input class="td3" style="text-align:center;background-color:#92D1BD;border:hidden;width:40px;" value="<?=$rEligE['Mobile_Exp_RemPost_Rs']?>" disabled/>
		&nbsp; Prd : <select class="td3" style="text-align:center;background-color:#92D1BD;border:hidden;width:60px;" disabled><option value="Mnt" <?php if($rEligE['PrdPost']=='Mnt'){echo 'selected';}?>>Month</option>
         <option value="Qtr" <?php if($rEligE['PrdPost']=='Qtr'){echo 'selected';}?>>Qtr</option>
         <option value="1/2 Yearly" <?php if($rEligE['PrdPost']=='1/2 Yearly'){echo 'selected';}?>>1/2 Yearly</option>
         <option value="Yearly" <?php if($rEligE['PrdPost']=='Yearly'){echo 'selected';}?>>Yearly</option>
         <option value="" <?php if($rEligE['PrdPost']==''){echo 'selected';}?>>&nbsp;NA</option>
         </select>
		 &nbsp;Rmk: <input class="tdc" style="text-align:center;background-color:#92D1BD;border:hidden;width:100px;" value="<?=trim($rEligE['Mobile_Exp_RemPost_Rmk'])?>" disabled/>
		 </td>
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
  if(document.getElementById("GPCheck").checked==true)
  { 
   document.getElementById("GPSSet").value='Y'; 
   document.getElementById("MobileHandRs").value=document.getElementById("H_Mobile_WithGPS").value; 
   document.getElementById("MobileHandRs_Rmk").value=document.getElementById("H_Mobile_WithGPS_Rmk").value; 
  }
  else if(document.getElementById("GPCheck").checked==false)
  {
   document.getElementById("GPSSet").value='N';
   document.getElementById("MobileHandRs").value=document.getElementById("H_Mobile").value; 
   document.getElementById("MobileHandRs_Rmk").value=document.getElementById("H_Mobile_Rmk").value;  
  } 
 }
 </script>
 <input type="hidden" Name="Mobile" id="Mobile" value=""/>
 <input type="hidden" Name="Mobile_Rmk" id="Mobile_Rmk" value=""/>
 <input type="hidden" Name="Mobile_WithGPS" id="Mobile_WithGPS" value=""/>
 <input type="hidden" Name="Mobile_WithGPS_Rmk" id="Mobile_WithGPS_Rmk" value=""/>
 <tr>
 <td>
  <table style="width:600px;">
   <tr>
    <td class="tdc">
	 <table style="width:100%;">
	  <tr>
	    <td class="tdl">&nbsp;* Mobile Handset :</td>
        <td class="tdr">GPRS:<input type="checkbox" name="GPCheck" id="GPCheck" onClick="ClickGPRS()" <?php if($rEligE['GPSSet']=='Y' OR $rEligE['GPSSet']=='1'){echo 'checked';}?> disabled/><input type="hidden" id="GPSSet" name="GPSSet" value="<?=$rEligE['GPSSet']?>" />
		&nbsp;Amount: <input Name="MobileHandRs" id="MobileHandRs" class="tdc" value="<?=$rEligE['Mobile_Hand_Elig_Rs']?>" style="width:70px;" disabled/>
		&nbsp;Rmk: <input class="tdc" Name="MobileHandRs_Rmk" id="MobileHandRs_Rmk" style="width:100px;" value="<?=trim($rEligE['Mobile_Hand_Elig_Rmk'])?>" disabled/>
        </td>
	  </tr>
	 </table>
	 
     <div id="Rw_7" style="display:none;">
	 <table style="width:100%;"><!--Old--->
	   <tr>
	    <td class="tdl">&nbsp;</td>
        <td class="tdr">GPRS:<input type="checkbox" <?php if($rEligE['GPSSet']=='Y'){echo 'checked';}?> style="background-color:#92D1BD;border:hidden;" disabled/>
		&nbsp;Amount: <input class="tdc" value="<?=$rEligE['Mobile_Hand_Elig_Rs']?>" style="background-color:#92D1BD;border:hidden;width:70px;" disabled/>
		&nbsp;Rmk: <input class="tdc" style="background-color:#92D1BD;border:hidden;width:100px;" value="<?=trim($rEligE['Mobile_Hand_Elig_Rmk'])?>" disabled/>
        </td>
	  </tr>
	 </table>
     </div>
   
	</td>
   </tr>
  </table>
 </td>
 </tr>
  
   <div id="Rw_8" style="display:none;"> 
   </div>
   
 
 <tr>
 <td>
  <table style="width:600px;">
   <tr>
    <td class="tdc">
	 <table style="width:100%;">
	     
<?php $SqlCtc=mysql_query("SELECT ESCI FROM hrm_employee_ctc_pms WHERE EmployeeID=".$ei." AND PmsId=".$pi, $con); $RowCtc=mysql_num_rows($SqlCtc);
if($RowCtc>0)
{
 $ResCtc=mysql_fetch_assoc($SqlCtc); 
}
else
{
 $SqlCtc=mysql_query("SELECT ESCI FROM hrm_employee_ctc WHERE Status='A' AND EmployeeID=".$ei, $con); $ResCtc=mysql_fetch_assoc($SqlCtc);   
}

 

if($ResCtc['ESCI']>0){ $HealthInsu=''; }
else{ $HealthInsu=$rEligE['Health_Insurance']; }
?>	     
	  <tr>
	   <td class="tdl">&nbsp;* Health Insurance(Premium Paid by Company) :</td>
       <td class="tdr"><input Name="HealthInsu" id="HealthInsu" class="tdc" style="width:100px;" value="<?=trim($HealthInsu)?>" disabled/></td>
	  </tr>
	 </table>
	 
     <div id="Rw_9" style="display:none;">
	 <table style="width:100%;">
	  <tr>
	   <td class="tdl" style="color:#FF8000;">&nbsp;<?php //* Old : ?></td>
       <td class="tdr"><input class="tdc" style="width:100px;background-color:#92D1BD;border:hidden;" value="<?=trim($HealthInsu)?>" disabled/></td>
	  </tr>
	 </table>
     </div>
   
	</td>
   </tr>
  </table>
 </td>
 </tr>
 
 
<?php if($ci==1){ //Group Personal Accident Insurance?>
 <tr>
 <td>
  <table style="width:600px;">
   <tr>
    <td class="tdc">
	 <table style="width:100%;">
	  <tr>
	   <td class="tdl">&nbsp;* Group Term Insurance :</td>
       <td class="tdr"><input Name="Term_Insurance" id="Term_Insurance" class="tdc" style="width:100px;" value="<?php echo $rEligE['Term_Insurance']; ?>" readonly/></td>
	  </tr>
	 </table>
	 
     <div id="Rw_10" style="display:none;">
	 <table style="width:100%;"><!--Old-->
	  <tr>
	   <td class="tdl" style="color:#FF8000;">&nbsp;</td>
       <td class="tdr"><input class="tdc" style="background-color:#92D1BD;border:hidden;width:100px;" value="<?php echo $rEligE['Term_Insurance']; ?>" readonly/></td>
	  </tr>
	 </table>
     </div>
   
	</td>
   </tr>
  </table>
 </td>
 </tr>
<?php }else{ ?>
<input type="hidden" Name="Term_Insurance" id="Term_Insurance" value="" readonly/>
<div id="Rw_10"></div>
<?php } ?> 
<?php /******* New * New * New * New * New * New * New 2222  ********/ ?>
<script type="text/javascript">
function FunHealtCh(v)
{ 
 if(v=='Y')
 { 
  document.getElementById("HelthChekUp_Amt").value = document.getElementById("H_HelthChekUp").value;
  document.getElementById("HelthChekUp_Rmk").value = document.getElementById("H_HelthChekUp_Rmk").value;
 }
 else
 { 
  document.getElementById("HelthChekUp_Amt").value = 0;
  document.getElementById("HelthChekUp_Rmk").value = '';
 }
}
</script>
 <tr>
 <td>
  <table style="width:600px;"> 
   <tr>
    <td class="tdc">
	 <table style="width:100%;">
	  <tr>
	   <td class="tdl">&nbsp;* Executive Health Check-up :</td>
       <td class="tdr"><select Name="HelthChekUp" id="HelthChekUp" class="td3" style="width:60px;" onchange="FunHealtCh(this.value)" disabled>
       <option value="Y" <?php if($rEligE['HelthCheck']=='Y'){echo 'selected';} ?>>Yes</option>
       <option value="N" <?php if($rEligE['HelthCheck']=='N' OR $rEligE['HelthCheck']==''){echo 'selected';} ?>>No</option>
       </select>
	   &nbsp;Amount: <input Name="HelthChekUp_Amt" id="HelthChekUp_Amt" class="tdc" style="width:70px;" value="<?php if($rEligE['HelthCheck']=='Y'){echo $rElig['Helth_CheckUp']; } ?>" readonly/>
	   &nbsp;Rmk: <input class="tdl" Name="HelthChekUp_Rmk" id="HelthChekUp_Rmk" style="width:100px;" value="<?php if($rEligE['HelthCheck']=='Y'){echo $rElig['Helth_CheckUp_Rmk']; } ?>" readonly/>
	   </td>
	  </tr>
	 </table>
	 
     <div id="Rw_11" style="display:none;">
	 <table style="width:100%;"><!-- Old --->
	  <tr>
	   <td class="tdl" style="color:#FF8000;">&nbsp;</td>
	    <td class="tdr"><select class="td3" style="width:60px;background-color:#92D1BD;border:hidden;" disabled>
       <option value="Y" <?php if($rEligE['HelthCheck']=='Y'){echo 'selected';} ?>>Yes</option>
       <option value="N" <?php if($rEligE['HelthCheck']=='N' OR $rEligE['HelthCheck']==''){echo 'selected';} ?>>No</option>
       </select>
	   &nbsp;Amount: <input class="tdc" style="width:70px;background-color:#92D1BD;border:hidden;" value="<?php if($rEligE['HelthCheck']=='Y'){echo $rElig['Helth_CheckUp']; } ?>" readonly/>
	   &nbsp;Rmk: <input class="tdl" style="width:100px;background-color:#92D1BD;border:hidden;" value="<?php if($rEligE['HelthCheck']=='Y'){echo $rElig['Helth_CheckUp_Rmk']; } ?>" readonly/>
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
	   <td class="tdl">&nbsp;* Gratuity and Bonus/Exgretia(Monthly) :</td>
       <td class="tdr"><input Name="BonusElig" id="BonusElig" class="td3" style="width:100px;" value="As per law" disabled readonly/></td>
	   <input type="hidden" Name="GratuityElig" id="GratuityElig" class="td3" style="width:100px;" value="As per law" disabled readonly/>
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
        <td class="tdr"><input class="td3" Name="Rmkk" id="Rmkk" style="width:400px;" value="<?php echo $rEligE['Remark'];?>"/></td>
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