<?php require_once('../AdminUser/config/config.php'); ?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style>.font4 { color:#1FAD34; font-family:Georgia; font-size:15px;} .All{font-size:11px; height:20px;} .All_80{font-size:11px; height:20px; width:80px;}
.All_40{font-size:11px; height:20px; width:40px;} .All_50{font-size:11px; height:20px; width:50px;} .All_70{font-size:11px; height:20px; width:70px;} .All_80{font-size:11px; height:20px; width:80px;}.All_100{font-size:11px; height:20px; width:100px;} .All_120{font-size:11px; height:20px; width:120px;} .All_140{font-size:11px; height:20px; width:140px;} .All_60{font-size:11px; height:20px; width:60px;}
.All_150{font-size:11px; height:20px; width:150px;}.All_170{font-size:11px; height:20px; width:170px;}.All_180{font-size:11px; height:20px; width:180px;}.All_190{font-size:11px; height:20px; width:190px;} .All_200{font-size:11px; height:20px; width:200px;} .All_450{font-size:11px; height:20px; width:450px;}.All_360{font-size:11px; height:20px; width:350px;}.All_540{font-size:11px; height:20px; width:540px;}.All_400{font-size:11px; height:20px; width:400px;} .All_600{font-size:11px; height:20px; width:600px;}
</style>
<script language="javascript" type="text/javascript">
function Printpage()
 { window.print(); window.close(); }
</script>
</head>
<body class="body">
<table>
<tr><td>&nbsp;</td></tr>
<?php if($_REQUEST['action']=='DeptGeneral') { $CompanyId=$_REQUEST['c']; $YearId=$_REQUEST['y']; ?>
<tr>
 <td>
   <table border="1" width="1500">
     <tr>
<?php if($_REQUEST['value']!='All') {$sqlA=mysql_query("select DepartmentName from hrm_department where DepartmentId=".$_REQUEST['value'], $con); $resA=mysql_fetch_assoc($sqlA); } ?>	 
	  <td colspan="32" valign="top" style=" background-color:#0069D2; font-size:14px; color:#FFFFFF; font-family:Georgia; font-weight:bold;">&nbsp;Employee General Details :
	  &nbsp;&nbsp;(&nbsp;Department - <?php if($_REQUEST['value']!='All') {echo $resA['DepartmentName']; } else {echo 'All';} ?>&nbsp;)&nbsp;&nbsp;&nbsp;
	  <a href="#" onClick="Printpage('<?php echo $_REQUEST['value']; ?>')" style="color:#F9F900; font-size:12px;">Print</a>
	  </td>
	 </tr>
	 <tr bgcolor="#7a6189"> 
<td align="center" style="color:#FFFFFF;" class="All_50"><b>SNo.</b></td>
<?php if($_REQUEST['EC']==1) { ?><td align="center" style="color:#FFFFFF;" class="All_70"><b>&nbsp;EC&nbsp;</b></td><?php } ?>
<?php if($_REQUEST['Name_E']==1) { ?><td align="center" style="color:#FFFFFF;" class="All_200"><b>Name</b></td><?php } ?>
<td align="center" style="color:#FFFFFF;" class="All_100"><b>Department</b></td>
<?php if($_REQUEST['Desig']==1) { ?><td align="center" style="color:#FFFFFF;" class="All_150"><b>Desig Code</b></td><?php } ?>
<?php if($_REQUEST['Desig']==1) { ?><td align="center" style="color:#FFFFFF;" class="All_200"><b>Designation Name</b></td><?php } ?>
<?php if($_REQUEST['Grade']==1) { ?><td align="center" style="color:#FFFFFF;" class="All_40"><b>Grade</b></td><?php } ?>	
<?php if($_REQUEST['FN']==1) { ?><td align="center" style="color:#FFFFFF;" class="All_60"><b>FileNo</b></td><?php } ?>	
<?php if($_REQUEST['DOJ']==1) { ?><td align="center" style="color:#FFFFFF;" class="All_70"><b>DOJ</b></td><?php } ?>
<?php if($_REQUEST['DOC']==1) { ?><td align="center" style="color:#FFFFFF;" class="All_70"><b>DOC</b></td><?php } ?>
<?php if($_REQUEST['DOB']==1) { ?><td align="center" style="color:#FFFFFF;" class="All_70"><b>DOB</b></td><?php } ?>
<td align="center" style="color:#FFFFFF;" class="All_70"><b>Age</b></td>
<?php if($_REQUEST['CC']==1) { ?><td align="center" style="color:#FFFFFF;" class="All_100"><b>CostCenter</b></td><?php } ?>
<?php if($_REQUEST['HQ']==1) { ?><td align="center" style="color:#FFFFFF;" class="All_100"><b>HQ</b></td><?php } ?>
<?php if($_REQUEST['Mo_O']==1) { ?><td align="center" style="color:#FFFFFF;" class="All_80"><b>Mobile</b></td><?php } ?>
<?php if($_REQUEST['Em_O']==1) { ?><td align="center" style="color:#FFFFFF;" class="All_150"><b>Email-ID</b></td><?php } ?>
<?php if($_REQUEST['Pexp']==1) { ?><td align="center" style="color:#FFFFFF;" class="All_80"><b>Pre Exp</b></td><?php } ?>
<?php if($_REQUEST['Vexp']==1) { ?><td align="center" style="color:#FFFFFF;" class="All_80"><b>VNR Exp</b></td><?php } ?>
<td align="center" style="color:#FFFFFF;" class="All_200"><b>Qualification</b></td>
<?php if($_REQUEST['BN_1']==1) { ?><td align="center" style="color:#FFFFFF;" class="All_150"><b>Bank1 Name</b></td><?php } ?>
<?php if($_REQUEST['AC_1']==1) { ?><td align="center" style="color:#FFFFFF;" class="All_150"><b>A/C No</b></td><?php } ?>
<?php if($_REQUEST['Branch_1']==1) { ?><td align="center" style="color:#FFFFFF;" class="All_150"><b>Branch</b></td><?php } ?>
<?php if($_REQUEST['BAdd_1']==1) { ?><td align="center" style="color:#FFFFFF;" class="All_150"><b>Address</b></td><?php } ?>
<?php if($_REQUEST['BN_2']==1) { ?><td align="center" style="color:#FFFFFF;" class="All_150"><b>Bank2 Name</b></td><?php } ?>
<?php if($_REQUEST['AC_2']==1) { ?><td align="center" style="color:#FFFFFF;" class="All_150"><b>A/C No</b></td><?php } ?>
<?php if($_REQUEST['Branch_2']==1) { ?><td align="center" style="color:#FFFFFF;" class="All_150"><b>Branch</b></td><?php } ?>
<?php if($_REQUEST['BAdd_2']==1) { ?><td align="center" style="color:#FFFFFF;" class="All_150"><b>Address</b></td><?php } ?>
<?php if($_REQUEST['InsNo']==1) { ?><td align="center" style="color:#FFFFFF;" class="All_120"><b>Insu. No</b></td><?php } ?>
<?php if($_REQUEST['PFNo']==1) { ?><td align="center" style="color:#FFFFFF;" class="All_120"><b>PF No</b></td><?php } ?>
<td align="center" style="color:#FFFFFF;" class="All_120"><b>PF UAN</b></td>
<?php if($_REQUEST['ESICNo']==1) { ?><td align="center" style="color:#FFFFFF;" class="All_50"><b>ESIC No</b></td><?php } ?>
<?php if($_REQUEST['Rep_Name']==1) { ?><td align="center" style="color:#FFFFFF;" class="All_150"><b>Name</b></td><?php } ?>
<?php if($_REQUEST['Rep_Desig']==1) { ?><td align="center" style="color:#FFFFFF;" class="All_120"><b>Designation</b></td><?php } ?>
<?php if($_REQUEST['Rep_EmID']==1) { ?><td align="center" style="color:#FFFFFF;" class="All_150"><b>EmailID</b></td><?php } ?>
<?php if($_REQUEST['Rep_Cont']==1) { ?><td align="center" style="color:#FFFFFF;" class="All_100"><b>Contact</b></td><?php } ?>
	</tr>
<?php if($_REQUEST['value']=='All') {$sql=mysql_query("select hrm_employee.*, hrm_employee_general.* from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee.CompanyId=".$CompanyId." AND hrm_employee.EmpStatus='A' order by EmpCode ASC", $con); }
else {$sql=mysql_query("select hrm_employee.*, hrm_employee_general.* from hrm_employee_general INNER JOIN hrm_employee ON hrm_employee_general.EmployeeID=hrm_employee.EmployeeID where hrm_employee_general.DepartmentId=".$_REQUEST['value']." AND hrm_employee.CompanyId=".$CompanyId." AND hrm_employee.EmpStatus='A' order by EmpCode ASC", $con); } 
$Sno=1; while($res=mysql_fetch_array($sql)){ $Ename=$res['Fname'].' '.$res['Sname'].' '.$res['Lname']; 
$sqlDept=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$res['DepartmentId'], $con); $resDept=mysql_fetch_assoc($sqlDept);
$sqlDesig=mysql_query("select DesigCode,DesigName from hrm_designation where DesigId=".$res['DesigId'], $con); $resDesig=mysql_fetch_assoc($sqlDesig);
$sqlGrade=mysql_query("select GradeValue from hrm_grade where GradeId=".$res['GradeId'], $con); $resGrade=mysql_fetch_assoc($sqlGrade);
$sqlCC=mysql_query("select StateName from hrm_state where StateId=".$res['CostCenter'], $con); $resCC=mysql_fetch_assoc($sqlCC);
$sqlHQ=mysql_query("select HqName from hrm_headquater where HqId=".$res['HqId'], $con); $resHQ=mysql_fetch_assoc($sqlHQ);
?> 
     <tr bgcolor="#FFFFFF">
<td align="center" style="" class="All_50" valign="top"><?php echo $Sno; ?></td>
<?php if($_REQUEST['EC']==1) { ?><td align="center" style="background-color:#E8D2FB;" class="All_70" valign="top"><?php echo $res['EmpCode']; ?></td><?php } ?>
<?php if($_REQUEST['Name_E']==1) { ?><td align="" style="background-color:#E8D2FB;" class="All_200" valign="top"><?php echo $Ename; ?></td><?php } ?>
<td align="" style="" class="All_80" valign="top"><?php echo $resDept['DepartmentCode']; ?></td>
<?php if($_REQUEST['Desig']==1) { ?><td align="" style="background-color:#E8D2FB;" class="All_150" valign="top"><?php echo $resDesig['DesigCode']; ?></td><?php } ?>
<?php if($_REQUEST['Desig']==1) { ?><td align="" style="background-color:#E8D2FB;" class="All_200" valign="top"><?php echo $resDesig['DesigName']; ?></td><?php } ?>
<?php if($_REQUEST['Grade']==1) { ?><td align="center" style="background-color:#E8D2FB;" class="All_40" valign="top"><?php echo $resGrade['GradeValue']; ?></td><?php } ?>	
<?php if($_REQUEST['FN']==1) { ?><td align="center" style="" class="All_60" valign="top"><?php echo $res['FileNo']; ?></td><?php } ?>	
<?php if($_REQUEST['DOJ']==1) { ?><td align="center" style="background-color:#FFDBCA;" class="All_70" valign="top"><?php if($res['RetiStatus']=='Y'){ echo date("d-M-y", strtotime($res['RetiDate'])); }else { echo date("d-M-y", strtotime($res['DateJoining'])); } ?></td><?php } ?>
<?php if($_REQUEST['DOC']==1) { ?><td align="center" style="background-color:#FFDBCA;" class="All_70" valign="top">
<?php if($res['DateConfirmation']!='1970-01-01' AND $res['DateConfirmation']!='0000-00-00' AND $res['RetiStatus']=='N') { echo date("d-M-y", strtotime($res['DateConfirmation'])); }?></td><?php } ?>
<?php if($_REQUEST['DOB']==1) { ?><td align="center" style="background-color:#FFDBCA;" class="All_70" valign="top"><?php echo date("d-M-y", strtotime($res['DOB'])); ?></td><?php } ?>
<?php //$timestamp_start = strtotime($res['DOB']);  $timestamp_end = strtotime(date("Y-m-d")); 
      //$difference = abs($timestamp_end - $timestamp_start); 
      //$days = floor($difference/(60*60*24)); $months = floor($difference/(60*60*24*30)); 
	  //$years2 = $difference/(60*60*24*365); 
	  //$Y2=$years2*12; $M22=$months-$Y2;
	  //$AgeMain=number_format($years2, 1);
	  
	  $dos=date("d-m-Y",strtotime($res['DOB']));
      $localtime = getdate();
      $today = $localtime['mday']."-".$localtime['mon']."-".$localtime['year'];
      $dob_a = explode("-", $dos);
      $today_a = explode("-", $today);
      $dob_d = $dob_a[0];$dob_m = $dob_a[1];$dob_y = $dob_a[2];
      $today_d = $today_a[0];$today_m = $today_a[1];$today_y = $today_a[2];
      $years = $today_y - $dob_y;
      $months = $today_m - $dob_m;
      if ($today_m.$today_d < $dob_m.$dob_d){ $years--; $months = 12 + $today_m - $dob_m; }
      if ($today_d < $dob_d){ $months--; }
      $firstMonths=array(1,3,5,7,8,10,12);
      $secondMonths=array(4,6,9,11);
      $thirdMonths=array(2);
      if($today_m - $dob_m == 1) 
      {
       if(in_array($dob_m, $firstMonths)){ array_push($firstMonths, 0); }
       elseif(in_array($dob_m, $secondMonths)){ array_push($secondMonths, 0); }
	   elseif(in_array($dob_m, $thirdMonths)){ array_push($thirdMonths, 0); }
      }
	  //$AgeMain=$years.'Y - '.$months.'M';
	  
	  $len2=strlen($months); //if($len2==1){$months='0'.$months;}else{$months=$months;}
if($months<10){ $mnt='0.0'.$months; } 
elseif($months>=10 && $months<12){ $mnt='0.'.$months; } 
//if($months<12){ $mnt='0.'.$months; }  
elseif($months>=12 AND $months<24){ $m1=$months-12; $l=strlen($m1);if($l==1){$mnt='1.0'.$m1;}else{$mnt='1.'.$m1;} }
elseif($months>=24 AND $months<36){$m1=$months-24; $l=strlen($m1);if($l==1){$mnt='2.0'.$m1;}else{$mnt='2.'.$m1;} }
elseif($months>=36 AND $months<48){$m1=$months-36; $l=strlen($m1);if($l==1){$mnt='3.0'.$m1;}else{$mnt='3.'.$m1;} }
elseif($months>=48 AND $months<60){$m1=$months-48; $l=strlen($m1);if($l==1){$mnt='4.0'.$m1;}else{$mnt='4.'.$m1;} }
elseif($months>=60 AND $months<72){$m1=$months-60; $l=strlen($m1);if($l==1){$mnt='5.0'.$m1;}else{$mnt='5.'.$m1;} }
elseif($months>=72 AND $months<84){$m1=$months-72; $l=strlen($m1);if($l==1){$mnt='6.0'.$m1;}else{$mnt='6.'.$m1;} }
elseif($months>=84 AND $months<96){$m1=$months-84; $l=strlen($m1);if($l==1){$mnt='7.0'.$m1;}else{$mnt='7.'.$m1;} }
elseif($months>=96 AND $months<108){$m1=$months-96; $l=strlen($m1);if($l==1){$mnt='8.0'.$m1;}else{$mnt='8.'.$m1;} }
$str_a = explode('.',$mnt);
$AgeMain=($years+$str_a[0]).'.'.$str_a[1];
	  
?>		
<td align="center" style="background-color:#FFDBCA;" class="All_70" valign="top"><?php echo $AgeMain; ?></td>
<?php if($_REQUEST['CC']==1) { ?><td align="" style="" class="All_100" valign="top"><?php echo $resCC['StateName']; ?></td><?php } ?>
<?php if($_REQUEST['HQ']==1) { ?><td align="" style="" class="All_100" valign="top"><?php echo $resHQ['HqName']; ?></td><?php } ?>
<?php if($_REQUEST['Mo_O']==1) { ?><td align="" style="background-color:#C9FDB0;" class="All_80" valign="top"><?php echo $res['MobileNo_Vnr']; ?></td><?php } ?>
<?php if($_REQUEST['Em_O']==1) { ?><td align="" style="background-color:#C9FDB0;" class="All_150" valign="top"><?php echo $res['EmailId_Vnr']; ?></td><?php } ?>
<?php if($_REQUEST['Pexp']==1) { ?><td align="center" style="" class="All_80" valign="top"><?php echo $res['PreviousExpYear']; ?></td><?php } ?>
<?php if($_REQUEST['Vexp']==1) { 

      $dos=date("d-m-Y",strtotime($res['DateJoining']));
      $localtime = getdate();
      $today = $localtime['mday']."-".$localtime['mon']."-".$localtime['year'];
      $dob_a = explode("-", $dos);
      $today_a = explode("-", $today);
      $dob_d = $dob_a[0];$dob_m = $dob_a[1];$dob_y = $dob_a[2];
      $today_d = $today_a[0];$today_m = $today_a[1];$today_y = $today_a[2];
      $years = $today_y - $dob_y;
      $months = $today_m - $dob_m;
      if ($today_m.$today_d < $dob_m.$dob_d){ $years--; $months = 12 + $today_m - $dob_m; }
      if ($today_d < $dob_d){ $months--; }
      $firstMonths=array(1,3,5,7,8,10,12);
      $secondMonths=array(4,6,9,11);
      $thirdMonths=array(2);
      if($today_m - $dob_m == 1) 
      {
       if(in_array($dob_m, $firstMonths)){ array_push($firstMonths, 0); }
       elseif(in_array($dob_m, $secondMonths)){ array_push($secondMonths, 0); }
	   elseif(in_array($dob_m, $thirdMonths)){ array_push($thirdMonths, 0); }
      }
	  ///$VNRExpMain=$years.'Y - '.$months.'M';
	  
	  $len2=strlen($months); //if($len2==1){$months='0'.$months;}else{$months=$months;}
if($months<10){ $mnt='0.0'.$months; } 
elseif($months>=10 && $months<12){ $mnt='0.'.$months; } 
//if($months<12){ $mnt='0.'.$months; }  
elseif($months>=12 AND $months<24){ $m1=$months-12; $l=strlen($m1);if($l==1){$mnt='1.0'.$m1;}else{$mnt='1.'.$m1;} }
elseif($months>=24 AND $months<36){$m1=$months-24; $l=strlen($m1);if($l==1){$mnt='2.0'.$m1;}else{$mnt='2.'.$m1;} }
elseif($months>=36 AND $months<48){$m1=$months-36; $l=strlen($m1);if($l==1){$mnt='3.0'.$m1;}else{$mnt='3.'.$m1;} }
elseif($months>=48 AND $months<60){$m1=$months-48; $l=strlen($m1);if($l==1){$mnt='4.0'.$m1;}else{$mnt='4.'.$m1;} }
elseif($months>=60 AND $months<72){$m1=$months-60; $l=strlen($m1);if($l==1){$mnt='5.0'.$m1;}else{$mnt='5.'.$m1;} }
elseif($months>=72 AND $months<84){$m1=$months-72; $l=strlen($m1);if($l==1){$mnt='6.0'.$m1;}else{$mnt='6.'.$m1;} }
elseif($months>=84 AND $months<96){$m1=$months-84; $l=strlen($m1);if($l==1){$mnt='7.0'.$m1;}else{$mnt='7.'.$m1;} }
elseif($months>=96 AND $months<108){$m1=$months-96; $l=strlen($m1);if($l==1){$mnt='8.0'.$m1;}else{$mnt='8.'.$m1;} }
$str_a = explode('.',$mnt);
$VNRExpMain=($years+$str_a[0]).'.'.$str_a[1];


?><td align="center" style="" class="All_80" valign="top"><?php echo $VNRExpMain; ?></td><?php } ?>
<?php $sqlQuali=mysql_query("select Qualification,Specialization from hrm_employee_qualification where EmployeeID=".$res['EmployeeID'], $con); ?>	
	<td align="" style="" class="All_200" valign="top"><?php $no=1; while($resQuali=mysql_fetch_array($sqlQuali)) { if($no<=2){echo $resQuali['Qualification'].', '; } if($resQuali['Specialization']!='')if($no>=3){echo $resQuali['Specialization'].', '; } $no++;}?></td>
<?php if($_REQUEST['BN_1']==1) { ?><td align="" style="background-color:#95CAFF" class="All_150" valign="top"><?php echo $res['BankName']; ?></td><?php } ?>
<?php if($_REQUEST['AC_1']==1) { ?><td align="" style="background-color:#95CAFF" class="All_150" valign="top"><?php echo $res['AccountNo']; ?></td><?php } ?>
<?php if($_REQUEST['Branch_1']==1) { ?><td align="" style="background-color:#95CAFF" class="All_150" valign="top"><?php echo $res['BranchName']; ?></td><?php } ?>
<?php if($_REQUEST['BAdd_1']==1) { ?><td align="" style="background-color:#95CAFF" class="All_150" valign="top"><?php echo $res['BranchAdd']; ?></td><?php } ?>
<?php if($_REQUEST['BN_2']==1) { ?><td align="" style="background-color:#95CAFF" class="All_150" valign="top"><?php echo $res['BankName2']; ?></td><?php } ?>
<?php if($_REQUEST['AC_2']==1) { ?><td align="" style="background-color:#95CAFF" class="All_150" valign="top"><?php echo $res['AccountNo2']; ?></td><?php } ?>
<?php if($_REQUEST['Branch_2']==1) { ?><td align="" style="background-color:#95CAFF" class="All_150" valign="top"><?php echo $res['BranchName2']; ?></td><?php } ?>
<?php if($_REQUEST['BAdd_2']==1) { ?><td align="" style="background-color:#95CAFF" class="All_150" valign="top"><?php echo $res['BranchAdd2']; ?></td><?php } ?>
<?php if($_REQUEST['InsNo']==1) { ?><td align="" style="background-color:#C9FDB0;" class="All_120" valign="top"><?php echo $res['InsuCardNo']; ?></td><?php } ?>
<?php if($_REQUEST['PFNo']==1) { ?><td align="" style="background-color:#C9FDB0;" class="All_120" valign="top"><?php echo $res['PfAccountNo']; ?></td><?php } ?>
<td align="" style="background-color:#C9FDB0;" class="All_120" valign="top"><?php echo $res['PF_UAN']; ?></td>
<?php if($_REQUEST['ESICNo']==1) { ?><td align="" style="background-color:#C9FDB0;" class="All_50" valign="top"><?php echo $res['EsicNo']; ?></td><?php } ?>
<?php if($_REQUEST['Rep_Name']==1) { ?><td align="" style="background-color:#FCFAB1;" class="All_150" valign="top"><?php echo $res['ReportingName']; ?></td><?php } ?>
<?php $sqlDesigR=mysql_query("select DesigCode from hrm_designation where DesigId=".$res['ReportingDesigId'], $con); $resDesigR=mysql_fetch_assoc($sqlDesigR); ?>		
<?php if($_REQUEST['Rep_Desig']==1) { ?><td align="" style="background-color:#FCFAB1;" class="All_120" valign="top"><?php echo $resDesigR['DesigCode']; ?></td><?php } ?>
<?php if($_REQUEST['Rep_EmID']==1) { ?><td align="" style="background-color:#FCFAB1;" class="All_150" valign="top"><?php echo $res['ReportingEmailId']; ?></td><?php } ?>
<?php if($_REQUEST['Rep_Cont']==1) { ?><td align="" style="background-color:#FCFAB1;" class="All_100" valign="top"><?php echo $res['ReportingContactNo']; ?></td><?php } ?>
	</tr>   
	 <?php $Sno++; } ?>	
   </table>
 </td>
</tr> 
<?php } ?>

</table>  
 
</body>
</html>

