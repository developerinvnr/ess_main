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
	document.getElementById('MyTeamInc').style.display='none'; 
	var dpt=document.getElementById('DeE').value; var hqt=document.getElementById('HQE').value; var st=document.getElementById('StE').value;
	var url = 'HodScoreStatusEmp.php';	var pars = 'HQidInc='+value1+'&EmpIdInc='+value2+'&YIdInc='+value3+'&d='+dpt+'&h='+hqt+'&s='+st;	var myAjax = new Ajax.Request(
	url, { 	method: 'post', parameters: pars, onComplete: show_HQEmpInc });
} 
function show_HQEmpInc(originalRequest)
{ document.getElementById('MyTeamIncSpan').innerHTML = originalRequest.responseText; }

function SelectStateEmpInc(value1,value2,value3){  
	document.getElementById('MyTeamInc').style.display='none'; 
	var dpt=document.getElementById('DeE').value; var hqt=document.getElementById('HQE').value; var st=document.getElementById('StE').value;
	var url = 'HodScoreStatusEmp.php';	var pars = 'StHQidInc='+value1+'&EmpIdInc='+value2+'&YIdInc='+value3+'&d='+dpt+'&h='+hqt+'&s='+st;	var myAjax = new Ajax.Request(
	url, { 	method: 'post', parameters: pars, onComplete: show_HQEmpInc });
} 
function show_HQEmpInc(originalRequest)
{ document.getElementById('MyTeamIncSpan').innerHTML = originalRequest.responseText; }


function SelectDeptEmp(value1,value2,value3){ 
    document.getElementById('MyTeamInc').style.display='none'; 
    var dpt=document.getElementById('DeE').value; var hqt=document.getElementById('HQE').value; var st=document.getElementById('StE').value;
	var url = 'HodScoreStatusEmp.php';	var pars = 'StDeptidInc='+value1+'&EmpIdInc='+value2+'&YIdInc='+value3+'&d='+dpt+'&h='+hqt+'&s='+st;	var myAjax = new Ajax.Request(
	url, { 	method: 'post', parameters: pars, onComplete: show_DeptEmpInc });
} 
function show_DeptEmpInc(originalRequest)
{ document.getElementById('MyTeamIncSpan').innerHTML = originalRequest.responseText; }



function EditSHod(SNo) 
{ var Num = parseFloat(document.getElementById("Number").value); var HScore=parseFloat(document.getElementById("HodScore_"+SNo).value);
  for(var i=1; i<=Num; i++) 
  { SFrom = parseFloat(document.getElementById("SFrom_"+i).value); STo = parseFloat(document.getElementById("STo_"+i).value); 
    Rating = parseFloat(document.getElementById("Rating_"+i).value); if(HScore>=SFrom && HScore<=STo){document.getElementById("HodRating_"+SNo).value=Rating;} 
  } 
}

/*
function EditSHod(SNo) 
{ var Num = document.getElementById("Number").value); var HScore= document.getElementById("HodScore_"+SNo).value;
  for(var i=1; i<=Num; i++)
  { if(HScore>document.getElementById("SFrom_"+i).value && HScore<=document.getElementById("STo_"+i).value)
    { document.getElementById("HodRating_"+SNo).value=document.getElementById("Rating_"+i).value;}
  } 
} */


function ClickEdit(Sno)
{ document.getElementById("HodScore_"+Sno).readOnly=false; document.getElementById("SpanEdit_"+Sno).style.display='none';  
  document.getElementById("SpanEditSave_"+Sno).style.display='block';   document.getElementById("HodScore_"+Sno).style.backgroundColor='#9FCFFF'; 
}  

function ClickResend(Sno)
{ document.getElementById("Reason_"+Sno).disabled=false;  document.getElementById("SpanEdit_"+Sno).style.display='none';  
  document.getElementById("SpanResendSave_"+Sno).style.display='block';  document.getElementById("Reason_"+Sno).style.backgroundColor='#9FCFFF';
  document.getElementById("Reason_"+Sno).value='Type Reason';
}

