<?php session_start();
if($_SESSION['login'] = true){require_once('../AdminUser/config/config.php');}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('../AdminUser/logcheck.php');
if($_SESSION['logCheckEmp']!=$logemp){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('EmpMenuSession.php');}else{header('Location:../index.php');}
//include("SetKraPmsy.php");

if(isset($_REQUEST['ValueId']) && $_REQUEST['ValueId']!=""){ 
$ValueId = $_REQUEST['ValueId']; $Eid = $_REQUEST['Eid']; $YId = $_REQUEST['Yid']; //$Rd = $_REQUEST['Rd'];

  $search =  '!"#$/=?*+\'-;:_' ;
  $search = str_split($search);
  $str_Remark = $_REQUEST['Rd'];  
  $Rd=str_replace($search, "", $str_Remark);

$sql=mysql_query("select EmpPmsId, EmployeeID, Emp_SubmitedDate, EmpFormAScore, EmpFormBScore, EmpFinallyFormA_Score, EmpFinallyFormB_Score, Emp_TotalFinalScore, Emp_TotalFinalRating, Appraiser_SubmitedDate, AppraiserFormAScore, AppraiserFormBScore, AppraiserFinallyFormA_Score, AppraiserFinallyFormB_Score, Appraiser_TotalFinalScore, Appraiser_TotalFinalRating, Reviewer_NoOfResend from hrm_employee_pms where AssessmentYear=".$YId." AND EmployeeID=".$Eid, $con); $res=mysql_fetch_assoc($sql);
$NoReSend=$res['Reviewer_NoOfResend']+1;

$sqlUp=mysql_query("update hrm_employee_pms set Appraiser_PmsStatus=1, Reviewer_PmsStatus=3, Reviewer_SubmitedDate='".date("Y-m-d")."', Reviewer_NoOfResend=".$NoReSend." where AssessmentYear=".$YId." AND EmployeeID=".$Eid, $con);

 if($sqlUp)
 { 
  $sqlIns=mysql_query("insert into hrm_employee_pms_resend(EmpPmsId, CompanyId, EmployeeID, Emp_SubmitedDate, EmpFormAScore, EmpFormBScore, EmpFinallyFormA_Score, EmpFinallyFormB_Score, Emp_TotalFinalScore, Emp_TotalFinalRating, App_SubmitedDate, AppFormAScore, AppFormBScore, AppFinallyFormA_Score, AppFinallyFormB_Score, App_TotalFinalScore, App_TotalFinalRating, Rev_Reason, Rev_SendReasonDate) values(".$res['EmpPmsId'].", ".$CompanyId.", ".$Eid.", '".$res['Emp_SubmitedDate']."', ".$res['EmpFormAScore'].", ".$res['EmpFormBScore'].", ".$res['EmpFinallyFormA_Score'].", ".$res['EmpFinallyFormB_Score'].", ".$res['Emp_TotalFinalScore'].", ".$res['Emp_TotalFinalRating'].", '".$res['Appraiser_SubmitedDate']."', ".$res['AppraiserFormAScore'].", ".$res['AppraiserFormBScore'].", ".$res['AppraiserFinallyFormA_Score'].", ".$res['AppraiserFinallyFormB_Score'].", ".$res['Appraiser_TotalFinalScore'].", ".$res['Appraiser_TotalFinalRating'].", '".addslashes($Rd)."', '".date("Y-m-d")."')", $con);	
 }

 if($sqlUp)
 {
     
   /**********************************************************/
   /**********************************************************/
   $sql=mysql_query("select KRAId from hrm_employee_pms_kraforma where EmpPmsId=".$res['EmpPmsId']." AND Period!='Annual' AND Period!='Annually'",$con); $row=mysql_num_rows($sql);
   if($row>0)
   {
    while($res=mysql_fetch_assoc($sql))
	{
	  $sqlu=mysql_query("update hrm_pms_kra_tgtdefin set Applockk=0,Revlockk=0 where KRAId=".$res['KRAId'],$con);
	  
	  $sql2=mysql_query("select KRASubId from hrm_pms_krasub where KRAId=".$res['KRAId']." AND Period!='Annual' AND Period!='Annually'",$con);
	  $row2=mysql_num_rows($sql2);
	  if($row2)
	  {
	   while($res2=mysql_fetch_assoc($sql2))
	   {
	    $sql2u=mysql_query("update hrm_pms_kra_tgtdefin set Applockk=0,Revlockk=0 where KRASubId=".$res2['KRASubId'],$con);
	   } //while($res2=mysql_fetch_assoc($sql2))
	  } //if($row2)
	  
	} //while($res=mysql_fetch_assoc($sql))
   } //if($row>0)
   /**********************************************************/
   /**********************************************************/
     
     $msg = 'Appraiser Resend Successfully! ';
     
 }
    
    
}
?>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php include_once('../Title.php'); ?></title>

