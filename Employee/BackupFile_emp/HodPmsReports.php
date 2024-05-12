<?php session_start();
if($_SESSION['login'] = true){require_once('../AdminUser/config/config.php');}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('../AdminUser/logcheck.php');
if($_SESSION['logCheckEmp']!=$logemp){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('EmpMenuSession.php');}else{header('Location:../index.php');}
//include("SetKraPmsy.php");
?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<link type="text/css" href="css/mycss.css" rel="stylesheet"/>
<script src="../AdminUser/js/jquery-1.9.1.js"></script>
<script type="text/javascript" src="../AdminUser/js/jquery.freezeheader.js"></script>
<script>$(document).ready(function () { $("#table1").freezeHeader({ 'height':'500px' }); })</script>
<script type="text/javascript" language="javascript">
function SelectHQEmpInc(value1,value2,value3){  
  var D=document.getElementById('DeE').value; var S=document.getElementById('StE').value; var H=document.getElementById('HQE').value; window.location= 'HodPmsReports.php?FilD='+D+'&FilS='+S+'&FilH='+H+'&ee=1&aa=1&rr=1&hh=0&sh=1&hp=1&fr=1&kr=1&fq=1&prt=1&msg=1&pd=1&mt=1&mts=1&scr=1&prom=1&inc=1&incr=1&pmsr=0&rg=1&h=1&fachiv=1&fa=1&fb=1&ffeedb=1&org=1';
} 

function SelectStateEmpInc(value1,value2,value3){  
  var D=document.getElementById('DeE').value; var S=document.getElementById('StE').value; var H=document.getElementById('HQE').value; window.location= 'HodPmsReports.php?FilD='+D+'&FilS='+S+'&FilH='+H+'&ee=1&aa=1&rr=1&hh=0&sh=1&hp=1&fr=1&kr=1&fq=1&prt=1&msg=1&pd=1&mt=1&mts=1&scr=1&prom=1&inc=1&incr=1&pmsr=0&rg=1&h=1&fachiv=1&fa=1&fb=1&ffeedb=1&org=1';
} 

function SelectDeptEmp(value1,value2,value3){ 
  var D=document.getElementById('DeE').value; var S=document.getElementById('StE').value; var H=document.getElementById('HQE').value; window.location= 'HodPmsReports.php?FilD='+D+'&FilS='+S+'&FilH='+H+'&ee=1&aa=1&rr=1&hh=0&sh=1&hp=1&fr=1&kr=1&fq=1&prt=1&msg=1&pd=1&mt=1&mts=1&scr=1&prom=1&inc=1&incr=1&pmsr=0&rg=1&h=1&fachiv=1&fa=1&fb=1&ffeedb=1&org=1';
} 

function FunFresh(){ window.location= "HodPmsReports.php?ee=1&aa=1&rr=1&hh=0&sh=1&hp=1&fr=1&kr=1&fq=1&prt=1&msg=1&pd=1&mt=1&mts=1&scr=1&prom=1&inc=1&incr=1&pmsr=0&rg=1&h=1&fachiv=1&fa=1&fb=1&ffeedb=1&org=1"; }

function PrintReport(v,v1) 
{ window.open ("HodPrintAppReport.php?e="+v+"&y="+v1,"AppReport","menubar=yes,scrollbars=yes,resizable=1,width=1200,height=600");}

function ExportReport(v,v1,v2) 
{ window.open ("HodExportPmsReport.php?e="+v+"&y="+v1+"&c="+v2,"Export","menubar=yes,scrollbars=yes,resizable=1,width=20,height=20");}
</script>
</head>
<body class="body"> 
<table class="table">
<tr><td><table class="menutable"><tr><td><?php if($_SESSION['login'] = true){ require_once("EMenu.php"); } ?></td></tr></table></td></tr>
<tr>
 <td>
 <table width="100%" style="margin-top:0px;">
  <tr><td valign="top"><?php if($_SESSION['login'] = true){ require_once("EWelcome.php"); } ?></td></tr>
  <tr>
   <td valign="top" style="background-image:url(images/pmsback.png);width:100%;">
   <table border="0" style="width:100%;height:500px;float:none;" cellpadding="0">
   <tr>
    <td valign="top" style="width:100%;">      
    <table border="0" id="Activity" style="width:100%;">
	<tr>
     <td style="width:100%;" valign="top">
	 <table border="0" style="width:100%;">
