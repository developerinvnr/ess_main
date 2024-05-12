<?php session_start();
if($_SESSION['login'] = true){require_once('../user/config/config.php');}
include("../function.php");
if(check_user()==false){header('Location:../../../index.php');}
?>

<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<style> /*background-color:#D9D9FF;  background-color:#EEEEEE; */
.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;}
.SaveButton {background-image:url(images/save.gif); width:20px; height:20px; background-repeat:no-repeat; background-color:#FFFFFF; border-color:#FFFFFF; border-bottom:inherit;}
.EditSelect { font-family:Georgia; font-size:12px; height:18px;}
.EditInput { font-family:Georgia; font-size:12px; height:18px;}
.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}
.InputB{font-size:12px;width:65px;text-align:right;border:0px;font-weight:bold;background-color:#D9D9FF;} 
.Input{font-size:12px;width:60px;text-align:right;border:0px;background-color:#EEEEEE;}
.TInput{font-size:12px;width:60px;text-align:right;border:0px;background-color:#FFFFA6;font-weight:bold;}
.Trh60{text-align:center;width:60px;font-weight:bold;font-size:12px;}
.Trh50{text-align:center;width:50px;font-weight:bold;font-size:12px;}
.inner_table { height:400px;overflow-y:auto;width:auto; }
</style>
<Script type="text/javascript">//window.history.forward(1);</Script> 
<script type="text/javascript" language="javascript">
function ChangeTT(v)  //+'&crop=0'
{  
 if(document.getElementById("CropV").value==0){alert("Please Select Crop Value"); return false; }
 else{ window.location="SalesDetails.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&act="+document.getElementById("act").value+"&hq="+document.getElementById("hq").value+"&y="+document.getElementById("YearV").value+"&q="+document.getElementById("q").value+"&ii="+document.getElementById("ItemV").value+"&vc="+document.getElementById("vc").value+"&fc="+document.getElementById("fc").value+"&cc="+document.getElementById("cc").value+"&di="+document.getElementById("di").value+"&gi="+document.getElementById("gi").value+'&EHq='+document.getElementById("EHq").value+'&myh='+document.getElementById("myh").value+'&myt='+document.getElementById("myt").value+'&mainv='+v+'&crop='+document.getElementById("CropV").value+'&findV=TT'; }
}


/*function ChangeCrop(v) 
{  
 if(document.getElementById("CropV").value==0){alert("Please Select Crop Value"); return false; }
 else{ var ii=0; window.location="SalesDetails.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&act="+document.getElementById("act").value+"&hq="+document.getElementById("hq").value+"&y="+document.getElementById("YearV").value+"&q="+document.getElementById("q").value+"&ii="+ii+"&vc="+document.getElementById("vc").value+"&fc="+document.getElementById("fc").value+"&cc="+document.getElementById("cc").value+"&di="+document.getElementById("di").value+"&gi="+document.getElementById("gi").value+'&EHq='+document.getElementById("EHq").value+'&myh='+document.getElementById("myh").value+'&myt='+document.getElementById("myt").value+'&mainv='+v+'&crop='+document.getElementById("CropV").value+'&findV=TT'; }
}*/

function ClickFSL1(e,y)
{
 var ActSn=document.getElementById("ActualSn").value; 
 if(ActSn>0)
 {
  for(var i=1; i<=ActSn; i++)
  { var va1=parseFloat(document.getElementById("TotP2_"+i).value); 
    var va2=parseFloat(document.getElementById("STotP2_"+i).value);
	var vb1=parseFloat(document.getElementById("TotP3_"+i).value); 
	var vb2=parseFloat(document.getElementById("STotP3_"+i).value);  
	if(va1<va2 || va1>va2 || vb1<vb2 || vb1>vb2){ var pn=document.getElementById("PN_"+i).value; alert("Please check "+pn+" total value, your "+pn+" total value should be there equal from revised values"); return false;	}
  }
 }
   var win = window.open("SbOpenFile.php?CheckAct=Fsb1&y="+y+"&e="+e,"QForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=620,height=200");
   var timer = setInterval( function() { if(win.closed) { clearInterval(timer); window.location="SalesDetails.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&act="+document.getElementById("act").value+"&hq="+document.getElementById("hq").value+"&y="+document.getElementById("YearV").value+"&q="+document.getElementById("q").value+"&ii="+document.getElementById("ItemV").value+"&vc="+document.getElementById("vc").value+"&fc="+document.getElementById("fc").value+"&cc="+document.getElementById("cc").value+"&di="+document.getElementById("di").value+"&gi="+document.getElementById("gi").value+'&EHq='+document.getElementById("EHq").value+'&myh='+document.getElementById("myh").value+'&myt='+document.getElementById("myt").value+'&mainv='+e+'&crop='+document.getElementById("CropV").value+'&findV=TT'; } }, 1000);
}
</script> 

</head>
<body class="body">  
<table class="table">
<tr>
 <td>
 <table class="menutable"><tr><td><?php if($_SESSION['login'] = true){ require_once("EMenu.php"); } ?></td></tr></table> 
 </td>
</tr>
<tr>
 <td>
  <table width="100%" style="margin-top:0px;">
    <tr>
	  <td valign="top"><?php if($_SESSION['login'] = true){ require_once("EWelcome.php"); } ?></td>
	</tr>
	 <tr>
	  <td valign="top">
	     <table border="0" style="width:100%; height:380px; float:none;" cellpadding="0">
		  <tr>
		   <td valign="top"> 
		   
<?php //******************************************************************************** ?>	   
		     <table border="0" id="Activity">
			  <tr>
			     <td id="Anni" valign="top" style="width:5px;"></td>
				 <td colspan="2" width="100%" valign="top">
				  <table border="0">
<?php //********************************* Start ******************************** ?>		
<?php $SpP=mysql_query("select GradeId,DepartmentId,HqId from hrm_employee_general where EmployeeID=".$EmployeeId, $con);
$resSpP=mysql_fetch_assoc($SpP); $SpEG=mysql_query("select GradeValue from hrm_grade where CompanyId=".$CompanyId." AND GradeId=".$resSpP['GradeId'], $con);  $resSpEG=mysql_fetch_assoc($SpEG); ?>		
<input type="hidden" name="ComId" id="ComId" value="<?php echo $CompanyId; ?>" /><input type="hidden" id="EmpId" name="EmpId" value="<?php echo $EmployeeId; ?>" /><input type="hidden" id="act" value="<?php echo $_REQUEST['act']; ?>" /><input type="hidden" name="y" id="y" value="<?php echo $_REQUEST['y']; ?>" /><input type="hidden" name="hq" id="hq" value="<?php echo $_REQUEST['hq']; ?>" /><input type="hidden" name="q" id="q" value="<?php echo $_REQUEST['q']; ?>" /><input type="hidden" name="vc" id="vc" value="<?php echo $_REQUEST['vc']; ?>" /><input type="hidden" name="fc" id="fc" value="<?php echo $_REQUEST['fc']; ?>" /><input type="hidden" id="di" value="<?php echo $_REQUEST['di']; ?>" /><input type="hidden" id="gi" value="<?php echo $_REQUEST['gi']; ?>" /><input type="hidden" id="cc" value="<?php echo $_REQUEST['cc']; ?>" /><input type="hidden" id="ActThought" value="0" /><input type="hidden" id="ii" value="<?php echo $_REQUEST['ii']; ?>" /><input type="hidden" id="EHq" value="<?php echo $_REQUEST['EHq']; ?>" /> <input type="hidden" id="TotAValueM" value="" /><input type="hidden" id="TotBValueM" value="" /><input type="hidden" id="TotCValueM" value="" /><input type="hidden" id="MainSelTerrId" value="" /><input type="hidden" id="Sno" value="" /><input type="hidden" id="myh" value="<?php echo $_REQUEST['myh']; ?>" /><input type="hidden" id="myt" value="<?php echo $_REQUEST['myt']; ?>" /><input type="hidden" id="HqV" value="<?php echo $_REQUEST['hq']; ?>" /><input type="hidden" id="sgi" value="" />
<tr>
 <td colspan="5"> 	 
  <table border="0">
  <tr>
   <td>
    <table>
	<tr>
	 <td style="font-family:Times New Roman;font-size:20px;color:#FFFF80;">&nbsp;&nbsp;<b>My Sales Plan Details:</b></td>
     <td>&nbsp;</td>
<?php
$Ymin1=$_REQUEST['y']-1; $Ymin2=$_REQUEST['y']-2;
$sUpy=mysql_query("select FromDate,ToDate from hrm_sales_year where YearId=".$YearId, $con); 
$sYmin1=mysql_query("select FromDate,ToDate from hrm_sales_year where YearId=".$Ymin1, $con); 
$sYmin2=mysql_query("select FromDate,ToDate from hrm_sales_year where YearId=".$Ymin2, $con); 
$rUpy=mysql_fetch_assoc($sUpy); $rYmin1=mysql_fetch_assoc($sYmin1); $rYmin2=mysql_fetch_assoc($sYmin2);
$FUpy=date("Y",strtotime($rUpy['FromDate'])); $TUpy=date("Y",strtotime($rUpy['ToDate']));
$FYmin1=date("Y",strtotime($rYmin1['FromDate'])); $TYmin1=date("Y",strtotime($rYmin1['ToDate']));
$FYmin2=date("Y",strtotime($rYmin2['FromDate'])); $TYmin2=date("Y",strtotime($rYmin2['ToDate'])); 
?>		 
  <td>
    <select style="font-family:Georgia;font-size:12px;width:px;background-color:#E4E0FC;height:23px;width:150px;" id="YearV" onChange="ChangeYear(this.value)">
<?php $sqly=mysql_query("select FromDate,ToDate from hrm_sales_year where YearId=".$_REQUEST['y'], $con); 
      $resy=mysql_fetch_assoc($sqly); 
      $fromdate=date("Y",strtotime($resy['FromDate'])); $todate=date("Y",strtotime($resy['ToDate'])); ?>		   <option value="<?php echo $_REQUEST['y']; ?>" selected><?php echo 'Year-'.$fromdate.'-'.$todate; ?></option>
<?php if($_REQUEST['y']==$YearId){?><option value="<?php echo $Ymin1; ?>"><?php echo 'Year-'.$FYmin1.'-'.$TYmin1; ?></option>
<option value="<?php echo $Ymin2; ?>"><?php echo 'Year-'.$FYmin2.'-'.$TYmin2; ?></option><?php } elseif($_REQUEST['y']!=$YearId) { ?><option value="<?php echo $YearId; ?>"><?php echo 'Year-'.$FUpy.'-'.$TUpy; ?></option><?php if($_REQUEST['y']!=$Ymin1){?><option value="<?php echo $Ymin1; ?>"><?php echo 'Year-'.$FYmin1.'-'.$TYmin1; ?></option><?php } ?><?php if($_REQUEST['y']!=$Ymin2){?><option value="<?php echo $Ymin2; ?>"><?php echo 'Year-'.$FYmin2.'-'.$TYmin2; ?></option><?php } } ?></select>
   </td>
   <td></td>
    <td>
     <select style="font-family:Georgia;font-size:12px;width:px;background-color:#E4E0FC;height:23px;width:150px;" id="CropV" onChange="ChangeCrop(<?php echo $EmployeeId; ?>)">
     <option value="0" <?php if($_REQUEST['crop']==0){ echo 'selected'; } ?>>Select Crop</option>
	 <?php if($_SESSION['Vertical']==14 OR $_SESSION['Vertical']==16 OR $_SESSION['Hqv']>0){ ?>
	 <option value="1" <?php if($_REQUEST['crop']==1){ echo 'selected'; } ?>>Vegetable Crop</option>
	 <?php } ?>
	 <?php if($_SESSION['Vertical']==15 OR $_SESSION['Vertical']==16 OR $_SESSION['Hqf']>0){ ?>
	 <option value="2" <?php if($_REQUEST['crop']==2){ echo 'selected'; }?>>Field Crop</option>
	 <?php } if($_SESSION['Vertical']==16 OR ($_SESSION['Hqv']>0 AND $_SESSION['Hqf']>0)){ ?>
	 <option value="3" <?php if($_REQUEST['crop']==3){ echo 'selected'; } ?>>ALL Crop</option>
	 <?php } ?>
	 </select>
   </td>
   <td></td>
	<td>
     <select id="ItemV" id="ItemV" style="font-family:Georgia;font-size:12px;width:px;background-color:#E4E0FC;height:23px;width:140px;" <?php /*?>onChange="ChangeTT(<?php //echo $EmployeeId; ?>)"<?php */?> <?php //if($_REQUEST['crop']==0){echo 'disabled';} ?>>
	 <?php if($_REQUEST['ii']>0){ $sqlI1=mysql_query("select ItemName from hrm_sales_seedsitem where ItemId=".$_REQUEST['ii'], $con); $resI1=mysql_fetch_assoc($sqlI1); ?><option value="<?php echo $_REQUEST['ii']; ?>"><?php echo strtoupper($resI1['ItemName']); ?></option><?php } else { ?><option value="0">Select Item</option><?php } ?>
	 <?php if($_REQUEST['crop']>0){?>
     <?php if($_REQUEST['crop']==1 OR $_REQUEST['crop']==2){ $sI=mysql_query("select ItemId,ItemName from hrm_sales_seedsitem where GroupId=".$_REQUEST['crop']." order by ItemName ASC", $con); } elseif($_REQUEST['crop']==3){ $sI=mysql_query("select ItemId,ItemName from hrm_sales_seedsitem order by ItemName ASC", $con); }else{ $sI=mysql_query("select ItemId,ItemName from hrm_sales_seedsitem order by ItemName ASC", $con); }
	 while($rI=mysql_fetch_assoc($sI)){ ?><option value="<?php echo $rI['ItemId']; ?>"><?php echo strtoupper($rI['ItemName']); ?></option><?php } } ?></select>
   </td>
   <td>
    <input type="button" style="font-family:Georgia;font-size:14px;background-color:#E4E0FC;height:23px;width:100px;" onClick="ChangeTT(<?php echo $EmployeeId; ?>)" value="Click">
   </td>
   <td></td>
	</tr>
	</table>
   </td>
  </tr>
   <td>
     <table border="0">  
<tr><td><span id="DealerHqSpan"></span></td></tr>
  </table>
 </td>
</tr>
<?php /***************************************** Main Page Open **************************************/ ?>
<?php if($_REQUEST['findV']=='TT'){ ?>
<tr>
 <td style="width:100%;">
<?php
      $BeforeYId=$_REQUEST['y']-1; $AfterYId=$_REQUEST['y']+1;
	  $sqlY1=mysql_query("select FromDate,ToDate from hrm_sales_year where YearId=".$BeforeYId, $con); 
	  $sqlY2=mysql_query("select FromDate,ToDate from hrm_sales_year where YearId=".$_REQUEST['y'], $con); 
	  $sqlY3=mysql_query("select FromDate,ToDate from hrm_sales_year where YearId=".$AfterYId, $con); 
	  $resY1=mysql_fetch_assoc($sqlY1);  $resY2=mysql_fetch_assoc($sqlY2);  $resY3=mysql_fetch_assoc($sqlY3); 
	  $y1=date("y",strtotime($resY1['FromDate'])).'-'.date("y",strtotime($resY1['ToDate'])); 
	  $y2=date("y",strtotime($resY2['FromDate'])).'-'.date("y",strtotime($resY2['ToDate'])); 
	  $y3=date("y",strtotime($resY3['FromDate'])).'-'.date("y",strtotime($resY3['ToDate'])); 
	  $y1T='<font color="#A60053">Ach.</font>'; $y2T='<font color="#A60053">Tgt.</font>'; 
	  $y3T='<font color="#A60053">Proj.</font>';
	  if($_REQUEST['crop']==1){ $ItemN='Vegetable Crop'; }elseif($_REQUEST['crop']==2){ $ItemN='Field Crop'; }elseif($_REQUEST['crop']==3){ $ItemN='All Crop'; } ?>	 
<table border="1" cellpadding="0" cellspacing="0" style="font-family:Times New Roman;font-size:14px;width:100%;">	
  <tr>
  <td colspan="3" align="center" style="height:25px;background-color:#005300;font-family:Times New Roman;font-size:16px;color:#FFFF20;font-weight:bold;">  
  <font color="#D7EBFF">Crop:</font>&nbsp;<?php echo $ItemN; ?></td>
  <td colspan="26" style="height:25px;background-color:#005300;font-family:Times New Roman;font-size:16px;color:#FFFF20;font-weight:bold;" id="TD">
   &nbsp;<font color="#D7EBFF">Name:&nbsp;</font><?php echo $_SESSION['NameE']; ?>
   &nbsp;<font color="#D7EBFF">Year:&nbsp;</font><?php echo $fromdate.'-'.$todate; ?>
   &nbsp;&nbsp;&nbsp;<?php if($_REQUEST['crop']==3){ ?>
 <input type="button" style="font-family:Times New Roman;width:100px;height:25px;font-weight:bold;" value="Final Submit" onClick="ClickFSL1(<?php echo $EmployeeId.', '.$_REQUEST['y']; ?>)" <?php if($RslP=='Y'){echo 'disabled';}else{echo '';}?>/><?php }  ?>
   </td>
  </tr>
  <tr style="background-color:#D5F1D1;color:#000000;">
   <td align="center" style="width:80px;" rowspan="<?php if($rowRpt>0){echo 3;}else{echo 2;} ?>"><b>CROP</b></td>
   <td align="center" style="width:150px;" rowspan="<?php if($rowRpt>0){echo 3;}else{echo 2;} ?>"><b>VARIETY</b></td>
   <td align="center" style="width:50px;" rowspan="<?php if($rowRpt>0){echo 3;}else{echo 2;} ?>"><b>&nbsp;TYPE&nbsp;</b></td>
   <td colspan="<?php if($rowRpt>0){echo 4;}else{echo 2;} ?>" align="center"><b>Quarter 1</b></td>
   <td colspan="<?php if($rowRpt>0){echo 4;}else{echo 2;} ?>" align="center"><b>Quarter 2</b></td>
   <td colspan="<?php if($rowRpt>0){echo 4;}else{echo 2;} ?>" align="center"><b>Quarter 3</b></td>
   <td colspan="<?php if($rowRpt>0){echo 4;}else{echo 2;} ?>" align="center"><b>Quarter 4</b></td>
   <td colspan="<?php if($rowRpt>0){echo 4;}else{echo 2;} ?>" align="center" bgcolor="#D9D9FF"><b>TOTAL</b></td>
  <td colspan="2" rowspan="<?php if($rowRpt>0){echo 2;}else{echo 0;} ?>" align="center" bgcolor="#D9D9FF"><b>REVISED</b></td>
  </tr>	
  <?php if($rowRpt>0){ ?>
  <tr style="background-color:#D5F1D1;color:#000000;">
    <?php for($i=1; $i<=5; $i++){ ?>
	<td colspan="2" align="center"><b>Actual</b></td>
	<td colspan="2" align="center"><b>Suggested</b></td>
	<?php } ?>
  </tr>	
  <?php } ?>
   <tr style="background-color:#D5F1D1;color:#000000;">
   <?php for($i=1; $i<=5; $i++){ ?>
	 <td class="Trh50"><?php echo $y2T.'<br>'.$y2; ?></td><td class="Trh50"><?php echo $y3T.'<br>'.$y3; ?></td>
   <?php if($rowRpt>0){ ?><td class="Trh50"><?php echo $y2T.'<br>'.$y2; ?></td><td class="Trh50"><?php echo $y3T.'<br>'.$y3; ?></td><?php } ?>
	<?php } ?>
    <td class="Trh50"><?php echo $y2T.'<br>'.$y2; ?></td><td class="Trh50"><?php echo $y3T.'<br>'.$y3; ?></td>
</tr>
<?php /*Total OPEN ************************************/ ?>
<?php 
if($_REQUEST['findV']=='TT'){

if($rowRpt>0)
{

if($rtl>0)
{
 if($_REQUEST['ii']>0)
 {
  
  $sqlAta=mysql_query("select SUM(M1) as sM1,SUM(M2) as sM2,SUM(M3) as sM3,SUM(M4) as sM4,SUM(M5) as sM5,SUM(M6) as sM6,SUM(M7) as sM7,SUM(M8) as sM8,SUM(M9) as sM9,SUM(M10) as sM10,SUM(M11) as sM11,SUM(M12) as sM12 from hrm_sales_sal_details_".$_REQUEST['y']." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_sales_tlemp tl ON d.HqId=tl.TLHq where TLStatus='A' AND tl.TLRepId=".$_REQUEST['mainv']." AND sp.ItemId=".$_REQUEST['ii']." AND sp.ProductSts='A' AND sd.YearId=".$_REQUEST['y'], $con); 
  $resAta=mysql_fetch_assoc($sqlAta);
  $sqlBt=mysql_query("select SUM(M1_Proj) as sM1,SUM(M2_Proj) as sM2,SUM(M3_Proj) as sM3,SUM(M4_Proj) as sM4,SUM(M5_Proj) as sM5,SUM(M6_Proj) as sM6,SUM(M7_Proj) as sM7,SUM(M8_Proj) as sM8,SUM(M9_Proj) as sM9,SUM(M10_Proj) as sM10,SUM(M11_Proj) as sM11,SUM(M12_Proj) as sM12 from hrm_sales_sal_details_".$AfterYId." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_sales_tlemp tl ON d.HqId=tl.TLHq where TLStatus='A' AND tl.TLRepId=".$_REQUEST['mainv']." AND sp.ProductSts='A' AND sp.ItemId=".$_REQUEST['ii']." AND sd.YearId=".$AfterYId, $con); $resBta=mysql_fetch_assoc($sqlBta); 
 }
 else
 {
  if($_REQUEST['crop']==1 OR $_REQUEST['crop']==2)
  {
  
  $sqlAta=mysql_query("select SUM(M1) as sM1,SUM(M2) as sM2,SUM(M3) as sM3,SUM(M4) as sM4,SUM(M5) as sM5,SUM(M6) as sM6,SUM(M7) as sM7,SUM(M8) as sM8,SUM(M9) as sM9,SUM(M10) as sM10,SUM(M11) as sM11,SUM(M12) as sM12 from hrm_sales_sal_details_".$_REQUEST['y']." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId INNER JOIN hrm_sales_seedsitem si ON sp.ItemId=si.ItemId INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_sales_tlemp tl ON d.HqId=tl.TLHq where TLStatus='A' AND tl.TLRepId=".$_REQUEST['mainv']." AND sp.ItemId=".$_REQUEST['ii']." AND si.GroupId=".$_REQUEST['crop']." AND sp.ProductSts='A' AND sd.YearId=".$_REQUEST['y'], $con); $resAta=mysql_fetch_assoc($sqlAta);
  $sqlBta=mysql_query("select SUM(M1_Proj) as sM1,SUM(M2_Proj) as sM2,SUM(M3_Proj) as sM3,SUM(M4_Proj) as sM4,SUM(M5_Proj) as sM5,SUM(M6_Proj) as sM6,SUM(M7_Proj) as sM7,SUM(M8_Proj) as sM8,SUM(M9_Proj) as sM9,SUM(M10_Proj) as sM10,SUM(M11_Proj) as sM11,SUM(M12_Proj) as sM12 from hrm_sales_sal_details_".$AfterYId." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId INNER JOIN hrm_sales_seedsitem si ON sp.ItemId=si.ItemId INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_sales_tlemp tl ON d.HqId=tl.TLHq where TLStatus='A' AND tl.TLRepId=".$_REQUEST['mainv']." AND sp.ItemId=".$_REQUEST['ii']." AND si.GroupId=".$_REQUEST['crop']." AND sp.ProductSts='A' AND sd.YearId=".$AfterYId, $con); 
  $resBta=mysql_fetch_assoc($sqlBta);
  }
  elseif($_REQUEST['crop']==3)
  {
   
  $sqlAta=mysql_query("select SUM(M1) as sM1,SUM(M2) as sM2,SUM(M3) as sM3,SUM(M4) as sM4,SUM(M5) as sM5,SUM(M6) as sM6,SUM(M7) as sM7,SUM(M8) as sM8,SUM(M9) as sM9,SUM(M10) as sM10,SUM(M11) as sM11,SUM(M12) as sM12 from hrm_sales_sal_details_".$_REQUEST['y']." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId INNER JOIN hrm_sales_seedsitem si ON sp.ItemId=si.ItemId INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_sales_tlemp tl ON d.HqId=tl.TLHq where TLStatus='A' AND tl.TLRepId=".$_REQUEST['mainv']." AND sp.ItemId=".$_REQUEST['ii']." AND sp.ProductSts='A' AND sd.YearId=".$_REQUEST['y'], $con); $resAta=mysql_fetch_assoc($sqlAta);
  $sqlBta=mysql_query("select SUM(M1_Proj) as sM1,SUM(M2_Proj) as sM2,SUM(M3_Proj) as sM3,SUM(M4_Proj) as sM4,SUM(M5_Proj) as sM5,SUM(M6_Proj) as sM6,SUM(M7_Proj) as sM7,SUM(M8_Proj) as sM8,SUM(M9_Proj) as sM9,SUM(M10_Proj) as sM10,SUM(M11_Proj) as sM11,SUM(M12_Proj) as sM12 from hrm_sales_sal_details_".$AfterYId." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId INNER JOIN hrm_sales_seedsitem si ON sp.ItemId=si.ItemId INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_sales_tlemp tl ON d.HqId=tl.TLHq where TLStatus='A' AND tl.TLRepId=".$_REQUEST['mainv']." AND sp.ItemId=".$_REQUEST['ii']." AND sp.ProductSts='A' AND sd.YearId=".$AfterYId, $con); $resBta=mysql_fetch_assoc($sqlBta);
  }
 }
}
 
if($_REQUEST['ii']>0)
{

$sql4tat=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_terr sdt INNER JOIN hrm_sales_seedsproduct sp ON sdt.ProductId=sp.ProductId where TerrRepEmpID=".$_REQUEST['mainv']." AND sp.ProductSts='A' AND sp.ItemId=".$_REQUEST['ii']." AND YearId=".$_REQUEST['y'], $con); 
$sql5tat=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_terr sdt INNER JOIN hrm_sales_seedsproduct sp ON sdt.ProductId=sp.ProductId where TerrRepEmpID=".$_REQUEST['mainv']." AND sp.ProductSts='A' AND sp.ItemId=".$_REQUEST['ii']." AND YearId=".$AfterYId, $con); 
$res4tat=mysql_fetch_assoc($sql4tat); $res5tat=mysql_fetch_assoc($sql5tat);
$sql4tbt=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_hq sdh INNER JOIN hrm_sales_seedsproduct sp ON sdh.ProductId=sp.ProductId where HqRepEmpID=".$_REQUEST['mainv']." AND sp.ProductSts='A' AND sp.ItemId=".$_REQUEST['ii']." AND YearId=".$_REQUEST['y'], $con); 
$sql5tbt=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_hq sdh INNER JOIN hrm_sales_seedsproduct sp ON sdh.ProductId=sp.ProductId where HqRepEmpID=".$_REQUEST['mainv']." AND sp.ProductSts='A' AND sp.ItemId=".$_REQUEST['ii']." AND YearId=".$AfterYId, $con); $res4tbt=mysql_fetch_assoc($sql4tbt); $res5tbt=mysql_fetch_assoc($sql5tbt); 

$sqlAt=mysql_query("select SUM(M1) as sM1,SUM(M2) as sM2,SUM(M3) as sM3,SUM(M4) as sM4,SUM(M5) as sM5,SUM(M6) as sM6,SUM(M7) as sM7,SUM(M8) as sM8,SUM(M9) as sM9,SUM(M10) as sM10,SUM(M11) as sM11,SUM(M12) as sM12 from hrm_sales_sal_details_".$_REQUEST['y']." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_sales_hq_temp hqt ON d.HqId=hqt.HqId INNER JOIN hrm_employee_general g ON hqt.EmployeeID=g.EmployeeID where HqTEmpStatus='A' AND (hqt.EmployeeID=".$_REQUEST['mainv']." OR g.RepEmployeeID=".$_REQUEST['mainv'].") AND sp.ItemId=".$_REQUEST['ii']." AND sp.ProductSts='A' AND sd.YearId=".$_REQUEST['y'], $con); 

$sqlBt=mysql_query("select SUM(M1_Proj) as sM1,SUM(M2_Proj) as sM2,SUM(M3_Proj) as sM3,SUM(M4_Proj) as sM4,SUM(M5_Proj) as sM5,SUM(M6_Proj) as sM6,SUM(M7_Proj) as sM7,SUM(M8_Proj) as sM8,SUM(M9_Proj) as sM9,SUM(M10_Proj) as sM10,SUM(M11_Proj) as sM11,SUM(M12_Proj) as sM12 from hrm_sales_sal_details_".$AfterYId." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_sales_hq_temp hqt ON d.HqId=hqt.HqId INNER JOIN hrm_employee_general g ON hqt.EmployeeID=g.EmployeeID where HqTEmpStatus='A' AND (hqt.EmployeeID=".$_REQUEST['mainv']." OR g.RepEmployeeID=".$_REQUEST['mainv'].") AND sp.ProductSts='A' AND sp.ItemId=".$_REQUEST['ii']." AND sd.YearId=".$AfterYId, $con); 
$resAt=mysql_fetch_assoc($sqlAt); $resBt=mysql_fetch_assoc($sqlBt);
if($rtl>0)
{
$Pa1t=$resAt['sM1']+$resAt['sM2']+$resAt['sM3']+$resAta['sM1']+$resAta['sM2']+$resAta['sM3']; 
$Pa2t=$resAt['sM4']+$resAt['sM5']+$resAt['sM6']+$resAta['sM4']+$resAta['sM5']+$resAta['sM6']; 
$Pa3t=$resAt['sM7']+$resAt['sM8']+$resAt['sM9']+$resAta['sM7']+$resAta['sM8']+$resAta['sM9']; 
$Pa4t=$resAt['sM10']+$resAt['sM11']+$resAt['sM12']+$resAta['sM10']+$resAta['sM11']+$resAta['sM12'];
$Pb1t=$resBt['sM1']+$resBt['sM2']+$resBt['sM3']+$resBta['sM1']+$resBta['sM2']+$resBta['sM3']; 
$Pb2t=$resBt['sM4']+$resBt['sM5']+$resBt['sM6']+$resBta['sM4']+$resBta['sM5']+$resBta['sM6']; 
$Pb3t=$resBt['sM7']+$resBt['sM8']+$resBt['sM9']+$resBta['sM7']+$resBta['sM8']+$resBta['sM9']; 
$Pb4t=$resBt['sM10']+$resBt['sM11']+$resBt['sM12']+$resBta['sM10']+$resBta['sM11']+$resBta['sM12']; 
}
else
{
$Pa1t=$resAt['sM1']+$resAt['sM2']+$resAt['sM3']; $Pa2t=$resAt['sM4']+$resAt['sM5']+$resAt['sM6']; 
$Pa3t=$resAt['sM7']+$resAt['sM8']+$resAt['sM9']; $Pa4t=$resAt['sM10']+$resAt['sM11']+$resAt['sM12'];
$Pb1t=$resBt['sM1']+$resBt['sM2']+$resBt['sM3']; $Pb2t=$resBt['sM4']+$resBt['sM5']+$resBt['sM6']; 
$Pb3t=$resBt['sM7']+$resBt['sM8']+$resBt['sM9']; $Pb4t=$resBt['sM10']+$resBt['sM11']+$resBt['sM12']; 
}
$TotAt=$Pa1t+$Pa2t+$Pa3t+$Pa4t;
$TotBt=$Pb1t+$Pb2t+$Pb3t+$Pb4t;

$sRevAt=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_terr sdt INNER JOIN hrm_sales_seedsproduct sp ON sdt.ProductId=sp.ProductId where TerrEmpID=".$_REQUEST['mainv']." AND sp.ProductSts='A' AND sp.ItemId=".$_REQUEST['ii']." AND YearId=".$_REQUEST['y'], $con); 
$sRevBt=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_terr sdt INNER JOIN hrm_sales_seedsproduct sp ON sdt.ProductId=sp.ProductId where TerrEmpID=".$_REQUEST['mainv']." AND sp.ProductSts='A' AND sp.ItemId=".$_REQUEST['ii']." AND YearId=".$AfterYId, $con); 
$rRevAt=mysql_fetch_assoc($sRevAt); $rRevBt=mysql_fetch_assoc($sRevBt);

}
else {
if($_REQUEST['crop']==1 OR $_REQUEST['crop']==2){ 

$sql4tat=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_terr sdt INNER JOIN hrm_sales_seedsproduct sp ON sdt.ProductId=sp.ProductId INNER JOIN hrm_sales_seedsitem si ON sp.ItemId=si.ItemId where TerrRepEmpID=".$_REQUEST['mainv']." AND si.GroupId=".$_REQUEST['crop']." AND sp.ProductSts='A' AND YearId=".$_REQUEST['y'], $con); 
$sql5tat=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_terr sdt INNER JOIN hrm_sales_seedsproduct sp ON sdt.ProductId=sp.ProductId INNER JOIN hrm_sales_seedsitem si ON sp.ItemId=si.ItemId where TerrRepEmpID=".$_REQUEST['mainv']." AND si.GroupId=".$_REQUEST['crop']." AND sp.ProductSts='A' AND YearId=".$AfterYId, $con); 
$res4tat=mysql_fetch_assoc($sql4tat); $res5tat=mysql_fetch_assoc($sql5tat);
$sql4tbt=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_hq sdh INNER JOIN hrm_sales_seedsproduct sp ON sdh.ProductId=sp.ProductId INNER JOIN hrm_sales_seedsitem si ON sp.ItemId=si.ItemId where HqRepEmpID=".$_REQUEST['mainv']." AND si.GroupId=".$_REQUEST['crop']." AND sp.ProductSts='A' AND YearId=".$_REQUEST['y'], $con); 
$sql5tbt=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_hq sdh INNER JOIN hrm_sales_seedsproduct sp ON sdh.ProductId=sp.ProductId INNER JOIN hrm_sales_seedsitem si ON sp.ItemId=si.ItemId where HqRepEmpID=".$_REQUEST['mainv']." AND si.GroupId=".$_REQUEST['crop']." AND sp.ProductSts='A' AND YearId=".$AfterYId, $con); 
$res4tbt=mysql_fetch_assoc($sql4tbt); $res5tbt=mysql_fetch_assoc($sql5tbt); 

$sqlAt=mysql_query("select SUM(M1) as sM1,SUM(M2) as sM2,SUM(M3) as sM3,SUM(M4) as sM4,SUM(M5) as sM5,SUM(M6) as sM6,SUM(M7) as sM7,SUM(M8) as sM8,SUM(M9) as sM9,SUM(M10) as sM10,SUM(M11) as sM11,SUM(M12) as sM12 from hrm_sales_sal_details_".$_REQUEST['y']." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId INNER JOIN hrm_sales_seedsitem si ON sp.ItemId=si.ItemId INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_sales_hq_temp hqt ON d.HqId=hqt.HqId INNER JOIN hrm_employee_general g ON hqt.EmployeeID=g.EmployeeID where HqTEmpStatus='A' AND (hqt.EmployeeID=".$_REQUEST['mainv']." OR g.RepEmployeeID=".$_REQUEST['mainv'].") AND si.GroupId=".$_REQUEST['crop']." AND sp.ProductSts='A' AND sd.YearId=".$_REQUEST['y'], $con); 
$resAt=mysql_fetch_assoc($sqlAt);
$sqlBt=mysql_query("select SUM(M1_Proj) as sM1,SUM(M2_Proj) as sM2,SUM(M3_Proj) as sM3,SUM(M4_Proj) as sM4,SUM(M5_Proj) as sM5,SUM(M6_Proj) as sM6,SUM(M7_Proj) as sM7,SUM(M8_Proj) as sM8,SUM(M9_Proj) as sM9,SUM(M10_Proj) as sM10,SUM(M11_Proj) as sM11,SUM(M12_Proj) as sM12 from hrm_sales_sal_details_".$AfterYId." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId INNER JOIN hrm_sales_seedsitem si ON sp.ItemId=si.ItemId INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_sales_hq_temp hqt ON d.HqId=hqt.HqId INNER JOIN hrm_employee_general g ON hqt.EmployeeID=g.EmployeeID where HqTEmpStatus='A' AND (hqt.EmployeeID=".$_REQUEST['mainv']." OR g.RepEmployeeID=".$_REQUEST['mainv'].") AND si.GroupId=".$_REQUEST['crop']." AND sp.ProductSts='A' AND sd.YearId=".$AfterYId, $con); $resBt=mysql_fetch_assoc($sqlBt);

if($rtl>0)
{
$Pa1t=$resAt['sM1']+$resAt['sM2']+$resAt['sM3']+$resAta['sM1']+$resAta['sM2']+$resAta['sM3']; 
$Pa2t=$resAt['sM4']+$resAt['sM5']+$resAt['sM6']+$resAta['sM4']+$resAta['sM5']+$resAta['sM6']; 
$Pa3t=$resAt['sM7']+$resAt['sM8']+$resAt['sM9']+$resAta['sM7']+$resAta['sM8']+$resAta['sM9']; 
$Pa4t=$resAt['sM10']+$resAt['sM11']+$resAt['sM12']+$resAta['sM10']+$resAta['sM11']+$resAta['sM12'];
$Pb1t=$resBt['sM1']+$resBt['sM2']+$resBt['sM3']+$resBta['sM1']+$resBta['sM2']+$resBta['sM3']; 
$Pb2t=$resBt['sM4']+$resBt['sM5']+$resBt['sM6']+$resBta['sM4']+$resBta['sM5']+$resBta['sM6']; 
$Pb3t=$resBt['sM7']+$resBt['sM8']+$resBt['sM9']+$resBta['sM7']+$resBta['sM8']+$resBta['sM9']; 
$Pb4t=$resBt['sM10']+$resBt['sM11']+$resBt['sM12']+$resBta['sM10']+$resBta['sM11']+$resBta['sM12']; 
}
else
{
$Pa1t=$resAt['sM1']+$resAt['sM2']+$resAt['sM3']; $Pa2t=$resAt['sM4']+$resAt['sM5']+$resAt['sM6']; 
$Pa3t=$resAt['sM7']+$resAt['sM8']+$resAt['sM9']; $Pa4t=$resAt['sM10']+$resAt['sM11']+$resAt['sM12'];
$Pb1t=$resBt['sM1']+$resBt['sM2']+$resBt['sM3']; $Pb2t=$resBt['sM4']+$resBt['sM5']+$resBt['sM6']; 
$Pb3t=$resBt['sM7']+$resBt['sM8']+$resBt['sM9']; $Pb4t=$resBt['sM10']+$resBt['sM11']+$resBt['sM12']; 
}
$TotAt=$Pa1t+$Pa2t+$Pa3t+$Pa4t;
$TotBt=$Pb1t+$Pb2t+$Pb3t+$Pb4t;

$sRevAt=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_terr sdt INNER JOIN hrm_sales_seedsproduct sp ON sdt.ProductId=sp.ProductId INNER JOIN hrm_sales_seedsitem si ON sp.ItemId=si.ItemId where TerrEmpID=".$_REQUEST['mainv']." AND si.GroupId=".$_REQUEST['crop']." AND sp.ProductSts='A' AND YearId=".$_REQUEST['y'], $con); 
$sRevBt=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_terr sdt INNER JOIN hrm_sales_seedsproduct sp ON sdt.ProductId=sp.ProductId INNER JOIN hrm_sales_seedsitem si ON sp.ItemId=si.ItemId where TerrEmpID=".$_REQUEST['mainv']." AND si.GroupId=".$_REQUEST['crop']." AND sp.ProductSts='A' AND YearId=".$AfterYId, $con); 
$rRevAt=mysql_fetch_assoc($sRevAt); $rRevBt=mysql_fetch_assoc($sRevBt);

}

elseif($_REQUEST['crop']==3){ 

$sql4tat=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_terr sdt INNER JOIN hrm_sales_seedsproduct sp ON sdt.ProductId=sp.ProductId INNER JOIN hrm_sales_seedsitem si ON sp.ItemId=si.ItemId where TerrRepEmpID=".$_REQUEST['mainv']." AND (si.GroupId=1 OR si.GroupId=2) AND sp.ProductSts='A' AND YearId=".$_REQUEST['y'], $con); 
$sql5tat=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_terr sdt INNER JOIN hrm_sales_seedsproduct sp ON sdt.ProductId=sp.ProductId INNER JOIN hrm_sales_seedsitem si ON sp.ItemId=si.ItemId where TerrRepEmpID=".$_REQUEST['mainv']." AND (si.GroupId=1 OR si.GroupId=2) AND sp.ProductSts='A' AND YearId=".$AfterYId, $con); 
$res4tat=mysql_fetch_assoc($sql4tat); $res5tat=mysql_fetch_assoc($sql5tat);
$sql4tbt=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_hq sdh INNER JOIN hrm_sales_seedsproduct sp ON sdh.ProductId=sp.ProductId INNER JOIN hrm_sales_seedsitem si ON sp.ItemId=si.ItemId where HqRepEmpID=".$_REQUEST['mainv']." AND (si.GroupId=1 OR si.GroupId=2) AND sp.ProductSts='A' AND YearId=".$_REQUEST['y'], $con); 
$sql5tbt=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_hq sdh INNER JOIN hrm_sales_seedsproduct sp ON sdh.ProductId=sp.ProductId INNER JOIN hrm_sales_seedsitem si ON sp.ItemId=si.ItemId where HqRepEmpID=".$_REQUEST['mainv']." AND (si.GroupId=1 OR si.GroupId=2) AND sp.ProductSts='A' AND YearId=".$AfterYId, $con); $res4tbt=mysql_fetch_assoc($sql4tbt); $res5tbt=mysql_fetch_assoc($sql5tbt);

$sqlAt=mysql_query("select SUM(M1) as sM1,SUM(M2) as sM2,SUM(M3) as sM3,SUM(M4) as sM4,SUM(M5) as sM5,SUM(M6) as sM6,SUM(M7) as sM7,SUM(M8) as sM8,SUM(M9) as sM9,SUM(M10) as sM10,SUM(M11) as sM11,SUM(M12) as sM12 from hrm_sales_sal_details_".$_REQUEST['y']." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId INNER JOIN hrm_sales_seedsitem si ON sp.ItemId=si.ItemId INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_sales_hq_temp hqt ON d.HqId=hqt.HqId INNER JOIN hrm_employee_general g ON hqt.EmployeeID=g.EmployeeID where HqTEmpStatus='A' AND (hqt.EmployeeID=".$_REQUEST['mainv']." OR g.RepEmployeeID=".$_REQUEST['mainv'].") AND sp.ProductSts='A' AND sd.YearId=".$_REQUEST['y'], $con); $resAt=mysql_fetch_assoc($sqlAt);
$sqlBt=mysql_query("select SUM(M1_Proj) as sM1,SUM(M2_Proj) as sM2,SUM(M3_Proj) as sM3,SUM(M4_Proj) as sM4,SUM(M5_Proj) as sM5,SUM(M6_Proj) as sM6,SUM(M7_Proj) as sM7,SUM(M8_Proj) as sM8,SUM(M9_Proj) as sM9,SUM(M10_Proj) as sM10,SUM(M11_Proj) as sM11,SUM(M12_Proj) as sM12 from hrm_sales_sal_details_".$AfterYId." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId INNER JOIN hrm_sales_seedsitem si ON sp.ItemId=si.ItemId INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_sales_hq_temp hqt ON d.HqId=hqt.HqId INNER JOIN hrm_employee_general g ON hqt.EmployeeID=g.EmployeeID where HqTEmpStatus='A' AND (hqt.EmployeeID=".$_REQUEST['mainv']." OR g.RepEmployeeID=".$_REQUEST['mainv'].") AND sp.ProductSts='A' AND sd.YearId=".$AfterYId, $con); $resBt=mysql_fetch_assoc($sqlBt);
if($rtl>0)
{
$Pa1t=$resAt['sM1']+$resAt['sM2']+$resAt['sM3']+$resAta['sM1']+$resAta['sM2']+$resAta['sM3']; 
$Pa2t=$resAt['sM4']+$resAt['sM5']+$resAt['sM6']+$resAta['sM4']+$resAta['sM5']+$resAta['sM6']; 
$Pa3t=$resAt['sM7']+$resAt['sM8']+$resAt['sM9']+$resAta['sM7']+$resAta['sM8']+$resAta['sM9']; 
$Pa4t=$resAt['sM10']+$resAt['sM11']+$resAt['sM12']+$resAta['sM10']+$resAta['sM11']+$resAta['sM12'];
$Pb1t=$resBt['sM1']+$resBt['sM2']+$resBt['sM3']+$resBta['sM1']+$resBta['sM2']+$resBta['sM3']; 
$Pb2t=$resBt['sM4']+$resBt['sM5']+$resBt['sM6']+$resBta['sM4']+$resBta['sM5']+$resBta['sM6']; 
$Pb3t=$resBt['sM7']+$resBt['sM8']+$resBt['sM9']+$resBta['sM7']+$resBta['sM8']+$resBta['sM9']; 
$Pb4t=$resBt['sM10']+$resBt['sM11']+$resBt['sM12']+$resBta['sM10']+$resBta['sM11']+$resBta['sM12']; 
}
else
{
$Pa1t=$resAt['sM1']+$resAt['sM2']+$resAt['sM3']; $Pa2t=$resAt['sM4']+$resAt['sM5']+$resAt['sM6']; 
$Pa3t=$resAt['sM7']+$resAt['sM8']+$resAt['sM9']; $Pa4t=$resAt['sM10']+$resAt['sM11']+$resAt['sM12'];
$Pb1t=$resBt['sM1']+$resBt['sM2']+$resBt['sM3']; $Pb2t=$resBt['sM4']+$resBt['sM5']+$resBt['sM6']; 
$Pb3t=$resBt['sM7']+$resBt['sM8']+$resBt['sM9']; $Pb4t=$resBt['sM10']+$resBt['sM11']+$resBt['sM12']; 
} 
$TotAt=$Pa1t+$Pa2t+$Pa3t+$Pa4t; 
$TotBt=$Pb1t+$Pb2t+$Pb3t+$Pb4t;

$sRevAt=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_terr INNER JOIN hrm_sales_seedsproduct sp ON sdt.ProductId=sp.ProductId where TerrEmpID=".$_REQUEST['mainv']." AND sp.ProductSts='A' AND YearId=".$_REQUEST['y'], $con); 
$sRevBt=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_terr INNER JOIN hrm_sales_seedsproduct sp ON sdt.ProductId=sp.ProductId where TerrEmpID=".$_REQUEST['mainv']." AND sp.ProductSts='A' AND YearId=".$AfterYId, $con); 
$rRevAt=mysql_fetch_assoc($sRevAt); $rRevBt=mysql_fetch_assoc($sRevBt);
}
if($rtl>0)
{
$TotPp1=$resP1t['sM1']+$resP1t['sM2']+$resP1t['sM3']+$resP1ta['sM1']+$resP1ta['sM2']+$resP1ta['sM3']; 
$TotPp2=$resP1t['sM4']+$resP1t['sM5']+$resP1t['sM6']+$resP1ta['sM4']+$resP1ta['sM5']+$resP1ta['sM6'];
$TotPp3=$resP1t['sM7']+$resP1t['sM8']+$resP1t['sM9']+$resP1ta['sM7']+$resP1ta['sM8']+$resP1ta['sM9']; 
$TotPp4=$resP1t['sM10']+$resP1t['sM11']+$resP1t['sM12']+$resP1ta['sM10']+$resP1ta['sM11']+$resP1ta['sM12']; 
}
else
{
$TotPp1=$resP1t['sM1']+$resP1t['sM2']+$resP1t['sM3']; 
$TotPp2=$resP1t['sM4']+$resP1t['sM5']+$resP1t['sM6'];
$TotPp3=$resP1t['sM7']+$resP1t['sM8']+$resP1t['sM9']; 
$TotPp4=$resP1t['sM10']+$resP1t['sM11']+$resP1t['sM12']; 
}

$TotP2ta=$res4tat['Qa']+$res4tbt['Qa']; $TotP2tb=$res4tat['Qb']+$res4tbt['Qb']; 
$TotP2tc=$res4tat['Qc']+$res4tbt['Qc']; $TotP2td=$res4tat['Qd']+$res4tbt['Qd'];
$TotP3ta=$res5tat['Qa']+$res5tbt['Qa']; $TotP3tb=$res5tat['Qb']+$res5tbt['Qb']; 
$TotP3tc=$res5tat['Qc']+$res5tbt['Qc']; $TotP3td=$res5tat['Qd']+$res5tbt['Qd'];

}
} 
elseif($rowRpt==0){ 
if($_REQUEST['ii']>0)
{ 


$sql4tat=mysql_query("select SUM(M1) as sM1,SUM(M2) as sM2,SUM(M3) as sM3,SUM(M4) as sM4,SUM(M5) as sM5,SUM(M6) as sM6,SUM(M7) as sM7,SUM(M8) as sM8,SUM(M9) as sM9,SUM(M10) as sM10,SUM(M11) as sM11,SUM(M12) as sM12 from hrm_sales_sal_details_".$_REQUEST['y']." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_sales_hq_temp hqt ON d.HqId=hqt.HqId where HqTEmpStatus='A' AND hqt.EmployeeID=".$_REQUEST['mainv']." AND sp.ItemId=".$_REQUEST['ii']." AND sp.ProductSts='A' AND sd.YearId=".$_REQUEST['y'], $con); 
$sql5tat=mysql_query("select SUM(M1_Proj) as sM1,SUM(M2_Proj) as sM2,SUM(M3_Proj) as sM3,SUM(M4_Proj) as sM4,SUM(M5_Proj) as sM5,SUM(M6_Proj) as sM6,SUM(M7_Proj) as sM7,SUM(M8_Proj) as sM8,SUM(M9_Proj) as sM9,SUM(M10_Proj) as sM10,SUM(M11_Proj) as sM11,SUM(M12_Proj) as sM12 from hrm_sales_sal_details_".$AfterYId." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_sales_hq_temp hqt ON d.HqId=hqt.HqId where HqTEmpStatus='A' AND hqt.EmployeeID=".$_REQUEST['mainv']." AND sp.ProductSts='A' AND sp.ItemId=".$_REQUEST['ii']." AND sd.YearId=".$AfterYId, $con); $res4tat=mysql_fetch_assoc($sql4tat); $res5tat=mysql_fetch_assoc($sql5tat); 

$sqlAt=mysql_query("select SUM(M1) as sM1,SUM(M2) as sM2,SUM(M3) as sM3,SUM(M4) as sM4,SUM(M5) as sM5,SUM(M6) as sM6,SUM(M7) as sM7,SUM(M8) as sM8,SUM(M9) as sM9,SUM(M10) as sM10,SUM(M11) as sM11,SUM(M12) as sM12 from hrm_sales_sal_details_".$_REQUEST['y']." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_sales_hq_temp hqt ON d.HqId=hqt.HqId where HqTEmpStatus='A' AND hqt.EmployeeID=".$_REQUEST['mainv']." AND sp.ItemId=".$_REQUEST['ii']." AND sp.ProductSts='A' AND sd.YearId=".$_REQUEST['y'], $con); 
$resAt=mysql_fetch_assoc($sqlAt);
$sqlBt=mysql_query("select SUM(M1_Proj) as sM1,SUM(M2_Proj) as sM2,SUM(M3_Proj) as sM3,SUM(M4_Proj) as sM4,SUM(M5_Proj) as sM5,SUM(M6_Proj) as sM6,SUM(M7_Proj) as sM7,SUM(M8_Proj) as sM8,SUM(M9_Proj) as sM9,SUM(M10_Proj) as sM10,SUM(M11_Proj) as sM11,SUM(M12_Proj) as sM12 from hrm_sales_sal_details_".$AfterYId." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_sales_hq_temp hqt ON d.HqId=hqt.HqId where HqTEmpStatus='A' AND hqt.EmployeeID=".$_REQUEST['mainv']." AND sp.ProductSts='A' AND sp.ItemId=".$_REQUEST['ii']." AND sd.YearId=".$AfterYId, $con); 
$resBt=mysql_fetch_assoc($sqlBt);
$Pa1t=$resAt['sM1']+$resAt['sM2']+$resAt['sM3']; $Pa2t=$resAt['sM4']+$resAt['sM5']+$resAt['sM6']; 
$Pa3t=$resAt['sM7']+$resAt['sM8']+$resAt['sM9']; $Pa4t=$resAt['sM10']+$resAt['sM11']+$resAt['sM12']; 
$TotAt=$Pa1t+$Pa2t+$Pa3t+$Pa4t;
$Pb1t=$resBt['sM1']+$resBt['sM2']+$resBt['sM3']; $Pb2t=$resBt['sM4']+$resBt['sM5']+$resBt['sM6']; 
$Pb3t=$resBt['sM7']+$resBt['sM8']+$resBt['sM9']; $Pb4t=$resBt['sM10']+$resBt['sM11']+$resBt['sM12']; 
$TotBt=$Pb1t+$Pb2t+$Pb3t+$Pb4t;

$sRevAt=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_hq sdh INNER JOIN hrm_sales_seedsproduct sp ON sdh.ProductId=sp.ProductId INNER JOIN hrm_sales_hq_temp hqt ON sdh.HqId=hqt.HqId where EmployeeID=".$_REQUEST['mainv']." AND sp.ItemId=".$_REQUEST['ii']." AND sp.ProductSts='A' AND YearId=".$_REQUEST['y'], $con); $sRevBt=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_hq sdh INNER JOIN hrm_sales_seedsproduct sp ON sdh.ProductId=sp.ProductId INNER JOIN hrm_sales_hq_temp hqt ON sdh.HqId=hqt.HqId where EmployeeID=".$_REQUEST['mainv']." AND sp.ItemId=".$_REQUEST['ii']." AND sp.ProductSts='A' AND YearId=".$AfterYId, $con); 
$rRevAt=mysql_fetch_assoc($sRevAt); $rRevBt=mysql_fetch_assoc($sRevBt);

}
else {
if($_REQUEST['crop']==1 OR $_REQUEST['crop']==2){

$sql4tat=mysql_query("select SUM(M1) as sM1,SUM(M2) as sM2,SUM(M3) as sM3,SUM(M4) as sM4,SUM(M5) as sM5,SUM(M6) as sM6,SUM(M7) as sM7,SUM(M8) as sM8,SUM(M9) as sM9,SUM(M10) as sM10,SUM(M11) as sM11,SUM(M12) as sM12 from hrm_sales_sal_details_".$_REQUEST['y']." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId INNER JOIN hrm_sales_seedsitem si ON sp.ItemId=si.ItemId INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_sales_hq_temp hqt ON d.HqId=hqt.HqId where HqTEmpStatus='A' AND sp.ProductSts='A' AND hqt.EmployeeID=".$_REQUEST['mainv']." AND si.GroupId=".$_REQUEST['crop']." AND sd.YearId=".$_REQUEST['y'], $con); 
$sql5tat=mysql_query("select SUM(M1_Proj) as sM1,SUM(M2_Proj) as sM2,SUM(M3_Proj) as sM3,SUM(M4_Proj) as sM4,SUM(M5_Proj) as sM5,SUM(M6_Proj) as sM6,SUM(M7_Proj) as sM7,SUM(M8_Proj) as sM8,SUM(M9_Proj) as sM9,SUM(M10_Proj) as sM10,SUM(M11_Proj) as sM11,SUM(M12_Proj) as sM12 from hrm_sales_sal_details_".$AfterYId." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId INNER JOIN hrm_sales_seedsitem si ON sp.ItemId=si.ItemId INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_sales_hq_temp hqt ON d.HqId=hqt.HqId where HqTEmpStatus='A' AND hqt.EmployeeID=".$_REQUEST['mainv']." AND si.GroupId=".$_REQUEST['crop']." AND sp.ProductSts='A' AND sd.YearId=".$AfterYId, $con); 
$res4tat=mysql_fetch_assoc($sql4tat); $res5tat=mysql_fetch_assoc($sql5tat); 

$sqlAt=mysql_query("select SUM(M1) as sM1,SUM(M2) as sM2,SUM(M3) as sM3,SUM(M4) as sM4,SUM(M5) as sM5,SUM(M6) as sM6,SUM(M7) as sM7,SUM(M8) as sM8,SUM(M9) as sM9,SUM(M10) as sM10,SUM(M11) as sM11,SUM(M12) as sM12 from hrm_sales_sal_details_".$_REQUEST['y']." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId INNER JOIN hrm_sales_seedsitem si ON sp.ItemId=si.ItemId INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_sales_hq_temp hqt ON d.HqId=hqt.HqId where HqTEmpStatus='A' AND hqt.EmployeeID=".$_REQUEST['mainv']." AND sp.ProductSts='A' AND si.GroupId=".$_REQUEST['crop']." AND sd.YearId=".$_REQUEST['y'], $con); 
$sqlBt=mysql_query("select SUM(M1_Proj) as sM1,SUM(M2_Proj) as sM2,SUM(M3_Proj) as sM3,SUM(M4_Proj) as sM4,SUM(M5_Proj) as sM5,SUM(M6_Proj) as sM6,SUM(M7_Proj) as sM7,SUM(M8_Proj) as sM8,SUM(M9_Proj) as sM9,SUM(M10_Proj) as sM10,SUM(M11_Proj) as sM11,SUM(M12_Proj) as sM12 from hrm_sales_sal_details_".$AfterYId." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId INNER JOIN hrm_sales_seedsitem si ON sp.ItemId=si.ItemId INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_sales_hq_temp hqt ON d.HqId=hqt.HqId where HqTEmpStatus='A' AND hqt.EmployeeID=".$_REQUEST['mainv']." AND si.GroupId=".$_REQUEST['crop']." AND sp.ProductSts='A' AND sd.YearId=".$AfterYId, $con); 
$resAt=mysql_fetch_assoc($sqlAt); $resBt=mysql_fetch_assoc($sqlBt);
$Pa1t=$resAt['sM1']+$resAt['sM2']+$resAt['sM3']; $Pa2t=$resAt['sM4']+$resAt['sM5']+$resAt['sM6']; 
$Pa3t=$resAt['sM7']+$resAt['sM8']+$resAt['sM9']; $Pa4t=$resAt['sM10']+$resAt['sM11']+$resAt['sM12']; 
$TotAt=$Pa1t+$Pa2t+$Pa3t+$Pa4t;
$Pb1t=$resBt['sM1']+$resBt['sM2']+$resBt['sM3']; $Pb2t=$resBt['sM4']+$resBt['sM5']+$resBt['sM6']; 
$Pb3t=$resBt['sM7']+$resBt['sM8']+$resBt['sM9']; $Pb4t=$resBt['sM10']+$resBt['sM11']+$resBt['sM12']; 
$TotBt=$Pb1t+$Pb2t+$Pb3t+$Pb4t;

$sRevAt=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_hq sdh INNER JOIN hrm_sales_seedsproduct sp ON sdh.ProductId=sp.ProductId INNER JOIN hrm_sales_seedsitem si ON sp.ItemId=si.ItemId INNER JOIN hrm_sales_hq_temp hqt ON sdh.HqId=hqt.HqId where EmployeeID=".$_REQUEST['mainv']." AND sp.ProductSts='A' AND si.GroupId=".$_REQUEST['crop']." AND YearId=".$_REQUEST['y'], $con); 
$sRevBt=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_hq sdh INNER JOIN hrm_sales_seedsproduct sp ON sdh.ProductId=sp.ProductId INNER JOIN hrm_sales_seedsitem si ON sp.ItemId=si.ItemId INNER JOIN hrm_sales_hq_temp hqt ON sdh.HqId=hqt.HqId where EmployeeID=".$_REQUEST['mainv']." AND sp.ProductSts='A' AND si.GroupId=".$_REQUEST['crop']." AND YearId=".$AfterYId, $con); 
$rRevAt=mysql_fetch_assoc($sRevAt); $rRevBt=mysql_fetch_assoc($sRevBt);

}
elseif($_REQUEST['crop']==3){ 
$sql4tat=mysql_query("select SUM(M1) as sM1,SUM(M2) as sM2,SUM(M3) as sM3,SUM(M4) as sM4,SUM(M5) as sM5,SUM(M6) as sM6,SUM(M7) as sM7,SUM(M8) as sM8,SUM(M9) as sM9,SUM(M10) as sM10,SUM(M11) as sM11,SUM(M12) as sM12 from hrm_sales_sal_details_".$_REQUEST['y']." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId INNER JOIN hrm_sales_seedsitem si ON sp.ItemId=si.ItemId INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_sales_hq_temp hqt ON d.HqId=hqt.HqId where HqTEmpStatus='A' AND sp.ProductSts='A' AND hqt.EmployeeID=".$_REQUEST['mainv']." AND (si.GroupId=1 OR si.GroupId=2) AND sd.YearId=".$_REQUEST['y'], $con); 
$sql5tat=mysql_query("select SUM(M1_Proj) as sM1,SUM(M2_Proj) as sM2,SUM(M3_Proj) as sM3,SUM(M4_Proj) as sM4,SUM(M5_Proj) as sM5,SUM(M6_Proj) as sM6,SUM(M7_Proj) as sM7,SUM(M8_Proj) as sM8,SUM(M9_Proj) as sM9,SUM(M10_Proj) as sM10,SUM(M11_Proj) as sM11,SUM(M12_Proj) as sM12 from hrm_sales_sal_details_".$AfterYId." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId INNER JOIN hrm_sales_seedsitem si ON sp.ItemId=si.ItemId INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_sales_hq_temp hqt ON d.HqId=hqt.HqId where HqTEmpStatus='A' AND hqt.EmployeeID=".$_REQUEST['mainv']." AND (si.GroupId=1 OR si.GroupId=2) AND sp.ProductSts='A' AND sd.YearId=".$AfterYId, $con); 
$res4tat=mysql_fetch_assoc($sql4tat); $res5tat=mysql_fetch_assoc($sql5tat); 

$sqlAt=mysql_query("select SUM(M1) as sM1,SUM(M2) as sM2,SUM(M3) as sM3,SUM(M4) as sM4,SUM(M5) as sM5,SUM(M6) as sM6,SUM(M7) as sM7,SUM(M8) as sM8,SUM(M9) as sM9,SUM(M10) as sM10,SUM(M11) as sM11,SUM(M12) as sM12 from hrm_sales_sal_details_".$_REQUEST['y']." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId INNER JOIN hrm_sales_seedsitem si ON sp.ItemId=si.ItemId INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_sales_hq_temp hqt ON d.HqId=hqt.HqId where HqTEmpStatus='A' AND hqt.EmployeeID=".$_REQUEST['mainv']." AND sp.ProductSts='A' AND (si.GroupId=1 OR si.GroupId=2) AND sd.YearId=".$_REQUEST['y'], $con); 

$sqlBt=mysql_query("select SUM(M1_Proj) as sM1,SUM(M2_Proj) as sM2,SUM(M3_Proj) as sM3,SUM(M4_Proj) as sM4,SUM(M5_Proj) as sM5,SUM(M6_Proj) as sM6,SUM(M7_Proj) as sM7,SUM(M8_Proj) as sM8,SUM(M9_Proj) as sM9,SUM(M10_Proj) as sM10,SUM(M11_Proj) as sM11,SUM(M12_Proj) as sM12 from hrm_sales_sal_details_".$AfterYId." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId INNER JOIN hrm_sales_seedsitem si ON sp.ItemId=si.ItemId INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_sales_hq_temp hqt ON d.HqId=hqt.HqId where HqTEmpStatus='A' AND hqt.EmployeeID=".$_REQUEST['mainv']." AND (si.GroupId=1 OR si.GroupId=2) AND sp.ProductSts='A' AND sd.YearId=".$AfterYId, $con); 
$resAt=mysql_fetch_assoc($sqlAt); $resBt=mysql_fetch_assoc($sqlBt);
$Pa1t=$resAt['sM1']+$resAt['sM2']+$resAt['sM3']; $Pa2t=$resAt['sM4']+$resAt['sM5']+$resAt['sM6']; 
$Pa3t=$resAt['sM7']+$resAt['sM8']+$resAt['sM9']; $Pa4t=$resAt['sM10']+$resAt['sM11']+$resAt['sM12']; 
$TotAt=$Pa1t+$Pa2t+$Pa3t+$Pa4t;
$Pb1t=$resBt['sM1']+$resBt['sM2']+$resBt['sM3']; $Pb2t=$resBt['sM4']+$resBt['sM5']+$resBt['sM6']; 
$Pb3t=$resBt['sM7']+$resBt['sM8']+$resBt['sM9']; $Pb4t=$resBt['sM10']+$resBt['sM11']+$resBt['sM12']; 
$TotBt=$Pb1t+$Pb2t+$Pb3t+$Pb4t;

$sRevAt=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_hq sdh INNER JOIN hrm_sales_hq_temp hqt ON sdh.HqId=hqt.HqId INNER JOIN hrm_sales_seedsproduct sp ON sdh.ProductId=sp.ProductId where EmployeeID=".$_REQUEST['mainv']." AND sp.ProductSts='A' AND YearId=".$_REQUEST['y'], $con); $sRevBt=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_hq sdh INNER JOIN hrm_sales_hq_temp hqt ON sdh.HqId=hqt.HqId INNER JOIN hrm_sales_seedsproduct sp ON sdh.ProductId=sp.ProductId where EmployeeID=".$_REQUEST['mainv']." AND sp.ProductSts='A' AND YearId=".$AfterYId, $con); 
$rRevAt=mysql_fetch_assoc($sRevAt); $rRevBt=mysql_fetch_assoc($sRevBt); 

}
}

}
$TotPp1=$resP1t['sM1']+$resP1t['sM2']+$resP1t['sM3']; $TotPp2=$resP1t['sM4']+$resP1t['sM5']+$resP1t['sM6'];
$TotPp3=$resP1t['sM7']+$resP1t['sM8']+$resP1t['sM9']; $TotPp4=$resP1t['sM10']+$resP1t['sM11']+$resP1t['sM12'];
$TotP2ta=$res4tat['sM1']+$res4tat['sM2']+$res4tat['sM3']; $TotP2tb=$res4tat['sM4']+$res4tat['sM5']+$res4tat['sM6'];
$TotP2tc=$res4tat['sM7']+$res4tat['sM8']+$res4tat['sM9']; $TotP2td=$res4tat['sM10']+$res4tat['sM11']+$res4tat['sM12'];
$TotP3ta=$res5tat['sM1']+$res5tat['sM2']+$res5tat['sM3']; $TotP3tb=$res5tat['sM4']+$res5tat['sM5']+$res5tat['sM6'];
$TotP3tc=$res5tat['sM7']+$res5tat['sM8']+$res5tat['sM9']; $TotP3td=$res5tat['sM10']+$res5tat['sM11']+$res5tat['sM12'];

$TRevAt=$rRevAt['Qa']+$rRevAt['Qb']+$rRevAt['Qc']+$rRevAt['Qd']; $TRevBt=$rRevBt['Qa']+$rRevBt['Qb']+$rRevBt['Qc']+$rRevBt['Qd'];
}

?>
   <tr style="font-size:12px;color:#000000;background-color:#FFCEB7;height:24px;">
	 <td colspan="3" align="right" style="font-size:16px;"><b>TOTAL:&nbsp;</b></td>

<?php if($rowRpt>0){ ?>	 	
<td align="right"><?php if($Pa1t!='' AND $Pa1t!=0){echo floatval($Pa1t);}else{echo '&nbsp;';} ?></td>
<td align="right"><?php if($Pb1t!='' AND $Pb1t!=0){echo floatval($Pb1t);}else{echo '&nbsp;';} ?></td>
<?php } ?>
	 <td align="right"><?php if($TotP2ta!=''){echo floatval($TotP2ta);}else{echo '&nbsp;';} ?></td>
	 <td align="right"><?php if($TotP3ta!=''){echo floatval($TotP3ta);}else{echo '&nbsp;';} ?></td>

<?php if($rowRpt>0){ ?>	 
<td align="right"><?php if($Pa2t!='' AND $Pa2t!=0){echo floatval($Pa2t);}else{echo '&nbsp;';} ?></td>
<td align="right"><?php if($Pb2t!='' AND $Pb2t!=0){echo floatval($Pb2t);}else{echo '&nbsp;';} ?></td> 
<?php } ?>
	 <td align="right"><?php if($TotP2tb!=''){echo floatval($TotP2tb);}else{echo '&nbsp;';} ?></td>
	 <td align="right"><?php if($TotP3tb!=''){echo floatval($TotP3tb);}else{echo '&nbsp;';} ?></td>

<?php if($rowRpt>0){ ?>	 
<td align="right"><?php if($Pa3t!='' AND $Pa3t!=0){echo floatval($Pa3t);}else{echo '&nbsp;';} ?></td>
<td align="right"><?php if($Pb3t!='' AND $Pb3t!=0){echo floatval($Pb3t);}else{echo '&nbsp;';} ?></td>
<?php } ?>	 
	 <td align="right"><?php if($TotP2tc!=''){echo floatval($TotP2tc);}else{echo '&nbsp;';} ?></td>	 
	 <td align="right"><?php if($TotP3tc!=''){echo floatval($TotP3tc);}else{echo '&nbsp;';} ?></td>	

<?php if($rowRpt>0){ ?>	 
<td align="right"><?php if($Pa4t!='' AND $Pa4t!=0){echo floatval($Pa4t);}else{echo '&nbsp;';} ?></td>
<td align="right"><?php if($Pb4t!='' AND $Pb4t!=0){echo floatval($Pb4t);}else{echo '&nbsp;';} ?></td> 	
<?php } ?> 		
	 <td align="right"><?php if($TotP2td!=''){echo floatval($TotP2td);}else{echo '&nbsp;';} ?></td>	 
	 <td align="right"><?php if($TotP3td!=''){echo floatval($TotP3td);}else{echo '&nbsp;';} ?></td>
<?php $TotP1t=$TotPp1+$TotPp2+$TotPp3+$TotPp4; $TotP2t=$TotP2ta+$TotP2tb+$TotP2tc+$TotP2td; $TotP3t=$TotP3ta+$TotP3tb+$TotP3tc+$TotP3td; ?>

<?php if($rowRpt>0){ ?>	  
<td align="right"><?php if($TotAt!='' AND $TotAt!=0){echo floatval($TotAt);}else{echo '&nbsp;';} ?></td>
<td align="right"><?php if($TotBt!='' AND $TotBt!=0){echo floatval($TotBt);}else{echo '&nbsp;';} ?></td> 
<?php } ?>
	  <td align="right"><?php if($TotP2t!=0 AND $TotP2t!=''){echo floatval($TotP2t);}else{echo '&nbsp;';} ?></td>	  
	  <td align="right"><?php if($TotP3t!=0 AND $TotP3t!=''){echo floatval($TotP3t);}else{echo '&nbsp;';} ?></td>
	  
	  <td align="right"><?php if($TRevAt!=0 AND $TRevAt!=''){echo floatval($TRevAt);}else{echo '&nbsp;';} ?></td>	  
	  <td align="right"><?php if($TRevBt!=0 AND $TRevBt!=''){echo floatval($TRevBt);}else{echo '&nbsp;';} ?></td>
  </tr>	 
<?php /*Total Close **********************************/ ?>	
<?php 
if($_REQUEST['ii']>0){ $sql = mysql_query("select sp.ItemId,ProductId,ProductName,ItemName,ItemCode,TypeName from hrm_sales_seedsproduct sp INNER JOIN hrm_sales_seedsitem si ON sp.ItemId=si.ItemId INNER JOIN hrm_sales_seedtype st ON sp.TypeId=st.TypeId where sp.ItemId=".$_REQUEST['ii']." AND sp.ProductSts='A' order by ItemName ASC, ProductName ASC, TypeName ASC", $con);}
else {
 if($_REQUEST['crop']==1 OR $_REQUEST['crop']==2){$sql = mysql_query("select sp.ItemId,ProductId,ProductName,ItemName,ItemCode,TypeName from hrm_sales_seedsproduct sp INNER JOIN hrm_sales_seedsitem si ON sp.ItemId=si.ItemId INNER JOIN hrm_sales_seedtype st ON sp.TypeId=st.TypeId where si.GroupId=".$_REQUEST['crop']." AND sp.ProductSts='A' order by ItemName ASC, ProductName ASC, TypeName ASC", $con); }
 elseif($_REQUEST['crop']==3){$sql = mysql_query("select sp.ItemId,ProductId,ProductName,ItemName,ItemCode,TypeName from hrm_sales_seedsproduct sp INNER JOIN hrm_sales_seedsitem si ON sp.ItemId=si.ItemId INNER JOIN hrm_sales_seedtype st ON sp.TypeId=st.TypeId where sp.ProductSts='A' order by ItemName ASC, ProductName ASC, TypeName ASC", $con); } 
}
$Sn=1; while($res=mysql_fetch_array($sql)){
if($_REQUEST['findV']=='TT'){ 
$sqlRpt=mysql_query("select g.EmployeeID from hrm_employee_general g INNER JOIN hrm_employee e ON g.EmployeeID=e.EmployeeID where g.DepartmentId=6 AND e.EmpStatus='A' AND g.RepEmployeeID=".$_REQUEST['mainv'], $con); $rowRpt=mysql_num_rows($sqlRpt);
if($rowRpt>0)
{ 

if($rtl>0)
{

$sqlAa=mysql_query("select SUM(M1) as sM1,SUM(M2) as sM2,SUM(M3) as sM3,SUM(M4) as sM4,SUM(M5) as sM5,SUM(M6) as sM6,SUM(M7) as sM7,SUM(M8) as sM8,SUM(M9) as sM9,SUM(M10) as sM10,SUM(M11) as sM11,SUM(M12) as sM12 from hrm_sales_sal_details_".$_REQUEST['y']." sd INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_sales_tlemp tl ON d.HqId=tl.TLHq where TLStatus='A' AND tl.TLRepId=".$EmployeeId." AND sd.ProductId=".$res['ProductId']." AND sd.YearId=".$_REQUEST['y'], $con); 
$sqlBa=mysql_query("select SUM(M1_Proj) as sM1,SUM(M2_Proj) as sM2,SUM(M3_Proj) as sM3,SUM(M4_Proj) as sM4,SUM(M5_Proj) as sM5,SUM(M6_Proj) as sM6,SUM(M7_Proj) as sM7,SUM(M8_Proj) as sM8,SUM(M9_Proj) as sM9,SUM(M10_Proj) as sM10,SUM(M11_Proj) as sM11,SUM(M12_Proj) as sM12 from hrm_sales_sal_details_".$AfterYId." sd INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_sales_tlemp tl ON d.HqId=tl.TLHq where TLStatus='A' AND tl.TLRepId=".$EmployeeId." AND sd.ProductId=".$res['ProductId']." AND sd.YearId=".$AfterYId, $con); $resAa=mysql_fetch_assoc($sqlAa); $resBa=mysql_fetch_assoc($sqlBa);
}


$sql4ta=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_terr where TerrRepEmpID=".$_REQUEST['mainv']." AND ProductId=".$res['ProductId']." AND YearId=".$_REQUEST['y'], $con); $sql5ta=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_terr where TerrRepEmpID=".$_REQUEST['mainv']." AND ProductId=".$res['ProductId']." AND YearId=".$AfterYId, $con); $res4ta=mysql_fetch_assoc($sql4ta); $res5ta=mysql_fetch_assoc($sql5ta);
$sql4tb=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_hq where HqRepEmpID=".$_REQUEST['mainv']." AND ProductId=".$res['ProductId']." AND YearId=".$_REQUEST['y'], $con); $sql5tb=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_hq where HqRepEmpID=".$_REQUEST['mainv']." AND ProductId=".$res['ProductId']." AND YearId=".$AfterYId, $con); 
$res4tb=mysql_fetch_assoc($sql4tb); $res5tb=mysql_fetch_assoc($sql5tb);
if($rtl>0)
{
$Pp1=$resP1['sM1']+$resP1['sM2']+$resP1['sM3']+$resP1a['sM1']+$resP1a['sM2']+$resP1a['sM3']; 
$Pp2=$resP1['sM4']+$resP1['sM5']+$resP1['sM6']+$resP1a['sM4']+$resP1a['sM5']+$resP1a['sM6'];
$Pp3=$resP1['sM7']+$resP1['sM8']+$resP1['sM9']+$resP1a['sM7']+$resP1a['sM8']+$resP1a['sM9']; 
$Pp4=$resP1['sM10']+$resP1['sM11']+$resP1['sM12']+$resP1a['sM10']+$resP1a['sM11']+$resP1a['sM12'];
}
else
{
$Pp1=$resP1['sM1']+$resP1['sM2']+$resP1['sM3']; $Pp2=$resP1['sM4']+$resP1['sM5']+$resP1['sM6'];
$Pp3=$resP1['sM7']+$resP1['sM8']+$resP1['sM9']; $Pp4=$resP1['sM10']+$resP1['sM11']+$resP1['sM12'];
}

$TotP2a=$res4ta['Qa']+$res4tb['Qa']; $TotP2b=$res4ta['Qb']+$res4tb['Qb']; 
$TotP2c=$res4ta['Qc']+$res4tb['Qc']; $TotP2d=$res4ta['Qd']+$res4tb['Qd'];
$TotP3a=$res5ta['Qa']+$res5tb['Qa']; $TotP3b=$res5ta['Qb']+$res5tb['Qb']; 
$TotP3c=$res5ta['Qc']+$res5tb['Qc']; $TotP3d=$res5ta['Qd']+$res5tb['Qd'];

$sqlA=mysql_query("select SUM(M1) as sM1,SUM(M2) as sM2,SUM(M3) as sM3,SUM(M4) as sM4,SUM(M5) as sM5,SUM(M6) as sM6,SUM(M7) as sM7,SUM(M8) as sM8,SUM(M9) as sM9,SUM(M10) as sM10,SUM(M11) as sM11,SUM(M12) as sM12 from hrm_sales_sal_details_".$_REQUEST['y']." sd INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_sales_hq_temp hqt ON d.HqId=hqt.HqId INNER JOIN hrm_employee_general g ON hqt.EmployeeID=g.EmployeeID where HqTEmpStatus='A' AND (hqt.EmployeeID=".$_REQUEST['mainv']." OR g.RepEmployeeID=".$_REQUEST['mainv'].") AND sd.ProductId=".$res['ProductId']." AND sd.YearId=".$_REQUEST['y'], $con); 
$sqlB=mysql_query("select SUM(M1_Proj) as sM1,SUM(M2_Proj) as sM2,SUM(M3_Proj) as sM3,SUM(M4_Proj) as sM4,SUM(M5_Proj) as sM5,SUM(M6_Proj) as sM6,SUM(M7_Proj) as sM7,SUM(M8_Proj) as sM8,SUM(M9_Proj) as sM9,SUM(M10_Proj) as sM10,SUM(M11_Proj) as sM11,SUM(M12_Proj) as sM12 from hrm_sales_sal_details_".$AfterYId." sd INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_sales_hq_temp hqt ON d.HqId=hqt.HqId INNER JOIN hrm_employee_general g ON hqt.EmployeeID=g.EmployeeID where HqTEmpStatus='A' AND (hqt.EmployeeID=".$_REQUEST['mainv']." OR g.RepEmployeeID=".$_REQUEST['mainv'].") AND sd.ProductId=".$res['ProductId']." AND sd.YearId=".$AfterYId, $con); $resA=mysql_fetch_assoc($sqlA); $resB=mysql_fetch_assoc($sqlB);
if($rtl>0)
{
$Pa1=$resA['sM1']+$resA['sM2']+$resA['sM3']+$resAa['sM1']+$resAa['sM2']+$resAa['sM3']; 
$Pa2=$resA['sM4']+$resA['sM5']+$resA['sM6']+$resAa['sM4']+$resAa['sM5']+$resAa['sM6']; 
$Pa3=$resA['sM7']+$resA['sM8']+$resA['sM9']+$resAa['sM7']+$resAa['sM8']+$resAa['sM9']; 
$Pa4=$resA['sM10']+$resA['sM11']+$resA['sM12']+$resAa['sM10']+$resAa['sM11']+$resAa['sM12']; 
$Pb1=$resB['sM1']+$resB['sM2']+$resB['sM3']+$resBa['sM1']+$resBa['sM2']+$resBa['sM3']; 
$Pb2=$resB['sM4']+$resB['sM5']+$resB['sM6']+$resBa['sM4']+$resBa['sM5']+$resBa['sM6']; 
$Pb3=$resB['sM7']+$resB['sM8']+$resB['sM9']+$resBa['sM7']+$resBa['sM8']+$resBa['sM9']; 
$Pb4=$resB['sM10']+$resB['sM11']+$resB['sM12']+$resBa['sM10']+$resBa['sM11']+$resBa['sM12'];
}
else
{
$Pa1=$resA['sM1']+$resA['sM2']+$resA['sM3']; $Pa2=$resA['sM4']+$resA['sM5']+$resA['sM6']; 
$Pa3=$resA['sM7']+$resA['sM8']+$resA['sM9']; $Pa4=$resA['sM10']+$resA['sM11']+$resA['sM12']; 
$Pb1=$resB['sM1']+$resB['sM2']+$resB['sM3']; $Pb2=$resB['sM4']+$resB['sM5']+$resB['sM6']; 
$Pb3=$resB['sM7']+$resB['sM8']+$resB['sM9']; $Pb4=$resB['sM10']+$resB['sM11']+$resB['sM12'];
}
$TotA=$Pa1+$Pa2+$Pa3+$Pa4;
$TotB=$Pb1+$Pb2+$Pb3+$Pb4;

$sRevA=mysql_query("select * from hrm_sales_sal_details_terr where TerrEmpID=".$_REQUEST['mainv']." AND ProductId=".$res['ProductId']." AND YearId=".$_REQUEST['y'], $con); 
$sRevB=mysql_query("select * from hrm_sales_sal_details_terr where TerrEmpID=".$_REQUEST['mainv']." AND ProductId=".$res['ProductId']." AND YearId=".$AfterYId, $con); 
$rRevA=mysql_fetch_assoc($sRevA); $rRevB=mysql_fetch_assoc($sRevB);

} 
elseif($rowRpt==0){ 

$sql4ta=mysql_query("select SUM(M1) as sM1,SUM(M2) as sM2,SUM(M3) as sM3,SUM(M4) as sM4,SUM(M5) as sM5,SUM(M6) as sM6,SUM(M7) as sM7,SUM(M8) as sM8,SUM(M9) as sM9,SUM(M10) as sM10,SUM(M11) as sM11,SUM(M12) as sM12 from hrm_sales_sal_details_".$_REQUEST['y']." sd INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_sales_hq_temp hqt ON d.HqId=hqt.HqId where HqTEmpStatus='A' AND hqt.EmployeeID=".$_REQUEST['mainv']." AND sd.ProductId=".$res['ProductId']." AND sd.YearId=".$_REQUEST['y'], $con); 
$sql5ta=mysql_query("select SUM(M1_Proj) as sM1,SUM(M2_Proj) as sM2,SUM(M3_Proj) as sM3,SUM(M4_Proj) as sM4,SUM(M5_Proj) as sM5,SUM(M6_Proj) as sM6,SUM(M7_Proj) as sM7,SUM(M8_Proj) as sM8,SUM(M9_Proj) as sM9,SUM(M10_Proj) as sM10,SUM(M11_Proj) as sM11,SUM(M12_Proj) as sM12 from hrm_sales_sal_details_".$AfterYId." sd INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_sales_hq_temp hqt ON d.HqId=hqt.HqId where HqTEmpStatus='A' AND hqt.EmployeeID=".$_REQUEST['mainv']." AND sd.ProductId=".$res['ProductId']." AND sd.YearId=".$AfterYId, $con); 
$res4ta=mysql_fetch_assoc($sql4ta); $res5ta=mysql_fetch_assoc($sql5ta);

$Pp1=$resP1['sM1']+$resP1['sM2']+$resP1['sM3']; $Pp2=$resP1['sM4']+$resP1['sM5']+$resP1['sM6'];
$Pp3=$resP1['sM7']+$resP1['sM8']+$resP1['sM9']; $Pp4=$resP1['sM10']+$resP1['sM11']+$resP1['sM12'];
$TotP2a=$res4ta['sM1']+$res4ta['sM2']+$res4ta['sM3']; $TotP2b=$res4ta['sM4']+$res4ta['sM5']+$res4ta['sM6'];
$TotP2c=$res4ta['sM7']+$res4ta['sM8']+$res4ta['sM9']; $TotP2d=$res4ta['sM10']+$res4ta['sM11']+$res4ta['sM12'];
$TotP3a=$res5ta['sM1']+$res5ta['sM2']+$res5ta['sM3']; $TotP3b=$res5ta['sM4']+$res5ta['sM5']+$res5ta['sM6'];
$TotP3c=$res5ta['sM7']+$res5ta['sM8']+$res5ta['sM9']; $TotP3d=$res5ta['sM10']+$res5ta['sM11']+$res5ta['sM12'];

$sqlA=mysql_query("select SUM(M1) as sM1,SUM(M2) as sM2,SUM(M3) as sM3,SUM(M4) as sM4,SUM(M5) as sM5,SUM(M6) as sM6,SUM(M7) as sM7,SUM(M8) as sM8,SUM(M9) as sM9,SUM(M10) as sM10,SUM(M11) as sM11,SUM(M12) as sM12 from hrm_sales_sal_details_".$_REQUEST['y']." sd INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_sales_hq_temp hqt ON d.HqId=hqt.HqId INNER JOIN hrm_employee_general g ON hqt.EmployeeID=g.EmployeeID where HqTEmpStatus='A' AND (hqt.EmployeeID=".$_REQUEST['mainv']." OR g.RepEmployeeID=".$_REQUEST['mainv'].") AND sd.ProductId=".$res['ProductId']." AND sd.YearId=".$_REQUEST['y'], $con); 
$sqlB=mysql_query("select SUM(M1_Proj) as sM1,SUM(M2_Proj) as sM2,SUM(M3_Proj) as sM3,SUM(M4_Proj) as sM4,SUM(M5_Proj) as sM5,SUM(M6_Proj) as sM6,SUM(M7_Proj) as sM7,SUM(M8_Proj) as sM8,SUM(M9_Proj) as sM9,SUM(M10_Proj) as sM10,SUM(M11_Proj) as sM11,SUM(M12_Proj) as sM12 from hrm_sales_sal_details_".$AfterYId." sd INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_sales_hq_temp hqt ON d.HqId=hqt.HqId INNER JOIN hrm_employee_general g ON hqt.EmployeeID=g.EmployeeID where HqTEmpStatus='A' AND (hqt.EmployeeID=".$_REQUEST['mainv']." OR g.RepEmployeeID=".$_REQUEST['mainv'].") AND sd.ProductId=".$res['ProductId']." AND sd.YearId=".$AfterYId, $con); 
$resA=mysql_fetch_assoc($sqlA); $resB=mysql_fetch_assoc($sqlB);

$Pa1=$resA['sM1']+$resA['sM2']+$resA['sM3']; $Pa2=$resA['sM4']+$resA['sM5']+$resA['sM6']; 
$Pa3=$resA['sM7']+$resA['sM8']+$resA['sM9']; $Pa4=$resA['sM10']+$resA['sM11']+$resA['sM12']; $TotA=$Pa1+$Pa2+$Pa3+$Pa4;
$Pb1=$resB['sM1']+$resB['sM2']+$resB['sM3']; $Pb2=$resB['sM4']+$resB['sM5']+$resB['sM6']; 
$Pb3=$resB['sM7']+$resB['sM8']+$resB['sM9']; $Pb4=$resB['sM10']+$resB['sM11']+$resB['sM12']; $TotB=$Pb1+$Pb2+$Pb3+$Pb4;

$sRevA=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_hq sdh INNER JOIN hrm_sales_hq_temp hqt ON sdh.HqId=hqt.HqId where EmployeeID=".$_REQUEST['mainv']." AND ProductId=".$res['ProductId']." AND hqt.HqTEmpStatus='A' AND YearId=".$_REQUEST['y'], $con); 
$sRevB=mysql_query("select SUM(Q1) as Qa,SUM(Q2) as Qb,SUM(Q3) as Qc,SUM(Q4) as Qd from hrm_sales_sal_details_hq sdh INNER JOIN hrm_sales_hq_temp hqt ON sdh.HqId=hqt.HqId where EmployeeID=".$_REQUEST['mainv']." AND ProductId=".$res['ProductId']." AND hqt.HqTEmpStatus='A' AND YearId=".$AfterYId, $con); 
$rRevA=mysql_fetch_assoc($sRevA); $rRevB=mysql_fetch_assoc($sRevB);
}
}

$TRevA=$rRevA['Qa']+$rRevA['Qb']+$rRevA['Qc']+$rRevA['Qd']; $TRevB=$rRevB['Qa']+$rRevB['Qb']+$rRevB['Qc']+$rRevB['Qd'];

if($rowRpt>0){$a1=$Pa1; $a2=$Pa2; $a3=$Pa3; $a4=$Pa4; $b1=$Pb1; $b2=$Pb2; $b3=$Pb3; $b4=$Pb4; }
else{$a1=0; $a2=0; $a3=0; $a4=0; $b1=0; $b2=0; $b3=0; $b4=0;}

if($TotP2a!=0 OR $TotP2b!=0 OR $TotP2c!=0 OR $TotP2d!=0 OR $TotP3a!=0 OR $TotP3b!=0 OR $TotP3c!=0 OR $TotP3d!=0 OR $a1!=0 OR $a2!=0 OR $a3!=0 OR $a4!=0 OR $b1!=0 OR $b2!=0 OR $b3!=0 OR $b4!=0 OR $TRevA!=0 OR $TRevB!=0){
?>	

  <tr bgcolor="#EEEEEE" style="height:22px;font-size:12px;" id="TR<?php echo $Sn; ?>">  
     <td bgcolor="#FFFFFF" style="font-size:12px;"><?php echo $res['ItemCode']; ?></td>		 
	 <td bgcolor="#FFFFFF" style="font-size:12px;"><?php echo $res['ProductName']; ?><input type="hidden" id="P_<?php echo $Sn; ?>" value="<?php echo $res['ProductId']; ?>" /></td>
	 <td bgcolor="#FFFFFF" align="center" style="font-size:12px;"><?php echo substr_replace($res['TypeName'], '', 2); ?></td>			 							 					

<?php if($rowRpt>0){ ?>
<td align="right" bgcolor="#FFFF9B"><?php if($Pa1!='' AND $Pa1!=0){echo floatval($Pa1);}else{echo '&nbsp;';} ?></td>
<td align="right" bgcolor="#FFFF9B"><?php if($Pb1!='' AND $Pb1!=0){echo floatval($Pb1);}else{echo '&nbsp;';} ?></td>
<?php } ?>
<td align="right" bgcolor="#CAFF95"><?php if($TotP2a!='' AND $TotP2a!=0){echo floatval($TotP2a);}else{echo '&nbsp;';} ?></td>
<td align="right" bgcolor="#CAFF95"><?php if($TotP3a!='' AND $TotP3a!=0){echo floatval($TotP3a);}else{echo '&nbsp;';} ?></td>

<?php if($rowRpt>0){ ?>
<td align="right" bgcolor="#FFFF9B"><?php if($Pa2!='' AND $Pa2!=0){echo floatval($Pa2);}else{echo '&nbsp;';} ?></td>
<td align="right" bgcolor="#FFFF9B"><?php if($Pb2!='' AND $Pb2!=0){echo floatval($Pb2);}else{echo '&nbsp;';} ?></td>
<?php } ?>
<td align="right" bgcolor="#CAFF95"><?php if($TotP2b!='' AND $TotP2b!=0){echo floatval($TotP2b);}else{echo '&nbsp;';} ?></td>
<td align="right" bgcolor="#CAFF95"><?php if($TotP3b!='' AND $TotP3b!=0){echo floatval($TotP3b);}else{echo '&nbsp;';} ?></td>

<?php if($rowRpt>0){ ?>
<td align="right" bgcolor="#FFFF9B"><?php if($Pa3!='' AND $Pa3!=0){echo floatval($Pa3);}else{echo '&nbsp;';} ?></td>
<td align="right" bgcolor="#FFFF9B"><?php if($Pb3!='' AND $Pb3!=0){echo floatval($Pb3);}else{echo '&nbsp;';} ?></td>
<?php } ?>
<td align="right" bgcolor="#CAFF95"><?php if($TotP2c!='' AND $TotP2c!=0){echo floatval($TotP2c);}else{echo '&nbsp;';} ?></td>
<td align="right" bgcolor="#CAFF95"><?php if($TotP3c!='' AND $TotP3c!=0){echo floatval($TotP3c);}else{echo '&nbsp;';} ?></td>

<?php if($rowRpt>0){ ?>
<td align="right" bgcolor="#FFFF9B"><?php if($Pa4!='' AND $Pa4!=0){echo floatval($Pa4);}else{echo '&nbsp;';} ?></td>
<td align="right" bgcolor="#FFFF9B"><?php if($Pb4!='' AND $Pb4!=0){echo floatval($Pb4);}else{echo '&nbsp;';} ?></td>
<?php } ?>
<td align="right" bgcolor="#CAFF95"><?php if($TotP2d!='' AND $TotP2d!=0){echo floatval($TotP2d);}else{echo '&nbsp;';} ?></td>
<td align="right" bgcolor="#CAFF95"><?php if($TotP3d!='' AND $TotP3d!=0){echo floatval($TotP3d);}else{echo '&nbsp;';} ?></td>
<?php $TotP1=$Pp1+$Pp2+$Pp3+$Pp4; $TotP2=$TotP2a+$TotP2b+$TotP2c+$TotP2d; $TotP3=$TotP3a+$TotP3b+$TotP3c+$TotP3d; ?> 

<?php if($rowRpt>0){ ?>
<td align="right" bgcolor="#FFD5FF"><?php if($TotA!='' AND $TotA!=0){echo floatval($TotA);}else{echo '&nbsp;';} ?></td>
<td align="right" bgcolor="#FFD5FF"><?php if($TotB!='' AND $TotB!=0){echo floatval($TotB);}else{echo '&nbsp;';} ?></td>
<?php } ?>
<td align="right" bgcolor="#FFD5FF"><?php if($TotP2!=0 AND $TotP2!=''){echo floatval($TotP2);}else{echo '&nbsp;';} ?>
<input type="hidden" id="TotP2_<?php echo $Sn; ?>" value="<?php if($TotP2!=0){echo floatval($TotP2);}else{echo 0;} ?>"/></td>
<td align="right" bgcolor="#FFD5FF"><?php if($TotP3!=0 AND $TotP3!=''){echo floatval($TotP3);}else{echo '&nbsp;';} ?>
<input type="hidden" id="TotP3_<?php echo $Sn; ?>" value="<?php if($TotP3!=0){echo floatval($TotP3);}else{echo 0;} ?>"/></td> 

<td align="right" bgcolor="#BFFFBF"><?php if($TRevA!=0 AND $TRevA!=''){echo floatval($TRevA);}else{echo '&nbsp;';} ?>
<input type="hidden" id="STotP2_<?php echo $Sn; ?>" value="<?php if($TRevA!=0){echo floatval($TRevA);}else{echo 0;} ?>" /></td>
<td align="right" bgcolor="#BFFFBF"><?php if($TRevB!=0 AND $TRevB!=''){echo floatval($TRevB);}else{echo '&nbsp;';} ?>
<input type="hidden" id="STotP3_<?php echo $Sn; ?>" value="<?php if($TRevB!=0){echo floatval($TRevB);}else{echo 0;} ?>" />
<input type="hidden" id="PN_<?php echo $Sn; ?>" value="<?php echo $res['ProductName']; ?>" /></td>
	</tr>	
<?php } else {  ?> 
<input type="hidden" id="TotP2_<?php echo $Sn; ?>" value="0" />
<input type="hidden" id="TotP3_<?php echo $Sn; ?>" value="0" />
<input type="hidden" id="STotP2_<?php echo $Sn; ?>" value="0" />
<input type="hidden" id="STotP3_<?php echo $Sn; ?>" value="0" />
<input type="hidden" id="PN_<?php echo $Sn; ?>" value="<?php echo 'empty'; ?>" />
<?php } $Sn++; } $ActSn=$Sn-1; echo '<input type="hidden" id="ActualSn" value="'.$ActSn.'" />';  ?>    
<?php /********************** Overall Total Close ****************************/ ?>
</table>	     
 </td>
</tr>
  </table>
</td>

</tr>
<tr><td>&nbsp;</td></tr>
<?php } ?>
<?php /***************************************** Main Page Close **************************************/ ?>   
	 </table>
   </td>
  </tr>
<?php //**************************** Close ****************************************** ?>
<tr>
 <td id="TDResultId" style="width:3000px;">
  <span id="ResultTDSpan"></span>
  <span id="AddMonthResult"></span>
  <span id="SubSpanMsg"></span>
 </td>
</tr>						
				  </table>
				 </td>
			  </tr>
			</table>
           </td>
			  </tr>
	        </table>
			
<?php //******************************************************************************************** ?>
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

