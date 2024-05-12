<?php require_once('../user/config/config.php'); ?>
<?php 
if(isset($_POST['savedocdetails']))
{

 if((!empty($_FILES["photo"])) && ($_FILES['photo']['error']==0))
  { $photoN=strtolower(basename($_FILES['photo']['name']));
    $photoExt=substr($photoN, strrpos($photoN, '.') + 1);
	$photoName='Cu'.$_POST['e'].'_'.$_POST['m'].'_'.$_POST['y'].'.'.$photoExt;
	$photoPath='DocateImg/'.$photoName;
    move_uploaded_file($_FILES["photo"]["tmp_name"],$photoPath);
  } else {$photoName='';}
 
 $sql=mysql_query("select * from fa_courierdetail where EmployeeID=".$_POST['e']." AND Month=".$_POST['m']." AND Year=".$_POST['y'],$con); $row=mysql_num_rows($sql);
 if($row==0){ echo "insert into fa_courierdetail(EmployeeID, Month, Year, PostDate, DocateNo, Agency, CuImag) values(".$_POST['e'].", ".$_POST['m'].", ".$_POST['y'].", '".date("Y-m-d",strtotime($_POST['PostDate']))."', '".$_POST['DocateNo']."', '".$_POST['Agency']."', '".$photoName."')"; $up=mysql_query("insert into fa_courierdetail(EmployeeID, Month, Year, PostDate, DocateNo, Agency, CuImag) values(".$_POST['e'].", ".$_POST['m'].", ".$_POST['y'].", '".date("Y-m-d",strtotime($_POST['PostDate']))."', '".$_POST['DocateNo']."', '".$_POST['Agency']."', '".$photoName."')",$con); }else{ $up=mysql_query("update fa_courierdetail set PostDate='".date("Y-m-d",strtotime($_POST['PostDate']))."', DocateNo='".$_POST['DocateNo']."', Agency='".$_POST['Agency']."', CuImag='".$photoName."' where EmployeeID=".$_POST['e']." AND Month=".$_POST['m']." AND Year=".$_POST['y'],$con); }
 if($up){echo '<script>alert("Courier details save successfully..!");</script>';}
 
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

$schk=mysql_query("select * from fa_courierdetail where EmployeeID=".$_REQUEST['e']." AND Month=".$_REQUEST['m']." AND Year=".$_REQUEST['y'],$con); $rchk=mysql_num_rows($schk);
if($rchk==0){ ?>

<link rel="stylesheet" type="text/css" href="src/css/jscal2.css"/><?php /* Calander Open */?>
<link rel="stylesheet" type="text/css" href="src/css/border-radius.css"/>
<link rel="stylesheet" type="text/css" href="src/css/steel/steel.css"/>
<script type="text/javascript" src="src/js/jscal2.js"></script>
<script type="text/javascript" src="src/js/lang/en.js"></script><?php /* Calander Close */?>	
<script type="text/javascript" language="javascript">
function validate(fn) 
{ 
if(document.getElementById("PostDate").value.length===0){ alert("please enter post date."); return false; }
else if(document.getElementById("DocateNo").value.length===0){ alert("please enter docate number."); return false; } 
else if(document.getElementById("Agency").value.length===0){ alert("please enter agency details."); return false; } 
else { var agree=confirm("Are you sure?"); if(agree){return true;}else{return false;} }
}
</script>
<center>
<table border="0" style="margin-top:100px;width:98%;">
<tr>
 <td style="width:100%;" align="center">
  <table border="0" style="width:99%;">
   <tr><td style="width:100%;" align="center"><b>Please Fill Courier Details</b></td></tr>
   <tr><td style="height:20px;color:#0069D2;" align="center"><b><?php echo $Month.' '.$_REQUEST['y']; ?></b></td></tr>
   <tr>
    <td class="tdf" align="center">	
    <table border="1" cellpadding="0" cellspacing="0">
	 <tr>
	  <td class="tdf2" style="width:150px;"><b>Post Date</b></td>
	  <td class="tdf2" style="width:150px;"><b>Docket No</b></td>
	  <td class="tdf2" style="width:250px;"><b>Agency</b></td>
	  <td class="tdf2" style="width:250px;"><b>Doc Image</b></td>
	 </tr> 
<form name="fn" method="post" enctype="multipart/form-data" onSubmit="return validate(this)" >
<input type="hidden" name="e" value="<?php echo $_REQUEST['e']; ?>" />
<input type="hidden" name="m" value="<?php echo $_REQUEST['m']; ?>" />
<input type="hidden" name="y" value="<?php echo $_REQUEST['y']; ?>" />	 
     <tr style="background-color:#FFFFFF;height:24px;">
	  <td class="tdf" valign="top" align="center"><input name="PostDate" id="PostDate" style="font-family:Georgia;font-size:12px;width:100px;text-align:center;" value="<?php echo date("d-m-Y"); ?>" readonly><button id="f_btn1" class="CalenderButton"></button><script type="text/javascript">  var cal = Calendar.setup({ onSelect: function(cal) { cal.hide()}, showTime: true }); cal.manageFields("f_btn1", "PostDate", "%d-%m-%Y");</script></td>
	  <td class="tdf" valign="top"><input name="DocateNo" id="DocateNo" style="font-family:Georgia;font-size:12px;width:100%;"></td>
	  <td class="tdf" valign="top"><input name="Agency" id="Agency" style="font-family:Georgia;font-size:12px;width:100%;"></td>
	  <td class="tdf" valign="top"><input type="file" class="InputSel" id="photo" name="photo" readonly></td>
	  
	 </tr>	
	 <tr>
	  <td colspan="4" class="tdf" valign="top" align="center"><input type="submit" name="savedocdetails" value="save" style="width:60px;" /></td>
	 </tr> 
</form>	 
	</table>
	</td>
  </table>
 </td>
</tr>
</table>
</center>
<?php } else { $res=mysql_fetch_assoc($schk); ?>
<center>
<table border="0" style="margin-top:50px;width:98%;">
<tr>
 <td style="width:100%;" align="center">
  <table border="0" style="width:99%;">
   <tr><td style="width:100%;font-size:18px;" align="center"><b>Courier Details</b></td></tr>
   <tr><td style="height:20px;color:#0069D2;" align="center"><b><?php echo $Month.' '.$_REQUEST['y']; ?></b></td></tr>
   <tr><td>&nbsp;</td></tr>
   <tr>
    <td class="tdf" align="center">	
    <table border="0" cellpadding="0" cellspacing="0">
	 <tr>
	  <td class="tdf" style="width:100px;"><b>Post Date</b></td>
	  <td align="center" style="width:50px;">:</td>
	<td style="font-family:Georgia;font-size:12px;width:250px;"><?php echo date("d-m-Y",strtotime($res['PostDate'])); ?></td>
	 </tr>
	 <tr> 
	  <td class="tdf"><b>Docate No</b></td>
	  <td align="center" style="width:50px;">:</td>
	  <td style="font-family:Georgia;font-size:12px;"><?php echo strtoupper($res['DocateNo']); ?></td>
	 </tr>
	 <tr> 
	  <td class="tdf"><b>Agency</b></td>
	  <td align="center" style="width:50px;">:</td>
	  <td style="font-family:Georgia;font-size:12px;"><?php echo strtoupper($res['Agency']); ?></td> 
	 </tr>
	 <tr> 
	  <td class="tdf"><b>Image</b></td>
	  <td align="center" style="width:50px;">:</td>
	  <td style="font-family:Georgia;font-size:12px;"><?php if($res['CuImag']!=''){?><a href="DocateImg/<?php echo $res['CuImag'];?>" target="_top">Click</a><?php } ?></td> 
	 </tr>
	 <tr> 
	  <td class="tdf"><b>Receving Date</b></td>
	  <td align="center" style="width:50px;">:</td>
	  <td style="font-family:Georgia;font-size:12px;"><?php if($res['RecevingDate']!='1970-01-01' AND $res['RecevingDate']!='0000-00-00' AND $res['RecevingDate']!=''){echo date("d-m-Y",strtotime($res['RecevingDate']));}else{echo '<font color="#FF5555">Pending...</font>';} ?></td> 
	 </tr>
	 <tr> 
	  <td class="tdf"><b>Verified Date</b></td>
	  <td align="center" style="width:50px;">:</td>
	  <td style="font-family:Georgia;font-size:12px;"><?php if($res['VerifDate']!='1970-01-01' AND $res['VerifDate']!='0000-00-00' AND $res['VerifDate']!=''){echo date("d-m-Y",strtotime($res['VerifDate']));}else{echo '<font color="#FF5555">Pending...</font>';} ?></td> 
	 </tr> 
	 <tr> 
	  <td class="tdf"><b>CN Issue Date</b></td>
	  <td align="center" style="width:50px;">:</td>
	  <td style="font-family:Georgia;font-size:12px;"><?php if($res['CNIssueDate']!='1970-01-01' AND $res['CNIssueDate']!='0000-00-00' AND $res['CNIssueDate']!=''){echo date("d-m-Y",strtotime($res['CNIssueDate']));}else{echo '<font color="#FF5555">Pending...</font>';} ?></td> 
	 </tr>
	</table>
	</td>
  </table>
 </td>
</tr>
</table>
</center>
<?php } ?>
</body>