<?php require_once('../user/config/config.php'); ?>
<?php 
if(isset($_POST['Action']) && $_POST['Action']=='AddMonth')
{     $BeforeYId=$_POST['yi']-1; $AfterYId=$_POST['yi']+1; $TEmp=$_POST['e'];
	$sqlS = mysql_query("select StateId from hrm_headquater where HqId=".$_POST['hi'], $con); $resS=mysql_fetch_assoc($sqlS);
	$sqlI = mysql_query("select ItemId from hrm_sales_seedsproduct where ProductId=".$_POST['p'], $con); $resI=mysql_fetch_assoc($sqlI);  //Mhq
	    
	  $sqlB = mysql_query("select * from hrm_sales_sal_details_hq where HqRepEmpID=".$_POST['e']." AND HqEmpID=".$_POST['hqe']." AND HqId=".$_POST['Mhq']." AND ProductId=".$_POST['p']." AND YearId=".$_POST['yi'], $con); 
	  $rowB=mysql_num_rows($sqlB); if($rowB>0){ $sqlInsB = mysql_query("update hrm_sales_sal_details_hq set Q1=".$_POST['m1B'].",Q2=".$_POST['m2B'].",Q3=".$_POST['m3B'].",Q4=".$_POST['m4B']." where HqRepEmpID=".$_POST['e']." AND HqEmpID=".$_POST['hqe']." AND HqId=".$_POST['Mhq']." AND ProductId=".$_POST['p']." AND YearId=".$_POST['yi'], $con); } elseif($row==0){$sqlInsB = mysql_query("insert into hrm_sales_sal_details_hq(HqRepEmpID,HqEmpID,HqId,ItemId,ProductId,YearId,Q1,Q2,Q3,Q4) values(".$_POST['e'].",".$_POST['hqe'].",".$_POST['Mhq'].",".$resI['ItemId'].",".$_POST['p'].",".$_POST['yi'].",".$_POST['m1B'].",".$_POST['m2B'].",".$_POST['m3B'].",".$_POST['m4B'].")", $con);}	  
	  $sqlC = mysql_query("select * from hrm_sales_sal_details_hq where HqRepEmpID=".$_POST['e']." AND HqEmpID=".$_POST['hqe']." AND HqId=".$_POST['Mhq']." AND ProductId=".$_POST['p']." AND YearId=".$AfterYId, $con); 
	  $rowC=mysql_num_rows($sqlC); if($rowC>0){ $sqlInsC = mysql_query("update hrm_sales_sal_details_hq set Q1=".$_POST['m1C'].",Q2=".$_POST['m2C'].",Q3=".$_POST['m3C'].",Q4=".$_POST['m4C']." where HqRepEmpID=".$_POST['e']." AND HqEmpID=".$_POST['hqe']." AND HqId=".$_POST['Mhq']." AND ProductId=".$_POST['p']." AND YearId=".$AfterYId, $con); }elseif($row==0){ $sqlInsC = mysql_query("insert into hrm_sales_sal_details_hq(HqRepEmpID,HqEmpID,HqId,ItemId,ProductId,YearId,Q1,Q2,Q3,Q4) values(".$_POST['e'].",".$_POST['hqe'].",".$_POST['Mhq'].",".$resI['ItemId'].",".$_POST['p'].",".$AfterYId.",".$_POST['m1C'].",".$_POST['m2C'].",".$_POST['m3C'].",".$_POST['m4C'].")", $con);}
	  
	  if($_POST['ii']!='All_1' AND $_POST['ii']!='All_2'){ $sqlP2td=mysql_query("select SUM(Q1) as tsM1,SUM(Q2) as tsM2,SUM(Q3) as tsM3,SUM(Q4) as tsM4 from hrm_sales_sal_details_hq where HqRepEmpID=".$_POST['e']." AND HqEmpID=".$_POST['hqe']." AND HqId=".$_POST['Mhq']." AND ItemId=".$_POST['ii']." AND YearId=".$_POST['yi'], $con); $sqlP3td=mysql_query("select SUM(Q1) as tsM1,SUM(Q2) as tsM2,SUM(Q3) as tsM3,SUM(Q4) as tsM4 from hrm_sales_sal_details_hq where HqRepEmpID=".$_POST['e']." AND HqEmpID=".$_POST['hqe']." AND HqId=".$_POST['Mhq']." AND ItemId=".$_POST['ii']." AND YearId=".$AfterYId, $con); $resP2td=mysql_fetch_assoc($sqlP2td); $resP3td=mysql_fetch_assoc($sqlP3td); 
	  $TotA=$resP2td['tsM1']+$resP2td['tsM2']+$resP2td['tsM3']+$resP2td['tsM4']; 
	  $TotB=$resP3td['tsM1']+$resP3td['tsM2']+$resP3td['tsM3']+$resP3td['tsM4'];
	  echo '<input type="hidden" id="Tot21" value="'.$resP2td['tsM1'].'" />'; 
	  echo '<input type="hidden" id="Tot22" value="'.$resP2td['tsM2'].'" />';  
	  echo '<input type="hidden" id="Tot23" value="'.$resP2td['tsM3'].'" />'; 
	  echo '<input type="hidden" id="Tot24" value="'.$resP2td['tsM4'].'" />';
	  echo '<input type="hidden" id="Tot31" value="'.$resP3td['tsM1'].'" />'; 
	  echo '<input type="hidden" id="Tot32" value="'.$resP3td['tsM2'].'" />';  
	  echo '<input type="hidden" id="Tot33" value="'.$resP3td['tsM3'].'" />'; 
	  echo '<input type="hidden" id="Tot34" value="'.$resP3td['tsM4'].'" />';
	  echo '<input type="hidden" id="TTot2" value="'.$TotA.'" />';  
	  echo '<input type="hidden" id="TTot3" value="'.$TotB.'" />';
	  
	  /*$TsqlP2td=mysql_query("select SUM(Q1) as tsM1,SUM(Q2) as tsM2,SUM(Q3) as tsM3,SUM(Q4) as tsM4 from hrm_sales_sal_details_hq where HqRepEmpID=".$_POST['e']." AND ItemId=".$_POST['ii']." AND YearId=".$_POST['yi'], $con); $TsqlP3td=mysql_query("select SUM(Q1) as tsM1,SUM(Q2) as tsM2,SUM(Q3) as tsM3,SUM(Q4) as tsM4 from hrm_sales_sal_details_hq where HqRepEmpID=".$_POST['e']." AND ItemId=".$_POST['ii']." AND YearId=".$AfterYId, $con); $TresP2td=mysql_fetch_assoc($TsqlP2td); $TresP3td=mysql_fetch_assoc($TsqlP3td); 
	  $TotAT=$TresP2td['tsM1']+$TresP2td['tsM2']+$TresP2td['tsM3']+$TresP2td['tsM4']; 
	  $TotBT=$TresP3td['tsM1']+$TresP3td['tsM2']+$TresP3td['tsM3']+$TresP3td['tsM4'];
	  echo '<input type="hidden" id="Tot21T" value="'.$TresP2td['tsM1'].'" />'; 
	  echo '<input type="hidden" id="Tot22T" value="'.$TresP2td['tsM2'].'" />';  
	  echo '<input type="hidden" id="Tot23T" value="'.$TresP2td['tsM3'].'" />'; 
	  echo '<input type="hidden" id="Tot24T" value="'.$TresP2td['tsM4'].'" />';
	  echo '<input type="hidden" id="Tot31T" value="'.$TresP3td['tsM1'].'" />'; 
	  echo '<input type="hidden" id="Tot32T" value="'.$TresP3td['tsM2'].'" />';  
	  echo '<input type="hidden" id="Tot33T" value="'.$TresP3td['tsM3'].'" />'; 
	  echo '<input type="hidden" id="Tot34T" value="'.$TresP3td['tsM4'].'" />';
	  echo '<input type="hidden" id="TTot2T" value="'.$TotAT.'" />';  
	  echo '<input type="hidden" id="TTot3T" value="'.$TotBT.'" />'; }

	  $PsqlP2=mysql_query("select SUM(Q1) as sM1,SUM(Q2) as sM2,SUM(Q3) as sM3,SUM(Q4) as sM4 from hrm_sales_sal_details_hq where HqRepEmpID=".$_POST['e']." AND ProductId=".$_POST['p']." AND YearId=".$_POST['yi'], $con); $PsqlP3=mysql_query("select SUM(Q1) as sM1,SUM(Q2) as sM2,SUM(Q3) as sM3,SUM(Q4) as sM4 from hrm_sales_sal_details_hq where HqRepEmpID=".$_POST['e']." AND ProductId=".$_POST['p']." AND YearId=".$AfterYId, $con); $PresP2=mysql_fetch_assoc($PsqlP2); $PresP3=mysql_fetch_assoc($PsqlP3); 
	  $TotAP=$PresP2['sM1']+$PresP2['sM2']+$PresP2['sM3']+$PresP2['sM4']; 
	  $TotBP=$PresP3['sM1']+$PresP3['sM2']+$PresP3['sM3']+$PresP3['sM4'];
	  echo '<input type="hidden" id="Tot21P" value="'.$PresP2['sM1'].'" />'; 
	  echo '<input type="hidden" id="Tot22P" value="'.$PresP2['sM2'].'" />';  
	  echo '<input type="hidden" id="Tot23P" value="'.$PresP2['sM3'].'" />'; 
	  echo '<input type="hidden" id="Tot24P" value="'.$PresP2['sM4'].'" />';
	  echo '<input type="hidden" id="Tot31P" value="'.$PresP3['sM1'].'" />'; 
	  echo '<input type="hidden" id="Tot32P" value="'.$PresP3['sM2'].'" />';  
	  echo '<input type="hidden" id="Tot33P" value="'.$PresP3['sM3'].'" />'; 
	  echo '<input type="hidden" id="Tot34P" value="'.$PresP3['sM4'].'" />';
	  echo '<input type="hidden" id="PTot2P" value="'.$TotAP.'" />';  
	  echo '<input type="hidden" id="PTot3P" value="'.$TotBP.'" />';*/    
}
?>	 