<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<link type="text/css" href="css/mycss.css" rel="stylesheet"/>
<script src="../AdminUser/js/jquery-1.9.1.js"></script>
<script type="text/javascript" src="../AdminUser/js/jquery.freezeheader.js"></script>
<script>$(document).ready(function () { $("#table1").freezeHeader({ 'height':'500px' }); })</script>

<script type="text/javascript" language="javascript">
function SelectDeptEmp2(value1,value2,value3,CI)
{ document.getElementById('MyTeamStatus').style.display='none'; 
  var url = 'RevDeptStatusEmp.php';	var pars = 'Deptid2='+value1+'&EmpId2='+value2+'&YId2='+value3+'&CI='+CI;	var myAjax = new Ajax.Request( url, { 	method: 'post', parameters: pars, onComplete: show_HQEmp2 });
} 
function show_HQEmp2(originalRequest)
{ document.getElementById('MyTeamStatusSpan').innerHTML = originalRequest.responseText; }

function SelectHQEmp2(value1,value2,value3,CI)
{ document.getElementById('MyTeamStatus').style.display='none'; 
  var url = 'RevStatusEmp.php';	var pars = 'HQid2='+value1+'&EmpId2='+value2+'&YId2='+value3+'&CI='+CI;	var myAjax = new Ajax.Request( url, { method: 'post', parameters: pars, onComplete: show_HQEmp2 });
} 
function show_HQEmp2(originalRequest)
{ document.getElementById('MyTeamStatusSpan').innerHTML = originalRequest.responseText; }


function SelectStateEmp2(value1,value2,value3,CI)
{  document.getElementById('MyTeamStatus').style.display='none'; 
   var url = 'RevStateStatusEmp.php';	var pars = 'StHQid2='+value1+'&EmpId2='+value2+'&YId2='+value3+'&CI='+CI;	var myAjax = new Ajax.Request( url, { 	method: 'post', parameters: pars, onComplete: show_HQEmp2 });
} 
function show_HQEmp2(originalRequest)
{ document.getElementById('MyTeamStatusSpan').innerHTML = originalRequest.responseText; }

function edit(value1,value2,value3)
{ if(value1==1)
   {
   //document.getElementById("EmpkraStatus").style.display='none'; document.getElementById("HQSelect").style.display='none';
   //document.getElementById("HQ").style.display='none'; 
   document.getElementById("ScoreEmpkra").style.display='block';
   var x = 'HODTS.php?Id='+value1+'&Eid='+value2+'&Yid='+value3+'&ee=1&aa=1&rr=0&hh=1&sh=1&hp=1&fr=1&kr=1&fq=1&prt=1&msg=1&pd=1&mt=1&mts=1&scr=1&prom=1&inc=1&incr=1&pmsr=1&rg=1&h=1&fachiv=1&fa=1&fb=1&ffeedb=1&org=1';  window.location=x; 
   }	
   if(value1==2)
   { 
    var agree=confirm("Are you sure you want to Resend appraisal.?");
	if (agree) 
	{ //var x = 'HodPmsTeamStatus.php?ValueId='+value1+'&Eid='+value2+'&Yid='+value3;  window.location=x; 
	  document.getElementById("EmpId").value=value2; document.getElementById("ResendText").style.display='block';
	}
   }	
} 

