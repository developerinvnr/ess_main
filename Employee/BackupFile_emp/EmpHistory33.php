<?php require_once('../AdminUser/config/config.php');  $EmployeeId=$_REQUEST['EI'];?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="../AdminUser/css/body.css" rel="stylesheet"/>
<link type="text/css" href="../AdminUser/css/pro_dropdown_3.css" rel="stylesheet"/>
<style>.head{font-family:Times New Roman;font-size:14px;font-weight:bold;}.data{font-family:Times New Roman;font-size:13px;}
.headc{font-family:Times New Roman;font-size:14px;font-weight:bold;text-align:center;}.datac{font-family:Times New Roman;font-size:13px;text-align:center;}.datar{font-family:Times New Roman;font-size:13px;text-align:right;}</style>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" style="background-image:url(images/pmsback.png);">	
<?php $sqlE=mysql_query("select EmpCode, Fname, Sname, Lname, e.CompanyId, DepartmentName, DesigName, GradeValue, HqName, Gender, DR, Married, DateJoining, DOB, EmailId_Vnr, VNRExpYear, PreviousExpYear from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_personal p ON e.EmployeeID=p.EmployeeID INNER JOIN hrm_department d ON g.DepartmentId=d.DepartmentId INNER JOIN hrm_designation de ON g.DesigId=de.DesigId INNER JOIN hrm_grade gr ON g.GradeId=gr.GradeId INNER JOIN hrm_headquater hq ON g.HqId=hq.HqId where e.EmployeeID=".$EmployeeId, $con); $resE=mysql_fetch_assoc($sqlE); if($resE['DR']=='Y'){$M='Dr.';} elseif($resE['Gender']=='M'){$M='Mr.';} elseif($resE['Gender']=='F' AND $resE['Married']=='Y'){$M='Mrs.';} elseif($resE['Gender']=='F' AND $resE['Married']=='N'){$M='Miss.';}  $Name=$M.' '.$resE['Fname'].' '.$resE['Sname'].' '.$resE['Lname'];  

$sqlQ=mysql_query("select QualificationId from hrm_employee_qualification where EmployeeID=".$EmployeeId." AND (Qualification='10th' OR Qualification='12th' OR Qualification='Graduation' OR Qualification='Post_Graduation') AND Institute!='' AND PassOut!='' AND PassOut!=0", $con); $rowQ=mysql_num_rows($sqlQ);

$sqlPms=mysql_query("select AppraiserId, HodId from hrm_employee_reporting_pmskra where EmployeeID=".$EmployeeId, $con); $resPms=mysql_fetch_assoc($sqlPms); 

