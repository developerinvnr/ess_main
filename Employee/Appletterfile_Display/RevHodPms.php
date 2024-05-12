<?php session_start();
if($_SESSION['login'] = true){require_once('../AdminUser/config/config.php');}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('../AdminUser/logcheck.php');
if($_SESSION['logCheckEmp']!=$logemp){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('EmpMenuSession.php');}else{header('Location:../index.php');}
//include("SetKraPmsy.php");

/*
if($_REQUEST['action']=='r' && $_REQUEST['e']!="" && $_REQUEST['y']!=""){ 
$sqlR=mysql_query("update hrm_pms_kra set UseKRA='R', RevStatus='P', HodStatus='R' where YearId=".$_REQUEST['y']." AND EmployeeID=".$_REQUEST['e'], $con);
if($sqlR){$msg='Reviewer Resend Successfully!';} }
*/
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
function SelectHQEmp(value1,value2,CI,Sts,His,Frm)
{ 
   var dpt=document.getElementById('DeE').value; var hqt=document.getElementById('HQE').value; 
   var st=document.getElementById('StE').value;
   document.getElementById('MyTeam').style.display='none'; var YI=document.getElementById('PmsYearId').value;
   var url = 'HodDeptEmp.php';	var pars = 'HQid='+value1+'&EmpId='+value2+'&YI='+YI+'&CI='+CI+'&Sts='+Sts+'&His='+His+'&Frm='+Frm+'&d='+dpt+'&h='+hqt+'&s='+st; var myAjax = new Ajax.Request( url, { method: 'post', parameters: pars, onComplete: show_HQEmp });
} 
function show_HQEmp(originalRequest)
{ document.getElementById('MyTeamSpan').innerHTML = originalRequest.responseText; }


function SelectStateEmp(value1,value2,CI,Sts,His,Frm)
{ 
   var dpt=document.getElementById('DeE').value; var hqt=document.getElementById('HQE').value; 
   var st=document.getElementById('StE').value;
   document.getElementById('MyTeam').style.display='none'; var YI=document.getElementById('PmsYearId').value;
   var url = 'HodDeptEmp.php'; var pars = 'StHQid='+value1+'&EmpId='+value2+'&YI='+YI+'&CI='+CI+'&Sts='+Sts+'&His='+His+'&Frm='+Frm+'&d='+dpt+'&h='+hqt+'&s='+st; var myAjax = new Ajax.Request( url, { method: 'post', parameters: pars, onComplete: show_HQEmp });

} 
function show_HQEmp(originalRequest)
{ document.getElementById('MyTeamSpan').innerHTML = originalRequest.responseText; }


function SelectDeptEmp(value1,value2,CI,Sts,His,Frm)
{ 
   var dpt=document.getElementById('DeE').value; var hqt=document.getElementById('HQE').value; 
   var st=document.getElementById('StE').value;
   document.getElementById('MyTeam').style.display='none'; var YI=document.getElementById('PmsYearId').value;
   var url = 'HodDeptEmp.php'; var pars = 'StDeptid='+value1+'&EmpId='+value2+'&YI='+YI+'&CI='+CI+'&Sts='+Sts+'&His='+His+'&Frm='+Frm+'&d='+dpt+'&h='+hqt+'&s='+st; var myAjax = new Ajax.Request( url, { method: 'post', parameters: pars, onComplete: show_DeptEmp });

} 
function show_DeptEmp(originalRequest)
{ document.getElementById('MyTeamSpan').innerHTML = originalRequest.responseText; }

function OpenWindow(v,v1,CI)
{ window.open("HodScoreHistory.php?a="+v+"&b="+v1+'&CI='+CI,"AppraisalForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=1100,height=650"); }

function UploadEmpfile(p,e)
{ y=document.getElementById("PmsYearId").value; 
 window.open("CheckUploadAppFile.php?action=up&P="+p+"&E="+e+"&Y="+y,"UploadFile","menubar=no,scrollbars=yes,resizable='no',width=600,height=400");} 


