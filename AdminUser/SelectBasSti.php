<?php
require_once('config/config.php');
if(isset($_POST['id']) && $_POST['id']!=""){
if($_POST['id']=='B') { echo '<input type="hidden" value="B" name="Basic"/>Basic';} elseif($_POST['id']=='S') {echo '<input type="hidden" value="S" name="Stipend"/>Stipend';}?>
<?php } ?>
