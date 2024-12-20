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
function SelectMonthDept(value){ var x = 'NewCoreRestr.php?d='+value; window.location=x; }

function OpenRow(sn,n)
{
 if(n==1)
 {
  document.getElementById("RowSpan"+sn).style.display='block'; 
  document.getElementById("Idown"+sn).style.display='none'; document.getElementById("Iup"+sn).style.display='block';
 }
 else if(n==2)
 {
  document.getElementById("RowSpan"+sn).style.display='none';
  document.getElementById("Iup"+sn).style.display='none'; document.getElementById("Idown"+sn).style.display='block'; 
 }
 
}
    
function ApplyCore(v,no,idnm,nm)
{  
  document.getElementById(idnm+'_'+no).value=v; 
  if(nm!='')
  {
   if(nm=='Ver'){ document.getElementById("funid").value=v; }
   else if(nm=='Dept'){ document.getElementById("verid").value=v; }
   else if(nm=='SubDept'){ document.getElementById("deptid").value=v; } 
   var fun = document.getElementById("funid").value; 
   var ver = document.getElementById("verid").value;
   var dept = document.getElementById("deptid").value; 
   document.getElementById("vID").value=v; document.getElementById("noID").value=no; document.getElementById("nmID").value=nm; 
   var url = 'NewCoreRestrAjax.php';  var pars = 'Act=ApplyCore&v='+v+'&no='+no+'&nm='+nm+'&fun='+fun+'&ver='+ver+'&dept='+dept;
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
  if(nmID=='SubDept'){ ApplyCore(vID,noID,'SubDeptt','Sec');  }
  else if(nmID=='Sec'){ ApplyCore(vID,noID,'Secc','Desig');   }
}


function FunSave(no,empid,uid,comid)
{
  var agree = confirm('Are you sure you want to update the records');
  if(agree)
  {
   document.getElementById("noID").value=no;
   var Fun = document.getElementById("Funn_"+no).value;
   var Ver = document.getElementById("Verr_"+no).value; 
   var Dept = document.getElementById("Deptt_"+no).value;
   var SubDept = document.getElementById("SubDeptt_"+no).value;
   var Sec = document.getElementById("Secc_"+no).value;
   var Desig = document.getElementById("Desigg_"+no).value; 
   var Grade = document.getElementById("Gradee_"+no).value; 
   var CostC = document.getElementById("CostCC_"+no).value; 
   var Hq = document.getElementById("Hqq_"+no).value; 
   if(Fun==0 || Ver==0 || Dept==0 || Desig==0 || Grade==0 || CostC==0 || Hq==0){ alert("please check value!"); return false; }
   else
   {
    var url = 'NewCoreRestrAjax.php';  var pars = 'Act=UpdateCoreMapping&no='+no+'&empid='+empid+'&uid='+uid+'&Fun='+Fun+'&Ver='+Ver+'&Dept='+Dept+'&SubDept='+SubDept+'&Sec='+Sec+'&Desig='+Desig+'&Grade='+Grade+'&CostC='+CostC+'&Hq='+Hq+"&comid="+comid;
    var myAjax = new Ajax.Request(
    url, 
    {
     method: 'post', 
     parameters: pars,
     onComplete: show_MappingCore  
    });
   }
  }
} 
function show_MappingCore(originalRequest)
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
  window.open("NewCoreRestrExp.php?action=Export&C="+ComId+"&Y="+YId,"PrintForm","menubar=yes,scrollbars=yes,resizable=no,directories=no,width=20,height=20"); }  
  
