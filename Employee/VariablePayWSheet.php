<?php session_start();
if($_SESSION['login'] = true){require_once('../AdminUser/config/config.php');}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('../AdminUser/logcheck.php');
if($_SESSION['logCheckEmp']!=$logemp){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('EmpMenuSession.php');}else{header('Location:../index.php');}
?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>

<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style>
.tdl{ font-family:Arial;font-size:12px;text-align:left; }
.tdc{ font-family:Arial;font-size:12px;text-align:center; }
.tdr{ font-family:Arial;font-size:12px;text-align:right; }
.rinput{font-family:Arial;font-weight:bold;color:#9F0000;font-size:15px;text-align:center;height:21px;}
.tdll{ font-family:Arial;font-size:12px;text-align:left; }
.tdcc{ font-family:Arial;font-size:12px;text-align:center;border-style:hidden;border:0;width:100%; }
.tdcci{ font-family:Arial;font-size:12px;text-align:center;border-style:hidden;border:0;background-color:#FFFFAE;;width:100%; }
.tdccT{ font-family:Arial;font-size:12px;text-align:center;border-style:hidden;border:0;background-color:#B5FF6A;width:100%; }
.tdrr{ font-family:Arial;font-size:12px;text-align:right; }
.tdcinp{ font-family:Arial;font-size:12px;text-align:left;border-style:hidden;border:0;width:100%; }
.inner_table{height:550px;overflow-y:auto;width:auto;}
</style>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<link type="text/css" href="css/mycss.css" rel="stylesheet"/>
<script src="../AdminUser/js/jquery-1.9.1.js"></script>
<script type="text/javascript" src="../AdminUser/js/jquery.freezeheader.js"></script>
<script>$(document).ready(function () { $("#table1").freezeHeader({ 'height':'500px' }); })</script>
<script type="text/javascript" language="javascript">
function isNumberKey(evt)
{
 var charCode = (evt.which) ? evt.which : event.keyCode
 //if (charCode > 31 && (charCode < 48 || charCode > 57))
 if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57))  /* For floating*/
	return false;

 return true;
}

function SelectFun(v,t,ei,yi)
{
 if(t=='D')
 { 
   var DeE=v; var TeE='All'; var TrE='All'; var StE=document.getElementById('StE').value;  
 }
 else if(t=='T')
 { 
   var DeE='All'; var TeE=v; var TrE='All'; var StE=document.getElementById('StE').value;
 }
 else if(t=='R')
 { 
   var DeE='All'; var TeE='All'; var TrE=v; var StE=document.getElementById('StE').value;
 }
 else if(t=='G')
 { 
   var DeE=document.getElementById('DeE').value; 
   var TeE=document.getElementById('TeE').value; 
   var TrE=document.getElementById('TrE').value; 
   var StE=v;
 }
 
 window.location= 'VariablePayWSheet.php?FilD='+DeE+'&TeE='+TeE+'&TrE='+TrE+'&FilS='+StE+'&ee=1&aa=1&rr=1&hh=0&sh=1&hp=1&fr=1&kr=1&fq=1&prt=1&msg=1&pd=1&mt=1&mts=1&scr=1&prom=1&inc=0&incr=1&pmsr=1&rg=1&h=1&fachiv=1&fa=1&fb=1&ffeedb=1&org=1';
}

function funShort(typ,ord)
{  
   //alert(typ+"-"+ord);
   var DeE=document.getElementById('DeE').value; 
   var TeE=document.getElementById('TeE').value; 
   var TrE=document.getElementById('TrE').value; 
   var StE=document.getElementById('StE').value;
   window.location= 'VariablePayWSheet.php?FilD='+DeE+'&TeE='+TeE+'&TrE='+TrE+'&FilS='+StE+'&ee=1&aa=1&rr=1&hh=0&sh=1&hp=1&fr=1&kr=1&fq=1&prt=1&msg=1&pd=1&mt=1&mts=1&scr=1&prom=1&inc=0&incr=1&pmsr=1&rg=1&h=1&fachiv=1&fa=1&fb=1&ffeedb=1&org=1&typ='+typ+"&Ord="+ord;
}


function FCalBodyLoad(v)
{
  var v = parseFloat(v); 
  var OnePer=0; 
  var rows=document.getElementById("TotRow").value;
  for(var i=1; i<=rows; i++)
  { 
      if(document.getElementById("PP_Per"+i).value==0)
	  {
	   document.getElementById("PP_Per"+i).value=v;
       var gp = parseFloat(document.getElementById("gp_"+i).value);
	   var OnePer = Math.round(((gp*1)/100)*100)/100;   
	   document.getElementById("PP_Amt"+i).value=Math.round((OnePer*v)*100)/100;
	  } //If 
  }	//For     
  FunTotVal(rows);
}




function FCalAllRw(v,rt)
{ 
  var no=document.getElementById("TtnRw").value;
  for(var k=1; k<=no; k++){ document.getElementById("PerAssign"+k).disabled=true; }
  var v = parseFloat(v); var OnePer=0;
  var rows=document.getElementById("TotRow").value;
  for(var i=1; i<=rows; i++)
  {
	if(parseFloat(document.getElementById("rating_"+i).value)==rt)
	{
	  document.getElementById("TR"+i).style.background='#FFFFFF';
	  document.getElementById("PP_Per"+i).value=v;
	  var gp = parseFloat(document.getElementById("gp_"+i).value);
	  var OnePer = Math.round(((gp*1)/100)*100)/100;
      var pp = document.getElementById('PP_Amt'+i).value = Math.round((OnePer*v)*100)/100;
	}
  }
  for(var k=1; k<=no; k++){ document.getElementById("PerAssign"+k).disabled=false; }
  
  var rows=document.getElementById("TotRow").value;
  FunTotVal(rows);
}

function EmpCalRw(v,no,gp)
{
 var i = parseFloat(no); var v = parseFloat(v); var gp = parseFloat(gp);
 var OnePer = Math.round(((gp*1)/100)*100)/100;
 var pp = document.getElementById('PP_Amt'+i).value = Math.round((OnePer*v)*100)/100;
 document.getElementById("TR"+i).style.background='#FFFFFF';
 
 var rows=document.getElementById("TotRow").value;
 FunTotVal(rows);	
}

function FunTotVal(rows)
{ 
  document.getElementById("TPP_Per").value=0; document.getElementById("TPP_Amt").value=0;	
  for(var j=1; j<=rows; j++)
  { 
    var PP = parseFloat(document.getElementById("TPP_Amt").value);
	var PPJ = parseFloat(document.getElementById("PP_Amt"+j).value);  
	document.getElementById("TPP_Amt").value=Math.round((PP+PPJ)*100)/100; 
  }
  var TotGP = parseFloat(document.getElementById("VP_GrossPaid").value);
  var OnePerAmt = Math.round(((TotGP*1)/100)*100)/100; 
  var TPP_Amt = parseFloat(document.getElementById("TPP_Amt").value); 
  var ActPer = 0;
  var ActPer = document.getElementById("TPP_Per").value = Math.round((TPP_Amt/OnePerAmt)*100)/100;
}

function FunDataSave(Ei,Yi)
{
  var Dp=document.getElementById('DeE').value; 
  var Te=document.getElementById('TeE').value; 
  var Gr=document.getElementById('StE').value;
  var TPP=document.getElementById('TPP_Per').value;
  var agree=confirm("Are you sure you want to save data? For your current filter, final performace pay percentage is "+TPP); 
  if(agree)
  { 
   document.getElementById('loaderDiv').style.display='block'; 
   /****************************************/ //HodRating
   var no=document.getElementById("TtnRw").value;
   for(var k=1; k<=no; k++)
   { 
    var score = document.getElementById("PerAssign"+k).value; 
	var rating = document.getElementById("HodRating"+k).value;
	var url = 'VariablePayWSheet_Ajax.php'; var pars = 'Action=workingSheet&ei='+Ei+'&Dp='+Dp+'&Te='+Te+'&Gr='+Gr+'&Yi='+Yi+'&type=numscore&score='+score+'&rating='+rating; 
	var myAjax = new Ajax.Request( url, { 	method: 'post', parameters: pars }); 
   }
   /****************************************/
   
   
   /****************************************/
    var url = 'VariablePayWSheet_Ajax.php'; var pars = 'Action=workingSheet&ei='+Ei+'&Dp='+Dp+'&Te='+Te+'&Gr='+Gr+'&Yi='+Yi+'&type=main&GP='+document.getElementById("VP_GrossPaid").value+'&TPP_Per='+document.getElementById("TPP_Per").value+'&TPP_Amt='+document.getElementById("TPP_Amt").value;
	var myAjax = new Ajax.Request(
    url, { 	method: 'post', parameters: pars });  
   /****************************************/
   
  /****************************************/
   var rows=document.getElementById("TotRow").value;
   for(var i=1; i<=rows; i++)
   {
    var url = 'VariablePayWSheet_Ajax.php'; var pars = 'Action=workingSheet&ei='+Ei+'&Dp='+Dp+'&Te='+Te+'&Gr='+Gr+'&Yi='+Yi+'&type=emp&pmsid='+document.getElementById("pmsid_"+i).value+'&empid='+document.getElementById("empid_"+i).value+'&Rating='+document.getElementById("rating_"+i).value+'&GP='+document.getElementById("gp_"+i).value+'&PP_Per='+document.getElementById("PP_Per"+i).value+'&PP_Amt='+document.getElementById("PP_Amt"+i).value+'&Rows='+rows+'&i='+i;  
    var myAjax = new Ajax.Request(
    url, { 	method: 'post', parameters: pars, onComplete: show_rst });
   }
   /*****************************************/
  
  } //if(agree) 
  else{ return false; } 
  
}

function show_rst(originalRequest)
{ 
  document.getElementById("actionspan").innerHTML = originalRequest.responseText; 
  if(document.getElementById("RstVal").value==1)
  { alert("Data save successfully!");  document.getElementById("ExportBtn").disabled=false; }
  else{ alert("Error..., please check!"); }
  document.getElementById('loaderDiv').style.display='none';
}


function FunExpFormat(yi,ei,ci,di,ti,tr,gi)
{ 
  var agree=confirm("Are you sure for export? Please ensure that the current working sheet data is saved or not"); 
  if(agree)
  {
   window.open("VariablePayWSheet_Exp.php?valuee=dataexport&yi="+yi+"&ei="+ei+"&ci="+ci+"&di="+di+"&ti="+ti+"&tr="+tr+"&gi="+gi, "expform", "menubar=no,scrollbars=yes,resizable=no,directories=no,width=50,height=50"); 
  }
  else {return false; }
}

function FunExpAllFormat(yi,ei,ci,di,ti,tr,gi)
{
  var agree=confirm("Are you sure for export?"); 
  if(agree)
  {
   window.open("VariablePayWSheet_Exp.php?valuee=DataAllExport&yi="+yi+"&ei="+ei+"&ci="+ci+"&di="+di+"&ti="+ti+"&tr="+tr+"&gi="+gi+"&Tgp="+document.getElementById('VP_GrossPaid').value+"&TPP_Per="+document.getElementById('TPP_Per').value+"&TPP_Amt="+document.getElementById('TPP_Amt').value, "expallform", "menubar=no,scrollbars=yes,resizable=no,directories=no,width=50,height=50"); 
  }
  else {return false; }
}

</script>
</head>
<?php 
 $Dpp=0; $Dp=0; $Tee=0; $Te=0; $Trr=0; $Tr=0; $Grr=0; $Gr=0;  $RckArr=array();
 if(isset($_REQUEST['FilD'])){ $Dpp=1; $Dp=$_REQUEST['FilD']; } 
 if(isset($_REQUEST['TeE'])){  $Tee=1; $Te=$_REQUEST['TeE']; }
 if(isset($_REQUEST['TrE'])){  $Trr=1; $Tr=$_REQUEST['TrE']; }
 if(isset($_REQUEST['FilS'])){ $Grr=1; $Gr=$_REQUEST['FilS']; }
 $row=0; 
 if($Dp>0 OR $Te>0) // OR $Tr>0
 { 
   if($Dp>0){ $qsub='deptid='.$Dp; }elseif($Te>0){ $qsub='Rep1='.$Te; } //elseif($Tr>0){ $qsub='Rep2='.$Tr; } 
   $sqlRcd=mysql_query("select * from hrm_pp_workingsheet where hodid=".$EmployeeId." AND ".$qsub." AND yearid=".$_SESSION['PmsYId']." AND typeid='main'",$con); $row=mysql_num_rows($sqlRcd); $rRcd=mysql_fetch_assoc($sqlRcd); 
 }  
?>

<body class="body" <?php if($row==0){ ?>onLoad="FCalBodyLoad(0)"<?php } ?>>

<div id="loaderDiv" style="background-color: rgba(0,0,0,0.8);width: 100%;height: 100%;position: fixed;top:0px;left: 0px;font-size: 12px; display:none; text-align:center;"><span style="color:white;top: 50%;left:38%;position: absolute;">Please Wait, Submission in Progress...<img src="images/loading.gif"></span></div>

<table class="table">
<tr><td><table class="menutable"><tr><td><?php if($_SESSION['login'] = true){ require_once("EMenu.php"); } ?></td></tr></table></td></tr>
<tr>
 <td>
 <table width="100%" style="margin-top:0px;">
  <tr><td valign="top"><?php if($_SESSION['login'] = true){ require_once("EWelcome.php"); } ?></td></tr>
  <tr>
   <td valign="top" style="width:100%;">
   <table border="0" style="width:100%;height:500px;float:none;" cellpadding="0">
   <tr>
    <td valign="top" style="width:100%;">      
    <table border="0" id="Activity" style="width:100%;">
	<tr>
     <td style="width:100%;" valign="top">
	 <table border="0" style="width:100%;">
<?php //*************************************** Start ********************************************* ?>	
<?php //*************************************** Start ********************************************* ?>
<?php
$SqlStat=mysql_query("select MedicalPolicyPremium from hrm_company_statutory_taxsaving where CompanyId=".$CompanyId,$con); $ResStat=mysql_fetch_assoc($SqlStat);
?>
<input type="hidden" id="EMediPP" value="<?php echo $ResStat['MedicalPolicyPremium'];?>" readonly/>
					
<tr>
 <td>	 
 <table style="width:100%;">
 <tr><td style="vertical-align:top;width:100%;"></td></tr>
  <tr>
    <td style="width:100%;">
	  <table border="0" style="width:100%;">
	    <tr>
        <?php /****************************************** Form Start **************************/ ?>
		<?php /****************************************** Form Start **************************/ ?>
		
 		  <td id="TeamDetails" style="display:block;width:100%;">
		  <table border="0" style="width:100%;">
<span id="actionspan"></span>		  
<tr>
 <td style="width:100%;">
  <table border="0" style="width:100%;" cellspacing="0">
   <tr>
    <td class="formh" style="width:200px;">(<i>Performance Pay Working Sheet</i>) :&nbsp;</td>
	
	<td class="tdd" style="width:80px;text-align:right;"><b>Department:</b></td>
    <td class="td1" style="width:120px;"><select class="tdsel" name="DeE" id="DeE" onChange="SelectFun(this.value,'D',<?php echo $EmployeeId.','.$_SESSION['PmsYId']; ?>)"><?php if($_REQUEST['FilD']>0){ $sqlde=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$_REQUEST['FilD'],$con); $resde=mysql_fetch_assoc($sqlde); ?><option value="<?php echo $_REQUEST['FilD']; ?>" selected><?php echo $resde['DepartmentCode']; ?></option><?php }else{ ?><option value="All" selected>All</option><?php } $SqlDept=mysql_query("select HR_Curr_DepartmentId,DepartmentName,DepartmentCode from hrm_employee_pms pms inner join hrm_department d on pms.HR_Curr_DepartmentId=d.DepartmentId where AssessmentYear=".$_SESSION['PmsYId']." AND pms.CompanyId=".$CompanyId." AND HOD_EmployeeID=".$EmployeeId." group by HR_Curr_DepartmentId order by DepartmentName ASC"); while($ResDept=mysql_fetch_array($SqlDept)) { ?><option value="<?php echo $ResDept['HR_Curr_DepartmentId']; ?>"><?php echo $ResDept['DepartmentCode'];?></option><?php } ?><option value="All">All</option></select></td>
	
	<?php if($EmployeeId==51){ ?>
	<td class="tdd" style="width:50px;text-align:right;"><b>HOD:</b></td>
    <td class="td1" style="width:150px;"><select class="tdsel" name="TeE" id="TeE" onChange="SelectFun(this.value,'T',<?php echo $EmployeeId.','.$_SESSION['PmsYId']; ?>)"><?php if($_REQUEST['TeE']>0){ $sT=mysql_query("select concat(Fname, ' ', Sname, ' ', Lname) as FullName from hrm_employee where EmployeeID=".$_REQUEST['TeE'],$con); $rT=mysql_fetch_assoc($sT); ?><option value="<?php echo $_REQUEST['TeE']; ?>" selected><?php echo $rT['FullName']; ?></option><?php }else{ ?><option value="All" selected>All</option><?php } $SqlRev2=mysql_query("SELECT Rev2_EmployeeID, concat(Fname, ' ', Sname, ' ', Lname) as FullName from hrm_employee_pms p INNER JOIN hrm_employee e ON p.Rev2_EmployeeID=e.EmployeeID WHERE p.HOD_EmployeeID=".$EmployeeId." AND p.CompanyId=".$CompanyId." AND p.AssessmentYear=".$_SESSION['PmsYId']." AND e.EmpStatus='A' GROUP BY p.Rev2_EmployeeID", $con); while($ResRev2=mysql_fetch_array($SqlRev2)){ ?><option value="<?php echo $ResRev2['Rev2_EmployeeID']; ?>"><?php echo $ResRev2['FullName']; ?></option>
	<?php } ?><option value="All">All</option></select></td>
	
	<td class="tdd" style="width:50px;text-align:right;"><b>REV:</b></td>
    <td class="td1" style="width:150px;"><select class="tdsel" name="TrE" id="TrE" onChange="SelectFun(this.value,'R',<?php echo $EmployeeId.','.$_SESSION['PmsYId']; ?>)"><?php if($_REQUEST['TrE']>0){ $sTr=mysql_query("select concat(Fname, ' ', Sname, ' ', Lname) as FullName from hrm_employee where EmployeeID=".$_REQUEST['TrE'],$con); $rTr=mysql_fetch_assoc($sTr); ?><option value="<?php echo $_REQUEST['TrE']; ?>" selected><?php echo $rTr['FullName']; ?></option><?php }else{ ?><option value="All" selected>All</option><?php } $SqlRev=mysql_query("SELECT Reviewer_EmployeeID, concat(Fname, ' ', Sname, ' ', Lname) as FullName from hrm_employee_pms p INNER JOIN hrm_employee e ON p.Reviewer_EmployeeID=e.EmployeeID WHERE p.HOD_EmployeeID=".$EmployeeId." AND p.CompanyId=".$CompanyId." AND p.AssessmentYear=".$_SESSION['PmsYId']." AND pms.Hod_TotalFinalRating>2.7 AND e.EmpStatus='A' GROUP BY p.Reviewer_EmployeeID", $con); while($ResRev=mysql_fetch_array($SqlRev)){ ?><option value="<?php echo $ResRev['Reviewer_EmployeeID']; ?>"><?php echo $ResRev['FullName']; ?></option>
	<?php } ?><option value="All">All</option></select></td>
	
	<?php }else	{ echo '<input type="hidden" name="TeE" id="TeE" value="0" />';
	              echo '<input type="hidden" name="TrE" id="TrE" value="0" />'; } ?>
	
	<?php 
	 if($_REQUEST['FilD']>0){ $DCond="pms.HR_Curr_DepartmentId=".$_REQUEST['FilD']; }
	 elseif($_REQUEST['TeE']>0){ $DCond="pms.Rev2_EmployeeID=".$_REQUEST['TeE']; }
	 elseif($_REQUEST['TrE']>0){ $DCond="pms.Reviewer_EmployeeID=".$_REQUEST['TrE']; }
	 else{ $DCond='1=1'; } 
	?>
	<td class="tddr" style="width:60px;text-align:right;"><b>Grade:</b></td>
	<td class="td1" style="width:80px;"><select class="tdsel" name="StE" id="StE" onChange="SelectFun(this.value,'G',<?php echo $EmployeeId.','.$_SESSION['PmsYId']; ?>)"><?php if($_REQUEST['FilS']>0){ $sqlSe=mysql_query("select GradeValue from hrm_grade where GradeId=".$_REQUEST['FilS'],$con); $resSe=mysql_fetch_assoc($sqlSe); ?><option value="<?php echo $_REQUEST['FilS']; ?>" selected><?php echo $resSe['GradeValue']; ?></option><?php }else{ ?><option value="All" selected>All</option><?php } $SqlSt=mysql_query("select st.* from hrm_grade st inner join hrm_employee_pms pms on st.GradeId=pms.HR_CurrGradeId where pms.HOD_EmployeeID=".$EmployeeId." AND AssessmentYear=".$_SESSION['PmsYId']." AND pms.Hod_TotalFinalRating>2.7 AND ".$DCond." group by pms.HR_CurrGradeId order by st.GradeId ASC"); while($ResSt=mysql_fetch_array($SqlSt)) { ?><option value="<?php echo $ResSt['GradeId']; ?>"><?php echo $ResSt['GradeValue'];?></option><?php } ?><option value="All">All</option></select></td>
	
	<input type="hidden" id="HQE" name="HQE" value="0"/>
	
	
	<td style="width:1px;">&nbsp;</td>
	<td class="tdc" style="width:90px;"><a href="VariablePayWSheet.php?ee=1&aa=1&rr=1&hh=0&sh=1&hp=1&fr=1&kr=1&fq=1&prt=1&msg=1&pd=1&mt=1&mts=1&scr=1&prom=1&inc=1&incr=1&pmsr=1&rg=1&h=1&fachiv=1&fa=1&fb=1&ffeedb=1&FilD=All&FilS=All&TeE=All&org=0&wst=1"><input type="button" style="width:90px;" value="Refresh" /></a></td>
	<td style="width:200px;">&nbsp;</td>
	<td style="width:50px;"></td>
	
   </tr>
  </table>
 </td>
