<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');}
include("../function.php");
include('codeEncDec.php');
if(check_user()==false){header('Location:../../../index.php');}
if($_SESSION['login'] = true){require_once('UserMenuSession.php');}
//**********************************************************************************************************************
if(isset($_POST['SaveEdit']))
{ $SqlUp = mysql_query("UPDATE hrm_sales_planshow SET EntryPlan='".$_POST['COne']."', ResultPlan='".$_POST['CTwo']."' WHERE PlanshowId=1", $con); 
  if($SqlUp){$msg='Updated successfully!';}
}

/** ------------------------------- **/
//2:2013-14, 3:2014-15, 4:2015-16, 5:2016-17, 6:2017-18, 7:2018-19, 8:2019-20, 9:2020-21, 10:2021-22, 11:2022-23, 12:2023-24, 13:2024-25, 14:2025-26,  

$fy1='2013'; $ty1='2014'; $Tbl='hrm_sales_sal_details_2';
$sql = mysql_query("select * from from ".$Tbl." where (M1!=0 OR M2!=0 OR M3!=0 OR M4!=0 OR M5!=0 OR M6!=0 OR M7!=0 OR M8!=0 OR M9!=0 OR M10!=0 OR M11!=0 OR M12!=0 OR M1_Ach!=0 OR M2_Ach!=0 OR M3_Ach!=0 OR M4_Ach!=0 OR M5_Ach!=0 OR M6_Ach!=0 OR M7_Ach!=0 OR M8_Ach!=0 OR M9_Ach!=0 OR M10_Ach!=0 OR M11_Ach!=0 OR M12_Ach!=0 OR M1_Proj!=0 OR M2_Proj!=0 OR M3_Proj!=0 OR M4_Proj!=0 OR M5_Proj!=0 OR M6_Proj!=0 OR M7_Proj!=0 OR M8_Proj!=0 OR M9_Proj!=0 OR M10_Proj!=0 OR M11_Proj!=0 OR M12_Proj!=0) order by DealerId,ItemId,ProductId ASC", $con);
while($res=mysql_fetch_assoc($sql))
{
  include("Nrv1.php");
  $up=mysql_query("update ".$Tbl." set M1a=(".$res['M1']*$r4['NRV']."), M2a=(".$res['M2']*$r5['NRV']."), M3a=(".$res['M3']*$r6['NRV']."), M4a=(".$res['M4']*$r4['NRV']."), M5a=(".$res['M5']*$r5['NRV']."), M6a=(".$res['M6']*$r6['NRV']."), M7a=(".$res['M7']*$r7['NRV']."), M8a=(".$res['M8']*$r8['NRV']."), M9a=(".$res['M9']*$r9['NRV']."), M10a=(".$res['M10']*$r10['NRV']."), M11a=(".$res['M11']*$r11['NRV']."), M12a=(".$res['M12']*$r12['NRV']."), M1a_Ach=(".$res['M1_Ach']*$r4['NRV']."), M2a_Ach=(".$res['M2_Ach']*$r5['NRV']."), M3a_Ach=(".$res['M3_Ach']*$r6['NRV']."), M4a_Ach=(".$res['M4_Ach']*$r4['NRV']."), M5a_Ach=(".$res['M5_Ach']*$r5['NRV']."), M6a_Ach=(".$res['M6_Ach']*$r6['NRV']."), M7a_Ach=(".$res['M7_Ach']*$r7['NRV']."), M8a_Ach=(".$res['M8_Ach']*$r8['NRV']."), M9a_Ach=(".$res['M9_Ach']*$r9['NRV']."), M10a_Ach=(".$res['M10_Ach']*$r10['NRV']."), M11a_Ach=(".$res['M11_Ach']*$r11['NRV']."), M12a_Ach=(".$res['M12_Ach']*$r12['NRV']."), M1a_Proj=(".$res['M1_Proj']*$r4['NRV']."), M2a_Proj=(".$res['M2_Proj']*$r5['NRV']."), M3a_Proj=(".$res['M3_Proj']*$r6['NRV']."), M4a_Proj=(".$res['M4_Proj']*$r4['NRV']."), M5a_Proj=(".$res['M5_Proj']*$r5['NRV']."), M6a_Proj=(".$res['M6_Proj']*$r6['NRV']."), M7a_Proj=(".$res['M7_Proj']*$r7['NRV']."), M8a_Proj=(".$res['M8_Proj']*$r8['NRV']."), M9a_Proj=(".$res['M9_Proj']*$r9['NRV']."), M10a_Proj=(".$res['M10_Proj']*$r10['NRV']."), M11a_Proj=(".$res['M11_Proj']*$r11['NRV']."), M12a_Proj=(".$res['M12_Proj']*$r12['NRV'].") where SalDetailId=".$res['SalDetailId']);  
}
/** ------------------------------- **/
?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<Script type="text/javascript">window.history.forward(1);</Script>
<style> .font { color:#ffffff; font-family:Times New Roman; font-size:15px; width:200px;} .font1 { font-family:Times New Roman; font-size:12px; height:14px; width:200px; } 
.font2 { font-size:12px;width:260px;height:18px;} .font4 { color:#1FAD34; font-family:Georgia; font-size:15px;}
.span {display:none; font-family:Courier New; font-size:14px; }.span1 {display:block; font-family:Courier New; font-size:14px; }
.SaveButton {background-image:url(images/save.gif); width:20px; height:20px; background-repeat:no-repeat; background-color:#FFFFFF; border-color:#FFFFFF; border-bottom:inherit;}
.EditSelect { font-family:Georgia; font-size:12px; height:18px;}
.EditInput { font-family:Georgia; font-size:12px; height:18px;}
.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}
</style>
<Script type="text/javascript" language="javascript">
function FunClickRdo(v)
{ if(v==1){ document.getElementById("COne").value='Y'; document.getElementById("CTwo").value='N'; }
  else if(v==2){ document.getElementById("COne").value='N'; document.getElementById("CTwo").value='Y'; }
}
</Script> 
</head>
<body class="body">
<table class="table">
<tr><td><table class="menutable"><tr><td><?php if($_SESSION['login'] = true){ require_once("EMenu.php"); } ?></td></tr></table></td></tr>
<tr>
 <td valign="top">
  <table width="100%" style="margin-top:0px;" border="0">
   <tr><td valign="top"><?php if($_SESSION['login'] = true){ require_once("EWelcome.php"); } ?></td></tr>
   <tr>
	<td valign="top"  width="100%" id="MainWindow" align="left"><br>
    <table border="0" style="margin-top:0px; width:100%; height:300px;">
    <tr>
    <td align="left" id="type" valign="top" style="display:block; width:50%" align="left">             
     <table border="0" width="500">
	 <tr><td class="heading">&nbsp;Sales Plan Show-Hide Format &nbsp;&nbsp;<font color="#5CB900"><i><?php echo $msg; ?></i></font></td></tr>
	 <tr>
	 <td align="left" width="350">
	 <table border="1" width="350" border="1" bgcolor="#FFFFFF">
<tr bgcolor="#808000">
 <td class="font" align="center" style="width:100px;"><b>Tgt/ Proj</b></td>
 <td class="font" align="center" style="width:100;"><b>Trg/ Sales</b></td>
 <td class="font" align="center" style="width:100px;"><b>Action</b></td>
</tr>

<?php $sql=mysql_query("select * from hrm_sales_planshow", $con); $res=mysql_fetch_array($sql); ?>
<form name="OformEdit" method="post" onSubmit="return OvalidateEdit(this)">
<input type="hidden" id="COne" name="COne" value="<?php echo $res['EntryPlan']; ?>" />
<input type="hidden" id="CTwo" name="CTwo" value="<?php echo $res['ResultPlan']; ?>" />	
<tr>
 <td align="center"><input type="radio" id="Entry" name="showradio" <?php if($res['EntryPlan']=='Y'){echo 'checked';} ?> onclick="FunClickRdo(1)"/></td>
 <td align="center"><input type="radio" id="Result" name="showradio" <?php if($res['ResultPlan']=='Y'){echo 'checked';} ?> onclick="FunClickRdo(2)"/></td>
 <td align="center"><input type="submit" name="SaveEdit"  value="" class="SaveButton"></td>
</tr>
</form> 
	  </table>
	 </td>
    </tr>
  </table>  
</td>
</tr>
</table>
	  </td>
	</tr>
  </table>
 </td>
</tr>
</table>
</body>
</html>
