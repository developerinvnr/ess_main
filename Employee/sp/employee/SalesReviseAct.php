<?php require_once('../user/config/config.php'); ?>
<?php if(isset($_POST['Action']) && $_POST['Action']=='AddRevised'){ 
      $ei=$_POST['ei']; $pid=$_POST['pid']; $yi=$_POST['yi']; $q=$_POST['q']; $v1=$_POST['v1']; $v2=$_POST['v2']; $v3=$_POST['v3']; $crp=$_POST['crp']; $ii=$_POST['ii'];
      
$sql=mysql_query("select * from hrm_sales_revised_values where EmployeeID=".$ei." AND ProductId=".$pid." AND YearId=".$yi, $con); $row=mysql_num_rows($sql);
if($row>0)
{
 if($q==1){$u=mysql_query("update hrm_sales_revised_values set M1=".$v1.",M2=".$v2.",M3=".$v3." where EmployeeID=".$ei." AND ProductId=".$pid." AND YearId=".$yi, $con);}
 elseif($q==2){$u=mysql_query("update hrm_sales_revised_values set M4=".$v1.",M5=".$v2.",M6=".$v3." where EmployeeID=".$ei." AND ProductId=".$pid." AND YearId=".$yi, $con);}
 elseif($q==3){$u=mysql_query("update hrm_sales_revised_values set M7=".$v1.",M8=".$v2.",M9=".$v3." where EmployeeID=".$ei." AND ProductId=".$pid." AND YearId=".$yi, $con);}
 elseif($q==4){$u=mysql_query("update hrm_sales_revised_values set M10=".$v1.",M11=".$v2.",M12=".$v3." where EmployeeID=".$ei." AND ProductId=".$pid." AND YearId=".$yi, $con);}
}
if($row==0)
{
 if($q==1){$i=mysql_query("insert into hrm_sales_revised_values(EmployeeID,YearId,ProductId,M1,M2,M3) values(".$ei.",".$yi.",".$pid.",".$v1.",".$v2.",".$v3.")", $con);}
 elseif($q==2){$i=mysql_query("insert into hrm_sales_revised_values(EmployeeID,YearId,ProductId,M4,M5,M6) values(".$ei.",".$yi.",".$pid.",".$v1.",".$v2.",".$v3.")", $con);}
 elseif($q==3){$i=mysql_query("insert into hrm_sales_revised_values(EmployeeID,YearId,ProductId,M7,M8,M9) values(".$ei.",".$yi.",".$pid.",".$v1.",".$v2.",".$v3.")", $con);}
 elseif($q==4){$i=mysql_query("insert into hrm_sales_revised_values(EmployeeID,YearId,ProductId,M10,M11,M12) values(".$ei.",".$yi.",".$pid.",".$v1.",".$v2.",".$v3.")", $con);}
}
$qTot=$v1+$v2+$v3;
if($ii>0)
{
 $sqlR=mysql_query("select SUM(M1) as sM1,SUM(M2) as sM2,SUM(M3) as sM3,SUM(M4) as sM4,SUM(M5) as sM5,SUM(M6) as sM6,SUM(M7) as sM7,SUM(M8) as sM8,SUM(M9) as sM9,SUM(M10) as sM10,SUM(M11) as sM11,SUM(M12) as sM12 from hrm_sales_revised_values INNER JOIN hrm_sales_seedsproduct ON hrm_sales_revised_values.ProductId=hrm_sales_seedsproduct.ProductId where hrm_sales_seedsproduct.ItemId=".$ii." AND EmployeeID=".$ei." AND YearId=".$yi, $con); 
}
else 
{ 
  if($crp==1 OR $crp==2){ $sqlR=mysql_query("select SUM(M1) as sM1,SUM(M2) as sM2,SUM(M3) as sM3,SUM(M4) as sM4,SUM(M5) as sM5,SUM(M6) as sM6,SUM(M7) as sM7,SUM(M8) as sM8,SUM(M9) as sM9,SUM(M10) as sM10,SUM(M11) as sM11,SUM(M12) as sM12 from hrm_sales_revised_values INNER JOIN hrm_sales_seedsproduct ON hrm_sales_revised_values.ProductId=hrm_sales_seedsproduct.ProductId INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId where hrm_sales_seedsitem.GroupId=".$crp." AND EmployeeID=".$ei." AND YearId=".$yi, $con); }
  if($crp==3){ $sqlR=mysql_query("select SUM(M1) as sM1,SUM(M2) as sM2,SUM(M3) as sM3,SUM(M4) as sM4,SUM(M5) as sM5,SUM(M6) as sM6,SUM(M7) as sM7,SUM(M8) as sM8,SUM(M9) as sM9,SUM(M10) as sM10,SUM(M11) as sM11,SUM(M12) as sM12 from hrm_sales_revised_values INNER JOIN hrm_sales_seedsproduct ON hrm_sales_revised_values.ProductId=hrm_sales_seedsproduct.ProductId INNER JOIN hrm_sales_seedsitem ON hrm_sales_seedsproduct.ItemId=hrm_sales_seedsitem.ItemId where EmployeeID=".$ei." AND YearId=".$yi, $con); }
}
$resR=mysql_fetch_assoc($sqlR);
if($q==1){$tot1=$resR['sM1']; $tot2=$resR['sM2']; $tot3=$resR['sM3']; }
elseif($q==2){$tot1=$resR['sM4']; $tot2=$resR['sM5']; $tot3=$resR['sM6']; }
elseif($q==3){$tot1=$resR['sM7']; $tot2=$resR['sM8']; $tot3=$resR['sM9']; }
elseif($q==4){$tot1=$resR['sM10']; $tot2=$resR['sM11']; $tot3=$resR['sM12']; }
$cTot=$tot1+$tot2+$tot3;

echo '<input type="hidden" id="qTot" value="'.floatval($qTot).'" /><input type="hidden" id="cTot" value="'.floatval($cTot).'" />';
echo '<input type="hidden" id="tot1" value="'.floatval($tot1).'" /><input type="hidden" id="tot2" value="'.floatval($tot2).'" />';
echo '<input type="hidden" id="tot3" value="'.floatval($tot3).'" /><input type="hidden" id="pid" value="'.$pid.'" />';
echo '<input type="hidden" id="sn" value="'.$_POST['sn'].'" /><input type="hidden" id="Qqr" value="'.$q.'" />';

} 
?>