function ResentReason(p,e)
{ var y=document.getElementById("PmsYearId").value; 
 window.open("ResentReason.php?action=Sent&P="+p+"&E="+e+"&Y="+y,"ResentReasonFile","menubar=no,scrollbars=yes,resizable='no',width=900,height=450");}


function ResentKRA(E)
{ var agree=confirm("Are you sure you want to resend KRA form to Reviewer?");
  if (agree) { window.location='RevHodPms.php?action=r&e='+E+'&y=3'; } 
  else {return false;}
}

function ReadHistory(EI)
{window.open("EmpHistory.php?EI="+EI,"HForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=920,height=600");}

function UploadEmpKrafile(p,e,file,ext)
{ window.open("CheckUploadKraXlsFilee.php?action=upkraxls&P="+p+"&E="+e+"&file="+file+"&ext="+ext,"UploadFile","menubar=no,scrollbars=yes,resizable='no',width=600,height=400"); }

<!-- 
function doBlink() {
	var blink = document.all.tags("BLINK")
	for (var i=0; i<blink.length; i++)
		blink[i].style.visibility = blink[i].style.visibility == "" ? "hidden" : "" 
}
function startBlink() {
	if (document.all)
		setInterval("doBlink()",1000)
}
window.onload = startBlink;
// -->
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

<?php /***************** PersonalDetails **************************/ ?>	
<input type="hidden" id="FormAMin5" value="" /><input type="hidden" id="FormAMax5" value="" />
<input type="hidden" id="FormBMin5" value="" /><input type="hidden" id="FormBMax5" value="" />
<input type="hidden" id="YearId" value="<?php echo $YearId; ?>" />
<input type="hidden" id="PmsYearId" value="<?php echo $_SESSION['PmsYId']; ?>" />
<input type="hidden" id="KraYearId" value="<?php echo $_SESSION['KraYId']; ?>" />
<input type="hidden" id="EmployeeId" value="<?php echo $EmployeeId; ?>" />
<input type="hidden" id="EmpId" value="" /> <input type="hidden" id="PmsId" value="" />	
	
 		 <td id="TeamDetails" style="display:block;width:100%;">
		  <table border="0" style="width:100%;">
