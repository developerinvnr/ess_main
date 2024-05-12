<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}

if(isset($_POST['AddNew']))
{
  /******** File Upload **********/
  if((!empty($_FILES["IImg"])) && ($_FILES["IImg"]['error'] == 0)) 
  {
    $ImgN=strtolower(basename($_FILES["IImg"]['name']));
    $ext = substr($ImgN, strrpos($ImgN, '.') + 1);
    if($ext!= "jpg" && $ext!= "jpeg" && $ext!= "png")
    {
	 echo '<script>alert("Error: Only jpg or png image files is allowed"); 
	       document.getElementById("LoaderSection").style.display="none";
		   window.location="Up_VNRImpct.php";</script>';
    }
	else
	{
	  $ImgName='Vol'.$_POST['IVal'].'.png';
	  $Upload = dirname(__FILE__).'/VnrImpact/'.$ImgName;
	  if((move_uploaded_file($_FILES['IImg']['tmp_name'],$Upload))){ $ImgName=$ImgName; }
	  else { $ImgName=''; }
	}
  }
  
  if(isset($_FILES['IFile']))
  {
    $FileN=strtolower(basename($_FILES["IFile"]['name']));
    $extF = substr($FileN, strrpos($FileN, '.') + 1);
    if($extF!= "pdf")
    {
	 echo '<script>alert("Error: Only pdf files is allowed"); 
	       document.getElementById("LoaderSection").style.display="none";
		   window.location="Up_VNRImpct.php";</script>';
    }
	else
	{
	  $FileName='Vol'.$_POST['IVal'].'.'.$extF;
	  $Upload = dirname(__FILE__).'/VnrImpact/'.$FileName;
	  if((move_uploaded_file($_FILES['IFile']['tmp_name'],$Upload))){ $FileName=$FileName; }
	  else { $FileName=''; }
	  
	  
	  $qryI=mysql_query("insert into hrm_impact_document(ImpactId, CompanyId, IVal, IImg, IDocName, IUrl, ISts, CrBy, CrDate, SysDate) values(".$_POST['IVal'].", ".$CompanyId.", ".$_POST['IVal'].", '".$ImgName."', '".$FileName."', '".$_POST['IUrl']."', '".$_POST['ISts']."', ".$UserId.", '".date("Y-m-d")."', '".date("Y-m-d")."')",$con);
  
      if($qryI)
      {
       echo '<script>alert("Files add successfully");document.getElementById("LoaderSection").style.display="none";
             window.location="Up_VNRImpct.php";</script>'; 
      }
	  	  
	}
  }
  /******** File Upload **********/
     
} //if(isset($_POST['AddNew']))


if(isset($_POST['EditSave']))
{
  /******** File Upload **********/
  if((!empty($_FILES["IImg"])) && ($_FILES["IImg"]['error'] == 0)) 
  {
    $ImgN=strtolower(basename($_FILES["IImg"]['name']));
    $ext = substr($ImgN, strrpos($ImgN, '.') + 1);
    if($ext!= "jpg" && $ext!= "jpeg" && $ext!= "png")
    {
	 echo '<script>alert("Error: Only jpg or png image files is allowed"); 
	       document.getElementById("LoaderSection").style.display="none";
		   window.location="Up_VNRImpct.php";</script>';
    }
	else
	{
	  $ImgName='Vol'.$_POST['IVal'].'.png';
	  $Upload = dirname(__FILE__).'/VnrImpact/'.$ImgName;
	  if((move_uploaded_file($_FILES['IImg']['tmp_name'],$Upload))){ $ImgName=$ImgName; }
	  else { $ImgName=''; }
	}
  }
  
  if(isset($_FILES['IFile']))
  {
    $FileN=strtolower(basename($_FILES["IFile"]['name']));
    $extF = substr($FileN, strrpos($FileN, '.') + 1); 
    if($extF!="pdf")
    {
	 echo '<script>alert("Error: Only pdf files is allowed"); window.location="Up_VNRImpct.php";</script>';
    }
	else
	{
	  $FileName='Vol'.$_POST['IVal'].'.'.$extF;
	  //echo $FileName.'-'.$_POST['IVal'];
	  $Upload = dirname(__FILE__).'/VnrImpact/'.$FileName;
	  
	  if((move_uploaded_file($_FILES['IFile']['tmp_name'],$Upload))){ $FileName=$FileName; }
	  else { $FileName=''; }
	  
	  $qryU=mysql_query("update hrm_impact_document set IImg='".$ImgName."', IDocName='".$FileName."', IUrl='".$_POST['IUrl']."', ISts='".$_POST['ISts']."', CrBy=".$UserId.", SysDate='".date("Y-m-d")."' where ImpactId=".$_POST['ImpactId'],$con);
  
      if($qryU)
      {
        echo '<script>alert("File updated successfully"); window.location="Up_VNRImpct.php";</script>'; 
      }
	  
	}
  }
  /******** File Upload **********/
    
} //if(isset($_POST['EditSave']))

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
$(document).ready(function () { $("#table1").freezeHeader({ 'height': '550px' }); })