<?php //*************************************** Start ********************************************* ?>	
<?php //*************************************** Start ********************************************* ?>
					
<tr>
 <td>	 
 <table style="width:100%;">
<!--  Head Parts Open Open Open  --> 
<!--  Head Parts Open Open Open  --> 
 <tr>
  <td>
   <table>
    <tr>
<?php if($_SESSION['EmpType']=='E'){ ?>
<td align="center" valign="top"><a href="pms.php?log=<?php echo $_SESSION['logCheckEmp']; ?>&ee=0&aa=1&rr=1&hh=1&sh=1&hp=1&rr2=1&fr=1&kr=1&fq=1&prt=1&msg=1&pd=0&mt=1&mts=1&scr=1&prom=1&inc=1&incr=1&pmsr=1&rg=1&h=1&fachiv=1&fa=1&fb=1&ffeedb=1&org=1"><img id="Img_emp1" style="display:<?php if($_REQUEST['ee']==1){echo 'block';}else{echo 'none';} ?>;" src="images/emp1.png" border="0"/></a></td>

<?php } if($_SESSION['BtnApp']>0) { ?>
<td align="center" valign="top"><a href="ManagerPms.php?ee=1&aa=0&rr=1&rr2=1&hh=1&sh=1&hp=1&fr=1&kr=1&fq=1&prt=1&msg=1&pd=1&mt=0&mts=1&scr=1&prom=1&inc=1&incr=1&pmsr=1&rg=1&h=1&fachiv=1&fa=1&fb=1&ffeedb=1&org=1"><img id="Img_manager1" style="display:<?php if($_REQUEST['aa']==1){echo 'block';}else{echo 'none';} ?>;" src="images/manager1.png" border="0"/></a></td></td>
		   
<?php } if($_SESSION['BtnRev']>0) { ?>
<td align="center" valign="top"><a href="HodPms.php?ee=1&aa=1&rr2=1&rr=0&hh=1&sh=1&hp=1&fr=1&kr=1&fq=1&prt=1&msg=1&pd=1&mt=0&mts=1&scr=1&prom=1&inc=1&incr=1&pmsr=1&rg=1&h=1&fachiv=1&fa=1&fb=1&ffeedb=1&org=1"><img id="Img_hod1" src="images/hod1.png" border="0"/></a></td>

<?php } if($_SESSION['BtnRev2']>0) { ?>
<td align="center" valign="top"><a href="Rev2HodPms.php?ee=1&rr2=0&aa=1&rr=1&hh=0&sh=1&hp=1&fr=1&kr=1&fq=1&prt=1&msg=1&pd=1&mt=1&mts=0&scr=1&prom=1&inc=1&incr=1&pmsr=1&rg=1&h=1&fachiv=1&fa=1&fb=1&ffeedb=1&org=1"><img id="Img_hod1" src="images/RevHod1.png" border="0"/></a></td>	
		   
<?php } if($_SESSION['BtnHod']>0) { ?>
<td align="center" valign="top"><img id="Img_hod1" src="images/m.png" border="0"/></td><?php } ?>

<?php /******************** Msg Msg Msg Msg Msg Msg Msg Msg Msg Msg Msg Msg OPEN************/ ?>
<?php if($_SESSION['eMsg']=='Y'){ ?>
 <td>
 <?php $CuDate=date("Y-m-d"); if(($_SESSION['eAppform']=='Y' OR $_SESSION['eMidform']=='Y') AND $CuDate>=$_SESSION['hFrom'] AND $CuDate<=$_SESSION['hTo'] AND $_SESSION['hSts']=='A'){ $LastDate=$_SESSION['hTo']; $CurrentDate=date("Y-m-d");
		 $diff = abs(strtotime($LastDate) - strtotime($CurrentDate));
         $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/(60*60*24)); ?>
 <font class="msg_r"><font color="#00366C">&nbsp;&nbsp;PMS :</font><span class="blink_me"> <?php echo $days;?> Days Remaining! Last date : <?php echo date("d-F",strtotime($_SESSION['hTo'])); ?> </span></font>
 <?php } ?>
 </td>
