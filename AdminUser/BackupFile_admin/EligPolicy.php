<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}
/*************************************************************************************************************************/

if(isset($_POST['PSave']))
{
  $sqlx=mysql_query("select Max(PolicyId) as MaxId from hrm_master_eligibility_policy",$con);
  $resx=mysql_fetch_assoc($sqlx); $MaxId=$resx['MaxId']+1;
  $InUp=mysql_query("insert into hrm_master_eligibility_policy(PolicyId,PolicyName,CompanyId,CrBy,CrDate,SysDate) values(".$MaxId.",'".$_POST['PolicyName']."',".$CompanyId.",".$UserId.",'".date("Y-m-d")."','".date("Y-m-d")."')"); 
  if($InUp)
  { 
   
   
   foreach($_POST['DeptName'] as $dept)
   { 
	 $InsUp=mysql_query("insert into hrm_master_eligibility_policy_dept(PolicyId,DeptId,Sts,CrDate) values(".$MaxId.",".$dept.",1,'".date("Y-m-d")."')",$con);
   }
   
    echo '<script>alert("data inserted successfully"); document.getElementById("PolicyName").value=""; </script>';
    /*
    $Action='insert'; $ComId=$CompanyId; $UId=$UserId; $EId=0; 
    $tbln='user_master_activity'; $Activity='insert msters for Eligibility Policy, value - '.$_POST['PolicyName'];
    include("logbook.php");
	echo '<script>window.location="EligPolicy.php?act='.$act.'&typ='.$typ.'";</script>';
	*/
  }
}
if(isset($_POST['PEdit']))
{ 
  $InUp=mysql_query("update hrm_master_eligibility_policy set PolicyName='".$_POST['PolicyName']."', CrBy=".$UserId.", CrDate='".date("Y-m-d")."',SysDate='".date("Y-m-d")."' where PolicyId=".$_POST['pi'],$con);
  if($InUp)
  { 
     
	$sqlD=mysql_query("delete from hrm_master_eligibility_policy_dept where PolicyId=".$_POST['pi']."",$con);
    foreach($_POST['DeptName'] as $dept)
    { 
	  $InsUp=mysql_query("insert into hrm_master_eligibility_policy_dept(PolicyId,DeptId,Sts,CrDate) values(".$_POST['pi'].",".$dept.",1,'".date("Y-m-d")."')",$con);
    }
    echo '<script>alert("data updated successfully"); document.getElementById("PolicyName").value=""; </script>';
    /*
    $Action='update'; $ComId=$CompanyId; $UId=$UserId; $EId=0; 
    $tbln='user_master_activity'; $Activity='update msters for Eligibility Policy, value - '.$_POST['PolicyName'];
    include("logbook.php");
	echo '<script>window.location="EligPolicy.php";</script>';
    */
  }
}
if(isset($_POST['FSave']))
{ 
  $InUp=mysql_query("insert into hrm_master_eligibility_field(FiledName,CompanyId,CrBy,CrDate,SysDate) values('".$_POST['FieldName']."',".$CompanyId.",".$UserId.",'".date("Y-m-d")."','".date("Y-m-d")."')");
  if($InUp)
  { 
    echo '<script>alert("data inserted successfully"); document.getElementById("FieldName").value=""; </script>';
    /*
    $Action='insert'; $ComId=$CompanyId; $UId=$UserId; $EId=0; 
    $tbln='user_master_activity'; $Activity='insert msters for Eligibility Field, value - '.$_POST['FieldName'];
    include("logbook.php");
	echo '<script>window.location="EligPolicy.php?act='.$act.'&typ='.$typ.'";</script>';
	*/
  }
}
if(isset($_POST['FEdit']))
{ 
  $InUp=mysql_query("update hrm_master_eligibility_field set FiledName='".$_POST['FieldName']."', CrBy=".$UserId.", CrDate='".date("Y-m-d")."', SysDate='".date("Y-m-d")."' where FieldId=".$_POST['fi'],$con);
  if($InUp)
  { 
    echo '<script>alert("data updated successfully"); document.getElementById("FieldName").value="";</script>';
    /*
    $Action='update'; $ComId=$CompanyId; $UId=$UserId; $EId=0; 
    $tbln='user_master_activity'; $Activity='update msters for Eligibility Field, value - '.$_POST['FieldName'];
    include("logbook.php");
	echo '<script>window.location="EligPolicy.php";</script>';
	*/
  }
  
}  
  
