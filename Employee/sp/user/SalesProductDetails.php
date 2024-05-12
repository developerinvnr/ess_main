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
<script type="text/javascript" src="js/stuHover.js" ></script>
<script type="text/javascript" src="js/Prototype.js"></script>
<Script language="javascript">
function ChangeCrop(value)
{ if(value!='')
  {
  document.getElementById("TDWork").style.display='none'; 
  var url = 'SalesGetProductDetails.php';	var pars = 'CropId='+value;	var myAjax = new Ajax.Request(
  url, { method: 'post', parameters: pars, onComplete: show_Product });
  }
}
function show_Product(originalRequest) 
{ document.getElementById('SpanProduct').innerHTML = originalRequest.responseText; document.getElementById("Season").disabled=true; }

function ChangeProduct(value)
{ document.getElementById("TDWork").style.display='none';
 if(value!=''){document.getElementById("Country").disabled=false; document.getElementById("State").disabled=false; 
           document.getElementById("Dist").disabled=false; document.getElementById("Area").disabled=false; 
		   document.getElementById("Product").style.background='#D2FFD2'; 
		   var url = 'SalesGetProductDetails.php';	var pars = 'ProdId='+value;	var myAjax = new Ajax.Request(
  url, { method: 'post', parameters: pars, onComplete: show_Season });
		   }
 else if(value==''){document.getElementById("Country").disabled=true; document.getElementById("State").disabled=true; 
                document.getElementById("Dist").disabled=true; document.getElementById("Area").disabled=true; 
				document.getElementById("Product").style.background='#FFFFFF';document.getElementById("Season").disabled=true;} 		   
}
function show_Season(originalRequest)
{ document.getElementById('SpanSeason').innerHTML = originalRequest.responseText; 
  if(document.getElementById('Area').value==''){ document.getElementById("Season").disabled=true;}else{document.getElementById("Season").disabled=false;}
  //showTableP(document.getElementById("Product").value);
   if(document.getElementById("Season").value!='' && document.getElementById("Area").value!='' && document.getElementById("Product").value!='')
   { showTablePS(document.getElementById("Season").value,document.getElementById("Area").value, document.getElementById("Product").value); }
   else if(document.getElementById("Area").value!='' && document.getElementById("Product").value!='')
   { showTablePA(document.getElementById("Area").value, document.getElementById("Product").value); }
   else if(document.getElementById("Product").value!=''){ showTableP(document.getElementById("Product").value); }
}

function showTableP(pi)
{
 if(pi!='')
 {
  var url = 'SalesGetProductDetails.php';	var pars = 'ResultP='+pi;	var myAjax = new Ajax.Request(
  url, { method: 'post', parameters: pars, onComplete: show_Product });
 }
 function show_Product(originalRequest) 
 { document.getElementById('TabResultP').innerHTML = originalRequest.responseText; }
} 


function ChangeCountry(value)
{ if(value!='')
  {
  document.getElementById("TDWork").style.display='none';
  var url = 'SalesGetProductDetails.php';	var pars = 'CountryId='+value;	var myAjax = new Ajax.Request(
  url, { method: 'post', parameters: pars, onComplete: show_State });
  }
}
function show_State(originalRequest)
{ document.getElementById('SpanState').innerHTML = originalRequest.responseText; document.getElementById("Season").disabled=true; }

function ChangeState(value)
{ if(value!='')
  {
  document.getElementById("TDWork").style.display='none';
  var url = 'SalesGetProductDetails.php';	var pars = 'StateId='+value;	var myAjax = new Ajax.Request(
  url, { method: 'post', parameters: pars, onComplete: show_Dist });
  }
}
function show_Dist(originalRequest)
{ document.getElementById('SpanDist').innerHTML = originalRequest.responseText; document.getElementById("Season").disabled=true; }

function ChangeDist(value)
{ if(value!='')
  {
  document.getElementById("TDWork").style.display='none';
  var url = 'SalesGetProductDetails.php';	var pars = 'DistId='+value;	var myAjax = new Ajax.Request(
  url, { method: 'post', parameters: pars, onComplete: show_Area });
  }
}
function show_Area(originalRequest)
{ document.getElementById('SpanArea').innerHTML = originalRequest.responseText; document.getElementById("Season").disabled=true; }

