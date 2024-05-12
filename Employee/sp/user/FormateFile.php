<?php 
if($_REQUEST['act']=='NrvFileOpen')
{  
	$file_name = 'NRVDataFile.xls';
    $file_path = "FormateImpt/".$file_name;
    header("Pragma: public");
    header("Expires: 0");
    header("Cache-Control:must-revalidate, post-check=0, pre-check=0");
    header("Content-Type:application/force-download");
    header("Content-Type:application/octet-stream");
    header("Content-Type:application/download");
    header('Content-type:application/vnd.ms-excel');
    //header('Content-Length:'.$size);
    header("Content-Disposition:attachment;filename=\"".$file_name."\";");
    header("Content-Transfer-Encoding:binary"); 
	$file = & fopen($file_path, 'rb');
    if ($file) { fpassthru($file); exit; } else { echo $err; }
}

if($_REQUEST['act']=='AchQQFileOpen')
{  
	$file_name = 'SalesData_Q1.xls';
    $file_path = "FormateImpt/".$file_name;
    header("Pragma: public");
    header("Expires: 0");
    header("Cache-Control:must-revalidate, post-check=0, pre-check=0");
    header("Content-Type:application/force-download");
    header("Content-Type:application/octet-stream");
    header("Content-Type:application/download");
    header('Content-type:application/vnd.ms-excel');
    //header('Content-Length:'.$size);
    header("Content-Disposition:attachment;filename=\"".$file_name."\";");
    header("Content-Transfer-Encoding:binary"); 
	$file = & fopen($file_path, 'rb');
    if ($file) { fpassthru($file); exit; } else { echo $err; }
}

if($_REQUEST['act']=='AchFileOpen')
{  
	$file_name = 'Product_AchTgt_Plan.xls';
    $file_path = "FormateImpt/".$file_name;
    header("Pragma: public");
    header("Expires: 0");
    header("Cache-Control:must-revalidate, post-check=0, pre-check=0");
    header("Content-Type:application/force-download");
    header("Content-Type:application/octet-stream");
    header("Content-Type:application/download");
    header('Content-type:application/vnd.ms-excel');
    //header('Content-Length:'.$size);
    header("Content-Disposition:attachment;filename=\"".$file_name."\";");
    header("Content-Transfer-Encoding:binary"); 
	$file = & fopen($file_path, 'rb');
    if ($file) { fpassthru($file); exit; } else { echo $err; }
}

if($_REQUEST['act']=='AchTrgtFileOpen')
{  
	$file_name = 'Product_AchTrgtAll_Plan.xlsx';
    $file_path = "FormateImpt/".$file_name;
    header("Pragma: public");
    header("Expires: 0");
    header("Cache-Control:must-revalidate, post-check=0, pre-check=0");
    header("Content-Type:application/force-download");
    header("Content-Type:application/octet-stream");
    header("Content-Type:application/download");
    header('Content-type:application/vnd.ms-excel');
    //header('Content-Length:'.$size);
    header("Content-Disposition:attachment;filename=\"".$file_name."\";");
    header("Content-Transfer-Encoding:binary"); 
	$file = & fopen($file_path, 'rb');
    if ($file) { fpassthru($file); exit; } else { echo $err; }
}

if($_REQUEST['act']=='AchallYearFileOpen')
{
	$file_name = 'allYEar_Achivement.xls';
    $file_path = "FormateImpt/".$file_name;
    header("Pragma: public");
    header("Expires: 0");
    header("Cache-Control:must-revalidate, post-check=0, pre-check=0");
    header("Content-Type:application/force-download");
    header("Content-Type:application/octet-stream");
    header("Content-Type:application/download");
    header('Content-type:application/vnd.ms-excel');
    //header('Content-Length:'.$size);
    header("Content-Disposition:attachment;filename=\"".$file_name."\";");
    header("Content-Transfer-Encoding:binary");
	$file = & fopen($file_path, 'rb');
    if ($file) { fpassthru($file); exit; } else { echo $err; }
}

?>