$sqlRe=mysql_query("select Fname, Sname, Lname, Gender, DR, Married from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_personal p ON e.EmployeeID=p.EmployeeID where e.EmployeeID=".$resPms['AppraiserId'], $con); $resRe=mysql_fetch_assoc($sqlRe); 
if($resRe['DR']=='Y'){$MRe='Dr.';} elseif($resRe['Gender']=='M'){$MRe='Mr.';} elseif($resRe['Gender']=='F' AND $resRe['Married']=='Y'){$MRe='Mrs.';} elseif($resRe['Gender']=='F' AND $resRe['Married']=='N'){$MRe='Miss.';}  $NameRe=$MRe.' '.$resRe['Fname'].' '.$resRe['Sname'].' '.$resRe['Lname'];
$sqlHo=mysql_query("select Fname, Sname, Lname, Gender, DR, Married from hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_personal p ON e.EmployeeID=p.EmployeeID where e.EmployeeID=".$resPms['HodId'], $con); $resHo=mysql_fetch_assoc($sqlHo);
if($resHo['DR']=='Y'){$MHo='Dr.';} elseif($resHo['Gender']=='M'){$MHo='Mr.';} elseif($resHo['Gender']=='F' AND $resHo['Married']=='Y'){$MHo='Mrs.';} elseif($resHo['Gender']=='F' AND $resHo['Married']=='N'){$MHo='Miss.';}  $NameHo=$MHo.' '.$resHo['Fname'].' '.$resHo['Sname'].' '.$resHo['Lname'];
?>
<table style="vertical-align:top;width:100%;" align="center" border="0">
 <tr>
  <td>
  <table border="0" style="width:100%;">
   <tr><td style="vertical-align:top;width:100%;font-size:20px;font-family:Times New Roman;color:#006A00;" valign="top" align="center"><b><u>Employee History</u></b></td></tr>
   <tr><td>&nbsp;</td></tr>
   <tr>
    <td style="vertical-align:top;width:100%;" valign="top">
	<table border="0" style="width:100%;">
	 <tr>
	  <td align="center" style="width:15%;" valign="top"><?php include("EmpImgEmp.php"); ?></td>
	  <td valign="top" align="right" style="width:85%;">
	   <table border="1" bgcolor="#FFFFFF" cellspacing="0" style="width:100%;">
		<tr style="height:25px;">
		  <td class="head" style="width:15%;">&nbsp;Name</td>
		  <td class="data" style="width:35%;text-transform:uppercase;">&nbsp;<?php echo $Name; ?></td>
		  <td class="head" style="width:15%;">&nbsp;Employee Code</td>
		  <td class="data" style="width:35%;">&nbsp;<?php echo $resE['EmpCode']; ?></td>
		</tr>
		<tr style="height:25px;">
		  <td class="head">&nbsp;Designation</td>
		  <td class="data" style="text-transform:uppercase;">&nbsp;<?php echo $resE['DesigName']; ?></td>
		  <td class="head">&nbsp;Department</td>
		  <td class="data" style="text-transform:uppercase;">&nbsp;<?php echo $resE['DepartmentName']; ?></td>
		</tr>
		<tr style="height:25px;">
		  <td class="head">&nbsp;Location</td>
		  <td class="data" style="text-transform:uppercase;">&nbsp;<?php echo $resE['HqName']; ?></td>
		  <td class="head">&nbsp;DOJ</td>
		  <td class="data">&nbsp;<?php echo date("d-m-Y",strtotime($resE['DateJoining'])); ?></td>
		</tr>			
		<tr style="height:25px;">
		  <td class="head">&nbsp;Qualification</td>
		  <td class="data" style="text-transform:uppercase;">&nbsp;<?php if($rowQ==1){echo '10th';}elseif($rowQ==2){echo '12th';}elseif($rowQ==3){$sqlQ3=mysql_query("select Specialization from hrm_employee_qualification where EmployeeID=".$EmployeeId." AND Qualification='Graduation'", $con); $resQ3=mysql_fetch_assoc($sqlQ3); echo $resQ3['Specialization'];}elseif($rowQ==4){$sqlQ4=mysql_query("select Specialization from hrm_employee_qualification where EmployeeID=".$EmployeeId." AND Qualification='Post_Graduation'", $con); $resQ4=mysql_fetch_assoc($sqlQ4); echo $resQ4['Specialization'];}
		   $sqlQ2=mysql_query("select Specialization from hrm_employee_qualification where EmployeeID=".$EmployeeId." AND Qualification!='10th' AND Qualification!='12th' AND Qualification!='Graduation' AND Qualification!='Post_Graduation' AND PassOut!='' AND PassOut!=0", $con); $rowQ2=mysql_num_rows($sqlQ2); if($rowQ2>0){$resQ2=mysql_fetch_assoc($sqlQ2); echo ', '.$resQ2['Specialization'];} ?></td>
		   
<?php  
//New Open New Open New Open
$dos=date("d-m-Y",strtotime($resE['DOB']));
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
//$AgeMain=$years.' Year - '.$months.' Month';  
//New Close New Close New Close 	

$len2=strlen($months); //if($len2==1){$months='0'.$months;}else{$months=$months;}
//$ExpVNRMain=$years.'.'.$mnt;
if($months<10){ $mnt='0.0'.$months; } 
elseif($months>=10 && $months<12){ $mnt='0.'.$months; }  
elseif($months>=12 AND $months<24){ $m1=$months-12; $l=strlen($m1);if($l==1){$mnt='1.0'.$m1;}else{$mnt='1.'.$m1;} }
elseif($months>=24 AND $months<36){$m1=$months-24; $l=strlen($m1);if($l==1){$mnt='2.0'.$m1;}else{$mnt='2.'.$m1;} }
elseif($months>=36 AND $months<48){$m1=$months-36; $l=strlen($m1);if($l==1){$mnt='3.0'.$m1;}else{$mnt='3.'.$m1;} }
elseif($months>=48 AND $months<60){$m1=$months-48; $l=strlen($m1);if($l==1){$mnt='4.0'.$m1;}else{$mnt='4.'.$m1;} }
elseif($months>=60 AND $months<72){$m1=$months-60; $l=strlen($m1);if($l==1){$mnt='5.0'.$m1;}else{$mnt='5.'.$m1;} }
elseif($months>=72 AND $months<84){$m1=$months-72; $l=strlen($m1);if($l==1){$mnt='6.0'.$m1;}else{$mnt='6.'.$m1;} }
elseif($months>=84 AND $months<96){$m1=$months-84; $l=strlen($m1);if($l==1){$mnt='7.0'.$m1;}else{$mnt='7.'.$m1;} }
elseif($months>=96 AND $months<108){$m1=$months-96; $l=strlen($m1);if($l==1){$mnt='8.0'.$m1;}else{$mnt='8.'.$m1;} }
$str_a = explode('.',$mnt);
$AgeMain=($years+$str_a[0]).'.'.$str_a[1].' Year';
  
