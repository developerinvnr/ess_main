<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');}
include("../function.php");
include('codeEncDec.php');
if(check_user()==false){header('Location:../../../index.php');}
if($_SESSION['login'] = true){require_once('UserMenuSession.php');}
?>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php include_once('../Title.php'); ?></title>

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
.inner_table { height:500px;overflow-y:auto;width:auto; }
</style>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<script src="js/jquery-1.9.1.js"></script>
<script type="text/javascript" src="js/jquery.freezeheader.js"></script>
<script>$(document).ready(function () { $("#table1").freezeHeader({ 'height':'500px' }); })</script>
<Script language="javascript">
/*function ClickGrp(CropGrp)
{ window.location='CollpRpt.php?SelY=Y&ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y='+document.getElementById("YearV").value+'&ci='+document.getElementById("ComId").value+'&c='+document.getElementById("coutry").value+'&z='+document.getElementById("zone").value+'&s='+document.getElementById("state").value+'&hq='+document.getElementById("hq").value+'&dil='+document.getElementById("dealer").value+'&e='+document.getElementById("emp").value+'&grp='+CropGrp+'&ii=0&c1=1&c2=1&c3=1&c4=1&c5=1&ctot=5'; }

function ChangeII(ii)
{ window.location='CollpRpt.php?SelY=Y&ern1=r114&ern2w=234&ern3y=1034&ern=4e2&erne=4e&er=24&er=110044&eretd=ee&rernr=09Ge&ernS=eewwqq&y='+document.getElementById("YearV").value+'&ci='+document.getElementById("ComId").value+'&c='+document.getElementById("coutry").value+'&z='+document.getElementById("zone").value+'&s='+document.getElementById("state").value+'&hq='+document.getElementById("hq").value+'&dil='+document.getElementById("dealer").value+'&e='+document.getElementById("emp").value+'&grp='+document.getElementById("CropGrp").value+'&ii='+ii+'&c1=1&c2=1&c3=1&c4=1&c5=1&ctot=5';}
*/

function ChangrYear(y)
{ window.location= 'CollpRpt.php?SelY=Y&ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y='+y+'&ci='+document.getElementById("ComId").value+'&c='+document.getElementById("coutry").value+'&z='+document.getElementById("zone").value+'&s='+document.getElementById("state").value+'&hq='+document.getElementById("hq").value+'&dil='+document.getElementById("dealer").value+'&grp='+document.getElementById("CropGrp").value+'&e='+document.getElementById("emp").value+'&q=1&ii='+document.getElementById("ItemV").value+'&c1=1&c2=1&c3=1&c4=1&c5=1&ctot=5'; }

function ClickCoutry(c) 
{ 
 window.location='CollpRpt.php?SelY=Y&ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y='+document.getElementById("YearV").value+'&ci='+document.getElementById("ComId").value+'&c='+c+'&z=0&s=0&hq=0&dil=0&grp='+document.getElementById("CropGrp").value+'&e=0&q=1&ii='+document.getElementById("ItemV").value+'&c1=1&c2=1&c3=1&c4=1&c5=1&ctot=5';
}

function ClickZone(z)
{ window.location='CollpRpt.php?SelY=Y&ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y='+document.getElementById("YearV").value+'&ci='+document.getElementById("ComId").value+'&c='+document.getElementById("coutry").value+'&z='+z+'&s=0&hq=0&dil=0&grp='+document.getElementById("CropGrp").value+'&e=0&q=1&ii='+document.getElementById("ItemV").value+'&c1=1&c2=1&c3=1&c4=1&c5=1&ctot=5';
}

function ClickState(s)
{ window.location='CollpRpt.php?SelY=Y&ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y='+document.getElementById("YearV").value+'&ci='+document.getElementById("ComId").value+'&c='+document.getElementById("coutry").value+'&z=0&s='+s+'&hq=0&dil=0&grp='+document.getElementById("CropGrp").value+'&q=1&ii='+document.getElementById("ItemV").value+'&e=0&c1=1&c2=1&c3=1&c4=1&c5=1&ctot=5';}

function ClickHq(hq)
{ window.location='CollpRpt.php?SelY=Y&ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y='+document.getElementById("YearV").value+'&ci='+document.getElementById("ComId").value+'&c='+document.getElementById("coutry").value+'&z='+document.getElementById("zone").value+'&s='+document.getElementById("state").value+'&hq='+hq+'&dil=0&grp='+document.getElementById("CropGrp").value+'&e=0&q=1&ii='+document.getElementById("ItemV").value+'&c1=1&c2=1&c3=1&c4=1&c5=1&ctot=5';}

function ClickDealer(d)
{ window.location='CollpRpt.php?SelY=Y&ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y='+document.getElementById("YearV").value+'&ci='+document.getElementById("ComId").value+'&c='+document.getElementById("coutry").value+'&z='+document.getElementById("zone").value+'&s='+document.getElementById("state").value+'&hq='+document.getElementById("hq").value+'&dil='+d+'&e=0&grp='+document.getElementById("CropGrp").value+'&q=1&ii='+document.getElementById("ItemV").value+'&c1=1&c2=1&c3=1&c4=1&c5=1&ctot=5';}

