<?php require_once('../AdminUser/config/config.php');  ?>
<?php $EI=$_REQUEST['EI']; $YId=$_REQUEST['YI'];
if(isset($_POST['EditSignE']))
{  
  $maxImageSize = 11000;  //10,240-20kb, //51,200-50kb, 65,597-64kb, 1,31,072-128kb, 2,62,144-256kb, 5,24,288-512kb, 10,48,576-1mb
  $size = $_FILES['EmpSign']["size"];
  $path = $_FILES['EmpSign']['tmp_name'];
  $type = $_FILES['EmpSign']['type'];
  $EmpSign  = addslashes (fread (fopen($_FILES["EmpSign"]["tmp_name"], "r"), filesize ($_FILES["EmpSign"]["tmp_name"])));
  if($size>$maxImageSize){$msg = "File size can't be more than 20 kb";}
  else { //echo "UPDATE hrm_employee_investment_declaration SET SignType='".$type."',Sign='".$EmpSign."' WHERE YearId=".$YId." AND EmployeeID=".$EI;
         $SqlInsSign = mysql_query("UPDATE hrm_employee_investment_declaration SET SignType='".$type."',Sign='".$EmpSign."' WHERE YearId=".$YId." AND EmployeeID=".$EI, $con);
         if($SqlInsSign) { echo '<script>alert("Photo has been Updated successfully..."); window.close();</script>'; } 
       }

}
?>	  
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Employee Sign Images</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="../AdminUser/css/body.css" rel="stylesheet"/>
<link type="text/css" href="../AdminUser/css/pro_dropdown_3.css" rel="stylesheet"/>
<script type="text/javascript" language="javascript">
function validate(formSign) 
{ 
  var EmpSign = formSign.EmpSign.value; 
  if (EmpSign.length === 0) { alert("Please Select Signature images.");  return false; }
   <!----------------Check PHOTO Validation--------------------------------->
  var ext = EmpPhoto.substring(EmpPhoto.lastIndexOf('.') + 1);
  if(ext == "gif" || ext == "GIF" || ext == "JPEG" || ext == "jpeg" || ext == "jpg" || ext == "JPG" || ext == "bmp" || ext == "BMP")
  {return true;} else { alert("Upload gif,bmp or jpg images only"); return false; }
  
 
   <!----------------Check PHOTO Validation Close--------------------------------->
}  
</script>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" bgcolor="#E0DBE3">	
<table style="vertical-align:top;" width="480" align="center" border="0">
<form name="formSign" enctype="multipart/form-data" method="post" onSubmit="return validate(this)">
<tr> 
<td align="left" valign="top">
<table border="0" width="450" id="TEmp" style="display:block;">
<tr> 
<td style="font-family:Times New Roman; font-size:15px;" valign="top">Sign Image :</td>
<td style="width:250px;" valign="top"><input type="file" name="EmpSign" id="EmpSign" size="25" style="width:250px; height:23px;">&nbsp;</td>
<td style="width:100px;" valign="top"><input type="submit" name="EditSignE" id="EditSignE" style="width:90px; height:23px;" value="Save"></td> 
</tr>
<tr> 
<td class="All_100" valign="top">&nbsp;</td><td class="All_250" style="font-family:Times New Roman; color:#FF0000; font-size:14px;">&nbsp;Maximum Image Size : 20kb<br><br></td> 
</tr>
</form>
</table>
</td>
</tr>
</table>
</body>
</html>