?>			  
		  <td class="head">&nbsp;Age</td>
		  <td class="data">&nbsp;<?php echo $AgeMain; ?></td>
		</tr>
<?php 
$timestamp_start = strtotime($resE['DateJoining']);  $timestamp_end = strtotime(date("Y-m-d")); 
$difference = abs($timestamp_end - $timestamp_start); 
$days = floor($difference/(60*60*24)); $months = floor($difference/(60*60*24*30)); $years = $difference/(60*60*24*365); $VNRExp=number_format($years, 1);

//New Open New Open New Open 
$dos=date("d-m-Y",strtotime($resE['DateJoining']));
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
//$VNRExpMain=$years.' Year - '.$months.' Month'; $exy=$years.'.'.$months;
//New Close New Close New Close 	  

$len2=strlen($months); //if($len2==1){$months='0'.$months;}else{$months=$months;}
//$ExpVNRMain=$years.'.'.$mnt;

if($months<10){ $mnt='0.0'.$months; } 
elseif($months>=10 && $months<12){ $mnt='0.'.$months; }  
elseif($months>=12 AND $months<24){ $m1=$months-12; $l=strlen($m1);if($l==1){$mnt='1.0'.$m1;}else{$mnt='1.'.$m1;} }
elseif($months>=24 AND $months<36){$m1=$months-24; $l=strlen($m1);if($l==1){$mnt='2.0'.$m1;}else{$mnt='2.'.$m1;} }
elseif($months>=36 AND $months<48){$m1=$months-36; $l=strlen($m1);if($l==1){$mnt='3.0'.$m1;}else{$mnt='3.'.$m1;} }
elseif($months>=48 AND $months<60){$m1=$months-48; $l=strlen($m1);if($l==1){$mnt='4.0'.$m1;}else{$mnt='4.'.$m1;} }
elseif($months>=60 AND $months<72){$m1=$months-60; $l=strlen($m1);if($l==1){$mnt='5.0'.$m1;}else{$mnt='5.'.$m1;} }
elseif($months>=72 AND $months<84){$m1=$months-72; $l=strlen($m1);if($l==1){$mnt='6.0'.$m1;}else{$mnt='6.'.$m1;} }
elseif($months>=84 AND $months<96){$m1=$months-84; $l=strlen($m1);if($l==1){$mnt='7.0'.$m1;}else{$mnt='7.'.$m1;} }
elseif($months>=96 AND $months<108){$m1=$months-96; $l=strlen($m1);if($l==1){$mnt='8.0'.$m1;}else{$mnt='8.'.$m1;} }
$str_a = explode('.',$mnt);
$VNRExpMain=($years+$str_a[0]).'.'.$str_a[1].' Year';

$str_b = explode('.',$resE['PreviousExpYear']); 
$yy=($years+$str_a[0])+$str_b[0];
$mm=$str_a[1]+$str_b[1];

