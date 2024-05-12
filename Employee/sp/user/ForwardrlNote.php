<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');}
include("../function.php");
include('codeEncDec.php');
if(check_user()==false){header('Location:../../../index.php');}
if($_SESSION['login'] = true){require_once('UserMenuSession.php');}

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
function ClickCoutry(value)
{  window.location="ForwardrlNote.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y="+document.getElementById("YearV").value+"&ci="+document.getElementById("ComId").value+"&c="+value+"&s=0&hq="+document.getElementById("Hq").value+"&grp="+document.getElementById("CropGrp").value+"&q="+document.getElementById("QtrV").value+"&ii="+document.getElementById("ItemV").value+"&nsi=0";
}

function ClickState(value)
{ window.location="ForwardrlNote.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y="+document.getElementById("YearV").value+"&ci="+document.getElementById("ComId").value+"&c="+document.getElementById("Coutry").value+"&s="+value+"&hq=0&grp="+document.getElementById("CropGrp").value+"&q="+document.getElementById("QtrV").value+"&ii="+document.getElementById("ItemV").value+"&nsi=0";
}

function ClickHq(value)
{ window.location="ForwardrlNote.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y="+document.getElementById("YearV").value+"&ci="+document.getElementById("ComId").value+"&c="+document.getElementById("Coutry").value+"&s="+document.getElementById("State").value+"&hq="+value+"&grp="+document.getElementById("CropGrp").value+"&q="+document.getElementById("QtrV").value+"&ii="+document.getElementById("ItemV").value+"&nsi=0"; 
}

function ClickDealer(di)
{ 
  window.location="ForwardrlNote.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y="+document.getElementById("YearV").value+"&ci="+document.getElementById("ComId").value+"&c="+document.getElementById("Coutry").value+"&s="+document.getElementById("State").value+"&hq="+document.getElementById("Hq").value+"&dil="+di+"&grp="+document.getElementById("CropGrp").value+"&q="+document.getElementById("QtrV").value+"&ii="+document.getElementById("ItemV").value+"&nsi="+document.getElementById("SubNi").value+"&nsi=0"; 
}
function ChangrYear(YearV)
{
  window.location="ForwardrlNote.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y="+YearV+"&ci="+document.getElementById("ComId").value+"&c="+document.getElementById("Coutry").value+"&s="+document.getElementById("State").value+"&hq="+document.getElementById("Hq").value+"&dil="+document.getElementById("DealerD").value+"&grp="+document.getElementById("CropGrp").value+"&q="+document.getElementById("QtrV").value+"&ii="+document.getElementById("ItemV").value+"&nsi="+document.getElementById("SubNi").value+"&nsi=0";  
}

function ClickNSub(nsi)
{
 window.location="ForwardrlNote.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y="+document.getElementById("YearV").value+"&ci="+document.getElementById("ComId").value+"&c="+document.getElementById("Coutry").value+"&s="+document.getElementById("State").value+"&hq="+document.getElementById("Hq").value+"&dil="+document.getElementById("DealerD").value+"&grp="+document.getElementById("CropGrp").value+"&q="+document.getElementById("QtrV").value+"&ii="+document.getElementById("ItemV").value+"&nsi="+nsi;
}