function ClickSaveEdit(No,PmsId,EmpId)
{ var HScore=document.getElementById("HodScore_"+No).value;  var HRating=document.getElementById("HodRating_"+No).value;
  var ComId=document.getElementById("ComId").value;  var RScore=parseFloat(document.getElementById("RevScore_"+No).value); 
  var Num =document.getElementById("Number").value; 
  for(var i=1; i<=Num; i++)
  { if(HScore>=document.getElementById("SFrom_"+i).value && HScore<=document.getElementById("STo_"+i).value)
    { document.getElementById("HodRating_"+No).value=document.getElementById("Rating_"+i).value;}
  } 
  
	 Cal_FormMin5 = document.getElementById("FormMin5").value=Math.round((RScore-10)*100)/100; 
	 Cal_FormMax5 = document.getElementById("FormMax5").value=Math.round((RScore+10)*100)/100;
	 var UpDesigId = document.getElementById("UpDesigId_"+No).value;
     //alert(UpDesigId); 
     
     //if(UpDesigId!=113 && UpDesigId!=147 && UpDesigId!=120 && UpDesigId!=115 && UpDesigId!=116 && UpDesigId!=117)
	 //{ if(HScore<Cal_FormMin5 || HScore>Cal_FormMax5) { alert("Normalized score can be minimum/ maximum 10 of Reviewer score!");  return false; } } 
  
  var agree=confirm("Are you sure you want to save normalized score?"); 
  if (agree) {
  var url = 'NormalizedScore.php';	var pars = 'HS='+HScore+'&PmsId='+PmsId+'&EmpId='+EmpId+'&ComId='+ComId+'&No='+No+'&HR='+HRating;	var myAjax = new Ajax.Request(
  url, { 	method: 'post', parameters: pars, onComplete: show_Normalized });
  return true; } else {return false;}
}
function show_Normalized(originalRequest)
{ document.getElementById('msg').innerHTML = originalRequest.responseText; var Sno=document.getElementById("NoId").value; 
  document.getElementById("HodScore_"+Sno).readOnly=true;  document.getElementById("SpanEdit_"+Sno).style.display='block';  
  document.getElementById("SpanEditSave_"+Sno).style.display='none';  document.getElementById("HodScore_"+Sno).style.backgroundColor='#CEFFCE'; 
}


function ClickSaveResend(No,PmsId,EmpId)
{ var ComId=document.getElementById("ComId").value; var Reason=document.getElementById("Reason_"+No).value;
  if(Reason=='Type Reason' || Reason==''){alert("Please type reason..."); return false;}
  var agree=confirm("Are you sure you want to resend appraisal score?"); 
  if (agree) {
  var url = 'NormalizedScore.php';	var pars = 'Reason='+Reason+'&PmsId='+PmsId+'&EmpId='+EmpId+'&ComId='+ComId+'&No='+No;	var myAjax = new Ajax.Request(
  url, { 	method: 'post', parameters: pars, onComplete: show_Reason });
  return true; } else {return false;}
}
function show_Reason(originalRequest)
{ document.getElementById('msg').innerHTML = originalRequest.responseText; var Sno=document.getElementById("NoId").value;
  document.getElementById("Reason_"+Sno).disabled=true; document.getElementById("HodScore_"+Sno).readOnly=true; 
  document.getElementById("SpanEdit_"+Sno).style.display='block';  document.getElementById("SpanResendSave_"+Sno).style.display='none';  
  document.getElementById("Reason_"+Sno).style.backgroundColor='#CEFFCE';}



function FunExpFormat(y,e,c)
{ window.open("ExportPmsScore.php?action=ExportScore&value=export&c="+c+"&YI="+y+"&ee="+e,"ExportForm","menubar=yes,scrollbars=yes,resizable=no,directories=no,width=20,height=20"); }


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
<?php $sqlRat=mysql_query("select ScoreFrom,ScoreTo,Rating from hrm_pms_rating where RatingStatus='A' AND YearId=".$_SESSION['PmsYId']." AND CompanyId=".$CompanyId, $con); $Sn=1; while($resRat=mysql_fetch_array($sqlRat)) {  ?>
<input type="hidden" id="SFrom_<?php echo $Sn; ?>" value="<?php echo $resRat['ScoreFrom']; ?>" />
<input type="hidden" id="STo_<?php echo $Sn; ?>" value="<?php echo $resRat['ScoreTo']; ?>" />
<input type="hidden" id="Rating_<?php echo $Sn; ?>" value="<?php echo $resRat['Rating']; ?>" />
<?php $Sn++; } $n=$Sn-1; ?><input type="hidden" id="Number" value="<?php echo $n; ?>" />	 

 		 <td id="TeamDetails" style="display:block;width:100%;">
		  <table border="0" style="width:100%;">
