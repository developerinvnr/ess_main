<?php 
    date_default_timezone_set('Asia/Calcutta');
	define('HOST','localhost');
	define('USER','hrims_user'); //vnrseed2_hr
	define('PASS','hrims@192'); //vnrhrims321
	define('DATABASE1','hrims'); //vnrseed2_hrims
	//define('CHARSET','utf8'); 
	
	$con=mysql_connect(HOST,USER,PASS);
	if(!$con) die("Failed to connect to database!");
	$db=mysql_select_db(DATABASE1, $con);
	if(!$db) die("Failed to select database!");
	
	/* define('HOST2','localhost');
	define('USER2','vnrseed2_erpuser'); 
	define('PASS2','vnrerperp321');
	define('db2','vnrseed2_erp');
	$con2=mysql_connect(HOST2,USER2,PASS2,true);
	if(!$con2) die("Failed to connect to database!");
	$db2=mysql_select_db(db2, $con2);
	if(!$db2) die("Failed to select database!");*/
	
	
	header ("Expires: ".gmdate("D, d M Y H:i:s", time())." GMT");  
    header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");  
    header ("Cache-Control: no-cache, must-revalidate");  
    header ("Pragma: no-cache");
    
    mysql_query("SET SESSION sql_mode = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION'");
    date_default_timezone_set('Asia/Calcutta');
	
?>