function ChangeEmp(e)
{ window.location='CollpRpt.php?SelY=Y&ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y='+document.getElementById("YearV").value+'&ci='+document.getElementById("ComId").value+'&c=0&z=0&s=0&hq=0&dil=0&e='+e+'&grp='+document.getElementById("CropGrp").value+'&q=1&ii='+document.getElementById("ItemV").value+'&c1=1&c2=1&c3=1&c4=1&c5=1&ctot=5';
}

function FunRep()
{ 
 window.location='CollpRpt.php?SelY=Y&ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y='+document.getElementById("YearV").value+'&ci='+document.getElementById("ComId").value+'&c='+document.getElementById("coutry").value+'&z='+document.getElementById("zone").value+'&s='+document.getElementById("state").value+'&hq='+document.getElementById("hq").value+'&dil='+document.getElementById("dealer").value+'&e='+document.getElementById("emp").value+'&grp='+document.getElementById("CropGrp").value+'&q=1&ii='+document.getElementById("ItemV").value+'&c1=1&c2=1&c3=1&c4=1&c5=1&ctot=5&resltOpen=yny'; 
}

/*function DiffRptExport(y,grp,ii,dil,hq,s,c,z,e)
{ 
  window.open("DiffpRptExport.php?action=DiffpRExport&y="+y+"&grp="+grp+"&ii="+ii+"&dil="+dil+"&hq="+hq+"&s="+s+"&c="+c+"&z="+z+"&e="+e,"ExpForm","menubar=yes,scrollbars=yes,resizable=no,directories=no,width=20,height=20");
}

function ExportDiff(y)
{ window.open("DiffpRptExport.php?action=Diff22pRExport&y="+y,"ExpForm","menubar=yes,scrollbars=yes,resizable=no,directories=no,width=20,height=20"); } */
  
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
<td rowspan="4" colspan="2" style="margin-top:0px;width:120px;" class="heading" align="center"><u>Collection Reports:</u></td>
	   <td style="font-size:11px;height:18px;width:80px;color:#E6E6E6;" align="right"><b>Year :</b></td>
	   <td style="width:105px;"><select style="font-size:12px;width:120px;height:20px;background-color:#DDFFBB;" name="YearV" id="YearV" onChange="ChangrYear(this.value)"><?php $sqly=mysql_query("select FromDate,ToDate from hrm_year where YearId=".$_REQUEST['y'], $con); $resy=mysql_fetch_assoc($sqly);
      $fromdate=date("Y",strtotime($resy['FromDate'])); $todate=date("Y",strtotime($resy['ToDate'])); 
	  $NextYear=$_REQUEST['y']+1; $PrevYear=$_REQUEST['y']-1; 
	  $sqly2=mysql_query("select FromDate,ToDate from hrm_year where YearId=".$NextYear, $con); 
	  $sqly3=mysql_query("select FromDate,ToDate from hrm_year where YearId=".$PrevYear, $con); 
	  $resy2=mysql_fetch_assoc($sqly2); $resy3=mysql_fetch_assoc($sqly3); ?>		
 <option value="<?php echo $_REQUEST['y']; ?>" selected><?php echo $fromdate.'-'.$todate; ?></option>
 <?php if($PrevYear>=1){?><option value="<?php echo $PrevYear; ?>"><?php echo date("Y",strtotime($resy3['FromDate'])).'-'.date("Y",strtotime($resy3['ToDate'])); ?></option><?php } ?><option value="<?php echo $NextYear; ?>"><?php echo date("Y",strtotime($resy2['FromDate'])).'-'.date("Y",strtotime($resy2['ToDate'])); ?></option></select></td>
	  
	 

      <td style="font-size:11px;height:18px;color:#E6E6E6;width:65px;" align="right"><b>Country :</b></td>
	  <td><select style="font-size:12px;width:120px;height:20px;background-color:#DDFFBB;" name="coutry" id="coutry" onChange="ClickCoutry(this.value)"><?php if($_REQUEST['c']>0){ $sqlC=mysql_query("SELECT CountryName FROM hrm_country where CountryId=".$_REQUEST['c'], $con); $resC=mysql_fetch_array($sqlC); ?><option value="<?php echo $_REQUEST['c']; ?>"><?php echo ucwords(strtolower($resC['CountryName'])); ?></option><?php }else{ ?><option value="0">Select</option><?php } ?><?php $SqlCountry=mysql_query("SELECT * FROM hrm_country order by CountryName ASC", $con); while($ResCountry=mysql_fetch_array($SqlCountry)) { ?><option value="<?php echo $ResCountry['CountryId']; ?>"><?php echo ucwords(strtolower($ResCountry['CountryName'])); ?></option><?php } ?></select></td>
	   <td style="font-size:11px;height:18px;color:#E6E6E6;"align="right"><b>Zone :</b></td>
	   <td><select style="font-size:12px;width:130px;height:20px;background-color:#DDFFBB;" name="zone" id="zone" onChange="ClickZone(this.value)"  <?php if($_REQUEST['c']==0){echo 'disabled';} ?>><?php if($_REQUEST['z']>0){ $sqlZ=mysql_query("SELECT ZoneName FROM hrm_sales_zone where ZoneId=".$_REQUEST['z'], $con); $resZ=mysql_fetch_array($sqlZ); ?><option value="<?php echo $_REQUEST['z']; ?>"><?php echo ucwords(strtolower($resZ['ZoneName'])); ?></option><?php }else{ ?><option value="0">Select</option><?php } ?><?php $sql = mysql_query("SELECT * FROM hrm_sales_zone order by ZoneName ASC", $con); while($res = mysql_fetch_array($sql)){ ?><option value="<?php echo $res['ZoneId']; ?>"><?php echo ucwords(strtolower($res['ZoneName'])); ?></option><?php } ?></select></td>
	   <td style="font-size:11px;height:18px;color:#E6E6E6;" align="right"><b>State :</b></td>
	   <td><span id="StateSpan"><select style="font-size:12px;width:135px;height:20px;background-color:#DDFFBB;" name="state" id="state" onChange="ClickState(this.value)" <?php if($_REQUEST['c']==0){echo 'disabled';} ?>><?php if($_REQUEST['s']>0){ $sqlS=mysql_query("SELECT StateName FROM hrm_state where StateId=".$_REQUEST['s'], $con); $resS=mysql_fetch_array($sqlS); ?><option value="<?php echo $_REQUEST['s']; ?>"><?php echo ucwords(strtolower($resS['StateName'])); ?></option><?php }else{ ?><option value="0">Select</option><?php } ?><?php $sql = mysql_query("SELECT * FROM hrm_state where CountryId=".$_REQUEST['c']." order by StateName ASC", $con); while($res = mysql_fetch_array($sql)){ ?><option value="<?php echo $res['StateId']; ?>"><?php echo ucwords(strtolower($res['StateName'])); ?></option><?php } ?></select></span></td>
	   
	   <td style="font-size:11px;height:18px;color:#E6E6E6;width:40px;" align="right"><b>HQ :</b></td>
	   <td><span id="HqSpan"><select style="font-size:12px;width:130px;height:20px;background-color:#DDFFBB;" name="hq" id="hq" onChange="ClickHq(this.value)" <?php //if($_REQUEST['s']==0){echo 'disabled';} ?>><?php if($_REQUEST['hq']>0){ $sqlhq=mysql_query("SELECT HqName FROM hrm_headquater where HqId=".$_REQUEST['hq'], $con); $reshq=mysql_fetch_array($sqlhq); ?><option value="<?php echo $_REQUEST['hq']; ?>"><?php echo ucwords(strtolower($reshq['HqName'])); ?></option><?php }else{ ?><option value="0">Select</option><?php } ?><?php if($_REQUEST['s']>0){ $sql = mysql_query("SELECT * FROM hrm_headquater where StateId=".$_REQUEST['s']." AND CompanyId=".$CompanyId." AND HQStatus='A' order by HqName ASC", $con);}else{ $sql = mysql_query("SELECT * FROM hrm_headquater where CompanyId=".$CompanyId." AND HQStatus='A' order by HqName ASC", $con); } while($res = mysql_fetch_array($sql)){ ?><option value="<?php echo $res['HqId']; ?>"><?php echo ucwords(strtolower($res['HqName'])); ?></option><?php } ?></select></span>
	  </td>
	   <input type="hidden" name="CropGrp" id="CropGrp" value="<?php echo $_REQUEST['grp']; ?>" />
	   <input type="hidden" name="ItemV" id="ItemV" value="<?php echo $_REQUEST['ii']; ?>" />
	 </tr>
	 
	 <tr>
	   
	  
	  <td style="font-size:11px;height:18px;color:#E6E6E6;width:60px;" align="right"><b>Dealer :</b></td>
	  <td colspan="3"><span id="TabResult"><select style="font-size:12px;width:313px;height:20px;background-color:#DDFFBB;" name="dealer" id="dealer" onChange="ClickDealer(this.value)" <?php if($_REQUEST['dil']==0){echo '';} ?> <?php //if($_REQUEST['hq']==0){echo 'disabled';} ?>><?php if($_REQUEST['dil']>0){ $sqldil=mysql_query("SELECT DealerName,DealerCity FROM hrm_sales_dealer where DealerId=".$_REQUEST['dil'], $con); $resdil=mysql_fetch_array($sqldil); ?><option value="<?php echo $_REQUEST['dil']; ?>"><?php echo ucwords(strtolower($resdil['DealerName'].'-'.$resdil['DealerCity'])); ?></option><?php }else{ ?><option value="0">Select</option><?php } ?><?php if($_REQUEST['hq']>0){ $sql=mysql_query("SELECT DealerId,DealerName,DealerCity FROM hrm_sales_dealer where (Hq_vc=".$_REQUEST['hq']." OR Hq_fc=".$_REQUEST['hq'].") group by DealerId order by DealerName ASC", $con); }else{$sql=mysql_query("SELECT DealerId,DealerName,DealerCity FROM hrm_sales_dealer order by DealerName ASC", $con);} while($res=mysql_fetch_array($sql)){ ?><option value="<?php echo $res['DealerId']; ?>"><?php echo ucwords(strtolower($res['DealerName'].'-'.$res['DealerCity'])); ?></option><?php } ?></select></span></td>
	  
	   <td style="font-size:11px; height:18px;color:#E6E6E6; width:80px;" align="right"><b>Employee :</b></td>
	  <td colspan="3"><select style="font-family:Georgia;font-size:14px;width:px;background-color:#E4E0FC;height:23px;width:318px;" name="emp" id="emp" onChange="ChangeEmp(this.value)"><?php if($_REQUEST['e']>0){ $sqlee=mysql_query("select e.EmployeeID,EmpCode,Fname,Sname,Lname,CostCenter,HqName,StateName from hrm_employee e inner join hrm_employee_general g on e.EmployeeID=g.EmployeeID inner join hrm_headquater hq on g.HqId=hq.HqId inner join hrm_state s on hq.StateId=s.StateId where e.EmployeeID=".$_REQUEST['e'],$con); $ree=mysql_fetch_assoc($sqlee); echo '<option value='.$_REQUEST['e'].' selected>'.ucwords(strtolower($ree['Fname'].' '.$ree['Sname'].' '.$ree['Lname'])).' -- '.$ree['HqName'].'&nbsp;('.$ree['StateName'].')</option>'; }else{ echo '<option value="0" selected>Select Employee Name</option>'; } ?><?php $sqle=mysql_query("select e.EmployeeID,EmpCode,Fname,Sname,Lname,CostCenter,HqName,StateName from hrm_employee e inner join hrm_employee_general g on e.EmployeeID=g.EmployeeID inner join hrm_headquater hq on g.HqId=hq.HqId inner join hrm_state s on hq.StateId=s.StateId where e.EmpStatus='A' AND g.DepartmentId=6 order by e.Fname ASC",$con);
