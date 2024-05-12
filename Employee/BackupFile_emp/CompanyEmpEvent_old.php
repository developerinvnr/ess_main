<?php require_once('../AdminUser/config/config.php'); ?>
<html>
<title><?php if($_REQUEST['v']=='C'){echo 'Corporate Anniversary';}elseif($_REQUEST['v']=='M'){echo 'Marriage Anniversary';}elseif($_REQUEST['v']=='B'){echo 'Birthday';} ?></title>
<head>
<style type="text/css">
.s60{width:60px;font-family:Geneva, Arial, Helvetica, sans-serif;font-size:12px;}
.s70{width:70px;font-family:Geneva, Arial, Helvetica, sans-serif;font-size:12px;}.s80{width:80px;font-family:Geneva, Arial, Helvetica, sans-serif;font-size:12px;}
.s100{width:100px;font-family:Geneva, Arial, Helvetica, sans-serif;font-size:12px;}.s150{width:150px;font-family:Geneva, Arial, Helvetica, sans-serif;font-size:12px;}
.s200{width:200px;font-family:Geneva, Arial, Helvetica, sans-serif;font-size:12px;}.s300{width:300px;font-family:Geneva, Arial, Helvetica, sans-serif;font-size:12px;}
</style>
<body bgcolor="#E0DBE3" background="images/anniback.jpg">
<center>	
<table border="0">
<tr>
<?php /******************************************************* Corporate Anniversary ****************************************************************************/ ?>
<td style="width:950px;display:<?php if($_REQUEST['v']=='C'){echo 'block';} else{echo 'none';} ?>;" />
<?php $Y=date("Y");
 if(date("m")==01 OR date("m")==03 OR date("m")==05 OR date("m")==07 OR date("m")==08 OR date("m")==10 OR date("m")==12){$day=31;}
 elseif(date("m")==02){if($Y==2012 OR $Y==2016 OR $Y==2020 OR $Y==2024 OR $Y==2028 OR $Y==2032 OR $Y==2036 OR $Y==2040) { $day=29; } else { $day=28;} }
 elseif(date("m")==04 OR date("m")==06 OR date("m")==09 OR date("m")==11){$day=30;}
 $Be_7D_1 = date("Y-m-01",strtotime('-2555 day'));  $Be_7D_2 = date("Y-m-31".$day,strtotime('-2555 day'));
 $Be_5D_1 = date("Y-m-01",strtotime('-1825 day')); $Be_5D_2 = date("Y-m-31".$day,strtotime('-1825 day'));
 $Be_3D_1 = date("Y-m-01",strtotime('-1095 day')); $Be_3D_2 = date("Y-m-31".$day,strtotime('-1095 day'));
 $Be_1D_1 = date("Y-m-01",strtotime('-365 day')); $Be_1D_2 = date("Y-m-31".$day,strtotime('-365 day'));
 
 $S7=mysql_query("select hrm_employee.EmployeeID,Fname,Sname,Lname,Gender,DepartmentId,DesigId,HqId,Married,DateJoining,DR from hrm_employee INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee_general.DateJoining>='".$Be_7D_1."' AND hrm_employee_general.DateJoining<='".$Be_7D_2."' AND hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$_REQUEST['c']." AND hrm_employee_general.DepartmentId!=17 AND hrm_employee_general.DepartmentId!=18 AND hrm_employee_general.DepartmentId!=23 order by DateJoining ASC", $con); 
 $S5=mysql_query("select hrm_employee.EmployeeID,Fname,Sname,Lname,Gender,DepartmentId,DesigId,HqId,Married,DateJoining,DR from hrm_employee INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee_general.DateJoining>='".$Be_5D_1."' AND hrm_employee_general.DateJoining<='".$Be_5D_2."' AND hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$_REQUEST['c']." AND hrm_employee_general.DepartmentId!=17 AND hrm_employee_general.DepartmentId!=18 AND hrm_employee_general.DepartmentId!=23 order by DateJoining ASC", $con); 
 $S3=mysql_query("select hrm_employee.EmployeeID,Fname,Sname,Lname,Gender,DepartmentId,DesigId,HqId,Married,DateJoining,DR from hrm_employee INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee_general.DateJoining>='".$Be_3D_1."' AND hrm_employee_general.DateJoining<='".$Be_3D_2."' AND hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$_REQUEST['c']." AND hrm_employee_general.DepartmentId!=17 AND hrm_employee_general.DepartmentId!=18 AND hrm_employee_general.DepartmentId!=23 order by DateJoining ASC", $con); 
 $S1=mysql_query("select hrm_employee.EmployeeID,Fname,Sname,Lname,Gender,DepartmentId,DesigId,HqId,Married,DateJoining,DR from hrm_employee INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee_general.DateJoining>='".$Be_1D_1."' AND hrm_employee_general.DateJoining<='".$Be_1D_2."' AND hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$_REQUEST['c']." AND hrm_employee_general.DepartmentId!=17 AND hrm_employee_general.DepartmentId!=18 AND hrm_employee_general.DepartmentId!=23 order by DateJoining ASC", $con); 
 //$Ro2=mysql_num_rows($S2);  $Ro4=mysql_num_rows($S4); $Ro6=mysql_num_rows($S6);  $Ro8=mysql_num_rows($S8); $Ro9=mysql_num_rows($S9); 
 $Ro1=mysql_num_rows($S1); $Ro3=mysql_num_rows($S3); $Ro5=mysql_num_rows($S5); $Ro7=mysql_num_rows($S7);?>	
 
<table border="1" bgcolor="">
  <tr>
   <td bgcolor="#005500" colspan="2" align="center" style="font-family:Times New Roman;font-size:16px;color:#FFFFFF;"><b>* Corporate Anniversary *</b></td>
  </tr>
  <tr bgcolor="#7a6189">
	<td align="center" style="color:#FFFFFF;width:70px;"><b>Years</b></td>
	<td style="width:880px;">
     <table border="0">
	  <tr>
	   <td align="center" style="color:#FFFFFF;width:80px;"><b>Date</b></td>
	   <td align="center" style="color:#FFFFFF;width:300px;"><b>Name</b></td>
	   <td align="center" style="color:#FFFFFF;width:100px;">&nbsp;&nbsp;<b>Department</b></td>
	   <td align="center" style="color:#FFFFFF;width:200px;"><b>Designation</b></td>
	   <td align="center" style="color:#FFFFFF;width:150px;"><b>HeadQuater</b></td>
	 </tr>
	</table>
   </td>	
 </tr>
 <tr bgcolor="#FFFFFF">
  <td align="center" class="s70" bgcolor="#005500"><img src="../images/Shield/7.png" style="width:60px;height:60px;" border="0"></td>
  <td style="width:880px;">
   <table border="1">
<?php while($RS7=mysql_fetch_array($S7)) { 
$srelv7=mysql_query("select HR_Approved,HR_RelievingDate from hrm_employee_separation where Rep_Approved!='C' AND Hod_Approved!='C' AND HR_Approved!='C' AND EmployeeID=".$RS7['EmployeeID'], $con); 
$rowrelv7=mysql_num_rows($srelv7); $resrelv7=mysql_fetch_assoc($srelv7);
if($rowrelv7==0 OR ($rowrelv7>0 AND $resrelv7['HR_Approved']=='N') OR ($rowrelv7>0 AND $resrelv7['HR_Approved']=='Y' AND date("Y-m-d")<$resrelv7['HR_RelievingDate'])){

if($RS7['DR']=='Y'){$M='Dr.';}elseif($RS7['Gender']=='M'){$M='Mr.';} elseif($RS7['Gender']=='F' AND $RS7['Married']=='Y'){$M='Mrs.';} elseif($RS7['Gender']=='F' AND $RS7['Married']=='N'){$M='Miss.';} $EmpName=$M.' '.$RS7['Fname'].' '.$RS7['Sname'].' '.$RS7['Lname']; 
		  $sqlDept=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$RS7['DepartmentId'], $con); $resDept=mysql_fetch_assoc($sqlDept); 
		  $sqlDesig=mysql_query("select DesigName from hrm_designation where DesigId=".$RS7['DesigId'], $con); $resDesig=mysql_fetch_assoc($sqlDesig);
		  $sqlHq=mysql_query("select HqName from hrm_headquater where HqId=".$RS7['HqId'], $con); $resHq=mysql_fetch_assoc($sqlHq);?>    
   <tr>
    <td align="center" class="s80" valign="top"><b><?php echo date("d-M-y",strtotime($RS7['DateJoining'])); ?></b></td>
    <td class="s300" valign="top">&nbsp;<?php echo $EmpName; ?></td>
    <td class="s100" valign="top">&nbsp;<?php echo $resDept['DepartmentCode']; ?></td>
    <td class="s200" valign="top">&nbsp;<?php echo $resDesig['DesigName']; ?></td>
    <td class="s150" valign="top">&nbsp;<?php echo $resHq['HqName']; ?></td>
   </tr>
<?php } } ?>   
   </table>
  </td>
 </tr>
 <tr><td colspan="2" style="height:1px;"></td></tr> 
  <tr bgcolor="#FFFFFF">
  <td align="center" class="s70" bgcolor="#005500"><img src="../images/Shield/5.png" style="width:60px;height:60px;" border="0"></td>
  <td style="width:880px;">
   <table border="1">
<?php while($RS5=mysql_fetch_array($S5)) { 
$srelv5=mysql_query("select HR_Approved,HR_RelievingDate from hrm_employee_separation where Rep_Approved!='C' AND Hod_Approved!='C' AND HR_Approved!='C' AND EmployeeID=".$RS5['EmployeeID'], $con); 
$rowrelv5=mysql_num_rows($srelv5); $resrelv5=mysql_fetch_assoc($srelv5);
if($rowrelv5==0 OR ($rowrelv5>0 AND $resrelv5['HR_Approved']=='N') OR ($rowrelv5>0 AND $resrelv5['HR_Approved']=='Y' AND date("Y-m-d")<$resrelv5['HR_RelievingDate'])){

if($RS5['DR']=='Y'){$M='Dr.';}elseif($RS5['Gender']=='M'){$M='Mr.';} elseif($RS5['Gender']=='F' AND $RS5['Married']=='Y'){$M='Mrs.';} elseif($RS5['Gender']=='F' AND $RS5['Married']=='N'){$M='Miss.';} $EmpName=$M.' '.$RS5['Fname'].' '.$RS5['Sname'].' '.$RS5['Lname']; 
		  $sqlDept=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$RS5['DepartmentId'], $con); $resDept=mysql_fetch_assoc($sqlDept); 
		  $sqlDesig=mysql_query("select DesigName from hrm_designation where DesigId=".$RS5['DesigId'], $con); $resDesig=mysql_fetch_assoc($sqlDesig);
		  $sqlHq=mysql_query("select HqName from hrm_headquater where HqId=".$RS5['HqId'], $con); $resHq=mysql_fetch_assoc($sqlHq);?>	    
   <tr>
    <td align="center" class="s80" valign="top"><b><?php echo date("d-M-y",strtotime($RS5['DateJoining'])); ?></b></td>
    <td class="s300" valign="top">&nbsp;<?php echo $EmpName; ?></td>
    <td class="s100" valign="top">&nbsp;<?php echo $resDept['DepartmentCode']; ?></td>
    <td class="s200" valign="top">&nbsp;<?php echo $resDesig['DesigName']; ?></td>
    <td class="s150" valign="top">&nbsp;<?php echo $resHq['HqName']; ?></td>
   </tr>
<?php } } ?>   
   </table>
  </td>
 </tr>
 <tr><td colspan="2" style="height:1px;"></td></tr> 
 <tr bgcolor="#FFFFFF">
  <td align="center" class="s70" bgcolor="#005500"><img src="../images/Shield/3.png" style="width:60px;height:60px;" border="0"></td>
  <td style="width:880px;">
   <table border="1">
<?php while($RS3=mysql_fetch_array($S3)) { 
$srelv3=mysql_query("select HR_Approved,HR_RelievingDate from hrm_employee_separation where Rep_Approved!='C' AND Hod_Approved!='C' AND HR_Approved!='C' AND EmployeeID=".$RS3['EmployeeID'], $con); 
$rowrelv3=mysql_num_rows($srelv3); $resrelv3=mysql_fetch_assoc($srelv3);
if($rowrelv3==0 OR ($rowrelv3>0 AND $resrelv3['HR_Approved']=='N') OR ($rowrelv3>0 AND $resrelv3['HR_Approved']=='Y' AND date("Y-m-d")<$resrelv3['HR_RelievingDate'])){

if($RS3['DR']=='Y'){$M='Dr.';}elseif($RS3['Gender']=='M'){$M='Mr.';} elseif($RS3['Gender']=='F' AND $RS3['Married']=='Y'){$M='Mrs.';} elseif($RS3['Gender']=='F' AND $RS3['Married']=='N'){$M='Miss.';} $EmpName=$M.' '.$RS3['Fname'].' '.$RS3['Sname'].' '.$RS3['Lname']; 
		  $sqlDept=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$RS3['DepartmentId'], $con); $resDept=mysql_fetch_assoc($sqlDept); 
		  $sqlDesig=mysql_query("select DesigName from hrm_designation where DesigId=".$RS3['DesigId'], $con); $resDesig=mysql_fetch_assoc($sqlDesig);
		  $sqlHq=mysql_query("select HqName from hrm_headquater where HqId=".$RS3['HqId'], $con); $resHq=mysql_fetch_assoc($sqlHq);?>    
   <tr>
    <td align="center" class="s80" valign="top"><b><?php echo date("d-M-y",strtotime($RS3['DateJoining'])); ?></b></td>
    <td class="s300" valign="top">&nbsp;<?php echo $EmpName; ?></td>
    <td class="s100" valign="top">&nbsp;<?php echo $resDept['DepartmentCode']; ?></td>
    <td class="s200" valign="top">&nbsp;<?php echo $resDesig['DesigName']; ?></td>
    <td class="s150" valign="top">&nbsp;<?php echo $resHq['HqName']; ?></td>
   </tr>
<?php } } ?>   
   </table>
  </td>
 </tr>
 <tr><td colspan="2" style="height:1px;"></td></tr> 
 <tr bgcolor="#FFFFFF">
  <td align="center" class="s70" bgcolor="#005500"><img src="../images/Shield/1.png" style="width:60px;height:60px;" border="0"></td>
  <td style="width:880px;">
   <table border="1">
<?php while($RS1=mysql_fetch_array($S1)) { 
$srelv=mysql_query("select HR_Approved,HR_RelievingDate from hrm_employee_separation where Rep_Approved!='C' AND Hod_Approved!='C' AND HR_Approved!='C' AND EmployeeID=".$RS1['EmployeeID'], $con); 
$rowrelv=mysql_num_rows($srelv); $resrelv=mysql_fetch_assoc($srelv);
if($rowrelv==0 OR ($rowrelv>0 AND $resrelv['HR_Approved']=='N') OR ($rowrelv>0 AND $resrelv['HR_Approved']=='Y' AND date("Y-m-d")<$resrelv['HR_RelievingDate'])){

if($RS1['DR']=='Y'){$M='Dr.';}elseif($RS1['Gender']=='M'){$M='Mr.';} elseif($RS1['Gender']=='F' AND $RS1['Married']=='Y'){$M='Mrs.';} elseif($RS1['Gender']=='F' AND $RS1['Married']=='N'){$M='Miss.';} $EmpName=$M.' '.$RS1['Fname'].' '.$RS1['Sname'].' '.$RS1['Lname']; 
		  $sqlDept=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$RS1['DepartmentId'], $con); $resDept=mysql_fetch_assoc($sqlDept); 
		  $sqlDesig=mysql_query("select DesigName from hrm_designation where DesigId=".$RS1['DesigId'], $con); $resDesig=mysql_fetch_assoc($sqlDesig);
		  $sqlHq=mysql_query("select HqName from hrm_headquater where HqId=".$RS1['HqId'], $con); $resHq=mysql_fetch_assoc($sqlHq);?>	   
   <tr>
    <td align="center" class="s80" valign="top"><b><?php echo date("d-M-y",strtotime($RS1['DateJoining'])); ?></b></td>
    <td class="s300" valign="top">&nbsp;<?php echo $EmpName; ?></td>
    <td class="s100" valign="top">&nbsp;<?php echo $resDept['DepartmentCode']; ?></td>
    <td class="s200" valign="top">&nbsp;<?php echo $resDesig['DesigName']; ?></td>
    <td class="s150" valign="top">&nbsp;<?php echo $resHq['HqName']; ?></td>
   </tr>
<?php } } ?>   
   </table>
  </td>
 </tr>

