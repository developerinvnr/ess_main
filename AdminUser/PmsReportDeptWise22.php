<?php session_start();

if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}

include("../function.php");

if(check_user()==false){header('Location:../index.php');}

require_once('logcheck.php');

if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}

if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}
//****************************************************************************************************************
/* $sql22=mysql_query("select hrm_employee.EmpCode, EmployeeID from hrm_employee where EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId, $con); 

while($res22=mysql_fetch_array($sql22)){    				

$sqlM = mysql_query("SELECT MAX(SalaryChange_Date) as SalaryChDate FROM hrm_pms_appraisal_history where SalaryChange_Date!='".date("Y-10-01")."' AND EmpCode=".$res22['EmpCode']." AND CompanyId=".$CompanyId, $con); $resM = mysql_fetch_assoc($sqlM);

$sqlAmt=mysql_query("select Previous_GrossSalaryPM, Incentive from hrm_pms_appraisal_history where SalaryChange_Date='".$resM['SalaryChDate']."' AND EmpCode=".$res22['EmpCode']." AND CompanyId=".$CompanyId, $con); $resAmt=mysql_fetch_assoc($sqlAmt); 

//$sqlUp=mysql_query("update hrm_pms_appraisal_history set HOD_EmployeeID=".$EmployeeId." where EmpCode=".$res22['EmpCode']." AND CompanyId=".$CompanyId, $con);

$sqlUp=mysql_query("update hrm_employee_pms set EmpCurrGrossPM=".$resAmt['Previous_GrossSalaryPM'].", EmpCurrIncentivePM=".$resAmt['Incentive']." where EmployeeID=".$res22['EmployeeID']." AND CompanyId=".$CompanyId." AND AssessmentYear=".$YearId, $con); 

} */



$sqlPM=mysql_query("select EmpPmsId, Reviewer_TotalFinalScore, Reviewer_TotalFinalRating, Hod_TotalFinalScore, Hod_TotalFinalRating, HodSubmit_IncStatus from hrm_employee_pms where CompanyId=".$CompanyId." AND AssessmentYear=".$YearId, $con); while($resPM=mysql_fetch_array($sqlPM))

{ if($resPM['HodSubmit_IncStatus']==1 AND ($resPM['Hod_TotalFinalScore']==0 OR $resPM['Hod_TotalFinalScore']==0.00) AND ($resPM['Hod_TotalFinalRating']==0 OR $resPM['Hod_TotalFinalRating']==0.00) AND $resPM['Reviewer_TotalFinalScore']>0 AND $resPM['Reviewer_TotalFinalRating']>0)

 {$sqlUpPM=mysql_query("update hrm_employee_pms set Hod_TotalFinalScore=".$resPM['Reviewer_TotalFinalScore'].", Hod_TotalFinalRating=".$resPM['Reviewer_TotalFinalRating']." where EmpPmsId=".$resPM['EmpPmsId']." AND CompanyId=".$CompanyId." AND AssessmentYear=".$YearId, $con); }

}

?>



<html>



<head>



<title><?php include_once('../Title.php'); ?></title>



<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">



<link type="text/css" href="css/body.css" rel="stylesheet"/>



<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>



<style>.font4 { color:#1FAD34; font-family:Georgia; font-size:15px;} .All{font-size:11px; height:20px;} .All_80{font-size:11px; height:20px; width:80px;}



.All_40{font-size:11px; height:20px; width:40px;} .All_50{font-size:11px; height:20px; width:50px;} .All_70{font-size:11px; height:20px; width:70px;} .All_80{font-size:11px; height:20px; width:80px;}.All_100{font-size:11px; height:20px; width:100px;} .All_120{font-size:11px; height:20px; width:120px;} .All_140{font-size:11px; height:20px; width:140px;} .All_60{font-size:11px; height:20px; width:60px;}



.All_150{font-size:11px; height:20px; width:150px;}.All_170{font-size:11px; height:20px; width:170px;}.All_180{font-size:11px; height:20px; width:180px;}.All_190{font-size:11px; height:20px; width:190px;} .All_200{font-size:11px; height:20px; width:200px;} .All_450{font-size:11px; height:20px; width:450px;}.All_360{font-size:11px; height:20px; width:350px;}.All_540{font-size:11px; height:20px; width:540px;}.All_400{font-size:11px; height:20px; width:400px;} .All_600{font-size:11px; height:20px; width:600px;}



</style>



<script type="text/javascript" src="js/stuHover.js"></script>



<script type="text/javascript" src="js/Prototype.js"></script>



<link rel="stylesheet" type="text/css" href="src/css/jscal2.css"/>



<link rel="stylesheet" type="text/css" href="src/css/border-radius.css"/>



<link rel="stylesheet" type="text/css" href="src/css/steel/steel.css"/>



<script type="text/javascript" src="src/js/jscal2.js"></script>



<script type="text/javascript" src="src/js/lang/en.js"></script>



<style>.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}</style>



<Script type="text/javascript">window.history.forward(1);</script>



<Script type="text/javascript" language="javascript">



function SelectAppRev(v){ window.location='PmsReportDeptWise.php?action=DW&value='+v;}

function SelectAppScore(v){ window.location='PmsReportDeptWise.php?action=APPW&value='+v;}

function SelectRevScore(v){ window.location='PmsReportDeptWise.php?action=REVW&value='+v;}

function SelectHodScore(v){ window.location='PmsReportDeptWise.php?action=HODW&value='+v;}

function SelectAppAllowPMS(v){ window.location='PmsReportDeptWise.php?action=AllowPms&value='+v;}

function SelectIncDept(v){ window.location='PmsReportDeptWise.php?action=IncDept&value='+v;}

function SelectIncHOD(v){ window.location='PmsReportDeptWise.php?action=IncHOD&value='+v;}

function SelectOverAll(v){ window.location='PmsReportDeptWise.php?action=IncOverAll&value='+v;}

function RatingGraph(v){ window.location='PmsReportDeptWise.php?action=RatngGraph&value='+v;}



function Click(I,N){ 

  if(document.getElementById('AllowPMS_'+N).checked==false)

   { var url = 'AllExtraPMSTime.php';	var pars = 'PId='+I+'&No='+N;	var myAjax = new Ajax.Request(

	url, { 	method: 'post', parameters: pars,  onComplete: show_AllowPMSFalse });

   }

  else if(document.getElementById('AllowPMS_'+N).checked==true)

  { var url = 'AllExtraPMSTime.php';	var pars = 'PmsId='+I+'&No='+N;	var myAjax = new Ajax.Request(

	url, { 	method: 'post', parameters: pars,  onComplete: show_AllowPMSTrue });

  }

}

function show_AllowPMSFalse(originalRequest)

{ document.getElementById('ReturnValue').innerHTML = originalRequest.responseText; var No = document.getElementById("Sno").value;

  document.getElementById("TR_"+No).style.backgroundColor='#FFFFFF'; }

function show_AllowPMSTrue(originalRequest)

{ document.getElementById('ReturnValue').innerHTML = originalRequest.responseText; var No = document.getElementById("Sno").value;

  document.getElementById("TR_"+No).style.backgroundColor='#2C9326'; }





function AppRevClick(E,C,Y,N,V)

{  var U = document.getElementById("UserId").value;

   if(document.getElementById('AllowPMS_'+N).checked==true)

   { var url = 'AllAppRevPMSTime.php';	var pars = 'Check=Check&E='+E+'&Y='+Y+'&V='+V+'&U='+U+'&C='+C+'&N='+N;	var myAjax = new Ajax.Request(

	 url, { method: 'post', parameters: pars,  onComplete: show_CheckAppRevAllowPMS});

   }

  else if(document.getElementById('AllowPMS_'+N).checked==false)

  { var url = 'AllAppRevPMSTime.php';	var pars = 'Check=UnCheck&E='+E+'&Y='+Y+'&V='+V+'&U='+U+'&C='+C+'&N='+N;	var myAjax = new Ajax.Request(

	url, { 	method: 'post', parameters: pars,  onComplete: show_UnCheckAppRevAllowPMS});

  }

}

function show_CheckAppRevAllowPMS(originalRequest)

{ document.getElementById('ReturnValue').innerHTML = originalRequest.responseText; var No = document.getElementById("SNo").value;

  document.getElementById("TR_"+No).style.backgroundColor='#2C9326'; document.getElementById("TDALLPMS"+No).style.display='block';

}

function show_UnCheckAppRevAllowPMS(originalRequest)

{ document.getElementById('ReturnValue').innerHTML = originalRequest.responseText; var No = document.getElementById("SNo").value;

  document.getElementById("TR_"+No).style.backgroundColor='#FFFFFF'; document.getElementById("TDALLPMS"+No).style.display='none';

}



function ClickHODClick(E,Y,C)

{window.open("HRAllowEmpINC.php?action=approve&E="+E+"&Y="+Y+"&C="+C,"AppRove","scrollbars=yes,resizable=no,width=1000,height=600"); }

function ExportDW(v)
{ var ComId=document.getElementById("ComId").value; var YId=document.getElementById("YId").value; var DeptValue=document.getElementById("DeptValue").value;  
  window.open("StatusPmsDW.php?action=DW&value="+v+"&C="+ComId+"&Y="+YId+"&value="+DeptValue,"PrintForm","menubar=yes,scrollbars=yes,resizable=no,directories=no,width=20,height=20");}

</Script>



</head>



<body class="body">

<input type="hidden" name="ComId" id="ComId" value="<?php echo $CompanyId; ?>" />
<input type="hidden" name="YId" id="YId" value="<?php echo $YearId; ?>" />
<input type="hidden" name="UserId" id="UserId" value="<?php echo $UserId; ?>" />
<input type="hidden" name="DeptValue" id="DeptValue" value="<?php echo $_REQUEST['value']; ?>" />






<table class="table" border="0">



<tr>



 <td>



  <table class="menutable"><tr><td><?php if($_SESSION['login'] = true){ require_once("AMenu.php"); } ?></td></tr></table>



 </td>



</tr>



<tr>



 <td>



  <table width="100%" style="margin-top:0px;" border="0">



    <tr>



	  <td valign="top"><?php if($_SESSION['login'] = true){ require_once("AWelcome.php"); } ?></td>



	</tr>



	 <tr>



	  <td valign="top" align="center" width="100%" id="MainWindow">



<?php //************************************************************************************************************************************************************?>



<?php //**********************************************START*****START*****START******START******START***************************************************************?>



<?php //************************************************************************************************************************************************************?>



	  



