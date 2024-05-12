<?php require_once('config/config.php');
if($_POST['action']!='' AND $_POST['action']=='AddUpHqEmp')
{ 

 $sql=mysql_query("select * from hrm_sales_hq_temp where HqId=".$_POST['hqi']." AND HqTEmpStatus='A'",$con); $row=mysql_num_rows($sql); 
 if($row>0)
 { $sql2=mysql_query("select * from hrm_sales_hq_temp where HqId=".$_POST['hqi']." AND EmployeeID=".$_POST['ei']." AND HqTEmpStatus='A'",$con); $row2=mysql_num_rows($sql2); 
   if($row2==0)
   { $sql3=mysql_query("select * from hrm_sales_hq_temp where HqId=".$_POST['hqi']." AND EmployeeID=0 AND HqTEmpStatus='A'",$con); $row3=mysql_num_rows($sql3); 
     if($row3>0)
	 { $sqlU=mysql_query("update hrm_sales_hq_temp set EmployeeID=".$_POST['ei'].", HqTEmpFD='".date("Y-m-d")."' where HqId=".$_POST['hqi']." AND HqTEmpStatus='A'", $con); }
	 else
	 {
	  $sqlU=mysql_query("update hrm_sales_hq_temp set HqTEmpStatus='D',HqTEmpTD='".date("Y-m-d")."' where HqId=".$_POST['hqi']." AND HqTEmpStatus='A'", $con); 
      $sqlU=mysql_query("insert into hrm_sales_hq_temp(HqId,EmployeeID,HqTEmpStatus,HqTEmpFD,CompanyId) values(".$_POST['hqi'].",".$_POST['ei'].",'A','".date("Y-m-d")."',".$_POST['ci'].")", $con);
	 }
   }
 }
 elseif($row==0)
 { $sqlU=mysql_query("insert into hrm_sales_hq_temp(HqId,EmployeeID,HqTEmpStatus,HqTEmpFD,CompanyId) values(".$_POST['hqi'].",".$_POST['ei'].",'A','".date("Y-m-d")."',".$_POST['ci'].")", $con); }
 
 if($sqlU){echo '<input type="hidden" id="sn" value="'.$_POST['sn'].'" />'; }
 
}