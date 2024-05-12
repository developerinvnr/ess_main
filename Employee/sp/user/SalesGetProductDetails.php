<?php require_once('config/config.php'); ?>
<?php if(isset($_POST['CropId']) && $_POST['CropId']!=""){ ?>
<select style="font-size:12px;width:150px;" name="Product" id="Product" onChange="ChangeProduct(this.value)"><option value="">---PRODUCT---</option>
<?php $sqlP=mysql_query("SELECT * FROM hrm_sales_seedsproduct where ItemId=".$_POST['CropId']." order by ProductName ASC", $con); while($resP=mysql_fetch_array($sqlP)) { ?>
<option value="<?php echo $resP['ProductId']; ?>"><?php echo strtoupper($resP['ProductName']); ?></option><?php } ?></select>
<?php } ?>

<?php if(isset($_POST['ProdId']) && $_POST['ProdId']!=""){ ?>
<select style="font-size:12px;width:120px;" name="Season" id="Season" onChange="ChangeSeason(this.value)" disabled><option value="">---SEASON---</option><?php $sqlSeason=mysql_query("SELECT hrm_sales_season.* FROM hrm_sales_season INNER JOIN hrm_sales_seedsitem ON hrm_sales_season.GroupId=hrm_sales_seedsitem.GroupId INNER JOIN hrm_sales_seedsproduct ON hrm_sales_seedsitem.ItemId=hrm_sales_seedsproduct.ItemId where hrm_sales_seedsproduct.ProductId=".$_POST['ProdId']." order by hrm_sales_season.SeasonId ASC", $con); 
while($resSeason=mysql_fetch_array($sqlSeason)) { ?>
<option value="<?php echo $resSeason['SeasonId']; ?>"><?php echo strtoupper($resSeason['SeasonName']); ?></option><?php } ?></select>
<?php } ?>

<?php if(isset($_POST['CountryId']) && $_POST['CountryId']!=""){ ?>
<select style="font-size:12px;width:140px;" name="State" id="State" onChange="ChangeState(this.value)"><option value="">---STATE---</option>
<?php $sqlState = mysql_query("SELECT * FROM hrm_state where CountryId=".$_POST['CountryId']." order by StateName ASC", $con); while($resState=mysql_fetch_array($sqlState)){ ?>
        <option value="<?php echo $resState['StateId']; ?>"><?php echo strtoupper($resState['StateName']); ?></option><?php } ?></select>
<?php } ?>

<?php if(isset($_POST['StateId']) && $_POST['StateId']!=""){ ?>
<select style="font-size:12px;width:150px;" name="Dist" id="Dist" onChange="ChangeDist(this.value)"><option value="">---DISTRIC---</option>
<?php $sqlDist = mysql_query("SELECT * FROM hrm_sales_distric where StateId=".$_POST['StateId']." order by DistName ASC", $con); while($resDist=mysql_fetch_array($sqlDist)){ ?>
        <option value="<?php echo $resDist['DistId']; ?>"><?php echo strtoupper($resDist['DistName']); ?></option><?php } ?></select>
<?php } ?>

<?php if(isset($_POST['DistId']) && $_POST['DistId']!=""){ ?>
<select style="font-size:12px;width:150px;" name="Area" id="Area" onChange="ChangeArea(this.value)"><option value="">---AREA-VILLAGE---</option>
<?php $sqlArea = mysql_query("SELECT * FROM hrm_sales_areavillage where DistId=".$_POST['DistId']." order by AreaName ASC", $con); while($resArea=mysql_fetch_array($sqlArea)){ ?>
        <option value="<?php echo $resArea['AreaId']; ?>"><?php echo strtoupper($resArea['AreaName']); ?></option><?php } ?></select>
<?php } ?>


<?php /* if(isset($_POST['FAreaId']) && $_POST['FAreaId']!=""){ $sqlA=mysql_query("select AreaName,DistName,StateName from hrm_sales_areavillage INNER JOIN hrm_sales_distric ON hrm_sales_areavillage.DistId=hrm_sales_distric.DistId INNER JOIN hrm_state ON hrm_sales_distric.StateId=hrm_state.StateId where hrm_sales_areavillage.AreaId=".$_POST['FAreaId'], $con); $resA=mysql_fetch_assoc($sqlA); ?>
<table border="1">
<tr style="font-family:Times New Roman;color:#FFFFFF;font-size:14px;background-color:#7a6189;">
<td colspan="4" style="width:50px;"><b>&nbsp;<?php echo $resA['StateName'].' / '.$resA['DistName'].' / '.$resA['AreaName']; ?></b></td></tr>
<tr style="font-family:Times New Roman;color:#FFFFFF;font-size:14px;background-color:#7a6189;">
<td align="center" style="width:50px;"><b>Sn</b></td>
<td align="center" style="width:300px;"><b>Farmer Name</b></td>
<td align="center" style="width:120px;"><b>Contact</b></td>
<td align="center" style="width:100px;"><b>Acreage</b></td>
</tr>
<?php $sqlF = mysql_query("SELECT * FROM hrm_sales_farmer where AreaId=".$_POST['FAreaId']." order by Acreage DESC", $con); $Sn=1; while($resF=mysql_fetch_array($sqlF)){ ?>
<tr style="font-family:Times New Roman;font-size:14px;background-color:#FFFFFF;">
<td align="center"><?php echo $Sn; ?></td>
<td>&nbsp;<?php echo $resF['FarmerName']; ?></td>
<td>&nbsp;<?php echo $resF['ContactNo']; ?></td>
<td align="right"><?php echo $resF['Acreage']; ?>&nbsp;</td>
</tr>
<?php $Sn++; } ?>
</table>  
<?php } */ ?>


