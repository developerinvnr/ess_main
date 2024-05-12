<?php 
/*444*/
$sNr=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND PStatus='A'", $con);

$s4=mysql_query("select NRV from hrm_sales_product_nrv where Fdate=(select max(Fdate) as Fdate from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate<='".$fy4."-04-01') AND ProductId=".$res['ProductId'],$con); $row4=mysql_num_rows($s4); if($row4>0){ $r4=mysql_fetch_assoc($s4);}else{ $r4=mysql_fetch_assoc($sNr);} $Nrv4=$r4['NRV'];

$s5=mysql_query("select NRV from hrm_sales_product_nrv where Fdate=(select max(Fdate) as Fdate from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate<='".$fy4."-05-01') AND ProductId=".$res['ProductId'],$con); $row5=mysql_num_rows($s5); if($row5>0){ $r5=mysql_fetch_assoc($s5);}else{ $r5=mysql_fetch_assoc($sNr);} $Nrv5=$r5['NRV'];

$s6=mysql_query("select NRV from hrm_sales_product_nrv where Fdate=(select max(Fdate) as Fdate from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate<='".$fy4."-06-01') AND ProductId=".$res['ProductId'],$con); $row6=mysql_num_rows($s6); if($row6>0){ $r6=mysql_fetch_assoc($s6);}else{ $r6=mysql_fetch_assoc($sNr);} $Nrv6=$r6['NRV'];

$s7=mysql_query("select NRV from hrm_sales_product_nrv where Fdate=(select max(Fdate) as Fdate from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate<='".$fy4."-07-01') AND ProductId=".$res['ProductId'],$con); $row7=mysql_num_rows($s7); if($row7>0){ $r7=mysql_fetch_assoc($s7);}else{ $r7=mysql_fetch_assoc($sNr);} $Nrv7=$r7['NRV'];

$s8=mysql_query("select NRV from hrm_sales_product_nrv where Fdate=(select max(Fdate) as Fdate from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate<='".$fy4."-08-01') AND ProductId=".$res['ProductId'],$con); $row8=mysql_num_rows($s8); if($row8>0){ $r8=mysql_fetch_assoc($s8);}else{ $r8=mysql_fetch_assoc($sNr);} $Nrv8=$r8['NRV'];

$s9=mysql_query("select NRV from hrm_sales_product_nrv where Fdate=(select max(Fdate) as Fdate from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate<='".$fy4."-09-01') AND ProductId=".$res['ProductId'],$con); $row9=mysql_num_rows($s9); if($row9>0){ $r9=mysql_fetch_assoc($s9);}else{ $r9=mysql_fetch_assoc($sNr);} $Nrv9=$r9['NRV'];

$s10=mysql_query("select NRV from hrm_sales_product_nrv where Fdate=(select max(Fdate) as Fdate from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate<='".$fy4."-10-01') AND ProductId=".$res['ProductId'],$con); $row10=mysql_num_rows($s10); if($row10>0){ $r10=mysql_fetch_assoc($s10);}else{ $r10=mysql_fetch_assoc($sNr);} $Nrv10=$r10['NRV'];

$s11=mysql_query("select NRV from hrm_sales_product_nrv where Fdate=(select max(Fdate) as Fdate from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate<='".$fy4."-11-01') AND ProductId=".$res['ProductId'],$con); $row11=mysql_num_rows($s11); if($row11>0){ $r11=mysql_fetch_assoc($s11);}else{ $r11=mysql_fetch_assoc($sNr);} $Nrv11=$r11['NRV'];

$s12=mysql_query("select NRV from hrm_sales_product_nrv where Fdate=(select max(Fdate) as Fdate from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate<='".$fy4."-12-01') AND ProductId=".$res['ProductId'],$con); $row12=mysql_num_rows($s12); if($row12>0){ $r12=mysql_fetch_assoc($s12);}else{ $r12=mysql_fetch_assoc($sNr);} $Nrv12=$r12['NRV'];

$s1=mysql_query("select NRV from hrm_sales_product_nrv where Fdate=(select max(Fdate) as Fdate from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate<='".$ty4."-01-01') AND ProductId=".$res['ProductId'],$con); $row1=mysql_num_rows($s1); if($row1>0){ $r1=mysql_fetch_assoc($s1);}else{ $r1=mysql_fetch_assoc($sNr);} $Nrv1=$r1['NRV'];

$s2=mysql_query("select NRV from hrm_sales_product_nrv where Fdate=(select max(Fdate) as Fdate from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate<='".$ty4."-02-01') AND ProductId=".$res['ProductId'],$con); $row2=mysql_num_rows($s2); if($row2>0){ $r2=mysql_fetch_assoc($s2);}else{ $r2=mysql_fetch_assoc($sNr);} $Nrv2=$r2['NRV'];

$s3=mysql_query("select NRV from hrm_sales_product_nrv where Fdate=(select max(Fdate) as Fdate from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate<='".$ty4."-03-01') AND ProductId=".$res['ProductId'],$con); $row3=mysql_num_rows($s3); if($row3>0){ $r3=mysql_fetch_assoc($s3);}else{ $r3=mysql_fetch_assoc($sNr);} $Nrv3=$r3['NRV'];
?>