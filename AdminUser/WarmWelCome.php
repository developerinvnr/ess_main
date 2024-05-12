<?php session_start();
require_once('../AdminUser/config/config.php');  
$EmpId=$_REQUEST['EI']; 

if(isset($_POST['EditOthE']))
{ 
 $sup=mysql_query("update hrm_employee_personal set Warm_WelC_Oth='".addslashes($_POST['Warm_WelC_Oth'])."' where EmployeeID=".$EmpId,$con); 
}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="../AdminUser/css/body.css" rel="stylesheet"/>
<link type="text/css" href="../AdminUser/css/pro_dropdown_3.css" rel="stylesheet"/>
<style> .font { color:#ffffff; font-family:Georgia; font-size:11px; width:120px;} .font1 { font-family:"Times New Roman", Times, serif; font-size:11px; width:120px; } 
.font2 { font-size:11px;width:260px;height:18px;} .font4 {color:#1FAD34; font-family:Georgia; font-size:15px;}
.span {display:none; font-family:Courier New; font-size:14px; }.span1 {display:block; font-family:Courier New; font-size:14px; }
.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;}
.SaveButton {background-image:url(images/save.gif); width:20px; height:20px; background-repeat:no-repeat; background-color:#FFFFFF; border-color:#FFFFFF; border-bottom:inherit;}
.TextInput { font-family:"Times New Roman", Times, serif; font-size:11px; width:100px; height:18px;}
.redius
{
 -webkit-box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.75);
-moz-box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.75);
box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.75);
}

.redius2
{
 -webkit-box-shadow: 3px 3px 5px 0px rgba(0,0,0,0.75);
-moz-box-shadow: 3px 3px 5px 0px rgba(0,0,0,0.75);
box-shadow: 3px 3px 5px 0px rgba(0,0,0,0.75);
}

</style>
<style>.head{font-family:Times New Roman;font-size:14px;font-weight:bold;}.data{font-family:Times New Roman;font-size:14px;}</style>
<script language="javascript" type="text/javascript">
function EditOth()
{ 
 document.getElementById("EditOthE").style.display='block'; document.getElementById("ChangeOth").style.display='none'; 
 document.getElementById("Warm_WelC_Oth").disabled=false; 
}
</script>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" bgcolor="#E0DBE3">	
<?php $SqlEmp=mysql_query("select EmpCode, Fname, Sname, Lname, DepartmentName, DesigName, HqName, StateName, Gender, DR, Married, g.DepartmentId, EmpVertical, DateJoining, DOB, RepEmployeeID, Warm_WelC_Oth, e.CompanyId from hrm_employee e inner join hrm_employee_general g ON e.EmployeeID=g.EmployeeID inner join hrm_employee_personal p on e.EmployeeID=p.EmployeeID inner join hrm_designation de on g.DesigId=de.DesigId inner join hrm_department d on g.DepartmentId=d.DepartmentId inner join hrm_headquater hq on g.HqId=hq.HqId inner join hrm_state s on g.CostCenter=s.StateId where e.EmployeeID=".$EmpId, $con); 
$ResEmp=mysql_fetch_assoc($SqlEmp); 

if($ResEmp['EmpVertical']>0){ $sVert=mysql_query("select VerticalName from hrm_department_vertical where VerticalId=".$ResEmp['EmpVertical'],$con); $rVrt=mysql_fetch_assoc($sVert); $VerticalName=$rVrt['VerticalName']; }
else{ $VerticalName='';}

if($ResEmp['DR']=='Y'){$M='Dr.';} elseif($ResEmp['Gender']=='M'){$M='Mr.';} elseif($ResEmp['Gender']=='F' AND $ResEmp['Married']=='Y'){$M='Mrs.';} elseif($ResEmp['Gender']=='F' AND $ResEmp['Married']=='N'){$M='Ms.';}  
if($ResEmp['Sname']!=''){ $Ename=ucwords(strtolower($M.' '.$ResEmp['Fname'].' '.$ResEmp['Sname'].' '.$ResEmp['Lname'])); }
else{ $Ename=ucwords(strtolower($M.' '.$ResEmp['Fname'].' '.$ResEmp['Lname'])); } 

$LEC=strlen($ResEmp['EmpCode']); if($LEC==1){$EC='000'.$ResEmp['EmpCode'];} if($LEC==2){$EC='00'.$ResEmp['EmpCode'];} if($LEC==3){$EC='0'.$ResEmp['EmpCode'];} if($LEC>=4){$EC=$ResEmp['EmpCode'];}

