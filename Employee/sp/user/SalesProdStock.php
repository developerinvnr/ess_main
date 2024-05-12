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
  var StckLoc=document.getElementById("StckLoc").value;
  window.location="SalesProdStock.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y="+YearV+"&ci="+ci+"&grp="+CropGrp+"&ii="+ii+"&stcloc="+StckLoc; 
}

function ClickGrp(CropGrp)
{
  var YearV=document.getElementById("YearV").value; var ii=0; var ci=document.getElementById("ComId").value; var StckLoc=document.getElementById("StckLoc").value;
  window.location="SalesProdStock.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y="+YearV+"&ci="+ci+"&grp="+CropGrp+"&ii="+ii+"&stcloc="+StckLoc; 
}
function ChangeII(ii)
{
  var YearV=document.getElementById("YearV").value; var CropGrp=document.getElementById("CropGrp").value; var ci=document.getElementById("ComId").value;
  var StckLoc=document.getElementById("StckLoc").value;
  window.location="SalesProdStock.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y="+YearV+"&ci="+ci+"&grp="+CropGrp+"&ii="+ii+"&stcloc="+StckLoc; 
}

function ChangrStckLoc(stcloc)
{
  var YearV=document.getElementById("YearV").value; var ii=document.getElementById("ItemV").value; var ci=document.getElementById("ComId").value; 
  var CropGrp=document.getElementById("CropGrp").value;
  window.location="SalesProdStock.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y="+YearV+"&ci="+ci+"&grp="+CropGrp+"&ii="+ii+"&stcloc="+stcloc;
}

function editD(s)
{ document.getElementById("EditBtn_"+s).style.display='none'; document.getElementById("SaveBtn_"+s).style.display='block';
  var Mn=document.getElementById("MonthN").value;
  document.getElementById("Apr_"+s).readOnly=false; document.getElementById("Apr_"+s).style.background='#FFFFFF';
  document.getElementById("May_"+s).readOnly=false; document.getElementById("May_"+s).style.background='#FFFFFF';
  document.getElementById("Jun_"+s).readOnly=false; document.getElementById("Jun_"+s).style.background='#FFFFFF';
  document.getElementById("Jul_"+s).readOnly=false; document.getElementById("Jul_"+s).style.background='#FFFFFF';
  document.getElementById("Aug_"+s).readOnly=false; document.getElementById("Aug_"+s).style.background='#FFFFFF';
  document.getElementById("Sep_"+s).readOnly=false; document.getElementById("Sep_"+s).style.background='#FFFFFF';
  document.getElementById("Oct_"+s).readOnly=false; document.getElementById("Oct_"+s).style.background='#FFFFFF';
  document.getElementById("Nov_"+s).readOnly=false; document.getElementById("Nov_"+s).style.background='#FFFFFF';
  document.getElementById("Dec_"+s).readOnly=false; document.getElementById("Dec_"+s).style.background='#FFFFFF';
  document.getElementById("Jan_"+s).readOnly=false; document.getElementById("Jan_"+s).style.background='#FFFFFF';
  document.getElementById("Feb_"+s).readOnly=false; document.getElementById("Feb_"+s).style.background='#FFFFFF';
  document.getElementById("Mar_"+s).readOnly=false; document.getElementById("Mar_"+s).style.background='#FFFFFF';  
  document.getElementById("TD_"+s).style.background='#DDDDEE';
}
function saveD(s,y,p,c,l) 
{ 
 var url = 'PAStockAct.php'; var pars = 'action=ActualStack&s='+s+'&y='+y+'&p='+p+'&c='+c+'&l='+l+'&Apr='+document.getElementById("Apr_"+s).value+'&May='+document.getElementById("May_"+s).value+'&Jun='+document.getElementById("Jun_"+s).value+'&Jul='+document.getElementById("Jul_"+s).value+'&Aug='+document.getElementById("Aug_"+s).value+'&Sep='+document.getElementById("Sep_"+s).value+'&Oct='+document.getElementById("Oct_"+s).value+'&Nov='+document.getElementById("Nov_"+s).value+'&Dec='+document.getElementById("Dec_"+s).value+'&Jan='+document.getElementById("Jan_"+s).value+'&Feb='+document.getElementById("Feb_"+s).value+'&Mar='+document.getElementById("Mar_"+s).value;	
 
 var myAjax = new Ajax.Request( url, { method: 'post', parameters: pars, onComplete: show_AStck } );
}
function show_AStck(originalRequest)
{ document.getElementById('AStockSpan').innerHTML = originalRequest.responseText; var SMn=document.getElementById("StckSNo").value; 
  document.getElementById("EditBtn_"+SMn).style.display='block'; document.getElementById("SaveBtn_"+SMn).style.display='none'; 
  document.getElementById("Apr_"+SMn).readOnly=false; document.getElementById("Apr_"+SMn).style.background='#EDEBD6';
  document.getElementById("May_"+SMn).readOnly=false; document.getElementById("May_"+SMn).style.background='#EDEBD6';
  document.getElementById("Jun_"+SMn).readOnly=false; document.getElementById("Jun_"+SMn).style.background='#EDEBD6';
  document.getElementById("Jul_"+SMn).readOnly=false; document.getElementById("Jul_"+SMn).style.background='#EDEBD6';
  document.getElementById("Aug_"+SMn).readOnly=false; document.getElementById("Aug_"+SMn).style.background='#EDEBD6';
  document.getElementById("Sep_"+SMn).readOnly=false; document.getElementById("Sep_"+SMn).style.background='#EDEBD6';
  document.getElementById("Oct_"+SMn).readOnly=false; document.getElementById("Oct_"+SMn).style.background='#EDEBD6';
  document.getElementById("Nov_"+SMn).readOnly=false; document.getElementById("Nov_"+SMn).style.background='#EDEBD6';
  document.getElementById("Dec_"+SMn).readOnly=false; document.getElementById("Dec_"+SMn).style.background='#EDEBD6';
  document.getElementById("Jan_"+SMn).readOnly=false; document.getElementById("Jan_"+SMn).style.background='#EDEBD6';
  document.getElementById("Feb_"+SMn).readOnly=false; document.getElementById("Feb_"+SMn).style.background='#EDEBD6';
  document.getElementById("Mar_"+SMn).readOnly=false; document.getElementById("Mar_"+SMn).style.background='#EDEBD6';
  document.getElementById("TD_"+SMn).style.background='#FFFFFF';
}


