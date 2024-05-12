<?php 
require_once('../user/config/config.php');
$sy=mysql_query("select * from hrm_year where YearId=".$_REQUEST['yi']."", $con); $ry=mysql_fetch_assoc($sy); 
$FD=date("Y",strtotime($ry['FromDate'])); $TD=date("Y",strtotime($ry['ToDate'])); $MY=$FD-1;  $PRD=$MY.'-'.$FD;
$Eg=mysql_query("select GradeId,DepartmentId,HqId from hrm_employee_general where EmployeeID=".$_REQUEST['EmpId'], $con); $resEg=mysql_fetch_assoc($Eg); 
$Egv=mysql_query("select GradeValue from hrm_grade where CompanyId=".$_REQUEST['ci']." AND GradeId=".$resEg['GradeId'], $con); $resEgv=mysql_fetch_assoc($Egv);

if($_REQUEST['SteWise']>0 AND $_REQUEST['SteName']>0)
{ 
  $sqlSte1=mysql_query("select StateName from hrm_state where StateId=".$_REQUEST['SteName'], $con); $resSte1=mysql_fetch_assoc($sqlSte1); 
  $NVV="SalesReports_StateWise:_".$FD."-".$TD."_".$resSte1['StateName']; 
} 
elseif($_REQUEST['NameWise']>0)
{ 
 if($_REQUEST['SelName']>0)
 { $sqlName1=mysql_query("select Fname,Sname,Lname from hrm_employee where EmployeeID=".$_REQUEST['SelName'], $con); $resName1=mysql_fetch_assoc($sqlName1); 
   $NVV="SalesReports_NameWise:_".$FD."-".$TD."_".$resName1['Fname'].'_'.$resName1['Sname'].'_'.$resName1['Lname']; }
 if($_REQUEST['SelName']=='All'){ $NVV='SalesReports_NameWise:'.$FD.'-'.$TD.'_ALL_MY_TEAM'; }
} 
elseif($_REQUEST['HqWise']>0)
{ 
 if($_REQUEST['SelHq']>0)
 { $sqlHq1=mysql_query("select HqName from hrm_headquater where HqId=".$_REQUEST['SelHq'], $con); $resHq1=mysql_fetch_assoc($sqlHq1); 
   $NVV="SalesReports_HQWise:_".$FD."-".$TD."_".$resHq1['HqName']; }
 if($_REQUEST['SelHq']=='All'){ $NVV='SalesReports_HQWise:'.$FD.'-'.$TD.'_ALL_HEAD_QUARTER'; }
} 
elseif($_REQUEST['DisWise']>0)
{ $sqlDis1=mysql_query("select DealerName from hrm_sales_dealer where DealerId=".$_REQUEST['SelDis'], $con); $rDis1=mysql_fetch_assoc($sqlDis1); 
  $NVV="SalesReports_DealerWise:_".$FD."-".$TD."_".$rDis1['DealerName']; }


/*************************************************************************************************************/
include("CalYCsv.php");

include("CalTitalCsv.php");

