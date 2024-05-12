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
.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;}
.SaveButton {background-image:url(images/save.gif); width:20px; height:20px; background-repeat:no-repeat; background-color:#FFFFFF; border-color:#FFFFFF; border-bottom:inherit;}
.EditSelect { font-family:Georgia; font-size:12px; height:18px;}
.EditInput { font-family:Georgia; font-size:12px; height:18px;}
.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}
.InputB{font-size:12px;width:65px;text-align:right;border:0px;font-weight:bold;background-color:#D9D9FF;} 
.Input{font-size:12px;width:60px;text-align:right;border:0px;background-color:#EEEEEE;}
.TInput{font-size:12px;width:60px;text-align:right;border:0px;background-color:#FFFFA6;font-weight:bold;}
.Th60{text-align:center;width:60px;font-weight:bold;font-size:12px;} .Th80{text-align:center;width:80px;font-weight:bold;font-size:12px;}
.Th40{text-align:center;width:40px;font-weight:bold;font-size:12px;} .Tr60{text-align:center;width:60px;font-weight:bold;font-size:12px;}
.Th50{text-align:center;width:50px;font-weight:bold;font-size:12px;} .Td60{text-align:right;width:60px;font-size:12px;} 
.Td40{text-align:right;width:40px;font-size:12px;}
.ChkImg{width:20px;hieght:20px;}
.inner_table { height:400px;overflow-y:auto;width:auto; }
</style>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<Script type="text/javascript">window.history.forward(1);</Script>
<Script language="javascript">
function ClickGrp(CropGrp)
{ window.location='DiffpRpt.php?SelY=Y&ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y='+document.getElementById("YearV").value+'&ci='+document.getElementById("ComId").value+'&c='+document.getElementById("coutry").value+'&z='+document.getElementById("zone").value+'&s='+document.getElementById("state").value+'&hq='+document.getElementById("hq").value+'&dil='+document.getElementById("dealer").value+'&e='+document.getElementById("emp").value+'&grp='+CropGrp+'&ii=0&c1=1&c2=1&c3=1&c4=1&c5=1&ctot=5'; }

function ChangeII(ii)
{ window.location='DiffpRpt.php?SelY=Y&ern1=r114&ern2w=234&ern3y=1034&ern=4e2&erne=4e&er=24&er=110044&eretd=ee&rernr=09Ge&ernS=eewwqq&y='+document.getElementById("YearV").value+'&ci='+document.getElementById("ComId").value+'&c='+document.getElementById("coutry").value+'&z='+document.getElementById("zone").value+'&s='+document.getElementById("state").value+'&hq='+document.getElementById("hq").value+'&dil='+document.getElementById("dealer").value+'&e='+document.getElementById("emp").value+'&grp='+document.getElementById("CropGrp").value+'&ii='+ii+'&c1=1&c2=1&c3=1&c4=1&c5=1&ctot=5';}

function ChangrYear(y)
{ window.location='DiffpRpt.php?SelY=Y&ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y='+y+'&ci='+document.getElementById("ComId").value+'&c='+document.getElementById("coutry").value+'&z='+document.getElementById("zone").value+'&s='+document.getElementById("state").value+'&hq='+document.getElementById("hq").value+'&dil='+document.getElementById("dealer").value+'&grp='+document.getElementById("CropGrp").value+'&e='+document.getElementById("emp").value+'&q=1&ii='+document.getElementById("ItemV").value+'&c1=1&c2=1&c3=1&c4=1&c5=1&ctot=5'; }

function ClickCoutry(c) 
{ window.location='DiffpRpt.php?SelY=Y&ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y='+document.getElementById("YearV").value+'&ci='+document.getElementById("ComId").value+'&c='+c+'&z=0&s=0&hq=0&dil=0&grp='+document.getElementById("CropGrp").value+'&e=0&q=1&ii='+document.getElementById("ItemV").value+'&c1=1&c2=1&c3=1&c4=1&c5=1&ctot=5';}

function ClickZone(z)
{ window.location='DiffpRpt.php?SelY=Y&ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y='+document.getElementById("YearV").value+'&ci='+document.getElementById("ComId").value+'&c='+document.getElementById("coutry").value+'&z='+z+'&s=0&hq=0&dil=0&grp='+document.getElementById("CropGrp").value+'&e=0&q=1&ii='+document.getElementById("ItemV").value+'&c1=1&c2=1&c3=1&c4=1&c5=1&ctot=5';
}

function ClickState(s)
{ window.location='DiffpRpt.php?SelY=Y&ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y='+document.getElementById("YearV").value+'&ci='+document.getElementById("ComId").value+'&c='+document.getElementById("coutry").value+'&z=0&s='+s+'&hq=0&dil=0&grp='+document.getElementById("CropGrp").value+'&q=1&ii='+document.getElementById("ItemV").value+'&e=0&c1=1&c2=1&c3=1&c4=1&c5=1&ctot=5';}

function ClickHq(hq)
{ window.location='DiffpRpt.php?SelY=Y&ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y='+document.getElementById("YearV").value+'&ci='+document.getElementById("ComId").value+'&c='+document.getElementById("coutry").value+'&z='+document.getElementById("zone").value+'&s='+document.getElementById("state").value+'&hq='+hq+'&dil=0&grp='+document.getElementById("CropGrp").value+'&e=0&q=1&ii='+document.getElementById("ItemV").value+'&c1=1&c2=1&c3=1&c4=1&c5=1&ctot=5';}

function ClickDealer(d)
{ window.location='DiffpRpt.php?SelY=Y&ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y='+document.getElementById("YearV").value+'&ci='+document.getElementById("ComId").value+'&c='+document.getElementById("coutry").value+'&z='+document.getElementById("zone").value+'&s='+document.getElementById("state").value+'&hq='+document.getElementById("hq").value+'&dil='+d+'&e=0&grp='+document.getElementById("CropGrp").value+'&q=1&ii='+document.getElementById("ItemV").value+'&c1=1&c2=1&c3=1&c4=1&c5=1&ctot=5';}

function ChangeEmp(e)
{ window.location='DiffpRpt.php?SelY=Y&ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y='+document.getElementById("YearV").value+'&ci='+document.getElementById("ComId").value+'&c=0&z=0&s=0&hq=0&dil=0&e='+e+'&grp='+document.getElementById("CropGrp").value+'&q=1&ii='+document.getElementById("ItemV").value+'&c1=1&c2=1&c3=1&c4=1&c5=1&ctot=5';
}

function DiffRptExport(y,grp,ii,dil,hq,s,c,z,e)
{ 
  window.open("DiffpRptExport.php?action=DiffpRExport&y="+y+"&grp="+grp+"&ii="+ii+"&dil="+dil+"&hq="+hq+"&s="+s+"&c="+c+"&z="+z+"&e="+e,"ExpForm","menubar=yes,scrollbars=yes,resizable=no,directories=no,width=20,height=20");
}

function ExportDiff(y)
{ window.open("DiffpRptExport.php?action=Diff22pRExport&y="+y,"ExpForm","menubar=yes,scrollbars=yes,resizable=no,directories=no,width=20,height=20"); } 
  
</Script>
</head>
<body class="body">
<table class="table">
<tr>
 <td>
  <table class="menutable"><tr><td><?php if($_SESSION['login']=true){ require_once("EMenu.php"); } ?></td></tr></table>
 </td>
</tr>
<tr>
 <td valign="top">
  <table width="100%" style="margin-top:0px;" border="0">
    <tr>
	  <td valign="top"><?php if($_SESSION['login'] = true){ require_once("EWelcome.php"); } ?></td>
	</tr>
	 <tr>
	  <td valign="top" width="100%" id="MainWindow">
<?php //******************************************************************************?>
<?php //****************START*****START*****START******START******START********************?>
<?php //*******************************************************************************?>
<input type="hidden" id="ComId" value="<?php echo $_REQUEST['ci']; ?>" />
<input type="hidden" id="UserId" value="<?php echo $UserId; ?>" />
<input type="hidden" id="YId" value="<?php echo $YearId; ?>" />
<table border="0" style="margin-top:0px; width:100%; height:150px;">	
<tr>
 <td valign="top">
  <table border="0">
   <tr>
    <td id="Entry" style="width:100%;" valign="top">
	<span id="TabEntry">
     <table border="0">
	 <tr>
<td rowspan="4" colspan="2" style="margin-top:0px;width:120px;" class="heading" align="center"><u>Deviation Reports:</u></td>
	   <td style="font-size:11px;height:18px;width:80px;color:#E6E6E6;" align="right"><b>Year :</b></td>
	   <td style="width:105px;"><select style="font-size:12px;width:120px;height:20px;background-color:#DDFFBB;" name="YearV" id="YearV" onChange="ChangrYear(this.value)"><?php $sqly=mysql_query("select FromDate,ToDate from hrm_year where YearId=".$_REQUEST['y'], $con); $resy=mysql_fetch_assoc($sqly);
      $fromdate=date("Y",strtotime($resy['FromDate'])); $todate=date("Y",strtotime($resy['ToDate'])); 
	  $NextYear=$_REQUEST['y']+1; $PrevYear=$_REQUEST['y']-1; 
	  $sqly2=mysql_query("select FromDate,ToDate from hrm_year where YearId=".$NextYear, $con); 
	  $sqly3=mysql_query("select FromDate,ToDate from hrm_year where YearId=".$PrevYear, $con); 
	  $resy2=mysql_fetch_assoc($sqly2); $resy3=mysql_fetch_assoc($sqly3); ?>		
 <option value="<?php echo $_REQUEST['y']; ?>" selected><?php echo $fromdate.'-'.$todate; ?></option>
 <?php if($PrevYear>=1){?><option value="<?php echo $PrevYear; ?>"><?php echo date("Y",strtotime($resy3['FromDate'])).'-'.date("Y",strtotime($resy3['ToDate'])); ?></option><?php } ?><option value="<?php echo $NextYear; ?>"><?php echo date("Y",strtotime($resy2['FromDate'])).'-'.date("Y",strtotime($resy2['ToDate'])); ?></option></select></td>
	   <td style="font-size:11px;height:18px;color:#E6E6E6;width:60px;" align="right"><b>Crop :</b></td>
	   <td><select style="font-size:12px;width:130px;height:20px;background-color:#DDFFBB;" name="CropGrp" id="CropGrp" onChange="ClickGrp(this.value)">
	     <option value="1" <?php if($_REQUEST['grp']==1){echo 'selected';}?>>Vegetable Crop</option>
		 <option value="2" <?php if($_REQUEST['grp']==2){echo 'selected';}?>>Field Crop</option>
		 <?php /*?><option value="3" <?php if($_REQUEST['grp']==3){echo 'selected';}?>>All Crop</option><?php */?>
        </select></td>
	   <td style="font-size:11px; height:18px;width:60px;color:#E6E6E6;" align="right"><b>Name :</b></td>
	   <td><select style="font-size:12px;width:130px;height:20px;background-color:#DDFFBB;" name="ItemV" id="ItemV" onChange="ChangeII(this.value)"><?php if($_REQUEST['ii']>0){ $sqlI=mysql_query("select ItemName from hrm_sales_seedsitem where ItemId=".$_REQUEST['ii'], $con); $resI=mysql_fetch_assoc($sqlI); ?><option value="<?php echo $_REQUEST['ii']; ?>" selected><?php echo ucwords(strtolower($resI['ItemName'])); ?></option><?php }else{ ?><option value="0" selected>Select</option><?php } ?><?php if($_REQUEST['grp']==1){ $sqlItem=mysql_query("select * from hrm_sales_seedsitem where GroupId=1 order by ItemName ASC", $con);}elseif($_REQUEST['grp']==2){ $sqlItem=mysql_query("select * from hrm_sales_seedsitem where GroupId=2 order by ItemName ASC", $con);}elseif($_REQUEST['grp']==3){ $sqlItem=mysql_query("select * from hrm_sales_seedsitem where (GroupId=1 OR GroupId=2) order by GroupId ASC,ItemName ASC", $con);} while($resItem=mysql_fetch_assoc($sqlItem)){ ?><option value="<?php echo $resItem['ItemId']; ?>"><?php echo $resItem['ItemName']; ?></option><?php } ?></select></td>
	   <td colspan="4"></td>
	 </tr>
	 
	 <tr>
	  <td style="font-size:11px;height:18px;color:#E6E6E6;" align="right"><b>Country :</b></td>
	  <td><select style="font-size:12px;width:120px;height:20px;background-color:#DDFFBB;" name="coutry" id="coutry" onChange="ClickCoutry(this.value)"><?php if($_REQUEST['c']>0){ $sqlC=mysql_query("SELECT CountryName FROM hrm_country where CountryId=".$_REQUEST['c'], $con); $resC=mysql_fetch_array($sqlC); ?><option value="<?php echo $_REQUEST['c']; ?>"><?php echo ucwords(strtolower($resC['CountryName'])); ?></option><?php }else{ ?><option value="0">Select</option><?php } ?><?php $SqlCountry=mysql_query("SELECT * FROM hrm_country order by CountryName ASC", $con); while($ResCountry=mysql_fetch_array($SqlCountry)) { ?><option value="<?php echo $ResCountry['CountryId']; ?>"><?php echo ucwords(strtolower($ResCountry['CountryName'])); ?></option><?php } ?></select></td>
	   <td style="font-size:11px;height:18px;color:#E6E6E6;"align="right"><b>Zone :</b></td>
	   <td><select style="font-size:12px;width:130px;height:20px;background-color:#DDFFBB;" name="zone" id="zone" onChange="ClickZone(this.value)"  <?php if($_REQUEST['c']==0){echo 'disabled';} ?>><?php if($_REQUEST['z']>0){ $sqlZ=mysql_query("SELECT ZoneName FROM hrm_sales_zone where ZoneId=".$_REQUEST['z'], $con); $resZ=mysql_fetch_array($sqlZ); ?><option value="<?php echo $_REQUEST['z']; ?>"><?php echo ucwords(strtolower($resZ['ZoneName'])); ?></option><?php }else{ ?><option value="0">Select</option><?php } ?><?php $sql = mysql_query("SELECT * FROM hrm_sales_zone order by ZoneName ASC", $con); while($res = mysql_fetch_array($sql)){ ?><option value="<?php echo $res['ZoneId']; ?>"><?php echo ucwords(strtolower($res['ZoneName'])); ?></option><?php } ?></select></td>
	  <td style="font-size:11px;height:18px;color:#E6E6E6;" align="right"><b>State :</b></td>
	   <td><span id="StateSpan"><select style="font-size:12px;width:130px;height:20px;background-color:#DDFFBB;" name="state" id="state" onChange="ClickState(this.value)" <?php if($_REQUEST['c']==0){echo 'disabled';} ?>><?php if($_REQUEST['s']>0){ $sqlS=mysql_query("SELECT StateName FROM hrm_state where StateId=".$_REQUEST['s'], $con); $resS=mysql_fetch_array($sqlS); ?><option value="<?php echo $_REQUEST['s']; ?>"><?php echo ucwords(strtolower($resS['StateName'])); ?></option><?php }else{ ?><option value="0">Select</option><?php } ?><?php $sql = mysql_query("SELECT * FROM hrm_state where CountryId=".$_REQUEST['c']." order by StateName ASC", $con); while($res = mysql_fetch_array($sql)){ ?><option value="<?php echo $res['StateId']; ?>"><?php echo ucwords(strtolower($res['StateName'])); ?></option><?php } ?></select></span></td>
	  <td style="font-size:11px;height:18px;color:#E6E6E6;width:40px;" align="right"><b>HQ :</b></td>
	  <td><span id="HqSpan"><select style="font-size:12px;width:130px;height:20px;background-color:#DDFFBB;" name="hq" id="hq" onChange="ClickHq(this.value)" <?php if($_REQUEST['s']==0){echo 'disabled';} ?>><?php if($_REQUEST['hq']>0){ $sqlhq=mysql_query("SELECT HqName FROM hrm_headquater where HqId=".$_REQUEST['hq'], $con); $reshq=mysql_fetch_array($sqlhq); ?><option value="<?php echo $_REQUEST['hq']; ?>"><?php echo ucwords(strtolower($reshq['HqName'])); ?></option><?php }else{ ?><option value="0">Select</option><?php } ?><?php $sql = mysql_query("SELECT * FROM hrm_headquater where StateId=".$_REQUEST['s']." AND CompanyId=".$CompanyId." AND HQStatus='A' order by HqName ASC", $con); while($res = mysql_fetch_array($sql)){ ?><option value="<?php echo $res['HqId']; ?>"><?php echo ucwords(strtolower($res['HqName'])); ?></option><?php } ?></select></span>
	  </td>
	  <td style="font-size:11px;height:18px;color:#E6E6E6;width:60px;" align="right"><b>Dealer :</b></td>
	  <td><span id="TabResult"><select style="font-size:12px;width:250px;height:20px;background-color:#DDFFBB;" name="dealer" id="dealer" onChange="ClickDealer(this.value)" <?php if($_REQUEST['dil']==0){echo '';} ?> <?php if($_REQUEST['hq']==0){echo 'disabled';} ?>><?php if($_REQUEST['dil']>0){ $sqldil=mysql_query("SELECT DealerName,DealerCity FROM hrm_sales_dealer where DealerId=".$_REQUEST['dil'], $con); $resdil=mysql_fetch_array($sqldil); ?><option value="<?php echo $_REQUEST['dil']; ?>"><?php echo ucwords(strtolower($resdil['DealerName'].'-'.$resdil['DealerCity'])); ?></option><?php }else{ ?><option value="0">Select</option><?php } ?><?php if($_REQUEST['hq']>0){ $sql=mysql_query("SELECT DealerId,DealerName,DealerCity FROM hrm_sales_dealer where HqId=".$_REQUEST['hq'], $con); while($res=mysql_fetch_array($sql)){ ?><option value="<?php echo $res['DealerId']; ?>"><?php echo ucwords(strtolower($res['DealerName'].'-'.$res['DealerCity'])); ?></option><?php } } ?></select></span></td>
	 </tr>
	 
	 <tr>
	 <td style="font-size:11px; height:18px;color:#E6E6E6;" align="right"><b>Employee :</b></td>
	 <td colspan="3"><select style="font-family:Georgia;font-size:14px;width:px;background-color:#E4E0FC;height:23px;width:318px;" name="emp" id="emp" onChange="ChangeEmp(this.value)"><?php if($_REQUEST['e']>0){ $sqlee=mysql_query("select e.EmployeeID,EmpCode,Fname,Sname,Lname,CostCenter,HqName,StateName from hrm_employee e inner join hrm_employee_general g on e.EmployeeID=g.EmployeeID inner join hrm_headquater hq on g.HqId=hq.HqId inner join hrm_state s on hq.StateId=s.StateId where e.EmployeeID=".$_REQUEST['e'],$con); $ree=mysql_fetch_assoc($sqlee); echo '<option value='.$_REQUEST['e'].' selected>'.ucwords(strtolower($ree['Fname'].' '.$ree['Sname'].' '.$ree['Lname'])).' -- '.$ree['HqName'].'&nbsp;('.$ree['StateName'].')</option>'; }else{ echo '<option value="0" selected>Select Employee Name</option>'; } ?><?php $sqle=mysql_query("select e.EmployeeID,EmpCode,Fname,Sname,Lname,CostCenter,HqName,StateName from hrm_employee e inner join hrm_employee_general g on e.EmployeeID=g.EmployeeID inner join hrm_headquater hq on g.HqId=hq.HqId inner join hrm_state s on hq.StateId=s.StateId where e.EmpStatus='A' AND g.DepartmentId=6 order by e.Fname ASC",$con);
while($re=mysql_fetch_assoc($sqle)){ ?><option value="<?php echo $re['EmployeeID']; ?>"><?php echo ucwords(strtolower($re['Fname'].' '.$re['Sname'].' '.$re['Lname'])).' -- '.$re['HqName'].'&nbsp;('.$re['StateName'].')'; ?></option>
<?php } ?></select></td>
	  <td colspan="6">&nbsp;<a href="#" onClick="ExportDiff(<?php echo $_REQUEST['y']; ?>)" style="color:#F9F900; font-size:12px;"><b>Export for filter deviation reports</b></a></td>
	 </tr>
	</table>
   </td>
   </tr>
 </table>
 </td>
 </tr>
<tr>

<?php
if($_REQUEST['grp']==1){ $HqCon='Hq_vc'; $TerrCon='Terr_vc'; }
elseif($_REQUEST['grp']==2){ $HqCon='Hq_fc'; $TerrCon='Terr_fc'; }

if($_REQUEST['ii']>0){ $qin="sp.ItemId=".$_REQUEST['ii']; }
else{ if($_REQUEST['grp']==1 OR $_REQUEST['grp']==2){ $qin="si.GroupId=".$_REQUEST['grp']; }else{ $qin='1=1'; } }
?>

<td>
 <table>
  <tr>
   <td>
<?php /* Start Start Start Start */ ?>   
<?php if($_REQUEST['e']>0 OR $_REQUEST['dil']>0 OR $_REQUEST['hq']>0 OR $_REQUEST['z']>0 OR $_REQUEST['s']>0 OR $_REQUEST['c']>0){ ?>
    <table border="1" cellpadding="0" cellspacing="0" style="font-family:Times New Roman;font-size:12px;width:650px;vertical-align:top;">
	 <tr style="height:22px;background-color:#D5F1D1;">
      <td colspan="4" style="width:50px;font-size:14px;text-align:center;">&nbsp;<b style="color:#E17100;"><?php if($_REQUEST['e']>0){echo ucwords(strtolower($ree['Fname'].' '.$ree['Sname'].' '.$ree['Lname'])).' -- '.$ree['HqName'].'&nbsp;('.$ree['StateName'].')'; }elseif($_REQUEST['dil']>0){echo ucwords(strtolower($resdil['DealerName'].'-'.$resdil['DealerCity']));}elseif($_REQUEST['hq']>0){echo ucwords(strtolower($reshq['HqName']));}elseif($_REQUEST['z']>0 OR $_REQUEST['s']>0){ if($_REQUEST['z']>0){echo ucwords(strtolower($resZ['ZoneName']));}elseif($_REQUEST['s']>0){echo ucwords(strtolower($resS['StateName']));} }elseif($_REQUEST['c']>0){echo ucwords(strtolower($resC['CountryName']));} ?></b></td>
   <td colspan="2" align="center" style="width:180px;font-size:14px;"><b>Year : <?php echo $fromdate.'-'.$todate; ?></b></td>
   <td align="center" style="width:90px;font-size:14px;"><b><?php if($_REQUEST['e']>0 OR $_REQUEST['dil']>0 OR $_REQUEST['hq']>0 OR $_REQUEST['s']>0 OR $_REQUEST['c']>0 OR $_REQUEST['z']>0){ ?><a href="#" onClick="DiffRptExport(<?php echo $_REQUEST['y'].', '.$_REQUEST['grp'].', '.$_REQUEST['ii'].', '.$_REQUEST['dil'].', '.$_REQUEST['hq'].', '.$_REQUEST['s'].', '.$_REQUEST['c'].', '.$_REQUEST['z'].', '.$_REQUEST['e']; ?>)" style="font-size:12px;"><b>Export</b></a><?php } ?></b></td>
     </tr>
     <tr style="height:22px;background-color:#D5F1D1;">
	  <td align="center" style="width:50px;font-size:14px;"><b>Sn</b></td>
      <td align="center" style="width:120px;font-size:14px;"><b>Crop</b></td>
      <td align="center" style="width:150px;font-size:14px;"><b>Variety</b></td>
      <td align="center" style="width:40px;font-size:14px;"><b>Type</b></td>
      <td align="center" style="width:90px;font-size:14px;"><b>Proj. Data</b></td>
	  <td align="center" style="width:90px;font-size:14px;"><b>Tgt. Data</b></td>
	  <td align="center" style="width:90px;font-size:14px;"><b>Deviation(Kg)</b></td>
     </tr>
<?php $sql = mysql_query("select sp.ItemId,ProductId,ProductName,ItemName,ItemCode,TypeName from hrm_sales_seedsproduct sp INNER JOIN hrm_sales_seedsitem si ON sp.ItemId=si.ItemId INNER JOIN hrm_sales_seedtype st ON sp.TypeId=st.TypeId where ".$qin." order by si.GroupId ASC, ItemName ASC, TypeName ASC, ProductName ASC", $con); 
      $Sn=1; while($res=mysql_fetch_array($sql)){
	  
	  if($_REQUEST['e']>0){ $result = mysql_query("select sum(M1) as M1, sum(M2) as M2, sum(M3) as M3, sum(M4) as M4, sum(M5) as M5, sum(M6) as M6, sum(M7) as M7, sum(M8) as M8, sum(M9) as M9, sum(M10) as M10, sum(M11) as M11, sum(M12) as M12, sum(M1_Proj) as M1p, sum(M2_Proj) as M2p, sum(M3_Proj) as M3p, sum(M4_Proj) as M4p, sum(M5_Proj) as M5p, sum(M6_Proj) as M6p, sum(M7_Proj) as M7p, sum(M8_Proj) as M8p, sum(M9_Proj) as M9p, sum(M10_Proj) as M10p, sum(M11_Proj) as M11p, sum(M12_Proj) as M12p from hrm_sales_sal_details_".$_REQUEST['y']." sd inner join hrm_sales_dealer d on sd.DealerId=d.DealerId inner join hrm_sales_reporting_level rl on d.".$TerrCon."=rl.EmployeeID where d.DealerSts='A' AND (".$TerrCon."=".$_REQUEST['e']." OR rl.R1=".$_REQUEST['e']." OR rl.R2=".$_REQUEST['e']." OR rl.R3=".$_REQUEST['e']." OR rl.R4=".$_REQUEST['e']." OR rl.R5=".$_REQUEST['e'].") AND d.DealerSts='A' AND sd.YearId=".$_REQUEST['y']." AND sd.ProductId=".$res['ProductId'], $con); }
	  
	  elseif($_REQUEST['dil']>0){ $result = mysql_query("select sum(M1) as M1, sum(M2) as M2, sum(M3) as M3, sum(M4) as M4, sum(M5) as M5, sum(M6) as M6, sum(M7) as M7, sum(M8) as M8, sum(M9) as M9, sum(M10) as M10, sum(M11) as M11, sum(M12) as M12, sum(M1_Proj) as M1p, sum(M2_Proj) as M2p, sum(M3_Proj) as M3p, sum(M4_Proj) as M4p, sum(M5_Proj) as M5p, sum(M6_Proj) as M6p, sum(M7_Proj) as M7p, sum(M8_Proj) as M8p, sum(M9_Proj) as M9p, sum(M10_Proj) as M10p, sum(M11_Proj) as M11p, sum(M12_Proj) as M12p from hrm_sales_sal_details_".$_REQUEST['y']." where DealerId=".$_REQUEST['dil']." AND YearId=".$_REQUEST['y']." AND ProductId=".$res['ProductId'], $con); }
	  
	  elseif($_REQUEST['hq']>0){ $result = mysql_query("select sum(M1) as M1, sum(M2) as M2, sum(M3) as M3, sum(M4) as M4, sum(M5) as M5, sum(M6) as M6, sum(M7) as M7, sum(M8) as M8, sum(M9) as M9, sum(M10) as M10, sum(M11) as M11, sum(M12) as M12, sum(M1_Proj) as M1p, sum(M2_Proj) as M2p, sum(M3_Proj) as M3p, sum(M4_Proj) as M4p, sum(M5_Proj) as M5p, sum(M6_Proj) as M6p, sum(M7_Proj) as M7p, sum(M8_Proj) as M8p, sum(M9_Proj) as M9p, sum(M10_Proj) as M10p, sum(M11_Proj) as M11p, sum(M12_Proj) as M12p from hrm_sales_sal_details_".$_REQUEST['y']." sd inner join hrm_sales_dealer d on sd.DealerId=d.DealerId where d.".$HqCon."=".$_REQUEST['hq']." AND d.DealerSts='A' AND sd.YearId=".$_REQUEST['y']." AND sd.ProductId=".$res['ProductId'], $con); }
	  
	  elseif($_REQUEST['z']>0 OR $_REQUEST['s']>0)
	  {  
	    if($_REQUEST['z']>0){ $result = mysql_query("select sum(M1) as M1, sum(M2) as M2, sum(M3) as M3, sum(M4) as M4, sum(M5) as M5, sum(M6) as M6, sum(M7) as M7, sum(M8) as M8, sum(M9) as M9, sum(M10) as M10, sum(M11) as M11, sum(M12) as M12, sum(M1_Proj) as M1p, sum(M2_Proj) as M2p, sum(M3_Proj) as M3p, sum(M4_Proj) as M4p, sum(M5_Proj) as M5p, sum(M6_Proj) as M6p, sum(M7_Proj) as M7p, sum(M8_Proj) as M8p, sum(M9_Proj) as M9p, sum(M10_Proj) as M10p, sum(M11_Proj) as M11p, sum(M12_Proj) as M12p from hrm_sales_sal_details_".$_REQUEST['y']." sd inner join hrm_sales_dealer d on sd.DealerId=d.DealerId inner join hrm_headquater hq on d.".$HqCon."=hq.HqId inner join hrm_state s on hq.StateId=s.StateId where s.ZoneId=".$_REQUEST['z']." AND d.DealerSts='A' AND sd.YearId=".$_REQUEST['y']." AND sd.ProductId=".$res['ProductId'], $con); }
		elseif($_REQUEST['s']>0){ $result = mysql_query("select sum(M1) as M1, sum(M2) as M2, sum(M3) as M3, sum(M4) as M4, sum(M5) as M5, sum(M6) as M6, sum(M7) as M7, sum(M8) as M8, sum(M9) as M9, sum(M10) as M10, sum(M11) as M11, sum(M12) as M12, sum(M1_Proj) as M1p, sum(M2_Proj) as M2p, sum(M3_Proj) as M3p, sum(M4_Proj) as M4p, sum(M5_Proj) as M5p, sum(M6_Proj) as M6p, sum(M7_Proj) as M7p, sum(M8_Proj) as M8p, sum(M9_Proj) as M9p, sum(M10_Proj) as M10p, sum(M11_Proj) as M11p, sum(M12_Proj) as M12p from hrm_sales_sal_details_".$_REQUEST['y']." sd inner join hrm_sales_dealer d on sd.DealerId=d.DealerId inner join hrm_headquater hq on d.".$HqCon."=hq.HqId where hq.StateId=".$_REQUEST['s']." AND sd.YearId=".$_REQUEST['y']." AND d.DealerSts='A' AND sd.ProductId=".$res['ProductId'], $con); }
	  }
	  
	  elseif($_REQUEST['c']>0){ $result = mysql_query("select sum(M1) as M1, sum(M2) as M2, sum(M3) as M3, sum(M4) as M4, sum(M5) as M5, sum(M6) as M6, sum(M7) as M7, sum(M8) as M8, sum(M9) as M9, sum(M10) as M10, sum(M11) as M11, sum(M12) as M12, sum(M1_Proj) as M1p, sum(M2_Proj) as M2p, sum(M3_Proj) as M3p, sum(M4_Proj) as M4p, sum(M5_Proj) as M5p, sum(M6_Proj) as M6p, sum(M7_Proj) as M7p, sum(M8_Proj) as M8p, sum(M9_Proj) as M9p, sum(M10_Proj) as M10p, sum(M11_Proj) as M11p, sum(M12_Proj) as M12p from hrm_sales_sal_details_".$_REQUEST['y']." sd inner join hrm_sales_dealer d on sd.DealerId=d.DealerId inner join hrm_headquater hq on d.".$HqCon."=hq.HqId inner join hrm_state s on hq.StateId=s.StateId where s.CountryId=".$_REQUEST['c']." AND d.DealerSts='A' AND sd.YearId=".$_REQUEST['y']." AND sd.ProductId=".$res['ProductId'], $con); }
	  $r=mysql_fetch_assoc($result);
	  $Fill=$r['M1']+$r['M2']+$r['M3']+$r['M4']+$r['M5']+$r['M6']+$r['M7']+$r['M8']+$r['M9']+$r['M10']+$r['M11']+$r['M12']; 
	  $Proj=$r['M1p']+$r['M2p']+$r['M3p']+$r['M4p']+$r['M5p']+$r['M6p']+$r['M7p']+$r['M8p']+$r['M9p']+$r['M10p']+$r['M11p']+$r['M12p'];
	  if($Fill<$Proj){ $Diff=$Proj-$Fill; $MDiff='-'.$Diff; }
          elseif($Fill>$Proj){ $Diff=$Fill-$Proj; $MDiff='+'.$Diff; }
          elseif($Fill==$Proj){ $MDiff=0; } 	  
?>	 

<?php if($Fill<0 OR $Fill>0 OR $Proj<0 OR $Proj>0){ ?>
    <tr style="background-color:#FFFFFF;">
      <td align="center" style="font-size:12px;"><?php echo $Sn; ?></td>
      <td style="font-size:12px;">&nbsp;<?php echo ucwords(strtolower($res['ItemName'])); ?></td>
      <td style="font-size:12px;">&nbsp;<?php echo ucwords(strtolower($res['ProductName'])); ?></td>
   <td align="center" style="font-size:12px;"><?php echo ucwords(strtolower(substr_replace($res['TypeName'],'',2)));?></td>
      <td align="right" style="font-size:12px;"><?php echo $Proj; ?>&nbsp;</td>
	  <td align="right" style="font-size:12px;"><?php echo $Fill; ?>&nbsp;</td>
	  <td align="right" style="font-size:12px;"><?php echo $MDiff; ?>&nbsp;</td>
     </tr>
<?php $Sn++; } ?>	 
<?php  } ?>	 
    </table>
<?php } ?>	
<?php /* End End End End End */ ?> 	
   </td>
  </tr>
 </table>
</td>
</tr> 
  </table>
 </td>
</tr>
</table>
		
<?php //*********************************************************?>
<?php //**********************END*****END*****END******END******END***************************?>
<?php //***********************************************************************?>
		
	  </td>
	</tr>
  </table>
 </td>
</tr>
</table>
</body>
</html>

</html>