<?php } ?>
<?php /******************** Msg Msg Msg Msg Msg Msg Msg Msg Msg Msg Msg Msg CLOSE************/ ?>
 
	</tr>
   </table>
  </td>
 </tr>
 
 <tr><td style="vertical-align:top;width:100%;"><?php include("SetKraPmsmh.php"); ?></td></tr>
<!--  Head Parts Close Close Close  --> 
<!--  Head Parts Close Close Close  --> 
 
  <tr>
    <td style="width:100%;">
	  <table border="0" style="width:100%;">
	    <tr>
        <?php /****************************************** Form Start **************************/ ?>
		<?php /****************************************** Form Start **************************/ ?>
	
<input type="hidden" id="FormAMin5" value="" /><input type="hidden" id="FormAMax5" value="" />
<input type="hidden" id="FormBMin5" value="" /><input type="hidden" id="FormBMax5" value="" />
<input type="hidden" id="YearId" value="<?php echo $YearId; ?>" />
<input type="hidden" id="EmployeeId" value="<?php echo $EmployeeId; ?>" />
<input type="hidden" id="EmpId" value="" /> <input type="hidden" id="PmsId" value="" />
<?php /***************** PersonalDetails **************************/ ?>	

 		  <td id="TeamDetails" style="display:block;width:100%;">
		  <table border="0" style="width:100%;">
<tr>
 <td style="width:100%;">
  <table border="0" style="width:100%;" cellspacing="0">
   <tr>
    <td class="formh" style="width:180px;">(<i>Team PMS Reports</i>) :&nbsp;</td>
	<?php if($_SESSION['hStatus']=='Y'){ ?>
	<td class="tdd" style="width:80px;"><b>Department:</b></td>
    <td class="td1" style="width:100px;"><select class="tdsel" name="DeE" id="DeE" onChange="SelectDeptEmp(this.value,<?php echo $EmployeeId.','.$_SESSION['PmsYId']; ?>)"><?php if($_REQUEST['FilD']>0){ $sqlde=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$_REQUEST['FilD'],$con); $resde=mysql_fetch_assoc($sqlde); ?><option value="<?php echo $_REQUEST['FilD']; ?>" selected><?php echo $resde['DepartmentCode']; ?></option><?php }else{ ?><option value="All" selected>All</option><?php } $SqlDept=mysql_query("select HR_Curr_DepartmentId,DepartmentName,DepartmentCode from hrm_employee_pms pms inner join hrm_department d on pms.HR_Curr_DepartmentId=d.DepartmentId where AssessmentYear=".$_SESSION['PmsYId']." AND pms.CompanyId=".$CompanyId." AND HOD_EmployeeID=".$EmployeeId." group by HR_Curr_DepartmentId order by DepartmentName ASC"); while($ResDept=mysql_fetch_array($SqlDept)) { ?><option value="<?php echo $ResDept['HR_Curr_DepartmentId']; ?>"><?php echo $ResDept['DepartmentCode'];?></option><?php } ?><option value="All">All</option></select></td>
	<td class="tddr" style="width:40px;"><b>State:</b></td>
	<td class="td1" style="width:150px;"><select class="tdsel" name="StE" id="StE" onChange="SelectStateEmpInc(this.value,<?php echo $EmployeeId.','.$_SESSION['PmsYId']; ?>)"><?php if($_REQUEST['FilS']>0){ $sqlSe=mysql_query("select StateName from hrm_state where StateId=".$_REQUEST['FilS'],$con); $resSe=mysql_fetch_assoc($sqlSe); ?><option value="<?php echo $_REQUEST['FilS']; ?>" selected><?php echo $resSe['StateName']; ?></option><?php }else{ ?><option value="All" selected>All</option><?php } $SqlSt=mysql_query("select st.* from hrm_state st inner join hrm_headquater hq on st.StateId=hq.StateId inner join hrm_employee_general g on hq.HqId=g.HqId inner join hrm_employee_pms pms on g.EmployeeID=pms.EmployeeID where pms.HOD_EmployeeID=".$EmployeeId." AND hq.CompanyId=".$CompanyId." group by st.StateId order by StateName ASC"); while($ResSt=mysql_fetch_array($SqlSt)) { ?><option value="<?php echo $ResSt['StateId']; ?>"><?php echo $ResSt['StateName'];?></option><?php } ?><option value="All">All</option></select></td>
	
	<input type="hidden" id="HQE" name="HQE" value="0"/>
	<?php /*?><td class="tdr" style="width:40px;color:#FFFFFF;">HQ:</td>
    <td class="td1" style="width:120px;"><select class="tdsel" name="HQE" id="HQE" onChange="SelectHQEmpInc(this.value,<?php echo $EmployeeId.','.$_SESSION['PmsYId']; ?>)"><option value="All" style="margin-left:0px; background-color:#84D9D5;" selected>All</option><?php $SqlHQ=mysql_query("select hq.* from hrm_headquater hq inner join hrm_employee_general g on hq.HqId=g.HqId inner join hrm_employee_pms pms on g.EmployeeID=pms.EmployeeID where pms.HOD_EmployeeID=".$EmployeeId." AND hq.CompanyId=".$CompanyId." group by hq.HqId order by HqName ASC", $con); while($ResHQ=mysql_fetch_array($SqlHQ)) { ?><option value="<?php echo $ResHQ['HqId']; ?>"><?php echo $ResHQ['HqName'];?></option><?php } ?><option value="All">All</option></select></td><?php */?>
       
	<?php } ?>
	<td class="tdc" style="width:50px;"><a href="#" onClick="FunFresh()">Refresh</a></td>
	<td class="tdc" style="width:120px;"><?php /*<a href="#" onClick="ExportReport(<?php echo $EmployeeId.','.$_SESSION['PmsYId'].','.$CompanyId; ?>)">Export_Reports</a>*/?> </td>
	<td class="tdr" style="width:400px;vertical-align:middle;">&nbsp;</td>	
	
   </tr>
  </table>
 </td>