<?php if(isset($_POST['SeasonId']) && $_POST['SeasonId']!=""){ 
 $sql=mysql_query("SELECT * FROM hrm_sales_season_month where SeasonId=".$_POST['SeasonId'], $con); $res=mysql_fetch_array($sql);
 $sql2=mysql_query("SELECT * FROM hrm_sales_product_details where ProductId=".$_POST['pi']." AND AreaId=".$_POST['ai']." AND SeasonId=".$_POST['SeasonId'], $con); 
 $res2=mysql_fetch_array($sql2); ?>
<table border="1">
  <tr style="font-family:Times New Roman;color:#FFFFFF;font-size:14px;background-color:#7a6189;">
   <td align="center" style="width:150px;"><b>Work</b></td>
<?php if($res['MJan']==1){?><td align="center" style="width:80px;"><b>Jan</b></td><?php } ?>
<?php if($res['MFeb']==1){?><td align="center" style="width:80px;"><b>Feb</b></td><?php } ?>
<?php if($res['MMar']==1){?><td align="center" style="width:80px;"><b>Mar</b></td><?php } ?>
<?php if($res['MApr']==1){?><td align="center" style="width:80px;"><b>Apr</b></td><?php } ?>
<?php if($res['MMay']==1){?><td align="center" style="width:80px;"><b>May</b></td><?php } ?>
<?php if($res['MJun']==1){?><td align="center" style="width:80px;"><b>Jun</b></td><?php } ?>
<?php if($res['MJul']==1){?><td align="center" style="width:80px;"><b>Jul</b></td><?php } ?>
<?php if($res['MAug']==1){?><td align="center" style="width:80px;"><b>Aug</b></td><?php } ?>
<?php if($res['MSep']==1){?><td align="center" style="width:80px;"><b>Sep</b></td><?php } ?>
<?php if($res['MOct']==1){?><td align="center" style="width:80px;"><b>Oct</b></td><?php } ?>
<?php if($res['MNov']==1){?><td align="center" style="width:80px;"><b>Nov</b></td><?php } ?>
<?php if($res['MDec']==1){?><td align="center" style="width:80px;"><b>Dec</b></td><?php } ?>
  </tr>
  <tr style="font-family:Times New Roman;font-size:14px;background:#ffffff;">
   <td>&nbsp;Sowing</td>
<?php if($res['MJan']==1){?><td align="center" id="tds1" style="background-color:<?php if($res2['SowiM']==1 OR $res2['SowiM_2']==1 OR $res2['SowiM_3']==1 OR $res2['SowiM_4']==1){echo '#FFD2FF';} ?>"><input type="checkbox" id="sc1" onClick="ClickF(1,'s')" <?php if($res2['SowiM']==1 OR $res2['SowiM_2']==1 OR $res2['SowiM_3']==1 OR $res2['SowiM_4']==1){echo 'checked';} ?>/><input type="hidden" id="sh1" /></td><?php } ?>
<?php if($res['MFeb']==1){?><td align="center" id="tds2" style="background-color:<?php if($res2['SowiM']==2 OR $res2['SowiM_2']==2 OR $res2['SowiM_3']==2 OR $res2['SowiM_4']==2){echo '#FFD2FF';} ?>"><input type="checkbox" id="sc2" onClick="ClickF(2,'s')" <?php if($res2['SowiM']==2 OR $res2['SowiM_2']==2 OR $res2['SowiM_3']==2 OR $res2['SowiM_4']==2){echo 'checked';} ?>/><input type="hidden" id="sh2" /></td><?php } ?>
<?php if($res['MMar']==1){?><td align="center" id="tds3" style="background-color:<?php if($res2['SowiM']==3 OR $res2['SowiM_2']==3 OR $res2['SowiM_3']==3 OR $res2['SowiM_4']==3){echo '#FFD2FF';} ?>"><input type="checkbox" id="sc3" onClick="ClickF(3,'s')" <?php if($res2['SowiM']==3 OR $res2['SowiM_2']==3 OR $res2['SowiM_3']==3 OR $res2['SowiM_4']==3){echo 'checked';} ?>/><input type="hidden" id="sh3" /></td><?php } ?>
<?php if($res['MApr']==1){?><td align="center" id="tds4" style="background-color:<?php if($res2['SowiM']==4 OR $res2['SowiM_2']==4 OR $res2['SowiM_3']==4 OR $res2['SowiM_4']==4){echo '#FFD2FF';} ?>"><input type="checkbox" id="sc4" onClick="ClickF(4,'s')" <?php if($res2['SowiM']==4 OR $res2['SowiM_2']==4 OR $res2['SowiM_3']==4 OR $res2['SowiM_4']==4){echo 'checked';} ?>/><input type="hidden" id="sh4" /></td><?php } ?>
<?php if($res['MMay']==1){?><td align="center" id="tds5" style="background-color:<?php if($res2['SowiM']==5 OR $res2['SowiM_2']==5 OR $res2['SowiM_3']==5 OR $res2['SowiM_4']==5){echo '#FFD2FF';} ?>"><input type="checkbox" id="sc5" onClick="ClickF(5,'s')" <?php if($res2['SowiM']==5 OR $res2['SowiM_2']==5 OR $res2['SowiM_3']==5 OR $res2['SowiM_4']==5){echo 'checked';} ?>/><input type="hidden" id="sh5" /></td><?php } ?>
<?php if($res['MJun']==1){?><td align="center" id="tds6" style="background-color:<?php if($res2['SowiM']==6 OR $res2['SowiM_2']==6 OR $res2['SowiM_3']==6 OR $res2['SowiM_4']==6){echo '#FFD2FF';} ?>"><input type="checkbox" id="sc6" onClick="ClickF(6,'s')" <?php if($res2['SowiM']==6 OR $res2['SowiM_2']==6 OR $res2['SowiM_3']==6 OR $res2['SowiM_4']==6){echo 'checked';} ?>/><input type="hidden" id="sh6" /></td><?php } ?>
<?php if($res['MJul']==1){?><td align="center" id="tds7" style="background-color:<?php if($res2['SowiM']==7 OR $res2['SowiM_2']==7 OR $res2['SowiM_3']==7 OR $res2['SowiM_4']==7){echo '#FFD2FF';} ?>"><input type="checkbox" id="sc7" onClick="ClickF(7,'s')" <?php if($res2['SowiM']==7 OR $res2['SowiM_2']==7 OR $res2['SowiM_3']==7 OR $res2['SowiM_4']==7){echo 'checked';} ?>/><input type="hidden" id="sh7" /></td><?php } ?>
<?php if($res['MAug']==1){?><td align="center" id="tds8" style="background-color:<?php if($res2['SowiM']==8 OR $res2['SowiM_2']==8 OR $res2['SowiM_3']==8 OR $res2['SowiM_4']==8){echo '#FFD2FF';} ?>"><input type="checkbox" id="sc8" onClick="ClickF(8,'s')" <?php if($res2['SowiM']==8 OR $res2['SowiM_2']==8 OR $res2['SowiM_3']==8 OR $res2['SowiM_4']==8){echo 'checked';} ?>/><input type="hidden" id="sh8" /></td><?php } ?>
<?php if($res['MSep']==1){?><td align="center" id="tds9" style="background-color:<?php if($res2['SowiM']==9 OR $res2['SowiM_2']==9 OR $res2['SowiM_3']==9 OR $res2['SowiM_4']==9){echo '#FFD2FF';} ?>"><input type="checkbox" id="sc9" onClick="ClickF(9,'s')" <?php if($res2['SowiM']==9 OR $res2['SowiM_2']==9 OR $res2['SowiM_3']==9 OR $res2['SowiM_4']==9){echo 'checked';} ?>/><input type="hidden" id="sh9" /></td><?php } ?>
<?php if($res['MOct']==1){?><td align="center" id="tds10" style="background-color:<?php if($res2['SowiM']==10 OR $res2['SowiM_2']==10 OR $res2['SowiM_3']==10 OR $res2['SowiM_4']==10){echo '#FFD2FF';} ?>"><input type="checkbox" id="sc10" onClick="ClickF(10,'s')" <?php if($res2['SowiM']==10 OR $res2['SowiM_2']==10 OR $res2['SowiM_3']==10 OR $res2['SowiM_4']==10){echo 'checked';} ?>/><input type="hidden" id="sh10" /></td><?php } ?>
<?php if($res['MNov']==1){?><td align="center" id="tds11" style="background-color:<?php if($res2['SowiM']==11 OR $res2['SowiM_2']==11 OR $res2['SowiM_3']==11 OR $res2['SowiM_4']==11){echo '#FFD2FF';} ?>"><input type="checkbox" id="sc11" onClick="ClickF(11,'s')" <?php if($res2['SowiM']==11 OR $res2['SowiM_2']==11 OR $res2['SowiM_3']==11 OR $res2['SowiM_4']==11){echo 'checked';} ?>/><input type="hidden" id="sh11" /></td><?php } ?>
<?php if($res['MDec']==1){?><td align="center" id="tds12" style="background-color:<?php if($res2['SowiM']==12 OR $res2['SowiM_2']==12 OR $res2['SowiM_3']==12 OR $res2['SowiM_4']==12){echo '#FFD2FF';} ?>"><input type="checkbox" id="sc12" onClick="ClickF(12,'s')" <?php if($res2['SowiM']==12 OR $res2['SowiM_2']==12 OR $res2['SowiM_3']==12 OR $res2['SowiM_4']==12){echo 'checked';} ?>/><input type="hidden" id="sh12" /></td><?php } ?>
  </tr>
  <tr style="font-family:Times New Roman;font-size:14px;background:#ffffff;">
   <td>&nbsp;Pollination</td>
<?php if($res['MJan']==1){?><td align="center" id="tdp1" style="background-color:<?php if($res2['PollM']==1 OR $res2['PollM_2']==1 OR $res2['PollM_3']==1 OR $res2['PollM_4']==1){echo '#FFD2FF';} ?>"><input type="checkbox" id="pc1" onClick="ClickF(1,'p')" <?php if($res2['PollM']==1 OR $res2['PollM_2']==1 OR $res2['PollM_3']==1 OR $res2['PollM_4']==1){echo 'checked';} ?>/><input type="hidden" id="ph1" /></td><?php } ?>
<?php if($res['MFeb']==1){?><td align="center" id="tdp2" style="background-color:<?php if($res2['PollM']==2 OR $res2['PollM_2']==2  OR $res2['PollM_3']==2 OR $res2['PollM_4']==2){echo '#FFD2FF';} ?>"><input type="checkbox" id="pc2" onClick="ClickF(2,'p')" <?php if($res2['PollM']==2 OR $res2['PollM_2']==2 OR $res2['PollM_3']==2 OR $res2['PollM_4']==2){echo 'checked';} ?>/><input type="hidden" id="ph2" /></td><?php } ?>
<?php if($res['MMar']==1){?><td align="center" id="tdp3" style="background-color:<?php if($res2['PollM']==3 OR $res2['PollM_2']==3 OR $res2['PollM_3']==3 OR $res2['PollM_4']==3){echo '#FFD2FF';} ?>"><input type="checkbox" id="pc3" onClick="ClickF(3,'p')" <?php if($res2['PollM']==3 OR $res2['PollM_2']==3 OR $res2['PollM_3']==3 OR $res2['PollM_4']==3){echo 'checked';} ?>/><input type="hidden" id="ph3" /></td><?php } ?>
<?php if($res['MApr']==1){?><td align="center" id="tdp4" style="background-color:<?php if($res2['PollM']==4 OR $res2['PollM_2']==4 OR $res2['PollM_3']==4 OR $res2['PollM_4']==4){echo '#FFD2FF';} ?>"><input type="checkbox" id="pc4" onClick="ClickF(4,'p')" <?php if($res2['PollM']==4 OR $res2['PollM_2']==4 OR $res2['PollM_3']==4 OR $res2['PollM_4']==4){echo 'checked';} ?>/><input type="hidden" id="ph4" /></td><?php } ?>
<?php if($res['MMay']==1){?><td align="center" id="tdp5" style="background-color:<?php if($res2['PollM']==5 OR $res2['PollM_2']==5 OR $res2['PollM_3']==5 OR $res2['PollM_4']==5){echo '#FFD2FF';} ?>"><input type="checkbox" id="pc5" onClick="ClickF(5,'p')" <?php if($res2['PollM']==5 OR $res2['PollM_2']==5 OR $res2['PollM_3']==5 OR $res2['PollM_4']==5){echo 'checked';} ?>/><input type="hidden" id="ph5" /></td><?php } ?>
<?php if($res['MJun']==1){?><td align="center" id="tdp6" style="background-color:<?php if($res2['PollM']==6 OR $res2['PollM_2']==6 OR $res2['PollM_3']==6 OR $res2['PollM_4']==6){echo '#FFD2FF';} ?>"><input type="checkbox" id="pc6" onClick="ClickF(6,'p')" <?php if($res2['PollM']==6 OR $res2['PollM_2']==6 OR $res2['PollM_3']==6 OR $res2['PollM_4']==6){echo 'checked';} ?>/><input type="hidden" id="ph6" /></td><?php } ?>
<?php if($res['MJul']==1){?><td align="center" id="tdp7" style="background-color:<?php if($res2['PollM']==7 OR $res2['PollM_2']==7 OR $res2['PollM_3']==7 OR $res2['PollM_4']==7){echo '#FFD2FF';} ?>"><input type="checkbox" id="pc7" onClick="ClickF(7,'p')" <?php if($res2['PollM']==7 OR $res2['PollM_2']==7 OR $res2['PollM_3']==7 OR $res2['PollM_4']==7){echo 'checked';} ?>/><input type="hidden" id="ph7" /></td><?php } ?>
<?php if($res['MAug']==1){?><td align="center" id="tdp8" style="background-color:<?php if($res2['PollM']==8 OR $res2['PollM_2']==8 OR $res2['PollM_3']==8 OR $res2['PollM_4']==8){echo '#FFD2FF';} ?>"><input type="checkbox" id="pc8" onClick="ClickF(8,'p')" <?php if($res2['PollM']==8 OR $res2['PollM_2']==8 OR $res2['PollM_3']==8 OR $res2['PollM_4']==8){echo 'checked';} ?>/><input type="hidden" id="ph8" /></td><?php } ?>
<?php if($res['MSep']==1){?><td align="center" id="tdp9" style="background-color:<?php if($res2['PollM']==9 OR $res2['PollM_2']==9 OR $res2['PollM_3']==9 OR $res2['PollM_4']==9){echo '#FFD2FF';} ?>"><input type="checkbox" id="pc9" onClick="ClickF(9,'p')" <?php if($res2['PollM']==9 OR $res2['PollM_2']==9 OR $res2['PollM_3']==9 OR $res2['PollM_4']==9){echo 'checked';} ?>/><input type="hidden" id="ph9" /></td><?php } ?>
<?php if($res['MOct']==1){?><td align="center" id="tdp10" style="background-color:<?php if($res2['PollM']==10 OR $res2['PollM_2']==10 OR $res2['PollM_3']==10 OR $res2['PollM_4']==10){echo '#FFD2FF';} ?>"><input type="checkbox" id="pc10" onClick="ClickF(10,'p')" <?php if($res2['PollM']==10 OR $res2['PollM_2']==10 OR $res2['PollM_3']==10 OR $res2['PollM_4']==10){echo 'checked';} ?>/><input type="hidden" id="ph10" /></td><?php } ?>
<?php if($res['MNov']==1){?><td align="center" id="tdp11" style="background-color:<?php if($res2['PollM']==11 OR $res2['PollM_2']==11 OR $res2['PollM_3']==11 OR $res2['PollM_4']==11){echo '#FFD2FF';} ?>"><input type="checkbox" id="pc11" onClick="ClickF(11,'p')" <?php if($res2['PollM']==11 OR $res2['PollM_2']==11 OR $res2['PollM_3']==11 OR $res2['PollM_4']==11){echo 'checked';} ?>/><input type="hidden" id="ph11" /></td><?php } ?>
<?php if($res['MDec']==1){?><td align="center" id="tdp12" style="background-color:<?php if($res2['PollM']==12 OR $res2['PollM_2']==12 OR $res2['PollM_3']==12 OR $res2['PollM_4']==12){echo '#FFD2FF';} ?>"><input type="checkbox" id="pc12" onClick="ClickF(12,'p')" <?php if($res2['PollM']==12 OR $res2['PollM_2']==12 OR $res2['PollM_3']==12 OR $res2['PollM_4']==12){echo 'checked';} ?>/><input type="hidden" id="ph12" /></td><?php } ?>   
  </tr>
  <tr style="font-family:Times New Roman;font-size:14px;background:#ffffff;">
   <td>&nbsp;Harvesting</td>
<?php if($res['MJan']==1){?><td align="center" id="tdh1" style="background-color:<?php if($res2['HarvM']==1 OR $res2['HarvM_2']==1 OR $res2['HarvM_3']==1 OR $res2['HarvM_4']==1){echo '#FFD2FF';} ?>"><input type="checkbox" id="hc1" onClick="ClickF(1,'h')" <?php if($res2['HarvM']==1 OR $res2['HarvM_2']==1 OR $res2['HarvM_3']==1 OR $res2['HarvM_4']==1){echo 'checked';} ?>/><input type="hidden" id="hh1" /></td><?php } ?>
<?php if($res['MFeb']==1){?><td align="center" id="tdh2" style="background-color:<?php if($res2['HarvM']==2 OR $res2['HarvM_2']==2 OR $res2['HarvM_3']==2 OR $res2['HarvM_4']==2){echo '#FFD2FF';} ?>"><input type="checkbox" id="hc2" onClick="ClickF(2,'h')" <?php if($res2['HarvM']==2 OR $res2['HarvM_2']==2 OR $res2['HarvM_3']==2 OR $res2['HarvM_4']==2){echo 'checked';} ?>/><input type="hidden" id="hh2" /></td><?php } ?>
<?php if($res['MMar']==1){?><td align="center" id="tdh3" style="background-color:<?php if($res2['HarvM']==3 OR $res2['HarvM_2']==3 OR $res2['HarvM_3']==3 OR $res2['HarvM_4']==3){echo '#FFD2FF';} ?>"><input type="checkbox" id="hc3" onClick="ClickF(3,'h')" <?php if($res2['HarvM']==3 OR $res2['HarvM_2']==3 OR $res2['HarvM_3']==3 OR $res2['HarvM_4']==3){echo 'checked';} ?>/><input type="hidden" id="hh3" /></td><?php } ?>
<?php if($res['MApr']==1){?><td align="center" id="tdh4" style="background-color:<?php if($res2['HarvM']==4 OR $res2['HarvM_2']==4 OR $res2['HarvM_3']==4 OR $res2['HarvM_4']==4){echo '#FFD2FF';} ?>"><input type="checkbox" id="hc4" onClick="ClickF(4,'h')" <?php if($res2['HarvM']==4 OR $res2['HarvM_2']==4 OR $res2['HarvM_3']==4 OR $res2['HarvM_4']==4){echo 'checked';} ?>/><input type="hidden" id="hh4" /></td><?php } ?>
<?php if($res['MMay']==1){?><td align="center" id="tdh5" style="background-color:<?php if($res2['HarvM']==5 OR $res2['HarvM_2']==5 OR $res2['HarvM_3']==5 OR $res2['HarvM_4']==5){echo '#FFD2FF';} ?>"><input type="checkbox" id="hc5" onClick="ClickF(5,'h')" <?php if($res2['HarvM']==5 OR $res2['HarvM_2']==5 OR $res2['HarvM_3']==5 OR $res2['HarvM_4']==5){echo 'checked';} ?>/><input type="hidden" id="hh5" /></td><?php } ?>
<?php if($res['MJun']==1){?><td align="center" id="tdh6" style="background-color:<?php if($res2['HarvM']==6 OR $res2['HarvM_2']==6 OR $res2['HarvM_3']==6 OR $res2['HarvM_4']==6){echo '#FFD2FF';} ?>"><input type="checkbox" id="hc6" onClick="ClickF(6,'h')" <?php if($res2['HarvM']==6 OR $res2['HarvM_2']==6 OR $res2['HarvM_3']==6 OR $res2['HarvM_4']==6){echo 'checked';} ?>/><input type="hidden" id="hh6" /></td><?php } ?>
<?php if($res['MJul']==1){?><td align="center" id="tdh7" style="background-color:<?php if($res2['HarvM']==7 OR $res2['HarvM_2']==7 OR $res2['HarvM_3']==7 OR $res2['HarvM_4']==7){echo '#FFD2FF';} ?>"><input type="checkbox" id="hc7" onClick="ClickF(7,'h')" <?php if($res2['HarvM']==7 OR $res2['HarvM_2']==7 OR $res2['HarvM_3']==7 OR $res2['HarvM_4']==7){echo 'checked';} ?>/><input type="hidden" id="hh7" /></td><?php } ?>
<?php if($res['MAug']==1){?><td align="center" id="tdh8" style="background-color:<?php if($res2['HarvM']==8 OR $res2['HarvM_2']==8 OR $res2['HarvM_3']==8 OR $res2['HarvM_4']==8){echo '#FFD2FF';} ?>"><input type="checkbox" id="hc8" onClick="ClickF(8,'h')" <?php if($res2['HarvM']==8 OR $res2['HarvM_2']==8 OR $res2['HarvM_3']==8 OR $res2['HarvM_4']==8){echo 'checked';} ?>/><input type="hidden" id="hh8" /></td><?php } ?>
<?php if($res['MSep']==1){?><td align="center" id="tdh9" style="background-color:<?php if($res2['HarvM']==9 OR $res2['HarvM_2']==9 OR $res2['HarvM_3']==9 OR $res2['HarvM_4']==9){echo '#FFD2FF';} ?>"><input type="checkbox" id="hc9" onClick="ClickF(9,'h')" <?php if($res2['HarvM']==9 OR $res2['HarvM_2']==9 OR $res2['HarvM_3']==9 OR $res2['HarvM_4']==9){echo 'checked';} ?>/><input type="hidden" id="hh9" /></td><?php } ?>
<?php if($res['MOct']==1){?><td align="center" id="tdh10" style="background-color:<?php if($res2['HarvM']==10 OR $res2['HarvM_2']==10 OR $res2['HarvM_3']==10 OR $res2['HarvM_4']==10){echo '#FFD2FF';} ?>"><input type="checkbox" id="hc10" onClick="ClickF(10,'h')" <?php if($res2['HarvM']==10 OR $res2['HarvM_2']==10 OR $res2['HarvM_3']==10 OR $res2['HarvM_4']==10){echo 'checked';} ?>/><input type="hidden" id="hh10" /></td><?php } ?>
<?php if($res['MNov']==1){?><td align="center" id="tdh11" style="background-color:<?php if($res2['HarvM']==11 OR $res2['HarvM_2']==11 OR $res2['HarvM_3']==11 OR $res2['HarvM_4']==11){echo '#FFD2FF';} ?>"><input type="checkbox" id="hc11" onClick="ClickF(11,'h')" <?php if($res2['HarvM']==11 OR $res2['HarvM_2']==11 OR $res2['HarvM_3']==11 OR $res2['HarvM_4']==11){echo 'checked';} ?>/><input type="hidden" id="hh11" /></td><?php } ?>
<?php if($res['MDec']==1){?><td align="center" id="tdh12" style="background-color:<?php if($res2['HarvM']==12 OR $res2['HarvM_2']==12 OR $res2['HarvM_3']==12 OR $res2['HarvM_4']==12){echo '#FFD2FF';} ?>"><input type="checkbox" id="hc12" onClick="ClickF(12,'h')" <?php if($res2['HarvM']==12 OR $res2['HarvM_2']==12 OR $res2['HarvM_3']==12 OR $res2['HarvM_4']==12){echo 'checked';} ?>/><input type="hidden" id="hh12" /></td><?php } ?>   
  </tr>
   <tr style="font-family:Times New Roman;font-size:14px;background:#ffffff;">
   <td>&nbsp;Dispatch</td>
<?php if($res['MJan']==1){?><td align="center" id="tdd1" style="background-color:<?php if($res2['DispM']==1 OR $res2['DispM_2']==1 OR $res2['DispM_3']==1 OR $res2['DispM_4']==1){echo '#FFD2FF';} ?>"><input type="checkbox" id="dc1" onClick="ClickF(1,'d')" <?php if($res2['DispM']==1 OR $res2['DispM_2']==1 OR $res2['DispM_3']==1 OR $res2['DispM_4']==1){echo 'checked';} ?>/><input type="hidden" id="dh1" /></td><?php } ?>
<?php if($res['MFeb']==1){?><td align="center" id="tdd2" style="background-color:<?php if($res2['DispM']==2 OR $res2['DispM_2']==2 OR $res2['DispM_3']==2 OR $res2['DispM_4']==2){echo '#FFD2FF';} ?>"><input type="checkbox" id="dc2" onClick="ClickF(2,'d')" <?php if($res2['DispM']==2 OR $res2['DispM_2']==2 OR $res2['DispM_3']==2 OR $res2['DispM_4']==2){echo 'checked';} ?>/><input type="hidden" id="dh2" /></td><?php } ?>
<?php if($res['MMar']==1){?><td align="center" id="tdd3" style="background-color:<?php if($res2['DispM']==3 OR $res2['DispM_2']==3 OR $res2['DispM_3']==3 OR $res2['DispM_4']==3){echo '#FFD2FF';} ?>"><input type="checkbox" id="dc3" onClick="ClickF(3,'d')" <?php if($res2['DispM']==3 OR $res2['DispM_2']==3 OR $res2['DispM_3']==3 OR $res2['DispM_4']==3){echo 'checked';} ?>/><input type="hidden" id="dh3" /></td><?php } ?>
<?php if($res['MApr']==1){?><td align="center" id="tdd4" style="background-color:<?php if($res2['DispM']==4 OR $res2['DispM_2']==4 OR $res2['DispM_3']==4 OR $res2['DispM_4']==4){echo '#FFD2FF';} ?>"><input type="checkbox" id="dc4" onClick="ClickF(4,'d')" <?php if($res2['DispM']==4 OR $res2['DispM_2']==4 OR $res2['DispM_3']==4 OR $res2['DispM_4']==4){echo 'checked';} ?>/><input type="hidden" id="dh4" /></td><?php } ?>
<?php if($res['MMay']==1){?><td align="center" id="tdd5" style="background-color:<?php if($res2['DispM']==5 OR $res2['DispM_2']==5 OR $res2['DispM_3']==5 OR $res2['DispM_4']==5){echo '#FFD2FF';} ?>"><input type="checkbox" id="dc5" onClick="ClickF(5,'d')" <?php if($res2['DispM']==5 OR $res2['DispM_2']==5 OR $res2['DispM_3']==5 OR $res2['DispM_4']==5){echo 'checked';} ?>/><input type="hidden" id="dh5" /></td><?php } ?>
<?php if($res['MJun']==1){?><td align="center" id="tdd6" style="background-color:<?php if($res2['DispM']==6 OR $res2['DispM_2']==6 OR $res2['DispM_3']==6 OR $res2['DispM_4']==6){echo '#FFD2FF';} ?>"><input type="checkbox" id="dc6" onClick="ClickF(6,'d')" <?php if($res2['DispM']==6 OR $res2['DispM_2']==6 OR $res2['DispM_3']==6 OR $res2['DispM_4']==6){echo 'checked';} ?>/><input type="hidden" id="dh6" /></td><?php } ?>
<?php if($res['MJul']==1){?><td align="center" id="tdd7" style="background-color:<?php if($res2['DispM']==7 OR $res2['DispM_2']==7 OR $res2['DispM_3']==7 OR $res2['DispM_4']==7){echo '#FFD2FF';} ?>"><input type="checkbox" id="dc7" onClick="ClickF(7,'d')" <?php if($res2['DispM']==7 OR $res2['DispM_2']==7 OR $res2['DispM_3']==7 OR $res2['DispM_4']==7){echo 'checked';} ?>/><input type="hidden" id="dh7" /></td><?php } ?>
<?php if($res['MAug']==1){?><td align="center" id="tdd8" style="background-color:<?php if($res2['DispM']==8 OR $res2['DispM_2']==8 OR $res2['DispM_3']==8 OR $res2['DispM_4']==8){echo '#FFD2FF';} ?>"><input type="checkbox" id="dc8" onClick="ClickF(8,'d')" <?php if($res2['DispM']==8 OR $res2['DispM_2']==8 OR $res2['DispM_3']==8 OR $res2['DispM_4']==8){echo 'checked';} ?>/><input type="hidden" id="dh8" /></td><?php } ?>
<?php if($res['MSep']==1){?><td align="center" id="tdd9" style="background-color:<?php if($res2['DispM']==9 OR $res2['DispM_2']==9 OR $res2['DispM_3']==9 OR $res2['DispM_4']==9){echo '#FFD2FF';} ?>"><input type="checkbox" id="dc9" onClick="ClickF(9,'d')" <?php if($res2['DispM']==9 OR $res2['DispM_2']==9 OR $res2['DispM_3']==9 OR $res2['DispM_4']==9){echo 'checked';} ?>/><input type="hidden" id="dh9" /></td><?php } ?>
<?php if($res['MOct']==1){?><td align="center" id="tdd10" style="background-color:<?php if($res2['DispM']==10 OR $res2['DispM_2']==10 OR $res2['DispM_3']==10 OR $res2['DispM_4']==10){echo '#FFD2FF';} ?>"><input type="checkbox" id="dc10" onClick="ClickF(10,'d')" <?php if($res2['DispM']==10 OR $res2['DispM_2']==10 OR $res2['DispM_3']==10 OR $res2['DispM_4']==10){echo 'checked';} ?>/><input type="hidden" id="dh10" /></td><?php } ?>
<?php if($res['MNov']==1){?><td align="center" id="tdd11" style="background-color:<?php if($res2['DispM']==11 OR $res2['DispM_2']==11 OR $res2['DispM_3']==11 OR $res2['DispM_4']==11){echo '#FFD2FF';} ?>"><input type="checkbox" id="dc11" onClick="ClickF(11,'d')" <?php if($res2['DispM']==11 OR $res2['DispM_2']==11 OR $res2['DispM_3']==11 OR $res2['DispM_4']==11){echo 'checked';} ?>/><input type="hidden" id="dh11" /></td><?php } ?>
<?php if($res['MDec']==1){?><td align="center" id="tdd12" style="background-color:<?php if($res2['DispM']==12 OR $res2['DispM_2']==12 OR $res2['DispM_3']==12 OR $res2['DispM_4']==12){echo '#FFD2FF';} ?>"><input type="checkbox" id="dc12" onClick="ClickF(12,'d')" <?php if($res2['DispM']==12 OR $res2['DispM_2']==12 OR $res2['DispM_3']==12 OR $res2['DispM_4']==12){echo 'checked';} ?>/><input type="hidden" id="dh12" /></td><?php } ?>   
  </tr>
</table> 
<?php } ?>



