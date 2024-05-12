<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');}
include("../function.php");
include('codeEncDec.php');
if(check_user()==false){header('Location:../../../index.php');}
if($_SESSION['login'] = true){require_once('UserMenuSession.php');}

if($_REQUEST['action']=='InsertRecords') 
{
 if($_REQUEST['vnoteId']>0)
 { 
  $sqlinUp=mysql_query("update hrm_sales_note set NoteDate='".date("Y-m-d",strtotime($_REQUEST['vdate']))."', Amount='".$_REQUEST['vamt']."' where NoteId=".$_REQUEST['vnoteId'],$con);
  $sqlin2=mysql_query("insert into hrm_sales_note_detail(NoteId, ItemId, ProductId, SizeId, Qty_ChallanIn, Qty_GodownIn, Qty_DiffIn) values(".$_REQUEST['vnoteId'].", ".$_REQUEST['crp'].", ".$_REQUEST['prd'].", ".$_REQUEST['pkt'].", '".$_REQUEST['qty1']."', '".$_REQUEST['qty2']."', '".$_REQUEST['diff']."')",$con);
  if($sqlin2)
  {
   header('Location:ForwdNote.php?nsi='.$_REQUEST['nsi'].'&y='.$_REQUEST['y'].'&ci='.$_REQUEST['ci'].'&c='.$_REQUEST['c'].'&s='.$_REQUEST['s'].'&hq='.$_REQUEST['hq'].'&dil='.$_REQUEST['dil'].'&grp='.$_REQUEST['grp'].'&q='.$_REQUEST['q'].'&ii='.$_REQUEST['ii'].'&RefId='.$_REQUEST['vrefid'].'&yi='.$_REQUEST['yi'].'&ShowRefId=RefNote&actionact=addnewrecords&vnoteId='.$_REQUEST['vnoteId']);
  }
 }
 else 
 { $sqlIn=mysql_query("insert into hrm_sales_note(NoteSubId, RefId, DealerId, YearId, NoteDate, Amount, CreatedBy, CreatedDate) values(".$_REQUEST['nsi'].", ".$_REQUEST['vrefid'].", ".$_REQUEST['dil'].", ".$_REQUEST['yi'].",'".date("Y-m-d",strtotime($_REQUEST['vdate']))."','".$_REQUEST['vamt']."',".$EmployeeId.",'".date("Y-m-d")."')",$con);
  $sqlId=mysql_query("select NoteId from hrm_sales_note where RefId=".$_REQUEST['vrefid']." AND DealerId=".$_REQUEST['dil']." AND YearId=".$_REQUEST['yi']." AND NoteDate='".date("Y-m-d",strtotime($_REQUEST['vdate']))."'",$con);
  $resId=mysql_fetch_assoc($sqlId);
  $sqlin2=mysql_query("insert into hrm_sales_note_detail(NoteId, ItemId, ProductId, SizeId, Qty_ChallanIn, Qty_GodownIn, Qty_DiffIn) values(".$resId['NoteId'].", ".$_REQUEST['crp'].", ".$_REQUEST['prd'].", ".$_REQUEST['pkt'].", '".$_REQUEST['qty1']."', '".$_REQUEST['qty2']."', '".$_REQUEST['diff']."')",$con);
  
  if($sqlin2)
  { header('Location:ForwdNote.php?nsi='.$_REQUEST['nsi'].'&y='.$_REQUEST['y'].'&ci='.$_REQUEST['ci'].'&c='.$_REQUEST['c'].'&s='.$_REQUEST['s'].'&hq='.$_REQUEST['hq'].'&dil='.$_REQUEST['dil'].'&grp='.$_REQUEST['grp'].'&q='.$_REQUEST['q'].'&ii='.$_REQUEST['ii'].'&RefId='.$_REQUEST['vrefid'].'&yi='.$_REQUEST['yi'].'&ShowRefId=RefNote&actionact=addnewrecords&vnoteId='.$resId['NoteId']);
  }
  
 }
 
}

if($_REQUEST['action']=='deleteRecords')
{ 
  $sqlDel=mysql_query("delete from hrm_sales_note_detail where NoteDetlId=".$_REQUEST['vid'],$con); 
  if($sqlDel)
  {
   header('Location:ForwdNote.php?nsi='.$_REQUEST['nsi'].'&y='.$_REQUEST['y'].'&ci='.$_REQUEST['ci'].'&c='.$_REQUEST['c'].'&s='.$_REQUEST['s'].'&hq='.$_REQUEST['hq'].'&dil='.$_REQUEST['dil'].'&grp='.$_REQUEST['grp'].'&q='.$_REQUEST['q'].'&ii='.$_REQUEST['ii'].'&RefId='.$_REQUEST['RefId'].'&yi='.$_REQUEST['yi'].'&ShowRefId=RefNote&actionact=addnewrecords&vnoteId='.$resId['NoteId']); 
  }
}

if($_REQUEST['action']=='MainvalueDelete')
{
  $sqlDelv=mysql_query("delete from hrm_sales_note where NoteId=".$_REQUEST['nii'],$con); 
  if($sqlDelv)
  { header('Location:ForwdNote.php?ern1=r114&ern2w=234&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y='.$_REQUEST['y'].'&ci='.$_REQUEST['ci'].'&c='.$_REQUEST['c'].'&s='.$_REQUEST['s'].'&hq='.$_REQUEST['hq'].'&dil='.$_REQUEST['dil'].'&grp='.$_REQUEST['grp'].'&q='.$_REQUEST['q'].'&ii='.$_REQUEST['ii']); }
}


