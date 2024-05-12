<?php require_once('config/config.php');
if(isset($_POST['CouId']) && $_POST['CouId']!=""){ ?>
<select style="font-size:12px;width:180px;height:20px;background-color:#DDFFBB;" name="State" id="State" onChange="ClickState(this.value)">
<option value="" selected>SELECT</option>	
<?php $sql = mysql_query("SELECT * FROM hrm_state where CountryId=".$_POST['CouId']." order by StateName ASC", $con); while($res = mysql_fetch_array($sql)){ ?>
<option value="<?php echo $res['StateId']; ?>"><?php echo strtoupper($res['StateName']); ?></option><?php } ?></select>
<?php } ?>

<?php if(isset($_POST['StaId']) && $_POST['StaId']!=""){ ?>
<select style="font-size:12px;width:180px;height:20px;background-color:#DDFFBB;" name="Hq" id="Hq" onChange="ClickHq(this.value)"><option value="" selected>SELECT</option>
<?php $sql = mysql_query("SELECT * FROM hrm_headquater where StateId=".$_POST['StaId']." AND CompanyId=".$_POST['CId']." AND HQStatus='A' order by HqName ASC", $con); while($res = mysql_fetch_array($sql)){ ?>
<option value="<?php echo $res['HqId']; ?>"><?php echo strtoupper($res['HqName'])."-".$res['HqId']; ?></option><?php } ?></select>
<?php } ?>


<?php if(isset($_POST['HqId']) && $_POST['HqId']!=""){ ?>
<table border="1">
 <tr bgcolor="#7a6189">
   <td align="center" style="color:#FFFFFF;font-size:14px;width:50px;font-family:Times New Roman;"><b>Check</b></td>
   <td align="center" style="color:#FFFFFF;font-size:14px;width:400px;font-family:Times New Roman;"><b>Distributor</b></td>
   <td align="center" style="color:#FFFFFF;font-size:14px;width:150px;font-family:Times New Roman;"><b>City</b></td>
   <td align="center" style="color:#FFFFFF;font-size:14px;width:100px;font-family:Times New Roman;"><b>ContactNo.</b></td>
   <td align="center" style="color:#FFFFFF;font-size:14px;width:50px;font-family:Times New Roman;"><b>Id</b></td>
   <td align="center" style="color:#FFFFFF;font-size:14px;width:50px;font-family:Times New Roman;"><b>Delete</b></td>
  </tr> 
<?php $sql = mysql_query("SELECT * FROM hrm_sales_dealer where HqId=".$_POST['HqId']." order by DealerName ASC", $con); while($res = mysql_fetch_array($sql)){ ?>    
  <tr bgcolor="#FFFFF" id="<?php echo 'TR'.$res['DealerId']; ?>">
   <td align="center" style="color:#FFFFFF;font-size:14px;font-family:Times New Roman;"><input type="checkbox" id="Check_<?php echo $res['DealerId']; ?>" onClick="ClickDealer(<?php echo $res['DealerId']; ?>,'<?php echo strtoupper($res['DealerName']); ?>','<?php echo strtoupper($res['DealerCity']); ?>','<?php echo strtoupper($res['DealerCont']); ?>','<?php echo strtoupper($res['DealerPerson']); ?>','<?php echo strtoupper($res['DealerEmail']); ?>')"/></td>
   <td style="font-size:14px;font-family:Times New Roman;"><?php echo strtoupper($res['DealerName']); ?></td>
   <td style="font-size:14px;font-family:Times New Roman;"><?php echo strtoupper($res['DealerCity']); ?></td>
   <td style="font-size:14px;font-family:Times New Roman;" align="center"><?php echo strtoupper($res['DealerCont']); ?></td>
   <td align="center" style="font-size:14px;font-family:Times New Roman;"><?php echo $res['DealerId']; ?></td>
   <td align="center" style="font-size:14px;font-family:Times New Roman;"><img src="images/delete.png" border="0" onClick="ClickDelDealer(<?php echo $res['DealerId']; ?>,'<?php echo strtoupper($res['DealerName']); ?>')" /></td>
  </tr>
<?php } ?>    
</table>
<?php } ?>

