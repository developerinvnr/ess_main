<?php 
require_once('config/config.php');
$sy=mysql_query("select * from hrm_year where YearId=".$_REQUEST['y']."", $con); $ry=mysql_fetch_assoc($sy); 
$FD=date("Y",strtotime($ry['FromDate'])); $TD=date("Y",strtotime($ry['ToDate'])); $MY=$FD-1;  $PRD=$MY.'-'.$FD;
$sqlCo=mysql_query("select CountryName from hrm_country where CountryId=".$_REQUEST['c']." AND CompanyId=".$_REQUEST['ComId'], $con); $resCo=mysql_fetch_assoc($sqlCo);
/*************************************************************************************************************/
include("CalYCsv.php");

if($_REQUEST['action']='PlanRExport') 
{ 

if($_REQUEST['g']==1){ $HqCon='Hq_vc'; }
elseif($_REQUEST['g']==2){ $HqCon='Hq_fc'; }

if($_REQUEST['i']>0){ $qin="sp.ItemId=".$_REQUEST['i']; }
else{ if($_REQUEST['g']==1 OR $_REQUEST['g']==2){ $qin="si.GroupId=".$_REQUEST['g']; }else{ $qin='1=1'; } }


include("CalTitalCsv.php");

for($j=1; $j<=5; $j++){ 
$csv_output .= '"'.str_replace('"', '""', '').'",';
$csv_output .= '"'.str_replace('"', '""', '').'",';
$csv_output .= '"'.str_replace('"', '""', '').'",';
$csv_output .= '"'.str_replace('"', '""', '').'",';

/* 1 */ if($j==1){
$sqlP1d=mysql_query("select SUM(M1_Ach) as sM1,SUM(M2_Ach) as sM2,SUM(M3_Ach) as sM3,SUM(M4_Ach) as sM4,SUM(M5_Ach) as sM5,SUM(M6_Ach) as sM6,SUM(M7_Ach) as sM7,SUM(M8_Ach) as sM8,SUM(M9_Ach) as sM9,SUM(M10_Ach) as sM10,SUM(M11_Ach) as sM11,SUM(M12_Ach) as sM12 from hrm_sales_sal_details_".$BeforeYId2." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId INNER JOIN hrm_sales_seedsitem si ON sp.ItemId=si.ItemId INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_headquater hq ON d.".$HqCon."=hq.HqId INNER JOIN hrm_state s ON hq.StateId=s.StateId where ".$subQ." AND sd.YearId=".$BeforeYId2." AND ".$qin." AND s.CountryId=".$_REQUEST['c'], $con); 
$res1=mysql_fetch_assoc($sqlP1d); 
$res1Tot=$res1['sM1']+$res1['sM2']+$res1['sM3']+$res1['sM4']+$res1['sM5']+$res1['sM6']+$res1['sM7']+$res1['sM8']+$res1['sM9']+$res1['sM10']+$res1['sM11']+$res1['sM12'];
$TotQ1=$res1['sM1']+$res1['sM2']+$res1['sM3']; $TotQ2=$res1['sM4']+$res1['sM5']+$res1['sM6'];
$TotQ3=$res1['sM7']+$res1['sM8']+$res1['sM9']; $TotQ4=$res1['sM10']+$res1['sM11']+$res1['sM12'];
$csv_output .= '"'.str_replace('"', '""', $y1T).'",';
$csv_output .= '"'.str_replace('"', '""', $y1).'",';
$csv_output .= '"'.str_replace('"', '""', $res1['sM1']).'",';
$csv_output .= '"'.str_replace('"', '""', $res1['sM2']).'",';
$csv_output .= '"'.str_replace('"', '""', $res1['sM3']).'",';
$csv_output .= '"'.str_replace('"', '""', $TotQ1).'",';
$csv_output .= '"'.str_replace('"', '""', $res1['sM4']).'",';
$csv_output .= '"'.str_replace('"', '""', $res1['sM5']).'",';
$csv_output .= '"'.str_replace('"', '""', $res1['sM6']).'",';
$csv_output .= '"'.str_replace('"', '""', $TotQ2).'",';
$csv_output .= '"'.str_replace('"', '""', $res1['sM7']).'",';
$csv_output .= '"'.str_replace('"', '""', $res1['sM8']).'",';
$csv_output .= '"'.str_replace('"', '""', $res1['sM9']).'",';
$csv_output .= '"'.str_replace('"', '""', $TotQ3).'",';
$csv_output .= '"'.str_replace('"', '""', $res1['sM10']).'",';
$csv_output .= '"'.str_replace('"', '""', $res1['sM11']).'",';
$csv_output .= '"'.str_replace('"', '""', $res1['sM12']).'",';
$csv_output .= '"'.str_replace('"', '""', $TotQ4).'",';
$csv_output .= '"'.str_replace('"', '""', $res1Tot).'",';
$csv_output .= '"'.str_replace('"', '""', '').'",';
	 
} /* 2 */ if($j==2){ 
 $sqlP2d=mysql_query("select SUM(M1_Ach) as sM1,SUM(M2_Ach) as sM2,SUM(M3_Ach) as sM3,SUM(M4_Ach) as sM4,SUM(M5_Ach) as sM5,SUM(M6_Ach) as sM6,SUM(M7_Ach) as sM7,SUM(M8_Ach) as sM8,SUM(M9_Ach) as sM9,SUM(M10_Ach) as sM10,SUM(M11_Ach) as sM11,SUM(M12_Ach) as sM12 from hrm_sales_sal_details_".$BeforeYId." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId INNER JOIN hrm_sales_seedsitem si ON sp.ItemId=si.ItemId INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_headquater hq ON d.".$HqCon."=hq.HqId INNER JOIN hrm_state s ON hq.StateId=s.StateId where ".$subQ." AND sd.YearId=".$BeforeYId." AND ".$qin." AND s.CountryId=".$_REQUEST['c'], $con);
$res2=mysql_fetch_assoc($sqlP2d);
$res2Tot=$res2['sM1']+$res2['sM2']+$res2['sM3']+$res2['sM4']+$res2['sM5']+$res2['sM6']+$res2['sM7']+$res2['sM8']+$res2['sM9']+$res2['sM10']+$res2['sM11']+$res2['sM12']; 
$Tot2Q1=$res2['sM1']+$res2['sM2']+$res2['sM3']; $Tot2Q2=$res2['sM4']+$res2['sM5']+$res2['sM6'];
$Tot2Q3=$res2['sM7']+$res2['sM8']+$res2['sM9']; $Tot2Q4=$res2['sM10']+$res2['sM11']+$res2['sM12'];
$csv_output .= '"'.str_replace('"', '""', $y2T).'",';
$csv_output .= '"'.str_replace('"', '""', $y2).'",';
$csv_output .= '"'.str_replace('"', '""', $res2['sM1']).'",';
$csv_output .= '"'.str_replace('"', '""', $res2['sM2']).'",';
$csv_output .= '"'.str_replace('"', '""', $res2['sM3']).'",';
$csv_output .= '"'.str_replace('"', '""', $Tot2Q1).'",';
$csv_output .= '"'.str_replace('"', '""', $res2['sM4']).'",';
$csv_output .= '"'.str_replace('"', '""', $res2['sM5']).'",';
$csv_output .= '"'.str_replace('"', '""', $res2['sM6']).'",';
$csv_output .= '"'.str_replace('"', '""', $Tot2Q2).'",';
$csv_output .= '"'.str_replace('"', '""', $res2['sM7']).'",';
$csv_output .= '"'.str_replace('"', '""', $res2['sM8']).'",';
$csv_output .= '"'.str_replace('"', '""', $res2['sM9']).'",';
$csv_output .= '"'.str_replace('"', '""', $Tot2Q3).'",';
$csv_output .= '"'.str_replace('"', '""', $res2['sM10']).'",';
$csv_output .= '"'.str_replace('"', '""', $res2['sM11']).'",';
$csv_output .= '"'.str_replace('"', '""', $res2['sM12']).'",';
$csv_output .= '"'.str_replace('"', '""', $Tot2Q4).'",';
$csv_output .= '"'.str_replace('"', '""', $res2Tot).'",';
$csv_output .= '"'.str_replace('"', '""', '').'",';
	   
 } /* 3 */ if($j==3){ 
 $sqlP3d=mysql_query("select SUM(M1) as sM1,SUM(M2) as sM2,SUM(M3) as sM3,SUM(M4) as sM4,SUM(M5) as sM5,SUM(M6) as sM6,SUM(M7) as sM7,SUM(M8) as sM8,SUM(M9) as sM9,SUM(M10) as sM10,SUM(M11) as sM11,SUM(M12) as sM12 from hrm_sales_sal_details_".$_REQUEST['y']." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId INNER JOIN hrm_sales_seedsitem si ON sp.ItemId=si.ItemId INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_headquater hq ON d.".$HqCon."=hq.HqId INNER JOIN hrm_state s ON hq.StateId=s.StateId where ".$subQ." AND sd.YearId=".$_REQUEST['y']." AND ".$qin." AND s.CountryId=".$_REQUEST['c'], $con); 
$res3=mysql_fetch_assoc($sqlP3d); 
$res3Tot=$res3['sM1']+$res3['sM2']+$res3['sM3']+$res3['sM4']+$res3['sM5']+$res3['sM6']+$res3['sM7']+$res3['sM8']+$res3['sM9']+$res3['sM10']+$res3['sM11']+$res3['sM12']; 
$Tot3Q1=$res3['sM1']+$res3['sM2']+$res3['sM3']; $Tot3Q2=$res3['sM4']+$res3['sM5']+$res3['sM6'];
$Tot3Q3=$res3['sM7']+$res3['sM8']+$res3['sM9']; $Tot3Q4=$res3['sM10']+$res3['sM11']+$res3['sM12'];
$csv_output .= '"'.str_replace('"', '""', $y3T).'",';
$csv_output .= '"'.str_replace('"', '""', $y3).'",';
$csv_output .= '"'.str_replace('"', '""', $res3['sM1']).'",';
$csv_output .= '"'.str_replace('"', '""', $res3['sM2']).'",';
$csv_output .= '"'.str_replace('"', '""', $res3['sM3']).'",';
$csv_output .= '"'.str_replace('"', '""', $Tot3Q1).'",';
$csv_output .= '"'.str_replace('"', '""', $res3['sM4']).'",';
$csv_output .= '"'.str_replace('"', '""', $res3['sM5']).'",';
$csv_output .= '"'.str_replace('"', '""', $res3['sM6']).'",';
$csv_output .= '"'.str_replace('"', '""', $Tot3Q2).'",';
$csv_output .= '"'.str_replace('"', '""', $res3['sM7']).'",';
$csv_output .= '"'.str_replace('"', '""', $res3['sM8']).'",';
$csv_output .= '"'.str_replace('"', '""', $res3['sM9']).'",';
$csv_output .= '"'.str_replace('"', '""', $Tot3Q3).'",';
$csv_output .= '"'.str_replace('"', '""', $res3['sM10']).'",';
$csv_output .= '"'.str_replace('"', '""', $res3['sM11']).'",';
$csv_output .= '"'.str_replace('"', '""', $res3['sM12']).'",';
$csv_output .= '"'.str_replace('"', '""', $Tot3Q4).'",';
$csv_output .= '"'.str_replace('"', '""', $res3Tot).'",';
$csv_output .= '"'.str_replace('"', '""', '').'",';	     

} /* 4 */  if($j==4){ 
$sqlP4d=mysql_query("select SUM(M1_Proj) as sM1,SUM(M2_Proj) as sM2,SUM(M3_Proj) as sM3,SUM(M4_Proj) as sM4,SUM(M5_Proj) as sM5,SUM(M6_Proj) as sM6,SUM(M7_Proj) as sM7,SUM(M8_Proj) as sM8,SUM(M9_Proj) as sM9,SUM(M10_Proj) as sM10,SUM(M11_Proj) as sM11,SUM(M12_Proj) as sM12 from hrm_sales_sal_details_".$AfterYId." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId INNER JOIN hrm_sales_seedsitem si ON sp.ItemId=si.ItemId INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_headquater hq ON d.".$HqCon."=hq.HqId INNER JOIN hrm_state s ON hq.StateId=s.StateId where ".$subQ." AND sd.YearId=".$AfterYId." AND ".$qin." AND s.CountryId=".$_REQUEST['c'], $con); 
$res4=mysql_fetch_assoc($sqlP4d); 
$res4Tot=$res4['sM1']+$res4['sM2']+$res4['sM3']+$res4['sM4']+$res4['sM5']+$res4['sM6']+$res4['sM7']+$res4['sM8']+$res4['sM9']+$res4['sM10']+$res4['sM11']+$res4['sM12']; 
$Tot4Q1=$res4['sM1']+$res4['sM2']+$res4['sM3']; $Tot4Q2=$res4['sM4']+$res4['sM5']+$res4['sM6'];
$Tot4Q3=$res4['sM7']+$res4['sM8']+$res4['sM9']; $Tot4Q4=$res4['sM10']+$res4['sM11']+$res4['sM12'];
$csv_output .= '"'.str_replace('"', '""', $y4T).'",';
$csv_output .= '"'.str_replace('"', '""', $y4).'",';
$csv_output .= '"'.str_replace('"', '""', $res4['sM1']).'",';
$csv_output .= '"'.str_replace('"', '""', $res4['sM2']).'",';
$csv_output .= '"'.str_replace('"', '""', $res4['sM3']).'",';
$csv_output .= '"'.str_replace('"', '""', $Tot4Q1).'",';
$csv_output .= '"'.str_replace('"', '""', $res4['sM4']).'",';
$csv_output .= '"'.str_replace('"', '""', $res4['sM5']).'",';
$csv_output .= '"'.str_replace('"', '""', $res4['sM6']).'",';
$csv_output .= '"'.str_replace('"', '""', $Tot4Q2).'",';
$csv_output .= '"'.str_replace('"', '""', $res4['sM7']).'",';
$csv_output .= '"'.str_replace('"', '""', $res4['sM8']).'",';
$csv_output .= '"'.str_replace('"', '""', $res4['sM9']).'",';
$csv_output .= '"'.str_replace('"', '""', $Tot4Q3).'",';
$csv_output .= '"'.str_replace('"', '""', $res4['sM10']).'",';
$csv_output .= '"'.str_replace('"', '""', $res4['sM11']).'",';
$csv_output .= '"'.str_replace('"', '""', $res4['sM12']).'",';
$csv_output .= '"'.str_replace('"', '""', $Tot4Q4).'",';
$csv_output .= '"'.str_replace('"', '""', $res4Tot).'",';
$csv_output .= '"'.str_replace('"', '""', '').'",';	 

 } /* 5 */  $sqlYe=mysql_query("select FromDate,ToDate from hrm_sales_year where YearId=".$_REQUEST['YId'], $con); $resYe=mysql_fetch_assoc($sqlYe);
        $yeft=date("y",strtotime($resYe['FromDate'])).'-'.date("y",strtotime($resYe['ToDate'])); $yeT='YTD'; 
	    if($j==5){ 
$sqlP5d=mysql_query("select SUM(M1_Ach) as sM1,SUM(M2_Ach) as sM2,SUM(M3_Ach) as sM3,SUM(M4_Ach) as sM4,SUM(M5_Ach) as sM5,SUM(M6_Ach) as sM6,SUM(M7_Ach) as sM7,SUM(M8_Ach) as sM8,SUM(M9_Ach) as sM9,SUM(M10_Ach) as sM10,SUM(M11_Ach) as sM11,SUM(M12_Ach) as sM12 from hrm_sales_sal_details_".$_REQUEST['y']." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId INNER JOIN hrm_sales_seedsitem si ON sp.ItemId=si.ItemId INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_headquater hq ON d.".$HqCon."=hq.HqId INNER JOIN hrm_state s ON hq.StateId=s.StateId where ".$subQ." AND sd.YearId=".$_REQUEST['y']." AND ".$qin." AND s.CountryId=".$_REQUEST['c'], $con);
 $res5=mysql_fetch_assoc($sqlP5d);  
 $res5Tot=$res5['sM1']+$res5['sM2']+$res5['sM3']+$res5['sM4']+$res5['sM5']+$res5['sM6']+$res5['sM7']+$res5['sM8']+$res5['sM9']+$res5['sM10']+$res5['sM11']+$res5['sM12'];
$Tot5Q1=$res5['sM1']+$res5['sM2']+$res5['sM3']; $Tot5Q2=$res5['sM4']+$res5['sM5']+$res5['sM6'];
 $Tot5Q3=$res5['sM7']+$res5['sM8']+$res5['sM9']; $Tot5Q4=$res5['sM10']+$res5['sM11']+$res5['sM12'];
$csv_output .= '"'.str_replace('"', '""', $yeT).'",';
$csv_output .= '"'.str_replace('"', '""', $yeft).'",';
$csv_output .= '"'.str_replace('"', '""', $res5['sM1']).'",';
$csv_output .= '"'.str_replace('"', '""', $res5['sM2']).'",';
$csv_output .= '"'.str_replace('"', '""', $res5['sM3']).'",';
$csv_output .= '"'.str_replace('"', '""', $Tot5Q1).'",';
$csv_output .= '"'.str_replace('"', '""', $res5['sM4']).'",';
$csv_output .= '"'.str_replace('"', '""', $res5['sM5']).'",';
$csv_output .= '"'.str_replace('"', '""', $res5['sM6']).'",';
$csv_output .= '"'.str_replace('"', '""', $Tot5Q2).'",';
$csv_output .= '"'.str_replace('"', '""', $res5['sM7']).'",';
$csv_output .= '"'.str_replace('"', '""', $res5['sM8']).'",';
$csv_output .= '"'.str_replace('"', '""', $res5['sM9']).'",';
$csv_output .= '"'.str_replace('"', '""', $Tot5Q3).'",';
$csv_output .= '"'.str_replace('"', '""', $res5['sM10']).'",';
$csv_output .= '"'.str_replace('"', '""', $res5['sM11']).'",';
$csv_output .= '"'.str_replace('"', '""', $res5['sM12']).'",';
$csv_output .= '"'.str_replace('"', '""', $Tot5Q4).'",';
$csv_output .= '"'.str_replace('"', '""', $res5Tot).'",';
$csv_output .= '"'.str_replace('"', '""', '').'",';	 
}
$csv_output .= "\n"; 
}




# Create the Column Headings
$csv_output .= '"Sn",';
$csv_output .= '"CROP",'; 
$csv_output .= '"VARIETY",';
$csv_output .= '"TYPE",';
$csv_output .= '"PLAN",';
$csv_output .= '"YEAR",';

$csv_output .= '"APR"'.$my1.',';
$csv_output .= '"MAY"'.$my1.',';
$csv_output .= '"JUN"'.$my1.',';
$csv_output .= '"Q1",';	
$csv_output .= '"JUL"'.$my1.',';	
$csv_output .= '"AUG"'.$my1.',';
$csv_output .= '"SEP"'.$my1.',';
$csv_output .= '"Q2",';
$csv_output .= '"OCT"'.$my1.',';
$csv_output .= '"NOV"'.$my1.',';
$csv_output .= '"DEC"'.$my1.',';
$csv_output .= '"Q3",';
$csv_output .= '"JAN"'.$my2.',';
$csv_output .= '"FEB"'.$my2.',';
$csv_output .= '"MAR"'.$my2.',';
$csv_output .= '"Q4",';
$csv_output .= '"TOTAL in KG",'; 
$csv_output .= '"VALUE in LAKH",';
$csv_output .= "\n";		

# Get Users Details form the DB 
$sql = mysql_query("select sp.ItemId,ProductId,ProductName,ItemName,ItemCode,TypeName from hrm_sales_seedsproduct sp INNER JOIN hrm_sales_seedsitem si ON sp.ItemId=si.ItemId INNER JOIN hrm_sales_seedtype st ON sp.TypeId=st.TypeId where ".$qin." order by si.GroupId ASC, si.ItemName ASC, st.TypeName ASC, sp.ProductName ASC", $con); 
$Sn=1; while($res=mysql_fetch_array($sql)){ for($i=1; $i<=5; $i++){

if($i==1){$SSn=$Sn; $IN=$res['ItemName']; $PN=$res['ProductName']; $TN=$res['TypeName'];}else{$SSn=''; $IN=''; $PN=''; $TN='';}	  
$csv_output .= '"'.str_replace('"', '""', $SSn).'",';
$csv_output .= '"'.str_replace('"', '""', $IN).'",';
$csv_output .= '"'.str_replace('"', '""', $PN).'",'; 
$csv_output .= '"'.str_replace('"', '""', $TN).'",';

/* 1 */ if($i==1){$sqlP1d=mysql_query("select SUM(M1_Ach) as tm1,SUM(M2_Ach) as tm2,SUM(M3_Ach) as tm3,SUM(M4_Ach) as tm4,SUM(M5_Ach) as tm5,SUM(M6_Ach) as tm6,SUM(M7_Ach) as tm7,SUM(M8_Ach) as tm8,SUM(M9_Ach) as tm9,SUM(M10_Ach) as tm10,SUM(M11_Ach) as tm11,SUM(M12_Ach) as tm12 from hrm_sales_sal_details_".$BeforeYId2." sd INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_headquater hq ON d.".$HqCon."=hq.HqId INNER JOIN hrm_state s ON hq.StateId=s.StateId where ".$subQ." AND s.CountryId=".$_REQUEST['c']." AND sd.YearId=".$BeforeYId2." AND sd.ProductId=".$res['ProductId'], $con); $res1=mysql_fetch_assoc($sqlP1d); 
$res1Tot=$res1['tm1']+$res1['tm2']+$res1['tm3']+$res1['tm4']+$res1['tm5']+$res1['tm6']+$res1['tm7']+$res1['tm8']+$res1['tm9']+$res1['tm10']+$res1['tm11']+$res1['tm12']; 
$res1Tot1=$res1['tm1']+$res1['tm2']+$res1['tm3']; $res1Tot2=$res1['tm4']+$res1['tm5']+$res1['tm6'];
$res1Tot3=$res1['tm7']+$res1['tm8']+$res1['tm9']; $res1Tot4=$res1['tm10']+$res1['tm11']+$res1['tm12'];

include("Nrv1.php");

$Net4=$res1['tm1']*$Nrv4; $Net5=$res1['tm2']*$Nrv5; $Net6=$res1['tm3']*$Nrv6; $Net7=$res1['tm4']*$Nrv7; $Net8=$res1['tm5']*$Nrv8; 
$Net9=$res1['tm6']*$Nrv9; $Net10=$res1['tm7']*$Nrv10; $Net11=$res1['tm8']*$Nrv11; $Net12=$res1['tm9']*$Nrv12; $Net1=$res1['tm10']*$Nrv1; 
$Net2=$res1['tm11']*$Nrv2; $Net3=$res1['tm12']*$Nrv3; $NetNRV_1=$Net4+$Net5+$Net6+$Net7+$Net8+$Net9+$Net10+$Net11+$Net12+$Net1+$Net2+$Net3; $LakhNRV_1=$NetNRV_1/100000;

if($res1['tm1']>0){$mAch1=$res1['tm1'];}else{$mAch1='';}
if($res1['tm2']>0){$mAch2=$res1['tm2'];}else{$mAch2='';}
if($res1['tm3']>0){$mAch3=$res1['tm3'];}else{$mAch3='';}
if($res1['tm4']>0){$mAch4=$res1['tm4'];}else{$mAch4='';}
if($res1['tm5']>0){$mAch5=$res1['tm5'];}else{$mAch5='';}
if($res1['tm6']>0){$mAch6=$res1['tm6'];}else{$mAch6='';}
if($res1['tm7']>0){$mAch7=$res1['tm7'];}else{$mAch7='';}
if($res1['tm8']>0){$mAch8=$res1['tm8'];}else{$mAch8='';}
if($res1['tm9']>0){$mAch9=$res1['tm9'];}else{$mAch9='';}
if($res1['tm10']>0){$mAch10=$res1['tm10'];}else{$mAch10='';}
if($res1['tm11']>0){$mAch11=$res1['tm11'];}else{$mAch11='';}
if($res1['tm12']>0){$mAch12=$res1['tm12'];}else{$mAch12='';}
if($res1Tot>0){$totKg=$res1Tot;}else{$totKg='';}
if($LakhNRV_1>0){$totLakh=$LakhNRV_1;}else{$totLakh='';}

$csv_output .= '"'.str_replace('"', '""', $y1T).'",';
$csv_output .= '"'.str_replace('"', '""', $y1).'",';
$csv_output .= '"'.str_replace('"', '""', $mAch1).'",';
$csv_output .= '"'.str_replace('"', '""', $mAch2).'",';
$csv_output .= '"'.str_replace('"', '""', $mAch3).'",';
$csv_output .= '"'.str_replace('"', '""', $res1Tot1).'",';
$csv_output .= '"'.str_replace('"', '""', $mAch4).'",';
$csv_output .= '"'.str_replace('"', '""', $mAch5).'",';
$csv_output .= '"'.str_replace('"', '""', $mAch6).'",';
$csv_output .= '"'.str_replace('"', '""', $res1Tot2).'",';	
$csv_output .= '"'.str_replace('"', '""', $mAch7).'",';
$csv_output .= '"'.str_replace('"', '""', $mAch8).'",';
$csv_output .= '"'.str_replace('"', '""', $mAch9).'",';
$csv_output .= '"'.str_replace('"', '""', $res1Tot3).'",';
$csv_output .= '"'.str_replace('"', '""', $mAch10).'",';
$csv_output .= '"'.str_replace('"', '""', $mAch11).'",';
$csv_output .= '"'.str_replace('"', '""', $mAch12).'",';
$csv_output .= '"'.str_replace('"', '""', $res1Tot4).'",';
$csv_output .= '"'.str_replace('"', '""', $totKg).'",';
$csv_output .= '"'.str_replace('"', '""', $totLakh).'",';	

} /* 2 */ if($i==2){ $sqlP2d=mysql_query("select SUM(M1_Ach) as tm1,SUM(M2_Ach) as tm2,SUM(M3_Ach) as tm3,SUM(M4_Ach) as tm4,SUM(M5_Ach) as tm5,SUM(M6_Ach) as tm6,SUM(M7_Ach) as tm7,SUM(M8_Ach) as tm8,SUM(M9_Ach) as tm9,SUM(M10_Ach) as tm10,SUM(M11_Ach) as tm11,SUM(M12_Ach) as tm12 from hrm_sales_sal_details_".$BeforeYId." sd INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_headquater hq ON d.".$HqCon."=hq.HqId INNER JOIN hrm_state s ON hq.StateId=s.StateId where ".$subQ." AND s.CountryId=".$_REQUEST['c']." AND sd.YearId=".$BeforeYId." AND sd.ProductId=".$res['ProductId'], $con); $res2=mysql_fetch_assoc($sqlP2d); 
$res2Tot=$res2['tm1']+$res2['tm2']+$res2['tm3']+$res2['tm4']+$res2['tm5']+$res2['tm6']+$res2['tm7']+$res2['tm8']+$res2['tm9']+$res2['tm10']+$res2['tm11']+$res2['tm12']; 
$res2Tot1=$res2['tm1']+$res2['tm2']+$res2['tm3']; $res2Tot2=$res2['tm4']+$res2['tm5']+$res2['tm6'];
 $res2Tot3=$res2['tm7']+$res2['tm8']+$res2['tm9']; $res2Tot4=$res2['tm10']+$res2['tm11']+$res2['tm12'];
 
include("Nrv2.php");

$Net4=$res2['tm1']*$Nrv4; $Net5=$res2['tm2']*$Nrv5; $Net6=$res2['tm3']*$Nrv6; $Net7=$res2['tm4']*$Nrv7; $Net8=$res2['tm5']*$Nrv8; 
$Net9=$res2['tm6']*$Nrv9; $Net10=$res2['tm7']*$Nrv10; $Net11=$res2['tm8']*$Nrv11; $Net12=$res2['tm9']*$Nrv12; $Net1=$res2['tm10']*$Nrv1; 
$Net2=$res2['tm11']*$Nrv2; $Net3=$res2['tm12']*$Nrv3; $NetNRV_2=$Net4+$Net5+$Net6+$Net7+$Net8+$Net9+$Net10+$Net11+$Net12+$Net1+$Net2+$Net3; $LakhNRV_2=$NetNRV_2/100000;

if($res2['tm1']>0){$m2Ach1=$res2['tm1'];}else{$m2Ach1='';}
if($res2['tm2']>0){$m2Ach2=$res2['tm2'];}else{$m2Ach2='';}
if($res2['tm3']>0){$m2Ach3=$res2['tm3'];}else{$m2Ach3='';}
if($res2['tm4']>0){$m2Ach4=$res2['tm4'];}else{$m2Ach4='';}
if($res2['tm5']>0){$m2Ach5=$res2['tm5'];}else{$m2Ach5='';}
if($res2['tm6']>0){$m2Ach6=$res2['tm6'];}else{$m2Ach6='';}
if($res2['tm7']>0){$m2Ach7=$res2['tm7'];}else{$m2Ach7='';}
if($res2['tm8']>0){$m2Ach8=$res2['tm8'];}else{$m2Ach8='';}
if($res2['tm9']>0){$m2Ach9=$res2['tm9'];}else{$m2Ach9='';}
if($res2['tm10']>0){$m2Ach10=$res2['tm10'];}else{$m2Ach10='';}
if($res2['tm11']>0){$m2Ach11=$res2['tm11'];}else{$m2Ach11='';}
if($res2['tm12']>0){$m2Ach12=$res2['tm12'];}else{$m2Ach12='';}
if($res2Tot>0){$tot2Kg=$res2Tot;}else{$tot2Kg='';}
if($LakhNRV_2>0){$tot2Lakh=$LakhNRV_2;}else{$tot2Lakh='';}

$csv_output .= '"'.str_replace('"', '""', $y2T).'",';
$csv_output .= '"'.str_replace('"', '""', $y2).'",';
$csv_output .= '"'.str_replace('"', '""', $m2Ach1).'",';
$csv_output .= '"'.str_replace('"', '""', $m2Ach2).'",';
$csv_output .= '"'.str_replace('"', '""', $m2Ach3).'",';
$csv_output .= '"'.str_replace('"', '""', $res2Tot1).'",';
$csv_output .= '"'.str_replace('"', '""', $m2Ach4).'",';
$csv_output .= '"'.str_replace('"', '""', $m2Ach5).'",';
$csv_output .= '"'.str_replace('"', '""', $m2Ach6).'",';
$csv_output .= '"'.str_replace('"', '""', $res2Tot2).'",';	
$csv_output .= '"'.str_replace('"', '""', $m2Ach7).'",';
$csv_output .= '"'.str_replace('"', '""', $m2Ach8).'",';
$csv_output .= '"'.str_replace('"', '""', $m2Ach9).'",';
$csv_output .= '"'.str_replace('"', '""', $res2Tot3).'",';
$csv_output .= '"'.str_replace('"', '""', $m2Ach10).'",';
$csv_output .= '"'.str_replace('"', '""', $m2Ach11).'",';
$csv_output .= '"'.str_replace('"', '""', $m2Ach12).'",';
$csv_output .= '"'.str_replace('"', '""', $res2Tot4).'",';
$csv_output .= '"'.str_replace('"', '""', $tot2Kg).'",';
$csv_output .= '"'.str_replace('"', '""', $tot2Lakh).'",';

 } /* 3 */ if($i==3){ $sqlP3d=mysql_query("select SUM(M1) as tm1,SUM(M2) as tm2,SUM(M3) as tm3,SUM(M4) as tm4,SUM(M5) as tm5,SUM(M6) as tm6,SUM(M7) as tm7,SUM(M8) as tm8,SUM(M9) as tm9,SUM(M10) as tm10,SUM(M11) as tm11,SUM(M12) as tm12 from hrm_sales_sal_details_".$_REQUEST['y']." sd INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_headquater hq ON d.".$HqCon."=hq.HqId INNER JOIN hrm_state s ON hq.StateId=s.StateId where ".$subQ." AND s.CountryId=".$_REQUEST['c']." AND sd.YearId=".$_REQUEST['y']." AND sd.ProductId=".$res['ProductId'], $con); $res3=mysql_fetch_assoc($sqlP3d); 
$res3Tot=$res3['tm1']+$res3['tm2']+$res3['tm3']+$res3['tm4']+$res3['tm5']+$res3['tm6']+$res3['tm7']+$res3['tm8']+$res3['tm9']+$res3['tm10']+$res3['tm11']+$res3['tm12']; 
$res3Tot1=$res3['tm1']+$res3['tm2']+$res3['tm3']; $res3Tot2=$res3['tm4']+$res3['tm5']+$res3['tm6'];
$res3Tot3=$res3['tm7']+$res3['tm8']+$res3['tm9']; $res3Tot4=$res3['tm10']+$res3['tm11']+$res3['tm12'];

include("Nrv3.php");

$Net4=$res3['tm1']*$Nrv4; $Net5=$res3['tm2']*$Nrv5; $Net6=$res3['tm3']*$Nrv6; $Net7=$res3['tm4']*$Nrv7; $Net8=$res3['tm5']*$Nrv8; 
$Net9=$res3['tm6']*$Nrv9; $Net10=$res3['tm7']*$Nrv10; $Net11=$res3['tm8']*$Nrv11; $Net12=$res3['tm9']*$Nrv12; $Net1=$res3['tm10']*$Nrv1; 
$Net2=$res3['tm11']*$Nrv2; $Net3=$res3['tm12']*$Nrv3; $NetNRV_3=$Net4+$Net5+$Net6+$Net7+$Net8+$Net9+$Net10+$Net11+$Net12+$Net1+$Net2+$Net3; $LakhNRV_3=$NetNRV_3/100000;

if($res3['tm1']>0){$m3Ach1=$res3['tm1'];}else{$m3Ach1='';}
if($res3['tm2']>0){$m3Ach2=$res3['tm2'];}else{$m3Ach2='';}
if($res3['tm3']>0){$m3Ach3=$res3['tm3'];}else{$m3Ach3='';}
if($res3['tm4']>0){$m3Ach4=$res3['tm4'];}else{$m3Ach4='';}
if($res3['tm5']>0){$m3Ach5=$res3['tm5'];}else{$m3Ach5='';}
if($res3['tm6']>0){$m3Ach6=$res3['tm6'];}else{$m3Ach6='';}
if($res3['tm7']>0){$m3Ach7=$res3['tm7'];}else{$m3Ach7='';}
if($res3['tm8']>0){$m3Ach8=$res3['tm8'];}else{$m3Ach8='';}
if($res3['tm9']>0){$m3Ach9=$res3['tm9'];}else{$m3Ach9='';}
if($res3['tm10']>0){$m3Ach10=$res3['tm10'];}else{$m3Ach10='';}
if($res3['tm11']>0){$m3Ach11=$res3['tm11'];}else{$m3Ach11='';}
if($res3['tm12']>0){$m3Ach12=$res3['tm12'];}else{$m3Ach12='';}
if($res3Tot>0){$tot3Kg=$res3Tot;}else{$tot3Kg='';}
if($LakhNRV_3>0){$tot3Lakh=$LakhNRV_3;}else{$tot3Lakh='';}

$csv_output .= '"'.str_replace('"', '""', $y3T).'",';
$csv_output .= '"'.str_replace('"', '""', $y3).'",';
$csv_output .= '"'.str_replace('"', '""', $m3Ach1).'",';
$csv_output .= '"'.str_replace('"', '""', $m3Ach2).'",';
$csv_output .= '"'.str_replace('"', '""', $m3Ach3).'",';
$csv_output .= '"'.str_replace('"', '""', $res3Tot1).'",';
$csv_output .= '"'.str_replace('"', '""', $m3Ach4).'",';
$csv_output .= '"'.str_replace('"', '""', $m3Ach5).'",';
$csv_output .= '"'.str_replace('"', '""', $m3Ach6).'",';
$csv_output .= '"'.str_replace('"', '""', $res3Tot2).'",';	
$csv_output .= '"'.str_replace('"', '""', $m3Ach7).'",';
$csv_output .= '"'.str_replace('"', '""', $m3Ach8).'",';
$csv_output .= '"'.str_replace('"', '""', $m3Ach9).'",';
$csv_output .= '"'.str_replace('"', '""', $res3Tot3).'",';
$csv_output .= '"'.str_replace('"', '""', $m3Ach10).'",';
$csv_output .= '"'.str_replace('"', '""', $m3Ach11).'",';
$csv_output .= '"'.str_replace('"', '""', $m3Ach12).'",';
$csv_output .= '"'.str_replace('"', '""', $res3Tot4).'",';
$csv_output .= '"'.str_replace('"', '""', $tot3Kg).'",';
$csv_output .= '"'.str_replace('"', '""', $tot3Lakh).'",';

} /* 4 */  if($i==4){ $sqlP4d=mysql_query("select SUM(M1_Proj) as tm1,SUM(M2_Proj) as tm2,SUM(M3_Proj) as tm3,SUM(M4_Proj) as tm4,SUM(M5_Proj) as tm5,SUM(M6_Proj) as tm6,SUM(M7_Proj) as tm7,SUM(M8_Proj) as tm8,SUM(M9_Proj) as tm9,SUM(M10_Proj) as tm10,SUM(M11_Proj) as tm11,SUM(M12_Proj) as tm12 from hrm_sales_sal_details_".$AfterYId." sd INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_headquater hq ON d.".$HqCon."=hq.HqId INNER JOIN hrm_state s ON hq.StateId=s.StateId where ".$subQ." AND s.CountryId=".$_REQUEST['c']." AND sd.YearId=".$AfterYId." AND sd.ProductId=".$res['ProductId'], $con); $res4=mysql_fetch_assoc($sqlP4d); 
$res4Tot=$res4['tm1']+$res4['tm2']+$res4['tm3']+$res4['tm4']+$res4['tm5']+$res4['tm6']+$res4['tm7']+$res4['tm8']+$res4['tm9']+$res4['tm10']+$res4['tm11']+$res4['tm12']; 
$res4Tot1=$res4['tm1']+$res4['tm2']+$res4['tm3']; $res4Tot2=$res4['tm4']+$res4['tm5']+$res4['tm6'];
$res4Tot3=$res4['tm7']+$res4['tm8']+$res4['tm9']; $res4Tot4=$res4['tm10']+$res4['tm11']+$res4['tm12'];

include("Nrv4.php");


$Net4=$res4['tm1']*$Nrv4; $Net5=$res4['tm2']*$Nrv5; $Net6=$res4['tm3']*$Nrv6; $Net7=$res4['tm4']*$Nrv7; $Net8=$res4['tm5']*$Nrv8; 
$Net9=$res4['tm6']*$Nrv9; $Net10=$res4['tm7']*$Nrv10; $Net11=$res4['tm8']*$Nrv11; $Net12=$res4['tm9']*$Nrv12; $Net1=$res4['tm10']*$Nrv1; 
$Net2=$res4['tm11']*$Nrv2; $Net3=$res4['tm12']*$Nrv3; $NetNRV_4=$Net4+$Net5+$Net6+$Net7+$Net8+$Net9+$Net10+$Net11+$Net12+$Net1+$Net2+$Net3; $LakhNRV_4=$NetNRV_4/100000;

if($res4['tm1']>0){$m4Ach1=$res4['tm1'];}else{$m4Ach1='';}
if($res4['tm2']>0){$m4Ach2=$res4['tm2'];}else{$m4Ach2='';}
if($res4['tm3']>0){$m4Ach3=$res4['tm3'];}else{$m4Ach3='';}
if($res4['tm4']>0){$m4Ach4=$res4['tm4'];}else{$m4Ach4='';}
if($res4['tm5']>0){$m4Ach5=$res4['tm5'];}else{$m4Ach5='';}
if($res4['tm6']>0){$m4Ach6=$res4['tm6'];}else{$m4Ach6='';}
if($res4['tm7']>0){$m4Ach7=$res4['tm7'];}else{$m4Ach7='';}
if($res4['tm8']>0){$m4Ach8=$res4['tm8'];}else{$m4Ach8='';}
if($res4['tm9']>0){$m4Ach9=$res4['tm9'];}else{$m4Ach9='';}
if($res4['tm10']>0){$m4Ach10=$res4['tm10'];}else{$m4Ach10='';}
if($res4['tm11']>0){$m4Ach11=$res4['tm11'];}else{$m4Ach11='';}
if($res4['tm12']>0){$m4Ach12=$res4['tm12'];}else{$m4Ach12='';}
if($res4Tot>0){$tot4Kg=$res4Tot;}else{$tot4Kg='';}
if($LakhNRV_4>0){$tot4Lakh=$LakhNRV_4;}else{$tot4Lakh='';}

$csv_output .= '"'.str_replace('"', '""', $y4T).'",';
$csv_output .= '"'.str_replace('"', '""', $y4).'",';
$csv_output .= '"'.str_replace('"', '""', $m4Ach1).'",';
$csv_output .= '"'.str_replace('"', '""', $m4Ach2).'",';
$csv_output .= '"'.str_replace('"', '""', $m4Ach3).'",';
$csv_output .= '"'.str_replace('"', '""', $res4Tot1).'",';
$csv_output .= '"'.str_replace('"', '""', $m4Ach4).'",';
$csv_output .= '"'.str_replace('"', '""', $m4Ach5).'",';
$csv_output .= '"'.str_replace('"', '""', $m4Ach6).'",';
$csv_output .= '"'.str_replace('"', '""', $res4Tot2).'",';	
$csv_output .= '"'.str_replace('"', '""', $m4Ach7).'",';
$csv_output .= '"'.str_replace('"', '""', $m4Ach8).'",';
$csv_output .= '"'.str_replace('"', '""', $m4Ach9).'",';
$csv_output .= '"'.str_replace('"', '""', $res4Tot3).'",';
$csv_output .= '"'.str_replace('"', '""', $m4Ach10).'",';
$csv_output .= '"'.str_replace('"', '""', $m4Ach11).'",';
$csv_output .= '"'.str_replace('"', '""', $m4Ach12).'",';
$csv_output .= '"'.str_replace('"', '""', $res4Tot4).'",';
$csv_output .= '"'.str_replace('"', '""', $tot4Kg).'",';
$csv_output .= '"'.str_replace('"', '""', $tot4Lakh).'",';

 } /* 5 */  $sqlYe=mysql_query("select FromDate,ToDate from hrm_sales_year where YearId=".$_REQUEST['YId'], $con); $resYe=mysql_fetch_assoc($sqlYe);
            $yeft=date("y",strtotime($resYe['FromDate'])).'-'.date("y",strtotime($resYe['ToDate'])); $yeT='YTD'; 
	    if($i==5){ $sqlP5d=mysql_query("select SUM(M1_Ach) as tM1,SUM(M2_Ach) as tM2,SUM(M3_Ach) as tM3,SUM(M4_Ach) as tM4,SUM(M5_Ach) as tM5,SUM(M6_Ach) as tM6,SUM(M7_Ach) as tM7,SUM(M8_Ach) as tM8,SUM(M9_Ach) as tM9,SUM(M10_Ach) as tM10,SUM(M11_Ach) as tM11,SUM(M12_Ach) as tM12 from hrm_sales_sal_details_".$_REQUEST['y']." sd INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_headquater hq ON d.".$HqCon."=hq.HqId INNER JOIN hrm_state s ON hq.StateId=s.StateId where ".$subQ." AND s.CountryId=".$_REQUEST['c']." AND sd.YearId=".$_REQUEST['y']." AND sd.ProductId=".$res['ProductId'], $con); $res5=mysql_fetch_assoc($sqlP5d);  
$res5Tot=$res5['tM1']+$res5['tM2']+$res5['tM3']+$res5['tM4']+$res5['tM5']+$res5['tM6']+$res5['tM7']+$res5['tM8']+$res5['tM9']+$res5['tM10']+$res5['tM11']+$res5['tM12'];
$res5Tot1=$res5['tM1']+$res5['tM2']+$res5['tM3']; $res5Tot2=$res5['tM4']+$res5['tM5']+$res5['tM6'];
 $res5Tot3=$res5['tM7']+$res5['tM8']+$res5['tM9']; $res5Tot4=$res5['tM10']+$res5['tM11']+$res5['tM12'];

include("Nrv5.php");
 
$Net4=$res5['tM1']*$Nrv4; $Net5=$res5['tM2']*$Nrv5; $Net6=$res5['tM3']*$Nrv6; $Net7=$res5['tM4']*$Nrv7; $Net8=$res5['tM5']*$Nrv8; 
$Net9=$res5['tM6']*$Nrv9; $Net10=$res5['tM7']*$Nrv10; $Net11=$res5['tM8']*$Nrv11; $Net12=$res5['tM9']*$Nrv12; $Net1=$res5['tM10']*$Nrv1; 
$Net2=$res5['tM11']*$Nrv2; $Net3=$res5['tM12']*$Nrv3; $NetNRV_5=$Net4+$Net5+$Net6+$Net7+$Net8+$Net9+$Net10+$Net11+$Net12+$Net1+$Net2+$Net3; $LakhNRV_5=$NetNRV_5/100000;


if($res5['tM1']>0){$m5Ach1=$res5['tM1'];}else{$m5Ach1='';}
if($res5['tM2']>0){$m5Ach2=$res5['tM2'];}else{$m5Ach2='';}
if($res5['tM3']>0){$m5Ach3=$res5['tM3'];}else{$m5Ach3='';}
if($res5['tM4']>0){$m5Ach4=$res5['tM4'];}else{$m5Ach4='';}
if($res5['tM5']>0){$m5Ach5=$res5['tM5'];}else{$m5Ach5='';}
if($res5['tM6']>0){$m5Ach6=$res5['tM6'];}else{$m5Ach6='';}
if($res5['tM7']>0){$m5Ach7=$res5['tM7'];}else{$m5Ach7='';}
if($res5['tM8']>0){$m5Ach8=$res5['tM8'];}else{$m5Ach8='';}
if($res5['tM9']>0){$m5Ach9=$res5['tM9'];}else{$m5Ach9='';}
if($res5['tM10']>0){$m5Ach10=$res5['tM10'];}else{$m5Ach10='';}
if($res5['tM11']>0){$m5Ach11=$res5['tM11'];}else{$m5Ach11='';}
if($res5['tM12']>0){$m5Ach12=$res5['tM12'];}else{$m5Ach12='';}
if($res5Tot>0){$tot5Kg=$res5Tot;}else{$tot5Kg='';}
if($LakhNRV_5>0){$tot5Lakh=$LakhNRV_5;}else{$tot5Lakh='';}

$csv_output .= '"'.str_replace('"', '""', $yeT).'",';
$csv_output .= '"'.str_replace('"', '""', $yeft).'",';
$csv_output .= '"'.str_replace('"', '""', $m5Ach1).'",';
$csv_output .= '"'.str_replace('"', '""', $m5Ach2).'",';
$csv_output .= '"'.str_replace('"', '""', $m5Ach3).'",';
$csv_output .= '"'.str_replace('"', '""', $res5Tot1).'",';
$csv_output .= '"'.str_replace('"', '""', $m5Ach4).'",';
$csv_output .= '"'.str_replace('"', '""', $m5Ach5).'",';
$csv_output .= '"'.str_replace('"', '""', $m5Ach6).'",';
$csv_output .= '"'.str_replace('"', '""', $res5Tot2).'",';	
$csv_output .= '"'.str_replace('"', '""', $m5Ach7).'",';
$csv_output .= '"'.str_replace('"', '""', $m5Ach8).'",';
$csv_output .= '"'.str_replace('"', '""', $m5Ach9).'",';
$csv_output .= '"'.str_replace('"', '""', $res5Tot3).'",';
$csv_output .= '"'.str_replace('"', '""', $m5Ach10).'",';
$csv_output .= '"'.str_replace('"', '""', $m5Ach11).'",';
$csv_output .= '"'.str_replace('"', '""', $m5Ach12).'",';
$csv_output .= '"'.str_replace('"', '""', $res5Tot4).'",';
$csv_output .= '"'.str_replace('"', '""', $tot5Kg).'",';
$csv_output .= '"'.str_replace('"', '""', $tot5Lakh).'",';
}
$csv_output .= "\n"; 
}

$Sn++; }

# Close the MySql connection
mysql_close($con);
# Set the headers so the file downloads
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Content-Length: " . strlen($csv_output));
header("Content-type: text/x-csv");
header("Content-Disposition:attachment;filename=SalesPlan_Country_".$resCo['CountryName'].".csv");
echo $csv_output;
exit;
}
?>