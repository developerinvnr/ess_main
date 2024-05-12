<?php
require_once('../AdminUser/config/config.php');
if(isset($_POST['act']) && $_POST['act']=='Get_A_Topic' && $_POST['v']!='')
{ 
  echo '<select style="width:99%;background-color:#DDFFBB;" class="a" id="TopA_'.$_POST['n'].'" name="TopA_'.$_POST['n'].'" onChange="SelectATop(this.value,'.$_POST['n'].')">';
  $sS2 = mysql_query("SELECT Tid,Topic FROM hrm_pms_training WHERE Type='Soft Skill' AND Sts='A' AND Category='".$_POST['v']."' group by Topic order by Topic,Category", $con); while($rS2 = mysql_fetch_assoc($sS2)){ 
  echo '<option style="background-color:#FFFFFF;" value='.$rS2['Tid'].'>'.$rS2['Topic'].'</option>'; } 
  echo '<option style="background-color:#FFFFFF;" value="69">Other</option>';
  echo '</select>';
}

elseif(isset($_POST['act']) && $_POST['act']=='Get_A_Des' && $_POST['v']!='')
{ 
  if($_POST['v']!=69)
  { 
   $sS2 = mysql_query("SELECT Description FROM hrm_pms_training WHERE Type='Soft Skill' AND Sts='A' AND Tid=".$_POST['v'], $con); $rS2 = mysql_fetch_assoc($sS2); echo $rS2['Description'];
  }
  else
  {
   echo '<input type="text" class="bl" name="AppSoftSkill_oth" style="width:100%;border:hidden;background-color:#DDFFBB;" placeholder="Please Type" onKeyUp="FunOthr(this.value,1)" required/>';
  }
}

elseif(isset($_POST['act']) && $_POST['act']=='Get_B_Topic' && $_POST['v']!='')
{ 
  echo '<select style="width:99%;background-color:#DDFFBB;" class="a" id="TopB_'.$_POST['n'].'" name="TopB_'.$_POST['n'].'" onChange="SelectATop(this.value,'.$_POST['n'].')">';
  $sS2 = mysql_query("SELECT Tid,Topic FROM hrm_pms_training WHERE Type='Functional Skills' AND Sts='A' AND Category='".$_POST['v']."' group by Topic order by Topic,Category", $con); while($rS2 = mysql_fetch_assoc($sS2)){ 
  echo '<option style="background-color:#FFFFFF;" value='.$rS2['Tid'].'>'.$rS2['Topic'].'</option>'; } 
  echo '<option style="background-color:#FFFFFF;" value="70">Other</option>';
  echo '</select>';
}

elseif(isset($_POST['act']) && $_POST['act']=='Get_B_Des' && $_POST['v']!='')
{  
  if($_POST['v']!=70)
  {
  $sS2 = mysql_query("SELECT Description FROM hrm_pms_training WHERE Type='Functional Skills' AND Sts='A' AND Tid=".$_POST['v'], $con); $rS2 = mysql_fetch_assoc($sS2); echo $rS2['Description'];
  }
  else
  {
   echo '<input type="text" class="bl" name="AppTechSkill_oth" style="width:100%;border:hidden;background-color:#DDFFBB;" placeholder="Please Type" onKeyUp="FunOthr(this.value,2)" required/>';
  }
}

else 
{
 echo '<span class="bdy" style="font-size:14px;">Selection issue</span>';
}

?>