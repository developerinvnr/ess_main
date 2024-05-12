<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');}
include("../function.php");
include('codeEncDec.php');
if(check_user()==false){header('Location:../../../index.php');}
if($_SESSION['login'] = true){require_once('UserMenuSession.php');}
//**********************************************************************************************************************
if(isset($_POST['SaveRunY']))
{ $sqlUpy=mysql_query("update hrm_sales_year set Company1='D'", $con); 
  if($sqlUpy)
  {
   $sqlUpy2=mysql_query("update hrm_sales_year set Company1='A' where YearId=".$_POST['RunYear'], $con);
   if($sqlUpy2){$msgY='Running year update successfully...!!!';}
  }
  
}

if(isset($_POST['SaveNrv']))
{
 if ($_FILES['AttNrv_csv_file']['error'] > 0) {
  echo "Error: " . $_FILES['Nrv_csv_file']['error'] . "<br />"; 
 }else{  
  if (($handle = fopen($_FILES['Nrv_csv_file']['tmp_name'], "r"))!== FALSE) {
   $ctr = 1; // used to exclude the CSV header
   while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) { 
   $c0 = mysql_real_escape_string($data[0]); $c1 = mysql_real_escape_string($data[1]); $c2 = mysql_real_escape_string($data[2]); $c3 = mysql_real_escape_string($data[3]);
   $c4 = mysql_real_escape_string($data[4]); $c5 = mysql_real_escape_string($data[5]); $c6 = mysql_real_escape_string($data[6]); $c7 = mysql_real_escape_string($data[7]);    
    if ($ctr > 1 AND $c0!='S' AND $c0!='B' AND $c7!='') 
	{ 
	   //$sql=mysql_query("Select ProductId from hrm_sales_product_nrv WHERE ProductId=".$c3." AND PStatus='A'", $con); 
       //$rows = mysql_num_rows($sql); 
	   //if($rows>0){ $sqlUp = mysql_query("UPDATE hrm_sales_product_nrv SET NRV='".$c7."',YearId=3,Fdate='2014-04-01' WHERE ProductId=".$c3, $con); }
	   //elseif($rows==0){$sqlUp = mysql_query("insert into hrm_sales_product_nrv(ProductId,NRV,YearId,Fdate) values(".$c3.",'".$c7."',3,'2014-04-01')", $con);}
	}
    else { $ctr++; }
   }
   fclose($handle);
   if($sql){ $MsgImp= 'Product NRV reports details uploaded successfully...';}
  }
 }
}


if(isset($_POST['SaveAchQQ']))
{
 if ($_FILES['AchQ_csv_file']['error'] > 0) {
  echo "Error: " . $_FILES['AchQ_csv_file']['error'] . "<br />"; 
 }else{  
  if (($handle = fopen($_FILES['AchQ_csv_file']['tmp_name'], "r"))!== FALSE) {
   $ctr = 1; // used to exclude the CSV header
   while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) { 
   $c0 = mysql_real_escape_string($data[0]); $c1 = mysql_real_escape_string($data[1]); $c2 = mysql_real_escape_string($data[2]); $c3 = mysql_real_escape_string($data[3]);
   $c4 = mysql_real_escape_string($data[4]); $c5 = mysql_real_escape_string($data[5]); $c6 = mysql_real_escape_string($data[6]); $c7 = mysql_real_escape_string($data[7]); 
   if($c3=='' OR $c3=='#N/A'){$c3_c=0;}else{$c3_c=$c3;} if($c4=='' OR $c4=='#N/A'){$c4_c=0;}else{$c4_c=$c4;} if($c5=='' OR $c5=='#N/A'){$c5_c=0;}else{$c5_c=$c5;} 
   if ($ctr>2 AND $c0!='S' AND $c0!='B' AND $c0!='' AND $c0>0) 
	{ 
	 $sqlIP=mysql_query("Select ProductId,ItemId from hrm_sales_seedsproduct WHERE ProductName='".$c2."'", $con); $rowIP=mysql_num_rows($sqlIP);
	 if($rowIP>0)
	 { $resIP=mysql_fetch_assoc($sqlIP);    
	   $sqlChk=mysql_query("Select * from hrm_sales_sal_details WHERE DealerId=".$c0." AND ProductId=".$resIP['ProductId']." AND YearId=".$_POST['yAchQ'], $con); 
       $rowsChk = mysql_num_rows($sqlChk); 
	   //if($rowsChk>0){ $sqlUp = mysql_query("UPDATE hrm_sales_sal_details SET M1_Ach='".$c3_c."',M2_Ach='".$c4_c."',M3_Ach='".$c5_c."' WHERE DealerId=".$c0." AND ProductId=".$resIP['ProductId']." AND YearId=".$_POST['yAchQ'], $con); }
	   //elseif($rowsChk==0){ $sqlUp = mysql_query("insert into hrm_sales_sal_details(DealerId, ItemId, ProductId, YearId, M1_Ach, M2_Ach, M3_Ach) values(".$c0.", ".$resIP['ItemId'].", ".$resIP['ProductId'].", ".$_POST['yAchQ'].", ".$c3_c.", ".$c4_c.", ".$c5_c.")", $con);}
	  } 
	}
    //else { $ctr++; }
	$ctr++;
   }
   fclose($handle);
   if($sqlUp){ $MsgImpAchQ= 'Product Quarter sales reports details uploaded successfully...';}
  }
 }
}


if(isset($_POST['SaveAch']))
{
 if ($_FILES['Ach_csv_file']['error'] > 0) {
  echo "Error: " . $_FILES['Ach_csv_file']['error'] . "<br />"; 
 }else{  
  if (($handle = fopen($_FILES['Ach_csv_file']['tmp_name'], "r"))!== FALSE) {
   $ctr = 1; // used to exclude the CSV header
   while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) { 
$c1 = mysql_real_escape_string($data[1]); $c3 = mysql_real_escape_string($data[3]);
$c6 = mysql_real_escape_string($data[6]); $c9 = mysql_real_escape_string($data[9]); $c12 = mysql_real_escape_string($data[12]); $c15 = mysql_real_escape_string($data[15]);
$c18 = mysql_real_escape_string($data[18]); $c21 = mysql_real_escape_string($data[21]); $c24 = mysql_real_escape_string($data[24]); $c27 = mysql_real_escape_string($data[27]);
$c30 = mysql_real_escape_string($data[30]); $c33 = mysql_real_escape_string($data[33]); $c36 = mysql_real_escape_string($data[36]); $c39 = mysql_real_escape_string($data[39]);  
if($c6=='' OR $c6=='#N/A'){$c6_c=0;}else{$c6_c=$c6;} if($c9=='' OR $c9=='#N/A'){$c9_c=0;}else{$c9_c=$c9;} if($c12=='' OR $c12=='#N/A'){$c12_c=0;}else{$c12_c=$c12;} 
if($c15=='' OR $c15=='#N/A'){$c15_c=0;}else{$c15_c=$c15;} if($c18=='' OR $c18=='#N/A'){$c18_c=0;}else{$c18_c=$c18;} if($c21=='' OR $c21=='#N/A'){$c21_c=0;}else{$c21_c=$c21;} 
if($c24=='' OR $c24=='#N/A'){$c24_c=0;}else{$c24_c=$c24;} if($c27=='' OR $c27=='#N/A'){$c27_c=0;}else{$c27_c=$c27;} if($c30=='' OR $c30=='#N/A'){$c30_c=0;}else{$c30_c=$c30;} 
if($c33=='' OR $c33=='#N/A'){$c33_c=0;}else{$c33_c=$c33;} if($c36=='' OR $c36=='#N/A'){$c36_c=0;}else{$c36_c=$c36;} if($c39=='' OR $c39=='#N/A'){$c39_c=0;}else{$c39_c=$c39;}
 
   if($ctr > 1 AND $c1>0 AND $c3>0 AND ($c6_c>0 OR $c9_c>0 OR $c12_c>0 OR $c15_c>0 OR $c18_c>0 OR $c21_c>0 OR $c24_c>0 OR $c27_c>0 OR $c30_c>0 OR $c33_c>0 OR $c36_c>0 OR $c39_c>0))
	{ 
	   $sql=mysql_query("Select TerId from hrm_sales_sal_details WHERE DealerId=".$_POST['Dealer']." AND ItemId=".$c1." AND ProductId=".$c3." AND YearId=".$_POST['YearV'], $con); 
       $rows = mysql_num_rows($sql); 
	   if($rows>0){ $sqlUp = mysql_query("UPDATE hrm_sales_sal_details SET M1_Ach='".$c6_c."',M2_Ach='".$c9_c."',M3_Ach='".$c12_c."',M4_Ach='".$c15_c."',M5_Ach='".$c18_c."',M6_Ach='".$c21_c."',M7_Ach='".$c24_c."',M8_Ach='".$c27_c."',M9_Ach='".$c30_c."',M10_Ach='".$c33_c."',M11_Ach='".$c36_c."',M12_Ach='".$c39_c."' WHERE DealerId=".$_POST['Dealer']." AND ItemId=".$c1." AND ProductId=".$c3." AND YearId=".$_POST['YearV'], $con); }
	   elseif($rows==0){ $sqlUp = mysql_query("insert into hrm_sales_sal_details(EmployeeID, TerId, L1, L2, L3, L4, L5, StateId, HqId, DealerId, ItemId, ProductId, YearId, M1_Ach, M2_Ach, M3_Ach, M4_Ach, M5_Ach, M6_Ach, M7_Ach, M8_Ach, M9_Ach, M10_Ach, M11_Ach, M12_Ach) values(".$_POST['EId'].", ".$_POST['TId'].", ".$_POST['L1'].", ".$_POST['L2'].", ".$_POST['L3'].", ".$_POST['L4'].", ".$_POST['L5'].", ".$_POST['SId'].", ".$_POST['HqId'].", ".$_POST['Dealer'].", ".$c1.", ".$c3.", ".$_POST['YearV'].", ".$c6_c.", ".$c9_c.", ".$c12_c.", ".$c15_c.", ".$c18_c.", ".$c21_c.", ".$c24_c.", ".$c27_c.", ".$c30_c.", ".$c33_c.", ".$c36_c.", ".$c39_c.")", $con);}
	}
    else { $ctr++; }
   }
   fclose($handle);
   if($sql){ $MsgImp= '<font color="#008000">Product achievement details uploaded successfully.</font>';}
  }
 }
}

