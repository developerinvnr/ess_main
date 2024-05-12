<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');}
if($_SESSION['login'] = true){require_once('UserMenuSession.php');}
?>
<html>
<head>
<style>thead {	display:table-header-group;}tbody {	display:table-row-group;}</style>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<Script language="javascript">
function FunPrint(){window.print();}
</Script>
</head>
<body class="body" onload="FunPrint()">
<input type="hidden" id="ComId" value="<?php echo $_REQUEST['ci']; ?>" />
<input type="hidden" id="UserId" value="<?php echo $UserId; ?>" />	
<?php if($_REQUEST['m']==1){$m='JANUARY';}elseif($_REQUEST['m']==2){$m='FEBRUARY';}elseif($_REQUEST['m']==3){ $m='MARCH';}elseif($_REQUEST['m']==4){$m='APRIL';}elseif($_REQUEST['m']==5){$m='MAY';}elseif($_REQUEST['m']==6){$m='JUNE';}elseif($_REQUEST['m']==7){$m='JULY';}elseif($_REQUEST['m']==8){$m='AUGUST';}elseif($_REQUEST['m']==9){$m='SEPTEMBER';}elseif($_REQUEST['m']==10){$m='OCTOBER';}elseif($_REQUEST['m']==11){$m='NOVEMBER';}elseif($_REQUEST['m']==12){$m='DECEMBER';} ?>	  
<table border="0" style="margin-top:0px; width:100%; height:150px;">	
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
<table border="1" cellpadding="0" cellspacing="0" style="font-family:Times New Roman;font-size:14px;width:<?php if($_REQUEST['m']>0){echo 950;}elseif($_REQUEST['m']=='All'){echo 1400;} ?>px; vertical-align:top;">
<thead>	
  <tr style="background-color:#D5F1D1;color:#000000;">  
    <td colspan="<?php if($_REQUEST['cr']==1){ echo 1;}else{echo 3;}?>" align="center" style="width:120px;"><b>Details</b></td>
	<td align="center" style="width:50px;" rowspan="2"><b>Check</b></td>
	<td colspan="<?php if($_REQUEST['m']>0){echo 1;}elseif($_REQUEST['m']=='All'){echo 12;} ?>" align="center" style="font-size:12px;">
	<?php if($_REQUEST['m']>0){ ?><b><?php echo $m; ?></b><?php }elseif($_REQUEST['m']=='All'){ ?><b>MONTH [ YEAR:<?php echo $y3; ?> ]</b><?php } ?>
	
	</td>
	<td colspan="2" align="center" style="width:150px;font-size:12px;"><b><?php echo $y2; ?></b></td>
	<td colspan="3" align="center" style="width:150px;font-size:12px;"><b><?php echo $y3; ?></b></td>
	<td colspan="3" align="center" style="width:150px;font-size:12px;"><b><?php echo $y4; ?></b></td>

 </tr>	
   <tr style="background-color:#D5F1D1;color:#000000;font-size:12px;">  
<td align="center" style="width:120px;"><b>CROP</b></td>
<?php if($_REQUEST['va']==1){ ?><td align="center" style="width:150px;"><b>VARIETY</b></td><td align="center" style="width:50px;"><b>&nbsp;TYPE&nbsp;</b></td><?php } ?>
	
