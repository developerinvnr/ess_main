<?php 
if($_REQUEST['action']=='upkraxls')
{  
    $file_name = $_REQUEST['file'];
    $file_path = "../Employee/AppKraFile/".$file_name;
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

?>
