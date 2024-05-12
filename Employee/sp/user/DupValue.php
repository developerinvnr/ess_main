<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');}
include("../function.php");
include('codeEncDec.php');
if(check_user()==false){header('Location:../../../index.php');}
if($_SESSION['login'] = true){require_once('UserMenuSession.php');}
//**********************************************************************************************************************
if($_REQUEST['action']=='DelDupId' AND $_REQUEST['DupId']>0){  $sqlDel=mysql_query("delete from hrm_sales_sal_details_".$_REQUEST['yAchQ']." where SalDetailId=".$_REQUEST['DupId']." AND YearId=".$_REQUEST['yAchQ'],$con); }

elseif($_REQUEST['action']=='hq_DelDupId_hq' AND $_REQUEST['DupId']>0){ $sqlDel=mysql_query("delete from hrm_sales_sal_details_hq where HqRepDetailId=".$_REQUEST['DupId']." AND YearId=".$_REQUEST['yAchQ'],$con); }

elseif($_REQUEST['action']=='terr_DelDupId_terr' AND $_REQUEST['DupId']>0){ $sqlDel=mysql_query("delete from hrm_sales_sal_details_terr where TerrRepEmpID=".$_REQUEST['DupId']." AND YearId=".$_REQUEST['yAchQ'],$con); }

elseif($_REQUEST['action']=='area_DelDupId_area' AND $_REQUEST['DupId']>0){ $sqlDel=mysql_query("delete from hrm_sales_sal_details_area where AreaRepEmpID=".$_REQUEST['DupId']." AND YearId=".$_REQUEST['yAchQ'],$con); }

elseif($_REQUEST['action']=='region_DelDupId_region' AND $_REQUEST['DupId']>0){ $sqlDel=mysql_query("delete from hrm_sales_sal_details_region where RegionRepEmpID=".$_REQUEST['DupId']." AND YearId=".$_REQUEST['yAchQ'],$con); }

elseif($_REQUEST['action']=='zone_DelDupId_zone' AND $_REQUEST['DupId']>0){ $sqlDel=mysql_query("delete from hrm_sales_sal_details_zone where ZoneRepEmpID=".$_REQUEST['DupId']." AND YearId=".$_REQUEST['yAchQ'],$con); }

