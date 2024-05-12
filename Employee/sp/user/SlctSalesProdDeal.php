<?php require_once('config/config.php'); ?> 

<?php 
if(isset($_POST['Action']) && $_POST['Action']=='AddMonth')
{     $BeforeYId=$_POST['yi']-1; $AfterYId=$_POST['yi']+1; $TEmp=$_POST['e'];
	  $sqlS = mysql_query("select StateId from hrm_headquater where HqId=".$_POST['hi'], $con); $resS=mysql_fetch_assoc($sqlS);
	  $sqlI = mysql_query("select ItemId from hrm_sales_seedsproduct where ProductId=".$_POST['p'], $con); $resI=mysql_fetch_assoc($sqlI);
	  
	  if($_POST['q']==1){  /* Quater-1 */  
	  $sqlA = mysql_query("select * from hrm_sales_sal_details_".$BeforeYId." where DealerId=".$_POST['di']." AND ProductId=".$_POST['p']." AND YearId=".$BeforeYId, $con); 
	  $rowA=mysql_num_rows($sqlA); if($rowA>0){ $sqlInsA = mysql_query("update hrm_sales_sal_details_".$BeforeYId." set M1_Ach=".$_POST['m1A'].",M2_Ach=".$_POST['m2A'].",M3_Ach=".$_POST['m3A']." where DealerId=".$_POST['di']." AND ProductId=".$_POST['p']." AND YearId=".$BeforeYId, $con); }elseif($row==0){$sqlInsA = mysql_query("insert into hrm_sales_sal_details_".$BeforeYId."(DealerId,ItemId,ProductId,YearId,M1_Ach,M2_Ach,M3_Ach) values(".$_POST['di'].",".$resI['ItemId'].",".$_POST['p'].",".$BeforeYId.",".$_POST['m1A'].",".$_POST['m2A'].",".$_POST['m3A'].")", $con);}	
	    
	  if($_POST['ii']>0){$sqlP1td=mysql_query("select SUM(M1_Ach) as tsM1,SUM(M2_Ach) as tsM2,SUM(M3_Ach) as tsM3 from hrm_sales_sal_details_".$BeforeYId." INNER JOIN hrm_sales_seedsitem ON hrm_sales_sal_details_".$BeforeYId.".ItemId=hrm_sales_seedsitem.ItemId where hrm_sales_sal_details_".$BeforeYId.".DealerId=".$_POST['di']." AND hrm_sales_seedsitem.ItemId=".$_POST['ii']." AND hrm_sales_sal_details_".$BeforeYId.".YearId=".$BeforeYId, $con);}
	  else{$sqlP1td=mysql_query("select SUM(M1_Ach) as tsM1,SUM(M2_Ach) as tsM2,SUM(M3_Ach) as tsM3 from hrm_sales_sal_details_".$BeforeYId." INNER JOIN hrm_sales_seedsitem ON hrm_sales_sal_details_".$BeforeYId.".ItemId=hrm_sales_seedsitem.ItemId where hrm_sales_sal_details_".$BeforeYId.".DealerId=".$_POST['di']." AND hrm_sales_seedsitem.GroupId=".$_POST['cg']." AND hrm_sales_sal_details_".$BeforeYId.".YearId=".$BeforeYId, $con);} $resP1td=mysql_fetch_assoc($sqlP1td);
	  $TotA=$resP1td['tsM1']+$resP1td['tsM2']+$resP1td['tsM3']; 
	  echo '<input type="hidden" id="Tot11" value="'.$resP1td['tsM1'].'" />'; echo '<input type="hidden" id="Tot12" value="'.$resP1td['tsM2'].'" />';  
	  echo '<input type="hidden" id="Tot13" value="'.$resP1td['tsM3'].'" />'; echo '<input type="hidden" id="TTot1T" value="'.$TotA.'" />';  
	  }
	  elseif($_POST['q']==2){  /* Quater-2 */
	  $sqlA = mysql_query("select * from hrm_sales_sal_details_".$BeforeYId." where DealerId=".$_POST['di']." AND ProductId=".$_POST['p']." AND YearId=".$BeforeYId, $con); 
	  $rowA=mysql_num_rows($sqlA); if($rowA>0){ $sqlInsA = mysql_query("update hrm_sales_sal_details_".$BeforeYId." set M4_Ach=".$_POST['m4A'].",M5_Ach=".$_POST['m5A'].",M6_Ach=".$_POST['m6A']." where DealerId=".$_POST['di']." AND ProductId=".$_POST['p']." AND YearId=".$BeforeYId, $con); }elseif($row==0){ $sqlInsA = mysql_query("insert into hrm_sales_sal_details_".$BeforeYId."(DealerId,ItemId,ProductId,YearId,M4_Ach,M5_Ach,M6_Ach) values(".$_POST['di'].",".$resI['ItemId'].",".$_POST['p'].",".$BeforeYId.",".$_POST['m4A'].",".$_POST['m5A'].",".$_POST['m6A'].")", $con);} 
	 
	  if($_POST['ii']>0){$sqlP1td=mysql_query("select SUM(M4_Ach) as tsM4,SUM(M5_Ach) as tsM5,SUM(M6_Ach) as tsM6 from hrm_sales_sal_details_".$BeforeYId." INNER JOIN hrm_sales_seedsitem ON hrm_sales_sal_details_".$BeforeYId.".ItemId=hrm_sales_seedsitem.ItemId where hrm_sales_sal_details_".$BeforeYId.".DealerId=".$_POST['di']." AND hrm_sales_seedsitem.ItemId=".$_POST['ii']." AND hrm_sales_sal_details_".$BeforeYId.".YearId=".$BeforeYId, $con);}
	  else{$sqlP1td=mysql_query("select SUM(M4_Ach) as tsM4,SUM(M5_Ach) as tsM5,SUM(M6_Ach) as tsM6 from hrm_sales_sal_details_".$BeforeYId." INNER JOIN hrm_sales_seedsitem ON hrm_sales_sal_details_".$BeforeYId.".ItemId=hrm_sales_seedsitem.ItemId where hrm_sales_sal_details_".$BeforeYId.".DealerId=".$_POST['di']." AND hrm_sales_seedsitem.GroupId=".$_POST['cg']." AND hrm_sales_sal_details_".$BeforeYId.".YearId=".$BeforeYId, $con);} $resP1td=mysql_fetch_assoc($sqlP1td); 
	  $TotA=$resP1td['tsM4']+$resP1td['tsM5']+$resP1td['tsM6']; 
	  echo '<input type="hidden" id="Tot11" value="'.$resP1td['tsM4'].'" />'; echo '<input type="hidden" id="Tot12" value="'.$resP1td['tsM5'].'" />';  
	  echo '<input type="hidden" id="Tot13" value="'.$resP1td['tsM6'].'" />'; echo '<input type="hidden" id="TTot1T" value="'.$TotA.'" />';  
	  }
	  elseif($_POST['q']==3){  /* Quater-3 */
	  $sqlA = mysql_query("select * from hrm_sales_sal_details_".$BeforeYId." where DealerId=".$_POST['di']." AND ProductId=".$_POST['p']." AND YearId=".$BeforeYId, $con); 
	  $rowA=mysql_num_rows($sqlA); if($rowA>0){ $sqlInsA = mysql_query("update hrm_sales_sal_details_".$BeforeYId." set M7_Ach=".$_POST['m7A'].",M8_Ach=".$_POST['m8A'].",M9_Ach=".$_POST['m9A']." where DealerId=".$_POST['di']." AND ProductId=".$_POST['p']." AND YearId=".$BeforeYId, $con); } elseif($row==0){$sqlInsA = mysql_query("insert into hrm_sales_sal_details_".$BeforeYId."(DealerId,ItemId,ProductId,YearId,M7_Ach,M8_Ach,M9_Ach) values(".$_POST['di'].",".$resI['ItemId'].",".$_POST['p'].",".$BeforeYId.",".$_POST['m7A'].",".$_POST['m8A'].",".$_POST['m9A'].")", $con);}	  
	 
	  if($_POST['ii']>0){$sqlP1td=mysql_query("select SUM(M7_Ach) as tsM7,SUM(M8_Ach) as tsM8,SUM(M9_Ach) as tsM9 from hrm_sales_sal_details_".$BeforeYId." INNER JOIN hrm_sales_seedsitem ON hrm_sales_sal_details_".$BeforeYId.".ItemId=hrm_sales_seedsitem.ItemId where hrm_sales_sal_details_".$BeforeYId.".DealerId=".$_POST['di']." AND hrm_sales_seedsitem.ItemId=".$_POST['ii']." AND hrm_sales_sal_details_".$BeforeYId.".YearId=".$BeforeYId, $con);}
	  else{$sqlP1td=mysql_query("select SUM(M7_Ach) as tsM7,SUM(M8_Ach) as tsM8,SUM(M9_Ach) as tsM9 from hrm_sales_sal_details_".$BeforeYId." INNER JOIN hrm_sales_seedsitem ON hrm_sales_sal_details_".$BeforeYId.".ItemId=hrm_sales_seedsitem.ItemId where hrm_sales_sal_details_".$BeforeYId.".DealerId=".$_POST['di']." AND hrm_sales_seedsitem.GroupId=".$_POST['cg']." AND hrm_sales_sal_details_".$BeforeYId.".YearId=".$BeforeYId, $con);} $resP1td=mysql_fetch_assoc($sqlP1td);
	  $TotA=$resP1td['tsM7']+$resP1td['tsM8']+$resP1td['tsM9']; 
	  echo '<input type="hidden" id="Tot11" value="'.$resP1td['tsM7'].'" />'; echo '<input type="hidden" id="Tot12" value="'.$resP1td['tsM8'].'" />';  
	  echo '<input type="hidden" id="Tot13" value="'.$resP1td['tsM9'].'" />'; echo '<input type="hidden" id="TTot1T" value="'.$TotA.'" />';    	    
	  }
	  elseif($_POST['q']==4){  /* Quater-4 */
	  $sqlA = mysql_query("select * from hrm_sales_sal_details_".$BeforeYId." where DealerId=".$_POST['di']." AND ProductId=".$_POST['p']." AND YearId=".$BeforeYId, $con); 
	  $rowA=mysql_num_rows($sqlA); if($rowA>0) { $sqlInsA = mysql_query("update hrm_sales_sal_details_".$BeforeYId." set M10_Ach=".$_POST['m10A'].",M11_Ach=".$_POST['m11A'].",M12_Ach=".$_POST['m12A']." where DealerId=".$_POST['di']." AND ProductId=".$_POST['p']." AND YearId=".$BeforeYId, $con); } elseif($row==0){ $sqlInsA = mysql_query("insert into hrm_sales_sal_details_".$BeforeYId."(DealerId,ItemId,ProductId,YearId,M10_Ach,M11_Ach,M12_Ach) values(".$_POST['di'].",".$resI['ItemId'].",".$_POST['p'].",".$BeforeYId.",".$_POST['m10A'].",".$_POST['m11A'].",".$_POST['m12A'].")", $con);}	  
	  if($_POST['ii']>0){$sqlP1td=mysql_query("select SUM(M10_Ach) as tsM10,SUM(M11_Ach) as tsM11,SUM(M12_Ach) as tsM12 from hrm_sales_sal_details_".$BeforeYId." INNER JOIN hrm_sales_seedsitem ON hrm_sales_sal_details_".$BeforeYId.".ItemId=hrm_sales_seedsitem.ItemId where hrm_sales_sal_details_".$BeforeYId.".DealerId=".$_POST['di']." AND hrm_sales_seedsitem.ItemId=".$_POST['ii']." AND hrm_sales_sal_details_".$BeforeYId.".YearId=".$BeforeYId, $con);}
	  else{$sqlP1td=mysql_query("select SUM(M10_Ach) as tsM10,SUM(M11_Ach) as tsM11,SUM(M12_Ach) as tsM12 from hrm_sales_sal_details_".$BeforeYId." INNER JOIN hrm_sales_seedsitem ON hrm_sales_sal_details_".$BeforeYId.".ItemId=hrm_sales_seedsitem.ItemId where hrm_sales_sal_details_".$BeforeYId.".DealerId=".$_POST['di']." AND hrm_sales_seedsitem.GroupId=".$_POST['cg']." AND hrm_sales_sal_details_".$BeforeYId.".YearId=".$BeforeYId, $con);} $resP1td=mysql_fetch_assoc($sqlP1td);
	  $TotA=$resP1td['tsM10']+$resP1td['tsM11']+$resP1td['tsM12']; 
	  echo '<input type="hidden" id="Tot11" value="'.$resP1td['tsM10'].'" />'; echo '<input type="hidden" id="Tot12" value="'.$resP1td['tsM11'].'" />';  
	  echo '<input type="hidden" id="Tot13" value="'.$resP1td['tsM12'].'" />'; echo '<input type="hidden" id="TTot1T" value="'.$TotA.'" />';    
	  } 
	     
}
?>	 

