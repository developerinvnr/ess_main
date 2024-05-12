<?php session_start();
if($_SESSION['login'] = true){require_once('../AdminUser/config/config.php');}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('../AdminUser/logcheck.php');
if($_SESSION['logCheckEmp']!=$logemp){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('EmpMenuSession.php');}
?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style>.thh{font-family:Times New Roman;font-size:18px;font-weight:bold;}
.th{color:#FFF;font-family:Times New Roman;font-size:12px;font-weight:bold;text-align:center;}
.td{color:#000;font-family:Times New Roman;font-size:12px;text-align:left;}
.tdc{color:#000;font-family:Times New Roman;font-size:12px;text-align:center;}
.tdr{color:#000;font-family:Times New Roman;font-size:12px;text-align:right;}
.input{color:#000;font-family:Times New Roman;font-size:12px;text-align:left;width:100%;}
.inner_table{height:400px;overflow-y:auto;width:auto;}
</style>
<Script type="text/javascript">window.history.forward(1);</Script>
<script src="../AdminUser/js/jquery-1.9.1.js"></script>
<script type="text/javascript" src="../AdminUser/js/jquery.freezeheader.js"></script>
<script type="text/javascript" language="javascript">
function SelectDept(v){ window.location='EmpElig.php?action=DeptElig&value='+v;}

function FunElig(id)
{ window.open("EmpEligElig.php?id="+id,"EForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=800,height=600"); }

$(document).ready(function () { $("#table1").freezeHeader({ 'height': '450px' }); })
</script>
</head>
<body class="body">
<table class="table">
<tr>
 <td>
  <table class="menutable"><tr><td><?php if($_SESSION['login'] = true){ require_once("EMenu.php"); } ?></td></tr></table>
 </td>
</tr>
<tr>
 <td>
  <table width="100%" style="margin-top:0px; ">
    <tr>
	  <td valign="top"><?php if($_SESSION['login'] = true){ require_once("EWelcome.php"); } ?></td>
	</tr>
	<tr><td>&nbsp;</td></tr>
	 <tr>
	  <td valign="top">
	     <table border="0" style="width:100%; height:380px; float:none;" cellpadding="0">
		  <tr><td class="thh">Eligibility: &nbsp;<select style=" font-family:Times New Roman;font-size:12px;width:150px;height:22px;background-color:#DDFFBB;" name="Dept" id="Dept" onChange="SelectDept(this.value)"><option value="" style="margin-left:0px;" selected>Select Department</option><?php $SqlDept=mysql_query("select * from hrm_department where CompanyId=".$CompanyId." AND DepartmentCode!='MANAGEMENT' order by DepartmentName ASC", $con); while($ResDept=mysql_fetch_array($SqlDept)){?>
<option value="<?php echo $ResDept['DepartmentId']; ?>"><?php echo '&nbsp;'.$ResDept['DepartmentCode'];?></option><?php } ?><option value="All">&nbsp;All</option></select>

&nbsp;&nbsp;
<a href="https://www.vnress.in/Employee/EmpEligNext.php?ID=<?=$EmployeeId?>" target="_blank" style="font-size:12px;">Other Team Group</a>

</td>

 

</tr>
		  <tr>
		   <td valign="top" width="110%"> 
<?php if($EmployeeId==29 OR $EmployeeId==352 OR $EmployeeId==169 OR $EmployeeId==142){?>	   
<?php //***************************************************************************** ?>	   
<table border="1" id="table1" width="100%" cellspacing="1">
 <div class="thead">
 <thead>
 <tr bgcolor="#7a6189">
  <?php /*?><td rowspan="4" class="th" style="width:2%;"><b>Sn</b></td><?php */?>
  <td rowspan="4" class="th" style="width:3%;"><b>EC</b></td>
  <td rowspan="4" class="th" style="width:15%;"><b>Name</b></td>
  <td rowspan="4" class="th" style="width:5%;"><b>Dept</b></td>
 <?php /*?> <td rowspan="4" class="th" style="width:5%;"><b>Designation</b></td><?php */?>
  <td rowspan="4" class="th" style="width:3%;"><b>Grade</b></td>
  <td colspan="3" class="th"><b>Category</b></td>
  <td colspan="2" class="th"><b>DA</b></td>
  <td colspan="4" class="th"><b>Travel</b></td>
  <td colspan="10" class="th" style="background-color:#499300;"><b>Four Wheeler</b></td>
  <td colspan="2" class="th"><b>Mobile</b></td>
  <?php /*?><td rowspan="3" class="th" style="width:4%;"><b>Misc Expenses</b></td><?php */?>
  <td rowspan="4" class="th" style="width:4%;"><b>Health Insu</b></td>
  <?php /*?><td rowspan="4" class="th" style="width:10%;"><b>Bonus</b></td>
  <td rowspan="4" class="th" style="width:10%;"><b>Gratuity</b></td><?php */?>
 </tr> 
 <tr bgcolor="#7a6189">
  <td rowspan="3" class="th" style="width:4%;"><b>A</b></td>
  <td rowspan="3" class="th" style="width:4%;"><b>B</b></td>	
  <td rowspan="3" class="th" style="width:4%;"><b>C</b></td>	
  <td rowspan="3" class="th" style="width:5%;"><b>Inside<br/>HQ</b></td>
  <td rowspan="3" class="th" style="width:5%;"><b>Outside<br/>HQ</b></td>
  <?php /*?><td rowspan="3" class="th" style="width:5%;"><b>Outside Hq WNgtH</b></td>
  <td rowspan="3" class="th" style="width:5%;"><b>Outside Hq WtNgtH</b></td><?php */?>
  <td rowspan="3" class="th" style="width:3%;"><b>Two<br/>Wheeler</b></td>
  <td rowspan="3" class="th" style="width:3%;"><b>Four<br/>Wheeler</b></td>
  <td rowspan="3" class="th" style="width:5%;"><b>Mode</b></td>
  <td rowspan="3" class="th" style="width:5%;"><b>Class</b></td>	
  <td rowspan="3" class="th" style="width:3%;background-color:#499300;"><b>Elig</b></td>
  <td rowspan="3" class="th" style="width:5%;background-color:#499300;"><b>Policy<br/>Entry<br/></b></td>
  <td rowspan="3" class="th" style="width:3%;background-color:#499300;"><b>Cost</b></td>
  <td rowspan="3" class="th" style="width:3%;background-color:#499300;"><b>Adv.</b></td>
  <td rowspan="3" class="th" style="width:3%;background-color:#499300;"><b>Less<br/>Km</b></td>
  <td colspan="5" class="th" style="background-color:#499300;"><b>Driver</b></td>
  <td rowspan="3" class="th" style="width:4%;"><b>Exp.<br/>Reim</b></td>
  <td rowspan="3" class="th" style="width:4%;"><b>Hand.<br/>Elig</b></td>		
 </tr>
 <tr bgcolor="#7a6189">
  <td rowspan="2" class="th" style="width:3%;background-color:#499300;" style=""><b>Y/N</b></td>
  <td colspan="2" class="th" style="background-color:#499300;"><b>NewCar</b></td>
  <td colspan="2" class="th" style="background-color:#499300;"><b>OldCar</b></td>
 </tr>
 <tr bgcolor="#7a6189">
  <td class="th" style="width:3%;background-color:#499300;"><b>2/Y</b></td>
  <td class="th" style="width:3%;background-color:#499300;"><b>3-5/Y</b></td>
  <td class="th" style="width:3%;background-color:#499300;"><b>2/Y</b></td>
  <td class="th" style="width:3%;background-color:#499300;"><b>3-5/Y</b></td>
 </tr>
 
 </thead>
 </div>
<?php if($_REQUEST['value']=='All') {$sql=mysql_query("select g.EmployeeID, EmpCode, Fname, Sname, Lname, g.DepartmentId, DepartmentCode, GradeValue, eg.* from hrm_employee_general g INNER JOIN hrm_employee e ON g.EmployeeID=e.EmployeeID INNER JOIN hrm_employee_eligibility eg ON g.EmployeeID=eg.EmployeeID INNER JOIN hrm_department d ON g.DepartmentId=d.DepartmentId INNER JOIN hrm_grade gr ON g.GradeId=gr.GradeId where e.CompanyId=".$CompanyId." AND e.EmpStatus='A' AND eg.Status='A' order by e.EmpCode ASC", $con); }
else {$sql=mysql_query("select EmpCode, Fname, Sname, Lname, g.DepartmentId, DepartmentCode, GradeValue, eg.* from hrm_employee_general g INNER JOIN hrm_employee e ON g.EmployeeID=e.EmployeeID INNER JOIN hrm_employee_eligibility eg ON g.EmployeeID=eg.EmployeeID INNER JOIN hrm_department d ON g.DepartmentId=d.DepartmentId INNER JOIN hrm_grade gr ON g.GradeId=gr.GradeId where g.DepartmentId=".$_REQUEST['value']." AND e.CompanyId=".$CompanyId." AND e.EmpStatus='A' AND eg.Status='A' order by e.EmpCode ASC", $con); } 
$Sno=1; while($res=mysql_fetch_array($sql)){ ?> 
<div class="tbody">
<tbody>
<tr bgcolor="#FFFFFF">
 <?php /*?><td class="tdc"><?php echo $Sno; ?></td><?php */?>
 <td class="tdc"><?php echo $res['EmpCode']; ?></td>
 <td class="td"><a href="#" onClick="FunElig(<?php echo $res['EmployeeID'];?>)"><?php echo $res['Fname'].' '.$res['Sname'].' '.$res['Lname'];?></a></td>
 <td class="tdc"><?php echo strtolower($res['DepartmentCode']); ?></td>
 <?php /*?><td class="td"><?php echo $res['DesigName']; ?></td><?php */?>
 <td class="tdc"><?php echo $res['GradeValue']; ?></td>
 <td class="tdc"><?php echo $res['Lodging_CategoryA']; ?></td>
 <td class="tdc"><?php echo $res['Lodging_CategoryB']; ?></td>	
 <td class="tdc"><?php echo $res['Lodging_CategoryC']; ?></td>	
 <td class="tdc"><?php echo $res['DA_Inside_Hq']; ?></td>
 <td class="tdc"><?php echo $res['DA_Outside_Hq']; ?></td>
 <?php /*?><td class="tdc"><?php echo $res['DA_Outside_HqWithNightH']; ?></td>
 <td class="tdc"><?php echo $res['DA_Outside_HqWithOutNightH']; ?></td><?php */?>
 <td class="tdc"><?php echo $res['Travel_TwoWeeKM']; ?></td>
 <td class="tdc"><?php echo $res['Travel_FourWeeKM']; ?></td>
 <td class="tdc"><?php if($res['Mode_Travel_Outside_Hq']=='Flight(Approval based)/Train'){echo 'Flight/AB<br>Train';}elseif($res['Mode_Travel_Outside_Hq']=='Flight/Train'){echo 'Flight<br>Train';}else{echo $res['Mode_Travel_Outside_Hq'];} ?></td>
 <td class="tdc"><?php if($res['TravelClass_Outside_Hq']=='Economy/AC-II'){echo 'Economy<br>AC-II';}elseif($res['TravelClass_Outside_Hq']=='Economy/AC'){echo 'Economy<br>AC';}else{echo $res['TravelClass_Outside_Hq'];} ?></td>
 
 
 <td class="tdc" style="background-color:#CAFF95;"><?php if($res['FourWElig']=='Y'){echo $res['FourWElig'];} ?></td>
 <td class="tdc" style="background-color:#CAFF95;"><?php if($res['DateOfEntryPolicy']!='1970-01-01' AND $res['DateOfEntryPolicy']!='0000-00-00')echo date("d-My",strtotime($res['DateOfEntryPolicy'])); ?></td>
 
 
 
 <td class="tdc" style="background-color:#CAFF95;"><?php echo $res['CostOfVehicle']; ?></td>
 
 <td class="tdc" style="background-color:#CAFF95;"><?php if($res['AdvanceCom']=='Y'){echo $res['AdvanceCom'];} ?></td>
 <td class="tdc" style="background-color:#CAFF95;"><?php if($res['LessKm']=='Y'){echo $res['LessKm'];} ?></td>
 <td class="tdc" style="background-color:#CAFF95;"><?php if($res['FourWElig']=='Y'){echo $res['WithDriver'];} ?></td>	
 
 <?php 
 $y2d=date('Y-m-d', strtotime("+24 months", strtotime($res['DateOfEntryPolicy'])));
 $y5d=date('Y-m-d', strtotime("+60 months", strtotime($res['DateOfEntryPolicy'])));
 
 if($res['FourWElig']=='Y' AND ($res['DepartmentId']==6 OR $res['DepartmentId']==4)){ 
 $sqlTE=mysql_query("select * from hrm_vehiclepolicy where CompanyId=".$CompanyId." AND GradeValue='".$res['GradeValue']."'", $con); $rTE=mysql_fetch_array($sqlTE); ?>
 <td class="tdc" style="background-color:<?php if(date("Y")<=$y2d){echo '#FFB9FF';}else{echo '#CAFF95';} ?>;"><?php 
 if($res['DepartmentId']==6 AND $res['FourWElig']=='Y')
 { 
  if($res['WithDriver']=='Y'){echo $rTE['nWDr_2ySal'];}else{echo $rTE['nWtDr_2ySal'];} 
 }
 elseif($res['DepartmentId']==4 AND $res['FourWElig']=='Y')
 { 
  if($res['WithDriver']=='Y'){echo $rTE['nWDr_2yPrd'];}else{echo $rTE['nWtDr_2yPrd'];} 
 } ?>
 </td>
 
 <td class="tdc" style="background-color:<?php if(date("Y")>$y2d AND date("Y")<$y5d){echo '#FFB9FF';}else{echo '#CAFF95';} ?>;"><?php 
 if($res['DepartmentId']==6 AND $res['FourWElig']=='Y')
 { 
  if($res['WithDriver']=='Y'){echo $rTE['nWDr_35ySal'];}else{echo $rTE['nWtDr_35ySal'];} 
 }
 elseif($res['DepartmentId']==4 AND $res['FourWElig']=='Y')
 { 
  if($res['WithDriver']=='Y'){echo $rTE['nWDr_35yPrd'];}else{echo $rTE['nWtDr_35yPrd'];} 
 } ?>
 </td>
 <td class="tdc" style="background-color:<?php if(date("Y")<=$y2d){echo '#FFB9FF';}else{echo '#CAFF95';} ?>;"><?php 
 if($res['DepartmentId']==6 AND $res['FourWElig']=='Y')
 { 
  if($res['WithDriver']=='Y'){echo $rTE['oWDr_2ySal'];}else{echo $rTE['oWtDr_2ySal'];} 
 }
 elseif($res['DepartmentId']==4 AND $res['FourWElig']=='Y')
 { 
  if($res['WithDriver']=='Y'){echo $rTE['oWDr_2yPrd'];}else{echo $rTE['oWtDr_2yPrd'];} 
 } ?>
 </td>
 
 <td class="tdc" style="background-color:<?php if(date("Y")>$y2d AND date("Y")<$y5d){echo '#FFB9FF';}else{echo '#CAFF95';} ?>;"><?php 
 if($res['DepartmentId']==6 AND $res['FourWElig']=='Y')
 { 
  if($res['WithDriver']=='Y'){echo $rTE['oWDr_35ySal'];}else{echo $rTE['oWtDr_35ySal'];} 
 }
 elseif($res['DepartmentId']==4 AND $res['FourWElig']=='Y')
 { 
  if($res['WithDriver']=='Y'){echo $rTE['oWDr_35yPrd'];}else{echo $rTE['oWtDr_35yPrd'];} 
 } ?>
 </td>
 
 
 <?php }else{ ?>
 <td class="tdc" style="background-color:#CAFF95;"><?php echo ''; ?></td>
 <td class="tdc" style="background-color:#CAFF95;"><?php echo ''; ?></td>
 <td class="tdc" style="background-color:#CAFF95;"><?php echo ''; ?></td>
 <td class="tdc" style="background-color:#CAFF95;"><?php echo ''; ?></td>
 <?php } ?>
 
 <td class="tdc"><?php echo $res['Mobile_Exp_Rem_Rs']; ?></td>
 <td class="tdc"><?php echo $res['Mobile_Hand_Elig_Rs']; ?></td>	
 
 <?php /*?><td class="tdc"><?php echo $res['Misc_Expenses']; ?></td><?php */?>
 <td class="tdc"><?php if($res['Health_Insurance']=='100000'){echo '1 Lakh';}elseif($res['Health_Insurance']=='200000'){echo '2 Lakh';}elseif($res['Health_Insurance']=='300000'){echo '3 Lakh';}elseif($res['Health_Insurance']=='400000'){echo '4 Lakh';}elseif($res['Health_Insurance']=='500000'){echo '5 Lakh';}else{echo intval($res['Health_Insurance']);} ?></td>
 <?php /*?><td class="td"><?php echo 'As per law'; ?></td>
 <td class="td"><?php echo 'As per law'; ?></td><?php */?>
</tr>
</tbody>
</div>
 <?php $Sno++; } ?> 
</table>
			
<?php //***************************************************************************** ?>
<?php } ?>
		   </td>
		    <td valign="top">
		    <table align="right" border="0" style="margin-top:0px; width:10%; height:380px;">
		    <tr><td align="center" valign="top" width="100">&nbsp;</td></tr>
	        </table>
		   </td>
		    <td valign="top">
		    <table align="right" border="0" style="margin-top:0px; width:10%; height:380px;"><tr><td align="center" valign="top">&nbsp;&nbsp;</td></tr></table>
		   </td>
		  </tr>
		</table>
	  </td>
	</tr>
  </table>
 </td>
</tr>
</table>
</body>
</html>