function ValidateNew(AddForm)
{
 var IFile = AddForm.IFile.value; var IUrl = AddForm.IUrl.value;
 if(IFile.length === 0 && IUrl.length === 0) { alert("Minimum any one required, Impact file or Url details!.");  
 return false; }
 else { document.getElementById("LoaderSection").style.display='block'; return true; }
}

function ValidateEdit(EditForm)
{
 var IFile = EditForm.IFile.value; var IUrl = EditForm.IUrl.value;
 if(IFile.length === 0 && IUrl.length === 0) { alert("Minimum any one required, Impact file or Url details!.");  
 return false; }
 else { document.getElementById("LoaderSection").style.display='block'; return true; }
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
		   <table border="0" width="80%">
			 <tr><td>
				    <table border="0">
		            <tr>
					   <td style="width:300px;" class="heading">
					   VNR Impact File 
					   &nbsp;&nbsp;&nbsp;&nbsp;
					   <a href="#" onClick="FunClick('A',0)" style="font-size:12px;">Add New</a>
					   </td>
		           </tr>
                   </table>
				</td>
			 </tr>
			 <tr>
			   <td valign="top" style="width:80%;"> 
<table border="1" id="table1" cellspacing="1" style="width:100%;">
 <div class="thead">
 <thead>
 <tr bgcolor="#7a6189">
  <td class="th" rowspan="2" style="width:5%;">Valume</td>
  <td class="th" colspan="2" style="width:30%;">Upload</td>
  <td class="th" rowspan="2" style="width:30%;">URL</td>
  <td class="th" rowspan="2" style="width:8%;">Status</td>
  <td class="th" rowspan="2" style="width:5%;">Action</td>
 </tr>
 <tr bgcolor="#7a6189">
  <td class="th" style="width:15%;">Image (102*122 Size)</td>
  <td class="th" style="width:15%;">File (Only PDF)</td>
 </tr>
 </thead>
 </div>
 <?php if($_REQUEST['act']=='new'){ 
 $sMx=mysql_query("select MAX(ImpactId) as MaxID from hrm_impact_document",$con); $rMx=mysql_fetch_assoc($sMx); ?>
 <form name="AddForm" method="post" enctype="multipart/form-data" onSubmit="return ValidateNew(this)">
 <tr style="background-color:#FFFFFF;height:22px;"> 
  <td class="tdc"><b>Vol - <?=$rMx['MaxID']+1?></b>
  <input type="hidden" id="IVal" name="IVal" value="<?=$rMx['MaxID']+1?>" readonly/></td>
  <td class="tdl"><input type="file" class="inp" id="IImg" name="IImg" required></td>
  <td class="tdl"><input type="file" class="inp" id="IFile" name="IFile" ></td>
  <td class="tdc"><input type="text" class="inp" id="IUrl" name="IUrl"></td>
  <td class="tdc"><select class="inp" id="ISts" name="ISts" style="background-color:#FFFFB0;"><option value="Y">Active</option><option value="N">Deactive</option></select></td>
  <td align="center"><input class="SaveButton" type="submit" name="AddNew"  value="" /></td>
 </tr>
 <?php } ?>
 </form>
 <?php $sql=mysql_query("select * from hrm_impact_document order by IVal DESC",$con); while($res=mysql_fetch_assoc($sql)){?>
 <div class="tbody">
 <tbody>
 <?php if($_REQUEST['act']=='edit' && $_REQUEST['id']==$res['ImpactId']){ ?>
 <form name="EditForm" method="post" enctype="multipart/form-data" onSubmit="return ValidateEdit(this)">
 <input type="hidden" id="ImpactId" name="ImpactId" value="<?=$res['ImpactId']?>" readonly/>
 <input type="hidden" id="IVal" name="IVal" value="<?=$res['IVal']?>" readonly/>
 <tr style="background-color:#FFFFFF;height:22px;"> 
  <td class="tdc">Vol - <?=$res['IVal']?></td>
  <td class="tdc"><input type="file" class="inp" id="IImg" name="IImg"/><?php if($res['IImg']!=''){echo '<font color="#000099"><b>Uploaded</b></font>';}?></td>
  <td class="tdc"><input type="file" class="inp" id="IFile" name="IFile" /><?php if($res['IDocName']!=''){echo '<font color="#000099"><b>Uploaded</b></font>';}?></td>
  <td class="tdc"><input type="text" class="inp" id="IUrl" name="IUrl" value="<?=$res['IUrl']?>"/></td>
  <td class="tdc"><select class="inpc" id="ISts" name="ISts" style="background-color:#FFFFB0;"><option value="Y" <?php if($res['ISts']=='Y'){echo 'selected';}?>>Active</option><option value="N" <?php if($res['ISts']=='N'){echo 'selected';}?>>Deactive</option></select></td>
  <td align="center" style="cursor:pointer;"><input class="SaveButton" type="submit" name="EditSave"  value="" /></td>
 </tr>
 </form>
 <?php }else{ ?>
 <tr style="background-color:#FFFFFF;height:22px;"> 
  <td class="tdc">Vol - <?=$res['IVal']?></td>
  <td class="tdc" style="padding:10px;"><?php if(file_exists("VnrImpact/".$res['IImg'])){?><img src="VnrImpact/<?=$res['IImg']?>" style="height:60px;width:40px;"/><?php } ?></td>
  <td class="tdc"><?php if(file_exists("VnrImpact/".$res['IDocName'])){?><a href="<?php echo 'VnrImpact/'.$res['IDocName']; ?>" target="_blank">Click</a><?php } ?></td>
  <td class="tdl"><a href="<?=$res['IUrl']?>" target="_blank"><?=$res['IUrl']?></a></td>
  <td class="tdc" style="color:<?php if($res['ISts']=='Y'){echo '';}else{echo '#FF0000';}?>;"><?php if($res['ISts']=='Y'){echo 'Active';}else{echo 'Deactive';}?></td>
  <td align="center" style="cursor:pointer;"><?php if($res['SysDate']==date("Y-m-d")){ ?><img src="images/edit.png" id="Edit_<?=$res['ImpactId']?>" onClick="FunClick('E',<?=$res['ImpactId']?>)"/><?php } ?></td>
 </tr>
 <?php } ?>
 
 </tbody>
 </div>
<?php } ?>

<script type="text/javascript" language="javascript">
function FunClick(v,id)
{  
  if(v=='A'){ window.location="Up_VNRImpct.php?act=new&id=0"; }
  else if(v=='E'){ window.location="Up_VNRImpct.php?act=edit&id="+id; }
  else if(v=='S')
  {
   var Tn = document.getElementById("Tn"+id).value; var Tc = document.getElementById("Tc"+id).value;
   var Te = document.getElementById("Te"+id).value; var Tp = document.getElementById("Tp"+id).value;
   var Ts = document.getElementById("Ts"+id).value;
   window.location="Up_VNRImpct.php?act=save_edit&id="+id+"&Tn="+Tn+"&Tc="+Tc+"&Te="+Te+"&Tp="+Tp+"&Ts="+Ts;
  }
  else if(v=='Sn')
  {
   var Tn = document.getElementById("STn").value; var Tc = document.getElementById("STc").value;
   var Te = document.getElementById("STe").value; var Tp = document.getElementById("STp").value;
   var Ts = document.getElementById("STs").value;
   window.location="Up_VNRImpct.php?act=save_new&id="+id+"&Tn="+Tn+"&Tc="+Tc+"&Te="+Te+"&Tp="+Tp+"&Ts="+Ts;
  }
}

</script>
<span id="SpnaChkDL"></span>

</table>
                 </td>	
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