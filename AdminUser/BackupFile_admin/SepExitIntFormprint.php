<?php require_once('../AdminUser/config/config.php'); ?>
<?php $sqlSE=mysql_query("select * from hrm_employee_separation where EmpSepId=".$_REQUEST['si'], $con); $resSE=mysql_fetch_assoc($sqlSE); ?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title><?php include_once('../Title.php'); ?>t</title>
<style> .font { color:#ffffff; font-family:Georgia; font-size:12px;} .font5 { color:#000066; font-family:Georgia; font-size:16px;}
.font2 { color:#thrthr; font-family:Georgia; font-size:13px;}.font4 { color:#1FAD34; font-family:Georgia; font-size:15px;}
.input { background-color:#F9F2FF; width:90px;text-align:center;height:20px;vertical-align:middle;}
.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;} .TableHead { font-family:Times New Roman; color:#FFFFFF; font-size:15px; }
.TableHead1 { font-family:Times New Roman; color:#000000; background-color:#FFFFFF; font-size:13px; overflow:hidden; } .InputText {font-family:Times New Roman; font-size:12px; width:100px; height:19px; }
.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}.All{font-size:11px; height:20px;} .All_30{font-size:14px;height:20px;width:30px;font-family:Times New Roman;}.All_40{font-size:14px;height:20px;width:40px;font-family:Times New Roman;} .All_60{font-size:14px;height:20px;width:50px;font-family:Times New Roman;} .All_50{font-size:14px;height:20px;width:70px;font-family:Times New Roman;} .All_500{font-size:15px;height:20px;width:500px;font-family:Times New Roman;}</style>
<script type="text/javascript" language="javascript">
function printp(){ window.print(); }
</script>
</head>
<body bgcolor="#E0DBE3" onload="printp()">
<?php 
$sqlE=mysql_query("select EmpCode,Fname,Sname,Lname,DesigId,DepartmentId,DR,Gender,Married from hrm_employee INNER JOIN hrm_employee_general ON hrm_employee.EmployeeID=hrm_employee_general.EmployeeID INNER JOIN hrm_employee_personal ON hrm_employee.EmployeeID=hrm_employee_personal.EmployeeID where hrm_employee.EmployeeID=".$resSE['EmployeeID'], $con); $resE=mysql_fetch_assoc($sqlE); 
$sqlDept=mysql_query("select DepartmentCode from hrm_department where DepartmentId=".$resE['DepartmentId'], $con); $resDept=mysql_fetch_assoc($sqlDept);
if($resE['DR']=='Y'){$M='Dr.';} elseif($resE['Gender']=='M'){$M='Mr.';} elseif($resE['Gender']=='F' AND $resE['Married']=='Y'){$M='Mrs.';} elseif($resE['Gender']=='F' AND $resE['Married']=='N'){$M='Miss.';}  $NameE=$M.' '.$resE['Fname'].' '.$resE['Sname'].' '.$resE['Lname'];
?>
<table>
<tr>
<td>
<td>
<form enctype="multipart/form-data" name="form2name" method="post" onSubmit="return validate2(this)">
 <table>
  <tr><td class="Text" style="">&nbsp;<b>EC :&nbsp;<?php echo $resE['EmpCode']; ?>/&nbsp;&nbsp;Name :&nbsp;<?php echo $NameE; ?></b></td></tr>
  <tr><td class="Text2" style="color:#006200;" align="center"><b>EXIT INTERVIEW FORM</b></td></tr>
 <tr>
  <td>
   <table border="1">
    <tr bgcolor="#7a6189">
      <td align="center" style="color:#FFFFFF;" class="All_30"><b>Rank</b></td>
	  <td align="center" style="color:#FFFFFF;" class="All_500"><b>Reason</b></td>
	  <td align="center" style="color:#FFFFFF;" class="All_40"><b>4</b></td>
	  <td align="center" style="color:#FFFFFF;" class="All_40"><b>3</b></td>
	  <td align="center" style="color:#FFFFFF;" class="All_40"><b>2</b></td>	
	  <td align="center" style="color:#FFFFFF;" class="All_40"><b>1</b></td>	
    </tr>
<?php $sql=mysql_query("select hrm_employee_separation_exitint.*, Emp_ExitInt from hrm_employee_separation_exitint INNER JOIN hrm_employee_separation ON hrm_employee_separation_exitint.EmpSepId=hrm_employee_separation.EmpSepId where hrm_employee_separation.EmpSepId=".$_REQUEST['si'], $con); 
$row=mysql_num_rows($sql); if($row>0){$res=mysql_fetch_assoc($sql);} ?>	
	<tr bgcolor="#FFFFFF">
      <td align="center" style="" class="All_30" bgcolor="#FFFFD7"><b>I</b></td>
	  <td colspan="6" align="" style="font-size:14px;height:20px;width:660px;font-family:Times New Roman;" bgcolor="#FFFFD7">&nbsp;<b>PERSONAL&nbsp;<font color="#FF0000">*</font></b></td>
    </tr>
	<tr bgcolor="#FFFFFF">
      <td align="center" style="" class="All_30">&nbsp;</td>
	  <td align="" style="" class="All_500">&nbsp;a)&nbsp;Family related issues<input type="hidden" name="FRI" id="FRI" value="<?php if($row>0){echo $res['FRI'];}else{echo 0;} ?>"/></td>
	  <td align="center"><input type="checkbox" id="FRI_4" onClick="FunFRI(4)" <?php if($res['FRI']==4){echo 'checked';} ?>/></td>
	  <td align="center"><input type="checkbox" id="FRI_3" onClick="FunFRI(3)" <?php if($res['FRI']==3){echo 'checked';} ?>/></td>
	  <td align="center"><input type="checkbox" id="FRI_2" onClick="FunFRI(2)" <?php if($res['FRI']==2){echo 'checked';} ?>/></td>	
	  <td align="center"><input type="checkbox" id="FRI_1" onClick="FunFRI(1)" <?php if($res['FRI']==1){echo 'checked';} ?>/></td>	
    </tr>
	<tr bgcolor="#FFFFFF">
      <td align="center" style="" class="All_30">&nbsp;</td>
	  <td align="" style="" class="All_500">&nbsp;b)&nbsp;Health problems<input type="hidden" name="HP" id="HP" value="<?php if($row>0){echo $res['HP'];}else{echo 0;} ?>"/></td>
	  <td align="center"><input type="checkbox" id="HP_4" onClick="FunHP(4)" <?php if($res['HP']==4){echo 'checked';} ?>/></td>
	  <td align="center"><input type="checkbox" id="HP_3" onClick="FunHP(3)" <?php if($res['HP']==3){echo 'checked';} ?>/></td>
	  <td align="center"><input type="checkbox" id="HP_2" onClick="FunHP(2)" <?php if($res['HP']==2){echo 'checked';} ?>/></td>	
	  <td align="center"><input type="checkbox" id="HP_1" onClick="FunHP(1)" <?php if($res['HP']==1){echo 'checked';} ?>/></td>	
    </tr>
	<tr bgcolor="#FFFFFF">
      <td align="center" style="" class="All_30">&nbsp;</td>
	  <td align="" style="" class="All_500">&nbsp;c)&nbsp;Own business<input type="hidden" name="OB" id="OB" value="<?php if($row>0){echo $res['OB'];}else{echo 0;} ?>"/></td>
	  <td align="center"><input type="checkbox" id="OB_4" onClick="FunOB(4)" <?php if($res['OB']==4){echo 'checked';} ?>/></td>
	  <td align="center"><input type="checkbox" id="OB_3" onClick="FunOB(3)" <?php if($res['OB']==3){echo 'checked';} ?>/></td>
	  <td align="center"><input type="checkbox" id="OB_2" onClick="FunOB(2)" <?php if($res['OB']==2){echo 'checked';} ?>/></td>	
	  <td align="center"><input type="checkbox" id="OB_1" onClick="FunOB(1)" <?php if($res['OB']==1){echo 'checked';} ?>/></td>	
    </tr>
	<tr bgcolor="#FFFFFF">
      <td align="center" style="" class="All_30" bgcolor="#FFFFD7"><b>II</b></td>
	  <td colspan="6" align="" style="font-size:14px;height:20px;width:660px;font-family:Times New Roman;" bgcolor="#FFFFD7">&nbsp;<b>PROFESSIONAL GROWTH RELATED&nbsp;<font color="#FF0000">*</font></b></td>
    </tr>
	<tr bgcolor="#FFFFFF">
      <td align="center" style="" class="All_30">&nbsp;</td>
	  <td align="" style="" class="All_500">&nbsp;a)&nbsp;Inadequate training and development activities.<input type="hidden" name="PGR" id="PGR" value="<?php if($row>0){echo $res['PGR'];}else{echo 0;} ?>"/></td>
	  <td align="center"><input type="checkbox" id="PGR_4" onClick="FunPGR(4)" <?php if($res['PGR']==4){echo 'checked';} ?>/></td>
	  <td align="center"><input type="checkbox" id="PGR_3" onClick="FunPGR(3)" <?php if($res['PGR']==3){echo 'checked';} ?>/></td>
	  <td align="center"><input type="checkbox" id="PGR_2" onClick="FunPGR(2)" <?php if($res['PGR']==2){echo 'checked';} ?>/></td>	
	  <td align="center"><input type="checkbox" id="PGR_1" onClick="FunPGR(1)" <?php if($res['PGR']==1){echo 'checked';} ?>/></td>	
    </tr>
	<tr bgcolor="#FFFFFF">
      <td align="center" style="" class="All_30">&nbsp;</td>
	  <td align="" style="" class="All_500">&nbsp;b)&nbsp;Lack of challenge in the work.<input type="hidden" name="LOC" id="LOC" value="<?php if($row>0){echo $res['LOC'];}else{echo 0;} ?>"/></td>
	  <td align="center"><input type="checkbox" id="LOC_4" onClick="FunLOC(4)" <?php if($res['LOC']==4){echo 'checked';} ?>/></td>
	  <td align="center"><input type="checkbox" id="LOC_3" onClick="FunLOC(3)" <?php if($res['LOC']==3){echo 'checked';} ?>/></td>
	  <td align="center"><input type="checkbox" id="LOC_2" onClick="FunLOC(2)" <?php if($res['LOC']==2){echo 'checked';} ?>/></td>	
	  <td align="center"><input type="checkbox" id="LOC_1" onClick="FunLOC(1)" <?php if($res['LOC']==1){echo 'checked';} ?>/></td>	
    </tr>
	<tr bgcolor="#FFFFFF">
      <td align="center" style="" class="All_30">&nbsp;</td>
	  <td align="" style="" class="All_500">&nbsp;c)&nbsp;Low Promotional opportunities.<input type="hidden" name="LPO" id="LPO" value="<?php if($row>0){echo $res['LPO'];}else{echo 0;} ?>"/></td>
	  <td align="center"><input type="checkbox" id="LPO_4" onClick="FunLPO(4)" <?php if($res['LPO']==4){echo 'checked';} ?>/></td>
	  <td align="center"><input type="checkbox" id="LPO_3" onClick="FunLPO(3)" <?php if($res['LPO']==3){echo 'checked';} ?>/></td>
	  <td align="center"><input type="checkbox" id="LPO_2" onClick="FunLPO(2)" <?php if($res['LPO']==2){echo 'checked';} ?>/></td>	
	  <td align="center"><input type="checkbox" id="LPO_1" onClick="FunLPO(1)" <?php if($res['LPO']==1){echo 'checked';} ?>/></td>		
    </tr>
	<tr bgcolor="#FFFFFF">
      <td align="center" style="" class="All_30">&nbsp;</td>
	  <td align="" style="" class="All_500">&nbsp;d)&nbsp;Job allotted not matching with job aspirations.<input type="hidden" name="JANM" id="JANM" value="<?php if($row>0){echo $res['JANM'];}else{echo 0;} ?>"/></td>
	  <td align="center"><input type="checkbox" id="JANM_4" onClick="FunJANM(4)" <?php if($res['JANM']==4){echo 'checked';} ?>/></td>
	  <td align="center"><input type="checkbox" id="JANM_3" onClick="FunJANM(3)" <?php if($res['JANM']==3){echo 'checked';} ?>/></td>
	  <td align="center"><input type="checkbox" id="JANM_2" onClick="FunJANM(2)" <?php if($res['JANM']==2){echo 'checked';} ?>/></td>	
	  <td align="center"><input type="checkbox" id="JANM_1" onClick="FunJANM(1)" <?php if($res['JANM']==1){echo 'checked';} ?>/></td>	
    </tr>
	<tr bgcolor="#FFFFFF">
      <td align="center" style="" class="All_30">&nbsp;</td>
	  <td align="" style="" class="All_500">&nbsp;e)&nbsp;Better job/ better prospects<input type="hidden" name="BJBP" id="BJBP" value="<?php if($row>0){echo $res['BJBP'];}else{echo 0;} ?>"/></td>
	  <td align="center"><input type="checkbox" id="BJBP_4" onClick="FunBJBP(4)" <?php if($res['BJBP']==4){echo 'checked';} ?>/></td>
	  <td align="center"><input type="checkbox" id="BJBP_3" onClick="FunBJBP(3)" <?php if($res['BJBP']==3){echo 'checked';} ?>/></td>
	  <td align="center"><input type="checkbox" id="BJBP_2" onClick="FunBJBP(2)" <?php if($res['BJBP']==2){echo 'checked';} ?>/></td>	
	  <td align="center"><input type="checkbox" id="BJBP_1" onClick="FunBJBP(1)" <?php if($res['BJBP']==1){echo 'checked';} ?>/></td>	
    </tr>
	<tr bgcolor="#FFFFFF">
      <td align="center" style="" class="All_30">&nbsp;</td>
	  <td align="" style="" class="All_500">&nbsp;f)&nbsp;Higher studies<input type="hidden" name="HS" id="HS" value="<?php if($row>0){echo $res['HS'];}else{echo 0;} ?>"/></td>
	  <td align="center"><input type="checkbox" id="HS_4" onClick="FunHS(4)" <?php if($res['HS']==4){echo 'checked';} ?>/></td>
	  <td align="center"><input type="checkbox" id="HS_3" onClick="FunHS(3)" <?php if($res['HS']==3){echo 'checked';} ?>/></td>
	  <td align="center"><input type="checkbox" id="HS_2" onClick="FunHS(2)" <?php if($res['HS']==2){echo 'checked';} ?>/></td>	
	  <td align="center"><input type="checkbox" id="HS_1" onClick="FunHS(1)" <?php if($res['HS']==1){echo 'checked';} ?>/></td>		
    </tr>	
	<tr bgcolor="#FFFFFF">
      <td align="center" style="" class="All_30" bgcolor="#FFFFD7"><b>III</b></td>
	  <td colspan="6" align="" style="font-size:14px;height:20px;width:660px;font-family:Times New Roman;" bgcolor="#FFFFD7">&nbsp;<b>PROFESSIONAL ATMOSPHERE CONDITIONS&nbsp;<font color="#FF0000">*</font></b></td>
    </tr>
	<tr bgcolor="#FFFFFF">
      <td align="center" style="" class="All_30">&nbsp;</td>
	  <td align="" style="" class="All_500">&nbsp;a)&nbsp;Lack of clarity on policies<input type="hidden" name="LOCOP" id="LOCOP" value="<?php if($row>0){echo $res['LOCOP'];}else{echo 0;} ?>"/></td>
	  <td align="center"><input type="checkbox" id="LOCOP_4" onClick="FunLOCOP(4)" <?php if($res['LOCOP']==4){echo 'checked';} ?>/></td>
	  <td align="center"><input type="checkbox" id="LOCOP_3" onClick="FunLOCOP(3)" <?php if($res['LOCOP']==3){echo 'checked';} ?>/></td>
	  <td align="center"><input type="checkbox" id="LOCOP_2" onClick="FunLOCOP(2)" <?php if($res['LOCOP']==2){echo 'checked';} ?>/></td>	
	  <td align="center"><input type="checkbox" id="LOCOP_1" onClick="FunLOCOP(1)" <?php if($res['LOCOP']==1){echo 'checked';} ?>/></td>	
    </tr>
	<tr bgcolor="#FFFFFF">
      <td align="center" style="" class="All_30">&nbsp;</td>
	  <td align="" style="" class="All_500">&nbsp;b)&nbsp;Insecurity and uncertainty in day-to-day working<input type="hidden" name="IAU" id="IAU" value="<?php if($row>0){echo $res['IAU'];}else{echo 0;} ?>"/></td>
	  <td align="center"><input type="checkbox" id="IAU_4" onClick="FunIAU(4)" <?php if($res['IAU']==4){echo 'checked';} ?>/></td>
	  <td align="center"><input type="checkbox" id="IAU_3" onClick="FunIAU(3)" <?php if($res['IAU']==3){echo 'checked';} ?>/></td>
	  <td align="center"><input type="checkbox" id="IAU_2" onClick="FunIAU(2)" <?php if($res['IAU']==2){echo 'checked';} ?>/></td>	
	  <td align="center"><input type="checkbox" id="IAU_1" onClick="FunIAU(1)" <?php if($res['IAU']==1){echo 'checked';} ?>/></td>	
    </tr>
	<tr bgcolor="#FFFFFF">
      <td align="center" style="" class="All_30">&nbsp;</td>
	  <td align="" style="" class="All_500">&nbsp;c)&nbsp;Lack of communication<input type="hidden" name="LOCOM" id="LOCOM" value="<?php if($row>0){echo $res['LOCOM'];}else{echo 0;} ?>"/></td>
	  <td align="center"><input type="checkbox" id="LOCOM_4" onClick="FunLOCOM(4)" <?php if($res['LOCOM']==4){echo 'checked';} ?>/></td>
	  <td align="center"><input type="checkbox" id="LOCOM_3" onClick="FunLOCOM(3)" <?php if($res['LOCOM']==3){echo 'checked';} ?>/></td>
	  <td align="center"><input type="checkbox" id="LOCOM_2" onClick="FunLOCOM(2)" <?php if($res['LOCOM']==2){echo 'checked';} ?>/></td>	
	  <td align="center"><input type="checkbox" id="LOCOM_1" onClick="FunLOCOM(1)" <?php if($res['LOCOM']==1){echo 'checked';} ?>/></td>		
    </tr>
	<tr bgcolor="#FFFFFF">
      <td align="center" style="" class="All_30">&nbsp;</td>
	  <td align="" style="" class="All_500">&nbsp;d)&nbsp;Delays in decision-making<input type="hidden" name="DIDM" id="DIDM" value="<?php if($row>0){echo $res['DIDM'];}else{echo 0;} ?>"/></td>
	  <td align="center"><input type="checkbox" id="DIDM_4" onClick="FunDIDM(4)" <?php if($res['DIDM']==4){echo 'checked';} ?>/></td>
	  <td align="center"><input type="checkbox" id="DIDM_3" onClick="FunDIDM(3)" <?php if($res['DIDM']==3){echo 'checked';} ?>/></td>
	  <td align="center"><input type="checkbox" id="DIDM_2" onClick="FunDIDM(2)" <?php if($res['DIDM']==2){echo 'checked';} ?>/></td>	
	  <td align="center"><input type="checkbox" id="DIDM_1" onClick="FunDIDM(1)" <?php if($res['DIDM']==1){echo 'checked';} ?>/></td>	
    </tr>
	<tr bgcolor="#FFFFFF">
      <td align="center" style="" class="All_30">&nbsp;</td>
	  <td align="" style="" class="All_500">&nbsp;e)&nbsp;Unfair treatment, partiality<input type="hidden" name="UTP" id="UTP" value="<?php if($row>0){echo $res['UTP'];}else{echo 0;} ?>"/></td>
	  <td align="center"><input type="checkbox" id="UTP_4" onClick="FunUTP(4)" <?php if($res['UTP']==4){echo 'checked';} ?>/></td>
	  <td align="center"><input type="checkbox" id="UTP_3" onClick="FunUTP(3)" <?php if($res['UTP']==3){echo 'checked';} ?>/></td>
	  <td align="center"><input type="checkbox" id="UTP_2" onClick="FunUTP(2)" <?php if($res['UTP']==2){echo 'checked';} ?>/></td>	
	  <td align="center"><input type="checkbox" id="UTP_1" onClick="FunUTP(1)" <?php if($res['UTP']==1){echo 'checked';} ?>/></td>	
    </tr>
	<tr bgcolor="#FFFFFF">
      <td align="center" style="" class="All_30" bgcolor="#FFFFD7"><b>IV</b></td>
	  <td colspan="6" align="" style="font-size:14px;height:20px;width:660px;font-family:Times New Roman;" bgcolor="#FFFFD7">&nbsp;<b>PROFESSIONAL WORKING CONDITIONS&nbsp;<font color="#FF0000">*</font></b></td>
    </tr>
	<tr bgcolor="#FFFFFF">
      <td align="center" style="" class="All_30">&nbsp;</td>
	  <td align="" style="" class="All_500">&nbsp;a)&nbsp;Unclean Surroundings<input type="hidden" name="US" id="US" value="<?php if($row>0){echo $res['US'];}else{echo 0;} ?>"/></td>
	  <td align="center"><input type="checkbox" id="US_4" onClick="FunUS(4)" <?php if($res['US']==4){echo 'checked';} ?>/></td>
	  <td align="center"><input type="checkbox" id="US_3" onClick="FunUS(3)" <?php if($res['US']==3){echo 'checked';} ?>/></td>
	  <td align="center"><input type="checkbox" id="US_2" onClick="FunUS(2)" <?php if($res['US']==2){echo 'checked';} ?>/></td>	
	  <td align="center"><input type="checkbox" id="US_1" onClick="FunUS(1)" <?php if($res['US']==1){echo 'checked';} ?>/></td>	
    </tr>
	<tr bgcolor="#FFFFFF">
      <td align="center" style="" class="All_30">&nbsp;</td>
	  <td align="" style="" class="All_500">&nbsp;b)&nbsp;Hardship/ Job is too stressful<input type="hidden" name="HJ" id="HJ" value="<?php if($row>0){echo $res['HJ'];}else{echo 0;} ?>"/></td>
	  <td align="center"><input type="checkbox" id="HJ_4" onClick="FunHJ(4)" <?php if($res['HJ']==4){echo 'checked';} ?>/></td>
	  <td align="center"><input type="checkbox" id="HJ_3" onClick="FunHJ(3)" <?php if($res['HJ']==3){echo 'checked';} ?>/></td>
	  <td align="center"><input type="checkbox" id="HJ_2" onClick="FunHJ(2)" <?php if($res['HJ']==2){echo 'checked';} ?>/></td>	
	  <td align="center"><input type="checkbox" id="HJ_1" onClick="FunHJ(1)" <?php if($res['HJ']==1){echo 'checked';} ?>/></td>	
    </tr>
	<tr bgcolor="#FFFFFF">
      <td align="center" style="" class="All_30">&nbsp;</td>
	  <td align="" style="" class="All_500">&nbsp;c)&nbsp;Working hours<input type="hidden" name="WH" id="WH" value="<?php if($row>0){echo $res['WH'];}else{echo 0;} ?>"/></td>
	  <td align="center"><input type="checkbox" id="WH_4" onClick="FunWH(4)" <?php if($res['WH']==4){echo 'checked';} ?>/></td>
	  <td align="center"><input type="checkbox" id="WH_3" onClick="FunWH(3)" <?php if($res['WH']==3){echo 'checked';} ?>/></td>
	  <td align="center"><input type="checkbox" id="WH_2" onClick="FunWH(2)" <?php if($res['WH']==2){echo 'checked';} ?>/></td>	
	  <td align="center"><input type="checkbox" id="WH_1" onClick="FunWH(1)" <?php if($res['WH']==1){echo 'checked';} ?>/></td>		
    </tr>
	<tr bgcolor="#FFFFFF">
      <td align="center" style="" class="All_30">&nbsp;</td>
	  <td align="" style="" class="All_500">&nbsp;d)&nbsp;Job involves too much of travel<input type="hidden" name="JITM" id="JITM" value="<?php if($row>0){echo $res['JITM'];}else{echo 0;} ?>"/></td>
	  <td align="center"><input type="checkbox" id="JITM_4" onClick="FunJITM(4)" <?php if($res['JITM']==4){echo 'checked';} ?>/></td>
	  <td align="center"><input type="checkbox" id="JITM_3" onClick="FunJITM(3)" <?php if($res['JITM']==3){echo 'checked';} ?>/></td>
	  <td align="center"><input type="checkbox" id="JITM_2" onClick="FunJITM(2)" <?php if($res['JITM']==2){echo 'checked';} ?>/></td>	
	  <td align="center"><input type="checkbox" id="JITM_1" onClick="FunJITM(1)" <?php if($res['JITM']==1){echo 'checked';} ?>/></td>	
    </tr>
	<tr bgcolor="#FFFFFF">
      <td align="center" style="" class="All_30">&nbsp;</td>
	  <td align="" style="" class="All_500">&nbsp;e)&nbsp;Non Fulfillment of commitments by the company<input type="hidden" name="NFOC" id="NFOC" value="<?php if($row>0){echo $res['NFOC'];}else{echo 0;} ?>"/></td>
	  <td align="center"><input type="checkbox" id="NFOC_4" onClick="FunNFOC(4)" <?php if($res['NFOC']==4){echo 'checked';} ?>/></td>
	  <td align="center"><input type="checkbox" id="NFOC_3" onClick="FunNFOC(3)" <?php if($res['NFOC']==3){echo 'checked';} ?>/></td>
	  <td align="center"><input type="checkbox" id="NFOC_2" onClick="FunNFOC(2)" <?php if($res['NFOC']==2){echo 'checked';} ?>/></td>	
	  <td align="center"><input type="checkbox" id="NFOC_1" onClick="FunNFOC(1)" <?php if($res['NFOC']==1){echo 'checked';} ?>/></td>	
    </tr>	
	<tr bgcolor="#FFFFFF">
      <td align="center" style="" class="All_30" bgcolor="#FFFFD7"><b>V</b></td>
	  <td colspan="6" align="" style="font-size:14px;height:20px;width:660px;font-family:Times New Roman;" bgcolor="#FFFFD7">&nbsp;<b>PROFESSIONAL COMPENSATION RELATED&nbsp;<font color="#FF0000">*</font></b></td>
    </tr>
	<tr bgcolor="#FFFFFF">
      <td align="center" style="" class="All_30">&nbsp;</td>
	  <td align="" style="" class="All_500">&nbsp;a)&nbsp;Inadequate pay & Increments in relation to the industry<input type="hidden" name="IPI" id="IPI" value="<?php if($row>0){echo $res['IPI'];}else{echo 0;} ?>"/></td>
	  <td align="center"><input type="checkbox" id="IPI_4" onClick="FunIPI(4)" <?php if($res['IPI']==4){echo 'checked';} ?>/></td>
	  <td align="center"><input type="checkbox" id="IPI_3" onClick="FunIPI(3)" <?php if($res['IPI']==3){echo 'checked';} ?>/></td>
	  <td align="center"><input type="checkbox" id="IPI_2" onClick="FunIPI(2)" <?php if($res['IPI']==2){echo 'checked';} ?>/></td>	
	  <td align="center"><input type="checkbox" id="IPI_1" onClick="FunIPI(1)" <?php if($res['IPI']==1){echo 'checked';} ?>/></td>	
    </tr>
	<tr bgcolor="#FFFFFF">
      <td align="center" style="" class="All_30">&nbsp;</td>
	  <td align="" style="" class="All_500">&nbsp;b)&nbsp;Inadequate incentives and bonus<input type="hidden" name="IIAB" id="IIAB" value="<?php if($row>0){echo $res['IIAB'];}else{echo 0;} ?>"/></td>
	  <td align="center"><input type="checkbox" id="IIAB_4" onClick="FunIIAB(4)" <?php if($res['IIAB']==4){echo 'checked';} ?>/></td>
	  <td align="center"><input type="checkbox" id="IIAB_3" onClick="FunIIAB(3)" <?php if($res['IIAB']==3){echo 'checked';} ?>/></td>
	  <td align="center"><input type="checkbox" id="IIAB_2" onClick="FunIIAB(2)" <?php if($res['IIAB']==2){echo 'checked';} ?>/></td>	
	  <td align="center"><input type="checkbox" id="IIAB_1" onClick="FunIIAB(1)" <?php if($res['IIAB']==1){echo 'checked';} ?>/></td>	
    </tr>
	<tr bgcolor="#FFFFFF">
      <td align="center" style="" class="All_30" bgcolor="#FFFFD7"><b>VI</b></td>
	  <td colspan="6" align="" style="font-size:14px;height:20px;width:660px;font-family:Times New Roman;" bgcolor="#FFFFD7">&nbsp;<b>PROFESSIONAL ROLE RELATED&nbsp;<font color="#FF0000">*</font></b></td>
    </tr>
	<tr bgcolor="#FFFFFF">
      <td align="center" style="" class="All_30">&nbsp;</td>
	  <td align="" style="" class="All_500">&nbsp;a)&nbsp;Ambiguous role<input type="hidden" name="AR" id="AR" value="<?php if($row>0){echo $res['AR'];}else{echo 0;} ?>"/></td>
	  <td align="center"><input type="checkbox" id="AR_4" onClick="FunAR(4)" <?php if($res['AR']==4){echo 'checked';} ?>/></td>
	  <td align="center"><input type="checkbox" id="AR_3" onClick="FunAR(3)" <?php if($res['AR']==3){echo 'checked';} ?>/></td>
	  <td align="center"><input type="checkbox" id="AR_2" onClick="FunAR(2)" <?php if($res['AR']==2){echo 'checked';} ?>/></td>	
	  <td align="center"><input type="checkbox" id="AR_1" onClick="FunAR(1)" <?php if($res['AR']==1){echo 'checked';} ?>/></td>	
    </tr>
	<tr bgcolor="#FFFFFF">
      <td align="center" style="" class="All_30">&nbsp;</td>
	  <td align="" style="" class="All_500">&nbsp;b)&nbsp;No clarity in reporting relations<input type="hidden" name="NCIR" id="NCIR" value="<?php if($row>0){echo $res['NCIR'];}else{echo 0;} ?>"/></td>
	  <td align="center"><input type="checkbox" id="NCIR_4" onClick="FunNCIR(4)" <?php if($res['NCIR']==4){echo 'checked';} ?>/></td>
	  <td align="center"><input type="checkbox" id="NCIR_3" onClick="FunNCIR(3)" <?php if($res['NCIR']==3){echo 'checked';} ?>/></td>
	  <td align="center"><input type="checkbox" id="NCIR_2" onClick="FunNCIR(2)" <?php if($res['NCIR']==2){echo 'checked';} ?>/></td>	
	  <td align="center"><input type="checkbox" id="NCIR_1" onClick="FunNCIR(1)" <?php if($res['NCIR']==1){echo 'checked';} ?>/></td>	
    </tr>	
	<tr bgcolor="#FFFFFF">
      <td align="center" style="" class="All_30" bgcolor="#FFFFD7"><b>VII</b></td>
	  <td align="" style="" class="All_500" bgcolor="#FFFFD7">&nbsp;<b>OTHERS</b>&nbsp;{state reason not covered above}<input type="hidden" name="OTH" id="OTH" value="<?php if($row>0){echo $res['OTH'];}else{echo 0;} ?>"/></td>
	  <td align="center"><input type="checkbox" id="OTH_4" onClick="FunOTH(4)" <?php if($res['OTH']==4){echo 'checked';} ?>/></td>
	  <td align="center"><input type="checkbox" id="OTH_3" onClick="FunOTH(3)" <?php if($res['OTH']==3){echo 'checked';} ?>/></td>
	  <td align="center"><input type="checkbox" id="OTH_2" onClick="FunOTH(2)" <?php if($res['OTH']==2){echo 'checked';} ?>/></td>	
	  <td align="center"><input type="checkbox" id="OTH_1" onClick="FunOTH(1)" <?php if($res['OTH']==1){echo 'checked';} ?>/></td>	
    </tr>
   </table>
  </td>
 </tr>
 <tr><td style="height:20px;">&nbsp;</td></tr>
 <tr><td style="width:690px;font-family:Times New Roman;font-size:16px;" align="center"><b>Kindly fill in the given questions</b></td></tr>
 <tr bgcolor="#FFFFFF">
   <td style="width:690px;">
    <table style="width:690px;" border="1">
	 <tr><td colspan="2" style="font-size:14px;font-family:Times New Roman;width:690px;" bgcolor="#FFFFD7"><b>1.</b> What are your primary reasons for leaving?&nbsp;<font color="#FF0000">*</font></td></tr> 
	 <tr>
	   <td rowspan="2" style="" class="All_30" bgcolor="#FFFFFF" valign="top"><b>Ans.</b></td>
	   <td style="" bgcolor="#FFFFFF"><input name="Q1_1" style="width:660px; border-style:hidden;" value="<?php echo $res['Q1_1']; ?>" maxlength="250"/></td>
	 </tr>
	 <tr><td style="" bgcolor="#FFFFFF"><input name="Q1_2" style="width:660px; border-style:hidden;" value="<?php echo $res['Q1_2']; ?>" maxlength="250"/></td></tr>
	 <tr><td colspan="2" style="font-size:14px;font-family:Times New Roman;width:690px;" bgcolor="#FFFFD7"><b>2.</b> What did you find most satisfying about your job?&nbsp;<font color="#FF0000">*</font></td></tr> 
	 <tr>
	   <td rowspan="2" style="" class="All_30" bgcolor="#FFFFFF" valign="top"><b>Ans.</b></td>
	   <td style="" bgcolor="#FFFFFF"><input name="Q2_1" style="width:660px; border-style:hidden;" value="<?php echo $res['Q2_1']; ?>" maxlength="250"/></td>
	 </tr>
	 <tr><td style="" bgcolor="#FFFFFF"><input name="Q2_2" style="width:660px; border-style:hidden;" value="<?php echo $res['Q2_2']; ?>" maxlength="250"/></td></tr>
	 <tr><td colspan="2" style="font-size:14px;font-family:Times New Roman;width:690px;" bgcolor="#FFFFD7"><b>3.</b> What did you find most dissatisfying regarding your job?&nbsp;<font color="#FF0000">*</font></td></tr> 
	 <tr>
	   <td rowspan="2" style="" class="All_30" bgcolor="#FFFFFF" valign="top"><b>Ans.</b></td>
	   <td style="" bgcolor="#FFFFFF"><input name="Q3_1" style="width:660px; border-style:hidden;" value="<?php echo $res['Q3_1']; ?>" maxlength="250"/></td>
	 </tr>
	 <tr><td style="" bgcolor="#FFFFFF"><input name="Q3_2" style="width:660px; border-style:hidden;" value="<?php echo $res['Q3_2']; ?>" maxlength="250"/></td></tr>
	 <tr><td colspan="2" style="font-size:14px;font-family:Times New Roman;width:690px;" bgcolor="#FFFFD7"><b>4.</b> Were there any company policies or procedures that made your work more difficult?&nbsp;<font color="#FF0000">*</font></td></tr> 
	 <tr>
	   <td rowspan="2" style="" class="All_30" bgcolor="#FFFFFF" valign="top"><b>Ans.</b></td>
	   <td style="" bgcolor="#FFFFFF"><input name="Q4_1" style="width:660px; border-style:hidden;" value="<?php echo $res['Q4_1']; ?>" maxlength="250"/></td>
	 </tr>
	 <tr><td style="" bgcolor="#FFFFFF"><input name="Q4_2" style="width:660px; border-style:hidden;" value="<?php echo $res['Q4_2']; ?>" maxlength="250"/></td></tr>
	 <tr><td colspan="2" style="font-size:14px;font-family:Times New Roman;width:690px;" bgcolor="#FFFFD7"><b>5.</b> Is there anything the company could have done to prevent you from leaving?&nbsp;<font color="#FF0000">*</font></td></tr> 
	 <tr>
	   <td rowspan="2" style="" class="All_30" bgcolor="#FFFFFF" valign="top"><b>Ans.</b></td>
	   <td style="" bgcolor="#FFFFFF"><input name="Q5_1" style="width:660px; border-style:hidden;" value="<?php echo $res['Q5_1']; ?>" maxlength="250"/></td>
	 </tr>
	 <tr><td style="" bgcolor="#FFFFFF"><input name="Q5_2" style="width:660px; border-style:hidden;" value="<?php echo $res['Q5_2']; ?>" maxlength="250"/></td></tr>
     <tr><td colspan="2" style="font-size:14px;font-family:Times New Roman;width:690px;" bgcolor="#FFFFD7"><b>6.</b> Would you recommend this company to a friend as a good place to work?&nbsp;<font color="#FF0000">*</font></td></tr>  	 
	 <tr>
	   <td style="" class="All_30" bgcolor="#FFFFFF" valign="top"><b>Ans.</b></td>
	   <td style="" bgcolor="#FFFFFF" class="All_500">
	   &nbsp;Yes&nbsp;<input type="checkbox" id="Yes_6" onClick="funyn6('Y')" <?php if($res['Q6']=='Y'){echo 'checked';} ?>/>&nbsp;&nbsp;
	   No&nbsp;<input type="checkbox" id="No_6" onClick="funyn6('N')" <?php if($res['Q6']=='N'){echo 'checked';} ?>/>
	   <input type="hidden" id="Q6_Ans" name="Q6_Ans" value="<?php echo $res['Q6']; ?>" />
	   </td>
	 </tr>
	 <tr><td colspan="2" style="font-size:14px;font-family:Times New Roman;width:690px;" bgcolor="#FFFFD7"><b>7.</b> Would you consider returning to this company in the future?&nbsp;<font color="#FF0000">*</font></td></tr> 
	 <tr>
	   <td style="" class="All_30" bgcolor="#FFFFFF" valign="top"><b>Ans.</b></td>
	   <td style="" bgcolor="#FFFFFF" class="All_500">
	   &nbsp;Yes&nbsp;<input type="checkbox" id="Yes_7" onClick="funyn7('Y')" <?php if($res['Q7']=='Y'){echo 'checked';} ?>/>&nbsp;&nbsp;
	   No&nbsp;<input type="checkbox" id="No_7" onClick="funyn7('N')" <?php if($res['Q7']=='N'){echo 'checked';} ?>/>
	   <input type="hidden" id="Q7_Ans" name="Q7_Ans" value="<?php echo $res['Q7']; ?>" />
	   </td>
	 </tr>
	</table>
   </td>
 </tr>

 <tr><td style="height:20px;">&nbsp;</td></tr>
 <tr><td style="width:690px;font-family:Times New Roman;font-size:16px;" align="">&nbsp;<b>About your new job</b></td></tr>
 <tr>
   <td style="width:690px;">
    <table style="width:690px;" border="0">
	 <tr>
	   <td style="width:100px;">&nbsp;</td>
	   <td style="font-size:14px;font-family:Times New Roman;width:200px;">Name of the company&nbsp;<font color="#FF0000">*</font> :</td>
	   <td style="width:390px;"><input name="ComName" style="width:390px;border-style:hidden;border-bottom-style:solid;border-bottom-color:#000000;background-color:#E0DBE3;" value="<?php echo $res['ComName']; ?>" maxlength="50"/>
	   </td>
	 </tr> 
	 <tr>
	   <td style="width:100px;">&nbsp;</td>
	   <td style="font-size:14px;font-family:Times New Roman;width:200px;">Location&nbsp;<font color="#FF0000">*</font> :</td>
	   <td style="width:390px;"><input name="Location" style="width:390px;border-style:hidden;border-bottom-style:solid;border-bottom-color:#000000;background-color:#E0DBE3;" value="<?php echo $res['Location']; ?>" maxlength="100"/>
	   </td>
	 </tr>
	 <tr>
	   <td style="width:100px;">&nbsp;</td>
	   <td style="font-size:14px;font-family:Times New Roman;width:200px;">Designation&nbsp;<font color="#FF0000">*</font> :</td>
	   <td style="width:390px;"><input name="Designation" style="width:390px;border-style:hidden;border-bottom-style:solid;border-bottom-color:#000000;background-color:#E0DBE3;" value="<?php echo $res['Designation']; ?>" maxlength="50"/>
	   </td>
	 </tr> 
	 <tr>
	   <td style="width:100px;">&nbsp;</td>
	   <td style="font-size:14px;font-family:Times New Roman;width:200px;">% hike in compensation&nbsp;<font color="#FF0000">*</font> :</td>
	   <td style="width:390px;"><input name="hike" style="width:390px;border-style:hidden;border-bottom-style:solid;border-bottom-color:#000000;background-color:#E0DBE3;" value="<?php echo $res['hike']; ?>" maxlength="50"/>
	   </td>
	 </tr> 
	 <tr>
	   <td style="width:100px;">&nbsp;</td>
	   <td style="font-size:14px;font-family:Times New Roman;width:200px;">Other benefits :</td>
	   <td style="width:390px;"><input name="OthBefit" style="width:390px;border-style:hidden;border-bottom-style:solid;border-bottom-color:#000000;background-color:#E0DBE3;" value="<?php echo $res['OthBefit']; ?>" maxlength="200"/>
	   </td>
	 </tr>   
	 
	</table>
   </td>
  </tr> 
  
<?php $sql2=mysql_query("select Emp_ExitInt from hrm_employee_separation where EmployeeID=".$resSE['EmployeeID'], $con); $res2=mysql_fetch_assoc($sql2); ?>  
  	 
   </table>
  </td>
 </tr>
</table>
</form>
</td>
</tr>
</table>
</body>
</html>

