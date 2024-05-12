<?php session_start();
 if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}

if(isset($_POST['Act']) && $_POST['Act']=='EligMaster' && $_POST['t']!='' && $_POST['c']!='' && $_POST['d']!='' && $_POST['g']!='' && $_POST['v']!='')
{
 if($_POST['v']>0){$SubQry='VerticalId='.$_POST['v'];}else{$SubQry='1=1';}
 if($_POST['t']==1)
 {
   $upSubQ="set CategoryA='".trim($_POST['CategoryA'])."', CategoryB='".trim($_POST['CategoryB'])."', CategoryC='".trim($_POST['CategoryC'])."', DA_OutSiteHQ='".trim($_POST['DA_OutSiteHQ'])."', DA_InSiteHQ='".trim($_POST['DA_InSiteHQ'])."', Mobile='".trim($_POST['Mobile'])."', Mobile_WithGPS='".trim($_POST['Mobile_WithGPS'])."', Mobile_Remb='".trim($_POST['Mobile_Remb'])."', Mobile_Remb_Period='".trim($_POST['Mobile_Remb_Period'])."', Laptop_Amt='".trim($_POST['Laptop_Amt'])."', Mediclaim_Coverage_Slabs='".trim($_POST['Mediclaim_Coverage_Slabs'])."', Helth_CheckUp='".trim($_POST['Helth_CheckUp'])."', CrBy='".trim($_POST['u'])."', CrDate='".date("Y-m-d")."', SysDate='".date("Y-m-d")."'";
   $insSubQ="(CompanyId, DepartmentId, GradeId, GradeValue, VerticalId, CategoryA, CategoryB, CategoryC, DA_OutSiteHQ, DA_InSiteHQ, Mobile, Mobile_WithGPS, Mobile_Remb, Mobile_Remb_Period, Laptop_Amt, Mediclaim_Coverage_Slabs, Helth_CheckUp, CrBy, CrDate, SysDate) values ('".trim($_POST['c'])."', '".trim($_POST['d'])."', '".trim($_POST['g'])."', '".trim($_POST['gv'])."', '".trim($_POST['v'])."', '".trim($_POST['CategoryA'])."', '".trim($_POST['CategoryB'])."', '".trim($_POST['CategoryC'])."', '".trim($_POST['DA_OutSiteHQ'])."', '".trim($_POST['DA_InSiteHQ'])."', '".trim($_POST['Mobile'])."', '".trim($_POST['Mobile_WithGPS'])."', '".trim($_POST['Mobile_Remb'])."', '".trim($_POST['Mobile_Remb_Period'])."', '".trim($_POST['Laptop_Amt'])."', '".trim($_POST['Mediclaim_Coverage_Slabs'])."', '".trim($_POST['Helth_CheckUp'])."', '".trim($_POST['u'])."', '".date("Y-m-d")."', '".date("Y-m-d")."')";
 }
 elseif($_POST['t']==2)
 {
   $upSubQ="set Flight_YN='".trim($_POST['Flight_YN'])."', Flight_Class='".trim($_POST['Flight_Class'])."', Train_YN='".trim($_POST['Train_YN'])."', Train_Class='".trim($_POST['Train_Class'])."', TravelEnt_Rmk='".trim($_POST['TravelEnt_Rmk'])."', TW_Km='".trim($_POST['TW_Km'])."', TW_InHQ_M='".trim($_POST['TW_InHQ_M'])."', TW_InHQ_D='".trim($_POST['TW_InHQ_D'])."', TW_OutHQ_M='".trim($_POST['TW_OutHQ_M'])."', TW_OutHQ_D='".trim($_POST['TW_OutHQ_D'])."', FW_Km='".trim($_POST['FW_Km'])."', FW_InHQ_M='".trim($_POST['FW_InHQ_M'])."', FW_InHQ_D='".trim($_POST['FW_InHQ_D'])."', FW_OutHQ_M='".trim($_POST['FW_OutHQ_M'])."', FW_OutHQ_D='".trim($_POST['FW_OutHQ_D'])."', TravelElig_Rmk='".trim($_POST['TravelElig_Rmk'])."', CrBy='".trim($_POST['u'])."', CrDate='".date("Y-m-d")."', SysDate='".date("Y-m-d")."'";
   $insSubQ="(CompanyId, DepartmentId, GradeId, GradeValue, VerticalId, Flight_YN, Flight_Class, Train_YN, Train_Class, TravelEnt_Rmk, TW_Km, TW_InHQ_M, TW_InHQ_D, TW_OutHQ_M, TW_OutHQ_D, FW_Km, FW_InHQ_M, FW_InHQ_D, FW_OutHQ_M, FW_OutHQ_D, TravelElig_Rmk, CrBy, CrDate, SysDate) values ('".trim($_POST['c'])."', '".trim($_POST['d'])."', '".trim($_POST['g'])."', '".trim($_POST['gv'])."', '".trim($_POST['v'])."', '".trim($_POST['Flight_YN'])."', '".trim($_POST['Flight_Class'])."', '".trim($_POST['Train_YN'])."', '".trim($_POST['Train_Class'])."', '".trim($_POST['TravelEnt_Rmk'])."', '".trim($_POST['TW_Km'])."', '".trim($_POST['TW_InHQ_M'])."', '".trim($_POST['TW_InHQ_D'])."', '".trim($_POST['TW_OutHQ_M'])."', '".trim($_POST['TW_OutHQ_D'])."', '".trim($_POST['FW_Km'])."', '".trim($_POST['FW_InHQ_M'])."', '".trim($_POST['FW_InHQ_D'])."', '".trim($_POST['FW_OutHQ_M'])."', '".trim($_POST['FW_OutHQ_D'])."', '".trim($_POST['TravelElig_Rmk'])."', '".trim($_POST['u'])."', '".date("Y-m-d")."', '".date("Y-m-d")."')";
 }
 
 
 $sql=mysql_query("select * from hrm_master_eligibility where CompanyId=".$_POST['c']." AND DepartmentId=".$_POST['d']." AND GradeId=".$_POST['g']." AND ".$SubQry."",$con); $row=mysql_num_rows($sql);
 if($row>0)
 {
   //echo "update hrm_master_eligibility ".$upSubQ." where CompanyId=".$_POST['c']." AND DepartmentId=".$_POST['d']." AND GradeId=".$_POST['g']." AND ".$SubQry."";     
   $UpIns=mysql_query("update hrm_master_eligibility ".$upSubQ." where CompanyId=".$_POST['c']." AND DepartmentId=".$_POST['d']." AND GradeId=".$_POST['g']." AND ".$SubQry."",$con);   
   if($UpIns){ $Action='update';}
 }
 else
 {
   //echo "insert into hrm_master_eligibility ".$insSubQ."";      
   $UpIns=mysql_query("insert into hrm_master_eligibility ".$insSubQ."",$con);
   if($UpIns){ $Action='insert'; } 
 }
 
 if($UpIns)
 {
  echo '<input type="hidden" id="Upn" value='.$_POST['n'].' />';
  echo '<input type="hidden" id="Upsn" value='.$_POST['sn'].' />';
  echo '<input type="hidden" id="Upt" value='.$_POST['t'].' />';
  echo '<input type="hidden" id="Upsts" value="Y" />';
  
    $sD=mysql_query("select DepartmentName from hrm_department where DepartmentId=".$_POST['d'],$con);
	$sG=mysql_query("select GradeValue from hrm_grade where GradeId=".$_POST['g'],$con);
	$rD=mysql_fetch_assoc($sD); $rG=mysql_fetch_assoc($sG);
    $tbln='user_master_activity'; $ComId=$_POST['c']; $UId=$_POST['u']; $EId=0; $PageName='Eligibility Master';
    $Activity=$Action." masters eligibility for : Department - ".$rD['DepartmentName'].",  Grade - ".$rG['GradeValue'];
    include("logbook.php");
  
 }
 else
 {
  echo '<input type="hidden" id="Upn" value='.$_POST['n'].' />';
  echo '<input type="hidden" id="Upsn" value='.$_POST['sn'].' />';
  echo '<input type="hidden" id="Upt" value='.$_POST['t'].' />';
  echo '<input type="hidden" id="Upsts" value="N" />';
 }


}



