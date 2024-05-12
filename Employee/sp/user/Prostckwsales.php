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
</style>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<Script type="text/javascript">window.history.forward(1);</Script>
<Script language="javascript">

function ChangrYear(YearV)
{
  var CropGrp=document.getElementById("CropGrp").value; var ii=document.getElementById("ItemV").value; var ci=document.getElementById("ComId").value;
  var StckLoc=0; var va=document.getElementById("VaV").value; var cr=document.getElementById("CrV").value; var mnt=document.getElementById("mnt").value;
  var diff=document.getElementById("Diff").value;
  window.location="Prostckwsales.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y="+YearV+"&ci="+ci+"&grp="+CropGrp+"&ii="+ii+"&stcloc="+StckLoc+"&va="+va+"&cr="+cr+"&m="+mnt+"&diff="+diff; 
}

function ClickGrp(CropGrp)
{
  var YearV=document.getElementById("YearV").value; var ii=0; var ci=document.getElementById("ComId").value; var StckLoc=0;
  var va=document.getElementById("VaV").value; var cr=document.getElementById("CrV").value; var mnt=document.getElementById("mnt").value;
  var diff=document.getElementById("Diff").value;
  window.location="Prostckwsales.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y="+YearV+"&ci="+ci+"&grp="+CropGrp+"&ii="+ii+"&stcloc="+StckLoc+"&va="+va+"&cr="+cr+"&m="+mnt+"&diff="+diff; 
}
function ChangeII(ii)
{
  var YearV=document.getElementById("YearV").value; var CropGrp=document.getElementById("CropGrp").value; var ci=document.getElementById("ComId").value;
  var StckLoc=0; var va=document.getElementById("VaV").value; var cr=document.getElementById("CrV").value; var mnt=document.getElementById("mnt").value;
  var diff=document.getElementById("Diff").value;
  window.location="Prostckwsales.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y="+YearV+"&ci="+ci+"&grp="+CropGrp+"&ii="+ii+"&stcloc="+StckLoc+"&va="+va+"&cr="+cr+"&m="+mnt+"&diff="+diff; 
}

function ChangeMM(m)
{
  var YearV=document.getElementById("YearV").value; var CropGrp=document.getElementById("CropGrp").value; var ci=document.getElementById("ComId").value;
  var StckLoc=0; var va=document.getElementById("VaV").value; var cr=document.getElementById("CrV").value; var mnt=m; var ii=document.getElementById("ItemV").value;
  var diff=document.getElementById("Diff").value;
  window.location="Prostckwsales.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y="+YearV+"&ci="+ci+"&grp="+CropGrp+"&ii="+ii+"&stcloc="+StckLoc+"&va="+va+"&cr="+cr+"&m="+mnt+"&diff="+diff; 
}

function FunCheck(v)
{
 if(v==1)
 { document.getElementById("Va").checked=true; document.getElementById("Cr").checked=false; 
   document.getElementById("VaV").value=1; document.getElementById("CrV").value=0; }
 else if(v==2)
 { document.getElementById("Va").checked=false; document.getElementById("Cr").checked=true;
   document.getElementById("VaV").value=0; document.getElementById("CrV").value=1; }

}

function FucChk(sn)
{ if(document.getElementById("Chk"+sn).checked==true)
  { document.getElementById("TR"+sn).style.background='#9BEF47'; document.getElementById("TD1"+sn).style.background='#9BEF47';
    document.getElementById("TD2"+sn).style.background='#9BEF47'; document.getElementById("TD3"+sn).style.background='#9BEF47';
	document.getElementById("TD4"+sn).style.background='#9BEF47'; document.getElementById("TD5"+sn).style.background='#9BEF47';
	document.getElementById("TD6"+sn).style.background='#9BEF47'; document.getElementById("TD7"+sn).style.background='#9BEF47';
	document.getElementById("TD8"+sn).style.background='#9BEF47'; }
  else if(document.getElementById("Chk"+sn).checked==false)
  { document.getElementById("TR"+sn).style.background='#FFFFFF'; document.getElementById("TD1"+sn).style.background='#FFFFFF';
    document.getElementById("TD2"+sn).style.background='#FFFFFF'; document.getElementById("TD3"+sn).style.background='#FFFFFF';
	document.getElementById("TD4"+sn).style.background='#FFFFFF'; document.getElementById("TD5"+sn).style.background='#FFFFFF';
	document.getElementById("TD6"+sn).style.background='#FFFFFF'; document.getElementById("TD7"+sn).style.background='#FFFFFF'; 
	document.getElementById("TD8"+sn).style.background='#FFFFFF'; }
}

function FunDiff()
{
   if(document.getElementById("Dif").checked==true){ document.getElementById("Diff").value=1; }
   else if(document.getElementById("Dif").checked==false){ document.getElementById("Diff").value=0; }
}


function PrintSpR()
{
  var YearV=document.getElementById("YearV").value; var ii=document.getElementById("ItemV").value; var ci=document.getElementById("ComId").value; var StckLoc=0;
  var va=document.getElementById("VaV").value; var cr=document.getElementById("CrV").value; var mnt=document.getElementById("mnt").value;
  var CropGrp=document.getElementById("CropGrp").value; var diff=document.getElementById("Diff").value;
  window.open("Prostckwsalesprint.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y="+YearV+"&ci="+ci+"&grp="+CropGrp+"&ii="+ii+"&stcloc="+StckLoc+"&va="+va+"&cr="+cr+"&m="+mnt+"&diff="+diff,"Form","menubar=yes,scrollbars=yes,resizable=no,directories=no,width=200,height=100%");
  
}