<table border="0" style="margin-top:0px; width:95%; height:400px;">



	<tr>



		<?php if(($_SESSION['UserType']=='M' OR $_SESSION['UserType']=='S' OR $_SESSION['UserType']=='A') AND $_SESSION['login'] = true) { ?>



		



		<td align="" width="100%" valign="top">



		   <table border="0">

       		 <tr><td colspan="2">



			       <table border="0">

                     <tr><td colspan="12" align="left" class="heading">PMS - Status Report &nbsp;<span id="ReturnValue">&nbsp;</span></td></tr>

				     <tr>



					  <td>

				    <table border="0">

					<tr>

<td colspan="4" bgcolor="#7a6189" style="width:600px; height:20px; font-size:12px; font-family:Georgia; color:#FFFFFF; font-weight:bold;" align="center">PMS Progress Status</td>

                    </tr>							



                    <tr bgcolor="#DDFFBB">

					 <td class="td1" style="font-size:11px; width:150px;" align="center">

                       <select style="font-size:11px; width:148px; height:18px; background-color:#DDFFBB;" name="DeptAppRev" id="DeptAppRev" onChange="SelectAppRev(this.value)">                       <option value="" style="margin-left:0px;" selected>Select Department</option>

<?php $SqlDept=mysql_query("select * from hrm_department where CompanyId=".$CompanyId." order by DepartmentName ASC", $con); while($ResDept=mysql_fetch_array($SqlDept)) { ?>

                       <option value="<?php echo $ResDept['DepartmentId']; ?>"><?php echo '&nbsp;'.$ResDept['DepartmentCode'];?></option><?php } ?>

					   <option value="All">&nbsp;All</option>

					   </select></td>

					   <td class="td1" style="font-size:11px; width:150px;" align="center">

                     <select style="font-size:11px; width:148px; height:18px; background-color:#DDFFBB;" name="AppScore" id="AppScore" onChange="SelectAppScore(this.value)">

					 <option value="" style="margin-left:0px;" selected>Select Appraiser</option>

<?php $SqlHod=mysql_query("SELECT Appraiser_EmployeeID,Fname,Sname,Lname from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.Appraiser_EmployeeID=hrm_employee.EmployeeID WHERE hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.AssessmentYear=".$YearId." GROUP BY Appraiser_EmployeeID ORDER BY Fname ASC", $con); 

      while($ResHod=mysql_fetch_array($SqlHod)) { $EnameH=$ResHod['Fname'].' '.$ResHod['Sname'].' '.$ResHod['Lname']; ?>

                     <option value="<?php echo $ResHod['Appraiser_EmployeeID']; ?>"><?php echo '&nbsp;'.$EnameH; ?></option><?php } ?></select></td>

					  <td class="td1" style="font-size:11px; width:150px;" align="center">

                     <select style="font-size:11px; width:148px; height:18px; background-color:#DDFFBB;" name="RevScore" id="RevScore" onChange="SelectRevScore(this.value)">

					 <option value="" style="margin-left:0px;" selected>Select Reviewer</option>

<?php $SqlHod=mysql_query("SELECT Reviewer_EmployeeID,Fname,Sname,Lname from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.Reviewer_EmployeeID=hrm_employee.EmployeeID WHERE hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.AssessmentYear=".$YearId." GROUP BY Reviewer_EmployeeID ORDER BY Fname ASC", $con); 

      while($ResHod=mysql_fetch_array($SqlHod)) { $EnameH=$ResHod['Fname'].' '.$ResHod['Sname'].' '.$ResHod['Lname']; ?>

                     <option value="<?php echo $ResHod['Reviewer_EmployeeID']; ?>"><?php echo '&nbsp;'.$EnameH; ?></option><?php } ?></select></td>

					  <td class="td1" style="font-size:11px; width:150px;" align="center">

                     <select style="font-size:11px; width:148px; height:18px; background-color:#DDFFBB;" name="HodScore" id="HodScore" onChange="SelectHodScore(this.value)">

					 <option value="" style="margin-left:0px;" selected>Select HOD</option>

<?php $SqlHod=mysql_query("SELECT HOD_EmployeeID,Fname,Sname,Lname from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.HOD_EmployeeID=hrm_employee.EmployeeID WHERE hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.AssessmentYear=".$YearId." GROUP BY HOD_EmployeeID ORDER BY Fname ASC", $con); 

      while($ResHod=mysql_fetch_array($SqlHod)) { $EnameH=$ResHod['Fname'].' '.$ResHod['Sname'].' '.$ResHod['Lname']; ?>

                     <option value="<?php echo $ResHod['HOD_EmployeeID']; ?>"><?php echo '&nbsp;'.$EnameH; ?></option><?php } ?></select></td>

                     </tr>

				   </table>					

				   </td> 

				   <td>&nbsp;</td>

				   

	 			   <td>

				    <table border="0">

					<tr>

				<td bgcolor="#7a6189" style="width:150px; height:20px; font-size:12px; font-family:Georgia; color:#FFFFFF; font-weight:bold;" align="center">Allow PMS</td>

					</tr>					

                    <tr bgcolor="#DDFFBB"> 

					 <td class="td1" style="font-size:11px; width:150px;" align="center">

                     <select style="font-size:11px; width:148px; height:18px; background-color:#DDFFBB;" name="AppAllowPMS" id="AppAllowPMS" onChange="SelectAppAllowPMS(this.value)">

					 <option value="" style="margin-left:0px;" selected>Select App./ Rev.</option>

					 <option value="App" style="margin-left:0px;">Appraiser</option><option value="Rev" style="margin-left:0px;">Reviewer</option>

					 <option value="Hod" style="margin-left:0px;">HOD</option>

					 </select></td>				 

					</tr>

				   </table>					

				   </td>                    

				    <td>&nbsp;</td>

					<?php if($_SESSION['UserType']=='S' OR $_SESSION['UserType']=='M') { ?>					

					 <td>

				    <table border="0">

					<tr>

	<td colspan="2" bgcolor="#7a6189" style="width:300px; height:20px; font-size:12px; font-family:Georgia; color:#FFFFFF; font-weight:bold;" align="center">HOD Increment Status</td>

					</tr>					

                    <tr bgcolor="#DDFFBB"> 

					 <td class="td1" style="font-size:11px; width:150px;" align="center">

                       <select style="font-size:11px; width:148px; height:18px; background-color:#DDFFBB;" name="IncDept" id="IncDept" onChange="SelectIncDept(this.value)">                       <option value="" style="margin-left:0px;" selected>Select Department</option>

<?php $SqlDept=mysql_query("select * from hrm_department where CompanyId=".$CompanyId." order by DepartmentName ASC", $con); while($ResDept=mysql_fetch_array($SqlDept)) { ?>

                       <option value="<?php echo $ResDept['DepartmentId']; ?>"><?php echo '&nbsp;'.$ResDept['DepartmentCode'];?></option><?php } ?>

					   <option value="All">&nbsp;All</option>

					   </select></td>

					 <td class="td1" style="font-size:11px; width:150px;" align="center">

                     <select style="font-size:11px; width:148px; height:18px; background-color:#DDFFBB;" name="IncHOD" id="IncHOD" onChange="SelectIncHOD(this.value)">

					 <option value="" style="margin-left:0px;" selected>Select HOD</option>

<?php $SqlHod=mysql_query("SELECT HOD_EmployeeID,Fname,Sname,Lname from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.HOD_EmployeeID=hrm_employee.EmployeeID WHERE hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.AssessmentYear=".$YearId." GROUP BY HOD_EmployeeID ORDER BY Fname ASC", $con); 

      while($ResHod=mysql_fetch_array($SqlHod)) { $EnameH=$ResHod['Fname'].' '.$ResHod['Sname'].' '.$ResHod['Lname']; ?>

                     <option value="<?php echo $ResHod['HOD_EmployeeID']; ?>"><?php echo '&nbsp;'.$EnameH; ?></option><?php } ?></select></td>				 

					</tr>



				   </table>					

				   </td>

<?php } ?>					 



		           </tr>

				   <tr>



<?php if($_SESSION['UserType']=='S' OR $_SESSION['UserType']=='M') { ?>					

					 <td>

				    <table border="0">				

                    <tr> 

					 <td>

					   <table>

					   <tr>

	<td colspan="2" bgcolor="#7a6189" style="width:200px; height:20px; font-size:12px; font-family:Georgia; color:#FFFFFF; font-weight:bold;" align="center">HOD (Overall Increment)</td>

					  </tr>	

					   <tr bgcolor="#DDFFBB">

					   <td class="td1" style="font-size:11px; width:150px;" align="center">

                       <select style="font-size:11px; width:198px; height:18px; background-color:#DDFFBB;" name="IncDept" id="IncDept" onChange="SelectOverAll(this.value)">                       <option value="" style="margin-left:0px;" selected>Select Dept/HOD</option>

                       <option value="Department">Department Wise</option>

					   <option value="HOD">HOD Wise</option>

					   </select></td>

					   </tr>

					  </table>

					  </td> 

					   <td>&nbsp;</td>

					  <td valign="top">

					   <table>

					   <tr>

<td colspan="2" bgcolor="#7a6189" style="width:150px; height:20px; font-size:12px; font-family:Georgia; color:#FFFFFF; font-weight:bold;" align="center">Rating Graph</td>

					  </tr>	

					   <tr bgcolor="#DDFFBB">

					   <td class="td1" style="font-size:11px; width:150px;" align="center">

                       <select style="font-size:11px; width:150px; height:18px; background-color:#DDFFBB;" name="IncDept" id="IncDept" onChange="RatingGraph(this.value)">                       <option value="" style="margin-left:0px;" selected>Select</option>

                       <option value="AllGraph">All</option>

					   <option value="HODGraph">HOD</option>

					   </select></td>

					   </tr>

					  </table>

					  </td> 						 

					</tr>

				   </table>					

				   </td>      

<?php } ?>					 



		           </tr>

                  </table>

				</td>



			 </tr>



       



<?php //---------------------------------------Display Record----------------------------------------------------------------- ?>



<?php if($_REQUEST['action']=='DW') { ?>



<tr>



 <td>



   <table border="1" width="1400">



     <tr>



<?php if($_REQUEST['value']!='All') {$sqlA=mysql_query("select DepartmentName from hrm_department where DepartmentId=".$_REQUEST['value'], $con);  $resA=mysql_fetch_assoc($sqlA); } ?>	 



	  <td colspan="13" valign="top" style=" background-color:#0069D2; font-size:14px; color:#FFFFFF; font-family:Georgia; font-weight:bold;">&nbsp;PMS Status Department Wise :



	  &nbsp;&nbsp;(&nbsp;Department - <?php if($_REQUEST['value']!='All') { echo $resA['DepartmentName'];  } else echo 'All';?>&nbsp;)&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;<a href="#" onClick="ExportDW('<?php echo $_REQUEST['value']; ?>')" style="color:#F9F900; font-size:12px;">Export Excel</a>


	 <?php  /* <a href="#" onClick="PrintAppRev(<?php if($_REQUEST['value']!='All') { echo $resA['DepartmentName'];  } else echo 'All';?>)" style="color:#F9F900; font-size:12px;">Print</a> */ ?>



	  </td>



	 </tr>



	  <tr bgcolor="#7a6189">

    <td align="center" style="color:#FFFFFF;" class="All_40"></td><td align="center" style="color:#FFFFFF;" class="All_60"></td><td align="center" style="color:#FFFFFF;" class="All_100"></td><td colspan="4" align="center" style="color:#FFFFFF;" class="All_400"><b>Name</b></td><td colspan="5" align="center" style="color:#FFFFFF;" class="All_400"><b>Status</b></td><td align="center" style="color:#FFFFFF;" class="All_80">&nbsp;</td>

 </tr>

<tr bgcolor="#7a6189">

    <td align="center" style="color:#FFFFFF;" class="All_40"><b>SNo.</b></td>

    <td align="center" style="color:#FFFFFF;" class="All_60"><b>EmpCode</b></td>

	<td align="center" style="color:#FFFFFF;" class="All_100"><b>Department</b></td>

    <td align="center" style="color:#FFFFFF;" class="All_180"><b>Emp</b></td>

    <td align="center" style="color:#FFFFFF;" class="All_180"><b>Appraiser</b></td>

    <td align="center" style="color:#FFFFFF;" class="All_180"><b>Reviewer</b></td>

	<td align="center" style="color:#FFFFFF;" class="All_180"><b>HOD</b></td>

    <td align="center" style="color:#FFFFFF;" class="All_100"><b>Emp</b></td>

    <td align="center" style="color:#FFFFFF;" class="All_100"><b>Appraiser</b></td>

    <td align="center" style="color:#FFFFFF;" class="All_100"><b>Reviewer</b></td>

    <td align="center" style="color:#FFFFFF;" class="All_100"><b>HOD</b></td>

    <td align="center" style="color:#FFFFFF;" class="All_100"><b>HR</b></td>

	<td align="center" style="color:#FFFFFF;" class="All_80"><b>Extra Time</b></td>

 </tr>

<?php if($_REQUEST['value']=='All') { $sql = mysql_query("SELECT hrm_employee.*, hrm_employee_general.*, hrm_employee_personal.*, hrm_employee_pms.* FROM hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_pms ON hrm_employee.EmployeeID=hrm_employee_pms.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID WHERE EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$YearId." AND (hrm_employee_pms.Appraiser_EmployeeID!='' OR hrm_employee_pms.Appraiser_EmployeeID!=0) AND hrm_employee.CompanyId=".$CompanyId, $con); }

      else { $sql = mysql_query("SELECT hrm_employee.*, hrm_employee_general.*, hrm_employee_personal.*, hrm_employee_pms.* FROM hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_pms ON hrm_employee.EmployeeID=hrm_employee_pms.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID WHERE EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$YearId." AND (hrm_employee_pms.Appraiser_EmployeeID!='' OR hrm_employee_pms.Appraiser_EmployeeID!=0) AND hrm_employee.CompanyId=".$CompanyId." AND hrm_employee_general.DepartmentId=".$_REQUEST['value'], $con); }

$no=1; while($res = mysql_fetch_array($sql)) { ?>



<tr id="TR_<?php echo $no; ?>" <?php if($res['ExtraAllowPMS']==1) { ?> bgcolor="#2C9326" <?php } else { ?> bgcolor="#FFFFFF" <?php } ?> >

    <td align="center" style="" class="All_40"><?php echo $no; ?></td>

    <td align="center" style="" class="All_60"><?php echo $res['EmpCode']; ?></td>

<?php $sqlDept=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$res['DepartmentId'], $con);  $resDept=mysql_fetch_assoc($sqlDept); ?> 

	<td align="" style="" class="All_100">&nbsp;<?php echo $resDept['DepartmentCode']; ?></td>

    <td align="" style="" class="All_180">&nbsp;<?php echo $res['Fname'].' '.$res['Sname'].' '.$res['Lname']; ?></td>

<?php $sqlA = mysql_query("SELECT * from hrm_employee where EmployeeID=".$res['Appraiser_EmployeeID'], $con); $resA=mysql_fetch_assoc($sqlA);?>    

    <td align="" style="" class="All_180">&nbsp;<?php echo $resA['Fname'].' '.$resA['Sname'].' '.$resA['Lname']; ?></td>

<?php $sqlR = mysql_query("SELECT * from hrm_employee where EmployeeID=".$res['Reviewer_EmployeeID'], $con); $resR=mysql_fetch_assoc($sqlR);?>  

    <td align="" style="" class="All_180">&nbsp;<?php echo $resR['Fname'].' '.$resR['Sname'].' '.$resR['Lname']; ?></td>

	<?php $sqlH = mysql_query("SELECT * from hrm_employee where EmployeeID=".$res['HOD_EmployeeID'], $con); $resH=mysql_fetch_assoc($sqlH);?>  

    <td align="" style="" class="All_180">&nbsp;<?php echo $resH['Fname'].' '.$resH['Sname'].' '.$resH['Lname']; ?></td>

    <td align="center" style="color:<?php if($res['Emp_PmsStatus']==0){echo '#A40000';}if($res['Emp_PmsStatus']==1){echo '#36006C';} if($res['Emp_PmsStatus']==2){echo '#005300';} ?>;" class="All_100"><?php if($res['Emp_PmsStatus']==0){echo 'Draft';}if($res['Emp_PmsStatus']==1){echo 'Pending';} if($res['Emp_PmsStatus']==2){echo 'Submited';}?></td>

    <td align="center" style="color:<?php if($res['Appraiser_PmsStatus']==0){echo '#A40000';}if($res['Appraiser_PmsStatus']==1){echo '#36006C';} if($res['Appraiser_PmsStatus']==2){echo '#005300';}if($res['Appraiser_PmsStatus']==3){echo '#006AD5';} ?>;" class="All_100"><?php if($res['Appraiser_PmsStatus']==0){echo 'Draft';}if($res['Appraiser_PmsStatus']==1){echo 'Pending';} if($res['Appraiser_PmsStatus']==2){echo 'Approved';}if($res['Appraiser_PmsStatus']==3){echo 'Resend Employee';}?></td>

       <td align="center" style="color:<?php if($res['Reviewer_PmsStatus']==0){echo '#A40000';}if($res['Reviewer_PmsStatus']==1){echo '#36006C';}if($res['Reviewer_PmsStatus']==2){echo '#005300';}if($res['Reviewer_PmsStatus']==3){echo '#006AD5';} ?>;" class="All_100"><?php if($res['Reviewer_PmsStatus']==0){echo 'Draft';}if($res['Reviewer_PmsStatus']==1){echo 'Pending';} if($res['Reviewer_PmsStatus']==2){echo 'Approved';}if($res['Reviewer_PmsStatus']==3){echo 'Resend Appraiser';}?></td>       

        <td align="center" style="color:<?php if($res['HodSubmit_IncStatus']==0){echo '#A40000';}if($res['HodSubmit_IncStatus']==1){echo '#36006C';}if($res['HodSubmit_IncStatus']==2){echo '#005300';}?>;" class="All_100"><?php if($res['HodSubmit_IncStatus']==0){echo 'Draft';}if($res['HodSubmit_IncStatus']==1){echo 'Pending';}if($res['HodSubmit_IncStatus']==2){echo 'Approved';}?></td>

    

     <td align="center" style="color:<?php if($res['HR_PmsStatus']==0){echo '#A40000';}if($res['HR_PmsStatus']==1){echo '#36006C';} if($res['HR_PmsStatus']==2){echo '#005300';} ?>;" class="All_100"><?php if($res['HR_PmsStatus']==0){echo 'Draft';}if($res['HR_PmsStatus']==1){echo 'Pending';} if($res['HR_PmsStatus']==2){echo 'Approved';}?></td>

	 <td style="width:80px; background-color:#9FCFFF;" align="center"><input type="checkbox" style="height:10px;" name="AllowPMS_<?php echo $no; ?>" id="AllowPMS_<?php echo $no; ?>" <?php if($res['ExtraAllowPMS']==1){echo 'checked';}?> onClick="Click(<?php echo $res['EmpPmsId'].','.$no; ?>)" />

	 </td>

 </tr>

<?php $no++;} ?> 



   </table>



 </td>



</tr> 

<?php } if($_REQUEST['action']=='APPW') { ?>



<tr>



 <td>



   <table border="1" width="1400">



    <tr>



<?php $sqlA=mysql_query("select Fname, Sname, Lname from hrm_employee where EmployeeId=".$_REQUEST['value'], $con); $resA=mysql_fetch_assoc($sqlA); ?>	



	  <td colspan="13" valign="top" style=" background-color:#0069D2; font-size:14px; color:#FFFFFF; font-family:Georgia; font-weight:bold;">&nbsp;PMS Status Appraiser Wise :



	  &nbsp;&nbsp;(&nbsp;Appraiser - <?php echo $resA['Fname'].' '.$resA['Sname'].' '.$resA['Lname']; ?>&nbsp;)&nbsp;&nbsp;&nbsp;



	<?php  /*   <a href="#" onClick="PrintHodScore(<?php echo $_REQUEST['value']; ?>)" style="color:#F9F900; font-size:12px;">Print</a> */ ?>



	  </td>



	 </tr>

     	  <tr bgcolor="#7a6189">

    <td align="center" style="color:#FFFFFF;" class="All_40"></td><td align="center" style="color:#FFFFFF;" class="All_60"><td align="center" style="color:#FFFFFF;" class="All_100"></td></td><td colspan="4" align="center" style="color:#FFFFFF;" class="All_400"><b>Name</b></td><td colspan="5" align="center" style="color:#FFFFFF;" class="All_400"><b>Status</b></td>

 </tr>

<tr bgcolor="#7a6189">

    <td align="center" style="color:#FFFFFF;" class="All_40"><b>SNo.</b></td>

    <td align="center" style="color:#FFFFFF;" class="All_60"><b>EmpCode</b></td>

	<td align="center" style="color:#FFFFFF;" class="All_100"><b>Department</b></td>

    <td align="center" style="color:#FFFFFF;" class="All_180"><b>Emp</b></td>

    <td align="center" style="color:#FFFFFF;" class="All_180"><b>Appraiser</b></td>

    <td align="center" style="color:#FFFFFF;" class="All_180"><b>Reviewer</b></td>

	<td align="center" style="color:#FFFFFF;" class="All_180"><b>HOD</b></td>

    <td align="center" style="color:#FFFFFF;" class="All_100"><b>Emp</b></td>

    <td align="center" style="color:#FFFFFF;" class="All_100"><b>Appraiser</b></td>

    <td align="center" style="color:#FFFFFF;" class="All_100"><b>Reviewer</b></td>

    <td align="center" style="color:#FFFFFF;" class="All_100"><b>HOD</b></td>

    <td align="center" style="color:#FFFFFF;" class="All_100"><b>HR</b></td>

 </tr>

<?php $sql = mysql_query("SELECT hrm_employee.*, hrm_employee_general.*, hrm_employee_personal.*, hrm_employee_pms.* FROM hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_pms ON hrm_employee.EmployeeID=hrm_employee_pms.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID WHERE hrm_employee.CompanyId=".$CompanyId." AND hrm_employee.EmpStatus='A' AND hrm_employee_pms.Appraiser_EmployeeID=".$_REQUEST['value']." AND hrm_employee_pms.AssessmentYear=".$YearId, $con);  $no=1; while($res = mysql_fetch_array($sql)) { ?>



<tr bgcolor="#FFFFFF">

    <td align="center" style="" class="All_40"><?php echo $no; ?></td>

    <td align="center" style="" class="All_60"><?php echo $res['EmpCode']; ?></a></td>

	<?php $sqlDept=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$res['DepartmentId'], $con);  $resDept=mysql_fetch_assoc($sqlDept); ?> 

	<td align="" style="" class="All_100">&nbsp;<?php echo $resDept['DepartmentCode']; ?></td>

    <td align="" style="" class="All_180">&nbsp;<?php echo $res['Fname'].' '.$res['Sname'].' '.$res['Lname']; ?></td>

<?php $sqlA = mysql_query("SELECT * from hrm_employee where EmployeeID=".$res['Appraiser_EmployeeID'], $con); $resA=mysql_fetch_assoc($sqlA);?>    

    <td align="" style="" class="All_180">&nbsp;<?php echo $resA['Fname'].' '.$resA['Sname'].' '.$resA['Lname']; ?></td>

<?php $sqlR = mysql_query("SELECT * from hrm_employee where EmployeeID=".$res['Reviewer_EmployeeID'], $con); $resR=mysql_fetch_assoc($sqlR);?>  

    <td align="" style="" class="All_180">&nbsp;<?php echo $resR['Fname'].' '.$resR['Sname'].' '.$resR['Lname']; ?></td>

	<?php $sqlH = mysql_query("SELECT * from hrm_employee where EmployeeID=".$res['HOD_EmployeeID'], $con); $resH=mysql_fetch_assoc($sqlH);?>  

    <td align="" style="" class="All_180">&nbsp;<?php echo $resH['Fname'].' '.$resH['Sname'].' '.$resH['Lname']; ?></td>

    <td align="center" style="color:<?php if($res['Emp_PmsStatus']==0){echo '#A40000';}if($res['Emp_PmsStatus']==1){echo '#36006C';} if($res['Emp_PmsStatus']==2){echo '#005300';} ?>;" class="All_100"><?php if($res['Emp_PmsStatus']==0){echo 'Draft';}if($res['Emp_PmsStatus']==1){echo 'Pending';} if($res['Emp_PmsStatus']==2){echo 'Submited';}?></td>

    <td align="center" style="color:<?php if($res['Appraiser_PmsStatus']==0){echo '#A40000';}if($res['Appraiser_PmsStatus']==1){echo '#36006C';} if($res['Appraiser_PmsStatus']==2){echo '#005300';}if($res['Appraiser_PmsStatus']==3){echo '#006AD5';} ?>;" class="All_100"><?php if($res['Appraiser_PmsStatus']==0){echo 'Draft';}if($res['Appraiser_PmsStatus']==1){echo 'Pending';} if($res['Appraiser_PmsStatus']==2){echo 'Approved';}if($res['Appraiser_PmsStatus']==3){echo 'Resend Employee';}?></td>

       <td align="center" style="color:<?php if($res['Reviewer_PmsStatus']==0){echo '#A40000';}if($res['Reviewer_PmsStatus']==1){echo '#36006C';}if($res['Reviewer_PmsStatus']==2){echo '#005300';}if($res['Reviewer_PmsStatus']==3){echo '#006AD5';} ?>;" class="All_100"><?php if($res['Reviewer_PmsStatus']==0){echo 'Draft';}if($res['Reviewer_PmsStatus']==1){echo 'Pending';} if($res['Reviewer_PmsStatus']==2){echo 'Approved';}if($res['Reviewer_PmsStatus']==3){echo 'Resend Appraiser';}?></td>       

        <td align="center" style="color:<?php if($res['HodSubmit_IncStatus']==0){echo '#A40000';}if($res['HodSubmit_IncStatus']==1){echo '#36006C';}if($res['HodSubmit_IncStatus']==2){echo '#005300';}?>;" class="All_100"><?php if($res['HodSubmit_IncStatus']==0){echo 'Draft';}if($res['HodSubmit_IncStatus']==1){echo 'Pending';}if($res['HodSubmit_IncStatus']==2){echo 'Approved';}?></td>

    

     <td align="center" style="color:<?php if($res['HR_PmsStatus']==0){echo '#A40000';}if($res['HR_PmsStatus']==1){echo '#36006C';} if($res['HR_PmsStatus']==2){echo '#005300';} ?>;" class="All_100"><?php if($res['HR_PmsStatus']==0){echo 'Draft';}if($res['HR_PmsStatus']==1){echo 'Pending';} if($res['HR_PmsStatus']==2){echo 'Approved';}?></td>

 </tr>

<?php $no++;} ?> 

	



   </table>



 </td>



</tr> 



<?php } if($_REQUEST['action']=='REVW') { ?>

<tr>



 <td>



   <table border="1" width="1400">



    <tr>



<?php $sqlA=mysql_query("select Fname, Sname, Lname from hrm_employee where EmployeeId=".$_REQUEST['value'], $con); $resA=mysql_fetch_assoc($sqlA); ?>	



	  <td colspan="13" valign="top" style=" background-color:#0069D2; font-size:14px; color:#FFFFFF; font-family:Georgia; font-weight:bold;">&nbsp;PMS Status Reviewer Wise :



	  &nbsp;&nbsp;(&nbsp;Reviewer - <?php echo $resA['Fname'].' '.$resA['Sname'].' '.$resA['Lname']; ?>&nbsp;)&nbsp;&nbsp;&nbsp;



	<?php  /*   <a href="#" onClick="PrintHodScore(<?php echo $_REQUEST['value']; ?>)" style="color:#F9F900; font-size:12px;">Print</a> */ ?>



	  </td>



	 </tr>

     	  <tr bgcolor="#7a6189">

    <td align="center" style="color:#FFFFFF;" class="All_40"></td><td align="center" style="color:#FFFFFF;" class="All_60"></td><td align="center" style="color:#FFFFFF;" class="All_100"></td><td colspan="4" align="center" style="color:#FFFFFF;" class="All_400"><b>Name</b></td><td colspan="5" align="center" style="color:#FFFFFF;" class="All_400"><b>Status</b></td>

 </tr>

<tr bgcolor="#7a6189">

    <td align="center" style="color:#FFFFFF;" class="All_40"><b>SNo.</b></td>

    <td align="center" style="color:#FFFFFF;" class="All_60"><b>EmpCode</b></td>

	<td align="center" style="color:#FFFFFF;" class="All_100"><b>Department</b></td>

    <td align="center" style="color:#FFFFFF;" class="All_180"><b>Emp</b></td>

    <td align="center" style="color:#FFFFFF;" class="All_180"><b>Appraiser</b></td>

    <td align="center" style="color:#FFFFFF;" class="All_180"><b>Reviewer</b></td>

	<td align="center" style="color:#FFFFFF;" class="All_180"><b>HOD</b></td>

    <td align="center" style="color:#FFFFFF;" class="All_100"><b>Emp</b></td>

    <td align="center" style="color:#FFFFFF;" class="All_100"><b>Appraiser</b></td>

    <td align="center" style="color:#FFFFFF;" class="All_100"><b>Reviewer</b></td>

    <td align="center" style="color:#FFFFFF;" class="All_100"><b>HOD</b></td>

    <td align="center" style="color:#FFFFFF;" class="All_100"><b>HR</b></td>

 </tr>

<?php $sql = mysql_query("SELECT hrm_employee.*, hrm_employee_general.*, hrm_employee_personal.*, hrm_employee_pms.* FROM hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_pms ON hrm_employee.EmployeeID=hrm_employee_pms.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID WHERE hrm_employee.CompanyId=".$CompanyId." AND hrm_employee.EmpStatus='A' AND hrm_employee_pms.Reviewer_EmployeeID=".$_REQUEST['value']." AND hrm_employee_pms.AssessmentYear=".$YearId, $con);  $no=1; while($res = mysql_fetch_array($sql)) { ?>



<tr bgcolor="#FFFFFF">

    <td align="center" style="" class="All_40"><?php echo $no; ?></td>

    <td align="center" style="" class="All_60"><?php echo $res['EmpCode']; ?></a></td>

	<?php $sqlDept=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$res['DepartmentId'], $con);  $resDept=mysql_fetch_assoc($sqlDept); ?> 

	<td align="" style="" class="All_100">&nbsp;<?php echo $resDept['DepartmentCode']; ?></td>

    <td align="" style="" class="All_180">&nbsp;<?php echo $res['Fname'].' '.$res['Sname'].' '.$res['Lname']; ?></td>

<?php $sqlA = mysql_query("SELECT * from hrm_employee where EmployeeID=".$res['Appraiser_EmployeeID'], $con); $resA=mysql_fetch_assoc($sqlA);?>    

    <td align="" style="" class="All_180">&nbsp;<?php echo $resA['Fname'].' '.$resA['Sname'].' '.$resA['Lname']; ?></td>

<?php $sqlR = mysql_query("SELECT * from hrm_employee where EmployeeID=".$res['Reviewer_EmployeeID'], $con); $resR=mysql_fetch_assoc($sqlR);?>  

    <td align="" style="" class="All_180">&nbsp;<?php echo $resR['Fname'].' '.$resR['Sname'].' '.$resR['Lname']; ?></td>

	<?php $sqlH = mysql_query("SELECT * from hrm_employee where EmployeeID=".$res['HOD_EmployeeID'], $con); $resH=mysql_fetch_assoc($sqlH);?>  

    <td align="" style="" class="All_180">&nbsp;<?php echo $resH['Fname'].' '.$resH['Sname'].' '.$resH['Lname']; ?></td>

    <td align="center" style="color:<?php if($res['Emp_PmsStatus']==0){echo '#A40000';}if($res['Emp_PmsStatus']==1){echo '#36006C';} if($res['Emp_PmsStatus']==2){echo '#005300';} ?>;" class="All_100"><?php if($res['Emp_PmsStatus']==0){echo 'Draft';}if($res['Emp_PmsStatus']==1){echo 'Pending';} if($res['Emp_PmsStatus']==2){echo 'Submited';}?></td>

    <td align="center" style="color:<?php if($res['Appraiser_PmsStatus']==0){echo '#A40000';}if($res['Appraiser_PmsStatus']==1){echo '#36006C';} if($res['Appraiser_PmsStatus']==2){echo '#005300';}if($res['Appraiser_PmsStatus']==3){echo '#006AD5';} ?>;" class="All_100"><?php if($res['Appraiser_PmsStatus']==0){echo 'Draft';}if($res['Appraiser_PmsStatus']==1){echo 'Pending';} if($res['Appraiser_PmsStatus']==2){echo 'Approved';}if($res['Appraiser_PmsStatus']==3){echo 'Resend Employee';}?></td>

       <td align="center" style="color:<?php if($res['Reviewer_PmsStatus']==0){echo '#A40000';}if($res['Reviewer_PmsStatus']==1){echo '#36006C';}if($res['Reviewer_PmsStatus']==2){echo '#005300';}if($res['Reviewer_PmsStatus']==3){echo '#006AD5';} ?>;" class="All_100"><?php if($res['Reviewer_PmsStatus']==0){echo 'Draft';}if($res['Reviewer_PmsStatus']==1){echo 'Pending';} if($res['Reviewer_PmsStatus']==2){echo 'Approved';}if($res['Reviewer_PmsStatus']==3){echo 'Resend Appraiser';}?></td>       

        <td align="center" style="color:<?php if($res['HodSubmit_IncStatus']==0){echo '#A40000';}if($res['HodSubmit_IncStatus']==1){echo '#36006C';}if($res['HodSubmit_IncStatus']==2){echo '#005300';}?>;" class="All_100"><?php if($res['HodSubmit_IncStatus']==0){echo 'Draft';}if($res['HodSubmit_IncStatus']==1){echo 'Pending';}if($res['HodSubmit_IncStatus']==2){echo 'Approved';}?></td>

    

     <td align="center" style="color:<?php if($res['HR_PmsStatus']==0){echo '#A40000';}if($res['HR_PmsStatus']==1){echo '#36006C';} if($res['HR_PmsStatus']==2){echo '#005300';} ?>;" class="All_100"><?php if($res['HR_PmsStatus']==0){echo 'Draft';}if($res['HR_PmsStatus']==1){echo 'Pending';} if($res['HR_PmsStatus']==2){echo 'Approved';}?></td>

 </tr>

<?php $no++;} ?> 

	



   </table>



 </td>



</tr> 

<?php } if($_REQUEST['action']=='HODW') { ?>



<tr>



 <td>



   <table border="1" width="1400">



    <tr>



<?php $sqlA=mysql_query("select Fname, Sname, Lname from hrm_employee where EmployeeId=".$_REQUEST['value'], $con); $resA=mysql_fetch_assoc($sqlA); ?>	



	  <td colspan="13" valign="top" style=" background-color:#0069D2; font-size:14px; color:#FFFFFF; font-family:Georgia; font-weight:bold;">&nbsp;PMS Status HOD Wise :



	  &nbsp;&nbsp;(&nbsp;HOD - <?php echo $resA['Fname'].' '.$resA['Sname'].' '.$resA['Lname']; ?>&nbsp;)&nbsp;&nbsp;&nbsp;



	<?php  /*   <a href="#" onClick="PrintHodScore(<?php echo $_REQUEST['value']; ?>)" style="color:#F9F900; font-size:12px;">Print</a> */?>



	  </td>



	 </tr>

     	  <tr bgcolor="#7a6189">

    <td align="center" style="color:#FFFFFF;" class="All_40"></td><td align="center" style="color:#FFFFFF;" class="All_60"></td><td align="center" style="color:#FFFFFF;" class="All_100"></td><td colspan="4" align="center" style="color:#FFFFFF;" class="All_400"><b>Name</b></td><td colspan="5" align="center" style="color:#FFFFFF;" class="All_400"><b>Status</b></td>

 </tr>

<tr bgcolor="#7a6189">

    <td align="center" style="color:#FFFFFF;" class="All_40"><b>SNo.</b></td>

    <td align="center" style="color:#FFFFFF;" class="All_60"><b>EmpCode</b></td>

	<td align="center" style="color:#FFFFFF;" class="All_100"><b>Department</b></td>

    <td align="center" style="color:#FFFFFF;" class="All_180"><b>Emp</b></td>

    <td align="center" style="color:#FFFFFF;" class="All_180"><b>Appraiser</b></td>

    <td align="center" style="color:#FFFFFF;" class="All_180"><b>Reviewer</b></td>

	<td align="center" style="color:#FFFFFF;" class="All_180"><b>HOD</b></td>

    <td align="center" style="color:#FFFFFF;" class="All_100"><b>Emp</b></td>

    <td align="center" style="color:#FFFFFF;" class="All_100"><b>Appraiser</b></td>

    <td align="center" style="color:#FFFFFF;" class="All_100"><b>Reviewer</b></td>

    <td align="center" style="color:#FFFFFF;" class="All_100"><b>HOD</b></td>

    <td align="center" style="color:#FFFFFF;" class="All_100"><b>HR</b></td>

 </tr>

<?php $sql = mysql_query("SELECT hrm_employee.*, hrm_employee_general.*, hrm_employee_personal.*, hrm_employee_pms.* FROM hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_pms ON hrm_employee.EmployeeID=hrm_employee_pms.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID WHERE hrm_employee.CompanyId=".$CompanyId." AND hrm_employee.EmpStatus='A' AND hrm_employee_pms.HOD_EmployeeID=".$_REQUEST['value']." AND hrm_employee_pms.AssessmentYear=".$YearId, $con);  $no=1; while($res = mysql_fetch_array($sql)) { ?>



<tr bgcolor="#FFFFFF">

    <td align="center" style="" class="All_40"><?php echo $no; ?></td>

    <td align="center" style="" class="All_60"><?php echo $res['EmpCode']; ?></a></td>

	<?php $sqlDept=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$res['DepartmentId'], $con);  $resDept=mysql_fetch_assoc($sqlDept); ?> 

	<td align="" style="" class="All_100">&nbsp;<?php echo $resDept['DepartmentCode']; ?></td>

    <td align="" style="" class="All_180">&nbsp;<?php echo $res['Fname'].' '.$res['Sname'].' '.$res['Lname']; ?></td>

<?php $sqlA = mysql_query("SELECT * from hrm_employee where EmployeeID=".$res['Appraiser_EmployeeID'], $con); $resA=mysql_fetch_assoc($sqlA);?>    

    <td align="" style="" class="All_180">&nbsp;<?php echo $resA['Fname'].' '.$resA['Sname'].' '.$resA['Lname']; ?></td>

<?php $sqlR = mysql_query("SELECT * from hrm_employee where EmployeeID=".$res['Reviewer_EmployeeID'], $con); $resR=mysql_fetch_assoc($sqlR);?>  

    <td align="" style="" class="All_180">&nbsp;<?php echo $resR['Fname'].' '.$resR['Sname'].' '.$resR['Lname']; ?></td>

	<?php $sqlH = mysql_query("SELECT * from hrm_employee where EmployeeID=".$res['HOD_EmployeeID'], $con); $resH=mysql_fetch_assoc($sqlH);?>  

    <td align="" style="" class="All_180">&nbsp;<?php echo $resH['Fname'].' '.$resH['Sname'].' '.$resH['Lname']; ?></td>

    <td align="center" style="color:<?php if($res['Emp_PmsStatus']==0){echo '#A40000';}if($res['Emp_PmsStatus']==1){echo '#36006C';} if($res['Emp_PmsStatus']==2){echo '#005300';} ?>;" class="All_100"><?php if($res['Emp_PmsStatus']==0){echo 'Draft';}if($res['Emp_PmsStatus']==1){echo 'Pending';} if($res['Emp_PmsStatus']==2){echo 'Submited';}?></td>

    <td align="center" style="color:<?php if($res['Appraiser_PmsStatus']==0){echo '#A40000';}if($res['Appraiser_PmsStatus']==1){echo '#36006C';} if($res['Appraiser_PmsStatus']==2){echo '#005300';}if($res['Appraiser_PmsStatus']==3){echo '#006AD5';} ?>;" class="All_100"><?php if($res['Appraiser_PmsStatus']==0){echo 'Draft';}if($res['Appraiser_PmsStatus']==1){echo 'Pending';} if($res['Appraiser_PmsStatus']==2){echo 'Approved';}if($res['Appraiser_PmsStatus']==3){echo 'Resend Employee';}?></td>

       <td align="center" style="color:<?php if($res['Reviewer_PmsStatus']==0){echo '#A40000';}if($res['Reviewer_PmsStatus']==1){echo '#36006C';}if($res['Reviewer_PmsStatus']==2){echo '#005300';}if($res['Reviewer_PmsStatus']==3){echo '#006AD5';} ?>;" class="All_100"><?php if($res['Reviewer_PmsStatus']==0){echo 'Draft';}if($res['Reviewer_PmsStatus']==1){echo 'Pending';} if($res['Reviewer_PmsStatus']==2){echo 'Approved';}if($res['Reviewer_PmsStatus']==3){echo 'Resend Appraiser';}?></td>       

        <td align="center" style="color:<?php if($res['HodSubmit_IncStatus']==0){echo '#A40000';}if($res['HodSubmit_IncStatus']==1){echo '#36006C';}if($res['HodSubmit_IncStatus']==2){echo '#005300';}?>;" class="All_100"><?php if($res['HodSubmit_IncStatus']==0){echo 'Draft';}if($res['HodSubmit_IncStatus']==1){echo 'Pending';}if($res['HodSubmit_IncStatus']==2){echo 'Approved';}?></td>

    

     <td align="center" style="color:<?php if($res['HR_PmsStatus']==0){echo '#A40000';}if($res['HR_PmsStatus']==1){echo '#36006C';} if($res['HR_PmsStatus']==2){echo '#005300';} ?>;" class="All_100"><?php if($res['HR_PmsStatus']==0){echo 'Draft';}if($res['HR_PmsStatus']==1){echo 'Pending';} if($res['HR_PmsStatus']==2){echo 'Approved';}?></td>

 </tr>

<?php $no++;} ?> 

	



   </table>



 </td>



</tr> 

<?php } if($_REQUEST['action']=='AllowPms') {  ?>	

<tr>

 <td>

   <table border="1" width="700">

     <tr>

	  <td colspan="13" valign="top" style=" background-color:#0069D2; font-size:14px; color:#FFFFFF; font-family:Georgia; font-weight:bold;">&nbsp;Allow PMS :

	  &nbsp;&nbsp;(<?php if($_REQUEST['value']=='App') { echo 'Appraiser'; } if($_REQUEST['value']=='Rev') { echo 'Reviewer'; } if($_REQUEST['value']=='Hod') { echo 'HOD'; }?> &nbsp;&nbsp;)&nbsp;&nbsp;&nbsp;

	  </td>

	 </tr>

<tr bgcolor="#7a6189">

    <td align="center" style="color:#FFFFFF;" class="All_40"><b>SNo.</b></td>

    <td align="center" style="color:#FFFFFF;" class="All_60"><b>EmpCode</b></td>

	<td align="center" style="color:#FFFFFF;" class="All_150"><b>Department</b></td>

    <td align="center" style="color:#FFFFFF;" class="All_250"><b>Name</b></td>

	<td align="center" style="color:#FFFFFF;" class="All_80"><b>Extra Time</b></td>

	<?php if($_REQUEST['value']=='Hod') { ?><td align="center" style="color:#FFFFFF;" class="All_80"><b>Click</b></td><?php } ?>

 </tr>

<?php if($_REQUEST['value']=='App') { $SqlAppRev=mysql_query("SELECT hrm_employee.*, DepartmentId, Appraiser_EmployeeID from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.Appraiser_EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_general ON hrm_employee_pms.Appraiser_EmployeeID=hrm_employee_general.EmployeeID WHERE hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.AssessmentYear=".$YearId." GROUP BY Appraiser_EmployeeID ORDER BY Fname ASC", $con); }

      if($_REQUEST['value']=='Rev') { $SqlAppRev=mysql_query("SELECT hrm_employee.*, DepartmentId, Reviewer_EmployeeID from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.Reviewer_EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_general ON hrm_employee_pms.Reviewer_EmployeeID=hrm_employee_general.EmployeeID WHERE hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.AssessmentYear=".$YearId." GROUP BY Reviewer_EmployeeID ORDER BY Fname ASC", $con); } 

	  if($_REQUEST['value']=='Hod') { $SqlAppRev=mysql_query("SELECT hrm_employee.*, DepartmentId, HOD_EmployeeID from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.HOD_EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_general ON hrm_employee_pms.HOD_EmployeeID=hrm_employee_general.EmployeeID WHERE hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.AssessmentYear=".$YearId." GROUP BY HOD_EmployeeID ORDER BY Fname ASC", $con); }

	  

	  $no=1; while($ResAppRev=mysql_fetch_array($SqlAppRev)) { $EnameAppRev=$ResAppRev['Fname'].' '.$ResAppRev['Sname'].' '.$ResAppRev['Lname'];  

	 if($_REQUEST['value']=='App') { $sqlCh=mysql_query("select * from hrm_pms_allow where Appraiser_EmployeeID=".$ResAppRev['EmployeeID']." AND CompanyId=".$CompanyId." AND AssesmentYear=".$YearId, $con);	 }

	 if($_REQUEST['value']=='Rev') { $sqlCh=mysql_query("select * from hrm_pms_allow where Reviewer_EmployeeID=".$ResAppRev['EmployeeID']." AND CompanyId=".$CompanyId." AND AssesmentYear=".$YearId, $con);	 } 

	 if($_REQUEST['value']=='Hod') { $sqlCh=mysql_query("select * from hrm_pms_allow where HOD_EmployeeID=".$ResAppRev['EmployeeID']." AND CompanyId=".$CompanyId." AND AssesmentYear=".$YearId, $con);	 }$RowCh=mysql_num_rows($sqlCh);

	  ?>

	  

<tr id="TR_<?php echo $no; ?>" <?php if($RowCh>0) { ?> bgcolor="#2C9326" <?php } else { ?> bgcolor="#FFFFFF" <?php } ?> >

    <td align="center" style="" class="All_40"><?php echo $no; ?></td>

    <td align="center" style="" class="All_60"><?php echo $ResAppRev['EmpCode']; ?></td>

<?php $sqlDept=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$ResAppRev['DepartmentId'], $con);  $resDept=mysql_fetch_assoc($sqlDept); ?> 

	<td align="" style="" class="All_150">&nbsp;<?php echo $resDept['DepartmentCode']; ?></td>

    <td align="" style="" class="All_250">&nbsp;<?php echo $EnameAppRev ?></td>

	<td style="width:80px; background-color:#9FCFFF;" align="center"><input type="checkbox" style="height:10px;" name="AllowPMS_<?php echo $no; ?>" id="AllowPMS_<?php echo $no; ?>" <?php if($RowCh>0){echo 'checked';}?> onClick="AppRevClick(<?php echo $ResAppRev['EmployeeID'].','.$CompanyId.','.$YearId.','.$no; ?>,'<?php echo $_REQUEST['value']; ?>')" />

	 </td>

	 <?php if($_REQUEST['value']=='Hod') { ?> <td style="width:80px; background-color:#9FCFFF; font-size:11px; font-weight:bold;" align="center"><span id="TDALLPMS<?php echo $no;?>" <?php if($RowCh>0){echo 'style="display:block;"';} else {echo 'style="display:none;"';}?>><a href="#" onClick="ClickHODClick(<?php echo $ResAppRev['EmployeeID'].','.$YearId.','.$CompanyId; ?>)">Click</a></span>

	 </td><?php } ?>

 </tr>

<?php $no++;} ?> 

   </table>

 </td>

 

</tr> 

<?php } if($_REQUEST['action']=='IncDept') { ?>
<tr>
 <td>
   <table border="1" width="1500">
     <tr>
<?php if($_REQUEST['value']!='All') {$sqlA=mysql_query("select DepartmentName from hrm_department where DepartmentId=".$_REQUEST['value'], $con);  $resA=mysql_fetch_assoc($sqlA); } ?>	
	  <td colspan="18" valign="top" style=" background-color:#0069D2; font-size:14px; color:#FFFFFF; font-family:Georgia; font-weight:bold;">&nbsp;HOD Increment Status Department Wise :	  &nbsp;&nbsp;(&nbsp;Department - <?php if($_REQUEST['value']!='All') { echo $resA['DepartmentName'];  } else echo 'All';?>&nbsp;)&nbsp;&nbsp;&nbsp;
	 <?php  /* <a href="#" onClick="PrintAppRev(<?php if($_REQUEST['value']!='All') { echo $resA['DepartmentName'];  } else echo 'All';?>)" style="color:#F9F900; font-size:12px;">Print</a> */ ?>
	  </td>
	 </tr>
 <tr bgcolor="#7a6189" style="height:20px;" valign="middle">
	        <td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:40px;"><b>SNo.</b></td>
	        <td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:80px;"><b>EmpCode</b></td>
	        <td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:200px;"><b>Name</b></td>
	        <td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:100px;"><b>Department</b></td>
			<td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:200px;"><b>Designation</b></td>
			<td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:50px;"><b>Grade</b></td>
			<td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:50px;"><b>Score</b></td>
			<td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:50px;"><b>Rating</b></td>
			<td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:200px;"><b>Proposed Designation</b></td>
			<td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:50px;"><b>PG</b></td>
			<td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:80px;"><b>Pre. Gross</b></td>
			<td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:80px;"><b>PGSPM</b></td>
			<td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:60px;"><b>% PIS</b></td>
            <td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:80px;"><b>SC</b></td>
			<td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:60px;"><b>% PSC</b></td>
			<td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:80px;"><b>TISPM</b></td>
			<td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:80px;"><b>% TISPM</b></td>
			<td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:80px;"><b>TPGSPM</b></td>
		 </tr>
<?php if($_REQUEST['value']!='All') { $sql=mysql_query("select hrm_employee.*,EmpCurrGrossPM,Reviewer_TotalFinalScore,Reviewer_TotalFinalRating,Hod_TotalFinalScore,Hod_TotalFinalRating,Hod_EmpDesignation,Hod_EmpGrade,Hod_ProIncSalary,Hod_Percent_ProIncSalary,Hod_ProCorrSalary,Hod_Percent_ProCorrSalary,Hod_IncNetMonthalySalary,Hod_Percent_IncNetMonthalySalary,Hod_GrossMonthlySalary,HR_CurrDesigId,HR_CurrGradeId,DepartmentId,DesigId,DesigId2,HqId,GradeId from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_pms ON hrm_employee.EmployeeID=hrm_employee_pms.EmployeeID where hrm_employee.CompanyId=".$CompanyId." AND hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$YearId." AND (hrm_employee_pms.Appraiser_EmployeeID!='' OR hrm_employee_pms.Appraiser_EmployeeID!=0) AND hrm_employee_general.DepartmentId=".$_REQUEST['value'], $con); } 

else { $sql=mysql_query("select hrm_employee.*,EmpCurrGrossPM,Reviewer_TotalFinalScore,Reviewer_TotalFinalRating,Hod_TotalFinalScore,Hod_TotalFinalRating,Hod_EmpDesignation,Hod_EmpGrade,Hod_ProIncSalary,Hod_Percent_ProIncSalary,Hod_ProCorrSalary,Hod_Percent_ProCorrSalary,Hod_IncNetMonthalySalary,Hod_Percent_IncNetMonthalySalary,Hod_GrossMonthlySalary,HR_CurrDesigId,HR_CurrGradeId,DepartmentId,DesigId,DesigId2,HqId,GradeId from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_pms ON hrm_employee.EmployeeID=hrm_employee_pms.EmployeeID where hrm_employee.CompanyId=".$CompanyId." AND hrm_employee.EmpStatus='A' AND (hrm_employee_pms.Appraiser_EmployeeID!='' OR hrm_employee_pms.Appraiser_EmployeeID!=0) AND hrm_employee_pms.AssessmentYear=".$YearId, $con); }
$sno=1; while($res=mysql_fetch_array($sql)){ ?>     				
		<tr style="height:20px; background-color:<?php if($sno%2==0){echo '#ECFFEC';} else {echo '#FFFFFF';} ?>;" valign="middle">
	        <td align="center" style="font:Georgia; font-size:11px; width:50px;"><?php echo $sno; ?></td>
	        <td align="center" style="font:Georgia; font-size:11px; width:80px;"><?php echo $res['EmpCode']; ?></td>
	        <td align="" style="font:Georgia; font-size:11px; width:200px;"><?php echo $res['Fname'].' '.$res['Sname'].' '.$res['Lname']; ?></td>
<?php $sql2=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$res['DepartmentId'], $con); 
      $res2=mysql_fetch_assoc($sql2);?><td align="" style="font:Georgia; font-size:11px; width:100px;">&nbsp;<?php echo $res2['DepartmentCode'];?></td>
<?php $sql3=mysql_query("select DesigName from hrm_designation where DesigId=".$res['HR_CurrDesigId'], $con); $res3=mysql_fetch_assoc($sql3);?>			
			<td align="" style="font:Georgia; font-size:11px; width:200px;">&nbsp;&nbsp;<?php echo $res3['DesigName'];?></td>		
<?php $sql4=mysql_query("select GradeValue from hrm_grade where GradeId=".$res['HR_CurrGradeId'], $con);  $res4=mysql_fetch_assoc($sql4);?>			
			<td align="center" style="font:Georgia; font-size:11px; width:50px;">&nbsp;&nbsp;<?php echo $res4['GradeValue'];?></td>			
			<td align="center" style="font:Georgia; font-size:11px; width:50px; background-color:#FFDDDD;"><?php if($res['Hod_TotalFinalScore']>0) {echo $res['Hod_TotalFinalScore']; } else {echo $res['Reviewer_TotalFinalScore'];} ?></td>	
			<td align="center" style="font:Georgia; font-size:11px; width:50px; background-color:#FFDDDD;"><?php  if($res['Hod_TotalFinalRating']>0){echo $res['Hod_TotalFinalRating']; } else {echo $res['Reviewer_TotalFinalRating'];} ?></td>
<?php if($res['Hod_EmpDesignation']!=0) {$sqlHD=mysql_query("select DesigName from hrm_designation where DesigId=".$res['Hod_EmpDesignation'], $con); $resHD=mysql_fetch_assoc($sqlHD);}
      if($res['Reviewer_EmpDesignation']!=0) {$sqlRD=mysql_query("select DesigName from hrm_designation where DesigId=".$res['Reviewer_EmpDesignation'], $con); $resRD=mysql_fetch_assoc($sqlRD);} 
	  if($res['Hod_EmpGrade']!=0) {$sqlHG=mysql_query("select GradeValue from hrm_grade where GradeId=".$res['Hod_EmpGrade'], $con); $resHG=mysql_fetch_assoc($sqlHG);} 
	  if($res['Reviewer_EmpGrade']!=0) {$sqlRG=mysql_query("select GradeValue from hrm_grade where GradeId=".$res['Reviewer_EmpGrade'], $con); $resRG=mysql_fetch_assoc($sqlRG);}
?>					
			<td align="" style="font:Georgia; font-size:11px; width:200px; background-color:#C4FFC4;">
			<?php if($res['Hod_EmpDesignation']>0 AND $res['HR_CurrDesigId']!=$res['Hod_EmpDesignation']) { echo $resHD['DesigName'];} 
			 elseif($res['Reviewer_EmpDesignation']>0 AND $res['HR_CurrDesigId']!=$res['Reviewer_EmpDesignation']) {echo $resRD['DesigName'];}?></td>	
            <td align="center" style="font:Georgia; font-size:11px; width:50px;background-color:#C4FFC4;">
			<?php if($res['Hod_EmpGrade']>0 AND $res['HR_CurrGradeId']!=$res['Hod_EmpGrade']) { echo $resHG['GradeValue'];} 
			elseif($res['Reviewer_EmpGrade']>0 AND $res['HR_CurrGradeId']!=$res['Reviewer_EmpGrade']) {echo $resRG['GradeValue']; }?></td>	
			<td align="center" style="font:Georgia; font-size:11px; width:80px; background-color:#FFFFFF;"><?php echo $res['EmpCurrGrossPM']; ?></td>				
			<td align="center" style="font:Georgia; font-size:11px; width:80px; background-color:#BFDFFF;"><?php echo $res['Hod_ProIncSalary']; ?></td>
			<td align="center" style="font:Georgia; font-size:11px; width:60px; background-color:#BFDFFF;"><?php echo $res['Hod_Percent_ProIncSalary']; ?></td>	
			<td align="center" style="font:Georgia; font-size:11px; width:80px; background-color:#FFFFB9;"><?php echo $res['Hod_ProCorrSalary']; ?></td>
			<td align="center" style="font:Georgia; font-size:11px; width:60px; background-color:#FFFFB9;"><?php echo $res['Hod_Percent_ProCorrSalary']; ?></td>	
			<td align="center" style="font:Georgia; font-size:11px; width:80px; background-color:#DDDDFF;"><?php echo $res['Hod_IncNetMonthalySalary']; ?></td>
			<td align="center" style="font:Georgia; font-size:11px; width:80px;background-color:#DDDDFF;"><?php echo $res['Hod_Percent_IncNetMonthalySalary']; ?></td>	
			<td align="center" style="font:Georgia; font-size:11px; width:80px; background-color:#FFC68C;"><?php echo $res['Hod_GrossMonthlySalary']; ?></td>
		 </tr>
<?php $sno++;} ?>		
   </table>
 </td>
</tr> 
<?php } if($_REQUEST['action']=='IncHOD') { ?>
<tr>
 <td>
   <table border="1" width="1400">
	 <tr>
<?php $sqlA=mysql_query("select Fname, Sname, Lname from hrm_employee where EmployeeId=".$_REQUEST['value'], $con); $resA=mysql_fetch_assoc($sqlA); ?>	 
	  <td colspan="18" valign="top" style=" background-color:#0069D2; font-size:14px; color:#FFFFFF; font-family:Georgia; font-weight:bold;">&nbsp;PMS Increment Status HOD Wise :
	   &nbsp;&nbsp;(&nbsp;HOD - <?php echo $resA['Fname'].' '.$resA['Sname'].' '.$resA['Lname']; ?>&nbsp;)&nbsp;&nbsp;&nbsp;
	 <?php  /* <a href="#" onClick="PrintAppRev(<?php if($_REQUEST['value']!='All') { echo $resA['DepartmentName'];  } else echo 'All';?>)" style="color:#F9F900; font-size:12px;">Print</a> */ ?>
	  </td>
	 </tr>
 <tr bgcolor="#7a6189" style="height:20px;" valign="middle">
	        <td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:40px;"><b>SNo.</b></td>
	        <td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:80px;"><b>EmpCode</b></td>
	        <td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:200px;"><b>Name</b></td>
	        <td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:100px;"><b>Department</b></td>
			<td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:200px;"><b>Designation</b></td>
			<td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:50px;"><b>Grade</b></td>
			<td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:50px;"><b>Score</b></td>
			<td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:50px;"><b>Rating</b></td>
			<td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:200px;"><b>Proposed Designation</b></td>
			<td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:50px;"><b>PG</b></td>
			<td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:80px;"><b>Pre. Gross</b></td>
			<td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:80px;"><b>PGSPM</b></td>
			<td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:60px;"><b>% PIS</b></td>
            <td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:80px;"><b>SC</b></td>
			<td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:60px;"><b>% PSC</b></td>
			<td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:80px;"><b>TISPM</b></td>
			<td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:80px;"><b>% TISPM</b></td>
			<td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:80px;"><b>TPGSPM</b></td>
		 </tr>
<?php  $sql=mysql_query("select hrm_employee.*,EmpCurrGrossPM,Reviewer_TotalFinalScore,Reviewer_TotalFinalRating,Hod_TotalFinalScore,Hod_TotalFinalRating,Hod_EmpDesignation,Hod_EmpGrade,Hod_ProIncSalary,Hod_Percent_ProIncSalary,Hod_ProCorrSalary,Hod_Percent_ProCorrSalary,Hod_IncNetMonthalySalary,Hod_Percent_IncNetMonthalySalary,Hod_GrossMonthlySalary,HR_CurrDesigId,HR_CurrGradeId,DepartmentId,DesigId,DesigId2,HqId,GradeId from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_pms ON hrm_employee.EmployeeID=hrm_employee_pms.EmployeeID where hrm_employee.CompanyId=".$CompanyId." AND hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$YearId." AND hrm_employee_pms.HOD_EmployeeID=".$_REQUEST['value'], $con); 
$sno=1; while($res=mysql_fetch_array($sql)){ ?>     				
		<tr style="height:20px; background-color:<?php if($sno%2==0){echo '#ECFFEC';} else {echo '#FFFFFF';} ?>;" valign="middle">
	        <td align="center" style="font:Georgia; font-size:11px; width:50px;"><?php echo $sno; ?></td>
	        <td align="center" style="font:Georgia; font-size:11px; width:80px;"><?php echo $res['EmpCode']; ?></td>
	        <td align="" style="font:Georgia; font-size:11px; width:200px;"><?php echo $res['Fname'].' '.$res['Sname'].' '.$res['Lname']; ?></td>
<?php $sql2=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$res['DepartmentId'], $con); 
      $res2=mysql_fetch_assoc($sql2);?><td align="" style="font:Georgia; font-size:11px; width:100px;">&nbsp;<?php echo $res2['DepartmentCode'];?></td>
	  <?php $sql3=mysql_query("select DesigName from hrm_designation where DesigId=".$res['HR_CurrDesigId'], $con); $res3=mysql_fetch_assoc($sql3);?>			
			<td align="" style="font:Georgia; font-size:11px; width:200px;">&nbsp;&nbsp;<?php echo $res3['DesigName'];?></td>		
<?php $sql4=mysql_query("select GradeValue from hrm_grade where GradeId=".$res['HR_CurrGradeId'], $con);  $res4=mysql_fetch_assoc($sql4);?>			
			<td align="center" style="font:Georgia; font-size:11px; width:50px;">&nbsp;&nbsp;<?php echo $res4['GradeValue'];?></td>			
			<td align="center" style="font:Georgia; font-size:11px; width:50px; background-color:#FFDDDD;"><?php if($res['Hod_TotalFinalScore']>0) {echo $res['Hod_TotalFinalScore']; } else {echo $res['Reviewer_TotalFinalScore'];} ?></td>	
			<td align="center" style="font:Georgia; font-size:11px; width:50px; background-color:#FFDDDD;"><?php  if($res['Hod_TotalFinalRating']>0){echo $res['Hod_TotalFinalRating']; } else {echo $res['Reviewer_TotalFinalRating'];} ?></td>
<?php if($res['Hod_EmpDesignation']!=0) {$sqlHD=mysql_query("select DesigName from hrm_designation where DesigId=".$res['Hod_EmpDesignation'], $con); $resHD=mysql_fetch_assoc($sqlHD);}
      if($res['Reviewer_EmpDesignation']!=0) {$sqlRD=mysql_query("select DesigName from hrm_designation where DesigId=".$res['Reviewer_EmpDesignation'], $con); $resRD=mysql_fetch_assoc($sqlRD);} 
	  if($res['Hod_EmpGrade']!=0) {$sqlHG=mysql_query("select GradeValue from hrm_grade where GradeId=".$res['Hod_EmpGrade'], $con); $resHG=mysql_fetch_assoc($sqlHG);} 
	  if($res['Reviewer_EmpGrade']!=0) {$sqlRG=mysql_query("select GradeValue from hrm_grade where GradeId=".$res['Reviewer_EmpGrade'], $con); $resRG=mysql_fetch_assoc($sqlRG);}
?>			<td align="" style="font:Georgia; font-size:11px; width:200px; background-color:#C4FFC4;">
			<?php if($res['Hod_EmpDesignation']>0 AND $res['HR_CurrDesigId']!=$res['Hod_EmpDesignation']) { echo $resHD['DesigName'];} 
			 elseif($res['Reviewer_EmpDesignation']>0 AND $res['HR_CurrDesigId']!=$res['Reviewer_EmpDesignation']) {echo $resRD['DesigName'];}?></td>	
            <td align="center" style="font:Georgia; font-size:11px; width:50px;background-color:#C4FFC4;">
			<?php if($res['Hod_EmpGrade']>0 AND $res['HR_CurrGradeId']!=$res['Hod_EmpGrade']) { echo $resHG['GradeValue'];} 
			elseif($res['Reviewer_EmpGrade']>0 AND $res['HR_CurrGradeId']!=$res['Reviewer_EmpGrade']) {echo $resRG['GradeValue']; }?></td>	
			<td align="center" style="font:Georgia; font-size:11px; width:80px; background-color:#FFFFFF;"><?php echo $res['EmpCurrGrossPM']; ?></td>			
			<td align="center" style="font:Georgia; font-size:11px; width:80px; background-color:#BFDFFF;"><?php echo $res['Hod_ProIncSalary']; ?></td>
			<td align="center" style="font:Georgia; font-size:11px; width:60px; background-color:#BFDFFF;"><?php echo $res['Hod_Percent_ProIncSalary']; ?></td>	
			<td align="center" style="font:Georgia; font-size:11px; width:80px; background-color:#FFFFB9;"><?php echo $res['Hod_ProCorrSalary']; ?></td>
			<td align="center" style="font:Georgia; font-size:11px; width:60px; background-color:#FFFFB9;"><?php echo $res['Hod_Percent_ProCorrSalary']; ?></td>	
			<td align="center" style="font:Georgia; font-size:11px; width:80px; background-color:#DDDDFF;"><?php echo $res['Hod_IncNetMonthalySalary']; ?></td>
			<td align="center" style="font:Georgia; font-size:11px; width:80px;background-color:#DDDDFF;"><?php echo $res['Hod_Percent_IncNetMonthalySalary']; ?></td>	
			<td align="center" style="font:Georgia; font-size:11px; width:80px; background-color:#FFC68C;"><?php echo $res['Hod_GrossMonthlySalary']; ?></td>
		 </tr>
<?php $sno++;} ?>		
   </table>
 </td>
</tr> 
<?php } if($_REQUEST['action']=='IncOverAll') { ?>
<tr>

 <td>

   <table border="1" width="750">

	 <tr>

	  <td colspan="18" valign="top" style=" background-color:#0069D2; font-size:14px; color:#FFFFFF; font-family:Georgia; font-weight:bold;">&nbsp;Over All Increment:

	   &nbsp;&nbsp;<?php if($_REQUEST['value']=='Department'){ echo 'Department Wise'; }if($_REQUEST['value']=='HOD'){ echo 'HOD Wise'; }?> &nbsp;&nbsp;&nbsp;

	 <?php  /* <a href="#" onClick="PrintAppRev(<?php if($_REQUEST['value']!='All') { echo $resA['DepartmentName'];  } else echo 'All';?>)" style="color:#F9F900; font-size:12px;">Print</a> */ ?>



	  </td>

	 </tr>



 <tr bgcolor="#7a6189" style="height:20px;" valign="middle">

	        <td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:50px;"><b>SNo.</b></td>

	        <td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:150px;"><b>HOD</b></td>

	        <td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:100px;"><b>Previouse GS</b></td>

	        <td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:100px;"><b>Proposed GS</b></td>

			<td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:100px;"><b>Increment</b></td>

			<td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:40px;"><b>(%)</b></td>

		 </tr>

<?php $sqlT=mysql_query("select SUM(EmpCurrGrossPM) as TEGSPM, SUM(EmpCurrIncentivePM) as TEAMINC, SUM(Hod_IncNetMonthalySalary) as TINMS, SUM(Hod_GrossMonthlySalary) as TEPGS, SUM(Hod_Incentive) as HINCentv, HOD_EmployeeID from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND hrm_employee_pms.AssessmentYear=".$YearId, $con); 

while($resT=mysql_fetch_assoc($sqlT)){ $TTeamPreGPMT=$resT['TEGSPM']; $TTeamProGPMT=$resT['TEPGS']; $INCTVT=$resT['TEAMINC']; 

  $TotalTPerPIST=number_format($resT['PIS'], 2, '.', ''); $TotalTPerPSCT=number_format($resT['PSC'], 2, '.', ''); 

  $IncT=number_format($resT['TINMS'], 2, '.', ''); $HINCentvT=$resT['HINCentv']; }

?>

		 

<?php if($_REQUEST['value']=='HOD'){$sqlCount=mysql_query("select SUM(EmpCurrGrossPM) as TEGSPM, SUM(EmpCurrIncentivePM) as TEAMINC, SUM(Hod_IncNetMonthalySalary) as TINMS, SUM(Hod_GrossMonthlySalary) as TEPGS, SUM(Hod_Incentive) as HINCentv, HOD_EmployeeID from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND hrm_employee_pms.AssessmentYear=".$YearId." group by HOD_EmployeeID", $con);      

$sno=1; while($ResCount=mysql_fetch_array($sqlCount))

{ $TTeamPreGPM=$ResCount['TEGSPM']; $TTeamProGPM=$ResCount['TEPGS']; $INCTV=$ResCount['TEAMINC']; 

  $TotalTPerPIS=number_format($ResCount['PIS'], 2, '.', ''); $TotalTPerPSC=number_format($ResCount['PSC'], 2, '.', ''); 

  $Inc=number_format($ResCount['TINMS'], 2, '.', ''); $HINCentv=$ResCount['HINCentv']; ?>     				

		<tr style="height:20px; background-color:#FFFFFF;" valign="middle">

	        <td align="center" style="font:Georgia; font-size:11px; width:50px;"><?php echo $sno; ?></td>

<?php $sqlN=mysql_query("select * from hrm_employee where EmployeeID=".$ResCount['HOD_EmployeeID'], $con); $resN=mysql_fetch_assoc($sqlN); ?>			

	        <td align="" style="font:Georgia; font-size:11px; width:150px;"><?php echo $resN['Fname'].' '.$resN['Sname'].' '.$resN['Lname']; ?></td>

            <td align="" style="font:Georgia; font-size:11px; width:100px;">&nbsp;<?php echo $TTeamPreGPM; ?></td>

			<td align="" style="font:Georgia; font-size:11px; width:100px;">&nbsp;<?php echo $TTeamProGPM; ?></td>	

			<td align="" style="font:Georgia; font-size:11px; width:100px;">&nbsp;<?php  echo $Inc; ?></td>	

<?php $One=($TTeamPreGPM*1)/100; $IncPer=$Inc/$One; $IncPer2=number_format($IncPer, 2, '.', '');?>			

			<td align="" style="font:Georgia; font-size:11px; width:40px; background-color:#BFDFFF;">&nbsp;<?php echo $IncPer2; ?></td>

		 </tr>

<?php $sno++;} ?>

         <tr style="background-color:#B9FFB9;">

	        <td colspan="2" align="Right" style="font:Georgia; background-color:#B9FFB9; font-size:11px; width:50px;">Over all Total&nbsp;&nbsp;&nbsp;</td>		

            <td align="" style="font:Georgia; font-size:11px; width:100px;">&nbsp;<?php echo $TTeamPreGPMT; ?></td>

			<td align="" style="font:Georgia; font-size:11px; width:100px;">&nbsp;<?php echo $TTeamProGPMT; ?></td>	

			<td align="" style="font:Georgia; font-size:11px; width:100px;">&nbsp;<?php  echo $IncT; ?></td>	

<?php $OneT=($TTeamPreGPMT*1)/100; $IncPerT=$IncT/$OneT; $IncPerT2=number_format($IncPerT, 2, '.', '');?>			

			<td align="" style="font:Georgia; font-size:11px; width:40px; background-color:#B9FFB9;">&nbsp;<?php echo $IncPerT2; ?></td>

		 </tr>



<?php } if($_REQUEST['value']=='Department'){ $sqlCount=mysql_query("select SUM(EmpCurrGrossPM) as TEGSPM, SUM(EmpCurrIncentivePM) as TEAMINC, SUM(Hod_IncNetMonthalySalary) as TINMS, SUM(Hod_GrossMonthlySalary) as TEPGS, SUM(Hod_Incentive) as HINCentv, DepartmentId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND hrm_employee_pms.AssessmentYear=".$YearId." AND hrm_employee_pms.AssessmentYear=".$YearId." group by DepartmentId", $con); $sno=1; while($ResCount=mysql_fetch_array($sqlCount))

{ $TTeamPreGPM=$ResCount['TEGSPM']; $TTeamProGPM=$ResCount['TEPGS']; $INCTV=$ResCount['TEAMINC']; 

  $TotalTPerPIS=number_format($ResCount['PIS'], 2, '.', ''); $TotalTPerPSC=number_format($ResCount['PSC'], 2, '.', ''); 

  $Inc=number_format($ResCount['TINMS'], 2, '.', ''); $HINCentv=$ResCount['HINCentv']; ?>     				

		<tr style="height:20px; background-color:#FFFFFF;" valign="middle">

	        <td align="center" style="font:Georgia; font-size:11px; width:50px;"><?php echo $sno; ?></td>

<?php $sqlN=mysql_query("select DepartmentName from hrm_department where DepartmentId=".$ResCount['DepartmentId'], $con); $resN=mysql_fetch_assoc($sqlN); ?>			

	        <td align="" style="font:Georgia; font-size:11px; width:150px;"><?php echo $resN['DepartmentName']; ?></td>

            <td align="" style="font:Georgia; font-size:11px; width:100px;">&nbsp;<?php echo $TTeamPreGPM; ?></td>

			<td align="" style="font:Georgia; font-size:11px; width:100px;">&nbsp;<?php echo $TTeamProGPM; ?></td>	

			<td align="" style="font:Georgia; font-size:11px; width:100px;">&nbsp;<?php  echo $Inc; ?></td>	

<?php $One=($TTeamPreGPM*1)/100; $IncPer=$Inc/$One; $IncPer2=number_format($IncPer, 2, '.', '');?>			

			<td align="" style="font:Georgia; font-size:11px; width:40px; background-color:#BFDFFF;">&nbsp;<?php echo $IncPer2; ?></td>

		 </tr>

<?php $sno++;} ?>

 <tr style="background-color:#B9FFB9;">

	        <td colspan="2" align="Right" style="font:Georgia; background-color:#B9FFB9; font-size:11px; width:50px;">Over all Total&nbsp;&nbsp;&nbsp;</td>		

            <td align="" style="font:Georgia; font-size:11px; width:100px;">&nbsp;<?php echo $TTeamPreGPMT; ?></td>

			<td align="" style="font:Georgia; font-size:11px; width:100px;">&nbsp;<?php echo $TTeamProGPMT; ?></td>	

			<td align="" style="font:Georgia; font-size:11px; width:100px;">&nbsp;<?php  echo $IncT; ?></td>	

<?php $OneT=($TTeamPreGPMT*1)/100; $IncPerT=$IncT/$OneT; $IncPerT2=number_format($IncPerT, 2, '.', '');?>			

			<td align="" style="font:Georgia; font-size:11px; width:40px; background-color:#B9FFB9;">&nbsp;<?php echo $IncPerT2; ?></td>

		 </tr>

<?php }?>		

   </table>

 </td>



</tr> 

<?php } if($_REQUEST['action']=='RatngGraph' AND $_REQUEST['value']=='AllGraph') { ?>

<tr>

 <td valign="top">

   <table border="1" width="400">

	 <tr>	 

	  <td colspan="4" valign="top" style=" background-color:#0069D2; font-size:14px; color:#FFFFFF; font-family:Georgia; font-weight:bold;">&nbsp;

	   &nbsp;&nbsp;&nbsp;Actual Rating & Rating Graph &nbsp;(ALL EMP)&nbsp;&nbsp;&nbsp;

	  </td>

	 </tr>



 <tr bgcolor="#7a6189" style="height:20px;" valign="middle">

	        <td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:50px;"><b>SNo.</b></td>

	        <td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:50px;"><b>Rating</b></td>

	        <td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:100px;"><b>Expected</b></td>

	        <td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:100px;"><b>Actual</b></td>

		<?php /*	<td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:100px;"><b>Diff.</b></td>*/ ?>

 </tr>

<?php $sqlRat1=mysql_query("select NormalDistri from hrm_pms_normalrating_dis where NormalDisStatus='A' AND YearId=".$YearId." AND CompanyId=".$CompanyId." AND Rating=1", $con); 

$resRat1=mysql_fetch_array($sqlRat1); $sqlRat2=mysql_query("select NormalDistri from hrm_pms_normalrating_dis where NormalDisStatus='A' AND YearId=".$YearId." AND CompanyId=".$CompanyId." AND Rating=2", $con); $resRat2=mysql_fetch_array($sqlRat2); $sqlRat3=mysql_query("select NormalDistri from hrm_pms_normalrating_dis where NormalDisStatus='A' AND YearId=".$YearId." AND CompanyId=".$CompanyId." AND Rating=2.5", $con); $resRat3=mysql_fetch_array($sqlRat3); $sqlRat4=mysql_query("select NormalDistri from hrm_pms_normalrating_dis where NormalDisStatus='A' AND YearId=".$YearId." AND CompanyId=".$CompanyId." AND Rating=3", $con); $resRat4=mysql_fetch_array($sqlRat4); $sqlRat5=mysql_query("select NormalDistri from hrm_pms_normalrating_dis where NormalDisStatus='A' AND YearId=".$YearId." AND CompanyId=".$CompanyId." AND Rating=3.5", $con); $resRat5=mysql_fetch_array($sqlRat5); $sqlRat6=mysql_query("select NormalDistri from hrm_pms_normalrating_dis where NormalDisStatus='A' AND YearId=".$YearId." AND CompanyId=".$CompanyId." AND Rating=4", $con); $resRat6=mysql_fetch_array($sqlRat6); $sqlRat7=mysql_query("select NormalDistri from hrm_pms_normalrating_dis where NormalDisStatus='A' AND YearId=".$YearId." AND CompanyId=".$CompanyId." AND Rating=4.5", $con); $resRat7=mysql_fetch_array($sqlRat7); $sqlRat8=mysql_query("select NormalDistri from hrm_pms_normalrating_dis where NormalDisStatus='A' AND YearId=".$YearId." AND CompanyId=".$CompanyId." AND Rating=5", $con); $resRat8=mysql_fetch_array($sqlRat8);



$SqlA=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$YearId, $con); $RowA=mysql_num_rows($SqlA); 

$Sql1=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$YearId." AND Hod_TotalFinalRating=1", $con); $Row1=mysql_num_rows($Sql1); 