for($j=1; $j<=3; $j++){ 
$csv_output .= '"'.str_replace('"', '""', '').'",';
$csv_output .= '"'.str_replace('"', '""', '').'",';
$csv_output .= '"'.str_replace('"', '""', '').'",';
$csv_output .= '"'.str_replace('"', '""', '').'",';

if($j==1)
{ 
 $yset=$BeforeYId; $subquery='SUM(M1_Ach) as sM1,SUM(M2_Ach) as sM2,SUM(M3_Ach) as sM3,SUM(M4_Ach) as sM4,SUM(M5_Ach) as sM5,SUM(M6_Ach) as sM6,SUM(M7_Ach) as sM7,SUM(M8_Ach) as sM8,SUM(M9_Ach) as sM9,SUM(M10_Ach) as sM10,SUM(M11_Ach) as sM11,SUM(M12_Ach) as sM12'; $Lbl_1=$y2T; $Lbl_2=$y2; $Vv='A'; 
}
elseif($j==2)
{ 
 $yset=$_REQUEST['yi']; $subquery='SUM(M1) as sM1,SUM(M2) as sM2,SUM(M3) as sM3,SUM(M4) as sM4,SUM(M5) as sM5,SUM(M6) as sM6,SUM(M7) as sM7,SUM(M8) as sM8,SUM(M9) as sM9,SUM(M10) as sM10,SUM(M11) as sM11,SUM(M12) as sM12'; 
 $Lbl_1=$y3T; $Lbl_2=$y3; $Vv='B';
} 
elseif($j==3)
{ 
 $yset=$_REQUEST['yi']; $subquery='SUM(M1_Ach) as sM1,SUM(M2_Ach) as sM2,SUM(M3_Ach) as sM3,SUM(M4_Ach) as sM4,SUM(M5_Ach) as sM5,SUM(M6_Ach) as sM6,SUM(M7_Ach) as sM7,SUM(M8_Ach) as sM8,SUM(M9_Ach) as sM9,SUM(M10_Ach) as sM10,SUM(M11_Ach) as sM11,SUM(M12_Ach) as sM12'; $Lbl_1=$y2T; $Lbl_2=$y3; $Vv='C';
} 

if($_REQUEST['crp']==1)
{ 
 $Hqj='d.Hq_vc=hq.HqId'; $Rlj='d.Terr_vc=rl.EmployeeID'; $Gnj='d.Terr_vc=g.EmployeeID';
 $HqCon='d.Hq_vc'; $TerrCon='d.Terr_vc';  
}
else if($_REQUEST['crp']==2)
{ 
 $Hqj='d.Hq_fc=hq.HqId'; $Rlj='d.Terr_fc=rl.EmployeeID'; $Gnj='d.Terr_fc=g.EmployeeID';
 $HqCon='d.Hq_fc'; $TerrCon='d.Terr_fc';
}

/***********************************************************************************/
if($_REQUEST['ii']>0){ $qin="sp.ItemId=".$_REQUEST['ii']; }
else{ if($_REQUEST['crp']==1 OR $_REQUEST['crp']==2){ $qin="si.GroupId=".$_REQUEST['crp']; }else{ $qin='1=1'; } }

if($_REQUEST['SteWise']>0)
{
  $sqlPd=mysql_query("select ".$subquery." from hrm_sales_sal_details_".$yset." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId INNER JOIN hrm_sales_seedsitem si ON sp.ItemId=si.ItemId INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_headquater hq ON ".$Hqj." where hq.StateId=".$_REQUEST['SteName']." AND sd.YearId=".$yset." AND DealerSts='A' AND sp.ProductSts='A' AND ".$qin."", $con); 
}
elseif($_REQUEST['NameWise']>0)
{
 if($_REQUEST['SelName']>0)
 {
  $sqlPd=mysql_query("select ".$subquery." from hrm_sales_sal_details_".$yset." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId INNER JOIN hrm_sales_seedsitem si ON sp.ItemId=si.ItemId INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_sales_reporting_level rl ON ".$Rlj." where d.DealerSts='A' AND (".$TerrCon."=".$_REQUEST['SelName']." OR rl.R1=".$_REQUEST['SelName']." OR rl.R2=".$_REQUEST['SelName']." OR rl.R3=".$_REQUEST['SelName']." OR rl.R4=".$_REQUEST['SelName']." OR rl.R5=".$_REQUEST['SelName'].") AND sd.YearId=".$yset." AND sp.ProductSts='A' AND ".$qin."", $con); 
 }
 if($_REQUEST['SelName']=='All')
 {
  $sqlPd=mysql_query("select ".$subquery." from hrm_sales_sal_details_".$yset." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId INNER JOIN hrm_sales_seedsitem si ON sp.ItemId=si.ItemId INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_sales_reporting_level rl ON ".$Rlj." where DealerSts='A' AND (".$TerrCon."=".$_REQUEST['EmpId']." OR rl.R1=".$_REQUEST['EmpId']." OR rl.R2=".$_REQUEST['EmpId']." OR rl.R3=".$_REQUEST['EmpId']." OR rl.R4=".$_REQUEST['EmpId']." OR rl.R5=".$_REQUEST['EmpId'].") AND sp.ProductSts='A' AND sd.YearId=".$yset." AND ".$qin."", $con); 
 }
 
}
elseif($_REQUEST['HqWise']>0)
{
 if($_REQUEST['SelHq']>0)
 {
   $sqlPd=mysql_query("select ".$subquery." from hrm_sales_sal_details_".$yset." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId INNER JOIN hrm_sales_seedsitem si ON sp.ItemId=si.ItemId INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId where sd.YearId=".$yset." AND ".$qin." AND sp.ProductSts='A' AND DealerSts='A' AND ".$HqCon."=".$_REQUEST['SelHq']."", $con); 
 }
 if($_REQUEST['SelHq']=='All')
 {
  $sqlPd=mysql_query("select ".$subquery." from hrm_sales_sal_details_".$yset." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId INNER JOIN hrm_sales_seedsitem si ON sp.ItemId=si.ItemId INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_employee_general g ON ".$Gnj." where DealerSts='A' AND (".$TerrCon."=".$_REQUEST['EmpId']." OR g.RepEmployeeID=".$_REQUEST['EmpId'].") AND sp.ProductSts='A' AND sd.YearId=".$yset." AND ".$qin."", $con); 
 }
 
}

elseif($_REQUEST['DisWise']>0)
{
  $sqlPd=mysql_query("select ".$subquery." hrm_sales_sal_details_".$yset." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId INNER JOIN hrm_sales_seedsitem si ON sp.ItemId=si.ItemId where sd.YearId=".$yset." AND ".$qin." AND sp.ProductSts='A' AND sd.DealerId=".$_REQUEST['SelDis'], $con); 
}
/***********************************************************************************/

$res=mysql_fetch_assoc($sqlPd);
$resTot=$res['sM1']+$res['sM2']+$res['sM3']+$res['sM4']+$res['sM5']+$res['sM6']+$res['sM7']+$res['sM8']+$res['sM9']+$res['sM10']+$res['sM11']+$res['sM12']; 
$TotQ1=$res['sM1']+$res['sM2']+$res['sM3']; $TotQ2=$res['sM4']+$res['sM5']+$res['sM6'];
$TotQ3=$res['sM7']+$res['sM8']+$res['sM9']; $TotQ4=$res['sM10']+$res['sM11']+$res['sM12'];

$csv_output .= '"'.str_replace('"', '""', $Lbl_1).'",';
$csv_output .= '"'.str_replace('"', '""', $Lbl_2).'",';
$csv_output .= '"'.str_replace('"', '""', $res['sM1']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['sM2']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['sM3']).'",';
$csv_output .= '"'.str_replace('"', '""', $TotQ1).'",';
$csv_output .= '"'.str_replace('"', '""', '').'",';
$csv_output .= '"'.str_replace('"', '""', $res['sM4']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['sM5']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['sM6']).'",';
$csv_output .= '"'.str_replace('"', '""', $TotQ2).'",';
$csv_output .= '"'.str_replace('"', '""', '').'",';
$csv_output .= '"'.str_replace('"', '""', $res['sM7']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['sM8']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['sM9']).'",';
$csv_output .= '"'.str_replace('"', '""', $TotQ3).'",';
$csv_output .= '"'.str_replace('"', '""', '').'",';
$csv_output .= '"'.str_replace('"', '""', $res['sM10']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['sM11']).'",';
$csv_output .= '"'.str_replace('"', '""', $res['sM12']).'",';
$csv_output .= '"'.str_replace('"', '""', $TotQ4).'",';
$csv_output .= '"'.str_replace('"', '""', '').'",';
$csv_output .= '"'.str_replace('"', '""', $resTot).'",';
$csv_output .= '"'.str_replace('"', '""', '').'",';	 

$csv_output .= "\n"; 
}