<?php if(isset($_POST['DealName']) && $_POST['DealName']!=""){
$sql = mysql_query("insert into hrm_sales_dealer(DealerName,DealerCity,DealerPerson,DealerEmail,DealerCont,HqId,CompanyId,CreatedBy,CreatedDate) values('".$_POST['DealName']."', '".$_POST['DealCity']."', '".$_POST['DealPerson']."', '".$_POST['DealEmail']."', '".$_POST['DealCont']."', ".$_POST['hq'].", ".$_POST['ci'].", ".$_POST['ui'].", '".date("Y-m-d")."')", $con); 

$sqlCk=mysql_query("select * from hrm_sales_dealer where HqId=".$_POST['hq'],$con); $rowCk=mysql_num_rows($sqlCk); 
if($rowCk==1)
{ $s1=mysql_query("select EmployeeID from hrm_employee_general where DepartmentId=6 AND HqId=".$_POST['hq'], $con); $row1=mysql_num_rows($s1); 
  if($row1>0)
  { $res1=mysql_fetch_assoc($s1); $s2=mysql_query("select * from hrm_sales_hq_temp where HqId=".$_POST['hq'], $con); $row2=mysql_num_rows($s2); 
    if($row2==0){ if($res1['EmployeeID']==''){$E=0;}else{$E=$res1['EmployeeID'];}
	$sqlU=mysql_query("insert into hrm_sales_hq_temp(HqId,EmployeeID,HqTEmpStatus,HqTEmpFD,CompanyId) values(".$_POST['hq'].",".$E.",'A','".date("Y-m-d")."',".$_POST['ci'].")", $con);}
  }
}
?>
<table border="1">
 <tr bgcolor="#7a6189">
   <td align="center" style="color:#FFFFFF;font-size:14px;width:50px;font-family:Times New Roman;"><b>Check</b></td>
   <td align="center" style="color:#FFFFFF;font-size:14px;width:400px;font-family:Times New Roman;"><b>Distributor</b></td>
   <td align="center" style="color:#FFFFFF;font-size:14px;width:150px;font-family:Times New Roman;"><b>City</b></td>
   <td align="center" style="color:#FFFFFF;font-size:14px;width:100px;font-family:Times New Roman;"><b>ContactNo.</b></td>
  <td align="center" style="color:#FFFFFF;font-size:14px;width:50px;font-family:Times New Roman;"><b>Id</b></td>
   <td align="center" style="color:#FFFFFF;font-size:14px;width:50px;font-family:Times New Roman;"><b>Delete</b></td>
  </tr> 
<?php $sql = mysql_query("SELECT * FROM hrm_sales_dealer where HqId=".$_POST['hq']." order by DealerName ASC", $con); while($res = mysql_fetch_array($sql)){ ?>    
  <tr bgcolor="#FFFFF" id="<?php echo 'TR'.$res['DealerId']; ?>">
   <td align="center" style="color:#FFFFFF;font-size:14px;font-family:Times New Roman;"><input type="checkbox" id="Check_<?php echo $res['DealerId']; ?>" onClick="ClickDealer(<?php echo $res['DealerId']; ?>,'<?php echo strtoupper($res['DealerName']); ?>','<?php echo strtoupper($res['DealerCity']); ?>','<?php echo strtoupper($res['DealerCont']); ?>','<?php echo strtoupper($res['DealerPerson']); ?>','<?php echo strtoupper($res['DealerEmail']); ?>')"/></td>
   <td style="font-size:14px;font-family:Times New Roman;"><?php echo strtoupper($res['DealerName']); ?></td>
   <td style="font-size:14px;font-family:Times New Roman;"><?php echo strtoupper($res['DealerCity']); ?></td>
   <td style="font-size:14px;font-family:Times New Roman;" align="center"><?php echo strtoupper($res['DealerCont']); ?></td>
   <td align="center" style="font-size:14px;font-family:Times New Roman;"><?php echo $res['DealerId']; ?></td>
   <td align="center" style="font-size:14px;font-family:Times New Roman;"><img src="images/delete.png" border="0" onClick="ClickDelDealer(<?php echo $res['DealerId']; ?>,'<?php echo strtoupper($res['DealerName']); ?>')" /></td>
  </tr>
<?php } ?>    
</table>
<?php } ?>