</script>   
</head>
<body class="body">
<input type="hidden" id="vID" value="<?=$_POST['v']?>" />  
<input type="hidden" id="noID" value="<?=$_POST['no']?>" />
<input type="hidden" id="nmID" value="<?=$_POST['nm']?>" />
<input type="hidden" id="funid" value="<?=$res['EmpFunction']?>" />  
<input type="hidden" id="verid" value="<?=$res['EmpVertical']?>" />
<input type="hidden" id="deptid" value="<?=$res['DepartmentId']?>" />
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
	  <b>Core Data Mapping : </td> 
	  <td class="td1" style="font-size:11px; width:250px;">			   
	   <select style="font-size:12px;width:200px;height:21px;background-color:#DDFFBB;display:block;" name="Dept" id="Dept" onChange="SelectMonthDept(this.value)"><?php $sDept=mysql_query("select * from hrm_department where CompanyId=".$CompanyId." AND DeptStatus='A' order by DepartmentName ASC", $con); while($rDept=mysql_fetch_array($sDept)){?><option value="<?=$rDept['DepartmentId']?>" <?php if($_REQUEST['d']==$rDept['DepartmentId']){echo 'selected';}?>><?php echo '&nbsp;'.$rDept['DepartmentCode'];?></option><?php } ?><option value="All" <?php if($_REQUEST['d']=='All'){echo 'selected';}?>>&nbsp;All</option></select>
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
	<td rowspan="2" class="th" style="width:30px;"><b>SN</b></td>
	<td rowspan="2" class="th" style="width:40px;">EC</b></td>
	<td rowspan="2" class="th" style="width:150px;"><b>NAME</b></td>
	<td colspan="8" class="th">CURRENT</td>
  <td rowspan="2" class="th" style="width:50px;">Status</td>
  <td rowspan="2" class="th" style="width:50px;">Check</td>
	<!-- <td colspan="2" class="th">NEW (As per Core Mapping)</td> -->
	
 </tr>
 <tr bgcolor="#7a6189" style="height:24px;">
	<td class="th" style="width:100px;"><b>Vertical</b></td>
	<td class="th" style="width:80px;"><b>Department</b></td>
	<td class="th" style="width:100px;"><b>Designation</b></td>
	<td class="th" style="width:50px;"><b>Grade</b></td>
  <td class="th" style="width:50px;"><b>Section</b></td>
  <td class="th" style="width:50px;"><b>Cost-Center</b></td>
  <td class="th" style="width:50px;"><b>Sub-Location</b></td>
  <td class="th" style="width:50px;"><b>HQ</b></td>

	<!-- <td class="th" style="width:60px;">Status</td>
	<td class="th" style="width:50px;">Check</td> -->
	
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

$sFun=mysql_query("select f.* from core_functions f left join core_vertical_function_mapping vf on f.id=vf.org_function_id left join core_vertical_department_mapping vd on vf.id=vd.function_vertical_id where f.is_active=1 and ".$subV." group by function_name order by function_name ASC",$con); 
while($rFun=mysql_fetch_assoc($sFun)){ $aFun[$rFun['id']]=strtoupper($rFun['function_name']); }

$sVer=mysql_query("select v.* from core_verticals v left join core_vertical_function_mapping vf on v.id=vf.vertical_id left join core_vertical_department_mapping vd on vf.id=vd.function_vertical_id where v.is_active=1 and ".$subV." group by vertical_name order by vertical_name ASC",$con); 
while($rVer=mysql_fetch_assoc($sVer)){ $aVer[$rVer['id']]=strtoupper($rVer['vertical_name']); }

$sDept=mysql_query("select d.* from core_departments d where d.is_active=1 and ".$subD." group by department_name order by department_name ASC",$con);
while($rDept=mysql_fetch_array($sDept)){ $aDept[$rDept['id']]=strtoupper($rDept['department_name']); }

$sSubDept=mysql_query("select subd.* from core_sub_department_master subd left join core_sub_department_mapping subdm on subd.id=subdm.sub_department_id left join core_vertical_department_mapping vd on subdm.fun_vertical_dept_id=vd.id where subd.is_active=1 and ".$subV." group by sub_department_name order by sub_department_name",$con); 
while($rSubDept=mysql_fetch_array($sSubDept)){ $aSubDept[$rSubDept['id']]=strtoupper($rSubDept['sub_department_name']); }

$sSec = mysql_query("select * from core_section WHERE is_active=1 order by section_name",$con);
while($rSec = mysql_fetch_array($sSec)){ $aSec[$rSec['id']]=strtoupper($rSec['section_name']); }

