<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}
?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style> .font { color:#ffffff; font-family:Georgia; font-size:11px; width:250px;} .font4 { color:#1FAD34; font-family:Georgia; font-size:13px; height:10px;}
.span {display:none; font-family:Courier New; font-size:14px; }.span1 {display:block; font-family:Courier New; font-size:14px; }
.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;}
.cell {color:#FFFFFF;font-family:Times New Roman;font-size:14px;font-weight:bold;} 
.cell2 {color:#000;font-family:Times New Roman;font-size:14px;} .cell3 {color:#030303;font-family:Times New Roman;font-size:14px; font-weight:bold;} 
.cellOpe {color:#FFFFFF;font-family:Times New Roman; height:20px; font-size:14px; font-weight:bold;}
.cellOpe2 {color:#000;font-family:Times New Roman; height:20px; font-size:14px; font-weight:bold;}
.cellOpe3 {color:#000;font-family:Times New Roman; width:30px;height:20px; font-size:14px; font-weight:bold;}
.th{ font-family:Times New Roman;font-size:12px; text-align:center; font-weight:bold; color:#FFFFFF; }
.tdc{ font-family:Times New Roman;font-size:12px; text-align:center; color:#000000; }
.tdl{ font-family:Times New Roman;font-size:12px; padding-left:2px; color:#000000; }
.tdll{ font-family:Times New Roman;font-size:12px; padding-left:2px; color:#000000; width:98%; }

.htf{font-family:Times New Roman;;color:#000;font-weight:bold;text-align:center;font-size:18px;height:24px;}
.htf2{font-family:Times New Roman;;color:#000;font-weight:bold;text-align:center;font-size:12px;}
.tdf{ font-family:Times New Roman;font-size:12px;color:#000000;}
.tdft{ background-color:#FFFF9D;font-family:Times New Roman;font-size:14px;color:#000000;}
.tdf2{background-color:#FFFFC4;font-family:Times New Roman;;font-size:12px;text-align:center;}
.tdf22{background-color:#FFFFC1;font-family:Times New Roman;;font-size:12px;text-align:center;}
.span {display:none; font-family:Courier New; font-size:14px; }.span1 {display:block; font-family:Courier New; font-size:14px; }
.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;}
.SaveButton {background-image:url(images/save.gif); width:20px; height:20px; background-repeat:no-repeat; background-color:#FFFFFF; border-color:#FFFFFF; border-bottom:inherit;}
.EditSelect { font-family:Georgia; font-size:12px; height:20px;}
.EditInput { font-family:Georgia; font-size:12px; height:20px;}
.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}
.tdfsel{ background-color:#FFFFFF;font-family:Times New Roman;font-size:14px;color:#000000; border:hidden;}
.inner_table{height:450px;overflow-y:auto;width:auto;}
</style>
<script type="text/javascript" src="js/stuHover.js"></script>
<script type="text/javascript" src="js/MasterAjaxCall.js"></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<Script type="text/javascript">window.history.forward(1);</script>
<script type="text/javascript" src=""></script>
<script type="text/javascript" language="javascript">
function SelectV(value){ var x = 'NewCoreRestrTerr.php?d='+value; window.location=x; }
   
function ApplyCore(v,no,idnm,nm)
{  
  document.getElementById(idnm+'_'+no).value=v;  
  if(nm!='')
  { 
   document.getElementById("vID").value=v; document.getElementById("noID").value=no; document.getElementById("nmID").value=nm; 
   var url = 'NewCoreRestrAjax.php';  var pars = 'Act=ApplyCore&v='+v+'&no='+no+'&nm='+nm; 
   var myAjax = new Ajax.Request(
   url, 
   {
    method: 'post', 
    parameters: pars,
    onComplete: show_ApplyCore
     
   });
  }    
}
function show_ApplyCore(originalRequest)
{ 
  var vID=document.getElementById('vID').value;
  var noID=document.getElementById('noID').value; 
  var nmID=document.getElementById('nmID').value; 
  document.getElementById('Span'+nmID+'_'+noID).innerHTML = originalRequest.responseText; 
  if(nmID=='SubDept'){ ApplyCore(vID,noID,'Sec');  }
  else if(nmID=='Sec'){ ApplyCore(vID,noID,'Desig');  }
}



/*********** VC *************************/
function ApplyVCore(v,no,idnm,nm)
{  
  document.getElementById(idnm+'_'+no).value=v;  
  if(nm!='')
  { 
   document.getElementById("vID").value=v; document.getElementById("noID").value=no; document.getElementById("nmID").value=nm; 
   var url = 'NewCoreRestrAjax.php';  var pars = 'Act=ApplyCore&v='+v+'&no='+no+'&nm='+nm; 
   var myAjax = new Ajax.Request(
   url, 
   {
    method: 'post', 
    parameters: pars,
    onComplete: show_Apply2Core
     
   });
  }    
}
function show_Apply2Core(originalRequest)
{ 
  var vID=document.getElementById('vID').value;
  var noID=document.getElementById('noID').value; 
  var nmID=document.getElementById('nmID').value; 
  document.getElementById('Span2'+nmID+'_'+noID).innerHTML = originalRequest.responseText; 
  if(nmID=='SubDept'){ ApplyCore(vID,noID,'Sec');  }
  else if(nmID=='Sec'){ ApplyCore(vID,noID,'Desig');  }
}


function EditBtn(no,hq,uid,t)
{
    document.getElementById(t+"_edit_"+no).style.display='none';
    document.getElementById(t+"_save_"+no).style.display='block';  
}


function FunSave(no,hq,uid,t)
{
  var agree = confirm('Are you sure you want to update the records');
  if(agree)
  {
   document.getElementById("noID").value=no;
   var Bu = document.getElementById("Buu_"+no).value;
   var Zone = document.getElementById("Zonee_"+no).value; 
   var Region = document.getElementById("Regionn_"+no).value;
   var Terr = document.getElementById("Terrr_"+no).value;
   if(Region==0 || Terr==0){ alert("please check the selected value!"); return false; } //Bu==0 || Zone==0 || 
   else
   {
    var url = 'NewCoreRestrAjax.php';  var pars = 'Act=UpdateCoreTerrMapping&no='+no+'&uid='+uid+'&t='+t+'&Hq='+hq+'&Bu='+Bu+'&Zone='+Zone+'&Region='+Region+'&Terr='+Terr;
    var myAjax = new Ajax.Request(
    url, 
    {
     method: 'post', 
     parameters: pars,
     onComplete: show_MappingCoreLoc  
    });
   }
  }
} 
function show_MappingCoreLoc(originalRequest)
{ 
  document.getElementById('DivSpan').innerHTML = originalRequest.responseText; 
  var noID=document.getElementById('noID').value; var t=document.getElementById('TypeVal').value;
  if(document.getElementById("RstVal").value==1)
  { 
    alert("Data save successfully!"); 
    document.getElementById("ffont"+noID+"_"+t).innerHTML='saved'; 
    document.getElementById(t+"_save_"+noID).style.display='none';
    document.getElementById(t+"_edit_"+noID).style.display='block';
  }
  else{ alert("Error.."); document.getElementById("ffont"+noID+"_"+t).value=''; }
}


function ExportData(type)
{ 
  var ComId=document.getElementById("ComId").value; 
  var YId=document.getElementById("YearId").value;   
  window.open("NewCoreRestrTerrExp.php?action=Export&C="+ComId+"&Y="+YId+"&t="+type,"PrintForm","menubar=yes,scrollbars=yes,resizable=no,directories=no,width=20,height=20"); }  
  
</script>   
</head>
<body class="body">
<input type="hidden" id="vID" value="<?=$_POST['v']?>" />  
<input type="hidden" id="noID" value="<?=$_POST['no']?>" />
<input type="hidden" id="nmID" value="<?=$_POST['nm']?>" />
<span id="DivSpan"></span>
<table class="table" border="0">  
<tr>
 <td>
  <table class="menutable"><tr><td><?php if($_SESSION['login'] = true){ require_once("AMenu.php"); } ?></td></tr></table>
 </td>
</tr>
<tr>
 <td valign="top">
  <table width="100%" style="margin-top:0px;" border="0">
    <tr>
	  <td valign="top" align="left"><?php if($_SESSION['login'] = true){ require_once("AWelcome.php"); } ?></td>
	</tr>
	 <tr>
	  <td valign="top" align="center"  width="100%" id="MainWindow">
<?php //*********************************************************************************************/ ?>
<?php //*************************START*****START*****START******START******START***************************/ ?>
<?php //**********************************************************************************************/ ?>

<?php

?>


<form name="formname" method="post" />  
<table border="0" style="margin-top:0px; width:100%; height:350px;">
 <tr>
  <td align="left" height="20" valign="top" colspan="3">
   <table border="0">
    <tr>
	  <td style="width:360px;">&nbsp;<font color="#2D002D" style='font-family:Times New Roman;' size="4">
	  <b>Core Territory Mapping : (<?php if($_REQUEST['d']=='FC'){echo 'Field Crop';}else{echo 'Vegetable Crop'; }?>) </td> 
	  <td class="td1" style="font-size:11px; width:250px;">
      <select style="font-size:12px;width:200px;height:21px;background-color:#DDFFBB;display:block;" name="Type" id="Type" onChange="SelectV(this.value)">
       <option value="FC" <?php if($_REQUEST['d']=='FC'){echo 'selected';}?>>&nbsp;Field Crop</option>
       <option value="VC" <?php if($_REQUEST['d']=='VC'){echo 'selected';}?>>&nbsp;Vegetable Crop</option>
      </select> 	 		   
	   <input type="hidden" name="ComId" id="ComId" value="<?php echo $CompanyId; ?>" /> 
	   <input type="hidden" name="YearId" id="YearId" value="<?php echo $YearId; ?>" />
	   <input type="hidden" name="Sn" id="Sn" value="" />
	  </td>	 
      <td><a href="#" onClick="ExportData('<?php if($_REQUEST['d']=='FC'){echo 'FC';}else{echo 'VC'; }?>')" style="font-size:12px;"><b>Export Excel - All</b></a></td>
	</tr>
   </table>
  </td>
 </tr>
<?php if(($_SESSION['UserType']=='M' OR $_SESSION['UserType']=='S' OR $_SESSION['UserType']=='A') AND $_SESSION['login'] = true) { ?>	
 <tr>

 <!---------------------   FC - FC - FC ------------------------------------------>
 <!---------------------   FC - FC - FC ------------------------------------------>
  <td valign="top" style="width:100%;display:<?php if($_REQUEST['d']=='FC'){echo 'block';}else{echo none;}?>;">
  <table border="1" valign="top" style="width:100%;" cellspacing="0">
   <tr bgcolor="#7a6189" style="height:24px;">
	<td class="th" rowspan="2" style="width:30px;"><b>SN</b></td>
    <td class="th" colspan="3">Current Territory</b></td>
    <td class="th" colspan="4">Update</b></td>
    <td class="th" rowspan="2" style="width:50px;"><b>Status</b></td>
    <td class="th" rowspan="2" style="width:50px;"><b>Action</b></td>
   </tr>
   <tr bgcolor="#7a6189" style="height:24px;">
    <td class="th" style="width:60px;"><b>Zone</b></td>
    <td class="th" style="width:80px;"><b>Region</b></td>
    <td class="th" style="width:80px;"><b>Territory</b></td>
    <td class="th" style="width:100px;"><b>Unit</b></td>
    <td class="th" style="width:60px;"><b>Zone</b></td>
    <td class="th" style="width:80px;"><b>Region</b></td>
    <td class="th" style="width:80px;"><b>Territory</b></td>
   </tr>
<?php 
/*************************************************************************************************/
/*************************************************************************************************/

$sBu = mysql_query("select * from core_business_unit WHERE is_active=1 and vertical_id=1 order by vertical_id desc, business_unit_name",$con);
while($rBu = mysql_fetch_array($sBu)){ $aBu[$rBu['id']]=strtoupper($rBu['business_unit_name']); }

$sZn = mysql_query("select * from core_zones WHERE is_active=1 and vertical_id=1 order by zone_name",$con);
while($rZn = mysql_fetch_array($sZn)){ $aZn[$rZn['id']]=strtoupper($rZn['zone_name']); }

$sRg = mysql_query("select * from core_regions WHERE is_active=1 and vertical_id=1 order by region_name",$con);
while($rRg = mysql_fetch_array($sRg)){ $aRg[$rRg['id']]=strtoupper($rRg['region_name']); }

$sTr = mysql_query("select t.id,t.territory_name from core_territory t inner join core_region_territory rt on t.id=rt.territory_id inner join core_regions rg on rt.region_id=rg.id WHERE t.is_active=1 and rg.vertical_id=1 order by t.territory_name",$con);
while($rTr = mysql_fetch_array($sTr)){ $aTr[$rTr['id']]=strtoupper($rTr['territory_name']); }

/*************************************************************************************************/
/*********************************************************************************************** 15 **/
$sql = mysql_query("select Hq_fc, HqName, StateName from hrm_sales_dealer d left join hrm_headquater hq on d.Hq_fc=hq.HqId left join hrm_state s on hq.StateId=s.StateId where d.Hq_fc!=0 group by Hq_fc order by Hq_fc", $con); 
 $no=1; 
 while($res = mysql_fetch_assoc($sql))
 { 
  $C=$CompanyId; $YI=$YearId; $U=$UserId; $Region=''; $Zone=''; 
  $sRg=mysql_query("select vh.RegionId,RegionName,ZoneName from hrm_sales_verhq vh left join hrm_sales_region sr on vh.RegionId=sr.RegionId left join hrm_sales_zone z on sr.ZoneId=z.ZoneId where vh.HqId=".$res['Hq_fc']." AND vh.Vertical=15 AND DeptId=6", $con); $rRg=mysql_fetch_assoc($sRg); 
  if($rRg['ZoneName']!=''){ $Zone=$rRg['ZoneName'];}
  if($rRg['RegionName']!=''){ $Region=$rRg['RegionName'];}
?> 	 
 <input type="hidden" name="EmpId_<?php echo $Sno; ?>" value="<?php echo $res['EmployeeID']; ?>" />
 <tr bgcolor="<?php if($no%2){ echo '#FFFFFF'; } else {echo '#FFFFFF';} //#D9D1E7 ?>" style="height:22px;"> 
  <td class="tdc"><?=$no?></td>
	<td class="tdc">&nbsp;<?=$Zone?></td>
	<td class="tdl">&nbsp;<?=$Region?></td>
    <td class="tdl" style="background-color:#FFFFCA;">&nbsp;<?=ucwords(strtolower($res['HqName']))?>
    <input type="hidden" id="Hq_FC_<?=$no?>" value="<?php if($res['Hq_fc']==''){echo 0;}else{echo $res['Hq_fc']; }?>" /></td>

  <?php $sqll = mysql_query("SELECT * FROM core_terr_mapping WHERE HqFC=".$res['Hq_fc'], $con);
        $rowss = mysql_num_rows($sqll); $ress = mysql_fetch_assoc($sqll); ?> 

  <td class="tdc">
   <span id="SpanBu_<?=$no?>">
	  <select name="Bu_<?=$no?>" id="Bu_<?=$no?>" onChange="ApplyCore(this.value,<?=$no?>,'Buu','Zone')" class="tdll"> 
    <option value="0">Select</option> 
    <?php foreach ($aBu as $key => $value) { ?>
      <option value="<?=$key?>" <?php if($ress['FC_BUId']==$key){echo 'selected';}?>><?=$value?></option>
     <?php } ?>
	  </select> 
    </span>
    <input type="hidden" id="Buu_<?=$no?>" value="<?php if($ress['FC_BUId']==''){echo 0;}else{echo $ress['FC_BUId']; }?>" />
	</td>	

  <td class="tdc">
	<span id="SpanZone_<?=$no?>">
  <select name="Zone_<?=$no?>" id="Zone_<?=$no?>" onChange="ApplyCore(this.value,<?=$no?>,'Zonee','Region')" class="tdll">
    <option value="0">Select</option>
    <?php foreach ($aZn as $key => $value) { ?>
      <option value="<?=$key?>" <?php if($ress['FC_ZoneId']==$key){echo 'selected';}?>><?=$value?></option>
    <?php } ?>
	</select> 
  </span>
  <input type="hidden" id="Zonee_<?=$no?>" value="<?php if($ress['FC_ZoneId']==''){echo 0;}else{echo $ress['FC_ZoneId']; }?>" />
	</td>

  <td class="tdc">
	<span id="SpanRegion_<?=$no?>">
  <select name="Region_<?=$no?>" id="Region_<?=$no?>" onChange="ApplyCore(this.value,<?=$no?>,'Regionn','Terr')" class="tdll">
    <option value="0">Select</option>
    <?php foreach ($aRg as $key => $value) { ?>
      <option value="<?=$key?>" <?php if($ress['FC_RegionId']==$key){echo 'selected';}?>><?=$value?></option>
    <?php } ?>
	</select> 
  </span>
  <input type="hidden" id="Regionn_<?=$no?>" value="<?php if($ress['FC_RegionId']==''){echo 0;}else{echo $ress['FC_RegionId']; }?>" />
	</td>

  <td class="tdc">
	<span id="SpanTerr_<?=$no?>">
  <select name="Terr_<?=$no?>" id="Terr_<?=$no?>" onChange="ApplyCore(this.value,<?=$no?>,'Terrr','')" class="tdll">
    <option value="0">Select</option>
    <?php foreach ($aTr as $key => $value) { ?>
      <option value="<?=$key?>" <?php if($ress['New_HQFC']==$key){echo 'selected';}?>><?=$value?></option>
    <?php } ?>
	</select> 
  </span>
  <input type="hidden" id="Terrr_<?=$no?>" value="<?php if($ress['New_HQFC']==''){echo 0;}else{echo $ress['New_HQFC']; }?>" />
	</td>

  <td class="tdc" style="color:<?php if($rowss>0){echo '#009300';}?>">
    <span id="ffont<?=$no?>_FC">
      <?php if($rowss>0){echo 'saved';}else{echo '';} ?>
    </span>
  </td> 
	<td align="center">
     <span style="cursor:pointer;">
     <img src="images/edit.png" id="FC_edit_<?=$no?>" onclick="EditBtn(<?=$no.','.$res['Hq_fc'].','.$UserId?>,'FC')" style="display:<?php if($rowss>0){echo 'block';}else{echo 'none';} ?>"/>    
     <img src="images/save.gif" id="FC_save_<?=$no?>" onclick="FunSave(<?=$no.','.$res['Hq_fc'].','.$UserId?>,'FC')" style="display:<?php if($rowss>0){echo 'none';}else{echo 'block';} ?>"/>
     </span>
	</td>
 </tr>
 
 <?php $no++; } $sn=$no-1; echo '<input type="hidden" name="RowNo" id="RowNo" value="'.$sn.'" />'; ?> 
</table>

</td>


 <!---------------------   VC - VC - VC ------------------------------------------>
 <!---------------------   VC - VC - VC ------------------------------------------>
 <td valign="top" style="width:100%;display:<?php if($_REQUEST['d']=='VC'){echo 'block';}else{echo none;}?>;">
  <table border="1" valign="top" style="width:100%;" cellspacing="0">
   <tr bgcolor="#7a6189" style="height:24px;">
	<td class="th" rowspan="2" style="width:30px;"><b>SN</b></td>
    <td class="th" colspan="3">Current Territory</b></td>
    <td class="th" colspan="4">Update</b></td>
    <td class="th" rowspan="2" style="width:50px;"><b>Status</b></td>
    <td class="th" rowspan="2" style="width:50px;"><b>Action</b></td>
   </tr>
   <tr bgcolor="#7a6189" style="height:24px;">
    <td class="th" style="width:60px;"><b>Zone</b></td>
    <td class="th" style="width:80px;"><b>Region</b></td>
    <td class="th" style="width:80px;"><b>Territory</b></td>
    <td class="th" style="width:100px;"><b>Unit</b></td>
    <td class="th" style="width:60px;"><b>Zone</b></td>
    <td class="th" style="width:80px;"><b>Region</b></td>
    <td class="th" style="width:80px;"><b>Territory</b></td>
   </tr>
<?php 
/*************************************************************************************************/
/*************************************************************************************************/

$sBu = mysql_query("select * from core_business_unit WHERE is_active=1 and vertical_id=2 order by vertical_id desc, business_unit_name",$con);
while($rBu = mysql_fetch_array($sBu)){ $bBu[$rBu['id']]=strtoupper($rBu['business_unit_name']); }

$sZn = mysql_query("select * from core_zones WHERE is_active=1 and vertical_id=2 order by zone_name",$con);
while($rZn = mysql_fetch_array($sZn)){ $bZn[$rZn['id']]=strtoupper($rZn['zone_name']); }

$sRg = mysql_query("select * from core_regions WHERE is_active=1 and vertical_id=2 order by region_name",$con);
while($rRg = mysql_fetch_array($sRg)){ $bRg[$rRg['id']]=strtoupper($rRg['region_name']); }

$sTr = mysql_query("select t.id,t.territory_name from core_territory t inner join core_region_territory rt on t.id=rt.territory_id inner join core_regions rg on rt.region_id=rg.id WHERE t.is_active=1 and rg.vertical_id=2 order by t.territory_name",$con);
while($rTr = mysql_fetch_array($sTr)){ $bTr[$rTr['id']]=strtoupper($rTr['territory_name']); }

/*************************************************************************************************/
/*********************************************************************************************** 14 **/
$sql = mysql_query("select Hq_vc, HqName, StateName from hrm_sales_dealer d left join hrm_headquater hq on d.Hq_vc=hq.HqId left join hrm_state s on hq.StateId=s.StateId where d.Hq_vc!=0 group by Hq_vc order by Hq_vc", $con); 
 $no=1; 
 while($res = mysql_fetch_assoc($sql))
 { 
  $C=$CompanyId; $YI=$YearId; $U=$UserId; $Region=''; $Zone=''; 
  $sRg=mysql_query("select vh.RegionId,RegionName,ZoneName from hrm_sales_verhq vh left join hrm_sales_region sr on vh.RegionId=sr.RegionId left join hrm_sales_zone z on sr.ZoneId=z.ZoneId where vh.HqId=".$res['Hq_vc']." AND vh.Vertical=14 AND DeptId=6", $con); $rRg=mysql_fetch_assoc($sRg); 
  if($rRg['ZoneName']!=''){ $Zone=$rRg['ZoneName'];}
  if($rRg['RegionName']!=''){ $Region=$rRg['RegionName'];}
?> 	 
 <input type="hidden" name="EmpId_<?php echo $Sno; ?>" value="<?php echo $res['EmployeeID']; ?>" />
 <tr bgcolor="<?php if($no%2){ echo '#FFFFFF'; } else {echo '#FFFFFF';} //#D9D1E7 ?>" style="height:22px;"> 
  <td class="tdc"><?=$no?></td>
	<td class="tdc">&nbsp;<?=$Zone?></td>
	<td class="tdl">&nbsp;<?=$Region?></td>
    <td class="tdl" style="background-color:#FFFFCA;">&nbsp;<?=ucwords(strtolower($res['HqName']))?>
    <input type="hidden" id="Hq_FC_<?=$no?>" value="<?php if($res['Hq_vc']==''){echo 0;}else{echo $res['Hq_vc']; }?>" /></td>

  <?php $sqll = mysql_query("SELECT * FROM core_terr_mapping WHERE HqVC=".$res['Hq_vc'], $con);
        $rowss = mysql_num_rows($sqll); $ress = mysql_fetch_assoc($sqll); ?> 

  <td class="tdc">
   <span id="Span2Bu_<?=$no?>">
	  <select name="Bu_<?=$no?>" id="Bu_<?=$no?>" onChange="ApplyVCore(this.value,<?=$no?>,'B2uu','Zone')" class="tdll"> 
    <option value="0">Select</option> 
    <?php foreach ($bBu as $key => $value) { ?>
      <option value="<?=$key?>" <?php if($ress['VC_BUId']==$key){echo 'selected';}?>><?=$value?></option>
     <?php } ?>
	  </select> 
    </span>
    <input type="hidden" id="B2uu_<?=$no?>" value="<?php if($ress['VC_BUId']==''){echo 0;}else{echo $ress['VC_BUId']; }?>" />
	</td>	

  <td class="tdc">
	<span id="Span2Zone_<?=$no?>">
  <select name="Zone_<?=$no?>" id="Zone_<?=$no?>" onChange="ApplyVCore(this.value,<?=$no?>,'Z2onee','Region')" class="tdll">
    <option value="0">Select</option>
    <?php foreach ($bZn as $key => $value) { ?>
      <option value="<?=$key?>" <?php if($ress['VC_ZoneId']==$key){echo 'selected';}?>><?=$value?></option>
    <?php } ?>
	</select> 
  </span>
  <input type="hidden" id="Z2onee_<?=$no?>" value="<?php if($ress['VC_ZoneId']==''){echo 0;}else{echo $ress['VC_ZoneId']; }?>" />
	</td>

  <td class="tdc">
	<span id="Span2Region_<?=$no?>">
  <select name="Region_<?=$no?>" id="Region_<?=$no?>" onChange="ApplyVCore(this.value,<?=$no?>,'R2egionn','Terr')" class="tdll">
    <option value="0">Select</option>
    <?php foreach ($bRg as $key => $value) { ?>
      <option value="<?=$key?>" <?php if($ress['VC_RegionId']==$key){echo 'selected';}?>><?=$value?></option>
    <?php } ?>
	</select> 
  </span>
  <input type="hidden" id="R2egionn_<?=$no?>" value="<?php if($ress['VC_RegionId']==''){echo 0;}else{echo $ress['VC_RegionId']; }?>" />
	</td>

  <td class="tdc">
	<span id="Span2Terr_<?=$no?>">
  <select name="Terr_<?=$no?>" id="Terr_<?=$no?>" onChange="ApplyVCore(this.value,<?=$no?>,'T2errr','')" class="tdll">
    <option value="0">Select</option>
    <?php foreach ($bTr as $key => $value) { ?>
      <option value="<?=$key?>" <?php if($ress['New_HQVC']==$key){echo 'selected';}?>><?=$value?></option>
    <?php } ?>
	</select> 
  </span>
  <input type="hidden" id="T2errr_<?=$no?>" value="<?php if($ress['New_HQVC']==''){echo 0;}else{echo $ress['New_HQVC']; }?>" />
	</td>

  <td class="tdc" style="color:<?php if($rowss>0){echo '#009300';}?>">
    <span id="ffont<?=$no?>_VC">
      <?php if($rowss>0){echo 'saved';}else{echo '';} ?>
    </span>
  </td> 
	<td align="center">
     <span style="cursor:pointer;">
        <img src="images/edit.png" id="VC_edit_<?=$no?>" onclick="EditBtn(<?=$no.','.$res['Hq_vc'].','.$UserId?>,'VC')" style="display:<?php if($rowss>0){echo 'block';}else{echo 'none';} ?>"/>    
        <img src="images/save.gif" id="VC_save_<?=$no?>" onclick="FunSave(<?=$no.','.$res['Hq_vc'].','.$UserId?>,'VC')" style="display:<?php if($rowss>0){echo 'none';}else{echo 'block';} ?>"/>
     </span>
	</td>
 </tr>
 
 <?php $no++; } $sn=$no-1; echo '<input type="hidden" name="RowNo" id="RowNo" value="'.$sn.'" />'; ?> 
</table>
</td>

<?php } ?>


</form>	
	
<?php //*********************************************************************************************/ ?>
<?php //*************************END*****END*****END******END******END***************************/ ?>
<?php //**********************************************************************************************/ ?>
		
	  </td>
	</tr>
	
	<tr>
	  <td valign="top" align="center">
	    <table border="0" style="margin-top:0px;">
				<tr>
	              <td align="center"><img src="images/home1.png"></td>
				</tr>
	    </table>
	  </td>
	</tr>
	<tr>
	  <td valign="top">
	    <?php require_once("../footer.php"); ?>
	  </td>
	</tr>
  </table>
 </td>
</tr>
</table>
</body>
</html>