elseif($_REQUEST['action']=='gm_DelDupId_gm' AND $_REQUEST['DupId']>0){ $sqlDel=mysql_query("delete from hrm_sales_sal_details_gm where GmRepEmpID=".$_REQUEST['DupId']." AND YearId=".$_REQUEST['yAchQ'],$con); }
?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<Script type="text/javascript">window.history.forward(1);</Script>
<style> .font { color:#ffffff; font-family:Times New Roman;font-size:15px; width:200px;} 
.font1 { font-family:Times New Roman; font-size:12px; height:14px; width:200px; } 
.font2 { font-size:12px;width:260px;height:18px;} .font4 { color:#1FAD34; font-family:Georgia; font-size:15px;}
.span {display:none; font-family:Courier New; font-size:14px; }.span1 {display:block; font-family:Courier New; font-size:14px; }
.SaveButton {background-image:url(images/save.gif);width:20px;height:20px;background-repeat:no-repeat;background-color:#FFFFFF;border-color:#FFFFFF;border-bottom:inherit;}
.EditSelect { font-family:Georgia;font-size:12px; height:18px;}
.EditInput { font-family:Georgia;font-size:12px; height:22px;}
.CalenderButton {background-image:url(images/CalenderBtn.jpeg);width:16px;height:16px;background-color:#E0DBE3;border-color:#FFFFFF;}
</style>
<Script> 
function ChangrYearAchQ(yAchQ,mAchQ)
{ window.location="DupValue.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&rernr=09drfGe&ernS=eewwqq&yAchQ="+yAchQ+"&mAchQ="+mAchQ; }
</Script> 
</head>
<body class="body">
<?php 
echo '<input type="hidden" id="ci" value="'.$_REQUEST['ci'].'" />'; 
echo '<input type="hidden" id="c" value="'.$_REQUEST['c'].'" />';
echo '<input type="hidden" id="s" value="'.$_REQUEST['s'].'" />'; 
echo '<input type="hidden" id="hq" value="'.$_REQUEST['hq'].'" />';
echo '<input type="hidden" id="dil" value="'.$_REQUEST['dil'].'" />'; 
echo '<input type="hidden" id="grp" value="'.$_REQUEST['grp'].'" />';
echo '<input type="hidden" id="q" value="'.$_REQUEST['q'].'" />'; 
echo '<input type="hidden" id="ii" value="'.$_REQUEST['ii'].'" />';
?>
<table class="table">
<tr><td><table class="menutable"><tr><td><?php if($_SESSION['login'] = true){ require_once("EMenu.php"); } ?></td></tr></table></td></tr>
<tr>
 <td valign="top">
  <table width="100%" style="margin-top:0px;" border="0">
   <tr><td valign="top"><?php if($_SESSION['login'] = true){ require_once("EWelcome.php"); } ?></td></tr>
   <tr>
	<td valign="top" align="center" width="100%" id="MainWindow"><br>	  
    <table border="0" style="margin-top:0px;width:100%; height:300px;">
    <tr>
    <td width="10">&nbsp;</td>  
    <td align="left" id="type" valign="top" style="display:block; width:50%">             
     <table border="0" width="350">   
	 <tr>
	  <td class="heading">&nbsp;Duplicate Value:&nbsp;
	   <select style="font-size:12px;width:90px;height:20px;background-color:#DDFFBB;" name="yAchQ" id="yAchQ" onChange="ChangrYearAchQ(this.value,<?php echo $_REQUEST['mAchQ']; ?>)"> 
<?php $sqly=mysql_query("select FromDate,ToDate from hrm_sales_year where YearId=".$_REQUEST['yAchQ'], $con); $resy=mysql_fetch_assoc($sqly); 
      $fromdate=date("Y",strtotime($resy['FromDate'])); $todate=date("Y",strtotime($resy['ToDate']));  ?>		
         <option value="<?php echo $_REQUEST['yAchQ']; ?>" selected><?php echo $fromdate.'-'.$todate; ?></option>
<?php $sqly2=mysql_query("select * from hrm_sales_year order by YearId ASC", $con); while($resy2=mysql_fetch_assoc($sqly2)){ ?>		 
<?php if($resy2['YearId']!=$_REQUEST['yAchQ']){ //$resy2['YearId']<=$YearId AND  ?><option value="<?php echo $resy2['YearId']; ?>"><?php echo date("Y",strtotime($resy2['FromDate'])).'-'.date("Y",strtotime($resy2['ToDate'])); ?></option><?php } } ?>
		 </select>
	  </td>
	 </tr>
	 <tr>
	 <td align="left" width="1200">
	 <table width="1200" border="0"> 
<?php /*****************************************************************************/ ?>	
	<tr><td></td></tr>
	<?php //First ?>
	<tr>
	 <td><font style="font-size:14px;font-weight:bold;color:#FFFFFF;"><b>Dealer</b></font><br>
	   <table border="0">      
<?php $sql=mysql_query("SELECT COUNT(*) AS repetitions, `DealerId`, `ItemId` , `ProductId` FROM hrm_sales_sal_details_".$_REQUEST['yAchQ']." WHERE `YearId`=".$_REQUEST['yAchQ']." GROUP BY DealerId, ItemId, ProductId HAVING repetitions >1 ORDER BY YearId, DealerId ASC, ItemId ASC, ProductId ASC",$con);
while($res=mysql_fetch_assoc($sql)){ 
$sd=mysql_query("select DealerName from hrm_sales_dealer where DealerId=".$res['DealerId'],$con); $rd=mysql_fetch_assoc($sd);
$si=mysql_query("select ItemName from hrm_sales_seedsitem where ItemId=".$res['ItemId'],$con); $ri=mysql_fetch_assoc($si);
$sp=mysql_query("select ProductName from hrm_sales_seedsproduct where ProductId=".$res['ProductId'],$con); 
$rp=mysql_fetch_assoc($sp); ?>
        <tr>
		 <td colspan="6" style="font-size:14px;color:#FFFFFF;font-family:Georgia;"><?php echo 'Dup:&nbsp;'.$res['repetitions'].',&nbsp;Date:&nbsp;'.$fromdate.'-'.$todate.',&nbsp;Del:&nbsp;'.$rd['DealerName'].',&nbsp;Item:&nbsp;'.$ri['ItemName'].',&nbsp;Prod:&nbsp;'.$rp['ProductName']; ?></td>
		</tr>
		<tr>
		 <td align="left">
		  <table bgcolor="#FFF" border="1" cellspacing="0" cellspacing="1">
<?php $sql2=mysql_query("select SalDetailId from hrm_sales_sal_details_".$_REQUEST['yAchQ']." where DealerId=".$res['DealerId']." AND YearId=".$_REQUEST['yAchQ']." AND ItemId=".$res['ItemId']." AND ProductId=".$res['ProductId']." order by SalDetailId ASC",$con);
while($res2=mysql_fetch_assoc($sql2)){ ?>		  
		   <tr>
		    <td style="width:100px;font-size:12px;" align="center"><?php echo $res2['SalDetailId']; ?></td>
			<td style="width:50px;font-size:12px;" align="center"><span style="cursor:progress"><img src="images/delete.png" onClick="javascript:window.location='DupValue.php?action=DelDupId&ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&rernr=09drfGe&ernS=eewwqq&yAchQ=<?php echo $_REQUEST['yAchQ']; ?>&mAchQ=<?php echo $_REQUEST['mAchQ'];?>&DupId=<?php echo $res2['SalDetailId']; ?>'"/></span></td>
		   </tr>
<?php } ?>		   
		  </table>
		 </td>
		</tr>  
<?php } ?>		
	   </table>
	  </td>
	</tr>
	<?php //Seconds ?>
	<tr>
	 <td><font style="font-size:14px;font-weight:bold;color:#FFFFFF;">HQ</font><br>
	   <table border="0">      
<?php $sql=mysql_query("SELECT COUNT(*) AS repetitions, `HqEmpID`, `HqId`, `ItemId`, `ProductId`, `YearId` FROM hrm_sales_sal_details_hq
WHERE `YearId`=".$_REQUEST['yAchQ']." GROUP BY HqId, ItemId, ProductId HAVING repetitions >1 ORDER BY YearId, HqId ASC, ItemId ASC, ProductId ASC",$con);
while($res=mysql_fetch_assoc($sql)){ 
$shq=mysql_query("select HqName from hrm_headquater where HqId=".$res['HqId'],$con); $rhq=mysql_fetch_assoc($shq);
$si=mysql_query("select ItemName from hrm_sales_seedsitem where ItemId=".$res['ItemId'],$con); $ri=mysql_fetch_assoc($si);
$sp=mysql_query("select ProductName from hrm_sales_seedsproduct where ProductId=".$res['ProductId'],$con); 
$rp=mysql_fetch_assoc($sp); ?>
        <tr>
		 <td colspan="6" style="font-size:14px;color:#FFFFFF;font-family:Georgia;"><?php echo 'Dup:&nbsp;'.$res['repetitions'].',&nbsp;Date:&nbsp;'.$fromdate.'-'.$todate.',&nbsp;Del:&nbsp;'.$rhq['HqName'].',&nbsp;Item:&nbsp;'.$ri['ItemName'].',&nbsp;Prod:&nbsp;'.$rp['ProductName']; ?></td>
		</tr>
		<tr>
		 <td align="left">
		  <table bgcolor="#FFF" border="1" cellspacing="0" cellspacing="1">
<?php $sql2=mysql_query("select HqRepDetailId from hrm_sales_sal_details_hq where HqId=".$res['HqId']." AND YearId=".$_REQUEST['yAchQ']." AND ItemId=".$res['ItemId']." AND ProductId=".$res['ProductId']." order by HqRepDetailId ASC",$con);
while($res2=mysql_fetch_assoc($sql2)){ ?>		  
		   <tr>
		    <td style="width:100px;font-size:12px;" align="center"><?php echo $res2['HqRepDetailId']; ?></td>
			<td style="width:50px;font-size:12px;" align="center"><span style="cursor:progress"><img src="images/delete.png" onClick="javascript:window.location='DupValue.php?action=hq_DelDupId_hq&ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&rernr=09drfGe&ernS=eewwqq&yAchQ=<?php echo $_REQUEST['yAchQ']; ?>&mAchQ=<?php echo $_REQUEST['mAchQ'];?>&DupId=<?php echo $res2['HqRepDetailId']; ?>'"/></span></td>
		   </tr>
<?php } ?>		   
		  </table>
		 </td>
		</tr>  
<?php } ?>		
	   </table>
	  </td>
	</tr>
	<?php //Third ?>
	<tr>
	 <td><font style="font-size:14px;font-weight:bold;color:#FFFFFF;">Territorry</font><br>
	   <table border="0">      
<?php $sql=mysql_query("SELECT COUNT(*) AS repetitions, `TerrHqID`, `ItemId`, `ProductId`, `YearId` FROM hrm_sales_sal_details_terr
WHERE `YearId`=".$_REQUEST['yAchQ']." GROUP BY TerrHqID, ItemId, ProductId HAVING repetitions >1 ORDER BY YearId, TerrHqID ASC, ItemId ASC, ProductId ASC",$con);
while($res=mysql_fetch_assoc($sql)){ 
$si=mysql_query("select ItemName from hrm_sales_seedsitem where ItemId=".$res['ItemId'],$con); $ri=mysql_fetch_assoc($si);
$sp=mysql_query("select ProductName from hrm_sales_seedsproduct where ProductId=".$res['ProductId'],$con); 
$rp=mysql_fetch_assoc($sp); ?>
        <tr>
		 <td colspan="6" style="font-size:14px;color:#FFFFFF;font-family:Georgia;"><?php echo 'Dup:&nbsp;'.$res['repetitions'].',&nbsp;Date:&nbsp;'.$fromdate.'-'.$todate.',&nbsp;Del:&nbsp;'.$res['TerrHqID'].',&nbsp;Item:&nbsp;'.$ri['ItemName'].',&nbsp;Prod:&nbsp;'.$rp['ProductName']; ?></td>
		</tr>
		<tr>
		 <td align="left">
		  <table bgcolor="#FFF" border="1" cellspacing="0" cellspacing="1">
<?php $sql2=mysql_query("select TerrRepEmpID from hrm_sales_sal_details_terr where TerrHqID=".$res['TerrHqID']." AND YearId=".$_REQUEST['yAchQ']." AND ItemId=".$res['ItemId']." AND ProductId=".$res['ProductId']." order by TerrRepEmpID ASC",$con);
while($res2=mysql_fetch_assoc($sql2)){ ?>		  
		   <tr>
		    <td style="width:100px;font-size:12px;" align="center"><?php echo $res2['TerrRepEmpID']; ?></td>
			<td style="width:50px;font-size:12px;" align="center"><span style="cursor:progress"><img src="images/delete.png" onClick="javascript:window.location='DupValue.php?action=terr_DelDupId_terr&ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&rernr=09drfGe&ernS=eewwqq&yAchQ=<?php echo $_REQUEST['yAchQ']; ?>&mAchQ=<?php echo $_REQUEST['mAchQ'];?>&DupId=<?php echo $res2['TerrRepEmpID']; ?>'"/></span></td>
		   </tr>
<?php } ?>		   
		  </table>
		 </td>
		</tr>  
<?php } ?>		
	   </table>
	  </td>
	</tr>
	<?php //Area ?>
	<tr>
	 <td><font style="font-size:14px;font-weight:bold;color:#FFFFFF;">Area</font><br>
	   <table border="0">      
<?php $sql=mysql_query("SELECT COUNT(*) AS repetitions, `AreaEmpID`, `ItemId`, `ProductId`, `YearId` FROM hrm_sales_sal_details_area
WHERE `YearId`=".$_REQUEST['yAchQ']." GROUP BY AreaEmpID, ItemId, ProductId HAVING repetitions >1 ORDER BY YearId, AreaEmpID ASC, ItemId ASC, ProductId ASC",$con);
while($res=mysql_fetch_assoc($sql)){ 
$si=mysql_query("select ItemName from hrm_sales_seedsitem where ItemId=".$res['ItemId'],$con); $ri=mysql_fetch_assoc($si);
$sp=mysql_query("select ProductName from hrm_sales_seedsproduct where ProductId=".$res['ProductId'],$con); 
$rp=mysql_fetch_assoc($sp); ?>
        <tr>
		 <td colspan="6" style="font-size:14px;color:#FFFFFF;font-family:Georgia;"><?php echo 'Dup:&nbsp;'.$res['repetitions'].',&nbsp;Date:&nbsp;'.$fromdate.'-'.$todate.',&nbsp;Del:&nbsp;'.$res['AreaEmpID'].',&nbsp;Item:&nbsp;'.$ri['ItemName'].',&nbsp;Prod:&nbsp;'.$rp['ProductName']; ?></td>
		</tr>
		<tr>
		 <td align="left">
		  <table bgcolor="#FFF" border="1" cellspacing="0" cellspacing="1">
<?php $sql2=mysql_query("select AreaRepEmpID from hrm_sales_sal_details_area where AreaEmpID=".$res['AreaEmpID']." AND YearId=".$_REQUEST['yAchQ']." AND ItemId=".$res['ItemId']." AND ProductId=".$res['ProductId']." order by AreaRepEmpID ASC",$con);
while($res2=mysql_fetch_assoc($sql2)){ ?>		  
		   <tr>
		    <td style="width:100px;font-size:12px;" align="center"><?php echo $res2['AreaRepEmpID']; ?></td>
			<td style="width:50px;font-size:12px;" align="center"><span style="cursor:progress"><img src="images/delete.png" onClick="javascript:window.location='DupValue.php?action=area_DelDupId_area&ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&rernr=09drfGe&ernS=eewwqq&yAchQ=<?php echo $_REQUEST['yAchQ']; ?>&mAchQ=<?php echo $_REQUEST['mAchQ'];?>&DupId=<?php echo $res2['AreaRepEmpID']; ?>'"/></span></td>
		   </tr>
<?php } ?>		   
		  </table>
		 </td>
		</tr>  
<?php } ?>		
	   </table>
	  </td>
	</tr>
	<?php //region ?>
	<tr>
	 <td><font style="font-size:14px;font-weight:bold;color:#FFFFFF;">Region</font><br>
	   <table border="0">      
<?php $sql=mysql_query("SELECT COUNT(*) AS repetitions, `RegionEmpID`, `ItemId`, `ProductId`, `YearId` FROM hrm_sales_sal_details_region
WHERE `YearId`=".$_REQUEST['yAchQ']." GROUP BY RegionEmpID, ItemId, ProductId HAVING repetitions >1 ORDER BY YearId, RegionEmpID ASC, ItemId ASC, ProductId ASC",$con);
while($res=mysql_fetch_assoc($sql)){ 
$si=mysql_query("select ItemName from hrm_sales_seedsitem where ItemId=".$res['ItemId'],$con); $ri=mysql_fetch_assoc($si);
$sp=mysql_query("select ProductName from hrm_sales_seedsproduct where ProductId=".$res['ProductId'],$con); 
$rp=mysql_fetch_assoc($sp); ?>
        <tr>
		 <td colspan="6" style="font-size:14px;color:#FFFFFF;font-family:Georgia;"><?php echo 'Dup:&nbsp;'.$res['repetitions'].',&nbsp;Date:&nbsp;'.$fromdate.'-'.$todate.',&nbsp;Del:&nbsp;'.$res['RegionEmpID'].',&nbsp;Item:&nbsp;'.$ri['ItemName'].',&nbsp;Prod:&nbsp;'.$rp['ProductName']; ?></td>
		</tr>
		<tr>
		 <td align="left">
		  <table bgcolor="#FFF" border="1" cellspacing="0" cellspacing="1">
<?php $sql2=mysql_query("select RegionRepEmpID from hrm_sales_sal_details_region where RegionEmpID=".$res['RegionEmpID']." AND YearId=".$_REQUEST['yAchQ']." AND ItemId=".$res['ItemId']." AND ProductId=".$res['ProductId']." order by RegionRepEmpID ASC",$con);
while($res2=mysql_fetch_assoc($sql2)){ ?>		  
		   <tr>
		    <td style="width:100px;font-size:12px;" align="center"><?php echo $res2['RegionRepEmpID']; ?></td>
			<td style="width:50px;font-size:12px;" align="center"><span style="cursor:progress"><img src="images/delete.png" onClick="javascript:window.location='DupValue.php?action=region_DelDupId_region&ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&rernr=09drfGe&ernS=eewwqq&yAchQ=<?php echo $_REQUEST['yAchQ']; ?>&mAchQ=<?php echo $_REQUEST['mAchQ'];?>&DupId=<?php echo $res2['RegionRepEmpID']; ?>'"/></span></td>
		   </tr>
<?php } ?>		   
		  </table>
		 </td>
		</tr>  
<?php } ?>		
	   </table>
	  </td>
	</tr>
	<?php //region ?>
	<tr>
	 <td><font style="font-size:14px;font-weight:bold;color:#FFFFFF;">Zone</font><br>
	   <table border="0">      
<?php $sql=mysql_query("SELECT COUNT(*) AS repetitions, `ZoneEmpID`, `ItemId`, `ProductId`, `YearId` FROM hrm_sales_sal_details_zone
WHERE `YearId`=".$_REQUEST['yAchQ']." GROUP BY ZoneEmpID, ItemId, ProductId HAVING repetitions >1 ORDER BY YearId, ZoneEmpID ASC, ItemId ASC, ProductId ASC",$con);
while($res=mysql_fetch_assoc($sql)){ 
$si=mysql_query("select ItemName from hrm_sales_seedsitem where ItemId=".$res['ItemId'],$con); $ri=mysql_fetch_assoc($si);
$sp=mysql_query("select ProductName from hrm_sales_seedsproduct where ProductId=".$res['ProductId'],$con); 
$rp=mysql_fetch_assoc($sp); ?>
        <tr>
		 <td colspan="6" style="font-size:14px;color:#FFFFFF;font-family:Georgia;"><?php echo 'Dup:&nbsp;'.$res['repetitions'].',&nbsp;Date:&nbsp;'.$fromdate.'-'.$todate.',&nbsp;Del:&nbsp;'.$res['ZoneEmpID'].',&nbsp;Item:&nbsp;'.$ri['ItemName'].',&nbsp;Prod:&nbsp;'.$rp['ProductName']; ?></td>
		</tr>
		<tr>
		 <td align="left">
		  <table bgcolor="#FFF" border="1" cellspacing="0" cellspacing="1">
<?php $sql2=mysql_query("select ZoneRepEmpID from hrm_sales_sal_details_zone where ZoneEmpID=".$res['ZoneEmpID']." AND YearId=".$_REQUEST['yAchQ']." AND ItemId=".$res['ItemId']." AND ProductId=".$res['ProductId']." order by ZoneRepEmpID ASC",$con);
while($res2=mysql_fetch_assoc($sql2)){ ?>		  
		   <tr>
		    <td style="width:100px;font-size:12px;" align="center"><?php echo $res2['ZoneRepEmpID']; ?></td>
			<td style="width:50px;font-size:12px;" align="center"><span style="cursor:progress"><img src="images/delete.png" onClick="javascript:window.location='DupValue.php?action=zone_DelDupId_zone&ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&rernr=09drfGe&ernS=eewwqq&yAchQ=<?php echo $_REQUEST['yAchQ']; ?>&mAchQ=<?php echo $_REQUEST['mAchQ'];?>&DupId=<?php echo $res2['ZoneRepEmpID']; ?>'"/></span></td>
		   </tr>
<?php } ?>		   
		  </table>
		 </td>
		</tr>  
<?php } ?>		
	   </table>
	  </td>
	</tr>		
	<?php //GM ?>
	<tr>
	 <td><font style="font-size:14px;font-weight:bold;color:#FFFFFF;">GM</font><br>
	   <table border="0">      
<?php $sql=mysql_query("SELECT COUNT(*) AS repetitions, `GmEmpID`, `ItemId`, `ProductId`, `YearId` FROM hrm_sales_sal_details_gm
WHERE `YearId`=".$_REQUEST['yAchQ']." GROUP BY GmEmpID, ItemId, ProductId HAVING repetitions >1 ORDER BY YearId, GmEmpID ASC, ItemId ASC, ProductId ASC",$con);
while($res=mysql_fetch_assoc($sql)){ 
$si=mysql_query("select ItemName from hrm_sales_seedsitem where ItemId=".$res['ItemId'],$con); $ri=mysql_fetch_assoc($si);
$sp=mysql_query("select ProductName from hrm_sales_seedsproduct where ProductId=".$res['ProductId'],$con); 
$rp=mysql_fetch_assoc($sp); ?>
        <tr>
		 <td colspan="6" style="font-size:14px;color:#FFFFFF;font-family:Georgia;"><?php echo 'Dup:&nbsp;'.$res['repetitions'].',&nbsp;Date:&nbsp;'.$fromdate.'-'.$todate.',&nbsp;Del:&nbsp;'.$res['GmEmpID'].',&nbsp;Item:&nbsp;'.$ri['ItemName'].',&nbsp;Prod:&nbsp;'.$rp['ProductName']; ?></td>
		</tr>
		<tr>
		 <td align="left">
		  <table bgcolor="#FFF" border="1" cellspacing="0" cellspacing="1">
<?php $sql2=mysql_query("select GmRepEmpID from hrm_sales_sal_details_gm where GmEmpID=".$res['GmEmpID']." AND YearId=".$_REQUEST['yAchQ']." AND ItemId=".$res['ItemId']." AND ProductId=".$res['ProductId']." order by GmRepEmpID ASC",$con);
while($res2=mysql_fetch_assoc($sql2)){ ?>		  
		   <tr>
		    <td style="width:100px;font-size:12px;" align="center"><?php echo $res2['GmRepEmpID']; ?></td>
			<td style="width:50px;font-size:12px;" align="center"><span style="cursor:progress"><img src="images/delete.png" onClick="javascript:window.location='DupValue.php?action=gm_DelDupId_gm&ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&rernr=09drfGe&ernS=eewwqq&yAchQ=<?php echo $_REQUEST['yAchQ']; ?>&mAchQ=<?php echo $_REQUEST['mAchQ'];?>&DupId=<?php echo $res2['GmRepEmpID']; ?>'"/></span></td>
		   </tr>
<?php } ?>		   
		  </table>
		 </td>
		</tr>  
<?php } ?>		
	   </table>
	  </td>
	</tr>
	
	<tr><td></td></tr>        
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
