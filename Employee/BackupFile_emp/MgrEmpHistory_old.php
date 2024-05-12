<?php session_start();
require_once('../AdminUser/config/config.php'); 
date_default_timezone_set('Asia/Kolkata');
?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<style>
.head{color:#000;font-family:Times New Roman;font-size:18px;font-weight:bold;}
.bdy{color:#00376F;font-family:Times New Roman;font-size:18px;}
.h{color:#000;font-family:Times New Roman;font-size:15px;font-weight:bold;text-align:center;}
.hl{color:#000;font-family:Times New Roman;font-size:15px;font-weight:bold;}
.b{color:#000;font-family:Times New Roman;font-size:15px;text-align:center;}
.bl{color:#000;font-family:Times New Roman;font-size:15px;}
.fhead{color:#000;font-family:Times New Roman;font-size:14px;font-weight:bold;text-align:center;}
.fbody{color:#000;font-family:Times New Roman;font-size:14px;vertical-align:top;}
.input{font-family:Times New Roman;font-size:14px;}
.fhead2{color:#000;font-family:Times New Roman;font-size:12px;font-weight:bold;text-align:center;}
.fbody2{color:#000;font-family:Times New Roman;font-size:14px;vertical-align:top;}
.body2{color:#FFFFFF;font-family:Times New Roman;font-size:18px;color:#0000FF;}
</style>
<script language="javascript" type="text/javascript">
function doBlink() 
{ var blink = document.all.tags("BLINK")
  for (var i=0; i<blink.length; i++) blink[i].style.visibility = blink[i].style.visibility == "" ? "hidden" : "" }
function startBlink() {	if (document.all)setInterval("doBlink()",1000) } window.onload = startBlink;

</script>
</head>
<body style="background-image:url(images/pmsback.png);">
<?php 
$sqlAc=mysql_query("select * from hrm_employee_pms where EmpPmsId=".$_REQUEST['a'], $con); 
$resAc=mysql_fetch_array($sqlAc);
   
$sqlE=mysql_query("select * from hrm_employee where EmployeeID=".$resAc['EmployeeID'], $con); $resE=mysql_fetch_array($sqlE); $Ename=$resE['Fname'].' '.$resE['Sname'].' '.$resE['Lname']; 
$cdn=$resE['EmpCode'].'&nbsp;:&nbsp;'.$resE['Fname'].' '.$resE['Sname'].' '.$resE['Lname'].'&nbsp;-&nbsp;';

$sqlCurr=mysql_query("select * from hrm_year where YearId=".$resAc['AssessmentYear'],$con); 
$resCurr=mysql_fetch_assoc($sqlCurr); 
$FromCurr=date("Y", strtotime($resCurr['FromDate'])); $ToCurr=date("Y", strtotime($resCurr['ToDate']));
?>   
<table border="0" width="100%">
<tr>
 <td width="100%">
 <table border="0" width="100%">
  <tr><td align="center" class="head"><u>Appraisal Form</u></td></tr>
  <tr><td align="center" class="head">Assessment Year&nbsp;<?php if($_REQUEST['CI']==1){ echo $FromCurr; }else{ $NF=$FromCurr-1; $NT=$FromCurr; echo $FromCurr.'-'.$ToCurr; } ?></td></tr>
  <tr>
  <tr>
   <td class="head" align="center">
   &nbsp;EmpCode :&nbsp;<font class="body2"><?php echo $resE['EmpCode']; ?></font>
   &nbsp;&nbsp;Name :&nbsp;<font class="body2"><?php echo ucfirst(strtolower($resE['Fname'].' '.$resE['Sname'].' '.$resE['Lname'])); ?></font>
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
   <table border="0"> 
    <tr><td class="body"><b><i>(Achievement)</i></b></td></tr>
    <tr>
	 <td>
     <table border="1" style="width:100%;" cellspacing="0">
<?php $sqlApp=mysql_query("select * from hrm_employee_pms_achivement where EmpPmsId=".$_REQUEST['a']." order by AchivementId ASC", $con); $SnoB=1; while($resApp=mysql_fetch_array($sqlApp)){?>   
     <tr bgcolor="#FFF" style="height:24px;">	   
      <td class="h" style="width:3%;background-color:#FFFF6C;" valign="top"><?php echo $SnoB; ?></td>	  
	  <td class="bl" style="width:97%;background-color:#FFFFFF;">&nbsp;<?php echo $resApp['Achivement']; ?></td>  
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
<?php $sqlW=mysql_query("select * from hrm_employee_pms_workenvironment where EmpPmsId=".$_REQUEST['a']." order by EmpWorkEnvId ASC", $con); $Sno=1; while($resW=mysql_fetch_array($sqlW)){ ?>   
     <tr bgcolor="#FFF" style="height:24px;">	   
      <td class="h" style="width:3%;background-color:#FFFF6C;" valign="top"><?php echo $Sno; ?></td>	  
	  <td class="bl" style="width:97%;background-color:#C5FF8A;">&nbsp;<?php echo $resW['WorkEnvironment']; ?></td>  
     </tr>
	 <tr bgcolor="#FFF" style="height:24px;">	   
      <td class="h" style="width:3%;background-color:#FFFF6C;" valign="top">Ans.</td>	  
	  <td class="bl" style="width:97%;background-color:#FFFFFF;">&nbsp;<?php echo $resW['Answer']; ?></td>  
     </tr>
<?php $Sno++;} ?>
    </table>
    </td>
   </tr> 
   <tr><td style="height:30px;">&nbsp;</td></tr>
   
   <tr><td class="body"><b><i>(KRA)</i></b></td></tr>
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
	  <td bgcolor="#FFFF6C" class="h" style="width:4%;">Logic</td>
      <td bgcolor="#FFFF6C" class="h" style="width:4%;">Period</td>
	  <td bgcolor="#FFFF6C" class="h" style="width:4%;">Target</td>
	  <td bgcolor="#FFFF6C" class="h" style="width:4%;">Emp<br>Rating</td>
	  <td bgcolor="#FFFF6C" class="h" style="width:10%;">Emp Remarks</td>
	  <td bgcolor="#FFFF6C" class="h" style="width:4%;">App<br>Rating</td>
      <td bgcolor="#FFFF6C" class="h" style="width:4%;">App<br>Score</td>
	  
     </tr>
<?php $sqlK=mysql_query("select * from hrm_employee_pms_kraforma where KRAFormAStatus='A' AND EmpPmsId=".$_REQUEST['a']." order by KRAFormAId ASC", $con); $Sno=1; while($resK=mysql_fetch_array($sqlK)){ 
$sqlK2=mysql_query("select * from hrm_pms_kra where KRAId=".$resK['KRAId'], $con); $resK2=mysql_fetch_array($sqlK2); 
$sSubK=mysql_query("select * from hrm_pms_krasub where KRAId=".$resK['KRAId']." AND KSubStatus='A' order by KRASubId ASC",$con); $rowSubK=mysql_num_rows($sSubK);
$n=0; if($resK['Period']=='Monthly' OR $resK['Period']=='Quarter' OR $resK['Period']=='1/2 Annual'){ $n=1; $sqlt=mysql_query("select SUM(Ach) as tAch, SUM(LogScr) as tELogScr, SUM(AppAch) as tAppAch, SUM(AppLogScr) as tLogScr, SUM(AppScor) as tScor from hrm_pms_kra_tgtdefin where KRAId=".$resK['KRAId'],$con); $rest=mysql_fetch_assoc($sqlt); }else{$n=0;} ?>	
     <tr bgcolor="#FFFFFF" style="height:25px;"> 	   
	  <td class="b"><?php echo $Sno; ?></td>
	  <td class="bl" valign="top"><?php echo $resK2['KRA'];?></td>
	  <td class="bl" valign="top"><?php echo $resK2['KRA_Description'];?></td>  
	  <td class="b"><?php echo $resK2['Measure'];?></td>
	  <td class="b"><?php echo $resK2['Unit'];?></td>
	  <td class="b"><?php echo $resK['Weightage'];?></td>
	  <td class="b"><?php echo $resK['Logic'];?></td>
      <td class="b"><?php echo $resK['Period'];?></td>
	  <td class="b"><?php if($rowSubK==0){ echo $resK['Target']; }?></td>
	  <td class="b"><?php if($n==1){ echo floatval($rest['tELogScr']); }elseif($_SESSION['eAppform']=='Y'){ echo $resK['SelfRating']; }elseif($_SESSION['eMidform']=='Y'){ echo $resK['Mid_SelfRating']; }?></td>
	  <td class="bl" valign="top"><?php if($_SESSION['eAppform']=='Y'){ echo $resK['AchivementRemark'];}elseif($_SESSION['eMidform']=='Y'){echo $resK['Mid_AchivementRemark']; } ?></td>
	  <td class="b"><?php if($rowSubK>0){echo '';}elseif($n==1){ echo floatval($rest['tLogScr']); }elseif($_SESSION['eAppform']=='Y'){ echo $resK['AppraiserRating'];}elseif($_SESSION['eMidform']=='Y'){echo $resK['Mid_AppraiserRating']; } ?></td>
	  <td class="b"><b><?php if($n==1){ echo floatval($rest['tScor']); }elseif($_SESSION['eAppform']=='Y'){ echo $resK['AppraiserScore'];}elseif($_SESSION['eMidform']=='Y'){echo $resK['Mid_AppraiserScore']; } ?></b></td>
     </tr>

<?php  if($rowSubK>0){ ?> 
<?php /*&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& Start Start */ ?>
<?php /*&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& Start Start */ ?>  
 <tr>
  <td colspan="13" align="right" style="border:hidden;border-style:none;">
   <div id="Div<?php echo $Sno; ?>" style="display:<?php if($rowSubK>0){echo 'block';}else{echo 'none';} ?>;">
    <table style="width:97%;background-color:#71FF71;" border="1" cellpadding="0" cellspacing="0"> 
     <tr style="background-color:#71FF71;">	 
	  <td rowspan="6" class="Input2a" style="background-color:#71FF71;border:hidden;width:50px;" valign="middle" align="center">Sub<br>KRA</td>  
	  <td bgcolor="#71FF71" class="h" style="width:2%;">Sn</td>
	  <td bgcolor="#71FF71" class="h" style="width:20&;">Sub KRA/Goals</td>
	  <td bgcolor="#71FF71" class="h" style="width:32%;">Sub Description</td>  
	  <td bgcolor="#71FF71" class="h" style="width:4%;">Measure</td>
	  <td bgcolor="#71FF71" class="h" style="width:4%;">Unit</td>
	  <td bgcolor="#71FF71" class="h" style="width:4%;">Weigh<br>tage</td>
	  <td bgcolor="#71FF71" class="h" style="width:4%;">Logic</td>
      <td bgcolor="#71FF71" class="h" style="width:4%;">Period</td>
	  <td bgcolor="#71FF71" class="h" style="width:4%;">Target</td>
	  <td bgcolor="#71FF71" class="h" style="width:4%;">Emp<br>Rating</td>
	  <td bgcolor="#71FF71" class="h" style="width:10%;">Emp Remarks</td>
	  <td bgcolor="#71FF71" class="h" style="width:4%;">App<br>Rating</td>
      <td bgcolor="#71FF71" class="h" style="width:4%;">App<br>Score</td>
	 
     </tr>
<?php if($rowSubK==0){$num=5;}elseif($rowSubK==1){$num=4;}elseif($rowSubK==2){$num=3;}elseif($rowSubK==3){$num=2;}elseif($rowSubK==4){$num=1;}elseif($rowSubK==5){$num=0;} ?>
<?php /* While Open*/ $m=1; while($rSubK=mysql_fetch_assoc($sSubK)){
      $nn=0;
	  if($rSubK['Period']=='Monthly' OR $rSubK['Period']=='Quarter' OR $rSubK['Period']=='1/2 Annual'){ $nn=1; $sqltt=mysql_query("select SUM(Ach) as tAch, SUM(LogScr) as tELogScr, SUM(AppAch) as tAppAch, SUM(AppLogScr) as tLogScr, SUM(AppScor) as tScor from hrm_pms_kra_tgtdefin where KRASubId=".$rSubK['KRASubId'],$con); $restt=mysql_fetch_assoc($sqltt); }else{$nn=0;} if($m==1){$n='(a)';}elseif($m==2){$n='(b)';}elseif($m==3){$n='(c)';}elseif($m==4){$n='(d)';}elseif($m==5){$n='(e)';} ?>
     <tr bgcolor="#FFFFFF" style="height:30px;">  
      <td class="b"><b style="color:#006FDD;"><?php echo $n; ?></b></td>
      <td class="bl" valign="top"><?php echo $rSubK['KRA']; ?></td>
      <td class="bl" valign="top"><?php echo $rSubK['KRA_Description']; ?></td>    
      <td class="b"><?php echo $rSubK['Measure']; ?></td>
      <td class="b"><?php echo $rSubK['Unit']; ?></td>
      <td class="b"><?php echo $rSubK['Weightage']; ?></td>
      <td class="b"><?php echo $rSubK['Logic']; ?></td>
      <td class="b"><?php echo $rSubK['Period']; ?></td>
      <td class="b"><?php echo $rSubK['Target']; ?></td>
	  <td class="b"><?php if($nn==1){ echo floatval($restt['tELogScr']); }elseif($_SESSION['eAppform']=='Y'){ echo $rSubK['SelfRating']; }elseif($_SESSION['eMidform']=='Y'){ echo $rSubK['Mid_SelfRating']; }?></td>
	  <td class="bl" valign="top"><?php if($_SESSION['eAppform']=='Y'){ echo $rSubK['AchivementRemark'];}elseif($_SESSION['eMidform']=='Y'){echo $rSubK['Mid_AchivementRemark']; } ?></td>
	  
	  <td class="b"><?php if($nn==1){ echo floatval($restt['tLogScr']); }elseif($_SESSION['eAppform']=='Y'){ echo $rSubK['AppraiserRating'];}elseif($_SESSION['eMidform']=='Y'){echo $rSubK['Mid_AppraiserRating']; } ?></td>
	  <td class="b"><?php if($nn==1){ echo floatval($restt['tScor']); }elseif($_SESSION['eAppform']=='Y'){ echo $rSubK['AppraiserScore'];}elseif($_SESSION['eMidform']=='Y'){echo $rSubK['Mid_AppraiserScore']; } ?></td>
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
<tr bgcolor="#FFFFFF">
  <td colspan="12" style="font-family:Times New Roman;font-size:14px;font-weight:bold;" align="right">Total:&nbsp;</td>
  <td align="center" class="b"><b><?php if($_SESSION['eAppform']=='Y'){ echo $resAc['AppraiserFormAScore'];}elseif($_SESSION['eMidform']=='Y'){echo $resAc['Mid_AppraiserFormAScore']; } ?></b></td>
</tr>
    </table>
    </td>   
   </tr>
   <tr><td style="height:30px;">&nbsp;</td></tr>
   
   <tr><td class="body"><b><i>(Skill/ Behavioral)</i></b></td></tr>
   <tr>
    <td id="FormB">
    <table border="1" cellspacing="0">
     <tr bgcolor="#FFFF6C">	   
	  <td bgcolor="#FFFF6C" class="h" style="width:3%;">Sn</td>
	  <td bgcolor="#FFFF6C" class="h" style="width:15%;">Behavioral/Skills</td>
	  <td bgcolor="#FFFF6C" class="h" style="width:37%;">Description</td>  
	  <td bgcolor="#FFFF6C" class="h" style="width:5%;">Weightage</td>
	  <td bgcolor="#FFFF6C" class="h" style="width:5%;">Logic</td>
	  <td bgcolor="#FFFF6C" class="h" style="width:5%;">Period</td>
	  <td bgcolor="#FFFF6C" class="h" style="width:5%;">Target Rating</td>
	  <td bgcolor="#FFFF6C" class="h" style="width:5%;">Emp Rating</td>
	  <td bgcolor="#FFFF6C" class="h" style="width:15%;">Emp Remark</td>
	  <td bgcolor="#FFFF6C" class="h" style="width:5%;">App Rating</td>
	  <td bgcolor="#FFFF6C" class="h" style="width:5%;">App Score</td>
     </tr>
<?php $syer=mysql_query("select AssessmentYear from hrm_employee_pms where EmpPmsId=".$_REQUEST['a'],$con);
      $ryer=mysql_fetch_assoc($syer); $PmsYId=$ryer['AssessmentYear'];

$sqlBY=mysql_query("select * from hrm_employee_pms_behavioralformb where EmpPmsId=".$_REQUEST['a']." order by BehavioralFormBId ASC", $con);  $SnoB=1; while($resBY=mysql_fetch_array($sqlBY)){ $sqlB2=mysql_query("select Skill,SkillComment,Weightage,Logic,Period,Target from hrm_pms_formb where FormBId=".$resBY['FormBId'], $con); 
$resB2=mysql_fetch_assoc($sqlB2); 

$sSubB22=mysql_query("select * from hrm_pms_formbsub where FormBId=".$resBY['FormBId']." AND BSubStatus='A' order by FormBSubId ASC",$con); $rowSubB=mysql_num_rows($sSubB22); 

$n=0; 
if($resB2['Period']=='Monthly' OR $resB2['Period']=='Quarter' OR $resB2['Period']=='1/2 Annual'){ $n=1; $sqlt=mysql_query("select SUM(Ach) as tAche, SUM(LogScr) as tELogScr,  SUM(AppAch) as tAch, SUM(AppLogScr) as tLogScr, SUM(AppScor) as tScor from hrm_pms_formb_tgtdefin where EmployeeID=".$resAc['EmployeeID']." AND YearId=".$PmsYId." AND FormBId=".$resBY['FormBId'],$con); $rest=mysql_fetch_assoc($sqlt); }else{$n=0;}	 


?>
     <tr bgcolor="#FFFFFF"> 	   
	  <td class="b"><?php echo $SnoB; ?></td>
	  <td class="bl" valign="top"><?php echo $resB2['Skill'] ?></td>
	  <td class="bl" valign="top"><?php echo $resB2['SkillComment']; ?></td>  
	  <td class="b"><?php echo $resB2['Weightage']; ?></td>
	  <td class="b"><?php echo $resB2['Logic']; ?></td>
	  <td class="b"><?php echo $resB2['Period']; ?></td>
	  <td class="b"><?php echo $resB2['Target']; ?></td>
	  <td class="b"><?php if($n==1){ echo floatval($rest['tELogScr']); }elseif($_SESSION['eAppform']=='Y'){ echo $resBY['SelfRating'];}elseif($_SESSION['eMidform']=='Y'){echo $resBY['Mid_SelfRating']; } ?></td>
	  <td class="bl" valign="top"><?php if($_SESSION['eAppform']=='Y'){ echo $resBY['Comments_Example'];}elseif($_SESSION['eMidform']=='Y'){echo $resBY['Mid_Comments_Example']; } ?></td>
	  <td class="b"><?php if($n==1){ echo floatval($rest['tLogScr']); }elseif($_SESSION['eAppform']=='Y'){ echo $resBY['AppraiserRating'];}elseif($_SESSION['eMidform']=='Y'){echo $resBY['Mid_AppraiserRating']; } ?></td>
	  <td class="b"><?php if($n==1){ echo floatval($rest['tScor']); }elseif($_SESSION['eAppform']=='Y'){ echo $resBY['AppraiserScore'];}elseif($_SESSION['eMidform']=='Y'){echo $resBY['Mid_AppraiserScore']; } ?></td>
     </tr>
	 
	 
<?php if($rowSubB>0){ ?>   
<?php /* &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& Start Start */ ?>
<?php /* &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& Start Start */ ?>
  
 <tr>
  <td colspan="11" align="right" style="border:hidden;border-style:none;">
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
	  <td class="fhead2" style="width:60px;">Appraiser<br>Ass.</td>
	  <td class="fhead2" style="width:60px;">Score</td>
      
     </tr>

<?php if($rowSubK==0){$num=5;}elseif($rowSubK==1){$num=4;}elseif($rowSubK==2){$num=3;}elseif($rowSubK==3){$num=2;}elseif($rowSubK==4){$num=1;}elseif($rowSubK==5){$num=0;} ?>

<?php 

$sSubB=mysql_query("select * from hrm_employee_pms_behavioralformb_sub s inner join hrm_pms_formbsub bb on s.FormBSubId=bb.FormBSubId where s.EmpId=".$resAc['EmployeeID']." AND s.YearId=".$PmsYId,$con); /* While Open*/ $m=1; while($rSubB=mysql_fetch_assoc($sSubB)){ 

$nn=0;
	  if($rSubB['Period']=='Monthly' OR $rSubB['Period']=='Quarter' OR $rSubB['Period']=='1/2 Annual'){ $nn=1; 
	  
	  $sqltt=mysql_query("select SUM(Ach) as tAche, SUM(LogScr) as tELogScr,  SUM(AppAch) as tAch, SUM(AppLogScr) as tLogScr, SUM(AppScor) as tScor from hrm_pms_formb_tgtdefin where EmployeeID=".$resAc['EmployeeID']." AND YearId=".$PmsYId." AND FormBSubId=".$rSubB['FormBSubId'],$con); $restt=mysql_fetch_assoc($sqltt); }else{$nn=0;}

?>

  <input type="hidden" id="FormBId_<?php echo $SnoB; ?>" value="<?php echo $res2['FormBId']; ?>" />
   
  <tr style="background-color:#FFFFFF;">  
<?php if($m==1){$n='a';}elseif($m==2){$n='b';}elseif($m==3){$n='c';}elseif($m==4){$n='d';}elseif($m==5){$n='e';} ?>  
  <td align="center" class="fbody2"><?php echo $n; ?></b></td>
  <td class="fbody" valign="top"><?php echo $rSubB['Skill']; ?></td>
  <td class="fbody" valign="top"><?php echo $rSubB['SkillComment']; ?></td>  
  <td align="center" class="fbody2"><?php echo $rSubB['Weightage']; ?></td>
  <td align="center" class="fbody2"><?php echo $rSubB['Logic']; ?></td>
  <td align="center" class="fbody2"><?php echo $rSubB['Period']; ?></td>
  <td align="center" class="fbody2"><?php echo intval($rSubB['Target']); ?></td>
  <td align="center" class="fbody2"><?php if($nn==1){ echo floatval($restt['tELogScr']); }elseif($_SESSION['eAppform']=='Y'){ echo $rSubB['SelfRating']; }?></td>	  
  <td class="fbody2"><?php echo $rSubB['AchivementRemark'];?></td>
  <td align="center" class="fbody2"><?php if($nn==1){ echo floatval($restt['tLogScr']); }else{ echo $rSubB['AppraiserRating']; }?></td>
 	  
  <td align="center" class="fbody2"><?php if($nn==1){ echo floatval($restt['tScor']); }elseif($_SESSION['eAppform']=='Y'){ echo $rSubB['AppraiserScore'];}elseif($_SESSION['eMidform']=='Y'){echo $rSubB['Mid_AppraiserScore']; } ?></td>
  
  
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
     <tr bgcolor="#FFFFFF">
      <td colspan="10" style="font-family:Times New Roman;font-size:14px;font-weight:bold;" align="right">Total:&nbsp;</td>
      <td align="center" class="b"><b><?php if($_SESSION['eAppform']=='Y'){ echo $resAc['AppraiserFormBScore'];}elseif($_SESSION['eMidform']=='Y'){echo $resAc['Mid_AppraiserFormBScore']; } ?></b></td>
    </tr>
    </table>
    </td>   
   </tr>
   <tr><td style="height:30px;">&nbsp;</td></tr>
   
   <?php /********************** New Feedback Form Open *************************** ?>
 <tr><td class="bdy"><b><i>Other Skill/ Behavioral related feedback&nbsp;</i></b></td></tr>
 <tr>
  <td>
  <table width="100%">
   <tr bgcolor="#FFFF53" style="height:22px;">
	<td class="fhead" style="width:30px;"><b>SNo.</b></td>
	<td class="fhead" style="width:200px;"><b>Feedback By</b></td>	
	<td class="fhead" style="width:100px;"><b>Department</b></td>
	<td class="fhead" style="width:80px;"><b>Feedback<br>Date</b></td>
	<td class="fhead" style="width:200px;"><b>Attribute</b></td>
	<td class="fhead" style="width:400px;"><b>Comment</b></td>
   </tr>
<?php $sql=mysql_query("select Fname,Sname,Lname,DepartmentCode,f.* from hrm_feedback f inner join hrm_employee e on f.SubBy=e.EmployeeID inner join hrm_employee_general g on f.SubBy=g.EmployeeID inner join hrm_department d on g.DepartmentId=d.DepartmentId where f.EmployeeID=".$resAc['EmployeeID']." order by f.SubDate DESC",$con); 
	$sno=1; while($res=mysql_fetch_array($sql)){ ?>
	<tr style="height:20px;background-color:#FFFFFF;">
		<td class="fbody" align="center"><?php echo $sno; ?></td>
		<td class="fbody"><?php echo $res['Fname'].' '.$res['Sname'].' '.$res['Lname']; ?></td>
        <td class="fbody"><?php echo $res['DepartmentCode'];?></td>			
		<td class="fbody" align="center"><?php echo date("d M y",strtotime($res['SubDate']));?></td>	
		<td class="fbody"><?php echo $res['BehAtt'];?></td>		
		<td class="fbody"><?php echo $res['Remark'];?></td>
	</tr>
	<?php $sno++; } ?>
  </table>
  </td>
 </tr>
 <tr><td>&nbsp;</td></tr>
 <?php /********************** New Feedback Form Close **************************/ ?>
   
   <tr>
  <td>
  <table border="0">
   <tr><td colspan="10" class="bdy"><b><i>Calculation of PMS score&nbsp;</i></b></td></tr>
   <tr bgcolor="#FFFF53" style="height:22px;">
	<td class="fhead" style="width:150px;">&nbsp;</td>
	<td class="fhead" style="width:100px;">KRA Form</td>
	<td class="fhead" style="width:100px;">(%)<br>Weigthage</td>
	<td class="fhead" style="width:100px;">(A)<br>KRA Score</td>
	<td class="fhead" style="width:100px;">Behavioral Form </td>
	<td class="fhead" style="width:100px;">(%)<br>Weigthage</td>
	<td class="fhead" style="width:120px;">(B)<br>Behavioral Score</td>
	<td class="fhead" style="width:100px;">(A+B)<br>PMS Score </td>
    <td class="fhead" style="width:80px;"><b>Rating</b></td>
   </tr>
   <tr>
	<td bgcolor="#FFFFFF" style="font-family:Times New Roman;font-size:14px;font-weight:bold;vertical-align:middle;">&nbsp;Employee :</td>
	<td align="center" bgcolor="#9BCDFF" class="b"><?php if($_SESSION['eAppform']=='Y'){echo $resAc['EmpFormAScore'];}elseif($_SESSION['eMidform']=='Y'){echo $resAc['Mid_EmpFormAScore'];} ?></td>
	<td align="center" bgcolor="#C1FFC1" class="b"><?php echo $resAc['FormAKraAllow_PerOfWeightage']; ?></td>
	<td align="center" bgcolor="#FFE6E6" class="b"><?php if($_SESSION['eAppform']=='Y'){echo $resAc['EmpFinallyFormA_Score'];}elseif($_SESSION['eMidform']=='Y'){echo $resAc['Mid_EmpFinallyFormA_Score'];} ?></td>
	<td align="center" bgcolor="#9BCDFF" class="b"><?php if($_SESSION['eAppform']=='Y'){echo $resAc['EmpFormBScore'];}elseif($_SESSION['eMidform']=='Y'){echo $resAc['Mid_EmpFormBScore'];} ?></td>
	<td align="center" bgcolor="#C1FFC1" class="b"><?php echo $resAc['FormBBehaviAllow_PerOfWeightage']; ?></td>
	<td align="center" bgcolor="#FFE6E6" class="b"><?php if($_SESSION['eAppform']=='Y'){echo $resAc['EmpFinallyFormB_Score'];}elseif($_SESSION['eMidform']=='Y'){echo $resAc['Mid_EmpFinallyFormB_Score'];} ?></td>
	<td align="center" bgcolor="#F7FCD6" class="b"><?php if($_SESSION['eAppform']=='Y'){echo $resAc['Emp_TotalFinalScore'];}elseif($_SESSION['eMidform']=='Y'){echo $resAc['Mid_Emp_TotalFinalScore'];} ?></td>
	<td align="center" bgcolor="#F7FCD6" class="h"><?php if($_SESSION['eAppform']=='Y'){ echo $resAc['Emp_TotalFinalRating'];}elseif($_SESSION['eMidform']=='Y'){ echo $resAc['Mid_Emp_TotalFinalRating'];} ?></td>
   </tr>
   <tr>
	<td bgcolor="#FFFFFF" style="font-family:Times New Roman;font-size:14px;font-weight:bold;vertical-align:middle;">&nbsp;Appraiser :</td>
	<td align="center" bgcolor="#9BCDFF" class="b"><?php if($_SESSION['eAppform']=='Y'){echo $resAc['AppraiserFormAScore'];}elseif($_SESSION['eMidform']=='Y'){echo $resAc['Mid_AppraiserFormAScore'];} ?></td>
	<td align="center" bgcolor="#C1FFC1" class="b"><?php echo $resAc['FormAKraAllow_PerOfWeightage']; ?></td>
	<td align="center" bgcolor="#FFE6E6" class="b"><?php if($_SESSION['eAppform']=='Y'){echo $resAc['AppraiserFinallyFormA_Score'];}elseif($_SESSION['eMidform']=='Y'){echo $resAc['Mid_AppraiserFinallyFormA_Score'];} ?></td>
	<td align="center" bgcolor="#9BCDFF" class="b"><?php if($_SESSION['eAppform']=='Y'){echo $resAc['AppraiserFormBScore'];}elseif($_SESSION['eMidform']=='Y'){echo $resAc['Mid_AppraiserFormBScore'];} ?></td>
	<td align="center" bgcolor="#C1FFC1" class="b"><?php echo $resAc['FormBBehaviAllow_PerOfWeightage']; ?></td>
	<td align="center" bgcolor="#FFE6E6" class="b"><?php if($_SESSION['eAppform']=='Y'){echo $resAc['AppraiserFinallyFormB_Score'];}elseif($_SESSION['eMidform']=='Y'){echo $resAc['Mid_AppraiserFinallyFormB_Score'];} ?></td>
	<td align="center" bgcolor="#F7FCD6" class="b"><?php if($_SESSION['eAppform']=='Y'){echo $resAc['Appraiser_TotalFinalScore'];}elseif($_SESSION['eMidform']=='Y'){echo $resAc['Mid_Appraiser_TotalFinalScore'];} ?></td>
	<td align="center" bgcolor="#F7FCD6" class="h"><?php if($_SESSION['eAppform']=='Y'){ echo $resAc['Appraiser_TotalFinalRating'];}elseif($_SESSION['eMidform']=='Y'){ echo $resAc['Mid_Appraiser_TotalFinalRating'];} ?></td>
	<td align="center"><img src="images/BlinkingArrow.gif" border="0" style="height:15px;width:40px; " /></td>
   </tr>
  </table>
  </td>
 </tr>
 <tr><td style="height:30px;">&nbsp;</td></tr>

 <tr>
  <td>
  <table border="0" style="width:100%;">
   <tr><td colspan="5" class="bdy"><b><i>Training Requirements&nbsp;</i></b>&nbsp;&nbsp;<font style="color:#000000;font-size:18px;">[Mention training requirement during the next appraisal cycle.]</font></td></tr>
  </table>
  </td>
 </tr>
 <tr valign="middle">
  <td>
  <table style="width:95%;">
   <tr><td class="hl"><b>a)&nbsp;Soft Skills Training</b> [Based on Behavioral parameter]</td></tr>
   <tr bgcolor="#FFFFFF">
    <td><input id="AppSoftSkill_1" name="AppSoftSkill_1" value="<?php echo $resAc['Appraiser_SoftSkill_1']; ?>" class="bl" style="width:100%;border:hidden;" maxlength="400" <?php if($resAc['Appraiser_PmsStatus']==2) { echo 'readonly'; } ?> /></td>
   </tr>
   <tr bgcolor="#FFFFFF">
    <td><input id="AppSoftSkill_2" name="AppSoftSkill_2" value="<?php echo $resAc['Appraiser_SoftSkill_2']; ?>" class="bl" style="width:100%;border:hidden;" maxlength="400" <?php if($resAc['Appraiser_PmsStatus']==2) { echo 'readonly'; } ?> /></td>
   </tr>
   <tr><td class="hl"><b>b)&nbsp;Technical Training</b> [Job related]</td></tr>
   <tr bgcolor="#FFFFFF">
    <td><input id="AppTechSkill_1" name="AppTechSkill_1" value="<?php echo $resAc['Appraiser_TechSkill_1']; ?>" class="bl" style="width:100%;border:hidden;" maxlength="400" <?php if($resAc['Appraiser_PmsStatus']==2) { echo 'readonly'; } ?> /></td>
   </tr>
   <tr bgcolor="#FFFFFF">
    <td><input id="AppTechSkill_2" name="AppTechSkill_2" value="<?php echo $resAc['Appraiser_TechSkill_2']; ?>" class="bl" style="width:100%;border:hidden;" maxlength="400" <?php if($resAc['Appraiser_PmsStatus']==2) { echo 'readonly'; } ?> /></td>
   </tr>
  </table>
  </td>
 </tr>
 <tr><td style="height:50px;">&nbsp;</td></tr>


 <tr>
  <td>
  <table width="95%;"> 
   <tr><td colspan="5" class="bdy"><b><i>Appraiser Remarks&nbsp;</i></b></td></tr>
   <tr bgcolor="#FFFFFF">
    <td style="font-family:Times New Roman; color:#FFFFFF; font-size:12px;width:1100px;">
<input id="AppRemarks" name="AppRemarks" value="<?php if($_SESSION['eAppform']=='Y'){ echo $resAc['Appraiser_Remark']; }elseif($_SESSION['eMidform']=='Y'){echo $resAc['Mid_Appraiser_Remark']; } ?>" class="bl" style="width:100%;border:hidden;" maxlength="450" <?php if($resAc['Appraiser_PmsStatus']==2){ echo 'readonly'; } ?> />
    </td>
   </tr>
  </table>
  </td>
 </tr>
 <tr><td style="height:50px;">&nbsp;</td></tr>
 
 
  </table>
  </td>
 </tr>
</table>
</td>
</tr>
</table>
</body>
</html>

