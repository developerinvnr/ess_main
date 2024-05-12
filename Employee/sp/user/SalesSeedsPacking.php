<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');}
include("../function.php");
include('codeEncDec.php');
if(check_user()==false){header('Location:../../../index.php');}
if($_SESSION['login'] = true){require_once('UserMenuSession.php');}
//**********************************************************************************************************************

if(isset($_POST['SaveNew']))
{ $sql=mysql_query("select * from hrm_sales_itemmaster where ProductId=".$_POST['PId']." AND SizeId=".$_POST['Size']." AND UnitId=".$_POST['Unit'], $con); $row=mysql_num_rows($sql);
  if($row==0){$SqlInseart = mysql_query("INSERT INTO hrm_sales_itemmaster(ProductId,SizeId,UnitId) VALUES(".$_POST['PId'].",".$_POST['Size'].",".$_POST['Unit'].")", $con); }
}
if(isset($_POST['SaveEdit']))
{ $SqlUpdate = mysql_query("UPDATE hrm_sales_itemmaster SET SizeId=".$_POST['Size'].",UnitId=".$_POST['Unit']." WHERE ItemNo=".$_POST['ItemNo'], $con); }

if(isset($_REQUEST['action']) && $_REQUEST['action']=="delete")
{ $SqlDelete=mysql_query("delete from hrm_sales_itemmaster WHERE ItemNo=".$_REQUEST['did'], $con) or die(mysql_error()); }

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
<Script>
function ChangeItem(v) 
{ if(v==0){alert("please select item"); return false;} 
  var x = "SalesSeedsPacking.php?ac=2441&ee=2421&der=true2&c=false&d=dreefoultValue&u=UsuuerInfo&tt=valuased&desgn=Trern&main=FTrue%False&ActItem="+v+"&ActProd=0";  
  window.location=x; 
}
function ChangeProd(value) 
{ if(v==0){alert("please select Product"); return false;} var v=document.getElementById("Item").value;
  var x = "SalesSeedsPacking.php?ac=2441&ee=2421&der=true2&c=false&d=dreefoultValue&u=UsuuerInfo&tt=valuased&desgn=Trern&main=FTrue%False&ActItem="+v+"&ActProd="+value;  
  window.location=x; 
}

function edit(value) { var IId=document.getElementById("Item").value; var v=document.getElementById("Prod").value; var agree=confirm("Are you sure you want to edit this record?");
if (agree) { var x="SalesSeedsPacking.php?action=edit&eid="+value+"&ee=2421&der=true2&c=false&d=dreefoultValue&u=UsuuerInfo&ActItem="+IId+"&ActProd="+v;  window.location=x;}}
function del(value) { var IId=document.getElementById("Item").value; var v=document.getElementById("Prod").value; var agree=confirm("Are you sure you want to delete this record?");
if (agree) { var x="SalesSeedsPacking.php?action=delete&did="+value+"&ee=2421&der=true2&c=false&desgn=Trern&main=FTrue%False&ActItem="+IId+"&ActProd="+v;  window.location=x;}}
function newsave() 
{ var IId=document.getElementById("Item").value; var v=document.getElementById("Prod").value;
 var x="SalesSeedsPacking.php?action=newsave&ee=2421&der=true2&c=false&u=UsuuerInfo&desgn=Trern&main=FTrue%False&ActItem="+IId+"&ActProd="+v;  window.location=x;}
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
	<td valign="top" align="center"  width="100%" id="MainWindow"><br>	  
    <table border="0" style="margin-top:0px; width:100%; height:300px;">
    <tr>
    <td width="10">&nbsp;</td>  
    <td align="left" id="type" valign="top" style="display:block; width:50%">             
     <table border="0">
	 <tr>
	  <td>
	   <table>
	    <tr>
		 <td style="margin-top:0px;width:100%;" class="heading" class="heading"><b>&nbsp;Product Details</b>&nbsp;&nbsp;&nbsp;&nbsp;</td>
		 <td> 
		 <select style="font-size:12px;width:180px;height:20px;background-color:#DDFFBB;" name="Item" id="Item" onChange="ChangeItem(this.value)"> 
         <?php if($_REQUEST['ActItem']==''){?><option value="0">---Select Crop---</option>
	     <?php } else{ $sqlI = mysql_query("SELECT ItemName FROM hrm_sales_seedsitem where ItemId=".$_REQUEST['ActItem'], $con); $resI = mysql_fetch_array($sqlI); ?>
	    <option value="<?php echo $_REQUEST['ActItem']; ?>"><?php echo $resI['ItemName']; ?></option><?php } ?>
	    <?php $sqlIv = mysql_query("SELECT * FROM hrm_sales_seedsitem order by ItemName ASC", $con); while($resIv = mysql_fetch_array($sqlIv)){ ?>
	    <option value="<?php echo $resIv['ItemId']; ?>"><?php echo $resIv['ItemName']; ?></option><?php } ?></select></td>
		 <td>
		  <select style="font-size:12px;width:180px;height:20px;background-color:#DDFFBB;" name="Prod" id="Prod" onChange="ChangeProd(this.value)" <?php if($_REQUEST['ActItem']==''){echo 'disabled';} ?>> 
       <?php if($_REQUEST['ActItem']!='' AND $_REQUEST['ActProd']==0){?><option value="0">---Select Product---</option>
	   <?php $sqlI = mysql_query("SELECT * FROM hrm_sales_seedsproduct where ItemId=".$_REQUEST['ActItem']." order by ProductName ASC", $con); 
	         while($resI = mysql_fetch_array($sqlI)){ ?><option value="<?php echo $resI['ProductId']; ?>"><?php echo $resI['ProductName']; ?></option><?php } ?>

		<?php } elseif($_REQUEST['ActProd']!=0) { $sqlP = mysql_query("SELECT ProductName FROM hrm_sales_seedsproduct where ProductId=".$_REQUEST['ActProd'], $con); 
		$resP=mysql_fetch_array($sqlP);?><option value="<?php echo $_REQUEST['ActProd']; ?>"><?php echo $resP['ProductName']; ?></option>
		<?php $sqlI = mysql_query("SELECT * FROM hrm_sales_seedsproduct where ItemId=".$_REQUEST['ActItem']." order by ProductName ASC", $con); 
	         while($resI = mysql_fetch_array($sqlI)){ ?><option value="<?php echo $resI['ProductId']; ?>"><?php echo $resI['ProductName']; ?></option><?php } ?>
	    <?php } ?>
		 </td>
		</tr>
	   </table>
	  </td>
	  </tr>
	 <tr>
	 <td align="left" width="550">
	 <table border="1" width="550" border="1" bgcolor="#FFFFFF">
