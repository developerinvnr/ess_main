<?php session_start();
if($_SESSION['login'] = true){require_once('../AdminUser/config/config.php');}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('../AdminUser/logcheck.php');
if($_SESSION['logCheckEmp']!=$logemp){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('EmpMenuSession.php');}
$sqlSY=mysql_query("select OldY,CurrY,NewY from hrm_pms_setting where CompanyId=".$CompanyId." AND Process='KRA'", $con); $resSY=mysql_fetch_array($sqlSY); 
$sqlSYP=mysql_query("select OldY,CurrY,NewY from hrm_pms_setting where CompanyId=".$CompanyId." AND Process='PMS'", $con); $resSYP=mysql_fetch_array($sqlSYP); 

/******************************************************************************/
?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<link rel="stylesheet" type="text/css" href="src/css/jscal2.css"/>
<link rel="stylesheet" type="text/css" href="src/css/border-radius.css"/>
<link rel="stylesheet" type="text/css" href="src/css/steel/steel.css"/>
<script type="text/javascript" src="src/js/jscal2.js"></script>
<script type="text/javascript" src="src/js/lang/en.js"></script>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<style>.font {color:#000; font-family:Times New Roman; font-size:15px; font-weight:bold;} 
.Input{font-family:"Times New Roman", Times, serif; font-size:14px; height:22px;border-style:hidden; border-bottom-color:#FFFFFF; border-left-color:#FFFFFF; border-right-color:#FFFFFF; border-top-color:#FFFFFF; border:0;}.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;} .font1 { font-family:Georgia; font-size:11px; height:14px; } .font2 { font-size:11px;width:260px;height:18px;}.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;} .TableHead { font-family:Times New Roman; color:#FFFFFF; font-size:15px; }.TableHead1 { font-family:Times New Roman; color:#000000; background-color:#FFFFFF; font-size:13px; overflow:hidden; } .InputText {font-family:Times New Roman; font-size:12px; width:100px; height:19px; }
</style>
<Script type="text/javascript">window.history.forward(1);</Script>
<script type="text/javascript" language="javascript">		
function SelectHQEmpInc(value1,value2,value3){  
	document.getElementById('MyTeamInc').style.display='none'; 
	var url = 'HodProStatusEmp.php';	var pars = 'HQidInc='+value1+'&EmpIdInc='+value2+'&YIdInc='+value3;	var myAjax = new Ajax.Request(
	url, { 	method: 'post', parameters: pars, onComplete: show_HQEmpInc });
} 

function show_HQEmpInc(originalRequest)
{ document.getElementById('MyTeamIncSpan').innerHTML = originalRequest.responseText; }


function SelectStateEmpInc(value1,value2,value3){  
	document.getElementById('MyTeamInc').style.display='none'; 
	var url = 'HodProStateStatusEmp.php';	var pars = 'StHQidInc='+value1+'&EmpIdInc='+value2+'&YIdInc='+value3;	var myAjax = new Ajax.Request(
	url, { 	method: 'post', parameters: pars, onComplete: show_HQEmpInc });
} 

function show_HQEmpInc(originalRequest)
{ document.getElementById('MyTeamIncSpan').innerHTML = originalRequest.responseText; }


function SelectDeptEmp(value1,value2,value3){ 
   document.getElementById('MyTeamInc').style.display='none'; 
	var url = 'HodProDeptStatusEmp.php';	var pars = 'StDeptidInc='+value1+'&EmpIdInc='+value2+'&YIdInc='+value3;	var myAjax = new Ajax.Request(
	url, { 	method: 'post', parameters: pars, onComplete: show_DeptEmpInc });
} 
function show_DeptEmpInc(originalRequest)
{  document.getElementById('MyTeamIncSpan').innerHTML = originalRequest.responseText; }


function ClickEdit(Sno)
{document.getElementById("DesigId_"+Sno).disabled=false; document.getElementById("GradeId_"+Sno).disabled=false;
 document.getElementById("Justification_"+Sno).disabled=false; document.getElementById("SpanEdit_"+Sno).style.display='none';
 document.getElementById("SpanEditSave_"+Sno).style.display='block'; document.getElementById("DesigId_"+Sno).style.backgroundColor='#9FCFFF';
 document.getElementById("GradeId_"+Sno).style.backgroundColor='#9FCFFF'; document.getElementById("Justification_"+Sno).style.backgroundColor='#9FCFFF';
}



function AppName(id){  
	var url = 'NormalizedPromotion.php';	var pars = 'AppId='+id; var myAjax = new Ajax.Request(
	url, { 	method: 'post', parameters: pars, onComplete: show_App });
} 

function show_App(originalRequest)
{ document.getElementById('AppRevName').innerHTML = originalRequest.responseText; }



function RevName(id){  
	var url = 'NormalizedPromotion.php';	var pars = 'RevId='+id; var myAjax = new Ajax.Request(
	url, { 	method: 'post', parameters: pars, onComplete: show_Rev });
} 
function show_Rev(originalRequest)
{ document.getElementById('AppRevName').innerHTML = originalRequest.responseText; }


function ClickSaveEdit(No,PmsId,EmpId)
{ var HDesig=document.getElementById("DesigId_"+No).value; var HGrade=document.getElementById("GradeId_"+No).value; 
  var HJusti=document.getElementById("Justification_"+No).value; var ComId=document.getElementById("ComId").value; 
  var EmpDesig=document.getElementById("EmpDesig_"+No).value; var EmpGrade=document.getElementById("EmpGrade_"+No).value; 
  if (EmpDesig!=HDesig && HJusti.length === 0) { alert("Please type Justification !");  return false; }
  if (EmpGrade!=HGrade && HJusti.length === 0) { alert("Please type Justification !");  return false; }
  var url = 'NormalizedPromotion.php';	var pars = 'PmsId='+PmsId+'&EmpId='+EmpId+'&ComId='+ComId+'&No='+No+'&DesigId='+HDesig+'&GradeId='+HGrade+'&Justi='+HJusti; 
 var myAjax = new Ajax.Request(
  url, { 	method: 'post', parameters: pars, onComplete: show_Promotion });
}

function show_Promotion(originalRequest)
{ document.getElementById('msg').innerHTML = originalRequest.responseText; var Sno=document.getElementById("NoId").value; 
  document.getElementById("DesigId_"+Sno).disabled=true; document.getElementById("GradeId_"+Sno).disabled=true; 
  document.getElementById("Justification_"+Sno).disabled=true; document.getElementById("SpanEdit_"+Sno).style.display='block';  
  document.getElementById("SpanEditSave_"+Sno).style.display='none'; document.getElementById("DesigId_"+Sno).style.backgroundColor='#CEFFCE';
  document.getElementById("GradeId_"+Sno).style.backgroundColor='#CEFFCE'; document.getElementById("Justification_"+Sno).style.backgroundColor='#CEFFCE';
} 


function JustiApp(p,e)
{y=document.getElementById("YearId").value; 
 window.open("CheckJustification.php?action=JustiApp&P="+p+"&E="+e+"&Y="+y,"ResentReasonFile","menubar=no,scrollbars=yes,resizable='no',width=500,height=280");}

function JustiRev(p,e)
{y=document.getElementById("YearId").value; 
 window.open("CheckJustification.php?action=JustiRev&P="+p+"&E="+e+"&Y="+y,"ResentReasonFile","menubar=no,scrollbars=yes,resizable='no',width=500,height=280");} 

</script>
</head>
<body class="body">
<input type="hidden" id="PerValue" /><input type="hidden" id="ComId" value="<?php echo $CompanyId; ?>"/>
<table class="table">
<tr>
 <td>
  <table class="menutable"><tr><td><?php if($_SESSION['login'] = true){ require_once("EMenu.php"); } ?></td></tr></table> 
 </td>
</tr>
<tr>
 <td>
  <table width="100%" style="margin-top:0px; ">
    <tr>
	  <td valign="top"><?php if($_SESSION['login'] = true){ require_once("EWelcome.php"); } ?></td>
	</tr>
	 <tr>
	  <td valign="top">
	     <table border="0" style="width:100%; height:380px; float:none;" cellpadding="0">
		  <tr>
		   <td valign="top"> 
<?php //*************************************************************************************************************************************************** ?>	   
		     <table border="0" id="Activity">
			  <tr>
			     <td id="Anni" valign="top">&nbsp;</td>
				 <td width="1400" valign="top">
				  <table border="0">
<?php //*************************************************************** Start ******************************************************************************** ?>					
<tr>
 <td colspan="5" width="1500" style="background-image:url(images/pmsback.png); ">
 <?php $sqlSch=mysql_query("select * from hrm_pms_appdate where AssessmentYear=".$YearId." AND CompanyId=".$CompanyId, $con); 
      $resSch=mysql_fetch_assoc($sqlSch); $CuDate=date("Y-m-d");?>
  <table>
<?php //******************************************** ?>  
   <tr>
    <td width="1500">
	  <table border="0">
	    <tr>
        <?php if($_SESSION['EmpType']=='E') {?> 
		 <td align="center"><a href="pms.php?log=<?php echo $_SESSION['logCheckEmp']; ?>"><img id="Img_emp1" style="display:block;" src="images/emp1.png" border="0"/></a>
		   <img id="Img_emp" style="display:none;" src="images/emp.png" border="0"/></td>          
<?php } $sqlApp=mysql_query("select Appraiser_EmployeeID from hrm_employee_pms where AssessmentYear=".$YearId." AND Appraiser_EmployeeID=".$EmployeeId, $con); $rowApp=mysql_num_rows($sqlApp); 
      if($rowApp>0) { ?>	   
		 <td align="center"><a href="ManagerPms.php"><img id="Img_manager1" style="display:block;" src="images/manager1.png" border="0"/></a>
		   <img id="Img_manager" style="display:none;" src="images/manager.png" border="0"/></td>
<?php }  $sqlRev=mysql_query("select Reviewer_EmployeeID from hrm_employee_pms where AssessmentYear=".$YearId." AND Reviewer_EmployeeID=".$EmployeeId, $con); $rowRev=mysql_num_rows($sqlRev); 
      if($rowRev>0) { ?>	   
		 <td align="center"><a href="HodPms.php"><img id="Img_hod1" style="display:block;" src="images/hod1.png" border="0"/></a>
		   <img id="Img_hod" style="display:none;" src="images/hod.png" border="0"/></td>
<?php }  $sqlHod=mysql_query("select HOD_EmployeeID from hrm_employee_pms where AssessmentYear=".$YearId." AND HOD_EmployeeID=".$EmployeeId, $con); $rowHod=mysql_num_rows($sqlHod); 
      if($rowHod>0) { ?>			   
		 <td align="center"><a href="RevHodPms.php"><img id="Img_hod1" style="display:none;" src="images/RevHod1.png" border="0"/></a>
		   <img id="Img_hod" style="display:block;" src="images/RevHod.png" border="0"/></td>			     
<?php } ?>		
<td style="width:20px;"><font color="#014E05" style='font-family:Times New Roman; font-weight:bold;' size="3"><span id="MsgSpan">&nbsp;<b><?php echo $msg; ?></b></span></font></td>		
	  </table>
	</td>
   </tr>
   <tr>
    <td width="1500">
	  <table border="0">
	    <tr> 
		 <td align="center" style="font-family:Times New Roman; font-size:14px; font-weight:bold;width:80px;">
		 <a href="Indexpms.php?log=<?php echo $_SESSION['logCheckEmp']; ?>"><img src="images/Home.png" border="0" /></a></td>
		 <td align="center" style="font-family:Times New Roman; font-size:14px; font-weight:bold;width:90px;">
		 <a href="RevHodPms.php"><img src="images/TeamStatus1.png" border="0" /></a></td>    			   
		 <td align="center" style="font-family:Times New Roman; font-size:14px; font-weight:bold;width:70px;">
<?php $sqlCh = mysql_query("select * from hrm_pms_allow where HOD_EmployeeID=".$EmployeeId." AND CompanyId=".$CompanyId." AND AssesmentYear=".$YearId, $con); 
      $rowCh=mysql_num_rows($sqlCh);	 
		 if(($CuDate>=$resSch['HodFromDate'] AND $CuDate<=$resSch['HodToDate'] AND $resSch['HodDateStatus']=='A') OR $rowCh>0) { ?> 	
         <a href="HodPmsScore.php"><img src="images/Score1.png" border="0" /></a></td> 
		  <td align="center" style="font-family:Times New Roman; font-size:14px; font-weight:bold;width:80px;">	
         <a href="HodPmsPromotion.php"><img src="images/promotion.png" border="0" /></a></td> 
		 <td align="center" style="font-family:Times New Roman; font-size:14px; font-weight:bold;width:80px;">	
         <a href="HodPmsIncrement.php"><img src="images/Increment1.png" border="0" /></a><?php } ?></td>
		 <td align="center" style="font-family:Times New Roman; font-size:14px; font-weight:bold;width:100px;">	
         <a href="HodPmsReports.php"><img src="images/pmsreports1.png" border="0" /></a></td>
		 <td align="center" style="font-family:Times New Roman; font-size:14px; font-weight:bold;width:100px;">	
         <a href="HodIncReports.php"><img src="images/IncrementReports1.png" border="0" /></a></td> 
 <td>&nbsp;</td>
		 <td align="center" style="font-family:Times New Roman; font-size:14px; font-weight:bold;width:100px;">	
         <a href="RatingGraph.php"><img src="images/ratinggraph1.png" border="0" /></a></td> 
         <td align="center" style="font-family:Times New Roman; font-size:14px; font-weight:bold;width:100px;">	
         <a href="CompliteRatingGraph.php"><img src="images/OveallRatingGraph1.png" border="0" /></a></td> 
<td style="font-family:Times New Roman; font-size:16px; font-weight:bold;width:400px; color:#E10000;" >
		  <?php if($CuDate>=$resSch['HodFromDate'] AND $CuDate<=$resSch['HodToDate'] AND $resSch['HodDateStatus']=='A') { 
		   $LastDate=$resSch['HodToDate']; $CurrentDate=date("Y-m-d");
		  $diff = abs(strtotime($LastDate) - strtotime($CurrentDate));
          //$years = floor($diff / (365*60*60*24));
          //$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
          $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24)); ?>
		  <b><blink><?php echo $days; ?> Days Remaining! Last date : 
		  <font color="#5B0000"><?php echo date("d-F",strtotime($resSch['HodToDate'])); ?></font></blink></b><?php } ?>
		 </td> 	   	 	
		 <td class="td1" style="font-family:Times New Roman; font-size:15px; width:50px; font-weight:bold;" align="right">
 <span id="HQInc"> </span></td>
    </tr>			     			       
 </table>
	</td>
   </tr>
   <tr>
    <td>
	  <table border="0">
	    <tr>
		 <td style="width:5px;">&nbsp;</td>
