<?php session_start(); 
require_once('config/config.php');

if(isset($_POST['Act']) && $_POST['Act']=='ploicyTbl')
{

 if($_POST['chk']==1){$sts=1;}else{$sts=0;}
 $sql=mysql_query("select * from hrm_master_eligibility_mapping_tblfield where PolicyId=".$_POST['pi']." AND FieldId=".$_POST['fi']." AND ComId=".$_POST['ci']."",$con); $rows=mysql_num_rows($sql);

 if($rows>0)
 {
   $sInUp=mysql_query("update hrm_master_eligibility_mapping_tblfield set FOrder='".$_POST['ord']."', Sts=".$sts." where PolicyId=".$_POST['pi']." AND FieldId=".$_POST['fi']." AND ComId=".$_POST['ci']."",$con);
 }
 else
 {
   $sInUp=mysql_query("insert into hrm_master_eligibility_mapping_tblfield(PolicyId, FieldId, FOrder, Sts, ComId, CrDate) values(".$_POST['pi'].", ".$_POST['fi'].", ".$_POST['ord'].", ".$sts.", ".$_POST['ci'].", '".date("Y-m-d")."')",$con);
 }
 
  if($sInUp){ echo '<input type="hidden" id="RstInp" value="1" />'; }
  else{ echo '<input type="hidden" id="RstInp" value="0" />'; }
  echo '<input type="hidden" id="Rstchk" value='.$sts.' />';
  echo '<input type="hidden" id="RstMn" value='.$_POST['m'].' /><input type="hidden" id="RstSn" value='.$_POST['sn'].' />';
  
}

elseif(isset($_POST['ActCr']) && $_POST['ActCr']=='CrploicyTbl')
{
  $sql=mysql_query("select FieldId from hrm_master_eligibility_mapping_tblfield where PolicyId=".$_POST['pi']." AND FieldId>0 AND ComId=".$_POST['ci']." AND Sts=1 order by FOrder DESC",$con); $rows=mysql_num_rows($sql);
  
  if($rows>0)
  {
   while($res=mysql_fetch_assoc($sql))
   {
    
	//$sub=mysql_query("select * from hrm_master_eligibility_subfield where FiledId=".$res['FieldId']." and SubFiledName!='' order by SubFieldId asc",$con); $rub=mysql_num_rows($sub);
	
	//if($rub==0)
	//{
      $rst = mysql_query("SHOW COLUMNS FROM hrm_master_eligibility_policy_tbl".$_POST['pi']." LIKE 'Fn".$res['FieldId']."'",$con); $exists = mysql_num_rows($rst);
	  if($exists==0)
	  {
       $alt=mysql_query("ALTER TABLE hrm_master_eligibility_policy_tbl".$_POST['pi']." ADD Fn".$res['FieldId']." varchar(50) NOT NULL AFTER GradeId", $con);
      }
	//}
	//elseif($rub>0)
	//{
	  //$resub=mysql_fetch_assoc($sub);
	//}
	
   }
   
   if($alt)
   { 
    $upP=mysql_query("update hrm_master_eligibility_policy set CreatedTbl=1 where PolicyId=".$_POST['pi']."",$con);
    echo '<input type="hidden" id="RstInp" value="1" />'; 
   }
   
  }
  
}



elseif(isset($_POST['ActDe']) && $_POST['ActDe']=='DeploicyTbl')
{ 
  $sql=mysql_query("select FieldId from hrm_master_eligibility_mapping_tblfield where PolicyId=".$_POST['pi']." AND FieldId>0 AND ComId=".$_POST['ci']." AND Sts=1 order by FOrder DESC",$con); $rows=mysql_num_rows($sql);
  
  if($rows>0)
  {
   while($res=mysql_fetch_assoc($sql))
   {
    $rst = mysql_query("SHOW COLUMNS FROM hrm_master_eligibility_policy_tbl".$_POST['pi']." LIKE 'Fn".$res['FieldId']."'",$con); $exists = mysql_num_rows($rst);
	if($exists>0)
	{
	
    $alt=mysql_query("ALTER TABLE hrm_master_eligibility_policy_tbl".$_POST['pi']." DROP COLUMN Fn".$res['FieldId']."",$con);
    }
   }
   
   if($alt)
   { 
    $upP=mysql_query("update hrm_master_eligibility_policy set CreatedTbl=0 where PolicyId=".$_POST['pi']."",$con);
    echo '<input type="hidden" id="RstInp" value="1" />'; 
   }
   
  }
  
}

elseif(isset($_POST['ActTblIns']) && $_POST['ActTblIns']=='InsploicyField' && $_POST['pi']!='' && $_POST['fi']!='' && $_POST['gi']!='')
{ 
  $sql=mysql_query("select * from hrm_master_eligibility_policy_tbl".$_POST['pi']." where GradeId=".$_POST['gi'],$con); 
  $rows=mysql_num_rows($sql);
  
  if($rows>0)
  {
      
   $InUp = mysql_query("update hrm_master_eligibility_policy_tbl".$_POST['pi']." set Fn".$_POST['fi']."='".$_POST['fiv']."', CrBy=".$_POST['ui'].", CrDate='".date("Y-m-d")."', SysDate='".date("Y-m-d")."' where GradeId=".$_POST['gi'],$con);
  }	
  elseif($rows==0)
  {
   $InUp = mysql_query("insert into hrm_master_eligibility_policy_tbl".$_POST['pi']."(GradeId, Fn".$_POST['fi'].", CrBy, 	CrDate, SysDate) values (".$_POST['gi'].", '".$_POST['fiv']."', ".$_POST['ui'].", '".date("Y-m-d")."', '".date("Y-m-d")."')",$con); 
  }

//echo $_POST['i'].' - '.$_POST['sno'];

   if($InUp && $_POST['i']==$_POST['sno'])
   { 
    echo '<input type="hidden" id="RstInp" value="1" />'; 
	echo '<input type="hidden" id="FFn" value='.$_POST['n'].' />';
	echo '<input type="hidden" id="FFpi" value='.$_POST['pi'].' />';
	echo '<input type="hidden" id="FFsno" value='.$_POST['sno'].' />';
   }
   
  
}

?>

