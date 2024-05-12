<?php require_once('config/config.php');
if(isset($_POST['CouId']) && $_POST['CouId']!=""){ ?>
<select style="font-size:12px;width:180px;height:20px;background-color:#DDFFBB;" name="State" id="State" onChange="ClickState(this.value)">
<option value="" selected>Select</option>	
<?php $sql = mysql_query("SELECT * FROM hrm_state where CountryId=".$_POST['CouId']." order by StateName ASC", $con); while($res = mysql_fetch_array($sql)){ ?>
<option value="<?php echo $res['StateId']; ?>"><?php echo $res['StateName']; ?></option><?php } ?></select>
<?php } ?>

<?php if(isset($_POST['StaIdHq']) && $_POST['StaIdHq']!=""){ ?>
<table border="1">
 <tr bgcolor="#7a6189">
   <td align="center" style="color:#FFFFFF;font-size:14px;width:50px;font-family:Times New Roman;"><b>Check</b></td>
   <td align="center" style="color:#FFFFFF;font-size:14px;width:50px;font-family:Times New Roman;"><b>HqId</b></td>
   <td align="center" style="color:#FFFFFF;font-size:14px;width:400px;font-family:Times New Roman;"><b>Head Quarter Name</b></td>
    <td align="center" style="color:#FFFFFF;font-size:14px;width:50px;font-family:Times New Roman;"><b>Delete</b></td>
  </tr> 
<?php $sql = mysql_query("SELECT * FROM hrm_headquater where StateId=".$_POST['StaIdHq']." AND CompanyId=".$_POST['CId']." AND HQStatus='A' order by HqName ASC", $con); 
      while($res = mysql_fetch_array($sql)){ ?>    
  <tr bgcolor="#FFFFF" id="<?php echo 'TR'.$res['HqId']; ?>">
   <td align="center" style="color:#FFFFFF;font-size:14px;font-family:Times New Roman;"><input type="checkbox" id="Check_<?php echo $res['HqId']; ?>" onClick="ClickHq(<?php echo $res['HqId']; ?>,'<?php echo $res['HqName']; ?>')"/></td>
   <td style="font-size:14px;font-family:Times New Roman;" align="center"><?php echo $res['HqId']; ?></td>
   <td style="font-size:14px;font-family:Times New Roman;"><?php echo $res['HqName']; ?></td>
   <td align="center" style="font-size:14px;font-family:Times New Roman;"><img src="images/delete.png" border="0" onClick="ClickDelHq(<?php echo $res['HqId']; ?>,'<?php echo $res['HqName']; ?>')" /></td>
  </tr>
<?php } ?>    
</table>
<?php } ?>


<?php if(isset($_POST['HqName']) && $_POST['HqName']!=""){
$sql = mysql_query("insert into hrm_headquater(HqName,StateId,CompanyId,CreatedBy,CreatedDate,YearId) values('".$_POST['HqName']."', '".$_POST['si']."', '".$_POST['ci']."', ".$_POST['ui'].", '".date("Y-m-d")."', ".$_POST['yi'].")", $con); ?>
<table border="1">
<tr bgcolor="#7a6189">
   <td align="center" style="color:#FFFFFF;font-size:14px;width:50px;font-family:Times New Roman;"><b>Check</b></td>
   <td align="center" style="color:#FFFFFF;font-size:14px;width:50px;font-family:Times New Roman;"><b>HqId</b></td>
   <td align="center" style="color:#FFFFFF;font-size:14px;width:400px;font-family:Times New Roman;"><b>Head Quarter Name</b></td>
    <td align="center" style="color:#FFFFFF;font-size:14px;width:50px;font-family:Times New Roman;"><b>Delete</b></td>
  </tr> 
<?php $sql = mysql_query("SELECT * FROM hrm_headquater where StateId=".$_POST['si']." AND CompanyId=".$_POST['ci']." AND HQStatus='A' order by HqName ASC", $con); 
      while($res = mysql_fetch_array($sql)){ ?>    
  <tr bgcolor="#FFFFF" id="<?php echo 'TR'.$res['HqId']; ?>">
   <td align="center" style="color:#FFFFFF;font-size:14px;font-family:Times New Roman;"><input type="checkbox" id="Check_<?php echo $res['HqId']; ?>" onClick="ClickHq(<?php echo $res['HqId']; ?>,'<?php echo $res['HqName']; ?>')"/></td>
   <td style="font-size:14px;font-family:Times New Roman;" align="center"><?php echo $res['HqId']; ?></td>
   <td style="font-size:14px;font-family:Times New Roman;"><?php echo $res['HqName']; ?></td>
   <td align="center" style="font-size:14px;font-family:Times New Roman;"><img src="images/delete.png" border="0" onClick="ClickDelHq(<?php echo $res['HqId']; ?>,'<?php echo $res['HqName']; ?>')" /></td>
  </tr>
<?php } ?>    
</table>
<?php } ?>

