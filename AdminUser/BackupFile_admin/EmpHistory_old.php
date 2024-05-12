<?php require_once('../AdminUser/config/config.php');  $EmployeeId=$_REQUEST['EI'];?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="../AdminUser/css/body.css" rel="stylesheet"/>
<link type="text/css" href="../AdminUser/css/pro_dropdown_3.css" rel="stylesheet"/>
<style>.head{font-family:Times New Roman;font-size:14px;font-weight:bold;}.data{font-family:Times New Roman;font-size:13px;}</style>
<script language="javascript" type="text/javascript">
function PrinP() { document.getElementById("PrintTD").style.display='none'; window.print(); window.close();}
</script>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" bgcolor="#E0DBE3">	
<?php $sqlE=mysql_query("select EmpCode, Fname, Sname, Lname, CompanyId, DepartmentId, DesigId, GradeId, HqId, Gender, DR, Married, DateJoining, EmpStatus, DateOfSepration, DOB, EmailId_Vnr, VNRExpYear, PreviousExpYear from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee.EmployeeID=".$EmployeeId, $con); $resE=mysql_fetch_assoc($sqlE); 
if($resE['DR']=='Y'){$M='Dr.';} elseif($resE['Gender']=='M'){$M='Mr.';} elseif($resE['Gender']=='F' AND $resE['Married']=='Y'){$M='Mrs.';} elseif($resE['Gender']=='F' AND $resE['Married']=='N'){$M='Miss.';}  $Name=$M.' '.$resE['Fname'].' '.$resE['Sname'].' '.$resE['Lname']; 
$sqlD=mysql_query("select DepartmentName from hrm_department where DepartmentId=".$resE['DepartmentId'], $con); $resD=mysql_fetch_assoc($sqlD);
$sqlDe=mysql_query("select DesigName from hrm_designation where DesigId=".$resE['DesigId'], $con); $resDe=mysql_fetch_assoc($sqlDe);
$sqlG=mysql_query("select GradeValue from hrm_grade where GradeId=".$resE['GradeId'], $con); $resG=mysql_fetch_assoc($sqlG);
$sqlHq=mysql_query("select HqName from hrm_headquater where HqId=".$resE['HqId'], $con); $resHq=mysql_fetch_assoc($sqlHq); 
$sqlPms=mysql_query("select AppraiserId, HodId from hrm_employee_reporting_pmskra where EmployeeID=".$EmployeeId, $con); $resPms=mysql_fetch_assoc($sqlPms); 
$sqlRe=mysql_query("select Fname, Sname, Lname, Gender, DR, Married from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee.EmployeeID=".$resPms['AppraiserId'], $con); $resRe=mysql_fetch_assoc($sqlRe); 
if($resRe['DR']=='Y'){$MRe='Dr.';} elseif($resRe['Gender']=='M'){$MRe='Mr.';} elseif($resRe['Gender']=='F' AND $resRe['Married']=='Y'){$MRe='Mrs.';} elseif($resRe['Gender']=='F' AND $resRe['Married']=='N'){$MRe='Miss.';}  $NameRe=$MRe.' '.$resRe['Fname'].' '.$resRe['Sname'].' '.$resRe['Lname'];
$sqlHo=mysql_query("select Fname, Sname, Lname, Gender, DR, Married from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee.EmployeeID=".$resPms['HodId'], $con); $resHo=mysql_fetch_assoc($sqlHo);
if($resHo['DR']=='Y'){$MHo='Dr.';} elseif($resHo['Gender']=='M'){$MHo='Mr.';} elseif($resHo['Gender']=='F' AND $resHo['Married']=='Y'){$MHo='Mrs.';} elseif($resHo['Gender']=='F' AND $resHo['Married']=='N'){$MHo='Miss.';}  $NameHo=$MHo.' '.$resHo['Fname'].' '.$resHo['Sname'].' '.$resHo['Lname'];
?>
<table style="vertical-align:top;width:900px;" align="center" border="0">
<tr>
<td>
 <table border="0">
  <tr><td style="vertical-align:top;width:900px;font-size:20px;font-family:Times New Roman;color:#006A00;" valign="top" align="center"><b><u>Employee History</u></b></td></tr>
  <tr><td align="right">&nbsp;
      <span id="PrintTD"><a href="#" onClick="PrinP()"><font style="font-family:Times New Roman; font-size:14px;">Print</font></a></span>
	  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
  </tr>
  <tr>
    <td style="vertical-align:top;width:900px;" valign="top">
	  <table border="0">
	   <tr>
	     <td align="center" style="width:150px;" valign="top">