</Script>
</head>
<body class="body">
<input type="hidden" id="MonthN" value="<?php date("m"); ?>" /><input type="hidden" id="mnt" value="<?php echo $_REQUEST['m']; ?>" />
<input type="hidden" id="VaV" value="<?php echo $_REQUEST['va']; ?>" /><input type="hidden" id="CrV" value="<?php echo $_REQUEST['cr']; ?>" />
<input type="hidden" id="Diff" value="<?php echo $_REQUEST['diff']; ?>" />
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
<?php if($_REQUEST['m']==1){$m='January';}elseif($_REQUEST['m']==2){$m='February';}elseif($_REQUEST['m']==3){ $m='March';}elseif($_REQUEST['m']==4){$m='April';}elseif($_REQUEST['m']==5){$m='May';}elseif($_REQUEST['m']==6){$m='June';}elseif($_REQUEST['m']==7){$m='July';}elseif($_REQUEST['m']==8){$m='August';}elseif($_REQUEST['m']==9){$m='September';}elseif($_REQUEST['m']==10){$m='October';}elseif($_REQUEST['m']==11){$m='November';}elseif($_REQUEST['m']==12){$m='December';} ?>	  
<table border="0" style="margin-top:0px; width:100%; height:150px;">	
<tr>
 <td valign="top">
  <table border="0">
   <tr>
    <td id="Entry" valign="top" style="width:1250px;">
	<span id="TabEntry">
     <table border="0">
      <tr>
	    <td style="margin-top:0px;width:180px;" class="heading"><u>Stock With Sales</u></td>
	    <td style="font-size:11px;height:18px;width:60px;color:#E6E6E6;" align="right"><b>Year :</b></td>
	    <td><select style="font-size:12px;width:100px;height:20px;background-color:#DDFFBB;" name="YearV" id="YearV" onChange="ChangrYear(this.value)"> 
<?php $sqly=mysql_query("select FromDate,ToDate from hrm_year where YearId=".$_REQUEST['y'], $con); $resy=mysql_fetch_assoc($sqly); 
      $fromdate=date("Y",strtotime($resy['FromDate'])); $todate=date("Y",strtotime($resy['ToDate'])); 
	  $NextYear=$_REQUEST['y']+1; $PrevYear=$_REQUEST['y']-1; 
	  $sqly2=mysql_query("select FromDate,ToDate from hrm_year where YearId=".$NextYear, $con); $resy2=mysql_fetch_assoc($sqly2);
	  $sqly3=mysql_query("select FromDate,ToDate from hrm_year where YearId=".$PrevYear, $con); $resy3=mysql_fetch_assoc($sqly3); ?>		
 <option value="<?php echo $_REQUEST['y']; ?>" selected><?php echo $fromdate.'-'.$todate; ?></option>
 <?php if($PrevYear>=1){?><option value="<?php echo $PrevYear; ?>"><?php echo date("Y",strtotime($resy3['FromDate'])).'-'.date("Y",strtotime($resy3['ToDate'])); ?></option><?php } ?><option value="<?php echo $NextYear; ?>"><?php echo date("Y",strtotime($resy2['FromDate'])).'-'.date("Y",strtotime($resy2['ToDate'])); ?></option></select>
       </td>
	   <td></td>
		 <td style="font-size:11px;height:18px;width:60px;color:#E6E6E6;" align="right"><b>Month :</b></td>
	    <td><select style="font-size:12px;width:100px;height:20px;background-color:#DDFFBB;" name="MonthV" id="MonthV" onChange="ChangeMM(this.value)">
<?php if($_REQUEST['m']>0){ ?><option value="<?php echo $_REQUEST['m']; ?>" selected><?php echo $m; ?></option>
<?php } elseif($_REQUEST['m']=='All'){ ?><option value="All" selected>All Month</option>
		 <?php }else{ ?><option value="0" selected>Select</option><?php } if($_REQUEST['m']!=4){ ?><option value="4">April</option><?php } ?>
		 <?php if($_REQUEST['m']!=5){ ?> <option value="5">May</option><?php } if($_REQUEST['m']!=6){ ?><option value="6">June</option><?php } ?>
		 <?php if($_REQUEST['m']!=7){ ?><option value="7">July</option><?php } if($_REQUEST['m']!=8){ ?><option value="8">August</option><?php } ?>
		 <?php if($_REQUEST['m']!=9){ ?><option value="9">September</option><?php } if($_REQUEST['m']!=10){ ?><option value="10">October</option><?php } ?>
		 <?php if($_REQUEST['m']!=11){ ?><option value="11">November</option><?php } if($_REQUEST['m']!=12){ ?><option value="12">December</option><?php } ?>
		 <?php if($_REQUEST['m']!=1){ ?><option value="1">January</option><?php } if($_REQUEST['m']!=2){ ?><option value="2">February</option><?php } ?>
		 <?php if($_REQUEST['m']!=3){ ?><option value="3">March</option><?php } if($_REQUEST['m']!='All'){ ?><option value="All">ALL Month</option><?php } ?>
		 </select>	  
		 </td>
	   <td></td>
	   <td style="font-size:11px;height:18px;width:60px;color:#E6E6E6;" align="right"><b>Crop :</b></td>
	    <td><select style="font-size:12px;width:180px;height:20px;background-color:#DDFFBB;" name="CropGrp" id="CropGrp" onChange="ClickGrp(this.value)">
<?php if($_REQUEST['grp']==0){ ?><option value="0" selected>Select Crop</option><option value="1">Vegetable Crop</option>
                                 <option value="2">Field Crop</option><option value="3">All Crop</option>		 
<?php }elseif($_REQUEST['grp']==1){ ?><option value="1" selected>Vegetable Crop</option><option value="2">Field Crop</option><option value="3">All Crop</option>
<?php }elseif($_REQUEST['grp']==2){ ?><option value="2" selected>Field Crop</option><option value="1">Vegetable Crop</option><option value="3">All Crop</option>
<?php }elseif($_REQUEST['grp']==3){ ?><option value="3" selected>All Crop</option><option value="1">Vegetable Crop</option><option value="2">Field Crop</option><?php } ?>
        </select>
		</td>
		<td></td>
		<td style="font-size:11px;height:18px;width:60px;color:#E6E6E6;" align="right"><b>Name :</b></td>
	    <td><select style="font-size:12px;width:120px;height:20px;background-color:#DDFFBB;" name="ItemV" id="ItemV" onChange="ChangeII(this.value)">