<tr bgcolor="#808000">
 <td align="center" style="font:Georgia; color:#FFFFFF; font-size:11px; width:50px;"><b>SNo</b></td>
 <td class="font" align="center" style="width:200;"><b>Product Name</b></td>
<?php /* <td class="font" align="center" style="width:100;"><b>Type</b></td> */ ?>
 <td class="font" align="center" style="width:100;"><b>Size</b></td>
 <td class="font" align="center" style="width:100;"><b>Unit</b></td>
 <td align="center" style="font:Georgia; font-size:11px; width:100px; color:#FFFFFF"><b>Action</b></td>
</tr>
<?php if($_REQUEST['ActProd']!=''){ $sql=mysql_query("select hrm_sales_itemmaster.*,ProductName from hrm_sales_itemmaster INNER JOIN hrm_sales_seedsproduct ON hrm_sales_itemmaster.ProductId=hrm_sales_seedsproduct.ProductId where hrm_sales_itemmaster.ProductId=".$_REQUEST['ActProd']." order by ItemNo ASC", $con); 
$SNo=1; while($res=mysql_fetch_array($sql)){ 
//$sqlT=mysql_query("select TypeName from hrm_sales_seedtype where TypeId=".$res['TypeId'], $con); $resT=mysql_fetch_assoc($sqlT);
$sqlS=mysql_query("select SizeId,SizeName from hrm_sales_itemsize where SizeId=".$res['SizeId'], $con); $resS=mysql_fetch_assoc($sqlS);
$sqlU=mysql_query("select UnitId,UnitName from hrm_sales_unit where UnitId=".$res['UnitId'], $con); $resU=mysql_fetch_assoc($sqlU); 
if(isset($_REQUEST['action']) && $_REQUEST['action']=="edit" && $_REQUEST['eid']==$res['ItemNo']){ ?>
<form name="OformEdit" method="post" onSubmit="return OvalidateEdit(this)">	
<tr>
 <td align="center" style="font:Georgia;font-size:12px;" valign="top"><?php echo $SNo; ?></td>
 <td class="font2">&nbsp;<?php echo $res['ProductName']; ?></td>
<?php /* 
 <td><select style="font-size:12px;width:98px;" id="Type" name="Type">
 <option value="<?php echo $res['TypeId']; ?>" selected><?php echo $resT['TypeName']; ?></option>
<?php $sqlT2=mysql_query("select * from hrm_sales_seedtype where TypeId!=".$res['TypeId'], $con); while($resT2=mysql_fetch_assoc($sqlT2)){ ?> 
 <option value="<?php echo $resT2['TypeId']; ?>" selected><?php echo $resT2['TypeName']; ?></option><?php } ?></select></td>
*/ ?> 
 <td><select style="font-size:12px;width:98px;" id="Size" name="Size">
 <option value="<?php echo $resS['SizeId']; ?>"><?php echo $resS['SizeName']; ?></option>
<?php $sqlS2=mysql_query("select * from hrm_sales_itemsize where SizeId!=".$res['SizeId'], $con); while($resS2=mysql_fetch_assoc($sqlS2)){ ?> 
 <option value="<?php echo $resS2['SizeId']; ?>"><?php echo $resS2['SizeName']; ?></option><?php } ?></select></td>
 <td><select style="font-size:12px;width:98px;" id="Unit" name="Unit">
 <option value="<?php echo $resU['UnitId']; ?>"><?php echo $resU['UnitName']; ?></option>
<?php $sqlU2=mysql_query("select * from hrm_sales_unit where UnitId!=".$res['UnitId'], $con); while($resU2=mysql_fetch_assoc($sqlU2)){ ?> 
 <option value="<?php echo $resU2['UnitId']; ?>"><?php echo $resU2['UnitName']; ?></option><?php } ?></select></td>
 <td align="center" valign="middle" style="font:Georgia; font-size:11px;width:100px;" valign="top">
 <input type="submit" name="SaveEdit"  value="" class="SaveButton"><input type="hidden" name="ItemNo" id="ItemNo" value="<?php echo $_REQUEST['eid']; ?>"/></td>
</tr>
</form> 
<?php } else { ?>	 
<tr>
 <td align="center" style="font:Times New Roman; font-size:12px;"><?php echo $SNo; ?></td>	   
 <td class="font2">&nbsp;<?php echo $res['ProductName']; ?></td>
<?php /* <td class="font2">&nbsp;<?php echo $resT['TypeName']; ?></td> */ ?>
 <td class="font2">&nbsp;<?php echo $resS['SizeName']; ?></td>
 <td class="font2">&nbsp;<?php echo $resU['UnitName']; ?></td>
 <td align="center" valign="middle"><a href="#"><img src="images/edit.png" border="0" alt="Edit" onClick="edit(<?php echo $res['ItemNo']; ?>)"></a>&nbsp;<a href="#"><img src="images/delete.png" alt="Delete" border="0" onClick="del(<?php echo $res['ItemNo']; ?>)"></a></td>
 <?php /*<a href="#"><img src="images/delete.png" alt="Delete" border="0" onClick="del(<?php echo $res['ItemNo']; ?>)"></a> */ ?>
 </tr>
<?php } $SNo++;} ?>
<tr><td bgcolor="#B6E9E2" colspan="10"></td></tr>
<?php if(isset($_REQUEST['action']) && $_REQUEST['action']=="newsave"){ ?>
<form name="formEdit" method="post" onSubmit="return validateEdit(this)">
<tr>
 <td align="center" style="font:Georgia;font-size:12px;" valign="top"><?php echo $SNo; ?></td>
 <td class="font2">&nbsp;<?php echo $resP['ProductName']; ?></td>
<?php /* 
<td><select style="font-size:12px;width:98px;" id="Type" name="Type">
<?php $sqlT2=mysql_query("select * from hrm_sales_seedtype order by TypeId ASC", $con); while($resT2=mysql_fetch_assoc($sqlT2)){ ?> 
 <option value="<?php echo $resT2['TypeId']; ?>" selected><?php echo $resT2['TypeName']; ?></option><?php } ?></select></td>
*/ ?> 
 <td><select style="font-size:12px;width:98px;" id="Size" name="Size"><option value="0" selected>---Select---</option>
<?php $sqlS2=mysql_query("select * from hrm_sales_itemsize order by SizeId ASC", $con); while($resS2=mysql_fetch_assoc($sqlS2)){ ?> 
 <option value="<?php echo $resS2['SizeId']; ?>"><?php echo $resS2['SizeName']; ?></option><?php } ?></select></td>
 <td><select style="font-size:12px;width:98px;" id="Unit" name="Unit"><option value="0" selected>---Select---</option>
<?php $sqlU2=mysql_query("select * from hrm_sales_unit order by UnitId ASC", $con); while($resU2=mysql_fetch_assoc($sqlU2)){ ?> 
 <option value="<?php echo $resU2['UnitId']; ?>"><?php echo $resU2['UnitName']; ?></option><?php } ?></select>
 <input type="hidden" name="PId" id="PId" value="<?php echo $_REQUEST['ActProd']; ?>"/></td>
<td align="center" valign="middle" style="font:Georgia; font-size:11px;"><input type="submit" name="SaveNew"  value="" class="SaveButton"></td>
</tr>
</form>
<?php } ?>
<?php } ?>
<tr>
 <td colspan="5" align="right" class="fontButton">
<input type="button" name="NewSave" id="NewSave" value="new" onClick="newsave()" <?php if($_REQUEST['ActProd']==0 OR $_REQUEST['ActProd']=='' OR $_REQUEST['action']=="newsave" OR $_REQUEST['action']=="edit"){ echo "style=display:none;"; }?>/>
<input type="button" name="back" id="back" style="width:90px;" value="back" onClick="javascript:window.location='Index.php?log=<?php echo $_SESSION['logCheckUser']; ?>'"/>
<input type="button" name="Refrash" value="refresh" onClick="javascript:window.location='SalesSeedsPacking.php?ac=4441&ee=4421&der=true3&c=false&d=dreefoultValue&u=UsuuerInfo&trht=FTF%%FTF1221&tt=valuased&desgn=Trern&main=FTrue%False'"/>&nbsp;
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
 </td>
</tr>
</table>
</body>
</html>