if(isset($_POST['SaveTgt']))
{
 if ($_FILES['Tgt_csv_file']['error'] > 0) {
  echo "Error: " . $_FILES['Tgt_csv_file']['error'] . "<br />"; 
 }else{  
  if (($handle = fopen($_FILES['Tgt_csv_file']['tmp_name'], "r"))!== FALSE) {
   $ctr = 1; // used to exclude the CSV header
   while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) { 
$c1 = mysql_real_escape_string($data[1]); $c3 = mysql_real_escape_string($data[3]); 
$c7 = mysql_real_escape_string($data[7]); $c10 = mysql_real_escape_string($data[10]); $c13 = mysql_real_escape_string($data[13]); $c16 = mysql_real_escape_string($data[16]); 
$c19 = mysql_real_escape_string($data[19]); $c22 = mysql_real_escape_string($data[22]); $c25 = mysql_real_escape_string($data[25]); $c28 = mysql_real_escape_string($data[28]); 
$c31 = mysql_real_escape_string($data[31]); $c34 = mysql_real_escape_string($data[34]); $c37 = mysql_real_escape_string($data[37]); $c40 = mysql_real_escape_string($data[40]); 
if($c7=='' OR $c7=='#N/A'){$c7_c=0;}else{$c7_c=$c7;} if($c10=='' OR $c10=='#N/A'){$c10_c=0;}else{$c10_c=$c10;} if($c13=='' OR $c13=='#N/A'){$c13_c=0;}else{$c13_c=$c13;} 
if($c16=='' OR $c16=='#N/A'){$c16_c=0;}else{$c16_c=$c16;} if($c19=='' OR $c19=='#N/A'){$c19_c=0;}else{$c19_c=$c19;} if($c22=='' OR $c22=='#N/A'){$c22_c=0;}else{$c22_c=$c22;} 
if($c25=='' OR $c25=='#N/A'){$c25_c=0;}else{$c25_c=$c25;} if($c28=='' OR $c28=='#N/A'){$c28_c=0;}else{$c28_c=$c28;} if($c31=='' OR $c31=='#N/A'){$c31_c=0;}else{$c31_c=$c31;} 
if($c34=='' OR $c34=='#N/A'){$c34_c=0;}else{$c34_c=$c34;} if($c37=='' OR $c37=='#N/A'){$c37_c=0;}else{$c37_c=$c37;} if($c40=='' OR $c40=='#N/A'){$c40_c=0;}else{$c40_c=$c40;}
  
  if($ctr > 1 AND $c1>0 AND $c3>0 AND ($c7_c>0 OR $c10_c>0 OR $c13_c>0 OR $c16_c>0 OR $c19_c>0 OR $c22_c>0 OR $c25_c>0 OR $c28_c>0 OR $c31_c>0 OR $c34_c>0 OR $c37_c>0 OR $c40_c>0))
  { 
	$sql=mysql_query("Select TerId from hrm_sales_sal_details WHERE DealerId=".$_POST['Dealer2']." AND ItemId=".$c1." AND ProductId=".$c3." AND YearId=".$_POST['YearV2'], $con); 
    $rows = mysql_num_rows($sql); 
	   if($rows>0){ $sqlUp = mysql_query("UPDATE hrm_sales_sal_details SET M1='".$c7_c."',M2='".$c10_c."',M3='".$c13_c."',M4='".$c16_c."',M5='".$c19_c."',M6='".$c22_c."',M7='".$c25_c."',M8='".$c28_c."',M9='".$c31_c."',M10='".$c34_c."',M11='".$c37_c."',M12='".$c40_c."' WHERE DealerId=".$_POST['Dealer2']." AND ItemId=".$c1." AND ProductId=".$c3." AND YearId=".$_POST['YearV2'], $con); }
	   elseif($rows==0){$sqlUp = mysql_query("insert into hrm_sales_sal_details(EmployeeID, TerId, L1, L2, L3, L4, L5, StateId, HqId, DealerId, ItemId, ProductId, YearId, M1, M2, M3, M4, M5, M6, M7, M8, M9, M10, M11, M12) values(".$_POST['EId'].", ".$_POST['TId'].", ".$_POST['L1'].", ".$_POST['L2'].", ".$_POST['L3'].", ".$_POST['L4'].", ".$_POST['L5'].", ".$_POST['SId'].", ".$_POST['HqId'].", ".$_POST['Dealer2'].", ".$c1.", ".$c3.", ".$_POST['YearV2'].", ".$c7_c.", ".$c10_c.", ".$c13_c.", ".$c16_c.", ".$c19_c.", ".$c22_c.", ".$c25_c.", ".$c28_c.", ".$c31_c.", ".$c34_c.", ".$c37_c.", ".$c40_c.")", $con);}
	}
    else { $ctr++; }
   }
   fclose($handle);
   if($sql){ $MsgImp= '<font color="#008000">Product target details uploaded successfully...</font>';}
  }
 }
}