function DetailNote(v)
{ window.open("DetailsNote.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&actionact=addnewrecords&ID="+v,'_blank'); window.focus(); }

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
<?php if($_REQUEST['s']>0){  $sqlS=mysql_query("SELECT StateName FROM hrm_state where StateId=".$_REQUEST['s'], $con); $resS=mysql_fetch_array($sqlS); ?><option value="<?php echo $_REQUEST['s']; ?>"><?php echo ucwords(strtolower($resS['StateName'])); ?></option><?php } elseif($_REQUEST['c']>0){ ?><option value="0" selected>Select</option>

<?php if($resDept['DepartmentId']==7){ $sqlst=mysql_query("select hrm_sales_ebillstate.StateId,StateName from hrm_sales_ebillstate INNER JOIN hrm_state ON hrm_sales_ebillstate.StateId=hrm_state.StateId where (EmployeeID=".$EmployeeId." OR EmployeeID2=".$EmployeeId." OR EmployeeID3=".$EmployeeId." OR EmployeeID4=".$EmployeeId.") AND hrm_state.CountryId=".$_REQUEST['c']." order by StateName ASC", $con); } elseif($EmployeeId==169 OR $EmployeeId==223 OR $EmployeeId==461){ $sqlst=mysql_query("SELECT * FROM hrm_state where CountryId=".$_REQUEST['c']." order by StateName ASC", $con); } while($resst = mysql_fetch_array($sqlst)){ ?><option value="<?php echo $resst['StateId']; ?>"><?php echo ucwords(strtolower($resst['StateName'])); ?></option><?php } } ?></select></span>
	   </td>
	   <td align="center"><span id="HqSpan"><select style="font-size:12px;width:120px;height:20px;background-color:#DDFFBB;" name="Hq" id="Hq" onChange="ClickHq(this.value)"><?php if($_REQUEST['hq']>0){ $sqlhq=mysql_query("SELECT HqName FROM hrm_headquater where HqId=".$_REQUEST['hq'], $con); $reshq=mysql_fetch_array($sqlhq); ?><option value="<?php echo $_REQUEST['hq']; ?>"><?php echo ucwords(strtolower($reshq['HqName'])); ?></option>
<?php } elseif($_REQUEST['s']>0){ ?><option value="0" selected>Select</option>

<?php if($resDept['DepartmentId']==7){ $sqlhq=mysql_query("select HqId,HqName from hrm_headquater INNER JOIN hrm_sales_ebillstate ON hrm_headquater.StateId=hrm_sales_ebillstate.StateId where (hrm_sales_ebillstate.EmployeeID=".$EmployeeId." OR hrm_sales_ebillstate.EmployeeID2=".$EmployeeId." OR hrm_sales_ebillstate.EmployeeID3=".$EmployeeId." OR hrm_sales_ebillstate.EmployeeID4=".$EmployeeId.") AND hrm_headquater.StateId=".$_REQUEST['s']." order by HqName ASC", $con);}elseif($EmployeeId==169 OR $EmployeeId==223  OR $EmployeeId==461){$sqlhq = mysql_query("SELECT * FROM hrm_headquater where CompanyId=".$CompanyId." AND HQStatus='A' AND StateId=".$_REQUEST['s']." order by HqName ASC", $con);} while($reshq = mysql_fetch_array($sqlhq)){ ?><option value="<?php echo $reshq['HqId']; ?>"><?php echo ucwords(strtolower($reshq['HqName'])); ?></option><?php } } ?></select></span>
	  </td>
	  <td align="center"><span id="TabResult"><select style="font-size:12px;width:200px;height:20px;background-color:#DDFFBB;" name="DealerD" id="DealerD" onChange="ClickDealer(this.value)"><?php if($_REQUEST['dil']>0){ $sqldil=mysql_query("SELECT DealerName,DealerCity FROM hrm_sales_dealer where DealerId=".$_REQUEST['dil'], $con); $resdil=mysql_fetch_array($sqldil); ?><option value="<?php echo $_REQUEST['dil']; ?>"><?php echo ucwords(strtolower($resdil['DealerName'].'-'.$resdil['DealerCity'])); ?></option><?php } elseif($_REQUEST['hq']>0){ ?><option value="0" selected>Select Dealer</option>
<?php if($resDept['DepartmentId']==7){$sqldil = mysql_query("SELECT * FROM hrm_sales_dealer INNER JOIN hrm_headquater ON hrm_sales_dealer.HqId=hrm_headquater.HqId INNER JOIN hrm_employee_state ON hrm_headquater.StateId=hrm_employee_state.StateId where hrm_employee_state.LOGISTICS_EId=".$EmployeeId." AND hrm_sales_dealer.HqId=".$_REQUEST['hq']." order by DealerName ASC", $con);} elseif($EmployeeId==169 OR $EmployeeId==223 OR $EmployeeId==461){$sqldil=mysql_query("SELECT * FROM hrm_sales_dealer where HqId=".$_REQUEST['hq']." order by DealerName ASC", $con);} while($resdil=mysql_fetch_array($sqldil)){ ?><option value="<?php echo $resdil['DealerId']; ?>"><?php echo ucwords(strtolower($resdil['DealerName'])).'-'.ucwords(strtolower($resdil['DealerCity'])); ?></option><?php } } ?></select></span>
<input type="hidden" id="DealerId" value=""/><input type="hidden" id="TotAValueM" value=""/>
<input type="hidden" id="Sno" value=""/><input type="hidden" id="ii" value="<?php echo $_REQUEST['ii']; ?>"/>
<input type="hidden" name="q" id="q" value="<?php echo $_REQUEST['q']; ?>"/>
	   </td>
	   <td align="center"><select style="font-size:12px;width:150px;height:20px;background-color:#DDFFBB;" name="SubNi" id="SubNi" <?php if($_REQUEST['dil']>0){echo '';}else{echo 'disabled';} ?> onChange="ClickNSub(this.value)"><?php if($_REQUEST['nsi']>0){ $sNsi=mysql_query("SELECT * FROM hrm_sales_note_subject where NoteSubId=".$_REQUEST['nsi'],$con); $rNsi=mysql_fetch_array($sNsi); ?><option value="<?php echo $_REQUEST['nsi']; ?>"><?php echo ucwords(strtolower($rNsi['SubName'])); ?></option><?php }else{ ?><option value="0">Select</option><?php } ?><?php $sqlNsi=mysql_query("select * from hrm_sales_note_subject where Status='A' order by SubName ASC",$con); while($resNsi=mysql_fetch_array($sqlNsi)){ ?><option value="<?php echo $resNsi['NoteSubId']; ?>"><?php echo ucwords(strtolower($resNsi['SubName'])); ?></option><?php } ?></select>
	   </td>
	  </tr> 
	   </table>
      </td>
   </tr>
	 </table>
    </td>
   </tr>
    <tr>
   <td colspan="12" valign="top">