</table>   
</td>

<?php /******************************************************* Marriage Anniversary ****************************************************************************/ ?>
<td style="width:950px;display:<?php if($_REQUEST['v']=='M'){echo 'block';} else{echo 'none';} ?>;" />
<?php $sqlEventAnn=mysql_query("select hrm_employee.EmployeeID,Fname,Sname,Lname,Gender,DepartmentId,DesigId,HqId,MobileNo_Vnr,MobileNo,Married,MarriageDate,DR from hrm_employee INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee_personal.MarriageDate!='1970-01-01' AND hrm_employee_personal.MarriageDate!='0000-00-00' AND hrm_employee_personal.MarriageDate_dm>='".date("0000-m-1")."' AND hrm_employee_personal.MarriageDate_dm<='".date("0000-m-31")."' AND hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$_REQUEST['c']." order by MarriageDate_dm ASC", $con); $rowAnn=mysql_num_rows($sqlEventAnn); ?>	
<table border="0">
 <tr>
  <td align="center" class="s70" valign="top" bgcolor="#005500">
   <table border="0">
    <tr>
	 <td>
	  <img src="../images/Cack/r1.png" style="width:70px;height:70px;" border="0"><br/><br/><img src="../images/Cack/r2.png" style="width:70px;height:70px;" border="0">
	  <br/><br/><img src="../images/Cack/r4.png" style="width:70px;height:70px;" border="0"><br/><br/><img src="../images/Cack/r7.png" style="width:70px;height:70px;" border="0">
	  <br/><br/><img src="../images/Cack/r10.png" style="width:70px;height:70px;" border="0">
	 </td>
	</tr>
   </table>
  </td>
  <td style="width:880px;" valign="top">
   <table border="1" bgcolor="#FFFFFF">
    <tr>
   <td bgcolor="#005500" colspan="5" align="center" style="font-family:Times New Roman;font-size:16px;color:#FFFFFF;"><b>* Marriage Anniversary *</b></td>
   </tr>
    <tr bgcolor="#005500">
	   <td align="center" style="color:#FFFFFF;width:60px;"><b>Date</b></td>
	   <td align="center" style="color:#FFFFFF;width:300px;"><b>Name</b></td>
	   <td align="center" style="color:#FFFFFF;width:100px;"><b>Department</b></td>
	   <td align="center" style="color:#FFFFFF;width:200px;"><b>Designation</b></td>
	   <td align="center" style="color:#FFFFFF;width:150px;"><b>HeadQuater</b></td>
	 </tr>
<?php while($resEventAnn=mysql_fetch_array($sqlEventAnn)) { 
$sAnnE=mysql_query("select HR_Approved,HR_RelievingDate from hrm_employee_separation where Rep_Approved!='C' AND Hod_Approved!='C' AND HR_Approved!='C' AND EmployeeID=".$resEventAnn['EmployeeID'], $con); 
$rowAnnE=mysql_num_rows($sAnnE); $resAnnE=mysql_fetch_assoc($sAnnE);
if($rowAnnE==0 OR ($rowAnnE>0 AND $resAnnE['HR_Approved']=='N') OR ($rowAnnE>0 AND $resAnnE['HR_Approved']=='Y' AND date("Y-m-d")<$resAnnE['HR_RelievingDate'])){

if($resEventAnn['DR']=='Y'){$M='Dr.';}elseif($resEventAnn['Gender']=='M'){$M='Mr.';} elseif($resEventAnn['Gender']=='F' AND $resEventAnn['Married']=='Y'){$M='Mrs.';} elseif($resEventAnn['Gender']=='F' AND $resEventAnn['Married']=='N'){$M='Miss.';} $EmpNameAnn=$M.' '.$resEventAnn['Fname'].' '.$resEventAnn['Sname'].' '.$resEventAnn['Lname']; 
		  $sqlDept=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$resEventAnn['DepartmentId'], $con); $resDept=mysql_fetch_assoc($sqlDept); 
		  $sqlDesig=mysql_query("select DesigName from hrm_designation where DesigId=".$resEventAnn['DesigId'], $con); $resDesig=mysql_fetch_assoc($sqlDesig);
		  $sqlHq=mysql_query("select HqName from hrm_headquater where HqId=".$resEventAnn['HqId'], $con); $resHq=mysql_fetch_assoc($sqlHq);?>	  
   <tr bgcolor="#FFFFFF">
    <td align="center" class="s60" valign="top"><b><?php echo date("d M",strtotime($resEventAnn['MarriageDate'])); ?></b></td>
    <td class="s300" valign="top">&nbsp;<?php echo $EmpNameAnn; ?></td>
    <td class="s100" valign="top">&nbsp;<?php echo $resDept['DepartmentCode']; ?></td>
    <td class="s200" valign="top">&nbsp;<?php echo $resDesig['DesigName']; ?></td>
    <td class="s150" valign="top">&nbsp;<?php echo $resHq['HqName']; ?></td>
   </tr>
<?php } } ?>   
   </table>
  </td>
 </tr>