<?php /****************************************** Form Start **************************/ ?>
<?php /***************** Submitted **************************/ ?>		 
		 <td id="Submitted" style="width:1500px;display:block;">
	  		   		   <table border="0">
 <tr>
  <td>	 
    <table border="0">
	<tr>
 <td style="font-family:Times New Roman; font-size:18px; font-weight:bold; width:150px;"><font color="#00468C">(<i>Team Promotion</i>)</font><br></td>
 <td><input type="hidden" id="EmployeeId" value="<?php echo $EmployeeId; ?>" /><input type="hidden" id="ComId" value="<?php echo $CompanyId; ?>" />
<input type="hidden" id="YearId" value="<?php echo $YearId; ?>" /><input type="hidden" id="FormMin5" value="0" /><input type="hidden" id="FormMax5" value="0" />	
<span id="PromoId">&nbsp;</span></td>
 <td class="td1" style="font-family:Times New Roman; font-size:15px; width:150px; font-weight:bold;"> 
   <span id="HQSelectInc">
   <select style="font-size:11px; width:150px; height:18px; background-color:#DDFFBB; display:block;" name="HQE" id="HQE" onChange="SelectHQEmpInc(this.value,<?php echo $EmployeeId.','.$YearId; ?>)"><option value="" style="margin-left:0px; background-color:#84D9D5;" selected>HEAD QUARTER</option><?php $SqlHQ=mysql_query("select * from hrm_headquater where CompanyId=".$CompanyId." order by HqName ASC", $con); while($ResHQ=mysql_fetch_array($SqlHQ)) { ?><option value="<?php echo $ResHQ['HqId']; ?>"><?php echo '&nbsp;'.$ResHQ['HqName'];?></option><?php } ?>
   <option value="All">&nbsp;All</option>
   </select>
   </span>
 </td>
 <td>&nbsp;</td>
 <td class="td1" style="font-family:Times New Roman; font-size:15px; width:150px; font-weight:bold;"> 
 <span id="StateSelectInc">
   <select style="font-size:11px; width:150px; height:18px; background-color:#DDFFBB; display:block;" name="StE" id="StE" onChange="SelectStateEmpInc(this.value,<?php echo $EmployeeId.','.$YearId; ?>)"><option value="" style="margin-left:0px; background-color:#84D9D5;" selected>STATE</option><?php $SqlSt=mysql_query("select * from hrm_state order by StateName ASC", $con); while($ResSt=mysql_fetch_array($SqlSt)) { ?><option value="<?php echo $ResSt['StateId']; ?>"><?php echo '&nbsp;'.$ResSt['StateName'];?></option><?php } ?>
   <option value="All">&nbsp;All</option>
   </select>
  </span> 
     </td> 
 <td>&nbsp;</td>
 <td class="td1" style="font-family:Times New Roman; font-size:15px; width:150px; font-weight:bold;"> 
   <select style="font-size:11px; width:150px; height:18px; background-color:#DDFFBB; display:block;" name="DeE" id="DeE" onChange="SelectDeptEmp(this.value,<?php echo $EmployeeId.','.$YearId; ?>)"><option value="" style="margin-left:0px; background-color:#84D9D5;" selected>DEPARTMENT</option><?php $SqlDe=mysql_query("select hrm_department.DepartmentId,DepartmentCode from hrm_department INNER JOIN hrm_employee_general ON hrm_department.DepartmentId=hrm_employee_general.DepartmentId INNER JOIN hrm_employee_pms ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee_pms.HOD_EmployeeID=".$EmployeeId." AND hrm_employee_pms.AssessmentYear=".$resSYP['CurrY']." group by DepartmentCode ASC", $con); while($ResDe=mysql_fetch_array($SqlDe)) { ?><option value="<?php echo $ResDe['DepartmentId']; ?>"><?php echo '&nbsp;'.$ResDe['DepartmentCode'];?></option><?php } ?>
   </select>
 </td>	  
 <td style="font-family:Times New Roman; font-size:14px; color:#006AD5; width:400">&nbsp;&nbsp;<span id="AppRevName"></span></td>	  
 <td style="width:500px;font-family:Georgia; color:#FFFF06; font-size:15px; font-weight:bold;">&nbsp;<i><span id="msg"></span></i></td>