<tr>
 <td style="width:100%;">
  <table border="0" style="width:100%;">
   <tr>
    <?php if($_SESSION['hStatus']=='Y'){ ?>   
    <td class="formh" style="width:250px;">(<i>My Team Appraisal Status</i>) :&nbsp;</td>
	<td class="tdd" style="width:80px;"><b>Department:</b></td>
    <td class="td1" style="width:100px;"><select class="tdsel" name="DeE" id="DeE" onChange="SelectDeptEmp(this.value,<?php echo $EmployeeId.','.$CompanyId; ?>,'<?php echo $_SESSION['eAppform'];?>','<?php echo $_SESSION['hEHform'];?>','<?php echo $_SESSION['hEPform'];?>')"><option value="All" style="margin-left:0px; background-color:#84D9D5;" selected>All</option><?php $SqlDept=mysql_query("select HR_Curr_DepartmentId,DepartmentName,DepartmentCode from hrm_employee_pms pms inner join hrm_department d on pms.HR_Curr_DepartmentId=d.DepartmentId where AssessmentYear=".$_SESSION['PmsYId']." AND pms.CompanyId=".$CompanyId." AND HOD_EmployeeID=".$EmployeeId." group by HR_Curr_DepartmentId order by DepartmentName ASC"); while($ResDept=mysql_fetch_array($SqlDept)) { ?><option value="<?php echo $ResDept['HR_Curr_DepartmentId']; ?>"><?php echo $ResDept['DepartmentCode'];?></option><?php } ?><option value="All">All</option></select></td>
    
	<td class="tddr" style="width:40px;"><b>State:</b></td>
    <td class="td1" style="width:150px;"><select class="tdsel" name="StE" id="StE" onChange="SelectStateEmp(this.value,<?php echo $EmployeeId.','.$CompanyId; ?>,'<?php echo $_SESSION['eAppform'];?>','<?php echo $_SESSION['hEHform'];?>','<?php echo $_SESSION['hEPform'];?>')"><option value="All" selected>All</option><?php $SqlSt=mysql_query("select st.* from hrm_state st inner join hrm_headquater hq on st.StateId=hq.StateId inner join hrm_employee_general g on hq.HqId=g.HqId inner join hrm_employee_pms pms on g.EmployeeID=pms.EmployeeID where pms.HOD_EmployeeID=".$EmployeeId." AND hq.CompanyId=".$CompanyId." group by st.StateId order by StateName ASC"); while($ResSt=mysql_fetch_array($SqlSt)) { ?><option value="<?php echo $ResSt['StateId']; ?>"><?php echo $ResSt['StateName'];?></option><?php } ?><option value="All">All</option></select></td>   
	
	<input type="hidden" id="HQE" name="HQE" value="0"/>
	<?php /*?><td class="td1" style="width:150px;"><select class="tdsel" name="HQE" id="HQE" onChange="SelectHQEmp(this.value,<?php echo $EmployeeId.','.$CompanyId; ?>,'<?php echo $_SESSION['eAppform'];?>','<?php echo $_SESSION['hEHform'];?>','<?php echo $_SESSION['hEPform'];?>')"><option value="" style="margin-left:0px; background-color:#84D9D5;" selected>Select Head Quarter</option><?php $SqlHQ=mysql_query("select hq.* from hrm_headquater hq inner join hrm_employee_general g on hq.HqId=g.HqId inner join hrm_employee_pms pms on g.EmployeeID=pms.EmployeeID where pms.HOD_EmployeeID=".$EmployeeId." AND hq.CompanyId=".$CompanyId." group by hq.HqId order by HqName ASC", $con); while($ResHQ=mysql_fetch_array($SqlHQ)) { ?><option value="<?php echo $ResHQ['HqId']; ?>"><?php echo $ResHQ['HqName'];?></option><?php } ?><option value="All">All</option></select></td><?php */?>
	<?php } ?>
	<input type="hidden" id="ComId" value="<?php echo $CompanyId; ?>" />
    <input type="hidden" id="YearId" value="<?php echo $YearId; ?>" />
    <td>&nbsp;</td>
	<td><font class="msg_b"><i><?php echo $msg; ?></i></font><font class="formc"><span id="MsgSpan"></span></font></td>	
   </tr>
  </table>
 </td>
</tr>

<?php 
 $sL=mysql_query("select * from hrm_pms_setting where CompanyId=".$CompanyId." AND Process='PMS'",$con); 
 $rL=mysql_fetch_assoc($sL); ?> 

  
