<?php require_once('../user/config/config.php'); ?>
<?php 
if($_POST['getv']=='country' && $_POST['cid']!='')
{ 
echo '<select style="width:200px;" class="InputSel" id="state" name="state" onchange="funstate(this.value)"><option value="0">Select</option>';
$sqls=mysql_query("select * from hrm_state where CountryId=".$_POST['cid']." order by StateName asc",$con); while($ress=mysql_fetch_assoc($sqls)){
echo '<option value='.$ress['StateId'].'>'.ucfirst(strtolower($ress['StateName'])).'</option>'; }
echo '</select>';
}

elseif($_POST['getv']=='state' && $_POST['sid']!='')
{ 
echo '<select style="width:200px;" class="InputSel" id="hq" name="hq" onchange="funhq(this.value)"><option value="0">Select</option>';
$sqlhq=mysql_query("select HqId,HqName FROM hrm_headquater where StateId=".$_POST['sid']." order by HqName ASC",$con); while($reshq=mysql_fetch_assoc($sqlhq)){
echo '<option value='.$reshq['HqId'].'>'.ucfirst(strtolower($reshq['HqName']));'</option>'; }
echo '</select>';
}


elseif($_POST['getv']=='hq' && $_POST['hqid']!='')
{ 
echo '<select style="width:200px;" class="InputSel" id="dealer" name="dealer[]" required multiple>';
$sqlDis=mysql_query("select DealerId,DealerName,DealerCity from hrm_sales_dealer where HqId=".$_POST['hqid']." order by DealerName asc",$con); while($resDis=mysql_fetch_assoc($sqlDis)){
echo '<option value='.$resDis['DealerId'].'>'.ucfirst(strtolower($resDis['DealerName'])).' - '.strtoupper($resDis['DealerCity']).'</option>'; }
echo '</select>';

$Re=mysql_query("select he.EmployeeID,Fname,Sname,Lname from hrm_sales_hq_temp he inner join hrm_employee e on he.EmployeeID=e.EmployeeID where he.HqId=".$_POST['hqid']." AND HqTEmpStatus='A'",$con); 
$re=mysql_fetch_assoc($Re);
 
if($re['EmployeeID']!='' AND $re['EmployeeID']>0){$ei=$re['EmployeeID']; $en=strtolower($re['Fname'].' '.$re['Sname'].' '.$re['Lname']); $tl=0; }
else{ 
      $Tl=mysql_query("select * from hrm_sales_tlemp where TLHq=".$_POST['hqid'],$con);
      $Tlr=mysql_fetch_assoc($Tl); if($Tlr['TLEId']!='' AND $Tlr['TLEId']>0){$ei=$Tlr['TLEId']; $en=strtolower($Tlr['TLName']); $tl=1; }
}

echo '<input type="hidden" id="repI2" name="repI2" value="'.$ei.'"/>';
echo '<input type="hidden" id="rep2" name="rep2" value="'.ucfirst($en).'"/>';
echo '<input type="hidden" id="tl2" name="tl2" value="'.$tl.'"/>';

}

elseif($_POST['getv']=='hq2' && $_POST['hqid2']!='')
{ 
echo '<select style="width:200px;" class="InputSel" id="sdealer" name="sdealer" onchange="funsdeal(this.value)">
<option value="0">Select</option>';
$sqlDis2=mysql_query("select DealerId,DealerName,DealerCity from hrm_sales_dealer where HqId=".$_POST['hqid2']." order by DealerName asc",$con); while($resDis2=mysql_fetch_assoc($sqlDis2)){
echo '<option value='.$resDis2['DealerId'].'>'.ucfirst(strtolower($resDis2['DealerName'])).' - '.strtoupper($resDis2['DealerCity']).'</option>'; }
echo '</select>';
}
?>