</Script>
</head>
<body class="body">
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
    <td id="Entry" valign="top" style="width:1050px;">
	<span id="TabEntry">
     <table border="0">
      <tr>
	    <td style="margin-top:0px;width:200px;" class="heading" align="center"><u>Product Stock</u></td>
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
	   <td style="font-size:11px;height:18px;width:90px;color:#E6E6E6;" align="right"><b>Location :</b></td>
	    <td><select style="font-size:12px;width:200px;height:20px;background-color:#DDFFBB;" name="StckLoc" id="StckLoc" onChange="ChangrStckLoc(this.value)">
<?php if($_REQUEST['stcloc']>0){$sqlstcl=mysql_query("select * from hrm_sales_product_stockloc where StckLocId=".$_REQUEST['stcloc'], $con); $restcl=mysql_fetch_assoc($sqlstcl);?>		
 <option value="<?php echo $_REQUEST['stcloc']; ?>" selected><?php echo strtoupper($restcl['StckLocName'].'-'.$restcl['StckLocRef']); ?></option><?php } else { ?><option value="0" selected>SELECT LOCATION</option><?php } ?>
 <?php $sqlstcl2=mysql_query("select * from hrm_sales_product_stockloc order by StckLocId ASC", $con); while($restcl2=mysql_fetch_assoc($sqlstcl2)){ ?>	
 <option value="<?php echo $restcl2['StckLocId']; ?>"><?php echo strtoupper($restcl2['StckLocName'].'-'.$restcl2['StckLocRef']); ?></option><?php } ?>
 <option value="All">All Location</option></select>
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
<table border="1" cellpadding="0" cellspacing="0" style="font-family:Times New Roman;font-size:14px;width:<?php if($_REQUEST['ii']==0){echo 1450;}else{echo 1330;}?>; vertical-align:top;">	
  <tr style="background-color:#D5F1D1;color:#000000;">  
    <td colspan="<?php if($_REQUEST['ii']>0){ echo 3;}else{echo 4;}?>" align="center" style="width:120px;"><b>Details</b>
     &nbsp;&nbsp;&nbsp;&nbsp;
	<script>function DiffRptExport(y,ci,grp,ii,stcloc){ window.open("SalesProdStockExport.php?action=DiffpRExport&y="+y+"&ci="+ci+"&grp="+grp+"&ii="+ii+"&stcloc="+stcloc,"ExpForm","menubar=yes,scrollbars=yes,resizable=no,directories=no,width=20,height=20");}
	</script>
	<a href="#" onClick="DiffRptExport(<?php echo $_REQUEST['y'].', '.$_REQUEST['ci'].', '.$_REQUEST['grp'].', '.$_REQUEST['ii'].', '.$_REQUEST['stcloc']; ?>)" style="font-size:12px;"><b>Export</b></a>


