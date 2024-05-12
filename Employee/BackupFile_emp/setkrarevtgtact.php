<?php session_start();
require_once('../AdminUser/config/config.php'); 
if($_POST['cmnt']!='' && $_POST['id']!='')
{
 $up=mysql_query("update hrm_pms_kra_tgtdefin set RevCmnt='".addslashes($_POST['cmnt'])."' where TgtDefId=".$_POST['id'],$con);
 if($up)
 { 
  echo '<input type="hidden" id="ir" value="'.$_POST['i'].'" /><input type="hidden" id="rst" value="1"/>';  
 }
 else{ echo '<input type="hidden" id="ir" value="'.$_POST['i'].'" /><input type="hidden" id="rst" value="0"/>'; }
}


if($_POST['lockk']!='' && $_POST['lockk']=='OkLock' && $_POST['id']!='')
{ 
 $up=mysql_query("update hrm_pms_kra_tgtdefin set Revlockk=1 where TgtDefId=".$_POST['id'],$con);
 if($up){ echo '<input type="hidden" id="ir2" value="'.$_POST['i'].'" /><input type="hidden" id="rst2" value="1"/>'; }
 else{ echo '<input type="hidden" id="ir2" value="'.$_POST['i'].'" /><input type="hidden" id="rst2" value="0"/>'; }
}
?>