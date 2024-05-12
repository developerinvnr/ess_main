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
</style>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<Script type="text/javascript">window.history.forward(1);</Script>
<Script language="javascript">

function ChangrYear(YearV)
{
  var CropGrp=document.getElementById("CropGrp").value; var ii=document.getElementById("ItemV").value; var ci=document.getElementById("ComId").value;
  window.location="ProReqNew.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y="+YearV+"&ci="+ci+"&grp="+CropGrp+"&ii="+ii; 
}
function ClickGrp(CropGrp)
{
  var YearV=document.getElementById("YearV").value; var ii=0; var ci=document.getElementById("ComId").value;
  window.location="ProReqNew.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y="+YearV+"&ci="+ci+"&grp="+CropGrp+"&ii="+ii; 
}
function ChangeII(ii)
{
  var YearV=document.getElementById("YearV").value; var CropGrp=document.getElementById("CropGrp").value; var ci=document.getElementById("ComId").value;
  window.location="ProReqNew.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y="+YearV+"&ci="+ci+"&grp="+CropGrp+"&ii="+ii; 
}

function FunNewReq(v,n)
{ 
  var Req=parseFloat(document.getElementById("Req_"+n).value); var NewReq=parseFloat(v);
  var Diff=document.getElementById("Diff_"+n).value=Math.round((Req-NewReq)*100)/100;
  //if(Req>=NewReq){var Diff=document.getElementById("Diff_"+n).value=Math.round((Req-NewReq)*100)/100;}
  //else if(Req<NewReq){var Diff=document.getElementById("Diff_"+n).value=Math.round((NewReq-Req)*100)/100;}
}

function FunPBuff(v,n)
{
  var NewReq=parseFloat(document.getElementById("NewReq_"+n).value); var PBuff=parseFloat(v);
  var TotReq=document.getElementById("TotReq_"+n).value=Math.round((NewReq+PBuff)*100)/100;
}

function FunUFStck(v,n)
{
  var TotReq=parseFloat(document.getElementById("TotReq_"+n).value); var UFStck=parseFloat(v);
  var NTPduce=document.getElementById("NTPduce_"+n).value=Math.round((TotReq-UFStck)*100)/100;
}

function FunProdBuff(v,n)
{
 var NTPduce=parseFloat(document.getElementById("NTPduce_"+n).value); var ProdBuff=parseFloat(v);
 var ProdTgt=document.getElementById("ProdTgt_"+n).value=Math.round((NTPduce+ProdBuff)*100)/100;
}

function saveD(n,y,p,c)
{
  var Req=document.getElementById("Req_"+n).value; var NewReq=document.getElementById("NewReq_"+n).value; var Diff=document.getElementById("Diff_"+n).value;
  var PBuff=document.getElementById("PBuff_"+n).value; var TotReq=document.getElementById("TotReq_"+n).value; var PhyStck=document.getElementById("PhyStck_"+n).value;
  var UFStck=document.getElementById("UFStck_"+n).value; var NTPduce=document.getElementById("NTPduce_"+n).value; var ProdBuff=document.getElementById("ProdBuff_"+n).value;
  var ProdTgt=document.getElementById("ProdTgt_"+n).value; var url = 'ProReqNewAct.php'; 
  var pars = 'Act=SavePtarget&Req'+Req+'&NewReq='+NewReq+'&Diff='+Diff+'&PBuff='+PBuff+'&TotReq='+TotReq+'&PhyStck='+PhyStck+'&UFStck='+UFStck+'&NTPduce='+NTPduce+'&ProdBuff='+ProdBuff+'&ProdTgt='+ProdTgt+'&n='+n+'&y='+y+'&p='+p+'&c='+c; 	
  var myAjax = new Ajax.Request( url, { method: 'post', parameters: pars, onComplete: show_PordTgt }); 
}
function show_PordTgt(originalRequest)
{ document.getElementById('SpanProdTgt').innerHTML = originalRequest.responseText; var n=document.getElementById("no").value;
  document.getElementById("NewReq_"+n).style.background='#D7FFAE'; var PBuff=document.getElementById("PBuff_"+n).style.background='#D7FFAE';
  var UFStck=document.getElementById("UFStck_"+n).style.background='#D7FFAE'; var ProdBuff=document.getElementById("ProdBuff_"+n).style.background='#D7FFAE';
}

