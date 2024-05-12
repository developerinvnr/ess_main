<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
require_once('AdminMenuSession.php');
date_default_timezone_set('asia/calcutta');

if(isset($_POST['submitform']))
{ //echo 'aa='.$_POST['norr']; die();
 for($i=1; $i<=$_POST['nor']; $i++)
 { 
  
  if($_POST['EI_'.$i]>0)
  {
  
  $sql=mysql_query("update hrm_employee set TimeApply='".$_POST['TimeApply_'.$i]."', Shift=".$_POST['Shift_'.$i].", InTime='".date($_POST['Inh_'.$i].":".$_POST['Inm_'.$i].":00")."', OutTime='".date($_POST['Outh_'.$i].":".$_POST['Outm_'.$i].":00")."' where EmployeeID=".$_POST['EI_'.$i],$con); 
  
  
  if($sql AND $_POST['TimeApply_'.$i]=='Y')
   {
     $sck=mysql_query("select * from hrm_employee_attendance_settime where EmployeeID=".$_POST['EI_'.$i],$con);
	 $rowsck=mysql_num_rows($sck);
	 if($rowsck==0)
	 {
	     
	  $sqlIn=mysql_query("insert into hrm_employee_attendance_settime(EmployeeID, S1, I1, O1, S2, I2, O2, S3, I3, O3, S4, I4, O4, S5, I5, O5, S6, I6, O6, S7, I7, O7, S8, I8, O8, S9, I9, O9, S10, I10, O10, S11, I11, O11, S12, I12, O12, S13, I13, O13, S14, I14, O14, S15, I15, O15, S16, I16, O16, S17, I17, O17, S18, I18, O18, S19, I19, O19, S20, I20, O20, S21, I21, O21, S22, I22, O22, S23, I23, O23, S24, I24, O24, S25, I25, O25, S26, I26, O26, S27, I27, O27, S28, I28, O28, S29, I29, O29, S30, I30, O30, S31, I31, O31) value(".$_POST['EI_'.$i].", ".$_POST['Shift_'.$i].", '".date($_POST['Inh_'.$i].":".$_POST['Inm_'.$i].":00")."', '".date($_POST['Outh_'.$i].":".$_POST['Outm_'.$i].":00")."', ".$_POST['Shift_'.$i].", '".date($_POST['Inh_'.$i].":".$_POST['Inm_'.$i].":00")."', '".date($_POST['Outh_'.$i].":".$_POST['Outm_'.$i].":00")."', ".$_POST['Shift_'.$i].", '".date($_POST['Inh_'.$i].":".$_POST['Inm_'.$i].":00")."', '".date($_POST['Outh_'.$i].":".$_POST['Outm_'.$i].":00")."', ".$_POST['Shift_'.$i].", '".date($_POST['Inh_'.$i].":".$_POST['Inm_'.$i].":00")."', '".date($_POST['Outh_'.$i].":".$_POST['Outm_'.$i].":00")."', ".$_POST['Shift_'.$i].", '".date($_POST['Inh_'.$i].":".$_POST['Inm_'.$i].":00")."', '".date($_POST['Outh_'.$i].":".$_POST['Outm_'.$i].":00")."', ".$_POST['Shift_'.$i].", '".date($_POST['Inh_'.$i].":".$_POST['Inm_'.$i].":00")."', '".date($_POST['Outh_'.$i].":".$_POST['Outm_'.$i].":00")."', ".$_POST['Shift_'.$i].", '".date($_POST['Inh_'.$i].":".$_POST['Inm_'.$i].":00")."', '".date($_POST['Outh_'.$i].":".$_POST['Outm_'.$i].":00")."', ".$_POST['Shift_'.$i].", '".date($_POST['Inh_'.$i].":".$_POST['Inm_'.$i].":00")."', '".date($_POST['Outh_'.$i].":".$_POST['Outm_'.$i].":00")."', ".$_POST['Shift_'.$i].", '".date($_POST['Inh_'.$i].":".$_POST['Inm_'.$i].":00")."', '".date($_POST['Outh_'.$i].":".$_POST['Outm_'.$i].":00")."', ".$_POST['Shift_'.$i].", '".date($_POST['Inh_'.$i].":".$_POST['Inm_'.$i].":00")."', '".date($_POST['Outh_'.$i].":".$_POST['Outm_'.$i].":00")."', ".$_POST['Shift_'.$i].", '".date($_POST['Inh_'.$i].":".$_POST['Inm_'.$i].":00")."', '".date($_POST['Outh_'.$i].":".$_POST['Outm_'.$i].":00")."', ".$_POST['Shift_'.$i].", '".date($_POST['Inh_'.$i].":".$_POST['Inm_'.$i].":00")."', '".date($_POST['Outh_'.$i].":".$_POST['Outm_'.$i].":00")."', ".$_POST['Shift_'.$i].", '".date($_POST['Inh_'.$i].":".$_POST['Inm_'.$i].":00")."', '".date($_POST['Outh_'.$i].":".$_POST['Outm_'.$i].":00")."', ".$_POST['Shift_'.$i].", '".date($_POST['Inh_'.$i].":".$_POST['Inm_'.$i].":00")."', '".date($_POST['Outh_'.$i].":".$_POST['Outm_'.$i].":00")."', ".$_POST['Shift_'.$i].", '".date($_POST['Inh_'.$i].":".$_POST['Inm_'.$i].":00")."', '".date($_POST['Outh_'.$i].":".$_POST['Outm_'.$i].":00")."', ".$_POST['Shift_'.$i].", '".date($_POST['Inh_'.$i].":".$_POST['Inm_'.$i].":00")."', '".date($_POST['Outh_'.$i].":".$_POST['Outm_'.$i].":00")."', ".$_POST['Shift_'.$i].", '".date($_POST['Inh_'.$i].":".$_POST['Inm_'.$i].":00")."', '".date($_POST['Outh_'.$i].":".$_POST['Outm_'.$i].":00")."', ".$_POST['Shift_'.$i].", '".date($_POST['Inh_'.$i].":".$_POST['Inm_'.$i].":00")."', '".date($_POST['Outh_'.$i].":".$_POST['Outm_'.$i].":00")."', ".$_POST['Shift_'.$i].", '".date($_POST['Inh_'.$i].":".$_POST['Inm_'.$i].":00")."', '".date($_POST['Outh_'.$i].":".$_POST['Outm_'.$i].":00")."', ".$_POST['Shift_'.$i].", '".date($_POST['Inh_'.$i].":".$_POST['Inm_'.$i].":00")."', '".date($_POST['Outh_'.$i].":".$_POST['Outm_'.$i].":00")."', ".$_POST['Shift_'.$i].", '".date($_POST['Inh_'.$i].":".$_POST['Inm_'.$i].":00")."', '".date($_POST['Outh_'.$i].":".$_POST['Outm_'.$i].":00")."', ".$_POST['Shift_'.$i].", '".date($_POST['Inh_'.$i].":".$_POST['Inm_'.$i].":00")."', '".date($_POST['Outh_'.$i].":".$_POST['Outm_'.$i].":00")."', ".$_POST['Shift_'.$i].", '".date($_POST['Inh_'.$i].":".$_POST['Inm_'.$i].":00")."', '".date($_POST['Outh_'.$i].":".$_POST['Outm_'.$i].":00")."', ".$_POST['Shift_'.$i].", '".date($_POST['Inh_'.$i].":".$_POST['Inm_'.$i].":00")."', '".date($_POST['Outh_'.$i].":".$_POST['Outm_'.$i].":00")."', ".$_POST['Shift_'.$i].", '".date($_POST['Inh_'.$i].":".$_POST['Inm_'.$i].":00")."', '".date($_POST['Outh_'.$i].":".$_POST['Outm_'.$i].":00")."', ".$_POST['Shift_'.$i].", '".date($_POST['Inh_'.$i].":".$_POST['Inm_'.$i].":00")."', '".date($_POST['Outh_'.$i].":".$_POST['Outm_'.$i].":00")."', ".$_POST['Shift_'.$i].", '".date($_POST['Inh_'.$i].":".$_POST['Inm_'.$i].":00")."', '".date($_POST['Outh_'.$i].":".$_POST['Outm_'.$i].":00")."', ".$_POST['Shift_'.$i].", '".date($_POST['Inh_'.$i].":".$_POST['Inm_'.$i].":00")."', '".date($_POST['Outh_'.$i].":".$_POST['Outm_'.$i].":00")."', ".$_POST['Shift_'.$i].", '".date($_POST['Inh_'.$i].":".$_POST['Inm_'.$i].":00")."', '".date($_POST['Outh_'.$i].":".$_POST['Outm_'.$i].":00")."', ".$_POST['Shift_'.$i].", '".date($_POST['Inh_'.$i].":".$_POST['Inm_'.$i].":00")."', '".date($_POST['Outh_'.$i].":".$_POST['Outm_'.$i].":00")."', ".$_POST['Shift_'.$i].", '".date($_POST['Inh_'.$i].":".$_POST['Inm_'.$i].":00")."', '".date($_POST['Outh_'.$i].":".$_POST['Outm_'.$i].":00")."')",$con);
	 }
   }
   
  } //if($_POST['EI_'.$i]>0)
  
 }
  
}

