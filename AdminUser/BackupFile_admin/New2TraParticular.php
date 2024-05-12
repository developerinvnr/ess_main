<?php session_start();
require_once('config/config.php');
//**********************************************************************************************************************
if(isset($_POST['SaveNew']))
{  $SqlInseart = mysql_query("INSERT INTO hrm_company_training_particular(Particular,CompanyId,CreatedBy,CreatedDate,YearId) VALUES('".$_POST['Particular']."','".$_POST['c']."', '".$_POST['u']."','".date('Y-m-d')."','".$_POST['yi']."')", $con); 
   if($SqlInseart){ $msg = "Data Save Successfully..."; }
}
if(isset($_POST['SaveEdit']))
{  $SqlUpdate = mysql_query("UPDATE hrm_company_training_particular SET Particular='".$_POST['Particular']."', CreatedBy='".$_POST['u']."', CreatedDate='".date('Y-m-d')."', YearId='".$_POST['yi']."' WHERE ParticularId=".$_POST['ParticularId'], $con);
   if($SqlUpdate){ $msg = "Data Save Successfully...";}
	  
}

/*
if(isset($_REQUEST['action']) && $_REQUEST['action']=="delete")
{
  $SqlDelete=mysql_query("delete from hrm_company_training_particular WHERE ParticularId=".$_REQUEST['did'], $con) or die(mysql_error());
  if($SqlDelete) { $msg = "Data Deleted Successfully..."; }
}
*/

