<?php require_once('../AdminUser/config/config.php'); 
date_default_timezone_set('Asia/Kolkata');

if(isset($_POST['SaveFormB']))
{
 $totRw=$_POST['RowCountV']+$_POST['RowCount2V'];
 $sqlPms=mysql_query("select EmpPmsId from hrm_employee_pms where AssessmentYear=".$_POST['KraYId']." AND EmployeeID=".$_POST['EmpId'], $con); $rowPms=mysql_num_rows($sqlPms);
 if($rowPms>0){ $resPms=mysql_fetch_array($sqlPms); $PmsId=$resPms['EmpPmsId']; }else{ $PmsId=0; }

   /********************** FormB FormB Open ****************************/
   $sqlb=mysql_query("select * from hrm_employee_pms_behavioralformb where EmpId=".$_POST['EmpId']." AND YearId=".$_POST['KraYId']."", $con); $rowb=mysql_num_rows($sqlb);
   if($rowb>0)
   {
    while($resb=mysql_fetch_assoc($sqlb))
	{
     for($i=1; $i<=$totRw; $i++)
	 {
	  if($resb['FormBId']==$_POST['FormBIdM_'.$i]){ $test=1; break; }else{ $test=0; }
	 }
	 if($test==0){ $sqlDe=mysql_query("delete from hrm_employee_pms_behavioralformb where FormBId=".$resb['FormBId']." AND EmpId=".$_POST['EmpId']." AND YearId=".$_POST['KraYId']."", $con); }
	} //while
	
	for($j=1; $j<=$totRw; $j++)
	{
	 $sqlbf=mysql_query("select * from hrm_employee_pms_behavioralformb where FormBId=".$_POST['FormBIdM_'.$j]." AND EmpId=".$_POST['EmpId']." AND YearId=".$_POST['KraYId']."", $con); $rowbf=mysql_num_rows($sqlbf);
	 if($rowbf==0){ $sqlIn=mysql_query("insert into hrm_employee_pms_behavioralformb(EmpPmsId, FormBId, EmpId, YearId, EmpStatus, AppStatus) values(".$PmsId.", ".$_POST['FormBIdM_'.$j].", ".$_POST['EmpId'].", ".$_POST['KraYId'].", 'P', 'P')",$con); }	
    }
   }
   else
   {
	
	for($j=1; $j<=$totRw; $j++)
	{ 
	 $sqlIn=mysql_query("insert into hrm_employee_pms_behavioralformb(EmpPmsId, FormBId, EmpId, YearId, EmpStatus) values(".$PmsId.", ".$_POST['FormBIdM_'.$j].", ".$_POST['EmpId'].", ".$_POST['KraYId'].", 'P')",$con); 
    }	
	  
   }
   /********************** FormB FormB Close ****************************/
   
 if($sqlIn){ $msg='Form-B save successfully'; }

}

