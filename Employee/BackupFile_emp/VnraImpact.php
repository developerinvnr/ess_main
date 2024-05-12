<?php session_start();
if($_SESSION['login'] = true){require_once('../AdminUser/config/config.php');}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('../AdminUser/logcheck.php');
if($_SESSION['logCheckEmp']!=$logemp){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('EmpMenuSession.php');}
?>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php include_once('../Title.php'); ?></title>

<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<Script type="text/javascript">
function FUnImpact(N)
{
 if(N==0){window.open("VnraImpact.php?e=4e&w=234&rr=09drfGe&act=show&v=0&valut=ture", '_blank'); window.focus();}
 else{ window.open(N, '_blank'); window.focus(); }   
}
</Script>
</head>
<body class="body"> 
<table class="table">
 <tr><td><table class="menutable"><tr><td><?php if($_SESSION['login'] = true){ require_once("EMenu.php"); } ?></td></tr></table></td></tr>
 <tr>
  <td>
   <table style="margin-top:0px;">
   <tr><td valign="top"><?php if($_SESSION['login'] = true){ require_once("EWelcome.php"); } ?></td></tr>
   </table>
  </td>
 </tr>

<?php /********************** Start Start Start ******************************/ ?> 
<?php /********************** Start Start Start ******************************/ ?>
<tr>
 <td style="width:100%;vertical-align:top;">
 <center>
 <table border="0" align="center" style="width:85%;">
  <tr>
   <td style="text-align:center;height:40px;vertical-align:middle;font-family:Times New Roman;font-size:24px;">
   <div style="color:white;text-shadow:2px 5px 4px #FFFFFF;">
    <font style="color:#0000FF;"><b>VNR Impact [All Volume]</b></font>
   </div>
   </td>
  </tr>
  <tr>
   <td>
   <div style="height:550px; overflow:scroll;">
   <?php /******************/ ?>
   <?php /******************/ ?>
   <table border="0" style="width:100%;">
		
<tr>
 <td style="width:100%; border:hidden;">
  <table border="1" cellpadding="20" cellspacing="15" cellpadding="0" style="width:100%;"> 
   <tr> 
<?php $svE=mysql_query("select DISTINCT IVal,IImg,IUrl,IDocName from hrm_impact_document where ISts='Y' order by IVal DESC",$con); $no=0; $rowvE=mysql_num_rows($svE); while($vE=mysql_fetch_assoc($svE)){ $no=$no+1; ?>		
    <td align="center" style="width:16%;height:120px;vertical-align:middle;background-image:url(../AdminUser/VnrImpact/shelf_wood.png);" id="TD_<?php echo $no; ?>">
	
	<div style="color:white;text-shadow:2px 2px 4px #000000;">
	<?php if($vE['IVal']>0){ ?>
		  
	   <?php $Dir=''; 
		if($vE['IDocName']!=''){ $Dir="../AdminUser/VnrImpact/".$vE['IDocName']; }
		elseif($vE['IUrl']!=''){ $Dir=$vE['IUrl']; }
	   ?>
	   <a href="#" onClick="FUnImpact('<?=$Dir?>')"><img src="../AdminUser/VnrImpact/<?=$vE['IImg']?>" style="width:100px;height:120px;"/></a><br><br>
	   <a href="#" onClick="FUnImpact('<?=$Dir?>')" style="color:#FFFFFF;text-decoration:none;font-family:Times New Roman;font-size:14px;"><i><b>Volume-<?=$vE['IVal']?></b></i></a>
		   
	<?php } ?>
	</div>
	</td>
   <?php if($no%6==0) { ?></tr><tr> <?php } } ?>
   	
  </table>
 </td>
</tr> 		
		
  </table>
  <?php /******************/ ?>
  <?php /******************/ ?>
  </div>
   
   </td>
  </tr>
 
 </center>
 </td>
</tr>
<?php /********************** Close Close Close ******************************/ ?> 
<?php /********************** Close Close Close ******************************/ ?>
 
 
 <tr><td>&nbsp;</td></tr>
 <tr>
  <?php if($_SESSION['login'] = true){ ?>
  <td valign="top" style=""><?php require_once("../footer.php"); ?></td>
  <?php } ?>
 </tr>
</table>   
</body>
</html>

