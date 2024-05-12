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
  var D=document.getElementById('DeE').value; var S=document.getElementById('StE').value; var H=document.getElementById('HQE').value; window.location= 'HodPmsPromotion.php?FilD='+D+'&FilS='+S+'&FilH='+H+'&ee=1&aa=1&rr=1&hh=0&sh=1&hp=1&fr=1&kr=1&fq=1&prt=1&msg=1&pd=1&mt=1&mts=1&scr=1&prom=0&inc=1&incr=1&pmsr=1&rg=1&h=1&fachiv=1&fa=1&fb=1&ffeedb=1&org=1';
} 

function SelectStateEmpInc(value1,value2,value3){  
  var D=document.getElementById('DeE').value; var S=document.getElementById('StE').value; var H=document.getElementById('HQE').value; window.location= 'HodPmsPromotion.php?FilD='+D+'&FilS='+S+'&FilH='+H+'&ee=1&aa=1&rr=1&hh=0&sh=1&hp=1&fr=1&kr=1&fq=1&prt=1&msg=1&pd=1&mt=1&mts=1&scr=1&prom=0&inc=1&incr=1&pmsr=1&rg=1&h=1&fachiv=1&fa=1&fb=1&ffeedb=1&org=1';
} 

function SelectDeptEmp(value1,value2,value3){ 
  var D=document.getElementById('DeE').value; var S=document.getElementById('StE').value; var H=document.getElementById('HQE').value; window.location= 'HodPmsPromotion.php?FilD='+D+'&FilS='+S+'&FilH='+H+'&ee=1&aa=1&rr=1&hh=0&sh=1&hp=1&fr=1&kr=1&fq=1&prt=1&msg=1&pd=1&mt=1&mts=1&scr=1&prom=0&inc=1&incr=1&pmsr=1&rg=1&h=1&fachiv=1&fa=1&fb=1&ffeedb=1&org=1';
} 

function SelectGradeOrd(value1,value2,value3){ 
  var D=document.getElementById('DeE').value; var S=document.getElementById('StE').value; var H=document.getElementById('HQE').value; if(value1==1){var nn=0;}else{var nn=1;} window.location= 'HodPmsPromotion.php?FilD='+D+'&FilS='+S+'&FilH='+H+'&ee=1&aa=1&rr=1&hh=0&sh=1&hp=1&fr=1&kr=1&fq=1&prt=1&msg=1&pd=1&mt=1&mts=1&scr=1&prom=0&inc=1&incr=1&pmsr=1&rg=1&h=1&fachiv=1&fa=1&fb=1&ffeedb=1&org=1&ord='+nn;
} 

function FunFresh(){ window.location= "HodPmsPromotion.php?ee=1&aa=1&rr=1&hh=0&sh=1&hp=1&fr=1&kr=1&fq=1&prt=1&msg=1&pd=1&mt=1&mts=1&scr=1&prom=0&inc=1&incr=1&pmsr=1&rg=1&h=1&fachiv=1&fa=1&fb=1&ffeedb=1&org=1"; }


function ClickEdit(Sno)
{document.getElementById("DesigId_"+Sno).disabled=false; document.getElementById("GradeId_"+Sno).disabled=false;
 document.getElementById("Justification_"+Sno).disabled=false; document.getElementById("SpanEdit_"+Sno).style.display='none';
 document.getElementById("SpanEditSave_"+Sno).style.display='block'; document.getElementById("DesigId_"+Sno).style.backgroundColor='#9FCFFF';
 document.getElementById("GradeId_"+Sno).style.backgroundColor='#9FCFFF'; document.getElementById("Justification_"+Sno).style.backgroundColor='#9FCFFF';
}


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
 window.open("CheckJustification.php?action=JustiApp&P="+p+"&E="+e+"&Y="+y,"ResentReasonFile","menubar=no,scrollbars=yes,resizable='no',width=850,height=500");}


</script>
</head>
<body class="body">
<input type="hidden" id="PerValue" /><input type="hidden" id="ComId" value="<?php echo $CompanyId; ?>"/>
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
		