</tr>


<input type="hidden" id="EmployeeId" value="<?php echo $EmployeeId; ?>" />
<input type="hidden" id="ComId" value="<?php echo $CompanyId; ?>" />
<input type="hidden" id="YearId" value="<?php echo $YearId; ?>" />
<input type="hidden" id="FormMin5" value="0" /><input type="hidden" id="FormMax5" value="0" />	
<input type="hidden" id="PerValue" /><input type="hidden" id="OnePerPre" value="<?php echo $OnePerPre; ?>"/> 

<tr>
 <td style="width:105%;">
 
  <table border="0" style="width:100%;">
   <tr style="background-color:#FFFFAE;">
   
    <?php if(($_REQUEST['FilD']>0 OR $_REQUEST['TeE']>0) AND $_REQUEST['FilS']=='All'){ // OR $_REQUEST['TrE']>0 ?>
    <td class="tdc" style="width:100%;vertical-align:bottom;font-size:15px;">
	 <table style="width:100%;">
	  <tr>
	   <td>&nbsp;</td><!--".$_SESSION['PmsYId']."-->
	   <?php 
	   $DCond='1=1'; $HCond='1=1'; $RCond='1=1'; $GCond='1=1';
	   if($_REQUEST['FilD']>0){ $DCond="pms.HR_Curr_DepartmentId=".$_REQUEST['FilD']; }
	   if($_REQUEST['TeE']>0){  $HCond="pms.Rev2_EmployeeID=".$_REQUEST['TeE']; }
	   if($_REQUEST['TrE']>0){  $RCond="pms.Reviewer_EmployeeID=".$_REQUEST['TrE']; } 
	   if($_REQUEST['FilS']>0){ $GCond="pms.HR_CurrGradeId=".$_REQUEST['FilS']; } 
	   $SqlRt=mysql_query("select Hod_TotalFinalRating from hrm_employee_pms pms inner join hrm_employee e on pms.EmployeeID=e.EmployeeID where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND pms.HOD_EmployeeID=".$EmployeeId." AND pms.AssessmentYear=".$_SESSION['PmsYId']." AND ".$DCond." AND ".$HCond." AND ".$RCond." AND ".$GCond." AND pms.Hod_TotalFinalRating>2.7 group by Hod_TotalFinalRating order by Hod_TotalFinalRating ASC"); 
	   $no=1; while($ResRt=mysql_fetch_array($SqlRt))
	   { 
	   if(strlen(floatval($ResRt['Hod_TotalFinalRating']))==1){ $ratr=floatval($ResRt['Hod_TotalFinalRating']); }
	   else{ $ratr=floatval($ResRt['Hod_TotalFinalRating']*10); } ?>
	   <input type="hidden" id="HodRating<?=$no?>" value="<?=$ratr?>"	/>
	   
	   <?php 
       $ratFrt=0; 
	   if($Dp>0 OR $Te>0) // OR $Tr>0
	   { 
	    if($Dp>0){ $qsub='deptid='.$Dp; }elseif($Te>0){ $qsub='Rep1='.$Te; } //elseif($Tr>0){ $qsub='Rep2='.$Tr; }
	    $sqlFrt=mysql_query("select * from hrm_pp_workingsheet_inc where hodid=".$EmployeeId." AND ".$qsub." and yearid=".$_SESSION['PmsYId']."",$con); $rowFrt=mysql_num_rows($sqlFrt); 
        if($rowFrt>0){ $resFrt=mysql_fetch_assoc($sqlFrt); $ratFrt = $resFrt['rat_'.$ratr]; } 
	   }
	   ?>
	   <td style="width:100px;text-align:center;"><i><?=floatval($ResRt['Hod_TotalFinalRating'])?></i>
	   <br><input class="tdc" id="PerAssign<?=$no?>" value="<?=$ratFrt?>" style="width:50px;" onKeyPress="return isNumberKey(event)" onKeyDown="FCalAllRw(this.value,<?=floatval($ResRt['Hod_TotalFinalRating'])?>)" onKeyUp="FCalAllRw(this.value,<?=floatval($ResRt['Hod_TotalFinalRating'])?>)" onChange="FCalAllRw(this.value,<?=floatval($ResRt['Hod_TotalFinalRating'])?>)" />
	  
	   </td>
	   <?php $no++; } $TtnRw=$no-1; ?><input type="hidden" id="TtnRw" name="TtnRw" value="<?=$TtnRw?>"	/>
	   <td>&nbsp;</td>
	  </tr>
	 </table>
	</td>
	<?php } //if($_REQUEST['FilD']>0 AND $_REQUEST['FilS']=='All') ?>
	
   </tr>
      
   <tr>
    <td style="width:100%;">   
     <table border="0" style="width:100%;">
     <tr>
     <?php //************************************************ Start ******************************// ?>
	 <?php //************************************************ Start ******************************// ?>
	 <td style="width:100%;" id="EmpAppInc">
     <span id="MyTeamIncSpan"></span>
	 <span id="MyTeamInc">
	 <table border="0" style="width:100%;">	     
  <tr>
   <td style="width:100%; text-align:left;">
   <table border="0" style="width:100%;" cellspacing="1">
    <tr style="height:25px;">
	 <td colspan="<?php if($TotInEM>0){ ?>17<?php }else{ ?>15<?php } ?>" class="td1l" valign="top">
	  <table width="100%" border="1" cellspacing="0" id="table1"><!--id="table1"-->

