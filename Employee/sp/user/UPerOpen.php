<?php session_start();
require_once('config/config.php');

if(isset($_POST['PerSubmit']))
{
 $SqlUpdate = mysql_query("UPDATE hrm_sales_useremp SET Master='".$_POST['Master']."', CMaster='".$_POST['CMaster']."', SMaster='".$_POST['SMaster']."', PMaster='".$_POST['PMaster']."', UMaster='".$_POST['UMaster']."', Import='".$_POST['Import']."', Logistic='".$_POST['Logistic']."', LogAchi='".$_POST['LogAchi']."', LogTest='".$_POST['LogTest']."', FwdNote='".$_POST['FwdNote']."', FwdEdit='".$_POST['FwdEdit']."', FaEdit='".$_POST['FaEdit']."', FaApproval='".$_POST['FaApproval']."', FaReports='".$_POST['FaReports']."', Production='".$_POST['Production']."', ProdStock='".$_POST['ProdStock']."', Reports='".$_POST['Reports']."', ProdRep='".$_POST['ProdRep']."', SalesRep='".$_POST['SalesRep']."', ProdArrDisp='".$_POST['ProdArrDisp']."', ImportExt='".$_POST['ImportExt']."' WHERE SUserEmpId=".$_POST['id'], $con);
if($SqlUpdate){ $msg = "Data has been updated successfully..."; } 
}