<?php if($_REQUEST['m']==4 OR $_REQUEST['m']=='All'){ ?><td align="center" width="80"><b>APR-<?php echo $my1;?></b></td><?php } ?>
<?php if($_REQUEST['m']==5 OR $_REQUEST['m']=='All'){ ?><td align="center" width="60"><b>MAY-<?php echo $my1;?></b></td><?php } ?>
<?php if($_REQUEST['m']==6 OR $_REQUEST['m']=='All'){ ?><td align="center" width="60"><b>JUN-<?php echo $my1;?></b></td><?php } ?>
<?php if($_REQUEST['m']==7 OR $_REQUEST['m']=='All'){ ?><td align="center" width="60"><b>JUL-<?php echo $my1;?></b></td><?php } ?>
<?php if($_REQUEST['m']==8 OR $_REQUEST['m']=='All'){ ?><td align="center" width="60"><b>AUG-<?php echo $my1;?></b></td><?php } ?>
<?php if($_REQUEST['m']==9 OR $_REQUEST['m']=='All'){ ?><td align="center" width="60"><b>SEP-<?php echo $my1;?></b></td><?php } ?>
<?php if($_REQUEST['m']==10 OR $_REQUEST['m']=='All'){ ?><td align="center" width="60"><b>OCT-<?php echo $my1;?></b></td><?php } ?>
<?php if($_REQUEST['m']==11 OR $_REQUEST['m']=='All'){ ?><td align="center" width="60"><b>NOV-<?php echo $my1;?></b></td><?php } ?>
<?php if($_REQUEST['m']==12 OR $_REQUEST['m']=='All'){ ?><td align="center" width="60"><b>DEC-<?php echo $my1;?></b></td><?php } ?>
<?php if($_REQUEST['m']==1 OR $_REQUEST['m']=='All'){ ?><td align="center" width="60"><b>JAN-<?php echo $my2;?></b></td><?php } ?>
<?php if($_REQUEST['m']==2 OR $_REQUEST['m']=='All'){ ?><td align="center" width="60"><b>FEB-<?php echo $my2;?></b></td><?php } ?>
<?php if($_REQUEST['m']==3 OR $_REQUEST['m']=='All'){ ?><td align="center" width="60"><b>MAR-<?php echo $my2;?></b></td><?php } ?>
<td align="center" style="width:80px;"><b>Sales (Kg)</b></td>
<td align="center" style="width:50px;"><b>%</b></td>
<td align="center" style="width:80px;"><b>Sales (Kg)</b></td>
<td align="center" style="width:50px;"><b>%</b></td>
<td align="center" style="width:80px;"><b>Difference (Kg)</b></td>
<td align="center" style="width:80px;"><b>Projection (Kg)</b></td>
<td align="center" style="width:50px;"><b>%</b></td>
<td align="center" style="width:80px;"><b>Difference (Kg)</b></td>
  </tr>	
  </thead>
