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
.inner_table { height:400px;overflow-y:auto;width:auto; }
</style>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<Script type="text/javascript">window.history.forward(1);</Script>
<Script language="javascript">
function ClickCoutry(v)
{ 
  var State=0; var Hq=0;
  window.location="RptFarmerDtl.php?c="+v+"&s="+State+"&hq="+Hq; 
}
function ClickState(v)
{
  var Coutry=document.getElementById("Coutry").value; var Hq=0; 
  window.location="RptFarmerDtl.php?c="+Coutry+"&s="+v+"&hq="+Hq; 
}
function ClickHq(v)
{
  var Coutry=document.getElementById("Coutry").value; var State=document.getElementById("State").value;
  window.location="RptFarmerDtl.php?c="+Coutry+"&s="+State+"&hq="+v;
}
function ClickArea(v)
{
  var State=document.getElementById("State").value; var hq=document.getElementById("Hq").value;
   window.location="RptFarmerDtl.php?s="+State+"&hq="+hq+"&Area="+v;
}

function ExportHq(v){ window.open("ReportCSVDtl.php?action=FarmerDistrict&value="+v,"P","menubar=no,scrollbars=no,resizable=no,directories=no,width=20,height=20");}
function ExportSt(v){ window.open("ReportCSVDtl.php?action=FarmerState&value="+v,"P","menubar=no,scrollbars=no,resizable=no,directories=no,width=20,height=20");}
function ExportCo(v){ window.open("ReportCSVDtl.php?action=FarmerCountry&value="+v,"P","menubar=no,scrollbars=no,resizable=no,directories=no,width=20,height=20");} 

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
<input type="hidden" id="YId" value="<?php echo $YearId; ?>" />			  
<table border="0" style="margin-top:0px; width:100%; height:150px;">	
<tr>
 <td valign="top">
  <table border="0">
   <tr>
    <td id="Entry" style="width:800px;" valign="top">
	<span id="TabEntry">
     <table border="0">
	  <tr>
	    <td style="margin-top:0px;width:200px;" class="heading" align="center"><u>Farmer Details</u></td>
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
		<td style="font-size:11px; height:18px;width:80px;color:#E6E6E6;" align="right"><b>Dist :</b></td>
	     <td>
		 <span id="HqSpan">
		 <select style="font-size:12px;width:120px;height:20px;background-color:#DDFFBB;" name="Hq" id="Hq" onChange="ClickHq(this.value)">
<?php if($_REQUEST['hq']>0){ $sqlhq=mysql_query("SELECT DistName FROM hrm_sales_distric where DistId=".$_REQUEST['hq'], $con); $reshq=mysql_fetch_array($sqlhq); ?>
<option value="<?php echo $_REQUEST['hq']; ?>"><?php echo ucwords(strtolower($reshq['DistName'])); ?></option><?php }else{ ?><option value="">Select</option><?php } ?>
<?php if($_REQUEST['s']>0){ $sqlhq2 = mysql_query("SELECT * FROM hrm_sales_distric where StateId=".$_REQUEST['s']." order by DistName ASC", $con); while($reshq2 = mysql_fetch_array($sqlhq2)){ ?><option value="<?php echo $reshq2['DistId']; ?>"><?php echo ucwords(strtolower($reshq2['DistName'])); ?></option><?php } ?>
<?php } ?></select>
		 </span>
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
<table border="1" cellpadding="0" cellspacing="0" style="font-family:Times New Roman;font-size:14px;vertical-align:top;">	   
  <tr style="background-color:#D9F28C;color:#000000;"> 
   <?php if($_REQUEST['Area']>0){ $sqlhq=mysql_query("SELECT AreaName FROM hrm_sales_areavillage where AreaId=".$_REQUEST['Area'], $con); $reshq=mysql_fetch_array($sqlhq); ?> 
   <td colspan="2">&nbsp;&nbsp;<b>AreaName:&nbsp;<?php echo ucwords(strtolower($reshq['AreaName'])); ?></b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
   <?php }else if($_REQUEST['hq']>0){ $sqlhq=mysql_query("SELECT DistName FROM hrm_sales_distric where DistId=".$_REQUEST['hq'], $con); $reshq=mysql_fetch_array($sqlhq); ?> 
   <td colspan="5">&nbsp;&nbsp;<b>DistName:&nbsp;<?php echo ucwords(strtolower($reshq['DistName'])); ?></b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   <a href="#" onClick="ExportHq(<?php echo $_REQUEST['hq']; ?>)" style="color:#3D7900;font-size:12px;text-decoration:none;">Export Excel</a></td>
   <?php } elseif($_REQUEST['s']>0){ $sqlS=mysql_query("SELECT StateName FROM hrm_state where StateId=".$_REQUEST['s'], $con); $resS=mysql_fetch_array($sqlS);?>
   <td colspan="6">&nbsp;&nbsp;<b>State:&nbsp;<?php echo ucwords(strtolower($resS['StateName'])); ?></b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   <a href="#" onClick="ExportSt(<?php echo $_REQUEST['s']; ?>)" style="color:#3D7900;font-size:12px;text-decoration:none;">Export Excel</a></td>
   <?php } elseif($_REQUEST['c']>0){ $sqlC=mysql_query("SELECT CountryName FROM hrm_country where CountryId=".$_REQUEST['c'], $con); $resC=mysql_fetch_array($sqlC); ?> 
    <td colspan="7">&nbsp;&nbsp;<b>Country:&nbsp;<?php echo ucwords(strtolower($resC['CountryName'])); ?></b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   <a href="#" onClick="ExportCo(<?php echo $_REQUEST['c']; ?>)" style="color:#3D7900;font-size:12px;text-decoration:none;">Export Excel</a></td>
   <?php } ?>	
   <td rowspan="2" align="center" style="width:17px;"><b>&nbsp;</b></td>		
  </tr>	
  <tr style="background-color:#D5F1D1;color:#000000;"> 
   <td align="center" style="width:50px;"><b>Sn</b></td>
   <td align="center" style="width:250px;"><b>Farmer</b></td>
   <td align="center" style="width:80px;"><b>Contact No</b></td>
   <td align="center" style="width:80px;"><b>Acreage</b></td>