</table>  
</td>
<?php /******************************************************* Birthday ****************************************************************************/ ?>
<td style="width:950px;display:<?php if($_REQUEST['v']=='B'){echo 'block';} else{echo 'none';} ?>;" />
<?php $sqlEventDOB=mysql_query("select hrm_employee.EmployeeID,Fname,Sname,Lname,Gender,DepartmentId,DesigId,HqId,MobileNo_Vnr,MobileNo,DOB,Married,DR from hrm_employee INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID where hrm_employee_general.DOB!='1970-01-01' AND hrm_employee_general.DOB!='0000-00-00' AND hrm_employee_general.DOB_dm>='".date("0000-m-1")."' AND hrm_employee_general.DOB_dm<='".date("0000-m-31")."'  AND hrm_employee.EmpStatus='A' AND hrm_employee.CompanyId=".$_REQUEST['c']." AND hrm_employee.EmployeeID!=6 order by DOB_dm ASC", $con); ?>
<table border="0">
 <tr>
  <td align="center" class="s70" valign="top" bgcolor="#005500">
   <table border="0">
    <tr>
	 <td>
	   <img src="../images/Cack/c1.png" style="width:70px;height:70px;" border="0"><br/><br/><img src="../images/Cack/c2.png" style="width:70px;height:70px;" border="0">
	   <br/><br/><img src="../images/Cack/c4.png" style="width:70px;height:70px;" border="0"><br/><br/><img src="../images/Cack/c7.png" style="width:70px;height:70px;" border="0">
	   <br/><br/><img src="../images/Cack/c6.png" style="width:70px;height:70px;" border="0">
	 </td>
	</tr>
   </table>
  </td>
  <td style="width:880px;" valign="top">
   <table border="1" bgcolor="#FFFFFF">
    <tr>
    <td bgcolor="#005500" colspan="5" align="center" style="font-family:Times New Roman;font-size:16px;color:#FFFFFF;"><b>* Birthday *</b></td>
   </tr>
    <tr bgcolor="#005500">
	   <td align="center" style="color:#FFFFFF;width:60px;"><b>Date</b></td>
	   <td align="center" style="color:#FFFFFF;width:300px;"><b>Name</b></td>
	   <td align="center" style="color:#FFFFFF;width:100px;"><b>Department</b></td>
	   <td align="center" style="color:#FFFFFF;width:200px;"><b>Designation</b></td>
	   <td align="center" style="color:#FFFFFF;width:150px;"><b>HeadQuater</b></td>
	 </tr>
