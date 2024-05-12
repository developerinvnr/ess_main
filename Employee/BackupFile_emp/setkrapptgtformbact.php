<?php session_start();
require_once('../AdminUser/config/config.php'); 
if($_POST['ach']!='' && $_POST['cmnt']!='' && $_POST['id']!='')
{
 $up=mysql_query("update hrm_pms_formb_tgtdefin set AppAch='".$_POST['ach']."', AppCmnt='".$_POST['cmnt']."', AppLogScr='".$_POST['logscr']."', AppScor='".$_POST['scor']."' where TgtFbDefId=".$_POST['id'],$con);
 if($up)
 { 
  //$sqlt=mysql_query("select SUM(AppAch) as tAch from hrm_pms_formb_tgtdefin where ".$_POST['fn']."=".$_POST['fbid'],$con); 
  //$rest=mysql_fetch_assoc($sqlt);
  echo '<input type="hidden" id="ir" value="'.$_POST['i'].'" /><input type="hidden" id="rst" value="1"/>'; 
  echo '<input type="hidden" id="tAch" value="'.floatval($rest['tAch']).'" />'; 
 }
 else{ echo '<input type="hidden" id="ir" value="'.$_POST['i'].'" /><input type="hidden" id="rst" value="0"/>'; }
}


if($_POST['lockk']!='' && $_POST['lockk']=='OkLock' && $_POST['id']!='')
{ 
 $up=mysql_query("update hrm_pms_formb_tgtdefin set Applockk=1 where TgtFbDefId=".$_POST['id'],$con);
 if($up){ echo '<input type="hidden" id="ir2" value="'.$_POST['i'].'" /><input type="hidden" id="rst2" value="1"/>'; }
 else{ echo '<input type="hidden" id="ir2" value="'.$_POST['i'].'" /><input type="hidden" id="rst2" value="0"/>'; }
}
?>