$sql=mysql_query("select * from hrm_sales_useremp where SUserEmpId=".$_REQUEST['id'], $con); $res=mysql_fetch_array($sql);
?>
<style>
.ht{ font-size:16px;font-family:Times New Roman;font-weight:bold;background-color:#B1FF64;}
.hd{ font-size:14px;font-family:Times New Roman;text-align:center; }
.sel{ font-size:12px;width:50px; height:25px;font-family:Times New Roman;}
</style>
<center>
<table style="width:100%;">
<form name="fname" method="post"> 
<input type="hidden" name="id" id="id" value="<?php echo $_REQUEST['id']; ?>" />
 <tr><td class="ht">&nbsp;&nbsp;Master</td></tr>
 <tr>
 <td style="background-color:#E2FFC6;">
  <table>
   <tr>
    <td class="hd">&nbsp;&nbsp;Master&nbsp;<select class="sel" name="Master" id="Master"><?php if($res['Master']=='Y'){ ?><option value="Y" selected>&nbsp;Yes</option><option value="N">&nbsp;No</option><?php } ?><?php if($res['Master']=='N'){ ?><option value="N" selected>&nbsp;No</option><option value="Y">&nbsp;Yes</option><?php } ?></select>&nbsp;&nbsp;</td>
	
    <td class="hd">Crop Master&nbsp;<select class="sel" name="CMaster" id="CMaster"><?php if($res['CMaster']=='Y'){ ?><option value="Y" selected>&nbsp;Yes</option><option value="N">&nbsp;No</option><?php } ?><?php if($res['CMaster']=='N'){ ?><option value="N" selected>&nbsp;No</option><option value="Y">&nbsp;Yes</option><?php } ?></select>&nbsp;&nbsp;</td>
				
	<td class="hd">Sales Master&nbsp;<select class="sel" name="SMaster" id="SMaster"><?php if($res['SMaster']=='Y'){ ?><option value="Y" selected>&nbsp;Yes</option><option value="N">&nbsp;No</option><?php } ?><?php if($res['SMaster']=='N'){ ?><option value="N" selected>&nbsp;No</option><option value="Y">&nbsp;Yes</option><?php } ?></select>&nbsp;&nbsp;</td>
	
	<td class="hd">Prod<sup>n</sup> Master&nbsp;<select class="sel" name="PMaster" id="PMaster"><?php if($res['PMaster']=='Y'){ ?><option value="Y" selected>&nbsp;Yes</option><option value="N">&nbsp;No</option><?php } ?><?php if($res['PMaster']=='N'){ ?><option value="N" selected>&nbsp;No</option><option value="Y">&nbsp;Yes</option><?php } ?></select>&nbsp;&nbsp;</td>
	
	<td class="hd">User Master&nbsp;<select class="sel" name="UMaster" id="UMaster"><?php if($res['UMaster']=='Y'){ ?><option value="Y" selected>&nbsp;Yes</option><option value="N">&nbsp;No</option><?php } ?><?php if($res['UMaster']=='N'){ ?><option value="N" selected>&nbsp;No</option><option value="Y">&nbsp;Yes</option><?php } ?></select></td>
 </tr>
 </table>
 </td>
 </tr>
 <tr><td>&nbsp;</td></tr>
 <tr><td class="ht">&nbsp;&nbsp;Logistics</td></tr>
 
 <tr>
  <td style="background-color:#E2FFC6;">
  <table align="99%;">
  <tr>
  <td class="hd">&nbsp;&nbsp;Logistics&nbsp;<select class="sel" name="Logistic" id="Logistic"><?php if($res['Logistic']=='Y'){ ?><option value="Y" selected>&nbsp;Yes</option><option value="N">&nbsp;No</option><?php } ?><?php if($res['Logistic']=='N'){ ?><option value="N" selected>&nbsp;No</option><option value="Y">&nbsp;Yes</option><?php } ?></select>&nbsp;&nbsp;</td>
  
  <td class="hd">Import&nbsp;<select class="sel" name="Import" id="Import"><?php if($res['Import']=='Y'){ ?><option value="Y" selected>&nbsp;Yes</option><option value="N">&nbsp;No</option><?php } ?><?php if($res['Import']=='N'){ ?><option value="N" selected>&nbsp;No</option><option value="Y">&nbsp;Yes</option><?php } ?></select>&nbsp;&nbsp;</td>
  
  <td class="hd">Log<sup>t</sup> Achi&nbsp;<select class="sel" name="LogAchi" id="LogAchi"><?php if($res['LogAchi']=='Y'){ ?><option value="Y" selected>&nbsp;Yes</option><option value="N">&nbsp;No</option><?php } ?><?php if($res['LogAchi']=='N'){ ?><option value="N" selected>&nbsp;No</option><option value="Y">&nbsp;Yes</option><?php } ?></select>&nbsp;&nbsp;</td>
  
  <td class="hd">Log<sup>t</sup> Test&nbsp;<select class="sel" name="LogTest" id="LogTest"><?php if($res['LogTest']=='Y'){ ?><option value="Y" selected>&nbsp;Yes</option><option value="N">&nbsp;No</option><?php } ?><?php if($res['LogTest']=='N'){ ?><option value="N" selected>&nbsp;No</option><option value="Y">&nbsp;Yes</option><?php } ?></select>&nbsp;&nbsp;</td>
  
   <td class="hd">Fwd Note&nbsp;<select class="sel" name="FwdNote" id="FwdNote">
<?php if($res['FwdNote']=='Y'){ ?><option value="Y" selected>&nbsp;Yes</option><option value="N">&nbsp;No</option><?php } ?><?php if($res['FwdNote']=='N'){ ?><option value="N" selected>&nbsp;No</option><option value="Y">&nbsp;Yes</option><?php } ?></select>&nbsp;&nbsp;</td>

   <td class="hd">Fwd Edit&nbsp;<select class="sel" name="FwdEdit" id="FwdEdit">
<?php if($res['FwdEdit']=='Y'){ ?><option value="Y" selected>&nbsp;Yes</option><option value="N">&nbsp;No</option><?php } ?><?php if($res['FwdEdit']=='N'){ ?><option value="N" selected>&nbsp;No</option><option value="Y">&nbsp;Yes</option><?php } ?></select></td>
 </tr>
 </table>
 </td>
 </tr>
 <tr><td>&nbsp;</td></tr>
 <tr><td class="ht">&nbsp;&nbsp;Production</td></tr>
 <tr>
  <td style="background-color:#E2FFC6;">
  <table>
  <tr>
   <td class="hd">&nbsp;&nbsp;Production&nbsp;<select class="sel" name="Production" id="Production"><?php if($res['Production']=='Y'){ ?><option value="Y" selected>&nbsp;Yes</option><option value="N">&nbsp;No</option><?php } ?><?php if($res['Production']=='N'){ ?><option value="N" selected>&nbsp;No</option><option value="Y">&nbsp;Yes</option><?php } ?></select>&nbsp;&nbsp;</td>
					
	<td class="hd">Production Stock&nbsp;<select class="sel" name="ProdStock" id="ProdStock"><?php if($res['ProdStock']=='Y'){ ?><option value="Y" selected>&nbsp;Yes</option><option value="N">&nbsp;No</option><?php } ?><?php if($res['ProdStock']=='N'){ ?><option value="N" selected>&nbsp;No</option><option value="Y">&nbsp;Yes</option><?php } ?></select>&nbsp;&nbsp;</td>
	
	<td class="hd">Prod<sup>n</sup> Arr./Dispatch&nbsp;<select class="sel" name="ProdArrDisp" id="ProdArrDisp"><?php if($res['ProdArrDisp']=='Y'){ ?><option value="Y" selected>&nbsp;Yes</option><option value="N">&nbsp;No</option><?php } ?><?php if($res['ProdArrDisp']=='N'){ ?><option value="N" selected>&nbsp;No</option><option value="Y">&nbsp;Yes</option><?php } ?></select></td>
					
 </tr>
 </table>
 </td>
 </tr>
 
 <tr><td>&nbsp;</td></tr>
 <tr><td class="ht">&nbsp;&nbsp;Reports</td></tr>
 <tr>
  <td style="background-color:#E2FFC6;">
  <table>
  <tr>
    <td class="hd">&nbsp;&nbsp;Reports&nbsp;<select class="sel" name="Reports" id="Reports"><?php if($res['Reports']=='Y'){ ?><option value="Y" selected>&nbsp;Yes</option><option value="N">&nbsp;No</option><?php } ?><?php if($res['Reports']=='N'){ ?><option value="N" selected>&nbsp;No</option><option value="Y">&nbsp;Yes</option><?php } ?></select>&nbsp;&nbsp;</td>
	
  	<td class="hd">Prod<sup>n</sup> Reports&nbsp;<select class="sel" name="ProdRep" id="ProdRep"><?php if($res['ProdRep']=='Y'){ ?><option value="Y" selected>&nbsp;Yes</option><option value="N">&nbsp;No</option><?php } ?><?php if($res['ProdRep']=='N'){ ?><option value="N" selected>&nbsp;No</option><option value="Y">&nbsp;Yes</option><?php } ?></select>&nbsp;&nbsp;</td>
	
	<td class="hd">Sales Reports&nbsp;<select class="sel" name="SalesRep" id="SalesRep"><?php if($res['SalesRep']=='Y'){ ?><option value="Y" selected>&nbsp;Yes</option><option value="N">&nbsp;No</option><?php } ?><?php if($res['SalesRep']=='N'){ ?><option value="N" selected>&nbsp;No</option><option value="Y">&nbsp;Yes</option><?php } ?></select></td>			
  </tr>
 </table>
 </td>
 </tr>	
 
 <tr><td>&nbsp;</td></tr>
 <tr><td class="ht">&nbsp;&nbsp;Field Assistant</td></tr>
 <tr>
  <td style="background-color:#E2FFC6;">
  <table>
  <tr>
  	<td class="hd">&nbsp;&nbsp;FA Edit&nbsp;<select class="sel" name="FaEdit" id="FaEdit">
<?php if($res['FaEdit']=='Y'){ ?><option value="Y" selected>&nbsp;Yes</option><option value="N">&nbsp;No</option><?php } ?><?php if($res['FaEdit']=='N'){ ?><option value="N" selected>&nbsp;No</option><option value="Y">&nbsp;Yes</option><?php } ?></select>&nbsp;&nbsp;</td>

    <td class="hd">FA Approv&nbsp;<select class="sel" name="FaApproval" id="FaApproval">
<?php if($res['FaApproval']=='Y'){ ?><option value="Y" selected>&nbsp;Yes</option><option value="N">&nbsp;No</option><?php } ?><?php if($res['FaApproval']=='N'){ ?><option value="N" selected>&nbsp;No</option><option value="Y">&nbsp;Yes</option><?php } ?></select>&nbsp;&nbsp;</td>

    <td class="hd">FA Reports&nbsp;<select class="sel" name="FaReports" id="FaReports">
<?php if($res['FaReports']=='Y'){ ?><option value="Y" selected>&nbsp;Yes</option><option value="N">&nbsp;No</option><?php } ?><?php if($res['FaReports']=='N'){ ?><option value="N" selected>&nbsp;No</option><option value="Y">&nbsp;Yes</option><?php } ?></select></td>	 			
  </tr>
  
 
 
 <tr><td>&nbsp;</td></tr>
 <tr><td class="ht">&nbsp;&nbsp;Import Monthly Sales (Daily Basis)</td></tr>
 <tr>
  <td style="background-color:#E2FFC6;">
  <table>
  <tr>
  	<td class="hd">&nbsp;&nbsp;Import Daily Sales&nbsp;<select class="sel" name="ImportExt" id="ImportExt">
<?php if($res['ImportExt']=='Y'){ ?><option value="Y" selected>&nbsp;Yes</option><option value="N">&nbsp;No</option><?php } ?><?php if($res['ImportExt']=='N'){ ?><option value="N" selected>&nbsp;No</option><option value="Y">&nbsp;Yes</option><?php } ?></select>&nbsp;&nbsp;</td>
  </tr> 
  
  
 </table>
 </td>
 </tr>		
 <tr><td>&nbsp;</td></tr>			
 <tr><td align="center"><input type="submit" name="PerSubmit" value="save" style="width:80px;" /> </td></tr>	
 <tr><td class="th" align="center"><font color="#448800"><b><?php echo $msg; ?></b></font></td></tr>				
</form> 
</table>
</center>