</tr>
	
<!--<tr>
<td>
<table border="0">
<tr>
 <td class="td1">
 <font color="#FFFF9D">PG :&nbsp;</font><font color="#004600">Proposed Grade,&nbsp;&nbsp;</font>
 <font color="#FFFF9D">PGSPM :&nbsp;</font><font color="#004600">Proposed Gross Salary Per Month,&nbsp;&nbsp;</font>
 <font color="#FFFF9D">TPGSPM :&nbsp;</font><font color="#004600">Total PGSPM,&nbsp;&nbsp;</font>
 <font color="#FFFF9D">PIS :&nbsp;</font><font color="#004600">Proposed Increment Salary,&nbsp;&nbsp;</font>
 <font color="#FFFF9D">SC :&nbsp;</font><font color="#004600">Salary Correction,&nbsp;&nbsp;</font>
 <font color="#FFFF9D">TISPM :&nbsp;</font><font color="#004600">Total Increment Salary Per Month,&nbsp;&nbsp;</font>
 </td>
</tr>
</table>
</td>
</tr>-->
  
  	     
<tr>
 <td style="width:100%;">
 <table border="0" style="width:100%;">
  <tr>
<?php //********************** Start *************************// ?>
   <td style="width:100%;">
   <span id="MyTeamSpan"></span>	   
   <span id="MyTeam">
   <table border="1" id="table1" cellspacing="1" style="width:100%;">
    <div id="thead">
	<thead>
	<tr bgcolor="#7a6189" style="height:24px;">
	 <td class="th" style="width:3%;">Sn</td>
	 <td class="th" style="width:3%;">EC</td>
	 <td class="th" style="width:14%;">Name</td>
	 <td class="th" style="width:8%;">Department</td>
	 <td class="th" style="width:12%;">Designation</td>
	 <td class="th" style="width:3%;">Grade</td>
	 <td class="th" style="width:7%;">State</td>			
	 <td class="th" style="width:4%;">Score</td>
	 <td class="th" style="width:4%;">Rating</td>
	 <td class="th" style="width:12%;">Proposed Designation</td>
	 <td class="th" style="width:5%;">PG</td>
	 <td class="th" style="width:5%;">Proposed<br>CTC</td>
	 <td class="th" style="width:5%;">% CTC</td>
	 <td class="th" style="width:5%;">CTC<br>Correction</td>
	 <td class="th" style="width:5%;">%<br>Correction</td>
	 <td class="th" style="width:5%;">Total<br>Increment</td>
	 <td class="th" style="width:5%;">%<br>Total</td>
	 <td class="th" style="width:5%;">Total<br>Proposed</td>
    </tr> 
	</thead>
	</div>	