elseif(isset($_POST['Actt']) && $_POST['Actt']=='MoveRecordesToOthers' && $_POST['di']!='' && $_POST['d']!='' && $_POST['t']!='' && $_POST['c']!='')
{
 
 $sql=mysql_query("select * from hrm_master_eligibility where CompanyId=".$_POST['c']." AND DepartmentId=".$_POST['d']." order by GradeId, VerticalId",$con); $row=mysql_num_rows($sql);
 if($row>0)
 {
  while($res=mysql_fetch_assoc($sql))
  {
   //if($res['VerticalId']>0){$SubQry='VerticalId='.$res['VerticalId'];}else{$SubQry='1=1';}
   $SubQry='1=1';
   $sD=mysql_query("select DepartmentId from hrm_department where CompanyId=".$_POST['c']." AND DepartmentId=".$_POST['di']." AND DeptStatus='A' AND DepartmentId!=".$_POST['d']." order by DepartmentId",$con); 
   while($rD=mysql_fetch_assoc($sD))
   {
   
    if($_POST['t']==1)
	{
     $sChk=mysql_query("select * from hrm_master_eligibility where CompanyId=".$_POST['c']." AND DepartmentId=".$rD['DepartmentId']." AND GradeId=".$res['GradeId']." AND ".$SubQry."",$con); $rowChk=mysql_num_rows($sChk);
	 if($rowChk==0)
	 {
	  $Ins=mysql_query("insert into hrm_master_eligibility(CompanyId, DepartmentId, GradeId, GradeValue, CategoryA, CategoryB, CategoryC, DA_OutSiteHQ, DA_InSiteHQ, Mobile, Mobile_WithGPS, Mobile_Remb, Mobile_Remb_Period, Laptop_Amt, Mediclaim_Coverage_Slabs, Helth_CheckUp, CrBy, CrDate, SysDate) values('".$_POST['c']."', '".$rD['DepartmentId']."', '".$res['GradeId']."', '".$res['GradeValue']."', '".$res['CategoryA']."', '".$res['CategoryB']."', '".$res['CategoryC']."', '".$res['DA_OutSiteHQ']."', '".$res['DA_InSiteHQ']."', '".$res['Mobile']."', '".$res['Mobile_WithGPS']."', '".$res['Mobile_Remb']."', '".$res['Mobile_Remb_Period']."', '".$res['Laptop_Amt']."', '".$res['Mediclaim_Coverage_Slabs']."', '".$res['Helth_CheckUp']."', '".$_POST['u']."', '".date("Y-m-d")."', '".date("Y-m-d")."')",$con); //VerticalId, '".$res['VerticalId']."',
	 }
	 else
	 {
	  $Ins=mysql_query("update hrm_master_eligibility set CategoryA='".$res['CategoryA']."', CategoryB='".$res['CategoryB']."', CategoryC='".$res['CategoryC']."', DA_OutSiteHQ='".$res['DA_OutSiteHQ']."', DA_InSiteHQ='".$res['DA_InSiteHQ']."', Mobile='".$res['Mobile']."', Mobile_WithGPS='".$res['Mobile_WithGPS']."', Mobile_Remb='".$res['Mobile_Remb']."', Mobile_Remb_Period='".$res['Mobile_Remb_Period']."', Laptop_Amt='".$res['Laptop_Amt']."', Mediclaim_Coverage_Slabs='".$res['Mediclaim_Coverage_Slabs']."', Helth_CheckUp='".$res['Helth_CheckUp']."' where CompanyId=".$_POST['c']." AND DepartmentId=".$rD['DepartmentId']." AND GradeId=".$res['GradeId']." AND ".$SubQry."",$con);
	 }
	
	} //if($_POST['t']==1)
	elseif($_POST['t']==2)
	{
	
	 $sChk=mysql_query("select * from hrm_master_eligibility where CompanyId=".$_POST['c']." AND DepartmentId=".$rD['DepartmentId']." AND GradeId=".$res['GradeId']." AND ".$SubQry."",$con); $rowChk=mysql_num_rows($sChk);
	 if($rowChk==0)
	 {
	  $Ins=mysql_query("insert into hrm_master_eligibility(CompanyId, DepartmentId, GradeId, GradeValue, Flight_YN, Flight_Class, Train_YN, Train_Class, TravelEnt_Rmk, TW_Km, TW_InHQ_M, TW_InHQ_D, TW_OutHQ_M, TW_OutHQ_D, FW_Km, FW_InHQ_M, FW_InHQ_D, FW_OutHQ_M, FW_OutHQ_D, TravelElig_Rmk, CrBy, CrDate, SysDate) values('".$_POST['c']."', '".$rD['DepartmentId']."', '".$res['GradeId']."', '".$res['GradeValue']."', '".$res['Flight_YN']."', '".$res['Flight_Class']."', '".$res['Train_YN']."', '".$res['Train_Class']."', '".$res['TravelEnt_Rmk']."', '".$res['TW_Km']."', '".$res['TW_InHQ_M']."', '".$res['TW_InHQ_D']."', '".$res['TW_OutHQ_M']."', '".$res['TW_OutHQ_D']."', '".$res['FW_Km']."', '".$res['FW_InHQ_M']."', '".$res['FW_InHQ_D']."', '".$res['FW_OutHQ_M']."', '".$res['FW_OutHQ_D']."', '".$res['TravelElig_Rmk']."', '".$_POST['u']."', '".date("Y-m-d")."', '".date("Y-m-d")."')",$con); //VerticalId, '".$res['VerticalId']."',
	 }
	 else
	 {
	  $Ins=mysql_query("update hrm_master_eligibility set Flight_YN='".$res['Flight_YN']."', Flight_Class='".$res['Flight_Class']."', Train_YN='".$res['Train_YN']."', Train_Class='".$res['Train_Class']."', TravelEnt_Rmk='".$res['TravelEnt_Rmk']."', TW_Km='".$res['TW_Km']."', TW_InHQ_M='".$res['TW_InHQ_M']."', TW_InHQ_D='".$res['TW_InHQ_D']."', TW_OutHQ_M='".$res['TW_OutHQ_M']."', TW_OutHQ_D='".$res['TW_OutHQ_D']."', FW_Km='".$res['FW_Km']."', FW_InHQ_M='".$res['FW_InHQ_M']."', FW_InHQ_D='".$res['FW_InHQ_D']."', FW_OutHQ_M='".$res['FW_OutHQ_M']."', FW_OutHQ_D='".$res['FW_OutHQ_D']."', TravelElig_Rmk='".$res['TravelElig_Rmk']."' where CompanyId=".$_POST['c']." AND DepartmentId=".$rD['DepartmentId']." AND GradeId=".$res['GradeId']." AND ".$SubQry."",$con);
	 }
	
	} //elseif($_POST['t']==2)
	
   }
  
  } //while($res=mysql_fetch_assoc($sql))
  
  if($Ins)
  { 
   echo '<input type="hidden" id="PrsSts" value="Done" />'; 
   
    $Action='Move';
    $tbln='user_master_activity'; $ComId=$_POST['c']; $UId=$_POST['u']; $EId=0; $PageName='Eligibility Master';
    $Activity=$Action." masters eligibility for : Department - All applicable,  Grade - All applicable";
    include("logbook.php");
   
  }
  else{ echo '<input type="hidden" id="PrsSts" value="Error" />'; }
  
 }//if($row>0)
 
 
}

