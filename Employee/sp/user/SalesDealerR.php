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
.InputB{font-size:13px;width:60px;text-align:right;border:0px;font-weight:bold;background-color:#D9D9FF;} 
.Input{font-size:13px;width:60px;text-align:right;border:0px;background-color:#EEEEEE;}
.TInput{font-size:13px;width:60px;text-align:right;border:0px;background-color:#FFFFA6;font-weight:bold;}
.Trh60{text-align:center;width:60px;font-weight:bold;}
.inner_table { height:450px;overflow-y:auto;width:auto; }
</style>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<Script type="text/javascript">window.history.forward(1);</Script>
<Script language="javascript">
function ClickCoutry(v)
{ 
  var State=0; var Hq=0;
  window.location="SalesDealerR.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&c="+v+"&s="+State+"&hq="+Hq; 
}
function ClickState(v)
{
  var Coutry=document.getElementById("Coutry").value; var Hq=0; 
  window.location="SalesDealerR.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&c="+Coutry+"&s="+v+"&hq="+Hq; 
}
function ClickHq(v)
{
  var Coutry=document.getElementById("Coutry").value; var State=document.getElementById("State").value;
  window.location="SalesDealerR.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&c="+Coutry+"&s="+State+"&hq="+v;
}

function ExportHq(v){ window.open("ReportCSVHqDealer.php?action=HqDealExport&value="+v+"&t=hq","P","menubar=no,scrollbars=no,resizable=no,directories=no,width=20,height=20");}
function ExportSt(v){ window.open("ReportCSVHqDealer.php?action=HqDealExport&value="+v+"&t=s","P","menubar=no,scrollbars=no,resizable=no,directories=no,width=20,height=20");}
function ExportCo(v){ window.open("ReportCSVHqDealer.php?action=HqDealExport&value="+v+"&t=c","P","menubar=no,scrollbars=no,resizable=no,directories=no,width=20,height=20");} 

function ExportCoOnly(v){ window.open("ReportCSVHqDealer.php?action=CoOnlyDealExport&value="+v,"P","menubar=no,scrollbars=no,resizable=no,directories=no,width=20,height=20");} 
 
</Script>
</head>
<body class="body">
<table class="table">
<tr>
 <td>
  <table class="menutable"><tr><td><?php if($_SESSION['login'] = true){ require_once("EMenu.php"); } ?></td></tr></table>
 </td>
</tr>
<tr>
 <td valign="top">
  <table style="margin-top:0px;" border="0">
    <tr>
	  <td valign="top"><?php if($_SESSION['login'] = true){ require_once("EWelcome.php"); } ?></td>
	</tr>
	 <tr>
	  <td valign="top" id="MainWindow"><br>
<?php //****************************************************************************************?>
<?php //***************START*****START*****START******START******START********************************?>
<?php //***************************************************************************************?>
<input type="hidden" id="ComId" value="<?php echo $_REQUEST['ci']; ?>" />
<input type="hidden" id="UserId" value="<?php echo $UserId; ?>" />
<input type="hidden" id="YId" value="<?php echo $YearId; ?>" />			  
<table border="0" style="margin-top:0px;height:150px;">	
<tr>
 <td valign="top">
  <table border="0">
   <tr>
    <td id="Entry" style="width:800px;" valign="top">
	<span id="TabEntry">
     <table border="0">
	  <tr>
	    <td style="margin-top:0px;width:200px;" class="heading" align="center"><u>Distributors List</u></td>
	    <td style="font-size:11px;height:18px;width:90px;color:#E6E6E6;" align="right"><b>Country :</b></td>
	    <td><select style="font-size:12px;width:120px;height:20px;background-color:#DDFFBB;" name="Coutry" id="Coutry" onChange="ClickCoutry(this.value)"> 
<?php if($_REQUEST['c']>0){ $sqlC=mysql_query("SELECT CountryName FROM hrm_country where CountryId=".$_REQUEST['c'], $con); $resC=mysql_fetch_array($sqlC); ?>
<option value="<?php echo $_REQUEST['c']; ?>"><?php echo ucwords(strtolower($resC['CountryName'])); ?></option><?php }else{ ?><option value="">Select</option><?php } ?>		
<?php $SqlCountry=mysql_query("SELECT * FROM hrm_country order by CountryName ASC", $con); while($ResCountry=mysql_fetch_array($SqlCountry)) { ?>
<option value="<?php echo $ResCountry['CountryId']; ?>"><?php echo ucwords(strtolower($ResCountry['CountryName'])); ?></option><?php } ?></select>
       </td>
	   <td>&nbsp;</td>
	   <td style="font-size:11px;height:18px;width:80px;color:#E6E6E6;" align="right"><b>State :</b></td>
	    <td>
		 <span id="StateSpan">
		 <select style="font-size:12px;width:180px;height:20px;background-color:#DDFFBB;" name="State" id="State" onChange="ClickState(this.value)">
<?php if($_REQUEST['s']>0){ $sqlS=mysql_query("SELECT StateName FROM hrm_state where StateId=".$_REQUEST['s'], $con); $resS=mysql_fetch_array($sqlS); ?>
<option value="<?php echo $_REQUEST['s']; ?>"><?php echo ucwords(strtolower($resS['StateName'])); ?></option><?php }else{ ?><option value="">Select</option><?php } ?>
<?php if($_REQUEST['c']>0){ $sqlS2 = mysql_query("SELECT * FROM hrm_state where CountryId=".$_REQUEST['c']." order by StateName ASC", $con); while($resS2 = mysql_fetch_array($sqlS2)){ ?><option value="<?php echo $resS2['StateId']; ?>"><?php echo ucwords(strtolower($resS2['StateName'])); ?></option><?php } ?>	
<?php } else{$sql = mysql_query("SELECT * FROM hrm_state order by StateName ASC", $con); while($res = mysql_fetch_array($sql)){ ?>
        <option value="<?php echo $res['StateId']; ?>"><?php echo ucwords(strtolower($res['StateName'])); ?></option><?php } } ?></select>
		 </span>
		</td>
		<td>&nbsp;</td>
		<td style="font-size:11px; height:18px;width:80px;color:#E6E6E6;" align="right"><b>HQ :</b></td>
	     <td>
		 <span id="HqSpan">
		 <select style="font-size:12px;width:120px;height:20px;background-color:#DDFFBB;" name="Hq" id="Hq" onChange="ClickHq(this.value)">
<?php if($_REQUEST['hq']>0){ $sqlhq=mysql_query("SELECT HqName FROM hrm_headquater where HqId=".$_REQUEST['hq'], $con); $reshq=mysql_fetch_array($sqlhq); ?>
<option value="<?php echo $_REQUEST['hq']; ?>"><?php echo ucwords(strtolower($reshq['HqName'])); ?></option><?php }else{ ?><option value="">Select</option><?php } ?>
<?php if($_REQUEST['s']>0){ $sqlhq2 = mysql_query("SELECT DISTINCT hrm_sales_dealer.HqId,HqName FROM hrm_sales_dealer INNER JOIN hrm_headquater ON hrm_sales_dealer.HqId=hrm_headquater.HqId where hrm_headquater.StateId=".$_REQUEST['s']." AND hrm_headquater.CompanyId=".$CompanyId." AND hrm_headquater.HQStatus='A' order by hrm_headquater.HqName ASC", $con); while($reshq2 = mysql_fetch_array($sqlhq2)){ ?><option value="<?php echo $reshq2['HqId']; ?>"><?php echo ucwords(strtolower($reshq2['HqName'])); ?></option><?php } ?>
<?php }else { $sql = mysql_query("SELECT * FROM hrm_headquater where CompanyId=".$CompanyId." AND HQStatus='A' order by HqName ASC", $con); while($res = mysql_fetch_array($sql)){ ?><option value="<?php echo $res['HqId']; ?>"><?php echo ucwords(strtolower($res['HqName'])); ?></option><?php } } ?></select>
		 </span>
		 </td>
		 <td>&nbsp;</td>
	  </tr>
	   </table>
      </td>
   </tr>
  </table>
  </td>
  </tr>
  <tr>
    <td colspan="10" valign="top">
<table border="1" cellpadding="0" cellspacing="0" style="font-family:Times New Roman;font-size:14px;vertical-align:top; width:100%;">	
   
   <tr style="background-color:#D9F28C;color:#000000;height:26px;"> 
   <?php if($_REQUEST['hq']>0){ $sqlhq=mysql_query("SELECT HqName FROM hrm_headquater where HqId=".$_REQUEST['hq'], $con); $reshq=mysql_fetch_array($sqlhq); ?> <td colspan="12">&nbsp;&nbsp;<b>HeadQuarter:&nbsp;<?php echo ucwords(strtolower($reshq['HqName'])); ?></b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   <a href="#" onClick="ExportHq(<?php echo $_REQUEST['hq']; ?>)" style="color:#3D7900;font-size:14px;text-decoration:none;"><font color="#FF0F0F"><b><u>Export Excel-Complite Details</u></b></font></a></td>
   <?php } elseif($_REQUEST['s']>0){ $sqlS=mysql_query("SELECT StateName FROM hrm_state where StateId=".$_REQUEST['s'], $con); $resS=mysql_fetch_array($sqlS);?><td colspan="13">&nbsp;&nbsp;<b>State:&nbsp;<?php echo ucwords(strtolower($resS['StateName'])); ?></b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   <a href="#" onClick="ExportSt(<?php echo $_REQUEST['s']; ?>)" style="color:#3D7900;font-size:14px;text-decoration:none;"><font color="#FF0F0F"><b><u>Export Excel-Complite Details</u></b></font></a></td>
   <?php } elseif($_REQUEST['c']>0){ $sqlC=mysql_query("SELECT CountryName FROM hrm_country where CountryId=".$_REQUEST['c'], $con); $resC=mysql_fetch_array($sqlC); ?> 
    <td colspan="14">&nbsp;&nbsp;<b>Country:&nbsp;<?php echo ucwords(strtolower($resC['CountryName'])); ?></b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   <a href="#" onClick="ExportCo(<?php echo $_REQUEST['c']; ?>)" style="color:#3D7900;font-size:14px;text-decoration:none;"><font color="#FF0F0F"><b><u>Export Excel-Complite Details</u></b></font></a>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   <a href="#" onClick="ExportCoOnly(<?php echo $_REQUEST['c']; ?>)" style="color:#3D7900;font-size:14px;text-decoration:none;"><font color="#FF0F0F"><b><u>Export Excel Sales Team</u></b></font></a>

</td>
   <?php } ?>
   				
  </tr>	
  
   <tr style="background-color:#D5F1D1;color:#000000;"> 
    <td align="center" style="width:50px;"><b>Sn</b></td>
	<td align="center" style="width:245px;"><b>Dealer</b></td>
	<td align="center" style="width:50px;"><b>ID</b></td>
	<td align="center" style="width:178px;"><b>Dealer City</b></td>
	<td align="center" style="width:150px;"><b>HQ VC</b></td>
	<td align="center" style="width:200px;"><b>Territory VC</b></td>
	<td align="center" style="width:150px;"><b>HQ FC</b></td>
	<td align="center" style="width:200px;"><b>Territory FC</b></td>
	<td align="center" style="width:50px;"><b>Sts</b></td>	
  </tr>
  <tr>
  <td colspan="9">
  <div class="inner_table">
 <table border="1" cellpadding="0" cellspacing="0" style="font-family:Times New Roman;font-size:14px;vertical-align:top; width:100%;">
<?php if($_REQUEST['hq']>0){ $sqlDeal=mysql_query("select * from hrm_sales_dealer where HqId=".$_REQUEST['value']." group by DealerId order by DealerName ASC",$con); } 
elseif($_REQUEST['s']>0){ $sqlDeal=mysql_query("select * from hrm_sales_dealer d inner join hrm_headquater hq on d.HqId=hq.HqId where hq.StateId=".$_REQUEST['s']." group by DealerId order by DealerName ASC",$con); }
elseif($_REQUEST['c']>0){ $sqlDeal=mysql_query("select * from hrm_sales_dealer d inner join hrm_headquater hq on d.HqId=hq.HqId inner join hrm_state s on hq.StateId=s.StateId where s.CountryId=".$_REQUEST['c']." group by DealerId order by DealerName ASC",$con); }
$sn=1; $rowDeal=mysql_num_rows($sqlDeal); if($rowDeal>0){ while($resDeal=mysql_fetch_assoc($sqlDeal)){ ?>
 <tr bgcolor="#EEEEEE" style="height:22px;background-color:<?php if($i==1){echo '#E2F3D8'; }?>;"> 
     <td align="center" style="width:50px;"><?php echo $sn; ?></td>		 
     <td style="width:250px;">&nbsp;<?php echo $resDeal['DealerName']; ?></td>
	 <td align="center" style="width:50px;"><?php echo $resDeal['DealerId']; ?></td>
	 <td style="width:180px;">&nbsp;<?php echo $resDeal['DealerCity']; ?></td>
<?php
$sHqvc = mysql_query("SELECT HqName FROM hrm_headquater where HqId=".$resDeal['Hq_vc'],$con); 
$sHqfc = mysql_query("SELECT HqName FROM hrm_headquater where HqId=".$resDeal['Hq_fc'],$con); 
$rHqvc=mysql_fetch_assoc($sHqvc); $rHqfc=mysql_fetch_assoc($sHqfc);

$sTrvc = mysql_query("SELECT Fname,Sname,Lname FROM hrm_employee where EmployeeID=".$resDeal['Terr_vc'],$con);
$sTrfc = mysql_query("SELECT Fname,Sname,Lname FROM hrm_employee where EmployeeID=".$resDeal['Terr_fc'],$con); 
$rTrvc=mysql_fetch_assoc($sTrvc); $TrrVc=$rTrvc['Fname'].' '.$rTrvc['Sname'].' '.$rTrvc['Lname'];
$rTrfc=mysql_fetch_assoc($sTrfc); $TrrFc=$rTrfc['Fname'].' '.$rTrfc['Sname'].' '.$rTrfc['Lname'];
?>	 
	 <td style="width:150px;">&nbsp;<?php echo ucwords(strtolower($rHqvc['HqName'])); ?></td>
	 <td style="width:200px;">&nbsp;<?php echo ucwords(strtolower($TrrVc)); ?></td>
	 <td style="width:150px;">&nbsp;<?php echo ucwords(strtolower($rHqfc['HqName'])); ?></td>
	 <td style="width:200px;">&nbsp;<?php echo ucwords(strtolower($TrrFc)); ?></td> 
	 <td align="center" style="width:50px;"><?php echo $resDeal['DealerSts']; ?></td>
 </tr>
<?php $sn++;} } else{echo '<tr bgcolor="#FFFFFF"><td colspan="2" style="color:#FF8000;font-size:14px;font-weight:bold;">&nbsp;Records Not Available..</td></tr>';} ?> 
</table>
</div>
</td>
</tr>  	  
</table>	  
    </td>
   </tr> 	
  </table>
 </td>
</tr>
</table>
		
<?php //********************************************************************************?>
<?php //*********************END*****END*****END******END******END*************************?>
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