$sqlQ=mysql_query("select Fname,Sname,Lname,DesigName,DR,Gender,Married,g.DepartmentId, EmpVertical from hrm_employee_general g inner join hrm_employee e on g.EmployeeID=e.EmployeeID inner join hrm_employee_personal p on g.EmployeeID=p.EmployeeID inner join hrm_designation de on g.DesigId=de.DesigId where g.EmployeeID=".$ResEmp['RepEmployeeID'],$con); $resQ=mysql_fetch_assoc($sqlQ); 

if($resQ['EmpVertical']>0){ $sVertR=mysql_query("select VerticalName from hrm_department_vertical where VerticalId=".$resQ['EmpVertical'],$con); $rVrtR=mysql_fetch_assoc($sVertR); $VerticalNameR=$rVrtR['VerticalName']; }
else{ $VerticalNameR='';}

if($resQ['DR']=='Y'){$MS2='Dr.';} elseif($resQ['Gender']=='M'){$MS2='Mr.';} elseif($resQ['Gender']=='F' AND $resQ['Married']=='Y'){$MS2='Mrs.';} elseif($resQ['Gender']=='F' AND $resQ['Married']=='N'){$MS2='Miss.';}
if($resQ['Sname']!=''){ $Rname=ucwords(strtolower($MS2.' '.$resQ['Fname'].' '.$resQ['Sname'].' '.$resQ['Lname'])); }
else{ $Rname=ucwords(strtolower($MS2.' '.$resQ['Fname'].' '.$resQ['Lname'])); }
?>
<input type="hidden" name="EI" id="EI" value="<?php echo $_REQUEST['EI']; ?>" />
<table style="vertical-align:top;width:900px;" align="center" border="0">
<tr>
<td>
 <table border="0" style="width:100%;font-family:Georgia;color:#000000;">
 <?php /*?> <tr><td style="width:100%;font-size:15px;" valign="top" align="right"><b>Employee Code:&nbsp;<?php echo $EC; ?></b>&nbsp;&nbsp;</td></tr><?php */?>
  
  <!-- Start Start Start Start Start Start -->
  <!-- Start Start Start Start Start Start -->
  
  <tr><td>&nbsp;</td></tr>
  <tr>
   <td style="width:100%;text-align:center;">
   <center>
   <table style="width:90%;text-align:center;" border="0">
    <tr>  
     <td style="width:100%;text-align:center;background-color:#119c83;">
<table style="width:100%;font-family:Georgia;" border="0" class="redius">
 <tr>
  <td style="width:10%;text-align:center;"><img src="../images/LogoNew.png" style="width:55px; height:65px;"/></td>
  <td style="text-align:center;font-size:25px; color:#FFFFC1;">Warm Welcome <u><?php echo date("F Y",strtotime($ResEmp['DateJoining'])); ?></u></td>
  <td style="width:10%;"></td>
 </tr>
 <tr><td colspan="3" style="text-align:center;font-size:16px;font-weight:bold;color:#FFF;"><?php echo $Ename; ?></td></tr>
 <tr>
  <td colspan="3" style="text-align:center;"><?php echo '<img border="0" style="border-radius:10%;width:105px;height:125px;" src="EmpImg'.$ResEmp['CompanyId'].'Emp/'.$ResEmp['EmpCode'].'.jpg" class="redius2"/>'; ?></td>
 </tr>
 <tr><td>&nbsp;</td></tr>
 
 <?php if($ResEmp['DepartmentId']==6 AND $ResEmp['EmpVertical']>0){ ?>
 <tr>
  <td colspan="3" style="text-align:center;font-size:15px;">
    <b><?php echo $MS.' '.$Ename; ?></b> has joined us on <b><?php echo date("d-M-Y",strtotime($ResEmp['DateJoining'])); ?></b> as a <b><?php echo $ResEmp['DesigName'].' ( '.$VerticalName.' ) - '.ucwords(strtolower($ResEmp['DepartmentName'])); ?>.</b>
  </td>
 </tr>
 <?php }else{ ?>
 <tr>
  <td colspan="3" style="text-align:center;font-size:15px;">
    <b><?php echo $MS.' '.$Ename; ?></b> has joined us on <b><?php echo date("d-M-Y",strtotime($ResEmp['DateJoining'])); ?></b> as a <b><?php echo $ResEmp['DesigName'].' ('.ucwords(strtolower($ResEmp['DepartmentName'])).')'; ?>.</b>
  </td>
 </tr>
 <?php } ?>
 
 
<?php $sqlExtQ=mysql_query("select * from hrm_employee_qualification where EmployeeID=".$EmpId." AND Specialization!='' AND Institute!='' AND MaxQuali='Y' order by QualificationId desc", $con); $rowExtQ=mysql_num_rows($sqlExtQ);  

