<?php session_start();
if($_SESSION['login'] = true){require_once('../AdminUser/config/config.php');}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('../AdminUser/logcheck.php');
if($_SESSION['logCheckEmp']!=$logemp){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('EmpMenuSession.php');}else{header('Location:../index.php');}
/******************************************************************************/

$sqlOld=mysql_query("select * from hrm_year where YearId=".$_SESSION['KraYId_Old'], $con);
$sqlCurr=mysql_query("select * from hrm_year where YearId=".$_SESSION['KraYId'], $con); 
$sqlNew=mysql_query("select * from hrm_year where YearId=".$_SESSION['KraYId_New'], $con); 
$resOld=mysql_fetch_assoc($sqlOld); $resCurr=mysql_fetch_assoc($sqlCurr); $resNew=mysql_fetch_assoc($sqlNew);  
$FromOld=date("Y", strtotime($resOld['FromDate'])); $ToOld=date("Y", strtotime($resOld['ToDate'])); 
$FromCurr=date("Y", strtotime($resCurr['FromDate'])); $ToCurr=date("Y", strtotime($resCurr['ToDate']));
$FromNew=date("Y", strtotime($resNew['FromDate'])); $ToNew=date("Y", strtotime($resNew['ToDate']));
$SNo=1; $CuDate=date("Y-m-d");


if(isset($_POST['SaveFormB']))
{
 $totRw=$_POST['RowCountV']+$_POST['RowCount2V'];
 $sqlPms=mysql_query("select EmpPmsId from hrm_employee_pms where AssessmentYear=".$_POST['KraYId']." AND EmployeeID=".$EmployeeId, $con); $rowPms=mysql_num_rows($sqlPms);
 if($rowPms>0){ $resPms=mysql_fetch_array($sqlPms); $PmsId=$resPms['EmpPmsId']; }else{ $PmsId=0; }

   /********************** FormB FormB Open ****************************/
   $sqlb=mysql_query("select * from hrm_employee_pms_behavioralformb where EmpId=".$EmployeeId." AND YearId=".$_POST['KraYId']."", $con); $rowb=mysql_num_rows($sqlb);
   if($rowb>0)
   {
    while($resb=mysql_fetch_assoc($sqlb))
	{
     for($i=1; $i<=$totRw; $i++)
	 {
	  if($resb['FormBId']==$_POST['FormBIdM_'.$i]){ $test=1; break; }else{ $test=0; }
	 }
	 if($test==0){ $sqlDe=mysql_query("delete from hrm_employee_pms_behavioralformb where FormBId=".$resb['FormBId']." AND EmpId=".$EmployeeId." AND YearId=".$_POST['KraYId']."", $con); }
	} //while
	
	for($j=1; $j<=$totRw; $j++)
	{
	 $sqlbf=mysql_query("select * from hrm_employee_pms_behavioralformb where FormBId=".$_POST['FormBIdM_'.$j]." AND EmpId=".$EmployeeId." AND YearId=".$_POST['KraYId']."", $con); $rowbf=mysql_num_rows($sqlbf);
	 if($rowbf==0){ $sqlIn=mysql_query("insert into hrm_employee_pms_behavioralformb(EmpPmsId, FormBId, EmpId, YearId, EmpStatus) values(".$PmsId.", ".$_POST['FormBIdM_'.$j].", ".$EmployeeId.", ".$_POST['KraYId'].", 'P')",$con); }	
    }
   }
   else
   {
	
	for($j=1; $j<=$totRw; $j++)
	{ 
	 $sqlIn=mysql_query("insert into hrm_employee_pms_behavioralformb(EmpPmsId, FormBId, EmpId, YearId, EmpStatus) values(".$PmsId.", ".$_POST['FormBIdM_'.$j].", ".$EmployeeId.", ".$_POST['KraYId'].", 'P')",$con); 
    }	
	  
   }
   /********************** FormB FormB Close ****************************/
   
 if($sqlIn){ $msg='Form-B save successfully'; }

}

