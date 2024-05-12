<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}
if($_REQUEST['YI']==1){$Y=2012; $Y2=2013;}elseif($_REQUEST['YI']==2){$Y=2013; $Y2=2014;}elseif($_REQUEST['YI']==3){$Y=2014; $Y2=2015;}elseif($_REQUEST['YI']==4){$Y=2015; $Y2=2016;}elseif($_REQUEST['YI']==5){$Y=2016; $Y2=2017;}elseif($_REQUEST['YI']==6){$Y=2017; $Y2=2018;}elseif($_REQUEST['YI']==7){$Y=2018; $Y2=2019;}elseif($_REQUEST['YI']==8){$Y=2019; $Y2=2020;}elseif($_REQUEST['YI']==9){$Y=2020; $Y2=2021;}
if($CompanyId==1 OR $CompanyId==2){$YYear=$Y;}elseif($CompanyId==3){$YYear=$Y2;}
//****************************************************************************************************************
?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet"/>
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style>
.recCls1{font-family:Times New Roman;font-size:14px;text-align:center;font-weight:bold;color:#FFF;}
.recCls2{font-family:Times New Roman;font-size:12px;text-align:center;font-weight:bold;color:#FFF;}
.recCls3{font-family:Times New Roman;font-size:12px;color:#000;}
.input{font-family:Times New Roman;font-size:12px;color:#000;height:20px;}
.inner_table{height:500px;overflow-y:auto;width:auto;}
</style>
<script type="text/javascript" src="js/stuHover.js"></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<!--<link rel="stylesheet" type="text/css" href="src/css/jscal2.css"/>
<link rel="stylesheet" type="text/css" href="src/css/border-radius.css"/>
<link rel="stylesheet" type="text/css" href="src/css/steel/steel.css"/>
<script type="text/javascript" src="src/js/jscal2.js"></script>
<script type="text/javascript" src="src/js/lang/en.js"></script>-->
<script src="js/jquery-1.9.1.js"></script>
<script type="text/javascript" src="js/jquery.freezeheader.js"></script>
<style>.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}</style>
<Script type="text/javascript">window.history.forward(1);</script>
<Script type="text/javascript" language="javascript">
$(document).ready(function () { $("#table1").freezeHeader({ 'height': '500px' }); })

function SelectYear(v)
{ var hod=document.getElementById("hod1").value; var hr=document.getElementById("hr1").value;
  var app=document.getElementById("app1").value; var rev=document.getElementById("rev1").value;
  window.location='EditAdminPms.php?YI='+v+'&hod='+hod+'&hr='+hr+'&app='+app+'&rev='+rev;
}
function SelectECmptPrs(v,yi,e)
{ var hod=document.getElementById("hod1").value; var hr=document.getElementById("hr1").value;
  var app=document.getElementById("app1").value; var rev=document.getElementById("rev1").value;
  if(e=='d'){var ee='Dept';}else if(e=='a'){var ee='App';}
  else if(e=='r'){var ee='Rev';}else if(e=='h'){var ee='Hod';} 
  window.location='EditAdminPms.php?action=EmpCmptPrs&ee='+ee+'&value='+v+'&YI='+yi+'&hod='+hod+'&hr='+hr+'&app='+app+'&rev='+rev; }

function FucChk(sn)
{ if(document.getElementById("Chk"+sn).checked==true)
  {document.getElementById("TR"+sn).style.background='#9BEF47'; }
  else if(document.getElementById("Chk"+sn).checked==false)
  {document.getElementById("TR"+sn).style.background='#FFFFFF'; }
}

function funcheckfil(v)
{
 if(v=='hr'){ document.getElementById("hod1").value=0; document.getElementById("hr1").value=1;
 document.getElementById("app1").value=0; document.getElementById("rev1").value=0; }
 if(v=='hod'){ document.getElementById("hod1").value=1; document.getElementById("hr1").value=0;
 document.getElementById("app1").value=0; document.getElementById("rev1").value=0; }
 if(v=='app'){ document.getElementById("hod1").value=0; document.getElementById("hr1").value=0;
 document.getElementById("app1").value=1; document.getElementById("rev1").value=0; }
 if(v=='rev'){ document.getElementById("hod1").value=0; document.getElementById("hr1").value=0;
 document.getElementById("app1").value=0; document.getElementById("rev1").value=1; }
}

function Fhod(pmsid,sn)
{document.getElementById("hodbtn1"+sn).style.display='none'; document.getElementById("hodbtn2"+sn).style.display='block'; document.getElementById("hod_S"+sn).readOnly=false; document.getElementById("hod_R"+sn).readOnly=false; document.getElementById("hod_G"+sn).disabled=false; document.getElementById("hod_D"+sn).disabled=false; document.getElementById("hod_PIS"+sn).readOnly=false; document.getElementById("hod_PPIS"+sn).readOnly=false; document.getElementById("hod_PCS"+sn).readOnly=false; document.getElementById("hod_PPCS"+sn).readOnly=false; document.getElementById("hod_INMS"+sn).readOnly=false; document.getElementById("hod_PINMS"+sn).readOnly=false; document.getElementById("hod_GMS"+sn).readOnly=false;}
function Fhr(pmsid,sn)
{document.getElementById("hrbtn1"+sn).style.display='none'; document.getElementById("hrbtn2"+sn).style.display='block'; document.getElementById("hr_S"+sn).readOnly=false; document.getElementById("hr_R"+sn).readOnly=false; document.getElementById("hr_G"+sn).disabled=false; document.getElementById("hr_D"+sn).disabled=false; document.getElementById("hr_PIS"+sn).readOnly=false; document.getElementById("hr_PPIS"+sn).readOnly=false; document.getElementById("hr_PCS"+sn).readOnly=false; document.getElementById("hr_PPCS"+sn).readOnly=false; document.getElementById("hr_INMS"+sn).readOnly=false; document.getElementById("hr_PINMS"+sn).readOnly=false; document.getElementById("hr_GMS"+sn).readOnly=false;}
function Fapp(pmsid,sn)
{document.getElementById("appbtn1"+sn).style.display='none'; document.getElementById("appbtn2"+sn).style.display='block'; document.getElementById("app_S"+sn).readOnly=false; document.getElementById("app_R"+sn).readOnly=false; document.getElementById("app_G"+sn).disabled=false; document.getElementById("app_D"+sn).disabled=false;}
function Frev(pmsid,sn)
{document.getElementById("revbtn1"+sn).style.display='none'; document.getElementById("revbtn2"+sn).style.display='block'; document.getElementById("rev_S"+sn).readOnly=false; document.getElementById("rev_R"+sn).readOnly=false; document.getElementById("rev_G"+sn).disabled=false; document.getElementById("rev_D"+sn).disabled=false;} 

function Fshod(pmsid,sn,eid)
{ var url = 'EditAdminPmsAct.php'; var pars = 'act=hodcal&s='+document.getElementById("hod_S"+sn).value+'&r='+document.getElementById("hod_R"+sn).value+'&g='+document.getElementById("hod_G"+sn).value+'&d='+document.getElementById("hod_D"+sn).value+'&pis='+document.getElementById("hod_PIS"+sn).value+'&ppis='+document.getElementById("hod_PPIS"+sn).value+'&pcs='+document.getElementById("hod_PCS"+sn).value+'&ppcs='+document.getElementById("hod_PPCS"+sn).value+'&inms='+document.getElementById("hod_INMS"+sn).value+'&pinms='+document.getElementById("hod_PINMS"+sn).value+'&gms='+document.getElementById("hod_GMS"+sn).value+'&sn='+sn+'&pmsid='+pmsid+'&eid='+eid; var myAjax = new Ajax.Request( url,{ method:'post', parameters:pars, onComplete:show_hod}); }
function show_hod(originalRequest){document.getElementById('hodspan').innerHTML = originalRequest.responseText;
var sn=document.getElementById("hodsn").value; document.getElementById("TR"+sn).style.background='#9BEF47'; document.getElementById("hodbtn1"+sn).style.display='block'; document.getElementById("hodbtn2"+sn).style.display='none';}


function Fshr(pmsid,sn,eid)
{ var url = 'EditAdminPmsAct.php'; var pars = 'act=hrcal&s='+document.getElementById("hr_S"+sn).value+'&r='+document.getElementById("hr_R"+sn).value+'&g='+document.getElementById("hr_G"+sn).value+'&d='+document.getElementById("hr_D"+sn).value+'&pis='+document.getElementById("hr_PIS"+sn).value+'&ppis='+document.getElementById("hr_PPIS"+sn).value+'&pcs='+document.getElementById("hr_PCS"+sn).value+'&ppcs='+document.getElementById("hr_PPCS"+sn).value+'&inms='+document.getElementById("hr_INMS"+sn).value+'&pinms='+document.getElementById("hr_PINMS"+sn).value+'&gms='+document.getElementById("hr_GMS"+sn).value+'&sn='+sn+'&pmsid='+pmsid+'&eid='+eid; var myAjax = new Ajax.Request( url,{ method:'post', parameters:pars, onComplete:show_hr}); }
function show_hr(originalRequest){document.getElementById('hrspan').innerHTML = originalRequest.responseText;
var sn=document.getElementById("hrsn").value; document.getElementById("TR"+sn).style.background='#9BEF47'; document.getElementById("hrbtn1"+sn).style.display='block'; document.getElementById("hrbtn2"+sn).style.display='none';}

function Fsapp(pmsid,sn,eid)
{ var url = 'EditAdminPmsAct.php'; var pars = 'act=appcal&s='+document.getElementById("app_S"+sn).value+'&r='+document.getElementById("app_R"+sn).value+'&g='+document.getElementById("app_G"+sn).value+'&d='+document.getElementById("app_D"+sn).value+'&sn='+sn+'&pmsid='+pmsid+'&eid='+eid; var myAjax = new Ajax.Request( url,{ method:'post', parameters:pars, onComplete:show_app}); }
function show_app(originalRequest){document.getElementById('appspan').innerHTML = originalRequest.responseText;
var sn=document.getElementById("asn").value; document.getElementById("TR"+sn).style.background='#9BEF47'; document.getElementById("appbtn1"+sn).style.display='block'; document.getElementById("appbtn2"+sn).style.display='none';}

function Fsrev(pmsid,sn,eid)
{ var url = 'EditAdminPmsAct.php'; var pars = 'act=revcal&s='+document.getElementById("rev_S"+sn).value+'&r='+document.getElementById("rev_R"+sn).value+'&g='+document.getElementById("rev_G"+sn).value+'&d='+document.getElementById("rev_D"+sn).value+'&sn='+sn+'&pmsid='+pmsid+'&eid='+eid; var myAjax = new Ajax.Request( url,{ method:'post', parameters:pars, onComplete:show_rev}); }
function show_rev(originalRequest){document.getElementById('revspan').innerHTML = originalRequest.responseText;
var sn=document.getElementById("rsn").value; document.getElementById("TR"+sn).style.background='#9BEF47';
document.getElementById("revbtn1"+sn).style.display='block'; document.getElementById("revbtn2"+sn).style.display='none';}

function ReadHis(pmsid,ci,ec,yi)
{window.open("EditAdminPmsHis.php?act=edithistory&pmsid="+pmsid+"&ci="+ci+"&ec="+ec+"&yi="+yi,"HisForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=800,height=250");}

//id="hodbtn1" id="hodbtn2" hod_S _R _G _D _PIS _PPIS _PCS _PPCS _INMS _PINMS _GMS   
</Script>
</head>
<body class="body" bgcolor="">
<input type="hidden" name="ComId" id="ComId" value="<?php echo $CompanyId; ?>" />
<input type="hidden" name="YId" id="YId" value="<?php echo $YearId; ?>" />
<input type="hidden" name="UserId" id="UserId" value="<?php echo $UserId; ?>" />
<input type="hidden" name="DeptValue" id="DeptValue" value="<?php echo $_REQUEST['value']; ?>" />

<input type="hidden" name="hod1" id="hod1" value="<?php echo $_REQUEST['hod']; ?>" />
<input type="hidden" name="hr1" id="hr1" value="<?php echo $_REQUEST['hr']; ?>" />
<input type="hidden" name="app1" id="app1" value="<?php echo $_REQUEST['app']; ?>" />
<input type="hidden" name="rev1" id="rev1" value="<?php echo $_REQUEST['rev']; ?>" />
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
	  <td valign="top" align="center" id="MainWindow">
<?php //************************************************************************************************?>
<?php //****************START*****START*****START******START******START********************?>
<?php //******************************************************************************************?>
<table border="0" style="margin-top:0px;width:100%;">
	<tr>
		<?php if(($_SESSION['UserType']=='M' OR $_SESSION['UserType']=='S' OR $_SESSION['UserType']=='A') AND $_SESSION['login'] = true AND ($_SESSION['PMS']==1 OR $_SESSION['PMS_Report']==1)) { ?>
		<td align="" width="100%" valign="top">
		   <table border="0">
       		 <tr><td colspan="2">
			       <table border="0">
                     <tr>
					  <td colspan="12" align="left" class="heading">Edit PMS &nbsp;<span id="ReturnValue">&nbsp;</span></td>
					  <td>
				    <table border="0">
                    <tr>
<?php $sY=mysql_query("select * from hrm_year where YearId=".$_REQUEST['YI']."", $con); $rY=mysql_fetch_assoc($sY); 
      $FD=date("Y",strtotime($rY['FromDate'])); $TD=date("Y",strtotime($rY['ToDate'])); $PRD=$FD.'-'.$TD; ?>	     
               <td class="td1" style="width:120px;"><select class="tdsel" style="background-color:#DDFFBB;width:120px;" name="YearID" id="YearID" onChange="SelectYear(this.value)"><?php if($_REQUEST['YI']!=''){ $SqlY=mysql_query("select * from hrm_year where YearId=".$_REQUEST['YI'], $con); $ResY=mysql_fetch_array($SqlY); ?><option value="<?php echo $ResY['YearId']; ?>"><?php echo date("Y",strtotime($ResY['FromDate'])).'-'.date("Y",strtotime($ResY['ToDate'])); if($ResY['YearId']>5){ echo ' - Y'; }?></option><?php }else{ ?><option value="" selected>Year</option><?php } $SqlYear=mysql_query("select y.YearId,FromDate,ToDate from hrm_employee_pms p inner join hrm_year y on p.AssessmentYear=y.YearId where CompanyId=".$CompanyId." group by AssessmentYear order by AssessmentYear DESC", $con); while($ResYear=mysql_fetch_array($SqlYear)) { ?><option value="<?php echo $ResYear['YearId']; ?>"><?php echo date("Y",strtotime($ResYear['FromDate'])).'-'.date("Y",strtotime($ResYear['ToDate'])); if($ResYear['YearId']>5){ echo ' - Y'; } ?></option><?php } ?></select></td>					
					
					
					 <?php /*?><td class="td1" style="font-size:12px; width:90px;" align="center">
<?php $sY=mysql_query("select * from hrm_year where YearId=".$_REQUEST['YI']."", $con); $rY=mysql_fetch_assoc($sY); 
      $FD=date("Y",strtotime($rY['FromDate'])); $TD=date("Y",strtotime($rY['ToDate'])); $PRD=$FD.'-'.$TD; ?>					 					 
<select style="font-size:12px; width:88px; height:20px; background-color:#DDFFBB;" name="YearID" id="YearID" onChange="SelectYear(this.value)"><option value="<?php echo $_REQUEST['YI']; ?>" style="margin-left:0px;" selected><?php echo $PRD; ?></option>
<?php for($i=$YearId; $i>=1; $i--){	
	  $s2Y=mysql_query("select * from hrm_year where YearId=".$i,$con); $r2Y=mysql_fetch_assoc($s2Y);
	  $FD2=date("Y",strtotime($r2Y['FromDate'])); $TD2=date("Y",strtotime($r2Y['ToDate'])); ?>
<?php if($_REQUEST['YI']!=$i){ ?><option value="<?php echo $i; ?>"><?php echo $FD2.'-'.$TD2; ?></option><?php } ?>
<?php } ?></select></td><?php */?>

<td class="td1" style="font-size:11px;width:60px;" align="center">
                     <select style="font-size:12px;width:100px;height:20px;background-color:#DDFFBB;" name="checkfil" id="checkfil" onChange="funcheckfil(this.value)">
					 <option value="hr" <?php if($_REQUEST['hr']==1){echo 'selected'; } ?>>HR LEVEL</option>
					 <option value="hod" <?php if($_REQUEST['hod']==1){echo 'selected'; } ?>>HOD LEVEL</option>
					 <option value="app" <?php if($_REQUEST['app']==1){echo 'selected'; } ?>>APP LEVEL</option>
					 <option value="rev" <?php if($_REQUEST['rev']==1){echo 'selected'; } ?>>REV LEVEL</option>
					 </select>
					</td>
				
<td class="td1" style="font-size:11px;width:150px;" align="center">
                       <select style="font-size:12px; width:155px; height:20px; background-color:#DDFFBB;" name="DeptInc" id="DeptInc" onChange="SelectECmptPrs(this.value,<?php echo $_REQUEST['YI']; ?>,'d')">                       <option value="" style="margin-left:0px;" selected>SELECT DEPARTMENT</option>
<?php $SqlDept=mysql_query("select * from hrm_department where CompanyId=".$CompanyId." order by DepartmentName ASC", $con); while($ResDept=mysql_fetch_array($SqlDept)) { ?>
                       <option value="<?php echo $ResDept['DepartmentId']; ?>"><?php echo '&nbsp;'.$ResDept['DepartmentCode'];?></option><?php } ?>
					   <option value="0">&nbsp;All</option>
					   </select></td>
					   <td class="td1" style="font-size:11px; width:150px;" align="center">
                     <select style="font-size:12px; width:148px; height:20px; background-color:#DDFFBB;" name="AppInc" id="AppInc" onChange="SelectECmptPrs(this.value,<?php echo $_REQUEST['YI']; ?>,'a')">
					 <option value="" style="margin-left:0px;" selected>SELECT APPRAISER</option>
<?php $SqlHod=mysql_query("SELECT Appraiser_EmployeeID,Fname,Sname,Lname from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.Appraiser_EmployeeID=hrm_employee.EmployeeID WHERE hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." GROUP BY Appraiser_EmployeeID ORDER BY Fname ASC", $con); 
      while($ResHod=mysql_fetch_array($SqlHod)) { $EnameH=$ResHod['Fname'].' '.$ResHod['Sname'].' '.$ResHod['Lname']; ?>
                     <option value="<?php echo $ResHod['Appraiser_EmployeeID']; ?>"><?php echo '&nbsp;'.$EnameH; ?></option><?php } ?></select></td>
					  <td class="td1" style="font-size:11px; width:150px;" align="center">
                     <select style="font-size:12px; width:148px; height:20px; background-color:#DDFFBB;" name="RevInc" id="RevInc" onChange="SelectECmptPrs(this.value,<?php echo $_REQUEST['YI']; ?>,'r')">
					 <option value="" style="margin-left:0px;" selected>SELECT REVIEWER</option>
<?php $SqlHod=mysql_query("SELECT Reviewer_EmployeeID,Fname,Sname,Lname from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.Reviewer_EmployeeID=hrm_employee.EmployeeID WHERE hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." GROUP BY Reviewer_EmployeeID ORDER BY Fname ASC", $con); 
      while($ResHod=mysql_fetch_array($SqlHod)) { $EnameH=$ResHod['Fname'].' '.$ResHod['Sname'].' '.$ResHod['Lname']; ?>
                     <option value="<?php echo $ResHod['Reviewer_EmployeeID']; ?>"><?php echo '&nbsp;'.$EnameH; ?></option><?php } ?></select></td>
					  <td class="td1" style="font-size:11px; width:150px;" align="center">
                     <select style="font-size:12px; width:148px; height:20px; background-color:#DDFFBB;" name="HodInc" id="HodInc" onChange="SelectECmptPrs(this.value,<?php echo $_REQUEST['YI']; ?>,'h')">
					 <option value="" style="margin-left:0px;" selected>SELECT HOD</option>
<?php $SqlHod=mysql_query("SELECT HOD_EmployeeID,Fname,Sname,Lname from hrm_employee_pms INNER JOIN hrm_employee ON hrm_employee_pms.HOD_EmployeeID=hrm_employee.EmployeeID WHERE hrm_employee_pms.CompanyId=".$CompanyId." AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." GROUP BY HOD_EmployeeID ORDER BY Fname ASC", $con); 
      while($ResHod=mysql_fetch_array($SqlHod)) { $EnameH=$ResHod['Fname'].' '.$ResHod['Sname'].' '.$ResHod['Lname']; ?>
                     <option value="<?php echo $ResHod['HOD_EmployeeID']; ?>"><?php echo '&nbsp;'.$EnameH; ?></option><?php } ?></select></td>
                     </tr>
				   </table>					
				   </td>                           
<?php } ?>					 
		           </tr>
                  </table>
				</td>
			 </tr>
<?php //---------------------------------------Display Record----------------------------------------------------------------- ?>
<?php if($_REQUEST['action']=='EmpCmptPrs') { ?>
<?php 
if($_REQUEST['ee']=='Dept')
{ $name='Department Wise'; 
  if($_REQUEST['value']!=0)
  { $sqlA=mysql_query("select DepartmentName from hrm_department where DepartmentId=".$_REQUEST['value'], $con); $resA=mysql_fetch_assoc($sqlA); $name2=$resA['DepartmentName']; }
  else{$name2='All Department';}
}
elseif($_REQUEST['ee']=='App')
{ $name='Apraiser Wise';
  $sqlA=mysql_query("select Fname,Sname,Lname from hrm_employee where EmployeeId=".$_REQUEST['value'], $con); $resA=mysql_fetch_assoc($sqlA); 
  $name2=$resA['Fname'].' '.$resA['Sname'].' '.$resA['Lname'];
}
elseif($_REQUEST['ee']=='Rev')
{ $name='Reviewer Wise';
  $sqlA=mysql_query("select Fname,Sname,Lname from hrm_employee where EmployeeId=".$_REQUEST['value'], $con); $resA=mysql_fetch_assoc($sqlA); 
  $name2=$resA['Fname'].' '.$resA['Sname'].' '.$resA['Lname'];
}
elseif($_REQUEST['ee']=='Hod')
{ $name='HOD Wise';
  $sqlA=mysql_query("select Fname,Sname,Lname from hrm_employee where EmployeeId=".$_REQUEST['value'], $con); $resA=mysql_fetch_assoc($sqlA); 
  $name2=$resA['Fname'].' '.$resA['Sname'].' '.$resA['Lname'];
}
?>

<tr>
 <td style="width:100%;">
   <table border="1" style="width:100%;" id="table1" cellspacing="0">
     <div class="thead">
     <thead>
	 <tr bgcolor="#7a6189">
     <td colspan="7" class="recCls1" align="center" style="background-color:#0069D2;">&nbsp;Complete PMS Process Details <?php echo $name; ?> : &nbsp;&nbsp;(&nbsp;<?php echo $name2.'-'.$PRD; ?>&nbsp;)</td>
<?php if($_REQUEST['hod']==1){?><td colspan="12" class="recCls1">HOD<span id="hodspan" style="color:#80FF00;"></span></td>
<?php } if($_REQUEST['hr']==1){ ?><td colspan="12" class="recCls1">HR<span id="hrspan" style="color:#80FF00;"></span></td>
<?php } if($_REQUEST['app']==1){ ?><td colspan="5" class="recCls1">APPRAISER<span id="appspan" style="color:#80FF00;"></span></td>
<?php } if($_REQUEST['rev']==1){ ?><td colspan="5" class="recCls1">REVIEWER<span id="revspan" style="color:#80FF00;"></span></td><?php } ?>
	 </tr>
	 <tr bgcolor="#7a6189">
	    <td style="width:20px;">&nbsp;</td>
        <td class="recCls2" style="width:30px;">EC</td>
		<td class="recCls2" style="width:150px;">NAME</td>
		<td class="recCls2" style="width:40px;">GRAD</td>
		<td class="recCls2" style="width:150px;">DESIGNATION</td>	
		<td class="recCls2" style="width:50px;">PREV GROSS</td>
		<td class="recCls2" style="width:50px;">History</td>
		<?php if($_REQUEST['hod']==1){ /* HOD */ ?>
		<td class="recCls2" style="width:40px;">Edit</td>
		<td class="recCls2" style="width:40px;">SCOR</td>
		<td class="recCls2" style="width:40px;">RATI</td>
		<td class="recCls2" style="width:40px;">GRAD</td>
		<td class="recCls2" style="width:150px;">DESIGNATION</td>
		<td class="recCls2" style="width:60px;">PIS</td>
		<td class="recCls2" style="width:40px;">% PIS</td>
		<td class="recCls2" style="width:60px;">PSC</td>
		<td class="recCls2" style="width:40px;">% PSC</td>
		<td class="recCls2" style="width:60px;">TISPM</td>		 
		<td class="recCls2" style="width:40px;">% TISPM</td>
		<td class="recCls2" style="width:60px;">TPGSPM</td>
		<?php } if($_REQUEST['hr']==1){ /* HR */ ?>
		<td class="recCls2" style="width:40px;">Edit</td>
   		<td class="recCls2" style="width:40px;">SCOR</td>
		<td class="recCls2" style="width:40px;">RATI</td>
		<td class="recCls2" style="width:40px;">GRAD</td>
		<td class="recCls2" style="width:150px;">DESIGNATION</td>
		<td class="recCls2" style="width:60px;">PIS</td>
		<td class="recCls2" style="width:40px;">% PIS</td>
		<td class="recCls2" style="width:60px;">PSC</td>
		<td class="recCls2" style="width:40px;">% PSC</td>
		<td class="recCls2" style="width:60px;">TISPM</td>		 
		<td class="recCls2" style="width:40px;">% TISPM</td>
		<td class="recCls2" style="width:60px;">TPGSPM</td>
		<?php } if($_REQUEST['app']==1){ /* A */ ?>
		<td class="recCls2" style="width:40px;">Edit</td>
		<td class="recCls2" style="width:40px;">SCOR</td>
		<td class="recCls2" style="width:40px;">RATI</td>
		<td class="recCls2" style="width:40px;">GRAD</td>
		<td class="recCls2" style="width:150px;">DESIGNATION</td>
		<?php } if($_REQUEST['rev']==1){  /* R */ ?>
		<td class="recCls2" style="width:40px;">Edit</td>
		<td class="recCls2" style="width:40px;">SCOR</td>
		<td class="recCls2" style="width:40px;">RATI</td>
		<td class="recCls2" style="width:40px;">GRAD</td>
		<td class="recCls2" style="width:150px;">DESIG</td>
		<?php } ?>
	</tr>
	</thead>
	</div>
<?php 
if($_REQUEST['ee']=='Dept')
{  
  if($_REQUEST['value']==0)
  { $sql=mysql_query("select EmpPmsId,EmpCode,Fname,Sname,Lname,hrm_employee_pms.* from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_pms ON hrm_employee.EmployeeID=hrm_employee_pms.EmployeeID where hrm_employee.CompanyId=".$CompanyId." AND hrm_employee.EmpStatus='A' AND hrm_employee_general.DateJoining<='".$YYear."-06-30' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.Appraiser_EmployeeID!=0 order by EmpCode ASC", $con); }
  else{ $sql=mysql_query("select EmpPmsId,EmpCode,Fname,Sname,Lname,hrm_employee_pms.* from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_pms ON hrm_employee.EmployeeID=hrm_employee_pms.EmployeeID where hrm_employee.CompanyId=".$CompanyId." AND hrm_employee.EmpStatus='A' AND hrm_employee_general.DateJoining<='".$YYear."-06-30' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_general.DepartmentId=".$_REQUEST['value']." AND hrm_employee_pms.Appraiser_EmployeeID!=0 order by EmpCode ASC", $con); }
}
elseif($_REQUEST['ee']=='App')
{ $sql=mysql_query("select EmpPmsId,EmpCode,Fname,Sname,Lname,hrm_employee_pms.* from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_pms ON hrm_employee.EmployeeID=hrm_employee_pms.EmployeeID where hrm_employee.CompanyId=".$CompanyId." AND hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.Appraiser_EmployeeID=".$_REQUEST['value']." AND hrm_employee_pms.Appraiser_EmployeeID!=0 order by EmpCode ASC", $con);
}
elseif($_REQUEST['ee']=='Rev')
{ $sql=mysql_query("select EmpPmsId,EmpCode,Fname,Sname,Lname,hrm_employee_pms.* from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_pms ON hrm_employee.EmployeeID=hrm_employee_pms.EmployeeID where hrm_employee.CompanyId=".$CompanyId." AND hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.Reviewer_EmployeeID=".$_REQUEST['value']." AND hrm_employee_pms.Appraiser_EmployeeID!=0 order by EmpCode ASC", $con);
}
elseif($_REQUEST['ee']=='Hod')
{ $sql=mysql_query("select EmpPmsId,EmpCode,Fname,Sname,Lname,hrm_employee_pms.* from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_pms ON hrm_employee.EmployeeID=hrm_employee_pms.EmployeeID where hrm_employee.CompanyId=".$CompanyId." AND hrm_employee.EmpStatus='A' AND hrm_employee_pms.AssessmentYear=".$_REQUEST['YI']." AND hrm_employee_pms.HOD_EmployeeID=".$_REQUEST['value']." AND hrm_employee_pms.Appraiser_EmployeeID!=0 order by EmpCode ASC", $con);
} $Sno=1; while($res=mysql_fetch_array($sql)){ $sqlDesig=mysql_query("select DesigName,DesigCode from hrm_designation where DesigId=".$res['HR_CurrDesigId'], $con); $sqlG=mysql_query("select GradeValue from hrm_grade where GradeId=".$res['HR_CurrGradeId'], $con); $sqlHRDept=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$res['HR_DepartmentId'], $con); $resDesig=mysql_fetch_assoc($sqlDesig); $resG=mysql_fetch_assoc($sqlG); $resHRDept=mysql_fetch_assoc($sqlHRDept); ?>
<div class="tbody">
<tbody>
<tr bgcolor="#FFFFFF" id="TR<?php echo $Sno; ?>">
<td class="recCls3" align="center"><input type="checkbox" id="Chk<?php echo $Sno;?>" onClick="FucChk(<?php echo $Sno;?>)"/></td>
<td class="recCls3"><input class="input" style="width:100%;text-align:center;border:hidden;" value="<?php echo $res['EmpCode']; ?>" /></td>
<td class="recCls3"><input class="input" style="width:100%;border:hidden;" value="<?php echo $res['Fname'].' '.$res['Sname'].' '.$res['Lname']; ?>" /></td>	
<td class="recCls3"><input class="input" style="width:100%;text-align:center;border:hidden;" value="<?php echo $resG['GradeValue']; ?>" /></td>
<td class="recCls3"><input class="input" style="width:100%;border:hidden;" value="<?php echo $resDesig['DesigCode']; ?>" /></td>	
<td class="recCls3"><input class="input" style="width:100%;text-align:right;border:hidden;" value="<?php echo floatval($res['EmpCurrGrossPM']); ?>" /></td>
<td class="recCls3" align="center"><?php if($_SESSION['User_Permission']=='Edit'){?><a href="javascript:ReadHis(<?php echo $res['EmpPmsId'].','.$CompanyId.','.$res['EmpCode'].','.$_REQUEST['YI']; ?>)">Click</a><?php } ?></td>

<?php if($_REQUEST['hod']==1){ /* H */ ?>
<?php if($res['Hod_EmpDesignation']!=$res['HR_CurrDesigId']){ $sqlDesigH=mysql_query("select DesigName,DesigCode from hrm_designation where DesigId=".$res['Hod_EmpDesignation']." AND CompanyId=".$CompanyId, $con); $resDesigH=mysql_fetch_assoc($sqlDesigH); $DesigH=$resDesigH['DesigCode']; }else{$DesigH='';}
if($res['Hod_EmpGrade']!=$res['HR_CurrGradeId']){ $sqlGH=mysql_query("select GradeValue from hrm_grade where GradeId=".$res['Hod_EmpGrade']." AND CompanyId=".$CompanyId, $con); $resGH=mysql_fetch_assoc($sqlGH); $GradeH=$resGH['GradeValue']; }else{$GradeH='';} ?>
<td align="center"><?php if($_SESSION['User_Permission']=='Edit'){?><span style="cursor:pointer"><img src="images/edit.png" onClick="Fhod(<?php echo $res['EmpPmsId'].','.$Sno; ?>)" id="hodbtn1<?php echo $Sno; ?>">
<img src="images/save.gif" onClick="Fshod(<?php echo $res['EmpPmsId'].','.$Sno.','.$res['EmployeeID']; ?>)" id="hodbtn2<?php echo $Sno; ?>" style="display:none;">
</span><?php } ?></td>  	
<td class="recCls3"><input id="hod_S<?php echo $Sno; ?>" class="input" style="width:100%;text-align:center;" value="<?php echo $res['Hod_TotalFinalScore']; ?>" readonly/></td> 
<td class="recCls3"><input id="hod_R<?php echo $Sno; ?>" class="input" style="width:100%;text-align:center;" value="<?php echo $res['Hod_TotalFinalRating']; ?>" readonly/></td> 
<td class="recCls3"><select id="hod_G<?php echo $Sno; ?>" class="input" style="width:100%;text-align:center;" disabled><option value="<?php echo $res['Hod_EmpGrade']; ?>" selected><?php echo $GradeH; ?></option>
<?php if($CompanyId==1){$SqlG=mysql_query("select * from hrm_grade where GradeStatus='A' AND CompanyId=".$CompanyId." AND CreatedDate>='2014-02-01' order by GradeId ASC", $con);}else{$SqlG=mysql_query("select * from hrm_grade where GradeStatus='A' AND CompanyId=".$CompanyId." order by GradeId ASC", $con);} while($ResG=mysql_fetch_array($SqlG)){ ?><option value="<?php echo $ResG['GradeId']; ?>"><?php echo $ResG['GradeValue']; ?></option><?php } ?><option value="0"></option></select></td>
<td class="recCls3"><select id="hod_D<?php echo $Sno; ?>" class="input" style="width:100%;" disabled><option value="<?php echo $res['Hod_EmpDesignation']; ?>" selected><?php echo $DesigH; ?></option>
<?php if($CompanyId==1){$SqlD=mysql_query("select hrm_deptgradedesig.DeptGradeDesigId,hrm_designation.* from hrm_deptgradedesig INNER JOIN hrm_designation ON hrm_deptgradedesig.DesigId=hrm_designation.DesigId WHERE DGDStatus='A' AND hrm_deptgradedesig.DepartmentId=".$res['HR_Curr_DepartmentId']." GROUP BY DesigId order by DesigCode ASC", $con);} while($ResD=mysql_fetch_array($SqlD)){ ?><option value="<?php echo $ResD['DesigId']; ?>"><?php echo $ResD['DesigCode']; ?></option><?php } ?><option value="0"></option></select></td> 
<td class="recCls3"><input id="hod_PIS<?php echo $Sno; ?>" class="input" style="width:100%;text-align:right;" value="<?php echo $res['Hod_ProIncSalary']; ?>" readonly/></td>
<td class="recCls3"><input id="hod_PPIS<?php echo $Sno; ?>" class="input" style="width:100%;text-align:center;" value="<?php echo $res['Hod_Percent_ProIncSalary']; ?>" readonly/></td>
<td class="recCls3"><input id="hod_PCS<?php echo $Sno; ?>" class="input" style="width:100%;text-align:right;" value="<?php echo $res['Hod_ProCorrSalary']; ?>" readonly/></td>
<td class="recCls3"><input id="hod_PPCS<?php echo $Sno; ?>" class="input" style="width:100%;text-align:center;" value="<?php echo $res['Hod_Percent_ProCorrSalary']; ?>" readonly/></td> 		
<td class="recCls3"><input id="hod_INMS<?php echo $Sno; ?>" class="input" style="width:100%;text-align:right;" value="<?php echo $res['Hod_IncNetMonthalySalary']; ?>" readonly/></td>
<td class="recCls3"><input id="hod_PINMS<?php echo $Sno; ?>" class="input" style="width:100%;text-align:center;" value="<?php echo $res['Hod_Percent_IncNetMonthalySalary']; ?>" readonly/></td>
<td class="recCls3"><input id="hod_GMS<?php echo $Sno; ?>" class="input" style="width:100%;text-align:right;" value="<?php echo $res['Hod_GrossMonthlySalary']; ?>" readonly/></td>
 	
<?php }if($_REQUEST['hr']==1){ /* HR */ ?>	
<?php if($res['HR_DesigId']!=$res['HR_CurrDesigId']){ $sqlDesigH=mysql_query("select DesigName,DesigCode from hrm_designation where DesigId=".$res['HR_DesigId']." AND CompanyId=".$CompanyId, $con); $resDesigH=mysql_fetch_assoc($sqlDesigH); $DesigHR=$resDesigH['DesigCode']; }else{$DesigHR='';}
if($res['HR_GradeId']!=$res['HR_CurrGradeId']){ $sqlGH=mysql_query("select GradeValue from hrm_grade where GradeId=".$res['HR_GradeId']." AND CompanyId=".$CompanyId, $con); $resGH=mysql_fetch_assoc($sqlGH); $GradeHR=$resGH['GradeValue']; }else{$GradeHR='';} ?>	
<td align="center"><?php if($_SESSION['User_Permission']=='Edit'){?><span style="cursor:pointer"><img src="images/edit.png" onClick="Fhr(<?php echo $res['EmpPmsId'].','.$Sno;?>)" id="hrbtn1<?php echo $Sno; ?>">
<img src="images/save.gif" onClick="Fshr(<?php echo $res['EmpPmsId'].','.$Sno.','.$res['EmployeeID'];?>)" id="hrbtn2<?php echo $Sno; ?>" style="display:none;">
</span><?php } ?></td>	
<td class="recCls3"><input id="hr_S<?php echo $Sno; ?>" class="input" style="width:100%;text-align:center;" value="<?php echo $res['HR_Score']; ?>" readonly/></td> 
<td class="recCls3"><input id="hr_R<?php echo $Sno; ?>" class="input" style="width:100%;text-align:center;" value="<?php echo $res['HR_Rating']; ?>" readonly/></td> 
<td class="recCls3"><select id="hr_G<?php echo $Sno; ?>" class="input" style="width:100%;text-align:center;" disabled><option value="<?php echo $res['HR_GradeId']; ?>" selected><?php echo $GradeHR; ?></option>
<?php if($CompanyId==1){$SqlG=mysql_query("select * from hrm_grade where GradeStatus='A' AND CompanyId=".$CompanyId." AND CreatedDate>='2014-02-01' order by GradeId ASC", $con);}else{$SqlG=mysql_query("select * from hrm_grade where GradeStatus='A' AND CompanyId=".$CompanyId." order by GradeId ASC", $con);} while($ResG=mysql_fetch_array($SqlG)){ ?><option value="<?php echo $ResG['GradeId']; ?>"><?php echo $ResG['GradeValue']; ?></option><?php } ?><option value="0"></option></select></td>
<td class="recCls3"><select id="hr_D<?php echo $Sno; ?>" class="input" style="width:100%;" disabled><option value="<?php echo $res['HR_DesigId']; ?>" selected><?php echo $DesigHR; ?></option>
<?php if($CompanyId==1){$SqlD=mysql_query("select hrm_deptgradedesig.DeptGradeDesigId,hrm_designation.* from hrm_deptgradedesig INNER JOIN hrm_designation ON hrm_deptgradedesig.DesigId=hrm_designation.DesigId WHERE DGDStatus='A' AND hrm_deptgradedesig.DepartmentId=".$res['HR_Curr_DepartmentId']." GROUP BY DesigId order by DesigCode ASC", $con);} while($ResD=mysql_fetch_array($SqlD)){ ?><option value="<?php echo $ResD['DesigId']; ?>"><?php echo $ResD['DesigCode']; ?></option><?php } ?><option value="0"></option></select></td> 		
<td class="recCls3"><input id="hr_PIS<?php echo $Sno; ?>" class="input" style="width:100%;text-align:right;" value="<?php echo $res['HR_ProIncSalary']; ?>" readonly/></td>
<td class="recCls3"><input id="hr_PPIS<?php echo $Sno; ?>" class="input" style="width:100%;text-align:center;" value="<?php echo $res['HR_Percent_ProIncSalary']; ?>" readonly/></td>
<td class="recCls3"><input id="hr_PCS<?php echo $Sno; ?>" class="input" style="width:100%;text-align:right;" value="<?php echo $res['HR_ProCorrSalary']; ?>" readonly/></td>
<td class="recCls3"><input id="hr_PPCS<?php echo $Sno; ?>" class="input" style="width:100%;text-align:center;" value="<?php echo $res['HR_Percent_ProCorrSalary']; ?>" readonly/></td> 		
<td class="recCls3"><input id="hr_INMS<?php echo $Sno; ?>" class="input" style="width:100%;text-align:right;" value="<?php echo $res['HR_IncNetMonthalySalary']; ?>" readonly/></td>
<td class="recCls3"><input id="hr_PINMS<?php echo $Sno; ?>" class="input" style="width:100%;text-align:center;" value="<?php echo $res['HR_Percent_IncNetMonthalySalary']; ?>" readonly/></td>
<td class="recCls3"><input id="hr_GMS<?php echo $Sno; ?>" class="input" style="width:100%;text-align:right;" value="<?php echo $res['HR_GrossMonthlySalary']; ?>" readonly/></td> 

<?php } if($_REQUEST['app']==1){ /* A */ ?>
<?php if($res['Appraiser_EmpDesignation']!=$res['HR_CurrDesigId']){ $sqlDesigA=mysql_query("select DesigName,DesigCode from hrm_designation where DesigId=".$res['Appraiser_EmpDesignation']." AND CompanyId=".$CompanyId, $con); $resDesigA=mysql_fetch_assoc($sqlDesigA); $DesigA=$resDesigA['DesigCode']; }else{$DesigA='';}
if($res['Appraiser_EmpGrade']!=$res['HR_CurrGradeId']){ $sqlGA=mysql_query("select GradeValue from hrm_grade where GradeId=".$res['Appraiser_EmpGrade']." AND CompanyId=".$CompanyId, $con); $resGA=mysql_fetch_assoc($sqlGA); $GradeA=$resGA['GradeValue']; }else{$GradeA='';} ?>
<td align="center"><?php if($_SESSION['User_Permission']=='Edit'){?><span style="cursor:pointer"><img src="images/edit.png" onClick="Fapp(<?php echo $res['EmpPmsId'].','.$Sno;?>)" id="appbtn1<?php echo $Sno; ?>">
<img src="images/save.gif" onClick="Fsapp(<?php echo $res['EmpPmsId'].','.$Sno.','.$res['EmployeeID'];?>)" id="appbtn2<?php echo $Sno; ?>" style="display:none;">
</span><?php } ?></td>
<td class="recCls3"><input id="app_S<?php echo $Sno; ?>" class="input" style="width:100%;text-align:center;" value="<?php echo $res['Appraiser_TotalFinalScore']; ?>" readonly/></td>
<td class="recCls3"><input id="app_R<?php echo $Sno; ?>" class="input" style="width:100%;text-align:center;" value="<?php echo $res['Appraiser_TotalFinalRating']; ?>" readonly/></td>	
<td class="recCls3"><select id="app_G<?php echo $Sno; ?>" class="input" style="width:100%;text-align:center;" disabled><option value="<?php echo $res['Appraiser_EmpGrade']; ?>" selected><?php echo $GradeA; ?></option>
<?php if($CompanyId==1){$SqlG=mysql_query("select * from hrm_grade where GradeStatus='A' AND CompanyId=".$CompanyId." AND CreatedDate>='2014-02-01' order by GradeId ASC", $con);}else{$SqlG=mysql_query("select * from hrm_grade where GradeStatus='A' AND CompanyId=".$CompanyId." order by GradeId ASC", $con);} while($ResG=mysql_fetch_array($SqlG)){ ?><option value="<?php echo $ResG['GradeId']; ?>"><?php echo $ResG['GradeValue']; ?></option><?php } ?><option value="0"></option></select></td>
<td class="recCls3"><select id="app_D<?php echo $Sno; ?>" class="input" style="width:100%;" disabled><option value="<?php echo $res['Appraiser_EmpDesignation']; ?>" selected><?php echo $DesigA; ?></option>
<?php if($CompanyId==1){$SqlD=mysql_query("select hrm_deptgradedesig.DeptGradeDesigId,hrm_designation.* from hrm_deptgradedesig INNER JOIN hrm_designation ON hrm_deptgradedesig.DesigId=hrm_designation.DesigId WHERE DGDStatus='A' AND hrm_deptgradedesig.DepartmentId=".$res['HR_Curr_DepartmentId']." GROUP BY DesigId order by DesigCode ASC", $con);} while($ResD=mysql_fetch_array($SqlD)){ ?><option value="<?php echo $ResD['DesigId']; ?>"><?php echo $ResD['DesigCode']; ?></option><?php } ?><option value="0"></option></select></td> 

<?php } if($_REQUEST['rev']==1){ /* R */ ?>
<?php if($res['Reviewer_EmpDesignation']!=$res['HR_CurrDesigId']){ $sqlDesigR=mysql_query("select DesigName,DesigCode from hrm_designation where DesigId=".$res['Reviewer_EmpDesignation']." AND CompanyId=".$CompanyId, $con); $resDesigR=mysql_fetch_assoc($sqlDesigR); $DesigR=$resDesigR['DesigCode']; }else{$DesigR='';}
if($res['Reviewer_EmpGrade']!=$res['HR_CurrGradeId']){ $sqlGR=mysql_query("select GradeValue from hrm_grade where GradeId=".$res['Reviewer_EmpGrade']." AND CompanyId=".$CompanyId, $con); $resGR=mysql_fetch_assoc($sqlGR); $GradeR=$resGR['GradeValue']; }else{$GradeR='';} ?>
<td align="center"><?php if($_SESSION['User_Permission']=='Edit'){?><span style="cursor:pointer"><img src="images/edit.png" onClick="Frev(<?php echo $res['EmpPmsId'].','.$Sno;?>)" id="revbtn1<?php echo $Sno; ?>">
<img src="images/save.gif" onClick="Fsrev(<?php echo $res['EmpPmsId'].','.$Sno.','.$res['EmployeeID'];?>)" id="revbtn2<?php echo $Sno; ?>" style="display:none;">
</span><?php } ?></td>	
<td class="recCls3"><input id="rev_S<?php echo $Sno; ?>" class="input" style="width:100%;text-align:center;" value="<?php echo $res['Reviewer_TotalFinalScore']; ?>" readonly/></td>
<td class="recCls3"><input id="rev_R<?php echo $Sno; ?>" class="input" style="width:100%;text-align:center;" value="<?php echo $res['Reviewer_TotalFinalRating']; ?>" readonly/></td>
<td class="recCls3"><select id="rev_G<?php echo $Sno; ?>" class="input" style="width:100%;text-align:center;" disabled><option value="<?php echo $res['Reviewer_EmpGrade']; ?>" selected><?php echo $GradeR; ?></option>
<?php if($CompanyId==1){$SqlG=mysql_query("select * from hrm_grade where GradeStatus='A' AND CompanyId=".$CompanyId." AND CreatedDate>='2014-02-01' order by GradeId ASC", $con);}else{$SqlG=mysql_query("select * from hrm_grade where GradeStatus='A' AND CompanyId=".$CompanyId." order by GradeId ASC", $con);} while($ResG=mysql_fetch_array($SqlG)){ ?><option value="<?php echo $ResG['GradeId']; ?>"><?php echo $ResG['GradeValue']; ?></option><?php } ?><option value="0"></option></select></td>
<td class="recCls3"><select id="rev_D<?php echo $Sno; ?>" class="input" style="width:100%;" disabled><option value="<?php echo $res['Reviewer_EmpDesignation']; ?>" selected><?php echo $DesigR; ?></option>
<?php if($CompanyId==1){$SqlD=mysql_query("select hrm_deptgradedesig.DeptGradeDesigId,hrm_designation.* from hrm_deptgradedesig INNER JOIN hrm_designation ON hrm_deptgradedesig.DesigId=hrm_designation.DesigId WHERE DGDStatus='A' AND hrm_deptgradedesig.DepartmentId=".$res['HR_Curr_DepartmentId']." GROUP BY DesigId order by DesigCode ASC", $con);} while($ResD=mysql_fetch_array($SqlD)){ ?><option value="<?php echo $ResD['DesigId']; ?>"><?php echo $ResD['DesigCode']; ?></option><?php } ?><option value="0"></option></select></td> 	
<?php } ?>	
</tr>
<div class="tbody">
<tbody>
<?php $Sno++; } ?>
   </table>
 </td>
</tr> 
<?php } ?>		
<?php //-------------------------------------------------------------------------------------------------------- ?>
	</tr>
</table>
<?php //******************************************************************************************?>
<?php //*************END*****END*****END******END******END*************************************?>
<?php //**************************************************************************************?>
	  </td>
	</tr>
	  </table>
 </td>
</tr>
</table>
</body>
</html>