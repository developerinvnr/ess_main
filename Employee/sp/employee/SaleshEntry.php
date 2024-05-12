<?php session_start();
if($_SESSION['login'] = true){require_once('../user/config/config.php');}
include("../function.php");
if(check_user()==false){header('Location:../../../index.php');}
$EmployeeId=$_SESSION['EmployeeID'];
?>

<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<link rel="stylesheet" type="text/css" href="src/css/jscal2.css"/>
<link rel="stylesheet" type="text/css" href="src/css/border-radius.css"/>
<link rel="stylesheet" type="text/css" href="src/css/steel/steel.css"/>
<script type="text/javascript" src="src/js/jscal2.js"></script>
<script type="text/javascript" src="src/js/lang/en.js"></script>
<script type="text/javascript" src="js/stuHover.js"></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<style> /*background-color:#D9D9FF;  background-color:#EEEEEE; */
.fontButton { background-color:#7a6189; color:#009393;font-family:Georgia;font-size:13px;}
.SaveButton {background-image:url(images/save.gif);width:20px;height:20px;background-repeat:no-repeat;background-color:#FFFFFF;border-color:#FFFFFF;border-bottom:inherit;}
.EditSelect { font-family:Georgia; font-size:12px;height:18px;}
.EditInput { font-family:Georgia; font-size:12px;height:18px;}
.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}
.InputB{font-size:13px;width:60px;text-align:right;border:0px;font-weight:bold;background-color:#D9D9FF;} 
.Input{font-size:13px;width:60px;text-align:right;border:0px;background-color:#EEEEEE;}
.TInput{font-size:13px;width:60px;text-align:right;border:0px;background-color:#FFFFA6;font-weight:bold;}
.Trh60{text-align:center;width:60px;font-weight:bold;}
</style>
<Script type="text/javascript">//window.history.forward(1);</Script> 
<script type="text/javascript" language="javascript">
function ChangeHq(hq,v)
{ 
  var act=document.getElementById("act").value; //var hq=document.getElementById("hq").value; 
  var q=document.getElementById("q").value; var cc=document.getElementById("cc").value; var di=document.getElementById("di").value;
  var gi=document.getElementById("gi").value; var EHq=document.getElementById("EHq").value; var ii=document.getElementById("ii").value; 
  var fc=document.getElementById("fc").value; var vc=document.getElementById("vc").value; 
  var myh=1; var myt=document.getElementById("myt").value; 
  window.location="SaleshEntry.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&act="+act+"&hq="+hq+"&y="+v+"&q="+q+"&ii="+ii+"&vc="+vc+"&fc="+fc+"&cc="+cc+"&di="+di+"&gi="+gi+'&EHq='+EHq+'&myh='+myh+'&myt='+myt; 
}

function ChangeTeam(hq,v,gv)
{
  var act=document.getElementById("act").value; //var hq=document.getElementById("hq").value; 
  var q=document.getElementById("q").value; var cc=document.getElementById("cc").value; var di=document.getElementById("di").value;
  var gi=document.getElementById("gi").value; var EHq=document.getElementById("EHq").value; var ii=document.getElementById("ii").value; 
  var fc=document.getElementById("fc").value; var vc=document.getElementById("vc").value;
  var myh=document.getElementById("myh").value; var myt=1;
  window.location="SaleshEntryMt.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&act="+act+"&hq="+hq+"&y="+v+"&q="+q+"&ii="+ii+"&vc="+vc+"&fc="+fc+"&cc="+cc+"&di="+di+"&gi="+gi+'&EHq='+EHq+'&myh='+myh+'&myt='+myt; 
  
  //if(gv=='M2' || gv=='M3'){
  //window.location="SalesaEntryMt.php?act="+act+"&hq="+hq+"&y="+v+"&q="+q+"&ii="+ii+"&vc="+vc+"&fc="+fc+"&cc="+cc+"&di="+di+"&gi="+gi+'&EHq='+EHq+'&myh='+myh+'&myt='+myt; }
  //else if(gv=='M4' || gv=='M5'){
  //window.location="SalesaEntryMtRm.php?act="+act+"&hq="+hq+"&y="+v+"&q="+q+"&ii="+ii+"&vc="+vc+"&fc="+fc+"&cc="+cc+"&di="+di+"&gi="+gi+'&EHq='+EHq+'&myh='+myh+'&myt='+myt; }
}

function ChangePerMi(hq,v)
{
  var act=document.getElementById("act").value; //var hq=document.getElementById("hq").value; 
  var q=document.getElementById("q").value; var cc=document.getElementById("cc").value; var di=document.getElementById("di").value;
  var gi=document.getElementById("gi").value; var EHq=document.getElementById("EHq").value; var ii=document.getElementById("ii").value; 
  var fc=document.getElementById("fc").value; var vc=document.getElementById("vc").value;
  var myh=document.getElementById("myh").value; var myt=1;
  window.location="SaleshEntryPerMi.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&act="+act+"&hq="+hq+"&y="+v+"&q="+q+"&ii="+ii+"&vc="+vc+"&fc="+fc+"&cc="+cc+"&di="+di+"&gi="+gi+'&EHq='+EHq+'&myh='+myh+'&myt='+myt; 
}

function ChangeItem(ii,v)
{  
  var act=document.getElementById("act").value; var hq=document.getElementById("hq").value; var y=document.getElementById("y").value;
  var q=document.getElementById("q").value; var cc=document.getElementById("cc").value; var di=document.getElementById("di").value;
  var gi=document.getElementById("gi").value; var EHq=document.getElementById("EHq").value; 
  var myh=document.getElementById("myh").value; var myt=document.getElementById("myt").value;
  if(ii==0 && v=='vc'){alert("please select vegitable crop item"); return false;}
  else if(ii==0 && v=='fc'){alert("please select field crop item"); return false;}
  else if(ii>0 && v=='vc'){window.location="SaleshEntry.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&act="+act+"&hq="+hq+"&y="+y+"&q="+q+"&ii="+ii+"&vc=1&fc=0&cc="+cc+"&di="+di+"&gi="+gi+"&EHq="+EHq+"&myh="+myh+"&myt="+myt; }
  else if(ii>0 && v=='fc'){window.location="SaleshEntry.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&act="+act+"&hq="+hq+"&y="+y+"&q="+q+"&ii="+ii+"&vc=0&fc=1&cc="+cc+"&di="+di+"&gi="+gi+"&EHq="+EHq+"&myh="+myh+"&myt="+myt; }
  else if(ii=='All_2' && v=='fc'){window.location="SaleshEntry.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&act="+act+"&hq="+hq+"&y="+y+"&q="+q+"&ii="+ii+"&vc=0&fc=1&cc="+cc+"&di="+di+"&gi="+gi+"&EHq="+EHq+"&myh="+myh+"&myt="+myt; }
  
}

function ChangeYear(v)
{  
  var act=document.getElementById("act").value; var hq=document.getElementById("hq").value; 
  var q=document.getElementById("q").value; var cc=document.getElementById("cc").value; var di=document.getElementById("di").value;
  var gi=document.getElementById("gi").value; var EHq=document.getElementById("EHq").value; var ii=document.getElementById("ii").value; 
  var fc=document.getElementById("fc").value; var vc=document.getElementById("vc").value;
  var myh=document.getElementById("myh").value; var myt=document.getElementById("myt").value;
  window.location="SaleshEntry.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&act="+act+"&hq="+hq+"&y="+v+"&q="+q+"&ii="+ii+"&vc="+vc+"&fc="+fc+"&cc="+cc+"&di="+di+"&gi="+gi+"&EHq="+EHq+"&myh="+myh+"&myt="+myt; 
}
function ChangeQtr(v)
{  
  var act=document.getElementById("act").value; var hq=document.getElementById("hq").value; var y=document.getElementById("y").value;
  var ii=document.getElementById("ii").value; var cc=document.getElementById("cc").value; var di=document.getElementById("di").value;
  var gi=document.getElementById("gi").value; var EHq=document.getElementById("EHq").value; 
  var fc=document.getElementById("fc").value; var vc=document.getElementById("vc").value;
  var myh=document.getElementById("myh").value; var myt=document.getElementById("myt").value;
   window.location="SaleshEntry.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&act="+act+"&hq="+hq+"&y="+y+"&q="+v+"&ii="+ii+"&vc="+vc+"&fc="+fc+"&cc="+cc+"&di="+di+"&gi="+gi+"&EHq="+EHq+"&myh="+myh+"&myt="+myt;
}

function SalesTeam(hq,v,gv)
{
  var act=document.getElementById("act").value; //var hq=document.getElementById("hq").value; 
  var q=document.getElementById("q").value; var cc=document.getElementById("cc").value; var di=document.getElementById("di").value;
  var gi=document.getElementById("gi").value; var EHq=document.getElementById("EHq").value; var ii=document.getElementById("ii").value; 
  var fc=document.getElementById("fc").value; var vc=document.getElementById("vc").value;
  var myh=document.getElementById("myh").value; var myt=1;
  window.location="SalesTeam.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&act="+act+"&hq="+hq+"&y="+v+"&q="+q+"&ii="+ii+"&vc="+vc+"&fc="+fc+"&cc="+cc+"&di="+di+"&gi="+gi+'&EHq='+EHq+'&myh='+myh+'&myt='+myt+'&crop=0';  
  
}

</script>  
</head>
<body class="body">   
<table class="table">
<tr>
 <td>
 <table class="menutable"><tr><td><?php if($_SESSION['login'] = true){ require_once("EMenu.php"); } ?></td></tr></table> 
 </td>
</tr>
<tr>
 <td>
  <table width="100%" style="margin-top:0px;">
    <tr>
	  <td valign="top"><?php if($_SESSION['login'] = true){ require_once("EWelcome.php"); } ?></td>
	</tr>
	 <tr>
	  <td valign="top">
	     <table border="0" style="width:100%; height:380px; float:none;" cellpadding="0">
		  <tr>
		   <td valign="top"> 
		   
<?php //*************************************************************************************************************************************************** ?>	   
		     <table border="0" id="Activity">
			  <tr>
			     <td id="Anni" valign="top" style="width:5px;"></td>
				 <td colspan="2" width="100%" valign="top">
				  <table border="0">
<?php //*************************************************************** Start ******************************************************************************** ?>		
<?php $SpP=mysql_query("select GradeId,DepartmentId,HqId from hrm_employee_general where EmployeeID=".$EmployeeId, $con); $resSpP=mysql_fetch_assoc($SpP); ?>		
<input type="hidden" name="ComId" id="ComId" value="<?php echo $CompanyId; ?>" /><input type="hidden" id="EmpId" name="EmpId" value="<?php echo $EmployeeId; ?>" />
<input type="hidden" id="act" value="<?php echo $_REQUEST['act']; ?>" /><input type="hidden" name="y" id="y" value="<?php echo $_REQUEST['y']; ?>" />
<input type="hidden" name="hq" id="hq" value="<?php echo $_REQUEST['hq']; ?>" /><input type="hidden" name="q" id="q" value="<?php echo $_REQUEST['q']; ?>" />
<input type="hidden" name="vc" id="vc" value="<?php echo $_REQUEST['vc']; ?>" /><input type="hidden" name="fc" id="fc" value="<?php echo $_REQUEST['fc']; ?>" />
<input type="hidden" id="di" value="<?php echo $_REQUEST['di']; ?>" /><input type="hidden" id="gi" value="<?php echo $_REQUEST['gi']; ?>" />
<input type="hidden" id="cc" value="<?php echo $_REQUEST['cc']; ?>" /><input type="hidden" id="ActThought" value="0" />
<input type="hidden" id="ii" value="<?php echo $_REQUEST['ii']; ?>" /><input type="hidden" id="EHq" value="<?php echo $_REQUEST['EHq']; ?>" /> 
<input type="hidden" id="TotAValueM" value="" /><input type="hidden" id="TotBValueM" value="" /><input type="hidden" id="TotCValueM" value="" />
<input type="hidden" id="DealerId" value="" /><input type="hidden" id="Sno" value="" /><input type="hidden" id="SelTerr" value="<?php echo $_REQUEST['SelTerr']; ?>" />
<input type="hidden" id="myh" value="<?php echo $_REQUEST['myh']; ?>" />
<input type="hidden" id="myt" value="<?php echo $_REQUEST['myt']; ?>" /><input type="hidden" id="HqV" value="<?php echo $_REQUEST['hq']; ?>" />
<?php $SpP=mysql_query("select Fname,Sname,Lname,GradeId,DepartmentId,HqId,Gender,DR,Married from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee_general.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee.EmployeeID=".$EmployeeId, $con);  $resSpP=mysql_fetch_assoc($SpP); $SpPDept=$resSpP['DepartmentId']; $SpGradeP=$resSpP['GradeId']; 
if($resSpP['DR']=='Y'){$Me='Dr.';} elseif($resSpP['Gender']=='M'){$Me='Mr.';} elseif($resSpP['Gender']=='F' AND $resSpP['Married']=='Y'){$Me='Mrs.';} elseif($resSpP['Gender']=='F' AND $resSpP['Married']=='N'){$Me='Miss.';} 
$SpEGr=mysql_query("select GradeValue from hrm_grade where GradeId=".$resSpP['GradeId']." AND CompanyId=".$CompanyId, $con); $resSpEGr=mysql_fetch_assoc($SpEGr);
$sqlCPerMi=mysql_query("select EditPerMi from hrm_sales_reporting_level where EmployeeID=".$EmployeeId,$con); $resCPerMi=mysql_fetch_assoc($sqlCPerMi); ?>
<tr>
 <td colspan="5"> 	 
  <table border="0">
  <tr>
   <td>
     <table border="0">
	  <tr>
	   <td>
	    <table border="0">
		 <tr>	 
<td align="center"><img src="images/PlannerH.png" border="0" style="height:40px;width:150px;"/></td>
<?php if($_REQUEST['act']>0){ ?>
<td>&nbsp;</td>
<td align="center" valign="bottom">
<a href="#" onClick="ChangeTeam(<?php echo $resSpP['HqId'].', '.$_REQUEST['y']; ?>,'<?php echo $resSpEGr['GradeValue']; ?>')"><img src="images/Myteam.png" border="0" style="height:30px;width:130px;"  /></a>
</td>
<td>&nbsp;</td><td align="center" valign="bottom">
<a href="#" onClick="ChangePerMi(<?php echo $resSpP['HqId'].', '.$_REQUEST['y']; ?>)"><img src="images/Permission.png" border="0" style="height:30px;width:130px;" /></a>
</td>
<?php } ?> 
<?php if($resSpEGr['GradeValue']=='MG'){ ?>
<td>&nbsp;</td><td align="center" valign="bottom">
<a href="#" onClick="SalesTeam(<?php echo $resSpP['HqId'].', '.$_REQUEST['y']; ?>,'<?php echo $resSpEGr['GradeValue']; ?>')"><img src="images/SalesTeam.png" border="0" style="height:30px;width:130px;" /></a>
</td>
<?php } ?> 
  
<td>&nbsp;</td>		
<input type="hidden" id="TerId" value="<?php echo $EmployeeId; ?>" /><input type="hidden" id="StaId" value="<?php echo $EmployeeId; ?>" />
<input type="hidden" id="RepTerId" value="<?php echo $EmployeeId; ?>" />	
<input type="hidden" id="HqV" value=<?php echo $_REQUEST['hq']; ?> />
<input type="hidden" id="CheckEntry" value="O" />
<?php 
$sqls=mysql_query("select RepEmployeeID from hrm_employee_general where EmployeeID=".$EmployeeId, $con); $ress=mysql_fetch_assoc($sqls); 
$sqlsA=mysql_query("select GradeId from hrm_employee_general where EmployeeId=".$ress['RepEmployeeID'], $con); $ressA=mysql_fetch_assoc($sqlsA); 
if($ressA['GradeId']==72 OR $ressA['GradeId']==73 OR $ressA['GradeId']==74 OR $ressA['GradeId']==75)
{ echo '<input type="hidden" id="ZonId" value="'.$ress['RepEmployeeID'].'" />'; echo '<input type="hidden" id="CouId" value="0" />';}
elseif($ressA['GradeId']==76 OR $ressA['GradeId']==77)
{ echo '<input type="hidden" id="ZonId" value="0" />'; echo '<input type="hidden" id="CouId" value="'.$ress['RepEmployeeID'].'" />';}
elseif($ressA['GradeId']==68 OR $ressA['GradeId']==69 OR $ressA['GradeId']==70 OR $ressA['GradeId']==71)
{ $sqls2=mysql_query("select RepEmployeeID from hrm_employee_general where EmployeeID=".$ress['RepEmployeeID'], $con); $ress2=mysql_fetch_assoc($sqls2); 
  $sqls2A=mysql_query("select GradeId from hrm_employee_general where EmployeeId=".$ress2['RepEmployeeID'], $con); $ress2A=mysql_fetch_assoc($sqls2A); 
  if($ress2A['GradeId']==72 OR $ress2A['GradeId']==73 OR $ress2A['GradeId']==74 OR $ress2A['GradeId']==75)
  { echo '<input type="hidden" id="ZonId" value="'.$ress2['RepEmployeeID'].'" />'; echo '<input type="hidden" id="CouId" value="0" />';}
  elseif($ressA['GradeId']==76 OR $ressA['GradeId']==77)
  { echo '<input type="hidden" id="ZonId" value="0" />'; echo '<input type="hidden" id="CouId" value="'.$ress3['RepEmployeeID'].'" />';}
  elseif($ress2A['GradeId']==68 OR $ress2A['GradeId']==69 OR $ress2A['GradeId']==70 OR $ress2A['GradeId']==71)
  { $sqls3=mysql_query("select RepEmployeeID from hrm_employee_general where EmployeeID=".$ress2['RepEmployeeID'], $con); $ress3=mysql_fetch_assoc($sqls3); 
    $sqls3A=mysql_query("select GradeId from hrm_employee_general where EmployeeId=".$ress3['RepEmployeeID'], $con); $ress3A=mysql_fetch_assoc($sqls3A); 
    if($ress3A['GradeId']==72 OR $ress3A['GradeId']==73 OR $ress3A['GradeId']==74 OR $ress3A['GradeId']==75)
    { echo '<input type="hidden" id="ZonId" value="'.$ress3['RepEmployeeID'].'" />'; echo '<input type="hidden" id="CouId" value="0" />';}
    elseif($ressA['GradeId']==76 OR $ressA['GradeId']==77)
    { echo '<input type="hidden" id="ZonId" value="0" />'; echo '<input type="hidden" id="CouId" value="'.$ress3['RepEmployeeID'].'" />';}
  }
}

?>
<?php 
$Ymin1=$_REQUEST['y']-1; $Ymin2=$_REQUEST['y']-2;
$sUpy=mysql_query("select FromDate,ToDate from hrm_sales_year where YearId=".$YearId, $con); $rUpy=mysql_fetch_assoc($sUpy);
$sYmin1=mysql_query("select FromDate,ToDate from hrm_sales_year where YearId=".$Ymin1, $con); $rYmin1=mysql_fetch_assoc($sYmin1);
$sYmin2=mysql_query("select FromDate,ToDate from hrm_sales_year where YearId=".$Ymin2, $con); $rYmin2=mysql_fetch_assoc($sYmin2);
$FUpy=date("Y",strtotime($rUpy['FromDate'])); $TUpy=date("Y",strtotime($rUpy['ToDate']));
$FYmin1=date("Y",strtotime($rYmin1['FromDate'])); $TYmin1=date("Y",strtotime($rYmin1['ToDate']));
$FYmin2=date("Y",strtotime($rYmin2['FromDate'])); $TYmin2=date("Y",strtotime($rYmin2['ToDate']));
?>
	<td style="font-family:Times New Roman;font-size:14px;font-weight:bold;display:none;" valign="bottom">Year:</b><select style="font-family:Times New Roman;font-size:14px;width:90px;background-color:#E4E0FC;height:23px;font-weight:bold;" id="YearV" onChange="ChangeYear(this.value)">
<?php $sqlye=mysql_query("select YearId,FromDate,ToDate from hrm_sales_year where YearId=".$_REQUEST['y'], $con); $resye=mysql_fetch_assoc($sqlye); 
      $FFromDate=date("Y",strtotime($resye['FromDate'])); $TToDate=date("Y",strtotime($resye['ToDate'])); ?>
		 <option value="<?php echo $resye['YearId']; ?>" selected><?php echo $FFromDate.'-'.$TToDate; ?></option>
<?php if($_REQUEST['y']==$YearId){?><option value="<?php echo $Ymin1; ?>"><?php echo $FYmin1.'-'.$TYmin1; ?></option>
<option value="<?php echo $Ymin2; ?>"><?php echo $FYmin2.'-'.$TYmin2; ?></option>
<?php } elseif($_REQUEST['y']!=$YearId) { ?><option value="<?php echo $YearId; ?>"><?php echo $FUpy.'-'.$TUpy; ?></option>
<?php if($_REQUEST['y']!=$Ymin1){?><option value="<?php echo $Ymin1; ?>"><?php echo $FYmin1.'-'.$TYmin1; ?></option><?php } ?>
<?php if($_REQUEST['y']!=$Ymin2){?><option value="<?php echo $Ymin2; ?>"><?php echo $FYmin2.'-'.$TYmin2; ?></option><?php } } ?></select>		
	
<?php /* $sqly=mysql_query("select FromDate,ToDate from hrm_year where YearId=".$_REQUEST['y'], $con); $resy=mysql_fetch_assoc($sqly); 
      $fromdate=date("Y",strtotime($resy['FromDate'])); $todate=date("Y",strtotime($resy['ToDate'])); 
	  $NextYear=$_REQUEST['y']+1; $PrevYear=$_REQUEST['y']-1; 
	  $sqly2=mysql_query("select FromDate,ToDate from hrm_year where YearId=".$NextYear, $con); $resy2=mysql_fetch_assoc($sqly2);
	  $sqly3=mysql_query("select FromDate,ToDate from hrm_year where YearId=".$PrevYear, $con); $resy3=mysql_fetch_assoc($sqly3); ?>		
 <option value="<?php echo $_REQUEST['y']; ?>" selected><?php echo $fromdate.'-'.$todate; ?></option>
 <?php if($PrevYear>=1){?><option value="<?php echo $PrevYear; ?>"><?php echo date("Y",strtotime($resy3['FromDate'])).'-'.date("Y",strtotime($resy3['ToDate'])); ?></option><?php } ?>
 <option value="<?php echo $NextYear; ?>"><?php echo date("Y",strtotime($resy2['FromDate'])).'-'.date("Y",strtotime($resy2['ToDate'])); ?></option></select>
 */ ?>
	</td>
	<td>&nbsp;</td>
	<td id="" style="font-family:Times New Roman;font-size:14px;font-weight:bold;display:none;" valign="bottom">Quarter:</b><select style="font-family:Times New Roman;font-size:14px;width:80px;background-color:#C4FFC4;height:23px;font-weight:bold;" id="QtrV" onChange="ChangeQtr(this.value)">
	<option value="<?php echo $_REQUEST['q']; ?>" selected><?php echo 'Qtr-0'.$_REQUEST['q']; ?></option> 
<?php if($_REQUEST['q']==1){ ?>	<option value="2">Qtr-02</option><option value="3">Qtr-03</option><option value="4">Qtr-04</option>
<?php } elseif($_REQUEST['q']==2){ ?><option value="3">Qtr-03</option><option value="4">Qtr-04</option><option value="1">Qtr-01</option>
<?php } elseif($_REQUEST['q']==3){ ?><option value="4">Qtr-04</option><option value="1">Qtr-01</option><option value="2">Qtr-02</option>
<?php } elseif($_REQUEST['q']==4){ ?><option value="1">Qtr-01</option><option value="2">Qtr-02</option><option value="3">Qtr-03</option><?php } ?></select>  
    </td>
	<td>&nbsp;</td>
	<td style="font-family:Times New Roman;font-size:14px;font-weight:bold;display:none;" valign="bottom">VC:</b><select style="font-family:Times New Roman;font-size:14px;width:140px;background-color:#C4FFC4;height:23px;font-weight:bold;" id="ItemV" onChange="ChangeItem(this.value,'vc')">
<?php if($_REQUEST['vc']!=0){$sqlI=mysql_query("select ItemName from hrm_sales_seedsitem where ItemId=".$_REQUEST['ii'], $con); $resI=mysql_fetch_assoc($sqlI);?>	
    <option value="<?php echo $_REQUEST['ii']; ?>" selected><?php echo strtoupper($resI['ItemName']); ?></option><?php }else{ ?><option value="0" selected>SELECT</option><?php } ?>
<?php $sqlItem=mysql_query("select * from hrm_sales_seedsitem where GroupId=1 order by ItemName ASC", $con); while($resItem=mysql_fetch_assoc($sqlItem)){ ?> 
    <option value="<?php echo $resItem['ItemId']; ?>"><?php echo $resItem['ItemName']; ?></option><?php } /* ?><option value="All_1"> --- All ---</option><?php */ ?></select>
	<input type="hidden" id="ValueItem" value="<?php echo $_REQUEST['ii']; ?>" /> 
	<input type="hidden" id="ValueName" value="<?php if($_REQUEST['vc']>0){echo 'vc';}elseif($_REQUEST['fc']>0){echo 'fc';} ?>" />	
    </td>
	<td>&nbsp;</td>
	<td style="font-family:Times New Roman;font-size:14px;font-weight:bold;display:none;" valign="bottom">FC:</b> <select style="font-family:Times New Roman;font-size:14px;width:140px;background-color:#E4E0FC;height:23px;font-weight:bold;" id="ItemV2" onChange="ChangeItem(this.value,'fc')">
<?php if($_REQUEST['fc']!=0 AND $_REQUEST['ii']!='All_2'){$sqlIf=mysql_query("select ItemName from hrm_sales_seedsitem where ItemId=".$_REQUEST['ii'], $con); $resIf=mysql_fetch_assoc($sqlIf);?><option value="<?php echo $_REQUEST['ii']; ?>" selected><?php echo strtoupper($resIf['ItemName']); ?></option>
<?php } elseif($_REQUEST['fc']!=0 AND $_REQUEST['ii']=='All_2'){?><option value="<?php echo $_REQUEST['ii']; ?>" selected>--- All ---</option>
<?php } else{ ?><option value="0" selected>SELECT</option><?php } ?>
<?php $sqlItemf=mysql_query("select * from hrm_sales_seedsitem where GroupId=2 order by ItemName ASC", $con); while($resItemf=mysql_fetch_assoc($sqlItemf)){ ?> 
 <option value="<?php echo $resItemf['ItemId']; ?>"><?php echo $resItemf['ItemName']; ?></option><?php } ?><option value="All_2"> --- All ---</option></select>
   </td>
   </tr>
 </table>
	   </td>
	  </tr>
<tr><td><span id="DealerHqSpan"></span></td></tr>
  </table>
 </td>
</tr>
<?php /***************************************** Main Page Open **************************************/ ?>

<?php /***************************************** Main Page Close **************************************/ ?>    
	 </table>
   </td>
  </tr>
<?php //*************************************************************** Close ******************************************************************************** ?>
<tr>
 <td id="TDResultId" style="width:3000px;">
  <span id="ResultTDSpan"></span>
  <span id="AddMonthResult"></span>
  <span id="SubSpanMsg"></span>
 </td>
</tr>						
				  </table>
				 </td>
			  </tr>
			</table>
           </td>
			  </tr>
	        </table>
			
<?php //*************************************************************************************************************************************************** ?>
		   </td>
		   
		  </tr>
		</table>
	  </td>
	</tr>
  </table>
 </td>
</tr>
</table>
</body>
</html>

