<?php 
date_default_timezone_set('Asia/Calcutta');
// error_reporting(E_ALL ^ E_NOTICE);
// error_reporting(error_reporting() & (-1 ^ E_DEPRECATED));
// die();
// session_destroy();

	define('HOST','localhost'); //localhost  //1_144.76.110.39  //2_148.251.83.156  //159.69.73.26
	define('USER','hrims_user'); 
	define('PASS','hrims@192');
	define('DATABASE1','hrims');
	
	$con=mysql_connect(HOST,USER,PASS);
	if(!$con) die("Failed to connect to database!");
	$db=mysql_select_db(DATABASE1, $con);
	if(!$db) die("Failed to select database!");

       //$con=mysql_connect('localhost','vnrseed2_hr','vnrhrims321');
       //$db=mysql_select_db('vnrseed2_hrims', $con);
       //if(!$db) die("Failed to select database!");
       
    header ("Expires: ".gmdate("D, d M Y H:i:s", time())." GMT");  
    header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");  
    header ("Cache-Control: no-cache, must-revalidate");  
    header ("Pragma: no-cache");   
    
    mysql_query("SET SESSION sql_mode = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION'");
    
    date_default_timezone_set('Asia/Calcutta');

?>