<?php 
if($_REQUEST['va']==1)
{
 if($_REQUEST['ii']>0){$sql = mysql_query("select hrm_sales_seedsproduct.ItemId,ProductId,ProductName,ItemName,TypeName from hrm_sales_seedsproduct INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId INNER JOIN hrm_sales_seedtype ON hrm_sales_seedsproduct.TypeId=hrm_sales_seedtype.TypeId where hrm_sales_seedsitem.ItemId=".$_REQUEST['ii']." order by ItemName ASC, TypeName ASC, ProductName ASC", $con); }
 else{ if($_REQUEST['grp']==1 OR $_REQUEST['grp']==2){$sql = mysql_query("select hrm_sales_seedsproduct.ItemId,ProductId,ProductName,ItemName,TypeName from hrm_sales_seedsproduct INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId INNER JOIN hrm_sales_seedtype ON hrm_sales_seedsproduct.TypeId=hrm_sales_seedtype.TypeId where hrm_sales_seedsitem.GroupId=".$_REQUEST['grp']." order by ItemName ASC, TypeName ASC, ProductName ASC", $con);} if($_REQUEST['grp']==3){$sql = mysql_query("select hrm_sales_seedsproduct.ItemId,ProductId,ProductName,ItemName,TypeName from hrm_sales_seedsproduct INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId INNER JOIN hrm_sales_seedtype ON hrm_sales_seedsproduct.TypeId=hrm_sales_seedtype.TypeId order by hrm_sales_seedsitem.GroupId ASC, ItemName ASC, TypeName ASC, ProductName ASC", $con); } } 
}
elseif($_REQUEST['cr']==1)
{
 if($_REQUEST['ii']>0){$sql = mysql_query("select hrm_sales_seedsproduct.ItemId,ProductId,ProductName,ItemName,TypeName from hrm_sales_seedsproduct INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId INNER JOIN hrm_sales_seedtype ON hrm_sales_seedsproduct.TypeId=hrm_sales_seedtype.TypeId where hrm_sales_seedsitem.ItemId=".$_REQUEST['ii']." group by ItemName order by ItemName ASC", $con); }
 else{ if($_REQUEST['grp']==1 OR $_REQUEST['grp']==2){$sql = mysql_query("select hrm_sales_seedsproduct.ItemId,ProductId,ProductName,ItemName,TypeName from hrm_sales_seedsproduct INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId INNER JOIN hrm_sales_seedtype ON hrm_sales_seedsproduct.TypeId=hrm_sales_seedtype.TypeId where hrm_sales_seedsitem.GroupId=".$_REQUEST['grp']." group by ItemName order by ItemName ASC", $con);} if($_REQUEST['grp']==3){$sql = mysql_query("select hrm_sales_seedsproduct.ItemId,ProductId,ProductName,ItemName,TypeName from hrm_sales_seedsproduct INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId INNER JOIN hrm_sales_seedtype ON hrm_sales_seedsproduct.TypeId=hrm_sales_seedtype.TypeId group by ItemName order by hrm_sales_seedsitem.GroupId ASC, ItemName ASC", $con); } }
}
 
  
	  
	  if($_REQUEST['grp']==0){$sqlI=mysql_query("select GroupId from hrm_sales_seedsitem where ItemId=".$_REQUEST['ii'], $con); $resI=mysql_fetch_array($sqlI);
	  $sqlSe=mysql_query("select SeasonId from hrm_sales_season where GroupId=".$resI['GroupId'], $con); }
	  else{$sqlSe=mysql_query("select SeasonId from hrm_sales_season where GroupId=".$_REQUEST['grp'], $con);}
	  //$sqlSe=mysql_query("select SeasonId from hrm_sales_season where GroupId=1",$con); 
	  $rowSe=mysql_num_rows($sqlSe); $Sn=1; while($res=mysql_fetch_array($sql)){ ?>  
<tbody>		  
   <tr bgcolor="#FFFFFF" style="height:22px;background-color:#E2F3D8;font-size:13px;" id="TR<?php echo $Sn; ?>">  
<td bgcolor="<?php echo '#B8E29C';?>">&nbsp;<?php echo $res['ItemName']; ?></td> 
<?php if($_REQUEST['va']==1){ ?>
     <td bgcolor="<?php echo '#B8E29C';?>">&nbsp;<?php echo $res['ProductName']; ?></td>
     <td bgcolor="<?php echo '#B8E29C';?>" align="center">&nbsp;<?php echo substr_replace($res['TypeName'],'',2);?></td>  
<?php } ?>
<td align="center" style="width:50px;"><input type="checkbox" id="Chk<?php echo $Sn; ?>" onClick="FucChk(<?php echo $Sn; ?>)" /></td>	 
<?php 
if($_REQUEST['va']==1)
{
 $sqlStck=mysql_query("select SUM(Apr) as sApr,SUM(May) as sMay,SUM(Jun) as sJun,SUM(Jul) as sJul,SUM(Aug) as sAug,SUM(Sep) as sSep,SUM(Oct) as sOct,SUM(Nov) as sNov,SUM(Dece) as sDece,SUM(Jan) as sJan,SUM(Feb) as sFeb,SUM(Mar) as sMar from hrm_sales_product_stock_actual where ProductId=".$res['ProductId']." AND YearId=".$_REQUEST['y']." AND CompanyId=".$CompanyId, $con);
}
elseif($_REQUEST['cr']==1)
{
 $sqlStck=mysql_query("select SUM(Apr) as sApr,SUM(May) as sMay,SUM(Jun) as sJun,SUM(Jul) as sJul,SUM(Aug) as sAug,SUM(Sep) as sSep,SUM(Oct) as sOct,SUM(Nov) as sNov,SUM(Dece) as sDece,SUM(Jan) as sJan,SUM(Feb) as sFeb,SUM(Mar) as sMar from hrm_sales_product_stock_actual INNER JOIN hrm_sales_seedsproduct ON hrm_sales_product_stock_actual.ProductId=hrm_sales_seedsproduct.ProductId where hrm_sales_seedsproduct.ItemId=".$res['ItemId']." AND hrm_sales_product_stock_actual.YearId=".$_REQUEST['y']." AND hrm_sales_product_stock_actual.CompanyId=".$CompanyId, $con);
}
$resStck=mysql_fetch_assoc($sqlStck);
?>   

<?php if($_REQUEST['m']==4 OR $_REQUEST['m']=='All'){ ?><td align="right"><?php if($resStck['sApr']!=0){echo $resStck['sApr'];} ?></td><?php } ?>
<?php if($_REQUEST['m']==5 OR $_REQUEST['m']=='All'){ ?><td align="right"><?php if($resStck['sMay']!=0){echo $resStck['sMay'];} ?></td><?php } ?>
<?php if($_REQUEST['m']==6 OR $_REQUEST['m']=='All'){ ?><td align="right"><?php if($resStck['sJun']!=0){echo $resStck['sJun'];} ?></td><?php } ?>
<?php if($_REQUEST['m']==7 OR $_REQUEST['m']=='All'){ ?><td align="right"><?php if($resStck['sJul']!=0){echo $resStck['sJul'];} ?></td><?php } ?>
<?php if($_REQUEST['m']==8 OR $_REQUEST['m']=='All'){ ?><td align="right"><?php if($resStck['sAug']!=0){echo $resStck['sAug'];} ?></td><?php } ?>
<?php if($_REQUEST['m']==9 OR $_REQUEST['m']=='All'){ ?><td align="right"><?php if($resStck['sSep']!=0){echo $resStck['sSep'];} ?></td><?php } ?>
<?php if($_REQUEST['m']==10 OR $_REQUEST['m']=='All'){ ?><td align="right"><?php if($resStck['sOct']!=0){echo $resStck['sOct'];} ?></td><?php } ?>
<?php if($_REQUEST['m']==11 OR $_REQUEST['m']=='All'){ ?><td align="right"><?php if($resStck['sNov']!=0){echo $resStck['sNov'];} ?></td><?php } ?>
<?php if($_REQUEST['m']==12 OR $_REQUEST['m']=='All'){ ?><td align="right"><?php if($resStck['sDece']!=0){echo $resStck['sDece'];} ?></td><?php } ?>
<?php if($_REQUEST['m']==1 OR $_REQUEST['m']=='All'){ ?><td align="right"><?php if($resStck['sJan']!=0){echo $resStck['sJan'];} ?></td><?php } ?>
<?php if($_REQUEST['m']==2 OR $_REQUEST['m']=='All'){ ?><td align="right"><?php if($resStck['sFeb']!=0){echo $resStck['sFeb'];} ?></td><?php } ?>
<?php if($_REQUEST['m']==3 OR $_REQUEST['m']=='All'){ ?><td align="right"><?php if($resStck['sFeb']!=0){echo $resStck['sMar'];} ?></td><?php } ?>	 

<?php
if($_REQUEST['va']==1)
{
 $sqlP1d=mysql_query("select SUM(M1_Ach) as tm1,SUM(M2_Ach) as tm2,SUM(M3_Ach) as tm3,SUM(M4_Ach) as tm4,SUM(M5_Ach) as tm5,SUM(M6_Ach) as tm6,SUM(M7_Ach) as tm7,SUM(M8_Ach) as tm8,SUM(M9_Ach) as tm9,SUM(M10_Ach) as tm10,SUM(M11_Ach) as tm11,SUM(M12_Ach) as tm12 from hrm_sales_sal_details where YearId=".$BeforeYId." AND ProductId=".$res['ProductId'], $con); 
 $sqlP2d=mysql_query("select SUM(M1_Ach) as tm1,SUM(M2_Ach) as tm2,SUM(M3_Ach) as tm3,SUM(M4_Ach) as tm4,SUM(M5_Ach) as tm5,SUM(M6_Ach) as tm6,SUM(M7_Ach) as tm7,SUM(M8_Ach) as tm8,SUM(M9_Ach) as tm9,SUM(M10_Ach) as tm10,SUM(M11_Ach) as tm11,SUM(M12_Ach) as tm12 from hrm_sales_sal_details where YearId=".$_REQUEST['y']." AND ProductId=".$res['ProductId'], $con); 
 $sqlP3d=mysql_query("select SUM(M1) as tm1,SUM(M2) as tm2,SUM(M3) as tm3,SUM(M4) as tm4,SUM(M5) as tm5,SUM(M6) as tm6,SUM(M7) as tm7,SUM(M8) as tm8,SUM(M9) as tm9,SUM(M10) as tm10,SUM(M11) as tm11,SUM(M12) as tm12 from hrm_sales_sal_details where YearId=".$AfterYId." AND ProductId=".$res['ProductId'], $con); 
 
}
elseif($_REQUEST['cr']==1)
{
 $sqlP1d=mysql_query("select SUM(M1_Ach) as tm1,SUM(M2_Ach) as tm2,SUM(M3_Ach) as tm3,SUM(M4_Ach) as tm4,SUM(M5_Ach) as tm5,SUM(M6_Ach) as tm6,SUM(M7_Ach) as tm7,SUM(M8_Ach) as tm8,SUM(M9_Ach) as tm9,SUM(M10_Ach) as tm10,SUM(M11_Ach) as tm11,SUM(M12_Ach) as tm12 from hrm_sales_sal_details INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details.ProductId=hrm_sales_seedsproduct.ProductId where hrm_sales_sal_details.YearId=".$BeforeYId." AND hrm_sales_seedsproduct.ItemId=".$res['ItemId']."", $con); 
 $sqlP2d=mysql_query("select SUM(M1_Ach) as tm1,SUM(M2_Ach) as tm2,SUM(M3_Ach) as tm3,SUM(M4_Ach) as tm4,SUM(M5_Ach) as tm5,SUM(M6_Ach) as tm6,SUM(M7_Ach) as tm7,SUM(M8_Ach) as tm8,SUM(M9_Ach) as tm9,SUM(M10_Ach) as tm10,SUM(M11_Ach) as tm11,SUM(M12_Ach) as tm12 from hrm_sales_sal_details INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details.ProductId=hrm_sales_seedsproduct.ProductId where hrm_sales_sal_details.YearId=".$_REQUEST['y']." AND hrm_sales_seedsproduct.ItemId=".$res['ItemId']."", $con);
 $sqlP3d=mysql_query("select SUM(M1) as tm1,SUM(M2) as tm2,SUM(M3) as tm3,SUM(M4) as tm4,SUM(M5) as tm5,SUM(M6) as tm6,SUM(M7) as tm7,SUM(M8) as tm8,SUM(M9) as tm9,SUM(M10) as tm10,SUM(M11) as tm11,SUM(M12) as tm12 from hrm_sales_sal_details INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details.ProductId=hrm_sales_seedsproduct.ProductId where hrm_sales_sal_details.YearId=".$_REQUEST['y']." AND hrm_sales_seedsproduct.ItemId=".$res['ItemId']."", $con);

}
$res1=mysql_fetch_assoc($sqlP1d); $res2=mysql_fetch_assoc($sqlP2d); $res3=mysql_fetch_assoc($sqlP3d);
$res1Tot=$res1['tm1']+$res1['tm2']+$res1['tm3']+$res1['tm4']+$res1['tm5']+$res1['tm6']+$res1['tm7']+$res1['tm8']+$res1['tm9']+$res1['tm10']+$res1['tm11']+$res1['tm12']; 
$res2Tot=$res2['tm1']+$res2['tm2']+$res2['tm3']+$res2['tm4']+$res2['tm5']+$res2['tm6']+$res2['tm7']+$res2['tm8']+$res2['tm9']+$res2['tm10']+$res2['tm11']+$res2['tm12'];
$res3Tot=$res3['tm1']+$res3['tm2']+$res3['tm3']+$res3['tm4']+$res3['tm5']+$res3['tm6']+$res3['tm7']+$res3['tm8']+$res3['tm9']+$res3['tm10']+$res3['tm11']+$res3['tm12'];


if($_REQUEST['m']==4){$stck=$resStck['sApr']; $Tots=$res2['tm1']; $Tot2s=$res3['tm1']; }
elseif($_REQUEST['m']==5){$stck=$resStck['sMay']; $Tots=$res2['tm1']+$res2['tm2']; $Tot2s=$res3['tm1']+$res3['tm2']; }
elseif($_REQUEST['m']==6){$stck=$resStck['sJun']; $Tots=$res2['tm1']+$res2['tm2']+$res2['tm3']; $Tot2s=$res3['tm1']+$res3['tm2']+$res3['tm3']; }
elseif($_REQUEST['m']==7){$stck=$resStck['sJul']; $Tots=$res2['tm1']+$res2['tm2']+$res2['tm3']+$res2['tm4']; $Tot2s=$res3['tm1']+$res3['tm2']+$res3['tm3']+$res3['tm4']; }
elseif($_REQUEST['m']==8){$stck=$resStck['sAug']; $Tots=$res2['tm1']+$res2['tm2']+$res2['tm3']+$res2['tm4']+$res2['tm5']; $Tot2s=$res3['tm1']+$res3['tm2']+$res3['tm3']+$res3['tm4']+$res3['tm5']; }
elseif($_REQUEST['m']==9){$stck=$resStck['sSep']; $Tots=$res2['tm1']+$res2['tm2']+$res2['tm3']+$res2['tm4']+$res2['tm5']+$res2['tm6']; $Tot2s=$res3['tm1']+$res3['tm2']+$res3['tm3']+$res3['tm4']+$res3['tm5']+$res3['tm6']; }
elseif($_REQUEST['m']==10){$stck=$resStck['sOct']; $Tots=$res2['tm1']+$res2['tm2']+$res2['tm3']+$res2['tm4']+$res2['tm5']+$res2['tm6']+$res2['tm7']; $Tot2s=$res3['tm1']+$res3['tm2']+$res3['tm3']+$res3['tm4']+$res3['tm5']+$res3['tm6']+$res3['tm7']; }
elseif($_REQUEST['m']==11){$stck=$resStck['sNov']; $Tots=$res2['tm1']+$res2['tm2']+$res2['tm3']+$res2['tm4']+$res2['tm5']+$res2['tm6']+$res2['tm7']+$res2['tm8']; $Tot2s=$res3['tm1']+$res3['tm2']+$res3['tm3']+$res3['tm4']+$res3['tm5']+$res3['tm6']+$res3['tm7']+$res3['tm8']; }
elseif($_REQUEST['m']==12){$stck=$resStck['sDece']; $Tots=$res2['tm1']+$res2['tm2']+$res2['tm3']+$res2['tm4']+$res2['tm5']+$res2['tm6']+$res2['tm7']+$res2['tm8']+$res2['tm9']; $Tot2s=$res3['tm1']+$res3['tm2']+$res3['tm3']+$res3['tm4']+$res3['tm5']+$res3['tm6']+$res3['tm7']+$res3['tm8']+$res3['tm9']; }
elseif($_REQUEST['m']==1){$stck=$resStck['sJan']; $Tots=$res2['tm1']+$res2['tm2']+$res2['tm3']+$res2['tm4']+$res2['tm5']+$res2['tm6']+$res2['tm7']+$res2['tm8']+$res2['tm9']+$res2['tm10']; $Tot2s=$res3['tm1']+$res3['tm2']+$res3['tm3']+$res3['tm4']+$res3['tm5']+$res3['tm6']+$res3['tm7']+$res3['tm8']+$res3['tm9']+$res3['tm10']; }
elseif($_REQUEST['m']==2){$stck=$resStck['sFeb']; $Tots=$res2['tm1']+$res2['tm2']+$res2['tm3']+$res2['tm4']+$res2['tm5']+$res2['tm6']+$res2['tm7']+$res2['tm8']+$res2['tm9']+$res2['tm10']+$res2['tm11']; $Tot2s=$res3['tm1']+$res3['tm2']+$res3['tm3']+$res3['tm4']+$res3['tm5']+$res3['tm6']+$res3['tm7']+$res3['tm8']+$res3['tm9']+$res3['tm10']+$res3['tm11']; }
elseif($_REQUEST['m']==3){$stck=$resStck['sMar']; $Tots=$res2['tm1']+$res2['tm2']+$res2['tm3']+$res2['tm4']+$res2['tm5']+$res2['tm6']+$res2['tm7']+$res2['tm8']+$res2['tm9']+$res2['tm10']+$res2['tm11']+$res2['tm12']; $Tot2s=$res3['tm1']+$res3['tm2']+$res3['tm3']+$res3['tm4']+$res3['tm5']+$res3['tm6']+$res3['tm7']+$res3['tm8']+$res3['tm9']+$res3['tm10']+$res3['tm11']+$res3['tm12']; }
elseif($_REQUEST['m']=='All')
{ if($resStck['sMar']>0){$stck=$resStck['sMar'];}
  elseif($resStck['sFeb']>0){$stck=$resStck['sFeb'];}
  elseif($resStck['sJan']>0){$stck=$resStck['sJan'];}
  elseif($resStck['sDece']>0){$stck=$resStck['sDece'];}
  elseif($resStck['sNov']>0){$stck=$resStck['sNov'];}
  elseif($resStck['sOct']>0){$stck=$resStck['sOct'];}
  elseif($resStck['sSep']>0){$stck=$resStck['sSep'];}
  elseif($resStck['sAug']>0){$stck=$resStck['sAug'];}
  elseif($resStck['sJul']>0){$stck=$resStck['sJul'];}
  elseif($resStck['sJun']>0){$stck=$resStck['sJun'];}
  elseif($resStck['sMay']>0){$stck=$resStck['sMay'];}
  elseif($resStck['sApr']>0){$stck=$resStck['sApr'];}
  else{$stck=0;} 
  $Tots=$res2Tot; $Tot2s=$res3Tot; 
}
else{$stck=0; $Tots=0; $Tot2s=0; }

?>	 
	 <td align="right" style="background-color:#FFE1FF;" id="TD1<?php echo $Sn; ?>"><?php if($res1Tot!=0){echo $res1Tot;} ?></td>
	 <td align="right" style="background-color:#FFE1FF;" id="TD2<?php echo $Sn; ?>"><?php if($stck>0 AND $res1Tot>0){ $PerStck=($stck/$res1Tot)*100; echo round($PerStck,3); } else {echo '';} ?></td> 
	 <td align="right" style="background-color:#FFFFB9;" id="TD3<?php echo $Sn; ?>"><?php if($Tots!=0){echo $Tots;} ?></td>
	 <td align="right" style="background-color:#FFFFB9;" id="TD4<?php echo $Sn; ?>"><?php if($stck>0 AND $Tots>0){ $PerStck2=($stck/$Tots)*100; echo round($PerStck2,3); }else {echo '';} ?></td>
	 <td align="right" style="background-color:#FFFFB9;" id="TD5<?php echo $Sn; ?>"><?php $Diff=$Tots-$res1Tot; echo $Diff; ?></td>
	 
	 
	 <td align="right" style="background-color:#D5FFAA;" id="TD6<?php echo $Sn; ?>"><?php if($Tot2s!=0){echo $Tot2s;} ?></td>
	 <td align="right" style="background-color:#D5FFAA;" id="TD7<?php echo $Sn; ?>"><?php if($stck>0 AND $Tot2s>0){ $PerStck3=($stck/$Tot2s)*100; echo round($PerStck3,3); }else {echo '';} ?></td>
	 <td align="right" style="background-color:#D5FFAA;" id="TD8<?php echo $Sn; ?>"><?php $Diff2=$Tot2s-$Tots; echo $Diff2; ?></td>
  </tr>	
<?php $Sn++; } ?>
</tbody>  	  
</table>	   	       
<?php } ?>
    </td>
   </tr>   	
  </table>
 </td>
</tr>
<tr><td style="font-size:11px; height:18px;width:80px;color:#E6E6E6;" align="center"><a href="#" onClick="FunPrint()" style="color:#FFCE9D;"><b>PRINT</b></a></td></tr>

</table>

</body>
</html>
</html>
