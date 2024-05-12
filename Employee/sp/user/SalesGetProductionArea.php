<?php require_once('config/config.php');
if(isset($_POST['CouId']) && $_POST['CouId']!=""){ ?>
<select style="font-size:12px;width:180px;height:20px;background-color:#DDFFBB;" name="State" id="State" onChange="ClickState(this.value)">
<option value="" selected>SELECT</option>	
<?php $sql = mysql_query("SELECT * FROM hrm_state where CountryId=".$_POST['CouId']." order by StateName ASC", $con); while($res = mysql_fetch_array($sql)){ ?>
<option value="<?php echo $res['StateId']; ?>"><?php echo strtoupper($res['StateName']); ?></option><?php } ?></select>
<?php } ?>

<?php if(isset($_POST['StaId']) && $_POST['StaId']!=""){ ?>
<table border="1">
 <tr bgcolor="#7a6189">
   <td align="center" style="color:#FFFFFF;font-size:14px;width:50px;font-family:Times New Roman;"><b>Check</b></td>
   <td align="center" style="color:#FFFFFF;font-size:14px;width:400px;font-family:Times New Roman;"><b>Distric Name</b></td>
   <td align="center" style="color:#FFFFFF;font-size:14px;width:50px;font-family:Times New Roman;"><b>Delete</b></td>
  </tr> 
<?php $sql = mysql_query("SELECT * FROM hrm_sales_distric where StateId=".$_POST['StaId']." order by DistName ASC", $con); while($res = mysql_fetch_array($sql)){ ?>    
  <tr bgcolor="#FFFFF" id="<?php echo 'TR'.$res['DistId']; ?>">
   <td align="center" style="color:#FFFFFF;font-size:14px;font-family:Times New Roman;"><input type="checkbox" id="Check_<?php echo $res['DistId']; ?>" onClick="ClickDist(<?php echo $res['DistId']; ?>,'<?php echo strtoupper($res['DistName']); ?>')"/></td>
   <td style="font-size:14px;font-family:Times New Roman;"><?php echo strtoupper($res['DistName']); ?></td>
   <td align="center" style="font-size:14px;font-family:Times New Roman;"><img src="images/delete.png" border="0" onClick="ClickDelDist(<?php echo $res['DistId']; ?>,'<?php echo strtoupper($res['DistName']); ?>')" /></td>
  </tr>
<?php } ?>    
</table>
<?php } ?>


<?php if(isset($_POST['DistName']) && $_POST['DistName']!=""){
$sql = mysql_query("insert into hrm_sales_distric(DistName,StateId) values('".$_POST['DistName']."', '".$_POST['St']."')", $con); ?>
<table border="1">
 <tr bgcolor="#7a6189">
   <td align="center" style="color:#FFFFFF;font-size:14px;width:50px;font-family:Times New Roman;"><b>Check</b></td>
   <td align="center" style="color:#FFFFFF;font-size:14px;width:400px;font-family:Times New Roman;"><b>Distric Name</b></td>
   <td align="center" style="color:#FFFFFF;font-size:14px;width:50px;font-family:Times New Roman;"><b>Delete</b></td>
  </tr> 
<?php $sql = mysql_query("SELECT * FROM hrm_sales_distric where StateId=".$_POST['St']." order by DistName ASC", $con); while($res = mysql_fetch_array($sql)){ ?>    
  <tr bgcolor="#FFFFF" id="<?php echo 'TR'.$res['DistId']; ?>">
   <td align="center" style="color:#FFFFFF;font-size:14px;font-family:Times New Roman;"><input type="checkbox" id="Check_<?php echo $res['DistId']; ?>" onClick="ClickDist(<?php echo $res['DistId']; ?>,'<?php echo strtoupper($res['DistName']); ?>')"/></td>
   <td style="font-size:14px;font-family:Times New Roman;"><?php echo strtoupper($res['DistName']); ?></td>
   <td align="center" style="font-size:14px;font-family:Times New Roman;"><img src="images/delete.png" border="0" onClick="ClickDelDist(<?php echo $res['DistId']; ?>,'<?php echo strtoupper($res['DistName']); ?>')" /></td>
  </tr>
<?php } ?>    
</table>
<?php } ?>

