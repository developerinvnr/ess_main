<?php require_once('../AdminUser/config/config.php'); 
date_default_timezone_set('Asia/Kolkata');
?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<style>
.head{color:#000;font-family:Times New Roman;font-size:18px;font-weight:bold;}
.body{color:#00356A;font-family:Times New Roman;font-size:18px;}
.body2{color:#FFFFFF;font-family:Times New Roman;font-size:18px;color:#0000FF;}
.h{color:#000;font-family:Times New Roman;font-size:15px;font-weight:bold;text-align:center;}
.hl{color:#000;font-family:Times New Roman;font-size:15px;font-weight:bold;}
.b{color:#000;font-family:Times New Roman;font-size:15px;text-align:center;}
.bl{font-family:Times New Roman;font-size:15px;}
.fhead2{color:#000;font-family:Times New Roman;font-size:12px;font-weight:bold;text-align:center;}
.fbody2{color:#000;font-family:Times New Roman;font-size:14px;}
</style>
<script language="javascript" type="text/javascript">
function Printpage()
{
 document.getElementById("pspan").style.display='none'; 
 window.print(); window.close(); 
}
</script>
</head> <!--style="background-image:url(images/pmsback.png);"-->
<body onLoad="FunCal()" style="background-image:url(images/pmsback.png);">
<?php 
$sqlE=mysql_query("select EmpCode,Fname,Sname,Lname,CompanyId from hrm_employee where EmployeeID=".$_REQUEST['EmpId'],$con); 
$resE=mysql_fetch_array($sqlE); $sqlKey=mysql_query("select * from hrm_pms_key where Person='emp' AND CompanyId=".$resE['CompanyId'], $con); $resKey=mysql_fetch_assoc($sqlKey); 
?>   
<table border="0" width="100%">
<tr>
 <td width="100%">
 <table border="0" width="100%" cellspacing="0">
  <tr><td align="center" class="head"><u>APPRAISAL FORM</u></td></tr>
  <tr><td></td></tr>
  <tr>
   <td class="head" align="center">
   &nbsp;EmpCode :&nbsp;<font class="body2"><?php echo $resE['EmpCode']; ?></font>
   &nbsp;&nbsp;Name :&nbsp;<font class="body2"><?php echo ucfirst(strtolower($resE['Fname'].' '.$resE['Sname'].' '.$resE['Lname'])); ?></font>&nbsp;&nbsp;Date-Time :&nbsp;<font class="body2"><?php echo date("d-m-Y h:i:s"); ?></font>
   <span id="pspan">&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" onClick="Printpage()" class="bl" style="text-decoration:none;"><img src="images/printer.png" border="0" />Print</a></span>
   </td>
  </tr>
 </table>
 </td>
</tr>
<tr><td style="height:10px;">&nbsp;</td></tr>
<tr>
 <td style="width:100%;">
 <table border="0" style="width:100%;">
  <tr>
   <td style="width:100%;">
   <table border="0" cellspacing="0">
    <tr><td class="body"><b><i>(Achievement)</i></b></td></tr>
    <tr>
	 <td>
     <table border="1" style="width:100%;" cellspacing="0">
<?php $sqlAc=mysql_query("select * from hrm_employee_pms_achivement where EmpPmsId=".$_REQUEST['PmsId']." order by AchivementId ASC", $con); $SnoB=1; while($resAc=mysql_fetch_array($sqlAc)){?>   
     <tr bgcolor="#FFF" style="height:22px;">	   
      <td class="h" style="width:3%;background-color:#FFFF6C;" valign="top"><?php echo $SnoB; ?></td>	  
	  <td class="bl" style="width:97%;background-color:#FFFFFF;">&nbsp;<?php echo $resAc['Achivement']; ?></td>  
    </tr>
<?php $SnoB++;} ?>
    </table>
    </td>
   </tr>
   <tr><td style="height:30px;">&nbsp;</td></tr> 
   
   <tr><td class="body"><b><i>(Feedback)</i></b></td></tr>
    <tr>
	 <td>
     <table border="1" style="width:100%;" cellspacing="0">
<?php $sqlW=mysql_query("select * from hrm_employee_pms_workenvironment where EmpPmsId=".$_REQUEST['PmsId']." order by EmpWorkEnvId ASC", $con); $Sno=1; while($resW=mysql_fetch_array($sqlW)){?>   
     <tr bgcolor="#FFF" style="height:22px;">	   
      <td class="h" style="width:3%;background-color:#FFFF6C;" valign="top"><?php echo $Sno; ?></td>	  
	  <td class="bl" style="width:97%;background-color:#C5FF8A;">&nbsp;<?php echo $resW['WorkEnvironment']; ?></td>  
     </tr>
	 <tr bgcolor="#FFF" style="height:22px;">	   
      <td class="h" style="width:3%;background-color:#FFFF6C;" valign="top">Ans.</td>	  
	  <td class="bl" style="width:97%;background-color:#FFFFFF;">&nbsp;<?php echo $resW['Answer']; ?></td>  
     </tr>
<?php $Sno++;} ?>
    </table>
    </td>
   </tr> 
   <tr><td style="height:30px;">&nbsp;</td></tr> 
   
   <tr><td class="body"><b><i>(KRA)</i></b></td></tr>
   <?php for($i=1; $i<=20; $i++) { ?><input type="hidden" id="KraScore<?php echo $i; ?>" value="0" /><?php } ?>
   <input type="hidden" id="KraSum" value="0"/>
   <tr>
    <td>
    <table border="1" style="width:100%;" cellspacing="0">
     <tr bgcolor="#FFFF6C">	   
	  <td bgcolor="#FFFF6C" class="h" style="width:2%;">SNo.</td>
	  <td bgcolor="#FFFF6C" class="h" style="width:20&;">KRA/Goals</td>
	  <td bgcolor="#FFFF6C" class="h" style="width:32%;">Description</td>  
	  <td bgcolor="#FFFF6C" class="h" style="width:4%;">Measure</td>
	  <td bgcolor="#FFFF6C" class="h" style="width:4%;">Unit</td>
	  <td bgcolor="#FFFF6C" class="h" style="width:4%;">Weigh<br>tage</td>
	  <?php /*?><td bgcolor="#FFFF6C" class="h" style="width:4%;">Logic</td>
      <td bgcolor="#FFFF6C" class="h" style="width:4%;">Period</td><?php */?>
	  <td bgcolor="#FFFF6C" class="h" style="width:4%;">Target</td>
	  <td bgcolor="#FFFF6C" class="h" style="width:4%;">Self<br>Rating</td>
	 <?php /*?> <td bgcolor="#FFFF6C" class="h" style="width:4%;">Allow<br>Logic</td>
      <td bgcolor="#FFFF6C" class="h" style="width:4%;">Score</td><?php */?>
	  <td bgcolor="#FFFF6C" class="h" style="width:10%;">Remarks</td>
     </tr>
<?php $sqlK=mysql_query("select * from hrm_employee_pms_kraforma where KRAFormAStatus='A' AND EmpPmsId=".$_REQUEST['PmsId']." order by KRAFormAId ASC", $con); $Sno=1; while($resK=mysql_fetch_array($sqlK)){ 
$sqlK2=mysql_query("select * from hrm_pms_kra where KRAId=".$resK['KRAId'], $con); $resK2=mysql_fetch_array($sqlK2); 
$sSubK=mysql_query("select * from hrm_pms_krasub where KRAId=".$resK['KRAId']." AND KSubStatus='A' order by KRASubId ASC",$con); $rowSubK=mysql_num_rows($sSubK);
$n=0; if($resK['Period']=='Monthly' OR $resK['Period']=='Quarter' OR $resK['Period']=='1/2 Annual'){ $n=1; $sqlt=mysql_query("select SUM(Ach) as tAch, SUM(LogScr) as tLogScr, SUM(Scor) as tScor from hrm_pms_kra_tgtdefin where KRAId=".$resK['KRAId'],$con); $rest=mysql_fetch_assoc($sqlt); }else{$n=0;} ?>	
     <tr bgcolor="#FFFFFF" style="height:25px;"> 	   
	  <td class="b"><?php echo $Sno; ?></td>
	  <td class="bl" valign="top"><?php echo $resK2['KRA'];?></td>
	  <td class="bl" valign="top"><?php echo $resK2['KRA_Description'];?></td>  
	  <td class="b"><?php echo $resK2['Measure'];?></td>
	  <td class="b"><?php echo $resK2['Unit'];?></td>
	  <td class="b"><?php echo $resK['Weightage'];?></td>
	  <?php /*?><td class="b"><?php echo $resK['Logic'];?></td>
      <td class="b"><?php echo $resK['Period'];?></td><?php */?>
	  <td class="b"><?php if($rowSubK==0){ echo $resK['Target']; }?></td>
	  <td class="b"><?php if($rowSubK>0){ echo ''; }elseif($n==1){ echo floatval($rest['tLogScr']); }elseif($resKey['AppraisalForm']=='Y'){ echo $resK['SelfRating']; }elseif($resKey['MidPmsForm']=='Y'){ echo $resK['Mid_SelfRating']; }?></td>
	  
	  <?php /*?><td class="b"><?php if($rowSubK>0){echo '';}elseif($n==1){ echo floatval($rest['tLogScr']); }elseif($resKey['AppraisalForm']=='Y'){ echo $resK['SelfKRALogic'];}elseif($resKey['MidPmsForm']=='Y'){echo $resK['Mid_SelfKRALogic']; } ?></td>
	  <td class="b"><input type="text" style="width:50px;text-align:center;border:hidden;font-weight:bold;" id="EmpKRAScore<?php echo $Sno; ?>" value="<?php if($n==1){ echo floatval($rest['tScor']); }elseif($resKey['AppraisalForm']=='Y'){ echo $resK['SelfKRAScore'];}elseif($resKey['MidPmsForm']=='Y'){echo $resK['Mid_SelfKRAScore']; } ?>"  readonly/></td><?php */?>
	  
	  <td class="bl" valign="top"><?php if($resKey['AppraisalForm']=='Y'){ echo $resK['AchivementRemark'];}elseif($resKey['MidPmsForm']=='Y'){echo $resK['Mid_AchivementRemark']; } ?>
	  </td>
	  

<input type="hidden" id="rowSubK<?php echo $Sno; ?>" name="rowSubK<?php echo $Sno; ?>" value="<?php echo $rowSubK; ?>" />
     </tr>

<?php for($i=1; $i<=5; $i++) { ?><input type="hidden" id="KraScoreSub<?php echo $Sno."_".$i; ?>" value="0" /><?php } ?>	 
<?php  if($rowSubK>0){ ?> 
<?php /*&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& Start Start */ ?>
<?php /*&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& Start Start */ ?>  
 <tr>
  <td colspan="13" align="right" style="border:hidden;border-style:none;">
   <div id="Div<?php echo $Sno; ?>" style="display:<?php if($rowSubK>0){echo 'block';}else{echo 'none';} ?>;">
    <table border="1" style="width:95%;" cellspacing="0"> 
	 <tr bgcolor="#71FF71">	   
	  <td bgcolor="#71FF71" class="h" style="width:2%;">SNo.</td>
	  <td bgcolor="#71FF71" class="h" style="width:20&;">Sub KRA/Goals</td>
	  <td bgcolor="#71FF71" class="h" style="width:32%;">Sub Description</td>  
	  <td bgcolor="#71FF71" class="h" style="width:4%;">Measure</td>
	  <td bgcolor="#71FF71" class="h" style="width:4%;">Unit</td>
	  <td bgcolor="#71FF71" class="h" style="width:4%;">Weigh<br>tage</td>
	  <td bgcolor="#71FF71" class="h" style="width:4%;">Logic</td>
      <td bgcolor="#71FF71" class="h" style="width:4%;">Period</td>
	  <td bgcolor="#71FF71" class="h" style="width:4%;">Target</td>
	  <td bgcolor="#71FF71" class="h" style="width:4%;">Self<br>Rating</td>
	  <?php /*?><td bgcolor="#71FF71" class="h" style="width:4%;">Allow<br>Logic</td>
      <td bgcolor="#71FF71" class="h" style="width:4%;">Score</td><?php */?>
	  <td bgcolor="#71FF71" class="h" style="width:10%;">Remarks</td>
     </tr>
<?php if($rowSubK==0){$num=5;}elseif($rowSubK==1){$num=4;}elseif($rowSubK==2){$num=3;}elseif($rowSubK==3){$num=2;}elseif($rowSubK==4){$num=1;}elseif($rowSubK==5){$num=0;} ?>
<?php /* While Open*/ $m=1; while($rSubK=mysql_fetch_assoc($sSubK)){
      $nn=0;
	  if($rSubK['Period']=='Monthly' OR $rSubK['Period']=='Quarter' OR $rSubK['Period']=='1/2 Annual'){ $nn=1; $sqltt=mysql_query("select SUM(Ach) as tAch, SUM(LogScr) as tLogScr, SUM(Scor) as tScor from hrm_pms_kra_tgtdefin where KRASubId=".$rSubK['KRASubId'],$con); $restt=mysql_fetch_assoc($sqltt); }else{$nn=0;} if($m==1){$n='(a)';}elseif($m==2){$n='(b)';}elseif($m==3){$n='(c)';}elseif($m==4){$n='(d)';}elseif($m==5){$n='(e)';} ?>
     <tr bgcolor="#FFFFFF" style="height:25px;">  
      <td class="b"><b style="color:#006FDD;"><?php echo $n; ?></b></td>
      <td class="bl" valign="top"><?php echo $rSubK['KRA']; ?></td>
      <td class="bl" valign="top"><?php echo $rSubK['KRA_Description']; ?></td>    
      <td class="b"><?php echo $rSubK['Measure']; ?></td>
      <td class="b"><?php echo $rSubK['Unit']; ?></td>
      <td class="b"><?php echo $rSubK['Weightage']; ?></td>
      <td class="b"><?php echo $rSubK['Logic']; ?></td>
      <td class="b"><?php echo $rSubK['Period']; ?></td>
      <td class="b"><?php echo $rSubK['Target']; ?></td>
	  <td class="b"><?php if($nn==1){ echo floatval($restt['tLogScr']); }elseif($resKey['AppraisalForm']=='Y'){ echo $rSubK['SelfRating']; }elseif($resKey['MidPmsForm']=='Y'){ echo $rSubK['Mid_SelfRating']; }?></td>
	  <?php /*?><td class="b"><?php if($nn==1){ echo floatval($restt['tLogScr']); }elseif($resKey['AppraisalForm']=='Y'){ echo $rSubK['SelfKRALogic'];}elseif($resKey['MidPmsForm']=='Y'){echo $rSubK['Mid_SelfKRALogic']; } ?></td>
	  <td class="b"><?php if($nn==1){ echo floatval($restt['tScor']); }elseif($resKey['AppraisalForm']=='Y'){ echo $rSubK['SelfKRAScore'];}elseif($resKey['MidPmsForm']=='Y'){echo $rSubK['Mid_SelfKRAScore']; } ?></td><?php */?>
	  <td class="bl" valign="top"><?php if($resKey['AppraisalForm']=='Y'){ echo $rSubK['AchivementRemark'];}elseif($resKey['MidPmsForm']=='Y'){echo $rSubK['Mid_AchivementRemark']; } ?></td>
	  
	  <input type="hidden" id="EmpKRAScore<?php echo $Sno.'_'.$m; ?>" value="<?php if($nn==1){ echo floatval($restt['tScor']); }elseif($resKey['AppraisalForm']=='Y'){ echo $rSubK['SelfKRAScore'];}elseif($resKey['MidPmsForm']=='Y'){echo $rSubK['Mid_SelfKRAScore']; } ?>"  readonly/>
	  
   </tr> 
   <?php $m++;} $KrowSub=$m-1; ?> 
  </table>
  </div> 
 </td>
</tr>
<?php /* &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& End End */ ?> 
<?php /* &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& End End */ ?> 
<?php } ?> 
	  
<?php $Sno++; } $Krow=$Sno-1; ?>
<input type="hidden" id="Sno" name="Sno" value="<?php echo $Sno; ?>" />
<input type="hidden" name="KRow" id="KRow" value="<?php echo $Krow; ?>" />
<?php /*?><tr>
  <td colspan="11" style="font-family:Times New Roman;font-size:14px;font-weight:bold;" align="right">Total:&nbsp;</td>
  <td><?php $sqlA=mysql_query("select EmpFormAScore,Mid_EmpFormAScore from hrm_employee_pms where EmpPmsId=".$_REQUEST['EmpId'], $con); $resA=mysql_fetch_assoc($sqlA); ?><input type="text" class="input" style="text-align:center;width:60px;font-weight:bold;border:hidden;" id="EmpFormAScore<?php echo $Sno; ?>" value="<?php if($resKey['AppraisalForm']=='Y'){ echo $resA['EmpFormAScore'];}elseif($resKey['MidPmsForm']=='Y'){echo $resA['Mid_EmpFormAScore']; } ?>"  readonly/></td>
  <td>&nbsp;</td>
</tr><?php */?>
    </table>
    </td>   
   </tr>
   <tr><td style="height:30px;">&nbsp;</td></tr>
   
   <tr><td class="body"><b><i>(Skill/ Behavioral)</i></b></td></tr>
   <tr>
    <td id="FormB">
    <table border="1" cellspacing="0">
     <tr bgcolor="#FFFF6C">	   
	  <td bgcolor="#FFFF6C" class="h" style="width:3%;">SNo.</td>
	  <td bgcolor="#FFFF6C" class="h" style="width:20%;">Behavioral/Skills</td>
	  <td bgcolor="#FFFF6C" class="h" style="width:40%;">Description</td>  
	  <td bgcolor="#FFFF6C" class="h" style="width:5%;">Weightage</td>
	  <td bgcolor="#FFFF6C" class="h" style="width:5%;">Target Rating</td>
	  <td bgcolor="#FFFF6C" class="h" style="width:5%;">Self Rating</td>
	  <?php /*?><td bgcolor="#FFFF6C" class="h" style="width:5%;">Score</td><?php */?>
	  <td bgcolor="#FFFF6C" class="h" style="width:17%;">Comments</td>
     </tr>
<?php $syer=mysql_query("select AssessmentYear from hrm_employee_pms where EmpPmsId=".$_REQUEST['PmsId'],$con);
      $ryer=mysql_fetch_assoc($syer); $PmsYId=$ryer['AssessmentYear']; 

$sqlBY=mysql_query("select * from hrm_employee_pms_behavioralformb where EmpPmsId=".$_REQUEST['PmsId']." order by BehavioralFormBId ASC", $con);  $SnoB=1; while($resBY=mysql_fetch_array($sqlBY)){ $sqlB2=mysql_query("select Skill,SkillComment,Weightage,Target from hrm_pms_formb where FormBId=".$resBY['FormBId'], $con); $resB2=mysql_fetch_assoc($sqlB2); ?>
     <tr bgcolor="#FFFFFF"> 	   
	  <td class="b"><?php echo $SnoB; ?></td>
	  <td class="bl" valign="top"><?php echo $resB2['Skill'] ?></td>
	  <td class="bl" valign="top"><?php echo $resB2['SkillComment']; ?></td>  
	  <td class="b"><?php echo $resB2['Weightage'] ?></td>
	  <td class="b"><?php echo $resB2['Target']; ?></td>
	  <td class="b"><?php if($resKey['AppraisalForm']=='Y'){ echo $resBY['SelfRating'];}elseif($resKey['MidPmsForm']=='Y'){echo $resBY['Mid_SelfRating']; } ?></td>
	  <?php /*?><td class="b"><?php if($resKey['AppraisalForm']=='Y'){ echo $resBY['SelfFormBScore'];}elseif($resKey['MidPmsForm']=='Y'){echo $resBY['Mid_SelfFormBScore']; } ?></td><?php */?>
	  <td class="bl" valign="top"><?php if($resKey['AppraisalForm']=='Y'){ echo $resBY['Comments_Example'];}elseif($resKey['MidPmsForm']=='Y'){echo $resBY['Mid_Comments_Example']; } ?></td>
     </tr>
	 
<?php  $sSubB22=mysql_query("select * from hrm_pms_formbsub where FormBId=".$resBY['FormBId']." AND BSubStatus='A' order by FormBSubId ASC",$con); $rowSubB=mysql_num_rows($sSubB22);
if($rowSubB>0)
{
?>   
<?php /* &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& Start Start */ ?>
<?php /* &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& Start Start */ ?>
  
 <tr>
  <td colspan="9" align="right" style="border:hidden;border-style:none;">
  <div id="Div<?php echo $SnoB; ?>" style="display:<?php if($rowSubB>0){echo 'block';}else{echo 'none';} ?>;">
     <table style="width:95%;background-color:#71FF71;" border="0" cellpadding="0" cellspacing="1"> 
     <tr style="background-color:#71FF71;">   
      <td class="fhead2" style="width:40px;">SNo</td>
      <td class="fhead2" style="width:250px;">Sub Skill</td>
      <td class="fhead2" style="width:350px;">Sub Skill Description</td>  
      <td class="fhead2" style="width:60px;">Weightage</td>
	  <td class="fhead2" style="width:60px;">Logic</td>
	  <td class="fhead2" style="width:80px;">Period</td>
      <td class="fhead2" style="width:60px;">Target</td>
      <td class="fhead2" style="width:60px;">Self<br>Rating</td>
	  <td class="fhead2" style="width:200px;">Remarks</td>
     </tr>

<?php if($rowSubK==0){$num=5;}elseif($rowSubK==1){$num=4;}elseif($rowSubK==2){$num=3;}elseif($rowSubK==3){$num=2;}elseif($rowSubK==4){$num=1;}elseif($rowSubK==5){$num=0;} ?>

<?php 
$sSubB=mysql_query("select * from hrm_employee_pms_behavioralformb_sub s inner join hrm_pms_formbsub bb on s.FormBSubId=bb.FormBSubId where s.EmpId=".$_REQUEST['EmpId']." AND s.YearId=".$PmsYId,$con); /* While Open*/ $m=1; while($rSubB=mysql_fetch_assoc($sSubB)){ 

$nn=0;
	  if($rSubB['Period']=='Monthly' OR $rSubB['Period']=='Quarter' OR $rSubB['Period']=='1/2 Annual'){ $nn=1; 
	  
	  $sqltt=mysql_query("select SUM(Ach) as tAch, SUM(LogScr) as tLogScr, SUM(Scor) as tScor from hrm_pms_formb_tgtdefin where EmployeeID=".$_REQUEST['EmpId']." AND YearId=".$PmsYId." AND FormBSubId=".$rSubB['FormBSubId'],$con); $restt=mysql_fetch_assoc($sqltt); }else{$nn=0;}

?>
  <tr style="background-color:#FFFFFF;">  
<?php if($m==1){$n='a';}elseif($m==2){$n='b';}elseif($m==3){$n='c';}elseif($m==4){$n='d';}elseif($m==5){$n='e';} ?>  
  <td align="center" class="fbody2"><?php echo $n; ?></b></td>
  <td class="fbody" valign="top"><?php echo $rSubB['Skill']; ?></td>
  <td class="fbody" valign="top"><?php echo $rSubB['SkillComment']; ?></td>  
  <td align="center" class="fbody2"><?php echo $rSubB['Weightage']; ?></td>
  <td align="center" class="fbody2"><?php echo $rSubB['Logic']; ?></td>
  <td align="center" class="fbody2"><?php echo $rSubB['Period']; ?></td>
  <td align="center" class="fbody2"><?php echo intval($rSubB['Target']); ?></td>
  <td class="font1" valign="top" align="center" style="width:80px;"><?php if($nn==1){ echo floatval($restt['tLogScr']); }elseif($resY['Emp_SkillSave']=='Y'){ if($resKey['AppraisalForm']=='Y'){ echo $rSubB['SelfRating']; } }elseif($rSubB['Emp_SkillSave']=='N'){ echo '0'; }?>
  </td>
  <td class="font1" valign="top" align="" style="width:100px;"><?php if($resKey['AppraisalForm']=='Y'){echo $rSubB['AchivementRemark'];}elseif($resKey['MidPmsForm']=='Y'){ echo $rSubB['AchivementRemark']; } ?>
  </td>
  
</tr> 
<?php $m++;} ?>	
<?php /* While Close*/ ?>	

     </table>
  </div> 
  </td>
 </tr>
<?php /* &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& End End */ ?> 
<?php /* &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& End End */ ?> 
<?php } ?> 
	 
	 
<?php $SnoB++;} ?>
    <?php /*?> <tr>
      <td colspan="6" style="font-family:Times New Roman;font-size:14px;font-weight:bold;" align="right">Total:&nbsp;</td>
      <td><?php $sqlB=mysql_query("select EmpFormBScore,Mid_EmpFormBScore from hrm_employee_pms where EmpPmsId=".$_REQUEST['PmsId'], $con); $resB=mysql_fetch_assoc($sqlB); ?><input type="text" class="input" class="input" style="text-align:center;width:60px;font-weight:bold;border:hidden;" id="EmpFormBScore<?php echo $SnoB; ?>" value="<?php if($resKey['AppraisalForm']=='Y'){ echo $resB['EmpFormBScore'];}elseif($resKey['MidPmsForm']=='Y'){echo $resB['Mid_EmpFormBScore']; } ?>" readonly/></td>
	 <td>&nbsp;</td>
    </tr><?php */?>	

    </table>
    </td>   
   </tr>
   <tr><td style="height:50px;">&nbsp;</td></tr>
   
   <tr><td>&nbsp;</td></tr>
  </table>
  </td>
 </tr>
</table>
</td>
</tr>
</table>
</body>
</html>

