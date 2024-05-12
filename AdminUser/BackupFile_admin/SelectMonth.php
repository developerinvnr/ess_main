<?php  require_once('config/config.php');
if(isset($_POST['id']) && $_POST['id']!=""){ $id = $_POST['id']; $CompanyID = $_POST['CompanyID']; ?>
<input type="hidden" name="MonthName" id="MonthName" value="<?php if($id==1){echo 'January';} elseif($id==2){echo 'February';}elseif($id==3){echo 'March';}elseif($id==4){echo 'April';}elseif($id==5){echo 'May';}elseif($id==6){echo 'June';}elseif($id==7){echo 'July';}elseif($id==8){echo 'August';}elseif($id==9){echo 'September';}elseif($id==10){echo 'October';}elseif($id==11){echo 'November';}elseif($id==12){echo 'December';}?>" />
<input type="hidden" name="SelectMonth" id="SelectMonth" value="<?php echo $id; ?>" />
<?php 
if(date("m")==01){ if($id==12){$Y=date("Y")-1;}else{$Y=date("Y");} }
if(date("m")!=01){ $Y=date("Y");}
?>
<table border="1">
 <tr>
<?php  if($id==1){ for($i=1; $i<=31; $i++) { ?> 
      <td align="center" class="cell" <?php if(date("w",strtotime(date($Y.'-'.$id.'-'.$i)))==0) {echo 'bgcolor="#6B983A"';}?> width="45"><?php echo $i; ?></td><?php } } ?>
	  
<?php if($id==2){ if($Y==2012 OR $Y==2016 OR $Y==2020 OR $Y==2024 OR $Y==2028 OR $Y==2032 OR $Y==2036 OR $Y==2040) { $day=29; } else { $day=28;} for($i=1; $i<=$day; $i++) {?>
      <td align="center" class="cell" <?php if(date("w",strtotime(date($Y.'-'.$id.'-'.$i)))==0) {echo 'bgcolor="#6B983A"';} ?> width="45"><?php echo $i; ?></td><?php } } ?>
	  
<?php if($id==3){ for($i=1; $i<=31; $i++) {?>
      <td align="center" class="cell" <?php if(date("w",strtotime(date($Y.'-'.$id.'-'.$i)))==0) {echo 'bgcolor="#6B983A"';} ?> width="45"><?php echo $i; ?></td><?php } } ?>
	  
<?php if($id==4){ for($i=1; $i<=30; $i++) {?>
      <td align="center" class="cell" <?php if(date("w",strtotime(date($Y.'-'.$id.'-'.$i)))==0) {echo 'bgcolor="#6B983A"';} ?> width="45"><?php echo $i; ?></td><?php } } ?>
	  
<?php if($id==5){ for($i=1; $i<=31; $i++) {?>
      <td align="center" class="cell" <?php if(date("w",strtotime(date($Y.'-'.$id.'-'.$i)))==0) {echo 'bgcolor="#6B983A"';} ?> width="45"><?php echo $i; ?></td><?php } } ?>
	  
<?php if($id==6){ for($i=1; $i<=30; $i++) {?>
      <td align="center" class="cell" <?php if(date("w",strtotime(date($Y.'-'.$id.'-'.$i)))==0) {echo 'bgcolor="#6B983A"';} ?> width="45"><?php echo $i; ?></td><?php } } ?>
	  
<?php if($id==7){ for($i=1; $i<=31; $i++) {?>
      <td align="center" class="cell" <?php if(date("w",strtotime(date($Y.'-'.$id.'-'.$i)))==0) {echo 'bgcolor="#6B983A"';} ?> width="45"><?php echo $i; ?></td><?php } } ?>
	  
<?php if($id==8){ for($i=1; $i<=31; $i++) {?>
      <td align="center" class="cell" <?php if(date("w",strtotime(date($Y.'-'.$id.'-'.$i)))==0) {echo 'bgcolor="#6B983A"';} ?> width="45"><?php echo $i; ?></td><?php } } ?>	  
	  
<?php if($id==9){ for($i=1; $i<=30; $i++) {?>
      <td align="center" class="cell" <?php if(date("w",strtotime(date($Y.'-'.$id.'-'.$i)))==0) {echo 'bgcolor="#6B983A"';} ?> width="45"><?php echo $i; ?></td><?php } } ?>
	  
<?php if($id==10){ for($i=1; $i<=31; $i++) {?>
      <td align="center" class="cell" <?php if(date("w",strtotime(date($Y.'-'.$id.'-'.$i)))==0) {echo 'bgcolor="#6B983A"';} ?> width="45"><?php echo $i; ?></td><?php } } ?>
	  
<?php if($id==11){ for($i=1; $i<=30; $i++) {?>
      <td align="center" class="cell" <?php if(date("w",strtotime(date($Y.'-'.$id.'-'.$i)))==0) {echo 'bgcolor="#6B983A"';} ?> width="45"><?php echo $i; ?></td><?php } } ?>
	  
<?php if($id==12){ for($i=1; $i<=31; $i++) {?>
      <td align="center" class="cell" <?php if(date("w",strtotime(date($Y.'-'.$id.'-'.$i)))==0) {echo 'bgcolor="#6B983A"';} ?> width="45"><?php echo $i; ?></td><?php } } ?>  
 </tr>
</table>
	   
<?php } ?>