<?php if($_REQUEST['ii']>0){ $sqlI=mysql_query("select ItemName from hrm_sales_seedsitem where ItemId=".$_REQUEST['ii'], $con); $resI=mysql_fetch_assoc($sqlI); ?>	
         <option value="<?php echo $_REQUEST['ii']; ?>" selected><?php echo ucwords(strtolower($resI['ItemName'])); ?></option>
		 <?php }else{ ?><option value="0" selected>Select</option><?php } ?>
<?php if($_REQUEST['grp']==0){ $sqlItem=mysql_query("select * from hrm_sales_seedsitem order by ItemName ASC", $con);}
      elseif($_REQUEST['grp']==1){ $sqlItem=mysql_query("select * from hrm_sales_seedsitem where GroupId=1 order by ItemName ASC", $con);}
      elseif($_REQUEST['grp']==2){ $sqlItem=mysql_query("select * from hrm_sales_seedsitem where GroupId=2 order by ItemName ASC", $con);}
      elseif($_REQUEST['grp']==3){ $sqlItem=mysql_query("select * from hrm_sales_seedsitem where (GroupId=1 OR GroupId=2) order by GroupId ASC,ItemName ASC", $con);}
	  while($resItem=mysql_fetch_assoc($sqlItem)){ ?><option value="<?php echo $resItem['ItemId']; ?>"><?php echo $resItem['ItemName']; ?></option><?php } ?></select>	  
		 </td>
		 <td>&nbsp;</td>
		 <td style="font-size:11px;height:18px;width:120px;color:#E6E6E6;">
		 <input type="checkbox" id="Va" name="Va" <?php if($_REQUEST['va']==1){echo 'checked';} ?> onClick="FunCheck(1)" /> <b>Variety</b></td>
		 <td style="font-size:11px;height:18px;width:100px;color:#E6E6E6;">
		 <input type="checkbox" id="Cr" name="Cr" <?php if($_REQUEST['cr']==1){echo 'checked';} ?> onClick="FunCheck(2)" /><b>Crop</b></td>
		 <td style="font-size:11px;height:18px;width:100px;color:#E6E6E6;">
		 <input type="checkbox" id="Dif" name="Dif" <?php if($_REQUEST['diff']==1){echo 'checked';} ?> onClick="FunDiff()" /><b>Diff</b></td>
		 <td>&nbsp;</td>
		 <td style="font-size:11px; height:18px;width:80px;color:#E6E6E6;" align="center"><a href="#" onClick="PrintSpR()" style="color:#FFCE9D;"><b>PRINT</b></a></td>
		 
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
<table border="1" cellpadding="0" cellspacing="0" style="font-family:Times New Roman;font-size:14px;width:<?php if($_REQUEST['m']>0){echo 1200;}elseif($_REQUEST['m']=='All'){echo 1400;} ?>px; vertical-align:top;">	
  <tr style="background-color:#D5F1D1;color:#000000;">  
    <td colspan="<?php if($_REQUEST['cr']==1){ echo 1;}else{echo 3;}?>" align="center" style="width:120px;"><b>Details</b></td>
	<td align="center" style="width:50px;" rowspan="2"><b>Check</b></td>
	<td colspan="<?php if($_REQUEST['m']>0){echo 1;}elseif($_REQUEST['m']=='All'){echo 12;} ?>" align="center" style="font-size:12px;">
	<?php if($_REQUEST['m']>0){ ?><b><?php echo $m; ?></b><?php }elseif($_REQUEST['m']=='All'){ ?><b>MONTH [ YEAR:<?php echo $y3; ?> ]</b><?php } ?>
	</td>
	<td align="center" style="width:60px;" rowspan="2"><b>Est. Arrival</b></td>
	<td align="center" style="width:80px;" rowspan="2"><b>Total</b></td>
	<td colspan="2" align="center" style="width:150px;font-size:12px;"><b><?php echo $y2; ?></b></td>
	<td colspan="<?php if($_REQUEST['diff']==1){ echo 3;}else{echo 2;} ?>" align="center" style="width:150px;font-size:12px;"><b><?php echo $y3; ?></b></td>
	<td colspan="<?php if($_REQUEST['diff']==1){ echo 3;}else{echo 2;} ?>" align="center" style="width:150px;font-size:12px;"><b><?php echo $y4; ?></b></td>

 </tr>
   <tr style="background-color:#D5F1D1;color:#000000;font-size:12px;">  
<td align="center" style="width:120px;"><b>Crop</b></td>
<?php if($_REQUEST['va']==1){ ?><td align="center" style="width:150px;"><b>Variety</b></td><td align="center" style="width:50px;"><b>&nbsp;Type&nbsp;</b></td><?php } ?>
	