<?php if(isset($_POST['ChangeDistName']) && $_POST['ChangeDistName']!=""){
$sql = mysql_query("update hrm_sales_distric set DistName='".$_POST['ChangeDistName']."' where DistId=".$_POST['DistId'], $con); ?>
<table border="1">
 <tr bgcolor="#7a6189">
   <td align="center" style="color:#FFFFFF;font-size:14px;width:50px;font-family:Times New Roman;"><b>Check</b></td>
   <td align="center" style="color:#FFFFFF;font-size:14px;width:400px;font-family:Times New Roman;"><b>Distric Name</b></td>
   <td align="center" style="color:#FFFFFF;font-size:14px;width:50px;font-family:Times New Roman;"><b>Delete</b></td>
  </tr> 
<?php $sql = mysql_query("SELECT * FROM hrm_sales_distric where StateId=".$_POST['St']." order by DistName ASC", $con); while($res = mysql_fetch_array($sql)){ ?>    
  <tr bgcolor="#FFFFF" id="<?php echo 'TR'.$res['DistId']; ?>">
   <td align="center" style="color:#FFFFFF;font-size:14px;font-family:Times New Roman;"><input type="checkbox" id="Check_<?php echo $res['DistId']; ?>" onClick="ClickDist(<?php echo $res['DistId']; ?>,'<?php echo strtoupper($res['DistName']); ?>')"/></td>
   <td style="font-size:14px;font-family:Times New Roman;"><?php echo strtoupper($res['DistName']); ?></td>
   <td align="center" style="font-size:14px;font-family:Times New Roman;"><img src="images/delete.png" border="0" onClick="ClickDelDist(<?php echo $res['DistId']; ?>,'<?php echo strtoupper($res['DistName']); ?>')" /></td>
  </tr>
<?php } ?>    
</table>
<?php } ?>


<?php if(isset($_POST['DeleteDistId']) && $_POST['DeleteDistId']!=""){
$sql = mysql_query("delete from hrm_sales_distric where DistId=".$_POST['DeleteDistId'], $con); ?>
<table border="1">
 <tr bgcolor="#7a6189">
   <td align="center" style="color:#FFFFFF;font-size:14px;width:50px;font-family:Times New Roman;"><b>Check</b></td>
   <td align="center" style="color:#FFFFFF;font-size:14px;width:400px;font-family:Times New Roman;"><b>Distric Name</b></td>
   <td align="center" style="color:#FFFFFF;font-size:14px;width:50px;font-family:Times New Roman;"><b>Delete</b></td>
  </tr> 
<?php $sql = mysql_query("SELECT * FROM hrm_sales_distric where StateId=".$_POST['St']." order by DistName ASC", $con); while($res = mysql_fetch_array($sql)){ ?>    
  <tr bgcolor="#FFFFF" id="<?php echo 'TR'.$res['DistId']; ?>">
   <td align="center" style="color:#FFFFFF;font-size:14px;font-family:Times New Roman;"><input type="checkbox" id="Check_<?php echo $res['DistId']; ?>" onClick="ClickDist(<?php echo $res['DistId']; ?>,'<?php echo strtoupper($res['DistName']); ?>')"/></td>
   <td style="font-size:14px;font-family:Times New Roman;"><?php echo strtoupper($res['DistName']); ?></td>
   <td align="center" style="font-size:14px;font-family:Times New Roman;"><img src="images/delete.png" border="0" onClick="ClickDelDist(<?php echo $res['DistId']; ?>,'<?php echo strtoupper($res['DistName']); ?>')" /></td>
  </tr>
<?php } ?>    
</table>
<?php } ?>