<?php if($_REQUEST['c']>0 OR $_REQUEST['s']>0 OR $_REQUEST['hq']>0 OR $_REQUEST['dil']>0){ ?>	  
<table cellpadding="0" cellspacing="0" style="width:1100px;">	
 <tr>
  <td>
  <table cellpadding="0" cellspacing="1">
   <tr>  
    <td class="htf" style="width:30px;"><b>Sn</b></td>
    <td class="htf" style="width:40px;"><b>Ref</b></td>
	<?php /*<td class="htf" style="width:40px;"><b>Year</b></td>*/ ?>
	<td class="htf" style="width:40px;"<b>Note</b></td>
	<td class="htf" style="width:60px;"><b>Date</b></td>
	<td class="htf" style="width:200px;"><b>Distributor</b></td>
	<td class="htf" style="width:100px;"><b>Hq</b></td>
	<td class="htf" style="width:100px;"><b>State</b></td>
	<td class="htf" style="width:200px;"><b>Crop</b></td>
	<td class="htf" style="width:250px;"><b>Variety</b></td>
	<td class="htf" style="width:60px;"><b>Amount</b></td>
  </tr>
<?php if($_REQUEST['dil']>0){ $sql_statement=mysql_query("select sn.*,SubCode,sd.HqId,DealerName,DealerCity,HqName,StateName from hrm_sales_note sn inner join hrm_sales_note_subject sns on sn.NoteSubId=sns.NoteSubId inner join hrm_sales_dealer sd on sn.DealerId=sd.DealerId inner join hrm_headquater hq on sd.HqId=hq.HqId inner join hrm_state st on hq.StateId=st.StateId where sn.DealerId=".$_REQUEST['dil']." AND sn.YearId=".$_REQUEST['y']." order by NoteDate DESC",$con); $total_records=mysql_num_rows($sql_statement); } elseif($_REQUEST['hq']>0){ $sql_statement=mysql_query("select sn.*,SubCode,sd.HqId,DealerName,DealerCity,HqName,StateName from hrm_sales_note sn inner join hrm_sales_note_subject sns on sn.NoteSubId=sns.NoteSubId inner join hrm_sales_dealer sd on sn.DealerId=sd.DealerId inner join hrm_headquater hq on sd.HqId=hq.HqId inner join hrm_state st on hq.StateId=st.StateId where sd.HqId=".$_REQUEST['hq']." AND sn.YearId=".$_REQUEST['y']." order by hq.HqName ASC, sd.DealerName ASC, NoteDate DESC",$con); $total_records=mysql_num_rows($sql_statement); } elseif($_REQUEST['s']>0){ $sql_statement=mysql_query("select sn.*,SubCode,sd.HqId,DealerName,DealerCity,HqName,StateName from hrm_sales_note sn inner join hrm_sales_note_subject sns on sn.NoteSubId=sns.NoteSubId inner join hrm_sales_dealer sd on sn.DealerId=sd.DealerId inner join hrm_headquater hq on sd.HqId=hq.HqId inner join hrm_state st on hq.StateId=st.StateId where st.StateId=".$_REQUEST['s']." AND sn.YearId=".$_REQUEST['y']." order by hq.HqName ASC, sd.DealerName ASC, NoteDate DESC",$con); $total_records=mysql_num_rows($sql_statement); }

if(isset($_GET['page'])){$page = $_GET['page']; $no=(14*($_GET['page']-1))+$_GET['page']; } else { $page = 1; $no=1; } $offset = 15; if ($page){ $from = ($page * $offset) - $offset; }else{ $from = 0; } ?>
  	
<?php if($_REQUEST['dil']>0){ $sqlNsi2=mysql_query("select sn.*,SubCode,sd.HqId,DealerName,DealerCity,HqName,StateName from hrm_sales_note sn inner join hrm_sales_note_subject sns on sn.NoteSubId=sns.NoteSubId inner join hrm_sales_dealer sd on sn.DealerId=sd.DealerId inner join hrm_headquater hq on sd.HqId=hq.HqId inner join hrm_state st on hq.StateId=st.StateId where sn.DealerId=".$_REQUEST['dil']." AND sn.YearId=".$_REQUEST['y']." order by NoteDate DESC LIMIT ".$from.",".$offset,$con);}
      else if($_REQUEST['hq']>0){ $sqlNsi2=mysql_query("select sn.*,SubCode,sd.HqId,DealerName,DealerCity,HqName,StateName from hrm_sales_note sn inner join hrm_sales_note_subject sns on sn.NoteSubId=sns.NoteSubId inner join hrm_sales_dealer sd on sn.DealerId=sd.DealerId inner join hrm_headquater hq on sd.HqId=hq.HqId inner join hrm_state st on hq.StateId=st.StateId where sd.HqId=".$_REQUEST['hq']." AND sn.YearId=".$_REQUEST['y']." order by hq.HqName ASC, sd.DealerName ASC, NoteDate DESC LIMIT ".$from.",".$offset,$con);} 
	  else if($_REQUEST['s']>0){ $sqlNsi2=mysql_query("select sn.*,SubCode,sd.HqId,DealerName,DealerCity,HqName,StateName from hrm_sales_note sn inner join hrm_sales_note_subject sns on sn.NoteSubId=sns.NoteSubId inner join hrm_sales_dealer sd on sn.DealerId=sd.DealerId inner join hrm_headquater hq on sd.HqId=hq.HqId inner join hrm_state st on hq.StateId=st.StateId where st.StateId=".$_REQUEST['s']." AND sn.YearId=".$_REQUEST['y']." order by hq.HqName ASC, sd.DealerName ASC, NoteDate DESC LIMIT ".$from.",".$offset,$con);}
  $sn=1; if($total_records>0){
  while($resNsi2=mysql_fetch_array($sqlNsi2)){ $Id=$resNsi2['RefId']; $Lnght=strlen($Id); if($Lnght==1){$RefId='000'.$Id;} if($Lnght==2){$RefId='00'.$Id;} if($Lnght==3){$RefId='0'.$Id;} if($Lnght>=4){$RefId=$Id;} 
  
  //$sqldil2=mysql_query("SELECT DealerName,DealerCity,HqId FROM hrm_sales_dealer where DealerId=".$resNsi2['DealerId'], $con); $resdil2=mysql_fetch_array($sqldil2); ?> 
  <tr>  
    <?php //'&nbsp;VSPL/'.strtoupper($resNsi2['SubCode']).'/'.$fromdate2.'-'.$todate2.'/'.$RefId; ?>
	<td class="tdf3" align="center"><?php echo $no; ?></td>
    <td class="tdf3" align="center"><span style="cursor:pointer;color:#000099;" onClick="DetailNote(<?php echo $resNsi2['NoteId']; ?>)"><u><?php echo $RefId; ?></u></span></td>
	<?php /*<td class="tdf3" align="center"><span style="cursor:pointer;color:#000099;" onClick="DetailNote(<?php echo $resNsi2['NoteId']; ?>)"><u><?php echo $fromdate2.'-'.$todate2; ?></u></span></td>*/ ?>
	<td class="tdf3" align="center"><span style="cursor:pointer;color:#000099;" onClick="DetailNote(<?php echo $resNsi2['NoteId']; ?>)"><u><?php echo ucwords(strtolower($resNsi2['SubCode'])); ?></u></span></td>
	<td class="tdf3" align="center"><?php echo date("d M y",strtotime($resNsi2['NoteDate'])); ?></td>
	<td class="tdf3">&nbsp;<?php echo ucfirst(strtolower($resNsi2['DealerName'].'-'.$resNsi2['DealerCity'])); ?></td>
	<td class="tdf3">&nbsp;<?php echo ucfirst(strtolower($resNsi2['HqName'])); ?></td>
	<td class="tdf3">&nbsp;<?php echo ucfirst(strtolower($resNsi2['StateName'])); ?></td>	
	<td class="tdf3">&nbsp;<?php $crp=mysql_query("select ItemName from hrm_sales_note_detail nd inner join hrm_sales_seedsitem si on nd.ItemId=si.ItemId where nd.NoteId=".$resNsi2['NoteId']." group by nd.ItemId order by si.ItemName",$con); while($rcrp=mysql_fetch_assoc($crp)){ echo ucfirst(strtolower($rcrp['ItemName'])).', ';}?></td>
	<td class="tdf3">&nbsp;<?php $prd=mysql_query("select ProductName from hrm_sales_note_detail nd inner join hrm_sales_seedsproduct sp on nd.ProductId=sp.ProductId where nd.NoteId=".$resNsi2['NoteId']." group by nd.ProductId order by sp.ProductName",$con); while($rprd=mysql_fetch_assoc($prd)){ echo ucfirst(strtolower($rprd['ProductName'])).', ';} ?></td>
	<td class="tdf3" align="right"><?php echo $resNsi2['Amount']; ?>&nbsp;</td>
  </tr>	
<?php $no++; } } ?> 
  </table>
  </td>
  </tr>	
  <tr>
  <td align="center" colspan="13" style="font-family:Times New Roman; font-size:15px; font-weight:bold;">
  <?php $y=$_REQUEST['y']; $ci=$_REQUEST['ci']; $c=$_REQUEST['c']; $s=$_REQUEST['s']; $hq=$_REQUEST['hq']; 
        $grp=$_REQUEST['grp']; $q=$_REQUEST['q']; $ii=$_REQUEST['ii']; $nsi=$_REQUEST['nsi'];
		doPages($offset, 'ForwardrlNote.php', '', $total_records,$y,$ci,$c,$s,$hq,$grp,$q,$ii,$nsi); ?>
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
<?php
function check_integer($which){ if(isset($_REQUEST[$which])){ if (intval($_REQUEST[$which])>0){ return intval($_REQUEST[$which]); } else { return false; } } return false; }
function get_current_page(){ if(($var=check_integer('page'))) { return $var; } else { return 1; } }
function doPages($page_size, $thepage, $query_string, $total=0,$y,$ci,$c,$s,$hq,$grp,$q,$ii,$nsi){ $index_limit = 5; $query=''; if(strlen($query_string)>0){ $query = "&amp;".$query_string; }
$current = get_current_page(); $total_pages=ceil($total/$page_size); $start=max($current-intval($index_limit/2), 1); $end=$start+$index_limit-1;
echo '<div class="paging">';
if($current==1){ echo '<span class="prn">&lt; Previous</span>&nbsp;';}else{ $i = $current-1; echo '<a href="'.$thepage.'?page='.$i.$query.'&ls='.$_REQUEST['ls'].'&yly='.$_REQUEST['yly'].'&ern1=r114&ern2w=234&ern3y=10234&ern=4e2&rernr=09drfGe&ernS=eewwqq&y='.$y.'&ci='.$ci.'&c='.$c.'&s='.$s.'&hq='.$hq.'&grp='.$grp.'&q='.$q.'&ii='.$ii.'&nsi='.$nsi.'" class="prn" rel="nofollow" title="go to page '.$i.'" style="color:#A6D2FF;text-decoration:none;">&lt; Previous</a>&nbsp;'; echo '<span class="prn">...</span>&nbsp;'; }
if($start > 1){ $i = 1; echo '<a href="'.$thepage.'?page='.$i.$query.'&ls='.$_REQUEST['ls'].'&yly='.$_REQUEST['yly'].'&ern1=r114&ern2w=234&ern3y=10234&ern=4e2&rernr=09drfGe&ernS=eewwqq&y='.$y.'&ci='.$ci.'&c='.$c.'&s='.$s.'&hq='.$hq.'&grp='.$grp.'&q='.$q.'&ii='.$ii.'&nsi='.$nsi.'" title="go to page '.$i.'" style="color:#A6D2FF;">'.$i.'</a>&nbsp;'; }
for($i = $start; $i <= $end && $i <= $total_pages; $i++)
{ if($i==$current){ echo '<span>'.$i.'</span>&nbsp;';} else { echo '<a href="'.$thepage.'?page='.$i.$query.'&ls='.$_REQUEST['ls'].'&yly='.$_REQUEST['yly'].'&ern1=r114&ern2w=234&ern3y=10234&ern=4e2&rernr=09drfGe&ernS=eewwqq&y='.$y.'&ci='.$ci.'&c='.$c.'&s='.$s.'&hq='.$hq.'&grp='.$grp.'&q='.$q.'&ii='.$ii.'&nsi='.$nsi.'" title="go to page '.$i.'" style="color:#A6D2FF;">'.$i.'</a>&nbsp;'; } }
if($total_pages > $end){ $i = $total_pages; echo '<a href="'.$thepage.'?page='.$i.$query.'&ls='.$_REQUEST['ls'].'&yly='.$_REQUEST['yly'].'&ern1=r114&ern2w=234&ern3y=10234&ern=4e2&rernr=09drfGe&ernS=eewwqq&y='.$y.'&ci='.$ci.'&c='.$c.'&s='.$s.'&hq='.$hq.'&grp='.$grp.'&q='.$q.'&ii='.$ii.'&nsi='.$nsi.'" title="go to page '.$i.'" style="color:#A6D2FF;">'.$i.'</a>&nbsp;'; } if($current < $total_pages) { $i = $current+1; echo '<span class="prn">...</span>&nbsp;'; echo '<a href="'.$thepage.'?page='.$i.$query.'&ls='.$_REQUEST['ls'].'&yly='.$_REQUEST['yly'].'&ern1=r114&ern2w=234&ern3y=10234&ern=4e2&rernr=09drfGe&ernS=eewwqq&y='.$y.'&ci='.$ci.'&c='.$c.'&s='.$s.'&hq='.$hq.'&grp='.$grp.'&q='.$q.'&ii='.$ii.'&nsi='.$nsi.'" class="prn" rel="nofollow" title="go to page '.$i.'" style="color:#A6D2FF;text-decoration:none;" style="color:#A6D2FF;">Next &gt;</a>&nbsp;'; } else { echo '<span class="prn">Next &gt;</span>&nbsp;'; } if ($total != 0){ echo '&nbsp;&nbsp;&nbsp;&nbsp;<font color="#A6D2FF"<h4>[Total '.$total.' Records]</h></div>'; }
}


?>