<?php if($_REQUEST['m']==4 OR $_REQUEST['m']=='All'){ ?><td align="center" width="80"><b>Apr-<?php echo $my1;?></b></td><?php } ?>
<?php if($_REQUEST['m']==5 OR $_REQUEST['m']=='All'){ ?><td align="center" width="60"><b>May-<?php echo $my1;?></b></td><?php } ?>
<?php if($_REQUEST['m']==6 OR $_REQUEST['m']=='All'){ ?><td align="center" width="60"><b>Jun-<?php echo $my1;?></b></td><?php } ?>
<?php if($_REQUEST['m']==7 OR $_REQUEST['m']=='All'){ ?><td align="center" width="60"><b>Jul-<?php echo $my1;?></b></td><?php } ?>
<?php if($_REQUEST['m']==8 OR $_REQUEST['m']=='All'){ ?><td align="center" width="60"><b>Aug-<?php echo $my1;?></b></td><?php } ?>
<?php if($_REQUEST['m']==9 OR $_REQUEST['m']=='All'){ ?><td align="center" width="60"><b>Sep-<?php echo $my1;?></b></td><?php } ?>
<?php if($_REQUEST['m']==10 OR $_REQUEST['m']=='All'){ ?><td align="center" width="60"><b>Oct-<?php echo $my1;?></b></td><?php } ?>
<?php if($_REQUEST['m']==11 OR $_REQUEST['m']=='All'){ ?><td align="center" width="60"><b>Nov-<?php echo $my1;?></b></td><?php } ?>
<?php if($_REQUEST['m']==12 OR $_REQUEST['m']=='All'){ ?><td align="center" width="60"><b>Dec-<?php echo $my1;?></b></td><?php } ?>
<?php if($_REQUEST['m']==1 OR $_REQUEST['m']=='All'){ ?><td align="center" width="60"><b>Jan-<?php echo $my2;?></b></td><?php } ?>
<?php if($_REQUEST['m']==2 OR $_REQUEST['m']=='All'){ ?><td align="center" width="60"><b>Feb-<?php echo $my2;?></b></td><?php } ?>
<?php if($_REQUEST['m']==3 OR $_REQUEST['m']=='All'){ ?><td align="center" width="60"><b>Mar-<?php echo $my2;?></b></td><?php } ?>
<td align="center" style="width:80px;"><b>Sales (Kg)</b></td>
<td align="center" style="width:50px;"><b>%</b></td>
<td align="center" style="width:80px;"><b>Sales (Kg)</b></td>
<td align="center" style="width:50px;"><b>%</b></td>
<?php if($_REQUEST['diff']==1){ ?><td align="center" style="width:80px;"><b>Difference (Kg)</b></td><?php } ?>
<td align="center" style="width:80px;"><b>Projection (Kg)</b></td>
<td align="center" style="width:50px;"><b>%</b></td>
<?php if($_REQUEST['diff']==1){ ?><td align="center" style="width:80px;"><b>Difference (Kg)</b></td><?php } ?>
  </tr>	
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
   <tr bgcolor="#FFFFFF" style="height:22px;font-size:13px;" id="TR<?php echo $Sn; ?>">  
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

<?php if($_REQUEST['m']==4 OR $_REQUEST['m']=='All'){ ?><td align="right"><?php if($resStck['sApr']!=0){echo $resStck['sApr'];}else {echo '&nbsp;';} ?></td><?php } ?>
<?php if($_REQUEST['m']==5 OR $_REQUEST['m']=='All'){ ?><td align="right"><?php if($resStck['sMay']!=0){echo $resStck['sMay'];}else {echo '&nbsp;';} ?></td><?php } ?>
<?php if($_REQUEST['m']==6 OR $_REQUEST['m']=='All'){ ?><td align="right"><?php if($resStck['sJun']!=0){echo $resStck['sJun'];}else {echo '&nbsp;';} ?></td><?php } ?>
<?php if($_REQUEST['m']==7 OR $_REQUEST['m']=='All'){ ?><td align="right"><?php if($resStck['sJul']!=0){echo $resStck['sJul'];}else {echo '&nbsp;';} ?></td><?php } ?>
<?php if($_REQUEST['m']==8 OR $_REQUEST['m']=='All'){ ?><td align="right"><?php if($resStck['sAug']!=0){echo $resStck['sAug'];}else {echo '&nbsp;';} ?></td><?php } ?>
<?php if($_REQUEST['m']==9 OR $_REQUEST['m']=='All'){ ?><td align="right"><?php if($resStck['sSep']!=0){echo $resStck['sSep'];}else {echo '&nbsp;';} ?></td><?php } ?>
<?php if($_REQUEST['m']==10 OR $_REQUEST['m']=='All'){ ?><td align="right"><?php if($resStck['sOct']!=0){echo $resStck['sOct'];}else {echo '&nbsp;';} ?></td><?php } ?>
<?php if($_REQUEST['m']==11 OR $_REQUEST['m']=='All'){ ?><td align="right"><?php if($resStck['sNov']!=0){echo $resStck['sNov'];}else {echo '&nbsp;';} ?></td><?php } ?>
<?php if($_REQUEST['m']==12 OR $_REQUEST['m']=='All'){ ?><td align="right"><?php if($resStck['sDece']!=0){echo $resStck['sDece'];}else {echo '&nbsp;';} ?></td><?php } ?>
<?php if($_REQUEST['m']==1 OR $_REQUEST['m']=='All'){ ?><td align="right"><?php if($resStck['sJan']!=0){echo $resStck['sJan'];}else {echo '&nbsp;';} ?></td><?php } ?>
<?php if($_REQUEST['m']==2 OR $_REQUEST['m']=='All'){ ?><td align="right"><?php if($resStck['sFeb']!=0){echo $resStck['sFeb'];}else {echo '&nbsp;';} ?></td><?php } ?>
<?php if($_REQUEST['m']==3 OR $_REQUEST['m']=='All'){ ?><td align="right"><?php if($resStck['sFeb']!=0){echo $resStck['sMar'];}else {echo '&nbsp;';} ?></td><?php } ?>	 