<tr>
 <td style="width:100%;">
  <table border="0" style="width:100%;">
   <tr>
    <td class="formh" style="width:120px;">(<i>Team Score</i>) :&nbsp;</td>
	<?php if($_SESSION['hStatus']=='Y'){ ?>
	<td class="tdd" style="width:80px;"><b>Department:</b></td>
    <td class="td1" style="width:100px;"><select class="tdsel" name="DeE" id="DeE" onChange="SelectDeptEmp(this.value,<?php echo $EmployeeId.','.$_SESSION['PmsYId']; ?>)"><option value="All" style="margin-left:0px; background-color:#84D9D5;" selected>All</option><?php $SqlDept=mysql_query("select HR_Curr_DepartmentId,DepartmentName,DepartmentCode from hrm_employee_pms pms inner join hrm_department d on pms.HR_Curr_DepartmentId=d.DepartmentId where AssessmentYear=".$_SESSION['PmsYId']." AND pms.CompanyId=".$CompanyId." AND HOD_EmployeeID=".$EmployeeId." group by HR_Curr_DepartmentId order by DepartmentName ASC"); while($ResDept=mysql_fetch_array($SqlDept)) { ?><option value="<?php echo $ResDept['HR_Curr_DepartmentId']; ?>"><?php echo $ResDept['DepartmentCode'];?></option><?php } ?><option value="All">All</option></select></td>
	<td class="tddr" style="width:40px;"><b>State:</b></td>
	<td class="td1" style="width:150px;"><select class="tdsel" name="StE" id="StE" onChange="SelectStateEmpInc(this.value,<?php echo $EmployeeId.','.$_SESSION['PmsYId']; ?>)"><option value="All" selected>All</option><?php $SqlSt=mysql_query("select st.* from hrm_state st inner join hrm_headquater hq on st.StateId=hq.StateId inner join hrm_employee_general g on hq.HqId=g.HqId inner join hrm_employee_pms pms on g.EmployeeID=pms.EmployeeID where pms.HOD_EmployeeID=".$EmployeeId." AND hq.CompanyId=".$CompanyId." group by st.StateId order by StateName ASC"); while($ResSt=mysql_fetch_array($SqlSt)) { ?><option value="<?php echo $ResSt['StateId']; ?>"><?php echo $ResSt['StateName'];?></option><?php } ?><option value="All">All</option></select></td>
	
	<td class="tdc" style="width:100px;"><a href="#" onClick="FunExpFormat(<?php echo $_SESSION['PmsYId'].','.$EmployeeId.','.$CompanyId; ?>)">Export_Score</a></td>
	
	<input type="hidden" id="HQE" name="HQE" value="0"/>
	<?php /*?><td class="tdr" style="width:40px;color:#FFFFFF;">HQ:</td>
    <td class="td1" style="width:120px;"><select class="tdsel" name="HQE" id="HQE" onChange="SelectHQEmpInc(this.value,<?php echo $EmployeeId.','.$_SESSION['PmsYId']; ?>)"><option value="All" style="margin-left:0px; background-color:#84D9D5;" selected>All</option><?php $SqlHQ=mysql_query("select hq.* from hrm_headquater hq inner join hrm_employee_general g on hq.HqId=g.HqId inner join hrm_employee_pms pms on g.EmployeeID=pms.EmployeeID where pms.HOD_EmployeeID=".$EmployeeId." AND hq.CompanyId=".$CompanyId." group by hq.HqId order by HqName ASC", $con); while($ResHQ=mysql_fetch_array($SqlHQ)) { ?><option value="<?php echo $ResHQ['HqId']; ?>"><?php echo $ResHQ['HqName'];?></option><?php } ?><option value="All">All</option></select></td><?php */?>
       
	<?php } ?>
	<input type="hidden" id="ComId" value="<?php echo $CompanyId; ?>" />
    <input type="hidden" id="YearId" value="<?php echo $YearId; ?>" />
	<td class="tdr">
	 <span id="msg" class="msg_b"></span>
	 <font class="msg_b"><i><?php echo $msg; ?></i></font>
	 <font class="formc"><span id="MsgSpan"></span></font>
	&nbsp;&nbsp;&nbsp;&nbsp;
	<script>function FunLog(){ window.open("viewlogic.php", "F", "menubar=no,scrollbars=yes,resizable=no,directories=no,width=1000,height=500");}</script><input type="button" style="width:90px;background-color:#99CC00;font-weight:bold;" value="Logic" onClick="FunLog()"/>
	&nbsp;&nbsp;
    <img src="images/edit.png" border="0"/>&nbsp;:&nbsp;Edit,&nbsp;&nbsp;
    <img src="images/go-back-icon.png" border="0"/>&nbsp;:&nbsp;Resend,&nbsp;&nbsp;
    <img src="images/Floppy-Small-icon.png" border="0">&nbsp;:&nbsp;Save
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
   <td width="100%" id="EmpAppInc" style="display:block;">
   <span id="MyTeamIncSpan"></span>	   
   <span id="MyTeamInc">
    <table border="1" id="table1" cellpadding="0" cellspacing="0" style="width:100%;">
    <div id="thead">
    <thead>  
    <tr bgcolor="#7a6189" style="height:25px;">
     <td rowspan="2" class="th" style="width:3%;">Sn</td>
     <td colspan="3" class="th">Employee</td>
	 <td colspan="2" class="th">Appraiser</td>
	 <td colspan="3" class="th">Reviewer / HOD</td>
	 <?php /*?><td rowspan="2" class="th" style="width:4%;">Tgt/<br>Ach</td><?php */?>
	 <td colspan="5" class="th">Management</td>
    </tr>
    <tr bgcolor="#7a6189">
     <td class="th" style="width:3%;border-right:hidden;">EC</td>
     <td class="th" style="width:15%;border-left:hidden;border-right:hidden;">Name</td>
     <td class="th" style="width:4%;border-left:hidden;">Score</td>
	 <td class="th" style="width:15%;border-right:hidden;">Name</td>
     <td class="th" style="width:4%;border-left:hidden;">Score</td>
	 <td class="th" style="width:15%;border-right:hidden;">Name</td>
     <td class="th" style="width:4%;border-left:hidden;border-right:hidden;">Score</td>
	 <td class="th" style="width:4%;border-left:hidden;">Rating</td>
	 
	 <td class="th" style="width:4%;border-right:hidden;">Score</td>
	 <td class="th" style="width:4%;border-left:hidden;border-right:hidden;">Rating</td>
	 <td class="th" style="width:15%;border-left:hidden;border-right:hidden;">Text</td>
	 <td class="th" style="width:5%;border-left:hidden;">Action</td>
    </tr>
	</thead>
	</div>