if(isset($_POST['SubmitKRA']))
{
 $totRw=$_POST['RowCountV']+$_POST['RowCount2V'];
 $sqlPms=mysql_query("select EmpPmsId from hrm_employee_pms where AssessmentYear=".$_POST['KraYId']." AND EmployeeID=".$EmployeeId, $con); $rowPms=mysql_num_rows($sqlPms);
 if($rowPms>0){ $resPms=mysql_fetch_array($sqlPms); $PmsId=$resPms['EmpPmsId']; }else{ $PmsId=0; }

   /********************** FormB FormB Open ****************************/
   $sqlb=mysql_query("select * from hrm_employee_pms_behavioralformb where EmpId=".$EmployeeId." AND YearId=".$_POST['KraYId']."", $con); $rowb=mysql_num_rows($sqlb);
   if($rowb>0)
   {
    while($resb=mysql_fetch_assoc($sqlb))
	{
     for($i=1; $i<=$totRw; $i++)
	 {
	  if($resb['FormBId']==$_POST['FormBIdM_'.$i]){ $test=1; break; }else{ $test=0; }
	 }
	 if($test==0){ $sqlDe=mysql_query("delete from hrm_employee_pms_behavioralformb where FormBId=".$resb['FormBId']." AND EmpId=".$EmployeeId." AND YearId=".$_POST['KraYId']."", $con); }
	} //while
	
	for($j=1; $j<=$totRw; $j++)
	{
	 $sqlbf=mysql_query("select * from hrm_employee_pms_behavioralformb where FormBId=".$_POST['FormBIdM_'.$j]." AND EmpId=".$EmployeeId." AND YearId=".$_POST['KraYId']."", $con); $rowbf=mysql_num_rows($sqlbf);
	 if($rowbf==0){ $sqlIn=mysql_query("insert into hrm_employee_pms_behavioralformb(EmpPmsId, FormBId, EmpId, YearId, EmpStatus) values(".$PmsId.", ".$_POST['FormBIdM_'.$j].", ".$EmployeeId.", ".$_POST['KraYId'].", 'A')",$con); }	
    }
   }
   else
   {
	
	for($j=1; $j<=$totRw; $j++)
	{
	 $sqlIn=mysql_query("insert into hrm_employee_pms_behavioralformb(EmpPmsId, FormBId, EmpId, YearId, EmpStatus) values(".$PmsId.", ".$_POST['FormBIdM_'.$j].", ".$EmployeeId.", ".$_POST['KraYId'].", 'A')",$con); 
    }	
	  
   }
   $sqlIn=mysql_query("update hrm_employee_pms_behavioralformb set EmpStatus='A' where EmpId=".$EmployeeId." AND YearId=".$_POST['KraYId'],$con);
   /********************** FormB FormB Close ****************************/
   
 if($sqlIn){ $msg='Form-B submitted successfully'; $sqlUp2=mysql_query("update hrm_employee_pms set SkillSetting='Y' where EmpPmsId=".$PmsId." AND AssessmentYear=".$_REQUEST['YI'], $con); }

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
<style>
.Input2a{font-family:Times New Roman; height:22px;font-weight:bold; font-size:12px;text-align:center;}.Inputa{font-family:"Times New Roman", Times, serif; font-size:14px; height:22px;border-style:hidden; border-bottom-color:#FFFFFF; border-left-color:#FFFFFF; border-right-color:#FFFFFF;width:100%; border-top-color:#FFFFFF; border:0;}
</style>
<script type="text/javascript" language="javascript">

function OpenHelpfile(value){window.open("HelpFile.php?a=open&v="+value,"HelpFile","width=800,height=650"); }
function OpenFaqfile(value){window.open("HelpFile.php?a=FaqOpen&v="+value,"HelpFile","width=800,height=650"); }

function KRAOpenWindow(){var CI=document.getElementById("ComId").value; var YI=document.getElementById("YId").value;
window.open("KRASchedule.php?C="+CI+"&Y="+YI,"Schedule","menubar='no',resizable=1,width=850,height=350");}

function OpenKRAHelpfile(value){window.open("KRAHelpFile.php?a=open&v="+value,"HelpFile","width=800,height=650"); }

function UploadEmpfile(e,y)
{ window.open("UploadKraFileEmp.php?action=up&E="+e+"&Y="+y,"UploadFile","menubar=no,scrollbars=yes,resizable='no',width=650,height=300");
} 

/*
function FunChangeformB(T,Id,BId,DId,GId,EId)
{
 if(T=='O')
 { document.getElementById("btnC"+Id).style.display='none'; document.getElementById("btnO"+Id).style.display='block'; 
   document.getElementById("FomBDiv_"+Id).style.display='block';
 }
 else if(T=='C')
 { document.getElementById("btnC"+Id).style.display='block'; document.getElementById("btnO"+Id).style.display='none'; 
   document.getElementById("FomBDiv_"+Id).style.display='none';
 }
 
}
*/

function FunClickRdo(j,k,Id)
{
  document.getElementById("FormBIdM_"+j).value=Id;
}

function EditKRAvalue()
{ 
  document.getElementById("SaveKRA").style.display='block'; document.getElementById("EditK").style.display='none';
}

function ValidationAchive(FormBForm)
{
 var conf=confirm("Are you sure?");
 if(conf){ return true; }else{ return false; }
}

function FunFormBTgt(yid,fbid,prd,tgt,wgt,lgc)
{ var e=document.getElementById("e").value; var c=document.getElementById("ComId").value; 
  var win = window.open("setkratgtformb.php?act=setkratgt&n=1&valueins=true&checkalpha=false&d=12&pa=4&y=2&fbid="+fbid+"&prd="+prd+"&yy=t1t&tgt="+tgt+"&e="+e+"&lgc="+lgc+"&wgt="+wgt+"&yid="+yid+"&row="+document.getElementById("row").value+"&row2="+document.getElementById("row2").value+"&DateJoining="+document.getElementById("DateJoining").value+"&After31DayDoJ="+document.getElementById("After31DayDoJ").value+"&CuDate="+document.getElementById("CuDate").value+"&EmpFromDate="+document.getElementById("EmpFromDate").value+"&EmpToDate="+document.getElementById("EmpToDate").value+"&ExtraAllowKRA="+document.getElementById("ExtraAllowKRA").value+"&AppFromDate="+document.getElementById("AppFromDate").value+"&AppToDate="+document.getElementById("AppToDate").value+"&RevFromDate="+document.getElementById("RevFromDate").value+"&RevToDate="+document.getElementById("RevToDate").value+"&EmpDateStatus="+document.getElementById("EmpDateStatus").value+"&AppDateStatus="+document.getElementById("AppDateStatus").value+"&RevDateStatus="+document.getElementById("RevDateStatus").value+"&HodDateStatus="+document.getElementById("HodDateStatus").value+"&EmpStatus="+document.getElementById("EmpStatus").value+"&AppStatus="+document.getElementById("AppStatus").value+"&RevStatus="+document.getElementById("RevStatus").value+"&HODStatus="+document.getElementById("HODStatus").value+"&c="+c, "QForm", "menubar=no,scrollbars=yes,resizable=no,directories=no,width=1200,height=600"); 
}

<!--
function doBlink(){
	var blink = document.all.tags("BLINK")
	for (var i=0; i<blink.length; i++)
		blink[i].style.visibility = blink[i].style.visibility == "" ? "hidden" : "" 
}
function startBlink(){
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
 <td style="background-image:url(images/pmsback.png);width:100%;">	 
 <table style="width:100%;">
<!--  Head Parts Open Open Open  --> 
<!--  Head Parts Open Open Open  --> 
 <tr>
  <td>
   <table>
    <tr>
<?php if($_SESSION['EmpType']=='E'){ ?>
<td align="center" valign="top"><a href="#"><img id="Img_emp1" src="images/emp.png" border="0"/></a></td>

<?php } if($_SESSION['BtnApp']>0) { ?><td align="center" valign="top"><a href="ManagerPms.php?ee=1&rr2=1&aa=0&rr=1&hh=1&sh=1&hp=1&fr=1&kr=1&fq=1&prt=1&msg=1&pd=1&mt=0&mts=1&scr=1&prom=1&inc=1&incr=1&pmsr=1&rg=1&h=1&fachiv=1&fa=1&fb=1&ffeedb=1&org=1"><img id="Img_manager1" src="images/manager1.png" border="0"/></a></td>
		   
<?php } if($_SESSION['BtnRev']>0) { ?><td align="center" valign="top"><a href="HodPms.php?ee=1&aa=1&rr2=1&rr=0&hh=1&sh=1&hp=1&fr=1&kr=1&fq=1&prt=1&msg=1&pd=1&mt=0&mts=1&scr=1&prom=1&inc=1&incr=1&pmsr=1&rg=1&h=1&fachiv=1&fa=1&fb=1&ffeedb=1&org=1"><img id="Img_hod1" src="images/hod1.png" border="0"/></a></td>

<?php } if($_SESSION['BtnRev2']>0) { ?><td align="center" valign="top"><a href="Rev2HodPms.php?ee=1&rr2=0&aa=1&rr=1&hh=0&sh=1&hp=1&fr=1&kr=1&fq=1&prt=1&msg=1&pd=1&mt=1&mts=0&scr=1&prom=1&inc=1&incr=1&pmsr=1&rg=1&h=1&fachiv=1&fa=1&fb=1&ffeedb=1&org=1"><img id="Img_hod1" src="images/RevHod1.png" border="0"/></a></td>	
		   
<?php } if($_SESSION['BtnHod']>0) { ?><td align="center" valign="top"><a href="RevHodPms.php?ee=1&rr2=1&aa=1&rr=1&hh=0&sh=1&hp=1&fr=1&kr=1&fq=1&prt=1&msg=1&pd=1&mt=1&mts=0&scr=1&prom=1&inc=1&incr=1&pmsr=1&rg=1&h=1&fachiv=1&fa=1&fb=1&ffeedb=1&org=1"><img id="Img_hod1" src="images/m1.png" border="0"/></a></td><?php } ?>

<td><font class="msg_b"><i><?php echo $msg; ?></i></font><font class="formc"><span id="MsgSpan"></span></font></td>	 
	</tr>
   </table>
  </td>
 </tr>
 
 <tr><td style="vertical-align:top;width:100%;"><?php include("SetKraPmsme.php"); ?></td></tr>
<!--  Head Parts Close Close Close  --> 
<!--  Head Parts Close Close Close  --> 
 
  <tr>
    <td id="OldKRaID" style="width:100%;display:none;">
	  <table border="0" style="width:100%;">
	    <tr>

<?php $sqlDoj=mysql_query("select DateJoining,GradeId,DepartmentId from hrm_employee_general where EmployeeID=".$EmployeeId,$con); $resDoj=mysql_fetch_assoc($sqlDoj);
?>		 
<?php /****************************************** Form Start **************************/ ?> 	 
       </tr>   
    </table>
  </td>
 </tr>					     
         
 <tr>
  <td style="width:100%;">
   <table border="0" style="width:100%;">
	<tr>
	 
<?php /****************************************** Form Start **************************/ ?>	 
<?php /***************** AppraisalForm **************************/ ?>	
	  <td id="AppraisalForm" style="width:100%;display:block;">
	  <table cellpadding="0" cellspacing="0" style="width:100%;">
	  		     
<tr>
<?php /***************** Achivement **************************/ ?>   
<form name="FormBForm" method="post" onSubmit="return ValidationAchive(this)">
<input type="hidden" name="ComId" id="ComId" value="<?php echo $CompanyId; ?>" />
<input type="hidden" name="YId" id="YId" value="<?php echo $YearId; ?>" />
<input type="hidden" id="e" value="<?php echo $EmployeeId; ?>"/>
<input type="hidden" name="KraYId" id="KraYId" value="<?php echo $_SESSION['KraYId']; ?>" /> 
<input type="hidden" name="PmsYId" id="PmsYId" value="<?php echo $_SESSION['PmsYId']; ?>" />
<input type="hidden" id="DI" value="0"/> 

<input type="hidden" id="row" value="<?php echo $YearId; ?>" />
<input type="hidden" id="row2" value="<?php echo $rowk2; ?>" />
<input type="hidden" id="DateJoining" value="<?php echo $_SESSION['Joining']; ?>" />
<input type="hidden" id="After31DayDoJ" value="<?php echo $_SESSION['After31DayDoJ']; ?>" />
<input type="hidden" id="CuDate" value="<?php echo $CuDate; ?>" />
<input type="hidden" id="EmpFromDate" value="<?php echo $_SESSION['ekFrom']; ?>" />
<input type="hidden" id="EmpToDate" value="<?php echo $_SESSION['ekTo']; ?>" />
<input type="hidden" id="ExtraAllowKRA" value="<?php echo $resY['ExtraAllowKRA']; ?>" />
<input type="hidden" id="AppFromDate" value="<?php echo $_SESSION['akFrom']; ?>" />
<input type="hidden" id="AppToDate" value="<?php echo $_SESSION['akTo']; ?>" />
<input type="hidden" id="RevFromDate" value="<?php echo $_SESSION['rkFrom']; ?>" />
<input type="hidden" id="RevToDate" value="<?php echo $_SESSION['rkTo']; ?>" />
<input type="hidden" id="EmpDateStatus" value="<?php echo $_SESSION['ekSts']; ?>" />
<input type="hidden" id="AppDateStatus" value="<?php echo $_SESSION['akSts']; ?>" />
<input type="hidden" id="RevDateStatus" value="<?php echo $_SESSION['rkSts']; ?>" />
<input type="hidden" id="HodDateStatus" value="<?php echo $_SESSION['hkSts']; ?>" />
<input type="hidden" id="EmpStatus" value="<?php echo $resRe['EmpStatus']; ?>" />
<input type="hidden" id="AppStatus" value="<?php echo $resRe['AppStatus']; ?>" />
<input type="hidden" id="RevStatus" value="<?php echo $resRe['RevStatus']; ?>" />
<input type="hidden" id="HODStatus" value="<?php echo $resRe['HODStatus']; ?>" />   
 <td id="Achivement" style="width:100%;">
  <table border="0" cellpadding="0" cellspacing="0" style="width:100%;"> 

<!--Msg Msg Msg -->
<!--Msg Msg Msg -->

<?php
$sqlB=mysql_query("select * from hrm_employee_pms_behavioralformb where YearId=".$_SESSION['KraYId']." AND EmpId=".$EmployeeId." AND (EmpStatus='D' OR EmpStatus='P')", $con); $rowB=mysql_num_rows($sqlB); 

$sqlBB=mysql_query("select * from hrm_employee_pms_behavioralformb where YearId=".$_SESSION['KraYId']." AND EmpId=".$EmployeeId." AND EmpStatus='A' AND EmpStatus!='D' AND EmpStatus!='P'", $con); $rowBB=mysql_num_rows($sqlBB);
?>

   <tr>
    <td style="width:2%;"></td>
	<td colspan="8" style="width:98%;">
	<table border="0" style="width:100%;">
	 <tr>
	  <td class="fbody" style="color:#000084;width:75%;font-weight:bold;" valign="middle">List down your Form-B for Assessment Year&nbsp;<?php if($CompanyId==1){ echo $FromCurr; }else{ $NF=$FromCurr; $NT=$ToCurr; echo $NF.'-'.$NT; } ?></td>
	  
	  <?php if($rowB>0 AND $rowBB==0){ ?><td class="tdc" style="width:5%;" valign="middle"><input type="Submit" name="SubmitKRA" id="SubmitKRA" value="final submit" style="width:130px;"/></td><?php } ?>

      <?php if(($rowB==0 OR $rowB>0) AND $rowBB==0){ ?>	  
	  <td class="tdc" style="width:5%;" valign="middle"><input type="Submit" name="SaveFormB" id="SaveFormB" style="width:130px;display:block;" value="save as draft"/> <?php /*<input type="button" name="EditK" id="EditK" style="width:130px;" value="Edit" onClick="EditKRAvalue()" style="display:none;"/>*/ ?></td>
	  <?php } ?>	 
	  
	  <td class="tdc" style="width:5%;" valign="middle"><input type="button" name="Refresh" id="Refresh" style="width:90px;" value="Refresh" onClick="javascript:window.location='EmpAddNewFormB.php?ee=0&aa=1&rr=1&hh=1&sh=1&hp=1&fr=1&kr=1&formb=1&fq=1&prt=1&msg=1&pd=1&mt=1&mts=1&scr=1&prom=1&inc=1&incr=1&pmsr=1&rg=1&h=1&fachiv=0&fa=1&fb=1&ffeedb=1&org=1'"/></td>
	  
	 </tr>
	</table>
   </td>	  
  </tr> 
  <tr style="height:24px;">	
   <td style="width:2%;"></td> 
   <td colspan="8" style="width:98%;">
    <table border="1" style="width:100%;" cellspacing="0"> 
	 <tr style="background-color:#FFFF53;"><td colspan="9" align="center" class="tdc" style="height:25px;font-size:14px; border-bottom:hidden;" valign="middle"><b>Form - B (Behavioural)</b></td></tr>
     <tr style="height:25px;background-color:#FFFF53;">   
      <td class="tdc" style="width:30px;"><b>Sn</b></td>
      <td class="tdc" style="width:300px;"><b>Behavioral/Skills</b></td>
      <td class="tdc" style="width:400px;"><b>Description</b></td>  
      <td class="tdc" style="width:60px;"><b>Weightage</b></td>
      <td class="tdc" style="width:80px;"><b>Logic</b></td>
      <td class="tdc" style="width:80px;"><b>Period</b></td>
      <td class="tdc" style="width:60px;"><b>Target</b></td>
	  <?php if($rowBB==0){ ?><td class="tdc" style="width:60px;"><b>Action</b></td><?php } ?>
     </tr>
<?php /**********************************************************/ ?>
<?php 
if($rowBB==0)
{ 
 $sqlBY=mysql_query("select fb.* from hrm_pms_formb fb INNER JOIN hrm_pms_formb_grade fbg ON fb.FormBId=fbg.FormBId where fb.SkillStatus='A' AND fb.DepartmentId=".$resDoj['DepartmentId']." AND fb.GroupFor='' AND fbg.GradeId=".$resDoj['GradeId']." AND fbg.Vertical=0 order by FormBId", $con); 
}
else
{ 
 $sqlBY=mysql_query("select fb.* from hrm_pms_formb fb INNER JOIN hrm_employee_pms_behavioralformb fbg ON fb.FormBId=fbg.FormBId where fb.SkillStatus='A' AND fbg.YearId=".$_SESSION['KraYId']." AND fbg.EmpId=".$EmployeeId." order by FormBId", $con); 
}


$rowBY=mysql_num_rows($sqlBY); ?>
<input type="hidden" id="RowCountV" name="RowCountV" value="<?=$rowBY?>" />
<?php $i=1; while($resBY=mysql_fetch_array($sqlBY)){ ?>

 <tr bgcolor="#FFFFFF" style="height:24px;">   
  <td class="font1" align="center" style="font-size:12px;"><?php echo $i; ?></td>	  
  <td class="font1" valign="top" style="font-size:12px;"><?php echo ucwords(strtolower($resBY['Skill'])); ?></td>
  <td class="font1" valign="top" style="font-size:12px;"><?php echo $resBY['SkillComment']; ?></td>
  <td class="font1" align="center" style="font-size:12px;"><?php echo $resBY['Weightage']; ?></td>
  <td class="font1" align="center" style="font-size:12px;"><?php echo $resBY['Logic']; ?></td>
  <td class="font1" align="center" style="font-size:12px;"><?php echo $resBY['Period']; ?></td>
  <td class="font1" align="center" style="font-size:12px;"><span <?php if($resBY['Period']!='Annual' AND $resBY['Period']!=''){ echo 'style="cursor:pointer;text-decoration:underline;color:#000099;"';} if($resBY['Period']!='Annual' AND $resBY['Period']!=''){ ?> onClick="FunFormBTgt(<?php echo $YearId.','.$resBY['FormBId']; ?>,'<?php echo $resBY['Period']; ?>',<?php echo $resBY['Target'].','.intval($resBY['Weightage']); ?>,'<?php echo $resBY['Logic']; ?>')" <?php } ?>  ><?php echo $resBY['Target']; ?></span></td>
  <?php if($rowBB==0){ ?>
  <td class="font1" align="center">&nbsp;
  <input type="hidden" id="FormBIdM_<?=$i?>" name="FormBIdM_<?=$i?>" value="<?=$resBY['FormBId']?>" />
  </td>
  <?php } ?>
 </tr> 
   
<?php $i++; } $j=$i; ?>

<?php if($rowBB==0){ ?>

<?php
 if($rowB>0)
 {
 $sqlBY=mysql_query("select fb.* from hrm_pms_formb fb INNER JOIN hrm_employee_pms_behavioralformb fbg ON fb.FormBId=fbg.FormBId where fb.SkillStatus='A' AND fbg.YearId=".$_SESSION['KraYId']." AND fbg.EmpId=".$EmployeeId." AND fb.GroupFor!='' order by fbg.FormBId", $con);
 }
 else
 {
 $sqlBY=mysql_query("select fb.* from hrm_pms_formb fb INNER JOIN hrm_pms_formb_grade fbg ON fb.FormBId=fbg.FormBId where fb.SkillStatus='A' AND fb.DepartmentId=".$resDoj['DepartmentId']." AND fb.GroupFor!='' AND fbg.GradeId=".$resDoj['GradeId']." AND fbg.Vertical=0 group by GroupFor order by FormBId", $con);
 }
 $rowB2Y=mysql_num_rows($sqlBY); ?>
 <input type="hidden" id="RowCount2V" name="RowCount2V" value="<?=$rowB2Y?>" /> 
 <?php  while($resBY=mysql_fetch_array($sqlBY)){ ?>

 <tr bgcolor="#FFFFFF" style="height:24px;">   
  <td class="font1" align="center" style="font-size:12px;"><?php echo $j; ?></td>	  
  <td class="font1" valign="top" style="font-size:12px;"><?php echo ucwords(strtolower($resBY['Skill'])); ?></td>
  <td class="font1" valign="top" style="font-size:12px;"><?php echo $resBY['SkillComment']; ?></td>
  <td class="font1" align="center" style="font-size:12px;"><?php echo $resBY['Weightage']; ?></td>
  <td class="font1" align="center" style="font-size:12px;"><?php echo $resBY['Logic']; ?></td>
  <td class="font1" align="center" style="font-size:12px;"><?php echo $resBY['Period']; ?></td>
  <td class="font1" align="center" style="font-size:12px;"><span <?php if($resBY['Period']!='Annual' AND $resBY['Period']!=''){ echo 'style="cursor:pointer;text-decoration:underline;color:#000099;"';} if($resBY['Period']!='Annual' AND $resBY['Period']!=''){ ?> onClick="FunFormBTgt(<?php echo $_SESSION['KraYId'].','.$resBY['FormBId']; ?>,'<?php echo $resBY['Period']; ?>',<?php echo $resBY['Target'].','.intval($resBY['Weightage']); ?>,'<?php echo $resBY['Logic']; ?>')" <?php } ?>  ><?php echo $resBY['Target']; ?></span></td>
  
  <?php if($rowBB==0){ ?>
  <td class="font1" align="center"><span style="cursor:pointer;"><img src="images/close-folder.png" id="btnC<?=$j?>" onClick="FunChangeformB('O',<?=$j.','.$resBY['FormBId'].','.$resDoj['DepartmentId'].','.$resDoj['GradeId'].','.$EmployeeId?>)"/><img src="images/open-folder.png" id="btnO<?=$j?>" onClick="FunChangeformB('C',<?=$j.','.$resBY['FormBId'].','.$resDoj['DepartmentId'].','.$resDoj['GradeId'].','.$EmployeeId?>)" style="display:none;"/></span>
  <input type="hidden" id="FormBIdM_<?=$j?>" name="FormBIdM_<?=$j?>" value="<?=$resBY['FormBId']?>" />
  </td>
  <?php } ?>
 </tr> 
 <tr>
  <td colspan="8">
    
   <div id="FomBDiv_<?=$j?>" style="display:none;">
<?php /*************************************************/ ?>    
<?php /*************************************************/ ?>
<table border="1" style="width:100%;" cellspacing="0">
 <tr style="background-color:#0079F2;color:#FFFFFF;"><td colspan="9" class="tdc" style="height:22px;font-size:14px; border-bottom:hidden; text-align:left;" valign="middle">&nbsp;&nbsp;<b>Select Any One:</b></td></tr>
 <?php $sqlBF=mysql_query("select fb.* from hrm_pms_formb fb INNER JOIN hrm_pms_formb_grade fbg ON fb.FormBId=fbg.FormBId where fb.SkillStatus='A' AND fb.DepartmentId=".$resDoj['DepartmentId']." AND fb.GroupFor!='' AND fbg.GradeId=".$resDoj['GradeId']." AND fbg.Vertical=0 AND fb.GroupFor='".$resBY['GroupFor']."' order by FormBId", $con);  
  $k=1; while($resBF=mysql_fetch_array($sqlBF)){ ?>
 
 <tr bgcolor="#FFFFB0" style="height:24px;">   
  <td class="font1" align="center" style="font-size:12px;width:35px;vertical-align:middle;">
  <input type="radio" name="Rdo<?=$j?>" id="R<?=$k?>" style="cursor:pointer;" onClick="FunClickRdo(<?=$j.','.$k.','.$resBF['FormBId']?>)" <?php if($resBY['FormBId']==$resBF['FormBId']){ echo 'checked';} ?>/>
  </td>	  
  <td class="font1" valign="top" style="font-size:12px;width:350px;"><?=ucwords(strtolower($resBF['Skill'])); ?></td>
  <td class="font1" valign="top" style="font-size:12px;"><?=$resBF['SkillComment']?></td>
  <?php /*
  <td class="font1" align="center" style="font-size:12px;width:80px;"><?=$resBF['Weightage']?></td>
  <td class="font1" align="center" style="font-size:12px;width:80px;"><?=$resBF['Logic']?></td>
  <td class="font1" align="center" style="font-size:12px;width:80px;"><?=$resBF['Period']?></td>
  <td class="font1" align="center" style="font-size:12px;width:80px;"><?=$resBF['Target']?></td>\
  */ ?>
 </tr> 
 <?php $k++; } ?>
 
</table> 
<?php /*************************************************/ ?>
<?php /*************************************************/ ?>	

	
   </div>
  </td>
 </tr>
	  
<?php $j++; } ?> <input type="hidden" id="EditTNRow" name="EditTNRow" value="<?php echo $tn; ?>" />

<?php } //if($rowBB==0) ?> 

<?php /**********************************************************/ ?>	 
	 
	 
	</table>
   </td>
  </tr>
 </table>
 </td>
</tr>
</form>  

<tr><td>&nbsp;</td></tr>
<tr><td>&nbsp;</td></tr>
<?php //if($rowk2>0){ ?>
<tr>

</tr>
<tr><td>&nbsp;</td></tr>
<?php //} ?>



<?php //}  ?> 
	 </table>
   </td> 
<?php /****************************************** Form Close **************************/ ?>		   
		</tr>
	  </table>
	</td>
   </tr>
   
  </table>
 </td>
</tr>					
<?php //************************************ Close ********************************** ?>					
				  </table>
				 </td>
			  </tr>
			</table>
           </td>
			  </tr>
	        </table>
			
<?php //************************************************************************* ?>
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