<?php if(isset($_POST['ResultP']) && $_POST['ResultP']!=""){ ?>
<table border="1" style="width:1200px;">
<tr style="font-family:Times New Roman;font-size:14px;background-color:#FFFFC1;">
<?php $sqlP=mysql_query("select ProductName,TypeName from hrm_sales_seedsproduct INNER JOIN hrm_sales_seedtype ON hrm_sales_seedsproduct.TypeId=hrm_sales_seedtype.TypeId where hrm_sales_seedsproduct.ProductId=".$_POST['ResultP'], $con); $resP=mysql_fetch_assoc($sqlP); ?>
<td colspan="5" style="font-family:Times New Roman;font-size:14px;">
 &nbsp;&nbsp;&nbsp;<b>PRODUCT NAME :&nbsp;&nbsp;<?php echo $resP['ProductName'].' - '.$resP['TypeName']; ?></b></td>
<td colspan="16" align="center" style="width:100px;"><b>Month</b></td>
</tr>
<tr style="font-family:Times New Roman;font-size:14px;background-color:#D5F1D1;">
<td align="center" style="width:50px;"><b>Sn</b></td>
<td align="center" style="width:120px;"><b>State</b></td>
<td align="center" style="width:120px;"><b>Distric</b></td>
<td align="center" style="width:250px;"><b>Area</b></td>
<td align="center" style="width:150px;"><b>Season</b></td>
<td colspan="4" align="center" style="width:200px;"><b>Sowing</b></td>
<td colspan="4" align="center" style="width:200px;"><b>Pollination</b></td>
<td colspan="4" align="center" style="width:200px;"><b>Harvesting</b></td>
<td colspan="4" align="center" style="width:200px;"><b>Dispatch</b></td>
</tr>
<?php $sql=mysql_query("SELECT * FROM hrm_sales_product_details where ProductId=".$_POST['ResultP']." order by SeasonId ASC", $con); $sn=1; while($res=mysql_fetch_array($sql)){ ?>
<tr style="font-family:Times New Roman;font-size:14px;background:#ffffff;">
<td align="center"><?php echo $sn; ?></td>
<?php $sqlA=mysql_query("select AreaName,DistName,StateName from hrm_sales_areavillage INNER JOIN hrm_sales_distric ON hrm_sales_areavillage.DistId=hrm_sales_distric.DistId INNER JOIN hrm_state ON hrm_sales_distric.StateId=hrm_state.StateId where hrm_sales_areavillage.AreaId=".$res['AreaId'], $con); $resA=mysql_fetch_assoc($sqlA); ?>
<td>&nbsp;<?php echo $resA['StateName']; ?></td>
<td>&nbsp;<?php echo $resA['DistName']; ?></td>
<td>&nbsp;<?php echo $resA['AreaName']; ?></td>
<?php $sqlS=mysql_query("select SeasonName from hrm_sales_season where SeasonId=".$res['SeasonId'], $con); $resS=mysql_fetch_assoc($sqlS); ?>
<td>&nbsp;<?php echo $resS['SeasonName']; ?></td>
<td align="center"><?php if($res['SowiM']==1){echo 'Jan';}elseif($res['SowiM']==2){echo 'Feb';}elseif($res['SowiM']==3){echo 'Mar';}elseif($res['SowiM']==4){echo 'Apr';}elseif($res['SowiM']==5){echo 'May';}elseif($res['SowiM']==6){echo 'Jun';}elseif($res['SowiM']==7){echo 'Jul';}elseif($res['SowiM']==8){echo 'Aug';}elseif($res['SowiM']==9){echo 'Sep';}elseif($res['SowiM']==10){echo 'Oct';}elseif($res['SowiM']==11){echo 'Nov';}elseif($res['SowiM']==12){echo 'Dec';} ?></td>
<td align="center"><?php if($res['SowiM_2']==1){echo 'Jan';}elseif($res['SowiM_2']==2){echo 'Feb';}elseif($res['SowiM_2']==3){echo 'Mar';}elseif($res['SowiM_2']==4){echo 'Apr';}elseif($res['SowiM_2']==5){echo 'May';}elseif($res['SowiM_2']==6){echo 'Jun';}elseif($res['SowiM_2']==7){echo 'Jul';}elseif($res['SowiM_2']==8){echo 'Aug';}elseif($res['SowiM_2']==9){echo 'Sep';}elseif($res['SowiM_2']==10){echo 'Oct';}elseif($res['SowiM_2']==11){echo 'Nov';}elseif($res['SowiM_2']==12){echo 'Dec';} ?></td>
<td align="center"><?php if($res['SowiM_3']==1){echo 'Jan';}elseif($res['SowiM_3']==2){echo 'Feb';}elseif($res['SowiM_3']==3){echo 'Mar';}elseif($res['SowiM_3']==4){echo 'Apr';}elseif($res['SowiM_3']==5){echo 'May';}elseif($res['SowiM_3']==6){echo 'Jun';}elseif($res['SowiM_3']==7){echo 'Jul';}elseif($res['SowiM_3']==8){echo 'Aug';}elseif($res['SowiM_3']==9){echo 'Sep';}elseif($res['SowiM_3']==10){echo 'Oct';}elseif($res['SowiM_3']==11){echo 'Nov';}elseif($res['SowiM_3']==12){echo 'Dec';} ?></td>
<td align="center"><?php if($res['SowiM_4']==1){echo 'Jan';}elseif($res['SowiM_4']==2){echo 'Feb';}elseif($res['SowiM_4']==3){echo 'Mar';}elseif($res['SowiM_4']==4){echo 'Apr';}elseif($res['SowiM_4']==5){echo 'May';}elseif($res['SowiM_4']==6){echo 'Jun';}elseif($res['SowiM_4']==7){echo 'Jul';}elseif($res['SowiM_4']==8){echo 'Aug';}elseif($res['SowiM_4']==9){echo 'Sep';}elseif($res['SowiM_4']==10){echo 'Oct';}elseif($res['SowiM_4']==11){echo 'Nov';}elseif($res['SowiM_4']==12){echo 'Dec';} ?></td>

<td align="center"><?php if($res['PollM']==1){echo 'Jan';}elseif($res['PollM']==2){echo 'Feb';}elseif($res['PollM']==3){echo 'Mar';}elseif($res['PollM']==4){echo 'Apr';}elseif($res['PollM']==5){echo 'May';}elseif($res['PollM']==6){echo 'Jun';}elseif($res['PollM']==7){echo 'Jul';}elseif($res['PollM']==8){echo 'Aug';}elseif($res['PollM']==9){echo 'Sep';}elseif($res['PollM']==10){echo 'Oct';}elseif($res['PollM']==11){echo 'Nov';}elseif($res['PollM']==12){echo 'Dec';} ?></td>
<td align="center"><?php if($res['PollM_2']==1){echo 'Jan';}elseif($res['PollM_2']==2){echo 'Feb';}elseif($res['PollM_2']==3){echo 'Mar';}elseif($res['PollM_2']==4){echo 'Apr';}elseif($res['PollM_2']==5){echo 'May';}elseif($res['PollM_2']==6){echo 'Jun';}elseif($res['PollM_2']==7){echo 'Jul';}elseif($res['PollM_2']==8){echo 'Aug';}elseif($res['PollM_2']==9){echo 'Sep';}elseif($res['PollM_2']==10){echo 'Oct';}elseif($res['PollM_2']==11){echo 'Nov';}elseif($res['PollM_2']==12){echo 'Dec';} ?></td>
<td align="center"><?php if($res['PollM_3']==1){echo 'Jan';}elseif($res['PollM_3']==2){echo 'Feb';}elseif($res['PollM_3']==3){echo 'Mar';}elseif($res['PollM_3']==4){echo 'Apr';}elseif($res['PollM_3']==5){echo 'May';}elseif($res['PollM_3']==6){echo 'Jun';}elseif($res['PollM_3']==7){echo 'Jul';}elseif($res['PollM_3']==8){echo 'Aug';}elseif($res['PollM_3']==9){echo 'Sep';}elseif($res['PollM_3']==10){echo 'Oct';}elseif($res['PollM_3']==11){echo 'Nov';}elseif($res['PollM_3']==12){echo 'Dec';} ?></td>
<td align="center"><?php if($res['PollM_4']==1){echo 'Jan';}elseif($res['PollM_4']==2){echo 'Feb';}elseif($res['PollM_4']==3){echo 'Mar';}elseif($res['PollM_4']==4){echo 'Apr';}elseif($res['PollM_4']==5){echo 'May';}elseif($res['PollM_4']==6){echo 'Jun';}elseif($res['PollM_4']==7){echo 'Jul';}elseif($res['PollM_4']==8){echo 'Aug';}elseif($res['PollM_4']==9){echo 'Sep';}elseif($res['PollM_4']==10){echo 'Oct';}elseif($res['PollM_4']==11){echo 'Nov';}elseif($res['PollM_4']==12){echo 'Dec';} ?></td>

<td align="center"><?php if($res['HarvM']==1){echo 'Jan';}elseif($res['HarvM']==2){echo 'Feb';}elseif($res['HarvM']==3){echo 'Mar';}elseif($res['HarvM']==4){echo 'Apr';}elseif($res['HarvM']==5){echo 'May';}elseif($res['HarvM']==6){echo 'Jun';}elseif($res['HarvM']==7){echo 'Jul';}elseif($res['HarvM']==8){echo 'Aug';}elseif($res['HarvM']==9){echo 'Sep';}elseif($res['HarvM']==10){echo 'Oct';}elseif($res['HarvM']==11){echo 'Nov';}elseif($res['HarvM']==12){echo 'Dec';} ?></td>
<td align="center"><?php if($res['HarvM_2']==1){echo 'Jan';}elseif($res['HarvM_2']==2){echo 'Feb';}elseif($res['HarvM_2']==3){echo 'Mar';}elseif($res['HarvM_2']==4){echo 'Apr';}elseif($res['HarvM_2']==5){echo 'May';}elseif($res['HarvM_2']==6){echo 'Jun';}elseif($res['HarvM_2']==7){echo 'Jul';}elseif($res['HarvM_2']==8){echo 'Aug';}elseif($res['HarvM_2']==9){echo 'Sep';}elseif($res['HarvM_2']==10){echo 'Oct';}elseif($res['HarvM_2']==11){echo 'Nov';}elseif($res['HarvM_2']==12){echo 'Dec';} ?></td>
<td align="center"><?php if($res['HarvM_3']==1){echo 'Jan';}elseif($res['HarvM_3']==2){echo 'Feb';}elseif($res['HarvM_3']==3){echo ' Mar';}elseif($res['HarvM_3']==4){echo 'Apr';}elseif($res['HarvM_3']==5){echo 'May';}elseif($res['HarvM_3']==6){echo 'Jun';}elseif($res['HarvM_3']==7){echo 'Jul';}elseif($res['HarvM_3']==8){echo 'Aug';}elseif($res['HarvM_3']==9){echo 'Sep';}elseif($res['HarvM_3']==10){echo 'Oct';}elseif($res['HarvM_3']==11){echo 'Nov';}elseif($res['HarvM_3']==12){echo 'Dec';} ?></td>
<td align="center"><?php if($res['HarvM_4']==1){echo 'Jan';}elseif($res['HarvM_4']==2){echo 'Feb';}elseif($res['HarvM_4']==3){echo 'Mar';}elseif($res['HarvM_4']==4){echo 'Apr';}elseif($res['HarvM_4']==5){echo 'May';}elseif($res['HarvM_4']==6){echo 'Jun';}elseif($res['HarvM_4']==7){echo 'Jul';}elseif($res['HarvM_4']==8){echo 'Aug';}elseif($res['HarvM_4']==9){echo 'Sep';}elseif($res['HarvM_4']==10){echo 'Oct';}elseif($res['HarvM_4']==11){echo 'Nov';}elseif($res['HarvM_4']==12){echo 'Dec';} ?></td>

<td align="center"><?php if($res['DispM']==1){echo 'Jan';}elseif($res['DispM']==2){echo 'Feb';}elseif($res['DispM']==3){echo 'Mar';}elseif($res['DispM']==4){echo 'Apr';}elseif($res['DispM']==5){echo 'May';}elseif($res['DispM']==6){echo 'Jun';}elseif($res['DispM']==7){echo 'Jul';}elseif($res['DispM']==8){echo 'Aug';}elseif($res['DispM']==9){echo 'Sep';}elseif($res['DispM']==10){echo 'Oct';}elseif($res['DispM']==11){echo 'Nov';}elseif($res['DispM']==12){echo 'Dec';} ?></td>
<td align="center"><?php if($res['DispM_2']==1){echo 'Jan';}elseif($res['DispM_2']==2){echo 'Feb';}elseif($res['DispM_2']==3){echo 'Mar';}elseif($res['DispM_2']==4){echo 'Apr';}elseif($res['DispM_2']==5){echo 'May';}elseif($res['DispM_2']==6){echo 'Jun';}elseif($res['DispM_2']==7){echo 'Jul';}elseif($res['DispM_2']==8){echo 'Aug';}elseif($res['DispM_2']==9){echo 'Sep';}elseif($res['DispM_2']==10){echo 'Oct';}elseif($res['DispM_2']==11){echo 'Nov';}elseif($res['DispM_2']==12){echo 'Dec';} ?></td>
<td align="center"><?php if($res['DispM_3']==1){echo 'Jan';}elseif($res['DispM_3']==2){echo 'Feb';}elseif($res['DispM_3']==3){echo 'Mar';}elseif($res['DispM_3']==4){echo 'Apr';}elseif($res['DispM_3']==5){echo 'May';}elseif($res['DispM_3']==6){echo 'Jun';}elseif($res['DispM_3']==7){echo 'Jul';}elseif($res['DispM_3']==8){echo 'Aug';}elseif($res['DispM_3']==9){echo 'Sep';}elseif($res['DispM_3']==10){echo 'Oct';}elseif($res['DispM_3']==11){echo 'Nov';}elseif($res['DispM_3']==12){echo 'Dec';} ?></td>
<td align="center"><?php if($res['DispM_4']==1){echo 'Jan';}elseif($res['DispM_4']==2){echo 'Feb';}elseif($res['DispM_4']==3){echo 'Mar';}elseif($res['DispM_4']==4){echo 'Apr';}elseif($res['DispM_4']==5){echo 'May';}elseif($res['DispM_4']==6){echo 'Jun';}elseif($res['DispM_4']==7){echo 'Jul';}elseif($res['DispM_4']==8){echo 'Aug';}elseif($res['DispM_4']==9){echo 'Sep';}elseif($res['DispM_4']==10){echo 'Oct';}elseif($res['DispM_4']==11){echo 'Nov';}elseif($res['DispM_4']==12){echo 'Dec';} ?></td>

</tr>
<?php $sn++; } ?>
</table> 
<?php } ?>