function send()
{ var value2=document.getElementById("EmpId").value; var value3=document.getElementById("PmsYearId").value;
  var resend= document.getElementById("Resend").value; var value1=2;
  if(resend==''){alert("Please type reason..."); return false;}
  var x = 'HodPmsTeamStatus.php?ValueId='+value1+'&Eid='+value2+'&Yid='+value3+'&Rd='+resend+'&ee=1&aa=1&rr=0&hh=1&sh=1&hp=1&fr=1&kr=1&fq=1&prt=1&msg=1&pd=1&mt=1&mts=0&scr=1&prom=1&inc=1&incr=1&pmsr=1&rg=1&h=1&fachiv=1&fa=1&fb=1&ffeedb=1&org=1';  window.location=x;	
}



function OpenWindow(v,CI)
{ window.open("HodEmpHistory.php?a="+v+"&CI="+CI,"AppraisalForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=1200,height=650");}


function UploadEmpfile(p,e)
{y=document.getElementById("PmsYearId").value; 
 window.open("CheckUploadAppFile.php?action=up&P="+p+"&E="+e+"&Y="+y,"UploadFile","menubar=no,scrollbars=yes,resizable='no',width=600,height=400");} 
 
function UploadEmpKrafile(p,e,file,ext)
{var y=document.getElementById("KraYearId").value; 
 window.open("CheckUploadKraXlsFilee.php?action=upkraxls&P="+p+"&E="+e+"&Y="+y+"&file="+file+"&ext="+ext,"UploadFile","menubar=no,scrollbars=yes,resizable='no',width=600,height=400");} 

</script>
</head>
<body class="body">
<input type="hidden" id="FormAMin5" value="" /><input type="hidden" id="FormAMax5" value="" />
<input type="hidden" id="FormBMin5" value="" /><input type="hidden" id="FormBMax5" value="" />
<input type="hidden" id="YearId" value="<?php echo $YearId; ?>" />
<input type="hidden" id="PmsYearId" value="<?php echo $_SESSION['PmsYId']; ?>" />
<input type="hidden" id="KraYearId" value="<?php echo $_SESSION['KraYId']; ?>" />
<input type="hidden" id="EmployeeId" value="<?php echo $EmployeeId; ?>" />
<input type="hidden" id="EmpId" value="" /> 
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
 <td style="background-image:url(images/pmsback.png);width:100%;">	 
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
<td align="center" valign="top"><img id="Img_hod" style="display:block;" src="images/hod.png" border="0"/></td>

<?php } if($_SESSION['BtnRev2']>0) { ?>
<td align="center" valign="top"><a href="Rev2HodPms.php?ee=1&rr2=0&aa=1&rr=1&hh=0&sh=1&hp=1&fr=1&kr=1&fq=1&prt=1&msg=1&pd=1&mt=1&mts=0&scr=1&prom=1&inc=1&incr=1&pmsr=1&rg=1&h=1&fachiv=1&fa=1&fb=1&ffeedb=1&org=1"><img id="Img_hod1" src="images/RevHod1.png" border="0"/></a></td>	
		   
<?php } if($_SESSION['BtnHod']>0) { ?><td align="center" valign="top"><a href="RevHodPms.php?ee=1&rr2=1&aa=1&rr=1&hh=0&sh=1&hp=1&fr=1&kr=1&fq=1&prt=1&msg=1&pd=1&mt=1&mts=0&scr=1&prom=1&inc=1&incr=1&pmsr=1&rg=1&h=1&fachiv=1&fa=1&fb=1&ffeedb=1&org=1"><img id="Img_hod1" src="images/m1.png" border="0"/></a></td><?php } ?>

<td><font class="msg_b"><i><?php echo $msg; ?></i></font><font class="formc"><span id="MsgSpan"></span></font></td>	 
	</tr>
   </table>
  </td>
 </tr>
 
 <tr><td style="vertical-align:top;width:100%;"><?php include("SetKraPmsmr.php"); ?></td></tr>
<!--  Head Parts Close Close Close  --> 
<!--  Head Parts Close Close Close  --> 
 
  <tr>
    <td style="width:100%;">
	  <table border="0" style="width:100%;">
	    <tr>
        <?php /****************************************** Form Start **************************/ ?>

