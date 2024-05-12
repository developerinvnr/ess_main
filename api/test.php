<?php 


        header("Content-Type:application/json");
        $data = file_get_contents('php://input');
        print $data;
     
        
       

?>
