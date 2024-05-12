<?php 
if($_REQUEST['a']=='open')
{  if($_REQUEST['Ext']=='.xls')
   { //fopen("AppUploadFile/".$_REQUEST['File'],"r");
     //header('Content-type:application/vnd.ms-excel');
     //readfile("AppUploadFile/".$_REQUEST['File']);

    $file_name = $_REQUEST['File'];
    $file_path = "AppUploadFile/".$file_name;
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
   { //fopen("AppUploadFile/".$_REQUEST['File'],"r");
     //header('Content-type:application/vnd.ms-excel');
     //readfile("AppUploadFile/".$_REQUEST['File']);

    $file_name = $_REQUEST['File'];
    $file_path = "AppUploadFile/".$file_name;
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
   { fopen("AppUploadFile/".$_REQUEST['File'],"r");
     header('Content-type:application/msword');
     readfile("AppUploadFile/".$_REQUEST['File']);
   }
   
   if($_REQUEST['Ext']=='.docx')
   { fopen("AppUploadFile/".$_REQUEST['File'],"r");
     header('Content-type:application/msword');
     readfile("AppUploadFile/".$_REQUEST['File']);
   }
   
   if($_REQUEST['Ext']=='.ppt')
   { fopen("AppUploadFile/".$_REQUEST['File'],"r");
     header('Content-type:application/vnd.ms-powerpoint');
     readfile("AppUploadFile/".$_REQUEST['File']);
   }
   
   if($_REQUEST['Ext']=='.pdf')
   { fopen("AppUploadFile/".$_REQUEST['File'],"r");
     header('Content-type:application/pdf');
     readfile("AppUploadFile/".$_REQUEST['File']);
   }
   
   if($_REQUEST['Ext']=='.jpg')
   { fopen("AppUploadFile/".$_REQUEST['File'],"r");
     header('Content-type:image/jpg');
     readfile("AppUploadFile/".$_REQUEST['File']);
	 echo '<img src="AppUploadFile/'.$_REQUEST['File'].'" style="width:200px; height:100px;"/>';
   }
   
   if($_REQUEST['Ext']=='.jpeg')
   { fopen("AppUploadFile/".$_REQUEST['File'],"r");
     header('Content-type:image/jpg');
     readfile("AppUploadFile/".$_REQUEST['File']);
	 echo '<img src="AppUploadFile/'.$_REQUEST['File'].'" style="width:200px; height:100px;"/>';
   }
   
   if($_REQUEST['Ext']=='.ods')
   { //fopen("AppUploadFile/".$_REQUEST['File'],"r");
     //header('Content-type:application/vnd.oasis.opendocument.spreadsheet');
     //readfile("AppUploadFile/".$_REQUEST['File']);
     //echo '<img src="AppUploadFile/'.$_REQUEST['File'].'" style="width:200px; height:100px;"/>';

    $file_name = $_REQUEST['File'];
    $file_path = "AppUploadFile/".$file_name;
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
   { //fopen("AppUploadFile/".$_REQUEST['File'],"r");
     //header('Content-type:application/vnd.oasis.opendocument.text');
     //readfile("AppUploadFile/".$_REQUEST['File']);
     //echo '<img src="AppUploadFile/'.$_REQUEST['File'].'" style="width:200px; height:100px;"/>';

    $file_name = $_REQUEST['File'];
    $file_path = "AppUploadFile/".$file_name;
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