if(isset($_POST['SubmitKRA']))
{
 $totRw=$_POST['RowCountV']+$_POST['RowCount2V'];
 $sqlPms=mysql_query("select EmpPmsId from hrm_employee_pms where AssessmentYear=".$_POST['KraYId']." AND EmployeeID=".$_POST['EmpId'], $con); $rowPms=mysql_num_rows($sqlPms);
 if($rowPms>0){ $resPms=mysql_fetch_array($sqlPms); $PmsId=$resPms['EmpPmsId']; }else{ $PmsId=0; }

   /********************** FormB FormB Open ****************************/
   $sqlb=mysql_query("select * from hrm_employee_pms_behavioralformb where EmpId=".$_POST['EmpId']." AND YearId=".$_POST['KraYId']."", $con); $rowb=mysql_num_rows($sqlb);
   if($rowb>0)
   {
    while($resb=mysql_fetch_assoc($sqlb))
	{
     for($i=1; $i<=$totRw; $i++)
	 {
	  if($resb['FormBId']==$_POST['FormBIdM_'.$i]){ $test=1; break; }else{ $test=0; }
	 }
	 if($test==0){ $sqlDe=mysql_query("delete from hrm_employee_pms_behavioralformb where FormBId=".$resb['FormBId']." AND EmpId=".$_POST['EmpId']." AND YearId=".$_POST['KraYId']."", $con); }
	} //while
	
	for($j=1; $j<=$totRw; $j++)
	{
	 $sqlbf=mysql_query("select * from hrm_employee_pms_behavioralformb where FormBId=".$_POST['FormBIdM_'.$j]." AND EmpId=".$_POST['EmpId']." AND YearId=".$_POST['KraYId']."", $con); $rowbf=mysql_num_rows($sqlbf);
	 if($rowbf==0){ $sqlIn=mysql_query("insert into hrm_employee_pms_behavioralformb(EmpPmsId, FormBId, EmpId, YearId, EmpStatus, AppStatus) values(".$PmsId.", ".$_POST['FormBIdM_'.$j].", ".$_POST['EmpId'].", ".$_POST['KraYId'].", 'A', 'A')",$con); }	
    }
   }
   else
   {
	
	for($j=1; $j<=$totRw; $j++)
	{
	 $sqlIn=mysql_query("insert into hrm_employee_pms_behavioralformb(EmpPmsId, FormBId, EmpId, YearId, EmpStatus, AppStatus) values(".$PmsId.", ".$_POST['FormBIdM_'.$j].", ".$_POST['EmpId'].", ".$_POST['KraYId'].", 'A', 'A')",$con); 
    }	
	  
   }
   $sqlIn=mysql_query("update hrm_employee_pms_behavioralformb set EmpStatus='A', AppStatus='A' where EmpId=".$_POST['EmpId']." AND YearId=".$_POST['KraYId'],$con);
   /********************** FormB FormB Close ****************************/
   
 if($sqlIn){ $msg='Form-B submitted successfully'; $sqlUp2=mysql_query("update hrm_employee_pms set SkillSetting='Y' where EmpPmsId=".$PmsId." AND AssessmentYear=".$_POST['KraYId'], $con); }

}


?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>