<?php /***************** AppraisalForm **************************/ ?>
<form name="AppraisalForm" method="post" onSubmit="Validation(this)">	
 		 <td id="TeamDetails" style="display:block;width:100%;">
		  <table border="0" style="width:100%;">
<tr>
 <td style="width:100%;">
  <table border="0" style="width:100%;">
   <tr>
    <td class="formh" style="width:250px;">(<i>My Team Appraisal Status</i>) :&nbsp;</td>
    <td class="fhead" style="width:100px;">Department :</td>
    <td class="td1" style="width:150px;"><select class="tdsel" name="DeE" id="DeE" onChange="SelectDeptEmp2(this.value,<?php echo $EmployeeId.','.$_SESSION['PmsYId'].', '.$CompanyId; ?>)"><option value="" style="margin-left:0px; background-color:#84D9D5;" selected>Department</option><?php $SqlDept=mysql_query("select HR_Curr_DepartmentId,DepartmentName from hrm_employee_pms pms inner join hrm_department d on pms.HR_Curr_DepartmentId=d.DepartmentId where AssessmentYear=".$_SESSION['PmsYId']." AND pms.CompanyId=".$CompanyId." AND Reviewer_EmployeeID=".$EmployeeId." group by HR_Curr_DepartmentId order by DepartmentName ASC"); while($ResDept=mysql_fetch_array($SqlDept)) { ?><option value="<?php echo $ResDept['HR_Curr_DepartmentId']; ?>"><?php echo $ResDept['DepartmentName'];?></option><?php } ?><option value="All">All</option></select></td>
	<td class="fhead" style="width:100px;">Head Quarter :</td>
 <td class="td1" style="width:150px;"><select class="tdsel" name="HQE" id="HQE" onChange="SelectHQEmp2(this.value,<?php echo $EmployeeId.', '.$_SESSION['PmsYId'].', '.$CompanyId ?>)"><option value="" style="margin-left:0px; background-color:#84D9D5;" selected>Head Quarter</option><?php $SqlHQ=mysql_query("select hq.* from hrm_headquater hq inner join hrm_employee_general g on hq.HqId=g.HqId inner join hrm_employee_pms pms on g.EmployeeID=pms.EmployeeID where pms.Reviewer_EmployeeID=".$EmployeeId." AND hq.CompanyId=".$CompanyId." group by hq.HqId order by HqName ASC", $con); while($ResHQ=mysql_fetch_array($SqlHQ)) { ?><option value="<?php echo $ResHQ['HqId']; ?>"><?php echo $ResHQ['HqName'];?></option><?php } ?><option value="All">All</option></select></td>
	<td class="fhead" style="width:50px;">State :</td>
    <td class="td1" style="width:150px;"><select class="tdsel" name="StE" id="StE" onChange="SelectStateEmp2(this.value,<?php echo $EmployeeId.', '.$_SESSION['PmsYId'].', '.$CompanyId; ?>)"><option value="" selected>Select State</option><?php $SqlSt=mysql_query("select st.* from hrm_state st inner join hrm_headquater hq on st.StateId=hq.StateId inner join hrm_employee_general g on hq.HqId=g.HqId inner join hrm_employee_pms pms on g.EmployeeID=pms.EmployeeID where pms.Reviewer_EmployeeID=".$EmployeeId." AND hq.CompanyId=".$CompanyId." group by st.StateId order by StateName ASC"); while($ResSt=mysql_fetch_array($SqlSt)) { ?><option value="<?php echo $ResSt['StateId']; ?>"><?php echo $ResSt['StateName'];?></option><?php } ?><option value="All">All</option></select></td>
    <td>&nbsp;</td>
   </tr>
  </table>
 </td>
</tr>