if($mm<10){ $mmnt='0.0'.$mm; }  
elseif($mm>=10 && $mm<12){ $mmnt='0.'.$mm; }  
elseif($mm>=12 AND $mm<24){ $m1=$mm-12; $l=strlen($m1);if($l==1){$mmnt='1.0'.$m1;}else{$mmnt='1.'.$m1;} }
elseif($mm>=24 AND $mm<36){$m1=$mm-24; $l=strlen($m1);if($l==1){$mmnt='2.0'.$m1;}else{$mmnt='2.'.$m1;} }
elseif($mm>=36 AND $mm<48){$m1=$mm-36; $l=strlen($m1);if($l==1){$mmnt='3.0'.$m1;}else{$mmnt='3.'.$m1;} }
elseif($mm>=48 AND $mm<60){$m1=$mm-48; $l=strlen($m1);if($l==1){$mmnt='4.0'.$m1;}else{$mmnt='4.'.$m1;} }
elseif($mm>=60 AND $mm<72){$m1=$mm-60; $l=strlen($m1);if($l==1){$mmnt='5.0'.$m1;}else{$mmnt='5.'.$m1;} }
elseif($mm>=72 AND $mm<84){$m1=$mm-72; $l=strlen($m1);if($l==1){$mmnt='6.0'.$m1;}else{$mmnt='6.'.$m1;} }
elseif($mm>=84 AND $mm<96){$m1=$mm-84; $l=strlen($m1);if($l==1){$mmnt='7.0'.$m1;}else{$mmnt='7.'.$m1;} }
elseif($mm>=96 AND $mm<108){$m1=$mm-96; $l=strlen($m1);if($l==1){$mmnt='8.0'.$m1;}else{$mmnt='8.'.$m1;} }
$str_c = explode('.',$mmnt);
$TotExp=($yy+$str_c[0]).'.'.$str_c[1];
//echo 'aa='.$resE['PreviousExpYear'];
if($resE['PreviousExpYear']==0){$TotExp=$VNRExpMain;}else{$TotExp=$TotExp;} 
//echo $resE['PreviousExpYear'];
?>			
		<tr style="height:25px;">
		  <td class="head">&nbsp;VNR Exp.</td>
		  <td class="data">&nbsp;<?php echo $VNRExpMain; ?></td>			  
		  <td class="head">&nbsp;Rrev. Exp.</td>
		  <td class="data">&nbsp;<?php echo $resE['PreviousExpYear'].' Year'; ?></td>
		</tr>
		<?php /*
		<tr>
		  <td class="head">&nbsp;Reporting Mgr</td>
		  <td class="data" style="text-transform:uppercase;">&nbsp;<?php echo $NameRe; ?></td>
		  <td class="head">&nbsp;HOD</td>
		  <td class="data" style="text-transform:uppercase;">&nbsp;<?php echo $NameHo; ?></td>
		</tr>
		*/ ?>
	   </table>
	   </td> 
	  </tr>
	 </table>
	 </td>
    </tr>
    <tr><td>&nbsp;</td></tr>
    <tr><td align="" valign="top" style="width:100%;font-size:16px;font-family:Times New Roman;">&nbsp;<b>Career Progression in VNR</b></td></tr>
    <tr>
     <td style="vertical-align:top;width:100%;" valign="top">
	  <table border="1" cellspacing="0" style="width:100%;">
	   <tr style="height:25px;color:#FFFFFF;background-color:#7a6189;">
		<td class="headc" style="width:5%;">Sn</td>
		<td class="headc" style="width:10%;">Date</td>
		<td class="headc" style="width:40%;">Designation</td>
		<td class="headc" style="width:5%;">Grade</td>
		<td class="headc" style="width:10%;">Previous<br>Gross</td>
		<td class="headc" style="width:10%;">Monthly<br>Gross</td>
		<td class="headc" style="width:10%;">%<br>Increment</td>
        <td class="headc" style="width:10%;">Rating</td>	
	   </tr>