<style>.font {color:#000; font-family:Georgia; font-size:15px; font-weight:bold; height:25px;}  .font {color:#000; font-family:Times New Roman; font-size:12px;}
.Input{font-family:"Times New Roman", Times, serif; font-size:14px; height:22px;border-style:hidden; border-bottom-color:#FFFFFF; border-left-color:#FFFFFF; border-right-color:#FFFFFF; border-top-color:#FFFFFF; border:0;background-color:#FFFFFF;}.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;} .font1 { font-family:Georgia; font-size:11px; height:14px; } .font2 { font-size:11px;width:260px;height:18px;}.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:13px;} .TableHead { font-family:Times New Roman; color:#FFFFFF; font-size:15px; }.TableHead1 { font-family:Times New Roman; color:#000000; background-color:#FFFFFF; font-size:13px; overflow:hidden; } .InputText {font-family:Times New Roman; font-size:12px; width:100px; height:19px; }.Input2{font-family:Times New Roman; height:22px;border-style:hidden; border-bottom-color:#EEF0AA; border-left-color:#EEF0AA; border-right-color:#EEF0AA; border-top-color:#EEF0AA; border:0;background-color:#EEF0AA; font-weight:bold;}.Input2a{font-family:Times New Roman; height:22px;background-color:#D5AAAA;font-weight:bold; font-size:12px;text-align:center;}.Inputa{font-family:"Times New Roman", Times, serif; font-size:14px; height:22px;border-style:hidden; border-bottom-color:#FFFFFF; border-left-color:#FFFFFF; border-right-color:#FFFFFF; border-top-color:#FFFFFF; border:0;background-color:#CAE4FF;}.datat{color:#000;font-family:Times New Roman;font-size:14px;}
.h11{size:13px;color:#000000;font-weight:bold;width:100px;font-family:Times New Roman;text-align:right;}
.h12{size:13px;color:#0067CE;font-weight:bold;width:100px;font-family:Times New Roman;text-align:left;}
.Input2a{font-family:Times New Roman; height:22px;background-color:#D5AAAA;font-weight:bold; font-size:12px;text-align:center;}.Inputa{font-family:"Times New Roman", Times, serif; font-size:14px; height:22px;border-style:hidden; border-bottom-color:#FFFFFF; border-left-color:#FFFFFF; border-right-color:#FFFFFF;width:100%; border-top-color:#FFFFFF; border:0;background-color:#CAE4FF;}
Input2a{font-family:Times New Roman; height:22px;font-weight:bold; font-size:12px;text-align:center;}.Inputa{font-family:"Times New Roman", Times, serif; font-size:14px; height:22px;border-style:hidden; border-bottom-color:#FFFFFF; border-left-color:#FFFFFF; border-right-color:#FFFFFF;width:100%; border-top-color:#FFFFFF; border:0;}
</style>
<script language="javascript" type="text/javascript">
//function Printpage(){ window.print(); window.close(); }
 
function FunTgt(bid,prd,tgt,wgt,lgc)
{ var e=document.getElementById("e").value; var c=document.getElementById("ComId").value;
  var yid=document.getElementById("YId").value;
  var win = window.open("setformbtgt.php?act=setkratgt&n=1&valueins=true&checkalpha=false&d=12&pa=4&y=2&fbid="+bid+"&prd="+prd+"&yy=t1t&tgt="+tgt+"&e="+e+"&lgc="+lgc+"&wgt="+wgt+"&c="+c+"&yid="+yid, "QForm", "menubar=no,scrollbars=yes,resizable=no,directories=no,width=1200,height=600"); 
}

function FunSubTgt(bid,prd,tgt,wgt,lgc)
{ var e=document.getElementById("e").value; var c=document.getElementById("ComId").value; 
  var yid=document.getElementById("YId").value;
  var win = window.open("setformbtgt.php?act=setkratgt&n=2&valueins=true&checkalpha=false&d=12&pa=4&y=2&fbid="+bid+"&prd="+prd+"&yy=t1t&tgt="+tgt+"&e="+e+"&lgc="+lgc+"&wgt="+wgt+"&c="+c+"&yid="+yid, "QForm", "menubar=no,scrollbars=yes,resizable=no,directories=no,width=1200,height=600"); 
} 


function FunChangeformB(T,Id,BId,DId,GId,EId)
{
 if(T=='O')
 { document.getElementById("btnC"+Id).style.display='none'; document.getElementById("btnO"+Id).style.display='block'; 
   document.getElementById("FomBDiv_"+Id).style.display='block';
 }
 else if(T=='C')
 { document.getElementById("btnC"+Id).style.display='block'; document.getElementById("btnO"+Id).style.display='none'; 
   document.getElementById("FomBDiv_"+Id).style.display='none';
 }
 
}

function FunClickRdo(j,k,Id)
{
  document.getElementById("FormBIdM_"+j).value=Id;
}


function ValidationAchive(FormBForm)
{
 var conf=confirm("Are you sure?");
 if(conf){ return true; }else{ return false; }
}


 
 
</script>
</head>
<body class="body" style="" <?php //background-image:url(images/pmsback.png);" ?> >
<form name="FormBForm" method="post" onSubmit="return ValidationAchive(this)">

<input type="hidden" name="ComId" id="ComId" value="<?php echo $_REQUEST['CId']; ?>" />
<input type="hidden" name="KraYId" id="KraYId" value="<?php echo $_REQUEST['YId']; ?>" />
<input type="hidden" id="e" name="EmpId" value="<?php echo $_REQUEST['EmpId']; ?>"/>


<table border="0" style="width:100%;">
<?php $sqlE=mysql_query("select * from hrm_employee where EmployeeID=".$_REQUEST['EmpId'], $con); $resE=mysql_fetch_array($sqlE); $Ename=$resE['Fname'].' '.$resE['Sname'].' '.$resE['Lname']; 
$cdn=$resE['EmpCode'].'&nbsp;:&nbsp;'.$resE['Fname'].' '.$resE['Sname'].' '.$resE['Lname'].'&nbsp;-&nbsp;'; 

$sqlDoj=mysql_query("select DateJoining,GradeId,DepartmentId,EmpVertical from hrm_employee_general where EmployeeID=".$_REQUEST['EmpId'],$con); $resDoj=mysql_fetch_assoc($sqlDoj);
?>

<?php
$sqlB=mysql_query("select * from hrm_employee_pms_behavioralformb where YearId=".$_REQUEST['YId']." AND EmpId=".$_REQUEST['EmpId']." AND (EmpStatus='D' OR EmpStatus='P')", $con); $rowB=mysql_num_rows($sqlB); 

$sqlBB=mysql_query("select * from hrm_employee_pms_behavioralformb where YearId=".$_REQUEST['YId']." AND EmpId=".$_REQUEST['EmpId']." AND EmpStatus='A' AND EmpStatus!='D' AND EmpStatus!='P'", $con); $rowBB=mysql_num_rows($sqlBB);

?>

<tr><td>&nbsp;</td></tr>
<tr>
 <td style="text-align:center;">
  <table border="0">
   <tr>
      <td style="width:100px;" class="h11">&nbsp;EmpCode :</td>
      <td style="width:80px;" class="h12"><?php echo $resE['EmpCode']; ?></td>
      <td style="width:60px;" class="h11">Name :</td>
      <td style="width:250px;" class="h12"><?php echo $Ename; ?></td>
  </tr>
 </table>
 </td>
</tr>
 <tr>
	   <td style="width:100%;" id="EmpkraStatus" style="display:block;">
	   
		<table border="0" style="width:100%;">
		

<tr>
    <td style="width:2%;"></td>
	<td colspan="8" style="width:98%; text-align:right;">
	<?php if($_REQUEST['T']=='E'){ ?>
	<table border="0" style="width:100%;text-align:right;">
	 <tr>
	  <td>&nbsp;</td>
	  
	  <td style="width:100px;" class="h11">Vertical :</td>
      <td style="width:50px;" class="h12"><input type="checkbox" id="VerticalYN"  <?php if($_REQUEST['vId']=='y'){echo 'checked';}?> onClick="Click(<?=$_REQUEST['YId'].', '.$_REQUEST['EmpId'].', '.$_REQUEST['CId']?>,'<?=$_REQUEST['T']?>')" /></td>
      <script>
          function Click(Y,E,C,T)
          { 
            if(document.getElementById("VerticalYN").checked==true){ var vid='y';}else{ var vid='n'; }
            window.location="EmpFormBForm.php?YId="+Y+"&EmpId="+E+"&CId="+C+"&T="+T+"&vId="+vid;
              
          }
          
      </script>
	  
	  
	  <?php if($rowB>0 AND $rowBB==0){ ?><td class="tdc" style="width:5%;" valign="middle"><input type="Submit" name="SubmitKRA" id="SubmitKRA" value="final submit" style="width:130px;"/></td><?php } ?>

      <?php if(($rowB==0 OR $rowB>0) AND $rowBB==0){ ?>	  
	  <td class="tdc" style="width:5%;" valign="middle"><input type="Submit" name="SaveFormB" id="SaveFormB" style="width:130px;display:block;" value="save as draft"/> <?php /*<input type="button" name="EditK" id="EditK" style="width:130px;" value="Edit" onClick="EditKRAvalue()" style="display:none;"/>*/ ?></td>
	  <?php } ?>	 
	  
	  <td class="tdc" style="width:5%;" valign="middle"><input type="button" name="Refresh" id="Refresh" style="width:90px;" value="Refresh" onClick="javascript:window.location='EmpFormBForm.php?YId=<?=$_REQUEST['YId']?>&EmpId=<?=$_REQUEST['EmpId']?>&CId=<?=$_REQUEST['CId']?>&T=<?=$_REQUEST['T']?>&vId=<?=$_REQUEST['vId']?>'" /></td>
	  
	 </tr>
	</table>
	<?php } //if($_REQUEST['T']=='E') ?>
   </td>	  
  </tr> 
  <tr style="height:24px;">	
   <td style="width:2%;"></td> 
   <td colspan="8" style="width:98%;">
    <table border="1" style="width:100%;" cellspacing="0"> 
	 <tr style="background-color:#FFFF53;"><td colspan="9" align="center" class="tdc" style="font-family:Times New Roman; font-size:14px;height:25px;font-size:14px; border-bottom:hidden;" valign="middle"><b>Form - B (Behavioural)</b></td></tr>
     <tr style="height:25px;background-color:#FFFF53;">   
      <td class="tdc" style="width:30px;font-family:Times New Roman; font-size:14px;"><b>Sn</b></td>
      <td class="tdc" style="width:300px;font-family:Times New Roman; font-size:14px;"><b>Behavioral/Skills</b></td>
      <td class="tdc" style="width:400px;font-family:Times New Roman; font-size:14px;"><b>Description</b></td>  
      <td class="tdc" style="width:60px;font-family:Times New Roman; font-size:14px;"><b>Weightage</b></td>
      <td class="tdc" style="width:80px;font-family:Times New Roman; font-size:14px;"><b>Logic</b></td>
      <td class="tdc" style="width:80px;font-family:Times New Roman; font-size:14px;"><b>Period</b></td>
      <td class="tdc" style="width:60px;font-family:Times New Roman; font-size:14px;"><b>Target</b></td>
	  <?php if($rowBB==0 AND $_REQUEST['T']=='E'){ ?><td class="tdc" style="width:60px;font-family:Times New Roman; font-size:14px;"><b>Action</b></td><?php } ?>
     </tr>
<?php /**********************************************************/ ?>
<?php if($_REQUEST['vId']=='y'){ $qsub="fbg.Vertical=".$resDoj['EmpVertical']; }
      else{ $qsub="fbg.Vertical=0"; }
 
/*      
if($rowBB==0)
{ 
 $sqlBY=mysql_query("select fb.* from hrm_pms_formb fb INNER JOIN hrm_pms_formb_grade fbg ON fb.FormBId=fbg.FormBId where fb.SkillStatus='A' AND fb.DepartmentId=".$resDoj['DepartmentId']." AND fb.GroupFor='' AND fbg.GradeId=".$resDoj['GradeId']." and ".$qsub." order by FormBId", $con);
}
else
{ 
 $sqlBY=mysql_query("select fb.* from hrm_pms_formb fb INNER JOIN hrm_employee_pms_behavioralformb fbg ON fb.FormBId=fbg.FormBId where fb.SkillStatus='A' AND fbg.YearId=".$_REQUEST['YId']." AND fbg.EmpId=".$_REQUEST['EmpId']." order by FormBId", $con); 
}
*/

$sqlBY=mysql_query("select fb.* from hrm_pms_formb fb INNER JOIN hrm_employee_pms_behavioralformb fbg ON fb.FormBId=fbg.FormBId where fb.SkillStatus='A' AND fbg.YearId=".$_REQUEST['YId']." AND fbg.EmpId=".$_REQUEST['EmpId']." order by FormBId", $con); 
$rowBY=mysql_num_rows($sqlBY); ?>
<input type="hidden" id="RowCountV" name="RowCountV" value="<?=$rowBY?>" />
<?php $i=1; while($resBY=mysql_fetch_array($sqlBY)){ ?>

 <tr bgcolor="#FFFFFF" style="height:24px;">   
  <td class="font1" align="center" style="font-size:12px;"><?php echo $i; ?></td>	  
  <td class="font1" valign="top" style="font-size:12px;"><?php echo ucwords(strtolower($resBY['Skill'])); ?></td>
  <td class="font1" valign="top" style="font-size:12px;"><?php echo $resBY['SkillComment']; ?></td>
  <td class="font1" align="center" style="font-size:12px;"><?php echo $resBY['Weightage']; ?></td>
  <td class="font1" align="center" style="font-size:12px;"><?php echo $resBY['Logic']; ?></td>
  <td class="font1" align="center" style="font-size:12px;"><?php echo $resBY['Period']; ?></td>
  <td class="font1" align="center" style="font-size:12px;"><span <?php if($resBY['Period']!='Annual' AND $resBY['Period']!=''){ echo 'style="cursor:pointer;text-decoration:underline;color:#000099;"';} if($resBY['Period']!='Annual' AND $resBY['Period']!=''){ ?> onClick="FunFormBTgt(<?php echo $YearId.','.$resBY['FormBId']; ?>,'<?php echo $resBY['Period']; ?>',<?php echo $resBY['Target'].','.intval($resBY['Weightage']); ?>,'<?php echo $resBY['Logic']; ?>')" <?php } ?>  ><?php echo $resBY['Target']; ?></span></td>
  <?php if($rowBB==0 AND $_REQUEST['T']=='E'){ ?>
  <td class="font1" align="center">&nbsp;
  <input type="hidden" id="FormBIdM_<?=$i?>" name="FormBIdM_<?=$i?>" value="<?=$resBY['FormBId']?>" />
  </td>
  <?php } ?>
 </tr> 
   
<?php $i++; } $j=$i; ?>

<?php if($rowBB==0){ ?>

<?php
 if($rowB>0)
 {
 $sqlBY=mysql_query("select fb.* from hrm_pms_formb fb INNER JOIN hrm_employee_pms_behavioralformb fbg ON fb.FormBId=fbg.FormBId where fb.SkillStatus='A' AND fbg.YearId=".$_REQUEST['YId']." AND fbg.EmpId=".$_REQUEST['EmpId']." AND fb.GroupFor!='' order by fbg.FormBId", $con);
 }
 else
 {
 $sqlBY=mysql_query("select fb.* from hrm_pms_formb fb INNER JOIN hrm_pms_formb_grade fbg ON fb.FormBId=fbg.FormBId where fb.SkillStatus='A' AND fb.DepartmentId=".$resDoj['DepartmentId']." AND fb.GroupFor!='' AND fbg.GradeId=".$resDoj['GradeId']." and ".$qsub." group by GroupFor order by FormBId", $con);
 }
 $rowB2Y=mysql_num_rows($sqlBY); ?>
 <input type="hidden" id="RowCount2V" name="RowCount2V" value="<?=$rowB2Y?>" /> 
 <?php  while($resBY=mysql_fetch_array($sqlBY)){ ?>

 <tr bgcolor="#FFFFFF" style="height:24px;">   
  <td class="font1" align="center" style="font-size:12px;"><?php echo $j; ?></td>	  
  <td class="font1" valign="top" style="font-size:12px;"><?php echo ucwords(strtolower($resBY['Skill'])); ?></td>
  <td class="font1" valign="top" style="font-size:12px;"><?php echo $resBY['SkillComment']; ?></td>
  <td class="font1" align="center" style="font-size:12px;"><?php echo $resBY['Weightage']; ?></td>
  <td class="font1" align="center" style="font-size:12px;"><?php echo $resBY['Logic']; ?></td>
  <td class="font1" align="center" style="font-size:12px;"><?php echo $resBY['Period']; ?></td>
  <td class="font1" align="center" style="font-size:12px;"><span <?php if($resBY['Period']!='Annual' AND $resBY['Period']!=''){ echo 'style="cursor:pointer;text-decoration:underline;color:#000099;"';} if($resBY['Period']!='Annual' AND $resBY['Period']!=''){ ?> onClick="FunFormBTgt(<?php echo $_REQUEST['YId'].','.$resBY['FormBId']; ?>,'<?php echo $resBY['Period']; ?>',<?php echo $resBY['Target'].','.intval($resBY['Weightage']); ?>,'<?php echo $resBY['Logic']; ?>')" <?php } ?>  ><?php echo $resBY['Target']; ?></span></td>
  
  <?php if($rowBB==0 AND $_REQUEST['T']=='E'){ ?>
  <td class="font1" align="center"><span style="cursor:pointer;"><img src="images/close-folder.png" id="btnC<?=$j?>" onClick="FunChangeformB('O',<?=$j.','.$resBY['FormBId'].','.$resDoj['DepartmentId'].','.$resDoj['GradeId'].','.$_REQUEST['EmpId']?>)"/><img src="images/open-folder.png" id="btnO<?=$j?>" onClick="FunChangeformB('C',<?=$j.','.$resBY['FormBId'].','.$resDoj['DepartmentId'].','.$resDoj['GradeId'].','.$_REQUEST['EmpId']?>)" style="display:none;"/></span>
  <input type="hidden" id="FormBIdM_<?=$j?>" name="FormBIdM_<?=$j?>" value="<?=$resBY['FormBId']?>" />
  </td>
  <?php } ?>
 </tr> 
 <tr>
  <td colspan="8">
    
   <div id="FomBDiv_<?=$j?>" style="display:none;">
<?php /*************************************************/ ?>    
<?php /*************************************************/ ?>
<table border="1" style="width:100%;" cellspacing="0">
 <tr style="background-color:#0079F2;color:#FFFFFF;"><td colspan="9" class="tdc" style="height:22px;font-size:14px; border-bottom:hidden; text-align:left;" valign="middle">&nbsp;&nbsp;<b>Select Any One:</b></td></tr>
 <?php $sqlBF=mysql_query("select fb.* from hrm_pms_formb fb INNER JOIN hrm_pms_formb_grade fbg ON fb.FormBId=fbg.FormBId where fb.SkillStatus='A' AND fb.DepartmentId=".$resDoj['DepartmentId']." AND fb.GroupFor!='' AND fbg.GradeId=".$resDoj['GradeId']." AND fb.GroupFor='".$resBY['GroupFor']."' and ".$qsub." order by FormBId", $con);  
  $k=1; while($resBF=mysql_fetch_array($sqlBF)){ ?>
 
 <tr bgcolor="#FFFFB0" style="height:24px;">   
  <td class="font1" align="center" style="font-size:12px;width:35px;vertical-align:middle;">
  <input type="radio" name="Rdo<?=$j?>" id="R<?=$k?>" style="cursor:pointer;" onClick="FunClickRdo(<?=$j.','.$k.','.$resBF['FormBId']?>)" <?php if($resBY['FormBId']==$resBF['FormBId']){ echo 'checked';} ?>/>
  </td>	  
  <td class="font1" valign="top" style="font-size:12px;width:350px;"><?=ucwords(strtolower($resBF['Skill'])); ?></td>
  <td class="font1" valign="top" style="font-size:12px;"><?=$resBF['SkillComment']?></td>
  <?php /*
  <td class="font1" align="center" style="font-size:12px;width:80px;"><?=$resBF['Weightage']?></td>
  <td class="font1" align="center" style="font-size:12px;width:80px;"><?=$resBF['Logic']?></td>
  <td class="font1" align="center" style="font-size:12px;width:80px;"><?=$resBF['Period']?></td>
  <td class="font1" align="center" style="font-size:12px;width:80px;"><?=$resBF['Target']?></td>\
  */ ?>
 </tr> 
 <?php $k++; } ?>
 
</table> 
<?php /*************************************************/ ?>
<?php /*************************************************/ ?>	

	
   </div>
  </td>
 </tr>
	  
<?php $j++; } ?> <input type="hidden" id="EditTNRow" name="EditTNRow" value="<?php echo $tn; ?>" />

<?php } //if($rowBB==0) ?> 

<?php /**********************************************************/ ?>	 
	 
	 
	</table>
   </td>
  </tr>
 </table>
 </td>
</tr>
</form>  

	 
		</tr>
	  </table>
	</td>
   </tr>
<?php //******************************************** ?>    
  </table>
</body>
</html>



