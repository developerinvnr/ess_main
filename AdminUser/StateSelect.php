<?php
require_once('config/config.php');
if(isset($_POST['Stateid']) && $_POST['Stateid']!=""){ ?>

      <select class="All_120" name="HQName" id="HQName">
	  <option style="background-color:#DBD3E2; " value="0">Select</option>
<?php $sql = mysql_query("select id,city_village_name as value from core_city_village_by_state WHERE is_active=1 and state_id=".$_POST['Stateid']." group by city_village_name order by city_village_name", $con) or die(mysql_error()); 
      while($res = mysql_fetch_array($sql))
	   { 
	     ?>
	  <option value="<?php echo $res['id']; ?>"><?php echo $res['value']; ?></option><?php } ?>
      </select> <input type="hidden" name="StateId" id="StateId" value="<?php echo $Did; ?>" />
	  
<?php } ?>