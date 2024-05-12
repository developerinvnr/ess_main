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
.HD{width:80px;text-align:center;font-weight:bold;font-size:12px;font-family:Times New Roman;}
.Inp_td{width:75px;text-align:right;font-size:12px;font-family:Times New Roman;}
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
  window.location="ProdArivalAllot.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y="+YearV+"&ci="+ci+"&grp="+CropGrp+"&ii="+ii+"&c="+c; 
}
function ClickGrp(CropGrp)
{ var c=document.getElementById("Coutry").value;
  var YearV=document.getElementById("YearV").value; var ii=0; var ci=document.getElementById("ComId").value;
  window.location="ProdArivalAllot.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y="+YearV+"&ci="+ci+"&grp="+CropGrp+"&ii="+ii+"&c="+c; 
}
function ChangeII(ii)
{ var c=document.getElementById("Coutry").value;
  var YearV=document.getElementById("YearV").value; var CropGrp=document.getElementById("CropGrp").value; var ci=document.getElementById("ComId").value;
  window.location="ProdArivalAllot.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y="+YearV+"&ci="+ci+"&grp="+CropGrp+"&ii="+ii+"&c="+c; 
}

function FunChg(v,m,y,p)
{ var url = 'ProdArivalAllotAct.php';	var pars = 'action=ChangeAV&v='+v+'&y='+y+'&p='+p+'&m='+m; 
  var myAjax = new Ajax.Request( url, { method: 'post', parameters: pars, onComplete: show_ChngV }); }
function show_ChngV(originalRequest)
{ document.getElementById('ChangeVSpan').innerHTML = originalRequest.responseText; 
  var pi=document.getElementById("pi").value; var yi=document.getElementById("yi").value; var mi=document.getElementById("mi").value;
  document.getElementById(mi+"_"+pi).style.background='#C0FF82';
}

