<?php require_once('../user/config/config.php');

if($_POST['Act']=='AppCalim' && $_POST['fid']!='' && $_POST['m']!='' && $_POST['y']!='')
{
 $Up=mysql_query("update fa_salary set Rep_AppSts=".$_POST['v'].", Rep_AppDate='".date("Y-m-d")."' where SalId=".$_POST['sid']." and FaId=".$_POST['fid']."",$con);  
 if($Up){ echo '<input type="hidden" id="Rstval" value="1" />'; }
 else{ echo '<input type="hidden" id="Rstval" value="0" />'; }
 echo '<input type="hidden" id="RstPval" value="'.$_POST['v'].'" />';
 echo '<input type="hidden" id="sno" value='.$_POST['sn'].'/>';
}


elseif($_POST['Act']=='AppRemoval' && $_POST['fid']!='')
{
 $Up=mysql_query("update fa_details set Remove_Reporting_AppSts=".$_POST['v'].", Remove_Reporting_AppDate='".date("Y-m-d")."' where FaId=".$_POST['fid']."",$con);  
 if($Up){ echo '<input type="hidden" id="Rstval" value="1" />'; }
 else{ echo '<input type="hidden" id="Rstval" value="0" />'; }
 echo '<input type="hidden" id="RstPval" value="'.$_POST['v'].'" />';
 echo '<input type="hidden" id="sno" value='.$_POST['sn'].'/>';
}

elseif($_POST['Act']=='AppModeChange' && $_POST['fid']!='')
{ 
 $Up=mysql_query("update fa_details set MdChng_Reporting_AppSts=".$_POST['v'].", MdChng_Reporting_AppDate='".date("Y-m-d")."' where FaId=".$_POST['fid']."",$con);  
 if($Up){ echo '<input type="hidden" id="Rstval" value="1" />'; }
 else{ echo '<input type="hidden" id="Rstval" value="0" />'; }
 echo '<input type="hidden" id="RstPval" value="'.$_POST['v'].'" />';
 echo '<input type="hidden" id="sno" value='.$_POST['sn'].'/>';
}
?>
