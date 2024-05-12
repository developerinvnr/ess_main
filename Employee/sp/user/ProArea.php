<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');}
include("../function.php");
include('codeEncDec.php');
if(check_user()==false){header('Location:../../../index.php');}
if($_SESSION['login'] = true){require_once('UserMenuSession.php');}
//**********************************************************************************************************************
if(isset($_POST['SaveNew'])){ $SqlInseart = mysql_query("INSERT INTO hrm_sales_product_activity SET activityName='".$_REQUEST['ActivityName']."',activityStatus=".$_REQUEST['ActivityStatus']); }
if(isset($_POST['SaveEdit'])){ $SqlUpdate = mysql_query("UPDATE hrm_sales_product_activity SET activityName='".$_REQUEST['ActivityName']."',activityStatus=".$_REQUEST['ActivityStatus']." WHERE activity_Id=".$_REQUEST['activity_Id'].""); }
if(isset($_REQUEST['action']) && $_REQUEST['action']=="delete")
{ $SqlDelete=mysql_query("delete from hrm_sales_product_activity WHERE activity_Id=".$_REQUEST['did']); }
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
function ClickCoutry(value)
{ window.location="ProArea.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&c="+value; }

function ClickGrp(CropGrp)
{  var ii=0; var ci=document.getElementById("ComId").value; var c=document.getElementById("Coutry").value; 
   window.location="ProArea.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&ci="+ci+"&grp="+CropGrp+"&ii="+ii+"&c="+c; 
}
function ChangeII(ii)
{ var CropGrp=document.getElementById("CropGrp").value; var ci=document.getElementById("ComId").value; var c=document.getElementById("Coutry").value; 
  window.location="ProArea.php?ac=2441&ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&ci="+ci+"&grp="+CropGrp+"&ii="+ii+"&c="+c; 
}
function product(id)
{ var CropGrp=document.getElementById("CropGrp").value; var ci=document.getElementById("ComId").value; var ItemV=document.getElementById("ItemV").value
  var c=document.getElementById("Coutry").value;
  window.location="ProArea.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&ci="+ci+"&grp="+CropGrp+"&ii="+ItemV+"&id="+id+"&c="+c; 
}


