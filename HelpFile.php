<?php 
if($_REQUEST['a']=='open')
{ 
fopen($_REQUEST['v'].".pdf","r");
header('Content-type:application/pdf');
readfile($_REQUEST['v'].'.pdf');
}
?>