<?php session_start();
require_once('../AdminUser/config/config.php');
$_SESSION['up']=$_REQUEST['action']; $_SESSION['P']=$_REQUEST['P']; $_SESSION['E']=$_REQUEST['E']; $_SESSION['Y']=$_REQUEST['Y'];
$sqlEC=mysql_query("select * from hrm_employee where EmployeeID=".$_SESSION['E'], $con); $resEC=mysql_fetch_assoc($sqlEC);
$Lenght=strlen($resEC['EmpCode']); 
if($Lenght==1){$FileN='000'.$resEC['EmpCode'];} 
elseif($Lenght==2){$FileN='00'.$resEC['EmpCode'];} 
elseif($Lenght==3){$FileN='0'.$resEC['EmpCode'];}
elseif($Lenght==4){$FileN=$resEC['EmpCode'];}

if(isset($_POST['AddUploadE']))
{ 
  $uploaded=0; $ext="";
  if((!empty($_FILES["ufile"])) && ($_FILES['ufile']['error'] == 0))
   {
   $filename =strtolower(basename($_FILES['ufile']['name']));
   $fileSize =$_FILES['ufile']['size'];
   if($fileSize > 1000000)
    {
	 $msgUp = "Your file is too large."; $ok=0;} 
     $ext = substr($filename, strrpos($filename, '.') + 1);
	 //$newfilename=$FileN.'_'.$filename;
	 $newfilename=$FileN.'_'.$_POST['UpFileName'].'.'.$ext;
     if ((($ext == "docx")||($ext == "doc")||($ext == "xls")||($ext == "xlsx")||($ext == "ppt")||($ext == "ods")||($ext == "odt")||($ext == "pdf")||($ext == "jpg")||($ext == "jpeg")) && ($_FILES["ufile"]["size"] < 1000000))
      {$ext=".".$ext;  $newname = dirname(__FILE__).'/KraUploadFile/'.$newfilename; //Determine the path to which we want to save this file
       if((move_uploaded_file($_FILES['ufile']['tmp_name'],$newname)))
        { $sqlUp=mysql_query("insert into hrm_employee_kra_uploadfile(EmployeeID,FileName,Ext,YearId) values(".$_SESSION['E'].",'".$newfilename."', '".$ext."', ".$_SESSION['Y'].")", $con); 

                if($sqlUp)
		  {	$msgUp="File uploaded successfully!";  } 
		 $uploaded=1;
		}
         else{$msgUp = "Error:!";}
      } 
      else { $msgUp = "Error: Only xls, xlsx, ods, odt, doc, jpg, pdf files is allowed less than 1000KB"; }
     } 
else {$msgUp = "Error! File is not uploaded!"; }
}

if($_REQUEST['action']=='delete')
{$sqlD=mysql_query("delete from hrm_employee_kra_uploadfile where FileKraId=".$_REQUEST['I'], $con); 
 //fopen("AppUploadFile/".$_REQUEST['FN']);
 unlink('KraUploadFile/'.$_REQUEST['FN']);
}
?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
</head>
<script type="text/javascript" language="javascript">
function SubForm()
{ var Name = document.getElementById("UpFileName").value; 
  var filter=/^[1-9a-zA-Z._ /]+$/; var test_bool = filter.test(Name);
  if (Name.length === 0) { alert("Please type name of uploaded file.");  return false; } 
  if(test_bool==false) { alert('Please Enter Only Alpha-Numeric,_ in file Name field');  return false; } 
}

function deleteMyfile(FN,EI,YI,I)
{ document.getElementById("up").style.display='none'; 
  window.location = "UploadKraFileEmp.php?action=delete&I="+I+"&E="+EI+"&Y="+YI+"&FN="+FN;
}

function OpenMyfile(v1,v2)
{window.open("MyKraFile.php?a=open&File="+v1+"&Ext="+v2,"MyKraFile","width=900,height=650"); }

</script>
<body class="body" background="images/pmsback.png">  
<center> 
<table class="table" border="0" width="640">
<tr><td colspan="3" align="center" style="font-family:Times New Roman; font-weight:bold; font-size:18px; color:#FFFFFF;">Upload KRA Related File</td></tr>
<tr><td colspan="3" align="" style="font-family:Times New Roman; font-weight:bold; font-size:16px; color:#2020FF;">
    &nbsp;<font color="#000000">EmpCode :&nbsp;</font><?php echo $resEC['EmpCode']; ?>&nbsp;&nbsp;<font color="#000000">Name :&nbsp;</font><?php echo $resEC['Fname'].' '.$resEC['Sname'].' '.$resEC['Lname']; ?>
	</td></tr>
