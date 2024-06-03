<?php session_start();
require_once('../AdminUser/config/config.php');


if($_POST['Action']='workingSheet' && $_POST['type']=='numscore')
{
 if($_POST['Dp']>0){ $subQ = 'deptid='.$_POST['Dp']; $Dp=$_POST['Dp']; $Te=0; $clm = 'deptid'; $clmV = $_POST['Dp']; }
 elseif($_POST['Te']>0){ $subQ = 'Rep1='.$_POST['Te']; $Dp=0; $Te=$_POST['Te']; $clm = 'Rep1'; $clmV = $_POST['Te']; }
 
 
 $sql=mysql_query("select * from hrm_pms_workingsheet_inc where hodid=".$_POST['ei']." AND ".$subQ." and yearid=".$_POST['Yi']."",$con); $row=mysql_num_rows($sql);
 if($row>0)
 {
  $sUp=mysql_query("update hrm_pms_workingsheet_inc set rat_".$_POST['rating']."='".$_POST['score']."', crdate='".date("Y-m-d")."' where hodid=".$_POST['ei']." AND ".$subQ." and yearid=".$_POST['Yi']."",$con);
 }
 else
 {
  $sUp=mysql_query("insert into hrm_pms_workingsheet_inc(hodid, ".$clm.", yearid, rat_".$_POST['rating'].", crdate) values(".$_POST['ei'].", ".$clmV.", ".$_POST['Yi'].", '".$_POST['score']."', '".date("Y-m-d")."')",$con);
 }
}



elseif($_POST['Action']='workingSheet' && $_POST['type']=='main')
{
 if($_POST['Dp']>0){ $subQ = 'deptid='.$_POST['Dp']; $Dp=$_POST['Dp']; $Te=0; $clm = 'deptid'; $clmV = $_POST['Dp']; }
 elseif($_POST['Te']>0){ $subQ = 'Rep1='.$_POST['Te']; $Dp=0; $Te=$_POST['Te']; $clm = 'Rep1'; $clmV = $_POST['Te']; } 

 $sql=mysql_query("select * from hrm_pms_workingsheet where hodid=".$_POST['ei']." AND ".$subQ." and yearid=".$_POST['Yi']." and typeid='main'",$con);
 $row=mysql_num_rows($sql);
 if($row>0)
 {
  $sUp=mysql_query("update hrm_pms_workingsheet set pre_ctc='".$_POST['PreCtc']."', per_prorata='".$_POST['Per_Prorata']."', per_actual='".$_POST['Per_Actual']."', ctc='".$_POST['Ctc']."', corr='".$_POST['Corr']."', per_corr='".$_POST['Per_Corr']."', inc='".$_POST['Inc']."', tot_ctc='".$_POST['TotCtc']."', per_totctc='".$_POST['Per_TotCtc']."', crdate='".date("Y-m-d")."' where hodid=".$_POST['ei']." AND ".$subQ." and yearid=".$_POST['Yi']." and typeid='main'",$con);
 }
 else
 {
  $sUp=mysql_query("insert into hrm_pms_workingsheet(typeid, hodid, ".$clm.", yearid, pre_ctc, per_prorata, per_actual, ctc, corr, per_corr, inc, tot_ctc, per_totctc, crdate) values('main', ".$_POST['ei'].", ".$clmV.", ".$_POST['Yi'].", '".$_POST['PreCtc']."', '".$_POST['Per_Prorata']."', '".$_POST['Per_Actual']."', '".$_POST['Ctc']."', '".$_POST['Corr']."', '".$_POST['Per_Corr']."', '".$_POST['Inc']."', '".$_POST['TotCtc']."', '".$_POST['Per_TotCtc']."', '".date("Y-m-d")."')",$con);
 }
 
 if($sUp){ echo '<input type="hidden" id="RstVal" value="1" />'; }
 else{ echo '<input type="hidden" id="RstVal" value="0" />'; }
  
}

elseif($_POST['Action']='workingSheet' && $_POST['type']=='emp')
{
 if($_POST['Dp']>0){ $subQ = 'deptid='.$_POST['Dp']; $Dp=$_POST['Dp']; $Te=0; $clm = 'deptid'; $clmV = $_POST['Dp']; }
 elseif($_POST['Te']>0){ $subQ = 'Rep1='.$_POST['Te']; $Dp=0; $Te=$_POST['Te']; $clm = 'Rep1'; $clmV = $_POST['Te']; }
 
 $sql=mysql_query("select * from hrm_pms_workingsheet where hodid=".$_POST['ei']." and ".$subQ." and yearid=".$_POST['Yi']." and empid=".$_POST['empid']." and typeid='emp'",$con);
 
 $row=mysql_num_rows($sql);
 if($row>0)
 {
  $sUp=mysql_query("update hrm_pms_workingsheet set rating='".$_POST['Rating']."', pre_ctc='".$_POST['PreCtc']."', per_prorata='".$_POST['Per_Prorata']."', per_actual='".$_POST['Per_Actual']."', ctc='".$_POST['Ctc']."', corr='".$_POST['Corr']."', per_corr='".$_POST['Per_Corr']."', inc='".$_POST['Inc']."', tot_ctc='".$_POST['TotCtc']."', per_totctc='".$_POST['Per_TotCtc']."', crdate='".date("Y-m-d")."' where hodid=".$_POST['ei']." AND ".$subQ." and yearid=".$_POST['Yi']." and empid=".$_POST['empid']." and typeid='emp'",$con);
 }
 else
 {
  $sUp=mysql_query("insert into hrm_pms_workingsheet(typeid, hodid, ".$clm.", yearid, empid, rating, pre_ctc, per_prorata, per_actual, ctc, corr, per_corr, inc, tot_ctc, per_totctc, crdate) values('emp', ".$_POST['ei'].", ".$clmV.", ".$_POST['Yi'].", ".$_POST['empid'].", '".$_POST['Rating']."', '".$_POST['PreCtc']."', '".$_POST['Per_Prorata']."', '".$_POST['Per_Actual']."', '".$_POST['Ctc']."', '".$_POST['Corr']."', '".$_POST['Per_Corr']."', '".$_POST['Inc']."', '".$_POST['TotCtc']."', '".$_POST['Per_TotCtc']."', '".date("Y-m-d")."')",$con);
 
 }
 
 if($_POST['Rows']==$_POST['i'])
 {
  if($sUp){ echo '<input type="hidden" id="RstVal" value="1" />'; }
  else{ echo '<input type="hidden" id="RstVal" value="0" />'; }
 }
 
}


?> 