$Sql2=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$YearId." AND Hod_TotalFinalRating=2", $con); $Row2=mysql_num_rows($Sql2); 

$Sql3=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$YearId." AND Hod_TotalFinalRating=2.5", $con); $Row3=mysql_num_rows($Sql3); 

$Sql4=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$YearId." AND Hod_TotalFinalRating=3", $con); $Row4=mysql_num_rows($Sql4); 

$Sql5=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$YearId." AND Hod_TotalFinalRating=3.5", $con); $Row5=mysql_num_rows($Sql5); 

$Sql6=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$YearId." AND Hod_TotalFinalRating=4", $con); $Row6=mysql_num_rows($Sql6); 

$Sql7=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$YearId." AND Hod_TotalFinalRating=4.5", $con); $Row7=mysql_num_rows($Sql7); 

$Sql8=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$YearId." AND Hod_TotalFinalRating=5", $con); $Row8=mysql_num_rows($Sql8); 

$Ex1=($RowA*$resRat1['NormalDistri'])/100; $Ex2=($RowA*$resRat2['NormalDistri'])/100; $Ex3=($RowA*$resRat3['NormalDistri'])/100; $Ex4=($RowA*$resRat4['NormalDistri'])/100; 

$Ex5=($RowA*$resRat5['NormalDistri'])/100; $Ex6=($RowA*$resRat6['NormalDistri'])/100; $Ex7=($RowA*$resRat7['NormalDistri'])/100; $Ex8=($RowA*$resRat8['NormalDistri'])/100;

