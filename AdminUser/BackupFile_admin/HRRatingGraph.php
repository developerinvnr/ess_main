<?php
include('Graph/phpgraphlib.php');
$graph=new PHPGraphLib(520,280);
$data=array("1" => $_REQUEST['r1'], "2" => $_REQUEST['r2'], "2.5" => $_REQUEST['r3'],
"3" => $_REQUEST['r4'], "3.5" => $_REQUEST['r5'], "4" => $_REQUEST['r6'], "4.5" => $_REQUEST['r7'], "5" => $_REQUEST['r8']);
$data2=array("1" => $_REQUEST['v1'], "2" => $_REQUEST['v2'], "2.5" => $_REQUEST['v3'],
"3" => $_REQUEST['v4'], "3.5" => $_REQUEST['v5'], "4" => $_REQUEST['v6'], "4.5" => $_REQUEST['v7'], "5" => $_REQUEST['v8']);
$graph->addData($data, $data2);
$graph->setBarColor('yellow', 'green');
$graph->setTitle('PMS RATING BAR GRAPH (ALL EMP)');
$graph->setupYAxis(12, 'blue');
$graph->setupXAxis(20);
$graph->setGrid(true);
$graph->setLegend(true);
$graph->setDataPoints(true);
$graph->setDataValues(true);
$graph->setTitleLocation('left');
$graph->setTitleColor('blue');
$graph->setLegendOutlineColor('white');
$graph->setLegendTitle('Expected', 'Actual');
$graph->setXValuesHorizontal(true);
$graph->createGraph();
?>