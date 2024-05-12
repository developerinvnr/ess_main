<?php require_once('config/config.php');
if(isset($_POST['CouId']) && $_POST['CouId']!=""){ ?>
<select style="font-size:12px;width:180px;height:20px;background-color:#DDFFBB;" name="State" id="State" onChange="ClickState(this.value)">
<option value="" selected>SELECT</option>	
<?php $sql = mysql_query("SELECT * FROM hrm_state where CountryId=".$_POST['CouId']." order by StateName ASC", $con); while($res = mysql_fetch_array($sql)){ ?>
<option value="<?php echo $res['StateId']; ?>"><?php echo strtoupper($res['StateName']); ?></option><?php } ?></select>
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

<?php if(isset($_POST['VVAreaId']) && $_POST['VVAreaId']!=""){ ?>
<select style="font-size:12px;width:300px;height:20px;background-color:#DDFFBB;" name="VillageLoc" id="VillageLoc" onChange="ClickVillageLoc(this.value)">
<option value="" selected>SELECT</option>	
<?php $sql = mysql_query("SELECT * FROM hrm_sales_villageloc where AreaId=".$_POST['VVAreaId']." order by VillageLocName ASC", $con); while($res = mysql_fetch_array($sql)){ ?>
<option value="<?php echo $res['VillageLocId']; ?>"><?php echo strtoupper($res['VillageLocName']); ?></option><?php } ?></select>
<?php } ?>


<?php if(isset($_POST['VLocId22']) && $_POST['VLocId22']!=""){ ?>
<table border="1">
 <tr bgcolor="#7a6189">
   <td align="center" style="color:#FFFFFF;font-size:14px;width:50px;font-family:Times New Roman;"><b>Check</b></td>
   <td align="center" style="color:#FFFFFF;font-size:14px;width:400px;font-family:Times New Roman;"><b>Farmer Name</b></td>
   <td align="center" style="color:#FFFFFF;font-size:14px;width:100px;font-family:Times New Roman;"><b>Contact</b></td>
   <td align="center" style="color:#FFFFFF;font-size:14px;width:100px;font-family:Times New Roman;"><b>Acreage</b></td>
   <td align="center" style="color:#FFFFFF;font-size:14px;width:50px;font-family:Times New Roman;"><b>Delete</b></td>
  </tr> 
<?php $sql = mysql_query("SELECT * FROM hrm_sales_farmer where VillageLocId=".$_POST['VLocId22']." order by Acreage DESC", $con); while($res = mysql_fetch_array($sql)){ ?>    
  <tr bgcolor="#FFFFF" id="<?php echo 'TR'.$res['FarmerId']; ?>">
   <td align="center" style="color:#FFFFFF;font-size:14px;font-family:Times New Roman;"><input type="checkbox" id="Check_<?php echo $res['FarmerId']; ?>" onClick="ClickFarmer(<?php echo $res['FarmerId']; ?>,'<?php echo strtoupper($res['FarmerName']); ?>',<?php echo $res['ContactNo'].', '.$res['Acreage']; ?>)"/></td>
   <td style="font-size:14px;font-family:Times New Roman;"><?php echo strtoupper($res['FarmerName']); ?></td>
   <td style="font-size:14px;font-family:Times New Roman;"><?php echo strtoupper($res['ContactNo']); ?></td>
   <td style="font-size:14px;font-family:Times New Roman;" align="right"><?php echo $res['Acreage']; ?>&nbsp;</td>
   <td align="center" style="font-size:14px;font-family:Times New Roman;"><img src="images/delete.png" border="0" onClick="ClickDelFarmer(<?php echo $res['FarmerId']; ?>,'<?php echo strtoupper($res['FarmerName']); ?>')" /></td>
  </tr>
<?php } ?>    
</table>
<?php } ?>

<?php if(isset($_POST['FarmerName']) && $_POST['FarmerName']!=""){ 
$sql = mysql_query("insert into hrm_sales_farmer(FarmerName,ContactNo,Acreage,VillageLocId) values('".$_POST['FarmerName']."', ".$_POST['Contact'].", '".$_POST['Acr']."', ".$_POST['VLocId'].")", $con); ?>
<table border="1">
 <tr bgcolor="#7a6189">
   <td align="center" style="color:#FFFFFF;font-size:14px;width:50px;font-family:Times New Roman;"><b>Check</b></td>
   <td align="center" style="color:#FFFFFF;font-size:14px;width:400px;font-family:Times New Roman;"><b>Farmer Name</b></td>
   <td align="center" style="color:#FFFFFF;font-size:14px;width:100px;font-family:Times New Roman;"><b>Contact</b></td>
   <td align="center" style="color:#FFFFFF;font-size:14px;width:100px;font-family:Times New Roman;"><b>Acreage</b></td>
   <td align="center" style="color:#FFFFFF;font-size:14px;width:50px;font-family:Times New Roman;"><b>Delete</b></td>
  </tr> 
<?php $sql = mysql_query("SELECT * FROM hrm_sales_farmer where VillageLocId=".$_POST['VLocId']." order by Acreage DESC", $con); while($res = mysql_fetch_array($sql)){ ?>    
  <tr bgcolor="#FFFFF" id="<?php echo 'TR'.$res['FarmerId']; ?>">
   <td align="center" style="color:#FFFFFF;font-size:14px;font-family:Times New Roman;"><input type="checkbox" id="Check_<?php echo $res['FarmerId']; ?>" onClick="ClickFarmer(<?php echo $res['FarmerId']; ?>,'<?php echo strtoupper($res['FarmerName']); ?>',<?php echo $res['ContactNo'].', '.$res['Acreage']; ?>)"/></td>
   <td style="font-size:14px;font-family:Times New Roman;"><?php echo strtoupper($res['FarmerName']); ?></td>
   <td style="font-size:14px;font-family:Times New Roman;"><?php echo strtoupper($res['ContactNo']); ?></td>
   <td style="font-size:14px;font-family:Times New Roman;" align="right"><?php echo $res['Acreage']; ?>&nbsp;</td>
   <td align="center" style="font-size:14px;font-family:Times New Roman;"><img src="images/delete.png" border="0" onClick="ClickDelFarmer(<?php echo $res['FarmerId']; ?>,'<?php echo strtoupper($res['FarmerName']); ?>')" /></td>
  </tr>
<?php } ?>    
</table>
<?php } ?>

<?php if(isset($_POST['ChangeFarmerName']) && $_POST['ChangeFarmerName']!=""){
$sql = mysql_query("update hrm_sales_farmer set FarmerName='".$_POST['ChangeFarmerName']."', ContactNo=".$_POST['Contact'].", Acreage='".$_POST['Acr']."' where FarmerId=".$_POST['FarmerId'], $con); ?>
<table border="1">
 <tr bgcolor="#7a6189">
   <td align="center" style="color:#FFFFFF;font-size:14px;width:50px;font-family:Times New Roman;"><b>Check</b></td>
   <td align="center" style="color:#FFFFFF;font-size:14px;width:400px;font-family:Times New Roman;"><b>Farmer Name</b></td>
   <td align="center" style="color:#FFFFFF;font-size:14px;width:100px;font-family:Times New Roman;"><b>Contact</b></td>
   <td align="center" style="color:#FFFFFF;font-size:14px;width:100px;font-family:Times New Roman;"><b>Acreage</b></td>
   <td align="center" style="color:#FFFFFF;font-size:14px;width:50px;font-family:Times New Roman;"><b>Delete</b></td>
  </tr> 
<?php $sql = mysql_query("SELECT * FROM hrm_sales_farmer where VillageLocId=".$_POST['VLocId']." order by Acreage DESC", $con); while($res = mysql_fetch_array($sql)){ ?>    
  <tr bgcolor="#FFFFF" id="<?php echo 'TR'.$res['FarmerId']; ?>">
   <td align="center" style="color:#FFFFFF;font-size:14px;font-family:Times New Roman;"><input type="checkbox" id="Check_<?php echo $res['FarmerId']; ?>" onClick="ClickFarmer(<?php echo $res['FarmerId']; ?>,'<?php echo strtoupper($res['FarmerName']); ?>',<?php echo $res['ContactNo'].', '.$res['Acreage']; ?>)"/></td>
   <td style="font-size:14px;font-family:Times New Roman;"><?php echo strtoupper($res['FarmerName']); ?></td>
   <td style="font-size:14px;font-family:Times New Roman;"><?php echo strtoupper($res['ContactNo']); ?></td>
   <td style="font-size:14px;font-family:Times New Roman;" align="right"><?php echo $res['Acreage']; ?>&nbsp;</td>
   <td align="center" style="font-size:14px;font-family:Times New Roman;"><img src="images/delete.png" border="0" onClick="ClickDelFarmer(<?php echo $res['FarmerId']; ?>,'<?php echo strtoupper($res['FarmerName']); ?>')" /></td>
  </tr>
<?php } ?>    
</table>
<?php } ?>


<?php if(isset($_POST['DeleteFarmerId']) && $_POST['DeleteFarmerId']!=""){
$sql = mysql_query("delete from hrm_sales_farmer where FarmerId=".$_POST['DeleteFarmerId'], $con); ?>
<table border="1">
 <tr bgcolor="#7a6189">
   <td align="center" style="color:#FFFFFF;font-size:14px;width:50px;font-family:Times New Roman;"><b>Check</b></td>
   <td align="center" style="color:#FFFFFF;font-size:14px;width:400px;font-family:Times New Roman;"><b>Farmer Name</b></td>
   <td align="center" style="color:#FFFFFF;font-size:14px;width:100px;font-family:Times New Roman;"><b>Contact</b></td>
   <td align="center" style="color:#FFFFFF;font-size:14px;width:100px;font-family:Times New Roman;"><b>Acreage</b></td>
   <td align="center" style="color:#FFFFFF;font-size:14px;width:50px;font-family:Times New Roman;"><b>Delete</b></td>
  </tr> 
<?php $sql = mysql_query("SELECT * FROM hrm_sales_farmer where VillageLocId=".$_POST['VLocId']." order by Acreage DESC", $con); while($res = mysql_fetch_array($sql)){ ?>    
  <tr bgcolor="#FFFFF" id="<?php echo 'TR'.$res['FarmerId']; ?>">
   <td align="center" style="color:#FFFFFF;font-size:14px;font-family:Times New Roman;"><input type="checkbox" id="Check_<?php echo $res['FarmerId']; ?>" onClick="ClickFarmer(<?php echo $res['FarmerId']; ?>,'<?php echo strtoupper($res['FarmerName']); ?>',<?php echo $res['ContactNo'].', '.$res['Acreage']; ?>)"/></td>
   <td style="font-size:14px;font-family:Times New Roman;"><?php echo strtoupper($res['FarmerName']); ?></td>
   <td style="font-size:14px;font-family:Times New Roman;"><?php echo strtoupper($res['ContactNo']); ?></td>
   <td style="font-size:14px;font-family:Times New Roman;" align="right"><?php echo $res['Acreage']; ?>&nbsp;</td>
   <td align="center" style="font-size:14px;font-family:Times New Roman;"><img src="images/delete.png" border="0" onClick="ClickDelFarmer(<?php echo $res['FarmerId']; ?>,'<?php echo strtoupper($res['FarmerName']); ?>')" /></td>
  </tr>
<?php } ?>    
</table>
<?php } ?>