<?php if($_REQUEST['hq']>0){?><td align="center" style="width:150px;"><b>Area</b></td>
<?php } elseif($_REQUEST['s']>0){?><td align="center" style="width:150px;"><b>Area</b></td><td align="center" style="width:150px;"><b>District</b></td>
<?php } elseif($_REQUEST['c']>0){?><td align="center" style="width:150px;"><b>Area</b></td><td align="center" style="width:150px;"><b>District</b><td align="center" style="width:150px;"><b>State</b></td><?php } ?>
  </tr>	
<tr>
  <td colspan="<?php if($_REQUEST['c']>0){echo '8';}elseif($_REQUEST['s']>0){echo '7';}elseif($_REQUEST['hq']>0){echo '6';} ?>">
<div class="inner_table">  
  <table border="1" cellpadding="0" cellspacing="0" style="font-family:Times New Roman;font-size:14px;vertical-align:top;">	
<?php if($_REQUEST['Area']>0){$sqlDeal=mysql_query("select FarmerName,ContactNo,Acreage from hrm_sales_farmer where AreaId=".$_REQUEST['Area']." order by FarmerName ASC",$con); $sn=1; $rowDeal=mysql_num_rows($sqlDeal); if($rowDeal>0){ while($resDeal=mysql_fetch_assoc($sqlDeal)){ ?>
 <tr bgcolor="#EEEEEE" style="height:22px;background-color:<?php if($i==1){echo '#E2F3D8'; }?>;"> 
     <td align="center" style="width:50px;"><?php echo $sn; ?></td>		 
    <td style="width:250px;">&nbsp;<?php echo $resDeal['FarmerName']; ?></td>
     <td align="center" style="width:80px;"><?php echo $resDeal['ContactNo']; ?></td>
     <td align="right" style="width:80px;"><?php echo $resDeal['Acreage']; ?>&nbsp;</td>
 </tr>
<?php $sn++;} } else{echo '<tr bgcolor="#FFFFFF"><td colspan="2" style="color:#FF8000;font-size:14px;font-weight:bold;">&nbsp;Records Not Available..</td></tr>';} ?> 
<?php } elseif($_REQUEST['hq']>0){$sqlDeal=mysql_query("select AreaName,FarmerName,Acreage,ContactNo from hrm_sales_farmer INNER JOIN hrm_sales_areavillage ON hrm_sales_farmer.AreaId=hrm_sales_areavillage.AreaId where hrm_sales_areavillage.DistId=".$_REQUEST['hq']." order by AreaName ASC, FarmerName ASC",$con); $sn=1; $rowDeal=mysql_num_rows($sqlDeal); if($rowDeal>0){ while($resDeal=mysql_fetch_assoc($sqlDeal)){?>
 <tr bgcolor="#EEEEEE" style="height:22px;background-color:<?php if($i==1){echo '#E2F3D8'; }?>;"> 
     <td align="center" style="width:50px;"><?php echo $sn; ?></td>		
      <td style="width:250px;">&nbsp;<?php echo $resDeal['FarmerName']; ?></td>
     <td align="center" style="width:80px;"><?php echo $resDeal['ContactNo']; ?></td>
     <td align="right" style="width:80px;"><?php echo $resDeal['Acreage']; ?>&nbsp;</td>
     <td style="width:150px;">&nbsp;<?php echo $resDeal['AreaName']; ?></td>
 </tr>
<?php $sn++;} } else{echo '<tr bgcolor="#FFFFFF"><td colspan="3" style="color:#FF8000;font-size:14px;font-weight:bold;">&nbsp;Records Not Available..</td></tr>';} ?>  
 <!-------- ------------------------------->
<?php  }else if($_REQUEST['s']>0){$sqlDeal=mysql_query("SELECT DistName, AreaName, FarmerName,Acreage,ContactNo FROM hrm_sales_farmer INNER JOIN hrm_sales_areavillage ON hrm_sales_farmer.AreaId = hrm_sales_areavillage.AreaId INNER JOIN hrm_sales_distric ON hrm_sales_areavillage.DistId = hrm_sales_distric.DistId WHERE hrm_sales_distric.StateId=".$_REQUEST['s']." order by AreaName ASC, FarmerName ASC",$con); $sn=1; $rowDeal=mysql_num_rows($sqlDeal); if($rowDeal>0){ while($resDeal=mysql_fetch_assoc($sqlDeal)){ ?>
 <tr bgcolor="#EEEEEE" style="height:22px;background-color:<?php if($i==1){echo '#E2F3D8'; }?>;"> 
   <td align="center" style="width:50px;"><?php echo $sn; ?></td>		
   <td style="width:250px;">&nbsp;<?php echo $resDeal['FarmerName']; ?></td>
   <td align="center" style="width:80px;"><?php echo $resDeal['ContactNo']; ?></td>
   <td align="right" style="width:80px;"><?php echo $resDeal['Acreage']; ?>&nbsp;</td>
   <td style="width:150px;">&nbsp;<?php echo $resDeal['AreaName']; ?></td>
   <td style="width:150px;">&nbsp;<?php echo $resDeal['DistName']; ?></td>	 
 </tr>
<?php $sn++;} } else{echo '<tr bgcolor="#FFFFFF"><td colspan="3" style="color:#FF8000;font-size:14px;font-weight:bold;">&nbsp;Records Not Available..</td></tr>';} ?> 
 <!--state for ------------------------------>
<?php  } elseif($_REQUEST['c']>0){ $sqlDeal=mysql_query("SELECT StateName, DistName, AreaName, FarmerName,ContactNo,Acreage FROM hrm_sales_farmer INNER JOIN hrm_sales_areavillage ON hrm_sales_farmer.AreaId = hrm_sales_areavillage.AreaId INNER JOIN hrm_sales_distric ON hrm_sales_areavillage.DistId = hrm_sales_distric.DistId INNER JOIN hrm_state ON hrm_sales_distric.StateId = hrm_state.StateId WHERE hrm_state.CountryId=".$_REQUEST['c']." ORDER BY StateName ASC , DistName ASC , AreaName ASC , FarmerName ASC",$con); $sn=1; $rowDeal=mysql_num_rows($sqlDeal); if($rowDeal>0){ while($resDeal=mysql_fetch_assoc($sqlDeal)){ ?>
 <tr bgcolor="#EEEEEE" style="height:22px;background-color:<?php if($i==1){echo '#E2F3D8'; }?>;"> 
     <td align="center" style="width:50px;"><?php echo $sn; ?></td>	
     <td style="width:250px;">&nbsp;<?php echo $resDeal['FarmerName']; ?></td>
     <td align="center" style="width:80px;"><?php echo $resDeal['ContactNo']; ?></td>
     <td align="right" style="width:80px;"><?php echo $resDeal['Acreage']; ?>&nbsp;</td>
     <td style="width:150px;">&nbsp;<?php echo $resDeal['AreaName']; ?></td>
     <td style="width:150px;">&nbsp;<?php echo $resDeal['DistName']; ?></td>	 
     <td style="width:150px;">&nbsp;<?php echo $resDeal['StateName']; ?></td>	
 </tr>
<?php $sn++;} } else{echo '<tr bgcolor="#FFFFFF"><td colspan="4" style="color:#FF8000;font-size:14px;font-weight:bold;">&nbsp;Records Not Available..</td></tr>';} ?> 
<?php } ?> 	
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
