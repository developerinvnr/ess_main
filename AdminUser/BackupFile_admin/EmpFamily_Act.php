<?php
require_once('config/config.php');

if($_POST['For']=='CovidVaccine' && $_POST['E']!='' && $_POST['ID']!='' && $_POST['vv']!='')
{ 
  if($_POST['t']==2){$t=$_POST['t'];}else{$t='';}
  if($_POST['P']=='F' OR $_POST['P']=='F2'){ $Du=mysql_query("update hrm_employee_family set Covid_VaccinF".$t."='".$_POST['vv']."' where EmployeeID=".$_POST['E']." and FamilyId=".$_POST['ID'],$con); }
  elseif($_POST['P']=='M' OR $_POST['P']=='M2'){ $Du=mysql_query("update hrm_employee_family set Covid_VaccinM".$t."='".$_POST['vv']."' where EmployeeID=".$_POST['E']." and FamilyId=".$_POST['ID'],$con); }
  elseif($_POST['P']=='W' OR $_POST['P']=='W2'){ $Du=mysql_query("update hrm_employee_family set Covid_VaccinW".$t."='".$_POST['vv']."' where EmployeeID=".$_POST['E']." and FamilyId=".$_POST['ID'],$con); }
  elseif($_POST['P']=='O' OR $_POST['P']=='O2'){ $Du=mysql_query("update hrm_employee_family2 set Covid_Vaccin".$t."='".$_POST['vv']."' where EmployeeID=".$_POST['E']." and Family2Id=".$_POST['ID'],$con); }
  elseif($_POST['P']=='S' OR $_POST['P']=='S2'){ $Du=mysql_query("update hrm_employee_general set Covid_Vaccin".$t."='".$_POST['vv']."' where EmployeeID=".$_POST['E'],$con); }

  if($Du){echo '<input type="hidden"  id="ChkV" value="1"  />'; }
  else{echo '<input type="hidden"  id="ChkV" value="0"  />'; }
  
  echo '<input type="hidden"  id="ChkVID" value='.$_POST['ID'].'  />';
  echo '<input type="hidden"  id="ChkVN" value='.$_POST['N'].'  />';
  echo '<input type="hidden"  id="ChkVP" value='.$_POST['P'].'  />'; 
  echo '<input type="hidden"  id="ChkVvv" value='.$_POST['vv'].'  />'; 
  
}

elseif($_REQUEST['For']=='CovidVaccineFile' && $_REQUEST['E']!='' && $_REQUEST['ID']!='' && $_REQUEST['vv']!='')
{ 


 if(isset($_POST['CertUpload']))
 {  
  
  $uploaded=0; $ext="";
  if((!empty($_FILES["Certificate"])) && ($_FILES['Certificate']['error'] == 0))
  {
   $filename=strtolower(basename($_FILES['Certificate']['name']));
   $fileSize=$_FILES['Certificate']['size'];
   $type = $_FILES['Certificate']['type'];
   $EmpPhoto  = addslashes (fread (fopen($_FILES["Certificate"]["tmp_name"], "r"), filesize ($_FILES["Certificate"]["tmp_name"])));
    
   $ext = substr($filename, strrpos($filename, '.') + 1);
   if($ext != "jpg" && $ext != "jpeg" && $ext != "pdf")
   {
	 echo '<script>alert("Error: Only jpg or pdf files is allowed"); 
	       document.getElementById("LoaderSection").style.display="none";</script>';
   }
   else
   { 
     $filename=$_POST['eid'].'_'.$_POST['Person'].'_'.$_POST['fid'].'.'.$ext;
	 $newname = dirname(__FILE__).'/../Employee/CovidCert/'.$filename; 
     if((move_uploaded_file($_FILES['Certificate']['tmp_name'],$newname)))
     { 
	   if($_POST['Person']=='S' || $_POST['Person']=='S2')
	   { $tbl='hrm_employee_general'; 
	     if($_POST['tt']==1){ $Qcon="Covid_Vaccin_file='".$filename."'"; }
		 else{ $Qcon="Covid_Vaccin2_file='".$filename."'"; }
		 $Q2con='1=1';
	   }	 
	   elseif($_POST['Person']=='F' || $_POST['Person']=='M' || $_POST['Person']=='W' || $_POST['Person']=='F2' || $_POST['Person']=='M2' || $_POST['Person']=='W2') 
	   { $tbl='hrm_employee_family';
	     if($_POST['tt']==1){ $Qcon="Covid_Vaccin".$_POST['Person']."_file='".$filename."'"; }
		 else{ $Qcon="Covid_Vaccin".$_POST['Person']."_file='".$filename."'"; }
		 $Q2con='1=1';
	   }
	   elseif($_POST['Person']=='O' || $_POST['Person']=='O2') 
	   { $tbl='hrm_employee_family2';
	     if($_POST['tt']==1){ $Qcon="Covid_Vaccin_file='".$filename."'"; }
		 else{ $Qcon="Covid_Vaccin2_file='".$filename."'"; }
	     $Q2con='Family2Id='.$_POST['fid'];
	   }
	   $Up = mysql_query("UPDATE ".$tbl." SET ".$Qcon." WHERE EmployeeID=".$_POST['eid']." AND ".$Q2con, $con);
	   if($Up){ echo '<script>alert("File uploaded successfully!"); window.close();</script>'; } 
     }
	} //else
  } //if((!empty($_FILES["Certificate"])) && ($_FILES['Certificate']['error'] == 0))
  else{ echo '<script>alert("Error:"); document.getElementById("LoaderSection").style.display="none";</script>'; }
 
 } //if(isset($_POST['CertUpload']))
  
  
?>
<style type="text/css">
/* Center the loader */
#loader {
  position: absolute;
  left: 50%;
  top: 50%;
  z-index: 1;
  width: 120px;
  height: 120px;
  margin: -76px 0 0 -76px;
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid #3498db;
  -webkit-animation: spin 2s linear infinite;
  animation: spin 2s linear infinite;
}