<?php
if($_REQUEST['va']==1)
{
 $sqlP1d=mysql_query("select SUM(M1_Ach) as tm1,SUM(M2_Ach) as tm2,SUM(M3_Ach) as tm3,SUM(M4_Ach) as tm4,SUM(M5_Ach) as tm5,SUM(M6_Ach) as tm6,SUM(M7_Ach) as tm7,SUM(M8_Ach) as tm8,SUM(M9_Ach) as tm9,SUM(M10_Ach) as tm10,SUM(M11_Ach) as tm11,SUM(M12_Ach) as tm12 from hrm_sales_sal_details_".$BeforeYId." where YearId=".$BeforeYId." AND ProductId=".$res['ProductId'], $con); 
 $sqlP2d=mysql_query("select SUM(M1_Ach) as tm1,SUM(M2_Ach) as tm2,SUM(M3_Ach) as tm3,SUM(M4_Ach) as tm4,SUM(M5_Ach) as tm5,SUM(M6_Ach) as tm6,SUM(M7_Ach) as tm7,SUM(M8_Ach) as tm8,SUM(M9_Ach) as tm9,SUM(M10_Ach) as tm10,SUM(M11_Ach) as tm11,SUM(M12_Ach) as tm12 from hrm_sales_sal_details_".$_REQUEST['y']." where YearId=".$_REQUEST['y']." AND ProductId=".$res['ProductId'], $con); 
 $sqlP3d=mysql_query("select SUM(M1) as tm1,SUM(M2) as tm2,SUM(M3) as tm3,SUM(M4) as tm4,SUM(M5) as tm5,SUM(M6) as tm6,SUM(M7) as tm7,SUM(M8) as tm8,SUM(M9) as tm9,SUM(M10) as tm10,SUM(M11) as tm11,SUM(M12) as tm12 from hrm_sales_sal_details_".$AfterYId." where YearId=".$AfterYId." AND ProductId=".$res['ProductId'], $con); 
 
$sqlA=mysql_query("select SUM(AApr) as sApr,SUM(AMay) as sMay,SUM(AJun) as sJun,SUM(AJul) as sJul,SUM(AAug) as sAug,SUM(ASep) as sSep,SUM(AOct) as sOct,SUM(ANov) as sNov,SUM(ADec) as sDec,SUM(AJan) as sJan,SUM(AFeb) as sFeb,SUM(AMar) as sMar from hrm_sales_product_arrival where YearId=".$_REQUEST['y']." AND ProductId=".$res['ProductId'], $con); 
$sqlB=mysql_query("select SUM(AApr) as sApr,SUM(AMay) as sMay,SUM(AJun) as sJun,SUM(AJul) as sJul,SUM(AAug) as sAug,SUM(ASep) as sSep,SUM(AOct) as sOct,SUM(ANov) as sNov,SUM(ADec) as sDec,SUM(AJan) as sJan,SUM(AFeb) as sFeb,SUM(AMar) as sMar from hrm_sales_product_arrival where YearId=".$AfterYId." AND ProductId=".$res['ProductId'], $con);
}
elseif($_REQUEST['cr']==1)
{
 $sqlP1d=mysql_query("select SUM(M1_Ach) as tm1,SUM(M2_Ach) as tm2,SUM(M3_Ach) as tm3,SUM(M4_Ach) as tm4,SUM(M5_Ach) as tm5,SUM(M6_Ach) as tm6,SUM(M7_Ach) as tm7,SUM(M8_Ach) as tm8,SUM(M9_Ach) as tm9,SUM(M10_Ach) as tm10,SUM(M11_Ach) as tm11,SUM(M12_Ach) as tm12 from hrm_sales_sal_details_".$BeforeYId." INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details_".$BeforeYId.".ProductId=hrm_sales_seedsproduct.ProductId where hrm_sales_sal_details_".$BeforeYId.".YearId=".$BeforeYId." AND hrm_sales_seedsproduct.ItemId=".$res['ItemId']."", $con); 
 $sqlP2d=mysql_query("select SUM(M1_Ach) as tm1,SUM(M2_Ach) as tm2,SUM(M3_Ach) as tm3,SUM(M4_Ach) as tm4,SUM(M5_Ach) as tm5,SUM(M6_Ach) as tm6,SUM(M7_Ach) as tm7,SUM(M8_Ach) as tm8,SUM(M9_Ach) as tm9,SUM(M10_Ach) as tm10,SUM(M11_Ach) as tm11,SUM(M12_Ach) as tm12 from hrm_sales_sal_details_".$_REQUEST['y']." INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details_".$_REQUEST['y'].".ProductId=hrm_sales_seedsproduct.ProductId where hrm_sales_sal_details_".$_REQUEST['y'].".YearId=".$_REQUEST['y']." AND hrm_sales_seedsproduct.ItemId=".$res['ItemId']."", $con);
 $sqlP3d=mysql_query("select SUM(M1) as tm1,SUM(M2) as tm2,SUM(M3) as tm3,SUM(M4) as tm4,SUM(M5) as tm5,SUM(M6) as tm6,SUM(M7) as tm7,SUM(M8) as tm8,SUM(M9) as tm9,SUM(M10) as tm10,SUM(M11) as tm11,SUM(M12) as tm12 from hrm_sales_sal_details_".$_REQUEST['y']." INNER JOIN hrm_sales_seedsproduct ON hrm_sales_sal_details_".$_REQUEST['y'].".ProductId=hrm_sales_seedsproduct.ProductId where hrm_sales_sal_details_".$_REQUEST['y'].".YearId=".$_REQUEST['y']." AND hrm_sales_seedsproduct.ItemId=".$res['ItemId']."", $con);
 
$sqlA=mysql_query("select SUM(AApr) as sApr,SUM(AMay) as sMay,SUM(AJun) as sJun,SUM(AJul) as sJul,SUM(AAug) as sAug,SUM(ASep) as sSep,SUM(AOct) as sOct,SUM(ANov) as sNov,SUM(ADec) as sDec,SUM(AJan) as sJan,SUM(AFeb) as sFeb,SUM(AMar) as sMar from hrm_sales_product_arrival INNER JOIN hrm_sales_seedsproduct ON hrm_sales_product_arrival.ProductId=hrm_sales_seedsproduct.ProductId where hrm_sales_product_arrival.YearId=".$_REQUEST['y']." AND hrm_sales_seedsproduct.ItemId=".$res['ItemId'], $con); 
$sqlB=mysql_query("select SUM(AApr) as sApr,SUM(AMay) as sMay,SUM(AJun) as sJun,SUM(AJul) as sJul,SUM(AAug) as sAug,SUM(ASep) as sSep,SUM(AOct) as sOct,SUM(ANov) as sNov,SUM(ADec) as sDec,SUM(AJan) as sJan,SUM(AFeb) as sFeb,SUM(AMar) as sMar from hrm_sales_product_arrival INNER JOIN hrm_sales_seedsproduct ON hrm_sales_product_arrival.ProductId=hrm_sales_seedsproduct.ProductId where hrm_sales_product_arrival.YearId=".$AfterYId." AND hrm_sales_seedsproduct.ItemId=".$res['ItemId'], $con); 

}
$res1=mysql_fetch_assoc($sqlP1d); $res2=mysql_fetch_assoc($sqlP2d); $res3=mysql_fetch_assoc($sqlP3d);
$res1Tot=$res1['tm1']+$res1['tm2']+$res1['tm3']+$res1['tm4']+$res1['tm5']+$res1['tm6']+$res1['tm7']+$res1['tm8']+$res1['tm9']+$res1['tm10']+$res1['tm11']+$res1['tm12']; 
$res2Tot=$res2['tm1']+$res2['tm2']+$res2['tm3']+$res2['tm4']+$res2['tm5']+$res2['tm6']+$res2['tm7']+$res2['tm8']+$res2['tm9']+$res2['tm10']+$res2['tm11']+$res2['tm12'];
$res3Tot=$res3['tm1']+$res3['tm2']+$res3['tm3']+$res3['tm4']+$res3['tm5']+$res3['tm6']+$res3['tm7']+$res3['tm8']+$res3['tm9']+$res3['tm10']+$res3['tm11']+$res3['tm12'];