<?php /***************** Submitted **************************/ ?>		 
<input type="hidden" id="EmployeeId" value="<?php echo $EmployeeId; ?>" />
<input type="hidden" id="ComId" value="<?php echo $CompanyId; ?>" />
<input type="hidden" id="YearId" value="<?php echo $YearId; ?>" />
<input type="hidden" id="FormMin5" value="0" /><input type="hidden" id="FormMax5" value="0" />			
		
 		 <td id="TeamDetails" style="display:block;width:100%;">
		  <table border="0" style="width:100%;">
<tr>
 <td style="width:100%;">
  <table border="0" style="width:100%;">
   <tr>
    <td class="formh" style="width:180px;">(<i>Team Promotion</i>) :&nbsp;</td>
	<?php if($_SESSION['hStatus']=='Y'){ ?>
	<td class="tdd" style="width:80px;"><b>Department:</b></td>
    <td class="td1" style="width:100px;"><select class="tdsel" name="DeE" id="DeE" onChange="SelectDeptEmp(this.value,<?php echo $EmployeeId.','.$_SESSION['PmsYId']; ?>)"><?php if($_REQUEST['FilD']>0){ $sqlde=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$_REQUEST['FilD'],$con); $resde=mysql_fetch_assoc($sqlde); ?><option value="<?php echo $_REQUEST['FilD']; ?>" selected><?php echo $resde['DepartmentCode']; ?></option><?php }else{ ?><option value="All" selected>All</option><?php } $SqlDept=mysql_query("select HR_Curr_DepartmentId,DepartmentName,DepartmentCode from hrm_employee_pms pms inner join hrm_department d on pms.HR_Curr_DepartmentId=d.DepartmentId where AssessmentYear=".$_SESSION['PmsYId']." AND pms.CompanyId=".$CompanyId." AND HOD_EmployeeID=".$EmployeeId." group by HR_Curr_DepartmentId order by DepartmentName ASC"); while($ResDept=mysql_fetch_array($SqlDept)) { ?><option value="<?php echo $ResDept['HR_Curr_DepartmentId']; ?>"><?php echo $ResDept['DepartmentCode'];?></option><?php } ?><option value="All">All</option></select></td>
	<td class="tddr" style="width:40px;"><b>State:</b></td>
	<td class="td1" style="width:150px;"><select class="tdsel" name="StE" id="StE" onChange="SelectStateEmpInc(this.value,<?php echo $EmployeeId.','.$_SESSION['PmsYId']; ?>)"><?php if($_REQUEST['FilS']>0){ $sqlSe=mysql_query("select StateName from hrm_state where StateId=".$_REQUEST['FilS'],$con); $resSe=mysql_fetch_assoc($sqlSe); ?><option value="<?php echo $_REQUEST['FilS']; ?>" selected><?php echo $resSe['StateName']; ?></option><?php }else{ ?><option value="All" selected>All</option><?php } $SqlSt=mysql_query("select st.* from hrm_state st inner join hrm_headquater hq on st.StateId=hq.StateId inner join hrm_employee_general g on hq.HqId=g.HqId inner join hrm_employee_pms pms on g.EmployeeID=pms.EmployeeID where pms.HOD_EmployeeID=".$EmployeeId." AND hq.CompanyId=".$CompanyId." group by st.StateId order by StateName ASC"); while($ResSt=mysql_fetch_array($SqlSt)) { ?><option value="<?php echo $ResSt['StateId']; ?>"><?php echo $ResSt['StateName'];?></option><?php } ?><option value="All">All</option></select></td>
	
	<input type="hidden" id="HQE" name="HQE" value="0"/>
	<?php /*?><td class="tdr" style="width:40px;color:#FFFFFF;">HQ:</td>
    <td class="td1" style="width:120px;"><select class="tdsel" name="HQE" id="HQE" onChange="SelectHQEmpInc(this.value,<?php echo $EmployeeId.','.$_SESSION['PmsYId']; ?>)"><option value="All" style="margin-left:0px; background-color:#84D9D5;" selected>All</option><?php $SqlHQ=mysql_query("select hq.* from hrm_headquater hq inner join hrm_employee_general g on hq.HqId=g.HqId inner join hrm_employee_pms pms on g.EmployeeID=pms.EmployeeID where pms.HOD_EmployeeID=".$EmployeeId." AND hq.CompanyId=".$CompanyId." group by hq.HqId order by HqName ASC", $con); while($ResHQ=mysql_fetch_array($SqlHQ)) { ?><option value="<?php echo $ResHQ['HqId']; ?>"><?php echo $ResHQ['HqName'];?></option><?php } ?><option value="All">All</option></select></td><?php */?>
       
	<?php } ?>
	<input type="hidden" id="ComId" value="<?php echo $CompanyId; ?>" />
    <input type="hidden" id="YearId" value="<?php echo $YearId; ?>" />
	<td class="tdc" style="width:50px;"><a href="#" onClick="FunFresh()">Refresh</a></td>
	<td class="tdr">
	 <span id="msg" class="msg_b"></span>
	 <font class="msg_b"><i><?php echo $msg; ?></i></font>
	 <font class="formc"><span id="MsgSpan"></span></font>
    </td>	
   </tr>
  </table>
 </td>