?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style>
.htf{font-family:Times New Roman;;color:#000;font-weight:bold;text-align:center;font-size:18px;height:24px;}
.htf2{font-family:Times New Roman;;color:#000;font-weight:bold;text-align:center;font-size:12px;}
.tdf{ background-color:#FFFFFF;font-family:Times New Roman;font-size:12px;color:#000000;}
.tdft{ background-color:#FFFF9D;font-family:Times New Roman;font-size:14px;color:#000000;}
.tdf2{background-color:#FFFFC4;font-family:Times New Roman;;font-size:14px;text-align:center;}
.inner_table{height:450px;overflow-y:auto;width:auto;}
</style>
<script src="js/jquery-1.9.1.js"></script>
<script type="text/javascript" src="js/jquery.freezeheader.js"></script>
<script type="text/javascript" language="javascript">	
$(document).ready(function () { $("#table1").freezeHeader({ 'height': '450px' }); })							  
function SelectMD(value)
{ 
    var ec=document.getElementById("ec").value; var ec2=document.getElementById("ec2").value;
    var x = 'EmpSetTime.php?d=aed&Y=y&da=a&yy=4&%rer&uu=true&D='+value+'&rr=false&ec='+ec+'&ec2='+ec2; window.location=x; 
    
}    
</script> 
</head>
<body class="body">
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
	  <td valign="top" align="center" id="MainWindow">
<?php //***********************************************************************************************?>
<?php //**************START*****START*****START******START******START********************************?>
<?php //****************************************************************************************?>
<table border="0" style="margin-top:0px; width:100%; height:350px;">
 <tr>
  <td align="left" height="20" style="width:100%;" valign="top" colspan="3">
   <table border="0" style="width:100%;">
    <tr>
	  <td><font color="#2D002D" style='font-family:Times New Roman;' size="4">
	  <b>Set Employee Office In/Out Time (24 Hour Format):</b></font>&nbsp;&nbsp;</td>
	   <td class="td1" style="font-size:11px; width:150px;">			   
	   <select style="font-size:12px;width:120px;" name="dept" id="dept" onChange="SelectMD(this.value)">
<?php if($_REQUEST['D']!='All') { $sqlD=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$_REQUEST['D'], $con); $resD=mysql_fetch_assoc($sqlD); ?>
<option value="<?php echo $_REQUEST['D']; ?>"><?php if($_REQUEST['D']==0){echo 'Select';}else{echo $resD['DepartmentCode']; } ?></option>  
<?php }else{ ?><option value="All">&nbsp;All</option><?php } ?>						   
<?php $SqlD=mysql_query("select * from hrm_department where CompanyId=".$CompanyId." AND DeptStatus='A' order by DepartmentName ASC", $con); while($ResD=mysql_fetch_array($SqlD)){ ?><option value="<?php echo $ResD['DepartmentId']; ?>"><?php echo $ResD['DepartmentCode'];?></option><?php } ?><option value="All">All</option>
       </select>
	   <input type="hidden" name="da" id="da" value="<?php echo $_REQUEST['D']; ?>" />
	  </td>
	  
	  <td>
	   <font color="#2D002D" style='font-family:Times New Roman; font-size:15px;'>
	   Code Start From : <input type="text" style="width:50px;" name="ec" id="ec" value="<?php echo $_REQUEST['ec']; ?>" />
	   &nbsp;To : <input type="text" style="width:50px;" name="ec2" id="ec2" value="<?php echo $_REQUEST['ec2']; ?>" />
	   </font>
	  </td>
	  
	  <td class="td1"><font color="#2D002D" style='font-family:Times New Roman;' size="4"><b>Gn:</b>General,&nbsp;&nbsp;<b>Mo:</b>Morning,&nbsp;&nbsp;<b>Af:</b>Afternoon,&nbsp;&nbsp;<b>Ng:</b>Night</font></td>	 
	</tr>
   </table>
  </td>
 </tr>
<?php if(($_SESSION['UserType']=='M' OR $_SESSION['UserType']=='S' OR $_SESSION['UserType']=='A' OR $_SESSION['UserType']=='U') AND $_SESSION['login'] = true) { ?>	
 <tr>
  <td valign="top" style="width:100%;">
   <table border="1" id="table1" valign="top" style="width:100%;" cellspacing="1">
   <div class="thead">
   <thead>
<tr bgcolor="#7a6189">
 <td rowspan="2" align="center" class="tdf2" style="width:50px;"><b>SN</b></td>
 <td rowspan="2" align="center" class="tdf2" style="width:50px;"><b>EC</b></td>
 <td rowspan="2" align="center" class="tdf2" style="width:250px;"><b>Name</b></td>
 <td rowspan="2" align="center" class="tdf2" style="width:100px;"><b>Department</b></td>
 <td rowspan="2" align="center" class="tdf2" style="width:100px;"><b>Location</b></td>	
 <td rowspan="2" align="center" class="tdf2" style="width:50px;"><b>Allow</b></td>
 <td rowspan="2" align="center" class="tdf2" style="width:50px;"><b>Shift</b></td>
 <td colspan="2" align="center" class="tdf2" style="width:100px;"><b>In</b></td>
 <td colspan="2" align="center" class="tdf2" style="width:100px;"><b>Out</b></td>
 <td rowspan="2" align="center" class="tdf2" style="width:50px;"><b>Set Month</b></td>
</tr>
<tr bgcolor="#7a6189">
 <td align="center" class="tdf2" style="width:50px;"><b>Hour</b></td>
 <td align="center" class="tdf2" style="width:50px;"><b>Min</b></td>	
 <td align="center" class="tdf2" style="width:50px;"><b>Hour</b></td>
 <td align="center" class="tdf2" style="width:50px;"><b>Min</b></td>
</tr>
 </thead>
 </div>
<?php if($_REQUEST['D']!='All'){ $sql=mysql_query("select e.EmployeeID,EmpCode,Fname,Sname,Lname,Shift,TimeApply,InTime,OutTime,DepartmentCode,HqName from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_department d ON g.DepartmentId=d.DepartmentId INNER JOIN hrm_headquater h ON g.HqId=h.hqId where e.EmpStatus='A' AND e.EmpCode>=".$_REQUEST['ec']." AND e.EmpCode<=".$_REQUEST['ec2']." AND g.DepartmentId=".$_REQUEST['D']." AND e.CompanyId=".$CompanyId." order by e.EmpCode ASC", $con); }
      if($_REQUEST['D']=='All'){ $sql=mysql_query("select e.EmployeeID,EmpCode,Fname,Sname,Lname,Shift,TimeApply,InTime,OutTime,DepartmentCode,HqName from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_department d ON g.DepartmentId=d.DepartmentId INNER JOIN hrm_headquater h ON g.HqId=h.hqId where e.EmpStatus='A' AND e.EmpCode>=".$_REQUEST['ec']." AND e.EmpCode<=".$_REQUEST['ec2']." AND e.CompanyId=".$CompanyId." order by e.EmpCode ASC", $con); } $Sno=1; $rows=mysql_num_rows($sql); ?>
      
<form name="formEdit" method="post" onSubmit="return OvalidateEdit(this)">	  
<input type="hidden" name="norr" id="norr" value="0" />

	 <?php $sn=1; while($res=mysql_fetch_array($sql)){ ?>
 <div class="tbody">
  <tbody>	
<tr bgcolor="#FFFFFF">
 <td class="tdf" align="center"><?php echo $sn; ?></td>
 <td class="tdf" align="center"><?php echo $res['EmpCode']; ?>
 <input type="hidden" name="EI_<?php echo $sn; ?>" value="<?php echo $res['EmployeeID']; ?>" /></td>
 <td class="tdf"><input class="tdf" style="width:250px;border:hidden;" value="<?php echo $res['Fname'].' '.$res['Sname'].' '.$res['Lname']; ?>" readonly/></td>
 <td class="tdf"><input class="tdf" style="width:100px;border:hidden;" value="<?php echo $res['DepartmentCode']; ?>" readonly/></td>
 <td class="tdf"><input class="tdf" style="width:100px;border:hidden;" value="<?php echo $res['HqName']; ?>" readonly/></td>
 <td class="tdf"><select name="TimeApply_<?php echo $sn; ?>" style="width:50px;border:hidden; background-color:<?php if($res['TimeApply']=='Y'){echo '#ADFF5B';}else{echo '#FFF';}?>" class="tdf"><option value="<?php echo $res['TimeApply']; ?>"><?php echo $res['TimeApply']; ?></option><option value="<?php if($res['TimeApply']=='Y'){echo 'N';}else{echo 'Y';}?>"><?php if($res['TimeApply']=='Y'){echo 'N';}else{echo 'Y';} ?></option></select></td>
 
 <td class="tdf" align="center"><select name="Shift_<?php echo $sn; ?>" style="width:45px;height:22px;"><option value="<?php echo $res['Shift']; ?>"><?php if($res['TimeApply']=='Y'){ if($res['Shift']==0){echo '';}elseif($res['Shift']==1){echo 'Gn';}elseif($res['Shift']==2){echo 'Mo';}elseif($res['Shift']==3){echo 'Af';}elseif($res['Shift']==4){echo 'Ng';}}else{echo '';} ?></option><option value="1">Gn</option><option value="2">Mo</option><option value="3">Af</option><option value="4">Ng</option></select></td>
 
 
 <td class="tdf"><select name="Inh_<?php echo $sn; ?>" style="width:50px;border:hidden;" class="tdf"><option value="<?php echo date("H",strtotime($res['InTime'])); ?>"><?php echo date("H",strtotime($res['InTime'])); ?></option><?php for($i=6;$i<=24;$i++){?><option value="<?php echo sprintf('%02d',$i);?>"><?php echo sprintf('%02d',$i);?></option><?php } ?>
</select></td>
 <td class="tdf"><select name="Inm_<?php echo $sn; ?>" style="width:50px;border:hidden;" class="tdf"><option value="<?php echo date("i",strtotime($res['InTime'])); ?>"><?php echo date("i",strtotime($res['InTime'])); ?></option><?php for($j=0;$j<=60;$j++){?><option value="<?php echo sprintf('%02d',$j);?>"><?php echo sprintf('%02d',$j);?></option><?php } ?></select></td>
 
 <td class="tdf"><select name="Outh_<?php echo $sn; ?>" style="width:50px;border:hidden;" class="tdf"><option value="<?php echo date("H",strtotime($res['OutTime'])); ?>"><?php echo date("H",strtotime($res['OutTime'])); ?></option><?php for($i=6;$i<=24;$i++){?><option value="<?php echo sprintf('%02d',$i);?>"><?php echo sprintf('%02d',$i);?></option><?php } ?></select></td>
 <td class="tdf"><select name="Outm_<?php echo $sn; ?>" style="width:50px;border:hidden;" class="tdf"><option value="<?php echo date("i",strtotime($res['OutTime'])); ?>"><?php echo date("i",strtotime($res['OutTime'])); ?></option><?php for($j=0;$j<=60;$j++){?><option value="<?php echo sprintf('%02d',$j);?>"><?php echo sprintf('%02d',$j);?></option><?php } ?></select></td>
 
<script type="text/javascript" language="javascript">
function FunSetM(ei)
{ var win = window.open("EmpSetmTime.php?D=0&rr=false&ei="+ei,"SmForm","menubar=no,scrollbars=yes,resizable=no,directories=no,width=1000,height=550"); }
</script> 
 <td class="tdf" align="center"><?php if($res['TimeApply']=='Y'){echo '<span style="cursor:pointer;color:#008000;" onClick="FunSetM('.$res['EmployeeID'].')"><u>Click</u></span>';}else{echo '&nbsp;';} ?></td> 
 

</tr>
</tbody>
</div>
<?php $sn++; } $snn=$sn-1; echo '<input type="hidden" name="nor" value="'.$snn.'" />'; ?>

<script type="text/javascript">
CHangeNor(<?=$snn;?>);

function CHangeNor(v)
{
 document.getElementById("norr").value=v;
}
</script>

<tr>
  <td align="right" class="fontButton" style="width:100%;" colspan="14">
<?php if($_SESSION['User_Permission']=='Edit'){?>  
    <table border="0">
     <tr>
	  <td align="left"><input type="button" style="width:90px;display:block;" value="refresh" onClick="javascript:window.location='EmpSetTime.php?d=aed&Y=y&da=a&yy=4&%rer&uu=true&D=<?php echo $_REQUEST['D']; ?>&rr=false'" /></td>
	  <td align="left"><input type="submit" name="submitform" style="width:90px;display:block;" value="submit"/></td>
   </tr>
<?php } ?>   
   </table>
  </td>
 </tr>
</form>
<?php } ?> 
</table>
		
<?php //**********************************************************************************************?>
<?php //******************END*****END*****END******END******END**********************?>
<?php //*************************************************************************************?>
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