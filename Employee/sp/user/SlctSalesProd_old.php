<?php require_once('config/config.php'); ?>
<?php if(isset($_POST['PItemId']) && $_POST['PItemId']!=""){ ?>
<table border="1">
 <tr bgcolor="#7a6189">
   <td align="center" style="color:#FFFFFF;font-size:14px;width:50px;font-family:Times New Roman;"><b>Check</b></td>
   <td align="center" style="color:#FFFFFF;font-size:14px;width:300px;font-family:Times New Roman;"><b>Product Name</b></td>
   <td align="center" style="color:#FFFFFF;font-size:14px;width:80px;font-family:Times New Roman;"><b>Type</b></td>
   <td align="center" style="color:#FFFFFF;font-size:14px;width:150px;font-family:Times New Roman;"><b>NRV(Per KG)</b></td>
   <td align="center" style="color:#FFFFFF;font-size:14px;width:80px;font-family:Times New Roman;"><b>ProductId</b></td>
   <td align="center" style="color:#FFFFFF;font-size:14px;width:50px;font-family:Times New Roman;"><b>Delete</b></td>
  </tr> 
<?php $sql = mysql_query("SELECT * FROM hrm_sales_seedsproduct where ItemId=".$_POST['PItemId']." order by ProductName ASC", $con);
     while($res = mysql_fetch_array($sql)){ 
      $sqlN = mysql_query("SELECT NRV FROM hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND PStatus='A'", $con); $resN = mysql_fetch_array($sqlN);	
	  if($resN['NRV']>0){$NRV=$resN['NRV'];}else{$NRV=0;} 
      $sqlT=mysql_query("select TypeName from hrm_sales_seedtype where TypeId=".$res['TypeId'], $con); $resT=mysql_fetch_assoc($sqlT); ?>    
  <tr bgcolor="#FFFFF" id="<?php echo 'TR'.$res['ProductId']; ?>">
   <td align="center" style="color:#FFFFFF;font-size:14px;font-family:Times New Roman;"><input type="checkbox" id="Check_<?php echo $res['ProductId']; ?>" onClick="ClickProduct(<?php echo $res['ProductId']; ?>,'<?php echo strtoupper($res['ProductName']); ?>',<?php echo $res['TypeId']; ?>,<?php echo $NRV; ?>)"/></td>
   <td style="font-size:14px;font-family:Times New Roman;"><?php echo strtoupper($res['ProductName']); ?></td>
   <td style="font-size:14px;font-family:Times New Roman;"><?php echo strtoupper($resT['TypeName']); ?></td>
   <td align="right" style="font-size:14px;font-family:Times New Roman;"><?php echo $resN['NRV']; ?></td>  
   <td align="center" style="font-size:14px;font-family:Times New Roman;"><?php echo $res['ProductId']; ?></td>
   <td align="center" style="font-size:14px;font-family:Times New Roman;"><img src="images/delete.png" border="0" onClick="ClickDelProduct(<?php echo $res['ProductId']; ?>,'<?php echo strtoupper($res['ProductName']); ?>')" /></td>
  </tr>
<?php } ?>    
</table>
<?php } ?>

<?php if(isset($_POST['ProductName']) && $_POST['ProductName']!=""){ 
$sql = mysql_query("insert into hrm_sales_seedsproduct(ProductName, ItemId, TypeId) values('".$_POST['ProductName']."', ".$_POST['ItemId'].", ".$_POST['ProductType'].")", $con); $sqlS=mysql_query("select ProductId from hrm_sales_seedsproduct where ProductName='".$_POST['ProductName']."' AND ItemId=".$_POST['ItemId'], $con);
$resS=mysql_fetch_assoc($sqlS); $sql2 = mysql_query("insert into hrm_sales_product_nrv(ProductId, NRV, YearId, Fdate) values('".$resS['ProductId']."', ".$_POST['NRV'].", ".$_POST['YId'].", '".date("Y-m-d",strtotime($_POST['NRVD']))."')", $con);?>
<table border="1">
 <tr bgcolor="#7a6189">
   <td align="center" style="color:#FFFFFF;font-size:14px;width:50px;font-family:Times New Roman;"><b>Check</b></td>
   <td align="center" style="color:#FFFFFF;font-size:14px;width:300px;font-family:Times New Roman;"><b>Product Name</b></td>
   <td align="center" style="color:#FFFFFF;font-size:14px;width:80px;font-family:Times New Roman;"><b>Type</b></td>
   <td align="center" style="color:#FFFFFF;font-size:14px;width:150px;font-family:Times New Roman;"><b>NRV(Per KG)</b></td>
   <td align="center" style="color:#FFFFFF;font-size:14px;width:80px;font-family:Times New Roman;"><b>ProductId</b></td>
   <td align="center" style="color:#FFFFFF;font-size:14px;width:50px;font-family:Times New Roman;"><b>Delete</b></td>
  </tr> 
<?php $sql = mysql_query("SELECT * FROM hrm_sales_seedsproduct where ItemId=".$_POST['ItemId']." order by ProductName ASC", $con);
      while($res = mysql_fetch_array($sql)){ 
      $sqlN = mysql_query("SELECT NRV FROM hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND PStatus='A'", $con); $resN = mysql_fetch_array($sqlN);	
	  if($resN['NRV']>0){$NRV=$resN['NRV'];}else{$NRV=0;} 
      $sqlT=mysql_query("select TypeName from hrm_sales_seedtype where TypeId=".$res['TypeId'], $con); $resT=mysql_fetch_assoc($sqlT); ?>    
  <tr bgcolor="#FFFFF" id="<?php echo 'TR'.$res['ProductId']; ?>">
   <td align="center" style="color:#FFFFFF;font-size:14px;font-family:Times New Roman;"><input type="checkbox" id="Check_<?php echo $res['ProductId']; ?>" onClick="ClickProduct(<?php echo $res['ProductId']; ?>,'<?php echo strtoupper($res['ProductName']); ?>',<?php echo $res['TypeId']; ?>,<?php echo $NRV; ?>)"/></td>
   <td style="font-size:14px;font-family:Times New Roman;"><?php echo strtoupper($res['ProductName']); ?></td>   
   <td style="font-size:14px;font-family:Times New Roman;"><?php echo strtoupper($resT['TypeName']); ?></td> 
   <td align="right" style="font-size:14px;font-family:Times New Roman;"><?php echo $resN['NRV']; ?></td>    
   <td align="center" style="font-size:14px;font-family:Times New Roman;"><?php echo $res['ProductId']; ?></td>
   <td align="center" style="font-size:14px;font-family:Times New Roman;"><img src="images/delete.png" border="0" onClick="ClickDelProduct(<?php echo $res['ProductId']; ?>,'<?php echo strtoupper($res['ProductName']); ?>')" /></td>
  </tr>
<?php } ?>    
</table>
<?php } ?>