/*
elseif(isset($_POST['Actt']) && $_POST['Actt']=='MoveRecordesToOthers' && $_POST['di']!='' && $_POST['d']!='' && $_POST['t']!='' && $_POST['c']!='')
{
 
 $sql=mysql_query("select * from hrm_master_eligibility where CompanyId=".$_POST['c']." AND DepartmentId=".$_POST['d']." order by GradeId, VerticalId",$con); $row=mysql_num_rows($sql);
 if($row>0)
 {
  while($res=mysql_fetch_assoc($sql))
  {
   //if($res['VerticalId']>0){$SubQry='VerticalId='.$res['VerticalId'];}else{$SubQry='1=1';}
   $SubQry='1=1';
   $sD=mysql_query("select DepartmentId from hrm_department where CompanyId=".$_POST['c']." AND DepartmentId=".$_POST['di']." AND DeptStatus='A' AND DepartmentId!=".$_POST['d']." order by DepartmentId",$con); 
   while($rD=mysql_fetch_assoc($sD))
   {
    $sChk=mysql_query("select * from hrm_master_eligibility where CompanyId=".$_POST['c']." AND DepartmentId=".$rD['DepartmentId']." AND GradeId=".$res['GradeId']." AND ".$SubQry."",$con); $rowChk=mysql_num_rows($sChk);
	if($rowChk==0)
	{
	 $Ins=mysql_query("insert into hrm_master_eligibility(CompanyId, DepartmentId, GradeId, GradeValue, CategoryA, CategoryB, CategoryC, DA_OutSiteHQ, DA_InSiteHQ, Mobile, Mobile_WithGPS, Mobile_Remb, Mobile_Remb_Period, Laptop_Amt, Mediclaim_Coverage_Slabs, Helth_CheckUp, Flight_YN, Flight_Class, Train_YN, Train_Class, TravelEnt_Rmk, TW_Km, TW_InHQ_M, TW_InHQ_D, TW_OutHQ_M, TW_OutHQ_D, FW_Km, FW_InHQ_M, FW_InHQ_D, FW_OutHQ_M, FW_OutHQ_D, TravelElig_Rmk, CrBy, CrDate, SysDate) values('".$_POST['c']."', '".$rD['DepartmentId']."', '".$res['GradeId']."', '".$res['GradeValue']."', '".$res['CategoryA']."', '".$res['CategoryB']."', '".$res['CategoryC']."', '".$res['DA_OutSiteHQ']."', '".$res['DA_InSiteHQ']."', '".$res['Mobile']."', '".$res['Mobile_WithGPS']."', '".$res['Mobile_Remb']."', '".$res['Mobile_Remb_Period']."', '".$res['Laptop_Amt']."', '".$res['Mediclaim_Coverage_Slabs']."', '".$res['Helth_CheckUp']."', '".$res['Flight_YN']."', '".$res['Flight_Class']."', '".$res['Train_YN']."', '".$res['Train_Class']."', '".$res['TravelEnt_Rmk']."', '".$res['TW_Km']."', '".$res['TW_InHQ_M']."', '".$res['TW_InHQ_D']."', '".$res['TW_OutHQ_M']."', '".$res['TW_OutHQ_D']."', '".$res['FW_Km']."', '".$res['FW_InHQ_M']."', '".$res['FW_InHQ_D']."', '".$res['FW_OutHQ_M']."', '".$res['FW_OutHQ_D']."', '".$res['TravelElig_Rmk']."', '".$_POST['u']."', '".date("Y-m-d")."', '".date("Y-m-d")."')",$con);
	 
	 //VerticalId, '".$res['VerticalId']."',
	 
	}
	
   }
  
  } //while($res=mysql_fetch_assoc($sql))
  
  if($Ins)
  { 
   echo '<input type="hidden" id="PrsSts" value="Done" />'; 
   
    $Action='Move';
    $tbln='user_master_activity'; $ComId=$_POST['c']; $UId=$_POST['u']; $EId=0; $PageName='Eligibility Master';
    $Activity=$Action." masters eligibility for : Department - All applicable,  Grade - All applicable";
    include("logbook.php");
   
  }
  else{ echo '<input type="hidden" id="PrsSts" value="Error" />'; }
  
 }//if($row>0)
 
 
}

*/

?>