//$sql5=mysql_query("select * from hrm_employee_qualification where EmployeeID=".$EmpId." AND Qualification='Post_Graduation' ", $con); $row5=mysql_num_rows($sql5); $res5=mysql_fetch_assoc($sql5);
//$sql4=mysql_query("select * from hrm_employee_qualification where EmployeeID=".$EmpId." AND Qualification='Graduation' ", $con); $row4=mysql_num_rows($sql4); $res4=mysql_fetch_assoc($sql4); ?>  
 
<?php if($rowExtQ>0){ ?>
 <tr><td colspan="3" style="height:15px;border:hidden;" ></td></tr> 
 <tr>
  <td colspan="3" style="text-align:center;font-size:15px;">
   <?php if($ResEmp['Gender']=='F'){echo 'She';}else{echo 'He';}?> is <?php $nn=1; while($resExtQ=mysql_fetch_assoc($sqlExtQ)){ echo '<b>'; if($resExtQ['Qualification']!='' && $resExtQ['Qualification']!='Other' && $resExtQ['Qualification']!='Post_Graduation' && $resExtQ['Qualification']!='Graduation' && $resExtQ['Qualification']!='10th' && $resExtQ['Qualification']!='12th'){echo $resExtQ['Qualification'].'('.$resExtQ['Specialization'].')';}else{ echo $resExtQ['Specialization']; } echo '</b>'; if($resExtQ['Subject']!=''){echo ' in <b>'.$resExtQ['Subject'];} echo '</b> from <b>'.$resExtQ['Institute'].'</b>'; $rowExpQ2=$rowExtQ-1; if($nn<$rowExpQ2){echo ', ';}elseif($nn==$rowExpQ2){echo ' & ';} $nn++; }
 
   //if($rowExtQ>0){echo '<b>'.$resExtQ['Qualification'].'('.$resExtQ['Specialization'].')</b> from '.$resExtQ['Institute'];} if($rowExtQ>0 && ($row5>0 || $row4>0)){echo ' & ';} if($res5['Specialization']!=''){echo '<b>'.$res5['Specialization'].'</b> from '.$res5['Institute'];} elseif($row4>0){echo '<b>'.$res4['Specialization'].'</b> from '.$res4['Institute'];} ?>.
  </td>
 </tr>
<?php } ?>
 
 <tr><td colspan="3" style="height:15px;border:hidden;"></td></tr> 
 
 <?php if($resQ['DepartmentId']==6 AND $resQ['EmpVertical']>0){ ?>
 <tr>
  <td colspan="3" style="text-align:center;font-size:15px;"><b><?php echo $Ename; ?></b> will report to <?php echo ucwords(strtolower($Rname)).' -'.$resQ['DesigName'].' ( '.$VerticalNameR.' )'; ?> and shall operate from <?php echo '<b>'.ucwords(strtolower($ResEmp['HqName'])).' ('.ucwords(strtolower($ResEmp['StateName'])).')</b>'; ?>.</td>
 </tr>
 <?php }else{ ?>
 <tr>
  <td colspan="3" style="text-align:center;font-size:15px;"><b><?php echo $Ename; ?></b> will report to <?php echo ucwords(strtolower($Rname)).' ('.$resQ['DesigName'].') '; ?> and shall operate from <?php echo '<b>'.ucwords(strtolower($ResEmp['HqName'])).' ('.ucwords(strtolower($ResEmp['StateName'])).')</b>'; ?>.</td>
 </tr>
 <?php } ?>
 

