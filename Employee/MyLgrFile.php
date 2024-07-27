<?php session_start();

if($_SESSION['ECL']==$_REQUEST['no'])
{

 $filepath = $_REQUEST['filepath']; 
 $filename = $_REQUEST['filename'];

 if (file_exists($filepath)) 
 {
  
    header('Content-Description: File Transfer');
    header('Content-Type: application/pdf');
    //header('Content-Disposition: attachment; filename='.basename($filename));
	header('Content-Disposition: attachment; filename='.basename('LgrFile202324.pdf'));
    header('Content-Length: '.filesize($filepath));
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    
    // Read the file and output it to the browser
    readfile($filepath);
    exit;
 } 
 else 
 { 
  die('The file does not exist.');
 }
 
} //if($_SESSION['PN']==$_REQUEST['no'])


?>