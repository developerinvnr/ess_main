<?php require_once('../user/config/config.php'); ?>
<?php 
if(isset($_POST['Action']) && $_POST['Action']=='AddMonth')
{     
 $BeforeYId=$_POST['yi']-1; $AfterYId=$_POST['yi']+1; $TEmp=$_POST['e'];
 $sqlS = mysql_query("select StateId from hrm_headquater where HqId=".$_POST['hi'], $con); $resS=mysql_fetch_assoc($sqlS);
 $sqlI = mysql_query("select ItemId from hrm_sales_seedsproduct where ProductId=".$_POST['p'], $con);
 $resI=mysql_fetch_assoc($sqlI);  //Mhq
 $EGrade=mysql_query("select GradeValue from hrm_grade where CompanyId=".$_POST['c']." AND GradeId=".$_POST['gi'],$con);
 $resEg=mysql_fetch_assoc($EGrade); echo $resEg['GradeValue'];
	  
 if(($resEg['GradeValue']=='S1' OR $resEg['GradeValue']=='S2' OR $resEg['GradeValue']=='J1' OR $resEg['GradeValue']=='J2' OR $resEg['GradeValue']=='J3' OR $resEg['GradeValue']=='J4' OR $resEg['GradeValue']=='M1') OR $_POST['e']==$_POST['eId'])
 {
    
  if($_POST['rn']>0)
  {
   $sqlB = mysql_query("select * from hrm_sales_sal_details_terr where TerrRepEmpID=".$_POST['e']." AND TerrEmpID=".$_POST['eId']." AND TerrHqID=".$_POST['nhq']." AND ProductId=".$_POST['p']." AND YearId=".$_POST['yi'], $con); 
   $rowB=mysql_num_rows($sqlB); 
   if($rowB>0){ $sqlInsB = mysql_query("update hrm_sales_sal_details_terr set Q1=".$_POST['m1B'].",Q2=".$_POST['m2B'].",Q3=".$_POST['m3B'].",Q4=".$_POST['m4B']." where TerrRepEmpID=".$_POST['e']." AND TerrEmpID=".$_POST['eId']." AND TerrHqID=".$_POST['nhq']." AND ProductId=".$_POST['p']." AND YearId=".$_POST['yi'], $con); } elseif($rowB==0){$sqlInsB = mysql_query("insert into hrm_sales_sal_details_terr(TerrRepEmpID,TerrEmpID,TerrHqID,ItemId,ProductId,YearId,Q1,Q2,Q3,Q4) values(".$_POST['e'].",".$_POST['eId'].",".$_POST['nhq'].",".$resI['ItemId'].",".$_POST['p'].",".$_POST['yi'].",".$_POST['m1B'].",".$_POST['m2B'].",".$_POST['m3B'].",".$_POST['m4B'].")", $con);}	  

   $sqlC = mysql_query("select * from hrm_sales_sal_details_terr where TerrRepEmpID=".$_POST['e']." AND TerrEmpID=".$_POST['eId']." AND TerrHqID=".$_POST['nhq']." AND ProductId=".$_POST['p']." AND YearId=".$AfterYId, $con);  
   $rowC=mysql_num_rows($sqlC); 
   if($rowC>0){ $sqlInsC = mysql_query("update hrm_sales_sal_details_terr set Q1=".$_POST['m1C'].",Q2=".$_POST['m2C'].",Q3=".$_POST['m3C'].",Q4=".$_POST['m4C']." where TerrRepEmpID=".$_POST['e']." AND TerrEmpID=".$_POST['eId']." AND TerrHqID=".$_POST['nhq']." AND ProductId=".$_POST['p']." AND YearId=".$AfterYId, $con); }elseif($rowC==0){ $sqlInsC = mysql_query("insert into hrm_sales_sal_details_terr(TerrRepEmpID,TerrEmpID,TerrHqID,ItemId,ProductId,YearId,Q1,Q2,Q3,Q4) values(".$_POST['e'].",".$_POST['eId'].",".$_POST['nhq'].",".$resI['ItemId'].",".$_POST['p'].",".$AfterYId.",".$_POST['m1C'].",".$_POST['m2C'].",".$_POST['m3C'].",".$_POST['m4C'].")", $con);}
	  
   if($_POST['ii']!='All_1' AND $_POST['ii']!='All_2')
   { 
   $sqlP2td=mysql_query("select SUM(Q1) as tsQ1,SUM(Q2) as tsQ2,SUM(Q3) as tsQ3,SUM(Q4) as tsQ4 from hrm_sales_sal_details_terr where TerrRepEmpID=".$_POST['e']." AND TerrEmpID=".$_POST['eId']." AND TerrHqID=".$_POST['nhq']." AND ItemId=".$_POST['ii']." AND YearId=".$_POST['yi'], $con); $sqlP3td=mysql_query("select SUM(Q1) as tsQ1,SUM(Q2) as tsQ2,SUM(Q3) as tsQ3,SUM(Q4) as tsQ4 from hrm_sales_sal_details_terr where TerrRepEmpID=".$_POST['e']." AND TerrEmpID=".$_POST['eId']." AND TerrHqID=".$_POST['nhq']." AND ItemId=".$_POST['ii']." AND YearId=".$AfterYId, $con); $resP2td=mysql_fetch_assoc($sqlP2td); $resP3td=mysql_fetch_assoc($sqlP3td); 
   $TotA=$resP2td['tsQ1']+$resP2td['tsQ2']+$resP2td['tsQ3']+$resP2td['tsQ4']; 
   $TotB=$resP3td['tsQ1']+$resP3td['tsQ2']+$resP3td['tsQ3']+$resP3td['tsQ4'];
   echo '<input type="hidden" id="Tot21" value="'.$resP2td['tsQ1'].'" />'; echo '<input type="hidden" id="Tot22" value="'.$resP2td['tsQ2'].'" />'; echo '<input type="hidden" id="Tot23" value="'.$resP2td['tsQ3'].'" />'; echo '<input type="hidden" id="Tot24" value="'.$resP2td['tsQ4'].'" />'; echo '<input type="hidden" id="Tot31" value="'.$resP3td['tsQ1'].'" />'; echo '<input type="hidden" id="Tot32" value="'.$resP3td['tsQ2'].'" />'; echo '<input type="hidden" id="Tot33" value="'.$resP3td['tsQ3'].'" />'; echo '<input type="hidden" id="Tot34" value="'.$resP3td['tsQ4'].'" />';  echo '<input type="hidden" id="TTot2" value="'.$TotA.'" />';  echo '<input type="hidden" id="TTot3" value="'.$TotB.'" />'; 

   /*$TsqlP2td=mysql_query("select SUM(Q1) as tsQ1,SUM(Q2) as tsQ2,SUM(Q3) as tsQ3,SUM(Q4) as tsQ4 from hrm_sales_sal_details_terr where TerrRepEmpID=".$_POST['e']." AND ItemId=".$_POST['ii']." AND YearId=".$_POST['yi'], $con);   $TsqlP3td=mysql_query("select SUM(Q1) as tsQ1,SUM(Q2) as tsQ2,SUM(Q3) as tsQ3,SUM(Q4) as tsQ4 from hrm_sales_sal_details_terr where TerrRepEmpID=".$_POST['e']." AND ItemId=".$_POST['ii']." AND YearId=".$AfterYId, $con);   $TresP2td=mysql_fetch_assoc($TsqlP2td); $TresP3td=mysql_fetch_assoc($TsqlP3td); 
   
   $TsqlP2tda=mysql_query("select SUM(Q1) as tsQ1,SUM(Q2) as tsQ2,SUM(Q3) as tsQ3,SUM(Q4) as tsQ4 from hrm_sales_sal_details_hq where HqRepEmpID=".$_POST['e']." AND ItemId=".$_POST['ii']." AND YearId=".$_POST['yi'], $con);   $TsqlP3tda=mysql_query("select SUM(Q1) as tsQ1,SUM(Q2) as tsQ2,SUM(Q3) as tsQ3,SUM(Q4) as tsQ4 from hrm_sales_sal_details_hq where HqRepEmpID=".$_POST['e']." AND ItemId=".$_POST['ii']." AND YearId=".$AfterYId, $con);   $TresP2tda=mysql_fetch_assoc($TsqlP2tda); $TresP3tda=mysql_fetch_assoc($TsqlP3tda); 

   $TsqlP2tdb=mysql_query("select SUM(Q1) as tsQ1,SUM(Q2) as tsQ2,SUM(Q3) as tsQ3,SUM(Q4) as tsQ4 from hrm_sales_sal_details_area where AreaRepEmpID=".$_POST['e']." AND ItemId=".$_POST['ii']." AND YearId=".$_POST['yi'], $con);   $TsqlP3tdb=mysql_query("select SUM(Q1) as tsQ1,SUM(Q2) as tsQ2,SUM(Q3) as tsQ3,SUM(Q4) as tsQ4 from hrm_sales_sal_details_area where AreaRepEmpID=".$_POST['e']." AND ItemId=".$_POST['ii']." AND YearId=".$AfterYId, $con);   $TresP2tdb=mysql_fetch_assoc($TsqlP2tdb); $TresP3tdb=mysql_fetch_assoc($TsqlP3tdb); 
	  
   $TotP2td1=$TresP2td['tsQ1']+$TresP2tda['tsQ1']+$TresP2tdb['tsQ1']; 
   $TotP2td2=$TresP2td['tsQ2']+$TresP2tda['tsQ2']+$TresP2tdb['tsQ2']; 
   $TotP2td3=$TresP2td['tsQ3']+$TresP2tda['tsQ3']+$TresP2tdb['tsQ3']; 
   $TotP2td4=$TresP2td['tsQ4']+$TresP2tda['tsQ4']+$TresP2tdb['tsQ4']; 
   $TotP3td1=$TresP3td['tsQ1']+$TresP3tda['tsQ1']+$TresP3tdb['tsQ1']; 
   $TotP3td2=$TresP3td['tsQ2']+$TresP3tda['tsQ2']+$TresP3tdb['tsQ2']; 
   $TotP3td3=$TresP3td['tsQ3']+$TresP3tda['tsQ3']+$TresP3tdb['tsQ3']; 
   $TotP3td4=$TresP3td['tsQ4']+$TresP3tda['tsQ4']+$TresP3tdb['tsQ4']; 
   $TotAT=$TotP2td1+$TotP2td2+$TotP2td3+$TotP2td4; $TotBT=$TotP3td1+$TotP3td2+$TotP3td3+$TotP3td4;
echo '<input type="hidden" id="Tot21T" value="'.$TotP2td1.'" />'; echo '<input type="hidden" id="Tot22T" value="'.$TotP2td2.'" />'; echo '<input type="hidden" id="Tot23T" value="'.$TotP2td3.'" />'; echo '<input type="hidden" id="Tot24T" value="'.$TotP2td4.'" />'; echo '<input type="hidden" id="Tot31T" value="'.$TotP3td1.'" />'; echo '<input type="hidden" id="Tot32T" value="'.$TotP3td2.'" />'; echo '<input type="hidden" id="Tot33T" value="'.$TotP3td3.'" />'; echo '<input type="hidden" id="Tot34T" value="'.$TotP3td4.'" />'; echo '<input type="hidden" id="TTot2T" value="'.$TotAT.'" />';  echo '<input type="hidden" id="TTot3T" value="'.$TotBT.'" />'; */ 
   }
	  
	 /* $PsqlP2=mysql_query("select SUM(Q1) as sQ1,SUM(Q2) as sQ2,SUM(Q3) as sQ3,SUM(Q4) as sQ4 from hrm_sales_sal_details_terr where TerrRepEmpID=".$_POST['e']." AND ProductId=".$_POST['p']." AND YearId=".$_POST['yi'], $con); $PsqlP3=mysql_query("select SUM(Q1) as sQ1,SUM(Q2) as sQ2,SUM(Q3) as sQ3,SUM(Q4) as sQ4 from hrm_sales_sal_details_terr where TerrRepEmpID=".$_POST['e']." AND ProductId=".$_POST['p']." AND YearId=".$AfterYId, $con); $PresP2=mysql_fetch_assoc($PsqlP2); $PresP3=mysql_fetch_assoc($PsqlP3); 
	  $PsqlP2a=mysql_query("select SUM(Q1) as sQ1,SUM(Q2) as sQ2,SUM(Q3) as sQ3,SUM(Q4) as sQ4 from hrm_sales_sal_details_hq where HqRepEmpID=".$_POST['e']." AND ProductId=".$_POST['p']." AND YearId=".$_POST['yi'], $con); $PsqlP3a=mysql_query("select SUM(Q1) as sQ1,SUM(Q2) as sQ2,SUM(Q3) as sQ3,SUM(Q4) as sQ4 from hrm_sales_sal_details_hq where HqRepEmpID=".$_POST['e']." AND ProductId=".$_POST['p']." AND YearId=".$AfterYId, $con); $PresP2a=mysql_fetch_assoc($PsqlP2a); $PresP3a=mysql_fetch_assoc($PsqlP3a);
	  $PsqlP2b=mysql_query("select SUM(Q1) as sQ1,SUM(Q2) as sQ2,SUM(Q3) as sQ3,SUM(Q4) as sQ4 from hrm_sales_sal_details_area where AreaRepEmpID=".$_POST['e']." AND ProductId=".$_POST['p']." AND YearId=".$_POST['yi'], $con); $PsqlP3b=mysql_query("select SUM(Q1) as sQ1,SUM(Q2) as sQ2,SUM(Q3) as sQ3,SUM(Q4) as sQ4 from hrm_sales_sal_details_area where AreaRepEmpID=".$_POST['e']." AND ProductId=".$_POST['p']." AND YearId=".$AfterYId, $con); $PresP2b=mysql_fetch_assoc($PsqlP2b); $PresP3b=mysql_fetch_assoc($PsqlP3b);
	  $ToteP2a=$PresP2['sQ1']+$PresP2a['sQ1']+$PresP2b['sQ1']; $ToteP2b=$PresP2['sQ2']+$PresP2a['sQ2']+$PresP2b['sQ2']; 
	  $ToteP2c=$PresP2['sQ3']+$PresP2a['sQ3']+$PresP2b['sQ3']; $ToteP2d=$PresP2['sQ4']+$PresP2a['sQ4']+$PresP2b['sQ4'];
	  $ToteP3a=$PresP3['sQ1']+$PresP3a['sQ1']+$PresP3b['sQ1']; $ToteP3b=$PresP3['sQ2']+$PresP3a['sQ2']+$PresP3b['sQ2']; 
	  $ToteP3c=$PresP3['sQ3']+$PresP3a['sQ3']+$PresP3b['sQ3']; $ToteP3d=$PresP3['sQ4']+$PresP3a['sQ4']+$PresP3b['sQ4'];	    
	  $TotAP=$ToteP2a+$ToteP2b+$ToteP2c+$ToteP2d; $TotBP=$ToteP3a+$ToteP3b+$ToteP3c+$ToteP3d;
echo '<input type="hidden" id="Tot21P" value="'.$ToteP2a.'" />'; echo '<input type="hidden" id="Tot22P" value="'.$ToteP2b.'" />'; echo '<input type="hidden" id="Tot23P" value="'.$ToteP2c.'" />'; echo '<input type="hidden" id="Tot24P" value="'.$ToteP2d.'" />'; echo '<input type="hidden" id="Tot31P" value="'.$ToteP3a.'" />'; echo '<input type="hidden" id="Tot32P" value="'.$ToteP3b.'" />'; echo '<input type="hidden" id="Tot33P" value="'.$ToteP3c.'" />'; echo '<input type="hidden" id="Tot34P" value="'.$ToteP3d.'" />'; echo '<input type="hidden" id="PTot2P" value="'.$TotAP.'" />';  echo '<input type="hidden" id="PTot3P" value="'.$TotBP.'" />';*/ 
  }
  elseif($_POST['rn']==0)
  {
   $sqlEHq=mysql_query("select HqId from hrm_employee_general where EmployeeID=".$_POST['eId'], $con); 
   $resEHq=mysql_fetch_assoc($sqlEHq);
   
   $sqlB = mysql_query("select * from hrm_sales_sal_details_hq where HqRepEmpID=".$_POST['e']." AND HqEmpID=".$_POST['eId']." AND HqId=".$_POST['nhq']." AND ProductId=".$_POST['p']." AND YearId=".$_POST['yi'], $con); $rowB=mysql_num_rows($sqlB); 
   if($rowB>0){ $sqlInsB = mysql_query("update hrm_sales_sal_details_hq set Q1=".$_POST['m1B'].",Q2=".$_POST['m2B'].",Q3=".$_POST['m3B'].",Q4=".$_POST['m4B']." where HqRepEmpID=".$_POST['e']." AND HqEmpID=".$_POST['eId']." AND HqId=".$_POST['nhq']." AND ProductId=".$_POST['p']." AND YearId=".$_POST['yi'], $con); } elseif($rowB==0){$sqlInsB = mysql_query("insert into hrm_sales_sal_details_hq(HqRepEmpID,HqEmpID,HqId,ItemId,ProductId,YearId,Q1,Q2,Q3,Q4) values(".$_POST['e'].",".$_POST['eId'].",".$_POST['nhq'].",".$resI['ItemId'].",".$_POST['p'].",".$_POST['yi'].",".$_POST['m1B'].",".$_POST['m2B'].",".$_POST['m3B'].",".$_POST['m4B'].")", $con);}	
	    
   $sqlC = mysql_query("select * from hrm_sales_sal_details_hq where HqRepEmpID=".$_POST['e']." AND HqEmpID=".$_POST['eId']." AND HqId=".$_POST['nhq']." AND ProductId=".$_POST['p']." AND YearId=".$AfterYId, $con); $rowC=mysql_num_rows($sqlC); 
   if($rowC>0){ $sqlInsC = mysql_query("update hrm_sales_sal_details_hq set Q1=".$_POST['m1C'].",Q2=".$_POST['m2C'].",Q3=".$_POST['m3C'].",Q4=".$_POST['m4C']." where HqRepEmpID=".$_POST['e']." AND HqEmpID=".$_POST['eId']." AND HqId=".$_POST['nhq']." AND ProductId=".$_POST['p']." AND YearId=".$AfterYId, $con); }elseif($rowC==0){ $sqlInsC = mysql_query("insert into hrm_sales_sal_details_hq(HqRepEmpID,HqEmpID,HqId,ItemId,ProductId,YearId,Q1,Q2,Q3,Q4) values(".$_POST['e'].",".$_POST['eId'].",".$_POST['nhq'].",".$resI['ItemId'].",".$_POST['p'].",".$AfterYId.",".$_POST['m1C'].",".$_POST['m2C'].",".$_POST['m3C'].",".$_POST['m4C'].")", $con);}
	  
   if($_POST['ii']!='All_1' AND $_POST['ii']!='All_2')
   { 
   $sqlP2td=mysql_query("select SUM(Q1) as tsQ1,SUM(Q2) as tsQ2,SUM(Q3) as tsQ3,SUM(Q4) as tsQ4 from hrm_sales_sal_details_hq where HqRepEmpID=".$_POST['e']." AND HqEmpID=".$_POST['eId']." AND HqId=".$_POST['nhq']." AND ItemId=".$_POST['ii']." AND YearId=".$_POST['yi'], $con); $sqlP3td=mysql_query("select SUM(Q1) as tsQ1,SUM(Q2) as tsQ2,SUM(Q3) as tsQ3,SUM(Q4) as tsQ4 from hrm_sales_sal_details_hq where HqRepEmpID=".$_POST['e']." AND HqEmpID=".$_POST['eId']." AND HqId=".$_POST['nhq']." AND ItemId=".$_POST['ii']." AND YearId=".$AfterYId, $con); $resP2td=mysql_fetch_assoc($sqlP2td); $resP3td=mysql_fetch_assoc($sqlP3td); 
   $TotA=$resP2td['tsQ1']+$resP2td['tsQ2']+$resP2td['tsQ3']+$resP2td['tsQ4']; 
   $TotB=$resP3td['tsQ1']+$resP3td['tsQ2']+$resP3td['tsQ3']+$resP3td['tsQ4'];
echo '<input type="hidden" id="Tot21" value="'.$resP2td['tsQ1'].'" />'; echo '<input type="hidden" id="Tot22" value="'.$resP2td['tsQ2'].'" />'; echo '<input type="hidden" id="Tot23" value="'.$resP2td['tsQ3'].'" />'; echo '<input type="hidden" id="Tot24" value="'.$resP2td['tsQ4'].'" />'; echo '<input type="hidden" id="Tot31" value="'.$resP3td['tsQ1'].'" />'; echo '<input type="hidden" id="Tot32" value="'.$resP3td['tsQ2'].'" />'; echo '<input type="hidden" id="Tot33" value="'.$resP3td['tsQ3'].'" />'; echo '<input type="hidden" id="Tot34" value="'.$resP3td['tsQ4'].'" />'; echo '<input type="hidden" id="TTot2" value="'.$TotA.'" />';  echo '<input type="hidden" id="TTot3" value="'.$TotB.'" />'; 
	 
   /*$TsqlP2td=mysql_query("select SUM(Q1) as tsQ1,SUM(Q2) as tsQ2,SUM(Q3) as tsQ3,SUM(Q4) as tsQ4 from hrm_sales_sal_details_terr where TerrRepEmpID=".$_POST['e']." AND ItemId=".$_POST['ii']." AND YearId=".$_POST['yi'], $con); $TsqlP3td=mysql_query("select SUM(Q1) as tsQ1,SUM(Q2) as tsQ2,SUM(Q3) as tsQ3,SUM(Q4) as tsQ4 from hrm_sales_sal_details_terr where TerrRepEmpID=".$_POST['e']." AND ItemId=".$_POST['ii']." AND YearId=".$AfterYId, $con); $TresP2td=mysql_fetch_assoc($TsqlP2td); $TresP3td=mysql_fetch_assoc($TsqlP3td); 
   $TsqlP2tda=mysql_query("select SUM(Q1) as tsQ1,SUM(Q2) as tsQ2,SUM(Q3) as tsQ3,SUM(Q4) as tsQ4 from hrm_sales_sal_details_hq where HqRepEmpID=".$_POST['e']." AND ItemId=".$_POST['ii']." AND YearId=".$_POST['yi'], $con); $TsqlP3tda=mysql_query("select SUM(Q1) as tsQ1,SUM(Q2) as tsQ2,SUM(Q3) as tsQ3,SUM(Q4) as tsQ4 from hrm_sales_sal_details_hq where HqRepEmpID=".$_POST['e']." AND ItemId=".$_POST['ii']." AND YearId=".$AfterYId, $con); $TresP2tda=mysql_fetch_assoc($TsqlP2tda); $TresP3tda=mysql_fetch_assoc($TsqlP3tda); 
   $TsqlP2tdb=mysql_query("select SUM(Q1) as tsQ1,SUM(Q2) as tsQ2,SUM(Q3) as tsQ3,SUM(Q4) as tsQ4 from hrm_sales_sal_details_area where AreaRepEmpID=".$_POST['e']." AND ItemId=".$_POST['ii']." AND YearId=".$_POST['yi'], $con); $TsqlP3tdb=mysql_query("select SUM(Q1) as tsQ1,SUM(Q2) as tsQ2,SUM(Q3) as tsQ3,SUM(Q4) as tsQ4 from hrm_sales_sal_details_area where AreaRepEmpID=".$_POST['e']." AND ItemId=".$_POST['ii']." AND YearId=".$AfterYId, $con);    
   $TresP2tdb=mysql_fetch_assoc($TsqlP2tdb); $TresP3tdb=mysql_fetch_assoc($TsqlP3tdb); 
   $TotP2td1=$TresP2td['tsQ1']+$TresP2tda['tsQ1']+$TresP2tdb['tsQ1']; 
   $TotP2td2=$TresP2td['tsQ2']+$TresP2tda['tsQ2']+$TresP2tdb['tsQ2']; 
   $TotP2td3=$TresP2td['tsQ3']+$TresP2tda['tsQ3']+$TresP2tdb['tsQ3']; 
   $TotP2td4=$TresP2td['tsQ4']+$TresP2tda['tsQ4']+$TresP2tdb['tsQ4']; 
   $TotP3td1=$TresP3td['tsQ1']+$TresP3tda['tsQ1']+$TresP3tdb['tsQ1']; 
   $TotP3td2=$TresP3td['tsQ2']+$TresP3tda['tsQ2']+$TresP3tdb['tsQ2']; 
   $TotP3td3=$TresP3td['tsQ3']+$TresP3tda['tsQ3']+$TresP3tdb['tsQ3']; 
   $TotP3td4=$TresP3td['tsQ4']+$TresP3tda['tsQ4']+$TresP3tdb['tsQ4']; 
   $TotAT=$TotP2td1+$TotP2td2+$TotP2td3+$TotP2td4; 
   $TotBT=$TotP3td1+$TotP3td2+$TotP3td3+$TotP3td4;
   echo '<input type="hidden" id="Tot21T" value="'.$TotP2td1.'" />'; echo '<input type="hidden" id="Tot22T" value="'.$TotP2td2.'" />'; echo '<input type="hidden" id="Tot23T" value="'.$TotP2td3.'" />'; echo '<input type="hidden" id="Tot24T" value="'.$TotP2td4.'" />'; echo '<input type="hidden" id="Tot31T" value="'.$TotP3td1.'" />'; echo '<input type="hidden" id="Tot32T" value="'.$TotP3td2.'" />'; echo '<input type="hidden" id="Tot33T" value="'.$TotP3td3.'" />'; echo '<input type="hidden" id="Tot34T" value="'.$TotP3td4.'" />'; echo '<input type="hidden" id="TTot2T" value="'.$TotAT.'" />';  echo '<input type="hidden" id="TTot3T" value="'.$TotBT.'" />'; */
   
   }
	  
   /*$PsqlP2=mysql_query("select SUM(Q1) as sQ1,SUM(Q2) as sQ2,SUM(Q3) as sQ3,SUM(Q4) as sQ4 from hrm_sales_sal_details_terr where TerrRepEmpID=".$_POST['e']." AND ProductId=".$_POST['p']." AND YearId=".$_POST['yi'], $con); $PsqlP3=mysql_query("select SUM(Q1) as sQ1,SUM(Q2) as sQ2,SUM(Q3) as sQ3,SUM(Q4) as sQ4 from hrm_sales_sal_details_terr where TerrRepEmpID=".$_POST['e']." AND ProductId=".$_POST['p']." AND YearId=".$AfterYId, $con); $PresP2=mysql_fetch_assoc($PsqlP2); $PresP3=mysql_fetch_assoc($PsqlP3); 
   $PsqlP2a=mysql_query("select SUM(Q1) as sQ1,SUM(Q2) as sQ2,SUM(Q3) as sQ3,SUM(Q4) as sQ4 from hrm_sales_sal_details_hq where HqRepEmpID=".$_POST['e']." AND ProductId=".$_POST['p']." AND YearId=".$_POST['yi'], $con); $PsqlP3a=mysql_query("select SUM(Q1) as sQ1,SUM(Q2) as sQ2,SUM(Q3) as sQ3,SUM(Q4) as sQ4 from hrm_sales_sal_details_hq where HqRepEmpID=".$_POST['e']." AND ProductId=".$_POST['p']." AND YearId=".$AfterYId, $con); $PresP2a=mysql_fetch_assoc($PsqlP2a); $PresP3a=mysql_fetch_assoc($PsqlP3a);
   $PsqlP2b=mysql_query("select SUM(Q1) as sQ1,SUM(Q2) as sQ2,SUM(Q3) as sQ3,SUM(Q4) as sQ4 from hrm_sales_sal_details_area where AreaRepEmpID=".$_POST['e']." AND ProductId=".$_POST['p']." AND YearId=".$_POST['yi'], $con); $PsqlP3b=mysql_query("select SUM(Q1) as sQ1,SUM(Q2) as sQ2,SUM(Q3) as sQ3,SUM(Q4) as sQ4 from hrm_sales_sal_details_area where AreaRepEmpID=".$_POST['e']." AND ProductId=".$_POST['p']." AND YearId=".$AfterYId, $con); $PresP2b=mysql_fetch_assoc($PsqlP2b); $PresP3b=mysql_fetch_assoc($PsqlP3b);
   $ToteP2a=$PresP2['sQ1']+$PresP2a['sQ1']+$PresP2b['sQ1']; $ToteP2b=$PresP2['sQ2']+$PresP2a['sQ2']+$PresP2b['sQ2']; 
   $ToteP2c=$PresP2['sQ3']+$PresP2a['sQ3']+$PresP2b['sQ3']; $ToteP2d=$PresP2['sQ4']+$PresP2a['sQ4']+$PresP2b['sQ4'];
   $ToteP3a=$PresP3['sQ1']+$PresP3a['sQ1']+$PresP3b['sQ1']; $ToteP3b=$PresP3['sQ2']+$PresP3a['sQ2']+$PresP3b['sQ2']; 
   $ToteP3c=$PresP3['sQ3']+$PresP3a['sQ3']+$PresP3b['sQ3']; $ToteP3d=$PresP3['sQ4']+$PresP3a['sQ4']+$PresP3b['sQ4'];	    
   $TotAP=$ToteP2a+$ToteP2b+$ToteP2c+$ToteP2d; $TotBP=$ToteP3a+$ToteP3b+$ToteP3c+$ToteP3d;
   echo '<input type="hidden" id="Tot21P" value="'.$ToteP2a.'" />'; echo '<input type="hidden" id="Tot22P" value="'.$ToteP2b.'" />'; echo '<input type="hidden" id="Tot23P" value="'.$ToteP2c.'" />'; echo '<input type="hidden" id="Tot24P" value="'.$ToteP2d.'" />'; echo '<input type="hidden" id="Tot31P" value="'.$ToteP3a.'" />'; echo '<input type="hidden" id="Tot32P" value="'.$ToteP3b.'" />';  echo '<input type="hidden" id="Tot33P" value="'.$ToteP3c.'" />'; echo '<input type="hidden" id="Tot34P" value="'.$ToteP3d.'" />'; echo '<input type="hidden" id="PTot2P" value="'.$TotAP.'" />';  echo '<input type="hidden" id="PTot3P" value="'.$TotBP.'" />';*/ 
  }

 }
 elseif($resEg['GradeValue']=='M2' OR $resEg['GradeValue']=='M3')
 { 
 	  
  $sqlB = mysql_query("select * from hrm_sales_sal_details_area where AreaRepEmpID=".$_POST['e']." AND AreaEmpID=".$_POST['eId']." AND ProductId=".$_POST['p']." AND YearId=".$_POST['yi'], $con); $rowB=mysql_num_rows($sqlB); 
  if($rowB>0){ $sqlInsB = mysql_query("update hrm_sales_sal_details_area set Q1=".$_POST['m1B'].",Q2=".$_POST['m2B'].",Q3=".$_POST['m3B'].",Q4=".$_POST['m4B']." where AreaRepEmpID=".$_POST['e']." AND AreaEmpID=".$_POST['eId']." AND ProductId=".$_POST['p']." AND YearId=".$_POST['yi'], $con); } elseif($rowB==0){$sqlInsB = mysql_query("insert into hrm_sales_sal_details_area(AreaRepEmpID,AreaEmpID,ItemId,ProductId,YearId,Q1,Q2,Q3,Q4) values(".$_POST['e'].",".$_POST['eId'].",".$resI['ItemId'].",".$_POST['p'].",".$_POST['yi'].",".$_POST['m1B'].",".$_POST['m2B'].",".$_POST['m3B'].",".$_POST['m4B'].")", $con);}	
  $sqlC = mysql_query("select * from hrm_sales_sal_details_area where AreaRepEmpID=".$_POST['e']." AND AreaEmpID=".$_POST['eId']." AND ProductId=".$_POST['p']." AND YearId=".$AfterYId, $con); $rowC=mysql_num_rows($sqlC); 
  if($rowC>0){ $sqlInsC = mysql_query("update hrm_sales_sal_details_area set Q1=".$_POST['m1C'].",Q2=".$_POST['m2C'].",Q3=".$_POST['m3C'].",Q4=".$_POST['m4C']." where AreaRepEmpID=".$_POST['e']." AND AreaEmpID=".$_POST['eId']." AND ProductId=".$_POST['p']." AND YearId=".$AfterYId, $con); }elseif($rowC==0){ $sqlInsC = mysql_query("insert into hrm_sales_sal_details_area(AreaRepEmpID,AreaEmpID,ItemId,ProductId,YearId,Q1,Q2,Q3,Q4) values(".$_POST['e'].",".$_POST['eId'].",".$resI['ItemId'].",".$_POST['p'].",".$AfterYId.",".$_POST['m1C'].",".$_POST['m2C'].",".$_POST['m3C'].",".$_POST['m4C'].")", $con);}
	  
  if($_POST['ii']!='All_1' AND $_POST['ii']!='All_2')
  { 
  $sqlP2td=mysql_query("select SUM(Q1) as tsQ1,SUM(Q2) as tsQ2,SUM(Q3) as tsQ3,SUM(Q4) as tsQ4 from hrm_sales_sal_details_area where AreaRepEmpID=".$_POST['e']." AND AreaEmpID=".$_POST['eId']." AND ItemId=".$_POST['ii']." AND YearId=".$_POST['yi'], $con); $sqlP3td=mysql_query("select SUM(Q1) as tsQ1,SUM(Q2) as tsQ2,SUM(Q3) as tsQ3,SUM(Q4) as tsQ4 from hrm_sales_sal_details_area where AreaRepEmpID=".$_POST['e']." AND AreaEmpID=".$_POST['eId']." AND ItemId=".$_POST['ii']." AND YearId=".$AfterYId, $con); 
  $resP2td=mysql_fetch_assoc($sqlP2td); $resP3td=mysql_fetch_assoc($sqlP3td); 
  $TotA=$resP2td['tsQ1']+$resP2td['tsQ2']+$resP2td['tsQ3']+$resP2td['tsQ4']; 
  $TotB=$resP3td['tsQ1']+$resP3td['tsQ2']+$resP3td['tsQ3']+$resP3td['tsQ4'];
  echo '<input type="hidden" id="Tot21" value="'.$resP2td['tsQ1'].'" />'; echo '<input type="hidden" id="Tot22" value="'.$resP2td['tsQ2'].'" />'; echo '<input type="hidden" id="Tot23" value="'.$resP2td['tsQ3'].'" />'; echo '<input type="hidden" id="Tot24" value="'.$resP2td['tsQ4'].'" />'; echo '<input type="hidden" id="Tot31" value="'.$resP3td['tsQ1'].'" />'; echo '<input type="hidden" id="Tot32" value="'.$resP3td['tsQ2'].'" />'; echo '<input type="hidden" id="Tot33" value="'.$resP3td['tsQ3'].'" />'; echo '<input type="hidden" id="Tot34" value="'.$resP3td['tsQ4'].'" />'; echo '<input type="hidden" id="TTot2" value="'.$TotA.'" />';  echo '<input type="hidden" id="TTot3" value="'.$TotB.'" />'; 

  /*$TsqlP2td=mysql_query("select SUM(Q1) as tsQ1,SUM(Q2) as tsQ2,SUM(Q3) as tsQ3,SUM(Q4) as tsQ4 from hrm_sales_sal_details_terr where TerrRepEmpID=".$_POST['e']." AND ItemId=".$_POST['ii']." AND YearId=".$_POST['yi'], $con); $TsqlP3td=mysql_query("select SUM(Q1) as tsQ1,SUM(Q2) as tsQ2,SUM(Q3) as tsQ3,SUM(Q4) as tsQ4 from hrm_sales_sal_details_terr where TerrRepEmpID=".$_POST['e']." AND ItemId=".$_POST['ii']." AND YearId=".$AfterYId, $con); $TresP2td=mysql_fetch_assoc($TsqlP2td); $TresP3td=mysql_fetch_assoc($TsqlP3td); 
  $TsqlP2tda=mysql_query("select SUM(Q1) as tsQ1,SUM(Q2) as tsQ2,SUM(Q3) as tsQ3,SUM(Q4) as tsQ4 from hrm_sales_sal_details_hq where HqRepEmpID=".$_POST['e']." AND ItemId=".$_POST['ii']." AND YearId=".$_POST['yi'], $con); $TsqlP3tda=mysql_query("select SUM(Q1) as tsQ1,SUM(Q2) as tsQ2,SUM(Q3) as tsQ3,SUM(Q4) as tsQ4 from hrm_sales_sal_details_hq where HqRepEmpID=".$_POST['e']." AND ItemId=".$_POST['ii']." AND YearId=".$AfterYId, $con); $TresP2tda=mysql_fetch_assoc($TsqlP2tda); $TresP3tda=mysql_fetch_assoc($TsqlP3tda); 
  $TsqlP2tdb=mysql_query("select SUM(Q1) as tsQ1,SUM(Q2) as tsQ2,SUM(Q3) as tsQ3,SUM(Q4) as tsQ4 from hrm_sales_sal_details_area where AreaRepEmpID=".$_POST['e']." AND ItemId=".$_POST['ii']." AND YearId=".$_POST['yi'], $con); $TsqlP3tdb=mysql_query("select SUM(Q1) as tsQ1,SUM(Q2) as tsQ2,SUM(Q3) as tsQ3,SUM(Q4) as tsQ4 from hrm_sales_sal_details_area where AreaRepEmpID=".$_POST['e']." AND ItemId=".$_POST['ii']." AND YearId=".$AfterYId, $con); $TresP2tdb=mysql_fetch_assoc($TsqlP2tdb); $TresP3tdb=mysql_fetch_assoc($TsqlP3tdb); 
  $TotP2td1=$TresP2td['tsQ1']+$TresP2tda['tsQ1']+$TresP2tdb['tsQ1']; 
  $TotP2td2=$TresP2td['tsQ2']+$TresP2tda['tsQ2']+$TresP2tdb['tsQ2']; 
  $TotP2td3=$TresP2td['tsQ3']+$TresP2tda['tsQ3']+$TresP2tdb['tsQ3']; 
  $TotP2td4=$TresP2td['tsQ4']+$TresP2tda['tsQ4']+$TresP2tdb['tsQ4']; 
  $TotP3td1=$TresP3td['tsQ1']+$TresP3tda['tsQ1']+$TresP3tdb['tsQ1']; 
  $TotP3td2=$TresP3td['tsQ2']+$TresP3tda['tsQ2']+$TresP3tdb['tsQ2']; 
  $TotP3td3=$TresP3td['tsQ3']+$TresP3tda['tsQ3']+$TresP3tdb['tsQ3']; 
  $TotP3td4=$TresP3td['tsQ4']+$TresP3tda['tsQ4']+$TresP3tdb['tsQ4']; 
  $TotAT=$TotP2td1+$TotP2td2+$TotP2td3+$TotP2td4; $TotBT=$TotP3td1+$TotP3td2+$TotP3td3+$TotP3td4;
  echo '<input type="hidden" id="Tot21T" value="'.$TotP2td1.'" />'; echo '<input type="hidden" id="Tot22T" value="'.$TotP2td2.'" />'; echo '<input type="hidden" id="Tot23T" value="'.$TotP2td3.'" />'; echo '<input type="hidden" id="Tot24T" value="'.$TotP2td4.'" />'; echo '<input type="hidden" id="Tot31T" value="'.$TotP3td1.'" />'; echo '<input type="hidden" id="Tot32T" value="'.$TotP3td2.'" />'; echo '<input type="hidden" id="Tot33T" value="'.$TotP3td3.'" />'; echo '<input type="hidden" id="Tot34T" value="'.$TotP3td4.'" />'; echo '<input type="hidden" id="TTot2T" value="'.$TotAT.'" />';  echo '<input type="hidden" id="TTot3T" value="'.$TotBT.'" />'; */
  
  }
	  
  /*$PsqlP2=mysql_query("select SUM(Q1) as sQ1,SUM(Q2) as sQ2,SUM(Q3) as sQ3,SUM(Q4) as sQ4 from hrm_sales_sal_details_terr where TerrRepEmpID=".$_POST['e']." AND ProductId=".$_POST['p']." AND YearId=".$_POST['yi'], $con); $PsqlP3=mysql_query("select SUM(Q1) as sQ1,SUM(Q2) as sQ2,SUM(Q3) as sQ3,SUM(Q4) as sQ4 from hrm_sales_sal_details_terr where TerrRepEmpID=".$_POST['e']." AND ProductId=".$_POST['p']." AND YearId=".$AfterYId, $con); $PresP2=mysql_fetch_assoc($PsqlP2); $PresP3=mysql_fetch_assoc($PsqlP3); 
  $PsqlP2a=mysql_query("select SUM(Q1) as sQ1,SUM(Q2) as sQ2,SUM(Q3) as sQ3,SUM(Q4) as sQ4 from hrm_sales_sal_details_hq where HqRepEmpID=".$_POST['e']." AND ProductId=".$_POST['p']." AND YearId=".$_POST['yi'], $con); $PsqlP3a=mysql_query("select SUM(Q1) as sQ1,SUM(Q2) as sQ2,SUM(Q3) as sQ3,SUM(Q4) as sQ4 from hrm_sales_sal_details_hq where HqRepEmpID=".$_POST['e']." AND ProductId=".$_POST['p']." AND YearId=".$AfterYId, $con); $PresP2a=mysql_fetch_assoc($PsqlP2a); $PresP3a=mysql_fetch_assoc($PsqlP3a);
  $PsqlP2b=mysql_query("select SUM(Q1) as sQ1,SUM(Q2) as sQ2,SUM(Q3) as sQ3,SUM(Q4) as sQ4 from hrm_sales_sal_details_area where AreaRepEmpID=".$_POST['e']." AND ProductId=".$_POST['p']." AND YearId=".$_POST['yi'], $con); $PsqlP3b=mysql_query("select SUM(Q1) as sQ1,SUM(Q2) as sQ2,SUM(Q3) as sQ3,SUM(Q4) as sQ4 from hrm_sales_sal_details_area where AreaRepEmpID=".$_POST['e']." AND ProductId=".$_POST['p']." AND YearId=".$AfterYId, $con); $PresP2b=mysql_fetch_assoc($PsqlP2b); $PresP3b=mysql_fetch_assoc($PsqlP3b);
  $ToteP2a=$PresP2['sQ1']+$PresP2a['sQ1']+$PresP2b['sQ1']; $ToteP2b=$PresP2['sQ2']+$PresP2a['sQ2']+$PresP2b['sQ2']; 
  $ToteP2c=$PresP2['sQ3']+$PresP2a['sQ3']+$PresP2b['sQ3']; $ToteP2d=$PresP2['sQ4']+$PresP2a['sQ4']+$PresP2b['sQ4'];
  $ToteP3a=$PresP3['sQ1']+$PresP3a['sQ1']+$PresP3b['sQ1']; $ToteP3b=$PresP3['sQ2']+$PresP3a['sQ2']+$PresP3b['sQ2']; 
  $ToteP3c=$PresP3['sQ3']+$PresP3a['sQ3']+$PresP3b['sQ3']; $ToteP3d=$PresP3['sQ4']+$PresP3a['sQ4']+$PresP3b['sQ4'];	  
  $TotAP=$ToteP2a+$ToteP2b+$ToteP2c+$ToteP2d; $TotBP=$ToteP3a+$ToteP3b+$ToteP3c+$ToteP3d;
  echo '<input type="hidden" id="Tot21P" value="'.$ToteP2a.'" />'; echo '<input type="hidden" id="Tot22P" value="'.$ToteP2b.'" />'; echo '<input type="hidden" id="Tot23P" value="'.$ToteP2c.'" />'; echo '<input type="hidden" id="Tot24P" value="'.$ToteP2d.'" />'; echo '<input type="hidden" id="Tot31P" value="'.$ToteP3a.'" />'; echo '<input type="hidden" id="Tot32P" value="'.$ToteP3b.'" />'; echo '<input type="hidden" id="Tot33P" value="'.$ToteP3c.'" />'; echo '<input type="hidden" id="Tot34P" value="'.$ToteP3d.'" />'; echo '<input type="hidden" id="PTot2P" value="'.$TotAP.'" />';  echo '<input type="hidden" id="PTot3P" value="'.$TotBP.'" />';*/ 	   
	 
 }
	 	     
}
?>	 