<?php 
$ordby='order by e.ECode ASC'; $Ord=1;
if($_REQUEST['typ']=='D')
{ 
 if($_REQUEST['Ord']==1){ $ordby='order by d.DepartmentCode ASC'; $Ord=0; }
 else{ $ordby='order by d.DepartmentCode DESC'; $Ord=1; } 
}
elseif($_REQUEST['typ']=='De')
{ 
 if($_REQUEST['Ord']==1){ $ordby='order by de.DesigCode ASC'; $Ord=0; }
 else{ $ordby='order by de.DesigCode DESC'; $Ord=1; } 
}
elseif($_REQUEST['typ']=='Gr')
{ 
 if($_REQUEST['Ord']==1){ $ordby='order by gr.GradeId ASC'; $Ord=0; }
 else{ $ordby='order by gr.GradeId DESC'; $Ord=1; } 
}
?>
<div class="thead">
<thead>	  
<tr>
 <td class="th" style="width:2%;"><b>Sn</b></td>
 <td class="th" style="width:3%;"><b>EC</b></td>
 <td class="th" style="width:10%;"><b>Name</b></td>
 <td class="th" style="width:4%;"><b>DOJ</b></td>
 
 <td class="th" style="width:6%;"><a onClick="funShort('D',<?=$Ord?>)" style="cursor:pointer;"><b><u>Department</u></b></a></td>
 <td class="th" style="width:10%;"><a onClick="funShort('De',<?=$Ord?>)" style="cursor:pointer;"><b><u>Designation</u></b></a></td>
 <td class="th" style="width:3%;"><a onClick="funShort('Gr',<?=$Ord?>)" style="cursor:pointer;"><b><u>Garde</u></b></a></td>
 <td class="th" style="width:3%;">&nbsp;<b>Rating</b>&nbsp;</td>
 <td class="th" style="width:6%;"><b>Gross Paid<br>Amount</b></td>
 <td class="th" style="width:5%;"><b>PP (%)</b></td>
 <td class="th" style="width:5%;"><b>Total<br>Performance Pay</b></td>
 