function PrintProTgt(y,g,i)
{ var ci=document.getElementById("ComId").value;
  window.open("ProReqNewPrint.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y="+y+"&ci="+ci+"&grp="+g+"&ii="+i,"PrintForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=1250,height=100");
}

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
<span id="SpanProdTgt"></span>	  
<table border="0" style="margin-top:0px;width:100%;height:150px;">	
<tr>
 <td valign="top">
  <table border="0">
   <tr>
    <td id="Entry" valign="top" style="width:900px;">
	<span id="TabEntry">
     <table border="0">
      <tr>
	    <td style="margin-top:0px;width:400px;" class="heading" align="center"><u>Production Target</u></td>
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
	    <td>
		 <select style="font-size:12px;width:180px;height:20px;background-color:#DDFFBB;" name="CropGrp" id="CropGrp" onChange="ClickGrp(this.value)">
<?php if($_REQUEST['grp']==0){ ?><option value="0" selected>SELECT CROP</option><option value="1">VEGETABLE CROP</option>
                                 <option value="2">FIELD CROP</option><option value="3">All CROP</option>		 
<?php }elseif($_REQUEST['grp']==1){ ?><option value="1" selected>VEGETABLE CROP</option><option value="2">FIELD CROP</option><option value="3">All CROP</option>
<?php }elseif($_REQUEST['grp']==2){ ?><option value="2" selected>FIELD CROP</option><option value="1">VEGETABLE CROP</option><option value="3">All CROP</option>
<?php }elseif($_REQUEST['grp']==3){ ?><option value="3" selected>All CROP</option><option value="1">VEGETABLE CROP</option><option value="2">FIELD CROP</option><?php } ?>
        </select>
		</td>
		<td>&nbsp;</td>
		<td style="font-size:11px; height:18px;width:80px;color:#E6E6E6;" align="right"><b>Name :</b></td>
		<td><select style="font-size:12px;width:120px;height:20px;background-color:#DDFFBB;" name="ItemV" id="ItemV" onChange="ChangeII(this.value)">
<?php if($_REQUEST['ii']>0){ $sqlI=mysql_query("select ItemName from hrm_sales_seedsitem where ItemId=".$_REQUEST['ii'], $con); $resI=mysql_fetch_assoc($sqlI); ?>	
         <option value="<?php echo $_REQUEST['ii']; ?>" selected><?php echo strtoupper($resI['ItemName']); ?></option>
		 <?php }else{ ?><option value="0" selected>SELECT</option><?php } ?>
