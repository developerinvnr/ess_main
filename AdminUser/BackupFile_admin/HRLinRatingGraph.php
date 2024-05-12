<?php
include('Graph/phpgraphlib.php');
$graph = new PHPGraphLib(650,200);
$data=array("1" => $_REQUEST['r1'], "2" => $_REQUEST['r2'], "2.5" => $_REQUEST['r3'],
"3" => $_REQUEST['r4'], "3.5" => $_REQUEST['r5'], "4" => $_REQUEST['r6'], "4.5" => $_REQUEST['r7'], "5" => $_REQUEST['r8']);
$data2=array("1" => $_REQUEST['v1'], "2" => $_REQUEST['v2'], "2.5" => $_REQUEST['v3'],
"3" => $_REQUEST['v4'], "3.5" => $_REQUEST['v5'], "4" => $_REQUEST['v6'], "4.5" => $_REQUEST['v7'], "5" => $_REQUEST['v8']);
$graph->addData($data, $data2);
$graph->setLineColor('green', 'fuscia');
$graph->setTitle('PMS RATING LINEAR GRAPH (ALL EMP)');
$graph->setBars(false);
$graph->setLegend(true);
$graph->setLine(true);
$graph->setDataPoints(true);
$graph->setDataPointColor('maroon');
$graph->setDataValues(true);
$graph->setDataValueColor('green');
$graph->setGoalLine(.0025);
$graph->setGoalLineColor('green');
$graph->setLegendTitle('Expected', 'Actual');
$graph->createGraph();

?>