while($re=mysql_fetch_assoc($sqle)){ ?><option value="<?php echo $re['EmployeeID']; ?>"><?php echo ucwords(strtolower($re['Fname'].' '.$re['Sname'].' '.$re['Lname'])).' -- '.$re['HqName'].'&nbsp;('.$re['StateName'].')'; ?></option>
<?php } ?></select></td>
	  
	  <td colspan="2" align="right"><input type="button" onClick="FunRep()" value="Click" style="width:80px; background-color:#FFAEFF; cursor:pointer;"/></td> 
	  <!--<td>&nbsp;<a href="#" onClick="ExportDiff(<?php echo $_REQUEST['y']; ?>)" style="color:#F9F900; font-size:12px;"><b>Export</b></a></td>-->
	 
	 </tr>
	 
	</table>
   </td>
   </tr>
 </table>
 </td>
 </tr>
<tr>
<td>
 <table style="width:100%;">
  <tr>
   <td style="width:100%;">   
<?php /* Start Start Start Start */ ?>   
<?php if($_REQUEST['e']>0 OR $_REQUEST['dil']>0 OR $_REQUEST['hq']>0 OR $_REQUEST['z']>0 OR $_REQUEST['s']>0 OR $_REQUEST['c']>0){ ?>
    <table border="1" id="table1" cellpadding="0" cellspacing="0" style="font-family:Times New Roman;font-size:12px;width:100%;vertical-align:top;">
	<div class="thead">
	<thead>
     <tr style="height:25px;background-color:#97FF97;">
	  <td align="center" style="width:30px;font-size:14px;"><b>Sn</b></td>
      <td align="center" style="width:200px;font-size:14px;"><b>Dealer Name</b></td>
	  <td align="center" style="width:50px;font-size:14px;"><b>Dealer ID</b></td>
      <td align="center" style="width:50px;font-size:14px;"><b>State</b></td>
      <td align="center" style="width:100px;font-size:14px;"><b>Hq_VC</b></td>
	  <td align="center" style="width:100px;font-size:14px;"><b>Hq_FC</b></td>
	  <td align="center" style="width:150px;font-size:14px;"><b>Territory_VC</b></td>
	  <td align="center" style="width:150px;font-size:14px;"><b>Territory_FC</b></td>
	  <td align="center" style="width:60px;font-size:14px;"><b>Apr</b></td>
	  <td align="center" style="width:60px;font-size:14px;"><b>May</b></td>
	  <td align="center" style="width:60px;font-size:14px;"><b>Jun</b></td>
	  <td align="center" style="width:60px;font-size:14px;"><b>Jul</b></td>
	  <td align="center" style="width:60px;font-size:14px;"><b>Aug</b></td>
	  <td align="center" style="width:60px;font-size:14px;"><b>Sep</b></td>
	  <td align="center" style="width:60px;font-size:14px;"><b>Oct</b></td>
	  <td align="center" style="width:60px;font-size:14px;"><b>Nov</b></td>
	  <td align="center" style="width:60px;font-size:14px;"><b>Dec</b></td>
	  <td align="center" style="width:60px;font-size:14px;"><b>Jan</b></td>
	  <td align="center" style="width:60px;font-size:14px;"><b>Feb</b></td>
	  <td align="center" style="width:60px;font-size:14px;"><b>Mar</b></td>
	  <td align="center" style="width:60px;font-size:14px;"><b>Total</b></td>
     </tr>
<?php if($_REQUEST['resltOpen']=='yny'){ ?>	 
<?php /*if($_REQUEST['e']>0){ $results = mysql_query("select sum(col_4) as scol_4,sum(col_5) as scol_5,sum(col_6) as scol_6,sum(col_7) as scol_7,sum(col_8) as scol_8,sum(col_9) as scol_9,sum(col_10) as scol_10,sum(col_11) as scol_11,sum(col_12) as scol_12,sum(col_1) as scol_1,sum(col_2) as scol_2,sum(col_3) as scol_3 from hrm_sales_rcp_collection sd inner join hrm_sales_dealer d on sd.DealerId=d.DealerId inner join hrm_sales_reporting_level rl on (d.Terr_vc=rl.EmployeeID OR d.Terr_fc=rl.EmployeeID) where d.DealerSts='A' AND (d.Terr_vc=".$_REQUEST['e']." OR d.Terr_fc=".$_REQUEST['e']." OR rl.R1=".$_REQUEST['e']." OR rl.R2=".$_REQUEST['e']." OR rl.R3=".$_REQUEST['e']." OR rl.R4=".$_REQUEST['e']." OR rl.R5=".$_REQUEST['e'].") AND sd.YearId=".$_REQUEST['y'], $con); }
	  
	  elseif($_REQUEST['dil']>0){ $results = mysql_query("select sum(col_4) as scol_4,sum(col_5) as scol_5,sum(col_6) as scol_6,sum(col_7) as scol_7,sum(col_8) as scol_8,sum(col_9) as scol_9,sum(col_10) as scol_10,sum(col_11) as scol_11,sum(col_12) as scol_12,sum(col_1) as scol_1,sum(col_2) as scol_2,sum(col_3) as scol_3 from hrm_sales_rcp_collection where DealerId=".$_REQUEST['dil']." AND YearId=".$_REQUEST['y'], $con); }
	  
	  elseif($_REQUEST['hq']>0){ $results = mysql_query("select sum(col_4) as scol_4,sum(col_5) as scol_5,sum(col_6) as scol_6,sum(col_7) as scol_7,sum(col_8) as scol_8,sum(col_9) as scol_9,sum(col_10) as scol_10,sum(col_11) as scol_11,sum(col_12) as scol_12,sum(col_1) as scol_1,sum(col_2) as scol_2,sum(col_3) as scol_3 from hrm_sales_rcp_collection sd inner join hrm_sales_dealer d on sd.DealerId=d.DealerId where (d.Hq_vc=".$_REQUEST['hq']." OR d.Hq_fc=".$_REQUEST['hq'].") AND sd.YearId=".$_REQUEST['y'], $con); }
	  
	  elseif($_REQUEST['z']>0 OR $_REQUEST['s']>0)
	  {  
	    if($_REQUEST['z']>0){ $results = mysql_query("select sum(col_4) as scol_4,sum(col_5) as scol_5,sum(col_6) as scol_6,sum(col_7) as scol_7,sum(col_8) as scol_8,sum(col_9) as scol_9,sum(col_10) as scol_10,sum(col_11) as scol_11,sum(col_12) as scol_12,sum(col_1) as scol_1,sum(col_2) as scol_2,sum(col_3) as scol_3 from hrm_sales_rcp_collection sd inner join hrm_sales_dealer d on sd.DealerId=d.DealerId inner join hrm_headquater hq on (d.Hq_vc=hq.HqId OR d.Hq_fc=hq.HqId) inner join hrm_state s on hq.StateId=s.StateId where s.ZoneId=".$_REQUEST['z']." AND sd.YearId=".$_REQUEST['y'], $con); }
		elseif($_REQUEST['s']>0){ $results = mysql_query("select sum(col_4) as scol_4,sum(col_5) as scol_5,sum(col_6) as scol_6,sum(col_7) as scol_7,sum(col_8) as scol_8,sum(col_9) as scol_9,sum(col_10) as scol_10,sum(col_11) as scol_11,sum(col_12) as scol_12,sum(col_1) as scol_1,sum(col_2) as scol_2,sum(col_3) as scol_3 from hrm_sales_rcp_collection sd inner join hrm_sales_dealer d on sd.DealerId=d.DealerId inner join hrm_headquater hq on (d.Hq_vc=hq.HqId OR d.Hq_fc=hq.HqId) where hq.StateId=".$_REQUEST['s']." AND sd.YearId=".$_REQUEST['y'], $con); }
	  }
	  
	  elseif($_REQUEST['c']>0){ $results = mysql_query("select sum(col_4) as scol_4,sum(col_5) as scol_5,sum(col_6) as scol_6,sum(col_7) as scol_7,sum(col_8) as scol_8,sum(col_9) as scol_9,sum(col_10) as scol_10,sum(col_11) as scol_11,sum(col_12) as scol_12,sum(col_1) as scol_1,sum(col_2) as scol_2,sum(col_3) as scol_3 from hrm_sales_rcp_collection sd inner join hrm_sales_dealer d on sd.DealerId=d.DealerId inner join hrm_headquater hq on (d.Hq_vc=hq.HqId OR d.Hq_fc=hq.HqId) inner join hrm_state s on hq.StateId=s.StateId where s.CountryId=".$_REQUEST['c']." AND sd.YearId=".$_REQUEST['y'], $con); }
	  $rs=mysql_fetch_array($results); */ ?>
<style>
.Tstye{width:100%;text-align:right;font-size:12px; font-family:Times New Roman;border:hidden;background-color:#FFFF80; font-weight:bold;}
</style>
<script type="text/javascript">
function CalT(v,n)
{ var A=parseFloat(v);
  var t = parseFloat(document.getElementById("T"+n).value); 
  document.getElementById("T"+n).value=Math.round((A+t)*10000)/10000; 
}

</script>
	 <tr style="background-color:#FFFF80; height:20px;">
      <td colspan="8" align="right" style="font-size:12px;"><b>Total:</b></td>
	  <td align="center"><input type="text" id="T4" class="Tstye" value="0" /></td>
	  <td align="center"><input type="text" id="T5" class="Tstye" value="0" /></td>
	  <td align="center"><input type="text" id="T6" class="Tstye" value="0" /></td>
	  <td align="center"><input type="text" id="T7" class="Tstye" value="0" /></td>
	  <td align="center"><input type="text" id="T8" class="Tstye" value="0" /></td>
	  <td align="center"><input type="text" id="T9" class="Tstye" value="0" /></td>
	  <td align="center"><input type="text" id="T10" class="Tstye" value="0" /></td>
	  <td align="center"><input type="text" id="T11" class="Tstye" value="0" /></td>
	  <td align="center"><input type="text" id="T12" class="Tstye" value="0" /></td>
	  <td align="center"><input type="text" id="T1" class="Tstye" value="0" /></td>
	  <td align="center"><input type="text" id="T2" class="Tstye" value="0" /></td>
	  <td align="center"><input type="text" id="T3" class="Tstye" value="0" /></td>
	  <?php //$Fills=$rs['scol_4']+$rs['scol_5']+$rs['scol_6']+$rs['scol_7']+$rs['scol_8']+$rs['scol_9']+$rs['scol_10']+$rs['scol_11']+$rs['scol_12']+$rs['scol_1']+$rs['scol_2']+$rs['scol_3']; ?>
	  <td align="center"><input type="text" id="TAll" class="Tstye" style="font-weight:bold;" value="0" /></td>
     </tr>
<?php } ?>	 
	</thead>
	</div> 
<?php if($_REQUEST['resltOpen']=='yny'){ ?>	 
<?php if($_REQUEST['e']>0){ $result = mysql_query("select sd.*,StateName,StateCode,HqName,DealerName,d.Terr_vc,d.Terr_fc,Hq_vc,Hq_fc from hrm_sales_rcp_collection sd inner join hrm_sales_dealer d on sd.DealerId=d.DealerId inner join hrm_headquater hq on d.HqId=hq.HqId inner join hrm_state s on hq.StateId=s.StateId inner join hrm_sales_reporting_level rl on (d.Terr_vc=rl.EmployeeID OR d.Terr_fc=rl.EmployeeID) where d.DealerSts='A' AND (d.Terr_vc=".$_REQUEST['e']." OR d.Terr_fc=".$_REQUEST['e']." OR rl.R1=".$_REQUEST['e']." OR rl.R2=".$_REQUEST['e']." OR rl.R3=".$_REQUEST['e']." OR rl.R4=".$_REQUEST['e']." OR rl.R5=".$_REQUEST['e'].") AND sd.YearId=".$_REQUEST['y']." group by sd.DealerId order by StateName,HqName,DealerName", $con); }
	  
	  elseif($_REQUEST['dil']>0){ $result = mysql_query("select sd.*,StateName,StateCode,HqName,DealerName,d.Terr_vc,d.Terr_fc,Hq_vc,Hq_fc from hrm_sales_rcp_collection sd inner join hrm_sales_dealer d on sd.DealerId=d.DealerId inner join hrm_headquater hq on d.HqId=hq.HqId inner join hrm_state s on hq.StateId=s.StateId where sd.DealerId=".$_REQUEST['dil']." AND sd.YearId=".$_REQUEST['y']." group by DealerId", $con); }
	  
	  elseif($_REQUEST['hq']>0){ $result = mysql_query("select sd.*,StateName,StateCode,HqName,DealerName,d.Terr_vc,d.Terr_fc,Hq_vc,Hq_fc from hrm_sales_rcp_collection sd inner join hrm_sales_dealer d on sd.DealerId=d.DealerId inner join hrm_headquater hq on (d.Hq_vc=hq.HqId OR d.Hq_fc=hq.HqId) inner join hrm_state s on hq.StateId=s.StateId where d.DealerSts='A' AND (d.Hq_vc=".$_REQUEST['hq']." OR d.Hq_fc=".$_REQUEST['hq'].") AND sd.YearId=".$_REQUEST['y']." group by sd.DealerId order by DealerName", $con); }
	  
	  elseif($_REQUEST['z']>0 OR $_REQUEST['s']>0)
	  {  
	    if($_REQUEST['z']>0){ $result = mysql_query("select sd.*,StateName,StateCode,HqName,DealerName,d.Terr_vc,d.Terr_fc,Hq_vc,Hq_fc from hrm_sales_rcp_collection sd inner join hrm_sales_dealer d on sd.DealerId=d.DealerId inner join hrm_headquater hq on (d.Hq_vc=hq.HqId OR d.Hq_fc=hq.HqId) inner join hrm_state s on hq.StateId=s.StateId where d.DealerSts='A' AND s.ZoneId=".$_REQUEST['z']." AND sd.YearId=".$_REQUEST['y']." group by sd.DealerId order by StateName,HqName,DealerName", $con); }
		elseif($_REQUEST['s']>0){ $result = mysql_query("select sd.*,StateName,StateCode,HqName,DealerName,d.Terr_vc,d.Terr_fc,Hq_vc,Hq_fc from hrm_sales_rcp_collection sd inner join hrm_sales_dealer d on sd.DealerId=d.DealerId inner join hrm_headquater hq on (d.Hq_vc=hq.HqId OR d.Hq_fc=hq.HqId) inner join hrm_state s on hq.StateId=s.StateId where d.DealerSts='A' AND hq.StateId=".$_REQUEST['s']." AND sd.YearId=".$_REQUEST['y']." group by sd.DealerId order by HqName,DealerName", $con); }
	  }
	  
	  elseif($_REQUEST['c']>0){ $result = mysql_query("select sd.*,StateName,StateCode,HqName,DealerName,d.Terr_vc,d.Terr_fc,Hq_vc,Hq_fc from hrm_sales_rcp_collection sd inner join hrm_sales_dealer d on sd.DealerId=d.DealerId inner join hrm_headquater hq on (d.Hq_vc=hq.HqId OR d.Hq_fc=hq.HqId) inner join hrm_state s on hq.StateId=s.StateId where d.DealerSts='A' AND s.CountryId=".$_REQUEST['c']." AND sd.YearId=".$_REQUEST['y']." group by sd.DealerId order by StateName,HqName,DealerName ", $con); }
	  
	  $Sn=1; while($r=mysql_fetch_array($result)){
	  
	  $sE=mysql_query("select Fname,Sname,Lname from hrm_employee where EmployeeID=".$r['Terr_vc'],$con);
	  $rE=mysql_fetch_assoc($sE); $rTNameV=ucwords(strtolower($rE['Fname'].' '.$rE['Sname'].' '.$rE['Lname']));
	  if($rTNameV!=''){$rTNameV=$rTNameV;}else{$rTNameV='';}
	  
	  $sE2=mysql_query("select Fname,Sname,Lname from hrm_employee where EmployeeID=".$r['Terr_fc'],$con);
	  $rE2=mysql_fetch_assoc($sE2); $rTNameF=ucwords(strtolower($rE2['Fname'].' '.$rE2['Sname'].' '.$rE2['Lname']));
	  if($rTNameF!=''){$rTNameF=$rTNameF;}else{$rTNameF='';}
	  
	  $Hqv=mysql_query("select HqName from hrm_headquater where HqId=".$r['Hq_vc'],$con); $rHqv=mysql_fetch_assoc($Hqv);
	  $Hqf=mysql_query("select HqName from hrm_headquater where HqId=".$r['Hq_fc'],$con); $rHqf=mysql_fetch_assoc($Hqf);
	  
	   
?>	 
   <div class="tbody">
   <tbody>
    <tr style="background-color:#FFFFFF; height:20px;">
      <td align="center" style="font-size:12px;"><?php echo $Sn; ?></td>
      <td style="font-size:12px;"><input type="text" value="<?php echo ucwords(strtolower($r['DealerName'])); ?>" style="border:hidden;font-size:12px; font-family:Times New Roman; width:100%;" /></td>
	  <td style="font-size:12px; text-align:center;"><?php echo $r['DealerId']; ?></td>
      <td align="center" style="font-size:12px;"><input type="text" value="<?php echo ucwords(strtolower($r['StateCode'])); ?>" style="border:hidden;font-size:12px; font-family:Times New Roman; text-align:center;width:100%;" /></td>
	  
	  <td align="center" style="font-size:12px;"><input type="text" value="<?php echo ucwords(strtolower($rHqv['HqName'])); ?>" style="border:hidden;font-size:12px; font-family:Times New Roman;width:100%;" /></td>
	  <td align="center" style="font-size:12px;"><input type="text" value="<?php echo ucwords(strtolower($rHqf['HqName'])); ?>" style="border:hidden;font-size:12px; font-family:Times New Roman;width:100%;" /></td>
	  
      <?php /*?><td style="font-size:12px;"><input type="text" value="<?php echo ucwords(strtolower($r['HqName'])); ?>" style="border:hidden;font-size:12px; font-family:Times New Roman;width:100%;" /></td><?php */?>
	  <td style="font-size:12px;"><input type="text" value="<?php echo ucwords(strtolower($rTNameV)); ?>" style="border:hidden;font-size:12px; font-family:Times New Roman;width:100%;" /></td>
	  <td style="font-size:12px;"><input type="text" value="<?php echo ucwords(strtolower($rTNameF)); ?>" style="border:hidden;font-size:12px; font-family:Times New Roman;width:100%;" /></td>
	  <td align="right" style="font-size:12px;"><?php echo floatval($r['col_4']); ?>&nbsp;
	  <?php if($r['col_4']>0){ echo '<script>CalT('.$r['col_4'].',4);</script>'; } ?></td>
	  <td align="right" style="font-size:12px;"><?php echo floatval($r['col_5']); ?>&nbsp;
	  <?php if($r['col_5']>0){ echo '<script>CalT('.$r['col_5'].',5);</script>'; } ?></td>
	  <td align="right" style="font-size:12px;"><?php echo floatval($r['col_6']); ?>&nbsp;
	  <?php if($r['col_6']>0){ echo '<script>CalT('.$r['col_6'].',6);</script>'; } ?></td>
	  <td align="right" style="font-size:12px;"><?php echo floatval($r['col_7']); ?>&nbsp;
	  <?php if($r['col_7']>0){ echo '<script>CalT('.$r['col_7'].',7);</script>'; } ?></td>
	  <td align="right" style="font-size:12px;"><?php echo floatval($r['col_8']); ?>&nbsp;
	  <?php if($r['col_8']>0){ echo '<script>CalT('.$r['col_8'].',8);</script>'; } ?></td>
	  <td align="right" style="font-size:12px;"><?php echo floatval($r['col_9']); ?>&nbsp;
	  <?php if($r['col_9']>0){ echo '<script>CalT('.$r['col_9'].',9);</script>'; } ?></td>
	  <td align="right" style="font-size:12px;"><?php echo floatval($r['col_10']); ?>&nbsp;
	  <?php if($r['col_10']>0){ echo '<script>CalT('.$r['col_10'].',10);</script>'; } ?></td>
	  <td align="right" style="font-size:12px;"><?php echo floatval($r['col_11']); ?>&nbsp;
	  <?php if($r['col_11']>0){ echo '<script>CalT('.$r['col_11'].',11);</script>'; } ?></td>
	  <td align="right" style="font-size:12px;"><?php echo floatval($r['col_12']); ?>&nbsp;
	  <?php if($r['col_12']>0){ echo '<script>CalT('.$r['col_12'].',12);</script>'; } ?></td>
	  <td align="right" style="font-size:12px;"><?php echo floatval($r['col_1']); ?>&nbsp;
	  <?php if($r['col_1']>0){ echo '<script>CalT('.$r['col_1'].',1);</script>'; } ?></td>
	  <td align="right" style="font-size:12px;"><?php echo floatval($r['col_2']); ?>&nbsp;
	  <?php if($r['col_2']>0){ echo '<script>CalT('.$r['col_2'].',2);</script>'; } ?></td>
	  <td align="right" style="font-size:12px;"><?php echo floatval($r['col_3']); ?>&nbsp;
	  <?php if($r['col_3']>0){ echo '<script>CalT('.$r['col_3'].',3);</script>'; } ?></td>
	  <?php $Fill=$r['col_4']+$r['col_5']+$r['col_6']+$r['col_7']+$r['col_8']+$r['col_9']+$r['col_10']+$r['col_11']+$r['col_12']+$r['col_1']+$r['col_2']+$r['col_3']; ?>
	  <td align="right" style="font-size:12px; background-color:#FFFF9B;"><b><?php echo $Fill; ?></b>&nbsp;
	  <?php if($Fill>0){ echo "<script>CalT(".$Fill.",'All');</script>"; } ?></td>
     </tr>
	</tbody>
	</div>
<?php $Sn++; } //while ?>	 
<?php  } //if($_REQUEST['resltOpen']=='yny') ?>	 
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