<?php if(isset($_POST['ResultA']) && $_POST['ResultA']!=""){ ?>
<table border="1" style="width:1200px;">
<tr style="font-family:Times New Roman;font-size:14px;background-color:#FFFFC1;">
<?php $sqlP=mysql_query("select ProductName,TypeName from hrm_sales_seedsproduct INNER JOIN hrm_sales_seedtype ON hrm_sales_seedsproduct.TypeId=hrm_sales_seedtype.TypeId where hrm_sales_seedsproduct.ProductId=".$_POST['pi'], $con); $resP=mysql_fetch_assoc($sqlP); ?>
<td colspan="5" style="font-family:Times New Roman;font-size:14px;">
 &nbsp;&nbsp;&nbsp;<b>PRODUCT NAME :&nbsp;&nbsp;<?php echo $resP['ProductName'].' - '.$resP['TypeName']; ?></b></td>
<td colspan="16" align="center" style="width:100px;"><b>Month</b></td>
</tr>
<tr style="font-family:Times New Roman;font-size:14px;background-color:#D5F1D1;">
<td align="center" style="width:50px;"><b>Sn</b></td>
<td align="center" style="width:120px;"><b>State</b></td>
<td align="center" style="width:120px;"><b>Distric</b></td>
<td align="center" style="width:250px;"><b>Area</b></td>
<td align="center" style="width:150px;"><b>Season</b></td>
<td colspan="4" align="center" style="width:100px;"><b>Sowing</b></td>
<td colspan="4" align="center" style="width:100px;"><b>Pollination</b></td>
<td colspan="4" align="center" style="width:100px;"><b>Harvesting</b></td>
<td colspan="4" align="center" style="width:100px;"><b>Dispatch</b></td>
</tr>
<?php $sql=mysql_query("SELECT * FROM hrm_sales_product_details where ProductId=".$_POST['pi']." AND AreaId=".$_POST['ResultA']." order by SeasonId ASC", $con); $sn=1; while($res=mysql_fetch_array($sql)){ ?>
<tr style="font-family:Times New Roman;font-size:14px;background:#ffffff;">
<td align="center"><?php echo $sn; ?></td>
<?php $sqlA=mysql_query("select AreaName,DistName,StateName from hrm_sales_areavillage INNER JOIN hrm_sales_distric ON hrm_sales_areavillage.DistId=hrm_sales_distric.DistId INNER JOIN hrm_state ON hrm_sales_distric.StateId=hrm_state.StateId where hrm_sales_areavillage.AreaId=".$res['AreaId'], $con); $resA=mysql_fetch_assoc($sqlA); ?>
<td>&nbsp;<?php echo $resA['StateName']; ?></td>
<td>&nbsp;<?php echo $resA['DistName']; ?></td>
<td>&nbsp;<?php echo $resA['AreaName']; ?></td>
<?php $sqlS=mysql_query("select SeasonName from hrm_sales_season where SeasonId=".$res['SeasonId'], $con); $resS=mysql_fetch_assoc($sqlS); ?>
<td>&nbsp;<?php echo $resS['SeasonName']; ?></td>
<td align="center"><?php if($res['SowiM']==1){echo 'Jan';}elseif($res['SowiM']==2){echo 'Feb';}elseif($res['SowiM']==3){echo 'Mar';}elseif($res['SowiM']==4){echo 'Apr';}elseif($res['SowiM']==5){echo 'May';}elseif($res['SowiM']==6){echo 'Jun';}elseif($res['SowiM']==7){echo 'Jul';}elseif($res['SowiM']==8){echo 'Aug';}elseif($res['SowiM']==9){echo 'Sep';}elseif($res['SowiM']==10){echo 'Oct';}elseif($res['SowiM']==11){echo 'Nov';}elseif($res['SowiM']==12){echo 'Dec';} ?></td>
<td align="center"><?php if($res['SowiM_2']==1){echo 'Jan';}elseif($res['SowiM_2']==2){echo 'Feb';}elseif($res['SowiM_2']==3){echo 'Mar';}elseif($res['SowiM_2']==4){echo 'Apr';}elseif($res['SowiM_2']==5){echo 'May';}elseif($res['SowiM_2']==6){echo 'Jun';}elseif($res['SowiM_2']==7){echo 'Jul';}elseif($res['SowiM_2']==8){echo 'Aug';}elseif($res['SowiM_2']==9){echo 'Sep';}elseif($res['SowiM_2']==10){echo 'Oct';}elseif($res['SowiM_2']==11){echo 'Nov';}elseif($res['SowiM_2']==12){echo 'Dec';} ?></td>
<td align="center"><?php if($res['SowiM_3']==1){echo 'Jan';}elseif($res['SowiM_3']==2){echo 'Feb';}elseif($res['SowiM_3']==3){echo 'Mar';}elseif($res['SowiM_3']==4){echo 'Apr';}elseif($res['SowiM_3']==5){echo 'May';}elseif($res['SowiM_3']==6){echo 'Jun';}elseif($res['SowiM_3']==7){echo 'Jul';}elseif($res['SowiM_3']==8){echo 'Aug';}elseif($res['SowiM_3']==9){echo 'Sep';}elseif($res['SowiM_3']==10){echo 'Oct';}elseif($res['SowiM_3']==11){echo 'Nov';}elseif($res['SowiM_3']==12){echo 'Dec';} ?></td>
<td align="center"><?php if($res['SowiM_4']==1){echo 'Jan';}elseif($res['SowiM_4']==2){echo 'Feb';}elseif($res['SowiM_4']==3){echo 'Mar';}elseif($res['SowiM_4']==4){echo 'Apr';}elseif($res['SowiM_4']==5){echo 'May';}elseif($res['SowiM_4']==6){echo 'Jun';}elseif($res['SowiM_4']==7){echo 'Jul';}elseif($res['SowiM_4']==8){echo 'Aug';}elseif($res['SowiM_4']==9){echo 'Sep';}elseif($res['SowiM_4']==10){echo 'Oct';}elseif($res['SowiM_4']==11){echo 'Nov';}elseif($res['SowiM_4']==12){echo 'Dec';} ?></td>

<td align="center"><?php if($res['PollM']==1){echo 'Jan';}elseif($res['PollM']==2){echo 'Feb';}elseif($res['PollM']==3){echo 'Mar';}elseif($res['PollM']==4){echo 'Apr';}elseif($res['PollM']==5){echo 'May';}elseif($res['PollM']==6){echo 'Jun';}elseif($res['PollM']==7){echo 'Jul';}elseif($res['PollM']==8){echo 'Aug';}elseif($res['PollM']==9){echo 'Sep';}elseif($res['PollM']==10){echo 'Oct';}elseif($res['PollM']==11){echo 'Nov';}elseif($res['PollM']==12){echo 'Dec';} ?></td>
<td align="center"><?php if($res['PollM_2']==1){echo 'Jan';}elseif($res['PollM_2']==2){echo 'Feb';}elseif($res['PollM_2']==3){echo 'Mar';}elseif($res['PollM_2']==4){echo 'Apr';}elseif($res['PollM_2']==5){echo 'May';}elseif($res['PollM_2']==6){echo 'Jun';}elseif($res['PollM_2']==7){echo 'Jul';}elseif($res['PollM_2']==8){echo 'Aug';}elseif($res['PollM_2']==9){echo 'Sep';}elseif($res['PollM_2']==10){echo 'Oct';}elseif($res['PollM_2']==11){echo 'Nov';}elseif($res['PollM_2']==12){echo 'Dec';} ?></td>
<td align="center"><?php if($res['PollM_3']==1){echo 'Jan';}elseif($res['PollM_3']==2){echo 'Feb';}elseif($res['PollM_3']==3){echo 'Mar';}elseif($res['PollM_3']==4){echo 'Apr';}elseif($res['PollM_3']==5){echo 'May';}elseif($res['PollM_3']==6){echo 'Jun';}elseif($res['PollM_3']==7){echo 'Jul';}elseif($res['PollM_3']==8){echo 'Aug';}elseif($res['PollM_3']==9){echo 'Sep';}elseif($res['PollM_3']==10){echo 'Oct';}elseif($res['PollM_3']==11){echo 'Nov';}elseif($res['PollM_3']==12){echo 'Dec';} ?></td>
<td align="center"><?php if($res['PollM_4']==1){echo 'Jan';}elseif($res['PollM_4']==2){echo 'Feb';}elseif($res['PollM_4']==3){echo 'Mar';}elseif($res['PollM_4']==4){echo 'Apr';}elseif($res['PollM_4']==5){echo 'May';}elseif($res['PollM_4']==6){echo 'Jun';}elseif($res['PollM_4']==7){echo 'Jul';}elseif($res['PollM_4']==8){echo 'Aug';}elseif($res['PollM_4']==9){echo 'Sep';}elseif($res['PollM_4']==10){echo 'Oct';}elseif($res['PollM_4']==11){echo 'Nov';}elseif($res['PollM_4']==12){echo 'Dec';} ?></td>

<td align="center"><?php if($res['HarvM']==1){echo 'Jan';}elseif($res['HarvM']==2){echo 'Feb';}elseif($res['HarvM']==3){echo 'Mar';}elseif($res['HarvM']==4){echo 'Apr';}elseif($res['HarvM']==5){echo 'May';}elseif($res['HarvM']==6){echo 'Jun';}elseif($res['HarvM']==7){echo 'Jul';}elseif($res['HarvM']==8){echo 'Aug';}elseif($res['HarvM']==9){echo 'Sep';}elseif($res['HarvM']==10){echo 'Oct';}elseif($res['HarvM']==11){echo 'Nov';}elseif($res['HarvM']==12){echo 'Dec';} ?></td>
<td align="center"><?php if($res['HarvM_2']==1){echo 'Jan';}elseif($res['HarvM_2']==2){echo 'Feb';}elseif($res['HarvM_2']==3){echo 'Mar';}elseif($res['HarvM_2']==4){echo 'Apr';}elseif($res['HarvM_2']==5){echo 'May';}elseif($res['HarvM_2']==6){echo 'Jun';}elseif($res['HarvM_2']==7){echo 'Jul';}elseif($res['HarvM_2']==8){echo 'Aug';}elseif($res['HarvM_2']==9){echo 'Sep';}elseif($res['HarvM_2']==10){echo 'Oct';}elseif($res['HarvM_2']==11){echo 'Nov';}elseif($res['HarvM_2']==12){echo 'Dec';} ?></td>
<td align="center"><?php if($res['HarvM_3']==1){echo 'Jan';}elseif($res['HarvM_3']==2){echo 'Feb';}elseif($res['HarvM_3']==3){echo 'Mar';}elseif($res['HarvM_3']==4){echo 'Apr';}elseif($res['HarvM_3']==5){echo 'May';}elseif($res['HarvM_3']==6){echo 'Jun';}elseif($res['HarvM_3']==7){echo 'Jul';}elseif($res['HarvM_3']==8){echo 'Aug';}elseif($res['HarvM_3']==9){echo 'Sep';}elseif($res['HarvM_3']==10){echo 'Oct';}elseif($res['HarvM_3']==11){echo 'Nov';}elseif($res['HarvM_3']==12){echo 'Dec';} ?></td>
<td align="center"><?php if($res['HarvM_4']==1){echo 'Jan';}elseif($res['HarvM_4']==2){echo 'Feb';}elseif($res['HarvM_4']==3){echo 'Mar';}elseif($res['HarvM_4']==4){echo 'Apr';}elseif($res['HarvM_4']==5){echo 'May';}elseif($res['HarvM_4']==6){echo 'Jun';}elseif($res['HarvM_4']==7){echo 'Jul';}elseif($res['HarvM_4']==8){echo 'Aug';}elseif($res['HarvM_4']==9){echo 'Sep';}elseif($res['HarvM_4']==10){echo 'Oct';}elseif($res['HarvM_4']==11){echo 'Nov';}elseif($res['HarvM_4']==12){echo 'Dec';} ?></td>

<td align="center"><?php if($res['DispM']==1){echo 'Jan';}elseif($res['DispM']==2){echo 'Feb';}elseif($res['DispM']==3){echo 'Mar';}elseif($res['DispM']==4){echo 'Apr';}elseif($res['DispM']==5){echo 'May';}elseif($res['DispM']==6){echo 'Jun';}elseif($res['DispM']==7){echo 'Jul';}elseif($res['DispM']==8){echo 'Aug';}elseif($res['DispM']==9){echo 'Sep';}elseif($res['DispM']==10){echo 'Oct';}elseif($res['DispM']==11){echo 'Nov';}elseif($res['DispM']==12){echo 'Dec';} ?></td>
<td align="center"><?php if($res['DispM_2']==1){echo 'Jan';}elseif($res['DispM_2']==2){echo 'Feb';}elseif($res['DispM_2']==3){echo 'Mar';}elseif($res['DispM_2']==4){echo 'Apr';}elseif($res['DispM_2']==5){echo 'May';}elseif($res['DispM_2']==6){echo 'Jun';}elseif($res['DispM_2']==7){echo 'Jul';}elseif($res['DispM_2']==8){echo 'Aug';}elseif($res['DispM_2']==9){echo 'Sep';}elseif($res['DispM_2']==10){echo 'Oct';}elseif($res['DispM_2']==11){echo 'Nov';}elseif($res['DispM_2']==12){echo 'Dec';} ?></td
><td align="center"><?php if($res['DispM_3']==1){echo 'Jan';}elseif($res['DispM_3']==2){echo 'Feb';}elseif($res['DispM_3']==3){echo 'Mar';}elseif($res['DispM_3']==4){echo 'Apr';}elseif($res['DispM_3']==5){echo 'May';}elseif($res['DispM_3']==6){echo 'Jun';}elseif($res['DispM_3']==7){echo 'Jul';}elseif($res['DispM_3']==8){echo 'Aug';}elseif($res['DispM_3']==9){echo 'Sep';}elseif($res['DispM_3']==10){echo 'Oct';}elseif($res['DispM_3']==11){echo 'Nov';}elseif($res['DispM_3']==12){echo 'Dec';} ?></td>
<td align="center"><?php if($res['DispM_4']==1){echo 'Jan';}elseif($res['DispM_4']==2){echo 'Feb';}elseif($res['DispM_4']==3){echo 'Mar';}elseif($res['DispM_4']==4){echo 'Apr';}elseif($res['DispM_4']==5){echo 'May';}elseif($res['DispM_4']==6){echo 'Jun';}elseif($res['DispM_4']==7){echo 'Jul';}elseif($res['DispM_4']==8){echo 'Aug';}elseif($res['DispM_4']==9){echo 'Sep';}elseif($res['DispM_4']==10){echo 'Oct';}elseif($res['DispM_4']==11){echo 'Nov';}elseif($res['DispM_4']==12){echo 'Dec';} ?></td>

</tr>
<?php $sn++; } ?>
</table> 
<?php } ?>