if(isset($_POST['FSubSave']))
{
  $InUp=mysql_query("insert into hrm_master_eligibility_subfield(SubFiledName,FiledId,CrBy,CrDate,SysDate) values('".$_POST['SubFieldName']."','".$_POST['FieldId']."',".$UserId.",'".date("Y-m-d")."','".date("Y-m-d")."')"); 
  if($InUp)
  { 
    echo '<script>alert("data inserted successfully"); </script>';
    /*
    $Action='insert'; $ComId=$CompanyId; $UId=$UserId; $EId=0; 
    $tbln='user_master_activity'; $Activity='insert msters for Eligibility Policy, value - '.$_POST['PolicyName'];
    include("logbook.php");
	echo '<script>window.location="EligPolicy.php?act='.$act.'&typ='.$typ.'";</script>';
	*/
  }
} 

if(isset($_POST['FSubEdit']))
{ 
  $InUp=mysql_query("update hrm_master_eligibility_subfield set SubFiledName='".$_POST['SubFieldName']."' where SubFieldId=".$_POST['SubFieldId'],$con); 
  if($InUp)
  { 
    echo '<script>alert("data updated successfully"); document.getElementById("SubFieldName").value="";</script>';
  }
  
}  
 
?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style> 
.th{ font-family:Times New Roman;font-size:13px; font-weight:bold; text-align:center; height:26px; color:#FFFFFF; background-color:#7a6189; }
.tdc{ font-family:Times New Roman;font-size:13px; text-align:center;height:22px; }
.tdl{ font-family:Times New Roman;font-size:13px; text-align:left;height:22px; }
.tdr{ font-family:Times New Roman;font-size:13px; text-align:right;height:22px; }
.input{ font-family:Times New Roman; font-size:12px; width:100%; height:20px; border:hidden; background-color:#FFFF9F;}
.inputc{ font-family:Times New Roman; font-size:12px; width:100%; height:20px; border:hidden; text-align:center; background-color:#FFFF9F;}
.sel{ font-family:Times New Roman; font-size:12px; width:99%; height:21px; }
.selb{ font-family:Times New Roman; font-size:12px; width:99%; height:21px; border:hidden; background-color:#CBD6B4; }
.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;}
.SaveButton {background-image:url(images/save.gif); width:20px; height:20px; background-repeat:no-repeat; background-color:#FFFFFF; border-color:#FFFFFF; border-bottom:inherit;}
</style>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<Script type="text/javascript">
function FunNew(v,c,u){ var x = "EligPolicy.php?act=add&typ="+v+"&c="+c+"&u="+u; window.location=x; }
function FunEdit(v,pfi,c,u){ var x = "EligPolicy.php?act=edit&typ="+v+"&pfi="+pfi+"&c="+c+"&u="+u; window.location=x; }

function OpenPLoad(PForm)
{
 document.getElementById('loaderDiv').style.display='block';
} 
function OpenFLoad(FForm)
{
 document.getElementById('loaderDiv').style.display='block';
}       
//function del(value) { var agree=confirm("Are you sure you want to delete this record?");
//if (agree) { var x = "EligPolicy.php?action=delete&did="+value;  window.location=x;}}

function FunSubO(k){ document.getElementById("Div"+k).style.display='block'; document.getElementById("SpanO"+k).style.display='block'; document.getElementById("SpanC"+k).style.display='none'; } 
function FunSubC(k){ document.getElementById("Div"+k).style.display='none'; document.getElementById("SpanO"+k).style.display='none'; document.getElementById("SpanC"+k).style.display='block'; } 

function FunSubOF(k){ document.getElementById("DivF"+k).style.display='block'; document.getElementById("SpanOF"+k).style.display='block'; document.getElementById("SpanCF"+k).style.display='none'; } 
function FunSubCF(k){ document.getElementById("DivF"+k).style.display='none'; document.getElementById("SpanOF"+k).style.display='none'; document.getElementById("SpanCF"+k).style.display='block'; } 


function FClickC(sn,m,pi,fi,ci)
{ 
 if(document.getElementById("FChk"+sn+"_"+m).checked==true){var chk=1;}else{var chk=0;} 
 var ord=document.getElementById("Ord"+sn+"_"+m).value; 
 if(ord=='' && chk===1){alert("insert order no!"); document.getElementById("FChk"+sn+"_"+m).checked=false; return false; }
 var url = 'EligPolicyAjax.php'; var pars = 'Act=ploicyTbl&chk='+chk+'&pi='+pi+'&fi='+fi+'&ord='+ord+'&ci='+ci+'&m='+m+'&sn='+sn;	
 var myAjax = new Ajax.Request( url, { method: 'post', parameters: pars, onComplete: show_return });
} 
function show_return(originalRequest)
{ 
 document.getElementById('AjaxSpan').innerHTML = originalRequest.responseText; 
 var sn=document.getElementById("RstSn").value; var m=document.getElementById("RstMn").value;
 if(document.getElementById("RstInp").value==1 && document.getElementById("Rstchk").value==1)
 {
  document.getElementById("TDF"+sn+"_"+m).style.background='#008000';
 }
 else if(document.getElementById("RstInp").value==1 && document.getElementById("Rstchk").value==0)
 {
  document.getElementById("TDF"+sn+"_"+m).style.background='#FFFFFF';
 }
 else{ alert("Error");}
}


function FunCrTbl(sn,pi,ci)
{
 var agree=confirm("Are you sure?, you want to create policy table with below selected field.");
 if(agree)
 {
  document.getElementById('loaderDiv').style.display='block';
  var url = 'EligPolicyAjax.php'; var pars = 'ActCr=CrploicyTbl&sn='+sn+'&pi='+pi+'&ci='+ci;	
  var myAjax = new Ajax.Request( url, { method: 'post', parameters: pars, onComplete: show_Creturn });
 }
 else{return false;}
}
function show_Creturn(originalRequest)
{ 
 document.getElementById('AjaxSpan').innerHTML = originalRequest.responseText;
 if(document.getElementById("RstInp").value==1){alert("Table Created Successfully");}
 else{alert("Error");}
 document.getElementById('loaderDiv').style.display='none';
 window.location="EligPolicy.php?d=1&t=1";
} 

function FunDeTbl(sn,pi,ci)
{
 var agree=confirm("Are you sure?, you want to delete policy table.");
 if(agree)
 {
  document.getElementById('loaderDiv').style.display='block';
  var url = 'EligPolicyAjax.php'; var pars = 'ActDe=DeploicyTbl&sn='+sn+'&pi='+pi+'&ci='+ci;	
  var myAjax = new Ajax.Request( url, { method: 'post', parameters: pars, onComplete: show_Dreturn });
 }
 else{ return false; }
}
function show_Dreturn(originalRequest)
{ 
 document.getElementById('AjaxSpan').innerHTML = originalRequest.responseText;
 if(document.getElementById("RstInp").value==1){ alert("Table Deleted Successfully"); }
 else{ alert("Error"); }
 document.getElementById('loaderDiv').style.display='none';
 window.location="EligPolicy.php?d=1&t=1";
} 


</SCRIPT> 
</head>
<body class="body">

<div id="loaderDiv" style="background-color: rgba(0,0,0,0.8);width: 100%;height: 100%;position: fixed;top:0px;left: 0px;font-size: 12px; display:none;">	
	<center>
	<span style="color:white;top: 50%;left:38%;position: absolute;">Please Wait, working on Progress...<img src="images/loader.gif"></span>
	</center>
</div>
<span id="AjaxSpan"></span>
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

<span id="SpanForElig"></span>	  
<table border="0" style="margin-top:0px; width:100%;">
 <tr>
  <td align="left" height="20" valign="top" colspan="3">
   <table border="0">
    <tr>
	  <td width="300" class="heading">Eligibility Policy Name & Field</td>
	  <td align="right">
		<input type="button" name="back" id="back" style="width:90px;" value="back" onClick="javascript:window.location='Index.php?log=<?php echo $_SESSION['logCheckUser']; ?>'"/>
		<input type="button" name="Refrash" value="refresh" style="width:90px;" onClick="javascript:window.location='EligPolicy.php?d=1&t=1'"/></td>
	  <td class="font4" style="left">&nbsp;&nbsp;&nbsp;<b><?php echo $msg; ?></b></td>
	</tr>
   </table>
  </td>
 </tr>
<?php if($_SESSION['login'] = true) { ?>	
 <tr>
 
<?php //************************************* 111111 Policy Name ****************************?> 
<?php //************************************* 111111 Policy Name ****************************?> 
<td id="type" valign="top" style="width:30%;">             
	     <table border="1" style="width:100%;background-color:#FFFFFF;" cellspacing="0">
		 <tr>
		  <td colspan="4">&nbsp;&nbsp;<a href="#" style="cursor:pointer;font-size:14px;font-family:Times New Roman;" border="0" onClick="FunNew('p',<?=$CompanyId.','.$UserId?>)">Create New Policy</a></td>
		 </tr>
		 <tr>
		   <td class="th" style="width:40px;">Sn</td>
		   <td class="th" style="width:250px;">Policy Name</td>
		   <td class="th" style="width:150px;">Department</td>
		   <td class="th" style="width:80px;">Action</td>
		 </tr>
		 <form name="PForm" method="post" onSubmit="OpenPLoad(this)">
		 <?php if(($_REQUEST['act']=='add' || $_REQUEST['act']=='edit') && $_REQUEST['typ']=='p'){ 
		 if($_REQUEST['act']=='edit'){ $sN=mysql_query("select PolicyName from hrm_master_eligibility_policy where PolicyId=".$_REQUEST['pfi'],$con); $rN=mysql_fetch_assoc($sN); $Pn=$rN['PolicyName']; }else{$Pn='';} ?>
		  <tr>
           <td class="tdc"><input type="hidden" name="pi" value="<?=$_REQUEST['pfi']?>"/></td>
		   <td class="tdc"><input class="input" id="PolicyName" name="PolicyName" value="<?=$Pn?>"/></td>
		   <td class="tdc"><select class="input" id="DeptName" name="DeptName[]" multiple="multiple" style="height:100px;">
		   <option value="0" <?php if($rN['DeptId']==0){echo 'selected';}?>>Select</option>
		   <?php $sD=mysql_query("select DepartmentId,DepartmentCode from hrm_department where CompanyId=".$CompanyId." order by DepartmentName ASC",$con); while($rD=mysql_fetch_assoc($sD)){ 
		   
		   $sql=mysql_query("select * from hrm_master_eligibility_policy_dept where PolicyId=".$_REQUEST['pfi']." AND DeptId=".$rD['DeparmentId']." and Sts=1",$con); $row=mysql_num_rows($sql);
		   ?>
		   <option value="<?=$rD['DepartmentId']?>" <?php if($row>0){echo 'selected';}?>><?=$rD['DepartmentCode']?></option>
		   <?php } ?>
		   </select>
		   </td>
           <td class="tdc" style="width:50px;">
		   <span style="cursor:pointer;">
		<?php if($_REQUEST['act']=='add'){?><input type="submit" name="PSave" value="save" style="width:60px;"><?php }?>
		<?php if($_REQUEST['act']=='edit'){?><input type="submit" name="PEdit" value="update" style="width:60px;"><?php }?>
		   </span>
		   </td>
		  </tr>
		 <?php } ?>
		 </form>
		 
        <?php $sql=mysql_query("select * from hrm_master_eligibility_policy where CompanyId=".$CompanyId." order by PolicyId ASC", $con); $sn=1; while($res=mysql_fetch_array($sql)){ 
		
		//$sD=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$res['DeptId'],$con);
		//$rD=mysql_fetch_assoc($sD);
		?>
		  <tr>
           <td class="tdc"><?=$sn?></td>
		   <td class="tdl">&nbsp;<?=$res['PolicyName']?></td>
		   <td class="tdl">&nbsp;
		   <?php $sqlD=mysql_query("select DepartmentCode from hrm_master_eligibility_policy_dept pd inner join hrm_department d on pd.DeptId=d.DepartmentId where pd.PolicyId=".$res['PolicyId']." AND pd.Sts=1",$con); 
		   $rowD=mysql_num_rows($sqlD);  $no=1;
		   while($resD=mysql_fetch_assoc($sqlD)){ echo $resD['DepartmentCode']; if($no<$rowD){echo ', ';} $no++; }?></td>
           <td class="tdc" style="width:50px;">
		   <span style="cursor:pointer;"><div id="Edit"><img src="images/edit.png" border="0" alt="Edit" onClick="FunEdit('p',<?=$res['PolicyId']?>,<?=$CompanyId.','.$UserId?>)"></div></span>
		   </td>
		  </tr> 
		
<?php $sn++; } //while($res=mysql_fetch_array($sql)) ?>
		 </table>
</td>
<?php /********* Close Close *******/ ?>
<?php /********* Close Close *******/ ?>

<td style="width:3%;">&nbsp;</td>

<?php //******************************* 222222 Field **********************************?> 
<?php //******************************* 222222 Field **********************************?>
<td id="type" valign="top" style="width:25%;">  
<div style="max-height:450px; overflow:scroll;">           
	     <table border="1" style="width:100%;background-color:#FFFFFF;" cellspacing="0">
		 <tr>
		  <td colspan="3">&nbsp;&nbsp;<a href="#" style="cursor:pointer;font-size:14px;font-family:Times New Roman;" border="0" onClick="FunNew('f',<?=$CompanyId.','.$UserId?>)">Create New Field</a></td>
		 </tr>
		 <tr>
		   <td class="th" style="width:40px;">Sn</td>
		   <td class="th" style="width:400px;">Field Name</td>
		   <td class="th" style="width:80px;">Action</td>
		 </tr>
		 <form name="FForm" method="post" onSubmit="OpenFLoad(this)">
		 <?php if(($_REQUEST['act']=='add' || $_REQUEST['act']=='edit') && $_REQUEST['typ']=='f'){ 
		 if($_REQUEST['act']=='edit'){ $sF=mysql_query("select FiledName from hrm_master_eligibility_field where FieldId=".$_REQUEST['pfi'],$con); $rF=mysql_fetch_assoc($sF); $Fn=$rF['FiledName']; }else{$Fn='';}?>
		  <tr>
           <td class="tdc"><input type="hidden" name="fi" value="<?=$_REQUEST['pfi']?>"/></td>
		   <td class="tdc"><input class="input" id="FieldName" name="FieldName" value="<?=$Fn?>"/></td>
           <td class="tdc" style="width:50px;">
		   <span style="cursor:pointer;">
		<?php if($_REQUEST['act']=='add'){?><input type="submit" name="FSave" value="save" style="width:60px;"><?php }?>
		<?php if($_REQUEST['act']=='edit'){?><input type="submit" name="FEdit" value="update" style="width:60px;"><?php }?>
		   </span>
		   </td>
		  </tr>
		 <?php } ?>
		 </form>
		 
        <?php $sql=mysql_query("select * from hrm_master_eligibility_field where CompanyId=".$CompanyId." order by FieldId ASC", $con); $sn=1; while($res=mysql_fetch_array($sql)){ ?>
		   
		  <tr>
           <td align="center" valign="middle"><input class="Input" style="width:40px;text-align:center;font-weight:bold;height:12px; font-size:12px;background-color:#FFFFFF;" value="<?=$sn?>" readonly/>
		   <?php /*
		   <span style="cursor:pointer;"><img src="images/open-folder.png" style="height:12px;display:none;" onClick="FunSubCF(<?=$sn?>)" id="SpanOF<?=$sn?>"/><img src="images/close-folder.png" style="height:12px;display:block;" onClick="FunSubOF(<?=$sn?>)" id="SpanCF<?=$sn?>"/></span>
		   */ ?>
		   <input type="hidden" id="FiledIdNo_<?=$sn?>"></td>
		   <td class="tdl">&nbsp;<?=$res['FiledName']?></td>
           <td class="tdc" style="width:50px;">
		   <span style="cursor:pointer;">
		   <div id="Edit"><img src="images/edit.png" border="0" alt="Edit" onClick="FunEdit('f',<?=$res['FieldId']?>,<?=$CompanyId.','.$UserId?>)"></div>
		   </span>
		   </td>
		  </tr>
		  
		            <tr> 
<!-- 1111111111111111111111111111111111 Start -->	
<!-- 1111111111111111111111111111111111 Start -->
  <?php /* $sSubF=mysql_query("select * from hrm_master_eligibility_subfield where FiledId=".$res['FieldId']." order by FiledId ASC, SubFieldId ASC",$con); $rowSubF=mysql_num_rows($sSubF); ?>
  <td colspan="3" align="right" style="border:hidden;border-style:none;">
   <div id="DivF<?=$sn?>" style="display:none; max-height:200px; overflow:scroll;">
     <table style="width:100%;background-color:#808000;" border="0" cellpadding="0" cellspacing="1"> 
      <tr style="background-color:#808000;">  
       <td class="th" style="width:350px;background-color:#808000;">Sub Field Name</td>
	   <td class="th" style="width:50px;background-color:#808000;">Act</td>
      </tr>
	  <?php if($_REQUEST['act']=='edit' && $_REQUEST['typ']=='Subf'){ $sSubFe=mysql_query("select * from hrm_master_eligibility_subfield where SubFieldId=".$_REQUEST['pfi'],$con); $rowSubFe=mysql_fetch_assoc($sSubFe); } ?>
	      <form name="FSubForm" method="post" onSubmit="OpenFSubLoad(this)">
		  <input type="hidden" id="FieldId" name="FieldId" value="<?php echo $res['FieldId']; ?>">
		  <input type="hidden" id="SubFieldId" name="SubFieldId" value="<?php echo $_REQUEST['pfi']; ?>">
		  <tr style="background-color:#FFFFFF;">
		   <td class="tdc"><input class="input" id="SubFieldName" name="SubFieldName" value="<?=$rowSubFe['SubFiledName']?>"/></td>
           <td class="tdc" style="width:50px;">
		   <span style="cursor:pointer;">
		     <input type="submit" name="<?php if($_REQUEST['act']=='edit' && $_REQUEST['typ']=='Subf'){echo 'FSubEdit';}else{echo 'FSubSave';} ?>" value="<?php if($_REQUEST['act']=='edit' && $_REQUEST['typ']=='Subf'){echo 'update';}else{echo 'save';} ?>" style="width:60px;cursor:pointer;">
		   </span>
		   </td>
		  </tr>
		  </form>
		 
      <?php $m=1; while($rSubF=mysql_fetch_assoc($sSubF)){ ?>
      <tr style="background-color:#FFFFFF;">
        <td class="tdl">&nbsp;<?=$rSubF['SubFiledName']?></td>
		<td class="tdc" style="width:50px;">
		   <span style="cursor:pointer;">
		   <div id="Edit"><img src="images/edit.png" border="0" alt="Edit" onClick="FunEdit('Subf',<?=$rSubF['SubFieldId']?>,<?=$CompanyId.','.$UserId?>)"></div>
		   </span>
		   </td>
      </tr>  
      <?php $m++;} ?>	
     </table>
    </div>
   </td>
   */ ?>	
<!-- 1111111111111111111111111111111111 Close -->	
<!-- 1111111111111111111111111111111111 Close -->	  
           </tr> 
		
<?php $sn++; } //while($res=mysql_fetch_array($sql)) ?>
		 </table>
</div>		 
</td>
<?php /********* Close Close *******/ ?>
<?php /********* Close Close *******/ ?>

<td style="width:3%;">&nbsp;</td>

<?php //******************************* 333333 Field **********************************?> 
<?php //******************************* 333333 Field **********************************?>
<td id="type" valign="top" style="width:35%;">             
	     <table border="1" style="width:100%;background-color:#FFFFFF;" cellspacing="0">
		 <tr>
		  <td colspan="2" class="th">&nbsp;&nbsp;Attach Field For Policy Table</td>
		 </tr>
		 <tr>
		   <td class="th" style="width:50px;">Sn</td>
		   <td class="th" style="width:500px;">Policy Name</td>
		 </tr>
		 
        <?php $sql=mysql_query("select * from hrm_master_eligibility_policy where CompanyId=".$CompanyId." order by PolicyId ASC", $con); $sn=1; $exists=0; while($res=mysql_fetch_array($sql)){ ?>
		  <tr>
           <td align="center" valign="middle"><input class="Input" style="width:40px;text-align:center;font-weight:bold;height:12px; font-size:12px;background-color:#FFFFFF;" value="<?=$sn?>" readonly/><span style="cursor:pointer;"><img src="images/open-folder.png" style="height:12px;display:none;" onClick="FunSubC(<?=$sn?>)" id="SpanO<?=$sn?>"/><img src="images/close-folder.png" style="height:12px;display:block;" onClick="FunSubO(<?=$sn?>)" id="SpanC<?=$sn?>"/></span><input type="hidden" id="KraIdNo_<?=$sn?>"><input type="hidden" id="PolicyId_<?=$sn?>" name="PolicyId_<?=$sn?>" value="<?php echo $res['PolicyId']; ?>">
		   </td>
		   <td class="tdl">&nbsp;<?=$res['PolicyName']?>&nbsp;
		   <?php $sschk=mysql_query("select * from hrm_master_eligibility_mapping_tblfield where PolicyId=".$res['PolicyId']." AND FieldId>0 AND Sts=1",$con); $rrowchk=mysql_num_rows($sschk); 
		   
		   if($rrowchk>0){  
		   
		   $resrchk=mysql_fetch_assoc($sschk);
		   //$rst = mysql_query("SHOW COLUMNS FROM hrm_master_eligibility_policy_tbl".$res['PolicyId']." LIKE 'Fn".$resrchk['FieldId']."'",$con); $exists = mysql_num_rows($rst);
		   if($res['CreatedTbl']==0){ ?>
		   <font style="float:right;"><input type="button" id="BtnCrTbl<?=$sn?>" style="background-color:#99CC33;cursor:pointer;" value="Create Policy Table" onClick="FunCrTbl(<?=$sn?>,<?=$res['PolicyId'].','.$CompanyId?>)"/>&nbsp;</font>
		   <?php } else
				 {
				  
				  $sPV=mysql_query("select * from hrm_master_eligibility_policy_tbl".$res['PolicyId']."", $con);
				  $rowPV=mysql_num_rows($sPV);
				  //if($rowPV==0)
				  //{ ?>
				  <font style="float:right;color:#009300;">
				  <input type="button" id="BtnCrTbl<?=$sn?>" style="background-color:#FF8080;cursor:pointer;" value="Delete Policy Table" onClick="FunDeTbl(<?=$sn?>,<?=$res['PolicyId'].','.$CompanyId?>)"/>&nbsp;
				  </font>
				  <?php
				  //} //if($rowPV==0)
				  
				  echo '<b style="float:right;color:#009300;">TABLE CREATED&nbsp;</b>';
				  
				 }
		   
		   ?>
		   <?php } //if($rrowchk>0) 
		         
		   ?>
		   </td>
		  </tr> 
          <tr> 
<!-- 1111111111111111111111111111111111 Start -->	
<!-- 1111111111111111111111111111111111 Start -->
  <?php $sSub=mysql_query("select * from hrm_master_eligibility_field where CompanyId=".$CompanyId." order by FieldId ASC",$con); $rowSub=mysql_num_rows($sSub); ?>
  <td colspan="2" align="right" style="border:hidden;border-style:none;">
   <div id="Div<?=$sn?>" style="display:none; max-height:250px; overflow:scroll;">
     <table style="width:100%;background-color:#808000;" border="0" cellpadding="0" cellspacing="1"> 
      <tr style="background-color:#808000;">  
	   <td rowspan="<?=$rowSub+1?>" style="width:50px;"></td>  
	   <td class="th" style="width:50px;background-color:#808000;">Check</td>
       <td class="th" style="width:350px;background-color:#808000;">Field Name</td>
	   <td class="th" style="width:40px;background-color:#808000;">Order</td>
      </tr>
      <?php $m=1; while($rSub=mysql_fetch_assoc($sSub)){  
	  $rowchk=0;
	  $schk=mysql_query("select * from hrm_master_eligibility_mapping_tblfield where PolicyId=".$res['PolicyId']." AND FieldId=".$rSub['FieldId']."",$con); $rowchk=mysql_num_rows($schk); $rchk=mysql_fetch_assoc($schk);
	  
	  ?>
      <tr style="background-color:#FFFFFF;">
	  
        <td class="tdc" id="TDF<?=$sn.'_'.$m?>" style="background-color:<?php if($rowchk>0 && $rchk['Sts']==1){echo '#008000';}else{echo '#FFFFFF';}?>;"><input type="checkbox" id="FChk<?=$sn.'_'.$m?>" name="FChk<?=$sn.'_'.$m?>" onClick="FClickC(<?=$sn.','.$m?>,<?=$res['PolicyId']?>,<?=$rSub['FieldId'].','.$CompanyId?>)" <?php if($rowchk>0 && $rchk['Sts']==1){echo 'checked'; } ?> <?php if($res['CreatedTbl']>0){ echo 'disabled'; } ?>/></td>
        <td class="tdl">&nbsp;<?=$rSub['FiledName']?></td>
        <td class="tdc"><input class="inputc" id="Ord<?=$sn.'_'.$m?>" name="Ord<?=$sn.'_'.$m?>" value="<?=$rchk['FOrder']?>"/></td>
      </tr>  
      <?php $m++;} ?>	
     </table>
    </div>
   </td>	
   
<!-- 1111111111111111111111111111111111 Close -->	
<!-- 1111111111111111111111111111111111 Close -->	  
           </tr>	  
		
<?php $sn++; } //while($res=mysql_fetch_array($sql)) ?>
		 </table>
</td>
<?php /********* Close Close *******/ ?>
<?php /********* Close Close *******/ ?>

<td style="width:3%;">&nbsp;</td>

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