<?php if(isset($_POST['ChangeHqName']) && $_POST['ChangeHqName']!=""){
$sql = mysql_query("update hrm_headquater set HqName='".$_POST['ChangeHqName']."' where HqId=".$_POST['HqId'], $con); ?>
<table border="1">
 <tr bgcolor="#7a6189">
   <td align="center" style="color:#FFFFFF;font-size:14px;width:50px;font-family:Times New Roman;"><b>Check</b></td>
   <td align="center" style="color:#FFFFFF;font-size:14px;width:50px;font-family:Times New Roman;"><b>HqId</b></td>
   <td align="center" style="color:#FFFFFF;font-size:14px;width:400px;font-family:Times New Roman;"><b>Head Quarter Name</b></td>
    <td align="center" style="color:#FFFFFF;font-size:14px;width:50px;font-family:Times New Roman;"><b>Delete</b></td>
  </tr> 
<?php $sql = mysql_query("SELECT * FROM hrm_headquater where StateId=".$_POST['si']." AND CompanyId=".$_POST['ci']." AND HQStatus='A' order by HqName ASC", $con); 
      while($res = mysql_fetch_array($sql)){ ?>    
  <tr bgcolor="#FFFFF" id="<?php echo 'TR'.$res['HqId']; ?>">
   <td align="center" style="color:#FFFFFF;font-size:14px;font-family:Times New Roman;"><input type="checkbox" id="Check_<?php echo $res['HqId']; ?>" onClick="ClickHq(<?php echo $res['HqId']; ?>,'<?php echo $res['HqName']; ?>')"/></td>
   <td style="font-size:14px;font-family:Times New Roman;" align="center"><?php echo $res['HqId']; ?></td>
   <td style="font-size:14px;font-family:Times New Roman;"><?php echo $res['HqName']; ?></td>
   <td align="center" style="font-size:14px;font-family:Times New Roman;"><img src="images/delete.png" border="0" onClick="ClickDelHq(<?php echo $res['HqId']; ?>,'<?php echo $res['HqName']; ?>')" /></td>
  </tr>
<?php } ?>       
</table>
<?php } ?>


<?php if(isset($_POST['DeleteHqId']) && $_POST['DeleteHqId']!=""){
$sql = mysql_query("delete from hrm_headquater where HqId=".$_POST['DeleteHqId'], $con); ?>
<table border="1">
<tr bgcolor="#7a6189">
   <td align="center" style="color:#FFFFFF;font-size:14px;width:50px;font-family:Times New Roman;"><b>Check</b></td>
   <td align="center" style="color:#FFFFFF;font-size:14px;width:50px;font-family:Times New Roman;"><b>HqId</b></td>
   <td align="center" style="color:#FFFFFF;font-size:14px;width:400px;font-family:Times New Roman;"><b>Head Quarter Name</b></td>
    <td align="center" style="color:#FFFFFF;font-size:14px;width:50px;font-family:Times New Roman;"><b>Delete</b></td>
  </tr> 
<?php $sql = mysql_query("SELECT * FROM hrm_headquater where StateId=".$_POST['si']." AND CompanyId=".$_POST['ci']." AND HQStatus='A' order by HqName ASC", $con); 
      while($res = mysql_fetch_array($sql)){ ?>    
  <tr bgcolor="#FFFFF" id="<?php echo 'TR'.$res['HqId']; ?>">
   <td align="center" style="color:#FFFFFF;font-size:14px;font-family:Times New Roman;"><input type="checkbox" id="Check_<?php echo $res['HqId']; ?>" onClick="ClickHq(<?php echo $res['HqId']; ?>,'<?php echo $res['HqName']; ?>')"/></td>
   <td style="font-size:14px;font-family:Times New Roman;" align="center"><?php echo $res['HqId']; ?></td>
   <td style="font-size:14px;font-family:Times New Roman;"><?php echo $res['HqName']; ?></td>
   <td align="center" style="font-size:14px;font-family:Times New Roman;"><img src="images/delete.png" border="0" onClick="ClickDelHq(<?php echo $res['HqId']; ?>,'<?php echo $res['HqName']; ?>')" /></td>
  </tr>
<?php } ?>    
</table>
<?php } ?>
