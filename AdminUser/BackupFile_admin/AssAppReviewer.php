<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}

$sqlKeey=mysql_query("select * from hrm_pms_key where Person='emp' AND CompanyId=".$CompanyId, $con); 
$resKeey=mysql_fetch_assoc($sqlKeey);
$sqlSY=mysql_query("select CurrY from hrm_pms_setting where CompanyId=".$CompanyId." AND Process='KRA'", $con);
$sqlSYP=mysql_query("select CurrY from hrm_pms_setting where CompanyId=".$CompanyId." AND Process='Mid-PMS'",$con);
if($resKeey['MidPmsForm']=='Y'){$sqlSYP=mysql_query("select CurrY from hrm_pms_setting where CompanyId=".$CompanyId." AND Process='Mid-PMS'", $con);}else{$sqlSYP=mysql_query("select CurrY,NewY from hrm_pms_setting where CompanyId=".$CompanyId." AND Process='PMS'", $con);}  $resSY=mysql_fetch_array($sqlSY); $resSYP=mysql_fetch_array($sqlSYP); 
$SNo=1; 

//****************************************************************************************************************
if(isset($_POST['SaveAppRev']))
{ //echo 'aa='.$_POST['Sn'].'-'.$_POST['Snnn']; //die();
  for($i=1; $i<=$_POST['Sn']; $i++)
  { 
      
      $Sql=mysql_query("update hrm_employee_pms set Appraiser_EmployeeID=".$_POST['SelAppraiser_'.$i].", AppraiserType='E', Reviewer_EmployeeID=".$_POST['SelReviewer_'.$i].", ReviewerType='E', Rev2_EmployeeID=".$_POST['SelRev2_'.$i].", HOD_EmployeeID=".$_POST['SelIncReviewer_'.$i]." where AssessmentYear=".$_POST['ActYId']." AND CompanyId=".$CompanyId." AND EmployeeID=".$_POST['EmpID_'.$i], $con);

      
     $Sql2=mysql_query("update hrm_employee_reporting_pmskra set AppraiserId=".$_POST['SelAppraiser_'.$i].", ReviewerId=".$_POST['SelReviewer_'.$i].", Reviewer2Id=".$_POST['SelRev2_'.$i].", HodId=".$_POST['SelIncReviewer_'.$i]." where EmployeeID=".$_POST['EmpID_'.$i], $con);
      
  }
  if($Sql){$msg="Data updated successfully";}
}
?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet"/>
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style>
.th{ font-family:Times New Roman;font-size:12px;height:25px;text-align:center;color:#FFFFFF;font-weight:bold; }
.tdl{ font-family:Times New Roman;font-size:12px;text-align:left; }
.tdc{ font-family:Times New Roman;font-size:12px;text-align:center; }
.tdinput{ font-family:Times New Roman;font-size:14px;text-align:left;width:100%; border:hidden; }
.tdsel{ font-family:Times New Roman;font-size:14px;text-align:left;width:100%; }
.inner_table{height:500px;overflow-y:auto;width:auto;}
</style>
<script type="text/javascript" src="js/stuHover.js"></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<script src="js/jquery-1.9.1.js"></script>
<script type="text/javascript" src="js/jquery.freezeheader.js"></script>
<Script type="text/javascript" language="javascript">
function SelectDeptEmp(value)
{ 
 var ComId = document.getElementById("ComId").value; var YId = document.getElementById("YId").value;
 var tp = document.getElementById("tpms").value; var tk = document.getElementById("tkra").value;
 var YeId = document.getElementById("YearE").value; 
 if(tk=='' && tp==''){alert("please check any one [PMS or KRA]");}
 else{ window.location="AssAppReviewer.php?DPid="+value+"&ComId="+ComId+"&YId="+YId+"&tk="+tk+"&tp="+tp+"&tact=rshow&YeId="+YeId; }
} 


function EditAppRev()
{ document.getElementById('ChangeE').style.display='none'; document.getElementById('EditE').style.display='block';
  var no=document.getElementById("Sn").value; 
  for(var i=1; i<=no; i++)
  { document.getElementById('SelAppraiser_'+i).disabled=false; document.getElementById('SelReviewer_'+i).disabled=false;
    document.getElementById('SelRev2_'+i).disabled=false; document.getElementById('SelIncReviewer_'+i).disabled=false;
    document.getElementById('OnTSBtn_'+i).disabled=false;
  }
  	
}
function BackForm(){ document.getElementById('AssAppRevDeptEmpName').style.display='none'; }

function ExDeptAppReviewer(v,YId)
{ var ComId=document.getElementById("ComId").value; var tp = document.getElementById("tpms").value;
  var tk = document.getElementById("tkra").value; 
  window.open("AssAppRevviewerCSV.php?action=ExportDeptAR&value="+v+"&C="+ComId+"&Y="+YId+'&tk='+tk+'&tp='+tp,"PrintForm","menubar=yes,scrollbars=yes,resizable=no,directories=no,width=20,height=20");}

function FUnSvae(i,ei,yi,ci)
{ 
  var app=document.getElementById('SelAppraiser_'+i).value; var rev=document.getElementById('SelReviewer_'+i).value;
  var hod=document.getElementById('SelRev2_'+i).value; var mng=document.getElementById('SelIncReviewer_'+i).value;
  var url = 'AssAppReviewerajax.php'; var pars = 'For=UpReporting&ei='+ei+'&app='+app+'&rev='+rev+'&hod='+hod+'&mng='+mng+'&yi='+yi+'&ci='+ci+'&i='+i;	
  var myAjax = new Ajax.Request( url, { method: 'post', parameters: pars, onComplete: show_rst });
  
}
function show_rst(originalRequest)
{ document.getElementById('rstspan').innerHTML = originalRequest.responseText; 
  var sn=document.getElementById('SnV').value;
  if(document.getElementById('ChkV').value==1){ document.getElementById("OnTDL_"+sn).style.background='#69D200'; }
  else{ document.getElementById("OnTDL_"+sn).style.background='#FFFFFF'; }
}




$(document).ready(function () { $("#table1").freezeHeader({ 'height': '500px' }); })
</Script>     
</head>
<body class="body">
<span id="rstspan"></span>
<table class="table">
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
<?php //*****************************************************************************************/ ?>
<?php //********************START*****START*****START******START******START*******************************/ ?>
<?php //*****************************************************************************************/ ?>
<form name="AppRevForm" method="post">	  
<table border="0" style="margin-top:0px; width:100%; height:400px;">
	<tr>
	    <td align="right" width="2%" valign="top">&nbsp;</td>
		<?php if(($_SESSION['UserType']=='M' OR $_SESSION['UserType']=='S' OR $_SESSION['UserType']=='A' OR $_SESSION['UserType']=='U') AND $_SESSION['login'] = true) { ?>
		<td align="" width="90%" valign="top">
		   <table border="0">
		     <tr></tr>
			 <tr><td>
				    <table border="0">
		            <tr>
					   <td align="left" class="heading">PMS - Assign Appraiser/Reviewer</td>
	                   <td style="font-size:14px;width:60px;font-family:Times New Roman;" align="right"><b>Select :</b></td>
                       <td class="td1" style="font-size:11px; width:100px;">
                       <select class="tdsel" style="background-color:#DDFFBB;" name="YearE" id="YearE"><?php if($_REQUEST['YeId']!=''){ $SqlY=mysql_query("select * from hrm_year where YearId=".$_REQUEST['YeId'], $con); $ResY=mysql_fetch_array($SqlY); ?><option value="<?php echo $ResY['YearId']; ?>"><?php echo date("Y",strtotime($ResY['FromDate'])).'-'.date("Y",strtotime($ResY['ToDate'])); if($ResYear['YearId']>5){ echo ' - Y'; }?></option><?php }else{ ?><option value="" selected>Year</option><?php } $SqlYear=mysql_query("select YearId,FromDate,ToDate from hrm_year where YearId<=".$resSY['CurrY']." order by YearId DESC", $con); while($ResYear=mysql_fetch_array($SqlYear)) { ?><option value="<?php echo $ResYear['YearId']; ?>"><?php echo date("Y",strtotime($ResYear['FromDate'])).'-'.date("Y",strtotime($ResYear['ToDate'])); if($ResYear['YearId']>5){ echo ' - Y'; } ?></option><?php } ?><option value="8">2019-2020 - Y</option></select></td>
					   <td class="td1" style="font-size:11px; width:150px;">
                       <select class="tdsel" style="background-color:#DDFFBB;" name="DepartmentE" id="DepartmentE" onChange="SelectDeptEmp(this.value)"><?php if($_REQUEST['DPid']!=''){ $SqlDept=mysql_query("select * from hrm_department where DepartmentId=".$_REQUEST['DPid'], $con); $ResDept=mysql_fetch_array($SqlDept); ?><option value="<?php echo $ResDept['DepartmentId']; ?>"><?php echo $ResDept['DepartmentCode'];?></option><?php }else{ ?><option value="" selected>Department</option><?php } $SqlDepartment=mysql_query("select * from hrm_department where CompanyId=".$CompanyId." order by DepartmentName ASC", $con); while($ResDepartment=mysql_fetch_array($SqlDepartment)) { ?><option value="<?php echo $ResDepartment['DepartmentId']; ?>"><?php echo $ResDepartment['DepartmentCode'];?></option><?php } ?></select></td>
					  <td>
					  <input type="hidden" name="ComId" id="ComId" value="<?php echo $CompanyId; ?>" /> 
                      <input type="hidden" name="YId" id="YId" value="<?php echo $resSY['CurrY']; ?>" />
					  <input type="hidden" name="PYId" id="PYId" value="<?php echo $resSYP['CurrY']; ?>" />
					  <input type="hidden" name="ActYId" id="ActYId" value="<?php echo $_REQUEST['YeId']; ?>" /
					  </td>
<script>
function Funpk(v)
{ 
 if(v==1 && document.getElementById("pms").checked==true)
 { document.getElementById("kra").checked=false; document.getElementById("tpms").value=1;
   document.getElementById("tkra").value=0; }
 else if(v==1 && document.getElementById("pms").checked==false)
 { document.getElementById("kra").checked=true; document.getElementById("tpms").value=0;
   document.getElementById("tkra").value=1; }  
 else if(v==2 && document.getElementById("kra").checked==true)
 { document.getElementById("pms").checked=false; document.getElementById("tkra").value=1;
   document.getElementById("tpms").value=0; } 
 else if(v==2 && document.getElementById("kra").checked==false)
 { document.getElementById("pms").checked=true; document.getElementById("tkra").value=0;
   document.getElementById("tpms").value=1; }   
}
</script>					  
					  <td class="All_150">
			<input type="checkbox" id="pms" onClick="Funpk(1)" <?php if($_REQUEST['tp']==1){echo 'checked';}?> />For PMS
					   <input type="hidden" id="tpms" value="<?php echo $_REQUEST['tp']; ?>" />
					   &nbsp;&nbsp;
			<input type="checkbox" id="kra" onClick="Funpk(2)" <?php if($_REQUEST['tk']==1){echo 'checked';}?>/>For KRA
					   <input type="hidden" id="tkra" value="<?php echo $_REQUEST['tk']; ?>" />
					  </td>
	<td><font class="font4"><b>&nbsp;&nbsp;&nbsp;&nbsp;<span id="msg"><?php echo $msg; ?></span></b></font></td>
					  <td style="width:50px;"></td>
	                  <td class="All_200" align="right">&nbsp;</td>
		           </tr>
                   </table>
				</td>
			 </tr>
				 <?php //--------------Display Record----------------------------------------- ?>
				 <tr>
				  <td style="width:100%;"><span id="AssAppRevDeptEmpName"></span>
<!--id="table1"-->				 
<table border="1" id="table1" style="width:100%;" cellspacing="1">
 <div class="thead">
 <thead>
 <?php if($_SESSION['User_Permission']=='Edit'){ ?>				 
 <tr>
  <td colspan="10" align="Right" class="fontButton">
   <table border="0">
    <tr>
     <td style="width:90px;" ><input type="button" name="ChangeE" id="ChangeE" style="width:90px;" <?php if($_REQUEST['YeId']==$resSYP['CurrY'] OR $_REQUEST['YeId']==$resSYP['NewY'] OR $CompanyId!=1){echo '';}else{echo 'disabled';} ?> value="Edit" onClick="EditAppRev()"><input type="submit" name="SaveAppRev" id="EditE" style="width:90px;display:none;" value="save"></td>
     <td style="width:180px;"><input type="button" name="back" id="back" style="width:90px;" value="back" onClick="BackForm()"/><input type="button" name="refreshh" value="refresh" onClick="javascript:window.location='AssAppReviewer.php'"/>&nbsp;</td>
	 <td style="width:90px;" class="th"><a href="#" onClick="ExDeptAppReviewer(<?php echo $_REQUEST['DPid'].','.$_REQUEST['YeId']; ?>)" style="color:#FFFFFF;font-size:12px;">Export Excel</a></b>
     </td>
    </tr>
   </table>
  </td>
 </tr>
 <?php } ?> 
 <tr bgcolor="#7a6189">
  
 </tr>
 <tr bgcolor="#7a6189">
  <td class="th" style="width:3%;">Sn</td>
  <td class="th" style="width:3%;">EC</td>
  <td class="th" style="width:18%;">Name</td>
  <td class="th" style="width:14%;">Designation</td>
  <td class="th" style="width:6%;">DOJ</td> 
  <td class="th" style="width:14%;">Appraiser</td>	
  <td class="th" style="width:14%;">Reviewer</td>
  <td class="th" style="width:14%;">HOD</td>
  <td class="th" style="width:14%;">Management</td>
  <td class="th" style="width:10%;">Update</td>
 </tr>	
 </thead>
</div>
 <?php if($_REQUEST['tact']=='rshow'){ $DPid = $_REQUEST['DPid']; $CompanyId = $_REQUEST['ComId']; $YId = $_REQUEST['YeId']; 
 if($_REQUEST['YId']==1){$Y=2012;}elseif($_REQUEST['YId']==2){$Y=2013;}elseif($_REQUEST['YId']==3){$Y=2014;}elseif($_REQUEST['YId']==4){$Y=2015;}elseif($_REQUEST['YId']==5){$Y=2016;}elseif($_REQUEST['YId']==6){$Y=2017;}elseif($_REQUEST['YId']==7){$Y=2018;}elseif($_REQUEST['YId']==8){$Y=2019;}elseif($_REQUEST['YId']==9){$Y=2020;}elseif($_REQUEST['YId']==10){$Y=2021;}elseif($_REQUEST['YId']==11){$Y=2022;}elseif($_REQUEST['YId']==12){$Y=2023;}elseif($_REQUEST['YId']==13){$Y=2024;} 
 
 if($CompanyId==1)
 {  
  if($_REQUEST['tp']==1 AND $_REQUEST['tk']==0){ $sqlDP = mysql_query("SELECT e.EmployeeID,EmpCode,Fname,Sname,Lname,DateJoining,EmpPmsId,Reviewer_EmployeeID,Rev2_EmployeeID,HOD_EmployeeID,Appraiser_EmployeeID,DesigCode FROM hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_pms pms ON e.EmployeeID=pms.EmployeeID inner join hrm_designation de on g.DesigId=de.DesigId WHERE e.EmpStatus='A' AND e.EmpType='E' AND e.CompanyId=".$CompanyId." AND pms.AssessmentYear=".$YId." AND (g.DateJoining<='".$Y."-06-30' OR pms.Appraiser_EmployeeID>0) AND g.DepartmentId=".$DPid." order by e.EmpCode ASC", $con); }
  elseif($_REQUEST['tp']==0 AND $_REQUEST['tk']==1){ $sqlDP = mysql_query("SELECT e.EmployeeID,EmpCode,Fname,Sname,Lname,DateJoining,EmpPmsId,Reviewer_EmployeeID,Rev2_EmployeeID,HOD_EmployeeID,Appraiser_EmployeeID,DesigCode FROM hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_pms pms ON e.EmployeeID=pms.EmployeeID inner join hrm_designation de on g.DesigId=de.DesigId WHERE e.EmpStatus='A' AND e.EmpType='E' AND e.CompanyId=".$CompanyId." AND pms.AssessmentYear=".$YId." AND g.DateJoining<='".date("Y-m-d")."' AND g.DepartmentId=".$DPid." order by e.EmpCode ASC", $con); }
 }
 else
 { 
     
     //echo "SELECT e.EmployeeID,EmpCode,Fname,Sname,Lname,DateJoining,EmpPmsId,Reviewer_EmployeeID,Rev2_EmployeeID,HOD_EmployeeID,Appraiser_EmployeeID,DesigCode FROM hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_pms pms ON e.EmployeeID=pms.EmployeeID inner join hrm_designation de on g.DesigId=de.DesigId WHERE e.EmpStatus='A' AND e.EmpType='E' AND e.CompanyId=".$CompanyId." AND pms.AssessmentYear=".$YId." AND g.DepartmentId=".$DPid." order by e.EmpCode ASC";
     
  $sqlDP = mysql_query("SELECT e.EmployeeID,EmpCode,Fname,Sname,Lname,DateJoining,EmpPmsId,Reviewer_EmployeeID,Rev2_EmployeeID,HOD_EmployeeID,Appraiser_EmployeeID,DesigCode FROM hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_pms pms ON e.EmployeeID=pms.EmployeeID inner join hrm_designation de on g.DesigId=de.DesigId WHERE e.EmpStatus='A' AND e.EmpType='E' AND e.CompanyId=".$CompanyId." AND pms.AssessmentYear=".$YId." AND g.DepartmentId=".$DPid." order by e.EmpCode ASC", $con); 
 }
 $Sno=1;  while($resDP = mysql_fetch_assoc($sqlDP)) { //AND hrm_employee_general.DateJoining<='".$Y."-03-31' 
?>
 
 <div class="tbody">
 <tbody>
 <tr bgcolor="#FFFFFF"> 
  <td class="tdc" id="OnTDL_<?php echo $Sno;?>"><?php echo $Sno; ?></td>
  <td class="tdc"><?php echo $resDP['EmpCode']; ?></td>
  <td class="tdl">&nbsp;<?php echo $resDP['Fname'].' '.$resDP['Sname'].' '.$resDP['Lname']; ?></td>	
  <td class="tdl">&nbsp;<?php echo $resDP['DesigCode']; ?></td>
  <td class="tdc"><?php echo date("d-m-Y",strtotime($resDP['DateJoining'])); ?></td> 

<?php //****************************** Appraiser ******************************** ?>
<td class="tdc">
<select class="tdinput" style="background-color:<?php if($resDP['Appraiser_EmployeeID']==0){echo '#FFFFFF;';}elseif($resDP['Appraiser_EmployeeID']!=0){echo '#FFE8DD;';}?>;" name="SelAppraiser_<?php echo $Sno;?>" id="SelAppraiser_<?php echo$Sno; ?>" disabled>
<?php if($resDP['Appraiser_EmployeeID']!=0){$sqlR = mysql_query("SELECT e.*,DesigId2,Gender,Married,DesigCode from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_personal p ON e.EmployeeID=p.EmployeeID inner join hrm_designation de on g.DesigId=de.DesigId where e.EmpStatus='A' AND e.EmployeeID=".$resDP['Appraiser_EmployeeID'], $con); $resR=mysql_fetch_assoc($sqlR); 
$Name=ucwords(strtolower($resR['Fname'].' '.$resR['Sname'].' '.$resR['Lname'])).'-'.$resR['EmpCode'].'&nbsp;/&nbsp;('.$resR['DesigCode'].')'; 
echo '<option value='.$resDP['Appraiser_EmployeeID'].' selected>'.$Name.'</option>'; }else{ echo '<option value="0">Select Appraiser</option>'; } $sqlApp=mysql_query("select a.*,e.EmployeeID,EmpCode,Fname,Sname,Lname,Gender,Married,DesigCode from hrm_pms_appraiser a INNER JOIN hrm_employee e ON a.EmployeeID=e.EmployeeID INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_personal p ON e.EmployeeID=p.EmployeeID inner join hrm_designation de on g.DesigId=de.DesigId where e.EmpStatus='A' AND a.DepartmentId=".$DPid." Order By a.AppraiserId ASC", $con); $no=1; while($resApp=mysql_fetch_array($sqlApp)){ $NameApp=ucwords(strtolower($resApp['Fname'].' '.$resApp['Sname'].' '.$resApp['Lname'])).'-'.$resApp['EmpCode'].'&nbsp;/&nbsp;('.$resApp['DesigCode'].')'; ?> 
<option style="background-color:#FFFFFF;" value="<?php echo $resApp['EmployeeID']; ?>"><?php echo $NameApp;?></option>
<?php $no++; } ?><option value="0">&nbsp;</option></select>
</td>

<?php //**************************** Reviewer ************************************ ?>		
<td class="tdc">
<select class="tdinput" style="background-color:<?php if($resDP['Reviewer_EmployeeID']==0){echo '#FFFFFF;';}elseif($resDP['Reviewer_EmployeeID']!=0){echo '#FFE8DD;';}?>;" name="SelReviewer_<?php echo $Sno;?>" id="SelReviewer_<?php echo$Sno; ?>" disabled>
<?php if($resDP['Reviewer_EmployeeID']!=0){$sqlR = mysql_query("SELECT e.*,DesigId2,Gender,Married,DesigCode from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_personal p ON e.EmployeeID=p.EmployeeID inner join hrm_designation de on g.DesigId=de.DesigId where e.EmpStatus='A' AND e.EmployeeID=".$resDP['Reviewer_EmployeeID'], $con); $resR=mysql_fetch_assoc($sqlR); 
$Name2=ucwords(strtolower($resR['Fname'].' '.$resR['Sname'].' '.$resR['Lname'])).'-'.$resR['EmpCode'].'&nbsp;/&nbsp;('.$resR['DesigCode'].')'; 
echo '<option value='.$resDP['Reviewer_EmployeeID'].' selected>'.$Name2.'</option>'; }else{ echo '<option value="0">Select Reviewer</option>'; } $sqlApp=mysql_query("select a.*,e.EmployeeID,EmpCode,Fname,Sname,Lname,Gender,Married,DesigCode from hrm_pms_reviewer a INNER JOIN hrm_employee e ON a.EmployeeID_UserId=e.EmployeeID INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_personal p ON e.EmployeeID=p.EmployeeID inner join hrm_designation de on g.DesigId=de.DesigId where e.EmpStatus='A' AND a.DepartmentId=".$DPid." Order By a.ReviewerId ASC", $con); $no=1; while($resApp=mysql_fetch_array($sqlApp)){ $NameApp=ucwords(strtolower($resApp['Fname'].' '.$resApp['Sname'].' '.$resApp['Lname'])).'-'.$resApp['EmpCode'].'&nbsp;/&nbsp;('.$resApp['DesigCode'].')'; ?> 
<option style="background-color:#FFFFFF;" value="<?php echo $resApp['EmployeeID']; ?>"><?php echo $NameApp;?></option>
<?php $no++; } ?><option value="0">&nbsp;</option></select>
</td>		

<?php //**************************** HOD ************************************ ?>		
<td class="tdc">
<select class="tdinput" style="background-color:<?php if($resDP['Rev2_EmployeeID']==0){echo '#FFFFFF;';}elseif($resDP['Rev2_EmployeeID']!=0){echo '#FFE8DD;';}?>;" name="SelRev2_<?php echo $Sno;?>" id="SelRev2_<?php echo$Sno; ?>" disabled>
<?php if($resDP['Rev2_EmployeeID']!=0){$sqlR = mysql_query("SELECT e.*,DesigId2,Gender,Married,DesigCode from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_personal p ON e.EmployeeID=p.EmployeeID inner join hrm_designation de on g.DesigId=de.DesigId where e.EmpStatus='A' AND e.EmployeeID=".$resDP['Rev2_EmployeeID'], $con); $resR=mysql_fetch_assoc($sqlR); 
$Name=ucwords(strtolower($resR['Fname'].' '.$resR['Sname'].' '.$resR['Lname'])).'-'.$resR['EmpCode'].'&nbsp;/&nbsp;('.$resR['DesigCode'].')'; 
echo '<option value='.$resDP['Rev2_EmployeeID'].' selected>'.$Name.'</option>'; }else{ echo '<option value="0">Select HOD</option>'; } $sqlApp=mysql_query("select a.*,e.EmployeeID,EmpCode,Fname,Sname,Lname,Gender,Married,DesigCode from hrm_pms_reviewer a INNER JOIN hrm_employee e ON a.EmployeeID_UserId=e.EmployeeID INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_personal p ON e.EmployeeID=p.EmployeeID inner join hrm_designation de on g.DesigId=de.DesigId where e.EmpStatus='A' AND a.DepartmentId=".$DPid." Order By a.ReviewerId ASC", $con); $no=1; while($resApp=mysql_fetch_array($sqlApp)){ $NameApp=ucwords(strtolower($resApp['Fname'].' '.$resApp['Sname'].' '.$resApp['Lname'])).'-'.$resApp['EmpCode'].'&nbsp;/&nbsp;('.$resApp['DesigCode'].')'; ?> 
<option style="background-color:#FFFFFF;" value="<?php echo $resApp['EmployeeID']; ?>"><?php echo $NameApp;?></option>
<?php $no++; } ?><option value="0">&nbsp;</option></select>
</td>

<?php //**************************** Management ************************************ ?>		
<td class="tdc">
<select class="tdinput" style="background-color:<?php if($resDP['HOD_EmployeeID']==0){echo '#FFFFFF;';}elseif($resDP['HOD_EmployeeID']!=0){echo '#FFE8DD;';}?>;" name="SelIncReviewer_<?php echo $Sno;?>" id="SelIncReviewer_<?php echo $Sno; ?>" disabled>
<?php if($resDP['HOD_EmployeeID']!=0){$sqlR = mysql_query("SELECT e.*,DesigId2,Gender,Married,DesigCode from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_personal p ON e.EmployeeID=p.EmployeeID inner join hrm_designation de on g.DesigId=de.DesigId where e.EmpStatus='A' AND e.EmployeeID=".$resDP['HOD_EmployeeID'], $con); $resR=mysql_fetch_assoc($sqlR); 
$Name=ucwords(strtolower($resR['Fname'].' '.$resR['Sname'].' '.$resR['Lname'])).'-'.$resR['EmpCode'].'&nbsp;/&nbsp;('.$resR['DesigCode'].')'; 
echo '<option value='.$resDP['HOD_EmployeeID'].' selected>'.$Name.'</option>'; }else{ echo '<option value="0">Select Management</option>'; } $sqlApp=mysql_query("select a.*,e.EmployeeID,EmpCode,Fname,Sname,Lname,Gender,Married,DesigCode from hrm_pms_reviewer a INNER JOIN hrm_employee e ON a.EmployeeID_UserId=e.EmployeeID INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_personal p ON e.EmployeeID=p.EmployeeID inner join hrm_designation de on g.DesigId=de.DesigId where e.EmpStatus='A' AND a.DepartmentId=".$DPid." Order By a.ReviewerId ASC", $con); $no=1; while($resApp=mysql_fetch_array($sqlApp)){ $NameApp=ucwords(strtolower($resApp['Fname'].' '.$resApp['Sname'].' '.$resApp['Lname'])).'-'.$resApp['EmpCode'].'&nbsp;/&nbsp;('.$resApp['DesigCode'].')'; ?> 
<option style="background-color:#FFFFFF;" value="<?php echo $resApp['EmployeeID']; ?>"><?php echo $NameApp;?></option>
<?php $no++; } ?><option value="0">&nbsp;</option></select>

<input type="hidden" name="EmpID_<?php echo $Sno; ?>" value="<?php echo $resDP['EmployeeID']; ?>"/>
<input type="hidden" name="RevType_<?php echo $Sno; ?>" id="RevType_<?php echo $Sno; ?>" value="<?php echo $resDP['ReviewerType']; ?>" /><span id="TypeSpan"></span>
</td>

<td align="center" style="cursor:pointer;">
 <input type="button" style="height:20px;" id="OnTSBtn_<?php echo $Sno;?>" value="UP" onClick="FUnSvae(<?php echo $Sno.','.$resDP['EmployeeID'].','.$YId.','.$CompanyId; ?>)" disabled/>
</td>
</tr>
</tbody>
</div>
 <?php $Sno++; } $NO=$Sno-1; ?>
 <input type="" style="border:hidden;color:#FFF;" name="Sn" id="Sn" value="<?php echo $NO; ?>" />
 
 <input type="" style="border:hidden;color:#FFF;" name="Snnn" id="Snnn" value="<?php echo $NO; ?>" />
  			 
 <tr>
  <td colspan="10" align="Right" class="fontButton">
   <input type="hidden" name="Sn" id="Sn" value="<?php echo $NO; ?>" />
   <input type="hidden" name="Snnn" id="Snnn" value="<?php echo $NO; ?>" />
  </td>
 </tr>

 <?php } ?>			 
</table>				 
				 
				 </td>
				</tr> 
				 
 
			     <tr>
			    </table>
			   </td>
		   </table>
		</td>
        <?php } ?>
		<?php //-------------------------------------------------------------------------------------------------------- ?>
		<td align="left" width="20%">&nbsp;</td>
	</tr>
</table>

 </form>  		
<?php //********************************************************************************************?>
<?php //*******************************END*****END*****END******END******END******************?>
<?php //*******************************************************************************************?>
	  </td>
	</tr>
	
	<?php /*?><tr>
	  <td valign="top">
	    <?php require_once("../footer.php"); ?>
	  </td>
	</tr><?php */?>
  </table>
 </td>
</tr>
</table>
</body>
</html>