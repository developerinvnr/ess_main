<?php require_once('../../Employee/sp/user/config/config.php'); ?>
<?php if(isset($_POST['ProdId']) && $_POST['ProdId']!="")
      { $sql = mysql_query("select * from hrm_sales_seedsproduct where ProductId=".$_POST['ProdId'], $con); 
	    $res=mysql_fetch_array($sql); $sqlI = mysql_query("select ItemName from hrm_sales_seedsitem where ItemId=".$res['ItemId'], $con); $resI=mysql_fetch_array($sqlI);
?>	  
	  <input style="font-family:Times New Roman;font-size:14px;width:300px;background-color:#FFFFFF;" name="Product" id="Product" value="<?php echo $resI['ItemName'].'&nbsp;-&nbsp;'.$res['ProductName']; ?>" readonly/><input type="hidden" name="ProductId" id="ProductId" value="<?php echo $_POST['ProdId']; ?>" />
<?php } ?>

<?php 
if(isset($_POST['Action']) && $_POST['Action']=='AddMonth')
{     
  $BeforeYId=$_POST['yi']-1; $AfterYId=$_POST['yi']+1; $TEmp=$_POST['e'];
  $sqlS = mysql_query("select StateId from hrm_headquater where HqId=".$_POST['hi'], $con); $resS=mysql_fetch_assoc($sqlS);
  $sqlI = mysql_query("select ItemId from hrm_sales_seedsproduct where ProductId=".$_POST['p'], $con); 
  $resI=mysql_fetch_assoc($sqlI);
  
  $sqlB = mysql_query("select * from hrm_sales_sal_details where DealerId=".$_POST['di']." AND ProductId=".$_POST['p']." AND YearId=".$_POST['yi'], $con); $rowB=mysql_num_rows($sqlB); 
  if($rowB==0){ $sqlInsB = mysql_query("insert into hrm_sales_sal_details(DealerId, ItemId, ProductId, YearId, M1, M2, M3, M4, M5, M6, M7, M8, M9, M10, M11, M12) values(".$_POST['di'].", ".$resI['ItemId'].", ".$_POST['p'].", ".$_POST['yi'].", ".$_POST['m1B'].", ".$_POST['m2B'].", ".$_POST['m3B'].", ".$_POST['m4B'].", ".$_POST['m5B'].", ".$_POST['m6B'].", ".$_POST['m7B'].", ".$_POST['m8B'].", ".$_POST['m9B'].", ".$_POST['m10B'].", ".$_POST['m11B'].", ".$_POST['m12B'].")", $con); }
  else{ $sqlInsB = mysql_query("update hrm_sales_sal_details set M1=".$_POST['m1B'].", M2=".$_POST['m2B'].", M3=".$_POST['m3B'].", M4=".$_POST['m4B'].", M5=".$_POST['m5B'].", M6=".$_POST['m6B'].", M7=".$_POST['m7B'].", M8=".$_POST['m8B'].", M9=".$_POST['m9B'].", M10=".$_POST['m10B'].", M11=".$_POST['m11B'].", M12=".$_POST['m12B']." where DealerId=".$_POST['di']." AND ProductId=".$_POST['p']." AND YearId=".$_POST['yi'], $con); } 
	  
  $sqlC = mysql_query("select * from hrm_sales_sal_details where DealerId=".$_POST['di']." AND ProductId=".$_POST['p']." AND YearId=".$AfterYId, $con); $rowC=mysql_num_rows($sqlC); 
  if($rowC==0){ $sqlInsC = mysql_query("insert into hrm_sales_sal_details(DealerId, ItemId, ProductId, YearId, M1_Proj, M2_Proj, M3_Proj, M4_Proj, M5_Proj, M6_Proj, M7_Proj, M8_Proj, M9_Proj, M10_Proj, M11_Proj, M12_Proj) values(".$_POST['di'].", ".$resI['ItemId'].", ".$_POST['p'].", ".$AfterYId.", ".$_POST['m1C'].", ".$_POST['m2C'].", ".$_POST['m3C'].", ".$_POST['m4C'].", ".$_POST['m5C'].", ".$_POST['m6C'].", ".$_POST['m7C'].", ".$_POST['m8C'].", ".$_POST['m9C'].", ".$_POST['m10C'].", ".$_POST['m11C'].", ".$_POST['m12C'].")", $con); }
  else{ $sqlInsC = mysql_query("update hrm_sales_sal_details set M1_Proj=".$_POST['m1C'].", M2_Proj=".$_POST['m2C'].", M3_Proj=".$_POST['m3C'].", M4_Proj=".$_POST['m4C'].", M5_Proj=".$_POST['m5C'].", M6_Proj=".$_POST['m6C'].", M7_Proj=".$_POST['m7C'].", M8_Proj=".$_POST['m8C'].", M9_Proj=".$_POST['m9C'].", M10_Proj=".$_POST['m10C'].", M11_Proj=".$_POST['m11C'].", M12_Proj=".$_POST['m12C']." where DealerId=".$_POST['di']." AND ProductId=".$_POST['p']." AND YearId=".$AfterYId, $con); }
	   	   
	   
  if($_POST['ii']!='All_1' AND $_POST['ii']!='All_2')
  { 
    $sqlP2td=mysql_query("select SUM(M1) as tsM1, SUM(M2) as tsM2, SUM(M3) as tsM3, SUM(M4) as tsM4, SUM(M5) as tsM5, SUM(M6) as tsM6, SUM(M7) as tsM7, SUM(M8) as tsM8, SUM(M9) as tsM9, SUM(M10) as tsM10, SUM(M11) as tsM11, SUM(M12) as tsM12 from hrm_sales_sal_details where DealerId=".$_POST['di']." AND ItemId=".$_POST['ii']." AND YearId=".$_POST['yi'], $con); 
    $sqlP3td=mysql_query("select SUM(M1_Proj) as tsM1, SUM(M2_Proj) as tsM2, SUM(M3_Proj) as tsM3, SUM(M4_Proj) as tsM4, SUM(M5_Proj) as tsM5, SUM(M6_Proj) as tsM6, SUM(M7_Proj) as tsM7, SUM(M8_Proj) as tsM8, SUM(M9_Proj) as tsM9, SUM(M10_Proj) as tsM10, SUM(M11_Proj) as tsM11, SUM(M12_Proj) as tsM12 from hrm_sales_sal_details where DealerId=".$_POST['di']." AND ItemId=".$_POST['ii']." AND YearId=".$AfterYId, $con); 
	$resP2td=mysql_fetch_assoc($sqlP2td); $resP3td=mysql_fetch_assoc($sqlP3td); 
	  
	$TotA=$resP2td['tsM1']+$resP2td['tsM2']+$resP2td['tsM3']+$resP2td['tsM4']+$resP2td['tsM5']+$resP2td['tsM6']+$resP2td['tsM7']+$resP2td['tsM8']+$resP2td['tsM9']+$resP2td['tsM10']+$resP2td['tsM11']+$resP2td['tsM12']; 
	$TotB=$resP3td['tsM1']+$resP3td['tsM2']+$resP3td['tsM3']+$resP3td['tsM4']+$resP3td['tsM5']+$resP3td['tsM6']+$resP3td['tsM7']+$resP3td['tsM8']+$resP3td['tsM9']+$resP3td['tsM10']+$resP3td['tsM11']+$resP3td['tsM12'];	   
    echo '<input type="hidden" id="TTot2" value="'.floatval($TotA).'" />';  
    echo '<input type="hidden" id="TTot3" value="'.floatval($TotB).'" />';
	
	echo '<input type="hidden" id="Tot21" value="'.floatval($resP2td['tsM1']).'" /><input type="hidden" id="Tot22" value="'.floatval($resP2td['tsM2']).'" /><input type="hidden" id="Tot23" value="'.floatval($resP2td['tsM3']).'" /><input type="hidden" id="Tot24" value="'.floatval($resP2td['tsM4']).'" /><input type="hidden" id="Tot25" value="'.floatval($resP2td['tsM5']).'" /><input type="hidden" id="Tot26" value="'.floatval($resP2td['tsM6']).'" /><input type="hidden" id="Tot27" value="'.floatval($resP2td['tsM7']).'" /><input type="hidden" id="Tot28" value="'.floatval($resP2td['tsM8']).'" /><input type="hidden" id="Tot29" value="'.floatval($resP2td['tsM9']).'" /><input type="hidden" id="Tot210" value="'.floatval($resP2td['tsM10']).'" /><input type="hidden" id="Tot211" value="'.floatval($resP2td['tsM11']).'" /><input type="hidden" id="Tot212" value="'.floatval($resP2td['tsM12']).'" />';
	
	echo '<input type="hidden" id="Tot31" value="'.floatval($resP3td['tsM1']).'" /><input type="hidden" id="Tot32" value="'.floatval($resP3td['tsM2']).'" /><input type="hidden" id="Tot33" value="'.floatval($resP3td['tsM3']).'" /><input type="hidden" id="Tot34" value="'.floatval($resP3td['tsM4']).'" /><input type="hidden" id="Tot35" value="'.floatval($resP3td['tsM5']).'" /><input type="hidden" id="Tot36" value="'.floatval($resP3td['tsM6']).'" /><input type="hidden" id="Tot37" value="'.floatval($resP3td['tsM7']).'" /><input type="hidden" id="Tot38" value="'.floatval($resP3td['tsM8']).'" /><input type="hidden" id="Tot39" value="'.floatval($resP3td['tsM9']).'" /><input type="hidden" id="Tot310" value="'.floatval($resP3td['tsM10']).'" /><input type="hidden" id="Tot311" value="'.floatval($resP3td['tsM11']).'" /><input type="hidden" id="Tot312" value="'.floatval($resP3td['tsM12']).'" />';
    
	/* SlctSalesProdDeal_hide.php */
	    
   }	  
   
		     
}
?>	 