</tr>
 	   
 <tr>
 <td style="width:100%;">
  <table border="0" style="width:100%;">
   <tr>
   <?php //************************************************ Start ******************************// ?>
   <?php //************************************************ Start ******************************// ?>
   <?php if($_REQUEST['ord']==''){$ord=1;}else{$ord=$_REQUEST['ord'];} ?>
   <td width="100%" id="EmpAppInc" style="display:block;">
   <span id="MyTeamIncSpan"></span>	   
   <span id="MyTeamInc">
    <table border="1" id="table1" cellpadding="0" cellspacing="0" style="width:100%;">
    <div id="thead">
    <thead>  
    <tr bgcolor="#7a6189" style="height:25px;">
	 <td rowspan="2" class="th" style="width:3%;">Sn</td>
	 <td colspan="4" class="th">Employee</td>
	 <td colspan="2" class="th">Appraiser: [Proposed]</td>
	 <td colspan="2" class="th">Reviewer: [Proposed]</td>
	 <td rowspan="2" class="th" style="width:3%;">Prom<sup>n</sup><br>Detail</td>
	 <td colspan="4" class="th">Management: [Proposed]</td>
	</tr>
	<tr>
	  <td class="th" style="width:3%;">EC</td>
	  <td class="th" style="width:18%;border-left:hidden;border-right:hidden;">Name</td>
	  <td class="th" style="width:13%;border-left:hidden;border-right:hidden;">Designation</td>
	  <td class="th" style="width:3%;border-left:hidden;"><a href="#" style="color:#FFFFFF;" onClick="SelectGradeOrd(<?php echo $ord.', '. $EmployeeId.','.$_SESSION['PmsYId']; ?>)">Grade</a></td>
	  <td class="th" style="width:10%;border-right:hidden;">Designation</td>
	  <td class="th" style="width:3%;border-left:hidden;">Grade</td>
	  <td class="th" style="width:10%;border-right:hidden;">Designation</td>
	  <td class="th" style="width:3%;border-left:hidden;">Grade</td>
	  
	  <td class="th" style="width:15%;border-right:hidden;">Designation</td>
	  <td class="th" style="width:4%;border-left:hidden;border-right:hidden;">Grade</td>
	  <td class="th" style="width:15%;border-right:left;border-right:hidden;">Justifiction</td>
	  <td class="th" style="width:4%;border-left:hidden;">Action</td>  
    </tr>
    </thead>
	</div>
	