<?php echo '<img width="105px" height="125px" border=1 src="EmpImg'.$resE['CompanyId'].'Emp/'.$resE['EmpCode'].'.jpg" />'; ?>
<?php //echo "<img width=105px height=120px border=1 src=\"show_images.php?id=".$EmployeeId."\">\n";?></td>
		 <td valign="top" align="right">
		   <table border="1" bgcolor="#FFFFFF">
		    <tr>
			  <td class="head" style="width:100px;" valign="top">&nbsp;Name</td>
			  <td class="data" style="width:250px;text-transform:uppercase;" valign="top">&nbsp;<?php echo $Name; ?></td>
			  <td class="head" style="width:100px;" valign="top">&nbsp;Employee Code</td>
			  <td class="data" style="width:225px;" valign="top">&nbsp;<?php echo $resE['EmpCode']; ?></td>
			</tr>
			<tr>
			  <td class="head" style="width:100px;" valign="top">&nbsp;Designation</td>
			  <td class="data" style="width:250px;text-transform:uppercase;" valign="top">&nbsp;<?php echo $resDe['DesigName']; ?></td>
			  <td class="head" style="width:100px;" valign="top">&nbsp;Department</td>
			  <td class="data" style="width:225px;text-transform:uppercase;" valign="top">&nbsp;<?php echo $resD['DepartmentName']; ?></td>
			</tr>
			<tr>
			  <td class="head" style="width:100px;" valign="top">&nbsp;Location</td>
			  <td class="data" style="width:250px;text-transform:uppercase;" valign="top">&nbsp;<?php echo $resHq['HqName']; ?></td>
			  <td class="head" style="width:100px;" valign="top">&nbsp;DOJ</td>
			  <td class="data" style="width:225px;" valign="top">&nbsp;<?php echo date("d-m-Y",strtotime($resE['DateJoining'])); ?></td>
			</tr>
<?php $sqlQ=mysql_query("select QualificationId from hrm_employee_qualification where EmployeeID=".$EmployeeId." AND (Qualification='10th' OR Qualification='12th' OR Qualification='Graduation' OR Qualification='Post_Graduation') AND Institute!='' AND PassOut!='' AND PassOut!=0", $con); $rowQ=mysql_num_rows($sqlQ); ?>			
			<tr>
			  <td class="head" style="width:100px;" valign="top">&nbsp;Qualification</td>
			  <td class="data" style="width:250px;text-transform:uppercase;" valign="top">&nbsp;<?php if($rowQ==1){echo '10th';}elseif($rowQ==2){echo '12th';}elseif($rowQ==3){$sqlQ3=mysql_query("select Specialization from hrm_employee_qualification where EmployeeID=".$EmployeeId." AND Qualification='Graduation'", $con); $resQ3=mysql_fetch_assoc($sqlQ3); echo $resQ3['Specialization'];}elseif($rowQ==4){$sqlQ4=mysql_query("select Specialization from hrm_employee_qualification where EmployeeID=".$EmployeeId." AND Qualification='Post_Graduation'", $con); $resQ4=mysql_fetch_assoc($sqlQ4); echo $resQ4['Specialization'];}
			   $sqlQ2=mysql_query("select Specialization from hrm_employee_qualification where EmployeeID=".$EmployeeId." AND Qualification!='10th' AND Qualification!='12th' AND Qualification!='Graduation' AND Qualification!='Post_Graduation' AND PassOut!='' AND PassOut!=0", $con); $rowQ2=mysql_num_rows($sqlQ2); 
			   if($rowQ2>0){$resQ2=mysql_fetch_assoc($sqlQ2); echo ', '.$resQ2['Specialization'];} ?>
			  </td>
