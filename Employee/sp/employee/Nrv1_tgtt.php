<?php 
/*111*/
$sNrt=mysql_query("select NRV from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND PStatus='A'", $con); 

$s4t=mysql_query("select NRV from hrm_sales_product_nrv where Fdate=(select max(Fdate) as Fdate from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate<='".$fy11."-04-01') AND ProductId=".$res['ProductId'],$con); $row4t=mysql_num_rows($s4t); if($row4t>0){ $r4t=mysql_fetch_assoc($s4t);}else{ $r4t=mysql_fetch_assoc($sNrt);} $Nrv4t=$r4t['NRV'];

$s5t=mysql_query("select NRV from hrm_sales_product_nrv where Fdate=(select max(Fdate) as Fdate from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate<='".$fy11."-05-01') AND ProductId=".$res['ProductId'],$con); $row5t=mysql_num_rows($s5t); if($row5t>0){ $r5t=mysql_fetch_assoc($s5t);}else{ $r5t=mysql_fetch_assoc($sNrt);} $Nrv5t=$r5t['NRV'];

$s6t=mysql_query("select NRV from hrm_sales_product_nrv where Fdate=(select max(Fdate) as Fdate from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate<='".$fy11."-06-01') AND ProductId=".$res['ProductId'],$con); $row6t=mysql_num_rows($s6t); if($row6t>0){ $r6t=mysql_fetch_assoc($s6t);}else{ $r6t=mysql_fetch_assoc($sNrt);} $Nrv6t=$r6t['NRV'];

$s7t=mysql_query("select NRV from hrm_sales_product_nrv where Fdate=(select max(Fdate) as Fdate from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate<='".$fy11."-07-01') AND ProductId=".$res['ProductId'],$con); $row7t=mysql_num_rows($s7t); if($row7t>0){ $r7t=mysql_fetch_assoc($s7t);}else{ $r7t=mysql_fetch_assoc($sNrt);} $Nrv7t=$r7t['NRV'];

$s8t=mysql_query("select NRV from hrm_sales_product_nrv where Fdate=(select max(Fdate) as Fdate from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate<='".$fy11."-08-01') AND ProductId=".$res['ProductId'],$con); $row8t=mysql_num_rows($s8t); if($row8t>0){ $r8t=mysql_fetch_assoc($s8t);}else{ $r8t=mysql_fetch_assoc($sNrt);} $Nrv8t=$r8t['NRV'];

$s9t=mysql_query("select NRV from hrm_sales_product_nrv where Fdate=(select max(Fdate) as Fdate from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate<='".$fy11."-09-01') AND ProductId=".$res['ProductId'],$con); $row9t=mysql_num_rows($s9t); if($row9t>0){ $r9t=mysql_fetch_assoc($s9t);}else{ $r9t=mysql_fetch_assoc($sNrt);} $Nrv9t=$r9t['NRV'];

$s10t=mysql_query("select NRV from hrm_sales_product_nrv where Fdate=(select max(Fdate) as Fdate from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate<='".$fy11."-10-01') AND ProductId=".$res['ProductId'],$con); $row10t=mysql_num_rows($s10t); if($row10t>0){ $r10t=mysql_fetch_assoc($s10t);}else{ $r10t=mysql_fetch_assoc($sNrt);} $Nrv10t=$r10t['NRV'];

$s11t=mysql_query("select NRV from hrm_sales_product_nrv where Fdate=(select max(Fdate) as Fdate from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate<='".$fy11."-10-01') AND ProductId=".$res['ProductId'],$con); $row11t=mysql_num_rows($s11t); if($row11t>0){ $r11t=mysql_fetch_assoc($s11t);}else{ $r11t=mysql_fetch_assoc($sNrt);} $Nrv11t=$r11t['NRV'];

$s12t=mysql_query("select NRV from hrm_sales_product_nrv where Fdate=(select max(Fdate) as Fdate from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate<='".$fy11."-10-01') AND ProductId=".$res['ProductId'],$con); $row12t=mysql_num_rows($s12t); if($row12t>0){ $r12t=mysql_fetch_assoc($s12t);}else{ $r12t=mysql_fetch_assoc($sNrt);} $Nrv12t=$r12t['NRV'];

$s1t=mysql_query("select NRV from hrm_sales_product_nrv where Fdate=(select max(Fdate) as Fdate from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate<='".$fy11."-10-01') AND ProductId=".$res['ProductId'],$con); $row1t=mysql_num_rows($s1t); if($row1t>0){ $r1t=mysql_fetch_assoc($s1t);}else{ $r1t=mysql_fetch_assoc($sNrt);} $Nrv1t=$r1t['NRV'];

$s2t=mysql_query("select NRV from hrm_sales_product_nrv where Fdate=(select max(Fdate) as Fdate from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate<='".$fy11."-10-01') AND ProductId=".$res['ProductId'],$con); $row2t=mysql_num_rows($s2t); if($row2t>0){ $r2t=mysql_fetch_assoc($s2t);}else{ $r2t=mysql_fetch_assoc($sNrt);} $Nrv2t=$r2t['NRV'];

$s3t=mysql_query("select NRV from hrm_sales_product_nrv where Fdate=(select max(Fdate) as Fdate from hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND Fdate<='".$fy11."-10-01') AND ProductId=".$res['ProductId'],$con); $row3t=mysql_num_rows($s3t); if($row3t>0){ $r3t=mysql_fetch_assoc($s3t);}else{ $r3t=mysql_fetch_assoc($sNrt);} $Nrv3t=$r3t['NRV'];
?>