$v1=number_format($Row1, 2, '.', '');  $v2=number_format($Row2, 2, '.', ''); $v3=number_format($Row3, 2, '.', ''); $v4=number_format($Row4, 2, '.', ''); 

$v5=number_format($Row5, 2, '.', ''); $v6=number_format($Row6, 2, '.', ''); $v7=number_format($Row7, 2, '.', ''); $v8=number_format($Row8, 2, '.', '');

$ActEmp=$v1+$v2+$v3+$v4+$v5+$v6+$v7+$v8;

?>     				

 <tr style="height:20px; background-color:<?php if($sno%2==0){echo '#ECFFEC';} else {echo '#FFFFFF';} ?>;" valign="middle">

	<td align="center" style="font:Georgia; font-size:11px; width:50px;">1</td><td align="" style="font:Georgia; font-size:11px; width:100px;">&nbsp;&nbsp;&nbsp;1</td>

	<td align="center" style="font:Georgia; font-size:11px; width:100px;"><?php echo $Ex1; ?></td>

    <td align="center" style="font:Georgia; font-size:11px; width:100px;"><?php echo $v1; ?></td>	

	<?php /*<td align="center" style="font:Georgia; font-size:11px; width:100px;background-color:#DDDDFF;"><?php $D1=$resRat1['NormalDistri']-$v1; 

	if($resRat1['NormalDistri']>$v1) {echo '-'.$D1; } elseif($resRat1['NormalDistri']<$v1) {echo '+'.$D1; } elseif($resRat1['NormalDistri']==$v1) {echo $D1; }?></td>*/ ?>

 </tr>

 <tr style="height:20px; background-color:<?php if($sno%2==0){echo '#ECFFEC';} else {echo '#FFFFFF';} ?>;" valign="middle">

	<td align="center" style="font:Georgia; font-size:11px; width:50px;">2</td><td align="" style="font:Georgia; font-size:11px; width:100px;">&nbsp;&nbsp;&nbsp;2</td>

	<td align="center" style="font:Georgia; font-size:11px; width:100px;"><?php echo $Ex2; ?></td>

    <td align="center" style="font:Georgia; font-size:11px; width:100px;"><?php echo $v2; ?></td>	