<?php $timestamp_start = strtotime($resE['DOB']);  $timestamp_end = strtotime(date("Y-m-d")); $difference = abs($timestamp_end - $timestamp_start); 
      $days = floor($difference/(60*60*24)); $months = floor($difference/(60*60*24*30)); $years2 = $difference/(60*60*24*365); //$AgeMain=number_format($years2, 1); 
      
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
//$ExpVNRMain=$years.'.'.$months; 

$len2=strlen($months); //if($len2==1){$months='0'.$months;}else{$months=$months;}
//$ExpVNRMain=$years.'.'.$mnt;

if($months<10){ $mnt='0.0'.$months; } 
elseif($months>=10 && $months<12){ $mnt='0.'.$months; } 
//if($months<12){ $mnt='0.'.$str[1]; }  
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
			  <td class="head" style="width:100px;" valign="top">&nbsp;Age</td>
			  <td class="data" style="width:225px;" valign="top">&nbsp;<?php echo $AgeMain.'   year' ?></td>
			</tr>
<?php $timestamp_start = strtotime($resE['DateJoining']);  $timestamp_end = strtotime(date("Y-m-d")); $difference = abs($timestamp_end - $timestamp_start); 
	  $days = floor($difference/(60*60*24)); $months = floor($difference/(60*60*24*30)); $years = $difference/(60*60*24*365); //$VNRExpMain=number_format($years, 1); 
	  
$dos=date("d-m-Y",strtotime($resE['DateJoining']));
if($resE['EmpStatus']=='A'){ $localtime = date("d-m-Y"); }
else{ $localtime=date("d-m-Y",strtotime($resE['DateOfSepration'])); } 

//$localtime = getdate();
//$today = $localtime['mday']."-".$localtime['mon']."-".$localtime['year'];
$dob_a = explode("-", $dos);
$today_a = explode("-", $localtime);
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
//$ExpVNRMain=$years.'.'.$months; 

$len2=strlen($months); //if($len2==1){$months='0'.$months;}else{$months=$months;}
//$ExpVNRMain=$years.'.'.$mnt;

if($months<10){ $mnt='0.0'.$months; } 
elseif($months>=10 && $months<12){ $mnt='0.'.$months; } 
//if($months<12){ $mnt='0.'.$str[1]; }  
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
	  
	  ?>			
			<tr>
			  <td class="head" style="width:100px;" valign="top">&nbsp;VNR Exp.</td>
			  <td class="data" style="width:250px;" valign="top">&nbsp;<?php echo $VNRExpMain.' year'; ?></td>
<?php $TotExp=$VNRExpMain+$resE['PreviousExpYear']; ?>			  
			  <td class="head" style="width:100px;" valign="top">&nbsp;Prev. Exp.</td>
			  <td class="data" style="width:225px;" valign="top">&nbsp;<?php echo $resE['PreviousExpYear'].' year'; ?></td>
			</tr>
			<tr>
			  <td class="head" style="width:100px;" valign="top">&nbsp;Reporting Mgr</td>
			  <td class="data" style="width:250px;text-transform:uppercase;" valign="top">&nbsp;<?php echo $NameRe; ?></td>
			  <td class="head" style="width:100px;" valign="top">&nbsp;HOD</td>
			  <td class="data" style="width:225px;text-transform:uppercase;" valign="top">&nbsp;<?php echo $NameHo; ?></td>
			</tr>
		   </table>
		 </td> 
	   </tr>
	  </table>
	</td>
  </tr>
  <tr><td>&nbsp;</td></tr>
   <tr><td align="" valign="top" style="width:900px;font-size:16px;font-family:Times New Roman;">&nbsp;<b>Career Progression in VNR</b></td></tr>
  <tr>
    <td style="vertical-align:top;width:900px;" valign="top">
	  <table border="1">
	   <tr bgcolor="#7a6189" style="height:22px;">
		<td align="center" class="head" style="color:#FFFFFF;width:50px;">SNo</td>
		<td align="center" class="head" style="color:#FFFFFF;width:100px;">Date</td>
		<td align="center" class="head" style="color:#FFFFFF;width:300px;">Designation</td>
		<td align="center" class="head" style="color:#FFFFFF;width:70px;">Grade</td>
		<td align="center" class="head" style="color:#FFFFFF;width:100px;">Previous Gross</td>
		<td align="center" class="head" style="color:#FFFFFF;width:100px;">Monthly Gross</td>
		<td align="center" class="head" style="color:#FFFFFF;width:100px;">% Increment</td>
        <td align="center" class="head" style="color:#FFFFFF;width:60px;">Rating</td>	
	   </tr>
