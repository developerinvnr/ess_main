<?php include("config.php"); 

if(isset($_POST['ImpCrop']))
{   
    $name = $_FILES['crop']['name']; 
    $ext = pathinfo($name, PATHINFO_EXTENSION); 
    if(isset($name))
	{
      if(!empty($name))
	  {
        if($ext=='csv')
		{
          if(($handle = fopen($_FILES['crop']['tmp_name'], "r"))!== FALSE) 
          {
            $ctr = 1; // used to exclude the CSV header
            while(($data = fgetcsv($handle, 1000, ",")) !== FALSE)
            {
              $Company=mysql_real_escape_string($data[0]); 
              $EmpCode=mysql_real_escape_string($data[1]); 
              $JCId=mysql_real_escape_string($data[2]); 
			  
/*************************************************************/			  
/*************************************************************/
if($ctr>1)
{ 

echo "UPDATE hrm_employee SET JCId='".$JCId."' WHERE CompanyId='".$Company."' AND EmpCode = '".$EmpCode."'";
 $ins=mysql_query("UPDATE hrm_employee SET JCId='".$JCId."' WHERE CompanyId='".$Company."' AND EmpCode = '".$EmpCode."'",$con);
 if($ins){ echo '<script>alert("file import successfully"); window.close(); </script>'; }
 
}
else{ $ctr++; }
/*************************************************************/
/*************************************************************/
                    
            } //while
                  
            fclose($handle);
          }
            
        } //if($ext=='csv')
		else{ $msg='Please choose \'.csv\' file only !'; $msgcolor='#E14900'; }
      } //if(!empty($name))
	  else{ $msg='Please choose the file !'; $msgcolor='#E14900'; }
    } //if(isset($name)) 
} //if(isset($_POST['ImpCrop']))


?>

<center>
<script type="text/javascript">
function Validate(excelform)
{
  var agree=confirm("Are you sure?");
  if(agree)
  {
   document.getElementById('loaderDiv').style.display='block';
   return true;
  }
  else{ return false; }
}

</script>

<div id="loaderDiv" style="background-color: rgba(0,0,0,0.8);width: 100%;height: 100%;position: fixed;top:0px;left: 0px;font-size: 12px; display:none;">	
	<center>
	<span style="color:white;top: 50%;left:38%;position: absolute;">Please Wait, Uploading in Progress...<img src="loader.gif"></span>
	</center>
</div>


<form name="impcrop" enctype="multipart/form-data" method="post" onSubmit="return Validate(this)"/>
<table style="width:95%;" border="0">
<tr><td colspan="2" style="text-align:center;"><b>Import Crop</b></td></tr>
<tr style="height:20px;"><td></td></tr>
<tr><td colspan="2" style="text-align:center;">Select File (Only CSV)&nbsp;&nbsp;<a href="pp_crop_veriety.xlsx">Format</a></td></tr>
<tr style="height:10px;"><td></td></tr>
<tr>
  <td style="text-align:right;"><input type="file" style="width:98%;" name="crop" required/></td>
  <td style="text-align:left;"><input type="submit" name="ImpCrop" value="Upload" style="width:80px;" /></td>
</tr>
<tr style="height:10px;"><td></td></tr> 
</table>
</form>





</center>	 
