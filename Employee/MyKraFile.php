<?php 

if($_REQUEST['a']=='open')

{  if($_REQUEST['Ext']=='.xls')

   { //fopen("KraUploadFile/".$_REQUEST['File'],"r");
     //header('Content-type:application/vnd.ms-excel');
	 //readfile("KraUploadFile/".$_REQUEST['File']);

    $file_name = $_REQUEST['File'];
    $file_path = "KraUploadFile/".$file_name;
    header("Pragma: public");
    header("Expires: 0");
    header("Cache-Control:must-revalidate, post-check=0, pre-check=0");
    header("Content-Type:application/force-download");
    header("Content-Type:application/octet-stream");
    header("Content-Type:application/download");
    header('Content-type:application/vnd.ms-excel');
    header('Content-Length:'.$size);
    header("Content-Disposition:attachment;filename=\"".$file_name."\";");
    header("Content-Transfer-Encoding:binary");
    // open the file in binary read-only mode
    // display the error messages if the file can´t be opened
    $file = & fopen($file_path, 'rb');
    if ($file) {
        // stream the file and exit the script when complete
        fpassthru($file);
        exit;
    } else {
        echo $err;
    }
	 
	 
   }

   

   if($_REQUEST['Ext']=='.xlsx')
   { //fopen("KraUploadFile/".$_REQUEST['File'],"r");
     //header('Content-type:application/vnd.ms-excel');
     //readfile("KraUploadFile/".$_REQUEST['File']);
	 
	$file_name = $_REQUEST['File'];
    $file_path = "KraUploadFile/".$file_name;
    header("Pragma: public");
    header("Expires: 0");
    header("Cache-Control:must-revalidate, post-check=0, pre-check=0");
    header("Content-Type:application/force-download");
    header("Content-Type:application/octet-stream");
    header("Content-Type:application/download");
    header('Content-type:application/vnd.ms-excel');
    header('Content-Length:'.$size);
    header("Content-Disposition:attachment;filename=\"".$file_name."\";");
    header("Content-Transfer-Encoding:binary");
    // open the file in binary read-only mode
    // display the error messages if the file can´t be opened
    $file = & fopen($file_path, 'rb');
    if ($file) {
        // stream the file and exit the script when complete
        fpassthru($file);
        exit;
    } else {
        echo $err;
    }
	
   }

   

   if($_REQUEST['Ext']=='.doc')

   { fopen("KraUploadFile/".$_REQUEST['File'],"r");

     header('Content-type:application/msword');

     readfile("KraUploadFile/".$_REQUEST['File']);

   }

   

   if($_REQUEST['Ext']=='.docx')

   { fopen("KraUploadFile/".$_REQUEST['File'],"r");

     header('Content-type:application/msword');

     readfile("KraUploadFile/".$_REQUEST['File']);

   }

   

   if($_REQUEST['Ext']=='.ppt')

   { fopen("KraUploadFile/".$_REQUEST['File'],"r");

     header('Content-type:application/vnd.ms-powerpoint');

     readfile("KraUploadFile/".$_REQUEST['File']);

   }

   

   if($_REQUEST['Ext']=='.pdf')

   { fopen("KraUploadFile/".$_REQUEST['File'],"r");

     header('Content-type:application/pdf');

     readfile("KraUploadFile/".$_REQUEST['File']);

   }

   

   if($_REQUEST['Ext']=='.jpg')

   { fopen("KraUploadFile/".$_REQUEST['File'],"r");

     header('Content-type:image/jpg');

     readfile("KraUploadFile/".$_REQUEST['File']);

	 echo '<img src="KraUploadFile/'.$_REQUEST['File'].'" style="width:200px; height:100px;"/>';

   }

   

   if($_REQUEST['Ext']=='.jpeg')

   { fopen("KraUploadFile/".$_REQUEST['File'],"r");

     header('Content-type:image/jpg');

     readfile("KraUploadFile/".$_REQUEST['File']);

	 echo '<img src="KraUploadFile/'.$_REQUEST['File'].'" style="width:200px; height:100px;"/>';

   }

   

   if($_REQUEST['Ext']=='.ods')

   { //fopen("KraUploadFile/".$_REQUEST['File'],"r");
     //header('Content-type:application/vnd.oasis.opendocument.spreadsheet');
     //readfile("KraUploadFile/".$_REQUEST['File']);
	 //echo '<img src="KraUploadFile/'.$_REQUEST['File'].'" style="width:200px; height:100px;"/>';
	 
	$file_name = $_REQUEST['File'];
    $file_path = "KraUploadFile/".$file_name;
    header("Pragma: public");
    header("Expires: 0");
    header("Cache-Control:must-revalidate, post-check=0, pre-check=0");
    header("Content-Type:application/force-download");
    header("Content-Type:application/octet-stream");
    header("Content-Type:application/download");
    header('Content-type:application/vnd.oasis.opendocument.spreadsheet');
    header('Content-Length:'.$size);
    header("Content-Disposition:attachment;filename=\"".$file_name."\";");
    header("Content-Transfer-Encoding:binary");
    // open the file in binary read-only mode
    // display the error messages if the file can´t be opened
    $file = & fopen($file_path, 'rb');
    if ($file) {
        // stream the file and exit the script when complete
        fpassthru($file);
        exit;
    } else {
        echo $err;
    }

   }

   

   if($_REQUEST['Ext']=='.odt')

   { //fopen("KraUploadFile/".$_REQUEST['File'],"r");
     //header('Content-type:application/vnd.oasis.opendocument.text');
     //readfile("KraUploadFile/".$_REQUEST['File']);
	 //echo '<img src="KraUploadFile/'.$_REQUEST['File'].'" style="width:200px; height:100px;"/>';
	 
	$file_name = $_REQUEST['File'];
    $file_path = "KraUploadFile/".$file_name;
    header("Pragma: public");
    header("Expires: 0");
    header("Cache-Control:must-revalidate, post-check=0, pre-check=0");
    header("Content-Type:application/force-download");
    header("Content-Type:application/octet-stream");
    header("Content-Type:application/download");
    header('Content-type:application/vnd.oasis.opendocument.text');
    header('Content-Length:'.$size);
    header("Content-Disposition:attachment;filename=\"".$file_name."\";");
    header("Content-Transfer-Encoding:binary");
    // open the file in binary read-only mode
    // display the error messages if the file can´t be opened
    $file = & fopen($file_path, 'rb');
    if ($file) {
        // stream the file and exit the script when complete
        fpassthru($file);
        exit;
    } else {
        echo $err;
    }

   }

}

?>