<td class="td1" style="font-family:Times New Roman; font-size:15px; width:10px; font-weight:bold;" align="right"><span id="StateInc"></span></td>
    </tr>
  </table>
  </td>
 </tr>	   
 <tr>
   <td style="width:1500px;">
     <table border="0">
	  <tr>
	  <?php //************************************************ Start ******************************// ?>
	   <td style="width:1500px;" id="EmpAppInc" style="display:block;">
       <span id="MyTeamIncSpan"></span>	   
	   <span id="MyTeamInc">
		<table border="">
		 <tr bgcolor="#7a6189" style="height:20px;" valign="middle">
	        <td colspan="5" align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:430px;"><b>&nbsp;</b></td> 
			<td colspan="3" align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:390px;"><b>Proposed Designation</b></td>
			<td colspan="3" align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:150px;"><b>Proposed Grade</b></td>
			<td colspan="3" align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:470px;"><b>Justifiction</b></td>
			<td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:50px;"><b>&nbsp;</b></td>
		 </tr>
		 <tr bgcolor="#7a6189" style="height:20px;" valign="middle">
	        <td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:30px;"><b>SN</b></td>
	        <td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:50px;"><b>EC</b></td>
			<td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:180px;"><b>Employee</b></td>
			<td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:120px;"><b>Designation</b></td>
			<td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:40px;"><b>Grade</b></td>
			<td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:120px;"><b>App </b></td>
			<td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:120px;"><b>Rev</b></td>
			<td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:150px;"><b>HOD</b></td>
			<td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:50px;"><b>App</b></td>
			<td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:50px;"><b>Rev</b></td>
			<td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:50px;"><b>HOD</b></td>
			<td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:50px;"><b>App</b></td>
			<td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:50px;"><b>Rev</b></td>
			<td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:370px;"><b>HOD</b></td>
			<td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:50px;"><b>Edit</b></td>
		 </tr>
