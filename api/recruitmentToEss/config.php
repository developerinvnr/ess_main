<?php 
   error_reporting(0);

   
//   	define('HOST','localhost'); 
// 	define('USER','vnrseed2_demohrims'); 
// 	define('PASS','S@ndy15391');
// 	define('DATABASE','vnrseed2_hrims_demo');
   
     	define('HOST','localhost'); 
 	define('USER','hrims_user'); 
define('PASS','hrims@192');
define('DATABASE','recruitment_to_ess');

    $con=mysql_connect(HOST,USER,PASS);
   	if(!$con) die("Failed to connect to database!");
	$db=mysql_select_db(DATABASE, $con);
	if(!$db) die("Failed to select database!");

   
   date_default_timezone_set('Asia/Calcutta');


?>
