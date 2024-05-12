<?php require_once('../AdminUser/config/config.php');
if(isset($_POST['act']) && $_POST['v']!='' && $_POST['act']=='SetAssetMaxMint'){ 

//$sqlSub=mysql_query("select SubAssetId from hrm_asset_name where AssetNId=".$_POST['v'], $con); $resSub=mysql_fetch_assoc($sqlSub); 
//if($resSub['SubAssetId']!=''){ $SubAssetId=$resSub['SubAssetId']; 
//$sqlSub2=mysql_query("select AssetNId from hrm_asset_name where SubAssetId=".$SubAssetId, $con); $resSub2=mysql_fetch_assoc($sqlSub2); //$SubAssetId2=$resSub2['AssetNId']; }
//else{$SubAssetId=0; $SubAssetId2=0;}

if($_POST['v']==11 OR $_POST['v']==12 OR $_POST['v']==18)
{ $sqlElig=mysql_query("select Mobile_Hand_Elig_Rs from hrm_employee_eligibility where EmployeeID=".$_POST['ei']." AND Status='A'",$con); $resElig=mysql_fetch_assoc($sqlElig);  
  if($resElig['Mobile_Hand_Elig_Rs']!=0 AND $resElig['Mobile_Hand_Elig_Rs']!=''){$AssetAmt=$resElig['Mobile_Hand_Elig_Rs'];}else{$AssetAmt=0;}
}
else
{ 
  $sqlEE=mysql_query("select AssetELimit from hrm_asset_name_emp where EmployeeID=".$_POST['ei']." AND AssetNId=".$_POST['v']."", $con); $resEE=mysql_fetch_assoc($sqlEE);  
  $sqlGG=mysql_query("select AssetGLimit from hrm_asset_name_grade where GradeId=".$_POST['gi']." AND AssetNId=".$_POST['v']."", $con); $resGG=mysql_fetch_assoc($sqlGG);
  if($resEE['AssetELimit']>0){$AssetAmt=$resEE['AssetELimit'];}else{$AssetAmt=0;}
  //elseif($resGG['AssetGLimit']>0){$AssetAmt=$resGG['AssetGLimit'];}
}
 
if($_POST['v']==8 OR $_POST['v']==9 OR $_POST['v']==19)
{
 $sqlEOldReq=mysql_query("select SUM(ApprovalAmt) as AppAmt from hrm_asset_employee_request where EmployeeID=".$_POST['ei']." AND (AssetNId=8 OR AssetNId=9 OR AssetNId=19) AND ApprovalStatus=2 AND ReqAmtExpiryDate>='".date("Y-m-d")."'", $con); 
}
elseif($_POST['v']==11 OR $_POST['v']==12 OR $_POST['v']==18)
{
 $sqlEOldReq=mysql_query("select SUM(ApprovalAmt) as AppAmt from hrm_asset_employee_request where EmployeeID=".$_POST['ei']." AND (AssetNId=11 OR AssetNId=12 OR AssetNId=18) AND ApprovalStatus=2 AND ReqAmtExpiryDate>='".date("Y-m-d")."'", $con); 
}
else
{
$sqlEOldReq=mysql_query("select SUM(ApprovalAmt) as AppAmt from hrm_asset_employee_request where EmployeeID=".$_POST['ei']." AND AssetNId=".$_POST['v']." AND ApprovalStatus=2 AND ReqAmtExpiryDate>='".date("Y-m-d")."'", $con); 
}

$rowEOldReq=mysql_num_rows($sqlEOldReq); 
if($rowEOldReq>0){ $resEOldReq=mysql_fetch_assoc($sqlEOldReq); $ActualAmt=$AssetAmt-$resEOldReq['AppAmt']; }else{$ActualAmt=$AssetAmt;}
if($ActualAmt>0){$ActAsstAmt=$ActualAmt;}else{$ActAsstAmt='0.00';} //echo 'aa='.$ActAsstAmt;
?>
<input type="hidden" id="v" value="<?php echo $_POST['v']; ?>"/><input type="hidden" id="ei" value="<?php echo $_POST['ei']; ?>"/>
<input type="hidden" id="gi" value="<?php echo $_POST['gi']; ?>"/><input type="hidden" id="sn" value="<?php echo $_POST['sn']; ?>"/>
<input type="hidden" id="ActualAmt" value="<?php if($ActAsstAmt>0){echo intval($ActAsstAmt);}else{echo $ActAsstAmt;} ?>"/>
<input type="hidden" id="PriviousAmt" value="<?php if($rowEOldReq>0){echo intval($resEOldReq['AppAmt']);}else{echo 0;} ?>"/>
<input type="hidden" id="actionAmt1" value="<?php if($_POST['']!='' AND $_POST['']>0){echo 'Y';}else{echo 'N';} ?>"/>
<?php } ?>
