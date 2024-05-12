<?php
require_once('config/config.php');
if(isset($_POST['id']) && $_POST['id']!=""){
	$id = $_POST['id'];
   if($id==2) { $SqlSkill2=mysql_query("select * from hrm_appraisal_formb where SkillGradeFrom=6 AND SkillGradeTo=10", $con); }
   elseif($id==3){ $SqlSkill2=mysql_query("select * from hrm_appraisal_formb where SkillGradeFrom=11 AND SkillGradeFrom>=11", $con);} 
   $Sno=1; while($ResSkill2=mysql_fetch_array($SqlSkill2)){ ?>		
		   <tr>
	  <td></td>	   
	  <td align="center" class="font" style="width:50px;">&nbsp;<?php echo $Sno; ?>&nbsp;:&nbsp;</td>
	  <td style="width:322px;background-color:#FFFFFF; overflow:auto;"><textarea name="Skill_1" class="Input" cols="62" style="height:60;background-color:#FFFFFF;" maxlength="250" ><?php echo $ResSkill2['Skill'].' : '.$ResSkill2['SkillComment']; ?></textarea></td>
	  <td align="center" style="width:70px;background-color:#FFFFFF;"><input name="SkillWeightage_1" class="Input" style="width:60px; text-align:center;" maxlength="3"/></td>
	  <td align="center" style="width:60px;background-color:#FFFFFF;"><input name="SkillTarget_1" class="Input" style="width:50px; text-align:center;" value="100" maxlength="3" readonly/></td>
	  <td align="center" style="width:70px;background-color:#FFFFFF;"><input name="SkillSelfRating_1" class="Input" style="width:60px; text-align:center;" maxlength="3"/></td>
	  <td style="width:322px;background-color:#FFFFFF;"><input name="SkillComment_1" class="Input" style="width:322px;" maxlength="200" /></td>
	  <td align="center" style="width:70px;background-color:#FFFFFF;"><input name="SkillAppRaiting_1" class="Input" style="width:60px; text-align:center;" maxlength="3"/></td>
	  <td align="center" style="width:70px;background-color:#FFFFFF;"><input name="SkillAppScore_1" class="Input" style="width:60px; text-align:center;" maxlength="3" value="0" readonly/></td>
	       </tr>
<?php $Sno++; } }?>	