<script>
function FunDesig(v,no)
{ document.getElementById("NoGrade").value=no; var ComId=document.getElementById("ComId").value; 
  var url = 'GetGrade.php'; var pars = 'action=ChangeDesig&DesigId22='+v+'&ComId='+ComId+'&no='+no;	
  var myAjax = new Ajax.Request( url, { method: 'post', parameters: pars, onComplete: show_Grade }); } 
function show_Grade(originalRequest)
{ var no=document.getElementById("NoGrade").value; document.getElementById('SpanGarde_'+no).innerHTML = originalRequest.responseText; }
</script>		 
<input type="hidden" id="NoGrade" />
<?php $sql=mysql_query("select hrm_employee.*, EmpPmsId, Appraiser_EmployeeID, Reviewer_EmployeeID, Appraiser_EmpDesignation, Appraiser_EmpGrade, Reviewer_EmpDesignation, Reviewer_EmpGrade, Hod_EmpDesignation, Hod_EmpGrade, Appraiser_Justification, Reviewer_Justification, Hod_Justification, HR_CurrDesigId, HR_CurrGradeId, DepartmentId, DesigId, DesigId2, HqId, GradeId from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_pms ON hrm_employee.EmployeeID=hrm_employee_pms.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$YearId." AND hrm_employee_pms.HOD_EmployeeID=".$EmployeeId." order by EmpCode ASC", $con); $sno=1; while($res=mysql_fetch_array($sql)){ ?>     		
		<tr bgcolor="#FFFFFF" style="height:20px;">
	        <td align="center" style="font:Georgia; font-size:11px; width:30px;"><?php echo $sno; ?></td>
	        <td align="center" style="font:Georgia; font-size:11px; width:50px;"><?php echo $res['EmpCode']; ?></td>
			<td align="" style="font:Georgia; font-size:11px; width:180px;"><?php echo $res['Fname'].' '.$res['Sname'].' '.$res['Lname']; ?></td>
<?php $sql2=mysql_query("select DesigCode from hrm_designation where DesigId=".$res['HR_CurrDesigId'], $con); $res2=mysql_fetch_assoc($sql2);?>
            <td align="" style="font:Georgia; font-size:11px; width:120px;">
	        <input type="hidden" id="EmpDesig_<?php echo $sno; ?>" value="<?php echo $res['HR_CurrDesigId']; ?>" />
	  <?php echo $res2['DesigCode'];?></td>
<?php $sql3=mysql_query("select GradeValue from hrm_grade where GradeId=".$res['HR_CurrGradeId'], $con); $res3=mysql_fetch_assoc($sql3);?>		  
	        <td align="center" style="font:Georgia; font-size:11px; width:40px;">
	        <input type="hidden" id="EmpGrade_<?php echo $sno; ?>" value="<?php echo $res['HR_CurrGradeId']; ?>" />
			<?php echo $res3['GradeValue']; ?></td>
			
			
			
<?php $sql5=mysql_query("select DesigCode from hrm_designation where DesigId=".$res['Appraiser_EmpDesignation'], $con); $res5=mysql_fetch_assoc($sql5);?>			
			<td align="" style="font:Georgia; font-size:11px; width:120px;">
			<a href="#" onClick="AppName(<?php echo $res['Appraiser_EmployeeID']; ?>)"><?php echo $res5['DesigCode'];?></a></td>
<?php $sql6=mysql_query("select DesigCode from hrm_designation where DesigId=".$res['Reviewer_EmpDesignation'], $con); $res6=mysql_fetch_assoc($sql6);?>			
			<td align="" style="font:Georgia; font-size:11px; width:120px;">
			<a href="#" onClick="RevName(<?php echo $res['Reviewer_EmployeeID']; ?>)"><?php echo $res6['DesigCode'];?></a></td>			
			<td align="center" style="font:Georgia; font-size:11px; width:150px;" valign="top">
			
<?php $sqlG = mysql_query("SELECT GradeValue FROM hrm_grade WHERE GradeId=".$res['HR_CurrGradeId'], $con); $resG = mysql_fetch_assoc($sqlG); 
      if($resG['GradeValue']!='MG'){ $NextGradeId=$res['HR_CurrGradeId']+1; $NextGradeId2=$res['HR_CurrGradeId']+2;  
	  $sqlG2 = mysql_query("SELECT GradeValue FROM hrm_grade WHERE GradeId=".$NextGradeId, $con); $resG2 = mysql_fetch_assoc($sqlG2); 
          $sqlG3 = mysql_query("SELECT GradeValue FROM hrm_grade WHERE GradeId=".$NextGradeId2, $con); $resG3 = mysql_fetch_assoc($sqlG3); 
	  $NextGrade=$resG2['GradeValue']; $NextGrade2=$resG3['GradeValue'];}
	  elseif($resG['GradeValue']=='MG'){$NextGrade=$resG['GradeValue'];}
	  //$NextGrade=$resG['GradeValue']+1; $NextGrade2=$resG['GradeValue']+2; ?> 				
		
<select style="width:145px; height:20px; background-color:#CEFFCE;font-size:12px;" id="DesigId_<?php echo $sno; ?>" onChange="FunDesig(this.value,<?php echo $sno; ?>)" disabled>
<?php if($res['Hod_EmpDesignation']!=0) { $sqlD = mysql_query("SELECT DesigCode FROM hrm_designation WHERE DesigId=".$res['Hod_EmpDesignation'], $con); $resD = mysql_fetch_assoc($sqlD); ?><option style="background-color:#FFFFFF;" value="<?php echo $res['Hod_EmpDesignation']; ?>"><?php echo $resD['DesigCode']; ?></option>
<?php } elseif($res['Hod_EmpDesignation']==0) { ?><option style="background-color:#FFFFFF;" value="<?php echo $res['HR_CurrDesigId']; ?>"><?php echo $res2['DesigCode']; ?></option><?php } ?>
<?php $sqlEx=mysql_query("select hrm_deptgradedesig.DesigId,DesigName from hrm_deptgradedesig INNER JOIN hrm_designation ON hrm_deptgradedesig.DesigId=hrm_designation.DesigId where DepartmentId=".$res['DepartmentId']." AND (GradeId=".$NextGradeId." OR GradeId_2=".$NextGradeId." OR GradeId_3=".$NextGradeId." OR GradeId_4=".$NextGradeId." OR GradeId_5=".$NextGradeId.") order by DesigName ASC", $con); while($resEx=mysql_fetch_assoc($sqlEx)){ ?>
<option style="background-color:#FFFFFF;" value="<?php echo $resEx['DesigId']; ?>"><?php echo strtoupper($resEx['DesigName']); ?></option>
<?php } ?>
</select>

<?php /* $sqlDept = mysql_query("SELECT DesigId FROM hrm_deptgradedesig WHERE DepartmentId=".$res['DepartmentId']." AND (GradeId=".$NextGrade." OR GradeId=".$NextGrade2.")", $con); while($resDept = mysql_fetch_assoc($sqlDept)) { 
      $sqlDesig = mysql_query("SELECT DesigCode FROM hrm_designation WHERE DesigId=".$resDept['DesigId'], $con); $resDesig = mysql_fetch_assoc($sqlDesig); ?>    
<option style="background-color:#FFFFFF;" value="<?php echo $resDept['DesigId']; ?>"><?php echo $resDesig['DesigCode']; ?></option><?php } */ ?>
</td>

 


<?php $sql7=mysql_query("select GradeValue from hrm_grade where GradeId=".$res['Appraiser_EmpGrade'], $con); $res7=mysql_fetch_assoc($sql7);?>			
		    <td align="center" style="font:Georgia; font-size:11px; width:50px;"><?php echo $res7['GradeValue'];?></td>
<?php $sql8=mysql_query("select GradeValue from hrm_grade where GradeId=".$res['Reviewer_EmpGrade'], $con); $res8=mysql_fetch_assoc($sql8);?>			
		    <td align="center" style="font:Georgia; font-size:11px; width:50px;"><?php echo $res8['GradeValue'];?></td>					
		    <td align="center" style="font:Georgia; font-size:11px; width:50px;" valign="top">
<span id="SpanGarde_<?php echo $sno; ?>">
	        <select style="width:48px; height:20px; background-color:#CEFFCE;font-size:12px;" id="GradeId_<?php echo $sno; ?>" disabled>
<?php if($res['Hod_EmpGrade']!=0) { $sqlG = mysql_query("SELECT GradeValue FROM hrm_grade WHERE GradeId=".$res['Hod_EmpGrade'], $con); $resG = mysql_fetch_assoc($sqlG);?><option style="background-color:#FFFFFF;" value="<?php echo $res['Hod_EmpGrade']; ?>"><?php echo $resG['GradeValue']; ?></option>
<?php } else { ?><option style="background-color:#FFFFFF;" value="<?php echo $res['HR_CurrGradeId']; ?>"><?php echo $res3['GradeValue']; ?></option> <?php } ?> 
<option style="background-color:#FFFFFF;" value="<?php echo $NextGradeId; ?>"><?php echo $NextGrade; ?></option>
<option style="background-color:#FFFFFF;" value="<?php echo $NextGradeId2; ?>"><?php echo $NextGrade2; ?></option>
</select>
</span>
</td>		

	<td align="center" style="font:Georgia; font-size:11px; width:50px;"><a href="#" onClick="JustiApp(<?php echo $res['EmpPmsId'].','.$res['EmployeeID']; ?>)">Click</a></td>
	<td align="center" style="font:Georgia; font-size:11px; width:50px;"><a href="#" onClick="JustiRev(<?php echo $res['EmpPmsId'].','.$res['EmployeeID']; ?>)">Click</a></td>
			<td align="center" style="font:Georgia; font-size:11px; width:370px;" valign="top">
			<input name="Justification_<?php echo $sno; ?>" id="Justification_<?php echo $sno; ?>" style="border-style:hidden; border:0; background-color:#CEFFCE; width:368px;" height="20" value="<?php echo $res['Hod_Justification'];?>" disabled maxlength="250"/></td>
			<td align="center" style="font:Georgia; font-size:11px; width:50px;">
			<SPAN id="SpanEdit_<?php echo $sno; ?>"><img src="images/edit.png" border="0" onClick="ClickEdit(<?php echo $sno; ?>)"/></SPAN>
			<SPAN id="SpanEditSave_<?php echo $sno; ?>" style="display:none;">
			<img src="images/Floppy-Small-icon.png" border="0" onClick="return ClickSaveEdit(<?php echo $sno.','.$res['EmpPmsId'].','.$res['EmployeeID']; ?>)"></SPAN>  
			</td>
		 </tr>
<?php $sno++;} $no=$sno-1; echo '<input type="hidden" id="RowNo" value="'.$no.'" />';?> 
		</table>
		</span>		
	   </td>
       </td>
		  <td id="EmpAppraisalInc" style="display:none;">
	      <span id="EmpAppraisalSpanInc">&nbsp;</span>
		 </td>
      <?php //************************************************ Close ******************************// ?>	  	   
	</tr>
  </table>
   </td>
 </tr>
          </table>
