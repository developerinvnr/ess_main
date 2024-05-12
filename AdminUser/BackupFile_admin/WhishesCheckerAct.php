<?php
require_once('config/config.php');

if($_POST['For']=='ChkOnWishMail' && $_POST['d']!='' && $_POST['m']!='' && $_POST['y']!='' && $_POST['u']!='' && $_POST['vv']!='' && $_POST['c']!='')
{ 
  $dateC=$_POST['y']."-".$_POST['m']."-".$_POST['d'];
  $sql=mysql_query("select * from hrm_wishmail_checker where WDate='".$dateC."' AND CompanyId=".$_POST['c'],$con); $row=mysql_num_rows($sql);
  if($row==0)
  {
   $Du=mysql_query("insert into hrm_wishmail_checker(WDate, WCheck, WCheckBy, WCheckDate, CompanyId) values('".$dateC."', '".$_POST['vv']."', ".$_POST['u'].", '".date("Y-m-d")."', ".$_POST['c'].")",$con);
  }
  else
  {
   $Du=mysql_query("update hrm_wishmail_checker set WCheck='".$_POST['vv']."', WCheckBy=".$_POST['u'].", WCheckDate='".date("Y-m-d")."' where WDate='".$dateC."' AND CompanyId=".$_POST['c'],$con);
  }
  
   
  if($Du){ echo '<input type="hidden" id="ChkV" value="1"  />'; }else{echo '<input type="hidden" id="ChkV" value="0"  />'; }
  echo '<input type="hidden" id="ChkVEmp" value='.$_POST['d'].' />';
  echo '<input type="hidden" id="ChkVvv" value='.$_POST['vv'].' />';
}

?>
