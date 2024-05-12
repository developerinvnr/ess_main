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
  var DaOutSide_HQRs_Rmk = document.getElementById("DaOutSide_HQRs_Rmk").value;
  var DaInSide_HQRs = document.getElementById("DaInSide_HQRs").value; 
  var DaInSide_HQRs_Rmk = document.getElementById("DaInSide_HQRs_Rmk").value;
  var TwoWheelerKM = document.getElementById("TwoWheelerKM").value;
  var TwoWheelerKM_Rmk = document.getElementById("TwoWheelerKM_Rmk").value; 
  var FourWheelerKM = document.getElementById("FourWheelerKM").value; 
  var FourWheelerKM_Rmk = document.getElementById("FourWheelerKM_Rmk").value; 
  var VehiclePolicy = document.getElementById("VehiclePolicy").value; 
  
  var Flight_YN = document.getElementById("Flight_YN").value;
  var Flight_Class = document.getElementById("Flight_Class").value;
  var Flight_Class_Rmk = document.getElementById("Flight_Class_Rmk").value;
  var Train_YN = document.getElementById("Train_YN").value;
  var Train_Class = document.getElementById("Train_Class").value;
  var Train_Class_Rmk = document.getElementById("Train_Class_Rmk").value;
  
  var Mobile_Remb = document.getElementById("Mobile_Remb").value;
  var Mobile_Remb_Period = document.getElementById("Mobile_Remb_Period").value;
  var Mobile_Remb_Period_Rmk = document.getElementById("Mobile_Remb_Period_Rmk").value;
  var Mobile_RembPost = document.getElementById("Mobile_RembPost").value;
  var Mobile_RembPost_Period = document.getElementById("Mobile_RembPost_Period").value;
  var Mobile_RembPost_Period_Rmk = document.getElementById("Mobile_RembPost_Period_Rmk").value;
  
  var GPSSet = document.getElementById("GPSSet").value; 
  var MobileHandRs = document.getElementById("MobileHandRs").value; 
  var MobileHandRs_Rmk = document.getElementById("MobileHandRs_Rmk").value;
  var HealthInsu = document.getElementById("HealthInsu").value; 
  var Term_Insurance = document.getElementById("Term_Insurance").value; 
  var HelthChekUp = document.getElementById("HelthChekUp").value; 
  var HelthChekUp_Amt = document.getElementById("HelthChekUp_Amt").value; 
  var HelthChekUp_Rmk = document.getElementById("HelthChekUp_Rmk").value;
  var VehicleCost = document.getElementById("VehicleCost").value;
    
  var Rmkk = document.getElementById("Rmkk").value;
  var CHDate = document.getElementById("CHDate").value;
  var Car2Policy = ''; var With2Driver = ''; 
  var Advance2Com = ''; var DateOfEPolicy = ''; var LessKm =''; var Plan ='';
  
  var agree=confirm("Are you sure you want to save Employee Eligibility?"); 
  if(agree) 
  { 
   //var url = 'HRNormalizedInc.php'; var pars = 'LodgingCatA='+LodgingCatA+'&LodgingCatB='+LodgingCatB+'&LodgingCatC='+LodgingCatC+'&DaOutSide_HQ='+DaOutSide_HQ+'&DaOutSide_HQRs='+DaOutSide_HQRs+'&DaInSide_HQ='+DaInSide_HQ+'&DaInSide_HQRs='+DaInSide_HQRs+'&TwoWheelerKM='+TwoWheelerKM+'&FourWheelerKM='+FourWheelerKM+'&TraMode='+TraMode+'&TraClass='+TraClass+'&MoExpeReim='+MoExpeReim+'&MiscExp='+MiscExp+'&HealthInsu='+HealthInsu+'&Bonus='+Bonus+'&Gratuity='+Gratuity+'&CHDate='+CHDate+'&E='+E+'&P='+P+'&Y='+Y+'&C='+C+'&U='+U+'&ModeTraOutSide_HQ='+ModeTraOutSide_HQ+'&MobileExpRs='+MobileExpRs+'&MobileHandRs='+MobileHandRs+'&MoHandSet='+MoHandSet+'&TwoWRestrict='+TwoWRestrict+'&TwoWRestrict_PD='+TwoWRestrict_PD+'&FourWRestrict='+FourWRestrict+'&MoComHandSet='+MoComHandSet+'&TwoWRestrict_OutSite='+TwoWRestrict_OutSite+'&FourWRestrict_OutSite='+FourWRestrict_OutSite+'&HelthChekUp='+HelthChekUp+'&Car2Policy='+Car2Policy+'&VehicleCost='+VehicleCost+'&With2Driver='+With2Driver+'&Advance2Com='+Advance2Com+'&DateOfEPolicy='+DateOfEPolicy+'&LessKm='+LessKm+'&Prd='+Prd+'&Rmk='+Rmk+'&VehiclePolicy='+VehiclePolicy+'&Plan='+Plan+'&GPSSet='+GPSSet; 
   
   var url = 'HRNormalizedInc.php'; var pars = 'LodgingCatA='+LodgingCatA+'&LodgingCatB='+LodgingCatB+'&LodgingCatC='+LodgingCatC+'&DaOutSide_HQRs='+DaOutSide_HQRs+'&DaOutSide_HQRs_Rmk='+DaOutSide_HQRs_Rmk+'&DaInSide_HQRs='+DaInSide_HQRs+'&DaInSide_HQRs_Rmk='+DaInSide_HQRs_Rmk+'&TwoWheelerKM='+TwoWheelerKM+'&TwoWheelerKM_Rmk='+TwoWheelerKM_Rmk+'&FourWheelerKM='+FourWheelerKM+'&FourWheelerKM_Rmk='+FourWheelerKM_Rmk+'&VehiclePolicy='+VehiclePolicy+'&Flight_YN='+Flight_YN+'&Flight_Class='+Flight_Class+'&Flight_Class_Rmk='+Flight_Class_Rmk+'&Train_YN='+Train_YN+'&Train_Class='+Train_Class+'&Train_Class_Rmk='+Train_Class_Rmk+'&Mobile_Remb='+Mobile_Remb+'&Mobile_Remb_Period='+Mobile_Remb_Period+'&Mobile_Remb_Period_Rmk='+Mobile_Remb_Period_Rmk+'&Mobile_RembPost='+Mobile_RembPost+'&Mobile_RembPost_Period='+Mobile_RembPost_Period+'&Mobile_RembPost_Period_Rmk='+Mobile_RembPost_Period_Rmk+'&GPSSet='+GPSSet+'&MobileHandRs='+MobileHandRs+'&MobileHandRs_Rmk='+MobileHandRs_Rmk+'&HealthInsu='+HealthInsu+'&Term_Insurance='+Term_Insurance+'&HelthChekUp='+HelthChekUp+'&HelthChekUp_Amt='+HelthChekUp_Amt+'&HelthChekUp_Rmk='+HelthChekUp_Rmk+'&Rmkk='+Rmkk+'&CHDate='+CHDate+'&E='+E+'&P='+P+'&Y='+Y+'&C='+C+'&U='+U+'&Car2Policy='+Car2Policy+'&VehicleCost='+VehicleCost+'&With2Driver='+With2Driver+'&Advance2Com='+Advance2Com+'&DateOfEPolicy='+DateOfEPolicy+'&LessKm='+LessKm+'&Plan='+Plan;
  
   var myAjax = new Ajax.Request(  url, { method: 'post', parameters: pars, onComplete: show_HREmpElig});
   return true; 
  }else{ return false; }
}
function show_HREmpElig(originalRequest)
{ document.getElementById("msgElig").innerHTML = originalRequest.responseText; 
  //if(document.getElementById("ActLogA").value==1){ alert("Employee Eligibility updated successfully!"); }
  //else{ alert("Error.. !"); }
  //document.location.reload("ReloadDiv");
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