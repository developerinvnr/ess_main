<?php 
	define('HOST','182.75.72.113');
	define('USER','root'); 
	define('PASS','veekay1234'); 
	define('DATABASE1','test'); 
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
	if(!$db2) die("Failed to select database!"); */
	
	mysql_query("SET SESSION sql_mode = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION'");
	
?>