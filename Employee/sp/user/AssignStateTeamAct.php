<?php require_once('config/config.php');
if($_POST['action']!='' AND $_POST['action']=='AddUpStateEmp')
{ 

if($_POST['ei']>0)
{

$sql=mysql_query("select * from hrm_sales_state_temp where StateId=".$_POST['sti']." AND StateTEmpStatus='A'",$con); $row=mysql_num_rows($sql);
if($row==1)
{$sql2=mysql_query("select * from hrm_sales_state_temp where StateId=".$_POST['sti']." AND EmployeeID=".$_POST['ei']." AND StateTEmpStatus='A'",$con); $row2=mysql_num_rows($sql2);
 if($row2==0)
 {$sql3=mysql_query("select * from hrm_sales_state_temp where StateId=".$_POST['sti']." AND EmployeeID=0 AND StateTEmpStatus='A'",$con); $row3=mysql_num_rows($sql3);
  if($row3==1)
  {$sqlU=mysql_query("update hrm_sales_state_temp set EmployeeID=".$_POST['ei']." StateTEmpFD='".date("Y-m-d")."' where StateId=".$_POST['sti']." AND StateTEmpStatus='A'", $con); }
  else
  {$sqlU=mysql_query("update hrm_sales_state_temp set StateTEmpStatus='D',StateTEmpTD='".date("Y-m-d")."' where StateId=".$_POST['sti']." AND StateTEmpStatus='A'", $con); 
   $sqlU=mysql_query("insert into hrm_sales_state_temp(StateId,EmployeeID,StateTEmpStatus,StateTEmpFD,CompanyId) values(".$_POST['sti'].",".$_POST['ei'].",'A','".date("Y-m-d")."',".$_POST['ci'].")", $con);}
 }
}
elseif($row==0)
{ $sqlU=mysql_query("insert into hrm_sales_state_temp(StateId,EmployeeID,StateTEmpStatus,StateTEmpFD,CompanyId) values(".$_POST['sti'].",".$_POST['ei'].",'A','".date("Y-m-d")."',".$_POST['ci'].")", $con); }

}
elseif($_POST['ei']==0)
{
$sqlU=mysql_query("update hrm_sales_state_temp set StateTEmpStatus='D', StateTEmpFD='".date("Y-m-d")."' where StateId=".$_POST['sti'], $con);
}

if($sqlU){echo '<input type="hidden" id="sn" value="'.$_POST['sn'].'" />'; }
 
}


?>