<?php $sqlHi2=mysql_query("select SalaryChange_Date, Previous_GrossSalaryPM, Proposed_Designation, Proposed_Grade, TotalProp_GSPM, TotalProp_PerInc_GSPM, Rating from hrm_pms_appraisal_history where EmpCode=".$resE['EmpCode']." AND CompanyId=".$resE['CompanyId']." AND SalaryChange_Date>='".date('2012-01-01')."' order by SalaryChange_Date DESC", $con); 
      $Sno2=1; while($resHi2=mysql_fetch_array($sqlHi2)){ 
	  if($resHi2['SalaryChange_Date']=='2014-01-31' OR $resHi2['Previous_GrossSalaryPM']!=$resHi2['TotalProp_GSPM'] OR $resHi2['Previous_Designation']!=$resHi2['Proposed_Designation']){ ?>
       <tr style="height:22px;background-color:#FFFFFF;">
		<td class="datac"><?php echo $Sno2; ?></td>
		<td class="datac"><?php echo date("d-m-Y",strtotime($resHi2['SalaryChange_Date'])); ?></td>
		<td class="data" style="text-transform:uppercase;">&nbsp;<?php echo $resHi2['Proposed_Designation']; ?></td>
		<td class="datac"><?php echo $resHi2['Proposed_Grade']; ?></td>
		<td class="datar"><?php echo $resHi2['Previous_GrossSalaryPM']; ?>&nbsp;</td>
		<td class="datar"><?php echo $resHi2['TotalProp_GSPM']; ?>&nbsp;</td>
		<td class="datac">
<?php if($resHi2['TotalProp_PerInc_GSPM']==0)
      { 
	    if($resHi2['TotalProp_GSPM']==0 OR $resHi2['Previous_GrossSalaryPM']==$resHi2['TotalProp_GSPM']){echo 0;}
		elseif($resHi2['Previous_GrossSalaryPM']!=$resHi2['TotalProp_GSPM'] AND $resHi2['Previous_GrossSalaryPM']>0 AND $resHi2['TotalProp_GSPM']>0)
		{
		 $oneP=($resHi2['Previous_GrossSalaryPM']*1)/100; 
		 $IncV=$resHi2['TotalProp_GSPM']-$resHi2['Previous_GrossSalaryPM'];
		 $totPInc=$IncV/$oneP;
		 echo number_format($totPInc,2);
		}
	  } 
      else { echo $resHi2['TotalProp_PerInc_GSPM']; } ?>
		</td>
        <td class="datac"><?php echo $resHi2['Rating']; ?></td>	
	   </tr> 
	     	
<?php } $Sno2++; } $Sno=$Sno2; ?>	     	   
<?php $sqlHi=mysql_query("select SalaryChange_Date, Current_Designation, Current_Grade, Previous_GrossSalaryPM, Prop_PeInc_GSPM, Rating from hrm_pms_appraisal_history where EmpCode=".$resE['EmpCode']." AND CompanyId=".$resE['CompanyId']." AND SalaryChange_Date<'".date('2012-01-01')."' order by SalaryChange_Date DESC", $con); 
       while($resHi=mysql_fetch_array($sqlHi)){ ?>	
       <tr style="height:22px;background-color:#FFFFFF;">
		<td class="datac"><?php echo $Sno; ?></td>
		<td class="datac"><?php echo date("d-m-Y",strtotime($resHi['SalaryChange_Date'])); ?></td>
		<td class="data" style="text-transform:uppercase;">&nbsp;<?php echo $resHi['Current_Designation']; ?></td>
		<td class="datac"><?php echo $resHi['Current_Grade']; ?></td>
		<td class="datar"><?php echo '0'; ?>&nbsp;</td>
		<td class="datar"><?php echo $resHi['Previous_GrossSalaryPM']; ?>&nbsp;</td>
		<td class="datac"><?php echo $resHi['Prop_PeInc_GSPM']; ?></td>
        <td class="datac"><?php echo $resHi['Rating']; ?></td>	
	   </tr>   	
<?php $Sno++; } ?>
	  </table>
	 </td>
    </tr>
    <tr><td>&nbsp;</td></tr>
    <tr><td valign="top" style="width:100%;font-size:16px;font-family:Times New Roman;">&nbsp;<b>Previous Employers</b></td></tr>
    <tr>
     <td style="vertical-align:top;width:100%;" valign="top">
	  <table border="1" cellspacing="0" style="width:100%;">
	   <tr style="height:25px;color:#FFFFFF;background-color:#7a6189;">
		<td class="headc" style="width:5%;">Sn</td>
		<td class="headc" style="width:20%;">Company</td>
		<td class="headc" style="width:45%;">Designation</td>
		<td class="headc" style="width:10%;">From_Date</td>
		<td class="headc" style="width:10%;">To_Date</td>
		<td class="headc" style="width:10%;">Duration</td>	
	   </tr>
