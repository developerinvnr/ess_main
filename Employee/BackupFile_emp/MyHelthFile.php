

<br><br>

<center><font style="font-family:Times New Roman; font-size:40px; font-style:italic; font-weight:bold; color:#006F00;">
 Download</font></center>

<center><font style="font-family:Times New Roman; font-size:50px; font-style:italic; font-weight:bold; color:#006F00;">
 <u>HEALTH ID CARD</u> </font></center>
 
 
<br>
<p>&nbsp;&nbsp;</p>

<?php 
if($_REQUEST['a']=='open')
{     
 $EC3=$_REQUEST['File'];
 
 if(file_exists('HealthIDCard/'.$EC3.'/'.$EC3.'_A.pdf')) 
 {
  $filename= 'HealthIDCard/'.$EC3.'/'.$EC3.'_A.pdf';
  echo "<center><a href='$filename' target='_blank' style='font-family:Times New Roman; font-size:40px; font-style:italic;text-decoration:none; font-weight:bold;'>Self</a></center><br><br><br>";
  //echo '<iframe src='.$filename.' width="100%" height="350px" scrolling="no"></iframe>';
  /*      
  fopen($filename,"r");
  header('Content-type:application/pdf');
  readfile($filename);*/
 }
 
 if(file_exists('HealthIDCard/'.$EC3.'/'.$EC3.'_B.pdf'))
 {
  $filename2= 'HealthIDCard/'.$EC3.'/'.$EC3.'_B.pdf'; 
  echo "<center><a href='$filename2' target='_blank' style='font-family:Times New Roman; font-size:40px; font-style:italic;text-decoration:none; font-weight:bold;'>Spouse</a></center><br><br><br>";
  //echo '<iframe src='.$filename2.' width="100%" height="350px" scrolling="no"></iframe>';
  /* 
  fopen($filename2,"r");
  header('Content-type:application/pdf');
  readfile($filename2);*/
 }
 
 if(file_exists('HealthIDCard/'.$EC3.'/'.$EC3.'_C.pdf'))
 {
  $filename3= 'HealthIDCard/'.$EC3.'/'.$EC3.'_C.pdf';
  echo "<center><a href='$filename3' target='_blank' style='font-family:Times New Roman; font-size:40px; font-style:italic;text-decoration:none; font-weight:bold;'>Child - 1</a></center><br><br><br>";
  //echo '<iframe src='.$filename3.' width="100%" height="350px" scrolling="no"></iframe>';
  /*  
  fopen($filename3,"r");
  header('Content-type:application/pdf');
  readfile($filename3);*/
 }
 
 if(file_exists('HealthIDCard/'.$EC3.'/'.$EC3.'_D.pdf'))
 {
  $filename4= 'HealthIDCard/'.$EC3.'/'.$EC3.'_D.pdf';
  echo "<center><a href='$filename4' target='_blank' style='font-family:Times New Roman; font-size:40px; font-style:italic;text-decoration:none; font-weight:bold;'>Child - 2</a></center><br><br><br>";
  //echo '<iframe src='.$filename4.' width="100%" height="350px" scrolling="no"></iframe>';
  /*  
  fopen($filename4,"r");
  header('Content-type:application/pdf');
  readfile($filename4);*/
 }
 
 
} 


//echo '<iframe src='.$filename.' width="800px" height="600px" ></iframe>';
//echo '<iframe src='.$filename2.' width="800px" height="600px" ></iframe>'; 
  //echo $filename2;

?>
