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
<style> .font { color:#ffffff; font-family:Times New Roman; font-size:15px; width:200px;} .font1 { font-family:Times New Roman; font-size:12px; height:14px; width:200px; } 
.font2 { font-size:12px;width:260px;height:18px;} .font4 { color:#1FAD34; font-family:Georgia; font-size:15px;}
.span {display:none; font-family:Courier New; font-size:14px; }.span1 {display:block; font-family:Courier New; font-size:14px; }
.SaveButton {background-image:url(images/save.gif); width:20px; height:20px; background-repeat:no-repeat; background-color:#FFFFFF; border-color:#FFFFFF; border-bottom:inherit;}
.EditSelect { font-family:Georgia; font-size:12px; height:18px;}
.EditInput { font-family:Georgia; font-size:12px; height:22px;}
.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}
</style>
<Script type="text/javascript" language="javascript">
function ClickGrp(CropGrp)
{  var ii=0; var ci=document.getElementById("ComId").value; 
   window.location="ProdMActivity.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&ci="+ci+"&grp="+CropGrp+"&ii="+ii; 
}
function ChangeII(ii)
{ var CropGrp=document.getElementById("CropGrp").value; var ci=document.getElementById("ComId").value; 
  window.location="ProdMActivity.php?ac=2441&ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&ci="+ci+"&grp="+CropGrp+"&ii="+ii; 
}
function product(id)
{ var CropGrp=document.getElementById("CropGrp").value; var ci=document.getElementById("ComId").value; var ItemV=document.getElementById("ItemV").value
  window.location="ProdMActivity.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&ci="+ci+"&grp="+CropGrp+"&ii="+ItemV+"&id="+id 
}

function FunCCheck(v1,v2)
{
  if(document.getElementById("Check_"+v1+"_"+v2).checked==true){document.getElementById("TDSpan_"+v1+"_"+v2).style.display='block'; document.getElementById("Table_"+v1+"_"+v2).style.display='block'; document.getElementById("Table_"+v1+"_"+v2).style.background='#FFD5FF';}
  else if(document.getElementById("Check_"+v1+"_"+v2).checked==false){document.getElementById("TDSpan_"+v1+"_"+v2).style.display='none'; document.getElementById("Save"+v1+"_"+v2).style.display='none'; document.getElementById("Table_"+v1+"_"+v2).style.display='none';}  
}

function monthCheck(k,p,s)
{ 
 var first=k-1; var store=parseInt(document.getElementById("m"+first+"-"+p+"-"+s).value); var m1=store+3;
 if(store==10){ if(document.getElementById("m"+k+"-"+p+"-"+s).value>1 && document.getElementById("m"+k+"-"+p+"-"+s).value<10)
   { alert("upto jan allowed !!"); document.getElementById("m"+k+"-"+p+"-"+s).value=document.getElementById("DeM_"+p+"-"+s).value; } }
 else if(store==11){ if(document.getElementById("m"+k+"-"+p+"-"+s).value<11 && document.getElementById("m"+k+"-"+p+"-"+s).value>2)
   { alert("up to feb allowed !!"); document.getElementById("m"+k+"-"+p+"-"+s).value=document.getElementById("DeM_"+p+"-"+s).value; } }
 else if(store==12){ if(document.getElementById("m"+k+"-"+p+"-"+s).value<12 && document.getElementById("m"+k+"-"+p+"-"+s).value>3)
   { alert("upto march allowed !!"); document.getElementById("m"+k+"-"+p+"-"+s).value=document.getElementById("DeM_"+p+"-"+s).value; } }
 else if(document.getElementById("m"+k+"-"+p+"-"+s).value>m1 || document.getElementById("m"+k+"-"+p+"-"+s).value<store)
 { alert("Please Check Month !!"); document.getElementById("m"+k+"-"+p+"-"+s).value=document.getElementById("DeM_"+p+"-"+s).value; }
}

function activity(k,p,b)
{
 var one=k-1;  var two=k+1;
 var pre=parseInt(document.getElementById("a"+one+"-"+p+"-"+b).value);
 var current=parseInt(document.getElementById("a"+k+"-"+p+"-"+b).value);
 var next=parseInt(document.getElementById("a"+two+"-"+p+"-"+b).value); 
 if(current!=pre && current<pre){ alert("This Activity is already selected previously");
 document.getElementById("a"+k+"-"+p+"-"+b).value=document.getElementById("a"+one+"-"+p+"-"+b).value; }
}

function editD(ProductId,s)
{   
  document.getElementById("Edit"+ProductId+"_"+s).style.display='none'; document.getElementById("Save"+ProductId+"_"+s).style.display='block';
  //document.getElementById("m1-"+ProductId+"-"+s).removeAttribute("disabled");
   document.getElementById("m2-"+ProductId+"-"+s).removeAttribute("disabled"); document.getElementById("m3-"+ProductId+"-"+s).removeAttribute("disabled"); document.getElementById("m4-"+ProductId+"-"+s).removeAttribute("disabled"); document.getElementById("m5-"+ProductId+"-"+s).removeAttribute("disabled"); document.getElementById("m6-"+ProductId+"-"+s).removeAttribute("disabled"); document.getElementById("m7-"+ProductId+"-"+s).removeAttribute("disabled"); document.getElementById("m8-"+ProductId+"-"+s).removeAttribute("disabled"); document.getElementById("m9-"+ProductId+"-"+s).removeAttribute("disabled"); document.getElementById("m10-"+ProductId+"-"+s).removeAttribute("disabled"); document.getElementById("m11-"+ProductId+"-"+s).removeAttribute("disabled"); document.getElementById("m12-"+ProductId+"-"+s).removeAttribute("disabled"); document.getElementById("m13-"+ProductId+"-"+s).removeAttribute("disabled"); document.getElementById("m14-"+ProductId+"-"+s).removeAttribute("disabled"); document.getElementById("m15-"+ProductId+"-"+s).removeAttribute("disabled"); document.getElementById("m16-"+ProductId+"-"+s).removeAttribute("disabled"); document.getElementById("m17-"+ProductId+"-"+s).removeAttribute("disabled"); document.getElementById("m18-"+ProductId+"-"+s).removeAttribute("disabled");
  document.getElementById("a1-"+ProductId+"-"+s).removeAttribute("disabled"); document.getElementById("a2-"+ProductId+"-"+s).removeAttribute("disabled"); document.getElementById("a3-"+ProductId+"-"+s).removeAttribute("disabled"); document.getElementById("a4-"+ProductId+"-"+s).removeAttribute("disabled"); document.getElementById("a5-"+ProductId+"-"+s).removeAttribute("disabled"); document.getElementById("a6-"+ProductId+"-"+s).removeAttribute("disabled"); document.getElementById("a7-"+ProductId+"-"+s).removeAttribute("disabled"); document.getElementById("a8-"+ProductId+"-"+s).removeAttribute("disabled"); document.getElementById("a9-"+ProductId+"-"+s).removeAttribute("disabled"); document.getElementById("a10-"+ProductId+"-"+s).removeAttribute("disabled"); document.getElementById("a11-"+ProductId+"-"+s).removeAttribute("disabled"); document.getElementById("a12-"+ProductId+"-"+s).removeAttribute("disabled"); document.getElementById("a13-"+ProductId+"-"+s).removeAttribute("disabled"); document.getElementById("a14-"+ProductId+"-"+s).removeAttribute("disabled"); document.getElementById("a15-"+ProductId+"-"+s).removeAttribute("disabled"); document.getElementById("a16-"+ProductId+"-"+s).removeAttribute("disabled"); document.getElementById("a17-"+ProductId+"-"+s).removeAttribute("disabled"); document.getElementById("a18-"+ProductId+"-"+s).removeAttribute("disabled");
}

function saveD(p,s)
{  
 var m1=document.getElementById("m1-"+p+"-"+s).value; var m2=document.getElementById("m2-"+p+"-"+s).value; var m3=document.getElementById("m3-"+p+"-"+s).value; var m4=document.getElementById("m4-"+p+"-"+s).value; var m5=document.getElementById("m5-"+p+"-"+s).value; var m6=document.getElementById("m6-"+p+"-"+s).value; var m7=document.getElementById("m7-"+p+"-"+s).value; var m8=document.getElementById("m8-"+p+"-"+s).value; var m9=document.getElementById("m9-"+p+"-"+s).value; var m10=document.getElementById("m10-"+p+"-"+s).value; var m11=document.getElementById("m11-"+p+"-"+s).value; var m12=document.getElementById("m12-"+p+"-"+s).value; var m13=document.getElementById("m13-"+p+"-"+s).value; var m14=document.getElementById("m14-"+p+"-"+s).value; var m15=document.getElementById("m15-"+p+"-"+s).value; var m16=document.getElementById("m16-"+p+"-"+s).value; var m17=document.getElementById("m17-"+p+"-"+s).value; var m18=document.getElementById("m18-"+p+"-"+s).value;
 var a1=document.getElementById("a1-"+p+"-"+s).value; var a2=document.getElementById("a2-"+p+"-"+s).value; var a3=document.getElementById("a3-"+p+"-"+s).value; var a4=document.getElementById("a4-"+p+"-"+s).value; var a5=document.getElementById("a5-"+p+"-"+s).value; var a6=document.getElementById("a6-"+p+"-"+s).value; var a7=document.getElementById("a7-"+p+"-"+s).value; var a8=document.getElementById("a8-"+p+"-"+s).value; var a9=document.getElementById("a9-"+p+"-"+s).value; var a10=document.getElementById("a10-"+p+"-"+s).value; var a11=document.getElementById("a11-"+p+"-"+s).value; var a12=document.getElementById("a12-"+p+"-"+s).value; var a13=document.getElementById("a13-"+p+"-"+s).value; var a14=document.getElementById("a14-"+p+"-"+s).value; var a15=document.getElementById("a15-"+p+"-"+s).value; var a16=document.getElementById("a16-"+p+"-"+s).value; var a17=document.getElementById("a17-"+p+"-"+s).value; var a18=document.getElementById("a18-"+p+"-"+s).value; 
 var ProductId=document.getElementById("Product_id_"+p+"-"+s).value; var SeasonId=document.getElementById("Season_id_"+p+"-"+s).value;
 
 var url = 'ProdMActivityAct.php'; var pars = 'ProductId='+ProductId+'&SeasonId='+SeasonId+'&m1='+m1+'&m2='+m2+'&m3='+m3+'&m4='+m4+'&m5='+m5+'&m6='+m6+'&m7='+m7+'&m8='+m8+'&m9='+m9+'&m10='+m10+'&m11='+m11+'&m12='+m12+'&m13='+m13+'&m14='+m14+'&m15='+m15+'&m16='+m16+'&m17='+m17+'&m18='+m18+'&a1='+a1+'&a2='+a2+'&a3='+a3+'&a4='+a4+'&a5='+a5+'&a6='+a6+'&a7='+a7+'&a8='+a8+'&a9='+a9+'&a10='+a10+'&a11='+a11+'&a12='+a12+'&a13='+a13+'&a14='+a14+'&a15='+a15+'&a16='+a16+'&a17='+a17+'&a18='+a18+'&s='+s; 
  var myAjax = new Ajax.Request( url, { method: 'post', parameters: pars, onComplete: show_NewMActivity });
}
function show_NewMActivity(originalRequest)
{ document.getElementById('AjaxSpanId').innerHTML = originalRequest.responseText; var p=document.getElementById("pi").value; var s=document.getElementById("si").value;
  document.getElementById("m1-"+p+"-"+s).disabled=true; document.getElementById("m2-"+p+"-"+s).disabled=true; document.getElementById("m3-"+p+"-"+s).disabled=true; document.getElementById("m4-"+p+"-"+s).disabled=true; document.getElementById("m5-"+p+"-"+s).disabled=true; document.getElementById("m6-"+p+"-"+s).disabled=true; document.getElementById("m7-"+p+"-"+s).disabled=true; document.getElementById("m8-"+p+"-"+s).disabled=true; document.getElementById("m9-"+p+"-"+s).disabled=true; document.getElementById("m10-"+p+"-"+s).disabled=true; document.getElementById("m11-"+p+"-"+s).disabled=true; document.getElementById("m12-"+p+"-"+s).disabled=true; document.getElementById("m13-"+p+"-"+s).disabled=true; document.getElementById("m14-"+p+"-"+s).disabled=true; document.getElementById("m15-"+p+"-"+s).disabled=true; document.getElementById("m16-"+p+"-"+s).disabled=true; document.getElementById("m17-"+p+"-"+s).disabled=true; document.getElementById("m18-"+p+"-"+s).disabled=true;
  document.getElementById("a1-"+p+"-"+s).disabled=true; document.getElementById("a2-"+p+"-"+s).disabled=true; document.getElementById("a3-"+p+"-"+s).disabled=true; document.getElementById("a4-"+p+"-"+s).disabled=true; document.getElementById("a5-"+p+"-"+s).disabled=true; document.getElementById("a6-"+p+"-"+s).disabled=true; document.getElementById("a7-"+p+"-"+s).disabled=true; document.getElementById("a8-"+p+"-"+s).disabled=true; document.getElementById("a9-"+p+"-"+s).disabled=true; document.getElementById("a10-"+p+"-"+s).disabled=true;  document.getElementById("a11-"+p+"-"+s).disabled=true; document.getElementById("a12-"+p+"-"+s).disabled=true; document.getElementById("a13-"+p+"-"+s).disabled=true; document.getElementById("a14-"+p+"-"+s).disabled=true; document.getElementById("a15-"+p+"-"+s).disabled=true; document.getElementById("a16-"+p+"-"+s).disabled=true; document.getElementById("a17-"+p+"-"+s).disabled=true; document.getElementById("a18-"+p+"-"+s).disabled=true;
 document.getElementById("Edit"+p+"_"+s).style.display='block'; document.getElementById("Save"+p+"_"+s).style.display='none';
}
 
</Script> 
</head>
<body class="body">
<input type="hidden" id="ComId" value="<?php echo $_REQUEST['ci']; ?>" />
<input type="hidden" id="UserId" value="<?php echo $UserId; ?>" />	
<table class="table">
<tr><td><table class="menutable"><tr><td><?php if($_SESSION['login'] = true){ require_once("EMenu.php"); } ?></td></tr></table></td></tr>
<tr>
 <td valign="top">
  <table width="100%" style="margin-top:0px;" border="0">
   <tr><td valign="top"><?php if($_SESSION['login'] = true){ require_once("EWelcome.php"); } ?></td></tr>
   <tr>
	<td valign="top" align="center"  width="100%" id="MainWindow"><br>	  
    <table border="0" style="margin-top:0px; width:100%; height:300px;">
    <tr>
    <td width="10">&nbsp;</td>  
    <td align="left" id="type" valign="top" style="display:block;width:100%">             
     <table border="0" width="1100">
	 <tr>
	  <td>
	    <table border="0">
		 <tr>
		   <td class="heading">&nbsp;Product Month Activity</td> 
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
	 <td align="left" width="800">
<?php if($_REQUEST['ii']>0 OR $_REQUEST['grp']>0){ ?>	 
<table border="1" cellpadding="0" cellspacing="0" style="font-family:Times New Roman;font-size:14px;width:3442px; vertical-align:top;">	
   <tr style="background-color:#D5F1D1;color:#000000;height:22px;">  
    <td align="center" style="width:120px;"><b>CROP</b></td>
	<td align="center" style="width:150px;"><b>VARIETY</b></td>
	<td align="center" style="width:50px;"><b>&nbsp;TYPE&nbsp;</b></td>
	<td align="center" style="width:160px;"><b>SEASON</b></td>
	<td align="center" style="width:50px;"><b></b></td>
	<td align="center" style="width:50px;"><b>EDIT</b></td>
	<?php for($k=1; $k<=18; $k++){ echo '<td colspan="2" align="center" style="width:150px;"><b>Month '.$k.'</b></td>'; } ?>
  </tr>	
 <?php if($_REQUEST['ii']>0){$sql = mysql_query("select hrm_sales_seedsproduct.ItemId,ProductId,ProductName,ItemName,TypeName from hrm_sales_seedsproduct INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId INNER JOIN hrm_sales_seedtype ON hrm_sales_seedsproduct.TypeId=hrm_sales_seedtype.TypeId where hrm_sales_seedsitem.ItemId=".$_REQUEST['ii']." order by ItemName ASC, TypeName ASC, ProductName ASC", $con); 
 $sqlI=mysql_query("select GroupId from hrm_sales_seedsitem where ItemId=".$_REQUEST['ii'],$con); $resI=mysql_fetch_array($sqlI);
 $sqlSe=mysql_query("select SeasonId,SeasonName from hrm_sales_season where GroupId=".$resI['GroupId'],$con);
      }
      else
	  { if($_REQUEST['grp']==1 OR $_REQUEST['grp']==2){$sql = mysql_query("select hrm_sales_seedsproduct.ItemId,ProductId,ProductName,ItemName,TypeName from hrm_sales_seedsproduct INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId INNER JOIN hrm_sales_seedtype ON hrm_sales_seedsproduct.TypeId=hrm_sales_seedtype.TypeId where hrm_sales_seedsitem.GroupId=".$_REQUEST['grp']." order by ItemName ASC, TypeName ASC, ProductName ASC", $con);} 
	    if($_REQUEST['grp']==3){$sql = mysql_query("select hrm_sales_seedsproduct.ItemId,ProductId,ProductName,ItemName,TypeName from hrm_sales_seedsproduct INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId INNER JOIN hrm_sales_seedtype ON hrm_sales_seedsproduct.TypeId=hrm_sales_seedtype.TypeId order by hrm_sales_seedsitem.GroupId ASC, ItemName ASC, TypeName ASC, ProductName ASC", $con); }
	  $sqlSe=mysql_query("select SeasonId,SeasonName from hrm_sales_season where GroupId=".$_REQUEST['grp'],$con); 
	  }   
	  if($_REQUEST['grp']!=3){$rowSe=mysql_num_rows($sqlSe);} $Sn=1; while($res=mysql_fetch_array($sql)){ 
	  if($_REQUEST['grp']==3){$sqlI=mysql_query("select GroupId from hrm_sales_seedsitem where ItemId=".$res['ItemId'],$con); $resI=mysql_fetch_array($sqlI);
      $sqlSe=mysql_query("select SeasonId,SeasonName from hrm_sales_season where GroupId=".$resI['GroupId'],$con); $rowSe=mysql_num_rows($sqlSe); }
	  for($i=1; $i<=$rowSe; $i++){ ?>  
  
   <tr bgcolor="#FFFFFF" style="height:28px;background-color:<?php if($i==1){echo '#E2F3D8';}?>;">  
     <td bgcolor="<?php if($i==1){echo '#B8E29C';}?>">&nbsp;<?php if($i==1){echo $res['ItemName'];} ?></td>	 
     <td bgcolor="<?php if($i==1){echo '#B8E29C';}?>">&nbsp;<?php if($i==1){echo $res['ProductName'];} ?></td>
     <td bgcolor="<?php if($i==1){echo '#B8E29C';}?>" align="center">&nbsp;<?php if($i==1){echo substr_replace($res['TypeName'],'',2);}?></td> 
<?php $b=$i; $p=$b-1; 
      if($_REQUEST['grp']==0){$sqlI=mysql_query("select GroupId from hrm_sales_seedsitem where ItemId=".$_REQUEST['ii'],$con); $resI=mysql_fetch_array($sqlI);
	   $season1=mysql_fetch_array(mysql_query("select SeasonId,SeasonName from hrm_sales_season where GroupId=".$resI['GroupId']." limit ".$p.",1", $con)); }
	  elseif($_REQUEST['grp']==1 OR $_REQUEST['grp']==2){$season1=mysql_fetch_array(mysql_query("select SeasonId,SeasonName from hrm_sales_season where GroupId=".$_REQUEST['grp']." limit ".$p.",1", $con));}
	  elseif($_REQUEST['grp']==3){$sqlI=mysql_query("select GroupId from hrm_sales_seedsitem where ItemId=".$res['ItemId'],$con); $resI=mysql_fetch_array($sqlI);
	  $season1=mysql_fetch_array(mysql_query("select SeasonId,SeasonName from hrm_sales_season where GroupId=".$resI['GroupId']." limit ".$p.",1", $con)); }
 ?>	 
     <td align="center"><?php echo "<b>".$season1['SeasonName']."</b>" ?>
	 <input type="hidden" id="Product_id_<?php echo $res['ProductId']."-".$b; ?>" value="<?php echo $res['ProductId']; ?>" />
     <input type="hidden" id="Season_id_<?php echo $res['ProductId']."-".$b; ?>" value="<?php echo $season1['SeasonId']; ?>" /></td>
	 <td align="center"><input type="checkbox" id="Check_<?php echo $res['ProductId']."_".$b; ?>" onClick="FunCCheck(<?php echo $res['ProductId'].",".$b; ?>)" /></td>
<?php $sqlC=mysql_query("select * from hrm_sales_product_month_activity where SeasonId=".$season1['SeasonId']." AND ProductId=".$res['ProductId'], $con); $rowC=mysql_num_rows($sqlC); ?>	 
	 <td align="center">
	 <span id="TDSpan_<?php echo $res['ProductId']."_".$b; ?>" style="display:none;">
     <img src="images/edit.png" id="Edit<?php echo $res['ProductId']."_".$b; ?>" onClick="editD(<?php echo $res['ProductId'].",".$b; ?>)" style="display:<?php if($rowC==1){echo 'block';}else{echo 'none';} ?>;"><img src="images/Floppy-Small-icon.png" id="Save<?php echo $res['ProductId']."_".$b; ?>" onClick="saveD(<?php echo $res['ProductId'].",".$b; ?>)" style="display:<?php if($rowC==1){echo 'none';}else{echo 'block';} ?>;">
	 </span>
     </td>
	 <td colspan="36" valign="top">
	  <table id="Table_<?php echo $res['ProductId']."_".$b; ?>" style="display:none;">
	   <tr>
<?php  for($k=1;$k<=18;$k++){ 
$sqlC=mysql_query("select * from hrm_sales_product_month_activity where SeasonId=".$season1['SeasonId']." AND ProductId=".$res['ProductId'], $con); $rowC=mysql_num_rows($sqlC);
$mQuery=mysql_fetch_array(mysql_query("select Start_Month from hrm_sales_season where SeasonId=".$season1['SeasonId'].""));
$selectQuery=mysql_query("select m.MonthId,m.MonthName from hrm_month m INNER JOIN hrm_sales_product_month_activity pma ON pma.m".$k."=m.MonthId where SeasonId=".$season1['SeasonId']." and ProductId=".$res['ProductId'], $con); $num=mysql_num_rows($selectQuery); $select=mysql_fetch_array($selectQuery);
    if($rowC==1)
	{ ?>
       <td><input type="hidden" id="DeM_<?php echo $res['ProductId']."-".$b; ?>" value="<?php if($num==1){echo $select['MonthId'];}else{echo $mQuery['Start_Month'];} ?>" />
	   <?php if($num==1){ $monthName=substr($select['MonthName'],0,3); ?><select style="width:50px;" disabled name="monthName" id="m<?php echo $k."-".$res['ProductId']."-".$b; ?>" onChange="monthCheck(<?php echo $k.",".$res['ProductId'].",".$b; ?>)"> <?php echo "<option value=".$select['MonthId']." selected='selected'>".$monthName."</option><option value='1'>Jan</option><option value='2'>Feb</option><option value='3'>Mar</option><option value='4'>Apr</option><option value='5'>May</option><option value='6'>Jun</option><option value='7'>Jul</option><option value='8'>Aug</option><option value='9'>Sep</option><option value='10'>Oct</option><option value='11'>Nov</option><option value='12'>Dec</option>"; }
	   elseif($num==0){?><select style="width:50px;background-color:#FFFF80;" name="monthName" id="m<?php echo $k."-".$res['ProductId']."-".$b; ?>" onChange="monthCheck(<?php echo $k.",".$res['ProductId'].",".$b; ?>)"> <?php echo "<option value='0'></option><option value='1'>Jan</option><option value='2'>Feb</option><option value='3'>Mar</option><option value='4'>Apr</option><option value='5'>May</option><option value='6'>Jun</option><option value='7'>Jul</option><option value='8'>Aug</option><option value='9'>Sep</option><option value='10'>Oct</option><option value='11'>Nov</option><option value='12'>Dec</option>"; } echo '</td>';
	  echo "<td>"; $selectActivityQuery=mysql_query("select ActivityId,ActivityName,act".$k." from hrm_sales_product_activity INNER JOIN hrm_sales_product_month_activity ON hrm_sales_product_activity.ActivityId=hrm_sales_product_month_activity.act".$k." where hrm_sales_product_month_activity.SeasonId=".$season1['SeasonId']." AND hrm_sales_product_month_activity.ProductId=".$res['ProductId'], $con); $ActivityQuery=mysql_fetch_assoc($selectActivityQuery); //echo $ActivityQuery['act'.$k].',';
	  if(mysql_num_rows($selectActivityQuery)==1){echo "<select id='a".$k."-".$res['ProductId']."-".$b."' style='width:100px;' disabled onchange='activity(".$k.",".$res['ProductId'].",".$b.")'>"; echo "<option value='".$ActivityQuery['ActivityId']."'>".$ActivityQuery['ActivityName']."</option>"; 
	        $activity=mysql_query("select * from `hrm_sales_product_activity`"); while($act=mysql_fetch_array($activity)){
	        echo "<option value='".$act['ActivityId']."'>".$act['ActivityName']."</option>"; }}
	  else{ echo "<select id='a".$k."-".$res['ProductId']."-".$b."' style='width:100px;background-color:#FFFF80;' disabled onchange='activity(".$k.",".$res['ProductId'].",".$b.")'>"; echo '<option value="0"></option>'; $activity=mysql_query("select * from `hrm_sales_product_activity`"); while($act=mysql_fetch_array($activity)){
	        echo "<option value='".$act['ActivityId']."'>".$act['ActivityName']."</option>"; } } 
	  echo "</select></td>"; 		
	  }
	  else 
	  { ?>
	  <td><input type="hidden" id="DeM_<?php echo $res['ProductId']."-".$b; ?>" value="<?php if($num==1){echo $select['MonthId'];}else{echo $mQuery['Start_Month'];} ?>" />
<select style="width:50px;" name="monthName" id="m<?php echo $k."-".$res['ProductId']."-".$b; ?>" onChange="monthCheck(<?php echo $k.",".$res['ProductId'].",".$b; ?>)">	  
<?php if($mQuery['Start_Month']==1)
      { $a1=1; $a1_1='Jan'; $a2=2; $a2_1='Feb'; $a3=3; $a3_1='Mar'; $a4=4; $a4_1='Apr'; $a5=5; $a5_1='May'; $a6=6; $a6_1='Jun'; 
	    $a7=7; $a7_1='Jul'; $a8=8; $a8_1='Aug'; $a9=9; $a9_1='Sep'; $a10=10; $a10_1='Oct'; $a11=11; $a11_1='Nov'; $a12=12; $a12_1='Dec'; 
		$a13=1; $a13_1='Jan'; $a14=2; $a14_1='Feb'; $a15=3; $a15_1='Mar'; $a16=4; $a16_1='Apr'; $a17=5; $a17_1='May'; $a18=6; $a18_1='Jun'; } 
      elseif($mQuery['Start_Month']==2)
      { $a1=2; $a1_1='Feb'; $a2=3; $a2_1='Mar'; $a3=4; $a3_1='Apr'; $a4=5; $a4_1='May'; $a5=6; $a5_1='Jun'; $a6=7; $a6_1='Jul'; 
	    $a7=8; $a7_1='Aug'; $a8=9; $a8_1='Sep'; $a9=10; $a9_1='Oct'; $a10=11; $a10_1='Nov'; $a11=12; $a11_1='Dec'; $a12=1; $a12_1='Jan'; 
		$a13=2; $a13_1='Feb'; $a14=3; $a14_1='Mar'; $a15=4; $a15_1='Apr'; $a16=5; $a16_1='May'; $a17=6; $a17_1='Jun'; $a18=7; $a18_1='Jul'; } 
	  elseif($mQuery['Start_Month']==3)
      { $a1=3; $a1_1='Mar'; $a2=4; $a2_1='Apr'; $a3=5; $a3_1='May'; $a4=6; $a4_1='Jun'; $a5=7; $a5_1='Jul'; $a6=8; $a6_1='Aug'; 
	    $a7=9; $a7_1='Sep'; $a8=10; $a8_1='Oct'; $a9=11; $a9_1='Nov'; $a10=12; $a10_1='Dec'; $a11=1; $a11_1='Jan'; $a12=2; $a12_1='Feb'; 
		$a13=3; $a13_1='Mar'; $a14=4; $a14_1='Apr'; $a15=5; $a15_1='May'; $a16=6; $a16_1='Jun'; $a17=7; $a17_1='Jul'; $a18=8; $a18_1='Aug'; } 
	elseif($mQuery['Start_Month']==4)
      { $a1=4; $a1_1='Apr'; $a2=5; $a2_1='May'; $a3=6; $a3_1='Jun'; $a4=7; $a4_1='Jul'; $a5=8; $a5_1='Aug'; $a6=9; $a6_1='Sep'; 
	    $a7=10; $a7_1='Oct'; $a8=11; $a8_1='Nov'; $a9=12; $a9_1='Dec'; $a10=1; $a10_1='Jan'; $a11=2; $a11_1='Feb'; $a12=3; $a12_1='Mar'; 
		$a13=4; $a13_1='Apr'; $a14=5; $a14_1='May'; $a15=6; $a15_1='Jun'; $a16=7; $a16_1='Jul'; $a17=8; $a17_1='Aug'; $a18=9; $a18_1='Sep'; } 
	elseif($mQuery['Start_Month']==5)
      { $a1=5; $a1_1='May'; $a2=6; $a2_1='Jun'; $a3=7; $a3_1='Jul'; $a4=8; $a4_1='Aug'; $a5=9; $a5_1='Sep'; $a6=10; $a6_1='Oct'; 
	    $a7=11; $a7_1='Nov'; $a8=12; $a8_1='Dec'; $a9=1; $a9_1='Jan'; $a10=2; $a10_1='Feb'; $a11=3; $a11_1='Mar'; $a12=4; $a12_1='Apr'; 
		$a13=5; $a13_1='May'; $a14=6; $a14_1='Jun'; $a15=7; $a15_1='Jul'; $a16=8; $a16_1='Aug'; $a17=9; $a17_1='Sep'; $a18=10; $a18_1='Oct'; } 
	elseif($mQuery['Start_Month']==6)
      { $a1=6; $a1_1='Jun'; $a2=7; $a2_1='Jul'; $a3=8; $a3_1='Aug'; $a4=9; $a4_1='Sep'; $a5=10; $a5_1='Oct'; $a6=11; $a6_1='Nov'; 
	    $a7=12; $a7_1='Dec'; $a8=1; $a8_1='Jan'; $a9=2; $a9_1='Feb'; $a10=3; $a10_1='Mar'; $a11=4; $a11_1='Apr'; $a12=5; $a12_1='May'; 
		$a13=6; $a13_1='Jun'; $a14=7; $a14_1='Jul'; $a15=8; $a15_1='Aug'; $a16=9; $a16_1='Sep'; $a17=10; $a17_1='Oct'; $a18=11; $a18_1='Nov'; } 
	elseif($mQuery['Start_Month']==7)
      { $a1=7; $a1_1='Jul'; $a2=8; $a2_1='Aug'; $a3=9; $a3_1='Sep'; $a4=10; $a4_1='Oct'; $a5=11; $a5_1='Nov'; $a6=12; $a6_1='Dec'; 
	    $a7=1; $a7_1='Jan'; $a8=2; $a8_1='Feb'; $a9=3; $a9_1='Mar'; $a10=4; $a10_1='Apr'; $a11=5; $a11_1='May'; $a12=6; $a12_1='Jun'; 
		$a13=7; $a13_1='Jul'; $a14=8; $a14_1='Aug'; $a15=9; $a15_1='Sep'; $a16=10; $a16_1='Oct'; $a17=11; $a17_1='Nov'; $a18=12; $a18_1='Dec'; } 
	elseif($mQuery['Start_Month']==8)
      { $a1=8; $a1_1='Aug'; $a2=9; $a2_1='Sep'; $a3=10; $a3_1='Oct'; $a4=11; $a4_1='Nov'; $a5=12; $a5_1='Dec'; $a6=1; $a6_1='Jan'; 
	    $a7=2; $a7_1='Feb'; $a8=3; $a8_1='Mar'; $a9=4; $a9_1='Apr'; $a10=5; $a10_1='May'; $a11=6; $a11_1='Jun'; $a12=7; $a12_1='Jul'; 
		$a13=8; $a13_1='Aug'; $a14=9; $a14_1='Sep'; $a15=10; $a15_1='Oct'; $a16=11; $a16_1='Nov'; $a17=12; $a17_1='Dec'; $a18=1; $a18_1='Jan'; } 
	elseif($mQuery['Start_Month']==9)
      { $a1=9; $a1_1='Sep'; $a2=10; $a2_1='Oct'; $a3=11; $a3_1='Nov'; $a4=12; $a4_1='Dec'; $a5=1; $a5_1='Jan'; $a6=2; $a6_1='Feb'; 
	    $a7=3; $a7_1='Mar'; $a8=4; $a8_1='Apr'; $a9=5; $a9_1='May'; $a10=6; $a10_1='Jun'; $a11=7; $a11_1='Jul'; $a12=8; $a12_1='Aug'; 
		$a13=9; $a13_1='Sep'; $a14=10; $a14_1='Oct'; $a15=11; $a15_1='Nov'; $a16=12; $a16_1='Dec'; $a17=1; $a17_1='Jan'; $a18=2; $a18_1='Feb'; } 
	elseif($mQuery['Start_Month']==10)
      { $a1=10; $a1_1='Oct'; $a2=11; $a2_1='Nov'; $a3=12; $a3_1='Dec'; $a4=1; $a4_1='Jan'; $a5=2; $a5_1='Feb'; $a6=3; $a6_1='Mar'; 
	    $a7=4; $a7_1='Apr'; $a8=5; $a8_1='May'; $a9=6; $a9_1='Jun'; $a10=7; $a10_1='Jul'; $a11=8; $a11_1='Aug'; $a12=9; $a12_1='Sep'; 
		$a13=10; $a13_1='Oct'; $a14=11; $a14_1='Nov'; $a15=12; $a15_1='Dec'; $a16=1; $a16_1='Jan'; $a17=2; $a17_1='Feb'; $a18=3; $a18_1='Mar'; } 
	elseif($mQuery['Start_Month']==11)
      { $a1=11; $a1_1='Nov'; $a2=12; $a2_1='Dec'; $a3=1; $a3_1='Jan'; $a4=2; $a4_1='Feb'; $a5=3; $a5_1='Mar'; $a6=4; $a6_1='Apr'; 
	    $a7=5; $a7_1='May'; $a8=6; $a8_1='Jun'; $a9=7; $a9_1='Jul'; $a10=8; $a10_1='Aug'; $a11=9; $a11_1='Sep'; $a12=10; $a12_1='Oct'; 
		$a13=11; $a13_1='Nov'; $a14=12; $a14_1='Dec'; $a15=1; $a15_1='Jan'; $a16=2; $a16_1='Feb'; $a17=3; $a17_1='Mar'; $a18=4; $a18_1='Apr'; } 
	elseif($mQuery['Start_Month']==12)
      { $a1=12; $a1_1='Dec'; $a2=1; $a2_1='Jan'; $a3=2; $a3_1='Feb'; $a4=3; $a4_1='Mar'; $a5=4; $a5_1='Apr'; $a6=5; $a6_1='May'; 
	    $a7=6; $a7_1='Jun'; $a8=7; $a8_1='Jul'; $a9=8; $a9_1='Aug'; $a10=9; $a10_1='Sep'; $a11=10; $a11_1='Oct'; $a12=11; $a12_1='Nov'; 
		$a13=12; $a13_1='Dec'; $a14=1; $a14_1='Jan'; $a15=2; $a15_1='Feb'; $a16=3; $a16_1='Mar'; $a17=4; $a17_1='Apr'; $a18=5; $a18_1='May'; } 		
		
if($k==1){echo $a1;}elseif($k==2){echo $a2;}elseif($k==3){echo $a3;}elseif($k==4){echo $a4;}elseif($k==5){echo $a5;}elseif($k==6){echo $a6;}
elseif($k==7){echo $a7;}elseif($k==8){echo $a8;}elseif($k==9){echo $a9;}elseif($k==10){echo $a10;}elseif($k==11){echo $a11;}elseif($k==12){echo $a12;}
elseif($k==13){echo $a13;}elseif($k==14){echo $a14;}elseif($k==15){echo $a15;}elseif($k==16){echo $a16;}elseif($k==17){echo $a17;}elseif($k==18){echo $a18;}

if($k==1){echo $a1_1;}elseif($k==2){echo $a2_1;}elseif($k==3){echo $a3_1;}elseif($k==4){echo $a4_1;}elseif($k==5){echo $a5_1;}elseif($k==6){echo $a6_1;}
elseif($k==7){echo $a7_1;}elseif($k==8){echo $a8_1;}elseif($k==9){echo $a9_1;}elseif($k==10){echo $a10_1;}elseif($k==11){echo $a11_1;}elseif($k==12){echo $a12_1;}
elseif($k==13){echo $a13_1;}elseif($k==14){echo $a14_1;}elseif($k==15){echo $a15_1;}elseif($k==16){echo $a16_1;}elseif($k==17){echo $a17_1;}elseif($k==18){echo $a18_1;}
?>	
<?php if($mQuery['Start_Month']==1){ ?>
<option value="<?php if($k==1){echo $a1;}elseif($k==2){echo $a2;}elseif($k==3){echo $a3;}elseif($k==4){echo $a4;}elseif($k==5){echo $a5;}elseif($k==6){echo $a6;}
elseif($k==7){echo $a7;}elseif($k==8){echo $a8;}elseif($k==9){echo $a9;}elseif($k==10){echo $a10;}elseif($k==11){echo $a11;}elseif($k==12){echo $a12;}
elseif($k==13){echo $a13;}elseif($k==14){echo $a14;}elseif($k==15){echo $a15;}elseif($k==16){echo $a16;}elseif($k==17){echo $a17;}elseif($k==18){echo $a18;}
?>"><?php if($k==1){echo $a1_1;}elseif($k==2){echo $a2_1;}elseif($k==3){echo $a3_1;}elseif($k==4){echo $a4_1;}elseif($k==5){echo $a5_1;}elseif($k==6){echo $a6_1;}
elseif($k==7){echo $a7_1;}elseif($k==8){echo $a8_1;}elseif($k==9){echo $a9_1;}elseif($k==10){echo $a10_1;}elseif($k==11){echo $a11_1;}elseif($k==12){echo $a12_1;}
elseif($k==13){echo $a13_1;}elseif($k==14){echo $a14_1;}elseif($k==15){echo $a15_1;}elseif($k==16){echo $a16_1;}elseif($k==17){echo $a17_1;}elseif($k==18){echo $a18_1;}
?></option><option value='2'>Feb</option><option value='3'>Mar</option><option value='4'>Apr</option><option value='5'>May</option><option value='6'>Jun</option><option value='7'>Jul</option><option value='8'>Aug</option><option value='9'>Sep</option><option value='10'>Oct</option><option value='11'>Nov</option><option value='12'>Dec</option><?php } elseif($mQuery['Start_Month']==2){?>
<option value="<?php if($k==1){echo $a1;}elseif($k==2){echo $a2;}elseif($k==3){echo $a3;}elseif($k==4){echo $a4;}elseif($k==5){echo $a5;}elseif($k==6){echo $a6;}
elseif($k==7){echo $a7;}elseif($k==8){echo $a8;}elseif($k==9){echo $a9;}elseif($k==10){echo $a10;}elseif($k==11){echo $a11;}elseif($k==12){echo $a12;}
elseif($k==13){echo $a13;}elseif($k==14){echo $a14;}elseif($k==15){echo $a15;}elseif($k==16){echo $a16;}elseif($k==17){echo $a17;}elseif($k==18){echo $a18;}
?>"><?php if($k==1){echo $a1_1;}elseif($k==2){echo $a2_1;}elseif($k==3){echo $a3_1;}elseif($k==4){echo $a4_1;}elseif($k==5){echo $a5_1;}elseif($k==6){echo $a6_1;}
elseif($k==7){echo $a7_1;}elseif($k==8){echo $a8_1;}elseif($k==9){echo $a9_1;}elseif($k==10){echo $a10_1;}elseif($k==11){echo $a11_1;}elseif($k==12){echo $a12_1;}
elseif($k==13){echo $a13_1;}elseif($k==14){echo $a14_1;}elseif($k==15){echo $a15_1;}elseif($k==16){echo $a16_1;}elseif($k==17){echo $a17_1;}elseif($k==18){echo $a18_1;}
?></option><option value='3'>Mar</option><option value='4'>Apr</option><option value='5'>May</option><option value='6'>Jun</option><option value='7'>Jul</option><option value='8'>Aug</option><option value='9'>Sep</option><option value='10'>Oct</option><option value='11'>Nov</option><option value='12'>Dec</option><option value='1'>Jan</option><?php  }elseif($mQuery['Start_Month']==3){?>
<option value="<?php if($k==1){echo $a1;}elseif($k==2){echo $a2;}elseif($k==3){echo $a3;}elseif($k==4){echo $a4;}elseif($k==5){echo $a5;}elseif($k==6){echo $a6;}
elseif($k==7){echo $a7;}elseif($k==8){echo $a8;}elseif($k==9){echo $a9;}elseif($k==10){echo $a10;}elseif($k==11){echo $a11;}elseif($k==12){echo $a12;}
elseif($k==13){echo $a13;}elseif($k==14){echo $a14;}elseif($k==15){echo $a15;}elseif($k==16){echo $a16;}elseif($k==17){echo $a17;}elseif($k==18){echo $a18;}
?>"><?php if($k==1){echo $a1_1;}elseif($k==2){echo $a2_1;}elseif($k==3){echo $a3_1;}elseif($k==4){echo $a4_1;}elseif($k==5){echo $a5_1;}elseif($k==6){echo $a6_1;}
elseif($k==7){echo $a7_1;}elseif($k==8){echo $a8_1;}elseif($k==9){echo $a9_1;}elseif($k==10){echo $a10_1;}elseif($k==11){echo $a11_1;}elseif($k==12){echo $a12_1;}
elseif($k==13){echo $a13_1;}elseif($k==14){echo $a14_1;}elseif($k==15){echo $a15_1;}elseif($k==16){echo $a16_1;}elseif($k==17){echo $a17_1;}elseif($k==18){echo $a18_1;}
?></option><option value='4'>Apr</option><option value='5'>May</option><option value='6'>Jun</option><option value='7'>Jul</option><option value='8'>Aug</option><option value='9'>Sep</option><option value='10'>Oct</option><option value='11'>Nov</option><option value='12'>Dec</option><option value='1'>Jan</option><option value='2'>Feb</option><?php  }elseif($mQuery['Start_Month']==4){?>
<option value="<?php if($k==1){echo $a1;}elseif($k==2){echo $a2;}elseif($k==3){echo $a3;}elseif($k==4){echo $a4;}elseif($k==5){echo $a5;}elseif($k==6){echo $a6;}
elseif($k==7){echo $a7;}elseif($k==8){echo $a8;}elseif($k==9){echo $a9;}elseif($k==10){echo $a10;}elseif($k==11){echo $a11;}elseif($k==12){echo $a12;}
elseif($k==13){echo $a13;}elseif($k==14){echo $a14;}elseif($k==15){echo $a15;}elseif($k==16){echo $a16;}elseif($k==17){echo $a17;}elseif($k==18){echo $a18;}
?>"><?php if($k==1){echo $a1_1;}elseif($k==2){echo $a2_1;}elseif($k==3){echo $a3_1;}elseif($k==4){echo $a4_1;}elseif($k==5){echo $a5_1;}elseif($k==6){echo $a6_1;}
elseif($k==7){echo $a7_1;}elseif($k==8){echo $a8_1;}elseif($k==9){echo $a9_1;}elseif($k==10){echo $a10_1;}elseif($k==11){echo $a11_1;}elseif($k==12){echo $a12_1;}
elseif($k==13){echo $a13_1;}elseif($k==14){echo $a14_1;}elseif($k==15){echo $a15_1;}elseif($k==16){echo $a16_1;}elseif($k==17){echo $a17_1;}elseif($k==18){echo $a18_1;}
?></option><option value='5'>May</option><option value='6'>Jun</option><option value='7'>Jul</option><option value='8'>Aug</option><option value='9'>Sep</option><option value='10'>Oct</option><option value='11'>Nov</option><option value='12'>Dec</option><option value='1'>Jan</option><option value='2'>Feb</option><option value='3'>Mar</option><?php  }elseif($mQuery['Start_Month']==5){?>
<option value="<?php if($k==1){echo $a1;}elseif($k==2){echo $a2;}elseif($k==3){echo $a3;}elseif($k==4){echo $a4;}elseif($k==5){echo $a5;}elseif($k==6){echo $a6;}
elseif($k==7){echo $a7;}elseif($k==8){echo $a8;}elseif($k==9){echo $a9;}elseif($k==10){echo $a10;}elseif($k==11){echo $a11;}elseif($k==12){echo $a12;}
elseif($k==13){echo $a13;}elseif($k==14){echo $a14;}elseif($k==15){echo $a15;}elseif($k==16){echo $a16;}elseif($k==17){echo $a17;}elseif($k==18){echo $a18;}
?>"><?php if($k==1){echo $a1_1;}elseif($k==2){echo $a2_1;}elseif($k==3){echo $a3_1;}elseif($k==4){echo $a4_1;}elseif($k==5){echo $a5_1;}elseif($k==6){echo $a6_1;}
elseif($k==7){echo $a7_1;}elseif($k==8){echo $a8_1;}elseif($k==9){echo $a9_1;}elseif($k==10){echo $a10_1;}elseif($k==11){echo $a11_1;}elseif($k==12){echo $a12_1;}
elseif($k==13){echo $a13_1;}elseif($k==14){echo $a14_1;}elseif($k==15){echo $a15_1;}elseif($k==16){echo $a16_1;}elseif($k==17){echo $a17_1;}elseif($k==18){echo $a18_1;}
?></option><option value='6'>Jun</option><option value='7'>Jul</option><option value='8'>Aug</option><option value='9'>Sep</option><option value='10'>Oct</option><option value='11'>Nov</option><option value='12'>Dec</option><option value='1'>Jan</option><option value='2'>Feb</option><option value='3'>Mar</option><option value='4'>Apr</option><?php  }elseif($mQuery['Start_Month']==6){?>
<option value="<?php if($k==1){echo $a1;}elseif($k==2){echo $a2;}elseif($k==3){echo $a3;}elseif($k==4){echo $a4;}elseif($k==5){echo $a5;}elseif($k==6){echo $a6;}
elseif($k==7){echo $a7;}elseif($k==8){echo $a8;}elseif($k==9){echo $a9;}elseif($k==10){echo $a10;}elseif($k==11){echo $a11;}elseif($k==12){echo $a12;}
elseif($k==13){echo $a13;}elseif($k==14){echo $a14;}elseif($k==15){echo $a15;}elseif($k==16){echo $a16;}elseif($k==17){echo $a17;}elseif($k==18){echo $a18;}
?>"><?php if($k==1){echo $a1_1;}elseif($k==2){echo $a2_1;}elseif($k==3){echo $a3_1;}elseif($k==4){echo $a4_1;}elseif($k==5){echo $a5_1;}elseif($k==6){echo $a6_1;}
elseif($k==7){echo $a7_1;}elseif($k==8){echo $a8_1;}elseif($k==9){echo $a9_1;}elseif($k==10){echo $a10_1;}elseif($k==11){echo $a11_1;}elseif($k==12){echo $a12_1;}
elseif($k==13){echo $a13_1;}elseif($k==14){echo $a14_1;}elseif($k==15){echo $a15_1;}elseif($k==16){echo $a16_1;}elseif($k==17){echo $a17_1;}elseif($k==18){echo $a18_1;}
?></option><option value='7'>Jul</option><option value='8'>Aug</option><option value='9'>Sep</option><option value='10'>Oct</option><option value='11'>Nov</option><option value='12'>Dec</option><option value='1'>Jan</option><option value='2'>Feb</option><option value='3'>Mar</option><option value='4'>Apr</option><option value='5'>May</option><?php  }elseif($mQuery['Start_Month']==7){?>
<option value="<?php if($k==1){echo $a1;}elseif($k==2){echo $a2;}elseif($k==3){echo $a3;}elseif($k==4){echo $a4;}elseif($k==5){echo $a5;}elseif($k==6){echo $a6;}
elseif($k==7){echo $a7;}elseif($k==8){echo $a8;}elseif($k==9){echo $a9;}elseif($k==10){echo $a10;}elseif($k==11){echo $a11;}elseif($k==12){echo $a12;}
elseif($k==13){echo $a13;}elseif($k==14){echo $a14;}elseif($k==15){echo $a15;}elseif($k==16){echo $a16;}elseif($k==17){echo $a17;}elseif($k==18){echo $a18;}
?>"><?php if($k==1){echo $a1_1;}elseif($k==2){echo $a2_1;}elseif($k==3){echo $a3_1;}elseif($k==4){echo $a4_1;}elseif($k==5){echo $a5_1;}elseif($k==6){echo $a6_1;}
elseif($k==7){echo $a7_1;}elseif($k==8){echo $a8_1;}elseif($k==9){echo $a9_1;}elseif($k==10){echo $a10_1;}elseif($k==11){echo $a11_1;}elseif($k==12){echo $a12_1;}
elseif($k==13){echo $a13_1;}elseif($k==14){echo $a14_1;}elseif($k==15){echo $a15_1;}elseif($k==16){echo $a16_1;}elseif($k==17){echo $a17_1;}elseif($k==18){echo $a18_1;}
?></option><option value='8'>Aug</option><option value='9'>Sep</option><option value='10'>Oct</option><option value='11'>Nov</option><option value='12'>Dec</option><option value='1'>Jan</option><option value='2'>Feb</option><option value='3'>Mar</option><option value='4'>Apr</option><option value='5'>May</option><option value='6'>Jun</option><?php  }elseif($mQuery['Start_Month']==8){?>
<option value="<?php if($k==1){echo $a1;}elseif($k==2){echo $a2;}elseif($k==3){echo $a3;}elseif($k==4){echo $a4;}elseif($k==5){echo $a5;}elseif($k==6){echo $a6;}
elseif($k==7){echo $a7;}elseif($k==8){echo $a8;}elseif($k==9){echo $a9;}elseif($k==10){echo $a10;}elseif($k==11){echo $a11;}elseif($k==12){echo $a12;}
elseif($k==13){echo $a13;}elseif($k==14){echo $a14;}elseif($k==15){echo $a15;}elseif($k==16){echo $a16;}elseif($k==17){echo $a17;}elseif($k==18){echo $a18;}
?>"><?php if($k==1){echo $a1_1;}elseif($k==2){echo $a2_1;}elseif($k==3){echo $a3_1;}elseif($k==4){echo $a4_1;}elseif($k==5){echo $a5_1;}elseif($k==6){echo $a6_1;}
elseif($k==7){echo $a7_1;}elseif($k==8){echo $a8_1;}elseif($k==9){echo $a9_1;}elseif($k==10){echo $a10_1;}elseif($k==11){echo $a11_1;}elseif($k==12){echo $a12_1;}
elseif($k==13){echo $a13_1;}elseif($k==14){echo $a14_1;}elseif($k==15){echo $a15_1;}elseif($k==16){echo $a16_1;}elseif($k==17){echo $a17_1;}elseif($k==18){echo $a18_1;}
?></option><option value='9'>Sep</option><option value='10'>Oct</option><option value='11'>Nov</option><option value='12'>Dec</option><option value='1'>Jan</option><option value='2'>Feb</option><option value='3'>Mar</option><option value='4'>Apr</option><option value='5'>May</option><option value='6'>Jun</option><option value='7'>Jul</option><?php  }elseif($mQuery['Start_Month']==9){?>
<option value="<?php if($k==1){echo $a1;}elseif($k==2){echo $a2;}elseif($k==3){echo $a3;}elseif($k==4){echo $a4;}elseif($k==5){echo $a5;}elseif($k==6){echo $a6;}
elseif($k==7){echo $a7;}elseif($k==8){echo $a8;}elseif($k==9){echo $a9;}elseif($k==10){echo $a10;}elseif($k==11){echo $a11;}elseif($k==12){echo $a12;}
elseif($k==13){echo $a13;}elseif($k==14){echo $a14;}elseif($k==15){echo $a15;}elseif($k==16){echo $a16;}elseif($k==17){echo $a17;}elseif($k==18){echo $a18;}
?>"><?php if($k==1){echo $a1_1;}elseif($k==2){echo $a2_1;}elseif($k==3){echo $a3_1;}elseif($k==4){echo $a4_1;}elseif($k==5){echo $a5_1;}elseif($k==6){echo $a6_1;}
elseif($k==7){echo $a7_1;}elseif($k==8){echo $a8_1;}elseif($k==9){echo $a9_1;}elseif($k==10){echo $a10_1;}elseif($k==11){echo $a11_1;}elseif($k==12){echo $a12_1;}
elseif($k==13){echo $a13_1;}elseif($k==14){echo $a14_1;}elseif($k==15){echo $a15_1;}elseif($k==16){echo $a16_1;}elseif($k==17){echo $a17_1;}elseif($k==18){echo $a18_1;}
?></option><option value='10'>Oct</option><option value='11'>Nov</option><option value='12'>Dec</option><option value='1'>Jan</option><option value='2'>Feb</option><option value='3'>Mar</option><option value='4'>Apr</option><option value='5'>May</option><option value='6'>Jun</option><option value='7'>Jul</option><option value='8'>Aug</option><?php  }elseif($mQuery['Start_Month']==10){?>
<option value="<?php if($k==1){echo $a1;}elseif($k==2){echo $a2;}elseif($k==3){echo $a3;}elseif($k==4){echo $a4;}elseif($k==5){echo $a5;}elseif($k==6){echo $a6;}
elseif($k==7){echo $a7;}elseif($k==8){echo $a8;}elseif($k==9){echo $a9;}elseif($k==10){echo $a10;}elseif($k==11){echo $a11;}elseif($k==12){echo $a12;}
elseif($k==13){echo $a13;}elseif($k==14){echo $a14;}elseif($k==15){echo $a15;}elseif($k==16){echo $a16;}elseif($k==17){echo $a17;}elseif($k==18){echo $a18;}
?>"><?php if($k==1){echo $a1_1;}elseif($k==2){echo $a2_1;}elseif($k==3){echo $a3_1;}elseif($k==4){echo $a4_1;}elseif($k==5){echo $a5_1;}elseif($k==6){echo $a6_1;}
elseif($k==7){echo $a7_1;}elseif($k==8){echo $a8_1;}elseif($k==9){echo $a9_1;}elseif($k==10){echo $a10_1;}elseif($k==11){echo $a11_1;}elseif($k==12){echo $a12_1;}
elseif($k==13){echo $a13_1;}elseif($k==14){echo $a14_1;}elseif($k==15){echo $a15_1;}elseif($k==16){echo $a16_1;}elseif($k==17){echo $a17_1;}elseif($k==18){echo $a18_1;}
?></option><option value='11'>Nov</option><option value='12'>Dec</option><option value='1'>Jan</option><option value='2'>Feb</option><option value='3'>Mar</option><option value='4'>Apr</option><option value='5'>May</option><option value='6'>Jun</option><option value='7'>Jul</option><option value='8'>Aug</option><option value='9'>Sep</option><?php  }elseif($mQuery['Start_Month']==11){?>
<option value="<?php if($k==1){echo $a1;}elseif($k==2){echo $a2;}elseif($k==3){echo $a3;}elseif($k==4){echo $a4;}elseif($k==5){echo $a5;}elseif($k==6){echo $a6;}
elseif($k==7){echo $a7;}elseif($k==8){echo $a8;}elseif($k==9){echo $a9;}elseif($k==10){echo $a10;}elseif($k==11){echo $a11;}elseif($k==12){echo $a12;}
elseif($k==13){echo $a13;}elseif($k==14){echo $a14;}elseif($k==15){echo $a15;}elseif($k==16){echo $a16;}elseif($k==17){echo $a17;}elseif($k==18){echo $a18;}
?>"><?php if($k==1){echo $a1_1;}elseif($k==2){echo $a2_1;}elseif($k==3){echo $a3_1;}elseif($k==4){echo $a4_1;}elseif($k==5){echo $a5_1;}elseif($k==6){echo $a6_1;}
elseif($k==7){echo $a7_1;}elseif($k==8){echo $a8_1;}elseif($k==9){echo $a9_1;}elseif($k==10){echo $a10_1;}elseif($k==11){echo $a11_1;}elseif($k==12){echo $a12_1;}
elseif($k==13){echo $a13_1;}elseif($k==14){echo $a14_1;}elseif($k==15){echo $a15_1;}elseif($k==16){echo $a16_1;}elseif($k==17){echo $a17_1;}elseif($k==18){echo $a18_1;}
?></option><option value='12'>Dec</option><option value='1'>Jan</option><option value='2'>Feb</option><option value='3'>Mar</option><option value='4'>Apr</option><option value='5'>May</option><option value='6'>Jun</option><option value='7'>Jul</option><option value='8'>Aug</option><option value='9'>Sep</option><option value='10'>Oct</option><?php }elseif($mQuery['Start_Month']==12){?>
<option value="<?php if($k==1){echo $a1;}elseif($k==2){echo $a2;}elseif($k==3){echo $a3;}elseif($k==4){echo $a4;}elseif($k==5){echo $a5;}elseif($k==6){echo $a6;}
elseif($k==7){echo $a7;}elseif($k==8){echo $a8;}elseif($k==9){echo $a9;}elseif($k==10){echo $a10;}elseif($k==11){echo $a11;}elseif($k==12){echo $a12;}
elseif($k==13){echo $a13;}elseif($k==14){echo $a14;}elseif($k==15){echo $a15;}elseif($k==16){echo $a16;}elseif($k==17){echo $a17;}elseif($k==18){echo $a18;}
?>"><?php if($k==1){echo $a1_1;}elseif($k==2){echo $a2_1;}elseif($k==3){echo $a3_1;}elseif($k==4){echo $a4_1;}elseif($k==5){echo $a5_1;}elseif($k==6){echo $a6_1;}
elseif($k==7){echo $a7_1;}elseif($k==8){echo $a8_1;}elseif($k==9){echo $a9_1;}elseif($k==10){echo $a10_1;}elseif($k==11){echo $a11_1;}elseif($k==12){echo $a12_1;}
elseif($k==13){echo $a13_1;}elseif($k==14){echo $a14_1;}elseif($k==15){echo $a15_1;}elseif($k==16){echo $a16_1;}elseif($k==17){echo $a17_1;}elseif($k==18){echo $a18_1;}
?></option><option value='1'>Jan</option><option value='2'>Feb</option><option value='3'>Mar</option><option value='4'>Apr</option><option value='5'>May</option><option value='6'>Jun</option><option value='7'>Jul</option><option value='8'>Aug</option><option value='9'>Sep</option><option value='10'>Oct</option><option value='11'>Nov</option><?php } ?></select></td>
<?php echo "<td><select id='a".$k."-".$res['ProductId']."-".$b."' style='width:100px;' onchange='activity(".$k.",".$res['ProductId'].",".$b.")'>";
	  $activity=mysql_query("select * from `hrm_sales_product_activity`"); 
	  while($act=mysql_fetch_array($activity)){ echo "<option value='".$act['ActivityId']."'>".$act['ActivityName']."</option>"; } echo "</select></td>"; 
	  }

     } ?>	   
	   </tr>
	  </table>
	 </td>
	
	  
  </tr>	
<?php } }?>  	  
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
