<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}
?>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php include_once('../Title.php'); ?></title>

<link type="text/css" href="css/body.css" rel="stylesheet"/>
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style>.font4 { color:#1FAD34; font-family:Georgia; font-size:15px;} .All{font-size:11px; height:18px;} .All_80{font-size:11px; height:18px; width:80px;} .All_50{font-size:11px; height:18px; width:50px;} .All_100{font-size:11px; height:18px; width:100px;} .All_120{font-size:11px; height:18px; width:120px;} .All_150{font-size:11px; height:18px; width:150px;}.All_200{font-size:11px; height:18px; width:200px;} .All_350{font-size:11px; height:18px; width:350px;} .th{font-family:Times New Roman;font-size:12px;font-weight:bold;text-align:center;color:#FFFFFF; background-color:#376A9D;height:26px;} 
.tdl{font-family:Times New Roman;font-size:14px;color:#000000;}
.tdr{font-family:Times New Roman;font-size:12px;text-align:right;color:#000000;}
.tdc{font-family:Times New Roman;font-size:12px;text-align:center;color:#000000;}
.selecti{font-family:Times New Roman;font-size:12px;background-color:#DDFFBB;}
.inner_table{height:550px;overflow-y:auto;width:auto;}
</style>
<script type="text/javascript" src="js/stuHover.js"></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<script src="js/jquery-1.9.1.js"></script>
<script type="text/javascript" src="js/jquery.freezeheader.js"></script>
 <title>Employee Image Viewer</title>
    <style>
       .subdirectories {
            white-space: nowrap;
        }
        .subdirectories a {
            margin-right: 10px;
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
        img {
            max-width: 50px;
            max-height: 50px;
        }
    </style>    
</head>
<body class="body">
<table class="table">
<tr>
 <td>
  <table class="menutable"><tr><td><?php if($_SESSION['login'] = true){ require_once("AMenu.php"); } ?></td></tr></table>
 </td>
</tr>
<tr>
 <td>
  <table width="100%" style="margin-top:0px;" border="0">
    <tr>
	  <td valign="top"><?php if($_SESSION['login'] = true){ require_once("AWelcome.php"); } ?></td>
	</tr>
	 <tr>
	  <td valign="top" align="center"  width="100%" id="MainWindow">
	      <a href="employee_image_download.php?dir=EmployeeImage" style="float:inline-end">Back to Main</a>
<?php

// Function to list subdirectories of a directory
function listSubdirectories($directory) {
    $subdirectories = [];
    $directories = glob($directory . '/*', GLOB_ONLYDIR);
    foreach ($directories as $dir) {
        $subdirectories[] = basename($dir);
    }
    return $subdirectories;
}

// Function to list images in a directory
function listImages($directory) {
    $images = [];
    $files = glob($directory . '/*.{jpg,jpeg,png,gif}', GLOB_BRACE);
    foreach ($files as $file) {
        $images[] = basename($file);
    }
    return $images;
}

// Directory to display
$currentDirectory = isset($_GET['dir']) ? $_GET['dir'] : 'EmployeeImage';
$currentDirectory = rtrim($currentDirectory, '/');

// List subdirectories
$subdirectories = listSubdirectories($currentDirectory);

// List images in selected directory
$images = listImages($currentDirectory);

?>


    <h2>Subdirectories:</h2>

      <div class="subdirectories">
        <?php foreach ($subdirectories as $dir): ?>
            <a href="?dir=<?= $currentDirectory ?>/<?= $dir ?>"><?= $dir ?></a>
        <?php endforeach; ?>
    </div>
    <h2>Images:</h2>
    <table>
        <tr>
            <th>Image</th>
            <th>Employee Name & Code</th>
            <th>Action</th>
        </tr>
        <?php foreach ($images as $image): ?>
            <tr>
                <td><img src="<?= $currentDirectory ?>/<?= $image ?>" alt="<?= $image ?>"></td>
                <td><?= $image ?></td>
                <td><a href="<?= $currentDirectory ?>/<?= $image ?>" download>Download</a></td>
            </tr>
        <?php endforeach; ?>
    </table>


	  </td>
	</tr>
	
  </table>
 </td>
</tr>
</table>
</body>
</html>