@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

/* Add animation to "page content" */
.animate-bottom {
  position: relative;
  -webkit-animation-name: animatebottom;
  -webkit-animation-duration: 1s;
  animation-name: animatebottom;
  animation-duration: 1s
}

@-webkit-keyframes animatebottom {
  from { bottom:-100px; opacity:0 } 
  to { bottom:0px; opacity:1 }
}

@keyframes animatebottom { 
  from{ bottom:-100px; opacity:0 } 
  to{ bottom:0; opacity:1 }
}

#myDiv {
  display: none;
  text-align: center;
}
</style>
<script type="text/javascript">
function FunLoader()
{
 document.getElementById("LoaderSection").style.display='block';
}
</script>
 <br /><br />
 <div id="LoaderSection" style="display:none;">
  <div id="loader" style="display:block;">
   <div style="display:block;font-family:Times New Roman;font-size:20px;" id="myDiv" class="animate-bottom">
    <h2>Please Wait!</h2>
    <p>Task under process..</p>
   </div>
  </div>
 </div>
 <table style="width:100%;" border="1">
  <tr><td style="height:30px;border:hidden;"></td></tr>
  <tr>
   <td style="text-align:center;font-size:20px;color:#8000FF;border:hidden;">Upload "<b><?php if($_REQUEST['P']=='F' OR $_REQUEST['P']=='F2'){$pp='Father';}elseif($_REQUEST['P']=='M' OR $_REQUEST['P']=='M2'){$pp='Mother';}elseif($_REQUEST['P']=='W' OR $_REQUEST['P']=='W2'){$pp='Spouse';}elseif($_REQUEST['P']=='S' OR $_REQUEST['P']=='S2'){$pp='Self';}elseif($_REQUEST['P']=='O' OR $_REQUEST['P']=='O2'){$pp=$_REQUEST['R'];} echo ucfirst(strtolower($pp)); ?></b>" Covid Vaccination Dose-<?=$_REQUEST['t']?> Certificate</td>
  </tr>
  <tr><td style="border:hidden;">&nbsp;</td></tr>
  <form enctype="multipart/form-data" name="Uform" method="post" onsubmit="FunLoader()">
   <input type="hidden" name="eid" value="<?=$_REQUEST['E']?>"/>
   <input type="hidden" name="Person" value="<?=$_REQUEST['P']?>"/>
   <input type="hidden" name="fid" value="<?=$_REQUEST['ID']?>"/>
   <input type="hidden" name="tt" value="<?=$_REQUEST['t']?>"/>
  <tr>
   <td style="text-align:center;border:hidden;"><font style="color:#0080FF;">Select Certificate:</font> &nbsp;<input type="file" name="Certificate" /></td>
  </tr>
  <tr><td style="border:hidden;">&nbsp;</td></tr>
  <tr>
   <td style="text-align:center;border:hidden;">
    <input type="submit" name="CertUpload" value="upload" style="width:100px;"/>
   </td>
  </tr>
  <tr>
   <td style="border:hidden;">&nbsp;</td>
  </tr>
  </form>
 </table>
  
<?php  
}
?>