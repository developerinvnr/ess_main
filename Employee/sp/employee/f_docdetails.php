<?php session_start();
if($_SESSION['login'] = true){require_once('../user/config/config.php');}
?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style> /*background-color:#D9D9FF;background-color:#EEEEEE; */
.CalenderButton {background-image:url(images/CalenderBtn.jpeg);width:16px;height:16px;background-color:#E0DBE3;border-color:#FFFFFF;}
.htf{font-family:Georgia;color:#000;font-weight:bold;text-align:center;font-size:12px;background-color:#97FFFF;}
.htf2{font-family:Georgia;color:#FF80FF;font-weight:bold;font-size:18px;height:24px;}
.tdf{font-family:Georgia;font-size:12px;height:20px;color:#fff;}
.tdfu{font-family:Georgia;font-size:12px;height:20px;color:#000;}
.tdf2{background-color:#FFFFFF;font-family:Georgia;font-size:12px;height:20px;color:#000000;}
.InputSel {font-family:Georgia;font-size:12px;text-align:left; }
.InputType {font-family:Georgia;font-size:12px;text-align:left; }
.InputType2 {font-family:Georgia;font-size:12px;border:hidden;}
.SaveButton {background-image:url(images/save.png);width:18px;height:18px;background-repeat:no-repeat;}
</style>
<link rel="stylesheet" type="text/css" href="src/css/jscal2.css"/><?php /* Calander Open */?>
<link rel="stylesheet" type="text/css" href="src/css/border-radius.css"/>
<link rel="stylesheet" type="text/css" href="src/css/steel/steel.css"/>
<script type="text/javascript" src="src/js/jscal2.js"></script>
<script type="text/javascript" src="src/js/lang/en.js"></script><?php /* Calander Close */?>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
</head>
<body class="body">
<?php if($_REQUEST['fid']>0){ $sql=mysql_query("select Upld_pic, Upld_dl, Upld_pan, Upld_aadhar, Upld_resume, Upld_voterId, Upld_other1, Upld_other2 from fa_details where FaId=".$_REQUEST['fid'],$con);$res=mysql_fetch_assoc($sql); } ?>
<table border="0" style="width:100%;" valign="top" align="center">  
<tr>
 <td style="width:75%;" valign="top" align="center">
 <table style="width:75%;" border="0" valign="top" align="center">
 <tr>
  <td class="tdf" style="width:700px;height:550px;" valign="top" align="center">
<?php 
if($_REQUEST['v']==1)
{ $Ext=substr($res['Upld_aadhar'],strrpos($res['Upld_aadhar'], '.') + 1); 
  if($Ext=='pdf'){echo '<iframe src="../user/f_fafile/'.$res['Upld_aadhar'].'" style="width:700px;height:550px;"></iframe>';}
  elseif($Ext=='jpg' OR $Ext=='jpeg'){echo '<img src="../user/f_fafile/'.$res['Upld_aadhar'].'" style="width:500px;height:400px;"/>';} 
  elseif($Ext=='doc' OR $Ext=='docx'){echo '<iframe src="../user/f_fafile/'.$res['Upld_aadhar'].'" style="width:700px;height:550px;"></iframe>';}
}
elseif($_REQUEST['v']==2)
{ $Ext=substr($res['Upld_dl'],strrpos($res['Upld_dl'], '.') + 1); 
  if($Ext=='pdf'){echo '<iframe src="../user/f_fafile/'.$res['Upld_dl'].'" style="width:700px;height:550px;"></iframe>';}
  elseif($Ext=='jpg' OR $Ext=='jpeg'){echo '<img src="../user/f_fafile/'.$res['Upld_dl'].'" style="width:500px;height:400px;"/>';} 
  elseif($Ext=='doc' OR $Ext=='docx'){echo '<iframe src="../user/f_fafile/'.$res['Upld_dl'].'" style="width:700px;height:550px;"></iframe>';}
}
elseif($_REQUEST['v']==3)
{ $Ext=substr($res['Upld_pan'],strrpos($res['Upld_pan'], '.') + 1);
  if($Ext=='pdf'){echo '<iframe src="../user/f_fafile/'.$res['Upld_pan'].'" style="width:700px;height:550px;"></iframe>';}
  elseif($Ext=='jpg' OR $Ext=='jpeg'){echo '<img src="../user/f_fafile/'.$res['Upld_pan'].'" style="width:500px;height:400px;"/>';} 
  elseif($Ext=='doc' OR $Ext=='docx'){echo '<iframe src="../user/f_fafile/'.$res['Upld_pan'].'" style="width:700px;height:550px;"></iframe>';}
}

elseif($_REQUEST['v']==4)
{ $Ext=substr($res['Upld_voterId'],strrpos($res['Upld_voterId'], '.') + 1);
  if($Ext=='pdf'){echo '<iframe src="../user/f_fafile/'.$res['Upld_voterId'].'" style="width:700px;height:550px;"></iframe>';}
 elseif($Ext=='jpg' OR $Ext=='jpeg'){echo '<img src="../user/f_fafile/'.$res['Upld_voterId'].'" style="width:500px;height:400px;"/>';} 
  elseif($Ext=='doc' OR $Ext=='docx'){echo '<iframe src="../user/f_fafile/'.$res['Upld_voterId'].'" style="width:700px;height:550px;"></iframe>';}
}

elseif($_REQUEST['v']==5)
{ $Ext=substr($res['Upld_pic'],strrpos($res['Upld_pic'], '.') + 1);
  if($Ext=='pdf'){echo '<iframe src="../user/f_fafile/'.$res['Upld_pic'].'" style="width:700px;height:550px;"></iframe>';}
  elseif($Ext=='jpg' OR $Ext=='jpeg'){echo '<img src="../user/f_fafile/'.$res['Upld_pic'].'" style="width:500px;height:400px;"/>';} 
  elseif($Ext=='doc' OR $Ext=='docx'){echo '<iframe src="../user/f_fafile/'.$res['Upld_pic'].'" style="width:700px;height:550px;"></iframe>';}
}

elseif($_REQUEST['v']==6)
{ $Ext=substr($res['Upld_resume'],strrpos($res['Upld_resume'], '.') + 1);
  if($Ext=='pdf'){echo '<iframe src="../user/f_fafile/'.$res['Upld_resume'].'" style="width:700px;height:550px;"></iframe>';}
  elseif($Ext=='jpg' OR $Ext=='jpeg'){echo '<img src="../user/f_fafile/'.$res['Upld_resume'].'" style="width:500px;height:400px;"/>';} 
  elseif($Ext=='doc' OR $Ext=='docx'){echo '<iframe src="../user/f_fafile/'.$res['Upld_resume'].'" style="width:700px;height:550px;"></iframe>';}
}

elseif($_REQUEST['v']==7)
{ $Ext=substr($res['Upld_other1'],strrpos($res['Upld_other1'], '.') + 1);
  if($Ext=='pdf'){echo '<iframe src="../user/f_fafile/'.$res['Upld_other1'].'" style="width:700px;height:550px;"></iframe>';}
  elseif($Ext=='jpg' OR $Ext=='jpeg'){echo '<img src="../user/f_fafile/'.$res['Upld_other1'].'" style="width:500px;height:400px;"/>';} 
  elseif($Ext=='doc' OR $Ext=='docx'){echo '<iframe src="../user/f_fafile/'.$res['Upld_other1'].'" style="width:700px;height:550px;"></iframe>';}
}

elseif($_REQUEST['v']==8)
{ $Ext=substr($res['Upld_other2'],strrpos($res['Upld_other2'], '.') + 1);
  if($Ext=='pdf'){echo '<iframe src="../user/f_fafile/'.$res['Upld_other2'].'" style="width:700px;height:550px;"></iframe>';}
  elseif($Ext=='jpg' OR $Ext=='jpeg'){echo '<img src="../user/f_fafile/'.$res['Upld_other2'].'" style="width:500px;height:400px;"/>';} 
  elseif($Ext=='doc' OR $Ext=='docx'){echo '<iframe src="../user/f_fafile/'.$res['Upld_other2'].'" style="width:700px;height:550px;"></iframe>';}
}
?>	 	 
  </td>
 </tr> 
 </table>
 </td>  
</tr>
</table>	
</body>
</html>