function check(sn,a,p,s)
{ var url = 'ProAreaAct.php'; var pars = 'a='+a+'&p='+p+'&s='+s+'&sn='+sn;	var myAjax = new Ajax.Request(
  url, { method: 'post', parameters: pars, onComplete: show_NewDEGeneral });
} 
function show_NewDEGeneral(originalRequest)
{ document.getElementById('AjaxSpanId').innerHTML = originalRequest.responseText; 
  var si=document.getElementById("si").value; var sn=document.getElementById("sn").value; var chk=document.getElementById("chk").value; 
  if(chk==0){document.getElementById("TD_"+sn+"_"+si).style.background="#008A00";}
  else if(chk==1){document.getElementById("TD_"+sn+"_"+si).style.background="#ffffff";}
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
		   <td class="heading">&nbsp;Product Area</td>
	   <td>&nbsp;</td>
	   <td style="font-size:11px;height:18px;width:80px;color:#E6E6E6;" align="right"><b>Country :</b></td>
	    <td><select style="font-size:12px;width:120px;height:20px;background-color:#DDFFBB;" name="Coutry" id="Coutry" onChange="ClickCoutry(this.value)"> 
<?php if($_REQUEST['c']>0){ $sqlC=mysql_query("SELECT CountryName FROM hrm_country where CountryId=".$_REQUEST['c'], $con); $resC=mysql_fetch_array($sqlC); ?>
<option value="<?php echo $_REQUEST['c']; ?>"><?php echo strtoupper($resC['CountryName']); ?></option><?php }else{ ?><option value="">SELECT</option><?php } ?>		
<?php $SqlCountry=mysql_query("SELECT * FROM hrm_country order by CountryName ASC", $con); while($ResCountry=mysql_fetch_array($SqlCountry)) { ?>
<option value="<?php echo $ResCountry['CountryId']; ?>"><?php echo strtoupper($ResCountry['CountryName']); ?></option><?php } ?></select>
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
         <td style="font-size:11px; height:18px;width:60px;color:#E6E6E6;" align="right"><b>Product :</b></td>
	     <td><select style="font-size:12px;width:120px;height:20px;background-color:#DDFFBB;" onChange="product(this.value)">
             <option value="0">SELECT</option>
<?php if($_REQUEST['ii']){ $productQuery=mysql_query("select ProductId,ProductName from hrm_sales_seedsproduct where ItemId=".$_REQUEST['ii']." order by ProductName asc", $con); }
      else{$productQuery=mysql_query("select ProductId,ProductName from hrm_sales_seedsproduct order by ProductName asc", $con); }
      while($rrow=mysql_fetch_array($productQuery)) 
	  {  if($_REQUEST['id']==$rrow['ProductId']){ echo "<option value='".$rrow['ProductId']."' selected>".$rrow['ProductName']."</option>"; }
                                                 echo "<option value='".$rrow['ProductId']."'>".$rrow['ProductName']."</option>"; } ?></select>	  
		 </td>
<?php /*<td style="font-size:11px; height:18px;width:80px;color:#E6E6E6;" align="center"><a href="#" onClick="PrintProArea()" style="color:#FFCE9D;"><b>PRINT</b></a></td> */ ?>
		 </tr>
		</table>
      </td>
	  
	 </tr>
	 <tr>
	 <td align="left" width="800">
<?php if($_REQUEST['id']){ ?> 	 
<table border="1" cellpadding="0" cellspacing="0" style="font-family:Times New Roman;font-size:14px;width:800px;vertical-align:top;">	
  <tr style="background-color:#808000;color:#FFFFFF;text-align:center; height:22px;">  
    <td style="width:100px;"><b>State</b></td>
	<td style="width:100px;"><b>District</b></td>
	<td style="width:200px;"><b>Area</b></td>
	<td style="width:150px;"><b>Village/ Location</b></td>
<?php $forItemId=mysql_fetch_array(mysql_query("select ItemId from hrm_sales_seedsproduct where ProductId=".$_REQUEST['id'], $con));
      $forGroup=mysql_fetch_array(mysql_query("select GroupId from hrm_sales_seedsitem where ItemId=".$forItemId['ItemId'], $con));
      $seasonQuery=mysql_query("select SeasonId,SeasonName from hrm_sales_season where GroupId=".$forGroup['GroupId']." order by SeasonId asc", $con);
      $groupQuery=mysql_num_rows($seasonQuery); while($seasonQuery1=mysql_fetch_array($seasonQuery)){ 
      echo "<td style='width:50px;'><b>".$seasonQuery1['SeasonName']."</b></td>"; }
?>
  
  </tr>	
<?php $seasonQuery1=mysql_fetch_array($seasonQuery); $groupQuery=mysql_num_rows($seasonQuery); 
      $areawise=mysql_query("SELECT V.VillageLocId,V.VillageLocName,A.AreaName,D.DistName,S.StateName FROM hrm_sales_villageloc V INNER JOIN hrm_sales_areavillage A ON V.AreaId=A.AreaId INNER JOIN hrm_sales_distric D ON A.DistId = D.DistId INNER JOIN hrm_state S ON D.StateId=S.StateId where S.CountryId=".$_REQUEST['c']." order by S.StateName ASC, D.DistName ASC, A.AreaName ASC", $con); $Sn=1; while($row1=mysql_fetch_array($areawise)) {
      echo "<tr style='background-color:#FFFFFF;'>";
      echo "<td>&nbsp;".$row1['StateName']."</td>";
      echo "<td>&nbsp;".$row1['DistName']."</td>";
      echo "<td>&nbsp;".$row1['AreaName']."</td>";
	  echo "<td>&nbsp;".$row1['VillageLocName']."</td>";
      $seasonQQ=mysql_query("select SeasonId from hrm_sales_season where GroupId=".$forGroup['GroupId']." order by SeasonId asc", $con);
      while($seasonQ=mysql_fetch_array($seasonQQ)){ $res=mysql_fetch_array(mysql_query("select ActiveStatus from hrm_sales_product_area where ProductId=".$_REQUEST['id']." and VillageLocId=".$row1['VillageLocId']." and SeasonId=".$seasonQ['SeasonId'], $con)); ?>
      <td align="center" style="background-color:<?php if($res['ActiveStatus']==1){echo "#008A00"; } ?>;" id="TD_<?php echo $Sn."_".$seasonQ['SeasonId']; ?>" ><input type='checkbox'  onClick='check(<?php echo $Sn.','.$row1['VillageLocId'].",".$_REQUEST['id'].",".$seasonQ['SeasonId'] ;?>)' <?php if($res['ActiveStatus']==1){echo "checked"; } ?> /></td><?php } ?> 
	  </tr>
	  <?php $Sn++; } ?> 	  
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
