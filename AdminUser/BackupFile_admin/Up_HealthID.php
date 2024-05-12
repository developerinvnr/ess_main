<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}

  
// Check if form was submited
if(isset($_POST['submit'])) {
   
    if(!is_dir("../Employee/HealthIDCard/".$_POST["EC"]))
    {
	 mkdir("../Employee/HealthIDCard/".$_POST["EC"], 0777, true);
    } 
   
  
   
    // Configure upload directory and allowed file types
    $upload_dir = '../Employee/HealthIDCard/'.$_POST["EC"].DIRECTORY_SEPARATOR;
	
    $allowed_types = array('pdf');  //array('pdf', 'png', 'jpeg', 'gif');
      
    // Define maxsize for files i.e 2MB
    //$maxsize = 2 * 1024 * 1024; 
  
    // Checks if user sent an empty form 
    if(!empty(array_filter($_FILES['files']['name']))){
  
        // Loop through each file in files[] array
        foreach ($_FILES['files']['tmp_name'] as $key => $value) {
              
            $file_tmpname = $_FILES['files']['tmp_name'][$key];
            $file_name = $_FILES['files']['name'][$key];
            $file_size = $_FILES['files']['size'][$key];
            $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
  
            // Set upload file path
            $filepath = $upload_dir.$file_name;
  
            // Check file type is allowed or not
            if(in_array(strtolower($file_ext), $allowed_types)) {
  
                // Verify file size - 2MB max 
                //if ($file_size > $maxsize)         
                    //echo "Error: File size is larger than the allowed limit."; 
  
                // If file with name already exist then append time in
                // front of name of the file to avoid overwriting of file
                if(file_exists($filepath)) {
                    //$filepath = $upload_dir.time().$file_name;
                      
                    if( move_uploaded_file($file_tmpname, $filepath)) {
                        
						echo '<script>alert("file successfully uploaded"); 
		   window.location="Up_HealthID.php?d='.$_REQUEST['d'].'";</script>'; 
						
						//echo "{$file_name} successfully uploaded <br />";
                    } 
                    else {                     
                        echo "Error uploading {$file_name} <br />"; 
                    }
                }
                else {
                  
                    if( move_uploaded_file($file_tmpname, $filepath)) {
                        //echo "{$file_name} successfully uploaded <br />";
						echo '<script>alert("file successfully uploaded"); 
		   window.location="Up_HealthID.php?d='.$_REQUEST['d'].'";</script>';
                    }
                    else {                     
                        echo "Error uploading {$file_name} <br />"; 
                    }
                }
            }
            else {
                  
                // If file extention not valid
                echo "Error uploading {$file_name} "; 
                echo "({$file_ext} file type is not allowed)<br / >";
            } 
        }
    } 
    else {
          
        // If no files selected
        echo "No files selected.";
    }
} 
  
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
.inp{ font-family:Times New Roman;font-size:12px;color:#000000;width:100%; border:hidden; height:22px;}
.SaveButton {background-image:url(images/save.gif); width:20px; height:20px; background-repeat:no-repeat; background-color:#FFFFFF; border-color:#FFFFFF; border-bottom:inherit;}
.inpc{ font-family:Times New Roman;font-size:12px;text-align:center;color:#000000;width:100%; border:hidden;height:22px;}
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
<script src="js/jquery-1.9.1.js"></script>
<script type="text/javascript" src="js/jquery.freezeheader.js"></script>
<Script type="text/javascript">
$(document).ready(function () { $("#table1").freezeHeader({ 'height': '500px' }); })

function SelectDeptEmp(v)
{ 
  var x="Up_HealthID.php?d="+v; window.location=x; }

function ValidateNew(uForm)
{
 document.getElementById("LoaderSection").style.display='block'; return true;
}
</Script>     
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
<?php //*******************************************************************************************?>
<?php //****************START*****START*****START******START******START*************************************?>
<?php //*******************************************************************************************?>
	 
<div id="LoaderSection" style="display:none;">
  <div id="loader" style="display:block;">
   <div style="display:block;font-family:Times New Roman;font-size:20px;" id="myDiv" class="animate-bottom">
    <h2>Please Wait!</h2>
    <p>Task under process..</p>
   </div>
  </div>
</div>	 
	  
<table border="0" style="margin-top:0px; width:100%; height:450px;">
	<tr>
	    <td align="right" width="1%">&nbsp;</td>
		<?php if(($_SESSION['UserType']=='S' OR $_SESSION['UserType']=='A' OR $_SESSION['UserType']=='U') AND $_SESSION['login'] = true) { ?>
		
		<td width="100%" valign="top">
		   <table border="0" width="100%">
			 <tr><td>
				    <table border="0">
		            <tr>
					   <td style="width:300px;" class="heading">
					   Upload Health ID Insurance Card
					   &nbsp;&nbsp;&nbsp;&nbsp;
					   </td>
					   
					   <td class="tdr" style="width:120px;"><b>Department :</b></td>
					   <td class="tdc" style="width:130px;">
                       
                       <select style="font-size:11px; width:120px; height:21px; background-color:#DDFFBB; display:block;" name="DepartmentE" id="DepartmentE" onChange="SelectDeptEmp(this.value)"><?php if($_REQUEST['d'] AND $_REQUEST['d']!='') { if($_REQUEST['d']=='All'){$DN='ALL';} else { $SqlDep=mysql_query("select * from hrm_department where CompanyId=".$CompanyId." AND DepartmentId=".$_REQUEST['d'], $con); $ResDep=mysql_fetch_array($SqlDep); $DN=$ResDep['DepartmentCode']; }?><option value="<?php echo $_REQUEST['d']; ?>"><?php echo '&nbsp;'.$DN;?></option><?php } else { ?><option value="" style="margin-left:0px; background-color:#84D9D5;" selected>Select Department</option><?php } ?>   
<?php $SqlDepartment=mysql_query("select * from hrm_department where CompanyId=".$CompanyId." order by DepartmentName ASC", $con); while($ResDepartment=mysql_fetch_array($SqlDepartment)) { ?><option value="<?php echo $ResDepartment['DepartmentId']; ?>"><?php echo $ResDepartment['DepartmentCode'];?></option><?php } ?>
<option value="All" >ALL</option></select>
	  <input type="hidden" name="ComId" id="ComId" value="<?php echo $CompanyId; ?>" /> 
                      </td>
					   
		           </tr>
                   </table>
				</td>
			 </tr>
			 
			 <tr>
			   <td valign="top" style="width:60%;"> 
<table border="1" id="table1" cellspacing="1" style="width:100%;">
 <div class="thead">
 <thead>
 <tr bgcolor="#7a6189">
  <td class="th" style="width:5%;">Sn</td>
  <td class="th" style="width:5%;">EmpCode</td>
  <td class="th" style="width:22%;">Name</td>
  <td class="th" style="width:8%;">Department</td>
  <td class="th" style="width:10%;">Uploaded</td>
 </tr>
 </thead>
 </div> 
 <?php if($_REQUEST['d']=='All' || $_REQUEST['d']==''){ $deptCon="1=1"; }else{ $deptCon="g.DepartmentId=".$_REQUEST['d']; }
 $sql=mysql_query("select EmpCode,Fname,Sname,Lname,DepartmentCode from hrm_employee e inner join hrm_employee_general g on e.EmployeeID=g.EmployeeID inner join hrm_department d on g.DepartmentId=d.DepartmentId where e.EmpStatus='A' and ".$deptCon." and e.CompanyId=".$CompanyId." order by e.EmpCode ASC",$con);   $sn=1; while($res=mysql_fetch_assoc($sql)){?>
 <div class="tbody">
 <tbody>

 <tr style="background-color:#FFFFFF;height:22px;"> 
  <td class="tdc"><?=$sn?></td>
  <td class="tdc"><a href="Up_HealthID.php?ec=<?=$res['EmpCode']?>&d=<?=$_REQUEST['d']?>"><?=$res['EmpCode']?></a></td>
  <td class="tdl">&nbsp;<?=$res['Fname'].' '.$res['Sname'].' '.$res['Lname']?></td>
  <td class="tdl">&nbsp;<?=$res['DepartmentCode']?></td>
  <td class="tdc" style="color:#FFFFFF;background-color:<?php if(file_exists("../Employee/HealthIDCard/".$res['EmpCode']."/".$res['EmpCode']."_A.pdf")){ echo '#004000';}?>;cursor:pointer;">
  <?php 
    if(file_exists("../Employee/HealthIDCard/".$res['EmpCode']."/".$res['EmpCode']."_A.pdf")){?><a href="<?="../Employee/HealthIDCard/".$res['EmpCode']."/".$res['EmpCode']."_A.pdf";?>" target="_blank" style="color:#FFFFFF;">A</a><?php } 
	 
    if(file_exists("../Employee/HealthIDCard/".$res['EmpCode']."/".$res['EmpCode']."_B.pdf")){?>&nbsp;&nbsp;&nbsp;<a href="<?="../Employee/HealthIDCard/".$res['EmpCode']."/".$res['EmpCode']."_B.pdf";?>" target="_blank" style="color:#FFFFFF;">B</a><?php } 
	 
	if(file_exists("../Employee/HealthIDCard/".$res['EmpCode']."/".$res['EmpCode']."_C.pdf")){?>&nbsp;&nbsp;&nbsp;<a href="<?="../Employee/HealthIDCard/".$res['EmpCode']."/".$res['EmpCode']."_C.pdf";?>" target="_blank" style="color:#FFFFFF;">C</a><?php }  
	
	if(file_exists("../Employee/HealthIDCard/".$res['EmpCode']."/".$res['EmpCode']."_D.pdf")){?>&nbsp;&nbsp;&nbsp;<a href="<?="../Employee/HealthIDCard/".$res['EmpCode']."/".$res['EmpCode']."_D.pdf";?>" target="_blank" style="color:#FFFFFF;">D</a><?php }  
  ?>
  </td>
 </tr>
 </tbody>
 </div>
<?php $sn++; } ?>

<span id="SpnaChkDL"></span>

</table>
                 </td>	
				 
				 
<?php /***********************/ ?>
<?php /***********************/ ?>				 
				 <td valign="top" style="width:40%; "> 
<?php if($_REQUEST['ec']>0){ ?>				 
<table style="width:100%;">
 <?php $sE=mysql_query("select EmpCode,Fname,Sname,Lname,DepartmentCode from hrm_employee e inner join hrm_employee_general g on e.EmployeeID=g.EmployeeID inner join hrm_department d on g.DepartmentId=d.DepartmentId where e.EmpCode=".$_REQUEST['ec']." and e.CompanyId=".$CompanyId." order by e.EmpCode ASC",$con); $rE=mysql_fetch_assoc($sE); ?>
 <tr>
  <td style="text-align:center; height:60px; vertical-align:top; font-family:Times New Roman; font-size:18px;">
   <?=$rE['EmpCode'].' / '.$rE['Fname'].' '.$rE['Sname'].' '.$rE['Lname'].'<br> ( '.$rE['DepartmentCode'].' )'?> 
  </td>
 </tr>
 
 <tr>
  <td style="background-color:#FEFBB8; vertical-align:top; text-align:center; font-family:Times New Roman;">				 
<form name="uForm" method="POST" enctype="multipart/form-data" onSubmit="return ValidateNew(uForm)">
  <h2>Upload Files</h2>
   <p>Select files to upload: <br /><br />
      <input type="file" name="files[]" multiple>
	  <input type="hidden" name="EC" value="<?=$_REQUEST['ec']?>" />
	  <input type="hidden" name="DD" value="<?=$_REQUEST['d']?>" />
      <br><br>
      <input type="submit" name="submit" value="Upload" >
   </p>
</form>
  </td>
 </tr>
 <tr>
  <td style="text-align:center; height:150px; vertical-align:middle; font-family:Times New Roman; font-size:18px;">
   <b>File Formate:</b> <br>
   <i style="color:#97004B;">
    EmployeeCode_A.pdf (Self)<br> 
	EmployeeCode_B.pdf (Spouse) <br> 
	EmployeeCode_C.pdf (Child-1) <br> 
	EmployeeCode_D.pdf (Child-2) 
   </i>
  </td>
 </tr>
</table> 
<?php } ?>  
				 </td>
<?php /***********************/ ?>
<?php /***********************/ ?>				 
				 
				 </tr>
				
		   </table>  		
		</td>
		
        <?php } ?>
		<?php //-------------------------------------------------------------------------------------------------------- ?>
		
		<td align="left" width="20%">&nbsp;</td>
	</tr>
</table>
		
<?php //****************************************************************************************?>
<?php //*************END*****END*****END******END******END**********************?>
<?php //******************************************************************************************?>
		
	  </td>
	</tr>
	
  </table>
 </td>
</tr>
</table>
</body>
</html>
