</Script>
</head>
<body class="body">
<span id="ChangeVSpan"></span>
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
	    <td rowspan="2" style="margin-top:0px;width:300px;" class="heading" align="center"><u>Production Arrival</u></td>
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
	   <td>
	  <?php /*
	    <td style="font-size:11px;height:18px;width:90px;color:#E6E6E6;" align="right"><b>Country :</b></td>
	    <td><select style="font-size:12px;width:120px;height:20px;background-color:#DDFFBB;" name="Coutry" id="Coutry" onChange="ClickCoutry(this.value)"> 
<?php if($_REQUEST['c']>0){ $sqlC=mysql_query("SELECT CountryName FROM hrm_country where CountryId=".$_REQUEST['c'], $con); $resC=mysql_fetch_array($sqlC); ?>
<option value="<?php echo $_REQUEST['c']; ?>"><?php echo strtoupper($resC['CountryName']); ?></option><?php }else{ ?><option value="">SELECT</option><?php } ?>		
<?php $SqlCountry=mysql_query("SELECT * FROM hrm_country order by CountryName ASC", $con); while($ResCountry=mysql_fetch_array($SqlCountry)) { ?>
<option value="<?php echo $ResCountry['CountryId']; ?>"><?php echo strtoupper($ResCountry['CountryName']); ?></option><?php } ?></select> */ ?>
        <input type="hidden" name="Coutry" id="Coutry" value="<?php echo $_REQUEST['c']; ?>" />
       </td>
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
$my11=date("Y",strtotime($resY3['FromDate'])); $my22=date("Y",strtotime($resY3['ToDate']));
?>  
<table border="1" cellpadding="0" cellspacing="0" style="font-family:Times New Roman;font-size:14px;width:<?php if($_REQUEST['ii']==0){echo 1500;}else{echo 1300;}?>px; vertical-align:top;">	
  <tr style="background-color:#D5F1D1;color:#000000;">  
    <td colspan="<?php if($_REQUEST['ii']>0){ echo 2;}else{echo 3;}?>" align="center"><b>Details</b>&nbsp;<b>Month(Year:<?php echo $y3; ?>)</b></td>
	<td align="center" class="HD"><b>APR-<?php echo $my1;?></b></td><td align="center" class="HD"><b>MAY-<?php echo $my1;?></b></td><td align="center" class="HD"><b>JUN-<?php echo $my1;?></b></td><td align="center" class="HD"><b>JUL-<?php echo $my1;?></b></td><td align="center" class="HD"><b>AUG-<?php echo $my1;?></b></td><td align="center" class="HD"><b>SEP-<?php echo $my1;?></b></td><td align="center" class="HD"><b>OCT-<?php echo $my1;?></b></td><td align="center" class="HD"><b>NOV-<?php echo $my1;?></b></td><td align="center" class="HD"><b>DEC-<?php echo $my1;?></b></td><td align="center" class="HD"><b>JAN-<?php echo $my2;?></b></td><td align="center" class="HD"><b>FEB-<?php echo $my2;?></b></td><td align="center" class="HD"><b>MAR-<?php echo $my2;?></b></td>
 </tr>
  <?php if($_REQUEST['ii']>0){$sql = mysql_query("select hrm_sales_seedsproduct.ItemId,ProductId,ProductName,ItemName,TypeName from hrm_sales_seedsproduct INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId INNER JOIN hrm_sales_seedtype ON hrm_sales_seedsproduct.TypeId=hrm_sales_seedtype.TypeId where hrm_sales_seedsitem.ItemId=".$_REQUEST['ii']." order by ItemName ASC, TypeName ASC, ProductName ASC", $con); }
      else
	  { if($_REQUEST['grp']==1 OR $_REQUEST['grp']==2){$sql = mysql_query("select hrm_sales_seedsproduct.ItemId,ProductId,ProductName,ItemName,TypeName from hrm_sales_seedsproduct INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId INNER JOIN hrm_sales_seedtype ON hrm_sales_seedsproduct.TypeId=hrm_sales_seedtype.TypeId where hrm_sales_seedsitem.GroupId=".$_REQUEST['grp']." order by ItemName ASC, TypeName ASC, ProductName ASC", $con);} if($_REQUEST['grp']==3){$sql = mysql_query("select hrm_sales_seedsproduct.ItemId,ProductId,ProductName,ItemName,TypeName from hrm_sales_seedsproduct INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId INNER JOIN hrm_sales_seedtype ON hrm_sales_seedsproduct.TypeId=hrm_sales_seedtype.TypeId order by hrm_sales_seedsitem.GroupId ASC, ItemName ASC, TypeName ASC, ProductName ASC", $con); }
	  } 
	  if($_REQUEST['grp']==0){$sqlI=mysql_query("select GroupId from hrm_sales_seedsitem where ItemId=".$_REQUEST['ii'], $con); $resI=mysql_fetch_array($sqlI);
	  $sqlSe=mysql_query("select SeasonId from hrm_sales_season where GroupId=".$resI['GroupId'], $con); }
	  else{$sqlSe=mysql_query("select SeasonId from hrm_sales_season where GroupId=".$_REQUEST['grp'], $con);}
	  //$sqlSe=mysql_query("select SeasonId from hrm_sales_season where GroupId=1",$con);
	   $rowSe=mysql_num_rows($sqlSe);  $Sn=1; while($res=mysql_fetch_array($sql)){ ?>  
   <tr bgcolor="#FFFFFF" style="height:22px;background-color:#E2F3D8;">  
<?php if($_REQUEST['ii']==0){?><td bgcolor="<?php echo '#B8E29C';?>">&nbsp;<?php echo $res['ItemName']; ?></td><?php } ?> 
     <td bgcolor="<?php echo '#B8E29C';?>">&nbsp;<?php echo $res['ProductName']; ?></td>
     <td bgcolor="<?php echo '#B8E29C';?>" align="center">&nbsp;<?php echo substr_replace($res['TypeName'],'',2);?></td>
	 
<?php $sqlArr=mysql_query("select * from hrm_sales_product_arrival where ProductId=".$res['ProductId']." AND YearId=".$_REQUEST['y'], $con); 
	  $resArr=mysql_fetch_assoc($sqlArr); ?>
	 	
<td align="center"><input class="Inp_td" id="AApr_<?php echo $res['ProductId']; ?>" value="<?php if($resArr['AApr']!=0){echo $resArr['AApr'];} ?>" onchange="FunChg(this.value,'AApr',<?php echo $_REQUEST['y'].', '.$res['ProductId']; ?>)" style="background-color:<?php if($resArr['AApr']!=0){echo '#C0FF82';}else{echo '#FFFFFF';} ?>;"/></td>
<td align="center"><input class="Inp_td" id="AMay_<?php echo $res['ProductId']; ?>" value="<?php if($resArr['AMay']!=0){echo $resArr['AMay'];} ?>" onchange="FunChg(this.value,'AMay',<?php echo $_REQUEST['y'].', '.$res['ProductId']; ?>)" style="background-color:<?php if($resArr['AMay']!=0){echo '#C0FF82';}else{echo '#FFFFFF';} ?>;"/></td>
<td align="center"><input class="Inp_td" id="AJun_<?php echo $res['ProductId']; ?>" value="<?php if($resArr['AJun']!=0){echo $resArr['AJun'];} ?>" onchange="FunChg(this.value,'AJun',<?php echo $_REQUEST['y'].', '.$res['ProductId']; ?>)" style="background-color:<?php if($resArr['AJun']!=0){echo '#C0FF82';}else{echo '#FFFFFF';} ?>;"/></td>
<td align="center"><input class="Inp_td" id="AJul_<?php echo $res['ProductId']; ?>" value="<?php if($resArr['AJul']!=0){echo $resArr['AJul'];} ?>" onchange="FunChg(this.value,'AJul',<?php echo $_REQUEST['y'].', '.$res['ProductId']; ?>)" style="background-color:<?php if($resArr['AJul']!=0){echo '#C0FF82';}else{echo '#FFFFFF';} ?>;"/></td>
<td align="center"><input class="Inp_td" id="AAug_<?php echo $res['ProductId']; ?>" value="<?php if($resArr['AAug']!=0){echo $resArr['AAug'];} ?>" onchange="FunChg(this.value,'AAug',<?php echo $_REQUEST['y'].', '.$res['ProductId']; ?>)" style="background-color:<?php if($resArr['AAug']!=0){echo '#C0FF82';}else{echo '#FFFFFF';} ?>;"/></td>
<td align="center"><input class="Inp_td" id="ASep_<?php echo $res['ProductId']; ?>" value="<?php if($resArr['ASep']!=0){echo $resArr['ASep'];} ?>" onchange="FunChg(this.value,'ASep',<?php echo $_REQUEST['y'].', '.$res['ProductId']; ?>)" style="background-color:<?php if($resArr['ASep']!=0){echo '#C0FF82';}else{echo '#FFFFFF';} ?>;"/></td>
<td align="center"><input class="Inp_td" id="AOct_<?php echo $res['ProductId']; ?>" value="<?php if($resArr['AOct']!=0){echo $resArr['AOct'];} ?>" onchange="FunChg(this.value,'AOct',<?php echo $_REQUEST['y'].', '.$res['ProductId']; ?>)" style="background-color:<?php if($resArr['AOct']!=0){echo '#C0FF82';}else{echo '#FFFFFF';} ?>;"/></td>
<td align="center"><input class="Inp_td" id="ANov_<?php echo $res['ProductId']; ?>" value="<?php if($resArr['ANov']!=0){echo $resArr['ANov'];} ?>" onchange="FunChg(this.value,'ANov',<?php echo $_REQUEST['y'].', '.$res['ProductId']; ?>)" style="background-color:<?php if($resArr['ANov']!=0){echo '#C0FF82';}else{echo '#FFFFFF';} ?>;"/></td>
<td align="center"><input class="Inp_td" id="ADec_<?php echo $res['ProductId']; ?>" value="<?php if($resArr['ADec']!=0){echo $resArr['ADec'];} ?>" onchange="FunChg(this.value,'ADec',<?php echo $_REQUEST['y'].', '.$res['ProductId']; ?>)" style="background-color:<?php if($resArr['ADec']!=0){echo '#C0FF82';}else{echo '#FFFFFF';} ?>;"/></td>
<td align="center"><input class="Inp_td" id="AJan_<?php echo $res['ProductId']; ?>" value="<?php if($resArr['AJan']!=0){echo $resArr['AJan'];} ?>" onchange="FunChg(this.value,'AJan',<?php echo $_REQUEST['y'].', '.$res['ProductId']; ?>)" style="background-color:<?php if($resArr['AJan']!=0){echo '#C0FF82';}else{echo '#FFFFFF';} ?>;"/></td>
<td align="center"><input class="Inp_td" id="AFeb_<?php echo $res['ProductId']; ?>" value="<?php if($resArr['AFeb']!=0){echo $resArr['AFeb'];} ?>" onchange="FunChg(this.value,'AFeb',<?php echo $_REQUEST['y'].', '.$res['ProductId']; ?>)" style="background-color:<?php if($resArr['AFeb']!=0){echo '#C0FF82';}else{echo '#FFFFFF';} ?>;"/></td>
<td align="center"><input class="Inp_td" id="AMar_<?php echo $res['ProductId']; ?>" value="<?php if($resArr['AMar']!=0){echo $resArr['AMar'];} ?>" onchange="FunChg(this.value,'AMar',<?php echo $_REQUEST['y'].', '.$res['ProductId']; ?>)" style="background-color:<?php if($resArr['AMar']!=0){echo '#C0FF82';}else{echo '#FFFFFF';} ?>;"/></td>	 
	 
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