if(isset($_POST['SaveAchTgt']))
{
 if ($_FILES['AchTgt_csv_file']['error'] > 0) {
  echo "Error: " . $_FILES['AchTgt_csv_file']['error'] . "<br />"; 
 }else{  
  if (($handle = fopen($_FILES['AchTgt_csv_file']['tmp_name'], "r"))!== FALSE) {
   $ctr = 1; // used to exclude the CSV header
   while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) { 
$c0 = mysql_real_escape_string($data[0]); $c1 = mysql_real_escape_string($data[1]); $c2 = mysql_real_escape_string($data[2]); $c3 = mysql_real_escape_string($data[3]);
$c4 = mysql_real_escape_string($data[4]); $c5 = mysql_real_escape_string($data[5]); $c6 = mysql_real_escape_string($data[6]); $c7 = mysql_real_escape_string($data[7]);    
$c8 = mysql_real_escape_string($data[8]); $c9 = mysql_real_escape_string($data[9]); $c10 = mysql_real_escape_string($data[10]); $c11 = mysql_real_escape_string($data[11]);
$c12 = mysql_real_escape_string($data[12]); $c13 = mysql_real_escape_string($data[13]); $c14 = mysql_real_escape_string($data[14]); $c15 = mysql_real_escape_string($data[15]);
$c16 = mysql_real_escape_string($data[16]); $c17 = mysql_real_escape_string($data[17]); $c18 = mysql_real_escape_string($data[18]); $c19 = mysql_real_escape_string($data[19]);
$c20 = mysql_real_escape_string($data[20]); $c21 = mysql_real_escape_string($data[21]); $c22 = mysql_real_escape_string($data[22]); $c23 = mysql_real_escape_string($data[23]);    
$c24 = mysql_real_escape_string($data[24]); $c25 = mysql_real_escape_string($data[25]); $c26 = mysql_real_escape_string($data[26]); $c27 = mysql_real_escape_string($data[27]);
$c28 = mysql_real_escape_string($data[28]); $c29 = mysql_real_escape_string($data[29]); $c30 = mysql_real_escape_string($data[30]); $c31 = mysql_real_escape_string($data[31]);    
$c32 = mysql_real_escape_string($data[32]); $c33 = mysql_real_escape_string($data[33]); $c34 = mysql_real_escape_string($data[34]); $c35 = mysql_real_escape_string($data[35]);
$c36 = mysql_real_escape_string($data[36]); $c37 = mysql_real_escape_string($data[37]); $c38 = mysql_real_escape_string($data[38]); $c39 = mysql_real_escape_string($data[39]);  
$c40 = mysql_real_escape_string($data[40]); $c41 = mysql_real_escape_string($data[41]); $c42 = mysql_real_escape_string($data[42]); $c43 = mysql_real_escape_string($data[43]);
$c44 = mysql_real_escape_string($data[44]); $c45 = mysql_real_escape_string($data[45]); $c46 = mysql_real_escape_string($data[46]); $c47 = mysql_real_escape_string($data[47]);
$c48 = mysql_real_escape_string($data[48]); $c49 = mysql_real_escape_string($data[49]); $c50 = mysql_real_escape_string($data[50]); $c51 = mysql_real_escape_string($data[51]);
$c52 = mysql_real_escape_string($data[52]); $c53 = mysql_real_escape_string($data[53]); $c54 = mysql_real_escape_string($data[54]); $c55 = mysql_real_escape_string($data[55]);

  //Achiment-1 (7 11 15 19 23 27 31 35 39 43 47 51) 
  if($ctr>5 AND $c2!='')
  { 
    $sqlIP=mysql_query("Select ProductId,ItemId from hrm_sales_seedsproduct WHERE ProductName='".$c2."'", $con); $rowIP=mysql_num_rows($sqlIP);
    if($rowIP==1)
    { $resIP=mysql_fetch_assoc($sqlIP);
	
	  if($c7>0 OR $c7<0 OR $c11>0 OR $c11<0 OR $c15>0 OR $c15<0 OR $c19>0 OR $c19<0 OR $c23>0 OR $c23<0 OR $c27>0 OR $c27<0 OR $c31>0 OR $c31<0 OR $c35>0 OR $c35<0 OR $c39>0 OR $c39<0 OR $c43>0 OR $c43<0 OR $c47>0 OR $c47<0 OR $c51>0 OR $c51<0)
	  { 
  if($c7=='' OR $c7=='#N/A'){$cc7=0;}else{$cc7=$c7;}      if($c11=='' OR $c11=='#N/A'){$cc11=0;}else{$cc11=$c11;} if($c15=='' OR $c15=='#N/A'){$cc15=0;}else{$cc15=$c15;} 
  if($c19=='' OR $c19=='#N/A'){$cc19=0;}else{$cc19=$c19;} if($c23=='' OR $c23=='#N/A'){$cc23=0;}else{$cc23=$c23;} if($c27=='' OR $c27=='#N/A'){$cc27=0;}else{$cc27=$c27;} 
  if($c31=='' OR $c31=='#N/A'){$cc31=0;}else{$cc31=$c31;} if($c35=='' OR $c35=='#N/A'){$cc35=0;}else{$cc35=$c35;} if($c39=='' OR $c39=='#N/A'){$cc39=0;}else{$cc39=$c39;} 
  if($c43=='' OR $c43=='#N/A'){$cc43=0;}else{$cc43=$c43;} if($c47=='' OR $c47=='#N/A'){$cc47=0;}else{$cc47=$c47;} if($c51=='' OR $c51=='#N/A'){$cc51=0;}else{$cc51=$c51;}
      $sql=mysql_query("Select TerId from hrm_sales_sal_details WHERE DealerId=".$_POST['Dealer3']." AND ItemId=".$resIP['ItemId']." AND ProductId=".$resIP['ProductId']." AND YearId=".$_POST['Befor2Y'], $con); $rows = mysql_num_rows($sql); 
	  if($rows>0){ $sqlUp = mysql_query("UPDATE hrm_sales_sal_details SET M1_Ach='".$cc7."',M2_Ach='".$cc11."',M3_Ach='".$cc15."',M4_Ach='".$cc19."',M5_Ach='".$cc23."',M6_Ach='".$cc27."',M7_Ach='".$cc31."',M8_Ach='".$cc35."',M9_Ach='".$cc39."',M10_Ach='".$cc43."',M11_Ach='".$cc47."',M12_Ach='".$cc51."' WHERE DealerId=".$_POST['Dealer3']." AND ItemId=".$resIP['ItemId']." AND ProductId=".$resIP['ProductId']." AND YearId=".$_POST['Befor2Y'], $con); }
	  elseif($rows==0){ $sqlUp = mysql_query("insert into hrm_sales_sal_details(EmployeeID, TerId, L1, L2, L3, L4, L5, StateId, HqId, DealerId, ItemId, ProductId, YearId, M1_Ach, M2_Ach, M3_Ach, M4_Ach, M5_Ach, M6_Ach, M7_Ach, M8_Ach, M9_Ach, M10_Ach, M11_Ach, M12_Ach) values(".$_POST['EId'].", ".$_POST['TId'].", ".$_POST['L1'].", ".$_POST['L2'].", ".$_POST['L3'].", ".$_POST['L4'].", ".$_POST['L5'].", ".$_POST['SId'].", ".$_POST['HqId'].", ".$_POST['Dealer3'].", ".$resIP['ItemId'].", ".$resIP['ProductId'].", ".$_POST['Befor2Y'].", ".$cc7.", ".$cc11.", ".$cc15.", ".$cc19.", ".$cc23.", ".$cc27.", ".$cc31.", ".$cc35.", ".$cc39.", ".$cc43.", ".$cc47.", ".$cc51.")", $con); }
	  }
	  //Achiment-2 (8 12 16 20 24 28 32 36 40 44 48 52) 
	  if($c8>0 OR $c8<0 OR $c12>0 OR $c12<0 OR $c16>0 OR $c16<0 OR $c20>0 OR $c20<0 OR $c24>0 OR $c24<0 OR $c28>0 OR $c28<0 OR $c32>0 OR $c32<0 OR $c36>0 OR $c36<0 OR $c40>0 OR $c40<0 OR $c44>0 OR $c44<0 OR $c48>0 OR $c48<0 OR $c52>0 OR $c52<0)
	  {
  if($c8=='' OR $c8=='#N/A'){$cc8=0;}else{$cc8=$c8;}      if($c12=='' OR $c12=='#N/A'){$cc12=0;}else{$cc12=$c12;} if($c16=='' OR $c16=='#N/A'){$cc16=0;}else{$cc16=$c16;} 
  if($c20=='' OR $c20=='#N/A'){$cc20=0;}else{$cc20=$c20;} if($c24=='' OR $c24=='#N/A'){$cc24=0;}else{$cc24=$c24;} if($c28=='' OR $c28=='#N/A'){$cc28=0;}else{$cc28=$c28;} 
  if($c32=='' OR $c32=='#N/A'){$cc32=0;}else{$cc32=$c32;} if($c36=='' OR $c36=='#N/A'){$cc36=0;}else{$cc36=$c36;} if($c40=='' OR $c40=='#N/A'){$cc40=0;}else{$cc40=$c40;} 
  if($c44=='' OR $c44=='#N/A'){$cc44=0;}else{$cc44=$c44;} if($c48=='' OR $c48=='#N/A'){$cc48=0;}else{$cc48=$c48;} if($c52=='' OR $c52=='#N/A'){$cc52=0;}else{$cc52=$c52;} 
	  $sql=mysql_query("Select TerId from hrm_sales_sal_details WHERE DealerId=".$_POST['Dealer3']." AND ItemId=".$resIP['ItemId']." AND ProductId=".$resIP['ProductId']." AND YearId=".$_POST['Befor1Y'], $con); $rows = mysql_num_rows($sql); 
	  if($rows>0){ $sqlUp = mysql_query("UPDATE hrm_sales_sal_details SET M1_Ach='".$cc8."',M2_Ach='".$cc12."',M3_Ach='".$cc16."',M4_Ach='".$cc20."',M5_Ach='".$cc24."',M6_Ach='".$cc28."',M7_Ach='".$cc32."',M8_Ach='".$cc36."',M9_Ach='".$cc40."',M10_Ach='".$cc44."',M11_Ach='".$cc48."',M12_Ach='".$cc52."' WHERE DealerId=".$_POST['Dealer3']." AND ItemId=".$resIP['ItemId']." AND ProductId=".$resIP['ProductId']." AND YearId=".$_POST['Befor1Y'], $con); }
	  elseif($rows==0){ $sqlUp = mysql_query("insert into hrm_sales_sal_details(EmployeeID, TerId, L1, L2, L3, L4, L5, StateId, HqId, DealerId, ItemId, ProductId, YearId, M1_Ach, M2_Ach, M3_Ach, M4_Ach, M5_Ach, M6_Ach, M7_Ach, M8_Ach, M9_Ach, M10_Ach, M11_Ach, M12_Ach) values(".$_POST['EId'].", ".$_POST['TId'].", ".$_POST['L1'].", ".$_POST['L2'].", ".$_POST['L3'].", ".$_POST['L4'].", ".$_POST['L5'].", ".$_POST['SId'].", ".$_POST['HqId'].", ".$_POST['Dealer3'].", ".$resIP['ItemId'].", ".$resIP['ProductId'].", ".$_POST['Befor1Y'].", ".$cc8.", ".$cc12.", ".$cc16.", ".$cc20.", ".$cc24.", ".$cc28.", ".$cc32.", ".$cc36.", ".$cc40.", ".$cc44.", ".$cc48.", ".$cc52.")", $con); }
	  }
	  //Target-3 (9 13 17 21 25 29 33 37 41 45 49 53)
	  if($c9>0 OR $c9<0 OR $c13>0 OR $c13<0 OR $c17>0 OR $c17<0 OR $c21>0 OR $c21<0 OR $c25>0 OR $c25<0 OR $c29>0 OR $c29<0 OR $c33>0 OR $c33<0 OR $c37>0 OR $c37<0 OR $c41>0 OR $c41<0 OR $c45>0 OR $c45<0 OR $c49>0 OR $c49<0 OR $c53>0 OR $c53<0)
	  {
  if($c9=='' OR $c9=='#N/A'){$cc9=0;}else{$cc9=$c9;}      if($c13=='' OR $c13=='#N/A'){$cc13=0;}else{$cc13=$c13;} if($c17=='' OR $c17=='#N/A'){$cc17=0;}else{$cc17=$c17;} 
  if($c21=='' OR $c21=='#N/A'){$cc21=0;}else{$cc21=$c21;} if($c25=='' OR $c25=='#N/A'){$cc25=0;}else{$cc25=$c25;} if($c29=='' OR $c29=='#N/A'){$cc29=0;}else{$cc29=$c29;} 
  if($c33=='' OR $c33=='#N/A'){$cc33=0;}else{$cc33=$c33;} if($c37=='' OR $c37=='#N/A'){$cc37=0;}else{$cc37=$c37;} if($c41=='' OR $c41=='#N/A'){$cc41=0;}else{$cc41=$c41;} 
  if($c45=='' OR $c45=='#N/A'){$cc45=0;}else{$cc45=$c45;} if($c49=='' OR $c49=='#N/A'){$cc49=0;}else{$cc49=$c49;} if($c53=='' OR $c53=='#N/A'){$cc53=0;}else{$cc53=$c53;} 
	  $sql=mysql_query("Select TerId from hrm_sales_sal_details WHERE DealerId=".$_POST['Dealer3']." AND ItemId=".$resIP['ItemId']." AND ProductId=".$resIP['ProductId']." AND YearId=".$_POST['YearV3'], $con); $rows = mysql_num_rows($sql); 
	  if($rows>0){ $sqlUp = mysql_query("UPDATE hrm_sales_sal_details SET M1='".$cc9."',M2='".$cc13."',M3='".$cc17."',M4='".$cc21."',M5='".$cc25."',M6='".$cc29."',M7='".$cc33."',M8='".$cc37."',M9='".$cc41."',M10='".$cc45."',M11='".$cc49."',M12='".$cc53."' WHERE DealerId=".$_POST['Dealer3']." AND ItemId=".$resIP['ItemId']." AND ProductId=".$resIP['ProductId']." AND YearId=".$_POST['YearV3'], $con); }
	  elseif($rows==0){ $sqlUp = mysql_query("insert into hrm_sales_sal_details(EmployeeID, TerId, L1, L2, L3, L4, L5, StateId, HqId, DealerId, ItemId, ProductId, YearId, M1, M2, M3, M4, M5, M6, M7, M8, M9, M10, M11, M12) values(".$_POST['EId'].", ".$_POST['TId'].", ".$_POST['L1'].", ".$_POST['L2'].", ".$_POST['L3'].", ".$_POST['L4'].", ".$_POST['L5'].", ".$_POST['SId'].", ".$_POST['HqId'].", ".$_POST['Dealer3'].", ".$resIP['ItemId'].", ".$resIP['ProductId'].", ".$_POST['YearV3'].", ".$cc9.", ".$cc13.", ".$cc17.", ".$cc21.", ".$cc25.", ".$cc29.", ".$cc33.", ".$cc37.", ".$cc41.", ".$cc45.", ".$cc49.", ".$cc53.")", $con); }
	  }
	  //Projection-4 (10 14 18 22 26 30 34 38 42 46 50 54)
	  if($c10>0 OR $c10<0 OR $c14>0 OR $c14<0 OR $c18>0 OR $c18<0 OR $c22>0 OR $c22<0 OR $c26>0 OR $c26<0 OR $c30>0 OR $c30<0 OR $c34>0 OR $c34<0 OR $c38>0 OR $c38<0 OR $c42>0 OR $c42<0 OR $c46>0 OR $c46<0 OR $c50>0 OR $c50<0 OR $c54>0 OR $c54<0)
	  {
  if($c10=='' OR $c10=='#N/A'){$cc10=0;}else{$cc10=$c10;} if($c14=='' OR $c14=='#N/A'){$cc14=0;}else{$cc14=$c14;} if($c18=='' OR $c18=='#N/A'){$cc18=0;}else{$cc18=$c18;} 
  if($c22=='' OR $c22=='#N/A'){$cc22=0;}else{$cc22=$c22;} if($c26=='' OR $c26=='#N/A'){$cc26=0;}else{$cc26=$c26;} if($c30=='' OR $c30=='#N/A'){$cc30=0;}else{$cc30=$c30;} 
  if($c34=='' OR $c34=='#N/A'){$cc34=0;}else{$cc34=$c34;} if($c38=='' OR $c38=='#N/A'){$cc38=0;}else{$cc38=$c38;} if($c42=='' OR $c42=='#N/A'){$cc42=0;}else{$cc42=$c42;} 
  if($c46=='' OR $c46=='#N/A'){$cc46=0;}else{$cc46=$c46;} if($c50=='' OR $c50=='#N/A'){$cc50=0;}else{$cc50=$c50;} if($c54=='' OR $c54=='#N/A'){$cc54=0;}else{$cc54=$c54;} 
	  $sql=mysql_query("Select TerId from hrm_sales_sal_details WHERE DealerId=".$_POST['Dealer3']." AND ItemId=".$resIP['ItemId']." AND ProductId=".$resIP['ProductId']." AND YearId=".$_POST['NextY'], $con); $rows = mysql_num_rows($sql); 
	  if($rows>0){ $sqlUp = mysql_query("UPDATE hrm_sales_sal_details SET M1='".$cc10."',M2='".$cc14."',M3='".$cc18."',M4='".$cc22."',M5='".$cc26."',M6='".$cc30."',M7='".$cc34."',M8='".$cc38."',M9='".$cc42."',M10='".$cc46."',M11='".$cc50."',M12='".$cc54."' WHERE DealerId=".$_POST['Dealer3']." AND ItemId=".$resIP['ItemId']." AND ProductId=".$resIP['ProductId']." AND YearId=".$_POST['NextY'], $con); }
	  elseif($rows==0){ $sqlUp = mysql_query("insert into hrm_sales_sal_details(EmployeeID, TerId, L1, L2, L3, L4, L5, StateId, HqId, DealerId, ItemId, ProductId, YearId, M1, M2, M3, M4, M5, M6, M7, M8, M9, M10, M11, M12) values(".$_POST['EId'].", ".$_POST['TId'].", ".$_POST['L1'].", ".$_POST['L2'].", ".$_POST['L3'].", ".$_POST['L4'].", ".$_POST['L5'].", ".$_POST['SId'].", ".$_POST['HqId'].", ".$_POST['Dealer3'].", ".$resIP['ItemId'].", ".$resIP['ProductId'].", ".$_POST['NextY'].", ".$cc10.", ".$cc14.", ".$cc18.", ".$cc22.", ".$cc26.", ".$cc30.", ".$cc34.", ".$cc38.", ".$cc42.", ".$cc46.", ".$cc50.", ".$cc54.")", $con); }
	  }
	  
     }
  }
   
  //else { $ctr++; }
  $ctr++;
 }
 fclose($handle);
 if($sql){ $MsgImp= '<font color="#008000">Product achivement target details uploaded successfully...</font>';}
 }
 }
}