<?php if($_REQUEST['grp']==0){ $sqlItem=mysql_query("select * from hrm_sales_seedsitem order by ItemName ASC", $con);}
      elseif($_REQUEST['grp']==1){ $sqlItem=mysql_query("select * from hrm_sales_seedsitem where GroupId=1 order by ItemName ASC", $con);}
      elseif($_REQUEST['grp']==2){ $sqlItem=mysql_query("select * from hrm_sales_seedsitem where GroupId=2 order by ItemName ASC", $con);}
      //elseif($_REQUEST['grp']==3){ $sqlItem=mysql_query("select * from hrm_sales_seedsitem where (GroupId=1 OR GroupId=2) order by GroupId ASC,ItemName ASC", $con);}
	  while($resItem=mysql_fetch_assoc($sqlItem)){ ?><option value="<?php echo $resItem['ItemId']; ?>"><?php echo $resItem['ItemName']; ?></option><?php } ?></select>	  
		 </td>
		 <td>&nbsp;</td>
		 <td style="font-size:11px; height:18px;width:80px;color:#E6E6E6;" align="center"><a href="#" onClick="PrintProTgt(<?php echo $_REQUEST['y'].', '.$_REQUEST['grp'].', '.$_REQUEST['ii']; ?>)" style="color:#FFCE9D;"><b>PRINT</b></a></td>
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
$sqlY3=mysql_query("select FromDate,ToDate from hrm_sales_year where YearId=".$_REQUEST['y'], $con); $resY3=mysql_fetch_assoc($sqlY3); 
$y3=date("y",strtotime($resY3['FromDate'])).'-'.date("y",strtotime($resY3['ToDate'])); 
$my1='<font color="#A60053">'.date("y",strtotime($resY3['FromDate'])).'</font>'; $my2='<font color="#A60053">'.date("y",strtotime($resY3['ToDate'])).'</font>';
?>  
<table border="1" cellpadding="0" cellspacing="0" style="font-family:Times New Roman;font-size:14px;vertical-align:top;">	
   <tr style="background-color:#D5F1D1;color:#000000;">  
    <td align="center" style="width:120px;"><b>CROP</b></td>
	<td align="center" style="width:200px;"><b>VARIETY</b></td>
	<td align="center" style="width:50px;"><b>&nbsp;TYPE&nbsp;</b></td>
	<td align="center" style="width:50px;"><b>&nbsp;Save&nbsp;</b></td>
	<td align="center" width="80"><b>Req<br><font color="#E67300">(Kg)</font></b></td>
	<td align="center" width="80"><b>New Predict<br><font color="#E67300">(Kg)</font></b></td>
	<td align="center" width="80"><b>Difference<br><font color="#E67300">(Kg)</font></b></td>
	<td align="center" width="80"><b>Placement<br>Buffer</b></td>
	<td align="center" width="80"><b>Total<br>Req</b></td>
	<td align="center" width="80"><b>Physical<br>Stock</b></td>
	<td align="center" width="80"><b>Useful<br>Stock</b></td>
	<td align="center" width="80"><b>Need to<br>Produce</b></td>
	<td align="center" width="80"><b>Production<br>Buffer</b></td>	
	<td align="center" width="100"><b>Production<br>Target</b></td>  
  </tr>	
  <?php if($_REQUEST['ii']>0){$sql = mysql_query("select hrm_sales_seedsproduct.ItemId,ProductId,ProductName,ItemName,TypeName from hrm_sales_seedsproduct INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId INNER JOIN hrm_sales_seedtype ON hrm_sales_seedsproduct.TypeId=hrm_sales_seedtype.TypeId where hrm_sales_seedsitem.ItemId=".$_REQUEST['ii']." order by ItemName ASC, TypeName ASC, ProductName ASC", $con); }
      else
	  { if($_REQUEST['grp']==1 OR $_REQUEST['grp']==2){$sql = mysql_query("select hrm_sales_seedsproduct.ItemId,ProductId,ProductName,ItemName,TypeName from hrm_sales_seedsproduct INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId INNER JOIN hrm_sales_seedtype ON hrm_sales_seedsproduct.TypeId=hrm_sales_seedtype.TypeId where hrm_sales_seedsitem.GroupId=".$_REQUEST['grp']." order by ItemName ASC, TypeName ASC, ProductName ASC", $con);} if($_REQUEST['grp']==3){$sql = mysql_query("select hrm_sales_seedsproduct.ItemId,ProductId,ProductName,ItemName,TypeName from hrm_sales_seedsproduct INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId INNER JOIN hrm_sales_seedtype ON hrm_sales_seedsproduct.TypeId=hrm_sales_seedtype.TypeId order by hrm_sales_seedsitem.GroupId ASC, ItemName ASC, TypeName ASC, ProductName ASC", $con);}
	  } $Sn=1; while($res=mysql_fetch_array($sql)){ 
$sqlTgt=mysql_query("select * from hrm_sales_product_target where YearId=".$_REQUEST['y']." AND ProductId=".$res['ProductId'],$con); $resTgt=mysql_fetch_assoc($sqlTgt);
	  ?>
  <tr bgcolor="#FFFFFF" style="height:22px;"> 
     <td bgcolor="<?php echo '#B8E29C';?>">&nbsp;<?php echo $res['ItemName']; ?></td>	 
     <td bgcolor="<?php echo '#B8E29C';?>">&nbsp;<?php echo $res['ProductName']; ?></td>
     <td bgcolor="<?php echo '#B8E29C';?>" align="center">&nbsp;<?php echo substr_replace($res['TypeName'],'',2);?></td>	   
<?php $BeforeYId2=$_REQUEST['y']-2; $BeforeYId=$_REQUEST['y']-1; $AfterYId=$_REQUEST['y']+1; $AfterYId2=$_REQUEST['y']+2; 	
$sqlP2d=mysql_query("select SUM(M1) as sM1,SUM(M2) as sM2,SUM(M3) as sM3,SUM(M4) as sM4,SUM(M5) as sM5,SUM(M6) as sM6,SUM(M7) as sM7,SUM(M8) as sM8,SUM(M9) as sM9,SUM(M10) as sM10,SUM(M11) as sM11,SUM(M12) as sM12 from hrm_sales_sal_details where YearId=".$_REQUEST['y']." AND ProductId=".$res['ProductId'], $con); $res2=mysql_fetch_assoc($sqlP2d);
$res2Tot=$res2['sM1']+$res2['sM2']+$res2['sM3']+$res2['sM4']+$res2['sM5']+$res2['sM6']+$res2['sM7']+$res2['sM8']+$res2['sM9']+$res2['sM10']+$res2['sM11']+$res2['sM12']; ?>
<td bgcolor="#FFFFFF" align="center" id="TD_<?php echo $Sn; ?>">
<img src="images/edit.png" border="0" alt="Edit" id="EditBtn_<?php echo $Sn; ?>" onClick="editD(<?php echo $Sn; ?>)" style="display:none;">
<img src="images/Floppy-Small-icon.png" border="0" alt="Save" id="SaveBtn_<?php echo $Sn; ?>" onClick="saveD(<?php echo $Sn.', '.$_REQUEST['y'].', '.$res['ProductId'].', '.$CompanyId; ?>)" style="display:block;"></td>
<td><input id="Req_<?php echo $Sn; ?>" style="width:80px;height:21px;text-align:right;background-color:#FFFF9B;" value="<?php if($res2Tot!=''){echo round(intval($res2Tot));}else{echo 0;} ?>" readonly/></td> 
<td>
 <input id="NewReq_<?php echo $Sn; ?>" style="width:80px;height:21px;text-align:right;" value="<?php if($resTgt['NewReq']!=''){echo intval($resTgt['NewReq']);}else{echo 0; } ?>" onKeyDown="FunNewReq(this.value,<?php echo $Sn; ?>)" onChange="FunNewReq(this.value,<?php echo $Sn; ?>)" onBlur="FunNewReq(this.value,<?php echo $Sn; ?>)"/> 
</td>
<td>
<?php $Diff=$res2Tot-$resTgt['NewReq'];
//if($res2Tot>=$resTgt['NewReq']){$Diff=$res2Tot-$resTgt['NewReq'];}elseif($res2Tot<$resTgt['NewReq']){$Diff=$resTgt['NewReq']-$res2Tot;} ?>
<input id="Diff_<?php echo $Sn; ?>" style="width:80px;height:21px;text-align:right;background-color:#FFC1C1;" value="<?php if($Diff!=''){echo intval($Diff);}else{echo 0;} ?>" readonly/></td>
<td>
 <input id="PBuff_<?php echo $Sn; ?>" style="width:80px;height:21px;text-align:right;" value="<?php if($resTgt['PBuff']!=''){echo intval($resTgt['PBuff']);}else{echo 0;} ?>" onKeyDown="FunPBuff(this.value,<?php echo $Sn; ?>)" onChange="FunPBuff(this.value,<?php echo $Sn; ?>)" onBlur="FunPBuff(this.value,<?php echo $Sn; ?>)"/>
</td>
<td>
<?php $TotReq=$resTgt['NewReq']+$resTgt['PBuff']; ?>
<input id="TotReq_<?php echo $Sn; ?>" style="width:80px;height:21px;text-align:right;background-color:#D8FDA6;" value="<?php if($TotReq!=''){echo intval($TotReq);}else{echo 0;} ?>" readonly/></td>
<?php $Stck=mysql_query("select * from hrm_sales_product_stock_actual where ProductId=".$res['ProductId']." AND YearId=".$BeforeYId, $con); $resStck=mysql_fetch_assoc($Stck);
$sqlP1d=mysql_query("select SUM(M1) as sM1,SUM(M2) as sM2,SUM(M3) as sM3,SUM(M4) as sM4,SUM(M5) as sM5,SUM(M6) as sM6,SUM(M7) as sM7,SUM(M8) as sM8,SUM(M9) as sM9,SUM(M10) as sM10,SUM(M11) as sM11,SUM(M12) as sM12 from hrm_sales_sal_details where YearId=".$BeforeYId." AND ProductId=".$res['ProductId'], $con); $res1=mysql_fetch_assoc($sqlP1d); ?>
<td><input id="PhyStck_<?php echo $Sn; ?>" style="width:80px;height:21px;text-align:right;background-color:#8AC5FF;" value="<?php if($resStck['Mar']!=0 AND $resStck['Mar']!=''){$stock=$resStck['Mar']-$res1['sM12']; echo round(intval($stock));} 
elseif($resStck['Feb']!=0 AND $resStck['Feb']!=''){$stock=$resStck['Feb']-($res1['sM11']+$res1['sM12']); echo round(intval($stock));}
elseif($resStck['Jan']!=0 AND $resStck['Jan']!=''){$stock=$resStck['Jan']-($res1['sM10']+$res1['sM11']+$res1['sM12']); echo round(intval($stock));}
elseif($resStck['Dece']!=0 AND $resStck['Dece']!=''){$stock=$resStck['Dece']-($res1['sM9']+$res1['sM10']+$res1['sM11']+$res1['sM12']); echo round(intval($stock));}
elseif($resStck['Nov']!=0 AND $resStck['Nov']!=''){$stock=$resStck['Nov']-($res1['sM8']+$res1['sM9']+$res1['sM10']+$res1['sM11']+$res1['sM12']); echo round(intval($stock));}
elseif($resStck['Oct']!=0 AND $resStck['Oct']!=''){$stock=$resStck['Oct']-($res1['sM7']+$res1['sM8']+$res1['sM9']+$res1['sM10']+$res1['sM11']+$res1['sM12']); echo round(intval($stock));}
elseif($resStck['Sep']!=0 AND $resStck['Sep']!=''){$stock=$resStck['Sep']-($res1['sM6']+$res1['sM7']+$res1['sM8']+$res1['sM9']+$res1['sM10']+$res1['sM11']+$res1['sM12']); 
echo round(intval($stock)); }
elseif($resStck['Aug']!=0 AND $resStck['Aug']!=''){$stock=$resStck['Aug']-($res1['sM5']+$res1['sM6']+$res1['sM7']+$res1['sM8']+$res1['sM9']+$res1['sM10']+$res1['sM11']+$res1['sM12']); echo round(intval($stock));}
elseif($resStck['Jul']!=0 AND $resStck['Jul']!=''){$stock=$resStck['Jul']-($res1['sM4']+$res1['sM5']+$res1['sM6']+$res1['sM7']+$res1['sM8']+$res1['sM9']+$res1['sM10']+$res1['sM11']+$res1['sM12']); echo round(intval($stock));}
elseif($resStck['Jun']!=0 AND $resStck['Jun']!=''){$stock=$resStck['Jun']-($res1['sM3']+$res1['sM4']+$res1['sM5']+$res1['sM6']+$res1['sM7']+$res1['sM8']+$res1['sM9']+$res1['sM10']+$res1['sM11']+$res1['sM12']); echo round(intval($stock));}
elseif($resStck['May']!=0 AND $resStck['May']!=''){$stock=$resStck['May']-($res1['sM2']+$res1['sM3']+$res1['sM4']+$res1['sM5']+$res1['sM6']+$res1['sM7']+$res1['sM8']+$res1['sM9']+$res1['sM10']+$res1['sM11']+$res1['sM12']); echo round(intval($stock));}
elseif($resStck['Apr']!=0 AND $resStck['Apr']!=''){$stock=$resStck['Apr']-($res1['sM1']+$res1['sM2']+$res1['sM3']+$res1['sM4']+$res1['sM5']+$res1['sM6']+$res1['sM7']+$res1['sM8']+$res1['sM9']+$res1['sM10']+$res1['sM11']+$res1['sM12']); echo round(intval($stock)); } ?>" readonly/></td>
<td><input id="UFStck_<?php echo $Sn; ?>" style="width:80px;height:21px;text-align:right;" value="<?php if($resTgt['UFStck']!=''){echo intval($resTgt['UFStck']);}else{echo 0;} ?>" onKeyDown="FunUFStck(this.value,<?php echo $Sn; ?>)" onChange="FunUFStck(this.value,<?php echo $Sn; ?>)" onBlur="FunUFStck(this.value,<?php echo $Sn; ?>)"/></td>
<td><input id="NTPduce_<?php echo $Sn; ?>" style="width:80px;height:21px;text-align:right;background-color:#B7B7DB;" value="<?php if($resTgt['NTPduce']!=''){echo $resTgt['NTPduce'];}else{echo 0;} ?>" readonly/></td>
<td><input id="ProdBuff_<?php echo $Sn; ?>" style="width:80px;height:21px;text-align:right;" value="<?php if($resTgt['ProdBuff']!=''){echo intval($resTgt['ProdBuff']);}else{echo 0;} ?>" onKeyDown="FunProdBuff(this.value,<?php echo $Sn; ?>)" onChange="FunProdBuff(this.value,<?php echo $Sn; ?>)" onBlur="FunProdBuff(this.value,<?php echo $Sn; ?>)"/></td>
<td><input id="ProdTgt_<?php echo $Sn; ?>" style="width:100px;height:21px;text-align:right;background-color:#D8FDA6;" value="<?php if($resTgt['ProdTgt']!=''){echo intval($resTgt['ProdTgt']);}else{echo 0;} ?>" readonly/></td>
  </tr>
<?php $Sn++;  } ?> 
<?php /*  
 <tr bgcolor="#FFFFFF" style="height:22px;font-weight:bold;"> 
     <td colspan="4" align="right"><b>TOTAL:</b>&nbsp;</td>	   
<?php if($_REQUEST['ii']>0){ $sql2T = mysql_query("select SUM(M1) as sM1,SUM(M2) as sM2,SUM(M3) as sM3,SUM(M4) as sM4,SUM(M5) as sM5,SUM(M6) as sM6,SUM(M7) as sM7,SUM(M8) as sM8,SUM(M9) as sM9,SUM(M10) as sM10,SUM(M11) as sM11,SUM(M12) as sM12 from hrm_sales_sal_details where YearId=".$_REQUEST['y']." AND ItemId=".$_REQUEST['ii'], $con); 
$sqlTgtT=mysql_query("select SUM(NewReq), SUM(PBuff), SUM(TotReq), SUM(PhyStck), SUM(UFStck), SUM(NTPduce), SUM(ProdBuff), SUM(ProdTgt) from hrm_sales_product_target INNER JOIN hrm_sales_seedsproduct ON hrm_sales_product_target.ProductId=hrm_sales_seedsproduct.ProductId where hrm_sales_product_target.YearId=".$_REQUEST['y']." AND hrm_sales_seedsproduct.ItemId=".$_REQUEST['ii'],$con); $resTgtT=mysql_fetch_assoc($sqlTgtT); }
      else
	  { if($_REQUEST['grp']==1 OR $_REQUEST['grp']==2){$sql2T = mysql_query("select SUM(M1) as sM1,SUM(M2) as sM2,SUM(M3) as sM3,SUM(M4) as sM4,SUM(M5) as sM5,SUM(M6) as sM6,SUM(M7) as sM7,SUM(M8) as sM8,SUM(M9) as sM9,SUM(M10) as sM10,SUM(M11) as sM11,SUM(M12) as sM12 from hrm_sales_sal_details INNER JOIN hrm_sales_seedsitem ON hrm_sales_sal_details.ItemId=hrm_sales_seedsitem.ItemId where hrm_sales_sal_details.YearId=".$_REQUEST['y']." AND hrm_sales_seedsitem.GroupId=".$_REQUEST['grp'], $con);
$sqlTgtT=mysql_query("select SUM(NewReq), SUM(PBuff), SUM(TotReq), SUM(PhyStck), SUM(UFStck), SUM(NTPduce), SUM(ProdBuff), SUM(ProdTgt) from hrm_sales_product_target INNER JOIN hrm_sales_seedsproduct ON hrm_sales_product_target.ProductId=hrm_sales_seedsproduct.ProductId INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId where hrm_sales_product_target.YearId=".$_REQUEST['y']." AND hrm_sales_seedsitem.GroupId=".$_REQUEST['grp'],$con); 
$resTgtT=mysql_fetch_assoc($sqlTgtT); } 
	  if($_REQUEST['grp']==3){$sql2T = mysql_query("select SUM(M1) as sM1,SUM(M2) as sM2,SUM(M3) as sM3,SUM(M4) as sM4,SUM(M5) as sM5,SUM(M6) as sM6,SUM(M7) as sM7,SUM(M8) as sM8,SUM(M9) as sM9,SUM(M10) as sM10,SUM(M11) as sM11,SUM(M12) as sM12 from hrm_sales_sal_details where YearId=".$_REQUEST['y'], $con); 
$sqlTgtT=mysql_query("select SUM(NewReq), SUM(PBuff), SUM(TotReq), SUM(PhyStck), SUM(UFStck), SUM(NTPduce), SUM(ProdBuff), SUM(ProdTgt) from hrm_sales_product_target where YearId=".$_REQUEST['y'],$con); 
$resTgtT=mysql_fetch_assoc($sqlTgtT);
	  } 
	  } $res2t=mysql_fetch_assoc($sql2T); 
$res2TTot=$res2t['sM1']+$res2t['sM2']+$res2t['sM3']+$res2t['sM4']+$res2t['sM5']+$res2t['sM6']+$res2t['sM7']+$res2t['sM8']+$res2t['sM9']+$res2t['sM10']+$res2t['sM11']+$res2t['sM12']; 
?>
	 
<td><input id="TReq_<?php echo $Sn; ?>" style="width:80px;height:21px;text-align:right;background-color:#FFFF46;" value="<?php if($res2TTot>0){echo round($res2TTot);} ?>" readonly/></td> 
<td><input id="TNewReq_<?php echo $Sn; ?>" style="width:80px;height:21px;text-align:right;" value="<?php echo ''; ?>" readonly/><?php //background-color:#006BD7; ?></td>
<td><input id="TDiff_<?php echo $Sn; ?>" style="width:80px;height:21px;text-align:right;background-color:#FF7979;" value="<?php echo ''; ?>" readonly/></td>
<td><input id="TPBuff_<?php echo $Sn; ?>" style="width:80px;height:21px;text-align:right;" value="<?php echo ''; ?>" readonly/></td>
<td><input id="TTotReq_<?php echo $Sn; ?>" style="width:80px;height:21px;text-align:right;background-color:#9CFA1D;" value="<?php echo ''; ?>" readonly/></td>
<td><input id="TPhyStck_<?php echo $Sn; ?>" style="width:80px;height:21px;text-align:right;background-color:#006BD7;" value="" readonly/></td>
<td><input id="TUFStck_<?php echo $Sn; ?>" style="width:80px;height:21px;text-align:right;" value="<?php echo ''; ?>" readonly/></td>
<td><input id="TNTPduce_<?php echo $Sn; ?>" style="width:80px;height:21px;text-align:right;background-color:#7373B9;" value="<?php echo ''; ?>" readonly/></td>
<td><input id="TProdBuff_<?php echo $Sn; ?>" style="width:80px;height:21px;text-align:right;" value="<?php echo ''; ?>" readonly/></td>
<td><input id="TProdTgt_<?php echo $Sn; ?>" style="width:100px;height:21px;text-align:right;background-color:#9CFA1D;" value="<?php echo ''; ?>" readonly/></td>

  </tr> 
 */ ?> 	  	  
</table>	       
<?php } ?>
    </td>
   </tr>   	
  </table>
 </td>
</tr>
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