<?php if(isset($_POST['VStateId']) && $_POST['VStateId']!=""){ ?>
<select style="font-size:12px;width:180px;height:20px;background-color:#DDFFBB;" name="Dist" id="Dist" onChange="ClickDist(this.value)">
<option value="" selected>SELECT</option>	
<?php $sql = mysql_query("SELECT * FROM hrm_sales_distric where StateId=".$_POST['VStateId']." order by DistName ASC", $con); while($res = mysql_fetch_array($sql)){ ?>
<option value="<?php echo $res['DistId']; ?>"><?php echo strtoupper($res['DistName']); ?></option><?php } ?></select>
<?php } ?>

<?php if(isset($_POST['VDistId']) && $_POST['VDistId']!=""){ ?>
<table border="1">
 <tr bgcolor="#7a6189">
   <td align="center" style="color:#FFFFFF;font-size:14px;width:50px;font-family:Times New Roman;"><b>Check</b></td>
   <td align="center" style="color:#FFFFFF;font-size:14px;width:400px;font-family:Times New Roman;"><b>Area</b></td>
   <td align="center" style="color:#FFFFFF;font-size:14px;width:60px;font-family:Times New Roman;"><b>Code</b></td>
   <td align="center" style="color:#FFFFFF;font-size:14px;width:50px;font-family:Times New Roman;"><b>Delete</b></td>
  </tr> 
<?php $sql = mysql_query("SELECT * FROM hrm_sales_areavillage where DistId=".$_POST['VDistId']." order by AreaName ASC", $con); while($res = mysql_fetch_array($sql)){ ?>    
  <tr bgcolor="#FFFFF" id="<?php echo 'TR'.$res['AreaId']; ?>">
   <td align="center" style="color:#FFFFFF;font-size:14px;font-family:Times New Roman;"><input type="checkbox" id="Check_<?php echo $res['AreaId']; ?>" onClick="ClickVillage(<?php echo $res['AreaId']; ?>,'<?php echo strtoupper($res['AreaName']); ?>','<?php echo strtoupper($res['AreaCode']); ?>')"/></td>
   <td style="font-size:14px;font-family:Times New Roman;"><?php echo strtoupper($res['AreaName']); ?></td>
   <td style="font-size:14px;font-family:Times New Roman;"><?php echo strtoupper($res['AreaCode']); ?></td>
   <td align="center" style="font-size:14px;font-family:Times New Roman;"><img src="images/delete.png" border="0" onClick="ClickDelVillage(<?php echo $res['AreaId']; ?>,'<?php echo strtoupper($res['AreaName']); ?>')" /></td>
  </tr>
<?php } ?>    
</table>
<?php } ?>

<?php if(isset($_POST['VDistId2']) && $_POST['VDistId2']!=""){ ?>
<select style="font-size:12px;width:180px;height:20px;background-color:#DDFFBB;" name="Area" id="Area" onChange="ClickArea(this.value)">
<option value="" selected>SELECT</option>	
<?php $sql = mysql_query("SELECT * FROM hrm_sales_areavillage where DistId=".$_POST['VDistId2']." order by AreaName ASC", $con); while($res = mysql_fetch_array($sql)){ ?>
<option value="<?php echo $res['AreaId']; ?>"><?php echo strtoupper($res['AreaName']); ?></option><?php } ?></select>
<?php } ?>


