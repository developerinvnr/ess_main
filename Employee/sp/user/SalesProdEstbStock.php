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
.Trh60{text-align:center;width:60px;font-weight:bold;}.textData{width:80px;height:22px;background-color:#EDEBD6;border:hidden;text-align:right;}
.field{width:80px;text-align:center; font-weight:bold;}
</style>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<Script type="text/javascript">window.history.forward(1);</Script>
<Script language="javascript">
function ClickCoutry(value)
{ var url = 'SlctSalesCouStaCit.php';	var pars = 'CouId='+value;	var myAjax = new Ajax.Request(
  url, { method: 'post', parameters: pars, onComplete: show_State });
}
function show_State(originalRequest)
{ document.getElementById('StateSpan').innerHTML = originalRequest.responseText; }

function ClickState(value)
{ var CId=document.getElementById('ComId').value; var url = 'SlctSalesCouStaCit.php';	var pars = 'AchiveStaId='+value+'&CId='+CId;	var myAjax = new Ajax.Request(
  url, { method: 'post', parameters: pars, onComplete: show_Hq });
}
function show_Hq(originalRequest)
{ document.getElementById('HqSpan').innerHTML = originalRequest.responseText;}

function ClickHq(value)
{ var url = 'SlctSalesCouStaCit.php';	var pars = 'AchiveHqId='+value;	var myAjax = new Ajax.Request(
  url, { method: 'post', parameters: pars, onComplete: show_Dealer });
}
function show_Dealer(originalRequest)
{ document.getElementById('TabResult').innerHTML = originalRequest.responseText;}

function ChangrYear(YearV)
{ var c=document.getElementById("Coutry").value;
  var CropGrp=document.getElementById("CropGrp").value; var ii=document.getElementById("ItemV").value; var ci=document.getElementById("ComId").value;
  window.location="SalesProdEstbStock.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y="+YearV+"&ci="+ci+"&grp="+CropGrp+"&ii="+ii+"&c="+c; 
}
function ClickGrp(CropGrp)
{ var c=document.getElementById("Coutry").value;
  var YearV=document.getElementById("YearV").value; var ii=0; var ci=document.getElementById("ComId").value;
  window.location="SalesProdEstbStock.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y="+YearV+"&ci="+ci+"&grp="+CropGrp+"&ii="+ii+"&c="+c; 
}
function ChangeII(ii)
{ var c=document.getElementById("Coutry").value;
  var YearV=document.getElementById("YearV").value; var CropGrp=document.getElementById("CropGrp").value; var ci=document.getElementById("ComId").value;
  window.location="SalesProdEstbStock.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y="+YearV+"&ci="+ci+"&grp="+CropGrp+"&ii="+ii+"&c="+c; 
}

/*
function editD(s)
{ document.getElementById("EditBtn_"+s).style.display='none'; document.getElementById("SaveBtn_"+s).style.display='block';
  var Mn=document.getElementById("MonthN").value;
  document.getElementById("Apr_"+s).readOnly=false; document.getElementById("Apr_"+s).style.background='#FFFFFF';
  document.getElementById("May_"+s).readOnly=false; document.getElementById("May_"+s).style.background='#FFFFFF';
  document.getElementById("Jun_"+s).readOnly=false; document.getElementById("Jun_"+s).style.background='#FFFFFF';
  document.getElementById("Jul_"+s).readOnly=false; document.getElementById("Jul_"+s).style.background='#FFFFFF';
  document.getElementById("Aug_"+s).readOnly=false; document.getElementById("Aug_"+s).style.background='#FFFFFF';
  document.getElementById("Sep_"+s).readOnly=false; document.getElementById("Sep_"+s).style.background='#FFFFFF';
  document.getElementById("Oct_"+s).readOnly=false; document.getElementById("Oct_"+s).style.background='#FFFFFF';
  document.getElementById("Nov_"+s).readOnly=false; document.getElementById("Nov_"+s).style.background='#FFFFFF';
  document.getElementById("Dec_"+s).readOnly=false; document.getElementById("Dec_"+s).style.background='#FFFFFF';
  document.getElementById("Jan_"+s).readOnly=false; document.getElementById("Jan_"+s).style.background='#FFFFFF';
  document.getElementById("Feb_"+s).readOnly=false; document.getElementById("Feb_"+s).style.background='#FFFFFF';
  document.getElementById("Mar_"+s).readOnly=false; document.getElementById("Mar_"+s).style.background='#FFFFFF';  
  document.getElementById("TD_"+s).style.background='#DDDDEE';
}
function saveD(s,y,p,c)
{ 
 var url = 'PAStockAct.php'; var pars = 'action=ActualStack&s='+s+'&y='+y+'&p='+p+'&c='+c+'&Apr='+document.getElementById("Apr_"+s).value+'&May='+document.getElementById("May_"+s).value+'&Jun='+document.getElementById("Jun_"+s).value+'&Jul='+document.getElementById("Jul_"+s).value+'&Aug='+document.getElementById("Aug_"+s).value+'&Sep='+document.getElementById("Sep_"+s).value+'&Oct='+document.getElementById("Oct_"+s).value+'&Nov='+document.getElementById("Nov_"+s).value+'&Dec='+document.getElementById("Dec_"+s).value+'&Jan='+document.getElementById("Jan_"+s).value+'&Feb='+document.getElementById("Feb_"+s).value+'&Mar='+document.getElementById("Mar_"+s).value;	
 
 var myAjax = new Ajax.Request(
	 url, { method: 'post', parameters: pars, onComplete: show_AStck });
}
function show_AStck(originalRequest)
{ document.getElementById('AStockSpan').innerHTML = originalRequest.responseText; var SMn=document.getElementById("StckSNo").value; 
  document.getElementById("EditBtn_"+SMn).style.display='block'; document.getElementById("SaveBtn_"+SMn).style.display='none'; 
  document.getElementById("Apr_"+SMn).readOnly=false; document.getElementById("Apr_"+SMn).style.background='#EDEBD6';
  document.getElementById("May_"+SMn).readOnly=false; document.getElementById("May_"+SMn).style.background='#EDEBD6';
  document.getElementById("Jun_"+SMn).readOnly=false; document.getElementById("Jun_"+SMn).style.background='#EDEBD6';
  document.getElementById("Jul_"+SMn).readOnly=false; document.getElementById("Jul_"+SMn).style.background='#EDEBD6';
  document.getElementById("Aug_"+SMn).readOnly=false; document.getElementById("Aug_"+SMn).style.background='#EDEBD6';
  document.getElementById("Sep_"+SMn).readOnly=false; document.getElementById("Sep_"+SMn).style.background='#EDEBD6';
  document.getElementById("Oct_"+SMn).readOnly=false; document.getElementById("Oct_"+SMn).style.background='#EDEBD6';
  document.getElementById("Nov_"+SMn).readOnly=false; document.getElementById("Nov_"+SMn).style.background='#EDEBD6';
  document.getElementById("Dec_"+SMn).readOnly=false; document.getElementById("Dec_"+SMn).style.background='#EDEBD6';
  document.getElementById("Jan_"+SMn).readOnly=false; document.getElementById("Jan_"+SMn).style.background='#EDEBD6';
  document.getElementById("Feb_"+SMn).readOnly=false; document.getElementById("Feb_"+SMn).style.background='#EDEBD6';
  document.getElementById("Mar_"+SMn).readOnly=false; document.getElementById("Mar_"+SMn).style.background='#EDEBD6';
  document.getElementById("TD_"+SMn).style.background='#FFFFFF';
}

*/
</Script>
</head>
<body class="body">
<input type="hidden" id="MonthN" value="<?php date("m"); ?>" />
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
	  <td valign="top" align="center"  width="100%" id="MainWindow"><br>
<?php //************************************************************************************************************************************************************?>
<?php //**********************************************START*****START*****START******START******START***************************************************************?>
<?php //************************************************************************************************************************************************************?>
<input type="hidden" id="ComId" value="<?php echo $_REQUEST['ci']; ?>" />
<input type="hidden" id="UserId" value="<?php echo $UserId; ?>" />		  
<table border="0" style="margin-top:0px; width:100%; height:150px;">	
<tr>
 <td valign="top">
  <table border="0">
   <tr>
    <td id="Entry" valign="top" style="width:900px;">
	<span id="TabEntry">
     <table border="0">
      <tr>
	    <td rowspan="2" style="margin-top:0px;width:300px;" class="heading" align="center"><u>Estimate Product Stock</u> (Before Plan )</td>
	    <td style="font-size:11px;height:18px;width:90px;color:#E6E6E6;" align="right"><b>Year :</b></td>
	    <td><select style="font-size:12px;width:120px;height:20px;background-color:#DDFFBB;" name="YearV" id="YearV" onChange="ChangrYear(this.value)"> 
<?php $sqly=mysql_query("select FromDate,ToDate from hrm_year where YearId=".$_REQUEST['y'], $con); $resy=mysql_fetch_assoc($sqly); 
      $fromdate=date("Y",strtotime($resy['FromDate'])); $todate=date("Y",strtotime($resy['ToDate'])); 
	  $NextYear=$_REQUEST['y']+1; $PrevYear=$_REQUEST['y']-1; 
	  $sqly2=mysql_query("select FromDate,ToDate from hrm_year where YearId=".$NextYear, $con); $resy2=mysql_fetch_assoc($sqly2);
	  $sqly3=mysql_query("select FromDate,ToDate from hrm_year where YearId=".$PrevYear, $con); $resy3=mysql_fetch_assoc($sqly3); ?>		
 <option value="<?php echo $_REQUEST['y']; ?>" selected><?php echo $fromdate.'-'.$todate; ?></option>
 <?php if($PrevYear>=1){?><option value="<?php echo $PrevYear; ?>"><?php echo date("Y",strtotime($resy3['FromDate'])).'-'.date("Y",strtotime($resy3['ToDate'])); ?></option><?php } ?><option value="<?php echo $NextYear; ?>"><?php echo date("Y",strtotime($resy2['FromDate'])).'-'.date("Y",strtotime($resy2['ToDate'])); ?></option></select>
       </td>
	   <td>&nbsp;</td>
	   <td style="font-size:11px;height:18px;width:80px;color:#E6E6E6;" align="right"><b>Crop :</b></td>
	    <td><select style="font-size:12px;width:180px;height:20px;background-color:#DDFFBB;" name="CropGrp" id="CropGrp" onChange="ClickGrp(this.value)">
<?php if($_REQUEST['grp']==0){ ?><option value="0" selected>SELECT CROP</option><option value="1">VEGETABLE CROP</option>
                                 <option value="2">FIELD CROP</option><option value="3">All CROP</option>		 
<?php }elseif($_REQUEST['grp']==1){ ?><option value="1" selected>VEGETABLE CROP</option><option value="2">FIELD CROP</option><option value="3">All CROP</option>
<?php }elseif($_REQUEST['grp']==2){ ?><option value="2" selected>FIELD CROP</option><option value="1">VEGETABLE CROP</option><option value="3">All CROP</option>
<?php }elseif($_REQUEST['grp']==3){ ?><option value="3" selected>All CROP</option><option value="1">VEGETABLE CROP</option><option value="2">FIELD CROP</option><?php } ?>
        </select>
		</td>
		<td>&nbsp;</td>
		<td style="font-size:11px;height:18px;width:80px;color:#E6E6E6;" align="right"><b>Name :</b></td>
	    <td><select style="font-size:12px;width:120px;height:20px;background-color:#DDFFBB;" name="ItemV" id="ItemV" onChange="ChangeII(this.value)">
<?php if($_REQUEST['ii']>0){ $sqlI=mysql_query("select ItemName from hrm_sales_seedsitem where ItemId=".$_REQUEST['ii'], $con); $resI=mysql_fetch_assoc($sqlI); ?>	
         <option value="<?php echo $_REQUEST['ii']; ?>" selected><?php echo strtoupper($resI['ItemName']); ?></option>
		 <?php }else{ ?><option value="0" selected>SELECT</option><?php } ?>
<?php if($_REQUEST['grp']==0){ $sqlItem=mysql_query("select * from hrm_sales_seedsitem order by ItemName ASC", $con);}
      elseif($_REQUEST['grp']==1){ $sqlItem=mysql_query("select * from hrm_sales_seedsitem where GroupId=1 order by ItemName ASC", $con);}
      elseif($_REQUEST['grp']==2){ $sqlItem=mysql_query("select * from hrm_sales_seedsitem where GroupId=2 order by ItemName ASC", $con);}
      elseif($_REQUEST['grp']==3){ $sqlItem=mysql_query("select * from hrm_sales_seedsitem where (GroupId=1 OR GroupId=2) order by GroupId ASC,ItemName ASC", $con);}
	  while($resItem=mysql_fetch_assoc($sqlItem)){ ?><option value="<?php echo $resItem['ItemId']; ?>"><?php echo $resItem['ItemName']; ?></option><?php } ?></select>	  
		 </td>
		 <?php /*
		 <td>&nbsp;</td>
		 <td style="font-size:11px; height:18px;width:80px;color:#E6E6E6;" align="center"><a href="#" <?php //onClick="PrintSpR()" ?> style="color:#FFCE9D;"><b>PRINT</b></a></td>
		 */ ?>
	  </tr>
      <tr>
	    <td style="font-size:11px;height:18px;width:90px;color:#E6E6E6;" align="right"><b>Country :</b></td>
	    <td><select style="font-size:12px;width:120px;height:20px;background-color:#DDFFBB;" name="Coutry" id="Coutry" onChange="ClickCoutry(this.value)"> 
<?php if($_REQUEST['c']>0){ $sqlC=mysql_query("SELECT CountryName FROM hrm_country where CountryId=".$_REQUEST['c'], $con); $resC=mysql_fetch_array($sqlC); ?>
<option value="<?php echo $_REQUEST['c']; ?>"><?php echo strtoupper($resC['CountryName']); ?></option><?php }else{ ?><option value="">SELECT</option><?php } ?>		
<?php $SqlCountry=mysql_query("SELECT * FROM hrm_country order by CountryName ASC", $con); while($ResCountry=mysql_fetch_array($SqlCountry)) { ?>
<option value="<?php echo $ResCountry['CountryId']; ?>"><?php echo strtoupper($ResCountry['CountryName']); ?></option><?php } ?></select>
       </td>
	   <?php /*
	   <td>&nbsp;</td>
	   <td style="font-size:11px;height:18px;width:80px;color:#E6E6E6;" align="right"><b>State :</b></td>
	    <td><span id="StateSpan">
		 <select style="font-size:12px;width:180px;height:20px;background-color:#DDFFBB;" name="State" id="State" onChange="ClickState(this.value)">
<?php if($_REQUEST['s']>0){ $sqlS=mysql_query("SELECT StateName FROM hrm_state where StateId=".$_REQUEST['s'], $con); $resS=mysql_fetch_array($sqlS); ?>
<option value="<?php echo $_REQUEST['s']; ?>"><?php echo strtoupper($resS['StateName']); ?></option><?php }else{ ?><option value="">SELECT</option><?php } ?>		
        <?php $sql = mysql_query("SELECT * FROM hrm_state order by StateName ASC", $con); while($res = mysql_fetch_array($sql)){ ?>
        <option value="<?php echo $res['StateId']; ?>"><?php echo strtoupper($res['StateName']); ?></option><?php } ?></select>
		 </span>
		</td>
		<td>&nbsp;</td>
		<td style="font-size:11px;height:18px;width:80px;color:#E6E6E6;" align="right"><b>HQ :</b></td>
	    <td><span id="HqSpan">
		 <select style="font-size:12px;width:120px;height:20px;background-color:#DDFFBB;" name="Hq" id="Hq" onChange="ClickHq(this.value)">
<?php if($_REQUEST['hq']>0){ $sqlhq=mysql_query("SELECT HqName FROM hrm_headquater where HqId=".$_REQUEST['hq'], $con); $reshq=mysql_fetch_array($sqlhq); ?>
<option value="<?php echo $_REQUEST['hq']; ?>"><?php echo strtoupper($reshq['HqName']); ?></option><?php }else{ ?><option value="">SELECT</option><?php } ?>
<?php $sql = mysql_query("SELECT * FROM hrm_headquater where CompanyId=".$CompanyId." AND HQStatus='A' order by HqName ASC", $con); while($res = mysql_fetch_array($sql)){ ?>
         <option value="<?php echo $res['HqId']; ?>"><?php echo strtoupper($res['HqName']); ?></option><?php } ?></select>
		 </span>	  
		 </td>
		 
		 <?php */ /*
		<td>&nbsp;</td>
		 <td style="font-size:11px; height:18px;width:80px;color:#E6E6E6;" align="right"><b>Dealer :</b></td>
		 <td><input type="hidden" id="DealerId" value="" /><input type="hidden" id="TotAValueM" value="" /><input type="hidden" id="Sno" value="" />
		     <input type="hidden" name="q" id="q" value="<?php echo $_REQUEST['q']; ?>" /><input type="hidden" id="ii" value="<?php echo $_REQUEST['ii']; ?>" />
		  <span id="TabResult">
<select style="font-size:12px;width:250px;height:20px;background-color:#DDFFBB;" name="DealerD" id="DealerD" onChange="ClickDealer(this.value)" <?php if($_REQUEST['dil']==0){echo '';} ?>><?php if($_REQUEST['dil']>0){ $sqldil=mysql_query("SELECT DealerName,DealerCity FROM hrm_sales_dealer where DealerId=".$_REQUEST['dil'], $con); $resdil=mysql_fetch_array($sqldil); ?><option value="<?php echo $_REQUEST['dil']; ?>"><?php echo strtoupper($resdil['DealerName'].'-'.$resdil['DealerCity']); ?></option><?php }else{ ?><option value="">SELECT</option><?php } ?>
<?php if($_REQUEST['hq']>0){ $sql=mysql_query("SELECT DealerId,DealerName,DealerCity FROM hrm_sales_dealer where HqId=".$_REQUEST['hq'], $con); while($res=mysql_fetch_array($sql)){ ?><option value="<?php echo $res['DealerId']; ?>"><?php echo strtoupper($res['DealerName'].'-'.$res['DealerCity']); ?></option><?php } } else{ $sql = mysql_query("SELECT * FROM hrm_sales_dealer order by DealerName ASC", $con); while($res = mysql_fetch_array($sql)){ ?><option value="<?php echo $res['DealerId']; ?>"><?php echo $res['DealerName'].'-'.strtoupper($res['DealerCity']); ?></option><?php } } ?></select>
	      </span>
		 </td>
		 */ ?>
	  </tr>
	  
	  
	  
	
	   </table>
      </td>
   </tr>
  </table>
  </td>
  </tr>
  <tr>
    <td colspan="3" valign="top">
<?php if($_REQUEST['ii']>0 OR $_REQUEST['grp']>0){ 
$BeforeYId2=$_REQUEST['y']-2; $BeforeYId=$_REQUEST['y']-1; $AfterYId=$_REQUEST['y']+1; $AfterYId2=$_REQUEST['y']+2; 	
$sqlY1=mysql_query("select FromDate,ToDate from hrm_sales_year where YearId=".$BeforeYId2, $con); $resY1=mysql_fetch_assoc($sqlY1); 
$sqlY2=mysql_query("select FromDate,ToDate from hrm_sales_year where YearId=".$BeforeYId, $con); $resY2=mysql_fetch_assoc($sqlY2); 
$sqlY3=mysql_query("select FromDate,ToDate from hrm_sales_year where YearId=".$_REQUEST['y'], $con); $resY3=mysql_fetch_assoc($sqlY3); 
$sqlY4=mysql_query("select FromDate,ToDate from hrm_sales_year where YearId=".$AfterYId, $con); $resY4=mysql_fetch_assoc($sqlY4);
$sqlY5=mysql_query("select FromDate,ToDate from hrm_sales_year where YearId=".$AfterYId2, $con); $resY5=mysql_fetch_assoc($sqlY5);
$y1=date("y",strtotime($resY1['FromDate'])).'-'.date("y",strtotime($resY1['ToDate'])); $y1T='<font color="#A60053">Ach.</font>';
$y2=date("y",strtotime($resY2['FromDate'])).'-'.date("y",strtotime($resY2['ToDate'])); $y2T='<font color="#A60053">Ach.</font>';
$y3=date("y",strtotime($resY3['FromDate'])).'-'.date("y",strtotime($resY3['ToDate'])); $y3T='<font color="#A60053">Tgt.</font>';
$y4=date("y",strtotime($resY4['FromDate'])).'-'.date("y",strtotime($resY4['ToDate'])); $y4T='<font color="#A60053">Proj.</font>';
$y5=date("y",strtotime($resY5['FromDate'])).'-'.date("y",strtotime($resY5['ToDate'])); $y5T='<font color="#A60053">YTD.</font>';
$my1='<font color="#A60053">'.date("y",strtotime($resY3['FromDate'])).'</font>'; $my2='<font color="#A60053">'.date("y",strtotime($resY3['ToDate'])).'</font>';
?>  
<table border="1" cellpadding="0" cellspacing="0" style="font-family:Times New Roman;font-size:14px;width:<?php if($_REQUEST['ii']==0){echo 4650;}else{echo 4530;}?>; vertical-align:top;">	
  <tr style="background-color:#D5F1D1;color:#000000;">  
    <td colspan="<?php if($_REQUEST['ii']>0){ echo 2;}else{echo 3;}?>" align="center"><b>Details</b>&nbsp;<b>Month(Year:<?php echo $y3; ?>)</b></td>
	<td colspan="3" align="center"><b>APR-<?php echo $my1;?></b></td><td colspan="3" align="center"><b>MAY-<?php echo $my1;?></b></td><td colspan="3" align="center"><b>JUN-<?php echo $my1;?></b></td><td colspan="3" align="center"><b>JUL-<?php echo $my1;?></b></td><td colspan="3" align="center"><b>AUG-<?php echo $my1;?></b></td><td colspan="3" align="center"><b>SEP-<?php echo $my1;?></b></td><td colspan="3" align="center"><b>OCT-<?php echo $my1;?></b></td><td colspan="3" align="center"><b>NOV-<?php echo $my1;?></b></td><td colspan="3" align="center"><b>DEC-<?php echo $my1;?></b></td><td colspan="3" align="center"><b>JAN-<?php echo $my2;?></b></td><td colspan="3" align="center"><b>FEB-<?php echo $my2;?></b></td><td colspan="3" align="center"><b>MAR-<?php echo $my2;?></b></td><td colspan="3" align="center"><b>APR-<?php echo $my2;?></b></td><td colspan="3" align="center"><b>MAY-<?php echo $my2;?></b></td><td colspan="3" align="center"><b>JUN-<?php echo $my2;?></b></td><td colspan="3" align="center"><b>JUL-<?php echo $my2;?></b></td><td colspan="3" align="center"><b>AUG-<?php echo $my2;?></b></td><td colspan="3" align="center"><b>SEP-<?php echo $my2;?></b></td><td colspan="3" align="center"><b>OCT-<?php echo $my2;?></b></td><td colspan="3" align="center"><b>NOV-<?php echo $my2;?></b></td><td colspan="3" align="center"><b>DEC-<?php echo $my2;?></b></td>
 </tr>
   <tr style="background-color:#D5F1D1;color:#000000;">  
<?php if($_REQUEST['ii']==0){?><td align="center" style="width:120px;"><b>CROP</b></td><?php } ?>
	<td align="center" style="width:150px;"><b>VARIETY</b></td>
	<td align="center" style="width:50px;"><b>&nbsp;TYPE&nbsp;</b></td>
	<?php /*	<td align="center" style="width:50px;"><b>&nbsp;Edit&nbsp;</b></td> */ ?>
	
	<td class="field">Actual</td><td class="field">Estimate</td><td class="field">Require</td>
	<td class="field">Actual</td><td class="field">Estimate</td><td class="field">Require</td>
	<td class="field">Actual</td><td class="field">Estimate</td><td class="field">Require</td>
	<td class="field">Actual</td><td class="field">Estimate</td><td class="field">Require</td>
	<td class="field">Actual</td><td class="field">Estimate</td><td class="field">Require</td>
	<td class="field">Actual</td><td class="field">Estimate</td><td class="field">Require</td>
	<td class="field">Actual</td><td class="field">Estimate</td><td class="field">Require</td>
	<td class="field">Actual</td><td class="field">Estimate</td><td class="field">Require</td>
	<td class="field">Actual</td><td class="field">Estimate</td><td class="field">Require</td>
	<td class="field">Actual</td><td class="field">Estimate</td><td class="field">Require</td>
	<td class="field">Actual</td><td class="field">Estimate</td><td class="field">Require</td>
	<td class="field">Actual</td><td class="field">Estimate</td><td class="field">Require</td>
    <td class="field">Actual</td><td class="field">Estimate</td><td class="field">Require</td>
	<td class="field">Actual</td><td class="field">Estimate</td><td class="field">Require</td>
	<td class="field">Actual</td><td class="field">Estimate</td><td class="field">Require</td>
	<td class="field">Actual</td><td class="field">Estimate</td><td class="field">Require</td>
	<td class="field">Actual</td><td class="field">Estimate</td><td class="field">Require</td>
	<td class="field">Actual</td><td class="field">Estimate</td><td class="field">Require</td>
	<td class="field">Actual</td><td class="field">Estimate</td><td class="field">Require</td>
	<td class="field">Actual</td><td class="field">Estimate</td><td class="field">Require</td>
	<td class="field">Actual</td><td class="field">Estimate</td><td class="field">Require</td>
  </tr>	
 <?php if($_REQUEST['ii']>0){$sql = mysql_query("select hrm_sales_seedsproduct.ItemId,ProductId,ProductName,ItemName,TypeName from hrm_sales_seedsproduct INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId INNER JOIN hrm_sales_seedtype ON hrm_sales_seedsproduct.TypeId=hrm_sales_seedtype.TypeId where hrm_sales_seedsitem.ItemId=".$_REQUEST['ii']." order by ItemName ASC, TypeName ASC, ProductName ASC", $con); }
      else
	  { if($_REQUEST['grp']==1 OR $_REQUEST['grp']==2){$sql = mysql_query("select hrm_sales_seedsproduct.ItemId,ProductId,ProductName,ItemName,TypeName from hrm_sales_seedsproduct INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId INNER JOIN hrm_sales_seedtype ON hrm_sales_seedsproduct.TypeId=hrm_sales_seedtype.TypeId where hrm_sales_seedsitem.GroupId=".$_REQUEST['grp']." order by ItemName ASC, TypeName ASC, ProductName ASC", $con);} if($_REQUEST['grp']==3){$sql = mysql_query("select hrm_sales_seedsproduct.ItemId,ProductId,ProductName,ItemName,TypeName from hrm_sales_seedsproduct INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId INNER JOIN hrm_sales_seedtype ON hrm_sales_seedsproduct.TypeId=hrm_sales_seedtype.TypeId order by hrm_sales_seedsitem.GroupId ASC, ItemName ASC, TypeName ASC, ProductName ASC", $con); }
	  } 
	  if($_REQUEST['grp']==0){$sqlI=mysql_query("select GroupId from hrm_sales_seedsitem where ItemId=".$_REQUEST['ii'], $con); $resI=mysql_fetch_array($sqlI);
	  $sqlSe=mysql_query("select SeasonId from hrm_sales_season where GroupId=".$resI['GroupId'], $con); }
	  else{$sqlSe=mysql_query("select SeasonId from hrm_sales_season where GroupId=".$_REQUEST['grp'], $con);}
	  //$sqlSe=mysql_query("select SeasonId from hrm_sales_season where GroupId=1",$con); 
	  $rowSe=mysql_num_rows($sqlSe); $Sn=1; while($res=mysql_fetch_array($sql)){ ?>  
   <tr bgcolor="#FFFFFF" style="height:22px;background-color:#E2F3D8;">  
<?php if($_REQUEST['ii']==0){?><td bgcolor="<?php echo '#B8E29C';?>">&nbsp;<?php echo $res['ItemName']; ?></td><?php } ?> 
     <td bgcolor="<?php echo '#B8E29C';?>">&nbsp;<?php echo $res['ProductName']; ?></td>
     <td bgcolor="<?php echo '#B8E29C';?>" align="center">&nbsp;<?php echo substr_replace($res['TypeName'],'',2);?></td>
	 <?php /*
	 <td bgcolor="#FFFFFF" align="center" id="TD_<?php echo $Sn; ?>">
	  <img src="images/edit.png" border="0" alt="Edit" id="EditBtn_<?php echo $Sn; ?>" onClick="editD(<?php echo $Sn; ?>)" style="display:block;">
	  <img src="images/Floppy-Small-icon.png" border="0" alt="Save" id="SaveBtn_<?php echo $Sn; ?>" onClick="saveD(<?php echo $Sn.', '.$_REQUEST['y'].', '.$res['ProductId'].', '.$CompanyId; ?>)" style="display:none;"></td>  
	  */ ?>
<?php $sqlStckBef=mysql_query("select Mar from hrm_sales_product_stock_actual where ProductId=".$res['ProductId']." AND YearId=".$BeforeYId." AND CompanyId=".$CompanyId, $con);
      $sqlStck=mysql_query("select * from hrm_sales_product_stock_actual where ProductId=".$res['ProductId']." AND YearId=".$_REQUEST['y']." AND CompanyId=".$CompanyId, $con); 
	  $sqlReq=mysql_query("select SUM(M1) as tm1,SUM(M2) as tm2,SUM(M3) as tm3,SUM(M4) as tm4,SUM(M5) as tm5,SUM(M6) as tm6,SUM(M7) as tm7,SUM(M8) as tm8,SUM(M9) as tm9,SUM(M10) as tm10,SUM(M11) as tm11,SUM(M12) as tm12 from hrm_sales_sal_details_".$_REQUEST['y']." INNER JOIN hrm_sales_dealer ON hrm_sales_sal_details_".$_REQUEST['y'].".DealerId=hrm_sales_dealer.DealerId INNER JOIN hrm_headquater ON hrm_sales_dealer.HqId=hrm_headquater.HqId INNER JOIN hrm_state ON hrm_headquater.StateId=hrm_state.StateId INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details_".$_REQUEST['y'].".ProductId=hrm_sales_seedsproduct.ProductId where hrm_state.CountryId=".$_REQUEST['c']." AND hrm_sales_sal_details_".$_REQUEST['y'].".YearId=".$_REQUEST['y']." AND hrm_sales_seedsproduct.ProductId=".$res['ProductId'], $con);
	  $resStckBef=mysql_fetch_assoc($sqlStckBef); $resStck=mysql_fetch_assoc($sqlStck); $resReq=mysql_fetch_assoc($sqlReq);
	  $sqlStck2=mysql_query("select * from hrm_sales_product_stock_actual where ProductId=".$res['ProductId']." AND YearId=".$AfterYId." AND CompanyId=".$CompanyId, $con);
	  $sqlReq2=mysql_query("select SUM(M1) as tm1,SUM(M2) as tm2,SUM(M3) as tm3,SUM(M4) as tm4,SUM(M5) as tm5,SUM(M6) as tm6,SUM(M7) as tm7,SUM(M8) as tm8,SUM(M9) as tm9 from hrm_sales_sal_details_".$AfterYId." INNER JOIN hrm_sales_dealer ON hrm_sales_sal_details_".$AfterYId.".DealerId=hrm_sales_dealer.DealerId INNER JOIN hrm_headquater ON hrm_sales_dealer.HqId=hrm_headquater.HqId INNER JOIN hrm_state ON hrm_headquater.StateId=hrm_state.StateId INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details_".$AfterYId.".ProductId=hrm_sales_seedsproduct.ProductId where hrm_state.CountryId=".$_REQUEST['c']." AND hrm_sales_sal_details_".$AfterYId.".YearId=".$AfterYId." AND hrm_sales_seedsproduct.ProductId=".$res['ProductId'], $con);
	   $resStck2=mysql_fetch_assoc($sqlStck2); $resReq2=mysql_fetch_assoc($sqlReq2);
 ?>
	 
	 
	 <td align="right" bgcolor="#FFFFB0"><?php if($resStck['Apr']!=0){echo $resStck['Apr'];} ?></td>
	<td align="right" bgcolor="<?php if($resStck['Apr']!=0){if($resReq['tm1']>$resStck['Apr']){echo '#FF8282';}else{echo '#FFCEFF';}}else{if($resStckBef['Mar']!='' AND $resReq['tm1']>$resStckBef['Mar']){echo '#FF8282';}else{echo '#FFCEFF';}} ?>"><?php if($resStck['Apr']!=0){echo $resStck['Apr'];}elseif($resStckBef['Mar']!=0){echo $resStckBef['Mar'];} ?></td>
	 <td align="right" bgcolor="#82C0FF"><?php if($resReq['tm1']!=0){echo $resReq['tm1'];} ?></td>
	 
	 <?php if($resStck['Apr']!=0){$c5=$resStck['Apr']-$resReq['tm1'];}elseif($resStckBef['Mar']!=0){$c5=$resStckBef['Mar']-$resReq['tm1'];}else{$c5=0;} ?>
	 <td align="right" bgcolor="#FFFFB0"><?php if($resStck['May']!=0){echo $resStck['May'];} ?></td>
	 <td align="right" bgcolor="<?php if($resStck['May']!=0){if($resReq['tm2']>$resStck['May']){echo '#FF8282';}else{echo '#FFCEFF';}}else{if($resReq['tm2']>$c5){echo '#FF8282';}else{echo '#FFCEFF';}} ?>"><?php if($resStck['May']!=0){echo $resStck['May'];}else{if($c5!=0){echo $c5;}} ?></td>
	 <td align="right" bgcolor="#82C0FF"><?php if($resReq['tm2']!=0){echo $resReq['tm2'];} ?></td>
	 
	 <?php if($resStck['May']!=0){$c6=$resStck['May']-$resReq['tm2'];}elseif($c5!=0){$c6=$c5-$resReq['tm2'];}else{$c6=0;} ?>
	 <td align="right" bgcolor="#FFFFB0"><?php if($resStck['Jun']!=0){echo $resStck['Jun'];} ?></td>
	 <td align="right" bgcolor="<?php if($resStck['Jun']!=0){if($resReq['tm3']>$resStck['Jun']){echo '#FF8282';}else{echo '#FFCEFF';}}else{if($resReq['tm3']>$c6){echo '#FF8282';}else{echo '#FFCEFF';}} ?>"><?php if($resStck['Jun']!=0){echo $resStck['Jun'];}else{if($c6!=0){echo $c6;}} ?></td>
	 <td align="right" bgcolor="#82C0FF"><?php if($resReq['tm3']!=0){echo $resReq['tm3'];} ?></td>
	 
	 <?php if($resStck['Jun']!=0){$c7=$resStck['Jun']-$resReq['tm3'];}elseif($c6!=0){$c7=$c6-$resReq['tm3'];}else{$c7=0;} ?>
	 <td align="right" bgcolor="#FFFFB0"><?php if($resStck['Jul']!=0){echo $resStck['Jul'];} ?></td>
	 <td align="right" bgcolor="<?php if($resStck['Jul']!=0){if($resReq['tm4']>$resStck['Jul']){echo '#FF8282';}else{echo '#FFCEFF';}}else{if($resReq['tm4']>$c7){echo '#FF8282';}else{echo '#FFCEFF';}} ?>"><?php if($resStck['Jul']!=0){echo $resStck['Jul'];}else{if($c7!=0){echo $c7;}} ?></td>
	 <td align="right" bgcolor="#82C0FF"><?php if($resReq['tm4']!=0){echo $resReq['tm4'];} ?></td>
	 
	 <?php if($resStck['Jul']!=0){$c8=$resStck['Jul']-$resReq['tm4'];}elseif($c7!=0){$c8=$c7-$resReq['tm4'];}else{$c8=0;} ?>
	 <td align="right" bgcolor="#FFFFB0"><?php if($resStck['Aug']!=0){echo $resStck['Aug'];} ?></td>
	 <td align="right" bgcolor="<?php if($resStck['Aug']!=0){if($resReq['tm5']>$resStck['Aug']){echo '#FF8282';}else{echo '#FFCEFF';}}else{if($resReq['tm5']>$c8){echo '#FF8282';}else{echo '#FFCEFF';}} ?>"><?php if($resStck['Aug']!=0){echo $resStck['Aug'];}else{if($c8!=0){echo $c8;}} ?></td>
	 <td align="right" bgcolor="#82C0FF"><?php if($resReq['tm5']!=0){echo $resReq['tm5'];} ?></td>
	 
	 <?php if($resStck['Aug']!=0){$c9=$resStck['Aug']-$resReq['tm5'];}elseif($c8!=0){$c9=$c8-$resReq['tm5'];}else{$c9=0;} ?>
	 <td align="right" bgcolor="#FFFFB0"><?php if($resStck['Sep']!=0){echo $resStck['Sep'];} ?></td>
	 <td align="right" bgcolor="<?php if($resStck['Sep']!=0){if($resReq['tm6']>$resStck['Sep']){echo '#FF8282';}else{echo '#FFCEFF';}}else{if($resReq['tm6']>$c9){echo '#FF8282';}else{echo '#FFCEFF';}} ?>"><?php if($resStck['Sep']!=0){echo $resStck['Sep'];}else{if($c9!=0){echo $c9;}} ?></td>
	 <td align="right" bgcolor="#82C0FF"><?php if($resReq['tm6']!=0){echo $resReq['tm6'];} ?></td>
	 
	 <?php if($resStck['Sep']!=0){$c10=$resStck['Sep']-$resReq['tm6'];}elseif($c9!=0){$c10=$c9-$resReq['tm6'];}else{$c10=0;} ?>
	 <td align="right" bgcolor="#FFFFB0"><?php if($resStck['Oct']!=0){echo $resStck['Oct'];} ?></td>
	 <td align="right" bgcolor="<?php if($resStck['Oct']!=0){if($resReq['tm7']>$resStck['Oct']){echo '#FF8282';}else{echo '#FFCEFF';}}else{if($resReq['tm7']>$c10){echo '#FF8282';}else{echo '#FFCEFF';}} ?>"><?php if($resStck['Oct']!=0){echo $resStck['Oct'];}else{if($c10!=0){echo $c10;}} ?></td>
	 <td align="right" bgcolor="#82C0FF"><?php if($resReq['tm7']!=0){echo $resReq['tm7'];} ?></td>
	 
	 <?php if($resStck['Oct']!=0){$c11=$resStck['Oct']-$resReq['tm7'];}elseif($c10!=0){$c11=$c10-$resReq['tm7'];}else{$c11=0;} ?>
	 <td align="right" bgcolor="#FFFFB0"><?php if($resStck['Nov']!=0){echo $resStck['Nov'];} ?></td>
	 <td align="right" bgcolor="<?php if($resStck['Nov']!=0){if($resReq['tm8']>$resStck['Nov']){echo '#FF8282';}else{echo '#FFCEFF';}}else{if($resReq['tm8']>$c11){echo '#FF8282';}else{echo '#FFCEFF';}} ?>"><?php if($resStck['Nov']!=0){echo $resStck['Nov'];}else{if($c11!=0){echo $c11;}} ?></td>
	 <td align="right" bgcolor="#82C0FF"><?php if($resReq['tm8']!=0){echo $resReq['tm8'];} ?></td>
	 
	 <?php if($resStck['Nov']!=0){$c12=$resStck['Nov']-$resReq['tm8'];}elseif($c11!=0){$c12=$c11-$resReq['tm8'];}else{$c12=0;} ?>
	 <td align="right" bgcolor="#FFFFB0"><?php if($resStck['Dece']!=0){echo $resStck['Dece'];} ?></td>
	 <td align="right" bgcolor="<?php if($resStck['Dece']!=0){if($resReq['tm9']>$resStck['Dece']){echo '#FF8282';}else{echo '#FFCEFF';}}else{if($resReq['tm9']>$c12){echo '#FF8282';}else{echo '#FFCEFF';}} ?>"><?php if($resStck['Dece']!=0){echo $resStck['Dece'];}else{if($c12!=0){echo $c12;}} ?></td>
	 <td align="right" bgcolor="#82C0FF"><?php if($resReq['tm9']!=0){echo $resReq['tm9'];} ?></td>
	 
	 <?php if($resStck['Dec']!=0){$c1=$resStck['Dec']-$resReq['tm9'];}elseif($c12!=0){$c1=$c12-$resReq['tm9'];}else{$c1=0;} ?>
	 <td align="right" bgcolor="#FFFFB0"><?php if($resStck['Jan']!=0){echo $resStck['Jan'];} ?></td>
	 <td align="right" bgcolor="<?php if($resStck['Jan']!=0){if($resReq['tm10']>$resStck['Jan']){echo '#FF8282';}else{echo '#FFCEFF';}}else{if($resReq['tm10']>$c1){echo '#FF8282';}else{echo '#FFCEFF';}} ?>" bgcolor="#FF8282"><?php if($resStck['Jan']!=0){echo $resStck['Jan'];}else{if($c1!=0){echo $c1;}} ?></td>
	 <td align="right" bgcolor="#82C0FF"><?php if($resReq['tm10']!=0){echo $resReq['tm10'];} ?></td>
	 
	 <?php if($resStck['Jan']!=0){$c2=$resStck['Jan']-$resReq['tm10'];}elseif($c1!=0){$c2=$c1-$resReq['tm10'];}else{$c2=0;} ?>
	 <td align="right" bgcolor="#FFFFB0"><?php if($resStck['Feb']!=0){echo $resStck['Feb'];} ?></td>
	 <td align="right" bgcolor="<?php if($resStck['Feb']!=0){if($resReq['tm11']>$resStck['Feb']){echo '#FF8282';}else{echo '#FFCEFF';}}else{if($resReq['tm11']>$c2){echo '#FF8282';}else{echo '#FFCEFF';}} ?>"><?php if($resStck['Feb']!=0){echo $resStck['Feb'];}else{if($c2!=0){echo $c2;}} ?></td>
	 <td align="right" bgcolor="#82C0FF"><?php if($resReq['tm11']!=0){echo $resReq['tm11'];} ?></td>
	 
	 <?php if($resStck['Feb']!=0){$c3=$resStck['Feb']-$resReq['tm11'];}elseif($c2!=0){$c3=$c2-$resReq['tm11'];}else{$c3=0;} ?>
	 <td align="right" bgcolor="#FFFFB0"><?php if($resStck['Mar']!=0){echo $resStck['Mar'];} ?></td>
	 <td align="right" bgcolor="<?php if($resStck['Mar']!=0){if($resReq['tm12']>$resStck['Mar']){echo '#FF8282';}else{echo '#FFCEFF';}}else{if($resReq['tm12']>$c3){echo '#FF8282';}else{echo '#FFCEFF';}} ?>"><?php if($resStck['Mar']!=0){echo $resStck['Mar'];}else{if($c3!=0){echo $c3;}} ?></td>
	 <td align="right" bgcolor="#82C0FF"><?php if($resReq['tm12']!=0){echo $resReq['tm12'];} ?></td>
	 
	 <?php /************* Next Year Apr to Dec ***/ ?>
	 
	 <?php if($resStck['Mar']!=0){$c4=$resStck['Mar']-$resReq['tm12'];}elseif($c3!=0){$c4=$c3-$resReq['tm12'];}else{$c4=0;} ?>
	 <td align="right" bgcolor="#FFFFB0"><?php if($resStck2['Apr']!=0){echo $resStck2['Apr'];} ?></td>
	 <td align="right" bgcolor="<?php if($resStck2['Apr']!=0){if($resReq2['tm1']>$resStck2['Apr']){echo '#FF8282';}else{echo '#FFCEFF';}}else{if($resReq2['tm1']>$c4){echo '#FF8282';}else{echo '#FFCEFF';}} ?>"><?php if($resStck2['Apr']!=0){echo $resStck2['Apr'];}else{if($c4!=0){echo $c4;}} ?></td>
	 <td align="right" bgcolor="#82C0FF"><?php if($resReq2['tm1']!=0){echo $resReq2['tm1'];} ?></td>
	 
	 <?php if($resStck2['Apr']!=0){$cc5=$resStck2['Apr']-$resReq2['tm1'];}elseif($c4!=0){$cc5=$c4-$resReq2['tm1'];}else{$cc5=0;} ?>
	 <td align="right" bgcolor="#FFFFB0"><?php if($resStck2['May']!=0){echo $resStck2['May'];} ?></td>
	 <td align="right" bgcolor="<?php if($resStck2['May']!=0){if($resReq2['tm2']>$resStck2['May']){echo '#FF8282';}else{echo '#FFCEFF';}}else{if($resReq2['tm2']>$cc5){echo '#FF8282';}else{echo '#FFCEFF';}} ?>"><?php if($resStck2['May']!=0){echo $resStck2['May'];}else{if($cc5!=0){echo $cc5;}} ?></td>
	 <td align="right" bgcolor="#82C0FF"><?php if($resReq2['tm2']!=0){echo $resReq2['tm2'];} ?></td>
	 
	 <?php if($resStck2['May']!=0){$cc6=$resStck2['May']-$resReq2['tm2'];}elseif($cc5!=0){$cc6=$cc5-$resReq2['tm2'];}else{$cc6=0;} ?>
	 <td align="right" bgcolor="#FFFFB0"><?php if($resStck2['Jun']!=0){echo $resStck2['Jun'];} ?></td>
	 <td align="right" bgcolor="<?php if($resStck2['Jun']!=0){if($resReq2['tm3']>$resStck2['Jun']){echo '#FF8282';}else{echo '#FFCEFF';}}else{if($resReq2['tm3']>$cc6){echo '#FF8282';}else{echo '#FFCEFF';}} ?>"><?php if($resStck2['Jun']!=0){echo $resStck2['Jun'];}else{if($cc6!=0){echo $cc6;}} ?></td>
	 <td align="right" bgcolor="#82C0FF"><?php if($resReq2['tm3']!=0){echo $resReq2['tm3'];} ?></td>
	 
	 <?php if($resStck2['Jun']!=0){$cc7=$resStck2['Jun']-$resReq2['tm3'];}elseif($cc6!=0){$cc7=$cc6-$resReq2['tm3'];}else{$cc7=0;} ?>
	 <td align="right" bgcolor="#FFFFB0"><?php if($resStck2['Jul']!=0){echo $resStck2['Jul'];} ?></td>
	 <td align="right" bgcolor="<?php if($resStck2['Jul']!=0){if($resReq2['tm4']>$resStck2['Jul']){echo '#FF8282';}else{echo '#FFCEFF';}}else{if($resReq2['tm4']>$cc7){echo '#FF8282';}else{echo '#FFCEFF';}} ?>"><?php if($resStck2['Jul']!=0){echo $resStck2['Jul'];}else{if($cc7!=0){echo $cc7;}} ?></td>
	 <td align="right" bgcolor="#82C0FF"><?php if($resReq2['tm4']!=0){echo $resReq2['tm4'];} ?></td>
	 
	 <?php if($resStck2['Jul']!=0){$cc8=$resStck2['Jul']-$resReq2['tm4'];}elseif($cc7!=0){$cc8=$cc7-$resReq2['tm4'];}else{$cc8=0;} ?>
	 <td align="right" bgcolor="#FFFFB0"><?php if($resStck2['Aug']!=0){echo $resStck2['Aug'];} ?></td>
	 <td align="right" bgcolor="<?php if($resStck2['Aug']!=0){if($resReq2['tm5']>$resStck2['Aug']){echo '#FF8282';}else{echo '#FFCEFF';}}else{if($resReq2['tm5']>$cc8){echo '#FF8282';}else{echo '#FFCEFF';}} ?>"><?php if($resStck2['Aug']!=0){echo $resStck2['Aug'];}else{if($cc8!=0){echo $cc8;}} ?></td>
	 <td align="right" bgcolor="#82C0FF"><?php if($resReq2['tm5']!=0){echo $resReq2['tm5'];} ?></td>
	 
	 <?php if($resStck2['Aug']!=0){$cc9=$resStck2['Aug']-$resReq2['tm5'];}elseif($cc8!=0){$cc9=$cc8-$resReq2['tm5'];}else{$cc9=0;} ?>
	 <td align="right" bgcolor="#FFFFB0"><?php if($resStck2['Sep']!=0){echo $resStck2['Sep'];} ?></td>
	 <td align="right" bgcolor="<?php if($resStck2['Sep']!=0){if($resReq2['tm6']>$resStck2['Sep']){echo '#FF8282';}else{echo '#FFCEFF';}}else{if($resReq2['tm6']>$cc9){echo '#FF8282';}else{echo '#FFCEFF';}} ?>"><?php if($resStck2['Sep']!=0){echo $resStck2['Sep'];}else{if($cc9!=0){echo $cc9;}} ?></td>
	 <td align="right" bgcolor="#82C0FF"><?php if($resReq2['tm6']!=0){echo $resReq2['tm6'];} ?></td>
	 
	 <?php if($resStck2['Sep']!=0){$cc10=$resStck2['Sep']-$resReq2['tm6'];}elseif($cc9!=0){$cc10=$cc9-$resReq2['tm6'];}else{$cc10=0;} ?>
	 <td align="right" bgcolor="#FFFFB0"><?php if($resStck2['Oct']!=0){echo $resStck2['Oct'];} ?></td>
	 <td align="right" bgcolor="<?php if($resStck2['Oct']!=0){if($resReq2['tm7']>$resStck2['Oct']){echo '#FF8282';}else{echo '#FFCEFF';}}else{if($resReq2['tm7']>$cc10){echo '#FF8282';}else{echo '#FFCEFF';}} ?>"><?php if($resStck2['Oct']!=0){echo $resStck2['Oct'];}else{if($cc10!=0){echo $cc10;}} ?></td>
	 <td align="right" bgcolor="#82C0FF"><?php if($resReq2['tm7']!=0){echo $resReq2['tm7'];} ?></td>
	 
	 <?php if($resStck2['Oct']!=0){$cc11=$resStck2['Oct']-$resReq2['tm7'];}elseif($cc10!=0){$cc11=$cc10-$resReq2['tm7'];}else{$cc11=0;} ?>
	 <td align="right" bgcolor="#FFFFB0"><?php if($resStck2['Nov']!=0){echo $resStck2['Nov'];} ?></td>
	 <td align="right" bgcolor="<?php if($resStck2['Nov']!=0){if($resReq2['tm8']>$resStck2['Nov']){echo '#FF8282';}else{echo '#FFCEFF';}}else{if($resReq2['tm8']>$cc11){echo '#FF8282';}else{echo '#FFCEFF';}} ?>"><?php if($resStck2['Nov']!=0){echo $resStck2['Nov'];}else{if($cc11!=0){echo $cc11;}} ?></td>
	 <td align="right" bgcolor="#82C0FF"><?php if($resReq2['tm8']!=0){echo $resReq2['tm8'];} ?></td>
	 
	 <?php if($resStck2['Nov']!=0){$cc12=$resStck2['Nov']-$resReq2['tm8'];}elseif($cc11!=0){$cc12=$cc11-$resReq2['tm8'];}else{$cc12=0;} ?>
	 <td align="right" bgcolor="#FFFFB0"><?php if($resStck2['Dec']!=0){echo $resStck2['Dec'];} ?></td>
	 <td align="right" bgcolor="<?php if($resStck2['Dec']!=0){if($resReq2['tm9']>$resStck2['Dec']){echo '#FF8282';}else{echo '#FFCEFF';}}else{if($resReq2['tm9']>$cc12){echo '#FF8282';}else{echo '#FFCEFF';}} ?>"><?php if($resStck2['Dec']!=0){echo $resStck2['Dec'];}else{if($cc12!=0){echo $cc12;}} ?></td>
	 <td align="right" bgcolor="#82C0FF"><?php if($resReq2['tm9']!=0){echo $resReq2['tm9'];} ?></td>
	 
	 
  </tr>	
<?php $Sn++; } ?>  	  
</table>	   	       
<?php } ?>
    </td>
   </tr>   	
  </table>
 </td>
</tr>
<tr><td><span id="AStockSpan"></span></td></tr>
</table>
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
