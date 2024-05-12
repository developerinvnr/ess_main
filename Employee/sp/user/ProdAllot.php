<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');}
include("../function.php");
include('codeEncDec.php');
if(check_user()==false){header('Location:../../../index.php');}
if($_SESSION['login'] = true){require_once('UserMenuSession.php');}
//**********************************************************************************************************************
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
<style> .font { color:#ffffff;font-family:Times New Roman;font-size:15px;} .font1 { font-family:Times New Roman;color:#FFFF00;font-size:15px; }
.font2 { font-family:Times New Roman;color:#FF80C0;font-size:15px; }.font3 { font-family:Times New Roman;color:#005BB7;font-size:15px; } 
.span {display:none; font-family:Courier New; font-size:14px; }.span1 {display:block; font-family:Courier New; font-size:14px; }
.SaveButton {background-image:url(images/save.gif); width:20px; height:20px; background-repeat:no-repeat; background-color:#FFFFFF; border-color:#FFFFFF; border-bottom:inherit;}
.EditSelect { font-family:Georgia; font-size:12px; height:18px;}
.ET { font-family:Georgia;font-size:12px;height:21px;width:95px;text-align:right;}
.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}
.mousechange:hover{cursor:pointer;}
</style>
<Script type="text/javascript" language="javascript">
function ChangrYear(YearV)
{ var CropGrp=document.getElementById("CropGrp").value; var ii=document.getElementById("ItemV").value; var ci=document.getElementById("ComId").value;
  window.location="ProdAllot.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y="+YearV+"&ci="+ci+"&grp="+CropGrp+"&ii="+ii; 
}
function ClickGrp(CropGrp)
{  var ii=0; var ci=document.getElementById("ComId").value; var y=document.getElementById("YearV").value;
   window.location="ProdAllot.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&ci="+ci+"&grp="+CropGrp+"&ii="+ii+"&y="+y; 
} 
function ChangeII(ii)
{ var CropGrp=document.getElementById("CropGrp").value; var ci=document.getElementById("ComId").value; var y=document.getElementById("YearV").value;
  window.location="ProdAllot.php?ac=2441&ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&ci="+ci+"&grp="+CropGrp+"&ii="+ii+"&y="+y; 
}


function FunProd(sn,pi)
{ if(document.getElementById("TD_"+sn+"-"+pi).style.display=='none') 
  { document.getElementById("TD_"+sn+"-"+pi).style.display='block'; document.getElementById("TR_"+sn).style.background='#808040';
    document.getElementById("TD_"+sn+"-"+pi).style.borderColor='#808040';
  }
 else if(document.getElementById("TD_"+sn+"-"+pi).style.display=='block')
 {document.getElementById("TD_"+sn+"-"+pi).style.display='none'; document.getElementById("TR_"+sn).style.background='#586738';}
}
function FunSea(sn,pi,si,pn)
{ 
  var sv=parseFloat(document.getElementById("Inp_"+pi+"-"+si).value);
  if(sv>0){ if(document.getElementById("TD_"+sn+"-"+pi+"-"+si).style.display=='none'){document.getElementById("TD_"+sn+"-"+pi+"-"+si).style.display='block';}
            else if(document.getElementById("TD_"+sn+"-"+pi+"-"+si).style.display=='block'){document.getElementById("TD_"+sn+"-"+pi+"-"+si).style.display='none';} }
  else{ alert("Please check "+pn+" season value"); return false;} 
}
function FunAre(sn,pi,si,ai,pn)
{ var sv=parseFloat(document.getElementById("Inp_"+pi+"-"+si).value); var Totav=parseFloat(document.getElementById("TotA_"+sn+"-"+pi+"-"+si).value);
  if(Totav>=sv){if(document.getElementById("TD_"+sn+"-"+pi+"-"+si+"-"+ai).style.display=='none'){document.getElementById("TD_"+sn+"-"+pi+"-"+si+"-"+ai).style.display='block';}
          else if(document.getElementById("TD_"+sn+"-"+pi+"-"+si+"-"+ai).style.display=='block'){document.getElementById("TD_"+sn+"-"+pi+"-"+si+"-"+ai).style.display='none';} }
  else{ alert("Please check "+pn+" total area value not less then "+pn+" season value"); return false;}		  
}

//TotA_<?php echo $Sn."-".$res['ProductId']."-".$season1['SeasonId']; ?>


function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}

function funSS(sn,pi,si)
{ var yi=document.getElementById("YId").value; var sv=document.getElementById("Inp_"+pi+"-"+si).value;
  var mv=document.getElementById("LM_"+sn+"-"+pi+"-"+si).value; var yv=document.getElementById("LY_"+sn+"-"+pi+"-"+si).value;
  var url = 'ProdAllotAct.php'; var pars = 'act=SeasonValue&pi='+pi+'&si='+si+'&yi='+yi+'&sv='+sv+'&sn='+sn+'&mv='+mv+'&yv='+yv;	
  var myAjax = new Ajax.Request( url, { method: 'post', parameters: pars, onComplete: show_seasonV });
} 
function show_seasonV(originalRequest)
{ document.getElementById('SpanSeasonV').innerHTML = originalRequest.responseText; var sn=document.getElementById("snS").value; var pi=document.getElementById("piS").value; 
  var si=document.getElementById("siS").value; document.getElementById("Inp_"+pi+"-"+si).style.background='#B0FB4D'; }


function funAA(sn,pi,si,ai)
{ var yi=document.getElementById("YId").value; var av=document.getElementById("Inp_"+pi+"-"+si+"-"+ai).value;
  var mv=document.getElementById("LM_"+sn+"-"+pi+"-"+si).value; var yv=document.getElementById("LY_"+sn+"-"+pi+"-"+si).value; 
  var url = 'ProdAllotAct.php'; var pars = 'act=AreaValue&pi='+pi+'&si='+si+'&ai='+ai+'&yi='+yi+'&av='+av+'&sn='+sn+'&mv='+mv+'&yv='+yv; 
  var myAjax = new Ajax.Request( url, { method: 'post', parameters: pars, onComplete: show_areaV }); 
} 
function show_areaV(originalRequest)
{ document.getElementById('SpanAreaV').innerHTML = originalRequest.responseText; var sn=document.getElementById("snA").value; var pi=document.getElementById("piA").value; 
  var si=document.getElementById("siA").value; var ai=document.getElementById("aiA").value; var TotA=document.getElementById("TotA").value; 
  document.getElementById("Inp_"+pi+"-"+si+"-"+ai).style.background='#B0FB4D'; document.getElementById("TotA_"+sn+"-"+pi+"-"+si).value=TotA; }


function funFF(sn,pi,si,ai,fi)
{ var yi=document.getElementById("YId").value; var fv=document.getElementById("Inp_"+pi+"-"+si+"-"+ai+"-"+fi).value;
  var mv=document.getElementById("LM_"+sn+"-"+pi+"-"+si).value; var yv=document.getElementById("LY_"+sn+"-"+pi+"-"+si).value;
  var url = 'ProdAllotAct.php'; var pars = 'act=FarmerValue&pi='+pi+'&si='+si+'&ai='+ai+'&fi='+fi+'&yi='+yi+'&fv='+fv+'&sn='+sn+'&mv='+mv+'&yv='+yv; 
  var myAjax = new Ajax.Request( url, { method: 'post', parameters: pars, onComplete: show_farmerV });
} 
function show_farmerV(originalRequest)
{ document.getElementById('SpanFarmerV').innerHTML = originalRequest.responseText; var sn=document.getElementById("snF").value; var pi=document.getElementById("piF").value; 
  var si=document.getElementById("siF").value;  var ai=document.getElementById("aiF").value; var fi=document.getElementById("fiF").value; 
  var TotF=document.getElementById("TotF").value; 
  document.getElementById("Inp_"+pi+"-"+si+"-"+ai+"-"+fi).style.background='#B0FB4D'; document.getElementById("TotF_"+sn+"-"+ai).value=TotF; }

</Script> 
</head>
<body class="body">
<input type="hidden" id="YId" value="<?php echo $_REQUEST['y']; ?>" />
<input type="hidden" id="ComId" value="<?php echo $CompanyId; ?>" />
<table class="table">
<tr><td><table class="menutable"><tr><td><?php if($_SESSION['login'] = true){ require_once("EMenu.php"); } ?></td></tr></table></td></tr>
<tr>
 <td valign="top">
  <table width="100%" style="margin-top:0px;" border="0">
   <tr><td valign="top"><?php if($_SESSION['login'] = true){ require_once("EWelcome.php"); } ?></td></tr>
   <tr>
	<td valign="top" align="center"  width="100%" id="MainWindow"><br>	  
    <table border="0" style="margin-top:0px;width:100%;height:300px;">
    <tr>
    <td width="10">&nbsp;</td>  
    <td align="left" id="type" valign="top" style="display:block;width:100%">             
     <table border="0" width="1100">
	 <tr>
	  <td>
	    <table border="0">
		 <tr>
		   <td class="heading">&nbsp;Product Allotment</td> 
	  <td>&nbsp;</td>
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
	   <td style="font-size:11px;height:18px;width:60px;color:#E6E6E6;" align="right"><b>Crop :</b></td>
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
		<td style="font-size:11px; height:18px;width:50px;color:#E6E6E6;" align="right"><b>Item :</b></td>
	     <td>
		 <select style="font-size:12px;width:120px;height:20px;background-color:#DDFFBB;" name="ItemV" id="ItemV" onChange="ChangeII(this.value)">
<?php if($_REQUEST['ii']>0){ $sqlI=mysql_query("select ItemName from hrm_sales_seedsitem where ItemId=".$_REQUEST['ii'], $con); $resI=mysql_fetch_assoc($sqlI); ?>	
<option value="<?php echo $_REQUEST['ii']; ?>" selected><?php echo strtoupper($resI['ItemName']); ?></option>
<?php }  else{ ?><option value="0" selected>SELECT</option><?php } ?>
<?php if($_REQUEST['grp']==0){ $sqlItem=mysql_query("select * from hrm_sales_seedsitem order by ItemName ASC", $con);}
      elseif($_REQUEST['grp']==1){ $sqlItem=mysql_query("select * from hrm_sales_seedsitem where GroupId=1 order by ItemName ASC", $con);}
      elseif($_REQUEST['grp']==2){ $sqlItem=mysql_query("select * from hrm_sales_seedsitem where GroupId=2 order by ItemName ASC", $con);}
      elseif($_REQUEST['grp']==3){ $sqlItem=mysql_query("select * from hrm_sales_seedsitem where (GroupId=1 OR GroupId=2) order by ItemName ASC", $con);}
	  while($resItem=mysql_fetch_assoc($sqlItem)){ ?><option value="<?php echo $resItem['ItemId']; ?>"><?php echo $resItem['ItemName']; ?></option><?php } ?>
	     </select>	  
		 </td>
		 <td>&nbsp;</td>
<?php /*<td style="font-size:11px; height:18px;width:80px;color:#E6E6E6;" align="center"><a href="#" onClick="PrintProArea()" style="color:#FFCE9D;"><b>PRINT</b></a></td> */ ?>
		 </tr>
		</table>
      </td>
	  
	 </tr>
	 <tr>
	 <td align="left" width="1500">
<?php if($_REQUEST['ii']>0 OR $_REQUEST['grp']>0){ ?>	 
<table border="0" style="width:1500px;">
 <tr>
  <td style="width:1500px;" style="list-style-type:none;" id="P_<?php echo $res['ProductId'];?>" valign="top">  
<?php //////////////////////// Start //////////////////////////////// #808040 ?>  
<table border="1" cellpadding="0" cellspacing="0">
<?php if($_REQUEST['ii']>0){$sql = mysql_query("select hrm_sales_seedsproduct.ItemId,ProductId,ProductName,ItemName,TypeName from hrm_sales_seedsproduct INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId INNER JOIN hrm_sales_seedtype ON hrm_sales_seedsproduct.TypeId=hrm_sales_seedtype.TypeId where hrm_sales_seedsitem.ItemId=".$_REQUEST['ii']." order by ItemName ASC, TypeName ASC, ProductName ASC", $con); 
 $sqlI=mysql_query("select GroupId from hrm_sales_seedsitem where ItemId=".$_REQUEST['ii'],$con); $resI=mysql_fetch_array($sqlI);
 $sqlSe=mysql_query("select SeasonId from hrm_sales_season where GroupId=".$resI['GroupId'],$con); 
  } else
	{ if($_REQUEST['grp']==1 OR $_REQUEST['grp']==2){$sql = mysql_query("select hrm_sales_seedsproduct.ItemId,ProductId,ProductName,ItemName,TypeName from hrm_sales_seedsproduct INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId INNER JOIN hrm_sales_seedtype ON hrm_sales_seedsproduct.TypeId=hrm_sales_seedtype.TypeId where hrm_sales_seedsitem.GroupId=".$_REQUEST['grp']." order by ItemName ASC, TypeName ASC, ProductName ASC", $con);} if($_REQUEST['grp']==3){$sql = mysql_query("select hrm_sales_seedsproduct.ItemId,ProductId,ProductName,ItemName,TypeName from hrm_sales_seedsproduct INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId INNER JOIN hrm_sales_seedtype ON hrm_sales_seedsproduct.TypeId=hrm_sales_seedtype.TypeId order by hrm_sales_seedsitem.GroupId ASC, ItemName ASC, TypeName ASC, ProductName ASC", $con); } 
  $sqlSe=mysql_query("select SeasonId from hrm_sales_season where GroupId=".$_REQUEST['grp'],$con); 
	 }  if($_REQUEST['grp']!=3){$rowSe=mysql_num_rows($sqlSe);} $Sn=1; while($res=mysql_fetch_array($sql)){  
	 
	 if($_REQUEST['grp']==3){$sqlI=mysql_query("select GroupId from hrm_sales_seedsitem where ItemId=".$res['ItemId'],$con); $resI=mysql_fetch_array($sqlI);
     $sqlSe=mysql_query("select SeasonId from hrm_sales_season where GroupId=".$resI['GroupId'],$con); $rowSe=mysql_num_rows($sqlSe); }
 
	 ?>   
     <tr id="TR_<?php echo $Sn; ?>">
	  <td class="font" valign="top" style="width:<?php if($_REQUEST['ii']>0){echo 150;}elseif($_REQUEST['grp']>0){echo 200;} ?>px;"><span class="mousechange" onClick="FunProd(<?php echo $Sn.",".$res['ProductId']; ?>)"  style="text-decoration:none;color:#FFFFFF;"><?php if($_REQUEST['ii']>0){echo $res['ProductName'];}elseif($_REQUEST['grp']>0){echo '<font color="#FFFF80">'.$res['ItemName'].'</font>/ '.$res['ProductName'];} ?></span>
	  </td>
	  <td valign="top" id="TD_<?php echo $Sn."-".$res['ProductId'] ?>" style="display:none;">
	  <span id="SpanSeasonV"></span><span id="SpanAreaV"></span><span id="SpanFarmerV"></span>
	  <table border="0">
<?php for($i=1; $i<=$rowSe; $i++){ $b=$i; $p=$b-1; 
      if($_REQUEST['grp']==0){$sqlI=mysql_query("select GroupId from hrm_sales_seedsitem where ItemId=".$_REQUEST['ii'],$con); $resI=mysql_fetch_array($sqlI);
	  $season1=mysql_fetch_array(mysql_query("select SeasonId from hrm_sales_season where GroupId=".$resI['GroupId']." limit ".$p.",1", $con)); }
	  elseif($_REQUEST['grp']==1 OR $_REQUEST['grp']==2){$season1=mysql_fetch_array(mysql_query("select SeasonId from hrm_sales_season where GroupId=".$_REQUEST['grp']." limit ".$p.",1", $con));}
	  elseif($_REQUEST['grp']==3){$sqlI=mysql_query("select GroupId from hrm_sales_seedsitem where ItemId=".$res['ItemId'],$con); $resI=mysql_fetch_array($sqlI);
	  $season1=mysql_fetch_array(mysql_query("select SeasonId from hrm_sales_season where GroupId=".$resI['GroupId']." limit ".$p.",1", $con)); } ?>			
	  <tr>	  
	  <td class="font1" valign="top" style="width:100px;"><span class="mousechange" onClick="FunSea(<?php echo $Sn.",".$res['ProductId'].",".$season1['SeasonId']; ?>,'<?php echo $res['ProductName']; ?>')" style="text-decoration:none;color:#FFFF00;"><?php echo "<b>Ses_".$b."</b>" ?></span></td>	  
	  <td valign="top" style="width:120px;"><?php $sS=mysql_query("select * from hrm_sales_product_season_stock where ProductId=".$res['ProductId']." AND SeasonId=".$season1['SeasonId']." AND YearId=".$_REQUEST['y'], $con); $rS=mysql_fetch_assoc($sS); ?><input class="ET" id="Inp_<?php echo $res['ProductId']."-".$season1['SeasonId']; ?>" value="<?php echo $rS['EstStock']; ?>" onKeyPress="return isNumber(event)"/>&nbsp;<span class="mousechange"><img src="images/Floppy-Small-icon.png" onClick="funSS(<?php echo $Sn.",".$res['ProductId'].",".$season1['SeasonId']; ?>)" /></span></td>
			
	  <td id="TD_<?php echo $Sn."-".$res['ProductId']."-".$season1['SeasonId']; ?>" style="display:none;"> 
<?php $sTotA=mysql_query("select SUM(EstAStock) as AreaStck from hrm_sales_product_area_stock where ProductId=".$res['ProductId']." AND SeasonId=".$season1['SeasonId']." AND YearId=".$_REQUEST['y'], $con); $rTotA=mysql_fetch_assoc($sTotA); ?>   

<?php  /*******************  for Month/Year Start ***********************/ 
  $sMx=mysql_query("select MAX(ActivityId) as MaxActId from hrm_sales_product_activity where ActivityStatus=1", $con); $rMx=mysql_fetch_assoc($sMx);
  $sum1=0;  
  for($k=1;$k<=18;$k++)
  { 
    $test=mysql_fetch_array(mysql_query("select m1,m2,m3,m4,m5,m6,m7,m8,m9,m10,m11,m12,m13,m14,m15,16,m17,m18,act".$k." from hrm_sales_product_month_activity where act".$k."=".$rMx['MaxActId']." AND ProductID=".$res['ProductId']." AND SeasonId=".$season1['SeasonId'], $con));
	if($test['act'.$k]==$rMx['MaxActId']){ $LastM=$test['m'.$k]; }   
	if($test['m1']>$test['m2']){ $sum1=$sum1+1;} 
	if($test['m2']!=0 && $test['m3']!=0 && $test['m2']>$test['m3']){ $sum1=$sum1+1; } 
	if($test['m3']!=0 && $test['m4']!=0 && $test['m3']>$test['m4']){ $sum1=$sum1+1;	} 
	if($test['m4']!=0 && $test['m5']!=0 && $test['m4']>$test['m5']){ $sum1=$sum1+1;	} 
	if($test['m5']!=0 && $test['m6']!=0 && $test['m5']>$test['m6']){ $sum1=$sum1+1;	} 
	if($test['m6']!=0 && $test['m7']!=0 && $test['m6']>$test['m7']){ $sum1=$sum1+1;	} 
	if($test['m7']!=0 && $test['m8']!=0 && $test['m7']>$test['m8']){ $sum1=$sum1+1;	} 
	if($test['m8']!=0 && $test['m9']!=0 && $test['m8']>$test['m9']){ $sum1=$sum1+1;	} 
	if($test['m9']!=0 && $test['m10']!=0 && $test['m9']>$test['m10']){ $sum1=$sum1+1; }
	if($test['m10']!=0 && $test['m11']!=0 && $test['m10']>$test['m11']){ $sum1=$sum1+1;	}
	if($test['m11']!=0 && $test['m12']!=0 && $test['m11']>$test['m12']){ $sum1=$sum1+1;	}
	if($test['m12']!=0 && $test['m13']!=0 && $test['m12']>$test['m13']){ $sum1=$sum1+1;	}
	if($test['m13']!=0 && $test['m14']!=0 && $test['m13']>$test['m14']){ $sum1=$sum1+1;	}
	if($test['m14']!=0 && $test['m15']!=0 && $test['m14']>$test['m15']){ $sum1=$sum1+1;	}
	if($test['m15']!=0 && $test['m16']!=0 && $test['m15']>$test['m16']){ $sum1=$sum1+1;	}
	if($test['m16']!=0 && $test['m17']!=0 && $test['m16']>$test['m17']){ $sum1=$sum1+1;	}
	if($test['m17']!=0 && $test['m18']!=0 && $test['m17']>$test['m18']){ $sum1=$sum1+1;	}
  }
   
 $sT=mysql_query("select m1 from hrm_sales_product_month_activity where ProductID=".$res['ProductId']." AND SeasonId=".$season1['SeasonId'], $con); $rowT=mysql_num_rows($sT);
 if($rowT==1){ $test2=mysql_fetch_array($sT); $temp=$_REQUEST['y']+$sum1;     
               if($test2['m1']>=4 && $test2['m1']<=12) { $year=mysql_fetch_array(mysql_query("select FromDate from hrm_sales_year where YearId=".$temp, $con)); $LastY=date("Y",strtotime($year['FromDate'])); 
               echo  '<input type="hidden" id="LM_'.$Sn.'-'.$res['ProductId'].'-'.$season1['SeasonId'].'" value="'.$LastM.'" />';
               echo  '<input type="hidden" id="LY_'.$Sn.'-'.$res['ProductId'].'-'.$season1['SeasonId'].'" value="'.$LastY.'" />';  }
               else{ $year=mysql_fetch_array(mysql_query("select ToDate from hrm_sales_year where YearId=".$temp, $con)); $LastY=date("Y",strtotime($year['ToDate']));
               echo  '<input type="hidden" id="LM_'.$Sn.'-'.$res['ProductId'].'-'.$season1['SeasonId'].'" value="'.$LastM.'" />';
               echo  '<input type="hidden" id="LY_'.$Sn.'-'.$res['ProductId'].'-'.$season1['SeasonId'].'" value="'.$LastY.'" />';  }
  }
  else
  {
   echo  '<input type="hidden" id="LM_'.$Sn.'-'.$res['ProductId'].'-'.$season1['SeasonId'].'" value="0" />';
   echo  '<input type="hidden" id="LY_'.$Sn.'-'.$res['ProductId'].'-'.$season1['SeasonId'].'" value="0" />'; 
  }
  
 /*******************  for Month/Year Close ***********************/  ?>
      
  
	  <input type="hidden" id="TotA_<?php echo $Sn."-".$res['ProductId']."-".$season1['SeasonId']; ?>" value="<?php echo $rTotA['AreaStck']; ?>" />
	  <table border="0" cellpadding="0" cellspacing="0">
<?php  $sqlA=mysql_query("select hrm_sales_areavillage.AreaName,hrm_sales_product_area.VillageLocId from hrm_sales_product_area INNER JOIN hrm_sales_areavillage ON hrm_sales_product_area.VillageLocId=hrm_sales_areavillage.AreaId where hrm_sales_product_area.ProductId=".$res['ProductId']." AND hrm_sales_product_area.SeasonId=".$season1['SeasonId'], $con); while($resA=mysql_fetch_assoc($sqlA)){ ?>			 
	  <tr>
	   <td class="font2" valign="top" style="width:100px;"><span class="mousechange" onClick="FunAre(<?php echo $Sn.",".$res['ProductId'].",".$season1['SeasonId'].",".$resA['VillageLocId']; ?>,'<?php echo $res['ProductName']; ?>')" style="text-decoration:none;color:#FFCCFF;"><b><?php echo $resA['AreaName']; ?></b></span></td>
	   <td valign="top" style="width:120px;"><?php $sA=mysql_query("select * from hrm_sales_product_area_stock where ProductId=".$res['ProductId']." AND SeasonId=".$season1['SeasonId']." AND AreaId=".$resA['VillageLocId']." AND YearId=".$_REQUEST['y'], $con); $rA=mysql_fetch_assoc($sA); ?><input class="ET" id="Inp_<?php echo $res['ProductId']."-".$season1['SeasonId']."-".$resA['VillageLocId']; ?>" value="<?php echo $rA['EstAStock']; ?>" onKeyPress="return isNumber(event)" />&nbsp;<span class="mousechange"><img src="images/Floppy-Small-icon.png" onClick="funAA(<?php echo $Sn.",".$res['ProductId'].",".$season1['SeasonId'].",".$resA['VillageLocId']; ?>)" /></span></td>
	   	   
	   <td id="TD_<?php echo $Sn."-".$res['ProductId']."-".$season1['SeasonId']."-".$resA['VillageLocId']; ?>" style="display:none;">	
<?php  $sTotF=mysql_query("select SUM(EstFStock) as FrmerStck from hrm_sales_product_farmer_stock where ProductId=".$res['ProductId']." AND SeasonId=".$season1['SeasonId']." AND AreaId=".$resA['VillageLocId']." AND YearId=".$_REQUEST['y'], $con); $rTotF=mysql_fetch_assoc($sTotF); ?>	   
	   <input type="hidden" id="TotF_<?php echo $Sn."-".$resA['VillageLocId']; ?>" value="<?php echo $rTotF['FrmerStck']; ?>" />	   
	   <table border="1" bgcolor="#FFFFFF" cellpadding="0" cellspacing="0">
<?php $sqlF=mysql_query("select FarmerId,FarmerName from hrm_sales_farmer where VillageLocId=".$resA['VillageLocId'], $con); while($resF=mysql_fetch_assoc($sqlF)){ ?>				
       <tr>
 <td class="font3" valign="top" style="width:120px;">&nbsp;<b><?php echo substr_replace($resF['FarmerName'], '', 15).'..'; ?></b></td>
 <td valign="top" style="width:120px;"><?php $sF=mysql_query("select * from hrm_sales_product_farmer_stock where ProductId=".$res['ProductId']." AND SeasonId=".$season1['SeasonId']." AND AreaId=".$resA['VillageLocId']." AND FarmerId=".$resF['FarmerId']." AND YearId=".$_REQUEST['y'], $con); $rF=mysql_fetch_assoc($sF); ?><input class="ET" id="Inp_<?php echo $res['ProductId']."-".$season1['SeasonId']."-".$resA['VillageLocId']."-".$resF['FarmerId']; ?>" value="<?php echo $rF['EstFStock']; ?>" onKeyPress="return isNumber(event)" />&nbsp;<span class="mousechange"><img src="images/Floppy-Small-icon.png" onClick="funFF(<?php echo $Sn.",".$res['ProductId'].",".$season1['SeasonId'].",".$resA['VillageLocId'].",".$resF['FarmerId']; ?>)" /></span></td>
</tr> 
<?php } // Farmer Close  ?>				 
		</table>
		</td>
	  </tr>
<?php } //Area close  ?>			  
	  </table>
	  </td>                         
	 </tr>
<?php } //Season close ?>	 
	 </table>
	  </td>
	</tr>
<?php $Sn++; }  //Product close?> 	 
</table>
<?php //////////////////////// CLose //////////////////////////////// ?>   
  </td>
 </tr>
</table>
<?php } ?>   	       
	 </td>
    </tr>
  </table>  
</td>
</tr>
<tr><td><span id="AjaxSpanId"></span></td></tr>
</table>
	  </td>
	</tr>
	
  </table>
 </td>
</tr>
</table>
</body>
</html>
