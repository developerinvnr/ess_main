<?php
require_once('AdminUser/config/config.php');
if(isset($_POST['N']) && $_POST['N']!=""){ $N=$_POST['N']; $E=$_POST['E']; $P=$_POST['P']; $C=$_POST['C'];
$sql = mysql_query("Insert into hrm_contactus(ContactUs_Name,ContactUs_EmailId,ContactUs_Mobile,ContactUs_Comment,ContactUs_Date) values('".$N."', '".$E."', ".$P.", '".$C."','".date("Y-m-d")."')", $con) or die(mysql_error()); 
if($sql){echo 'Save successfully!';}
	
	
 } ?>