</tr>

<?php
if($Dp>0)
{
 if($Te>0)
 {
  if($Te>0 && $Gr>0){ $qry='(p.Rev2_EmployeeID='.$Te.' OR p.EmployeeID='.$Te.') AND p.HR_CurrGradeId='.$Gr; }
  elseif($Te>0 && $Gr=='All'){ $qry='(p.Rev2_EmployeeID='.$Te.' OR p.Rev2_EmployeeID='.$Te.')'; }
 }
 elseif($Tr>0)
 {
  if($Tr>0 && $Gr>0){ $qry='p.Reviewer_EmployeeID='.$Tr.' AND p.HR_CurrGradeId='.$Gr; }
  elseif($Tr>0 && $Gr=='All'){ $qry='p.Reviewer_EmployeeID='.$Tr; }
 }
 elseif($Dp>0 && $Gr>0){ $qry='g.DepartmentId='.$Dp.' AND p.HR_CurrGradeId='.$Gr; }
 elseif($Dp>0 && $Gr=='All'){ $qry='p.HR_Curr_DepartmentId='.$Dp; }
}
elseif($Dp=='All')
{
 if($Te>0)
 {
  if($Te>0 && $Gr>0){ $qry='(p.Rev2_EmployeeID='.$Te.' OR p.EmployeeID='.$Te.') AND p.HR_CurrGradeId='.$Gr; }
  elseif($Te>0 && $Gr=='All'){ $qry='(p.Rev2_EmployeeID='.$Te.' OR p.EmployeeID='.$Te.')'; }
 }
 elseif($Tr>0)
 {
  if($Tr>0 && $Gr>0){ $qry='p.Reviewer_EmployeeID='.$Tr.' AND p.HR_CurrGradeId='.$Gr; }
  elseif($Tr>0 && $Gr=='All'){ $qry='p.Reviewer_EmployeeID='.$Tr; }
 }
 elseif($Dp=='All' && $Gr>0){ $qry='p.HR_CurrGradeId='.$Gr; }
 elseif($Dp=='All' && $Gr=='All'){ $qry='1=1'; } 
}
else{ $qry='1=1'; }