# Create the Column Headings
$csv_output .= '"Sn",';
$csv_output .= '"CROP",'; 
$csv_output .= '"VARIETY",';
$csv_output .= '"TYPE",';
$csv_output .= '"PLAN",';
$csv_output .= '"YEAR",';

$csv_output .= '"APR",';
$csv_output .= '"MAY",';
$csv_output .= '"JUN",';
$csv_output .= '"Q1",';
$csv_output .= '"Q1_value (in Lakh)",';	
$csv_output .= '"JUL",';	
$csv_output .= '"AUG",';
$csv_output .= '"SEP",';
$csv_output .= '"Q2",';
$csv_output .= '"Q2_value (in Lakh)",';
$csv_output .= '"OCT",';
$csv_output .= '"NOV",';
$csv_output .= '"DEC",';
$csv_output .= '"Q3",';
$csv_output .= '"Q3_value (in Lakh)",';
$csv_output .= '"JAN",';
$csv_output .= '"FEB",';
$csv_output .= '"MAR",';
$csv_output .= '"Q4",';
$csv_output .= '"Q4_value (in Lakh)",';
$csv_output .= '"TOTAL(in KG)",'; 
$csv_output .= '"VALUE (in LAKH)",';
$csv_output .= "\n";		

if($_REQUEST['ii']>0){ $qin="sp.ItemId=".$_REQUEST['ii']; }
else{ if($_REQUEST['crp']==1 OR $_REQUEST['crp']==2){ $qin="si.GroupId=".$_REQUEST['crp']; }else{ $qin='1=1'; } }