<tr>
 <td style="width:100%;">
  <table border="0" style="width:100%;">
   <tr>
   <?php //************************************************ Start ******************************// ?>
   <?php //************************************************ Start ******************************// ?>
   <?php if($_SESSION['hStatus']=='Y'){ ?>	
   <td width="100%" id="EmpkraStatus" style="display:block;">
   <span id="MyTeamSpan"></span>	   
   <span id="MyTeam">
   <table border="1" id="table1" cellpadding="0" cellspacing="0" style="width:100%;">
   <div id="thead">
   <thead>
    <tr bgcolor="#7a6189" style="height:25px;">
	 <td class="th" style="width:3%;"><b>Sn</b></td>
	 <td class="th" style="width:4%;"><b>EC</b></td>
	 <td class="th" style="width:23%;"><b>Name</b></td>
	 <td class="th" style="width:10%;"><b>Department</b></td>
	 <td class="th" style="width:5%;"><b>Grade</b></td>
	 <?php if($rL['Show_GradeDesig']=='Y'){ ?>
	 <td class="th" style="width:22%;"><b>Designation</b></td>
	 <?php } ?>
	 <td class="th" style="width:8%;">HQ</td>
	 <td class="th" style="width:5%;">State</td>
	 
<?php if($_SESSION['hEHform']=='Y'){ ?><td class="th" style="width:5%;"><b>His<br>tory</b></td><?php } ?>
<?php if($_SESSION['hEPform']=='Y'){ ?><td class="th" style="width:6%;"><b>Form</b></td><?php } ?>
    <?php if($_SESSION['eAppform']=='Y'){ ?>
	 <td class="th" style="width:4%;"><b>Files</b></td>
	 <!--<td class="th" style="width:4%;"><b>KRA xls</b></td>-->
	 <td class="th" style="width:5%;"><b>Resent</b></td>
	 
	 <?php if($rL['ViewLeteer_hod']=='Y'){ ?>
	 <td class="th" style="width:5%;"><b>Appraisal<br>Letter</b></td>
	 <?php } ?>
	 
	 <td class="th" style="width:5%;"><b>Employee</b></td>
	 <td class="th" style="width:5%;"><b>Appraiser</b></td>
	 <td class="th" style="width:5%;"><b>Reviewer</b></td>
	 <td class="th" style="width:5%;"><b>HOD</b></td>
	 <td class="th" style="width:5%;"><b>Manag<sup>t</sup></b></td>
	<?php } ?>
    </tr>
   </thead>
   </div>
<?php $sql=mysql_query("select e.EmployeeID, EmpCode, Fname, Sname, Lname, DepartmentCode, DesigName, GradeValue, HqName, StateCode, EmpPmsId, Kra_filename, Kra_ext, Emp_PmsStatus, Appraiser_PmsStatus, Reviewer_PmsStatus, Rev2_EmployeeID, Rev2_PmsStatus, HodSubmit_IncStatus, Appraiser_NoOfResend, Reviewer_NoOfResend, Hod_NoOfResend from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_pms p ON e.EmployeeID=p.EmployeeID INNER JOIN hrm_department d ON g.DepartmentId=d.DepartmentId INNER JOIN hrm_designation de ON p.HR_CurrDesigId=de.DesigId INNER JOIN hrm_grade gr ON p.HR_CurrGradeId=gr.GradeId INNER JOIN hrm_headquater hq ON g.HqId=hq.HqId INNER JOIN hrm_state st ON hq.StateId=st.StateId where e.EmpStatus='A' AND g.DateJoining<='".$_SESSION['AllowDoj']."' AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.HOD_EmployeeID=".$EmployeeId, $con); 
$sno=1; while($res=mysql_fetch_array($sql)){ 
$sqlR=mysql_query("select * from hrm_employee_pms_uploadfile where EmpPmsId=".$res['EmpPmsId']." AND EmployeeID=".$res['EmployeeID']." AND YearId=".$_SESSION['PmsYId'], $con); $no=1; $resR=mysql_num_rows($sqlR);
if($res['Emp_PmsStatus']==0){$stE='Pending';}elseif($res['Emp_PmsStatus']==1){$stE='Pending';}elseif($res['Emp_PmsStatus']==2){$stE='Submitted';}
if($res['Appraiser_PmsStatus']==0){$stA='Draft';}elseif($res['Appraiser_PmsStatus']==1){$stA='Pending';}elseif($res['Appraiser_PmsStatus']==2){$stA='Approved';}elseif($res['Appraiser_PmsStatus']==3){$stA='Resent';}
if($res['Reviewer_PmsStatus']==0){$stR='Draft';}elseif($res['Reviewer_PmsStatus']==1){$stR='Pending';}elseif($res['Reviewer_PmsStatus']==2){$stR='Approved';}elseif($res['Reviewer_PmsStatus']==3){$stR='Resent';}

if($res['Rev2_PmsStatus']==0){$stH2='Draft';}elseif($res['Rev2_PmsStatus']==1){$stH2='Pending';}elseif($res['Rev2_PmsStatus']==2){$stH2='Approved';}elseif($res['Rev2_PmsStatus']==3){$stH2='Resent';}

if($res['HodSubmit_IncStatus']==0){$stH='Draft';}elseif($res['HodSubmit_IncStatus']==1){$stH='Pending';}elseif($res['HodSubmit_IncStatus']==2){$stH='Approved';}
?>   
   <div id="tbody">
     <tbody>
     <tr style="height:24px;background-color:#FFFFFF;">
	  <td class="tdc"><?php echo $sno; ?></td>
	  <td class="tdc"><?php echo $res['EmpCode']; ?></td>
	  <td class="tdl"><?php echo $res['Fname'].' '.$res['Sname'].' '.$res['Lname']; ?></td>
      <td class="tdl"><?php echo $res['DepartmentCode'];?></td>
	  <td class="tdc"><?php echo $res['GradeValue'];?></td>	
	  <?php if($rL['Show_GradeDesig']=='Y'){ ?>
	  <td class="tdl">&nbsp;<?php echo $res['DesigName'];?></td>
	  <?php } ?>
	  <td class="tdl"><?php echo $res['HqName'];?></td>				
	  <td class="tdc"><?php echo $res['StateCode'];?></td>  
	  
	  <?php if($_SESSION['hEHform']=='Y'){ ?><td class="tdc"><a href="javascript:ReadHistory(<?php echo $res['EmployeeID']; ?>)">Click</a></td><?php } ?>
      <?php if($_SESSION['hEPform']=='Y'){ ?><td class="tdc"><?php if($res['Emp_PmsStatus']==2){ ?><a href="javascript:OpenWindow(<?php echo $res['EmployeeID'].','.$res['EmpPmsId'].','.$CompanyId; ?>)">Click</a> <?php }else{ echo 'Pending'; }?></td><?php } ?>
	  
	  <?php if($_SESSION['eAppform']=='Y'){ ?>
	  
	    <td class="tdc"><?php  if($resR>0){ ?><a href="#" onClick="UploadEmpfile(<?php echo $res['EmpPmsId'].','.$res['EmployeeID']; ?>)">Yes</a><?php } if($resR==0){echo 'No'; }?></td>	
        <?php /*?><td class="tdc"><?php if($res['Kra_filename']!='' AND $res['Kra_ext']!=''){ ?><a href="#" onClick="UploadEmpKrafile(<?php echo $res['EmpPmsId'].','.$res['EmployeeID']; ?>,'<?php echo $res['Kra_filename']; ?>','<?php echo $res['Kra_ext']; ?>')">Yes</a><?php } ?></td><?php */?>
			
		<td class="tdc"><?php $sum=$res['Appraiser_NoOfResend']+$res['Reviewer_NoOfResend']+$res['Hod_NoOfResend']; ?><?php if($sum>0){ ?><a href="#" onClick="ResentReason(<?php echo $res['EmpPmsId'].','.$res['EmployeeID']; ?>)">Yes</a><?php } else { echo 'No'; }?></td>
		
<!-------------------------------------->
<!-------------------------------------->
<?php if($rL['ViewLeteer_hod']=='Y'){ ?>
<script type="text/javascript" language="javascript">
function LetterAllPdf(P,E,Y,C,R,G,D)
{window.open("pmsletter/VeiwAppAllPdf.php?action=All&test=true&rightform=false&cc=102&prp=55&rtr=%true%&ff=ok&P="+P+"&E="+E+"&Y="+Y+"&C="+C+"&R="+R+"&G="+G+"&D="+D+"&nn=1","AppLetter","scrollbars=yes,resizable=no,menubar=yes,width=820,height=750,location=no,directories=no");}
</script>
<?php $SqlP=mysql_query("select Hod_TotalFinalRating,Hod_EmpDesignation,Hod_EmpGrade,HR_CurrDesigId,HR_CurrGradeId,HR_DesigId,HR_GradeId from hrm_employee_pms where AssessmentYear=".$_SESSION['PmsYId']." AND EmployeeID=".$res['EmployeeID']." AND EmpPmsId=".$res['EmpPmsId'], $con); $ResP=mysql_fetch_assoc($SqlP);

if($ResP['HR_DesigId']>0){$qryD="DesigId=".$ResP['HR_DesigId'];}else{$qryD="DesigId=".$ResP['Hod_EmpDesignation'];}
if($ResP['HR_GradeId']>0){$qryG="GradeId=".$ResP['HR_GradeId'];}else{$qryG="GradeId=".$ResP['Hod_EmpGrade'];}

$sqlD=mysql_query("select DesigName,DesigId from hrm_designation where ".$qryD,$con); 
$sqlG=mysql_query("select GradeValue from hrm_grade where CompanyId=".$CompanyId." AND ".$qryG,$con);

//$sqlD=mysql_query("select DesigName,DesigId from hrm_designation where DesigId=".$ResP['Hod_EmpDesignation'],$con); 
//$sqlG=mysql_query("select GradeValue from hrm_grade where GradeId=".$ResP['Hod_EmpGrade']." AND CompanyId=".$CompanyId,$con);


$sqlGrade=mysql_query("select GradeValue from hrm_grade where GradeId=".$ResP['Hod_EmpGrade']." AND CompanyId=".$CompanyId,$con); $sqlDe=mysql_query("select DesigName,DesigId from hrm_designation where DesigId=".$ResP['HR_CurrDesigId'], $con);
$sqlGr=mysql_query("select GradeValue from hrm_grade where GradeId=".$ResP['HR_CurrGradeId']." AND CompanyId=".$CompanyId,$con); $resD=mysql_fetch_assoc($sqlD); $resG=mysql_fetch_assoc($sqlG); $resGrade=mysql_fetch_assoc($sqlGrade);
$resDe=mysql_fetch_assoc($sqlDe); $resGr=mysql_fetch_assoc($sqlGr);

if($ResP['Hod_TotalFinalRating']>0){$EmpRating=$ResP['Hod_TotalFinalRating']; } else{$EmpRating=$ResP['Reviewer_TotalFinalRating']; }if($resG['GradeValue']==''){$EmpGrade=$resGr['GradeValue'];} else{$EmpGrade=$resG['GradeValue'];} if($resD['DesigId']==''){$Desig=$resDe['DesigId'];}else {$Desig=$resD['DesigId']; } ?>
<td class="tdc" style="text-align:center;"><a href="#" onClick="LetterAllPdf(<?php echo $res['EmpPmsId'].','.$res['EmployeeID'].','.$_SESSION['PmsYId'].','.$CompanyId.','.$EmpRating; ?>,'<?php echo $EmpGrade; ?>',<?php echo $Desig; ?>)"><img src="images/AppLet.png" style="width:80px;height:20px;" border="0"/></a></td>
<?php } ?>
<!-------------------------------------->
<!-------------------------------------->			
		
		<td class="tdc" style="color:<?php if($stE=='Draft') {echo '#A40000'; }if($stE=='Pending') {echo '#36006C'; }if($stE=='Submitted') {echo '#005300'; }?>;"><?php echo $stE;?></td>  
        <td class="tdc" style="color:<?php if($stA=='Draft') {echo '#A40000'; }if($stA=='Pending') {echo '#36006C'; }if($stA=='Approved') {echo '#005300'; }if($stA=='Resent') {echo '#006AD5'; }?>;"><?php echo $stA;?></td>
        <td class="tdc" style="color:<?php if($stR=='Draft') {echo '#A40000'; }if($stR=='Pending') {echo '#36006C'; }if($stR=='Approved') {echo '#005300'; }if($stR=='Resent') {echo '#006AD5'; } ?>;"><?php echo $stR;?></td>
		<td class="tdc" style="color:<?php if($stH2=='Draft') {echo '#A40000'; }if($stH2=='Pending') {echo '#36006C'; }if($stH2=='Approved') {echo '#005300'; }?>;"><?php if($res['Rev2_EmployeeID']>0){ echo $stH2; }?></td>     	
        <td class="tdc" style="color:<?php if($stH=='Draft') {echo '#A40000'; }if($stH=='Pending') {echo '#36006C'; }if($stH=='Approved') {echo '#005300'; }?>;"><?php echo $stH;?></td>
		
	  <?php } ?>
	 </tr>
	 </tbody>
	 </div>
<?php $sno++;} ?>		
    </table>
	</span>
	</td>
    <td id="ScoreEmpkra" style="display:block;"><span id="ScoreEmpKraSpan"></span></td> 
	<?php } //if($_SESSION['hStatus']=='Y') ?> 
    <?php //*************************************** Close ********************************************* ?>	
    <?php //*************************************** Close ********************************************* ?>	    	   
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
<?php //******************************************** Close ************************************ ?>					
				  </table>
				 </td>
			  </tr>
			  
			   </form>
			</table>
           </td>
			  </tr>
	        </table>
<?php //******************************************************************************************* ?>
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