<script>
function FunDesig(v,no)
{ 
  document.getElementById("NoGrade").value=no; 
  var url = 'GetGrade.php'; var pars = 'action=ChangeDesig&DesigId22='+v+'&ComId='+document.getElementById("ComId").value+'&no='+no+'&gr='+document.getElementById("EmpGrade_"+no).value+'&de='+document.getElementById("EmpDesig_"+no).value;	
  var myAjax = new Ajax.Request( url, { method: 'post', parameters: pars, onComplete: show_Grade }); } 
function show_Grade(originalRequest)
{ var no=document.getElementById("NoGrade").value; document.getElementById('SpanGarde_'+no).innerHTML = originalRequest.responseText; } 
</script>		 
<input type="hidden" id="NoGrade" />

<?php  
if($_REQUEST['ord']==''){$ordn='order by EmpCode ASC';}elseif($_REQUEST['ord']==0){$ordn='order by HR_CurrGradeId DESC';}elseif($_REQUEST['ord']==1){$ordn='order by HR_CurrGradeId ASC';}
if($_REQUEST['FilD']>0 AND $_REQUEST['FilS']=='All')
{
 $sql=mysql_query("select e.EmployeeID, EmpCode, Fname, Sname, Lname, EmpPmsId, Appraiser_EmployeeID, Reviewer_EmployeeID, Appraiser_EmpDesignation, Appraiser_EmpGrade, Reviewer_EmpDesignation, HodSubmit_IncStatus, Reviewer_EmpGrade, Hod_EmpDesignation, Hod_EmpGrade, Appraiser_Justification, Reviewer_Justification, Hod_Justification, HR_CurrDesigId, HR_CurrGradeId, DesigCode, DesigName, GradeValue, DepartmentId from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_pms p ON e.EmployeeID=p.EmployeeID INNER JOIN hrm_designation de ON p.HR_CurrDesigId=de.DesigId INNER JOIN hrm_grade gr ON p.HR_CurrGradeId=gr.GradeId where e.EmpStatus='A' AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.HOD_EmployeeID=".$EmployeeId." AND g.DepartmentId=".$_REQUEST['FilD']." ".$ordn."", $con);
}
elseif($_REQUEST['FilD']>0 AND $_REQUEST['FilS']>0)
{
 $sql=mysql_query("select e.EmployeeID, EmpCode, Fname, Sname, Lname, EmpPmsId, Appraiser_EmployeeID, Reviewer_EmployeeID, Appraiser_EmpDesignation, Appraiser_EmpGrade, Reviewer_EmpDesignation, HodSubmit_IncStatus, Reviewer_EmpGrade, Hod_EmpDesignation, Hod_EmpGrade, Appraiser_Justification, Reviewer_Justification, Hod_Justification, HR_CurrDesigId, HR_CurrGradeId, DesigCode, DesigName, GradeValue, DepartmentId from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_pms p ON e.EmployeeID=p.EmployeeID INNER JOIN hrm_headquater hq ON g.HqId=hq.HqId INNER JOIN hrm_designation de ON p.HR_CurrDesigId=de.DesigId INNER JOIN hrm_grade gr ON p.HR_CurrGradeId=gr.GradeId where e.EmpStatus='A' AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.HOD_EmployeeID=".$EmployeeId." AND g.DepartmentId=".$_REQUEST['FilD']." AND hq.StateId=".$_REQUEST['FilS']." ".$ordn."", $con);
}
elseif($_REQUEST['FilD']=='All' AND $_REQUEST['FilS']>0)
{
 $sql=mysql_query("select e.EmployeeID, EmpCode, Fname, Sname, Lname, EmpPmsId, Appraiser_EmployeeID, Reviewer_EmployeeID, Appraiser_EmpDesignation, Appraiser_EmpGrade, Reviewer_EmpDesignation, HodSubmit_IncStatus, Reviewer_EmpGrade, Hod_EmpDesignation, Hod_EmpGrade, Appraiser_Justification, Reviewer_Justification, Hod_Justification, HR_CurrDesigId, HR_CurrGradeId, DesigCode, DesigName, GradeValue, DepartmentId from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_pms p ON e.EmployeeID=p.EmployeeID INNER JOIN hrm_headquater hq ON g.HqId=hq.HqId INNER JOIN hrm_designation de ON p.HR_CurrDesigId=de.DesigId INNER JOIN hrm_grade gr ON p.HR_CurrGradeId=gr.GradeId where e.EmpStatus='A' AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.HOD_EmployeeID=".$EmployeeId." AND hq.StateId=".$_REQUEST['FilS']." ".$ordn."", $con);
}
elseif(($_REQUEST['FilD']=='All' AND $_REQUEST['FilS']=='All') OR ($_REQUEST['FilD']=='' AND $_REQUEST['FilS']==''))
{
 $sql=mysql_query("select e.EmployeeID, EmpCode, Fname, Sname, Lname, EmpPmsId, Appraiser_EmployeeID, Reviewer_EmployeeID, Appraiser_EmpDesignation, Appraiser_EmpGrade, Reviewer_EmpDesignation, HodSubmit_IncStatus, Reviewer_EmpGrade, Hod_EmpDesignation, Hod_EmpGrade, Appraiser_Justification, Reviewer_Justification, Hod_Justification, HR_CurrDesigId, HR_CurrGradeId, DesigCode, DesigName, GradeValue, DepartmentId from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_pms p ON e.EmployeeID=p.EmployeeID INNER JOIN hrm_headquater hq ON g.HqId=hq.HqId INNER JOIN hrm_designation de ON p.HR_CurrDesigId=de.DesigId INNER JOIN hrm_grade gr ON p.HR_CurrGradeId=gr.GradeId where e.EmpStatus='A' AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.HOD_EmployeeID=".$EmployeeId." ".$ordn."", $con);
}
$sno=1; while($res=mysql_fetch_array($sql)){ 
$sql5=mysql_query("select DesigCode from hrm_designation where DesigId=".$res['Appraiser_EmpDesignation'], $con); 
$sql6=mysql_query("select DesigCode from hrm_designation where DesigId=".$res['Reviewer_EmpDesignation'], $con); 
$res5=mysql_fetch_assoc($sql5); $res6=mysql_fetch_assoc($sql6);
$sql7=mysql_query("select GradeValue from hrm_grade where GradeId=".$res['Appraiser_EmpGrade'], $con);
$sql8=mysql_query("select GradeValue from hrm_grade where GradeId=".$res['Reviewer_EmpGrade'], $con);  
$res7=mysql_fetch_assoc($sql7); $res8=mysql_fetch_assoc($sql8); ?>

    <input type="hidden" id="EmpDesig_<?php echo $sno; ?>" value="<?php echo $res['HR_CurrDesigId']; ?>" /> 		
    <input type="hidden" id="EmpGrade_<?php echo $sno; ?>" value="<?php echo $res['HR_CurrGradeId']; ?>" />
    <div id="tbody">
	<tbody>
	<tr style="height:24px;background-color:#FFFFFF;">
	 <td class="tdc"><?php echo $sno; ?></td>
	 <td class="tdc"><?php echo $res['EmpCode']; ?></td>
	 <td class="tdc"><input class="tdinpl" value="<?php echo strtoupper($res['Fname'].' '.$res['Sname'].' '.$res['Lname']); ?>" style="width:100%;" readonly/></td>
     <td class="tdc"><input class="tdinpl" value="<?php echo $res['DesigCode'];?>" style="width:100%;" readonly/></td>     
	 <td class="tdc"><?php echo $res['GradeValue']; ?></td>
	 
<?php if($res['Appraiser_EmpDesignation']!=0 AND ($res['HR_CurrDesigId']!=$res['Appraiser_EmpDesignation']))
	  { $appclrDe='#D2FFA6'; $appvalDe=$res5['DesigCode']; }else{ $appclrDe='#FFFFFF'; $appvalDe=''; } 
	  if($res['Appraiser_EmpGrade']!=0 AND ($res['HR_CurrGradeId']!=$res['Appraiser_EmpGrade']))
	  { $appclrGr='#D2FFA6'; $appvalGr=$res7['GradeValue']; }else{ $appclrGr='#FFFFFF'; $appvalGr='';}
	  
	  if($res['Reviewer_EmpDesignation']!=0 AND ($res['HR_CurrDesigId']!=$res['Reviewer_EmpDesignation']))
	  { $revclrDe='#D2FFA6'; $revvalDe=$res6['DesigCode']; }else{ $revclrDe='#FFFFFF'; $revvalDe=''; } 
	  if($res['Reviewer_EmpGrade']!=0 AND ($res['HR_CurrGradeId']!=$res['Reviewer_EmpGrade']))
	  { $revclrGr='#D2FFA6'; $revvalGr=$res8['GradeValue']; }else{ $revclrGr='#FFFFFF'; $revvalGr='';} ?> 	 
	 <td class="tdc"><input class="tdinpl" style="background-color:<?php echo $appclrDe;?>" class="tdinpl" value="<?php echo $appvalDe;?>" readonly/></td>
	 <td class="tdc" style="background-color:<?php echo $appclrGr;?>;"><?php echo $appvalGr;?></td>
	 <td class="tdc"><input class="tdinpl" style="background-color:<?php echo $revclrDe;?>" class="tdinpl" value="<?php echo $revvalDe;?>" readonly/></td>
	 <td class="tdc" style="background-color:<?php echo $revclrGr;?>;"><?php echo $revvalGr;?></td>
     <td class="tdc"><a href="#" onClick="JustiApp(<?php echo $res['EmpPmsId'].','.$res['EmployeeID']; ?>)">Click</a></td>	
		  
<?php $sqlDm = mysql_query("SELECT DesigCode,DesigName from hrm_designation where DesigId=".$res['HR_CurrDesigId'],$con); 
	  $sqlGm = mysql_query("SELECT GradeValue FROM hrm_grade WHERE GradeId=".$res['HR_CurrGradeId'],$con); 
	  $resDm = mysql_fetch_assoc($sqlDm); $resGm = mysql_fetch_assoc($sqlGm);
      if($resGm['GradeValue']!='MG')
	  { 
	   $NextGradeId=$res['HR_CurrGradeId']+1; $NextGradeId2=$res['HR_CurrGradeId']+2;  
	   $sqlG2 = mysql_query("SELECT GradeValue FROM hrm_grade WHERE GradeId=".$NextGradeId, $con); 
       $sqlG3 = mysql_query("SELECT GradeValue FROM hrm_grade WHERE GradeId=".$NextGradeId2,$con); 
	   $resG2 = mysql_fetch_assoc($sqlG2); $resG3 = mysql_fetch_assoc($sqlG3); 
	   $NextGrade=$resG2['GradeValue']; $NextGrade2=$resG3['GradeValue'];
	  }
	  elseif($resG['GradeValue']=='MG'){ $NextGrade=$resG['GradeValue']; }
	 
	  $sqlD = mysql_query("SELECT DesigCode,DesigName FROM hrm_designation WHERE DesigId=".$res['Hod_EmpDesignation'],$con); 
      $resD = mysql_fetch_assoc($sqlD);
      if($res['Hod_EmpDesignation']!=0 AND ($res['HR_CurrDesigId']!=$res['Hod_EmpDesignation']))
	  { $hodclrDe='#FFFFB7'; $hodvalDe=$resD['DesigName']; }else{ $hodclrDe='#FFFFB7'; $hodvalDe=''; }	
	  
	  ?>  
     <td class="tdc" id="TD1<?php echo $sno; ?>" style="background-color:<?php echo $hodclrDe;?>;"><select class="tdsel" style="background-color:<?php echo $hodclrDe;?>;border:hidden;" id="DesigId_<?php echo $sno;?>" onChange="FunDesig(this.value,<?php echo $sno; ?>)" disabled><option value="<?php echo $res['Hod_EmpDesignation']; ?>"><?php echo $hodvalDe; ?></option><?php $sqlEx=mysql_query("select dgd.DesigId,DesigName,DesigCode from hrm_deptgradedesig dgd INNER JOIN hrm_designation de ON dgd.DesigId=de.DesigId where DepartmentId=".$res['DepartmentId']." AND (GradeId=".$NextGradeId." OR GradeId_2=".$NextGradeId." OR GradeId_3=".$NextGradeId." OR GradeId_4=".$NextGradeId." OR GradeId_5=".$NextGradeId.") order by DesigName ASC", $con); while($resEx=mysql_fetch_assoc($sqlEx)){ ?><option value="<?php echo $resEx['DesigId'];?>"><?php echo strtoupper($resEx['DesigName']); ?></option><?php } ?><option value="<?php echo $res['HR_CurrDesigId']; ?>"><?php echo strtoupper($resDm['DesigName']); ?></option></select></td>

<?php $sqlG = mysql_query("SELECT GradeValue FROM hrm_grade WHERE GradeId=".$res['Hod_EmpGrade'], $con);
      $resG = mysql_fetch_assoc($sqlG);   
      if($res['Hod_EmpGrade']!=0 AND ($res['HR_CurrGradeId']!=$res['Hod_EmpGrade']))
	  { $hodclrGr='#FFFFB7'; $hodvalGr=$resG['GradeValue']; }else{ $hodclrGr='#FFFFB7'; $hodvalGr=''; } ?>		    					
	 <td class="tdc" id="TD2<?php echo $sno; ?>" style="background-color:<?php echo $hodclrGr;?>;"><span id="SpanGarde_<?php echo $sno; ?>"><select class="tdsel" style="background-color:<?php echo $hodclrGr;?>;border:hidden;" id="GradeId_<?php echo $sno;?>" disabled><option value="<?php echo $res['Hod_EmpGrade']; ?>"><?php echo $hodvalGr; ?></option><option value="<?php echo $NextGradeId; ?>"><?php echo $NextGrade; ?></option><option value="<?php echo $res['HR_CurrGradeId']; ?>"><?php echo $resGm['GradeValue']; ?></option></select></span></td>	
	 <?php /*?><option valueS="<?php echo $NextGradeId2; ?>"><?php echo $NextGrade2; ?></option><?php */?>
	 	
	 <td class="tdc" id="TD3<?php echo $sno;?>"><input name="Justification_<?php echo $sno; ?>" id="Justification_<?php echo $sno; ?>" class="tdinpl" style="background-color:#FFFFB7;height:100%;" value="<?php echo $res['Hod_Justification'];?>" disabled maxlength="250"/></td>
	 <td class="tdc"><SPAN id="SpanEdit_<?php echo $sno; ?>"><?php if($res['HodSubmit_IncStatus']!=2){ ?><img src="images/edit.png" border="0" onClick="ClickEdit(<?php echo $sno; ?>)"/><?php } ?></SPAN>
	 <SPAN id="SpanEditSave_<?php echo $sno; ?>" style="display:none;"><img src="images/Floppy-Small-icon.png" border="0" onClick="return ClickSaveEdit(<?php echo $sno.','.$res['EmpPmsId'].','.$res['EmployeeID']; ?>)"></SPAN></td>
	</tr>
	</tbody>
	</div>
<?php $sno++;} $no=$sno-1; echo '<input type="hidden" id="RowNo" value="'.$no.'" />';?> 
   </table>
   </span>		
   </td>
    <td id="EmpAppraisalInc" style="display:none;"><span id="EmpAppraisalSpanInc">&nbsp;</span></td>
    <?php //************************************************ Close ******************************// ?>	  	   
  </tr>
 </table>
 </td>
 </tr>
</table>
<?php /****************************************** Form Close **************************/ ?>	
<?php /****************************************** Form Close **************************/ ?>		   
		</tr>
	  </table>
	</td>
   </tr> 
  </table>
 </td>
</tr>					
<?php //********************* Close ************************************ ?>					
				  </table>
				 </td>
			  </tr>
			   </form>
			</table>
           </td>
			  </tr>
	        </table>
<?php //******************************************************************* ?>
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



