<?php session_start();
if($_SESSION['login'] = true){require_once('config/config.php');}
include("../function.php");
include('codeEncDec.php');
if(check_user()==false){header('Location:../../../index.php');}
if($_SESSION['login'] = true){require_once('UserMenuSession.php');}
?>
<html>
<head>
<title><?php include_once('../Title.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<link rel="stylesheet" type="text/css" href="src/css/jscal2.css"/>
<link rel="stylesheet" type="text/css" href="src/css/border-radius.css"/>
<link rel="stylesheet" type="text/css" href="src/css/steel/steel.css"/>
<style>.CalenderButton {background-image:url(images/CalenderBtn.jpeg); width:16px; height:16px; background-color:#E0DBE3; border-color:#FFFFFF;}</style>
<script type="text/javascript" src="src/js/jscal2.js"></script>
<script type="text/javascript" src="src/js/lang/en.js"></script>
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<Script type="text/javascript">//window.history.forward(1);</Script>
<Script language="javascript">
function ClickItem(value)
{ var url = 'SlctSalesProd.php';	var pars = 'PItemId='+value;	var myAjax = new Ajax.Request(
  url, { method: 'post', parameters: pars, onComplete: show_Product });
}
function show_Product(originalRequest)
{ document.getElementById('SpanResult').innerHTML = originalRequest.responseText; 
  document.getElementById('ProductName').disabled=false; document.getElementById('NRV').disabled=false;
  document.getElementById('ProductSts').disabled=false; 
  document.getElementById('NRVD').disabled=false; document.getElementById('f_btn1').disabled=false; 
  document.getElementById('ProductType').disabled=false; document.getElementById('AddNew').style.display='block'; 
  document.getElementById('Change').style.display='none';
}

function ClickType(v){document.getElementById("ProductType").value=v; document.getElementById("TypeID").value=v}

function ClickNew() 
{
 if(document.getElementById('ProductName').value==''){alert("Please Type Product Name & Type"); return false;}
 var NRV=document.getElementById('NRV').value; var YId=document.getElementById('YearId').value;  
 var NRVD=document.getElementById('NRVD').value;
 var Numfilter=/^[0-9. ]+$/;  var test_num = Numfilter.test(NRV)
 if(test_num==false){ alert('Please enter only number in the NRV field'); return false; }	
 else if(document.getElementById('ProductName').value!='')
 {
  var ProductName=document.getElementById('ProductName').value; var ProductType=document.getElementById('ProductType').value;  var ProductSts=document.getElementById('ProductSts').value;
  var ItemId=document.getElementById('Item').value; if(NRV==''){var VNrv=0;}else{var VNrv=NRV;}
  var url = 'SlctSalesProd.php';	var pars = 'ProductName='+ProductName+'&ItemId='+ItemId+'&ProductType='+ProductType+'&NRV='+VNrv+'&YId='+YId+'&NRVD='+NRVD+'&ProductSts='+ProductSts; var myAjax = new Ajax.Request(
  url, { method: 'post', parameters: pars, onComplete: show_AddProduct });
 }
}
function show_AddProduct(originalRequest)
{ document.getElementById('SpanResult').innerHTML = originalRequest.responseText; document.getElementById('ProductName').value=''; document.getElementById('NRV').value=''; }

function ClickProduct(v,dn,ti,nrv,sts)
{ 
  if(document.getElementById('Check_'+v).checked==true)
  { 
    document.getElementById('ProductName').value=dn; document.getElementById('ProductID').value=v; 
	document.getElementById('ProductType').value=ti; document.getElementById('TypeID').value=ti; 
	document.getElementById('NRV').value=nrv; document.getElementById('ProductSts').value=sts;
	document.getElementById('R'+ti).checked=true; 
	document.getElementById('AddNew').style.display='none'; 
	document.getElementById('Change').style.display='block'; document.getElementById('TR'+v).style.background='#FFFFBF';
  }
  else if(document.getElementById('Check_'+v).checked==false)
  { document.getElementById('ProductName').value=''; document.getElementById('ProductID').value=''; 
    document.getElementById('ProductType').value=2; document.getElementById('ProductSts').value='A';  
	document.getElementById('TypeID').value=2; document.getElementById('NRV').value=''; 
	document.getElementById('R2').checked=true; 
	document.getElementById('AddNew').style.display='block'; 
    document.getElementById('Change').style.display='none'; document.getElementById('TR'+v).style.background='#FFFFFF';
  }
}

function ClickChange()
{
 if(document.getElementById('ProductName').value==''){alert("Please Type Product Name"); return false;}
 else if(document.getElementById('ProductName').value!='')
 { 
  var ProductName=document.getElementById('ProductName').value; var ProductID=document.getElementById('ProductID').value; 
  var NRV=document.getElementById('NRV').value; var ProductType=document.getElementById('ProductType').value;
  var ProductSts=document.getElementById('ProductSts').value;
  var ItemId=document.getElementById('Item').value; if(NRV==''){var VNrv=0;}else{var VNrv=NRV;}
  var YId=document.getElementById('YearId').value;  var NRVD=document.getElementById('NRVD').value;
  var url = 'SlctSalesProd.php';	var pars = 'ChangeProductName='+ProductName+'&ProductId='+ProductID+'&ItemId='+ItemId+'&ProductType='+ProductType+'&NRV='+VNrv+'&YId='+YId+'&NRVD='+NRVD+'&ProductSts='+ProductSts;	
  var myAjax = new Ajax.Request( url, { method: 'post', parameters: pars, onComplete: show_ChangeDealer });
 }
}
function show_ChangeDealer(originalRequest)
{ document.getElementById('SpanResult').innerHTML = originalRequest.responseText; 
  document.getElementById('ProductName').value=''; document.getElementById('ProductSts').value='A'; 
  document.getElementById('Change').style.display='none'; document.getElementById('AddNew').style.display='block';
}

function ClickDelProduct(v,dn)
{
 document.getElementById('Change').style.display='none'; document.getElementById('AddNew').style.display='block';
 document.getElementById('Check_'+v).checked=false;
 var agree=confirm("Are you sure you want to delete '"+dn+"' product name");
 if(agree)
 {
  var ItemId=document.getElementById('Item').value; var url = 'SlctSalesProd.php';	
  var pars = 'DeleteProductId='+v+'&ItemId='+ItemId; var myAjax = new Ajax.Request(
  url, { method: 'post', parameters: pars, onComplete: show_DeleteProduct });
 }
}
function show_DeleteProduct(originalRequest)
{ document.getElementById('SpanResult').innerHTML = originalRequest.responseText; document.getElementById('ProductName').value=''; document.getElementById('NRV').value=0.00; }
</Script>
</head>
<body class="body">
<table class="table">
<tr>
 <td>
  <table class="menutable"><tr><td><?php if($_SESSION['login'] = true){ require_once("EMenu.php"); } ?></td></tr></table>
 </td>
</tr>
<tr>
 <td valign="top">
  <table width="100%" style="margin-top:0px;" border="0">
    <tr>
	  <td valign="top"><?php if($_SESSION['login'] = true){ require_once("EWelcome.php"); } ?></td>
	</tr>
	 <tr>
	  <td valign="top" align="center"  width="100%" id="MainWindow"><br>
<?php //************************************************************************************************************************************************************?>
<?php //**********************************************START*****START*****START******START******START***************************************************************?>
<?php //************************************************************************************************************************************************************?>
<input type="hidden" id="ComId" value="<?php echo $CompanyId; ?>" />
<input type="hidden" id="UserId" value="<?php echo $UserId; ?>" />	
<input type="hidden" id="YearId" value="<?php echo $YearId; ?>" />	  
<table border="0" style="margin-top:0px; width:100%; height:300px;">
 <tr>
  <td align="left" height="20" valign="top" colspan="3">
   <table border="0">
    <tr><td  style="margin-top:0px;width:100%;font-family:Times New Roman;" class="heading">&nbsp;Product Name&nbsp;&nbsp;&nbsp;<b><?php echo $msg; ?></b></td></tr>
   </table>
  </td>
 </tr>
<tr>
 <td valign="top">
  <table>
   <tr>
    <td id="Entry" style="width:480px;" valign="top">
     <table border="0">
      <tr>
	    <td style="font-size:14px;height:18px;color:#FFFFFF;font-weight:bold;font-family:Times New Roman;">Crop Name :</td>
	    <td><select style="font-size:12px;width:180px;height:20px;background-color:#DDFFBB;" name="Item" id="Item" onChange="ClickItem(this.value)"> 
		     <option value="">Select</option>
<?php $sql=mysql_query("SELECT * FROM hrm_sales_seedsitem order by ItemName ASC", $con); while($res=mysql_fetch_array($sql)) { ?>
<option value="<?php echo $res['ItemId']; ?>"><?php echo ucwords($res['ItemName']); ?></option><?php } ?></select>
       </td>
	  </tr>
	   <tr>
	    <td style="font-size:14px;height:18px;width:120px;color:#FFFFFF;font-weight:bold;font-family:Times New Roman;">Product Name :</td>
	    <td>
		   <input name="ProductName" id="ProductName" style="font-size:12px;width:350px;height:20px;" disabled/>
		   <input type="hidden" id="ProductID" value=""/>
		</td>
		</tr>	
		<tr>
		<td style="font-size:14px;height:18px;width:120px;color:#FFFFFF;font-weight:bold;font-family:Times New Roman;">Product Type :</td>
		<td style="font-size:12px;height:18px;width:120px; font-family:Times New Roman;color:#000;">
		   <?php $sqlT2=mysql_query("select * from hrm_sales_seedtype order by TypeId DESC", $con); while($resT2=mysql_fetch_assoc($sqlT2)){ ?> 
		   <input type="radio" id="R<?php echo $resT2['TypeId']; ?>" name="Type" <?php if($resT2['TypeId']==2){echo 'checked';} ?> onClick="ClickType(<?php echo $resT2['TypeId']; ?>)"><b><?php echo strtoupper($resT2['TypeName']).'&nbsp;&nbsp;'; } ?></b>
		   <input type="hidden" id="TypeID" value="2"/><input type="hidden"  name="ProductType" id="ProductType" value="2"/>
		</td>
		</tr>
		<tr>
	    <td style="font-size:14px;height:18px;width:120px;color:#FFFFFF;font-weight:bold;font-family:Times New Roman;">NRV&nbsp;(Per KG) :</td>
	    <td>
		   <input name="NRV" id="NRV" style="font-size:12px;width:80px;height:20px; text-align:right" value="0.00" maxlength="9" disabled/>
		   <input type="hidden" id="NRVID" value=""/>
		</td>
		</tr>	
		<tr>
	    <td style="font-size:14px;height:18px;width:120px;color:#FFFFFF;font-weight:bold;font-family:Times New Roman;">From Date&nbsp;:</td>
	    <td>
		   <input name="NRVD" id="NRVD" style="font-size:12px;width:80px;height:20px;text-align:center" value="<?php echo date("d-m-Y") ?>" maxlength="9" disabled/>
		   <button id="f_btn1" class="CalenderButton" disabled></button><script type="text/javascript">  var cal = Calendar.setup({ onSelect:  function(cal) { cal.hide()}, showTime: true }); cal.manageFields("f_btn1", "NRVD", "%d-%m-%Y");</script>
		   <input type="hidden" id="NRVDate" value=""/>
		</td>
		</tr>
		<tr>
	    <td style="font-size:14px;height:18px;color:#FFFFFF;font-weight:bold;font-family:Times New Roman;">Status :</td>
	    <td><select style="font-size:12px;width:80px;height:20px;background-color:#DDFFBB;" name="ProductSts" id="ProductSts"><option value="A">Active</option><option value="D">Deactive</option></select>
       </td>
	  </tr>
		
			
		<tr>
       <td align="Right" class="fontButton" colspan="2">
	    <table border="0" width="300">
		<tr>
		 <td style="width:28px;">&nbsp;</td>
	     <td><input type="button" name="Delete" id="Delete" value="delete" style="width:90px;display:none;" onClick="Clickdelete()"></td>
	     <td style="width:70px;"><input type="submit" name="Change" id="Change" style="width:90px; display:none;" value="change" onClick="return ClickChange()">
		                         <input type="button" name="AddNew" id="AddNew" style="width:90px;display:none;" value="new" onClick="return ClickNew()"></td>
		 <td style="width:70px;"><input type="button" name="Refrash" value="refresh" style="width:90px;" onClick="javascript:window.location='SalesSeedsProduct.php?ac=4441&ee=4421&der=true3&c=false&d=dreefoultValue&u=UsuuerInfo&trht=FTF%%FTF1221&tt=valuased&desgn=Trern&main=FTrue%False'"/></td>
		</tr>
	    </table>
      </td>
   </tr>
     </table>
    </td>
	<td style="width:50px;">&nbsp;</td>
	<td style="width:500px;" valign="top">
	<span id="SpanResult">
     <table border="0">
       <tr><td>&nbsp;</td></tr>
     </table>
	</span>
    </td>
   </tr>
  </table>
 </td>
</tr>
</table>
		
<?php //************************************************************************************************************************************************************?>
<?php //**********************************************END*****END*****END******END******END***************************************************************?>
<?php //************************************************************************************************************************************************************?>
		
	  </td>
	</tr>
  </table>
 </td>
</tr>
</table>
</body>
</html>

</html>