<?php $sqlHi2=mysql_query("select EmpPmsId,SalaryChange_Date, Previous_GrossSalaryPM, Proposed_Designation, Proposed_Grade, TotalProp_GSPM, TotalProp_PerInc_GSPM, Rating from hrm_pms_appraisal_history where EmpCode=".$resE['EmpCode']." AND CompanyId=".$resE['CompanyId']." AND SalaryChange_Date>='".date('2012-01-01')."' order by SalaryChange_Date DESC", $con); 
      $Sno2=1; while($resHi2=mysql_fetch_array($sqlHi2)){ ?>
	  
	<?php if($resHi2['SalaryChange_Date']=='2014-01-31' OR $resHi2['Previous_GrossSalaryPM']!=$resHi2['TotalProp_GSPM'] OR $resHi2['Previous_Designation']!=$resHi2['Proposed_Designation']){  ?>
	  	
       <tr bgcolor="#FFFFFF" style="height:22px;">
		<td align="center" class="data"><?php echo $Sno2; ?></td>
		<td align="center" class="data"><?php echo date("d-m-Y",strtotime($resHi2['SalaryChange_Date'])); ?></td>
		<td align="" class="data" style="text-transform:uppercase;" valign="top">&nbsp;<?php echo $resHi2['Proposed_Designation']; ?></td>
		<td align="center" class="data"><?php echo $resHi2['Proposed_Grade']; ?></td>
		<td align="right" class="data"><?php echo $resHi2['Previous_GrossSalaryPM']; ?>&nbsp;</td>
		<td align="right" class="data"><?php echo $resHi2['TotalProp_GSPM']; ?>&nbsp;</td>
		
		<td align="center" class="data">
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
		
        <?php if(($resHi2['Rating']=='' || $resHi2['Rating']==0) && $resHi2['EmpPmsId']>0){
		$rat=mysql_query("select Hod_TotalFinalRating from hrm_employee_pms where EmpPmsId=".$resHi2['EmpPmsId'],$con);
		$resrat=mysql_fetch_assoc($rat); ?>
		<td align="center" class="data"><?php echo $resrat['Hod_TotalFinalRating']; ?></td>
		<?php }elseif(($resHi2['Rating']=='' || $resHi2['Rating']==0) && $resHi2['EmpPmsId']==0){ $rat=mysql_query("select Hod_TotalFinalRating from hrm_employee_pms where EmployeeID=".$EmployeeId." AND HR_SubmitedDate='".$resHi2['SalaryChange_Date']."'",$con); $roww=mysql_num_rows($rat); if($roww>0){ $resrat=mysql_fetch_assoc($rat);?>
		<td align="center" class="data"><?php echo $resrat['Hod_TotalFinalRating']; ?></td>
		<?php } if($roww==0){ ?><td align="center" class="data">0.00</td><?php } ?>
		
		<?php }else{ ?>
		<td align="center" class="data"><?php echo $resHi2['Rating']; ?></td>
		<?php } ?>	
	   </tr> 
	     	
<?php } $Sno2++; } $Sno=$Sno2; ?>	     	   
<?php $sqlHi=mysql_query("select SalaryChange_Date, Current_Designation, Current_Grade, Previous_GrossSalaryPM, Prop_PeInc_GSPM, Rating from hrm_pms_appraisal_history where EmpCode=".$resE['EmpCode']." AND CompanyId=".$resE['CompanyId']." AND SalaryChange_Date<'".date('2012-01-01')."' order by SalaryChange_Date DESC", $con); 
       while($resHi=mysql_fetch_array($sqlHi)){ ?>	
       <tr bgcolor="#FFFFFF" style="height:22px;">
		<td align="center" class="data"><?php echo $Sno; ?></td>
		<td align="center" class="data"><?php echo date("d-m-Y",strtotime($resHi['SalaryChange_Date'])); ?></td>
		<td align="" class="data" style="text-transform:uppercase;" valign="top">&nbsp;<?php echo $resHi['Current_Designation']; ?></td>
		<td align="center" class="data"><?php echo $resHi['Current_Grade']; ?></td>
		<td align="right" class="data"><?php echo '0'; ?>&nbsp;</td>
		<td align="right" class="data"><?php echo $resHi['Previous_GrossSalaryPM']; ?>&nbsp;</td>
		<td align="center" class="data"><?php echo $resHi['Prop_PeInc_GSPM']; ?></td>
                <td align="center" class="data"><?php echo $resHi['Rating']; ?></td>	
	   </tr>   	
<?php $Sno++; } ?>	 
 
	  </table>
	</td>
  </tr>
  <tr><td>&nbsp;</td></tr>
  <tr><td align="" valign="top" style="width:900px;font-size:16px;font-family:Times New Roman;">&nbsp;<b>Previous Employers</b></td></tr>
  <tr>
    <td style="vertical-align:top;width:900px;" valign="top">
	  <table border="1">
	   <tr bgcolor="#7a6189" style="height:22px;">
		<td align="center" class="head" style="color:#FFFFFF;width:50px;">SNo</td>
		<td align="center" class="head" style="color:#FFFFFF;width:200px;">Company</td>
		<td align="center" class="head" style="color:#FFFFFF;width:350px;">Designation</td>
		<td align="center" class="head" style="color:#FFFFFF;width:80px;">From_Date</td>
		<td align="center" class="head" style="color:#FFFFFF;width:80px;">To_Date</td>
		<td align="center" class="head" style="color:#FFFFFF;width:60px;">Duration</td>	
	   </tr>