function ChangeArea(v)
{ 
 if(v!='')
 { document.getElementById("Season").disabled=false; document.getElementById("Area").style.background='#D2FFD2'; 
   if(document.getElementById("Season").value==''){document.getElementById("TDWork").style.display='none';}else{document.getElementById("TDWork").style.display='block';}
   
   var url = 'SalesGetProductDetails.php';	var pars = 'FAreaId='+v;	var myAjax = new Ajax.Request(
   url, { method: 'post', parameters: pars, onComplete: show_Farmer });
   
    if(document.getElementById("Season").value!='' && document.getElementById("Area").value!='' && document.getElementById("Product").value!='')
    { showTablePS(document.getElementById("Season").value,document.getElementById("Area").value, document.getElementById("Product").value); }
    else if(document.getElementById("Area").value!='' && document.getElementById("Product").value!='')
    { showTablePA(document.getElementById("Area").value, document.getElementById("Product").value); }
    else if(document.getElementById("Product").value!=''){ showTableP(document.getElementById("Product").value); }
 }
 else if(v==''){document.getElementById("Season").disabled=true; document.getElementById("Area").style.background='#FFFFFF'; } 		   
}
function show_Farmer(originalRequest)
{ document.getElementById('FarmarSpan').innerHTML = originalRequest.responseText; var Season=document.getElementById("Season").value; 
  if(Season>0){ ChangeSeason(Season);}
}
  
function showTablePA(ai,pi)
{
 if(ai!='' && pi!='')
 {
  var url = 'SalesGetProductDetails.php';	var pars = 'ResultA='+ai+'&pi='+pi;	var myAjax = new Ajax.Request(
  url, { method: 'post', parameters: pars, onComplete: show_Product2 });
 }
 function show_Product2(originalRequest) 
 { document.getElementById('TabResultP').innerHTML = originalRequest.responseText; }
} 

function ChangeSeason(v)
{ 
 if(v!='')
 { document.getElementById("TDWork").style.display='block'; document.getElementById("Season").style.background='#D2FFD2';  
   var ai=document.getElementById("Area").value; var pi=document.getElementById("Product").value;
   var url = 'SalesGetProductDetails.php';	var pars = 'SeasonId='+v+'&ai='+ai+'&pi='+pi;	var myAjax = new Ajax.Request(
   url, { method: 'post', parameters: pars, onComplete: show_Work }); 
 }
 else if(v==''){document.getElementById("Season").style.background='#FFFFFF'; document.getElementById("TDWork").style.display='none';} 		   
}
function show_Work(originalRequest)
{ document.getElementById('SeasonWithWork').innerHTML = originalRequest.responseText;
   
  if(document.getElementById("Season").value!='' && document.getElementById("Area").value!='' && document.getElementById("Product").value!='')
  { showTablePS(document.getElementById("Season").value,document.getElementById("Area").value, document.getElementById("Product").value); }
  else if(document.getElementById("Area").value!='' && document.getElementById("Product").value!='')
  { showTablePA(document.getElementById("Area").value, document.getElementById("Product").value); }
  else if(document.getElementById("Product").value!=''){ showTableP(document.getElementById("Product").value); }
  
}
function showTablePS(si,ai,pi)
{
 if(ai!='' && pi!='')
 {
  var url = 'SalesGetProductDetails.php';	var pars = 'Action=ResultS&si='+si+'&ai='+ai+'&pi='+pi;	var myAjax = new Ajax.Request(
  url, { method: 'post', parameters: pars, onComplete: show_Product3 });
 }
 function show_Product3(originalRequest) 
 { document.getElementById('TabResultP').innerHTML = originalRequest.responseText; }
} 



function ClickF(n,v)
{ 
   if(document.getElementById(v+"c"+n).checked==true)
   { var vhn=document.getElementById(v+"h"+n).value=n;
     var si=document.getElementById("Season").value; var ai=document.getElementById("Area").value; var pi=document.getElementById("Product").value; 
     var url = 'SalesGetProductDetails.php';	var pars = 'Action=AddProductDetail&si='+si+'&ai='+ai+'&pi='+pi+'&n='+n+'&v='+v+'&vhn='+vhn;	var myAjax = new Ajax.Request(
     url, { method: 'post', parameters: pars, onComplete: show_AddPMonthAdd });
   } 
   else if(document.getElementById(v+"c"+n).checked==false)
   { var vhn=document.getElementById(v+"h"+n).value=0;
     var si=document.getElementById("Season").value; var ai=document.getElementById("Area").value; var pi=document.getElementById("Product").value;
	 var url = 'SalesGetProductDetails.php';	var pars = 'Action=DelProductDetail&si='+si+'&ai='+ai+'&pi='+pi+'&n='+n+'&v='+v+'&vhn='+vhn;	var myAjax = new Ajax.Request(
     url, { method: 'post', parameters: pars, onComplete: show_AddPMonthDel });
   }
}
function show_AddPMonthAdd(originalRequest) 
{ document.getElementById('TabRPPP').innerHTML = originalRequest.responseText;
  document.getElementById("td"+document.getElementById("v").value+""+document.getElementById("n").value).style.background='#FFD2FF';
  showTablePS(document.getElementById("Season").value,document.getElementById("Area").value, document.getElementById("Product").value);
}
function show_AddPMonthDel(originalRequest) 
{ document.getElementById('TabRPPP').innerHTML = originalRequest.responseText;
  document.getElementById("td"+document.getElementById("v").value+""+document.getElementById("n").value).style.background='#FFFFFF';
  showTablePS(document.getElementById("Season").value,document.getElementById("Area").value, document.getElementById("Product").value);
}


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
	  <td valign="top" align="center"  width="100%" id="MainWindow">