$sDesig = mysql_query("select * from core_designation WHERE is_active=1 order by designation_name",$con);
while($rDesig = mysql_fetch_array($sDesig)){ $aDesig[$rDesig['id']]=strtoupper($rDesig['designation_name']); }

$sGrade = mysql_query("select * from core_grades WHERE is_active=1 and company_id=".$CompanyId." order by id", $con); 
while($rGrade=mysql_fetch_assoc($sGrade)){ $aGrade[$rGrade['id']]=strtoupper($rGrade['grade_name']); }

$sCostC = mysql_query("select * from core_states WHERE is_active=1 order by state_name",$con);
while($rCostC = mysql_fetch_array($sCostC)){ $aCostC[$rCostC['id']]=strtoupper($rCostC['state_name']); }

// $sHq = mysql_query("select * from core_city_village_by_state WHERE is_active=1 order by city_village_name",$con);
// while($rHq = mysql_fetch_array($sHq)){ $aHq[$rHq['id']]=strtoupper($rHq['city_village_name']); }
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
?> 	 
 <input type="hidden" name="EmpId_<?php echo $Sno; ?>" value="<?php echo $res['EmployeeID']; ?>" />
 <tr bgcolor="<?php if($no%2){ echo '#FFFFFF'; } else {echo '#FFFFFF';} //#D9D1E7 ?>" style="height:22px;"> 
  <td class="tdc" rowspan="2"><?=$no?></td>
	<td class="tdc"><?=$res['EmpCode']?></td>
	<td class="tdl"><?=$res['Name']?></td>
  <td class="tdl"><?=ucwords(strtolower($res['VerticalName']))?></td>
	<td class="tdl"><?=$res['DepartmentCode']?></td>
	<td class="tdl"><?=$res['DesigCode']?></td>
	<td class="tdc"><?=$res['GradeValue']?></td>
  <td class="tdc"><?=$res['SectionName']?></td>
  <td class="tdc"><?=$res['StateName']?></td>
  <td class="tdc"><?=$res['SubLocation']?></td>
  <td class="tdc"><?=$res['HqName']?></td>

  <?php $sqll = mysql_query("SELECT * FROM core_ess_mapping WHERE EmployeeID=".$res['EmployeeID'], $con);
        $rowss = mysql_num_rows($sqll); $ress = mysql_fetch_assoc($sqll); ?> 

  <td class="tdc" style="color:<?php if($rowss>0){echo '#009300';}?>">
    <span id="ffont<?=$no?>">
      <?php if($rowss>0){echo 'saved';}else{echo '';} ?>
    </span>
  </td> 
	 <td style="cursor:pointer;" align="center">
     <img src="images/ADown.png" id="Idown<?=$no?>" onClick="OpenRow(<?=$no?>,1)">
     <img src="images/AUp.png" id="Iup<?=$no?>" style="display:none;" onClick="OpenRow(<?=$no?>,2)">
   </td>	
	
 </tr>
 <?php /***--------------------------------------------------- ***/ ?>
 <?php /***--------------------------------------------------- ***/ ?>
 <tr>
  
  <td style="vertical-align:top;" colspan="11">

 <div id="RowSpan<?=$no?>" style="display:none;">
 <table border="1" style="width:100%;" cellspacing="0">
  <tr> 
   <td class="tdf22" style="width:100px;"><b>Function</b> <font color="#FF0000">*</font></td> 
   <td class="tdf22" style="width:100px;"><b>Vertical</b> <font color="#FF0000">*</font></td>
   <td class="tdf22" style="width:100px;"><b>Department</b> <font color="#FF0000">*</font></td>
   <td class="tdf22" style="width:100px;"><b>Sub-Department</b></td>
   <td class="tdf22" style="width:100px;"><b>Section</b></td>
   <td class="tdf22" style="width:150px;"><b>Designation</b> <font color="#FF0000">*</font></td>
   <td class="tdf22" style="width:100px;"><b>Grade</b> <font color="#FF0000">*</font></td>
   <td class="tdf22" style="width:100px;"><b>Cost Center</b> <font color="#FF0000">*</font></td>
   <td class="tdf22" style="width:100px;"><b>HQ/City</b> <font color="#FF0000">*</font></td>
   <td class="tdf22" style="width:50px;"><b>Action</b></td>
  </tr>
  <tr style="background-color:#CCEF98;">
  <td class="tdc">
  <span id="SpanFun_<?=$no?>">  
	<select name="Fun_<?=$no?>" id="Fun_<?=$no?>" onChange="ApplyCore(this.value,<?=$no?>,'Funn','Ver')" class="tdll">
    <option value="0">Select</option>
    <?php foreach ($aFun as $key => $value) { ?>
      <option value="<?=$key?>" <?php if($ress['EmpFunction']==$key){echo 'selected';}?>><?=$value?></option>
    <?php } ?>  
	</select> 
  </span>
  <input type="hidden" id="Funn_<?=$no?>" value="<?php if($ress['EmpFunction']==''){echo 0;}else{echo $ress['EmpFunction']; }?>" />
	</td>	 


   <td class="tdc">
   <span id="SpanVer_<?=$no?>">
	  <select name="Ver_<?=$no?>" id="Ver_<?=$no?>" onChange="ApplyCore(this.value,<?=$no?>,'Verr','Dept')" class="tdll"> 
    <option value="0">Select</option> 
    <?php foreach ($aVer as $key => $value) { ?>
      <option value="<?=$key?>" <?php if($ress['EmpVertical']==$key){echo 'selected';}?>><?=$value?></option>
     <?php } ?>
	  </select> 
    </span>
    <input type="hidden" id="Verr_<?=$no?>" value="<?php if($ress['EmpVertical']==''){echo 0;}else{echo $ress['EmpVertical']; }?>" />
	</td>	
	
	<td class="tdc">
	<span id="SpanDept_<?=$no?>">
  <select name="Dept_<?=$no?>" id="Dept_<?=$no?>" onChange="ApplyCore(this.value,<?=$no?>,'Deptt','SubDept')" class="tdll">
    <option value="0">Select</option>
    <?php foreach ($aDept as $key => $value) { ?>
      <option value="<?=$key?>" <?php if($ress['DepartmentId']==$key){echo 'selected';}?>><?=$value?></option>
    <?php } ?>
	</select> 
  </span>
  <input type="hidden" id="Deptt_<?=$no?>" value="<?php if($ress['DepartmentId']==''){echo 0;}else{echo $ress['DepartmentId']; }?>" />
	</td>

  <td class="tdc">
	<span id="SpanSubDept_<?=$no?>">
  <select name="SubDept_<?=$no?>" id="SubDept_<?=$no?>" onChange="ApplyCore(this.value,<?=$no?>,'SubDeptt',' ')" class="tdll">
    <option value="0">Select</option>
    <?php foreach ($aSubDept as $key => $value) { ?>
      <option value="<?=$key?>" <?php if($ress['SubDepartmentId']==$key){echo 'selected';}?>><?=$value?></option>
    <?php } ?>
	</select> 
  </span>
  <input type="hidden" id="SubDeptt_<?=$no?>" value="<?php if($ress['SubDepartmentId']==''){echo 0;}else{echo $ress['SubDepartmentId']; }?>" />
	</td>

	<td class="tdc">
	<span id="SpanSec_<?=$no?>">
  <select name="Sec_<?=$no?>" id="Sec_<?=$no?>" onChange="ApplyCore(this.value,<?=$no?>,'Secc',' ')" class="tdll">
    <option value="0">Select</option>
    <?php if($ress['EmpSection']>0)
          {
           foreach ($aSec as $key => $value) { ?><option value="<?=$key?>" <?php if($ress['EmpSection']==$key){echo 'selected';}?>><?=$value?></option><?php }else{ ?><option value="0">Select</option>
    <?php } ?>
	</select> 
  </span>
  <input type="hidden" id="Secc_<?=$no?>" value="<?php if($ress['EmpSection']==''){echo 0;}else{echo $ress['EmpSection']; }?>" />
	</td>

  <td class="tdc">
	<span id="SpanDesig_<?=$no?>"> <!-- Grade -->
  <select name="Desig_<?=$no?>" id="Desig_<?=$no?>" onChange="ApplyCore(this.value,<?=$no?>,'Desigg','')" class="tdll">
    <option value="0">Select</option>
    <?php foreach ( $aDesig as $key => $value) { ?>
      <option value="<?=$key?>" <?php if($ress['DesigId']==$key){echo 'selected';}?>><?=$value?></option>
    <?php } ?>
	</select> 
  </span>
  <input type="hidden" id="Desigg_<?=$no?>" value="<?php if($ress['DesigId']==''){echo 0;}else{echo $ress['DesigId']; }?>" />
	</td>
			
	<td class="tdc">
	<span id="SpanGrade_<?=$no?>">
  <select name="Grade_<?=$no?>" id="Grade_<?=$no?>" onChange="ApplyCore(this.value,<?=$no?>,'Gradee',' ')" class="tdll">
    <option value="0">Select</option>
    <?php foreach ($aGrade as $key => $value) { ?>
      <option value="<?=$key?>" <?php if($ress['GradeId']==$key){echo 'selected';}?>><?=$value?></option>
    <?php } ?>		
	</select>
  </span>
  <input type="hidden" id="Gradee_<?=$no?>" value="<?php if($ress['GradeId']==''){echo 0;}else{echo $ress['GradeId']; }?>" />
	</td>

  <td class="tdc">
	<span id="SpanCostC_<?=$no?>">
  <select name="CostC_<?=$no?>" id="CostC_<?=$no?>" onChange="ApplyCore(this.value,<?=$no?>,'CostCC','Hq')" class="tdll">
    <option value="0">Select</option>
    <?php foreach ($aCostC as $key => $value) { ?>
      <option value="<?=$key?>" <?php if($ress['CostCenter']==$key){echo 'selected';}?>><?=$value?></option>
    <?php } ?>
	</select> 
  </span>
  <input type="hidden" id="CostCC_<?=$no?>" value="<?php if($ress['CostCenter']==''){echo 0;}else{echo $ress['CostCenter']; }?>" />
	</td>

  <td class="tdc">
	<span id="SpanHq_<?=$no?>">
  
  <select name="Hq_<?=$no?>" id="Hq_<?=$no?>" onChange="ApplyCore(this.value,<?=$no?>,'Hqq',' ')" class="tdll">
   <?php if($ress['HqId']>0){ $sHq = mysql_query("select city_village_name from core_city_village_by_state WHERE id=".$ress['HqId'],$con);
    $rHq = mysql_fetch_assoc($sHq); ?><option value="<?=$ress['HqId']?>"><?=$rHq['city_village_name']?></option><?php } else { ?><option value="0">Select</option><?php } ?>
	</select> 
  </span>
  <input type="hidden" id="Hqq_<?=$no?>" value="<?php if($ress['HqId']==''){echo 0;}else{echo $ress['HqId']; }?>" />
	</td>

  <td class="tdc" rowspan="3">
  <span style="cursor:pointer;"><img src="images/save.gif" onclick="FunSave(<?=$no.','.$res['EmployeeID'].','.$UserId.','.$CompanyId?>)"/></span>

	<!-- <select name="Cofirm_<?=$no?>" id="Confirm_<?=$no?>" onChange="ApplyCore(this.value,<?=$no?>,'Confirm')" class="tdll">
    <option value="">Select</option><option value="Yes">Yes</option><option value="No">No</option>		
	</select>  -->
	</td>
  </tr>
  
 </table>
 </div>
 </td>
 </tr>
 <?php /***--------------------------------------------------- ***/ ?>
 <?php /***--------------------------------------------------- ***/ ?>
 
 
 
 
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