$sTPrCtc=mysql_query("select sum(VP_GrossPaid) as VP_GrossPaid from hrm_employee_pms p inner join hrm_employee e on p.EmployeeID=e.EmployeeID inner join hrm_employee_general g on p.EmployeeID=g.EmployeeID where e.EmpStatus='A' AND g.DateJoining<='".$_SESSION['AllowDoj']."' AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.Hod_TotalFinalRating>2.7 AND p.HOD_EmployeeID=".$EmployeeId." AND ".$qry."", $con); $rTPrCtc=mysql_fetch_assoc($sTPrCtc);

$Mprodata=0; $Mactual=0; $Mctc=0; $Mcorr=0; $Mcorr_per=0; $Minc=0; $Mtotctc=0; $Mtotctc_per=0;
if($row>0)
{
  if($rRcd['typeid']=='main')
  {
   $TPP_MPer=$rRcd['pp_per']; $TPP_MAmt=$rRcd['pp_amt'];
  }  
}
 

?>
</thead>
</div>
<tr style="background-color:#CBFF97;height:30px;">
 <td class="tdl" colspan="7" style="border-right:hidden;">&nbsp;&nbsp;
 
 <?php if(($_REQUEST['FilD']>0 OR $_REQUEST['TeE']>0) AND $_REQUEST['FilS']=='All'){ ?>

	<input type="button" style="width:100px;background-color:#F7B52D;" onClick="FunDataSave(<?=$EmployeeId.','.$_SESSION['PmsYId']?>)" value="Save"/>
	&nbsp;&nbsp;
	<a href="#" onClick="FunExpFormat(<?=$_SESSION['PmsYId'].','.$EmployeeId.','.$CompanyId?>,'<?=$_REQUEST['FilD']?>','<?=$_REQUEST['TeE']?>','<?=$_REQUEST['TrE']?>','<?=$_REQUEST['FilS']?>')"><input type="button" id="ExportBtn" style="width:140px;background-color:#F7B52D;" value="Export Data" <?php if($row==0){echo 'disabled';}?>/></a>
	
 <?php }elseif($_REQUEST['FilD']=='All' AND $_REQUEST['TeE']=='All' AND $_REQUEST['FilS']=='All'){ ?> 
	<?php $sql2Rcd=mysql_query("select * from hrm_pp_workingsheet where hodid=".$EmployeeId." AND yearid=".$_SESSION['PmsYId']." AND typeid='emp'",$con); $roow=mysql_num_rows($sql2Rcd); ?>
	<a href="#" onClick="FunExpAllFormat(<?=$_SESSION['PmsYId'].','.$EmployeeId.','.$CompanyId?>,'<?=$_REQUEST['FilD']?>','<?=$_REQUEST['TeE']?>','<?=$_REQUEST['TrE']?>','<?=$_REQUEST['FilS']?>')"><input type="button" id="ExportBtn" style="width:140px;background-color:#F7B52D;" value="Export Data" <?php if($roow==0){echo 'disabled';}?>/></a>&nbsp;&nbsp;
 <?php } ?>		
 
 </td>
 <td class="tdr" style="border-left:hidden;"><b>Total:</b>&nbsp;</td>
 <td class="tdc" style="background-color:#B5FF6A;"><input class="tdccT" id="VP_GrossPaid" value="<?=floatval($rTPrCtc['VP_GrossPaid'])?>" readOnly style="font-size:12px;font-weight:bold;text-align:right;padding-right:2px;"/></td>
 
 <td class="tdc" style="background-color:#F7B52D;"><input class="tdccT" id="TPP_Per" value="<?=$TPP_MPer?>" readOnly style="font-size:12px;font-weight:bold;background-color:#F7B52D;"/></td>
 <td class="tdc" style="background-color:#B5FF6A;"><input class="tdccT" id="TPP_Amt" value="<?=$TPP_MAmt?>" readOnly style="font-size:12px;font-weight:bold;text-align:right;padding-right:2px;"/></td>