<?php /*<td align="center" style="font:Georgia; font-size:11px; width:100px;background-color:#DDDDFF;"><?php $D2=$resRat2['NormalDistri']-$v2; 

	if($resRat2['NormalDistri']>$v2) {echo '-'.$D2; } elseif($resRat2['NormalDistri']<$v2) {echo '+'.$D2; } elseif($resRat2['NormalDistri']==$v2) {echo $D2; } ?></td> */ ?>

 </tr>

 <tr style="height:20px; background-color:<?php if($sno%2==0){echo '#ECFFEC';} else {echo '#FFFFFF';} ?>;" valign="middle">

	<td align="center" style="font:Georgia; font-size:11px; width:50px;">3</td><td align="" style="font:Georgia; font-size:11px; width:100px;">&nbsp;&nbsp;&nbsp;2.5</td>

	<td align="center" style="font:Georgia; font-size:11px; width:100px;"><?php echo $Ex3; ?></td>

    <td align="center" style="font:Georgia; font-size:11px; width:100px;"><?php echo $v3; ?></td>	

	<?php /*<td align="center" style="font:Georgia; font-size:11px; width:100px;background-color:#DDDDFF;"><?php $D3=$resRat3['NormalDistri']-$v3; 

	if($resRat3['NormalDistri']>$v3) {echo '-'.$D3; } elseif($resRat3['NormalDistri']<$v3) {echo '+'.$D3; } elseif($resRat3['NormalDistri']==$v3) {echo $D3; }?></td>*/ ?>

 </tr>

 <tr style="height:20px; background-color:<?php if($sno%2==0){echo '#ECFFEC';} else {echo '#FFFFFF';} ?>;" valign="middle">

	<td align="center" style="font:Georgia; font-size:11px; width:50px;">4</td><td align="" style="font:Georgia; font-size:11px; width:100px;">&nbsp;&nbsp;&nbsp;3</td>

	<td align="center" style="font:Georgia; font-size:11px; width:100px;"><?php echo $Ex4; ?></td>

    <td align="center" style="font:Georgia; font-size:11px; width:100px;"><?php echo $v4; ?></td>	

	<?php /*<td align="center" style="font:Georgia; font-size:11px; width:100px;background-color:#DDDDFF;"><?php $D4=$resRat4['NormalDistri']-$v4; 

	if($resRat4['NormalDistri']>$v4) {echo '-'.$D4; } elseif($resRat4['NormalDistri']<$v4) {echo '+'.$D4; } elseif($resRat4['NormalDistri']==$v4) {echo $D4; } ?></td>*/ ?>

 </tr>

 <tr style="height:20px; background-color:<?php if($sno%2==0){echo '#ECFFEC';} else {echo '#FFFFFF';} ?>;" valign="middle">

	<td align="center" style="font:Georgia; font-size:11px; width:50px;">5</td><td align="" style="font:Georgia; font-size:11px; width:100px;">&nbsp;&nbsp;&nbsp;3.5</td>

	<td align="center" style="font:Georgia; font-size:11px; width:100px;"><?php echo $Ex5; ?></td>

    <td align="center" style="font:Georgia; font-size:11px; width:100px;"><?php echo $v5; ?></td>	

	<?php /*<td align="center" style="font:Georgia; font-size:11px; width:100px;background-color:#DDDDFF;"><?php $D5=$resRat5['NormalDistri']-$v5; 

	if($resRat5['NormalDistri']>$v5) {echo '-'.$D5; } elseif($resRat5['NormalDistri']<$v5) {echo '+'.$D5; } elseif($resRat5['NormalDistri']==$v5) {echo $D5; } ?></td>*/ ?>

 </tr>

 <tr style="height:20px; background-color:<?php if($sno%2==0){echo '#ECFFEC';} else {echo '#FFFFFF';} ?>;" valign="middle">

	<td align="center" style="font:Georgia; font-size:11px; width:50px;">6</td><td align="" style="font:Georgia; font-size:11px; width:100px;">&nbsp;&nbsp;&nbsp;4</td>

	<td align="center" style="font:Georgia; font-size:11px; width:100px;"><?php echo $Ex6; ?></td>

    <td align="center" style="font:Georgia; font-size:11px; width:100px;"><?php echo $v6; ?></td>	

	<?php /*<td align="center" style="font:Georgia; font-size:11px; width:100px;background-color:#DDDDFF;"><?php $D6=$resRat6['NormalDistri']-$v6; 

	if($resRat6['NormalDistri']>$v6) {echo '-'.$D6; } elseif($resRat6['NormalDistri']<$v6) {echo '+'.$D6; } elseif($resRat6['NormalDistri']==$v6) {echo $D6; } ?></td>*/ ?>

 </tr>

 <tr style="height:20px; background-color:<?php if($sno%2==0){echo '#ECFFEC';} else {echo '#FFFFFF';} ?>;" valign="middle">

	<td align="center" style="font:Georgia; font-size:11px; width:50px;">7</td><td align="" style="font:Georgia; font-size:11px; width:100px;">&nbsp;&nbsp;&nbsp;4.5</td>

	<td align="center" style="font:Georgia; font-size:11px; width:100px;"><?php echo $Ex7; ?></td>

    <td align="center" style="font:Georgia; font-size:11px; width:100px;"><?php echo $v7; ?></td>	

	<?php /*<td align="center" style="font:Georgia; font-size:11px; width:100px;background-color:#DDDDFF;"><?php $D7=$resRat7['NormalDistri']-$v7; 

	if($resRat7['NormalDistri']>$v7) {echo '-'.$D7; } elseif($resRat7['NormalDistri']<$v7) {echo '+'.$D7; } elseif($resRat7['NormalDistri']==$v7) {echo $D7; } ?></td>*/ ?>

 </tr>

 <tr style="height:20px; background-color:<?php if($sno%2==0){echo '#ECFFEC';} else {echo '#FFFFFF';} ?>;" valign="middle">

	<td align="center" style="font:Georgia; font-size:11px; width:50px;">8</td><td align="" style="font:Georgia; font-size:11px; width:100px;">&nbsp;&nbsp;&nbsp;5</td>

	<td align="center" style="font:Georgia; font-size:11px; width:100px;"><?php echo $Ex8; ?></td>

    <td align="center" style="font:Georgia; font-size:11px; width:100px;"><?php echo $v8; ?></td>

	<?php /*<td align="center" style="font:Georgia; font-size:11px; width:100px;background-color:#DDDDFF;"><?php $D8=$resRat8['NormalDistri']-$v8; 

	if($resRat8['NormalDistri']>$v8) {echo '-'.$D8; } elseif($resRat8['NormalDistri']<$v8) {echo '+'.$D8; } elseif($resRat8['NormalDistri']==$v8) {echo $D8; } ?></td>	*/ ?>

 </tr>

 <tr style="height:20px; background-color:#FFFFFF;" valign="middle">

	<td colspan="2" align="Right" style="font:Georgia; font-size:11px; width:150px;">Total :&nbsp;&nbsp;</td>

	<td align="center" style="background-color:#97FF97;font:Georgia; font-size:11px; width:100px;"><?php echo $RowA; ?></td>

    <td align="center" style="background-color:#97FF97;font:Georgia; font-size:11px; width:100px;"><?php echo $ActEmp; ?></td>

 </tr>

 <tr bgcolor="#FFFFFF" style="height:20px;" valign="middle">

	<td colspan="4" align="Right" style="font:Georgia; font-size:12px; width:50px;">

	 <a href="AllEmpHRLinRatingGraph.php" target="Giframe">Linear graph</a>&nbsp;&nbsp;&nbsp;

	 <a href="AllEmpHRRatingBarGraph.php" target="Giframe">Bar graph</a> &nbsp;&nbsp;

	</td>        

 </tr>

   </table>

 </td>

 <td style="width:800px;" valign="top">

   <table>

     <tr>

      <td style="width:750px; height:300px; border:0; border-style:hidden;" valign="top" align="center">

	  <iframe name="Giframe" src="AllEmpHRLinRatingGraph.php" style="width:750px; height:300px; border:0; border-style:hidden;"></iframe></td>

	 </tr>

   </table>

 </td>