$A=mysql_fetch_assoc($sqlA); $B=mysql_fetch_assoc($sqlB);

if($_REQUEST['m']==4){ $stck=$resStck['sApr']; $Tots=$res2['tm1']; $Tot2s=$res3['tm1']; $Arr=$A['sApr']+$A['sMay']+$A['sJun']+$A['sJul']+$A['sAug']+$A['sSep']+$A['sOct']+$A['sNov']+$A['sDec']+$A['sJan']+$A['sFeb']+$A['sMar']; }
elseif($_REQUEST['m']==5){$stck=$resStck['sMay']; $Tots=$res2['tm1']+$res2['tm2']; $Tot2s=$res3['tm1']+$res3['tm2']; $Arr=$A['sMay']+$A['sJun']+$A['sJul']+$A['sAug']+$A['sSep']+$A['sOct']+$A['sNov']+$A['sDec']+$A['sJan']+$A['sFeb']+$A['sMar']+$B['sApr']; }
elseif($_REQUEST['m']==6){$stck=$resStck['sJun']; $Tots=$res2['tm1']+$res2['tm2']+$res2['tm3']; $Tot2s=$res3['tm1']+$res3['tm2']+$res3['tm3']; $Arr=$A['sJun']+$A['sJul']+$A['sAug']+$A['sSep']+$A['sOct']+$A['sNov']+$A['sDec']+$A['sJan']+$A['sFeb']+$A['sMar']+$B['sApr']+$B['sMay']; }
elseif($_REQUEST['m']==7){$stck=$resStck['sJul']; $Tots=$res2['tm1']+$res2['tm2']+$res2['tm3']+$res2['tm4']; $Tot2s=$res3['tm1']+$res3['tm2']+$res3['tm3']+$res3['tm4']; $Arr=$A['sJul']+$A['sAug']+$A['sSep']+$A['sOct']+$A['sNov']+$A['sDec']+$A['sJan']+$A['sFeb']+$A['sMar']+$B['sApr']+$B['sMay']+$B['sJun']; }
elseif($_REQUEST['m']==8){$stck=$resStck['sAug']; $Tots=$res2['tm1']+$res2['tm2']+$res2['tm3']+$res2['tm4']+$res2['tm5']; $Tot2s=$res3['tm1']+$res3['tm2']+$res3['tm3']+$res3['tm4']+$res3['tm5']; $Arr=$A['sAug']+$A['sSep']+$A['sOct']+$A['sNov']+$A['sDec']+$A['sJan']+$A['sFeb']+$A['sMar']+$B['sApr']+$B['sMay']+$B['sJun']+$B['sJul']; }
elseif($_REQUEST['m']==9){$stck=$resStck['sSep']; $Tots=$res2['tm1']+$res2['tm2']+$res2['tm3']+$res2['tm4']+$res2['tm5']+$res2['tm6']; $Tot2s=$res3['tm1']+$res3['tm2']+$res3['tm3']+$res3['tm4']+$res3['tm5']+$res3['tm6']; $Arr=$A['sSep']+$A['sOct']+$A['sNov']+$A['sDec']+$A['sJan']+$A['sFeb']+$A['sMar']+$B['sApr']+$B['sMay']+$B['sJun']+$B['sJul']+$B['sAug']; }
elseif($_REQUEST['m']==10){$stck=$resStck['sOct']; $Tots=$res2['tm1']+$res2['tm2']+$res2['tm3']+$res2['tm4']+$res2['tm5']+$res2['tm6']+$res2['tm7']; $Tot2s=$res3['tm1']+$res3['tm2']+$res3['tm3']+$res3['tm4']+$res3['tm5']+$res3['tm6']+$res3['tm7']; $Arr=$A['sOct']+$A['sNov']+$A['sDec']+$A['sJan']+$A['sFeb']+$A['sMar']+$B['sApr']+$B['sMay']+$B['sJun']+$B['sJul']+$B['sAug']+$B['sSep']; }
elseif($_REQUEST['m']==11){$stck=$resStck['sNov']; $Tots=$res2['tm1']+$res2['tm2']+$res2['tm3']+$res2['tm4']+$res2['tm5']+$res2['tm6']+$res2['tm7']+$res2['tm8']; $Tot2s=$res3['tm1']+$res3['tm2']+$res3['tm3']+$res3['tm4']+$res3['tm5']+$res3['tm6']+$res3['tm7']+$res3['tm8']; $Arr=$A['sNov']+$A['sDec']+$A['sJan']+$A['sFeb']+$A['sMar']+$B['sApr']+$B['sMay']+$B['sJun']+$B['sJul']+$B['sAug']+$B['sSep']+$B['sOct']; }
elseif($_REQUEST['m']==12){$stck=$resStck['sDece']; $Tots=$res2['tm1']+$res2['tm2']+$res2['tm3']+$res2['tm4']+$res2['tm5']+$res2['tm6']+$res2['tm7']+$res2['tm8']+$res2['tm9']; $Tot2s=$res3['tm1']+$res3['tm2']+$res3['tm3']+$res3['tm4']+$res3['tm5']+$res3['tm6']+$res3['tm7']+$res3['tm8']+$res3['tm9']; $Arr=$A['sDec']+$A['sJan']+$A['sFeb']+$A['sMar']+$B['sApr']+$B['sMay']+$B['sJun']+$B['sJul']+$B['sAug']+$B['sSep']+$B['sOct']+$B['sNov']; }
elseif($_REQUEST['m']==1){$stck=$resStck['sJan']; $Tots=$res2['tm1']+$res2['tm2']+$res2['tm3']+$res2['tm4']+$res2['tm5']+$res2['tm6']+$res2['tm7']+$res2['tm8']+$res2['tm9']+$res2['tm10']; $Tot2s=$res3['tm1']+$res3['tm2']+$res3['tm3']+$res3['tm4']+$res3['tm5']+$res3['tm6']+$res3['tm7']+$res3['tm8']+$res3['tm9']+$res3['tm10']; $Arr=$A['sJan']+$A['sFeb']+$A['sMar']+$B['sApr']+$B['sMay']+$B['sJun']+$B['sJul']+$B['sAug']+$B['sSep']+$B['sOct']+$B['sNov']+$B['sDec']; }
elseif($_REQUEST['m']==2){$stck=$resStck['sFeb']; $Tots=$res2['tm1']+$res2['tm2']+$res2['tm3']+$res2['tm4']+$res2['tm5']+$res2['tm6']+$res2['tm7']+$res2['tm8']+$res2['tm9']+$res2['tm10']+$res2['tm11']; $Tot2s=$res3['tm1']+$res3['tm2']+$res3['tm3']+$res3['tm4']+$res3['tm5']+$res3['tm6']+$res3['tm7']+$res3['tm8']+$res3['tm9']+$res3['tm10']+$res3['tm11']; $Arr=$A['sFeb']+$A['sMar']+$B['sApr']+$B['sMay']+$B['sJun']+$B['sJul']+$B['sAug']+$B['sSep']+$B['sOct']+$B['sNov']+$B['sDec']+$B['sJan']; }
elseif($_REQUEST['m']==3){$stck=$resStck['sMar']; $Tots=$res2['tm1']+$res2['tm2']+$res2['tm3']+$res2['tm4']+$res2['tm5']+$res2['tm6']+$res2['tm7']+$res2['tm8']+$res2['tm9']+$res2['tm10']+$res2['tm11']+$res2['tm12']; $Tot2s=$res3['tm1']+$res3['tm2']+$res3['tm3']+$res3['tm4']+$res3['tm5']+$res3['tm6']+$res3['tm7']+$res3['tm8']+$res3['tm9']+$res3['tm10']+$res3['tm11']+$res3['tm12']; $Arr=$A['sMar']+$B['sApr']+$B['sMay']+$B['sJun']+$B['sJul']+$B['sAug']+$B['sSep']+$B['sOct']+$B['sNov']+$B['sDec']+$B['sJan']+$B['sFeb']; }
elseif($_REQUEST['m']=='All')
{ if($resStck['sMar']>0){$stck=$resStck['sMar']; $Arr=$A['sMar']+$B['sApr']+$B['sMay']+$B['sJun']+$B['sJul']+$B['sAug']+$B['sSep']+$B['sOct']+$B['sNov']+$B['sDec']+$B['sJan']+$B['sFeb']; }
  elseif($resStck['sFeb']>0){$stck=$resStck['sFeb']; $Arr=$A['sFeb']+$A['sMar']+$B['sApr']+$B['sMay']+$B['sJun']+$B['sJul']+$B['sAug']+$B['sSep']+$B['sOct']+$B['sNov']+$B['sDec']+$B['sJan'];}
  elseif($resStck['sJan']>0){$stck=$resStck['sJan']; $Arr=$A['sJan']+$A['sFeb']+$A['sMar']+$B['sApr']+$B['sMay']+$B['sJun']+$B['sJul']+$B['sAug']+$B['sSep']+$B['sOct']+$B['sNov']+$B['sDec']; } 
  elseif($resStck['sDece']>0){$stck=$resStck['sDece']; $Arr=$A['sDec']+$A['sJan']+$A['sFeb']+$A['sMar']+$B['sApr']+$B['sMay']+$B['sJun']+$B['sJul']+$B['sAug']+$B['sSep']+$B['sOct']+$B['sNov']; }
  elseif($resStck['sNov']>0){$stck=$resStck['sNov']; $Arr=$A['sNov']+$A['sDec']+$A['sJan']+$A['sFeb']+$A['sMar']+$B['sApr']+$B['sMay']+$B['sJun']+$B['sJul']+$B['sAug']+$B['sSep']+$B['sOct']; }
  elseif($resStck['sOct']>0){$stck=$resStck['sOct']; $Arr=$A['sOct']+$A['sNov']+$A['sDec']+$A['sJan']+$A['sFeb']+$A['sMar']+$B['sApr']+$B['sMay']+$B['sJun']+$B['sJul']+$B['sAug']+$B['sSep']; }
  elseif($resStck['sSep']>0){$stck=$resStck['sSep']; $Arr=$A['sSep']+$A['sOct']+$A['sNov']+$A['sDec']+$A['sJan']+$A['sFeb']+$A['sMar']+$B['sApr']+$B['sMay']+$B['sJun']+$B['sJul']+$B['sAug']; }
  elseif($resStck['sAug']>0){$stck=$resStck['sAug']; $Arr=$A['sAug']+$A['sSep']+$A['sOct']+$A['sNov']+$A['sDec']+$A['sJan']+$A['sFeb']+$A['sMar']+$B['sApr']+$B['sMay']+$B['sJun']+$B['sJul']; }
  elseif($resStck['sJul']>0){$stck=$resStck['sJul']; $Arr=$A['sJul']+$A['sAug']+$A['sSep']+$A['sOct']+$A['sNov']+$A['sDec']+$A['sJan']+$A['sFeb']+$A['sMar']+$B['sApr']+$B['sMay']+$B['sJun']; }
  elseif($resStck['sJun']>0){$stck=$resStck['sJun']; $Arr=$A['sJun']+$A['sJul']+$A['sAug']+$A['sSep']+$A['sOct']+$A['sNov']+$A['sDec']+$A['sJan']+$A['sFeb']+$A['sMar']+$B['sApr']+$B['sMay']; }
  elseif($resStck['sMay']>0){$stck=$resStck['sMay']; $Arr=$A['sMay']+$A['sJun']+$A['sJul']+$A['sAug']+$A['sSep']+$A['sOct']+$A['sNov']+$A['sDec']+$A['sJan']+$A['sFeb']+$A['sMar']+$B['sApr']; }
  elseif($resStck['sApr']>0){$stck=$resStck['sApr']; $Arr=$A['sApr']+$A['sMay']+$A['sJun']+$A['sJul']+$A['sAug']+$A['sSep']+$A['sOct']+$A['sNov']+$A['sDec']+$A['sJan']+$A['sFeb']+$A['sMar']; }
  else{$stck=0; $Arr=$A['sApr']+$A['sMay']+$A['sJun']+$A['sJul']+$A['sAug']+$A['sSep']+$A['sOct']+$A['sNov']+$A['sDec']+$A['sJan']+$A['sFeb']+$A['sMar']; } 
  $Tots=$res2Tot; $Tot2s=$res3Tot; 
}
else{$stck=0; $Tots=0; $Tot2s=0; $Arr=0;}
?>	 
     <td align="right" style="background-color:#FFFFFF;" id="TD1<?php echo $Sn; ?>"><?php if($Arr!=0){echo $Arr;}else {echo '&nbsp;';} ?></td>
	 <td align="right" style="background-color:#B0D8FF;" id="TD1<?php echo $Sn; ?>"><?php $tot=$Arr+$stck; if($tot>0){echo $tot;}else{echo '&nbsp;';}?></td> 

	 <td align="right" style="background-color:#FFE1FF;" id="TD1<?php echo $Sn; ?>"><?php if($res1Tot!=0){echo $res1Tot;}else {echo '&nbsp;';} ?></td>
	 <td align="right" style="background-color:#FFE1FF;" id="TD2<?php echo $Sn; ?>"><?php if($tot>0 AND $res1Tot>0){ $PerStck=($tot/$res1Tot)*100; echo round($PerStck,3); } else {echo '&nbsp;';} ?></td> 
	 <td align="right" style="background-color:#FFFFB9;" id="TD3<?php echo $Sn; ?>"><?php if($Tots!=0){echo $Tots;}else {echo '&nbsp;';} ?></td>
	 <td align="right" style="background-color:#FFFFB9;" id="TD4<?php echo $Sn; ?>"><?php if($tot>0 AND $Tots>0){ $PerStck2=($tot/$Tots)*100; echo round($PerStck2,3); }else {echo '&nbsp;';} ?></td>
<?php if($_REQUEST['diff']==1){ ?><td align="right" style="background-color:#FFFFB9;" id="TD5<?php echo $Sn; ?>"><?php $Diff=$Tots-$res1Tot; echo $Diff; ?></td><?php } ?>
	 
	 
	 <td align="right" style="background-color:#D5FFAA;" id="TD6<?php echo $Sn; ?>"><?php if($Tot2s!=0){echo $Tot2s;}else {echo '&nbsp;';} ?></td>
	 <td align="right" style="background-color:#D5FFAA;" id="TD7<?php echo $Sn; ?>"><?php if($tot>0 AND $Tot2s>0){ $PerStck3=($tot/$Tot2s)*100; echo round($PerStck3,3); }else {echo '&nbsp;';} ?></td>
<?php if($_REQUEST['diff']==1){ ?><td align="right" style="background-color:#D5FFAA;" id="TD8<?php echo $Sn; ?>"><?php $Diff2=$Tot2s-$Tots; echo $Diff2; ?></td><?php } ?>
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