<?php $sqlEx=mysql_query("select * from hrm_employee_experience where EmployeeID=".$EmployeeId." order by ExpFromDate DESC", $con); $Sno2=1; while($resEx=mysql_fetch_array($sqlEx)){ ?>	
       <tr style="height:22px;background-color:#FFFFFF;">
		<td class="datac"><?php echo $Sno2; ?></td>
		<td class="data" style="text-transform:uppercase;">&nbsp;<?php echo $resEx['ExpComName']; ?></td>
		<td class="data" style="text-transform:uppercase;" valign="top">&nbsp;<?php echo $resEx['ExpDesignation']; ?></td>
		<td class="datac"><?php if($resEx['ExpFromDate']=='0000-00-00' OR $resEx['ExpFromDate']=='1970-01-01') { echo ''; }else {echo date("d-m-Y",strtotime($resEx['ExpFromDate'])); } ?></td>
		<td class="datac"><?php if($resEx['ExpToDate']=='0000-00-00' OR $resEx['ExpToDate']=='1970-01-01') { echo ''; }else {echo date("d-m-Y",strtotime($resEx['ExpToDate'])); }?></td>
		<td class="datac"><?php if($resEx['ExpTotalYear']==0){echo '';}else { echo $resEx['ExpTotalYear'].' year'; } ?></td>	
	   </tr>   	
<?php $Sno2++; } ?>	   
	  </table>
	 </td>
   </tr>
   <tr><td>&nbsp;</td></tr>
   <tr><td valign="top" style="width:100%;font-size:16px;font-family:Times New Roman;">&nbsp;<b>Developmental Progress</b></td></tr>
   <tr><td valign="top" style="width:100%;font-size:16px;font-family:Times New Roman;">&nbsp;<b style="color:#005CB9;">(A)Training Programs</b></td></tr>
   <tr>
    <td style="vertical-align:top;width:100%;" valign="top">
	 <table border="1" cellspacing="0" style="width:100%;">
	  <tr style="height:25px;color:#FFFFFF;background-color:#7a6189;">
		<td class="headc" style="width:5%;">SNo</td>
		<td class="headc" style="width:20%;">Subject</td>
		<td class="headc" style="width:8%;">Date</td>
		<td class="headc" style="width:6%;">Duration</td>
		<td class="headc" style="width:15%;">Institute</td>
		<td class="headc" style="width:23%;">Trainer</td>	
		<td class="headc" style="width:23%;">Location</td>
	   </tr>
<?php $sqlTr=mysql_query("select c.* from hrm_company_training_participant tp inner join hrm_company_training c on tp.TrainingId=c.TrainingId where EmployeeID=".$EmployeeId." order by c.TraFrom DESC", $con); 
$sn=1; while($resTr=mysql_fetch_array($sqlTr)){ ?> 	   
	   <tr style="height:22px;background-color:#FFFFFF;">
		<td class="datac"><?php echo $sn; ?></td>
		<td class="data" style="text-transform:uppercase;">&nbsp;<?php echo $resTr['TraTitle']; ?></td>
		<td class="datac"><?php echo date("d-m-Y",strtotime($resTr['TraFrom'])); ?></td>
		<td class="datac"><?php echo $resTr['Duration']; ?></td>
		<td class="data" style="text-transform:uppercase;">&nbsp;<?php echo $resTr['Institute']; ?></td>
		<td class="data" style="text-transform:uppercase;">&nbsp;<?php echo $resTr['TrainerName']; ?></td>	
		<td class="data" style="text-transform:uppercase;">&nbsp;<?php echo $resTr['Location']; ?></td>
	   </tr>
<?php $sn++; } ?> 	   
	  </table>
	</td>
  </tr>
  <tr><td align="" valign="top" style="width:900px;font-size:16px;font-family:Times New Roman;">&nbsp;<b style="color:#005CB9;">(B)Conference Attended</b></td></tr>
  <tr>
    <td style="vertical-align:top;width:900px;" valign="top">
	  <table border="1" cellspacing="0" style="width:100%;">
	   <tr style="height:25px;color:#FFFFFF;background-color:#7a6189;">
		<td class="headc" style="width:5%;">SNo</td>
		<td class="headc" style="width:20%;">Tital</td>
		<td class="headc" style="width:10%;">Date</td>
		<td class="headc" style="width:5%;">Duration</td>
		<td class="headc" style="width:25%;">Conduct by </td>
		<td class="headc" style="width:25%;">Location</td>	
	   </tr>
<?php $sqlConf=mysql_query("select c.* from hrm_company_conference_participant cp inner join hrm_company_conference c on cp.ConferenceId=c.ConferenceId where EmployeeID=".$EmployeeId." order by c.ConfFrom DESC", $con); 
      $sn2=1; while($resConf=mysql_fetch_array($sqlConf)){ ?>	
	   <tr style="height:22px;background-color:#FFFFFF;">
		<td class="datac"><?php echo $sn2; ?></td>
		<td class="data" style="text-transform:uppercase;">&nbsp;<?php echo $resConf['ConfTitle']; ?></td>
		<td class="datac"><?php echo date("d-m-Y",strtotime($resConf['ConfFrom'])); ?></td>
		<td class="datac"><?php echo $resConf['Duration']; ?></td>
		<td class="data" style="text-transform:uppercase;">&nbsp;<?php echo $resConf['ConductedBy']; ?></td>
		<td class="data" style="text-transform:uppercase;">&nbsp;<?php echo $resConf['Location']; ?></td>	
	   </tr>
<?php $sn2++; } ?>	   
	  </table>
	</td>
  </tr>
 </table>
</td>
</tr>
</table>
</body>  
</html>
