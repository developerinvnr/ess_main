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
<Script type="text/javascript">//window.history.forward(1);</Script>
<style> .font { color:#ffffff; font-family:Times New Roman; font-size:15px; width:200px;} .font1 { font-family:Times New Roman; font-size:12px; height:14px; width:200px; } .font2 { font-size:12px;width:260px;height:18px;} .font4 { color:#1FAD34; font-family:Georgia; font-size:15px;}.span {display:none; font-family:Courier New; font-size:14px; }.span1 {display:block; font-family:Courier New; font-size:14px; }.SaveButton {background-image:url(images/save.gif); width:20px; height:20px; background-repeat:no-repeat; background-color:#FFFFFF; border-color:#FFFFFF; border-bottom:inherit;}
.EditSelect { font-family:Times New Roman; font-size:12px; height:18px;}.EditInput { font-family:Times New Roman; font-size:12px; height:22px;}.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}.inner_table { height:500px;overflow-y:auto;width:auto; } 
</style>
<script src="js/jquery-1.9.1.js"></script>
<script type="text/javascript" src="js/jquery.freezeheader.js"></script>
<Script type="text/javascript" language="javascript">
$(document).ready(function () { $("#table1").freezeHeader({ 'height':'500px' }); })

function ClickGrp(CropGrp)
{  var ii=0; var ci=document.getElementById("ComId").value; 
   window.location="ArrengeProd.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&ci="+ci+"&grp="+CropGrp+"&ii="+ii; 
}
function ChangeII(ii)
{ var CropGrp=document.getElementById("CropGrp").value; var ci=document.getElementById("ComId").value; 
  window.location="ArrengeProd.php?ac=2441&ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&ci="+ci+"&grp="+CropGrp+"&ii="+ii; 
}
function product(id)
{ var CropGrp=document.getElementById("CropGrp").value; var ci=document.getElementById("ComId").value; var ItemV=document.getElementById("ItemV").value
  window.location="ArrengeProd.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&ci="+ci+"&grp="+CropGrp+"&ii="+ItemV+"&id="+id 
}

function FucChk(sn)
{ if(document.getElementById("Chk"+sn).checked==true){document.getElementById("TR"+sn).style.background='#FF80FF'; }
  else if(document.getElementById("Chk"+sn).checked==false){document.getElementById("TR"+sn).style.background='#FFFFFF'; }
}

