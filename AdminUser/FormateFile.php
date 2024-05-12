<?php 
if($_REQUEST['act']=='FileOpen')
{  
	$file_name = 'components.xls';
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

if($_REQUEST['act']=='TDSFileOpen')
{  
	$file_name = 'TDS.xls';
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

if($_REQUEST['act']=='DAFileOpen')
{  
	$file_name = 'DA.xls';
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

if($_REQUEST['act']=='ATTFileOpen')
{  
	$file_name = 'ATTEND.xls';
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

if($_REQUEST['act']=='ENTRYFileOpen')
{  
	$file_name = 'ENTRY.xls';
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


if($_REQUEST['act']=='GpsFileOpen')
{  
	$file_name = 'GpsAtt.xls';
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


if($_REQUEST['act']=='TimeEntryFileOpen')
{  
	$file_name = 'TimeAtt.xls';
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


if($_REQUEST['act']=='Time2EntryFileOpen')
{  
	$file_name = 'Time2Att.xls';
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