<tr>
 <td style="width:100%;">
 <table border="0" style="width:100%;">
  <tr>
   <td id="ResendText" style="display:none;">
    <table style="width:100%;">
     <tr>
     <form method="post" name="formResend" />
      <td class="tdl" style="color:#C10000;font-size:15px;width:13%;"><b>Reason For Resend :</b></td>
      <td style="width:77%;"><input name="Resend" id="Resend" maxlength="200" style=" background-color:#FFFFFF; height:20px;font-size:11px;width:100%; border-style:hidden;"/></td>
      <td style="width:10%;"><input type="button" id="btnResend" name="btnResend" value="Send" style="width:90px; background-color:#B9DCFF;" onClick="return send()" /></td>
     </form>  
     </tr>
    </table>
   </td>
  </tr>
  
  
  <?php $sqlSetH=mysql_query("select * from hrm_pms_setting where CompanyId=".$CompanyId." AND Process='PMS' ", $con);  
      $resSetH=mysql_fetch_array($sqlSetH); ?>
  
  
  <tr>
  <?php //************************************************ Start ******************************// ?>
  <?php //************************************************ Start ******************************// ?>
   <td width="100%" id="EmpkraStatus" style="display:block;">
   <span id="MyTeamStatusSpan"></span>	   
   <span id="MyTeamStatus">
   <table border="1" id="table11" cellpadding="0" cellspacing="0" style="width:100%;">
   <div id="thead">
   <thead>
    <tr bgcolor="#7a6189" style="height:25px;">
	 <td class="th" style="width:3%;"><b>Sn</b></td>
	 <td class="th" style="width:4%;"><b>EC</b></td>
	 <td class="th" style="width:20%;"><b>Name</b></td>
	 <td class="th" style="width:10%;"><b>Department</b></td>
	 <?php if($resSetH['Show_GradeDesig']=='Y'){ ?>
	 <td class="th" style="width:22%;"><b>Designation</b></td>
	 <?php } ?>
	 <td class="th" style="width:10%;">HQ</td>
	 <?php /*<td class="th" style="width:10%;">State</td>*/ ?>
	 <td class="th" style="width:4%;"><b>Form</b></td>
	 <td class="th" style="width:4%;"><b>Files</b></td>
	 <!--<td class="th" style="width:4%;"><b>KRA xls</b></td>-->
	 <td class="th" style="width:5%;"><b>Employee</b></td>
	 <td class="th" style="width:5%;"><b>Appraiser</b></td>
	<?php if($_SESSION['eAppform']=='Y'){ ?>
	<td class="th" style="width:5%;"><b>Reviewer</b></td>
	<?php } ?>
	<td class="th" style="width:8%;"><b>Action</b></td>
    </tr>
   </thead>
   </div>
