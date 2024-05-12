<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');}

if($_POST['action']=='UpdateD')
{

 $dn=str_replace("jj","&",$_POST['Dn']);
 $sqlUp = mysql_query("update hrm_sales_dealer set DealerName='".strtoupper($dn)."', DealerAdd='".$_POST['DAdd']."', DealerCity='".$_POST['DCity']."', DealerPerson='".$_POST['Dp']."', DealerEmail='".$_POST['DEmail']."', DealerCont='".$_POST['DCont']."', DealerCont2='".$_POST['DCont2']."', BulkParty='".$_POST['BulkParty']."', HqId=".$_POST['DHQ'].", Hq_vc=".$_POST['Hq_vc'].", Hq_fc=".$_POST['Hq_fc'].", Terr_vc=".$_POST['Terr_vc'].", Terr_fc=".$_POST['Terr_fc'].", DealerSts='".$_POST['DSts']."', CreatedBy=".$_POST['ui'].", CreatedDate='".date("Y-m-d")."' where DealerId=".$_POST['did'], $con); //DealerName='".$_POST['Dn']."', 
 if($sqlUp){ $rstt=1; }else{ $rstt=0; }
 echo '<input type="hidden" id="RstVal" value='.$rstt.' /><input type="hidden" id="Dnn" value="'.$dn.'" />';
 echo '<input type="hidden" id="did" value='.$_POST['did'].' />';

}
elseif($_POST['action']=='NewD')
{
    
 if($_POST['BulkParty']=='Y')
 {
  $sM = mysql_query("select count(*) as Toty from hrm_sales_dealer where BulkParty='Y'",$con); $rM = mysql_fetch_assoc($sM);
  if($rM['Toty']==0){ $NxtId='9001'; }
  else
  {  
   $sqlMx = mysql_query("select MAX(DealerId) as MaxID from hrm_sales_dealer where BulkParty='Y'",$con); 
   $resMx = mysql_fetch_assoc($sqlMx); $NxtId = $resMx['MaxID']+1; 
  }
 }
 elseif($_POST['BulkParty']=='N')
 {
  $sqlMx = mysql_query("select MAX(DealerId) as MaxID from hrm_sales_dealer where BulkParty='N'",$con);
  $resMx = mysql_fetch_assoc($sqlMx); $NxtId = $resMx['MaxID']+1; 
 }    

 $dn=str_replace("jj","&",$_POST['Dn']);
 $sqlIns = mysql_query("insert into hrm_sales_dealer(DealerId, DealerName, DealerAdd, DealerCity, DealerPerson, DealerEmail, DealerCont, DealerCont2, BulkParty, HqId, Hq_vc, Hq_fc, Terr_vc, Terr_fc, DealerSts, CreatedBy, CreatedDate) values(".$NxtId.", '".strtoupper($dn)."', '".strtoupper($_POST['DAdd'])."', '".strtoupper($_POST['DCity'])."', '".strtoupper($_POST['Dp'])."', '".$_POST['DEmail']."', '".$_POST['DCont']."', '".$_POST['DCont2']."', '".$_POST['BulkParty']."', ".$_POST['DHQ'].", ".$_POST['Hq_vc'].", ".$_POST['Hq_fc'].", ".$_POST['Terr_vc'].", ".$_POST['Terr_fc'].", '".$_POST['DSts']."', ".$_POST['ui'].", '".date("Y-m-d")."')", $con); 
 if($sqlIns){ $rstt=1; }else{ $rstt=0; }
 echo '<input type="hidden" id="RstVal" value='.$rstt.' /><input type="hidden" id="Dnn" value="'.$dn.'" />';
}

elseif($_POST['action']=='GetTerr_vc')
{
 $sql = mysql_query("select g.EmployeeID from hrm_employee_general g inner join hrm_employee e on g.EmployeeID=e.EmployeeID where e.EmpStatus='A' and g.HqId=".$_POST['hq'], $con);  $res=mysql_fetch_assoc($sql);
 echo '<input type="hidden" id="TVcVal" value="'.$res['EmployeeID'].'" />';
}

elseif($_POST['action']=='GetTerr_fc')
{
 $sql = mysql_query("select g.EmployeeID from hrm_employee_general g inner join hrm_employee e on g.EmployeeID=e.EmployeeID where e.EmpStatus='A' and g.HqId=".$_POST['hq'], $con);  $res=mysql_fetch_assoc($sql);
 echo '<input type="hidden" id="TFcVal" value="'.$res['EmployeeID'].'" />';
}
?>