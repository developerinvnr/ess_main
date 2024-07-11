<?php session_start();
 if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}

/*	

if(isset($_POST['Act']) && $_POST['Act']=='EligMasterUpdate' && $_POST['clm']!='' && $_POST['grd']!='' && $_POST['dpt']!='' && $_POST['vrt']!='' && $_POST['com']!='')
{
  if($_POST['vrt']>0){$SubQry='VerticalId='.$_POST['vrt'];}else{$SubQry='1=1';} 
  
  $sql=mysql_query("select * from hrm_master_eligibility where CompanyId=".$_POST['com']." AND DepartmentId=".$_POST['dpt']." AND GradeId=".$_POST['grd']." AND ".$SubQry."",$con); $row=mysql_num_rows($sql);
  if($row>0)
  {
    
    $UpIns=mysql_query("update hrm_master_eligibility set ".$_POST['clm']."='".$_POST['vlu']."' where CompanyId=".$_POST['com']." AND DepartmentId=".$_POST['dpt']." AND GradeId=".$_POST['grd']." AND ".$SubQry."",$con);   
    if($UpIns){ $Action='update';}
  }
  else
  {     
      
    $UpIns=mysql_query("insert into hrm_master_eligibility (CompanyId, DepartmentId, GradeId, GradeValue, VerticalId, ".$_POST['clm'].", CrBy, CrDate, SysDate) values(".$_POST['com'].", ".$_POST['dpt'].", ".$_POST['grd'].", '".$_POST['gv']."', ".$_POST['vrt'].", '".$_POST['vlu']."', ".$_POST['usr'].", '".date("Y-m-d")."', '".date("Y-m-d")."')",$con);
    if($UpIns){ $Action='insert'; } 
  }
 
  if($UpIns)
  {
    echo '<input type="hidden" id="Upsts" value="Y" />';
    $sD=mysql_query("select DepartmentName from hrm_department where DepartmentId=".$_POST['dpt'],$con);
	$sG=mysql_query("select GradeValue from hrm_grade where GradeId=".$_POST['grd'],$con);
	$rD=mysql_fetch_assoc($sD); $rG=mysql_fetch_assoc($sG);
    $tbln='user_master_activity'; $ComId=$_POST['com']; $UId=$_POST['usr']; $EId=0; $PageName='Eligibility Master';
    $Activity=$Action." masters eligibility for : Department - ".$rD['DepartmentName'].",  Grade - ".$rG['GradeValue'];
    include("logbook.php");
  }
  else
  {
   echo '<input type="hidden" id="Upsts" value="N" />';
  } 
  
   echo '<input type="hidden" id="type" value='.$_POST['type'].' />';
   echo '<input type="hidden" id="grd" value='.$_POST['grd'].' />';
   echo '<input type="hidden" id="dpt" value='.$_POST['dpt'].' />';
   echo '<input type="hidden" id="vrt" value='.$_POST['vrt'].' />';
   echo '<input type="hidden" id="ii" value='.$_POST['ii'].' />';
   echo '<input type="hidden" id="idnm" value='.$_POST['idnm'].' />';

}

*/

?>