<?php if(isset($_POST['Action']) && $_POST['Action']=='ResultS'){ ?>
<table border="1" style="width:1200px;">
<tr style="font-family:Times New Roman;font-size:14px;background-color:#FFFFC1;">
<?php $sqlP=mysql_query("select ProductName,TypeName from hrm_sales_seedsproduct INNER JOIN hrm_sales_seedtype ON hrm_sales_seedsproduct.TypeId=hrm_sales_seedtype.TypeId where hrm_sales_seedsproduct.ProductId=".$_POST['pi'], $con); $resP=mysql_fetch_assoc($sqlP); ?>
<td colspan="5" style="font-family:Times New Roman;font-size:14px;">
 &nbsp;&nbsp;&nbsp;<b>PRODUCT NAME :&nbsp;&nbsp;<?php echo $resP['ProductName'].' - '.$resP['TypeName']; ?></b></td>
<td colspan="16" align="center" style="width:100px;"><b>Month</b></td>
</tr>
<tr style="font-family:Times New Roman;font-size:14px;background-color:#D5F1D1;">
<td align="center" style="width:50px;"><b>Sn</b></td>
<td align="center" style="width:120px;"><b>State</b></td>
<td align="center" style="width:120px;"><b>Distric</b></td>
<td align="center" style="width:250px;"><b>Area</b></td>
<td align="center" style="width:150px;"><b>Season</b></td>
<td colspan="4" align="center" style="width:100px;"><b>Sowing</b></td>
<td colspan="4" align="center" style="width:100px;"><b>Pollination</b></td>
<td colspan="4" align="center" style="width:100px;"><b>Harvesting</b></td>
<td colspan="4" align="center" style="width:100px;"><b>Dispatch</b></td>
</tr>
<?php $sql=mysql_query("SELECT * FROM hrm_sales_product_details where ProductId=".$_POST['pi']." AND AreaId=".$_POST['ai']." AND SeasonId=".$_POST['si']." order by SeasonId ASC", $con); $sn=1; while($res=mysql_fetch_array($sql)){ ?>
<tr style="font-family:Times New Roman;font-size:14px;background:#ffffff;">
<td align="center"><?php echo $sn; ?></td>
<?php $sqlA=mysql_query("select AreaName,DistName,StateName from hrm_sales_areavillage INNER JOIN hrm_sales_distric ON hrm_sales_areavillage.DistId=hrm_sales_distric.DistId INNER JOIN hrm_state ON hrm_sales_distric.StateId=hrm_state.StateId where hrm_sales_areavillage.AreaId=".$res['AreaId'], $con); $resA=mysql_fetch_assoc($sqlA); ?>
<td>&nbsp;<?php echo $resA['StateName']; ?></td>
<td>&nbsp;<?php echo $resA['DistName']; ?></td>
<td>&nbsp;<?php echo $resA['AreaName']; ?></td>
<?php $sqlS=mysql_query("select SeasonName from hrm_sales_season where SeasonId=".$res['SeasonId'], $con); $resS=mysql_fetch_assoc($sqlS); ?>
<td>&nbsp;<?php echo $resS['SeasonName']; ?></td>
<td align="center"><?php if($res['SowiM']==1){echo 'Jan';}elseif($res['SowiM']==2){echo 'Feb';}elseif($res['SowiM']==3){echo 'Mar';}elseif($res['SowiM']==4){echo 'Apr';}elseif($res['SowiM']==5){echo 'May';}elseif($res['SowiM']==6){echo 'Jun';}elseif($res['SowiM']==7){echo 'Jul';}elseif($res['SowiM']==8){echo 'Aug';}elseif($res['SowiM']==9){echo 'Sep';}elseif($res['SowiM']==10){echo 'Oct';}elseif($res['SowiM']==11){echo 'Nov';}elseif($res['SowiM']==12){echo 'Dec';} ?></td>
<td align="center"><?php if($res['SowiM_2']==1){echo 'Jan';}elseif($res['SowiM_2']==2){echo 'Feb';}elseif($res['SowiM_2']==3){echo 'Mar';}elseif($res['SowiM_2']==4){echo 'Apr';}elseif($res['SowiM_2']==5){echo 'May';}elseif($res['SowiM_2']==6){echo 'Jun';}elseif($res['SowiM_2']==7){echo 'Jul';}elseif($res['SowiM_2']==8){echo 'Aug';}elseif($res['SowiM_2']==9){echo 'Sep';}elseif($res['SowiM_2']==10){echo 'Oct';}elseif($res['SowiM_2']==11){echo 'Nov';}elseif($res['SowiM_2']==12){echo 'Dec';} ?></td>
<td align="center"><?php if($res['SowiM_3']==1){echo 'Jan';}elseif($res['SowiM_3']==2){echo 'Feb';}elseif($res['SowiM_3']==3){echo 'Mar';}elseif($res['SowiM_3']==4){echo 'Apr';}elseif($res['SowiM_3']==5){echo 'May';}elseif($res['SowiM_3']==6){echo 'Jun';}elseif($res['SowiM_3']==7){echo 'Jul';}elseif($res['SowiM_3']==8){echo 'Aug';}elseif($res['SowiM_3']==9){echo 'Sep';}elseif($res['SowiM_3']==10){echo 'Oct';}elseif($res['SowiM_3']==11){echo 'Nov';}elseif($res['SowiM_3']==12){echo 'Dec';} ?></td>
<td align="center"><?php if($res['SowiM_4']==1){echo 'Jan';}elseif($res['SowiM_4']==2){echo 'Feb';}elseif($res['SowiM_4']==3){echo 'Mar';}elseif($res['SowiM_4']==4){echo 'Apr';}elseif($res['SowiM_4']==5){echo 'May';}elseif($res['SowiM_4']==6){echo 'Jun';}elseif($res['SowiM_4']==7){echo 'Jul';}elseif($res['SowiM_4']==8){echo 'Aug';}elseif($res['SowiM_4']==9){echo 'Sep';}elseif($res['SowiM_4']==10){echo 'Oct';}elseif($res['SowiM_4']==11){echo 'Nov';}elseif($res['SowiM_4']==12){echo 'Dec';} ?></td>

<td align="center"><?php if($res['PollM']==1){echo 'Jan';}elseif($res['PollM']==2){echo 'Feb';}elseif($res['PollM']==3){echo 'Mar';}elseif($res['PollM']==4){echo 'Apr';}elseif($res['PollM']==5){echo 'May';}elseif($res['PollM']==6){echo 'Jun';}elseif($res['PollM']==7){echo 'Jul';}elseif($res['PollM']==8){echo 'Aug';}elseif($res['PollM']==9){echo 'Sep';}elseif($res['PollM']==10){echo 'Oct';}elseif($res['PollM']==11){echo 'Nov';}elseif($res['PollM']==12){echo 'Dec';} ?></td>
<td align="center"><?php if($res['PollM_2']==1){echo 'Jan';}elseif($res['PollM_2']==2){echo 'Feb';}elseif($res['PollM_2']==3){echo 'Mar';}elseif($res['PollM_2']==4){echo 'Apr';}elseif($res['PollM_2']==5){echo 'May';}elseif($res['PollM_2']==6){echo 'Jun';}elseif($res['PollM_2']==7){echo 'Jul';}elseif($res['PollM_2']==8){echo 'Aug';}elseif($res['PollM_2']==9){echo 'Sep';}elseif($res['PollM_2']==10){echo 'Oct';}elseif($res['PollM_2']==11){echo 'Nov';}elseif($res['PollM_2']==12){echo 'Dec';} ?></td>
<td align="center"><?php if($res['PollM_3']==1){echo 'Jan';}elseif($res['PollM_3']==2){echo 'Feb';}elseif($res['PollM_3']==3){echo 'Mar';}elseif($res['PollM_3']==4){echo 'Apr';}elseif($res['PollM_3']==5){echo 'May';}elseif($res['PollM_3']==6){echo 'Jun';}elseif($res['PollM_3']==7){echo 'Jul';}elseif($res['PollM_3']==8){echo 'Aug';}elseif($res['PollM_3']==9){echo 'Sep';}elseif($res['PollM_3']==10){echo 'Oct';}elseif($res['PollM_3']==11){echo 'Nov';}elseif($res['PollM_3']==12){echo 'Dec';} ?></td>
<td align="center"><?php if($res['PollM_4']==1){echo 'Jan';}elseif($res['PollM_4']==2){echo 'Feb';}elseif($res['PollM_4']==3){echo 'Mar';}elseif($res['PollM_4']==4){echo 'Apr';}elseif($res['PollM_4']==5){echo 'May';}elseif($res['PollM_4']==6){echo 'Jun';}elseif($res['PollM_4']==7){echo 'Jul';}elseif($res['PollM_4']==8){echo 'Aug';}elseif($res['PollM_4']==9){echo 'Sep';}elseif($res['PollM_4']==10){echo 'Oct';}elseif($res['PollM_4']==11){echo 'Nov';}elseif($res['PollM_4']==12){echo 'Dec';} ?></td>

<td align="center"><?php if($res['HarvM']==1){echo 'Jan';}elseif($res['HarvM']==2){echo 'Feb';}elseif($res['HarvM']==3){echo 'Mar';}elseif($res['HarvM']==4){echo 'Apr';}elseif($res['HarvM']==5){echo 'May';}elseif($res['HarvM']==6){echo 'Jun';}elseif($res['HarvM']==7){echo 'Jul';}elseif($res['HarvM']==8){echo 'Aug';}elseif($res['HarvM']==9){echo 'Sep';}elseif($res['HarvM']==10){echo 'Oct';}elseif($res['HarvM']==11){echo 'Nov';}elseif($res['HarvM']==12){echo 'Dec';} ?></td>
<td align="center"><?php if($res['HarvM_2']==1){echo 'Jan';}elseif($res['HarvM_2']==2){echo 'Feb';}elseif($res['HarvM_2']==3){echo 'Mar';}elseif($res['HarvM_2']==4){echo 'Apr';}elseif($res['HarvM_2']==5){echo 'May';}elseif($res['HarvM_2']==6){echo 'Jun';}elseif($res['HarvM_2']==7){echo 'Jul';}elseif($res['HarvM_2']==8){echo 'Aug';}elseif($res['HarvM_2']==9){echo 'Sep';}elseif($res['HarvM_2']==10){echo 'Oct';}elseif($res['HarvM_2']==11){echo 'Nov';}elseif($res['HarvM_2']==12){echo 'Dec';} ?></td>
<td align="center"><?php if($res['HarvM_3']==1){echo 'Jan';}elseif($res['HarvM_3']==2){echo 'Feb';}elseif($res['HarvM_3']==3){echo 'Mar';}elseif($res['HarvM_3']==4){echo 'Apr';}elseif($res['HarvM_3']==5){echo 'May';}elseif($res['HarvM_3']==6){echo 'Jun';}elseif($res['HarvM_3']==7){echo 'Jul';}elseif($res['HarvM_3']==8){echo 'Aug';}elseif($res['HarvM_3']==9){echo 'Sep';}elseif($res['HarvM_3']==10){echo 'Oct';}elseif($res['HarvM_3']==11){echo 'Nov';}elseif($res['HarvM_3']==12){echo 'Dec';} ?></td>
<td align="center"><?php if($res['HarvM_4']==1){echo 'Jan';}elseif($res['HarvM_4']==2){echo 'Feb';}elseif($res['HarvM_4']==3){echo 'Mar';}elseif($res['HarvM_4']==4){echo 'Apr';}elseif($res['HarvM_4']==5){echo 'May';}elseif($res['HarvM_4']==6){echo 'Jun';}elseif($res['HarvM_4']==7){echo 'Jul';}elseif($res['HarvM_4']==8){echo 'Aug';}elseif($res['HarvM_4']==9){echo 'Sep';}elseif($res['HarvM_4']==10){echo 'Oct';}elseif($res['HarvM_4']==11){echo 'Nov';}elseif($res['HarvM_4']==12){echo 'Dec';} ?></td>

<td align="center"><?php if($res['DispM']==1){echo 'Jan';}elseif($res['DispM']==2){echo 'Feb';}elseif($res['DispM']==3){echo 'Mar';}elseif($res['DispM']==4){echo 'Apr';}elseif($res['DispM']==5){echo 'May';}elseif($res['DispM']==6){echo 'Jun';}elseif($res['DispM']==7){echo 'Jul';}elseif($res['DispM']==8){echo 'Aug';}elseif($res['DispM']==9){echo 'Sep';}elseif($res['DispM']==10){echo 'Oct';}elseif($res['DispM']==11){echo 'Nov';}elseif($res['DispM']==12){echo 'Dec';} ?></td>
<td align="center"><?php if($res['DispM_2']==1){echo 'Jan';}elseif($res['DispM_2']==2){echo 'Feb';}elseif($res['DispM_2']==3){echo 'Mar';}elseif($res['DispM_2']==4){echo 'Apr';}elseif($res['DispM_2']==5){echo 'May';}elseif($res['DispM_2']==6){echo 'Jun';}elseif($res['DispM_2']==7){echo 'Jul';}elseif($res['DispM_2']==8){echo 'Aug';}elseif($res['DispM_2']==9){echo 'Sep';}elseif($res['DispM_2']==10){echo 'Oct';}elseif($res['DispM_2']==11){echo 'Nov';}elseif($res['DispM_2']==12){echo 'Dec';} ?></td>
<td align="center"><?php if($res['DispM_3']==1){echo 'Jan';}elseif($res['DispM_3']==2){echo 'Feb';}elseif($res['DispM_3']==3){echo 'Mar';}elseif($res['DispM_3']==4){echo 'Apr';}elseif($res['DispM_3']==5){echo 'May';}elseif($res['DispM_3']==6){echo 'Jun';}elseif($res['DispM_3']==7){echo 'Jul';}elseif($res['DispM_3']==8){echo 'Aug';}elseif($res['DispM_3']==9){echo 'Sep';}elseif($res['DispM_3']==10){echo 'Oct';}elseif($res['DispM_3']==11){echo 'Nov';}elseif($res['DispM_3']==12){echo 'Dec';} ?></td>
<td align="center"><?php if($res['DispM_4']==1){echo 'Jan';}elseif($res['DispM_4']==2){echo 'Feb';}elseif($res['DispM_4']==3){echo 'Mar';}elseif($res['DispM_4']==4){echo 'Apr';}elseif($res['DispM_4']==5){echo 'May';}elseif($res['DispM_4']==6){echo 'Jun';}elseif($res['DispM_4']==7){echo 'Jul';}elseif($res['DispM_4']==8){echo 'Aug';}elseif($res['DispM_4']==9){echo 'Sep';}elseif($res['DispM_4']==10){echo 'Oct';}elseif($res['DispM_4']==11){echo 'Nov';}elseif($res['DispM_4']==12){echo 'Dec';} ?></td>
</tr>
<?php $sn++; } ?>
</table> 
<?php } ?>


