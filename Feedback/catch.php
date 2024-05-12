<?php include('config.php'); ?>
<?php	
if(isset($_POST['r_name'])){
  $f = [];
  $g = [];

  $a =  $_POST['r_name'];
  $b = $_POST['r_ecode'];
  $emp_id = $_REQUEST['uid'];
  //$c = $_POST['anony'];
  $d = $_POST['final_feedback'];
  $e = explode(",", $_POST['score']);
  //$emp_id = $_POST['emp_id'];

  foreach($e as $ep){
    array_push($f, $ep + 1);
  }
  $g['q1'] = $f[0];
  $g['q2'] = $f[1];
  $g['q3'] = $f[2];
  $g['q4'] = $f[3];
  $g['q5'] = $f[4];
  $g = json_encode($g);
  //

  $query = "INSERT INTO impact_feedback(name, code, score, feedbk) VALUES ('{$a}','{$emp_id}', '{$g}', '{$d}')";  

  $q_res = mysql_query($query);
  if(!$q_res){
    die(mysqli_error($con));
  } else {
	  echo json_encode(array('msg'=>'Feedback submitted.','status'=>200));
  }
}

 ?>
