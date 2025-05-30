<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}
//****************************************************************************************************************
?>

<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php include_once('../Title.php'); ?></title>

<link type="text/css" href="css/body.css" rel="stylesheet"/>
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style type="text/css">
.thc{ font-family:Times New Roman;font-size:12px;height:25px;text-align:center; background-color:#7a6189;color:#FFFFFF;font-weight:bold; }
.tdl{ font-family:Times New Roman;font-size:12px;text-align:left;background-color:#FFFFFF; }
.tdc{ font-family:Times New Roman;font-size:12px;text-align:center;background-color:#FFFFFF; }
</style>

<script type="text/javascript" src="src/js/jscal2.js"></script>
<script type="text/javascript" src="src/js/lang/en.js"></script>
<style>.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}</style>
<Script type="text/javascript">window.history.forward(1);</script>
<Script type="text/javascript" language="javascript">
function FunFilter(v,t)
{ 
  if(t='D'){ var dept=v; var sts=document.getElementById("stsid").value; }
  else if(t='St'){ var sts=v; var dept=document.getElementById("deptid").value; }	
  window.location='ReportsGeneral.php?action=DeptGeneral&dept='+dept+"&sts="+sts;
}


function ExportDetails()
{   var ComId=document.getElementById("ComId").value; 
	var YId=document.getElementById("YId").value; 
	var dept=document.getElementById("deptid").value;
	var sts=document.getElementById("stsid").value;
    window.open("ReportCSVGeneral.php?action=GeneralExport&dept="+dept+"&C="+ComId+"&Y="+YId+"&sts="+sts,"PrintForm","menubar=yes,scrollbars=yes,resizable=no,directories=no,width=20,height=20");}
</Script>  

</head>
<body class="body">
<input type="hidden" name="ComId" id="ComId" value="<?php echo $CompanyId; ?>" />
<input type="hidden" name="YId" id="YId" value="<?php echo $YearId; ?>" />
<input type="hidden" name="UserId" id="UserId" value="<?php echo $UserId; ?>" />
<input type="hidden" name="DeptValue" id="DeptValue" value="<?php echo $_REQUEST['value']; ?>" />
<table class="table" border="0">
<tr>
 <td>
  <table class="menutable"><tr><td><?php if($_SESSION['login'] = true){ require_once("AMenu.php"); } ?></td></tr></table>
 </td>
</tr>
<tr>
 <td>
  <table width="100%" style="margin-top:0px;" border="0">
    <tr><td valign="top"><?php if($_SESSION['login'] = true){ require_once("AWelcome.php"); } ?></td></tr>
	<tr>
	 <td valign="top" align="center" width="100%" id="MainWindow">
     <?php if( $_SESSION['login'] = true) { ?>		
<?php //************************************************************************************?>
<?php //***************Start*****END*****END******END******END*********************************?>
<?php //**************************************************************************************?> 	
<table border="1" style="margin-top:0px;width:120%;" cellspacing="1">
 <tr>
   <td colspan="50" style="width:100%;border-top:hidden;border-left:hidden;border-right:hidden;" valign="top">
   <table border="0" style="width:100%;border:hidden;">
    <tr>
	 <td style="font-family:Times New Roman;color:#96730A;font-weight:bold;font-size:20px;width:120%;">
		<i>Employee General Reports:</i>
		&nbsp;&nbsp;&nbsp;
		<select id="deptid" style="font-family:Times New Roman;font-size:13px;width:150px;" onChange="FunFilter(this.value,'D')">
		 <option value="" style="margin-left:0px;">Select Department</option>
        <?php $sDept=mysql_query("select * from core_departments where is_active=1 order by department_name", $con); 
		 while($rDept=mysql_fetch_array($sDept)) { ?>
		 <option value="<?=$rDept['id']?>" <?php if($_REQUEST['dept']==$rDept['id']){echo 'selected';}?>><?='&nbsp;'.$rDept['department_name'];?></option>
		 <?php } ?>
		 <option value="All" <?php if($_REQUEST['dept']=='All'){echo 'selected';}?>>&nbsp;All Department</option>
		</select>
		&nbsp;&nbsp;
		<select id="stsid" style="font-family:Times New Roman;font-size:13px;width:150px;" onChange="FunFilter(this.value,'St')">
		 <option value="A" <?php if($_REQUEST['sts']=='A'){echo 'selected';}?>>&nbsp;Active</option>
		 <option value="D" <?php if($_REQUEST['sts']=='D'){echo 'selected';}?>>&nbsp;Deactive</option>
		 <option value="All" <?php if($_REQUEST['sts']=='All'){echo 'selected';}?>>&nbsp;All Status</option>
		</select>
		&nbsp;&nbsp;
		<?php if($_REQUEST['dept']!=''){ ?>
		<a href="#" onClick="ExportDetails()" style="font-size:12px;">Export Details</a>
		<?php } ?>
	 </td>	
	</tr>
   </table>
 </tr>
 <tr>
	<td class="thc" style="width:60px;">EC</td>
	<td class="thc" style="width:150px;">Name</td>
	<td class="thc" style="width:100px;">Function</td>
	<td class="thc" style="width:100px;">Vertical</td>
    <td class="thc" style="width:100px;">Department</td>
	<td class="thc" style="width:100px;">Sub Department</td>
	<td class="thc" style="width:100px;">Section</td>
	<td class="thc" style="width:150px;">Designation</td>
	<td class="thc" style="width:50px;">Grade</td>
	<td class="thc" style="width:60px;">DOJ</td>
	<td class="thc" style="width:60px;">State</td>
	<td class="thc" style="width:60px;">BU</td>
	<td class="thc" style="width:60px;">Zone</td>
	<td class="thc" style="width:60px;">Region</td>
	<td class="thc" style="width:60px;">HQ</td>
	<td class="thc" style="width:60px;">Mobile</td>
	<td class="thc" style="width:60px;">Email</td>
  </tr>
  <?php if($_REQUEST['dept']!=''){
  if($_REQUEST['dept']>0){ $Qdept="g.DepartmentId=".$_REQUEST['dept']; }elseif($_REQUEST['dept']=='All'){ $Qdept="1=1"; }
  if($_REQUEST['sts']=='All'){ $QSts="e.EmpStatus!='De'"; }else{ $QSts="e.EmpStatus='".$_REQUEST['sts']."'"; } 
  $qry = "SELECT e.EmployeeID, e.EmpCode, concat(Fname, ' ', Sname, ' ', Lname) as Name, DateJoining, g.HqId, g.TerrId, MobileNo_Vnr, EmailId_Vnr, DR, Gender, Married, function_name, vertical_name, department_name, sub_department_name, section_name, designation_name, grade_name, state_name, city_village_name, business_unit_name, zone_name, region_name, territory_name,
  CASE 
  WHEN DR = 'Y' THEN 'Dr.'
  WHEN Gender = 'M' THEN 'Mr.'
  WHEN Gender = 'F' AND Married = 'Y' THEN 'Mrs.'
  WHEN Gender = 'F' AND Married = 'N' THEN 'Miss.'
  ELSE '' END as Greeting FROM hrm_employee_general g 
  left join hrm_employee e ON g.EmployeeID=e.EmployeeID 
  left join hrm_employee_personal p on g.EmployeeID=p.EmployeeID
  left join core_functions fun on g.EmpFunction=fun.id
  left join core_verticals ver on g.EmpVertical=ver.id
  left join core_departments dept on g.DepartmentId=dept.id
  left join core_sub_department_master subdept on g.SubDepartmentId=subdept.id
  left join core_section sec on g.EmpSection=sec.id
  left join core_designation desig on g.DesigId=desig.id
  left join core_grades gr on g.GradeId=gr.id
  left join core_states st on g.CostCenter=st.id
  left join core_city_village_by_state vlg on g.HqId=vlg.id 
  left join core_business_unit Bu on g.BUId=Bu.id
  left join core_zones Zn on g.ZoneId=Zn.id
  left join core_regions Rg on g.RegionId=Rg.id
  left join core_territory Tr on g.TerrId=Tr.id 
  WHERE ".$QSts." AND ".$Qdept." AND e.CompanyId=".$CompanyId." order by e.ECode ASC";
  //echo $qry;
  $sql = mysql_query($qry,$con); 
  $no=1; 
  while($res = mysql_fetch_assoc($sql))
  { 
  ?>
  <tr>
	<td class="tdc"><?=$res['EmpCode']?></td>
	<td class="tdl"><?=$res['Name']?></td>
	<td class="tdl"><?=$res['function_name']?></td>
	<td class="tdl"><?=$res['vertical_name']?></td>
    <td class="tdl"><?=$res['department_name']?></td>
	<td class="tdl"><?=$res['sub_department_name']?></td>
	<td class="tdl"><?=$res['section_name']?></td>
	<td class="tdl"><?=$res['designation_name']?></td>
	<td class="tdc"><?=$res['grade_name']?></td>
	<td class="tdc"><?=date("d-m-Y",strtotime($res['DateJoining']))?></td>
	<td class="tdl"><?=$res['state_name']?></td>
	<td class="tdl"><?=$res['business_unit_name']?></td>
	<td class="tdl"><?=$res['zone_name']?></td>
	<td class="tdl"><?=$res['region_name']?></td>
	<?php if($res['TerrId']>0){$Hq=$res['territory_name'];}else{$Hq=$res['city_village_name']; } ?>
	<td class="tdl"><?=$Hq?></td>
	<td class="tdl"><?=$res['MobileNo_Vnr']?></td>
	<td class="tdl"><?=$res['EmailId_Vnr']?></td>
  </tr>
  <?php
   $no++; } //while
  } //if($_REQUEST['dept']!='') ?>

</table>
<?php //************************************************************************************?>
<?php //***************END*****END*****END******END******END*********************************?>
<?php //**************************************************************************************?>  
	 <?php } //if( $_SESSION['login'] = true)?>
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