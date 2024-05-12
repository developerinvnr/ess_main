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
window.print(); //window.close();
</Script>
</head>
<body class="body">
<table class="table">
<tr>
 <td valign="top">
  <table width="100%" style="margin-top:0px;" border="0">
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
    <td id="Entry" valign="top" style="width:1200px;">
	<span id="TabEntry">
     <table border="0">
      <tr>
	    <td style="margin-top:0px;" class="heading"><u>Production Target</u></td>
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
