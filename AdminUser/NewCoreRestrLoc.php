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
function SelectMonthDept(value){ var x = 'NewCoreRestrLoc.php?d='+value; window.location=x; }
   
function ApplyCore(v,no,idnm,nm)
{  
  document.getElementById(idnm+'_'+no).value=v;  
  if(nm=='Zone'){ document.getElementById("Zonee_"+no).value=0; document.getElementById("Regionn_"+no).value=0; document.getElementById("Terrr_"+no).value=0; }
  else if(nm=='Region'){ document.getElementById("Regionn_"+no).value=0; document.getElementById("Terrr_"+no).value=0; }
  else if(nm=='Terr'){ document.getElementById("Terrr_"+no).value=0; }

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


function FunSave(no,empid,uid)
{
  var agree = confirm('Are you sure you want to update the records');
  if(agree)
  {
   document.getElementById("noID").value=no;
   var Bu = document.getElementById("Buu_"+no).value;
   var Zone = document.getElementById("Zonee_"+no).value; 
   var Region = document.getElementById("Regionn_"+no).value;
   var Terr = document.getElementById("Terrr_"+no).value;
   if(Bu==0 && Zone==0 && Region==0 && Terr==0){ alert("please check the selected value!"); return false; }
   else
   {
    var url = 'NewCoreRestrAjax.php';  var pars = 'Act=UpdateCoreLocMapping&no='+no+'&empid='+empid+'&uid='+uid+'&Bu='+Bu+'&Zone='+Zone+'&Region='+Region+'&Terr='+Terr;
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
  var noID=document.getElementById('noID').value;
  if(document.getElementById("RstVal").value==1)
  { alert("Data save successfully!"); document.getElementById("ffont"+noID).innerHTML='saved'; }
  else{ alert("Error.."); document.getElementById("ffont").value=''; }
}



function ExportData()
{ var ComId=document.getElementById("ComId").value; 
  var YId=document.getElementById("YearId").value;   
  window.open("NewCoreRestrLocExp.php?action=Export&C="+ComId+"&Y="+YId,"PrintForm","menubar=yes,scrollbars=yes,resizable=no,directories=no,width=20,height=20"); }  
  
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
	  <td style="width:220px;">&nbsp;<font color="#2D002D" style='font-family:Times New Roman;' size="4">
	  <b>Core Location Mapping : </td> 
	  <td class="td1" style="font-size:11px; width:250px;">			   
	   <select style="font-size:12px;width:200px;height:21px;background-color:#DDFFBB;display:block;" name="Dept" id="Dept" onChange="SelectMonthDept(this.value)"><?php $sDept=mysql_query("select * from hrm_department where CompanyId=".$CompanyId." AND DeptStatus='A' order by DepartmentName ASC", $con); while($rDept=mysql_fetch_array($sDept)){?><option value="<?=$rDept['DepartmentId']?>" <?php if($_REQUEST['d']==$rDept['DepartmentId']){echo 'selected';}?>><?php echo '&nbsp;'.$rDept['DepartmentCode'];?></option><?php } ?><option value="All" <?php if($_REQUEST['d']=='All'){echo 'selected';}?>>&nbsp;All</option></select>
     &nbsp;&nbsp;
	   <input type="hidden" name="ComId" id="ComId" value="<?php echo $CompanyId; ?>" /> 
	   <input type="hidden" name="YearId" id="YearId" value="<?php echo $YearId; ?>" />
	   <input type="hidden" name="Sn" id="Sn" value="" />
	  </td>	 
	  <td><a href="#" onClick="ExportData()" style="font-size:12px;"><b>Export Excel - All</b></a></td>
	</tr>
   </table>
  </td>
 </tr>
<?php if(($_SESSION['UserType']=='M' OR $_SESSION['UserType']=='S' OR $_SESSION['UserType']=='A') AND $_SESSION['login'] = true) { ?>	
 <tr>
  <td valign="top" style="width:100%;">
   <table border="1" valign="top" style="width:100%;" cellspacing="0">
   <tr bgcolor="#7a6189" style="height:24px;">
	  <td class="th" style="width:30px;"><b>SN</b></td>
    <td class="th" style="width:40px;">EC</b></td>
	  <td class="th" style="width:150px;"><b>Name</b></td>
    <td class="th" style="width:100px;"><b>Designation</b></td>
    <td class="th" style="width:80px;"><b>Vertical</b></td>
    <td class="th" style="width:100px;"><b>Unit</b></td>
	  <td class="th" style="width:60px;"><b>Zone</b></td>
	  <td class="th" style="width:80px;"><b>Region</b></td>
	  <td class="th" style="width:80px;"><b>Territory</b></td>
    <td class="th" style="width:50px;"><b>Status</b></td>
    <td class="th" style="width:50px;"><b>Action</b></td>
   </tr>
<?php 
if($_REQUEST['d']==11){ $NewD="(1)"; }
elseif($_REQUEST['d']==12){ $NewD="(11)"; }
elseif($_REQUEST['d']==4 || $_REQUEST['d']==27 || $_REQUEST['d']==25){ $NewD="(11,13,16,6)"; }
elseif($_REQUEST['d']==5){ $NewD="(12)"; }
elseif($_REQUEST['d']==24){ $NewD="(14)"; }
elseif($_REQUEST['d']==6 || $_REQUEST['d']==3){ $NewD="(15)"; }
elseif($_REQUEST['d']==2 || $_REQUEST['d']==40 || $_REQUEST['d']==44){ $NewD="(17,2,3)"; }
elseif($_REQUEST['d']==8){ $NewD="(4)"; }
elseif($_REQUEST['d']==1){ $NewD="(5)"; }
elseif($_REQUEST['d']==9){ $NewD="(7)"; }
elseif($_REQUEST['d']==10){ $NewD="(8)"; }
elseif($_REQUEST['d']==7){ $NewD="(9)"; }

if($_REQUEST['d']!='All')
{ $subQ="g.DepartmentId=".$_REQUEST['d']; $subV="vd.department_id in ".$NewD; $subD="d.id in ".$NewD; }
else{ $subQ="1=1"; $subV="1=1"; $subD="1=1"; }

/*************************************************************************************************/
/*************************************************************************************************/

$sBu = mysql_query("select * from core_business_unit WHERE is_active=1 order by vertical_id desc, business_unit_name",$con);
while($rBu = mysql_fetch_array($sBu)){ $aBu[$rBu['id']]=strtoupper($rBu['business_unit_name']); }

$sZn = mysql_query("select * from core_zones WHERE is_active=1 order by zone_name",$con);
while($rZn = mysql_fetch_array($sZn)){ $aZn[$rZn['id']]=strtoupper($rZn['zone_name']); }

$sRg = mysql_query("select * from core_regions WHERE is_active=1 order by region_name",$con);
while($rRg = mysql_fetch_array($sRg)){ $aRg[$rRg['id']]=strtoupper($rRg['region_name']); }

$sTr = mysql_query("select * from core_territory WHERE is_active=1 order by territory_name",$con);
while($rTr = mysql_fetch_array($sTr)){ $aTr[$rTr['id']]=strtoupper($rTr['territory_name']); }


/*************************************************************************************************/
/*************************************************************************************************/
 $sql = mysql_query("SELECT e.EmployeeID, EmpCode, concat(Fname, ' ', Sname, ' ', Lname) as Name, Gender, Married, VerticalName, g.DepartmentId, DepartmentCode, g.DesigId, DesigCode, DesigName, g.GradeId, GradeValue, SubLocation, SectionName, StateName, HqName,
 CASE 
 WHEN DR = 'Y' THEN 'Dr.'
 WHEN Gender = 'M' THEN 'Mr.'
 WHEN Gender = 'F' AND Married = 'Y' THEN 'Mrs.'
 WHEN Gender = 'F' AND Married = 'N' THEN 'Miss.'
 ELSE '' 
 END as Greeting FROM hrm_employee_general g 
 left join hrm_employee e ON g.EmployeeID=e.EmployeeID 
 left join hrm_employee_personal p on g.EmployeeID=p.EmployeeID
 left join hrm_department_vertical v on (g.EmpVertical=v.VerticalId and g.DepartmentId=v.DeptId)
 left join hrm_department d on g.DepartmentId=d.DepartmentId
 left join hrm_designation de on g.DesigId=de.DesigId
 left join hrm_grade gr on g.GradeId=gr.GradeId 
 left join hrm_state st on g.CostCenter=st.StateId
 left join hrm_headquater hq on g.HqId=hq.HqId
 left join hrm_department_section sec on g.EmpSection=sec.SectionId
 WHERE e.EmpStatus='A' AND e.CompanyId=".$CompanyId." AND ".$subQ." order by e.ECode ASC", $con);
 $no=1; 
 while($res = mysql_fetch_assoc($sql))
 { 
  $EC = str_pad($res['EmpCode'], 4, '0', STR_PAD_LEFT);
  $C=$CompanyId; $YI=$YearId; $U=$UserId;	  
  $hq=0; $rg=0; $zn=0; $bu=0;
  $sqlQ=mysql_query("select Hq_fc,Hq_vc,Terr_fc,Terr_vc from hrm_sales_dealer where (Terr_fc=".$res['EmployeeID']." OR Terr_vc=".$res['EmployeeID'].")",$con); $resQ=mysql_fetch_assoc($sqlQ);
  if($resQ['Hq_fc']>0 && $resQ['Terr_fc']==$res['EmployeeID'])
  {
    $hq=$resQ['Hq_fc'];
    $sR=mysql_query("select region_id from core_region_territory where territory_id=".$hq,$con); $rR=mysql_fetch_assoc($sR);
    $sZ=mysql_query("select zone_id from core_zone_region_mapping where region_id=".$rR['region_id'],$con); $rZ=mysql_fetch_assoc($sZ);
    $sB=mysql_query("select business_unit_id from core_bu_zone_mapping where zone_id=".$rZ['zone_id'],$con); $rB=mysql_fetch_assoc($sB);
    $rg=$rR['region_id']; $zn=$rZ['zone_id']; $bu=$rB['business_unit_id'];
  }
  else if($resQ['Hq_vc']>0 && $resQ['Terr_vc']==$res['EmployeeID'])
  {
    $hq=$resQ['Hq_vc'];
    $sR=mysql_query("select region_id from core_region_territory where territory_id=".$hq,$con); $rR=mysql_fetch_assoc($sR);
    $sZ=mysql_query("select zone_id from core_zone_region_mapping where region_id=".$rR['region_id'],$con); $rZ=mysql_fetch_assoc($sZ);
    $sB=mysql_query("select business_unit_id from core_bu_zone_mapping where zone_id=".$rZ['zone_id'],$con); $rB=mysql_fetch_assoc($sB);
    $rg=$rR['region_id']; $zn=$rZ['zone_id']; $bu=$rB['business_unit_id'];
  }
  else{ $hq=0; $rg=0; $zn=0; $bu=0; }
  

?> 	 
 <input type="hidden" name="EmpId_<?php echo $Sno; ?>" value="<?php echo $res['EmployeeID']; ?>" />
 <tr bgcolor="<?php if($no%2){ echo '#FFFFFF'; } else {echo '#FFFFFF';} //#D9D1E7 ?>" style="height:22px;"> 
  <td class="tdc"><?=$no?></td>
	<td class="tdc"><?=$res['EmpCode']?></td>
	<td class="tdl"><?=$res['Name']?></td>
  <td class="tdl"><?=$res['DesigCode']?></td>
  <td class="tdl"><?=ucwords(strtolower($res['VerticalName']))?></td>

  <?php $sqll = mysql_query("SELECT * FROM core_ess_mapping WHERE (BUId>0 OR ZoneId>0 OR RegionId>0 OR TerrId>0) AND EmployeeID=".$res['EmployeeID'], $con);
        $rowss = mysql_num_rows($sqll); $ress = mysql_fetch_assoc($sqll); ?> 

  <td class="tdc">
   <span id="SpanBu_<?=$no?>">
	  <select name="Bu_<?=$no?>" id="Bu_<?=$no?>" onChange="ApplyCore(this.value,<?=$no?>,'Buu','Zone')" class="tdll"> 
    <option value="0">Select</option>
    <?php foreach ($aBu as $key => $value) { ?>
      <option value="<?=$key?>" <?php if($ress['BUId']>0 && $ress['BUId']==$key){echo 'selected';}?>><?=$value?></option>
     <?php } ?>
	  </select> 
    </span>
    <input type="hidden" id="Buu_<?=$no?>" value="<?php if($ress['BUId']>0){echo $ress['BUId'];}else{echo 0; }?>" />
	</td>	

  <td class="tdc">
	<span id="SpanZone_<?=$no?>">
  <select name="Zone_<?=$no?>" id="Zone_<?=$no?>" onChange="ApplyCore(this.value,<?=$no?>,'Zonee','Region')" class="tdll">
  <option value="0">Select</option>
    <?php foreach ($aZn as $key => $value) { ?>
      <option value="<?=$key?>" <?php if($ress['ZoneId']>0 && $ress['ZoneId']==$key){echo 'selected';}?>><?=$value?></option>
    <?php } ?>
	</select> 
  </span>
  <input type="hidden" id="Zonee_<?=$no?>" value="<?php if($ress['ZoneId']>0){echo $ress['ZoneId'];}else{echo 0; }?>" />
	</td>

  <td class="tdc">
	<span id="SpanRegion_<?=$no?>">
  <select name="Region_<?=$no?>" id="Region_<?=$no?>" onChange="ApplyCore(this.value,<?=$no?>,'Regionn','Terr')" class="tdll">
  <option value="0">Select</option>
    <?php foreach ($aRg as $key => $value) { ?>
      <option value="<?=$key?>" <?php if($ress['RegionId']>0 && $ress['RegionId']==$key){echo 'selected';}?>><?=$value?></option>
    <?php } ?>
	</select> 
  </span>
  <input type="hidden" id="Regionn_<?=$no?>" value="<?php if($ress['RegionId']>0){echo $ress['RegionId'];}else{echo 0; }?>" />
	</td>

  <td class="tdc">
	<span id="SpanTerr_<?=$no?>">
  <select name="Terr_<?=$no?>" id="Terr_<?=$no?>" onChange="ApplyCore(this.value,<?=$no?>,'Terrr','')" class="tdll">
    <option value="0">Select</option>
    <?php foreach ($aTr as $key => $value) { ?>
      <option value="<?=$key?>" <?php if($ress['TerrId']>0 && $ress['TerrId']==$key){echo 'selected';}?>><?=$value?></option>
    <?php } ?>
	</select> 
  </span>
  <input type="hidden" id="Terrr_<?=$no?>" value="<?php if($ress['TerrId']>0){echo $ress['TerrId'];}else{echo 0; }?>" />
	</td>

  <td class="tdc" style="color:<?php if($rowss>0){echo '#009300';}?>">
    <span id="ffont<?=$no?>">
      <?php if($rowss>0){echo 'saved';}else{echo '';} ?>
    </span>
  </td> 
	<td class="tdc">
   <span style="cursor:pointer;"><img src="images/save.gif" onclick="FunSave(<?=$no.','.$res['EmployeeID'].','.$UserId?>)"/></span>
	</td>
	
 </tr>
 

 
 <?php $no++; } $sn=$no-1; echo '<input type="hidden" name="RowNo" id="RowNo" value="'.$sn.'" />'; ?>

<tr>
  <td align="left" class="fontButton" style="width:100%;" colspan="<?php if($_REQUEST['m']==1 OR $_REQUEST['m']==10){echo '19';} else{echo '18';}?>">
    <table border="0">
     <tr>
<?php if($_SESSION['User_Permission']=='Edit'){ ?>
	  <td align="left"><input type="button" name="back" id="back" style="width:90px;display:block;" value="back" onClick="javascript:window.location='Index.php?log=<?php echo $_SESSION['logCheckUser']; ?>'"></td>
	  <?php /*<td align="left"><input type="submit" name="DataSave" style="width:90px;display:block;" value="save">*/?></td>
<?php } ?>
   </tr>
   </table>
  </td>
 </tr>
 
<?php } ?> 
</table>
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