<?php require_once('../user/config/config.php'); ?>
<?php 
if(isset($_POST['savedocdetails']))
{

 if((!empty($_FILES["photo"])) && ($_FILES['photo']['error']==0))
  { $photoN=strtolower(basename($_FILES['photo']['name']));
    $photoExt=substr($photoN, strrpos($photoN, '.') + 1);
	$photoName='CLm'.$_POST['fid'].'_'.$_POST['m'].'_'.$_POST['y'].'.'.$photoExt;
	$photoPath='ExpenseImg/'.$photoName;
    move_uploaded_file($_FILES["photo"]["tmp_name"],$photoPath);
  } else {$photoName='';}
 
 
 $sqlchk=mysql_query("select * from fa_salary where FaId=".$_POST['fid']." AND Month=".$_POST['m']." AND Year=".$_POST['y'],$con); $rowchk=mysql_num_rows($sqlchk);
 if($rowchk==0)
 { $sqlIns=mysql_query("insert into fa_salary(FaId, Month, Year, ClmImag) values(".$_POST['fid'].", ".$_POST['m'].", ".$_POST['y'].", '".$photoName."')",$con); }
 else{ $sqlIns=mysql_query("update fa_salary set ClmImag='".$photoName."' where FaId=".$_POST['fid']." AND Month=".$_POST['m']." AND Year=".$_POST['y'],$con); }

 if($sqlIns){echo '<script>alert("File upload successfully"); window.close();</script>';} 
 
}

?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style>
.htf{font-family:Times New Roman;;color:#000;font-weight:bold;text-align:center;font-size:18px;height:24px;}
.tdf{font-family:Times New Roman;font-size:14px;height:22px;color:#000000;}
.tdf2{background-color:#FFFF9D;font-family:Times New Roman;;font-size:15px;height:22px;text-align:center;}
.CalenderButton {background-image:url(images/CalenderBtn.jpeg);width:16px;height:16px;background-color:#E0DBE3;border-color:#FFFFFF;}
</style>
<body style="background-color:#FFFFFF;">
<?php $m=$_REQUEST['m']; $y=$_REQUEST['y']; 
if($m==1){$Month='January';}elseif($m==2){$Month='February';}elseif($m==3){$Month='March';}elseif($m==4){$Month='April';}elseif($m==5){$Month='May';}elseif($m==6){$Month='June';}elseif($m==7){$Month='July';}elseif($m==8){$Month='August';}elseif($m==9){$Month='September';}elseif($m==10){$Month='October';}elseif($m==11){$Month='November';}elseif($m==12){$Month='December';} 

?>

<link rel="stylesheet" type="text/css" href="src/css/jscal2.css"/><?php /* Calander Open */?>
<link rel="stylesheet" type="text/css" href="src/css/border-radius.css"/>
<link rel="stylesheet" type="text/css" href="src/css/steel/steel.css"/>
<script type="text/javascript" src="src/js/jscal2.js"></script>
<script type="text/javascript" src="src/js/lang/en.js"></script><?php /* Calander Close */?>	
<script type="text/javascript" language="javascript">
function validate(fn) 
{ 
 document.getElementById("loaderDiv").style.display='block'; 
}
</script>
<center>
<div id="loaderDiv" style="background-color: rgba(0,0,0,0.8);width: 100%;height: 100%;position: fixed;top:0px;left: 0px;font-size: 12px; display:none;">	
	<center>
	<span style="color:white;top: 50%;left:10%;position: absolute;">Please Wait, Uploading in Progress...<img src="images/loading.gif"></span>
	</center>
</div>
<table border="0" style="margin-top:100px;width:98%;">
<tr>
 <td style="width:100%;" align="center">
  <table border="0" style="width:99%;">
   <tr><td style="width:100%;" align="center"><b>Upload Customer Letter</b></td></tr>
   <tr><td style="height:20px;color:#0069D2;" align="center"><b><?php echo $Month.' '.$_REQUEST['y']; ?></b></td></tr>
   <tr>
    <td class="tdf" align="center">	
    <table border="1" cellpadding="0" cellspacing="0">
<form name="fn" method="post" enctype="multipart/form-data" onSubmit="return validate(this)" >
<input type="hidden" name="fid" value="<?php echo $_REQUEST['fid']; ?>" />
<input type="hidden" name="m" value="<?php echo $_REQUEST['m']; ?>" />
<input type="hidden" name="y" value="<?php echo $_REQUEST['y']; ?>" />	
<input type="hidden" name="hq" value="<?php echo $_REQUEST['hq']; ?>" />
<input type="hidden" name="s" value="<?php echo $_REQUEST['s']; ?>" /> 
<input type="hidden" name="md" value="<?php echo $_REQUEST['md']; ?>" />
<input type="hidden" name="sn" value="<?php echo $_REQUEST['sn']; ?>" />
     <tr style="background-color:#FFFFFF;height:24px;">
	  <td class="tdf" valign="top"><input type="file" class="InputSel" id="photo" name="photo" readonly></td>
	  
	 </tr>	
	 <tr>
	  <td colspan="4" class="tdf" valign="top" align="center"><input type="submit" name="savedocdetails" value="upload" style="width:60px;" /></td>
	 </tr> 
</form>	 
	</table>
	</td>
  </table>
 </td>
</tr>
</table>
</center>

</body>