<?php if(isset($_POST['Action']) && $_POST['Action']=='AddProductDetail'){ 
$sql=mysql_query("SELECT * FROM hrm_sales_product_details where ProductId=".$_POST['pi']." AND AreaId=".$_POST['ai']." AND SeasonId=".$_POST['si'], $con); $row=mysql_num_rows($sql); 
if($row>0)
 {$res=mysql_fetch_assoc($sql);
  if($_POST['v']=='s')
  {
    if($res['SowiM']==0){$sqlU1=mysql_query("update hrm_sales_product_details set SowiM=".$_POST['vhn']." where ProductId=".$_POST['pi']." AND AreaId=".$_POST['ai']." AND SeasonId=".$_POST['si'], $con);}
	elseif($res['SowiM_2']==0){$sqlU1=mysql_query("update hrm_sales_product_details set SowiM_2=".$_POST['vhn']." where ProductId=".$_POST['pi']." AND AreaId=".$_POST['ai']." AND SeasonId=".$_POST['si'], $con);}
	elseif($res['SowiM_3']==0){$sqlU1=mysql_query("update hrm_sales_product_details set SowiM_3=".$_POST['vhn']." where ProductId=".$_POST['pi']." AND AreaId=".$_POST['ai']." AND SeasonId=".$_POST['si'], $con);}
	elseif($res['SowiM_4']==0){$sqlU1=mysql_query("update hrm_sales_product_details set SowiM_4=".$_POST['vhn']." where ProductId=".$_POST['pi']." AND AreaId=".$_POST['ai']." AND SeasonId=".$_POST['si'], $con);}
  }
  if($_POST['v']=='p')
  {
    if($res['PollM']==0){$sqlU1=mysql_query("update hrm_sales_product_details set PollM=".$_POST['vhn']." where ProductId=".$_POST['pi']." AND AreaId=".$_POST['ai']." AND SeasonId=".$_POST['si'], $con);}
	elseif($res['PollM_2']==0){$sqlU1=mysql_query("update hrm_sales_product_details set PollM_2=".$_POST['vhn']." where ProductId=".$_POST['pi']." AND AreaId=".$_POST['ai']." AND SeasonId=".$_POST['si'], $con);}
	elseif($res['PollM_3']==0){$sqlU1=mysql_query("update hrm_sales_product_details set PollM_3=".$_POST['vhn']." where ProductId=".$_POST['pi']." AND AreaId=".$_POST['ai']." AND SeasonId=".$_POST['si'], $con);}
	elseif($res['PollM_4']==0){$sqlU1=mysql_query("update hrm_sales_product_details set PollM_4=".$_POST['vhn']." where ProductId=".$_POST['pi']." AND AreaId=".$_POST['ai']." AND SeasonId=".$_POST['si'], $con);}
  }
  if($_POST['v']=='h')
  {
    if($res['HarvM']==0){$sqlU1=mysql_query("update hrm_sales_product_details set HarvM=".$_POST['vhn']." where ProductId=".$_POST['pi']." AND AreaId=".$_POST['ai']." AND SeasonId=".$_POST['si'], $con);}
	elseif($res['HarvM_2']==0){$sqlU1=mysql_query("update hrm_sales_product_details set HarvM_2=".$_POST['vhn']." where ProductId=".$_POST['pi']." AND AreaId=".$_POST['ai']." AND SeasonId=".$_POST['si'], $con);}	
	elseif($res['HarvM_3']==0){$sqlU1=mysql_query("update hrm_sales_product_details set HarvM_3=".$_POST['vhn']." where ProductId=".$_POST['pi']." AND AreaId=".$_POST['ai']." AND SeasonId=".$_POST['si'], $con);}
	elseif($res['HarvM_4']==0){$sqlU1=mysql_query("update hrm_sales_product_details set HarvM_4=".$_POST['vhn']." where ProductId=".$_POST['pi']." AND AreaId=".$_POST['ai']." AND SeasonId=".$_POST['si'], $con);}
  }
  if($_POST['v']=='d')
  {
    if($res['DispM']==0){$sqlU1=mysql_query("update hrm_sales_product_details set DispM=".$_POST['vhn']." where ProductId=".$_POST['pi']." AND AreaId=".$_POST['ai']." AND SeasonId=".$_POST['si'], $con);}
	elseif($res['DispM_2']==0){$sqlU1=mysql_query("update hrm_sales_product_details set DispM_2=".$_POST['vhn']." where ProductId=".$_POST['pi']." AND AreaId=".$_POST['ai']." AND SeasonId=".$_POST['si'], $con);}
	elseif($res['DispM_3']==0){$sqlU1=mysql_query("update hrm_sales_product_details set DispM_3=".$_POST['vhn']." where ProductId=".$_POST['pi']." AND AreaId=".$_POST['ai']." AND SeasonId=".$_POST['si'], $con);}
	elseif($res['DispM_4']==0){$sqlU1=mysql_query("update hrm_sales_product_details set DispM_4=".$_POST['vhn']." where ProductId=".$_POST['pi']." AND AreaId=".$_POST['ai']." AND SeasonId=".$_POST['si'], $con);}
  }
 }
 elseif($row==0)
 { 
  if($_POST['v']=='s')
  {$sqlIns=mysql_query("insert into hrm_sales_product_details(ProductId,AreaId,SeasonId,SowiM) values(".$_POST['pi'].",".$_POST['ai'].",".$_POST['si'].",".$_POST['vhn'].")", $con); }
  if($_POST['v']=='p')
  {$sqlIns=mysql_query("insert into hrm_sales_product_details(ProductId,AreaId,SeasonId,PollM) values(".$_POST['pi'].",".$_POST['ai'].",".$_POST['si'].",".$_POST['vhn'].")", $con); }
  if($_POST['v']=='h')
  {$sqlIns=mysql_query("insert into hrm_sales_product_details(ProductId,AreaId,SeasonId,HarvM) values(".$_POST['pi'].",".$_POST['ai'].",".$_POST['si'].",".$_POST['vhn'].")", $con); }
  if($_POST['v']=='d')
  {$sqlIns=mysql_query("insert into hrm_sales_product_details(ProductId,AreaId,SeasonId,DispM) values(".$_POST['pi'].",".$_POST['ai'].",".$_POST['si'].",".$_POST['vhn'].")", $con); }
 }
  echo '<input type="hidden" id="v" value="'.$_POST['v'].'" />'; echo '<input type="hidden" id="n" value="'.$_POST['n'].'" />';
} 
?>