<?php while($resEventDOB=mysql_fetch_array($sqlEventDOB)){ 
$sDobE=mysql_query("select HR_Approved,HR_RelievingDate from hrm_employee_separation where Rep_Approved!='C' AND Hod_Approved!='C' AND HR_Approved!='C' AND EmployeeID=".$resEventDOB['EmployeeID'], $con); 
$rowDobE=mysql_num_rows($sDobE); $resDobE=mysql_fetch_assoc($sDobE);
if($rowDobE==0 OR ($rowDobE>0 AND $resDobE['HR_Approved']=='N') OR ($rowDobE>0 AND $resDobE['HR_Approved']=='Y' AND date("Y-m-d")<$resDobE['HR_RelievingDate'])){

if($resEventDOB['DR']=='Y'){$M='Dr.';}elseif($resEventDOB['Gender']=='M'){$M='Mr.';} elseif($resEventDOB['Gender']=='F' AND $resEventDOB['Married']=='Y'){$M='Mrs.';} elseif($resEventDOB['Gender']=='F' AND $resEventDOB['Married']=='N'){$M='Miss.';} $EmpNameDOB=$M.' '.$resEventDOB['Fname'].' '.$resEventDOB['Sname'].' '.$resEventDOB['Lname'];
           $sqlDept2=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$resEventDOB['DepartmentId'], $con); $resDept2=mysql_fetch_assoc($sqlDept2);
		   $sqlDesig2=mysql_query("select DesigName from hrm_designation where DesigId=".$resEventDOB['DesigId'], $con); $resDesig2=mysql_fetch_assoc($sqlDesig2);
		   $sqlHq2=mysql_query("select HqName from hrm_headquater where HqId=".$resEventDOB['HqId'], $con); $resHq2=mysql_fetch_assoc($sqlHq2);?>   
   <tr bgcolor="#FFFFFF">
    <td align="center" class="s60" valign="top"><b><?php echo date("d M",strtotime($resEventDOB['DOB'])); ?></b></td>
    <td class="s300" valign="top">&nbsp;<?php echo $EmpNameDOB; ?></td>
    <td class="s100" valign="top">&nbsp;<?php echo $resDept2['DepartmentCode']; ?></td>
    <td class="s200" valign="top">&nbsp;<?php echo $resDesig2['DesigName']; ?></td>
    <td class="s150" valign="top">&nbsp;<?php echo $resHq2['HqName']; ?></td>
   </tr>
<?php } } ?>   
   </table>
  </td>
 </tr>
</table>  
</td>


</tr>
</table>
</center>
</body>
</head>
</html>