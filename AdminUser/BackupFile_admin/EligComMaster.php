<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}
/*********************************************/
?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style> 
.th{ font-family:Times New Roman;font-size:13px; font-weight:bold; text-align:center; height:24px; color:#FFFFFF; background-color:#7a6189; }
.tdc{ font-family:Times New Roman;font-size:13px; text-align:center;height:22px; }
.tdl{ font-family:Times New Roman;font-size:13px; text-align:left;height:22px; }
.tdr{ font-family:Times New Roman;font-size:13px; text-align:right;height:22px; }
.input{ font-family:Times New Roman; font-size:12px; width:99%; height:20px; border:hidden; background-color:#CBD6B4;}
.inputc{ font-family:Times New Roman; font-size:12px; width:99%; height:20px; border:hidden; text-align:center; background-color:#CBD6B4;}
.sel{ font-family:Times New Roman; font-size:12px; width:99%; height:21px; }
.selb{ font-family:Times New Roman; font-size:12px; width:99%; height:21px; border:hidden; background-color:#CBD6B4; }
.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;}
.SaveButton {background-image:url(images/save.gif); width:20px; height:20px; background-repeat:no-repeat; background-color:#FFFFFF; border-color:#FFFFFF; border-bottom:inherit;}
</style>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<Script type="text/javascript">
function SelFun(t,d){ var x = "EligComMaster.php?d="+d+"&t="+t; window.location=x; }
function FunEdit(n,sn,d,t)
{ var agree=confirm("Are you sure you want to edit this record?");
  if(agree)
  { 
    document.getElementById("Edit"+n+"_"+sn).style.display='none'; 
    document.getElementById("Save"+n+"_"+sn).style.display='block'; 
	
	if(t==1)
	{ 
document.getElementById("CategoryA"+n+""+sn).readOnly=false; document.getElementById("CategoryA"+n+""+sn).style.background='#FFFFFF'; document.getElementById("CategoryB"+n+""+sn).readOnly=false; document.getElementById("CategoryB"+n+""+sn).style.background='#FFFFFF'; document.getElementById("CategoryC"+n+""+sn).readOnly=false; document.getElementById("CategoryC"+n+""+sn).style.background='#FFFFFF'; document.getElementById("DA_OutSiteHQ"+n+""+sn).readOnly=false; document.getElementById("DA_OutSiteHQ"+n+""+sn).style.background='#FFFFFF'; document.getElementById("DA_InSiteHQ"+n+""+sn).readOnly=false; document.getElementById("DA_InSiteHQ"+n+""+sn).style.background='#FFFFFF'; document.getElementById("Mobile"+n+""+sn).readOnly=false; document.getElementById("Mobile"+n+""+sn).style.background='#FFFFFF'; document.getElementById("Mobile_WithGPS"+n+""+sn).readOnly=false; document.getElementById("Mobile_WithGPS"+n+""+sn).style.background='#FFFFFF'; document.getElementById("Mobile_Remb"+n+""+sn).readOnly=false; document.getElementById("Mobile_Remb"+n+""+sn).style.background='#FFFFFF'; document.getElementById("Mobile_Remb_Period"+n+""+sn).disabled=false; document.getElementById("Mobile_Remb_Period"+n+""+sn).style.background='#FFFFFF';
document.getElementById("Laptop_Amt"+n+""+sn).readOnly=false; document.getElementById("Laptop_Amt"+n+""+sn).style.background='#FFFFFF'; document.getElementById("Mediclaim_Coverage_Slabs"+n+""+sn).readOnly=false; document.getElementById("Mediclaim_Coverage_Slabs"+n+""+sn).style.background='#FFFFFF'; document.getElementById("Helth_CheckUp"+n+""+sn).readOnly=false; document.getElementById("Helth_CheckUp"+n+""+sn).style.background='#FFFFFF';             
	}
	else if(t==2)
	{
	 document.getElementById("Flight_YN"+n+""+sn).disabled=false; document.getElementById("Flight_YN"+n+""+sn).style.background='#FFFFFF'; document.getElementById("Flight_Class"+n+""+sn).disabled=false; document.getElementById("Flight_Class"+n+""+sn).style.background='#FFFFFF'; document.getElementById("Train_YN"+n+""+sn).disabled=false; document.getElementById("Train_YN"+n+""+sn).style.background='#FFFFFF'; document.getElementById("Train_Class"+n+""+sn).disabled=false; document.getElementById("Train_Class"+n+""+sn).style.background='#FFFFFF'; document.getElementById("TravelEnt_Rmk"+n+""+sn).readOnly=false; document.getElementById("TravelEnt_Rmk"+n+""+sn).style.background='#FFFFFF'; document.getElementById("TW_Km"+n+""+sn).readOnly=false; document.getElementById("TW_Km"+n+""+sn).style.background='#FFFFFF'; document.getElementById("TW_InHQ_M"+n+""+sn).readOnly=false; document.getElementById("TW_InHQ_M"+n+""+sn).style.background='#FFFFFF'; document.getElementById("TW_InHQ_D"+n+""+sn).readOnly=false; document.getElementById("TW_InHQ_D"+n+""+sn).style.background='#FFFFFF'; document.getElementById("TW_OutHQ_M"+n+""+sn).readOnly=false; document.getElementById("TW_OutHQ_M"+n+""+sn).style.background='#FFFFFF'; document.getElementById("TW_OutHQ_D"+n+""+sn).readOnly=false; document.getElementById("TW_OutHQ_D"+n+""+sn).style.background='#FFFFFF'; document.getElementById("FW_Km"+n+""+sn).readOnly=false; document.getElementById("FW_Km"+n+""+sn).style.background='#FFFFFF'; document.getElementById("FW_InHQ_M"+n+""+sn).readOnly=false; document.getElementById("FW_InHQ_M"+n+""+sn).style.background='#FFFFFF'; document.getElementById("FW_InHQ_D"+n+""+sn).readOnly=false; document.getElementById("FW_InHQ_D"+n+""+sn).style.background='#FFFFFF'; document.getElementById("FW_OutHQ_M"+n+""+sn).readOnly=false; document.getElementById("FW_OutHQ_M"+n+""+sn).style.background='#FFFFFF'; document.getElementById("FW_OutHQ_D"+n+""+sn).readOnly=false; document.getElementById("FW_OutHQ_D"+n+""+sn).style.background='#FFFFFF';
	}
	
  } 
}

function FunSave(n,sn,d,t,c,g,gv,v,u)
{ var agree=confirm("Are you sure?");
  if(agree)
  {  
	
	document.getElementById('loaderDiv').style.display='block';
	
	if(t==1)
	{ 
	 
	 var R= document.getElementById("Mobile_Remb"+n+""+sn).value;
	 var P= document.getElementById("Mobile_Remb_Period"+n+""+sn).value;
	 
	 if(R!='' && P==''){ alert("Please select mobile reimbursement period!"); return false; }
	 
	 
     var url = 'EligComMasterAjax.php'; var pars = 'Act=EligMaster&n='+n+'&sn='+sn+'&d='+d+'&t='+t+'&c='+c+'&g='+g+'&gv='+gv+'&v='+v+'&u='+u+'&CategoryA='+document.getElementById("CategoryA"+n+""+sn).value+'&CategoryB='+document.getElementById("CategoryB"+n+""+sn).value+'&CategoryC='+document.getElementById("CategoryC"+n+""+sn).value+'&DA_OutSiteHQ='+document.getElementById("DA_OutSiteHQ"+n+""+sn).value+'&DA_InSiteHQ='+document.getElementById("DA_InSiteHQ"+n+""+sn).value+'&Mobile='+document.getElementById("Mobile"+n+""+sn).value+'&Mobile_WithGPS='+document.getElementById("Mobile_WithGPS"+n+""+sn).value+'&Mobile_Remb='+document.getElementById("Mobile_Remb"+n+""+sn).value+'&Mobile_Remb_Period='+document.getElementById("Mobile_Remb_Period"+n+""+sn).value+'&Laptop_Amt='+document.getElementById("Laptop_Amt"+n+""+sn).value+'&Mediclaim_Coverage_Slabs='+document.getElementById("Mediclaim_Coverage_Slabs"+n+""+sn).value+'&Helth_CheckUp='+document.getElementById("Helth_CheckUp"+n+""+sn).value;	
	  var myAjax = new Ajax.Request( url, { method: 'post', parameters: pars, onComplete: show_Return });
	}
	else if(t==2)
	{
	 var url = 'EligComMasterAjax.php'; var pars = 'Act=EligMaster&n='+n+'&sn='+sn+'&d='+d+'&t='+t+'&c='+c+'&g='+g+'&gv='+gv+'&v='+v+'&u='+u+'&Flight_YN='+document.getElementById("Flight_YN"+n+""+sn).value+'&Flight_Class='+document.getElementById("Flight_Class"+n+""+sn).value+'&Train_YN='+document.getElementById("Train_YN"+n+""+sn).value+'&Train_Class='+document.getElementById("Train_Class"+n+""+sn).value+'&TravelEnt_Rmk='+document.getElementById("TravelEnt_Rmk"+n+""+sn).value+'&TW_Km='+document.getElementById("TW_Km"+n+""+sn).value+'&TW_InHQ_M='+document.getElementById("TW_InHQ_M"+n+""+sn).value+'&TW_InHQ_D='+document.getElementById("TW_InHQ_D"+n+""+sn).value+'&TW_OutHQ_M='+document.getElementById("TW_OutHQ_M"+n+""+sn).value+'&TW_OutHQ_D='+document.getElementById("TW_OutHQ_D"+n+""+sn).value+'&FW_Km='+document.getElementById("FW_Km"+n+""+sn).value+'&FW_InHQ_M='+document.getElementById("FW_InHQ_M"+n+""+sn).value+'&FW_InHQ_D='+document.getElementById("FW_InHQ_D"+n+""+sn).value+'&FW_OutHQ_M='+document.getElementById("FW_OutHQ_M"+n+""+sn).value+'&FW_OutHQ_D='+document.getElementById("FW_OutHQ_D"+n+""+sn).value;	
	  var myAjax = new Ajax.Request( url, { method: 'post', parameters: pars, onComplete: show_Return });
	}
	
  } 
}
function show_Return(originalRequest)
{ document.getElementById('SpanForElig').innerHTML = originalRequest.responseText; 
  if(document.getElementById("Upsts").value=='Y')
  {
    var n=document.getElementById("Upn").value; var sn=document.getElementById("Upsn").value;
    if(document.getElementById("Upt").value==1)
	{ 
document.getElementById("CategoryA"+n+""+sn).readOnly=true; document.getElementById("CategoryA"+n+""+sn).style.background='#C5FF8A'; document.getElementById("CategoryB"+n+""+sn).readOnly=true; document.getElementById("CategoryB"+n+""+sn).style.background='#C5FF8A'; document.getElementById("CategoryC"+n+""+sn).readOnly=true; document.getElementById("CategoryC"+n+""+sn).style.background='#C5FF8A'; document.getElementById("DA_OutSiteHQ"+n+""+sn).readOnly=true; document.getElementById("DA_OutSiteHQ"+n+""+sn).style.background='#C5FF8A'; document.getElementById("DA_InSiteHQ"+n+""+sn).readOnly=true; document.getElementById("DA_InSiteHQ"+n+""+sn).style.background='#C5FF8A'; document.getElementById("Mobile"+n+""+sn).readOnly=true; document.getElementById("Mobile"+n+""+sn).style.background='#C5FF8A'; document.getElementById("Mobile_WithGPS"+n+""+sn).readOnly=true; document.getElementById("Mobile_WithGPS"+n+""+sn).style.background='#C5FF8A'; document.getElementById("Mobile_Remb"+n+""+sn).readOnly=true; document.getElementById("Mobile_Remb"+n+""+sn).style.background='#C5FF8A'; document.getElementById("Mobile_Remb_Period"+n+""+sn).disabled=true; document.getElementById("Mobile_Remb_Period"+n+""+sn).style.background='#C5FF8A';
document.getElementById("Laptop_Amt"+n+""+sn).readOnly=true; document.getElementById("Laptop_Amt"+n+""+sn).style.background='#C5FF8A'; document.getElementById("Mediclaim_Coverage_Slabs"+n+""+sn).readOnly=true; document.getElementById("Mediclaim_Coverage_Slabs"+n+""+sn).style.background='#C5FF8A'; document.getElementById("Helth_CheckUp"+n+""+sn).readOnly=true; document.getElementById("Helth_CheckUp"+n+""+sn).style.background='#C5FF8A';             
	}
	else if(document.getElementById("Upt").value==2)
	{
	 document.getElementById("Flight_YN"+n+""+sn).disabled=false; document.getElementById("Flight_YN"+n+""+sn).style.background='#C5FF8A'; document.getElementById("Flight_Class"+n+""+sn).disabled=false; document.getElementById("Flight_Class"+n+""+sn).style.background='#C5FF8A'; document.getElementById("Train_YN"+n+""+sn).disabled=false; document.getElementById("Train_YN"+n+""+sn).style.background='#C5FF8A'; document.getElementById("Train_Class"+n+""+sn).disabled=false; document.getElementById("Train_Class"+n+""+sn).style.background='#C5FF8A'; document.getElementById("TravelEnt_Rmk"+n+""+sn).readOnly=true; document.getElementById("TravelEnt_Rmk"+n+""+sn).style.background='#C5FF8A'; document.getElementById("TW_Km"+n+""+sn).readOnly=true; document.getElementById("TW_Km"+n+""+sn).style.background='#C5FF8A'; document.getElementById("TW_InHQ_M"+n+""+sn).readOnly=true; document.getElementById("TW_InHQ_M"+n+""+sn).style.background='#C5FF8A'; document.getElementById("TW_InHQ_D"+n+""+sn).readOnly=true; document.getElementById("TW_InHQ_D"+n+""+sn).style.background='#C5FF8A'; document.getElementById("TW_OutHQ_M"+n+""+sn).readOnly=true; document.getElementById("TW_OutHQ_M"+n+""+sn).style.background='#C5FF8A'; document.getElementById("TW_OutHQ_D"+n+""+sn).readOnly=true; document.getElementById("TW_OutHQ_D"+n+""+sn).style.background='#C5FF8A'; document.getElementById("FW_Km"+n+""+sn).readOnly=true; document.getElementById("FW_Km"+n+""+sn).style.background='#C5FF8A'; document.getElementById("FW_InHQ_M"+n+""+sn).readOnly=true; document.getElementById("FW_InHQ_M"+n+""+sn).style.background='#C5FF8A'; document.getElementById("FW_InHQ_D"+n+""+sn).readOnly=true; document.getElementById("FW_InHQ_D"+n+""+sn).style.background='#C5FF8A'; document.getElementById("FW_OutHQ_M"+n+""+sn).readOnly=true; document.getElementById("FW_OutHQ_M"+n+""+sn).style.background='#C5FF8A'; document.getElementById("FW_OutHQ_D"+n+""+sn).readOnly=true; document.getElementById("FW_OutHQ_D"+n+""+sn).style.background='#C5FF8A';
	}
	
	document.getElementById("Edit"+n+"_"+sn).style.display='block'; 
    document.getElementById("Save"+n+"_"+sn).style.display='none';
	document.getElementById('loaderDiv').style.display='none';
	alert("Records update successfully!");
  }
  else
  { document.getElementById('loaderDiv').style.display='none'; alert("Error occour"); }
  
  
} 

function FunApplyAll(d,t,c,u)
{ 
 if(document.getElementById("ApplyAll").checked==true)
 {
  var agree=confirm("Are you sure?");
  if(agree)
  { 
   window.open("EligComMasterApply.php?d="+d+"&t="+t+"&c="+c+"&u="+u, "EligForm", "menubar=no,scrollbars=yes,resizable=no,directories=no,width=500,height=500"); 
   /*
   document.getElementById('loaderDiv').style.display='block';
   var url = 'EligComMasterAjax.php'; var pars = 'Actt=MoveRecordesToOthers&d='+d+'&t='+t+'&c='+c+'&u='+u;	
	  var myAjax = new Ajax.Request( url, { method: 'post', parameters: pars, onComplete: showT_Return });
   */
  }
 }
}
/*
function showT_Return(originalRequest)
{ 
 document.getElementById('SpanForElig').innerHTML = originalRequest.responseText;
 if(document.getElementById("PrsSts").value=='Done')
 {
  document.getElementById("ApplyAll").checked=false;
  document.getElementById('loaderDiv').style.display='none';
  alert("Records paste successfully!");
 }
 else
  { 
   document.getElementById("ApplyAll").checked=false;
   document.getElementById('loaderDiv').style.display='none'; alert("Error occour"); 
  }
}
*/
          
//function del(value) { var agree=confirm("Are you sure you want to delete this record?");
//if (agree) { var x = "EligComMaster.php?action=delete&did="+value;  window.location=x;}}

</SCRIPT> 
</head>
<body class="body">

<div id="loaderDiv" style="background-color: rgba(0,0,0,0.8);width: 100%;height: 100%;position: fixed;top:0px;left: 0px;font-size: 12px; display:none;">	
	<center>
	<span style="color:white;top: 50%;left:38%;position: absolute;">Please Wait, working on Progress...<img src="images/loader.gif"></span>
	</center>
</div>
<span id="SpanForElig"></span>
<table class="table">
<tr>
 <td>
  <table class="menutable"><tr><td><?php if($_SESSION['login'] = true){ require_once("AMenu.php"); } ?></td></tr></table>
 </td>
</tr>
<tr>
 <td valign="top">
  <table width="100%" style="margin-top:0px;" border="0">
    <tr>
	  <td valign="top"><?php if($_SESSION['login'] = true){ require_once("AWelcome.php"); } ?></td>
	</tr>
	 <tr>
	  <td valign="top" align="center"  width="100%" id="MainWindow">
<?php //******************************************************************************?>
<?php //****************START*****START*****START******START******START***************************?>
<?php //******************************************************************************?>


<table border="0" style="margin-top:0px; width:100%;">
 <tr>
  <td align="left" height="20" valign="top" colspan="3">
   <table border="0">
    <tr>
	  <td width="200" class="heading">Eligibility Master </td>
	  <td style="width:200px;"><select class="sel" onChange="SelFun(<?=$_REQUEST['t']?>,this.value)">
	  <option value="0" <?php if($_REQUEST['d']==0){echo 'selected';}?>>SELECT DEPARTMENT</option>
	  <?php $sD=mysql_query("select DepartmentId, DepartmentName from hrm_department where CompanyId=".$CompanyId." AND DeptStatus='A' order by DepartmentName",$con); while($rD=mysql_fetch_assoc($sD)){ ?>
	  <option value="<?=$rD['DepartmentId']?>" <?php if($_REQUEST['d']==$rD['DepartmentId']){echo 'selected';}?>><?=strtoupper($rD['DepartmentName'])?></option>
	  <?php } ?>
	  </select> </td>
	  <td style="width:350px;"><select class="sel" onChange="SelFun(this.value,<?=$_REQUEST['d']?>)">
	  <option value="1" <?php if($_REQUEST['t']==1){echo 'selected';}?>>LODGING ENTITLEMENT, DAILY ALLOWANCE & OTHERS</option>
	  <option value="2" <?php if($_REQUEST['t']==2){echo 'selected';}?>>TRAVEL ENTITLEMENT & ELIGIBILITY</option>
	  <?php /*<option value="3" <?php if($_REQUEST['t']==3){echo 'selected';}?>>TRAVEL ELIGIBILITY</option>
	  <option value="4" <?php if($_REQUEST['t']==4){echo 'selected';}?>>DAILY ALLOWANCE & OTHERS</option>*/?>
	  </select> </td>
	  <td align="right">
		<input type="button" name="back" id="back" style="width:90px;" value="back" onClick="javascript:window.location='Index.php?log=<?php echo $_SESSION['logCheckUser']; ?>'"/>
		<input type="button" name="Refrash" value="refresh" style="width:90px;" onClick="javascript:window.location='EligComMaster.php?d=1&t=1'"/></td>
	  <td style="width:250px; text-align:right; font-family:Times New Roman;font-size:14px; color:#DF4800;">
	    <input type="checkbox" id="ApplyAll" onClick="FunApplyAll(<?=$_REQUEST['d'].','.$_REQUEST['t'].','.$CompanyId.','.$UserId?>)" />&nbsp;Apply For Department
	  </td>	
	  <td class="font4" style="left">&nbsp;&nbsp;&nbsp;<b><?php echo $msg; ?></b></td>
	</tr>
   </table>
  </td>
 </tr>
<?php if($_SESSION['login'] = true) { ?>	
 <tr>
 
<?php //*****************************************************************************************************?> 
<td align="left" id="type" valign="top" style="display:block;width:100%">             
   <table border="0" style="width:100%;">
   
	<tr>
	  <td align="left" style="width:100%;">
	     <table border="1" style="width:95%;background-color:#FFFFFF;" cellspacing="0">
		 <tr>
		   <td class="th" rowspan="4" style="width:40px;">Sn</td>
		   <td class="th" rowspan="4" style="width:40px;">Grade</td>
		   <td class="th" rowspan="4" style="width:200px;">Vertical</td>
		   <?php if($_REQUEST['t']==1){ ?>
		   <td class="th" colspan="3">Lodging Entitlement</td>
		   <td class="th" colspan="9">Daily Allowance & Others</td>
		   <?php } if($_REQUEST['t']==2){ ?>
		   <td class="th" colspan="5">Travel Entitlement</td>
		   <td class="th" colspan="6">Travel Eligibility</td>
		   <?php } ?>
		   <td class="th" rowspan="4" style="width:50px;">Action</td>
		  </tr>
		  <tr> 
		   <?php if($_REQUEST['t']==1){ ?>
		   <td class="th" colspan="3">Category City</td>
		   <td class="th" colspan="2">Daily Allowance</td>
		   <td class="th" colspan="4">Mobile Handset & Reimbursement</td>
		   <td class="th" rowspan="3" style="width:80px;">Laptop<br>(Rs)</td>
		   <td class="th" rowspan="3" style="width:80px;">Mediclaim<br>Coverage<br>Slabs<br>(Rs)</td>
		   <td class="th" rowspan="3" style="width:80px;">Helth<br>Checkup<br>(Rs)</td>
		   <?php } if($_REQUEST['t']==2){ ?>
		   <td class="th" colspan="2">Flight</td>
		   <td class="th" colspan="2">Train</td>
		   <td class="th" rowspan="3" style="width:100px;">Remark</td>
		   <td class="th" colspan="3">Two Wheeler</td>
		   <td class="th" colspan="3">Four Wheeler</td>
		   <?php } ?>
		 </tr>
		 <tr> 
		   <?php if($_REQUEST['t']==1){ ?>
		   <td class="th" rowspan="2" style="width:50px;">A</td>
		   <td class="th" rowspan="2" style="width:50px;">B</td>
 		   <td class="th" rowspan="2" style="width:50px;">C</td>
		   
		   <td class="th" rowspan="2" style="width:60px;">OutSide<br>HQ</td>
		   <td class="th" rowspan="2" style="width:60px;">@<br>HQ</td>
		   <td class="th" rowspan="2" style="width:60px;">Normal<br>(Rs)</td>
		   <td class="th" rowspan="2" style="width:60px;">GPRS<br>(Rs)</td>
		   <td class="th" rowspan="2" style="width:60px;">Reimb<br>(Rs)</td>
		   <td class="th" rowspan="2" style="width:60px;">Period</td>
		   <?php } if($_REQUEST['t']==2){ ?>
		   <td class="th" rowspan="2" style="width:50px;">Allow</td>
		   <td class="th" rowspan="2" style="width:70px;">Class</td>
		   <td class="th" rowspan="2" style="width:50px;">Allow</td>
		   <td class="th" rowspan="2" style="width:70px;">Class</td>
		   
		   <td class="th" rowspan="2" style="width:50px;">Rs/Km</td>
		   <td class="th" colspan="2">Max. Limit</td>
		   <?php /*<td class="th" colspan="2">DA Outside HQ</td>*/ ?>
		   <td class="th" rowspan="2" style="width:50px;">Rs/Km</td>
		   <td class="th" colspan="2">Max. Limit</td>
		   <?php /*<td class="th" colspan="2">DA Outside HQ</td>*/ ?>		
		   <?php } ?>   
		 </tr>
		 <tr>
		   <?php if($_REQUEST['t']==2){ ?>
		   <td class="th" style="width:60px;">Km/<br>Month</td>
		   <td class="th" style="width:60px;">Km/<br>Day</td>
		   <?php /*<td class="th" style="width:60px;">Km<br>Month</td>
		   <td class="th" style="width:60px;">Km<br>Day</td>*/ ?>
		   <td class="th" style="width:60px;">Km/<br>Month</td>
		   <td class="th" style="width:60px;">Km/<br>Annum</td>
		   <?php /*<td class="th" style="width:60px;">Km<br>Month</td>
		   <td class="th" style="width:60px;">Km<br>Day</td>*/ ?>	
		   <?php } ?>
		 </tr>
        <?php if($CompanyId==1){$sGr=mysql_query("select * from hrm_grade where GradeStatus='A' AND CompanyId=".$CompanyId." AND CreatedDate>='2014-02-01' order by GradeId DESC", $con);}elseif($CompanyId==4 OR $CompanyId==3 OR $CompanyId==2){$sGr=mysql_query("select * from hrm_grade where GradeStatus='A' AND CompanyId=".$CompanyId." order by GradeId DESC", $con);} 
		$sn=1; while($rGr=mysql_fetch_array($sGr)){ ?>
		
		<?php $sVr=mysql_query("select v.VerticalId,v.VerticalName from hrm_department_vertical v inner join hrm_employee_general g on v.VerticalId=g.EmpVertical where v.ComId=".$CompanyId." AND v.DeptId=".$_REQUEST['d']." AND g.GradeId=".$rGr['GradeId']." group by v.VerticalName order by v.VerticalName ASC", $con); $rowVr=mysql_num_rows($sVr);
		if($rowVr>0)
		{
		 $no=1; while($rVr=mysql_fetch_array($sVr)){ 
		 
		 $sql=mysql_query("select * from hrm_master_eligibility where CompanyId=".$CompanyId." AND DepartmentId=".$_REQUEST['d']." AND GradeId=".$rGr['GradeId']." AND VerticalId=".$rVr['VerticalId'],$con); $row=mysql_num_rows($sql); 
		 if($row==0){ $sql=mysql_query("select * from hrm_master_eligibility where CompanyId=".$CompanyId." AND DepartmentId=".$_REQUEST['d']." AND GradeId=".$rGr['GradeId'],$con); }
		 
		 $res=mysql_fetch_assoc($sql);
		 
		?>
          <tr>
		   <?php if($no==1){ ?>
		   <td class="tdc" rowspan="<?=$rowVr?>"><?=$sn?></td>
		   <td class="tdc" rowspan="<?=$rowVr?>"><?=strtoupper($rGr['GradeValue'])?></td>
		   <?php } ?>
		   <td class="tdc"><?php echo ucwords($rVr['VerticalName']); ?></td>
		   
		   <?php if($_REQUEST['t']==1){ ?>
		   <td class="tdc"><input class="inputc" id="CategoryA<?=$no.''.$sn?>" value="<?=$res['CategoryA']?>" readonly/></td>
		   <td class="tdc"><input class="inputc" id="CategoryB<?=$no.''.$sn?>" value="<?=$res['CategoryB']?>" readonly/></td>
 		   <td class="tdc"><input class="inputc" id="CategoryC<?=$no.''.$sn?>" value="<?=$res['CategoryC']?>" readonly/></td>
		   <td class="tdc"><input class="inputc" id="DA_OutSiteHQ<?=$no.''.$sn?>" value="<?=$res['DA_OutSiteHQ']?>" readonly/></td>
           <td class="tdc"><input class="inputc" id="DA_InSiteHQ<?=$no.''.$sn?>" value="<?=$res['DA_InSiteHQ']?>" readonly/></td>
		   <td class="tdc"><input class="inputc" id="Mobile<?=$no.''.$sn?>" value="<?=$res['Mobile']?>" readonly/></td>
		   <td class="tdc"><input class="inputc" id="Mobile_WithGPS<?=$no.''.$sn?>" value="<?=$res['Mobile_WithGPS']?>" readonly/></td>
 		   <td class="tdc"><input class="inputc" id="Mobile_Remb<?=$no.''.$sn?>" value="<?=$res['Mobile_Remb']?>" readonly/></td>
		   <td class="tdc"><select class="selb" id="Mobile_Remb_Period<?=$no.''.$sn?>" disabled>
		   <option value="" <?php if($res['Mobile_Remb_Period']==''){echo 'selected';}?>></option>
		   <option value="Mnt" <?php if($res['Mobile_Remb_Period']=='Mnt'){echo 'selected';}?>>Monthly</option>
		   <option value="Qtr" <?php if($res['Mobile_Remb_Period']=='Qtr'){echo 'selected';}?>>Quarter</option>
		   <option value="1/2 Yearly" <?php if($res['Mobile_Remb_Period']=='1/2 Yearly'){echo 'selected';}?>>1/2 Yearly</option>
		   <option value="Yearly" <?php if($res['Mobile_Remb_Period']=='Yearly'){echo 'selected';}?>>Yearly</option>
		   </select></td>
           <td class="tdc"><input class="inputc" id="Laptop_Amt<?=$no.''.$sn?>" value="<?=$res['Laptop_Amt']?>" readonly/></td>
		   <td class="tdc"><input class="inputc" id="Mediclaim_Coverage_Slabs<?=$no.''.$sn?>" value="<?=$res['Mediclaim_Coverage_Slabs']?>" readonly/></td>
		   <td class="tdc"><input class="inputc" id="Helth_CheckUp<?=$no.''.$sn?>" value="<?=$res['Helth_CheckUp']?>" readonly/></td>
		   <?php } if($_REQUEST['t']==2){ ?>
		   <td class="tdc"><select class="selb" id="Flight_YN<?=$no.''.$sn?>" disabled>
		   <option value="N" <?php if($res['Flight_YN']=='N'){echo 'selected';}?>>No</option>
		   <option value="Y" <?php if($res['Flight_YN']=='Y'){echo 'selected';}?>>Yes</option>
		   </select></td>
		   <td class="tdc"><select class="selb" id="Flight_Class<?=$no.''.$sn?>" disabled>
		   <option value="Economy" <?php if($res['Flight_Class']=='Economy'){echo 'selected';}?>>Economy</option>
		   <option value="Business" <?php if($res['Flight_Class']=='Business'){echo 'selected';}?>>Business</option>
		   </select></td>
 		   <td class="tdc"><select class="selb" id="Train_YN<?=$no.''.$sn?>" disabled>
		   <option value="N" <?php if($res['Train_YN']=='N'){echo 'selected';}?>>No</option>
		   <option value="Y" <?php if($res['Train_YN']=='Y'){echo 'selected';}?>>Yes</option>
		   </select></td>
		   <td class="tdc"><select class="selb" id="Train_Class<?=$no.''.$sn?>" disabled>
		   <option value="General" <?php if($res['Train_Class']=='General'){echo 'selected';}?>>General</option>
		   <option value="Sleeper" <?php if($res['Train_Class']=='Sleeper'){echo 'selected';}?>>Sleeper</option>
		   <option value="AC-III" <?php if($res['Train_Class']=='AC-III'){echo 'selected';}?>>AC-III</option>
		   <option value="AC-II" <?php if($res['Train_Class']=='AC-II'){echo 'selected';}?>>AC-II</option> 
		   <option value="AC-I" <?php if($res['Train_Class']=='AC-I'){echo 'selected';}?>>AC-I</option>
		   <option value="AC" <?php if($res['Train_Class']=='AC'){echo 'selected';}?>>AC</option>
		   </select></td>
		   <td class="tdc"><input class="input" id="TravelEnt_Rmk<?=$no.''.$sn?>" value="<?=$res['TravelEnt_Rmk']?>" readonly/></td>
		   <td class="tdc"><input class="inputc" id="TW_Km<?=$no.''.$sn?>" value="<?=$res['TW_Km']?>" readonly/></td>
		   <td class="tdc"><input class="inputc" id="TW_InHQ_M<?=$no.''.$sn?>" value="<?=$res['TW_InHQ_M']?>" readonly/></td>
 		   <td class="tdc"><input class="inputc" id="TW_InHQ_D<?=$no.''.$sn?>" value="<?=$res['TW_InHQ_D']?>" readonly/></td>
 		   
		   <?php /*<td class="tdc"><input class="inputc" id="TW_OutHQ_M<?=$no.''.$sn?>" value="<?=$res['TW_OutHQ_M']?>" readonly/></td>
 		   <td class="tdc"><input class="inputc" id="TW_OutHQ_D<?=$no.''.$sn?>" value="<?=$res['TW_OutHQ_D']?>" readonly/></td>*/ ?>
 		   <input type="hidden" class="inputc" id="TW_OutHQ_M<?=$no.''.$sn?>" value="<?=$res['TW_OutHQ_M']?>" readonly/>
 		   <input type="hidden" class="inputc" id="TW_OutHQ_D<?=$no.''.$sn?>" value="<?=$res['TW_OutHQ_D']?>" readonly/>
 		   
		   <td class="tdc"><input class="inputc" id="FW_Km<?=$no.''.$sn?>" value="<?=$res['FW_Km']?>" readonly/></td>
		   <td class="tdc"><input class="inputc" id="FW_InHQ_M<?=$no.''.$sn?>" value="<?=$res['FW_InHQ_M']?>" readonly/></td>
 		   <td class="tdc"><input class="inputc" id="FW_InHQ_D<?=$no.''.$sn?>" value="<?=$res['FW_InHQ_D']?>" readonly/></td>
		   
		   <?php /*<td class="tdc"><input class="inputc" id="FW_OutHQ_M<?=$no.''.$sn?>" value="<?=$res['FW_OutHQ_M']?>" readonly/></td>
 		   <td class="tdc"><input class="inputc" id="FW_OutHQ_D<?=$no.''.$sn?>" value="<?=$res['FW_OutHQ_D']?>" readonly/></td>*/?>
 		   <input type="hidden" class="inputc" id="FW_OutHQ_M<?=$no.''.$sn?>" value="<?=$res['FW_OutHQ_M']?>" readonly/>
 		   <input type="hidden" class="inputc" id="FW_OutHQ_D<?=$no.''.$sn?>" value="<?=$res['FW_OutHQ_D']?>" readonly/>
		   
		   <?php } //if($_REQUEST['t']==2) ?>
		   
		  
           <td class="tdc" style="width:50px;">
		   <span style="cursor:pointer;">
		   <div style="display:none;" id="Save<?=$no.'_'.$sn?>"><img src="images/save.gif" border="0" alt="Save" onClick="FunSave(<?=$no.','.$sn.','.$_REQUEST['d'].','.$_REQUEST['t'].','.$CompanyId.','.$rGr['GradeId']?>,'<?=$rGr['GradeValue']?>',<?=$rVr['VerticalId'].','.$UserId?>)"></div>
		   <div id="Edit<?=$no.'_'.$sn?>"><img src="images/edit.png" border="0" alt="Edit" onClick="FunEdit(<?=$no.','.$sn.','.$_REQUEST['d'].','.$_REQUEST['t']?>)"></div>
		   </span>
		   </td> 
		 </tr>
		<?php $no++; } //while($rVr=mysql_fetch_array($sVr))
		 
		}//if($rowVr>0)
		else
		{
		 
		 $sql=mysql_query("select * from hrm_master_eligibility where CompanyId=".$CompanyId." AND DepartmentId=".$_REQUEST['d']." AND GradeId=".$rGr['GradeId'],$con); $res=mysql_fetch_assoc($sql);
		
		?>
		  <tr>
           <td class="tdc"><?=$sn?></td>
		   <td class="tdc"><?=strtoupper($rGr['GradeValue'])?></td> 
		   <td class="tdc"></td>
		   
		   <?php if($_REQUEST['t']==1){ ?>
		   <td class="tdc"><input class="inputc" id="CategoryA0<?=$sn?>" value="<?=$res['CategoryA']?>" readonly/></td>
		   <td class="tdc"><input class="inputc" id="CategoryB0<?=$sn?>" value="<?=$res['CategoryB']?>" readonly/></td>
 		   <td class="tdc"><input class="inputc" id="CategoryC0<?=$sn?>" value="<?=$res['CategoryC']?>" readonly/></td>
 		   
 		   
		   <td class="tdc"><input class="inputc" id="DA_OutSiteHQ0<?=$sn?>" value="<?=$res['DA_OutSiteHQ']?>" readonly/></td>
		   <td class="tdc"><input class="inputc" id="DA_InSiteHQ0<?=$sn?>" value="<?=$res['DA_InSiteHQ']?>" readonly/></td>
           
		   <td class="tdc"><input class="inputc" id="Mobile0<?=$sn?>" value="<?=$res['Mobile']?>" readonly/></td>
		   <td class="tdc"><input class="inputc" id="Mobile_WithGPS0<?=$sn?>" value="<?=$res['Mobile_WithGPS']?>" readonly/></td>
 		   <td class="tdc"><input class="inputc" id="Mobile_Remb0<?=$sn?>" value="<?=$res['Mobile_Remb']?>" readonly/></td>
		   <td class="tdc"><select class="selb" id="Mobile_Remb_Period0<?=$sn?>" disabled>
		   <option value="" <?php if($res['Mobile_Remb_Period']==''){echo 'selected';}?>></option>
		   <option value="Mnt" <?php if($res['Mobile_Remb_Period']=='Mnt'){echo 'selected';}?>>Monthly</option>
		   <option value="Qtr" <?php if($res['Mobile_Remb_Period']=='Qtr'){echo 'selected';}?>>Quarter</option>
		   <option value="1/2 Yearly" <?php if($res['Mobile_Remb_Period']=='1/2 Yearly'){echo 'selected';}?>>1/2 Yearly</option>
		   <option value="Yearly" <?php if($res['Mobile_Remb_Period']=='Yearly'){echo 'selected';}?>>Yearly</option>
		   </select></td>
           <td class="tdc"><input class="inputc" id="Laptop_Amt0<?=$sn?>" value="<?=$res['Laptop_Amt']?>" readonly/></td>
		   <td class="tdc"><input class="inputc" id="Mediclaim_Coverage_Slabs0<?=$sn?>" value="<?=$res['Mediclaim_Coverage_Slabs']?>" readonly/></td>
		   <td class="tdc"><input class="inputc" id="Helth_CheckUp0<?=$sn?>" value="<?=$res['Helth_CheckUp']?>" readonly/></td>
		   
		   <?php } if($_REQUEST['t']==2){ ?>
		   <td class="tdc"><select class="selb" id="Flight_YN0<?=$sn?>" disabled>
		   <option value="N" <?php if($res['Flight_YN']=='N'){echo 'selected';}?>>No</option>
		   <option value="Y" <?php if($res['Flight_YN']=='Y'){echo 'selected';}?>>Yes</option>
		   </select></td>
		   <td class="tdc"><select class="selb" id="Flight_Class0<?=$sn?>" disabled>
		   <option value="Economy" <?php if($res['Flight_Class']=='Economy'){echo 'selected';}?>>Economy</option>
		   <option value="Business" <?php if($res['Flight_Class']=='Business'){echo 'selected';}?>>Business</option>
		   </select></td>
 		   <td class="tdc"><select class="selb" id="Train_YN0<?=$sn?>" disabled>
		   <option value="N" <?php if($res['Train_YN']=='N'){echo 'selected';}?>>No</option>
		   <option value="Y" <?php if($res['Train_YN']=='Y'){echo 'selected';}?>>Yes</option>
		   </select></td>
		   <td class="tdc"><select class="selb" id="Train_Class0<?=$sn?>" disabled>
		   <option value="General" <?php if($res['Train_Class']=='General'){echo 'selected';}?>>General</option>
		   <option value="Sleeper" <?php if($res['Train_Class']=='Sleeper'){echo 'selected';}?>>Sleeper</option>
		   <option value="AC-III" <?php if($res['Train_Class']=='AC-III'){echo 'selected';}?>>AC-III</option>
		   <option value="AC-II" <?php if($res['Train_Class']=='AC-II'){echo 'selected';}?>>AC-II</option> 
		   <option value="AC-I" <?php if($res['Train_Class']=='AC-I'){echo 'selected';}?>>AC-I</option>
		   <option value="AC" <?php if($res['Train_Class']=='AC'){echo 'selected';}?>>AC</option>
		   </select></td>
		   <td class="tdc"><input class="input" id="TravelEnt_Rmk0<?=$sn?>" value="<?=$res['TravelEnt_Rmk']?>" readonly/></td>
		   
		   <td class="tdc"><input class="inputc" id="TW_Km0<?=$sn?>" value="<?=$res['TW_Km']?>" readonly/></td>
		   <td class="tdc"><input class="inputc" id="TW_InHQ_M0<?=$sn?>" value="<?=$res['TW_InHQ_M']?>" readonly/></td>
 		   <td class="tdc"><input class="inputc" id="TW_InHQ_D0<?=$sn?>" value="<?=$res['TW_InHQ_D']?>" readonly/></td>
		   <?php /*<td class="tdc"><input class="inputc" id="TW_OutHQ_M0<?=$sn?>" value="<?=$res['TW_OutHQ_M']?>" readonly/></td>
 		   <td class="tdc"><input class="inputc" id="TW_OutHQ_D0<?=$sn?>" value="<?=$res['TW_OutHQ_D']?>" readonly/></td>*/?>
 		   <input type="hidden" class="inputc" id="TW_OutHQ_M0<?=$sn?>" value="<?=$res['TW_OutHQ_M']?>" readonly/>
 		   <input type="hidden" class="inputc" id="TW_OutHQ_D0<?=$sn?>" value="<?=$res['TW_OutHQ_D']?>" readonly/>
 		   
 		   
		   <td class="tdc"><input class="inputc" id="FW_Km0<?=$sn?>" value="<?=$res['FW_Km']?>" readonly/></td>
		   <td class="tdc"><input class="inputc" id="FW_InHQ_M0<?=$sn?>" value="<?=$res['FW_InHQ_M']?>" readonly/></td>
 		   <td class="tdc"><input class="inputc" id="FW_InHQ_D0<?=$sn?>" value="<?=$res['FW_InHQ_D']?>" readonly/></td>
		   <?php /*<td class="tdc"><input class="inputc" id="FW_OutHQ_M0<?=$sn?>" value="<?=$res['FW_OutHQ_M']?>" readonly/></td>
 		   <td class="tdc"><input class="inputc" id="FW_OutHQ_D0<?=$sn?>" value="<?=$res['FW_OutHQ_D']?>" readonly/></td>*/ ?>
 		   <input type="hidden" class="inputc" id="FW_OutHQ_M0<?=$sn?>" value="<?=$res['FW_OutHQ_M']?>" readonly/>
 		   <input type="hidden" class="inputc" id="FW_OutHQ_D0<?=$sn?>" value="<?=$res['FW_OutHQ_D']?>" readonly/>
 		   
		   <?php } //if($_REQUEST['t']==2) ?> 
		    
           <td class="tdc" style="width:50px;">
		   <span style="cursor:pointer;">
		   <div style="display:none;" id="Save0_<?=$sn?>"><img src="images/save.gif" border="0" alt="Save" onClick="FunSave(0,<?=$sn.','.$_REQUEST['d'].','.$_REQUEST['t'].','.$CompanyId.','.$rGr['GradeId']?>,'<?=$rGr['GradeValue']?>',0,<?=$UserId?>)"></div>
		   <div id="Edit0_<?=$sn?>"><img src="images/edit.png" border="0" alt="Edit" onClick="FunEdit(0,<?=$sn.','.$_REQUEST['d'].','.$_REQUEST['t']?>)"></div>
		   </span>
		   </td>
		  </tr> 
		<?php
		} //else
		?>
		
<?php $sn++; } //while($rGr=mysql_fetch_array($sGr)) ?>
         
		 
		
		<tr>
		   <td class="th" rowspan="3" style="width:40px;">Sn</td>
		   <td class="th" rowspan="3" style="width:40px;">Grade</td>
		   <td class="th" rowspan="3" style="width:200px;">Vertical</td>
		   <?php if($_REQUEST['t']==1){ ?>
		   <td class="th" style="width:50px;">A</td>
		   <td class="th" style="width:50px;">B</td>
 		   <td class="th" style="width:50px;">C</td>
		   
		   <td class="th" style="width:60px;">OutSide<br>HQ</td>
		   <td class="th" style="width:60px;">@<br>HQ</td>
		   <td class="th" style="width:60px;">Normal<br>(Rs)</td>
		   <td class="th" style="width:60px;">GPRS<br>(Rs)</td>
		   <td class="th" style="width:60px;">Reimb<br>(Rs)</td>
		   <td class="th" style="width:60px;">Period</td>
		   <td class="th" rowspan="2" style="width:80px;">Laptop<br>(Rs)</td>
		   <td class="th" rowspan="2" style="width:80px;">Mediclaim<br>Coverage<br>Slabs<br>(Rs)</td>
		   <td class="th" rowspan="2" style="width:80px;">Helth<br>Checkup<br>(Rs)</td>
		   <?php } if($_REQUEST['t']==2){ ?>
		   <td class="th" style="width:50px;">Allow</td>
		   <td class="th" style="width:70px;">Class</td>
		   <td class="th" style="width:50px;">Allow</td>
		   <td class="th" style="width:70px;">Class</td>
		   <td class="th" rowspan="2" style="width:100px;">Remark</td>
		   <td class="th" rowspan="2" style="width:50px;">Rs/Km</td>
		   <td class="th" style="width:60px;">Km/<br>Month</td>
		   <td class="th" style="width:60px;">Km/<br>Day</td>
		   <?php /*<td class="th" style="width:60px;">Km<br>Month</td>
		   <td class="th" style="width:60px;">Km<br>Day</td>*/ ?>
		   <td class="th" rowspan="2" style="width:50px;">Rs/Km</td>
		   <td class="th" style="width:60px;">Km/<br>Month</td>
		   <td class="th" style="width:60px;">Km/<br>Annum</td>
		   <?php /*<td class="th" style="width:60px;">Km<br>Month</td>
		   <td class="th" style="width:60px;">Km<br>Day</td>*/ ?>
		   <?php } ?>
		   <td class="th" rowspan="3" style="width:50px;">Action</td>
		</tr>
		<tr style="background-color:#7a6189;">
		   <?php if($_REQUEST['t']==1){ ?>
		   <td class="th" colspan="3">Category City</td>
		   <td class="th" colspan="2">Daily Allowance</td>
		   <td class="th" colspan="4">Mobile Handset & Reimbursement</td>
		   <?php } if($_REQUEST['t']==2){ ?>
		   <td class="th" colspan="2">Flight</td>
		   <td class="th" colspan="2">Train</td>
		   <td class="th" colspan="2">Max. Limit</td>
		   <?php /*<td class="th" colspan="2">DA Outside HQ</td>*/ ?>
		   <td class="th" colspan="2">Max. Limit</td>
		   <?php /*<td class="th" colspan="2">DA Outside HQ</td>*/ ?>
		   <?php } ?>
		</tr>
		<tr style="background-color:#7a6189;">
		   <?php if($_REQUEST['t']==1){ ?>
		   <td class="th" colspan="3">Lodging Entitlement</td>
		   <td class="th" colspan="9">Daily Allowance & Others</td>
		   <?php } if($_REQUEST['t']==2){ ?>
		   <td class="th" colspan="5">Travel Entitlement</td>
		   <td class="th" colspan="3">Two Wheeler</td>
		   <td class="th" colspan="3">Four Wheeler</td>
		   <?php } ?>
		</tr>
		 
		 </table>
	  </td>
    </tr>
	  
   
  </table>
</td>
<?php //*****************************************************************************************************?>    

 </tr>
<?php } ?> 
</table>
		
<?php //******************************************************************************?>
<?php //****************END*****END*****END******END******END***************************?>
<?php //******************************************************************************?>
		
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
