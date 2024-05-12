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
  window.location="ProPlan.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y="+YearV+"&ci="+ci+"&grp="+CropGrp+"&ii="+ii; 
}
function ClickGrp(CropGrp)
{
  var YearV=document.getElementById("YearV").value; var ii=0; var ci=document.getElementById("ComId").value;
  window.location="ProPlan.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y="+YearV+"&ci="+ci+"&grp="+CropGrp+"&ii="+ii; 
}
function ChangeII(ii)
{
  var YearV=document.getElementById("YearV").value; var CropGrp=document.getElementById("CropGrp").value; var ci=document.getElementById("ComId").value;
  window.location="ProPlan.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y="+YearV+"&ci="+ci+"&grp="+CropGrp+"&ii="+ii; 
}

function PrintSpR()
{ var YearV=document.getElementById("YearV").value; var CropGrp=document.getElementById("CropGrp").value; var ci=document.getElementById("ComId").value;
  var ii=document.getElementById("ItemV").value; 
  window.open("SalesPlanRPrint.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y="+YearV+"&ci="+ci+"&grp="+CropGrp+"&ii="+ii,"PrintForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=100,height=100");
}

function editD(p,s,f)
{ document.getElementById("E"+s+"_"+f).style.display='none'; document.getElementById("S"+s+"_"+f).style.display='block'; 
  document.getElementById("Pa"+s+"_"+f).readOnly=false;
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
<table border="0" style="margin-top:0px; width:100%; height:150px;">	
<tr>
 <td valign="top">
  <table border="0">
   <tr>
    <td id="Entry" valign="top" style="width:900px; ">
	<span id="TabEntry">
     <table border="0">
      <tr>
	    <td style="margin-top:0px;width:200px;" class="heading" align="center"><u>Plan</u></td>
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
		<td style="font-size:11px;height:18px;width:80px;color:#E6E6E6;" align="right"><b>Name :</b></td>
	     <td>
		 <select style="font-size:12px;width:120px;height:20px;background-color:#DDFFBB;" name="ItemV" id="ItemV" onChange="ChangeII(this.value)">
<?php if($_REQUEST['ii']>0){ $sqlI=mysql_query("select ItemName from hrm_sales_seedsitem where ItemId=".$_REQUEST['ii'], $con); $resI=mysql_fetch_assoc($sqlI); ?>	
         <option value="<?php echo $_REQUEST['ii']; ?>" selected><?php echo strtoupper($resI['ItemName']); ?></option>
		 <?php }else{ ?><option value="0" selected>SELECT</option><?php } ?>
<?php if($_REQUEST['grp']==1){ $sqlItem=mysql_query("select * from hrm_sales_seedsitem where GroupId=1 order by ItemName ASC", $con);}
      elseif($_REQUEST['grp']==2){ $sqlItem=mysql_query("select * from hrm_sales_seedsitem where GroupId=2 order by ItemName ASC", $con);}
      elseif($_REQUEST['grp']==3){ $sqlItem=mysql_query("select * from hrm_sales_seedsitem where (GroupId=1 OR GroupId=2) order by GroupId ASC,ItemName ASC", $con);}
	  while($resItem=mysql_fetch_assoc($sqlItem)){ ?><option value="<?php echo $resItem['ItemId']; ?>"><?php echo $resItem['ItemName']; ?></option><?php } ?>
	     </select>	  
		 </td>
		 <td>&nbsp;</td>
		 <td style="font-size:11px; height:18px;width:80px;color:#E6E6E6;" align="center"><a href="#" <?php //onClick="PrintSpR()" ?> style="color:#FFCE9D;"><b>PRINT</b></a></td>
	  </tr>
	   </table>
      </td>
   </tr>
  </table>
  </td>
  </tr>
  <tr>
    <td colspan="3" valign="top">
<?php if($_REQUEST['grp']>0){ 
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
<table border="1" cellpadding="0" cellspacing="0" style="font-family:Times New Roman;font-size:14px;width:2000px; vertical-align:top;">	
  <tr style="background-color:#D5F1D1;color:#000000;">  
    <td colspan="5" align="center" style="width:120px;"><b>Details</b></td>
	<td colspan="12" align="center" style="width:150px;"><b>Month(Year:<?php echo $y3; ?>)</b></td>
	<td align="center" style="width:150px;"><b>Year:<?php echo $y4; ?></b></td>
	<td align="center" style="width:150px;"><b>Year:<?php echo $y5; ?></b></td>
 </tr>
   <tr style="background-color:#D5F1D1;color:#000000;">  
    <td align="center" style="width:120px;"><b>CROP</b></td>
	<td align="center" style="width:150px;"><b>VARIETY</b></td>
	<td align="center" style="width:50px;"><b>&nbsp;TYPE&nbsp;</b></td>
	<td align="center" style="width:100px;"><b>SEASON</b></td>
	<td align="center" style="width:100px;"><b>Tot AREA(Acr)</b></td>
	<td align="center" width="80"><b>APR-<?php echo $my1;?></b></td><td align="center" width="80"><b>MAY-<?php echo $my1;?></b></td><td align="center" width="80"><b>JUN-<?php echo $my1;?></b></td><td align="center" width="80"><b>JUL-<?php echo $my1;?></b></td><td align="center" width="80"><b>AUG-<?php echo $my1;?></b></td><td align="center" width="80"><b>SEP-<?php echo $my1;?></b></td><td align="center" width="80"><b>OCT-<?php echo $my1;?></b></td><td align="center" width="80"><b>NOV-<?php echo $my1;?></b></td><td align="center" width="80"><b>DEC-<?php echo $my1;?></b></td><td align="center" width="80"><b>JAN-<?php echo $my2;?></b></td><td align="center" width="80"><b>FEB-<?php echo $my2;?></b></td><td align="center" width="80"><b>MAR-<?php echo $my2;?></b></td>
  </tr>	
 <?php if($_REQUEST['ii']>0){$sql = mysql_query("select hrm_sales_seedsproduct.ItemId,ProductId,ProductName,ItemName,TypeName from hrm_sales_seedsproduct INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId INNER JOIN hrm_sales_seedtype ON hrm_sales_seedsproduct.TypeId=hrm_sales_seedtype.TypeId where hrm_sales_seedsitem.ItemId=".$_REQUEST['ii']." order by ItemName ASC, TypeName ASC, ProductName ASC", $con); }
      else
	  { if($_REQUEST['grp']==1 OR $_REQUEST['grp']==2){$sql = mysql_query("select hrm_sales_seedsproduct.ItemId,ProductId,ProductName,ItemName,TypeName from hrm_sales_seedsproduct INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId INNER JOIN hrm_sales_seedtype ON hrm_sales_seedsproduct.TypeId=hrm_sales_seedtype.TypeId where hrm_sales_seedsitem.GroupId=".$_REQUEST['grp']." order by ItemName ASC, TypeName ASC, ProductName ASC", $con);} if($_REQUEST['grp']==3){$sql = mysql_query("select hrm_sales_seedsproduct.ItemId,ProductId,ProductName,ItemName,TypeName from hrm_sales_seedsproduct INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId INNER JOIN hrm_sales_seedtype ON hrm_sales_seedsproduct.TypeId=hrm_sales_seedtype.TypeId order by hrm_sales_seedsitem.GroupId ASC, ItemName ASC, TypeName ASC, ProductName ASC", $con); }
	  } 
	  $sqlSe=mysql_query("select SeasonId from hrm_sales_season where GroupId=1",$con); $rowSe=mysql_num_rows($sqlSe);
	  $Sn=1; while($res=mysql_fetch_array($sql)){ for($i=1; $i<=$rowSe; $i++){ ?>  
  
   <tr bgcolor="#FFFFFF" style="height:22px;background-color:<?php if($i==1){echo '#E2F3D8'; }?>;">  
     <td bgcolor="<?php if($i==1){echo '#B8E29C';}?>">&nbsp;<?php if($i==1){echo $res['ItemName'];} ?></td>	 
     <td bgcolor="<?php if($i==1){echo '#B8E29C';}?>">&nbsp;<?php if($i==1){echo $res['ProductName'];} ?></td>
     <td bgcolor="<?php if($i==1){echo '#B8E29C';}?>" align="center">&nbsp;<?php if($i==1){echo substr_replace($res['TypeName'],'',2);}?></td>
<?php if($i==1){ ?>	 
	 <td align="center"><b>SEASON_1</b></td>
<?php if($_REQUEST['grp']==1){$s=1;}elseif($_REQUEST['grp']==2){$s=4;}elseif($_REQUEST['grp']==3){$sqlG=mysql_query("select GroupId from hrm_sales_seedsitem INNER JOIN hrm_sales_seedsproduct ON hrm_sales_seedsitem.ItemId=hrm_sales_seedsproduct.ItemId where hrm_sales_seedsproduct.ItemId=".$res['ItemId'],$con); $resG=mysql_fetch_assoc($sqlG); if($resG['GroupId']==1){$s=1;}else{$s=4;}} 
$sqlA1=mysql_query("select SUM(Acreage) as TotArea from hrm_sales_farmer INNER JOIN hrm_sales_product_details ON hrm_sales_farmer.AreaId=hrm_sales_product_details.AreaId where hrm_sales_product_details.ProductId=".$res['ProductId']." AND hrm_sales_product_details.SeasonId=".$s,$con); $resA1=mysql_fetch_assoc($sqlA1);  ?>	 
	 <td align="right"><?php echo $resA1['TotArea']; ?>&nbsp;</td>
	 <td align="center">4</td>
	 <td align="center">5</td>
	 <td align="center">6</td>
	 <td align="center">7</td>
	 <td align="center">8</td>
	 <td align="center">9</td>
	 <td align="center">10</td>
	 <td align="center">11</td>
	 <td align="center">12</td>
	 <td align="center">1</td>
	 <td align="center">2</td>
	 <td align="center">3</td>
<?php } elseif($i==2){ ?>	 
	 <td align="center"><b>SEASON_2</b></td>
<?php if($_REQUEST['grp']==1){$s=2;}elseif($_REQUEST['grp']==2){$s=5;}elseif($_REQUEST['grp']==3){$sqlG=mysql_query("select GroupId from hrm_sales_seedsitem INNER JOIN hrm_sales_seedsproduct ON hrm_sales_seedsitem.ItemId=hrm_sales_seedsproduct.ItemId where hrm_sales_seedsproduct.ItemId=".$res['ItemId'],$con); $resG=mysql_fetch_assoc($sqlG); if($resG['GroupId']==1){$s=2;}else{$s=5;}} 
$sqlA1=mysql_query("select SUM(Acreage) as TotArea from hrm_sales_farmer INNER JOIN hrm_sales_product_details ON hrm_sales_farmer.AreaId=hrm_sales_product_details.AreaId where hrm_sales_product_details.ProductId=".$res['ProductId']." AND hrm_sales_product_details.SeasonId=".$s,$con); $resA1=mysql_fetch_assoc($sqlA1);  ?>	 
	 <td align="right"><?php echo $resA1['TotArea']; ?>&nbsp;</td>
	 <td align="center">4</td>
	 <td align="center">5</td>
	 <td align="center">6</td>
	 <td align="center">7</td>
	 <td align="center">8</td>
	 <td align="center">9</td>
	 <td align="center">10</td>
	 <td align="center">11</td>
	 <td align="center">12</td>
	 <td align="center">1</td>
	 <td align="center">2</td>
	 <td align="center">3</td>
<?php } elseif($i==3){ ?>	 
	 <td align="center"><b>SEASON_3</b></td>
<?php if($_REQUEST['grp']==1){$s=3;}elseif($_REQUEST['grp']==2){$s=6;}elseif($_REQUEST['grp']==3){$sqlG=mysql_query("select GroupId from hrm_sales_seedsitem INNER JOIN hrm_sales_seedsproduct ON hrm_sales_seedsitem.ItemId=hrm_sales_seedsproduct.ItemId where hrm_sales_seedsproduct.ItemId=".$res['ItemId'],$con); $resG=mysql_fetch_assoc($sqlG); if($resG['GroupId']==1){$s=3;}else{$s=6;}} 
$sqlA1=mysql_query("select SUM(Acreage) as TotArea from hrm_sales_farmer INNER JOIN hrm_sales_product_details ON hrm_sales_farmer.AreaId=hrm_sales_product_details.AreaId where hrm_sales_product_details.ProductId=".$res['ProductId']." AND hrm_sales_product_details.SeasonId=".$s,$con); $resA1=mysql_fetch_assoc($sqlA1);  ?>	 
	 <td align="right"><?php echo $resA1['TotArea']; ?>&nbsp;</td>
	 <td align="center">4</td>
	 <td align="center">5</td>
	 <td align="center">6</td>
	 <td align="center">7</td>
	 <td align="center">8</td>
	 <td align="center">9</td>
	 <td align="center">10</td>
	 <td align="center">11</td>
	 <td align="center">12</td>
	 <td align="center">1</td>
	 <td align="center">2</td>
	 <td align="center">3</td>
<?php } ?>	 
  </tr>	
<?php } }?>  	  
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