<?php if(isset($_POST['VAreaId2']) && $_POST['VAreaId2']!=""){ ?>
<table border="1">
 <tr bgcolor="#7a6189">
   <td align="center" style="color:#FFFFFF;font-size:14px;width:50px;font-family:Times New Roman;"><b>Check</b></td>
   <td align="center" style="color:#FFFFFF;font-size:14px;width:400px;font-family:Times New Roman;"><b>Village/ Location</b></td>
   <td align="center" style="color:#FFFFFF;font-size:14px;width:50px;font-family:Times New Roman;"><b>Delete</b></td>
  </tr> 
<?php $sql = mysql_query("SELECT * FROM hrm_sales_villageloc where AreaId=".$_POST['VAreaId2']." order by VillageLocName ASC", $con); while($res = mysql_fetch_array($sql)){ ?>    
  <tr bgcolor="#FFFFF" id="<?php echo 'TR'.$res['VillageLocId']; ?>">
   <td align="center" style="color:#FFFFFF;font-size:14px;font-family:Times New Roman;"><input type="checkbox" id="Check_<?php echo $res['VillageLocId']; ?>" onClick="ClickVillageLoc(<?php echo $res['VillageLocId']; ?>,'<?php echo strtoupper($res['VillageLocName']); ?>'>)"/></td>
   <td style="font-size:14px;font-family:Times New Roman;"><?php echo strtoupper($res['VillageLocName']); ?></td>
   <td align="center" style="font-size:14px;font-family:Times New Roman;"><img src="images/delete.png" border="0" onClick="ClickDelVillageLoc(<?php echo $res['VillageLocId']; ?>,'<?php echo strtoupper($res['VillageLocName']); ?>')" /></td>
  </tr>
<?php } ?>    
</table>
<?php } ?>

<?php if(isset($_POST['VillageLoc']) && $_POST['VillageLoc']!=""){
$sql = mysql_query("insert into hrm_sales_villageloc(VillageLocName,AreaId) values('".$_POST['VillageLoc']."', '".$_POST['AreaId']."')", $con); ?>
<table border="1">
 <tr bgcolor="#7a6189">
   <td align="center" style="color:#FFFFFF;font-size:14px;width:50px;font-family:Times New Roman;"><b>Check</b></td>
   <td align="center" style="color:#FFFFFF;font-size:14px;width:400px;font-family:Times New Roman;"><b>Village/ Location</b></td>
   <td align="center" style="color:#FFFFFF;font-size:14px;width:50px;font-family:Times New Roman;"><b>Delete</b></td>
  </tr> 
<?php $sql = mysql_query("SELECT * FROM hrm_sales_villageloc where AreaId=".$_POST['AreaId']." order by VillageLocName ASC", $con); while($res = mysql_fetch_array($sql)){ ?>    
  <tr bgcolor="#FFFFF" id="<?php echo 'TR'.$res['VillageLocId']; ?>">
   <td align="center" style="color:#FFFFFF;font-size:14px;font-family:Times New Roman;"><input type="checkbox" id="Check_<?php echo $res['VillageLocId']; ?>" onClick="ClickVillageLoc(<?php echo $res['VillageLocId']; ?>,'<?php echo strtoupper($res['VillageLocName']); ?>')"/></td>
   <td style="font-size:14px;font-family:Times New Roman;"><?php echo strtoupper($res['VillageLocName']); ?></td>
   <td align="center" style="font-size:14px;font-family:Times New Roman;"><img src="images/delete.png" border="0" onClick="ClickDelVillageLoc(<?php echo $res['VillageLocId']; ?>,'<?php echo strtoupper($res['VillageLocName']); ?>')" /></td>
  </tr>
<?php } ?>    
</table>
<?php } ?>