<?php if(isset($_POST['Action']) && $_POST['Action']=='DelProductDetail'){ 
$sql=mysql_query("SELECT * FROM hrm_sales_product_details where ProductId=".$_POST['pi']." AND AreaId=".$_POST['ai']." AND SeasonId=".$_POST['si'], $con); $row=mysql_num_rows($sql); 
if($row>0)
 {$res=mysql_fetch_assoc($sql);
  if($_POST['v']=='s')
  {
    if($res['SowiM']!=0){$sqlU1=mysql_query("update hrm_sales_product_details set SowiM=0 where ProductId=".$_POST['pi']." AND AreaId=".$_POST['ai']." AND SeasonId=".$_POST['si'], $con);}
	elseif($res['SowiM_2']!=0){$sqlU1=mysql_query("update hrm_sales_product_details set SowiM_2=0 where ProductId=".$_POST['pi']." AND AreaId=".$_POST['ai']." AND SeasonId=".$_POST['si'], $con);}
	elseif($res['SowiM_3']!=0){$sqlU1=mysql_query("update hrm_sales_product_details set SowiM_3=0 where ProductId=".$_POST['pi']." AND AreaId=".$_POST['ai']." AND SeasonId=".$_POST['si'], $con);}
    elseif($res['SowiM_4']!=0){$sqlU1=mysql_query("update hrm_sales_product_details set SowiM_4=0 where ProductId=".$_POST['pi']." AND AreaId=".$_POST['ai']." AND SeasonId=".$_POST['si'], $con);}
  }
  if($_POST['v']=='p')
  {
    if($res['PollM']!=0){$sqlU1=mysql_query("update hrm_sales_product_details set PollM=0 where ProductId=".$_POST['pi']." AND AreaId=".$_POST['ai']." AND SeasonId=".$_POST['si'], $con);}
	elseif($res['PollM_2']!=0){$sqlU1=mysql_query("update hrm_sales_product_details set PollM_2=0 where ProductId=".$_POST['pi']." AND AreaId=".$_POST['ai']." AND SeasonId=".$_POST['si'], $con);}
	elseif($res['PollM_3']!=0){$sqlU1=mysql_query("update hrm_sales_product_details set PollM_3=0 where ProductId=".$_POST['pi']." AND AreaId=".$_POST['ai']." AND SeasonId=".$_POST['si'], $con);}
    elseif($res['PollM_4']!=0){$sqlU1=mysql_query("update hrm_sales_product_details set PollM_4=0 where ProductId=".$_POST['pi']." AND AreaId=".$_POST['ai']." AND SeasonId=".$_POST['si'], $con);}

  }
  if($_POST['v']=='h')
  {
    if($res['HarvM']!=0){$sqlU1=mysql_query("update hrm_sales_product_details set HarvM=0 where ProductId=".$_POST['pi']." AND AreaId=".$_POST['ai']." AND SeasonId=".$_POST['si'], $con);}
	elseif($res['HarvM_2']!=0){$sqlU1=mysql_query("update hrm_sales_product_details set HarvM_2=0 where ProductId=".$_POST['pi']." AND AreaId=".$_POST['ai']." AND SeasonId=".$_POST['si'], $con);}
	elseif($res['HarvM_3']!=0){$sqlU1=mysql_query("update hrm_sales_product_details set HarvM_3=0 where ProductId=".$_POST['pi']." AND AreaId=".$_POST['ai']." AND SeasonId=".$_POST['si'], $con);}
    elseif($res['HarvM_4']!=0){$sqlU1=mysql_query("update hrm_sales_product_details set HarvM_4=0 where ProductId=".$_POST['pi']." AND AreaId=".$_POST['ai']." AND SeasonId=".$_POST['si'], $con);}

  }
  if($_POST['v']=='d')
  {
    if($res['DispM']!=0){$sqlU1=mysql_query("update hrm_sales_product_details set DispM=0 where ProductId=".$_POST['pi']." AND AreaId=".$_POST['ai']." AND SeasonId=".$_POST['si'], $con);}
	elseif($res['DispM_2']!=0){$sqlU1=mysql_query("update hrm_sales_product_details set DispM_2=0 where ProductId=".$_POST['pi']." AND AreaId=".$_POST['ai']." AND SeasonId=".$_POST['si'], $con);}
	elseif($res['DispM_3']!=0){$sqlU1=mysql_query("update hrm_sales_product_details set DispM_3=0 where ProductId=".$_POST['pi']." AND AreaId=".$_POST['ai']." AND SeasonId=".$_POST['si'], $con);}
    elseif($res['DispM_4']!=0){$sqlU1=mysql_query("update hrm_sales_product_details set DispM_4=0 where ProductId=".$_POST['pi']." AND AreaId=".$_POST['ai']." AND SeasonId=".$_POST['si'], $con);}

  }
 }
 echo '<input type="hidden" id="v" value="'.$_POST['v'].'" />'; echo '<input type="hidden" id="n" value="'.$_POST['n'].'" />'; 
} 
?>
