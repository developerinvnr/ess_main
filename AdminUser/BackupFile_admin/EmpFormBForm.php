<?php require_once('../AdminUser/config/config.php'); 
date_default_timezone_set('Asia/Kolkata');?>
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
 
 
</script>
</head>
<body class="body" style="" <?php //background-image:url(images/pmsback.png);" ?> >
<input type="hidden" name="ComId" id="ComId" value="<?php echo $_REQUEST['CId']; ?>" />
<input type="hidden" name="YId" id="YId" value="<?php echo $_REQUEST['YId']; ?>" />
<input type="hidden" id="e" value="<?php echo $_REQUEST['EmpId']; ?>"/>


<table border="0" style="width:100%;">
<?php $sqlE=mysql_query("select * from hrm_employee where EmployeeID=".$_REQUEST['EmpId'], $con); $resE=mysql_fetch_array($sqlE); $Ename=$resE['Fname'].' '.$resE['Sname'].' '.$resE['Lname']; 
$cdn=$resE['EmpCode'].'&nbsp;:&nbsp;'.$resE['Fname'].' '.$resE['Sname'].' '.$resE['Lname'].'&nbsp;-&nbsp;'; ?>

<tr>
 <td>
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
<tr style="height:24px;">	
  <td style="width:100%;">
  <table style="width:100%;" bgcolor="#EEF0AA" border="1" cellpadding="0" cellspacing="1" style="border-color:#EEF0AA;"> 
  <tr bgcolor="#EEF0AA">   
  <td class="font" align="center" style="width:5%;">SNo</td>
  <td class="font" align="center" style="width:20%;">Skills</td>
  <td class="font" align="center" style="width:43%;">Description</td>  
  <td class="font" align="center" style="width:8%;">Weightage</td>
  <td class="font" align="center" style="width:8%;">Logic</td>
  <td class="font" align="center" style="width:8%;">Period</td>
  <td class="font" align="center" style="width:8%;">Target</td>