<?php if(isset($_POST['ChangeVillageLocName']) && $_POST['ChangeVillageLocName']!=""){
$sql = mysql_query("update hrm_sales_villageloc set VillageLocName='".$_POST['ChangeVillageLocName']."' where VillageLocId=".$_POST['VillageLocId'], $con); ?>
<table border="1">
 <tr bgcolor="#7a6189">
   <td align="center" style="color:#FFFFFF;font-size:14px;width:50px;font-family:Times New Roman;"><b>Check</b></td>
   <td align="center" style="color:#FFFFFF;font-size:14px;width:400px;font-family:Times New Roman;"><b>Village/ Location</b></td>
   <td align="center" style="color:#FFFFFF;font-size:14px;width:50px;font-family:Times New Roman;"><b>Delete</b></td>
  </tr> 
<?php $sql = mysql_query("SELECT * FROM hrm_sales_villageloc where AreaId=".$_POST['AreaId']." order by VillageLocName ASC", $con); while($res = mysql_fetch_array($sql)){ ?>    
  <tr bgcolor="#FFFFF" id="<?php echo 'TR'.$res['VillageLocId']; ?>">
   <td align="center" style="color:#FFFFFF;font-size:14px;font-family:Times New Roman;"><input type="checkbox" id="Check_<?php echo $res['VillageLocId']; ?>" onClick="ClickVillageLoc(<?php echo $res['VillageLocId']; ?>,'<?php echo strtoupper($res['VillageLocName']); ?>')"/></td>
   <td style="font-size:14px;font-family:Times New Roman;"><?php echo strtoupper($res['VillageLocName']); ?></td>
   <td align="center" style="font-size:14px;font-family:Times New Roman;"><img src="images/delete.png" border="0" onClick="ClickDelVillageLoc(<?php echo $res['VillageLocId']; ?>,'<?php echo strtoupper($res['VillageLocName']); ?>')" /></td>
  </tr>
<?php } ?>    
</table>
<?php } ?>

<?php if(isset($_POST['DeleteVillageLocId']) && $_POST['DeleteVillageLocId']!=""){
$sql = mysql_query("delete from hrm_sales_villageloc where VillageLocId=".$_POST['DeleteVillageLocId'], $con); ?>
<table border="1">
 <tr bgcolor="#7a6189">
   <td align="center" style="color:#FFFFFF;font-size:14px;width:50px;font-family:Times New Roman;"><b>Check</b></td>
   <td align="center" style="color:#FFFFFF;font-size:14px;width:400px;font-family:Times New Roman;"><b>Village/ Location</b></td>
   <td align="center" style="color:#FFFFFF;font-size:14px;width:50px;font-family:Times New Roman;"><b>Delete</b></td>
  </tr> 
<?php $sql = mysql_query("SELECT * FROM hrm_sales_villageloc where AreaId=".$_POST['AreaId']." order by VillageLocName ASC", $con); while($res = mysql_fetch_array($sql)){ ?>    
  <tr bgcolor="#FFFFF" id="<?php echo 'TR'.$res['VillageLocId']; ?>">
   <td align="center" style="color:#FFFFFF;font-size:14px;font-family:Times New Roman;"><input type="checkbox" id="Check_<?php echo $res['VillageLocId']; ?>" onClick="ClickVillageLoc(<?php echo $res['VillageLocId']; ?>,'<?php echo strtoupper($res['VillageLocName']); ?>')"/></td>
   <td style="font-size:14px;font-family:Times New Roman;"><?php echo strtoupper($res['VillageLocName']); ?></td>
   <td align="center" style="font-size:14px;font-family:Times New Roman;"><img src="images/delete.png" border="0" onClick="ClickDelVillageLoc(<?php echo $res['VillageLocId']; ?>,'<?php echo strtoupper($res['VillageLocName']); ?>')" /></td>
  </tr>
<?php } ?>    
</table>
<?php } ?>

<?php /****************************************/ ?>