function ChangeSt(p,s,sn)
{ 
  if(document.getElementById("ArrgSt"+sn+"_"+p+"_"+s).checked==true){v='Y';}else{v='N';}
  var url = 'ArrengeProdAct.php'; var pars = 'Act=UpArrg&v='+v+'&p='+p+'&s='+s+'&sn='+sn;var myAjax = new Ajax.Request(
  url, { method: 'post', parameters: pars, onComplete: show_NewArrg });
} 
function show_NewArrg(originalRequest)
{ document.getElementById('AjaxArrgSpan').innerHTML = originalRequest.responseText; 
  var si=document.getElementById("si").value; var sn=document.getElementById("sn").value; 
  var pi=document.getElementById("pi").value; 
  document.getElementById("ArrgStTD"+sn+"_"+pi+"_"+si).style.background="#FFFF80";
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
   <td valign="top" align="center"  width="100%" id="MainWindow">  
    <table border="0" style="margin-top:0px; width:100%; height:300px;">
    <tr>
    <td align="left" id="type" valign="top" style="display:block;width:100%;">             
     <table border="0" style="width:100%;">
	 <tr>
	  <td style="width:100%;">
	   <table border="0" style="width:100%;">
	   <tr>
	   <td class="heading" style="width:150px;">&nbsp;Product Details</td> 
	   <td>&nbsp;</td>
	   <td style="font-size:11px;height:18px;width:60px;color:#E6E6E6;" align="right"><b>Crop :</b></td>
	    <td style="width:185px;">
		 <select style="font-size:12px;width:180px;height:20px;background-color:#DDFFBB;" name="CropGrp" id="CropGrp" onChange="ClickGrp(this.value)">
<?php if($_REQUEST['grp']==0){ ?><option value="0" selected>Select Crop</option><option value="1">Vegetable Crop</option>
                                 <option value="2">Field Crop</option><option value="3">All Crop</option>		 
<?php }elseif($_REQUEST['grp']==1){ ?><option value="1" selected>Vegetable Crop</option><option value="2">Field Crop</option><option value="3">All Crop</option>
<?php }elseif($_REQUEST['grp']==2){ ?><option value="2" selected>Field Crop</option><option value="1">Vegetable Crop</option><option value="3">All CROP</option>
<?php }elseif($_REQUEST['grp']==3){ ?><option value="3" selected>All Crop</option><option value="1">Vegetable Crop</option><option value="2">Field Crop</option><?php } ?>
        </select>
		</td>
		<td>&nbsp;</td>
		<td style="font-size:11px; height:18px;width:50px;color:#E6E6E6;" align="right"><b>Item :</b></td>
	     <td>
		 <select style="font-size:12px;width:120px;height:20px;background-color:#DDFFBB;" name="ItemV" id="ItemV" onChange="ChangeII(this.value)">
<?php if($_REQUEST['ii']>0){ $sqlI=mysql_query("select ItemName from hrm_sales_seedsitem where ItemId=".$_REQUEST['ii'], $con); $resI=mysql_fetch_assoc($sqlI); ?>	
<option value="<?php echo $_REQUEST['ii']; ?>" selected><?php echo $resI['ItemName']; ?></option>
<?php }  else{ ?><option value="0" selected>Select</option><?php } ?>
<?php if($_REQUEST['grp']==0){ $sqlItem=mysql_query("select * from hrm_sales_seedsitem order by ItemName ASC", $con);}
      elseif($_REQUEST['grp']==1){ $sqlItem=mysql_query("select * from hrm_sales_seedsitem where GroupId=1 order by ItemName ASC", $con);}
      elseif($_REQUEST['grp']==2){ $sqlItem=mysql_query("select * from hrm_sales_seedsitem where GroupId=2 order by ItemName ASC", $con);}
      elseif($_REQUEST['grp']==3){ $sqlItem=mysql_query("select * from hrm_sales_seedsitem where (GroupId=1 OR GroupId=2) order by ItemName ASC", $con);}
	  while($resItem=mysql_fetch_assoc($sqlItem)){ ?><option value="<?php echo $resItem['ItemId']; ?>"><?php echo $resItem['ItemName']; ?></option><?php } ?>
	     </select>	  
		 </td>
		 <td>&nbsp;</td>
		 <td style="font-size:11px; height:18px;width:180px;color:#E6E6E6;">
		 <?php /* if($_REQUEST['ii']>0 OR $_REQUEST['grp']>0){ ?>
         <a href="#" onClick="ExportProductDtl(<?php echo $_REQUEST['grp'].', '.$_REQUEST['ii']; ?>)" style="color:#F9F900; font-size:12px;"><b>Export Excel</b></a>
		 <?php } */ ?>
		 </td>
		 </tr>
		</table>
      </td>
	  
	 </tr>
	 <tr>
	 <td align="left" width="100%">
<?php if($_REQUEST['ii']>0 OR $_REQUEST['grp']>0){ ?>	 
<table border="1" id="table1" cellpadding="0" cellspacing="0" style="width:100%;">	
<div class="thead">
<thead>
   <tr style="background-color:#D5F1D1;color:#000000;height:22px;">  
    <td align="center" style="width:30px;font-size:11px;">&nbsp;</td>
    <td align="center" style="width:100px;font-size:11px;"><b>CROP</b></td>
	<td align="center" style="width:100px;font-size:11px;"><b>VARIETY</b></td>
	<td align="center" style="width:30px;font-size:11px;"><b>TYPE</b></td>
<?php $sqls = mysql_query("SELECT StateCode FROM hrm_state order by StateName ASC", $con); while($ress = mysql_fetch_array($sqls)){?><td align="center" style="width:30px;font-size:11px;"><b><?php echo $ress['StateCode']; ?></b></td><?php } ?>	
  </tr>
</thead>
</div>  
  <?php if($_REQUEST['ii']>0){$sql = mysql_query("select sp.ItemId,ProductId,ProductName,ItemName,TypeName from hrm_sales_seedsproduct sp INNER JOIN hrm_sales_seedsitem si ON sp.ItemId=si.ItemId INNER JOIN hrm_sales_seedtype st ON sp.TypeId=st.TypeId where ProductSts='A' AND si.ItemId=".$_REQUEST['ii']." order by ItemName ASC, TypeName ASC, ProductName ASC", $con); }
      else
	  { if($_REQUEST['grp']==1 OR $_REQUEST['grp']==2){$sql = mysql_query("select sp.ItemId,ProductId,ProductName,ItemName,TypeName from hrm_sales_seedsproduct sp INNER JOIN hrm_sales_seedsitem si ON sp.ItemId=si.ItemId INNER JOIN hrm_sales_seedtype st ON sp.TypeId=st.TypeId where ProductSts='A' AND si.GroupId=".$_REQUEST['grp']." order by ItemName ASC, TypeName ASC, ProductName ASC", $con);} 
	    if($_REQUEST['grp']==3){$sql = mysql_query("select sp.ItemId,ProductId,ProductName,ItemName,TypeName from hrm_sales_seedsproduct sp INNER JOIN hrm_sales_seedsitem si ON sp.ItemId=si.ItemId INNER JOIN hrm_sales_seedtype st ON sp.TypeId=st.TypeId where ProductSts='A' AND order by si.GroupId ASC, ItemName ASC, TypeName ASC, ProductName ASC", $con); }
	  }   
	  $Sn=1; while($res=mysql_fetch_array($sql)){ ?>
<div class="tbody">
<tbody>	    
   <tr bgcolor="#FFFFFF" style="height:22px;" id="TR<?php echo $Sn; ?>">  
     <td align="center" style="width:30px;font-size:12px;"><input type="checkbox" id="Chk<?php echo $Sn; ?>" onClick="FucChk(<?php echo $Sn; ?>)" /></td>
     <td style="width:120px;"><input type="text" style="width:100%;border:hidden;font-size:12px;font-family:Times New Roman;" value="<?php echo $res['ItemName']; ?>" /></td>	 
     <td style="width:120px;"><input type="text" style="width:100%;border:hidden;font-size:12px;font-family:Times New Roman;" value="<?php echo $res['ProductName']; ?>" /></td>
     <td align="center" style="width:30px;font-size:12px;"><?php echo substr_replace($res['TypeName'],'',2);?></td>
	 
<?php $sqls2 = mysql_query("SELECT * FROM hrm_state order by StateName ASC", $con); while($ress2 = mysql_fetch_array($sqls2)){?>
<?php $sqlc=mysql_query("SELECT * FROM hrm_sales_arrange_prod where ProductId=".$res['ProductId']." AND StateId=".$ress2['StateId'],$con); $resc=mysql_fetch_assoc($sqlc); ?>	 	
	 <td align="center" id="ArrgStTD<?php echo $Sn.'_'.$res['ProductId'].'_'.$ress2['StateId']; ?>" style="background-color:<?php if($resc['ArrgStatus']=='Y'){echo '#C6FF8C';} ?>;">
	 
<input type="checkbox" id="ArrgSt<?php echo $Sn.'_'.$res['ProductId'].'_'.$ress2['StateId']; ?>" onClick="ChangeSt(<?php echo $res['ProductId'].','.$ress2['StateId'].','.$Sn; ?>)" value="<?php if($resc['ArrgStatus']=='Y'){ echo 'Y';}else{echo 'N';} ?>" <?php if($resc['ArrgStatus']=='Y'){ echo 'checked';}?> />
     </td>
<?php } ?>
 
  </tr>	
</tbody>
</div>  
<?php $Sn++; } ?> 

</table>	
<?php } ?>   	       
	 </td>
    </tr>
  </table>  
</td>
</tr>
<tr><td><span id="AjaxArrgSpan"></span></td></tr>
</table>
	  </td>
	</tr>
	
  </table>
 </td>
</tr>
</table>
</body>
</html>