<?php $sqlEx=mysql_query("select * from hrm_employee_experience where EmployeeID=".$EmployeeId." order by ExpFromDate DESC", $con); 
      $Sno2=1; while($resEx=mysql_fetch_array($sqlEx)){ ?>	
       <tr bgcolor="#FFFFFF" style="height:22px;">
		<td align="center" class="data" style="width:50px;"><?php echo $Sno2; ?></td>
		<td align="" class="data" style="width:200px;text-transform:uppercase;">&nbsp;<?php echo $resEx['ExpComName']; ?></td>
		<td align="" class="data" style="width:350px;text-transform:uppercase;" valign="top">&nbsp;<?php echo $resEx['ExpDesignation']; ?></td>
		<td align="center" class="data" style="width:80px;">
		<?php if($resEx['ExpFromDate']=='0000-00-00' OR $resEx['ExpFromDate']=='1970-01-01') { echo ''; }else {echo date("d-m-Y",strtotime($resEx['ExpFromDate'])); } ?></td>
		<td align="center" class="data" style="width:80px;">
		<?php if($resEx['ExpToDate']=='0000-00-00' OR $resEx['ExpToDate']=='1970-01-01') { echo ''; }else {echo date("d-m-Y",strtotime($resEx['ExpToDate'])); }?></td>
		<td align="center" class="data" style="width:60px;"><?php if($resEx['ExpTotalYear']==0){echo '';}else { echo $resEx['ExpTotalYear'].' year'; } ?></td>	
	   </tr>   	
<?php $Sno2++; } ?>	   
	  </table>
	</td>
  </tr>
  <tr><td>&nbsp;</td></tr>
  <tr><td align="" valign="top" style="width:900px;font-size:16px;font-family:Times New Roman;">&nbsp;<b>Developmental Progress</b></td></tr>
  <tr><td align="" valign="top" style="width:900px;font-size:16px;font-family:Times New Roman;">&nbsp;<b style="color:#005CB9;">(A)Training Programs</b></td></tr>
  <tr>
    <td style="vertical-align:top;width:900px;" valign="top">
	  <table border="1">
	   <tr bgcolor="#7a6189" style="height:22px;">
		<td align="center" class="head" style="color:#FFFFFF;width:50px;">SNo</td>
		<td align="center" class="head" style="color:#FFFFFF;width:200px;">Subject</td>
		<td align="center" class="head" style="color:#FFFFFF;width:80px;">Date</td>
		<td align="center" class="head" style="color:#FFFFFF;width:60px;">Duration</td>
		<td align="center" class="head" style="color:#FFFFFF;width:160px;">Institute</td>
		<td align="center" class="head" style="color:#FFFFFF;width:163px;">Trainer</td>	
		<td align="center" class="head" style="color:#FFFFFF;width:100px;">Location</td>
	   </tr>