</td>
	<td colspan="12" align="center" style="width:150px;"><b>Month(Year:<?php echo $y3; ?>)</b></td>
 </tr>
   <tr style="background-color:#D5F1D1;color:#000000;">  
<?php if($_REQUEST['ii']==0){?><td align="center" style="width:120px;"><b>CROP</b></td><?php } ?>
	<td align="center" style="width:150px;"><b>VARIETY</b></td>
	<td align="center" style="width:50px;"><b>&nbsp;TYPE&nbsp;</b></td>
	<td align="center" style="width:50px;"><b>&nbsp;Edit&nbsp;</b></td>
	<td align="center" width="80"><b>APR-<?php echo $my1;?></b></td><td align="center" width="80"><b>MAY-<?php echo $my1;?></b></td><td align="center" width="80"><b>JUN-<?php echo $my1;?></b></td><td align="center" width="80"><b>JUL-<?php echo $my1;?></b></td><td align="center" width="80"><b>AUG-<?php echo $my1;?></b></td><td align="center" width="80"><b>SEP-<?php echo $my1;?></b></td><td align="center" width="80"><b>OCT-<?php echo $my1;?></b></td><td align="center" width="80"><b>NOV-<?php echo $my1;?></b></td><td align="center" width="80"><b>DEC-<?php echo $my1;?></b></td><td align="center" width="80"><b>JAN-<?php echo $my2;?></b></td><td align="center" width="80"><b>FEB-<?php echo $my2;?></b></td><td align="center" width="80"><b>MAR-<?php echo $my2;?></b></td>
  </tr>	
 <?php if($_REQUEST['ii']>0){$sql = mysql_query("select hrm_sales_seedsproduct.ItemId,ProductId,ProductName,ItemName,TypeName from hrm_sales_seedsproduct INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId INNER JOIN hrm_sales_seedtype ON hrm_sales_seedsproduct.TypeId=hrm_sales_seedtype.TypeId where hrm_sales_seedsitem.ItemId=".$_REQUEST['ii']." order by ItemName ASC, TypeName ASC, ProductName ASC", $con); }
      else
	  { if($_REQUEST['grp']==1 OR $_REQUEST['grp']==2){$sql = mysql_query("select hrm_sales_seedsproduct.ItemId,ProductId,ProductName,ItemName,TypeName from hrm_sales_seedsproduct INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId INNER JOIN hrm_sales_seedtype ON hrm_sales_seedsproduct.TypeId=hrm_sales_seedtype.TypeId where hrm_sales_seedsitem.GroupId=".$_REQUEST['grp']." order by ItemName ASC, TypeName ASC, ProductName ASC", $con);} if($_REQUEST['grp']==3){$sql = mysql_query("select hrm_sales_seedsproduct.ItemId,ProductId,ProductName,ItemName,TypeName from hrm_sales_seedsproduct INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId INNER JOIN hrm_sales_seedtype ON hrm_sales_seedsproduct.TypeId=hrm_sales_seedtype.TypeId order by hrm_sales_seedsitem.GroupId ASC, ItemName ASC, TypeName ASC, ProductName ASC", $con); }
	  } 
	  
	  if($_REQUEST['grp']==0){$sqlI=mysql_query("select GroupId from hrm_sales_seedsitem where ItemId=".$_REQUEST['ii'], $con); $resI=mysql_fetch_array($sqlI);
	  $sqlSe=mysql_query("select SeasonId from hrm_sales_season where GroupId=".$resI['GroupId'], $con); }
	  else{$sqlSe=mysql_query("select SeasonId from hrm_sales_season where GroupId=".$_REQUEST['grp'], $con);}
	  //$sqlSe=mysql_query("select SeasonId from hrm_sales_season where GroupId=1",$con); 
	  $rowSe=mysql_num_rows($sqlSe); $Sn=1; while($res=mysql_fetch_array($sql)){ ?>  
   <tr bgcolor="#FFFFFF" style="height:22px;background-color:#E2F3D8;">  
<?php if($_REQUEST['ii']==0){?><td bgcolor="<?php echo '#B8E29C';?>">&nbsp;<?php echo $res['ItemName']; ?></td><?php } ?> 
     <td bgcolor="<?php echo '#B8E29C';?>">&nbsp;<?php echo $res['ProductName']; ?></td>
     <td bgcolor="<?php echo '#B8E29C';?>" align="center">&nbsp;<?php echo substr_replace($res['TypeName'],'',2);?></td>
	 <td bgcolor="#FFFFFF" align="center" id="TD_<?php echo $Sn; ?>">
          <?php if($_REQUEST['stcloc']!='All'){?>
	  <img src="images/edit.png" border="0" alt="Edit" id="EditBtn_<?php echo $Sn; ?>" onClick="editD(<?php echo $Sn; ?>)" style="display:block;">
	  <img src="images/Floppy-Small-icon.png" border="0" alt="Save" id="SaveBtn_<?php echo $Sn; ?>" onClick="saveD(<?php echo $Sn.', '.$_REQUEST['y'].', '.$res['ProductId'].', '.$CompanyId.', '.$_REQUEST['stcloc']; ?>)" style="display:none;">
<?php } ?>
</td>  
<?php if($_REQUEST['stcloc']=='All'){$sqlStck=mysql_query("select SUM(Apr) as sApr,SUM(May) as sMay,SUM(Jun) as sJun,SUM(Jul) as sJul,SUM(Aug) as sAug,SUM(Sep) as sSep,SUM(Oct) as sOct,SUM(Nov) as sNov,SUM(Dece) as sDece,SUM(Jan) as sJan,SUM(Feb) as sFeb,SUM(Mar) as sMar from hrm_sales_product_stock_actual where ProductId=".$res['ProductId']." AND YearId=".$_REQUEST['y']." AND CompanyId=".$CompanyId, $con); }else{$sqlStck=mysql_query("select * from hrm_sales_product_stock_actual where StckLocId=".$_REQUEST['stcloc']." AND ProductId=".$res['ProductId']." AND YearId=".$_REQUEST['y']." AND CompanyId=".$CompanyId, $con); 
}
      $resStck=mysql_fetch_assoc($sqlStck);
?>
<?php if($_REQUEST['stcloc']=='All'){ ?>   
	 <td align="center"><input class="textData" id="Apr_<?php echo $Sn; ?>" value="<?php if($resStck['sApr']!=0){echo $resStck['sApr'];} ?>" readonly/></td>
	 <td align="center"><input class="textData" id="May_<?php echo $Sn; ?>" value="<?php if($resStck['sMay']!=0){echo $resStck['sMay'];} ?>" readonly/></td>
	 <td align="center"><input class="textData" id="Jun_<?php echo $Sn; ?>" value="<?php if($resStck['sJun']!=0){echo $resStck['sJun'];} ?>" readonly/></td>
	 <td align="center"><input class="textData" id="Jul_<?php echo $Sn; ?>" value="<?php if($resStck['sJul']!=0){echo $resStck['sJul'];} ?>" readonly/></td>
	 <td align="center"><input class="textData" id="Aug_<?php echo $Sn; ?>" value="<?php if($resStck['sAug']!=0){echo $resStck['sAug'];} ?>" readonly/></td>
	 <td align="center"><input class="textData" id="Sep_<?php echo $Sn; ?>" value="<?php if($resStck['sSep']!=0){echo $resStck['sSep'];} ?>" readonly/></td>
	 <td align="center"><input class="textData" id="Oct_<?php echo $Sn; ?>" value="<?php if($resStck['sOct']!=0){echo $resStck['sOct'];} ?>" readonly/></td>
	 <td align="center"><input class="textData" id="Nov_<?php echo $Sn; ?>" value="<?php if($resStck['sNov']!=0){echo $resStck['sNov'];} ?>" readonly/></td>
	 <td align="center"><input class="textData" id="Dec_<?php echo $Sn; ?>" value="<?php if($resStck['sDece']!=0){echo $resStck['sDece'];} ?>" readonly/></td>
	 <td align="center"><input class="textData" id="Jan_<?php echo $Sn; ?>" value="<?php if($resStck['sJan']!=0){echo $resStck['sJan'];} ?>" readonly/></td>
	 <td align="center"><input class="textData" id="Feb_<?php echo $Sn; ?>" value="<?php if($resStck['sFeb']!=0){echo $resStck['sFeb'];} ?>" readonly/></td>
	 <td align="center"><input class="textData" id="Mar_<?php echo $Sn; ?>" value="<?php if($resStck['sMar']!=0){echo $resStck['sMar'];} ?>" readonly/></td>
<?php } else { ?>   
	 <td align="center"><input class="textData" id="Apr_<?php echo $Sn; ?>" value="<?php if($resStck['Apr']!=0){echo $resStck['Apr'];} ?>" readonly/></td>
	 <td align="center"><input class="textData" id="May_<?php echo $Sn; ?>" value="<?php if($resStck['May']!=0){echo $resStck['May'];} ?>" readonly/></td>
	 <td align="center"><input class="textData" id="Jun_<?php echo $Sn; ?>" value="<?php if($resStck['Jun']!=0){echo $resStck['Jun'];} ?>" readonly/></td>
	 <td align="center"><input class="textData" id="Jul_<?php echo $Sn; ?>" value="<?php if($resStck['Jul']!=0){echo $resStck['Jul'];} ?>" readonly/></td>
	 <td align="center"><input class="textData" id="Aug_<?php echo $Sn; ?>" value="<?php if($resStck['Aug']!=0){echo $resStck['Aug'];} ?>" readonly/></td>
	 <td align="center"><input class="textData" id="Sep_<?php echo $Sn; ?>" value="<?php if($resStck['Sep']!=0){echo $resStck['Sep'];} ?>" readonly/></td>
	 <td align="center"><input class="textData" id="Oct_<?php echo $Sn; ?>" value="<?php if($resStck['Oct']!=0){echo $resStck['Oct'];} ?>" readonly/></td>
	 <td align="center"><input class="textData" id="Nov_<?php echo $Sn; ?>" value="<?php if($resStck['Nov']!=0){echo $resStck['Nov'];} ?>" readonly/></td>
	 <td align="center"><input class="textData" id="Dec_<?php echo $Sn; ?>" value="<?php if($resStck['Dece']!=0){echo $resStck['Dece'];} ?>" readonly/></td>
	 <td align="center"><input class="textData" id="Jan_<?php echo $Sn; ?>" value="<?php if($resStck['Jan']!=0){echo $resStck['Jan'];} ?>" readonly/></td>
	 <td align="center"><input class="textData" id="Feb_<?php echo $Sn; ?>" value="<?php if($resStck['Feb']!=0){echo $resStck['Feb'];} ?>" readonly/></td>
	 <td align="center"><input class="textData" id="Mar_<?php echo $Sn; ?>" value="<?php if($resStck['Mar']!=0){echo $resStck['Mar'];} ?>" readonly/></td>
<?php } ?>	 
	 
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