<?php $sql=mysql_query("select e.EmployeeID, EmpCode, Fname, Sname, Lname, EmpPmsId, Appraiser_EmployeeID, Reviewer_EmployeeID, Rev2_EmployeeID, Emp_TotalFinalScore, Appraiser_TotalFinalScore, Appraiser_EmpDesignation, Appraiser_EmpGrade, Reviewer_TotalFinalScore, Reviewer_TotalFinalRating, Reviewer_EmpDesignation, Reviewer_EmpGrade, HodSubmit_IncStatus, Hod_TotalFinalScore, Hod_TotalFinalRating, Hod_EmpDesignation, HR_CurrDesigId, HR_Curr_DepartmentId, Hod_EmpGrade from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_pms p ON e.EmployeeID=p.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.HOD_EmployeeID=".$EmployeeId." order by e.EmpCode ASC", $con); $sno=1; while($res=mysql_fetch_array($sql)){ 
$sql3=mysql_query("select * from hrm_employee where EmployeeID=".$res['Appraiser_EmployeeID'], $con); 
$sql4=mysql_query("select * from hrm_employee where EmployeeID=".$res['Reviewer_EmployeeID'], $con); 
$sql5=mysql_query("select * from hrm_employee where EmployeeID=".$res['Rev2_EmployeeID'], $con); 
$res3=mysql_fetch_assoc($sql3); $res4=mysql_fetch_assoc($sql4); $res5=mysql_fetch_assoc($sql5);
$sqlReas=mysql_query("select Hod_Reason from hrm_employee_pms_resend where EmpPmsId=".$res['EmpPmsId']." order by ResendId DESC",$con); $rowReas=mysql_num_rows($sqlReas); $resReas=mysql_fetch_assoc($sqlReas);
?>
    <input type="hidden" id="UpDesigId_<?php echo $sno; ?>" value="<?php echo $res['HR_CurrDesigId']; ?>" />
	<input type="hidden" id="RevScore_<?php echo $sno; ?>" value="<?php echo $res['Reviewer_TotalFinalScore'];?>" />     		
	<div id="tbody">
    <tbody>
    <tr style="height:24px;background-color:#FFFFFF;">
	 <td class="tdc"><?php echo $sno; ?></td>
	 <td class="tdc"><?php echo $res['EmpCode']; ?></td>
	 <td class="tdc"><input class="tdinpl" value="<?php echo strtoupper($res['Fname'].' '.$res['Sname'].' '.$res['Lname']); ?>" style="width:100%;" readonly/></td>
     <td class="tdc" style="background-color:#D2FFA6;"><?php echo $res['Emp_TotalFinalScore'];?></td>
	 <td class="tdc"><input class="tdinpl" value="<?php echo strtoupper($res3['Fname'].' '.$res3['Sname'].' '.$res3['Lname']); ?>" style="width:100%;" readonly/></td>
	 <td class="tdc" style="background-color:#D2FFA6;"><?php echo $res['Appraiser_TotalFinalScore'];?></td>
	 <td class="tdc"><input class="tdinpl" value="<?php echo strtoupper($res4['Fname'].' '.$res4['Sname'].' '.$res4['Lname']); ?><?php if($res['Rev2_EmployeeID']>0){echo '&nbsp;/&nbsp;'.strtoupper($res5['Fname'].' '.$res5['Sname'].' '.$res5['Lname']); } ?>" style="width:100%;" readonly /></td>
	 <td class="tdc" style="background-color:#D2FFA6;"><?php echo $res['Reviewer_TotalFinalScore'];?></td>
	 <td class="tdc" style="background-color:#D2FFA6;"><?php echo $res['Reviewer_TotalFinalRating'];?></td>				
	 
	 <?php /*?><td class="tdc"><script>function FunTgtAch(e,y){window.open("HodPmsTgtAch.php?e="+e+"&y="+y+"&grp=3","TcForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=800,height=600");}</script><?php if($res['HR_Curr_DepartmentId']==6){ echo '<span style="cursor:pointer;" onClick="FunTgtAch('.$res['EmployeeID'].','.$_SESSION['PmsYId'].')"><font color="#004A95"><u>click</u></span>'; }else{echo '';}?></td><?php */?>
	 
	 <td class="tdc"><input class="tdinp" id="HodScore_<?php echo $sno; ?>" style="background-color:#FFFFB7;height:100%;width:100%;font-weight:bold;" value="<?php if($res['Hod_TotalFinalScore']>0){echo $res['Hod_TotalFinalScore'];}else {echo $res['Reviewer_TotalFinalScore'];}?>" onKeyUp="EditSHod(<?php echo $sno; ?>)" onChange="EditSHod(<?php echo $sno; ?>)" maxlength="6" readonly/></td>
     <td class="tdc"><input class="tdinp" id="HodRating_<?php echo $sno; ?>" style="background-color:#FFFFB7;height:100%;width:100%;font-weight:bold;" value="<?php if($res['Hod_TotalFinalRating']==0){ echo $res['Reviewer_TotalFinalRating']; } if($res['Hod_TotalFinalRating']!=0){ echo $res['Hod_TotalFinalRating']; }?>" readonly/></td> 
	  <td class="tdc" valign="top"><input class="tdinpl" name="Reason_<?php echo $sno; ?>" id="Reason_<?php echo $sno; ?>" style="background-color:#FFFFB7;width:100%;height:100%;" value="<?php echo $resReas['Hod_Reason']; ?>" disabled maxlength="200"/></td>
	  
	  <td class="tdc">
      <SPAN id="SpanEdit_<?php echo $sno; ?>" style="cursor:pointer;">
      <?php if($res['HodSubmit_IncStatus']!=2){ ?><img src="images/edit.png" border="0" onClick="ClickEdit(<?php echo $sno; ?>)"/>&nbsp;&nbsp;<img src="images/go-back-icon.png" border="0" onClick="ClickResend(<?php echo $sno; ?>)"/><?php } ?></SPAN>
			
	   <SPAN id="SpanEditSave_<?php echo $sno; ?>" style="display:none;cursor:pointer;"><img src="images/Floppy-Small-icon.png" border="0" onClick="return ClickSaveEdit(<?php echo $sno.','.$res['EmpPmsId'].','.$res['EmployeeID']; ?>); EditSHod(<?php echo $sno; ?>);"></SPAN>
	   <SPAN id="SpanResendSave_<?php echo $sno; ?>" style="display:none;cursor:pointer;"><img src="images/Floppy-Small-icon.png" border="0" onClick="return ClickSaveResend(<?php echo $sno.','.$res['EmpPmsId'].','.$res['EmployeeID']; ?>)"></SPAN>
	   </td>
	  </tr>
	  </tbody>
	  </div>
<?php $sno++;} $no=$sno-1; echo '<input type="hidden" id="RowNo" value="'.$no.'" />';?> 
     </table>
	</span>		
   </td>
  </td> 
  <?php //************************************************ Close ******************************// ?>
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
        <?php /****************************************** Form Close **************************/ ?>
		<?php /****************************************** Form Close **************************/ ?>				
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

