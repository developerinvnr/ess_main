<?php require_once('config/config.php'); ?>
<?php 
if($_POST['act']!='' AND $_POST['act']=='verify' AND $_POST['di']!='' AND $_POST['yi']!='' AND $_POST['sn']!='')
{ 
  $sql=mysql_query("select * from hrm_sales_achive_approved where DealerId=".$_POST['di']." AND YearId=".$_POST['yi'], $con); $row=mysql_num_rows($sql);
  if($row==0){ $ins=mysql_query("insert into hrm_sales_achive_approved(DealerId,YearId,EmployeeID,Approved,VarifyDate) values(".$_POST['di'].",".$_POST['yi'].",".$_POST['ei'].",'Y','".date("Y-m-d")."')", $con);}
  else{$ins=mysql_query("update hrm_sales_achive_approved set EmployeeID=".$_POST['ei'].",Approved='Y',VarifyDate='".date("Y-m-d")."' where DealerId=".$_POST['di']." AND YearId=".$_POST['yi'], $con);} 
 if($ins){echo '<input type="hidden" id="sn" value="'.$_POST['sn'].'" /><input type="hidden" id="yi" value="'.$_POST['yi'].'" />';}
}
if($_POST['act']!='' AND $_POST['act']=='saveRemark' AND $_POST['di']!='' AND $_POST['yi']!='' AND $_POST['sn']!='' AND $_POST['rmk']!='')
{ 
  $sql=mysql_query("select * from hrm_sales_achive_approved where DealerId=".$_POST['di']." AND YearId=".$_POST['yi'], $con); $row=mysql_num_rows($sql);
  if($row==0){ $ins=mysql_query("insert into hrm_sales_achive_approved(DealerId,YearId,EmployeeID,Remark,VarifyDate) values(".$_POST['di'].",".$_POST['yi'].",".$_POST['ei'].",'".$_POST['rmk']."','".date("Y-m-d")."')", $con);}
  else{$ins=mysql_query("update hrm_sales_achive_approved set Remark=".$_POST['rmk'].",VarifyDate='".date("Y-m-d")."' where DealerId=".$_POST['di']." AND YearId=".$_POST['yi'], $con);}
 if($ins){echo '<input type="hidden" id="sn" value="'.$_POST['sn'].'" /><input type="hidden" id="yi" value="'.$_POST['yi'].'" />';}
}



if($_POST['act']!='' AND $_POST['act']=='Hqverify' AND $_POST['hqi']!='' AND $_POST['yi']!='' AND $_POST['no']!='')
{ 
  $sql=mysql_query("select * from hrm_sales_achive_approved_hq where HqId=".$_POST['hqi']." AND YearId=".$_POST['yi'], $con); $row=mysql_num_rows($sql);
  if($row==0){ $ins=mysql_query("insert into hrm_sales_achive_approved_hq(HqId,YearId,EmployeeID,Approved,VarifyDate) values(".$_POST['hqi'].",".$_POST['yi'].",".$_POST['ei'].",'Y','".date("Y-m-d")."')", $con);}
  else{$ins=mysql_query("update hrm_sales_achive_approved_hq set EmployeeID=".$_POST['ei'].",Approved='Y',VarifyDate='".date("Y-m-d")."' where HqId=".$_POST['hqi']." AND YearId=".$_POST['yi'], $con);}
 if($ins){echo '<input type="hidden" id="no" value="'.$_POST['no'].'" /><input type="hidden" id="yi" value="'.$_POST['yi'].'" />';}
}
if($_POST['act']!='' AND $_POST['act']=='HQsaveRemark' AND $_POST['hqi']!='' AND $_POST['yi']!='' AND $_POST['no']!='' AND $_POST['rmk']!='')
{ 
  $sql=mysql_query("select * from hrm_sales_achive_approved_hq where HqId=".$_POST['hqi']." AND YearId=".$_POST['yi'], $con); $row=mysql_num_rows($sql);
  if($row==0){ $ins=mysql_query("insert into hrm_sales_achive_approved_hq(HqId,YearId,EmployeeID,Remark,VarifyDate) values(".$_POST['hqi'].",".$_POST['yi'].",".$_POST['ei'].",'".$_POST['rmk']."','".date("Y-m-d")."')", $con);}
  else{$ins=mysql_query("update hrm_sales_achive_approved_hq set Remark=".$_POST['rmk'].",VarifyDate='".date("Y-m-d")."' where HqId=".$_POST['hqi']." AND YearId=".$_POST['yi'], $con);}
 if($ins){echo '<input type="hidden" id="no" value="'.$_POST['no'].'" /><input type="hidden" id="yi" value="'.$_POST['yi'].'" />';}
}




if($_POST['act']!='' AND $_POST['act']=='Stverify' AND $_POST['si']!='' AND $_POST['yi']!='' AND $_POST['no']!='')
{ 
  $sql=mysql_query("select * from hrm_sales_achive_approved_state where StateId=".$_POST['si']." AND YearId=".$_POST['yi'], $con); $row=mysql_num_rows($sql);
  if($row==0){ $ins=mysql_query("insert into hrm_sales_achive_approved_state(StateId,YearId,EmployeeID,Approved,VarifyDate) values(".$_POST['si'].",".$_POST['yi'].",".$_POST['ei'].",'Y','".date("Y-m-d")."')", $con);}
  else{$ins=mysql_query("update hrm_sales_achive_approved_state set EmployeeID=".$_POST['ei'].",Approved='Y',VarifyDate='".date("Y-m-d")."' where StateId=".$_POST['si']." AND YearId=".$_POST['yi'], $con);}
 if($ins){echo '<input type="hidden" id="no" value="'.$_POST['no'].'" /><input type="hidden" id="yi" value="'.$_POST['yi'].'" />';}
}
if($_POST['act']!='' AND $_POST['act']=='StsaveRemark' AND $_POST['si']!='' AND $_POST['yi']!='' AND $_POST['no']!='' AND $_POST['rmk']!='')
{ 
  $sql=mysql_query("select * from hrm_sales_achive_approved_state where StateId=".$_POST['si']." AND YearId=".$_POST['yi'], $con); $row=mysql_num_rows($sql);
  if($row==0){ $ins=mysql_query("insert into hrm_sales_achive_approved_state(StateId,YearId,EmployeeID,Remark,VarifyDate) values(".$_POST['si'].",".$_POST['yi'].",".$_POST['ei'].",'".$_POST['rmk']."','".date("Y-m-d")."')", $con);}
  else{$ins=mysql_query("update hrm_sales_achive_approved_state set Remark=".$_POST['rmk'].",VarifyDate='".date("Y-m-d")."' where StateId=".$_POST['hqi']." AND YearId=".$_POST['yi'], $con);}
 if($ins){echo '<input type="hidden" id="no" value="'.$_POST['no'].'" /><input type="hidden" id="yi" value="'.$_POST['yi'].'" />';}
}


?>