?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style> /*background-color:#D9D9FF;  background-color:#EEEEEE; */
.CalenderButton {background-image:url(images/CalenderBtn.jpeg);width:16px;height:16px;background-color:#E0DBE3;border-color:#FFFFFF;}
.htf{font-family:Georgia;color:#000;font-weight:bold;height:22px;text-align:center;font-size:12px;background-color:#97FFFF;}
.htf2{font-family:Georgia;color:#FF80FF;font-weight:bold;text-align:center;font-size:15px;height:24px;}
.tdf{font-family:Verdana;font-size:12px;height:22px;color:#000;}
.td{font-family:Verdana;font-size:12px;color:#fff;}
.tdf2{background-color:#FFFF9D;font-family:Georgia;font-size:15px;height:22px;color:#000000;}
.tdf3{background-color:#FFFFFF;font-family:Times New Roman;font-size:12px;height:20px;color:#000;}
.tdf2_input{background-color:#FFFFFF;font-family:Georgia;font-size:15px;height:20px;color:#000000;}
.InputSel{font-family:Georgia;font-size:12px;text-align:left; }
.InputType{font-family:Georgia;font-size:12px;text-align:left; }
.InputType2{font-family:Georgia;font-size:12px;border:hidden;}
.SaveButton{background-image:url(images/Floppy-Small-icon.png);width:18px;height:18px;background-repeat:no-repeat;}
</style>
<link rel="stylesheet" type="text/css" href="src/css/jscal2.css"/><?php /* Calander Open */ ?>
<link rel="stylesheet" type="text/css" href="src/css/border-radius.css"/>
<link rel="stylesheet" type="text/css" href="src/css/steel/steel.css"/>
<script type="text/javascript" src="src/js/jscal2.js"></script>
<script type="text/javascript" src="src/js/lang/en.js"></script>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<Script type="text/javascript">window.history.forward(1);</Script>
<Script language="javascript">
function ClickCoutry(value,ei,di)
{ var url = 'SlctSalesCouStaCitAchive.php'; var pars = 'CouId='+value+'&ei='+ei+'&di='+di;	var myAjax = new Ajax.Request(
  url, { method: 'post', parameters: pars, onComplete: show_State });
}
function show_State(originalRequest)
{ document.getElementById('StateSpan').innerHTML = originalRequest.responseText; }

function ClickState(value,ei)
{ var CId=document.getElementById('ComId').value; var url = 'SlctSalesCouStaCitAchive.php';	var pars = 'AchiveStaId='+value+'&CId='+CId+'&ei='+ei;	var myAjax = new Ajax.Request(
  url, { method: 'post', parameters: pars, onComplete: show_Hq });
}
function show_Hq(originalRequest)
{ document.getElementById('HqSpan').innerHTML = originalRequest.responseText;}

/*
function ClickHq(value)
{ var url = 'SlctSalesCouStaCit.php';	var pars = 'AchiveHqId='+value;	var myAjax = new Ajax.Request(
  url, { method: 'post', parameters: pars, onComplete: show_Dealer });
}
function show_Dealer(originalRequest)
{ document.getElementById('TabResult').innerHTML = originalRequest.responseText; }
*/

function ClickHq(value)
{ window.location="ForwdNote.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y="+document.getElementById("YearV").value+"&ci="+document.getElementById("ComId").value+"&c="+document.getElementById("Coutry").value+"&s="+document.getElementById("State").value+"&hq="+value+"&grp="+document.getElementById("CropGrp").value+"&q="+document.getElementById("QtrV").value+"&ii="+document.getElementById("ItemV").value; 
}



function Clickcrp(value)
{ var url = 'getproduct.php';	var pars = 'ShowVarietyV='+value;	var myAjax = new Ajax.Request(
  url, { method: 'post', parameters: pars, onComplete: show_Variety }); }
function show_Variety(originalRequest)
{ document.getElementById('varietyspan').innerHTML = originalRequest.responseText; }

function ClickPrd(value)
{ var url = 'getproduct.php';	var pars = 'ShowSizeyV='+value;	var myAjax = new Ajax.Request(
  url, { method: 'post', parameters: pars, onComplete: show_Size }); }
function show_Size(originalRequest)
{ document.getElementById('sizespan').innerHTML = originalRequest.responseText; }


function ClickDealer(di)
{ 
  window.location="ForwdNote.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y="+document.getElementById("YearV").value+"&ci="+document.getElementById("ComId").value+"&c="+document.getElementById("Coutry").value+"&s="+document.getElementById("State").value+"&hq="+document.getElementById("Hq").value+"&dil="+di+"&grp="+document.getElementById("CropGrp").value+"&q="+document.getElementById("QtrV").value+"&ii="+document.getElementById("ItemV").value+"&nsi="+document.getElementById("SubNi").value; 
}
function ChangrYear(YearV)
{
  window.location="ForwdNote.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y="+YearV+"&ci="+document.getElementById("ComId").value+"&c="+document.getElementById("Coutry").value+"&s="+document.getElementById("State").value+"&hq="+document.getElementById("Hq").value+"&dil="+document.getElementById("DealerD").value+"&grp="+document.getElementById("CropGrp").value+"&q="+document.getElementById("QtrV").value+"&ii="+document.getElementById("ItemV").value+"&nsi="+document.getElementById("SubNi").value;  
}

function ClickNSub(nsi)
{
 window.location="ForwdNote.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y="+document.getElementById("YearV").value+"&ci="+document.getElementById("ComId").value+"&c="+document.getElementById("Coutry").value+"&s="+document.getElementById("State").value+"&hq="+document.getElementById("Hq").value+"&dil="+document.getElementById("DealerD").value+"&grp="+document.getElementById("CropGrp").value+"&q="+document.getElementById("QtrV").value+"&ii="+document.getElementById("ItemV").value+"&nsi="+nsi;
}

function FunNewNote(di,nsi)
{
 var agree=confirm("Are you sure you want to add new records?");
 if(agree){ window.location="ForwdNote.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&actionact=addnewrecords&y="+document.getElementById("YearV").value+"&ci="+document.getElementById("ComId").value+"&c="+document.getElementById("Coutry").value+"&s="+document.getElementById("State").value+"&hq="+document.getElementById("Hq").value+"&dil="+di+"&grp="+document.getElementById("CropGrp").value+"&q="+document.getElementById("QtrV").value+"&ii="+document.getElementById("ItemV").value+"&nsi="+nsi; }
 else{return false;}
}

function DelVal(Id,nsi,RefId)
{ 
 var agree=confirm("Are you sure you want to delete records?"); 
 if(agree){ window.location="ForwdNote.php?action=deleteRecords&vid="+Id+"&RefId="+RefId+"&nsi="+nsi+"&y="+document.getElementById("YearV").value+"&ci="+document.getElementById("ComId").value+"&c="+document.getElementById("Coutry").value+"&s="+document.getElementById("State").value+"&hq="+document.getElementById("Hq").value+"&dil="+document.getElementById("DealerD").value+"&grp="+document.getElementById("CropGrp").value+"&q="+document.getElementById("QtrV").value+"&ii="+document.getElementById("ItemV").value+"&actionact=addnewrecords&vnoteId"; }else{return false;}
}

function SaveRecords() 
{ var Numfilter=/^[0-9. ]+$/; var test_num2 = Numfilter.test(document.getElementById("vamt").value)
 if(document.getElementById("crp").value==0){alert("Please select crop"); return false;}
 else if(document.getElementById("prd").value==0){alert("Please select variety"); return false;}
 else if(document.getElementById("pkt").value==0){alert("Please select pack size"); return false;}
 else if(document.getElementById("qty1").value==''){alert("Please insert 'qty as per the party challan' value"); return false;}
 else if(document.getElementById("qty2").value==''){alert("Please insert 'received qty at godown' value"); return false;}
 else if(document.getElementById("diff").value==''){alert("Please insert 'difference in qty' value"); return false;}
 else if(document.getElementById("vamt").value==''){alert("Please insert 'amount' value"); return false;}
 else if(document.getElementById("vamt").value==''){alert("Please insert 'amount' value"); return false;}
 else if(test_num2==false) { alert('Please enter only number in amount field'); return false; }
 else 
 { var agree=confirm("Are you sure you want to insert records?");
   if(agree){ window.location="ForwdNote.php?action=InsertRecords&nsi="+document.getElementById("nsi").value+"&y="+document.getElementById("YearV").value+"&ci="+document.getElementById("ComId").value+"&c="+document.getElementById("Coutry").value+"&s="+document.getElementById("State").value+"&hq="+document.getElementById("Hq").value+"&dil="+document.getElementById("DealerD").value+"&grp="+document.getElementById("CropGrp").value+"&q="+document.getElementById("QtrV").value+"&ii="+document.getElementById("ItemV").value+"&crp="+document.getElementById("crp").value+"&prd="+document.getElementById("prd").value+"&pkt="+document.getElementById("pkt").value+"&qty1="+document.getElementById("qty1").value+"&qty2="+document.getElementById("qty2").value+"&diff="+document.getElementById("diff").value+"&vamt="+document.getElementById("vamt").value+"&vdate="+document.getElementById("vdate").value+"&vrefid="+document.getElementById("vrefid").value+"&yi="+document.getElementById("yi").value+"&actionact=addnewrecords&vnoteId="+document.getElementById("vnoteId").value; }else{return false;}
 } 
}

function DetailNote(v)
{ window.open("DetailsNote.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&actionact=addnewrecords&ID="+v,'_blank'); window.focus(); }

function EditVal(Id,nsi,RefId,dil,hq)
{
 var agree=confirm("Are you sure you want to edit records?"); 
 if(agree){ window.location="ForwdNote.php?vid="+Id+"&RefId="+RefId+"&nsi="+nsi+"&y="+document.getElementById("YearV").value+"&ci="+document.getElementById("ComId").value+"&c="+document.getElementById("Coutry").value+"&s="+document.getElementById("State").value+"&hq="+hq+"&dil="+dil+"&grp="+document.getElementById("CropGrp").value+"&q="+document.getElementById("QtrV").value+"&ii="+document.getElementById("ItemV").value+"&yi="+document.getElementById("YearV").value+"&ShowRefId=RefNote&actionact=addnewrecords&vnoteId="+Id; }else{return false;}
  
}


function DelMainVal(nii)
{
 var agree=confirm("Are you sure you want to delete records?"); 
 if(agree){ window.location="ForwdNote.php?action=MainvalueDelete&ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y="+document.getElementById("YearV").value+"&ci="+document.getElementById("ComId").value+"&c="+document.getElementById("Coutry").value+"&s="+document.getElementById("State").value+"&hq="+document.getElementById("Hq").value+"&dil="+document.getElementById("DealerD").value+"&grp="+document.getElementById("CropGrp").value+"&q="+document.getElementById("QtrV").value+"&ii="+document.getElementById("ItemV").value+"&nii="+nii; }else{return false;}
}

</Script>
</head>
<body class="body">
<?php $sqlDept=mysql_query("select DepartmentId from hrm_employee_general where EmployeeID=".$EmployeeId, $con); $resDept=mysql_fetch_assoc($sqlDept); ?>

<table class="table">
<tr>
 <td>
  <table class="menutable"><tr><td><?php if($_SESSION['login'] = true){ require_once("EMenu.php"); } ?></td></tr></table>
 </td>
</tr>
<tr>
 <td valign="top">
  <table width="100%" style="margin-top:0px;" border="0">
    <tr>
	  <td valign="top"><?php if($_SESSION['login'] = true){ require_once("EWelcome.php"); } ?></td>
	</tr>
	 <tr>
	  <td valign="top" align="center" width="100%" id="MainWindow">
<?php //***********************************************************************/ ?>
<?php //***************START*****START*****START******START******START****************************/ ?>
<?php //************************************************************/ ?>
<input type="hidden" id="ComId" value="<?php echo $_REQUEST['ci']; ?>" /><input type="hidden" id="UserId" value="<?php echo $UserId; ?>" /><input type="hidden" name="CropGrp" id="CropGrp" value="3" /><input type="hidden" name="ItemV" id="ItemV" value="<?php echo $_REQUEST['ii']; ?>" /><input type="hidden" name="QtrV" id="QtrV" value="<?php echo $_REQUEST['q']; ?>" />		  
<table border="0" style="margin-top:0px;width:100%;">	
<tr>
 <td valign="top">
  <table border="0">
   
   <tr>
    <td id="Entry" style="width:1100px;" valign="top">
	<span id="TabEntry">
     <table border="0">
	  <tr>
<td class="heading" rowspan="2"><u>Forwarding_note</u>&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td class="td" style="width:50px;" align="center"><b>Year</b></td><td class="td" style="width:100px;" align="center"><b>Country</b></td>
<td class="td" style="width:150px;" align="center"><b>State</b></td><td class="td" style="width:120px;" align="center"><b>HQ</b></td>
<td class="td" style="width:200px;" align="center"><b>Dealer</b></td><td class="td" style="width:150px;" align="center"><b>Subject:</b></td>
<td style="width:50px;" align="center">&nbsp;</td>
	  </tr>
      <tr>
	   <td align="center"><select style="font-size:12px;width:80px;height:20px;background-color:#DDFFBB;" name="YearV" id="YearV" onChange="ChangrYear(this.value)"> 
<?php $sqly=mysql_query("select FromDate,ToDate from hrm_year where YearId=".$_REQUEST['y'],$con); 
      $resy=mysql_fetch_assoc($sqly); $fromdate=date("Y",strtotime($resy['FromDate'])); $todate=date("y",strtotime($resy['ToDate'])); $fromdate2=date("y",strtotime($resy['FromDate'])); $todate2=date("y",strtotime($resy['ToDate'])); ?> <option value="<?php echo $_REQUEST['y']; ?>" selected><?php echo $fromdate.'-'.$todate; ?></option><option value="5"><?php echo '2016-17'; ?></option><option value="4"><?php echo '2015-16'; ?></option>
       <option value="3"><?php echo '2014-15'; ?></option><option value="2"><?php echo '2013-14'; ?></option>
       <option value="1"><?php echo '2012-13'; ?></option></select>
       </td> 
	   <td align="center"><select style="font-size:12px;width:100px;height:20px;background-color:#DDFFBB;" name="Coutry" id="Coutry" onChange="ClickCoutry(this.value,<?php echo $EmployeeId.', '.$resDept['DepartmentId']; ?>)"><?php if($_REQUEST['c']>0){ $sqlC=mysql_query("SELECT CountryName FROM hrm_country where CountryId=".$_REQUEST['c'], $con); $resC=mysql_fetch_array($sqlC); ?>
<option value="<?php echo $_REQUEST['c']; ?>"><?php echo ucwords(strtolower($resC['CountryName'])); ?></option><?php }else{ ?><option value="0">Select</option><?php } ?><?php $SqlCountry=mysql_query("SELECT * FROM hrm_country order by CountryName ASC", $con); while($ResCountry=mysql_fetch_array($SqlCountry)) { ?>
<option value="<?php echo $ResCountry['CountryId']; ?>"><?php echo ucwords(strtolower($ResCountry['CountryName'])); ?></option><?php } ?></select>
       </td>
	   <td align="center"><span id="StateSpan"><select style="font-size:12px;width:150px;height:20px;background-color:#DDFFBB;" name="State" id="State" onChange="ClickState(this.value,<?php echo $EmployeeId; ?>)">
<?php if($_REQUEST['s']>0){  $sqlS=mysql_query("SELECT StateName FROM hrm_state where StateId=".$_REQUEST['s'], $con); $resS=mysql_fetch_array($sqlS); ?><option value="<?php echo $_REQUEST['s']; ?>"><?php echo ucwords(strtolower($resS['StateName'])); ?></option><?php }else{ ?><option value="0">Select</option><?php } ?>
<?php if($resDept['DepartmentId']==7){ $sqlSt=mysql_query("select hrm_sales_ebillstate.StateId,StateName from hrm_sales_ebillstate INNER JOIN hrm_state ON hrm_sales_ebillstate.StateId=hrm_state.StateId where (EmployeeID=".$EmployeeId." OR EmployeeID2=".$EmployeeId." OR EmployeeID3=".$EmployeeId." OR EmployeeID4=".$EmployeeId.") order by StateName ASC", $con); }
	  elseif($EmployeeId==169 OR $EmployeeId==223){ $sqlSt=mysql_query("SELECT * FROM hrm_state order by StateName ASC", $con); } while($resSt=mysql_fetch_array($sqlSt)){ ?><option value="<?php echo $resSt['StateId']; ?>"><?php echo ucwords(strtolower($resSt['StateName'])); ?></option><?php } ?>
	  <?php if($EmployeeId==116){?><option value="16">Maharastra</option><?php } ?></select></span>
	   </td>
	   <td align="center"><span id="HqSpan"><select style="font-size:12px;width:120px;height:20px;background-color:#DDFFBB;" name="Hq" id="Hq" onChange="ClickHq(this.value)"><?php if($_REQUEST['hq']>0){ $sqlhq=mysql_query("SELECT HqName FROM hrm_headquater where HqId=".$_REQUEST['hq'], $con); $reshq=mysql_fetch_array($sqlhq); ?><option value="<?php echo $_REQUEST['hq']; ?>"><?php echo ucwords(strtolower($reshq['HqName'])); ?></option><?php }else{ ?><option value="0">Select</option><?php } ?>
<?php if($resDept['DepartmentId']==7){ $sqlHq=mysql_query("select HqId,HqName from hrm_headquater INNER JOIN hrm_sales_ebillstate ON hrm_headquater.StateId=hrm_sales_ebillstate.StateId where (hrm_sales_ebillstate.EmployeeID=".$EmployeeId." OR hrm_sales_ebillstate.EmployeeID2=".$EmployeeId." OR hrm_sales_ebillstate.EmployeeID3=".$EmployeeId." OR hrm_sales_ebillstate.EmployeeID4=".$EmployeeId.") order by HqName ASC", $con);}elseif($EmployeeId==169 OR $EmployeeId==223){$sqlHq = mysql_query("SELECT * FROM hrm_headquater where CompanyId=".$CompanyId." AND HQStatus='A' order by HqName ASC", $con);}
	  while($resHq = mysql_fetch_array($sqlHq)){ ?><option value="<?php echo $resHq['HqId']; ?>"><?php echo ucwords(strtolower($resHq['HqName'])); ?></option><?php } ?></select></span>
	  </td>
	  <td align="center"><span id="TabResult"><select style="font-size:12px;width:200px;height:20px;background-color:#DDFFBB;" name="DealerD" id="DealerD" onChange="ClickDealer(this.value)"><?php if($_REQUEST['dil']>0){ $sqldil=mysql_query("SELECT DealerName,DealerCity FROM hrm_sales_dealer where DealerId=".$_REQUEST['dil'], $con); $resdil=mysql_fetch_array($sqldil); ?><option value="<?php echo $_REQUEST['dil']; ?>"><?php echo ucwords(strtolower($resdil['DealerName'].'-'.$resdil['DealerCity'])); ?></option><?php } elseif($_REQUEST['hq']>0){ ?><option value="0" selected>Select Dealer</option><?php $sqldil = mysql_query("SELECT * FROM hrm_sales_dealer where HqId=".$_REQUEST['hq']." order by DealerName ASC", $con); while($resdil=mysql_fetch_array($sqldil)){ ?><option value="<?php echo $resdil['DealerId']; ?>"><?php echo $resdil['DealerName'].'-'.ucwords(strtolower($resdil['DealerCity'])); ?></option><?php } } else { ?><option value="0" selected>Select Dealer</option>
<?php if($resDept['DepartmentId']==7){$sqlDe = mysql_query("SELECT DealerId,DealerName FROM hrm_sales_dealer INNER JOIN hrm_headquater ON hrm_sales_dealer.HqId=hrm_headquater.HqId INNER JOIN hrm_employee_state ON hrm_headquater.StateId=hrm_employee_state.StateId where hrm_employee_state.LOGISTICS_EId=".$EmployeeId." order by DealerName ASC", $con);} elseif($EmployeeId==169 OR $EmployeeId==223){$sqlDe=mysql_query("SELECT * FROM hrm_sales_dealer order by DealerName ASC", $con);} while($resDe = mysql_fetch_array($sqlDe)){ ?>
     <option value="<?php echo $resDe['DealerId']; ?>"><?php echo ucwords(strtolower($resDe['DealerName'])).'-'.ucwords(strtolower($res['DealerCity'])); ?></option><?php } } ?></select></span>
<input type="hidden" id="DealerId" value=""/><input type="hidden" id="TotAValueM" value=""/>
<input type="hidden" id="Sno" value=""/><input type="hidden" id="ii" value="<?php echo $_REQUEST['ii']; ?>"/>
<input type="hidden" name="q" id="q" value="<?php echo $_REQUEST['q']; ?>"/>
	   </td>
	   <td align="center"><select style="font-size:12px;width:150px;height:20px;background-color:#DDFFBB;" name="SubNi" id="SubNi" <?php if($_REQUEST['dil']>0){echo '';}else{echo 'disabled';} ?> onChange="ClickNSub(this.value)"><?php if($_REQUEST['nsi']>0){ $sNsi=mysql_query("SELECT * FROM hrm_sales_note_subject where NoteSubId=".$_REQUEST['nsi'],$con); $rNsi=mysql_fetch_array($sNsi); ?><option value="<?php echo $_REQUEST['nsi']; ?>"><?php echo ucwords(strtolower($rNsi['SubName'])); ?></option><?php }else{ ?><option value="0">Select</option><?php } ?><?php $sqlNsi=mysql_query("select * from hrm_sales_note_subject where Status='A' order by SubName ASC",$con); while($resNsi=mysql_fetch_array($sqlNsi)){ ?><option value="<?php echo $resNsi['NoteSubId']; ?>"><?php echo ucwords(strtolower($resNsi['SubName'])); ?></option><?php } ?></select>
	   </td>
	   <?php if($_REQUEST['dil']>0 AND $_REQUEST['nsi']>0){ ?>
	   <td align="center"><a href="#" style="font-size:14px;color:#FFFFBB;" onClick="FunNewNote(<?php echo $_REQUEST['dil'].','.$_REQUEST['nsi']; ?>)">New</a></td>
	  <?php } ?>
	  </tr> 
	   </table>
      </td>
   </tr>
	 </table>
    </td>
   </tr>
    <tr>
   <td colspan="12" valign="top">
<?php if($_REQUEST['actionact']=='addnewrecords' AND $_REQUEST['dil']>0 AND $_REQUEST['nsi']>0){ ?>
<table cellpadding="0" cellspacing="0" style="width:800px;">
 <tr><td colspan="2" class="htf2" align="center"><b>( Add New Records )</b></td></tr>
<form name="newfrm" method="post" onSubmit="return validate(this)"> 	
<input type="hidden" id="chkdealer" name="chkdealer" value="<?php echo $_REQUEST['dil']; ?>" />
<input type="hidden" id="nsi" name="nsi" value="<?php echo $_REQUEST['nsi']; ?>" />
<input type="hidden" id="yi" name="yi" value="<?php echo $_REQUEST['y']; ?>" />
<?php if($_REQUEST['RefId']>0){ $ss=mysql_query("select * from hrm_sales_note where RefId=".$_REQUEST['RefId']." AND NoteSubId=".$_REQUEST['nsi']." AND DealerId=".$_REQUEST['dil']." AND YearId=".$_REQUEST['y'],$con); 
$rr=mysql_fetch_assoc($ss); } ?>
<input type="hidden" id="vnoteId" name="vnoteId" value="<?php echo $rr['NoteId']; ?>" />
 <tr>
  <td>
  <table cellpadding="0" cellspacing="0" style="width:800px;" border="0">
<?php $sNsi2=mysql_query("SELECT * FROM hrm_sales_note_subject where NoteSubId=".$_REQUEST['nsi'],$con); 
      $rNsi2=mysql_fetch_array($sNsi2); $sN=mysql_query("SELECT MAX(RefId) as MaxRId FROM hrm_sales_note where DealerId=".$_REQUEST['dil']." AND YearId=".$_REQUEST['y'],$con); $rsN=mysql_fetch_array($sN); $NxtId=$rsN['MaxRId']+1; $Lnght=strlen($NxtId); if($Lnght==1){$RefId='000'.$NxtId;} if($Lnght==2){$RefId='00'.$NxtId;} if($Lnght==3){$RefId='0'.$NxtId;} if($Lnght>=4){$RefId=$NxtId;} 
	  $De=mysql_query("SELECT * FROM hrm_sales_dealer where DealerId=".$_REQUEST['dil'],$con); 
      $rDe=mysql_fetch_assoc($De); $St=mysql_query("SELECT StateName FROM hrm_headquater hq inner join hrm_state s on hq.StateId=s.StateId where hq.HqId=".$rDe['HqId'],$con); $rSt=mysql_fetch_assoc($St);
	  $sNsi=mysql_query("SELECT * FROM hrm_sales_note_subject where NoteSubId=".$_REQUEST['nsi'],$con); 
      $rNsi=mysql_fetch_array($sNsi);
?><input type="hidden" id="vrefid" name="vrefid" value="<?php if($_REQUEST['RefId']>0){ echo $_REQUEST['RefId']; }else{echo $NxtId;} ?>" />
   <?php /* 	     
   <tr><td>&nbsp;</td><td class="td"><?php echo 'Ref.&nbsp;&nbsp;&nbsp;VSPL/'.strtoupper($rNsi2['SubCode']).'/'.$fromdate2.'-'.$todate2.'/'; if($_REQUEST['RefId']>0){ $Lnght=strlen($_REQUEST['RefId']); if($Lnght==1){$RefId='000'.$_REQUEST['RefId'];} if($Lnght==2){$RefId='00'.$_REQUEST['RefId'];} if($Lnght==3){$RefId='0'.$_REQUEST['RefId'];} if($Lnght>=4){$RefId=$_REQUEST['RefId'];} echo $RefId; }else{echo $RefId;} ?></td></tr>
   */ ?>
   <tr><td>&nbsp;</td><td class="td"><?php echo 'TO: M/S '.ucwords(strtolower($rDe['DealerName'])).', '.ucfirst(strtolower($rDe['DealerCity'])); ?>&nbsp;&nbsp;&nbsp;&nbsp;Date:<input class="tdf" style="width:100px;" id="vdate" name="vdate" style="text-align:center;" value="<?php if($_REQUEST['RefId']>0){ echo date("d-m-Y",strtotime($rr['NoteDate'])); }else{echo date("d-m-Y");} ?>" readonly/><button id="f_btn1" class="CalenderButton"></button><script type="text/javascript">  var cal = Calendar.setup({ onSelect:  function(cal) { cal.hide()}, showTime: true }); cal.manageFields("f_btn1", "vdate", "%d-%m-%Y");</script>&nbsp;&nbsp;&nbsp;Amount:<input class="tdf" style="width:100px;text-align:right;" id="vamt" name="vamt" maxlength="10" value="<?php if($_REQUEST['RefId']>0){ echo $rr['Amount']; }else{echo '';} ?>"/></td></tr>
  <tr>
   <td>&nbsp;</td>
   <td class="tdf" valign="top" style="width:850px;">
    <table border="1" style="width:850px;" cellpadding="0" cellspacing="0">
	 <tr>
	  <td class="tdf2" style="width:120px;" align="center">Crop</td>
	  <td class="tdf2" style="width:150px;" align="center">Variety</td>
	  <td class="tdf2" style="width:100px;" align="center">Pack Size</td>
	  <td class="tdf2" style="width:100px;" align="center">Qty as per the party challan (in kg)</td>
	  <td class="tdf2" style="width:100px;" align="center">Received qty at godown (in kg)</td>
	  <td class="tdf2" style="width:150px;" align="center">Difference in qty (if any)</td>
	  <td class="tdf2" style="width:60px;" align="center">Action</td>
	 </tr>
<?php if($_REQUEST['ShowRefId']=='RefNote' AND $_REQUEST['RefId']>0){ ?>
<?php $sqls=mysql_query("select * from hrm_sales_note_detail where NoteId=".$rr['NoteId']." order by NoteDetlId ASC",$con); while($ress=mysql_fetch_assoc($sqls)){ 
$crp2=mysql_query("select ItemName from hrm_sales_seedsitem where ItemId=".$ress['ItemId'],$con); $rcrp2=mysql_fetch_assoc($crp2); $prd2=mysql_query("select ProductName,TypeId from hrm_sales_seedsproduct where ProductId=".$ress['ProductId'],$con); $rprd2=mysql_fetch_assoc($prd2); $siz2=mysql_query("select SizeName from hrm_sales_itemsize where SizeId=".$ress['SizeId'],$con); $rsiz2=mysql_fetch_assoc($siz2); $sqlT=mysql_query("select TypeName from hrm_sales_seedtype where TypeId=".$rprd2['TypeId'], $con); $resT=mysql_fetch_assoc($sqlT); if($resT['TypeName']=='HYBRID'){$typ='F1';}else{$typ=$resT['TypeName'];} ?>
     <tr style="background-color:#FFFFFF;">
	  <td class="tdf"><?php echo $rcrp2['ItemName']; ?></td>
	  <td class="tdf"><?php echo $rprd2['ProductName'].'-'.$typ; ?></td>
	  <td class="tdf" align="center"><?php echo $rsiz2['SizeName']; ?></td>
	  <td class="tdf" align="center"><?php echo floatval($ress['Qty_ChallanIn']); ?></td>
	  <td class="tdf" align="center"><?php echo floatval($ress['Qty_GodownIn']); ?></td>
	  <td class="tdf" align="center"><?php echo $ress['Qty_DiffIn']; ?></td>
	  <td class="tdf" align="center"><span style="cursor:pointer;"><img src="images/delete.png" onClick="DelVal(<?php echo $ress['NoteDetlId'].','.$_REQUEST['nsi'].','.$_REQUEST['RefId']; ?>)"/></span></td>
	 </tr>
<?php } } ?>	 	 
	 <tr style="background-color:#FFFFFF;">
	  <td><select class="tdf" style="width:120px;" name="crp" id="crp" onChange="Clickcrp(this.value)"><option value="0">Select</option><?php $crp=mysql_query("select ItemId,ItemName from hrm_sales_seedsitem order by ItemName ASC",$con); while($rcrp=mysql_fetch_assoc($crp)){ ?><option value="<?php echo $rcrp['ItemId']; ?>"><?php echo ucfirst(strtolower($rcrp['ItemName'])); ?></option><?php } ?>	  
	  </select></td>
	  <td><span id="varietyspan"><select class="tdf" style="width:150px;" name="prd" id="prd" onChange="ClickPrd(this.value)" disabled><option value="0">Select</option></select></span></td>
	  <td><span id="sizespan"><select class="tdf" style="width:150px;" name="pkt" id="pkt" disabled>
	  <option value="0">Select</option></select></span></td>
	  <td><input class="tdf" style="width:100px;text-align:center;" name="qty1" id="qty1"></td>
	  <td><input class="tdf" style="width:100px;text-align:center;" name="qty2" id="qty2"></td>
	  <td><input class="tdf" style="width:150px;text-align:center;" name="diff" id="diff"></td>
	  <td align="center"><input type="button" class="SaveButton" onClick="SaveRecords()" value=""/></td>
	 </tr>
	</table>
   </td>
  </tr>
  <tr><td>&nbsp;</td></tr>
</table>	       
<?php } ?>


<?php if($_REQUEST['hq']>0 OR $_REQUEST['dil']>0){ ?>	  
<table cellpadding="0" cellspacing="0" style="width:950px;">	
 <tr>
  <td>
  <table cellpadding="0" cellspacing="1">
   <tr>  
    <td class="htf" style="width:40px;"><b>Ref</b></td>
	<td class="htf" style="width:40px;"><b>Year</b></td>
	<td class="htf" style="width:40px;"<b>Note</b></td>
	<td class="htf" style="width:60px;"><b>Date</b></td>
	<td class="htf" style="width:200px;"><b>Distributor</b></td>
	<td class="htf" style="width:200px;"><b>Crop</b></td>
	<td class="htf" style="width:250px;"><b>Variety</b></td>
	<td class="htf" style="width:60px;"><b>Amount</b></td>
	<?php if($resSp['FwdEdit']=='Y'){ ?>
	<td class="htf" style="width:70px;"><b>Action</b></td>
	<?php } ?>
  </tr>	
<?php if($_REQUEST['dil']>0){ $sqlNsi2=mysql_query("select sn.*,SubCode,sd.HqId,DealerName,DealerCity,HqName from hrm_sales_note sn inner join hrm_sales_note_subject sns on sn.NoteSubId=sns.NoteSubId inner join hrm_sales_dealer sd on sn.DealerId=sd.DealerId inner join hrm_headquater hq on sd.HqId=hq.HqId where sn.DealerId=".$_REQUEST['dil']." AND sn.YearId=".$_REQUEST['y']." order by NoteDate DESC",$con);}
      else if($_REQUEST['hq']>0){ $sqlNsi2=mysql_query("select sn.*,SubCode,sd.HqId,DealerName,DealerCity,HqName from hrm_sales_note sn inner join hrm_sales_note_subject sns on sn.NoteSubId=sns.NoteSubId inner join hrm_sales_dealer sd on sn.DealerId=sd.DealerId inner join hrm_headquater hq on sd.HqId=hq.HqId where sd.HqId=".$_REQUEST['hq']." AND sn.YearId=".$_REQUEST['y']." order by hq.HqName ASC, sd.DealerName ASC, NoteDate DESC",$con);}
  while($resNsi2=mysql_fetch_array($sqlNsi2)){ $Id=$resNsi2['RefId']; $Lnght=strlen($Id); if($Lnght==1){$RefId='000'.$Id;} if($Lnght==2){$RefId='00'.$Id;} if($Lnght==3){$RefId='0'.$Id;} if($Lnght>=4){$RefId=$Id;} 
  
  //$sqldil2=mysql_query("SELECT DealerName,DealerCity,HqId FROM hrm_sales_dealer where DealerId=".$resNsi2['DealerId'], $con); $resdil2=mysql_fetch_array($sqldil2); ?> 
  <tr>  
    <?php //'&nbsp;VSPL/'.strtoupper($resNsi2['SubCode']).'/'.$fromdate2.'-'.$todate2.'/'.$RefId; ?>
    <td class="tdf3" align="center"><span style="cursor:pointer;color:#000099;" onClick="DetailNote(<?php echo $resNsi2['NoteId']; ?>)"><u><?php echo $RefId; ?></u></span></td>
	<td class="tdf3" align="center"><span style="cursor:pointer;color:#000099;" onClick="DetailNote(<?php echo $resNsi2['NoteId']; ?>)"><u><?php echo $fromdate2.'-'.$todate2; ?></u></span></td>
	<td class="tdf3" align="center"><?php echo ucwords(strtolower($resNsi2['SubCode'])); ?></td>
	<td class="tdf3" align="center"><?php echo date("d M y",strtotime($resNsi2['NoteDate'])); ?></td>
	<td class="tdf3">&nbsp;<?php echo ucfirst(strtolower($resNsi2['DealerName'].'-'.$resNsi2['DealerCity'])); ?></td>	
	<td class="tdf3">&nbsp;<?php $crp=mysql_query("select ItemName from hrm_sales_note_detail nd inner join hrm_sales_seedsitem si on nd.ItemId=si.ItemId where nd.NoteId=".$resNsi2['NoteId']." group by nd.ItemId order by si.ItemName",$con); while($rcrp=mysql_fetch_assoc($crp)){ echo ucfirst(strtolower($rcrp['ItemName'])).', ';}?></td>
	<td class="tdf3">&nbsp;<?php $prd=mysql_query("select ProductName from hrm_sales_note_detail nd inner join hrm_sales_seedsproduct sp on nd.ProductId=sp.ProductId where nd.NoteId=".$resNsi2['NoteId']." group by nd.ProductId order by sp.ProductName",$con); while($rprd=mysql_fetch_assoc($prd)){ echo ucfirst(strtolower($rprd['ProductName'])).', ';} ?></td>
	<td class="tdf3" align="right"><?php echo $resNsi2['Amount']; ?>&nbsp;</td>
	<?php if($resSp['FwdEdit']=='Y'){ ?>
	<td class="tdf3" align="center" valign="middle"><span style="cursor:pointer;"><img src="images/edit.png" onClick="EditVal(<?php echo $resNsi2['NoteId'].','.$resNsi2['NoteSubId'].','.$resNsi2['RefId'].','.$resNsi2['DealerId'].','.$resNsi2['HqId']; ?>)"/></span><?php $chk=mysql_query("select * from hrm_sales_note_detail where NoteId=".$resNsi2['NoteId'],$con); $rowchk=mysql_num_rows($chk); if($rowchk==0){ ?>&nbsp;&nbsp;&nbsp;<span style="cursor:pointer;"><img src="images/delete.png" onClick="DelMainVal(<?php echo $resNsi2['NoteId']; ?>)"/></span><?php } ?></td>
	<?php } ?>
  </tr>	
<?php } ?> 
  </table>
  </td>
  </tr>	
  
</table>	       
<?php } ?>


    </td>
   </tr>   	
  </table>
  
 </td>
</tr>
</table>
</form>		
<?php //************************************************************************************************************************************************************?>
<?php //**********************************************END*****END*****END******END******END***************************************************************?>
<?php //************************************************************************************************************************************************************?>
		
	  </td>
	</tr>
  </table>
 </td>
</tr>
</table>
</body>
</html>

</html>
