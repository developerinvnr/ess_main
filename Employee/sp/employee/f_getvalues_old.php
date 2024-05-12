<?php require_once('../user/config/config.php'); ?>
<?php 
if($_POST['getv']=='country' && $_POST['cid']!='')
{ 
echo '<select style="width:160px;" class="InputSel" id="state" name="state" onchange="funstate(this.value,'.$_POST['e'].')"><option value="0">Select</option>';
$sqls=mysql_query("select * from hrm_state where CountryId=".$_POST['cid']." order by StateName asc",$con); while($ress=mysql_fetch_assoc($sqls)){
echo '<option value='.$ress['StateId'].'>'.ucfirst(strtolower($ress['StateName'])).'</option>'; }
echo '</select>';
}

elseif($_POST['getv']=='state' && $_POST['sid']!='')
{  $e=$_POST['e']; 
echo '<select style="width:160px;" class="InputSel" id="hq" name="hq" onchange="funhq(this.value)"><option value="0">Select</option>';
$sqlhq=mysql_query("select sd.HqId,HqName FROM hrm_sales_dealer sd INNER JOIN hrm_headquater hq ON sd.HqId=hq.HqId inner join hrm_sales_hq_temp hqtmp on hq.HqId=hqtmp.HqId inner join hrm_sales_reporting_level rl on hqtmp.EmployeeID=rl.EmployeeID where HqTEmpStatus='A' AND hq.StateId=".$_POST['sid']." AND hq.HQStatus='A' AND (hqtmp.EmployeeID=".$e." OR rl.R1=".$e." OR rl.R2=".$e." OR rl.R3=".$e." OR rl.R4=".$e." OR rl.R5=".$e.") group by HqId order by HqName ASC",$con); while($reshq=mysql_fetch_assoc($sqlhq)){
echo '<option value='.$reshq['HqId'].'>'.ucfirst(strtolower($reshq['HqName']));'</option>'; }
echo '</select>';
}


elseif($_POST['getv']=='hq' && $_POST['hqid']!='')
{ 
echo '<select style="width:160px;" class="InputSel" id="dealer" name="dealer[]" required multiple>';
$sqlDis=mysql_query("select DealerId,DealerName,DealerCity from hrm_sales_dealer where (Hq_vc=".$_POST['hqid']." OR Hq_fc=".$_POST['hqid'].") order by DealerName asc",$con); while($resDis=mysql_fetch_assoc($sqlDis)){
echo '<option value='.$resDis['DealerId'].'>'.ucfirst(strtolower($resDis['DealerName'])).' - '.strtoupper($rdis['DealerCity']).'</option>'; }
echo '</select>';
}

elseif($_POST['getv']=='hq2' && $_POST['hqid2']!='')
{ 
echo '<select style="width:160px;" class="InputSel" id="sdealer" name="sdealer" onchange="funsdeal(this.value)">
<option value="0">Select</option>';
$sqlDis2=mysql_query("select DealerId,DealerName from hrm_sales_dealer where (Hq_vc=".$_POST['hqid2']." OR Hq_fc=".$_POST['hqid2'].") order by DealerName asc",$con); while($resDis2=mysql_fetch_assoc($sqlDis2)){
echo '<option value='.$resDis2['DealerId'].'>'.ucfirst(strtolower($resDis2['DealerName'])).' - '.strtoupper($rdis['DealerCity']).'</option>'; }
echo '</select>';
}
?>
