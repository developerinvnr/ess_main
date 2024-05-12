<?php require_once('config/config.php'); ?>
<?php if(isset($_POST['ShowVarietyV']) && $_POST['ShowVarietyV']!=""){ ?>
<select class="tdf" style="width:150px;" name="prd" id="prd" onChange="ClickPrd(this.value)">
<option value="0">Select</option>
<?php $sql = mysql_query("SELECT * FROM hrm_sales_seedsproduct where ItemId=".$_POST['ShowVarietyV']." order by ProductName ASC", $con); while($res = mysql_fetch_array($sql)){ $sqlT=mysql_query("select TypeName from hrm_sales_seedtype where TypeId=".$res['TypeId'], $con); $resT=mysql_fetch_assoc($sqlT); if($resT['TypeName']=='HYBRID'){$typ='F1';}else{$typ=$resT['TypeName'];} ?><option value="<?php echo $res['ProductId']; ?>"><?php echo ucfirst(strtolower($res['ProductName'])).' - '.strtoupper($typ); ?></option><?php } ?>
</select>

<?php }  elseif(isset($_POST['ShowSizeyV']) && $_POST['ShowSizeyV']!=""){ ?>
<select class="tdf" style="width:150px;" name="pkt" id="pkt">
<option value="0">Select</option>
<?php $sqlz = mysql_query("SELECT i.SizeId,SizeName FROM hrm_sales_itemmaster i inner join hrm_sales_itemsize z on i.SizeId=z.SizeId where i.ProductId=".$_POST['ShowSizeyV']." order by SizeName ASC", $con); while($resz = mysql_fetch_array($sqlz)){ ?><option value="<?php echo $resz['SizeId']; ?>"><?php echo ucfirst(strtolower($resz['SizeName'])); ?></option><?php } ?>
</select>
<?php } ?>