<?php if(isset($_POST['ChangeDealName']) && $_POST['ChangeDealName']!=""){
$sql = mysql_query("update hrm_sales_dealer set DealerName='".$_POST['ChangeDealName']."', DealerCity='".$_POST['DealCity']."', DealerPerson='".$_POST['DealPerson']."', DealerEmail='".$_POST['DealEmail']."', DealerCont='".$_POST['DealCont']."', CreatedBy=".$_POST['ui'].", CreatedDate='".date("Y-m-d")."' where DealerId=".$_POST['DeId'], $con); ?>
<table border="1">
 <tr bgcolor="#7a6189">
   <td align="center" style="color:#FFFFFF;font-size:14px;width:50px;font-family:Times New Roman;"><b>Check</b></td>
   <td align="center" style="color:#FFFFFF;font-size:14px;width:400px;font-family:Times New Roman;"><b>Distributor</b></td>
   <td align="center" style="color:#FFFFFF;font-size:14px;width:150px;font-family:Times New Roman;"><b>City</b></td>
   <td align="center" style="color:#FFFFFF;font-size:14px;width:100px;font-family:Times New Roman;"><b>ContactNo.</b></td>
  <td align="center" style="color:#FFFFFF;font-size:14px;width:50px;font-family:Times New Roman;"><b>Id</b></td>
   <td align="center" style="color:#FFFFFF;font-size:14px;width:50px;font-family:Times New Roman;"><b>Delete</b></td>
  </tr> 
<?php $sql = mysql_query("SELECT * FROM hrm_sales_dealer where HqId=".$_POST['hq']." order by DealerName ASC", $con); while($res = mysql_fetch_array($sql)){ ?>    
  <tr bgcolor="#FFFFF" id="<?php echo 'TR'.$res['DealerId']; ?>">
   <td align="center" style="color:#FFFFFF;font-size:14px;font-family:Times New Roman;"><input type="checkbox" id="Check_<?php echo $res['DealerId']; ?>" onClick="ClickDealer(<?php echo $res['DealerId']; ?>,'<?php echo strtoupper($res['DealerName']); ?>','<?php echo strtoupper($res['DealerCity']); ?>','<?php echo strtoupper($res['DealerCont']); ?>','<?php echo strtoupper($res['DealerPerson']); ?>','<?php echo strtoupper($res['DealerEmail']); ?>')"/></td>
   <td style="font-size:14px;font-family:Times New Roman;"><?php echo strtoupper($res['DealerName']); ?></td>
   <td style="font-size:14px;font-family:Times New Roman;"><?php echo strtoupper($res['DealerCity']); ?></td>
   <td style="font-size:14px;font-family:Times New Roman;" align="center"><?php echo strtoupper($res['DealerCont']); ?></td>
   <td align="center" style="font-size:14px;font-family:Times New Roman;"><?php echo $res['DealerId']; ?></td>
   <td align="center" style="font-size:14px;font-family:Times New Roman;"><img src="images/delete.png" border="0" onClick="ClickDelDealer(<?php echo $res['DealerId']; ?>,'<?php echo strtoupper($res['DealerName']); ?>')" /></td>
  </tr>
<?php } ?>    
</table>
<?php } ?>


<?php if(isset($_POST['DeleteDealId']) && $_POST['DeleteDealId']!=""){
$sql = mysql_query("delete from hrm_sales_dealer where DealerId=".$_POST['DeleteDealId'], $con); ?>
<table border="1">
 <tr bgcolor="#7a6189">
   <td align="center" style="color:#FFFFFF;font-size:14px;width:50px;font-family:Times New Roman;"><b>Check</b></td>
   <td align="center" style="color:#FFFFFF;font-size:14px;width:400px;font-family:Times New Roman;"><b>Distributor</b></td>
   <td align="center" style="color:#FFFFFF;font-size:14px;width:150px;font-family:Times New Roman;"><b>City</b></td>
   <td align="center" style="color:#FFFFFF;font-size:14px;width:100px;font-family:Times New Roman;"><b>ContactNo.</b></td>
   <td align="center" style="color:#FFFFFF;font-size:14px;width:50px;font-family:Times New Roman;"><b>Id</b></td>
   <td align="center" style="color:#FFFFFF;font-size:14px;width:50px;font-family:Times New Roman;"><b>Delete</b></td>
  </tr> 
<?php $sql = mysql_query("SELECT * FROM hrm_sales_dealer where HqId=".$_POST['hq']." order by DealerName ASC", $con); while($res = mysql_fetch_array($sql)){ ?>    
  <tr bgcolor="#FFFFF" id="<?php echo 'TR'.$res['DealerId']; ?>">
   <td align="center" style="color:#FFFFFF;font-size:14px;font-family:Times New Roman;"><input type="checkbox" id="Check_<?php echo $res['DealerId']; ?>" onClick="ClickDealer(<?php echo $res['DealerId']; ?>,'<?php echo strtoupper($res['DealerName']); ?>','<?php echo strtoupper($res['DealerCity']); ?>','<?php echo strtoupper($res['DealerCont']); ?>','<?php echo strtoupper($res['DealerPerson']); ?>','<?php echo strtoupper($res['DealerEmail']); ?>')"/></td>
   <td style="font-size:14px;font-family:Times New Roman;"><?php echo strtoupper($res['DealerName']); ?></td>
   <td style="font-size:14px;font-family:Times New Roman;"><?php echo strtoupper($res['DealerCity']); ?></td>
   <td style="font-size:14px;font-family:Times New Roman;" align="center"><?php echo strtoupper($res['DealerCont']); ?></td>
   <td align="center" style="font-size:14px;font-family:Times New Roman;"><?php echo $res['DealerId']; ?></td>
   <td align="center" style="font-size:14px;font-family:Times New Roman;"><img src="images/delete.png" border="0" onClick="ClickDelDealer(<?php echo $res['DealerId']; ?>,'<?php echo strtoupper($res['DealerName']); ?>')" /></td>
  </tr>
<?php } ?>    
</table>
<?php } ?>

