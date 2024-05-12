<?php
require_once('config/config.php');
if(isset($_POST['Modeid']) && $_POST['Modeid']!=""){
if($_POST['Modeid']=='Train') {?>
<select Name="TraClass" id="TraClass" class="All_100">
<option value="General">General</option><option value="Sleeper">Sleeper</option>
<option value="AC-I">AC-I</option><option value="AC-II">AC-II</option><option value="AC-III" class>AC-III</option></select>
<?php } if($_POST['Modeid']=='Flight') {?>
<select Name="TraClass" id="TraClass" class="All_100">
<option value="Economy">Economy</option><option value="Business class">Business class</option> 
</select>
<?php } } ?>