<?php if(isset($_POST['VillageName']) && $_POST['VillageName']!=""){
$sql = mysql_query("insert into hrm_sales_areavillage(AreaName,AreaCode,DistId) values('".$_POST['VillageName']."', '".$_POST['VillageC']."', '".$_POST['DistId']."')", $con); ?>
<table border="1">
 <tr bgcolor="#7a6189">
   <td align="center" style="color:#FFFFFF;font-size:14px;width:50px;font-family:Times New Roman;"><b>Check</b></td>
   <td align="center" style="color:#FFFFFF;font-size:14px;width:400px;font-family:Times New Roman;"><b>Area</b></td>
   <td align="center" style="color:#FFFFFF;font-size:14px;width:60px;font-family:Times New Roman;"><b>Code</b></td>
   <td align="center" style="color:#FFFFFF;font-size:14px;width:50px;font-family:Times New Roman;"><b>Delete</b></td>
  </tr> 
<?php $sql = mysql_query("SELECT * FROM hrm_sales_areavillage where DistId=".$_POST['DistId']." order by AreaName ASC", $con); while($res = mysql_fetch_array($sql)){ ?>    
  <tr bgcolor="#FFFFF" id="<?php echo 'TR'.$res['AreaId']; ?>">
   <td align="center" style="color:#FFFFFF;font-size:14px;font-family:Times New Roman;"><input type="checkbox" id="Check_<?php echo $res['AreaId']; ?>" onClick="ClickVillage(<?php echo $res['AreaId']; ?>,'<?php echo strtoupper($res['AreaName']); ?>','<?php echo strtoupper($res['AreaCode']); ?>')"/></td>
   <td style="font-size:14px;font-family:Times New Roman;"><?php echo strtoupper($res['AreaName']); ?></td>
   <td style="font-size:14px;font-family:Times New Roman;"><?php echo strtoupper($res['AreaCode']); ?></td>
   <td align="center" style="font-size:14px;font-family:Times New Roman;"><img src="images/delete.png" border="0" onClick="ClickDelVillage(<?php echo $res['AreaId']; ?>,'<?php echo strtoupper($res['AreaName']); ?>')" /></td>
  </tr>
<?php } ?>    
</table>
<?php } ?>

<?php if(isset($_POST['ChangeVillageName']) && $_POST['ChangeVillageName']!=""){
$sql = mysql_query("update hrm_sales_areavillage set AreaName='".$_POST['ChangeVillageName']."', AreaCode='".$_POST['VillageC']."' where AreaId=".$_POST['VillageId'], $con); ?>
<table border="1">
 <tr bgcolor="#7a6189">
   <td align="center" style="color:#FFFFFF;font-size:14px;width:50px;font-family:Times New Roman;"><b>Check</b></td>
   <td align="center" style="color:#FFFFFF;font-size:14px;width:400px;font-family:Times New Roman;"><b>Area</b></td>
   <td align="center" style="color:#FFFFFF;font-size:14px;width:60px;font-family:Times New Roman;"><b>Code</b></td>
   <td align="center" style="color:#FFFFFF;font-size:14px;width:50px;font-family:Times New Roman;"><b>Delete</b></td>
  </tr> 
<?php $sql = mysql_query("SELECT * FROM hrm_sales_areavillage where DistId=".$_POST['DistId']." order by AreaName ASC", $con); while($res = mysql_fetch_array($sql)){ ?>    
  <tr bgcolor="#FFFFF" id="<?php echo 'TR'.$res['AreaId']; ?>">
   <td align="center" style="color:#FFFFFF;font-size:14px;font-family:Times New Roman;"><input type="checkbox" id="Check_<?php echo $res['AreaId']; ?>" onClick="ClickVillage(<?php echo $res['AreaId']; ?>,'<?php echo strtoupper($res['AreaName']); ?>','<?php echo strtoupper($res['AreaCode']); ?>')"/></td>
   <td style="font-size:14px;font-family:Times New Roman;"><?php echo strtoupper($res['AreaName']); ?></td>
   <td style="font-size:14px;font-family:Times New Roman;"><?php echo strtoupper($res['AreaCode']); ?></td>
   <td align="center" style="font-size:14px;font-family:Times New Roman;"><img src="images/delete.png" border="0" onClick="ClickDelVillage(<?php echo $res['AreaId']; ?>,'<?php echo strtoupper($res['AreaName']); ?>')" /></td>
  </tr>
<?php } ?>    
</table>
<?php } ?>


