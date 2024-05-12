<?php session_start();
if($_SESSION['login'] = true){require_once('../AdminUser/config/config.php');}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
if($_REQUEST['act']=='show')
{ 
fopen("../AdminUser/VnrImpact/Vol".$_REQUEST['v'].".pdf","r");
header('Content-type:application/pdf');
readfile("../AdminUser/VnrImpact/Vol".$_REQUEST['v'].'.pdf');
}

?>