if($_REQUEST['crp']==1)
{ 
 $Hqj='d.Hq_vc=hq.HqId'; $Rlj='d.Terr_vc=rl.EmployeeID'; $Gnj='d.Terr_vc=g.EmployeeID';
 $HqCon='d.Hq_vc'; $TerrCon='d.Terr_vc';  
}
else if($_REQUEST['crp']==2)
{ 
 $Hqj='d.Hq_fc=hq.HqId'; $Rlj='d.Terr_fc=rl.EmployeeID'; $Gnj='d.Terr_fc=g.EmployeeID';
 $HqCon='d.Hq_fc'; $TerrCon='d.Terr_fc';
}

# Get Users Details form the DB 
$sql = mysql_query("select sp.ItemId,ProductId,ProductName,ItemName,ItemCode,TypeName from hrm_sales_seedsproduct sp INNER JOIN hrm_sales_seedsitem si ON sp.ItemId=si.ItemId INNER JOIN hrm_sales_seedtype st ON sp.TypeId=st.TypeId where ".$qin." AND sp.ProductSts='A' order by si.GroupId ASC, ItemName ASC, TypeName ASC, ProductName ASC", $con); 

$Sn=1; 
while($res=mysql_fetch_array($sql)){ 
for($i=1; $i<=3; $i++){

if($i==1)
{ $SSn=$Sn; $IN=$res['ItemName']; $PN=$res['ProductName']; $TN=$res['TypeName'];}else{$SSn=''; $IN=''; $PN=''; $TN=''; }	  
$csv_output .= '"'.str_replace('"', '""', $SSn).'",';
$csv_output .= '"'.str_replace('"', '""', $IN).'",';
$csv_output .= '"'.str_replace('"', '""', $PN).'",'; 
$csv_output .= '"'.str_replace('"', '""', $TN).'",';

if($i==1)
{ 
 $yset=$BeforeYId; $subquery='SUM(M1_Ach) as tm1,SUM(M2_Ach) as tm2,SUM(M3_Ach) as tm3,SUM(M4_Ach) as tm4,SUM(M5_Ach) as tm5,SUM(M6_Ach) as tm6,SUM(M7_Ach) as tm7,SUM(M8_Ach) as tm8,SUM(M9_Ach) as tm9,SUM(M10_Ach) as tm10,SUM(M11_Ach) as tm11,SUM(M12_Ach) as tm12';
 $Lbl_1=$y2T; $Lbl_2=$y2; $Vv='A';
 $fy=date("Y",strtotime($resY2['FromDate'])); $ty=date("Y",strtotime($resY2['ToDate'])); 
 
}
elseif($i==2)
{ 
 $yset=$_REQUEST['yi']; $subquery='SUM(M1) as tm1,SUM(M2) as tm2,SUM(M3) as tm3,SUM(M4) as tm4,SUM(M5) as tm5,SUM(M6) as tm6,SUM(M7) as tm7,SUM(M8) as tm8,SUM(M9) as tm9,SUM(M10) as tm10,SUM(M11) as tm11,SUM(M12) as tm12'; 
 $Lbl_1=$y3T; $Lbl_2=$y3; $Vv='B';
 $fy=date("Y",strtotime($resY3['FromDate'])); $ty=date("Y",strtotime($resY3['ToDate']));
} 
elseif($i==3)
{ 
 $yset=$_REQUEST['yi']; $subquery='SUM(M1_Ach) as tm1,SUM(M2_Ach) as tm2,SUM(M3_Ach) as tm3,SUM(M4_Ach) as tm4,SUM(M5_Ach) as tm5,SUM(M6_Ach) as tm6,SUM(M7_Ach) as tm7,SUM(M8_Ach) as tm8,SUM(M9_Ach) as tm9,SUM(M10_Ach) as tm10,SUM(M11_Ach) as tm11,SUM(M12_Ach) as tm12'; 
 $Lbl_1=$y2T; $Lbl_2=$y3; $Vv='C';
 $fy=date("Y",strtotime($resY3['FromDate'])); $ty=date("Y",strtotime($resY3['ToDate']));
} 

/**************************************************************************************/
if($_REQUEST['ii']>0){ $qin="sp.ItemId=".$_REQUEST['ii']; }
else{ if($_REQUEST['crp']==1 OR $_REQUEST['crp']==2){ $qin="si.GroupId=".$_REQUEST['crp']; }else{ $qin='1=1'; } }

if($_REQUEST['SteWise']>0 AND $_REQUEST['SteName']>0)
{ 
 $sqlPd=mysql_query("select ".$subquery." from hrm_sales_sal_details_".$yset." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_headquater hq ON ".$Hqj." where hq.StateId=".$_REQUEST['SteName']." AND sd.ProductId=".$res['ProductId']." AND d.DealerSts='A' AND sp.ProductSts='A' AND sd.YearId=".$yset, $con); 
}
elseif($_REQUEST['NameWise']>0)
{ 
 if($_REQUEST['SelName']>0)
 {
 $sqlPd=mysql_query("select ".$subquery." from hrm_sales_sal_details_".$yset." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_sales_reporting_level rl ON ".$Rlj." where DealerSts='A' AND (".$TerrCon."=".$_REQUEST['SelName']." OR rl.R1=".$_REQUEST['SelName']." OR rl.R2=".$_REQUEST['SelName']." OR rl.R3=".$_REQUEST['SelName']." OR rl.R4=".$_REQUEST['SelName']." OR rl.R5=".$_REQUEST['SelName'].") AND sp.ProductSts='A' AND sd.ProductId=".$res['ProductId']." AND sd.YearId=".$yset, $con); 
 }
 if($_REQUEST['SelName']=='All')
 {
  $sqlPd=mysql_query("select ".$subquery." from hrm_sales_sal_details_".$yset." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_sales_reporting_level rl ON ".$Rlj." where DealerSts='A' AND (".$TerrCon."=".$_REQUEST['EmpId']." OR rl.R1=".$_REQUEST['EmpId']." OR rl.R2=".$_REQUEST['EmpId']." OR rl.R3=".$_REQUEST['EmpId']." OR rl.R4=".$_REQUEST['EmpId']." OR rl.R5=".$_REQUEST['EmpId'].") AND sp.ProductSts='A' AND sd.ProductId=".$res['ProductId']." AND sd.YearId=".$yset, $con);
 }
}
elseif($_REQUEST['HqWise']>0)
{ 
 if($_REQUEST['SelHq']>0)
 {
 $sqlPd=mysql_query("select ".$subquery." from hrm_sales_sal_details_".$yset." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId where sd.YearId=".$yset." AND sd.ProductId=".$res['ProductId']." AND sp.ProductSts='A' AND d.DealerSts='A' AND ".$HqCon."=".$_REQUEST['SelHq']."", $con); 
 }
 if($_REQUEST['SelHq']=='All')
 {
  $sqlPd=mysql_query("select ".$subquery." from hrm_sales_sal_details_".$yset." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId INNER JOIN hrm_sales_dealer d ON sd.DealerId=d.DealerId INNER JOIN hrm_employee_general g ON ".$Gnj." where DealerSts='A' AND (".$TerrCon."=".$_REQUEST['EmpId']." OR g.RepEmployeeID=".$_REQUEST['EmpId'].") AND sd.ProductId=".$res['ProductId']." AND sp.ProductSts='A' AND sd.YearId=".$yset, $con);
 }
}
elseif($_REQUEST['DisWise']>0)
{ $sqlPd=mysql_query("select ".$subquery." from hrm_sales_sal_details_".$yset." sd INNER JOIN hrm_sales_seedsproduct sp ON sd.ProductId=sp.ProductId where sd.YearId=".$yset." AND sp.ProductSts='A' AND sd.ProductId=".$res['ProductId']." AND sd.DealerId=".$_REQUEST['SelDis'], $con); }
/**************************************************************************************/

$rs=mysql_fetch_assoc($sqlPd);
$rsTot=$rs['tm1']+$rs['tm2']+$rs['tm3']+$rs['tm4']+$rs['tm5']+$rs['tm6']+$rs['tm7']+$rs['tm8']+$rs['tm9']+$rs['tm10']+$rs['tm11']+$rs['tm12']; 
$rsTot1=$rs['tm1']+$rs['tm2']+$rs['tm3']; $rsTot2=$rs['tm4']+$rs['tm5']+$rs['tm6'];
$rsTot3=$rs['tm7']+$rs['tm8']+$rs['tm9']; $rsTot4=$rs['tm10']+$rs['tm11']+$rs['tm12']; ?>
<?php 
include("Nrv.php");
$Net4=$rs['tm1']*$Nrv4;   $Net5=$rs['tm2']*$Nrv5;  $Net6=$rs['tm3']*$Nrv6;   $Net7=$rs['tm4']*$Nrv7; 
$Net8=$rs['tm5']*$Nrv8;   $Net9=$rs['tm6']*$Nrv9;  $Net10=$rs['tm7']*$Nrv10; $Net11=$rs['tm8']*$Nrv11; 
$Net12=$rs['tm9']*$Nrv12; $Net1=$rs['tm10']*$Nrv1; $Net2=$rs['tm11']*$Nrv2;  $Net3=$rs['tm12']*$Nrv3;

$NetNRV1=$Net4+$Net5+$Net6; $LakhNRV1=$NetNRV1/100000;
$NetNRV2=$Net7+$Net8+$Net9; $LakhNRV2=$NetNRV2/100000;
$NetNRV3=$Net10+$Net11+$Net12; $LakhNRV3=$NetNRV3/100000;
$NetNRV4=$Net1+$Net2+$Net3; $LakhNRV4=$NetNRV4/100000;

$NetNRV=$Net4+$Net5+$Net6+$Net7+$Net8+$Net9+$Net10+$Net11+$Net12+$Net1+$Net2+$Net3; 
$LakhNRV=$NetNRV/100000;

if($rs['tm1']!=0){$mAch1=$rs['tm1'];}else{$mAch1='';}
if($rs['tm2']!=0){$mAch2=$rs['tm2'];}else{$mAch2='';}
if($rs['tm3']!=0){$mAch3=$rs['tm3'];}else{$mAch3='';}
if($rs['tm4']!=0){$mAch4=$rs['tm4'];}else{$mAch4='';}
if($rs['tm5']!=0){$mAch5=$rs['tm5'];}else{$mAch5='';}
if($rs['tm6']!=0){$mAch6=$rs['tm6'];}else{$mAch6='';}
if($rs['tm7']!=0){$mAch7=$rs['tm7'];}else{$mAch7='';}
if($rs['tm8']!=0){$mAch8=$rs['tm8'];}else{$mAch8='';}
if($rs['tm9']!=0){$mAch9=$rs['tm9'];}else{$mAch9='';}
if($rs['tm10']!=0){$mAch10=$rs['tm10'];}else{$mAch10='';}
if($rs['tm11']!=0){$mAch11=$rs['tm11'];}else{$mAch11='';}
if($rs['tm12']!=0){$mAch12=$rs['tm12'];}else{$mAch12='';}

if($rsTot1!=0){$Q51=$rsTot1;}else{$Q51='';}
if($rsTot2!=0){$Q52=$rsTot2;}else{$Q52='';}
if($rsTot3!=0){$Q53=$rsTot3;}else{$Q53='';}
if($rsTot4!=0){$Q54=$rsTot4;}else{$Q54='';}

if($LakhNRV1!=0){$tot1Lakh=$LakhNRV1;}else{$tot1Lakh='';}
if($LakhNRV2!=0){$tot2Lakh=$LakhNRV2;}else{$tot2Lakh='';}
if($LakhNRV3!=0){$tot3Lakh=$LakhNRV3;}else{$tot3Lakh='';}
if($LakhNRV4!=0){$tot4Lakh=$LakhNRV4;}else{$tot4Lakh='';}

if($rsTot!=0){$totKg=$rsTot;}else{$totKg='';}
if($LakhNRV!=0){$totLakh=$LakhNRV;}else{$totLakh='';}



$csv_output .= '"'.str_replace('"', '""', $Lbl_1).'",';
$csv_output .= '"'.str_replace('"', '""', $Lbl_2).'",';
$csv_output .= '"'.str_replace('"', '""', $mAch1).'",';
$csv_output .= '"'.str_replace('"', '""', $mAch2).'",';
$csv_output .= '"'.str_replace('"', '""', $mAch3).'",';
$csv_output .= '"'.str_replace('"', '""', $Q51).'",';
$csv_output .= '"'.str_replace('"', '""', $tot1Lakh).'",';
$csv_output .= '"'.str_replace('"', '""', $mAch4).'",';
$csv_output .= '"'.str_replace('"', '""', $mAch5).'",';
$csv_output .= '"'.str_replace('"', '""', $mAch6).'",';
$csv_output .= '"'.str_replace('"', '""', $Q52).'",';	
$csv_output .= '"'.str_replace('"', '""', $tot2Lakh).'",';
$csv_output .= '"'.str_replace('"', '""', $mAch7).'",';
$csv_output .= '"'.str_replace('"', '""', $mAch8).'",';
$csv_output .= '"'.str_replace('"', '""', $mAch9).'",';
$csv_output .= '"'.str_replace('"', '""', $Q53).'",';
$csv_output .= '"'.str_replace('"', '""', $tot3Lakh).'",';
$csv_output .= '"'.str_replace('"', '""', $mAch10).'",';
$csv_output .= '"'.str_replace('"', '""', $mAch11).'",';
$csv_output .= '"'.str_replace('"', '""', $mAch12).'",';
$csv_output .= '"'.str_replace('"', '""', $Q54).'",';
$csv_output .= '"'.str_replace('"', '""', $tot4Lakh).'",';
$csv_output .= '"'.str_replace('"', '""', $totKg).'",';
$csv_output .= '"'.str_replace('"', '""', $totLakh).'",';

$csv_output .= "\n"; 
}

$Sn++; }

# Close the MySql connection
mysql_close($con);
# Set the headers so the file downloads
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Content-Length: " . strlen($csv_output));
header("Content-type: text/x-csv");
header("Content-Disposition:attachment;filename=".$NVV.".csv");


echo $csv_output;
exit;

?>