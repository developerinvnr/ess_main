<?php session_start();

if($_SESSION['PN']==$_REQUEST['no'])
{

 $filepath = $_REQUEST['filepath']; 
 $filename = $_REQUEST['filename'];

 if (file_exists($filepath)) 
 {
  
    header('Content-Description: File Transfer');
    header('Content-Type: application/pdf');
    header('Content-Disposition: attachment; filename='.basename($filename));
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


/* 
if($_REQUEST['a']=='open')
{     
$LEC2=strlen($_REQUEST['File']);
if($LEC2==1){$EC2='000'.$_REQUEST['File'];}
elseif($LEC2==2){$EC2='00'.$_REQUEST['File'];}
elseif($LEC2==3){$EC2='0'.$_REQUEST['File'];}
elseif($LEC2==4){$EC2=$_REQUEST['File'];}
else{$EC2=$_REQUEST['File'];}

$filename = 'ImgTds'.$_REQUEST['c'].'202021/'.$EC2.'.pdf';
$filename2 = 'ImgTds'.$_REQUEST['c'].'202021/'.$EC2.' - B.pdf';

 if($_REQUEST['n']==1)
 {
       
  //echo '<iframe src='.$filename.' width="800px" height="600px" ></iframe>';     
  fopen($filename,"r");
  header('Content-type:application/pdf');
  readfile($filename);
 }
 elseif($_REQUEST['n']==2)
 {
  //echo '<iframe src='.$filename2.' width="800px" height="600px" ></iframe>'; 
  //echo $filename2;
  fopen($filename2,"r");
  header('Content-type:application/pdf');
  readfile($filename2);
 }
} 
*/

?>