<?php //************************************************************************************************************************************************************?>
<?php //**********************************************START*****START*****START******START******START***************************************************************?>
<?php //************************************************************************************************************************************************************?>
<input type="hidden" id="ComId" value="<?php echo $CompanyId; ?>" />
<input type="hidden" id="UserId" value="<?php echo $UserId; ?>" />		  
<table border="0" style="margin-top:0px; width:100%; height:300px;">
 <tr>
  <td align="left" height="20" valign="top" colspan="3">
   <table border="0">
    <tr><td style="margin-top:0px;width:100%;" class="heading">&nbsp;Product Details&nbsp;&nbsp;&nbsp;<b><?php echo $msg; ?></b></td></tr>
   </table>
  </td>
 </tr>
<tr>
 <td valign="top" align="left">
  <table border="0">
   <tr>
    <td id="Entry" style="width:1000px;" valign="top" align="left">
     <table border="0">
	 <tr>
	   <td valign="top"><select style="font-size:12px;width:120px;" name="Crop" id="Crop" onChange="ChangeCrop(this.value)"><option value="">---CROP---</option>
<?php $sqlC=mysql_query("SELECT * FROM hrm_sales_seedsitem order by ItemName ASC", $con); while($resC=mysql_fetch_array($sqlC)) { ?>
<option value="<?php echo $resC['ItemId']; ?>"><?php echo strtoupper($resC['ItemName']); ?></option><?php } ?></select></td>
	   <td></td>
	   <td valign="top"><span id="SpanProduct"><select style="font-size:12px;width:150px;" name="Product" id="Product" onChange="ChangeProduct(this.value)"><option value="">---PRODUCT---</option>
<?php $sqlP=mysql_query("SELECT * FROM hrm_sales_seedsproduct order by ProductName ASC", $con); while($resP=mysql_fetch_array($sqlP)) { ?>
<option value="<?php echo $resP['ProductId']; ?>"><?php echo strtoupper($resP['ProductName']); ?></option><?php } ?></select></span></td>
       <td></td>
	    <td valign="top"><span id="SpanCountry"><select style="font-size:12px;width:120px;" name="Country" id="Country" onChange="ChangeCountry(this.value)" disabled>
	   <option value="">---COUNTRY---</option>
<?php $sqlCountry=mysql_query("SELECT * FROM hrm_country order by CountryName ASC", $con); while($resCountry=mysql_fetch_array($sqlCountry)) { ?>
<option value="<?php echo $resCountry['CountryId']; ?>"><?php echo strtoupper($resCountry['CountryName']); ?></option><?php } ?></select></td>
	   <td></td>
	   <td valign="top"><span id="SpanState"><select style="font-size:12px;width:140px;" name="State" id="State" onChange="ChangeState(this.value)" disabled><option value="">---STATE---</option>
<?php $sqlState = mysql_query("SELECT * FROM hrm_state order by StateName ASC", $con); while($resState=mysql_fetch_array($sqlState)){ ?>
        <option value="<?php echo $resState['StateId']; ?>"><?php echo strtoupper($resState['StateName']); ?></option><?php } ?></select></td>
       <td></td>
	   <td valign="top"><span id="SpanDist"><select style="font-size:12px;width:150px;" name="Dist" id="Dist" onChange="ChangeDist(this.value)" disabled><option value="">---DISTRIC---</option>
<?php $sqlDist = mysql_query("SELECT * FROM hrm_sales_distric order by DistName ASC", $con); while($resDist=mysql_fetch_array($sqlDist)){ ?>
        <option value="<?php echo $resDist['DistId']; ?>"><?php echo strtoupper($resDist['DistName']); ?></option><?php } ?></select></td>
       <td></td>
	   <td valign="top"><span id="SpanArea"><select style="font-size:12px;width:150px;" name="Area" id="Area" onChange="ChangeArea(this.value)" disabled><option value="">---AREA-VILLAGE---</option>