<?php if(isset($_POST['AchiveStaId']) && $_POST['AchiveStaId']!=""){ ?>
<select style="font-size:12px;width:120px;height:20px;background-color:#DDFFBB;" name="Hq" id="Hq" onChange="ClickHq(this.value)">
<option value="" selected>SELECT</option>
<?php $sql = mysql_query("SELECT * FROM hrm_headquater where StateId=".$_POST['AchiveStaId']." AND CompanyId=".$_POST['CId']." AND HQStatus='A' order by HqName ASC", $con); while($res = mysql_fetch_array($sql)){ ?>
<option value="<?php echo $res['HqId']; ?>"><?php echo strtoupper($res['HqName']); ?></option><?php } ?></select>
<?php } ?>

<?php if(isset($_POST['AchiveHqId']) && $_POST['AchiveHqId']!=""){ ?>
<select style="font-size:12px;width:250px;height:20px;background-color:#DDFFBB;" name="DealerD" id="DealerD" onchange="ClickDealer(this.value)">
<option value="" selected>SELECT</option>
<?php $sql = mysql_query("SELECT * FROM hrm_sales_dealer where HqId=".$_POST['AchiveHqId']." order by DealerName ASC", $con); while($res = mysql_fetch_array($sql)){ ?>
<option value="<?php echo $res['DealerId']; ?>"><?php echo $res['DealerName'].'--'.strtoupper($res['DealerCity']); ?></option><?php } ?></select>
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
   <td align="center" style="color:#FFFFFF;font-size:14px;font-family:Times New Roman;"><input type="checkbox" id="Check_<?php echo $res['HqId']; ?>" onClick="ClickHq(<?php echo $res['HqId']; ?>,'<?php echo strtoupper($res['HqName']); ?>')"/></td>
   <td style="font-size:14px;font-family:Times New Roman;" align="center"><?php echo strtoupper($res['HqId']); ?></td>
   <td style="font-size:14px;font-family:Times New Roman;"><?php echo strtoupper($res['HqName']); ?></td>
   <td align="center" style="font-size:14px;font-family:Times New Roman;"><img src="images/delete.png" border="0" onClick="ClickDelDealer(<?php echo $res['HqId']; ?>,'<?php echo strtoupper($res['HqName']); ?>')" /></td>
  </tr>
<?php } ?>    
</table>
<?php } ?>


<?php if(isset($_POST['StaId22']) && $_POST['StaId22']!=""){ ?> 
<select style="font-size:12px;width:170px;height:20px;background-color:#FFB0D8;" id="Hq2_<?php echo $_POST['sn']; ?>" onchange="Fun2Hq(<?php echo $_POST['sn']; ?>)">
<option value="" selected>SELECT</option>
<?php $sql = mysql_query("SELECT * FROM hrm_headquater where StateId=".$_POST['StaId22']." AND CompanyId=".$_POST['CId']." AND HQStatus='A' order by HqName ASC", $con); while($res = mysql_fetch_array($sql)){ ?>
<option value="<?php echo $res['HqId']; ?>"><?php echo strtoupper($res['HqName']); ?></option><?php } ?></select>
<?php } ?>
