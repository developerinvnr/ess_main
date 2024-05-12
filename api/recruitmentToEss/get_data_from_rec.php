<?php
require_once ('config.php');
//$jsonData = file_get_contents('php://input');

//$json = json_decode($jsonData, true);
$json = json_decode(file_get_contents('php://input'), true);

foreach($json['employee_language'] as $value){
    $insert_language = mysql_query('INSERT INTO employee_language(`'.implode('`, `', array_keys($value)).'`) VALUES("'.implode('", "', $value).'")',$con);
}

foreach($json['employee_education'] as $value){
    $insert_education = mysql_query('INSERT INTO employee_education(`'.implode('`, `', array_keys($value)).'`) VALUES("'.implode('", "', $value).'")',$con);
}

foreach($json['employee_family'] as $value){
    $insert_family = mysql_query('INSERT INTO employee_family(`'.implode('`, `', array_keys($value)).'`) VALUES("'.implode('", "', $value).'")',$con);
}

foreach($json['employee_preref'] as $value){
    $insert_preref = mysql_query('INSERT INTO employee_preref(`'.implode('`, `', array_keys($value)).'`) VALUES("'.implode('", "', $value).'")',$con);
}

foreach($json['employee_training'] as $value){
    $insert_trainingy = mysql_query('INSERT INTO employee_training(`'.implode('`, `', array_keys($value)).'`) VALUES("'.implode('", "', $value).'")',$con);
}

foreach($json['employee_vnrref'] as $value){
    $insert_family = mysql_query('INSERT INTO employee_vnrref(`'.implode('`, `', array_keys($value)).'`) VALUES("'.implode('", "', $value).'")',$con);
}

foreach($json['employee_workexp'] as $value){
    $insert_vnrref = mysql_query('INSERT INTO employee_workexp(`'.implode('`, `', array_keys($value)).'`) VALUES("'.implode('", "', $value).'")',$con);
}

$insert_address = mysql_query('INSERT INTO employee_address(`'.implode('`, `', array_keys($json['employee_address'][0])).'`) VALUES("'.implode('", "', $json['employee_address'][0]).'")',$con);

$insert_ctc = mysql_query('INSERT INTO employee_ctc(`'.implode('`, `', array_keys($json['employee_ctc'][0])).'`) VALUES("'.implode('", "', $json['employee_ctc'][0]).'")',$con);

$insert_elg = mysql_query('INSERT INTO employee_elg(`'.implode('`, `', array_keys($json['employee_elg'][0])).'`) VALUES("'.implode('", "', $json['employee_elg'][0]).'")',$con);

$insert_general = mysql_query('INSERT INTO employee_general(`'.implode('`, `', array_keys($json['employee_general'][0])).'`) VALUES("'.implode('", "', $json['employee_general'][0]).'")',$con);

$insert_pf = mysql_query('INSERT INTO employee_pf(`'.implode('`, `', array_keys($json['employee_pf'][0])).'`) VALUES("'.implode('", "', $json['employee_pf'][0]).'")',$con);


if($insert_general > 0){
    echo json_encode(array('msg'=>'Success','Status'=>200));
}else{
    echo json_encode(array('msg'=>'Failed','Status'=>400));
}
?>

