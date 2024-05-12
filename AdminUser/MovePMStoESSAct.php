<?php require_once('config/config.php');

if(isset($_POST['Act']) && $_POST['Act']=='AllPMSLet')
{
 if($_POST['a']=='A'){ $field='APP';}
 elseif($_POST['a']=='R'){ $field='REV';}
 elseif($_POST['a']=='H'){ $field='HOD';}
 
 $sql=mysql_query("select * from hrm_pms_allow_letter where EmployeeID=".$_POST['e'],$con);
 $row=mysql_num_rows($sql);
 if($row==0)
 {
  $upi=mysql_query("insert into hrm_pms_allow_letter(EmployeeID,".$field.") values('".$_POST['e']."','".$_POST['v']."')",$con);
 }
 else
 {
  $upi=mysql_query("update hrm_pms_allow_letter set ".$field."='".$_POST['v']."' where EmployeeID=".$_POST['e'],$con);
 }
 
 if($upi){ echo '<input type="hidden" id="RstId" value="1"/>'; }
 else{ echo '<input type="hidden" id="RstId" value="0"/>'; }
 
 echo '<input type="hidden" id="aId" value='.$_POST['a'].' />';
 echo '<input type="hidden" id="nId" value='.$_POST['n'].' />';
 echo '<input type="hidden" id="eId" value='.$_POST['e'].' />';
 echo '<input type="hidden" id="vId" value='.$_POST['v'].' />';
 
}


elseif(isset($_POST['Actt']) && $_POST['Actt']=='PermissionLet')
{
 $upQ=mysql_query("update hrm_pms_setting set ViewLeteer_".$_POST['p']."='".$_POST['v']."' where CompanyId=".$_POST['c']." AND Process='PMS'",$con);
 if($upQ){ echo '<input type="hidden" id="RsttId" value="1"/>'; }
 else{ echo '<input type="hidden" id="RsttId" value="0"/>'; }
}

?>