<?php $sqlTr=mysql_query("select c.* from hrm_company_training_participant tp inner join hrm_company_training c on tp.TrainingId=c.TrainingId where EmployeeID=".$EmployeeId." order by c.TraFrom DESC", $con); 
$sn=1; while($resTr=mysql_fetch_array($sqlTr)){ ?> 	   
	   <tr bgcolor="#FFFFFF" style="height:22px;">
		<td align="center" class="data" style="width:50px;"><?php echo $sn; ?></td>
		<td align="" class="data" style="width:200px;text-transform:uppercase;">&nbsp;<?php echo $resTr['TraTitle']; ?></td>
		<td align="center" class="data" style="width:80px;"><?php echo date("d-m-Y",strtotime($resTr['TraFrom'])); ?></td>
		<td align="center" class="data" style="width:60px;"><?php echo $resTr['Duration']; ?></td>
		<td align="" class="data" style="width:160px;text-transform:uppercase;">&nbsp;<?php echo $resTr['Institute']; ?></td>
		<td align="" class="data" style="width:163px;text-transform:uppercase;">&nbsp;<?php echo $resTr['TrainerName']; ?></td>	
		<td align="" class="data" style="width:100px;text-transform:uppercase;">&nbsp;<?php echo $resTr['Location']; ?></td>
	   </tr>
<?php $sn++; } ?>	   
	  </table>
	</td>
  </tr>
  <tr><td align="" valign="top" style="width:900px;font-size:16px;font-family:Times New Roman;">&nbsp;<b style="color:#005CB9;">(B)Conference Attended</b></td></tr>
  <tr>
    <td style="vertical-align:top;width:900px;" valign="top">
	  <table border="1">
	   <tr bgcolor="#7a6189" style="height:22px;">
		<td align="center" class="head" style="color:#FFFFFF;width:50px;">SNo</td>
		<td align="center" class="head" style="color:#FFFFFF;width:265px;">Tital</td>
		<td align="center" class="head" style="color:#FFFFFF;width:80px;">Date</td>
		<td align="center" class="head" style="color:#FFFFFF;width:60px;">Duration</td>
		<td align="center" class="head" style="color:#FFFFFF;width:265px;">Conduct by </td>
		<td align="center" class="head" style="color:#FFFFFF;width:100px;">Location</td>	
	   </tr>
<?php $sqlConf=mysql_query("select c.* from hrm_company_conference_participant cp inner join hrm_company_conference c on cp.ConferenceId=c.ConferenceId where EmployeeID=".$EmployeeId." order by c.ConfFrom DESC", $con); 
      $sn2=1; while($resConf=mysql_fetch_array($sqlConf)){ ?>	
	   <tr bgcolor="#FFFFFF" style="height:22px;">
		<td align="center" class="data" style="width:50px;"><?php echo $sn2; ?></td>
		<td align="" class="data" style="width:265px;text-transform:uppercase;">&nbsp;<?php echo $resConf['ConfTitle']; ?></td>
		<td align="center" class="data" style="width:80px;"><?php echo date("d-m-Y",strtotime($resConf['ConfFrom'])); ?></td>
		<td align="center" class="data" style="width:60px;"><?php echo $resConf['Duration']; ?></td>
		<td align="" class="data" style="width:265px;text-transform:uppercase;">&nbsp;<?php echo $resConf['ConductedBy']; ?></td>
		<td align="" class="data" style="width:100px;text-transform:uppercase;">&nbsp;<?php echo $resConf['Location']; ?></td>	
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