<?php if(isset($_POST['ChangeProductName']) && $_POST['ChangeProductName']!=""){ 
$sql=mysql_query("update hrm_sales_seedsproduct set ProductName='".$_POST['ChangeProductName']."', TypeId='".$_POST['ProductType']."' where ProductId=".$_POST['ProductId'], $con); 
$sqlS=mysql_query("select * from hrm_sales_product_nrv where ProductId=".$_POST['ProductId']." AND PStatus='A'",$con); $resS=mysql_fetch_assoc($sqlS);
if($resS['NRV']!=$_POST['NRV'])
{
$sqlU=mysql_query("update hrm_sales_product_nrv set Tdate='".date("Y-m-d",strtotime($_POST['NRVD']))."',PStatus='D' where ProductId=".$_POST['ProductId']." AND PStatus='A'", $con);
$sqlIns = mysql_query("insert into hrm_sales_product_nrv(ProductId,NRV,YearId,Fdate) values('".$_POST['ProductId']."',".$_POST['NRV'].",".$_POST['YId'].",'".date("Y-m-d",strtotime($_POST['NRVD']))."')", $con); 
}

/*
//$sqlS=mysql_query("select * from hrm_sales_product_nrv where ProductId=".$_POST['ProductId']." AND Fdate='".date("Y-m-d",strtotime($_POST['NRVD']))."'",$con); 
$rowS=mysql_num_rows($sqlS);
if($rowS>0)
{ $sqlU = mysql_query("update hrm_sales_product_nrv set NRV='".$_POST['NRV']."' where ProductId=".$_POST['ProductId'], $con); }
if($rowS==0)
{ $sqlU = mysql_query("update hrm_sales_product_nrv set Tdate='".date("Y-m-d",strtotime($_POST['NRVD']))."',PStatus='D' where ProductId=".$_POST['ProductId'], $con); 
  $sqlIns = mysql_query("insert into hrm_sales_product_nrv(ProductId,NRV,YearId,Fdate) values('".$_POST['ProductId']."',".$_POST['NRV'].",".$_POST['YId'].",'".date("Y-m-d",strtotime($_POST['NRVD']))."')", $con);  
}
*/
?>
<table border="1">
 <tr bgcolor="#7a6189">
   <td align="center" style="color:#FFFFFF;font-size:14px;width:50px;font-family:Times New Roman;"><b>Check</b></td>
   <td align="center" style="color:#FFFFFF;font-size:14px;width:300px;font-family:Times New Roman;"><b>Product Name</b></td>
   <td align="center" style="color:#FFFFFF;font-size:14px;width:80px;font-family:Times New Roman;"><b>Type</b></td>
   <td align="center" style="color:#FFFFFF;font-size:14px;width:150px;font-family:Times New Roman;"><b>NRV(Per KG)</b></td>
   <td align="center" style="color:#FFFFFF;font-size:14px;width:80px;font-family:Times New Roman;"><b>ProductId</b></td>
   <td align="center" style="color:#FFFFFF;font-size:14px;width:50px;font-family:Times New Roman;"><b>Delete</b></td>
  </tr> 
<?php $sql = mysql_query("SELECT * FROM hrm_sales_seedsproduct where ItemId=".$_POST['ItemId']." order by ProductName ASC", $con);
      while($res = mysql_fetch_array($sql)){ 
      $sqlN = mysql_query("SELECT NRV FROM hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND PStatus='A'", $con); $resN = mysql_fetch_array($sqlN);	
	  if($resN['NRV']>0){$NRV=$resN['NRV'];}else{$NRV=0;} 
      $sqlT=mysql_query("select TypeName from hrm_sales_seedtype where TypeId=".$res['TypeId'], $con); $resT=mysql_fetch_assoc($sqlT);
?>    
  <tr bgcolor="#FFFFF" id="<?php echo 'TR'.$res['ProductId']; ?>">
   <td align="center" style="color:#FFFFFF;font-size:14px;font-family:Times New Roman;"><input type="checkbox" id="Check_<?php echo $res['ProductId']; ?>" onClick="ClickProduct(<?php echo $res['ProductId']; ?>,'<?php echo strtoupper($res['ProductName']); ?>',<?php echo $res['TypeId']; ?>,<?php echo $NRV; ?>)"/></td>
   <td style="font-size:14px;font-family:Times New Roman;"><?php echo strtoupper($res['ProductName']); ?></td>
   <td style="font-size:14px;font-family:Times New Roman;"><?php echo strtoupper($resT['TypeName']); ?></td>   
   <td align="right" style="font-size:14px;font-family:Times New Roman;"><?php echo $resN['NRV']; ?></td>  
   <td align="center" style="font-size:14px;font-family:Times New Roman;"><?php echo $res['ProductId']; ?></td>
   <td align="center" style="font-size:14px;font-family:Times New Roman;"><img src="images/delete.png" border="0" onClick="ClickDelProduct(<?php echo $res['ProductId']; ?>,'<?php echo strtoupper($res['ProductName']); ?>')" /></td>
  </tr>
<?php } ?>    
</table>
<?php } ?>

