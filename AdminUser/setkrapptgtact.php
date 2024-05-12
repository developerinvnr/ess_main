<?php session_start();
require_once('config/config.php');

if($_POST['ach']!='' && $_POST['ach2']!='' && $_POST['id']!='')
{
 $up=mysql_query("update hrm_pms_kra_tgtdefin set Ach='".$_POST['ach']."', LogScr='".$_POST['logscr']."', Scor='".$_POST['scor']."', AppAch='".$_POST['ach2']."', AppLogScr='".$_POST['logscr2']."', AppScor='".$_POST['scor2']."' where TgtDefId=".$_POST['id'],$con);
 if($up)
 { 
  echo '<input type="hidden" id="ir" value="'.$_POST['i'].'" /><input type="hidden" id="rst" value="1"/>'; 
  echo '<input type="hidden" id="tAch" value="'.floatval($rest['tAch']).'" />'; 
 }
 else{ echo '<input type="hidden" id="ir" value="'.$_POST['i'].'" /><input type="hidden" id="rst" value="0"/>'; }
}


?>