<?php /***************** Draft **************************/ ?>		 
		 <td id="Draft" style="width:900px;display:none;">&nbsp;</td>
<?php /***************** MyKra **************************/ ?>		 
		 <td id="MyKra" style="width:900px;display:none;">&nbsp;</td>
<?php /***************** MyAppraisal **************************/ ?>		 
		 <td id="MyAppraisal" style="width:900px;display:none;">&nbsp;</td>
<?php /****************************************** Form Close **************************/ ?>		   
		</tr>
	  </table>
	</td>
   </tr>
<?php //******************************************** ?>    
  </table>
 </td>
</tr>					
<?php //*************************************************************** Close ******************************************************************************** ?>					
				  </table>
				 </td>
			  </tr>
			  <tr>
			     <td>&nbsp;</td>
			     <td align="Right" class="fontButton" width="550">
				   </td>
		      </tr>
			   </form>
			</table>
           </td>
			  </tr>
	        </table>
<?php //*************************************************************************************************************************************************** ?>
		   </td>
		  </tr>
		</table>
	  </td>
	</tr>
	<tr>
	  <td valign="top" align="center">
	    <table border="0" style="margin-top:0px;">
				<tr>
	              <td align="center"><img src="images/home1.png"></td>
				</tr>
	    </table>
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