</tr>


<?php 
$prorata=0; $lgc=1; $yy=0; $mm=0; $dd=0;
$Prev_From_EffDate=date("Y-m-d",strtotime('-1 day', strtotime($_SESSION['EffDate'])));
$EffDM=date("m-d",strtotime($_SESSION['EffDate']));                             // $_SESSION['EffDate']=2021-01-01  
$MinMD=date("m-d",strtotime($Prev_From_EffDate));                    // $Prev_From_EffDate=2019-12-31, $MinMD=12-31 
$ExtraOneD=date("Y-m-d",strtotime('+1 day', strtotime($_SESSION['AllowDoj'])));  // $_SESSION['AllowDoj']=2020-06-30
$ExtraOneMD=date("m-d",strtotime($ExtraOneD));                                   //07-01
$PrvY=date("Y",strtotime($_SESSION['AllowDoj']));                                //2020
$PrvMD=date("m-d",strtotime($_SESSION['AllowDoj']));                             //06-30
$cY=$PrvY; 
$pY=$PrvY-1;

$sql=mysql_query("select e.EmployeeID, EmpCode, concat(Fname, ' ', Sname, ' ', Lname) as FullName, DateJoining, g.EmpVertical, g.EmpSection, DepartmentCode, DesigName, DesigCode, GradeValue, EmpPmsId, VP_GrossPaid, VP_Indv_Per, VP_Final_Per, VP_PayAmt, Hod_TotalFinalScore, Hod_TotalFinalRating, Hod_EmpDesignation, Hod_EmpGrade, HR_CurrGradeId, HR_Curr_DepartmentId from hrm_employee_pms p inner join hrm_employee e on p.EmployeeID=e.EmployeeID inner join hrm_employee_general g on p.EmployeeID=g.EmployeeID left join hrm_department d on g.DepartmentId=d.DepartmentId left join hrm_designation de on g.DesigId=de.DesigId inner join hrm_grade gr on g.GradeId=gr.GradeId inner join hrm_headquater hq on g.HqId=hq.HqId where e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND g.DateJoining<='".$_SESSION['AllowDoj']."' AND p.AssessmentYear=".$_SESSION['PmsYId']." AND p.Hod_TotalFinalRating>2.7 AND p.HOD_EmployeeID=".$EmployeeId." AND ".$qry." ".$ordby, $con); 
$sno=1; while($res=mysql_fetch_array($sql)){ ?> 	    
<div class="tbody">  
<tbody> 
<tr id="TR<?=$sno?>" style="background-color:<?php if($Eactual==0){echo '#E5E5E5';}else{echo '#FFFFFF';}?>">
 <input type="hidden" id="empid_<?=$sno?>" value="<?=$res['EmployeeID']?>" />
 <input type="hidden" id="pmsid_<?=$sno?>" value="<?=$res['EmpPmsId']?>" />
 <input type="hidden" id="gp_<?=$sno?>" value="<?=intval($res['VP_GrossPaid'])?>"/>
 <input type="hidden" id="rating_<?=$sno?>" value="<?=floatval($res['Hod_TotalFinalRating'])?>"/>
 <td class="tdc"><?=$sno?></td>
 <td class="tdc"><?=$res['EmpCode']?></td>
 <td class="tdl"><?=$res['FullName']?></td>
 <td class="tdc"><?=date("M-y",strtotime($res['DateJoining']))?></td>
 
 <td class="tdl"><?=$res['DepartmentCode']?></td>
 <td class="tdl"><?=$res['DesigName']?></td>
 <td class="tdc"><?=$res['GradeValue']?></td>
 <td class="tdc"><b><?=floatval($res['Hod_TotalFinalRating'])?></b></td>
 <td class="tdr" style="padding-right:1px;"><b><?=intval($res['VP_GrossPaid'])?></b>&nbsp;</td>
 
 <td class="tdc"><input class="tdcci" id="PP_Per<?=$sno?>" value="<?=$res['VP_Final_Per']?>" maxlength="12" onKeyPress="return isNumberKey(event)" onChange="EmpCalRw(this.value,<?=$sno.','.intval($res['VP_GrossPaid'])?>)" onKeyUp="EmpCalRw(this.value,<?=$sno.','.intval($res['VP_GrossPaid'])?>)" onKeyDown="EmpCalRw(this.value,<?=$sno.','.intval($res['VP_GrossPaid'])?>)" style="font-size:12px;"/>
 </td>
 
 <td class="tdc"><input class="tdcc" id="PP_Amt<?=$sno?>" value="<?=$res['VP_PayAmt']?>" readOnly style="font-size:12px; font-weight:bold;background-color:#B5FF6A;text-align:right;padding-right:2px;" readonly/></td>
 
</tr>
</tbody>
</div>
<?php $sno++; } $TotRow=$sno-1; //while close ?>
<input type="hidden" id="TotRow" name="TotRow" value="<?=$TotRow?>"	/>	   
		   
			 </table>
			</td>
			
		  </tr>			
		  
	     </td>
	    </tr>
	   </table>
	   </span>		
	   </td>
       <?php //************************************************ Close ******************************// ?>
	   <?php //************************************************ Close ******************************// ?>	  	   
	  </tr>
     </table>
     </td>
    </tr>
   </table>
   </td>
<?php /****************************************** Form Close **************************/ ?>		   
  </tr>
 </table>
 </td>
</tr>
<?php //******************************************** ?>    
  </table>
 </td>
</tr>					
<?php //************************************ Close ************************************* ?>					
				  </table>
				 </td>
			  </tr>
			</table>
           </td>
			  </tr>
	        </table>
<?php //******************************************************************************* ?>
		   </td>
		  </tr>
		</table>
	  </td>
	</tr>
	<tr>
	  <td valign="top">
	    <?php //require_once("../footer.php"); ?>
	  </td>
	</tr>
  </table>
 </td>
</tr>
</table>
</body>
</html>