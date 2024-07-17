<?php session_start();
require_once('../AdminUser/config/config.php');


if($_POST['Action']='workingSheet' && $_POST['type']=='numscore')
{
 if($_POST['Dp']>0){ $subQ = 'deptid='.$_POST['Dp']; $Dp=$_POST['Dp']; $Te=0; $clm = 'deptid'; $clmV = $_POST['Dp']; }
 elseif($_POST['Te']>0){ $subQ = 'Rep1='.$_POST['Te']; $Dp=0; $Te=$_POST['Te']; $clm = 'Rep1'; $clmV = $_POST['Te']; }
 
 
 $sql=mysql_query("select * from hrm_pp_workingsheet_inc where hodid=".$_POST['ei']." AND ".$subQ." and yearid=".$_POST['Yi']."",$con); $row=mysql_num_rows($sql);
 if($row>0)
 {
  $sUp=mysql_query("update hrm_pp_workingsheet_inc set rat_".$_POST['rating']."='".$_POST['score']."', crdate='".date("Y-m-d")."' where hodid=".$_POST['ei']." AND ".$subQ." and yearid=".$_POST['Yi']."",$con);
 }
 else
 {
  $sUp=mysql_query("insert into hrm_pp_workingsheet_inc(hodid, ".$clm.", yearid, rat_".$_POST['rating'].", crdate) values(".$_POST['ei'].", ".$clmV.", ".$_POST['Yi'].", '".$_POST['score']."', '".date("Y-m-d")."')",$con);
 }
}



elseif($_POST['Action']='workingSheet' && $_POST['type']=='main')
{
 if($_POST['Dp']>0){ $subQ = 'deptid='.$_POST['Dp']; $Dp=$_POST['Dp']; $Te=0; $clm = 'deptid'; $clmV = $_POST['Dp']; }
 elseif($_POST['Te']>0){ $subQ = 'Rep1='.$_POST['Te']; $Dp=0; $Te=$_POST['Te']; $clm = 'Rep1'; $clmV = $_POST['Te']; } 

 $sql=mysql_query("select * from hrm_pp_workingsheet where hodid=".$_POST['ei']." AND ".$subQ." and yearid=".$_POST['Yi']." and typeid='main'",$con);
 $row=mysql_num_rows($sql);
 if($row>0)
 {
  $sUp=mysql_query("update hrm_pp_workingsheet set gp='".$_POST['GP']."', pp_per='".$_POST['TPP_Per']."', pp_amt='".$_POST['TPP_Amt']."' crdate='".date("Y-m-d")."' where hodid=".$_POST['ei']." AND ".$subQ." and yearid=".$_POST['Yi']." and typeid='main'",$con);
 }
 else
 {
  $sUp=mysql_query("insert into hrm_pp_workingsheet(typeid, hodid, ".$clm.", yearid, gp, pp_per, pp_amt, crdate) values('main', ".$_POST['ei'].", ".$clmV.", ".$_POST['Yi'].", '".$_POST['GP']."', '".$_POST['TPP_Per']."', '".$_POST['TPP_Amt']."', '".date("Y-m-d")."')",$con);
 }
 
 if($sUp){ echo '<input type="hidden" id="RstVal" value="1" />'; }
 else{ echo '<input type="hidden" id="RstVal" value="0" />'; }
  
}

elseif($_POST['Action']='SubSts' && $_POST['ssts']!='')
{
 $sqlM=mysql_query("select * from hrm_pp_workingsheet_submission where hodid=".$_POST['ei']." and yearid=".$_POST['Yi']."",$con);
 $rowM=mysql_num_rows($sqlM);
 if($rowM>0)
 {
  $sUp=mysql_query("update hrm_pp_workingsheet_submission set substs='".$_POST['ssts']."', substsdate='".date("Y-m-d")."' where hodid=".$_POST['ei']." and yearid=".$_POST['Yi']."",$con);
 }
 else
 {
  $sUp=mysql_query("insert into hrm_pp_workingsheet_submission(hodid, substs, yearid, substsdate) values(".$_POST['ei'].", '".$_POST['ssts']."', ".$_POST['Yi'].", '".date("Y-m-d")."')",$con);
 }	
}


elseif($_POST['Action']='workingSheet' && $_POST['type']=='emp')
{
 if($_POST['Dp']>0){ $subQ = 'deptid='.$_POST['Dp']; $Dp=$_POST['Dp']; $Te=0; $clm = 'deptid'; $clmV = $_POST['Dp']; }
 elseif($_POST['Te']>0){ $subQ = 'Rep1='.$_POST['Te']; $Dp=0; $Te=$_POST['Te']; $clm = 'Rep1'; $clmV = $_POST['Te']; }
 
 $sql=mysql_query("select * from hrm_pp_workingsheet where hodid=".$_POST['ei']." and ".$subQ." and yearid=".$_POST['Yi']." and empid=".$_POST['empid']." and typeid='emp'",$con);
 
 $row=mysql_num_rows($sql);
 if($row>0)
 {
  $sUp=mysql_query("update hrm_pp_workingsheet set rating='".$_POST['Rating']."', gp='".$_POST['GP']."', pp_per='".$_POST['PP_Per']."', pp_amt='".$_POST['PP_Amt']."', crdate='".date("Y-m-d")."' where hodid=".$_POST['ei']." AND ".$subQ." and yearid=".$_POST['Yi']." and empid=".$_POST['empid']." and typeid='emp'",$con);
 }
 else
 {
  $sUp=mysql_query("insert into hrm_pp_workingsheet(typeid, hodid, ".$clm.", yearid, empid, rating, gp, pp_per, pp_amt, crdate) values('emp', ".$_POST['ei'].", ".$clmV.", ".$_POST['Yi'].", ".$_POST['empid'].", '".$_POST['Rating']."', '".$_POST['GP']."', '".$_POST['PP_Per']."', '".$_POST['PP_Amt']."', '".date("Y-m-d")."')",$con);
 }
 
 $sUp=mysql_query("update hrm_employee_pms set VP_Indv_Per='".$_POST['PP_Per']."', VP_Final_Per='".$_POST['PP_Per']."', VP_PayAmt='".$_POST['PP_Amt']."' where EmpPmsId=".$_POST['pmsid']." AND HOD_EmployeeID=".$_POST['ei'],$con);
 
 
 if($_POST['Rows']==$_POST['i'])
 {
  if($sUp){ echo '<input type="hidden" id="RstVal" value="1" />'; }
  else{ echo '<input type="hidden" id="RstVal" value="0" />'; }
 }
 
}


?> 