<?php $sqlArea = mysql_query("SELECT * FROM hrm_sales_areavillage order by AreaName ASC", $con); while($resArea=mysql_fetch_array($sqlArea)){ ?>
        <option value="<?php echo $resArea['AreaId']; ?>"><?php echo strtoupper($resArea['AreaName']); ?></option><?php } ?></select></td>
		<td></td>
		<td valign="top"><span id="SpanSeason"><select style="font-size:12px;width:120px;" name="Season" id="Season" onChange="ChangeSeason(this.value)" disabled>
	   <option value="">---SEASON---</option></select></span></td>
	   <td></td>
	   <td valign="top" align="left" style="width:200px;"><input type="button" name="Refrash" value="refresh" style="width:90px; background-color:#C1C1FF;" onClick="javascript:window.location='SalesProductDetails.php?ac=2441&ee=2421&der=true2&u=UsuuerInfo&trht=FTF%%FTF1221&tt=valuased&desgn=Trern&main=FTrue%False'"/></td>
	  </tr>
<?php /*	  
	 <tr>
	   <td valign="top"><span id="SpanCountry"><select style="font-size:12px;width:120px;" name="Country" id="Country" onChange="ChangeCountry(this.value)" disabled>
	   <option value="">---COUNTRY---</option>
<?php $sqlCountry=mysql_query("SELECT * FROM hrm_country order by CountryName ASC", $con); while($resCountry=mysql_fetch_array($sqlCountry)) { ?>
<option value="<?php echo $resCountry['CountryId']; ?>"><?php echo strtoupper($resCountry['CountryName']); ?></option><?php } ?></select></td>
	   <td></td>
	   <td valign="top"><span id="SpanState"><select style="font-size:12px;width:140px;" name="State" id="State" onChange="ChangeState(this.value)" disabled><option value="">---STATE---</option>
<?php $sqlState = mysql_query("SELECT * FROM hrm_state order by StateName ASC", $con); while($resState=mysql_fetch_array($sqlState)){ ?>
        <option value="<?php echo $resState['StateId']; ?>"><?php echo strtoupper($resState['StateName']); ?></option><?php } ?></select></td>
       <td></td>
	   <td valign="top"><span id="SpanDist"><select style="font-size:12px;width:150px;" name="Dist" id="Dist" onChange="ChangeDist(this.value)" disabled><option value="">---DISTRIC---</option>
<?php $sqlDist = mysql_query("SELECT * FROM hrm_sales_distric order by DistName ASC", $con); while($resDist=mysql_fetch_array($sqlDist)){ ?>
        <option value="<?php echo $resDist['DistId']; ?>"><?php echo strtoupper($resDist['DistName']); ?></option><?php } ?></select></td>
       <td></td>
	   <td valign="top"><span id="SpanArea"><select style="font-size:12px;width:150px;" name="Area" id="Area" onChange="ChangeArea(this.value)" disabled><option value="">---AREA-VILLAGE---</option>
<?php $sqlArea = mysql_query("SELECT * FROM hrm_sales_areavillage order by AreaName ASC", $con); while($resArea=mysql_fetch_array($sqlArea)){ ?>
        <option value="<?php echo $resArea['AreaId']; ?>"><?php echo strtoupper($resArea['AreaName']); ?></option><?php } ?></select></td>
	   <td>&nbsp;&nbsp;&nbsp;</td>
	   <td id="Result" style="width:500px;" valign="top" rowspan="4"><span id="FarmarSpan"></span></td>
	  </tr>
	   <tr>
	   <td valign="top"><span id="SpanSeason"><select style="font-size:12px;width:120px;" name="Season" id="Season" onChange="ChangeSeason(this.value)" disabled>
	   <option value="">---SEASON---</option></select></span></td>
	   <td></td>
	   <td valign="top"><input type="button" name="Refrash" value="refresh" style="width:90px; background-color:#C1C1FF;" onClick="javascript:window.location='SalesProductDetails.php?ac=2441&ee=2421&der=true2&u=UsuuerInfo&trht=FTF%%FTF1221&tt=valuased&desgn=Trern&main=FTrue%False'"/></td>
	  </tr>
*/ ?>	  
	  <tr>
	   <td colspan="20" valign="top" style="height:150px;">
	    <table>
		  <tr style="height:150px;">
	       <td id="TDWork" style="display:none;"><span id="SeasonWithWork"></span></td>
	      </tr>
		</table>
	   </td>
	  </tr>
	  <tr>
	   <td colspan="20" valign="top">
	    <table>
		  <tr>
	       <td style="width:1250px;"><span id="TabResultP"></span></td>
	      </tr>
		</table>
	   </td>
	  </tr>
	  <tr>
	   <td colspan="20" valign="top">
	    <table>
		  <tr>
	       <td style="width:1250px;"><span id="TabRPPP"></span></td>
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