<tr>
  <td><table><tr>
		 <form method="post" enctype="multipart/form-data" name="form1" id="form1" onSubmit="return SubForm()">
		 <td style="font-family:Times New Roman; font-size:14px; font-weight:bold; width:120px;">Upload file :&nbsp;</td>
		 <td><input type="file" size="35" name="ufile" id="ufile" style="width:300px;">
		 <INPUT TYPE="hidden" name="MAX_FILE_SIZE" value="1000000"></span></td>
 </tr>
 <tr>  
		 <td style="font-family:Times New Roman; font-size:14px; font-weight:bold; width:120px;">Name Of File :&nbsp;</td>
         <td><input type="text" name="UpFileName" id="UpFileName" style="width:310px;"></td>
         <td><input type="submit" name="AddUploadE" id="AddUplaodE" style="width:60px;text-align:center; background-color:#95CAFF;" value="Save"></span></td>
 </tr> 
  </form> 
  </table></td>		 
</tr>
<tr>
<td>
 <table>
   <tr bgcolor="#0079F2" style="height:21px; ">
     <td style="width:40px; font-family:Times New Roman; color:#FFFFFF; font-size:12px;" align="center"><b>Sno.</b></td>
	 <td style="width:400px; font-family:Times New Roman; color:#FFFFFF; font-size:12px;" align="center"><b>File Name</b></td>
	 <td style="width:80px; font-family:Times New Roman; color:#FFFFFF; font-size:12px;" align="center"><b>Read</b></td> 
	 <td style="width:80px; font-family:Times New Roman; color:#FFFFFF; font-size:12px;" align="center"><b>Delete</b></td>
   </tr>
 <?php $sqlCheck=mysql_query("select * from hrm_employee_kra_uploadfile where EmployeeID=".$_REQUEST['E']." AND YearId=".$_REQUEST['Y'], $con); $no=1;while($resCheck=mysql_fetch_array($sqlCheck)) { 
 $DBFileName=substr($resCheck['FileName'],5); ?>
   <tr bgcolor="#FFFFFF" style="height:21px;">
    <td style="width:40px; font-family:Times New Roman; font-size:12px;" align="center"><?php echo $no; ?></td>
	<td style="width:400px; font-family:Times New Roman; font-size:12px;" align="">&nbsp;<?php echo $DBFileName; ?></td>
	<td style="width:80px; font-family:Times New Roman; font-size:12px;" align="center">
 	<a href="#"><img src="<?php if($resCheck['Ext']=='.doc' OR $resCheck['Ext']=='.docx'){echo 'images/doc.png';} if($resCheck['Ext']=='.xls' OR $resCheck['Ext']=='.xlsx'){echo 'images/xls.png';} if($resCheck['Ext']=='.jpg' OR $resCheck['Ext']=='.jpeg'){echo 'images/jpg.png';} if($resCheck['Ext']=='.ods'){echo 'images/ods.png';} if($resCheck['Ext']=='.odt'){echo 'images/odt.png';} if($resCheck['Ext']=='.ppt'){echo 'images/ppt.png';} if($resCheck['Ext']=='.pdf'){echo 'images/pdf.png';}?>" border="0" onClick="OpenMyfile('<?php echo $resCheck['FileName']; ?>','<?php echo $resCheck['Ext']; ?>')" /></a></td> 
	<td style="width:80px; font-family:Times New Roman; font-size:12px;" align="center">
	<a href="#"><img src="images/deletefile.png" border="0" onClick="deleteMyfile('<?php echo $resCheck['FileName']; ?>', <?php echo $_SESSION['E']; ?>, <?php echo $_SESSION['Y']; ?>, <?php echo $resCheck['FileKraId']; ?>)" /></a></td>
   </tr>
 <?php $no++; } ?>  
 <tr> <td colspan="3"><font color="#014E05"  style='font-family:Times New Roman;' size="3"><b><span id="up"><?php echo $msgUp; ?></span></b></font>
      <font color="#A80000" style='font-family:Times New Roman;' size="3"><b><span id="delete"><?php echo $msgDel; ?></span></b></font>
 </td></tr>
 </table>
</td>
</tr>
</table>
</center>  
</body>
</html>

