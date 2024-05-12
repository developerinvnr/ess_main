<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}
if($_SESSION['login'] = true){require_once('PhpFile/DailyAllowanceP.php'); } else {$msg= "Session Expiry..............."; }
if(isset($_POST['SaveEdit']))
{    

	 $SqlUpdate = mysql_query("UPDATE hrm_investdecl_setting set Status='".$_POST['Status']."', B_YearId='".$_POST['By']."', B_Month='".$_POST['BMonth']."', C_YearId='".$_POST['Cy']."', C_Month='".$_POST['CMonth']."', LastDateTime='".date("Y-m-d H:i:s", strtotime($_POST['LastDateTime']))."', ShowB_Form='".$_POST['ShowB_Form']."', PrintB_Form='".$_POST['PrintB_Form']."' WHERE CompanyId=".$CompanyId, $con) or die(mysql_error());
     if($SqlUpdate){ $msg = "Data has been Updeted successfully...";}   
}

if(isset($_POST['SaveEditsb']))
{    
	 $SqlUpdate = mysql_query("UPDATE hrm_investdecl_setting_submission set OpenYN='".$_POST['OpenYNSb']."' WHERE CompanyId=".$CompanyId, $con) or die(mysql_error());
     if($SqlUpdate){ $msgsb = "Submission setting has been Updeted successfully...";}   
}



if(isset($_POST['Fsubmit']))
{ $SqlUpdate = mysql_query("UPDATE hrm_investdecl_setting set HRA='".$_POST['HRA']."', Medical='".$_POST['Medical']."', LTA='".$_POST['LTA']."', CEA='".$_POST['CEA']."', MIP='".$_POST['MIP']."', MTI='".$_POST['MTI']."', MTS='".$_POST['MTS']."', ROL='".$_POST['ROL']."', Handi='".$_POST['Handi']."', PenFun='".$_POST['PenFun']."', LIP='".$_POST['LIP']."', DA='".$_POST['DA']."', PPF='".$_POST['PPF']."', PostOff='".$_POST['PostOff']."', ULIP='".$_POST['ULIP']."', HL='".$_POST['HL']."', MF='".$_POST['MF']."', IB='".$_POST['IB']."', CTF='".$_POST['CTF']."', NHB='".$_POST['NHB']."', NSC='".$_POST['NSC']."', SukS='".$_POST['SukS']."', NPS='".$_POST['NPS']."', EPF='".$_POST['EPF']."', Form16='".$_POST['Form16']."', SPE='".$_POST['SPE']."', PT='".$_POST['PT']."', PFD='".$_POST['PFD']."', IT='".$_POST['IT']."', Form_12C='".$_POST['Form_12C']."', IHL='".$_POST['IHL']."', IL='".$_POST['IL']."' WHERE CompanyId=".$CompanyId, $con) or die(mysql_error());
     if($SqlUpdate){ $msg2 = "Data has been Updeted successfully...";}   
}

if(isset($_POST['FsubmitLimit']))
{ $SqlUpdate = mysql_query("UPDATE hrm_investdecl_setting set MIP_Limit='".$_POST['MIP_Limit']."', MTI_Limit='".$_POST['MTI_Limit']."', MTS_Limit='".$_POST['MTS_Limit']."', ROL_Limit='".$_POST['ROL_Limit']."', Handi_Limit='".$_POST['Handi_Limit']."', PenFun_Limit='".$_POST['PenFun_Limit']."', LIP_Limit='".$_POST['LIP_Limit']."', DA_Limit='".$_POST['DA_Limit']."', PPF_Limit='".$_POST['PPF_Limit']."', PostOff_Limit='".$_POST['PostOff_Limit']."', ULIP_Limit='".$_POST['ULIP_Limit']."', HL_Limit='".$_POST['HL_Limit']."', MF_Limit='".$_POST['MF_Limit']."', IB_Limit='".$_POST['IB_Limit']."', CTF_Limit='".$_POST['CTF_Limit']."', NHB_Limit='".$_POST['NHB_Limit']."', NSC_Limit='".$_POST['NSC_Limit']."', SukS_Limit='".$_POST['SukS_Limit']."', NPS_Limit='".$_POST['NPS_Limit']."', EPF_Limit='".$_POST['EPF_Limit']."', IHL_Limit='".$_POST['IHL_Limit']."', IL_Limit='".$_POST['IL_Limit']."' WHERE CompanyId=".$CompanyId, $con) or die(mysql_error());
  
  $sql=mysql_query("select * from hrm_investdecl_setting_limit where CompanyId=".$CompanyId." AND Period='".$_POST['Lperiod']."' AND Month=".$_POST['Lmonth'], $con);
  $row=mysql_num_rows($sql);
  if($row>0)
  { $SqlUpdate = mysql_query("UPDATE hrm_investdecl_setting_limit set MIP_Limit='".$_POST['MIP_Limit']."', MTI_Limit='".$_POST['MTI_Limit']."', MTS_Limit='".$_POST['MTS_Limit']."', ROL_Limit='".$_POST['ROL_Limit']."', Handi_Limit='".$_POST['Handi_Limit']."', PenFun_Limit='".$_POST['PenFun_Limit']."', LIP_Limit='".$_POST['LIP_Limit']."', DA_Limit='".$_POST['DA_Limit']."', PPF_Limit='".$_POST['PPF_Limit']."', PostOff_Limit='".$_POST['PostOff_Limit']."', ULIP_Limit='".$_POST['ULIP_Limit']."', HL_Limit='".$_POST['HL_Limit']."', MF_Limit='".$_POST['MF_Limit']."', IB_Limit='".$_POST['IB_Limit']."', CTF_Limit='".$_POST['CTF_Limit']."', NHB_Limit='".$_POST['NHB_Limit']."', NSC_Limit='".$_POST['NSC_Limit']."', SukS_Limit='".$_POST['SukS_Limit']."', NPS_Limit='".$_POST['NPS_Limit']."', EPF_Limit='".$_POST['EPF_Limit']."', IHL_Limit='".$_POST['IHL_Limit']."', IL_Limit='".$_POST['IL_Limit']."' WHERE CompanyId=".$CompanyId." AND Period='".$_POST['Lperiod']."' AND Month=".$_POST['Lmonth'], $con) or die(mysql_error()); }
  elseif($row==0)
  {$SqlUpdate = mysql_query("insert into hrm_investdecl_setting_limit(CompanyId, Period, Month, MIP_Limit, MTI_Limit, MTS_Limit, ROL_Limit, Handi_Limit, PenFun_Limit, LIP_Limit, DA_Limit, PPF_Limit, PostOff_Limit, ULIP_Limit, HL_Limit, MF_Limit, IB_Limit, CTF_Limit, NHB_Limit, NSC_Limit, SukS_Limit, NPS_Limit, EPF_Limit, IHL_Limit, IL_Limit) value(".$CompanyId.", '".$_POST['Lperiod']."', ".$_POST['Lmonth'].", '".$_POST['MIP_Limit']."', '".$_POST['MTI_Limit']."', '".$_POST['MTS_Limit']."', '".$_POST['ROL_Limit']."', '".$_POST['Handi_Limit']."', '".$_POST['PenFun_Limit']."', '".$_POST['LIP_Limit']."', '".$_POST['DA_Limit']."', '".$_POST['PPF_Limit']."', '".$_POST['PostOff_Limit']."', '".$_POST['ULIP_Limit']."', '".$_POST['HL_Limit']."', '".$_POST['MF_Limit']."', '".$_POST['IB_Limit']."', '".$_POST['CTF_Limit']."', '".$_POST['NHB_Limit']."', '".$_POST['NSC_Limit']."', '".$_POST['SukS_Limit']."', '".$_POST['NPS_Limit']."', '".$_POST['EPF_Limit']."', '".$_POST['IHL_Limit']."', '".$_POST['IL_Limit']."')", $con) or die(mysql_error()); }
  
  if($SqlUpdate){ $msg3 = "Data has been Updeted successfully...";}   
}

