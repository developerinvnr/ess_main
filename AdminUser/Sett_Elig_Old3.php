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
<script type="text/javascript" language="javascript">
/******************************************************* Eligibility ************************************/
/******************************************************* Eligibility ************************************/
/******************************************************* Eligibility ************************************/
function HRSaveElig(E,P,Y,C,U)
{ 
    
  var LodgingCatA = document.getElementById("LodgingCatA").value;  
  var LodgingCatB = document.getElementById("LodgingCatB").value; 
  var LodgingCatC = document.getElementById("LodgingCatC").value;  
  var DaOutSide_HQRs = document.getElementById("DaOutSide_HQRs").value; 
  if(DaOutSide_HQRs!=''){var DaOutSide_HQ='Y';}else{var DaOutSide_HQ='N';}
  var DaInSide_HQRs = document.getElementById("DaInSide_HQRs").value;
  if(DaInSide_HQRs!=''){var DaInSide_HQ='Y';}else{var DaInSide_HQ='N';} 
  
  var TwoWheelerKM = document.getElementById("TwoWheelerKM").value;
  var TwoWRestrict_PD = document.getElementById("TwoWRestrict_PD").value; 
  var TwoWRestrict = document.getElementById("TwoWRestrict").value; 
  var TwoWRestrict_OutSite = document.getElementById("TwoWRestrict_OutSite").value; 
  var FourWheelerKM = document.getElementById("FourWheelerKM").value; 
  var FourWRestrict = document.getElementById("FourWRestrict").value;
  var FourWRestrict_OutSite = document.getElementById("FourWRestrict_OutSite").value;
  var VehiclePolicy = document.getElementById("VehiclePolicy").value;
  
  var TraMode = document.getElementById("TraMode").value;
  if(TraMode!=''){var ModeTraOutSide_HQ='Y';}else{var ModeTraOutSide_HQ='N';}
  var TraClass = document.getElementById("TraClass").value;
  
  var MobileExpRs = document.getElementById("MobileExpRs").value; 
  var Prd = document.getElementById("Prdd").value; 
  if(MobileExpRs!=''){var MoExpeReim='Y';}else{var MoExpeReim='N';}
  
  var MobileHandRs = document.getElementById("MobileHandRs").value; 
  if(MobileHandRs!=''){var MoHandSet='Y';}else{var MoHandSet='N';}
  var MoComHandSet='N';
  var GPSSet=document.getElementById("GPSSet").value;
   
  var MiscExp = document.getElementById("MiscExp").value; 
  var HealthInsu = document.getElementById("HealthInsu").value; 
  var HelthChekUp = document.getElementById("HelthChekUp").value; 
  
  var Bonus = document.getElementById("BonusElig").value;   
  var Gratuity = document.getElementById("GratuityElig").value; 
  var Rmk = document.getElementById("Rmkk").value;
  var CHDate = document.getElementById("CHDate").value;
  
  var Car2Policy = ''; var VehicleCost = ''; var With2Driver = ''; 
  var Advance2Com = ''; var DateOfEPolicy = ''; var LessKm =''; var Plan ='';
 

  var agree=confirm("Are you sure you want to save Employee Eligibility?"); 
  if(agree) 
  { 
   var url = 'HRNormalizedInc.php'; var pars = 'LodgingCatA='+LodgingCatA+'&LodgingCatB='+LodgingCatB+'&LodgingCatC='+LodgingCatC+'&DaOutSide_HQ='+DaOutSide_HQ+'&DaOutSide_HQRs='+DaOutSide_HQRs+'&DaInSide_HQ='+DaInSide_HQ+'&DaInSide_HQRs='+DaInSide_HQRs+'&TwoWheelerKM='+TwoWheelerKM+'&FourWheelerKM='+FourWheelerKM+'&TraMode='+TraMode+'&TraClass='+TraClass+'&MoExpeReim='+MoExpeReim+'&MiscExp='+MiscExp+'&HealthInsu='+HealthInsu+'&Bonus='+Bonus+'&Gratuity='+Gratuity+'&CHDate='+CHDate+'&E='+E+'&P='+P+'&Y='+Y+'&C='+C+'&U='+U+'&ModeTraOutSide_HQ='+ModeTraOutSide_HQ+'&MobileExpRs='+MobileExpRs+'&MobileHandRs='+MobileHandRs+'&MoHandSet='+MoHandSet+'&TwoWRestrict='+TwoWRestrict+'&TwoWRestrict_PD='+TwoWRestrict_PD+'&FourWRestrict='+FourWRestrict+'&MoComHandSet='+MoComHandSet+'&TwoWRestrict_OutSite='+TwoWRestrict_OutSite+'&FourWRestrict_OutSite='+FourWRestrict_OutSite+'&HelthChekUp='+HelthChekUp+'&Car2Policy='+Car2Policy+'&VehicleCost='+VehicleCost+'&With2Driver='+With2Driver+'&Advance2Com='+Advance2Com+'&DateOfEPolicy='+DateOfEPolicy+'&LessKm='+LessKm+'&Prd='+Prd+'&Rmk='+Rmk+'&VehiclePolicy='+VehiclePolicy+'&Plan='+Plan+'&GPSSet='+GPSSet; 
   var myAjax = new Ajax.Request(  url, { method: 'post', parameters: pars, onComplete: show_HREmpElig});
   return true; 
  }else{ return false; }
}
function show_HREmpElig(originalRequest)
{ document.getElementById("msgElig").innerHTML = originalRequest.responseText; 
  document.location.reload("ReloadDiv");
  //window.location="HREmpAppApproval.php?action=approve&P="+P+"&E="+E+"&Y="+Y+"&C="+C+"&U="+U;
}

</script>

 <?php /////////////////////////////////// Second Table Data Open //////////////////////////////?>
 <?php /////////////////////////////////// Second Table Data Open //////////////////////////////?>
 <?php /////////////////////////////////// Second Table Data Open //////////////////////////////?>

<td style="width:100px;" align="center" valign="top">
   <?php $ei=$EmpId; $ci=$ComId; $ui=$UId; $pi=$PmsId; 
         $di=$ResEmp['DepartmentId']; $gi=$GradeId; $Grade=$Grade; 
		 //echo $ei."-".$ci."-".$ui."-".$pi."-".$di."-".$gi."-".$Grade;
		 
	$sqlChElg=mysql_query("select * from hrm_employee_eligibility_pms where EmployeeID=".$ei." AND PmsId=".$pi,$con);
	$rowChElg=mysql_num_rows($sqlChElg);
	if($rowChElg==0)
	{	 
	 $sEligE = mysql_query("SELECT * FROM hrm_employee_eligibility WHERE Status='A' AND EmployeeID=".$ei, $con);  
     $rEligE=mysql_fetch_assoc($sEligE);	 
	}
	else{ $rEligE=mysql_fetch_assoc($sqlChElg); }	 
   ?>
   <div id="ReloadDiv">
   <?php include("EmpEligMaster.php"); ?>
   </div>
  </td>
 <?php /////////////////////////////////// Second Table Data Close //////////////////////////////?>
 <?php /////////////////////////////////// Second Table Data Close //////////////////////////////?>
 <?php /////////////////////////////////// Second Table Data Close //////////////////////////////?>