</tr> 

<?php } if($_REQUEST['action']=='RatngGraph' AND $_REQUEST['value']=='HODGraph') { ?>

<?php $sqlEmpHOD=mysql_query("select hrm_employee.*,HOD_EmployeeID from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.HOD_EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND hrm_employee_pms.AssessmentYear=".$YearId." group by HOD_EmployeeID order by EmpCode ASC", $con);      

$sno=1; while($ResEmpHOD=mysql_fetch_array($sqlEmpHOD)) { ?>



<tr>

 <td valign="top">

   <table border="1" width="450">

	 <tr>	 

	  <td colspan="4" valign="top" style=" background-color:#0069D2; font-size:14px; color:#FFFFFF; font-family:Georgia; font-weight:bold;">&nbsp;

	   &nbsp;&nbsp;&nbsp;Rating Graph &nbsp;:&nbsp;<?php echo '('.$sno.') &nbsp;'.$ResEmpHOD['Fname'].' '.$ResEmpHOD['Sname'].' '.$ResEmpHOD['Lname'];?>&nbsp;&nbsp;

	  </td>

	 </tr>

<?php 

$sqlRat1=mysql_query("select NormalDistri from hrm_pms_normalrating_dis where NormalDisStatus='A' AND YearId=".$YearId." AND CompanyId=".$CompanyId." AND Rating=1", $con); 

$resRat1=mysql_fetch_array($sqlRat1); $sqlRat2=mysql_query("select NormalDistri from hrm_pms_normalrating_dis where NormalDisStatus='A' AND YearId=".$YearId." AND CompanyId=".$CompanyId." AND Rating=2", $con); $resRat2=mysql_fetch_array($sqlRat2); $sqlRat3=mysql_query("select NormalDistri from hrm_pms_normalrating_dis where NormalDisStatus='A' AND YearId=".$YearId." AND CompanyId=".$CompanyId." AND Rating=2.5", $con); $resRat3=mysql_fetch_array($sqlRat3); $sqlRat4=mysql_query("select NormalDistri from hrm_pms_normalrating_dis where NormalDisStatus='A' AND YearId=".$YearId." AND CompanyId=".$CompanyId." AND Rating=3", $con); $resRat4=mysql_fetch_array($sqlRat4); $sqlRat5=mysql_query("select NormalDistri from hrm_pms_normalrating_dis where NormalDisStatus='A' AND YearId=".$YearId." AND CompanyId=".$CompanyId." AND Rating=3.5", $con); $resRat5=mysql_fetch_array($sqlRat5); $sqlRat6=mysql_query("select NormalDistri from hrm_pms_normalrating_dis where NormalDisStatus='A' AND YearId=".$YearId." AND CompanyId=".$CompanyId." AND Rating=4", $con); $resRat6=mysql_fetch_array($sqlRat6); $sqlRat7=mysql_query("select NormalDistri from hrm_pms_normalrating_dis where NormalDisStatus='A' AND YearId=".$YearId." AND CompanyId=".$CompanyId." AND Rating=4.5", $con); $resRat7=mysql_fetch_array($sqlRat7); $sqlRat8=mysql_query("select NormalDistri from hrm_pms_normalrating_dis where NormalDisStatus='A' AND YearId=".$YearId." AND CompanyId=".$CompanyId." AND Rating=5", $con); $resRat8=mysql_fetch_array($sqlRat8);



$SqlA=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$YearId." AND HOD_EmployeeID=".$ResEmpHOD['HOD_EmployeeID'], $con); $RowA=mysql_num_rows($SqlA); 

$Sql1=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$YearId." AND Hod_TotalFinalRating=1 AND HOD_EmployeeID=".$ResEmpHOD['HOD_EmployeeID'], $con); $Row1=mysql_num_rows($Sql1); 