<?php $sqlExp=mysql_query("select * from hrm_employee_experience where EmployeeID=".$EmpId." AND ExpComName!='' order by ExperienceId desc ", $con); $rowExp=mysql_num_rows($sqlExp); ?>
 
 <?php if($rowExp>0){ ?> 
 <tr><td colspan="3" style="height:15px;border:hidden;"></td></tr> 
 <tr>
  <td colspan="3" style="text-align:center;font-size:15px;">
<?php if($ResEmp['Gender']=='F'){echo 'She';}else{echo 'He';}?> has earlier worked with <?php  $j=1; while($resExp=mysql_fetch_assoc($sqlExp)){ echo $resExp['ExpComName']; $rowExp2=$rowExp-1; if($j<$rowExp2){echo ', ';}elseif($j==$rowExp2){echo ' & ';} $j++; } ?>.</td>
 </tr>
 <?php } ?>
 
 <?php //if($ResEmp['Warm_WelC_Oth']!=''){ ?>
 <form name="Frmname" method="post" >
 <tr><td colspan="3" style="height:15px;border:hidden;"></td></tr> 
 <tr>
  <td>&nbsp;</td>
  <td style="text-align:center;"><textarea type="text" style="width:100%;font-family:Georgia;font-size:14px;" rows="1" Name="Warm_WelC_Oth" id="Warm_WelC_Oth" disabled="disabled"><?php echo $ResEmp['Warm_WelC_Oth']; ?></textarea></td>
  <td>&nbsp;</td>
 </tr>
 <?php if($_SESSION['User_Permission']=='Edit'){ ?>
 <tr>
  <td>&nbsp;</td>
  <td style="text-align:right;"><input type="button" name="ChangeOth" id="ChangeOth" style="width:90px;display:block;" value="edit" onClick="EditOth()"><input type="submit" name="EditOthE" id="EditOthE" style="width:90px;display:none;" value="update"></td>
  <td>&nbsp;</td>
 </tr>
 <?php } ?>
 </form>
 <?php //} ?>
 
 <?php if($ResEmp['Married']=='Y'){ $sqlF=mysql_query("select HW_SN,HusWifeName from hrm_employee_family where EmployeeID=".$EmpId." AND HusWifeName!='' ", $con); $rowF=mysql_num_rows($sqlF); if($rowF>0){ 
 $sqlF2=mysql_query("select * from hrm_employee_family2 where EmployeeID=".$EmpId." AND FamilyRelation='SON' order by Family2Id desc ", $con); $rowF2=mysql_num_rows($sqlF2); 
 $sqlF3=mysql_query("select * from hrm_employee_family2 where EmployeeID=".$EmpId." AND FamilyRelation='DAUGHTER' order by Family2Id desc ", $con); $rowF3=mysql_num_rows($sqlF3);
 $sqlF4=mysql_query("select * from hrm_employee_family2 where EmployeeID=".$EmpId." AND FamilyRelation='CHILD' order by Family2Id desc ", $con); $rowF4=mysql_num_rows($sqlF4);
 ?>
 <tr><td colspan="3" style="height:15px;border:hidden;"></td></tr> 
<tr>
   <?php if($ResEmp['Gender']=='F'){ $Sirn1='her'; $Sirn2='her'; }
        else{ $Sirn1='him'; $Sirn2='his'; } ?> 
    
  <td colspan="3" style="text-align:center;font-size:15px;"><b>We welcome <?=$Sirn1?><?php if($rowF2>0 || $rowF3>0 || $rowF4>0){ echo ', ';}else{echo ' & ';}?><?=$Sirn2?> spouse -  <?php $resF=mysql_fetch_assoc($sqlF); echo ucwords(strtolower($resF['HW_SN'])).'. '.$resF['HusWifeName']; ?>
  
  <?php $cnt=$rowF3+$rowF4;
        if($rowF2>0)
        { 
		 if($rowF3>0 || $rowF4>0 || $rowF2>=2){echo ', ';}
		 else{echo ' & ';} 
		 
		 $k=1; 
		 if($rowF2>=2){ echo 'Sons - '; }
		 else{ echo 'Son - '; }
		 while($resF2=mysql_fetch_assoc($sqlF2))
		 { 
		  echo $resF2['FamilyName']; 
		  if($k<$rowF2 && $rowF3==0 && $rowF4==0){echo ' & ';}
		  elseif($rowF3>0 && $rowF4>0){echo ', ';} 
		  $k++;
		 } 
		} 
		if($rowF3>0)
		{ 
		  if($rowF4>0 || $rowF3>1){echo ', ';}else{echo ' & ';}  
		  $l=1;
		  if($rowF3>=2){ echo 'Daughters - '; }
		  else{ echo 'Daughter - '; }
		  while($resF3=mysql_fetch_assoc($sqlF3))
		  { 
		   echo $resF3['FamilyName']; 
		   if($l<$rowF3 && $rowF4==0){echo ' & ';}
		   elseif($rowF4>0){echo ', ';} 
		   $l++;
		  } 
		} 
		if($rowF4>0)
		{ 
		  if($rowF4>1){echo ', ';}else{echo ' & ';} 
		  $m=1; 
		  if($rowF4>=2){ echo 'Childs - '; }
		  else{ echo 'Child - '; }
		  while($resF4=mysql_fetch_assoc($sqlF4))
		  { 
		   echo $resF4['FamilyName']; 
		   if($m<$rowF4){echo ' & ';} 
		   $m++;
		  } 
		} 
		?>.</b></td>
 </tr>
 <?php } } ?>
 <tr><td colspan="3" style="height:15px;border:hidden;"></td></tr>  
</table> 

     </td>
    </tr>
   </table>
   </center>
 </td>
</tr>
  
  <!-- End End End End End End-->
  <!-- End End End End End End-->
  
  
 </table>
</td>
</tr>
</table>
</body>  
</html>