//HRA Medical LTA CEA MIP MTI MTS ROL Handi PenFun LIP DA PPF PostOff ULIP HL MF IB CTF NHB NSC EPF Form16 SPE PT PFD IT Form_12C IHL IL

?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style> .font { color:#ffffff; font-family:Georgia; font-size:11px; width:120px;} .font1 { font-family:"Times New Roman", Times, serif; font-size:11px; width:120px; } 
.font2 { font-size:11px;width:260px;height:18px;} .font4 {color:#1FAD34; font-family:Georgia; font-size:15px;}
.span {display:none; font-family:Courier New; font-size:14px; }.span1 {display:block; font-family:Courier New; font-size:14px; }
.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;}
.SaveButton {background-image:url(images/save.gif); width:20px; height:20px; background-repeat:no-repeat; background-color:#FFFFFF; border-color:#FFFFFF; border-bottom:inherit;}
.TextInput { font-family:"Times New Roman", Times, serif; font-size:11px; width:100px; height:18px;}
.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}
.td1{color:#ffffff;font-family:Times New Roman;font-size:14px;width:120px;text-align:center;}
.td2{color:#000000;font-family:Times New Roman;font-size:14px;width:115px;text-align:center;}
</style>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<script type="text/javascript" src="js/MandatoryAjaxCall.js"></script>
<link rel="stylesheet" type="text/css" href="src/css/jscal2.css"/>
<link rel="stylesheet" type="text/css" href="src/css/border-radius.css"/>
<link rel="stylesheet" type="text/css" href="src/css/steel/steel.css"/>
<script type="text/javascript" src="src/js/jscal2.js"></script>
<script type="text/javascript" src="src/js/lang/en.js"></script>
<Script type="text/javascript">window.history.forward(1);
function edit() { var agree=confirm("Are you sure you want to edit this record?");
if (agree) { var x = "InvetDeclSet.php?action=edit";  window.location=x;}}

function editsb() { var agree=confirm("Are you sure you want to edit submission setting?");
if (agree) { var x = "InvetDeclSet.php?actionsb=editsb";  window.location=x;}}

function edit2() { 
 document.getElementById("HRA").readOnly=false; document.getElementById("Medical").readOnly=false; document.getElementById("LTA").readOnly=false; document.getElementById("CEA").readOnly=false; document.getElementById("MIP").readOnly=false; document.getElementById("MTI").readOnly=false; document.getElementById("MTS").readOnly=false; document.getElementById("ROL").readOnly=false; document.getElementById("Handi").readOnly=false; document.getElementById("PenFun").readOnly=false; document.getElementById("LIP").readOnly=false; document.getElementById("DA").readOnly=false; document.getElementById("PPF").readOnly=false; document.getElementById("PostOff").readOnly=false; document.getElementById("ULIP").readOnly=false; document.getElementById("HL").readOnly=false; document.getElementById("MF").readOnly=false; document.getElementById("IB").readOnly=false; document.getElementById("CTF").readOnly=false; document.getElementById("NHB").readOnly=false; document.getElementById("NSC").readOnly=false; document.getElementById("EPF").readOnly=false; document.getElementById("Form16").readOnly=false; document.getElementById("SPE").readOnly=false; document.getElementById("PT").readOnly=false; document.getElementById("PFD").readOnly=false; document.getElementById("IT").readOnly=false; document.getElementById("Form_12C").readOnly=false; document.getElementById("IHL").readOnly=false; document.getElementById("IL").readOnly=false; 
document.getElementById("SukS").readOnly=false; document.getElementById("NPS").readOnly=false;
 document.getElementById("Fedit").style.display='none'; document.getElementById("Fsubmit").style.display='block';
}

function validateEdit22(formEdit22)
{ 
if(document.getElementById("HRA").value!='N' && document.getElementById("HRA").value!='Y'){alert("Please enter Only Y or N value!"); return false;}
if(document.getElementById("Medical").value!='N' && document.getElementById("Medical").value!='Y'){alert("Please enter Only Y or N value!"); return false;}
if(document.getElementById("LTA").value!='N' && document.getElementById("LTA").value!='Y'){alert("Please enter Only Y or N value!"); return false;}
if(document.getElementById("CEA").value!='N' && document.getElementById("CEA").value!='Y'){alert("Please enter Only Y or N value!"); return false;}
if(document.getElementById("MIP").value!='N' && document.getElementById("MIP").value!='Y'){alert("Please enter Only Y or N value!"); return false;}
if(document.getElementById("MTI").value!='N' && document.getElementById("MTI").value!='Y'){alert("Please enter Only Y or N value!"); return false;}
if(document.getElementById("MTS").value!='N' && document.getElementById("MTS").value!='Y'){alert("Please enter Only Y or N value!"); return false;}
if(document.getElementById("ROL").value!='N' && document.getElementById("ROL").value!='Y'){alert("Please enter Only Y or N value!"); return false;}
if(document.getElementById("Handi").value!='N' && document.getElementById("Handi").value!='Y'){alert("Please enter Only Y or N value!"); return false;}
if(document.getElementById("PenFun").value!='N' && document.getElementById("PenFun").value!='Y'){alert("Please enter Only Y or N value!"); return false;}
if(document.getElementById("LIP").value!='N' && document.getElementById("LIP").value!='Y'){alert("Please enter Only Y or N value!"); return false;}
if(document.getElementById("DA").value!='N' && document.getElementById("DA").value!='Y'){alert("Please enter Only Y or N value!"); return false;}
if(document.getElementById("PPF").value!='N' && document.getElementById("PPF").value!='Y'){alert("Please enter Only Y or N value!"); return false;}
if(document.getElementById("PostOff").value!='N' && document.getElementById("PostOff").value!='Y'){alert("Please enter Only Y or N value!"); return false;}
if(document.getElementById("ULIP").value!='N' && document.getElementById("ULIP").value!='Y'){alert("Please enter Only Y or N value!"); return false;}
if(document.getElementById("HL").value!='N' && document.getElementById("HL").value!='Y'){alert("Please enter Only Y or N value!"); return false;}
if(document.getElementById("MF").value!='N' && document.getElementById("MF").value!='Y'){alert("Please enter Only Y or N value!"); return false;}
if(document.getElementById("IB").value!='N' && document.getElementById("IB").value!='Y'){alert("Please enter Only Y or N value!"); return false;}
if(document.getElementById("CTF").value!='N' && document.getElementById("CTF").value!='Y'){alert("Please enter Only Y or N value!"); return false;}
if(document.getElementById("NHB").value!='N' && document.getElementById("NHB").value!='Y'){alert("Please enter Only Y or N value!"); return false;}
if(document.getElementById("NSC").value!='N' && document.getElementById("NSC").value!='Y'){alert("Please enter Only Y or N value!"); return false;}
if(document.getElementById("SukS").value!='N' && document.getElementById("SukS").value!='Y'){alert("Please enter Only Y or N value!"); return false;}
if(document.getElementById("NPS").value!='N' && document.getElementById("NPS").value!='Y'){alert("Please enter Only Y or N value!"); return false;}
if(document.getElementById("EPF").value!='N' && document.getElementById("EPF").value!='Y'){alert("Please enter Only Y or N value!"); return false;}
if(document.getElementById("Form16").value!='N' && document.getElementById("Form16").value!='Y'){alert("Please enter Only Y or N value!"); return false;}
if(document.getElementById("SPE").value!='N' && document.getElementById("SPE").value!='Y'){alert("Please enter Only Y or N value!"); return false;}
if(document.getElementById("PT").value!='N' && document.getElementById("PY").value!='Y'){alert("Please enter Only Y or N value!"); return false;}
if(document.getElementById("PFD").value!='N' && document.getElementById("PFD").value!='Y'){alert("Please enter Only Y or N value!"); return false;}
if(document.getElementById("IT").value!='N' && document.getElementById("IT").value!='Y'){alert("Please enter Only Y or N value!"); return false;}
if(document.getElementById("Form_12C").value!='N' && document.getElementById("Form_12C").value!='Y'){alert("Please enter Only Y or N value!"); return false;}
if(document.getElementById("IHL").value!='N' && document.getElementById("ILH").value!='Y'){alert("Please enter Only Y or N value!"); return false;}
if(document.getElementById("IL").value!='N' && document.getElementById("IL").value!='Y'){alert("Please enter Only Y or N value!"); return false;} 
var agree=confirm("Are you sure you want to save this record?"); if(agree){ return true; }
}

function edit3() { 
 document.getElementById("MIP_Limit").readOnly=false; document.getElementById("MTI_Limit").readOnly=false; document.getElementById("MTS_Limit").readOnly=false; document.getElementById("ROL_Limit").readOnly=false; document.getElementById("Handi_Limit").readOnly=false; document.getElementById("PenFun_Limit").readOnly=false; document.getElementById("LIP_Limit").readOnly=false; document.getElementById("DA_Limit").readOnly=false; document.getElementById("PPF_Limit").readOnly=false; document.getElementById("PostOff_Limit").readOnly=false; document.getElementById("ULIP_Limit").readOnly=false; document.getElementById("HL_Limit").readOnly=false; document.getElementById("MF_Limit").readOnly=false; document.getElementById("IB_Limit").readOnly=false; document.getElementById("CTF_Limit").readOnly=false; document.getElementById("NHB_Limit").readOnly=false; document.getElementById("NSC_Limit").readOnly=false; document.getElementById("EPF_Limit").readOnly=false; document.getElementById("IHL_Limit").readOnly=false; document.getElementById("IL_Limit").readOnly=false; 
document.getElementById("SukS_Limit").readOnly=false; document.getElementById("NPS_Limit").readOnly=false;
 document.getElementById("FeditLimit").style.display='none'; document.getElementById("FsubmitLimit").style.display='block';
 
  //HRA Medical LTA CEA MIP MTI MTS ROL Handi PenFun LIP DA PPF PostOff ULIP HL MF IB CTF NHB NSC EPF Form16 SPE PT PFD IT Form_12C IHL IL
}

function validateEdit33(formEdit33)
{ var agree=confirm("Are you sure you want to save this record?"); if(agree){ return true; } }


</SCRIPT> 
</head>
<body class="body">
<table class="table">
<tr>
 <td>
  <table class="menutable"><tr><td><?php if($_SESSION['login'] = true){ require_once("AMenu.php"); } ?></td></tr></table>
 </td>
</tr>
<tr>
 <td valign="top">
  <table width="100%" style="margin-top:0px;" border="0">
    <tr><td valign="top"><?php if($_SESSION['login'] = true){ require_once("AWelcome.php"); } ?></td></tr>
	<tr>
	  <td valign="top" align="center"  width="100%" id="MainWindow"><br>
<?php //************************************************************************************************************************************************************?>
<?php //**********************************************START*****START*****START******START******START***************************************************************?>
<?php //************************************************************************************************************************************************************?>
<table border="0" style="margin-top:0px; width:100%; height:300px;">
 <tr>
  <td align="left" height="20" valign="top" colspan="3">
   <table border="0">
    <tr>
	  <td align="right" width="358" class="heading">INVESTMENT DECLARATION SETTING</td>
	  <td class="font4" style="left">&nbsp;&nbsp;&nbsp;<b><?php echo $msg; ?></b></td>
	</tr>
   </table>
  </td>
 </tr>
<?php if(($_SESSION['UserType']=='S' OR $_SESSION['UserType']=='A') AND $_SESSION['login'] = true) { ?>	
 <tr>
 <td style="width:1px;" valign="top" align="center">&nbsp;</td>
 <td width="1">&nbsp;</td>
<?php //*********************************************** Open Menu PMS ******************************************************?> 		
<td align="left" id="type" valign="top" style="display:block; width:100%">             
   <table border="0" width="1200">
   <tr>
	  <td align="left">
	     <table border="1" width="850" border="1" bgcolor="#FFFFFF">
		 <tr bgcolor="#7a6189">
		   <td colspan="2" style="color:#ffffff; font-family:Georgia; font-size:11px;" valign="top" align="center"><b>Back</b></td>
		   <td rowspan="3" style="width:10px;background-color:#7a6189;">&nbsp;</td>
		   <td colspan="2" style="color:#ffffff; font-family:Georgia; font-size:11px;" valign="top" align="center"><b>Current</b></td>
		   <td rowspan="2" style="color:#ffffff; font-family:Georgia; font-size:11px; width:180px;" align="center" valign="middle"><b>Last Date</b></td>
		   <td colspan="2"  style="color:#ffffff; font-family:Georgia; font-size:11px; width:120px;" valign="top" align="center"><b>Previous Declaration Form</b></td>
		   <td rowspan="2" style="color:#ffffff; font-family:Georgia; font-size:11px; width:100px;" align="center" valign="middle"><b>Status</b></td>
		   <td rowspan="2"  style="color:#ffffff; font-family:Georgia; font-size:11px; width:80px;" valign="middle" align="center"><b>Action</b></td>
		 </tr>
		 <tr bgcolor="#7a6189">
		   <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:120px;" valign="top" align="center"><b>Period</b></td>
		   <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:60px;" valign="top" align="center"><b>Month</b></td>
		   <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:120px;" valign="top" align="center"><b>Period</b></td>
		   <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:60px;" valign="top" align="center"><b>Month</b></td>
		   <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:60px;" valign="top" align="center"><b>Show</b></td>
		   <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:60px;" valign="top" align="center"><b>Print</b></td>
		 </tr>
<?php $sql=mysql_query("select * from hrm_investdecl_setting where CompanyId=".$CompanyId." AND Status='A'", $con); $res=mysql_fetch_array($sql);
      $sqlBy=mysql_query("select FromDate,ToDate from hrm_year where YearId=".$res['B_YearId'], $con); $resBy=mysql_fetch_array($sqlBy);
	  $sqlCy=mysql_query("select FromDate,ToDate from hrm_year where YearId=".$res['C_YearId'], $con); $resCy=mysql_fetch_array($sqlCy);
	  $fb=date("Y",strtotime($resBy['FromDate'])); $tb=date("Y",strtotime($resBy['ToDate']));
	  $fc=date("Y",strtotime($resCy['FromDate'])); $tc=date("Y",strtotime($resCy['ToDate']));
	  if($res['B_Month']==1){$Bm='Jan';}elseif($res['B_Month']==2){$Bm='Feb';}elseif($res['B_Month']==3){$Bm='Mar';}elseif($res['B_Month']==4){$Bm='Apr';}elseif($res['B_Month']==5){$Bm='May';}elseif($res['B_Month']==6){$Bm='Jun';}elseif($res['B_Month']==7){$Bm='Jul';}elseif($res['B_Month']==8){$Bm='Aug';}elseif($res['B_Month']==9){$Bm='Sep';}elseif($res['B_Month']==10){$Bm='Oct';}elseif($res['B_Month']==11){$Bm='Nov';}elseif($res['B_Month']==12){$Bm='Dec';} 
	    if($res['C_Month']==1){$Cm='Jan';}elseif($res['C_Month']==2){$Cm='Feb';}elseif($res['C_Month']==3){$Cm='Mar';}elseif($res['C_Month']==4){$Cm='Apr';}elseif($res['C_Month']==5){$Cm='May';}elseif($res['C_Month']==6){$Cm='Jun';}elseif($res['C_Month']==7){$Cm='Jul';}elseif($res['C_Month']==8){$Cm='Aug';}elseif($res['C_Month']==9){$Cm='Sep';}elseif($res['C_Month']==10){$Cm='Oct';}elseif($res['C_Month']==11){$Cm='Nov';}elseif($res['C_Month']==12){$Cm='Dec';}  
         if(isset($_REQUEST['action']) && $_REQUEST['action']=="edit"){ ?>
	     <form name="formEdit" method="post" onSubmit="return validateEdit(this)">	
		 <tr bgcolor="#FFFFFF">
		   <td align="center"><select name="By" id="By" style="font-family:Times New Roman;font-size:14px;width:115px;">
		   <option value="<?php echo $res['B_YearId']; ?>"><?php echo $fb.'-'.$tb; ?></option>
		   <?php $sqlY=mysql_query("select YearId,FromDate,ToDate from hrm_year order by YearId ASC", $con); while($resY=mysql_fetch_array($sqlY)){ ?>
		   <option value="<?php echo $resY['YearId']; ?>"><?php echo date("Y",strtotime($resY['FromDate'])).'-'.date("Y",strtotime($resY['ToDate'])); ?></option><?php } ?>
		   </select></td>
		   <td align="center"><select name="BMonth" id="BMonth" style="font-family:Times New Roman;font-size:14px;width:58px;">
		   <option value="<?php echo $res['B_Month']; ?>"><?php echo $Bm; ?></option>
		   <?php for($i=1; $i<=12; $i++){ ?><option value="<?php echo $i; ?>"><?php if($i==1){$mb='Jan';}elseif($i==2){$mb='Feb';}elseif($i==3){$mb='Mar';}elseif($i==4){$mb='Apr';}elseif($i==5){$mb='May';}elseif($i==6){$mb='Jun';}elseif($i==7){$mb='Jul';}elseif($i==8){$mb='Aug';}elseif($i==9){$mb='Sep';}elseif($i==10){$mb='Oct';}elseif($i==11){$mb='Nov';}elseif($i==12){$mb='Dec';}  echo $mb; ?></option><?php } ?></select></td>
		   
		   	<td align="center"><select name="Cy" id="Cy" style="font-family:Times New Roman;font-size:14px;width:115px;">
		   <option value="<?php echo $res['C_YearId']; ?>"><?php echo $fc.'-'.$tc; ?></option>
		   <?php $sqlY2=mysql_query("select YearId,FromDate,ToDate from hrm_year order by YearId ASC", $con); while($resY2=mysql_fetch_array($sqlY2)){ ?>
		   <option value="<?php echo $resY2['YearId']; ?>"><?php echo date("Y",strtotime($resY2['FromDate'])).'-'.date("Y",strtotime($resY2['ToDate'])); ?></option><?php } ?>
		   </select></td>
		   <td align="center"><select name="CMonth" id="CMonth" style="font-family:Times New Roman;font-size:14px;width:58px;">
		   <option value="<?php echo $res['C_Month']; ?>"><?php echo $Cm; ?></option>
		   <?php for($j=1; $j<=12; $j++){ ?><option value="<?php echo $j; ?>"><?php if($j==1){$mc='Jan';}elseif($j==2){$mc='Feb';}elseif($j==3){$mc='Mar';}elseif($j==4){$mc='Apr';}elseif($j==5){$mc='May';}elseif($j==6){$mc='Jun';}elseif($j==7){$mc='Jul';}elseif($j==8){$mc='Aug';}elseif($j==9){$mc='Sep';}elseif($j==10){$mc='Oct';}elseif($j==11){$mc='Nov';}elseif($j==12){$mc='Dec';}  echo $mc; ?></option><?php } ?></select></td>
		     <td><input name="LastDateTime" id="LastDateTime" style="font-family:Times New Roman;font-size:14px;width:130px;" value="<?php echo date("d-m-Y H:i:s",strtotime($res['LastDateTime'])); ?>"/>&nbsp;<button id="b_btn" class="CalenderButton"></button>
  <script type="text/javascript">  var cal = Calendar.setup({ onSelect:  function(cal) { cal.hide()}, showTime: true }); 
  cal.manageFields("b_btn", "LastDateTime", "%d-%m-%Y 12:00:00"); </script></td>
		     <td align="center"><select name="ShowB_Form" id="ShowB_Form" style="font-family:Times New Roman;font-size:14px;width:50px;">
		   <option value="<?php echo $res['ShowB_Form']; ?>">&nbsp;<?php echo $res['ShowB_Form']; ?></option>
		   <option value="<?php if($res['ShowB_Form']=='Y'){echo 'N';}else{echo 'Y';} ?>">&nbsp;<?php if($res['ShowB_Form']=='Y'){echo 'N';}else{echo 'Y';} ?></option>
		   </select></td>
		   <td align="center"><select name="PrintB_Form" id="PrintB_Form" style="font-family:Times New Roman;font-size:14px;width:50px;">
		   <option value="<?php echo $res['PrintB_Form']; ?>">&nbsp;<?php echo $res['PrintB_Form']; ?></option>
		   <option value="<?php if($res['PrintB_Form']=='Y'){echo 'N';}else{echo 'Y';} ?>">&nbsp;<?php if($res['PrintB_Form']=='Y'){echo 'N';}else{echo 'Y';} ?></option>
		   </select></td>
		   <td align="center"><select name="Status" id="Status" style="font-family:Times New Roman;font-size:14px;width:98px;">
		   <option value="<?php echo $res['Status']; ?>">&nbsp;<?php if($res['Status']=='A'){echo 'Active';}else{echo 'Deactive';} ?></option>
		   <option value="<?php if($res['Status']=='A'){echo 'D';}else{echo 'A';} ?>">&nbsp;<?php if($res['Status']=='A'){echo 'Deactive';}else{echo 'Active';} ?></option>
		   </select></td>
		   <td align="center">
<?php if($_SESSION['User_Permission']=='Edit'){?>
&nbsp;<input type="submit" name="SaveEdit"  value="" class="SaveButton">&nbsp;
<?php } ?>
</td>
		 </tr>
		 </form>
        <?php } else { ?>	
          <tr bgcolor="#FFFFFF">
		   <td style="font-family:Times New Roman;font-size:14px;width:120px;" align="center"><?php echo $fb.'-'.$tb; ?></td>
		   <td style="font-family:Times New Roman;font-size:14px;width:60px;" align="center"><?php echo $Bm; ?></td>
		   <td style="font-family:Times New Roman;font-size:14px;width:120px;" align="center"><?php echo $fc.'-'.$tc; ?></td>
		   <td style="font-family:Times New Roman;font-size:14px;width:60px;" align="center"><?php echo $Cm; ?></td>
		   <td style="font-family:Times New Roman;font-size:14px;width:180px;" align="center"><?php echo date("d-m-Y H:i:s",strtotime($res['LastDateTime'])); ?></td>
		   <td style="font-family:Times New Roman;font-size:14px;width:60px;" align="center"><?php echo $res['ShowB_Form']; ?></td>
		   <td style="font-family:Times New Roman;font-size:14px;width:60px;" align="center"><?php echo $res['PrintB_Form']; ?></td>
		   <td style="font-family:Times New Roman;font-size:14px;width:60px;" align="center"><?php if($res['Status']=='A'){echo 'Active';}else{echo 'Deactive';} ?></td>
		   <td align="center">
<?php if($_SESSION['User_Permission']=='Edit'){?>
<a href="#"><img src="images/edit.png" border="0" alt="Edit" onClick="edit()"></a>
<?php } ?>
</td>
		 </tr>
		 <?php } ?>
		 </table>
	   </td>
	</tr>  
	<tr><td>&nbsp;</td></tr> 
<?php /********************* Submission Open ****************************/ ?>	
     <tr><td class="font4" style="left">&nbsp;<b><?php echo $msgsb; ?></b></td></tr>
	 <tr>
	  <td align="left">
	     <table border="1" width="260" border="1" bgcolor="#FFFFFF">
		 <tr bgcolor="#7a6189">
		   <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:200px;" valign="top" align="center"><b>Submission Open/Close</b></td>
		   <td style="color:#ffffff; font-family:Georgia; font-size:11px; width:60px;" valign="top" align="center"><b>Action</b></td>
		 </tr>
<?php $sqlsb=mysql_query("select * from hrm_investdecl_setting_submission where CompanyId=".$CompanyId, $con); $ressb=mysql_fetch_array($sqlsb);
         if(isset($_REQUEST['actionsb']) && $_REQUEST['actionsb']=="editsb"){ ?>
	     <form name="formEditsb" method="post" onSubmit="return validateEditsb(this)">	
		 <tr bgcolor="#FFFFFF">
		   <td align="center"><select name="OpenYNSb" id="OpenYNSb" style="font-family:Times New Roman;font-size:14px;width:50px;">
		   <option value="<?php echo $ressb['OpenYN']; ?>">&nbsp;<?php echo $ressb['OpenYN']; ?></option>
		   <option value="<?php if($ressb['OpenYN']=='Y'){echo 'N';}else{echo 'Y';} ?>">&nbsp;<?php if($ressb['OpenYN']=='Y'){echo 'N';}else{echo 'Y';} ?></option>
		   </select></td>
		   <td align="center">&nbsp;
<?php if($_SESSION['User_Permission']=='Edit'){?>
<input type="submit" name="SaveEditsb"  value="" class="SaveButton">&nbsp;
<?php } ?>
</td>
		 </tr>
		 </form>
        <?php } else { ?>	
          <tr bgcolor="#FFFFFF">
		   <td style="font-family:Times New Roman;font-size:14px;width:60px;" align="center"><?php echo $ressb['OpenYN']; ?></td>
		   <td align="center">
<?php if($_SESSION['User_Permission']=='Edit'){?>
<a href="#"><img src="images/edit.png" border="0" alt="Edit" onClick="editsb()"></a>
<?php } ?>
</td>
		 </tr>
		 <?php } ?>
		 </table>
	   </td>
	</tr> 
	<tr><td>&nbsp;</td></tr>
<?php /********************* Submission Close ****************************/ ?>	 
	
	 <tr>
	  <td align="left">
	     <table border="1" width="300" border="1" bgcolor="#FFFFFF">
		 <tr bgcolor="#808000">
		   <td align="center" colspan="3" style="color:#ffffff; font-family:Georgia; font-size:11px;width:50px;"><b>Schedule in Investment Declaration</b></td>
		 </tr>
		 <tr bgcolor="#7a6189">
		   <td style="color:#ffffff; font-family:Georgia; font-size:11px;width:150px;" align="center" valign="middle"><b>Period</b></td>
		   <td style="color:#ffffff; font-family:Georgia; font-size:11px;width:100px;" valign="top" align="center"><b>Month</b></td>
		 </tr>	
<?php $sqlDp=mysql_query("select * from hrm_investdecl_ym where CompanyId=".$CompanyId." order by YMId DESC", $con); $Sno=1; while($resDp=mysql_fetch_array($sqlDp)){
 if($resDp['Month']==1){$m='January';}elseif($resDp['Month']==2){$m='February';}elseif($resDp['Month']==3){$m='March';}elseif($resDp['Month']==4){$m='April';}elseif($resDp['Month']==5){$m='May';}elseif($resDp['Month']==6){$m='June';}elseif($resDp['Month']==7){$m='July';}elseif($resDp['Month']==8){$m='August';}elseif($resDp['Month']==9){$m='September';}elseif($resDp['Month']==10){$m='October';}elseif($resDp['Month']==11){$m='November';}elseif($resDp['Month']==12){$m='December';} 
 ?>		 
          <tr bgcolor="#FFFFFF">
		   <td style="font-family:Times New Roman;font-size:14px;" align="center"><?php echo $resDp['Period']; ?></td>
		   <td style="font-family:Times New Roman;font-size:14px;" align="center"><?php echo $m; ?></td>
		 </tr>
		 <?php $Sno++; } ?>
		 </table>
	   </td>
	</tr>  
	<tr><td>&nbsp;</td></tr> 
	<form name="formEdit22" method="post" onSubmit="return validateEdit22(this)">	
	<tr>
	  <td align="left">
	     <table border="1" width="1500" border="1" bgcolor="#FFFFFF">
		 <tr bgcolor="#808000">
		   <td colspan="15" style="color:#ffffff;font-family:Times New Roman;font-size:14px;"><b>&nbsp;<font color="#80FF00">Allow Yes/No</font> In Declaration Form&nbsp;&nbsp;( Enter Only Y & N )</b>&nbsp;&nbsp;&nbsp;<b><font color="#80FF00"><?php echo $msg2; ?></font></b></td>
		 </tr>
		 <tr bgcolor="#7a6189">
		     <td class="td1" colspan="4"><b>Deduction Under Section 10</b></td>
		     <td class="td1" colspan="5"><b>Deduction Under Chapter VI A</b></td>
		 </tr>
		 <tr bgcolor="#7a6189">
		   <td class="td1"><b>HRA</b></td>
		   <td class="td1"><b>Medical</b></td>
		   <td class="td1"><b>LTA</b></td>
		   <td class="td1"><b>CEA</b></td>
		   <td class="td1"><b>80D Med Insu</b></td>
           <td class="td1"><b>80DD Med Treat</b></td>
           <td class="td1"><b>80DDB Med Treat</b></td>
           <td class="td1"><b>80E Repayment</b></td>
           <td class="td1"><b>80U Handicapped</b></td>
		 </tr>
		 <tr bgcolor="#FFFFFF">
		   <td><input class="td2" id="HRA" name="HRA" value="<?php echo $res['HRA']; ?>" readonly/></b></td>
		   <td><input class="td2" id="Medical" name="Medical" value="<?php echo $res['Medical']; ?>" readonly/></td>  
		   <td><input class="td2" id="LTA" name="LTA" value="<?php echo $res['LTA']; ?>" readonly/></td>
		   <td><input class="td2" id="CEA" name="CEA"  value="<?php echo $res['CEA']; ?>" readonly/></td>
		   <td><input class="td2" id="MIP" name="MIP" value="<?php echo $res['MIP']; ?>" readonly/></td>
           <td><input class="td2" id="MTI" name="MTI" value="<?php echo $res['MTI']; ?>" readonly/></td>
           <td><input class="td2" id="MTS" name="MTS" value="<?php echo $res['MTS']; ?>" readonly/></td>
           <td><input class="td2" id="ROL" name="ROL" value="<?php echo $res['ROL']; ?>" readonly/></td>
           <td><input class="td2" id="Handi" name="Handi" value="<?php echo $res['Handi']; ?>" readonly/></td>
		 </tr>
		 <tr><td></td></tr>
		 <tr bgcolor="#7a6189"><td class="td1" colspan="14"><b>Deduction Under Section 80C</b></td></tr>
		 <tr bgcolor="#7a6189">
           <td class="td1"><b>80CCC PenFun</b></td>
           <td class="td1"><b>Life Insu Prem</b></td>
           <td class="td1"><b>Deferred Annuity</b></td>
           <td class="td1"><b>Pub Provid Fund</b></td>
           <td class="td1"><b>Time Deposit</b></td>
           <td class="td1"><b>ULIP Or UTI/LIC</b></td>
           <td class="td1"><b>Housing Loan</b></td>
		   <td class="td1"><b>Mutual Fund</b></td>
  		   <td class="td1"><b>Investment Bond</b></td>
  		   <td class="td1"><b>Tuition Fees</b></td>
  		   <td class="td1"><b>NHB</b></td>
  		   <td class="td1"><b>NSC</b></td>
                   <td class="td1"><b>Sukanya Sam.</b></td>
  		   <td class="td1"><b>Other Emp PF</b></td>
		 </tr>
		  <tr bgcolor="#FFFFFF">
           <td><input class="td2" id="PenFun" name="PenFun" value="<?php echo $res['PenFun']; ?>" readonly/></td> 
           <td><input class="td2" id="LIP" name="LIP" value="<?php echo $res['LIP']; ?>" readonly/></td>
           <td><input class="td2" id="DA" name="DA" value="<?php echo $res['DA']; ?>" readonly/></td>
           <td><input class="td2" id="PPF" name="PPF" value="<?php echo $res['PPF']; ?>" readonly/></td>
           <td><input class="td2" id="PostOff" name="PostOff" value="<?php echo $res['PostOff']; ?>" readonly/></td>
           <td><input class="td2" id="ULIP" name="ULIP" value="<?php echo $res['ULIP']; ?>" readonly/></td>
           <td><input class="td2" id="HL" name="HL" value="<?php echo $res['HL']; ?>" readonly/></td>
		   <td><input class="td2" id="MF" name="MF" value="<?php echo $res['MF']; ?>" readonly/></td>
  		   <td><input class="td2" id="IB" name="IB" value="<?php echo $res['IB']; ?>" readonly/></td>
  		   <td><input class="td2" id="CTF" name="CTF" value="<?php echo $res['CTF']; ?>" readonly/></td>
  		   <td><input class="td2" id="NHB" name="NHB" value="<?php echo $res['NHB']; ?>" readonly/></td>
  		   <td><input class="td2" id="NSC" name="NSC" value="<?php echo $res['NSC']; ?>" readonly/></td>
                   <td><input class="td2" id="SukS" name="SukS" value="<?php echo $res['SukS']; ?>" readonly/></td>
  		   <td><input class="td2" id="EPF" name="EPF" value="<?php echo $res['EPF']; ?>" readonly/></td>
		 </tr>
		 <tr><td></td></tr>
		 <tr bgcolor="#7a6189">
		   <td class="td1" colspan="5"><b>Deduction Under Section 80C</b></td>
		   <td class="td1"></td>
		   <td class="td1" colspan="2"><b>Deduction Under Section 24</b></td>
                   <td class="td1"><b>Sec. 80CCD</b></td>
		 </tr>
		  <tr bgcolor="#7a6189">
  		   <td class="td1"><b>Form16 Pre Emp</b></td>
  		   <td class="td1"><b>Sal Paid Pre Emp</b></td>
  		   <td class="td1"><b>Prof Tax</b></td>
  		   <td class="td1"><b>Provident Fund</b></td>
  		   <td class="td1"><b>Income Tax</b></td>
		   <td class="td1"><b>form 12C Other Income</b></td>
  		   <td class="td1"><b>Interest HouseLoan</b></td>
  		   <td class="td1"><b>Interest if Loan 01/04/99</b></td>
                   <td class="td1"><b>National Pension Scheme</b></td>
		 </tr>
		 
		 <tr bgcolor="#FFFFFF">
  		   <td><input class="td2" id="Form16" name="Form16" value="<?php echo $res['Form16']; ?>" readonly/></td>
  		   <td><input class="td2" id="SPE" name="SPE" value="<?php echo $res['SPE']; ?>" readonly/></td>
  		   <td><input class="td2" id="PT" name="PT" value="<?php echo $res['PT']; ?>" readonly/></td>
  		   <td><input class="td2" id="PFD" name="PFD" value="<?php echo $res['PFD']; ?>" readonly/></td>
  		   <td><input class="td2" id="IT" name="IT" value="<?php echo $res['IT']; ?>" readonly/></td>
		   <td><input class="td2" id="Form_12C" name="Form_12C" value="<?php echo $res['Form_12C']; ?>" readonly/></td>
  		   <td><input class="td2" id="IHL" name="IHL" value="<?php echo $res['IHL']; ?>" readonly/></td>
  		   <td><input class="td2" id="IL" name="IL" value="<?php echo $res['IL']; ?>" readonly/></td>
                   <td><input class="td2" id="NPS" name="NPS" value="<?php echo $res['NPS']; ?>" readonly/></td>
		 </tr>
<?php if($_SESSION['User_Permission']=='Edit'){?>
		 <tr>
		   <td colspan="13">
		    <table>
			 <tr>
			 <td><input type="button" id="Fedit" value="edit" style="font-family:Times New Roman;font-size:14px;width:80px;background-color:#FFCECE;" onClick="edit2()" /></td>
		  <td><input type="submit" id="Fsubmit" name="Fsubmit" value="save" style="font-family:Times New Roman;font-size:14px;width:80px;display:none; background-color:#CAFFCA;" /></td>
		  <td align="center">
		<input type="button" name="Refrash" value="refresh" onClick="javascript:window.location='InvetDeclSet.php?ls=10&wer=123&aa=grtd&er=er%re%tr%rr&trt=equalthen&sys=%tr%tr&se=reew&w=ee102&aa=grtd&er=er%re%tr%rr&trt=equalthen'"/>&nbsp;</td>
			</tr>
			</table>
			</td>
		 </tr>
<?php } ?>
		 </form>
		 </table>
	   </td>
	</tr> 
		<tr><td>&nbsp;</td></tr> 
	<form name="formEdit33" method="post" onSubmit="return validateEdit33(this)">	
	<tr>
	  <td align="left">
	     <table border="1" width="1500" border="1" bgcolor="#FFFFFF">
		 <tr bgcolor="#808000">
		   <td colspan="15" style="color:#ffffff;font-family:Times New Roman;font-size:14px;"><b>&nbsp;<font color="#80FF00">Allow Limit Amount</font> In Declaration Form&nbsp;&nbsp;( Enter Only Amount)</b>&nbsp;&nbsp;&nbsp;<b><font color="#80FF00"><?php echo $msg3; ?></font></b></td>
		 </tr>
		 <tr bgcolor="#7a6189">
		     <td class="td1" colspan="4"><b>Deduction Under Section 10</b></td>
		     <td class="td1" colspan="5"><b>Deduction Under Chapter VI A</b>
			 <input type="hidden" name="Lperiod" value="<?php echo $fc.'-'.$tc; ?>" /><input type="hidden" name="Lmonth" value="<?php echo $res['C_Month']; ?>" /> 
			 </td>
		 </tr>
		 <tr bgcolor="#7a6189">
		   <td class="td1"><b>HRA</b></td>
		   <td class="td1"><b>Medical</b></td>
		   <td class="td1"><b>LTA</b></td>
		   <td class="td1"><b>CEA</b></td>
		   <td class="td1"><b>80D Med Insu</b></td>
           <td class="td1"><b>80DD Med Treat</b></td>
           <td class="td1"><b>80DDB Med Treat</b></td>
           <td class="td1"><b>80E Repayment</b></td>
           <td class="td1"><b>80U Handicapped</b></td>
		 </tr>
		 <tr bgcolor="#FFFFFF">
		   <td><input class="td2" id="HRA_Limit" name="HRA_Limit" value="<?php echo ''; ?>" readonly/></b></td>
		   <td><input class="td2" id="Medical_Limit" name="Medical_Limit" value="<?php echo ''; ?>" readonly/></td>  
		   <td><input class="td2" id="LTA_Limit" name="LTA_Limit" value="<?php echo ''; ?>" readonly/></td>
		   <td><input class="td2" id="CEA_Limit" name="CEA_Limit"  value="<?php echo ''; ?>" readonly/></td>
		   <td><input class="td2" id="MIP_Limit" name="MIP_Limit" value="<?php echo $res['MIP_Limit']; ?>" readonly/></td>
           <td><input class="td2" id="MTI_Limit" name="MTI_Limit" value="<?php echo $res['MTI_Limit']; ?>" readonly/></td>
           <td><input class="td2" id="MTS_Limit" name="MTS_Limit" value="<?php echo $res['MTS_Limit']; ?>" readonly/></td>
           <td><input class="td2" id="ROL_Limit" name="ROL_Limit" value="<?php echo $res['ROL_Limit']; ?>" readonly/></td>
           <td><input class="td2" id="Handi_Limit" name="Handi_Limit" value="<?php echo $res['Handi_Limit']; ?>" readonly/></td>
		 </tr>
		 <tr><td></td></tr>
		 <tr bgcolor="#7a6189"><td class="td1" colspan="14"><b>Deduction Under Section 80C</b></td></tr>
		 <tr bgcolor="#7a6189">
           <td class="td1"><b>80CCC PenFun</b></td>
           <td class="td1"><b>Life Insu Prem</b></td>
           <td class="td1"><b>Deferred Annuity</b></td>
           <td class="td1"><b>Pub Provid Fund</b></td>
           <td class="td1"><b>Time Deposit</b></td>
           <td class="td1"><b>ULIP Or UTI/LIC</b></td>
           <td class="td1"><b>Housing Loan</b></td>
		   <td class="td1"><b>Mutual Fund</b></td>
  		   <td class="td1"><b>Investment Bond</b></td>
  		   <td class="td1"><b>Tuition Fees</b></td>
  		   <td class="td1"><b>NHB</b></td>
  		   <td class="td1"><b>NSC</b></td>
                   <td class="td1"><b>Sukanya Sam.</b></td>
  		   <td class="td1"><b>Other Emp PF</b></td>
		 </tr>
		  <tr bgcolor="#FFFFFF">
           <td><input class="td2" id="PenFun_Limit" name="PenFun_Limit" value="<?php echo $res['PenFun_Limit']; ?>" readonly/></td> 
           <td><input class="td2" id="LIP_Limit" name="LIP_Limit" value="<?php echo $res['LIP_Limit']; ?>" readonly/></td>
           <td><input class="td2" id="DA_Limit" name="DA_Limit" value="<?php echo $res['DA_Limit']; ?>" readonly/></td>
           <td><input class="td2" id="PPF_Limit"_Limit name="PPF_Limit" value="<?php echo $res['PPF_Limit']; ?>" readonly/></td>
           <td><input class="td2" id="PostOff_Limit" name="PostOff_Limit" value="<?php echo $res['PostOff_Limit']; ?>" readonly/></td>
           <td><input class="td2" id="ULIP_Limit" name="ULIP_Limit" value="<?php echo $res['ULIP_Limit']; ?>" readonly/></td>
           <td><input class="td2" id="HL_Limit" name="HL_Limit" value="<?php echo $res['HL_Limit']; ?>" readonly/></td>
		   <td><input class="td2" id="MF_Limit" name="MF_Limit" value="<?php echo $res['MF_Limit']; ?>" readonly/></td>
  		   <td><input class="td2" id="IB_Limit" name="IB_Limit" value="<?php echo $res['IB_Limit']; ?>" readonly/></td>
  		   <td><input class="td2" id="CTF_Limit" name="CTF_Limit" value="<?php echo $res['CTF_Limit']; ?>" readonly/></td>
  		   <td><input class="td2" id="NHB_Limit" name="NHB_Limit" value="<?php echo $res['NHB_Limit']; ?>" readonly/></td>

  		   <td><input class="td2" id="NSC_Limit" name="NSC_Limit" value="<?php echo $res['NSC_Limit']; ?>" readonly/></td>
                   <td><input class="td2" id="SukS_Limit" name="SukS_Limit" value="<?php echo $res['SukS_Limit']; ?>" readonly/></td>
  		   <td><input class="td2" id="EPF_Limit" name="EPF_Limit" value="<?php echo $res['EPF_Limit']; ?>" readonly/></td>
		 </tr>
		 <tr><td></td></tr>
		 <tr bgcolor="#7a6189">
		   <td class="td1" colspan="5"><b>Deduction Under Section 80C</b></td>
		   <td class="td1"></td>
		   <td class="td1" colspan="2"><b>Deduction Under Section 24</b></td>
                   <td class="td1"><b>Sec. 80CCD</b></td>
		 </tr>
		  <tr bgcolor="#7a6189">
  		   <td class="td1"><b>Form16 Pre Emp</b></td>
  		   <td class="td1"><b>Sal Paid Pre Emp</b></td>
  		   <td class="td1"><b>Prof Tax</b></td>
  		   <td class="td1"><b>Provident Fund</b></td>
  		   <td class="td1"><b>Income Tax</b></td>
		   <td class="td1"><b>form 12C Other Income</b></td>
  		   <td class="td1"><b>Interest HouseLoan</b></td>
  		   <td class="td1"><b>Interest if Loan 01/04/99</b></td>
                   <td class="td1"><b>National Pension Scheme</b></td>
		 </tr>
		 
		 <tr bgcolor="#FFFFFF">
  		   <td><input class="td2" id="Form16_Limit" name="Form16_Limit" value="<?php echo ''; ?>" readonly/></td>
  		   <td><input class="td2" id="SPE_Limit" name="SPE_Limit" value="<?php echo ''; ?>" readonly/></td>
  		   <td><input class="td2" id="PT_Limit" name="PT_Limit" value="<?php echo ''; ?>" readonly/></td>
  		   <td><input class="td2" id="PFD_Limit" name="PFD_Limit" value="<?php echo ''; ?>" readonly/></td>
  		   <td><input class="td2" id="IT_Limit" name="IT_Limit" value="<?php echo ''; ?>" readonly/></td>
		   <td><input class="td2" id="Form_12C_Limit" name="Form_12C_Limit" value="<?php echo ''; ?>" readonly/></td>
  		   <td><input class="td2" id="IHL_Limit" name="IHL_Limit" value="<?php echo $res['IHL_Limit']; ?>" readonly/></td>
  		   <td><input class="td2" id="IL_Limit" name="IL_Limit" value="<?php echo $res['IL_Limit']; ?>" readonly/></td>
                   <td><input class="td2" id="NPS_Limit" name="NPS_Limit" value="<?php echo $res['NPS_Limit']; ?>" readonly/></td>
		 </tr>
<?php if($_SESSION['User_Permission']=='Edit'){?>
		 <tr>
		   <td colspan="13">
		    <table>
			 <tr>
			 <td><input type="button" id="FeditLimit" value="edit" style="font-family:Times New Roman;font-size:14px;width:80px;background-color:#FFCECE;" onClick="edit3()" /></td>
		  <td><input type="submit" id="FsubmitLimit" name="FsubmitLimit" value="save" style="font-family:Times New Roman;font-size:14px;width:80px;display:none; background-color:#CAFFCA;" /></td>
		  <td align="center">
		<input type="button" name="Refrash" value="refresh" onClick="javascript:window.location='InvetDeclSet.php?ls=10&wer=123&aa=grtd&er=er%re%tr%rr&trt=equalthen&sys=%tr%tr&se=reew&w=ee102&aa=grtd&er=er%re%tr%rr&trt=equalthen'"/>&nbsp;</td>
			</tr>
			</table>
			</td>
		 </tr>
<?php } ?>
		 </form>
		 </table>
	   </td>
	</tr>   

   
  </table>    
</td>
<?php //*********************************************** Close Menu PMS ******************************************************?>    
 </tr>
<?php } ?> 
</table>
<?php //************************************************************************************************************************************************************?>
<?php //**********************************************END*****END*****END******END******END***************************************************************?>
<?php //************************************************************************************************************************************************************?>
	  </td>
	</tr>
	<tr>
	  <td valign="top" align="center">
	    <table border="0" style="margin-top:0px;">
				<tr>
	              <td align="center"><img src="images/home1.png"></td>
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