<?php if(isset($_POST['DeleteProductId']) && $_POST['DeleteProductId']!=""){ 
//$sql = mysql_query("delete from hrm_sales_seedsproduct where ProductId=".$_POST['DeleteProductId'], $con); 
//$sql2 = mysql_query("delete from hrm_sales_product_nrv where ProductId=".$_POST['DeleteProductId']." AND PStatus='A'", $con); ?>
<table border="1">
 <tr bgcolor="#7a6189">
   <td align="center" style="color:#FFFFFF;font-size:14px;width:50px;font-family:Times New Roman;"><b>Check</b></td>
   <td align="center" style="color:#FFFFFF;font-size:14px;width:300px;font-family:Times New Roman;"><b>Product Name</b></td>
   <td align="center" style="color:#FFFFFF;font-size:14px;width:80px;font-family:Times New Roman;"><b>Type</b></td>
   <td align="center" style="color:#FFFFFF;font-size:14px;width:150px;font-family:Times New Roman;"><b>NRV(Per KG)</b></td>
   <td align="center" style="color:#FFFFFF;font-size:14px;width:80px;font-family:Times New Roman;"><b>ProductId</b></td>
   <td align="center" style="color:#FFFFFF;font-size:14px;width:50px;font-family:Times New Roman;"><b>Delete</b></td>
  </tr> 
<?php $sql = mysql_query("SELECT * FROM hrm_sales_seedsproduct where ItemId=".$_POST['ItemId']." order by ProductName ASC", $con);
      while($res = mysql_fetch_array($sql)){ 
      $sqlN = mysql_query("SELECT NRV FROM hrm_sales_product_nrv where ProductId=".$res['ProductId']." AND PStatus='A'", $con); $resN = mysql_fetch_array($sqlN);	
	  if($resN['NRV']>0){$NRV=$resN['NRV'];}else{$NRV=0;} 
      $sqlT=mysql_query("select TypeName from hrm_sales_seedtype where TypeId=".$res['TypeId'], $con); $resT=mysql_fetch_assoc($sqlT);
?>    
  <tr bgcolor="#FFFFF" id="<?php echo 'TR'.$res['ProductId']; ?>">
   <td align="center" style="color:#FFFFFF;font-size:14px;font-family:Times New Roman;"><input type="checkbox" id="Check_<?php echo $res['ProductId']; ?>" onClick="ClickProduct(<?php echo $res['ProductId']; ?>,'<?php echo strtoupper($res['ProductName']); ?>',<?php echo $res['TypeId']; ?>,<?php echo $NRV; ?>)"/></td>
   <td style="font-size:14px;font-family:Times New Roman;"><?php echo strtoupper($res['ProductName']); ?></td>
   <td style="font-size:14px;font-family:Times New Roman;"><?php echo strtoupper($resT['TypeName']); ?></td>  
   <td align="right" style="font-size:14px;font-family:Times New Roman;"><?php echo $resN['NRV']; ?></td> 
   <td align="center" style="font-size:14px;font-family:Times New Roman;"><?php echo $res['ProductId']; ?></td>
   <td align="center" style="font-size:14px;font-family:Times New Roman;"><img src="images/delete.png" border="0" onClick="ClickDelProduct(<?php echo $res['ProductId']; ?>,'<?php echo strtoupper($res['ProductName']); ?>')" /></td>
  </tr>
<?php } ?>    
</table>
<?php } ?>