<?php 
if(isset($_POST['Action']) && $_POST['Action']=='UpdateData')
{     	    
  $sqlA = mysql_query("select * from hrm_sales_sal_details_".$_POST['yi']." where DealerId=".$_POST['di']." AND ProductId=".$_POST['pi']." AND YearId=".$_POST['yi'], $con); 
  $rowA=mysql_num_rows($sqlA); if($rowA>0){ $sqlInsA=mysql_query("update hrm_sales_sal_details_".$_POST['yi']." set M1_Ach=".$_POST['m1'].",M2_Ach=".$_POST['m2'].",M3_Ach=".$_POST['m3'].",M4_Ach=".$_POST['m4'].",M5_Ach=".$_POST['m5'].",M6_Ach=".$_POST['m6'].",M7_Ach=".$_POST['m7'].",M8_Ach=".$_POST['m8'].",M9_Ach=".$_POST['m9'].",M10_Ach=".$_POST['m10'].",M11_Ach=".$_POST['m11'].",M12_Ach=".$_POST['m12']." where DealerId=".$_POST['di']." AND ProductId=".$_POST['pi']." AND YearId=".$_POST['yi'], $con); }
  elseif($rowA==0){$sqlInsA = mysql_query("insert into hrm_sales_sal_details_".$_POST['yi']."(DealerId, ItemId, ProductId, YearId, M1_Ach, M2_Ach, M3_Ach, M4_Ach, M5_Ach, M6_Ach, M7_Ach, M8_Ach, M9_Ach, M10_Ach, M11_Ach, M12_Ach) values(".$_POST['di'].", ".$_POST['ii'].", ".$_POST['pi'].", ".$_POST['yi'].", ".$_POST['m1'].", ".$_POST['m2'].", ".$_POST['m3'].", ".$_POST['m4'].", ".$_POST['m5'].", ".$_POST['m6'].", ".$_POST['m7'].", ".$_POST['m8'].", ".$_POST['m9'].", ".$_POST['m10'].", ".$_POST['m11'].", ".$_POST['m12'].")", $con); }	
	    
  $sqlTot=mysql_query("select SUM(M1_Ach) as tsM1,SUM(M2_Ach) as tsM2,SUM(M3_Ach) as tsM3,SUM(M4_Ach) as tsM4,SUM(M5_Ach) as tsM5,SUM(M6_Ach) as tsM6,SUM(M7_Ach) as tsM7,SUM(M8_Ach) as tsM8,SUM(M9_Ach) as tsM9,SUM(M10_Ach) as tsM10,SUM(M11_Ach) as tsM11,SUM(M12_Ach) as tsM12 from hrm_sales_sal_details_".$_POST['yi']." where DealerId=".$_POST['di']." AND YearId=".$_POST['yi'], $con); $resTot=mysql_fetch_assoc($sqlTot); $Total=$resTot['tsM1']+$resTot['tsM2']+$resTot['tsM3']+$resTot['tsM4']+$resTot['tsM5']+$resTot['tsM6']+$resTot['tsM7']+$resTot['tsM8']+$resTot['tsM9']+$resTot['tsM10']+$resTot['tsM11']+$resTot['tsM12']; echo '<input type="hidden" id="Total" value="'.$Total.'" />';
	  
  echo '<input type="hidden" id="t1" value="'.$resTot['tsM1'].'" /><input type="hidden" id="t2" value="'.$resTot['tsM2'].'" />';  
  echo '<input type="hidden" id="t3" value="'.$resTot['tsM3'].'" /><input type="hidden" id="t4" value="'.$resTot['tsM4'].'" />';  
  echo '<input type="hidden" id="t5" value="'.$resTot['tsM5'].'" /><input type="hidden" id="t6" value="'.$resTot['tsM6'].'" />';  
  echo '<input type="hidden" id="t7" value="'.$resTot['tsM7'].'" /><input type="hidden" id="t8" value="'.$resTot['tsM8'].'" />';  
  echo '<input type="hidden" id="t9" value="'.$resTot['tsM9'].'" /><input type="hidden" id="t10" value="'.$resTot['tsM10'].'" />';  
  echo '<input type="hidden" id="t11" value="'.$resTot['tsM11'].'" /><input type="hidden" id="t12" value="'.$resTot['tsM12'].'" />';  
 	     
}
?>	 