<?php 
if($_REQUEST['FilD']>0 AND $_REQUEST['FilS']=='All')
{
 $sql=mysql_query("select e.EmployeeID, EmpCode, Fname, Sname, Lname, d.DepartmentId, DateJoining, DepartmentCode, DesigName, GradeValue, EmpPmsId, g.HqId, Reviewer_TotalFinalScore, Reviewer_TotalFinalRating, Reviewer_EmpDesignation, Reviewer_EmpGrade, Hod_TotalFinalScore, Hod_TotalFinalRating, Hod_EmpDesignation, Hod_EmpGrade, Hod_ProIncSalary, Hod_Percent_ProIncSalary, Hod_ProCorrSalary, Hod_Percent_ProCorrSalary, Hod_IncNetMonthalySalary, Hod_Percent_IncNetMonthalySalary, Hod_GrossMonthlySalary, HR_CurrDesigId, HR_CurrGradeId, EmpCurrCtc, Hod_ProIncCTC, Hod_Percent_ProIncCTC, Hod_ProCorrCTC, Hod_Percent_ProCorrCTC, Hod_Proposed_ActualCTC, Hod_IncNetCTC, Hod_Percent_IncNetCTC from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID INNER JOIN hrm_employee_general g ON p.EmployeeID=g.EmployeeID INNER JOIN hrm_department d ON g.DepartmentId=d.DepartmentId INNER JOIN hrm_designation de on p.HR_CurrDesigId=de.DesigId INNER JOIN hrm_grade gr ON p.HR_CurrGradeId=gr.GradeId INNER JOIN hrm_headquater hq ON g.HqId=hq.HqId where e.EmpStatus='A' AND g.DateJoining<='".$_SESSION['AllowDoj']."' AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.HOD_EmployeeID=".$EmployeeId." AND g.DepartmentId=".$_REQUEST['FilD']." order by EmpCode ASC", $con);
}
elseif($_REQUEST['FilD']>0 AND $_REQUEST['FilS']>0)
{
 $sql=mysql_query("select e.EmployeeID, EmpCode, Fname, Sname, Lname, d.DepartmentId, DateJoining, DepartmentCode, DesigName, GradeValue, EmpPmsId, g.HqId, Reviewer_TotalFinalScore, Reviewer_TotalFinalRating, Reviewer_EmpDesignation, Reviewer_EmpGrade, Hod_TotalFinalScore, Hod_TotalFinalRating, Hod_EmpDesignation, Hod_EmpGrade, Hod_ProIncSalary, Hod_Percent_ProIncSalary, Hod_ProCorrSalary, Hod_Percent_ProCorrSalary, Hod_IncNetMonthalySalary, Hod_Percent_IncNetMonthalySalary, Hod_GrossMonthlySalary, HR_CurrDesigId, HR_CurrGradeId, EmpCurrCtc, Hod_ProIncCTC, Hod_Percent_ProIncCTC, Hod_ProCorrCTC, Hod_Percent_ProCorrCTC, Hod_Proposed_ActualCTC, Hod_IncNetCTC, Hod_Percent_IncNetCTC from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID INNER JOIN hrm_employee_general g ON p.EmployeeID=g.EmployeeID INNER JOIN hrm_department d ON g.DepartmentId=d.DepartmentId INNER JOIN hrm_designation de on p.HR_CurrDesigId=de.DesigId INNER JOIN hrm_grade gr ON p.HR_CurrGradeId=gr.GradeId INNER JOIN hrm_headquater hq ON g.HqId=hq.HqId where e.EmpStatus='A' AND g.DateJoining<='".$_SESSION['AllowDoj']."' AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.HOD_EmployeeID=".$EmployeeId." AND g.DepartmentId=".$_REQUEST['FilD']." AND hq.StateId=".$_REQUEST['FilS']." order by EmpCode ASC", $con);
}
elseif($_REQUEST['FilD']=='All' AND $_REQUEST['FilS']>0)
{
 $sql=mysql_query("select e.EmployeeID, EmpCode, Fname, Sname, Lname, d.DepartmentId, DateJoining, DepartmentCode, DesigName, GradeValue, EmpPmsId, g.HqId, Reviewer_TotalFinalScore, Reviewer_TotalFinalRating, Reviewer_EmpDesignation, Reviewer_EmpGrade, Hod_TotalFinalScore, Hod_TotalFinalRating, Hod_EmpDesignation, Hod_EmpGrade, Hod_ProIncSalary, Hod_Percent_ProIncSalary, Hod_ProCorrSalary, Hod_Percent_ProCorrSalary, Hod_IncNetMonthalySalary, Hod_Percent_IncNetMonthalySalary, Hod_GrossMonthlySalary, HR_CurrDesigId, HR_CurrGradeId, EmpCurrCtc, Hod_ProIncCTC, Hod_Percent_ProIncCTC, Hod_ProCorrCTC, Hod_Percent_ProCorrCTC, Hod_Proposed_ActualCTC, Hod_IncNetCTC, Hod_Percent_IncNetCTC from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID INNER JOIN hrm_employee_general g ON p.EmployeeID=g.EmployeeID INNER JOIN hrm_department d ON g.DepartmentId=d.DepartmentId INNER JOIN hrm_designation de on p.HR_CurrDesigId=de.DesigId INNER JOIN hrm_grade gr ON p.HR_CurrGradeId=gr.GradeId INNER JOIN hrm_headquater hq ON g.HqId=hq.HqId where e.EmpStatus='A' AND g.DateJoining<='".$_SESSION['AllowDoj']."' AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.HOD_EmployeeID=".$EmployeeId." AND hq.StateId=".$_REQUEST['FilS']." order by EmpCode ASC", $con);
}
elseif(($_REQUEST['FilD']=='All' AND $_REQUEST['FilS']=='All') OR ($_REQUEST['FilD']=='' AND $_REQUEST['FilS']==''))
{
 $sql=mysql_query("select e.EmployeeID, EmpCode, Fname, Sname, Lname, d.DepartmentId, DateJoining, DepartmentCode, DesigName, GradeValue, EmpPmsId, g.HqId, Reviewer_TotalFinalScore, Reviewer_TotalFinalRating, Reviewer_EmpDesignation, Reviewer_EmpGrade, Hod_TotalFinalScore, Hod_TotalFinalRating, Hod_EmpDesignation, Hod_EmpGrade, Hod_ProIncSalary, Hod_Percent_ProIncSalary, Hod_ProCorrSalary, Hod_Percent_ProCorrSalary, Hod_IncNetMonthalySalary, Hod_Percent_IncNetMonthalySalary, Hod_GrossMonthlySalary, HR_CurrDesigId, HR_CurrGradeId, EmpCurrCtc, Hod_ProIncCTC, Hod_Percent_ProIncCTC, Hod_ProCorrCTC, Hod_Percent_ProCorrCTC, Hod_Proposed_ActualCTC, Hod_IncNetCTC, Hod_Percent_IncNetCTC from hrm_employee_pms p INNER JOIN hrm_employee e ON p.EmployeeID=e.EmployeeID INNER JOIN hrm_employee_general g ON p.EmployeeID=g.EmployeeID INNER JOIN hrm_department d ON g.DepartmentId=d.DepartmentId INNER JOIN hrm_designation de on p.HR_CurrDesigId=de.DesigId INNER JOIN hrm_grade gr ON p.HR_CurrGradeId=gr.GradeId INNER JOIN hrm_headquater hq ON g.HqId=hq.HqId where e.EmpStatus='A' AND g.DateJoining<='".$_SESSION['AllowDoj']."' AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.HOD_EmployeeID=".$EmployeeId." order by EmpCode ASC", $con);
}	 
$sno=1; while($res=mysql_fetch_array($sql)){
$sql5=mysql_query("select StateCode from hrm_state INNER JOIN hrm_headquater ON hrm_state.StateId=hrm_headquater.StateId where hrm_headquater.HqId=".$res['HqId'], $con); $res5=mysql_fetch_assoc($sql5);
?>   
    <div id="tbody">
	<tbody>  				
    <tr style="height:22px;background-color:#FFFFFF;">
     <td class="tdc"><?php echo $sno; ?></td>
	 <td class="tdc"><?php echo $res['EmpCode']; ?></td>
	 <td class="tdl"><?php echo $res['Fname'].' '.$res['Sname'].' '.$res['Lname']; ?></td>
	 <td class="tdl"><?php echo $res['DepartmentCode'];?></td>			
	 <td class="tdl"><?php echo $res['DesigName'];?></td>			
	 <td class="tdc"><?php echo $res['GradeValue'];?></td>			
	 <td class="tdc"><?php echo $res5['StateCode'];?></td>
	 <td class="tdc" style="background-color:#FFDDDD;"><?php if($res['Hod_TotalFinalScore']>0){echo $res['Hod_TotalFinalScore']; } else {echo $res['Reviewer_TotalFinalScore'];} ?></td>	
	 <td class="tdc" style="background-color:#FFDDDD;"><?php  if($res['Hod_TotalFinalRating']>0){echo $res['Hod_TotalFinalRating']; } else {echo $res['Reviewer_TotalFinalRating'];} ?></td>

<?php if($res['Hod_EmpDesignation']!=0 AND $res['Hod_EmpDesignation']>0) {$sqlHD=mysql_query("select DesigName from hrm_designation where DesigId=".$res['Hod_EmpDesignation'], $con); $resHD=mysql_fetch_assoc($sqlHD);} 
if($res['Hod_EmpGrade']!=0 AND $res['Hod_EmpGrade']>0) {$sqlHG=mysql_query("select GradeValue from hrm_grade where GradeId=".$res['Hod_EmpGrade'], $con); $resHG=mysql_fetch_assoc($sqlHG);} ?>					
	
	 <td class="tdl" style="background-color:#C4FFC4;"><?php if($res['Hod_EmpDesignation']>0 AND $res['Hod_EmpDesignation']!=$res['HR_CurrDesigId']) { echo $resHD['DesigName'];} ?></td>	
	 <td class="tdc" style="background-color:#C4FFC4;"><?php if($res['Hod_EmpGrade']>0 AND $res['Hod_EmpGrade']!=$res['HR_CurrGradeId']) { echo $resHG['GradeValue'];} ?></td>		
     <td class="tdr" style="background-color:#BFDFFF;"><?php echo floatval($res['Hod_ProIncCTC']); ?></td>
     <td class="tdc" style="background-color:#BFDFFF;"><?php echo $res['Hod_Percent_ProIncCTC']; ?></td>	
     <td class="tdr" style="background-color:#FFFFB9;"><?php echo floatval($res['Hod_ProCorrCTC']); ?></td>
     <td class="tdc" style="background-color:#FFFFB9;"><?php echo $res['Hod_Percent_ProCorrCTC']; ?></td>	
     <td class="tdr" style="background-color:#DDDDFF;"><?php echo floatval($res['Hod_IncNetCTC']); ?></td>
     <td class="tdc" style="background-color:#DDDDFF;"><?php echo $res['Hod_Percent_IncNetCTC']; ?></td>	
     <td class="tdr" style="background-color:#FFC68C;"><?php echo floatval($res['Hod_Proposed_ActualCTC']);?></td>
    </tr>
	</tbody>
	</div>
<?php $sno++;} ?>		
   </table>
   </span>
   </td>
<?php //************************************************ Close ******************************// ?>	  	   
	
   </tr>
  </table>
 </td>
</tr>
         </table>
		</td>		   
	   </tr>
	  </table>
	 </td>
    </tr>
  
  </table>
 </td>
</tr>					
<?php //******************************** Close ***************************************** ?>					
				  </table>
				 </td>
			  </tr>
			  
			   </form>
			</table>
           </td>
			  </tr>
	        </table
><?php //*************************************************************************** ?>
		   </td>
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



