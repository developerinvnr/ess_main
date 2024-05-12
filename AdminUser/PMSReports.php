<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}
//****************************************************************************************************************
if($_REQUEST['YI']==1){$Y=2012; $Y2=2013;}elseif($_REQUEST['YI']==2){$Y=2013; $Y2=2014;}elseif($_REQUEST['YI']==3){$Y=2014; $Y2=2015;}elseif($_REQUEST['YI']==4){$Y=2015; $Y2=2016;}elseif($_REQUEST['YI']==5){$Y=2016; $Y2=2017;}elseif($_REQUEST['YI']==6){$Y=2017; $Y2=2018;}elseif($_REQUEST['YI']==7){$Y=2018; $Y2=2019;}elseif($_REQUEST['YI']==8){$Y=2019; $Y2=2020;}elseif($_REQUEST['YI']==9){$Y=2020; $Y2=2021;}
if($CompanyId==1 OR $CompanyId==2){$YYear=$Y;}elseif($CompanyId==3){$YYear=$Y2;}
?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet"/>
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style>.font4 { color:#1FAD34; font-family:Times New Roman; font-size:15px;} .All{font-size:11px; height:20px;} .All_80{font-size:11px; height:20px; width:80px;}
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
function SelectYear(v){window.location='PMSReports.php?YI='+v;}
function SelectAppRev(v){ var YId=document.getElementById("YId").value; window.location='PMSReports.php?action=AppRev&value='+v+'&YI='+YId;}
function SelectDeptScore(v){ var YId=document.getElementById("YId").value; window.location='PMSReports.php?action=DeptScore&value='+v+'&YI='+YId;}
function SelectHodScore(v){ var YId=document.getElementById("YId").value; window.location='PMSReports.php?action=HodScore&value='+v+'&YI='+YId;}
function SelectDeptInc(v){ var YId=document.getElementById("YId").value; window.location='PMSReports.php?action=DeptInc&value='+v+'&YI='+YId;}

function SelectStdDeptInc(v){ var YId=document.getElementById("YId").value; window.location='PMSReports.php?action=StdDeptInc&value='+v+'&YI='+YId+'&act=d&dept='+v;}
function StdIncGrade(v){ var YId=document.getElementById("YId").value; var StdValue=document.getElementById("StdValue").value; 
window.location='PMSReports.php?action=StdDeptInc&value='+StdValue+'&YI='+YId+'&act=g&dept='+StdValue+'&gg='+v; }
function StdIncDesig(v){ var YId=document.getElementById("YId").value; var StdValue=document.getElementById("StdValue").value; 
window.location='PMSReports.php?action=StdDeptInc&value='+StdValue+'&YI='+YId+'&act=de&dept='+StdValue+'&gg='+v; }
function StdIncDept(v){ var YId=document.getElementById("YId").value; var StdValue=document.getElementById("StdValue").value; 
window.location='PMSReports.php?action=StdDeptInc&value='+StdValue+'&YI='+YId+'&act=dept&dept='+StdValue+'&gg='+v; }

function SelectHodInc(v){ var YId=document.getElementById("YId").value; window.location='PMSReports.php?action=HodInc&value='+v+'&YI='+YId;}
function SelectIncHistory(v){ var YId=document.getElementById("YId").value; window.location='PMSReports.php?action=IncHistory&value='+v+'&YI='+YId;}
function SelectKRA(v){ var YId=document.getElementById("YId").value; window.location='PMSReports.php?action=KRA&value='+v+'&YI='+YId;}
function SelectKRAName(v){ var YId=document.getElementById("YId").value; window.location='PMSReports.php?action=KRAName&value='+v+'&YI='+YId;}
function SelectAchiv(v){ var YId=document.getElementById("YId").value; window.location='PMSReports.php?action=Achiv&value='+v+'&YI='+YId;}
function SelectFeed(v){ var YId=document.getElementById("YId").value; window.location='PMSReports.php?action=Feed&value='+v+'&YI='+YId;}
function SelectNFeed(v){ var YId=document.getElementById("YId").value; window.location='PMSReports.php?action=NFeed&value='+v+'&YI='+YId;}
function SelectTrain(v){ var YId=document.getElementById("YId").value; window.location='PMSReports.php?action=Train&value='+v+'&YI='+YId;}
function SelectOverAll(v){ var YId=document.getElementById("YId").value; window.location='PMSReports.php?action=Overall&value='+v+'&YI='+YId;}
function RatingGraph(v){ var YId=document.getElementById("YId").value; window.location='PMSReports.php?action=RatngGraph&value='+v+'&YI='+YId;}
function IncPercent(v){ var YId=document.getElementById("YId").value; window.location='PMSReports.php?action=IncPercent&value='+v+'&YI='+YId;}
function SelectHodIncAll(v){ var YId=document.getElementById("YId").value; window.location='PMSReports.php?action=IncHisAll&value='+v+'&YI='+YId;}
function OverAllGraph(v){ var YId=document.getElementById("YId").value; window.location='PMSReports.php?action=OverRatngGraph&value='+v+'&YI='+YId;}


function PrintAppRev(v)
{ var ComId=document.getElementById("ComId").value; var YId=document.getElementById("YId").value;
  window.open("PrintPMSReport.php?action=AppRev&value="+v+"&c="+ComId+"&y="+YId,"PrintForm","menubar=yes,scrollbars=yes,resizable=no,directories=no,width=1250,height=650");}

function PrintDeptScore(v)
{var ComId=document.getElementById("ComId").value; var YId=document.getElementById("YId").value;
 window.open("PrintPMSReport.php?action=DeptScore&value="+v+"&c="+ComId+"&y="+YId,"PrintForm","menubar=yes,scrollbars=yes,resizable=no,directories=no,width=1250,height=650");}

function PrintHodScore(v)
{var ComId=document.getElementById("ComId").value; var YId=document.getElementById("YId").value;
 window.open("PrintPMSReport.php?action=HodScore&value="+v+"&c="+ComId+"&y="+YId,"PrintForm","menubar=yes,scrollbars=yes,resizable=no,directories=no,width=1250,height=650");}

function PrintDeptInc(v)
{var ComId=document.getElementById("ComId").value; var YId=document.getElementById("YId").value;
 window.open("PrintPMSReport.php?action=DeptInc&value="+v+"&c="+ComId+"&y="+YId,"PrintForm","menubar=yes,scrollbars=yes,resizable=no,directories=no,width=1250,height=650");}

function PrintHodInc(v)
{var ComId=document.getElementById("ComId").value; var YId=document.getElementById("YId").value;
 window.open("PrintPMSReport.php?action=HodInc&value="+v+"&c="+ComId+"&y="+YId,"PrintForm","menubar=yes,scrollbars=yes,resizable=no,directories=no,width=1250,height=650");}
 
function PrintDumpKRA(v)
{var ComId=document.getElementById("ComId").value; var YId=document.getElementById("YId").value;
 window.open("PrintDumpKRA.php?action=KRA&value="+v+"&c="+ComId+"&y="+YId,"PrintForm","menubar=yes,scrollbars=yes,resizable=no,directories=no,width=1200,height=650");}
 
function PrintDumpKRAName(v)
{var ComId=document.getElementById("ComId").value; var YId=document.getElementById("YId").value;
 window.open("PrintDumpKRAName.php?action=KRA&value="+v+"&c="+ComId+"&y="+YId,"PrintForm","menubar=yes,scrollbars=yes,resizable=no,directories=no,width=1200,height=650");} 
 
function PrintAchiv(v)
{var ComId=document.getElementById("ComId").value; var YId=document.getElementById("YId").value;
 window.open("PrintDumpAchiv.php?action=Achiv&value="+v+"&c="+ComId+"&y="+YId,"PrintForm","menubar=yes,scrollbars=yes,resizable=no,directories=no,width=1200,height=650");}
 
function PrintFeed(v)
{var ComId=document.getElementById("ComId").value; var YId=document.getElementById("YId").value;
 window.open("PrintDumpFeed.php?action=Feed&value="+v+"&c="+ComId+"&y="+YId,"PrintForm","menubar=yes,scrollbars=yes,resizable=no,directories=no,width=1200,height=650");} 
 
function PrintNFeed(v)
{var ComId=document.getElementById("ComId").value; var YId=document.getElementById("YId").value;
 window.open("PrintDumpFeed.php?action=NFeed&value="+v+"&c="+ComId+"&y="+YId,"PrintForm","menubar=yes,scrollbars=yes,resizable=no,directories=no,width=1200,height=650");}  
 
function PrintTrain(v)
{var ComId=document.getElementById("ComId").value; var YId=document.getElementById("YId").value;
 window.open("PrintDumpTrain.php?action=Train&value="+v+"&c="+ComId+"&y="+YId,"PrintForm","menubar=yes,scrollbars=yes,resizable=no,directories=no,width=1200,height=650");} 
 

function PrintOverallDump(v)
{var ComId=document.getElementById("ComId").value; var YId=document.getElementById("YId").value;
 window.open("PrintOverallDump.php?action=Overall&value="+v+"&c="+ComId+"&y="+YId,"PrintForm","menubar=yes,scrollbars=yes,resizable=no,directories=no,width=1250,height=650");}

function OpenWindow(v,v1)
{window.open("HRScoreHistory.php?a="+v+"&b="+v1,"AppraisalForm","menubar=yes,scrollbars=yes,resizable=no,directories=no,width=1100,height=650");}

function UploadEmpfile(p,e)
{y=document.getElementById("YId").value; 
 window.open("CheckUploadAppFile.php?action=up&P="+p+"&E="+e+"&Y="+y,"UploadFile","menubar=no,scrollbars=yes,resizable='no',width=600,height=400");} 

function OpenIncHis (v,c)
{window.open("EmpIncHis.php??action=Inc&V="+v+"&C="+c,"IncHisForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=1100,height=500");}

function ExportAppRev(v)
{ var ComId=document.getElementById("ComId").value; var YId=document.getElementById("YId").value; var DeptValue=document.getElementById("DeptValue").value;  
  window.open("ReportPmsCSVAppRev.php?action=ExportAppRev&value="+v+"&C="+ComId+"&Y="+YId+"&value="+DeptValue,"PrintForm","menubar=yes,scrollbars=yes,resizable=no,directories=no,width=20,height=20");}
  
function ExportScore(v)
{ var ComId=document.getElementById("ComId").value; var YId=document.getElementById("YId").value; var DeptValue=document.getElementById("DeptValue").value;  
  window.open("ReportPmsCSVScore.php?action=ScoreExport&value="+v+"&C="+ComId+"&Y="+YId+"&value="+DeptValue,"PrintForm","menubar=yes,scrollbars=yes,resizable=no,directories=no,width=20,height=20");}
  
function ExportHodScore(v)
{ var ComId=document.getElementById("ComId").value; var YId=document.getElementById("YId").value; var DeptValue=document.getElementById("DeptValue").value;  
  window.open("ReportPmsCSVHodScore.php?action=ExportHodScore&value="+v+"&C="+ComId+"&Y="+YId+"&value="+DeptValue,"PrintForm","menubar=yes,scrollbars=yes,resizable=no,directories=no,width=20,height=20");}  
     
function ExportDeptInc(v)
{ var ComId=document.getElementById("ComId").value; var YId=document.getElementById("YId").value; var DeptValue=document.getElementById("DeptValue").value;  
  window.open("ReportPmsCSV.php?action=ExportDeptInc&value="+v+"&C="+ComId+"&Y="+YId+"&value="+DeptValue,"PrintForm","menubar=yes,scrollbars=yes,resizable=no,directories=no,width=20,height=20");}  
  
function ExportHodInc(v)
{ var ComId=document.getElementById("ComId").value; var YId=document.getElementById("YId").value; var DeptValue=document.getElementById("DeptValue").value;  
  window.open("ReportPmsCSVHodInc.php?action=ExportHodInc&value="+v+"&C="+ComId+"&Y="+YId+"&value="+DeptValue,"PrintForm","menubar=yes,scrollbars=yes,resizable=no,directories=no,width=20,height=20");}   
 
function ExportKRA(v)
{ var ComId=document.getElementById("ComId").value; var YId=document.getElementById("YId").value; var DeptValue=document.getElementById("DeptValue").value;  
  window.open("ReportPmsCSVKRA.php?action=ExportKRA&value="+v+"&C="+ComId+"&Y="+YId+"&value="+DeptValue,"PrintForm","menubar=yes,scrollbars=yes,resizable=no,directories=no,width=20,height=20");}	
  
function ExportKRAName(v)
{ var ComId=document.getElementById("ComId").value; var YId=document.getElementById("YId").value; var DeptValue=document.getElementById("DeptValue").value;  
  window.open("ReportPmsCSVKRAName.php?action=ExportKRA&value="+v+"&C="+ComId+"&Y="+YId+"&value="+DeptValue,"PrintForm","menubar=yes,scrollbars=yes,resizable=no,directories=no,width=20,height=20");}	  
   
function ExportAchiv(v)
{ var ComId=document.getElementById("ComId").value; var YId=document.getElementById("YId").value; var DeptValue=document.getElementById("DeptValue").value;  
  window.open("ReportPmsCSVAchiv.php?action=ExportAchiv&value="+v+"&C="+ComId+"&Y="+YId+"&value="+DeptValue,"PrintForm","menubar=yes,scrollbars=yes,resizable=no,directories=no,width=20,height=20");}  
  
function ExportFeed(v)
{ var ComId=document.getElementById("ComId").value; var YId=document.getElementById("YId").value; var DeptValue=document.getElementById("DeptValue").value;  
  window.open("ReportPmsCSVFeed.php?action=ExportFeed&value="+v+"&C="+ComId+"&Y="+YId+"&value="+DeptValue,"PrintForm","menubar=yes,scrollbars=yes,resizable=no,directories=no,width=20,height=20");}  
  
function ExportNFeed(v)
{ var ComId=document.getElementById("ComId").value; var YId=document.getElementById("YId").value; var DeptValue=document.getElementById("DeptValue").value;  
  window.open("ReportPmsCSVNFeed.php?action=ExportNFeed&value="+v+"&C="+ComId+"&Y="+YId+"&value="+DeptValue,"PrintForm","menubar=yes,scrollbars=yes,resizable=no,directories=no,width=20,height=20");}    
  
function ExportTrain(v)
{ var ComId=document.getElementById("ComId").value; var YId=document.getElementById("YId").value; var DeptValue=document.getElementById("DeptValue").value;  
  window.open("ReportPmsCSVTrain.php?action=ExportTrain&value="+v+"&C="+ComId+"&Y="+YId+"&value="+DeptValue,"PrintForm","menubar=yes,scrollbars=yes,resizable=no,directories=no,width=20,height=20");}    
  
  
function ExportOverAll(v)
{ var ComId=document.getElementById("ComId").value; var YId=document.getElementById("YId").value; var DeptValue=document.getElementById("DeptValue").value;  
  window.open("ReportPmsCSVOverAll.php?action=ExportOverAll&value="+v+"&C="+ComId+"&Y="+YId+"&value="+DeptValue,"PrintForm","menubar=yes,scrollbars=yes,resizable=no,directories=no,width=20,height=20");}     
	  
function ParcentDept()
{ var ComId=document.getElementById("ComId").value; var YId=document.getElementById("YId").value;  
  window.open("ReportPmsCSVParcentDept.php?action=ExportPerDept&C="+ComId+"&Y="+YId,"PrintForm","menubar=yes,scrollbars=yes,resizable=no,directories=no,width=20,height=20");}  
  
function ParcentHOD()
{ var ComId=document.getElementById("ComId").value; var YId=document.getElementById("YId").value;  
  window.open("ReportPmsCSVParcentHOD.php?action=ExportPerHOD&C="+ComId+"&Y="+YId,"PrintForm","menubar=yes,scrollbars=yes,resizable=no,directories=no,width=20,height=20");}  

function ExportIncHisAll()
{ var ComId=document.getElementById("ComId").value; var YId=document.getElementById("YId").value;  
  window.open("ReportPmsCSVIncHisReport.php?action=ExportHistoryInc&C="+ComId+"&Y="+YId,"PrintForm","menubar=yes,scrollbars=yes,resizable=no,directories=no,width=20,height=20");}  
  
function HodExportIncHisAll()
{ var ComId=document.getElementById("ComId").value; var YId=document.getElementById("YId").value;  var DeptValue=document.getElementById("DeptValue").value;  
  window.open("HodReportPmsCSVIncHisReport.php?action=HodExportHistoryInc&C="+ComId+"&Y="+YId+"&value="+DeptValue,"PrintForm","menubar=yes,scrollbars=yes,resizable=no,directories=no,width=20,height=20");}    
  
</Script>  
</head>
<body class="body">
<input type="hidden" name="ComId" id="ComId" value="<?php echo $CompanyId; ?>" />
<input type="hidden" name="YId" id="YId" value="<?php echo $_REQUEST['YI']; ?>" />
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
	  <td valign="top" align="" width="100%" id="MainWindow">
<?php //************************************************************************************************************************************************************?>
<?php //**********************************************START*****START*****START******START******START***************************************************************?>
<?php //************************************************************************************************************************************************************?>
<table border="0" style="margin-top:0px; width:95%; height:400px;">
 <tr>
 <?php if(($_SESSION['UserType']=='M' OR $_SESSION['UserType']=='S' OR $_SESSION['UserType']=='A' OR $_SESSION['UserType']=='U') AND $_SESSION['login'] = true) { ?>
  <td align="" width="100%" valign="top">
  <table border="0"><tr><td><table>
   <tr>
<?php $sY=mysql_query("select * from hrm_year where YearId=".$_REQUEST['YI']."", $con); $rY=mysql_fetch_assoc($sY); 
      $FD=date("Y",strtotime($rY['FromDate'])); $TD=date("Y",strtotime($rY['ToDate'])); $PRD=$FD.'-'.$TD; ?>					 
	<td valign="top">
	  <table border="0">		
	  <tr>
	   <td bgcolor="#7a6189" style="width:90px; height:20px; font-size:13px; font-family:Times New Roman; color:#FFFFFF; font-weight:bold;" align="center">Year</td>
	  </tr>					
      <tr bgcolor="#DDFFBB">
	   <td class="td1" style="font-size:11px; width:90px;" align="center"><select style="font-size:11px; width:88px; height:18px; background-color:#DDFFBB;" name="YearID" id="YearID" onChange="SelectYear(this.value)"><option value="<?php echo $_REQUEST['YI']; ?>" style="margin-left:0px;" selected><?php echo $PRD; ?></option>
<?php for($i=$YearId; $i>=1; $i--){	
	  $s2Y=mysql_query("select * from hrm_year where YearId=".$i,$con); $r2Y=mysql_fetch_assoc($s2Y);
	  $FD2=date("Y",strtotime($r2Y['FromDate'])); $TD2=date("Y",strtotime($r2Y['ToDate'])); ?>
<?php if($_REQUEST['YI']!=$i){ ?><option value="<?php echo $i; ?>"><?php echo $FD2.'-'.$TD2; ?></option><?php } ?>
<?php } ?></select></td>
      </tr>
	  </table>					
	</td> 
<?php if($_SESSION['UserType']=='M' OR $_SESSION['UserType']=='S') { ?>
	 <td valign="top">
	  <table border="0">
	   <tr>
		<td bgcolor="#7a6189" style="width:90px; height:20px; font-size:13px; font-family:Times New Roman; color:#FFFFFF; font-weight:bold;" align="center">App/ Rev/ HOD</td>
	   </tr>							
	   <tr bgcolor="#DDFFBB">
		<td class="td1" style="font-size:11px; width:90px;" align="center"><select style="font-size:11px; width:88px; height:18px; background-color:#DDFFBB;" name="DeptAppRev" id="DeptAppRev" onChange="SelectAppRev(this.value)"><option value="" style="margin-left:0px;" selected>Department</option><?php $SqlDept=mysql_query("select * from hrm_department where CompanyId=".$CompanyId." AND DepartmentCode!='MANAGEMENT' order by DepartmentName ASC", $con); while($ResDept=mysql_fetch_array($SqlDept)) { ?><option value="<?php echo $ResDept['DepartmentId']; ?>"><?php echo '&nbsp;'.$ResDept['DepartmentCode'];?></option><?php } ?><option value="All">&nbsp;All</option></select></td>
		</tr>
	   </table>					
	   </td> 
<?php } if($_SESSION['UserType']=='M' OR $_SESSION['UserType']=='S') {?>
	   <td valign="top">
		<table border="0">
		<tr>
		 <td bgcolor="#7a6189" style="width:90px;height:20px; font-size:13px; font-family:Times New Roman; color:#FFFFFF; font-weight:bold;" align="center">Score/ Rating</td>
		</tr>					
		<tr bgcolor="#DDFFBB">
		 <td class="td1" style="font-size:11px; width:90px;" align="center"><select style="font-size:11px; width:88px; height:18px; background-color:#DDFFBB;" name="DeptScore" id="DeptScore" onChange="SelectDeptScore(this.value)"><option value="" style="margin-left:0px;" selected>Department</option><?php $SqlDept=mysql_query("select * from hrm_department where CompanyId=".$CompanyId." AND DepartmentCode!='MANAGEMENT' order by DepartmentName ASC", $con); while($ResDept=mysql_fetch_array($SqlDept)) { ?><option value="<?php echo $ResDept['DepartmentId']; ?>"><?php echo '&nbsp;'.$ResDept['DepartmentCode'];?></option><?php } ?><option value="All">&nbsp;All</option></select></td>
		</tr>
		<tr bgcolor="#DDFFBB">
		 <td class="td1" style="font-size:11px; width:90px;" align="center"><select style="font-size:11px; width:88px; height:18px; background-color:#DDFFBB;" name="HodScore" id="HodScore" onChange="SelectHodScore(this.value)"><option value="" style="margin-left:0px;" selected>HOD</option><?php $SqlHod=mysql_query("SELECT HOD_EmployeeID,Fname,Sname,Lname from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.HOD_EmployeeID=hrm_employee.EmployeeID WHERE hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." GROUP BY HOD_EmployeeID", $con); while($ResHod=mysql_fetch_array($SqlHod)) { $EnameH=$ResHod['Fname'].' '.$ResHod['Sname'].' '.$ResHod['Lname']; ?><option value="<?php echo $ResHod['HOD_EmployeeID']; ?>"><?php echo '&nbsp;'.$EnameH; ?></option><?php } ?></select></td>
		</tr>
	   </table>					
	   </td> 
<?php } if($_SESSION['UserType']=='M' OR $_SESSION['UserType']=='S') { ?>
	   <td valign="top">
		<table border="0">
		 <tr>
	       <td bgcolor="#7a6189" style="width:90px; height:20px; font-size:13px; font-family:Times New Roman; color:#FFFFFF; font-weight:bold;" align="center">Increment</td>
		 </tr>
		 <tr bgcolor="#DDFFBB">
		 <td class="td1" style="font-size:11px; width:90px;" align="center"><select style="font-size:11px; width:88px; height:18px; background-color:#DDFFBB;" name="DeptInc" id="DeptInc" onChange="SelectDeptInc(this.value)"><option value="" style="margin-left:0px;" selected>Department</option><?php $SqlDeptI=mysql_query("select * from hrm_department where CompanyId=".$CompanyId." AND DepartmentCode!='MANAGEMENT' order by DepartmentName ASC", $con); while($ResDeptI=mysql_fetch_array($SqlDeptI)) { ?><option value="<?php echo $ResDeptI['DepartmentId']; ?>"><?php echo '&nbsp;'.$ResDeptI['DepartmentCode'];?></option><?php } ?><option value="All">&nbsp;All</option></select></td>	
		 </tr>
		 <tr bgcolor="#DDFFBB">			  
		  <td class="td1" style="font-size:11px; width:90px;" align="center"><select style="font-size:11px; width:88px; height:18px; background-color:#DDFFBB;" name="HodInc" id="HodInc" onChange="SelectHodInc(this.value)"><option value="" style="margin-left:0px;" selected>HOD</option><?php $SqlHodI=mysql_query("SELECT HOD_EmployeeID,Fname,Sname,Lname from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.HOD_EmployeeID=hrm_employee.EmployeeID WHERE hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." GROUP BY HOD_EmployeeID", $con); while($ResHodI=mysql_fetch_array($SqlHodI)) { $EnameHI=$ResHodI['Fname'].' '.$ResHodI['Sname'].' '.$ResHodI['Lname']; ?><option value="<?php echo $ResHodI['HOD_EmployeeID']; ?>"><?php echo '&nbsp;'.$EnameHI; ?></option><?php } ?></select></td>	
		 </tr> 
		</table>
		</td>			
<?php } if($_SESSION['UserType']=='M' OR $_SESSION['UserType']=='S') { ?>
	   <td valign="top">
		<table border="0">
		 <tr>
	       <td bgcolor="#7a6189" style="width:90px; height:20px; font-size:13px; font-family:Times New Roman; color:#FFFFFF; font-weight:bold;" align="center">Std. Inc.</td>
		 </tr>
		 <tr bgcolor="#DDFFBB">
		 <td class="td1" style="font-size:11px; width:90px;" align="center"><select style="font-size:11px; width:88px; height:18px; background-color:#DDFFBB;" name="StdDeptInc" id="StdDeptInc" onChange="SelectStdDeptInc(this.value)"><option value="" style="margin-left:0px;" selected>Department</option><?php $SqlDeptSI=mysql_query("select * from hrm_department where CompanyId=".$CompanyId." AND DepartmentCode!='MANAGEMENT' order by DepartmentName ASC", $con); while($ResDeptSI=mysql_fetch_array($SqlDeptSI)) { ?><option value="<?php echo $ResDeptSI['DepartmentId']; ?>"><?php echo '&nbsp;'.$ResDeptSI['DepartmentCode'];?></option><?php } ?><option value="All">&nbsp;All</option></select></td>	
		 </tr>
		</table>
		</td>			
<?php } if($_SESSION['UserType']=='M' OR $_SESSION['UserType']=='S' OR $_SESSION['UserType']=='A') { ?>
		  <td valign="top">
		<table border="0">
		<tr>
<td bgcolor="#7a6189" style="width:90px; height:20px; font-size:13px; font-family:Times New Roman; color:#FFFFFF; font-weight:bold;" align="center">Inc History</td>
		</tr>						
		<tr bgcolor="#DDFFBB">
		 <td class="td1" style="font-size:11px; width:90px;" align="center">
		   <select style="font-size:11px; width:88px; height:18px; background-color:#DDFFBB;" name="DeptIncHistory" id="DeptIncHistory" onChange="SelectIncHistory(this.value)">                       <option value="" style="margin-left:0px;" selected>Department</option>
<?php $SqlDept=mysql_query("select * from hrm_department where CompanyId=".$CompanyId." AND DepartmentCode!='MANAGEMENT' order by DepartmentName ASC", $con); while($ResDept=mysql_fetch_array($SqlDept)) { ?>
		   <option value="<?php echo $ResDept['DepartmentId']; ?>"><?php echo '&nbsp;'.$ResDept['DepartmentCode'];?></option><?php } ?>
		   <option value="All">&nbsp;All</option></select></td>
		 </tr>
		 <tr bgcolor="#DDFFBB">			  
		  <td class="td1" style="font-size:11px; width:90px;" align="center"><select style="font-size:11px; width:88px; height:18px; background-color:#DDFFBB;" name="HodInc" id="HodInc" onChange="SelectHodIncAll(this.value)"><option value="" style="margin-left:0px;" selected>HOD</option><?php $SqlHodI=mysql_query("SELECT HOD_EmployeeID,Fname,Sname,Lname from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.HOD_EmployeeID=hrm_employee.EmployeeID WHERE hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." GROUP BY HOD_EmployeeID", $con); while($ResHodI=mysql_fetch_array($SqlHodI)) { $EnameHI=$ResHodI['Fname'].' '.$ResHodI['Sname'].' '.$ResHodI['Lname']; ?><option value="<?php echo $ResHodI['HOD_EmployeeID']; ?>"><?php echo '&nbsp;'.$EnameHI; ?></option><?php } ?><option value="0">&nbsp;OVER ALL</option></select></td>	
		 </tr> 	
	   </table>					
	   </td>
	   <td valign="top">
		<table border="0">
		<tr>
<td bgcolor="#7a6189" style="width:90px; height:20px; font-size:13px; font-family:Times New Roman; color:#FFFFFF; font-weight:bold;" align="center">KRA (Dump)</td>
		</tr>							
		<tr bgcolor="#DDFFBB">
		 <td class="td1" style="font-size:11px; width:90px;" align="center">
		   <select style="font-size:11px; width:88px; height:18px; background-color:#DDFFBB;" name="DeptKRA" id="DeptKRA" onChange="SelectKRA(this.value)">                       <option value="" style="margin-left:0px;" selected>Department</option>
<?php $SqlDept=mysql_query("select * from hrm_department where CompanyId=".$CompanyId." AND DepartmentCode!='MANAGEMENT' order by DepartmentName ASC", $con); while($ResDept=mysql_fetch_array($SqlDept)) { ?>
		   <option value="<?php echo $ResDept['DepartmentId']; ?>"><?php echo '&nbsp;'.$ResDept['DepartmentCode'];?></option><?php } ?>
		   </select></td>
		 </tr>					
		<tr bgcolor="#DDFFBB">
		 <td class="td1" style="font-size:11px; width:90px;" align="center">
		   <select style="font-size:11px; width:88px; height:18px; background-color:#DDFFBB;" name="DeptKRAName" id="DeptKRAName" onChange="SelectKRAName(this.value)" <?php if($_REQUEST['YI']==1){echo 'disabled';} ?>>                       <option value="" style="margin-left:0px;" selected>Name Wise</option>
<?php $SqlDept=mysql_query("select * from hrm_department where CompanyId=".$CompanyId." AND DepartmentCode!='MANAGEMENT' order by DepartmentName ASC", $con); while($ResDept=mysql_fetch_array($SqlDept)) { ?>
		   <option value="<?php echo $ResDept['DepartmentId']; ?>"><?php echo '&nbsp;'.$ResDept['DepartmentCode'];?></option><?php } ?>
		   </select></td>
		 </tr>
	   </table>					
	   </td>
	    <td valign="top">
		<table border="0">
		<tr>
<td bgcolor="#7a6189" style="width:90px; height:20px; font-size:13px; font-family:Times New Roman; color:#FFFFFF; font-weight:bold;" align="center">Achivement</td>
		</tr>							
		<tr bgcolor="#DDFFBB">
		 <td class="td1" style="font-size:11px; width:90px;" align="center">
		   <select style="font-size:11px; width:88px; height:18px; background-color:#DDFFBB;" name="DeptAchiv" id="DeptAchiv" onChange="SelectAchiv(this.value)">                       <option value="" style="margin-left:0px;" selected>Department</option>
<?php $SqlDept=mysql_query("select * from hrm_department where CompanyId=".$CompanyId." AND DepartmentCode!='MANAGEMENT' order by DepartmentName ASC", $con); while($ResDept=mysql_fetch_array($SqlDept)) { ?>
		   <option value="<?php echo $ResDept['DepartmentId']; ?>"><?php echo '&nbsp;'.$ResDept['DepartmentCode'];?></option><?php } ?>
		   <option value="All">&nbsp;All</option></select></td>
		 </tr>
	   </table>					
	   </td>
	   <td valign="top">
		<table border="0">
		<tr>
<td bgcolor="#7a6189" style="width:90px; height:20px; font-size:13px; font-family:Times New Roman; color:#FFFFFF; font-weight:bold;" align="center">Feedback</td>
		</tr>							
		<tr bgcolor="#DDFFBB">
		 <td class="td1" style="font-size:11px; width:90px;" align="center">
		  <select style="font-size:11px; width:88px; height:18px; background-color:#DDFFBB;" name="DeptFeed" id="DeptFeed" onChange="SelectFeed(this.value)">                       <option value="" style="margin-left:0px;" selected>Department</option>
<?php $SqlDept=mysql_query("select * from hrm_department where CompanyId=".$CompanyId." AND DepartmentCode!='MANAGEMENT' order by DepartmentName ASC", $con); while($ResDept=mysql_fetch_array($SqlDept)) { ?>
		   <option value="<?php echo $ResDept['DepartmentId']; ?>"><?php echo '&nbsp;'.$ResDept['DepartmentCode'];?></option><?php } ?>
		   <option value="All">&nbsp;All</option></select></td>
		 </tr>
		 <tr bgcolor="#DDFFBB">
		 <td class="td1" style="font-size:11px; width:90px;" align="center">
		   <select style="font-size:11px; width:88px; height:18px; background-color:#DDFFBB;" name="DeptNFeed" id="DeptNFeed" onChange="SelectNFeed(this.value)">                       <option value="" style="margin-left:0px;background-color:#008000;" selected>Name Wise</option>
<?php $SqlDept=mysql_query("select * from hrm_department where CompanyId=".$CompanyId." AND DepartmentCode!='MANAGEMENT' order by DepartmentName ASC", $con); while($ResDept=mysql_fetch_array($SqlDept)) { ?>
		   <option value="<?php echo $ResDept['DepartmentId']; ?>"><?php echo '&nbsp;'.$ResDept['DepartmentCode'];?></option><?php } ?>
		   <option value="All">&nbsp;All</option></select></td>
		 </tr>
	   </table>					
	   </td>
	    <td valign="top">
		<table border="0">
		<tr>
<td bgcolor="#7a6189" style="width:90px; height:20px; font-size:13px; font-family:Times New Roman; color:#FFFFFF; font-weight:bold;" align="center">Training</td>
		</tr>							
		<tr bgcolor="#DDFFBB">
		 <td class="td1" style="font-size:11px; width:90px;" align="center">
		   <select style="font-size:11px; width:88px; height:18px; background-color:#DDFFBB;" name="DeptTrain" id="DeptTrain" onChange="SelectTrain(this.value)">                       <option value="" style="margin-left:0px;" selected>Department</option>
<?php $SqlDept=mysql_query("select * from hrm_department where CompanyId=".$CompanyId." AND DepartmentCode!='MANAGEMENT' order by DepartmentName ASC", $con); while($ResDept=mysql_fetch_array($SqlDept)) { ?>
		   <option value="<?php echo $ResDept['DepartmentId']; ?>"><?php echo '&nbsp;'.$ResDept['DepartmentCode'];?></option><?php } ?>
		   <option value="All">&nbsp;All</option></select></td>
		 </tr>
	   </table>					
	   </td>
	   
	   
	   
		<td valign="top">
		<table border="0">
		<tr>
<td bgcolor="#7a6189" style="width:90px; height:20px; font-size:13px; font-family:Times New Roman; color:#FFFFFF; font-weight:bold;" align="center">Overall Reports</td>
		</tr>							
		<tr bgcolor="#DDFFBB">
		 <td class="td1" style="font-size:11px; width:90px;" align="center">
		   <select style="font-size:11px; width:88px; height:18px; background-color:#DDFFBB;" name="OverallDetails" id="OverallDetails" onChange="SelectOverAll(this.value)"><option value="" style="margin-left:0px;" selected>Department</option>
<?php $SqlDept=mysql_query("select * from hrm_department where CompanyId=".$CompanyId." AND DepartmentCode!='MANAGEMENT' order by DepartmentName ASC", $con); while($ResDept=mysql_fetch_array($SqlDept)) { ?>
		   <option value="<?php echo $ResDept['DepartmentId']; ?>"><?php echo '&nbsp;'.$ResDept['DepartmentCode'];?></option><?php } ?>
			<option value="20">&nbsp;All</option></select></td>
		 </tr>
	   </table>					
	   </td>
	   <td valign="top">
	   <table>
	    <tr>
        <td bgcolor="#7a6189" style="width:90px; height:20px; font-size:13px; font-family:Times New Roman; color:#FFFFFF; font-weight:bold;" align="center">Rating Graph</td>
	   </tr>	
	   <tr bgcolor="#DDFFBB">
	   <td class="td1" style="font-size:11px; width:90px;" align="center">
	   <select style="font-size:11px; width:88px; height:18px; background-color:#DDFFBB;" name="IncDept" id="IncDept" onChange="RatingGraph(this.value)">                       <option value="" style="margin-left:0px;" selected>Select</option>
	   <option value="AllGraph">All</option>
	   <option value="HODGraph">HOD</option>
	   </select></td>
	   </tr>
	  </table>
	  </td> 
	   <td valign="top">
	   <table>
	    <tr>
        <td bgcolor="#7a6189" style="width:90px; height:20px; font-size:13px; font-family:Times New Roman; color:#FFFFFF; font-weight:bold;" align="center">(%) Increment</td>
	   </tr>	
	   <tr bgcolor="#DDFFBB">
	   <td class="td1" style="font-size:11px; width:90px;" align="center">
	   <select style="font-size:11px; width:88px; height:18px; background-color:#DDFFBB;" name="PercentInc" id="PercentInc" onChange="IncPercent(this.value)">                       <option value="" style="margin-left:0px;" selected>Select</option>
	   <option value="DeptWise">Department</option>
	   <option value="HODWise">HOD</option>
	   </select></td>
	   </tr>
	  </table>
	  </td> 	
	  	   <td valign="top">
	   <table>
	    <tr>
        <td bgcolor="#7a6189" style="width:90px; height:20px; font-size:13px; font-family:Times New Roman; color:#FFFFFF; font-weight:bold;" align="center">Overall Graph</td>
	   </tr>	
	   <tr bgcolor="#DDFFBB">
	   <td class="td1" style="font-size:11px; width:90px;" align="center">
	   <select style="font-size:11px; width:88px; height:18px; background-color:#DDFFBB;" name="GraphOverAll" id="GraphOverAll" onChange="OverAllGraph(this.value)">       <option value="" style="margin-left:0px;" selected>Select</option>
	   <option value="OverAllGraph">All</option>
	   <option value="OverHODGraph">HOD</option>
	   </select></td>
	   </tr>
	  </table>
	  </td> 											
<?php } ?>					
	   </tr>
	  </table>
	</td>
 </tr>

<?php //---------------------------------------Display Record----------------------------------------------------------------- ?>
<?php if($_REQUEST['action']=='AppRev') { ?>

<?php /* if($_REQUEST['value']==6) { ?>
<?php $sqlD2=mysql_query("select hrm_employee.EmployeeID from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee_general.DepartmentId=".$_REQUEST['value']." AND hrm_employee.CompanyId=".$CompanyId." AND hrm_employee.EmpStatus='A'", $con);  
while($resD2=mysql_fetch_array($sqlD2)){ 

$CK=mysql_query("select * from hrm_pms_kra where YearId=3 AND CompanyId=".$CompanyId." AND EmployeeID=".$resD2['EmployeeID']." AND KRAStatus='A'", $con); $rowCK=mysql_num_rows($CK);
if($rowCK==0)
{
      $sqlS=mysql_query("select KRA,KRA_Description,Measure,Unit,Weightage,Target from hrm_pms_kra where YearId=2 AND CompanyId=".$CompanyId." AND EmployeeID=".$resD2['EmployeeID']." AND KRAStatus='A' order by KRAId ASC", $con); $rowS=mysql_num_rows($sqlS); 
	  if($rowS>0) 
	  { $N=1; while($resS=mysql_fetch_array($sqlS)) 
	    {   
         $sqlIns=mysql_query("insert into hrm_pms_kra(YearId, EmployeeID, DepartmentId, KRA, KRA_Description, Measure, Unit, Weightage, Target, CompanyId, KRAStatus, UseKRA, EmpStatus, Appstatus, RevStatus, HODStatus, CreatedBy, CreatedDate)value(3, ".$resD2['EmployeeID'].", ".$_REQUEST['value'].", '".$resS['KRA']."', '".$resS['KRA_Description']."', '".$resS['Measure']."', '".$resS['Unit']."', ".$resS['Weightage'].", ".$resS['Target'].", ".$CompanyId.", 'A', 'H', 'A', 'A', 'A', 'A', ".$resD2['EmployeeID'].", '".date("Y-m-d")."')", $con); 
		 } 
	  }
}	  
	  
?>  
<?php } } */ ?>


<?php /*  if($_REQUEST['value']==4) { ?>
<?php $sqlD2=mysql_query("select hrm_employee.EmployeeID from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee_general.DepartmentId=".$_REQUEST['value']." AND hrm_employee.CompanyId=".$CompanyId." AND hrm_employee.EmpStatus='A'", $con);  
while($resD2=mysql_fetch_array($sqlD2)){ 

$CK=mysql_query("select * from hrm_pms_kra where YearId=3 AND CompanyId=".$CompanyId." AND EmployeeID=".$resD2['EmployeeID']." AND KRAStatus='A'", $con); $rowCK=mysql_num_rows($CK);
if($rowCK==0)
{
      $sqlS=mysql_query("select KRA,KRA_Description,Measure,Unit,Weightage,Target from hrm_pms_kra where YearId=2 AND CompanyId=".$CompanyId." AND EmployeeID=".$resD2['EmployeeID']." AND KRAStatus='A' order by KRAId ASC", $con); 
      $rowS=mysql_num_rows($sqlS); 
	  if($rowS>0) 
	  { $N=1; while($resS=mysql_fetch_array($sqlS)) 
	    {   
         $sqlSvK=mysql_query("insert into hrm_pms_kra(YearId, EmployeeID, DepartmentId, KRA, KRA_Description, Measure, Unit, Weightage, Target, CompanyId, KRAStatus, UseKRA, EmpStatus, Appstatus, RevStatus, HODStatus, CreatedBy, CreatedDate)value(3, ".$resD2['EmployeeID'].", ".$_REQUEST['value'].", '".$resS['KRA']."', '".$resS['KRA_Description']."', '".$resS['Measure']."', '".$resS['Unit']."', ".$resS['Weightage'].", ".$resS['Target'].", ".$CompanyId.", 'A', 'H', 'A', 'A', 'A', 'A', ".$resD2['EmployeeID'].", '".date("Y-m-d")."')", $con);        } 
	  }
}	  
?>  
<?php } } */ ?>

<tr>
 <td>
   <table border="1" width="1250">
     <tr>
<?php if($_REQUEST['value']!='All') { $sqlA=mysql_query("select DepartmentName from hrm_department where DepartmentId=".$_REQUEST['value'], $con); $resA=mysql_fetch_assoc($sqlA); } ?>	
	  <td colspan="8" valign="top" style=" background-color:#0069D2; font-size:14px; color:#FFFFFF; font-family:Times New Roman; font-weight:bold;">&nbsp;Appraiser/ Reviewer/ HOD Name :
	  &nbsp;&nbsp;(&nbsp;Department - <?php if($_REQUEST['value']!='All') {echo $resA['DepartmentName']; } else {echo 'All';} ?>&nbsp;)&nbsp;&nbsp;&nbsp;
	  <a href="#" onClick="PrintAppRev(<?php echo $_REQUEST['value']; ?>)" style="color:#F9F900; font-size:12px;">Print</a>
	  &nbsp;&nbsp;<a href="#" onClick="ExportAppRev('<?php echo $_REQUEST['value']; ?>')" style="color:#F9F900; font-size:12px;">Export Excel</a>
	  </td>
	 </tr>
	 <tr bgcolor="#7a6189">
		<td align="center" style="color:#FFFFFF;" class="All_50"><b>SNo.</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_80"><b>EmpCode</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_200"><b>Name</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_120"><b>Department</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_200"><b>Designation</b></td>	
		<td align="center" style="color:#FFFFFF;" class="All_200"><b>Appraiser Name</b></td>	
		<td align="center" style="color:#FFFFFF;" class="All_200"><b>Reviewer Name</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_200"><b>HOD Name</b></td>
	</tr>
<?php if($_REQUEST['value']=='All') {$sqlD=mysql_query("select hrm_employee.*, hrm_employee_general.DepartmentId, hrm_employee_general.DesigId, hrm_employee_general.HqId, hrm_employee_general.GradeId, hrm_employee_general.DesigId, EmpPmsId, Appraiser_EmployeeID, Reviewer_EmployeeID, HOD_EmployeeID from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_pms ON hrm_employee.EmployeeID=hrm_employee_pms.EmployeeID where hrm_employee.CompanyId=".$CompanyId." AND hrm_employee.EmpStatus='A' AND (hrm_employee_pms.Appraiser_EmployeeID!='' OR hrm_employee_pms.Appraiser_EmployeeID!=0) AND hrm_employee_general.DateJoining<='".$YYear."-06-30' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI'], $con); }
else {$sqlD=mysql_query("select hrm_employee.*, hrm_employee_general.DepartmentId, hrm_employee_general.DesigId, hrm_employee_general.HqId, hrm_employee_general.GradeId, hrm_employee_general.DesigId, EmpPmsId, Appraiser_EmployeeID, Reviewer_EmployeeID, HOD_EmployeeID from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_pms ON hrm_employee.EmployeeID=hrm_employee_pms.EmployeeID where hrm_employee_pms.HR_Curr_DepartmentId=".$_REQUEST['value']." AND hrm_employee.CompanyId=".$CompanyId." AND hrm_employee.EmpStatus='A' AND (hrm_employee_pms.Appraiser_EmployeeID!='' OR hrm_employee_pms.Appraiser_EmployeeID!=0) AND hrm_employee_general.DateJoining<='".$YYear."-06-30' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI'], $con); } 
$Sno=1; while($resD=mysql_fetch_array($sqlD)){ ?>    
	 <tr bgcolor="#FFFFFF">
		<td align="center" style="" class="All_50"><?php echo $Sno; ?></td>
		<td align="center" style="" class="All_80"><?php echo $resD['EmpCode']; ?></td>
		<td align="" style="" class="All_200"><?php echo $resD['Fname'].' '.$resD['Sname'].' '.$resD['Lname']; ?></td>
<?php $sqlDept=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$resD['DepartmentId'], $con); $resDept=mysql_fetch_assoc($sqlDept); ?>		
		<td align="" style="" class="All_120"><?php echo $resDept['DepartmentCode']; ?></td>
<?php $sqlDesig=mysql_query("select DesigName from hrm_designation where DesigId=".$resD['DesigId'], $con); $resDesig=mysql_fetch_assoc($sqlDesig); ?>		
		<td align="" style="" class="All_200"><?php echo $resDesig['DesigName']; ?></td>
<?php $sqlE1=mysql_query("select Fname, Sname, Lname from hrm_employee where EmployeeID=".$resD['Appraiser_EmployeeID'], $con); $resE1=mysql_fetch_assoc($sqlE1); ?>		
		<td bgcolor="#D5FFD5" align="" style="" class="All_200"><?php echo $resE1['Fname'].' '.$resE1['Sname'].' '.$resE1['Lname']; ?></td>
<?php $sqlE2=mysql_query("select Fname, Sname, Lname from hrm_employee where EmployeeID=".$resD['Reviewer_EmployeeID'], $con); $resE2=mysql_fetch_assoc($sqlE2); ?>	
		<td bgcolor="#D5FFD5" align="" style="" class="All_200"><?php echo $resE2['Fname'].' '.$resE2['Sname'].' '.$resE2['Lname']; ?></td>
<?php $sqlE3=mysql_query("select Fname, Sname, Lname from hrm_employee where EmployeeID=".$resD['HOD_EmployeeID'], $con); $resE3=mysql_fetch_assoc($sqlE3); ?>			
		 <td bgcolor="#D5FFD5" align="" style="" class="All_200"><?php echo $resE3['Fname'].' '.$resE3['Sname'].' '.$resE3['Lname']; ?></td>
	 </tr>
	 <?php $Sno++; } ?> 
   </table>
 </td>
</tr> 
<?php } if($_REQUEST['action']=='DeptScore') { ?>
<tr>
 <td>
   <table border="1" width="2000">
     <tr>
<?php if($_REQUEST['value']!='All'){$sqlB=mysql_query("select DepartmentName from hrm_department where DepartmentId=".$_REQUEST['value'], $con); $resB=mysql_fetch_assoc($sqlB); }?>		
	  <td colspan="5" valign="top" style=" background-color:#0069D2; font-size:14px; color:#FFFFFF; font-family:Times New Roman; font-weight:bold;">&nbsp;PMS Score Department Wise :
	  &nbsp;&nbsp;(&nbsp;Department - <?php if($_REQUEST['value']!='All'){echo $resB['DepartmentName']; } else {echo 'All';} ?>&nbsp;)&nbsp;&nbsp;&nbsp;
	  <a href="#" onClick="PrintDeptScore(<?php echo $_REQUEST['value']; ?>)" style="color:#F9F900; font-size:12px;">Print</a>
	  &nbsp;&nbsp;<a href="#" onClick="ExportScore('<?php echo $_REQUEST['value']; ?>')" style="color:#F9F900; font-size:12px;">Export Excel</a>
	  </td>
	  <td colspan="6" bgcolor="#7a6189" align="center" style="color:#FFFFFF;" class="All_50"><b>EMPLOYEE</b></td>
	  <td colspan="4" bgcolor="#7a6189" align="center" style="color:#FFFFFF;" class="All_50"><b>APPRAISER</b></td>
	  <td colspan="4" bgcolor="#7a6189" align="center" style="color:#FFFFFF;" class="All_50"><b>REVIEWER</b></td>
	  <td colspan="2" bgcolor="#7a6189" align="center" style="color:#FFFFFF;" class="All_50"><b>HOD</b></td>
	  <td colspan="2" bgcolor="#7a6189" align="center" style="color:#FFFFFF;" class="All_50"><b>HR</b></td>
	 </tr>
	 <tr bgcolor="#7a6189">
		<td align="center" style="color:#FFFFFF;" class="All_50"><b>SNo.</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_80"><b>EmpCode</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_250"><b>Name</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_120"><b>Department</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_150"><b>State</b></td>	
		<td align="center" style="color:#FFFFFF;" class="All_150"><b>Designation</b></td>	
		<td align="center" style="color:#FFFFFF;" class="All_40"><b>Grade</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_60"><b>Score</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_60"><b>Rating</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_50"><b>Form</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_50"><b>Attach</b></td>
        <td align="center" style="color:#FFFFFF;" class="All_150"><b>Designation</b></td>
        <td align="center" style="color:#FFFFFF;" class="All_40"><b>Grade</b></td> 
		<td align="center" style="color:#FFFFFF;" class="All_60"><b>Score</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_60"><b>Rating</b></td>
        <td align="center" style="color:#FFFFFF;" class="All_150"><b>Designation</b></td> 
        <td align="center" style="color:#FFFFFF;" class="All_40"><b>Grade</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_60"><b>Score</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_60"><b>Rating</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_60"><b>Score</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_60"><b>Rating</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_60"><b>Score</b></td>		 
		<td align="center" style="color:#FFFFFF;" class="All_80"><b>Rating</b></td>
	</tr>
<?php if($_REQUEST['value']=='All') { $sqlD=mysql_query("select hrm_employee.*, hrm_employee_general.DepartmentId, hrm_employee_general.DesigId, hrm_employee_general.HqId, hrm_employee_general.GradeId, hrm_employee_general.DesigId, EmpPmsId, Emp_TotalFinalScore, Emp_TotalFinalRating, Appraiser_TotalFinalScore, Appraiser_TotalFinalRating, Appraiser_EmpDesignation, Appraiser_EmpGrade, Reviewer_EmpDesignation, Reviewer_EmpGrade, Reviewer_TotalFinalScore, Reviewer_TotalFinalRating, Hod_TotalFinalScore, Hod_TotalFinalRating, HR_CurrDesigId, HR_CurrGradeId, HR_Score, HR_Rating from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_pms ON hrm_employee.EmployeeID=hrm_employee_pms.EmployeeID where hrm_employee.CompanyId=".$CompanyId." AND hrm_employee.EmpStatus='A' AND (hrm_employee_pms.Appraiser_EmployeeID!='' OR hrm_employee_pms.Appraiser_EmployeeID!=0) AND hrm_employee_general.DateJoining<='".$YYear."-06-30' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI'], $con); }
else { $sqlD=mysql_query("select hrm_employee.*, hrm_employee_general.DepartmentId, hrm_employee_general.DesigId, hrm_employee_general.HqId, hrm_employee_general.GradeId, hrm_employee_general.DesigId, EmpPmsId, Emp_TotalFinalScore, Emp_TotalFinalRating, Appraiser_TotalFinalScore, Appraiser_TotalFinalRating, Appraiser_EmpDesignation, Appraiser_EmpGrade, Reviewer_EmpDesignation, Reviewer_EmpGrade, Reviewer_TotalFinalScore, Reviewer_TotalFinalRating, Hod_TotalFinalScore, Hod_TotalFinalRating, HR_CurrDesigId, HR_CurrGradeId, HR_Score, HR_Rating from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_pms ON hrm_employee.EmployeeID=hrm_employee_pms.EmployeeID where hrm_employee_pms.HR_Curr_DepartmentId=".$_REQUEST['value']." AND hrm_employee.CompanyId=".$CompanyId." AND hrm_employee.EmpStatus='A' AND (hrm_employee_pms.Appraiser_EmployeeID!='' OR hrm_employee_pms.Appraiser_EmployeeID!=0) AND hrm_employee_general.DateJoining<='".$YYear."-06-30' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI'], $con); } $Sno=1; while($resD=mysql_fetch_array($sqlD)){  
 $sqlDesig=mysql_query("select DesigName from hrm_designation where DesigId=".$resD['HR_CurrDesigId'], $con); $sqlG=mysql_query("select GradeValue from hrm_grade where GradeId=".$resD['HR_CurrGradeId'], $con);  $sqlS=mysql_query("select StateName from hrm_state INNER JOIN hrm_headquater ON hrm_state.StateId=hrm_headquater.StateId where HqId=".$resD['HqId'], $con); 
 $resDesig=mysql_fetch_assoc($sqlDesig); $resG=mysql_fetch_assoc($sqlG); $resS=mysql_fetch_assoc($sqlS); ?>	   
	 <tr bgcolor="#FFFFFF">
		<td align="center" style="" class="All_50"><?php echo $Sno; ?></td>
		<td align="center" style="" class="All_80"><?php echo $resD['EmpCode']; ?></td>
		<td align="" style="" class="All_250"><?php echo $resD['Fname'].' '.$resD['Sname'].' '.$resD['Lname']; ?></td>
<?php $sqlDept=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$resD['DepartmentId'], $con); $resDept=mysql_fetch_assoc($sqlDept); ?>		
		<td align="" style="" class="All_120"><?php echo $resDept['DepartmentCode']; ?></td>
		<td align="" style="" class="All_150"><?php echo $resS['StateName']; ?></td>
		<td align="" style="background-color:#ECD9FF;" class="All_150"><?php echo $resDesig['DesigName']; ?></td>
	    <td align="center" style="background-color:#ECD9FF;" class="All_40"><?php echo $resG['GradeValue']; ?></td>
		<td align="center" style="background-color:#ECD9FF;" class="All_60"><?php echo $resD['Emp_TotalFinalScore']; ?></td>
		<td align="center" style="background-color:#ECD9FF;" class="All_60"><?php echo $resD['Emp_TotalFinalRating']; ?></td>
		<td align="center" style="background-color:#ECD9FF;" class="All_50"><a href="javascript:OpenWindow(<?php echo $resD['EmployeeID'].','.$resD['EmpPmsId']; ?>)">Click</a></td>
		<td align="center" style="background-color:#ECD9FF;" class="All_50">
<?php $sqlR=mysql_query("select * from hrm_employee_pms_uploadfile where EmpPmsId=".$resD['EmpPmsId']." AND EmployeeID=".$resD['EmployeeID']." AND YearId=".$_REQUEST['YI'], $con); $no=1; $resR=mysql_num_rows($sqlR); if($resR>0){ ?><a href="#" onClick="UploadEmpfile(<?php echo $resD['EmpPmsId'].','.$resD['EmployeeID']; ?>)">Yes</a>
			<?php } if($resR==0){echo 'No'; }?></td>	
<?php $sqlDesig2=mysql_query("select DesigName from hrm_designation where DesigId=".$resD['Appraiser_EmpDesignation']." AND CompanyId=".$CompanyId, $con); 
$resDesig2=mysql_fetch_assoc($sqlDesig2); ?>				
        <td align="" style="background-color:#79BCFF;" class="All_150"><?php if($resD['HR_CurrDesigId']!=$resD['Appraiser_EmpDesignation']){echo $resDesig2['DesigName']; } else {echo '&nbsp;';} ?></td>
<?php $sqlG2=mysql_query("select GradeValue from hrm_grade where GradeId=".$resD['Appraiser_EmpGrade']." AND CompanyId=".$CompanyId, $con); $resG2=mysql_fetch_assoc($sqlG2); ?>			
        <td align="center" style="background-color:#79BCFF;" class="All_40"><?php if($resD['HR_CurrGradeId']!=$resD['Appraiser_EmpGrade']){echo $resG2['GradeValue'];} else {echo '&nbsp;';} ?></td> 
        <td align="center" style="background-color:#79BCFF;" class="All_60"><?php echo $resD['Appraiser_TotalFinalScore']; ?></td>
        <td align="center" style="background-color:#79BCFF;" class="All_60"><?php echo $resD['Appraiser_TotalFinalRating']; ?></td>
<?php $sqlDesig3=mysql_query("select DesigName from hrm_designation where DesigId=".$resD['Reviewer_EmpDesignation']." AND CompanyId=".$CompanyId, $con); 
$resDesig3=mysql_fetch_assoc($sqlDesig3); ?>				
        <td align="" style="background-color:#FFDDCC;" class="All_150"><?php if($resD['HR_CurrDesigId']!=$resD['Reviewer_EmpDesignation']){echo $resDesig3['DesigName']; } else {echo '&nbsp;';} ?></td>	
<?php $sqlG3=mysql_query("select GradeValue from hrm_grade where GradeId=".$resD['Reviewer_EmpGrade']." AND CompanyId=".$CompanyId, $con); $resG3=mysql_fetch_assoc($sqlG3); ?>			
        <td align="center" style="background-color:#FFDDCC;" class="All_40"><?php if($resD['HR_CurrGradeId']!=$resD['Reviewer_EmpGrade']){echo $resG3['GradeValue'];} else {echo '&nbsp;';} ?></td> 		
		<td align="center" style="background-color:#FFDDCC;" class="All_60"><?php echo $resD['Reviewer_TotalFinalScore']; ?></td>
		<td align="center" style="background-color:#FFDDCC;" class="All_60"><?php echo $resD['Reviewer_TotalFinalRating']; ?></td>
		
		
		
		
		<td align="center" style="background-color:#FFD5FF;" class="All_60"><?php echo $resD['Hod_TotalFinalScore']; ?></td> 
		<td align="center" style="background-color:#FFD5FF;" class="All_60"><?php echo $resD['Hod_TotalFinalRating']; ?></td> 
		<td bgcolor="#D5FFD5" align="center" style="" class="All_60"><?php echo $resD['HR_Score']; ?></td>
		<td bgcolor="#D5FFD5" align="center" style="" class="All_80"><?php echo $resD['HR_Rating']; ?></td>
	 </tr>
	 <?php $Sno++; } ?> 
   </table>
 </td>
</tr> 
<?php } if($_REQUEST['action']=='HodScore') { ?>
<tr>
 <td>
   <table border="1" width="1500">
    <tr>
<?php $sqlA=mysql_query("select Fname, Sname, Lname from hrm_employee where EmployeeId=".$_REQUEST['value'], $con); $resA=mysql_fetch_assoc($sqlA); ?>	
	  <td colspan="19" valign="top" style=" background-color:#0069D2; font-size:14px; color:#FFFFFF; font-family:Times New Roman; font-weight:bold;">&nbsp;PMS Score HOD Wise :
	  &nbsp;&nbsp;(&nbsp;HOD - <?php echo $resA['Fname'].' '.$resA['Sname'].' '.$resA['Lname']; ?>&nbsp;)&nbsp;&nbsp;&nbsp;
	  <a href="#" onClick="PrintHodScore(<?php echo $_REQUEST['value']; ?>)" style="color:#F9F900; font-size:12px;">Print</a>
	  &nbsp;&nbsp;<a href="#" onClick="ExportHodScore('<?php echo $_REQUEST['value']; ?>')" style="color:#F9F900; font-size:12px;">Export Excel</a>
	  </td>


	 </tr>
	 <tr bgcolor="#7a6189">
		<td align="center" style="color:#FFFFFF;" class="All_50"><b>SNo.</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_80"><b>EmpCode</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_250"><b>Name</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_120"><b>Department</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_200"><b>Designation</b></td>	
		<td align="center" style="color:#FFFFFF;" class="All_50"><b>Grade</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_150"><b>State</b></td>
        <td align="center" style="color:#FFFFFF;" class="All_50"><b>Form</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_50"><b>Attach</b></td>	
		<td align="center" style="color:#FFFFFF;" class="All_60"><b>Emp</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_60"><b>Rating</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_60"><b>App</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_60"><b>Rating</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_60"><b>Rev</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_60"><b>Rating</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_60"><b>HOD</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_60"><b>Rating</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_60"><b>Final Score</b></td>		 
		<td align="center" style="color:#FFFFFF;" class="All_80"><b>Final Rating</b></td>
	</tr>
<?php $sqlH=mysql_query("select hrm_employee.*, hrm_employee_general.DepartmentId, hrm_employee_general.DesigId, hrm_employee_general.HqId, hrm_employee_general.GradeId, hrm_employee_general.DesigId, EmpPmsId, Emp_TotalFinalScore, Emp_TotalFinalRating, Appraiser_TotalFinalScore, Appraiser_TotalFinalRating, Reviewer_TotalFinalScore, Reviewer_TotalFinalRating, Hod_TotalFinalScore, Hod_TotalFinalRating, HR_CurrDesigId, HR_CurrGradeId, HR_Score, HR_Rating from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_pms ON hrm_employee.EmployeeID=hrm_employee_pms.EmployeeID where hrm_employee.CompanyId=".$CompanyId." AND hrm_employee.EmpStatus='A' AND hrm_employee_general.DateJoining<='".$YYear."-06-30' AND hrm_employee_pms.HOD_EmployeeID=".$_REQUEST['value']." AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI'], $con); 
$Sno=1; while($resH=mysql_fetch_array($sqlH)){ ?>    
	 <tr bgcolor="#FFFFFF">
		<td align="center" style="" class="All_50"><?php echo $Sno; ?></td>
		<td align="center" style="" class="All_80"><?php echo $resH['EmpCode']; ?></td>
		<td align="" style="" class="All_250"><?php echo $resH['Fname'].' '.$resH['Sname'].' '.$resH['Lname']; ?></td>
<?php $sqlDept=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$resH['DepartmentId'], $con); $resDept=mysql_fetch_assoc($sqlDept); ?>		
		<td align="" style="" class="All_120"><?php echo $resDept['DepartmentCode']; ?></td>
<?php $sqlDesig=mysql_query("select DesigName from hrm_designation where DesigId=".$resH['HR_CurrDesigId'], $con); $resDesig=mysql_fetch_assoc($sqlDesig); ?>		
		<td align="" style="" class="All_200"><?php echo $resDesig['DesigName']; ?></td>
<?php $sqlG=mysql_query("select GradeValue from hrm_grade where GradeId=".$resH['HR_CurrGradeId'], $con); $resG=mysql_fetch_assoc($sqlG); ?>		
		<td align="center" style="" class="All_50"><?php echo $resG['GradeValue']; ?></td>
<?php $sqlS=mysql_query("select StateName from hrm_state INNER JOIN hrm_headquater ON hrm_state.StateId=hrm_headquater.StateId where HqId=".$resH['HqId'], $con); $resS=mysql_fetch_assoc($sqlS); ?>			
		<td align="" style="" class="All_150"><?php echo $resS['StateName']; ?></td>
        <td align="center" style="" class="All_50"><a href="javascript:OpenWindow(<?php echo $resH['EmployeeID'].','.$resH['EmpPmsId']; ?>)">Click</a></td>
		<td align="center" style="" class="All_50">
<?php $sqlR=mysql_query("select * from hrm_employee_pms_uploadfile where EmpPmsId=".$resH['EmpPmsId']." AND EmployeeID=".$resH['EmployeeID']." AND YearId=".$_REQUEST['YI'], $con); $no=1; $resR=mysql_num_rows($sqlR); if($resR>0){ ?><a href="#" onClick="UploadEmpfile(<?php echo $resH['EmpPmsId'].','.$resH['EmployeeID']; ?>)">Yes</a>
			<?php } if($resR==0){echo 'No'; }?>		
		</td>
		<td align="center" style="background-color:#ECD9FF;" class="All_60"><?php echo $resH['Emp_TotalFinalScore']; ?></td>
		<td align="center" style="background-color:#ECD9FF;" class="All_60"><?php echo $resH['Emp_TotalFinalRating']; ?></td>
		<td align="center" style="background-color:#79BCFF;" class="All_60"><?php echo $resH['Appraiser_TotalFinalScore']; ?></td>
		<td align="center" style="background-color:#79BCFF;" class="All_60"><?php echo $resH['Appraiser_TotalFinalRating']; ?></td>
		<td align="center" style="background-color:#FFDDCC;" class="All_60"><?php echo $resH['Reviewer_TotalFinalScore']; ?></td>
		<td align="center" style="background-color:#FFDDCC;" class="All_60"><?php echo $resH['Reviewer_TotalFinalRating']; ?></td>
		<td align="center" style="background-color:#FFD5FF;" class="All_60"><?php echo $resH['Hod_TotalFinalScore']; ?></td> 
		<td align="center" style="background-color:#FFD5FF;" class="All_60"><?php echo $resH['Hod_TotalFinalRating']; ?></td> 
		<td bgcolor="#D5FFD5" align="center" style="" class="All_60"><?php echo $resH['HR_Score']; ?></td>
		<td bgcolor="#D5FFD5" align="center" style="" class="All_80"><?php echo $resH['HR_Rating']; ?></td>
	 </tr>
	 <?php $Sno++; } ?> 
   </table>
 </td>
</tr> 
<?php } if($_REQUEST['action']=='DeptInc') { ?>
<tr>
 <td>
   <table border="1" width="1500">
   <tr bgcolor="#FFFFFF" style="height:20px;">
    <td colspan="19" style="font-family:Times New Roman; font-size:12px;">
	<font color="#400000"><b>CD</b> :&nbsp;</font><font color="#004600">Current Designation,&nbsp;</font>
	<font color="#400000"><b>PD</b> :&nbsp;</font><font color="#004600">Proposed Designation,&nbsp;</font>
	<font color="#400000"><b>CG</b> :&nbsp;</font><font color="#004600">Current Grade,&nbsp;</font>
	<font color="#400000"><b>PG</b> :&nbsp;</font><font color="#004600">Proposed Grade,&nbsp;</font>
	<font color="#400000"><b>PGSPM</b> :&nbsp;</font><font color="#004600">Proposed Gross Salary Per Month,&nbsp;</font>
	<font color="#400000"><b>PIS</b> :&nbsp;</font><font color="#004600">Proposed Increment Salary,&nbsp;</font>
	<font color="#400000"><b>PSC</b> :&nbsp;</font><font color="#004600">Proposed Salary Correction,&nbsp;</font>
	<font color="#400000"><b>TISPM</b> :&nbsp;</font><font color="#004600">Total Increment Salary Per Month&nbsp;</font>
   </td>
   </tr>
   <tr>
<?php if($_REQUEST['value']!='All') {$sqlC=mysql_query("select DepartmentName from hrm_department where DepartmentId=".$_REQUEST['value'], $con); $resC=mysql_fetch_assoc($sqlC); }?>	
	 <td colspan="19" valign="top" style=" background-color:#0069D2; font-size:14px; color:#FFFFFF; font-family:Times New Roman; font-weight:bold;">&nbsp;PMS Increment Reports Department Wise :	  &nbsp;&nbsp;(&nbsp;Department - <?php if($_REQUEST['value']!='All') {echo $resC['DepartmentName']; } else {echo 'All';} ?>&nbsp;)&nbsp;&nbsp;&nbsp;
	  <a href="#" onClick="PrintDeptInc(<?php echo $_REQUEST['value']; ?>)" style="color:#F9F900; font-size:12px;">Print</a>
	  &nbsp;&nbsp;<a href="#" onClick="ExportDeptInc('<?php echo $_REQUEST['value']; ?>')" style="color:#F9F900; font-size:12px;">Export Excel</a>
	  </td>
	 </tr>
	 <tr bgcolor="#7a6189">
		<td align="center" style="color:#FFFFFF;" class="All_40"><b>SNo.</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_70"><b>EmpCode</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_200"><b>Name</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_120"><b>Department</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_120"><b>New_Department</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_50"><b>Score</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_60"><b>Rating</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_150"><b>CD</b></td>	
		<td align="center" style="color:#FFFFFF;" class="All_150"><b>PD</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_40"><b>CG</b></td>	
       <td align="center" style="color:#FFFFFF;" class="All_40"><b>PG</b></td>
	   <td align="center" style="color:#FFFFFF;" class="All_70"><b>Pre_PGSPM</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_70"><b>PGSPM</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_60"><b>% PIS</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_70"><b>PSC</b></td> 
		<td align="center" style="color:#FFFFFF;" class="All_60"><b>% PSC</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_70"><b>TISPM</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_60"><b>% TISPM</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_70"><b>TPGSPM</b></td>		
	</tr>
<?php if($_REQUEST['value']=='All') {$sqlD=mysql_query("select hrm_employee.*, hrm_employee_general.DepartmentId, hrm_employee_general.DesigId, hrm_employee_general.HqId, hrm_employee_general.GradeId, hrm_employee_general.DesigId, HR_CurrDesigId, HR_CurrGradeId, HR_Score, HR_Rating, HR_Curr_DepartmentId, HR_DepartmentId, HR_DesigId, HR_GradeId, HR_ProIncSalary, HR_Percent_ProIncSalary, HR_ProCorrSalary, HR_Percent_ProCorrSalary, HR_IncNetMonthalySalary, HR_Percent_IncNetMonthalySalary, HR_GrossMonthlySalary, HR_GrossAnnualSalary, HR_CTC from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_pms ON hrm_employee.EmployeeID=hrm_employee_pms.EmployeeID where hrm_employee.CompanyId=".$CompanyId." AND hrm_employee.EmpStatus='A' AND hrm_employee_general.DateJoining<='".$YYear."-06-30' AND (hrm_employee_pms.Appraiser_EmployeeID!='' OR hrm_employee_pms.Appraiser_EmployeeID!=0) AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI'], $con); }

else {$sqlD=mysql_query("select hrm_employee.*, hrm_employee_general.DepartmentId, hrm_employee_general.DesigId, hrm_employee_general.HqId, hrm_employee_general.GradeId, hrm_employee_general.DesigId, HR_CurrDesigId, HR_CurrGradeId, HR_Score, HR_Rating, HR_Curr_DepartmentId, HR_DepartmentId, HR_DesigId, HR_GradeId, HR_ProIncSalary, HR_Percent_ProIncSalary, HR_ProCorrSalary, HR_Percent_ProCorrSalary, HR_IncNetMonthalySalary, HR_Percent_IncNetMonthalySalary, HR_GrossMonthlySalary, HR_GrossAnnualSalary, HR_CTC from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_pms ON hrm_employee.EmployeeID=hrm_employee_pms.EmployeeID where hrm_employee_pms.HR_Curr_DepartmentId=".$_REQUEST['value']." AND hrm_employee.CompanyId=".$CompanyId." AND hrm_employee.EmpStatus='A' AND hrm_employee_general.DateJoining<='".$YYear."-06-30' AND (hrm_employee_pms.Appraiser_EmployeeID!='' OR hrm_employee_pms.Appraiser_EmployeeID!=0) AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI'], $con); }
$Sno=1; while($resD=mysql_fetch_array($sqlD)){ ?>        
 <tr bgcolor="#FFFFFF" <?php //if($Sno%2==0){ echo 'bgcolor="#FFE1FF"';  } else { echo 'bgcolor="#FFFFFF"';}?>>
		<td align="center" style="" class="All_40"><?php echo $Sno; ?></td>
		<td align="center" style="" class="All_70"><?php echo $resD['EmpCode']; ?></td>
		<td align="" style="" class="All_200"><?php echo $resD['Fname'].' '.$resD['Sname'].' '.$resD['Lname']; ?></td>
<?php $sqlDept=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$resD['HR_Curr_DepartmentId'], $con); $resDept=mysql_fetch_assoc($sqlDept); ?>		
		<td align="" style="" class="All_120"><?php echo $resDept['DepartmentCode']; ?></td>
<?php $sqlDept2=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$resD['HR_DepartmentId'], $con); $resDept2=mysql_fetch_assoc($sqlDept2); ?>		
		<td align="" style="" class="All_120"><?php if($resD['HR_Curr_DepartmentId']!=$resD['HR_DepartmentId']){echo $resDept2['DepartmentCode'];} else {echo '';} ?></td>		
		
		<td align="center" style="" class="All_50"><?php echo $resD['HR_Score']; ?></td>
		<td align="center" style="" class="All_60"><?php echo $resD['HR_Rating']; ?></td>		
<?php $sqlDesig=mysql_query("select DesigName from hrm_designation where DesigId=".$resD['HR_CurrDesigId'], $con); $resDesig=mysql_fetch_assoc($sqlDesig); ?>		
		<td align="" style="" class="All_150"><?php echo $resDesig['DesigName']; ?></td>
<?php $sqlDesig2=mysql_query("select DesigName from hrm_designation where DesigId=".$resD['HR_DesigId'], $con); $resDesig2=mysql_fetch_assoc($sqlDesig2); ?>				
		<td align="" style="" class="All_150"><?php if($resD['HR_DesigId']!=$resD['HR_CurrDesigId']){echo $resDesig2['DesigName']; }?></td>
<?php $sqlG=mysql_query("select GradeValue from hrm_grade where GradeId=".$resD['HR_CurrGradeId'], $con); $resG=mysql_fetch_assoc($sqlG); ?>		
		<td align="center" style="" class="All_40"><?php echo $resG['GradeValue']; ?></td>
<?php $sqlG2=mysql_query("select GradeValue from hrm_grade where GradeId=".$resD['HR_GradeId'], $con); $resG2=mysql_fetch_assoc($sqlG2); ?>				
		<td align="center" style="" class="All_40"><?php if($resD['HR_GradeId']!=$resD['HR_CurrGradeId']){echo $resG2['GradeValue'];} ?></td>
<?php $sqlPre=mysql_query("select Previous_GrossSalaryPM from hrm_pms_appraisal_history where EmpCode=".$resD['EmpCode']." AND CompanyId=".$CompanyId." AND YearId=".$_REQUEST['YI'], $con); $resPre=mysql_fetch_assoc($sqlPre); ?>		
		<td align="right" style="" class="All_70" bgcolor="#66B3FF"><?php echo $resPre['Previous_GrossSalaryPM']; ?>&nbsp;</td>
        <td align="right" style="" class="All_70"><?php echo $resD['HR_ProIncSalary']; ?>&nbsp;</td>
		<td align="center" style="" class="All_60"><?php echo $resD['HR_Percent_ProIncSalary']; ?></td>
		<td align="right" style="" class="All_70"><?php echo $resD['HR_ProCorrSalary']; ?>&nbsp;</td> 
		<td align="center" style="" class="All_60"><?php echo $resD['HR_Percent_ProCorrSalary']; ?></td>
		<td align="right" style="" class="All_70"><?php echo $resD['HR_IncNetMonthalySalary']; ?>&nbsp;</td>
		<td bgcolor="#D5FFD5" align="center" style="" class="All_60"><?php echo $resD['HR_Percent_IncNetMonthalySalary']; ?></td>
		<td bgcolor="#66B3FF" align="right" style="" class="All_70"><?php echo $resD['HR_GrossMonthlySalary']; ?>&nbsp;</td>	
	 </tr>
	 <?php $Sno++; } ?> 
   </table>
 </td>
</tr> 
<?php } if($_REQUEST['action']=='StdDeptInc') { ?>
<tr>
 <td>
   <table border="1" width="1200">
   <tr>
<?php if($_REQUEST['value']!='All') {$sqlC=mysql_query("select DepartmentName from hrm_department where DepartmentId=".$_REQUEST['value'], $con); $resC=mysql_fetch_assoc($sqlC); }?>	
	 <td colspan="19" valign="top" style=" background-color:#0069D2; font-size:14px; color:#FFFFFF; font-family:Times New Roman; font-weight:bold;">&nbsp;PMS Standard Reports :	  &nbsp;&nbsp;(&nbsp;Department - <?php if($_REQUEST['value']!='All') {echo $resC['DepartmentName']; } else {echo 'All';} ?>&nbsp;)&nbsp;&nbsp;&nbsp;
	 <input type="hidden" id="StdValue" value="<?php echo $_REQUEST['value']; ?>" />
	 </td>
	 </tr>
	 <tr bgcolor="#7a6189">
		<td rowspan="2" align="center" valign="middle" style="color:#FFFFFF;" class="All_40"><b>SNo.</b></td>
		<td colspan="5" align="center" style="color:#FFFFFF;" class="All_100"><b>Employee Details</b></td>
<?php $FD=date("Y",strtotime($rY['FromDate'])); $TD=date("Y",strtotime($rY['ToDate'])); $FD1=$FD-1; $PRD1=$FD1.'-'.$FD; $PRD2=$FD.'-'.$TD; ?>

		<td colspan="2" align="center" style="color:#FFFFFF;" class="All_100"><b><?php echo $PRD1; ?></b></td>
		<td rowspan="2" align="center" valign="middle" style="color:#FFFFFF;" class="All_60"><b>Status</b></td>
		<td colspan="2" align="center" style="color:#FFFFFF;" class="All_100"><b><?php echo $PRD2; ?></b></td>
		<td rowspan="2" align="center" valign="middle" style="color:#FFFFFF;" class="All_80"><b>Salary Change(%)</b></td>
		<td rowspan="2" align="center" valign="middle" style="color:#FFFFFF;" class="All_80"><b>CTC Change(%)</b></td>	
	</tr>
	 <tr bgcolor="#7a6189">
		<td align="center" style="color:#FFFFFF;" class="All_70"><b>EC</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_200"><b>Name</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_120"><b><?php if($_REQUEST['act']=='d' OR $_REQUEST['act']=='g' OR $_REQUEST['act']=='de'){ ?><a href="#" onClick="StdIncDept(1)" style="text-decoration:none;">Department</a><?php }elseif($_REQUEST['act']=='dept' AND $_REQUEST['gg']==1){?><a href="#" onClick="StdIncDept(2)" style="text-decoration:none;">Department</a><?php } elseif($_REQUEST['act']=='dept' AND $_REQUEST['gg']==2){?><a href="#" onClick="StdIncDept(1)" style="text-decoration:none;">Department</a><?php } ?></b></td>

                <td align="center" style="color:#FFFFFF;" class="All_200"><b><?php if($_REQUEST['act']=='d' OR $_REQUEST['act']=='g' OR $_REQUEST['act']=='dept'){ ?><a href="#" onClick="StdIncDesig(1)" style="text-decoration:none;">Designation</a><?php }elseif($_REQUEST['act']=='de' AND $_REQUEST['gg']==1){?><a href="#" onClick="StdIncDesig(2)" style="text-decoration:none;">Designation</a><?php } elseif($_REQUEST['act']=='de' AND $_REQUEST['gg']==2){?><a href="#" onClick="StdIncDesig(1)" style="text-decoration:none;">Designation</a><?php } ?></b></td>

		<td align="center" style="color:#FFFFFF;" class="All_60"><b><?php if($_REQUEST['act']=='d' OR $_REQUEST['act']=='de' OR $_REQUEST['act']=='dept'){ ?><a href="#" onClick="StdIncGrade(1)" style="text-decoration:none;">Grade</a><?php }elseif($_REQUEST['act']=='g' AND $_REQUEST['gg']==1){?><a href="#" onClick="StdIncGrade(2)" style="text-decoration:none;">Grade</a><?php } elseif($_REQUEST['act']=='g' AND $_REQUEST['gg']==2){?><a href="#" onClick="StdIncGrade(1)" style="text-decoration:none;">Grade</a><?php } ?></b></td>

	<?php /*		<td align="center" style="color:#FFFFFF;" class="All_200"><b>HOD</b></td> */ ?>
		<td align="center" style="color:#FFFFFF;" class="All_100"><b>Salary</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_100"><b>CTC</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_100"><b>Salary</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_100"><b>CTC</b></td>
	</tr>
<?php if($_REQUEST['value']=='All') 
{ if($_REQUEST['act']=='d'){ $sqlD=mysql_query("select hrm_employee_pms.EmployeeID,HR_Curr_DepartmentId,HR_CurrDesigId,HR_CurrGradeId,EmpCurrGrossPM,HOD_EmployeeID,Hod_ProCorrSalary,HodSubmit_IncStatus,Hod_GrossMonthlySalary,DateJoining,EmpCode,Fname,Sname,Lname,DesigName from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_designation ON hrm_employee_pms.HR_CurrDesigId=hrm_designation.DesigId where hrm_employee.CompanyId=".$CompanyId." AND hrm_employee.EmpStatus='A' AND hrm_employee_general.DateJoining<='".$YYear."-06-30' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." order by EmpCode ASC", $con);} 
 elseif($_REQUEST['act']=='g' AND $_REQUEST['gg']==1){ $sqlD=mysql_query("select hrm_employee_pms.EmployeeID,HR_Curr_DepartmentId,HR_CurrDesigId,HR_CurrGradeId,EmpCurrGrossPM,HOD_EmployeeID,Hod_ProCorrSalary,HodSubmit_IncStatus,Hod_GrossMonthlySalary,DateJoining,EmpCode,Fname,Sname,Lname,DesigName from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_designation ON hrm_employee_pms.HR_CurrDesigId=hrm_designation.DesigId where hrm_employee.CompanyId=".$CompanyId." AND hrm_employee.EmpStatus='A' AND hrm_employee_general.DateJoining<='".$YYear."-06-30' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." order by HR_CurrGradeId ASC, EmpCode ASC", $con);}
 elseif($_REQUEST['act']=='g' AND $_REQUEST['gg']==2){ $sqlD=mysql_query("select hrm_employee_pms.EmployeeID,HR_Curr_DepartmentId,HR_CurrDesigId,HR_CurrGradeId,EmpCurrGrossPM,HOD_EmployeeID,Hod_ProCorrSalary,HodSubmit_IncStatus,Hod_GrossMonthlySalary,DateJoining,EmpCode,Fname,Sname,Lname,DesigName from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_designation ON hrm_employee_pms.HR_CurrDesigId=hrm_designation.DesigId where hrm_employee.CompanyId=".$CompanyId." AND hrm_employee.EmpStatus='A' AND hrm_employee_general.DateJoining<='".$YYear."-06-30' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." order by HR_CurrGradeId DESC, EmpCode ASC", $con);} 
 elseif($_REQUEST['act']=='de' AND $_REQUEST['gg']==1){ $sqlD=mysql_query("select hrm_employee_pms.EmployeeID,HR_Curr_DepartmentId,HR_CurrDesigId,HR_CurrGradeId,EmpCurrGrossPM,HOD_EmployeeID,Hod_ProCorrSalary,HodSubmit_IncStatus,Hod_GrossMonthlySalary,DateJoining,EmpCode,Fname,Sname,Lname,DesigName from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_designation ON hrm_employee_pms.HR_CurrDesigId=hrm_designation.DesigId where hrm_employee.CompanyId=".$CompanyId." AND hrm_employee.EmpStatus='A' AND hrm_employee_general.DateJoining<='".$YYear."-06-30' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." order by DesigName ASC, HR_CurrGradeId ASC, EmpCode ASC", $con);}
 elseif($_REQUEST['act']=='de' AND $_REQUEST['gg']==2){ $sqlD=mysql_query("select hrm_employee_pms.EmployeeID,HR_Curr_DepartmentId,HR_CurrDesigId,HR_CurrGradeId,EmpCurrGrossPM,HOD_EmployeeID,Hod_ProCorrSalary,HodSubmit_IncStatus,Hod_GrossMonthlySalary,DateJoining,EmpCode,Fname,Sname,Lname,DesigName from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_designation ON hrm_employee_pms.HR_CurrDesigId=hrm_designation.DesigId where hrm_employee.CompanyId=".$CompanyId." AND hrm_employee.EmpStatus='A' AND hrm_employee_general.DateJoining<='".$YYear."-06-30' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." order by DesigName DESC, HR_CurrGradeId ASC, EmpCode ASC", $con);} 

 elseif($_REQUEST['act']=='dept' AND $_REQUEST['gg']==1){ $sqlD=mysql_query("select hrm_employee_pms.EmployeeID,HR_Curr_DepartmentId,HR_CurrDesigId,HR_CurrGradeId,EmpCurrGrossPM,HOD_EmployeeID,Hod_ProCorrSalary,HodSubmit_IncStatus,Hod_GrossMonthlySalary,DateJoining,EmpCode,Fname,Sname,Lname,DesigName,DepartmentCode from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_designation ON hrm_employee_pms.HR_CurrDesigId=hrm_designation.DesigId INNER JOIN hrm_department ON hrm_employee_pms.HR_Curr_DepartmentId=hrm_department.DepartmentId where hrm_employee.CompanyId=".$CompanyId." AND hrm_employee.EmpStatus='A' AND hrm_employee_general.DateJoining<='".$YYear."-06-30' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." order by DepartmentCode ASC, HR_CurrGradeId ASC, EmpCode ASC", $con);}
 elseif($_REQUEST['act']=='dept' AND $_REQUEST['gg']==2){ $sqlD=mysql_query("select hrm_employee_pms.EmployeeID,HR_Curr_DepartmentId,HR_CurrDesigId,HR_CurrGradeId,EmpCurrGrossPM,HOD_EmployeeID,Hod_ProCorrSalary,HodSubmit_IncStatus,Hod_GrossMonthlySalary,DateJoining,EmpCode,Fname,Sname,Lname,DesigName,DepartmentCode from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_designation ON hrm_employee_pms.HR_CurrDesigId=hrm_designation.DesigId INNER JOIN hrm_department ON hrm_employee_pms.HR_Curr_DepartmentId=hrm_department.DepartmentId where hrm_employee.CompanyId=".$CompanyId." AND hrm_employee.EmpStatus='A' AND hrm_employee_general.DateJoining<='".$YYear."-06-30' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." order by DepartmentCode DESC, HR_CurrGradeId ASC, EmpCode ASC", $con);} 
}
else
{ if($_REQUEST['act']=='d'){ $sqlD=mysql_query("select hrm_employee_pms.EmployeeID,HR_Curr_DepartmentId,HR_CurrDesigId,HR_CurrGradeId,EmpCurrGrossPM,HOD_EmployeeID,Hod_ProCorrSalary,HodSubmit_IncStatus,Hod_GrossMonthlySalary, EmpCode,Fname,Sname,Lname,DesigName from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_designation ON hrm_employee_pms.HR_CurrDesigId=hrm_designation.DesigId where hrm_employee.CompanyId=".$CompanyId." AND hrm_employee.EmpStatus='A' AND hrm_employee_pms.HR_Curr_DepartmentId=".$_REQUEST['value']." AND hrm_employee_general.DateJoining<='".$YYear."-06-30' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." order by EmpCode ASC", $con);}
elseif($_REQUEST['act']=='g' AND $_REQUEST['gg']==1){ $sqlD=mysql_query("select hrm_employee_pms.EmployeeID,HR_Curr_DepartmentId,HR_CurrDesigId,HR_CurrGradeId,EmpCurrGrossPM,HOD_EmployeeID,Hod_ProCorrSalary,HodSubmit_IncStatus,Hod_GrossMonthlySalary, EmpCode,Fname,Sname,Lname,DesigName from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_designation ON hrm_employee_pms.HR_CurrDesigId=hrm_designation.DesigId where hrm_employee.CompanyId=".$CompanyId." AND hrm_employee.EmpStatus='A' AND hrm_employee_pms.HR_Curr_DepartmentId=".$_REQUEST['value']." AND hrm_employee_general.DateJoining<='".$YYear."-06-30' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." order by HR_CurrGradeId ASC, EmpCode ASC", $con);}
elseif($_REQUEST['act']=='g' AND $_REQUEST['gg']==2){ $sqlD=mysql_query("select hrm_employee_pms.EmployeeID,HR_Curr_DepartmentId,HR_CurrDesigId,HR_CurrGradeId,EmpCurrGrossPM,HOD_EmployeeID,Hod_ProCorrSalary,HodSubmit_IncStatus,Hod_GrossMonthlySalary, EmpCode,Fname,Sname,Lname,DesigName from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_designation ON hrm_employee_pms.HR_CurrDesigId=hrm_designation.DesigId where hrm_employee.CompanyId=".$CompanyId." AND hrm_employee.EmpStatus='A' AND hrm_employee_pms.HR_Curr_DepartmentId=".$_REQUEST['value']." AND hrm_employee_general.DateJoining<='".$YYear."-06-30' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." order by HR_CurrGradeId DESC, EmpCode ASC", $con);}
elseif($_REQUEST['act']=='de' AND $_REQUEST['gg']==1){ $sqlD=mysql_query("select hrm_employee_pms.EmployeeID,HR_Curr_DepartmentId,HR_CurrDesigId,HR_CurrGradeId,EmpCurrGrossPM,HOD_EmployeeID,Hod_ProCorrSalary,HodSubmit_IncStatus,Hod_GrossMonthlySalary, EmpCode,Fname,Sname,Lname,DesigName from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_designation ON hrm_employee_pms.HR_CurrDesigId=hrm_designation.DesigId where hrm_employee.CompanyId=".$CompanyId." AND hrm_employee.EmpStatus='A' AND hrm_employee_pms.HR_Curr_DepartmentId=".$_REQUEST['value']." AND hrm_employee_general.DateJoining<='".$YYear."-06-30' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." order by DesigName ASC, HR_CurrGradeId ASC, EmpCode ASC", $con);}
elseif($_REQUEST['act']=='de' AND $_REQUEST['gg']==2){ $sqlD=mysql_query("select hrm_employee_pms.EmployeeID,HR_Curr_DepartmentId,HR_CurrDesigId,HR_CurrGradeId,EmpCurrGrossPM,HOD_EmployeeID,Hod_ProCorrSalary,HodSubmit_IncStatus,Hod_GrossMonthlySalary, EmpCode,Fname,Sname,Lname,DesigName from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_designation ON hrm_employee_pms.HR_CurrDesigId=hrm_designation.DesigId where hrm_employee.CompanyId=".$CompanyId." AND hrm_employee.EmpStatus='A' AND hrm_employee_pms.HR_Curr_DepartmentId=".$_REQUEST['value']." AND hrm_employee_general.DateJoining<='".$YYear."-06-30' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." order by DesigName DESC, HR_CurrGradeId ASC, EmpCode ASC", $con);}

elseif($_REQUEST['act']=='dept' AND $_REQUEST['gg']==1){ $sqlD=mysql_query("select hrm_employee_pms.EmployeeID,HR_Curr_DepartmentId,HR_CurrDesigId,HR_CurrGradeId,EmpCurrGrossPM,HOD_EmployeeID,Hod_ProCorrSalary,HodSubmit_IncStatus,Hod_GrossMonthlySalary, EmpCode,Fname,Sname,Lname,DesigName,DepartmentCode from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_designation ON hrm_employee_pms.HR_CurrDesigId=hrm_designation.DesigId INNER JOIN hrm_department ON hrm_employee_pms.HR_Curr_DepartmentId=hrm_department.DepartmentId where hrm_employee.CompanyId=".$CompanyId." AND hrm_employee.EmpStatus='A' AND hrm_employee_pms.HR_Curr_DepartmentId=".$_REQUEST['value']." AND hrm_employee_general.DateJoining<='".$YYear."-06-30' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." order by DepartmentCode ASC, HR_CurrGradeId ASC, EmpCode ASC", $con);}
elseif($_REQUEST['act']=='dept' AND $_REQUEST['gg']==2){ $sqlD=mysql_query("select hrm_employee_pms.EmployeeID,HR_Curr_DepartmentId,HR_CurrDesigId,HR_CurrGradeId,EmpCurrGrossPM,HOD_EmployeeID,Hod_ProCorrSalary,HodSubmit_IncStatus,Hod_GrossMonthlySalary, EmpCode,Fname,Sname,Lname,DesigName,DepartmentCode from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_designation ON hrm_employee_pms.HR_CurrDesigId=hrm_designation.DesigId INNER JOIN hrm_department ON hrm_employee_pms.HR_Curr_DepartmentId=hrm_department.DepartmentId where hrm_employee.CompanyId=".$CompanyId." AND hrm_employee.EmpStatus='A' AND hrm_employee_pms.HR_Curr_DepartmentId=".$_REQUEST['value']." AND hrm_employee_general.DateJoining<='".$YYear."-06-30' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." order by DepartmentCode DESC, HR_CurrGradeId ASC, EmpCode ASC", $con);} 
}
$Sno=1; while($resD=mysql_fetch_array($sqlD)){ ?>       
 <tr bgcolor="#FFFFFF" <?php //if($Sno%2==0){ echo 'bgcolor="#FFE1FF"';  } else { echo 'bgcolor="#FFFFFF"';}?>>
		<td align="center" style="" class="All_40"><?php echo $Sno; ?></td>
		<td align="center" style="" class="All_70"><?php echo $resD['EmpCode']; ?></td>
		<td align="" style="" class="All_200"><?php echo $resD['Fname'].' '.$resD['Sname'].' '.$resD['Lname']; ?></td>
<?php $sqlDept=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$resD['HR_Curr_DepartmentId'], $con); $resDept=mysql_fetch_assoc($sqlDept); ?>		
		<td align="" style="" class="All_120"><?php echo $resDept['DepartmentCode']; ?></td>
                <td align="" style="" class="All_200"><?php echo strtoupper($resD['DesigName']); ?></td>
<?php $sqlG=mysql_query("select GradeValue from hrm_grade where GradeId=".$resD['HR_CurrGradeId'], $con); $resG=mysql_fetch_assoc($sqlG); ?>		
		<td align="center" style="" class="All_60"><?php echo $resG['GradeValue']; ?></td>
<?php $sqlH=mysql_query("select Fname,Sname,Lname from hrm_employee where EmployeeID=".$resD['HOD_EmployeeID'], $con); $resH=mysql_fetch_assoc($sqlH); ?>			
	<?php /*	<td align="" style="" class="All_150"><?php echo $resH['Fname'].' '.$resH['Sname'].' '.$resH['Lname']; ?></td> */ ?>
		<td align="right" style="" class="All_100"><?php echo intval($resD['EmpCurrGrossPM']); ?>&nbsp;</td>
<?php if($FD=='2012'){ $sqlMax = mysql_query("SELECT MAX(CtcId) as MaxCtcId FROM hrm_employee_ctc where EmployeeID=".$resD['EmployeeID']." AND CtcCreatedDate<='".date($FD."-10-01")."'", $con); }else{$sqlMax = mysql_query("SELECT MAX(CtcId) as MaxCtcId FROM hrm_employee_ctc where EmployeeID=".$resD['EmployeeID']." AND CtcCreatedDate<'".date($FD."-10-01")."'", $con);}
 $resMax = mysql_fetch_assoc($sqlMax); $sqlCtc = mysql_query("select Tot_CTC FROM hrm_employee_ctc where CtcId=".$resMax['MaxCtcId'], $con); $Ctc = mysql_fetch_assoc($sqlCtc);  ?>		
		<td align="right" style="" class="All_100"><?php echo intval($Ctc['Tot_CTC']); ?>&nbsp;</td>
		
		<td align="center" style="" class="All_60"><b><?php if($resD['HodSubmit_IncStatus']==2){echo '<font color="#006600">F</font>';}else{echo '<font color="#FF8000">T</font>';} ?></b></td>
<?php if($resD['HodSubmit_IncStatus']==2){ $Gross=$resD['Hod_GrossMonthlySalary'];}
      else
	  {
$sqlRat=mysql_query("select Reviewer_TotalFinalRating,Hod_TotalFinalRating from hrm_employee_pms where EmployeeID=".$resD['EmployeeID']." AND AssessmentYear=".$_REQUEST['YI'], $con); 
$resRat=mysql_fetch_array($sqlRat); 
	  if($resRat['Hod_TotalFinalRating']>0){$RatingHod=$resRat['Hod_TotalFinalRating']; } else {$RatingHod=$resRat['Reviewer_TotalFinalRating'];} 
$sqlMaxMin= mysql_query("SELECT IncDistriFrom,IncDistriTo FROM hrm_pms_increment_dis WHERE Rating=".$RatingHod." AND YearId=".$_REQUEST['YI']." AND CompanyId=".$CompanyId, $con); $resMaxMin = mysql_fetch_assoc($sqlMaxMin); 
	  
/*************************** Calculation **************************************************************/	 
  if($FD1<2017)
  {
  
   if($resD['DateJoining']<=$FD1.'-09-30' AND $RatingHod>0)
  { 
	$TotIncAmt=($resD['EmpCurrGrossPM']*$resMaxMin['IncDistriFrom'])/100;
	$NewGrossAmt=10*(ceil(($resD['EmpCurrGrossPM']+$TotIncAmt)/10));
	$NewGrossAmt2=$resD['EmpCurrGrossPM']+$TotIncAmt;  
  }
  elseif($resD['DateJoining']>=$FD1.'-10-01' AND $resDJ['DateJoining']<=$FD.'-03-31' AND $RatingHod>0)
  {  
   $date1 = new DateTime($resD['DateJoining']);  $date2 = new DateTime($FD."-09-30");
   $interval = date_diff($date2, $date1);
   $Y=$interval->format('%y');  $M=$interval->format('%m');  $D=$interval->format('%d')+1;
   $PerM=$resMaxMin['IncDistriFrom']/12;  $PerD=$PerM/30;
   $Month_Per=round($PerM*$M, 2); $Day_Per=round($PerD*$D, 2);
   $MSal=($resD['EmpCurrGrossPM']*$Month_Per)/100; 
   $DSal=($resD['EmpCurrGrossPM']*$Day_Per)/100; 
   $TotInc=round($MSal+$DSal);
   $NewGrossAmt=10*(ceil(($resD['EmpCurrGrossPM']+$TotInc)/10)); 
   $NewGrossAmt2=$resD['EmpCurrGrossPM']+$TotInc; 
  }                                                    
  else
  {
	 $NewGrossAmt=10*(ceil($resD['EmpCurrGrossPM']/10));  
	 $NewGrossAmt2=$resD['EmpCurrGrossPM'];
  } 
/***************************If Prorata  wise Extra Not allow previous time PMS process **************************************************************/	 
  if($resD['DateJoining']>=$FD1.'-04-01' AND $resD['DateJoining']<=$FD1.'-09-30' AND $RatingHod>0)
  {  
   $date11 = new DateTime($resD['DateJoining']);  $date22 = new DateTime($FD1."-09-30");
   $interval = date_diff($date22, $date11);
   $YY=$interval->format('%y');  $MM=$interval->format('%m');  $DD=$interval->format('%d')+1;
   $PerM2=$resMaxMin['IncDistriFrom']/12;  $PerD2=$PerM2/30;
   $Month_Per2=round($PerM2*$MM, 2); $Day_Per2=round($PerD2*$DD, 2);
   $MSal2=($resD['EmpCurrGrossPM']*$Month_Per2)/100; 
   $DSal2=($resD['EmpCurrGrossPM']*$Day_Per2)/100; 
   $TotInc2=round($MSal2+$DSal2);    
  }     
  else{ $TotInc2=0; }                              
  if($TotInc2>0){$ActualNewGS=10*(ceil(($NewGrossAmt2+$TotInc2)/10));}
  else{$ActualNewGS=10*(ceil(($NewGrossAmt+$TotInc2)/10));}
  $Gross=$ActualNewGS+$resD['Hod_ProCorrSalary'];
  
  }
  else
  {
  
    if($resD['DateJoining']<=$FD1.'-12-31' AND $RatingHod>0)
    { 
	$TotIncAmt=($resD['EmpCurrGrossPM']*$resMaxMin['IncDistriFrom'])/100;
	$NewGrossAmt=10*(ceil(($resD['EmpCurrGrossPM']+$TotIncAmt)/10));
	$NewGrossAmt2=$resD['EmpCurrGrossPM']+$TotIncAmt;  
    }
    elseif($resD['DateJoining']>=$FD.'-01-01' AND $resDJ['DateJoining']<=$FD.'-06-30' AND $RatingHod>0)
  {  
   $date1 = new DateTime($resD['DateJoining']);  $date2 = new DateTime($FD."-09-30");
   $interval = date_diff($date2, $date1);
   $Y=$interval->format('%y');  $M=$interval->format('%m');  $D=$interval->format('%d')+1;
   $PerM=$resMaxMin['IncDistriFrom']/12;  $PerD=$PerM/30;
   $Month_Per=round($PerM*$M, 2); $Day_Per=round($PerD*$D, 2);
   $MSal=($resD['EmpCurrGrossPM']*$Month_Per)/100; 
   $DSal=($resD['EmpCurrGrossPM']*$Day_Per)/100; 
   $TotInc=round($MSal+$DSal);
   $NewGrossAmt=10*(ceil(($resD['EmpCurrGrossPM']+$TotInc)/10)); 
   $NewGrossAmt2=$resD['EmpCurrGrossPM']+$TotInc; 
  }                                                    
  else
  {
	 $NewGrossAmt=10*(ceil($resD['EmpCurrGrossPM']/10));  
	 $NewGrossAmt2=$resD['EmpCurrGrossPM'];
  } 
/***************************If Prorata  wise Extra Not allow previous time PMS process **************************************************************/	 
  if($resD['DateJoining']>=$FD1.'-07-01' AND $resD['DateJoining']<=$FD1.'-12-31' AND $RatingHod>0)
  {  
   $date11 = new DateTime($resD['DateJoining']);  $date22 = new DateTime($FD1."-09-30");
   $interval = date_diff($date22, $date11);
   $YY=$interval->format('%y');  $MM=$interval->format('%m');  $DD=$interval->format('%d')+1;
   $PerM2=$resMaxMin['IncDistriFrom']/12;  $PerD2=$PerM2/30;
   $Month_Per2=round($PerM2*$MM, 2); $Day_Per2=round($PerD2*$DD, 2);
   $MSal2=($resD['EmpCurrGrossPM']*$Month_Per2)/100; 
   $DSal2=($resD['EmpCurrGrossPM']*$Day_Per2)/100; 
   $TotInc2=round($MSal2+$DSal2);    
  }     
  else{ $TotInc2=0; }                              
  if($TotInc2>0){$ActualNewGS=10*(ceil(($NewGrossAmt2+$TotInc2)/10));}
  else{$ActualNewGS=10*(ceil(($NewGrossAmt+$TotInc2)/10));}
  $Gross=$ActualNewGS+$resD['Hod_ProCorrSalary'];
   
  }
  
  
  
  
  
 }
?>		
		<td align="right" style="" class="All_10"><?php echo intval($Gross); ?>&nbsp;</td>
<?php $sqlTotC=mysql_query("select Tot_CTC from hrm_employee_ctc where EmployeeID=".$resD['EmployeeID']." AND (CtcCreatedDate>='".date($FD."-10-01")."' AND CtcCreatedDate<='".date($FD."-12-31")."')", $con); $resTotC=mysql_fetch_assoc($sqlTotC); ?>		
		<td align="right" style="" class="All_100"><?php if($resTotC['Tot_CTC']>0){echo intval($resTotC['Tot_CTC']);}else{echo '';} ?>&nbsp;</td>
<?php $OnePer=($resD['EmpCurrGrossPM']*1)/100; $IncGross=$Gross-$resD['EmpCurrGrossPM']; $ActPerInc=$IncGross/$OnePer;?>		
		<td align="center" style="" class="All_80"><?php echo round($ActPerInc, 2); ?>&nbsp;</td>
<?php $COnePer=($Ctc['Tot_CTC']*1)/100; $CIncGross=$resTotC['Tot_CTC']-$Ctc['Tot_CTC']; $CActPerInc=$CIncGross/$COnePer;?>		
		<td align="center" style="" class="All_80"><?php if($CActPerInc>0){echo round($CActPerInc, 2);} else{ ''; } ?>&nbsp;</td>
		

	 </tr>
	 <?php $Sno++; } ?> 
   </table>
 </td>
</tr> 
<?php } if($_REQUEST['action']=='HodInc') { ?>
<tr>
 <td>
   <table border="1" width="1500">
   <tr bgcolor="#FFFFFF" style="height:20px;">
    <td colspan="19" style="font-family:Times New Roman; font-size:12px;">
	<font color="#400000"><b>CD</b> :&nbsp;</font><font color="#004600">Current Designation,&nbsp;</font>
	<font color="#400000"><b>PD</b> :&nbsp;</font><font color="#004600">Proposed Designation,&nbsp;</font>
	<font color="#400000"><b>CG</b> :&nbsp;</font><font color="#004600">Current Grade,&nbsp;</font>
	<font color="#400000"><b>PG</b> :&nbsp;</font><font color="#004600">Proposed Grade,&nbsp;</font>
	<font color="#400000"><b>PGSPM</b> :&nbsp;</font><font color="#004600">Proposed Gross Salary Per Month,&nbsp;</font>
	<font color="#400000"><b>PIS</b> :&nbsp;</font><font color="#004600">Proposed Increment Salary,&nbsp;</font>
	<font color="#400000"><b>PSC</b> :&nbsp;</font><font color="#004600">Proposed Salary Correction,&nbsp;</font>
	<font color="#400000"><b>TISPM</b> :&nbsp;</font><font color="#004600">Total Increment Salary Per Month&nbsp;</font>
   </td>
   </tr>
   <tr>
<?php $sqlB=mysql_query("select Fname, Sname, Lname from hrm_employee where EmployeeId=".$_REQUEST['value'], $con); $resB=mysql_fetch_assoc($sqlB); ?>   
	 <td colspan="19" valign="top" style=" background-color:#0069D2; font-size:14px; color:#FFFFFF; font-family:Times New Roman; font-weight:bold;">&nbsp;PMS Increment Reports HOD Wise :
	  &nbsp;&nbsp;(&nbsp;HOD - <?php echo $resB['Fname'].' '.$resB['Sname'].' '.$resB['Lname']; ?>&nbsp;)&nbsp;&nbsp;&nbsp;
	  <a href="#" onClick="PrintHodInc(<?php echo $_REQUEST['value']; ?>)" style="color:#F9F900; font-size:12px;">Print</a>
	  &nbsp;&nbsp;<a href="#" onClick="ExportHodInc('<?php echo $_REQUEST['value']; ?>')" style="color:#F9F900; font-size:12px;">Export Excel</a>
	  </td>
	 </tr>
	 <tr bgcolor="#7a6189">
		<td align="center" style="color:#FFFFFF;" class="All_40"><b>SNo.</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_70"><b>EmpCode</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_200"><b>Name</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_120"><b>Department</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_120"><b>New_Department</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_50"><b>Score</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_60"><b>Rating</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_150"><b>CD</b></td>	
		<td align="center" style="color:#FFFFFF;" class="All_150"><b>PD</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_40"><b>CG</b></td>	
		<td align="center" style="color:#FFFFFF;" class="All_40"><b>PG</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_70"><b>Pre_PGSPM</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_70"><b>PGSPM</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_60"><b>% PIS</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_70"><b>PSC</b></td> 
		<td align="center" style="color:#FFFFFF;" class="All_60"><b>% PSC</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_70"><b>TISPM</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_60"><b>% TISPM</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_70"><b>TPGSPM</b></td>		
	</tr>
<?php $sqlD=mysql_query("select hrm_employee.*, hrm_employee_general.DepartmentId, hrm_employee_general.DesigId, hrm_employee_general.HqId, hrm_employee_general.GradeId, hrm_employee_general.DesigId, HR_CurrDesigId, HR_CurrGradeId, HR_Score, HR_Rating, HR_Curr_DepartmentId, HR_DepartmentId, HR_DesigId, HR_GradeId, HR_ProIncSalary, HR_Percent_ProIncSalary, HR_ProCorrSalary, HR_Percent_ProCorrSalary, HR_IncNetMonthalySalary, HR_Percent_IncNetMonthalySalary, HR_GrossMonthlySalary, HR_GrossAnnualSalary, HR_CTC from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_pms ON hrm_employee.EmployeeID=hrm_employee_pms.EmployeeID where hrm_employee.CompanyId=".$CompanyId." AND hrm_employee_general.DateJoining<='".$YYear."-06-30' AND hrm_employee.EmpStatus='A' AND hrm_employee_pms.HOD_EmployeeID=".$_REQUEST['value']." AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI'], $con); 
$Sno=1; while($resD=mysql_fetch_array($sqlD)){ ?>        
	 <tr bgcolor="#FFFFFF" <?php //if($Sno%2==0){ echo 'bgcolor="#FFE1FF"';  } else { echo 'bgcolor="#FFFFFF"';}?>>
		<td align="center" style="" class="All_40"><?php echo $Sno; ?></td>
		<td align="center" style="" class="All_70"><?php echo $resD['EmpCode']; ?></td>
		<td align="" style="" class="All_200"><?php echo $resD['Fname'].' '.$resD['Sname'].' '.$resD['Lname']; ?></td>
<?php $sqlDept=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$resD['HR_Curr_DepartmentId'], $con); $resDept=mysql_fetch_assoc($sqlDept); ?>		
		<td align="" style="" class="All_120"><?php echo $resDept['DepartmentCode']; ?></td>
<?php $sqlDept2=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$resD['HR_DepartmentId'], $con); $resDept2=mysql_fetch_assoc($sqlDept2); ?>		
		<td align="" style="" class="All_120"><?php if($resD['HR_Curr_DepartmentId']!=$resD['HR_DepartmentId']){echo $resDept2['DepartmentCode'];} else {echo '';} ?></td>					
		
		<td align="center" style="" class="All_50"><?php echo $resD['HR_Score']; ?></td>
		<td align="center" style="" class="All_60"><?php echo $resD['HR_Rating']; ?></td>		
<?php $sqlDesig=mysql_query("select DesigName from hrm_designation where DesigId=".$resD['HR_CurrDesigId'], $con); $resDesig=mysql_fetch_assoc($sqlDesig); ?>		
		<td align="" style="" class="All_150"><?php echo $resDesig['DesigName']; ?></td>
<?php $sqlDesig2=mysql_query("select DesigName from hrm_designation where DesigId=".$resD['HR_DesigId'], $con); $resDesig2=mysql_fetch_assoc($sqlDesig2); ?>				
		<td align="" style="" class="All_150"><?php if($resD['HR_DesigId']!=$resD['HR_CurrDesigId']){echo $resDesig2['DesigName']; }?></td>
<?php $sqlG=mysql_query("select GradeValue from hrm_grade where GradeId=".$resD['HR_CurrGradeId'], $con); $resG=mysql_fetch_assoc($sqlG); ?>		
		<td align="center" style="" class="All_40"><?php echo $resG['GradeValue']; ?></td>
<?php $sqlG2=mysql_query("select GradeValue from hrm_grade where GradeId=".$resD['HR_GradeId'], $con); $resG2=mysql_fetch_assoc($sqlG2); ?>				
		<td align="center" style="" class="All_40"><?php if($resD['HR_GradeId']!=$resD['HR_CurrGradeId']){echo $resG2['GradeValue'];} ?></td>
<?php $sqlPre=mysql_query("select Previous_GrossSalaryPM from hrm_pms_appraisal_history where EmpCode=".$resD['EmpCode']." AND CompanyId=".$CompanyId." AND YearId=".$_REQUEST['YI'], $con); $resPre=mysql_fetch_assoc($sqlPre); ?>		
		<td align="right" style="" class="All_70" bgcolor="#66B3FF"><?php echo $resPre['Previous_GrossSalaryPM']; ?>&nbsp;</td>		
        <td align="right" style="" class="All_70"><?php echo $resD['HR_ProIncSalary']; ?>&nbsp;</td>
		<td align="center" style="" class="All_60"><?php echo $resD['HR_Percent_ProIncSalary']; ?></td>
		<td align="right" style="" class="All_70"><?php echo $resD['HR_ProCorrSalary']; ?>&nbsp;</td> 
		<td align="center" style="" class="All_60"><?php echo $resD['HR_Percent_ProCorrSalary']; ?></td>
		<td align="right" style="" class="All_70"><?php echo $resD['HR_IncNetMonthalySalary']; ?>&nbsp;</td>
		<td bgcolor="#D5FFD5" align="center" style="" class="All_60"><?php echo $resD['HR_Percent_IncNetMonthalySalary']; ?></td>
		<td bgcolor="#66B3FF" align="right" style="" class="All_70"><?php echo $resD['HR_GrossMonthlySalary']; ?>&nbsp;</td>	
	 </tr>
	 <?php $Sno++; } ?> 
   </table>
 </td>
</tr> 
<?php } if($_REQUEST['action']=='IncHistory') { ?>
<tr>
 <td>
   <table border="1" width="800">
     <tr>
<?php if($_REQUEST['value']!='All'){$sqlA=mysql_query("select DepartmentName from hrm_department where DepartmentId=".$_REQUEST['value'], $con); $resA=mysql_fetch_assoc($sqlA); } ?>	
	  <td colspan="8" valign="top" style=" background-color:#0069D2; font-size:14px; color:#FFFFFF; font-family:Times New Roman; font-weight:bold;">&nbsp;Employee Increment History :
	  &nbsp;&nbsp;(&nbsp;Department - <?php if($_REQUEST['value']!='All') {echo $resA['DepartmentName']; } else {echo 'All';} ?>&nbsp;)&nbsp;&nbsp;&nbsp;
	  </td>
	 </tr>
	 <tr bgcolor="#7a6189">
		<td align="center" style="color:#FFFFFF;" class="All_50"><b>SNo.</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_80"><b>EmpCode</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_200"><b>Name</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_120"><b>Department</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_200"><b>Designation</b></td>	
		<td align="center" style="color:#FFFFFF;" class="All_100"><b>History</b></td>
	</tr>
<?php if($_REQUEST['value']=='All') {$sqlD=mysql_query("select hrm_employee.*, hrm_employee_general.DepartmentId, hrm_employee_general.DesigId, hrm_employee_general.HqId, hrm_employee_general.GradeId, hrm_employee_general.DesigId, EmpPmsId, Appraiser_EmployeeID, Reviewer_EmployeeID, HOD_EmployeeID, HR_CurrDesigId, HR_CurrGradeId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_pms ON hrm_employee.EmployeeID=hrm_employee_pms.EmployeeID where hrm_employee.CompanyId=".$CompanyId." AND hrm_employee.EmpStatus='A' AND (hrm_employee_pms.Appraiser_EmployeeID!='' OR hrm_employee_pms.Appraiser_EmployeeID!=0) AND hrm_employee_general.DateJoining<='".$YYear."-06-30' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI'], $con); }
else
{ $sqlD=mysql_query("select hrm_employee.*, hrm_employee_general.DepartmentId, hrm_employee_general.DesigId, hrm_employee_general.HqId, hrm_employee_general.GradeId, hrm_employee_general.DesigId, EmpPmsId, Appraiser_EmployeeID, Reviewer_EmployeeID, HOD_EmployeeID, HR_CurrDesigId, HR_CurrGradeId from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_pms ON hrm_employee.EmployeeID=hrm_employee_pms.EmployeeID where hrm_employee_pms.HR_Curr_DepartmentId=".$_REQUEST['value']." AND hrm_employee.CompanyId=".$CompanyId." AND hrm_employee.EmpStatus='A' AND (hrm_employee_pms.Appraiser_EmployeeID!='' OR hrm_employee_pms.Appraiser_EmployeeID!=0) AND hrm_employee_general.DateJoining<='".$YYear."-06-30' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI'], $con); }
$Sno=1; while($resD=mysql_fetch_array($sqlD)){ ?>    
	 <tr bgcolor="#FFFFFF">
		<td align="center" style="" class="All_50"><?php echo $Sno; ?></td>
		<td align="center" style="" class="All_80"><?php echo $resD['EmpCode']; ?></td>
		<td align="" style="" class="All_200"><?php echo $resD['Fname'].' '.$resD['Sname'].' '.$resD['Lname']; ?></td>
<?php $sqlDept=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$resD['DepartmentId'], $con); $resDept=mysql_fetch_assoc($sqlDept); ?>		
		<td align="" style="" class="All_120"><?php echo $resDept['DepartmentCode']; ?></td>
<?php $sqlDesig=mysql_query("select DesigName from hrm_designation where DesigId=".$resD['HR_CurrDesigId'], $con); $resDesig=mysql_fetch_assoc($sqlDesig); ?>		
		<td align="" style="" class="All_200"><?php echo $resDesig['DesigName']; ?></td>
		<td align="center" class="All_100"><a href="#" onClick="OpenIncHis(<?php echo $resD['EmpCode'].','.$CompanyId; ?>)" style="font-size:12px;">Click</a></td>
	 </tr>
	 <?php $Sno++; } ?> 
   </table>
 </td>
</tr> 
<?php } if($_REQUEST['action']=='IncHisAll') { ?>

<tr>
 <td>
   <table border="1" width="1800">
     <?php if($_REQUEST['value']==0) {  ?>	
     <tr>
	  <td colspan="28" valign="top" style=" background-color:#0069D2; font-size:14px; color:#FFFFFF; font-family:Times New Roman; font-weight:bold;">
	  &nbsp;Employee Increment History All: OVER ALL
	   &nbsp;&nbsp;<a href="#" onClick="ExportIncHisAll()" style="color:#F9F900; font-size:12px;">Export Excel</a>
	  </td>
	 </tr>
	 <?php } if($_REQUEST['value']!=0) { ?>
<?php $sqlA=mysql_query("select Fname, Sname, Lname from hrm_employee where EmployeeId=".$_REQUEST['value'], $con); $resA=mysql_fetch_assoc($sqlA); ?>	
	  <tr>
	  <td colspan="28" valign="top" style=" background-color:#0069D2; font-size:14px; color:#FFFFFF; font-family:Times New Roman; font-weight:bold;">
	  &nbsp;Employee Increment History HOD Wise : &nbsp;&nbsp;(&nbsp;<?php echo $resA['Fname'].' '.$resA['Sname'].' '.$resA['Lname']; ?>&nbsp;)&nbsp;&nbsp;&nbsp;
	   &nbsp;&nbsp;<a href="#" onClick="HodExportIncHisAll()" style="color:#F9F900; font-size:12px;">Export Excel</a>
	  </td>
	 </tr>
	 <?php } ?>
	 <tr bgcolor="#7a6189">
		<td align="center" style="color:#FFFFFF;" class="All_40"><b>SNo.</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_50"><b>EC</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_400"><b>Name</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_50"><b>Curr. Grade</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_50"><b>Pro. Grade</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_120"><b>Department</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_360"><b>Curr. Designation</b></td>	
		<td align="center" style="color:#FFFFFF;" class="All_360"><b>Pro. Designation</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_80"><b>Change Date</b></td>	
		<td align="center" style="color:#FFFFFF;" class="All_80"><b>Basic</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_80"><b>Stipend</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_80"><b>HRA</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_80"><b>CA</b></td> 
		<td align="center" style="color:#FFFFFF;" class="All_80"><b>VA</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_80"><b>SA</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_80"><b>PI</b></td> 
		<td align="center" style="color:#FFFFFF;" class="All_80"><b>IBM</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_80"><b>Pre. GrossPM</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_80"><b>Curr. GrossPM</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_80"><b>Pro. GrossPM</b></td>		
		<td align="center" style="color:#FFFFFF;" class="All_80"><b>Bonus</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_50"><b>(%) Pro. GrossPM</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_80"><b>Correction</b></td>		
        <td align="center" style="color:#FFFFFF;" class="All_80"><b>Total Pro. GrossPM</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_50"><b>(%) Total Pro. GrossPM</b></td>
		<td align="center" style="color:#FFFFFF;" class="All_80"><b>Incentive</td>
		<td align="center" style="color:#FFFFFF;" class="All_50"><b>Score</b></td>		
		<td align="center" style="color:#FFFFFF;" class="All_50"><b>Rating</b></td>	
	</tr>
<?php if($_REQUEST['YI']==1){$Y=2012; $yy=12;}elseif($_REQUEST['YI']==2){$Y=2013; $yy=13;}elseif($_REQUEST['YI']==3){$Y=2014; $yy=14;}elseif($_REQUEST['YI']==4){$Y=2015; $yy=15;}elseif($_REQUEST['YI']==5){$Y=2016; $yy=16;}elseif($_REQUEST['YI']==6){$Y=2017; $yy=17;}elseif($_REQUEST['YI']==7){$Y=2018; $yy=18;}elseif($_REQUEST['YI']==8){$Y=2019; $yy=19;}elseif($_REQUEST['YI']==9){$Y=2020; $yy=20;} ?>	
<?php if($_REQUEST['value']==0) {  ?>	
<?php  $sql=mysql_query("select * from hrm_pms_appraisal_history where CompanyId=".$CompanyId." order by EmpCode ASC, SalaryChange_Date ASC", $con); 
       $Sno=1; while($res=mysql_fetch_array($sql)){ 
	   $sqlCheck=mysql_query("select EmpStatus from hrm_employee where EmpCode=".$res['EmpCode']." AND CompanyId=".$CompanyId, $con); $resCheck=mysql_fetch_assoc($sqlCheck);
	   if($resCheck['EmpStatus']=='A'){
	   ?>  	
	 <tr bgcolor="#ffffff">
		<td align="center" style="" class="All_40" valign="top"><?php echo $Sno; ?></td>
		<td align="center" style="" class="All_50" valign="top"><?php echo $res['EmpCode']; ?></td>
<?php $sqlE=mysql_query("select Fname, Sname, Lname from hrm_employee where EmpCode=".$res['EmpCode']." AND CompanyId=".$CompanyId, $con); $resE=mysql_fetch_assoc($sqlE); ?>			
		<td align="" style="" class="All_400" valign="top"><?php echo $resE['Fname'].' '.$resE['Sname'].' '.$resE['Lname']; ?></td>
		<td align="center" style="" class="All_50" valign="top"><?php echo $res['Current_Grade']; ?></td>
		<td align="center" style="" class="All_50" valign="top"><?php echo $res['Proposed_Grade']; ?></td>
		<td align="" style="" class="All_120" valign="top"><?php echo $res['Department']; ?></td>
		<td align="" style="" class="All_360" valign="top"><?php echo $res['Current_Designation']; ?></td>	
		<td align="" style="" class="All_360" valign="top"><?php echo $res['Proposed_Designation']; ?></td>
		<td align="center" style="" class="All_80" valign="top"><?php echo date("d-M-y",strtotime($res['SalaryChange_Date'])); ?></td>	
		<td align="center" style="" class="All_80" valign="top"><?php echo $res['Salary_Basic']; ?></td>
		<td align="center" style="" class="All_80" valign="top"><?php echo $res['Salary_Stipend']; ?></td>
		<td align="center" style="" class="All_80" valign="top"><?php echo $res['Salary_HRA']; ?></td>
		<td align="center" style="" class="All_80" valign="top"><?php echo $res['Salary_CA']; ?></td> 
		<td align="center" style="" class="All_80" valign="top"><?php echo $res['Salary_VA']; ?></td>
		<td align="center" style="" class="All_80" valign="top"><?php echo $res['Salary_SA']; ?></td>
		<td align="center" style="" class="All_80" valign="top"><?php echo $res['Salary_PI']; ?></td> 
		<td align="center" style="" class="All_80" valign="top"><?php echo $res['Industry_Bench_Markinge']; ?></td>
		<td align="center" style="" class="All_80" valign="top"><?php echo $res['Previous_GrossSalaryPM']; ?></td>
		<td align="center" style="" class="All_80" valign="top"><?php echo $res['Current_GrossSalaryPM']; ?></td>
		<td align="center" style="" class="All_80" valign="top"><?php echo $res['Proposed_GrossSalaryPM']; ?></td>		
		<td align="center" style="" class="All_80" valign="top"><?php echo $res['BonusAnnual_September']; ?></td>
		<td align="center" style="" class="All_50" valign="top"><?php echo $res['Prop_PeInc_GSPM']; ?></td>
		<td align="center" style="" class="All_80" valign="top"><?php echo $res['PropSalary_Correction']; ?></td>		
        <td align="center" style="" class="All_80" valign="top"><?php echo $res['TotalProp_GSPM']; ?></td>
		<td align="center" style="" class="All_50" valign="top"><?php echo $res['TotalProp_PerInc_GSPM']; ?></td>
		<td align="center" style="" class="All_80" valign="top"><?php echo $res['Incentive']; ?></td>
		<td align="center" style="" class="All_50" valign="top"><?php echo $res['Score']; ?></td>		
		<td align="center" style="" class="All_50" valign="top"><?php echo $res['Rating']; ?></td>	
	</tr>
<?php } $Sno++; } } elseif($_REQUEST['value']!=0) {?>
<?php $sql=mysql_query("select * from hrm_pms_appraisal_history INNER JOIN hrm_employee ON hrm_pms_appraisal_history.EmpCode=hrm_employee.EmpCode INNER JOIN hrm_employee_pms ON hrm_employee.EmployeeID=hrm_employee_pms.EmployeeID where hrm_pms_appraisal_history.CompanyId=".$CompanyId." AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.HOD_EmployeeID=".$_REQUEST['value']." order by hrm_pms_appraisal_history.EmpCode ASC, hrm_pms_appraisal_history.SalaryChange_Date ASC", $con); 
       $Sno=1; while($res=mysql_fetch_array($sql)){ 
	   $sqlCheck=mysql_query("select EmpStatus,EmployeeID from hrm_employee where EmpCode=".$res['EmpCode']." AND CompanyId=".$CompanyId, $con); $resCheck=mysql_fetch_assoc($sqlCheck);
	   if($resCheck['EmpStatus']=='A'){
	   if($res['SalaryChange_Date']<$YYear.'-10-01'){
	   ?>  	  
	 <tr bgcolor="#ffffff">
		<td align="center" style="" class="All_40" valign="top"><?php echo $Sno; ?></td>
		<td align="center" style="" class="All_50" valign="top"><?php echo $res['EmpCode']; ?></td>
<?php $sqlE=mysql_query("select Fname, Sname, Lname from hrm_employee where EmpCode=".$res['EmpCode']." AND CompanyId=".$CompanyId, $con); $resE=mysql_fetch_assoc($sqlE); ?>			
		<td align="" style="" class="All_400" valign="top"><?php echo $resE['Fname'].' '.$resE['Sname'].' '.$resE['Lname']; ?></td>
		<td align="center" style="" class="All_50" valign="top"><?php echo $res['Current_Grade']; ?></td>
		<td align="center" style="" class="All_50" valign="top"><?php echo $res['Proposed_Grade']; ?></td>
		<td align="" style="" class="All_120" valign="top"><?php echo $res['Department']; ?></td>
		<td align="" style="" class="All_360" valign="top"><?php echo $res['Current_Designation']; ?></td>	
		<td align="" style="" class="All_360" valign="top"><?php echo $res['Proposed_Designation']; ?></td>
		<td align="center" style="" class="All_80" valign="top"><?php echo date("d-M-y",strtotime($res['SalaryChange_Date'])); ?></td>	
		<td align="center" style="" class="All_80" valign="top"><?php echo $res['Salary_Basic']; ?></td>
		<td align="center" style="" class="All_80" valign="top"><?php echo $res['Salary_Stipend']; ?></td>
		<td align="center" style="" class="All_80" valign="top"><?php echo $res['Salary_HRA']; ?></td>
		<td align="center" style="" class="All_80" valign="top"><?php echo $res['Salary_CA']; ?></td> 
		<td align="center" style="" class="All_80" valign="top"><?php echo $res['Salary_VA']; ?></td>
		<td align="center" style="" class="All_80" valign="top"><?php echo $res['Salary_SA']; ?></td>
		<td align="center" style="" class="All_80" valign="top"><?php echo $res['Salary_PI']; ?></td> 
		<td align="center" style="" class="All_80" valign="top"><?php echo $res['Industry_Bench_Markinge']; ?></td>
		<td align="center" style="" class="All_80" valign="top"><?php echo $res['Previous_GrossSalaryPM']; ?></td>
		<td align="center" style="" class="All_80" valign="top"><?php echo $res['Current_GrossSalaryPM']; ?></td>
		<td align="center" style="" class="All_80" valign="top"><?php echo $res['Proposed_GrossSalaryPM']; ?></td>		
		<td align="center" style="" class="All_80" valign="top"><?php echo $res['BonusAnnual_September']; ?></td>
		<td align="center" style="" class="All_50" valign="top"><?php echo $res['Prop_PeInc_GSPM']; ?></td>
		<td align="center" style="" class="All_80" valign="top"><?php echo $res['PropSalary_Correction']; ?></td>		
        <td align="center" style="" class="All_80" valign="top"><?php echo $res['TotalProp_GSPM']; ?></td>
		<td align="center" style="" class="All_50" valign="top"><?php echo $res['TotalProp_PerInc_GSPM']; ?></td>
		<td align="center" style="" class="All_80" valign="top"><?php echo $res['Incentive']; ?></td>
		<td align="center" style="" class="All_50" valign="top"><?php echo $res['Score']; ?></td>		
		<td align="center" style="" class="All_50" valign="top"><?php echo $res['Rating']; ?></td>	
	</tr>	  	
	 <?php } if($res['SalaryChange_Date']>=$YYear.'-10-01') { ?>
<?php $sqlPms=mysql_query("select EmployeeID, Hod_EmpGrade, Hod_EmpDesignation, EmpCurrGrossPM, Hod_TotalFinalScore, Hod_TotalFinalRating, Hod_ProIncSalary, Hod_Percent_ProIncSalary, Hod_ProCorrSalary, Hod_GrossMonthlySalary, Hod_Percent_IncNetMonthalySalary, HR_CurrDesigId, HR_CurrGradeId from hrm_employee_pms where EmployeeID=".$resCheck['EmployeeID']." AND AssessmentYear=".$_REQUEST['YI'], $con); $resPms=mysql_fetch_assoc($sqlPms); 
	  $sqlGD=mysql_query("select GradeId,DesigId from hrm_employee_general where EmployeeID=".$resPms['EmployeeID'], $con); $resGD=mysql_fetch_assoc($sqlGD); ?>	 
	 <tr bgcolor="#CEFFCE">
	  <td align="center" style="" class="All_40" valign="top">&nbsp;</td>
		<td align="center" style="" class="All_50" valign="top"><?php echo $res['EmpCode']; ?></td>
<?php $sqlE2=mysql_query("select Fname, Sname, Lname from hrm_employee where EmpCode=".$resE['EmpCode']." AND CompanyId=".$CompanyId, $con); $resE=mysql_fetch_assoc($sqlE); ?>	
		<td align="" style="" class="All_400" valign="top"><?php echo $resE2['Fname'].' '.$resE2['Sname'].' '.$resE2['Lname']; ?></td>
 <?php $sqlGr=mysql_query("select GradeValue from hrm_grade where GradeId=".$resPms['HR_CurrGradeId'], $con); $resGr=mysql_fetch_assoc($sqlGr);?>				
		<td align="center" style="" class="All_50" valign="top"><?php echo $resGr['GradeValue']; ?></td>
<?php if($resGD['GradeId']!=$resPms['Hod_EmpGrade'] AND $resPms['Hod_EmpGrade']>0){ $HodGrade=$res['Hod_EmpGrade']; } else {$HodGrade=$resGD['GradeId']; } 
 $sqlGr2=mysql_query("select GradeValue from hrm_grade where GradeId=".$HodGrade, $con); $resGr2=mysql_fetch_assoc($sqlGr2);?>		
		<td align="center" style="" class="All_50" valign="top"><?php if($resGr['GradeValue']!=$resGr2['GradeValue']){echo $resGr2['GradeValue']; } ?></td>
		<td align="" style="" class="All_120" valign="top">&nbsp;</td>
 <?php $sqlD1=mysql_query("select DesigName from hrm_designation where DesigId=".$resPms['HR_CurrDesigId'], $con); $resD1=mysql_fetch_assoc($sqlD1);?>		
		<td align="" style="" class="All_360" valign="top"><?php echo $resD1['DesigName'];?></td>	
<?php $sqlD2=mysql_query("select DesigName from hrm_designation where DesigId=".$resPms['Hod_EmpDesignation'], $con); $resD2=mysql_fetch_assoc($sqlD2);?>		
		<td align="" style="" class="All_360" valign="top"><?php if($resPms['DesigId']!=$resPms['Hod_EmpDesignation']){ echo $resD2['DesigName']; } ?></td>
		<td align="center" style="" class="All_80" valign="top"><?php echo '01-Oct-'.$yy; ?></td>	
		<td align="center" style="" class="All_80" valign="top">&nbsp;</td>
		<td align="center" style="" class="All_80" valign="top">&nbsp;</td>
		<td align="center" style="" class="All_80" valign="top">&nbsp;</td>
		<td align="center" style="" class="All_80" valign="top">&nbsp;</td> 
		<td align="center" style="" class="All_80" valign="top">&nbsp;</td>
		<td align="center" style="" class="All_80" valign="top">&nbsp;</td>
		<td align="center" style="" class="All_80" valign="top">&nbsp;</td> 
		<td align="center" style="" class="All_80" valign="top">&nbsp;</td>
		<td align="center" style="" class="All_80" valign="top"><?php echo $resPms['EmpCurrGrossPM']; ?></td>
		<td align="center" style="" class="All_80" valign="top"><?php echo $resPms['EmpCurrGrossPM']; ?></td>
		<td align="center" style="" class="All_80" valign="top"><?php echo $resPms['Hod_ProIncSalary']; ?></td>		
		<td align="center" style="" class="All_80" valign="top">&nbsp;</td>
		<td align="center" style="" class="All_50" valign="top"><?php echo $resPms['Hod_Percent_ProIncSalary']; ?></td>
		<td align="center" style="" class="All_80" valign="top"><?php echo $resPms['Hod_ProCorrSalary']; ?></td>		
        <td align="center" style="" class="All_80" valign="top"><?php echo $resPms['Hod_GrossMonthlySalary']; ?></td>
		<td align="center" style="" class="All_50" valign="top"><?php echo $resPms['Hod_Percent_IncNetMonthalySalary']; ?></td>
		<td align="center" style="" class="All_80" valign="top"><?php echo $resPms['Incentive']; ?></td>
		<td align="center" style="" class="All_50" valign="top"><?php echo $resPms['Hod_TotalFinalScore']; ?></td>		
		<td align="center" style="" class="All_50" valign="top"><?php echo $resPms['Hod_TotalFinalRating']; ?></td>	
	</tr>
	<tr> 
	 <td colspan="20">&nbsp;</td>
	</tr>
	 <?php } ?> 
<?php } $Sno++; } } ?> 
   </table>
 </td>
</tr> 
<?php } if($_REQUEST['action']=='KRA') { ?>
<tr>
 <td>
   <table border="1" width="1100">
     <tr>
<?php $sqlA=mysql_query("select DepartmentName from hrm_department where DepartmentId=".$_REQUEST['value'], $con); $resA=mysql_fetch_assoc($sqlA);  ?>	
	  <td colspan="8" valign="top" style=" background-color:#0069D2; font-size:14px; color:#FFFFFF; font-family:Times New Roman; font-weight:bold;">&nbsp;Employee KRA :
	  &nbsp;&nbsp;(&nbsp;Department - <?php echo $resA['DepartmentName']; ?>&nbsp;)&nbsp;&nbsp;&nbsp;
	  <a href="#" onClick="PrintDumpKRA(<?php echo $_REQUEST['value']; ?>)" style="color:#F9F900; font-size:12px;">Print</a>
	  &nbsp;&nbsp;<a href="#" onClick="ExportKRA('<?php echo $_REQUEST['value']; ?>')" style="color:#F9F900; font-size:12px;">Export Excel</a>
	  </td>
	 </tr>
	 <tr bgcolor="#7a6189">
	   <td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:50px;"><b>SNo</b></td>
	   <td style="color:#ffffff; font-family:Times New Roman; font-size:12px; width:450px;" valign="top" align="center"><b>KRA</b></td>
	   <td style="color:#ffffff; font-family:Times New Roman; font-size:12px; width:500px;" valign="top" align="center"><b>Description</b></td>
	   <td style="color:#ffffff; font-family:Times New Roman; font-size:12px; width:100px;" valign="top" align="center"><b>Measure</b></td>
	   <td style="color:#ffffff; font-family:Times New Roman; font-size:12px; width:100px;" valign="top" align="center"><b>Unit</b></td>
	</tr>
<?php $sqlDP = mysql_query("SELECT * from hrm_pms_kra WHERE (KRAStatus='A' OR KRAStatus='R') AND CompanyId=".$CompanyId." AND YearId=".$_REQUEST['YI']." AND DepartmentId=".$_REQUEST['value'], $con) or die(mysql_error());  $Sno=1;  while($resDP = mysql_fetch_assoc($sqlDP)) { ?>  
	    <tr bgcolor="#FFFFFF">
		   <td align="center" style="font:Georgia; font-size:11px; width:50px;" valign="top"><?php echo $Sno; ?></td>
		   <td style="font-family:Times New Roman;font-size:12px; width:300px;" valign="top"><?php echo $resDP['KRA']; ?></td>
		   <td style="font-family:Times New Roman; font-size:12px; width:700px;" valign="top"><?php echo $resDP['KRA_Description']; ?></td>
		   <td style="font-family:Times New Roman; font-size:12px; width:100px;" valign="top"><?php echo $resDP['Measure']; ?></td>
		   <td align="center" style="font-family:Times New Roman;font-size:12px; width:50px;" valign="top"><?php echo $resDP['Unit']; ?></td>
		</tr>
<?php $Sno++; } ?>
   </table>
 </td>
</tr> 
<?php } if($_REQUEST['action']=='KRAName') { ?>
<tr>
 <td>
   <table border="1" width="1600">
     <tr>
<?php $sqlA=mysql_query("select DepartmentName from hrm_department where DepartmentId=".$_REQUEST['value'], $con); $resA=mysql_fetch_assoc($sqlA);  ?>	
	  <td colspan="10" valign="top" style=" background-color:#0069D2; font-size:14px; color:#FFFFFF; font-family:Times New Roman; font-weight:bold;">&nbsp;Employee KRA :
	  &nbsp;&nbsp;(&nbsp;Department - <?php echo $resA['DepartmentName']; ?>&nbsp;)&nbsp;&nbsp;&nbsp;
	  <a href="#" onClick="PrintDumpKRAName(<?php echo $_REQUEST['value']; ?>)" style="color:#F9F900; font-size:12px;">Print</a>
	  &nbsp;&nbsp;<a href="#" onClick="ExportKRAName('<?php echo $_REQUEST['value']; ?>')" style="color:#F9F900; font-size:12px;">Export Excel</a>
	  </td>
	 </tr>
	 <tr bgcolor="#7a6189">
	   <td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:40px;"><b>SNo</b></td>
	   <td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:50px;"><b>EC</b></td>
	   <td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:210px;"><b>Name</b></td>
	   <td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:250px;"><b>Designation</b></td>
	   <td style="color:#ffffff; font-family:Times New Roman; font-size:12px; width:450px;" valign="top" align="center"><b>KRA</b></td>
	   <td style="color:#ffffff; font-family:Times New Roman; font-size:12px; width:500px;" valign="top" align="center"><b>Description</b></td>
	   <td style="color:#ffffff; font-family:Times New Roman; font-size:12px; width:100px;" valign="top" align="center"><b>Measure</b></td>
	   <td style="color:#ffffff; font-family:Times New Roman; font-size:12px; width:100px;" valign="top" align="center"><b>Unit</b></td>
	   <td style="color:#ffffff; font-family:Times New Roman; font-size:12px; width:100px;" valign="top" align="center"><b>Weightage</b></td>
	   <td style="color:#ffffff; font-family:Times New Roman; font-size:12px; width:100px;" valign="top" align="center"><b>Target</b></td>
	</tr>
<?php $sqlDP = mysql_query("SELECT EmpCode,Fname,Sname,Lname,DesigName,KRA,KRA_Description,Measure,Unit,Weightage,Target FROM hrm_pms_kra INNER JOIN hrm_employee ON hrm_pms_kra.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_general ON hrm_pms_kra.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_designation ON hrm_employee_general.DesigId=hrm_designation.DesigId WHERE hrm_pms_kra.DepartmentId=".$_REQUEST['value']." AND hrm_pms_kra.YearId=".$_REQUEST['YI']."  AND hrm_pms_kra.CompanyId=".$CompanyId." AND hrm_pms_kra.KRAStatus='A' AND hrm_employee_general.DateJoining<='".$YYear."-06-30' order by hrm_employee.EmpCode ASC, hrm_pms_kra.KRAId ASC", $con) or die(mysql_error());  $Sno=1;  while($resDP = mysql_fetch_assoc($sqlDP)) { ?>  
	    <tr bgcolor="#FFFFFF">
		   <td align="center" style="font-family:Times New Roman;font-size:11px; width:40px;" valign="top"><?php echo $Sno; ?></td>
		   <td align="center" style="font-family:Times New Roman;font-size:12px; width:50px;" valign="top"><?php echo $resDP['EmpCode']; ?></td>
		   <td style="font-family:Times New Roman;font-size:12px; width:210px;" valign="top"><?php echo $resDP['Fname'].' '.$resDP['Sname'].' '.$resDP['Lname']; ?></td>
		   <td style="font-family:Times New Roman;font-size:12px; width:250px;" valign="top"><?php echo $resDP['DesigName']; ?></td>
		   <td style="font-family:Times New Roman;font-size:12px; width:300px;" valign="top"><?php echo $resDP['KRA']; ?></td>
		   <td style="font-family:Times New Roman; font-size:12px; width:700px;" valign="top"><?php echo $resDP['KRA_Description']; ?></td>
		   <td style="font-family:Times New Roman; font-size:12px; width:100px;" valign="top"><?php echo $resDP['Measure']; ?></td>
		   <td align="center" style="font-family:Times New Roman;font-size:12px; width:50px;" valign="top"><?php echo $resDP['Unit']; ?></td>
		   <td style="font-family:Times New Roman; font-size:12px; width:100px;" valign="top"><?php echo $resDP['Weightage']; ?></td>
		   <td align="center" style="font-family:Times New Roman;font-size:12px; width:50px;" valign="top"><?php echo $resDP['Target']; ?></td>
		</tr>
<?php $Sno++; } ?>
        
   </table>
 </td>
</tr> 
<?php } if($_REQUEST['action']=='Achiv') { ?>
<tr>
 <td>
   <table border="1" width="1100">
     <tr>
<?php if($_REQUEST['value']!='All'){$sqlA=mysql_query("select DepartmentName from hrm_department where DepartmentId=".$_REQUEST['value'], $con); $resA=mysql_fetch_assoc($sqlA); } ?>	
	  <td colspan="8" valign="top" style=" background-color:#0069D2; font-size:14px; color:#FFFFFF; font-family:Times New Roman; font-weight:bold;">&nbsp;Employee Achivement :
	  &nbsp;&nbsp;(&nbsp;Department - <?php if($_REQUEST['value']!='All') {echo $resA['DepartmentName']; } else {echo 'All Department';}?>&nbsp;)&nbsp;&nbsp;&nbsp;
	  <a href="#" onClick="PrintAchiv('<?php echo $_REQUEST['value']; ?>')" style="color:#F9F900; font-size:12px;">Print</a>
	  &nbsp;&nbsp;<a href="#" onClick="ExportAchiv('<?php echo $_REQUEST['value']; ?>')" style="color:#F9F900; font-size:12px;">Export Excel</a>
	  </td>
	 </tr>
	 <tr bgcolor="#7a6189">
	   <td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:50px;"><b>SNo</b></td>
	   <td style="color:#ffffff; font-family:Times New Roman; font-size:12px; width:800px;" valign="top" align="center"><b>Achivement</b></td>
	</tr>
<?php if($_REQUEST['value']=='All') {$sqlAc = mysql_query("SELECT * from hrm_employee_pms_achivement INNER JOIN hrm_employee_pms ON hrm_employee_pms_achivement.EmpPmsId=hrm_employee_pms.EmpPmsId INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID WHERE hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_general.DateJoining<='".$YYear."-06-30' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms_achivement.Achivement!='' order by AchivementId ASC", $con) or die(mysql_error()); } else {$sqlAc = mysql_query("SELECT * from hrm_employee_pms_achivement INNER JOIN hrm_employee_pms ON hrm_employee_pms_achivement.EmpPmsId=hrm_employee_pms.EmpPmsId INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID WHERE hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_general.DateJoining<='".$YYear."-06-30' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms_achivement.Achivement!='' AND hrm_employee_pms.HR_Curr_DepartmentId=".$_REQUEST['value']." order by AchivementId ASC", $con) or die(mysql_error()); } $Sno=1;  while($resAc = mysql_fetch_assoc($sqlAc)) { ?>  
	    <tr bgcolor="#FFFFFF">
		   <td align="center" style="font:Georgia; font-size:11px; width:50px;" valign="top"><?php echo $Sno; ?></td>
		   <td style="font-family:Times New Roman;font-size:14px; width:800px;" valign="top"><?php echo $resAc['Achivement']; ?></td>
		</tr>
<?php $Sno++; } ?>
   </table>
 </td>
</tr> 
<?php } if($_REQUEST['action']=='Feed') { ?>
<tr>
 <td>
   <table border="1" width="1100">
     <tr>
<?php if($_REQUEST['value']!='All'){$sqlA=mysql_query("select DepartmentName from hrm_department where DepartmentId=".$_REQUEST['value'], $con); $resA=mysql_fetch_assoc($sqlA); } ?>	
	  <td colspan="8" valign="top" style=" background-color:#0069D2; font-size:14px; color:#FFFFFF; font-family:Times New Roman; font-weight:bold;">&nbsp;Employee Achivement :
	  &nbsp;&nbsp;(&nbsp;Department - <?php if($_REQUEST['value']!='All') {echo $resA['DepartmentName']; } else {echo 'All Department';}?>&nbsp;)&nbsp;&nbsp;&nbsp;
	  <a href="#" onClick="PrintFeed('<?php echo $_REQUEST['value']; ?>')" style="color:#F9F900; font-size:12px;">Print</a>
	  &nbsp;&nbsp;<a href="#" onClick="ExportFeed('<?php echo $_REQUEST['value']; ?>')" style="color:#F9F900; font-size:12px;">Export Excel</a>
	  </td>
	 </tr>
	 <tr bgcolor="#7a6189">
	   <td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:50px;"><b>SNo</b></td>
           <td style="color:#ffffff; font-family:Times New Roman; font-size:12px; width:200px;" valign="top" align="center"><b>Name</b></td>
	   <td style="color:#ffffff; font-family:Times New Roman; font-size:12px; width:350px;" valign="top" align="center"><b>Environment</b></td>
	   <td style="color:#ffffff; font-family:Times New Roman; font-size:12px; width:700px;" valign="top" align="center"><b>Feedcack</b></td>
	</tr>
<?php if($_REQUEST['value']=='All') { $sqlFe = mysql_query("SELECT hrm_employee_pms_workenvironment.*,Fname,Sname,Lname from hrm_employee_pms_workenvironment INNER JOIN hrm_employee_pms ON hrm_employee_pms_workenvironment.EmpPmsId=hrm_employee_pms.EmpPmsId INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID WHERE hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_general.DateJoining<='".$YYear."-06-30' AND hrm_employee_pms_workenvironment.Answer!='' order by WorkEnvironment ASC", $con) or die(mysql_error()); } else {$sqlFe = mysql_query("SELECT hrm_employee_pms_workenvironment.*,Fname,Sname,Lname from hrm_employee_pms_workenvironment INNER JOIN hrm_employee_pms ON hrm_employee_pms_workenvironment.EmpPmsId=hrm_employee_pms.EmpPmsId INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID WHERE hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_general.DateJoining<='".$YYear."-06-30' AND hrm_employee_pms_workenvironment.Answer!='' AND hrm_employee_pms.HR_Curr_DepartmentId=".$_REQUEST['value']." order by WorkEnvironment ASC", $con) or die(mysql_error());} $Sno=1;  while($resFe = mysql_fetch_assoc($sqlFe)) { ?>  
	    <tr bgcolor="#FFFFFF">
		   <td align="center" style="font:Georgia; font-size:11px; width:50px;" valign="top"><?php echo $Sno; ?></td>
                   <td style="font-family:Times New Roman;font-size:14px; width:200px;" valign="top"><?php echo $resFe['Fname'].' '.$resFe['Sname'].' '.$resFe['Lname']; ?></td>
		   <td style="font-family:Times New Roman;font-size:14px; width:350px;" valign="top"><?php echo $resFe['WorkEnvironment']; ?></td>
		   <td style="font-family:Times New Roman; font-size:14px; width:700px;" valign="top"><?php echo $resFe['Answer']; ?></td>
		</tr>
<?php $Sno++; } ?>
   </table>
 </td>
</tr> 
<?php } if($_REQUEST['action']=='NFeed') { ?>
<tr>
 <td>
   <table border="1" width="1100">
     <tr>
<?php if($_REQUEST['value']!='All'){$sqlA=mysql_query("select DepartmentName from hrm_department where DepartmentId=".$_REQUEST['value'], $con); $resA=mysql_fetch_assoc($sqlA); } ?>	
	  <td colspan="8" valign="top" style=" background-color:#0069D2; font-size:14px; color:#FFFFFF; font-family:Times New Roman; font-weight:bold;">&nbsp;Employee Achivement :
	  &nbsp;&nbsp;(&nbsp;Department - <?php if($_REQUEST['value']!='All') {echo $resA['DepartmentName']; } else {echo 'All Department';}?>&nbsp;)&nbsp;&nbsp;&nbsp;
	  <a href="#" onClick="PrintNFeed('<?php echo $_REQUEST['value']; ?>')" style="color:#F9F900; font-size:12px;">Print</a>
	  &nbsp;&nbsp;<a href="#" onClick="ExportNFeed('<?php echo $_REQUEST['value']; ?>')" style="color:#F9F900; font-size:12px;">Export Excel</a>
	  </td>
	 </tr>
	 <tr bgcolor="#7a6189">
	   <td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:50px;"><b>SNo</b></td>
	   <td style="color:#ffffff; font-family:Times New Roman; font-size:12px; width:350px;" valign="top" align="center"><b>Environment</b></td>
	   <td style="color:#ffffff; font-family:Times New Roman; font-size:12px; width:700px;" valign="top" align="center"><b>Feedcack</b></td>
	</tr>
<?php $sqlE=mysql_query("select hrm_employee.EmployeeID,EmpCode,Fname,Sname,Lname from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_general.DateJoining<='".$YYear."-06-30' AND hrm_employee_general.DepartmentId=".$_REQUEST['value'],$con); 
while($resE=mysql_fetch_array($sqlE)){$Ename=$resE['EmpCode'].' - '.$resE['Fname'].' '.$resE['Sname'].' '.$resE['Lname'];
?>	
	<tr bgcolor="#7a6189">
	   <td colspan="3" align="left" style="font:Times New Roman;color:#FFFFFF; font-size:12px; width:1000px;">&nbsp;&nbsp;<b><?php echo $Ename; ?></b></td>
	</tr>
<?php if($_REQUEST['value']=='All') { $sqlFe = mysql_query("SELECT * from hrm_employee_pms_workenvironment INNER JOIN hrm_employee_pms ON hrm_employee_pms_workenvironment.EmpPmsId=hrm_employee_pms.EmpPmsId INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID WHERE hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_general.DateJoining<='".$YYear."-06-30' AND hrm_employee_pms.EmployeeID=".$resE['EmployeeID']." AND hrm_employee_pms_workenvironment.Answer!='' order by WorkEnvironment ASC", $con) or die(mysql_error()); } else {$sqlFe = mysql_query("SELECT * from hrm_employee_pms_workenvironment INNER JOIN hrm_employee_pms ON hrm_employee_pms_workenvironment.EmpPmsId=hrm_employee_pms.EmpPmsId INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID WHERE hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_general.DateJoining<='".$YYear."-06-30' AND hrm_employee_pms.EmployeeID=".$resE['EmployeeID']." AND hrm_employee_pms_workenvironment.Answer!='' order by WorkEnvironment ASC", $con) or die(mysql_error());} $Sno=1;  while($resFe = mysql_fetch_assoc($sqlFe)) { ?>  
	    <tr bgcolor="#FFFFFF">
		   <td align="center" style="font:Georgia; font-size:11px; width:50px;" valign="top"><?php echo $Sno; ?></td>
		   <td style="font-family:Times New Roman;font-size:14px; width:350px;" valign="top"><?php echo $resFe['WorkEnvironment']; ?></td>
		   <td style="font-family:Times New Roman; font-size:14px; width:700px;" valign="top"><?php echo $resFe['Answer']; ?></td>
		</tr>
<?php $Sno++; } } ?>
   </table>
 </td>
</tr> 
<?php } if($_REQUEST['action']=='Train') { ?>
<tr>
 <td>
   <table border="1" width="1100">
     <tr>
<?php if($_REQUEST['value']!='All'){$sqlA=mysql_query("select DepartmentName from hrm_department where DepartmentId=".$_REQUEST['value'], $con); $resA=mysql_fetch_assoc($sqlA); } ?>	
	  <td colspan="8" valign="top" style=" background-color:#0069D2; font-size:14px; color:#FFFFFF; font-family:Times New Roman; font-weight:bold;">&nbsp;Employee Achivement :
	  &nbsp;&nbsp;(&nbsp;Department - <?php if($_REQUEST['value']!='All') {echo $resA['DepartmentName']; } else {echo 'All Department';}?>&nbsp;)&nbsp;&nbsp;&nbsp;
	  <a href="#" onClick="PrintTrain('<?php echo $_REQUEST['value']; ?>')" style="color:#F9F900; font-size:12px;">Print</a>
	  &nbsp;&nbsp;<a href="#" onClick="ExportTrain('<?php echo $_REQUEST['value']; ?>')" style="color:#F9F900; font-size:12px;">Export Excel</a>
	  </td>
	 </tr>
	  <tr bgcolor="#7a6189">
	   <td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:50px;"><b>SNo</b></td>
	   <td align="center" style="color:#FFFFFF;" class="All_50"><b>EC</b></td>
	   <td align="center" style="color:#FFFFFF;" class="All_250"><b>Name</b></td>
	   <td colspan="2" style="color:#ffffff;font-family:Times New Roman;font-size:12px;width:500px;" valign="top" align="center"><b>Appraiser</b></td>
	   <td colspan="2" style="color:#ffffff;font-family:Times New Roman;font-size:12px;width:500px;" valign="top" align="center"><b>Reviewer</b></td>
	 </tr>
	 <tr bgcolor="#7a6189">
	   <td align="center" style="font:Georgia; color:#FFFFFF; font-size:12px; width:50px;"><b>&nbsp;</b></td>
	   <td align="center" style="color:#FFFFFF;" class="All_50"><b>&nbsp;</b></td>
	   <td align="center" style="color:#FFFFFF;" class="All_250"><b>&nbsp;</b></td>
	   <td style="color:#ffffff; font-family:Times New Roman; font-size:12px; width:250px;" valign="top" align="center"><b>Soft Skill</b></td>
	   <td style="color:#ffffff; font-family:Times New Roman; font-size:12px; width:250px;" valign="top" align="center"><b>Technincal Skill</b></td>
	   <td style="color:#ffffff; font-family:Times New Roman; font-size:12px; width:250px;" valign="top" align="center"><b>Soft Skill</b></td>
	   <td style="color:#ffffff; font-family:Times New Roman; font-size:12px; width:250px;" valign="top" align="center"><b>Technincal Skill</b></td>
	</tr>
<?php if($_REQUEST['value']=='All') { $sqlTr = mysql_query("SELECT EmpCode, Fname, Sname, Lname, Appraiser_SoftSkill_1, Appraiser_SoftSkill_2, Appraiser_TechSkill_1, Appraiser_TechSkill_2, Reviewer_SoftSkill_1, Reviewer_SoftSkill_2, Reviewer_TechSkill_1, Reviewer_TechSkill_2 from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID WHERE hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_general.DateJoining<='".$YYear."-06-30' order by hrm_employee_pms.EmployeeID ASC", $con) or die(mysql_error()); } else {$sqlTr = mysql_query("SELECT EmpCode, Fname, Sname, Lname, Appraiser_SoftSkill_1, Appraiser_SoftSkill_2, Appraiser_TechSkill_1, Appraiser_TechSkill_2, Reviewer_SoftSkill_1, Reviewer_SoftSkill_2, Reviewer_TechSkill_1, Reviewer_TechSkill_2 from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID WHERE hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_general.DateJoining<='".$YYear."-06-30' AND hrm_employee_pms.HR_Curr_DepartmentId=".$_REQUEST['value']." order by hrm_employee_pms.EmployeeID ASC", $con) or die(mysql_error());}  $Sno=1;  while($resTr = mysql_fetch_assoc($sqlTr)) { ?>  
	    <tr bgcolor="#FFFFFF">
		   <td align="center" style="font-family:Times New Roman; font-size:11px; width:50px;" valign="top"><?php echo $Sno; ?></td>
		   <td align="center" style="font-family:Times New Roman; font-size:11px; width:50px;" valign="top"><?php echo $resTr['EmpCode']; ?></td>
		   <td align="left" style="font-family:Times New Roman; font-size:11px; width:250px;" valign="top"><?php echo $resTr['Fname'].' '.$resTr['Sname'].' '.$resTr['Lname']; ?></td>
		   <td style="background-color:#80BFFF;font-family:Times New Roman;font-size:14px; width:250px;" valign="top"><?php echo $resTr['Appraiser_SoftSkill_1'].', '.$resTr['Appraiser_SoftSkill_2']; ?></td>
		   <td style="background-color:#80BFFF;font-family:Times New Roman; font-size:14px; width:250px;" valign="top"><?php echo $resTr['Appraiser_TechSkill_1'].', '.$resTr['Appraiser_TechSkill_2']; ?></td>
		   <td style="background-color:#FFDECE;font-family:Times New Roman;font-size:14px; width:250px;" valign="top"><?php echo $resTr['Reviewer_SoftSkill_1'].', '.$resTr['Reviewer_SoftSkill_2']; ?></td>
		   <td style="background-color:#FFDECE;font-family:Times New Roman; font-size:14px; width:250px;" valign="top"><?php echo $resTr['Reviewer_TechSkill_1'].', '.$resTr['Reviewer_TechSkill_2']; ?></td>
		</tr>
<?php $Sno++; } ?>
   </table>
 </td>
</tr> 
<?php } if($_REQUEST['action']=='Overall') { ?>
<tr>
 <td>
   <table border="1" width="3000">
     <tr>
<?php if($_REQUEST['value']!=20){$sqlA=mysql_query("select DepartmentName from hrm_department where DepartmentId=".$_REQUEST['value'], $con); $resA=mysql_fetch_assoc($sqlA); } ?>	
	  <td colspan="37" valign="top" style=" background-color:#0069D2; font-size:14px; color:#FFFFFF; font-family:Times New Roman; font-weight:bold;">&nbsp;Employee HRIMS Details :
	  &nbsp;&nbsp;(&nbsp;Department - <?php if($_REQUEST['value']!=20) {echo $resA['DepartmentName']; } else {echo 'All';} ?>&nbsp;)&nbsp;&nbsp;&nbsp;
	  &nbsp;&nbsp;<a href="#" onClick="ExportOverAll('<?php echo $_REQUEST['value']; ?>')" style="color:#F9F900; font-size:12px;">Export Excel</a>
	  </td>
	 </tr>
	 <tr bgcolor="#7a6189">
	   <td style="font-family:Times New Roman; color:#FFFFFF; font-size:12px; width:30px;" valign="top" align="center"><b>SNo</b></td>
	   <td style="color:#ffffff; font-family:Times New Roman; font-size:12px; width:50px;" valign="top" align="center"><b>EC</b></td>
	   <td style="color:#ffffff; font-family:Times New Roman; font-size:12px; width:300px;" valign="top" align=""><b>Name</b></td>
	   <td style="color:#ffffff; font-family:Times New Roman; font-size:12px; width:50px;" valign="top" align="center"><b>Grade</b></td>
	   <td style="color:#ffffff; font-family:Times New Roman; font-size:12px; width:50px;" valign="top" align="center"><b>Pro_Grade</b></td>
	   <td style="color:#ffffff; font-family:Times New Roman; font-size:12px; width:150px;" valign="top" align=""><b>Department</b></td>
	   <td style="color:#ffffff; font-family:Times New Roman; font-size:12px; width:150px;" valign="top" align=""><b>Pro_Department</b></td>
	   <td style="font-family:Times New Roman; color:#FFFFFF; font-size:12px; width:300px;" valign="top" align=""><b>Designation</b></td>
	   <td style="font-family:Times New Roman; color:#FFFFFF; font-size:12px; width:300px;" valign="top" align=""><b>Pro_Designation</b></td>
	   <td style="color:#ffffff; font-family:Times New Roman; font-size:12px; width:300px;" valign="top" align=""><b>Reporting </b></td>
	   <td style="color:#ffffff; font-family:Times New Roman; font-size:12px; width:100px;" valign="top" align="center"><b>Basic</b></td>
	   <td style="color:#ffffff; font-family:Times New Roman; font-size:12px; width:100px;" valign="top" align="center"><b>HRA</b></td>
	   <td style="color:#ffffff; font-family:Times New Roman; font-size:12px; width:100px;" valign="top" align="center"><b>CA</b></td>
	   <td style="font-family:Times New Roman; color:#FFFFFF; font-size:12px; width:100px;" valign="top" align=""><b>SA</b></td>
	   <td style="color:#ffffff; font-family:Times New Roman; font-size:12px; width:100px;" valign="top" align="center"><b>Gross Salary</b></td>
	   <td style="color:#ffffff; font-family:Times New Roman; font-size:12px; width:100px;" valign="top" align="center"><b>Gross Salary(PAC)</b></td>
	   <td style="color:#ffffff; font-family:Times New Roman; font-size:12px; width:100px;" valign="top" align="center"><b>PF Deduction</b></td>
	   <td style="color:#ffffff; font-family:Times New Roman; font-size:12px; width:100px;" valign="top" align="center"><b>Net Salary</b></td>
	   <td style="font-family:Times New Roman; color:#FFFFFF; font-size:12px; width:100px;" valign="top" align="center"><b>LTA</b></td>
	   <td style="color:#ffffff; font-family:Times New Roman; font-size:12px; width:100px;" valign="top" align="center"><b>MR</b></td>
	   <td style="color:#ffffff; font-family:Times New Roman; font-size:12px; width:100px;" valign="top" align="center"><b>CEA</b></td>
	   <td style="color:#ffffff; font-family:Times New Roman; font-size:12px; width:100px;" valign="top" align="center"><b>Annual Gross</b></td>
	   <td style="color:#ffffff; font-family:Times New Roman; font-size:12px; width:100px;" valign="top" align="center"><b>Employer PF Con.</b></td>
	   <td style="font-family:Times New Roman; color:#FFFFFF; font-size:12px; width:100px;" valign="top" align="center"><b>Bonus</b></td>
	   <td style="color:#ffffff; font-family:Times New Roman; font-size:12px; width:100px;" valign="top" align="center"><b>Gratuity</b></td>
	   <td style="color:#ffffff; font-family:Times New Roman; font-size:12px; width:100px;" valign="top" align="center"><b>Mediclaim Premium</b></td>
	   <td style="color:#ffffff; font-family:Times New Roman; font-size:12px; width:100px;" valign="top" align="center"><b>Annual CTC</b></td>
	   <td style="color:#ffffff; font-family:Times New Roman; font-size:12px; width:100px;" valign="top" align="center"><b>Two Wheeler </b></td>	   
	   <td style="font-family:Times New Roman; color:#FFFFFF; font-size:12px; width:100px;" valign="top" align="center"><b>Four Wheeler </b></td>
	   <td style="color:#ffffff; font-family:Times New Roman; font-size:12px; width:100px;" valign="top" align="center"><b>DA InsideHQ </b></td>
	   <td style="color:#ffffff; font-family:Times New Roman; font-size:12px; width:100px;" valign="top" align="center"><b>DA OutsideHQ</b></td>
	   <td style="color:#ffffff; font-family:Times New Roman; font-size:12px; width:100px;" valign="top" align="center"><b>A Grade</b></td>
	   <td style="color:#ffffff; font-family:Times New Roman; font-size:12px; width:100px;" valign="top" align="center"><b>B Grade</b></td>
	   <td style="font-family:Times New Roman; color:#FFFFFF; font-size:12px; width:100px;" valign="top" align="center"><b>C Grade</b></td>
	   <td style="color:#ffffff; font-family:Times New Roman; font-size:12px; width:100px;" valign="top" align=""><b>Mode of Travel</b></td>
	   <td style="color:#ffffff; font-family:Times New Roman; font-size:12px; width:100px;" valign="top" align=""><b>Travel Class</b></td>
	   <td style="color:#ffffff; font-family:Times New Roman; font-size:12px; width:100px;" valign="top" align="center"><b>Telephone PM </b></td>
	   <td style="color:#ffffff; font-family:Times New Roman; font-size:12px; width:100px;" valign="top" align="center"><b>HandSet Elig</b></td>
	   <td style="color:#ffffff; font-family:Times New Roman; font-size:12px; width:100px;" valign="top" align="center"><b>Mediclaim Insu</b></td>
	   <td style="color:#ffffff; font-family:Times New Roman; font-size:12px; width:100px;" valign="top" align="center"><b>Rating <?php echo $FD; ?></b></td>
	</tr>
<?php if($_REQUEST['value']!=20) {$SqlCtc = mysql_query("SELECT EmpCode,Fname,Sname,Lname,hrm_employee.EmployeeID,DepartmentId,GradeId,DesigId,Gender,DR,Married from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID WHERE hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND hrm_employee_general.DepartmentId=".$_REQUEST['value']." AND hrm_employee_general.DateJoining<='".$YYear."-06-30' order by EmpCode ASC", $con) or die(mysql_error()); } 

elseif($_REQUEST['value']==20) {$SqlCtc = mysql_query("SELECT EmpCode,Fname,Sname,Lname,hrm_employee.EmployeeID,DepartmentId,GradeId,DesigId,Gender,DR,Married from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID WHERE hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND hrm_employee_general.DateJoining<='".$YYear."-06-30' AND hrm_employee.EmployeeID!=223 AND hrm_employee.EmployeeID!=224 order by EmpCode ASC ", $con) or die(mysql_error());} $Sno=1;  while($ResCtc = mysql_fetch_assoc($SqlCtc)) { 

$sql=mysql_query("SELECT EmployeeID from hrm_employee_pms WHERE EmployeeID=".$ResCtc['EmployeeID']." AND AssessmentYear=".$_REQUEST['YI'], $con); 
$row=mysql_num_rows($sql); if($row>0) { 
$sqlC = mysql_query("SELECT hrm_employee_ctc.*,hrm_employee_eligibility.* from hrm_employee_ctc INNER JOIN hrm_employee_eligibility ON hrm_employee_ctc.EmployeeID=hrm_employee_eligibility.EmployeeID WHERE hrm_employee_ctc.EmployeeID=".$ResCtc['EmployeeID']." AND hrm_employee_ctc.CtcYearId=".$_REQUEST['YI']." AND hrm_employee_ctc.CtcCreatedDate>='".date($FD."-10-01")."' AND hrm_employee_ctc.CtcCreatedDate<='".date($FD."-12-31")."' AND hrm_employee_eligibility.EligYearId=".$_REQUEST['YI']." AND hrm_employee_eligibility.EligCreatedDate>='".date($FD."-10-01")."' AND hrm_employee_eligibility.EligCreatedDate<='".date($FD."-12-31")."'", $con); 
$RowC=mysql_num_rows($sqlC); $ResC=mysql_fetch_assoc($sqlC);

$sqlEE=mysql_query("select HR_CurrDesigId, HR_CurrGradeId, HR_Curr_DepartmentId, HR_DepartmentId,HR_DesigId,HR_GradeId from hrm_employee_pms where CompanyId=".$CompanyId." AND EmployeeID=".$ResCtc['EmployeeID']." AND AssessmentYear=".$_REQUEST['YI'], $con); 
$resEE=mysql_fetch_array($sqlEE);
$sqlDesig2=mysql_query("select DesigName from hrm_designation where DesigId=".$resEE['HR_DesigId'], $con); $resDesig2=mysql_fetch_assoc($sqlDesig2);
$sqlG2=mysql_query("select GradeValue from hrm_grade where GradeId=".$resEE['HR_GradeId'], $con); $resG2=mysql_fetch_assoc($sqlG2);
$sqlDe2=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$resEE['HR_DepartmentId'], $con); $resDe2=mysql_fetch_assoc($sqlDe2);
?>  

	   <tr bgcolor="#FFFFFF">
	   <td style="font-family:Times New Roman; font-size:12px; width:30px;" valign="top" align="center"><?php echo $Sno; ?></td>
	   <td style="font-family:Times New Roman; font-size:12px; width:50px;" valign="top" align="center"><?php echo $ResCtc['EmpCode']; ?></td>
	   <td style="font-family:Times New Roman; font-size:12px; width:200px;" valign="top" align=""><?php echo $ResCtc['Fname'].' '.$ResCtc['Sname'].' '.$ResCtc['Lname']; ?></td>
<?php $sqlG=mysql_query("select GradeValue from hrm_grade where GradeId=".$resEE['HR_CurrGradeId'], $con); $resG=mysql_fetch_assoc($sqlG);?>	  
       <td style="font-family:Times New Roman; font-size:12px; width:50px;" valign="top" align="center"><?php echo $resG['GradeValue']; ?></td> 
	   <td style="font-family:Times New Roman; font-size:12px; width:50px; background-color:#79BCFF;" valign="top" align="center">
	   <?php if($resG2['GradeValue']==''){echo $resG['GradeValue'];}else{echo $resG2['GradeValue'];} ?></td>
<?php $sqlDe=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$resEE['HR_Curr_DepartmentId'], $con); $resDe=mysql_fetch_assoc($sqlDe);?>	 	   
	   <td style="font-family:Times New Roman; font-size:12px; width:150px;" valign="top" align=""><?php echo $resDe['DepartmentCode']; ?></td>   
	   <td style="font-family:Times New Roman; font-size:12px; width:150px;background-color:#79BCFF;" valign="top" align="">
	   <?php if($resDe2['DepartmentCode']==''){echo $resDe['DepartmentCode'];}else{echo $resDe2['DepartmentCode'];} ?></td>	   
<?php $sqlD=mysql_query("select DesigName from hrm_designation where DesigId=".$resEE['HR_CurrDesigId'], $con); $resD=mysql_fetch_assoc($sqlD);?>	 
       <td style="font-family:Times New Roman; font-size:12px; width:200px;" valign="top" align=""><?php echo $resD['DesigName']; ?></td>
	   <td style="font-family:Times New Roman; font-size:12px; width:200px;background-color:#79BCFF;" valign="top" align="">
	   <?php if($resDesig2['DesigName']==''){echo $resD['DesigName'];}else{ echo $resDesig2['DesigName']; } ?></td>
<?php $sqlEm=mysql_query("select Appraiser_EmployeeID,Hod_TotalFinalRating from hrm_employee_pms where AssessmentYear=".$_REQUEST['YI']." AND EmployeeID=".$ResCtc['EmployeeID'], $con); $resEm=mysql_fetch_assoc($sqlEm); $sqlEmApp=mysql_query("select Fname,Sname,Lname from hrm_employee where EmployeeID=".$resEm['Appraiser_EmployeeID'], $con); $resEmApp=mysql_fetch_assoc($sqlEmApp);?>	   
	   <td style="font-family:Times New Roman; font-size:12px; width:200px;" valign="top" align=""><?php echo $resEmApp['Fname'].' '.$resEmApp['Sname'].' '.$resEmApp['Lname']; ?></td>
	   <td style="font-family:Times New Roman; font-size:12px; width:100px;" valign="top" align="center"><?php echo $ResC['BAS_Value']; ?></td>
	   <td style="font-family:Times New Roman; font-size:12px; width:100px;" valign="top" align="center"><?php echo $ResC['HRA_Value']; ?></td>
	   <td style="font-family:Times New Roman; font-size:12px; width:100px;" valign="top" align="center"><?php echo $ResC['CONV_Value']; ?></td>
	   <td style="font-family:Times New Roman; font-size:12px; width:100px;" valign="top" align=""><?php echo $ResC['SPECIAL_ALL_Value']; ?></td>
	   <td style="font-family:Times New Roman; font-size:12px; width:100px;" valign="top" align="center"><?php echo $ResC['Tot_GrossMonth']; ?></td>
	   <td style="font-family:Times New Roman; font-size:12px; width:100px;" valign="top" align="center"><?php echo $ResC['GrossSalary_PostAnualComponent_Value']; ?></td>
	   <td style="font-family:Times New Roman; font-size:12px; width:100px;" valign="top" align="center"><?php echo $ResC['PF_Employee_Contri_Value']; ?></td>
	   <td style="font-family:Times New Roman; font-size:12px; width:100px;" valign="top" align="center"><?php echo $ResC['NetMonthSalary_Value']; ?></td>
	   <td style="font-family:Times New Roman; font-size:12px; width:100px;" valign="top" align="center"><?php echo $ResC['LTA_Value']; ?></td>
	   <td style="font-family:Times New Roman; font-size:12px; width:100px;" valign="top" align="center"><?php echo $ResC['MED_REM_Value']; ?></td>
	   <td style="font-family:Times New Roman; font-size:12px; width:100px;" valign="top" align="center"><?php echo $ResC['CHILD_EDU_ALL_Value']; ?></td>
	   <td style="font-family:Times New Roman; font-size:12px; width:100px;" valign="top" align="center"><?php echo $ResC['Tot_Gross_Annual']; ?></td>
	   <td style="font-family:Times New Roman; font-size:12px; width:100px;" valign="top" align="center"><?php echo $ResC['PF_Employer_Contri_Annul']; ?></td>
	   <td style="font-family:Times New Roman; font-size:12px; width:100px;" valign="top" align="center"><?php echo $ResC['BONUS_Value']; ?></td>
	   <td style="font-family:Times New Roman; font-size:12px; width:100px;" valign="top" align="center"><?php echo $ResC['GRATUITY_Value']; ?></td>
	   <td style="font-family:Times New Roman; font-size:12px; width:100px;" valign="top" align="center"><?php echo $ResC['Mediclaim_Policy']; ?></td>
	   <td style="font-family:Times New Roman; font-size:12px; width:100px;" valign="top" align="center"><?php echo $ResC['Tot_CTC']; ?></td>
	   <td style="font-family:Times New Roman; font-size:12px; width:100px;" valign="top" align="center"><?php if($ResC['Travel_TwoWeeKM']>0){echo $ResC['Travel_TwoWeeKM']; } else {echo 'NA';}?></td>	   
	   <td style="font-family:Times New Roman; font-size:12px; width:100px;" valign="top" align="center"><?php if($ResC['Travel_FourWeeKM']>0){ echo $ResC['Travel_FourWeeKM']; } else {echo 'NA';}?></td>
	   <td style="font-family:Times New Roman; font-size:12px; width:100px;" valign="top" align="center"><?php if($ResC['DA_Outside_HqSal']>0){echo $ResC['DA_Outside_HqSal']; }else {echo 'NA';} ?></td>
	   <td style="font-family:Times New Roman; font-size:12px; width:100px;" valign="top" align="center"><?php if($ResC['DA_Outside_Hq']>0){echo $ResC['DA_Outside_Hq'];} else {echo 'NA';} ?></td>
	   <td style="font-family:Times New Roman; font-size:12px; width:100px;" valign="top" align="center"><?php echo $ResC['Lodging_CategoryA']; ?></td>
	   <td style="font-family:Times New Roman; font-size:12px; width:100px;" valign="top" align="center"><?php echo $ResC['Lodging_CategoryB']; ?></td>
	   <td style="font-family:Times New Roman; font-size:12px; width:100px;" valign="top" align="center"><?php echo $ResC['Lodging_CategoryC']; ?></td>
	   <td style="font-family:Times New Roman; font-size:12px; width:100px;" valign="top" align=""><?php if($ResC['Mode_Travel_Outside_Hq']!=''){echo $ResC['Mode_Travel_Outside_Hq'];} else {echo 'NA';} ?></td>
	   <td style="font-family:Times New Roman; font-size:12px; width:100px;" valign="top" align=""><?php if($ResC['TravelClass_Outside_Hq']!=''){echo $ResC['TravelClass_Outside_Hq'];} else {echo 'NA';} ?></td>
	   <td style="font-family:Times New Roman; font-size:12px; width:100px;" valign="top" align="center"><?php if($ResC['Mobile_Exp_Rem_Rs']>0){echo $ResC['Mobile_Exp_Rem_Rs'];} else {echo 'NA';} ?></td>
	   <td style="font-family:Times New Roman; font-size:12px; width:100px;" valign="top" align="center"><?php if($ResC['Mobile_Hand_Elig_Rs']>0){echo $ResC['Mobile_Hand_Elig_Rs'];} else {echo 'NA';} ?></td>
	   <td style="font-family:Times New Roman; font-size:12px; width:100px;" valign="top" align="center"><?php echo $ResC['Health_Insurance']; ?></td>
	   <td style="font-family:Times New Roman; font-size:12px; width:100px;" valign="top" align="center"><?php echo $resEm['Hod_TotalFinalRating']; ?></td>
	</tr>
<?php   } $Sno++; } ?>
   </table>
 </td>
</tr> 
<?php } if($_REQUEST['action']=='RatngGraph' AND $_REQUEST['value']=='AllGraph') {  ?>
<tr>
<td>
<table>
<tr>
 <td>
   <table border="0" width="<?php if($_REQUEST['YI']>=2){echo '900';}else{echo '400';} ?>">
     <tr>
	  <td colspan="8" valign="top" style=" background-color:#0069D2; font-size:14px; color:#FFFFFF; font-family:Times New Roman; font-weight:bold;">&nbsp;
	   &nbsp;&nbsp;&nbsp;Actual Rating & Rating Graph &nbsp;(ALL EMP)&nbsp;&nbsp;&nbsp;
	   <a href="AllEmpHRLinRatingGraph.php?action=LinGraph&YI=<?php echo $_REQUEST['YI']; ?>" target="Giframe"><font color="#FFFFFF">Linear graph</font></a>&nbsp;&nbsp;&nbsp;
	  </td>
	 </tr>
	<tr style="height:20px;" valign="middle">
	 <td>
   <table border="1">
	<tr>
	 <td bgcolor="#7a6189" align="Right" style="font-family:Times New Roman;color:#FFFFFF; font-size:13px; width:80px;"><b>Rating</b>&nbsp;</td>
<?php $sqlR=mysql_query("select * from hrm_pms_rating where YearId=".$_REQUEST['YI']." AND CompanyId=".$CompanyId." AND RatingStatus='A' order by Rating ASC", $con); 
      $sn=1; while($resR=mysql_fetch_array($sqlR)){ ?>			 
	  <td bgcolor="#7a6189" align="Center" style="font-family:Times New Roman;color:#FFFFFF; font-size:13px; width:80px;"><b><?php echo $resR['Rating']; ?></b></td>
<?php } ?>	 
	</tr>
	<tr>
	 <td bgcolor="#7a6189" align="Right" style="font-family:Times New Roman;color:#FFFFFF; font-size:13px; width:80px;"><b>Expected</b>&nbsp;</td>
<?php $sqlR=mysql_query("select * from hrm_pms_rating where YearId=".$_REQUEST['YI']." AND CompanyId=".$CompanyId." AND RatingStatus='A' order by Rating ASC", $con); 
      $sn=1; while($resR=mysql_fetch_array($sqlR)){ 
	  
$sqlRat=mysql_query("select NormalDistri from hrm_pms_normalrating_dis where NormalDisStatus='A' AND YearId=".$_REQUEST['YI']." AND CompanyId=".$CompanyId." AND Rating=".$resR['Rating'], $con); $resRat=mysql_fetch_array($sqlRat); 
$SqlA=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI'], $con); $RowA=mysql_num_rows($SqlA); 
$Rat=($RowA*$resRat['NormalDistri'])/100; ?>	 
	 <td bgcolor="#000000" align="Center" style="font-family:Times New Roman;color:#FFFFFF; font-size:13px; width:80px;"><?php echo $Rat; ?></td>
<?php } ?>	 	 
	</tr>
	<tr>
	 <td bgcolor="#7a6189" align="Right" style="font-family:Times New Roman;color:#FFFFFF; font-size:13px; width:80px;"><b>Employee</b>&nbsp;</td>
<?php $sqlR=mysql_query("select * from hrm_pms_rating where YearId=".$_REQUEST['YI']." AND CompanyId=".$CompanyId." AND RatingStatus='A' order by Rating ASC", $con); 
      $sn=1; while($resR=mysql_fetch_array($sqlR)){ 
$SqlE=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Emp_TotalFinalRating=".$resR['Rating'], $con); 
$RowE=mysql_num_rows($SqlE); $vE=number_format($RowE, 2, '.', '');	?>	 
	 <td bgcolor="#FFCAFF" align="Center" style="font-family:Times New Roman;color:#OOOOOO; font-size:13px; width:80px;"><?php echo $vE; ?></td>
<?php } ?>	
	</tr>
	<tr>
	 <td bgcolor="#7a6189" align="Right" style="font-family:Times New Roman;color:#FFFFFF; font-size:13px; width:80px;"><b>Appraiser</b>&nbsp;</td>
<?php $sqlR=mysql_query("select * from hrm_pms_rating where YearId=".$_REQUEST['YI']." AND CompanyId=".$CompanyId." AND RatingStatus='A' order by Rating ASC", $con); 
      $sn=1; while($resR=mysql_fetch_array($sqlR)){ 
$SqlA=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Appraiser_TotalFinalRating=".$resR['Rating'], $con); $RowA=mysql_num_rows($SqlA); $vA=number_format($RowA, 2, '.', '');	?>	 
	 <td bgcolor="#379BFF" align="Center" style="font-family:Times New Roman;color:#OOOOOO; font-size:13px; width:80px;"><?php echo $vA; ?></td>
<?php } ?>		 
	</tr>
	<tr>
	 <td bgcolor="#7a6189" align="Right" style="font-family:Times New Roman;color:#FFFFFF; font-size:13px; width:80px;"><b>Reviewer</b>&nbsp;</td>
<?php $sqlR=mysql_query("select * from hrm_pms_rating where YearId=".$_REQUEST['YI']." AND CompanyId=".$CompanyId." AND RatingStatus='A' order by Rating ASC", $con); 
      $sn=1; while($resR=mysql_fetch_array($sqlR)){ 
$SqlR=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Reviewer_TotalFinalRating=".$resR['Rating'], $con);
 $RowR=mysql_num_rows($SqlR); $vR=number_format($RowR, 2, '.', '');	?>		 
	 <td bgcolor="#BFFFBF" align="Center" style="font-family:Times New Roman;color:#OOOOOO; font-size:13px; width:80px;"><?php echo $vR; ?></td>
<?php } ?>		 
	</tr>
	<tr>
	 <td bgcolor="#7a6189" align="Right" style="font-family:Times New Roman;color:#FFFFFF; font-size:13px; width:80px;"><b>HOD</b>&nbsp;</td>
<?php $sqlR=mysql_query("select * from hrm_pms_rating where YearId=".$_REQUEST['YI']." AND CompanyId=".$CompanyId." AND RatingStatus='A' order by Rating ASC", $con); 
      $sn=1; while($resR=mysql_fetch_array($sqlR)){ 
$SqlH=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Hod_TotalFinalRating=".$resR['Rating'], $con);
 $RowH=mysql_num_rows($SqlH); $vH=number_format($RowH, 2, '.', '');	?> 
	 <td bgcolor="#FFA579" align="Center" style="font-family:Times New Roman;color:#OOOOOO; font-size:13px; width:80px;"><?php echo $vH; ?></td>
<?php } ?>		 
	</tr>
   </table>
  </td>
 </tr>
 <tr>
     <td colspan="20" style="width:800px; height:300px; border:0; border-style:hidden;" valign="top" align="center">
	  <iframe name="Giframe" src="AllEmpHRLinRatingGraph.php?action=LinGraph&YI=<?php echo $_REQUEST['YI']; ?>" style="width:750px; height:300px; border:0; border-style:hidden;"></iframe></td>
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
<?php }  if($_REQUEST['action']=='RatngGraph' AND $_REQUEST['value']=='HODGraph') { ?>
<tr>
<td>
<table>
<?php $sqlEmpHOD=mysql_query("select hrm_employee.*,HOD_EmployeeID from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.HOD_EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." group by HOD_EmployeeID order by EmpCode ASC", $con);      
$sno=1; while($ResEmpHOD=mysql_fetch_array($sqlEmpHOD)) { ?>
<tr>
 <td valign="top">
   <table border="0" width="<?php if($_REQUEST['YI']>=2){echo '900';}else{echo '400';} ?>" >
     <tr>
	  <td colspan="8" valign="top" style=" background-color:#0069D2; font-size:14px; color:#FFFFFF; font-family:Times New Roman; font-weight:bold;">&nbsp;
	   &nbsp;&nbsp;&nbsp;Rating Graph &nbsp;:&nbsp;<?php echo '('.$sno.') &nbsp;'.$ResEmpHOD['Fname'].' '.$ResEmpHOD['Sname'].' '.$ResEmpHOD['Lname'];?>&nbsp;&nbsp;&nbsp;&nbsp;
	   <a href="HODWiseRatingGraph<?php echo $sno; ?>.php?action=LinGraph&EmpId=<?php echo $ResEmpHOD['HOD_EmployeeID']; ?>&YI=<?php echo $_REQUEST['YI']; ?>" target="Giframe<?php echo $sno; ?>"><font color="#FFFFFF">Linear graph</font></a>
	  </td>
	 </tr>
 <tr style="height:20px;" valign="middle">
  <td>
   <table border="1">
	<tr>
	 <td bgcolor="#7a6189" align="Right" style="font-family:Times New Roman;color:#FFFFFF; font-size:13px; width:80px;"><b>Rating</b>&nbsp;</td>
<?php $sqlR=mysql_query("select * from hrm_pms_rating where YearId=".$_REQUEST['YI']." AND CompanyId=".$CompanyId." AND RatingStatus='A' order by Rating ASC", $con); 
      $sn=1; while($resR=mysql_fetch_array($sqlR)){ ?>			 
	  <td bgcolor="#7a6189" align="Center" style="font-family:Times New Roman;color:#FFFFFF; font-size:13px; width:80px;"><b><?php echo $resR['Rating']; ?></b></td>
<?php } ?>	 
	</tr>
	<tr>
	 <td bgcolor="#7a6189" align="Right" style="font-family:Times New Roman;color:#FFFFFF; font-size:13px; width:80px;"><b>Expected</b>&nbsp;</td>
<?php $sqlR=mysql_query("select * from hrm_pms_rating where YearId=".$_REQUEST['YI']." AND CompanyId=".$CompanyId." AND RatingStatus='A' order by Rating ASC", $con); 
      $sn=1; while($resR=mysql_fetch_array($sqlR)){ 
	  
$sqlRat=mysql_query("select NormalDistri from hrm_pms_normalrating_dis where NormalDisStatus='A' AND YearId=".$_REQUEST['YI']." AND CompanyId=".$CompanyId." AND Rating=".$resR['Rating'], $con); $resRat=mysql_fetch_array($sqlRat); 
$SqlA=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND HOD_EmployeeID=".$ResEmpHOD['HOD_EmployeeID'], $con); $RowA=mysql_num_rows($SqlA); 
$Rat=($RowA*$resRat['NormalDistri'])/100; ?>	 
	<td bgcolor="#000000" align="Center" style="font-family:Times New Roman;color:#FFFFFF; font-size:13px; width:80px;"><?php echo $Rat; ?></td>
<?php } ?>	 	 
	</tr>
	<tr>
	 <td bgcolor="#7a6189" align="Right" style="font-family:Times New Roman;color:#FFFFFF; font-size:13px; width:80px;"><b>Employee</b>&nbsp;</td>
<?php $sqlR=mysql_query("select * from hrm_pms_rating where YearId=".$_REQUEST['YI']." AND CompanyId=".$CompanyId." AND RatingStatus='A' order by Rating ASC", $con); 
      $sn=1; while($resR=mysql_fetch_array($sqlR)){ 
$SqlE=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Emp_TotalFinalRating=".$resR['Rating']." AND HOD_EmployeeID=".$ResEmpHOD['HOD_EmployeeID'], $con); 
$RowE=mysql_num_rows($SqlE); $vE=number_format($RowE, 2, '.', '');	?>	 
	 <td bgcolor="#FFCAFF" align="Center" style="font-family:Times New Roman;color:#OOOOOO; font-size:13px; width:80px;"><?php echo $vE; ?></td>
<?php } ?>	
	</tr>
	<tr>
	 <td bgcolor="#7a6189" align="Right" style="font-family:Times New Roman;color:#FFFFFF; font-size:13px; width:80px;"><b>Appraiser</b>&nbsp;</td>
<?php $sqlR=mysql_query("select * from hrm_pms_rating where YearId=".$_REQUEST['YI']." AND CompanyId=".$CompanyId." AND RatingStatus='A' order by Rating ASC", $con); 
      $sn=1; while($resR=mysql_fetch_array($sqlR)){ 
$SqlA=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Appraiser_TotalFinalRating=".$resR['Rating']." AND HOD_EmployeeID=".$ResEmpHOD['HOD_EmployeeID'], $con); $RowA=mysql_num_rows($SqlA); $vA=number_format($RowA, 2, '.', '');	?>	 
	 <td bgcolor="#379BFF" align="Center" style="font-family:Times New Roman;color:#OOOOOO; font-size:13px; width:80px;"><?php echo $vA; ?></td>
<?php } ?>		 
	</tr>
	<tr>
	 <td bgcolor="#7a6189" align="Right" style="font-family:Times New Roman;color:#FFFFFF; font-size:13px; width:80px;"><b>Reviewer</b>&nbsp;</td>
<?php $sqlR=mysql_query("select * from hrm_pms_rating where YearId=".$_REQUEST['YI']." AND CompanyId=".$CompanyId." AND RatingStatus='A' order by Rating ASC", $con); 
      $sn=1; while($resR=mysql_fetch_array($sqlR)){ 
$SqlR=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Reviewer_TotalFinalRating=".$resR['Rating']." AND HOD_EmployeeID=".$ResEmpHOD['HOD_EmployeeID'], $con);
 $RowR=mysql_num_rows($SqlR); $vR=number_format($RowR, 2, '.', '');	?>		 
	 <td bgcolor="#BFFFBF" align="Center" style="font-family:Times New Roman;color:#OOOOOO; font-size:13px; width:80px;"><?php echo $vR; ?></td>
<?php } ?>		 
	</tr>
	<tr>
	 <td bgcolor="#7a6189" align="Right" style="font-family:Times New Roman;color:#FFFFFF; font-size:13px; width:80px;"><b>HOD</b>&nbsp;</td>
<?php $sqlR=mysql_query("select * from hrm_pms_rating where YearId=".$_REQUEST['YI']." AND CompanyId=".$CompanyId." AND RatingStatus='A' order by Rating ASC", $con); 
      $sn=1; while($resR=mysql_fetch_array($sqlR)){ 
$SqlH=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Hod_TotalFinalRating=".$resR['Rating']." AND HOD_EmployeeID=".$ResEmpHOD['HOD_EmployeeID'], $con);
 $RowH=mysql_num_rows($SqlH); $vH=number_format($RowH, 2, '.', '');	?> 
	 <td bgcolor="#FFA579" align="Center" style="font-family:Times New Roman;color:#OOOOOO; font-size:13px; width:80px;"><?php echo $vH; ?></td>
<?php } ?>		 
	</tr>
   </table>
  </td>
 </tr>
 <tr>
    <td colspan="20" style="width:1000px; height:260px; border:0; border-style:hidden;" valign="top" align="center">
	    <iframe name="Giframe<?php echo $sno; ?>" src="HODWiseRatingGraph<?php echo $sno; ?>.php?action=LinGraph&YI=<?php echo $_REQUEST['YI']; ?>&EmpId=<?php echo $ResEmpHOD['HOD_EmployeeID']; ?>" style="width:800px; height:270px; border:0; border-style:hidden;"></iframe>	  
	  </td>
	 </tr>
</table>
 </td>

</tr> 
<?php $sno++;} ?> 
<?php } if($_REQUEST['action']=='IncPercent') { ?>
<tr>
 <td>
   <table border="1"  style="width:<?php if($_REQUEST['value']=='DeptWise'){echo '950px';} elseif($_REQUEST['value']=='HODWise'){echo '1050'; }?>;">
     <tr>
<?php if($_REQUEST['value']=='DeptWise'){$Wise='Department Wise';} elseif($_REQUEST['value']=='HODWise'){ $Wise='HOD Wise'; }?>	
	  <td colspan="10" valign="top" style=" background-color:#0069D2; font-size:14px; color:#FFFFFF; font-family:Times New Roman; font-weight:bold;">&nbsp;Employee PMS (%)Increment : Year <?php echo $PRD; ?>&nbsp;&nbsp;&nbsp;<?php echo $Wise; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
	  <?php if($_REQUEST['value']=='DeptWise'){ ?><a href="#" onClick="ParcentDept()" style="color:#F9F900; font-size:12px;">Export Excel</a>
	  <?php } elseif($_REQUEST['value']=='HODWise'){ ?><a href="#" onClick="ParcentHOD()" style="color:#F9F900; font-size:12px;">Export Excel</a><?php } ?>
	  </td>
	 </tr>
	 <tr bgcolor="#7a6189">
	   <td align="center" style="font:Georgia; color:#FFFFFF; font-size:13px; width:50px;"><b>SNo</b></td>
	   <td style="color:#ffffff; font-family:Times New Roman; font-size:13px; width:<?php if($_REQUEST['value']=='DeptWise'){echo '200px';} elseif($_REQUEST['value']=='HODWise'){echo '300'; }?>;" valign="top" align="center"><b><?php if($_REQUEST['value']=='DeptWise'){echo 'Department';} elseif($_REQUEST['value']=='HODWise'){echo 'HOD'; }?></b></td>
	   <td style="color:#ffffff; font-family:Times New Roman; font-size:13px; width:60px;" valign="top" align="center"><b>No Of Emp</b></td>
	   <td style="color:#ffffff; font-family:Times New Roman; font-size:13px; width:120px;" valign="top" align="center"><b>Previous Gross PM</b></td>
	   <td style="color:#ffffff; font-family:Times New Roman; font-size:13px; width:120px;" valign="top" align="center"><b>Proposed Gross PM</b></td>
	   <td style="color:#ffffff; font-family:Times New Roman; font-size:13px; width:100px;" valign="top" align="center"><b>(%)Proposed Gross</b></td>
	   <td style="color:#ffffff; font-family:Times New Roman; font-size:13px; width:120px;" valign="top" align="center"><b>Proposed Salary Correnction</b></td>
	   <td style="color:#ffffff; font-family:Times New Roman; font-size:13px; width:100px;" valign="top" align="center"><b>(%)Proposed Salary Correction</b></td>
	   <td style="color:#ffffff; font-family:Times New Roman; font-size:13px; width:120px;" valign="top" align="center"><b>Total Proposed Gross Salary </b></td>
	   <td style="color:#ffffff; font-family:Times New Roman; font-size:13px; width:100px;" valign="top" align="center"><b>(%)Total Increment</b></td>
	</tr>
<?php 
if($_REQUEST['value']=='HODWise')
{ $sqlEmpHOD=mysql_query("select HOD_EmployeeID from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.HOD_EmployeeID=hrm_employee.EmployeeID where hrm_employee.CompanyId=".$CompanyId." AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee.EmpStatus='A' group by HOD_EmployeeID order by EmpCode ASC", $con);      
$Sno=1; while($ResEmpHOD=mysql_fetch_array($sqlEmpHOD)) { 
$sql=mysql_query("select Fname,Sname,Lname,Gender,DR,Married from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee_general.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee_general.EmployeeID=".$ResEmpHOD['HOD_EmployeeID'], $con); 
$res=mysql_fetch_assoc($sql); if($res['DR']=='Y'){$MHH='Dr.';} elseif($res['Gender']=='M'){$MHH='Mr.';} elseif($res['Gender']=='F' AND $res['Married']=='Y'){$MHH='Mrs.';} elseif($res['Gender']=='F' AND $res['Married']=='N'){$MHH='Miss.';}  $HODName=$MHH.' '.$res['Fname'].' '.$res['Sname'].' '.$res['Lname'];  

$Incentive=mysql_query("select SUM(Incentive) as TEAMINC from hrm_pms_appraisal_history where CompanyId=".$CompanyId." AND HOD_EmployeeID=".$ResEmpHOD['HOD_EmployeeID']." AND SalaryChange_Date!='".date($FD."-10-01")."'", $con); $resINCTV=mysql_fetch_array($Incentive);{ $INCTV=$resINCTV['TEAMINC']; } 


$sqlEmp=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.HOD_EmployeeID=".$ResEmpHOD['HOD_EmployeeID']." AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee.EmpStatus='A'", $con); $NoOfEmp=mysql_num_rows($sqlEmp);

$SqlCount=mysql_query("select SUM(EmpCurrGrossPM) as CGS, SUM(EmpCurrIncentivePM) as TEAMINC, SUM(HR_ProCorrSalary) as PSC, SUM(HR_IncNetMonthalySalary) as NetIncSal, SUM(HR_GrossMonthlySalary) as TPGS, SUM(Hod_Incentive) as HINCentv from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.HOD_EmployeeID=".$ResEmpHOD['HOD_EmployeeID'], $con);

//$SqlCount=mysql_query("select SUM(EmpCurrGrossPM) as TEGSPM, SUM(EmpCurrIncentivePM) as TEAMINC, SUM(Hod_IncNetMonthalySalary) as TINMS, SUM(Hod_GrossMonthlySalary) as TEPGS, SUM(Hod_Incentive) as HINCentv from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.HOD_EmployeeID=".$ResEmpHOD['HOD_EmployeeID'], $con);  	

while($ResCount=mysql_fetch_array($SqlCount))
{ $CGS=$ResCount['CGS']; $INCTV=$ResCount['TEAMINC']; $TotPre_GrossSalary=$CGS+$INCTV; 
  $Salary_Correction=$ResCount['PSC']; //echo 'SC='.$Salary_Correction.'<br>';
  $Net_IncSal=$ResCount['NetIncSal']; //echo 'Net='.$Net_IncSal.'<br>';
  $Salary_Proposed=$Net_IncSal-$Salary_Correction; //echo 'ProS='.$Salary_Proposed.'<br>';
  $Total_PGS=$ResCount['TPGS'];
  $HINCentv=number_format($ResCount['HINCentv'], 2, '.', '');} $Tot_TPGS=$Total_PGS+$HINCentv;
  
   $Previous_GSPM=number_format($TotPre_GrossSalary, 2, '.', '');
   $Proposed_Salary=number_format($Salary_Proposed, 2, '.', '');
   $Proposed_Correction=number_format($Salary_Correction, 2, '.', '');
   $Proposed_Increment=number_format($Net_IncSal, 2, '.', '');
   $Total_Proposed=number_format($Tot_TPGS, 2, '.', '');
  
  
  $OnePer=($Previous_GSPM*1)/100; //$OnePerPre=number_format($One, 2, '.', '');
  if($OnePer>0)
  { $PGS_Per=$Proposed_Salary/$OnePer; $Proposed_PerSal=round($PGS_Per,2);
    $SC_Per=$Proposed_Correction/$OnePer;  $Correction_PerSal=round($SC_Per,2);
	$TotIncPer=$Proposed_Increment/$OnePer; $TotalInc_PerSal=round($TotIncPer,2);
  }
  else { $Proposed_SalaryPer=0; $Correction_SalaryPer=0; $TotalInc_SalaryPer=0;  }

?>  
	    <tr bgcolor="#FFFFFF">
		   <td align="center" style="font:Georgia; font-size:13px; width:50px;" valign="top"><?php echo $Sno; ?></td>
		   <td style="font-family:Times New Roman;font-size:13px; width:300px;" valign="top">&nbsp;<?php echo $HODName; ?></td>
		   <td align="center" style="font-family:Times New Roman;font-size:13px; width:60px;" valign="top">&nbsp;<?php echo $NoOfEmp; ?></td>
		   <td align="right" style="font-family:Times New Roman; font-size:13px; width:120px;background-color:#D2FFA6;" valign="top"><?php echo $Previous_GSPM; ?>&nbsp;</td>
		   <td align="right" style="font-family:Times New Roman; font-size:13px; width:120px;" valign="top"><?php echo $Proposed_Salary; ?>&nbsp;</td>
		   <td align="center" style="font-family:Times New Roman; font-size:13px; width:100px;" valign="top"><?php echo $Proposed_PerSal; ?></td>
		   <td align="right" style="font-family:Times New Roman; font-size:13px; width:120px;" valign="top"><?php echo $Proposed_Correction; ?>&nbsp;</td>
		   <td align="center" style="font-family:Times New Roman; font-size:13px; width:100px;" valign="top"><?php echo $Correction_PerSal; ?></td>
		   <td align="right" style="font-family:Times New Roman; font-size:13px; width:120px;background-color:#D2FFA6;" valign="top"><?php echo $Total_Proposed; ?>&nbsp;</td>
		   <td align="center" style="font-family:Times New Roman;font-size:13px; width:100px;" valign="top"><?php echo $TotalInc_PerSal; ?></td>
		</tr>
<?php $Sno++; } } ?>
<?php 
if($_REQUEST['value']=='DeptWise')
{ $sqlDept=mysql_query("select DepartmentId,DepartmentName from hrm_department where CompanyId=".$CompanyId." AND DeptStatus='A' AND DepartmentCode!='MANAGEMENT' order by DepartmentName ASC", $con); 
  $Sno=1; while($resDept=mysql_fetch_assoc($sqlDept))
  {

   $Incentive=mysql_query("select SUM(Incentive) as TEAMINC from hrm_pms_appraisal_history INNER JOIN hrm_employee_general ON hrm_pms_appraisal_history.EmpCode=hrm_employee_general.EC where hrm_employee_general.DepartmentId=".$resDept['DepartmentId']." AND SalaryChange_Date!='".date($FD."-10-01")."'", $con); 
   $resINCTV=mysql_fetch_array($Incentive);{ $INCTV=$resINCTV['TEAMINC']; } 

$sqlEmp=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.HR_Curr_DepartmentId=".$resDept['DepartmentId']." AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee.EmpStatus='A'", $con); $NoOfEmp=mysql_num_rows($sqlEmp);
   

$SqlCount=mysql_query("select SUM(EmpCurrGrossPM) as CGS, SUM(EmpCurrIncentivePM) as TEAMINC, SUM(HR_ProCorrSalary) as PSC, SUM(HR_IncNetMonthalySalary) as NetIncSal, SUM(HR_GrossMonthlySalary) as TPGS, SUM(Hod_Incentive) as HINCentv from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_general ON hrm_employee_pms.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee_pms.HR_Curr_DepartmentId=".$resDept['DepartmentId']." AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI'], $con); 

while($ResCount=mysql_fetch_array($SqlCount))
{ $CGS=$ResCount['CGS']; $INCTV=$ResCount['TEAMINC']; $TotPre_GrossSalary=$CGS+$INCTV; 
  $Salary_Correction=$ResCount['PSC']; //echo 'SC='.$Salary_Correction.'<br>';
  $Net_IncSal=$ResCount['NetIncSal']; //echo 'Net='.$Net_IncSal.'<br>';
  $Salary_Proposed=$Net_IncSal-$Salary_Correction; //echo 'ProS='.$Salary_Proposed.'<br>';
  $Total_PGS=$ResCount['TPGS'];
  $HINCentv=number_format($ResCount['HINCentv'], 2, '.', '');} $Tot_TPGS=$Total_PGS+$HINCentv;
  
   $Previous_GSPM=number_format($TotPre_GrossSalary, 2, '.', '');
   $Proposed_Salary=number_format($Salary_Proposed, 2, '.', '');
   $Proposed_Correction=number_format($Salary_Correction, 2, '.', '');
   $Proposed_Increment=number_format($Net_IncSal, 2, '.', '');
   $Total_Proposed=number_format($Tot_TPGS, 2, '.', '');
  
  
  $OnePer=($Previous_GSPM*1)/100; //$OnePerPre=number_format($One, 2, '.', '');
  if($OnePer>0)
  { $PGS_Per=$Proposed_Salary/$OnePer; $Proposed_PerSal=round($PGS_Per,2);
    $SC_Per=$Proposed_Correction/$OnePer;  $Correction_PerSal=round($SC_Per,2);
	$TotIncPer=$Proposed_Increment/$OnePer; $TotalInc_PerSal=round($TotIncPer,2);
  }
  else { $Proposed_SalaryPer=0; $Correction_SalaryPer=0; $TotalInc_SalaryPer=0;  }
?>
	    <tr bgcolor="#FFFFFF">
		   <td align="center" style="font:Georgia; font-size:13px; width:50px;" valign="top"><?php echo $Sno; ?></td>
		   <td style="font-family:Times New Roman;font-size:13px; width:200px;" valign="top">&nbsp;<?php echo $resDept['DepartmentName']; ?></td>
		   <td align="center" style="font-family:Times New Roman;font-size:13px; width:60px;" valign="top">&nbsp;<?php echo $NoOfEmp; ?></td>
		   <td align="right" style="font-family:Times New Roman; font-size:13px; width:120px;background-color:#D2FFA6;" valign="top"><?php echo $Previous_GSPM; ?>&nbsp;</td>
		   <td align="right" style="font-family:Times New Roman; font-size:13px; width:120px;" valign="top"><?php echo $Proposed_Salary; ?>&nbsp;</td>
		   <td align="center" style="font-family:Times New Roman; font-size:13px; width:100px;" valign="top"><?php echo $Proposed_PerSal; ?></td>
		   <td align="right" style="font-family:Times New Roman; font-size:13px; width:120px;" valign="top"><?php echo $Proposed_Correction; ?>&nbsp;</td>
		   <td align="center" style="font-family:Times New Roman; font-size:13px; width:100px;" valign="top"><?php echo $Correction_PerSal; ?></td>
		   <td align="right" style="font-family:Times New Roman; font-size:13px; width:120px;background-color:#D2FFA6;" valign="top"><?php echo $Total_Proposed; ?>&nbsp;</td>
		   <td align="center" style="font-family:Times New Roman;font-size:13px; width:100px;" valign="top"><?php echo $TotalInc_PerSal; ?></td>
		</tr>
<?php $Sno++; } } ?>
   </table>
 </td>
</tr> 
<?php } if($_REQUEST['action']=='OverRatngGraph' AND $_REQUEST['value']=='OverAllGraph') {  ?>
<tr>
<td>
<table>
<tr>
<?php /* Table */ ?>
 <td style="width:800px;" valign="top">
   <table>
      <tr>
	  <td colspan="8" valign="top" style=" background-color:#0069D2; font-size:14px; color:#FFFFFF; font-family:Times New Roman; font-weight:bold;">&nbsp;
	   &nbsp;&nbsp;&nbsp;Overall Rating Graph All Employee <?php echo $PRD; ?>
	  </td>
	 </tr>
<?php
//Employee 
$SqlE1=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Emp_TotalFinalRating=1", $con); $RowE1=mysql_num_rows($SqlE1); 
$SqlE2=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Emp_TotalFinalRating=2", $con); $RowE2=mysql_num_rows($SqlE2); 
$SqlE25=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Emp_TotalFinalRating=2.5", $con); $RowE25=mysql_num_rows($SqlE25); 
$SqlE27=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Emp_TotalFinalRating=2.7", $con); $RowE27=mysql_num_rows($SqlE27); 
$SqlE29=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Emp_TotalFinalRating=2.9", $con); $RowE29=mysql_num_rows($SqlE29); 
$SqlE3=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Emp_TotalFinalRating=3", $con); $RowE3=mysql_num_rows($SqlE3); 
$SqlE32=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Emp_TotalFinalRating=3.2", $con); $RowE32=mysql_num_rows($SqlE32); 
$SqlE34=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Emp_TotalFinalRating=3.4", $con); $RowE34=mysql_num_rows($SqlE34); 
$SqlE35=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Emp_TotalFinalRating=3.5", $con); $RowE35=mysql_num_rows($SqlE35); 
$SqlE37=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Emp_TotalFinalRating=3.7", $con); $RowE37=mysql_num_rows($SqlE37); 
$SqlE39=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Emp_TotalFinalRating=3.9", $con); $RowE39=mysql_num_rows($SqlE39); 
$SqlE4=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Emp_TotalFinalRating=4", $con); $RowE4=mysql_num_rows($SqlE4); 
$SqlE42=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Emp_TotalFinalRating=4.2", $con); $RowE42=mysql_num_rows($SqlE42); 
$SqlE44=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Emp_TotalFinalRating=4.4", $con); $RowE44=mysql_num_rows($SqlE44); 
$SqlE45=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Emp_TotalFinalRating=4.5", $con); $RowE45=mysql_num_rows($SqlE45); 
$SqlE47=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Emp_TotalFinalRating=4.7", $con); $RowE47=mysql_num_rows($SqlE47); 
$SqlE49=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Emp_TotalFinalRating=4.9", $con); $RowE49=mysql_num_rows($SqlE49); 
$SqlE5=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Emp_TotalFinalRating=5", $con); $RowE5=mysql_num_rows($SqlE5); 


//Appraiser
$SqlA1=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Appraiser_TotalFinalRating=1", $con); $RowA1=mysql_num_rows($SqlA1); 
$SqlA2=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Appraiser_TotalFinalRating=2", $con); $RowA2=mysql_num_rows($SqlA2); 
$SqlA25=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Appraiser_TotalFinalRating=2.5", $con); $RowA25=mysql_num_rows($SqlA25); 
$SqlA27=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Appraiser_TotalFinalRating=2.7", $con); $RowA27=mysql_num_rows($SqlA27); 
$SqlA29=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Appraiser_TotalFinalRating=2.9", $con); $RowA29=mysql_num_rows($SqlA29); 
$SqlA3=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Appraiser_TotalFinalRating=3", $con); $RowA3=mysql_num_rows($SqlA3); 
$SqlA32=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Appraiser_TotalFinalRating=3.2", $con); $RowA32=mysql_num_rows($SqlA32); 
$SqlA34=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Appraiser_TotalFinalRating=3.4", $con); $RowA34=mysql_num_rows($SqlA34); 
$SqlA35=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Appraiser_TotalFinalRating=3.5", $con); $RowA35=mysql_num_rows($SqlA35); 
$SqlA37=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Appraiser_TotalFinalRating=3.7", $con); $RowA37=mysql_num_rows($SqlA37); 
$SqlA39=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Appraiser_TotalFinalRating=3.9", $con); $RowA39=mysql_num_rows($SqlA39); 
$SqlA4=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Appraiser_TotalFinalRating=4", $con); $RowA4=mysql_num_rows($SqlA4); 
$SqlA42=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Appraiser_TotalFinalRating=4.2", $con); $RowA42=mysql_num_rows($SqlA42); 
$SqlA44=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Appraiser_TotalFinalRating=4.4", $con); $RowA44=mysql_num_rows($SqlA44); 
$SqlA45=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Appraiser_TotalFinalRating=4.5", $con); $RowA45=mysql_num_rows($SqlA45); 
$SqlA47=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Appraiser_TotalFinalRating=4.7", $con); $RowA47=mysql_num_rows($SqlA47); 
$SqlA49=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Appraiser_TotalFinalRating=4.9", $con); $RowA49=mysql_num_rows($SqlA49); 
$SqlA5=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Appraiser_TotalFinalRating=5", $con); $RowA5=mysql_num_rows($SqlA5); 


//Reviewer
$SqlR1=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Reviewer_TotalFinalRating=1", $con); $RowR1=mysql_num_rows($SqlR1); 
$SqlR2=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Reviewer_TotalFinalRating=2", $con); $RowR2=mysql_num_rows($SqlR2); 
$SqlR25=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Reviewer_TotalFinalRating=2.5", $con); $RowR25=mysql_num_rows($SqlR25); 
$SqlR27=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Reviewer_TotalFinalRating=2.7", $con); $RowR27=mysql_num_rows($SqlR27); 
$SqlR29=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Reviewer_TotalFinalRating=2.9", $con); $RowR29=mysql_num_rows($SqlR29); 
$SqlR3=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Reviewer_TotalFinalRating=3", $con); $RowR3=mysql_num_rows($SqlR3); 
$SqlR32=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Reviewer_TotalFinalRating=3.2", $con); $RowR32=mysql_num_rows($SqlR32); 
$SqlR34=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Reviewer_TotalFinalRating=3.4", $con); $RowR34=mysql_num_rows($SqlR34); 
$SqlR35=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Reviewer_TotalFinalRating=3.5", $con); $RowR35=mysql_num_rows($SqlR35); 
$SqlR37=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Reviewer_TotalFinalRating=3.7", $con); $RowR37=mysql_num_rows($SqlR37); 
$SqlR39=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Reviewer_TotalFinalRating=3.9", $con); $RowR39=mysql_num_rows($SqlR39); 
$SqlR4=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Reviewer_TotalFinalRating=4", $con); $RowR4=mysql_num_rows($SqlR4); 
$SqlR42=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Reviewer_TotalFinalRating=4.2", $con); $RowR42=mysql_num_rows($SqlR42); 
$SqlR44=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Reviewer_TotalFinalRating=4.4", $con); $RowR44=mysql_num_rows($SqlR44); 
$SqlR45=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Reviewer_TotalFinalRating=4.5", $con); $RowR45=mysql_num_rows($SqlR45); 
$SqlR47=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Reviewer_TotalFinalRating=4.7", $con); $RowR47=mysql_num_rows($SqlR47); 
$SqlR49=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Reviewer_TotalFinalRating=4.9", $con); $RowR49=mysql_num_rows($SqlR49); 
$SqlR5=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Reviewer_TotalFinalRating=5", $con); $RowR5=mysql_num_rows($SqlR5); 

//HOD
$SqlH1=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Hod_TotalFinalRating=1", $con); $RowH1=mysql_num_rows($SqlH1); 
$SqlH2=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Hod_TotalFinalRating=2", $con); $RowH2=mysql_num_rows($SqlH2); 
$SqlH25=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Hod_TotalFinalRating=2.5", $con); $RowH25=mysql_num_rows($SqlH25); 
$SqlH27=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Hod_TotalFinalRating=2.7", $con); $RowH27=mysql_num_rows($SqlH27); 
$SqlH29=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Hod_TotalFinalRating=2.9", $con); $RowH29=mysql_num_rows($SqlH29); 
$SqlH3=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Hod_TotalFinalRating=3", $con); $RowH3=mysql_num_rows($SqlH3); 
$SqlH32=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Hod_TotalFinalRating=3.2", $con); $RowH32=mysql_num_rows($SqlH32); 
$SqlH34=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Hod_TotalFinalRating=3.4", $con); $RowH34=mysql_num_rows($SqlH34); 
$SqlH35=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Hod_TotalFinalRating=3.5", $con); $RowH35=mysql_num_rows($SqlH35); 
$SqlH37=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Hod_TotalFinalRating=3.7", $con); $RowH37=mysql_num_rows($SqlH37); 
$SqlH39=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Hod_TotalFinalRating=3.9", $con); $RowH39=mysql_num_rows($SqlH39); 
$SqlH4=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Hod_TotalFinalRating=4", $con); $RowH4=mysql_num_rows($SqlH4); 
$SqlH42=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Hod_TotalFinalRating=4.2", $con); $RowH42=mysql_num_rows($SqlH42); 
$SqlH44=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Hod_TotalFinalRating=4.4", $con); $RowH44=mysql_num_rows($SqlH44); 
$SqlH45=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Hod_TotalFinalRating=4.5", $con); $RowH45=mysql_num_rows($SqlH45); 
$SqlH47=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Hod_TotalFinalRating=4.7", $con); $RowH47=mysql_num_rows($SqlH47); 
$SqlH49=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Hod_TotalFinalRating=4.9", $con); $RowH49=mysql_num_rows($SqlH49); 
$SqlH5=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Hod_TotalFinalRating=5", $con); $RowH5=mysql_num_rows($SqlH5);
 
$vE1=number_format($RowE1, 0, '.', '');  $vE2=number_format($RowE2, 0, '.', ''); $vE25=number_format($RowE25, 0, '.', '');  $vE27=number_format($RowE27, 0, '.', ''); 
$vE29=number_format($RowE29, 0, '.', ''); $vE3=number_format($RowE3, 0, '.', ''); $vE32=number_format($RowE32, 0, '.', ''); $vE34=number_format($RowE34, 0, '.', '');
$vE35=number_format($RowE35, 0, '.', ''); $vE37=number_format($RowE37, 0, '.', ''); $vE39=number_format($RowE39, 0, '.', ''); $vE4=number_format($RowE4, 0, '.', '');
$vE42=number_format($RowE42, 0, '.', ''); $vE44=number_format($RowE44, 0, '.', ''); $vE45=number_format($RowE45, 0, '.', ''); $vE47=number_format($RowE47, 0, '.', '');
$vE49=number_format($RowE49, 0, '.', ''); $vE5=number_format($RowE5, 0, '.', ''); 

$vA1=number_format($RowA1, 0, '.', '');  $vA2=number_format($RowA2, 0, '.', ''); $vA25=number_format($RowA25, 0, '.', '');  $vA27=number_format($RowA27, 0, '.', ''); 
$vA29=number_format($RowA29, 0, '.', ''); $vA3=number_format($RowA3, 0, '.', ''); $vA32=number_format($RowA32, 0, '.', ''); $vA34=number_format($RowA34, 0, '.', '');
$vA35=number_format($RowA35, 0, '.', ''); $vA37=number_format($RowA37, 0, '.', ''); $vA39=number_format($RowA39, 0, '.', ''); $vA4=number_format($RowA4, 0, '.', '');
$vA42=number_format($RowA42, 0, '.', ''); $vA44=number_format($RowA44, 0, '.', ''); $vA45=number_format($RowA45, 0, '.', ''); $vA47=number_format($RowA47, 0, '.', '');
$vA49=number_format($RowA49, 0, '.', ''); $vA5=number_format($RowA5, 0, '.', ''); 

$vR1=number_format($RowR1, 0, '.', '');  $vR2=number_format($RowR2, 0, '.', ''); $vR25=number_format($RowR25, 0, '.', '');  $vR27=number_format($RowR27, 0, '.', ''); 
$vR29=number_format($RowR29, 0, '.', ''); $vR3=number_format($RowR3, 0, '.', ''); $vR32=number_format($RowR32, 0, '.', ''); $vR34=number_format($RowR34, 0, '.', '');
$vR35=number_format($RowR35, 0, '.', ''); $vR37=number_format($RowR37, 0, '.', ''); $vR39=number_format($RowR39, 0, '.', ''); $vR4=number_format($RowR4, 0, '.', '');
$vR42=number_format($RowR42, 0, '.', ''); $vR44=number_format($RowR44, 0, '.', ''); $vR45=number_format($RowR45, 0, '.', ''); $vR47=number_format($RowR47, 0, '.', '');
$vR49=number_format($RowR49, 0, '.', ''); $vR5=number_format($RowR5, 0, '.', ''); 

$vH1=number_format($RowH1, 0, '.', '');  $vH2=number_format($RowH2, 0, '.', ''); $vH25=number_format($RowH25, 0, '.', '');  $vH27=number_format($RowH27, 0, '.', ''); 
$vH29=number_format($RowH29, 0, '.', ''); $vH3=number_format($RowH3, 0, '.', ''); $vH32=number_format($RowH32, 0, '.', ''); $vH34=number_format($RowH34, 0, '.', '');
$vH35=number_format($RowH35, 0, '.', ''); $vH37=number_format($RowH37, 0, '.', ''); $vH39=number_format($RowH39, 0, '.', ''); $vH4=number_format($RowH4, 0, '.', '');
$vH42=number_format($RowH42, 0, '.', ''); $vH44=number_format($RowH44, 0, '.', ''); $vH45=number_format($RowH45, 0, '.', ''); $vH47=number_format($RowH47, 0, '.', '');
$vH49=number_format($RowH49, 0, '.', ''); $vH5=number_format($RowH5, 0, '.', ''); 


?>	 
	 <tr>
	  <td>
	   <table border="1">
	    <tr>
		  <td bgcolor="#7a6189" align="" style="font:Georgia; color:#FFFFFF; font-size:12px; width:50px;">&nbsp;<b>Rating</b></td>
		  <td align="center" bgcolor="#ECFFEC" style="font:Georgia; font-size:11px; width:50px;">1.0</td>
		  <td align="center" bgcolor="#ECFFEC" style="font:Georgia; font-size:11px; width:50px;">2.0</td>
		  <td align="center" bgcolor="#ECFFEC" style="font:Georgia; font-size:11px; width:50px;">2.5</td>
		  <td align="center" bgcolor="#ECFFEC" style="font:Georgia; font-size:11px; width:50px;">2.7</td>
		  <td align="center" bgcolor="#ECFFEC" style="font:Georgia; font-size:11px; width:50px;">2.9</td>
		  <td align="center" bgcolor="#ECFFEC" style="font:Georgia; font-size:11px; width:50px;">3.0</td>
		  <td align="center" bgcolor="#ECFFEC" style="font:Georgia; font-size:11px; width:50px;">3.2</td>
		  <td align="center" bgcolor="#ECFFEC" style="font:Georgia; font-size:11px; width:50px;">3.4</td>
		  <td align="center" bgcolor="#ECFFEC" style="font:Georgia; font-size:11px; width:50px;">3.5</td>
		  <td align="center" bgcolor="#ECFFEC" style="font:Georgia; font-size:11px; width:50px;">3.7</td>
		  <td align="center" bgcolor="#ECFFEC" style="font:Georgia; font-size:11px; width:50px;">3.9</td>
		  <td align="center" bgcolor="#ECFFEC" style="font:Georgia; font-size:11px; width:50px;">4.0</td>
		  <td align="center" bgcolor="#ECFFEC" style="font:Georgia; font-size:11px; width:50px;">4.2</td>
		  <td align="center" bgcolor="#ECFFEC" style="font:Georgia; font-size:11px; width:50px;">4.4</td>
		  <td align="center" bgcolor="#ECFFEC" style="font:Georgia; font-size:11px; width:50px;">4.5</td>
		  <td align="center" bgcolor="#ECFFEC" style="font:Georgia; font-size:11px; width:50px;">4.7</td>
		  <td align="center" bgcolor="#ECFFEC" style="font:Georgia; font-size:11px; width:50px;">4.9</td>
		  <td align="center" bgcolor="#ECFFEC" style="font:Georgia; font-size:11px; width:50px;">5.0</td>
		</tr>
		<tr bgcolor="#FF80FF">
		<td bgcolor="#7a6189" align="" style="font:Georgia; color:#FFFFFF; font-size:12px; width:100px;">&nbsp;<b>Employee</b></td>
		<td align="center" bgcolor="#FF80FF" style="font:Georgia; font-size:11px; width:50px;font-weight:<?php if($vE1>0){echo 'bold'; }?>;"><?php echo $vE1; ?></td>
	    <td align="center" bgcolor="#FF80FF" style="font:Georgia; font-size:11px; width:50px;font-weight:<?php if($vE2>0){echo 'bold'; }?>;"><?php echo $vE2; ?></td>
	    <td align="center" bgcolor="#FF80FF" style="font:Georgia; font-size:11px; width:50px;font-weight:<?php if($vE25>0){echo 'bold'; }?>;"><?php echo $vE25; ?></td>
	    <td align="center" bgcolor="#FF80FF" style="font:Georgia; font-size:11px; width:50px;font-weight:<?php if($vE27>0){echo 'bold'; }?>;"><?php echo $vE27; ?></td>
	    <td align="center" bgcolor="#FF80FF" style="font:Georgia; font-size:11px; width:50px;font-weight:<?php if($vE29>0){echo 'bold'; }?>;"><?php echo $vE29; ?></td>
	    <td align="center" bgcolor="#FF80FF" style="font:Georgia; font-size:11px; width:50px;font-weight:<?php if($vE3>0){echo 'bold'; }?>;"><?php echo $vE3; ?></td>
	    <td align="center" bgcolor="#FF80FF" style="font:Georgia; font-size:11px; width:50px;font-weight:<?php if($vE32>0){echo 'bold'; }?>;"><?php echo $vE32; ?></td>
	    <td align="center" bgcolor="#FF80FF" style="font:Georgia; font-size:11px; width:50px;font-weight:<?php if($vE34>0){echo 'bold'; }?>;"><?php echo $vE34; ?></td>
	    <td align="center" bgcolor="#FF80FF" style="font:Georgia; font-size:11px; width:50px;font-weight:<?php if($vE35>0){echo 'bold'; }?>;"><?php echo $vE35; ?></td>
	    <td align="center" bgcolor="#FF80FF" style="font:Georgia; font-size:11px; width:50px;font-weight:<?php if($vE37>0){echo 'bold'; }?>;"><?php echo $vE37; ?></td>
	    <td align="center" bgcolor="#FF80FF" style="font:Georgia; font-size:11px; width:50px;font-weight:<?php if($vE39>0){echo 'bold'; }?>;"><?php echo $vE39; ?></td>
	    <td align="center" bgcolor="#FF80FF" style="font:Georgia; font-size:11px; width:50px;font-weight:<?php if($vE4>0){echo 'bold'; }?>;"><?php echo $vE4; ?></td>
	    <td align="center" bgcolor="#FF80FF" style="font:Georgia; font-size:11px; width:50px;font-weight:<?php if($vE42>0){echo 'bold'; }?>;"><?php echo $vE42; ?></td>
	    <td align="center" bgcolor="#FF80FF" style="font:Georgia; font-size:11px; width:50px;font-weight:<?php if($vE44>0){echo 'bold'; }?>;"><?php echo $vE44; ?></td>
	    <td align="center" bgcolor="#FF80FF" style="font:Georgia; font-size:11px; width:50px;font-weight:<?php if($vE45>0){echo 'bold'; }?>;"><?php echo $vE45; ?></td>
	    <td align="center" bgcolor="#FF80FF" style="font:Georgia; font-size:11px; width:50px;font-weight:<?php if($vE47>0){echo 'bold'; }?>;"><?php echo $vE47; ?></td>
	    <td align="center" bgcolor="#FF80FF" style="font:Georgia; font-size:11px; width:50px;font-weight:<?php if($vE49>0){echo 'bold'; }?>;"><?php echo $vE49; ?></td>
	    <td align="center" bgcolor="#FF80FF" style="font:Georgia; font-size:11px; width:50px;font-weight:<?php if($vE5>0){echo 'bold'; }?>;"><?php echo $vE5; ?></td>
		</tr>
		<tr bgcolor="#4AA5FF">
		<td bgcolor="#7a6189" align="" style="font:Georgia; color:#FFFFFF; font-size:12px; width:100px;">&nbsp;<b>Appraiser</b></td>
		<td align="center" bgcolor="#4AA5FF" style="font:Georgia; font-size:11px; width:50px;font-weight:<?php if($vA1>0){echo 'bold'; }?>;"><?php echo $vA1; ?></td>
	    <td align="center" bgcolor="#4AA5FF" style="font:Georgia; font-size:11px; width:50px;font-weight:<?php if($vA2>0){echo 'bold'; }?>;"><?php echo $vA2; ?></td>
	    <td align="center" bgcolor="#4AA5FF" style="font:Georgia; font-size:11px; width:50px;font-weight:<?php if($vA25>0){echo 'bold'; }?>;"><?php echo $vA25; ?></td>
	    <td align="center" bgcolor="#4AA5FF" style="font:Georgia; font-size:11px; width:50px;font-weight:<?php if($vA27>0){echo 'bold'; }?>;"><?php echo $vA27; ?></td>
	    <td align="center" bgcolor="#4AA5FF" style="font:Georgia; font-size:11px; width:50px;font-weight:<?php if($vA29>0){echo 'bold'; }?>;"><?php echo $vA29; ?></td>
	    <td align="center" bgcolor="#4AA5FF" style="font:Georgia; font-size:11px; width:50px;font-weight:<?php if($vA3>0){echo 'bold'; }?>;"><?php echo $vA3; ?></td>
	    <td align="center" bgcolor="#4AA5FF" style="font:Georgia; font-size:11px; width:50px;font-weight:<?php if($vA32>0){echo 'bold'; }?>;"><?php echo $vA32; ?></td>
	    <td align="center" bgcolor="#4AA5FF" style="font:Georgia; font-size:11px; width:50px;font-weight:<?php if($vA34>0){echo 'bold'; }?>;"><?php echo $vA34; ?></td>
	    <td align="center" bgcolor="#4AA5FF" style="font:Georgia; font-size:11px; width:50px;font-weight:<?php if($vA35>0){echo 'bold'; }?>;"><?php echo $vA35; ?></td>
	    <td align="center" bgcolor="#4AA5FF" style="font:Georgia; font-size:11px; width:50px;font-weight:<?php if($vA37>0){echo 'bold'; }?>;"><?php echo $vA37; ?></td>
	    <td align="center" bgcolor="#4AA5FF" style="font:Georgia; font-size:11px; width:50px;font-weight:<?php if($vA39>0){echo 'bold'; }?>;"><?php echo $vA39; ?></td>
	    <td align="center" bgcolor="#4AA5FF" style="font:Georgia; font-size:11px; width:50px;font-weight:<?php if($vA4>0){echo 'bold'; }?>;"><?php echo $vA4; ?></td>
	    <td align="center" bgcolor="#4AA5FF" style="font:Georgia; font-size:11px; width:50px;font-weight:<?php if($vA42>0){echo 'bold'; }?>;"><?php echo $vA42; ?></td>
	    <td align="center" bgcolor="#4AA5FF" style="font:Georgia; font-size:11px; width:50px;font-weight:<?php if($vA44>0){echo 'bold'; }?>;"><?php echo $vA44; ?></td>
	    <td align="center" bgcolor="#4AA5FF" style="font:Georgia; font-size:11px; width:50px;font-weight:<?php if($vA45>0){echo 'bold'; }?>;"><?php echo $vA45; ?></td>
	    <td align="center" bgcolor="#4AA5FF" style="font:Georgia; font-size:11px; width:50px;font-weight:<?php if($vA47>0){echo 'bold'; }?>;"><?php echo $vA47; ?></td>
	    <td align="center" bgcolor="#4AA5FF" style="font:Georgia; font-size:11px; width:50px;font-weight:<?php if($vA49>0){echo 'bold'; }?>;"><?php echo $vA49; ?></td>
	    <td align="center" bgcolor="#4AA5FF" style="font:Georgia; font-size:11px; width:50px;font-weight:<?php if($vA5>0){echo 'bold'; }?>;"><?php echo $vA5; ?></td>
		</tr>
		<tr bgcolor="">
		<td bgcolor="#7a6189" align="" style="font:Georgia; color:#FFFFFF; font-size:12px; width:100px;">&nbsp;<b>Reviewer</b></td>
		<td align="center" bgcolor="#93FF93" style="font:Georgia; font-size:11px; width:50px;font-weight:<?php if($vR1>0){echo 'bold'; }?>;"><?php echo $vR1; ?></td>
	    <td align="center" bgcolor="#93FF93" style="font:Georgia; font-size:11px; width:50px;font-weight:<?php if($vR2>0){echo 'bold'; }?>;"><?php echo $vR2; ?></td>
	    <td align="center" bgcolor="#93FF93" style="font:Georgia; font-size:11px; width:50px;font-weight:<?php if($vR25>0){echo 'bold'; }?>;"><?php echo $vR25; ?></td>
	    <td align="center" bgcolor="#93FF93" style="font:Georgia; font-size:11px; width:50px;font-weight:<?php if($vR27>0){echo 'bold'; }?>;"><?php echo $vR27; ?></td>
	    <td align="center" bgcolor="#93FF93" style="font:Georgia; font-size:11px; width:50px;font-weight:<?php if($vR29>0){echo 'bold'; }?>;"><?php echo $vR29; ?></td>
	    <td align="center" bgcolor="#93FF93" style="font:Georgia; font-size:11px; width:50px;font-weight:<?php if($vR3>0){echo 'bold'; }?>;"><?php echo $vR3; ?></td>
	    <td align="center" bgcolor="#93FF93" style="font:Georgia; font-size:11px; width:50px;font-weight:<?php if($vR32>0){echo 'bold'; }?>;"><?php echo $vR32; ?></td>
	    <td align="center" bgcolor="#93FF93" style="font:Georgia; font-size:11px; width:50px;font-weight:<?php if($vR34>0){echo 'bold'; }?>;"><?php echo $vR34; ?></td>
	    <td align="center" bgcolor="#93FF93" style="font:Georgia; font-size:11px; width:50px;font-weight:<?php if($vR35>0){echo 'bold'; }?>;"><?php echo $vR35; ?></td>
	    <td align="center" bgcolor="#93FF93" style="font:Georgia; font-size:11px; width:50px;font-weight:<?php if($vR37>0){echo 'bold'; }?>;"><?php echo $vR37; ?></td>
	    <td align="center" bgcolor="#93FF93" style="font:Georgia; font-size:11px; width:50px;font-weight:<?php if($vR39>0){echo 'bold'; }?>;"><?php echo $vR39; ?></td>
	    <td align="center" bgcolor="#93FF93" style="font:Georgia; font-size:11px; width:50px;font-weight:<?php if($vR4>0){echo 'bold'; }?>;"><?php echo $vR4; ?></td>
	    <td align="center" bgcolor="#93FF93" style="font:Georgia; font-size:11px; width:50px;font-weight:<?php if($vR42>0){echo 'bold'; }?>;"><?php echo $vR42; ?></td>
	    <td align="center" bgcolor="#93FF93" style="font:Georgia; font-size:11px; width:50px;font-weight:<?php if($vR44>0){echo 'bold'; }?>;"><?php echo $vR44; ?></td>
	    <td align="center" bgcolor="#93FF93" style="font:Georgia; font-size:11px; width:50px;font-weight:<?php if($vR45>0){echo 'bold'; }?>;"><?php echo $vR45; ?></td>
	    <td align="center" bgcolor="#93FF93" style="font:Georgia; font-size:11px; width:50px;font-weight:<?php if($vR47>0){echo 'bold'; }?>;"><?php echo $vR47; ?></td>
	    <td align="center" bgcolor="#93FF93" style="font:Georgia; font-size:11px; width:50px;font-weight:<?php if($vR49>0){echo 'bold'; }?>;"><?php echo $vR49; ?></td>
	    <td align="center" bgcolor="#93FF93" style="font:Georgia; font-size:11px; width:50px;font-weight:<?php if($vR5>0){echo 'bold'; }?>;"><?php echo $vR5; ?></td>
		</tr>
		<tr bgcolor="">
		<td bgcolor="#7a6189" align="" style="font:Georgia; color:#FFFFFF; font-size:12px; width:100px;">&nbsp;<b>HOD</b></td>
		<td align="center" bgcolor="#FFA953" style="font:Georgia; font-size:11px; width:50px;font-weight:<?php if($vH1>0){echo 'bold'; }?>;"><?php echo $vH1; ?></td>
	    <td align="center" bgcolor="#FFA953" style="font:Georgia; font-size:11px; width:50px;font-weight:<?php if($vH2>0){echo 'bold'; }?>;"><?php echo $vH2; ?></td>
	    <td align="center" bgcolor="#FFA953" style="font:Georgia; font-size:11px; width:50px;font-weight:<?php if($vH25>0){echo 'bold'; }?>;"><?php echo $vH25; ?></td>
	    <td align="center" bgcolor="#FFA953" style="font:Georgia; font-size:11px; width:50px;font-weight:<?php if($vH27>0){echo 'bold'; }?>;"><?php echo $vH27; ?></td>
	    <td align="center" bgcolor="#FFA953" style="font:Georgia; font-size:11px; width:50px;font-weight:<?php if($vH29>0){echo 'bold'; }?>;"><?php echo $vH29; ?></td>
	    <td align="center" bgcolor="#FFA953" style="font:Georgia; font-size:11px; width:50px;font-weight:<?php if($vH3>0){echo 'bold'; }?>;"><?php echo $vH3; ?></td>
	    <td align="center" bgcolor="#FFA953" style="font:Georgia; font-size:11px; width:50px;font-weight:<?php if($vH32>0){echo 'bold'; }?>;"><?php echo $vH32; ?></td>
	    <td align="center" bgcolor="#FFA953" style="font:Georgia; font-size:11px; width:50px;font-weight:<?php if($vH34>0){echo 'bold'; }?>;"><?php echo $vH34; ?></td>
	    <td align="center" bgcolor="#FFA953" style="font:Georgia; font-size:11px; width:50px;font-weight:<?php if($vH35>0){echo 'bold'; }?>;"><?php echo $vH35; ?></td>
	    <td align="center" bgcolor="#FFA953" style="font:Georgia; font-size:11px; width:50px;font-weight:<?php if($vH37>0){echo 'bold'; }?>;"><?php echo $vH37; ?></td>
	    <td align="center" bgcolor="#FFA953" style="font:Georgia; font-size:11px; width:50px;font-weight:<?php if($vH39>0){echo 'bold'; }?>;"><?php echo $vH39; ?></td>
	    <td align="center" bgcolor="#FFA953" style="font:Georgia; font-size:11px; width:50px;font-weight:<?php if($vH4>0){echo 'bold'; }?>;"><?php echo $vH4; ?></td>
	    <td align="center" bgcolor="#FFA953" style="font:Georgia; font-size:11px; width:50px;font-weight:<?php if($vH42>0){echo 'bold'; }?>;"><?php echo $vH42; ?></td>
	    <td align="center" bgcolor="#FFA953" style="font:Georgia; font-size:11px; width:50px;font-weight:<?php if($vH44>0){echo 'bold'; }?>;"><?php echo $vH44; ?></td>
	    <td align="center" bgcolor="#FFA953" style="font:Georgia; font-size:11px; width:50px;font-weight:<?php if($vH45>0){echo 'bold'; }?>;"><?php echo $vH45; ?></td>
	    <td align="center" bgcolor="#FFA953" style="font:Georgia; font-size:11px; width:50px;font-weight:<?php if($vH47>0){echo 'bold'; }?>;"><?php echo $vH47; ?></td>
	    <td align="center" bgcolor="#FFA953" style="font:Georgia; font-size:11px; width:50px;font-weight:<?php if($vH49>0){echo 'bold'; }?>;"><?php echo $vH49; ?></td>
	    <td align="center" bgcolor="#FFA953" style="font:Georgia; font-size:11px; width:50px;font-weight:<?php if($vH5>0){echo 'bold'; }?>;"><?php echo $vH5; ?></td>
		</tr>
	   </table>
	  </td>
	 </tr>
     <tr>
      <td style="width:800px; height:300px; border:0; border-style:hidden;" valign="top" align="center">
	  <iframe name="Giframe" src="OverAllEmpGraph.php?YI=<?php echo $_REQUEST['YI']; ?>" style="width:900px;height:400px;border:0;border-style:hidden;"></iframe></td>
	 </tr>
   </table>
 </td>
</tr> 
   </table>
 </td> 
</tr>
</table>  
</td>
<?php }  if($_REQUEST['action']=='OverRatngGraph' AND $_REQUEST['value']=='OverHODGraph') { ?>
<tr>
<td>
<table>
<?php $sqlEmpHOD=mysql_query("select hrm_employee.*,HOD_EmployeeID from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.HOD_EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." group by HOD_EmployeeID order by EmpCode ASC", $con);      
$sno=1; while($ResEmpHOD=mysql_fetch_array($sqlEmpHOD)) { ?>
<tr>
 <td>
   <table border="0" width="400">
     <tr>
	  <td colspan="8" valign="top" style=" background-color:#0069D2; font-size:14px; color:#FFFFFF; font-family:Times New Roman; font-weight:bold;">&nbsp;
	   &nbsp;&nbsp;&nbsp;Rating Graph &nbsp;:&nbsp;<?php echo '('.$sno.') &nbsp;'.$ResEmpHOD['Fname'].' '.$ResEmpHOD['Sname'].' '.$ResEmpHOD['Lname'];?>&nbsp;&nbsp;<?php echo $PRD; ?>
	    &nbsp;&nbsp;&nbsp;<a href="OverAllHODWiseRatingGraph<?php echo $sno; ?>.php?action=LinGraph&EmpId=<?php echo $ResEmpHOD['HOD_EmployeeID']; ?>&YI=<?php echo $_REQUEST['YI']; ?>" target="Giframe<?php echo $sno; ?>"><font color="#FF8A15">Linear graph</font></a>&nbsp;&nbsp;&nbsp;
	  </td>
	 </tr>
<?php 
$SqlE1=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Emp_TotalFinalRating=1 AND HOD_EmployeeID=".$ResEmpHOD['HOD_EmployeeID'], $con); $RowE1=mysql_num_rows($SqlE1); 
$SqlE2=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Emp_TotalFinalRating=2 AND HOD_EmployeeID=".$ResEmpHOD['HOD_EmployeeID'], $con); $RowE2=mysql_num_rows($SqlE2); 
$SqlE25=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Emp_TotalFinalRating=2.5 AND HOD_EmployeeID=".$ResEmpHOD['HOD_EmployeeID'], $con); $RowE25=mysql_num_rows($SqlE25); 
$SqlE27=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Emp_TotalFinalRating=2.7 AND HOD_EmployeeID=".$ResEmpHOD['HOD_EmployeeID'], $con); $RowE27=mysql_num_rows($SqlE27); 
$SqlE29=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Emp_TotalFinalRating=2.9 AND HOD_EmployeeID=".$ResEmpHOD['HOD_EmployeeID'], $con); $RowE29=mysql_num_rows($SqlE29); 
$SqlE3=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Emp_TotalFinalRating=3 AND HOD_EmployeeID=".$ResEmpHOD['HOD_EmployeeID'], $con); $RowE3=mysql_num_rows($SqlE3); 
$SqlE32=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Emp_TotalFinalRating=3.2 AND HOD_EmployeeID=".$ResEmpHOD['HOD_EmployeeID'], $con); $RowE32=mysql_num_rows($SqlE32); 
$SqlE34=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Emp_TotalFinalRating=3.4 AND HOD_EmployeeID=".$ResEmpHOD['HOD_EmployeeID'], $con); $RowE34=mysql_num_rows($SqlE34); 
$SqlE35=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Emp_TotalFinalRating=3.5 AND HOD_EmployeeID=".$ResEmpHOD['HOD_EmployeeID'], $con); $RowE35=mysql_num_rows($SqlE35); 
$SqlE37=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Emp_TotalFinalRating=3.7 AND HOD_EmployeeID=".$ResEmpHOD['HOD_EmployeeID'], $con); $RowE37=mysql_num_rows($SqlE37); 
$SqlE39=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Emp_TotalFinalRating=3.9 AND HOD_EmployeeID=".$ResEmpHOD['HOD_EmployeeID'], $con); $RowE39=mysql_num_rows($SqlE39); 
$SqlE4=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Emp_TotalFinalRating=4 AND HOD_EmployeeID=".$ResEmpHOD['HOD_EmployeeID'], $con); $RowE4=mysql_num_rows($SqlE4); 
$SqlE42=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Emp_TotalFinalRating=4.2 AND HOD_EmployeeID=".$ResEmpHOD['HOD_EmployeeID'], $con); $RowE42=mysql_num_rows($SqlE42); 
$SqlE44=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Emp_TotalFinalRating=4.4 AND HOD_EmployeeID=".$ResEmpHOD['HOD_EmployeeID'], $con); $RowE44=mysql_num_rows($SqlE44); 
$SqlE45=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Emp_TotalFinalRating=4.5 AND HOD_EmployeeID=".$ResEmpHOD['HOD_EmployeeID'], $con); $RowE45=mysql_num_rows($SqlE45); 
$SqlE47=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Emp_TotalFinalRating=4.7 AND HOD_EmployeeID=".$ResEmpHOD['HOD_EmployeeID'], $con); $RowE47=mysql_num_rows($SqlE47); 
$SqlE49=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Emp_TotalFinalRating=4.9 AND HOD_EmployeeID=".$ResEmpHOD['HOD_EmployeeID'], $con); $RowE49=mysql_num_rows($SqlE49); 
$SqlE5=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Emp_TotalFinalRating=5 AND HOD_EmployeeID=".$ResEmpHOD['HOD_EmployeeID'], $con); $RowE5=mysql_num_rows($SqlE5); 


//Appraiser
$SqlA1=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Appraiser_TotalFinalRating=1 AND HOD_EmployeeID=".$ResEmpHOD['HOD_EmployeeID'], $con); $RowA1=mysql_num_rows($SqlA1); 
$SqlA2=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Appraiser_TotalFinalRating=2 AND HOD_EmployeeID=".$ResEmpHOD['HOD_EmployeeID'], $con); $RowA2=mysql_num_rows($SqlA2); 
$SqlA25=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Appraiser_TotalFinalRating=2.5 AND HOD_EmployeeID=".$ResEmpHOD['HOD_EmployeeID'], $con); $RowA25=mysql_num_rows($SqlA25); 
$SqlA27=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Appraiser_TotalFinalRating=2.7 AND HOD_EmployeeID=".$ResEmpHOD['HOD_EmployeeID'], $con); $RowA27=mysql_num_rows($SqlA27); 
$SqlA29=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Appraiser_TotalFinalRating=2.9 AND HOD_EmployeeID=".$ResEmpHOD['HOD_EmployeeID'], $con); $RowA29=mysql_num_rows($SqlA29); 
$SqlA3=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Appraiser_TotalFinalRating=3 AND HOD_EmployeeID=".$ResEmpHOD['HOD_EmployeeID'], $con); $RowA3=mysql_num_rows($SqlA3); 
$SqlA32=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Appraiser_TotalFinalRating=3.2 AND HOD_EmployeeID=".$ResEmpHOD['HOD_EmployeeID'], $con); $RowA32=mysql_num_rows($SqlA32); 
$SqlA34=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Appraiser_TotalFinalRating=3.4 AND HOD_EmployeeID=".$ResEmpHOD['HOD_EmployeeID'], $con); $RowA34=mysql_num_rows($SqlA34); 
$SqlA35=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Appraiser_TotalFinalRating=3.5 AND HOD_EmployeeID=".$ResEmpHOD['HOD_EmployeeID'], $con); $RowA35=mysql_num_rows($SqlA35); 
$SqlA37=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Appraiser_TotalFinalRating=3.7 AND HOD_EmployeeID=".$ResEmpHOD['HOD_EmployeeID'], $con); $RowA37=mysql_num_rows($SqlA37); 
$SqlA39=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Appraiser_TotalFinalRating=3.9 AND HOD_EmployeeID=".$ResEmpHOD['HOD_EmployeeID'], $con); $RowA39=mysql_num_rows($SqlA39); 
$SqlA4=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Appraiser_TotalFinalRating=4 AND HOD_EmployeeID=".$ResEmpHOD['HOD_EmployeeID'], $con); $RowA4=mysql_num_rows($SqlA4); 
$SqlA42=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Appraiser_TotalFinalRating=4.2 AND HOD_EmployeeID=".$ResEmpHOD['HOD_EmployeeID'], $con); $RowA42=mysql_num_rows($SqlA42); 
$SqlA44=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Appraiser_TotalFinalRating=4.4 AND HOD_EmployeeID=".$ResEmpHOD['HOD_EmployeeID'], $con); $RowA44=mysql_num_rows($SqlA44); 
$SqlA45=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Appraiser_TotalFinalRating=4.5 AND HOD_EmployeeID=".$ResEmpHOD['HOD_EmployeeID'], $con); $RowA45=mysql_num_rows($SqlA45); 
$SqlA47=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Appraiser_TotalFinalRating=4.7 AND HOD_EmployeeID=".$ResEmpHOD['HOD_EmployeeID'], $con); $RowA47=mysql_num_rows($SqlA47); 
$SqlA49=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Appraiser_TotalFinalRating=4.9 AND HOD_EmployeeID=".$ResEmpHOD['HOD_EmployeeID'], $con); $RowA49=mysql_num_rows($SqlA49); 
$SqlA5=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Appraiser_TotalFinalRating=5 AND HOD_EmployeeID=".$ResEmpHOD['HOD_EmployeeID'], $con); $RowA5=mysql_num_rows($SqlA5); 


//Reviewer
$SqlR1=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Reviewer_TotalFinalRating=1 AND HOD_EmployeeID=".$ResEmpHOD['HOD_EmployeeID'], $con); $RowR1=mysql_num_rows($SqlR1); 
$SqlR2=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Reviewer_TotalFinalRating=2 AND HOD_EmployeeID=".$ResEmpHOD['HOD_EmployeeID'], $con); $RowR2=mysql_num_rows($SqlR2); 
$SqlR25=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Reviewer_TotalFinalRating=2.5 AND HOD_EmployeeID=".$ResEmpHOD['HOD_EmployeeID'], $con); $RowR25=mysql_num_rows($SqlR25); 
$SqlR27=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Reviewer_TotalFinalRating=2.7 AND HOD_EmployeeID=".$ResEmpHOD['HOD_EmployeeID'], $con); $RowR27=mysql_num_rows($SqlR27); 
$SqlR29=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Reviewer_TotalFinalRating=2.9 AND HOD_EmployeeID=".$ResEmpHOD['HOD_EmployeeID'], $con); $RowR29=mysql_num_rows($SqlR29); 
$SqlR3=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Reviewer_TotalFinalRating=3 AND HOD_EmployeeID=".$ResEmpHOD['HOD_EmployeeID'], $con); $RowR3=mysql_num_rows($SqlR3); 
$SqlR32=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Reviewer_TotalFinalRating=3.2 AND HOD_EmployeeID=".$ResEmpHOD['HOD_EmployeeID'], $con); $RowR32=mysql_num_rows($SqlR32); 
$SqlR34=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Reviewer_TotalFinalRating=3.4 AND HOD_EmployeeID=".$ResEmpHOD['HOD_EmployeeID'], $con); $RowR34=mysql_num_rows($SqlR34); 
$SqlR35=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Reviewer_TotalFinalRating=3.5 AND HOD_EmployeeID=".$ResEmpHOD['HOD_EmployeeID'], $con); $RowR35=mysql_num_rows($SqlR35); 
$SqlR37=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Reviewer_TotalFinalRating=3.7 AND HOD_EmployeeID=".$ResEmpHOD['HOD_EmployeeID'], $con); $RowR37=mysql_num_rows($SqlR37); 
$SqlR39=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Reviewer_TotalFinalRating=3.9 AND HOD_EmployeeID=".$ResEmpHOD['HOD_EmployeeID'], $con); $RowR39=mysql_num_rows($SqlR39); 
$SqlR4=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Reviewer_TotalFinalRating=4 AND HOD_EmployeeID=".$ResEmpHOD['HOD_EmployeeID'], $con); $RowR4=mysql_num_rows($SqlR4); 
$SqlR42=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Reviewer_TotalFinalRating=4.2 AND HOD_EmployeeID=".$ResEmpHOD['HOD_EmployeeID'], $con); $RowR42=mysql_num_rows($SqlR42); 
$SqlR44=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Reviewer_TotalFinalRating=4.4 AND HOD_EmployeeID=".$ResEmpHOD['HOD_EmployeeID'], $con); $RowR44=mysql_num_rows($SqlR44); 
$SqlR45=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Reviewer_TotalFinalRating=4.5 AND HOD_EmployeeID=".$ResEmpHOD['HOD_EmployeeID'], $con); $RowR45=mysql_num_rows($SqlR45); 
$SqlR47=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Reviewer_TotalFinalRating=4.7 AND HOD_EmployeeID=".$ResEmpHOD['HOD_EmployeeID'], $con); $RowR47=mysql_num_rows($SqlR47); 
$SqlR49=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Reviewer_TotalFinalRating=4.9 AND HOD_EmployeeID=".$ResEmpHOD['HOD_EmployeeID'], $con); $RowR49=mysql_num_rows($SqlR49); 
$SqlR5=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Reviewer_TotalFinalRating=5 AND HOD_EmployeeID=".$ResEmpHOD['HOD_EmployeeID'], $con); $RowR5=mysql_num_rows($SqlR5); 

//HOD
$SqlH1=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Hod_TotalFinalRating=1 AND HOD_EmployeeID=".$ResEmpHOD['HOD_EmployeeID'], $con); $RowH1=mysql_num_rows($SqlH1); 
$SqlH2=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Hod_TotalFinalRating=2 AND HOD_EmployeeID=".$ResEmpHOD['HOD_EmployeeID'], $con); $RowH2=mysql_num_rows($SqlH2); 
$SqlH25=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Hod_TotalFinalRating=2.5 AND HOD_EmployeeID=".$ResEmpHOD['HOD_EmployeeID'], $con); $RowH25=mysql_num_rows($SqlH25); 
$SqlH27=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Hod_TotalFinalRating=2.7 AND HOD_EmployeeID=".$ResEmpHOD['HOD_EmployeeID'], $con); $RowH27=mysql_num_rows($SqlH27); 
$SqlH29=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Hod_TotalFinalRating=2.9 AND HOD_EmployeeID=".$ResEmpHOD['HOD_EmployeeID'], $con); $RowH29=mysql_num_rows($SqlH29); 
$SqlH3=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Hod_TotalFinalRating=3 AND HOD_EmployeeID=".$ResEmpHOD['HOD_EmployeeID'], $con); $RowH3=mysql_num_rows($SqlH3); 
$SqlH32=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Hod_TotalFinalRating=3.2 AND HOD_EmployeeID=".$ResEmpHOD['HOD_EmployeeID'], $con); $RowH32=mysql_num_rows($SqlH32); 
$SqlH34=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Hod_TotalFinalRating=3.4 AND HOD_EmployeeID=".$ResEmpHOD['HOD_EmployeeID'], $con); $RowH34=mysql_num_rows($SqlH34); 
$SqlH35=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Hod_TotalFinalRating=3.5 AND HOD_EmployeeID=".$ResEmpHOD['HOD_EmployeeID'], $con); $RowH35=mysql_num_rows($SqlH35); 
$SqlH37=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Hod_TotalFinalRating=3.7 AND HOD_EmployeeID=".$ResEmpHOD['HOD_EmployeeID'], $con); $RowH37=mysql_num_rows($SqlH37); 
$SqlH39=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Hod_TotalFinalRating=3.9 AND HOD_EmployeeID=".$ResEmpHOD['HOD_EmployeeID'], $con); $RowH39=mysql_num_rows($SqlH39); 
$SqlH4=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Hod_TotalFinalRating=4 AND HOD_EmployeeID=".$ResEmpHOD['HOD_EmployeeID'], $con); $RowH4=mysql_num_rows($SqlH4); 
$SqlH42=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Hod_TotalFinalRating=4.2 AND HOD_EmployeeID=".$ResEmpHOD['HOD_EmployeeID'], $con); $RowH42=mysql_num_rows($SqlH42); 
$SqlH44=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Hod_TotalFinalRating=4.4 AND HOD_EmployeeID=".$ResEmpHOD['HOD_EmployeeID'], $con); $RowH44=mysql_num_rows($SqlH44); 
$SqlH45=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Hod_TotalFinalRating=4.5 AND HOD_EmployeeID=".$ResEmpHOD['HOD_EmployeeID'], $con); $RowH45=mysql_num_rows($SqlH45); 
$SqlH47=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Hod_TotalFinalRating=4.7 AND HOD_EmployeeID=".$ResEmpHOD['HOD_EmployeeID'], $con); $RowH47=mysql_num_rows($SqlH47); 
$SqlH49=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Hod_TotalFinalRating=4.9 AND HOD_EmployeeID=".$ResEmpHOD['HOD_EmployeeID'], $con); $RowH49=mysql_num_rows($SqlH49); 
$SqlH5=mysql_query("select EmpPmsId from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.EmployeeID=hrm_employee.EmployeeID where hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$CompanyId." AND AssessmentYear=".$_REQUEST['YI']." AND Hod_TotalFinalRating=5 AND HOD_EmployeeID=".$ResEmpHOD['HOD_EmployeeID'], $con); $RowH5=mysql_num_rows($SqlH5);
 
$vE1=number_format($RowE1, 0, '.', '');  $vE2=number_format($RowE2, 0, '.', ''); $vE25=number_format($RowE25, 0, '.', '');  $vE27=number_format($RowE27, 0, '.', ''); 
$vE29=number_format($RowE29, 0, '.', ''); $vE3=number_format($RowE3, 0, '.', ''); $vE32=number_format($RowE32, 0, '.', ''); $vE34=number_format($RowE34, 0, '.', '');
$vE35=number_format($RowE35, 0, '.', ''); $vE37=number_format($RowE37, 0, '.', ''); $vE39=number_format($RowE39, 0, '.', ''); $vE4=number_format($RowE4, 0, '.', '');
$vE42=number_format($RowE42, 0, '.', ''); $vE44=number_format($RowE44, 0, '.', ''); $vE45=number_format($RowE45, 0, '.', ''); $vE47=number_format($RowE47, 0, '.', '');
$vE49=number_format($RowE49, 0, '.', ''); $vE5=number_format($RowE5, 0, '.', ''); 

$vA1=number_format($RowA1, 0, '.', '');  $vA2=number_format($RowA2, 0, '.', ''); $vA25=number_format($RowA25, 0, '.', '');  $vA27=number_format($RowA27, 0, '.', ''); 
$vA29=number_format($RowA29, 0, '.', ''); $vA3=number_format($RowA3, 0, '.', ''); $vA32=number_format($RowA32, 0, '.', ''); $vA34=number_format($RowA34, 0, '.', '');
$vA35=number_format($RowA35, 0, '.', ''); $vA37=number_format($RowA37, 0, '.', ''); $vA39=number_format($RowA39, 0, '.', ''); $vA4=number_format($RowA4, 0, '.', '');
$vA42=number_format($RowA42, 0, '.', ''); $vA44=number_format($RowA44, 0, '.', ''); $vA45=number_format($RowA45, 0, '.', ''); $vA47=number_format($RowA47, 0, '.', '');
$vA49=number_format($RowA49, 0, '.', ''); $vA5=number_format($RowA5, 0, '.', ''); 

$vR1=number_format($RowR1, 0, '.', '');  $vR2=number_format($RowR2, 0, '.', ''); $vR25=number_format($RowR25, 0, '.', '');  $vR27=number_format($RowR27, 0, '.', ''); 
$vR29=number_format($RowR29, 0, '.', ''); $vR3=number_format($RowR3, 0, '.', ''); $vR32=number_format($RowR32, 0, '.', ''); $vR34=number_format($RowR34, 0, '.', '');
$vR35=number_format($RowR35, 0, '.', ''); $vR37=number_format($RowR37, 0, '.', ''); $vR39=number_format($RowR39, 0, '.', ''); $vR4=number_format($RowR4, 0, '.', '');
$vR42=number_format($RowR42, 0, '.', ''); $vR44=number_format($RowR44, 0, '.', ''); $vR45=number_format($RowR45, 0, '.', ''); $vR47=number_format($RowR47, 0, '.', '');
$vR49=number_format($RowR49, 0, '.', ''); $vR5=number_format($RowR5, 0, '.', ''); 

$vH1=number_format($RowH1, 0, '.', '');  $vH2=number_format($RowH2, 0, '.', ''); $vH25=number_format($RowH25, 0, '.', '');  $vH27=number_format($RowH27, 0, '.', ''); 
$vH29=number_format($RowH29, 0, '.', ''); $vH3=number_format($RowH3, 0, '.', ''); $vH32=number_format($RowH32, 0, '.', ''); $vH34=number_format($RowH34, 0, '.', '');
$vH35=number_format($RowH35, 0, '.', ''); $vH37=number_format($RowH37, 0, '.', ''); $vH39=number_format($RowH39, 0, '.', ''); $vH4=number_format($RowH4, 0, '.', '');
$vH42=number_format($RowH42, 0, '.', ''); $vH44=number_format($RowH44, 0, '.', ''); $vH45=number_format($RowH45, 0, '.', ''); $vH47=number_format($RowH47, 0, '.', '');
$vH49=number_format($RowH49, 0, '.', ''); $vH5=number_format($RowH5, 0, '.', ''); 

$vE1=number_format($RowE1, 0, '.', '');  $vE2=number_format($RowE2, 0, '.', ''); $vE25=number_format($RowE25, 0, '.', '');  $vE27=number_format($RowE27, 0, '.', ''); 
$vE29=number_format($RowE29, 0, '.', ''); $vE3=number_format($RowE3, 0, '.', ''); $vE32=number_format($RowE32, 0, '.', ''); $vE34=number_format($RowE34, 0, '.', '');
$vE35=number_format($RowE35, 0, '.', ''); $vE37=number_format($RowE37, 0, '.', ''); $vE39=number_format($RowE39, 0, '.', ''); $vE4=number_format($RowE4, 0, '.', '');
$vE42=number_format($RowE42, 0, '.', ''); $vE44=number_format($RowE44, 0, '.', ''); $vE45=number_format($RowE45, 0, '.', ''); $vE47=number_format($RowE47, 0, '.', '');
$vE49=number_format($RowE49, 0, '.', ''); $vE5=number_format($RowE5, 0, '.', ''); 
?>	 
	 	 <tr>
	  <td>
	   <table border="1">
	    <tr>
		  <td bgcolor="#7a6189" align="" style="font:Georgia; color:#FFFFFF; font-size:12px; width:50px;">&nbsp;<b>Rating</b></td>
		  <td align="center" bgcolor="#ECFFEC" style="font:Georgia; font-size:11px; width:50px;">1.0</td>
		  <td align="center" bgcolor="#ECFFEC" style="font:Georgia; font-size:11px; width:50px;">2.0</td>
		  <td align="center" bgcolor="#ECFFEC" style="font:Georgia; font-size:11px; width:50px;">2.5</td>
		  <td align="center" bgcolor="#ECFFEC" style="font:Georgia; font-size:11px; width:50px;">2.7</td>
		  <td align="center" bgcolor="#ECFFEC" style="font:Georgia; font-size:11px; width:50px;">2.9</td>
		  <td align="center" bgcolor="#ECFFEC" style="font:Georgia; font-size:11px; width:50px;">3.0</td>
		  <td align="center" bgcolor="#ECFFEC" style="font:Georgia; font-size:11px; width:50px;">3.2</td>
		  <td align="center" bgcolor="#ECFFEC" style="font:Georgia; font-size:11px; width:50px;">3.4</td>
		  <td align="center" bgcolor="#ECFFEC" style="font:Georgia; font-size:11px; width:50px;">3.5</td>
		  <td align="center" bgcolor="#ECFFEC" style="font:Georgia; font-size:11px; width:50px;">3.7</td>
		  <td align="center" bgcolor="#ECFFEC" style="font:Georgia; font-size:11px; width:50px;">3.9</td>
		  <td align="center" bgcolor="#ECFFEC" style="font:Georgia; font-size:11px; width:50px;">4.0</td>
		  <td align="center" bgcolor="#ECFFEC" style="font:Georgia; font-size:11px; width:50px;">4.2</td>
		  <td align="center" bgcolor="#ECFFEC" style="font:Georgia; font-size:11px; width:50px;">4.4</td>
		  <td align="center" bgcolor="#ECFFEC" style="font:Georgia; font-size:11px; width:50px;">4.5</td>
		  <td align="center" bgcolor="#ECFFEC" style="font:Georgia; font-size:11px; width:50px;">4.7</td>
		  <td align="center" bgcolor="#ECFFEC" style="font:Georgia; font-size:11px; width:50px;">4.9</td>
		  <td align="center" bgcolor="#ECFFEC" style="font:Georgia; font-size:11px; width:50px;">5.0</td>
		</tr>
		<tr bgcolor="#FF80FF">
		<td bgcolor="#7a6189" align="" style="font:Georgia; color:#FFFFFF; font-size:12px; width:100px;">&nbsp;<b>Employee</b></td>
		<td align="center" bgcolor="#FF80FF" style="font:Georgia; font-size:11px; width:50px;font-weight:<?php if($vE1>0){echo 'bold'; }?>;"><?php echo $vE1; ?></td>
	    <td align="center" bgcolor="#FF80FF" style="font:Georgia; font-size:11px; width:50px;font-weight:<?php if($vE2>0){echo 'bold'; }?>;"><?php echo $vE2; ?></td>
	    <td align="center" bgcolor="#FF80FF" style="font:Georgia; font-size:11px; width:50px;font-weight:<?php if($vE25>0){echo 'bold'; }?>;"><?php echo $vE25; ?></td>
	    <td align="center" bgcolor="#FF80FF" style="font:Georgia; font-size:11px; width:50px;font-weight:<?php if($vE27>0){echo 'bold'; }?>;"><?php echo $vE27; ?></td>
	    <td align="center" bgcolor="#FF80FF" style="font:Georgia; font-size:11px; width:50px;font-weight:<?php if($vE29>0){echo 'bold'; }?>;"><?php echo $vE29; ?></td>
	    <td align="center" bgcolor="#FF80FF" style="font:Georgia; font-size:11px; width:50px;font-weight:<?php if($vE3>0){echo 'bold'; }?>;"><?php echo $vE3; ?></td>
	    <td align="center" bgcolor="#FF80FF" style="font:Georgia; font-size:11px; width:50px;font-weight:<?php if($vE32>0){echo 'bold'; }?>;"><?php echo $vE32; ?></td>
	    <td align="center" bgcolor="#FF80FF" style="font:Georgia; font-size:11px; width:50px;font-weight:<?php if($vE34>0){echo 'bold'; }?>;"><?php echo $vE34; ?></td>
	    <td align="center" bgcolor="#FF80FF" style="font:Georgia; font-size:11px; width:50px;font-weight:<?php if($vE35>0){echo 'bold'; }?>;"><?php echo $vE35; ?></td>
	    <td align="center" bgcolor="#FF80FF" style="font:Georgia; font-size:11px; width:50px;font-weight:<?php if($vE37>0){echo 'bold'; }?>;"><?php echo $vE37; ?></td>
	    <td align="center" bgcolor="#FF80FF" style="font:Georgia; font-size:11px; width:50px;font-weight:<?php if($vE39>0){echo 'bold'; }?>;"><?php echo $vE39; ?></td>
	    <td align="center" bgcolor="#FF80FF" style="font:Georgia; font-size:11px; width:50px;font-weight:<?php if($vE4>0){echo 'bold'; }?>;"><?php echo $vE4; ?></td>
	    <td align="center" bgcolor="#FF80FF" style="font:Georgia; font-size:11px; width:50px;font-weight:<?php if($vE42>0){echo 'bold'; }?>;"><?php echo $vE42; ?></td>
	    <td align="center" bgcolor="#FF80FF" style="font:Georgia; font-size:11px; width:50px;font-weight:<?php if($vE44>0){echo 'bold'; }?>;"><?php echo $vE44; ?></td>
	    <td align="center" bgcolor="#FF80FF" style="font:Georgia; font-size:11px; width:50px;font-weight:<?php if($vE45>0){echo 'bold'; }?>;"><?php echo $vE45; ?></td>
	    <td align="center" bgcolor="#FF80FF" style="font:Georgia; font-size:11px; width:50px;font-weight:<?php if($vE47>0){echo 'bold'; }?>;"><?php echo $vE47; ?></td>
	    <td align="center" bgcolor="#FF80FF" style="font:Georgia; font-size:11px; width:50px;font-weight:<?php if($vE49>0){echo 'bold'; }?>;"><?php echo $vE49; ?></td>
	    <td align="center" bgcolor="#FF80FF" style="font:Georgia; font-size:11px; width:50px;font-weight:<?php if($vE5>0){echo 'bold'; }?>;"><?php echo $vE5; ?></td>
		</tr>
		<tr bgcolor="#4AA5FF">
		<td bgcolor="#7a6189" align="" style="font:Georgia; color:#FFFFFF; font-size:12px; width:100px;">&nbsp;<b>Appraiser</b></td>
		<td align="center" bgcolor="#4AA5FF" style="font:Georgia; font-size:11px; width:50px;font-weight:<?php if($vA1>0){echo 'bold'; }?>;"><?php echo $vA1; ?></td>
	    <td align="center" bgcolor="#4AA5FF" style="font:Georgia; font-size:11px; width:50px;font-weight:<?php if($vA2>0){echo 'bold'; }?>;"><?php echo $vA2; ?></td>
	    <td align="center" bgcolor="#4AA5FF" style="font:Georgia; font-size:11px; width:50px;font-weight:<?php if($vA25>0){echo 'bold'; }?>;"><?php echo $vA25; ?></td>
	    <td align="center" bgcolor="#4AA5FF" style="font:Georgia; font-size:11px; width:50px;font-weight:<?php if($vA27>0){echo 'bold'; }?>;"><?php echo $vA27; ?></td>
	    <td align="center" bgcolor="#4AA5FF" style="font:Georgia; font-size:11px; width:50px;font-weight:<?php if($vA29>0){echo 'bold'; }?>;"><?php echo $vA29; ?></td>
	    <td align="center" bgcolor="#4AA5FF" style="font:Georgia; font-size:11px; width:50px;font-weight:<?php if($vA3>0){echo 'bold'; }?>;"><?php echo $vA3; ?></td>
	    <td align="center" bgcolor="#4AA5FF" style="font:Georgia; font-size:11px; width:50px;font-weight:<?php if($vA32>0){echo 'bold'; }?>;"><?php echo $vA32; ?></td>
	    <td align="center" bgcolor="#4AA5FF" style="font:Georgia; font-size:11px; width:50px;font-weight:<?php if($vA34>0){echo 'bold'; }?>;"><?php echo $vA34; ?></td>
	    <td align="center" bgcolor="#4AA5FF" style="font:Georgia; font-size:11px; width:50px;font-weight:<?php if($vA35>0){echo 'bold'; }?>;"><?php echo $vA35; ?></td>
	    <td align="center" bgcolor="#4AA5FF" style="font:Georgia; font-size:11px; width:50px;font-weight:<?php if($vA37>0){echo 'bold'; }?>;"><?php echo $vA37; ?></td>
	    <td align="center" bgcolor="#4AA5FF" style="font:Georgia; font-size:11px; width:50px;font-weight:<?php if($vA39>0){echo 'bold'; }?>;"><?php echo $vA39; ?></td>
	    <td align="center" bgcolor="#4AA5FF" style="font:Georgia; font-size:11px; width:50px;font-weight:<?php if($vA4>0){echo 'bold'; }?>;"><?php echo $vA4; ?></td>
	    <td align="center" bgcolor="#4AA5FF" style="font:Georgia; font-size:11px; width:50px;font-weight:<?php if($vA42>0){echo 'bold'; }?>;"><?php echo $vA42; ?></td>
	    <td align="center" bgcolor="#4AA5FF" style="font:Georgia; font-size:11px; width:50px;font-weight:<?php if($vA44>0){echo 'bold'; }?>;"><?php echo $vA44; ?></td>
	    <td align="center" bgcolor="#4AA5FF" style="font:Georgia; font-size:11px; width:50px;font-weight:<?php if($vA45>0){echo 'bold'; }?>;"><?php echo $vA45; ?></td>
	    <td align="center" bgcolor="#4AA5FF" style="font:Georgia; font-size:11px; width:50px;font-weight:<?php if($vA47>0){echo 'bold'; }?>;"><?php echo $vA47; ?></td>
	    <td align="center" bgcolor="#4AA5FF" style="font:Georgia; font-size:11px; width:50px;font-weight:<?php if($vA49>0){echo 'bold'; }?>;"><?php echo $vA49; ?></td>
	    <td align="center" bgcolor="#4AA5FF" style="font:Georgia; font-size:11px; width:50px;font-weight:<?php if($vA5>0){echo 'bold'; }?>;"><?php echo $vA5; ?></td>
		</tr>
		<tr bgcolor="">
		<td bgcolor="#7a6189" align="" style="font:Georgia; color:#FFFFFF; font-size:12px; width:100px;">&nbsp;<b>Reviewer</b></td>
		<td align="center" bgcolor="#93FF93" style="font:Georgia; font-size:11px; width:50px;font-weight:<?php if($vR1>0){echo 'bold'; }?>;"><?php echo $vR1; ?></td>
	    <td align="center" bgcolor="#93FF93" style="font:Georgia; font-size:11px; width:50px;font-weight:<?php if($vR2>0){echo 'bold'; }?>;"><?php echo $vR2; ?></td>
	    <td align="center" bgcolor="#93FF93" style="font:Georgia; font-size:11px; width:50px;font-weight:<?php if($vR25>0){echo 'bold'; }?>;"><?php echo $vR25; ?></td>
	    <td align="center" bgcolor="#93FF93" style="font:Georgia; font-size:11px; width:50px;font-weight:<?php if($vR27>0){echo 'bold'; }?>;"><?php echo $vR27; ?></td>
	    <td align="center" bgcolor="#93FF93" style="font:Georgia; font-size:11px; width:50px;font-weight:<?php if($vR29>0){echo 'bold'; }?>;"><?php echo $vR29; ?></td>
	    <td align="center" bgcolor="#93FF93" style="font:Georgia; font-size:11px; width:50px;font-weight:<?php if($vR3>0){echo 'bold'; }?>;"><?php echo $vR3; ?></td>
	    <td align="center" bgcolor="#93FF93" style="font:Georgia; font-size:11px; width:50px;font-weight:<?php if($vR32>0){echo 'bold'; }?>;"><?php echo $vR32; ?></td>
	    <td align="center" bgcolor="#93FF93" style="font:Georgia; font-size:11px; width:50px;font-weight:<?php if($vR34>0){echo 'bold'; }?>;"><?php echo $vR34; ?></td>
	    <td align="center" bgcolor="#93FF93" style="font:Georgia; font-size:11px; width:50px;font-weight:<?php if($vR35>0){echo 'bold'; }?>;"><?php echo $vR35; ?></td>
	    <td align="center" bgcolor="#93FF93" style="font:Georgia; font-size:11px; width:50px;font-weight:<?php if($vR37>0){echo 'bold'; }?>;"><?php echo $vR37; ?></td>
	    <td align="center" bgcolor="#93FF93" style="font:Georgia; font-size:11px; width:50px;font-weight:<?php if($vR39>0){echo 'bold'; }?>;"><?php echo $vR39; ?></td>
	    <td align="center" bgcolor="#93FF93" style="font:Georgia; font-size:11px; width:50px;font-weight:<?php if($vR4>0){echo 'bold'; }?>;"><?php echo $vR4; ?></td>
	    <td align="center" bgcolor="#93FF93" style="font:Georgia; font-size:11px; width:50px;font-weight:<?php if($vR42>0){echo 'bold'; }?>;"><?php echo $vR42; ?></td>
	    <td align="center" bgcolor="#93FF93" style="font:Georgia; font-size:11px; width:50px;font-weight:<?php if($vR44>0){echo 'bold'; }?>;"><?php echo $vR44; ?></td>
	    <td align="center" bgcolor="#93FF93" style="font:Georgia; font-size:11px; width:50px;font-weight:<?php if($vR45>0){echo 'bold'; }?>;"><?php echo $vR45; ?></td>
	    <td align="center" bgcolor="#93FF93" style="font:Georgia; font-size:11px; width:50px;font-weight:<?php if($vR47>0){echo 'bold'; }?>;"><?php echo $vR47; ?></td>
	    <td align="center" bgcolor="#93FF93" style="font:Georgia; font-size:11px; width:50px;font-weight:<?php if($vR49>0){echo 'bold'; }?>;"><?php echo $vR49; ?></td>
	    <td align="center" bgcolor="#93FF93" style="font:Georgia; font-size:11px; width:50px;font-weight:<?php if($vR5>0){echo 'bold'; }?>;"><?php echo $vR5; ?></td>
		</tr>
		<tr bgcolor="">
		<td bgcolor="#7a6189" align="" style="font:Georgia; color:#FFFFFF; font-size:12px; width:100px;">&nbsp;<b>HOD</b></td>
		<td align="center" bgcolor="#FFA953" style="font:Georgia; font-size:11px; width:50px;font-weight:<?php if($vH1>0){echo 'bold'; }?>;"><?php echo $vH1; ?></td>
	    <td align="center" bgcolor="#FFA953" style="font:Georgia; font-size:11px; width:50px;font-weight:<?php if($vH2>0){echo 'bold'; }?>;"><?php echo $vH2; ?></td>
	    <td align="center" bgcolor="#FFA953" style="font:Georgia; font-size:11px; width:50px;font-weight:<?php if($vH25>0){echo 'bold'; }?>;"><?php echo $vH25; ?></td>
	    <td align="center" bgcolor="#FFA953" style="font:Georgia; font-size:11px; width:50px;font-weight:<?php if($vH27>0){echo 'bold'; }?>;"><?php echo $vH27; ?></td>
	    <td align="center" bgcolor="#FFA953" style="font:Georgia; font-size:11px; width:50px;font-weight:<?php if($vH29>0){echo 'bold'; }?>;"><?php echo $vH29; ?></td>
	    <td align="center" bgcolor="#FFA953" style="font:Georgia; font-size:11px; width:50px;font-weight:<?php if($vH3>0){echo 'bold'; }?>;"><?php echo $vH3; ?></td>
	    <td align="center" bgcolor="#FFA953" style="font:Georgia; font-size:11px; width:50px;font-weight:<?php if($vH32>0){echo 'bold'; }?>;"><?php echo $vH32; ?></td>
	    <td align="center" bgcolor="#FFA953" style="font:Georgia; font-size:11px; width:50px;font-weight:<?php if($vH34>0){echo 'bold'; }?>;"><?php echo $vH34; ?></td>
	    <td align="center" bgcolor="#FFA953" style="font:Georgia; font-size:11px; width:50px;font-weight:<?php if($vH35>0){echo 'bold'; }?>;"><?php echo $vH35; ?></td>
	    <td align="center" bgcolor="#FFA953" style="font:Georgia; font-size:11px; width:50px;font-weight:<?php if($vH37>0){echo 'bold'; }?>;"><?php echo $vH37; ?></td>
	    <td align="center" bgcolor="#FFA953" style="font:Georgia; font-size:11px; width:50px;font-weight:<?php if($vH39>0){echo 'bold'; }?>;"><?php echo $vH39; ?></td>
	    <td align="center" bgcolor="#FFA953" style="font:Georgia; font-size:11px; width:50px;font-weight:<?php if($vH4>0){echo 'bold'; }?>;"><?php echo $vH4; ?></td>
	    <td align="center" bgcolor="#FFA953" style="font:Georgia; font-size:11px; width:50px;font-weight:<?php if($vH42>0){echo 'bold'; }?>;"><?php echo $vH42; ?></td>
	    <td align="center" bgcolor="#FFA953" style="font:Georgia; font-size:11px; width:50px;font-weight:<?php if($vH44>0){echo 'bold'; }?>;"><?php echo $vH44; ?></td>
	    <td align="center" bgcolor="#FFA953" style="font:Georgia; font-size:11px; width:50px;font-weight:<?php if($vH45>0){echo 'bold'; }?>;"><?php echo $vH45; ?></td>
	    <td align="center" bgcolor="#FFA953" style="font:Georgia; font-size:11px; width:50px;font-weight:<?php if($vH47>0){echo 'bold'; }?>;"><?php echo $vH47; ?></td>
	    <td align="center" bgcolor="#FFA953" style="font:Georgia; font-size:11px; width:50px;font-weight:<?php if($vH49>0){echo 'bold'; }?>;"><?php echo $vH49; ?></td>
	    <td align="center" bgcolor="#FFA953" style="font:Georgia; font-size:11px; width:50px;font-weight:<?php if($vH5>0){echo 'bold'; }?>;"><?php echo $vH5; ?></td>
		</tr>
	   </table>
	  </td>
	 </tr>
	 
	 
	 
  <tr bgcolor="" style="height:20px;" valign="middle"> 
	<td style="width:800px; height:250px; border:0; border-style:hidden;" valign="top" align="center">
	    <iframe name="Giframe<?php echo $sno; ?>" src="OverAllHODWiseRatingGraph<?php echo $sno; ?>.php?action=LinGraph&EmpId=<?php echo $ResEmpHOD['HOD_EmployeeID']; ?>&YI=<?php echo $_REQUEST['YI']; ?>" style="width:800px; height:300px; border:0; border-style:hidden;"></iframe>	
   </td>      
 </tr>
</table>
 </td>
</tr> 
<?php $sno++;} ?> 
<?php } ?>
   </table>
 </td> 
</tr>
</table>  
</td>

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