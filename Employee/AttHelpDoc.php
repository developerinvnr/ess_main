<?php 
fopen("AttPolicy.pdf","r");
header('Content-type:application/pdf');
readfile('AttPolicy.pdf');  
?>