/* #N/A $_POST['Befor2Y'] $_POST['Befor1Y']  $_POST['YearV3'] $_POST['NextY'] 

if($c7=='' OR $c7=='#N/A'){$c7_c=0;}else{$c7_c=$c7;} if($c11=='' OR $c11=='#N/A'){$c11_c=0;}else{$c11_c=$c11;} if($c15=='' OR $c15=='#N/A'){$c15_c=0;}else{$c15_c=$c15;} 
if($c19=='' OR $c19=='#N/A'){$c19_c=0;}else{$c19_c=$c19;} if($c23=='' OR $c23=='#N/A'){$c23_c=0;}else{$c23_c=$c23;} if($c27=='' OR $c27=='#N/A'){$c27_c=0;}else{$c27_c=$c27;} 
if($c31=='' OR $c31=='#N/A'){$c231_c=0;}else{$c31_c=$c31;} if($c35=='' OR $c35=='#N/A'){$c35_c=0;}else{$c35_c=$c35;} if($c39=='' OR $c39=='#N/A'){$c39_c=0;}else{$c39_c=$c39;} 
if($c43=='' OR $c43=='#N/A'){$c43_c=0;}else{$c43_c=$c43;} if($c47=='' OR $c47=='#N/A'){$c47_c=0;}else{$c47_c=$c47;} if($c51=='' OR $c51=='#N/A'){$c51_c=0;}else{$c51_c=$c51;} 

*/