$Sql2=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$YearId." AND Hod_TotalFinalRating=2 AND HOD_EmployeeID=".$ResEmpHOD['HOD_EmployeeID'], $con); $Row2=mysql_num_rows($Sql2); 

$Sql3=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$YearId." AND Hod_TotalFinalRating=2.5 AND HOD_EmployeeID=".$ResEmpHOD['HOD_EmployeeID'], $con); $Row3=mysql_num_rows($Sql3);

$Sql4=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$YearId." AND Hod_TotalFinalRating=3 AND HOD_EmployeeID=".$ResEmpHOD['HOD_EmployeeID'], $con); $Row4=mysql_num_rows($Sql4); 

$Sql5=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$YearId." AND Hod_TotalFinalRating=3.5 AND HOD_EmployeeID=".$ResEmpHOD['HOD_EmployeeID'], $con); $Row5=mysql_num_rows($Sql5);

$Sql6=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$YearId." AND Hod_TotalFinalRating=4 AND HOD_EmployeeID=".$ResEmpHOD['HOD_EmployeeID'], $con); $Row6=mysql_num_rows($Sql6); 

$Sql7=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$YearId." AND Hod_TotalFinalRating=4.5 AND HOD_EmployeeID=".$ResEmpHOD['HOD_EmployeeID'], $con); $Row7=mysql_num_rows($Sql7);

