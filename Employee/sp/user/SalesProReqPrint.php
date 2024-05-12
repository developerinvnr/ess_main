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
thead {	display:table-header-group;}tbody {	display:table-row-group;}
</style>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<Script type="text/javascript">window.history.forward(1);</Script>
<Script language="javascript">
function PrintPage()
{ window.print(); window.close(); }
//onLoad="PrintPage()"
</Script>
</head>
<body class="body" onLoad="PrintPage()">
<table class="table">
<tr>
 <td valign="top">
  <table width="100%" style="margin-top:0px;" border="0">
	 <tr>
	  <td valign="top" align="center"  width="100%" id="MainWindow"><br>
	  
<table border="0" style="margin-top:0px; width:100%; height:150px;">	
  <tr><td style="margin-top:0px;width:500px;" class="heading">Production Requirement</b></td></tr>
  <tr>
    <td colspan="3" valign="top">
<?php if($_REQUEST['grp']>0){  	
$sqlY3=mysql_query("select FromDate,ToDate from hrm_sales_year where YearId=".$_REQUEST['y'], $con); $resY3=mysql_fetch_assoc($sqlY3); 
$y3=date("y",strtotime($resY3['FromDate'])).'-'.date("y",strtotime($resY3['ToDate'])); 
$my1='<font color="#A60053">'.date("y",strtotime($resY3['FromDate'])).'</font>'; $my2='<font color="#A60053">'.date("y",strtotime($resY3['ToDate'])).'</font>';
?>	  
<table border="1" cellpadding="0" cellspacing="0" style="font-family:Times New Roman;font-size:14px;width:1300px; vertical-align:top;">	
   <tr style="background-color:#D5F1D1;color:#000000;">  
    <td align="center" style="width:120px;"><b>CROP</b></td>
	<td align="center" style="width:200px;"><b>VARIETY</b></td>
	<td align="center" style="width:50px;"><b>&nbsp;TYPE&nbsp;</b></td>
	<td align="center" width="80"><b>APR-<?php echo $my1;?></b></td><td align="center" width="80"><b>MAY-<?php echo $my1;?></b></td><td align="center" width="80"><b>JUN-<?php echo $my1;?></b></td><td align="center" width="80"><b>JUL-<?php echo $my1;?></b></td><td align="center" width="80"><b>AUG-<?php echo $my1;?></b></td><td align="center" width="80"><b>SEP-<?php echo $my1;?></b></td><td align="center" width="80"><b>OCT-<?php echo $my1;?></b></td><td align="center" width="80"><b>NOV-<?php echo $my1;?></b></td><td align="center" width="80"><b>DEC-<?php echo $my1;?></b></td><td align="center" width="80"><b>JAN-<?php echo $my2;?></b></td><td align="center" width="80"><b>FEB-<?php echo $my2;?></b></td><td align="center" width="80"><b>MAR-<?php echo $my2;?></b></td><td align="center" width="80"><b>TOTAL<br><font color="#E67300">Kg</font></b></td>
	<?php /*<td align="center" width="80"><b>VALUE<br><font color="#E67300">Lakh</font></b></td> */ ?>	  
  </tr>	
  <?php if($_REQUEST['ii']>0){$sql = mysql_query("select hrm_sales_seedsproduct.ItemId,ProductId,ProductName,ItemName,TypeName from hrm_sales_seedsproduct INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId INNER JOIN hrm_sales_seedtype ON hrm_sales_seedsproduct.TypeId=hrm_sales_seedtype.TypeId where hrm_sales_seedsitem.ItemId=".$_REQUEST['ii']." order by ItemName ASC, TypeName ASC, ProductName ASC", $con); }
      else
	  { if($_REQUEST['grp']==1 OR $_REQUEST['grp']==2){$sql = mysql_query("select hrm_sales_seedsproduct.ItemId,ProductId,ProductName,ItemName,TypeName from hrm_sales_seedsproduct INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId INNER JOIN hrm_sales_seedtype ON hrm_sales_seedsproduct.TypeId=hrm_sales_seedtype.TypeId where hrm_sales_seedsitem.GroupId=".$_REQUEST['grp']." order by ItemName ASC, TypeName ASC, ProductName ASC", $con);} if($_REQUEST['grp']==3){$sql = mysql_query("select hrm_sales_seedsproduct.ItemId,ProductId,ProductName,ItemName,TypeName from hrm_sales_seedsproduct INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId INNER JOIN hrm_sales_seedtype ON hrm_sales_seedsproduct.TypeId=hrm_sales_seedtype.TypeId order by hrm_sales_seedsitem.GroupId ASC, ItemName ASC, TypeName ASC, ProductName ASC", $con);}
	  } $Sn=1; while($res=mysql_fetch_array($sql)){?>
  <tr bgcolor="#FFFFFF" style="height:22px;"> 
     <td bgcolor="<?php echo '#B8E29C';?>">&nbsp;<?php echo $res['ItemName']; ?></td>	 
     <td bgcolor="<?php echo '#B8E29C';?>">&nbsp;<?php echo $res['ProductName']; ?></td>
     <td bgcolor="<?php echo '#B8E29C';?>" align="center">&nbsp;<?php echo substr_replace($res['TypeName'],'',2);?></td>	  
<?php $sqlP1d=mysql_query("select SUM(M1) as sM1,SUM(M2) as sM2,SUM(M3) as sM3,SUM(M4) as sM4,SUM(M5) as sM5,SUM(M6) as sM6,SUM(M7) as sM7,SUM(M8) as sM8,SUM(M9) as sM9,SUM(M10) as sM10,SUM(M11) as sM11,SUM(M12) as sM12 from hrm_sales_sal_details_".$_REQUEST['y']." where YearId=".$_REQUEST['y']." AND ProductId=".$res['ProductId'], $con); $res1=mysql_fetch_assoc($sqlP1d); 
$res1Tot=$res1['sM1']+$res1['sM2']+$res1['sM3']+$res1['sM4']+$res1['sM5']+$res1['sM6']+$res1['sM7']+$res1['sM8']+$res1['sM9']+$res1['sM10']+$res1['sM11']+$res1['sM12']; 
//$sqlNrv=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND YearId=".$_REQUEST['y'], $con); $resNrv=mysql_fetch_assoc($sqlNrv); 
//if($resNrv['NRV']!=''){$NRV=$resNrv['NRV'];}else{$NRV=0;} $NetNRV_1=$res1Tot*$NRV; $LakhNRV_1=$NetNRV_1/100000; ?>
	 <td align="right" width="80"><?php if($res1['sM1']>0){echo $res1['sM1'];} ?>&nbsp;</td><td align="right" width="80"><?php if($res1['sM2']>0){echo $res1['sM2'];} ?>&nbsp;</td><td align="right" width="80"><?php if($res1['sM3']>0){echo $res1['sM3'];} ?>&nbsp;</td><td align="right" width="80"><?php if($res1['sM4']>0){echo $res1['sM4'];} ?>&nbsp;</td><td align="right" width="80"><?php if($res1['sM5']>0){echo $res1['sM5'];} ?>&nbsp;</td><td align="right" width="80"><?php if($res1['sM6']>0){echo $res1['sM6'];} ?>&nbsp;</td><td align="right" width="80"><?php if($res1['sM7']>0){echo $res1['sM7'];} ?>&nbsp;</td><td align="right" width="80"><?php if($res1['sM8']>0){echo $res1['sM8'];} ?>&nbsp;</td><td align="right" width="80"><?php if($res1['sM9']>0){echo $res1['sM9'];} ?>&nbsp;</td><td align="right" width="80"><?php if($res1['sM10']>0){echo $res1['sM10'];} ?>&nbsp;</td><td align="right" width="80"><?php if($res1['sM11']>0){echo $res1['sM11'];} ?>&nbsp;</td><td align="right" width="80"><?php if($res1['sM12']>0){echo $res1['sM12'];} ?>&nbsp;</td><td align="right" width="80"><b><?php if($res1Tot>0){echo $res1Tot;} ?></b>&nbsp;</td>
<?php /*	 <td align="right" width="80"><b><?php if($LakhNRV_1>0){echo $LakhNRV_1;} ?></b>&nbsp;</td>    */ ?>
  </tr> 
<?php } ?>   
 <tr bgcolor="#FFFFFF" style="height:22px;font-weight:bold;"> 
     <td colspan="3" align="right"><b>TOTAL:</b>&nbsp;</td>	   
<?php  if($_REQUEST['ii']>0){ $sql2 = mysql_query("select SUM(M1) as sM1,SUM(M2) as sM2,SUM(M3) as sM3,SUM(M4) as sM4,SUM(M5) as sM5,SUM(M6) as sM6,SUM(M7) as sM7,SUM(M8) as sM8,SUM(M9) as sM9,SUM(M10) as sM10,SUM(M11) as sM11,SUM(M12) as sM12 from hrm_sales_sal_details_".$_REQUEST['y']." where YearId=".$_REQUEST['y']." AND ItemId=".$_REQUEST['ii'], $con); }
      else
	  { if($_REQUEST['grp']==1 OR $_REQUEST['grp']==2){$sql2 = mysql_query("select SUM(M1) as sM1,SUM(M2) as sM2,SUM(M3) as sM3,SUM(M4) as sM4,SUM(M5) as sM5,SUM(M6) as sM6,SUM(M7) as sM7,SUM(M8) as sM8,SUM(M9) as sM9,SUM(M10) as sM10,SUM(M11) as sM11,SUM(M12) as sM12 from hrm_sales_sal_details_".$_REQUEST['y']." INNER JOIN hrm_sales_seedsitem ON hrm_sales_sal_details_".$_REQUEST['y'].".ItemId=hrm_sales_seedsitem.ItemId where hrm_sales_sal_details_".$_REQUEST['y'].".YearId=".$_REQUEST['y']." AND hrm_sales_seedsitem.GroupId=".$_REQUEST['grp'], $con);} if($_REQUEST['grp']==3){$sql2 = mysql_query("select SUM(M1) as sM1,SUM(M2) as sM2,SUM(M3) as sM3,SUM(M4) as sM4,SUM(M5) as sM5,SUM(M6) as sM6,SUM(M7) as sM7,SUM(M8) as sM8,SUM(M9) as sM9,SUM(M10) as sM10,SUM(M11) as sM11,SUM(M12) as sM12 from hrm_sales_sal_details_".$_REQUEST['y']." INNER JOIN hrm_sales_seedsitem ON hrm_sales_sal_details_".$_REQUEST['y'].".ItemId=hrm_sales_seedsitem.ItemId where YearId=".$_REQUEST['y'], $con); } 
	  } $res2=mysql_fetch_assoc($sql2); 
$res2Tot=$res2['sM1']+$res2['sM2']+$res2['sM3']+$res2['sM4']+$res2['sM5']+$res2['sM6']+$res2['sM7']+$res2['sM8']+$res2['sM9']+$res2['sM10']+$res2['sM11']+$res2['sM12']; ?>
	 <td align="right" width="80"><?php if($res2['sM1']>0){echo $res2['sM1'];} ?>&nbsp;</td><td align="right" width="80"><?php if($res2['sM2']>0){echo $res2['sM2'];} ?>&nbsp;</td><td align="right" width="80"><?php if($res2['sM3']>0){echo $res2['sM3'];} ?>&nbsp;</td><td align="right" width="80"><?php if($res2['sM4']>0){echo $res2['sM4'];} ?>&nbsp;</td><td align="right" width="80"><?php if($res2['sM5']>0){echo $res2['sM5'];} ?>&nbsp;</td><td align="right" width="80"><?php if($res2['sM6']>0){echo $res2['sM6'];} ?>&nbsp;</td><td align="right" width="80"><?php if($res2['sM7']>0){echo $res2['sM7'];} ?>&nbsp;</td><td align="right" width="80"><?php if($res2['sM8']>0){echo $res2['sM8'];} ?>&nbsp;</td><td align="right" width="80"><?php if($res2['sM9']>0){echo $res2['sM9'];} ?>&nbsp;</td><td align="right" width="80"><?php if($res2['sM10']>0){echo $res2['sM10'];} ?>&nbsp;</td><td align="right" width="80"><?php if($res2['sM11']>0){echo $res2['sM11'];} ?>&nbsp;</td><td align="right" width="80"><?php if($res2['sM12']>0){echo $res2['sM12'];} ?>&nbsp;</td><td align="right" width="80"><b><?php if($res2Tot>0){echo $res2Tot;} ?></b>&nbsp;</td>
  </tr> 	  	  
</table>	              
<?php } ?>
    </td>
   </tr>    	
  </table>
 </td>
</tr>
</table>

		
	  </td>
	</tr>
  </table>
 </td>
</tr>
</table>
</body>
</html>

</html>