?>
<html>
<head>
<title><?php include_once('../Title.php'); ?>&nbsp;Company Particular</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<style> .font { color:#ffffff; font-family:Times New Roman; font-size:15px; width:200px;} .font1 { font-family:Times New Roman; font-size:12px; height:14px; width:200px; } 
.font2 { font-size:12px;width:260px;height:18px;} .font4 { color:#1FAD34;font-family:Times New Roman; font-size:14px;}
.span {display:none; font-family:Courier New; font-size:14px; }.span1 {display:block; font-family:Courier New; font-size:14px; }
.fontButton { background-color:#7a6189; color:#009393; font-family:Georgia; font-size:12px;}
.SaveButton {background-image:url(images/save.gif); width:20px; height:20px; background-repeat:no-repeat; background-color:#FFFFFF; border-color:#FFFFFF; border-bottom:inherit;}
.EditSelect { font-family:Georgia; font-size:12px; height:18px;}
.EditInput { font-family:Georgia; font-size:12px; height:18px;}
.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}
</style>
<Script type="text/javascript">window.history.forward(1);</Script>
<Script>
function edit(value,c,u,yi) { var agree=confirm("Are you sure you want to edit this record?");
if (agree) { var x = "New2TraParticular.php?action=edit&eid="+value+"&c="+c+"&u="+u+"&yi="+yi;  window.location=x;}}
function del(value,c,u,yi) { var agree=confirm("Are you sure you want to delete this record?");
if (agree) { var x = "New2TraParticular.php?action=delete&did="+value+"&c="+c+"&u="+u+"&yi="+yi;  window.location=x;}}
function newsave(c,u,yi) { var x = "New2TraParticular.php?action=newsave&c="+c+"&u="+u+"&yi="+yi;  window.location=x;}
</SCRIPT> 
</head>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" class="body">
<center> 
<table border="0" style="margin-top:0px; width:100%;">
 <tr>
  <td align="center" height="20" valign="top" colspan="3">
   <table border="0" align="left">
    <tr>
	  <td align="left" width="180" class="heading">&nbsp;&nbsp;&nbsp;Training Particular</td>
	  <td class="font4" style="left">&nbsp;&nbsp;<b><?php echo $msg; ?></b></td>
	</tr>
   </table>
  </td>
 </tr>
 <tr>
 <td width="10">&nbsp;</td>
<?php //*********************************************** Open Department******************************************************?> 
<td align="left" id="type" valign="top" style="display:block; width:100%">             
   <table border="0" width="390">
   
	<tr>
	  <td align="left" width="390">
	     <table border="1" width="390" border="1" bgcolor="#FFFFFF">
 <tr bgcolor="#7a6189">
   <td align="center" style="font:Georgia; color:#FFFFFF; font-size:11px; width:50px;" valign="top"><b>SNo</b></td>
   <td class="font" align="center" style="width:300px;" valign="top"><b>Particular</b></td>
   <td valign="top" align="center" style="font:Georgia; font-size:11px; width:50px; color:#FFFFFF"><b>Action</b></td>
 </tr>
<?php $sqlP=mysql_query("select * from hrm_company_training_particular where CompanyId=".$_REQUEST['c'], $con); $SNo=1; while($resP=mysql_fetch_array($sqlP)) {
if(isset($_REQUEST['action']) && $_REQUEST['action']=="edit" && $_REQUEST['eid']==$resP['ParticularId']){ ?>
  <form name="formEdit" method="post" onSubmit="return validateEdit(this)">	
  <tr>
   <td align="center" style="font:Georgia; font-size:12px; width:50px;" valign="top"><?php echo $SNo; ?></td>
   <td class="font" style="width:300px;" align="left" valign="top"><input name="Particular" id="Particular" class="EditInput" value="<?php echo $resP['Particular']; ?>" style="width:290px;" /></td>  
   <td align="center" valign="middle" style="font:Georgia; font-size:11px; width:50px;" valign="top">
 &nbsp;<input type="submit" name="SaveEdit"  value="" class="SaveButton">&nbsp;<input type="hidden" name="ParticularId" id="ParticularId" value="<?php echo $_REQUEST['eid']; ?>"/>
   </td>
 </tr>
		 </form>
		 
<?php } else { ?>	 
		  <tr>
		   <td align="center" style="font:Times New Roman; font-size:12px; width:50px;"><?php echo $SNo; ?></td>
		   <td class="font1" style="width:300px;" align="left">&nbsp;<?php echo $resP['Particular']; ?></td>
		   <td align="center" valign="middle" style="font:Georgia; font-size:12px; width:50px;">
			 <a href="#"><img src="images/edit.png" border="0" alt="Edit" onClick="edit(<?php echo $resP['ParticularId'].', '.$_REQUEST['c'].', '.$_REQUEST['u'].', '.$_REQUEST['yi']; ?>)"></a>
			 <?php /*
			 &nbsp;&nbsp;
			 <a href="#"><img src="images/delete.png" alt="Delete" border="0" onClick="del(<?php echo $resP['ParticularId'].', '.$_REQUEST['c'].', '.$_REQUEST['u'].', '.$_REQUEST['yi']; ?>)"></a> */ ?>
		   </td>
		 </tr>
<?php } $SNo++;} ?>
         <tr><td bgcolor="#B6E9E2" colspan="10"></td></tr>
		 <?php if(isset($_REQUEST['action']) && $_REQUEST['action']=="newsave"){ ?>
		 <form name="formEdit" method="post" onSubmit="return validateEdit(this)">
	     <tr>
		   <td align="center" style="font:Times New Roman; font-size:11px; width:50px;"><?php echo $SNo; ?>
		   <input type="hidden" name="u" value="<?php echo $_REQUEST['u']; ?>" />
		   <input type="hidden" name="c" value="<?php echo $_REQUEST['c']; ?>" />
		   <input type="hidden" name="y" value="<?php echo $_REQUEST['yi']; ?>" />
		   </td>
		   <td class="font1" style="width:300px;" align="left" align="left"><input name="Particular" id="Particular" class="EditInput" style="width:290px;" value=""></td>
		   <td align="center" valign="middle" style="font:Georgia; font-size:11px; width:50px;">
			 &nbsp;<input type="submit" name="SaveNew"  value="" class="SaveButton">&nbsp;
		   </td>
		 </tr>
		 </form>
		 <?php } ?>
		     
			
		 </table>
	  </td>
    </tr>
	  
   <tr>
      <td align="Right" class="fontButton"><table border="0" width="350">
		<tr><td align="right">
		<input type="button" style="width:60px;" name="NewSave" id="NewSave" value="new" onClick="newsave(<?php echo $_REQUEST['c'].', '.$_REQUEST['u'].', '.$_REQUEST['yi']; ?>)" <?php if($_REQUEST['action']=="newsave" OR $_REQUEST['action']=="edit"){ echo "style=display:none;"; }?>/>
			 </td>
		</tr></table>
      </td>
   </tr>
  </table>  
</td>
<?php //*********************************************** Close Department******************************************************?>    
 </tr>
</table>
</center>
</body>
</html>