</tr>
<?php $sql=mysql_query("select fbf.*,fb.Skill,fb.SkillComment,fb.Weightage,fb.Logic,fb.Period,fb.Target from hrm_employee_pms_behavioralformb fbf inner join hrm_pms_formb fb on fbf.FormBId=fb.FormBId where fbf.EmpId=".$_REQUEST['EmpId']." AND fbf.YearId=".$_REQUEST['YId']." order by fbf.BehavioralFormBId ASC", $con); 
$k=1; while($res=mysql_fetch_assoc($sql)){ 
$sSubB22=mysql_query("select * from hrm_pms_formbsub where FormBId=".$res['FormBId']." AND BSubStatus='A' order by FormBSubId ASC",$con); $rowSubB=mysql_num_rows($sSubB22); 
?>	
 <tr bgcolor="#FFFFFF" style="height:22px;">   
  <td class="datat" align="center" ><?php echo $k; ?></td>
  <td class="datat"><?php echo $res['Skill']; ?></td>
  <td class="datat"><?php echo $res['SkillComment'] ?></td>  
  <td align="center" class="datat"><?php echo $res['Weightage']; ?></td>
  <td align="center" class="datat"><?php echo $res['Logic']; ?></td>
  <td align="center" class="datat"><?php if($rowSubB>0){ echo ''; }else{ echo $res['Period']; } ?></td>
  
  <td align="center" class="datat"><?php if($rowSubB>0){ echo ''; }else{ ?><a href="#" style="cursor:<?php if($res['Period']!='Annual' AND $res['Period']!=''){echo 'pointer';} ?>;width:100%;text-align:center;text-decoration:<?php if($res['Period']!='Annual' AND $res['Period']!=''){ echo 'underline'; }else{echo 'none';}?>;color:<?php if($res['Period']!='Annual' AND $res['Period']!=''){ echo '#000099'; }else{echo '#000000';}?>;" <?php if($res['Period']!='Annual' AND $res['Period']!=''){?> onClick="FunTgt(<?php echo $res['FormBId']; ?>,'<?php echo $res['Period']; ?>',<?php echo intval($res['Target']).','.intval($res['Weightage']); ?>,'<?php echo $res['Logic']; ?>')" <?php } ?> ><?php echo intval($res['Target']); ?></a><?php } ?></td>
  </tr>

<?php  
if($rowSubB>0)
{
  while($rSubB22=mysql_fetch_assoc($sSubB22))
  {
  $sqlChk=mysql_query("select * from hrm_employee_pms_behavioralformb_sub where FormBSubId=".$rSubB22['FormBSubId']." AND EmpId=".$_REQUEST['EmpId']." AND YearId=".$_REQUEST['YId'],$con); $rowChk=mysql_num_rows($sqlChk);
if($rowChk==0){$sins=mysql_query("insert into hrm_employee_pms_behavioralformb_sub(FormBSubId, EmpId, YearId) values(".$rSubB22['FormBSubId'].", ".$_REQUEST['EmpId'].", ".$_REQUEST['YId'].")",$con);}
  }
?>   
<?php /* &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& Start Start */ ?>
<?php /* &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& Start Start */ ?>
  
 <tr>
  <td colspan="9" align="right" style="border:hidden;border-style:none;">
  <div id="Div<?php echo $SNo; ?>" style="display:<?php if($rowSubB>0){echo 'block';}else{echo 'none';} ?>;">
     <table style="width:97%;background-color:#D5AAAA;" border="0" cellpadding="0" cellspacing="1"> 
     <tr style="background-color:#D5AAAA;">   
      <td align="center" class="Input2a" style="width:30px;">SNo</td>
      <td align="center" class="Input2a" style="width:280px;">Sub Skill</td>
      <td align="center" class="Input2a" style="width:390px;">Sub Skill Description</td>  
      <td align="center" class="Input2a" style="width:60px;">Weightage</td>
	  <td align="center" class="Input2a" style="width:70px;">Logic</td>
	  <td align="center" class="Input2a" style="width:80px;">Period</td>
      <td align="center" class="Input2a" style="width:60px;">Target</td>
     </tr>
<?php if($rowSubK==0){$num=5;}elseif($rowSubK==1){$num=4;}elseif($rowSubK==2){$num=3;}elseif($rowSubK==3){$num=2;}elseif($rowSubK==4){$num=1;}elseif($rowSubK==5){$num=0;} ?>

<?php 
$sSubB=mysql_query("select bb.*,s.PBSubId from hrm_employee_pms_behavioralformb_sub s inner join hrm_pms_formbsub bb on s.FormBSubId=bb.FormBSubId where s.EmpId=".$_REQUEST['EmpId']." AND s.YearId=".$_REQUEST['YId'],$con); /* While Open*/ $m=1; while($rSubB=mysql_fetch_assoc($sSubB)){ 



?>

  <input type="hidden" id="FormBId_<?php echo $SNo; ?>" value="<?php echo $resPer['FormBId']; ?>" />
  <input type="hidden" id="SubFormBId_<?php echo $SNo.'_'.$m; ?>" value="<?php echo $rSubB['FormBSubId']; ?>" />
  <tr style="background-color:#FFFFFF;">  
  <td align="center"><input class="Inputa" style="text-align:center;font-weight:bold;" value="<?php if($m==1){$n='a';}elseif($m==2){$n='b';}elseif($m==3){$n='c';}elseif($m==4){$n='d';}elseif($m==5){$n='e';}echo $n; ?>" readonly/><input type="hidden" id="FormBIdNo_a<?php echo $SNo.'_'.$m; ?>"></td>
  <td align="center"><input id="Skill_a<?php echo $SNo.'_'.$m; ?>" class="Inputa" value="<?php echo $rSubB['Skill']; ?>" maxlength="348" /></td>
  <td align="center"><input id="SkillDes_a<?php echo $SNo.'_'.$m; ?>" class="Inputa" value="<?php echo $rSubB['SkillComment']; ?>" maxlength="580"/></td>  
  
  <td align="center"><input type="hidden" id="WWei_a<?php echo $SNo.'_'.$m; ?>" value="<?php echo $rSubB['Weightage']; ?>"/>
  <input id="Wei_a<?php echo $SNo.'_'.$m; ?>" class="Inputa" value="<?php echo $rSubB['Weightage']; ?>" style="text-align:center;" maxlength="8" onChange="ChangeWeighta(<?php echo $SNo.', '.$m; ?>)"/></td>
  
  <td align="center" style="background-color:#CAE4FF;"><input id="Log_a<?php echo $SNo.'_'.$m; ?>" class="Inputa" style="height:20px;" value="<?php echo $rSubB['Logic']; ?>" /></td>
  <td align="center" style="background-color:#CAE4FF;"><input id="Per_a<?php echo $SNo.'_'.$m; ?>" class="Inputa" style="height:20px;" value="<?php echo $rSubB['Period']; ?>"></td>
  
  <td align="center"><input type="hidden" id="TTar_a<?php echo $SNo.'_'.$m; ?>" value="0"/>
  <input id="Tar_a<?php echo $k.'_'.$m; ?>" class="Inputa" value="<?php echo intval($rSubB['Target']); ?>" style="cursor:<?php if($rSubB['Period']!='Annual' AND $rSubB['Period']!=''){echo 'pointer';} ?>;width:100%; text-align:center;text-decoration:<?php if($rSubB['Period']!='Annual' AND $rSubB['Period']!=''){ echo 'underline'; }?>;color:<?php if($rSubB['Period']!='Annual' AND $rSubB['Period']!=''){ echo '#000099'; }?>;" maxlength="8" <?php if($rSubB['Period']!='Annual' AND $rSubB['Period']!=''){ ?> onClick="FunSubTgt(<?php echo $rSubB['FormBSubId']; ?>,'<?php echo $rSubB['Period']; ?>',<?php echo $rSubB['Target'].','.intval($rSubB['Weightage']); ?>,'<?php echo $rSubB['Logic']; ?>')" <?php } ?> readonly />
  
<?php /*?>onKeyUp="ChangeTargeta(this.value,<?php echo $SNo.', '.$m; ?>)" onChange="ChangeTargeta(this.value,<?php echo $SNo.', '.$m; ?>)"<?php */?>
  
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
  
<?php $k++; } ?>

</table></td>
</tr>
		</table>
	     </td>
	   </td>
 </tr>
          </table>
		 </td>
</form>		 
		</tr>
	  </table>
	</td>
   </tr>
<?php //******************************************** ?>    
  </table>
</body>
</html>