<?php if(isset($_POST['DeleteVillageId']) && $_POST['DeleteVillageId']!=""){
$sql = mysql_query("delete from hrm_sales_areavillage where AreaId=".$_POST['DeleteVillageId'], $con); ?>
<table border="1">
 <tr bgcolor="#7a6189">
   <td align="center" style="color:#FFFFFF;font-size:14px;width:50px;font-family:Times New Roman;"><b>Check</b></td>
   <td align="center" style="color:#FFFFFF;font-size:14px;width:400px;font-family:Times New Roman;"><b>Area</b></td>
   <td align="center" style="color:#FFFFFF;font-size:14px;width:60px;font-family:Times New Roman;"><b>Code</b></td>
   <td align="center" style="color:#FFFFFF;font-size:14px;width:50px;font-family:Times New Roman;"><b>Delete</b></td>
  </tr> 
<?php $sql = mysql_query("SELECT * FROM hrm_sales_areavillage where DistId=".$_POST['DistId']." order by AreaName ASC", $con); while($res = mysql_fetch_array($sql)){ ?>    
  <tr bgcolor="#FFFFF" id="<?php echo 'TR'.$res['AreaId']; ?>">
   <td align="center" style="color:#FFFFFF;font-size:14px;font-family:Times New Roman;"><input type="checkbox" id="Check_<?php echo $res['AreaId']; ?>" onClick="ClickVillage(<?php echo $res['AreaId']; ?>,'<?php echo strtoupper($res['AreaName']); ?>','<?php echo strtoupper($res['AreaCode']); ?>')"/></td>
   <td style="font-size:14px;font-family:Times New Roman;"><?php echo strtoupper($res['AreaName']); ?></td>
   <td style="font-size:14px;font-family:Times New Roman;"><?php echo strtoupper($res['AreaCode']); ?></td>
   <td align="center" style="font-size:14px;font-family:Times New Roman;"><img src="images/delete.png" border="0" onClick="ClickDelVillage(<?php echo $res['AreaId']; ?>,'<?php echo strtoupper($res['AreaName']); ?>')" /></td>
  </tr>
<?php } ?>    
</table>
<?php } ?>

<?php if(isset($_POST['FVStateId']) && $_POST['FVStateId']!=""){ ?>
<select style="font-size:12px;width:180px;height:20px;background-color:#DDFFBB;" name="Dist" id="Dist" onChange="FarClickDist(this.value)">
<option value="" selected>SELECT</option>	
<?php $sql = mysql_query("SELECT * FROM hrm_sales_distric where StateId=".$_POST['FVStateId']." order by DistName ASC", $con); while($res = mysql_fetch_array($sql)){ ?>
<option value="<?php echo $res['DistId']; ?>"><?php echo strtoupper($res['DistName']); ?></option><?php } ?></select>
<?php } ?>

<?php if(isset($_POST['FVDistId']) && $_POST['FVDistId']!=""){ ?>
<select style="font-size:12px;width:300px;height:20px;background-color:#DDFFBB;" name="Area" id="Area" onChange="ClickArea(this.value)">
<option value="" selected>SELECT</option>	
<?php $sql = mysql_query("SELECT * FROM hrm_sales_areavillage where DistId=".$_POST['FVDistId']." order by AreaName ASC", $con); while($res = mysql_fetch_array($sql)){ ?>
<option value="<?php echo $res['AreaId']; ?>"><?php echo strtoupper($res['AreaName']); ?></option><?php } ?></select>
<?php } ?>