<?php $sql=mysql_query("select e.EmployeeID, EmpCode, Fname, Sname, Lname, DepartmentCode, DesigName, GradeValue, HqName, StateName, EmpPmsId, Kra_filename, Kra_ext, Emp_PmsStatus, Appraiser_PmsStatus, Reviewer_PmsStatus from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_pms p ON e.EmployeeID=p.EmployeeID INNER JOIN hrm_department d ON g.DepartmentId=d.DepartmentId INNER JOIN hrm_designation de ON p.HR_CurrDesigId=de.DesigId INNER JOIN hrm_grade gr ON p.HR_CurrGradeId=gr.GradeId INNER JOIN hrm_headquater hq ON g.HqId=hq.HqId INNER JOIN hrm_state st ON hq.StateId=st.StateId where e.EmpStatus='A' AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.Reviewer_EmployeeID=".$EmployeeId, $con); $sno=1; while($res=mysql_fetch_array($sql)){
$sqlR=mysql_query("select * from hrm_employee_pms_uploadfile where EmpPmsId=".$res['EmpPmsId']." AND EmployeeID=".$res['EmployeeID']." AND YearId=".$_SESSION['PmsYId'], $con); $no=1; $resR=mysql_num_rows($sqlR);

if($res['Emp_PmsStatus']==0){$st='Draft';}elseif($res['Emp_PmsStatus']==1){$st='Pending';}elseif($res['Emp_PmsStatus']==2){$st='Submitted';}
if($res['Appraiser_PmsStatus']==0){$stM='Draft';}elseif($res['Appraiser_PmsStatus']==1){$stM='Pending';}elseif($res['Appraiser_PmsStatus']==2){$stM='Approved';}elseif($res['Appraiser_PmsStatus']==3){$stM='Resent';}
if($res['Reviewer_PmsStatus']==0){$stH='Draft';}elseif($res['Reviewer_PmsStatus']==1){$stH='Pending';}elseif($res['Reviewer_PmsStatus']==2){$stH='Approved';}elseif($res['Reviewer_PmsStatus']==3){$stH='Resent';}
?>   <div id="tbody">
     <tbody>
     <tr style="height:22px;background-color:#FFFFFF;">
	  <td class="tdc"><?php echo $sno; ?></td>
	  <td class="tdc"><?php echo $res['EmpCode']; ?></td>
	  <td class="tdl">&nbsp;<?php echo $res['Fname'].' '.$res['Sname'].' '.$res['Lname']; ?></td>
      <td class="tdl">&nbsp;<?php echo $res['DepartmentCode'];?></td>
      <?php if($resSetH['Show_GradeDesig']=='Y'){ ?>
	   <td class="tdl">&nbsp;<?php echo $res['DesigName'];?></td>
	  <?php } ?>
	  <td class="tdl">&nbsp;<?php echo $res['HqName'];?></td>				
	  <?php /*<td class="tdl">&nbsp;<?php echo $res['StateName'];?></td>*/ ?>
	  
	  <td class="tdc"><?php if($res['Emp_PmsStatus']==2){ ?><a href="javascript:OpenWindow(<?php echo $res['EmpPmsId'].','.$CompanyId; ?>)">Click</a><?php }else{ echo 'Wait'; }?></td>
	  <td class="tdc"><?php if($resR>0){ ?><a href="#" onClick="UploadEmpfile(<?php echo $res['EmpPmsId'].','.$res['EmployeeID']; ?>)">Yes</a><?php }if($resR==0){echo 'No'; }?></td>
	  <?php /*?><td class="tdc"><?php if($res['Kra_filename']!='' AND $res['Kra_ext']!=''){ ?><a href="#" onClick="UploadEmpKrafile(<?php echo $res['EmpPmsId'].','.$res['EmployeeID']; ?>,'<?php echo $res['Kra_filename']; ?>','<?php echo $res['Kra_ext']; ?>')">Yes</a><?php }?></td><?php */?>
	  
      <td class="tdc" style="color:<?php if($st=='Draft'){echo '#A40000'; }if($st=='Pending') {echo '#36006C'; }if($st=='Submitted') {echo '#005300'; }?>;" ><?php echo $st;?></td>
	  <td class="tdc" style="color:<?php if($stM=='Draft'){echo '#A40000'; }if($stM=='Pending'){echo '#36006C'; }if($stM=='Approved'){echo '#005300'; }if($stM=='Resent'){echo '#006AD5'; }?>;"><?php echo $stM;?></td>
<?php if($_SESSION['eAppform']=='Y'){ ?>
      <td class="tdc" style="color:<?php if($stH=='Draft') {echo '#A40000'; }if($stH=='Pending') {echo '#36006C'; }if($stH=='Approved') {echo '#005300'; }if($stH=='Resent') {echo '#006AD5'; }?>;"><?php echo $stH;?></td><?php } ?>
	  <td class="tdc"><?php if($res['Emp_PmsStatus']==2 AND $res['Appraiser_PmsStatus']==2 AND $res['Reviewer_PmsStatus']!=2) { ?><select class="tdsel" onChange="edit(this.value,<?php echo $res['EmployeeID'].','.$_SESSION['PmsYId']; ?>)"><option value="0">Select</option><option value="1">Edit</option><option value="2">Resend Form</option></select><?php } ?></td>
	  
	 </tr>
	 </tbody>
	 </div>
<?php $sno++;} ?>		
    </table>
	</span>
	</td>
    <td id="ScoreEmpkra" style="display:block;"><span id="ScoreEmpKraSpan"></span></td>  
    <?php //*************************************** Close ********************************************* ?>	
    <?php //*************************************** Close ********************************************* ?>	  	   
	</tr>
  </table>
   </td>
 </tr>
      </table>
	 </td>
    </form>		 
		</tr>
	  </table>
	</td>
   </tr>
  </table>
 </td>
</tr>					
<?php //*************************************** Close ********************************************* ?>
					
				  </table>
				 </td>
			  </tr>
			   </form>
			</table>
           </td>
			  </tr>
	        </table>
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