?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<Script type="text/javascript">window.history.forward(1);</Script>
<style> .font { color:#ffffff; font-family:Times New Roman; font-size:15px; width:200px;} .font1 { font-family:Times New Roman; font-size:12px; height:14px; width:200px; } 
.font2 { font-size:12px;width:260px;height:18px;} .font4 { color:#1FAD34; font-family:Georgia; font-size:15px;}
.span {display:none; font-family:Courier New; font-size:14px; }.span1 {display:block; font-family:Courier New; font-size:14px; }
.SaveButton {background-image:url(images/save.gif); width:20px; height:20px; background-repeat:no-repeat; background-color:#FFFFFF; border-color:#FFFFFF; border-bottom:inherit;}
.EditSelect { font-family:Georgia; font-size:12px; height:18px;}
.EditInput { font-family:Georgia; font-size:12px; height:22px;}
.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}
</style>
<Script> 
function ChangrYear(YearV) 
{
  var ci=document.getElementById("ci").value; var y2=document.getElementById("YearV2").value; var y3=document.getElementById("YearV3").value;
  var c=document.getElementById("c").value; var yAchQ=document.getElementById("yAchQ").value;
  var s=document.getElementById("s").value; var hq=document.getElementById("hq").value; var dil=document.getElementById("dil").value;
  var grp=document.getElementById("grp").value; var q=document.getElementById("q").value; var ii=document.getElementById("ii").value;
  window.location="SetPlan.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y="+YearV+"&ci="+ci+"&c="+c+"&s="+s+"&hq="+hq+"&dil="+dil+"&grp="+grp+"&q="+q+"&ii="+ii+"&y2="+y2+"&y3="+y3+"&yAchQ="+yAchQ;
}

function ChangrYearAchQ(yAchQ)
{
  var ci=document.getElementById("ci").value; var y2=document.getElementById("YearV2").value; var y3=document.getElementById("YearV3").value;
  var c=document.getElementById("c").value; var y=document.getElementById("YearV").value;
  var s=document.getElementById("s").value; var hq=document.getElementById("hq").value; var dil=document.getElementById("dil").value;
  var grp=document.getElementById("grp").value; var q=document.getElementById("q").value; var ii=document.getElementById("ii").value;
  window.location="SetPlan.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y="+y+"&ci="+ci+"&c="+c+"&s="+s+"&hq="+hq+"&dil="+dil+"&grp="+grp+"&q="+q+"&ii="+ii+"&y2="+y2+"&y3="+y3+"&yAchQ="+yAchQ;
}

function ClickCoutry(value)
{ var url = 'SlctSalesImportFile.php';	var pars = 'CouId='+value;	var myAjax = new Ajax.Request(
  url, { method: 'post', parameters: pars, onComplete: show_State });
}
function show_State(originalRequest)
{ document.getElementById('StateSpan').innerHTML = originalRequest.responseText; 
  document.getElementById("Ach_csv_file").disabled=true; document.getElementById("AchId").disabled=true;
}

function ClickState(value)
{ var url = 'SlctSalesImportFile.php';	var pars = 'StaId='+value;	var myAjax = new Ajax.Request(
  url, { method: 'post', parameters: pars, onComplete: show_Hq });
}
function show_Hq(originalRequest)
{ document.getElementById('HqSpan').innerHTML = originalRequest.responseText; 
  document.getElementById("Ach_csv_file").disabled=true; document.getElementById("AchId").disabled=true;
}

function ClickHq(value)
{ var url = 'SlctSalesImportFile.php';	var pars = 'HqId='+value;	var myAjax = new Ajax.Request(
  url, { method: 'post', parameters: pars, onComplete: show_Dealer });
}
function show_Dealer(originalRequest)
{ document.getElementById('DealSpan').innerHTML = originalRequest.responseText; 
  document.getElementById("Ach_csv_file").disabled=true; document.getElementById("AchId").disabled=true;
}

function ClickDealer(value)
{ var url = 'SlctSalesImportFile.php';	var pars = 'DealerId='+value;	var myAjax = new Ajax.Request(
  url, { method: 'post', parameters: pars, onComplete: show_Details });
}
function show_Details(originalRequest)
{ document.getElementById('CompliteSpan').innerHTML = originalRequest.responseText; var CheckV=document.getElementById("CheckV").value; 
  if(CheckV==1){document.getElementById("Ach_csv_file").disabled=false; document.getElementById("AchId").disabled=false; }
  else{document.getElementById("Ach_csv_file").disabled=true; document.getElementById("AchId").disabled=true;}
}

/*    2nd    */
function ChangrYear2(YearV)
{
  var ci=document.getElementById("ci").value; var y=document.getElementById("YearV").value; var y3=document.getElementById("YearV3").value;
  var c=document.getElementById("c").value; var yAchQ=document.getElementById("yAchQ").value;
  var s=document.getElementById("s").value; var hq=document.getElementById("hq").value; var dil=document.getElementById("dil").value;
  var grp=document.getElementById("grp").value; var q=document.getElementById("q").value; var ii=document.getElementById("ii").value;
  window.location="SetPlan.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y="+y+"&ci="+ci+"&c="+c+"&s="+s+"&hq="+hq+"&dil="+dil+"&grp="+grp+"&q="+q+"&ii="+ii+"&y2="+YearV+"&y3="+y3+"&yAchQ="+yAchQ;
}

function ClickCoutry2(value)
{ var url = 'SlctSalesImportFile.php';	var pars = 'CouId2='+value;	var myAjax = new Ajax.Request(
  url, { method: 'post', parameters: pars, onComplete: show_State2 });
}
function show_State2(originalRequest)
{ document.getElementById('StateSpan2').innerHTML = originalRequest.responseText; 
  document.getElementById("Tgt_csv_file").disabled=true; document.getElementById("TgtId").disabled=true;
}

function ClickState2(value)
{ var url = 'SlctSalesImportFile.php';	var pars = 'StaId2='+value;	var myAjax = new Ajax.Request(
  url, { method: 'post', parameters: pars, onComplete: show_Hq2 });
}
function show_Hq2(originalRequest)
{ document.getElementById('HqSpan2').innerHTML = originalRequest.responseText; 
  document.getElementById("Tgt_csv_file").disabled=true; document.getElementById("TgtId").disabled=true;
}

function ClickHq2(value)
{ var url = 'SlctSalesImportFile.php';	var pars = 'HqId2='+value;	var myAjax = new Ajax.Request(
  url, { method: 'post', parameters: pars, onComplete: show_Dealer2 });
}
function show_Dealer2(originalRequest)
{ document.getElementById('DealSpan2').innerHTML = originalRequest.responseText; 
  document.getElementById("Tgt_csv_file").disabled=true; document.getElementById("TgtId").disabled=true;
}

function ClickDealer2(value)
{ var url = 'SlctSalesImportFile.php';	var pars = 'DealerId2='+value; var myAjax = new Ajax.Request(
  url, { method: 'post', parameters: pars, onComplete: show_Details2 } ); 
}
function show_Details2(originalRequest)
{ document.getElementById('CompliteSpan2').innerHTML = originalRequest.responseText; var CheckV=document.getElementById("CheckV").value; 
  if(CheckV==1){document.getElementById("Tgt_csv_file").disabled=false; document.getElementById("TgtId").disabled=false; }
  else{ document.getElementById("Tgt_csv_file").disabled=true; document.getElementById("TgtId").disabled=true;}
}

/*    3rd  */
function ChangrYear3(YearV)
{
  var ci=document.getElementById("ci").value; var y=document.getElementById("YearV").value; var y2=document.getElementById("YearV2").value;
  var c=document.getElementById("c").value; var yAchQ=document.getElementById("yAchQ").value;
  var s=document.getElementById("s").value; var hq=document.getElementById("hq").value; var dil=document.getElementById("dil").value;
  var grp=document.getElementById("grp").value; var q=document.getElementById("q").value; var ii=document.getElementById("ii").value;
  window.location="SetPlan.php?ern1=r114&ern2w=234&ern3y=10234&ern=4e2&erne=4e&ernw=234&erney=110022344&ernretd=ee&rernr=09drfGe&ernS=eewwqq&y="+y+"&ci="+ci+"&c="+c+"&s="+s+"&hq="+hq+"&dil="+dil+"&grp="+grp+"&q="+q+"&ii="+ii+"&y2="+y2+"&y3="+YearV+"&yAchQ="+yAchQ;
}

function ClickCoutry3(value)
{ var url = 'SlctSalesImportFile.php';	var pars = 'CouId3='+value;	var myAjax = new Ajax.Request(
  url, { method: 'post', parameters: pars, onComplete: show_State3 });
}
function show_State3(originalRequest)
{ document.getElementById('StateSpan3').innerHTML = originalRequest.responseText; 
  document.getElementById("AchTgt_csv_file").disabled=true; document.getElementById("AchTgtId").disabled=true;
}

function ClickState3(value)
{ var url = 'SlctSalesImportFile.php';	var pars = 'StaId3='+value;	var myAjax = new Ajax.Request(
  url, { method: 'post', parameters: pars, onComplete: show_Hq3 });
}
function show_Hq3(originalRequest)
{ document.getElementById('HqSpan3').innerHTML = originalRequest.responseText; 
  document.getElementById("AchTgt_csv_file").disabled=true; document.getElementById("AchTgtId").disabled=true;
}

function ClickHq3(value)
{ var url = 'SlctSalesImportFile.php';	var pars = 'HqId3='+value;	var myAjax = new Ajax.Request(
  url, { method: 'post', parameters: pars, onComplete: show_Dealer3 });
}
function show_Dealer3(originalRequest)
{ document.getElementById('DealSpan3').innerHTML = originalRequest.responseText; 
  document.getElementById("AchTgt_csv_file").disabled=true; document.getElementById("AchTgtId").disabled=true;
}

function ClickDealer3(value)
{ var url = 'SlctSalesImportFile.php';	var pars = 'DealerId3='+value; var myAjax = new Ajax.Request(
  url, { method: 'post', parameters: pars, onComplete: show_Details3 } ); 
}
function show_Details3(originalRequest)
{ document.getElementById('CompliteSpan3').innerHTML = originalRequest.responseText; var CheckV=document.getElementById("CheckV").value; 
  if(CheckV==1){document.getElementById("AchTgt_csv_file").disabled=false; document.getElementById("AchTgtId").disabled=false; }
  else{ document.getElementById("AchTgt_csv_file").disabled=true; document.getElementById("AchTgtId").disabled=true;}
}


//function FunNrvTxls()
//{ window.open("FormateFile.php?act=NrvFileOpen","MyFile","width=200,height=200");}

function FunAchQTxls()
{ window.open("FormateFile.php?act=AchQQFileOpen","MyFile","width=200,height=200");}

function FunTxls()
{ window.open("FormateFile.php?act=AchFileOpen","MyFile","width=200,height=200");}

function FunAchTgtTxls()
{ window.open("FormateFile.php?act=AchTrgtFileOpen","MyFile","width=200,height=200");}

  

</Script> 
</head>
<body class="body">
<?php 
echo '<input type="hidden" id="ci" value="'.$_REQUEST['ci'].'" />'; echo '<input type="hidden" id="c" value="'.$_REQUEST['c'].'" />';
echo '<input type="hidden" id="s" value="'.$_REQUEST['s'].'" />'; echo '<input type="hidden" id="hq" value="'.$_REQUEST['hq'].'" />';
echo '<input type="hidden" id="dil" value="'.$_REQUEST['dil'].'" />'; echo '<input type="hidden" id="grp" value="'.$_REQUEST['grp'].'" />';
echo '<input type="hidden" id="q" value="'.$_REQUEST['q'].'" />'; echo '<input type="hidden" id="ii" value="'.$_REQUEST['ii'].'" />';
?>
<table class="table">
<tr><td><table class="menutable"><tr><td><?php if($_SESSION['login'] = true){ require_once("EMenu.php"); } ?></td></tr></table></td></tr>
<tr>
 <td valign="top">
  <table width="100%" style="margin-top:0px;" border="0">
   <tr><td valign="top"><?php if($_SESSION['login'] = true){ require_once("EWelcome.php"); } ?></td></tr>
   <tr>
	<td valign="top" align="center" width="100%" id="MainWindow"><br>	  
    <table border="0" style="margin-top:0px;width:100%; height:300px;">
    <tr>
    <td width="10">&nbsp;</td>  
    <td align="left" id="type" valign="top" style="display:block; width:50%">             
     <table border="0" width="350">
	 <tr><td class="heading">&nbsp;Setting Plan:</td></tr>
	 <tr>
	 <td align="left" width="1200">
	 <table width="1200" border="0">
<script language="javascript" type="text/javascript">
function FunEdit()
{  var agree=confirm("Are you sure you want to edit running year?");
   if (agree){ document.getElementById("SaveRunY").style.display='block'; document.getElementById("editRunY").style.display='none';
               document.getElementById("RunYear").disabled=false; }
   else{return false;}		   
}
</script>	 
	 <tr>
	  <td style="width:200px;"><font color="#FFFFFF" style='font-family:Times New Roman;' size="3"><b>(A)&nbsp;Running Year</b></font></td>
	  <td style="width:1000px;">
	   <table border="0" style="background-color:#F9D568;">
	    <tr>
	     <form name="FormNrv" method="post" onSubmit="return validate(this)">
	     <td style="width:110px;color:#FFD5FF;"><select type="text" name="RunYear" id="RunYear" style="width:110px;" disabled="disabled">
<?php $sqlye=mysql_query("select YearId,FromDate,ToDate from hrm_sales_year where Company1='A'", $con); $resye=mysql_fetch_assoc($sqlye); 
      $FFromDate=date("Y",strtotime($resye['FromDate'])); $TToDate=date("Y",strtotime($resye['ToDate'])); ?>
		 <option value="<?php echo $resye['YearId']; ?>" selected>&nbsp;<?php echo $FFromDate.'-'.$TToDate; ?></option>
<?php $sqlYear=mysql_query("select YearId,FromDate,ToDate from hrm_sales_year where Company1!='A' AND YearId>=".$YearId." order by FromDate ASC ", $con); while($resYear=mysql_fetch_assoc($sqlYear)){ 
      $FFrom2Date=date("Y",strtotime($resYear['FromDate'])); $TTo2Date=date("Y",strtotime($resYear['ToDate'])); ?>
         <option value="<?php echo $resYear['YearId']; ?>">&nbsp;<?php echo $FFrom2Date.'-'.$TTo2Date; ?></option>
<?php } ?>		 
		 </select></td>
		 <td style="width:75px;">
		   <input type="button" id="editRunY" value="edit" onClick="FunEdit()"/>
		   <input style="display:none;" type="submit" id="SaveRunY" name="SaveRunY" value="save"/></td>
	     </form>  
	     <td style="font-family:Times New Roman;font-size:14px;color:#008000;width:350px;"><b><?php echo $msgY; ?></b></td>
		</tr>
	   </table>
	  </td>
	</tr>
	</table>
	</td>
	</tr>   
<?php /******************************** Sales Product NRV Open *********************************************/ ?>		 <tr><td>&nbsp;</td></tr>
	 <tr><td class="heading">&nbsp;Import Xls/Csv File:</td></tr>
	 <tr>
	 <td align="left" width="1200">
	 <table width="1200" border="0">
	 <tr>
	  <td style="width:200px;"><font color="#FFFFFF" style='font-family:Times New Roman;' size="3"><b>(A)&nbsp;Product NRV</b></font></td>
	  <td style="width:1000px;">
	   <table border="0" style="background-color:#F9D568;">
	    <tr>
	     <form name="FormNrv" method="POST" enctype="multipart/form-data">
	     <td style="width:285px;color:#FFD5FF;"><input type="file" name="Nrv_csv_file" id="Nrv_csv_file" style="width:200px;" size="30"/></td>
		 <td style="width:75px;"><input type="submit" name="SaveNrv" value="Upload" id="NrvId"/></td>
	     </form>  
	     <td style="font-family:Times New Roman;font-size:14px;color:#008000;;width:350px;"><b><?php echo $MsgImp; ?></b></td>
		 <td style="width:80px;font-size:12px;" align="right"><b><a href="#" onClick="FunNrvTxls('xls')">Formate</a></b>&nbsp;</td>
		</tr>
	   </table>
	  </td>
	</tr>   
<?php /******************************** Sales Achivement Open *********************************************/ ?>	
	<tr><td></td></tr>
	<tr><td colspan="2" style="width:200px;" valign="top"><font color="#FFFFFF" style='font-family:Times New Roman;' size="3">&nbsp;NOTE: Check hrm_sales_hq_temp(Complite OR Not)</font></td></tr>
    <tr>
	  <td style="width:200px;" valign="top"><font color="#FFFFFF" style='font-family:Times New Roman;' size="3"><b>(B)&nbsp;Sales Ach(Quarter)</b>&nbsp;</font></td>
	 <td style="width:1000px;">
	   <table border="0" style="background-color:#F9D568;">
	    <tr>
	     <form name="FormAchQ" method="POST" enctype="multipart/form-data">
		 <td style="font-size:12px;width:40px;" align="right"><b>Year:</b>&nbsp;</td>
	     <td style="width:90px;">
		 <select style="font-size:12px;width:90px;height:20px;background-color:#DDFFBB;" name="yAchQ" id="yAchQ" onChange="ChangrYearAchQ(this.value)"> 
<?php $sqly=mysql_query("select FromDate,ToDate from hrm_year where YearId=".$_REQUEST['yAchQ'], $con); $resy=mysql_fetch_assoc($sqly); 
      $fromdate=date("Y",strtotime($resy['FromDate'])); $todate=date("Y",strtotime($resy['ToDate'])); $NextYear=$_REQUEST['y']+1; $PrevYear=$_REQUEST['y']-1; 
	  $sqly2=mysql_query("select FromDate,ToDate from hrm_year where YearId=".$NextYear, $con); $resy2=mysql_fetch_assoc($sqly2);
	  $sqly3=mysql_query("select FromDate,ToDate from hrm_year where YearId=".$PrevYear, $con); $resy3=mysql_fetch_assoc($sqly3); ?>		
         <option value="<?php echo $_REQUEST['y']; ?>" selected><?php echo $fromdate.'-'.$todate; ?></option>
<?php if($PrevYear>=1){?><option value="<?php echo $PrevYear; ?>"><?php echo date("Y",strtotime($resy3['FromDate'])).'-'.date("Y",strtotime($resy3['ToDate'])); ?></option><?php } ?><option value="<?php echo $NextYear; ?>"><?php echo date("Y",strtotime($resy2['FromDate'])).'-'.date("Y",strtotime($resy2['ToDate'])); ?></option></select>
         </td>
	     <td style="width:285px;color:#FFD5FF;"><input type="file" name="AchQ_csv_file" id="AchQ_csv_file" style="width:200px;" size="30"/></td>
		 <td style="width:75px;"><input type="submit" name="SaveAchQQ" value="Upload" id="AchQId"/></td>
	     </form>  
	     <td style="font-family:Times New Roman;font-size:14px;color:#008000;;width:350px;"><b><?php echo $MsgImpAchQ; ?></b></td>
		 <td style="width:80px;font-size:12px;" align="right"><b><a href="#" onClick="FunAchQTxls('xls')">Formate</a></b>&nbsp;</td>
		</tr>
	   </table>
	  </td>
	</tr>
	<tr><td></td></tr>
    <tr>
	  <td style="width:200px;" valign="top"><font color="#FFFFFF" style='font-family:Times New Roman;' size="3"><b>(C)&nbsp;Sales Ach(OverAll)</b></font></td>
	  <td style="width:1000px;" valign="top">
	   <form name="FormNrv" method="POST" enctype="multipart/form-data">
	   <table border="0" style="background-color:#F9D568;">
	    <tr>
	     <td style="font-size:12px;width:40px;" align="right"><b>Year:</b>&nbsp;</td>
	     <td style="width:90px;">
		 <select style="font-size:12px;width:90px;height:20px;background-color:#DDFFBB;" name="YearV" id="YearV" onChange="ChangrYear(this.value)"> 
<?php $sqly=mysql_query("select FromDate,ToDate from hrm_year where YearId=".$_REQUEST['y'], $con); $resy=mysql_fetch_assoc($sqly); 
      $fromdate=date("Y",strtotime($resy['FromDate'])); $todate=date("Y",strtotime($resy['ToDate'])); $NextYear=$_REQUEST['y']+1; $PrevYear=$_REQUEST['y']-1; 
	  $sqly2=mysql_query("select FromDate,ToDate from hrm_year where YearId=".$NextYear, $con); $resy2=mysql_fetch_assoc($sqly2);
	  $sqly3=mysql_query("select FromDate,ToDate from hrm_year where YearId=".$PrevYear, $con); $resy3=mysql_fetch_assoc($sqly3); ?>		
         <option value="<?php echo $_REQUEST['y']; ?>" selected><?php echo $fromdate.'-'.$todate; ?></option>
<?php if($PrevYear>=1){?><option value="<?php echo $PrevYear; ?>"><?php echo date("Y",strtotime($resy3['FromDate'])).'-'.date("Y",strtotime($resy3['ToDate'])); ?></option><?php } ?><option value="<?php echo $NextYear; ?>"><?php echo date("Y",strtotime($resy2['FromDate'])).'-'.date("Y",strtotime($resy2['ToDate'])); ?></option></select>
        </td>
	    <td style="font-size:12px;width:83px;" align="right"><b>Country:</b>&nbsp;</td>
	    <td style="width:142px;">
		<select style="font-size:12px;width:141px;height:20px;background-color:#DDFFBB;" name="Coutry" id="Coutry" onChange="ClickCoutry(this.value)"> 
	    <option value="">Select Country</option>
<?php $SqlCountry=mysql_query("SELECT * FROM hrm_country order by CountryName ASC", $con); while($ResCountry=mysql_fetch_array($SqlCountry)) { ?>
<option value="<?php echo $ResCountry['CountryId']; ?>"><?php echo ucwords(strtolower($ResCountry['CountryName'])); ?></option><?php } ?></select>
        </td>
	   <td style="font-size:12px;width:70px;" align="right"><b>State:</b>&nbsp;</td>
	    <td>
	    <span id="StateSpan">
	    <select style="font-size:12px;width:180px;height:20px;background-color:#DDFFBB;" name="State" id="State" onChange="ClickState(this.value)">
	    <option value="" selected>Select State</option>	
	    <?php $sql = mysql_query("SELECT * FROM hrm_state order by StateName ASC", $con); while($res = mysql_fetch_array($sql)){ ?>
	    <option value="<?php echo $res['StateId']; ?>"><?php echo ucwords(strtolower($res['StateName'])); ?></option><?php } ?></select>
	    </span>
	    </td>
		<td style="font-size:12px;width:50px;" align="right"><b>Hq:</b>&nbsp;</td>
        <td>
		<span id="HqSpan">
		<select style="font-size:12px;width:180px;height:20px;background-color:#DDFFBB;" name="Hq" id="Hq" onChange="ClickHq(this.value)">
        <option value="" selected>Select HQ</option>
<?php $sql = mysql_query("SELECT * FROM hrm_headquater where CompanyId=".$CompanyId." AND HQStatus='A' order by HqName ASC", $con); while($res = mysql_fetch_array($sql)){ ?>
        <option value="<?php echo $res['HqId']; ?>"><?php echo ucwords(strtolower($res['HqName'])); ?></option><?php } ?></select>
		</span>
		</td>	
		<td style="width:80px;font-size:12px;" align="right"><b><a href="#" onClick="FunTxls('xls')">Formate</a></b>&nbsp;</td>
		</tr>
		<tr>
	     <td colspan="4">
		  <table>
		   <tr>
		    <td style="font-size:12px;width:45px;" align="right"><b>Dealer:</b>&nbsp;</td>
			<td>
			<span id="DealSpan">
			<select style="font-size:12px;width:310px;height:20px;background-color:#DDFFBB;" name="Dealer" id="Dealer" onChange="ClickDealer(this.value)">
            <option value="" selected>Select Dealer Name</option>
<?php $sqlDeal = mysql_query("SELECT * FROM hrm_sales_dealer order by DealerName ASC", $con); while($resDeal = mysql_fetch_array($sqlDeal)){ ?>
            <option value="<?php echo $resDeal['DealerId']; ?>"><?php echo ucwords(strtolower($resDeal['DealerName'])); ?></option><?php } ?></select>
			</span>
			</td>
		   </tr>
		  </table>
		 </td>
	     <td colspan="4">
		  <table>
		   <tr>
		    <td style="font-size:12px;width:67px;" align="right"><b>File:</b>&nbsp;</td>
			<td style="width:285px;color:#FFD5FF;"><input type="file" name="Ach_csv_file" id="Ach_csv_file" style="width:200px;" size="30" disabled="disabled"/></td>
		    <td style="width:75px;"><input type="submit" name="SaveAch" value="Upload" id="AchId" disabled="disabled"/></td>
		   </tr>
		  <tr><td colspan="8"><span id="CompliteSpan"></span></td></tr>
		  </table> 
		 </td>
		</tr>
	   </table>
	   </form>  
	  </td>
	</tr>
<?php /******************************** Sales Target Open*********************************************/ ?>	
	<tr><td></td></tr>
    <tr>
	  <td style="width:200px;" valign="top"><font color="#FFFFFF" style='font-family:Times New Roman;' size="3"><b>(D)&nbsp;Sales Target</b></font></td>
	  <td style="width:1000px;" valign="top">
	   <form name="FormNrv" method="POST" enctype="multipart/form-data">
	   <table border="0" style="background-color:#F9D568;">
	    <tr>
	     <td style="font-size:12px;width:40px;" align="right"><b>Year:</b>&nbsp;</td>
	     <td style="width:90px;">
		 <select style="font-size:12px;width:90px;height:20px;background-color:#DDFFBB;" name="YearV2" id="YearV2" onChange="ChangrYear2(this.value)"> 
<?php $sqly=mysql_query("select FromDate,ToDate from hrm_year where YearId=".$_REQUEST['y2'], $con); $resy=mysql_fetch_assoc($sqly); 
      $fromdate=date("Y",strtotime($resy['FromDate'])); $todate=date("Y",strtotime($resy['ToDate'])); $NextYear=$_REQUEST['y2']+1; $PrevYear=$_REQUEST['y2']-1; 
	  $sqly2=mysql_query("select FromDate,ToDate from hrm_year where YearId=".$NextYear, $con); $resy2=mysql_fetch_assoc($sqly2);
	  $sqly3=mysql_query("select FromDate,ToDate from hrm_year where YearId=".$PrevYear, $con); $resy3=mysql_fetch_assoc($sqly3); ?>		
         <option value="<?php echo $_REQUEST['y2']; ?>" selected><?php echo $fromdate.'-'.$todate; ?></option>
<?php if($PrevYear>=1){?><option value="<?php echo $PrevYear; ?>"><?php echo date("Y",strtotime($resy3['FromDate'])).'-'.date("Y",strtotime($resy3['ToDate'])); ?></option><?php } ?><option value="<?php echo $NextYear; ?>"><?php echo date("Y",strtotime($resy2['FromDate'])).'-'.date("Y",strtotime($resy2['ToDate'])); ?></option></select>
        </td>
	    <td style="font-size:12px;width:83px;" align="right"><b>Country:</b>&nbsp;</td>
	    <td style="width:142px;">
		<select style="font-size:12px;width:141px;height:20px;background-color:#DDFFBB;" name="Coutry2" id="Coutry2" onChange="ClickCoutry2(this.value)"> 
	    <option value="">Select Country</option>
<?php $SqlCountry=mysql_query("SELECT * FROM hrm_country order by CountryName ASC", $con); while($ResCountry=mysql_fetch_array($SqlCountry)) { ?>
<option value="<?php echo $ResCountry['CountryId']; ?>"><?php echo ucwords(strtolower($ResCountry['CountryName'])); ?></option><?php } ?></select>
        </td>
	   <td style="font-size:12px;width:70px;" align="right"><b>State:</b>&nbsp;</td>
	    <td>
	    <span id="StateSpan2">
	    <select style="font-size:12px;width:180px;height:20px;background-color:#DDFFBB;" name="State2" id="State2" onChange="ClickState2(this.value)">
	    <option value="" selected>Select State</option>	
	    <?php $sql = mysql_query("SELECT * FROM hrm_state order by StateName ASC", $con); while($res = mysql_fetch_array($sql)){ ?>
	    <option value="<?php echo $res['StateId']; ?>"><?php echo ucwords(strtolower($res['StateName'])); ?></option><?php } ?></select>
	    </span>
	    </td>
		<td style="font-size:12px;width:50px;" align="right"><b>Hq:</b>&nbsp;</td>
        <td>
		<span id="HqSpan2">
		<select style="font-size:12px;width:180px;height:20px;background-color:#DDFFBB;" name="Hq2" id="Hq2" onChange="ClickHq2(this.value)">
        <option value="" selected>Select HQ</option>
<?php $sql = mysql_query("SELECT * FROM hrm_headquater where CompanyId=".$CompanyId." AND HQStatus='A' order by HqName ASC", $con); while($res = mysql_fetch_array($sql)){ ?>
        <option value="<?php echo $res['HqId']; ?>"><?php echo ucwords(strtolower($res['HqName'])); ?></option><?php } ?></select>
		</span>
		</td>
		<td style="width:80px;font-size:12px;" align="right"><b><a href="#" onClick="FunTxls('xls')">Formate</a></b>&nbsp;</td>
		</tr>
		<tr>
	     <td colspan="4">
		  <table>
		   <tr>
		    <td style="font-size:12px;width:45px;" align="right"><b>Dealer:</b>&nbsp;</td>
			<td>
			<span id="DealSpan2">
			<select style="font-size:12px;width:310px;height:20px;background-color:#DDFFBB;" name="Dealer2" id="Dealer2" onChange="ClickDealer2(this.value)">
            <option value="" selected>Selct Dealer Name</option>
<?php $sqlDeal = mysql_query("SELECT * FROM hrm_sales_dealer order by DealerName ASC", $con); while($resDeal = mysql_fetch_array($sqlDeal)){ ?>
            <option value="<?php echo $resDeal['DealerId']; ?>"><?php echo ucwords(strtolower($resDeal['DealerName'])); ?></option><?php } ?></select>
			</span>
			</td>
		   </tr>
		  </table>
		 </td>
	     <td colspan="4">
		  <table>
		   <tr>
		    <td style="font-size:12px;width:67px;" align="right"><b>File:</b>&nbsp;</td>
			<td style="width:285px;color:#FFD5FF;"><input type="file" name="Tgt_csv_file" id="Tgt_csv_file" style="width:200px;" size="30" disabled="disabled"/></td>
		    <td style="width:75px;"><input type="submit" name="SaveTgt" value="Upload" id="TgtId" disabled="disabled"/></td>
		   </tr>
		  <tr><td colspan="8"><span id="CompliteSpan2"></span></td></tr>
		  </table> 
		 </td>
		</tr>
	   </table>
	   </form>  
	  </td>
	</tr>	
<?php /******************************** Sales Achivement/Target Open*********************************************/ ?>	
	<tr><td></td></tr>
    <tr>
	  <td style="width:200px;" valign="top"><font color="#FFFFFF" style='font-family:Times New Roman;' size="3"><b>(E)&nbsp;Sales Ach-Target</b></font></td>
	  <td style="width:1000px;" valign="top">
	   <form name="FormNrv" method="POST" enctype="multipart/form-data">
	   <table border="0" style="background-color:#F9D568;">
	    <tr>
	     <td style="font-size:12px;width:40px;" align="right"><b>Year:</b>&nbsp;</td>
	     <td style="width:90px;">
<?php $sqly=mysql_query("select FromDate,ToDate from hrm_year where YearId=".$_REQUEST['y3'], $con); $resy=mysql_fetch_assoc($sqly); 
      $fromdate=date("Y",strtotime($resy['FromDate'])); $todate=date("Y",strtotime($resy['ToDate']));  
	  $NextYear=$_REQUEST['y3']+1; $PrevYear=$_REQUEST['y3']-1; $Prev2Year=$_REQUEST['y3']-2;
	  $sqly2=mysql_query("select FromDate,ToDate from hrm_year where YearId=".$NextYear, $con); $resy2=mysql_fetch_assoc($sqly2);
	  $sqly3=mysql_query("select FromDate,ToDate from hrm_year where YearId=".$PrevYear, $con); $resy3=mysql_fetch_assoc($sqly3); ?>
	  <input type="hidden" name="Befor2Y" value="<?php echo $Prev2Year; ?>" />
	  <input type="hidden" name="Befor1Y" value="<?php echo $PrevYear; ?>" />
	  <input type="hidden" name="NextY" value="<?php echo $NextYear; ?>" />			 
		 <select style="font-size:12px;width:90px;height:20px;background-color:#DDFFBB;" name="YearV3" id="YearV3" onChange="ChangrYear3(this.value)"> 	
         <option value="<?php echo $_REQUEST['y3']; ?>" selected><?php echo $fromdate.'-'.$todate; ?></option>
<?php if($PrevYear>=1){?><option value="<?php echo $PrevYear; ?>"><?php echo date("Y",strtotime($resy3['FromDate'])).'-'.date("Y",strtotime($resy3['ToDate'])); ?></option><?php } ?><option value="<?php echo $NextYear; ?>"><?php echo date("Y",strtotime($resy2['FromDate'])).'-'.date("Y",strtotime($resy2['ToDate'])); ?></option></select>
        </td>
	    <td style="font-size:12px;width:83px;" align="right"><b>Country:</b>&nbsp;</td>
	    <td style="width:142px;">
		<select style="font-size:12px;width:141px;height:20px;background-color:#DDFFBB;" name="Coutry3" id="Coutry3" onChange="ClickCoutry3(this.value)"> 
	    <option value="">Select Country</option>
<?php $SqlCountry=mysql_query("SELECT * FROM hrm_country order by CountryName ASC", $con); while($ResCountry=mysql_fetch_array($SqlCountry)) { ?>
<option value="<?php echo $ResCountry['CountryId']; ?>"><?php echo ucwords(strtolower($ResCountry['CountryName'])); ?></option><?php } ?></select>
        </td>
	   <td style="font-size:12px;width:70px;" align="right"><b>State:</b>&nbsp;</td>
	    <td>
	    <span id="StateSpan3">
	    <select style="font-size:12px;width:180px;height:20px;background-color:#DDFFBB;" name="State3" id="State3" onChange="ClickState3(this.value)">
	    <option value="" selected>Select State</option>	
	    <?php $sql = mysql_query("SELECT * FROM hrm_state order by StateName ASC", $con); while($res = mysql_fetch_array($sql)){ ?>
	    <option value="<?php echo $res['StateId']; ?>"><?php echo ucwords(strtolower($res['StateName'])); ?></option><?php } ?></select>
	    </span>
	    </td>
		<td style="font-size:12px;width:50px;" align="right"><b>Hq:</b>&nbsp;</td>
        <td>
		<span id="HqSpan3">
		<select style="font-size:12px;width:180px;height:20px;background-color:#DDFFBB;" name="Hq3" id="Hq3" onChange="ClickHq3(this.value)">
        <option value="" selected>Select HQ</option>
<?php $sql = mysql_query("SELECT * FROM hrm_headquater where CompanyId=".$CompanyId." AND HQStatus='A' order by HqName ASC", $con); while($res = mysql_fetch_array($sql)){ ?>
        <option value="<?php echo $res['HqId']; ?>"><?php echo ucwords(strtolower($res['HqName'])); ?></option><?php } ?></select>
		</span>
		</td>
		<td style="width:80px;font-size:12px;" align="right"><b><a href="#" onClick="FunAchTgtTxls('xls')">Formate</a></b>&nbsp;</td>
		</tr>
		<tr>
	     <td colspan="4">
		  <table>
		   <tr>
		    <td style="font-size:12px;width:45px;" align="right"><b>Dealer:</b>&nbsp;</td>
			<td>
			<span id="DealSpan3">
			<select style="font-size:12px;width:310px;height:20px;background-color:#DDFFBB;" name="Dealer3" id="Dealer3" onChange="ClickDealer3(this.value)">
            <option value="" selected>Select Dealer Name</option>
<?php $sqlDeal = mysql_query("SELECT * FROM hrm_sales_dealer order by DealerName ASC", $con); while($resDeal = mysql_fetch_array($sqlDeal)){ ?>
            <option value="<?php echo $resDeal['DealerId']; ?>"><?php echo ucwords(strtolower($resDeal['DealerName'].'-'.$resDeal['DealerCity'])); ?></option><?php } ?></select>
			</span>
			</td>
		   </tr>
		  </table>
		 </td>
	     <td colspan="4">
		  <table>
		   <tr>
		    <td style="font-size:12px;width:67px;" align="right"><b>File:</b>&nbsp;</td>
			<td style="width:285px;color:#FFD5FF;"><input type="file" name="AchTgt_csv_file" id="AchTgt_csv_file" style="width:200px;" size="30" disabled="disabled"/></td>
		    <td style="width:75px;"><input type="submit" name="SaveAchTgt" value="Upload" id="AchTgtId" disabled="disabled"/></td>
		   </tr>
		  <tr><td colspan="8"><span id="CompliteSpan3"></span></td></tr>
		  </table> 
		 </td>
		</tr>
	   </table>
	   </form>  
	  </td>
	</tr>	
	        
     </table>  
</td>
</tr>
</table>
	  </td>
	</tr>

  </table>
 </td>
</tr>
</table>
</body>
</html>