<?php if(isset($_POST['VAreaId']) && $_POST['VAreaId']!=""){ ?>
<table border="1">
 <tr bgcolor="#7a6189">
   <td align="center" style="color:#FFFFFF;font-size:14px;width:50px;font-family:Times New Roman;"><b>Check</b></td>
   <td align="center" style="color:#FFFFFF;font-size:14px;width:400px;font-family:Times New Roman;"><b>Farmer Name</b></td>
   <td align="center" style="color:#FFFFFF;font-size:14px;width:100px;font-family:Times New Roman;"><b>Contact</b></td>
   <td align="center" style="color:#FFFFFF;font-size:14px;width:100px;font-family:Times New Roman;"><b>Acreage</b></td>
   <td align="center" style="color:#FFFFFF;font-size:14px;width:50px;font-family:Times New Roman;"><b>Delete</b></td>
  </tr> 
<?php $sql = mysql_query("SELECT * FROM hrm_sales_farmer where AreaId=".$_POST['VAreaId']." order by FarmerName ASC", $con); while($res = mysql_fetch_array($sql)){ ?>    
  <tr bgcolor="#FFFFF" id="<?php echo 'TR'.$res['FarmerId']; ?>">
   <td align="center" style="color:#FFFFFF;font-size:14px;font-family:Times New Roman;"><input type="checkbox" id="Check_<?php echo $res['FarmerId']; ?>" onClick="ClickFarmer(<?php echo $res['FarmerId']; ?>,'<?php echo strtoupper($res['FarmerName']); ?>')"/></td>
   <td style="font-size:14px;font-family:Times New Roman;"><?php echo strtoupper($res['FarmerName']); ?></td>
   <td style="font-size:14px;font-family:Times New Roman;"><?php echo strtoupper($res['ContactNo']); ?></td>
   <td style="font-size:14px;font-family:Times New Roman;" align="right"><?php echo $res['Acreage']; ?>&nbsp;</td>
   <td align="center" style="font-size:14px;font-family:Times New Roman;"><img src="images/delete.png" border="0" onClick="ClickDelFarmer(<?php echo $res['FarmerId']; ?>,'<?php echo strtoupper($res['FarmerName']); ?>')" /></td>
  </tr>
<?php } ?>    
</table>
<?php } ?>

<?php if(isset($_POST['FarmerName']) && $_POST['FarmerName']!=""){
$sql = mysql_query("insert into hrm_sales_farmer(FarmerName,ContactNo,Acreage,AreaId) values('".$_POST['FarmerName']."', ".$_POST['Contact'].", '".$_POST['Acr']."', ".$_POST['AraeId'].",)", $con); ?>
<table border="1">
 <tr bgcolor="#7a6189">
   <td align="center" style="color:#FFFFFF;font-size:14px;width:50px;font-family:Times New Roman;"><b>Check</b></td>
   <td align="center" style="color:#FFFFFF;font-size:14px;width:400px;font-family:Times New Roman;"><b>Farmer Name</b></td>
   <td align="center" style="color:#FFFFFF;font-size:14px;width:100px;font-family:Times New Roman;"><b>Contact</b></td>
   <td align="center" style="color:#FFFFFF;font-size:14px;width:100px;font-family:Times New Roman;"><b>Acreage</b></td>
   <td align="center" style="color:#FFFFFF;font-size:14px;width:50px;font-family:Times New Roman;"><b>Delete</b></td>
  </tr> 
<?php $sql = mysql_query("SELECT * FROM hrm_sales_farmer where AreaId=".$_POST['AreaId']." order by FarmerName ASC", $con); while($res = mysql_fetch_array($sql)){ ?>    
  <tr bgcolor="#FFFFF" id="<?php echo 'TR'.$res['FarmerId']; ?>">
   <td align="center" style="color:#FFFFFF;font-size:14px;font-family:Times New Roman;"><input type="checkbox" id="Check_<?php echo $res['FarmerId']; ?>" onClick="ClickFarmer(<?php echo $res['FarmerId']; ?>,'<?php echo strtoupper($res['FarmerName']); ?>')"/></td>
   <td style="font-size:14px;font-family:Times New Roman;"><?php echo strtoupper($res['FarmerName']); ?></td>
   <td style="font-size:14px;font-family:Times New Roman;"><?php echo strtoupper($res['ContactNo']); ?></td>
   <td style="font-size:14px;font-family:Times New Roman;" align="right"><?php echo $res['Acreage']; ?>&nbsp;</td>
   <td align="center" style="font-size:14px;font-family:Times New Roman;"><img src="images/delete.png" border="0" onClick="ClickDelFarmer(<?php echo $res['FarmerId']; ?>,'<?php echo strtoupper($res['FarmerName']); ?>')" /></td>
  </tr>
<?php } ?>    
</table>
<?php } ?>