$Sql8=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$YearId." AND Hod_TotalFinalRating=5 AND HOD_EmployeeID=".$ResEmpHOD['HOD_EmployeeID'], $con); $Row8=mysql_num_rows($Sql8); 

$v1=number_format($Row1, 2, '.', '');  $v2=number_format($Row2, 2, '.', ''); $v3=number_format($Row3, 2, '.', ''); $v4=number_format($Row4, 2, '.', ''); 

$v5=number_format($Row5, 2, '.', ''); $v6=number_format($Row6, 2, '.', ''); $v7=number_format($Row7, 2, '.', ''); $v8=number_format($Row8, 2, '.', '');

$Rat=($RowA*$resRat1['NormalDistri'])/100; $Rat2=($RowA*$resRat2['NormalDistri'])/100; $Rat3=($RowA*$resRat3['NormalDistri'])/100; $Rat4=($RowA*$resRat4['NormalDistri'])/100;

$Rat5=($RowA*$resRat5['NormalDistri'])/100; $Rat6=($RowA*$resRat6['NormalDistri'])/100; $Rat7=($RowA*$resRat7['NormalDistri'])/100; $Rat8=($RowA*$resRat8['NormalDistri'])/100;

$ActEmp=$v1+$v2+$v3+$v4+$v5+$v6+$v7+$v8;

?>

 <tr bgcolor="#7a6189" style="height:20px;" valign="middle">

	        <td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:50px;"><b>SNo.</b></td>

	        <td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:50px;"><b>Rating</b></td>

	        <td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:100px;"><b>Expected</b></td>

	        <td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:100px;"><b>Actual</b></td>

		<?php /*	<td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:100px;"><b>Diff.</b></td>*/ ?>

 </tr>

 <tr style="height:20px; background-color:#FFFFFF;" valign="middle">

	<td align="center" style="font:Georgia; font-size:11px; width:50px;">1</td><td align="" style="font:Georgia; font-size:11px; width:100px;">&nbsp;&nbsp;&nbsp;1</td>

	<td align="center" style="font:Georgia; font-size:11px; width:100px;"><?php echo $Rat; ?></td>

    <td align="center" style="font:Georgia; font-size:11px; width:100px;"><?php echo $v1; ?></td>	

	<?php /*<td align="center" style="font:Georgia; font-size:11px; width:100px;background-color:#DDDDFF;"><?php $D1=$resRat1['NormalDistri']-$v1; 

	if($resRat1['NormalDistri']>$v1) {echo '-'.$D1; } elseif($resRat1['NormalDistri']<$v1) {echo '+'.$D1; } elseif($resRat1['NormalDistri']==$v1) {echo $D1; }?></td>*/ ?>

 </tr>

 <tr style="height:20px; background-color:#FFFFFF;" valign="middle">

	<td align="center" style="font:Georgia; font-size:11px; width:50px;">2</td><td align="" style="font:Georgia; font-size:11px; width:100px;">&nbsp;&nbsp;&nbsp;2</td>

	<td align="center" style="font:Georgia; font-size:11px; width:100px;"><?php echo $Rat2; ?></td>

    <td align="center" style="font:Georgia; font-size:11px; width:100px;"><?php echo $v2; ?></td>	

<?php /*<td align="center" style="font:Georgia; font-size:11px; width:100px;background-color:#DDDDFF;"><?php $D2=$resRat2['NormalDistri']-$v2; 

	if($resRat2['NormalDistri']>$v2) {echo '-'.$D2; } elseif($resRat2['NormalDistri']<$v2) {echo '+'.$D2; } elseif($resRat2['NormalDistri']==$v2) {echo $D2; } ?></td> */ ?>

 </tr>

 <tr style="height:20px; background-color:#FFFFFF;" valign="middle">

	<td align="center" style="font:Georgia; font-size:11px; width:50px;">3</td><td align="" style="font:Georgia; font-size:11px; width:100px;">&nbsp;&nbsp;&nbsp;2.5</td>

	<td align="center" style="font:Georgia; font-size:11px; width:100px;"><?php echo $Rat3; ?></td>

    <td align="center" style="font:Georgia; font-size:11px; width:100px;"><?php echo $v3; ?></td>	

	<?php /*<td align="center" style="font:Georgia; font-size:11px; width:100px;background-color:#DDDDFF;"><?php $D3=$resRat3['NormalDistri']-$v3; 

	if($resRat3['NormalDistri']>$v3) {echo '-'.$D3; } elseif($resRat3['NormalDistri']<$v3) {echo '+'.$D3; } elseif($resRat3['NormalDistri']==$v3) {echo $D3; }?></td>*/ ?>

 </tr>

 <tr style="height:20px; background-color:#FFFFFF;" valign="middle">

	<td align="center" style="font:Georgia; font-size:11px; width:50px;">4</td><td align="" style="font:Georgia; font-size:11px; width:100px;">&nbsp;&nbsp;&nbsp;3</td>

	<td align="center" style="font:Georgia; font-size:11px; width:100px;"><?php echo $Rat4; ?></td>

    <td align="center" style="font:Georgia; font-size:11px; width:100px;"><?php echo $v4; ?></td>	

	<?php /*<td align="center" style="font:Georgia; font-size:11px; width:100px;background-color:#DDDDFF;"><?php $D4=$resRat4['NormalDistri']-$v4; 

	if($resRat4['NormalDistri']>$v4) {echo '-'.$D4; } elseif($resRat4['NormalDistri']<$v4) {echo '+'.$D4; } elseif($resRat4['NormalDistri']==$v4) {echo $D4; } ?></td>*/ ?>

 </tr>

 <tr style="height:20px; background-color:#FFFFFF;" valign="middle">

	<td align="center" style="font:Georgia; font-size:11px; width:50px;">5</td><td align="" style="font:Georgia; font-size:11px; width:100px;">&nbsp;&nbsp;&nbsp;3.5</td>

	<td align="center" style="font:Georgia; font-size:11px; width:100px;"><?php echo $Rat5; ?></td>

    <td align="center" style="font:Georgia; font-size:11px; width:100px;"><?php echo $v5; ?></td>	

	<?php /*<td align="center" style="font:Georgia; font-size:11px; width:100px;background-color:#DDDDFF;"><?php $D5=$resRat5['NormalDistri']-$v5; 

	if($resRat5['NormalDistri']>$v5) {echo '-'.$D5; } elseif($resRat5['NormalDistri']<$v5) {echo '+'.$D5; } elseif($resRat5['NormalDistri']==$v5) {echo $D5; } ?></td>*/ ?>

 </tr>

 <tr style="height:20px; background-color:#FFFFFF;" valign="middle">

	<td align="center" style="font:Georgia; font-size:11px; width:50px;">6</td><td align="" style="font:Georgia; font-size:11px; width:100px;">&nbsp;&nbsp;&nbsp;4</td>

	<td align="center" style="font:Georgia; font-size:11px; width:100px;"><?php echo $Rat6; ?></td>

    <td align="center" style="font:Georgia; font-size:11px; width:100px;"><?php echo $v6; ?></td>	

	<?php /*<td align="center" style="font:Georgia; font-size:11px; width:100px;background-color:#DDDDFF;"><?php $D6=$resRat6['NormalDistri']-$v6; 

	if($resRat6['NormalDistri']>$v6) {echo '-'.$D6; } elseif($resRat6['NormalDistri']<$v6) {echo '+'.$D6; } elseif($resRat6['NormalDistri']==$v6) {echo $D6; } ?></td>*/ ?>

 </tr>

 <tr style="height:20px; background-color:#FFFFFF;" valign="middle">

	<td align="center" style="font:Georgia; font-size:11px; width:50px;">7</td><td align="" style="font:Georgia; font-size:11px; width:100px;">&nbsp;&nbsp;&nbsp;4.5</td>

	<td align="center" style="font:Georgia; font-size:11px; width:100px;"><?php echo $Rat7; ?></td>

    <td align="center" style="font:Georgia; font-size:11px; width:100px;"><?php echo $v7; ?></td>	

	<?php /*<td align="center" style="font:Georgia; font-size:11px; width:100px;background-color:#DDDDFF;"><?php $D7=$resRat7['NormalDistri']-$v7; 

	if($resRat7['NormalDistri']>$v7) {echo '-'.$D7; } elseif($resRat7['NormalDistri']<$v7) {echo '+'.$D7; } elseif($resRat7['NormalDistri']==$v7) {echo $D7; } ?></td>*/ ?>

 </tr>

 <tr style="height:20px; background-color:#FFFFFF;" valign="middle">

	<td align="center" style="font:Georgia; font-size:11px; width:50px;">8</td><td align="" style="font:Georgia; font-size:11px; width:100px;">&nbsp;&nbsp;&nbsp;5</td>

	<td align="center" style="font:Georgia; font-size:11px; width:100px;"><?php echo $Rat8; ?></td>

    <td align="center" style="font:Georgia; font-size:11px; width:100px;"><?php echo $v8; ?></td>

	<?php /*<td align="center" style="font:Georgia; font-size:11px; width:100px;background-color:#DDDDFF;"><?php $D8=$resRat8['NormalDistri']-$v8; 

	if($resRat8['NormalDistri']>$v8) {echo '-'.$D8; } elseif($resRat8['NormalDistri']<$v8) {echo '+'.$D8; } elseif($resRat8['NormalDistri']==$v8) {echo $D8; } ?></td>	*/ ?>

 </tr>

 <tr style="height:20px; background-color:#FFFFFF;" valign="middle">

	<td colspan="2" align="Right" style="font:Georgia; font-size:11px; width:150px;">Total :&nbsp;&nbsp;</td>

	<td align="center" style="background-color:#97FF97;font:Georgia; font-size:11px; width:100px;"><?php echo $RowA; ?></td>

    <td align="center" style="background-color:#97FF97;font:Georgia; font-size:11px; width:100px;"><?php echo $ActEmp; ?></td>

 </tr>

 <tr bgcolor="#FFFFFF" style="height:20px;" valign="middle">

	<td colspan="4" align="Right" style="font:Georgia; font-size:12px; width:50px;">

	 <a href="HODWiseRatingGraph<?php echo $sno; ?>.php?action=LinGraph&EmpId=<?php echo $ResEmpHOD['HOD_EmployeeID']; ?>&Rat1=<?php echo $Rat; ?>&Rat2=<?php echo $Rat2; ?>&Rat3=<?php echo $Rat3; ?>&Rat4=<?php echo $Rat4; ?>&Rat5=<?php echo $Rat5; ?>&Rat6=<?php echo $Rat6; ?>&Rat7=<?php echo $Rat7; ?>&Rat8=<?php echo $Rat8; ?>&v1=<?php echo $v1; ?>&v2=<?php echo $v2; ?>&v3=<?php echo $v3; ?>&v4=<?php echo $v4; ?>&v5=<?php echo $v5; ?>&v6=<?php echo $v6; ?>&v7=<?php echo $v7; ?>&v8=<?php echo $v8; ?>" target="Giframe<?php echo $sno; ?>">Linear graph</a>&nbsp;&nbsp;&nbsp;

	 <a href="HODWiseRatingGraph<?php echo $sno; ?>.php?action=BarGraph&EmpId=<?php echo $ResEmpHOD['HOD_EmployeeID']; ?>&Rat1=<?php echo $Rat; ?>&Rat2=<?php echo $Rat2; ?>&Rat3=<?php echo $Rat3; ?>&Rat4=<?php echo $Rat4; ?>&Rat5=<?php echo $Rat5; ?>&Rat6=<?php echo $Rat6; ?>&Rat7=<?php echo $Rat7; ?>&Rat8=<?php echo $Rat8; ?>&v1=<?php echo $v1; ?>&v2=<?php echo $v2; ?>&v3=<?php echo $v3; ?>&v4=<?php echo $v4; ?>&v5=<?php echo $v5; ?>&v6=<?php echo $v6; ?>&v7=<?php echo $v7; ?>&v8=<?php echo $v8; ?>" target="Giframe<?php echo $sno; ?>">Bar graph</a> &nbsp;&nbsp;

	</td>        

 </tr>

   </table>

 </td>

 <td style="width:800px;" valign="top">

   <table>

     <tr>

      <td style="width:750px; height:250px; border:0; border-style:hidden;" valign="top" align="center">

	    <iframe name="Giframe<?php echo $sno; ?>" src="HODWiseRatingGraph<?php echo $sno; ?>.php" style="width:750px; height:250px; border:0; border-style:hidden;"></iframe>	  

	  </td>

	 </tr>

   </table>

 </td>



</tr> 

<?php $sno++;} }?>

   </table>

 </td>

 

</tr> 







<?php //---------------------------------------Close Record----------------------------------------------------------------- ?>



				



		  



	   </table>



     </tr>



	



	 <tr>



   



 </tr> 



</table>



		 



		 </td> 



	   </tr>



	 </table>



 



   </td>



 </tr>



			  



				



			    



		   </table>



		    </form>  		



		</td>



		



        <?php } ?>



		<?php //-------------------------------------------------------------------------------------------------------- ?>



		



		<td align="left" width="20%">&nbsp;</td>



	</tr>



</table>



		



<?php //************************************************************************************************************************************************************?>



<?php //**********************************************END*****END*****END******END******END***************************************************************?>



<?php //************************************************************************************************************************************************************?>



		



	  </td>



	</tr>



	<tr>



	  <td valign="top">



	    <?php require_once("../footer.php"); ?>



	  </td>



	</tr>



  </table>



 </td>



</tr>



</table>



</body>



</html>